<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//important to note that this part is only for development environments

  include 'functions.php';
  
  function store($username, $email, $password, $role){
    $pdo = pdo_connect_mysql(); //connected to the database
    $stmt = $pdo->prepare('INSERT INTO usuarios (nombre_usuario, correo_electronico, contrasena, rol) VALUES (?,?,?,?)');
    $stmt -> execute([$username, $email, $password, $role]);
    $id = $pdo->lastInsertId(); //fetch the id
    return $id;
  }

  function getInfo($username, $password){
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE nombre_usuario = ? AND contrasena = ?');
    $stmt -> execute([$username, $password]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  function getPassword($username){
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE nombre_usuario = ?');
    $stmt -> execute([$username]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['contrasena'];
  }

  function getProfileInfo($id){
    $pdo = pdo_connect_mysql();
    $stmt = $pdo -> prepare('SELECT * FROM perfiles_usuario WHERE id_usuario = ?');
    $stmt -> execute([$id]);
    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    //var_dump($result);
    return $result;
  }

  

  



?>