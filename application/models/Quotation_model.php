<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotation_model extends MY_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function add_quotation_list($post=array())
  {
    // dump_debug($post);
    $post['Qlist_Amount'] = $post['Qlist_Price'] * $post['Qlist_Qty'];
    $this->db->set($post)->insert('qt_quotation_list');

    return TRUE;
  }

  public function Create_Commercial_term($post=array())
  {
    $this->db->set($post)->insert('qt_commercial');
    return TRUE;
  }

  public function Edit_Commercial_term($post=array())
  {
    $this->db->set($post)->update('qt_commercial');
    return TRUE;
  }

  public function Update_Group($post=array(), $group_id=FALSE)
  {
    $this->db->where('Qfg_Group_ID', $group_id)->delete('qt_form_group');

    foreach ($post as $key => $value) {
      $check = $this->db->insert('qt_form_group', array('Qfg_Group_ID' => $group_id, 'Regis_SubID' => $value));
    }
    return TRUE;
  }

  public function Create_Group($post=array())
  {

    if($post[0] != 'none')
    {
        // dump_debug($post);
        $result = $this->db->get('prefix_group_quotation')->row_array();
        $Ref_No = $result['val'];
        $year = date('y');
        $month = date('m');
        if($result['val'] == $month)
        {
          $prefix = "DTB_QTT";
          $seq_id = $result['seq'];
          $Seq = str_pad($result['seq'],4,"0",STR_PAD_LEFT);
          $Ref_No = $prefix.$year.$month.$Seq;
          
          
          // เพิ่มหมายเลข Group ที่ generate ออกมา
          $ref_no = $Ref_No;
    
          foreach ($post as $key => $value) {
            $check = $this->db->insert('qt_form_group', array('Qfg_Group_ID' => $ref_no, 'Regis_SubID' => $value));
          }
          //check success
          if($this->db->affected_rows($check)){
            $array_post = array(
              'Seq' => $seq_id+1
            );
            $this->db->update('prefix_group_quotation', $array_post);
            return $Ref_No;
          }
        }else{
          $array_post = array(
            'val' => $month,
            'Seq' => '1'
          );
          $this->db->update('prefix_group_quotation', $array_post);
          return false;
        }
      }else{
        return 'none';
      }
  }

  public function Create_Form_Quotation($post=array())
  {
    $result = $this->db->get('prefix_quotation')->row_array();
    $Ref_No = $result['val'];
    $year = date('Y');
    $month = date('m');
    if($result['val'] == $year)
    {
      $prefix = "QT_DTB_SVC";
      $seq_id = $result['seq'];
      $Seq = str_pad($result['seq'],2,"0",STR_PAD_LEFT);
      $Ref_No = $prefix.$year.$Seq;
      
      
      // เพิ่มหมายเลข Ref No ที่ generate ออกมา
      $post['Quot_No'] = $Ref_No;
      $check = $this->db->insert('qt_quotation', $post);

      //check success
      if($this->db->affected_rows($check)){
        $array_post = array(
          'Seq' => $seq_id+1
        );
        $this->db->update('prefix_quotation', $array_post);
        return $Ref_No;
      }
    }else{
      $array_post = array(
        'val' => $year,
        'Seq' => '1'
      );
      $this->db->update('prefix_quotation', $array_post);

      return FALSE;
    }

  
  }

  public function update_price_quotation($post=array())
  {

    function Convert($amount_number)
    {
        $amount_number = number_format($amount_number, 2, ".","");
        $pt = strpos($amount_number , ".");
        $number = $fraction = "";
        if ($pt === false) 
            $number = $amount_number;
        else
        {
            $number = substr($amount_number, 0, $pt);
            $fraction = substr($amount_number, $pt + 1);
        }
        
        $ret = "";
        $baht = ReadNumber ($number);
        if ($baht != "")
            $ret .= $baht . "บาท";
        
        $satang = ReadNumber($fraction);
        if ($satang != "")
            $ret .=  $satang . "สตางค์";
        else 
            $ret .= "ถ้วน";
        return $ret;
    }

    function ReadNumber($number)
    {
        $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
        $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
        $number = $number + 0;
        $ret = "";
        if ($number == 0) return $ret;
        if ($number > 1000000)
        {
            $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
            $number = intval(fmod($number, 1000000));
        }
        
        $divider = 100000;
        $pos = 0;
        while($number > 0)
        {
            $d = intval($number / $divider);
            $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : 
                ((($divider == 10) && ($d == 1)) ? "" :
                ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
            $ret .= ($d ? $position_call[$pos] : "");
            $number = $number % $divider;
            $divider = $divider / 10;
            $pos++;
        }
        return $ret;
    }

    // Select Amount ทั้งหมดมาบวกกัน
    $list = $this->db->where('Quot_No', $post['Quot_No'])->get('qt_quotation_list')->result_array();
    $total = '0';
    foreach ($list as $key => $value) {
      $total = $total + $value['Qlist_Amount'];
    }

    // Select % ของ ส่วนลด Discount
    $discount = $this->db->where('Quot_No', $post['Quot_No'])->get('qt_quotation')->row_array();
    // echo $total;
    // echo Convert($total);
    if($discount['Quot_PDiscount'] != ''){
      $discount = number_format($discount['Quot_PDiscount'],2,'.',',');
    }else{
        $discount = 0;
    }

    $discount = $total  * $discount / 100;
    $total = $total - $discount;
    $vat = $total * 7 / 100;
    $gtotal = $total + $vat;

    $total = number_format($total,2,'.','');
    $discount = number_format($discount,2,'.','');
    $vat = number_format($vat,2,'.','');
    $gtotal = number_format($gtotal,2,'.','');
    $gtotal_th = Convert($gtotal);

    // echo $discount.'<br>';
    // echo $total.'<br>';
    // echo $vat.'<br>';
    // echo $gtotal.'<br>';
    // die();

    $update = array(
      'Quot_Discount' => $discount,
      'Quot_Total' => $total,
      'Quot_Vat' => $vat,
      'Quot_Grandtotal' => $gtotal,
      'Quot_Grandtotal_TH' => $gtotal_th
    );

    $this->db->set($update)->where('Quot_No', $post['Quot_No'])->update('qt_quotation');
    // dump_debug($update);
    
    return TRUE;

  }
    
  

}
