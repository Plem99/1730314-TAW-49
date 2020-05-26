<?php
    require_once "conexion.php";

    /*Hereda la clase conexion para poder utilizarla, se extiende cuando
    se requiere utilizarla*/
    class Datos extends Conexion{
        //USUARIO
        //******************************************************************************/
        //Ingreso Usuario
        // MODELOS PARA LOS USUARIOS //
        /*-- Modelo para el inicio de sesión de los usuarios --*/
        public function ingresoUsuarioModel($datosModel,$tabla){
            //Preparar las sentencias de PDO para ejecutar el Qery de validación de usuario
            $stmt = Conexion::conectar()->prepare("SELECT CONCAT(firstname,' ',lastname) AS 'nombre_usuario', user_name AS 'usuario', user_password AS 'contrasena',user_id AS 'id' FROM $tabla WHERE user_name = :usuario");
            $stmt->bindParam(":usuario",$datosModel["user"],PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        

        //******************************************************************************/

    }

?>
