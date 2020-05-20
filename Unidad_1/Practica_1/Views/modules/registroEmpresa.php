<h1> Registro de Empresa </h1>

<form method="post">
    <input type = "text" placeholder = "Nombre" name="nombreRegistro" required>
    <input type = "submit" value = "Enviar">
</form>

<?php
    //Enviar los parámetros del registro al controlador
    $registro = new MvcController();
    $registro -> registroEmpresaController();
    if(isset($_GET["action"])){
        echo "Registro exitoso";
    }
?>