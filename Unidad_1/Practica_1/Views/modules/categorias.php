<?php
    //session_start();
    if(!$_SESSION["validar"]){
        header("location: index.php?action=ingresar");
        exit();
    }
?>

<div class="container">
    <div class="jumbotron">
        <h2> Lista de Categorias </h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
<table class="table table-striped">
    <thead >
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead> 
    <tbody>
    <?php
        $vistaCategoria = new MvcController();
        $vistaCategoria -> vistaCategoriaController();
        $vistaCategoria -> borrarCategoriaController();
    ?>
    </tbody>
</table>
</div>
</div>