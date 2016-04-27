<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	$descripcion = $_POST["descripcion"];

	/************************** Los alumnos que si pasan al siguiente semestre **************************/
 	// Los que pasaron todas las materias
	$sql1 = "SELECT 
				    a.id_alumno
				FROM
				    alumno a
				where
					a.id_alumno not in (SELECT 
											id_alumno
										FROM 
											inscritos
										where
											inscr_calificacion < 70
												AND inscr_cursado = 0)
					and a.a_estatus = 'Activo'";
	
	$result1 =  mysqli_query($conexion, $sql1);
	while($row1 = mysqli_fetch_assoc($result1)) {
		$sql2 = "SELECT 
   		 				a.id_nivelEscolar AS nivelActual,
					    n.id_nivelEscolar AS nivelNuevo,
					    n.ne_desc
					FROM
					    carrera c
					        INNER JOIN
					    alumno a ON a.id_carrera = c.id_carrera
					        INNER JOIN
					    nivel_escolar n ON c.id_carrera = n.id_carrera
					WHERE
					    a.id_alumno = ".$row1['id_alumno']." AND c.c_estatus = 1
					HAVING nivelActual != nivelNuevo
					ORDER BY n.ne_desc
					LIMIT 1";
	
		$result2 = mysqli_query($conexion, $sql2);
		while($row2 = mysqli_fetch_assoc($result2)) {
			mysqli_query($conexion, "UPDATE alumno 
								SET 
									id_nivelEscolar = ".$row2['nivelNuevo']."
								WHERE
									id_alumno = ".$row1['id_alumno']);
		}
	}
	
	// Los que pasan al siguiente semestre pero con una materia extra
	$sql1 = "SELECT 
    				a.id_alumno,
				    count(a.id_alumno) reprobadas,
				    c.cu_isPrioridadAlta
				FROM
				    alumno a inner join inscritos i
								on a.id_alumno = i.id_alumno
							 inner join curso c 
								on c.id_curso = i.id_curso
				where
					i.inscr_calificacion < 70
						AND i.inscr_cursado = 0
				        AND a.a_estatus = 'Activo'
				group by
					 a.id_alumno
				having reprobadas = 1 and c.cu_isPrioridadAlta = 'No'";
	
	$result1 = mysqli_query($conexion, $sql1);
	while($row1 = mysqli_fetch_assoc($result1)) {
		$sql2 = "SELECT 
   		 				a.id_nivelEscolar AS nivelActual,
					    n.id_nivelEscolar AS nivelNuevo,
					    n.ne_desc
					FROM
					    carrera c
					        INNER JOIN
					    alumno a ON a.id_carrera = c.id_carrera
					        INNER JOIN
					    nivel_escolar n ON c.id_carrera = n.id_carrera
					WHERE
					    a.id_alumno = ".$row1['id_alumno']." AND c.c_estatus = 1
					HAVING nivelActual != nivelNuevo
					ORDER BY n.ne_desc
					LIMIT 1";
	
		$result2 = mysqli_query($conexion, $sql2);
		while($row2 = mysqli_fetch_assoc($result2)) {
			mysqli_query($conexion, "UPDATE alumno 
								SET 
									id_nivelEscolar = ".$row2['nivelNuevo']."
								WHERE
									id_alumno = ".$row1['id_alumno']);
		}
	}
	
	/************************** FIN **************************/

	/************************** Los alumnos que no pasan al siguiente semestre *************************
	// Los que no pasan al siguiente semestre (2 materias reprobadas o mas o Tienen alguna materia reprobada con alta prioridad)
	$sql = "SELECT 
				    a.id_alumno,
				    count(a.id_alumno) reprobadas
				FROM
				    alumno a inner join inscritos i
								on a.id_alumno = i.id_alumno
				where
					inscr_calificacion < 70
						AND inscr_cursado = 0
				        AND a.a_estatus = 'Activo'
				group by
					 a.id_alumno
				having reprobadas > 1 or a.id_alumno in (SELECT 
																a.id_alumno
															FROM
																alumno a inner join inscritos i
																			on a.id_alumno = i.id_alumno
																		 inner join curso c 
																			on c.id_curso = i.id_curso
															where
																i.inscr_calificacion < 70
																	AND i.inscr_cursado = 0
																	AND c.cu_isPrioridadAlta = 'Si'
																	AND a.a_estatus = 'Activo')";
	
	$result = mysql_query($sql);
	while($row = mysqli_fetch_assoc($result)) {

	}

	************************* FIN **************************/

	//Se registra que todos los cursos ya fueron terminados
	mysqli_query($conexion, "UPDATE inscritos SET inscr_Cursado = 1");

	//Todos los alumnos se les retira el grupo en el que se encontraban
	mysqli_query($conexion, "UPDATE alumno SET id_grupo = 0");

	//Se pone como inactivo el periodo actual para activar el nuevo periodo
	mysqli_query($conexion, "UPDATE periodo SET per_estatus = 0");

	//Se inserta a la base de datos el nuevo periodo como activo
	$result = mysql_insert_periodo("periodo", $conexion, array(
		'per_desc' => $descripcion,
		'per_fechaCreacion' => date("Y-m-d"),
		'per_estatus' => 1
	));

	if ($result){
		$newId = mysqli_insert_id($conexion);
		$alertMsg = "Nuevo periodo agregado satisfactoriamente";
	}else{
		$alertMsg = "Algo salio mal: " . mysqli_error($conexion);
	}

	echo "<script language=\"javascript\">
				alert(\"$alertMsg\");
				window.history.go(-2);
			</script>";








	

?>
