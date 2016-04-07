<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$descripcion = $_POST["descripcion"];

	$result = mysql_insert_periodo("periodo", $conexion, array(
		'per_desc' => $descripcion,
		'per_fechaCreacion' => date("Y-m-d"),
		'per_estatus' => 1
	));

	if ($result){
		$newId = mysqli_insert_id($conexion);
		$alertMsg = "Nuevo periodo agregado satisfactoriamente";
	}else{
		$alertMsg = "Algo salio mal: " . mysqli_error($conexion);
	}

	echo "<script language=\"javascript\">
				alert(\"$alertMsg\");
				window.location.href = \"../../vistas/menus/menuABCPeriodos.php\"
			</script>";
?>
