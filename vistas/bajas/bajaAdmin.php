<?php
include "../../includes/sessionAdmin.php";
include "../../includes/conexion.php";

$query = "SELECT  d_nombre, "
        . "d_apellidopaterno, "
        . "d_apellidomaterno, "
        . "d_fechanac, "
        . "d_lugarnac, "
        . "d_nacionalidad, "
        . "d_sexo, "
        . "d_estadocivil, "
        . "d_gposanguineo, "
        . "d_rh, "
        . "d_curp, "
        . "d_servmedico, "
        . "d_trabajo, "
        . "d_enfermedades, "
        . "d_alergias, "
        . "d_debilidadmotriz, "
        . "d_domicilio, "
        . "d_numext, "
        . "d_numint, "
        . "d_cp, "
        . "d_colonia, "
        . "d_municipio, "
        . "d_numlocal, "
        . "d_numcelular, "
        . "d_escolaridad, "
        . "d_otrosestudios, "
        . "d_email "
        . "FROM administrador "
        . "WHERE id_administrador = " 
        . $_GET['id_administrador'];

$result = mysqli_query($conexion, mysqli_real_escape_string($conexion, $query));
$response = "";
$row = "";
if($result){
  $row = mysqli_fetch_assoc($result);
  foreach ($row as $col_value) {
      $response = $response . '|' . $col_value;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<title>Dar de baja a un administrador</title>

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
    var admin_data = <?php echo json_encode($row); ?>;

    window.onload = function(){

      <?php
        if($_SESSION['bajaAdmin'] == 0)
          echo 'window.location.href = "../menus/menuABCAdmins.php";';
        ?>
        
        if (admin_data != null && admin_data != "" ) {
          document.getElementById("nombres").value = admin_data.d_nombre;
          document.getElementById("APaterno").value = admin_data.d_apellidopaterno;
          document.getElementById("AMaterno").value = admin_data.d_apellidomaterno;
          document.getElementById("FechaNacimiento").value = admin_data.d_fechanac;
          document.getElementById("LugarNacimiento").value = admin_data.d_lugarnac;
          document.getElementById("Nacionalidad").value = admin_data.d_nacionalidad;
          document.getElementById("RH").value = admin_data.d_rh;
          document.getElementById("CURP").value = admin_data.d_curp;
          document.getElementById("ServicioMedico").value = admin_data.d_servmedico;
          document.getElementById("ActualmenteLaborando").value = admin_data.d_trabajo;
          document.getElementById("Enfermedades").value = admin_data.d_enfermedades;
          document.getElementById("Alergias").value = admin_data.d_alergias;
          document.getElementById("DebilidadMotriz").value = admin_data.d_debilidadmotriz;
          document.getElementById("Direccion").value = admin_data.d_domicilio;
          document.getElementById("NumInterior").value = admin_data.d_numint;
          document.getElementById("NumExterior").value = admin_data.d_numext;
          document.getElementById("CP").value = admin_data.d_cp;
          document.getElementById("Colonia").value = admin_data.d_colonia;
          document.getElementById("Municipio").value = admin_data.d_municipio;
          document.getElementById("TelefonoLocal").value = admin_data.d_numlocal;
          document.getElementById("TelefonoCelular").value = admin_data.d_numcelular;
          document.getElementById("Escolaridad").value = admin_data.d_escolaridad;
          document.getElementById("OtrosEstudios").value = admin_data.d_otrosestudios;
          document.getElementById("Email").value = admin_data.d_email;
          selectOption(document.getElementById("Sexo"), admin_data.d_sexo);
          selectOption(document.getElementById("EstadoCivil"), admin_data.d_estadocivil);
          selectOption(document.getElementById("GrupoSanguineo"), admin_data.d_gposanguineo);
        } else {
          alert( "Hubo un error al tratar de obtener la información. Por favor intente de nuevo." );
          history.back();
        }
    }
function confirmDelete(){
  if( window.confirm("Si se borra este administrador, no habra manera de recuperarlo, ¿estas seguro?"))
  {
    if( window.confirm("Por ultima vez, quiere borrar este administrador?")){
      var xmlhttp = new XMLHttpRequest();
      var response = "";
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              response = JSON.parse(xmlhttp.responseText);
              if(response.error == ""){
                alert("Se borro exitosamente");
                history.back();
              }
              else{
                alert("Hubo un error. \n" + response.error);
                history.back();
              }
          }
      };
      xmlhttp.open("GET", "../../controladores/bajas/admin.php?matricula=" + <?php echo $_GET['id_administrador']; ?>, true);
      xmlhttp.send();      
      return false;
    }
  }
  return false;


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
				<a class="navbar-brand" href="#">Dar de baja a un administrador</a>
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
		<h2 class="thin">Dar de BAJA a un Administrador</h2>
		<br>
	</div>
	<!-- /Intro-->

	<!-- Highlights - jumbotron -->
<div class="">
    <div class="container">
      <div class="row">
        <form method="post" onsubmit="return confirmDelete()">
        <input type="hidden"  id="matricula" name="matricula" value="<?php echo $_GET['id_administrador'] ?>">

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Nombre(s)</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombre" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Apellido Paterno</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="APaterno" name="APaterno" placeholder="Apellido Paterno" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Apellido Materno</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="AMaterno" name="AMaterno" placeholder="Apellido Materno" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Fecha Nacimiento</label> 
            <div class="col-lg-10">
              <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento" placeholder="dd/mm/aaaa" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Lugar de Nacimiento</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="LugarNacimiento" name="LugarNacimiento" placeholder="Ciudad" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Nacionalidad</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="Nacionalidad" name="Nacionalidad" placeholder="Pa&iacute;s" readonly></div></div></br></br>

          <div class="form-group">
            <label for="select" class="col-lg-2 control-label">Sexo</label> 
            <div class="col-lg-10">
              <select class="form-control" id="Sexo" name="Sexo" readonly>
                <option value="">-</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
              </select></div></div></br></br>

          <div class="form-group">
            <label for="select" class="col-lg-2 control-label">Estado Civil</label> 
            <div class="col-lg-10">
              <select class="form-control" id="EstadoCivil" name="EstadoCivil" readonly>
                <option value="">-</option>
                <option value="Soltero">Soltero</option>
                <option value="Casado">Casado</option>
                <option value="Divorciado">Divorciado</option>
                <option value="Viudo">Viudo</option>
              </select></div></div></br></br>

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
              </select></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">RH</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="RH" name="RH" placeholder="RH" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">CURP</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="CURP" name="CURP" placeholder="CURP" readonly></div></div></br></br>

          <div class="form-group">
            <label for="select" class="col-lg-2 control-label">¿Con cual servicio m&eacute;dico cuenta?</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="ServicioMedico" name="ServicioMedico" placeholder="" readonly></div></div></br></br>

          <div class="form-group">
            <label for="select" class="col-lg-2 control-label">Trabajo Actual</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="ActualmenteLaborando" name="ActualmenteLaborando" placeholder="" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Enfermedades</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="Enfermedades" name="Enfermedades" placeholder="Liste enfermedades que padece" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Alergias</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="Alergias" name="Alergias" placeholder="Liste alergias que padece" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">¿Tiene alg&uacute;n tipo de debilidad motriz?</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="DebilidadMotriz" name="DebilidadMotriz" placeholder="Liste debilidades motrices que padece, omitir en caso de no tener" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Direcci&oacute;n</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Direcci&oacute;n con numero ext/int" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">N&uacute;mero interior</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="NumInterior" name="NumInterior" placeholder="Direcci&oacute;n con numero ext/int" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">N&uacute;mero exterior</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="NumExterior" name="NumExterior" placeholder="Direcci&oacute;n con numero ext/int" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">C&oacute;digo postal</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="CP" name="CP" placeholder="C&oacute;digo postal" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Colonia</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="Colonia" name="Colonia" placeholder="Colonia" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Municipio</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="Municipio" name="Municipio" placeholder="Municipio" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Tel&eacute;fono local</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="TelefonoLocal" name="TelefonoLocal" placeholder="Tel&eacute;fono" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Tel&eacute;fono celular</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="TelefonoCelular" name="TelefonoCelular" placeholder="Tel&eacute;fono" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Nivel de escolaridad</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="Escolaridad" name="Escolaridad" placeholder="Nivel de escolaridad" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Otros estudios</label> 
            <div class="col-lg-10">
              <input type="text" class="form-control" id="OtrosEstudios" name="OtrosEstudios" placeholder="Otros estudios" readonly></div></div></br></br>

          <div class="form-group">
            <label for="" class="col-lg-2 control-label">Email</label> 
            <div class="col-lg-10">
              <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" readonly></div></div></br></br><br/><br/>
        <div class="row" style="text-align:center;">
          <input style="width:46%;" align="center" class="btn btn-action" value="ELIMINAR ADMINISTRADOR" type="submit"></input>
        </div> <!-- /row  -->
        </form>
      </div>
      </br></br>
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
