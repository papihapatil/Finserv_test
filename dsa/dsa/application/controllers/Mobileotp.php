<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobileotp extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Dsacrud_model');	
    }
	
	public function index(){		
		if($this->session->userdata("USER_TYPE") == 'CUSTOMER'){
			redirect(base_url('index.php/customer'));	
		}else if($this->session->userdata("USER_TYPE") == 'DSA'){
			redirect(base_url('index.php/dsa'));	
		}else {
			$mobile = $this->session->userdata('mobile');
			$this->load->helper('url');
			$data['showNav'] = 0;
			$data['userType'] = "none";
			$data['age'] = '';
			$data['mobile'] = $mobile;
			$data['error'] = 0;
			$this->load->view('header', $data);
			$this->load->view('mobileotp/mobileotp');		
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

	public function resendOtp(){
		$mobile = $this->session->userdata('mobile');
		$fourRandomDigit = rand(1000,9999);
		$this->session->set_userdata('OTP', $fourRandomDigit);
		$this->sendsms($mobile, 'Your OTP for account creation is '.$fourRandomDigit);
		$response = array('status' => 1, 'message' => 'New OTP successfully sent on this number '.$mobile);
		echo json_encode($response);
	}

	public function mobile_otp_verify(){
		$otp = $this->session->userdata('OTP');
		$rules = array(		        		        
		        array(
		                'field' => 'otp',
		                'label' => 'OTP',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => 'You must provide OTP.',
		                ),
		        )
		);

		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {			
			$mobile = $this->session->userdata('mobile');
            $this->load->helper('url');
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['userType'] = "none";
			$data['age'] = '';
			$data['mobile'] = $mobile;
			$this->load->view('header', $data);
			$this->load->view('mobileotp/mobileotp');
        } else {
        	if ($this->input->post('otp') != $otp) {			
				$mobile = $this->session->userdata('mobile');
	            $this->load->helper('url');
				$data['showNav'] = 0;
				$data['error'] = "WRONG OTP ENRETED";
				$data['userType'] = "none";
				$data['age'] = '';
				$data['mobile'] = $mobile;
				$this->load->view('header', $data);
				$this->load->view('mobileotp/mobileotp');
				return;	
			}

			$unique_code = $this->generateRandomString();
			$auth_token = $this->generateRandomString();
			$input_arr['MOBILE']=$this->session->userdata('mobile');
			$input_arr['EMAIL']=$this->session->userdata('email');
			$input_arr['PASSWORD']=md5($this->session->userdata('password')) ;
			$input_arr['FN']=$this->session->userdata('fn');
			$input_arr['LN']=$this->session->userdata('ln');
			$input_arr['AUTH_TOKEN']=$auth_token;
			$input_arr['UNIQUE_CODE']=$unique_code;
			if($this->session->userdata('userType') == 'DSA')$input_arr['ROLE']=2;
			else if($this->session->userdata('userType') == 'CUSTOMER')$input_arr['ROLE']=1;
			$user = $this->Dsacrud_model->register_screen_one($input_arr);
			if($user>0){				
				redirect(base_url());
			     /*$userType = $this->session->userdata('userType');				
	            if($userType == 'DSA'){
	            	$this->session->set_userdata("USER_TYPE", "DSA");
	            	redirect(base_url('index.php/dsa'));
	            }else if($userType == 'CUSTOMER'){
	            	$this->session->set_userdata("USER_TYPE", "CUSTOMER");
	            	redirect(base_url('index.php/customer'));
	            }*/
			}else if($user == -1 || $user == -2){
				$message = "Email id already using.";
				if($user == -2)$message = "Mobile number already using.";
				$mobile = $this->session->userdata('mobile');
	            $this->load->helper('url');
				$data['showNav'] = 0;
				$data['error'] = $message;
				$data['userType'] = "none";
				$data['age'] = '';
				$data['mobile'] = $mobile;
				$this->load->view('header', $data);
				$this->load->view('mobileotp/mobileotp');
			}else {
					echo "Insert error !";
			}			
        }
	}

	public function _wrongotp($val) {
	    $this->form_validation->set_message('_wrongotp', 'Wrong OTP entered');
	    return FALSE;
	}

	public function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}
?>