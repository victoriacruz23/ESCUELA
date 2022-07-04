<?php
session_start();
// evaluamos si ela variable sesion existe
if(isset($_SESSION["usuario"])){
    // evalua que el id del rol sea diferente a 1 
    if($_SESSION["usuario"]["UsuarioRolId"] != 1){
        // si el id no es el id de un adminsitrador, se destruye la sesion
        // es decir cualquier id diferente a 1 no es administrador
       session_destroy();
       header("Location:../index.php ");  
    }else{
        //No se realiza ninguna accion por que si es un administrador 
    }
}else{
    // si la sesion no existe se dirige al index
 header("Location:../index.php ");  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<header>
    <?php
    require_once("menu.php");
    ?>
</header>

<body>
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-10" style="margin-top:10%;">
                <div class="table-responsive" style="height: 300px;">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Tipo de Rol</th>
                                <th scope="col">Nombre de usuario</th>
                                <th scope="col">Eliminar</th>

                            </tr>
                        </thead>
                        <tbody class="table-primary">
                            <?php
                    require_once("../databases/conexion.php");
                    $usuario = $conexion -> query("SELECT * FROM usuario INNER JOIN rol ON usuario.UsuarioRolId = rol.RolId");
                    if($usuario->num_rows > 0){
                        while($cons=$usuario->fetch_assoc()){
                ?>
                            <tr>
                                <th scope="row"><?php echo $cons["UsuarioId"]; ?></th>
                                <td><?php echo $cons["RolNombre"]; ?></td>
                                <td><?php echo $cons["UsuarioNickName"]; ?> </td>
                                <div style="justify-content: center;">
                                    <td><a href="../databases/EliminarUsuario.php?eliminar=<?php echo $cons['UsuarioId']; ?>"
                                            class="btn btn-danger">Eliminar</a></td>
                                </div>
                            </tr>
                            <?php  
                      }
                    }else{
                        echo "No existen usuarios";
                    }
                    ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <center>
    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
        class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
        <path
            d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg>
</center>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>