<?php

require 'phpspreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$objPHPExcel = new Spreadsheet();
$i = 1;
$letter = 'A';
foreach ($rs as $row) {
    foreach ($row as $key=>$value) {
        $objPHPExcel->getActiveSheet()->setCellValue("$letter$i", $key);
        $letter++;
    }
    break;
}

$hold_letter = $letter;
foreach ($rs as $row) {
    $letter = 'A';
    $i++;
    foreach ($row as $key=>$value) {
    	$objPHPExcel->getActiveSheet()
        ->setCellValue("$letter$i", $value);
        $letter++;
    }
}

$sheet = $objPHPExcel->getActiveSheet();
$cellIterator = $sheet->getRowIterator()->current()->getCellIterator();
$cellIterator->setIterateOnlyExistingCells(true);
foreach ($cellIterator as $cell) {
    $sheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
}

// needed for file export
ob_end_clean();
$today = date('Y_m_d');

$filename = $today . "_applications.xlsx";
header('Content-Type: application/vnd.openxmlformats-openxmlformats.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=$filename");
header('Cache-Control: max-age=0');

$objWriter = IOFactory::createWriter($objPHPExcel, 'Xlsx');
$objWriter->save('php://output');
exit();