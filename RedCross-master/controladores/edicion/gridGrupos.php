<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$buscar = $_GET["buscar"];
	$contiene = $_GET["contiene"];
	$id_carrera = $_GET["id_carrera"];
	$id_periodo = $_GET["id_periodo"];
	$id_nivelEscolar = $_GET["id_semestre"];

	$buscar = mysqli_escape_string($conexion, $buscar);
	$contiene = mysqli_escape_string($conexion, $contiene);
	$id_carrera = mysqli_escape_string($conexion, $id_carrera);
	$id_periodo = mysqli_escape_string($conexion, $id_periodo);

	$sql="select 
			    g.id_grupo,
			    g.gru_nombre
			from
			    grupo g inner join nivel_escolar n
								on n.id_nivelEscolar = g.id_nivelEscolar
						inner join periodo p
								on p.id_periodo = g.id_periodo
						inner join carrera c
								on c.id_carrera = n.id_carrera";

	switch ($contiene) {
		case 'id_grupo':
			$sql .= " where g.id_grupo LIKE '%$buscar%' 
							and c.id_carrera = $id_carrera 
							and n.id_periodo = $id_periodo 
							and n.id_nivelEscolar = $id_nivelEscolar";
			break;
		case 'nombre':
			$sql .= " where g.gru_nombre LIKE '%$buscar%'  
							and c.id_carrera = $id_carrera  
							and n.id_periodo = $id_periodo 
							and n.id_nivelEscolar = $id_nivelEscolar";
			break;
		default:
			break;
	}


	$sql .= " order by g.gru_nombre";

	$result = mysqli_query($conexion, $sql);

	while($row = mysqli_fetch_assoc($result)) {
        echo "	<tr>
			  		<td>" . $row["id_grupo"] . "</td>
			  		<td>" . $row["gru_nombre"] . "</td>
			  		<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"editar(" . $row["id_grupo"] . ")\">Editar</button></td>
				  	<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"baja(" . $row["id_grupo"] . ")\">Baja</button></td>
				  	<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"ver(" . $row["id_grupo"] . ",'" . $row["gru_nombre"] . "')\">Ver</button></td>
			  	</tr>";
    }

?>
