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
    ->setCellValue('B1', 'Customer Name')
    ->setCellValue('C1', 'Quotation No.')
    ->setCellValue('D1', 'Imei')
    ->setCellValue('E1', 'Symptom')
    ->setCellValue('F1', 'Description')
    ->setCellValue('G1', 'Qty')
    ->setCellValue('H1', 'ราคา')
    ->setCellValue('I1', 'Total')
    ->setCellValue('J1', 'VAT 7%')
    ->setCellValue('K1', 'Grand Total');

    $cell = '2';
    $sub_cell = '2';
foreach ($detail as $key => $value) {

    $row = $this->db->where('Quot_No', $value['Quot_No'])->get('qt_quotation_list')->num_rows();
    
        $row_numb = $cell + $row - 1;
    
    // $row = $row - 1;
    $sheet->setCellValue('A'.$cell, ++$key);
    $sheet->setCellValue('B'.$cell, $value['Quot_Customer']);
    $sheet->setCellValue('C'.$cell, $value['Quot_No']);
    $qt_list = $this->db->where('Quot_No', $value['Quot_No'])->get('qt_quotation_list')->result_array();
    foreach ($qt_list as $key => $val) {
            $sheet->setCellValue('D'.$sub_cell, $val['Qlist_Imei'].' '.$val['Qlist_Serial']);
            $sheet->setCellValue('E'.$sub_cell, $val['Qlist_Symptom']);
            $sheet->setCellValue('F'.$sub_cell, $val['Qlist_Description']);
            $sheet->setCellValue('G'.$sub_cell, $val['Qlist_Qty']);
            $sheet->setCellValue('H'.$sub_cell, $val['Qlist_Amount']);
            $sub_cell++;
    }
    $sheet->setCellValue('I'.$cell, $value['Quot_Total']);
    $sheet->setCellValue('J'.$cell, $value['Quot_Vat']);
    $sheet->setCellValue('K'.$cell, $value['Quot_Grandtotal']);

    // Merge Cell
    if ($cell < $row_numb)
    {
        $spreadsheet->getActiveSheet()->mergeCells('A'.$cell.':A'.$row_numb);
        $spreadsheet->getActiveSheet()->mergeCells('B'.$cell.':B'.$row_numb);
        $spreadsheet->getActiveSheet()->mergeCells('C'.$cell.':C'.$row_numb);
        $spreadsheet->getActiveSheet()->mergeCells('I'.$cell.':I'.$row_numb);
        $spreadsheet->getActiveSheet()->mergeCells('J'.$cell.':J'.$row_numb);
        $spreadsheet->getActiveSheet()->mergeCells('K'.$cell.':K'.$row_numb);
    }
    $cell = $row_numb;
    //เปลี่ยนบรรทัดปัจจุบัน
    $cell++;
   
}

// style 


$spreadsheet->getActiveSheet()->getStyle('H2:H'.$cell)
    ->getNumberFormat()
    ->setFormatCode(NumberFormat::FORMAT_NUMBER_00);

$spreadsheet->getActiveSheet()->getStyle('I2:I'.$cell)
    ->getNumberFormat()
    ->setFormatCode(NumberFormat::FORMAT_NUMBER_00);

$spreadsheet->getActiveSheet()->getStyle('J2:J'.$cell)
    ->getNumberFormat()
    ->setFormatCode(NumberFormat::FORMAT_NUMBER_00);

$spreadsheet->getActiveSheet()->getStyle('K2:K'.$cell)
    ->getNumberFormat()
    ->setFormatCode(NumberFormat::FORMAT_NUMBER_00);



$writer = new Xlsx($spreadsheet);
$writer->save('_assets/excel-export/report_quotation/QTT'.date('Ymd-hi').'.xlsx');
$url = '_assets/excel-export/report_quotation/QTT'.date('Ymd-hi').'.xlsx';
?>
    <?= isset($date_range) ? '<h2 class="text-center font-bold">'.$date_range.'</h2>' : '';?>
    <?= '<a class="btn btn-inverse" href="'.base_url($url).'">Download Excel</a><br>';?>

