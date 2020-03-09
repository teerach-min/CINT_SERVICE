<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tracking_order extends MY_Controller {

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

    public function index ()
    {
        $this->data['body'] = $this->load->view('tracking_order/form/detail-tracking', $this->data, TRUE);
        $this->load->view('_layouts/blank', $this->data);
    }

	public function serach_tracking ()
	{
		$getData = $this->input->get();

		// Select Imei to Table list
		if (isset($getData['Regis_Imei']))
		{
			//  Query Status Tracking
			$imei = $this->db->where('Regis_Imei', $getData['Regis_Imei'])
					->join('sv_status', 'sv_status.Status_ID = sv_register.Status_ID')
					->order_by('Regis_Date', 'DESC')->get('sv_register')->result_array();

			$this->data['imei'] = $imei;


			// $this->data['delivery'] = $delivery;
			// dump_debug($delivery);
			// die();

			$this->data['viewDetail'] = $this->load->view('tracking_order/form/detail-tracking', $this->data, TRUE);

		}

        $this->data['body'] = $this->load->view('tracking_order/form/search-tracking', $this->data, TRUE);
		$this->load->view('_layouts/blank', $this->data);
	}

	public function ajax_tracking_order ($no)
	{
		$query['newjob'] = $this->db
							->select('sv_register.*, DATE_FORMAT(Regis_Date, "%d %b %Y") as Regis_Date')
							->where('Regis_SubID', $no)
							->get('sv_register')->row_array();

		// $query['assign'] = $this->db->where('Regis_SubID', $no)->get('sv_register')->row_array();
		$query['assign']['symptom'] = $this->db->select('sv_sub_symptom.SSymp_Name')->where('Regis_SubID', $no)
									->join('sv_sub_symptom', 'sv_sub_symptom.SSymp_ID = sv_symptom_job.SSymp_ID')
									->get('sv_symptom_job')
									->result_array();

		$query['assign']['status'] = $this->db->select('Schange_Remark, sv_user.*, DATE_FORMAT(Schange_Date_Create, "%d %b %Y") as Schange_Date_Create')
									->where('Regis_SubID', $no)
									->where('Schange_Assign', '1')
									->join('sv_user', 'sv_user.User_ID = sv_change_status.User_ID')
									->get('sv_change_status')->row_array();
		
		// $query['quotation'] = $this->db->where('Regis_SubID', $no)->get('sv_register')->row_array();
		$query['quotation']['status'] = $this->db->select('Schange_Remark, sv_user.*, DATE_FORMAT(Schange_Date_Create, "%d %b %Y") as Schange_Date_Create')
									->where('Regis_SubID', $no)
									->where('Schange_Quotation', '1')
									->join('sv_user', 'sv_user.User_ID = sv_change_status.User_ID')
									->get('sv_change_status')->row_array();

		$query['repaircomplete']['status'] = $this->db->select('Schange_Remark, sv_user.*, DATE_FORMAT(Schange_Date_Create, "%d %b %Y") as Schange_Date_Create')
									->where('Regis_SubID', $no)
									->where('Schange_Complete', '1')
									->join('sv_user', 'sv_user.User_ID = sv_change_status.User_ID')
									->get('sv_change_status')->row_array();

		// $query['closejob'] = $this->db->where('Regis_SubID', $no)->get('sv_register')->row_array();
		$query['closejob']['status'] = $this->db->select('Schange_Remark, sv_user.*, DATE_FORMAT(Schange_Date_Create, "%d %b %Y") as Schange_Date_Create')
									->where('Regis_SubID', $no)
									->where('Schange_Closejob', '1')
									->join('sv_user', 'sv_user.User_ID = sv_change_status.User_ID')
									->get('sv_change_status')->row_array();

		// Query Delivery Order
		$query['delivery'] = $this->db->select('do_sub_delivery.*, do_delivery_order.*, DATE_FORMAT(Deli_Date, "%d %b %Y") as Deli_Date')
								->like('Dsub_Imei', $query['newjob']['Regis_Imei'])
								->where('Deli_Date >=', $query['newjob']['Regis_Pickupdate'])
								->order_by('do_sub_delivery.Deli_No', 'DESC')
								->join('do_delivery_order', 'do_delivery_order.Deli_No = do_sub_delivery.Deli_No')
								->get('do_sub_delivery')->result_array();


		echo json_encode($query);
	}

}
	