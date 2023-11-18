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

  //saving users credentials
  $_SESSION['username'] = $username; 
  $_SESSION['id'] = store($username, $email, $password, $role);
  $_SESSION['password'] = $password;
  $_SESSION['role'] = $role;
  $_SESSION['email'] = $email;

}else if (isset($action) and $action === 'login'){
  //user credentials
  $username = $_POST['username'];
  $password = $_POST['password'];
  $hashedPassword = getPassword($username);

  //checking passwords
  if (password_verify($password, $hashedPassword)){
    //passwords match
    $_SESSION['username'] = $username;//username
    $_SESSION['password'] = $hashedPassword;

    $userInfo = getInfo($username, $hashedPassword);
    if($userInfo !== false){
      $_SESSION['id'] = $userInfo['id'];
      $_SESSION['email'] = $userInfo['correo_electronico'];
      $_SESSION['role'] = $userInfo['rol'];
    }
    
    echo 'Welcome! '.$username;

  }else{
    echo 'Passwords don\'t match';
  }

}else{
  echo 'hi ig';
}

?>