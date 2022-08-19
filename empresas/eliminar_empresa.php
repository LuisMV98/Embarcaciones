<?php
include("../sesiones/conexion.php");

$idEmp= $_REQUEST['idEmpresa'];

$query   = ("SELECT logo FROM empresas WHERE idEmpresa= '".$idEmp."' ");
$consulta = $mysqli->query($query);
$dataEmpresa = mysqli_fetch_array($consulta);

@unlink($dataEmpresa['logo']);

$query = ("DELETE FROM empresas WHERE idEmpresa= '".$idEmp."' ");
$consulta = $mysqli->query($query);
?>