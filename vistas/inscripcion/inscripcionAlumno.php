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

</head>

<script type="text/javascript">

		window.onload = function(){
		<?php
			if($_SESSION['altaAlumno'] == 0)
				echo 'window.location.href = "../menus/menuABCAdmins.php";';
		?>
	}
	
</script>

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
					<li><a href="../menus/menuABCAlumnos.php">Regresar</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Intro -->
	<div class="container text-center">
		<h2 class="thin">Inscripci&oacute;n de Alumno</h2>
		<br>
	</div>
	<!-- /Intro-->

	<!-- Highlights - jumbotron -->
	<div class="">
		<div class="container">
			<div class="row">
				<form method="post" onsubmit="return validaFormaAdmin()" action="../../controladores/inscripcion/alumno.php">
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Nombre(s)</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="nombres" placeholder="Nombre" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Apellido Paterno</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="APaterno" placeholder="Apellido Paterno" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Apellido Materno</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="AMaterno" placeholder="Apellido Materno" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Fecha Nacimiento</label>
						<div class="col-lg-10">
							<input type="date" class="form-control" id="" name="FechaNacimiento" placeholder="dd/mm/aaaa" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Lugar de Nacimiento</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="LugarNacimiento" placeholder="Ciudad" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Nacionalidad</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="Nacionalidad" placeholder="Pa&iacute;s" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="select" class="col-lg-2 control-label">Sexo</label>
						<div class="col-lg-10">
							<select class="form-control" id="select" name="Sexo" required>
								<option value="">-</option>
								<option value="M">Masculino</option>
								<option value="F">Femenino</option>
							</select>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="select" class="col-lg-2 control-label">Estado Civil</label>
						<div class="col-lg-10">
							<select class="form-control" id="select" name="EstadoCivil" required>
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
						<label for="select" class="col-lg-2 control-label">Grupo Sangu&iacute;neo</label>
						<div class="col-lg-10">
							<select class="form-control" id="select" name="GrupoSanguineo" required>
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
							<input type="text" class="form-control" id="" name="RH" placeholder="RH" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">CURP</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="CURP" placeholder="CURP" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="select" class="col-lg-2 control-label">¿Con cual servicio m&eacute;dico cuenta?</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="ServicioMedico" placeholder="">
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="select" class="col-lg-2 control-label">Trabajo Actual</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="ActualmenteLaborando" placeholder="">
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Enfermedades</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="Enfermedades" placeholder="Liste enfermedades que padece">
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Alergias</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="Alergias" placeholder="Liste alergias que padece">
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">¿Tiene alg&uacute;n tipo de debilidad motriz?</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="DebilidadMotriz" placeholder="Liste debilidades motrices que padece, omitir en caso de no tener">
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Direcci&oacute;n</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="Direccion" placeholder="Direcci&oacute;n con numero ext/int" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">C&oacute;digo postal</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="CP" placeholder="C&oacute;digo postal" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Colonia</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="Colonia" placeholder="Colonia" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Municipio</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="Municipio" placeholder="Municipio" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Tel&eacute;fono local o celular</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="Telefono" placeholder="Tel&eacute;fono" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Email</label>
						<div class="col-lg-10">
							<input type="email" class="form-control" id="" name="Email" placeholder="Email" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Nombre completo del padre</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="NombrePadre" placeholder="Nombre" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Ocupaci&oacute;n laboral</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="OcupacionPadre" placeholder="Puesto" >
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Empresa donde labora</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="EmpresaPadre" placeholder="Empresa" >
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Sueldo</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" onchange="isFloat('SueldoPadre')" id="SueldoPadre" name="SueldoPadre" placeholder="Sueldo" >
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Celular</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="celularPadre" placeholder="Celular del padre" >
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Nombre completo de la madre</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="NombreMadre" placeholder="Nombre" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Ocupaci&oacute;n laboral</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="OcupacionMadre" placeholder="Puesto" >
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Empresa donde labora</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="EmpresaMadre" placeholder="Empresa" >
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Sueldo</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" onchange="isFloat('SueldoMadre')" id="SueldoMadre" name="SueldoMadre" placeholder="Sueldo" >
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Celular</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="celularMadre" placeholder="Celular de la madre" >
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">¿Ha cursado otros estudios?</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="OtrosEstudios" placeholder="Si/No y ¿Cuales?" >
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">¿Ha suspendido sus estudios?</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="SuspendidoEstudios" placeholder="Si/No y ¿Por qu&eacute; causa?" >
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">¿Qu&eacute; materias ha reprobado?</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="MateriasReprobadas" placeholder="" >
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">¿Qui&eacute;n lo apoya econ&oacute;micamente en sus estudios?</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="ApoyoEconomico" placeholder="" required>
						</div>
					</div>
					<br><br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">¿C&oacute;mo se enter&oacute; de la escuela?</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="EnteroEscuela" placeholder="" >
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="textArea" class="col-lg-2 control-label">¿Por qu&eacute; desea estudiar en la Cruz Roja?</label>
						<div class="col-lg-10">
							<textarea class="form-control" rows="3" id="textArea" name="PorqueEstudiarCR"></textarea>
						</div>
					</div>
					<br><br><br><br>
					<div class="form-group">
						<label for="textArea" class="col-lg-2 control-label">¿Por qu&eacute; desea estudiar enfermer&iacute;a?</label>
						<div class="col-lg-10">
							<textarea class="form-control" rows="3" id="textArea" name="PorqueEstudiarEnfermeria"></textarea>
						</div>
					</div>
					<br><br><br><br>
					<div class="form-group">
						<label for="textArea" class="col-lg-2 control-label">Ademas de enfermer&iacute;a, ¿qu&eacute; otras carreras le gustar&iacute;a estudiar?</label>
						<div class="col-lg-10">
							<textarea class="form-control" rows="3" id="textArea" name="OtrasCarrerasPosibles"></textarea>
						</div>
					</div>
					<br><br><br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">¿Realiz&oacute; su registro ante el CENEVAL?</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" onchange="isFloat('CENEVAL')" id="CENEVAL" name="RegistroCeneval" placeholder="Puntaje CENEVAL" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">¿Realiz&oacute; su registro ante la escuela?</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="RegistroEscuela" placeholder="" >
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">¿Contest&oacute; el examen psicom&eacute;trico?</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="ExamenPsicometrico" placeholder="" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">¿Acudi&oacute; a la entrevista?</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="" name="Entrevisto" placeholder="" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="select" class="col-lg-2 control-label">Carrera</label>
						<div class="col-lg-10">
							<select class="form-control" id="select" name="carrera" required>
								<option value="">-</option>
								<?php
									$sql="select
												id_carrera,
											    c_nombre
											from
												carrera
											where
												c_estatus = 1";
									$result = mysqli_query($conexion,$sql);
									while ($row = mysqli_fetch_assoc($result)){
										echo "<option value=\"".$row['id_carrera'] ."\"> ".$row['c_nombre']."</option>";
									}
								?>
							</select>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Contraseña</label>
						<div class="col-lg-10">
							<input type="password" class="form-control" id="password1" name="Contrasena" placeholder="Contraseña" required>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Repita contraseña</label>
						<div class="col-lg-10">
							<input type="password" class="form-control" id="password2" name="" placeholder="Repita Contraseña" required>
						</div>
					</div>
				</div> <!-- /row  -->
				<br><br>
				<div class="row" style="text-align:center;">
					<a href="#">
						<input style="width:50%;" align="center" class="btn btn-action" value="Guardar" type="submit"></input>
					</a>
				</div> <!-- /row  -->
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
