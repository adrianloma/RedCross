<?php

	include "../../includes/sessionAlumno.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$idAlumno = $_SESSION['matricula'];
	$sql="	SELECT 
			    i.id_alumno,
			    i.inscr_calificacion1,
			    i.inscr_calificacion2,
			    i.inscr_calificacion3,
			    IFNULL(i.inscr_calificacion, 0) AS inscr_calificacion,
			    IFNULL(i.inscr_asistencia, 0) AS inscr_asistencia,
			    IF(i.inscr_Cursado = 0, 'No', 'Si') AS cursado,
			    c.id_curso,
			    c.cu_nombre,
			    p.per_desc,
			    n.ne_desc,
			    ca.c_nombre
			FROM
			    inscritos i
			        INNER JOIN
			    curso c ON i.id_curso = c.id_curso
			        INNER JOIN
			    grupo g ON g.id_grupo = c.id_grupo
			        INNER JOIN
			    periodo p ON p.id_periodo = g.id_periodo
			        INNER JOIN
			    nivel_escolar n ON n.id_nivelEscolar = g.id_nivelEscolar
			        INNER JOIN
			    carrera ca ON ca.id_carrera = n.id_carrera
			WHERE
			    i.id_alumno = $idAlumno
			ORDER BY i.inscr_Cursado , ne_desc desc, c.cu_nombre";
	$result = mysqli_query($conexion, $sql);
	$tableBody = "";
	$formCont = 0;
	while($row = mysqli_fetch_assoc($result)){
		$idCurso = $row['id_curso'];
		$nombre = $row['cu_nombre'];
		$calif1 = $row['inscr_calificacion1'];
		$calif2 = $row['inscr_calificacion2'];
		$calif3 = $row['inscr_calificacion3'];
		$califFinal = $row['inscr_calificacion'];
		$asistencia = $row['inscr_asistencia'];
		$cursado = $row['cursado'];
		$periodo = $row['per_desc'];
		$nivelEscolar = $row['ne_desc'];
		$siglas = $row['c_nombre'];
		$tableBody = $tableBody . "
		<tr>
			<td>$idCurso</td>
			<td>$nombre</td>
			<td>$calif1</td>
			<td>$calif2</td>
			<td>$calif3</td>
			<td>$califFinal</td>
			<td>$asistencia</td>
			<td>$cursado</td>
			<td>$periodo</td>
			<td>$nivelEscolar</td>
			<td>$siglas</td>
		</tr>
		 ";
		$formCont = $formCont + 1;
	}
	echo $tableBody;
?>
