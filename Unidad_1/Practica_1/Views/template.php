<!--Es la plantilla que vera el usuario al ejecutar la aplicación -->
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Practica 1</title>
    <link rel="stylesheet" type="text/css" href="Views/style/css/bootstrap.min.css">
    </head>

    <body>
        <?php include "header.php" ?>
        
        <section>
            <?php
                $mvc = new MvcController();
                $mvc -> enlacesPaginasController();
            ?>
        </section>

        <?php include "footer.php" ?>
    </body>
</html>