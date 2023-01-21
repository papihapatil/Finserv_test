<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newlogin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Dsacrud_model');
        $this->load->library('email');	
        $this->load->model('Customercrud_model');		
		$this->load->model('Logincrud_model');	
    }
	
	public function index(){		
		
			$mobile = $this->session->userdata('mobile');
			$this->load->helper('url');
			$data['showNav'] = 0;
			$data['userType'] = "none";
			$data['age'] = '';
			$data['mobile'] = $mobile;
			$data['error'] = '';
			//$this->load->view('header', $data);
			//$this->load->view('loginotp/loginotp',$data);		
			$this->load->view('loginotp/Choice',$data);	
		
	}
	public function login_by_otp()
	{
		$mobile = $this->session->userdata('mobile');
			$this->load->helper('url');
			$data['showNav'] = 0;
			$data['userType'] = "none";
			$data['age'] = '';
			$data['mobile'] = $mobile;
			$data['error'] = '';
			//$this->load->view('header', $data);
			//$this->load->view('loginotp/loginotp',$data);		
			$this->load->view('loginotp/loginotp',$data);	
	}
	public function logmein(){
		$this->load->helper('url'); 
		$email = $this->input->post("email");
		$mobile = $this->input->post("mobile");
		$type=$this->input->post("resiperchk");
		$userName = $email;
		$OTP=rand(1000,10000);
		$this->session->set_tempdata('OTP', $OTP, 600);
		$this->session->set_userdata('email',$email);
		$this->session->set_userdata('type',$type);
		
		
		
		if(empty($userName))$userName = $mobile;
		if($type=='on')
		{
			$message='Your one time login password for Finaleap is '.$OTP.'. This password will be valid for 10 min';
			$this->sendsms($email,$message);
		}
		else
		{
			$this->sendEmail($email,$OTP);
		}
		
		
	}
	
	public function OTP(){		
		
			$mobile = $this->session->userdata('email');
			$type= $this->session->userdata('type');
			$this->load->helper('url');
			$data['showNav'] = 0;
			$data['userType'] = "none";
			$data['age'] = '';
			$data['mobile'] = $mobile;
			$data['error'] = ' ';
			$data['type']=$type;
			$this->load->view('header', $data);
			$this->load->view('loginotp/mobile_email_otp');		
		
	}
	
	
	public function sendEmail($email, $password){
		$config['protocol']='smtp';
		/*$config['smtp_host']='smtp.zoho.in';
		$config['smtp_port']='465';
		$config['smtp_timeout']='30';
		$config['smtp_crypto']='ssl';
		$config['smtp_user']='infoflfinserv@finaleap.com';
		$config['smtp_pass']='qT@411039';*/
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
		
		//$from_email = "infoflfinserv@finaleap.com";
		$this->email->from($from_email, 'Finaleap'); 
		$this->email->to($email);
		$this->email->subject('Finaleap Account Details'); 
		
		
		//$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
		$this->email->message('Your one time login password for Finaleap is '.$password.'. This password will be valid for 10 min'); 
				
		//Send mail 
		if($this->email->send()) {	
			$response = array('status' => 1, 'message' => "OTP sent on provided details.", 'path' => base_url('index.php/Newlogin/OTP'));
		        echo json_encode($response);
		}else{
			
		}
	}

	function sendsms($mobileno, $message){

    $message = urlencode($message);
    $sender = 'FINALP'; 
    $apikey = '975cgeoe8x043trf759q7160r99060j02l';
    $baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;

    $url = $baseurl.'&sender='.$sender.'&to='.$mobileno.'&message='.$message;    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Use file get contents when CURL is not installed on server.
    if(!$response){
        $response = file_get_contents($url);
    }
	else
	{
		$response = array('status' => 1, 'message' => "OTP sent on provided details.", 'path' => base_url('index.php/Newlogin/OTP'));
		 echo json_encode($response);
	}
    
}

	public function resendOtp(){
		$type= $this->session->userdata('type');
		
		$mobile = $this->session->userdata('email');
		$OTP=rand(1000,10000);
		$this->session->set_tempdata('OTP', $OTP, 600);
		
		 if($type=='on')
		{
			$message='Your one time login password for Finaleap is '.$OTP.'. This password will be valid for 10 min';
			$this->sendsms($email,$mobile);
		}
		else
		{
			$this->sendEmail($mobile,$OTP);
		}
		$response = array('status' => 1, 'message' => 'New OTP successfully sent on this number '.$mobile);
		echo json_encode($response);
	    
	}

	public function mobile_otp_verify(){
		$otp = $this->session->userdata('OTP');
		$type=$this->session->userdata('type');
		$mobile = $this->session->userdata('email');
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
			$mobile = $this->session->userdata('email');
            $this->load->helper('url');
			$data['showNav'] = 0;
			$data['error'] = ' ';
			$data['userType'] = "none";
			$data['age'] = '';
			$data['mobile'] = $mobile;
			$data['type']=$type;
			$this->load->view('header', $data);
			$this->load->view('loginotp/mobile_email_otp');
        } else {
        	if ($this->input->post('otp') != $otp) {			
				$mobile = $this->session->userdata('email');
	            $this->load->helper('url');
				$data['showNav'] = 0;
				$data['error'] = "WRONG OTP ENRETED";
				$data['userType'] = "none";
				$data['age'] = '';
				$data['mobile'] = $mobile;
				$data['type']=$type;
				$this->load->view('header', $data);
				$this->load->view('loginotp/mobile_email_otp');
				return;	
			}
			else
			{
				$id=$this->Customercrud_model->select_ID($mobile);
			
				$this->session->set_userdata('ID',$id);
				$this->session->set_userdata('USER_TYPE','CUSTOMER');
				
				redirect( base_url('index.php/customer'));
				
			}

			
        }
	}
	public function Login_by_password()
	{
		$this->load->helper('url');
		$data['showNav'] = 0;
		$data['age'] = 0;
		$data['error'] = "";
		$data['userType'] = "none";
		$this->load->view('loginotp/set_password', $data);	
		
	}
	public function set_password()
	{
		/*$this->load->helper('url');
		$data['showNav'] = 0;
		$data['age'] = 0;
		$data['error'] = "";
		$data['userType'] = "none";
		$this->load->view('loginotp/loginotp',$data);	*/
		$email = $this->input->post('email');
		$this->session->set_userdata('email',$email);
		$cheak=$this->input->post('resiperchk');
		if($cheak=='on')
		{
			$type='mobile';
		}
		else
		{
			$type='email';
		}
		$this->session->set_userdata('type',$type);
		
		$response = array('status' => 1, 'message' => "OTP sent on provided details.", 'path' => base_url('index.php/Newlogin/setpassword'));
		 echo json_encode($response);
		
		
		
		
	}
	public function setpassword()
	{
		$email =$this->session->userdata('email');
		$type=$this->session->userdata('type');
		
		
		$id=$this->Customercrud_model->select_ID($email);
		
	    $this->load->helper('url');
		$data['showNav'] = 0;
		$data['age'] = 0;
		$data['error'] = "";
		$data['userType'] = "none";
		$data['id']=$id;
		$data['type']=$type;
		if($id!=NULL)
		{
		
            $this->load->view('loginotp/set_password_1',$data);
		}
		else
		{
		 	
		   			 $this->session->set_flashdata('error','Email Or Mobile Number Not Register');
			
			  redirect(base_url('index.php/Newlogin/Login_by_password'));
		}
				
		
		
		
		
	}
	function updatepassword(){
		$id = $this->session->userdata('email');
		$type = $this->input->post('type');
		$password = $this->input->post('pass');
		
		$res = $this->Logincrud_model->updatepassword($password, $id, $type);
		$res = $this->Logincrud_model->updatepasswordexpire($password, $id, $type);
		if($res){
			$response = array('status' => 1, 'message' => "Password updated successfully, please login using newly updated password.", 'path' => base_url('index.php/login'));
			echo json_encode($response);
		}else{
			$response = array('status' => 0, 'message' => "Unable to update password, please try again", 'path' => '');
			echo json_encode($response);
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