<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$id_carrera = $_GET["id_carrera"];
	$id_periodo = $_GET["id_periodo"];
	$nivel = $_GET["nivel"];
	
	$result = mysql_insert_semestre("nivel_escolar", $conexion, array(
		'ne_desc' => $nivel,
		'id_carrera' => $id_carrera,
		'id_periodo' => $id_periodo
	));

	if ($result){
		$newId = mysqli_insert_id($conexion);
		$alertMsg = "Nuevo nivel escolar agregado satisfactoriamente";
	}else{
		$alertMsg = "Algo salio mal: " . mysqli_error($conexion);
	}

	echo "<script language=\"javascript\">
				alert(\"$alertMsg\");
				window.history.go(-2);
			</script>";
?>
