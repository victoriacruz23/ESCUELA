<?php
require_once ("conexion.php");
//print_r($_POST);
$nickname = $_POST["usuario"];
$password = $_POST["password"];
$password1 = $_POST["verifica"];

//exit;

$busqueda = $conexion-> query("SELECT * FROM usuario WHERE UsuarioNickname = '$nickname'");
if($busqueda->num_rows > 0){
    echo "
    <script> 
    alert('El nickname ya existente');
    window.location = '../RegistroUser.php';
    </script>";
    exit;
    }
    if($password == $password1){
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    if (!empty($_POST["select"])) {
        $rol=$_POST["select"];
        $insertar = $conexion -> query("INSERT INTO usuario(UsuarioRolId,UsuarioNickName,UsuarioPassword)
                         values ($rol,'$nickname','$password_hash')");
                         if($insertar){
                            echo "
                            <script>
                            alert('Se registro correctamente');
                            window.location = '../admin/registrodeusuario.php';
                            </script>
                            ";
                            }else{
                                echo "
                                <script>
                                alert('Error al registrar');
                                window.location = '../admin/registrodeusuario.php';
                                </script>
                                ";
                            }
        }else{
        $insertar = $conexion -> query("INSERT INTO usuario(UsuarioRolId,UsuarioNickName,UsuarioPassword)
                         values ('2','$nickname','$password_hash')");
                         if($insertar){
                            echo "
                            <script>
                            alert('Se registro correctamente');
                            window.location = '../index.php';
                            </script>
                            ";
                            }else{
                                echo "
                                <script>
                                alert('Error al registrar');
                                window.location = '../RegistroUser.php';
                                </script>
                                ";
                            }
        }
        
        
    }else{
    echo "<script>
    alert('Las contrase??as no coiciden');
    window.location = '../RegistroUser.php';
    </script>";
    }

    ?>





?>