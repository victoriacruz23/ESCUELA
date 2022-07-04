<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

</style>

<body style="background: linear-gradient(to right, #b2e2f2, #d8f8e1);">
    <!-- contenedor principal -->
    <div class="container">
        <!-- contenedor de filas -->
        <div class="row">
            <!-- contendores de columnas -->
            <div class="row" style="justify-content: center;">
                <div class="col-sm-6 col-md-6" style="margin-top:10%;">
                    <form action="databases/login.php" method="POST">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Nombre del usuario</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                        </center>
                    </form>
                    </form>
                    <!-- crear cuenta -->
                    <a href="RegistroUser.php">Registarme</a>
                </div>
            </div>
        </div>
        <!-- scripts  -->
    </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>