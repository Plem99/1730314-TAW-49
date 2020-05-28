<?php

    class Paginas{
        public function enlacesPaginasModel($enlaces){
            if($enlaces == "ingresar" ||$enlaces == "usuarios" || $enlaces == "inventario" ||
            $enlaces == "categorias" || $enlaces == "tablero" || $enlaces == "ventas" ||
            $enlaces == "salir"){
                    $module = "Views/modules/".$enlaces.".php";
            }else if($enlaces == "index"){
                $module = "Views/modules/tablero.php";
            }else{
                $module = "Views/modules/tablero.php";
            }
            return $module;

            //Incluir los URLS de las vistas para cada uno de los parametros
            //del if respecto a los  $enlaces
        }
    }
?>