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
		function selectOption(select, textOption){
			for(option in select.options){
				if(textOption == option.text){
					option.selected = true;
					break;
				}
			}
		}
		function search(){
			<?php
				if($_SESSION['cambioGrupoCursos'] == 0)
					echo 'window.location.href = "../menus/menuABCAdmins.php";';			
			?>

			var searchId ="r"+getQueryVariable("id_administrador");
			xhr=new XMLHttpRequest();
			xhr.onload= fillFields;
			var url="../../controladores/edicion/search.php?matricula=" + searchId;
			xhr.open("GET", url, true);
			xhr.send();

		}
			
		function fillFields(){
			//alert(xhr.responseText);
			console.log(xhr.responseText);
			var fields = xhr.responseText.trim();
			var arrayFields = fields.split("|");
			if(arrayFields[0] == "-1"){
				alert(arrayFields[1]);
				return;
			}

			document.getElementById('id_permiso').value = parseInt(arrayFields[1]);

			document.getElementById('id_administrador').value = parseInt(arrayFields[2]);

			document.getElementById('altaAdmin').checked = parseInt(arrayFields[3]);
			document.getElementById('bajaAdmin').checked = parseInt(arrayFields[4]);
			document.getElementById('cambioAdmin').checked = parseInt(arrayFields[5]);
			document.getElementById('altaMaestro').checked = parseInt(arrayFields[6]);
			document.getElementById('bajaMaestro').checked = parseInt(arrayFields[7]);
			document.getElementById('cambioMaestro').checked = parseInt(arrayFields[8]);
			document.getElementById('altaAlumno').checked = parseInt(arrayFields[9]);
			document.getElementById('bajaAlumno').checked = parseInt(arrayFields[10]);
			document.getElementById('cambioAlumno').checked = parseInt(arrayFields[11]);
			document.getElementById('altaPeriodo').checked = parseInt(arrayFields[12]);
			document.getElementById('bajaPeriodo').checked = parseInt(arrayFields[13]);
			document.getElementById('cambioPeriodo').checked = parseInt(arrayFields[14]);
			document.getElementById('altaGrupoCursos').checked = parseInt(arrayFields[15]);
			document.getElementById('bajaGrupoCursos').checked = parseInt(arrayFields[16]);
			document.getElementById('cambioGrupoCursos').checked = parseInt(arrayFields[17]);
			document.getElementById('verReportes').checked = parseInt(arrayFields[18]);

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
					<li><a href="../menus/menuABCAdmins.php">Regresar</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Intro -->
	<div class="container text-center">
		<h2 class="thin">Edici&oacute;n de permisos de Administrador</h2>
		<br>
	</div>
	<!-- /Intro-->

	<!-- Highlights - jumbotron -->
	<form method="post" action="../../controladores/edicion/permisos.php">
		<input type="hidden"  id="id_permiso" name="id_permiso" value="">
		<input type="hidden"  id="id_administrador" name="id_administrador" value="">

	<div class="">
		<div class="container">
			<div class="row">
				<!-- CURP del alumno -->
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Administradores: Alta</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="altaAdmin" name="altaAdmin" placeholder="altaAdmin" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Administradores: Baja</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="bajaAdmin" name="bajaAdmin" placeholder="bajaAdmin" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Administradores: Cambio</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="cambioAdmin" name="cambioAdmin" placeholder="cambioAdmin" >	
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Maestro: Alta</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="altaMaestro" name="altaMaestro" placeholder="altaMaestro" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Maestro: Baja</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="bajaMaestro" name="bajaMaestro" placeholder="bajaMaestro" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Maestro: Cambio</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="cambioMaestro" name="cambioMaestro" placeholder="cambioMaestro" >	
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Alumno: Alta</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="altaAlumno" name="altaAlumno" placeholder="altaAlumno" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Alumno: Baja</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="bajaAlumno" name="bajaAlumno" placeholder="bajaAlumno" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Alumno: Cambio</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="cambioAlumno" name="cambioAlumno" placeholder="cambioAlumno" >			
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Periodo: Alta</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="altaPeriodo" name="altaPeriodo" placeholder="altaAdmin" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Periodo: Baja</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="bajaPeriodo" name="bajaPeriodo" placeholder="bajaPeriodo" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Periodo: Cambio</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="cambioPeriodo" name="cambioPeriodo" placeholder="cambioPeriodo" >	
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Grupos&Cursos&Carreras: Alta</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="altaGrupoCursos" name="altaGrupoCursos" placeholder="altaGrupoCursos" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Grupos&Cursos&Carreras: Baja</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="bajaGrupoCursos" name="bajaGrupoCursos" placeholder="bajaGrupoCursos" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Grupos&Cursos&Carreras: Cambio</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="cambioGrupoCursos" name="cambioGrupoCursos" placeholder="cambioGrupoCursos" >	
					</div>
				</div>
				<br><br>	
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Permisos: Cambio</label>
					<div class="col-lg-10">
						<input type="checkbox" class="form-control" id="verReportes" name="verReportes" placeholder="verReportes" >	
					</div>
				</div>
				<br><br>

			</div> <!-- /row  -->
			<br><br>
			<div class="col-lg-12 text-right">
				<a href="#">
					<button style="width:100%;" class="btn btn-action" type="submit" >Guardar</button>
				</a>
				<br><br>
				<a href="../menus/menuABCAdmins.php">
					<button style="width:100%;" class="btn btn-action" type="button" >Cancelar</button>
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
