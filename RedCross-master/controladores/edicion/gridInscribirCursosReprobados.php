<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$buscar = $_GET["buscar"];
	$contiene = $_GET["contiene"];
	$id_carrera = $_GET["id_carrera"];
	$id_nivelEscolar = $_GET["id_nivelEscolar"];
	$id_periodo = $_GET["id_periodo"];
	$id_alumno = $_GET["id_alumno"];

	$buscar = mysqli_escape_string($conexion, $buscar);
	$contiene = mysqli_escape_string($conexion, $contiene);

	$sql="	SELECT 
			    c.id_curso,
			    c.cu_nombre,
			    m.m_nombre,
			    m.m_apellidopaterno,
			    c.cu_aula,
			    c.cu_dias,
			    c.cu_horaInicio,
			    c.cu_horaFinal
			FROM
			    curso c
			        INNER JOIN
			    grupo g ON c.id_grupo = g.id_grupo
			        INNER JOIN
			    maestro m ON m.id_maestro = c.id_maestro
					INNER JOIN
				nivel_escolar n on n.id_nivelEscolar = g.id_nivelEscolar
			WHERE
			    g.id_nivelEscolar = $id_nivelEscolar
			        AND g.id_periodo = $id_periodo
			        AND n.id_carrera = $id_carrera";

	switch ($contiene) {
		case 'id_curso':
			$sql .= " and c.id_curso LIKE '%$buscar%'";
			break;
		case 'nombre':
			$sql .= " and c.cu_nombre LIKE '%$buscar%'";
			break;
		case 'maestro':
			$sql .= " and (m.m_nombre LIKE '%$buscar%'
						or  m.m_apellidopaterno LIKE '%$buscar%')";
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

		$sql2 = "select count(*) as cont from inscritos where id_alumno = $id_alumno and id_curso=".$row['id_curso'];

		$result2 = mysqli_query($conexion, $sql2);

		while($row2 = mysqli_fetch_assoc($result2)) {
			$cont = $row2['cont'];
		}

		if($cont > 0){
			echo "	<tr>
				  		<td>" . $row["id_curso"] . "</td>
				  		<td>" . $row["cu_nombre"] . "</td>
				  		<td>" . $row["m_nombre"] . " " .  $row["m_apellidopaterno"] ."</td>
				  		<td>" . $row["cu_aula"] . "</td>
				  		<td>" . $row["cu_horaInicio"] . "</td>
				  		<td>" . $row["cu_horaFinal"] . "</td>
				  		<td>" . $row["cu_dias"] . "</td>
				  		<td><input type='checkbox' name='inscribir' onchange='guardar(".$id_alumno.", false, ".$row["id_curso"].")' value='".$id_alumno."' checked></td>
				  	</tr>";
		}else{
			echo "	<tr>
				  		<td>" . $row["id_curso"] . "</td>
				  		<td>" . $row["cu_nombre"] . "</td>
				  		<td>" . $row["m_nombre"] . " " .  $row["m_apellidopaterno"] ."</td>
				  		<td>" . $row["cu_aula"] . "</td>
				  		<td>" . $row["cu_horaInicio"] . "</td>
				  		<td>" . $row["cu_horaFinal"] . "</td>
				  		<td>" . $row["cu_dias"] . "</td>
				  		<td><input type='checkbox' name='inscribir' onchange='guardar(".$id_alumno.", true, ".$row["id_curso"].")' value='".$id_alumno."'></td>
				  	</tr>";
		}
    }

?>
