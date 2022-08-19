<?php
include("../sesiones/conexion.php");

$idEmb= $_REQUEST['idEmbarcacion'];

$query   = ("SELECT * FROM embarcaciones  WHERE idEmbarcacion= '".$idEmb."' ");
$consulta = $mysqli->query($query);
$dataEmpresa = mysqli_fetch_array($consulta);
$emp = $dataEmpresa['empresa'];

$query = ("DELETE FROM embarcaciones WHERE idEmbarcacion= '".$idEmb."' ");
$consulta = $mysqli->query($query);

$query   = ("SELECT * FROM embarcaciones  WHERE empresa= '".$emp."'");
$consulta = $mysqli->query($query);
$cantidad = mysqli_num_rows($consulta);

$query = "UPDATE empresas SET embarcaciones=$cantidad WHERE idEmpresa='$emp'";
$consulta = $mysqli->query($query);
?>