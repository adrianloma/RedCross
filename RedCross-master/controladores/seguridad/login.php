<?php

	include "../../includes/conexion.php";
	
	//Variables inicializadas
	if(isset($_POST["login"])){
		$tipo = strtolower(substr($_POST["login"], 0, 1));
		$usuario=substr($_POST["login"], 1);
	}else{
		$usuario="";
		$tipo = "";
	}
	
	if(isset($_POST["password"])){
		$clave=$_POST["password"];
	}else{
		$clave="";
	}
	
	$password="";
	$nombre="";
	
	if($tipo == "a"){
		$tabla = "alumno";
	}
	else if ($tipo == "m"){
		$tabla = "maestro";
	}
	else if ($tipo == "d"){
		$tabla = "administrador";
	}else{
		echo "<script language=\"javascript\">
				alert(\"Usuario o clave incorrectas\");
				window.location.href = \"../../vistas/index.php\"
				</script>";
	}
	
	$usuario = mysqli_escape_string($conexion, $usuario);
	
	$sql="select " . $tipo . "_contra, " . $tipo . "_nombre from " . $tabla . " where id_" . $tabla . "= '$usuario'";
	
	$result = mysqli_query($conexion, $sql);

	while($row = mysqli_fetch_assoc($result)){
		$password=$row[$tipo . '_contra'];
		$nombre=$row[$tipo . '_nombre'];
	}	

	//Si la clave ingresada es igual a la de la base de datos deja ingresar
	if(md5($clave) == $password && $usuario != ""){
		session_start();
		// store session data
		$_SESSION['matricula']=$usuario;
		$_SESSION['tipo']=$tipo;
        $_SESSION['nombre']=$nombre;
		if($tipo == "a"){
			echo "<script language=\"javascript\">
					window.location.href = \"../../vistas/menus/menuAlumno.php\"
				</script>";
		}elseif ( $tipo == "d"){
			echo "<script language=\"javascript\">
					window.location.href = \"../../vistas/menus/menuAdmin.php\"
				</script>";
		}
		else{
			echo "<script language=\"javascript\">
					window.location.href = \"../../vistas/menus/menuMaestro.php\"
				</script>";
		}
	}else{
			echo "<script language=\"javascript\">
				alert(\"Usuario o clave incorrectas\");
				window.location.href = \"../../vistas/index.php\"
				</script>";
	}
?>