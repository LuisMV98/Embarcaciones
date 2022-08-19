<?php
	session_start();

    $empre = $_REQUEST['emp'];
    $op = $_REQUEST['opcion'];
    
    include('../sesiones/conexion.php');

    $query   = ("SELECT * FROM empleados  WHERE empresa= $empre  AND tripulacion is NULL");
    $consulta = $mysqli->query($query);
    $cantidad = mysqli_num_rows($consulta);

    if($cantidad==0){
        if($op==1){
            header("location: selecciona_empresa.php?conf=0&opcion=$op");
        }
    }
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
                        <h5><i class="material-icons left">anchor</i>Seleccione la EMBARCACIÓN<i class="material-icons right">add</i></h5>
                    <?php }elseif($op==2){ ?>
                        <h5><i class="material-icons left">anchor</i>Seleccione la EMBARCACIÓN<i class="material-icons right">visibility</i></h5>
                    <?php } ?>
                </div><br>
                <div class="card-content">
                <?php if($op==1){ ?>
                    <form action="empleados_disponibles.php?opcion=<?php echo $op; ?>" method="post">    <!-- Formulario -->
                <?php }elseif($op==2){ ?>
                    <form action="ver_tripulacion.php" method="post">    <!-- Formulario 2-->
                <?php } ?>
                        <div class="form-field">
                            <input type="hidden" name="empres" value="<?php echo $empre ?>">
                            <label for="empresa"><i class="material-icons left">directions_boat</i>Embarcación</label>
                            <select class="form-control" name="embar" id="embarcacion" class="validate" required>
                                <option value="" disabled selected>Selecciona una opción</option>
                            <?php
                                $idEmp= $_REQUEST['emp'];

                                $query   = ("SELECT * FROM embarcaciones WHERE empresa= '".$idEmp."' ORDER BY nombre");
                                $consulta = $mysqli->query($query);
                                
                                while ($dataEmbarcacion = mysqli_fetch_array($consulta)){
                                    ?>
                                    <option value="<?php echo $dataEmbarcacion['idEmbarcacion']; ?>"><?php echo $dataEmbarcacion['nombre']; ?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </div><br><br>
                        <button type="submit" class="btn green darken-1" style="float: right;">Siguiente<i class="material-icons right">arrow_forward_ios</i></button>
                    </form>
                        <a href="selecciona_empresa.php?opcion=<?php echo $op; ?>"><button class="btn blue darken-1" style="float: left;"><i class="material-icons left">arrow_back_ios</i>Atrás</button></a>
                        <br><br>
                </div>
            </div>
        </div>
    </div>

    <a href="#alerta" class="modal-trigger"><button type="hidden" id="notrip"></button></a>
    <!-- Modal Alerta -->
    <div id="alerta" class="modal">
        <div class="modal-content orange lighten-4">
            <h4><i class="material-icons medium left orange-text text-darken-2">priority_high</i>La embarcación seleccionada aún no cuenta con una tripulación.</h4>
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
                            $("#notrip").click();
                        }
                    });
                </script>
        <?php
            }
        }
    ?>

</body>

</html>