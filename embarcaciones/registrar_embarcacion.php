<?php
	include("../sesiones/conexion.php");
	
	$emp = $_REQUEST['empr'];
	$nom = $_REQUEST['nom'];
	$ti = $_REQUEST['tip'];
	$sal = $_REQUEST['sali'];
	$ent = $_REQUEST['entre'];

	$query = "INSERT INTO embarcaciones VALUES (NULL, '$nom', '$emp', '$ti', '$sal', '$ent')";
	$mysqli->query($query);

	$query   = ("SELECT * FROM embarcaciones  WHERE empresa= '".$emp."'");
	$consulta = $mysqli->query($query);
	$cantidad = mysqli_num_rows($consulta);

	$query = "UPDATE empresas SET embarcaciones=$cantidad WHERE idEmpresa='$emp'";
	$mysqli->query($query);

	header("Location: agregar_embarcacion.php?conf=1");
?>