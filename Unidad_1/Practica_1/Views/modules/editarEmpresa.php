<?php
session_start();
if(!$_SESSION["validar"]){
    header("location:index.php?action=ingresar");
    exit();
}
?>
<h1>Editar Empresa</h1>
<form method="post">
    
    <?php
    $editarEmpresa = new MvcController();
    $editarEmpresa -> editarProveedorController(); 
    $editarEmpresa -> actualizarProveedorController();
    ?>
</form>