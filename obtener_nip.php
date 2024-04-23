<?php
require 'database.php'; // Asegúrate de que el archivo database.php tenga la configuración de tu conexión a la base de datos

$sql = "SELECT nip FROM nip_estudiante"; // Ajusta tu_tabla y id según tu esquema de base de datos
$result = mysqli_query($conexion, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode(['nip' => $row['nip']]);
} else {
    echo json_encode(['error' => 'No se pudo obtener el NIP']);
}
?>
