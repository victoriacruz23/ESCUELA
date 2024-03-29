<?php
session_start();
// evaluamos si ela variable sesion existe
if (isset($_SESSION["usuario"])) {
    // evalua que el id del rol sea diferente a 1 
    if ($_SESSION["usuario"]["UsuarioRolId"] != 1) {
        // si el id no es el id de un adminsitrador, se destruye la sesion
        // es decir cualquier id diferente a 1 no es administrador
        session_destroy();
        header("Location:../index.php ");
    } else {
        //No se realiza ninguna accion por que si es un administrador 
    }
} else {
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
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<header>
    <?php
    require_once("menu.php");
    ?>
</header>

<body style="background: linear-gradient(to right,#5695EC ,#3BEEAF);">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-sm-6 col-md-6" style="margin-top:4%;">
                <form class="shadow-lg bg-white mb-5" style="padding: 20px; border-radius:20px;" action="../databases/RegistroPersona.php" method="POST">
                    <h2 class="text-center mb-2">Registro Persona</h2>
                        <div class="mb-3">
                        <input type="hidden" name="ruta" value="<?php echo basename(__FILE__); ?>">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control border border-primary text-capitalize" name="nombre" id="nombre" placeholder="Nombre del alumno" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control border border-primary text-capitalize" style=" border-color: rgb(120, 128, 214);" name="apellido" id="apellido" placeholder="Apellido Paterno" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control border border-primary text-capitalize" style=" border-color: rgb(120, 128, 214);" name="apellidos" id="apellidos" placeholder="Apellido Materno" required>
                        </div>
                        <center>

                            <button type="submit" style="margin-right: 5%;" class="btn btn-primary">Registrar</button>
                        </center>
                </form>
                <div class="mt-4">
                    <center>
                        <!-- inicio -->
                        <a href="registrodeusuario.php" class="text-decoration-none text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-skip-start-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM9.71 5.093 7 7.028V5.5a.5.5 0 0 0-1 0v5a.5.5 0 0 0 1 0V8.972l2.71 1.935a.5.5 0 0 0 .79-.407v-5a.5.5 0 0 0-.79-.407z" />
                            </svg>
                        </a>
                        <!-- anterior -->
                        <a href="eliminarusuario.php" class="text-decoration-none text-dark">

                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-caret-left-square-fill" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm10.5 10V4a.5.5 0 0 0-.832-.374l-4.5 4a.5.5 0 0 0 0 .748l4.5 4A.5.5 0 0 0 10.5 12z" />
                            </svg>
                        </a>
                        <!-- Siguiente -->
                        <a href="consultaUsuario.php" class="text-decoration-none text-dark">

                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4v8z" />
                            </svg>
                        </a>
                        <!-- final -->
                        <a href="eliminarusuario.php" class="text-decoration-none text-dark">

                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-skip-end-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407L9.5 8.972V10.5a.5.5 0 0 0 1 0v-5a.5.5 0 0 0-1 0v1.528L6.79 5.093z" />
                            </svg>
                        </a>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>

</body>

</html>