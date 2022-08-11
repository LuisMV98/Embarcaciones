<?php
	include("conexion.php");
	$link = Conectar();

	$user = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];

	$query = "SELECT correo, contrasena, nombre, telefono, idUsuario, foto FROM usuarios WHERE correo = '" . $user . "'";
	$consulta = mysqli_query($link,$query);
	$datos = mysqli_num_rows($consulta);

	if ($datos == 1)
	{
		while($fila = mysqli_fetch_row($consulta))
		{
			//$user_consulta = $fila[1];
			//print("Acceso Autorizado");
			if($fila[1] == $pass)
			{
				session_start();
				$_SESSION['corr'] = $fila[0];
				$_SESSION['nomb'] = $fila[2];
				$_SESSION['tel']  = $fila[3];
				$_SESSION['idus']  = $fila[4];
				$_SESSION['fot']  = $fila[5];

				header("location: ../usuarios/inicio.php");
			}
			else
			{
				header("location: ../index.php?err=0");
			}			
		}
	}
	elseif ($datos > 1) {
		//print("Error al consultar la base de datos, contactar al Administrador");
		header("location: ../index.php?err=2");
	}
	elseif ($datos == 0){
		//print("El Usuaior no Existe");
		header("location: ../index.php?err=1");
	}
?>