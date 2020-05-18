<!--Es la plantilla que vera el usuario al ejecutar la aplicación -->
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
    <title>Template</title>



    </head>

    <body>
        <?php include "modules/navegacion.php" ?>

        <section>
            <?php
                $mvc = new MvcController();
                $mvc -> enlacesPaginasController();
            ?>
        </section>
    </body>
</html>