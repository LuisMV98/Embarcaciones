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
    <title>Ver || Empleados</title>
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
        $link = Conectar();

        $query   = ("SELECT nombre FROM empresas  WHERE idEmpresa= '".$empre."' ");
        $consulta = mysqli_query($link, $query);
        $dataEmpresa = mysqli_fetch_array($consulta);
        $emperesa = $dataEmpresa['nombre'];

        $query   = ("SELECT * FROM empleados  WHERE empresa= '".$empre."' ORDER BY nombre");
        $consulta = mysqli_query($link, $query);
        $cantidad = mysqli_num_rows($consulta);
    ?>

    <div class="container">
        <div> 
            <i class="material-icons medium left">work</i><h3>Empleados de <?php echo $emperesa; ?> ( <?php echo $cantidad; ?> ):</h3>
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
                            <button type="button" class="btn green modal-trigger" data-target="editChildresn<?php echo $dataEmpleado['idEmpleado']; ?>">
                                Editar
                            </button>
                            <button type="button" class="btn red modal-trigger" data-target="deleteChildresn<?php echo $dataEmpleado['idEmpleado']; ?>">
                                Eliminar
                            </button>
                        </td>
                        </tr>
                    
                        <!--Ventana Modal para Actualizar--->
                        <?php  include('modal_edita_empleado.php'); ?>

                        <!--Ventana Modal para la Alerta de Eliminar--->
                        <?php include('modal_elimina_empleado.php'); ?>
                <?php } ?>
        
            </table>
        </div>
    </div>

    <a href="#agregado" class="modal-trigger"><button type="hidden" id="listo"></button></a>
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