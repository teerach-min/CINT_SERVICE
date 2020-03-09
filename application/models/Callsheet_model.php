<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Callsheet_model extends MY_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function gen_call_sheet_number()
    {
        $result = $this->db->get('prefix_callsheet')->row_array();
        $Ref_No = $result['val'];
        $year = date('Y');
        $month = date('m');
        if($result['val'] == $month)
        {
            $prefix = "CS_DTB";
            $seq_id = $result['seq'];
            $Seq = str_pad($result['seq'],2,"0",STR_PAD_LEFT);
            $Ref_No = $prefix.$year.$result['val'].$Seq;
            return $Ref_No;
        }else{
            $array_post = array(
                'val' => $month,
                'Seq' => '1'
            );
            $this->db->update('prefix_callsheet', $array_post);
            // echo $this->db->last_query();
            return FALSE;
            // $this->Gen_Ref_No();
        }
    }
    
    public function create_call_sheet_no($post=array())
    {
        unset($post['Call_Datetime']);
        if ($this->db->set($post)->insert('sv_callsheet'))
        {
            return true;
        }else{
            return false;
        }

    }

    public function create_call_sheet($post=array())
    {
        $Ref_No = $this->gen_call_sheet_number();
        if ($Ref_No == FALSE)
        {
            $this->create_call_sheet($post);
        }
        else
        {
            unset($post['Call_Datetime']);
            $post['Call_No'] = $Ref_No;
            $rows = $this->db->where('Call_No', $Ref_No)->get('sv_callsheet')->num_rows();
            // Check Regis_SubID ข้อมูลว่ามีในระบบหรือยัง
            if ($rows == '0'){
                // Check Insert Job
                $check = $this->db->set($post)->insert('sv_callsheet');
                if($this->db->affected_rows($check)){
                    //Select Prefix
                    $result = $this->db->get('prefix_callsheet')->row_array();
                    $seq_id = $result['seq'];
                    $array_post = array(
                        'Seq' => $seq_id+1
                    );
                    //Select Update Prefix
                    $check = $this->db->update('prefix_callsheet', $array_post);
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
                $result = $this->db->get('prefix_callsheet')->row_array();
                $seq_id = $result['seq'];

                $array_post = array(
                    'Seq' => $seq_id+1
                );
                $check = $this->db->update('prefix_callsheet', $array_post);
                if($this->db->affected_rows($check)){
                    $this->create_call_sheet($post);
                }
            }
        }
    }

    public function edit_call_sheet($post=array(), $ref_no=FALSE)
    {
        unset($post['Call_Datetime']);
        if ($this->db->set($post)->where('Call_No', $ref_no)->update('sv_callsheet'))
        {
            return TRUE;
        }
    }
    
  

}
