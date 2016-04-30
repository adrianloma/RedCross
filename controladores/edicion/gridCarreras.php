<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$buscar = $_GET["buscar"];
	$contiene = $_GET["contiene"];

	$buscar = mysqli_escape_string($conexion, $buscar);
	$contiene = mysqli_escape_string($conexion, $contiene);

	$sql="select 
			    *
			from
			    carrera";

	switch ($contiene) {
		case 'id_carrera':
			$sql .= " where id_carrera LIKE '%$buscar%'";
			break;
		case 'nombre':
			$sql .= " where c_nombre LIKE '%$buscar%'";
			break;
		case 'descripcion':
			$sql .= " where c_desc LIKE '%$buscar%'";
			break;
		default:
			break;
	}

	$sql .= " order by c_nombre";

	$result = mysqli_query($conexion, $sql);

	while($row = mysqli_fetch_assoc($result)) {
        echo "	<tr>
			  		<td>c" . $row["id_carrera"] . "</td>
			  		<td>" . $row["c_nombre"] . "</td>
			  		<td>" . $row["c_desc"] . "</td>
			  		<td>" . $row["c_fechaCreacion"] . "</td>
			  		<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"editar(" . $row["id_carrera"] . ")\">Editar</button></td>
				  	<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"ver(" . $row["id_carrera"] . ",'" . $row["c_nombre"] . "')\">Ver</button></td>
			  	</tr>";
    }

?>
