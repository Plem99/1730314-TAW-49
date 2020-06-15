<?php
    //Obtener nombre de la tabla con la que trabajaremos
    $c_get_table = "clients";

    //Obtener nombre de la vista del controlador (nombre del archivo de la vista)
    $c_get_name_view = "v_client";

    //Obtener id para actualizar
    $c_get_id_update = "idClientUpdate";

    //Obtener id para borrar
    $c_get_id_delete = "idClientDelete";

    //c_ = prefijo de 'controller'
    class c_client{

        //Mostrar alertas para el create, update, delete
        public function c_alerts($name, $action, $flag){
            if ($flag) {
                echo '
                <div class="col-md-6 mt-3">
                    <div class="alert alert-succes alert-dismissible">
                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                        <h5>
                            <i class="icon fas fa-check"></i>
                            Exito
                        </h5>
                        '.$name.' '.$action.' con exito.
                    </div>
                </div>
                ';
            } else {
                echo '
                <div class="col-md-6 mt-3">
                    <div class="alert alert-danger alert-dismissible">
                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                        <h5>
                            <i class="icon fas fa-ban"></i>
                            Error!
                        </h5>
                        Se ha producido un error al momento de '.$action.' al '.$name.', trate de nuevo.
                    </div>
                </div>
                ';
            }
        }

        //Crear clientes
        public function c_create_client(){
            $flag_client = isset($_POST['client_name_create_txt']);

            if ($flag_client) {
                $c_data = array("client_name" => $_POST["client_name_create_txt"],
                        "client_email" => $_POST["client_email_create_txt"],
                        "client_phone" => $_POST["client_phone_create_txt"],
                        "client_address" => $_POST["client_address_create_txt"],
                        "client_birthday" => $_POST["client_birthday_create_txt"],
                        "client_purchases" => $_POST["client_purchases_create_txt"]);

                $c_answer = m_client::m_create_client($c_data, $GLOBALS["c_get_table"]);

                //Simple texto para que aparezca en una alerta
                c_alerts('cliente', 'registrado', $c_answer);
            }

        }
        public function c_create_client_view(){
            ?>
            <div class="col-md-6 mt-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4><b>Crear</b> Cliente</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=<?php echo $GLOBALS["c_get_name_view"]; ?>" >
                            <div class="form-group">
                                <label for="client_name_update_txt">Nombre: </label>
                                <input class="form-control" type="text" name="client_name_update_txt" id="client_name_update_txt" placeholder="Ingrese el nuevo nombre"  required>
                            </div>
                            <div class="form-group">
                                <label for="client_email_update_txt">Email: </label>
                                <input class="form-control" type="email" name="client_email_update_txt" id="client_email_update_txt" placeholder="Ingrese el nuevo email"  required>
                            </div>
                            <div class="form-group">
                                <label for="client_phone_update_txt">Teléfono: </label>
                                <input class="form-control" type="number" name="client_phone_update_txt" id="client_phone_update_txt" placeholder="Ingrese el nuevo telefono"  required>
                            </div>
                            <div class="form-group">
                                <label for="client_address_update_txt">Dirección: </label>
                                <input class="form-control" type="text" name="client_address_update_txt" id="client_address_update_txt" placeholder="Ingrese la nueva direccion"  required>
                            </div>
                            <div class="form-group">
                                <label for="client_birthday_update_txt">Fecha de Nacimiento: </label>
                                <input class="form-control" type="date" name="client_birthday_update_txt" id="client_birthday_update_txt" placeholder="Ingrese la nueva fecha de nacimiento"  required>
                            </div>
                            <div class="form-group">
                                <label for="client_purchases_update_txt">Número de Compras: </label>
                                <input class="form-control" type="number" name="client_purchases_update_txt" id="client_purchases_update_txt" placeholder="Ingrese el numero de compras"  required>
                            </div>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
        //Ver clientes en forma de tabla
        public function c_read_client(){
            $c_answer = m_client::m_read_client($GLOBALS["c_get_table"]);
            foreach ($c_answer as $row => $item) {
                echo '
                    <tr>
                        <td>
                            <a href="index.php?action='.$GLOBALS["c_get_name_view"].'&'.$GLOBALS["c_get_id_update"].'='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                        </td>
                        <td>
                            <a href="index.php?action='.$GLOBALS["c_get_name_view"].'&'.$GLOBALS["c_get_id_delete"].'='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Elimianr" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                        </td>
                        <td>'.$item["client_name"].'</td>
                        <td>'.$item["client_email"].'</td>
                        <td>'.$item["client_phone"].'</td>
                        <td>'.$item["client_address"].'</td>
                        <td>'.$item["client_birthday"].'</td>
                        <td>'.$item["client_purchases"].'</td>
                    </tr>
                ';
            }
            
        }
        //Actualizar clientes
        public function c_update_client(){
            $flag_client = isset($_POST['client_name_update_txt']);

            if ($flag_client) {
                $c_data = array("id" => $_POST[$GLOBALS["c_get_id_update"]],
                        "client_name" => $_POST["client_name_update_txt"],
                        "client_email" => $_POST["client_email_update_txt"],
                        "client_phone" => $_POST["client_phone_update_txt"],
                        "client_address" => $_POST["client_address_update_txt"],
                        "client_birthday" => $_POST["client_birthday_update_txt"],
                        "client_purchases" => $_POST["client_purchases_update_txt"]);

                $c_answer = m_client::m_update_client($c_data, $GLOBALS["c_get_table"]);

                //Simple texto para que aparezca en una alerta
                c_alerts('cliente', 'actualizado', $c_answer);
            }
            
        }
        //Actualizar clientes (vista)
        public function c_update_client_view(){

            $c_data = $_GET[$GLOBALS["c_get_id_update"]];

            //envío de datos al modelo
            $c_answer = m_client::m_update_client_view($c_data, $GLOBALS["c_get_table"]);
            ?>
            <div class="col-md-6 mt-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4><b>Editor</b> de Cliente</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=<?php echo $GLOBALS["c_get_name_view"]; ?>" >
                            <div class="form-group">
                                <input type="hidden" name="<?php echo $GLOBALS["c_get_id_update"]; ?>" class="form-control" value="<?php echo $c_answer["id"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="client_name_update_txt">Nombre: </label>
                                <input class="form-control" type="text" name="client_name_update_txt" id="client_name_update_txt" placeholder="Ingrese el nuevo nombre" value="<?php echo $c_answer["client_name"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="client_email_update_txt">Email: </label>
                                <input class="form-control" type="email" name="client_email_update_txt" id="client_email_update_txt" placeholder="Ingrese el nuevo email" value="<?php echo $c_answer["client_email"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="client_phone_update_txt">Teléfono: </label>
                                <input class="form-control" type="number" name="client_phone_update_txt" id="client_phone_update_txt" placeholder="Ingrese el nuevo telefono" value="<?php echo $c_answer["client_phone"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="client_address_update_txt">Dirección: </label>
                                <input class="form-control" type="text" name="client_address_update_txt" id="client_address_update_txt" placeholder="Ingrese la nueva direccion" value="<?php echo $c_answer["client_address"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="client_birthday_update_txt">Fecha de Nacimiento: </label>
                                <input class="form-control" type="date" name="client_birthday_update_txt" id="client_birthday_update_txt" placeholder="Ingrese la nueva fecha de nacimiento" value="<?php echo $c_answer["client_birthday"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="client_purchases_update_txt">Número de Compras: </label>
                                <input class="form-control" type="number" name="client_purchases_update_txt" id="client_purchases_update_txt" placeholder="Ingrese el numero de compras" value="<?php echo $c_answer["client_purchases"]; ?>" required>
                            </div>
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
        //Borrar clientes
        public function c_delete_client(){
            $flag_client = isset($_GET[$GLOBALS["c_get_id_delete"]]);

            if ($flag_client) {
                $c_data = $_GET[$GLOBALS["c_get_id_delete"]];

                $c_answer = m_client::m_delete_client($c_data, $GLOBALS["c_get_table"]);

                //Simple texto para que aparezca en una alerta
                c_alerts('cliente', 'borrado', $c_answer);
            }
            
        }

        

    }





?>