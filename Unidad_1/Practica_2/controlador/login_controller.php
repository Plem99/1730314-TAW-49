<?php 
    require_once('modelo/login_model.php');

    class login_controller{

        private $model_e;
        private $model_p;

        function __construct(){
            $this->model_e=new login_model();
        }

        //Login usuarios
        public function loginController(){
            if(isset($_POST["txt_nombre"]) && isset($_POST["txt_contrasena"])){
                $datosController = array(
                    "nombre"=>$_POST["txt_nombre"],
                    "contrasena"=>$_POST["txt_contrasena"]
                );
                $respuesta = Datos::loginModel($datosController,"usuario");
                //Validacion de la respuesta del modelo para ver si es un usuario correcto
                if($respuesta["nombre"] == $_POST["txt_nombre"] &&
                    $respuesta["contrasena"] == $_POST["txt_contrasena"]){
                    session_start();
                    $_SESSION["validar"] = true;
                    header("location:index.php?m=listaEstudiante");
                }else{
                    header("location:index.php?action=login");
                }
            }
        } 

    }
?>