<?php
	include "../../includes/sessionMaestro.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";
	date_default_timezone_set('PST');
	$idCurso = $_POST["idCurso"];
	$sql = "SELECT cu_nombre, cu_ultimaFechaAsistencia from curso where id_curso = $idCurso";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$fecha=$row['cu_ultimaFechaAsistencia'];
	$nombre = $row['cu_nombre'];
	$today = date("Y-m-d");
	$today =  date('Y-m-d',(strtotime ( '-1 day' , strtotime($today) ) ));
	if($fecha >= $today){
		echo "<script language=\"javascript\">
				alert(\"Ya se tomo la asistencia para el dia de hoy\");
				window.location.href = \"../seleccion/seleccionCursoAsistencia.php\"
			</script>";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<title>Asignaci&oacute;n de faltas</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Asignaci&oacute;n de faltas</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../seleccion/seleccionCursoAsistencia.php">Regresar</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- container -->
	<div class="container">
		<div class="row">

			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Sistema de asignaci&oacute;n de faltas.</h3>
							<p class="text-center text-muted"><?php echo $nombre; ?></p>
							<hr>
							<form method="POST" action="../../controladores/asigna/asignaFaltas.php">
								<?php echo '<input type="hidden"  id="matricula" name="matricula" value="'.$idCurso.'">' ?>
							<table class="table table-striped table-hover ">
								<thead>
									<tr>
										<th>Matricula</th>
										<th>Nombre</th>
										<th>Falta</th>
										<th>Total de faltas</th>
									</tr>
								</thead>
								<tbody>
									<?php

										$sql = "SELECT ins.id_alumno, ins.inscr_asistencia, ins.inscr_fechasFaltas, al.a_nombre, al.a_apellidpaterno
										FROM inscritos ins, alumno al where ins.id_alumno = al.id_alumno and ins.id_curso = $idCurso and ins.inscr_Cursado = 0 order by ins.id_alumno ";
										$result = mysql_query($sql);
										$tbody = "";

										while($row = mysql_fetch_array($result)){
											$idAlumno=$row['id_alumno'];
											$asistencia=$row['inscr_asistencia'];
											$fechasFaltas = $row['inscr_fechasFaltas'];
											$nombre = $row['a_nombre'];
											$aPaterno = $row['a_apellidpaterno'];
											$tbody = $tbody . "
												<tr>
													<td>$idAlumno</td>
													<td>$nombre $aPaterno</td>
													<td> <input type=\"checkbox\" name=\"faltas[]\" value=\"$idAlumno\"> </td>
													<td> $asistencia </td>
												</tr>
											";

										}
										echo $tbody;
									?>

								</tbody>
							</table>
							<div class="col-lg-10 text-right">
								<a href="#">
									<button style="width:80%;" class="btn btn-action" type="submit">Guardar</button>
								</a>
								<br><br>
								</form>

							</div>
							<div class="col-lg-10 text-right">
								<a href="../seleccion/seleccionCursoAsistencia.php">
									<button style="width:80%;" class="btn btn-action" >Cancelar</button>
								</a>
							</div>
						</div>

					</div>


				</article>
				<!-- /Article -->

			</div>
		</div>	<!-- /container -->
		<br><br><br><br><br>

<?php include "../../includes/footer.php"; ?>

		<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<script src="assets/js/headroom.min.js"></script>
		<script src="assets/js/jQuery.headroom.min.js"></script>
		<script src="assets/js/template.js"></script>
	</body>
	</html>
