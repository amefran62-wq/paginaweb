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
    <title>Inglés Súper Intensivo Grupal</title>
   <!-- BOOTSTRAP 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Importación de Fuentes: Hatton y Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hatton:wght@400;600;700&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Anime.js para animaciones -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <style>
        :root {
            /* Colores Principales */
            --primary-blue: #59d2ec;
            --light-blue: #8fe1f2;
            --lighter-blue: #d4f2f9;
            --dark-blue: #1a3a5f;
            --text-dark: #0d1b2a;
            --text-light: #1a3a5f;
            --white: #ffffff;
            --snow: #f8f9fa;
            --dark-mint: #1a3a5f;
            --gris: #616160;
            --medium-gray: #a0a0a0;
            --obscuro: #b4b4b4;
            --black: #000000;
            --border-radius: 16px;
            --transition: all 0.3s ease;
            --heading-font: 'Hatton', serif;
            --body-font: 'Montserrat', sans-serif;
            --blue-deep: #0B3D91;
            --blue-ocean: #1976D2;
            --blue-sky: #59d2ec;
            --blue-light: #8fe1f2;
            --blue-soft: #b3e5fc;
            --blue-midnight: #1a237e;
            --bg-light: #F7F8FA;
            --text-secondary: #4B5563;
            --success-green: #16A34A;
            --error-red: #E11D48;

            /* Paleta de colores */
            --sky-blue: #59d2ec;
            --teal: #029e99;
            --chinese-black: #161616;
            --yankees-blue: #1a3a5f;
            --gray: #616160;
            
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
            line-height: 1.5;
            font-family: 'Montserrat', sans-serif;
            padding-top: 80px; 
            overflow-x: hidden;
        }

        html, body {
            overflow-x: hidden;
        }

        /* --- HEADER & NAV con efectos neón --- */
        .navbar-custom {
            background: linear-gradient(135deg, var(--white) 0%, var(--lighter-blue) 100%);
            box-shadow: 0 2px 20px rgba(89, 210, 236, 0.1);
            height: 70px; 
        }

        .navbar-brand img {
            height: 55px; 
            width: auto;
        }

        /* Alineación en escritorio */
        @media (min-width: 992px) {
            .navbar-nav {
                width: 100%;
                justify-content: center; 
            }
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
            box-shadow: 0 5px 15px rgba(89, 210, 236, 0.3);
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

        /* Ajustes Móviles para mantener la responsividad */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: var(--white);
                padding: 30px 20px;
                border-top: 2px solid var(--primary-blue);
                margin-top: 10px;
                text-align: center;
            }
            
            .navbar-nav {
                width: 100%;
                margin-left: 0 !important;
            }

            .nav-item {
                margin-bottom: 10px;
                width: 100%;
            }

            .nav-link {
                display: inline-block;
                width: auto;
                padding: 12px 20px !important;
                font-size: 16px;
            }

            .dropdown-menu {
                text-align: center;
                background: #f8f9fa;
                border: none;
            }

            .btn-register {
                width: 100%;
                max-width: 300px;
                margin-top: 15px;
            }
            
            .btn-register + .dropdown-menu {
                position: static !important;
                transform: none !important;
                width: 100%;
                max-width: 300px;
                margin: 10px auto;
            }
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Sección hero */
        .hero {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-mint) 100%);
            padding: 60px 0;
            margin-bottom: 50px;
            text-align: center;
        }
        
        .hero h1 {
            font-family: var(--heading-font);
            font-size: 42px;
            color: white;
            margin-bottom: 15px;
        }
        
        .hero p {
            font-size: 20px;
            color: white;
            max-width: 700px;
            margin: 0 auto;
        }
        
        /* Sección de tarjetas */
        .cards-section {
            padding: 20px 0 60px;
            background-color: #f8f9fa;
        }
        
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin: 30px 0;
        }
        
        .info-card {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: var(--transition);
            height: 100%;
            border: 1px solid rgba(89, 210, 236, 0.1);
        }
        
        .info-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(89, 210, 236, 0.15);
            border-color: var(--primary-blue);
        }
        
        .card-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            border-bottom: 2px solid var(--primary-blue);
            padding-bottom: 15px;
        }
        
        .card-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-mint));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }
        
        .card-header h2 {
            font-family: var(--heading-font);
            font-size: 24px;
            margin: 0;
            color: var(--dark-blue);
        }
        
        .card-content {
            color: #000000;;
        }
        
        .info-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px dashed rgba(89, 210, 236, 0.3);
        }
        
        .info-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }
        
        .info-label {
            font-weight: 700;
            color: var(--dark-blue);
            display: block;
            margin-bottom: 5px;
            font-size: 16px;
        }
        
        .info-text {
            font-size: 16px;
            line-height: 1.6;
            color: #000000;
        }
        
        .price-tag {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark-mint);
            margin: 5px 0;
        }
        
        .highlight-text {
            background-color: rgba(89, 210, 236, 0.1);
            padding: 12px;
            border-radius: 8px;
            border-left: 4px solid var(--primary-blue);
            margin: 10px 0;
        }
        
        .list-items {
            list-style: none;
            padding: 0;
            margin: 10px 0;
        }
        
        .list-items li {
            padding: 8px 0 8px 25px;
            position: relative;
            font-size: 15px;
            color: #000000;
        }
        
        .list-items li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: var(--dark-mint);
            font-weight: bold;
        }
        
        .badge-duration {
            display: inline-block;
            background: linear-gradient(135deg, var(--dark-blue), #0d1b2a);
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: 600;
            margin-top: 10px;
        }
        
        .schedule-box {
            background-color: rgba(89, 210, 236, 0.05);
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
        }
        
        .schedule-option {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            padding: 8px;
            background: white;
            border-radius: 8px;
            border: 1px solid rgba(89, 210, 236, 0.2);
        }
        
        .schedule-option i {
            color: var(--primary-blue);
            font-size: 18px;
        }
        
        .schedule-option span {
            font-weight: 600;
            color: var(--dark-blue);
        }

        /* ===== FORMULARIOS SEDUCTORES (COPIADOS DEL INDEX) ===== */
        .formularios-fila {
            padding: 40px 0;
            background: linear-gradient(135deg, var(--bg-light), var(--white));
            position: relative;
            overflow: hidden;
        }
        
        .formularios-fila::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(89,210,236,0.1) 0%, transparent 60%);
            animation: waveRotate 20s linear infinite;
            pointer-events: none;
        }
        
        @keyframes waveRotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .formulario-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 30px 25px;
            height: 100%;
            position: relative;
            overflow: hidden;
            border: 2px solid transparent;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            z-index: 2;
            animation: floatIn 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
            opacity: 0;
        }
        
        .formulario-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg,
                var(--blue-deep),
                var(--blue-ocean),
                var(--blue-sky),
                var(--blue-light),
                var(--blue-soft));
            border-radius: 32px;
            z-index: -1;
            animation: borderGlow 3s linear infinite;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .formulario-card:hover::before {
            opacity: 1;
        }
        
        @keyframes borderGlow {
            0%, 100% { filter: blur(2px); }
            50% { filter: blur(4px); }
        }
        
        .formulario-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 30%, rgba(89,210,236,0.2) 0%, transparent 50%),
                        radial-gradient(circle at 70% 70%, rgba(11,61,145,0.2) 0%, transparent 50%);
            animation: particleMove 8s ease-in-out infinite;
            pointer-events: none;
        }
        
        @keyframes particleMove {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.02); }
        }
        
        .form-aventura { border-top: 5px solid var(--blue-deep); }
        .form-nivel { border-top: 5px solid var(--blue-ocean); }
        .form-promo { border-top: 5px solid var(--blue-midnight); }
        
        @keyframes floatIn {
            0% {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .formulario-card:nth-child(1) { animation-delay: 0.1s; }
        .formulario-card:nth-child(2) { animation-delay: 0.3s; }
        .formulario-card:nth-child(3) { animation-delay: 0.5s; }
        
        .formulario-card h3 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 25px;
            text-align: center;
            position: relative;
            z-index: 2;
            background: linear-gradient(135deg, var(--blue-deep), var(--blue-ocean));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: titlePulse 2s ease-in-out infinite;
        }
        
        @keyframes titlePulse {
            0%, 100% { transform: scale(1); letter-spacing: normal; }
            50% { transform: scale(1.02); letter-spacing: 1px; }
        }
        
        .campo-seductor {
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
            transform-origin: left;
            animation: fieldSlide 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
            opacity: 0;
            transform: translateX(-20px);
        }
        
        .campo-seductor:nth-child(1) { animation-delay: 0.2s; }
        .campo-seductor:nth-child(2) { animation-delay: 0.3s; }
        .campo-seductor:nth-child(3) { animation-delay: 0.4s; }
        
        @keyframes fieldSlide {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .campo-seductor input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid var(--blue-soft);
            border-radius: 15px;
            font-size: 1rem;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            background: rgba(255, 255, 255, 0.9);
        }
        
        .campo-seductor input:focus {
            outline: none;
            border-color: var(--blue-ocean);
            box-shadow: 0 0 0 4px rgba(25, 118, 210, 0.2),
                        0 10px 20px rgba(11, 61, 145, 0.2);
            transform: translateY(-3px) scale(1.02);
        }
        
        .campo-seductor label {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--blue-deep);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            pointer-events: none;
            background: white;
            padding: 0 8px;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 10px;
        }
        
        .campo-seductor input:focus + label,
        .campo-seductor input:not(:placeholder-shown) + label {
            top: 0;
            transform: translateY(-50%) scale(0.85);
            color: var(--blue-ocean);
            font-weight: 600;
            background: linear-gradient(135deg, white, var(--blue-soft));
            padding: 0 12px;
        }
        
        .btn-seductor {
            width: 100%;
            padding: 16px;
            color: var(--white);
            border: none;
            border-radius: 15px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            z-index: 2;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background-size: 200% auto;
            animation: buttonPulse 2s infinite;
        }
        
        @keyframes buttonPulse {
            0%, 100% { box-shadow: 0 10px 20px rgba(11, 61, 145, 0.3); }
            50% { box-shadow: 0 15px 30px rgba(89, 210, 236, 0.5); }
        }
        
        .btn-aventura {
            background: linear-gradient(135deg, var(--blue-deep), var(--blue-ocean), var(--blue-sky));
            background-size: 200% 200%;
            animation: gradientMove 3s ease infinite;
        }
        
        .btn-nivel {
            background: linear-gradient(135deg, var(--blue-ocean), var(--blue-sky), var(--blue-light));
            background-size: 200% 200%;
            animation: gradientMove 3.5s ease infinite;
        }
        
        .btn-promo {
            background: linear-gradient(135deg, var(--blue-midnight), var(--blue-deep), var(--blue-ocean));
            background-size: 200% 200%;
            animation: gradientMove 4s ease infinite;
        }
        
        @keyframes gradientMove {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .btn-seductor::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.8s ease, height 0.8s ease;
        }
        
        .btn-seductor:hover::before {
            width: 400px;
            height: 400px;
        }
        
        .btn-seductor:hover {
            transform: translateY(-5px) scale(1.05);
            letter-spacing: 2px;
        }
        
        .btn-seductor i {
            transition: all 0.4s ease;
        }
        
        .btn-seductor:hover i {
            transform: translateX(5px) rotate(10deg) scale(1.2);
        }
        
        .success-panel-seductor {
            display: none;
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            border-radius: 15px;
            margin-top: 20px;
            animation: successPop 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 2px solid var(--blue-sky);
        }
        
        @keyframes successPop {
            0% {
                opacity: 0;
                transform: scale(0.5) rotate(-5deg);
            }
            50% {
                transform: scale(1.1) rotate(2deg);
            }
            100% {
                opacity: 1;
                transform: scale(1) rotate(0);
            }
        }
        
        .success-panel-seductor .check-badge {
            width: 50px;
            height: 50px;
            margin: 0 auto 10px;
            stroke-dasharray: 100;
            stroke-dashoffset: 100;
            animation: drawCheck 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }
        
        .success-panel-seductor p {
            color: var(--blue-deep);
            font-weight: 600;
            font-size: 1rem;
            animation: fadeInUp 0.5s ease 0.3s both;
        }
        
        .error-message {
            color: var(--error-red);
            font-size: 0.8rem;
            margin-top: 5px;
            display: none;
            animation: shakeError 0.3s ease;
        }
        
        @keyframes shakeError {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        .shake {
            animation: shakeError 0.16s ease-in-out;
        }
        
        @keyframes drawCheck {
            to { stroke-dashoffset: 0; }
        }
        
        /* Botones de formularios */
        .botones-formularios-wrapper {
            text-align: center;
            margin: 15px 0 10px;
        }
        
        .btn-clase-muestra {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            color: var(--white);
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            padding: 12px 20px;
            border-radius: 50px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 10px 25px rgba(89, 210, 236, 0.3);
            animation: gentleFloat 4s infinite;
            position: relative;
            overflow: hidden;
            width: 100%;
        }
        
        .btn-clase-muestra::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }
        
        .btn-clase-muestra:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .btn-clase-muestra:hover {
            transform: scale(1.05) translateY(-3px);
            box-shadow: 0 15px 35px rgba(89, 210, 236, 0.5);
        }
       /* --- LOCATION SECTION (Responsivo) --- */
       .location-section { padding: 60px 0; background: linear-gradient(135deg, #f5f5f5 0%, #e3f2fd 50%, #2F5177 100%); color: #000000; /* gris oscuro para buena legibilidad */ }
        .location-info h2 { font-size: 2rem; font-family: 'Hatton', serif; margin-bottom: 12px; color: var(--black); line-height: 1.1; }
        .location-info p { font-size: 1rem; line-height: 1.4; margin-bottom: 15px; color: var(--black); }
        .contact-info { display: flex; flex-direction: column; gap: 10px; }
        .contact-item { display: flex; align-items: center; gap: 12px; background: #a0a0a09c; padding: 12px; border-radius: 9px; }
        .contact-item span, .contact-item h4 { font-size: 1.2rem; margin: 0; }
        .contact-icon { width: 36px; height: 36px; background: var(--gris); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1rem; color: var(--snow); flex-shrink: 0; }
        .location-image { position: relative; border-radius: 20px; overflow: hidden; height: 320px; box-shadow: 0 16px 30px #0d1b2a; transition: transform 0.4s ease, box-shadow 0.4s ease; margin-top: 25px; }
        @media (min-width: 992px) { .location-image { margin-top: 0; } }
        .location-image img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
        .location-overlay { position: absolute; bottom: 0; left: 0; right: 0; background: rgba(47, 81, 119, 0.283); padding: 15px; font-size: 0.9rem; backdrop-filter: blur(3px); color: #ffffff; /* texto en blanco para visibilidad sobre el mapa */}
        .location-overlay h3 { font-family: 'Hatton', serif; font-size: 1.5rem; margin: 0; }
        .btn-map { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; background: var(--dark-blue); color: var(--lighter-blue); border-radius: 25px; font-size: 1.0rem; font-weight: 700; text-decoration: none; margin-top: 8px; transition: background 0.3s ease, transform 0.3s ease; font-family: 'Montserrat', sans-serif; }
        .btn-map:hover { background: white; color: var(--black); }

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

        /* SOCIAL BUTTONS */
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
            gap: 12px; 
            max-width: 280px; 
            margin: 0 auto; 
        }
        
        .social-btn { 
            aspect-ratio: 1 / 1; 
            border-radius: 18px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            text-decoration: none; 
            color: white; 
            transition: all 0.3s ease; 
            box-shadow: 0 6px 12px rgba(0,0,0,0.2); 
            width: 100%; 
        }
        
        .social-btn i { 
            font-size: 1.8rem; 
        }
        
        .social-btn:hover { 
            transform: translateY(-5px); 
        }
        
        .btn-fb { background: linear-gradient(135deg, #1877F2, #0e5a9e); }
        .btn-ig { background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); }
        .btn-tt { background: linear-gradient(135deg, #000000, #25F4EE); }
        .btn-tt i { text-shadow: 2px 2px 0px #FE2C55; }
        .btn-yt { background: linear-gradient(135deg, #FF0000, #cc0000); }
        .btn-li { background: linear-gradient(135deg, #0A66C2, #004182); }
        .btn-wa { background: linear-gradient(135deg, #25D366, #128C7E); }

        /* WHATSAPP BUTTON */
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

        /* Animaciones */
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
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes gentleFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 32px;
            }
            
            .cards-grid {
                grid-template-columns: 1fr;
            }
            
            .card-header h2 {
                font-size: 22px;
            }
            
            .btn-clase-muestra {
                font-size: 0.9rem;
                padding: 10px 15px;
            }
            
            .schedule-option {
                flex-direction: column;
                text-align: center;
            }
        }
        
        img {
            max-width: 100%;
            height: auto;
            display: block;
        }
    
        .wa-message {
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .wa-message i {
            color: #25D366;
            font-size: 1.2rem;
            animation: gentleFloat 2s infinite;
        }
    </style>
</head>
<body>
    
    <!-- Botón de WhatsApp Flotante -->
    <a href="https://wa.me/525535678120" class="wa-button" target="_blank" aria-label="Contactar por WhatsApp">
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fas fa-bars" style="color: var(--dark-blue); font-size: 24px;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link active" href="nuestroscursos.php">Immerse Hub</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Certificaciones</a>
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
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle" style="font-size: 1.3rem; color: var(--dark-blue);"></i>
                                <span class="fw-semibold"><?php echo htmlspecialchars($nombre_usuario); ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="border-radius: 12px; min-width: 200px;">
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

    <!-- Sección Hero -->
    <section class="hero">
        <div class="container">
            <h1>Social Hub (SH)</h1>
            <p>Dirigido a Jóvenes, adultos y profesionistas.</p>
        </div>
    </section>

    <!-- Sección de tarjetas con la información -->
    <section class="cards-section">
        <div class="container">
            <div class="cards-grid">
                <!-- Tarjeta 1: Colegiatura -->
                <div class="info-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h2>Colegiatura</h2>
                    </div>
                    <div class="card-content">
                        <div class="price-tag">$2,000</div>
                        <p class="info-text">Cada 6 semanas</p>
                    </div>
                </div>

                <!-- Tarjeta 2: Horarios y Duración -->
                <div class="info-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h2>Horarios</h2>
                    </div>
                    <div class="card-content">
                        <div class="info-item">
                            <span class="info-label">Sábados y Domingos:</span>
                            <div class="schedule-box">
                                <div class="schedule-option">
                                    <i class="fas fa-sun"></i>
                                    <span>Turno Matutino:</span>
                                    <p class="mb-0 ms-auto">7:00 am - 11:00 am</p>
                                </div>
                                <div class="schedule-option">
                                    <i class="fas fa-cloud-sun"></i>
                                    <span>Turno Vespertino:</span>
                                    <p class="mb-0 ms-auto">11:00 am - 3:00 pm</p>
                                </div>
                            </div>
                        </div>
                        <div class="badge-duration">
                            <i class="far fa-calendar-alt me-2"></i>Duración: 1 año y 8 meses
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 3: Beneficios -->
                <div class="info-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h2>Beneficios</h2>
                    </div>
                    <div class="card-content">
                        <ul class="list-items">
                            <li>Doble o triple certificación</li>
                        </ul>
                        
                        <div class="highlight-text">
                            <span class="info-label">Vínculos:</span>
                            <p class="info-text mt-2">Practica con extranjeros</p>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 4: Características -->
                <div class="info-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h2>Características</h2>
                    </div>
                    <div class="card-content">
                        <ul class="list-items">
                            <li>100% en línea</li>
                            <li>Sin libros ni gramática</li>
                            <li>Ejercicios de lectura de comprensión auditiva</li>
                            <li>Actividades de prácticas</li>
                        </ul>
                    </div>
                </div>

                <!-- Tarjeta 5: Requisitos -->
                <div class="info-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h2>Requisitos</h2>
                    </div>
                    <div class="card-content">
                        <ul class="list-items">
                            <li>Seguir nuestras Redes Sociales</li>
                            <li>Pago de primera colegiatura</li>
                            <li>Llenar Formulario de Inscripción</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <section class="location-section" id="ubicacion">
<div class="container"><div class="row">
<div class="col-lg-7 col-12">
<div class="location-info">
<h2>Ubicación y contacto</h2>
<div class="contact-info">
<div class="contact-item"><div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div><span>AV. CAYUCO 12, ZIBATÁ, QRO.</span></div>
<div class="contact-item"><div class="contact-icon"><i class="fas fa-phone"></i></div><span>+52 55-3567-8120</span></div>
<div class="contact-item"><div class="contact-icon"><i class="fas fa-envelope"></i></div><span>info@expresslearningonline.com</span></div>
</div>
</div>
</div>
<div class="col-lg-5 col-12">
<div class="location-image">
<a href="https://www.google.com/maps?ll=20.683713,-100.341161&z=15" target="_blank"><img src="img/imagen de zibata.jpeg" alt="Querétaro"></a>
<div class="location-overlay"><h3>Zibata, Querétaro</h3><a href="https://www.google.com/maps?ll=20.683713,-100.341161&z=15" target="_blank" class="btn-map"><i class="fas fa-map-marker-alt"></i> Ver mapa</a></div>
</div>
</div>
</div></div>
</section>
    
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

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Lógica del menú móvil
        const navLinks = document.querySelectorAll('.nav-link:not(.dropdown-toggle)');
        const menuToggle = document.getElementById('navbarNav');
        
        if(menuToggle){
            const bsCollapse = new bootstrap.Collapse(menuToggle, {toggle:false});
            
            navLinks.forEach((link) => {
                link.addEventListener('click', () => {
                    if(menuToggle.classList.contains('show')) {
                        bsCollapse.toggle();
                    }
                });
            });
        }
        
        // Dropdown hover en desktop
        if (window.innerWidth > 992) {
            const dropdowns = document.querySelectorAll('.dropdown');
            dropdowns.forEach(dropdown => {
                dropdown.addEventListener('mouseenter', function() {
                    const toggle = this.querySelector('.dropdown-toggle');
                    if (toggle) toggle.click();
                });
                dropdown.addEventListener('mouseleave', function() {
                    const toggle = this.querySelector('.dropdown-toggle');
                    if (toggle) toggle.click();
                });
            });
        }

        // Función genérica para validar formularios (COPIADA DEL INDEX)
        function setupFormValidation(formClass, nombreId, emailId, telefonoId, successPanel) {
            const form = document.querySelector(`.${formClass}`);
            if (!form) return;
            
            const nombre = document.getElementById(nombreId);
            const email = document.getElementById(emailId);
            const telefono = document.getElementById(telefonoId);
            const btnSubmit = form.querySelector('button[type="submit"]');
            const successElement = form.querySelector('.success-panel-seductor');

            function validateField(field, errorElement, message) {
                if (!field.value.trim()) {
                    field.setAttribute('aria-invalid', 'true');
                    errorElement.textContent = message;
                    errorElement.style.display = 'block';
                    return false;
                }
                field.setAttribute('aria-invalid', 'false');
                errorElement.style.display = 'none';
                return true;
            }

            function validateEmail(field, errorElement) {
                const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!regex.test(field.value)) {
                    field.setAttribute('aria-invalid', 'true');
                    errorElement.textContent = 'Correo electrónico inválido';
                    errorElement.style.display = 'block';
                    return false;
                }
                field.setAttribute('aria-invalid', 'false');
                errorElement.style.display = 'none';
                return true;
            }

            function validatePhone(field, errorElement) {
                const regex = /^[\d\s\+\-]{10,}$/;
                if (!regex.test(field.value)) {
                    field.setAttribute('aria-invalid', 'true');
                    errorElement.textContent = 'Teléfono inválido (mínimo 10 dígitos)';
                    errorElement.style.display = 'block';
                    return false;
                }
                field.setAttribute('aria-invalid', 'false');
                errorElement.style.display = 'none';
                return true;
            }

            // Event listeners
            nombre.addEventListener('input', () => {
                validateField(nombre, nombre.nextElementSibling.nextElementSibling, 'El nombre es requerido');
            });
            
            email.addEventListener('input', () => {
                validateEmail(email, email.nextElementSibling.nextElementSibling);
            });
            
            telefono.addEventListener('input', () => {
                validatePhone(telefono, telefono.nextElementSibling.nextElementSibling);
            });

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const isValid = validateField(nombre, nombre.nextElementSibling.nextElementSibling, 'El nombre es requerido') &&
                                validateEmail(email, email.nextElementSibling.nextElementSibling) &&
                                validatePhone(telefono, telefono.nextElementSibling.nextElementSibling);

                if (!isValid) {
                    form.classList.add('shake');
                    setTimeout(() => form.classList.remove('shake'), 160);
                    return;
                }

                // Animación del botón al enviar
                anime({
                    targets: btnSubmit,
                    scale: [1, 0.95, 1],
                    duration: 600,
                    easing: 'easeInOutElastic'
                });

                // Simular envío exitoso
                btnSubmit.disabled = true;
                const originalText = btnSubmit.innerHTML;
                btnSubmit.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';

                setTimeout(() => {
                    successElement.style.display = 'block';
                    form.reset();

                    // Animación del panel de éxito
                    anime({
                        targets: successElement,
                        scale: [0.8, 1.1, 1],
                        duration: 800,
                        easing: 'easeOutElastic'
                    });

                    // Abrir WhatsApp con datos simulados
                    setTimeout(() => {
                        const mensaje = encodeURIComponent(
                            `🎓 *X-Learning Online*\n` +
                            `Hola, soy *${nombre.value}*.\n` +
                            `📧 Correo: ${email.value}\n` +
                            `📱 Teléfono: ${telefono.value}\n` +
                            `Me interesa: ${form.closest('.formulario-card').querySelector('h3').innerText}`
                        );
                        window.open(`https://wa.me/525611470824?text=${mensaje}`, '_blank');
                        
                        successElement.style.display = 'none';
                        btnSubmit.disabled = false;
                        btnSubmit.innerHTML = originalText;
                    }, 1500);
                }, 1000);
            });
        }

        // Configurar validación para los tres formularios
        setupFormValidation('form-aventura-form', 'nombre-aventura', 'email-aventura', 'telefono-aventura');
        setupFormValidation('form-nivel-form', 'nombre-nivel', 'email-nivel', 'telefono-nivel');
        setupFormValidation('form-promo-form', 'nombre-promo', 'email-promo', 'telefono-promo');

        // Animación de los campos al hacer hover
        document.querySelectorAll('.campo-seductor').forEach(field => {
            field.addEventListener('mouseenter', () => {
                anime({
                    targets: field,
                    translateX: [0, 5],
                    duration: 300,
                    easing: 'easeOutElastic'
                });
            });
            field.addEventListener('mouseleave', () => {
                anime({
                    targets: field,
                    translateX: [5, 0],
                    duration: 300,
                    easing: 'easeOutElastic'
                });
            });
        });

        // Efecto de brillo en los botones
        document.querySelectorAll('.btn-seductor').forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                anime({
                    targets: btn,
                    scale: 1.05,
                    boxShadow: ['0 10px 20px rgba(11,61,145,0.3)', '0 20px 40px rgba(89,210,236,0.5)'],
                    duration: 400,
                    easing: 'easeOutElastic'
                });
            });
            btn.addEventListener('mouseleave', () => {
                anime({
                    targets: btn,
                    scale: 1,
                    boxShadow: '0 10px 20px rgba(11,61,145,0.3)',
                    duration: 400,
                    easing: 'easeOutElastic'
                });
            });
        });

        // Scroll suave para los enlaces de los botones
        document.querySelectorAll('.btn-clase-muestra').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const href = this.getAttribute('href');
                if (href && href.startsWith('#')) {
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        
                        // Efecto de onda en el formulario objetivo
                        target.classList.add('wave-effect');
                        target.style.transform = 'scale(1.05)';
                        target.style.boxShadow = '0 30px 60px rgba(11, 61, 145, 0.4)';
                        
                        setTimeout(() => {
                            target.style.transform = '';
                            target.style.boxShadow = '';
                            target.classList.remove('wave-effect');
                        }, 1000);
                    }
                }
            });
        });

        // Animación de entrada con Intersection Observer
        const observerOptions = {
            threshold: 0.2,
            rootMargin: '0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    anime({
                        targets: entry.target,
                        opacity: [0, 1],
                        translateY: [50, 0],
                        scale: [0.9, 1],
                        duration: 1200,
                        easing: 'easeOutElastic(1, .5)'
                    });
                }
            });
        }, observerOptions);

        document.querySelectorAll('.formulario-card').forEach(card => {
            card.style.opacity = '0';
            observer.observe(card);
        });
    </script>
    <!-- ===== CHATBOT ===== -->
<?php include 'includes/chatBot.php'; ?>
</body>
</html>