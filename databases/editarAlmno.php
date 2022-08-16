<?php
require_once("conexion.php");
$idalum = $_POST['idalum'];
$alumno1 = $_POST['alumno1'];
$apellidos1 = $_POST['apellidos1'];
$direccion1 = $_POST['direccion1'];
$Poblacion1 = $_POST['Poblacion1'];
$Fecha1 = $_POST['Fecha1'];
$Codigo1 = $_POST['Codigo1'];
$Telefono1 = $_POST['Telefono1'];
$Dni1 = $_POST['Dni1'];
$consulta = $conexion->query("UPDATE alumno SET Nombre='$alumno1',Apellido='$apellidos1',Direccion='$direccion1',Poblacion='$Poblacion1',F_Nacimiento='$Fecha1',Cod_Postal='$Codigo1',Telefono='$Telefono1',Dni='$Dni1' WHERE Dni_Alum= '$idalum'");
if($consulta){
    echo " <script>
            alert('Alumno actualizado correctamente');
            window.location = '../admin/eliminaralumnos.php';
        </script>";
}else{
    echo " <script>
            alert('Error al actualizar el alumno');
            window.location = '../admin/eliminaralumnos.php';
        </script>";
}