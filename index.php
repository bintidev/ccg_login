
<?php

    session_start(); // pendiente sesion segura

?>

<!-- **NOTA: Pendiente pasar cambios de este fichero a login.html CCG_CRUD -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="post">
        <?php

            // se muestra el alert solo si la variable de sesion
            // ERROR esta establecida, es decir, inicializada
            if (isset($_SESSION['error'])) {

                echo '<div class="alert alert-danger" role="alert">';
                echo $_SESSION['error'];
                echo '</div>';
                unset($_SESSION['error']);

            }

            /**
             * =============================== CREACION DE LA BASE DE DATOS =========================================
             * 1. Acceder a phpMyAdmin desde barra con http://localhost/phpMyAdmin de busqueda (activar XAMPP, obvio)
             * 2. Dirigirse al apartado Bases de Datos y pulsar crear BD
             * 3. Darle un nombre a la base (login_php) y utf8_spanish_ci
             * 4. Crear una nueva tabla usuarios con 5 columnas
             * 5. Campos: (user, INT, PRIMARY, AUTOINCREMENT), (idusuario, VARCHAR 255, UNIQUE),
             * (password, VARCHAR 255 [de cara al futuro almacenar codificado], UNIQUE),
             * (nombre, VARCHAR 80), (apellidos, VARCHAR 80)
             * 6. Desde apartado insertar, introducir registros de prueba (min. 3)
             * 7. Mas adelante se creara un usuario de acceso a BD distinto de root
            */

        ?>
    </form>

</body>
</html>