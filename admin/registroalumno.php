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
    <title>Registro de Alumnos</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<header>
    <?php
    require_once("menu.php");
    ?>
</header>

<body style="background: linear-gradient(to right, #b0f2c2  ,#ffe4e1);">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-sm-6 col-md-6" style="margin-top:5%;">
                <form class="shadow-lg bg-white mb-5" style="padding: 20px; border-radius:20px;"
                    action="../databases/RegistroAlumno.php" method="POST">
                    <div class="mb-3">
                        <label for="alumno" class="form-label">Nombre del alumno</label>
                        <input type="text" class="form-control border border-primary" name="alumno" id="alumno"
                            placeholder="Nombre del alumno" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" style=" border-color: rgb(120, 128, 214);"
                            name="apellidos" id="apellidos" placeholder="hola" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label"> Direccion</label>
                        <input type="text" class="form-control border border-primary" name="direccion" id="direccion"
                            placeholder="hola" required>
                    </div>
                    <div class="mb-3">
                        <label for="Poblacion" class="form-label">Poblacion</label>
                        <input type="text" class="form-control border border-primary" name="Poblacion" id="Poblacion"
                            placeholder="hola" required>
                    </div>
                    <div class="mb-3">
                        <label for="Fecha" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control border border-primary" name="Fecha" id="Fecha"
                            placeholder="hola" required>
                    </div>
                    <div class="mb-3">
                        <label for="Codigo" class="form-label">Codigo Postal</label>
                        <input type="number" class="form-control border border-primary" name="Codigo" id="Codigo"
                            placeholder="hola" required>
                    </div>
                    <div class="mb-3">
                        <label for="Telefono" class="form-label">Telefono</label>
                        <input type="number" class="form-control border border-primary" name="Telefono" id="Telefono"
                            placeholder="hola" required>
                    </div>
                    <div class="mb-3">
                        <label for="Dni" class="form-label">Dni</label>
                        <input type="number" class="form-control " style=" border-color: rgb(120, 128, 214);" name="Dni"
                            id="Dni" placeholder="hola" required>
                    </div>


                    <center>

                        <button type="submit" style="margin-right: 5%;" class="btn btn-primary">Registrar</button>
                        <button type="submit" style="margin-left: 5%" class="btn btn-success">Cancelar</button>
                    </center>
                    <div class="mt-4">
                        <center>
                            <a style="margin-right: 20px;" href="eliminaralumnos.php" class="text-dark"> <svg
                                    xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                    class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                                </svg></a>
                            <a style="margin-left: 20px;" href="consultaAlumno.php" class="text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                    class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                </svg>
                            </a>
                        </center>
                    </div> 
                </form>

            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>