<?php
    //include_once 'bd/conexion2.php';
    

?>
<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2>Registro de Estudiantes</h2>
        
    </div>
    <div class="container">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>promedio</th>
                    <th>Edad</th>
                    <th>Fecha</th>
                    <th>Carrera</th>
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
                        <th><?php echo $data['cedula']; ?></th>
                        <th><?php echo $data['nombre']; ?></th>
                        <th><?php echo $data['apellidos']; ?></th>
                        <th><?php echo $data['promedio']; ?></th>
                        <th><?php echo $data['edad']; ?></th>
                        <th><?php echo $data['fecha']; ?></th>
                        <th><?php echo $data['id_carrera']; ?></th>
                        <th>
                            <a href="index.php?m=estudiante&id=<?php echo $data['id']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?m=confirmarDelete&id=<?php echo $data['id']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>