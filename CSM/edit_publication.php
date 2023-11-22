<?php
  include 'user.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();
  
  if(isset($_GET['id'])){
    $publication_id = $_GET['id']; 
    $_SESSION['publication_id'] = $publication_id;

  } 
  $publication = fetchPublication($_SESSION['publication_id']);
  //echo $publication;

  //fetch tags
  $msg = '';
  if(empty($_POST['title'])){
    $msg = 'Please input a title';
  }
  else{
    //it has a title
    if(empty($_FILES['new_media_input']['tmp_name']) and empty($_POST['content'])){
      $msg = 'A publication can not be blank';
    }else{
      if(empty($_FILES['new_media_input']['tmp_name'])){
        // update text
        $title = $_POST['title'];
        $content = $_POST['content'];
        updatePublication($title, $content, 'texto', $_SESSION['publication_id']);

      }else{

        if(empty($_POST['content'])){
          //it is only media, we will differentiate between media

          $allowedImageExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Add more image extensions if needed
          $allowedVideoExtensions = ['mp4', 'mov', 'avi']; // Add more video extensions if needed


        }else{
          //it is text + media
        }
      }
    }
  }
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>


  <style> 
		.tag {
    display: inline-block;
    border-radius: 3px;
    padding: .2em .5em .3em;
    background: var(--tag-bg);
    color: var(--text-color);
    font-weight: 600;
    margin: .25em .1em;
    color: white;
    background-color: #745d80;
    font-size: .75em;
    } 

	</style>
  <title>Document</title>
</head>
<body>
<header class="header">
	<div class="header-content responsive-wrapper">
		<div class="header-logo">
				<div>
					<img src="fotos_local/cat.png" style="max-height: 50px; width: auto;"/>
				</div>			
			
		</div>
		<a href="logout.php" class="button">
			<i class="ph-list-bold"></i>
			<span>Log Out</span>
		</a>
	</div>
</header>

<main class="main">
	<div class="responsive-wrapper">
		<div class="main-header">
			<h1>Welcome to Editing</h1>
      <p> Please be mindful when editing, mind that if you don't add any file, we will remove the picture you have and there will not be any picture, to update the content of the tag, you have to press enter when you are done modifying it</p>
		</div>
    <div class="horizontal-tabs">
			<a href="profile.php">My Profile</a>
			<a href="publicaciones.php"> Return </a>
		
		</div>	
		<div class="content">
			
			<div class="content-main">
				<div class="card-grid">
					
						<article class="card">
              <form action="edit_publication.php?id=<?= $publication['id'] ?>" method="post">
                <input type="hidden" name="publication_id" value="<?= $publication['id'] ?>">

                <div class="card-header">
                  <div>
                    <?php if ($publication['tipo'] == 'texto'): ?>
                      <input type="text" name="title" value="<?= $publication['titulo'] ?>">
                      <input type="file" name="new_media_input">

                    <?php else: ?>
                    <?php
                    $filepath = fetchMedia($publication['id']);
                    if ($filepath): ?>
                        <span><img src="<?= $filepath['file_path'] ?>" alt="Publication Image"></span>
                    <?php endif; ?>
                    <br>
                      <input type="text" name="title" value="<?= $publication['titulo'] ?>">
                    <br><br>
                      <input type="file" name="new_media_input">

                    <?php endif; ?>
                  </div>
                </div>

                <div class="card-body">
                    <textarea name="content"><?= $publication['contenido'] ?></textarea>
                </div>

                <div class="card-footer" style="display:flex; justify-content: space-around;">
                  <button type="submit">Update</button>
                  <button class="icon-btn"><i class="far fa-heart"></i></ button>
                  <button class="icon-btn"><i class="far fa-envelope"></i></button>
                  <button class="icon-btn"><i class="fas fa-trash-alt"></i></button>
                </div>
                <div class="card-footer" style="display:flex; justify-content: space-around;">
                
                </div>
              </form>
              <?php
                  $tags = fetchTags($publication['id']);
                  
                  foreach ($tags as $tag) {
                    $tag_id = $tag['id'];
                      echo '<div>';
                      echo '<span class="tag">' . htmlspecialchars($tag['tag_name']) . '</span>';
                      // Edit button to modify the tag
                      echo '<button id="edit_tag "value="' . ($tag_id) . '" class="edit-tag-btn">Edit</button>';
                      //echo '<p> '. htmlspecialchars($tag_id). '</p>';
                      // Delete button to remove the tag
                      echo '<button id="delete_tag" class="delete-tag-btn" value="'.($tag_id).'">Delete</button>';
                      echo '</div>';
                  }
                ?>
						</article>			
				</div>
			</div>
		</div>
	</div>
</main>

		<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      <script src="app.js"></script>

		<script>
      const editButtons = document.querySelectorAll('.edit-tag-btn');
      const deleteButtons = document.querySelectorAll('.delete-tag-btn');

      editButtons.forEach(button => {
        button.addEventListener('click', function(event) {
          event.preventDefault();
          event.stopPropagation();

          let tag_id = button.value;
          console.log('tag: ' + tag_id);
          let tag = document.querySelector('.tag'); // Use document.querySelector for selecting by class
          if (tag) {
            tag.remove(); // Remove the .tag element from the DOM
          }

          const input = document.createElement('input'); // Create input element
          input.setAttribute('type', 'text');
          input.classList.add('tag'); // Add the 'tag' class to the input element

          input.addEventListener('keyup', function(e) {
            if (e.key === 'Enter') {
              // Send AJAX request when Enter is pressed
              const inputValue = input.value;
              console.log(tag_id);
              console.log(inputValue);
              $.ajax({
                url: 'editordeletetags.php',
                type: 'POST',
                data:{
                  'action': 'edit',
                  'tag_id':tag_id,
                  'new_input':inputValue
                },
                success: function(msg){
                  console.log('succes: ' + msg);
                }
              }).fail(function(msg){
                console.log(msg);
              })
          
              
            }
          });

          // Replace tag text with the input field for editing
          button.parentNode.appendChild(input); // Append input to the parent of the clicked button
        });
      });

      deleteButtons.forEach(button => {
          button.addEventListener('click', function(event) {
              // Handle delete functionality here
            event.preventDefault();
            event.stopPropagation();
            let tag_id = button.value;
            let tag = document.querySelector('.tag');

            if(tag){
              tag.remove();
            }

            $.ajax({
              url: 'editordeletetags.php',
              type: 'POST',
              data:{
                'action' : 'delete',
                'tag_id' :tag_id
              },
              success: function(msg){
                console.log('done :)');
              }
            }).fail(function(msg){
              console.log(msg);
            })
          });
      });
    </script>
</body>
</html>