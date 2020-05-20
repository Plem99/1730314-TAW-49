<h1> Registro de Proveedor </h1>

<form method="post">
    <input type = "text" placeholder = "Clave" name="claveRegistro" required>
    <input type = "text" placeholder = "Nombre" name="nombreRegistro" required>
    <input type = "text" placeholder = "RFC" name="rfcRegistro" required>
    <input type = "text" placeholder = "Tipo de Proveedor" name="tProveedorRegistro" required>
    <input type = "text" placeholder = "Empresa" name="empresaRegistro" required>
    <input type = "text" placeholder = "Email" name="emailRegistro" required>
    <input type = "submit" value = "Enviar">
</form>

<?php
    //Enviar los parámetros del registro al controlador
    $registro = new MvcController();
    $registro -> registroProveedorController();
    if(isset($_GET["action"])){
        echo "Registro exitoso";
    }
?>