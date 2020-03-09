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
    ->setCellValue('D1', 'Brand')
    ->setCellValue('E1', 'Imei')
    ->setCellValue('F1', 'Out of Order')
    ->setCellValue('G1', 'Job')
    ->setCellValue('H1', 'Model')
    ->setCellValue('I1', 'Technician')
    ->setCellValue('J1', 'Contact')
    ->setCellValue('K1', 'Phone')
    ->setCellValue('L1', 'Quotation')
    ->setCellValue('M1', 'Amount')
    ->setCellValue('N1', 'Status');

    $cell = '2';
foreach ($detail as $key => $value) {
    $check = $this->db->where('Regis_SubID', $value['Regis_SubID'])->get('qt_form_group')->row_array();
    $ref_no = $this->db->where('Qfg_Group_ID', $check['Qfg_Group_ID'])->get('qt_quotation')->row_array();
    
    if ($ref_no['Quot_No'] == '')
    {
        $check2 = $this->db->where('Qfg_Group_ID', $value['Regis_SubID'])->get('qt_quotation')->row_array();
    }
    $regis_date = date('d-M-Y', strtotime($value['Regis_Date']));
    $ref_no['Quot_Grandtotal'] = number_format($ref_no['Quot_Grandtotal'],2,'.',',');


    $sheet->setCellValue('A'.$cell, ++$key);
    $sheet->setCellValue('B'.$cell, $regis_date);
    $sheet->setCellValue('C'.$cell, $value['Regis_Name']);
    $sheet->setCellValue('D'.$cell, isset($value['Pro_ID']) ? group_product($value['Pro_ID']) : '');
    $sheet->setCellValue('E'.$cell, " ".$value['Regis_Imei']."");
    $sheet->setCellValue('F'.$cell, $value['Regis_Order']);
    $sheet->setCellValue('G'.$cell, $value['Regis_SubID']);
    $sheet->setCellValue('H'.$cell, $value['Regis_Model']);
    $sheet->setCellValue('I'.$cell, $value['User_FName']);
    $sheet->setCellValue('J'.$cell, $value['Regis_Contact']);
    $sheet->setCellValue('K'.$cell, $value['Regis_Phone']);
    $sheet->setCellValue('L'.$cell, isset($ref_no['Quot_No']) ? $ref_no['Quot_No'] : $check2['Quot_No']);
    $sheet->setCellValue('M'.$cell, isset($ref_no['Quot_Grandtotal']) ? $ref_no['Quot_Grandtotal']: $check2['Quot_Grandtotal']);
    $sheet->setCellValue('N'.$cell, $value['Status_Name']);

    //เปลี่ยนบรรทัดปัจจุบัน
    $cell++;
}

// style 
// $spreadsheet->getActiveSheet()->getStyle('E2:E'.$cell)
//     ->getNumberFormat()
//     ->setFormatCode(NumberFormat::FORMAT_TEXT);

$spreadsheet->getActiveSheet()->getStyle('M2:M'.$cell)
    ->getNumberFormat()
    ->setFormatCode(NumberFormat::FORMAT_NUMBER_00);

// $spreadsheet->getActiveSheet()->getStyle('E2:E'.$cell)
//     ->getNumberFormat()
//     ->setFormatCode(NumberFormat::FORMAT_TEXT);

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
$writer->save('_assets/excel-export/report_job/JOB'.date('Ymd-hi').'.xlsx');
$url = '_assets/excel-export/report_job/JOB'.date('Ymd-hi').'.xlsx';
?>
    <?= isset($date_range) ? '<h2 class="text-center font-bold">'.$date_range.'</h2>' : '';?>
    <?= '<a class="btn btn-inverse" href="'.base_url($url).'">Download Excel</a><br>';?>


