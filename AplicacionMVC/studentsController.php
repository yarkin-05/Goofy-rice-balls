
<?php
//Archivo que maneja las peticiones, dependiendo los parametros seleccionados, se van a ejecutar el método solicitado e incluye la vista en caso de ser necesario. 

include 'studentModel.php'; //funciones de todo
include 'connect.php';

$operation = $_POST['action']; //type of action

/*falta crear la instancia de clase para poder acceder a los metodos :)


dsdjhsbcj

*/

if(isset($operation) && $_POST['id'] != '') {
  //si tiene id
  $id = $_POST['id'];
  switch($operation) {
    case 'getAll':
      
      break;
    case 'insert':
      
      break;
  }

}else{
  //no tiene id
  switch($operation) {
    case 'getOne':
      break;
    case 'update':
      break;
    case 'delete':
      break;
  }

}

?>