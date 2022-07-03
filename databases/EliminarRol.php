<?php
require_once("conexion.php");
//print_r($_GET);
$eliminar = $_GET["eliminar"];

$delete = $conexion->query ("DELETE FROM rol WHERE RolId= $eliminar");
if($delete){   
    echo "
    <script> 
    alert('El rol se elimino corectamente');
    window.location = '../admin/consultaRol.php';
    </script>";
    exit;
}else{
    echo "
    <script> 
    alert('El rol no se elimino');
    window.location = '../admin/consultaRol.php';
    </script>";
    exit;

}

?>