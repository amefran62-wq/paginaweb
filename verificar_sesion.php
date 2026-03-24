<?php
// verificar_sesion.php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['usuario_id'])) {
    echo json_encode([
        'logueado' => true,
        'nombre' => $_SESSION['usuario_nombre'],
        'rol' => $_SESSION['usuario_rol']
    ]);
} else {
    echo json_encode(['logueado' => false]);
}
?>