<?php
    
    class login_model{

        function __construct(){
            $this->DB=Database::connect();
        }

        //Login Usuario
        public function ingresoUsuarioModel($datosModel, $tabla){
            $sql = "SELECT nombre, contrasena FROM $tabla WHERE nombre = :usuario";
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

