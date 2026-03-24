<?php
// login_procesar.php - VERSIÓN CORREGIDA
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
header('Content-Type: application/json; charset=utf-8');

function responder($success, $errors = [], $data = []) {
    echo json_encode(['success' => $success, 'errors' => $errors, 'data' => $data]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    responder(false, ['Método no permitido']);
}

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=xlearning_db;charset=utf8mb4",
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    responder(false, ['Error de conexión: ' . $e->getMessage()]);
}

$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    responder(false, ['Correo y contraseña son obligatorios']);
}

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->execute([$email]);
$usuario = $stmt->fetch();

if (!$usuario || !password_verify($password, $usuario['password'])) {
    $stmt = $pdo->prepare("INSERT INTO accesos (usuario_id, ip_address, exito) VALUES (?, ?, 0)");
    $stmt->execute([$usuario['id'] ?? null, $_SERVER['REMOTE_ADDR']]);
    responder(false, ['Credenciales incorrectas']);
}

if ($usuario['email_verificado'] == 0) {
    responder(false, ['Por favor verifica tu correo electrónico antes de iniciar sesión']);
}

if ($usuario['estado'] !== 'activo') {
    responder(false, ['Tu cuenta está inactiva o suspendida']);
}

$stmt = $pdo->prepare("UPDATE usuarios SET ultimo_acceso = NOW() WHERE id = ?");
$stmt->execute([$usuario['id']]);

$stmt = $pdo->prepare("INSERT INTO accesos (usuario_id, ip_address, exito) VALUES (?, ?, 1)");
$stmt->execute([$usuario['id'], $_SERVER['REMOTE_ADDR']]);

$_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['usuario_email'] = $usuario['email'];
$_SESSION['usuario_nombre'] = $usuario['nombre'];
$_SESSION['usuario_rol'] = $usuario['rol'];
$_SESSION['login_time'] = time();

// ✅ REDIRECCIÓN CORRECTA A INDEX.PHP
responder(true, [], [
    'message' => '¡Bienvenido, ' . htmlspecialchars($usuario['nombre']) . '!',
    'redirect' => 'index.php',
    'rol' => $usuario['rol']
]);
?>