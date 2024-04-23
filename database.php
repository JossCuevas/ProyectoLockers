<?php
$servidor = "localhost";
$usuario = "root";
$pass = "cuevas24";
$bdname = "proyecto_lockers";

$conexion = new mysqli($servidor,$usuario,$pass, $bdname);
if($conexion->connect_error){
    die("Error de conexion:".$conexion->connect_error);

}
?>