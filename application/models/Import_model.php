<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import_model extends MY_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function import_IVD($data=array())
  {
      ini_set('precision', '15');
        // dump_debug($data);
        // die();
        /** PHPExcel */
        require_once FCPATH.'plugins/PHPExcel/Classes/PHPExcel.php';
	    /** PHPExcel_IOFactory - Reader */
	    include FCPATH.'plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
        $excel = PHPExcel_IOFactory::load($data['full_path']);
        
        $i = 5;
        $n = 0;
        $row = 5;

        //check row
        while ($excel->getActiveSheet()->getCell('A'.$row)->getValue() != "")
        {
          $row++;
        }
        // ต้องลบ 5 เนื่องจาก row เริ่มต้นจาก 2 
        $row = $row - 5;
        // เช็คข้อมูลใน Excel ไม่่ให้เกิน 500 เนื่องจากถ้าเกิด ตัว browser จะติดว่า interet มีปัญหา
        if ($row <= 500)
        {
          while($excel->getActiveSheet()->getCell('A'.$i)->getValue() != ""){
  
              $id = $excel ->getActiveSheet()->getCell('A'.$i)->getValue();
              $company = $excel ->getActiveSheet()->getCell('B'.$i)->getValue();
              $projectname = $excel ->getActiveSheet()->getCell('C'.$i)->getValue();
              $code = $excel ->getActiveSheet()->getCell('D'.$i)->getValue(); 
              $name = $excel ->getActiveSheet()->getCell('E'.$i)->getValue();
              $serial = $excel ->getActiveSheet()->getCell('F'.$i)->getValue();
              $warranty = $excel ->getActiveSheet()->getCell('G'.$i)->getValue();
              $startdate = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($excel ->getActiveSheet()->getCell('H'.$i)->getValue()));
              $expdate = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP ($excel ->getActiveSheet()->getCell('I'.$i)->getValue()));
              $notification = $excel ->getActiveSheet()->getCell('J'.$i)->getValue();
              $remark = $excel ->getActiveSheet()->getCell('K'.$i)->getValue();
              $check_data = $this->db->where('Wart_Serial', $serial)->get('sv_warranty')->row_array();

              if ($check_data['Wart_Serial'] != $serial)
              {
                if ($notification == NULL || $notification == "In Active") {
                  $status = 0;
                }else{
                  $status = 1;
                }
                $data_array = array(
                    'Wart_IVD' => $id,
                    'Wart_Customer' => $company,
                    'Wart_Project_Name' => $projectname,
                    'Wart_Code' => $code,
                    'Wart_Name' => $name,
                    'Wart_Serial' => (string)$serial,
                    'Wart_Warranty' => $warranty,
                    'Wart_Startdate' => $startdate,
                    'Wart_Expdate' => $expdate,
                    'Wart_Status' => $status,
                    'Wart_Remark' => $remark
                );

                $this->db->set($data_array)->insert('sv_warranty');
  
                $report[] = array( 'report' => '<p class="text-success">'.++$n.'. IMEI/SERIAL "'.$serial.'" Insert Success</p>');
                
              }else{
  
                $report[] = array( 'report' => '<p class="text-danger">'.++$n.'. IMEI/SERIAL "'.$serial.'" ซ้ำ</p>');
                
              }
              $i++;
          }
        }else{
          $report[] = array( 'report' => '<p class="text-danger">การอัพโหลดไฟล์จำนวน Record ห้ามเกิน 500 Record ต่อครั้ง</p>');
        }
        return $report;

  }
 
  

}
