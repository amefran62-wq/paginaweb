<?php
/**
 * registro_procesar.php
 * Procesa el registro de nuevos usuarios
 * 
 * Características:
 * - Validación de datos en frontend y backend
 * - Hash seguro de contraseñas (bcrypt)
 * - Tokens de verificación únicos
 * - Protección contra SQL injection (PDO prepared statements)
 * - Respuestas JSON estructuradas
 */

// Configuración de errores (desactivar display_errors en producción)
error_reporting(E_ALL);
ini_set('display_errors', 0);
header('Content-Type: application/json; charset=utf-8');

// ===== FUNCIÓN HELPER PARA RESPUESTAS JSON =====
function responder($success, $errors = [], $data = []) {
    $response = [
        'success' => $success,
        'errors' => $errors,
        'data' => $data
    ];
    
    // Incluir información de debug solo en desarrollo
    if (getenv('APP_ENV') === 'development' || !isset($_SERVER['HTTP_HOST'])) {
        $response['debug'] = [
            'php_version' => phpversion(),
            'post_received' => !empty($_POST)
        ];
    }
    
    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

// ===== VERIFICAR MÉTODO HTTP =====
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    responder(false, ['Método no permitido. Use POST.']);
}

// ===== VERIFICAR QUE LLEGARON DATOS =====
if (empty($_POST)) {
    responder(false, ['No se recibieron datos. Verifique el formulario.']);
}

// ===== CONEXIÓN A BASE DE DATOS =====
try {
    $config = [
        'host' => 'localhost',
        'dbname' => 'xlearning_db',
        'user' => 'root',
        'pass' => '',
        'charset' => 'utf8mb4'
    ];
    
    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
    
    $pdo = new PDO($dsn, $config['user'], $config['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
    
} catch (PDOException $e) {
    error_log("Error de conexión a BD: " . $e->getMessage());
    responder(false, ['Error de conexión. Intente más tarde.']);
}

// ===== RECIBIR Y SANITIZAR DATOS =====
$datos = [
    'email' => trim($_POST['email'] ?? ''),
    'password' => $_POST['password'] ?? '',
    'confirm_password' => $_POST['confirm_password'] ?? '',
    'nombre' => trim($_POST['nombre'] ?? ''),
    'apellido_paterno' => trim($_POST['apellido_paterno'] ?? ''),
    'apellido_materno' => trim($_POST['apellido_materno'] ?? ''),
    'fecha_nacimiento' => $_POST['fecha_nacimiento'] ?? '',
    'sexo' => $_POST['sexo'] ?? '',
    'rango_edad' => $_POST['rango_edad'] ?? '',
    'ultimo_estudio' => $_POST['ultimo_estudio'] ?? '',
    'lugar_nacimiento' => $_POST['lugar_nacimiento'] ?? '',
    'telefono' => preg_replace('/[^0-9]/', '', $_POST['telefono'] ?? ''),
    'como_se_entero' => $_POST['como_se_entero'] ?? '',
    'fue_estudiante_anterior' => $_POST['fue_estudiante_anterior'] ?? 'no'
];

// ===== VALIDACIONES =====
$errores = [];

// Email
if (empty($datos['email'])) {
    $errores[] = "El correo electrónico es obligatorio";
} elseif (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
    $errores[] = "Formato de correo electrónico inválido";
}

// Teléfono
if (strlen($datos['telefono']) !== 10) {
    $errores[] = "El teléfono debe tener exactamente 10 dígitos";
}

// Contraseña - Validaciones de fortaleza
if (empty($datos['password'])) {
    $errores[] = "La contraseña es obligatoria";
} else {
    if (strlen($datos['password']) < 8) {
        $errores[] = "La contraseña debe tener al menos 8 caracteres";
    }
    if (!preg_match('/[A-Z]/', $datos['password'])) {
        $errores[] = "La contraseña debe contener al menos una letra mayúscula";
    }
    if (!preg_match('/[a-z]/', $datos['password'])) {
        $errores[] = "La contraseña debe contener al menos una letra minúscula";
    }
    if (!preg_match('/[0-9]/', $datos['password'])) {
        $errores[] = "La contraseña debe contener al menos un número";
    }
    if (!preg_match('/[@$!%*?&#]/', $datos['password'])) {
        $errores[] = "La contraseña debe contener al menos un carácter especial (@$!%*?&#)";
    }
}

// Confirmación de contraseña
if ($datos['password'] !== $datos['confirm_password']) {
    $errores[] = "Las contraseñas no coinciden";
}

// Campos obligatorios
$campos_obligatorios = [
    'nombre' => 'El nombre es obligatorio',
    'apellido_paterno' => 'El apellido paterno es obligatorio',
    'fecha_nacimiento' => 'La fecha de nacimiento es obligatoria',
    'sexo' => 'El sexo es obligatorio',
    'rango_edad' => 'El rango de edad es obligatorio',
    'ultimo_estudio' => 'El último grado de estudios es obligatorio',
    'lugar_nacimiento' => 'El lugar de nacimiento es obligatorio',
    'como_se_entero' => 'Debe indicar cómo se enteró de nosotros'
];

foreach ($campos_obligatorios as $campo => $mensaje) {
    if (empty($datos[$campo])) {
        $errores[] = $mensaje;
    }
}

// Verificar si el email ya está registrado
if (empty($errores)) {
    try {
        $stmt = $pdo->prepare("SELECT id, email_verificado FROM usuarios WHERE email = ?");
        $stmt->execute([$datos['email']]);
        $usuario_existente = $stmt->fetch();
        
        if ($usuario_existente) {
            if ($usuario_existente['email_verificado'] == 0) {
                $errores[] = "Este correo ya está registrado pero no ha sido verificado. Revisa tu bandeja de entrada.";
            } else {
                $errores[] = "Este correo electrónico ya está registrado. ¿Olvidaste tu contraseña?";
            }
        }
    } catch (PDOException $e) {
        error_log("Error al verificar email: " . $e->getMessage());
        $errores[] = "Error al verificar el correo. Intente más tarde.";
    }
}

// Si hay errores, devolver respuesta
if (!empty($errores)) {
    responder(false, $errores);
}

// ===== PROCESAR REGISTRO =====
try {
    // Generar token único de verificación
    $token_verificacion = bin2hex(random_bytes(32));
    $token_expiracion = date('Y-m-d H:i:s', strtotime('+24 hours'));
    
    // Hashear contraseña con bcrypt
    $password_hash = password_hash($datos['password'], PASSWORD_DEFAULT, ['cost' => 12]);
    
    // Preparar consulta INSERT
    $sql = "INSERT INTO usuarios (
        email, password, nombre, apellido_paterno, apellido_materno,
        fecha_nacimiento, sexo, rango_edad, ultimo_estudio, lugar_nacimiento,
        telefono, como_se_entero, fue_estudiante_anterior,
        token_verificacion, token_expiracion, rol, estado
    ) VALUES (
        :email, :password, :nombre, :apellido_paterno, :apellido_materno,
        :fecha_nacimiento, :sexo, :rango_edad, :ultimo_estudio, :lugar_nacimiento,
        :telefono, :como_se_entero, :fue_estudiante_anterior,
        :token_verificacion, :token_expiracion, 'estudiante', 'activo'
    )";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email' => $datos['email'],
        ':password' => $password_hash,
        ':nombre' => $datos['nombre'],
        ':apellido_paterno' => $datos['apellido_paterno'],
        ':apellido_materno' => $datos['apellido_materno'],
        ':fecha_nacimiento' => $datos['fecha_nacimiento'],
        ':sexo' => $datos['sexo'],
        ':rango_edad' => $datos['rango_edad'],
        ':ultimo_estudio' => $datos['ultimo_estudio'],
        ':lugar_nacimiento' => $datos['lugar_nacimiento'],
        ':telefono' => $datos['telefono'],
        ':como_se_entero' => $datos['como_se_entero'],
        ':fue_estudiante_anterior' => $datos['fue_estudiante_anterior'],
        ':token_verificacion' => $token_verificacion,
        ':token_expiracion' => $token_expiracion
    ]);
    
    $usuario_id = $pdo->lastInsertId();
    
    // ===== ENVIAR EMAIL DE VERIFICACIÓN (OPCIONAL) =====
    // Para producción, descomenta y configura PHPMailer
    /*
    require_once __DIR__ . '/includes/email_functions.php';
    $nombre_completo = $datos['nombre'] . ' ' . $datos['apellido_paterno'];
    
    if (enviarEmailVerificacion($datos['email'], $nombre_completo, $token_verificacion)) {
        $mensaje = 'Registro exitoso. Hemos enviado un correo de verificación.';
    } else {
        $mensaje = 'Registro exitoso, pero no pudimos enviar el correo de verificación.';
    }
    */
    
    // Para desarrollo: activar usuario automáticamente (COMENTAR EN PRODUCCIÓN)
    // $stmt = $pdo->prepare("UPDATE usuarios SET email_verificado = 1 WHERE id = ?");
    // $stmt->execute([$usuario_id]);
    
    responder(true, [], [
        'message' => 'Registro exitoso. Revisa tu correo para verificar tu cuenta.',
        'usuario_id' => $usuario_id,
        'email' => $datos['email'],
        'requires_verification' => true
    ]);
    
} catch (PDOException $e) {
    error_log("Error al registrar usuario: " . $e->getMessage());
    
    // Manejar error de email duplicado (race condition)
    if ($e->errorInfo[1] == 1062) {
        responder(false, ['Este correo electrónico ya está registrado.']);
    }
    
    responder(false, ['Error al guardar tus datos. Intente más tarde.']);
    
} catch (Exception $e) {
    error_log("Error inesperado: " . $e->getMessage());
    responder(false, ['Ocurrió un error inesperado. Intente más tarde.']);
}
?>