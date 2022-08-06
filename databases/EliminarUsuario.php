<?php
require_once("conexion.php");
//print_r($_GET);

if($_GET["eliminar"]){ 

    $delete = $_GET["eliminar"];
    $delete = $conexion->query ("DELETE FROM usuario WHERE UsuarioId= $delete");  
 echo "
 <script>
    window.location = '../admin/eliminarusuario.php';
</script>
 ";
    
}
    
?>
