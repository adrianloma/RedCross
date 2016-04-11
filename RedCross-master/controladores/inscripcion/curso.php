<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

$grupo = $_POST["grupo"];
$nombre = $_POST["nombre"];
$objetivoCurso = $_POST["objetivoCurso"];
$unidades = $_POST["unidades"];
$dias = "";
$horaInicio = $_POST["horaInicio"];
$horaFinal = $_POST["horaTerminacion"];

if(isset($_POST['dias'])){
    foreach($_POST['dias'] as $dia){
        $dias = $dias . "," . $dia;
    }
    $dias = substr($dias,1);
}

$isPrioridadAlta = $_POST['isPrioridadAlta'];
$maestroResponsable = $_POST['maestroResponsable'];
$lugar = $_POST['lugar'];


$result = mysql_insert_curso("curso", $conexion, array(
	'id_grupo'  => $grupo,
	'cu_nombre' => $nombre,
	'cu_objetivo' => $objetivoCurso,
	'cu_numunidades' => $unidades,
	'cu_fecharegistro' => date("Y-m-d"),
	'cu_horaInicio' => $horaInicio,
	'cu_horaFinal' => $horaFinal,
	'cu_dias' => $dias,
	'cu_isPrioridadAlta' => $isPrioridadAlta,
	'cu_aula' => $lugar,
	'id_maestro' => $maestroResponsable
));

if ($result){
	$newId = mysqli_insert_id($conexion);
	$alertMsg = "Nuevo curso agregado satisfactoriamente con matricula $newId";
}
else{
	$alertMsg = "Algo salio mal: " . mysqli_error($conexion);
}
	echo "<script language=\"javascript\">
				alert(\"$alertMsg\");
				window.history.go(-2);
			</script>";
?>
