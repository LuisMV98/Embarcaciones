<?php
include("../sesiones/conexion.php");
$link = Conectar();

$idUs= $_REQUEST['idUsuario'];

//if($_SESSION['idus']==$idUs){}

$DeleteRegistro = ("DELETE FROM usuarios WHERE idUsuario= '".$idUs."' ");
mysqli_query($link, $DeleteRegistro);
?>