<?php
include 'user.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//important to note that this part is only for development environments

session_start(); 

//var_dump($_POST);
if (isset($_POST['action'])) $action = $_POST['action'];
if (isset($action) and $action === 'register'){

  // User credentials
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $username = $_POST['username'];
  $role = $_POST['role'];


  $user = new User($name, $username, $email, $password, $role); //new class instance
  $user -> store(); //inserts it into the table

  //saving users credentials
  $_SESSION['username'] = $username; 
  $_SESSION['id'] = $user -> getId();
  $_SESSION['password'] = $password;
  $_SESSION['role'] = $role;
  $_SESSION['email'] = $email;
}
?>