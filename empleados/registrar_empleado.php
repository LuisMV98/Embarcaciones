<?php
	include("../sesiones/conexion.php");
	
	$emp = $_REQUEST['empr'];
	$nom = $_REQUEST['nom'];
	$corr = $_REQUEST['corre'];
	$tel = $_REQUEST['tele'];

	$link = Conectar();

	$query = "INSERT INTO empleados VALUES (NULL, '$nom', '$emp', '$corr', '$tel', NULL)";
	mysqli_query($link,$query);

	$query   = ("SELECT * FROM empleados  WHERE empresa= '".$emp."'");
	$consulta = mysqli_query($link, $query);
	$cantidad = mysqli_num_rows($consulta);

	$query = "UPDATE empresas SET empleados=$cantidad WHERE idEmpresa='$emp'";
	mysqli_query($link,$query);

	header("Location: agregar_empleado.php?conf=1");
?>