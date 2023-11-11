<?php

include 'connect.php';
class Students{
  
  public function getAll(){
    //obtiene todos los registros
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->query('SELECT * FROM students ORDER BY date DESC');
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return 'result,io';
  }

  public function getOne($id){
    //obtiene un registro
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->prepare('SELECT * FROM students WHERE id = ?');
    $stmt->execute($id); //these binds the id to the thing
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  public function store(){
    //crea un nuevo registro, aunque tecnicamente nomas prepara el argumento
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->prepare('INSERT INTO students (username, name, last_name, birthdate) VALUES (?,?,?,?)');
    return $stmt;
  }

  public function update($id, $username, $name, $last_name, $birthdate){
    //actualiza un registro
    $pdo = pdo_connect_mysql();
    $stmt = $pdo -> prepare('UPDATE students SET (username, name, last_name, birthdate) VALUES (?,?,?,?) WHERE id =  ?');
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $name);
    $stmt->bindParam(3, $last_name);
    $stmt->bindParam(4, $birthdate);
    $stmt->bindParam(5, $id);
    $stmt->execute();
  }

  public function delete($id){
    //elimina un registro
  }
}


?>
