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

<?php foreach($students as $student):?>
      <tr>
        <th><?= $student['username']?></th>
        <th><?= $student['name']?></th>
        <th><?= $student['last_name']?></th>
        <th><?= $student['birthdate']?></th>
        <th> <button type='submit' name='delete' id='delete' value='<?= $student['id']?>'> Delete </button> </th>
        <th> <button type='submit' name='details' id='details' value='<?= $student['id']?> '> Show details </button> </th>
        <th> <button type='submit' name='update' id='update' value='<?= $student['id']?>' > Update </button></th>
      <tr>
<?php endforeach;?>

<?=template_footer()?>
