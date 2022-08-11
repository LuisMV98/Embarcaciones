<?php
	session_start();
	include("../sesiones/conexion.php");
	$link = Conectar();
    
    $idUs = $_SESSION['idus'];

    if(!isset($_POST['subir'])){
		$ruta = "fotos_perfil/";
        $fichero = $ruta.basename($_FILES['imagen']['name']);
        $nombrecomp =  $ruta.$idUs.".jpg";
        $_SESSION['fot'] = $nombrecomp;

        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta.$idUs.".jpg")){
            $query = "UPDATE usuarios SET foto='$nombrecomp' WHERE idUsuario='$idUs'";
            mysqli_query($link, $query);
            header("Location: inicio.php");
        }else{
            header("Location: inicio.php");
        }
	}
?>