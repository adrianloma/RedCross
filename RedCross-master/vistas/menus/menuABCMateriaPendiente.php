<?php
	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/periodo_util.php";
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

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
	<script src="../../includes/javascript_util.js"></script>

	<script>

		function Buscar(){

			document.getElementById('titulo').innerHTML = unescape(getQueryVariable("per_nombre")) + 
											" > " + unescape(getQueryVariable("siglas")) + 
											" > Nivel Escolar:" +  unescape(getQueryVariable("semestre")) +
											" > Grupo:" +  unescape(getQueryVariable("grupo")) +
											" > Alumnos con materias pendientes";

			var buscar = document.getElementById('buscar').value;
			var contiene = document.getElementById('contiene').value;
			
		    xhr=new XMLHttpRequest();
		    xhr.onload= fillFields;
		    var url="../../controladores/edicion/gridMateriaPendiente.php?buscar=" + buscar + 
						    														"&contiene=" + contiene +
						    														"&id_periodo=" + unescape(getQueryVariable("id_periodo"))+
						    														"&id_Semestre=" + unescape(getQueryVariable("id_Semestre"))+
						    														"&id_carrera=" + unescape(getQueryVariable("id_carrera"));
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
									"<th>Materias reprobadas</th>"+
									"<th>Inscripci&oacute;n</th>"+
								"</tr>"+
								"</thead>" + tabla;
		}


		function historial(id_alumno, nombre, id_periodo, id_nivelEscolarViejo, id_nivelEscolar){
			window.open("historial.php?id_alumno="+id_alumno+
										"&nombre="+nombre+
										"&id_periodo="+id_periodo+
										"&id_nivelEscolarViejo="+id_nivelEscolarViejo+
										"&id_nivelEscolar="+id_nivelEscolar);
		}

		function inscribir(id_alumno, id_nivelEscolar, alumno){
			window.location.assign("menuABCInscribirCursosReprobados.php?id_alumno=" + id_alumno + 
																			"&id_nivelEscolar=" + id_nivelEscolar +	
																			"&id_periodo="+getQueryVariable("id_periodo")+
																			"&per_nombre="+getQueryVariable("per_nombre")+
																			"&id_carrera="+getQueryVariable("id_carrera")+
																			"&siglas="+getQueryVariable("siglas")+
																			"&id_Semestre="+getQueryVariable("id_Semestre")+
																			"&semestre="+getQueryVariable("semestre")+
																			"&alumno="+alumno);
		}

		function regresar(){
			window.history.back();
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
			<article class="col-sm-12 maincontent">
				<header class="page-header">
					<h2 class="page-title" id="titulo">Cursos</h2>
				</header>
				<form class="form-inline" onsubmit="return Buscar()">
					<div class="form-group">
						<label for="buscar">Buscar:</label>
						<input type="text" class="form-control" id="buscar" placeholder="">
					</div>
					<div class="form-group">
						<label for="contiene">en</label>
						<select class="form-control" id="contiene">
							<option value="id_alumno">Id</option>
							<option value="a_nombre">Nombre</option>
							<option value="a_apellidoPaterno">Apellido Paterno</option>
							<option value="a_apellidoMaterno">Apellido Materno</option>
							<option value="a_email">Correo</option>
							<option value="a_curp">CURP</option>
						</select>
					</div>
					<button type="submit" class="btn btn-default">Buscar</button>
					<button onclick="regresar()" class="btn btn-default">Regresar</button>
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
