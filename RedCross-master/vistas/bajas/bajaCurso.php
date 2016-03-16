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

	<title>Bajas</title>

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

		function search(){
		var searchId = document.getElementById('searchId').value;
		if(!isValidMatricula(searchId) || (searchId[0] != 'c' &&  searchId[0] != 'C')){
			alert("Favor de ingresar una matricula valida");
			return;
		}
		//searchId = "c" + searchId;
	    xhr=new XMLHttpRequest();
	    xhr.onload= fillFields;
	    var url="../../controladores/edicion/search.php?matricula=" + searchId;
	    xhr.open("GET", url, true);
	    xhr.send();
	  }

	  function fillFields(){
	    var fields = xhr.responseText.trim();
	    var arrayFields = fields.split("|");
	    if(arrayFields[0] == "-1"){
	    	alert(arrayFields[1]);
	    	return;
	    }
	    document.getElementById('matricula').value = arrayFields[1];
	    document.getElementById('nombre').value = arrayFields[4];
	    document.getElementById('objetivoCurso').value = arrayFields[5];
	    document.getElementById('unidades').value = arrayFields[6];
	    document.getElementById('lugar').value = arrayFields[8];

	    if(arrayFields[9].indexOf("Lu") != -1)
	    	document.getElementById("Lunes").checked = true;

	    if(arrayFields[9].indexOf("Ma") != -1)
	    	document.getElementById("Martes").checked = true;

		if(arrayFields[9].indexOf("Mi") != -1)
	    	document.getElementById("Miercoles").checked = true;

	    if(arrayFields[9].indexOf("Ju") != -1)
	    	document.getElementById("Jueves").checked = true;

	    if(arrayFields[9].indexOf("Vi") != -1)
	    	document.getElementById("Viernes").checked = true;

	    if(arrayFields[9].indexOf("Sa") != -1)
	    	document.getElementById("Sabado").checked = true;
	    
	    document.getElementById('horaInicio').value = arrayFields[10];
	    document.getElementById('isPrioridadAlta').value = arrayFields[11];
	    document.getElementById('horaTerminacion').value = arrayFields[12];

	    var maestros = document.getElementById('maestroResponsable');

	    for(var x=0; x < maestros.length; x++){
	    	if(maestros[x].value == arrayFields[3]){
	    		maestros[x].selected = true;
	    	}
	    }

	  }
	</script>
</head>

<body class="home">

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Bajas</a>
			</div>
			<div class="navbar-form navbar-left" >
				<div class="form-group">
					<input type="text" class="form-control" id="searchId" name="searchId" placeholder="Ingresar ID">
				</div>
				<button onclick="search()" class="btn btn-default">Buscar</button>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../menus/menuAdmin.php">Regresar</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Intro -->
	<div class="container text-center">
		<h2 class="thin">Bajas de Cursos</h2>
		<br>
	</div>
	<!-- /Intro-->

	<!-- Highlights - jumbotron -->
	<div class="">
		<div class="container">
			<div class="row">
			<form method="post" onsubmit="" action="../../controladores/bajas/curso.php">
				<input type="hidden"  id="matricula" name="matricula" value="">
				<!-- CURP del alumno -->
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Nombre</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del curso" readonly="">
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="textArea" class="col-lg-2 control-label">Objetivo del curso</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="3" id="objetivoCurso" name="objetivoCurso" readonly=""></textarea>
					</div>
				</div>
				<br><br><br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Unidades</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" onchange="isInt('unidades')" id="unidades" name="unidades" placeholder="Unidades del curso" readonly="">
					</div>
				</div>
				<br><br><br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Dias de la semana</label>
					<div class="col-lg-10">
						<input type="checkbox" name="dias[]" id="Lunes" value="Lunes" onclick="return false;">Lunes<br>
						<input type="checkbox" name="dias[]" id="Martes" value="Martes" onclick="return false;">Martes<br> 
						<input type="checkbox" name="dias[]" id="Miercoles" value="Miercoles" onclick="return false;">Miercoles<br>
						<input type="checkbox" name="dias[]" id="Jueves" value="Jueves" onclick="return false;">Jueves<br>
						<input type="checkbox" name="dias[]" id="Viernes" value="Viernes" onclick="return false;">Viernes<br>
						<input type="checkbox" name="dias[]" id="Sabado" value="Sabado" onclick="return false;">Sabado<br>
					</div>
				</div>
				<br><br><br><br><br><br><br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Hora de inicio</label>
					<div class="col-lg-10">
						<input type="time" class="form-control" id="horaInicio" name="horaInicio" readonly="">
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Hora de terminacion</label>
					<div class="col-lg-10">
						<input type="time" class="form-control" id="horaTerminacion" name="horaTerminacion" readonly="">
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Lugar</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="lugar" name="lugar" placeholder="Lugar en donde se impartira" readonly="">
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="select" class="col-lg-2 control-label">Curso con prioridad alta</label>
					<div class="col-lg-10">
						<select class="form-control" id="isPrioridadAlta" name="isPrioridadAlta" readonly="">
							<option value="No">No</option>
							<option value="Si">Si</option>
						</select>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Maestro(a) responsable</label>
					<div class="col-lg-10">
					<select class="form-control" id="maestroResponsable" name="maestroResponsable" readonly="">
						<option value="">-</option>
						<?php
							$sql="SELECT id_maestro, m_nombre, m_apellidopaterno FROM maestro where m_estatus = 1";
							$result = mysqli_query($conexion,$sql);
							while ($row = mysqli_fetch_assoc($result)){
								echo "<option value=\"".$row['id_maestro'] ."\"> ".$row['m_nombre']." ".$row['m_apellidopaterno']."</option><br>";
							}
						?>
					</select>
					</div>
				</div>
			</div> <!-- /row  -->
			<br><br>
			<div class="col-lg-12 text-right">
				<a href="#">
					<button style="width:100%;" class="btn btn-action" type="submit">Dar de baja</button>
				</a>
			</form>
				<br><br>
				<a href="../../vistas/menus/menuAdmin.php">
					<button style="width:100%;" class="btn btn-action" type="submit">Cancelar</button>
				</a>
			</div>
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
