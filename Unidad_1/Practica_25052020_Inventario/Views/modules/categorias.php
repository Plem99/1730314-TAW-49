<?php
    if(!isset($_SESSION['validar'])){
        header("location:index.php?action=ingresar");
        exit();
    }


    $categorias = new MvcController();
    $categorias->insertarCategoryController();
    $categorias->actualizarCategoryController();
    $categorias->eliminarCategoryController();

    if(isset($_GET['registrar'])){
        $categorias->regisrarCategoryController();
    }else if(isset($_GET['idCategoryEditar'])){
        $categorias->editarCategoryController();
    }
?>
<div class="container-fluid">
<div class="row mb-3"></div>
<div class="card card-secondary">
   <div class="card-header">
      <h2 class="card-title"> Categorias </h2>
   </div>
   <div class="card-body">
      <div class="row mb-4">
         <div class="col-sm-6">
            <a href="index.php?action=usuarios&registrar" class="btn btn-info">Agregar Nueva Categoria</a>
         </div>
         <div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
               <div class="col-sm-12">
                  <table id="example1" class="table table-hover m-0 table-bordered table-striped">
                     <thead class="table-primary">
                        <tr>
                           <th>¿Editar?</th>
                           <th>¿Borrar?</th>
                           <th>ID</th>
                           <th>Nombre</th>
                           <th>Descripcion</th>
                           <th>Fecha del Inserción</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           /**/
                           $categorias -> vistaCategoriesController();
                           ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>