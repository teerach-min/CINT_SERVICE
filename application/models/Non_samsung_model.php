<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Non_samsung_model extends MY_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function gen_job_number()
  {
      $result = $this->db->get('prefix_call')->row_array();
      $Ref_No = $result['val'];
      $year = date('Y');
      $month = date('m');
      if($result['val'] == $month)
      {
          $prefix = "DTBC";
          $seq_id = $result['seq'];
          $Seq = str_pad($result['seq'],2,"0",STR_PAD_LEFT);
          $Ref_No = $prefix.$year.$result['val'].$Seq;
          
          return $Ref_No;
      }else{
          $array_post = array(
              'val' => $month,
              'Seq' => '1'
          );
          
          $this->db->update('prefix_call', $array_post);

          return FALSE;
      }
  }

  public function create_job($post=array())
  {
    $Ref_No = $this->gen_job_number();
    $post['Regis_SubID'] = $Ref_No;
    $post['Regis_Date'] = date('Y-m-d');
    $rows = $this->db->where('Regis_SubID', $Ref_No)->get('sv_register')->num_rows();
    // Check Regis_SubID ข้อมูลว่ามีในระบบหรือยัง
    if ($rows == '0'){
        // Check Insert Job
        $check = $this->db->set($post)->insert('sv_register');
        if($this->db->affected_rows($check)){
            //Select Prefix
            $result = $this->db->get('prefix_call')->row_array();
            $seq_id = $result['seq'];
            $array_post = array(
                'Seq' => $seq_id+1
            );
            //Select Update Prefix
            $check = $this->db->update('prefix_call', $array_post);
            if($this->db->affected_rows($check)){
                // เสร็จสิ้นทุกอย่างให้ทำการ Return TRUE
                $this->update_status_call($post, $Ref_No);
                return $Ref_No;
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
    // ถ้าเลขซ้ำให้ทำการ Update เลข +1
    }else{
        $result = $this->db->get('prefix_call')->row_array();
        $seq_id = $result['seq'];

        $array_post = array(
            'Seq' => $seq_id+1
        );
        $check = $this->db->update('prefix_call', $array_post);
        if($this->db->affected_rows($check)){
            $this->create_job($post);
        }
    }

  }

  public function update_status_call($post=array(), $ref_no=FALSE)
  {
    
        $check = $this->db->where('Regis_SubID', $ref_no)->where('Schange_Call', '1')->get('sv_change_status')->row_array();
        if (isset($check))
        {
            $post = $this->_filter_data('sv_change_status', $post);
            $this->db->set($post)->where('Regis_SubID',$ref_no)->where('Schange_Call', '1')->update('sv_change_status');
        }else{
            // Insert
            $post['User_ID'] = $this->session->userdata('User_ID');
            $post['Regis_SubID'] = $ref_no;
            $post = $this->_filter_data('sv_change_status', $post);                
            $post['Schange_Call'] = '1';
            $this->db->set($post)->insert('sv_change_status');
            // dump_debug('None');
        }
        return TRUE;

  }

}