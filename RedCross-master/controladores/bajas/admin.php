<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

$matricula = $_GET['matricula'];

if( is_numeric($matricula) ){
  $sql = "DELETE FROM administrador WHERE id_administrador = $matricula";
  mysqli_query( $conexion, mysqli_real_escape_string($conexion, $sql));
  printf("{ \"error\": \"%s\"}", mysqli_error($conexion));
}


