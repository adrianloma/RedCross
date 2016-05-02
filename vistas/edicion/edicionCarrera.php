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

	<title>Edici&oacute;n</title>

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
			<?php
				if($_SESSION['cambioGrupoCursos'] == 0)
					echo 'window.location.href = "../menus/menuABCAdmins.php";';
			?>
			var searchId ="p"+getQueryVariable("id_carrera");
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
			document.getElementById('nombre').value = arrayFields[2];
			document.getElementById('descripcion').value = arrayFields[3];
	    	document.getElementById('estatus').value = arrayFields[5];

		}

		function regresar(){
			window.history.back();
		}
</script>
</head>

<body class="home" onload="search()">

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

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" onclick="regresar()">Regresar</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Intro -->
	<div class="container text-center">
		<h2 class="thin">Edici&oacute;n de carrera</h2>
		<br>
	</div>
	<!-- /Intro-->

	<!-- Highlights - jumbotron -->
	<div class="">
		<div class="container">
			<div class="row">
				<form method="post" action="../../controladores/edicion/carrera.php">
					<input type="hidden" id="matricula" value="" name="matricula">
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Siglas</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Siglas de la carrera" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="textArea" class="col-lg-2 control-label">Descripci&oacute;n</label>
						<div class="col-lg-10">
							<textarea class="form-control" rows="3" id="descripcion" name="descripcion" required></textarea>
						</div>
					</div>
					<br><br>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Estatus</label>
						<div class="col-lg-10">
						<select class="form-control" id="estatus" name="estatus" required>
							<option value="1">Alta</option>
							<option value="0">Baja</option>
						</select>
						</div>
					</div>
					<br><br>
					<br><br>
					<div class="row" style="text-align:center;">
						<a href="#">
							<button style="width:75%;" align="center" class="btn btn-action" type="submit">Guardar</button>
						</a>
					</div>
				</form>
				<br>
				<div class="row" style="text-align:center;">
					<a href="#" onclick="regresar()">
						<button style="width:75%;" class="btn btn-action" >Cancelar</button>
					</a>
				</div>
			</div> <!-- /row  -->
			<br><br>
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
