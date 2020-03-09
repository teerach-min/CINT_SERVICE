<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report_model extends MY_Model {

  public function __construct()
  {
    parent::__construct();
  }

    public function report_invoice ($req) {

            // dump_debug($req);
            // die();
            // $dateFormated = date("m-y", strtotime($period));
            $nameTitle = 'Export Invioce';
            $letters=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
            $header = array('No. Invoice', 'Customer', 'Project Name', 'Code', 'Product Name', 'Product Serial', 'Warranty', 'Start Date', 'Expire Date','Status', 'Remark');
            $dataTable = array('Wart_IVD', 'Wart_Customer', 'Wart_Project_Name', 'Wart_Code', 'Wart_Name', 'Wart_Serial', 'Wart_Warranty', 'Wart_Startdate', 'Wart_Expdate', 'Status', 'Wart_Remark');
            $headerCount = count($header);
            
            $spreadsheet = new Spreadsheet();
            $spreadsheet->getActiveSheet()->setTitle($nameTitle);
            $spreadsheet->setActiveSheetIndex(0);
            $num = 1;

            $style_thead = [
                'font' => [
                    'bold' => true,
                    'color' => [
                        'argb' => 'FFFFFFFF',
                    ],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                    'color' => [
                        'argb' => 'FFA0A0A0',
                    ],
                ],
            ];

            $style_border = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ];

            $styleArray = [
                'font' => [
                    'bold' => true,
                    'color' => [
                            'argb' => '466fdf',
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                ],
        
            ];

            for ($i=0; $i < $headerCount; $i++) 
            { 
                $spreadsheet->getActiveSheet()->setCellValue($letters[$i].'1', $header[$i]);
                $spreadsheet->getActiveSheet()->getColumnDimension($letters[$i])->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getStyle($letters[$i].'1')->applyFromArray($style_thead);
                $lastColumn = $letters[$i];
            }
            
            $numRow = 2;
            foreach ($req as $key => $value) {
                $dataTableCount = count($dataTable);
                for ($i=0; $i < $dataTableCount; $i++) 
                { 
                    if ($dataTable[$i] == 'Wart_Startdate' || $dataTable[$i] == 'Wart_Expdate')
                    {
                        if ($value[$dataTable[$i]] === null)
                        {
                            $spreadsheet->getActiveSheet()->setCellValue($letters[$i].$numRow, '');
                        }else{

                            $spreadsheet->getActiveSheet()->setCellValue($letters[$i].$numRow, date('d-M-Y', strtotime($value[$dataTable[$i]])));
                        }
                    }else{
                        
                        if ($dataTable[$i] == 'Status')
                        {
                            if ($value[$dataTable[7]] < $value[$dataTable[8]])
                            {
                                $spreadsheet->getActiveSheet()->setCellValue($letters[$i].$numRow, 'IN');
                            }else{
                                $spreadsheet->getActiveSheet()->setCellValue($letters[$i].$numRow, 'OUT');
                            }
                        }else{

                            $spreadsheet->getActiveSheet()->setCellValue($letters[$i].$numRow, $value[$dataTable[$i]]);
                        }
                      
                    }
                }
                $numRow++;
            }
            
            $spreadsheet->getActiveSheet()->setAutoFilter('A1:'.$lastColumn.'1');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.date('d-m-Y').'Export_Invoice.xlsx"');
            // header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');
            
            // If you're serving to IE over SSL, then the following may be needed
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0
            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            exit();
    }

}