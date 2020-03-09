<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class delivery_order extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ( ! $this->session->has_userdata('Access')
			OR ! in_array($this->session->userdata('Access')['Acc_ID'],array('1','2')))
		{
			redirect();
		}
		$this->load->model('Delivery_order_model');
	}
	
	public function index()
	{
        // $this->load->view('_layouts/blank',$this->data);
        redirect('call_sheet');
	}

    public function create_delivery_order()
    {
        $this->form_validation->set_rules('Deli_Company','','required|max_length[150]');
		$this->form_validation->set_rules('Deli_Contact','','required|max_length[150]');
		$this->form_validation->set_rules('Deli_Address','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
            $post = $this->input->post();
            // $time = date('H:i:s');
            $post['Deli_Date'] = date('Y-m-d', strtotime($post['Deli_Date']));
            if ($Ref_no = $this->Delivery_order_model->create_delivery_order($post))
            {
                redirect('delivery_order/delivery_order_list/'.$Ref_no);
            }
        }

        $this->data['body'] = $this->load->view('delivery_order/form/create_delivery_order',$this->data, TRUE);
		$this->load->view('_layouts/blank',$this->data);
    }

    public function edit_delivery_order($ref_no=FALSE)
    {
        $this->form_validation->set_rules('Deli_Company','','required|max_length[150]');
		$this->form_validation->set_rules('Deli_Contact','','required|max_length[150]');
		$this->form_validation->set_rules('Deli_Address','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
            $post = $this->input->post();
            $post['Deli_Date'] = date('Y-m-d', strtotime($post['Deli_Date']));
            if ($this->Delivery_order_model->edit_call_sheet($post, $ref_no))
            {
                redirect('delivery_order/edit_delivery_order/'.$ref_no);
            }
        }

        $this->data['detail'] = $this->db->where('Deli_No', $ref_no)->get('do_delivery_order')->row_array();

        $this->data['body'] = $this->load->view('delivery_order/form/edit_delivery_order',$this->data, TRUE);
		$this->load->view('_layouts/blank',$this->data);
    } 

    public function view_delivery_order()
    {
        $this->data['detail'] = $this->db->order_by('Deli_No', 'DESC')->get('do_delivery_order')->result_array();

        $this->data['body'] = $this->load->view('delivery_order/table/table_view_delivery_order',$this->data, TRUE);
		$this->load->view('_layouts/blank',$this->data);
    }

    public function delivery_order_list($ref_no=FALSE)
    {
        $this->form_validation->set_rules('Dsub_Imei','','required|max_length[150]');
		$this->form_validation->set_rules('Dsub_Accessories','','required|max_length[150]');
		$this->form_validation->set_rules('Dsub_Description','','required|max_length[200]');
		if ($this->form_validation->run() == TRUE)
		{
            $post = $this->input->post();
            if ($this->Delivery_order_model->add_delivery_list($post, $ref_no))
            {
                redirect('delivery_order/delivery_order_list/'.$ref_no);
            }
        }
        $this->data['detail_list'] = $this->db->where('Deli_No', $ref_no)->get('do_sub_delivery')->result_array();
        $this->data['table_delivery_list'] = $this->load->view('delivery_order/table/table_view_delivery_order_list', $this->data, TRUE);

        $this->data['detail'] = $this->db->where('Deli_No', $ref_no)->get('do_delivery_order')->row_array();
        $this->data['body'] = $this->load->view('delivery_order/form/delivery_order_list',$this->data, TRUE);
		$this->load->view('_layouts/blank',$this->data);
    }

    public function delete_delivery_order()
    {
        $ref_no = $this->input->get('ref_no');
        $id = $this->input->get('id');
        if ($return = $this->Delivery_order_model->delete_delivery_list($ref_no, $id))
        {
            redirect('delivery_order/delivery_order_list/'.$ref_no);
        }
    }   
     
    public function pdf_delivery_order_list($ref_no=FALSE)
    {
        $this->data['detail'] = $this->db->where('Deli_No', $ref_no)->get('do_delivery_order')->row_array();
		$this->load->view('delivery_order/pdf/pdf_delivery_order',$this->data);
    }

    public function pdf_delivery_order_list_air($ref_no=FALSE)
    {
        $this->data['detail'] = $this->db->where('Deli_No', $ref_no)->get('do_delivery_order')->row_array();
		$this->load->view('delivery_order/pdf/pdf_delivery_order_air',$this->data);
    }


    


}
