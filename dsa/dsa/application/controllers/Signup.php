<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {


	public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->helper('email');
        $this->load->library('session');
        $this->load->model('Customercrud_model');

    }
	//basic info email, password, fn, ln, mobile
	public function screen_one(){
		
		if($this->session->userdata("USER_TYPE") == 'CUSTOMER'){
			redirect(base_url('index.php/customer'));	
		}else if($this->session->userdata("USER_TYPE") == 'DSA'){
			redirect(base_url('index.php/dsa'));	
		}else{
			$this->load->helper('url');
			$data['showNav'] = 0;
			$data['age'] = '';
			$data['userType'] = "none";
			$this->load->view('header', $data);
			$this->load->view('signup/signup_screen_one');
		}			
	}

	public function screen_one_save(){

		if($this->session->userdata("USER_TYPE") == 'CUSTOMER'){
			redirect(base_url('index.php/customer'));	
		}else if($this->session->userdata("USER_TYPE") == 'DSA'){
			redirect(base_url('index.php/dsa'));	
		}
		
		
		$mobile = $this->input->post('mobile');
    	$email = $this->input->post('email');

    	$id_mobile_exist = $this->Customercrud_model->check_mobile('', $mobile);
		if($id_mobile_exist > 0){
			$response = array('status' => 0, 'message' => 'Mobile number already in use');
			echo json_encode($response);
			exit();
		}

		$id_email_exist = $this->Customercrud_model->check_email('', $email);
		if($id_email_exist > 0){
			$response = array('status' => 0, 'message' => 'Email-id already in use');
			echo json_encode($response);
			exit();
		}

    	$password = $this->input->post('pass');
    	$userType = $this->input->post('userType');
    	$fn = $this->input->post('fn');
    	$ln = $this->input->post('ln');
    	$signupData = array(
		        'mobile'  => $mobile,
		        'email'     => $email,
		        'fn' => $fn,
		        'ln' => $ln,
		        'userType' => $userType,
		        'password' => $password,
		);
    	$this->session->set_userdata($signupData);
        //redirect(base_url('index.php/mobileotp'));
		
		$fourRandomDigit = rand(1000,9999);
		$this->session->set_userdata('OTP', $fourRandomDigit);
		$this->sendsms($mobile, 'Your OTP for account creation is '.$fourRandomDigit);
		$response = array('status' => 1, 'message' => 'Successfully signed up');
		echo json_encode($response);
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
	}
}
?>