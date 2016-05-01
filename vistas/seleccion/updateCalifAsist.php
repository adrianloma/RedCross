<?php
	

	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";


	$data = json_decode(stripslashes($_POST['data']), true);


	$flag = true;

	foreach($data as $d){

		$id_al = $d['id_al'];

		$cal1 = $d['cal1'];
		$cal2 = $d['cal2'];
		$cal3 = $d['cal3'];
		$cal = $d['cal'];
		$asis = $d['asis'];



		if(is_numeric($id_al) && 
			is_numeric($cal1) && 
			is_numeric($cal2) && 
			is_numeric($cal3) && 
			is_numeric($cal) && 
			is_numeric($asis)){

			$sql= "UPDATE inscritos


				SET inscr_calificacion1='$cal1',
					inscr_calificacion2='$cal2',
					inscr_calificacion3='$cal3',
					inscr_calificacion='$cal',
					inscr_asistencia='$asis'

				WHERE id_alumno='$id_al'";

		}


		// $result = mysqli_query($conexion, $sql);

	}


	echo $flag;

?>