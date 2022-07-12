<?php
require_once("conexion.php");
//print_r($_GET);
$alumno = $_GET["eliminar"];

$alumno = $conexion->query ("DELETE FROM alumno WHERE  Dni_Alum= $alumno");
if($alumno){   
    echo "
    <script> 
    alert('El alumno se elimino corectamente');
    window.location = '../admin/eliminaralumnos.php';
    </script>";
    exit;
}else{
    echo "
    <script> 
    alert('Error al eliminar alumno');
    window.location = '../admin/eliminaralumnos.php';
    </script>";
    exit;

}

?>