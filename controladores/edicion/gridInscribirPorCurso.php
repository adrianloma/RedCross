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

	$sql2 = "";

	switch ($contiene) {
		case 'id_alumno':
			$sql2 .= " and a.id_alumno LIKE '%$buscar%' ";
			break;
		case 'a_nombre':
			$sql2 .= " and a.a_nombre LIKE '%$buscar%' ";
			break;
		case 'a_apellidoPaterno':
			$sql2 .= " and a.a_apellidPaterno LIKE '%$buscar%'";
			break;
		case 'a_apellidoMaterno':
			$sql2 .= " and a.a_apellidoMaterno LIKE '%$buscar%' ";
			break;
		case 'a_email':
			$sql2 .= " and a.a_email LIKE '%$buscar%' ";
			break;
		case 'a_curp':
			$sql2 .= " and a.a_curp LIKE '%$buscar%' ";
			break;
		default:
			break;
	}

	$sql = "	SELECT 
				    id_nivelEscolar
				FROM
				    nivel_escolar
				WHERE
				    id_carrera = $id_carrera
				HAVING id_nivelEscolar > $id_nivelEscolar
				ORDER BY id_nivelEscolar 
				LIMIT 1";

	$result = mysqli_query($conexion, $sql);

	$id_nivelEscolarNuevo = "";

	while($row = mysqli_fetch_assoc($result)) {
		$id_nivelEscolarNuevo = $row['id_nivelEscolar'];
	}

	if($id_nivelEscolarNuevo != ""){
		$sql="	(SELECT 
				    a.id_alumno,
				    a.a_nombre,
				    a.a_apellidPaterno,
				    a.a_apellidoMaterno,
				    a.a_email,
				    a.a_curp
				FROM
				    alumno a
				        INNER JOIN
				    nivel_escolar n ON a.id_nivelEscolar = n.id_nivelEscolar
				        INNER JOIN
				    inscritos i ON a.id_alumno = i.id_alumno
				WHERE
				    a.id_carrera = $id_carrera
				        AND (a.id_grupo IS NULL OR a.id_grupo = $id_grupo
				        OR a.id_grupo = 0)
				        AND a.a_estatus = 'Activo'
				        AND a.id_nivelEscolar = $id_nivelEscolar
				        AND i.id_curso = $id_curso ". $sql2 ."
				order by a.a_nombre, a.a_apellidPaterno, a.a_apellidoMaterno) 

				UNION 

				(SELECT 
				    a.id_alumno,
				    a.a_nombre,
				    a.a_apellidPaterno,
				    a.a_apellidoMaterno,
				    a.a_email,
				    a.a_curp
				FROM
				    alumno a
				        INNER JOIN
				    inscritos i ON a.id_alumno = i.id_alumno
				WHERE
				    i.id_curso = $id_curso
				    AND a.id_nivelEscolar = $id_nivelEscolarNuevo ". $sql2 ."
				order by a.a_nombre, a.a_apellidPaterno, a.a_apellidoMaterno)";
	}else{
		$sql="	SELECT 
				    a.id_alumno,
				    a.a_nombre,
				    a.a_apellidPaterno,
				    a.a_apellidoMaterno,
				    a.a_email,
				    a.a_curp
				FROM
				    alumno a
				        INNER JOIN
				    nivel_escolar n ON a.id_nivelEscolar = n.id_nivelEscolar
				        INNER JOIN
				    inscritos i ON a.id_alumno = i.id_alumno
				WHERE
				    a.id_carrera = $id_carrera
				        AND (a.id_grupo IS NULL OR a.id_grupo = $id_grupo
				        OR a.id_grupo = 0)
				        AND a.a_estatus = 'Activo'
				        AND a.id_nivelEscolar = $id_nivelEscolar
				        AND i.id_curso = $id_curso ". $sql2 ."
				order by a.a_nombre, a.a_apellidPaterno, a.a_apellidoMaterno";
	}

	


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
