<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$matricula = $_POST["matricula"];
	$nombre = $_POST["nombre"];
	$descripcion = $_POST["descripcion"];
	$estatus = $_POST["estatus"];

	$result = mysql_update("carrera", $conexion, array(
		'c_nombre' => $nombre,
		'c_desc' => $descripcion,
		'c_estatus' => $estatus
	), $matricula);
	
	if (mysqli_affected_rows($conexion) > 0){
		$alertMsg = "Carrera actualizada satisfactoriamente";
	}elseif (!$result) {
		$alertMsg = "Algo salio mal: " . mysqli_error($conexion);
	}else{
		$alertMsg = "No encontramos ninguna carreray con la matricula $matricula o no hubo cambios en la información";
	}

	echo "<script language=\"javascript\">
				alert(\"$alertMsg\");
				window.history.go(-2);
			</script>";
?>
