<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

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
	public function index()
	{
		$url = $this->input->get('url');
		$user = $this->input->get('code1');
		$pass = $this->input->get('encode');

		if ($user == '')
		{
			redirect('home/login');
		}
		else
		{
			$session = $this->db->where('User_Name', $user)->where('User_Password', $pass)->get('sv_user')->row_array();
			$this->session->set_userdata($session);
			// dump_debug('$session');
			redirect($url);
			$this->load->view('_layouts/blank');
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('User_Email','','required|max_length[150]');
		$this->form_validation->set_rules('User_Password','','required|max_length[150]');
		if ($this->form_validation->run() == TRUE)
		{
			$post = $this->input->post();
			// dump_debug('OK');
			$encode = base64_encode(base64_encode(base64_encode($post['User_Password'])));
			$select_login = $this->db->where('User_Email', $post['User_Email'])->where('User_Password', $encode)->get('sv_user')->row_array();
			
			if (isset($select_login))
			{
				// Query Cross to Access
				switch ($select_login['Status']) {
					case 'Admin':
						$select_login['Access'] = $this->db->where('Acc_ID', '1')->get('sv_access')->row_array();
					  break;
					case 'Manager':
					  	$select_login['Access'] = $this->db->where('Acc_ID', '2')->get('sv_access')->row_array();
					  break;
					case 'Technician':
						$select_login['Access'] = $this->db->where('Acc_ID', '3')->get('sv_access')->row_array();
					  break;
					case 'Technician_Samsung':
						$select_login['Access'] = $this->db->where('Acc_ID', '5')->get('sv_access')->row_array();
					  break;
					case 'Technician_Non_Samsung':
						$select_login['Access'] = $this->db->where('Acc_ID', '4')->get('sv_access')->row_array();
					  break;
					default:
					  $select_login['Access'] = $this->db->where('Acc_ID', '4')->get('sv_access')->row_array();
					  break;
				  }

				// Access Table DATABASE
				$this->session->set_userdata($select_login);
				
				if ($select_login['Access']['Acc_ID'] == '2' || $select_login['Access']['Acc_ID'] == '1')
				{
					redirect('service_manager');
				}
				else if ($select_login['Access']['Acc_ID'] == '5')
				{
					redirect('technician/view_job_samsung');
				}
				else if ($select_login['Access']['Acc_ID'] == '3' || $select_login['Access']['Acc_ID'] == '4')
				{
					redirect('non_samsung/view_job_nonsamsung');
				}
			
			
			}
			else
			{
				$this->data['message'] = 'Email or Password does not exist in the system.';
				
			}
		}

		$this->load->view('_layouts/login.php', $this->data);
	}

	public function return_old_web()
	{
		header("location:../../manageview.php");

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
	


}
