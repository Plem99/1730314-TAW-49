<div class="container">
    <div class="jumbotron">
        <h2> Registro de Usuarios </h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">


<form method="post">
    <div class="form-group">
        <label class=" col-sm-2 control-label" for="txt_id">Nombre: </label>
        <div class="col-sm-10">
            <input type="text" placeholder = "Nombre"  class="form-control" name="usuarioRegistro" required>
        </div>
    </div>
    <div class="form-group">
        <label class=" col-sm-2 control-label" for="txt_id">Contraseña: </label>
        <div class="col-sm-10">
            <input type="password" placeholder = "Contraseña"  class="form-control" name="contrasenaRegistro" required>
        </div>
    </div>
    <div class="form-group">
        <label class=" col-sm-2 control-label" for="txt_id">Email: </label>
        <div class="col-sm-10">
            <input type="text" placeholder = "Email"  class="form-control" name="emailRegistro" required>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12 col-md-off-set-3">
            <input type="submit" class="btn btn-primary form-control" name="" value="registrar">     
        </div>
    </div>
</form>

<?php
    //Enviar los parámetros del registro al controlador
    $registro = new MvcController();
    $registro -> registroUsuarioController();
    if(isset($_GET["registrar"])){
        echo "Registro exitoso";
    }
?>

</div>
</div>