<?php

include 'connect.php';
class Student{
  public $pdo;

  public function __construct(){
    $this->pdo = pdo_connect_mysql();
  }
  function getAll(){
    //obtiene todos los registros
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->query('SELECT * FROM students ORDER BY date DESC');
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  function getOne($id){
    //obtiene un registro
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->prepare('SELECT * FROM students WHERE id = ?');
    $stmt->execute($id); //these binds the id to the thing
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  function store(){
    //crea un nuevo registro
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->prepare('INSERT INTO students FROM students (username, name, last_name, birthdate)');
    return $stmt;
  }

  function update($id){
    //actualiza un registro
  }

  function delete($id){
    //elimina un registro
  }
}


?>
