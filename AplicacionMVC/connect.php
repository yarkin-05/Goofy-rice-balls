<?php

//just a function for connecting the database
function pdo_connect_mysql(){

  $DATABASE_HOST = "localhost";
  $DATABASE_USER = "admin";
  $DATABASE_PASS = "3626400eeb94cdea37cbe094656a925668fa0f94797fa148";
  $DATABASE_NAME = "students";

  try{
    return new PDO('mysql:host='.$DATABASE_HOST . ';dbname='.$DATABASE_NAME. ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);

  }catch (PDOException $e){
    $error = ''. $e -> getMessage() . '';
    exit($error);
  }
}

?>