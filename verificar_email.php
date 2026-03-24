<?php
// verificar_email.php - VERSIÓN OPTIMIZADA
require_once 'config/database.php';

$token = $_GET['token'] ?? '';
$exito = false;
$error = '';
$email_usuario = '';

if (empty($token)) {
    $error = "Token de verificación no proporcionado";
} else {
    try {
        // Buscar usuario con token válido y no expirado
        $stmt = $pdo->prepare("SELECT id, email FROM usuarios WHERE token_verificacion = ? AND token_expiracion > NOW() AND email_verificado = 0");
        $stmt->execute([$token]);
        $usuario = $stmt->fetch();
        
        if ($usuario) {
            // Verificar y limpiar tokens
            $stmt = $pdo->prepare("UPDATE usuarios SET email_verificado = 1, token_verificacion = NULL, token_expiracion = NULL WHERE id = ?");
            $stmt->execute([$usuario['id']]);
            
            $exito = true;
            $mensaje = "¡Correo verificado correctamente! Ya puedes iniciar sesión.";
            $email_usuario = $usuario['email'];
            
        } elseif ($stmt = $pdo->prepare("SELECT email_verificado FROM usuarios WHERE token_verificacion = ?")) {
            // Token existe pero ya fue usado
            $stmt->execute([$token]);
            if ($stmt->fetchColumn()) {
                $error = "Este correo ya ha sido verificado anteriormente.";
            } else {
                $error = "Token inválido o expirado";
            }
        } else {
            $error = "Token inválido o expirado";
        }
    } catch (Exception $e) {
        error_log("Error en verificación: " . $e->getMessage());
        $error = "Error al verificar el correo. Intente más tarde.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Correo - X-Learning Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #d4f2f9 0%, #ffffff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .verification-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(89, 210, 236, 0.3);
            padding: 40px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }
        .icon { font-size: 80px; margin-bottom: 20px; animation: popIn 0.5s ease; }
        @keyframes popIn {
            0% { transform: scale(0); opacity: 0; }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); opacity: 1; }
        }
        .icon.success { color: #28a745; }
        .icon.error { color: #dc3545; }
        h1 { color: #1a3a5f; font-weight: 700; margin-bottom: 20px; }
        .btn-primary {
            background: linear-gradient(135deg, #59d2ec, #1a3a5f);
            border: none;
            padding: 12px 40px;
            border-radius: 30px;
            font-weight: 600;
            margin-top: 20px;
            transition: transform 0.3s;
        }
        .btn-primary:hover { transform: translateY(-2px); }
    </style>
</head>
<body>
    <div class="container">
        <div class="verification-card">
            <?php if ($exito): ?>
                <div class="icon success">✓</div>
                <h1>¡Correo Verificado!</h1>
                <p class="text-muted"><?php echo $mensaje; ?></p>
                
                <?php if (!empty($email_usuario)): ?>
                    <p class="small text-muted mb-3">Email: <strong><?php echo htmlspecialchars($email_usuario); ?></strong></p>
                <?php endif; ?>
                
                <a href="registro.php?email=<?php echo urlencode($email_usuario); ?>&login=1" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                </a>
                
                <!-- Auto-redirección -->
                <script>
                setTimeout(() => {
                    window.location.href = 'registro.php?email=<?php echo urlencode($email_usuario); ?>&login=1';
                }, 4000);
                </script>
                <p class="text-muted small mt-3">Redirigiendo automáticamente en 4 segundos...</p>
                
            <?php else: ?>
                <div class="icon error">✕</div>
                <h1>Error de Verificación</h1>
                <p class="text-muted"><?php echo $error; ?></p>
                <a href="registro.php" class="btn btn-primary">
                    <i class="fas fa-home me-2"></i>Volver al Inicio
                </a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>