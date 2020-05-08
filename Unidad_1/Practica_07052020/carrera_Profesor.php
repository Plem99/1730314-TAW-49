<!DOCTYPE html>
<html lang="en">
    <header>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <title>Carrera Profesor</title>
        <?php include "./includes/header.html" ?>
    </header>

    <body class="nav-md">
    	<?php include "./includes/navbar.html" ?>
    	<div style="padding: 20px;">
            <h1  class="display-4">Carrera Profesor</h1>

            <br><br>
            <?php include "./includes/frontend/tabla_Carrera_Profesor.html" ?>
        </div>

        <script>
            <?php include "./includes/controlador/carreraProfesor.js" ?>
        </script>
        <footer>
            <?php include "./includes/footer.html" ?>
        </footer>
        <?php include "./includes/scripts.html" ?>
    </body>
</html>
