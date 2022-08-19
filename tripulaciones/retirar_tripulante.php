<?php
include("../sesiones/conexion.php");

$idEm= $_REQUEST['idEmpleado'];

$query = ("DELETE FROM tripulaciones WHERE empleado= '".$idEm."' ");
$consulta = $mysqli->query($query);

$query = "UPDATE empleados SET tripulacion=NULL WHERE idEmpleado='$idEm'";
$consulta = $mysqli->query($query);
?>