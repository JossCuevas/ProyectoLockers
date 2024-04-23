<?php
    require 'database.php';
   
   // Consulta para obtener la cantidad de lockers y la cantidad de lockers ocupados
      $sql_total_lockers = "SELECT COUNT(*) AS total_lockers FROM locker";
      $sql_lockers_ocupados = "SELECT COUNT(*) AS lockers_ocupados FROM locker WHERE estado = 'Ocupado'";

      $result_total_lockers = $conexion->query($sql_total_lockers);
      $result_lockers_ocupados = $conexion->query($sql_lockers_ocupados);

      if ($result_total_lockers->num_rows > 0 && $result_lockers_ocupados->num_rows > 0) {
        // Obtener los datos de la consulta
        $row_total_lockers = $result_total_lockers->fetch_assoc();
        $row_lockers_ocupados = $result_lockers_ocupados->fetch_assoc();
        $lockers_activos = $row_total_lockers["total_lockers"];
        $lockers_ocupados = $row_lockers_ocupados["lockers_ocupados"];
      } else {
        $lockers_activos = 0;
        $lockers_ocupados = 0;
      }

      // Cerrar la conexión
      $conexion->close();

      // Convertir los datos en un array para enviarlos al frontend
      $data = array(
        "lockers_activos" => $lockers_activos,
        "lockers_ocupados" => $lockers_ocupados
      );

      // Convertir el array a JSON y enviarlo al frontend
      echo '<script>var lockerData = ' . json_encode($data) . ';</script>';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reportes</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
    <link href="css/Reportes_Style.css" rel='stylesheet' />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<!-- encabezado -->
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

<h2>GENERADOR DE REPORTES</h2> 

<!-- Barra lateral -->
<div class="vertical-sidebar"><br>
    <ul>
        <li><a class="btn-menuV" onclick="mostrarPDF('reporte2.php')">Reporte de los usuarios activos</a></li> <hr><br> 
        <li><a class="btn-menuV" onclick="mostrarPDF('reporte1.php')">Reporte historico</a></li> <hr> <br> 
        <li><a class="btn-menuV" onclick="showDatePrompt2()">Reporte por semestre</a></li>
    </ul>
</div>

<!-- Contenedor para la gráfica -->
<div id="pdfContainer">
    <canvas id="graficaLockers"></canvas>
</div>

<!-- Popup para generar reporte -->
<div class="popup2" id="datePopup">
    <span class="close-icon" onclick="closeDatePopup()">&#10006;</span>
    <h3 class="titulo-recuadro">GENERACIÓN DE REPORTE</h3>
    <h3>Selecciona el rango de las fechas:</h3>
    <div class="custom-select2">
        <h4 class ="h4" for="startDate">Fecha de inicio:</h4>
        <input type="date" id="startDate" name="startDate" class="date-input first">
        <h5 class ="h5" for="endDate">Fecha de fin:</h5>
        <input type="date" id="endDate" name="endDate" class="date-input second"> 
    </div>
    <h6 class="h6" for="caja">Ingresa tus datos de Facilitador:</h6>
    <h7 class="h7" for="numeroU">Numero de usuario:</h7>
    <div class="numeroU">
        <input name="usuario" type="text">
    </div>
    <h8 class="h8">Nombre:</h8>
    <div class="nombreU">
        <input name="nombreU" type="text">
    </div>
    <button class="edit-button33" onclick="generateDateReport()">Generar Reporte</button>
</div>

<!-- Script para la gráfica -->
<script>
    var graficaLockers = new Chart('graficaLockers', {
    type: 'pie',
    data: {
        labels: ['Lockers Activos', 'Lockers Ocupados'],
        datasets: [{
            label: 'Cantidad de Lockers',
            data: [lockerData.lockers_activos, lockerData.lockers_ocupados],
            backgroundColor: [
                'rgba(54, 162, 235, 0.5)', // Color para Lockers Activos
                'rgba(255, 99, 132, 0.5)'   // Color para Lockers Ocupados
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 50,
                right: 50,
                top: 50,
                bottom: 50
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'bottom'
            }
        }
    }
});

</script>

<script>
    function mostrarPDF(pdf) {
      var container = document.getElementById('pdfContainer');
      container.innerHTML = '<iframe src="' + pdf + '" width="100%" height="100%" style="border: none;"></iframe>';
    }
  </script>

<footer>
    <div class="line-green"></div>
    <div class="line-brown"></div>
</footer>
</body>
</html>
