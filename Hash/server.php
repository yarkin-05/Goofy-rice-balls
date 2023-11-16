<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'connect.php';

$page = $_POST['page'];
$pdo = pdo_connect_mysql();
global $session;
global $def_user; 
global $def_id;
global $def_password;

  if($page === 'password'){
    $password = $_POST['password'];
    $hashed = crypt($password, CRYPT_MD5); //hash of the password

    $stmt = $pdo->prepare('UPDATE students SET password = ?, changed_password = ? WHERE id = ?');
    $stmt -> execute([$hashed, 1, $def_id]);
    $def_password = $hashed;
    //header('Location: courses.php');
    echo 'hashed ' . $hashed;
  }


  if ($page === 'register') {
      $username = $_POST['username'];
      $name = $_POST['name'];
      $last_name = $_POST['last_name'];  
      $birthday = $_POST['birthday'];
      $password = $_POST['password'];
      $hash = crypt($password, CRYPT_MD5); //hash del 0000

      $stmt = $pdo->prepare('INSERT INTO students (username, name, last_name, birthdate, password) VALUES (?,?,?,?,?)');
      $stmt->execute([$username, $name, $last_name, $birthday, $hash]);

      session_start();

      $stmt = $pdo->prepare('SELECT * FROM students WHERE username=:username');
      $stmt -> execute(['username' => $username]);
      $result = $stmt->fetch();
      $id = $result['id'];

      $def_user = $username; //start session variable
      $def_id = $id;

      //aqui no guardamos el password pq es el default
      header('Location: password.php');  // Uncomment this line if needed

  } else if ($page === 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

   // $stmt = $pdo->prepare('SELECT * FROM students WHERE username=:username AND password=:password');
    //$stmt -> execute(['username' => $username, 'password' => $hash]);
    $stmt = $pdo->prepare('SELECT * FROM students WHERE username=:username');
    $stmt -> execute(['username' => $username]);
    $result = $stmt->fetch();

    if ($result ) {
      session_start();
      $def_user = $username;
      $def_id = $result['id']; 
      $def_password = $result['password'];

      ///header('Location: courses.php');
      echo 'Session id set: ' . $def_id. 'hi'.' username: '.$def_user.' , password: '. $def_password;

  } else {
      echo 'Username or Password are incorrect'.' username: '.$username.' , password: '. $password, 'hash: '.$hash;
  }

  } 


?>
