<?php
	require "conexion.php";
	session_start();
	$mail=$_POST['user'];
	$passwd=$_POST['pass'];

	/************************************/

	$sqlUser ="SELECT * FROM usuarios WHERE correo = '$mail'";
	$resultUser = $mysqli->query($sqlUser);
	$rowUser = $resultUser->fetch_assoc();

	$correoUser = $rowUser['correo'];
	$passwdUser = $rowUser['contrasena'];

	//**********************************/
	if ($mail===$correoUser ) {
		if ($passwd===$passwdUser) {
			$_SESSION['corr'] = $correoUser;
			$_SESSION['nomb'] = $rowUser['nombre'];
			$_SESSION['tel']  = $rowUser['telefono'];
			$_SESSION['idus']  = $rowUser['idUsuario'];
			$_SESSION['fot']  = $rowUser['foto'];
			
			header("location: ../usuarios/inicio.php");
		}else {
			header("location: ../index.php?err=0");
		}
	}else {
		//echo "el correo es incorrecto";
		header("location: ../index.php?err=1");
	}
?>