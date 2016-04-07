<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$nombre = $_POST["nombre"];
	$descripcion = $_POST["descripcion"];

	$result = mysql_insert_carrera("carrera", $conexion, array(
		'c_nombre' => $nombre,
		'c_desc' => $descripcion,
		'c_fechaCreacion' => date("Y-m-d"),
		'c_estatus' => 1
	));

	if ($result){
		$newId = mysqli_insert_id($conexion);
		$alertMsg = "Nueva carrera agregada satisfactoriamente";
	}else{
		$alertMsg = "Algo salio mal: " . mysqli_error($conexion);
	}

	echo "<script language=\"javascript\">
				alert(\"$alertMsg\");
				window.location.href = \"../../vistas/menus/menuAdmin.php\"
			</script>";
?>
