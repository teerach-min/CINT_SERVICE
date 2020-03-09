<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Technician_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function update_status($post=array(), $ref_no=FALSE)
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
        unset($post['Regis_Submit']);
        unset($post['Schange_Remark']);
        unset($post['Schange_Name']);
        $post = $this->_filter_data('sv_register', $post);
        $this->db->set($post)->where('Regis_SubID', $ref_no)->update('sv_register');
        
        return TRUE;
    }
    
    public function insert_problem($post=array(), $ref_no=FALSE, $symptom_rows=FALSE, $num_rows=FALSE, $group=FALSE)
    {
        // dump_debug($post);

        if ($symptom_rows == $num_rows)
        {
            $checked = '0';
            foreach ($post as $key => $value) {
                $check = $this->db->select('SSymp_ID')->where('Regis_SubID', $ref_no)->where('SSymp_ID', $value)->get('sv_symptom_job')->row_array();
                
        
                if ($check == '')
                {
                    $checked = '1';
                }
            }
            
            if ($checked == '1')
            {
                    // DELETED
                    $group = $this->db->where('GSymp_ID', $group)->join('sv_sub_symptom', 'sv_symptom_job.SSymp_ID = sv_sub_symptom.SSymp_ID')->get('sv_symptom_job')->result_array();
                    foreach ($group as $key => $value) {
                        $this->db->where('Regis_SubID', $ref_no)->where('SSymp_ID', $value['SSymp_ID'])->delete('sv_symptom_job');
                    }
              

                    //INSERT
                    foreach ($post as $key => $value) {
                        $this->db->set(array('Regis_SubID' => $ref_no, 'SSymp_ID' => $value))->insert('sv_symptom_job');
                    }
              return TRUE;
            }
        }
        else
        {
            $group = $this->db->where('GSymp_ID', $group)->join('sv_sub_symptom', 'sv_symptom_job.SSymp_ID = sv_sub_symptom.SSymp_ID')->get('sv_symptom_job')->result_array();
            if (isset($group))
            {
                foreach ($group as $key => $value) {
                    $this->db->where('Regis_SubID', $ref_no)->where('SSymp_ID', $value['SSymp_ID'])->delete('sv_symptom_job');
                }
            }

            foreach ($post as $key => $value) {
                $this->db->set(array('Regis_SubID' => $ref_no, 'SSymp_ID' => $value))->insert('sv_symptom_job');
            }
            return TRUE;
        }
    }

    public function update_status_assign($post=array(), $ref_no=FALSE)
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
        unset($post['Regis_Submit']);
        
        $check = $this->db->where('Regis_SubID', $ref_no)->where('Schange_Assign', '1')->get('sv_change_status')->row_array();
        if (isset($check))
        {
            //Update 
            $post = $this->_filter_data('sv_change_status', $post);
            $this->db->set($post)->where('Regis_SubID',$ref_no)->where('Schange_Assign', '1')->update('sv_change_status');
        }else{
            // Insert
            $post['Regis_SubID'] = $ref_no;
            $post = $this->_filter_data('sv_change_status', $post);                
            $post['Schange_Assign'] = '1';
            $this->db->set($post)->insert('sv_change_status');
            // dump_debug('None');
        }

        return TRUE;
    }

    public function update_status_quotation($post=array(), $ref_no=FALSE)
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
        unset($post['Regis_Submit']);
        
        $check = $this->db->where('Regis_SubID', $ref_no)->where('Schange_Quotation', '1')->get('sv_change_status')->row_array();
        if (isset($check))
        {
            //Update 
            $post = $this->_filter_data('sv_change_status', $post);
            $this->db->set($post)->where('Regis_SubID',$ref_no)->where('Schange_Quotation', '1')->update('sv_change_status');
        }else{
            // Insert
            $post['Regis_SubID'] = $ref_no;
            $post = $this->_filter_data('sv_change_status', $post);                
            $post['Schange_Quotation'] = '1';
            $this->db->set($post)->insert('sv_change_status');
            // dump_debug('None');
        }
        return TRUE;

    }

    public function update_status_completed($post=array(), $ref_no=FALSE)
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
        unset($post['Regis_Submit']);

        // dump_debug($post);
        
        $check = $this->db->where('Regis_SubID', $ref_no)->where('Schange_Complete', '1')->get('sv_change_status')->row_array();
        if (isset($check))
        {
            $post = $this->_filter_data('sv_change_status', $post);
            $this->db->set($post)->where('Regis_SubID',$ref_no)->where('Schange_Complete', '1')->update('sv_change_status');
        }else{
            // Insert
            $post['Regis_SubID'] = $ref_no;
            $post = $this->_filter_data('sv_change_status', $post);                
            $post['Schange_Complete'] = '1';
            $this->db->set($post)->insert('sv_change_status');
            // dump_debug('None');
        }
        return TRUE;

    }

    public function update_status_call($post=array(), $ref_no=FALSE)
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
        // unset($post['Regis_Submit']);
        // $this->db->where('User_FName')->get('sv_user')->row_array()
        
        
        $check = $this->db->where('Regis_SubID', $ref_no)->where('Schange_Call', '1')->get('sv_change_status')->row_array();
        if (isset($check))
        {
            $post = $this->_filter_data('sv_change_status', $post);
            $this->db->set($post)->where('Regis_SubID',$ref_no)->where('Schange_Call', '1')->update('sv_change_status');
        }else{
            // Insert
            $post['Regis_SubID'] = $ref_no;
            $post = $this->_filter_data('sv_change_status', $post);                
            $post['Schange_Call'] = '1';
            $this->db->set($post)->insert('sv_change_status');
            // dump_debug('None');
        }
        return TRUE;

    }

    public function update_status_closecall($post=array(), $ref_no=FALSE)
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
        unset($post['Regis_Submit']);

        $check = $this->db->where('Regis_SubID', $ref_no)->where('Schange_Closecall', '1')->get('sv_change_status')->row_array();
        if (isset($check))
        {
            $post = $this->_filter_data('sv_change_status', $post);
            $this->db->set($post)->where('Regis_SubID',$ref_no)->where('Schange_Closecall', '1')->update('sv_change_status');
        }else{
            // Insert
            $post['Regis_SubID'] = $ref_no;
            $post = $this->_filter_data('sv_change_status', $post);                
            $post['Schange_Closecall'] = '1';
            $this->db->set($post)->insert('sv_change_status');
            // dump_debug('None');
        }

        return TRUE;
    }

    public function update_status_pickup($post=array(), $ref_no=FALSE)
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
        unset($post['Regis_Submit']);

        $check = $this->db->where('Regis_SubID', $ref_no)->where('Schange_Pickup', '1')->get('sv_change_status')->row_array();
        if (isset($check))
        {
            $post = $this->_filter_data('sv_change_status', $post);
            $this->db->set($post)->where('Regis_SubID',$ref_no)->where('Schange_Pickup', '1')->update('sv_change_status');
        }else{
            // Insert
            $post['Regis_SubID'] = $ref_no;
            $post = $this->_filter_data('sv_change_status', $post);                
            $post['Schange_Pickup'] = '1';
            $this->db->set($post)->insert('sv_change_status');
            // dump_debug('None');
        }
        
        return TRUE;

    }

}
