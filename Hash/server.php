<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'connect.php';

$page = $_POST['page'];
$pdo = pdo_connect_mysql();

if (isset($_SESSION['user'])){
  //ya hay sesion activa
  if($page === 'password'){
    $password = $_POST['password'];
    $hashed = password_hash($password, PASSWORD_DEFAULT); //hash of the password

    $stmt = $pdo->prepare('UPDATE students SET password = ?, changed_password = ? WHERE id = ?');
    $stmt -> execute([$hashed, 1, $_SESSION['id']]);
    $_SESSION['password'] = $hashed; //password var session
    header('Location: courses.php');

  }

}
else{
  if ($page === 'register') {
      $username = $_POST['username'];
      $name = $_POST['name'];
      $last_name = $_POST['last_name'];  
      $birthday = $_POST['birthday'];
      $password = $_POST['password'];
      $hash = password_hash($password, PASSWORD_DEFAULT); //hash del 0000

      $stmt = $pdo->prepare('INSERT INTO students (username, name, last_name, birthdate, password) VALUES (?,?,?,?,?)');
      $stmt->execute([$username, $name, $last_name, $birthday, $hash]);

      session_start();

      $stmt = $pdo->prepare('SELECT * FROM students WHERE username=:username');
      $stmt -> execute(['username' => $username]);
      $result = $stmt->fetch();
      $id = $result['id'];

      $_SESSION['user'] = $username; //start session variable
      $_SESSION['id'] = $id;
      $_SESSION['info'] = $result;

      //aqui no guardamos el password pq es el default
      header('Location: password.php');  // Uncomment this line if needed

  } else if ($page === 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare('SELECT * FROM students WHERE username=:username AND password=:password');
    $stmt -> execute(['username' => $username, 'password' => $hash]);
    $result = $stmt->fetch();

    if(!$result){
      echo "Username or Password are incorrect";
    }else{
      session_start();
      $_SESSION["user"] = $username;
      $_SESSION['id'] = $result['id'];
      $_SESSION['info'] = $result;
      $_SESSION['password'] = $result['password'];
      header ('Location: courses.php');

    }

  } 
}
  echo 'Session running, please logout';

?>
