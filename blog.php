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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Learning Online - Portafolio de Estudiantes</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Fuentes Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --sky-blue: #59d2ec;
            --teal: #029e99;
            --chinese-black: #161616;
            --light-blue: #8fe1f2;
            --white: #ffffff;
            --text-dark: #000000;
            --yankees-blue: #0a2f5b;
            --snow: #fbfaf7;
            --gray: #616160;
            --lighter-blue: #d4f2f9;
            --dark-blue: #1a3a5f;
            --border-radius: 16px;
            --transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            --primary-blue: #59d2ec;
            --dark-mint: #029e99;
            --gris: #616160;
            --medium-gray: #a0a0a0;
           --primary-blue: #59d2ec; --light-blue: #8fe1f2; --lighter-blue: #d4f2f9;
--dark-blue: #1a3a5f; --text-dark: #0d1b2a; --text-light: #1a3a5f;
--white: #ffffff; --snow: #f8f9fa; --gris: #616160; --medium-gray: #a0a0a0;
--black:#000000; --border-radius: 12px; --transition: all 0.3s ease;
--blue-deep: #0B3D91; --blue-ocean: #1976D2; --blue-sky: #59d2ec;
--blue-light: #8fe1f2; --blue-soft: #b3e5fc; --blue-midnight: #1a237e;
--bg-light: #F7F8FA; --text-secondary: #4B5563;
--success-green: #16A34A; --error-red: #E11D48;
          --border-radius: 12px;
--transition: all 0.3s ease;
--heading-font: 'Hatton', serif;
--body-font: 'Montserrat', sans-serif;

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
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: var(--white);
            color: #000000;
            line-height: 1.5;
            font-family: var(--body-font);
            padding-top: 80px;
            overflow-x: hidden;
            font-size: 22px;
            font-family: var(--body-font);
        }
        
        @media (max-width: 768px) {
            body {
                font-size: 22px;
            }
        }
        
        img {
            max-width: 100%;
            height: auto;
            display: block;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* ===== HEADER CON EFECTOS NEÓN ===== */
        .navbar-custom {
            background: linear-gradient(135deg, var(--white) 0%, var(--lighter-blue) 100%);
            box-shadow: 0 2px 20px rgba(89, 210, 236, 0.1);
            height: 70px;
        }
        
        .navbar-brand img {
            height: 55px;
            width: auto;
        }
        
        @media (min-width: 992px) {
            .navbar-nav {
                width: 100%;
                justify-content: center;
            }
            .ms-lg-2 {
                margin-left: 1rem !important;
            }
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
        
        /* Responsive para el menú */
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

        /* ===== HERO SECTION ===== */
        .hero {
            background: linear-gradient(135deg, #c6cbe05d 0%, #51d4ff 50%, #2F5177 100%);
            padding: 100px 0 95px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('img/imgcursos.jpeg');
            background-size: cover;
            background-position: center;
            opacity: 0.1;
            z-index: 1;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .hero h1 {
            font-size: 45px;
            margin-bottom: 20px;
            color: var(--black);
            font-family: 'Hatton', serif;
            text-shadow: 0 4px 12px rgba(0,0,0,0.2);
            line-height: 1.2;
        }
        
        .hero p {
            font-size: 25px;
            max-width: 800px;
            margin: 0 auto;
            color: var(--black);
            opacity: 0.95;
            line-height: 1.6;
        }

        /* ===== ABOUT SECTION ===== */
        .about-section {
            padding: 60px 0;
        }
        
        .about-section h2 {
            text-align: center;
            font-size: clamp(30px, 4vw, 42px);
            margin-bottom: 40px;
            color: #000000;
            font-family: var(--heading-font);
        }
        
        .timeline {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 26px;
            margin-bottom: 45px;
        }
        
        .timeline-item {
            background-color: white;
            padding: 0;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-top: 10px solid var(--teal);
            transition: var(--transition);
        }
        
        .timeline-item:nth-child(2) { border-top-color: var(--sky-blue); }
        .timeline-item:nth-child(3) { border-top-color: var(--yankees-blue); }
        .timeline-item:nth-child(4) { border-top-color: var(--gray); }
        
        .timeline-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(89, 210, 236, 0.15);
        }
        
        .timeline-image-container {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }
        
        .timeline-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .timeline-item h3 {
            color: var(--teal);
            margin: 20px 20px 10px;
            font-size: 2rem;
            font-family: var(--heading-font);
        }
        
        .timeline-item p {
            color: #000000;
            margin: 0 20px 20px;
            font-size: 1.2rem;
            line-height: 1.6;
        }
        
        /* ===== FILTROS SIMPLIFICADOS - COLOR AZUL OSCURO ===== */
        .filters-simple {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin: 40px 0;
        }
        
        .filter-btn-simple {
            padding: 12px 30px;
            background: white;
            border: 2px solid var(--dark-blue);
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            color: var(--dark-blue);
            transition: var(--transition);
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(26, 58, 95, 0.1);
            min-width: 120px;
        }
        
        .filter-btn-simple:hover,
        .filter-btn-simple.active {
            background: var(--dark-blue);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(26, 58, 95, 0.3);
        }
        
        /* ===== PORTAFOLIO ===== */
        .portfolio-section {
            padding: 60px 0;
            background: var(--snow);
        }
        
        .section-title {
            text-align: center;
            font-size: clamp(28px, 4vw, 42px);
            color: #000000;
            margin-bottom: 15px;
            font-family: var(--heading-font);
        }
        
        .section-subtitle {
            text-align: center;
            color: #000000;
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto 20px;
        }
        
        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }
        
        @media (max-width: 768px) {
            .portfolio-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .portfolio-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(89, 210, 236, 0.15);
            transition: var(--transition);
            opacity: 0;
            animation: fadeInUp 0.8s ease-out forwards;
            position: relative;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        .portfolio-card:nth-child(1) { animation-delay: 0.1s; }
        .portfolio-card:nth-child(2) { animation-delay: 0.2s; }
        .portfolio-card:nth-child(3) { animation-delay: 0.3s; }
        .portfolio-card:nth-child(4) { animation-delay: 0.4s; }
        .portfolio-card:nth-child(5) { animation-delay: 0.5s; }
        .portfolio-card:nth-child(6) { animation-delay: 0.6s; }
        .portfolio-card:nth-child(7) { animation-delay: 0.7s; }
        .portfolio-card:nth-child(8) { animation-delay: 0.8s; }
        
        .portfolio-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 45px rgba(89, 210, 236, 0.25);
        }
        
        .card-badge {
            display: none;
        }
        
        /* NUEVO ESTILO PARA LAS IMÁGENES CON EFECTO BORROSO */
        .portfolio-image {
            height: 280px;
            position: relative;
            overflow: hidden;
            background-color: transparent;
        }
        
        /* Fondo borroso de la misma imagen */
        .portfolio-image::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background-image: inherit;
            background-size: cover;
            background-position: center;
            filter: blur(15px) brightness(0.8);
            transform: scale(1.1);
            z-index: 1;
        }
        
        .portfolio-image img {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.6s ease;
        }
        
        .portfolio-card:hover .portfolio-image img {
            transform: scale(1.05);
        }
        
        .portfolio-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(26, 58, 95, 0.95));
            padding: 20px;
            color: white;
            transform: translateY(100%);
            transition: transform 0.5s ease;
            z-index: 3;
        }
        
        .portfolio-card:hover .portfolio-overlay {
            transform: translateY(0);
        }
        
        .portfolio-overlay h3 {
            font-size: 1.4rem;
            margin-bottom: 5px;
            font-family: var(--heading-font);
        }
        
        .portfolio-overlay p {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        .portfolio-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .student-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .student-icon {
            width: 60px;
            height: 60px;
            background: var(--lighter-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-blue);
            font-size: 1.5rem;
            flex-shrink: 0;
            transition: var(--transition);
        }
        
        .portfolio-card:hover .student-icon {
            background: var(--primary-blue);
            color: white;
            transform: rotate(360deg);
        }
        
        .student-details h4 {
            color: #000000;
            font-size: 1.3rem;
            margin-bottom: 5px;
            font-family: var(--heading-font);
        }
        
        .student-details p {
            color: #000000;
            font-size: 1rem;
            margin: 2px 0;
        }
        
        .student-details i {
            color: var(--primary-blue);
            margin-right: 5px;
        }

        .student-level-icon {
            color: var(--dark-blue);
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .student-level-icon i {
            color: #ffb347;
            font-size: 1.1rem;
        }
        
        .student-bio {
            color: #000000;
            line-height: 1.7;
            margin: 15px 0;
            font-size: 1rem;
            position: relative;
            max-height: none;
            overflow: visible;
            transition: max-height 0.3s ease;
            cursor: pointer;
        }
        
        .student-bio:after {
            display: none;
        }
        
        .flags-section {
            margin-top: auto;
        }
        
        .flags-title {
            color: #000000;
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1rem;
        }
        
        .flags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .flag-wrapper {
            position: relative;
            width: 40px;
            height: 30px;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: transform 0.3s ease, z-index 0s;
        }
        
        .flag-wrapper:hover {
            transform: scale(1.5);
            z-index: 10;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        
        .flag-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .flag-tooltip {
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: var(--dark-blue);
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.7rem;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            margin-bottom: 5px;
            pointer-events: none;
            z-index: 20;
        }
        
        .flag-tooltip::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border-width: 4px;
            border-style: solid;
            border-color: var(--dark-blue) transparent transparent transparent;
        }
        
        .flag-wrapper:hover .flag-tooltip {
            opacity: 1;
            visibility: visible;
        }
        
        /* --- LOCATION SECTION (Responsivo) --- */
        .location-section { 
            padding: 60px 0; 
            background: linear-gradient(135deg, #f5f5f5 0%, #e3f2fd 50%, #2F5177 100%); 
            color: #000000;
        }
        
        .location-info h2 { 
            font-size: 2rem; 
            font-family: 'Hatton', serif; 
            margin-bottom: 12px; 
            color: var(--black); 
            line-height: 1.1; 
        }
        
        .location-info p { 
            font-size: 1rem; 
            line-height: 1.4; 
            margin-bottom: 15px; 
            color: var(--black); 
        }
        
        .contact-info { 
            display: flex; 
            flex-direction: column; 
            gap: 10px; 
        }
        
        .contact-item { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            background: #a0a0a09c; 
            padding: 12px; 
            border-radius: 9px; 
        }
        
        .contact-item span, .contact-item h4 { 
            font-size: 1.2rem; 
            margin: 0; 
        }
        
        .contact-icon { 
            width: 36px; 
            height: 36px; 
            background: var(--gris); 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 1rem; 
            color: var(--snow); 
            flex-shrink: 0; 
        }
        
        .location-image { 
            position: relative; 
            border-radius: 20px; 
            overflow: hidden; 
            height: 320px; 
            box-shadow: 0 16px 30px #0d1b2a; 
            transition: transform 0.4s ease, box-shadow 0.4s ease; 
            margin-top: 25px; 
        }
        
        @media (min-width: 992px) { 
            .location-image { 
                margin-top: 0; 
            } 
        }
        
        .location-image img { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            transition: transform 0.5s ease; 
        }
        
        .location-overlay { 
            position: absolute; 
            bottom: 0; 
            left: 0; 
            right: 0; 
            background: rgba(47, 81, 119, 0.283); 
            padding: 15px; 
            font-size: 0.9rem; 
            backdrop-filter: blur(3px); 
            color: #ffffff;
        }
        
        .location-overlay h3 { 
            font-family: 'Hatton', serif; 
            font-size: 1.5rem; 
            margin: 0; 
        }
        
        .btn-map { 
            display: inline-flex; 
            align-items: center; 
            gap: 6px; 
            padding: 8px 16px; 
            background: var(--dark-blue); 
            color: var(--lighter-blue); 
            border-radius: 25px; 
            font-size: 1.0rem; 
            font-weight: 700; 
            text-decoration: none; 
            margin-top: 8px; 
            transition: background 0.3s ease, transform 0.3s ease; 
            font-family: 'Montserrat', sans-serif; 
        }
        
        .btn-map:hover { 
            background: white; 
            color: var(--black); 
        }
        
        /* ===== FOOTER ===== */
        footer {
            background: #ffffff;
            color: #000000;
            padding: 50px 0 20px;
        }
        
        .footer-section h4 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #000000;
            font-family: var(--heading-font);
        }
        
        .footer-section p {
            font-size: 0.95rem;
            margin-bottom: 15px;
            color: #000000;
            line-height: 1.6;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: #000000;
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.9rem;
            display: inline-block;
        }
        
        .footer-links a:hover {
            color: var(--primary-blue);
            padding-left: 8px;
        }
        
        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(89, 210, 236, 0.2);
            color: #000000;
            font-size: 0.85rem;
            margin-top: 30px;
        }
        
        /* ===== SOCIAL BUTTONS ===== */
        .social-buttons-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            max-width: 320px;
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
        
        .social-btn:nth-child(1) { animation-delay: 0.1s; }
        .social-btn:nth-child(2) { animation-delay: 0.2s; }
        .social-btn:nth-child(3) { animation-delay: 0.3s; }
        .social-btn:nth-child(4) { animation-delay: 0.4s; }
        .social-btn:nth-child(5) { animation-delay: 0.5s; }
        .social-btn:nth-child(6) { animation-delay: 0.6s; }
        
        .social-btn i {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.8rem;
            z-index: 2;
            transition: transform 0.3s ease;
        }
        
        .social-btn:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 15px 30px rgba(0,0,0,0.4);
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
            font-family: var(--body-font);
            font-weight: 600;
            z-index: 20;
        }
        
        .social-btn:hover::after {
            opacity: 1;
            visibility: visible;
            bottom: -45px;
        }
        
        .btn-fb { background: linear-gradient(135deg, #1877F2, #105bb5); }
        .btn-ig { background: linear-gradient(45deg, #f09433, #dc2743); }
        .btn-tt { background: linear-gradient(135deg, #000000, #25F4EE); }
        .btn-tt i { text-shadow: 2px 2px 0px #FE2C55; }
        .btn-yt { background: linear-gradient(135deg, #FF0000, #cc0000); }
        .btn-li { background: linear-gradient(135deg, #0A66C2, #004182); }
        .btn-wa { background: linear-gradient(135deg, #25D366, #128C7E); }
        
        /* ===== WHATSAPP BUTTON ===== */
        .wa-button {
            position: fixed;
            bottom: 25px;
            right: 25px;
            z-index: 9999;
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
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
            animation: bounce 2s infinite;
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }
        
        @media (max-width: 480px) {
            .wa-icon {
                width: 50px;
                height: 50px;
            }
            .wa-icon i {
                font-size: 28px;
            }
        }
        
        .wa-icon i {
            color: white;
            font-size: 32px;
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
            width: 22px;
            height: 22px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
            color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            animation: pulse-badge 1.5s infinite;
            z-index: 3;
        }
        
        .wa-tooltip {
            position: absolute;
            right: 75px;
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
            font-family: var(--body-font);
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
        
        @font-face {
            font-family: 'Hatton';
            src: url('fonts/Hatton-Regular.woff2') format('woff2'),
                 url('fonts/Hatton-Regular.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }
    </style>
</head>
<body id="index.php">
<?php if (isset($_GET['logged_out'])): ?>
<div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-5" style="z-index: 9999; min-width: 300px;">
    <i class="fas fa-check-circle"></i> Sesión cerrada correctamente.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<a href="https://wa.me/525535678120" class="wa-button" target="_blank">
    <div class="wa-icon"><i class="fab fa-whatsapp"></i></div>
</a>

<!-- Header con efectos neón -->
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="img-fluid" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="fas fa-bars" style="color: var(--dark-blue); font-size: 24px;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="nuestroscursos.php">Immerse Hub</a></li>
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
            <?php if ($usuario_logueado): ?>
                <ul class="navbar-nav ms-lg-2">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle" style="font-size: 1.3rem; color: var(--dark-blue);"></i>
                            <span class="fw-semibold"><?php echo htmlspecialchars($nombre_usuario); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="border-radius: 12px; min-width: 200px;">
                            <li class="px-3 py-2 border-bottom"><small class="text-muted">Rol:</small><div class="fw-bold text-capitalize"><?php echo $rol_usuario; ?></div></li>
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

<!-- Hero Section -->
<section class="hero">
    <div class="hero-bg"></div>
    <div class="container hero-content">
        <h1>Nuestro Legado de Alumnos Internacionales</h1>
        <p>Conoce a nuestros embajadores internacionales y descubre cómo su aprendizaje se ha transformado en oportunidades globales.</p>
    </div>
</section>

<!-- About Section -->
<section class="about-section">
    <div class="container">
        <h2>Nuestra trayectoria</h2>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-image-container">
                    <img src="img/trayectoria.jpeg" alt="Nuestra Trayectoria" loading="lazy">
                </div>
                <h3>Trayectoria</h3>
                <p>Learning Online se adaptó al formato en línea, destacándose en la enseñanza de inglés y certificaciones internacionales para un futuro globalizado.</p>
            </div>
            <div class="timeline-item">
                <div class="timeline-image-container">
                    <img src="img/estudio.png" alt="Grupos de Estudio" loading="lazy">
                </div>
                <h3>Primeros Grupos de Estudio</h3>
                <p>Se establecen los primeros círculos de estudio que consolidan una comunidad sólida.</p>
            </div>
            <div class="timeline-item">
                <div class="timeline-image-container">
                    <img src="img/certificaciones.webp" alt="Certificación" loading="lazy">
                </div>
                <h3>Certificación</h3>
                <p>Learning Online logra aplicar sus primeras certificaciones internacionales.</p>
            </div>
            <div class="timeline-item">
                <div class="timeline-image-container">
                    <img src="img/tv.webp" alt="Programa de TV" loading="lazy">
                </div>
                <h3>Programa de Televisión</h3>
                <p>Reconocimiento profesional en NTV Televisión + en el programa online "Profesionales de alto impacto".</p>
            </div>
        </div>
    </div>
</section>

<!-- Students Section -->
<section class="portfolio-section">
    <div class="container">
        <h2 class="section-title">Nuestro legado de alumnos internacionales</h2>
        <!-- FILTROS SIMPLIFICADOS: Todos, Nivel C1, Nivel B2 -->
        <div class="filters-simple">
            <button class="filter-btn-simple active" data-level="all">Todos</button>
            <button class="filter-btn-simple" data-level="c1">Nivel C1</button>
            <button class="filter-btn-simple" data-level="b2">Nivel B2</button>
        </div>
        
        <div class="portfolio-grid">
            <!-- Estudiante 1 - Angellic Romero (C1) -->
            <div class="portfolio-card" data-level="c1">
                <div class="portfolio-image" style="background-image: url('img/Angellic.webp');">
                    <img src="img/Angellic.webp" alt="Angellic Romero">
                    <div class="portfolio-overlay">
                        <h3>Angellic Romero</h3>
                        <p>Lic. en Comercio Internacional | 2 Doctorados</p>
                    </div>
                </div>
                <div class="portfolio-content">
                    <div class="student-info">
                        <div class="student-icon"><i class="fas fa-user-tie"></i></div>
                        <div class="student-details">
                            <h4>Angellic Romero</h4>
                            <div class="student-level-icon"><i class="fas fa-star"></i> Nivel de Inglés: C1</div>
                            <p><i class="fas fa-building"></i> Validado por: Trinity College London</p>
                        </div>
                    </div>
                    <div class="student-bio">
                        Mi primer viaje internacional fue a los 21 años; Soy Lic. en comercio internacional y ostento dos doctorados. Gracias a Learning Online logré interactuar con diversas culturas en Europa Central y el Caribe...
                    </div>
                    <div class="flags-section">
                        <div class="flags-title">Países Visitados:</div>
                        <div class="flags-container">
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/us.png" alt="USA"><span class="flag-tooltip">EE.UU.</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/ca.png" alt="Canada"><span class="flag-tooltip">Canadá</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/pl.png" alt="Poland"><span class="flag-tooltip">Polonia</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/gr.png" alt="Greece"><span class="flag-tooltip">Grecia</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/pe.png" alt="Peru"><span class="flag-tooltip">Perú</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/de.png" alt="Germany"><span class="flag-tooltip">Alemania</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/fr.png" alt="France"><span class="flag-tooltip">Francia</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/it.png" alt="Italy"><span class="flag-tooltip">Italia</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estudiante 2 - Ana TierraBlanca (B2) -->
            <div class="portfolio-card" data-level="b2">
                <div class="portfolio-image" style="background-image: url('img/Ana.webp');">
                    <img src="img/Ana.webp" alt="Ana TierraBlanca">
                    <div class="portfolio-overlay">
                        <h3>Ana TierraBlanca</h3>
                        <p>Lic. en Ciencias de la Comunicación</p>
                    </div>
                </div>
                <div class="portfolio-content">
                    <div class="student-info">
                        <div class="student-icon"><i class="fas fa-microphone-alt"></i></div>
                        <div class="student-details">
                            <h4>Ana TierraBlanca</h4>
                            <div class="student-level-icon"><i class="fas fa-star"></i> Nivel de Inglés: B2</div>
                            <p><i class="fas fa-building"></i> Validado por: Trinity College London</p>
                        </div>
                    </div>
                    <div class="student-bio">
                        Mi primer viaje internacional fue a los 19 años. Soy Lic. en Ciencias de la Comunicación. Comencé mi internacionalización en Japón, hice un voluntariado en Brasil, trabajé en el área de Turismo...
                    </div>
                    <div class="flags-section">
                        <div class="flags-title">Países Visitados:</div>
                        <div class="flags-container">
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/us.png" alt="USA"><span class="flag-tooltip">EE.UU.</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/ca.png" alt="Canada"><span class="flag-tooltip">Canadá</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/jp.png" alt="Japan"><span class="flag-tooltip">Japón</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/co.png" alt="Colombia"><span class="flag-tooltip">Colombia</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/gt.png" alt="Guatemala"><span class="flag-tooltip">Guatemala</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/pa.png" alt="Panama"><span class="flag-tooltip">Panamá</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/br.png" alt="Brazil"><span class="flag-tooltip">Brasil</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/do.png" alt="Dominican Republic"><span class="flag-tooltip">R. Dominicana</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estudiante 3 - Karla Perez (C1) -->
            <div class="portfolio-card" data-level="c1">
                <div class="portfolio-image" style="background-image: url('img/Karla.webp');">
                    <img src="img/Karla.webp" alt="Karla Perez">
                    <div class="portfolio-overlay">
                        <h3>Karla Perez</h3>
                        <p>Lic. en Negocios Internacionales</p>
                    </div>
                </div>
                <div class="portfolio-content">
                    <div class="student-info">
                        <div class="student-icon"><i class="fas fa-chart-line"></i></div>
                        <div class="student-details">
                            <h4>Karla Perez</h4>
                            <div class="student-level-icon"><i class="fas fa-star"></i> Nivel de Inglés: C1</div>
                            <p><i class="fas fa-building"></i> Validado por: Trinity College London</p>
                        </div>
                    </div>
                    <div class="student-bio">
                        Mi primer viaje internacional fue a los 19 años. Soy Licenciada en Negocios Internacionales. Estudiar inglés mientras estudiaba la preparatoria me permitió trabajar en una empresa internacional de tecnología...
                    </div>
                    <div class="flags-section">
                        <div class="flags-title">Países Visitados:</div>
                        <div class="flags-container">
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/us.png" alt="USA"><span class="flag-tooltip">EE.UU.</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/de.png" alt="Germany"><span class="flag-tooltip">Alemania</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/co.png" alt="Colombia"><span class="flag-tooltip">Colombia</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/br.png" alt="Brazil"><span class="flag-tooltip">Brasil</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/gt.png" alt="Guatemala"><span class="flag-tooltip">Guatemala</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/cl.png" alt="Chile"><span class="flag-tooltip">Chile</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/ch.png" alt="Switzerland"><span class="flag-tooltip">Suiza</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/cz.png" alt="Czech Republic"><span class="flag-tooltip">Rep. Checa</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estudiante 4 - Lourdes Bucio (B2) -->
            <div class="portfolio-card" data-level="b2">
                <div class="portfolio-image" style="background-image: url('img/LOURDES.webp');">
                    <img src="img/LOURDES.webp" alt="Lourdes Bucio">
                    <div class="portfolio-overlay">
                        <h3>Lourdes Bucio</h3>
                        <p>Estudiante de Secundaria</p>
                    </div>
                </div>
                <div class="portfolio-content">
                    <div class="student-info">
                        <div class="student-icon"><i class="fas fa-graduation-cap"></i></div>
                        <div class="student-details">
                            <h4>Lourdes Bucio</h4>
                            <div class="student-level-icon"><i class="fas fa-star"></i> Nivel de Inglés: B2</div>
                            <p><i class="fas fa-building"></i> Validado por: Trinity College London</p>
                        </div>
                    </div>
                    <div class="student-bio">
                        Mi primer viaje internacional fue a los 56 años; soy estudiante de secundaria. He logrado colocarme en un trabajo en Estados Unidos que me permitirá tener un verdadero desarrollo personal y profesional...
                    </div>
                    <div class="flags-section">
                        <div class="flags-title">Países Visitados:</div>
                        <div class="flags-container">
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/us.png" alt="USA"><span class="flag-tooltip">EE.UU.</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estudiante 5 - Estrella Salazar (B2) -->
            <div class="portfolio-card" data-level="b2">
                <div class="portfolio-image" style="background-image: url('img/ESTRELLA.webp');">
                    <img src="img/ESTRELLA.webp" alt="Estrella Salazar">
                    <div class="portfolio-overlay">
                        <h3>Estrella Salazar</h3>
                        <p>Ingeniera en Biotecnología</p>
                    </div>
                </div>
                <div class="portfolio-content">
                    <div class="student-info">
                        <div class="student-icon"><i class="fas fa-flask"></i></div>
                        <div class="student-details">
                            <h4>Estrella Salazar</h4>
                            <div class="student-level-icon"><i class="fas fa-star"></i> Nivel de Inglés: B2</div>
                            <p><i class="fas fa-building"></i> Validado por: Oxford University</p>
                        </div>
                    </div>
                    <div class="student-bio">
                        Mi primer viaje internacional fue a los 15 años mientras estudiaba la Ingeniería en Biotecnología. Estudié inglés británico y americano en Learning Online. Utilizo el idioma para participar en ponencias internacionales...
                    </div>
                    <div class="flags-section">
                        <div class="flags-title">Países Visitados:</div>
                        <div class="flags-container">
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/il.png" alt="Israel"><span class="flag-tooltip">Israel</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estudiante 6 - Guillermo Jesus (B2) -->
            <div class="portfolio-card" data-level="b2">
                <div class="portfolio-image" style="background-image: url('img/Guillermo.webp');">
                    <img src="img/Guillermo.webp" alt="Guillermo Jesus">
                    <div class="portfolio-overlay">
                        <h3>Guillermo Jesus</h3>
                        <p>Técnico en Sistemas de Aviación</p>
                    </div>
                </div>
                <div class="portfolio-content">
                    <div class="student-info">
                        <div class="student-icon"><i class="fas fa-plane"></i></div>
                        <div class="student-details">
                            <h4>Guillermo Jesus</h4>
                            <div class="student-level-icon"><i class="fas fa-star"></i> Nivel de Inglés: B2</div>
                            <p><i class="fas fa-building"></i> Validado por: Trinity College London</p>
                        </div>
                    </div>
                    <div class="student-bio">
                        Mi primer viaje internacional fue en enero del 2024. Soy Profesional Técnico en Sistemas Electrónicos de Aviación. En Learning Online aprendí a comunicarme perfectamente hasta lograr certificarme internacionalmente...
                    </div>
                    <div class="flags-section">
                        <div class="flags-title">Países Visitados:</div>
                        <div class="flags-container">
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/us.png" alt="USA"><span class="flag-tooltip">EE.UU.</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/do.png" alt="Dominican Republic"><span class="flag-tooltip">R. Dominicana</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estudiante 7 - Laura Romero (B2) -->
            <div class="portfolio-card" data-level="b2">
                <div class="portfolio-image" style="background-image: url('img/Laura.webp');">
                    <img src="img/Laura.webp" alt="Laura Romero">
                    <div class="portfolio-overlay">
                        <h3>Laura Romero</h3>
                        <p>Estudiante de Piloto Comercial</p>
                    </div>
                </div>
                <div class="portfolio-content">
                    <div class="student-info">
                        <div class="student-icon"><i class="fas fa-plane-departure"></i></div>
                        <div class="student-details">
                            <h4>Laura Romero</h4>
                            <div class="student-level-icon"><i class="fas fa-star"></i> Nivel de Inglés: B2</div>
                            <p><i class="fas fa-building"></i> Validado por: Oxford University</p>
                        </div>
                    </div>
                    <div class="student-bio">
                        Mi primer viaje internacional fue a los 15 años y actualmente estoy estudiando para ser piloto comercial. Mejoro mi inglés en Learning Online, lo cual es necesario para mi carrera...
                    </div>
                    <div class="flags-section">
                        <div class="flags-title">Países Visitados:</div>
                        <div class="flags-container">
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/us.png" alt="USA"><span class="flag-tooltip">EE.UU.</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/ca.png" alt="Canada"><span class="flag-tooltip">Canadá</span></div>
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/cu.png" alt="Cuba"><span class="flag-tooltip">Cuba</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estudiante 8 - Stephanie Tapia (B2) -->
            <div class="portfolio-card" data-level="b2">
                <div class="portfolio-image" style="background-image: url('img/STEPHANIE.webp');">
                    <img src="img/STEPHANIE.webp" alt="Stephanie Tapia">
                    <div class="portfolio-overlay">
                        <h3>Stephanie Tapia</h3>
                        <p>Lic. en Innovación de Negocios</p>
                    </div>
                </div>
                <div class="portfolio-content">
                    <div class="student-info">
                        <div class="student-icon"><i class="fas fa-briefcase"></i></div>
                        <div class="student-details">
                            <h4>Stephanie Tapia</h4>
                            <div class="student-level-icon"><i class="fas fa-star"></i> Nivel de Inglés: B2</div>
                            <p><i class="fas fa-building"></i> Validado por: Oxford University</p>
                        </div>
                    </div>
                    <div class="student-bio">
                        Mi primer viaje internacional fue a Canadá. Soy Licenciada en Innovación de Negocios. Agradezco a Learning Online por sus increíbles enseñanzas en el idioma inglés...
                    </div>
                    <div class="flags-section">
                        <div class="flags-title">Países Visitados:</div>
                        <div class="flags-container">
                            <div class="flag-wrapper"><img src="https://flagcdn.com/w40/ca.png" alt="Canada"><span class="flag-tooltip">Canadá</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="location-section" id="ubicacion">
    <div class="container">
        <div class="row">
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
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row g-4">
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
                    <h4>Síguenos</h4>
                    <div class="social-buttons-grid">
                        <a href="https://www.facebook.com/profile.php?id=61555920905204&locale=es_LA" class="social-btn btn-fb" data-tooltip="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/x_learningonline?utm_source=qr&igsh=MTJiZ3J1bHp6eXNtcQ==" class="social-btn btn-ig" data-tooltip="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.tiktok.com/@x_learningonline?_r=1&_t=ZS-91D2tTprHo0" class="social-btn btn-tt" data-tooltip="TikTok" target="_blank"><i class="fab fa-tiktok"></i></a>
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // FILTROS SIMPLIFICADOS
        const filterButtons = document.querySelectorAll('.filter-btn-simple');
        const portfolioCards = document.querySelectorAll('.portfolio-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remover clase active de todos los botones
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Agregar clase active al botón clickeado
                this.classList.add('active');
                
                const filterValue = this.getAttribute('data-level');
                
                // Filtrar tarjetas
                portfolioCards.forEach(card => {
                    if (filterValue === 'all') {
                        card.style.display = 'flex';
                    } else {
                        const cardLevel = card.getAttribute('data-level');
                        if (cardLevel === filterValue) {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                });
            });
        });

        // Menú móvil
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.getElementById('navbarNav');
        
        if (navbarToggler && navbarCollapse) {
            document.querySelectorAll('.nav-link:not(.dropdown-toggle)').forEach(link => {
                link.addEventListener('click', () => {
                    if (navbarCollapse.classList.contains('show')) {
                        navbarToggler.click();
                    }
                });
            });
        }
    });
</script>

<!-- Incluir chatbot si existe -->
<?php if (file_exists('includes/chatBot.php')): ?>
    <?php include 'includes/chatBot.php'; ?>
<?php endif; ?>
</body>
</html>