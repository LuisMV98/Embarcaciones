<?php
include("../sesiones/conexion.php");

$idUs= $_REQUEST['idUsuario'];

//if($_SESSION['idus']==$idUs){}

$query = ("DELETE FROM usuarios WHERE idUsuario= '".$idUs."' ");
$consulta = $mysqli->query($query);
?>