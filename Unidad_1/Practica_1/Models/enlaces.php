<?php

    class Paginas{
        public function enlacesPaginasModel($enlaces){
            if($enlaces == "editarUsuario" ||$enlaces == "editarProveedor" || $enlaces == "editarCategoria" ||
            $enlaces == "editarEmpresa" || $enlaces == "ingresar" || $enlaces == "registroUsuario" ||
            $enlaces == "usuarios" || $enlaces == "registroProveedor" || $enlaces == "registroEmpresa" ||
                $enlaces == "registroCategoria" || $enlaces == "proveedores" ||
                $enlaces == "empresas" || $enlaces == "categorias" ||
                $enlaces == "salir"){
                    $module = "Views/modules/".$enlaces.".php";
            }else if($enlaces == "index"){
                $module = "Views/modules/ingresar.php";
            }else if($enlaces == "ok"){
                $module = "Views/modules/usuarios.php";
            }else if($enlaces == "inicio"){
                $module = "Views/modules/registroUsuario.php";
            }else{
                $module = "Views/modules/ingresar.php";
            }
            return $module;

            //Incluir los URLS de las vistas para cada uno de los parametros
            //del if respecto a los  $enlaces
        }
    }
?>