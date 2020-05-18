<h1> Registro de Usuario </h1>

<form method="post">
    <input type = "text" placeholder = "Usuario" name="usuarioRegistro" required>
    <input type = "password" placeholder = "Contraseña" name="passwordRegistro" required>
    <input type = "text" placeholder = "Email" name="emailRegistro" required>
    <input type = "submit" value = "Enviar">
</form>

<?php
    //Enviar los parámetros del registro al controlador
    $registro = new MvcController();
    $registro -> registroUsuarioController();
    if(isset($_GET["action"])){
        echo "Registro exitoso";
    }
?>