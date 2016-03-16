<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";
	
	
	$matricula = $_POST["matricula"];
	
	$result = mysql_delete("curso",$conexion, $matricula);
	
	if (mysqli_affected_rows($conexion) > 0){
		$alertMsg = "Curso dado de baja satisfactoriamente";
	}elseif (!$result) {
		$alertMsg = "Algo salio mal: " . mysqli_error($conexion);
	}
	else{
		$alertMsg = "No encontramos ningun curso con la matricula c$matricula";
	}
	echo "<script language=\"javascript\">
				alert(\"$alertMsg\");
				window.location.href = \"../../vistas/menus/menuAdmin.php\"
			</script>";
?>
