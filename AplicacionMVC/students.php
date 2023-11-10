<?php
//Archivo de vista, este archivo en su interior solo recibe como parametro un arreglo para que este pueda ser iterado y mostrado a manera de tabla en PHP, con sus respectivas acciones para crear uno nuevo, editar y elimiar.

  include 'connect.php'; //function that connects to the database
  $pdo = pdo_connect_mysql(); //the conectin the function returns

  $stmt = $pdo -> query('SELECT * FROM students ORDER BY name DESC'); // gets the array to all the students in the students table and orders them alphabetically
  $students = $stmt->fetchAll(PDO::FETCH_ASSOC);//returns the array from the query
?>

<?=template_header('Students Table')?>

<?php foreach($students as $student):?>
      <tr>
        <th><?= $student['username']?></th>
        <th><?= $student['name']?></th>
        <th><?= $student['last_name']?></th>
        <th><?= $student['birthdate']?></th>
      <tr>
<?php endforeach;?>
<?=template_footer()?>
