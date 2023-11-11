
<?php
//Archivo que maneja las peticiones, dependiendo los parametros seleccionados, se van a ejecutar el método solicitado e incluye la vista en caso de ser necesario. 

include 'studentModel.php'; //funciones de todo
include 'connect.php';
$operation = $_POST['action']; //type of action

if(isset($operation) && $operation === 'register') 
{
  //si quiere añadir un registro
}
else{
  $student = new Students(); // Instance of class
  if(isset($operation) && $_POST['id'] === '') {
  //si tiene id
  switch($operation) {
    case 'getAll':
        $student->getAll();
        echo json_encode($student);
      break;

    case 'Register':
      $stmt = $student->store(); // Get the prepared pdo statement
    
    // Parameters
    $name = $_POST['name'];
    $username = $_POST['username'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthdate'];
    
    // Bind parameters
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $name);
    $stmt->bindParam(3, $lastname);
    $stmt->bindParam(4, $birthday);

    // Execute the statement
    $stmt->execute();
    break;
  }
  }else{
    //no tiene id
    switch($operation) {
      case 'details':
        break;
      case 'update':
        break;
      case 'delete':
        break;
    }

    }
}

?>

<?php if (isset($_POST['action']) && $$_POST['action'] === 'register'): ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action='studentsController.php' method='post'>
    <input type='text' placeholder="Username" id='username'>
    <input type='text' placeholder="Name" id='name'>
    <input type='text' placeholder="Last Name" id='last_name'>
    <input type='birthday' placeholder='Birthday' id='birthdate'>
    <input type='submit' value='Register!' id='Register'>
  </form>
  <script src="event.js"></script>

</body>
</html>
<?php endif; ?>

<!-- in case operation = getA -->
