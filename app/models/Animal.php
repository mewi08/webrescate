<?php 
require_once 'Conexion.php';

class Animal extends Conexion{
    private $conexion;

    public function __construct(){
        $this->conexion = parent::getConexion();
    }

    public function listar(): array{
        try{
            $sql="
            SELECT 
                animal.idanimal,
                persona.nombres AS Rescatista,
                animal.nombre,
                animal.especie,
                animal.sexo,
                animal.condicion,
                animal.fecharescate, 
                animal.lugar,
                animal.observaciones,
                animal.foto 
            FROM animales AS animal
            INNER JOIN personas AS persona
                ON animal.idpersona = persona.idpersona
            WHERE animal.activo ='1'
            ORDER BY animal.idanimal DESC";
                    
            $consulta= $this->conexion->prepare($sql);   
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            return [];
        }
    }

    public function agregar($registro=[]): int{
        try{
            $sql="
            INSERT INTO animales
            (idpersona, nombre, especie, sexo, condicion, fecharescate, lugar, observaciones, foto, activo)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?) 
            ";
            $consulta= $this->conexion->prepare($sql);
            $consulta->execute(
                array(
                    $registro['idpersona'],
                    $registro['nombre'],
                    $registro['especie'],
                    $registro['sexo'],
                    $registro['condicion'],
                    $registro['fecharescate'],
                    $registro['lugar'],
                    $registro['observaciones'],
                    $registro['foto'],
                    $registro['activo'] = 1,
                )
            );
            return $this->conexion->lastInsertId();
        }catch(Exception $e){
            return -1;
        }
    }
    public function eliminar($id):int{
        try{    
            $sql= '
            UPDATE animales SET 
                activo = 0
            WHERE idanimal=?';
            $consulta= $this->conexion->prepare($sql);
            $consulta->execute(
                array($id)
            );
            return $consulta->rowCount();
        }catch(Exception $e){
            return -1;
        }    
    }
    
    public function actualizar($registro=[]):int{
       try{
            $sql="
            UPDATE animales SET
                idpersona = ?, 
                nombre = ?,
                especie = ?,
                sexo = ?,
                condicion = ?,
                fecharescate = ?,
                lugar = ?,
                observaciones = ?,
                foto = ?,
                activo = 1,
                updated = now()
            WHERE idanimal=? 
            ";
            $consulta= $this->conexion->prepare($sql);
            $consulta->execute(
                array(
                    $registro['idpersona'],
                    $registro['nombre'],
                    $registro['especie'],
                    $registro['sexo'],
                    $registro['condicion'],
                    $registro['fecharescate'],
                    $registro['lugar'],
                    $registro['observaciones'],
                    $registro['foto'],
                    $registro['idanimal']
                )
            );
            return $consulta->rowCount();
        }catch(Exception $e){
            return -1;
        }
    }
    public function buscarPorId($id): array{
        try{
            $sql="SELECT * from animales WHERE activo =1 AND idanimal = ?";
        
            $consulta= $this->conexion->prepare($sql);   
            
            $consulta->execute(array($id));
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function buscarPorcondicion($condicion){
        try{
            $sql="SELECT * FROM animales WHERE condicion=? AND activo=1";
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute(array($condicion));
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function buscarPorEspecie($especie){
        try{
            $sql= "SELECT * FROM animales WHERE especie=? AND activo=1";
            $consulta= $this->conexion->prepare($sql);
            $consulta->execute(array($especie));
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}