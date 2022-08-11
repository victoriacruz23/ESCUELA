<?php
require_once("conexion.php");
//print_r($_GET);
$editar = $_GET["editar"];
$consulta = $conexion->query("SELECT * FROM usuario WHERE UsuarioRolId = '$editar'");
if ($consulta->num_rows != 0) {
    echo "
    <script> 
    alert('El Alumno no se puede eliminar');
    window.location = '../admin/consultaAlumno.php';
    </script>";
    exit;
} else {
    $update = $conexion->query("DELETE FROM rol WHERE RolId= $editar");
    if ($delete) {
        echo "
    <script> 
    alert('El Alumno se edito corectamente');
    window.location = '../admin/consultaRol.php';
    </script>";
        exit;
    } else {
        echo "
    <script> 
    alert('El Alumno no se edito');
    window.location = '../admin/consultaRol.php';
    </script>";
        exit;
    }
}
