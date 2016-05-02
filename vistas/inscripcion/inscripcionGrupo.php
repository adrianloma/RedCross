<?php
include "../../includes/sessionAdmin.php";
include "../../includes/conexion.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<title>Inscripci&oacute;n</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<script src="../../includes/javascript_util.js"></script>
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	<script>
		function carga() {
			<?php
				if($_SESSION['altaGrupoCursos'] == 0)
					echo 'window.location.href = "../menus/menuABCAdmins.php";';
			?>
			document.getElementById("id_carrera").value = getQueryVariable("id_carrera");
			document.getElementById("id_periodo").value = getQueryVariable("id_periodo");
			document.getElementById("id_semestre").value = getQueryVariable("id_semestre");
		}

		function regresar(){
			window.history.back();
		}
	</script>
</head>

<body class="home" onload="carga()">

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Inscripci&oacute;n</a>
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
		<h2 class="thin">Inscripci&oacute;n de nuevo grupo al Sistema</h2>
		<br>
	</div>
	<!-- /Intro-->

	<!-- Highlights - jumbotron -->
	<div class="">
		<div class="container">
			<div class="row">
				<form method="GET" action="../../controladores/inscripcion/grupo.php">
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Nombre del Grupo</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="grupo" name="grupo" placeholder="Ejemplo: 1A" required>
					</div>
				</div>
				<br><br>
				<br><br>
			</div>
			<br><br>
			<div class="row" style="text-align:center;">
				<a href="#">
					<button style="width:50%;" align="center" class="btn btn-action" type="submit">Guardar</button>
				</a>
			</div> <!-- /row  -->
			<input type="hidden" id="id_carrera" value="" name="id_carrera">
			<input type="hidden" id="id_periodo" value="" name="id_periodo">
			<input type="hidden" id="id_semestre" value="" name="id_semestre">
		</form>
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
