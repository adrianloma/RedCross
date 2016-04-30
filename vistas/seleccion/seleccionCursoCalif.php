<?php
include "../../includes/sessionMaestro.php";
include "../../includes/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<title>Asignaci&oacute;n de calificaciones</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
	<script>
		function loadCourses(){
		    xhr=new XMLHttpRequest();
		    xhr.onload= fillFields;
		    var url="../../controladores/seleccion/obtenerCursosCalif.php";
		    xhr.open("GET", url, true);
		    xhr.send();
	  	}

	  function fillFields(){

	  	document.getElementById('tbodyCursos').innerHTML = xhr.responseText.trim();

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
				<a class="navbar-brand" href="#">Asignaci&oacute;n de calificaciones</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../menus/menuMaestro.php">Regresar</a></li>
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
							<h3 class="thin text-center">Selecciona un curso</h3>
							<p class="text-center text-muted">Sistema de asignaci&oacute;n de calificaciones finales.. </p>
							<hr>

							<table class="table table-striped table-hover ">
								<thead>
									<tr>
										<th>#ID</th>
										<th>Curso</th>
										<th>Día</th>
										<th>Horario</th>
										<th>Sal&oacute;n</th>
									</tr>
								</thead>
								<tbody id="tbodyCursos">
								</tbody>
							</table>
						</div>
					</div>

				</div>

			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	<br><br><br><br><br><br>

	<?php include "../../includes/footer.php"; ?>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>
