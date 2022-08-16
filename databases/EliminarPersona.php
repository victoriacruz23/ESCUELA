<?php
require_once("conexion.php");
//print_r($_GET);
$eliminar = $_GET["eliminar"];
$delete = $conexion->query("DELETE FROM persona WHERE PersonaId = $eliminar");
if ($delete) {
    echo "
    <script> 
    alert('La Persona se elimino corectamente');
    window.location = '../admin/EliminarPersona.php';
    </script>";
    exit;
} else {
    echo "
    <script> 
    alert('La Persona no se elimino');
    window.location = '../admin/EliminarPersona.php';
    </script>";
    exit;
}
