<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'connect.php';

$page = $_POST['page'];

if ($page === 'login' and !isset($_SESSION['user'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];  // Corrected variable name
    $birthday = $_POST['birthday'];

    $pdo = pdo_connect_mysql();
    $stmt = $pdo->prepare('INSERT INTO students (username, name, last_name, birthdate) VALUES (?,?,?,?)');
    $stmt->execute([$username, $name, $last_name, $birthday]);

    session_start();
    $_SESSION['user'] = $username;
    echo 'Insertion was a success!';
    //header('Location: password.php');  // Uncomment this line if needed

} elseif ($page !== 'login' and !isset($_SESSION['user'])) {
    echo 'You need to be logged in';
    header('Location: login.php');  // Corrected 'Location'

} elseif (!isset($_SESSION['user'])) {
    echo 'You need to be logged in';
    header('Location: login.php');  // Corrected 'Location'
}

?>
