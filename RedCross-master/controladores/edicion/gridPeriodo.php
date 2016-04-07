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
			    periodo";

	switch ($contiene) {
		case 'id_periodo':
			$sql .= " where id_periodo LIKE '%$buscar%'";
			break;
		case 'descripcion':
			$sql .= " where per_desc LIKE '%$buscar%'";
			break;
		case 'estatus':
			$sql .= " where per_estatus LIKE '%$buscar%'";
			break;
		default:
			break;
	}

	$sql .= " order by id_periodo desc";

	$result = mysqli_query($conexion, $sql);

	while($row = mysqli_fetch_assoc($result)) {

		if( $row["per_estatus"]){
			$per_estatus = "Activo";
		}else{
			$per_estatus = "Inactivo";
		}

        echo "	<tr>
			  		<td>" . $row["id_periodo"] . "</td>
			  		<td>" . $row["per_desc"] . "</td>
			  		<td>" . $per_estatus . "</td>
			  		<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"editar(" . $row["id_periodo"] . ")\">Editar</button></td>
			  		<td><button type=\"submit\" class=\"btn btn-default\" onclick=\"ver(" . $row["id_periodo"] . ",'" . $row["per_desc"] ."')\">Ver</button></td>
			  	</tr>";
    }

?>
