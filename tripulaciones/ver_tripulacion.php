<?php
	session_start();
	if(!isset($_SESSION['corr']))
	{
		header("Location: cerrar_sesion.php");
	}
    $empre = $_REQUEST['empres'];
    $emba = $_REQUEST['embar'];

    include('../sesiones/conexion.php');
    $link = Conectar();

    $query   = ("SELECT nombre FROM empresas  WHERE idEmpresa= '".$empre."' ");
    $consulta = mysqli_query($link, $query);
    $dataEmpresa = mysqli_fetch_array($consulta);
    $empresa = $dataEmpresa['nombre'];

    $query   = ("SELECT nombre FROM embarcaciones  WHERE idEmbarcacion= '".$emba."' ");
    $consulta = mysqli_query($link, $query);
    $dataEmbarcacion = mysqli_fetch_array($consulta);
    $embarcacion = $dataEmbarcacion['nombre'];

    $query   = ("SELECT * FROM empleados WHERE empresa= $empre AND tripulacion=$emba ORDER BY nombre");
    $consulta = mysqli_query($link, $query);
    $cantidad = mysqli_num_rows($consulta);

    if($cantidad==0){
        header("location: selecciona_embarcacion.php?conf=0&opcion=2&emp=$empre");
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver || Tripulación</title>
    <link rel="icon" type="image/png" href="../img/logo.png">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css?ts=<?=time()?>">
</head>

<body>

    <!-- Nav bar -->
    <?php include '../templates/navbar.php';?>

    <!-- Contenido -->
    <br>
    <div class="container">
        <div class="cyan-text text-darken-3 row">
            <div class="col l6 m6 s12"><div><i class="material-icons small left">business</i><h5>Empresa:  <?php echo $empresa; ?></h5></div></div>
            <div class="col l6 m6 s12"><div><i class="material-icons small left">directions_boat</i><h5>Embarcación: <?php echo $embarcacion; ?></h5></div></div>
        </div><hr><br>

        <div class="row">
            <div class="col l9 m12 s12"><div><i class="material-icons medium left">anchor</i><h3>Tripulación cargada (<?php echo $cantidad; ?>):</h3></div></div><br><br>
            <div class="col l3 m12 s12"><a href="empleados_disponibles.php?empres=<?php echo $empre;?>&embar=<?php echo $emba;?>&opcion=2"><button class="btn teal">Agregar tripulante(s)<i class="material-icons right">add</i></button></a></div>
        </div>

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
                            <td><?php echo $dataEmpleado['telefono']; ?></td>
                            
                        <td> 
                            <button type="button" class="btn red darken-1 modal-trigger" data-target="deleteChildresn<?php echo $dataEmpleado['idEmpleado']; ?>">
                                Retirar
                            </button>
                        </td>
                        </tr>
                    
                        <!--Ventana Modal para la Alerta de Retirar--->
                        <?php include('modal_retira_tripulante.php'); ?>
                <?php } ?>
        
            </table>
        </div>
        <br><br><br><br>
        <a href="selecciona_embarcacion.php?opcion=2&emp=<?php echo $empre;?>"><button class="btn blue darken-1" style="float: left;"><i class="material-icons left">arrow_back_ios</i>Volver</button></a>
        <br><br>
    </div>

    <a href="#eliminado" class="modal-trigger aler"><button type="hidden" id="listo"></button></a>
    <!-- Modal Eliminado -->
    <div id="eliminado" class="modal">
        <div class="modal-content green lighten-4">
            <h4><i class="material-icons medium left green-text text-darken-2">check_circle</i>Empleado retirado.</h4>
        </div>
        <div class="modal-footer green lighten-4">
            <a href="#" class="btn modal-close green darken-1">Aceptar</a>
        </div>
    </div>

    <a href="#agregado" class="modal-trigger aler"><button type="hidden" id="listo2"></button></a>
    <!-- Modal Agregado -->
    <div id="agregado" class="modal">
        <div class="modal-content green lighten-4">
            <h4><i class="material-icons medium left green-text text-darken-2">check_circle</i>Tripulante(s) agregado(s).</h4>
        </div>
        <div class="modal-footer green lighten-4">
            <a href="#" class="btn modal-close green darken-1">Aceptar</a>
        </div>
    </div>

    <a href="#alerta" class="modal-trigger aler"><button type="hidden" id="noempleados"></button></a>
    <!-- Modal Alerta -->
    <div id="alerta" class="modal">
        <div class="modal-content orange lighten-4">
            <h4><i class="material-icons medium left orange-text text-darken-2">priority_high</i>La empresa no cuenta con empleados disponibles.</h4>
        </div>
        <div class="modal-footer orange lighten-4">
            <a href="#" class="btn modal-close orange darken-1">Aceptar</a>
        </div>
    </div>

    <br><br><br><br>
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
        url = "retirar_tripulante.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data)
                {
                    window.location.href="ver_tripulacion.php?empres=<?php echo $empre;?>&embar=<?php echo $emba;?>&conf=0";
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
            }elseif($_REQUEST['conf']==1){
        ?>
                <script>
                    $(document).ready(function(){
                        setTimeout(clickbutton,200);
                        function clickbutton(){
                            $("#listo2").click();
                        }
                    });
                </script>
        <?php
            }elseif($_REQUEST['conf']==2){
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
        }
    ?>

</body>

</html>