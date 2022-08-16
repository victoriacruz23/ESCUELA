<?php
require_once("conexion.php");
$editar = filter_var(file_get_contents("php://input"), FILTER_SANITIZE_NUMBER_INT);
$infTipo = $conexion->query("SELECT * FROM alumno WHERE Dni_Alum ='$editar'");
if ($infTipo) {
      while ($row = $infTipo->fetch_assoc()) {

            $eliminar =  $row["Dni_Alum"];
            $Nombre =  $row["Nombre"];
            $Apellido =  $row["Apellido"];
            $Direccion =  $row["Direccion"];
            $Poblacion =  $row["Poblacion"];
            $F_Nacimiento =  $row["F_Nacimiento"];
            $Cod_Postal =  $row["Cod_Postal"];
            $Telefono =  $row["Telefono"];
            $Dni =  $row["Dni"];
      }
      $respuesta = array(
            "eliminar" => "$eliminar",
            "Nombre" => "$Nombre",
            "Apellido" => "$Apellido",
            "Direccion" => "$Direccion",
            "Poblacion" => "$Poblacion",
            "F_Nacimiento" => "$F_Nacimiento",
            "Cod_Postal" => "$Cod_Postal",
            "Telefono" => "$Telefono",
            "Dni" => "$Dni",
      );
}
echo json_encode($respuesta);
$conexion->close();