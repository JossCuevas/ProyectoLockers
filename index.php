<?php

require 'database.php';

if(isset($_POST['submit'])){ // Verifica si el formulario ha sido enviado
    if (isset($_POST['user']) && isset($_POST['password'])) {
        $usuario = $_POST['user'];
        $contraseña = $_POST['password'];
  
        $queryC = "SELECT usuario, contraseña FROM admin WHERE usuario = '$usuario'";
        $resultado = mysqli_query($conexion, $queryC);
  
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);
            $correo = $fila["usuario"]; //usuario
            $psw = $fila["contraseña"]; //contraseña
  
            if ($usuario == $correo && $contraseña == $psw) {
              header("Location: Home.php");
              exit();
              
            } else {
              echo '<script>alert("La contraseña no es correcta");</script>';
            }
        } else {
            echo '<script>alert("No existe este usuario");</script>';
        }
    } else {
        echo '<script>alert("Debe ingresar su usuario y contraseña");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/loginStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="content">
    <div class="container">
        <div class="secc1">
            <div class="imagenes">
                <img class="logo" src="https://vianco.uaemex.mx/wp-content/uploads/2020/05/vianco13about-360x239.png" alt="">
                <img class="logo2" src="https://fi.uaemex.mx/portal/images/fi/cabecera.png" alt="">
            </div>
            <div class="title-main">
                <h1>Smartlockerhub</h1>
                <h4>Sistema automatizado de lockers</h4>
            </div>
            <img src="https://i.pinimg.com/originals/2e/89/6b/2e896bb8144b6b0600daa0bc8d609a3d.png" class="lock" alt="">
        </div>
        <div class="secc2">
            <h1 class="title2">INICIAR SESIÓN</h1>
            <div class="form">
                
                <form action="" method="post"> <!-- Agrega method="post" y un name="submit" al botón -->
                    <div class="inputs">
                        <div class="input-with-icon">
                            <i class="bi bi-person-fill"></i>
                            <input type="text" required placeholder="Ingresa tu usuario" name="user">
                        </div>
                        <span class="message"></span>
                    </div>
                    <div class="inputs">
                        <div class="input-with-icon">
                            <i class="bi bi-lock-fill"></i>
                            <input type="password" placeholder="Ingresa tu contraseña" name="password">
                        </div>
                        <span class="message"></span>
                    </div>
                    <div class="btn">
                        <input type="submit" name="submit" required value="Iniciar sesión"> <!-- Agrega un name="submit" al botón -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="line-green"></div>
    <div class="line-brown"></div>
</footer>
</body>
</html>
