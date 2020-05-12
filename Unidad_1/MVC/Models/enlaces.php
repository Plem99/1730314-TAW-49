<?php

    class Paginas{
        public function enlacesPaginasModel($enlaces){
            if($enlaces == "ingresar" || $enlaces == "usuarios" ||
                $enlaces == "productos" || $enlaces == "registroProducto" ||
                $enlaces == "editar" || $enlaces == "editarProducto" ||
                $enlaces == "salir"){
                    $module = "Views/modules/".$enlaces.".php";
            }

            //Incluir los URLS de las vistas para cada uno de los parametros
            // del if respecto a los $enlaces
        }
    }
?>