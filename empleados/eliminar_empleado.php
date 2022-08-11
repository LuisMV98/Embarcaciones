<?php
include("../sesiones/conexion.php");
$link = Conectar();

$idEm= $_REQUEST['idEmpleado'];

$query   = ("SELECT * FROM empleados  WHERE idEmpleado= '".$idEm."' ");
$consulta = mysqli_query($link, $query);
$dataEmpresa = mysqli_fetch_array($consulta);
$emp = $dataEmpresa['empresa'];

$DeleteRegistro = ("DELETE FROM empleados WHERE idEmpleado= '".$idEm."' ");
mysqli_query($link, $DeleteRegistro);

$query   = ("SELECT * FROM empleados  WHERE empresa= '".$emp."'");
$consulta = mysqli_query($link, $query);
$cantidad = mysqli_num_rows($consulta);

$query = "UPDATE empresas SET empleados=$cantidad WHERE idEmpresa='$emp'";
mysqli_query($link,$query);
?>