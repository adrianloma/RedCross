<?php
  // connection with the database
  include "../../includes/conexion.php";

  // require the PHPExcel file
  require '../../includes/PHPExcel.php';

  // simple query

  $query = "  SELECT 
                  a.id_alumno,        a.a_nombre,             a.a_apellidpaterno, a.a_apellidomaterno,  a.a_fechanac,
                  a.a_lugarnac,       a.a_nacionalidad,       a.a_sexo,           a.a_estadocivil,      a.a_gposanguineo,
                  a.a_rh,             a.a_curp,               a.a_servmedico,     a.a_trabajo,          a.a_enfermedades,
                  a.a_alergias,       a.a_debilidadmotriz,    a.a_domicilio,      a.a_cp,               a.a_colonia,
                  a.a_municipio,      a.a_numlocal,           a.a_nompapa,        a.a_ocupacionpapa,    a.a_empresapapa,
                  a.a_sueldopapa,     a.a_nommama,            a.a_ocupacionmama,  a.a_empresamama,      a.a_sueldomama,
                  a.a_otrosestudios,  a.a_suspencionestudios, a.a_matreprobadas,  a.a_aval,             a.a_promocionesc,
                  a.a_objcruzroja,    a.a_objenfermeria,      a.a_otracarrera,    a.a_ceneval,          a.a_regescuela,
                  a.a_psicometrico,   a.a_entrevista,         a.a_email,          a.a_fecharegistro,    a.a_estatus,
                  a.a_celPadre,       a.a_celMadre
              FROM
                  alumno a
              ORDER BY a.id_alumno";


  $headings = array(  'id_alumno',        'a_nombre',             'a_apellidpaterno', 'a_apellidomaterno',  'a_fechanac',
                      'a_lugarnac',       'a_nacionalidad',       'a_sexo',           'a_estadocivil',      'a_gposanguineo',
                      'a_rh',             'a_curp',               'a_servmedico',     'a_trabajo',          'a_enfermedades',
                      'a_alergias',       'a_debilidadmotriz',    'a_domicilio',      'a_cp',               'a_colonia',
                      'a_municipio',      'a_numlocal',           'a_nompapa',        'a_ocupacionpapa',    'a_empresapapa',
                      'a_sueldopapa',     'a_nommama',            'a_ocupacionmama',  'a_empresamama',      'a_sueldomama',
                      'a_otrosestudios',  'a_suspencionestudios', 'a_matreprobadas',  'a_aval',             'a_promocionesc',
                      'a_objcruzroja',    'a_objenfermeria',      'a_otracarrera',    'a_ceneval',          'a_regescuela',
                      'a_psicometrico',   'a_entrevista',         'a_email',          'a_fecharegistro',    'a_estatus',
                      'a_celPadre',       'a_celMadre');

  if ($result = mysqli_query($conexion, $query) or die(mysql_error())) {
    // Create a new PHPExcel object
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getActiveSheet()->setTitle('Lista de Alumnos');

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
    header('Content-Disposition: attachment;filename="reporteAlumnos.xls"');
    header('Cache-Control: max-age=0');

    $objWriter->save('php://output');
    exit();
  }
  echo 'A problem has occurred... no data retrieved from the database';
?>
