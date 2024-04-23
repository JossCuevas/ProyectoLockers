<?php
require 'database.php'; 

$sql = "SELECT id_tarjeta FROM tarjeta"; 
$result = mysqli_query($conexion, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode(['id_tarjeta' => $row['id_tarjeta']]);
} else {
    echo json_encode(['error' => 'No se pudo obtener la tarjeta']);
}
?>
