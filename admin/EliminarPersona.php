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
    <title>Consulta Persona</title>
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
            <div class="col-8" style="margin-top:3%;">
                <div class="table-responsive bg-white shadow-lg rounded p-4">
                    <h2 class="text-center mb-2">Consulta Persona</h2>
                    <a type="button" class="text-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
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
                                <th scope="col">Apellido Paterno</th>
                                <th scope="col">Apellido Materno</th>
                                <th scope="col">Eliminar</th>
                                <th scope="col">Editar</th>
                            </tr>
                        </thead>
                        <tbody class="table-primary">
                            <?php
                            require_once("../databases/conexion.php");
                            $i = 1;
                            $usuario = $conexion->query("SELECT * FROM persona");
                            if ($usuario->num_rows > 0) {
                                while ($cons = $usuario->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++; ?></th>
                                        <td><?php echo $cons["Nombre"]; ?> </td>
                                        <td><?php echo $cons["ApellidoP"]; ?> </td>
                                        <td><?php echo $cons["ApellidoM"]; ?> </td>
                                        <div style="justify-content: center;">
                                            <td><a onclick=editarPersona(<?php echo $cons["PersonaId"]; ?>,"<?php echo $cons['Nombre']; ?>","<?php echo $cons["ApellidoP"]; ?>","<?php echo $cons["ApellidoM"]; ?>") class="text-dark text-center btn btn-warning">+</a></td>
                                            <td><a onclick=eliminarPersona(<?php echo $cons['PersonaId']; ?>,"<?php echo $cons['Nombre']; ?>") class="text-dark text-center btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
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
                            <th scope="col">Apellido Paterno</th>
                            <th scope="col">Apellido Materno</th>
                            <th scope="col">Eliminar</th>
                            <th scope="col">Editar</th>
                        </tfoot>
                    </table>
                    <div class="mt-4">
                        <center>
                            <!-- inicio -->
                            <a href="RegistroPersona.php" class="text-decoration-none text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-skip-start-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM9.71 5.093 7 7.028V5.5a.5.5 0 0 0-1 0v5a.5.5 0 0 0 1 0V8.972l2.71 1.935a.5.5 0 0 0 .79-.407v-5a.5.5 0 0 0-.79-.407z" />
                                </svg>
                            </a>
                            <!-- anterior -->
                            <a href="RegistroPersona.php" class="text-decoration-none text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-caret-left-square-fill" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm10.5 10V4a.5.5 0 0 0-.832-.374l-4.5 4a.5.5 0 0 0 0 .748l4.5 4A.5.5 0 0 0 10.5 12z" />
                                </svg>
                            </a>
                            <!-- Siguiente -->
                            <a href="EliminarPersona.php" class="text-decoration-none text-dark">

                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4v8z" />
                                </svg>
                            </a>
                            <!-- final -->
                            <a href="EliminarPersona.php" class="text-decoration-none text-dark">

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
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Insertar Persona</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="shadow-lg mb-5" style="padding: 20px; border-radius:20px;background-color:#BEF0F8;" action="../databases/RegistroPersona.php" method="POST">
                        <h2 class="text-center mb-2">Registro Persona</h2>
                        <input type="hidden" name="ruta" value="<?php echo basename(__FILE__); ?>">
                        <div class="mb-3">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar Persona</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="shadow-lg mb-5" style="padding: 20px; border-radius:20px;background-color:#BEF0F8;" action="../databases/EditarPersona.php" method="POST">
                        <h2 class="text-center mb-2">Registro Persona</h2>
                        <div class="mb-3">
                            <input type="hidden" name="editu" id="editu">
                            <label for="nombre1" class="form-label">Nombre</label>
                            <input type="text" class="form-control border border-primary text-capitalize" name="nombre1" id="nombre1" placeholder="Nombre del alumno" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido1" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control border border-primary text-capitalize" style=" border-color: rgb(120, 128, 214);" name="apellido1" id="apellido1" placeholder="Apellido Paterno" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos1" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control border border-primary text-capitalize" style=" border-color: rgb(120, 128, 214);" name="apellidos1" id="apellidos1" placeholder="Apellido Materno" required>
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

        function eliminarPersona(eliminar, usuario) {
            Swal.fire({
                title: `¿Desea eliminar el Usuario ${usuario}?`,
                text: "Esto podria generar problemas en el sistema",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Eliminar',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../databases/EliminarPersona.php?eliminar=" + eliminar
                    // console.log(eliminar);
                }
            })
        }
        const btnModalEdit = new bootstrap.Modal(document.getElementById('staticBackdrop'));

        function editarPersona(id, eliminar, usuario, ape) {
            Swal.fire({
                title: `¿Desea editar el Usuario ${usuario}?`,
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
                    //   window.location.href = "../databases/editarUsuario.php?eliminar="+eliminar
                    document.getElementById('editu').value = id;
                    document.getElementById('nombre1').value = eliminar;
                    document.getElementById('apellido1').value = usuario;
                    document.getElementById('apellidos1').value =  ape;
                    btnModalEdit.show();
                    // console.log(eliminar);
                }
            })
        }
    </script>
    </script>
</body>

</html>