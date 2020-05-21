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
        //PROVEEDOR
        //******************************************************************************/
        //Controlador registro de proveedor
        public function registroProveedorController(){
            if(isset($_POST["proveedorRegistro"])){
                /*Recibe a traves del método post el "name" (html), 
                se almacenaran los datos
                en una variable de tipo array con sus respectivas propiedades*/
                $datosController = array(
                    "clave"=>$_POST["claveRegistro"],
                    "nombre"=>$_POST["nombreRegistro"],
                    "rfc"=>$_POST["rfcRegistro"],
                    "tProveedor"=>$_POST["tProveedorRegistro"],
                    "empresa"=>$_POST["empresaRegistro"],
                    "email"=>$_POST["emailRegistro"]
                );
                /*Se le dice a un modelo llamado registroUsuarioModel
                los datos que se van almacenar, recibirá 2 prámetros:
                $datosController y el nombre de la tabla a la que hay
                que ir a guardar los datos*/
                $respuesta = Datos::registroProveedorModel($datosController,"proveedor");
                
                //Se imprime en la vista la respuesta del modelo
                if($respuesta == "success"){
                    header("location:index.php?action=ok");
                }else{
                    header("location:index.php");
                }
            }
        }
        
        //Controlador de vista de proveedor
        public function vistaProveedorController(){
            $respuesta = Datos::vistaProveedorModel("proveedor");

            /*El contructor foreach proporciona un modo sencillo de iterar
            sobre arrays, funciona solo con objetos y emitirá un error al intentar
            con una propiedad diferente o no inicializada*/
            foreach($respuesta as $row => $item){
                echo'<tr>
                    <td>'.$item["clave"].'</td>
                    <td>'.$item["nombre"].'</td>
                    <td>'.$item["rfc"].'</td>
                    <td>'.$item["tProveedor"].'</td>
                    <td>'.$item["empresa"].'</td>
                    <td>'.$item["email"].'</td>
                    <td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
                    <td><a href="index.php?action=proveedor&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
                    </tr>';
            }
        }

        //Controlador para editar proveedor
        public function editarProveedorController(){
            $datosController = $_GET["id"];
            $respuesta = Datos::editarProveedorModel($datosController,"proveedor");

            echo '
            <input type="hidden" value=" '.$respuesta["id"].' " name = "idEditar">
            <input type="text" value=" '.$respuesta["clave"].' " name = "claveEditar" required>
            <input type="text" value=" '.$respuesta["nombre"].' " name = "nombreEditar" required>
            <input type="text" value=" '.$respuesta["rfc"].' " name = "rfcEditar" required>
            <input type="text" value=" '.$respuesta["tProveedor"].' " name = "tProveedorEditar" required>
            <input type="text" value=" '.$respuesta["empresa"].' " name = "empresaEditar" required>
            <input type="text" value=" '.$respuesta["email"].' " name = "emailEditar" required>
            <input type="submit" value="Actualizar">
            ';
        }

        //Controlador para actualizr proveedor
        public function actualizarProveedorController(){
            if(isset($_POST["proveedorEditar"])){
                $datosController = array(
                    "id"=>$_POST["idEditar"],
                    "clave"=>$_POST["claveEditar"],
                    "nombre"=>$_POST["nombreEditar"],
                    "rfc"=>$_POST["rfcEditar"],
                    "tProveedor"=>$_POST["tProveedorEditar"],
                    "empresa"=>$_POST["empresaEditar"],
                    "email"=>$_POST["emailEditar"]
                );
                $respuesta = Datos::actualizarProveedorModel($datosController,"proveedor");

                //Recibimos respuesta del modelo
                if($respuesta == "success"){
                    header("location:index.php?action=cambio");
                }else{
                    echo "Error";
                }
            }
        }

        //Controlador para borrar proveedor
        public function borrarProveedorController(){
            if(isset($_GET["idBorrar"])){
                $datosController = $_GET["idBorrar"];
                $respuesta = Datos::borrarProveedorModel($datosController,"proveedor");
                //Recibimos respuesta del modelo
                if($respuesta == "ok"){
                    header("location:index.php?Action=proveedor");
                }
            }
        }
        //******************************************************************************/

        //EMPRESA
        //******************************************************************************/
        //Controlador registro de empresa
        public function registroEmpresaController(){
            if(isset($_POST["proveedorRegistro"])){
                /*Recibe a traves del método post el "name" (html), 
                se almacenaran los datos
                en una variable de tipo array con sus respectivas propiedades*/
                $datosController = array(
                    "nombre"=>$_POST["nombreRegistro"]
                );
                /*Se le dice a un modelo llamado registroUsuarioModel
                los datos que se van almacenar, recibirá 2 prámetros:
                $datosController y el nombre de la tabla a la que hay
                que ir a guardar los datos*/
                $respuesta = Datos::registroEmpresaModel($datosController,"empresa");
                
                //Se imprime en la vista la respuesta del modelo
                if($respuesta == "success"){
                    header("location:index.php?action=ok");
                }else{
                    header("location:index.php");
                }
            }
        }
        
        //Controlador de vista de la empresa
        public function vistaEmpresaController(){
            $respuesta = Datos::vistaEmpresaModel("empresa");

            /*El contructor foreach proporciona un modo sencillo de iterar
            sobre arrays, funciona solo con objetos y emitirá un error al intentar
            con una propiedad diferente o no inicializada*/
            foreach($respuesta as $row => $item){
                echo'<tr>
                    <td>'.$item["id"].'</td>
                    <td>'.$item["nombre"].'</td>
                    <td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
                    <td><a href="index.php?action=empresa&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
                    </tr>';
            }
        }

        //Controlador para editar empresa
        public function editarEmpresaController(){
            $datosController = $_GET["id"];
            $respuesta = Datos::editarEmpresaModel($datosController,"empresa");

            echo '
            <input type="hidden" value=" '.$respuesta["id"].' " name = "idEditar">
            <input type="text" value=" '.$respuesta["nombre"].' " name = "nombreEditar" required>
            <input type="submit" value="Actualizar">
            ';
        }

        //Controlador para actualizr empresa
        public function actualizarEmpresaController(){
            if(isset($_POST["empresaEditar"])){
                $datosController = array(
                    "id"=>$_POST["idEditar"],
                    "nombre"=>$_POST["nombreEditar"]
                    
                );
                $respuesta = Datos::actualizarEmpresaModel($datosController,"empresa");

                //Recibimos respuesta del modelo
                if($respuesta == "success"){
                    header("location:index.php?action=cambio");
                }else{
                    echo "Error";
                }
            }
        }

        //Controlador para borrar empresa
        public function borrarEmpresaController(){
            if(isset($_GET["idBorrar"])){
                $datosController = $_GET["idBorrar"];
                $respuesta = Datos::borrarEmpresaModel($datosController,"empresa");
                //Recibimos respuesta del modelo
                if($respuesta == "ok"){
                    header("location:index.php?Action=empresa");
                }
            }
        }
        //******************************************************************************/
        
    }

?>