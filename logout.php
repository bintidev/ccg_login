<?php

session_start();
$_SESSION = []; // se vacian/destruyen todas las variables del sesion
session_destroy();
header('Location: ./index.php');