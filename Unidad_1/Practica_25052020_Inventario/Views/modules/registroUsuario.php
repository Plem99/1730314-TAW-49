<div class="col-md-6 mt-3">
    <div class="card card-primary">
        <div class="card-header">
            <h4><b>Registro</b> de Usuarios</h4>
        </div>
        <div class="card-body">
            <form method="post" action="index.php?action=usuarios">
                <div class="form-group">
                    <label for="nusuariotxt">Nombre: </label>
                    <input class="form-control" type="text" name="nusuariotxt" id="nusuariotxt" placeholder="Ingrese el nombre" required />
                </div>
                <div class="form-group">
                    <label for="ausuariotxt">Apellido: </label>
                    <input class="form-control" type="text" name="ausuariotxt" id="ausuariotxt" placeholder="Ingrese el apellido" required />
                </div>
                <div class="form-group">
                    <label for="usuariotxt">Usuario: </label>
                    <input class="form-control" type="text" name="usuariotxt" id="usuariotxt" placeholder="Ingrese el usuario" required />
                </div>
                <div class="form-group">
                    <label for="ucontratxt">Contraseña: </label>
                    <input class="form-control" type="password" name="ucontratxt" id="ucontratxt" placeholder="Ingrese la contraseña" required />
                </div>
                <div class="form-group">
                    <label for="uemailtxt">Correo Electrónico: </label>
                    <input class="form-control" type="email" name="uemailtxt" id="uemailtxt" placeholder="Ingrese el correo electrónico" required />
                </div>
                <button class="btn btn-primary" type="submit">Agregar</button>
            </form>
        </div>
    </div>
</div>


  
<?php
    //Enviar los parámetros del registro al controlador
    $registro = new MvcController();
    $registro -> registroUsuarioController();
    if(isset($_GET["registrar"])){
        echo "Registro exitoso";
    }
?>

</div>
</div>