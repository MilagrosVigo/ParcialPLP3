<?php
require 'mv_conexion.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INMOBILIARIA GIRLY</title>
    <link rel="stylesheet" href="css/mv_estilos.css">
</head>
<body>
    <div class="encabezado">
        <p>LAS PROPIEDADES MAS TOP A UN CLICK DE DISTANCIA </p>
    </div>
    <header>
        <h1>INMOBILIARIA GIRLY</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="index.php?modulo=mv_inmuebles">Inmuebles</a></li>
            <li><a href="index.php?modulo=mv_agentes">Agentes Inmobiliarios</a></li>
            <li><a href="index.php?modulo=mv_login">Iniciar Sesion</a></li>
            <li><a href="index.php?modulo=mv_registro">Registro</a></li>
        </ul>
    </nav>
    
    <main>
        <?php
            if (!empty($_GET['modulo'])) {
                include('modulos/'.$_GET['modulo'].'.php');
            } else {
                include ('modulos/mv_inmuebles.php'); 
            }
        ?>
    </main>

    <script src="js/mv_script.js"></script>


    <footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>Contacto</h3>
            <p>Correo: info@inmobiliariagirly.com</p>
            <p>Teléfono: +123 456 7890</p>
        </div>
        <div class="footer-section">
            <h3>Enlaces Rápidos</h3>
            <ul class="footer-links">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php">Inmuebles</a></li>
                <li><a href="index.php?modulo=mv_agentes"> Agentes </a></li>
                <li><a href="index.php?modulo=mv_login"> Iniciar Sesion </a></li>
                <li><a href="index.php?modulo=mv_registro"> Registro </a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Síguenos</h3>
            <p>¡Síguenos en nuestras redes sociales!</p>
            <ul class="social-links">
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Inmobiliaria Girly. Todos los derechos reservados.</p>
    </div>
</footer>


</body>
</html>
