<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//important to note that this part is only for development environments

  include 'functions.php';
  class User{
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $role;
    protected $name;

    function __construct($name, $username, $email, $password_hash, $role){
      $this->name = $name;
      $this->username = $username;
      $this->email = $email;
      $this->password = $password_hash;
      $this->role = $role;
    }

    public function store(){
      $pdo = pdo_connect_mysql(); //connected to the database
      $stmt = $pdo->prepare('INSERT INTO usuarios (nombre_usuario, correo_electronico, contrasena, rol) VALUES (?,?,?,?)');
      $stmt -> execute([$this->username, $this->email, $this->password, $this->role]);
      $this->id = $pdo->lastInsertId(); //fetch the id
    }

    public function searchUser(){

    }

    public function searchPassword(){

    }
    public function getId(){
      return $this->id;
    }
  }



?>