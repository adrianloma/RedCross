<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$buscar = $_GET["buscar"];
	$contiene = $_GET["contiene"];
	$id_periodo = $_GET["id_periodo"];
	$id_nivelEscolar = $_GET["id_nivelEscolar"];
	$id_nivelEscolarViejo = $_GET["id_nivelEscolarViejo"];
	$id_alumno = $_GET["id_alumno"];

	$buscar = mysqli_escape_string($conexion, $buscar);
	$contiene = mysqli_escape_string($conexion, $contiene);

	$sql="SELECT 
			    c.id_curso,
			    c.cu_nombre,
			    m.m_nombre,
			    m.m_apellidopaterno,
			    c.cu_aula,
			    c.cu_horaInicio,
			    c.cu_horaFinal,
			    c.cu_dias
			FROM
			    inscritos i
			        INNER JOIN
			    curso c ON i.id_curso = c.id_curso
			        INNER JOIN
			    grupo g ON g.id_grupo = c.id_grupo
			        INNER JOIN
			    periodo p ON p.id_periodo = g.id_periodo
					inner join
				maestro m on m.id_maestro = c.id_maestro
			WHERE
			    p.id_periodo = $id_periodo
			        AND i.inscr_Cursado = 1
			        AND (g.id_nivelEscolar = $id_nivelEscolarViejo or g.id_nivelEscolar = $id_nivelEscolar)
			        AND i.inscr_calificacion < 70
					And i.id_alumno = $id_alumno";

	switch ($contiene) {
		case 'id_curso':
			$sql .= " and c.id_curso LIKE '%$buscar%'";
			break;
		case 'nombre':
			$sql .= " and c.cu_nombre LIKE '%$buscar%'";
			break;
		case 'maestro':
			$sql .= " and (m.m_nombre LIKE '%$buscar%' or  m.m_apellidopaterno LIKE '%$buscar%')";
			break;
		case 'aula':
			$sql .= " and c.cu_aula LIKE '%$buscar%'";
			break;
		default:
			break;
	}

	$sql .= " order by c.cu_nombre";

	$result = mysqli_query($conexion, $sql);

	while($row = mysqli_fetch_assoc($result)) {
    	echo "	<tr>
		  		<td>" . $row["id_curso"] . "</td>
		  		<td>" . $row["cu_nombre"] . "</td>
		  		<td>" . $row["m_nombre"] . " " .  $row["m_apellidopaterno"] ."</td>
		  		<td>" . $row["cu_aula"] . "</td>
		  		<td>" . $row["cu_horaInicio"] . "</td>
		  		<td>" . $row["cu_horaFinal"] . "</td>
		  		<td>" . $row["cu_dias"] . "</td>
		  	</tr>";
    }

?>
