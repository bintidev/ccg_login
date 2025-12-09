<?php

    include './secure-session.php';

    // comprueba que se han recibido datos del formulario
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
        /**** comprobar CSRF token para dejar pasar a la aplicacion ****/

        // variables necesarias para la conexion
        /* son meramente de prueba. en la vida real
        el valor de estas variables puede ser diferente */
        $host = 'localhost';
        $user = 'login-php';  // ***** inseguro
        $password  = 'CCG_login.php'; // ***** inseguro
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
        $passwd = htmlspecialchars($_REQUEST['passwd']);

        // consulta de comprbacion de existencia del usuario en BD
        $query = "SELECT * FROM usuarios WHERE idusuario = '$agentId'";
        $resultado = $mysqli_con->query($query);

        if ($resultado->num_rows == 0) { // si no devuelve nada (usuario inexistente)

            $_SESSION['error'] = 'Usuario no reconocido.';
            header('Location: ./index.php'); // obliga al usuario a volver a intentarlo

        } else { // si se encuentra el usuario en la BD

            // $row recoge y trata la fila como un objeto (tambien puede tratarlo como array
            // con mysqli_fecth_array)
            // ***** es de la clase por defecto stdClass *****
            $row = mysqli_fetch_object($resultado);

            if ($row->password == $passwd) {
                // recoge nombre y apellidos para luego mostrarlos en la página de inicio
                $_SESSION['nombre'] = $row->nombre;
                $_SESSION['apellidos'] = $row->apellidos;
                header('Location: ./inicio.php'); // concede acceso si la contraseña es correcta
            } else {
                $_SESSION['error'] = 'Contraseña incorrecta.';
                header('Location: ./index.php'); // fuerza a repetir la oprecion si no es correcta
            }

            $mysqli_con->close();

        }

    } else {

        // se muestra en el alert del formulario de login
        header('Location: ./index.php');
        // mensaje de error si el usuario intenta acceder directamente desde el enlace
        // habiendose saltado la autenticacion
        $_SESSION['error'] = 'Debe proporcionar las credenciales para acceder al sistema.';

    }
