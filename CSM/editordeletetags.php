<?php
include 'user.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$msg = '';

if(isset($_POST['action'])){
  $action = $_POST['action'];
  if($action === 'edit'){
    $tag_id = $_POST['tag_id'];
    $input = $_POST['new_input'];
    updateTag($input,$tag_id);
    $msg = 'Tag updated successfully';
  }
  else if($action === 'delete'){
    $tag_id = $_POST['tag_id'];
    $pub_id = $_SESSION['publication_id'];
    deletetag($pub_id, $tag_id);
  }
  else{
    $msg = 'action not supported';
  }
}else{
  $msg = 'I do not know how you arrived here, but I am doing something wrong and you are doing something wrong';
}

echo $msg;
header ('Location: edit_publication.php');
?>