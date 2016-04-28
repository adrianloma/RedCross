<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$buscar = $_GET["buscar"];
	$contiene = $_GET["contiene"];

	$buscar = mysqli_escape_string($conexion, $buscar);
	$contiene = mysqli_escape_string($conexion, $contiene);

	$sql="select 
			    id_administrador,
				d_nombre,
				d_apellidoPaterno,
				d_apellidoMaterno,
				d_email,
			    d_curp
			from
			    administrador";

	switch ($contiene) {
		case 'id_administrador':
			$sql .= " where id_administrador LIKE '%$buscar%'";
			break;
		case 'd_nombre':
			$sql .= " where d_nombre LIKE '%$buscar%'";
			break;
		case 'd_apellidoPaterno':
			$sql .= " where d_apellidoPaterno LIKE '%$buscar%'";
			break;
		case 'd_apellidoMaterno':
			$sql .= " where d_apellidoMaterno LIKE '%$buscar%'";
			break;
		case 'd_email':
			$sql .= " where d_email LIKE '%$buscar%'";
			break;
		case 'd_curp':
			$sql .= " where d_curp LIKE '%$buscar%'";
			break;
		default:
			break;
	}

	$sql .= " order by d_nombre, d_apellidoPaterno, d_apellidoMaterno;";

	$result = mysqli_query($conexion, $sql);

	while($row = mysqli_fetch_assoc($result)) {
        echo "	<tr>
			  		<td>d" . $row["id_administrador"] . "</td>
			  		<td>" . $row["d_nombre"] . "</td>
			  		<td>" . $row["d_apellidoPaterno"] . "</td>
			  		<td>" . $row["d_apellidoMaterno"] . "</td>
			  		<td>" . $row["d_email"] . "</td>
			  		<td>" . $row["d_curp"] . "</td>
			  		<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"editar(" . $row["id_administrador"] . ")\">Editar</button></td>
				  	<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"baja(" . $row["id_administrador"] . ")\">Baja</button></td>
				  	<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"permisos(" . $row["id_administrador"] . ")\">Permisos</button></td>
			  	</tr>";
    }

?>
