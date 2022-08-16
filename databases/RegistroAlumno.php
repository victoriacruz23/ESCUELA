<?php
require_once ("conexion.php");
//print_r($_POST);
$alumno = $_POST["alumno"];
$apellidos = $_POST["apellidos"];
$direccion= $_POST["direccion"];
$Poblacion = $_POST["Poblacion"];
$Fecha = $_POST["Fecha"];
$Codigo = $_POST["Codigo"];
$Telefono = $_POST["Telefono"];
$Dni = $_POST["Dni"];
$ruta = $_POST["ruta"];

//exit;

$busca = $conexion-> query("SELECT * FROM alumno WHERE Dni= '$Dni'");
if($busca->num_rows > 0){
    echo "
    <script> 
    alert('El alumno ya existe');
    window.location = '../admin/$ruta';
    </script>";
    exit;
    }else{
        $insertar = $conexion -> query("INSERT INTO alumno(Nombre, Apellido, Direccion, Poblacion, F_Nacimiento, Cod_Postal,Telefono,Dni) 
        values ('$alumno','$apellidos','$direccion','$Poblacion','$Fecha','$Codigo','$Telefono','$Dni')");
        if($insertar){
           echo "
           <script>
           alert('El alumno se registro correctamente');
           window.location = '../admin/$ruta';
           </script>
           ";
           }else{
               echo "
               <script>
               alert('Error al registrar alumno');
               window.location = '../admin/$ruta';
               </script>
               ";
           }
    }
    

  





?>