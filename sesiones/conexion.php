<?php
	$mysqli = new mysqli("localhost", "root", "", "embarcaciones"); 
                        //localhost,usuario,password,basedatos

    if ($mysqli->connect_errno) {
         //echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    else{
        //echo "si se hizo la conexion <br>";
        //echo $mysqli->host_info . "\n";
    }
?>