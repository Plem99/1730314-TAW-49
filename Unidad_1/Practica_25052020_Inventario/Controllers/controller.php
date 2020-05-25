<?php

    class MvcController{
        //Muestra una plantilla al usuario
        public function pagina(){
            include "Views/template.php";
        }

        //Mostrar enlaces
        public function enlacesPaginasController(){
            if(isset($_GET['action'])){
                $enlaces = $_GET['action'];
            }else{
                $enlaces = "index";
            }
            $respuesta = Paginas::enlacesPaginasModel($enlaces);
            include $respuesta;
        }
        //USUARIO
        //******************************************************************************/
        //Ingresa usuarios
        public function ingresoUsuarioController(){
            if(isset($_POST["txtUser"]) && isset($_POST["txtPassword"])){
                $datosController = array(
                    "user"=>$_POST["txtUser"],
                    "password"=>$_POST["txtPassword"]
                );
                $respuesta = Datos::ingresoUsuarioModel($datosController,"tusuario");
                //Validacion de la respuesta del modelo para ver si es un usuario correcto
                if($respuesta["user"] == $_POST["txtUser"] &&
                    password_verify($_POST["txtPassword"], $respuesta["password"]){
                    session_start();
                    $_SESSION["validar"] = true;
                    $_SESSION["nombre_usuario"] = $respuesta["nombre_usuario"];
                    $_SESSION["id"] = $respuesta["id"];
                    header("location:index.php?action=usuarios");
                }else{
                    header("location:index.php?action=ingresar");
                }
            }
        } 
        //Controlador registro de Usuario
        public function registroUsuarioController(){
            if(isset($_POST["usuarioRegistro"])){
                /*Recibe a traves del método post el "name" (html), 
                se almacenaran los datos
                en una variable de tipo array con sus respectivas propiedades*/
                $datosController = array(
                    "usuario"=>$_POST["usuarioRegistro"],
                    "contrasena"=>$_POST["contrasenaRegistro"],
                    "email"=>$_POST["emailRegistro"]
                );
                /*Se le dice a un modelo llamado registroUsuarioModel
                los datos que se van almacenar, recibirá 2 prámetros:
                $datosController y el nombre de la tabla a la que hay
                que ir a guardar los datos*/
                $respuesta = Datos::registroUsuarioModel($datosController,"tusuario");
                
                //Se imprime en la vista la respuesta del modelo
                if($respuesta == "success"){
                    header("location:index.php?action=ok");
                }else{
                    header("location:index.php?action=inicio");
                }
            }
        }
        
        //Controlador de vista de Usuario
        public function vistaUsuarioController(){
            $respuesta = Datos::vistaUsuarioModel("tusuario");

            /*El contructor foreach proporciona un modo sencillo de iterar
            sobre arrays, funciona solo con objetos y emitirá un error al intentar
            con una propiedad diferente o no inicializada*/
            foreach($respuesta as $row => $item){
                echo'<tr>
                    <td>'.$item["usuario"].'</td>
                    <td>'.$item["contrasena"].'</td>
                    <td>'.$item["email"].'</td>
                    <td><a href="index.php?action=editarUsuario&id='.$item["id"].'"><button class="btn btn-success">Editar</button></a></td>
                    <td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button class="btn btn-danger">Borrar</button></a></td>
                    </tr>';
            }
        }

        //Controlador para editar Usuario (obtener datos)
        public function editarUsuarioController(){
            $datosController = $_GET["id"];
            $respuesta = Datos::editarUsuarioModel($datosController,"tusuario");

            echo '
            <input type="hidden" value=" '.$respuesta["id"].' " class="form-control" name="idEditar">
        
            <div class="form-group">
                <label class=" col-sm-2 control-label" for="txt_id">Usuario: </label>
                <div class="col-sm-10">
                    <input type="text" value=" '.$respuesta["usuario"].' " class="form-control" name="usuarioEditar">
                </div>
            </div>
            <div class="form-group">
                <label class=" col-sm-2 control-label" for="txt_id">Contraseña: </label>
                <div class="col-sm-10">
                    <input type="password" value=" '.$respuesta["contrasena"].' " class="form-control" name="contrasenaEditar">
                </div>
            </div>
            <div class="form-group">
                <label class=" col-sm-2 control-label" for="txt_id">Email: </label>
                <div class="col-sm-10">
                    <input type="text" value=" '.$respuesta["email"].' " class="form-control" name="emailEditar">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 col-md-off-set-3">
                    <input type="submit" class="btn btn-primary form-control" value="Actualizar">     
                </div>
            </div>
            ';
        }

        //Controlador para actualizr Usuario
        public function actualizarUsuarioController(){
            if(isset($_POST["usuarioEditar"])){
                $datosController = array(
                    "id"=>$_POST["idEditar"],
                    "usuario"=>$_POST["usuarioEditar"],
                    "contrasena"=>$_POST["contrasenaEditar"],
                    "email"=>$_POST["emailEditar"]
                );
                $respuesta = Datos::actualizarUsuarioModel($datosController,"tusuario");

                //Recibimos respuesta del modelo
                if($respuesta == "success"){
                    header("location:index.php?action=usuarios");
                }else{
                    echo "Error";
                }
            }
        }

        //Controlador para borrar Usuario
        public function borrarUsuarioController(){
            if(isset($_GET["idBorrar"])){
                $datosController = $_GET["idBorrar"];
                $respuesta = Datos::borrarUsuarioModel($datosController,"tusuario");
                //Recibimos respuesta del modelo
                if($respuesta == "success"){
                    header("location:index.php?action=usuarios");
                }else{
                    echo "Error";
                }
            }
        }
        //******************************************************************************/
                //******************************************************************************/
        
    }

?>