<?php
include "../../includes/sessionAdmin.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<title>Calificaciones</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
	<script src="../../includes/javascript_util.js"></script>

	<script>
		function loadCourses(){
			
			document.getElementById('titulo').innerHTML = " Boleta de calificaciones > " + unescape(getQueryVariable("siglas")) + "> Alumno: " + unescape(getQueryVariable("a_nombre"));
			
			xhr=new XMLHttpRequest();
			xhr.onload= fillFields;
			var url="../../controladores/reportes/obtenerCalifAlumno.php?id_alumno=" + unescape(getQueryVariable("id_alumno"));
			xhr.open("GET", url, true);
			xhr.send();
		}

		function fillFields(){

			document.getElementById('tbodyCursos').innerHTML = xhr.responseText.trim();

		}
		
		function regresar(){
			window.history.back();
		}

		function imprimir() {
		    window.print();
		}
	</script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body onload="loadCourses()">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Boleta</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" onclick="regresar()">Regresar</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Intro -->
	<div class="container text-center">
		<h2 class="thin" id="titulo">Boleta de calificaciones</h2>
		<br>
	</div>
	<!-- /Intro-->

	<!-- Highlights - jumbotron -->
	<div class="">
		<div class="container">
			<div class="row">
				<table class="table table-striped table-hover ">
					<thead>
						<tr>
							<th>#ID</th>
							<th>Curso</th>
							<th>Calificaci&oacute;n 1er parcial (%25)</th>
							<th>Calificaci&oacute;n 2ndo parcial (%25)</th>
							<th>Calificaci&oacute;n 3er parcial (%25)</th>
							<th>Tareas y actividades (%25)</th>
							<th>Calificaci&oacute;n Final</th>
							<th>Faltas</th>
							<th>Cursado</th>
							<th>Periodo</th>
							<th>Nivel Escolar</th>
							<th>Carrera</th>
						</tr>
					</thead>
					<tbody id="tbodyCursos">
					</tbody>
				</table>
				<button type="submit" class="btn btn-default" onclick="imprimir()">Imprimir</button>
			</div> <!-- /row  -->
			

			<br><br><br><br><br><br><br><br><br><br>

		</div>
	</div>
	<!-- /Highlights -->
	<?php include "../../includes/footer.php"; ?>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>
