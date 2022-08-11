<?php
	session_start();
	if(!isset($_SESSION['corr']))
	{
		header("Location: cerrar_sesion.php");
	}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver || Empresas</title>
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

        $query   = ("SELECT * FROM empresas ORDER BY nombre");
        $consulta = mysqli_query($link, $query);
        $cantidad = mysqli_num_rows($consulta);
    ?>

    <div class="container">
        <div> 
            <i class="material-icons medium left">business</i><h3>Empresas Rregistradas ( <?php echo $cantidad; ?> ):</h3>
        </div>
            
        <div class="row">
        <?php
            while ($dataEmpresa = mysqli_fetch_array($consulta)) { ?>
                    <div class="col s12 m12 l6">
                        <div class="card conte">
                            <div class="card-content conte">
                                <span class="card-title center-align black white-text"><h5><?php echo $dataEmpresa['nombre']; ?></h5></span>
                                <h6>
                                <p><b>Dirección:&nbsp;</b><?php echo $dataEmpresa['direccion']; ?></p>
                                <p><b>Correo:&nbsp;</b><?php echo $dataEmpresa['correo']; ?></p>
                                <p><b>teléfono:&nbsp;</b><?php echo $dataEmpresa['telefono']; ?></p>
                                <p><b>Logo:&nbsp;</b></p>
                                <div class="center"><img src="<?php echo $dataEmpresa['logo']; ?>" class="logo" ></div>
                                </h6>
                            </div>
                            <div class="card-action">
                                <button type="button" class="btn green modal-trigger" style="float: left;" data-target="editChildresn<?php echo $dataEmpresa['idEmpresa']; ?>">
                                    Editar
                                </button>
                                <button type="button" class="btn red modal-trigger" style="float: right;" data-target="deleteChildresn<?php echo $dataEmpresa['idEmpresa']; ?>">
                                    Eliminar
                                </button>
                            </div>
                            <br><br>
                        </div>
                    </div>
            
                <!--Ventana Modal para Actualizar--->
                <?php  include('modal_edita_empresa.php'); ?>

                <!--Ventana Modal para la Alerta de Eliminar--->
                <?php include('modal_elimina_empresa.php'); ?>
        <?php } ?>
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
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {

        $('.btnBorrar').click(function(e){
        e.preventDefault();
        var idEmpresa = $(this).attr("id");

        var dataString = 'idEmpresa='+ idEmpresa;
        url = "eliminar_empresa.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data)
                {
                    window.location.href="ver_empresas.php";
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