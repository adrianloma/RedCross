<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$buscar = $_GET["buscar"];
	$contiene = $_GET["contiene"];

	$buscar = mysqli_escape_string($conexion, $buscar);
	$contiene = mysqli_escape_string($conexion, $contiene);

	$sql="select 
			    a.id_alumno,
				a.a_nombre,
				a.a_apellidPaterno,
				a.a_apellidoMaterno,
				a.a_email,
			    a.a_curp,
			    c.c_nombre,
			    g.id_periodo,
			    g.gru_nombre,
			    a.a_estatus
			from
			    alumno 	a	left join grupo g
								on	a.id_grupo = g.id_grupo
							left join carrera c
								on a.id_carrera = c.id_carrera";

	switch ($contiene) {
		case 'id_alumno':
			$sql .= " where a.id_alumno LIKE '%$buscar%'";
			break;
		case 'a_nombre':
			$sql .= " where a.a_nombre LIKE '%$buscar%'";
			break;
		case 'a_apellidoPaterno':
			$sql .= " where a.a_apellidPaterno LIKE '%$buscar%'";
			break;
		case 'a_apellidoMaterno':
			$sql .= " where a.a_apellidoMaterno LIKE '%$buscar%'";
			break;
		case 'a_email':
			$sql .= " where a.a_email LIKE '%$buscar%'";
			break;
		case 'a_curp':
			$sql .= " where a.a_curp LIKE '%$buscar%'";
			break;
		case 'carrera':
			$sql .= " where c.c_nombre LIKE '%$buscar%'";
			break;
		case 'periodo':
			$sql .= " where g.id_periodo LIKE '%$buscar%'";
			break;
		case 'grupo':
			$sql .= " where g.gru_nombre LIKE '%$buscar%'";
			break;
		case 'a_estatus':
			$sql .= " where a.a_estatus LIKE '%$buscar%'";
			break;
		default:
			break;
	}

	$sql .= " order by a.a_nombre, a.a_apellidPaterno, a.a_apellidoMaterno;";

	$result = mysqli_query($conexion, $sql);

	while($row = mysqli_fetch_assoc($result)) {
        echo "	<tr>
			  		<td>a" . $row["id_alumno"] . "</td>
			  		<td>" . $row["a_nombre"] . "</td>
			  		<td>" . $row["a_apellidPaterno"] . "</td>
			  		<td>" . $row["a_apellidoMaterno"] . "</td>
			  		<td>" . $row["a_email"] . "</td>
			  		<td>" . $row["a_curp"] . "</td>
			  		<td>" . $row["c_nombre"] . "</td>
			  		<td>" . $row["id_periodo"] . "</td>
			  		<td>" . $row["gru_nombre"] . "</td>
			  		<td>" . $row["a_estatus"] . "</td>
			  		<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"editar(" . $row["id_alumno"] . ")\">Editar</button></td>
				  	<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"baja(" . $row["id_alumno"] . ")\">Baja</button></td>
			  	</tr>";
    }

?>
