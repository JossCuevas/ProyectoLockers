<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="css/homeStyle.css">
</head>
<body>

    <!-- BARRA DE NAVEGACION -->
    <nav>
        <img src="https://vianco.uaemex.mx/wp-content/uploads/2020/05/vianco13about-360x239.png" alt="Logo" ">
        <ul id="menu">
             <li><a class="active" href="Home.php">Inicio</a></li>
            <li><a href="Registrar.php">Registrar</a></li>
            <li><a href="Registros.php">Registros</a></li>
            <li><a href="Agregar_Locker.php">Agregar lockers</a></li>
            <li><a href="Borrar_Locker.php">Eliminar locker</a></li>
            <li><a href="Reportes.php">Reportes</a></li>
            <li><a href="Abrir_Locker.php">Abrir locker</a></li>
            <li><a href="index.php">Salir</a></li>

        </ul>
        <div class="menu-icon" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            
        </div>
    </nav>
    <!-- AQUI VA EL CUERPO  LO METI DENTRO -->
    <div class="contenedor-home" id="contenedor-home">
        <h1>BIENVENIDO AL SISTEMA <br> SARTLOCKERHUB</h1>
        <div class="cont-img">
            <img class="img-home" src="https://cdn-icons-png.flaticon.com/512/177/177840.png" alt="">
        </div>
    </div>
    <footer>
        <div class="line-green"></div>
        <div class="line-brown"></div>
      </footer>
<script src="javascript/home.js"></script>
</body>
</html>
