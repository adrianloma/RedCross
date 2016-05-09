<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";
	
	$id_permiso = $_POST["id_permiso"];

	if (isset($_POST['altaAdmin'])) {
		$altaAdmin = 1;
		$_SESSION['altaAdmin'] = 1;
	} else {
		$altaAdmin = 0;
		$_SESSION['altaAdmin'] = 0;
	}

	if (isset($_POST['bajaAdmin'])) {
		$bajaAdmin = 1;
		$_SESSION['bajaAdmin'] = 1;
	} else {
		$bajaAdmin = 0;
		$_SESSION['bajaAdmin'] = 0;
	}

	if (isset($_POST['cambioAdmin'])) {
		$cambioAdmin = 1;
		$_SESSION['cambioAdmin'] = 1;
	} else {
		$cambioAdmin = 0;
		$_SESSION['cambioAdmin'] = 0;
	}

	if (isset($_POST['altaMaestro'])) {
		$altaMaestro = 1;
		$_SESSION['altaMaestro'] = 1;
	} else {
		$altaMaestro = 0;
		$_SESSION['altaMaestro'] = 0;
	}

	if (isset($_POST['bajaMaestro'])) {
		$bajaMaestro = 1;
		$_SESSION['bajaMaestro'] = 1;
	} else {
		$bajaMaestro = 0;
		$_SESSION['bajaMaestro'] = 0;
	}

	if (isset($_POST['cambioMaestro'])) {
		$cambioMaestro = 1;
		$_SESSION['cambioMaestro'] = 1;
	} else {
		$cambioMaestro = 0;
		$_SESSION['cambioMaestro'] = 0;
	}

	if (isset($_POST['altaAlumno'])) {
		$altaAlumno = 1;
		$_SESSION['altaAlumno'] = 1;
	} else {
		$altaAlumno = 0;
		$_SESSION['altaAlumno'] = 0;
	}

	if (isset($_POST['bajaAlumno'])) {
		$bajaAlumno = 1;
		$_SESSION['bajaAlumno'] = 1;
	} else {
		$bajaAlumno = 0;
		$_SESSION['bajaAlumno'] = 0;
	}

	if (isset($_POST['cambioAlumno'])) {
		$cambioAlumno = 1;
		$_SESSION['cambioAlumno'] = 1;
	} else {
		$cambioAlumno = 0;
		$_SESSION['cambioAlumno'] = 0;
	}

	if (isset($_POST['altaPeriodo'])) {
		$altaPeriodo = 1;
		$_SESSION['altaPeriodo'] = 1;
	} else {
		$altaPeriodo = 0;
		$_SESSION['altaPeriodo'] = 0;
	}

	if (isset($_POST['bajaPeriodo'])) {
		$bajaPeriodo = 1;
		$_SESSION['bajaPeriodo'] = 1;
	} else {
		$bajaPeriodo = 0;
		$_SESSION['bajaPeriodo'] = 0;
	}

	if (isset($_POST['cambioPeriodo'])) {
		$cambioPeriodo = 1;
		$_SESSION['cambioPeriodo'] = 1;
	} else {
		$cambioPeriodo = 0;
		$_SESSION['cambioPeriodo'] = 0;
	}

	if (isset($_POST['altaGrupoCursos'])) {
		$altaGrupoCursos = 1;
		$_SESSION['altaGrupoCursos'] = 1;
	} else {
		$altaGrupoCursos = 0;
		$_SESSION['altaGrupoCursos'] = 0;
	}

	if (isset($_POST['bajaGrupoCursos'])) {
		$bajaGrupoCursos = 1;
		$_SESSION['bajaGrupoCursos'] = 1;
	} else {
		$bajaGrupoCursos = 0;
		$_SESSION['bajaGrupoCursos'] = 0;
	}

	if (isset($_POST['cambioGrupoCursos'])) {
		$cambioGrupoCursoselds = 1;
		$_SESSION['cambioGrupoCursos'] = 1;

	} else {
		$cambioGrupoCursoselds = 0;
		$_SESSION['cambioGrupoCursos'] = 0;
	}

	if (isset($_POST['verReportes'])) {
		$verReportes = 1;
		$_SESSION['verReportes'] = 1;
	} else {
		$verReportes = 0;
		$_SESSION['verReportes'] = 0;
	}


	$result = mysql_update("permiso", $conexion, array(
		'p_aAdmin' => $altaAdmin,
		'p_bAdmin' => $bajaAdmin,
		'p_cAdmin' => $cambioAdmin,
		'p_aMaestro' => $altaMaestro,
		'p_bMaestro' => $bajaMaestro,
		'p_cMaestro' => $cambioMaestro,
		'p_aAlumno' => $altaAlumno,
		'p_bAlumno' => $bajaAlumno,
		'p_cAlumno' => $cambioAlumno,
		'p_aPeriodo' => $altaPeriodo,
		'p_bPeriodo' => $bajaPeriodo,
		'p_cPeriodo' => $cambioPeriodo,
		'p_aGruposCursos' => $altaGrupoCursos,
		'p_bGruposCursos' => $bajaGrupoCursos,
		'p_cGruposCursos' => $cambioGrupoCursoselds,
		'p_verReportes' => $verReportes
	), $id_permiso);

	if (mysqli_affected_rows($conexion) > 0){
		$alertMsg = "Permiso actualizado satisfactoriamente";
	}
	elseif (!$result) {
		$alertMsg = "Algo salio mal: " . mysql_error();
	}
	else{
		$alertMsg = "No encontramos ningun Permiso con el id $id_permiso o no hubo cambios en la informacion";
	}

		echo "<script>	
			alert(\"$alertMsg\");		
			window.location.href = \"../../vistas/menus/menuABCAdmins.php\"
			</script>";
?>
