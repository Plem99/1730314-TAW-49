<!DOCTYPE html>
<html lang="en">
    <header>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <title>Alumno</title>
        <?php include "./includes/header.html" ?>
    </header>

    <body class="nav-md">
    	<?php include "./includes/navbar.html" ?>
        <div style="padding: 20px;">
            <h1  class="display-4">Alumno</h1>

            <button type="button" data-toggle="modal" data-target="#alumno" class="btn btn-light">Agregar Alumno</button>
            <br><br>
            <?php include "./includes/frontend/tabla_Alumno.html" ?>
        </div>
        <!-- Modales de registro-->
        <?php include "./includes/frontend/registrar_Alumno.html" ?>
        <script>
            <?php include "./includes/controlador/alumno.js" ?>
        </script>
        <footer>
            <?php include "./includes/footer.html" ?>
        </footer>
        <?php include "./includes/scripts.html" ?>
    </body>
</html>
