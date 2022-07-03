<?php
require_once("conexion.php");
//print_r($_GET);
$delete = $_GET["eliminar"];

$delete = $conexion->query ("DELETE FROM usuario WHERE RolId= $delete");
if($delete){   
    echo "
    <script> 
    alert('El usuario se elimino corectamente');
    window.location = '../admin/consultaUsuario.php';
    </script>";
    exit;
}else{
    echo "
    <script> 
    alert('El usuario no se elimino');
    window.location = '../admin/consultaUsuario.php';
    </script>";
    exit;

}

?>