<?php

    session_start(); // pendiente de hacer segura

    // comprueban que se han recibido datos del formulario
    if (isset($_POST['agentId']) && isset($_POST['psswd'])) {

        // variables necesarios para la conexion
        /* son meramente de prueba. en la vida real
        el valor de estas variables puede ser diferente */
        $host = 'localhost';
        $user = 'root';  // insesguro
        $password  = ''; // insesguro
        $database = 'login_php';

        // creacion de nueva conexion
        $mysqli_con = new mysqli($host, $user, $password, $database);

        // comprobar si es posible conectarse a BD
        if ($mysqli_con->connect_error) {
            // para evitar el warning que se muestra en tiempo de compilacion
            $_SESSION['error'] = 'No se puede comprobar usuario en estos momentos. <br>
                                Repita la operación en unos minutos.';
            // redireccion a la pagina de inicio de sesion, donde se mostrara el alert
            header('Location: ./index.php');
        }

        // habria que comprobar si hubo un intento de inyeccion XSS
        // y contestar con un mensaje de error reprobatorio
        $agentId = htmlspecialchars($_REQUEST['agentId']);
        $psswd = htmlspecialchars($_REQUEST['psswd']);

        /**
         * PENDIENTE:
         * hacer query
         * redireccionar a index.php si no esta o la contraseña o es erronea
         * redireccionar a inicio.php si todo es correcto (alert verde)
         */

        // consulta de comprbacion de existencia del usuario en BD
        $query = "SELECT * FROM usuarios WHERE idusuario = '$agentId'";
        $resultado = $mysqli_con->query($query);

        if ($resultado->num_rows == 0) { // si no devuelve nada (usuario inexistente)

            $_SESSION['error'] = 'Usuario no reconocido.';
            header('Location: ./index.php');

        } else {

            // no deberia mandar de vuelta al index, esto es solo
            // para comprobar el correcto funcionamiento del controlador
            $_SESSION['error'] = 'Identificación correcta. Bienvenid@';
            header('Location: ./index.php');

            // comprobar que las contraseñas coinciden
            // si no, mensaje de erroir y redireccionar a index.php
            // si si, redireccrionar a inicio.php

        }

    } else {

        // mensaje de error si el usuario intenta acceder directamente desde el enlace
        // habiendose saltado la autenticacion
        $_SESSION['error'] = 'Debe proporcionar las credenciales para acceder al sistema.';
        // se muestra en el alert del formulario de login
        header('Location: ./index.php');

    }
