<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivery_order_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function gen_delivery_order_number()
    {
        $result = $this->db->get('prefix_delivery')->row_array();
        $Ref_No = $result['val'];
        $year = date('Y');
        $month = date('m');
        if($result['val'] == $month)
        {
            $prefix = "DO_DTB";
            $seq_id = $result['seq'];
            $Seq = str_pad($result['seq'],2,"0",STR_PAD_LEFT);
            $Ref_No = $prefix.$year.$result['val'].$Seq;
            return $Ref_No;
        }else{
            $array_post = array(
                'val' => $month,
                'Seq' => '1'
            );
            $this->db->update('prefix_delivery', $array_post);
            // echo $this->db->last_query();
            return FALSE;
            // $this->Gen_Ref_No();
        }
    }
    

    public function create_delivery_order($post=array())
    {
        $Ref_No = $this->gen_delivery_order_number();
        if ($Ref_No == FALSE)
        {
            $this->create_delivery_order($post);
        }
        else
        {
            
            $post['Deli_No'] = $Ref_No;
            $rows = $this->db->where('Deli_No', $Ref_No)->get('do_delivery_order')->num_rows();
            // Check Regis_SubID ข้อมูลว่ามีในระบบหรือยัง
            if ($rows == '0'){
                // Check Insert Job
                $check = $this->db->set($post)->insert('do_delivery_order');
                if($this->db->affected_rows($check)){
                    //Select Prefix
                    $result = $this->db->get('prefix_delivery')->row_array();
                    $seq_id = $result['seq'];
                    $array_post = array(
                        'Seq' => $seq_id+1
                    );
                    //Select Update Prefix
                    $check = $this->db->update('prefix_delivery', $array_post);
                    if($this->db->affected_rows($check)){
                        // เสร็จสิ้นทุกอย่างให้ทำการ Return TRUE
                        return $Ref_No;
                    }else{
                        return FALSE;
                    }
                }else{
                    return FALSE;
                }
            // ถ้าเลขซ้ำให้ทำการ Update เลข +1
            }else{
                $result = $this->db->get('prefix_delivery')->row_array();
                $seq_id = $result['seq'];

                $array_post = array(
                    'Seq' => $seq_id+1
                );
                $check = $this->db->update('prefix_delivery', $array_post);
                if($this->db->affected_rows($check)){
                    $this->create_delivery_order($post);
                }
            }
        }
    }

    public function edit_call_sheet($post=array(), $ref_no=FALSE)
    {
      if ($this->db->set($post)->where('Deli_No', $ref_no)->update('do_delivery_order'))
      {
        return TRUE;
      }
    }

    public function delete_delivery_list($ref_no=FALSE, $id=FALSE)
    {
        
        if ($this->db->where('Dsub_ID', $id)->where('Deli_No', $ref_no)->delete('do_sub_delivery'))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }

    public function add_delivery_list($post=array(), $ref_no=FALSE)
    {
        $post['Deli_No'] = $ref_no;
        if ($this->db->set($post)->insert('do_sub_delivery'))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }
    
  

}
