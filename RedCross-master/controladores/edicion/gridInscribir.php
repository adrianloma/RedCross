<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$buscar = $_GET["buscar"];
	$contiene = $_GET["contiene"];
	$id_grupo = $_GET["id_grupo"];
	$id_carrera = $_GET["id_carrera"];
	$id_nivelEscolar = $_GET["id_Semestre"];

	$buscar = mysqli_escape_string($conexion, $buscar);
	$contiene = mysqli_escape_string($conexion, $contiene);

	$sql="	select 
			    a.id_alumno,
				a.a_nombre,
				a.a_apellidPaterno,
				a.a_apellidoMaterno,
				a.a_email,
			    a.a_curp,
			    a.id_grupo
			from
			    alumno 	a inner join nivel_escolar n
							on a.id_nivelEscolar = n.id_nivelEscolar 
			where
				a.id_carrera = $id_carrera
			    and (a.id_grupo is NULL or a.id_grupo = $id_grupo or a.id_grupo = 0)
			    and a.a_estatus = 'Activo'
			    and a.id_nivelEscolar = $id_nivelEscolar";

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
