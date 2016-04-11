<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$matricula = $_POST["matricula"];
	$gru_nombre = $_POST["grupo"];

	$result = mysql_update("grupo", $conexion, array(
		'gru_nombre' => $gru_nombre
	), $matricula);
	
	if (!$result) {
		$alertMsg = "Algo salio mal: " . mysqli_error($conexion);
	}else{
		$alertMsg = "Grupo editado satisfactoriamente";
	}

	echo "<script language=\"javascript\">
				alert(\"$alertMsg\");
				window.history.go(-2);
			</script>";
?>
