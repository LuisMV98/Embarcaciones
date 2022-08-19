<?php
	include("../sesiones/conexion.php");
	
	$emp = $_REQUEST['empr'];
	$nom = $_REQUEST['nom'];
	$corr = $_REQUEST['corre'];
	$tel = $_REQUEST['tele'];

	$query = "INSERT INTO empleados VALUES (NULL, '$nom', '$emp', '$corr', '$tel', NULL)";
	$consulta = $mysqli->query($query);

	$query   = ("SELECT * FROM empleados  WHERE empresa= '".$emp."'");
	$consulta = $mysqli->query($query);
	$cantidad = mysqli_num_rows($consulta);

	$query = "UPDATE empresas SET empleados=$cantidad WHERE idEmpresa='$emp'";
	$consulta = $mysqli->query($query);

	header("Location: agregar_empleado.php?conf=1");
?>