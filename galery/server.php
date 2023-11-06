<?php

session_start();

if (!isset($_SESSION['images'])) $_SESSION['images'] = array();

if (isset($_FILES["file"]) && is_uploaded_file($_FILES["file"]["tmp_name"])) {

    $tmp_name = $_FILES["file"]["tmp_name"];
    $name = $_FILES["file"]["name"];
    $dir = 'upload/' . $name; // Corrected path to save the uploaded file

    if (move_uploaded_file($tmp_name, $dir)) {
        $imagePath = $dir; // Corrected path to access the uploaded file
        $_SESSION['images'][$$dir] = file_get_contents($dir); // Use the correct file path
        // Return the updated images as a JSON response
        echo json_encode($_SESSION['images']);
    } else {
        echo "Failed to move the file. Error code: " . $_FILES["file"]["error"];
    }
}

/*
  File errors: https://www.php.net/manual/en/features.file-upload.errors.php 
*/
?>
