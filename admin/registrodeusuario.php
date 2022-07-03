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
    <title>Registro de Usario</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<header>
    <?php
    require_once("menu.php");
    ?>
</header>

<body style="background: linear-gradient(to right, #b0f2c2  ,#ffe4e1);">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-sm-6 col-md-6" style="margin-top:10%;">
                <form action="../databases/RegistroUsuario.php" method="POST">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Nickname</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="verifica" class="form-label">Verificacion de Contraseña</label>
                        <input type="password" class="form-control" name="verifica" id="verifica" required>

                    </div>
                    <div class="mb-3">
                        <label for="select" class="form-label">Tipos de rol</label>
                        <select class="form-select" name="select" id="select" aria-label="Default select example" required>
                            <option selected>Seleccionar un rol</option>
                            <!-- consulta -->
                            <?php
                            require_once("../databases/conexion.php");
                            $roles = $conexion->query("SELECT * FROM rol");
                            if ($roles->num_rows > 0) {
                                while ($t = $roles->fetch_assoc()) {
                            ?>

                                    <option value="<?php echo $t["RolId"] ?>"><?php echo $t["RolNombre"] ?></option>

                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <center>
        
                        <button type="submit" style="margin-right: 5%;" class="btn btn-primary">Registrar</button>
                        <button type="submit" style="margin-left: 5%" class="btn btn-success">Cancelar</button>
                    </center>
                </form>

            </div>
        </div>
    </div>
   <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>