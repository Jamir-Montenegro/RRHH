<?php

require 'vendor/autoload.php';
require_once 'app/Config/Database.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$db = new Database();
$conexion = $db->conectar();

$sql = "SELECT
            p.codigo_empleado,
            CONCAT(c.nombre,' ',c.apellido) AS colaborador,
            o.nombre AS ocupacion,
            pl.nombre AS planilla,
            p.salario,
            p.fecha_inicio,
            CASE
                WHEN p.empleado_activo = 1 THEN 'Activo'
                ELSE 'Inactivo'
            END AS estado
        FROM perfil_laboral p
        INNER JOIN colaboradores c
            ON p.colaborador_id = c.id
        INNER JOIN cat_ocupaciones o
            ON p.ocupacion_id = o.id
        INNER JOIN cat_planillas pl
            ON p.planilla_id = pl.id
        ORDER BY c.nombre";

$stmt = $conexion->query($sql);
$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setTitle('Reporte Empleados');

$sheet->setCellValue('A1', 'Código');
$sheet->setCellValue('B1', 'Empleado');
$sheet->setCellValue('C1', 'Ocupación');
$sheet->setCellValue('D1', 'Planilla');
$sheet->setCellValue('E1', 'Salario');
$sheet->setCellValue('F1', 'Fecha Inicio');
$sheet->setCellValue('G1', 'Estado');

$fila = 2;

foreach ($datos as $d) {

    $sheet->setCellValue('A'.$fila, $d['codigo_empleado']);
    $sheet->setCellValue('B'.$fila, $d['colaborador']);
    $sheet->setCellValue('C'.$fila, $d['ocupacion']);
    $sheet->setCellValue('D'.$fila, $d['planilla']);
    $sheet->setCellValue('E'.$fila, $d['salario']);
    $sheet->setCellValue('F'.$fila, $d['fecha_inicio']);
    $sheet->setCellValue('G'.$fila, $d['estado']);

    $fila++;
}

foreach (range('A','G') as $columna) {
    $sheet->getColumnDimension($columna)->setAutoSize(true);
}

$nombre = "Reporte_Empleados_" . date('Ymd_His') . ".xlsx";

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$nombre.'"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

exit;