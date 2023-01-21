<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forgotpassword extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Logincrud_model');	
		$this->load->library('email');

    }
	
	public function index()
	{
		$this->load->helper('url');
		$data['showNav'] = 0;
		$data['age'] = 0;
		$data['error'] = "";
		$data['userType'] = "none";
		$this->load->view('forgotpassword/forgotpassword', $data);		
	}

	public function password_reset()
	{

		$code = $this->input->get('code');
		if($code == ''){
			$this->load->view('forgotpassword/tokenexpired');
			return;	
		}

		$dataForgot = array('CODE' => $code);
		$res = $this->Logincrud_model->checkForgotPassEntry($dataForgot);
		
		if($res){
			if($res->CODE == $code){
				if($res->IS_EXPIRED == 0){
					$this->load->view('forgotpassword/tokenexpired');	
				}else{
					date_default_timezone_set('Asia/Kolkata');			
					$curentDate = date('Y-m-d H:i:s');
					$savedDate = $res->DATE_TIME;

					$savedDate = strtotime($savedDate);
					$curentDate = strtotime($curentDate);
					$datediff = $curentDate - $savedDate;

					$dateeDiffDay = round($datediff / (60 * 60 * 24));
					if($dateeDiffDay>=1){
						$this->load->view('forgotpassword/tokenexpired');	
					}else{
						$data['id'] = $res->EMAIL_MOBILE;
						$data['type'] = $res->TYPE;							
						$this->load->view('forgotpassword/resetpassword', $data);		
					}
				}					
			}else{
				$this->load->view('forgotpassword/tokenexpired');	
			}			
		}else if($code == ''){
			$this->load->view('forgotpassword/tokenexpired');	
		}
	}

	function verifyotp(){
		$this->load->view('forgotpassword/verifyotp');		
	}

	function updatepassword(){
		$id = $this->input->post('id');
		$type = $this->input->post('type');
		$password = $this->input->post('pass');
		$res = $this->Logincrud_model->updatepassword($password, $id, $type);
		$res = $this->Logincrud_model->updatepasswordexpire($password, $id, $type);
		if($res){
			$response = array('status' => 1, 'message' => "Password updated successfully, please login using newly updated password.", 'path' => base_url('index.php'));
			echo json_encode($response);
		}else{
			$response = array('status' => 0, 'message' => "Unable to update password, please try again", 'path' => '');
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

	public function verify_otp_action()
	{
		$savedotp = $this->session->userdata('OTP');
		$otp = $this->input->post('otp');
		//index.php/forgotpassword/password_reset?code='.$code
		if($savedotp == $otp){
			$response = array('status' => 1, 'message' => "", 'path' => base_url('index.php/forgotpassword/password_reset?code='.$otp));
			echo json_encode($response);
		}else{
			$response = array('status' => 0, 'message' => "Invalid OTP, please enter correct OTP which you received on your mobile number", 'path' => base_url('index.php'));
			echo json_encode($response);
		}
	}

	public function sendlink()
	{
		$email = $this->input->post('email');
		$type = $this->input->post('type');
		$data = array('EMAIL' => $email);
		$res = $this->Logincrud_model->loginWithMobile($data);
		if($res){
			if($res == 1){
				if($type == 'email'){
					
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
					$code = $this->generate_uuid();
					//$from_email = "infoflfinserv@finaleap.com";
					$this->email->from($from_email, 'Finaleap'); 
					$this->email->to($email);
					$this->email->subject('Finaleap password reset link'); 
					
					$this->email->message('Thanks for contacting regarding to forgot password, Click On Link And Reset Password: '.base_url().'index.php/forgotpassword/password_reset?code='.$code); 
							
					//Send mail 
					if($this->email->send()) {	
						date_default_timezone_set('Asia/Kolkata');
						$date = date('Y-m-d H:i:s');						
						$dataForgot = array('EMAIL_MOBILE' => $email, 'DATE_TIME'=>$date, 'CODE'=>$code, 'TYPE'=>$type);
						$res = $this->Logincrud_model->createForgotPasswordEntry($dataForgot);
								
						$response = array('status' => 1, 'message' => "Thanks for contacting regarding to forgot password, We have sent you link on given email id, please click on link and reset your new password.", 'path' => base_url('index.php'));
						echo json_encode($response);
					}else{
						echo $this->email->print_debugger();
						$response = array('status' => 0, 'message' => "Error sending emil", 'path' => base_url('index.php/forgotpassword'));
						echo json_encode($response);
					}
				}else if($type == 'mobile'){
					date_default_timezone_set('Asia/Kolkata');
					$date = date('Y-m-d H:i:s');
					$fourRandomDigit = rand(1000,9999);
					$dataForgot = array('EMAIL_MOBILE' => $email, 'DATE_TIME'=>$date, 'CODE'=>$fourRandomDigit, 'TYPE'=>$type);
					$res = $this->Logincrud_model->createForgotPasswordEntry($dataForgot);
			
					//$mobile = $this->input->get('mobile');
					
					$this->session->set_userdata('OTP', $fourRandomDigit);
					$this->sendsms($email, 'Your OTP for account creation is '.$fourRandomDigit);
					
					$response = array('status' => 1, 'message' => "Thanks for contacting regarding to forgot password, We have sent you an OTP on given mobile number.", 'path' => base_url('index.php/forgotpassword/verifyotp'));
					echo json_encode($response);	
				}else {
					$response = array('status' => 0, 'message' => "User not found in system with provided details.", 'path' => base_url('index.php/forgotpassword'));
					echo json_encode($response);	
				}											
			}else {
				$response = array('status' => 0, 'message' => "User not found in system with provided details.", 'path' => base_url('index.php/forgotpassword'));
				echo json_encode($response);	
			}
		}else{
			$response = array('status' => 0, 'message' => "User not found in system with provided details.", 'path' => base_url('index.php/forgotpassword'));
			echo json_encode($response);
		}
	}

	function generate_uuid() {
		return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
			mt_rand( 0, 0xffff ),
			mt_rand( 0, 0x0C2f ) | 0x4000,
			mt_rand( 0, 0x3fff ) | 0x8000,
			mt_rand( 0, 0x2Aff ), mt_rand( 0, 0xffD3 ), mt_rand( 0, 0xff4B )
		);
	
	}
}
?>