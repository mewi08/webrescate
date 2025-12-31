<?php
require_once '../models/Persona.php';
$persona = new Persona();

header("Content-Type: application/json; charset=utf-8");

if(isset($_POST['operacion'])){
  switch($_POST['operacion']){
    case 'listar':
      $registros = $persona->listar();
      echo json_encode($registros);
      break;

    case 'registrar':
      $registro = [
        'dni'        => $_POST['dni'],
        'nombres'    => $_POST['nombres'],
        'apellidos'  => $_POST['apellidos'],
        'telefono'   => $_POST['telefono'],
        'email'      => $_POST['email']
      ];
      $idobtenido = $persona->agregar($registro);
      echo json_encode(['idpersona'=> $idobtenido]);
      break;  

    case 'actualizar':
     $registro = [
        'dni'        => $_POST['dni'],
        'nombres'    => $_POST['nombres'],
        'apellidos'  => $_POST['apellidos'],
        'telefono'   => $_POST['telefono'],
        'email'      => $_POST['email'],
        'idpersona'  => $_POST['idpersona'],
      ];
      $filasafectadas = $persona->actualizar($registro);
      echo json_encode(['filas'=> $filasafectadas]);
      break;

    case 'eliminar':
      $filasafectadas= $persona->eliminar($_POST['idpersona']);
      echo json_encode(['filas'=> $filasafectadas]);
      break; 

    case 'buscarPorID':
        echo json_encode($persona->buscarPorId($_POST['idpersona']));
        break;
        
    case 'buscarPorDni':
        echo json_encode($persona->buscarPorDni($_POST['dni']));
        break;
  }

}