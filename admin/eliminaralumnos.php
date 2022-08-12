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
    <title>Consulta Alumno</title>
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
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-hover" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Id</th>
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
                        <tbody class="table-danger">
                            <?php
                            require_once("../databases/conexion.php");
                            $usuario = $conexion->query("SELECT * FROM alumno");
                            if ($usuario->num_rows > 0) {
                                while ($cons = $usuario->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $cons["Dni_Alum"]; ?></th>
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
                            <th scope="col">Id</th>
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
                            <a style="margin-right: 20px;" href="consultaAlumno.php" class="text-dark"> <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                                </svg></a>
                            <a style="margin-left: 20px;" href="registroalumno.php" class="text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                    <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                </svg>
                            </a>
                        </center>
                    </div>
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
        function eliminarAlumno(eliminar,usuario) {
            Swal.fire({
                title: `¿Desea eliminar el Alumno ${usuario}?`,
                text: "Esto podria generar problemas en el sistema",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Eliminar',
                cancelButtonText:'Cancelar',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "../databases/EliminarAlumnos.php?eliminar="+eliminar
                // console.log(eliminar);
                }
            })
        }
        function editarAlumno(eliminar,usuario) {
            Swal.fire({
                title: `¿Desea editar el Alumno ${usuario}?`,
                text: "Esto podria generar problemas en el sistema",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Editar',
                cancelButtonText:'Cancelar',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "../databases/editarAlumnos.php?eliminar="+eliminar
                // console.log(eliminar);
                }
            })
        }
    </script>
</body>

</html>