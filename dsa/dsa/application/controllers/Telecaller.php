<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 date_default_timezone_set("Asia/Kolkata");
class Telecaller extends CI_Controller {

	public function __construct() {
        parent:: __construct();
 
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
	     $this->load->library('upload');
		$this->load->helper(array('form', 'url'));
		$this->load->model('Operations_user_model');
		$this->load->model('credit_manager_user_model');
		$this->load->model('Customercrud_model');
		$this->load->model('Dsacrud_model');//Dsacustomers_model
		$this->load->model('Dsacustomers_model');
		$this->load->model('Admin_model');
        $this->load->library('email');
		$this->load->model('CustomerCrud_model');
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
				redirect('dsa/reset_password');
			}
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			//$this->load->view('header', $data);
			$id = $this->session->userdata('ID');
			//=====================added by priyanka===============
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
			$data['userID']=$user_info->UNIQUE_CODE;
            // ==========================================================
	
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$this->load->view('dashboard_header', $data);
			$this->load->view('Telecaller/Dashboard', $data);
			//$this->load->view('footer');
		}
	}
	
}
?>