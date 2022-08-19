<?php
    session_start();
    include("../sesiones/conexion.php");

    $idUs = $_REQUEST['id'];
    $nom = $_REQUEST['nom'];
    $tel = $_REQUEST['tele'];
    $corr = $_REQUEST['corre'];
    $cont = $_REQUEST['contra'];

    $query = "SELECT correo, idUsuario FROM usuarios WHERE correo = '" . $corr . "'";
    $consulta = $mysqli->query($query);
    $datos = mysqli_num_rows($consulta);
    $fila = mysqli_fetch_row($consulta);

    if ($datos == 1  and $fila[1] != $idUs){
        header("Location: ver_usuarios.php?conf=0");
    }else{
        $query = "UPDATE usuarios SET nombre='$nom',telefono='$tel',correo='$corr',contrasena='$cont' WHERE idUsuario='$idUs'";
        $mysqli->query($query);
        header("Location: ver_usuarios.php?conf=1");
        if($_SESSION['idus']  == $idUs){
            $_SESSION['corr'] = $corr;
            $_SESSION['nomb'] = $nom;
            $_SESSION['tel']  = $tel;
        }
    }
?>