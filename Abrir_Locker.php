<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abrir Locker</title>
    <link href="css/Estilos.css" rel='stylesheet' />
</head>
<body>

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
            <li><a class="btn-salir" href="index.php">Salir</a></li>
        </ul>
        <div class="menu-icon" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </nav>
       
    <h1> ABRIR LOCKER</h1>

    <!--DIV-->
    <div class="contenedor-botones"> 
        <h3> Seleccionar el locker que desea abrir </h3>
        
        <!--Botones de opciones-->
        <?php
        require 'database.php';

        // Hacer la consulta para obtener los lockers desde la base de datos
        $sql = "SELECT id_locker FROM locker"; // Ajusta el nombre de la tabla y los campos según tu base de datos
        $resultado = $conexion->query($sql);

        // Verificar si hay resultados
        if ($resultado->num_rows > 0) {
            // Mostrar los resultados en forma de opciones de checkbox
            while ($row = $resultado->fetch_assoc()) {
                echo '<input type="checkbox" id="' . $row['id_locker'] . '" class="boton-seleccion">';
                echo '<label for="' . $row['id_locker'] . '">';
                echo '<img src="Imagenes/locker.png" alt="Imagen" class="boton-imagen"> <br>' . $row['id_locker'];
                echo '</label>';
            }
        } else {
            // Si no hay resultados, mostrar un mensaje de que no se encontraron lockers
            echo 'No se encontraron lockers.';
        }
        ?>


        <br> <button type="button" id="boton-abrir">Abrir</button>


    </div>

    <footer>
        <div class="line-green"></div>
        <div class="line-brown"></div>
      </footer>
<script src="/javascript/home.js"></script>


</body>
</html>