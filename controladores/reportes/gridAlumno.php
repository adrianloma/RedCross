<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";
	$buscar = $_GET["buscar"];
	$contiene = $_GET["contiene"];
	$id_carrera = $_GET["id_carrera"];
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
			    n.ne_desc,
			    g.gru_nombre
			from
			    alumno 	a	left join grupo g
								on	a.id_grupo = g.id_grupo
							inner join carrera c
								on a.id_carrera = c.id_carrera
							inner join nivel_escolar n
								on a.id_nivelEscolar = n.id_nivelEscolar
							inner join inscritos i
								on i.id_alumno = a.id_alumno";
	switch ($contiene) {
		case 'id_alumno':
			$sql .= " where a.id_alumno LIKE '%$buscar%' and i.inscr_Cursado = 0 and c.id_carrera = $id_carrera";
			break;
		case 'a_nombre':
			$sql .= " where a.a_nombre LIKE '%$buscar%' and i.inscr_Cursado = 0 and c.id_carrera = $id_carrera";
			break;
		case 'a_apellidoPaterno':
			$sql .= " where a.a_apellidPaterno LIKE '%$buscar%' and i.inscr_Cursado = 0 and c.id_carrera = $id_carrera";
			break;
		case 'a_apellidoMaterno':
			$sql .= " where a.a_apellidoMaterno LIKE '%$buscar%' and i.inscr_Cursado = 0 and c.id_carrera = $id_carrera";
			break;
		case 'a_email':
			$sql .= " where a.a_email LIKE '%$buscar%'  and i.inscr_Cursado = 0 and c.id_carrera = $id_carrera";
			break;
		case 'a_curp':
			$sql .= " where a.a_curp LIKE '%$buscar%'  and i.inscr_Cursado = 0 and c.id_carrera = $id_carrera";
			break;
		case 'carrera':
			$sql .= " where c.c_nombre LIKE '%$buscar%' and i.inscr_Cursado = 0 and c.id_carrera = $id_carrera";
			break;
		case 'nivel':
			$sql .= " where n.ne_desc LIKE '%$buscar%' and i.inscr_Cursado = 0 and c.id_carrera = $id_carrera";
			break;
		case 'grupo':
			$sql .= " where g.gru_nombre LIKE '%$buscar%' and i.inscr_Cursado = 0 and c.id_carrera = $id_carrera";
			break;
		default:
			break;
	}
	$sql .= " group by a.id_alumno order by a.id_nivelEscolar, a.a_nombre, a.a_apellidPaterno, a.a_apellidoMaterno;";
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
			  		<td>" . $row["ne_desc"] . "</td>
			  		<td>" . $row["gru_nombre"] . "</td>
			  		<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"ver(" . $row["id_alumno"] . ",'".$row["a_nombre"]." ".$row["a_apellidPaterno"]." ".$row["a_apellidoMaterno"]."')\">Ver</button></td>
			  	</tr>";
			  		
				  	
			  	
    }
?>