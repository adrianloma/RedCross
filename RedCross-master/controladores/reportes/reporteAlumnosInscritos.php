<?php
  // connection with the database
  include "../../includes/conexion.php";

  // require the PHPExcel file
  require '../../includes/PHPExcel.php';

  // simple query

  $query = "	SELECT 
				    a.id_alumno,
				    a.a_nombre,
				    a.a_apellidpaterno,
				    a.a_apellidomaterno,
				    a.a_email,
				    ca.c_nombre,
				    n.ne_desc,
				    g.gru_nombre,
				    m.id_maestro,
				    m.m_nombre,
				    m.m_apellidopaterno,
				    m.m_apellidomaterno,
				    m.m_email,
				    c.cu_nombre,
				    c.cu_objetivo,
				    c.cu_numunidades,
				    c.cu_aula,
				    c.cu_dias,
				    c.cu_horaInicio,
				    c.cu_horaFinal,
				    c.cu_isPrioridadAlta,
				    i.inscr_fecharegistro
				FROM
				    maestro m
				        INNER JOIN
				    curso c ON m.id_maestro = c.id_maestro
				        INNER JOIN
				    grupo g ON g.id_grupo = c.id_grupo
				        INNER JOIN
				    periodo p ON p.id_periodo = g.id_periodo
				        INNER JOIN
				    nivel_Escolar n ON n.id_nivelEscolar = g.id_nivelEscolar
				        INNER JOIN
				    carrera ca ON ca.id_carrera = n.id_carrera
						inner join
					inscritos i on i.id_curso = c.id_curso
						inner join
					alumno a on a.id_alumno = i.id_alumno
				WHERE
				    p.per_estatus = 1
				    and a.a_estatus = 'Activo'";


  $headings = array('Matricula Alumno',
				    'a_nombre',
				    'a_apellidpaterno',
				    'a_apellidomaterno',
				    'a_email',
				    'Carrera',
				    'Nivel Escolar',
				    'gru_nombre',
				    'Matricula Maestro',
				    'm_nombre',
				    'm_apellidopaterno',
				    'm_apellidomaterno',
				    'm_email',
				    'cu_nombre',
				    'cu_objetivo',
				    'cu_numunidades',
				    'cu_aula',
				    'cu_dias',
				    'cu_horaInicio',
				    'cu_horaFinal',
				    'cu_isPrioridadAlta',
				    'inscr_fecharegistro');

  if ($result = mysqli_query($conexion, $query) or die(mysql_error())) {
    // Create a new PHPExcel object
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getActiveSheet()->setTitle('Lista de Alumnos Inscritos');

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
    header('Content-Disposition: attachment;filename="reporteAlumnosInscritos.xls"');
    header('Cache-Control: max-age=0');

    $objWriter->save('php://output');
    exit();
  }
  echo 'A problem has occurred... no data retrieved from the database';
?>
