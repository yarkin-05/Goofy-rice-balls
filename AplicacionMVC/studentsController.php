
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



