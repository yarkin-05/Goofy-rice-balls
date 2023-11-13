<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'studentModel.php'; // funciones de todo

//just checkin they exist
$operation = isset($_GET['action']) ? $_GET['action'] : null; 
$id = isset($_GET['id']) ? $_GET['id'] : null;

$op = isset($_POST['action'])? $_POST['action'] : null;
$ids = isset($_POST['id']) ? $_POST['id'] : null;

//echo ' GET : id: '. $id .' operation: '. $operation;
//echo 'Post : id: '. $ids.' operation: '. $op;
$student = new Students(); // Instantiate the Students class

  if ($operation === 'show') echo json_encode($student->getAll()); //Show all users

  else if ($operation === 'details' and $id !== -1) {
    echo json_encode($student->details($id)); //Show the details of one
  }
  else if($op === 'register' or $op === 'update') {

    $username = $_POST['username'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];

    //echo $username, $name, $lastname, $birthday, $op, $ids;
  
    if($ids !== '-1'){
      //update
      $student -> update($ids, $username, $name, $lastname, $birthday);
      
      //echo 'hiii';
    }else{
      //register
      echo $student -> store($username, $name, $lastname, $birthday);
    }
    header('Location: students.php');
    
  }

?>
