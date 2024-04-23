<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/RegistrosStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
        <div class="menu-icon" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </nav>
    <!-- AQUI VA EL CUERPO  LO METI DENTRO -->
    <div class="contenedor-home" id="contenedor-home">
        <h1>REGISTROS</h1>
        <div class="btn-section">
            <a class="btn-agregar" href="Registrar.php">+ Agregar</a>
        </div>
        <div class="table-responsive">
            <caption>Lista de registros</caption>
            <table class="table">
                <thead class="head">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">ID LOCKER</th>
                    <th scope="col">ACCION</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td><input class="entrada" type="text" value="Victor Daniel Archundia Sanchez" disabled></td>
                    <td>
                      <select class="entrada" disabled>
                        <option value="3-A">3-A</option>
                      </select>
                    </td>
                    <td class="icons"> 
                        <button class="btn editar" onclick="habilitarEdicion(this)">  <i class="bi bi-pencil-square"></i></button>
                        <button class="btn borrar" onclick="confirmarBorrado(this)"> <i class="bi bi-trash"></i></button>
                        <button class="btn guardar" onclick="guardarCambios(this)" disabled><i class="bi bi-floppy"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td><input class="entrada" type="text" value="Victor Daniel Archundia Sanchez" disabled></td>
                    <td>
                      <select class="entrada" disabled>
                        <option value="3-A">3-A</option>
                      </select>
                    </td>
                    <td class="icons"> 
                        <button class="btn editar" onclick="habilitarEdicion(this)">  <i class="bi bi-pencil-square"></i></button>
                        <button class="btn borrar" onclick="confirmarBorrado(this)"> <i class="bi bi-trash"></i></button>
                        <button class="btn guardar" onclick="guardarCambios(this)" disabled><i class="bi bi-floppy"></i></button>
                    </td>
                  </tr>
                </tbody>
            </table>
          </div>
    </div>
    
    <footer>
        <div class="line-green"></div>
        <div class="line-brown"></div>
      </footer>

<script src="javascript/registros.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>