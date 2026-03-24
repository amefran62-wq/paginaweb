<?php
session_start();
$usuario_logueado = isset($_SESSION['usuario_id']);
$nombre_usuario = $usuario_logueado ? $_SESSION['usuario_nombre'] : '';
$rol_usuario = $usuario_logueado ? $_SESSION['usuario_rol'] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canjea tu Código Académico - Express Learning Online</title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Fuentes Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hatton:wght@400;600;700&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-blue: #59d2ec;
            --light-blue: #8fe1f2;
            --lighter-blue: #d4f2f9;
            --dark-blue: #1a3a5f;
            --text-dark: #0d1b2a;
            --text-light: #5a7d9a;
            --white: #ffffff;
            --snow: #f8f9fa;
            --gris: #616160;
            --medium-gray: #a0a0a0;
            --obscuro: #b4b4b4;
            --black: #000000;
            --border-radius: 12px;
            --transition: all 0.3s ease;
            --wa-color: #25D366;
            --fb-color: #1877F2;
            --ig-color: #E1306C;
            --tt-color: #000000;
            --yt-color: #FF0000;
            --li-color: #0A66C2;
            
            /* Nuevos colores neón */
            --neon-blue: #00f3ff;
            --neon-pink: #ff3e9c;
            --neon-purple: #b721ff;
            --neon-cyan: #21f3ff;
            --neon-green: #39ff14;
            --neon-yellow: #ffd700;
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
        }
        body {
            background-color: var(--white);
            color: var(--text-dark);
            line-height: 1.3;
            font-family: 'Montserrat', sans-serif;
            padding-top: 80px; 
            overflow-x: hidden;
        }
        .navbar-custom {
            background: linear-gradient(135deg, var(--white) 0%, var(--lighter-blue) 100%);
            box-shadow: 0 2px 20px rgba(89, 210, 236, 0.1);
            height: 70px; 
        }
        .navbar-brand img { height: 55px; width: auto; }
        @media (min-width: 992px) {
            .navbar-nav { width: 100%; justify-content: center; }
            .ms-lg-2 { margin-left: 1rem !important; }
        }
        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 600;
            font-size: 15px;
            margin: 0 8px;
            border-radius: 30px;
            transition: var(--transition);
            padding: 8px 16px !important;
            text-align: center;
        }
        .nav-link:hover, .nav-link.active {
            background: linear-gradient(135deg, var(--primary-blue), var(--light-blue));
            color: var(--white) !important;
            transform: translateY(-2px);
        }
        .dropdown-menu {
            border: 1px solid var(--lighter-blue);
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            padding: 12px 0;
            text-align: center;
        }
        .dropdown-item {
            font-weight: 600;
            color: var(--text-dark);
            padding: 12px 25px;
            transition: var(--transition);
        }
        .dropdown-item:hover {
            background: linear-gradient(135deg, var(--primary-blue), var(--light-blue));
            color: var(--white);
            transform: translateX(5px);
        }
        
        /* ===== ESTILOS NEÓN PROFESIONALES PARA EL MENÚ DE REGISTRO ===== */
        .btn-register {
            background: linear-gradient(135deg, var(--dark-blue), #0d1b2a);
            color: var(--white) !important;
            box-shadow: 0 4px 12px rgba(26, 58, 95, 0.2);
            padding: 8px 20px !important;
            font-size: 15px !important;
            border: none;
            border-radius: 30px;
            position: relative;
            overflow: hidden;
            z-index: 1;
            display: inline-block;
            width: auto;
        }
        
        .btn-register::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
            z-index: -1;
        }
        
        .btn-register:hover::before {
            left: 100%;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 20px var(--neon-blue), 0 8px 20px rgba(26, 58, 95, 0.3);
            background: linear-gradient(135deg, #0d1b2a, var(--dark-blue));
            color: white !important;
        }
        
        /* Menú desplegable con efectos neón */
        .btn-register + .dropdown-menu {
            background: rgba(10, 25, 47, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(89, 210, 236, 0.3);
            border-radius: 15px;
            margin-top: 10px;
            padding: 10px 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), 0 0 30px rgba(89, 210, 236, 0.3), 0 0 60px rgba(183, 33, 255, 0.2);
            animation: neonGlow 3s infinite alternate;
            position: relative;
            overflow: hidden;
        }
        
        .btn-register + .dropdown-menu::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--neon-blue), var(--neon-pink), var(--neon-purple), var(--neon-cyan));
            border-radius: 17px;
            z-index: -1;
            animation: neonBorder 3s linear infinite;
            opacity: 0.5;
        }
        
        .btn-register + .dropdown-menu::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(10, 25, 47, 0.9);
            border-radius: 14px;
            z-index: -1;
        }
        
        @keyframes neonGlow {
            0% {
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), 0 0 30px rgba(89, 210, 236, 0.3), 0 0 60px rgba(183, 33, 255, 0.1);
            }
            50% {
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), 0 0 40px rgba(89, 210, 236, 0.5), 0 0 80px rgba(183, 33, 255, 0.3);
            }
            100% {
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), 0 0 30px rgba(89, 210, 236, 0.3), 0 0 60px rgba(183, 33, 255, 0.1);
            }
        }
        
        @keyframes neonBorder {
            0% {
                filter: hue-rotate(0deg);
            }
            100% {
                filter: hue-rotate(360deg);
            }
        }
        
        .btn-register + .dropdown-menu .dropdown-item {
            color: #ffffff;
            padding: 12px 30px;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
            margin: 5px 10px;
            border-radius: 8px;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .btn-register + .dropdown-menu .dropdown-item i {
            width: 20px;
            color: var(--neon-blue);
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .btn-register + .dropdown-menu .dropdown-item:hover {
            background: linear-gradient(90deg, rgba(89, 210, 236, 0.2), rgba(183, 33, 255, 0.2));
            transform: translateX(5px);
            box-shadow: 0 0 15px rgba(89, 210, 236, 0.3);
            color: var(--white);
        }
        
        .btn-register + .dropdown-menu .dropdown-item:hover i {
            color: var(--neon-pink);
            transform: scale(1.1);
        }
        
        .btn-register + .dropdown-menu .dropdown-divider {
            border-top: 1px solid rgba(89, 210, 236, 0.3);
            margin: 8px 15px;
            position: relative;
            overflow: hidden;
        }
        
        .btn-register + .dropdown-menu .dropdown-divider::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--neon-blue), transparent);
            animation: dividerGlow 2s infinite;
        }
        
        @keyframes dividerGlow {
            0% {
                left: -100%;
            }
            100% {
                left: 100%;
            }
        }
        
        .btn-register + .dropdown-menu .fw-bold {
            background: linear-gradient(135deg, var(--neon-blue), var(--neon-pink));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700 !important;
        }
        
        .btn-register + .dropdown-menu .fw-bold i {
            color: var(--neon-yellow);
            -webkit-text-fill-color: initial;
        }
        
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: var(--white);
                padding: 30px 20px;
                border-top: 2px solid var(--primary-blue);
                margin-top: 10px;
                text-align: center;
            }
            .navbar-nav { width: 100%; margin-left: 0 !important; }
            .nav-item { margin-bottom: 10px; width: 100%; }
            .nav-link { display: inline-block; width: auto; padding: 12px 20px !important; font-size: 16px; }
            .dropdown-menu { text-align: center; background: #f8f9fa; border: none; }
            .btn-register { width: 100%; max-width: 300px; margin-top: 15px; }
            
            .btn-register + .dropdown-menu {
                position: static !important;
                transform: none !important;
                width: 100%;
                max-width: 300px;
                margin: 10px auto;
            }
        }
        
        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 50%, #90caf9 100%);
            position: relative;
            overflow: hidden;
            padding: 40px 20px;
            min-height: calc(100vh - 70px - 200px);
        }
        .main-content::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: url('img/canje.png') center/cover;
            z-index: 0;
        }
        .main-content::after {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(135deg, rgba(144, 202, 249, 0.7) 0%, rgba(187, 222, 251, 0.6) 100%);
            z-index: 1;
        }
        .form-container {
            position: relative;
            z-index: 3;
            width: 90%;
            max-width: 500px;
            padding: 50px 40px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(33, 150, 243, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.5);
            animation: fadeInUp 0.8s ease-out;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .icon-container { text-align: center; margin-bottom: 25px; }
        .icon { font-size: 60px; display: inline-block; animation: float 3s ease-in-out infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-10px); } }
        h1 { text-align: center; color: #151a67; font-size: 32px; font-weight: 700; margin-bottom: 15px; line-height: 1.3; }
        .subtitle { text-align: center; color: #616160; font-size: 16px; margin-bottom: 35px; line-height: 1.6; }
        .input-group { margin-bottom: 25px; }
        label { display: block; color: #1976d2; font-weight: 600; margin-bottom: 10px; font-size: 14px; }
        input[type="text"] {
            width: 100%; padding: 16px 20px; border: 2px solid #e3f2fd; border-radius: 12px;
            font-size: 16px; font-family: 'Montserrat', sans-serif; transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9); color: #1565c0;
        }
        input[type="text"]:focus { outline: none; border-color: #42a5f5; box-shadow: 0 0 0 4px rgba(66, 165, 245, 0.1); }
        button {
            width: 100%; padding: 16px; background: linear-gradient(135deg, #616160 0%, #151a67 100%);
            color: white; border: none; border-radius: 12px; font-size: 18px; font-weight: 600;
            cursor: pointer; transition: all 0.3s ease; box-shadow: 0 8px 20px rgba(97, 97, 96, 0.3);
            font-family: 'Montserrat', sans-serif;
        }
        button:hover { transform: translateY(-2px); box-shadow: 0 12px 30px rgba(33, 150, 243, 0.4); }
        .message {
            margin-top: 20px; padding: 16px; border-radius: 12px; text-align: center;
            font-weight: 600; display: none; animation: slideIn 0.4s ease-out;
        }
        @keyframes slideIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
        .success { background: rgba(129, 212, 250, 0.3); color: #0277bd; border: 2px solid #81d4fa; }
        .error { background: rgba(239, 154, 154, 0.3); color: #c62828; border: 2px solid #ef9a9a; }
        
        /* --- FOOTER (Responsivo) --- */
        footer { 
            background: #ffffff; 
            color: var(--black); 
            padding: 40px 0 20px;
        }
        
        .footer-section h4 { 
            font-size: 1.2rem; 
            margin-bottom: 15px; 
            color: var(--black); 
            font-family: 'Hatton', serif; 
        }
        
        .footer-section p { 
            font-size: 0.95rem; 
            margin-bottom: 15px; 
            color: var(--black); 
        }
        
        .footer-links { 
            list-style: none; 
            padding: 0; 
        }
        
        .footer-links li { 
            margin-bottom: 8px; 
        }
        
        .footer-links a { 
            color: var(--black); 
            text-decoration: none; 
            transition: var(--transition); 
            font-size: 0.9rem; 
            display: inline-block; 
        }
        
        .footer-links a:hover { 
            color: var(--black); 
            padding-left: 5px; 
        }
        
        .copyright { 
            text-align: center; 
            padding-top: 20px; 
            border-top: 1px solid rgba(89, 210, 236, 0.2); 
            color: var(--black); 
            font-size: 0.85rem; 
        }
        
        /* --- SOCIAL BUTTONS --- */
        .social-section-title { 
            font-size: 1.2rem; 
            margin-bottom: 15px; 
            font-family: 'Hatton', serif; 
            color: var(--black); 
            text-align: center; 
        }
        
        .social-buttons-grid { 
            display: grid; 
            grid-template-columns: repeat(3, 1fr); 
            gap: 15px; 
            max-width: 320px; 
            margin: 0 auto; 
        }
        
        .social-btn {
            position: relative; 
            width: 100%; 
            padding-bottom: 100%; 
            border-radius: 20px;
            display: flex; 
            align-items: center; 
            justify-content: center; 
            text-decoration: none; 
            color: white;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            overflow: hidden; 
            opacity: 0; 
            transform: translateY(20px); 
            animation: fadeInUp 0.6s forwards;
        }
        .social-btn i { 
            position: absolute; 
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            font-size: 2rem; 
            z-index: 2; 
            transition: transform 0.3s ease; 
        }
        .social-btn:hover { 
            transform: translateY(-8px) scale(1.05); 
            box-shadow: 0 15px 30px rgba(0,0,0,0.4); 
            z-index: 10; 
        }
        .social-btn:hover i { 
            transform: translate(-50%, -50%) scale(1.2); 
            text-shadow: 0 0 10px rgba(255,255,255,0.8); 
        }
        .social-btn::after {
            content: attr(data-tooltip); 
            position: absolute; 
            bottom: -35px; 
            left: 50%; 
            transform: translateX(-50%);
            background-color: var(--dark-blue); 
            color: var(--white); 
            padding: 5px 10px; 
            border-radius: 5px;
            font-size: 0.75rem; 
            white-space: nowrap; 
            opacity: 0; 
            visibility: hidden; 
            transition: all 0.3s ease;
            pointer-events: none; 
            font-family: 'Montserrat', sans-serif; 
            font-weight: 600; 
            z-index: 20;
        }
        .social-btn:hover::after { 
            opacity: 1; 
            visibility: visible; 
            bottom: -45px; 
        }
        .btn-fb { 
            background: linear-gradient(135deg, #1877F2, #105bb5); 
            animation-delay: 0.1s; 
        }
        .btn-ig { 
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); 
            animation-delay: 0.2s; 
        }
        .btn-tt { 
            background: linear-gradient(135deg, #000000, #25F4EE); 
            animation-delay: 0.3s; 
        }
        .btn-tt i { 
            text-shadow: 2px 2px 0px #FE2C55; 
        }
        .btn-yt { 
            background: linear-gradient(135deg, #FF0000, #cc0000); 
            animation-delay: 0.4s; 
        }
        .btn-li { 
            background: linear-gradient(135deg, #0A66C2, #004182); 
            animation-delay: 0.5s; 
        }
        .btn-wa { 
            background: linear-gradient(135deg, #25D366, #128C7E); 
            animation-delay: 0.6s; 
        }
        
        @keyframes fadeInUp { 
            to { 
                opacity: 1; 
                transform: translateY(0); 
            } 
        }
        
        @media (max-width: 992px) {
            .footer-container { 
                text-align: center; 
            }
            .social-buttons-grid { 
                margin: 0 auto 20px; 
            }
        }
        
        .wa-button { 
            position: fixed; 
            bottom: 25px; 
            right: 25px; 
            z-index: 1050; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            cursor: pointer; 
            transition: all 0.3s ease; 
            text-decoration: none; 
        }
        .wa-icon { 
            width: 65px; 
            height: 65px; 
            background-color: #25d366; 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.3); 
            animation: bounce 2s infinite; 
            position: relative; 
            z-index: 2; 
            transition: all 0.3s ease; 
        }
        .wa-icon i { 
            color: white; 
            font-size: 35px; 
            transform: rotate(0deg); 
            transition: transform 0.3s ease; 
        }
        .wa-icon::before { 
            content: ''; 
            position: absolute; 
            width: 100%; 
            height: 100%; 
            background-color: #25d366; 
            border-radius: 50%; 
            z-index: -1; 
            animation: ripple 1.5s infinite; 
        }
        .wa-icon::after { 
            content: ''; 
            position: absolute; 
            width: 100%; 
            height: 100%; 
            background-color: #25d366; 
            border-radius: 50%; 
            z-index: -2; 
            animation: ripple 1.5s infinite 0.5s; 
        }
        .wa-badge { 
            position: absolute; 
            top: 0; 
            right: 0; 
            background-color: #ff3b30; 
            width: 24px; 
            height: 24px; 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 13px; 
            font-weight: bold; 
            color: white; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.2); 
            animation: pulse-badge 1.5s infinite; 
            z-index: 3; 
        }
        .wa-tooltip { 
            position: absolute; 
            right: 80px; 
            background-color: #333; 
            color: #fff; 
            padding: 8px 15px; 
            border-radius: 8px; 
            font-size: 14px; 
            white-space: nowrap; 
            opacity: 0; 
            visibility: hidden; 
            transition: all 0.3s ease; 
            transform: translateX(10px); 
            box-shadow: 0 2px 8px rgba(0,0,0,0.2); 
            font-family: 'Montserrat', sans-serif; 
        }
        .wa-tooltip::after { 
            content: ''; 
            position: absolute; 
            top: 50%; 
            right: -6px; 
            transform: translateY(-50%); 
            width: 0; 
            height: 0; 
            border-top: 6px solid transparent; 
            border-bottom: 6px solid transparent; 
            border-left: 6px solid #333; 
        }
        .wa-button:hover .wa-icon { 
            transform: scale(1.1); 
            background-color: #128c7e; 
            animation: none; 
        }
        .wa-button:hover .wa-icon i { 
            transform: rotate(10deg); 
        }
        .wa-button:hover .wa-tooltip { 
            opacity: 1; 
            visibility: visible; 
            transform: translateX(0); 
        }
        @keyframes ripple { 
            0% { transform: scale(1); opacity: 0.7; } 
            100% { transform: scale(1.6); opacity: 0; } 
        }
        @keyframes bounce { 
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); } 
            40% { transform: translateY(-10px); } 
            60% { transform: translateY(-5px); } 
        }
        @keyframes pulse-badge { 
            0% { transform: scale(1); } 
            50% { transform: scale(1.1); } 
            100% { transform: scale(1); } 
        }
        
        img {
            max-width: 100%;
            height: auto;
            display: block;
        }
    </style>
</head>
<body id="canjeregalo">

    <!-- Botón de WhatsApp Flotante -->
    <a href="https://wa.me/525578929085" class="wa-button" target="_blank" aria-label="Contactar por WhatsApp">
        <span class="wa-tooltip">¡Escríbenos!</span>
        <div class="wa-icon">
            <i class="fab fa-whatsapp"></i>
            <div class="wa-badge">1</div>
        </div>
    </a>

    <!-- Header con Navbar Responsivo y efectos neón -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" class="img-fluid" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars" style="color: var(--dark-blue); font-size: 24px;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="nuestroscursos.php">Immerse Hub</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Certificaciones</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="CENNI.php">CENNI</a></li>
                            <li><a class="dropdown-item" href="OPT.php">OXFORD OPT</a></li>
                            <li><a class="dropdown-item" href="OTE.php">OXFORD OTE</a></li>
                            <li><a class="dropdown-item" href="GESE.php">TRINITY GESE</a></li>
                            <li><a class="dropdown-item" href="ISE.php">TRINITY ISE</a></li>
                            <li><a class="dropdown-item" href="TOEFL.php">TOEFL</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Servicios</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="plataforma1.php">Plataforma 1</a></li>
                            <li><a class="dropdown-item" href="plataforma2.php">Plataforma 2</a></li>
                            <li><a class="dropdown-item" href="plataforma3.php">Plataforma 3</a></li>
                            <li><a class="dropdown-item" href="plataforma4.php">Plataforma 4</a></li>
                            <li><a class="dropdown-item" href="plataforma5.php">Plataforma 5</a></li>
                            <li><a class="dropdown-item" href="plataforma6.php">Plataforma 6</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="canjeregalo.php">Regalos</a></li>
                    <li class="nav-item"><a class="nav-link" href="blog.php">Trayectoria</a></li>
                </ul>
                
                <!-- Menú dinámico según sesión con efectos neón -->
                <?php if ($usuario_logueado): ?>
                <ul class="navbar-nav ms-lg-2">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" 
                           href="javascript:void(0)" 
                           id="userDropdown"
                           role="button" 
                           data-bs-toggle="dropdown" 
                           aria-expanded="false"
                           aria-haspopup="true">
                            <i class="fas fa-user-circle" style="font-size: 1.3rem; color: var(--dark-blue);"></i>
                            <span class="fw-semibold"><?php echo htmlspecialchars($nombre_usuario); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" 
                            aria-labelledby="userDropdown" 
                            style="border-radius: 12px; min-width: 200px;">
                            <li class="px-3 py-2 border-bottom">
                                <small class="text-muted">Rol:</small>
                                <div class="fw-bold text-capitalize"><?php echo $rol_usuario; ?></div>
                            </li>
                            <li><a class="dropdown-item py-2" href="registro.php"><i class="fas fa-user me-2 text-primary"></i>Mi Perfil</a></li>
                            <li><a class="dropdown-item py-2" href="#"><i class="fas fa-book me-2 text-success"></i>Mis Cursos</a></li>
                            <?php if ($rol_usuario === 'admin'): ?>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item py-2" href="admin/dashboard.php"><i class="fas fa-cog me-2 text-warning"></i>Panel Admin</a></li>
                            <?php endif; ?>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item py-2 text-danger" href="logout.php" onclick="return confirm('¿Cerrar sesión?')"><i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
                <?php else: ?>
                <ul class="navbar-nav ms-lg-2">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn-register" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-user-plus me-2"></i>Registrarme
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user-graduate"></i> Nuevo ingreso</a></li>
                            <li><a class="dropdown-item" href="https://es.surveymonkey.com/r/RT6KTJN" target="_blank"><i class="fas fa-file-signature"></i> Trámites CNNI</a></li>
                            <li><a class="dropdown-item" href="https://es.surveymonkey.com/r/HGY3LCL" target="_blank"><i class="fas fa-user-minus"></i> Bajas</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item fw-bold" href="registro.php"><i class="fas fa-star"></i> SU</a></li>
                        </ul>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="main-content">
        <div class="form-container">
            <div class="icon-container">
                <div class="icon">🎓</div>
            </div>
            <h1>Accede a Contenido Académico Exclusivo</h1>
            <p class="subtitle">Ingresa tu código especial y desbloquea recursos premium diseñados para potenciar tu aprendizaje.</p>
            <div class="input-group">
                <label for="codigo">Código de Acceso</label>
                <input type="text" id="codigo" placeholder="Ingresa tu código aquí" autocomplete="off">
            </div>
            <button onclick="validarCodigo()">Desbloquear Acceso</button>
            <div id="mensaje" class="message"></div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-container row g-4">
                <div class="col-lg-5 col-md-12">
                    <div class="footer-section">
                        <h4>X-Learning Online</h4>
                        <p>Aprende idiomas de manera efectiva desde cualquier lugar con nuestros programas innovadores y certificaciones internacionales.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-section">
                        <h4>Enlaces Rápidos</h4>
                        <ul class="footer-links">
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="nuestroscursos.php">Immerse Hub</a></li>
                            <li><a href="CENNI.php">Certificaciones</a></li>
                            <li><a href="servicios.php">Servicios</a></li>
                            <li><a href="canjeregalo.php">Regalos</a></li>
                            <li><a href="blog.php">Trayectoria</a></li>
                            <li><a href="registro.php">Registro</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-section">
                        <h4 class="social-section-title">Síguenos</h4>
                        <div class="social-buttons-grid">
                            <a href="https://www.facebook.com/profile.php?id=61555920905204&locale=es_LA" class="social-btn btn-fb" data-tooltip="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/x_learningonline?utm_source=qr&igsh=MTJiZ3J1bHp6eXNtcQ==" class="social-btn btn-ig" data-tooltip="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.tiktok.com/@x_learningonline?_r=1&_t=ZS-91D2tTprHo0" class="social-btn btn-tt" data-tooltip="Tik Tok" target="_blank"><i class="fab fa-tiktok"></i></a>
                            <a href="https://www.youtube.com/@XLearningOnline" class="social-btn btn-yt" data-tooltip="YouTube" target="_blank"><i class="fab fa-youtube"></i></a>
                            <a href="https://www.elon.school/index.html" class="social-btn btn-li" data-tooltip="LinkedIn" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://whatsapp.com/channel/0029Vb5zjsB4SpkKKjmsh90u" class="social-btn btn-wa" data-tooltip="WhatsApp" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2024 X-Learning Online. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- ✅ Bootstrap JS Bundle (DEBE cargarse antes del custom JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- ✅ Custom JS -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // === VALIDAR CÓDIGO ===
        window.validarCodigo = function() {
            const codigo = document.getElementById('codigo').value.trim();
            const mensaje = document.getElementById('mensaje');
            if (codigo === '') {
                mostrarMensaje('Por favor ingresa un código', 'error');
                return;
            }
            if (codigo === 'ACADEMICO2026') {
                mostrarMensaje('¡Código válido! Acceso desbloqueado correctamente.', 'success');
            } else {
                mostrarMensaje('Código incorrecto. Por favor verifica e intenta nuevamente.', 'error');
            }
        }
        
        function mostrarMensaje(texto, tipo) {
            const mensaje = document.getElementById('mensaje');
            mensaje.textContent = texto;
            mensaje.className = 'message ' + tipo;
            mensaje.style.display = 'block';
        }
        
        // Permitir validar con Enter
        document.getElementById('codigo')?.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') { validarCodigo(); }
        });
        
        // === MENÚ MÓVIL RESPONSIVO ===
        // ✅ Verificar que bootstrap esté disponible
        if (typeof bootstrap !== 'undefined') {
            const navLinks = document.querySelectorAll('.nav-link:not(.dropdown-toggle)');
            const menuToggle = document.getElementById('navbarNav');
            if (menuToggle) {
                const bsCollapse = new bootstrap.Collapse(menuToggle, { toggle: false });
                navLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        if (menuToggle.classList.contains('show')) {
                            bsCollapse.toggle();
                        }
                    });
                });
            }
        }
    });
    </script>
</body>
</html>