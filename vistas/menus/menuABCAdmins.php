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

	<title>Administradores</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
	<script src="../../includes/javascript_util.js"></script>

	<script>

		function Buscar(){
			var buscar = document.getElementById('buscar').value;
			var contiene = document.getElementById('contiene').value;
			
		    xhr=new XMLHttpRequest();
		    xhr.onload= fillFields;
		    var url="../../controladores/edicion/gridAdmin.php?buscar=" + buscar + "&contiene=" + contiene;
		    xhr.open("GET", url, true);
		    xhr.send();
		    return false;
		}

		function fillFields(){
			var grid = document.getElementById("grid");
			var tabla = xhr.responseText;
			grid.innerHTML = "<thead>"+
								"<tr>"+
									"<th>id</th>"+
									"<th>Nombre</th>"+
									"<th>Apellido Paterno</th>"+
									"<th>Apellido Materno</th>"+
									"<th>Correo</th>"+
									"<th>CURP</th>"+
									<?php
									if($_SESSION['cambioAdmin'] == 1)
										echo '"<th>Editar</th>" +';
									if($_SESSION['bajaAdmin'] == 1)
										echo '"<th>Baja</th>" +';
									if($_SESSION['verReportes'] == 1)
										echo '"<th>Permisos</th>" +';
									?>
									

								"</tr>"+
								"</thead>" + tabla;
		}

		function editar(id){
			window.location.assign("../edicion/edicionAdmin.php?id_administrador="+id);
		}

		function baja(id){
			window.location.assign("../bajas/bajaAdmin.php?id_administrador="+id);
		}

		function alta(){
			window.location.assign("../inscripcion/inscripcionAdmin.php");
		}

		function permisos(id){
			window.location.assign("../edicion/edicionPermisos.php?id_administrador="+id);
		}
	</script>

</head>

<body onload="Buscar()">
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
					<li><a href="../menus/menuAdmin.php">Inicio</a></li>
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
					<h1 class="page-title">Administradores</h1>
				</header>
				<form class="form-inline" onsubmit="return Buscar()">
					<div class="form-group">
						<label for="buscar">Buscar:</label>
						<input type="text" class="form-control" id="buscar" placeholder="">
					</div>
					<div class="form-group">
						<label for="contiene">en</label>
						<select class="form-control" id="contiene">
							<option value="id_administrador">Id</option>
							<option value="d_nombre">Nombre</option>
							<option value="d_apellidoPaterno">Apellido Paterno</option>
							<option value="d_apellidoMaterno">Apellido Materno</option>
							<option value="d_email">Correo</option>
							<option value="d_curp">CURP</option>
						</select>
					</div>
					<button type="submit" class="btn btn-default">Buscar</button>
					<?php
					if($_SESSION['altaAdmin'] == 1)
						echo "<button onclick=\"alta()\" class=\"btn btn-default\">Crear Administrador</button>";
					?>
				</form>

			</article>
			<!-- /Article -->

			<table class="table table-hover" id="grid"></table>

		</div>
	</div>	<!-- /container -->


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

	<!-- Google Maps -->
	<script src="https://maps.googleapis.com/maps/api/js?key=&amp;sensor=false&amp;extension=.js"></script>
	<script src="assets/js/google-map.js"></script>


</body>
</html>
