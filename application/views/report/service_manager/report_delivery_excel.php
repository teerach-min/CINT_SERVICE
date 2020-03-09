<?php 
require_once(FCPATH.'vendor/autoload.php');
date_default_timezone_set("Asia/Bangkok");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

//Header
$spreadsheet->getActiveSheet()->setCellValue('A1', 'Item')
    ->setCellValue('B1', 'Date')
    ->setCellValue('C1', 'Company Name')
    ->setCellValue('D1', 'Bill')
    ->setCellValue('E1', 'Model')
    ->setCellValue('F1', 'IMEI')
    ->setCellValue('G1', 'Repair')
    ->setCellValue('H1', 'Other');

    $cell = '2';
foreach ($detail as $key => $value) {

    $regis_date = date('d-M-Y', strtotime($value['Deli_Date']));

    $sheet->setCellValue('A'.$cell, ++$key);
    $sheet->setCellValue('B'.$cell, $regis_date);
    $sheet->setCellValue('C'.$cell, $value['Deli_Company']);
    $sheet->setCellValue('D'.$cell, $value['Dsub_Bill']);
    $sheet->setCellValue('E'.$cell, $value['Dsub_Model']);
    $sheet->setCellValue('F'.$cell, " ".$value['Dsub_Imei'].'');
    $sheet->setCellValue('G'.$cell, $value['Dsub_Description']);
    $sheet->setCellValue('H'.$cell, $value['Dsub_Remark']);

    //เปลี่ยนบรรทัดปัจจุบัน
    $cell++;
   
}

// style 
// $spreadsheet->getActiveSheet()->getStyle('M2:M'.$cell)
//     ->getNumberFormat()
//     ->setFormatCode(NumberFormat::FORMAT_NUMBER_00);

// $spreadsheet->getActiveSheet()->getStyle('I2:I'.$cell)
//     ->getNumberFormat()
//     ->setFormatCode(NumberFormat::FORMAT_NUMBER_00);

// $spreadsheet->getActiveSheet()->getStyle('J2:J'.$cell)
//     ->getNumberFormat()
//     ->setFormatCode(NumberFormat::FORMAT_NUMBER_00);

// $spreadsheet->getActiveSheet()->getStyle('K2:K'.$cell)
//     ->getNumberFormat()
//     ->setFormatCode(NumberFormat::FORMAT_NUMBER_00);


$writer = new Xlsx($spreadsheet);
$writer->save('_assets/excel-export/report_delivery/Delivery'.date('Ymd-hi').'.xlsx');
$url = '_assets/excel-export/report_delivery/Delivery'.date('Ymd-hi').'.xlsx';
?>
    <?= isset($date_range) ? '<h2 class="text-center font-bold">'.$date_range.'</h2>' : '';?>
    <?= '<a class="btn btn-inverse" href="'.base_url($url).'">Download Excel</a><br>';?>

