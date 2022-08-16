<?php
require_once("conexion.php");
//print_r($_POST);
$nuevorol = $_POST["rol"];
$ruta = $_POST["ruta"];
$roles = $conexion->query("SELECT * FROM rol WHERE RolNombre = '$nuevorol'");
if($roles->num_rows>0){
    echo "
    <script> 
    alert('Ese rol ya existente');
    window.location = '../admin/$ruta';
    </script>";
    exit;
}else{
    $insert = $conexion -> query("INSERT INTO rol(RolNombre) VALUES ('$nuevorol')");
if($insert){
    echo "
    <script> 
    alert('Se registro correctamente');
    window.location = '../admin/$ruta';
    </script>";
    exit;
}else{
    echo "
    <script> 
    alert('Error al insertar');
    window.location = '../admin/$ruta';
    </script>";
    exit;
}
}




?>