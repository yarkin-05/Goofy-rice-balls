<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'studentModel.php'; // funciones de todo

//just checkin they exist
$operation = isset($_GET['action']) ? $_GET['action'] : null; 
$id = isset($_GET['id']) ? $_GET['id'] : null;

$student = new Students(); // Instantiate the Students class
if ($operation !== null and $id !== null) {

  if ($operation === 'show') echo json_encode($student->getAll()); //Show all users

  else if ($operation === 'details' and $id !== -1) {
    echo json_encode($student->details($id)); //Show the details of one
}
}else{
  echo "Didn't provide proper information";
}
?>
