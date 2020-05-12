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
    }

?>