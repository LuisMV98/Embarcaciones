<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrega | Usuario</title>
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
                    <h5><i class="material-icons left">supervisor_account</i>Nuevo Usuario:</h5>
                </div>
                <div class="card-content">
                    <form action="registrar_usuario.php" method="post">    <!-- Formulario -->
                        <div class="input-field">
                            <label for="nombre">Nombre Completo</label>
                            <input type="text" name="nom" id="nombre" class="validate" required>
                        </div><br>
                        <div class="input-field">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="tele" id="telefono" class="validate" required>
                        </div><br>
                        <div class="input-field">
                            <label for="username"><i class="tiny material-icons">alternate_email</i>&#32;Correo</label>
                            <input type="email" name="corre" id="username" class="validate" required>
                        </div><br>
                        <div class="input-field">
                            <label for="password"><i class="tiny material-icons">vpn_key</i>&#32;Contraseña</label>
                            <input type="password" name="contra" id="password" class="validate col l11 m11 s11" required><br>
                            <a href="#" class="col l1 m1 s1 grey-text" id="eye" onclick="mostrar()"><i class="material-icons">visibility</i></a>
                            <a href="#" style="display:none;" class="col l1 m1 s1 grey-text" id="eye2" onclick="mostrar()"><i class="material-icons">visibility_off</i></a>
                        </div><br><br>
                        <button type="submit" class="btn green darken-1 waves-effect waves-dark" style="float: right;">Agregar<i class="material-icons right">add</i></button>
                    </form>
                        <a href="inicio.php"><button class="btn blue darken-1 waves-effect waves-dark" style="float: left;">Cancelar</button></a>
                        <br><br>
                </div>
            </div>
        </div>
    </div>

    <a href="#agregado" class="modal-trigger"><button type="hidden" id="listo"></button></a>
    <!-- Modal Agregado -->
    <div id="agregado" class="modal">
        <div class="modal-content green lighten-4">
            <h4><i class="material-icons medium left green-text text-darken-2">check_circle</i>Nuevo usuario agregado.</h4>
        </div>
        <div class="modal-footer green lighten-4">
            <a href="#" class="btn modal-close green darken-1">Aceptar</a>
        </div>
    </div>

    <a href="#repetido" class="modal-trigger"><button type="hidden" id="adve"></button></a>
    <!-- Modal Repetido -->
    <div id="repetido" class="modal">
        <div class="modal-content orange lighten-4">
            <h4><i class="material-icons medium left orange-text text-darken-2">check_circle</i>Correo registrado anteriormente.</h4>
        </div>
        <div class="modal-footer orange lighten-4">
            <a href="#" class="btn modal-close orange darken-1">Aceptar</a>
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
    <script src="../js/muestra_password.js"></script>

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