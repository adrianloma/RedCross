<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

$matricula = $_POST["matricula"];
$nombre = $_POST["nombre"];
$objetivoCurso = $_POST["objetivoCurso"];
$unidades = $_POST["unidades"];
$horaInicio = $_POST["horaInicio"];
$horaFinal = $_POST["horaTerminacion"];
$dias = "";
if(isset($_POST['dias'])){
    foreach($_POST['dias'] as $dia){
        $dias = $dias . ",". $dia;
    }
    $dias = substr($dias,1);
}
$isPrioridadAlta = $_POST['isPrioridadAlta'];
$maestroResponsable = $_POST['maestroResponsable'];
$lugar = $_POST['lugar'];

$result = mysql_update("curso", $conexion, array(
	'cu_nombre' => $nombre,
	'cu_objetivo' => $objetivoCurso,
	'cu_numunidades' => $unidades,
	'cu_horaInicio' => $horaInicio,
	'cu_horaFinal' => $horaFinal,
	'cu_dias' => $dias,
	'cu_isPrioridadAlta' => $isPrioridadAlta,
	'cu_aula' => $lugar,
	'id_maestro' => $maestroResponsable

), $matricula);
if (mysqli_affected_rows($conexion) > 0){
	$alertMsg = "Curso actualizado satisfactoriamente";
}
elseif (!$result) {
	$alertMsg = "Algo salio mal: " . mysqli_error($conexion);
}
else{
	$alertMsg = "No encontramos ningun curso con la matricula $matricula o no hubo cambios en la información";
}
	echo "<script language=\"javascript\">
				alert(\"$alertMsg\");
				window.location.href = \"../../vistas/menus/menuAdmin.php\"
			</script>";
?>
