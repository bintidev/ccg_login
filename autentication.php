<?php

    session_start(); // pendiente de hacer segura

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
        // mostrar mensaje de error si no es posible
        die('Error de conexión ' . $mysqli_con->connect_errno);
    }

    echo 'Conexión establecida';
