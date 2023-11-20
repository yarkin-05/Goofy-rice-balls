<?php
  include 'functions.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();
  $id = $_SESSION['id'];
  
  $msg = ' '; // Displaying user ID for debugging
  // Check if the user has uploaded a new image

  if (isset($_FILES['image'], $_POST['description'])) {
    // Folder where images will be stored
    $target_dir = 'foto_perfil/';
    // Path of the uploaded image

    $image_path = $target_dir . basename($_FILES['image']['name']);

    if (!empty($_FILES['image']['tmp_name']) && getimagesize($_FILES['image']['tmp_name'])) {
      if ($_FILES['image']['size'] > 500000) {
        $msg = 'Image size too large';
      } else {
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
        // Connect to MySQL
        $pdo = pdo_connect_mysql();
        // Insert image info into database 
        $stmt = $pdo->prepare('UPDATE perfiles_usuario SET filepath = ?, informacion_adicional = ? ');

        if (!$stmt->execute([$image_path, $_POST['description']])) {
          $msg = $image_path . ' Error inserting data into the database: ' . print_r($stmt->errorInfo(), true);
        } else {
          $msg = 'Image uploaded successfully!';
          header('Location: profile.php');
        }
      }
    } else {
      $msg = 'Please upload an image!';
    }
  }
?>
<?=template_header("Updating your Profile")?>


<div class="content upload">
  <h3 class="greetings">Welcome <?= $_SESSION['username']?>! </h3> 
  <p class="greetings">Please update your user info as needed</p>
  <h2>User Info</h2>
  <form action="edit_profile.php" method="post" enctype="multipart/form-data">
    <label for="image"> Profile Picture </label>
    <input type="file" name="image" accept="image/*" id="image">
    <label for="description"> Description</label>
    <textarea name="description" id="description"></textarea>
    <input type="submit" value="Update Profile" name="submit">
  </form>
  <p><?=$msg?></p>

</div>

<?=template_footer()?>
