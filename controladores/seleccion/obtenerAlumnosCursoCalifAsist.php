<?php

	include "../../includes/sessionAlumno.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$idMaestro = $_SESSION['matricula'];

	$idCurso = $_GET['id_curso'];


	$sql="SELECT 
				a.id_alumno,
				a.a_nombre,
				a.a_apellidpaterno,
				a.a_apellidomaterno,
				i.inscr_calificacion1,
				i.inscr_calificacion2,
				i.inscr_calificacion3,
				i.inscr_tareas,
				i.inscr_calificacion,
				i.inscr_asistencia
			FROM
			    inscritos i

    		INNER JOIN

	    		alumno a 
    		ON
	    		a.id_alumno = i.id_alumno

			WHERE
				i.id_curso = $idCurso 
			ORDER BY a.id_alumno";

	$result = mysqli_query($conexion, $sql);
	$tableBody = "";

	$formCont = 0;
	while($row = mysqli_fetch_assoc($result)){

		$idAlumno = $row['id_alumno'];
		$nombre = $row['a_nombre'];
		$apellido= $row['a_apellidpaterno'];
		$apellido2= $row['a_apellidomaterno'];


		$calificacion1 = $row['inscr_calificacion1'];
		$calificacion2 = $row['inscr_calificacion2'];
		$calificacion3 = $row['inscr_calificacion3'];
		$tareas = $row['inscr_tareas'];
		$calificacion = $row['inscr_calificacion'];

		$asistencia = $row['inscr_asistencia'];

		$tableBody = $tableBody . "
		<tr>
			<td class=\"id_al\" data-id=\"$idAlumno\">$idAlumno</td>
			<td>$nombre</td>
			<td>$apellido</td>
			<td>$apellido2</td>
			<td><input type=\"text\" id=\"cal1_a$idAlumno\" onchange='recalcula($idAlumno)' value=\"$calificacion1\"></input></td>
			<td><input type=\"text\" id=\"cal2_a$idAlumno\" onchange='recalcula($idAlumno)' value=\"$calificacion2\"></input></td>
			<td><input type=\"text\" id=\"cal3_a$idAlumno\" onchange='recalcula($idAlumno)' value=\"$calificacion3\"></input></td>
			<td><input type=\"text\" id=\"cal4_a$idAlumno\" onchange='recalcula($idAlumno)' value=\"$tareas\"></input></td>
			<td><input type=\"text\" id=\"cal_a$idAlumno\" value=\"$calificacion\" readonly></input></td>
			<td><input type=\"text\" id=\"asis_a$idAlumno\" value=\"$asistencia\"></input></td>
		</tr>
		 ";
		$formCont = $formCont + 1;
	}
	echo $tableBody;
?>