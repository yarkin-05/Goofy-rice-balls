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
      $stmt = $pdo->prepare('SELECT * FROM students WHERE id = ?');
      $result = $stmt -> execute([$id]);
      return $result;
    }
}

?>
