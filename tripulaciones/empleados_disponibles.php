<?php
	session_start();
	if(!isset($_SESSION['corr']))
	{
		header("Location: cerrar_sesion.php");
	}
    $empre = $_REQUEST['empres'];
    $emba = $_REQUEST['embar'];
    $op = $_REQUEST['opcion'];
    
    include('../sesiones/conexion.php');
    $link = Conectar();

    $query   = ("SELECT nombre FROM empresas  WHERE idEmpresa= '".$empre."' ");
    $consulta = mysqli_query($link, $query);
    $dataEmpresa = mysqli_fetch_array($consulta);
    $emperesa = $dataEmpresa['nombre'];

    $query   = ("SELECT * FROM empleados  WHERE empresa= $empre  AND tripulacion is NULL ORDER BY nombre");
    $consulta = mysqli_query($link, $query);
    $cantidad = mysqli_num_rows($consulta);

    if($cantidad==0){
        if($op==2){
            header("location: ver_tripulacion.php?conf=2&empres=$empre&embar=$emba");
        }
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrega || Tripulación</title>
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
    <div class="container">
        <div> 
            <i class="material-icons medium left">anchor</i><h3>Empleados disponibles de <?php echo $emperesa; ?> ( <?php echo $cantidad; ?> ):</h3>
        </div>

        <form action="registra_tripulacion.php" method="post">
            <input type="hidden" name="empres" value="<?php echo $empre ?>">
            <input type="hidden" name="embarc" value="<?php echo $emba ?>">
            <input type="hidden" name="opcion" value="<?php echo $op ?>">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($dataEmpleado = mysqli_fetch_array($consulta)) { ?>
                                <tr>
                                    <td><?php echo $dataEmpleado['nombre']; ?></td>
                                    <td><?php echo $dataEmpleado['correo']; ?></td>
                                    <td><?php echo $dataEmpleado['telefono']; echo $dataEmpleado['tripulacion']; ?></td>
                                    
                                <td> 
                                    <p>
                                    <label>
                                        <input type="checkbox" class="filled-in" name="le[]" value="<?php echo $dataEmpleado['idEmpleado']; ?>"/>
                                        <span class="green-text">SELECCIONAR</span>
                                    </label>
                                    </p>
                                </td>
                                </tr>
                        <?php } ?>
                </table>
            </div><br><br>
            <button type="submit" class="btn green darken-1" style="float: right;">Aceptar</button>
        </form>
            <?php if($op==1){ ?>
                <a href="selecciona_embarcacion.php?opcion=<?php echo $op; ?>&emp=<?php echo $empre;?>"><button class="btn blue darken-1" style="float: left;"><i class="material-icons left">arrow_back_ios</i>Atrás</button></a>
            <?php }elseif($op==2){ ?>
                <a href="ver_tripulacion.php?empres=<?php echo $empre;?>&embar=<?php echo $emba;?>"><button class="btn blue darken-1" style="float: left;">Cancelar</button></a>
            <?php } ?>
    </div>
    <br><br><br><br><br><br>

    <a href="#agregado" class="modal-trigger"><button type="hidden" id="listo"></button></a>
    <!-- Modal Agregado -->
    <div id="agregado" class="modal">
        <div class="modal-content orange lighten-4">
            <h4><i class="material-icons medium left orange-text text-darken-2">priority_high</i>Debe seleccionar al menos un empleado.</h4>
        </div>
        <div class="modal-footer orange lighten-4">
            <a href="#" class="btn modal-close orange darken-1">Aceptar</a>
        </div>
    </div>

    <!-- Footer -->
    <?php //include 'templates/footer.php';?>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'></script>

    <script type="text/javascript">
    $(document).ready(function() {

        $('.btnBorrar').click(function(e){
        e.preventDefault();
        var idEmpleado = $(this).attr("id");

        var dataString = 'idEmpleado='+ idEmpleado;
        url = "eliminar_empleado.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data)
                {
                    window.location.href="ver_empleados.php?empres=<?php echo $empre;?>";
                }
            });
        return false;

        });


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