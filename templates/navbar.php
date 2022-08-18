<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../img/logo.png">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css?ts=<?=time()?>">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>

<body>

    <div class="navbar-fixed">
        <nav class="black">
        <div class="nav-wrapper row">
            <a href="../usuarios/inicio.php" class="brand-logo"><img src="../img/logo.png" class="logotipo"></a>
            <ul class="right hide-on-med-and-down">
            <li><a href="../usuarios/inicio.php"><i class="material-icons left">home</i>INICIO</a></li>
            <!-- Dropdowns Trigger -->
            <li><a class="dropdown-trigger" href="#" data-target="empresas"><i class="material-icons left">business</i>Empresas<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#" data-target="empleados"><i class="material-icons left">work</i>Empleados<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#" data-target="embarcaciones"><i class="material-icons left">directions_boat</i>Embarcaciones<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#" data-target="tripulaciones"><i class="material-icons left">anchor</i>Tripulaciones<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#" data-target="usuarios"><i class="material-icons left">supervisor_account</i>Usuarios<i class="material-icons right">arrow_drop_down</i></a></li>

            <li><a href="#cerrar" class="modal-trigger" title="Cerrar Sesión"><i class="material-icons right">logout</i></a></li>
            </ul>
            <a href="#" data-target="menu-responsivo" class="sidenav-trigger">
                <i class="material-icons">menu</i>
            </a>
        </div>
        </nav>
    </div>

    <!-- Modal Cerrar -->
    <div id="cerrar" class="modal">
        <div class="modal-content grey darken-3 white-text">
        <h5>Su sesión será cerrada.</h5>
        </div>
        <div class="modal-footer grey darken-3">
        <a href="#" class="btn modal-close blue">Cancelar</a>
        <a href="../sesiones/cerrar_sesion.php" class="btn modal-close">Aceptar</a>
        </div>
    </div>

    <!-- Dropdown Structure -->
    <ul id="empresas" class="dropdown-content">
    <li><a href="../empresas/agregar_empresa.php">Agregar empresa</a></li>
    <li class="divider"></li>
    <li><a href="../empresas/ver_empresas.php">Ver empresas</a></li>
    </ul>
    <ul id="empleados" class="dropdown-content">
    <li><a href="../empleados/agregar_empleado.php">Agregar empleado</a></li>
    <li class="divider"></li>
    <li><a href="../empleados/selecciona_empresa.php">Ver empleados</a></li>
    </ul>
    <ul id="embarcaciones" class="dropdown-content">
    <li><a href="../embarcaciones/agregar_embarcacion.php">Agregar embarcación</a></li>
    <li class="divider"></li>
    <li><a href="../embarcaciones/selecciona_empresa.php">Ver embarcaciones</a></li>
    </ul>
    <ul id="tripulaciones" class="dropdown-content">
    <li><a href="../tripulaciones/selecciona_empresa.php?opcion=1">Agregar tripulación</a></li>
    <li class="divider"></li>
    <li><a href="../tripulaciones/selecciona_empresa.php?opcion=2">Ver tripulacion</a></li>
    </ul>
    <ul id="usuarios" class="dropdown-content">
    <li><a href="../usuarios/agregar_usuario.php">Agregar usuario</a></li>
    <li class="divider"></li>
    <li><a href="../usuarios/ver_usuarios.php">Ver usuarios</a></li>
    </ul>

    <!-- Menu Responsivo -->
    <ul class="sidenav" id="menu-responsivo">
        <li><a href="../usuarios/inicio.php"><i class="material-icons left">home</i>INICIO</a></li>
        <!-- Dropdowns Trigger -->
        <li><a class="dropdown-trigger" href="#" data-target="empresas2"><i class="material-icons left">business</i>Empresas<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-trigger" href="#" data-target="empleados2"><i class="material-icons left">work</i>Empleados<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-trigger" href="#" data-target="embarcaciones2"><i class="material-icons left">directions_boat</i>Embarcaciones<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-trigger" href="#" data-target="tripulaciones2"><i class="material-icons left">anchor</i>Tripulaciones<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-trigger" href="#" data-target="usuarios2"><i class="material-icons left">supervisor_account</i>Usuarios<i class="material-icons right">arrow_drop_down</i></a></li>

        <li><a href="#cerrar" class="modal-trigger" title="Cerrar Sesión"><i class="material-icons right">logout</i></a></li>
    </ul> 

    <!-- Dropdown Structure 2 -->
    <ul id="empresas2" class="dropdown-content">
    <li><a href="../empresas/agregar_empresa.php">Agregar empresa</a></li>
    <li class="divider"></li>
    <li><a href="../empresas/ver_empresas.php">Ver empresas</a></li>
    </ul>
    <ul id="empleados2" class="dropdown-content">
    <li><a href="../empleados/agregar_empleado.php">Agregar empleado</a></li>
    <li class="divider"></li>
    <li><a href="../empleados/selecciona_empresa.php">Ver empleados</a></li>
    </ul>
    <ul id="embarcaciones2" class="dropdown-content">
    <li><a href="../embarcaciones/agregar_embarcacion.php">Agregar embarcación</a></li>
    <li class="divider"></li>
    <li><a href="../embarcaciones/selecciona_empresa.php">Ver embarcaciones</a></li>
    </ul>
    <ul id="tripulaciones2" class="dropdown-content">
    <li><a href="../tripulaciones/selecciona_empresa.php">Agregar tripulación</a></li>
    <li class="divider"></li>
    <li><a href="../tripulaciones/selecciona_empresa_ver.php">Ver tripulacion</a></li>
    </ul>
    <ul id="usuarios2" class="dropdown-content">
    <li><a href="../usuarios/agregar_usuario.php">Agregar usuario</a></li>
    <li class="divider"></li>
    <li><a href="../usuarios/ver_usuarios.php">Ver usuarios</a></li>
    </ul>
    
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
    });
    </script>
</body>

</html>