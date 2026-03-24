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
<title>Oxford Placement Test (OPT) - X-Learning Online</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Hatton:wght@400;600;700&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
/* ================= VARIABLES (DEL INDEX) ================= */
:root {
--primary-blue: #59d2ec;
--light-blue: #8fe1f2;
--lighter-blue: #d4f2f9;
--dark-blue: #1a3a5f;
--text-dark: #0d1b2a;
--text-light: #1a3a5f;
--white: #ffffff;
--snow: #f8f9fa;
--gris: #616160;
--medium-gray: #a0a0a0;
--black: #000000;
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

/* ================= RESET ================= */
* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

html, body {
overflow-x: hidden;
width: 100%;
}

body {
background-color: var(--white);
color: var(--text-dark);
line-height: 1.6;
font-family: 'Montserrat', sans-serif;
padding-top: 70px;
position: relative;
}

h1, h2, h3, h4, h5, h6 {
font-family: var(--heading-font);
font-weight: 700;
line-height: 1.2;
}

/* ================= HEADER CON EFECTOS NEÓN ================= */
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

/* ================= HERO SECTION (COMPACTO) ================= */
.opt-hero {
padding: 50px 0 30px;
background: linear-gradient(135deg, var(--lighter-blue) 0%, var(--white) 100%);
position: relative;
overflow: hidden;
}

.opt-hero::before {
content: '';
position: absolute;
width: 200px;
height: 200px;
background: rgba(89, 210, 236, 0.1);
border-radius: 50%;
top: -50px;
right: -50px;
}

.opt-hero::after {
content: '';
position: absolute;
width: 150px;
height: 150px;
background: rgba(26, 58, 95, 0.05);
border-radius: 50%;
bottom: -30px;
left: -30px;
}

.hero-title {
font-size: 2.2rem;
color: var(--dark-blue);
margin-bottom: 12px;
text-align: center;
}

@media (max-width: 768px) {
.hero-title {
font-size: 1.8rem;
}
}

@media (max-width: 576px) {
.hero-title {
font-size: 1.5rem;
}
}

.hero-subtitle {
font-size: 1rem;
color: var(--text-light);
text-align: center;
max-width: 700px;
margin: 0 auto 25px;
line-height: 1.6;
}

/* ================= ANIMACIONES (CENNI.php) ================= */
@keyframes fadeInUp {
from { opacity: 0; transform: translateY(30px); }
to { opacity: 1; transform: translateY(0); }
}

@keyframes float {
0%, 100% { transform: translateY(0); }
50% { transform: translateY(-15px); }
}

@keyframes pulse {
0% { transform: scale(1); }
50% { transform: scale(1.05); }
100% { transform: scale(1); }
}

@keyframes slideInLeft {
from { opacity: 0; transform: translateX(-50px); }
to { opacity: 1; transform: translateX(0); }
}

@keyframes slideInRight {
from { opacity: 0; transform: translateX(50px); }
to { opacity: 1; transform: translateX(0); }
}

.animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
.animate-float { animation: float 4s ease-in-out infinite; }
.animate-pulse { animation: pulse 2s ease-in-out infinite; }
.animate-slide-left { animation: slideInLeft 0.8s ease-out forwards; }
.animate-slide-right { animation: slideInRight 0.8s ease-out forwards; }

/* ================= MAIN CONTENT (COMPACTO) ================= */
.main-content {
padding: 40px 0;
}

.section-title {
font-size: 1.8rem;
color: var(--dark-blue);
margin-bottom: 20px;
text-align: center;
}

@media (max-width: 768px) {
.section-title {
font-size: 1.5rem;
}
}

.info-section {
background: var(--snow);
border-radius: var(--border-radius);
padding: 25px;
margin-bottom: 30px;
box-shadow: 0 10px 30px rgba(89, 210, 236, 0.1);
border: 1px solid rgba(89, 210, 236, 0.2);
}

.info-text {
font-size: 0.95rem;
line-height: 1.7;
color: var(--text-dark);
margin-bottom: 15px;
}

/* ================= CARACTERÍSTICAS GRID ================= */
.features-grid {
display: grid;
grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
gap: 20px;
margin-top: 25px;
}

.feature-card {
background: var(--white);
border-radius: var(--border-radius);
padding: 20px;
box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
transition: var(--transition);
height: 100%;
position: relative;
overflow: hidden;
}

.feature-card::before {
content: '';
position: absolute;
top: 0;
left: 0;
width: 6px;
height: 100%;
background: var(--primary-blue);
}

.feature-card:hover {
transform: translateY(-5px);
box-shadow: 0 15px 30px rgba(89, 210, 236, 0.2);
}

.feature-icon {
font-size: 1.8rem;
color: var(--primary-blue);
margin-bottom: 12px;
}

.feature-title {
font-size: 1.1rem;
color: var(--dark-blue);
margin-bottom: 8px;
font-family: var(--heading-font);
}

.feature-desc {
font-size: 0.9rem;
color: var(--text-dark);
line-height: 1.5;
}

/* ================= ALERTA IMPORTANTE ================= */
.alert-section {
background: linear-gradient(135deg, #fff9e6 0%, #fff0cc 100%);
border-left: 6px solid #ff9900;
border-radius: var(--border-radius);
padding: 20px;
margin: 30px 0;
position: relative;
overflow: hidden;
}

.alert-section::before {
content: '\f071';
font-family: 'Font Awesome 6 Free';
font-weight: 900;
position: absolute;
top: 10px;
right: 10px;
font-size: 3rem;
color: rgba(255, 153, 0, 0.1);
z-index: 0;
}

.alert-icon {
font-size: 1.8rem;
color: #000000;
margin-bottom: 10px;
}

.alert-title {
font-size: 1.3rem;
color: #000000;
margin-bottom: 8px;
font-family: var(--heading-font);
}

.alert-text {
font-size: 1rem;
color: #000000;
line-height: 1.6;
position: relative;
z-index: 1;
}

/* ================= VENTAJAS SECTION ================= */
.ventajas-section {
background: linear-gradient(135deg, var(--lighter-blue) 0%, var(--white) 100%);
padding: 40px 0;
border-radius: var(--border-radius);
margin-top: 30px;
}

.ventajas-grid {
display: grid;
grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
gap: 20px;
margin-top: 25px;
}

.ventaja-card {
background: var(--white);
border-radius: var(--border-radius);
padding: 20px;
box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
transition: var(--transition);
height: 100%;
position: relative;
overflow: hidden;
}

.ventaja-card::before {
content: '';
position: absolute;
top: 0;
left: 0;
width: 6px;
height: 100%;
background: var(--primary-blue);
}

.ventaja-card:hover {
transform: translateY(-5px);
box-shadow: 0 15px 30px rgba(89, 210, 236, 0.2);
}

.ventaja-icon {
font-size: 1.8rem;
color: var(--primary-blue);
margin-bottom: 12px;
}

.ventaja-title {
font-size: 1.1rem;
color: var(--dark-blue);
margin-bottom: 8px;
font-family: var(--heading-font);
}

.ventaja-desc {
font-size: 0.9rem;
color: var(--text-dark);
line-height: 1.5;
}

/* ================= LOCATION SECTION (DEL INDEX) ================= */
.location-section {
padding: 30px 0 !important;
background: linear-gradient(135deg, #f5f5f5 0%, #e3f2fd 50%, #2F5177 100%);
color: #000000;
}

.location-info h2 {
font-size: 1.6rem;
font-family: 'Hatton', serif;
margin-bottom: 10px;
color: var(--black);
}

.location-info p {
font-size: 1rem;
line-height: 1.4;
margin-bottom: 12px;
color: var(--black);
}

.contact-info {
display: flex;
flex-direction: column;
gap: 8px;
}

.contact-item {
display: flex;
align-items: center;
gap: 10px;
background: rgba(160, 160, 160, 0.6);
padding: 10px;
border-radius: 8px;
}

.contact-item span {
font-size: 0.95rem;
}

.contact-icon {
width: 32px;
height: 32px;
background: var(--gris);
border-radius: 50%;
display: flex;
align-items: center;
justify-content: center;
font-size: 0.9rem;
color: var(--snow);
flex-shrink: 0;
}

.location-image {
position: relative;
border-radius: 12px;
overflow: hidden;
height: 250px;
box-shadow: 0 10px 25px #0d1b2a;
margin-top: 15px;
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
}

.location-overlay {
position: absolute;
bottom: 0;
left: 0;
right: 0;
background: rgba(47, 81, 119, 0.85);
padding: 12px;
font-size: 0.9rem;
color: #ffffff;
}

.location-overlay h3 {
font-family: 'Hatton', serif;
font-size: 1.1rem;
margin: 0;
}

.btn-map {
display: inline-flex;
align-items: center;
gap: 5px;
padding: 6px 14px;
background: var(--dark-blue);
color: var(--lighter-blue);
border-radius: 20px;
font-size: 0.85rem;
font-weight: 600;
text-decoration: none;
margin-top: 6px;
transition: background 0.3s ease;
}

.btn-map:hover {
background: white;
color: var(--black);
}

/* ================= FOOTER (DEL INDEX) ================= */
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

/* ================= SOCIAL BUTTONS (DEL INDEX) ================= */
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

/* ================= WHATSAPP BUTTON (DEL INDEX) ================= */
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

/* ================= RESPONSIVE ================= */
@media (max-width: 991.98px) {
.footer-container { text-align: center; }
.social-buttons-grid { margin: 0 auto 15px; }
}

@media (max-width: 768px) {
.section-title { font-size: 1.5rem; }
.info-section { padding: 20px 15px; }
.alert-section { padding: 18px 15px; }
.feature-card { padding: 18px; }
.ventaja-card { padding: 18px; }
}

@media (max-width: 576px) {
.hero-title { font-size: 1.5rem; }
.hero-subtitle { font-size: 0.9rem; }
.section-title { font-size: 1.4rem; }
.features-grid { grid-template-columns: 1fr; }
.ventajas-grid { grid-template-columns: 1fr; }
}

img { max-width: 100%; height: auto; display: block; }
</style>
</head>
<body>
<!-- Botón de WhatsApp Flotante -->
<a href="https://wa.me/525535678120" class="wa-button" target="_blank">
<div class="wa-icon"><i class="fab fa-whatsapp"></i></div>
</a>

<!-- Header con Navbar y efectos neón -->
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
<li class="nav-item"><a class="nav-link" href="nuestroscursos.php">Immerse Hub</a></li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle active" href="#" data-bs-toggle="dropdown">Certificaciones</a>
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
<li class="px-3 py-2 border-bottom">
<small class="text-muted">Rol:</small>
<div class="fw-bold text-capitalize"><?php echo $rol_usuario; ?></div>
</li>
<li><a class="dropdown-item py-2" href="registro.php"><i class="fas fa-user me-2 text-primary"></i>Mi perfil</a></li>
<li><a class="dropdown-item py-2" href="#"><i class="fas fa-book me-2 text-success"></i>Mis cursos</a></li>
<?php if ($rol_usuario === 'admin'): ?>
<li><hr class="dropdown-divider"></li>
<li><a class="dropdown-item py-2" href="admin/dashboard.php"><i class="fas fa-cog me-2 text-warning"></i>Panel admin</a></li>
<?php endif; ?>
<li><hr class="dropdown-divider"></li>
<li><a class="dropdown-item py-2 text-danger" href="logout.php" onclick="return confirm('¿Cerrar sesión?')"><i class="fas fa-sign-out-alt me-2"></i>Cerrar sesión</a></li>
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
<section class="opt-hero">
<div class="container">
<h1 class="hero-title animate-fade-in-up">Oxford Placement Test (OPT)</h1>
<p class="hero-subtitle animate-fade-in-up" style="animation-delay: 0.2s;">
Evaluación precisa y adaptativa para determinar tu nivel de inglés desarrollada por Oxford University
</p>
</div>
</section>

<!-- Main Content -->
<main class="main-content">
<div class="container">
<!-- Sección ¿Qué es el OPT? -->
<section class="info-section animate-slide-left">
<h2 class="section-title">¿Qué es el Oxford Placement Test?</h2>
<div class="info-text">
<p>
El Oxford Placement Test (OPT) es un examen desarrollado y evaluado por Oxford University, diseñado específicamente para determinar con precisión el nivel actual de inglés de cada candidato. Esta herramienta de evaluación es ideal tanto para instituciones educativas como para individuos que desean conocer su nivel exacto dentro del Marco Común Europeo de Referencia (MCER).
</p>
<p class="mt-3">
El OPT es reconocido internacionalmente por su precisión y adaptabilidad, proporcionando resultados confiables que permiten ubicar a los estudiantes en el nivel adecuado para sus estudios o desarrollo profesional en el idioma inglés.
</p>
</div>

<!-- Características -->
<div class="features-grid">
<div class="feature-card animate-fade-in-up" style="animation-delay: 0.1s;">
<div class="feature-icon"><i class="fas fa-desktop"></i></div>
<h3 class="feature-title">Aplicación 100% en línea</h3>
<p class="feature-desc">Realiza el examen desde cualquier lugar con conexión a internet.</p>
</div>
<div class="feature-card animate-fade-in-up" style="animation-delay: 0.2s;">
<div class="feature-icon"><i class="fas fa-bolt"></i></div>
<h3 class="feature-title">Rápido y adaptativo</h3>
<p class="feature-desc">Tecnología que ajusta la dificultad según tus respuestas.</p>
</div>
<div class="feature-card animate-fade-in-up" style="animation-delay: 0.3s;">
<div class="feature-icon"><i class="fas fa-file-alt"></i></div>
<h3 class="feature-title">Estructura eficiente</h3>
<p class="feature-desc">45 preguntas que evalúan writing, reading y listening.</p>
</div>
<div class="feature-card animate-fade-in-up" style="animation-delay: 0.4s;">
<div class="feature-icon"><i class="fas fa-globe-europe"></i></div>
<h3 class="feature-title">Alineado al MCER</h3>
<p class="feature-desc">Cumple con los criterios del Marco Común Europeo de Referencia.</p>
</div>
<div class="feature-card animate-fade-in-up" style="animation-delay: 0.5s;">
<div class="feature-icon"><i class="fas fa-clock"></i></div>
<h3 class="feature-title">Duración optimizada</h3>
<p class="feature-desc">Solo 50 a 75 minutos para completar la evaluación.</p>
</div>
<div class="feature-card animate-fade-in-up" style="animation-delay: 0.6s;">
<div class="feature-icon"><i class="fas fa-language"></i></div>
<h3 class="feature-title">Dos variantes</h3>
<p class="feature-desc">Disponible en inglés americano o británico.</p>
</div>
</div>
</section>

<!-- Alerta Importante -->
<section class="alert-section animate-slide-right">
<div class="alert-icon animate-pulse">
<i class="fas fa-chart-line"></i>
</div>
<h2 class="alert-title">Evaluación sin presión</h2>
<p class="alert-text">
El Oxford Placement Test está diseñado para hacer una evaluación integral y precisa sin generar estrés. Al no ser reprobable, se enfoca en medir objetivamente tu nivel actual, permitiéndote conocer tus fortalezas y áreas de oportunidad.
</p>
</section>

<!-- Ventajas del OPT -->
<section class="ventajas-section">
<h2 class="section-title">Ventajas del Oxford Placement Test</h2>
<div class="ventajas-grid">
<div class="ventaja-card animate-fade-in-up" style="animation-delay: 0.1s;">
<div class="ventaja-icon"><i class="fas fa-laptop-house"></i></div>
<h3 class="ventaja-title">Acceso desde cualquier lugar</h3>
<p class="ventaja-desc">Realiza el examen desde la comodidad de tu hogar u oficina.</p>
</div>
<div class="ventaja-card animate-fade-in-up" style="animation-delay: 0.2s;">
<div class="ventaja-icon"><i class="fas fa-tachometer-alt"></i></div>
<h3 class="ventaja-title">Resultados inmediatos</h3>
<p class="ventaja-desc">Obtén tus resultados al finalizar el examen sin esperas.</p>
</div>
<div class="ventaja-card animate-fade-in-up" style="animation-delay: 0.3s;">
<div class="ventaja-icon"><i class="fas fa-balance-scale"></i></div>
<h3 class="ventaja-title">Precisión comprobada</h3>
<p class="ventaja-desc">Tecnología adaptativa de Oxford para evaluación exacta.</p>
</div>
<div class="ventaja-card animate-fade-in-up" style="animation-delay: 0.4s;">
<div class="ventaja-icon"><i class="fas fa-check-double"></i></div>
<h3 class="ventaja-title">Sin riesgo de reprobar</h3>
<p class="ventaja-desc">Solo una medición objetiva de tu nivel actual.</p>
</div>
<div class="ventaja-card animate-fade-in-up" style="animation-delay: 0.5s;">
<div class="ventaja-icon"><i class="fas fa-university"></i></div>
<h3 class="ventaja-title">Prestigio Oxford</h3>
<p class="ventaja-desc">Certificación respaldada por Oxford University.</p>
</div>
<div class="ventaja-card animate-fade-in-up" style="animation-delay: 0.6s;">
<div class="ventaja-icon"><i class="fas fa-euro-sign"></i></div>
<h3 class="ventaja-title">Costo eficiente</h3>
<p class="ventaja-desc">Precio competitivo comparado con otras evaluaciones.</p>
</div>
</div>
</section>
</div>
</main>

<!-- Ubicación y Contacto (DEL INDEX) -->
<section class="location-section" id="ubicacion">
<div class="container">
<div class="row">
<div class="col-lg-7 col-12">
<div class="location-info">
<h2>Ubicación y contacto</h2>
<p>Contáctanos y siguenos en nuestras redes sociales.</p>
<div class="contact-info">
<div class="contact-item">
<div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
<span>AV. CAYUCO 12, ZIBATÁ, QRO.</span>
</div>
<div class="contact-item">
<div class="contact-icon"><i class="fas fa-phone"></i></div>
<span>+52 55-3567-8120</span>
</div>
<div class="contact-item">
<div class="contact-icon"><i class="fas fa-envelope"></i></div>
<span>info@expresslearningonline.com</span>
</div>
</div>
</div>
</div>
<div class="col-lg-5 col-12">
<div class="location-image">
<a href="https://www.google.com/maps?ll=20.683713,-100.341161&z=15" target="_blank">
<img src="img/imagen de zibata.jpeg" alt="Querétaro">
</a>
<div class="location-overlay">
<h3>Zibata, Querétaro</h3>
<a href="https://www.google.com/maps?ll=20.683713,-100.341161&z=15" target="_blank" class="btn-map">
<i class="fas fa-map-marker-alt"></i> Ver mapa
</a>
</div>
</div>
</div>
</div>
</div>
</section>

<!-- Footer (DEL INDEX) -->
<footer>
<div class="container">
<div class="row g-4">
<div class="col-lg-3 col-md-12">
<div class="footer-section">
<h4>X-Learning Online</h4>
<p>Aprende idiomas efectivamente desde cualquier lugar con programas innovadores.</p>
</div>
</div>
<div class="col-lg-4 col-md-12">
<div class="footer-section">
<h4>Nuestra esencia</h4>
<div class="row g-3">
<div class="col-md-6">
<div style="background: var(--white); padding: 18px; border-radius: 10px; border-left: 3px solid var(--primary-blue);">
<h5 style="font-size: 1.05rem; color: var(--dark-blue); margin-bottom: 6px;">
<i class="fas fa-bullseye"></i> Misión
</h5>
<p style="font-size: 0.9rem; margin: 0;">Potenciar el aprendizaje con ambientes virtuales inmersivos.</p>
</div>
</div>
<div class="col-md-6">
<div style="background: var(--white); padding: 18px; border-radius: 10px; border-left: 3px solid var(--primary-blue);">
<h5 style="font-size: 1.05rem; color: var(--dark-blue); margin-bottom: 6px;">
<i class="fas fa-eye"></i> Visión
</h5>
<p style="font-size: 0.9rem; margin: 0;">Líderes en enseñanza de idiomas en línea.</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-2 col-md-6">
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
<div class="col-lg-3 col-md-6">
<div class="footer-section">
<h4 style="text-align: center;">Síguenos</h4>
<div class="social-buttons-grid">
<a href="https://www.facebook.com/profile.php?id=61555920905204" class="social-btn btn-fb" target="_blank"><i class="fab fa-facebook-f"></i></a>
<a href="https://www.instagram.com/x_learningonline" class="social-btn btn-ig" target="_blank"><i class="fab fa-instagram"></i></a>
<a href="https://www.tiktok.com/@x_learningonline" class="social-btn btn-tt" target="_blank"><i class="fab fa-tiktok"></i></a>
<a href="https://www.youtube.com/@XLearningOnline" class="social-btn btn-yt" target="_blank"><i class="fab fa-youtube"></i></a>
<a href="https://www.elon.school/index.html" class="social-btn btn-li" target="_blank"><i class="fab fa-linkedin-in"></i></a>
<a href="https://whatsapp.com/channel/0029Vb5zjsB4SpkKKjmsh90u" class="social-btn btn-wa" target="_blank"><i class="fab fa-whatsapp"></i></a>
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

<!-- Custom JS -->
<script>
// Animaciones al hacer scroll
const observerOptions = {
root: null,
rootMargin: '0px',
threshold: 0.1
};

const observer = new IntersectionObserver((entries) => {
entries.forEach(entry => {
if (entry.isIntersecting) {
if (!entry.target.classList.contains('animated')) {
entry.target.classList.add('animated');
}
}
});
}, observerOptions);

document.querySelectorAll('.animate-fade-in-up, .animate-slide-left, .animate-slide-right').forEach(el => {
observer.observe(el);
});

// Menú móvil
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

// Inicializar animaciones para elementos visibles
document.addEventListener('DOMContentLoaded', function() {
const heroTitle = document.querySelector('.hero-title');
if (heroTitle && isElementInViewport(heroTitle)) {
heroTitle.classList.add('animate-fade-in-up');
}
const heroSubtitle = document.querySelector('.hero-subtitle');
if (heroSubtitle && isElementInViewport(heroSubtitle)) {
heroSubtitle.classList.add('animate-fade-in-up');
}
});

function isElementInViewport(el) {
const rect = el.getBoundingClientRect();
return (
rect.top >= 0 &&
rect.left >= 0 &&
rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
rect.right <= (window.innerWidth || document.documentElement.clientWidth)
);
}
</script>
<?php include 'includes/chatBot.php'; ?>
</body>
</html>