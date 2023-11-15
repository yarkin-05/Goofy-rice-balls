<?php

//just a function for connecting the database and some layout for it to be easier and to get costumed to it since it is a good practice

function pdo_connect_mysql(){

  $DATABASE_HOST = "localhost";
  $DATABASE_USER = "root";
  $DATABASE_PASS = "root";
  $DATABASE_NAME = "students";

  try{
    return new PDO('mysql:host='.$DATABASE_HOST . ';dbname='.$DATABASE_NAME. ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);

  }catch (PDOException $e){
    $error = ''. $e -> getMessage() . '';
    exit($error);
  }
}



function template_header($title){
  echo <<<EOT
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>$title</title>
      <link href="styles.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="styles.css">
    </head>
    <body>
      <nav> 
        <input type="submit" name='-1' id='getAll' value = 'show'>
        <button type="submit" name='-1' id='register' value='register'>   Register  </button
      </nav>
      <div id="popup-container"></div>
      <table id='table'>
        <thead>
          <th> Username </th> 
          <th> Name </th> 
          <th> Last_name </th> 
          <th> Birthday </th> 
          <th> Delete </th>
          <th> Details </th>
          <th> Update </th>
        </thead>
      
EOT;
}

function template_footer(){
  echo <<<EOT

  </table>
  <div id="formContainer"></div>
 
  <script src="https://code.jquery.com/jquery-2.2.4.js"integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

  <script src="event.js"></script>
  </body>
</html>
EOT;
}

?>