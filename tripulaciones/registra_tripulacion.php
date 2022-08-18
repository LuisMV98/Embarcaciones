<?php
	include("../sesiones/conexion.php");
	$link = Conectar();

    $empre = $_REQUEST['empres'];
    $emba = $_REQUEST['embarc'];
    $op = $_REQUEST['opcion'];

	$contador = 0;
    if(isset($_REQUEST['le'])){
        $contador = count($_REQUEST['le']);
        $listaE = $_REQUEST['le'];

        for($i=0; $i<$contador; $i++){
            //print("<span style=margin-left:30px;>[<strong>" . $listaE[$i] . "</strong>]</span> <br>");
            $query = "INSERT INTO tripulaciones VALUES (NULL, '$emba', '$listaE[$i]')";
            mysqli_query($link,$query);
            $query = "UPDATE empleados SET tripulacion='$emba' WHERE idEmpleado='$listaE[$i]'";
            mysqli_query($link, $query);
            if($op==1){
                header("Location: selecciona_empresa.php?conf=1&opcion=1");
            }elseif($op==2){
                header("Location: ver_tripulacion.php?conf=1&empres=$empre&embar=$emba");
            }
        }
    }
    else{
        header("Location: empleados_disponibles.php?conf=0&empres=$empre&embar=$emba&opcion=$op");
    }

?>