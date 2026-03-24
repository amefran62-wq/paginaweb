<?php
require_once 'config/database.php';
require_once 'includes/auth_functions.php';

$mensaje = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    
    if (empty($email)) {
        $error = "Por favor ingresa tu correo electrónico";
    } else {
        $resultado = generarTokenRecuperacion($email);
        
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
    <title>Recuperar Contraseña - X-Learning Online</title>
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
        .recovery-card {
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
        .alert {
            border-radius: 12px;
        }
    </style>
</head>
<body>
    <div class="recovery-card">
        <div class="text-center mb-4">
            <i class="fas fa-lock" style="font-size: 50px; color: var(--primary-blue);"></i>
            <h1 class="mt-3">Recuperar Contraseña</h1>
            <p class="text-muted">Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña</p>
        </div>
        
        <?php if ($mensaje): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> Enviar Enlace de Recuperación
            </button>
            
            <div class="text-center mt-3">
                <a href="registro.php" class="text-decoration-none">← Volver al inicio de sesión</a>
            </div>
        </form>
    </div>
</body>
</html>