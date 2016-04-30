<?php

	include "../../includes/sessionAlumno.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$idMaestro = $_SESSION['matricula'];

	$sql="SELECT 
			    c.id_curso,
			    c.cu_nombre,
			    c.cu_dias,
			    c.cu_horaInicio,
			    c.cu_horaFinal,
			    c.cu_aula
			FROM
			    curso c
			        INNER JOIN
			    maestro m ON m.id_maestro = c.id_maestro
			        INNER JOIN
			    grupo g ON g.id_grupo = c.id_grupo
			        INNER JOIN
			    periodo p ON p.id_periodo = g.id_periodo
			WHERE
				c.id_maestro = $idMaestro 
				AND p.per_estatus = 1
			ORDER BY c.id_curso";
	$result = mysqli_query($conexion, $sql);
	$tableBody = "";

	$formCont = 0;
	while($row = mysqli_fetch_assoc($result)){
		$idCurso = $row['id_curso'];
		$nombre = $row['cu_nombre'];
		$dias = $row['cu_dias'];
		$horainicio = $row['cu_horaInicio'];
		$horafinal = $row['cu_horaFinal'];
		$horario = date('h:i A' , strtotime($row['cu_horaInicio']))." a ".date('h:i A' , strtotime($row['cu_horaFinal']));
		$aula = $row['cu_aula'];
		$tableBody = $tableBody . "
		<tr>
			<td>$idCurso</td>
			<td>$nombre</td>
			<td>$dias</td>
			<td>$horario</td>
			<td>$aula</td>
		</tr>
		 ";
		$formCont = $formCont + 1;
	}
	echo $tableBody;
?>