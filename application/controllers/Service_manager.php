<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class service_manager extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		
		if ( ! $this->session->has_userdata('Access')
			OR ! in_array($this->session->userdata('Access')['Acc_ID'],array('1','2')))
		{
			redirect('home');
		}
		$this->load->model('Service_model');
		$this->load->model('Non_samsung_model');

	}

	public function index()
	{
		redirect('service_manager/view_order');
	}	

	public function view_order()
	{
		$getValue = $this->input->get();
		$_POST['pro_id'] = $this->input->get('pro_id');
		$this->form_validation->set_data($this->input->get());
		$this->form_validation->set_rules('pro_id','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
			if (isset($getValue['date-range']))
			{
				$date = explode('-', $getValue['date-range']);
				$getValue['date_start'] = date('Y-m-d', strtotime($date[0]));
				$getValue['date_end'] = date('Y-m-d', strtotime($date[1]));
				unset($getValue['date-range']);
			}
			$res = $this->Service_model->search_order($getValue);

			$this->data['detail'] = $res;
			$this->data['page_view'] = $this->load->view('service_manager/table/table_view_all_job', $this->data,TRUE);
		}
		$this->data['body'] = $this->load->view('service_manager/form/search_order', $this->data,TRUE);
		$this->load->view('_layouts/blank',$this->data);
	}

	public function create_job()
	{

		$this->form_validation->set_rules('Regis_Name','','required|max_length[150]');
		$this->form_validation->set_rules('Regis_Contact','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
			$post = $this->input->post();
			$post['Regis_Date'] = date('Y-m-d h:i:s');
			$post['Regis_Pickupdate'] = date('Y-m-d', strtotime($post['Regis_Pickupdate']));
			$check = $this->Service_model->create_job($post);
			if($check != FALSE)
			{
				redirect('service_manager/view_all_job');
			}
		}
		$this->data['create_call'] = $this->load->view('service_manager/form/create-call', $this->data, TRUE);
		$this->data['body'] = $this->load->view('service_manager/form/create-job',$this->data,TRUE);
		$this->load->view('_layouts/blank',$this->data);
	}
	// Create Order  Call
	public function create_order()
	{
		$this->form_validation->set_rules('Regis_Name','','required|max_length[150]');
		$this->form_validation->set_rules('Regis_Contact','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
			$post = $this->input->post();
			$post['Status_ID'] = '7';
			$res = $this->Non_samsung_model->create_job($post);
			if ($res !== FALSE)
			{
				set_flashmessage('success','Success, Create Job '.$res.'.');
				redirect('service_manager/view_all_job');
			}
		}
		$this->data['body'] = $this->load->view('non_samsung/form/create-job', $this->data, TRUE);
		$this->load->view('_layouts/blank',$this->data);

	}
	public function edit_job($ref_no=FALSE)
	{
		$this->form_validation->set_rules('Regis_Contact','','required|max_length[250]');
		if ($this->form_validation->run() == TRUE)
		{
			$post = $this->input->post();
			unset($post['Regis_Submit']);
			
				if ($check_insert = $this->Service_model->edit_job($post, $ref_no))
				{
					set_flashmessage('success','Success, Edit Job '.$ref_no.'.');
					redirect('service_manager/edit_job/'.$ref_no);
				}
				else
				{
					set_flashmessage('warning','Warning, Edit Job '.$ref_no.'.');
					redirect('service_manager/edit_job/'.$ref_no);
				}

		}

		$this->data['job'] = $this->db->where('Regis_SubID', $ref_no)->join('sv_status', 'sv_register.Status_ID = sv_status.Status_ID')->get('sv_register')->row_array();

		$this->data['body'] = $this->load->view('service_manager/form/edit-job',$this->data,TRUE);
		$this->load->view('_layouts/blank',$this->data);
	}

	public function view_all_job()
	{
		redirect('service_manager/view_order');
	}

	public function view_job_status()
	{
		$status = $this->input->get('status');
		
		$this->data['detail'] = $this->db->where('sv_register.Status_ID', $status)
		->order_by('Regis_ID','DESC')
		->join('sv_user', 'sv_register.User_ID = sv_user.User_ID', 'left')
		->join('sv_status', 'sv_register.Status_ID = sv_status.Status_ID', 'left')
		->get('sv_register')->result_array();

		$this->data['body'] = $this->load->view('service_manager/table/table_view_status_job',$this->data,TRUE);
		$this->load->view('_layouts/blank',$this->data);
	}

	public function check_IVD()
	{
		$this->data['detail'] = $this->db->get('sv_warranty')->result_array();

		$this->data['body'] = $this->load->view('service_manager/table/table_view_ivd',$this->data,TRUE);
		$this->load->view('_layouts/blank',$this->data);
	}

	public function ajax_status() 
	{
		$pro_id = $this->input->get('pro_id');	
		$query = $this->db;
		if ($pro_id === '1') {
			$query = $query->where('Status_Group', '1');
		}
		if ($pro_id === '2'){
			$query = $query->where_in('Status_Group', array('1','2'));
		}
		$query = $query->get('sv_status')->result_array();
		echo json_encode($query);
	}

	public function ajax_customer()
	{
		$pro_id = $this->input->get('pro_id');	
		$query = $this->db;
		if ($pro_id === '1') {
			$query = $query->where('pro_id', '1');
		}
		if ($pro_id === '2'){
			$query = $query->where('pro_id', '2');
		}
		$query = $query->group_by('Regis_Name')->get('sv_register')->result_array();
		echo json_encode($query);
	}

	public function ajax_order_detail($id=false)
	{
		$query = $this->db
		->select('sv_register.*, sv_status.*, sv_user.*, DATE_FORMAT(sv_register.Regis_Pickupdate, "%d-%b-%Y") as Regis_Pickupdate ')
		->order_by('Regis_ID','DESC')
		->join('sv_user', 'sv_register.User_ID = sv_user.User_ID', 'left')
		->join('sv_status', 'sv_register.Status_ID = sv_status.Status_ID', 'left')
		->where('Regis_SubID', $id)
		->get('sv_register')->row_array();
		
		echo json_encode($query);
	}

}
