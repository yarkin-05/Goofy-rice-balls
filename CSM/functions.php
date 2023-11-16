<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  //important to note that this part is only for development environments

  function pdo_connect_mysql(){

    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = 'root';
    $DATABASE_NAME = 'Contact-System-Manager';

    return new PDO('mysql:host='. $DATABASE_HOST.';dbname='. $DATABASE_NAME. ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    try{

    } catch (PDOException $e) {
      $error = ''. $e->getMessage();
      exit ($error);
    }
  }


  function template_header($title){
    echo <<<EOT
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>$title</title>
      <link href="styles.css" rel="stylesheet">
    </head>
    <body>
      <nav>
        <ul style='display: flex; justify-content: space around; list-style: none;'>
          <li style='color: white;'><a href="logout.php">Log out</a></li>
          <li style='color: white;'><a href="login.php">Log In</a></li>

        </ul>
      </nav>

    
    EOT;

  }

  function template_footer(){
    echo <<<EOT
        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script src='app.js'> </script>
      </body>
    </html>
    EOT;
  }



?>
