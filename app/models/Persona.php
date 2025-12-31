<?php

require_once 'Conexion.php';

class Persona extends Conexion{
    private $conexion;
    
    public function __construct(){
        $this->conexion = parent::getConexion();
    }

    public function listar(): array{
        try{
            $sql = "
            SELECT idpersona, dni, nombres, apellidos,telefono,email 
            FROM personas
            WHERE activo='1'
            ORDER BY idpersona DESC";

            $consulta = $this->conexion->prepare($sql);
            
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            return [];
        }
    }

    public function agregar($registro=[]): int{
        try{
            $sql = "
            INSERT INTO personas (dni, nombres, apellidos,telefono,email) 
            VALUES (?,?,?,?,?)";

            $consulta = $this->conexion->prepare($sql);
            $consulta->execute(
                array(
                    $registro ['dni'],
                    $registro ['nombres'],
                    $registro ['apellidos'],
                    $registro ['telefono'],
                    $registro ['email'],
                )
            );
            return $this->conexion->lastInsertId();
        }catch(Exception $e){
            return -1;
        }
    }
    
    public function eliminar($id):int{
        try{
            $sql = "UPDATE personas SET activo=0 WHERE idpersona = ?";

            $consulta = $this->conexion->prepare($sql);
            
            $consulta->execute(
                array($id)
            );
            return $consulta->rowCount();
        }catch(Exception $e){
            return -1;
        }
    }

    public function actualizar($registro = []){
        try{
            $sql="
            UPDATE personas SET
                dni = ?, 
                nombres = ?,
                apellidos = ?,
                telefono = ?,
                email = ?,
                updated = now()
            WHERE idpersona=? 
            ";
            $consulta = $this->conexion->prepare($sql);

            $consulta->execute(
                array(
                    $registro['dni'],
                    $registro['nombres'],
                    $registro['apellidos'],
                    $registro['telefono'],
                    $registro['email'],
                    $registro['idpersona']
                )
            );
            return $consulta->rowCount();
        }catch(Exception $e){
            return -1;
        }
    }
    public function buscarPorId($id){
         try{
            $sql = "SELECT * FROM personas WHERE idpersona = ? AND activo=1";

            $consulta = $this->conexion->prepare($sql);
            
            $consulta->execute(
                array($id)                
            );

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
           die($e->getMessage());
        }
    }
    public function buscarPorDni($dni){
        try{
           $sql = "SELECT * FROM personas WHERE dni LIKE ? AND activo=1";

            $consulta = $this->conexion->prepare($sql);
            
            $consulta->execute(
                array("$dni%")                
            );

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}
