<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	//Variables
	$m_contra = $_POST["m_contra"]; 
	$m_nombre = $_POST["m_nombre"];
	$m_apellidopaterno = $_POST["m_apellidopaterno"];
	$m_apellidomaterno = $_POST["m_apellidomaterno"];
	$m_fechanac =$_POST["m_fechanac"];
	$m_edad = $_POST["m_edad"];
	$m_lugarnac = $_POST["m_lugarnac"];
	$m_nacionalidad = $_POST["m_nacionalidad"];
	$m_sexo = $_POST["m_sexo"];
	$m_estadocivil = $_POST["m_estadocivil"];
	$m_gposanguineo = $_POST["m_gposanguineo"];
	$m_rh = $_POST["m_rh"];
	$m_curp = $_POST["m_curp"];
	$m_servmedico = $_POST["m_servmedico"];
	$m_trabajo = $_POST["m_trabajo"];
	$m_enfermedades = $_POST["m_enfermedades"];
	$m_alergias = $_POST["m_alergias"];
	$m_debilidadmotriz = $_POST["m_debilidadmotriz"];
	$m_domicilio = $_POST["m_domicilio"];
	$m_numext = $_POST["m_numext"];
	$m_numint = $_POST["m_numint"];
	$m_cp = $_POST["m_cp"];
	$m_colonia = $_POST["m_colonia"];
	$m_municipio = $_POST["m_municipio"];
	$m_numlocal = $_POST["m_numlocal"];
	$m_numcelular = $_POST["m_numcelular"];
	$m_escolaridad = $_POST["m_escolaridad"];
	$m_otrosestudios = $_POST["m_otrosestudios"];
	$m_email = $_POST["m_email"];
	//$m_fecharegistro = $_POST["m_fecharegistro"];
	//$m_estudios = $_POST["m_estudios"];
	$m_estatus = 1;
	
	
	



		
	$result = mysql_insert_Maestro("maestro", $conexion, array(
		'm_contra' => md5($m_contra),
		'm_nombre' => $m_nombre,
		'm_apellidopaterno' => $m_apellidopaterno,
		'm_apellidomaterno' => $m_apellidomaterno,
		'm_fechanac' => $m_fechanac,
		'm_edad' => $m_edad,
		'm_lugarnac' => $m_lugarnac,
		'm_nacionalidad' => $m_nacionalidad,
		'm_sexo' => $m_sexo,
		'm_estadocivil' => $m_estadocivil,
		'm_gposanguineo' => $m_gposanguineo,
		'm_rh' => $m_rh,
		'm_curp' => $m_curp,
		'm_servmedico' => $m_servmedico,
		'm_trabajo' => $m_trabajo,
		'm_enfermedades' => $m_enfermedades,
		'm_alergias' => $m_alergias,
		'm_debilidadmotriz' => $m_debilidadmotriz,
		'm_domicilio' => $m_domicilio,
		'm_numext' => $m_numext,
		'm_numint' => $m_numint,
		'm_cp' => $m_cp,
		'm_colonia' => $m_colonia,
		'm_municipio' => $m_municipio,
		'm_numlocal' => $m_numlocal,
		'm_numcelular' => $m_numcelular,
		'm_escolaridad' => $m_escolaridad,
		'm_otrosestudios' => $m_otrosestudios,
		'm_email' => $m_email,
		'm_fecharegistro' =>  date("Y-m-d"),
		'm_estudios' => $m_escolaridad,
		'm_estatus' => $m_estatus
	));

	$newId = mysqli_insert_id($conexion);

	if ($result){
		$alertMsg = "Nuevo maestro agregado satisfactoriamente con matricula: a$newId";
	}
	else{
		$alertMsg = "Algo salio mal: " . mysqli_error($conexion);
	}
		echo "<script language=\"javascript\">
					alert(\"$alertMsg\");
					window.location.href = \"../../vistas/menus/menuABCMaestros.php\"
				</script>";
?>
