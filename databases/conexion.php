<?php
$conexion =  mysqli_connect("localhost", "root", "", "escuela");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}


?>