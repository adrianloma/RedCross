<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$buscar = $_GET["buscar"];
	$contiene = $_GET["contiene"];

	$buscar = mysqli_escape_string($conexion, $buscar);
	$contiene = mysqli_escape_string($conexion, $contiene);

	$sql="select 
			    cu.id_curso,
			    cu.cu_nombre,
			    m.m_nombre,
			    m.m_apellidopaterno,
			    cu.cu_aula,
			    cu.cu_dias,
			    cu.cu_horaInicio,
			    cu.cu_horaFinal,
			    c.c_nombre,
			    g.gru_nombre,
			    g.id_periodo
			from
			    curso cu left join maestro m
							on m.id_maestro = cu.id_maestro
						 left join grupo g
							on g.id_grupo = cu.id_grupo
						 left join nivel_escolar n
			                on n.id_nivelEscolar = g.id_nivelEscolar
						 left join carrera c
							on c.id_carrera = n.id_carrera";

	switch ($contiene) {
		case 'id_curso':
			$sql .= " where cu.id_curso LIKE '%$buscar%'";
			break;
		case 'nombre':
			$sql .= " where cu.cu_nombre LIKE '%$buscar%'";
			break;
		case 'maestro':
			$sql .= " where m.m_nombre LIKE '%$buscar%'
						or  m.m_apellidopaterno LIKE '%$buscar%'";
			break;
		case 'aula':
			$sql .= " where cu.cu_aula LIKE '%$buscar%'";
			break;
		case 'carrera':
			$sql .= " where c.c_nombre LIKE '%$buscar%'";
			break;
		case 'grupo':
			$sql .= " where g.gru_nombre LIKE '%$buscar%'";
			break;
		case 'periodo':
			$sql .= " where g.id_periodo LIKE '%$buscar%'";
			break;
		default:
			break;
	}

	$sql .= " order by cu.cu_nombre, c.c_nombre";

	$result = mysqli_query($conexion, $sql);

	while($row = mysqli_fetch_assoc($result)) {
        echo "	<tr>
			  		<td>c" . $row["id_curso"] . "</td>
			  		<td>" . $row["cu_nombre"] . "</td>
			  		<td>" . $row["m_nombre"] . " " .  $row["m_apellidopaterno"] ."</td>
			  		<td>" . $row["cu_aula"] . "</td>
			  		<td>" . $row["cu_horaInicio"] . "</td>
			  		<td>" . $row["cu_horaFinal"] . "</td>
			  		<td>" . $row["cu_dias"] . "</td>
			  		<td>" . $row["c_nombre"] . "</td>
			  		<td>" . $row["gru_nombre"] . "</td>
			  		<td>" . $row["id_periodo"] . "</td>
			  		<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"editar(" . $row["id_curso"] . ")\">Editar</button></td>
				  	<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"baja(" . $row["id_curso"] . ")\">Baja</button></td>
			  	</tr>";
    }

?>
