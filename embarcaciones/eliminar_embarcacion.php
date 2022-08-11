<?php
include("../sesiones/conexion.php");
$link = Conectar();

$idEmb= $_REQUEST['idEmbarcacion'];

$query   = ("SELECT * FROM embarcaciones  WHERE idEmbarcacion= '".$idEmb."' ");
$consulta = mysqli_query($link, $query);
$dataEmpresa = mysqli_fetch_array($consulta);
$emp = $dataEmpresa['empresa'];

$DeleteRegistro = ("DELETE FROM embarcaciones WHERE idEmbarcacion= '".$idEmb."' ");
mysqli_query($link, $DeleteRegistro);

$query   = ("SELECT * FROM embarcaciones  WHERE empresa= '".$emp."'");
$consulta = mysqli_query($link, $query);
$cantidad = mysqli_num_rows($consulta);

$query = "UPDATE empresas SET embarcaciones=$cantidad WHERE idEmpresa='$emp'";
mysqli_query($link,$query);
?>