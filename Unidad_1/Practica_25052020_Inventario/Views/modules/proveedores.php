<?php
    //session_start();
    if(!$_SESSION["validar"]){
        header("location: index.php?action=ingresar");
        exit();
    }
?>

<div class="container">
    <div class="jumbotron">
        <h2> Lista de Proveedores </h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
<table class="table table-striped">
    <thead >
        <tr>
            <th>Clave</th>
            <th>Nombre</th>
            <th>RFC</th>
            <th>Email</th>
            <th>Empresa</th>
            <th>Tipo de Proveedor</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead> 
    <tbody>
    <?php
        $vistaProveedor = new MvcController();
        $vistaProveedor -> vistaProveedorController();
        $vistaProveedor -> borrarProveedorController();
    ?>
    </tbody>
</table>
</div>
</div>