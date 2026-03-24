<?php
/**
 * logout.php
 * Cierra la sesión del usuario
 */
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Destruir la cookie de sesión
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}

// Destruir la sesión
session_destroy();

// Redirigir al index
header('Location: index.php?logged_out=1');
exit;
?>