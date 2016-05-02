<?php
	include "../../includes/sessionMaestro.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<title>Horario</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<script src="../../includes/javascript_util.js"></script>

	<script>


		var curso;
		function loadCourses(){

			curso = unescape(getQueryVariable("id_curso"));

			xhr=new XMLHttpRequest();
			xhr.onload= fillFields;
			var url="../../controladores/seleccion/obtenerAlumnosCursoCalifAsist.php?id_curso="+curso;
			xhr.open("GET", url, true);
			xhr.send();
		}

		function fillFields(){
			document.getElementById('tbodyCursos').innerHTML = xhr.responseText.trim();
		}


		function validarCampos () {

			var flag = true;
			$("input").each(function(index, el) {
				if($(this).val() != "" && !$.isNumeric($(this).val())){
					console.log("asdasd");
					flag = false;
				}
			});

			return flag;
		}


		function guardarCambios () {

			var alumnos = [];


			if(validarCampos()){

				$("#tbodyCursos tr").each(function(index, el) {
					
					var id_al = $(this).find('.id_al').attr('data-id');

					var alumno = {};

					alumno.id_al = id_al;
					alumno.cal1 = $('#cal1_a' + id_al).val();
					alumno.cal2 = $('#cal2_a' + id_al).val();
					alumno.cal3 = $('#cal3_a' + id_al).val();
					alumno.cal = $('#cal_a' + id_al).val();
					alumno.asis = $('#asis_a' + id_al).val();

					alumnos.push(alumno);

				});

				var jsonStr = JSON.stringify(alumnos);

				$.ajax({
					type: "POST",
					url: "updateCalifAsist.php",
					data: {data : jsonStr},
					cache: false,

					success: function (responseText) {
						if(responseText == "1"){
							alert("Información guardada exitosamente."); 
						} else {
							alert("Error: información no guardada correctamente.");
						}
					},

					fail: function (responseText) {
						alert("Error de conexión: información no guardada.");
					}

				});


			
			} else {

				alert("Todos los campos deben de contener números, información no guardada.");

			}
		}


		// function ver (id_curso) {
		// 	window.location.assign("seleccionAlumnoCalifAsist.php?id_curso=" + id_curso );
		// }


	</script>

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
				<a class="navbar-brand" href="#">Horario</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="seleccionCursoCalifAsist.php">Regresar</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Intro -->
	<div class="container text-center">
		<h2 class="thin">Modificar Asistencias y Calificaciones</h2>
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
							<th>Nombre</th>
							<th>Apellido Paterno</th>
							<th>Apellido Materno</th>
							<th>Calificaci&oacute;n Parcial 1</th>
							<th>Calificaci&oacute;n Parcial 2</th>
							<th>Calificaci&oacute;n Parcial 3</th>
							<th>Calificaci&oacute;n Final</th>
							<th>Asistencias</th>

						</tr>
					</thead>
					<tbody id="tbodyCursos">
					</tbody>
				</table>
			</div> <!-- /row  -->

			<div class="row">
				<button type="submit" class="btn btn-action" onclick="guardarCambios()"> Guardar Cambios</button>
			</div>
			
			<br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</div>
	<!-- /Highlights -->
	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">

					<div class="col-md-3 widget">
						<h3 class="widget-title">Informaci&oacute;n</h3>
						<div class="widget-body">
							<p> Avenida Alfonso Reyes Norte #2503 Norte, Del Prado, 64410 Monterrey, N.L. <br>
								<a href="mailto:#">cruz.roja@cr.com</a><br>
								81-1477-1477
							</p>
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Redes Sociales</h3>
						<div class="widget-body">
							<p class="follow-me-icons clearfix">
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Información</h3>
						<div class="widget-body">
							<p>Sitio web de la Cruz Roja Mexicana.</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="#">Home</a> |
								<a href="#">Contacto</a> |
								<b><a href="#">Iniciar sesi&oacute;n</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2015, Cruz Roja.
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>
	</footer>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>
