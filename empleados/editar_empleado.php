<?php
include("../sesiones/conexion.php");

$idEmp = $_REQUEST['id'];
$emp = $_REQUEST['empress'];
$corr = $_REQUEST['corre'];
$tel = $_REQUEST['tele'];

$query = "UPDATE empleados SET correo='$corr', telefono='$tel' WHERE idEmpleado='$idEmp'";
$mysqli->query($query);
header("Location: ver_empleados.php?empres=$emp&conf=1");
?>