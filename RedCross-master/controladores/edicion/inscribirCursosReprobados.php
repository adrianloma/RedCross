<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$id_alumno = $_GET["id_alumno"];
	$id_curso = $_GET["id_curso"];
	$check = $_GET["check"];
	
	if($check){

  		mysql_insert_inscritos("inscritos", $conexion, array(
			'id_curso' => $id_curso,
			'id_alumno' => $id_alumno,
			'inscr_fecharegistro' => date("Y-m-d"),
			'inscr_cursado' => 0
		));
	

	}else{

       	mysql_delete_inscritos($conexion, $id_alumno, $id_curso);

	}
	

?>
