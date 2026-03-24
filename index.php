<?php session_start(); $usuario_logueado = isset($_SESSION['usuario_id']); $nombre_usuario = $usuario_logueado ? $_SESSION['usuario_nombre'] : ''; $rol_usuario = $usuario_logueado ? $_SESSION['usuario_rol'] : ''; ?>

<!DOCTYPE html><html lang="es"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Express Learning Online - Aprende Idiomas Online</title> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <link rel="preconnect" href="https://fonts.googleapis.com"> <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <link href="https://fonts.googleapis.com/css2?family=Hatton:wght@400;600;700&family=Montserrat:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <style> :root { --primary-blue: #59d2ec; --light-blue: #8fe1f2; --lighter-blue: #d4f2f9; --dark-blue: #1a3a5f; --text-dark: #0d1b2a; --text-light: #1a3a5f; --white: #ffffff; --snow: #f8f9fa; --gris: #616160; --medium-gray: #a0a0a0; --black:#000000; --border-radius: 12px; --transition: all 0.3s ease; --blue-deep: #0B3D91; --blue-ocean: #1976D2; --blue-sky: #59d2ec; --blue-light: #8fe1f2; --blue-soft: #b3e5fc; --blue-midnight: #1a237e; --bg-light: #F7F8FA; --text-secondary: #4B5563; --success-green: #16A34A; --error-red: #E11D48; 
  
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
  line-height: 1.6;
  font-family: 'Montserrat', sans-serif;
  padding-top: 70px;
  overflow-x: hidden;
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

/* ===== ESTILOS NEÓN PROFESIONALES PARA EL MENÚ DE REGISTRO ===== */
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

/* Menú desplegable con efectos neón */
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

/* Responsive para el menú */
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

/* ===== CARRUSEL PRINCIPAL - TEXTO LEGIBLE, IMAGEN EN ALTA CALIDAD ===== */
.hero {
  padding: 0;
  background: linear-gradient(135deg, var(--lighter-blue) 0%, var(--white) 100%);
  width: 100%;
  overflow: hidden;
}

.carousel-3d-container {
  position: relative;
  width: 100vw;
  height: auto;
  aspect-ratio: 1920 / 500;
  min-height: 200px;
  max-height: 450px;
  perspective: 1500px;
  margin: 0;
  padding: 0;
  left: 50%;
  right: 50%;
  margin-left: -50vw;
  margin-right: -50vw;
  overflow: hidden;
}

.carousel-3d {
  position: relative;
  width: 100%;
  height: 100%;
  transform-style: preserve-3d;
  animation: rotateCarousel 24s infinite cubic-bezier(0.4, 0.0, 0.2, 1);
}

.carousel-3d-item {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
  backface-visibility: hidden;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%) rotateY(0deg) translateZ(300px);
  border-radius: 0;
}

.carousel-3d-item:nth-child(1) { transform: translate(-50%, -50%) rotateY(0deg) translateZ(300px); }
.carousel-3d-item:nth-child(2) { transform: translate(-50%, -50%) rotateY(90deg) translateZ(300px); }
.carousel-3d-item:nth-child(3) { transform: translate(-50%, -50%) rotateY(180deg) translateZ(300px); }
.carousel-3d-item:nth-child(4) { transform: translate(-50%, -50%) rotateY(270deg) translateZ(300px); }

.carousel-3d-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center center;
  image-rendering: -webkit-optimize-contrast;
  image-rendering: crisp-edges;
  -ms-interpolation-mode: bicubic;
}

.carousel-3d-overlay {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  top: 0;
  background: linear-gradient(
    to right,
    rgba(0, 0, 0, 0.6) 0%,
    rgba(0, 0, 0, 0.3) 50%,
    transparent 100%
  );
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  padding: 0 8%;
  color: white;
  text-align: left;
}

.carousel-3d-overlay h3 {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  font-size: 2rem;
  margin-bottom: 8px;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
  letter-spacing: 0.5px;
  color: #ffffff;
  line-height: 1.2;
  max-width: 600px;
}

.carousel-3d-overlay p {
  font-family: 'Montserrat', sans-serif;
  font-weight: 500;
  font-size: 1.2rem;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
  color: #ffffff;
  opacity: 0.95;
  margin: 0;
  line-height: 1.3;
  max-width: 500px;
}

@keyframes rotateCarousel {
  0% { transform: rotateY(0deg); }
  20% { transform: rotateY(-90deg); }
  40% { transform: rotateY(-180deg); }
  60% { transform: rotateY(-270deg); }
  80% { transform: rotateY(-360deg); }
  100% { transform: rotateY(-360deg); }
}

/* Responsive del carrusel */
@media (max-width: 1400px) {
  .carousel-3d-container { aspect-ratio: 1920 / 480; }
  .carousel-3d-overlay h3 { font-size: 1.8rem; }
  .carousel-3d-overlay p { font-size: 1.1rem; }
}

@media (max-width: 1200px) {
  .carousel-3d-container { aspect-ratio: 1920 / 450; }
  .carousel-3d-overlay h3 { font-size: 1.6rem; }
  .carousel-3d-overlay p { font-size: 1rem; }
}

@media (max-width: 992px) {
  .carousel-3d-container { aspect-ratio: 1920 / 420; }
  .carousel-3d-item { transform: translate(-50%, -50%) rotateY(0deg) translateZ(250px); }
  .carousel-3d-item:nth-child(1) { transform: translate(-50%, -50%) rotateY(0deg) translateZ(250px); }
  .carousel-3d-item:nth-child(2) { transform: translate(-50%, -50%) rotateY(90deg) translateZ(250px); }
  .carousel-3d-item:nth-child(3) { transform: translate(-50%, -50%) rotateY(180deg) translateZ(250px); }
  .carousel-3d-item:nth-child(4) { transform: translate(-50%, -50%) rotateY(270deg) translateZ(250px); }
  .carousel-3d-overlay { padding: 0 6%; }
  .carousel-3d-overlay h3 { font-size: 1.5rem; }
  .carousel-3d-overlay p { font-size: 0.95rem; }
}

@media (max-width: 768px) {
  .carousel-3d-container { aspect-ratio: 1920 / 380; max-height: 350px; }
  .carousel-3d-item { transform: translate(-50%, -50%) rotateY(0deg) translateZ(220px); }
  .carousel-3d-item:nth-child(1) { transform: translate(-50%, -50%) rotateY(0deg) translateZ(220px); }
  .carousel-3d-item:nth-child(2) { transform: translate(-50%, -50%) rotateY(90deg) translateZ(220px); }
  .carousel-3d-item:nth-child(3) { transform: translate(-50%, -50%) rotateY(180deg) translateZ(220px); }
  .carousel-3d-item:nth-child(4) { transform: translate(-50%, -50%) rotateY(270deg) translateZ(220px); }
  .carousel-3d-overlay { background: linear-gradient(to right, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.4) 80%, transparent 100%); padding: 0 5%; }
  .carousel-3d-overlay h3 { font-size: 1.3rem; }
  .carousel-3d-overlay p { font-size: 0.9rem; }
}

@media (max-width: 576px) {
  .carousel-3d-container { aspect-ratio: 1920 / 320; max-height: 280px; }
  .carousel-3d-item { transform: translate(-50%, -50%) rotateY(0deg) translateZ(180px); }
  .carousel-3d-item:nth-child(1) { transform: translate(-50%, -50%) rotateY(0deg) translateZ(180px); }
  .carousel-3d-item:nth-child(2) { transform: translate(-50%, -50%) rotateY(90deg) translateZ(180px); }
  .carousel-3d-item:nth-child(3) { transform: translate(-50%, -50%) rotateY(180deg) translateZ(180px); }
  .carousel-3d-item:nth-child(4) { transform: translate(-50%, -50%) rotateY(270deg) translateZ(180px); }
  .carousel-3d-overlay { background: linear-gradient(to right, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.5) 100%); padding: 0 4%; }
  .carousel-3d-overlay h3 { font-size: 1.1rem; }
  .carousel-3d-overlay p { font-size: 0.8rem; }
}

@media (max-width: 380px) {
  .carousel-3d-container { aspect-ratio: 1920 / 280; max-height: 220px; }
  .carousel-3d-item { transform: translate(-50%, -50%) rotateY(0deg) translateZ(140px); }
  .carousel-3d-item:nth-child(1) { transform: translate(-50%, -50%) rotateY(0deg) translateZ(140px); }
  .carousel-3d-item:nth-child(2) { transform: translate(-50%, -50%) rotateY(90deg) translateZ(140px); }
  .carousel-3d-item:nth-child(3) { transform: translate(-50%, -50%) rotateY(180deg) translateZ(140px); }
  .carousel-3d-item:nth-child(4) { transform: translate(-50%, -50%) rotateY(270deg) translateZ(140px); }
  .carousel-3d-overlay h3 { font-size: 0.95rem; }
  .carousel-3d-overlay p { font-size: 0.7rem; }
}

@media (max-height: 500px) and (orientation: landscape) {
  .carousel-3d-container { aspect-ratio: auto; height: 90vh; max-height: 400px; }
  .carousel-3d-overlay { justify-content: center; padding: 0 6%; }
  .carousel-3d-overlay h3 { font-size: 1.2rem; }
  .carousel-3d-overlay p { font-size: 0.85rem; }
}

@media (min-width: 2000px) {
  .carousel-3d-container { max-height: 550px; }
  .carousel-3d-item { transform: translate(-50%, -50%) rotateY(0deg) translateZ(400px); }
  .carousel-3d-item:nth-child(1) { transform: translate(-50%, -50%) rotateY(0deg) translateZ(400px); }
  .carousel-3d-item:nth-child(2) { transform: translate(-50%, -50%) rotateY(90deg) translateZ(400px); }
  .carousel-3d-item:nth-child(3) { transform: translate(-50%, -50%) rotateY(180deg) translateZ(400px); }
  .carousel-3d-item:nth-child(4) { transform: translate(-50%, -50%) rotateY(270deg) translateZ(400px); }
  .carousel-3d-overlay h3 { font-size: 2.5rem; }
  .carousel-3d-overlay p { font-size: 1.5rem; }
}

/* Formularios */
.formulario-card {
  background: rgba(255, 255, 255, 0.95);
  border-radius: 30px;
  padding: 30px 25px;
  height: 100%;
  border: 2px solid transparent;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  transition: all 0.4s ease;
}

.formulario-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 25px 50px rgba(11, 61, 145, 0.2);
}

.form-aventura { border-top: 5px solid var(--blue-deep); }
.form-nivel { border-top: 5px solid var(--blue-ocean); }
.form-promo { border-top: 5px solid var(--blue-midnight); }

.formulario-card h3 {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  font-size: 1.3rem;
  margin-bottom: 20px;
  text-align: center;
  color: var(--dark-blue);
  line-height: 1.4;
}

.campo-seductor {
  margin-bottom: 15px;
  position: relative;
}

.campo-seductor input {
  width: 100%;
  padding: 14px 16px;
  border: 2px solid var(--blue-soft);
  border-radius: 12px;
  font-size: 1rem;
  transition: all 0.3s ease;
  background: rgba(255, 255, 255, 0.9);
}

.campo-seductor input:focus {
  outline: none;
  border-color: var(--blue-ocean);
  box-shadow: 0 0 0 3px rgba(25, 118, 210, 0.15);
}

.campo-seductor label {
  position: absolute;
  left: 16px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--blue-deep);
  transition: all 0.3s ease;
  pointer-events: none;
  background: white;
  padding: 0 6px;
  font-size: 1rem;
}

.campo-seductor input:focus + label,
.campo-seductor input:not(:placeholder-shown) + label {
  top: 0;
  transform: translateY(-50%) scale(0.85);
  color: var(--blue-ocean);
}

.btn-seductor {
  width: 100%;
  padding: 14px;
  color: var(--white);
  border: none;
  border-radius: 12px;
  font-weight: 700;
  font-size: 1rem;
  cursor: pointer;
  transition: all 0.4s ease;
  margin-top: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
}

.btn-aventura { background: linear-gradient(135deg, var(--blue-deep), var(--blue-ocean)); }
.btn-nivel { background: linear-gradient(135deg, var(--blue-ocean), var(--blue-sky)); }
.btn-promo { background: linear-gradient(135deg, var(--blue-midnight), var(--blue-deep)); }

.btn-seductor:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 25px rgba(11, 61, 145, 0.3);
}

.security-badge {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  margin-top: 12px;
  padding: 8px 12px;
  background: linear-gradient(135deg, rgba(22, 163, 74, 0.08), rgba(34, 197, 94, 0.08));
  border-radius: 8px;
  border: 1px solid rgba(22, 163, 74, 0.2);
}

.security-badge i {
  color: var(--success-green);
  font-size: 0.9rem;
  animation: pulseLock 2s infinite;
}

.security-badge span {
  color: var(--text-secondary);
  font-size: 0.75rem;
  font-weight: 500;
  line-height: 1.3;
}

@keyframes pulseLock {
  0%, 100% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.1); opacity: 0.8; }
}

.success-panel-seductor {
  display: none;
  text-align: center;
  padding: 15px;
  background: linear-gradient(135deg, #e3f2fd, #bbdefb);
  border-radius: 12px;
  margin-top: 15px;
  border: 2px solid var(--blue-sky);
}

.success-panel-seductor p {
  color: var(--blue-deep);
  font-weight: 600;
  font-size: 1rem;
  margin: 0;
}

.error-message {
  color: var(--error-red);
  font-size: 0.85rem;
  margin-top: 4px;
  display: none;
}

/* Sección de anuncio */
.anuncio-section {
  padding: 30px 0;
  background: var(--bg-light);
  font-family: 'Inter', sans-serif;
}

.anuncio-container {
  max-width: 1100px;
  margin: 0 auto;
  padding: 0 15px;
}

.anuncio-hero {
  text-align: center;
  margin-bottom: 25px;
}

.anuncio-hero h1 {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  font-size: 2rem;
  color: var(--dark-blue);
  margin-bottom: 5px;
}

.tarjetas-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
  margin-bottom: 25px;
}

.tarjeta {
  background: var(--white);
  border-radius: 15px;
  padding: 25px;
  box-shadow: 0 10px 25px rgba(11, 61, 145, 0.08);
  border: 1px solid var(--lighter-blue);
  transition: all 0.3s ease;
}

.tarjeta:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 35px rgba(11, 61, 145, 0.15);
}

.tarjeta h2 {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  font-size: 1.4rem;
  color: var(--dark-blue);
  margin-bottom: 8px;
}

.detalles-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 10px;
  margin-top: 15px;
  background: var(--lighter-blue);
  padding: 12px;
  border-radius: 10px;
}

.detalle-item {
  font-family: 'Inter', sans-serif;
  font-size: 0.95rem;
  color: var(--dark-blue);
}

.detalle-item strong {
  color: var(--dark-blue);
  font-weight: 600;
  display: block;
  margin-bottom: 2px;
  font-size: 0.9rem;
}

.imagenes-neon-container {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 25px;
  margin: 35px 0;
}

.imagen-neon-wrapper {
  position: relative;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 0 30px rgba(64, 224, 208, 0.3);
  transition: all 0.5s ease;
}

.imagen-neon-wrapper img {
  width: 100%;
  height: 320px;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.imagen-neon-wrapper:hover {
  transform: translateY(-10px);
  box-shadow: 0 0 50px rgba(64, 224, 208, 0.5);
}

.imagen-neon-wrapper:hover img {
  transform: scale(1.05);
}

.imagen-badge {
  position: absolute;
  top: 15px;
  right: 15px;
  background: linear-gradient(135deg, #40E0D0, #00CED1);
  color: white;
  padding: 8px 16px;
  border-radius: 20px;
  font-weight: 600;
  font-size: 0.9rem;
  z-index: 10;
}

.tabla-compacta-wrapper {
  background: var(--white);
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 10px 25px rgba(11, 61, 145, 0.1);
  margin: 25px auto;
  border: 1px solid var(--lighter-blue);
  max-width: 600px;
}

.tabla-compacta {
  width: 100%;
  border-collapse: collapse;
  font-family: 'Inter', sans-serif;
  font-size: 0.82rem;
}

.tabla-compacta th {
  background: linear-gradient(135deg, var(--dark-blue), #1a4a9e);
  color: var(--white);
  font-family: 'Montserrat', sans-serif;
  font-weight: 600;
  font-size: 0.85rem;
  padding: 10px 3px;
  text-align: center;
}

.tabla-compacta th:first-child {
  text-align: left;
  background: linear-gradient(135deg, var(--dark-blue), #0d1b2a);
  width: 75%;
  padding-left: 8px;
}

.tabla-compacta th:nth-child(2),
.tabla-compacta th:nth-child(3) {
  width: 17.5%;
}

.tabla-compacta td {
  padding: 5px 3px;
  border-bottom: 1px solid var(--lighter-blue);
  color: var(--dark-blue);
  vertical-align: middle;
  font-size: 0.88rem;
}

.tabla-compacta tr:last-child td {
  border-bottom: none;
}

.tabla-compacta tr:hover td {
  background: rgba(89, 210, 236, 0.06);
}

.tabla-compacta td:first-child {
  font-weight: 600;
  background: var(--snow);
  border-right: 2px solid var(--lighter-blue);
  padding-left: 8px;
  text-align: left;
}

.tabla-compacta .categoria-titulo {
  background: linear-gradient(135deg, var(--primary-blue), var(--light-blue));
  color: var(--dark-blue);
  font-weight: 700;
  font-size: 0.75rem;
  text-transform: uppercase;
}

.tabla-compacta .categoria-titulo td {
  background: linear-gradient(135deg, var(--primary-blue), var(--light-blue));
  color: var(--dark-blue);
  font-weight: 700;
  padding: 7px 3px;
}

.check-emoji {
  font-size: 0.95rem;
  display: inline-block;
}

.check-columna {
  text-align: center;
}

.tabla-compacta .beneficios-vip {
  background: linear-gradient(135deg, rgba(255, 215, 0, 0.04), rgba(255, 193, 7, 0.08));
}

/* Botón de WhatsApp */
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

.wa-icon i { color: white; font-size: 32px; }

.wa-button:hover .wa-icon {
  transform: scale(1.1);
  box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
}

/* Footer */
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


/* Modal */
.modal-content { border-radius: 15px; border: none; }

.modal-header {
  background: linear-gradient(135deg, var(--dark-blue), #1a4a9e);
  color: white;
  border-radius: 15px 15px 0 0;
}

/* FAQ */
.faq-section {
  padding: 30px 0;
  background-color: var(--white);
}

.faq-container {
  max-width: 900px;
  margin: 0 auto;
  padding: 0 15px;
}

.section-title {
  text-align: center;
  font-size: 1.8rem;
  font-family: 'Hatton', serif;
  color: var(--dark-blue);
  margin-bottom: 25px;
}

.faq-accordion {
  background-color: var(--snow);
  border-radius: 12px;
  overflow: hidden;
}

.faq-item {
  border-bottom: 1px solid var(--medium-gray);
}

.faq-item:last-child { border-bottom: none; }

.faq-question {
  padding: 14px 16px;
  cursor: pointer;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: var(--white);
  transition: all 0.3s ease;
}

.faq-question:hover {
  background-color: var(--lighter-blue);
}

.faq-question h4 {
  color: var(--text-dark);
  font-size: 0.95rem;
  font-weight: 600;
  margin: 0;
  line-height: 1.4;
  flex: 1;
}

.faq-icon {
  color: var(--primary-blue);
  transition: all 0.3s ease;
  font-size: 0.9rem;
  flex-shrink: 0;
  margin-left: 10px;
}

.faq-question:hover .faq-icon {
  transform: rotate(180deg);
  color: var(--dark-blue);
}

.faq-answer {
  padding: 0 16px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.35s ease;
  background-color: var(--white);
}

.faq-answer p {
  padding: 12px 0;
  color: var(--dark-blue);
  font-size: 0.9rem;
  line-height: 1.6;
  margin: 0;
}

.faq-item.active .faq-answer { max-height: 500px; }

.faq-item.active .faq-icon {
  transform: rotate(180deg);
  color: var(--dark-blue);
}

/* Responsive general */
@media (max-width: 991.98px) {
  .footer-container { text-align: center; }
  .social-buttons-grid { margin: 0 auto 15px; }
  .carousel-3d-container { height: 200px; }
}

@media (max-width: 768px) {
  .tarjetas-grid { grid-template-columns: 1fr; }
  .anuncio-hero h1 { font-size: 1.6rem; }
  .imagenes-neon-container { grid-template-columns: 1fr; }
  .imagen-neon-wrapper img { height: 280px; }
  .section-title { font-size: 1.5rem; }
  .tabla-compacta { font-size: 0.78rem; }
  .tabla-compacta td { padding: 4px 2px; }
}

@media (max-width: 480px) {
  .formulario-card { padding: 25px 18px; }
  .formulario-card h3 { font-size: 1.2rem; }
  .campo-seductor input { padding: 12px 14px; font-size: 0.95rem; }
  .btn-seductor { padding: 13px; font-size: 0.95rem; }
  .tabla-compacta th { font-size: 0.8rem; padding: 8px 2px; }
  .tabla-compacta td { padding: 3px 2px; font-size: 0.75rem; }
  .faq-question h4 { font-size: 0.9rem; }
  .faq-answer p { font-size: 0.85rem; }
  .security-badge span { font-size: 0.7rem; }
}

img { max-width: 100%; height: auto; display: block; }
</style>

</head> <body id="index.php">
   <?php if (isset($_GET['logged_out'])): ?>
    <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-5" style="z-index: 9999; min-width: 300px;"> <i class="fas fa-check-circle"></i> Sesión cerrada correctamente. <button type="button" class="btn-close" data-bs-dismiss="alert"></button> </div> <?php endif; ?> <a href="https://wa.me/525535678120" class="wa-button" target="_blank"> <div class="wa-icon"><i class="fab fa-whatsapp"></i></div> </a> <nav class="navbar navbar-expand-lg navbar-custom fixed-top"> <div class="container"> <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="img-fluid" alt="Logo"></a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"> <i class="fas fa-bars" style="color: var(--dark-blue); font-size: 24px;"></i> </button> <div class="collapse navbar-collapse" id="navbarNav"> <ul class="navbar-nav mx-auto"> <li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li> <li class="nav-item"><a class="nav-link" href="nuestroscursos.php">Immerse Hub</a></li> <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Certificaciones</a> <ul class="dropdown-menu"> <li><a class="dropdown-item" href="CENNI.php">CENNI</a></li> <li><a class="dropdown-item" href="OPT.php">OXFORD OPT</a></li> <li><a class="dropdown-item" href="OTE.php">OXFORD OTE</a></li> <li><a class="dropdown-item" href="GESE.php">TRINITY GESE</a></li> <li><a class="dropdown-item" href="ISE.php">TRINITY ISE</a></li> <li><a class="dropdown-item" href="TOEFL.php">TOEFL</a></li> </ul> </li> <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Servicios</a> <ul class="dropdown-menu"> <li><a class="dropdown-item" href="plataforma1.php">Plataforma 1</a></li> <li><a class="dropdown-item" href="plataforma2.php">Plataforma 2</a></li> <li><a class="dropdown-item" href="plataforma3.php">Plataforma 3</a></li> <li><a class="dropdown-item" href="plataforma4.php">Plataforma 4</a></li> <li><a class="dropdown-item" href="plataforma5.php">Plataforma 5</a></li> <li><a class="dropdown-item" href="plataforma6.php">Plataforma 6</a></li> </ul> </li> <li class="nav-item"><a class="nav-link" href="canjeregalo.php">Regalos</a></li> <li class="nav-item"><a class="nav-link" href="blog.php">Trayectoria</a></li> </ul> <?php if ($usuario_logueado): ?> <ul class="navbar-nav ms-lg-2"> <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown"> <i class="fas fa-user-circle" style="font-size: 1.3rem; color: var(--dark-blue);"></i> <span class="fw-semibold"><?php echo htmlspecialchars($nombre_usuario); ?></span> </a> <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="border-radius: 12px; min-width: 200px;"> <li class="px-3 py-2 border-bottom"><small class="text-muted">Rol:</small><div class="fw-bold text-capitalize"><?php echo $rol_usuario; ?></div></li> <li><a class="dropdown-item py-2" href="registro.php"><i class="fas fa-user me-2 text-primary"></i>Mi Perfil</a></li> <li><a class="dropdown-item py-2" href="#"><i class="fas fa-book me-2 text-success"></i>Mis Cursos</a></li> <?php if ($rol_usuario === 'admin'): ?> <li><hr class="dropdown-divider"></li> <li><a class="dropdown-item py-2" href="admin/dashboard.php"><i class="fas fa-cog me-2 text-warning"></i>Panel Admin</a></li> <?php endif; ?> <li><hr class="dropdown-divider"></li> <li><a class="dropdown-item py-2 text-danger" href="logout.php" onclick="return confirm('¿Cerrar sesión?')"><i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión</a></li> </ul> </li> </ul> <?php else: ?> <ul class="navbar-nav ms-lg-2"> <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle btn-register" href="#" data-bs-toggle="dropdown"> <i class="fas fa-user-plus me-2"></i>Registrarme </a> <ul class="dropdown-menu dropdown-menu-end shadow border-0"> <li><a class="dropdown-item" href="#"><i class="fas fa-user-graduate"></i> Nuevo ingreso</a></li> <li><a class="dropdown-item" href="https://es.surveymonkey.com/r/RT6KTJN" target="_blank"><i class="fas fa-file-signature"></i> Trámites CNNI</a></li> <li><a class="dropdown-item" href="https://es.surveymonkey.com/r/HGY3LCL" target="_blank"><i class="fas fa-user-minus"></i> Bajas</a></li> <li><hr class="dropdown-divider"></li> <li><a class="dropdown-item fw-bold" href="registro.php"><i class="fas fa-star"></i> SU</a></li> </ul> </li> </ul> <?php endif; ?> </div> </div> </nav> <!-- ===== BANNER PRINCIPAL - TEXTO LEGIBLE, IMAGEN EN ALTA CALIDAD ===== --> <section class="hero"> <div class="carousel-3d-container"> <div class="carousel-3d" id="carousel3D"> <div class="carousel-3d-item"> <img src="img/1.png" alt="Aprende idiomas online" loading="eager"> <div class="carousel-3d-overlay"> <h3>Tu futuro comienza hoy</h3> <p>Bienvenido a XLearning Online</p> </div> </div> <div class="carousel-3d-item"> <img src="img/2.png" alt="Cursos personalizados" loading="eager"> <div class="carousel-3d-overlay"> <h3>Immerse Hub</h3> <p>Aprende a tu propio ritmo</p> </div> </div> <div class="carousel-3d-item"> <img src="img/3.png" alt="Reserva tu lugar" loading="eager"> <div class="carousel-3d-overlay"> <h3>Da el siguiente paso</h3> <p>¡Reserva tu lugar hoy!</p> </div> </div> <div class="carousel-3d-item"> <img src="img/1.png" alt="Comunidad de aprendizaje" loading="eager"> <div class="carousel-3d-overlay"> <h3>Tu viaje comienza aquí</h3> <p>Únete a nuestra comunidad</p> </div> </div> </div> </div> </section> 
// <!-- 2. SECCIÓN ANUNCIO (AHORA VA PRIMERO) --> 
<section class="anuncio-section"> <div class="anuncio-container"> 
  <div class="anuncio-hero"><h1>¿Social Hub (SH) o Private Hub (PH)?</h1></div>
<div class="imagenes-neon-container"> <div class="imagen-neon-wrapper"><span class="imagen-badge">
<i class="fas fa-users"></i>Social Hub (SH)</span><img src="img/aula-grupal.jpg" alt="sesion Grupal">
</div> <div class="imagen-neon-wrapper"><span class="imagen-badge"><i class="fas fa-user">
</i>Private Hub (PH)</span><img src="img/estudio-personalizado.jpg" alt="sesion Personalizada"></div>
</div> <div class="tarjetas-grid"> <div class="tarjeta"><h2>Social Hub (SH)</h2><div class="detalles-grid"><div class="detalle-item"><strong>Sesiones:</strong> 5 (4 hrs.)</div>
<div class="detalle-item"><strong>Días:</strong> Sáb. o Dom.</div><div class="detalle-item"><strong>Horario:</strong> 7AM-11AM / 11AM-3PM</div><div class="detalle-item"><strong>Duración:</strong> 7 semanas</div></div></div> <div class="tarjeta"><h2>Private Hub (SH)</h2><div class="detalles-grid"><div class="detalle-item"><strong>Sesiones:</strong> 10 (50 min)</div><div class="detalle-item"><strong>Días:</strong> Tú eliges</div><div class="detalle-item"><strong>Horario:</strong> Tú eliges</div>
<div class="detalle-item"><strong>Duración:</strong> 2 semanas</div></div></div> </div> 
<div class="tabla-compacta-wrapper"> <table class="tabla-compacta"> <thead> <tr><th>Características</th>
<th>Social Hub (SH)</th><th>Private Hub (PH)</th></tr> </thead> <tbody> <tr class="categoria-titulo"><td colspan="3"><i class="fas fa-bullseye"></i> Enfoque</td></tr> <tr><td>Sin gramática tradicional</td><td class="check-columna"><span class="check-emoji">✅</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr><td>Sin libros</td><td class="check-columna"><span class="check-emoji">✅</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr><td>Contexto familiar, social y cultural</td><td class="check-columna"><span class="check-emoji">✅</span></td>
<td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr><td>Estrategias y tips prácticos</td><td class="check-columna"><span class="check-emoji">✅</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr class="categoria-titulo"><td colspan="3"><i class="fas fa-gift"></i> Incluye</td></tr> <tr><td>Tecnología educativa de vanguardia</td><td class="check-columna"><span class="check-emoji">✅</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr><td>Evaluación continua</td><td class="check-columna"><span class="check-emoji">✅</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr><td>Retroalimentación</td><td class="check-columna"><span class="check-emoji">✅</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr><td>Examen de ubicación</td><td class="check-columna"><span class="check-emoji">✅</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr><td>Certificaciones internacionales</td><td class="check-columna"><span class="check-emoji">✅</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr class="categoria-titulo"><td colspan="3"><i class="fas fa-star"></i> Ideal para</td></tr> <tr><td>Estudiantes</td><td class="check-columna"><span class="check-emoji">✅</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr><td>Profesionistas</td><td class="check-columna"><span class="check-emoji">✅</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr><td>Público en general</td><td class="check-columna"><span class="check-emoji">✅</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr class="categoria-titulo"><td colspan="3"><i class="fas fa-crown"></i> Beneficios VIP</td></tr> <tr class="beneficios-vip"><td>Sin penalización por cambios de sesions</td><td class="check-columna"><span class="check-emoji" style="opacity: 0.3;">⚪</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr class="beneficios-vip"><td>Adaptado a la disponibilidad del alumno</td><td class="check-columna"><span class="check-emoji" style="opacity: 0.3;">⚪</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr class="beneficios-vip"><td>Formación acorde a las necesidades del estudiante</td><td class="check-columna"><span class="check-emoji" style="opacity: 0.3;">⚪</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr class="beneficios-vip"><td>Uso de vocabulario técnico por perfil</td><td class="check-columna"><span class="check-emoji" style="opacity: 0.3;">⚪</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> <tr class="beneficios-vip"><td>Material didáctico con enfoque laboral</td><td class="check-columna"><span class="check-emoji" style="opacity: 0.3;">⚪</span></td><td class="check-columna"><span class="check-emoji">✅</span></td></tr> </tbody> </table> </div> </div> </section> <!-- 3. TÍTULO "POR DONDE QUIERES COMENZAR" (DESPUÉS DEL ANUNCIO) --> <div class="container text-center mb-4"> <h2 class="section-title">Por donde quieres comenzar</h2> </div> <!-- 4. FORMULARIOS (DESPUÉS DEL TÍTULO, ANTES DE FAQ) --> <section class="formularios-fila" id="formularios-fila"> <div class="container"><div class="row g-4"> <div class="col-lg-4 col-md-6"> <div class="formulario-card form-aventura" id="form-aventura"> <h3>Sesión de diagnóstico de ruta</h3> <form class="form-aventura-form" novalidate data-tipo="sesion-muestra"> <div class="campo-seductor"><input type="text" id="nombre-aventura" placeholder=" " required><label for="nombre-aventura">Nombre completo</label><div class="error-message"></div></div> <div class="campo-seductor"><input type="email" id="email-aventura" placeholder=" " required><label for="email-aventura">Correo electrónico</label><div class="error-message"></div></div> <div class="campo-seductor"><input type="tel" id="telefono-aventura" placeholder=" " required><label for="telefono-aventura">Número telefónico</label><div class="error-message"></div></div> <button type="submit" class="btn-seductor btn-aventura"><i class="fas fa-gift"></i> Solicitar ruta<i class="fas fa-arrow-right"></i></button> <div class="security-badge"> <i class="fas fa-lock"></i> <span>Tus datos están 100% seguros y protegidos</span> </div> <div class="success-panel-seductor"><p>¡Te contactaremos pronto!</p></div> </form> </div> </div> <div class="col-lg-4 col-md-6"> 
<div class="formulario-card form-nivel" id="form-nivel"> <h3>Examen de ubicación sin costo</h3> <form class="form-nivel-form" novalidate data-tipo="examen-ubicacion"> <div class="campo-seductor"><input type="text" id="nombre-nivel" placeholder=" " required><label for="nombre-nivel">Nombre completo</label><div class="error-message"></div></div> <div class="campo-seductor"><input type="email" id="email-nivel" placeholder=" " required><label for="email-nivel">Correo electrónico</label><div class="error-message"></div></div> <div class="campo-seductor"><input type="tel" id="telefono-nivel" placeholder=" " required><label for="telefono-nivel">Número telefónico</label><div class="error-message"></div></div> <button type="submit" class="btn-seductor btn-nivel"><i class="fas fa-file-alt"></i> Solicitar examen <i class="fas fa-arrow-right"></i></button> <div class="security-badge"> <i class="fas fa-lock"></i> <span>Tus datos están 100% seguros y protegidos</span> </div> <div class="success-panel-seductor"><p>¡Te enviaremos tu examen!</p></div> </form> </div> </div> <div class="col-lg-4 col-md-6"> <div class="formulario-card form-promo" id="form-promo"> <h3>Promoción especial</h3> <form class="form-promo-form" novalidate data-tipo="promocion-especial"> <div class="campo-seductor"><input type="text" id="nombre-promo" placeholder=" " required><label for="nombre-promo">Nombre completo</label><div class="error-message"></div></div> <div class="campo-seductor"><input type="email" id="email-promo" placeholder=" " required><label for="email-promo">Correo electrónico</label><div class="error-message"></div></div> <div class="campo-seductor"><input type="tel" id="telefono-promo" placeholder=" " required><label for="telefono-promo">Número telefónico</label><div class="error-message"></div></div> <button type="submit" class="btn-seductor btn-promo"><i class="fas fa-tag"></i> Solicitar promo <i class="fas fa-arrow-right"></i></button> <div class="security-badge"> <i class="fas fa-lock"></i> <span>Tus datos están 100% seguros y protegidos</span> </div> <div class="success-panel-seductor"><p>¡Tu cupón llegará pronto!</p></div> </form> </div> </div> </div></div> </section><div class="modal fade" id="informesModal" tabindex="-1" aria-hidden="true"> <div class="modal-dialog modal-dialog-centered"> <div class="modal-content"></div> </div> </div> <!-- 5. PREGUNTAS FRECUENTES (AL FINAL, DESPUÉS DE FORMULARIOS) --> <section class="faq-section" id="preguntas-frecuentes"> <div class="container faq-container"> <h2 class="section-title">Preguntas frecuentes</h2> <div class="faq-accordion"> <div class="faq-item"> <div class="faq-question"><h4>¿Necesito comprar libros o materiales de apoyo?</h4><i class="fas fa-chevron-down faq-icon"></i></div> <div class="faq-answer"><p>No. En lugar de usar ejemplos genéricos, utilizamos tu contexto familiar, social, cultural y laboral para construir un aprendizaje significativo.</p></div> </div> <div class="faq-item"> <div class="faq-question"><h4>¿Cómo aprenderé la pronunciación?</h4><i class="fas fa-chevron-down faq-icon"></i></div> <div class="faq-answer"><p>Hemos diseñado un ecosistema visual e intuitivo que asocia colores con los símbolos fonéticos y sonidos clave del inglés. Esto te permite "ver" la pronunciación correcta desde el inicio, eliminando el miedo y la duda al hablar. ¡Solicita una Sesión de diagnóstico de ruta y vive la experiencia!</p></div> </div> <div class="faq-item"> <div class="faq-question"><h4>¿Enseñan inglés británico o americano?</h4><i class="fas fa-chevron-down faq-icon"></i></div> <div class="faq-answer"><p>Enseñamos un inglés standard que incluye el inglés americano y el británico. Te familiarizarás con las variaciones de vocabulario, pronunciación y modismos tanto del inglés británico como del americano.</p></div> </div> <div class="faq-item"> <div class="faq-question"><h4>¿Las sesiones son grabadas?</h4><i class="fas fa-chevron-down faq-icon"></i></div> <div class="faq-answer"><p>No, las sesions son en vivo e incluyen práctica digital en aplicaciones y plataformas premium para que las utilices durante toda la semana a tu propio ritmo. Además, organizamos sesiones de práctica con hablantes nativos para que apliques tus conocimientos en conversaciones reales.</p></div> </div> <div class="faq-item"> <div class="faq-question"><h4>¿Los grupos son reducidos?</h4><i class="fas fa-chevron-down faq-icon"></i></div> <div class="faq-answer"><p>Los grupos son de 15 estudiantes como máximo. En cada aula virtual tienes un docente titular que guía la sesión y un tutor virtual que te brinda apoyo constante para que resuelvas al instante todas tus dudas sobre el idioma y las herramientas digitales.</p></div> </div> <div class="faq-item"> <div class="faq-question"><h4>¿Qué garantiza que seré bilingüe en 6 meses?</h4><i class="fas fa-chevron-down faq-icon"></i></div> <div class="faq-answer"><p>Hablas inglés desde la primera sesión. Replicamos la forma natural en que aprendiste tu lengua materna. Nuestro enfoque es 100% práctico y conversacional: primero aprendes a hablar, después a escribir, luego a leer y finalmente, entiendes la gramática de forma intuitiva.</p></div> </div> <div class="faq-item"> <div class="faq-question"><h4>¿Cuánto duran el Curso de Inglés Súper Intensivo Grupal?</h4><i class="fas fa-chevron-down faq-icon"></i></div> <div class="faq-answer"><p>El programa obligatorio consiste en cursar 13 módulos, cada uno con duración de 6 semanas.</p></div> </div> <div class="faq-item"> <div class="faq-question"><h4>¿Me regresarán de nivel si repruebo algún examen?</h4><i class="fas fa-chevron-down faq-icon"></i></div> <div class="faq-answer"><p>No regresamos a los alumnos de nivel. Nuestro sistema está diseñado para que avances constantemente hasta alcanzar tu meta. Nuestra evaluación es continua y formativa, por lo tanto, solo detectan tus áreas de oportunidad para ofrecerte una retroalimentación personalizada.</p></div> </div> <div class="faq-item"> <div class="faq-question"><h4>¿Qué documento me entregarán al terminar el curso?</h4><i class="fas fa-chevron-down faq-icon"></i></div> <div class="faq-answer"><p>En el módulo 7 (un año), aplicas tu primer examen OXFORD en el nivel A1-A2. Al término del curso, en el módulo 13 (un año y 10 meses), aplicas tu segundo examen OXFORD en el nivel B1-B2, para que la Secretaría de Educación Pública te otorgue el Certificado Nacional de Nivel de Idioma (CENNI). Además de tu Diploma de Participación en el programa.</p></div> </div> <div class="faq-item"> <div class="faq-question"><h4>¿Puedo obtener el CENNI sin estudiar en X-Learning?</h4><i class="fas fa-chevron-down faq-icon"></i></div> <div class="faq-answer"><p>Sí, en X-Learning te ayudamos a gestionar el CENNI, siempre y cuando ya cuentes con alguna certificación reconocida vigente o bien acredites el examen de OXFORD con un nivel igual o superior al B1. Pregunta por nuestra próxima aplicación.</p></div> </div> <div class="faq-item"> <div class="faq-question"><h4>¿Qué métodos de pago aceptan?</h4><i class="fas fa-chevron-down faq-icon"></i></div> <div class="faq-answer"><p>Queremos que tu inicio sea tan fluido como tu futuro inglés. Aceptamos pagos de forma segura a través de Stripe (tarjetas de crédito y débito) y transferencias.</p></div> </div> </div> </div> </section><section class="location-section" id="ubicacion"> <div class="container"><div class="row"> <div class="col-lg-7 col-12"> <div class="location-info"> <h2>Ubicación y contacto</h2> <div class="contact-info"> <div class="contact-item"><div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div><span>AV. CAYUCO 12, ZIBATÁ, QRO.</span></div> <div class="contact-item"><div class="contact-icon"><i class="fas fa-phone"></i></div><span>+52 55-3567-8120</span></div> <div class="contact-item"><div class="contact-icon"><i class="fas fa-envelope"></i></div><span>info@expresslearningonline.com</span></div> </div> </div> </div> <div class="col-lg-5 col-12"> <div class="location-image"> <a href="https://www.google.com/maps?ll=20.683713,-100.341161&z=15" target="_blank"><img src="img/imagen de zibata.jpeg" alt="Querétaro"></a> <div class="location-overlay"><h3>Zibata, Querétaro</h3><a href="https://www.google.com/maps?ll=20.683713,-100.341161&z=15" target="_blank" class="btn-map"><i class="fas fa-map-marker-alt"></i> Ver mapa</a></div> </div> </div> </div></div> </section> <footer> <div class="container"><div class="row g-4"> <div class="col-lg-3 col-md-12"><div class="footer-section"><h4>X-Learning Online</h4> <p>Aprende idiomas efectivamente desde cualquier lugar con programas innovadores.</p></div></div> 
  <div class="col-lg-4 col-md-12"><div class="footer-section"><h4>Nuestra esencia</h4><div class="row g-3"> <div class="col-md-6"><div style="background: var(--white); padding: 18px; border-radius: 10px; border-left: 3px solid var(--primary-blue);"><h5 style="font-size: 1.05rem; color: var(--dark-blue); margin-bottom: 6px;"><i class="fas fa-bullseye"></i> Misión</h5><p style="font-size: 0.9rem; margin: 0;">Potenciar el aprendizaje con ambientes virtuales inmersivos.</p></div></div> <div class="col-md-6"><div style="background: var(--white); padding: 18px; border-radius: 10px; border-left: 3px solid var(--primary-blue);"><h5 style="font-size: 1.05rem; color: var(--dark-blue); margin-bottom: 6px;"><i class="fas fa-eye"></i> Visión</h5><p style="font-size: 0.9rem; margin: 0;">Líderes en enseñanza de idiomas en línea.</p></div></div> </div></div></div> <div class="col-lg-2 col-md-6"><div class="footer-section"><h4>Enlaces</h4> <ul class="footer-links"><li><a href="index.php">Inicio</a></li><li><a href="nuestroscursos.php">Immerse Hub</a></li> <li><a href="CENNI.php">Certificaciones</a></li><li><a href="servicios.php">Servicios</a></li> <li><a href="canjeregalo.php">Regalos</a> <li><a href="blog.php">Trayectoria</a> <li><a href="registro.php">Registro</a> </li></ul></div></div> <div class="col-lg-3 col-md-6"><div class="footer-section"><h4 style="text-align: center;">Síguenos</h4><div class="social-buttons-grid"> <a href="https://www.facebook.com/profile.php?id=61555920905204" class="social-btn btn-fb" target="_blank"><i class="fab fa-facebook-f"></i></a> <a href="https://www.instagram.com/x_learningonline" class="social-btn btn-ig" target="_blank"><i class="fab fa-instagram"></i></a> <a href="https://www.tiktok.com/@x_learningonline" class="social-btn btn-tt" target="_blank"><i class="fab fa-tiktok"></i></a> <a href="https://www.youtube.com/@XLearningOnline" class="social-btn btn-yt" target="_blank"><i class="fab fa-youtube"></i></a> <a href="https://www.elon.school/index.html" class="social-btn btn-li" target="_blank"><i class="fab fa-linkedin-in"></i></a> <a href="https://whatsapp.com/channel/0029Vb5zjsB4SpkKKjmsh90u" class="social-btn btn-wa" target="_blank"><i class="fab fa-whatsapp"></i></a> </div></div></div> </div><div class="copyright"><p>&copy; 2024 X-Learning Online. Todos los derechos reservados.</p></div></div>
   </footer><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script><script> // Carrusel 3D - NUNCA SE DETIENE const carousel = document.getElementById('carousel3D'); let currentRotation = 0; function rotateCarousel() { currentRotation -= 90; carousel.style.transform = `rotateY(${currentRotation}deg)`; } let autoRotate = setInterval(rotateCarousel, 6000); // JavaScript para el carrusel (function() { const carousel = document.getElementById('carousel3D'); if (!carousel) return; let currentRotation = 0; function rotateCarousel() { currentRotation -= 90; carousel.style.transform = `rotateY(${currentRotation}deg)`; carousel.style.transition = 'transform 1.5s cubic-bezier(0.4, 0.0, 0.2, 1)'; } // Limpiar intervalo anterior if (window.carouselInterval) { clearInterval(window.carouselInterval); } // Rotación cada 10 segundos window.carouselInterval = setInterval(rotateCarousel, 10000); // Pausa al hacer hover (opcional) carousel.addEventListener('mouseenter', () => { clearInterval(window.carouselInterval); }); carousel.addEventListener('mouseleave', () => { window.carouselInterval = setInterval(rotateCarousel, 10000); }); })(); // FAQ Accordion document.querySelectorAll('.faq-item').forEach(item => { item.querySelector('.faq-question').addEventListener('click', () => { document.querySelectorAll('.faq-item').forEach(other => { if (other !== item) other.classList.remove('active'); }); item.classList.toggle('active'); }); }); // Scroll suave document.querySelectorAll('a[href^="#"]').forEach(anchor => { anchor.addEventListener('click', function(e) { e.preventDefault(); const target = document.querySelector(this.getAttribute('href')); if (target) target.scrollIntoView({ behavior: 'smooth', block: 'center' }); }); }); // Validación de formularios (SIN CAMBIOS - FUNCIONALIDAD INTACTA) function setupFormValidation(formClass, nombreId, emailId, telefonoId) { const form = document.querySelector(`.${formClass}`); if (!form) return; const nombre = document.getElementById(nombreId); const email = document.getElementById(emailId); const telefono = document.getElementById(telefonoId); const btnSubmit = form.querySelector('button[type="submit"]'); const successPanel = form.querySelector('.success-panel-seductor'); const tipoInteres = form.getAttribute('data-tipo'); function validateField(field, errorMsg, message) { if (!field.value.trim()) { errorMsg.textContent = message; errorMsg.style.display = 'block'; return false; } errorMsg.style.display = 'none'; return true; } function validateEmail(field, errorMsg) { const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; if (!regex.test(field.value)) { errorMsg.textContent = 'Correo inválido'; errorMsg.style.display = 'block'; return false; } errorMsg.style.display = 'none'; return true; } function validatePhone(field, errorMsg) { const regex = /^[\d\s\+\-]{10,}$/; if (!regex.test(field.value)) { errorMsg.textContent = 'Teléfono inválido'; errorMsg.style.display = 'block'; return false; } errorMsg.style.display = 'none'; return true; } form.addEventListener('submit', async function(e) { e.preventDefault(); const nombreError = nombre.nextElementSibling.nextElementSibling; const emailError = email.nextElementSibling.nextElementSibling; const telefonoError = telefono.nextElementSibling.nextElementSibling; const isValid = validateField(nombre, nombreError, 'Nombre requerido') && validateEmail(email, emailError) && validatePhone(telefono, telefonoError); if (!isValid) return; btnSubmit.disabled = true; const originalHTML = btnSubmit.innerHTML; btnSubmit.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...'; const nombreValor = nombre.value.trim(); const emailValor = email.value.trim(); const telefonoValor = telefono.value.trim(); try { const formData = new FormData(); formData.append('nombre', nombreValor); formData.append('email', emailValor); formData.append('telefono', telefonoValor); formData.append('tipo', tipoInteres); const response = await fetch('procesar_formulario.php', { method: 'POST', body: formData, credentials: 'same-origin' }); const result = await response.json(); if (result.success) { successPanel.style.display = 'block'; let tipoMensaje = ''; switch(tipoInteres) { case 'sesion-muestra': tipoMensaje = 'Sesión de diagnóstico de ruta'; break; case 'examen-ubicacion': tipoMensaje = 'Examen de ubicación sin costo'; break; case 'promocion-especial': tipoMensaje = 'Promoción especial'; break; } const mensaje = `🎓 *X-Learning Online* Hola, mi nombre es *${nombreValor}* 📧 Correo: ${emailValor} 📱 Teléfono: ${telefonoValor} *Interés:* ${tipoMensaje} Quisiera recibir más información. ¡Gracias!`; setTimeout(() => { window.open(`https://wa.me/525535678120?text=${encodeURIComponent(mensaje)}`, '_blank'); }, 1000); setTimeout(() => { successPanel.style.display = 'none'; btnSubmit.disabled = false; btnSubmit.innerHTML = originalHTML; form.reset(); }, 3000); } else { throw new Error(result.message || 'Error al guardar los datos'); } } catch (error) { console.error('Error:', error); let tipoMensaje = ''; switch(tipoInteres) { case 'sesion-muestra': tipoMensaje = 'Quiero una Sesión de diagnóstico de ruta'; break; case 'examen-ubicacion': tipoMensaje = 'Me interesa un examen de ubicación'; break; case 'promocion-especial': tipoMensaje = 'Solicito una promoción especial'; break; } const mensaje = `🎓 *X-Learning Online* Hola, mi nombre es *${nombreValor}* 📧 Correo: ${emailValor} 📱 Teléfono: ${telefonoValor} *Interés:* ${tipoMensaje} Quisiera recibir más información. ¡Gracias!`; setTimeout(() => { successPanel.style.display = 'block'; window.open(`https://wa.me/525535678120?text=${encodeURIComponent(mensaje)}`, '_blank'); setTimeout(() => { successPanel.style.display = 'none'; btnSubmit.disabled = false; btnSubmit.innerHTML = originalHTML; form.reset(); }, 3000); }, 1000); } }); } setupFormValidation('form-aventura-form', 'nombre-aventura', 'email-aventura', 'telefono-aventura'); setupFormValidation('form-nivel-form', 'nombre-nivel', 'email-nivel', 'telefono-nivel'); setupFormValidation('form-promo-form', 'nombre-promo', 'email-promo', 'telefono-promo'); </script>
    <?php include 'includes/chatBot.php'; ?>
  </body> 
  </html>