<?php
require_once('conexion.php');
$id = $_POST['iduseredit'];
$nombre = $_POST['usuario'];
$select = $_POST['select'];
//verificar si existe
$consulta = $conexion->query("SELECT * FROM usuario WHERE UsuarioId = '$id'");
if($consulta->num_rows == 1){
    //Validar si el rol exite
    if($select == 0){
       echo " <script>
       alert('Selecciona un rol');
       window.location = '../admin/eliminarusuario.php';
   </script>";
    }else{
        $actualizar = $conexion->query("UPDATE usuario SET UsuarioNickName='$nombre',UsuarioRolId='$select' WHERE UsuarioId = '$id'");
        if($actualizar){
            echo " <script>
            alert('El usuario se actualizo Correctamente');
            window.location = '../admin/eliminarusuario.php';
        </script>";
        }else{
            echo " <script>
            alert('Error al actualizar el usuario');
            window.location = '../admin/eliminarusuario.php';
        </script>";
        }
    }
}else{
    echo " <script>
    window.location = '../admin/eliminarusuario.php';
</script>";
}
