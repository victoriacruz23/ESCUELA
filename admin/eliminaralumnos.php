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
    <title>Eliminar Alumno</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>
<header>
    <?php
    require_once("menu.php");
    ?>
</header>

<body style="background: linear-gradient(to right,#5695EC ,#3BEEAF);">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-12" style="margin-top:3%;">
                <div class="table-responsive bg-white shadow-lg rounded p-4">
                    <h2 class="text-center mb-2">Eliminar Alumno</h2>
                    <a type="button" class="text-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                        </svg>
                    </a>
                    <table id="example" class="table table-striped table-hover" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nº</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Poblacion</th>
                                <th scope="col">Fecha Nacimiento</th>
                                <th scope="col">Curp</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody class="table-primary">
                            <?php
                            require_once("../databases/conexion.php");
                            $usuario = $conexion->query("SELECT * FROM alumno");
                            $i = 1;
                            if ($usuario->num_rows > 0) {
                                while ($cons = $usuario->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++ ?></th>
                                        <td><?php echo $cons["Nombre"]; ?></td>
                                        <td><?php echo $cons["Apellido"]; ?> </td>
                                        <td><?php echo $cons["Direccion"]; ?> </td>
                                        <td><?php echo $cons["Poblacion"]; ?> </td>
                                        <td><?php echo $cons["F_Nacimiento"]; ?> </td>
                                        <td><?php echo $cons["Dni"]; ?> </td>
                                        <div style="justify-content: center;">
                                            <td><a onclick=editarAlumno(<?php echo $cons['Dni_Alum']; ?>,"<?php echo $cons['Nombre']; ?>") class="text-dark text-center btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg></a></td>
                                            <td><a onclick=eliminarAlumno(<?php echo $cons['Dni_Alum']; ?>,"<?php echo $cons['Nombre']; ?>") class="text-dark text-center btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                    </svg></a></td>
                                        </div>
                                    </tr>

                            <?php
                                }
                            } else {
                                echo "No existen usuarios";
                            }
                            ?>

                        </tbody>
                        <tfoot class="table-dark">
                            <th scope="col">Nº</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Poblacion</th>
                            <th scope="col">Fecha Nacimiento</th>
                            <th scope="col">Curp</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tfoot>
                    </table>
                    <div class="mt-4">
                        <center>
                            <!-- inicio -->
                            <a href="registroalumno.php" class="text-decoration-none text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-skip-start-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM9.71 5.093 7 7.028V5.5a.5.5 0 0 0-1 0v5a.5.5 0 0 0 1 0V8.972l2.71 1.935a.5.5 0 0 0 .79-.407v-5a.5.5 0 0 0-.79-.407z" />
                                </svg>
                            </a>
                            <!-- anterior -->
                            <a href="consultaAlumno.php" class="text-decoration-none text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-caret-left-square-fill" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm10.5 10V4a.5.5 0 0 0-.832-.374l-4.5 4a.5.5 0 0 0 0 .748l4.5 4A.5.5 0 0 0 10.5 12z" />
                                </svg>
                            </a>
                            <!-- Siguiente -->
                            <a href="registroalumno.php" class="text-decoration-none text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4v8z" />
                                </svg>
                            </a>
                            <!-- final -->
                            <a href="eliminaralumnos.php" class="text-decoration-none text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-skip-end-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407L9.5 8.972V10.5a.5.5 0 0 0 1 0v-5a.5.5 0 0 0-1 0v1.528L6.79 5.093z" />
                                </svg>
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Registro Alumno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="shadow-lg bg-white mb-5" style="padding: 20px; border-radius:20px;" action="../databases/RegistroAlumno.php" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="ruta" value="<?php echo basename(__FILE__); ?>">
                            <label for="alumno" class="form-label">Nombre del alumno</label>
                            <input type="text" class="form-control border border-primary text-capitalize" name="alumno" id="alumno" placeholder="Nombre del alumno" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control border border-primary text-capitalize" style=" border-color: rgb(120, 128, 214);" name="apellidos" id="apellidos" placeholder="hola" required>
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label"> Direccion</label>
                            <input type="text" class="form-control border border-primary" name="direccion" id="direccion" placeholder="hola" required>
                        </div>
                        <div class="mb-3">
                            <label for="Poblacion" class="form-label">Poblacion</label>
                            <input type="text" class="form-control border border-primary" name="Poblacion" id="Poblacion" placeholder="hola" required>
                        </div>
                        <div class="mb-3">
                            <label for="Fecha" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control border border-primary" name="Fecha" id="Fecha" placeholder="hola" required>
                        </div>
                        <div class="mb-3">
                            <label for="Codigo" class="form-label">Codigo Postal</label>
                            <input type="number" class="form-control border border-primary" name="Codigo" id="Codigo" placeholder="hola" required>
                        </div>
                        <div class="mb-3">
                            <label for="Telefono" class="form-label">Telefono</label>
                            <input type="number" class="form-control border border-primary" name="Telefono" id="Telefono" placeholder="hola" required>
                        </div>
                        <div class="mb-3">
                            <label for="Dni" class="form-label">Curp</label>
                            <input type="text" class="form-control border border-primary" style=" border-color: rgb(120, 128, 214);" name="Dni" id="Dni" placeholder="hola" required onkeyup="this.value=this.value.toUpperCase()">
                        </div>
                        <center>
                            <button type="submit" style="margin-right: 5%;" class="btn btn-primary">Registrar</button>
                        </center>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar Alumno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="shadow-lg bg-white mb-5" style="padding: 20px; border-radius:20px;" action="../databases/editarAlmno.php" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="idalum" id="idalum">
                            <label for="alumno1" class="form-label">Nombre del alumno</label>
                            <input type="text" class="form-control border border-primary text-capitalize" name="alumno1" id="alumno1" placeholder="Nombre del alumno" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos1" class="form-label">Apellidos</label>
                            <input type="text" class="form-control border border-primary text-capitalize" style=" border-color: rgb(120, 128, 214);" name="apellidos1" id="apellidos1" placeholder="hola" required>
                        </div>
                        <div class="mb-3">
                            <label for="direccion1" class="form-label"> Direccion</label>
                            <input type="text" class="form-control border border-primary" name="direccion1" id="direccion1" placeholder="hola" required>
                        </div>
                        <div class="mb-3">
                            <label for="Poblacion1" class="form-label">Poblacion</label>
                            <input type="text" class="form-control border border-primary" name="Poblacion1" id="Poblacion1" placeholder="hola" required>
                        </div>
                        <div class="mb-3">
                            <label for="Fecha1" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control border border-primary" name="Fecha1" id="Fecha1" placeholder="hola" required>
                        </div>
                        <div class="mb-3">
                            <label for="Codigo1" class="form-label">Codigo Postal</label>
                            <input type="number" class="form-control border border-primary" name="Codigo1" id="Codigo1" placeholder="hola" required>
                        </div>
                        <div class="mb-3">
                            <label for="Telefono1" class="form-label">Telefono</label>
                            <input type="number" class="form-control border border-primary" name="Telefono1" id="Telefono1" placeholder="hola" required>
                        </div>
                        <div class="mb-3">
                            <label for="Dni1" class="form-label">Curp</label>
                            <input type="text" class="form-control border border-primary" style=" border-color: rgb(120, 128, 214);" name="Dni1" id="Dni1" placeholder="hola" required onkeyup="this.value=this.value.toUpperCase()">
                        </div>
                        <center>
                            <button type="submit" style="margin-right: 5%;" class="btn btn-primary">Editar</button>
                        </center>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                }
            });
        });
    </script>

    <script>
        const btnModalEdit = new bootstrap.Modal(document.getElementById('staticBackdrop1'));

        function eliminarAlumno(eliminar, usuario) {
            Swal.fire({
                title: `¿Desea eliminar el Alumno ${usuario}?`,
                text: "Esto podria generar problemas en el sistema",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../databases/EliminarAlumnos.php?eliminar=" + eliminar
                    // console.log(eliminar);
                }
            })
        }

        function editarAlumno(eliminar, usuario) {
            Swal.fire({
                title: `¿Desea editar el Alumno ${usuario}?`,
                text: "Esto podria generar problemas en el sistema",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Editar',
                cancelButtonText: 'Cancelar',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    // window.location.href = "../databases/editarAlumnos.php?eliminar=" + eliminar
                    fetch("../databases/solicitu.php",{
                        method: "POST",
                        body: eliminar
                    }).then(response => response.json()).then(response=>{
                        document.getElementById('idalum').value = response.eliminar;
                        document.getElementById('alumno1').value = response.Nombre;
                        document.getElementById('apellidos1').value = response.Apellido;
                        document.getElementById('direccion1').value = response.Direccion;
                        document.getElementById('Poblacion1').value = response.Poblacion;
                        document.getElementById('Fecha1').value = response.F_Nacimiento;
                        document.getElementById('Codigo1').value = response.Cod_Postal;
                        document.getElementById('Telefono1').value = response.Telefono;
                        document.getElementById('Dni1').value = response.Dni;
                    });
                    btnModalEdit.show();
                    // console.log(eliminar);
                }
            })
        }
    </script>
</body>

</html>