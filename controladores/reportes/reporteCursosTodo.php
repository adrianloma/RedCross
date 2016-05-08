<?php
  // connection with the database
  include "../../includes/conexion.php";

  // require the PHPExcel file
  require '../../includes/PHPExcel.php';

  // simple query

  $query = "SELECT 
              m.id_maestro,
              m.m_nombre,
              m.m_apellidopaterno,
              m.m_apellidomaterno,
              m.m_email,
              ca.c_nombre,
              n.ne_desc,
              p.per_desc,
              g.gru_nombre,
              c.cu_nombre,
              c.cu_objetivo,
              c.cu_numunidades,
              c.cu_fecharegistro,
              c.cu_aula,
              c.cu_dias,
              c.cu_horaInicio,
              c.cu_horaFinal,
              c.cu_isPrioridadAlta
          FROM
              maestro m
                  INNER JOIN
              curso c ON m.id_maestro = c.id_maestro
                  INNER JOIN
              grupo g ON g.id_grupo = c.id_grupo
                  INNER JOIN
              nivel_Escolar n ON n.id_nivelEscolar = g.id_nivelEscolar
              	  INNER JOIN
              periodo p ON p.id_periodo = g.id_periodo
                  INNER JOIN
              carrera ca ON ca.id_carrera = n.id_carrera
          order by
            p.per_desc, ca.c_nombre, n.ne_desc, m.id_maestro";

  $headings = array(  'id_maestro',
                      'm_nombre',
                      'm_apellidopaterno',
                      'm_apellidomaterno',
                      'm_email',
                      'c_nombre',
                      'ne_desc',
                      'per_desc',
                      'gru_nombre',
                      'cu_nombre',
                      'cu_objetivo',
                      'cu_numunidades',
                      'cu_fecharegistro',
                      'cu_aula',
                      'cu_dias',
                      'cu_horaInicio',
                      'cu_horaFinal',
                      'cu_isPrioridadAlta');

  if ($result = mysqli_query($conexion, $query) or die(mysql_error())) {
    // Create a new PHPExcel object
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getActiveSheet()->setTitle('Lista Cursos Completo');

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
    header('Content-Disposition: attachment;filename="reporteCursosTodo.xls"');
    header('Cache-Control: max-age=0');

    $objWriter->save('php://output');
    exit();
  }
  echo 'A problem has occurred... no data retrieved from the database';
?>
