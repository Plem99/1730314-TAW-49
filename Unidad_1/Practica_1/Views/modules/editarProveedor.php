<?php
/*session_start();
if(!$_SESSION["validar"]){
    header("location:index.php?action=ingresar");
    exit();
}*/
?>
<h1>Editar Proveedor</h1>
<form method="post">
    
    <?php
    $editarProveedor = new MvcController();
    $editarProveedor -> editarProveedorController();
    $editarProveedor -> actualizarProveedorController();
    ?>
</form>