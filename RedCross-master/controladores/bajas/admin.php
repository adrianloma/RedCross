<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

$matricula = $_GET['id_administrador'];

if( is_numeric($matricula) ){
  $sql = "DELTE FROM administrador WHERE id_administrador = $matricula";
  mysqli_query( $conexion, mysqli_real_escape_string($sql));
  printf("Error: %s\n", mysqli_error($link));
}
