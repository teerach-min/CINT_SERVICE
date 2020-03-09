<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ( ! $this->session->has_userdata('Access')
			OR ! in_array($this->session->userdata('Access')['Acc_ID'],array('1','2')))
		{
			redirect();
		}

		$this->load->model('Report_model');
		
	}

	public function index()
	{
		$this->load->view('_layouts/blank');
  	}
	
	public function report_invoice ()
	{
		$res = $this->db->limit(5000)->order_by('Wart_ID', 'desc')->get('sv_warranty')->result_array();
		$this->Report_model->report_invoice($res);

	}
	  
	public function report_quotation($view=FALSE)
	{
		if ($view != FALSE)
		{
			$Date_Range_Start = $this->input->get('start');
			$Date_Range_End = $this->input->get('end');
			$Form_Type = $this->input->get('form');

			if ($Form_Type == 'all')
			{
				$this->data['detail'] = $this->db->where('Quot_Create BETWEEN"'.$Date_Range_Start.'"And"'.$Date_Range_End.'"')
					->order_by('Quot_ID', 'DESC')
					->get('qt_quotation')
					->result_array();
			}
			else
			{
				$this->data['detail'] = $this->db->where('Quot_Create BETWEEN"'.$Date_Range_Start.'"And"'.$Date_Range_End.'"')
					->where('Quot_Format', $Form_Type)
					->order_by('Quot_ID', 'DESC')
					->get('qt_quotation')
					->result_array();
			}

			//Show Date Range
			$Date_Range_Start = date('d-M-Y',strtotime($Date_Range_Start));
			$Date_Range_End = date('d-M-Y',strtotime($Date_Range_End));
			$this->data['date_range'] = $Date_Range_Start.' To '.$Date_Range_End;
			$this->data['excel_export'] = $this->load->view('report/service_manager/report_quotation_excel',$this->data,TRUE);

			$this->data['table_export'] = $this->load->view('report/service_manager/report_quotation',$this->data,TRUE);
		}

		$this->form_validation->set_rules('Form_Type','','required|max_length[150]');
		$this->form_validation->set_rules('Date_Rage_Start','','required|max_length[150]');
		$this->form_validation->set_rules('Date_Rage_End','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
			$post = $this->input->post();
			redirect('report/report_quotation/views?start='.$post['Date_Rage_Start'].'&end='.$post['Date_Rage_End'].'&form='.$post['Form_Type'].'');
			// $post['Date_Rage_Start'] = date('Y-m-d',strtotime($post['Date_Rage_Start']."-1 days"));

		}
		
		$this->data['body'] = $this->load->view('report/service_manager/report_quotation_form',$this->data,TRUE);
		$this->load->view('_layouts/blank',$this->data);
		// $this->load->view('_layouts/blank',$this->data);
	}

  	public function report_job($view=FALSE)
	{
		if ($view != FALSE)
		{
			$get = $this->input->get();
			$status = array_merge(isset($get['statusAll']) ? $get['statusAll'] : array(), isset($get['statusNonSamsung']) ? $get['statusNonSamsung'] : array());
			$selectCall = $this->db->select('Regis_SubID')->where('Schange_Call', '1')->get('sv_change_status')->result_array();
			$query = $this->db;
			if (!empty($get['Date_Rage_Start'])){
				
				$query = $query->where('Regis_Date BETWEEN"'.$get['Date_Rage_Start'].'"And"'.$get['Date_Rage_End'].'"');
			}
			if ($get['Pro_ID'] !== '')
			{
				$query = $query->where('sv_register.Pro_ID', $get['Pro_ID']);
			}
			if (!empty($status))
			{
				$query = $query->where_in('sv_register.Status_ID', $status);
			}
			if (isset($get['Status']))
			{
				// Follower Job Call
				$arrayCall = [];
				foreach ($selectCall as $key => $value) {
					array_push($arrayCall, $value['Regis_SubID']);
				}
				if (!empty($arrayCall))
				{
					$query = $query->where_in('sv_register.Regis_SubID', $arrayCall);
				}else{
					$query = $query->where_in('sv_register.Regis_SubID', array('1'));

				}
			}
			$query = $query->order_by('Regis_ID','DESC')
			->join('sv_user', 'sv_register.User_ID = sv_user.User_ID')
			->join('sv_status', 'sv_register.Status_ID = sv_status.Status_ID')
			->get('sv_register')->result_array();

			$this->data['detail'] = $query;
			// dump_debug($Date_Range_Start);
			// dump_debug($Date_Range_End);
			//Show Date Range
			$Date_Range_Start = date('d-M-Y',strtotime($get['Date_Rage_Start']));
			$Date_Range_End = date('d-M-Y',strtotime($get['Date_Rage_End']));
			$this->data['date_range'] = $Date_Range_Start.' To '.$Date_Range_End;
			$this->data['excel_export'] = $this->load->view('report/service_manager/report_job_excel',$this->data,TRUE);

			$this->data['table_export'] = $this->load->view('report/service_manager/report_job',$this->data,TRUE);
		}

		// $this->form_validation->set_rules($this->input->get('Date_Rage_Start'),'','required|max_length[150]');
		// $this->form_validation->set_rules('Date_Rage_End','','required|max_length[150]');
		// $this->form_validation->set_data($this->input->get());
		$this->data['body'] = $this->load->view('report/service_manager/report_job_form',$this->data,TRUE);

		$this->load->view('_layouts/blank',$this->data);
	}

	public function report_delivery($view=FALSE)
	{
		if ($view != FALSE)
		{
			$Date_Range_Start = $this->input->get('start');
			$Date_Range_End = $this->input->get('end');
			$this->data['detail'] = $this->db->where('Deli_Date BETWEEN"'.$Date_Range_Start.'"And"'.$Date_Range_End.'"')
				->order_by('Deli_ID','DESC')
				->join('do_delivery_order', 'do_delivery_order.Deli_No = do_sub_delivery.Deli_No')
				->get('do_sub_delivery')->result_array();

			$Date_Range_Start = date('d-M-Y',strtotime($Date_Range_Start));
			$Date_Range_End = date('d-M-Y',strtotime($Date_Range_End));
			$this->data['date_range'] = $Date_Range_Start.' To '.$Date_Range_End;
			$this->data['excel_export'] = $this->load->view('report/service_manager/report_delivery_excel',$this->data,TRUE);

			$this->data['table_export'] = $this->load->view('report/service_manager/report_delivery',$this->data,TRUE);
		}

		$this->form_validation->set_rules('Date_Rage_Start','','required|max_length[150]');
		$this->form_validation->set_rules('Date_Rage_End','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
			$post = $this->input->post();
			redirect('report/report_delivery/views?start='.$post['Date_Rage_Start'].'&end='.$post['Date_Rage_End'].'');
		}
		$this->data['body'] = $this->load->view('report/service_manager/report_delivery_form',$this->data,TRUE);

		$this->load->view('_layouts/blank',$this->data);
	}
	
}
