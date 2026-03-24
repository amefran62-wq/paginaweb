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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>Learning Online - Nuestros Cursos</title>
 <!-- BOOTSTRAP 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Importación de Fuentes: Hatton y Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hatton:wght@400;600;700&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            --dark-mint: #029e99;
            --gris: #616160;
            --medium-gray: #a0a0a0;
            --obscuro: #b4b4b4;
            --black: #000000;
            --border-radius: 20px;
            --transition: all 0.3s ease;
            --heading-font: 'Hatton', serif;
            --body-font: 'Montserrat', sans-serif;
            --cream: #f5f1e8;
            --light-gray: #e0e0e0;
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
            line-height: 1.4;
            font-family: 'Montserrat', sans-serif;
            padding-top: 80px; 
            overflow-x: hidden;
            width: 100%;
        }
        
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

        /* --- HERO SECTION (Mejorado) --- */
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
        
        .hero h1 {
            font-size: 45px;
            margin-bottom: 20px;
            color: var(--black);
            font-family: 'Hatton', serif;
            text-shadow: 0 4px 12px rgba(0,0,0,0.2);
            line-height: 1.2;
        }
        
        .hero p {
            font-size: 40px;
            max-width: 800px;
            margin: 0 auto;
            color: var(--black);
            opacity: 0.95;
            line-height: 1.6;
        }

        @media (max-width: 992px) {
            .hero { padding: 80px 0 70px; }
            .hero h1 { font-size: 46px; }
            .hero p { font-size: 30px; }
        }

        @media (max-width: 768px) {
            .hero { padding: 70px 0 60px; }
            .hero h1 { font-size: 38px; }
            .hero p { font-size: 17px; }
        }

        @media (max-width: 576px) {
            .hero { padding: 60px 0 50px; }
            .hero h1 { font-size: 32px; }
            .hero p { font-size: 16px; }
        }

        /* --- COURSES SECTION (Mejorado) --- */
        .courses-section {
            padding: 90px 0;
            background-color: var(--cream);
        }
        
        .container {
            max-width: 1400px;
            padding: 0 25px;
            margin: 0 auto;
            width: 100%;
        }
        
        .section-title {
            text-align: center;
            font-size: 40px;
            color: var(--black);
            margin-bottom: 20px;
            font-family: 'Hatton', serif;
            position: relative;
            padding-bottom: 25px;
            line-height: 1.2;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-blue), var(--dark-mint));
            border-radius: 3px;
        }
        
        .section-subtitle {
            text-align: center;
            color: var(--gris);
            font-size: 18px;
            max-width: 800px;
            margin: 0 auto 60px;
            line-height: 1.6;
        }

        @media (max-width: 992px) {
            .section-title { font-size: 42px; }
            .section-subtitle { font-size: 17px; }
        }

        @media (max-width: 768px) {
            .section-title { font-size: 40px; }
            .section-subtitle { font-size: 16px; margin-bottom: 40px; }
        }

        @media (max-width: 576px) {
            .section-title { font-size: 30px; }
            .section-subtitle { font-size: 15px; }
        }
        
        /* --- TARJETAS MEJORADAS CON TÍTULOS MÁS GRANDES --- */
        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 35px;
            margin-top: 30px;
        }
        
        @media (max-width: 400px) {
            .cards-container {
                grid-template-columns: 1fr;
                gap: 25px;
            }
        }
        
        .course-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(89, 210, 236, 0.1);
        }
        
        .course-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 30px 50px rgba(89, 210, 236, 0.2);
            border-color: var(--primary-blue);
        }
        
        .course-image {
            height: 250px;
            overflow: hidden;
            background-color: var(--light-gray);
            position: relative;
        }
        
        @media (max-width: 768px) {
            .course-image {
                height: 220px;
            }
        }
        
        @media (max-width: 576px) {
            .course-image {
                height: 200px;
            }
        }
        
        .course-image {
            height: auto;
        }
        
        .course-image img {
            width: 100%;
            height: auto;
            object-fit: contain;
        }
        
        .course-card:hover .course-image img {
            transform: scale(1.1);
        }
        
        .course-category {
            position: absolute;
            top: 20px;
            left: 20px;
            background: linear-gradient(135deg, #c6cbe05d 0%, #000000 50%, #2F5177 100%);
            color: white;
            padding: 10px 22px;
            border-radius: 40px;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 0.5px;
            box-shadow: 0 6px 15px rgba(2, 158, 153, 0.3);
            z-index: 2;
        }
        
        .course-info {
            padding: 30px 25px 35px;
            flex: 1;
            display: flex;
            flex-direction: column;
            text-align: center;
            justify-content: space-between;
        }
        
        .course-title {
            font-size: 32px;
            color: var(--dark-blue);
            font-family: 'Hatton', serif;
            margin-bottom: 23px;
            line-height: 1.3;
            font-weight: 700;
        }
        
        @media (max-width: 992px) {
            .course-title { font-size: 28px; }
        }
        
        @media (max-width: 768px) {
            .course-title { font-size: 26px; }
        }
        
        @media (max-width: 576px) {
            .course-title { font-size: 24px; }
            .course-info { padding: 25px 20px 30px; }
        }
        
        .info-btn {
            background: linear-gradient(135deg, #c6cbe05d 0%, #327db3 50%, #2F5177 100%);
            color: white;
            border: none;
            padding: 16px 30px;
            border-radius: 50px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 8px 20px rgba(89, 145, 236, 0.3);
            width: 100%;
            max-width: 220px;
            text-align: center;
            margin: 0 auto;
            letter-spacing: 0.5px;
        }
        
        .info-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 11px 25px rgba(89, 158, 236, 0.4);
            color: white;
            background: linear-gradient(135deg, #c6cbe05d 0%, #327db3 50%, #2F5177 100%);
        }

        @media (max-width: 576px) {
            .info-btn {
                padding: 10px 25px;
                font-size: 12px;
                max-width: 200px;
            }
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
        
        .contact-item span, 
        .contact-item h4 { 
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

        .wa-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1050;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .wa-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #25D366, #128C7E);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
            transition: all 0.3s ease;
        }
        
        .wa-icon i { 
            color: white; 
            font-size: 32px; 
        }
        
        .wa-button:hover .wa-icon {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
        }
        
        footer {
            background: #ffffff;
            color: var(--black);
            padding: 50px 0 20px;
            border-top: 1px solid #eee;
        }
        
        .footer-section h4 {
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: var(--black);
            font-family: 'Hatton', serif;
        }
        
        .footer-section p {
            font-size: 0.95rem;
            margin-bottom: 12px;
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
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        
        .footer-links a:hover {
            color: var(--primary-blue);
            padding-left: 5px;
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(89, 210, 236, 0.2);
            color: var(--black);
            font-size: 0.9rem;
            margin-top: 30px;
        }
        
        .social-buttons-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            max-width: 300px;
            margin: 0 auto;
        }
        
        .social-btn {
            position: relative;
            width: 100%;
            padding-bottom: 100%;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .social-btn i {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.6rem;
        }
        
        .social-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.25);
        }
        
        .btn-fb { background: linear-gradient(135deg, #1877F2, #105bb5); }
        .btn-ig { background: linear-gradient(45deg, #f09433, #dc2743); }
        .btn-tt { background: linear-gradient(135deg, #000000, #25F4EE); }
        .btn-yt { background: linear-gradient(135deg, #FF0000, #cc0000); }
        .btn-li { background: linear-gradient(135deg, #0A66C2, #004182); }
        .btn-wa { background: linear-gradient(135deg, #25D366, #128C7E); }
        
        .location-section {
            padding: 30px 0 !important;
            background: linear-gradient(135deg, #f5f5f5 0%, #e3f2fd 50%, #2F5177 100%);
            color: #000000;
        }

        /* Utilidades responsivas */
        .text-center-mobile {
            text-align: center;
        }

        @media (max-width: 768px) {
            .text-md-left {
                text-align: left;
            }
            .text-md-center {
                text-align: center;
            }
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* Ajustes de contenedor para móviles */
        @media (max-width: 576px) {
            .container {
                padding: 0 20px;
            }
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

<!-- Header con Navbar y efectos neón -->
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
<div class="container">
<a class="navbar-brand" href="index.php"><img src="img/logo.png" class="img-fluid" alt="Logo"></a>
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
<li><a class="dropdown-item py-2" href="#"><i class="fas fa-book me-2 text-success"></i>Mis Immerse Hub</a></li>
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

    <!-- Hero -->
    <section class="hero">
        <div class="container hero-content">
            <h1>Immerse Hub</h1>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="courses-section">
        <div class="container">
            <h2 class="section-title">Explora Nuestros Programas</h2>
            
            <div class="cards-container">
                <!-- Card 1 - Inglés grupal -->
                <div class="course-card">
                    <div class="course-image">
                        <img src="img/personalizado.png" alt="Curso de Inglés gripal">
                    </div>
                    <div class="course-info">
                        <h3 class="course-title">Social Hub (SH)</h3>
                        <a href="inglesgrupal.php" class="info-btn">Más info</a>
                    </div>
                </div>
                
                <!-- Card 2 - Inglés personalizado -->
                <div class="course-card">
                    <div class="course-image">
                        <img src="img/grupal.png" alt="Curso personalizado">
                    </div>
                    <div class="course-info">
                        <h3 class="course-title">Private Hub (PH)</h3>
                        <a href="inglespersonalizado.php" class="info-btn">Más info</a>
                    </div>
                </div>
                
                <!-- Card 3 - Francés Súper Intensivo Para Adultos -->
                <div class="course-card">
                    <div class="course-image">
                        <img src="img/frances.png" alt="Curso de Francés">
                    </div>
                    <div class="course-info">
                        <h3 class="course-title">Francés Grupal</h3>
                        <a href="frances.php" class="info-btn">Más info</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ubicación y Contacto - ACTUALIZADO con nuevo número -->
    <section class="location-section" id="ubicacion">
        <div class="container location-container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-12">
                    <div class="location-info">
                        <h2>Ubicación y Contacto</h2>

                        <div class="contact-info">
                            <div class="contact-item">
                                <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="contact-text">
                                    <h4>Dirección</h4>
                                    <span>AV. CAYUCO 12, ZIBATÁ, QRO.</span>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon"><i class="fas fa-phone"></i></div>
                                <div class="contact-text">
                                    <h4>Teléfono</h4>
                                    <span>+52 55-3567-8120</span>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                                <div class="contact-text">
                                    <h4>Email</h4>
                                    <span>info@expresslearningonline.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="location-image">
                        <a href="https://www.google.com/maps?ll=20.683713,-100.341161&z=15&t=m&hl=es-ES&gl=US&mapclient=embed&cid=17444010535249429871" target="_blank">
                            <img src="img/imagen de zibata.jpeg" alt="Vista de Querétaro">
                        </a>
                        <div class="location-overlay">
                            <h3>Zibata, Querétaro</h3>
                            <p>México</p>
                            <a href="https://www.google.com/maps?ll=20.683713,-100.341161&z=15&t=m&hl=es-ES&gl=US&mapclient=embed&cid=17444010535249429871" target="_blank" class="btn-map">
                                <i class="fas fa-map-marker-alt"></i> Ver en Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <footer>
<div class="container"><div class="row g-4">
<div class="col-lg-3 col-md-12"><div class="footer-section"><h4>X-Learning Online</h4>
<p>Aprende idiomas efectivamente desde cualquier lugar con programas innovadores.</p></div></div>
<div class="col-lg-4 col-md-12"><div class="footer-section"><h4>Nuestra esencia</h4><div class="row g-3">
<div class="col-md-6"><div style="background: var(--white); padding: 18px; border-radius: 10px; border-left: 3px solid var(--primary-blue);"><h5 style="font-size: 1.05rem; color: var(--dark-blue); margin-bottom: 6px;"><i class="fas fa-bullseye"></i> Misión</h5><p style="font-size: 0.9rem; margin: 0;">Potenciar el aprendizaje con ambientes virtuales inmersivos.</p></div></div>
<div class="col-md-6"><div style="background: var(--white); padding: 18px; border-radius: 10px; border-left: 3px solid var(--primary-blue);"><h5 style="font-size: 1.05rem; color: var(--dark-blue); margin-bottom: 6px;"><i class="fas fa-eye"></i> Visión</h5><p style="font-size: 0.9rem; margin: 0;">Líderes en enseñanza de idiomas en línea.</p></div></div>
</div></div></div>
<div class="col-lg-2 col-md-6"><div class="footer-section"><h4>Enlaces</h4>
<ul class="footer-links"><li><a href="index.php">Inicio</a></li><li><a href="nuestroscursos.php">Immerse Hub</a></li>
<li><a href="CENNI.php">Certificaciones</a></li><li><a href="servicios.php">Servicios</a></li>
<li><a href="canjeregalo.php">Regalos</a>
<li><a href="blog.php">Trayectoria</a>
<li><a href="registro.php">Registro</a>
</li></ul></div></div>
<div class="col-lg-3 col-md-6"><div class="footer-section"><h4 style="text-align: center;">Síguenos</h4><div class="social-buttons-grid">
<a href="https://www.facebook.com/profile.php?id=61555920905204" class="social-btn btn-fb" target="_blank"><i class="fab fa-facebook-f"></i></a>
<a href="https://www.instagram.com/x_learningonline" class="social-btn btn-ig" target="_blank"><i class="fab fa-instagram"></i></a>
<a href="https://www.tiktok.com/@x_learningonline" class="social-btn btn-tt" target="_blank"><i class="fab fa-tiktok"></i></a>
<a href="https://www.youtube.com/@XLearningOnline" class="social-btn btn-yt" target="_blank"><i class="fab fa-youtube"></i></a>
<a href="https://www.elon.school/index.html" class="social-btn btn-li" target="_blank"><i class="fab fa-linkedin-in"></i></a>
<a href="https://whatsapp.com/channel/0029Vb5zjsB4SpkKKjmsh90u" class="social-btn btn-wa" target="_blank"><i class="fab fa-whatsapp"></i></a>
</div></div></div>
</div><div class="copyright"><p>&copy; 2024 X-Learning Online. Todos los derechos reservados.</p></div></div>
</footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // --- LÓGICA DEL MENÚ MÓVIL (RESPONSIVO) ---
        const navLinks = document.querySelectorAll('.nav-link:not(.dropdown-toggle)');
        const menuToggle = document.getElementById('navbarNav');
        
        if(menuToggle){
            const bsCollapse = new bootstrap.Collapse(menuToggle, {toggle:false});
            
            navLinks.forEach((link) => {
                link.addEventListener('click', () => {
                    // Solo cerrar si el menú está abierto en móvil
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
                    if (toggle && !toggle.classList.contains('show')) toggle.click();
                });
                dropdown.addEventListener('mouseleave', function() {
                    const toggle = this.querySelector('.dropdown-toggle');
                    if (toggle && toggle.classList.contains('show')) toggle.click();
                });
            });
        }

        // Cerrar dropdowns al hacer clic fuera
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                    menu.classList.remove('show');
                });
            }
        });
    </script>
    <!-- ===== CHATBOT ===== -->
<?php include 'includes/chatBot.php'; ?>
</body>
</html>