<?php
require 'database.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Locker</title>
    <link href="css/Borrar_Locker.css" rel='stylesheet' />
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
            <li><a href="index.php">Salir</a></li>
        </ul>
   
    </nav>
       
    <h2> BORRAR LOCKER</h1>

    <!--DIV-->
    <div class="contenedor-botones"> 
        <h3> Seleccionar el locker que decea borrar </h3>
        
        <!-- Botones de opciones
        <input type="checkbox" id="locker1" class="boton-seleccion">
        <label for="locker1">
            <img src="Imagenes/locker.png" alt="Imagen" class="boton-imagen"> <br>  Locker 1
        </label>

        <input type="checkbox" id="locker2" class="boton-seleccion">
        <label for="locker2">
            <img src="Imagenes/locker.png" alt="Imagen" class="boton-imagen"> <br>  Locker 2
        </label>
        <input type="checkbox" id="locker3" class="boton-seleccion">
        <label for="locker3">
            <img src="Imagenes/locker.png" alt="Imagen" class="boton-imagen"> <br>  Locker 3
        </label>
        
        <input type="checkbox" id="locker4" class="boton-seleccion">
        <label for="locker4">
            <img src="Imagenes/locker.png" alt="Imagen" class="boton-imagen"> <br>  Locker 4
        </label>

        <input type="checkbox" id="locker5" class="boton-seleccion">
        <label for="locker5">
            <img src="Imagenes/locker.png" alt="Imagen" class="boton-imagen"> <br>  Locker 5
        </label> -->


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
        

        <br> <button type="button" id="boton-borrar">Eliminar</button>

    </div>

    <footer>
        <div class="line-green"></div>
        <div class="line-brown"></div>
      </footer>
<script src="/javascript/home.js"></script>


</body>
</html>