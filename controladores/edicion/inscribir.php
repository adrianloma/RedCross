<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$id_alumno = $_GET["id_alumno"];
	$id_grupo = $_GET["id_grupo"];
	$check = $_GET["check"];
	
	if($check){
		$result = mysql_update("alumno", $conexion, array(
			'id_grupo' => $id_grupo,
		), $id_alumno);

		$sql = "select 
					id_curso
				from 
					curso
				where
					id_grupo = $id_grupo";

		$result = mysqli_query($conexion, $sql);
		while($row = mysqli_fetch_assoc($result)) {
       		$id_curso = $row["id_curso"];

       		mysql_insert_inscritos("inscritos", $conexion, array(
				'id_curso' => $id_curso,
				'id_alumno' => $id_alumno,
				'inscr_fecharegistro' => date("Y-m-d"),
				'inscr_cursado' => 0
			));
		}

	}else{
		$result = mysql_update("alumno", $conexion, array(
			'id_grupo' => NULL,
		), $id_alumno);

		$sql = "select 
					id_curso
				from 
					curso
				where
					id_grupo = $id_grupo";

		$result = mysqli_query($conexion, $sql);
		while($row = mysqli_fetch_assoc($result)) {
       		$id_curso = $row["id_curso"];

       		mysql_delete_inscritos($conexion, $id_alumno, $id_curso);
       	}

	}
	

?>
