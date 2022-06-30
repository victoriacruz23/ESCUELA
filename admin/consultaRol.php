<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Rol</title>
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
            <div class="col-6" style="margin-top:10%;">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Tipo de Rol</th>
                        </tr>
                    </thead>
                    <tbody class="table-primary">
                    <?php
                    require_once("../databases/conexion.php");
                    $roles = $conexion -> query("SELECT * FROM rol");
                    if($roles->num_rows > 0){
                        while($t=$roles->fetch_assoc()){
                ?>
                        <tr>
                            <th scope="row"><?php echo $t["RolId"]; ?></th>
                            <td><?php echo $t["RolNombre"]; ?></td>
                        </tr>
                <?php  
                      }
                    }else{
                        echo "No existen roles";
                    }
                    ?>    
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>