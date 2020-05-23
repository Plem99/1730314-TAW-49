<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?action=ingresar">Practica 1</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            <!--Se utiliza el metodo GET para navegar, en el URL se representa por el
            simbolo de interrogacion-->
            <?php
            //Validamos si existe una sesion, de no ser asi solo se mostraran 2 opciones
              session_start();
              //$_SESSION["validar"] = false;
              if(isset($_SESSION["validar"])){
            ?>
            <li><a href="index.php?action=registroUsuario">Registro Usuario</a></li>
            <li><a href="index.php?action=usuarios">Usuarios</a></li>
            <li><a href="index.php?action=registroProveedor">Registro Proveedor</a></li>
            <li><a href="index.php?action=proveedores">Proveedores</a></li>
            <li><a href="index.php?action=registroEmpresa">Registro Empresa</a></li>
            <li><a href="index.php?action=empresas">Empresas</a></li>
            <li><a href="index.php?action=registroCategoria">Registro Categoria</a></li>
            <li><a href="index.php?action=categorias">Categorias</a></li>
            <li><a href="index.php?action=salir">Salir</a></li>
            <?php
            }else{
            ?>
            <li><a href="index.php?action=ingresar">Ingresar</a></li>
            <li><a href="index.php?action=registroUsuario">Registro Usuario</a></li>
            <?php  
              //echo "No haz iniciado sesion";
            }
            ?>
            
            
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>