<?php
require_once 'config/database.php';
require_once 'includes/auth_functions.php';

$token = $_GET['token'] ?? '';
$mensaje = '';
$error = '';

if (empty($token)) {
    header('Location: recuperar_password.php');
    exit;
}

// Verificar token
$stmt = $pdo->prepare("SELECT id, email FROM usuarios WHERE token_recuperacion = ? AND token_expiracion > NOW()");
$stmt->execute([$token]);
$usuario = $stmt->fetch();

if (!$usuario) {
    $error = "El enlace de recuperación es inválido o ha expirado";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    if ($password !== $confirm_password) {
        $error = "Las contraseñas no coinciden";
    } else {
        $resultado = resetearContrasena($token, $password);
        
        if ($resultado['success']) {
            $mensaje = $resultado['message'];
        } else {
            $error = $resultado['errors'][0];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Contraseña - X-Learning Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #59d2ec;
            --light-blue: #8fe1f2;
            --lighter-blue: #d4f2f9;
            --dark-blue: #1a3a5f;
        }
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #d4f2f9 0%, #ffffff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .reset-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(89, 210, 236, 0.3);
            padding: 40px;
            max-width: 500px;
            width: 100%;
        }
        h1 {
            color: var(--dark-blue);
            font-weight: 700;
            margin-bottom: 10px;
        }
        .password-requirements {
            background: var(--lighter-blue);
            padding: 15px;
            border-radius: 10px;
            font-size: 0.85rem;
            margin-bottom: 15px;
        }
        .password-requirements li {
            margin-bottom: 5px;
        }
        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(89, 210, 236, 0.25);
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            border: none;
            padding: 12px;
            border-radius: 30px;
            font-weight: 600;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="reset-card">
        <div class="text-center mb-4">
            <i class="fas fa-key" style="font-size: 50px; color: var(--primary-blue);"></i>
            <h1 class="mt-3">Nueva Contraseña</h1>
            <p class="text-muted">Ingresa tu nueva contraseña</p>
        </div>
        
        <?php if ($mensaje): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> <?php echo $mensaje; ?>
                <br><a href="registro.php" class="mt-2 d-inline-block">Ir a iniciar sesión</a>
            </div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <?php if (!$mensaje): ?>
            <form method="POST">
                <div class="password-requirements">
                    <strong>Requisitos de contraseña:</strong>
                    <ul class="mb-0 mt-2">
                        <li>✓ Mínimo 8 caracteres</li>
                        <li>✓ Al menos una mayúscula</li>
                        <li>✓ Al menos una minúscula</li>
                        <li>✓ Al menos un número</li>
                        <li>✓ Al menos un carácter especial (@$!%*?&#)</li>
                    </ul>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Nueva contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirmar contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar Nueva Contraseña
                </button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>