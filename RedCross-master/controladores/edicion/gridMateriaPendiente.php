<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$buscar = $_GET["buscar"];
	$contiene = $_GET["contiene"];
	$id_carrera = $_GET["id_carrera"];
	$id_nivelEscolar = $_GET["id_Semestre"];
	$id_periodo = $_GET["id_periodo"] - 1;

	$buscar = mysqli_escape_string($conexion, $buscar);
	$contiene = mysqli_escape_string($conexion, $contiene);

	$sql = "SELECT 
			    id_nivelEscolar
			FROM
			    nivel_escolar
			WHERE
			    id_carrera = $id_carrera
			having id_nivelEscolar < $id_nivelEscolar
			order by id_nivelEscolar desc
			limit 1";

	$result = mysqli_query($conexion, $sql);
	$id_nivelEscolarViejo = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$id_nivelEscolarViejo = $row['id_nivelEscolar'];
	}

	$sql="	SELECT 
			    a.id_alumno,
			    a.a_nombre,
			    a.a_apellidpaterno,
			    a.a_apellidomaterno,
			    a.a_email,
			    a.a_curp,
			    g.id_nivelEscolar
			FROM
			    inscritos i
			        INNER JOIN
			    curso c ON i.id_curso = c.id_curso
			        INNER JOIN
			    grupo g ON g.id_grupo = c.id_grupo
			        INNER JOIN
			    periodo p ON p.id_periodo = g.id_periodo
			        INNER JOIN
			    alumno a ON a.id_alumno = i.id_alumno
			WHERE
			    p.id_periodo = $id_periodo
					AND i.inscr_Cursado = 1
			        AND (g.id_nivelEscolar = $id_nivelEscolarViejo or g.id_nivelEscolar = $id_nivelEscolar)
			        AND a.id_nivelEscolar = $id_nivelEscolar
			        AND i.inscr_calificacion < 70
			        AND a.a_estatus = 'Activo'
			        AND a.id_carrera = $id_carrera";

	switch ($contiene) {
		case 'id_alumno':
			$sql .= " and a.id_alumno LIKE '%$buscar%'";
			break;
		case 'a_nombre':
			$sql .= " and a.a_nombre LIKE '%$buscar%'";
			break;
		case 'a_apellidoPaterno':
			$sql .= " and a.a_apellidPaterno LIKE '%$buscar%'";
			break;
		case 'a_apellidoMaterno':
			$sql .= " and a.a_apellidoMaterno LIKE '%$buscar%'";
			break;
		case 'a_email':
			$sql .= " and a.a_email LIKE '%$buscar%'";
			break;
		case 'a_curp':
			$sql .= " and a.a_curp LIKE '%$buscar%'";
			break;
		default:
			break;
	}

	$sql .= " group by a.id_alumno order by a.a_nombre, a.a_apellidPaterno, a.a_apellidoMaterno;";

	$result = mysqli_query($conexion, $sql);

	while($row = mysqli_fetch_assoc($result)) {
        echo "	<tr>
			  		<td>a" . $row["id_alumno"] . "</td>
			  		<td>" . $row["a_nombre"] . "</td>
			  		<td>" . $row["a_apellidpaterno"] . "</td>
			  		<td>" . $row["a_apellidomaterno"] . "</td>
			  		<td>" . $row["a_email"] . "</td>
			  		<td>" . $row["a_curp"] . "</td>
			  		<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"historial(" . $row["id_alumno"]. ",'" . $row["a_nombre"] . " " .  $row["a_apellidpaterno"] ."'," . $id_periodo .",". $id_nivelEscolarViejo.",". $id_nivelEscolar .")\">Ver</button></td>
			  		<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"inscribir(" . $row["id_alumno"] .",". $row["id_nivelEscolar"]. ",'" . $row["a_nombre"] . " " .  $row["a_apellidpaterno"] . "')\">Ir</button></td>
			  	</tr>";
    }

?>
