<!DOCTYPE html>
<html lang="en">
    <header>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <title>TAW</title>
        <?php include "./includes/header.html" ?>
    </header>

    <body class="nav-md">
    	<?php include "./includes/navbar.html" ?>
    	<div style="padding: 20px;">
    		<h1  class="display-4">Carrera</h1>

    		<button type="button" data-toggle="modal" data-target="#carrera" class="btn btn-light">Agregar Carrera</button>
    		<br><br>
    		<?php include "./includes/frontend/tabla_Carrera.html" ?>
    	</div>
    	<!-- Modales de registro-->
        <?php include "./includes/frontend/registrar_Carrera.html" ?>
    	<script>
    		<?php include "./includes/controlador/carrera.js" ?>
    	</script>
        <footer>
            <?php include "./includes/footer.html" ?>
        </footer>
        <?php include "./includes/scripts.html" ?>
    </body>
</html>
