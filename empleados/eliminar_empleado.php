<?php
include("../sesiones/conexion.php");

$idEm= $_REQUEST['idEmpleado'];

$query   = ("SELECT * FROM empleados  WHERE idEmpleado= '".$idEm."' ");
$consulta = $mysqli->query($query);
$dataEmpresa = mysqli_fetch_array($consulta);
$emp = $dataEmpresa['empresa'];

$query = ("DELETE FROM empleados WHERE idEmpleado= '".$idEm."' ");
$consulta = $mysqli->query($query);

$query   = ("SELECT * FROM empleados  WHERE empresa= '".$emp."'");
$consulta = $mysqli->query($query);
$cantidad = mysqli_num_rows($consulta);

$query = "UPDATE empresas SET empleados=$cantidad WHERE idEmpresa='$emp'";
$consulta = $mysqli->query($query);
?>