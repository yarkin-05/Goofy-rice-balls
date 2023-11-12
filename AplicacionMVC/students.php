<?php
//Archivo de vista

  include 'connect.php'; //function that connects to the database
  if (!isset($firstaccess)) { 
    $pdo = pdo_connect_mysql(); //the conectin the function returns

    $stmt = $pdo -> query('SELECT * FROM students ORDER BY id DESC'); // gets the array to all the students in the students table and orders them alphabetically
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);//returns the array from the query
    }  
  $firstaccess = true;
  
  
?>

<?=template_header('Students Table')?>
<?=template_footer()?>
