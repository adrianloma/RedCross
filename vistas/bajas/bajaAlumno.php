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
		<?php
			if($_SESSION['bajaAlumno'] == 0)
				echo 'window.location.href = "../menus/menuABCAdmins.php";';
		?>
		var searchId ="a"+getQueryVariable("id_alumno");

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
		document.getElementById('FechaNacimiento').value = arrayFields[6];
		document.getElementById('LugarNacimiento').value = arrayFields[7];
		document.getElementById('Nacionalidad').value = arrayFields[8];
		selectOption(document.getElementById('Sexo'), arrayFields[9]);
		selectOption(document.getElementById('EstadoCivil'), arrayFields[10]);
		selectOption(document.getElementById('GrupoSanguineo'), arrayFields[11]);
		document.getElementById('RH').value = arrayFields[12];
		document.getElementById('CURP').value = arrayFields[13];
		document.getElementById('ServicioMedico').value = arrayFields[14];
		document.getElementById('ActualmenteLaborando').value = arrayFields[15];
		document.getElementById('Enfermedades').value = arrayFields[16];
		document.getElementById('Alergias').value = arrayFields[17];
		document.getElementById('DebilidadMotriz').value = arrayFields[18];
		document.getElementById('Direccion').value = arrayFields[19];
		document.getElementById('CP').value = arrayFields[20];
		document.getElementById('Colonia').value = arrayFields[21];
		document.getElementById('Municipio').value = arrayFields[22];
		document.getElementById('Telefono').value = arrayFields[23];
		document.getElementById('NombrePadre').value = arrayFields[24];
		document.getElementById('OcupacionPadre').value = arrayFields[25];
		document.getElementById('EmpresaPadre').value = arrayFields[26];
		document.getElementById('SueldoPadre').value = arrayFields[27];
		document.getElementById('NombreMadre').value = arrayFields[28];
		document.getElementById('OcupacionMadre').value = arrayFields[29];
		document.getElementById('EmpresaMadre').value = arrayFields[30];
		document.getElementById('SueldoMadre').value = arrayFields[31];
		document.getElementById('OtrosEstudios').value = arrayFields[32];
		document.getElementById('SuspendidoEstudios').value = arrayFields[33];
		document.getElementById('MateriasReprobadas').value = arrayFields[34];
		document.getElementById('ApoyoEconomico').value = arrayFields[35];
		document.getElementById('EnteroEscuela').value = arrayFields[36];
		document.getElementById('PorqueEstudiarCR').value = arrayFields[37];
		document.getElementById('PorqueEstudiarEnfermeria').value = arrayFields[38];
		document.getElementById('OtrasCarrerasPosibles').value = arrayFields[39];
		document.getElementById('RegistroCeneval').value = arrayFields[40];
		document.getElementById('RegistroEscuela').value = arrayFields[41];
		document.getElementById('ExamenPsicometrico').value = arrayFields[42];
		document.getElementById('Entrevisto').value = arrayFields[43];
		document.getElementById('Email').value = arrayFields[44];
		selectOption(document.getElementById('Estatus'), arrayFields[46]);
		document.getElementById('celularPadre').value = arrayFields[47];
		document.getElementById('celularMadre').value = arrayFields[48];
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
				<a class="navbar-brand" href="#">Bajas</a>
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
		<h2 class="thin">Cambio estatus de Alumno</h2>
		<br>
	</div>
	<!-- /Intro-->

	<!-- Highlights - jumbotron -->
	<div class="">
		<div class="container">
			<div class="row">
				<form method="post" onsubmit="return validarMatricula()" action="../../controladores/bajas/alumno.php">
					<input type="hidden"  id="matricula" name="matricula" value="">
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Nombre(s)</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombre" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Apellido Paterno</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="APaterno" name="APaterno" placeholder="Apellido Paterno" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Apellido Materno</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="AMaterno" name="AMaterno" placeholder="Apellido Materno" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Fecha Nacimiento</label>
					<div class="col-lg-10">
						<input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento" placeholder="dd/mm/aaaa" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Lugar de Nacimiento</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="LugarNacimiento" name="LugarNacimiento" placeholder="Ciudad" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Nacionalidad</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="Nacionalidad" name="Nacionalidad" placeholder="Mexicano" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="select" class="col-lg-2 control-label">Sexo</label>
					<div class="col-lg-10">
						<select class="form-control" id="Sexo" name="Sexo" readonly>
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
						<select class="form-control" id="EstadoCivil" name="EstadoCivil" readonly>
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
						<select class="form-control" id="GrupoSanguineo" name="GrupoSanguineo" readonly>
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
						<input type="text" class="form-control" id="RH" name="RH" placeholder="RH" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">CURP</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="CURP" name="CURP" placeholder="CURP" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="select" class="col-lg-2 control-label">Con cual servicio m&eacute;dico cuenta?</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="ServicioMedico" name="ServicioMedico" placeholder="" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="select" class="col-lg-2 control-label">Trabajo Actual</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="ActualmenteLaborando" name="ActualmenteLaborando" placeholder="" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Enfermedades</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="Enfermedades" name="Enfermedades" placeholder="Liste enfermedades que padece" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Alergias</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="Alergias" name="Alergias" placeholder="Liste alergias que padece" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Tiene alg&uacute;n tipo de debilidad motriz?</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="DebilidadMotriz" name="DebilidadMotriz" placeholder="Liste alergias que padece" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Direcci&oacute;n</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Direcci&oacute;n con numero ext/int" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">C&oacute;digo postal</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="CP" name="CP" placeholder="C&oacute;digo postal" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Colonia</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="Colonia" name="Colonia" placeholder="Colonia" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Municipio</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="Municipio" name="Municipio" placeholder="Municipio" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Tel&eacute;fono local o celular</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Tel&eacute;fono" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Email</label>
					<div class="col-lg-10">
						<input type="email" class="form-control" id="Email" name="Email" placeholder="Email" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Nombre completo del padre</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="NombrePadre" name="NombrePadre" placeholder="Nombre" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Ocupaci&oacute;n laboral</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="OcupacionPadre" name="OcupacionPadre" placeholder="Puesto" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Empresa donde labora</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="EmpresaPadre" name="EmpresaPadre" placeholder="Empresa" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Sueldo</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" onchange="isFloat('SueldoPadre')" id="SueldoPadre" name="SueldoPadre" placeholder="Sueldo" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Celular</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="celularPadre" name="celularPadre" placeholder="Celular del padre" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Nombre completo de la madre</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="NombreMadre" name="NombreMadre" placeholder="Nombre" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Ocupaci&oacute;n laboral</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="OcupacionMadre" name="OcupacionMadre" placeholder="Puesto" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Empresa donde labora</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="EmpresaMadre" name="EmpresaMadre" placeholder="Empresa" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Sueldo</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" onchange="isFloat('SueldoMadre')" id="SueldoMadre" name="SueldoMadre" placeholder="Sueldo" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Celular</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="celularMadre" name="celularMadre" placeholder="Celular de la madre" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">¿Ha cursado otros estudios?</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="OtrosEstudios" name="OtrosEstudios" placeholder="Si/No y ¿Cuales?" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">¿Ha suspendido sus estudios?</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="SuspendidoEstudios" name="SuspendidoEstudios" placeholder="Si/No y ¿Por qu&eacute; causa?" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">¿Qu&eacute; materias ha reprobado?</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="MateriasReprobadas" name="MateriasReprobadas" placeholder="" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">¿Qui&eacute;n lo apoya econ&oacute;micamente en sus estudios?</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="ApoyoEconomico" name="ApoyoEconomico" placeholder="" readonly>
					</div>
				</div>
				<br><br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">¿C&oacute;mo se enter&oacute; de la escuela?</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="EnteroEscuela" name="EnteroEscuela" placeholder="" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="textArea" class="col-lg-2 control-label">¿Por qu&eacute; desea estudiar en la Cruz Roja?</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="3" id="PorqueEstudiarCR" name="PorqueEstudiarCR" readonly></textarea>
					</div>
				</div>
				<br><br><br><br>
				<div class="form-group">
					<label for="textArea" class="col-lg-2 control-label">¿Por qu&eacute; desea estudiar enfermer&iacute;a?</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="3" id="PorqueEstudiarEnfermeria" name="PorqueEstudiarEnfermeria" readonly></textarea>
					</div>
				</div>
				<br><br><br><br>
				<div class="form-group">
					<label for="textArea" class="col-lg-2 control-label">Ademas de enfermer&iacute;a, ¿qu&eacute; otras carreras le gustar&iacute;a estudiar?</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="3" id="OtrasCarrerasPosibles" name="OtrasCarrerasPosibles" readonly></textarea>
					</div>
				</div>
				<br><br><br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">¿Realiz&oacute; su registro ante el CENEVAL?</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" onchange="isFloat('RegistroCeneval')" id="RegistroCeneval" name="RegistroCeneval" placeholder="Puntaje CENEVAL" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">¿Realiz&oacute; su registro ante la escuela?</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="RegistroEscuela" name="RegistroEscuela" placeholder="" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">¿Contest&oacute; el examen psicom&eacute;trico?</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="ExamenPsicometrico" name="ExamenPsicometrico" placeholder="" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">¿Acudi&oacute; a la entrevista?</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="Entrevisto" name="Entrevisto" placeholder="" readonly>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="select" class="col-lg-2 control-label">Estatus</label>
					<div class="col-lg-10">
						<select class="form-control" id="Estatus" name="Estatus">
							<option value="Activo">Activo</option>
							<option value="Baja temporal">Baja temporal</option>
							<option value="Baja definitiva">Baja definitiva</option>
						</select>
					</div>
				</div>
			</div> <!-- /row  -->
			<br><br>
			<div class="col-lg-12 text-right">
				<a href="#">
					<button style="width:100%;" class="btn btn-action" type="submit">Guardar</button>
				</a>
			</form>
				<br><br>
				<a href="../menus/menuABCAlumnos.php">
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
