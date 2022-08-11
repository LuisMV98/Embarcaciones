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
    <title>Inicio</title>
    <link rel="icon" type="image/png" href="../img/logo.png">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>

    <!-- Nav bar -->
    <?php include '../templates/navbar.php';?>

    <!-- Contenido -->
    <br>
    <div class="row">
        <div class="col s12 l6 offset-l3 m10 offset-m1">
            <div class="card z-depth-2">
                <div class="card-action black white-text center-align">
                    <h4>Perfil de usuario</h4>
                </div>
                <div class="card-content">
                    <div class="center-align">
                        <img src="<?php echo $_SESSION['fot'] ?>" class="responsive-img circle foto" >
                        <a href="#perfil" class="modal-trigger"><i class="small material-icons blue-text">mode</i></a>
                    </div><br>
                    <h5>
                    <p><b class="blue-text">NOMBRE:</b> <?php echo $_SESSION['nomb'] ?></p><br>
                    <p><b class="blue-text">CORREO:</b> <?php echo $_SESSION['corr'] ?></p><br>
                    <p><b class="blue-text">TELÉFONO:</b> <?php echo $_SESSION['tel'] ?></p>
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <!--Modal cambiar foto--->
    <div class="modal" id="perfil">
        <div class="modal-content">
            <h5 class="center black white-text"><br><i class="material-icons small">camera_alt</i>&nbsp;&nbsp;Cambiar Foto de perfil<br><br></h5><br>
            <form action="cambiar_foto.php" method="post" enctype="multipart/form-data">
                <div class="center"><h6><input type="file" name="imagen"></h6></div> <br><br>
                <button type="submit" class="btn green darken-1" style="float: right;">Subir</button>
            </form>
            <button class="btn modal-close blue darken-1" style="float: left;">Cancelar</button>
            <br><br>
        </div>
    </div>
    
    <!-- Footer -->
    <?php include '../templates/footer.php';?>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
    });
    </script>
</body>

</html>