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

	<title>Edici&oacute;n</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
	<script src="../../includes/javascript_util.js"></script>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

	<script>

	function search(){
		var searchId = document.getElementById('searchId').value;
		if(!isValidMatricula(searchId)){
			alert("Favor de ingresar una matricula valida");
			return;
		}
	    xhr=new XMLHttpRequest();
	    xhr.onload= fillFields;
	    var url="../../controladores/edicion/search.php?matricula=" + searchId;
	    xhr.open("GET", url, true);
	    xhr.send();
	  }
	  function validarMatricula(){
	  	var id = document.getElementById('matricula').value;
	  	if (!isValidMatricula(id)) {
	  		alert("Matricula no valida, favor de volver a cargar el alumno");
	  		return false;
	  	}
	  	return true;
	  }
	  function fillFields(){
	    var fields = xhr.responseText.trim();
	    var arrayFields = fields.split("|");
	    if(arrayFields[0] == "-1"){
	    	alert(arrayFields[1]);
	    	return;
	    }
	    document.getElementById('matricula').value = 'a' + arrayFields[1];
	    document.getElementById('nombres').value = arrayFields[3];
	    document.getElementById('APaterno').value = arrayFields[4];
	    document.getElementById('AMaterno').value = arrayFields[5];
			document.getElementById('Aestatus').value = arrayFields[49];


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
				<a class="navbar-brand" href="#">Edici&oacute;n</a>
			</div>
			<div class="navbar-form navbar-left" >
				<div class="form-group">
					<input type="text" id="searchId" class="form-control" placeholder="Ingresar ID">
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
		<h2 class="thin">Re - inscripci&oacute;n del Alumno</h2>
		<br>
	</div>
	<!-- /Intro-->

	<!-- Highlights - jumbotron -->
	<div class="">
		<div class="container">
			<div class="row">
				<form method="post" onsubmit="return validarMatricula()" action="../../controladores/reinscripcion/alumno.php">
					<input type="hidden"  id="matricula" name="matricula" value="">
				<!-- CURP del alumno -->
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Nombre(s)</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombre" disabled >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Apellido Paterno</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="APaterno" name="APaterno" placeholder="Apellido Paterno"  disabled>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Apellido Materno</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="AMaterno" name="AMaterno" placeholder="Apellido Materno" disabled >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Estatus</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="Aestatus" name="Aestatus" placeholder="Estatus" disabled >
					</div>
				</div>




			</div> <!-- /row  -->
			<br><br>
			<div class="col-lg-12 text-right">
				<a href="#">
					<button style="width:100%;" class="btn btn-action" type="submit">Buscar</button>
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
<?php include "../../includes/footer.php"; ?>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>
