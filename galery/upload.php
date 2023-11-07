<?php

//literaly upload images and insert details into database

include 'functions.php';
//the output message

$msg = '';
//check if the user has uploaded a new image

if(isset($_FILES['image'], $_POST['title'], $_POST['description'])){
  //folder where images will be stored
  $target_dir = 'upload/';
  //path of the uploaded image

  $image_path = $target_dir . basename($_FILES['image']['name']);

  if(!empty($_FILES['image']['tmp_name']) && getimagesize($_FILES['image']['tmp_name'])){
    if(file_exists($image_path)){
      $msg = 'Image already exists';
    }else if($_FILES['image']['size'] > 500000){
      $msg = 'Image size too large';
    }else{
      move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
      //connect to mysql
      $pdo = pdo_connect_mysql();
      //insert image info into database 
      $stmt = $pdo->prepare('INSERT INTO upload(title, description, filepath, date) VALUES (?,?,?, CURRENT_TIMESTAMP)');
      $stmt->execute([$_POST['title'], $_POST['description'], $image_path]);
      $msg = 'Image uploaded successfully!';
    }
  }else{
    $msg = 'Please upload an image!';
  }
}
?>

<?=template_header('Upload Image')?>

<div class="content upload">
	<h2>Upload Image</h2>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<label for="image">Choose Image</label>
		<input type="file" name="image" accept="image/*" id="image">
		<label for="title">Title</label>
		<input type="text" name="title" id="title">
		<label for="description">Description</label>
		<textarea name="description" id="description"></textarea>
	    <input type="submit" value="Upload Image" name="submit">
	</form>
	<p><?=$msg?></p>
</div>

<?=template_footer()?>
