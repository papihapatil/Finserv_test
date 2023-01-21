<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

	public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Managers_model');
		$this->load->model('Dsacrud_model');
        $this->load->model('Customercrud_model');
		$this->load->library('email');
		
		if($this->session->userdata('SITE') != 'finserv'){
				
            redirect(base_url('index.php/login'));
        }
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
			$data['userType'] = "DSA_MANAGER";
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
			

			$dashboard_data = $this->Managers_model->getDashboardData($id);            
			$data['dashboard_data'] = $dashboard_data;

			$this->load->view('manager/dashboard_new', $data);
			}
		}
	}

	public function managerprofile(){
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$this->load->view('header', $data);
		$this->load->view('manager/managerprofile');
	}
	public function Create_lead()
	{
		
				
		$id = $this->input->get('id');
		if($id == ''){
			$id = $this->session->userdata('ID');

		}
		$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			//$this->load->view('header', $data);
			$id = $this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$dashboard_data = $this->Dsacrud_model->getDashboardData($id);            
			$data['dashboard_data'] = $dashboard_data;
		$this->load->view('manager/Create_lead', $data);
	}
	public function add_new_lead ()
	{           
	            // require_once('./PHPExcel/Classes/PHPExcel.php');
				$MANAGER_ID=0;
				$CSR_ID=0;
				if ($this->session->userdata('USER_TYPE') == 'DSA_MANAGER') {
					$MANAGER_ID = $this->session->userdata('ID');
				}else if ($this->session->userdata('USER_TYPE') == 'DSA_CSR') {
					$CSR_ID= $this->session->userdata('ID');
					$MANAGER_ID= $this->Dsacrud_model->getManagerId($this->session->userdata('ID'));
				} 		
				if ($this->session->userdata('USER_TYPE') == 'DSA_MANAGER' || $this->session->userdata('USER_TYPE') == 'DSA_CSR') {
					$id=$this->session->userdata('ID');
					$DSA_ID = $this->Dsacrud_model->getDsaId($id);				
				}else if ($this->session->userdata('USER_TYPE') == 'ADMIN') {
					$DSA_ID  = 0;
				}
				else{
					$DSA_ID=$this->session->userdata('ID');
				}
				 $this->load->library('excel');
				  if(isset($_FILES["userfile"]["name"]))
					  {
					    $path = $_FILES["userfile"]["tmp_name"];
					    $path =$path[0];
					  
					    //$object = PHPExcel_IOFactory::load($path);
						$inputFileType = PHPExcel_IOFactory::identify($path);
						 $objReader = PHPExcel_IOFactory::createReader($inputFileType);
						 $objPHPExcel = $objReader->load($path);
						 $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
						
						 $i=0;
						 foreach ($allDataInSheet as $value) 
						 {
							if($i>0)
							{
							   $inserdata[$i]['first_name'] = $value['A'];
							   $inserdata[$i]['last_name'] = $value['B'];
							   $inserdata[$i]['address'] = $value['C'];
							   $inserdata[$i]['email'] = $value['D'];
							   $inserdata[$i]['mobile'] = $value['E'];
							   $inserdata[$i]['DSA_ID']=$DSA_ID;
							   $inserdata[$i]['MANAGER_ID']=$MANAGER_ID;
							   $inserdata[$i]['CSR_ID']=$CSR_ID;

							   $i++;
							}
							else
							{
								$i++;
							}
						 }
						 if(!empty($inserdata))
						 {
                          $result = $this->Dsacrud_model->importdata($inserdata);
						 }
						 else
						 {
							 $result=0;
						 }
						
						if($result > 0)
						{
							$this->session->set_flashdata("result", 1);
							$this->Create_lead();
						}
                        else	
						{
							$this->session->set_flashdata("result", 0);
							$this->Create_lead();
						}						
					  }
					 
	}
	public function View_Lead(){
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
        	$id = $this->input->get('id');
			if($id == '')$id = $this->session->userdata('ID');
			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$userType2 = $this->input->get('userType2');
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");

			$filter = $this->input->get('s');
			if ($filter == '') {
				$filter = 'all';
			}
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			$customers = $this->Dsacustomers_model->getLead($id, $filter, $userType, $userType2, $date);
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			//$this->load->view('header', $data);

			//echo $this->session->userdata('USER_TYPE');
			$arr['userType'] = $userType;
			$arr['customers'] = $customers;
			$arr['s'] = $filter;
			if($this->session->userdata('USER_TYPE') == 'DSA')$this->load->view('dsa/View_lead', $arr);
			else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER')$this->load->view('manager/View_lead', $arr);
			else if($this->session->userdata('USER_TYPE') == 'DSA_CSR')$this->load->view('csr/customers_new', $arr);
		}
	}
	public function Change_Contact_Status()
	{
		$DSA_ID = $this->session->userdata('ID');
		$id= $this->input->post('id');
		
		$this->load->model('Dsacustomers_model');
		$status=$this->input->post('status');
		if($status=='Convert to Customer')
		{
			$row=$this->Dsacustomers_model->leadinfo($id);
		    
			$email=$row->email;
			$mob=$row->mobile;
						$id_mobile_exist = $this->Customercrud_model->check_mobile($id, $mob);
						$id_email_exist = $this->Customercrud_model->check_email($id, $email);

			if($id_mobile_exist > 0)
			{
				
				
				$this->session->set_flashdata("result", 1);
				$this->session->set_flashdata("message",'Mobile number already in use' );
				//$this->View_Lead();
				  if($this->session->userdata('USER_TYPE') == 'DSA') redirect('dsa/View_Lead');
			      else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER') redirect('DSA_MANAGER/View_Lead');
			      else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
			}
			
		    else  if($id_email_exist > 0){
				$this->session->set_flashdata("result", 2);
				$this->session->set_flashdata("message",'Email id already in use' );
				//$this->View_Lead();
				  if($this->session->userdata('USER_TYPE') == 'DSA') redirect('dsa/View_Lead');
			      else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER') redirect('DSA_MANAGER/View_Lead');
			      else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
				
			}
			else
			{
				$rnd_password = $this->generateRandomString();
			    $unique_code = $this->generateRandomString();
			    $auth = $this->generateRandomString();
				$type ='customer';
				$array_input = array(
										'FN' => $row->first_name,
										'LN' => $row->last_name,
										'EMAIL' =>$row->email,
										'MOBILE' =>$row->mobile,
										'PASSWORD' =>md5($rnd_password),
										'UNIQUE_CODE' => $unique_code,
										'AUTH_TOKEN' => $auth,
										'ROLE' =>1,
										'DSA_ID' => $DSA_ID,
										'login_count'=>0
														
										);
					$result = $this->Dsacrud_model->register_screen_one($array_input);
					$fourRandomDigit=rand(1000,100000);
					if($result > 0){	
						   $login_details = "Login Credentials are : Email : ".$email." Password : ".$rnd_password;
						   $message_to_send='Thank you for your interest in Finaleap, Please Click On Link And Fill your details.'.$login_details;
						   $data=array('status'=>'Convert to Customer');
						    $this->Dsacrud_model->update_lead($row->id,$data);
						$this->sendsms($row->mobile,$message_to_send );
						$this->sendEmail($row->mobile, $row->email, $rnd_password, $type,$unique_code);
						$this->session->set_flashdata("result", 3);
				        $this->session->set_flashdata("message",'Customer entry created successfully and credentials has beed sent to customers email-id and mobile number' );
						if($this->session->userdata('USER_TYPE') == 'DSA') redirect('dsa/View_Lead');
						  else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER') redirect('DSA_MANAGER/View_Lead');
						  else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
						}
						else
						{
							$this->session->set_flashdata("result", 4);
							$this->session->set_flashdata("message",'Error in Save Customer Details' );
						    if($this->session->userdata('USER_TYPE') == 'DSA') redirect('dsa/View_Lead');
							else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER') redirect('DSA_MANAGER/View_Lead');
						    else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
						}
			}

			
		}
		else if($status=='Reject')
		{
			   $row=$this->Dsacustomers_model->leadinfo($id);
			   $data=array('status'=>'Reject');
			   $result=$this->Dsacrud_model->update_lead($row->id,$data);
			   if($result > 0)
			   {	
			      $this->session->set_flashdata("result", 5);
				  $this->session->set_flashdata("message",'Status Updated Sucessfully');
				 if($this->session->userdata('USER_TYPE') == 'DSA') redirect('dsa/View_Lead');
			      else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER') redirect('DSA_MANAGER/View_Lead');
			      else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
			   }
			   
		}
		else if($status=='Hold')
		{
			   $row=$this->Dsacustomers_model->leadinfo($id);
			   $data=array('status'=>'Hold');
			   $result=$this->Dsacrud_model->update_lead($row->id,$data);
			   if($result > 0)
			   {	
			      $this->session->set_flashdata("result", 5);
				  $this->session->set_flashdata("message",'Status Updated Sucessfully');
				 // redirect('manager/View_Lead')
				  if($this->session->userdata('USER_TYPE') == 'DSA') redirect('dsa/View_Lead');
			      else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER') redirect('DSA_MANAGER/View_Lead');
			      else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
			   }
			   
		}
		
        		
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
					//$response = array('status' => 1, 'message' => "OTP sent on provided details.", 'path' => base_url('index.php/Customer_mobile_otp/OTP'));
					 //echo json_encode($response);
					 //echo $response;
					// exit;
					
				}
				
			}
			public function sendEmail($mobile, $email, $password, $type, $unique_code){
		
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
		$this->email->subject('Finaleap Account Details'); 
		
		$login_details = "";
		if($type == 'dsa_rockers_agents_for_biss' || $type=='csr' || $type == 'manager'|| $type=='Operations_user')
		{
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
		    $this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
		}
		else if($type == 'customer')
		{
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/Newlogin'.$login_details); 
		}
		else if($type == 'customer_consent')
		{
		   
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/customer/customer_consent?ID='.base64_encode($unique_code)); 
		}
				
		//Send mail 
		if($this->email->send()) {	
			
		}else{
			
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