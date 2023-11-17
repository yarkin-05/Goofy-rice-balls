<?php

  include 'functions.php';
  class User{
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $role;

    function __construct($username, $email, $password_hash, $role){
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