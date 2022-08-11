<?php
include("../sesiones/conexion.php");
$link = Conectar();

$idEmb = $_REQUEST['id'];
$emp = $_REQUEST['empress'];
$nomb = $_REQUEST['nom'];
$ti = $_REQUEST['tip'];
$sal = $_REQUEST['sali'];
$ent = $_REQUEST['entre'];

$query = "UPDATE embarcaciones SET nombre='$nomb', tipo='$ti', salida='$sal', entrega='$ent' WHERE idEmbarcacion='$idEmb'";
mysqli_query($link, $query);

header("Location: ver_embarcaciones.php?empres=$emp&conf=1");
?>