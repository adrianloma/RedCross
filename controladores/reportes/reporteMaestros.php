<?php
  // connection with the database
  include "../../includes/conexion.php";

  // require the PHPExcel file
  require '../../includes/PHPExcel.php';

  // simple query

  $query = "SELECT 
                m.id_maestro,     m.m_nombre,       m.m_apellidopaterno,  m.m_apellidomaterno,  m.m_fechanac,
                m.m_edad,         m.m_lugarnac,     m.m_nacionalidad,     m.m_sexo,             m.m_estadocivil,
                m.m_gposanguineo, m.m_rh,           m.m_curp,             m.m_servmedico,       m.m_trabajo,
                m.m_enfermedades, m.m_alergias,     m.m_debilidadmotriz,  m.m_domicilio,        m.m_numext,
                m.m_numint,       m.m_cp,           m.m_colonia,          m.m_municipio,        m.m_numlocal,
                m.m_numcelular,   m.m_escolaridad,  m.m_otrosestudios,    m.m_email,            m.m_fecharegistro,
                m.m_estudios,     m.m_estatus
            FROM
                maestro m
            order by
                m.m_nombre";
  $headings = array(  'id_maestro',     'm_nombre',       'm_apellidopaterno',  'm_apellidomaterno',  'm_fechanac',
                      'm_edad',         'm_lugarnac',     'm_nacionalidad',     'm_sexo',             'm_estadocivil',
                      'm_gposanguineo', 'm_rh',           'm_curp',             'm_servmedico',       'm_trabajo',
                      'm_enfermedades', 'm_alergias',     'm_debilidadmotriz',  'm_domicilio',        'm_numext',
                      'm_numint',       'm_cp',           'm_colonia',          'm_municipio',        'm_numlocal',
                      'm_numcelular',   'm_escolaridad',  'm_otrosestudios',    'm_email',            'm_fecharegistro',
                      'm_estudios',     'm_estatus');

  if ($result = mysqli_query($conexion, $query) or die(mysql_error())) {
    // Create a new PHPExcel object
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getActiveSheet()->setTitle('Lista de Maestros');

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
    header('Content-Disposition: attachment;filename="reporteMaestros.xls"');
    header('Cache-Control: max-age=0');

    $objWriter->save('php://output');
    exit();
  }
  echo 'A problem has occurred... no data retrieved from the database';
?>
