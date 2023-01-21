<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_Manager extends CI_Controller {

	public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
	     $this->load->library('upload');
		$this->load->helper(array('form', 'url'));
		$this->load->model('credit_manager_user_model');
		$this->load->model('Customercrud_model');
		$this->load->model('Dsacrud_model');
		$this->load->model('HR_model');
		$this->load->model('Admin_model');
        $this->load->model('Sales_Manager_model');

		$this->load->model('Operations_user_model');
        $this->load->library('email');
		
		if($this->session->userdata('SITE') != 'finserv'){
				
            redirect(base_url('index.php/login'));
        }
    }

	public function index()
	{
		//echo $this->session->userdata("USER_TYPE");
		//exit();
		if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['userType'] = "none";
			$this->load->view('header', $data);
			$this->load->view('login');
			
		}
		else{
		    if($this->session->userdata('login_count')==0)
			{
			 $this->session->set_flashdata('sucess','sucess');
		     redirect('dsa/reset_password');
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
			//$dashboard_data = $this->Dsacrud_model->getDashboardData($id);  
			$dashboard_data = $this->Admin_model->getDashboardData_sales($id); 
			$data['dashboard_data'] = $dashboard_data;
			$this->load->view('dashboard_header', $data);
			$this->load->view('sales_Manager/Dashboard', $data);
			}
			//$this->load->view('footer');
		}
	}
	
	public function changePassword()
	{
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$data['title']="Change Password";
		$this->load->view('header', $data);

		if($this->input->post('change_pass'))
		{
			$old_pass=$this->input->post('old_pass');
			$new_pass=$this->input->post('new_pass');
			$confirm_pass=$this->input->post('confirm_pass');
			$dsa_id=$this->session->userdata('id');
         
			$old_pass_1=md5($old_pass);
			$confirm_pass_2=md5($confirm_pass);
			
			$check_existing_password= $this->Dsacrud_model->check_old_passord($old_pass_1,$dsa_id);
			if(isset($check_existing_password))
			{
				
				$result = $this->Dsacrud_model->update_dsa_password($old_pass_1,$dsa_id,$confirm_pass_2);
				
				//$this->session->set_flashdata('success', 'Password Changed Successfully');
				$this->session->set_flashdata("result", 1);
				//$this->Create_lead();
				redirect("BranchManager/changePassword?ID=$dsa_id");
		
			}
			else
			{
				//$this->session->set_flashdata('error', 'Old password not found. Please try again');
				$this->session->set_flashdata("result", 0);
				redirect("BranchManager/changePassword?ID=$dsa_id");
				
			}
		}
		$this->load->view('BranchManager/changepassword');
	}
	public function customers(){
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
        	$id = $this->input->get('id');
			if($id == '')$id = $this->session->userdata('ID');
			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$userType2 = $this->input->get('userType2');
			$search_name="";
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");

			$filter = $this->input->get('s');
			if ($filter == '') {
				$filter = 'all';
				$search_name="";
			}
			if($filter == 'Complete_profile')
			{
				$filter ='Complete_profile';
				$search_name="";

			}
			if($filter == 'Incomplete_profile')
			{
				$filter ='Incomplete_profile';
				$search_name="";

			}
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			$customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date,$search_name);
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			//$this->load->view('header', $data);
            $find_coapplicants =$this->Dsacustomers_model->getCustomers_coapplicants($id);
			//echo $this->session->userdata('USER_TYPE');
			$arr['userType'] = $userType;
			$arr['customers'] = $customers;
			$arr['coapplicants']= $find_coapplicants;
			$arr['s'] = $filter;
			$this->load->view('BranchManager/customers_new', $arr);
		}
	}


	

	
}
?>