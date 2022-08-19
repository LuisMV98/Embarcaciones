<?php
	include("../sesiones/conexion.php");
	
	$nom = $_REQUEST['nom'];
	$tel = $_REQUEST['tele'];
	$corr = $_REQUEST['corre'];
	$cont = $_REQUEST['contra'];

	$query = "SELECT correo FROM usuarios WHERE correo = '" . $corr . "'";
	$consulta = $mysqli->query($query);
	$datos = mysqli_num_rows($consulta);

	if ($datos == 1){
		header("Location: agregar_usuario.php?conf=0");
	}elseif ($datos == 0){
		$query = "INSERT INTO usuarios VALUES (NULL, '$nom', '$tel', '$corr', '$cont', 'fotos_perfil/user.jpg')";
		$consulta = $mysqli->query($query);
		header("Location: agregar_usuario.php?conf=1");
	}

?>