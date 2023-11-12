<?php
//Archivo de vista

  include 'connect.php'; //function that connects to the database
    $pdo = pdo_connect_mysql(); //the conectin the function returns

    $stmt = $pdo -> query('SELECT * FROM students ORDER BY id DESC'); // gets the array to all the students in the students table and orders them alphabetically
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);//returns the array from the query
    
  
  
?>

<?=template_header('Students Table')?>
<?php foreach($students as $student):?>
      <tr>
        <th><?= $student['username']?></th>
        <th><?= $student['name']?></th>
        <th><?= $student['last_name']?></th>
        <th><?= $student['birthdate']?></th>
        <th> <input type='submit' value='delete' id='delete' name='<?= $student['id']?>'></th>
        <th> <input type='submit' value='details' id='details' name='<?= $student['id']?> '>  </th>
        <th> <input type='submit' value='update' id='update' name='<?= $student['id']?>' > </th>
      <tr>
<?php endforeach;?>

<?=template_footer()?>
