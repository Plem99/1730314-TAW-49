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
                $respuesta = Datos::ingresoUsuarioModel($datosController,"users");
                //Validacion de la respuesta del modelo para ver si es un usuario correcto
                if($respuesta["user"] == $_POST["txtUser"] &&
                    password_verify($_POST["txtPassword"], $respuesta["password"])){
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

        //Controlador de vista de Usuario
        public function vistaUsuarioController(){
            $respuesta = Datos::vistaUsuarioModel("users");

            /*El contructor foreach proporciona un modo sencillo de iterar
            sobre arrays, funciona solo con objetos y emitirá un error al intentar
            con una propiedad diferente o no inicializada*/
            foreach($respuesta as $row => $item){
                echo'<tr>
                    <td><a href="index.php?action=editarUsuario&id='.$item["id"].'"><button class="btn btn-success">Editar</button></a></td>
                    <td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button class="btn btn-danger">Borrar</button></a></td>
                    <td>'.$item["firstname"].'</td>
                    <td>'.$item["lastname"].'</td>
                    <td>'.$item["user_name"].'</td>
                    <td>'.$item["user_email"].'</td>
                    <td>'.$item["date_added"].'</td>
                    </tr>';
            }
        }

        //Controlador registro de Usuario
        public function registroUsuarioController(){
            ?>
            <div class="col-md-6 mt-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h4><b>Registro</b> de Usuarios</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="index.php?action=usuarios">
                        <div class="form-group">
                            <label for="nusuariotxt">Nombre: </label>
                            <input class="form-control" type="text" name="nusuariotxt" id="nusuariotxt" placeholder="Ingrese el nombre" required />
                        </div>
                        <div class="form-group">
                            <label for="ausuariotxt">Apellido: </label>
                            <input class="form-control" type="text" name="ausuariotxt" id="ausuariotxt" placeholder="Ingrese el apellido" required />
                        </div>
                        <div class="form-group">
                            <label for="usuariotxt">Usuario: </label>
                            <input class="form-control" type="text" name="usuariotxt" id="usuariotxt" placeholder="Ingrese el usuario" required />
                        </div>
                        <div class="form-group">
                            <label for="ucontratxt">Contraseña: </label>
                            <input class="form-control" type="password" name="ucontratxt" id="ucontratxt" placeholder="Ingrese la contraseña" required />
                        </div>
                        <div class="form-group">
                            <label for="uemailtxt">Correo Electrónico: </label>
                            <input class="form-control" type="email" name="uemailtxt" id="uemailtxt" placeholder="Ingrese el correo electrónico" required />
                        </div>
                        <button class="btn btn-primary" type="submit">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
        }

        public function insertarUserController(){
            if(isset($_POST["nusuariotxt"])){
                //Encriptar la ontraseña
                $_POST["ucontratxt"] = password_hash($_POST["ucontatxt"], PASSWORD_DEFAULT);
                //Almacenar en un array los valores de los textos del metodod "registrarUserController"
                $datosController = array("nusuario"=>$_POST["nusuariotext"],"ausuario"=>$_POST["ausuariotxt"],
            "usuario"=>$_POST["usuariotxt"],"contra"=>$_POST["ucontratxt"],"email"=>$_POST["uemailtxt"]);
                //Enviar datos al modelo
                $respuesta = Datos::insertarUserModel($datosController,"users");

                //Respuesta del modelo
                if($respuesta=="success"){
                    echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-success alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-check"></i>
                                    ¡Exito!
                                </h5>
                                Usuario Agregado con Éxito
                            </div>
                        </div>
                    ';
                }else{
                    echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-success alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-check"></i>
                                    ¡Error!
                                </h5>
                                Se ha producido un error al momento de agregar al usuario, intente de nuevo
                            </div>
                        </div>
                    ';
                }
            }
        }
        
        /*-- Este controlador se encarga de mostrar el formulario al usuario para editar sus datos, la contraseña no se carga debido a que como esta encriptada, no es optimo mostrarle al usuario su contraseña como una cadena de caracteres y se deja
        en blanco, pero se verifica al momento de hacer una modifica que haya ingresado una contraseña, si no es el caso entonces no se podrá ejecutar la modificación y cada que se quiera hacer una modificación a un determinado usuario, se deberá
        ingresar tambien una nueva contraseña --*/ 
        public function editarUserController() { 
            $datosController = $_GET["idUserEditar"]; //envío de datos al mododelo 
            $respuesta = Datos::editarUserModel($datosController,"users");
                ?>
                <div class="col-md-6 mt-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4><b>Editor</b> de Usuarios</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=usuarios">
                            <div class="form-group"><input type="hidden" name="idUserEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required></div>
                            <div class="form-group">
                                <label for="nusuariotxtEditar">Nombre: </label>
                                <input class="form-control" type="text" name="nusuariotxtEditar" id="nusuariotxtEditar" placeholder="Ingrese el nuevo nombre" value="<?php echo $respuesta["nusuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ausuariotxtEditar">Apellido: </label>
                                <input class="form-control" type="text" name="ausuariotxtEditar" id="ausuariotxtEditar" placeholder="Ingrese el nuevo apellido" value="<?php echo $respuesta["ausuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="usuariotxtEditar">Usuario: </label>
                                <input class="form-control" type="text" name="usuariotxtEditar" id="usuariotxtEditar" placeholder="Ingrese el nuevo usuario" value="<?php echo $respuesta["usuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="contratxtEditar">Contraseña: </label>
                                <input class="form-control" type="password" name="contratxtEditar" id="contratxtEditar" placeholder="Ingrese la nueva contraseña" required />
                            </div>
                            <div class="form-group">
                                <label for="uemailtxtEditar">Correo Electrónico: </label>
                                <input class="form-control" type="email" name="uemailtxtEditar" id="uemailtxtEditar" placeholder="Ingrese el nuevo correo electrónico" value="<?php echo $respuesta["email"]; ?>" required>
                            </div>
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </form>
                    </div>
                </div>
                </div>
                <?php
        }

        //Controlador para actualizar Usuario
        public function actualizarUserController(){
            if(isset($_POST["nusuariotxtEditar"])){
                //Encriptar la ontraseña
                $_POST["contratxtEditar"] = password_hash($_POST["contatxtEditar"], PASSWORD_DEFAULT);
                //Almacenar en un array los valores de los textos del metodod "registrarUserController"
                $datosController = array("id"=>$_POST["idUserEditar"],"usuario"=>$_POST["nusuariotxtEditar"],
            "ausuario"=>$_POST["ausuariotxtEditar"],"usuario"=>$_POST["usuariotxtEditar"],"contra"=>$_POST["contratxtEditar"],"email"=>$_POST["uemailtxtEditar"]);
                
                //Enviar datos al modelo
                $respuesta = Datos::actualizarUserModel($datosController,"users");
                //Respuesta del modelo
                if($respuesta=="success"){
                    echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-success alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-check"></i>
                                    ¡Exito!
                                </h5>
                                Usuario Editado con Éxito
                            </div>
                        </div>
                    ';
                }else{
                    echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-success alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-check"></i>
                                    ¡Error!
                                </h5>
                                Se ha producido un error al momento de editar al usuario, intente de nuevo
                            </div>
                        </div>
                    ';
                }
            }
        }

        //Controlador para borrar Usuario
        public function eliminarUserController(){
            if(isset($_POST["idBorrar"])){
                //Almacenar en un array los valores de los textos del metodod "registrarUserController"
                $datosController = $_GET["idBorrar"];
                //Enviar datos al modelo
                $respuesta = Datos::eliminarUserModel($datosController,"users");
                //Respuesta del modelo
                if($respuesta=="success"){
                    echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-success alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-check"></i>
                                    ¡Exito!
                                </h5>
                                Usuario Eliminado con Éxito
                            </div>
                        </div>
                    ';
                }else{
                    echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-success alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-check"></i>
                                    ¡Error!
                                </h5>
                                Se ha producido un error al momento de Eliminar al usuario, intente de nuevo
                            </div>
                        </div>
                    ';
                }
            }
        }
        //******************************************************************************/
        //CONTROLADORES PARA EL TABLERO //
        //-- Este controlador sirve para mostrarle al usuario las cajas donde se tiene información sobre los usuarios, productos y ventas registradas, así como los movimientos que se tienen en el historial (altas/bajas de productos) y las ganancias que se tienen de acuerdo a todas las ventas --/
        public function contarFilas () {
            $respuesta_users = Datos::contarFilasModel("users");
            $respuesta_products = Datos::contarFilasModel("products");
            $respuesta_categories = Datos::contarFilasModel("categories");
            $respuesta_historial = Datos::contarFilasModel("historial");
            echo '
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>'.$respuesta_users["filas"].'</h3>
                                        <p>Total de Usuarios</p>
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-address-card"></i>
                                    </div>
                                    <a class="small-box-footer" href="index.php?action=usuarios">Más <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
            <div class="col-lg-3 col-6">
                                <div class="small-box bg-teal">
                                    <div class="inner">
                                        <h3>'.$respuesta_products["filas"].'</h3>
                                        <p>Total de Productos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-box"></i>
                                    </div>
                                    <a class="small-box-footer" href="index.php?action=inventario">Más <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
            <div class="col-lg-3 col-6">
                                <div class="small-box bg-olive">
                                    <div class="inner">
                                        <h3>'.$respuesta_categories["filas"].'</h3>
                                        <p>Total de Categorías</p>
                                    </div>
                                    <div class="icon">
                                    <i class="fas fa-tag"></i>
                                    </div>
                                    <a class="small-box-footer" href="index.php?action=categorias">Más <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
            <div class="col-lg-3 col-6">
                                <div class="small-box bg-gray">
                                    <div class="inner">
                                        <h3>'.$respuesta_historial["filas"].'</h3>
                                        <p>Movimientos en el Inventario</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-archive"></i>
                                    </div>
                                    <a class="small-box-footer" href="index.php?action=inventario">Más <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
            ';
                }
            }
?>