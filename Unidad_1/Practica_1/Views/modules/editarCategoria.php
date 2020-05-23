<?php
//session_start();
if(!$_SESSION["validar"]){
    header("location:index.php?action=ingresar");
    exit();
}
?>
<div class="container">
    <div class="jumbotron">
        <h2> Editar Categoria </h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
<form method="post">
    
    <?php
    $editarCategoria = new MvcController();
    $editarCategoria -> editarCategoriaController(); 
    $editarCategoria -> actualizarCategoriaController();
    ?>
</form>
</div>
</div>