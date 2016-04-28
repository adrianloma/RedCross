<?php
  // connection with the database
  include "../../includes/conexion.php";

  // require the PHPExcel file
  require '../../includes/PHPExcel.php';

  // simple query

  $query = "SELECT 
                  c.id_carrera,
                  c.c_nombre,
                  c.c_desc,
                  n.ne_desc,
                  g.gru_nombre,
                  a.id_alumno,
                  a.a_nombre,
                  a.a_apellidpaterno,
                  a.a_apellidomaterno,
                  a.a_email
              FROM
                  carrera c inner join nivel_escolar n
                  on c.id_carrera = n.id_carrera
                      inner join grupo g
                      on g.id_nivelEscolar = n.id_nivelEscolar
                      inner join alumno a
                      on a.id_grupo = g.id_grupo
                      inner join periodo p
                      on p.id_periodo = g.id_periodo
              where 
                c.c_estatus=1
                  and p.id_periodo = (select id_periodo from periodo order by id_periodo desc limit 1)
              order by
                c.c_nombre";
  $headings = array('id Carrera', 'Siglas','Nombre Carrera', 'Nivel Escolar', 'Grupo', 'Matricula', 'Nombre', 'Apellido Paterno', 'Apellido Materno', 'Email');

  if ($result = mysqli_query($conexion, $query) or die(mysql_error())) {
    // Create a new PHPExcel object
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getActiveSheet()->setTitle('Lista de Carreras y grupos');

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
    header('Content-Disposition: attachment;filename="reporteCarreraGrupos.xls"');
    header('Cache-Control: max-age=0');

    $objWriter->save('php://output');
    exit();
  }
  echo 'A problem has occurred... no data retrieved from the database';
?>
