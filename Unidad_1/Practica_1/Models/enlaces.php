<?php

    class Paginas{
        public function enlacesPaginasModel($enlaces){
            if($enlaces == "ingresar" || $enlaces == "registroUsuario" ||
            $enlaces == "usuarios" || $enlaces == "registroProveedor" || $enlaces == "registroEmpresa" ||
                $enlaces == "registroCategoria" || $enlaces == "proveedor" ||
                $enlaces == "empresa" || $enlaces == "categoria" ||
                $enlaces == "salir"){
                    $module = "Views/modules/".$enlaces.".php";
            }else if($enlaces == "index"){
                $module = "Views/modules/ingresar.php";
            }else if($enlaces == "ok"){
                $module = "Views/modules/registroUsuario.php";
            }else if($enlaces == "fallo"){
                $module = "Views/modules/registroUsuario.php";
            }else if($enlaces == "cambio"){
                $module = "Views/modules/usuarios.php";
            }else{
                $module = "Views/modules/ingresar.php";
            }
            return $module;

            //Incluir los URLS de las vistas para cada uno de los parametros
            //del if respecto a los  $enlaces
        }
    }
?>