<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	//Variables
	$nombres = $_POST["nombres"];
	$APaterno = $_POST["APaterno"];
	$AMaterno = $_POST["AMaterno"];
	$FechaNacimiento = $_POST["FechaNacimiento"];
	$LugarNacimiento = $_POST["LugarNacimiento"];
	$Nacionalidad = $_POST["Nacionalidad"];
	$Sexo = $_POST["Sexo"];
	$EstadoCivil = $_POST["EstadoCivil"];
	$GrupoSanguineo = $_POST["GrupoSanguineo"];
	$RH = $_POST["RH"];
	$CURP = $_POST["CURP"];
	$ServicioMedico = $_POST["ServicioMedico"];
	$ActualmenteLaborando = $_POST["ActualmenteLaborando"];
	$Enfermedades = $_POST["Enfermedades"];
	$Alergias = $_POST["Alergias"];
	$DebilidadMotriz = $_POST["DebilidadMotriz"];
	$Direccion = $_POST["Direccion"];
	$CP = $_POST["CP"];
	$Colonia = $_POST["Colonia"];
	$Municipio = $_POST["Municipio"];
	$TelefonoLocal = $_POST["TelefonoLocal"];
	$TelefonoCelular = $_POST["TelefonoCelular"];
	$Escolaridad = $_POST["Escolaridad"];
	$OtrosEstudios = $_POST["OtrosEstudios"];
	$Email = $_POST["Email"];
	$Contrasena = $_POST["Contrasena"];
	$NumInterior = $_POST["NumInterior"];
	$NumExterior = $_POST["NumExterior"];


	$result = mysql_insert_Admin("administrador", $conexion, array(
		'd_contra' => md5($Contrasena),
		'd_nombre' => $nombres,
		'd_apellidopaterno' => $APaterno,
		'd_apellidomaterno' => $AMaterno,
		'd_fechanac' => $FechaNacimiento,
		'd_lugarnac' => $LugarNacimiento,
		'd_nacionalidad' => $Nacionalidad,
		'd_sexo' => $Sexo,
		'd_estadocivil' => $EstadoCivil,
		'd_gposanguineo' => $GrupoSanguineo,
		'd_rh' => $RH,
		'd_curp' => $CURP,
		'd_servmedico' => $ServicioMedico,
		'd_trabajo' => $ActualmenteLaborando,
		'd_enfermedades' => $Enfermedades,
		'd_alergias' => $Alergias,
		'd_debilidadmotriz' => $DebilidadMotriz,
		'd_domicilio' => $Direccion,
		'd_cp' => $CP,
		'd_colonia' => $Colonia,
		'd_municipio' => $Municipio,
		'd_numlocal' => $TelefonoLocal,
		'd_numcelular' => $TelefonoCelular,
		'd_email' => $Email,
		'd_otrosestudios' => $OtrosEstudios,
		'd_fecharegistro' => date("Y-m-d"),
    'd_numint' => $NumInterior,
    'd_numext' => $NumExterior,
    'd_edad' => 0,
    'd_escolaridad' => $Escolaridad
	));

	$newId = mysqli_insert_id($conexion);

  if ($result){
    $alertMsg = "Nuevo administrador agregado satisfactoriamente";
  }
  else{
    $alertMsg = "Algo salio mal: " . mysqli_error($conexion);
  }

	$newIdPermiso = mysqli_insert_id($conexion);

  	$resultPermiso = mysql_insert_permiso("permiso", $conexion, array(
		'id_administrador' => $newId,		
		'p_aAdmin' => 0,
		'p_bAdmin' => 0,
		'p_cAdmin' => 0,
		'p_aMaestro' => 0,
		'p_bMaestro' => 0,
		'p_cMaestro' => 0,
		'p_aAlumno' => 0,
		'p_bAlumno' => 0,
		'p_cAlumno' => 0,
		'p_aPeriodo' => 0,
		'p_bPeriodo' => 0,
		'p_cPeriodo' => 0,
		'p_aGruposCursos' => 0,
		'p_bGruposCursos' => 0,
		'p_cGruposCursos' => 0,
		'p_verReportes' => 0
	));

  if ($resultPermiso){
    $alertMsg = "Nuevo administrador agregado satisfactoriamente";
  }
  else{
    $alertMsg = "Algo salio mal: " . mysqli_error($conexion);
  }
    echo "<script language=\"javascript\">
          alert(\"$alertMsg\");
          window.location.href = \"../../vistas/menus/menuABCAdmins.php\"
        </script>";

?>
