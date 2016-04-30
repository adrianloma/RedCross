<?php

	include "../../includes/sessionAlumno.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$idAlumno = $_SESSION['matricula'];

	$sql="SELECT 
			    i.id_alumno,
			    c.id_curso,
			    c.cu_nombre,
			    c.cu_dias,
			    c.cu_horaInicio,
			    c.cu_horaFinal,
			    c.cu_aula,
			    Concat(m.m_nombre,' ', m.m_apellidoPaterno, ' ', m.m_apellidoMaterno) as Maestro
			FROM
			    inscritos i inner join 
					curso c on i.id_curso = c.id_curso
			        inner join
			        maestro m on m.id_maestro = c.id_maestro
			WHERE
			    i.id_alumno = $idAlumno
			        AND i.id_curso = c.id_curso
			        AND i.inscr_Cursado = 0
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
		$Maestro = $row['Maestro'];
		$tableBody = $tableBody . "
		<tr>
			<td>$idCurso</td>
			<td>$nombre</td>
			<td>$dias</td>
			<td>$horario</td>
			<td>$aula</td>
			<td>$Maestro</td>
		</tr>
		 ";
		$formCont = $formCont + 1;
	}
	echo $tableBody;
?>