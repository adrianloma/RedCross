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

	<title>Inscripci&oacute;n</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<script src="../../includes/inscripciones_util.js"></script>

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
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
				<a class="navbar-brand" href="#">Inscripci&oacute;n</a>
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
		<h2 class="thin">Inscripci&oacute;n de Maestro al Sistema</h2>
		<br>
	</div>
	<!-- /Intro-->

	<!-- Highlights - jumbotron -->
	<form method="post" onsubmit="return checkPasswords()" action="../../controladores/inscripcion/maestro.php" >
	<div class="">
		<div class="container">
			<div class="row">
				<!-- CURP del alumno -->
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Nombre(s)</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_nombre" placeholder="Nombre(s)" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Apellido Paterno</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_apellidopaterno" placeholder="Apellido Paterno" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Apellido Materno</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_apellidomaterno" placeholder="Apellido Materno" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="select" class="col-lg-2 control-label">Sexo</label>
					<div class="col-lg-10">
						<select class="form-control" id="select" name="m_sexo" required>
							<option value="">-</option>
							<option value="M">Masculino</option>
							<option value="F">Femenino</option>
						</select>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Edad</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" onchange="isFloat('m_edad')" id="m_edad" name="m_edad" placeholder="Edad (número)" >
					</div>
				</div>
				<br><br>	
				<div class="form-group">
					<label for="select" class="col-lg-2 control-label">Estado Civil</label>
					<div class="col-lg-10">
						<select class="form-control" id="select" name="m_estadocivil" required>
							<option value="">-</option>
							<option value="Soltero">Soltero</option>
							<option value="Casado">Casado</option>
							<option value="Divorciado">Divorciado</option>
							<option value="Viudo">Viudo</option>
						</select>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Fecha de Nacimiento</label>
					<div class="col-lg-10">
						<input type="date" class="form-control" id="" name="m_fechanac" placeholder="dd/mm/aaaa" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Lugar de Nacimiento</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_lugarnac" placeholder="Lugar de Nacimiento" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Nacionalidad</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_nacionalidad" placeholder="Nacionalidad" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">CURP</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_curp" placeholder="CURP" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="select" class="col-lg-2 control-label">Grupo Sangu&iacute;neo</label>
					<div class="col-lg-10">
						<select class="form-control" id="select" name="m_gposanguineo" required>
							<option value="">-</option>
							<option value="O-">O-</option>
							<option value="O+">O+</option>
							<option value="A-">A-</option>
							<option value="A+">A+</option>
							<option value="B-">B-</option>
							<option value="B+">B+</option>
							<option value="AB-">AB-</option>
							<option value="AB+">AB+</option>
						</select>
					</div>
				</div>
				<br><br>				
					
					
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">RH</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_rh" placeholder="RH" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Servicio medico</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_servmedico" placeholder="Servicio médico" >
					</div>
				</div>
				<br><br>				
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Trabajo</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_trabajo" placeholder="Liste su trabajo, omitir en caso de no tener" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Escolaridad</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_escolaridad" placeholder="Escolaridad" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Otros estudios</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_otrosestudios" placeholder="Liste si ha realizado otros estudios, omitir en caso de no tener" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Enfermedades</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_enfermedades" placeholder="Liste enfermedades que padece, omitir en caso de no tener" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Alergias</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_alergias" placeholder="Liste alergias que padece, omitir en caso de no tener" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Debilidad Motriz</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_debilidadmotriz" placeholder="Liste debilidades motrices que padece, omitir en caso de no tener" >
					</div>
				</div>
				<br><br>			
				
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Tel&eacute;fono local</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" onchange="isFloat('m_cp')" id="m_numlocal" name="m_numlocal" placeholder="Tel&eacute;fono" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Tel&eacute;fono celular</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" onchange="isFloat('m_numcelular')" id="m_numcelular" name="m_numcelular" placeholder="Tel&eacute;fono celular" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Email</label>
					<div class="col-lg-10">
						<input type="email" class="form-control" id="" name="m_email" placeholder="Email" >
					</div>
				</div>
				<br><br>	
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Direcci&oacute;n</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_domicilio" placeholder="Direcci&oacute;n con numero ext/int" required>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">C&oacute;digo postal</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" onchange="isFloat('m_cp')" id="m_cp" name="m_cp" placeholder="C&oacute;digo postal" required>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Colonia</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_colonia" placeholder="Colonia" required>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Municipio</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="" name="m_municipio" placeholder="Municipio" required>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">N&uacute;mero exterior</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" onchange="isFloat('m_numext')" id="m_numext" name="m_numext" placeholder="N&uacute;mero exterior" required>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">N&uacute;mero interior</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" onchange="isFloat('m_numint')" id="m_numint" name="m_numint" placeholder="N&uacute;mero interior" required>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Contraseña</label>
					<div class="col-lg-10">
						<input type="password" class="form-control" id="password1" name="m_contra" placeholder="Contraseña" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Repita contraseña</label>
					<div class="col-lg-10">
						<input type="password" onchange="showPasswordsAlert()" class="form-control" id="password2" name="" placeholder="Repita Contraseña" >
					</div>
				</div>		
			</div> <!-- /row  -->
			<br><br>
			<div class="row" style="text-align:center;">
				<a href="#">
					<input style="width:50%;" align="center" class="btn btn-action" value="Guardar" type="submit"></input>
				</a>
			</div> <!-- /row  -->
		</div>
	</div>
	</form>
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
