<?php
include("../sesiones/conexion.php");
$link = Conectar();

$idEmp= $_REQUEST['id'];
$nom = $_REQUEST['nom'];
$dir = $_REQUEST['direc'];
$cor = $_REQUEST['corre'];
$tel = $_REQUEST['tele'];

if(!isset($_POST['Guardar'])){
    $ruta = "logos/";
    $fichero = $ruta.basename($_FILES['imag']['name']);
    $nombrecomp =  $ruta.$idEmp.".jpg";

    if(move_uploaded_file($_FILES['imag']['tmp_name'], $ruta.$idEmp.".jpg")){
        $query = "UPDATE empresas SET nombre='$nom',telefono='$tel',direccion='$dir',logo='$nombrecomp' WHERE idEmpresa='$idEmp'";
        mysqli_query($link,$query);
        header("Location: ver_empresas.php?conf=1");
    }else{
        $query = "UPDATE empresas SET nombre='$nom',telefono='$tel',direccion='$dir' WHERE idEmpresa='$idEmp'";
        mysqli_query($link,$query);
        header("Location: ver_empresas.php?conf=1");
    }
}

?>