<?php
	include("../sesiones/conexion.php");
	$link = Conectar();
	
	$nom = $_REQUEST['nom'];
	$dir = $_REQUEST['direc'];
	$cor = $_REQUEST['corre'];
	$tel = $_REQUEST['tele'];

	$query = "INSERT INTO empresas VALUES (NULL, '$nom', '$dir', '$cor', '$tel', NULL, 0, 0)";
	mysqli_query($link,$query);
	
	$query = "SELECT idEmpresa FROM empresas WHERE logo is NULL";
	$consulta = mysqli_query($link,$query);
	$fila = mysqli_fetch_row($consulta);

	$id = $fila[0];

	if(!isset($_POST['agregar'])){
		$ruta = "logos/";
		$fichero = $ruta.basename($_FILES['imag']['name']);
		$nombrecomp =  $ruta.$id.".jpg";

		if(move_uploaded_file($_FILES['imag']['tmp_name'], $ruta.$id.".jpg")){
			$query = "UPDATE empresas SET logo='$nombrecomp' WHERE idEmpresa='$id'";
			mysqli_query($link,$query);
			header("Location: agregar_empresa.php?conf=1");
		}else{
            header("Location: agregar_empresa.php");
        }
	}

?>