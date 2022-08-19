<?php
	session_start();
    $op = $_REQUEST['opcion'];
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
                    <?php if($op==1){ ?>
                        <h5><i class="material-icons left">anchor</i>Seleccione la EMPRESA<i class="material-icons right">add</i></h5>
                    <?php }elseif($op==2){ ?>
                        <h5><i class="material-icons left">anchor</i>Seleccione la EMPRESA<i class="material-icons right">visibility</i></h5>
                    <?php } ?>
                </div><br>
                <div class="card-content">
                    <form action="selecciona_embarcacion.php?opcion=<?php echo $op; ?>" method="post">    <!-- Formulario -->
                        <div class="form-field">
                            <label for="empresa"><i class="material-icons left">business</i>Empresa</label>
                            <select class="form-control" name="emp" id="emp" class="validate" required>
                                <option value="" disabled selected>Selecciona una opción...</option>
                            <?php
                                include('../sesiones/conexion.php');
                                
                                $query   = ("SELECT * FROM empresas WHERE embarcaciones<>0 AND empleados<>0 ORDER BY nombre");
                                $consulta = $mysqli->query($query);
                                
                                while ($dataEmpresa = mysqli_fetch_array($consulta)){
                                    ?>
                                    <option value="<?php echo $dataEmpresa['idEmpresa']; ?>"><?php echo $dataEmpresa['nombre']; ?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </div><br><br>
                        <button type="submit" class="btn green darken-1" style="float: right;">Siguiente<i class="material-icons right">arrow_forward_ios</i></button>
                    </form>
                        <a href="../usuarios/inicio.php"><button class="btn blue darken-1" style="float: left;">Cancelar</button></a>
                        <br><br>
                </div>
            </div>
        </div>
    </div>

    <a href="#agregado" class="modal-trigger aler"><button type="hidden" id="listo"></button></a>
    <!-- Modal Agregado -->
    <div id="agregado" class="modal">
        <div class="modal-content green lighten-4">
            <h4><i class="material-icons medium left green-text text-darken-2">check_circle</i>Nueva tripulación agregada.</h4>
        </div>
        <div class="modal-footer green lighten-4">
            <a href="#" class="btn modal-close green darken-1">Aceptar</a>
        </div>
    </div>

    <a href="#alerta" class="modal-trigger aler"><button type="hidden" id="noempleados"></button></a>
    <!-- Modal Agregado -->
    <div id="alerta" class="modal">
        <div class="modal-content orange lighten-4">
            <h4><i class="material-icons medium left orange-text text-darken-2">priority_high</i>La empresa seleccionada no cuenta con empleados disponibles.</h4>
        </div>
        <div class="modal-footer orange lighten-4">
            <a href="#" class="btn modal-close orange darken-1">Aceptar</a>
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

    <?php
        if(isset($_REQUEST['conf'])){
            if($_REQUEST['conf']==0){
        ?>
                <script>
                    $(document).ready(function(){
                        setTimeout(clickbutton,200);
                        function clickbutton(){
                            $("#noempleados").click();
                        }
                    });
                </script>
        <?php
            }
            if($_REQUEST['conf']==1){
        ?>
                <script>
                    $(document).ready(function(){
                        setTimeout(clickbutton,200);
                        function clickbutton(){
                            $("#listo").click();
                        }
                    });
                </script>
        <?php
            }
        }
    ?>

</body>

</html>