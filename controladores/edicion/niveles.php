<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$id_carrera = $_GET["id_carrera"];
	$id_carrera = mysqli_escape_string($conexion, $id_carrera);


	$sql="select 
			    n.id_nivelEscolar,
			    n.ne_desc
			from
				nivel_escolar n
			where
				n.id_carrera = $id_carrera";
	$result = mysqli_query($conexion,$sql);

	echo "<option value=''>-</option>";
	while ($row = mysqli_fetch_assoc($result)){
		echo "<option value=\"".$row['id_nivelEscolar'] ."\"> ".$row['ne_desc']."</option>";
	}

?>
