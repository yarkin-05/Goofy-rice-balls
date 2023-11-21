<?php
 include 'user.php';
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 session_start();

  $actual_tags = retrieveTags();
 
 function tags($publication_id){
  if(isset($_POST['tag-input']) and !empty($_POST['tag-input'])){
    $tagInput = $_POST['tag-input'];
    $tags = explode(',', $tagInput); // Split the input into an array of tags

    // Process each tag using foreach loop
    foreach ($tags as $tag) {
      $tag = trim($tag); //clean the tag
      //echo "Tag: $tag<br>"; // Debug statement to check each tag
      $tag_id = addTags($tag); 
      Tags_and_Publications($tag_id, $publication_id);
    }
  }
}

  $id = $_SESSION['id'];
  $msg = '';

  //lets check if the title exists
  if(empty($_POST['title'])){
    $msg = 'Please input a title';
  }else{
    $title = $_POST['title'];

    
    //know lets check wich type of publication it will be
    if(empty($_POST['publicationText'])){
      //theres no text
      if (!empty($_FILES['mediaInput']['tmp_name'])) {
        //theres no media
        $msg = 'You can\'t upload an empty publication';
      }
      else{
        
        //its just media
        if (!empty($_FILES['mediaInput']['tmp_name'])) {
        
          $allowedImageExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Add more image extensions if needed
          $allowedVideoExtensions = ['mp4', 'mov', 'avi']; // Add more video extensions if needed

          // Get the file extension
          $fileExtension = strtolower(pathinfo($_FILES['mediaInput']['tmp_name'], PATHINFO_EXTENSION));

          // Check if it's an image
          if (in_array($fileExtension, $allowedImageExtensions)) {
            //it is an image
            $target_dir = 'multimedia/';
            $image_path = $target_dir . basename($_FILES['mediaInput']['name']);
            move_uploaded_file($_FILES['mediaInput']['name'], $image_path);
            //connect to mysql
            $publication_id = addPublication($title, '-1', $id, 'image');
            addMedia($publication_id, $image_path);
            tags($publication_id);
            header('Location: publicaciones.php');

          } 
          else if (in_array($fileExtension, $allowedVideoExtensions)) {
            //it is a video
            $target_dir = 'multimedia/';
            $video_path = $target_dir . basename($_FILES['mediaInput']['name']);
            move_uploaded_file($_FILES['mediaInput']['name'], $video_path);
            //connect to mysql
            $publication_id = addPublication($title, '-1', $id, 'video');
            addMedia($publication_id, $image_path);
            tags($publication_id);
            header('Location: publicaciones.php');

          } 
          else {
            $msg = "This file type is not supported.";
              // Handle other file types or show an error message
          }
        }else{
          $msg = 'Invalid file type. Please upload a valid image or video file.';
        }
      }
    }else{
      //theres text
      $publicationText = $_POST['publicationText'];

      if (!empty($_FILES['mediaInput']['tmp_name'])) {
        //media + text
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif','mp4', 'mov']; // extensions if needed

        // Get the file extension
        $fileExtension = strtolower(pathinfo($_FILES['mediaInput']['name'], PATHINFO_EXTENSION));

        // Check if it's an image
        if (in_array($fileExtension, $allowedExtensions)) {
          //it is an image + text
          $target_dir = 'multimedia/';
          $media_path = $target_dir . basename($_FILES['mediaInput']['name']);
          move_uploaded_file($_FILES['mediaInput']['name'], $media_path);
          //connect to mysql
          $publication_id = addPublication($title, $publicationText, $id, 'publicacion');
          addMedia($publication_id, $media_path);
          tags($publication_id);
          header('Location: publicaciones.php');



        }else {
          $msg =  "This file type is not supported.";
            // Handle other file types or show an error message
        }
      }else{
        //its just text
        $publication_id = addPublication($title, $publicationText, $id, 'texto');
        tags($publication_id);
        header('Location: publicaciones.php');


      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f0f0f0;
    }

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

    input[type="text"],
    textarea,
    input[type="file"],
    button {
      width: calc(100% - 24px);
      margin-bottom: 20px;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    input[type="text"] {
      min-height: 40px; /* Adjust the height as needed */
    }
    .container {
      width: 80%;
      max-width: 800px;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
    }

    textarea {
      width: calc(100% - 24px);
      margin-bottom: 20px;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
      min-height: 200px;
    }

    /*input[type="file"] {
      display: none;
    }*/

    button {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"] {
      margin-top: 10px;
      background-color: #28a745;
    }

    #addMediaButton {
      display: block;
      margin-bottom: 10px;
    }

  </style>
</head>
<body>
<div class="container">
    <h1>Create a Publication</h1>
    <form action="create_publicacion.php" method="post" enctype="multipart/form-data">
      <input type="text" id="title-input" placeholder="Enter title" name="title" required>

      <textarea id="publicationText" name="publicationText" placeholder="Write your publication..."></textarea>
      <input type="file" id="mediaInput" name="mediaInput">
      <input type="text" name="tag-input" id="tag-input" placeholder="Enter tags (comma-separated)" autocomplete="off">
      <div id="tag-container">
        <?php
  // Loop through the tags and render them within the container
        foreach ($actual_tags as $tag) {
          echo '<span class="tag">' . htmlspecialchars($tag['tag_name']) . '</span>';
        }
        ?>
      </div>

      <input type="submit" value="Publish">
    </form>
  
  </div>
  <p><?=$msg?></p>

  <script>
  // Function to handle tags when entered by the user
  function handleTags() {
    const tagInput = document.getElementById('tag-input');
    const tagContainer = document.getElementById('tag-container');
    
    // Clear the tag container before adding tags
    tagContainer.innerHTML = '';

    // Get the input value and split it by commas
    const tags = tagInput.value.split(',');

    // Create a tag element for each tag entered by the user
    tags.forEach(tag => {
      const tagElement = document.createElement('span');
      tagElement.classList.add('tag');
      tagElement.textContent = tag.trim(); // Remove leading/trailing spaces
      
      // Append the tag element to the container
      tagContainer.appendChild(tagElement);
    });
  }

  // Trigger handleTags function when the input value changes
  document.getElementById('tag-input').addEventListener('input', handleTags);

  const tags = document.querySelectorAll('.tag');

  // Function to handle tag click
  function handleTagClick(event) {
    const clickedTag = event.target.textContent.trim(); // Get the text content of the clicked tag
    const tagInput = document.getElementById('tag-input'); // Get the input field
    
    // Append the clicked tag to the input field, adding a comma if needed
    if (tagInput.value !== '') {
      tagInput.value += ', ' + clickedTag;
    } else {
      tagInput.value = clickedTag;
    }
  }

  // Attach click event listeners to all tag elements
  tags.forEach(tag => {
    tag.addEventListener('click', handleTagClick);
  });
</script>
</body>
</html>