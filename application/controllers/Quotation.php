<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class quotation extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ( ! $this->session->has_userdata('Access')
			OR ! in_array($this->session->userdata('Access')['Acc_ID'],array('1','2')))
		{
			redirect();
		}
		// $this->db_service = $this->load->database('service', TRUE);
		$this->load->model('Quotation_model');
	}
	
	public function index()
	{
		$this->load->view('_layouts/blank',$this->data);
	}

	public function create_quotation()
	{   
		// dump_debug($session);
        $this->form_validation->set_rules('Quot_Customer','','required|max_length[150]');
		$this->form_validation->set_rules('Quot_Attention','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
			$post = $this->input->post();
			// เช็คว่า Group_Select มีค่าว่างหรือเปล่า
			if(!isset($post['Regis_SubID']))
			{
				$post['Regis_SubID'] = array('none');
			}
		
			// return กลับมา 3 เงื่อนไข 1. return เมื่ออัพเดทลงฐานข้อมูลแบบเลือก Group 3. อัพเดทไม่ได้ เนื่องจาก group ซ้ำกัน
			$return = $this->Quotation_model->Create_Group($post['Regis_SubID']);
			$post['Qfg_Group_ID'] = $return;

			unset($post['Regis_SubID']);

			// ไม่สามารถสร้าง Group ได้จึงต้องทำการแจ้งเตือนให้กด Save ใหม่
			if ($return == FALSE)
			{
				dump_debug('เลขซ้ำ');
			}
			// Insert ข้อมูลแบบมี Group
			else
			{
				if($return_ref = $this->Quotation_model->Create_Form_Quotation($post))
				{
					if ($return_ref != false)
					{
						redirect('quotation/create_quotation_detail/'.$return_ref);
					}else{
						// หมายเลขซ้ำ
					}
				}
			}
		}

		$this->data['ref_job'] = $this->db->where('Status_ID', '3')->order_by('Regis_SubID','DESC')->get('sv_register')->result_array();
		$this->data['body'] = $this->load->view('quotation/form/create_quotation',$this->data,TRUE);
		$this->load->view('_layouts/blank',$this->data);
	}

	public function test()
	{
		$this->load->view('quotation/pdf/test',$this->data);
	}

	public function edit_quotation($ref_no=FALSE)
	{
		$this->form_validation->set_rules('Quot_Customer','','required|max_length[150]');
		$this->form_validation->set_rules('Quot_Attention','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
			$checked = '0';

			$post = $this->input->post();
			// เช็คว่า Group_Select มีค่าว่างหรือเปล่า
			if(!isset($post['Regis_SubID']))
			{
				$post['Regis_SubID'] = array('none');
			}

			// function Check Group ว่่ามีการ update หรือไม่ จะย้ายไปใส่ ใน model ภายหลัง
			foreach ($post['Regis_SubID'] as $key => $value) {
				
				$check = $this->db->select('Regis_SubID')->where('Qfg_Group_ID', $post['Qfg_Group_ID'])->where('Regis_SubID', $value)->get('qt_form_group')->row_array();
				// echo $value;
				if ($check == '')
				{
					// dump_debug('Yes');
					$checked = '1';
				}
			}

			// Insert แบบไม่ Update Group
			if ($checked == '0')
			{
				unset($post['Regis_SubID']);
				$this->db->set($post)->where('Quot_No', $ref_no)->update('qt_quotation');
			}
			// Insert แบบอัพเดท Group
			else
			{
				if ($return = $this->Quotation_model->Update_Group($post['Regis_SubID'], $post['Qfg_Group_ID']))
				{
					unset($post['Regis_SubID']);
					$this->db->set($post)->where('Quot_No', $ref_no)->update('qt_quotation');

				}
			}

			redirect('quotation/create_quotation_detail/'.$ref_no);

			

			// dump_debug($post);
			

		}

		$this->data['ref_no'] = $this->db->where('Quot_No', $ref_no)->get('qt_quotation')->row_array();
		$this->data['ref_job'] = $this->db->where('Status_ID', '3')->order_by('Regis_SubID','DESC')->get('sv_register')->result_array();
		$this->data['body'] = $this->load->view('quotation/form/edit_quotation',$this->data,TRUE);
		$this->load->view('_layouts/blank',$this->data);		
	}

	public function delete_quotation_list()
	{
		$item_no = $this->input->get('item_no');
		$ref_no = $this->input->get('ref_no');
		if ($this->db->where('Qlist_ID', $item_no)->delete('qt_quotation_list'))
		{
			$post_array = array('Quot_No' => $ref_no);
			$this->Quotation_model->update_price_quotation($post_array);
			redirect('quotation/create_quotation_detail/'.$ref_no);
		}
		

	}

	public function create_quotation_detail($ref_no=FALSE)
	{

		$this->form_validation->set_rules('Qlist_Model','','required|max_length[150]');
		$this->form_validation->set_rules('Qlist_Imei','','required|max_length[150]');
		$this->form_validation->set_rules('Qlist_Symptom','','required|max_length[150]');
		$this->form_validation->set_rules('Qlist_Description','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
			$post = $this->input->post();
			// dump_debug($post);
			if ($return_list = $this->Quotation_model->add_quotation_list($post))
			{
				if ($return_update = $this->Quotation_model->update_price_quotation($post))
				{
					redirect('quotation/create_quotation_detail/'.$ref_no);
				}
			}

		}

		$quotation = $this->db->where('Quot_No', $ref_no)->get('qt_quotation')->row_array();
		$this->data['quotation'] = $quotation;

		$this->data['ref_job'] = $this->db->where('Qfg_Group_ID', $quotation['Qfg_Group_ID'])->order_by('Regis_SubID','DESC')->get('qt_form_group')->result_array();

		$this->data['body'] = $this->load->view('quotation/form/create_quotation_detail',$this->data,TRUE);
		$this->load->view('_layouts/blank',$this->data);
	}

	public function update_quotation_detail()
	{
		$id = $this->input->get('id');
		$type = $this->input->get('type');
		$value = $this->input->get('value');
		
		// echo $id;
		// echo $type;
		// echo $value;
		$this->db
		->set($type, $value)
		->where('Qlist_ID', $id)
		->update('qt_quotation_list');
		
		if ($type == 'Qlist_Qty' || $type == 'Qlist_Price')
		{
			$data = $this->db->where('Qlist_ID', $id)->get('qt_quotation_list')->row_array();
			$amount =(double) $data['Qlist_Price'] * $data['Qlist_Qty'];


			$this->db->set('Qlist_Amount', $amount)->where('Qlist_ID', $id)->update('qt_quotation_list');
			// dump_debug($amount);
		}
			// echo 'OK';
	}


	public function create_commercial_term($ref_no=FALSE)
	{
		$this->form_validation->set_rules('Comm_Delivery','','required|max_length[150]');
		$this->form_validation->set_rules('Comm_Payment','','required|max_length[150]');
		$this->form_validation->set_rules('Comm_Validity','','required|max_length[150]');
		$this->form_validation->set_rules('Comm_Warranty','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
			$post = $this->input->post();
			$post['Quot_No'] = $ref_no;
			if ($post['Status'] == 'create')
			{
				unset($post['Status']);
				dump_debug('Create');
				$return_success = $this->Quotation_model->Create_Commercial_term($post);
			}
			if ($post['Status'] == 'edit')
			{
				unset($post['Status']);
				$return_success = $this->Quotation_model->Edit_Commercial_term($post);
				dump_debug('edit');

			}
			// if ($return_success = $this->Quotation_model->Create_Commercial_term($post))
			// {
				// }
			redirect('quotation/view_detail_quotation/'.$ref_no);
		}
		$this->data['comm'] = $this->db->where('Quot_No', $ref_no)->get('qt_commercial')->row_array();
		$this->data['ref_no'] = $this->db->where('Quot_No', $ref_no)->get('qt_quotation')->row_array();

		$this->data['body'] = $this->load->view('quotation/form/create_commercial_term',$this->data,TRUE);
		$this->load->view('_layouts/blank',$this->data);
	}

	public function view_detail_quotation($ref_no=FALSE)
	{
		$this->form_validation->set_rules('Quot_Remark','','required');
		if ($this->form_validation->run() == TRUE)
		{
			$post = $this->input->post();
			$this->db->where('Quot_No', $ref_no)->set($post)->update('qt_quotation');
		}


		$array_refno = array('Quot_No' => $ref_no);
		$this->Quotation_model->update_price_quotation($array_refno);


		$quotation = $this->db->where('Quot_No', $ref_no)->get('qt_quotation')->row_array();
		$this->data['quotation'] = $quotation;
		$this->data['ref_job'] = $this->db->where('Qfg_Group_ID', $quotation['Qfg_Group_ID'])->order_by('Regis_SubID','DESC')->get('qt_form_group')->result_array();
		$this->data['comm'] = $this->db->where('Quot_No', $ref_no)->get('qt_commercial')->row_array();


		$this->data['body'] = $this->load->view('quotation/form/view_detail_quotation',$this->data,TRUE);
		$this->load->view('_layouts/blank',$this->data);
	}

	public function view_all_quotation()
	{
		$this->data['quot_no'] = $this->db->order_by('Quot_ID', 'DESC')->get('qt_quotation')->result_array();

		$this->data['body'] = $this->load->view('quotation/table/table_all_quotation',$this->data, TRUE);
		$this->load->view('_layouts/blank',$this->data);
	}

	public function pdf_quotation_customer_dtac($ref_no=FALSE)
	{

		$this->data['comm'] = $this->db->where('Quot_No', $ref_no)->get('qt_commercial')->row_array();
		$this->data['rs'] = $this->db->where('Quot_No', $ref_no)->get('qt_quotation')->row_array();
		$this->load->view('quotation/pdf/pdf_quotation_customer_dtac',$this->data);
		// $this->load->view('_layouts/blank',$this->data);
	}

	public function pdf_quotation_customer_general($ref_no=FALSE)
	{

		$this->data['comm'] = $this->db->where('Quot_No', $ref_no)->get('qt_commercial')->row_array();
		$this->data['rs'] = $this->db->where('Quot_No', $ref_no)->get('qt_quotation')->row_array();
		$this->load->view('quotation/pdf/pdf_quotation_customer_general',$this->data);
		// $this->load->view('_layouts/blank',$this->data);
	}

	public function pdf_quotation_dtac($ref_no=FALSE)
	{

		$this->data['comm'] = $this->db->where('Quot_No', $ref_no)->get('qt_commercial')->row_array();
		$this->data['rs'] = $this->db->where('Quot_No', $ref_no)->get('qt_quotation')->row_array();
		$this->load->view('quotation/pdf/pdf_quotation_dtac',$this->data);
		// $this->load->view('_layouts/blank',$this->data);
	}

	public function pdf_quotation_ais($ref_no=FALSE)
	{

		$this->data['comm'] = $this->db->where('Quot_No', $ref_no)->get('qt_commercial')->row_array();
		$this->data['rs'] = $this->db->where('Quot_No', $ref_no)->get('qt_quotation')->row_array();
		$this->load->view('quotation/pdf/pdf_quotation_ais',$this->data);
		// $this->load->view('_layouts/blank',$this->data);
	}

	public function pdf_quotation_very_smart($ref_no=FALSE)
	{

		$this->data['comm'] = $this->db->where('Quot_No', $ref_no)->get('qt_commercial')->row_array();
		$this->data['rs'] = $this->db->where('Quot_No', $ref_no)->get('qt_quotation')->row_array();
		$this->load->view('quotation/pdf/pdf_quotation_very_smart',$this->data);
		// $this->load->view('_layouts/blank',$this->data);
	}
	
	public function ajax_quotation_detail($no)
	{
		$data = $this->db
			->where('Quot_No', $no)
			// ->group_by('Qlist_Imei')
			->order_by('Qlist_ID', 'ASC')
			->get('qt_quotation_list')
			->result_array();

			echo json_encode($data);
	}

}
