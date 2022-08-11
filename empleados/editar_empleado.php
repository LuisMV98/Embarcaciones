<?php
include("../sesiones/conexion.php");
$link = Conectar();

$idEmp = $_REQUEST['id'];
$emp = $_REQUEST['empress'];
$corr = $_REQUEST['corre'];
$tel = $_REQUEST['tele'];

$query = "UPDATE empleados SET correo='$corr', telefono='$tel' WHERE idEmpleado='$idEmp'";
mysqli_query($link, $query);

header("Location: ver_empleados.php?empres=$emp&conf=1");
?>