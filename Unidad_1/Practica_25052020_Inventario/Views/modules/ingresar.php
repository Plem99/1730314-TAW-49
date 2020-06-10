<div class="login-box">
    <div class="login-logo">
        <a href="index.php"><b> Sistema de </b> Inventario</a>
    <div>
    <!--./Login Logo-->
    <div class="card">
        <div class="card-body login-card-boy">
            <p class="login-box-msg">Login</p>
            <form method="post">
                <div class="input-group mb-3">
                <input type="text" name="txtUser" class="form-control" placeholder="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user">
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="txtPassword" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lack"></span>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!--./col-->
                    <div class="col-12">
                        <button class="btn btn-primary btn-block btn-flat" type="submit">Iniciar Sesion</button>
                    </div>
                    <!--./col-->
                    </div>
                </form>
            </div>
            <!--./login-card-body-->
        </div>
    </div>
    <!--./login-box-->
    <?php
    //Llamada al controlador que verifica el inicio de sesion
    $ingreso = new MvcController();
    $ingreso -> ingresoUsuarioController();
    if(isset($_GET["action"])){
        if($_GET["action"] == "fallo"){
            echo "Fallo al ingresar";
        }
    }

    ?>