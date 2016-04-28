<?php
  // connection with the database
  include "../../includes/conexion.php";

  // require the PHPExcel file
  require '../../includes/PHPExcel.php';

  // simple query

  $query = "SELECT 
                a.id_administrador, a.d_contra,       a.d_nombre,       a.d_apellidopaterno,  a.d_apellidomaterno,
                a.d_fechanac,       a.d_edad,         a.d_lugarnac,     a.d_nacionalidad,     a.d_sexo,
                a.d_estadocivil,    a.d_gposanguineo, a.d_rh,           a.d_curp,             a.d_servmedico,
                a.d_trabajo,        a.d_enfermedades, a.d_alergias,     a.d_debilidadmotriz,  a.d_domicilio,
                a.d_numext,         a.d_numint,       a.d_cp,           a.d_colonia,          a.d_municipio,
                a.d_numlocal,       a.d_numcelular,   a.d_escolaridad,  a.d_otrosestudios,    a.d_email,
                a.d_fecharegistro,  p.p_abcAdmin,     p.p_abcAlumno,    p.p_abcPeriodo,       p.p_abcGruposCursos,
                p.p_verReportes
            FROM
                administrador a
                    LEFT JOIN
                permisos p ON a.id_administrador = p.id_administrador
            GROUP BY a.id_administrador";
  

  $headings = array(  'id_administrador', 'd_contra',       'd_nombre',       'd_apellidopaterno',  'd_apellidomaterno',
                      'd_fechanac',       'd_edad',         'd_lugarnac',     'd_nacionalidad',     'd_sexo',
                      'd_estadocivil',    'd_gposanguineo', 'd_rh',           'd_curp',             'd_servmedico',
                      'd_trabajo',        'd_enfermedades', 'd_alergias',     'd_debilidadmotriz',  'd_domicilio',
                      'd_numext',         'd_numint',       'd_cp',           'd_colonia',          'd_municipio',
                      'd_numlocal',       'd_numcelular',   'd_escolaridad',  'd_otrosestudios',    'd_email',
                      'd_fecharegistro',  'p_abcAdmin',     'p_abcAlumno',    'p_abcPeriodo',       'p_abcGruposCursos',
                      'p_verReportes');

  if ($result = mysqli_query($conexion, $query) or die(mysql_error())) {
    // Create a new PHPExcel object
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getActiveSheet()->setTitle('Lista de Administradores');

    $rowNumber = 1;
    $col = 'A';
    foreach($headings as $heading) {
      $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$heading);
      $col++;
    }

    // Loop through the result set
    $rowNumber = 2;
    while ($row = mysqli_fetch_assoc($result)) {
      $col = 'A';
      foreach($row as $cell) {
        $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$cell);
        $col++;
      }
      $rowNumber++;
    }

    // Freeze pane so that the heading line won't scroll
    $objPHPExcel->getActiveSheet()->freezePane('A2');

    // Save as an Excel BIFF (xls) file
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="reporteAdministradores.xls"');
    header('Cache-Control: max-age=0');

    $objWriter->save('php://output');
    exit();
  }
  echo 'A problem has occurred... no data retrieved from the database';
?>
