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
            if(isset($_POST["usuarioIngreso"])){
                $datosController = array(
                    "usuario"=>$_POST["usuarioIngreso"],
                    "contrasena"=>$_POST["contrasenaIngreso"]
                );
                $respuesta = Datos::ingresoUsuarioModel($datosController,"tusuario");
                //Validacion de la respuesta del modelo para ver si es un usuario correcto
                if($respuesta["usuario"] == $_POST["usuarioIngreso"] &&
                    $respuesta["contrasena"] == $_POST["contrasenaIngreso"]){
                    session_start();
                    $_SESSION["validar"] = true;
                    header("location:index.php?action=usuarios");
                }else{
                    header("location:index.php?action=inicio");
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
        //PROVEEDOR
        //******************************************************************************/
        //Controlador registro de proveedor
        public function registroProveedorController(){
            if(isset($_POST["nombreRegistro"])){
                /*Recibe a traves del método post el "name" (html), 
                se almacenaran los datos
                en una variable de tipo array con sus respectivas propiedades*/
                $datosController = array(
                    "clave"=>$_POST["claveRegistro"],
                    "nombre"=>$_POST["nombreRegistro"],
                    "rfc"=>$_POST["rfcRegistro"],
                    "email"=>$_POST["emailRegistro"],
                    "empresa"=>$_POST["empresaRegistro"],
                    "categoria"=>$_POST["categoriaRegistro"]
                );
                /*Se le dice a un modelo llamado registroUsuarioModel
                los datos que se van almacenar, recibirá 2 prámetros:
                $datosController y el nombre de la tabla a la que hay
                que ir a guardar los datos*/
                $respuesta = Datos::registroProveedorModel($datosController,"tproveedor");
                
                //Se imprime en la vista la respuesta del modelo
                if($respuesta == "success"){
                    header("location:index.php?action=proveedores");
                }else{
                    header("location:index.php?action=inicio");
                }
            }
        }
        
        //Controlador de vista de proveedor
        public function vistaProveedorController(){
            $respuesta = Datos::vistaProveedorModel("tproveedor");

            /*El contructor foreach proporciona un modo sencillo de iterar
            sobre arrays, funciona solo con objetos y emitirá un error al intentar
            con una propiedad diferente o no inicializada*/
            foreach($respuesta as $row => $item){
                echo'<tr>
                    <td>'.$item["clave"].'</td>
                    <td>'.$item["nombre"].'</td>
                    <td>'.$item["rfc"].'</td>
                    <td>'.$item["email"].'</td>
                    <td>'.$item["id_empresa"].'</td>
                    <td>'.$item["id_categoria"].'</td>
                    <td><a href="index.php?action=editarProveedor&id='.$item["id"].'"><button class="btn btn-success">Editar</button></a></td>
                    <td><a href="index.php?action=proveedores&idBorrar='.$item["id"].'"><button class="btn btn-danger">Borrar</button></a></td>
                    </tr>';
            }
        }

        //Controlador para editar proveedor
        public function editarProveedorController(){
            include_once 'Models/conexion2.php';
            $sql= "SELECT * FROM tempresa";
            $result = $link->query($sql);

            $sql2= "SELECT * FROM tcategoria";
            $result2 = $link->query($sql2);
            $datosController = $_GET["id"];
            $respuesta = Datos::editarProveedorModel($datosController,"tproveedor");
            echo '
            <input type="hidden" value=" '.$respuesta["id"].' " class="form-control" name="idEditar">
        
            <div class="form-group">
                <label class=" col-sm-2 control-label" for="txt_id">Clave: </label>
                <div class="col-sm-10">
                    <input type="text" value=" '.$respuesta["clave"].'" placeholder = "Clave"  class="form-control" name="claveEditar" required>
                </div>
            </div>
            <div class="form-group">
                <label class=" col-sm-2 control-label" for="txt_id">Nombre: </label>
                <div class="col-sm-10">
                    <input type="text" value=" '.$respuesta["nombre"].'" placeholder = "Nombre"  class="form-control" name="nombreEditar" required>
                </div>
            </div>
            <div class="form-group">
                <label class=" col-sm-2 control-label" for="txt_id">RFC: </label>
                <div class="col-sm-10">
                    <input type="text" value=" '.$respuesta["rfc"].'" placeholder = "RFC"  class="form-control" name="rfcEditar" required>
                </div>
            </div>
            <div class="form-group">
                <label class=" col-sm-2 control-label" for="txt_id">Tipo de Proveedor: </label>
                <div class="col-sm-10">
                <select class="form-control" name="categoriaEditar">';
                        
                            while($row = $result2->fetch(PDO::FETCH_ASSOC)){
                                echo "<option value=".$row['id']." >".$row['nombre']."</option>";
                            }
                        
                echo   ' </select>        
                    </div>
            </div>
            <div class="form-group">
                <label class=" col-sm-2 control-label" for="txt_id">Empresa: </label>
                <div class="col-sm-10">
                    <select class="form-control" name="empresaEditar">';
                        
                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                echo "<option value=".$row['id']." >".$row['nombre']."</option>";
                            }
                        
                    echo '</select>
                </div>
            </div>
            <div class="form-group">
                <label class=" col-sm-2 control-label" for="txt_id">Email: </label>
                <div class="col-sm-10">
                    <input type="text" value=" '.$respuesta["email"].'" placeholder = "Email"  class="form-control" name="emailEditar" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 col-md-off-set-3">
                    <input type="submit" class="btn btn-primary form-control" name="" value="Actualizar">     
                </div>
            </div>
            ';
        }

        //Controlador para actualizr proveedor
        public function actualizarProveedorController(){
            if(isset($_POST["nombreEditar"])){
                $datosController = array(
                    "id"=>$_POST["idEditar"],
                    "clave"=>$_POST["claveEditar"],
                    "nombre"=>$_POST["nombreEditar"],
                    "rfc"=>$_POST["rfcEditar"],
                    "categoria"=>$_POST["categoriaEditar"],
                    "empresa"=>$_POST["empresaEditar"],
                    "email"=>$_POST["emailEditar"]
                );
                $respuesta = Datos::actualizarProveedorModel($datosController,"tproveedor");

                //Recibimos respuesta del modelo
                if($respuesta == "success"){
                    header("location:index.php?action=proveedores");
                }else{
                    echo "Error";
                }
            }
        }

        //Controlador para borrar proveedor
        public function borrarProveedorController(){
            if(isset($_GET["idBorrar"])){
                $datosController = $_GET["idBorrar"];
                $respuesta = Datos::borrarProveedorModel($datosController,"tproveedor");
                //Recibimos respuesta del modelo
                if($respuesta == "ok"){
                    header("location:index.php?action=proveedores");
                }
            }
        }
        //******************************************************************************/

        //EMPRESA
        //******************************************************************************/
        //Controlador registro de empresa
        public function registroEmpresaController(){
            if(isset($_POST["nombreRegistro"])){
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
                $respuesta = Datos::registroEmpresaModel($datosController,"tempresa");
                
                //Se imprime en la vista la respuesta del modelo
                if($respuesta == "success"){
                    header("location:index.php?action=empresas");
                }else{
                    header("location:index.php");
                }
            }
        }
        
        //Controlador de vista de la empresa
        public function vistaEmpresaController(){
            $respuesta = Datos::vistaEmpresaModel("tempresa");

            /*El contructor foreach proporciona un modo sencillo de iterar
            sobre arrays, funciona solo con objetos y emitirá un error al intentar
            con una propiedad diferente o no inicializada*/
            foreach($respuesta as $row => $item){
                echo'<tr>
                    <td>'.$item["id"].'</td>
                    <td>'.$item["nombre"].'</td>
                    <td><a href="index.php?action=editarEmpresa&id='.$item["id"].'"><button class="btn btn-success">Editar</button></a></td>
                    <td><a href="index.php?action=empresas&idBorrar='.$item["id"].'"><button class="btn btn-danger">Borrar</button></a></td>
                    </tr>';
            }
        }

        //Controlador para editar empresa
        public function editarEmpresaController(){
            $datosController = $_GET["id"];
            $respuesta = Datos::editarEmpresaModel($datosController,"tempresa");

            echo '
            <input type="hidden" value=" '.$respuesta["id"].' " name = "idEditar">
            <div class="form-group">
                <label class=" col-sm-2 control-label" for="txt_id">Nombre: </label>
                <div class="col-sm-10">
                    <input type="text" value=" '.$respuesta["nombre"].' " placeholder = "Nombre"  class="form-control" name="nombreEditar" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 col-md-off-set-3">
                    <input type="submit" class="btn btn-primary form-control" name="" value="Actualizar">     
                </div>
            </div>
            ';
        }

        //Controlador para actualizr empresa
        public function actualizarEmpresaController(){
            if(isset($_POST["nombreEditar"])){
                $datosController = array(
                    "id"=>$_POST["idEditar"],
                    "nombre"=>$_POST["nombreEditar"]
                    
                );
                $respuesta = Datos::actualizarEmpresaModel($datosController,"tempresa");

                //Recibimos respuesta del modelo
                if($respuesta == "success"){
                    header("location:index.php?action=empresas");
                }else{
                    echo "Error";
                }
            }
        }

        //Controlador para borrar empresa
        public function borrarEmpresaController(){
            if(isset($_GET["idBorrar"])){
                $datosController = $_GET["idBorrar"];
                $respuesta = Datos::borrarEmpresaModel($datosController,"tempresa");
                //Recibimos respuesta del modelo
                if($respuesta == "ok"){
                    header("location:index.php?action=empresas");
                }
            }
        }
        //******************************************************************************/

        //CATEGORIA
        //******************************************************************************/
        //Controlador registro de categoria
        public function registroCategoriaController(){
            if(isset($_POST["nombreRegistro"])){
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
                $respuesta = Datos::registroCategoriaModel($datosController,"tcategoria");
                
                //Se imprime en la vista la respuesta del modelo
                if($respuesta == "success"){
                    header("location:index.php?action=categorias");
                }else{
                    header("location:index.php");
                }
            }
        }
        
        //Controlador de vista de la categoria
        public function vistaCategoriaController(){
            $respuesta = Datos::vistaCategoriaModel("tcategoria");

            /*El contructor foreach proporciona un modo sencillo de iterar
            sobre arrays, funciona solo con objetos y emitirá un error al intentar
            con una propiedad diferente o no inicializada*/
            foreach($respuesta as $row => $item){
                echo'<tr>
                    <td>'.$item["id"].'</td>
                    <td>'.$item["nombre"].'</td>
                    <td><a href="index.php?action=editarCategoria&id='.$item["id"].'"><button class="btn btn-success">Editar</button></a></td>
                    <td><a href="index.php?action=categorias&idBorrar='.$item["id"].'"><button class="btn btn-danger">Borrar</button></a></td>
                    </tr>';
            }
        }

        //Controlador para editar categoria
        public function editarCategoriaController(){
            $datosController = $_GET["id"];
            $respuesta = Datos::editarCategoriaModel($datosController,"tcategoria");

            echo '
            <input type="hidden" value=" '.$respuesta["id"].' " name = "idEditar">
            <div class="form-group">
                <label class=" col-sm-2 control-label" for="txt_id">Nombre: </label>
                <div class="col-sm-10">
                    <input type="text" value=" '.$respuesta["nombre"].' " placeholder = "Nombre"  class="form-control" name="nombreEditar" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 col-md-off-set-3">
                    <input type="submit" class="btn btn-primary form-control" name="" value="Actualizar">     
                </div>
            </div>
            ';
        }

        //Controlador para actualizr categoria
        public function actualizarCategoriaController(){
            if(isset($_POST["nombreEditar"])){
                $datosController = array(
                    "id"=>$_POST["idEditar"],
                    "nombre"=>$_POST["nombreEditar"]
                    
                );
                $respuesta = Datos::actualizarCategoriaModel($datosController,"tcategoria");

                //Recibimos respuesta del modelo
                if($respuesta == "success"){
                    header("location:index.php?action=categorias");
                }else{
                    echo "Error";
                }
            }
        }

        //Controlador para borrar Categoria
        public function borrarCategoriaController(){
            if(isset($_GET["idBorrar"])){
                $datosController = $_GET["idBorrar"];
                $respuesta = Datos::borrarCategoriaModel($datosController,"tcategoria");
                //Recibimos respuesta del modelo
                if($respuesta == "ok"){
                    header("location:index.php?action=categorias");
                }
            }
        }
        //******************************************************************************/
        
    }

?>