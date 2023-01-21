<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csr extends CI_Controller {

	public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
		$this->load->library('session');
		$this->load->model('DsaCsr_model');
		$this->load->model('Dsacrud_model');

    }

    public function index()
	{
		if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['userType'] = "none";
			$this->load->view('header', $data);
			$this->load->view('login');
		}else{
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = "DSA_CSR";
			//$this->load->view('header', $data);
			$id = $this->session->userdata('ID');
			$profile_info = $this->Dsacrud_model->getProfileData($id);
			 if($profile_info->login_count==0)
			 {
				 $this->session->set_flashdata('sucess','sucess');
				//$this->reset_password();
				redirect('dsa/reset_password');
			 }
              else{
			$dashboard_data = $this->DsaCsr_model->getDashboardData($id);            
			$data['dashboard_data'] = $dashboard_data;

			$this->load->view('csr/dashboard_new', $data);
			//$this->load->view('footer');
			  }
		}
	}
}

?>