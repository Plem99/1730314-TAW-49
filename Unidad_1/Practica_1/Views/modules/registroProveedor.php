<?php
//session_start();
if(!$_SESSION["validar"]){
    header("location:index.php?action=ingresar");
    exit();
}
include_once 'Models/conexion2.php';
$sql= "SELECT * FROM tempresa";
$result = $link->query($sql);

$sql2= "SELECT * FROM tcategoria";
$result2 = $link->query($sql2);
?>
<div class="container">
    <div class="jumbotron">
        <h2> Registro de Proveedor </h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">


<form method="post">
    <div class="form-group">
        <label class=" col-sm-2 control-label" for="txt_id">Clave: </label>
        <div class="col-sm-10">
            <input type="text" placeholder = "Clave"  class="form-control" name="claveRegistro" required>
        </div>
    </div>
    <div class="form-group">
        <label class=" col-sm-2 control-label" for="txt_id">Nombre: </label>
        <div class="col-sm-10">
            <input type="text" placeholder = "Nombre"  class="form-control" name="nombreRegistro" required>
        </div>
    </div>
    <div class="form-group">
        <label class=" col-sm-2 control-label" for="txt_id">RFC: </label>
        <div class="col-sm-10">
            <input type="text" placeholder = "RFC"  class="form-control" name="rfcRegistro" required>
        </div>
    </div>
    <div class="form-group">
        <label class=" col-sm-2 control-label" for="txt_id">Tipo de Proveedor: </label>
        <div class="col-sm-10">
        <select class="form-control" name="categoriaRegistro">
                <?php
                    while($row = $result2->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value=".$row['id']." >".$row['nombre']."</option>";
                    }
                ?>
            </select>        
            </div>
    </div>
    <div class="form-group">
        <label class=" col-sm-2 control-label" for="txt_id">Empresa: </label>
        <div class="col-sm-10">
            <select class="form-control" name="empresaRegistro">
                <?php
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value=".$row['id']." >".$row['nombre']."</option>";
                    }
                ?>
            </select>
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
    $registro -> registroProveedorController();
    if(isset($_GET["registrar"])){
        echo "Registro exitoso";
    }
?>

</div>
</div>