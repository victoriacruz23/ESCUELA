<?php
require_once("conexion.php");
//print_r($_POST);
$nuevorol = $_POST["rol"];

$roles = $conexion->query("SELECT * FROM rol WHERE RolNombre = '$nuevorol'");
if($roles->num_rows>0){
    echo "
    <script> 
    alert('Ese rol ya existente');
    window.location = '../admin/consultaRol.php';
    </script>";
    exit;
}else{
    $insert = $conexion -> query("INSERT INTO rol(RolNombre) VALUES ('$nuevorol')");
if($insert){
    echo "
    <script> 
    alert('Se registro correctamente');
    window.location = '../admin/consultaRol.php';
    </script>";
    exit;
}else{
    echo "
    <script> 
    alert('Error al insertar');
    window.location = '../admin/consultaRol.php';
    </script>";
    exit;
}
}




?>