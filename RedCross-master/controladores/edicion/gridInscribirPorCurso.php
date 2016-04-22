<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$buscar = $_GET["buscar"];
	$contiene = $_GET["contiene"];
	$id_grupo = $_GET["id_grupo"];
	$id_carrera = $_GET["id_carrera"];
	$id_nivelEscolar = $_GET["id_Semestre"];
	$id_curso = $_GET["id_curso"];

	$buscar = mysqli_escape_string($conexion, $buscar);
	$contiene = mysqli_escape_string($conexion, $contiene);

	$sql="	select 
			    a.id_alumno,
			    a.a_nombre,
			    a.a_apellidPaterno,
			    a.a_apellidoMaterno,
			    a.a_email,
			    a.a_curp
			from
			    alumno a inner join	nivel_escolar n 
							ON a.id_nivelEscolar = n.id_nivelEscolar
						inner join inscritos i
							on a.id_alumno = i.id_alumno
			where
			    a.id_carrera = $id_carrera
			        and (a.id_grupo IS NULL
							or a.id_grupo = $id_grupo
							or a.id_grupo = 0)
			        and a.a_estatus = 'Activo'
			        and a.id_nivelEscolar = $id_nivelEscolar
					and i.id_curso = $id_curso";

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
			  		<td><input type='checkbox' name='inscribir' onchange='guardar(".$row["id_alumno"].")' value='".$row["id_alumno"]."' checked></td>
			  	</tr>";
		
    }

?>
