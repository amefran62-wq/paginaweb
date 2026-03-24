<?php
// procesar_formulario.php
header('Content-Type: application/json');

// Incluir configuración de BD
require_once 'config/database.php';

// Solo permitir método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

// Obtener y sanitizar datos
$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$tipo = trim($_POST['tipo'] ?? '');

// Validaciones básicas
$errores = [];
if (!$nombre) $errores[] = 'El nombre es requerido';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = 'Email inválido';
if (strlen($telefono) < 10) $errores[] = 'Teléfono inválido';
if (!in_array($tipo, ['clase_muestra', 'examen_nivel', 'descuento'])) $errores[] = 'Tipo de solicitud inválido';

if (!empty($errores)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'errors' => $errores]);
    exit;
}

try {
    // Insertar en la base de datos
    $stmt = $pdo->prepare("
        INSERT INTO formulario_registros (nombre, email, telefono, tipo_solicitud, ip_address) 
        VALUES (:nombre, :email, :telefono, :tipo, :ip)
    ");
    
    $stmt->execute([
        ':nombre' => $nombre,
        ':email' => $email,
        ':telefono' => $telefono,
        ':tipo' => $tipo,
        ':ip' => $_SERVER['REMOTE_ADDR'] ?? null
    ]);
    
    echo json_encode(['success' => true, 'message' => 'Registro guardado']);
    
} catch (PDOException $e) {
    error_log("Error al guardar formulario: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error al guardar los datos']);
}
?>