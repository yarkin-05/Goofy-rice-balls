<?php

include 'connect.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Students {
    public function getAll() {
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->query('SELECT * FROM students ORDER BY id DESC');
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function details($id){
      $pdo = pdo_connect_mysql();
      $stmt = $pdo->prepare('SELECT * FROM students WHERE id=:id');
      $stmt -> execute(['id' => $id]);
      $result = $stmt->fetch();
      //var_dump($result);
      return $result;
    }

    public function update($id, $user, $name, $last_name, $birthday){
      $pdo = pdo_connect_mysql();
      $stmt = $pdo->prepare('UPDATE students SET username = ?, name = ?, last_name = ?, birthdate = ? WHERE id = ?');
      $stmt -> execute([$user, $name, $last_name, $birthday, $id]);
    }

    public function store($user, $name, $last_name, $birthday){
      $pdo = pdo_connect_mysql();
      $stmt = $pdo->prepare('INSERT INTO students (username, name, last_name, birthdate) VALUES (?,?,?,?)');
      $stmt -> execute([$user, $name, $last_name, $birthday]);
      $result = $stmt->fetch();
      return $result;
    }
}

?>
