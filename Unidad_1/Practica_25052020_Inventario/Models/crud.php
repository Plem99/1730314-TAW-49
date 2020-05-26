<?php
    require_once "conexion.php";

    /*Hereda la clase conexion para poder utilizarla, se extiende cuando
    se requiere utilizarla*/
    class Datos extends Conexion{
        //USUARIO
        //******************************************************************************/
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

         /*-- Este modelo sirve para mostrar toda la información de los usuarios que existen --*/
         public function vistaUsersModel($tabla) {
            // Preparar la sentencia de PDO
            $stmt = Conexion::conectar()->prepare("SELECT user_id AS 'id', firstname, lastname, user_name, user_password,user_email, date_added FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }

        /*-- Este modelo sirve para insertar un nuevo usuario a la bd --*/
        public function insertarUserModel($datosModel,$tabla) {
            //preparamos el PDO
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (firstname,lastname,user_name,user_password,user_email) VALUES (:nusuario,:ausuario,:usuario,:contra,:email)");
            $stmt->bindParam(":nusuario",$datosModel["nusuario"],PDO::PARAM_STR);
            $stmt->bindParam(":ausuario",$datosModel["ausuario"],PDO::PARAM_STR);
            $stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
            $stmt->bindParam(":contra",$datosModel["contra"],PDO::PARAM_STR);
            $stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "error";
            }
            $stmt->close();
        }

        /*-- Este modelo sirve para cargar la información del usuario para su posterior modificación --*/
        public function editarUserModel($datosModel, $tabla) {
           
            $stmt = Conexion::conectar()->prepare("SELECT user_id AS 'id', firstname AS 'nusuario', lastname AS 'ausuario', user_name AS 'usuario', user_password AS 'contra', user_email AS 'email' FROM $tabla WHERE user_id=:id");
            
            $stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

         /*-- Este modelo sirve para guardar los cambios hechos a un usuarios en particular --*/
         public function actualizarUserModel($datosModel, $tabla) {
            
            //Sentencia de PDO para ejecutar la actualzación del usuario
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET firstname = :nusuario, lastname = :ausuario, user_name = :usuario, user_password = :contra, user_email = :email WHERE user_id = :id");
            
            $stmt -> bindParam(":nusuario",$datosModel["nusuario"],PDO::PARAM_STR);
            $stmt -> bindParam(":ausuario",$datosModel["ausuario"],PDO::PARAM_STR);
            $stmt -> bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
            $stmt -> bindParam(":contra",$datosModel["contra"],PDO::PARAM_STR);
            $stmt -> bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
            $stmt -> bindParam(":id",$datosModel["id"],PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "error";
            }
            $stmt->close();
        }
        

        //******************************************************************************/

    }

?>
