<?php
   //session_start();
   if(!$_SESSION["validar"]){
       header("location: index.php?action=ingresar");
       exit();
   }
   /* Llamada a los controladores para insertar/modificar/eliminar usuarios */
   $usuarios = new MvcController();
   $usuarios -> insertarUserController();
   $usuarios -> actualizarUserController();
   $usuarios -> eliminarUserController();
   /* Se verifica que el usuario haya pulsado sobre el boton de registrar o editar para mostrarle su res
   pectivo formulario */
   if(isset($_GET["registrar"])){
       $usuarios -> registrarUserController();
   }else if(isset($_GET["idUserEdit"])){
       $usuarios -> actualizarUserController();
   }
   ?>
<div class="container-fluid">
<div class="row mb-3"></div>
<div class="card card-secondary">
   <div class="card-header">
      <h2 class="card-title"> Lista de Usuarios </h2>
   </div>
   <div class="card-body">
      <div class="row mb-4">
         <div class="col-sm-6">
            <a href="index.php?action=usuarios&registrar" class="btn btn-info">gregar Nuevo Usuario</a>
         </div>
         <div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
               <div class="col-sm-12">
                  <table id="example1" class="table table-hover m-0 table-bordered table-striped">
                     <thead class="table-info">
                        <tr>
                           <th>Editar</th>
                           <th>Borrar</th>
                           <th>Nombre</th>
                           <th>Apellido</th>
                           <th>Usuario</th>
                           <th>Correo Electronico</th>
                           <th>Fecha de Insercion</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           /**/
                           $usuarios -> vistaUsersController();
                           ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>