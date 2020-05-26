<?php
//session_start();
//if(!$_SESSION["validar"]){
    //header("location:index.php?action=ingresar");
//    exit();
//}
include_once 'bd/conexion2.php';
$sql= "SELECT * FROM universidad";
$result = $link->query($sql);

?>
<div class="container">
    <div class="jumbotron">
        <h2>Formulario Registro Carrera</h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <?php if($data['id']==""){ ?>
            <form action="index.php?m=get_datosC" method="post">
            <?php } ?>
            <?php if($data['id']!=""){ ?>
            <form action="index.php?m=get_datosC&id=<?php echo $data['id'];?>" method="post">
            <?php } ?>

                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_id">ID:</label>
                    <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_id" disabled="" value="<?php echo $data['id']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_nombre" value="<?php echo $data['nombre']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_codigo">Codigo:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_codigo" value="<?php echo $data['codigo']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_descripcion">Descripcion:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_descripcion" value="<?php echo $data['descripcion']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_universidad">Universidad:</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="txt_universidad">
                        <?php
                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                echo "<option value=".$row['id']." >".$row['nombre']."</option>";
                            }
                        ?>
                    </select> 
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                    <?php if($data['id']==""){ ?>
                        <input type="submit" class="btn btn-primary form-control" name="" value="Registrar">
                    <?php }  ?>
                    <?php if($data['id']!=""){ ?>
                    <input type="submit" class="btn btn-primary form-control" name="" value="Actualizar">
                    <?php }  ?>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    
</div>