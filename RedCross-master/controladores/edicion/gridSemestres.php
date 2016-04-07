<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$buscar = $_GET["buscar"];
	$contiene = $_GET["contiene"];
	$id_carrera = $_GET["id_carrera"];
	$id_periodo = $_GET["id_periodo"];

	$buscar = mysqli_escape_string($conexion, $buscar);
	$contiene = mysqli_escape_string($conexion, $contiene);
	$id_carrera = mysqli_escape_string($conexion, $id_carrera);
	$id_periodo = mysqli_escape_string($conexion, $id_periodo);

	$sql="select 
			    *
			from
			    nivel_escolar n inner join carrera c
			    				on n.id_carrera = c.id_carrera";

	switch ($contiene) {
		case 'id_semestre':
			$sql .= " where n.id_nivelEscolar LIKE '%$buscar%' and c.id_carrera = $id_carrera and n.id_periodo = $id_periodo";
			break;
		case 'descripcion':
			$sql .= " where n.ne_desc LIKE '%$buscar%'  and c.id_carrera = $id_carrera  and n.id_periodo = $id_periodo";
			break;
		default:
			break;
	}


	$sql .= " order by ne_desc";

	$result = mysqli_query($conexion, $sql);

	while($row = mysqli_fetch_assoc($result)) {
        echo "	<tr>
			  		<td>" . $row["id_nivelEscolar"] . "</td>
			  		<td>" . $row["ne_desc"] . "</td>
			  		<td>" . $row["c_nombre"] . "</td>
			  		<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"editar(" . $row["id_nivelEscolar"] . ")\">Editar</button></td>
				  	<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"baja(" . $row["id_nivelEscolar"] . ")\">Baja</button></td>
				  	<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"ver(" . $row["id_nivelEscolar"] . ",'" . $row["c_nombre"] . "')\">Ver</button></td>
			  	</tr>";
    }

?>
