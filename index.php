<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<style>
    body {
        height: 100%;
        background-repeat: no-repeat;
        background: url(https://www.greatschools.org/gk/wp-content/uploads/2020/08/BTS-soical-distancing-high-school-Spanish.jpg) no-repeat center center fixed;
        background-size: 100% 100%;
    }
</style>

<body>
    <!-- contenedor principal -->
    <div class="container">
        <!-- contenedor de filas -->
        <!-- <div class="row">  -->
        <!-- contendores de columnas -->
        <div class="row" style="justify-content: center; margin-top:5%;">

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
                <form action="databases/login.php" class="bg-white bg-opacity-75 shadow-lg p-3 mb-5 bg-body rounded" method="POST">
                    <center>
                        <img class="rounded-circle" width="100px" height="100px" src="https://utacapulco.edu.mx/images/logo-uta.png" alt="">
                    </center>
                    <h1 class="text-center text-uppercase">Inicio sesion</h1>
                    <div class="form-group mb-4">

                        <div class="mb-3">
                            <label for="usuario" class="fw-bold mb-2 fs-5 text-uppercase">Nombre del usuario</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="usuarioHelp" placeholder="Enter usuari" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="password" class="form-label fw-bold mb-2 fs-5 text-uppercase">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                        </center>
                </form>
                </form>
                <!-- crear cuenta -->
                <a href="RegistroUser.php">Registarme</a>
                <p class="text-center text-gray mt-3 mx-4">
                &copy;2022 Escuela UTA. Corp. Derechos reservados.
            </p>
            </div>
            
        </div>
    </div>
    <!-- scripts  -->
    </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>
