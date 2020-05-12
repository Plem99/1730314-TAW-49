<?php
/*El index, en el mostraremos la salida de las vistas al usuario y tambien
 a traves de el enviaremos als distintas acciones que el usuario envie al controlador
 */

require_once "Models/enlaces.php";
require_once "Models/crud.php";
require_once "Models/crudProd.php";

require_once "Controllers/controller.php";

//para poder ver el template se hace la peticion mdiante el controlador.

//Creamos un objeto
$mvc = new MvcController();

//Mostrar la funcion o método "página" disponible en controllers/controller.php
$mvc -> pagina();


?>