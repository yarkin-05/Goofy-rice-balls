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

  function addPublication($title, $publicationText, $id, $type){
    $pdo = pdo_connect_mysql(); //connected to the database
    $stmt = $pdo->prepare('INSERT INTO publicaciones (titulo, contenido, id_autor, tipo) VALUES (?,?,?,?)');
    $stmt -> execute([$title, $publicationText, $id, $type]);
    $id = $pdo->lastInsertId(); //fetch the id
    return $id;
  }

  function addMedia($publication_id, $file_path ){
    $pdo = pdo_connect_mysql(); //connected to the database
    $stmt = $pdo->prepare('INSERT INTO multimedia (publication_id, file_path) VALUES (?,?)');
    $stmt -> execute([$publication_id, $file_path ]);
  }

  function Tags_and_Publications($tag_id, $publication_id){
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->prepare('INSERT INTO publication_tags (publication_id, tag_id) VALUES (?,?)');
    $stmt -> execute([$publication_id, $tag_id]);
  }
  function addTags($name){
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->prepare('INSERT INTO tags (tag_name) VALUES (?)');
    $stmt -> execute([$name]);
    $id = $pdo->lastInsertId(); //fetch the id
    return $id;
  }

  function retrieveTags(){
    $pdo = pdo_connect_mysql();
    $stmt = $pdo -> query('SELECT tag_name FROM tags');
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  function fetchAllPublications(){
    $pdo = pdo_connect_mysql();
    $stmt = $pdo -> query('SELECT * FROM publicaciones');
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  function fetchMedia($id) {
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->prepare('SELECT file_path FROM multimedia WHERE publication_id = ?');
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch a single row as an associative array
    //var_dump($result['filepath']);
    return $result;
  }
?>

