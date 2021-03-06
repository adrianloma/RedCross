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

	<title>Men&uacute;</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
	<script src="../../includes/javascript_util.js"></script>
	<script>
		function confirmNewSemester(){
			var buttonConfirm = confirm('Esta seguro de iniciar un nuevo semestre');
			if (buttonConfirm === true){
				document.getElementById('resetSemestre').submit();
			}
		}
	</script>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="#"><img src="assets/images/cruzroja.png" alt="Progressus HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="#">Inicio</a></li>
					<li class="active"><a class="btn" href="../../controladores/seguridad/cerrarSesion.php">Salir</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<div class="row">

			<!-- Article main content -->
			<article class="col-sm-9 maincontent">
				<header class="page-header">
					<h1 class="page-title">Men&uacute;</h1>
				</header>
				<div>
					<a href="menuABCAlumnos.php">
						<input class="btn btn-action" style="width:100%;" type="submit" value="Alumnos">
					</a>
				</div>
				<br>
				<div>
					<a href="menuABCMaestros.php">
						<input class="btn btn-action" style="width:100%;" type="submit" value="Maestros">
					</a>
				</div>
				<br>
				<div>
					<a href="menuABCAdmins.php">
						<input class="btn btn-action" style="width:100%;" type="submit" value="Administradores">
					</a>
				</div>
				<br>
				<div>
					<a href="menuABCPeriodos.php">
						<input class="btn btn-action" style="width:100%;" type="submit" value="Periodos">
					</a>
				</div>
				<br>
				<div>
					<a href="../reportes/menuReportes.php">
						<input class="btn btn-action" style="width:100%;" type="submit" value="Herramienta de generaci&oacute;n de Reportes">
					</a>
				</div>
				<br>
			</article>
			<!-- /Article -->

			<!-- Sidebar -->
			<aside class="col-sm-3 sidebar sidebar-right">

				<div class="widget">
					<h4>Bienvenido</h4>
					<address>
						Usted ha ingresado como administrador.
					</address>

				</div>
			</div>

			</aside>
			<!-- /Sidebar -->

	</div>
</div>	<!-- /container -->


<?php include "../../includes/footer.php"; ?>





<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="assets/js/headroom.min.js"></script>
<script src="assets/js/jQuery.headroom.min.js"></script>
<script src="assets/js/template.js"></script>

<!-- Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=&amp;sensor=false&amp;extension=.js"></script>
<script src="assets/js/google-map.js"></script>


</body>
</html>
