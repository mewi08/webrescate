<?php
require_once '../models/Animal.php';
$animal = new Animal();

header("Content-Type: application/json; charset=utf-8");

if(isset($_POST['operacion'])){
    switch ($_POST['operacion']) {
        case 'listar':
            $registros = $animal->listar();
            echo json_encode($registros);
        break;
        case 'registrar':
            $registro = [
                'idpersona'     => $_POST['idpersona'],
                'nombre'        => $_POST['nombre'],
                'especie'       => $_POST['especie'],
                'sexo'          => $_POST['sexo'],
                'condicion'     => $_POST['condicion'],
                'fecharescate'  => $_POST['fecharescate'],
                'lugar'         => $_POST['lugar'],
                'observaciones' => $_POST['observaciones'],
                'foto'          => $_POST['foto'],
            ];
            $idobtenido= $animal->agregar($registro);
            echo json_encode(["idanimal" => $idobtenido]);
        break;  

        case 'actualizar':
            $registro = [
                'idpersona'     => $_POST['idpersona'],
                'nombre'        => $_POST['nombre'],
                'especie'       => $_POST['especie'],
                'sexo'          => $_POST['sexo'],
                'condicion'     => $_POST['condicion'],
                'fecharescate'  => $_POST['fecharescate'],
                'lugar'         => $_POST['lugar'],
                'observaciones' => $_POST['observaciones'],
                'foto'          => $_POST['foto'],
                'idanimal'=> $_POST['idanimal'],
            ];
            $filasafectadas = $animal->actualizar($registro);
            echo json_encode(['filas'=> $filasafectadas]);
        break;

        case 'eliminar':
            $filasafectadas = $animal->eliminar($_POST['idanimal']);
            echo json_encode(["filas"=>$filasafectadas]); 
        break;  

        case 'buscarPorId':
            echo json_encode($animal->buscarPorId($_POST['idanimal']));
        break;  

        case 'buscarPorCondicion':
            echo json_encode($animal->buscarPorcondicion($_POST['condicion']));
        break;
    }

}