<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$id_alumno = $_GET["id_alumno"];
	$id_curso = $_GET["id_curso"];

    mysql_delete_inscritos($conexion, $id_alumno, $id_curso);
	

?>
