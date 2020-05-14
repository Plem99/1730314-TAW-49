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
    }

?>
