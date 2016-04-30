<?php

	$id_periodo = $_GET['id_periodo'];

	$sql = "SELECT 
				    per_estatus
				FROM
				    periodo
				where
					id_periodo =".$id_periodo;
	
	$result =  mysqli_query($conexion, $sql);
	while($row = mysqli_fetch_assoc($result)) {
		$periodo_activo = $row['per_estatus'];
	}

?>