<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección</title>
    <link rel="icon" type="image/png" href="../img/logo.png">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>

    <!-- Nav bar -->
    <?php include '../templates/navbar.php';?>	

    <!-- Contenido -->
    <br><br><br><br><br><br>

    <div class="row">
        <div class="col s12 l4 offset-l4 m10 offset-m1">
            <div class="card z-depth-4">
                <div class="card-action black white-text">
                    <h5><i class="material-icons left">directions_boat</i>Seleccione la empresa</h5>
                </div><br>
                <div class="card-content">
                    <form action="ver_embarcaciones.php" method="post">    <!-- Formulario -->
                        <div class="form-field">
                            <label for="empresa"><i class="material-icons left">business</i>Empresa</label>
                            <select class="form-control" name="empres" id="empresa" class="validate" required>
                                <option value="" disabled selected>Selecciona una opción</option>
                            <?php
                                include('../sesiones/conexion.php');
                                
                                $query   = ("SELECT * FROM empresas WHERE embarcaciones<>0 ORDER BY nombre");
                                $consulta = $mysqli->query($query);
                                
                                while ($dataEmpresa = mysqli_fetch_array($consulta)){
                                    ?>
                                    <option value="<?php echo $dataEmpresa['idEmpresa']; ?>"><?php echo $dataEmpresa['nombre']; ?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </div><br><br>
                        <button type="submit" class="btn green darken-1" style="float: right;">Aceptar</button>
                    </form>
                        <a href="../usuarios/inicio.php"><button class="btn blue darken-1" style="float: left;">Cancelar</button></a>
                        <br><br>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php //include '../templates/footer.php';?>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
    });
    </script>

</body>

</html>