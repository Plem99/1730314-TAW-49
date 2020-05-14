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

        //Controlador registro de usuarios
        public function registroUsuarioController(){
            if(isset($_POST["usuarioRegistro"])){
                /*Recibe a traves del método post el "name" (html)
                de usuario, password, y email, se almacenaran los datos
                en una variable de tipo array con sus respectivas propiedades
                (usuario,password,email)*/
                $datosController = array(
                    "usuario"=>$_POST["usuarioRegistro"],
                    "password"=>$_POST["passwordRegistro"],
                    "email"=>$_POST["emailRegistro"]
                );
                /*Se le dice a un modelo llamado registroUsuarioModel
                los datos que se van almacenar, recibirá 2 prámetros:
                $datosController y el nombre de la tabla a la que hay
                que ir a guardar los datos*/
                $respuesta = Datos::registroUsuarioModel($datosController,"usuarios");
                
                //Se imprime en la vista la respuesta del modelo
                if($respuesta == "success"){
                    header("location:index.php?action=ok");
                }else{
                    header("location:index.php");
                }
            }
        }

        //Ingresa usuarios
        public function ingresoUsuarioController(){
            if(isset($_POST["usuarioIngreso"])){
                $datosController = array(
                    "usuario"=>$_POST["usuarioIngreso"],
                    "password"=>$_POST["passwordIngreso"]
                );
                $respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");
                //Validacion de la respuesta del modelo para ver si es un usuario correcto
                if($respuesta["usuario"] == $_POST["usuarioIngreso"] &&
                    $respuesta["password"] == $_POST["passwordIngreso"]){
                    session_start();
                    $_SESSION["validar"] = true;
                    header("location:index.php?action=usuarios");
                }else{
                    header("location:index.php?action=fallo");
                }
            }
        } 
        
        //Controlador de vista de usuarios
        public function vistaUsuarioController(){
            $respuesta = Datos::vistaUsuariosModel("usuarios");

            /*El contructor foreach proporciona un modo sencillo de iterar
            sobre arrays, funciona solo con objetos y emitirá un error al intentar
            con una propiedad diferente o no inicializada*/
            foreach($respuesta as $row => $item){
                echo'<tr>
                    <td>'.$item["usuario"].'</td>
                    <td>'.$item["password"].'</td>
                    <td>'.$item["email"].'</td>
                    <td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
                    <td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
                    </tr>';
            }
        }

        //Controlador para editar usuarios
        public function editarUsuarioController(){
            $datosController = $_GET["id"];
            $respuesta = Datos::editarUsuarioModel($datosController,"usuarios");

            echo '
            <input type="hidden" value=" '.$respuesta["id"].' " name = "idEditar">
            <input type="text" value=" '.$respuesta["usuario"].' " name = "usuarioEditar" required>
            <input type="text" value=" '.$respuesta["password"].' " name = "passwordEditar" required>
            <input type="text" value=" '.$respuesta["email"].' " name = "emailEditar" required>
            <input type="submit" value="Actualizar">
            ';
        }

        //Controlador para actualizr usuarios
        public function actualizarUsuarioController(){
            if(isset($_POST["usuarioEditar"])){
                $datosController = array(
                    "id"=>$_POST["idEditar"],
                    "usuario"=>$_POST["usuarioEditar"],
                    "password"=>$_POST["passwordEditar"],
                    "email"=>$_POST["emailEditar"]
                );
                $respuesta = Datos::actualizarUsuarioModel($datosController,"usuarios");

                //Recibimos respuesta del modelo
                if($respuesta == "success"){
                    header("location:index.php?action=cambio");
                }else{
                    echo "Error";
                }
            }
        }

        //Controlador para borrar usuarios
        public function borrarUsuarioController(){
            if(isset($_GET["idBorrar"])){
                $datosController = $_GET["idBorrar"];
                $respuesta = Datos::borrarUsuarioModel($datosController,"usuarios");
                //Recibimos respuesta del modelo
                if($respuesta == "ok"){
                    header("location:index.php?Action=usuarios");
                }
            }
        }

        /* Lista de Modelos por usuario 
        1: registroUsuarioModel - OK
        2: ingresoUsuarioModel - OK
        3: vistaUsuarioModel - OK
        4: editarUsuarioModel - OK
        5: actualizarUsuarioModel - OK
        6: borrarUsuarioModel - OK*/
    }

?>