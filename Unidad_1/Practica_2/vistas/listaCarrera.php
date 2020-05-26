<?php
    //include_once 'bd/conexion2.php';
    

?>
<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2>Registro de Carreras</h2>
        
    </div>
    <div class="container">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th>Universidad</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($query as $data): 
                    //$val = $data['id_carrera'];
                    //$sql= "SELECT nombre  FROM carrera WHERE id ='$val'";
                    //$carrera = $link->query($sql);    
                ?>
                    <tr>
                        <th><?php echo $data['id']; ?></th>
                        <th><?php echo $data['nombre']; ?></th>
                        <th><?php echo $data['codigo']; ?></th>
                        <th><?php echo $data['descripcion']; ?></th>
                        <th><?php echo $data['id_universidad']; ?></th>
                        <th>
                            <a href="index.php?m=carrera&id=<?php echo $data['id']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?m=confirmarDeleteC&id=<?php echo $data['id']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>