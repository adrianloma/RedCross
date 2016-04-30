<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$matricula = $_POST["matricula"];
	$nivel = $_POST["nivel"];

	$result = mysql_update("nivel_escolar", $conexion, array(
		'ne_desc' => $nivel
	), $matricula);
	
	if (!$result) {
		$alertMsg = "Algo salio mal: " . mysqli_error($conexion);
	}else{
		$alertMsg = "Nivel Escolar editado satisfactoriamente";
	}

	echo "<script language=\"javascript\">
				alert(\"$alertMsg\");
				window.history.go(-2);
			</script>";
?>
