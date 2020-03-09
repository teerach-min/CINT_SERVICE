<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class non_samsung extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
		
		if ( ! $this->session->has_userdata('Access')
			OR ! in_array($this->session->userdata('Access')['Acc_ID'],array('1','3','4')))
		{
			redirect();
		}

		$this->load->model('Non_samsung_model');
		$this->load->model('Technician_model');

    }
    
    public function index()
    {
        redirect('non_samsung/view_job_nonsamsung');
    }

    public function view_job_nonsamsung()
	{
		$this->data['detail'] = $this->db->where('Pro_ID', '2')->where_in('sv_register.Status_ID', array('1','2','3','4','7','8','9'))->order_by('Regis_ID','DESC')
		->join('sv_user', 'sv_register.User_ID = sv_user.User_ID', 'left')
		->join('sv_status', 'sv_register.Status_ID = sv_status.Status_ID')
		->get('sv_register')->result_array();

		$this->data['body'] = $this->load->view('non_samsung/table/table_view_job_nonsamsung',$this->data,TRUE);
		$this->load->view('_layouts/blank',$this->data);
	}

	public function order_call()
	{
		$this->data['detail'] = $this->db
			->where('sv_change_status.Schange_Call', '1')
			->join('sv_user', 'sv_register.User_ID = sv_user.User_ID', 'left')
			->join('sv_status', 'sv_register.Status_ID = sv_status.Status_ID', 'left')						
			->join('sv_change_status', 'sv_change_status.Regis_SubID = sv_register.Regis_SubID', 'left')						
			->order_by('Regis_ID', 'DESC')
			->get('sv_register')->result_array();

		$this->data['body'] = $this->load->view('non_samsung/table/order_call', $this->data, TRUE);
		$this->load->view('_layouts/blank',$this->data);

	}

	public function create_order()
	{
		$this->form_validation->set_rules('Regis_Name','','required|max_length[150]');
		$this->form_validation->set_rules('Regis_Contact','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
			$post = $this->input->post();
			// dump_debug($post);
			// die();
			$post['Status_ID'] = '7';
			$res = $this->Non_samsung_model->create_job($post);
			if ($res !== FALSE)
			{
				set_flashmessage('success','Success, Create Job '.$res.'.');
				redirect('non_samsung/order_call');
			}
			// dump_debug($res);
			// die();
		}
		$this->data['body'] = $this->load->view('non_samsung/form/create-job', $this->data, TRUE);
		$this->load->view('_layouts/blank',$this->data);

	}

	public function edit_job($ref_no=FALSE)
	{
		$this->form_validation->set_rules('Status_ID','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
			$post = $this->input->post();
			// dump_debug($post);
			// die();
			if ($post['Status_ID'] == '2')
			{
				if ($this->Technician_model->update_status($post, $ref_no))
				{
					if ($this->Technician_model->update_status_assign($post, $ref_no))
					{
						if (isset($post['power_problem']))
						{
							$symptom = $this->db->where('GSymp_ID', '1')->where('Regis_SubID', $ref_no)->join('sv_sub_symptom', 'sv_symptom_job.SSymp_ID = sv_sub_symptom.SSymp_ID')->get('sv_symptom_job')->result_array();
							$symptom_rows = count($symptom);
							$num_rows = count($post['power_problem']);
							
							$this->Technician_model->insert_problem($post['power_problem'], $ref_no, $symptom_rows, $num_rows, '1');
						}
						if(isset($post['display_problem']))
						{
							$symptom = $this->db->where('GSymp_ID', '2')->where('Regis_SubID', $ref_no)->join('sv_sub_symptom', 'sv_symptom_job.SSymp_ID = sv_sub_symptom.SSymp_ID')->get('sv_symptom_job')->result_array();
							$symptom_rows = count($symptom);
							$num_rows = count($post['display_problem']);
							
							$this->Technician_model->insert_problem($post['display_problem'], $ref_no, $symptom_rows, $num_rows, '2');
						}
						if(isset($post['charging_problem']))
						{
							$symptom = $this->db->where('GSymp_ID', '3')->where('Regis_SubID', $ref_no)->join('sv_sub_symptom', 'sv_symptom_job.SSymp_ID = sv_sub_symptom.SSymp_ID')->get('sv_symptom_job')->result_array();
							$symptom_rows = count($symptom);
							$num_rows = count($post['charging_problem']);
							
							$this->Technician_model->insert_problem($post['charging_problem'], $ref_no, $symptom_rows, $num_rows, '3');
						}
						if(isset($post['camera_problem']))
						{
							$symptom = $this->db->where('GSymp_ID', '4')->where('Regis_SubID', $ref_no)->join('sv_sub_symptom', 'sv_symptom_job.SSymp_ID = sv_sub_symptom.SSymp_ID')->get('sv_symptom_job')->result_array();
							$symptom_rows = count($symptom);
							$num_rows = count($post['camera_problem']);
							
							$this->Technician_model->insert_problem($post['camera_problem'], $ref_no, $symptom_rows, $num_rows, '4');
						}
						
						if(isset($post['connection_problem']))
						{
							$symptom = $this->db->where('GSymp_ID', '5')->where('Regis_SubID', $ref_no)->join('sv_sub_symptom', 'sv_symptom_job.SSymp_ID = sv_sub_symptom.SSymp_ID')->get('sv_symptom_job')->result_array();
							$symptom_rows = count($symptom);
							$num_rows = count($post['connection_problem']);
							
							$this->Technician_model->insert_problem($post['connection_problem'], $ref_no, $symptom_rows, $num_rows, '5');
						}
						if(isset($post['sound_problem']))
						{
							$symptom = $this->db->where('GSymp_ID', '6')->where('Regis_SubID', $ref_no)->join('sv_sub_symptom', 'sv_symptom_job.SSymp_ID = sv_sub_symptom.SSymp_ID')->get('sv_symptom_job')->result_array();
							$symptom_rows = count($symptom);
							$num_rows = count($post['sound_problem']);
							
							$this->Technician_model->insert_problem($post['sound_problem'], $ref_no, $symptom_rows, $num_rows, '6');
						}
						if(isset($post['other']))
						{
							$symptom = $this->db->where('GSymp_ID', '7')->where('Regis_SubID', $ref_no)->join('sv_sub_symptom', 'sv_symptom_job.SSymp_ID = sv_sub_symptom.SSymp_ID')->get('sv_symptom_job')->result_array();
							$symptom_rows = count($symptom);
							$num_rows = count($post['other']);
							
							$return = $this->Technician_model->insert_problem($post['other'], $ref_no, $symptom_rows, $num_rows, '7');
						}
						if(isset($post['printer']))
						{
							$symptom = $this->db->where('GSymp_ID', '8')->where('Regis_SubID', $ref_no)->join('sv_sub_symptom', 'sv_symptom_job.SSymp_ID = sv_sub_symptom.SSymp_ID')->get('sv_symptom_job')->result_array();
							$symptom_rows = count($symptom);
							$num_rows = count($post['printer']);
							
							$this->Technician_model->insert_problem($post['printer'], $ref_no, $symptom_rows, $num_rows, '8');
						}
						if(isset($post['scanner']))
						{
							$symptom = $this->db->where('GSymp_ID', '9')->where('Regis_SubID', $ref_no)->join('sv_sub_symptom', 'sv_symptom_job.SSymp_ID = sv_sub_symptom.SSymp_ID')->get('sv_symptom_job')->result_array();
							$symptom_rows = count($symptom);
							$num_rows = count($post['scanner']);
							
							$this->Technician_model->insert_problem($post['scanner'], $ref_no, $symptom_rows, $num_rows, '9');
						}
						if(isset($post['pda']))
						{
							$symptom = $this->db->where('GSymp_ID', '10')->where('Regis_SubID', $ref_no)->join('sv_sub_symptom', 'sv_symptom_job.SSymp_ID = sv_sub_symptom.SSymp_ID')->get('sv_symptom_job')->result_array();
							$symptom_rows = count($symptom);
							$num_rows = count($post['pda']);
							
							$this->Technician_model->insert_problem($post['pda'], $ref_no, $symptom_rows, $num_rows, '10');
						}
						if(isset($post['accessories']))
						{
							$symptom = $this->db->where('GSymp_ID', '11')->where('Regis_SubID', $ref_no)->join('sv_sub_symptom', 'sv_symptom_job.SSymp_ID = sv_sub_symptom.SSymp_ID')->get('sv_symptom_job')->result_array();
							$symptom_rows = count($symptom);
							$num_rows = count($post['accessories']);
							
							$return = $this->Technician_model->insert_problem($post['accessories'], $ref_no, $symptom_rows, $num_rows, '11');
						}	
						redirect('non_samsung/edit_job/'.$ref_no);
					}
				}
			}
			// Status Quotation
			if ($post['Status_ID'] == '3')
			{
				if ($this->Technician_model->update_status($post, $ref_no))
				{
					$this->Technician_model->update_status_quotation($post, $ref_no);
					
					redirect('non_samsung/view_job_nonsamsung');
				}
			}
			if ($post['Status_ID'] == '4')
			{
				if ($this->Technician_model->update_status($post, $ref_no))
				{
					$this->Technician_model->update_status_completed($post, $ref_no);
					redirect('non_samsung/view_job_nonsamsung');
				}
			}
			if ($post['Status_ID'] == '7')
			{
				if ($this->Technician_model->update_status($post, $ref_no))
				{
					$this->Technician_model->update_status_call($post, $ref_no);
					if (in_array($this->session->userdata('Access')['Acc_ID'],array('1','3')))
					{
						redirect('non_samsung/order_call');
					}else{
						redirect('non_samsung/view_job_nonsamsung');
					}
				}
			}
			if ($post['Status_ID'] == '8')
			{
				if ($this->Technician_model->update_status($post, $ref_no))
				{
					$this->Technician_model->update_status_closecall($post, $ref_no);
					if (in_array($this->session->userdata('Access')['Acc_ID'],array('1','3')))
					{
						redirect('non_samsung/order_call');
					}else{
						redirect('non_samsung/view_job_nonsamsung');
					}
				}
			}
			if ($post['Status_ID'] == '9')
			{
				if ($this->Technician_model->update_status($post, $ref_no))
				{
					$this->Technician_model->update_status_pickup($post, $ref_no);
					if (in_array($this->session->userdata('Access')['Acc_ID'],array('1','3')))
					{
						redirect('non_samsung/order_call');
					}else{
						redirect('non_samsung/view_job_nonsamsung');
					}
				}
			}
		}

		$this->data['job'] = $this->db->where('Regis_SubID', $ref_no)
			->join('sv_status','sv_status.Status_ID = sv_register.Status_ID')
			// ->join('sv_change_status','sv_change_status.Regis_SubID = sv_register.Regis_SubID')
			// ->join('sv_change_status', 'sv_change_status.Regis_SubID = sv_register.Regis_SubID')
			->get('sv_register')->row_array();

		$this->data['body'] = $this->load->view('non_samsung/form/edit_job',$this->data,TRUE);
		$this->load->view('_layouts/blank',$this->data);
	}

}
