<?php

    class Paginas{
        public function enlacesPaginasModel($enlaces){
            if($enlaces == "ingresar" || $enlaces == "usuarios" ||
                $enlaces == "productos" || $enlaces == "registroProducto" ||
                $enlaces == "editar" || $enlaces == "editarProducto" ||
                $enlaces == "salir"){
                    $module = "Views/modules/".$enlaces.".php";
            }else if($enlaces == "index"){
                $module = "Views/modules/registro.php";
            }else if($enlaces == "ok"){
                $module = "Views/modules/registro.php";
            }else if($enlaces == "fallo"){
                $module = "Views/modules/ingresar.php";
            }else if($enlaces == "cambio"){
                $module = "Views/modules/usuarios.php";
            }else{
                $module = "Views/modules/registro.php";
            }
            return $module;

            //Incluir los URLS de las vistas para cada uno de los parametros
            //del if respecto a los $enlaces
        }
    }
?>