<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "escuelacruzroja";

	// Create connection
	$conexion = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conexion) {
	    die("No pudo conectarse: " . mysqli_connect_error());
	}

?>