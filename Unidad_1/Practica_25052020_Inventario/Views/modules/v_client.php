<?php
   //session_start();
   if (!isset($_SESSION['validar'])) {
		header("location:index.php?action=ingresar");
		exit();
	}
   /* Llamada a los controladores para insertar/modificar/eliminar usuarios */
    $clients = new c_client();
	$clients-> c_create_client();
	$clients-> c_update_client();
	$clients-> c_delete_client();
   /* Se verifica que el usuario haya pulsado sobre el boton de registrar o editar para mostrarle su res
   pectivo formulario */
   if (isset($_GET['registrar'])) {
		$clients->c_create_client_view();
	} else if (isset($_GET['idClientUpdate'])) {
		$clients->c_update_client_view();
	}
   ?>
<div class="container-fluid">
	<div class="row mb-3"></div>
	<div class="card card-secondary">
		<div class="card-header">
			<h3 class="card-title">Lista de Usuarios</h3>
		</div>
		<div class="card-body">
			<div class="row mb-4">
				<div class="col-sm-6">
					<a href="index.php?action=v_client&registrar" class="btn btn-info">Agregar nuevo cliente</a>
				</div>
			</div>
			<div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap4">
				<div class="row">
					<div class="col-sm-12"></div>
					<table id="example1" class="table table-hover n-0 table-bordered table-striped">
						<thead class="table-info">
							<tr>
                           <th>Editar</th>
                           <th>Borrar</th>
                           <th>Nombre</th>
                           <th>Email</th>
                           <th>Telefono</th>
                           <th>Dirección</th>
                           <th>Fecha de Cumpleaños</th>
                           <th>Número de Compras</th>
                           </tr>
						</thead>
						<tbody>
							<?php 
								/**/
								$clients->c_read_client();
							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>