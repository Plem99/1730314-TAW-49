<?php
    require_once "conexion.php";

    /*Hereda la clase conexion para poder utilizarla, se extiende cuando
    se requiere utilizarla*/
    class Datos extends Conexion{
        //USUARIO
        //******************************************************************************/
        //Registro Usuarios
        public function registroUsuarioModel($datosModel, $tabla){
            /*Preparar la sentencia de mysql a travez de PDO para posteriormete ejecutar
            la sentencia o Query*/
            $query = "INSERT INTO $tabla(usuario, contrasena, email) VALUES (:usuario, :contrasena, :email)";
            $stmt = Conexion::conectar()->prepare($query);
            
            /*Utilizaremos bindParam() el cual vincula una variable o propiedad PHP a
            un parametro de sustitucion correspondiente de la sentencia SQL que fue usada
            para preparar la sentencia*/
            $stmt -> bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
            $stmt -> bindParam(":contrasena",$datosModel["contrasena"],PDO::PARAM_STR);
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
            $query = "SELECT usuario, contrasena FROM $tabla WHERE usuario = :usuario";
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
            $query = "SELECT id, usuario, contrasena, email FROM $tabla";
            $stmt = Conexion::conectar()->prepare($query);
            $stmt -> execute();

            //Utilizar fetch()
            return $stmt -> fetchAll();
            $stmt -> close();
        }

        //Editar Usuario
        public function editarUsuarioModel($datosModel, $tabla){
            $query = "SELECT id, usuario, contrasena, email FROM $tabla WHERE id = :id";
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
            $query = "UPDATE $tabla SET usuario = :usuario, contrasena = :contrasena, email = :email, WHERE id = :id";
            $stmt = Conexion::conectar()->prepare($query);
            $stmt -> bindParam(":usuario",$datosModel["usuario"], PDO::PARAM_STR);
            $stmt -> bindParam(":contrasena",$datosModel["contrasena"], PDO::PARAM_STR);
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
        //******************************************************************************/

        //PROVEEDOR
        //******************************************************************************/
        //Registro Proveedor
        public function registroProveedorModel($datosModel, $tabla){
            /*Preparar la sentencia de mysql a travez de PDO para posteriormete ejecutar
            la sentencia o Query*/
            $query = "INSERT INTO $tabla(clave, nombre, rfc, tProveedor, empresa, email) VALUES (:clave, :nombre, :rfc, :tProveedor, :empresa, :email)";
            $stmt = Conexion::conectar()->prepare($query);
            
            /*Utilizaremos bindParam() el cual vincula una variable o propiedad PHP a
            un parametro de sustitucion correspondiente de la sentencia SQL que fue usada
            para preparar la sentencia*/
            $stmt -> bindParam(":clave",$datosModel["clave"],PDO::PARAM_STR);
            $stmt -> bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
            $stmt -> bindParam(":rfc",$datosModel["rfc"],PDO::PARAM_STR);
            $stmt -> bindParam(":id_proveedor",$datosModel["proveedor"],PDO::PARAM_STR);
            $stmt -> bindParam(":id_empresa",$datosModel["empresa"],PDO::PARAM_STR);
            $stmt -> bindParam(":email",$datosModel["email"],PDO::PARAM_STR);

            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt->close();
        }

        //Vista Proveedor
        public function vistaProveedorModel($tabla){
            $query = "SELECT id, clave, nombre, rfc, tProveedor, empresa, email FROM $tabla";
            $stmt = Conexion::conectar()->prepare($query);
            $stmt -> execute();

            //Utilizar fetch()
            return $stmt -> fetchAll();
            $stmt -> close();
        }

        //Editar  Proveedor
        public function editarProveedorModel($datosModel, $tabla){
            $query = "SELECT id, clave, nombre, rfc, tProveedor, empresa, email FROM $tabla WHERE id = :id";
            $stmt = Conexion::conectar()->prepare($query);
            $stmt -> bindParam(":id",$datosModel, PDO::PARAM_STR);
            $stmt -> execute();

            /*Utilizar fetch() ya que obtiene una fila de un conjunto de resultados asociados
            al objeto*/
            return $stmt -> fetch();
            $stmt -> close();
        }

        //Actualizar Proveedor
        public function actualizarProveedorModel($datosModel, $tabla){
            $query = "UPDATE $tabla SET usuario = :usuario, password = :password, email = :email, WHERE id = :id";
            $stmt = Conexion::conectar()->prepare($query);
            $stmt -> bindParam(":clave",$datosModel["clave"],PDO::PARAM_STR);
            $stmt -> bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
            $stmt -> bindParam(":rfc",$datosModel["rfc"],PDO::PARAM_STR);
            $stmt -> bindParam(":tProveedor",$datosModel["tProveedor"],PDO::PARAM_STR);
            $stmt -> bindParam(":empresa",$datosModel["empresa"],PDO::PARAM_STR);
            $stmt -> bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
            $stmt -> bindParam(":id",$datosModel["id"], PDO::PARAM_STR);

            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt -> close();
        }

        //Borrar Proveedor
        public function borrarProveedorModel($datosModel, $tabla){
            $query = "DELETE FROM $tabla WHERE id = :id";
            $stmt = Conexion::conectar()->prepare($query);
            
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt -> close();
        }
        //******************************************************************************/

        //EMPRESA
        //******************************************************************************/
        //Registro Empresa
        public function registroEmpresaModel($datosModel, $tabla){
            /*Preparar la sentencia de mysql a travez de PDO para posteriormete ejecutar
            la sentencia o Query*/
            $query = "INSERT INTO $tabla(nombre) VALUES (:nombre)";
            $stmt = Conexion::conectar()->prepare($query);
            
            /*Utilizaremos bindParam() el cual vincula una variable o propiedad PHP a
            un parametro de sustitucion correspondiente de la sentencia SQL que fue usada
            para preparar la sentencia*/
            $stmt -> bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
            
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt->close();
        }

        //Vista Empresa
        public function vistaEmpresaModel($tabla){
            $query = "SELECT id, nombre FROM $tabla";
            $stmt = Conexion::conectar()->prepare($query);
            $stmt -> execute();

            //Utilizar fetch()
            return $stmt -> fetchAll();
            $stmt -> close();
        }

        //Editar Empresa
        public function editarEmpresaModel($datosModel, $tabla){
            $query = "SELECT id, nombre FROM $tabla WHERE id = :id";
            $stmt = Conexion::conectar()->prepare($query);
            $stmt -> bindParam(":id",$datosModel, PDO::PARAM_STR);
            $stmt -> execute();

            /*Utilizar fetch() ya que obtiene una fila de un conjunto de resultados asociados
            al objeto*/
            return $stmt -> fetch();
            $stmt -> close();
        }

        //Actualizar Empresa
        public function actualizarEmpresaModel($datosModel, $tabla){
            $query = "UPDATE $tabla SET nombre = :nombre WHERE id = :id";
            $stmt = Conexion::conectar()->prepare($query);
            $stmt -> bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
            $stmt -> bindParam(":id",$datosModel["id"], PDO::PARAM_STR);

            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt -> close();
        }

        //Borrar Empresa
        public function borrarEmpresaModel($datosModel, $tabla){
            $query = "DELETE FROM $tabla WHERE id = :id";
            $stmt = Conexion::conectar()->prepare($query);
            
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt -> close();
        }
        //******************************************************************************/
    }

?>
