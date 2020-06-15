<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<title>Inventarios | TAW | UPV</title> 
	<!-- Tell the browser to be responsive to screen width --> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<!-- Font Awesome --> 
	<link rel="stylesheet" href="Views/assets/plugins/fontawesome-free/css/all.min.css"> 
	<!-- Ionicons --> 
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 
	<!-- Tempusdominus Bbootstrap 4 --> 
	<link rel="stylesheet" href="Views/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> 
	<!-- iCheck --> 
	<link rel="stylesheet" href="Views/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap --> 
	<link rel="stylesheet" href="Views/assets/plugins/jqvmap/jqvmap.min.css"> 
	<!-- Theme style --> 
	<link rel="stylesheet" href="Views/assets/dist/css/adminlte.min.css"> 
	<!-- overlayScrollbars --> 
	<link rel="stylesheet" href="Views/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> 
	<!-- Daterange picker --> 
	<link rel="stylesheet" href="Views/assets/plugins/daterangepicker/daterangepicker.css"> 
	<!-- summernote --> 
	<link rel="stylesheet" href="Views/assets/plugins/summernote/summernote-bs4.css"> 
	<!-- Google Font: Source Sans Pro --> 
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> 
	<!-- DataTables --> 
	<link rel="stylesheet" href="Views/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<?php 
		/* Se inicia la sesión y se verifica que se haya iniciado sesión correctamente para mostrar el tablero y el menu principal */
		session_start();

		if (isset($_SESSION['validar']) && $_SESSION['validar'] == "true") {
			include 'Modules/navegacion.php';
		}
	?>
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">
				<div class="container-fluid">
					<div class="row mr-3 mt-2 mb-2">
						<?php 
							/* Se verifica que la vista actual sea el tablero, en ese caso se muestra el titulo de la vista */
							if ($_GET['action'] == 'tablero') {
						?>
						<div class="col-sm-12">
							<h1><b>Tablero</b></h1>
						</div>

						<!-- Aquí va el contenido de la página -->

						<?php 
							}
							$mvc = new MvcController();
							$mvc->enlacesPaginasController();
						?>
					</div>
				</div>
			</section>
		</div>
	</div>

	<?php 
		/* Se verifica que la vista actual no sea login, en caso de que sea login, el footer del template no se muestra */
		if ($_GET['action'] != 'ingresar') {
	?>

	<?php 
		}
	?>

	<!-- jQuery --> 
	<script src="Views/assets/plugins/jquery/jquery.min.js"></script> 
	<!-- jQuery UI 1.11.4 --> 
	<script src="Views/assets/plugins/jquery-ui/jquery-ui.min.js"></script> 
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --> 
	<script> $.widget.bridge('uibutton', $.ui.button) </script> 
	<!-- Bootstrap 4 --> 
	<script src="Views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
	<!-- ChartJS --> 
	<script src="Views/assets/plugins/chart.js/Chart.min.js"></script> 
	<!-- Sparkline --> <script src="Views/assets/plugins/sparklines/sparkline.js"></script> 
	<!-- JQVMap --> 
	<script src="Views/assets/plugins/jqvmap/jquery.vmap.min.js"></script> 
	<script src="Views/assets/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
	<!-- jQuery Knob Chart --> 
	<script src="Views/assets/plugins/jquery-knob/jquery.knob.min.js"></script> 
	<!-- daterangepicker --> 
	<script src="Views/assets/plugins/moment/moment.min.js"></script> 
	<script src="Views/assets/plugins/daterangepicker/daterangepicker.js"></script> 
	<!-- Tempusdominus Bootstrap 4 --> 
	<script src="Views/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> 
	<!-- Summernote --> 
	<script src="Views/assets/plugins/summernote/summernote-bs4.min.js"></script> 
	<!-- overlayScrollbars --> 
	<script src="Views/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> 
	<!-- AdminLTE App --> 
	<script src="Views/assets/dist/js/adminlte.js"></script> 
	<!-- DataTables --> <script src="Views/assets/plugins/datatables/jquery.dataTables.js"></script> 
	<script src="Views/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- page script --> 
	<script> 
		$(function () { 
			$("#example1").DataTable(); 
			$("#example2").DataTable(); 
		}); 
	</script> 
</body> 
</html>