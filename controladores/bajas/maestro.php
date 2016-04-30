<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";
	
	
	$matricula = substr($_POST["matricula"], 1);;
	$Estatus = $_POST["Estatus"];

	$result = mysql_update("maestro", $conexion, array(
		'm_estatus' => $Estatus
	), $matricula);
	
	if (mysqli_affected_rows($conexion) > 0){
			$alertMsg = "Maestro dado de baja satisfactoriamente";
		}elseif (!$result) {
			$alertMsg = "Algo salio mal: " . mysqli_error($conexion);
		}
		else{
			$alertMsg = "No encontramos ningun maestro con la matricula a$matricula";
		}
		echo "<script language=\"javascript\">
					alert(\"$alertMsg\");
					window.location.href = \"../../vistas/menus/menuAdmin.php\"
				</script>";
?>
