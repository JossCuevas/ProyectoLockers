<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['id_locker'], $_POST['estado_locker'])) {
        $id_locker = $_POST['id_locker'];
        $estado_locker = $_POST['estado_locker'];

        $sql = "INSERT INTO locker (id_locker, estado) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);

        if($stmt->execute([$id_locker, $estado_locker])) {
            echo '<script>alert("Locker registrado exitosamente");</script>';
        } else {
            echo '<script>alert("Hubo un error al registrar el locker");</script>';
        }
    } else {
        echo '<script>alert("No se recibieron los datos");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abrir Locker</title>
    <link href="css/Agregar_Locker.css" rel='stylesheet' />
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
       
    <h1> AGREGAR LOCKER</h1>

    <!--DIV-->
    <div class="contenedor-botones"> 
        <form id="formulario-locker" method="post" action="agregar_Locker.php">
        <h4> Identificador de locker </h4>
        <input id="id_locker" name="id_locker" class="identificador_locker" placeholder="Por ejemplo: A-20"> <br> <br>

        <label class="radio-container">
            <input type="radio" name="estado_locker" value="activo">
            <img src="Imagenes/Desocupado.png" alt="Opción 1" class="boton-imagen">
        </label>
        <label class="radio-container">
            <input type="radio" name="estado_locker" value="ocupado">
            <img src="Imagenes/Ocupado.png" alt="Opción 2" class="boton-imagen">
        </label>
    
        <br><br>
        <button type="submit" id="boton-agregar">Agregar</button>
</form>



    </div>

    <footer>
        <div class="line-green"></div>
        <div class="line-brown"></div>
      </footer>
<script src="/javascript/home.js"></script>


</body>
</html>