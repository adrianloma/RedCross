<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$matricula = $_POST["matricula"];
	$descripcion = $_POST["descripcion"];

	$result = mysql_update("periodo", $conexion, array(
		'per_desc' => $descripcion
	), $matricula);
	
	if (!$result) {
		$alertMsg = "Algo salio mal: " . mysqli_error($conexion);
	}else{
		$alertMsg = "Periodo actualizado satisfactoriamente";
	}

	echo "<script language=\"javascript\">
				alert(\"$alertMsg\");
				window.location.href = \"../../vistas/menus/menuABCPeriodos.php\"
			</script>";
?>
