<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  public $data = array();
  // public $db_service;


  public function __construct()
  {
    parent::__construct();
    $query = $this->db
        ->where('User_Email', $this->session->userdata('User_Email'))
        ->where('User_Password', $this->session->userdata('User_Password'))
        ->get('sv_user')
        ->row_array();

    if (isset($query))
    {

      switch ($query['Status']) {
        case 'Admin':
					$query['Access'] = $this->db->where('Acc_ID', '1')->get('sv_access')->row_array();
          break;
        case 'Manager':
          $query['Access'] = $this->db->where('Acc_ID', '2')->get('sv_access')->row_array();
          break;
        case 'Technician':
					$query['Access'] = $this->db->where('Acc_ID', '3')->get('sv_access')->row_array();
          break;
        case 'Technician_Samsung':
					$query['Access'] = $this->db->where('Acc_ID', '5')->get('sv_access')->row_array();
          break;
        case 'Technician_Non_Samsung':
					$query['Access'] = $this->db->where('Acc_ID', '4')->get('sv_access')->row_array();
          break;

        default:
          $query['Access'] = $this->db->where('Acc_ID', '4')->get('sv_access')->row_array();
          break;
      }
    //   if ($query['Status'] == 'Admin')
		// 		{
		// 			$query['Access'] = $this->db->where('Acc_ID', '1')->get('sv_access')->row_array();
		// 		}
		// 		else if ($query['Status'] == 'Manager')
		// 		{
		// 			$query['Access'] = $this->db->where('Acc_ID', '2')->get('sv_access')->row_array();
		// 		}
		// 		else if ($query['Status'] == 'Technician')
		// 		{
		// 			$query['Access'] = $this->db->where('Acc_ID', '3')->get('sv_access')->row_array();
		// 		}
		// 		else if ($query['Status'] == 'Technician_Samsung'){
		// 			$query['Access'] = $this->db->where('Acc_ID', '5')->get('sv_access')->row_array();
		// 		}
		// 		else if ($query['Status'] == 'Technician_Non_Samsung'){
		// 			$query['Access'] = $this->db->where('Acc_ID', '4')->get('sv_access')->row_array();
		// 		}
    }

    $this->data['session'] = $query;
        
    // ตั้งค่าสำหรับการนำไปใช้แบบ relative path
    $base_url = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] === 'on')) ? 'https' : 'http';
    // $request_uri = explode('/',$_SERVER['REQUEST_URI']);
    $base_url = $base_url.'://'.$_SERVER['HTTP_HOST'];
    $base_url = strtr(rtrim($base_url, '/\\'),'/\\',DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
    $base_url = preg_replace('/(\/+)/','/',$base_url);

    define('BASE_URL', $base_url);
    define('BASE_PATH', realpath(__DIR__.'/..'));

    // define('ASSET_PATH', BASE_URL.'_assets/');

    // $this->data['session'] = $this->session->userdata();

    

    // $this->db_service = $this->load->database('service', TRUE);
  }

}
