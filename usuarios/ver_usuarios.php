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
    <title>Ver || usuarios</title>
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

        $query   = ("SELECT * FROM usuarios ORDER BY nombre");
        $consulta = mysqli_query($link, $query);
        $cantidad = mysqli_num_rows($consulta);
    ?>

    <div class="container">
        <div> 
            <i class="material-icons medium left">supervisor_account</i><h3>Usuarios Registrados ( <?php echo $cantidad; ?> ):</h3>
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
                    while ($dataUsuario = mysqli_fetch_array($consulta)) { ?>
                        <tr <?php if($dataUsuario['idUsuario'] == $_SESSION['idus']){?> class="blue lighten-5" <?php } ?>>
                            <td><?php echo $dataUsuario['nombre']; ?></td>
                            <td><?php echo $dataUsuario['correo']; ?></td>
                            <td><?php echo $dataUsuario['telefono']; ?></td>
                            <td> 
                                <button type="button" class="btn green modal-trigger" data-target="editChildresn<?php echo $dataUsuario['idUsuario']; ?>">
                                    Editar
                                </button>
                                <button type="button" class="btn red modal-trigger" data-target="deleteChildresn<?php echo $dataUsuario['idUsuario']; ?>">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    
                        <!--Ventana Modal para Actualizar--->
                        <?php  include('modal_edita_usuario.php'); ?>

                        <!--Ventana Modal para la Alerta de Eliminar--->
                        <?php include('modal_elimina_usuario.php'); ?>
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

    <a href="#repetido" class="modal-trigger"><button type="hidden" id="adve"></button></a>
    <!-- Modal Repetido -->
    <div id="repetido" class="modal">
        <div class="modal-content orange lighten-4">
            <h4><i class="material-icons medium left orange-text text-darken-2">check_circle</i>El correo ingresado pertenece a otro usuario.</h4>
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
        var id2 = "X";

        $('.btnBorrar').click(function(e){
            e.preventDefault();
            var idUsuario = $(this).attr("id");

            var dataString = 'idUsuario='+ idUsuario;
            url = "eliminar_usuario.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: dataString,
                    success: function(data){
                        window.location.href="ver_usuarios.php";
                    }
                });
            return false;
        });

        $('.btnBorrarMe').click(function(e){
            e.preventDefault();
            var idUsuario = $(this).attr("id");

            var dataString = 'idUsuario='+ idUsuario;
            url = "eliminar_usuario.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: dataString,
                    success: function(data){
                        window.location.href="../sesiones/cerrar_sesion.php";
                    }
                });
            return false;
        });

        $('.ver').click(function(e){
            e.preventDefault();
            var id = $(this).attr("id");
            $(this).hide();
            $('#eye2'+id).show();
            id2 = id
            $('#password'+id2).get(0).type = 'text';
            return false;
        });

        $('.verA2').click(function(e){
            e.preventDefault();
            var id = $(this).attr("id");
            $(this).hide();
            $('#'+id2).show();
            $('#password'+id2).get(0).type = 'password';
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
        }elseif($_REQUEST['conf']==0){
        ?>
                <script>
                    $(document).ready(function(){
                        setTimeout(clickbutton,200);
            
                        function clickbutton(){
                            $("#adve").click();
                        }
                    });
                </script>
        <?php
            }
        }
    ?>

</body>

</html>