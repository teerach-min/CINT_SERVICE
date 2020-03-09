<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function gen_job_number()
    {
        $result = $this->db->get('prefix_register')->row_array();
        $Ref_No = $result['val'];
        $year = date('Y');
        $month = date('m');
        if($result['val'] == $month)
        {
            $prefix = "DTB";
            $seq_id = $result['seq'];
            $Seq = str_pad($result['seq'],2,"0",STR_PAD_LEFT);
            $Ref_No = $prefix.$year.$result['val'].$Seq;
            
            return $Ref_No;
        }else{
            $array_post = array(
                'val' => $month,
                'Seq' => '1'
            );
            
            $this->db->update('prefix_register', $array_post);

            return FALSE;
        }
    }
    

    public function create_job($post=array())
    {
        $Ref_No = $this->gen_job_number();
        if ($Ref_No == FALSE)
        {
            $this->create_job($post);
        }
        else
        {
            unset($post['power_problem']);
            unset($post['display_problem']);
            unset($post['charging_problem']);
            unset($post['camera_problem']);
            unset($post['connection_problem']);
            unset($post['sound_problem']);
            unset($post['other']);
            unset($post['printer']);
            unset($post['scanner']);
            unset($post['pda']);
            unset($post['accessories']);
            
            $post['Regis_SubID'] = $Ref_No;
            $rows = $this->db->where('Regis_SubID', $Ref_No)->get('sv_register')->num_rows();
            // Check Regis_SubID ข้อมูลว่ามีในระบบหรือยัง
            if ($rows == '0'){
                // Check Insert Job
                $check = $this->db->set($post)->insert('sv_register');
                if($this->db->affected_rows($check)){
                    //Select Prefix
                    $result = $this->db->get('prefix_register')->row_array();
                    $seq_id = $result['seq'];
                    $array_post = array(
                        'Seq' => $seq_id+1
                    );
                    //Select Update Prefix
                    $check = $this->db->update('prefix_register', $array_post);
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
                $result = $this->db->get('prefix_register')->row_array();
                $seq_id = $result['seq'];

                $array_post = array(
                    'Seq' => $seq_id+1
                );
                $check = $this->db->update('prefix_register', $array_post);
                if($this->db->affected_rows($check)){
                    $this->create_job($post);
                }
            }
        }
    }



    public function search_order($post=array())
    {
       
        $query = $this->db
            ->join('sv_user', 'sv_register.User_ID = sv_user.User_ID', 'left')
            ->join('sv_status', 'sv_register.Status_ID = sv_status.Status_ID', 'left');
            if ($post['pro_id'] != 'null')
            {
                $query = $query->where('sv_register.pro_id', $post['pro_id']);
            }
            if ($post['Status_ID'] != '')
            {
                $query = $query->where('sv_register.Status_ID', $post['Status_ID']);
            }
            if (isset($post['date_start'])){
                $query = $query->group_start()
                    ->where('Regis_Pickupdate >=', $post['date_start'])
                    ->where('Regis_Pickupdate <=', $post['date_end'])
                    ->or_group_start()
                        ->where('Regis_Date >=', $post['date_start'])
                        ->where('Regis_Date <=', $post['date_end'])
                    ->group_end()
                ->group_end();
            }
            if ($post['Regis_Name'] != '')
            {
                $query = $query->like('Regis_Name', $post['Regis_Name']);
            }

        $query = $query->order_by('Regis_ID','desc')->get('sv_register')->result_array();
        return $query;
    }

    public function edit_job($post=array(), $ref_no=FALSE)
    {
        $post['Regis_Pickupdate'] = date('Y-m-d', strtotime($post['Regis_Pickupdate']));
        unset($post['power_problem']);
        unset($post['display_problem']);
        unset($post['charging_problem']);
        unset($post['camera_problem']);
        unset($post['connection_problem']);
        unset($post['sound_problem']);
        unset($post['other']);
        unset($post['printer']);
        unset($post['scanner']);
        unset($post['pda']);
        unset($post['accessories']);

        $post = $this->_filter_data('sv_register', $post);
        
        if ($this->db->set($post)->where('Regis_SubID', $ref_no)->update('sv_register')){
            // Update Status
            $this->update_status($post, $ref_no);
            return TRUE;
        }
    }

    public function update_status ($post=array(),$ref_no=FALSE)
    {
        $where = '';
        switch ($post['Status_ID']) {
            case '2':
                $where = 'Schange_Assign';
                break;
            case '3':
                $where = 'Schange_Quotation';
                break;
            case '4':
                $where = 'Schange_Complete';
                break;
            case '5':
                $where = 'Schange_Closejob';
                break;

            case '6':
                $where = 'Schange_Reject';
                break;

            case '7':
                $where = 'Schange_Call';
                break;

            case '8':
                $where = 'Schange_Closecall';
                break;
            
            case '9':
                $where = 'Schange_Pickup';
                break;
            default:
                break;
        }
        if ($where !== '')
        {
            $check = $this->db->where('Regis_SubID', $ref_no)->where($where, '1')->get('sv_change_status')->row_array();
            if (isset($check))
            {
                $post = $this->_filter_data('sv_change_status', $post);
                $this->db->set($post)->where('Regis_SubID',$ref_no)->where($where, '1')->update('sv_change_status');
            }else{
                // Insert
                $post['Regis_SubID'] = $ref_no;
                $post = $this->_filter_data('sv_change_status', $post);                
                $post[$where] = '1';
                $this->db->set($post)->insert('sv_change_status');
                // dump_debug('None');
            }
        }

        return TRUE;
    }
}
