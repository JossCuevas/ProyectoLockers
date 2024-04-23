<?php

require 'database.php';

    //Obteniendo lockers activos
    $sql = "SELECT id_locker FROM locker WHERE estado = 'Activo'";
    $result = mysqli_query($conexion, $sql);

    //lockers activos
    $lockers = array();

    if ($result) {
        // Recorrer los resultados y almacenarlos en el array $lockers
        while ($row = mysqli_fetch_assoc($result)) {
            $lockers[] = $row['id_locker'];
        }

      //haciendo el insert
      // Función para limpiar los datos ingresados en el formulario
      // function limpiarDatos($datos) {
      //   $datos = trim($datos);
      //   $datos = stripslashes($datos);
      //   $datos = htmlspecialchars($datos);
      //   return $datos;
      // }
      // Procesar el formulario cuando se envíe
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

        // Obtener el próximo ID
        $query = "SELECT MAX(id_usuario) AS max_id FROM usuario";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($result);
        $ultimoID = $row['max_id'];
        $nuevoID = $ultimoID + 1;
        // Limpiar y obtener los datos del formulario
        $nombre_alumno = $_POST['nombre_alumno'];
        $numero_cuenta = $_POST['numero_cuenta'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $nip = $_POST['nip'];
        $locker = $_POST['locker'];
        // $fechaIn = $_POST['fechaIn'];
        // $fechaFin = $_POST['fechaFin'];
        $id_tarjeta = $_POST['id_tarjeta'];

        //Para las fechas:
        // Obtener la fecha actual
        $fechaIn = date('Y-m-d');
        // Sumar 6 meses a la fecha actual para obtener la fecha de vencimiento
        $fechaFin = date('Y-m-d', strtotime('+6 months'));

        // Insertar datos en la base de datos
        $sql = "INSERT INTO usuario (id_usuario, nombre_alumno, numero_cuenta, num_telefono, email, pin, fecha_asignacion, id_tarjeta, fecha_finalizacion, id_locker) VALUES ('$nuevoID','$nombre_alumno', '$numero_cuenta', '$telefono', '$email', '$nip', '$fechaIn', '$id_tarjeta', '$fechaFin', '$locker')";
        if ($conexion->query($sql) === TRUE) {
          echo '<script>alert("Alumno registrado correctamente");</script>';
        } else {
          echo '<script>alert("Error al registrar al alumno");</script>';
        }

        //Para el historico
        $sql = "INSERT INTO reporte_historico (id_usuario, nombre_alumno, numero_cuenta, num_telefono, email, pin, fecha_asignacion, id_tarjeta, fecha_finalizacion, id_locker) VALUES ('$nuevoID','$nombre_alumno', '$numero_cuenta', '$telefono', '$email', '$nip', '$fechaIn', '$id_tarjeta', '$fechaFin', '$locker')";
        if ($conexion->query($sql) === TRUE) {
          // echo '<script>alert("Historial registrado correctamente");</script>';
        } else {
          // echo '<script>alert("Error al registrar al alumno");</script>';
        }

        //Actualizando el estado del locker
        $sql_locker = "UPDATE locker SET estado = 'Ocupado' WHERE id_locker = '$locker'";
        if ($conexion->query($sql_locker) === TRUE) {
            echo '<script>alert("Estado del locker actualizado correctamente");</script>';
        } else {
            echo '<script>alert("Error al actualizar el estado del locker");</script>';
        }
}

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrar</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/RegistrarStyle.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
  </head>
  <body>
    <nav>
      <img
      src="https://vianco.uaemex.mx/wp-content/uploads/2020/05/vianco13about-360x239.png"
      alt="Logo" ">
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
      <form action="#" method="POST">
        <h6>REGISTRAR</h6>
        <div class="form">
          <div class="form-secc1">
            <div>
              <label for="exampleInputEmail1" class="form-label">Nombre del Alumno</label>
              <input
                type="text"
                required
                class="form-control"
                id="nomAl"
                name="nombre_alumno"
                aria-describedby="emailHelp"
              />
            </div>
            <div>
              <label for="exampleInputEmail1" class="form-label"
                >Numero de cuenta</label
              >
              <input
                type="number"
                required
                class="form-control"
                id="nomAl"
                name="numero_cuenta"
                aria-describedby="emailHelp"
              />
            </div>
            <div>
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input
                type="email"
                required
                class="form-control"
                id="nomAl"
                name="email"
                aria-describedby="emailHelp"
              />
            </div>
            <div>
              <label for="exampleInputEmail1" class="form-label">Numero de telefono</label>
              <input
                type="tel"
                required
                class="form-control"
                id="nomAl"
                name="telefono"
                aria-describedby="emailHelp"
              />
            </div>
            
              <label for="exampleInputEmail1" class="form-label">Nip de estudiante</label
              >
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              <div class="tarjeta">
              <input
              
                required
                class="form-control"
                id="nip"
                name="nip"
                aria-describedby="emailHelp"
              />
              <button type="button" id="obtener-nip" class="btn">Obtener</button>
            </div>
          </div>
          <script>
        $(document).ready(function() {
            $('#obtener-nip').click(function() {
                $.ajax({
                    url: 'obtener_nip.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        $('#nip').val(response.nip);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
          <div class="form-secc2">
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Numero Locker</label>
            <select id="disabledSelect" name="locker" class="form-select">
                <!-- Generar opciones de la lista desplegable desde PHP -->
                <?php foreach ($lockers as $locker): ?>
                    <option value="<?php echo $locker; ?>"><?php echo $locker; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
            <div>
              <label for="exampleInputEmail1" class="form-label">Fecha de asignacion</label>
              <input
                type="text"
                required
                disabled
                class="form-control"
                id="fechaIn"
                name="fechaIn"
                aria-describedby="emailHelp"
              />
            </div>
            <div>
              <label for="exampleInputEmail1" class="form-label">Fecha de vencimiento</label>
              <input
                type="text"
                required
                disabled
                class="form-control"
                id="fechaFin"
                name="fechaFin"
                aria-describedby="emailHelp"
              />
            </div>
            <label for="exampleInputEmail1" class="form-label">Numero de tarjeta asociada</label>
            <div class="tarjeta">
                <div>
                    <input
                      type="text"
                      required
                      class="form-control"
                      id="id_tarjeta"
                      name="id_tarjeta"
                      aria-describedby="emailHelp"
                    />
                  </div>
                    <button  type="button" id="obtener-tarjeta" class="btn">Detectar</button>
            </div>
            
          </div>
        </div>
        <script>
        $(document).ready(function() {
            $('#obtener-tarjeta').click(function() {
                $.ajax({
                    url: 'obtener_tarjeta.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        $('#id_tarjeta').val(response.id_tarjeta);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
      <button type="submit" name="submit" class="btn2">Registrar</button>
      </form>
    </div>

    <footer>
      <div class="line-green"></div>
      <div class="line-brown"></div>
    </footer>

    <script src="javascript/registrar.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
