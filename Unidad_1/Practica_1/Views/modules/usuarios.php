<?php
    session_start();
    if(!$_SESSION["validar"]){
        header("location: index.php?action=ingresar");
        exit();
    }
?>

<div class="container">
    <div class="jumbotron">
        <h2> Lista de Usuarios </h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
<table class="table table-striped">
    <thead >
        <tr>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Email</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $vistaUsuario = new MvcController();
        $vistaUsuario -> vistaUsuarioController();
        $vistaUsuario -> borrarUsuarioController();
    ?>
    </tbody>
</table>
<?php
    /*if(isset($_GET["action"])){
        if($_GET["action"] == "cambio"){
            echo "Cambio exitoso";
        }
    }*/
?>
</div>
</div>