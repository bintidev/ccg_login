<?php

session_start(); // pendiente sesion segura

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Acceso</title>
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        /*#psswdLvl {
            visibility: hidden;
        }*/
    </style>
</head>

<body>

    <!--fondo div: https://steam.pics/fons/afede0edf03584663cf62f432cba1ad3.png-->
    <!--alternativas: https://static.wikia.nocookie.net/liberproeliis/images/e/ef/Dragon_-_Tokyo_Ghoul_-re.jpg/revision/latest?cb=20201205143549&path-prefix=pt-br-->
    <!--alternativas: https://i.pinimg.com/736x/4d/80/03/4d8003fad8ed8e69e55cb005f8794205.jpg-->

    <!-- Fondo Animado -->
    <div class="background-animated"></div>

    <!-- Contenedor -->
    <div class="session w-50">

        <!-- Imagen Izq. Dragon -->
        <div class="left w-50">
        </div>

        <form action="" class="log-in w-50 d-flex justify-content-center align-items-center"
            mathod="post" autocomplete="off" id="accessForm">

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

            <!-- CABECERA (logo, nombre organizacion) -->
            <img src="./assets/img/ccg_logo.png" alt="ccg_logo" width="80" style="margin: 0; padding: 0;" />
            <h4>We are <span>CCG</span></h4>
            <p>Welcome back, agent. Please, enter your credentials below:</p>


            <!-- Campo de ID Agente -->
            <div class="floating-label mb-3">

                <input placeholder="Agent ID" type="text" name="agentId" id="agentId" autocomplete="off">
                <label for="agentId">Agent ID:</label>
                <div class="form-text text-danger" id="agentIdHelp"></div>

                <div class="icon">
                    <xml version="1.0" encoding="UTF-8">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-person"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        <rect class="st0" width="100" height="100" />

                </div>
            </div>

            <!-- Campo de Contraseña -->
            <div class="floating-label mb-2">

                <input placeholder="Password" type="password" name="psswd" id="psswd" autocomplete="off">
                <label for="psswd">Password:</label>
                <div class="form-text text-danger">
                    <ul id="psswdHelp"></ul>
                </div>

                <!--<div class="d-flex justify-content-center align-items-center mt-3" id="psswdLvl">
                    <div class="w-75">
                        <div class="progress mb-1" role="progressbar" aria-label="Basic example" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"
                            style="box-shadow: 0px 0px 25px -1px rgba(167, 0, 117, 0.92);">
                            <div class="progress-bar bg-danger"></div>
                        </div>
                        <div class="text-white text-center" id="mensajePsswd"></div>
                    </div>
                </div>-->

                <div class="icon">
                    <xml version="1.0" encoding="UTF-8">
                        <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xml:space="preserve"
                            xmlns="http://www.w3.org/2000/svg">
                            <style type="text/css">
                                .st0 {
                                    fill: none;
                                }

                                .st1 {
                                    stroke: #ffffff;
                                }
                            </style>
                            <rect class="st0" width="24" height="24" />
                            <path class="st1" d="M19,21H5V9h14V21z M6,20h12V10H6V20z" />
                            <path class="st1"
                                d="M16.5,10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5,5.1,8.5,7v3h-1V7c0-2.5,2-4.5,4.5-4.5s4.5,2,4.5,4.5V10z" />
                            <path class="st1"
                                d="m12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5zm0-2c-0.3 0-0.5 0.2-0.5 0.5s0.2 0.5 0.5 0.5 0.5-0.2 0.5-0.5-0.2-0.5-0.5-0.5z" />
                        </svg>
                </div>
            </div>

            <button type="submit" class="mt-5">Log in</button>

        </form>
    </div>

    <script src="./assets/js/validacion.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
        crossorigin="anonymous"></script>

</body>

</html>