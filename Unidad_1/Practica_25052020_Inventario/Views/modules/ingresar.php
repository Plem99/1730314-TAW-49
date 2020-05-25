<div class="container">
    <div class="jumbotron">
        <h2> Ingresar </h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">

<form method="post">

    <div class="form-group">
        <label class=" col-sm-2 control-label" for="txt_id">Usuario: </label>
        <div class="col-sm-10">
            <input type="text" placeholder = "Usuario"  class="form-control" name="usuarioIngreso" required>
        </div>
    </div>

    <div class="form-group">
        <label class=" col-sm-2 control-label" for="txt_id">Contraseña: </label>
        <div class="col-sm-10">
            <input type="password" placeholder = "Contraseña"  class="form-control" name="contrasenaIngreso" required>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12 col-md-off-set-3">
            <input type="submit" class="btn btn-primary form-control" name="" value="Enviar">     
        </div>
    </div>
</form>

<?php
    $ingreso = new MvcController();
    $ingreso -> ingresoUsuarioController();
    if(isset($_GET["action"])){
        if($_GET["action"] == "fallo"){
            echo "Fallo al ingresar";
        }
    }
?>

</div>
    </div>