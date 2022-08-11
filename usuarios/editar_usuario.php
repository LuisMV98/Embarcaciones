<?php
include("../sesiones/conexion.php");
$link = Conectar();

$idUs = $_REQUEST['id'];
$nom = $_REQUEST['nom'];
$tel = $_REQUEST['tele'];
$corr = $_REQUEST['corre'];
$cont = $_REQUEST['contra'];

$query = "SELECT correo, idUsuario FROM usuarios WHERE correo = '" . $corr . "'";
$consulta = mysqli_query($link,$query);
$datos = mysqli_num_rows($consulta);
$fila = mysqli_fetch_row($consulta);

if ($datos == 1  and $fila[1] != $idUs){
    header("Location: ver_usuarios.php?conf=0");
}else{
    $query = "UPDATE usuarios SET nombre='$nom',telefono='$tel',correo='$corr',contrasena='$cont' WHERE idUsuario='$idUs'";
    mysqli_query($link, $query);
    header("Location: ver_usuarios.php?conf=1");
}
?>