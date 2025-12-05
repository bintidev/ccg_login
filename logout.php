<?php

include './secure-session.php';
// restablece los datos de la sesión para el resto del tiempo de ejecución
$_SESSION = [];
// envía como Set-Cookie para invalidar la cookie de sesión
/*** destruccion de cookies de forma explicita y otras potencialmente peligrosas ***/
if (isset($_COOKIE[session_name()])) {
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 60, $params['path'], $params['domain'], $params['secure'], isset($params['httponly']));
}
session_destroy();

header('Location: ./index.php');