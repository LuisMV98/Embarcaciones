<?php
	
	function Conectar()
	{
	
		$servername = 'localhost';
		$database = 'embarcaciones';
		$username = 'root';
		$password = '';

		// Crear conexion

		if (!($conn = mysqli_connect($servername, $username, $password)))
		{
			//print("Error al conectarse a la Base de datos. <br>");
			exit();
		}
		else
		{
			//print("Conexion exitosa. <br>");
		}

		//Conexion a la Base de Datos

		if (!mysqli_select_db($conn, $database))
		{
			//print("Error al seleccionar la base de datos. <br>");
			exit();
		}
		else
		{
			//print("Conexion exitosa a la base de datos [$database]. <br>");
		}

		return $conn;

	}
?>