<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ( ! $this->session->has_userdata('Access')
			OR ! in_array($this->session->userdata('Access')['Acc_ID'],array('1','2')))
		{
			redirect();
		}
        $this->load->model('Import_model');
	}
	
	public function index()
	{
        // $this->load->view('_layouts/blank',$this->data);
        redirect('import/import_IVD');
	}

    public function import_IVD()
    {

        $config['upload_path'] = './_assets/excel-import/import_IVD/';
        $config['allowed_types'] = 'xls|xlsx';
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            // dump_debug($error);
       
        }
        else
        {
            $data = $this->upload->data();
            if ($report = $this->Import_model->import_IVD($data))
            {
                
                // dump_debug($report);
                // $this->session->set_flashdata('report_excel', 'test');
                $this->data['report'] = $report;
                $title = "Import Invoice by K. ".$this->data['session']['User_FName'].' '.$this->data['session']['User_LName'];
                $date = date('y-m-d');
                $action = 'Import_Invoice';
                $post = 'No_Title='.$title.'&No_DateTime='.$date.'&No_Color=#03a9f3&No_Action='.$action.'&User_ID='.$this->data['session']['User_ID'];

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://api.databar.co.th/service/notification/add",
                    // CURLOPT_URL => "http://localhost:5000/service/notification/add",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => $post,
                    CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache"
                    ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);
                // redirect('import/import_IVD');
            }
            // dump_debug($data);
        }
        

       
        $this->data['body'] = $this->load->view('_import/form/form_import_IVD', $this->data, TRUE);
        $this->load->view('_layouts/blank',$this->data);
    }

    public function do_upload()
    {
           
    }


}
