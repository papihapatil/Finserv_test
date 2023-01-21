<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();
     	$this->load->helper('url');
        $this->load->helper('url', 'form');
        $this->load->library('session');
		$this->load->model('Logincrud_model');
		$this->load->model('Customercrud_model');	
		$this->load->library('email');
	}
	
	public function index()
	{		
		if($this->session->userdata("USER_TYPE") == 'CUSTOMER'){
			redirect(base_url('index.php/customer'));	
		}else if($this->session->userdata("USER_TYPE") == 'DSA'){
			redirect(base_url('index.php/dsa'));	
		}else {
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['userType'] = "none";
			$data['age'] = '';
			 $site = $this->session->userdata("SITE");
			 
			 //echo "Site = ".$site;
			if($site == 'finaleap')
			{
				

			$data['error'] = 'You logged in Finaleap please logout from Finaleap by clicking <a target="_blank" href="https://finaleap.com/dsa/dsa/index.php/logout" > here </a>';
			}
			else{
				$data['error'] = '';
			}
			
			
			//$this->load->view('header', $data);
			$this->load->view('login', $data);
			//$this->load->view('footer');
		}
	}

	public function customer()
	{		
		$data['showNav'] = 0;
		$data['error'] = '';
		$data['userType'] = "none";
		$data['age'] = '';
		$data['error'] = '';
		//$this->load->view('header', $data);
		$this->load->view('customer/customer_otp_login', $data);
		//$this->load->view('footer');
	}

	public function verifyotp()
	{		
		$data['showNav'] = 0;
		$data['error'] = '';
		$data['userType'] = "none";
		$data['age'] = '';
		$data['error'] = '';
		//$this->load->view('header', $data);
		$this->load->view('customer/verifyotp', $data);
		//$this->load->view('footer');
	}

	public function verify_otp_action()
	{		
		$savedotp = $this->session->userdata('OTP');
		$email = $this->session->userdata('EMAIL');
		$otp = $this->input->post('otp');
		if($savedotp == $otp){
			$data = array('EMAIL' => $email);
			$res = $this->Logincrud_model->loginCustomer($data);
			if ($res == 1) {
				$this->session->set_userdata("USER_TYPE", "CUSTOMER");
				$response = array('status' => 1, 'message' => "Successfully Loggedin", 'path' => base_url('index.php/customer'));
				echo json_encode($response);
			}else if ($res == 11) {				
				$response = array('status' => 0, 'message' => "Invalid OTP entered or User not found.", 'path' => base_url('index.php'));
				echo json_encode($response);
			}
		}else{
			$response = array('status' => 0, 'message' => "Invalid OTP, please enter correct OTP which you received on your Mobile number / Email id", 'path' => base_url('index.php'));
			echo json_encode($response);
		}
	}	

	public function customer_login_action()
	{	
		
		$email = $this->input->post("email");
		$type = $this->input->post("type");

		$data = array('EMAIL' => $email);
		$res = $this->Logincrud_model->loginWithMobile($data);
		if($res){
			if($res == 1){
				$fourRandomDigit = rand(1000,9999);
				if($type == 'mobile'){			
					$this->sendsms($email, 'Your OTP for account creation is '.$fourRandomDigit);
				}else $this->sendEmail($email, $fourRandomDigit);

				$this->session->set_userdata('OTP', $fourRandomDigit);
				$this->session->set_userdata('EMAIL', $email);
				$this->session->set_userdata('TYPE', $type);
				$response = array('status' => 1, 'message' => "OTP sent on provided details.", 'path' => base_url('index.php/login/verifyotp'));
				echo json_encode($response);
			}else{
				$response = array('status' => 0, 'message' => "User not found in system with provided details.", 'path' => base_url('index.php'));
				echo json_encode($response);	
			}
		}else {
			$response = array('status' => 0, 'message' => "User not found in system with provided details.", 'path' => base_url('index.php'));
			echo json_encode($response);	
		}		
	}
/*
	public function logmein(){
		$this->load->helper('url'); 
		$email = $this->input->post("email");
		$mobile = $this->input->post("mobile");
		$userName = $email;
		if(empty($userName))$userName = $mobile;
		$data = array('EMAIL' => $userName, 'PASSWORD' => $this->input->post("pass"));
		$res = $this->Logincrud_model->login($data);
		
		
		
		$err_message = '';
		if ($res == 1) {
			$this->session->set_userdata("USER_TYPE", "CUSTOMER");
			//redirect(base_url('index.php/customer'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/customer'));
			echo json_encode($response);
		}else if ($res == 2) {
			$this->session->set_userdata("USER_TYPE", "DSA");
			//redirect(base_url('index.php/dsa'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/dsa'));
			echo json_encode($response);
		}
		else if ($res == 3) {
			$this->session->set_userdata("USER_TYPE", "Operations_user");
			//redirect(base_url('index.php/dsa'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Operations_user'));
			echo json_encode($response);
		}
		else if ($res == 8) {
			$this->session->set_userdata("USER_TYPE", "credit_manager_user");
			//redirect(base_url('index.php/dsa'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/credit_manager_user'));
			echo json_encode($response);
		}
		else if ($res == 6) {
			$this->session->set_userdata("USER_TYPE", "DSA_CSR");
			//redirect(base_url('index.php/csr'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/csr'));
			echo json_encode($response);
		}
		else if ($res == 9) {
			$this->session->set_userdata("USER_TYPE", "HR");
			//redirect(base_url('index.php/dsa'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/HR'));
			echo json_encode($response);
		}else if ($res == 7) {
			$this->session->set_userdata("USER_TYPE", "DSA_MANAGER");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/manager'));
			echo json_encode($response);
		}
		else if ($res == 4) {
			$this->session->set_userdata("USER_TYPE", "connector");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Connector'));
			echo json_encode($response);
		}
		else if ($res == 13) {
			$this->session->set_userdata("USER_TYPE", "branch_manager");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/BranchManager'));
			echo json_encode($response);
		}
		else if ($res == 14) {
			$this->session->set_userdata("USER_TYPE", "Relationship_Officer");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Relationship_Officer'));
			echo json_encode($response);
		}
		else if ($res == 15) {
			$this->session->set_userdata("USER_TYPE", "Cluster_Manager");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Cluster_Manager'));
			echo json_encode($response);
		}
		else if ($res == 18) {
			$this->session->set_userdata("USER_TYPE", "Legal");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Legal'));
			echo json_encode($response);
		}
		else if($res == 10 || $res == 11 || $res == 12){
			$err_message = 'Invalid Login Details';
			$response = array('status' => 0, 'message' => $err_message);
			echo json_encode($response);
		}	
	}

	*/
	
	public function logmein(){
		
		if($this->session->userdata('SITE') != 'finserv'){
         //   redirect(base_url('index.php/admin'));
        }
		
		$this->load->helper('url'); 
		$email = $this->input->post("email");
		$mobile = $this->input->post("mobile");
		$userName = $email;
		if(empty($userName))$userName = $mobile;
		$data = array('EMAIL' => $userName, 'PASSWORD' => $this->input->post("pass"));
		$res = $this->Logincrud_model->login($data);
		
		$login_user_all_data = $this->Logincrud_model->login_user_all_data($data);

	    $date_= $login_user_all_data->last_pass_updated_at;
		//echo $login_user_all_data->CREATED_AT;
		$date1=date_create($date_);
		$date2=date_create(date("Y-m-d"));
		$diff=date_diff($date1,$date2);
		$days=$diff->format("%a"); 
	
		//echo $res;
		$err_message = '';
		if ($res == 1) {
			$this->session->set_userdata("USER_TYPE", "CUSTOMER");
				if($days>=30 || $date_ == NULL || $date_ == '')
		{
			
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
	    else
		{
		
			//redirect(base_url('index.php/customer'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/customer'));
			echo json_encode($response);
		}
		}else if ($res == 2) {
			$this->session->set_userdata("USER_TYPE", "DSA");
				if($days>=30 || $date_ == null || $date_ == '')
		{
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
	    else
		{
			//redirect(base_url('index.php/dsa'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/dsa'));
			echo json_encode($response);
		}
		}
		else if ($res == 3) {
			$this->session->set_userdata("USER_TYPE", "Operations_user");
			//redirect(base_url('index.php/dsa'));
				if($days>=30 || $date_ == null || $date_ == '')
		{
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
	    else
		{
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Operations_user'));
			echo json_encode($response);
		}
		}
		else if ($res == 8) {
			$this->session->set_userdata("USER_TYPE", "credit_manager_user");
			//redirect(base_url('index.php/dsa'));
				if($days>=30 || $date_ == null || $date_ == '')
		{
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
	    else
		{
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/credit_manager_user'));
			echo json_encode($response);
		}
		}
		else if ($res == 6) {
			$this->session->set_userdata("USER_TYPE", "DSA_CSR");
			//redirect(base_url('index.php/csr'));
				if($days>=30 || $date_ == null || $date_ == '')
		{
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
	    else
		{
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/csr'));
			echo json_encode($response);
		}
		}
		else if ($res == 9) {
			$this->session->set_userdata("USER_TYPE", "HR");
			//redirect(base_url('index.php/dsa'));
				if($days>=30 || $date_ == null || $date_ == '')
		{
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
	    else
		{
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/HR'));
			echo json_encode($response);
		}
		}else if ($res == 7) {
			$this->session->set_userdata("USER_TYPE", "DSA_MANAGER");
			//redirect(base_url('index.php/manager'));
				if($days>=30 || $date_ == null || $date_ == '')
		{
		
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
	    else
		{
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/manager'));
			echo json_encode($response);
		}
		}
		else if ($res == 4) {
			$this->session->set_userdata("USER_TYPE", "connector");
			//redirect(base_url('index.php/manager'));
				if($days>=30 || $date_ == null || $date_ == '')
		{
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
	    else
		{
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Connector'));
			echo json_encode($response);
		}
		}
		else if ($res == 13) {
			$this->session->set_userdata("USER_TYPE", "branch_manager");
			//redirect(base_url('index.php/manager'));
				if($days>=30 || $date_ == null || $date_ == '')
		{
			
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
	    else
		{
			
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/BranchManager'));
			echo json_encode($response);
		}
		}
		else if ($res == 14) {
			$this->session->set_userdata("USER_TYPE", "Relationship_Officer");
			//redirect(base_url('index.php/manager'));
				if($days>=30 || $date_ == null || $date_ == '')
		{
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
	    else
		{
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Relationship_Officer'));
			echo json_encode($response);
		}
		}
		else if ($res == 15) {
			$this->session->set_userdata("USER_TYPE", "Cluster_Manager");
			//redirect(base_url('index.php/manager'));
				if($days>=30 || $date_ == null || $date_ == '')
		{
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
	    else
		{
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Cluster_Manager'));
			echo json_encode($response);
		}
		}
		else if ($res == 16) {
			$this->session->set_userdata("USER_TYPE", "Area_Manager");
			//redirect(base_url('index.php/manager'));
				if($days>=30 || $date_ == null || $date_ == '')
		{
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
	    else
		{
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Cluster_Manager'));
			echo json_encode($response);
		}
		}
		else if ($res == 18) {

			$this->session->set_userdata("USER_TYPE", "Legal");
					if($days>=30 || $date_ == null || $date_ == '')
		{
			
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
	else
		{
			
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Legal'));
			echo json_encode($response);
		}
		}
		else if ($res == 19) {
			
			
					
					$this->session->set_userdata("USER_TYPE", "Technical");
					//redirect(base_url('index.php/manager'));
					$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Technical'));
					echo json_encode($response);
				
			}
		else if ($res == 20) {
			$this->session->set_userdata("USER_TYPE", "Support_Member");
			//redirect(base_url('index.php/manager'));

		
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Support_Member'));
			echo json_encode($response);
		
		}
			else if ($res == 21) {
			$this->session->set_userdata("USER_TYPE", "Sales_Manager");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Sales_Manager'));
			echo json_encode($response);
		}
		else if ($res == 22) {
			$this->session->set_userdata("USER_TYPE", "Account_Manager");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/accountant/offline_payments'));
			echo json_encode($response);
		}
			else if ($res == 23) {
			$this->session->set_userdata("USER_TYPE", "Cluster_credit_manager");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Cluster_credit_manager'));
			echo json_encode($response);
		}
		else if ($res == 24) {
			$this->session->set_userdata("USER_TYPE", "FI");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/FI'));
			echo json_encode($response);
		}
		else if ($res == 25) {
			$this->session->set_userdata("USER_TYPE", "RCU");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/RCU'));
			echo json_encode($response);
		}
			else if ($res == 26) {
			$this->session->set_userdata("USER_TYPE", "Disbursement_OPS");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Disbursement_OPS'));
			echo json_encode($response);
		}
		else if ($res == 17) {
			$this->session->set_userdata("USER_TYPE", "RegionalManager");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/RegionalManager'));
			echo json_encode($response);
		}
		else if ($res == 30) {
			$this->session->set_userdata("USER_TYPE", "MIS User");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/MIS_User'));
			echo json_encode($response);
		}
		else if ($res == 31) {
			$this->session->set_userdata("USER_TYPE", "Business_Head");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Business_Head_Controller'));
			echo json_encode($response);
		}
		else if ($res == 32) {
			$this->session->set_userdata("USER_TYPE", "Chief_Risk_Officer");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Chief_Risk_Officer'));
			echo json_encode($response);
		}
		else if($res == 10 || $res == 11 || $res == 12){
			$err_message = 'Invalid Login Details';
			$response = array('status' => 0, 'message' => $err_message);
			echo json_encode($response);
		}	
		/*else if ($res == 27) {
			$this->session->set_userdata("USER_TYPE", "retailer");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/retailers/managerequest'));
			echo json_encode($response);
		}*/
		/*else if ($res == 29) {
			$this->session->set_userdata("USER_TYPE", "distributor");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/distributor/addretailer'));
			echo json_encode($response);
		}*/
		
		/*else if ($res == 28) {
			$this->session->set_userdata("USER_TYPE", "supplychainmanager");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/distributor/addretailerall'));
			echo json_encode($response);
		}*/
		else if ($res == 28) {
		$this->session->set_userdata("USER_TYPE", "supplychainmanager");
			//redirect(base_url('index.php/dsa'));
		if($days>=30 || $date_ == null || $date_ == '')
		{
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
		else
		{
			
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Supply_chain'));
			echo json_encode($response);
		}
	}
	else if ($res == 27) {
		$this->session->set_userdata("USER_TYPE", "retailer");
			//redirect(base_url('index.php/dsa'));
		if($days>=30 || $date_ == null || $date_ == '')
		{
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
		else
		{
			
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/retailers'));
			echo json_encode($response);
		}
	}
	else if ($res == 29) {
		$this->session->set_userdata("USER_TYPE", "distributor");
			//redirect(base_url('index.php/dsa'));
		if($days>=30 || $date_ == null || $date_ == '')
		{
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
		else
		{
			
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/distributor'));
			echo json_encode($response);
		}
	}
	else if ($res == 33) {
		$this->session->set_userdata("USER_TYPE", "SCF Operations User");
			//redirect(base_url('index.php/dsa'));
		if($days>=30 || $date_ == null || $date_ == '')
		{
			$data['error'] = '';	
		    $data['reset_pass'] = 'Your password is expired.Please reset the password.';
			$err_message='';
			//$this->load->view('login', $data);
			$data1['login_count']=0;
			$data1['last_pass_updated_at']=date("Y-m-d");
			$login_user_all_data = $this->Logincrud_model->reset_last_pass_updated_at($data,$data1);
			$response = array('status' => 2, 'message' =>  $data['reset_pass'], 'path' => base_url('index.php'));
			echo json_encode($response);
			//$data['error'] = '';
			
		}
		else
		{
			
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/SCF_Operations_User'));
			echo json_encode($response);
		}
		
	}
	else if ($res == 34) {
			$this->session->set_userdata("USER_TYPE", "Telecaller");
			//redirect(base_url('index.php/manager'));
			$response = array('status' => 1, 'message' => $err_message, 'path' => base_url('index.php/Telecaller'));
			echo json_encode($response);
		}
		
	}

	function sendsms($mobileno, $message){

	    $message = urlencode($message);
	    $sender = 'SEDEMO'; 
	    $apikey = '6mj40q3t7o89qz93cn0aytz8itxg6641';
	    $baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;

	    $url = $baseurl.'&sender='.$sender.'&to='.$mobileno.'&message='.$message;    
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_POST, false);
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $response = curl_exec($ch);
	    curl_close($ch);

	    // Use file get contents when CURL is not installed on server.
	    //echo $response;
	    if(!$response){
	        $response = file_get_contents($url);
	    }
	    
	}

	public function sendEmail($email, $code){
		$config['protocol']='smtp';
		/*$config['smtp_host']='smtp.zoho.in';
		$config['smtp_port']='465';
		$config['smtp_timeout']='30';
		$config['smtp_crypto']='ssl';
		//$config['smtp_user']='info@finaleap.com';
		//$config['smtp_pass']='skP37cnpCIq0';
		$config['smtp_user']='flconnect@finaleap.com';
            $config['smtp_pass']='iNF0SYS@589';*/
		 $config['protocol']=PROTOCOL;
		$config['smtp_host']=SMTP_HOST;
		$config['smtp_port']=SMTP_PORT;
		$config['smtp_timeout']=SMTP_TIMEOUT;
		$config['smtp_crypto']=SMTP_CRYPTO;
		$config['smtp_user']=SMTP_USER;
		$config['smtp_pass']=SMTP_PASS;
		$config['charset']=CHARSET;
		$config['newline']=NEWLINE;
		$config['wordwrap'] = WORDWRAP2;
		$config['mailtype'] = MAILTYPE;
		$from_email = FROM_EMAIL;
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		//$from_email = "info@finaleap.com";
		//$from_email = "infoflfinserv@finaleap.com";
		$this->email->from($from_email, 'Finaleap'); 
		$this->email->to($email);
		//$this->email->bcc('info@finaleap.com');
		$this->email->bcc('customercare@finaleap.com');
		$this->email->subject('Finaleap OTP for login'); 
		
		$this->email->message('Your Finaleap One Time Password (OTP) is : '.$code); 
				
		//Send mail 
		if($this->email->send()) {	
			
		}else{
			
		}
	}
	
}
?>