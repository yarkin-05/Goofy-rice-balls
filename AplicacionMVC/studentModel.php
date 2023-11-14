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
        // Output the result for debugging purposes
        //var_dump($result);
        return $result;
    }
}

?>
