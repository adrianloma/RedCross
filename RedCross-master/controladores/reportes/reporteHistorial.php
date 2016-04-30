<?php
  // connection with the database
  include "../../includes/conexion.php";

  // require the PHPExcel file
  require '../../includes/PHPExcel.php';

  // simple query

  $query = "SELECT 
                a.id_alumno,
                a.a_nombre,
                a.a_apellidpaterno,
                a.a_apellidomaterno,
                a.a_email,
                a.a_estatus,
                ca.c_nombre,
                p.per_desc,
                n.ne_desc,
                g.gru_nombre,
                m.id_maestro,
                m.m_nombre,
                m.m_apellidopaterno,
                m.m_apellidomaterno,
                c.id_curso,
                c.cu_nombre,
                i.inscr_calificacion1,
                i.inscr_calificacion2,
                i.inscr_calificacion3,
                ifNULL(i.inscr_calificacion,0) as CalificacionFinal,
                ifNULL(i.inscr_asistencia,0) as Asistencia,
                i.inscr_fecharegistro,
                if(i.inscr_cursado = 1,'Si','No') as Cursado
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
            order by per_desc,c_nombre, id_alumno";


  $headings = array(  'Matricula Alumno',
                      'a_nombre',
                      'a_apellidpaterno',
                      'a_apellidomaterno',
                      'a_email',
                      'a_estatus',
                      'Carrera',
                      'Periodo',
                      'Nivel Escolar',
                      'gru_nombre',
                      'Matricula Maestro',
                      'm_nombre',
                      'm_apellidopaterno',
                      'm_apellidomaterno',
                      'id_curso',
                      'cu_nombre',
                      'inscr_calificacion1',
                      'inscr_calificacion2',
                      'inscr_calificacion3',
                      'inscr_calificacion',
                      'inscr_asistencia',
                      'inscr_fecharegistro',
                      'Cursado');

  if ($result = mysqli_query($conexion, $query) or die(mysql_error())) {
    // Create a new PHPExcel object
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getActiveSheet()->setTitle('Historial Todos Alumnos');

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
    header('Content-Disposition: attachment;filename="reporteHistorial.xls"');
    header('Cache-Control: max-age=0');

    $objWriter->save('php://output');
    exit();
  }
  echo 'A problem has occurred... no data retrieved from the database';
?>
