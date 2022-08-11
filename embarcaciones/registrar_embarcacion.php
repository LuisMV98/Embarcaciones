<?php
	include("../sesiones/conexion.php");
	$link = Conectar();
	
	$emp = $_REQUEST['empr'];
	$nom = $_REQUEST['nom'];
	$ti = $_REQUEST['tip'];
	$sal = $_REQUEST['sali'];
	$ent = $_REQUEST['entre'];

	$query = "INSERT INTO embarcaciones VALUES (NULL, '$nom', '$emp', '$ti', '$sal', '$ent')";
	mysqli_query($link,$query);

	$query   = ("SELECT * FROM embarcaciones  WHERE empresa= '".$emp."'");
	$consulta = mysqli_query($link, $query);
	$cantidad = mysqli_num_rows($consulta);

	$query = "UPDATE empresas SET embarcaciones=$cantidad WHERE idEmpresa='$emp'";
	mysqli_query($link,$query);

	header("Location: agregar_embarcacion.php?conf=1");
?>