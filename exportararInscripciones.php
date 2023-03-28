<?php 
require_once ("conf/confconexion.php");
require 'excel/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\IOFactory;
$spreadsheet=new Spreadsheet();
$spreadsheet->getProperties()->setCreator("jonathan")->setTitle("5TDS");
$spreadsheet->getDefaultStyle()->getFont()->setName('Arial')
                                          ->setSize(11);          

$spreadsheet->setActiveSheetIndex(0);
$hojactiva= $spreadsheet->getActiveSheet();
$hojactiva->setCellValue('A1', 'NOMBRES ESTUDIANTES')
            ->setCellValue('B1', 'CURSO')
            ->setCellValue('C1', 'JORNADA')
            ->setCellValue('D1', 'TELEFONO')
            ->setCellValue('E1', 'CORREO')
            ->setCellValue('F1', 'FECHA INICIO')
            ->setCellValue('G1', 'HORA INICIO')
            
            ->setCellValue('H1', 'HORA FIN');
    
//$idcarre=$_POST['id_carrera'];
$i = 2;
$sql = "SELECT tb_estudiantes.nombres_apellidos, tb_jornadas.descripcion AS jornadas,tb_cursos.descripcion,tb_estudiantes.telefono,tb_estudiantes.correo,
tb_cursos.fecha_inicio,tb_cursos.hora_inicio,tb_cursos.hora_fin FROM tb_inscripcion,tb_cursos,tb_estudiantes,tb_jornadas
WHERE tb_inscripcion.id_estudiantes = tb_estudiantes.id_estudiantes AND tb_inscripcion.id_cursos = tb_cursos.id_cursos
AND tb_inscripcion.id_jornadas= tb_jornadas.id_jornadas;";
$result = mysqli_query($objConexion, $sql);
while ($usuarioArray=mysqli_fetch_array($result)){
        //CAPTURAMOS VALORES DE LA CONSULTA
       
        $NombrePersona=$usuarioArray['nombres_apellidos'];
        $carreass=$usuarioArray['descripcion'];
        $jornads=$usuarioArray['jornadas'];
        $fecha =$usuarioArray['telefono'];
        
        $hora_entada =$usuarioArray['correo'];
        $hora_salida=$usuarioArray['fecha_inicio'];
         $energencia=$usuarioArray['hora_inicio'];
         
        $estado=$usuarioArray['hora_fin'];
        
      
            
       //ASIGNAMOS LOS DATOS A LA CELDA DE EXCEL             
  $spreadsheet->setActiveSheetIndex(0);
  $hojactiva->setCellValue("A$i", $NombrePersona)
            ->setCellValue("B$i", $carreass)
            ->setCellValue("C$i", $jornads)
            ->setCellValue("D$i", $fecha)
            ->setCellValue("E$i", $hora_entada)
            ->setCellValue("F$i", $hora_salida)
            ->setCellValue("G$i", $energencia)
            ->setCellValue("H$i", $estado);    
            
$i++;
}
//FIN DEL WHILE
//DAMOS ATRIBUTOS A LAS CELDAS
$hojactiva->getColumnDimension('A')->setAutoSize(true);
$hojactiva->getColumnDimension('B')->setAutoSize(true);
$hojactiva->getColumnDimension('C')->setAutoSize(true);
$hojactiva->getColumnDimension('D')->setAutoSize(true);
$hojactiva->getColumnDimension('E')->setAutoSize(true);
$hojactiva->getColumnDimension('F')->setAutoSize(true);
$hojactiva->getColumnDimension('G')->setAutoSize(true);
$hojactiva->getColumnDimension('H')->setAutoSize(true);



$hojactiva->setTitle('REPORTE DE INSCRIPCIONES');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Inscripciones.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

