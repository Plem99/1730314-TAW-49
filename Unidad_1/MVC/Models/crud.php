<?php
    require_once "conexion.php";

    /*Hereda la clase conexion para poder utilizrla, se extiende cuando
    se requiere utilizarla*/
    class Datos extends Conexion{
        //Registro Usuarios
        public function registroUsuarioModel($datosModel, $tabla){
            /*Preparar la sentencia de mysql a travez de PDO para posteriormete ejecutar
            la sentencia o Query*/
            $query = "INSERT INTO $tabla(usuario, password, email) VALUES (:usuario, :password, :email)";
            $stmt = Conexion::conectar()->prepare($query);
            
            /*Utilizaremos bindParam() el cual vincula una variable o propiedad PHP a
            un parametro de sustitucion correspondiente de la sentencia SQL que fue usada
            para preparar la sentencia*/
            $stmt -> bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
            $stmt -> bindParam(":password",$datosModel["password"],PDO::PARAM_STR);
            $stmt -> bindParam(":email",$datosModel["email"],PDO::PARAM_STR);

            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt->close();
        }

        //Ingreso Usuario
        public function ingresoUsuarioModel($datosModel, $tabla){
            $query = "SELECT usuario, password FROM $tabla WHERE usuario = :usuario";
            $stmt = Conexion::conectar()->prepare($query);
            $stmt -> bindParam(":usuario",$datosModel["usuario"], PDO::PARAM_STR);
            $stmt -> execute();

            /*Utilizar fetch() ya que obtiene una fila de un conjunto de resultados asociados
            al objeto*/
            return $stmt -> fetch();
            $stmt -> close();
        }

        //Vista Usuario
        public function vistaUsuarioModel($tabla){
            $query = "SELECT id, usuario, password, email FROM $tabla";
            $stmt = Conexion::conectar()->prepare($query);
            $stmt -> execute();

            //Utilizar fetch()
            return $stmt -> fetchAll();
            $stmt -> close();
        }

        //Editar Usuario
        public function editarUsuarioModel($datosModel, $tabla){
            $query = "SELECT id, usuario, password, email FROM $tabla WHERE id = :id";
            $stmt = Conexion::conectar()->prepare($query);
            $stmt -> bindParam(":id",$datosModel, PDO::PARAM_STR);
            $stmt -> execute();

            /*Utilizar fetch() ya que obtiene una fila de un conjunto de resultados asociados
            al objeto*/
            return $stmt -> fetch();
            $stmt -> close();
        }

        //Actualizar Usuario
        public function actualizarUsuarioModel($datosModel, $tabla){
            $query = "UPDATE $tabla SET usuario = :usuario, password = :password, email = :email, WHERE id = :id";
            $stmt = Conexion::conectar()->prepare($query);
            $stmt -> bindParam(":usuario",$datosModel["usuario"], PDO::PARAM_STR);
            $stmt -> bindParam(":password",$datosModel["password"], PDO::PARAM_STR);
            $stmt -> bindParam(":email",$datosModel["email"], PDO::PARAM_STR);
            $stmt -> bindParam(":id",$datosModel["id"], PDO::PARAM_STR);

            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt -> close();
        }

        //Borrar Usuario
        public function borrarUsuarioModel($datosModel, $tabla){
            $query = "DELETE FROM $tabla WHERE id = :id";
            $stmt = Conexion::conectar()->prepare($query);
            
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt -> close();
        }
    }

?>
