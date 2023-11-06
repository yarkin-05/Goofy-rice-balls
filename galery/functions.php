<?php

//contain all the functions we need for our gallery system (template, footer, database connection)

function pdo_connect_mysql(){
    //MYSQL credentials
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'phogallery';  
    try{
      //connect to my SQL
      return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
      //if there is an error, stop the script and output error
      exit('Failed to connect a database');
  }
}
//connect MySQL database using PDO interface, if it is a fail it means the credentials are wrong

function template_header($title){
  echo <<<EOT
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>$title</title>
      <link href="style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
      <nav class="navtop">
        <div>
          <h1>Gallery System</h1>
              <a href="index.php"><i class="fas fa-image"></i>Gallery</a>
        </div>
      </nav>
EOT;
}

//header function for the pages we create, is like the layout in flask
//All we have to do is execute the function name as opposed to writing the same code in every file that we create


function template_footer(){
  echo <<<EOT
  </body>
</html>
EOT;
}
//layout but for the bottom

?>

