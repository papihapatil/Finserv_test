<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class supplychainmanager extends CI_Controller {

	public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
		$this->load->library('session');
		$this->load->model('Dsacrud_model');
        $this->load->library('email');
		$this->load->model('Admin_model');
		$this->load->model('Operations_user_model');
		$this->load->model('Logincrud_model');	
		$this->load->model('Customercrud_model');	
		$this->load->model('Dsacustomers_model');
        $this->load->library('upload');	
		$this->load->model('common_model','common');
		$this->load->model('credit_manager_user_model');
		
		$this->load->model('Cron_model');
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
			
			if($this->session->userdata('login_count')==0)
			{
				$this->session->set_flashdata('sucess','sucess');
				$this->reset_password();
			}
			else{
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			//$this->load->view('header', $data);
			$id = $this->session->userdata('ID');
			$user_info= $this->Operations_user_model->getProfileData($id);
			 if(!empty($user_info))
			 {
				 if($user_info->MN!='')
				 {
					 $user_name=$user_info->FN." ".$user_info->LN;
				 }
				 else
				 {
					 $user_name=$user_info->FN." ".$user_info->LN;
				 }
			 }
			 else
			 {
				 $user_name='';
			 }
			$data['username'] =$user_name;
			
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$dashboard_data = $this->Dsacrud_model->getDashboardData($id);            
			$data['dashboard_data'] = $dashboard_data;
            $this->load->view('dashboard_header', $data);
			$this->load->view('dsa/dashboard_new', $data);
			//$this->load->view('footer');
			}
		}
	}
	public function reset_password()
	{
		$id = $this->session->userdata('ID');
		$data['type'] = $this->session->userdata("USER_TYPE");
		$data['id']=$id;
		$this->load->view('dsa/set_password',$data);
	}
}
?>