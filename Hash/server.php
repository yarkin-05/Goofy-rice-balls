<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'connect.php';

$page = $_POST['page'];

if (isset($_SESSION['user'])){
  //ya hay sesion activa

}
else{
  if ($page === 'login') {
      $username = $_POST['username'];
      $name = $_POST['name'];
      $last_name = $_POST['last_name'];  
      $birthday = $_POST['birthday'];
      $password = $_POST['password'];
      $hash = password_hash($password, PASSWORD_DEFAULT); //hash del 0000

      $pdo = pdo_connect_mysql();
      $stmt = $pdo->prepare('INSERT INTO students (username, name, last_name, birthdate, password) VALUES (?,?,?,?,?)');
      $stmt->execute([$username, $name, $last_name, $birthday, $hash]);

      //session_start();
      //$_SESSION['user'] = $username; //start session variable
      //echo 'Insertion was a success!';
      header('Location: password.php');  // Uncomment this line if needed

  } else if ($page !== 'login') {
     // header('Location: login.php');  // Corrected 'Location'
      echo 'Error in logging in';
  } 
}
  echo 'Session running, please logout';

?>
