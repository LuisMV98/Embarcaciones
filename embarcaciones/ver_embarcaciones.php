<?php
	session_start();
	if(!isset($_SESSION['corr']))
	{
		header("Location: cerrar_sesion.php");
	}
    $empre = $_REQUEST['empres'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver || Embarcaciones</title>
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
    <?php
        include('../sesiones/conexion.php');

        $query   = ("SELECT nombre FROM empresas  WHERE idEmpresa= '".$empre."' ");
        $consulta = $mysqli->query($query);
        $dataEmpresa = mysqli_fetch_array($consulta);
        $empresa = $dataEmpresa['nombre'];

        $query   = ("SELECT * FROM embarcaciones  WHERE empresa= '".$empre."' ORDER BY nombre");
        $consulta = $mysqli->query($query);
        $cantidad = mysqli_num_rows($consulta);
    ?>

    <div class="container">
        <div> 
            <i class="material-icons medium left">directions_boat</i><h3>Embarcaciones de <?php echo $empresa; ?> ( <?php echo $cantidad; ?> ):</h3>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Salida</th>
                    <th scope="col">Entrega</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while ($dataEmbarcacion = mysqli_fetch_array($consulta)) { ?>
                        <tr>
                            <td><?php echo $dataEmbarcacion['nombre']; ?></td>
                            <td><?php echo $dataEmbarcacion['tipo']; ?></td>
                            <td><?php echo $dataEmbarcacion['salida']; ?></td>
                            <td><?php echo $dataEmbarcacion['entrega']; ?></td>
                            
                        <td> 
                            <button type="button" class="btn green modal-trigger" data-target="editChildresn<?php echo $dataEmbarcacion['idEmbarcacion']; ?>">
                                Editar
                            </button>
                            <button type="button" class="btn red modal-trigger" data-target="deleteChildresn<?php echo $dataEmbarcacion['idEmbarcacion']; ?>">
                                Eliminar
                            </button>
                        </td>
                        </tr>
                    
                        <!--Ventana Modal para Actualizar--->
                        <?php  include('modal_edita_embarcacion.php'); ?>

                        <!--Ventana Modal para la Alerta de Eliminar--->
                        <?php include('modal_elimina_embarcacion.php'); ?>
                <?php } ?>
        
            </table>
        </div>
    </div>

    <a href="#agregado" class="modal-trigger aler"><button type="hidden" id="listo"></button></a>
    <!-- Modal Agregado -->
    <div id="agregado" class="modal">
        <div class="modal-content green lighten-4">
            <h4><i class="material-icons medium left green-text text-darken-2">check_circle</i>Cambios guardados.</h4>
        </div>
        <div class="modal-footer green lighten-4">
            <a href="#" class="btn modal-close green darken-1">Aceptar</a>
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
        var idEmbarcacion = $(this).attr("id");

        var dataString = 'idEmbarcacion='+ idEmbarcacion;
        url = "eliminar_embarcacion.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data)
                {
                    window.location.href="ver_embarcaciones.php?empres=<?php echo $empre;?>";
                }
            });
        return false;

        });


    });
    </script>

    <?php
        if(isset($_REQUEST['conf'])){
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