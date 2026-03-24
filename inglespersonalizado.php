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
    <title>Inglés Personalizado</title>
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
            --dark-mint:#1a3a5f;
            --gris: #616160;
            --medium-gray: #a0a0a0;
            --obscuro: #b4b4b4;
            --black: #000000;
            --border-radius: 16px;
            --transition: all 0.3s ease;
            --heading-font: 'Hatton', serif;
            --body-font: 'Montserrat', sans-serif;

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
            color: #000000;;
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
            color: #000000;;
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
.footer-links { list-style: none; padding: 0; }
.footer-links li { margin-bottom: 8px; }
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

.btn-wa {
background: linear-gradient(135deg, #25D366, #128C7E);
animation-delay: 0.6s;
}
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
transition: all 0.3s ease;
}
.wa-tooltip {
position: absolute;
right: 75px;
background-color: var(--dark-blue);
color: #fff;
padding: 8px 15px;
border-radius: 8px;
font-size: 14px;
white-space: nowrap;
opacity: 0;
visibility: hidden;
transition: all 0.3s ease;
transform: translateX(10px);
box-shadow: 0 4px 12px rgba(0,0,0,0.2);
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
border-left: 6px solid var(--dark-blue);
}
.wa-button:hover .wa-icon {
transform: scale(1.15) rotate(5deg);
background: linear-gradient(135deg, #128C7E, #075E54);
box-shadow: 0 8px 30px rgba(37, 211, 102, 0.6);
}
.wa-button:hover .wa-icon i {
transform: scale(1.1);
}
.wa-button:hover .wa-tooltip {
opacity: 1;
visibility: visible;
transform: translateX(0);
}
.wa-message { flex-direction: column; gap: 4px; }
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
        }
        
        img {
            max-width: 100%;
            height: auto;
            display: block;
        }
    </style>
</head>
<body>
    
    <!-- Botón de WhatsApp Flotante -->
    <a href="https://wa.me/525535678120" class="wa-button" target="_blank" aria-label="Contactar por WhatsApp">
        <span class="wa-tooltip">¡Escríbenos!</span>
        <div class="wa-icon">
            <i class="fab fa-whatsapp"></i>
        </div>
    </a>

   <body id="index.php">
<!-- Mensaje de logout -->
<?php if (isset($_GET['logged_out'])): ?>
<div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-5" style="z-index: 9999; min-width: 300px;">
<i class="fas fa-check-circle"></i> Sesión cerrada correctamente.
<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

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
<!-- Menú de usuario con efectos neón -->
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

    <!-- Sección Hero -->
    <section class="hero">
        <div class="container">
            <h1>Private Hub (PH)</h1>
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
                        <div class="price-tag">$3,500</div>
                        <p class="info-text">cada 6 semanas</p>
                        
                        <div class="info-item">
                            <span class="info-label">Modalidad híbrida:</span>
                            <p class="info-text">Combina sesiones grupales con 5 sesiones personalizadas por módulo</p>
                        </div>
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
                            <span class="info-label">Disponibilidad:</span>
                            <p class="info-text">Toda la semana (lunes a domingo)</p>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Horario:</span>
                            <p class="info-text">De 5:00 am a 9:00 pm</p>
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
                            <li>Interacción grupal</li>
                            <li>Atención personalizada</li>
                        </ul>
                        
                        <div class="highlight-text">
                            <span class="info-label">Vínculos:</span>
                            <p class="info-text mt-2">Práctica con diversos perfiles (estudiantes, maestros y extranjeros)</p>
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
                            <li>Ejercicios prácticos</li>
                            <li>Retroalimentación personalizada</li>
                            <li>Repaso de los temas vistos</li>
                            <li>Tecnología educativa y de vanguardia</li>
                            <li>Inglés británico y americano</li>
                            <li>100% en línea</li>
                            <li>Habla inglés desde tu primera clase</li>
                            <li>Certificados nacionales e internacionales</li>
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
    
    <!-- Scripts -->
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
                    if (toggle && !toggle.classList.contains('show')) toggle.click();
                });
                dropdown.addEventListener('mouseleave', function() {
                    const toggle = this.querySelector('.dropdown-toggle');
                    if (toggle && toggle.classList.contains('show')) toggle.click();
                });
            });
        }
    </script>
    <!-- ===== CHATBOT ===== -->
    <?php include 'includes/chatBot.php'; ?>
</body>
</html>