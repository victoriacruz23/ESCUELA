<?php
require_once("conexion.php");
// print_r($_POST);
$usuario = $_POST ["usuario"];
$contra = $_POST ["password"];
// $consulta = $conexion-> query("");
$consulta = $conexion->query("SELECT * FROM usuario WHERE UsuarioNickName = '$usuario'");
// print_r($consulta->fetch_assoc());
if($consulta->num_rows == 1){
    while($info = $consulta->fetch_assoc()){
        $pass =  $info['UsuarioPassword'];
        $rol = $info['UsuarioRolId'];
    }
    // password_verify(Contreaseña sin hash, contraseña con hash)
    if (password_verify($contra, $pass)) {
        echo "<script>
        alert ('Bienvenido al sistema');
        if($rol == 1){
            window.location = '../admin/index.php';
           }else if($rol == 2){
            window.location = '../user/index.php';
           }
        </script>";
        exit;
    }else{
        echo "
        <script>
        alert('Contraseña incorrecta');
        window.location = '../index.php';
        </script>
        ";
    }
}else{
    echo "
    <script>
    alert('El usuario no existe');
    window.location = '../index.php';
    </script>
    ";
}
?>
