<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";
	
	
	$matricula =  $_POST["matricula"];
	
	$result = mysql_delete("nivel_escolar",$conexion, $matricula);
	
	if (!$result) {
		$alertMsg = "Algo salio mal: " . mysqli_error($conexion);
	}else{
		$alertMsg = "Eliminado con exito!";
	}

	echo "<script language=\"javascript\">
				alert(\"$alertMsg\");
				window.history.go(-2);
			</script>";
?>
