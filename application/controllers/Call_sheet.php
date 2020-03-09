<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class call_sheet extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ( ! $this->session->has_userdata('Access')
			OR ! in_array($this->session->userdata('Access')['Acc_ID'],array('1','2')))
		{
			redirect();
		}
		$this->load->model('Callsheet_model');
	}
	
	public function index()
	{
        // $this->load->view('_layouts/blank',$this->data);
        redirect('call_sheet/view_call_sheet');
	}

    public function create_call_sheet()
    {
        $RegisSubID = $this->input->get('Regis_SubID');
        if ($RegisSubID !== null)
        {
            $this->data['form'] = $this->db->where('Regis_SubID', $RegisSubID)->get('sv_register')->row_array();
        }
        // dump_debug($RegisSubID);
        // if ()
        $this->form_validation->set_rules('Call_Company','','required|max_length[150]');
		$this->form_validation->set_rules('Call_Address','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
            $post = $this->input->post();

            $time = date('H:i:s');
            $post['Call_DateTime'] = date('Y-m-d H:i:s', strtotime($post['Call_Datetime'].$time));
            if ($post['Call_No'] !== '')
            {
                // Create แบบมี Call_No อยู่แล้ว
                if ($Ref_no = $this->Callsheet_model->create_call_sheet_no($post))
                {
                    redirect('call_sheet/edit_call_sheet/'.$Ref_no);
                }
            }else{
                if ($Ref_no = $this->Callsheet_model->create_call_sheet($post))
                {
                    redirect('call_sheet/edit_call_sheet/'.$Ref_no);
                }
            }
            // $this->db->where()->get('sv_callsheet')->result_array();
        }
        $this->data['body'] = $this->load->view('call_sheet/form/create-callsheet',$this->data, TRUE);
        
		$this->load->view('_layouts/blank',$this->data);
    }

    public function edit_call_sheet($ref_no=FALSE)
    {
        $this->form_validation->set_rules('Call_Company','','required|max_length[150]');
		$this->form_validation->set_rules('Call_Address','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
            $post = $this->input->post();
            $time = date('H:i:s');
            $post['Call_DateTime'] = date('Y-m-d H:i:s', strtotime($post['Call_Datetime'].$time));
            if ($return = $this->Callsheet_model->edit_call_sheet($post, $ref_no))
            {
                redirect('call_sheet/view_call_sheet');
            }

        }

        $this->data['call'] = $this->db->where('Call_No', $ref_no)->get('sv_callsheet')->row_array();

        $this->data['body'] = $this->load->view('call_sheet/form/edit-callsheet',$this->data, TRUE);
		$this->load->view('_layouts/blank',$this->data);
        
    }

    public function view_call_sheet()
    {
        $this->data['detail'] = $this->db->order_by('Call_No', 'DESC')->get('sv_callsheet')->result_array();
        $this->data['body'] = $this->load->view('call_sheet/table/table_view_call_sheet',$this->data, TRUE);

		$this->load->view('_layouts/blank',$this->data);
    }

    public function pdf_call_sheet($ref_no=FALSE)
    {
        $this->data['detail'] = $this->db->where('Call_No', $ref_no)->get('sv_callsheet')->row_array();
        $this->data['body'] = $this->load->view('call_sheet/pdf/pdf_call_sheet',$this->data, TRUE);

		$this->load->view('_layouts/blank',$this->data);
    }


}
