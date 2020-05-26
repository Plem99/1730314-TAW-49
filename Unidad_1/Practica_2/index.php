<?php
    require_once('bd/conexion.php');
    require_once('controlador/estudiante_controller.php');
    require_once('controlador/universidad_controller.php');
    require_once('controlador/carrera_controller.php');

    $controllerEstudiante= new estudiante_controller();
    $controllerUniversidad= new universidad_controller();
    $controllerCarrera= new carrera_controller();
    
    if(!empty($_REQUEST['m'])){
        $metodo=$_REQUEST['m'];
        if (method_exists($controllerEstudiante, $metodo)) {
            $controllerEstudiante->$metodo();
        }else if(method_exists($controllerUniversidad, $metodo)){
            $controllerUniversidad->$metodo();
        }else if(method_exists($controllerCarrera, $metodo)){
            $controllerCarrera->$metodo();
        }else{
            $controllerEstudiante->listaEstudiante();
        }
        
    }else{
        $controllerEstudiante->listaEstudiante();
    }




?>