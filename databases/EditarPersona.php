<?php
require_once ("conexion.php");
//print_r($_POST);
$editu = $_POST["editu"];
$nombre = $_POST["nombre1"];
$apellido = $_POST["apellido1"];
$apellidos = $_POST["apellidos1"];

//exit;
        $insertar = $conexion -> query("UPDATE persona SET Nombre='$nombre',ApellidoP='$apellido',ApellidoM='$apellidos' WHERE PersonaId = '$editu'");
        if($insertar){
           echo "
           <script>
           alert('La persona se editado correctamente');
           window.location = '../admin/EliminarPersona.php';
           </script>
           ";
           }else{
               echo "
               <script>
               alert('Error al editado persona');
               window.location = '../admin/EliminarPersona.php';
               </script>
               ";
           }
    

  





?>