<?php
include("../sesiones/conexion.php");
$link = Conectar();

$idEmp= $_REQUEST['idEmpresa'];

$query   = ("SELECT logo FROM empresas WHERE idEmpresa= '".$idEmp."' ");
$consulta = mysqli_query($link, $query);
$dataEmpresa = mysqli_fetch_array($consulta);
//echo $dataEmpresa['logo'];
@unlink($dataEmpresa['logo']);

$DeleteRegistro = ("DELETE FROM empresas WHERE idEmpresa= '".$idEmp."' ");
mysqli_query($link, $DeleteRegistro);
?>