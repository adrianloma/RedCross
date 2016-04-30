<?php

	include "../../includes/sessionAdmin.php";
	include "../../includes/conexion.php";
	include "../../includes/mysql_util.php";

	//Variables
	$matricula = $_POST["matricula"];
	$nombres = $_POST["nombres"];
	$APaterno = $_POST["APaterno"];
	$AMaterno = $_POST["AMaterno"];
	$FechaNacimiento = $_POST["FechaNacimiento"];
	$LugarNacimiento = $_POST["LugarNacimiento"];
	$Nacionalidad = $_POST["Nacionalidad"];
	$Sexo = $_POST["Sexo"];
	$EstadoCivil = $_POST["EstadoCivil"];
	$GrupoSanguineo = $_POST["GrupoSanguineo"];
	$RH = $_POST["RH"];
	$CURP = $_POST["CURP"];
	$ServicioMedico = $_POST["ServicioMedico"];
	$ActualmenteLaborando = $_POST["ActualmenteLaborando"];
	$Enfermedades = $_POST["Enfermedades"];
	$Alergias = $_POST["Alergias"];
	$DebilidadMotriz = $_POST["DebilidadMotriz"];
	$Direccion = $_POST["Direccion"];
	$CP = $_POST["CP"];
	$Colonia = $_POST["Colonia"];
	$Municipio = $_POST["Municipio"];
	$TelefonoLocal = $_POST["TelefonoLocal"];
	$TelefonoCelular = $_POST["TelefonoCelular"];
	$Escolaridad = $_POST["Escolaridad"];
	$OtrosEstudios = $_POST["OtrosEstudios"];
	$Email = $_POST["Email"];
	$NumInterior = $_POST["NumInterior"];
	$NumExterior = $_POST["NumExterior"];

$updates = array(
		'd_nombre' => $nombres,
		'd_apellidopaterno' => $APaterno,
		'd_apellidomaterno' => $AMaterno,
		'd_fechanac' => $FechaNacimiento,
		'd_lugarnac' => $LugarNacimiento,
		'd_nacionalidad' => $Nacionalidad,
		'd_sexo' => $Sexo,
		'd_estadocivil' => $EstadoCivil,
		'd_gposanguineo' => $GrupoSanguineo,
		'd_rh' => $RH,
		'd_curp' => $CURP,
		'd_servmedico' => $ServicioMedico,
		'd_trabajo' => $ActualmenteLaborando,
		'd_enfermedades' => $Enfermedades,
		'd_alergias' => $Alergias,
		'd_debilidadmotriz' => $DebilidadMotriz,
		'd_domicilio' => $Direccion,
		'd_cp' => $CP,
		'd_colonia' => $Colonia,
		'd_municipio' => $Municipio,
		'd_numlocal' => $TelefonoLocal,
		'd_numcelular' => $TelefonoCelular,
		'd_email' => $Email,
		'd_otrosestudios' => $OtrosEstudios,
		'd_fecharegistro' => date("Y-m-d"),
    'd_numint' => $NumInterior,
    'd_numext' => $NumExterior,
    'd_edad' => 0,
    'd_escolaridad' => $Escolaridad
  );

  $conn = array($conexion);
        
  for($i = 0 ; $i < 29 ; $i++)
    array_push($conn, $conexion);

  $values = array_map('mysqli_escape_string', $conn ,array_values($updates));
  $keys = array_keys($updates);
    
  $sql = "UPDATE administrador SET ";

  for ($i = 0; $i < count($keys); $i++) {
    $sql = $sql . " " . $keys[$i] . "='" . $values[$i] ."'";
      if($i < count($keys)-1){
          $sql = $sql . ", ";
        }
  }

$sql = $sql . " where id_administrador = $matricula";
$result = mysqli_query($conexion, $sql);
        
if (mysqli_affected_rows($conexion) > 0){
	$alertMsg = "Administrador actualizado satisfactoriamente";
}
elseif (!$result) {
	$alertMsg = "Algo salio mal: " . mysql_error();
}
else{
	$alertMsg = "No encontramos ningun Administrador con la matricula d$matricula o no hubo cambios en la informacion";
}
	echo "<script language=\"javascript\">
				alert(\"$alertMsg\");
				window.location.href = \"../../vistas/menus/menuAdmin.php\"
			</script>";
?>
