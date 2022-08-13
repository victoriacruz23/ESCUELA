<?php
    require_once('conexion.php');
    // var_dump($_POST);
    $idRol = $_POST['idrol'];
    $nombreRol = $_POST['role'];
    //buscar si el id existe rol existe
    $consulta = $conexion->query("SELECT * FROM rol WHERE RolId = '$idRol'");
    // echo $consulta->num_rows;
    if($consulta->num_rows > 0){
        $roles = $conexion->query("SELECT * FROM rol WHERE RolNombre = '$nombreRol'");
        if($roles->num_rows>0){
            echo "
            <script> 
            alert('Ese rol ya existente');
            window.location = '../admin/consultaRol.php';
            </script>";
            exit;
        }else{
            $editar = $conexion->query("UPDATE rol SET RolNombre='$nombreRol' WHERE RolId = '$idRol'");
            if($editar){
                echo "
                <script> 
                alert('El rol se edito correctamente');
                window.location = '../admin/consultaRol.php';
                </script>";
                exit;
            }else{
                echo "
                <script> 
                alert('El rol no se logro editar');
                window.location = '../admin/consultaRol.php';
                </script>";
                exit;
            }
        }
        
    }else{
        echo "
    <script> 
    alert('El rol no se encontro');
    window.location = '../admin/consultaRol.php';
    </script>";
    exit;
    }
?>