<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrega || Empresa</title>
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
    <br>
    <div class="row">
        <div class="col s12 l4 offset-l4 m10 offset-m1">
            <div class="card z-depth-4">
                <div class="card-action black white-text">
                    <h5><i class="material-icons left">business</i>Nueva Empresa</h5>
                </div>
                <div class="card-content">
                    <form action="registrar_empresa.php" method="post" enctype="multipart/form-data">    <!-- Formulario -->
                        <div class="input-field">
                            <label for="nombre">Nombre de la Empresa</label>
                            <input type="text" name="nom" id="nombre" class="validate" required>
                        </div><br>
                        <div class="input-field">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direc" id="direccion" class="validate" required>
                        </div><br>
                        <div class="input-field">
                            <label for="username"><i class="tiny material-icons">alternate_email</i>&#32;Correo de contacto</label>
                            <input type="email" name="corre" id="username" class="validate" required>
                        </div><br>
                        <div class="input-field">
                            <label for="telefono"><i class="tiny material-icons">call</i>&#32;Teléfono de contacto</label>
                            <input type="tel" name="tele" id="telefono" class="validate" required>
                        </div><br>
                        <div class="">
                            <label for="imagen"><i class="tiny material-icons">collections</i>&#32;Logotipo</label><br><br>
                            <div class="center"><input type="file" name="imag" id="imagen" required></div>
                        </div><br><br>
                        <button type="submit" class="btn green darken-1 waves-effect waves-dark" style="float: right;">Agregar<i class="material-icons right">add</i></button>
                    </form>
                        <a href="../usuarios/inicio.php"><button class="btn blue darken-1 waves-effect waves-dark" style="float: left;">Cancelar</button></a>
                        <br><br>
                </div>
            </div>
        </div>
    </div>

    
    <a href="#agregado" class="modal-trigger"><button type="hidden" id="listo"></button></a>

    <!-- Modal Agregado -->
    <div id="agregado" class="modal">
        <div class="modal-content green lighten-4">
            <h4><i class="material-icons medium left green-text text-darken-2">check_circle</i>Nueva empresa agregada.</h4>
        </div>
        <div class="modal-footer green lighten-4">
            <a href="#" class="btn modal-close green darken-1">Aceptar</a>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../templates/footer.php';?>

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
        if($_REQUEST['conf']==1){
    ?>
            <script>
                $(document).ready(function(){
                    // indicamos que se ejecuta la función a los 5 segundos de haberse
                    // cargado la pagina
                    setTimeout(clickbutton,200);
        
                    function clickbutton()
                    {
                        // simulamos el click del mouse en el boton del modal
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