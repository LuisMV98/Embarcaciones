<?php
include("../sesiones/conexion.php");
$link = Conectar();

$idEm= $_REQUEST['idEmpleado'];

$DeleteRegistro = ("DELETE FROM tripulaciones WHERE empleado= '".$idEm."' ");
mysqli_query($link, $DeleteRegistro);

$query = "UPDATE empleados SET tripulacion=NULL WHERE idEmpleado='$idEm'";
mysqli_query($link, $query);
?>