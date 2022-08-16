<?php
require_once ("conexion.php");
//print_r($_POST);
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$apellidos = $_POST["apellidos"];
$ruta = $_POST["ruta"];

//exit;
        $insertar = $conexion -> query("INSERT INTO persona(Nombre, ApellidoP, ApellidoM) VALUES ('$nombre','$apellido','$apellidos')");
        if($insertar){
           echo "
           <script>
           alert('La persona se registro correctamente');
           window.location = '../admin/$ruta';
           </script>
           ";
           }else{
               echo "
               <script>
               alert('Error al registrar persona');
               window.location = '../admin/$ruta';
               </script>
               ";
           }
    

  





?>