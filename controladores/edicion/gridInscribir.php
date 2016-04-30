<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$buscar = $_GET["buscar"];
	$contiene = $_GET["contiene"];
	$id_grupo = $_GET["id_grupo"];
	$id_carrera = $_GET["id_carrera"];
	$id_nivelEscolar = $_GET["id_Semestre"];
	$id_periodo = $_GET["id_periodo"] - 1;

	$buscar = mysqli_escape_string($conexion, $buscar);
	$contiene = mysqli_escape_string($conexion, $contiene);

	/*Query que despliega todos los alumnos que son regulares y los que llevan una materia extra*/
	$sql="SELECT 
			    a.id_alumno,
			    a.a_nombre,
			    a.a_apellidPaterno,
			    a.a_apellidoMaterno,
			    a.a_email,
			    a.a_curp,
			    a.id_grupo
			FROM
			    alumno a
			        INNER JOIN
			    nivel_escolar n ON a.id_nivelEscolar = n.id_nivelEscolar
			WHERE
			    a.id_carrera = $id_carrera 
			        AND (a.id_grupo IS NULL 
			        		OR a.id_grupo = $id_grupo
			        		OR a.id_grupo = 0)
			        AND a.a_estatus = 'Activo'
			        AND a.id_nivelEscolar = $id_nivelEscolar
			        AND a.id_alumno NOT IN (SELECT  
													a.id_alumno
												FROM
													alumno a
														INNER JOIN
													inscritos i ON i.id_alumno = a.id_alumno
														INNER JOIN
													curso c ON i.id_curso = c.id_curso
														INNER JOIN
													grupo g ON g.id_grupo = c.id_grupo
														INNER JOIN
													periodo p ON p.id_periodo = g.id_periodo
												WHERE
													p.id_periodo = $id_periodo 
														AND a.id_carrera = $id_carrera 
														AND i.inscr_Cursado = 1 
														AND g.id_nivelEscolar = $id_nivelEscolar
														AND i.inscr_calificacion < 70
														AND a.a_estatus = 'Activo'
														AND c.cu_isPrioridadAlta = 'Si' 
												GROUP BY a.id_alumno)
					AND a.id_alumno not in (SELECT
													a.id_alumno
												FROM
													alumno a 
														inner join 
													inscritos i on a.id_alumno = i.id_alumno
														INNER JOIN
													curso c ON i.id_curso = c.id_curso
														INNER JOIN
													grupo g ON g.id_grupo = c.id_grupo
														INNER JOIN
													periodo p ON p.id_periodo = g.id_periodo
												where
													p.id_periodo = $id_periodo
														AND a.id_carrera = $id_carrera
														AND i.inscr_Cursado = 1 
														AND g.id_nivelEscolar = $id_nivelEscolar
			                                            and inscr_calificacion < 70
														AND a.a_estatus = 'Activo'
												group by
													 a.id_alumno
												having count(a.id_alumno) > 1)";

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
			  		<td>" . $row["a_curp"] . "</td>";

		if($id_grupo == $row["id_grupo"]){
			echo "		<td><input type='checkbox' name='inscribir' onchange='guardar(".$row["id_alumno"].", false)' value='".$row["id_alumno"]."' checked></td>
			  		</tr>";
		}else{
			echo "		<td><input type='checkbox' name='inscribir' onchange='guardar(".$row["id_alumno"].", true)' value='".$row["id_alumno"]."'></td>
			  		</tr>";
		}
    }

?>
