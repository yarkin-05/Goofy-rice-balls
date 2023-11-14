<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'studentModel.php'; // funciones de todo

$operation = isset($_GET['action']) ? $_GET['action'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

//echo 'action: ' .$_GET['action'].'\n\n'; // Debugging line

$student = new Students(); // Instantiate the Students class
if ($operation === 'show') {
    //header('Content-Type: application/json');
    //var_dump($result);
    echo json_encode($student->getAll());
} else {
    echo 'Unknown operation ';
}

?>