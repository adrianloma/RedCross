<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$id_periodo = $_GET["id_periodo"];
	$id_nivelEscolar = $_GET["id_semestre"];
	$grupo = $_GET["grupo"];
	
	$result = mysql_insert_grupo("grupo", $conexion, array(
		'gru_nombre' => $grupo,
		'id_nivelEscolar' => $id_nivelEscolar,
		'id_periodo' => $id_periodo
	));

	if ($result){
		$newId = mysqli_insert_id($conexion);
		$alertMsg = "Nuevo grupo agregado satisfactoriamente";
	}else{
		$alertMsg = "Algo salio mal: " . mysqli_error($conexion);
	}

	echo "<script language=\"javascript\">
				alert(\"$alertMsg\");
				window.history.go(-2);
			</script>";
?>
