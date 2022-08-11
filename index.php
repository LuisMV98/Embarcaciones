<?php
	session_start();
	session_destroy();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embarcaciones Web</title>

    <link rel="icon" type="image/png" href="img/logo.png">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>

    <!-- Nav bar -->
    <div class="navbar-fixed">
        <nav class="black">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo"><img src="img/logo.png" class="logotipo"></a>
        </div>
        </nav>
    </div>
    <br>

    <!-- Login -->
    <div class="row">
        <div class="col s12 l4 offset-l4 m10 offset-m1">
            <div class="card z-depth-4">
                <div class="card-action black white-text">
                    <h5>Iniciar Sesión</h5>
                </div>
                <div class="card-content">
                    <div class="center-align">
                        <img src="img/logo2.png" class="responsive-img">
                    </div><br>
                    <form action="sesiones/validar.php" method="post">    <!-- Formulario -->
                        <div class="input-field">
                            <label for="username"><i class="tiny material-icons">assignment_ind</i>&#32;CORREO</label>
                            <input type="email" name="user" id="username" class="validate" required>
                        </div><br>
                        <div class="input-field">
                            <label for="password"><i class="tiny material-icons">vpn_key</i>&#32;CONTRASEÑA</label>
                            <input type="password" name="pass" id="password" class="validate col l11 m11 s11" required><br>
                            <a href="#" class="col l1 m1 s1 grey-text" id="eye" onclick="mostrar()"><i class="material-icons">visibility</i></a>
                            <a href="#" class="col l1 m1 s1 grey-text" id="eye2" onclick="mostrar()"><i class="material-icons">visibility_off</i></a>
                        </div><br>
                                <?php
                                    if(isset($_REQUEST['err'])){?>
                                        <div class="row">
                                            <div class="col s12 l8 offset-l2 m8 offset-m2 red accent-1 center-align "><?php
                                                $err = $_REQUEST['err'];
                                                if($err == 0){
                                                    print("La contraseña es incorrecta");
                                                }
                                                elseif ($err == 1){
                                                    print("El usuario no existe");
                                                }?>
                                            </div>
                                        </div><?php
                                    }
                                ?>
                        <div class="center-align"><br><br>
                            <button type="submit" class="btn-large green darken-1 waves-effect waves-dark" style="width:40%;">INGRESAR</button>
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'templates/footer.php';?>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
    });
    </script>
    <script src="js/muestra_password.js"></script>
</body>

</html>