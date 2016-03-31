<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$buscar = $_GET["buscar"];
	$contiene = $_GET["contiene"];

	$buscar = mysqli_escape_string($conexion, $buscar);
	$contiene = mysqli_escape_string($conexion, $contiene);

	$sql="select 
			    id_maestro,
				m_nombre,
				m_apellidoPaterno,
				m_apellidoMaterno,
				m_email,
			    m_curp,
			    m_estatus
			from
			    maestro";

	switch ($contiene) {
		case 'id_maestro':
			$sql .= " where id_maestro LIKE '%$buscar%'";
			break;
		case 'a_nombre':
			$sql .= " where m_nombre LIKE '%$buscar%'";
			break;
		case 'a_apellidoPaterno':
			$sql .= " where m_apellidoPaterno LIKE '%$buscar%'";
			break;
		case 'a_apellidoMaterno':
			$sql .= " where m_apellidoMaterno LIKE '%$buscar%'";
			break;
		case 'a_email':
			$sql .= " where m_email LIKE '%$buscar%'";
			break;
		case 'a_curp':
			$sql .= " where m_curp LIKE '%$buscar%'";
			break;
		case 'm_estatus':
			$sql .= " where m_estatus LIKE '%$buscar%'";
			break;
		default:
			break;
	}

	$sql .= " order by m_nombre, m_apellidoPaterno, m_apellidoMaterno;";

	$result = mysqli_query($conexion, $sql);

	while($row = mysqli_fetch_assoc($result)) {
        echo "	<tr>
			  		<td>m" . $row["id_maestro"] . "</td>
			  		<td>" . $row["m_nombre"] . "</td>
			  		<td>" . $row["m_apellidoPaterno"] . "</td>
			  		<td>" . $row["m_apellidoMaterno"] . "</td>
			  		<td>" . $row["m_email"] . "</td>
			  		<td>" . $row["m_curp"] . "</td>
			  		<td>" . $row["m_estatus"] . "</td>
			  		<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"editar(" . $row["id_maestro"] . ")\">Editar</button></td>
				  	<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"baja(" . $row["id_maestro"] . ")\">Baja</button></td>
			  	</tr>";
    }

?>
