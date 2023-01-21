<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer_mobile_otp extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Dsacrud_model');
        $this->load->library('email');	
        $this->load->model('Customercrud_model');		
		$this->load->model('Logincrud_model');	
    $this->load->model('Dsacustomers_model');
	 $this->load->model('Operations_user_model');
	  $this->load->model('Admin_model');
	    $this->load->library('email');
	}
	
	public function index(){		
		
			 $mobile = $this->session->userdata('mobileno');
			//echo "<pre>";
			$mobile = $_SESSION['user_data']->mobileno;
			
			//echo "HO";
			
			//exit;
			$this->load->helper('url');
			$data['showNav'] = 0;
			$data['userType'] = "none";
			$data['age'] = '';
			$data['mobile'] = '';
			$data['error'] = '';
			$data['id']=$this->input->get("UID");
			
			$data['mobile'] = $mobile;
			//$this->load->view('header', $data);
			//$this->load->view('loginotp/loginotp',$data);		
			$this->load->view('customer_otp/loginotp',$data);
		
	}
	public function login_by_otp()
	{
		$mobile = $this->session->userdata('mobileno');
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
			$data['userType'] =$this->session->userdata("USER_TYPE");
			$data['age'] = '';
			$data['mobile'] = $mobile;
			$data['error'] = ' ';
			$data['type']=$type;
			$this->load->view('header', $data);
			$this->load->view('customer_otp/mobile_email_otp');		
		
	}
	
	
	public function sendEmail($email, $password){
		$config['protocol']='smtp';
		$config['smtp_host']='smtp-relay.sendinblue.com';
            $config['smtp_port']='587';
		$config['smtp_timeout']='30';
		$config['smtp_crypto']='tls';
		//$config['smtp_user']='info@finaleap.com';
		//$config['smtp_pass']='skP37cnpCIq0';
		//$config['smtp_user']='flconnect@finaleap.com';
        //$config['smtp_pass']='iNF0SYS@589';
        //$from_email = "flconnect@finaleap.com";
		$config['smtp_user']='flconnect@finaleap.com';
		$config['smtp_pass']='Qns9hEpIMJVwUFgZ'; 
		$from_email = "flconnect@finaleap.com"; 
		$config['charset']='utf-8';
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'text';
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		
		//$from_email = "info@finaleap.com";
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
		$response = array('status' => 1, 'message' => "OTP sent on provided details.", 'path' => base_url('index.php/Customer_mobile_otp/OTP'));
		 echo json_encode($response);
	}
    
}

	public function resendOtp(){
		$type= $this->session->userdata('type');
		
		$mobile = $this->session->userdata('email');
		$OTP=rand(1000,10000);
		$this->session->set_tempdata('OTP', $OTP, 1800);
		
		 if($type=='on')
		{
			$message='Your one time login password for Finaleap is '.$OTP.'. This password will be valid for 10 min';
			$this->sendsms($mobile,$message);
		}
		
		else
		{
			$this->sendEmail($mobile,$OTP);
		}
		/*$response = array('status' => 1, 'message' => 'New OTP successfully sent on this number '.$mobile);
		echo json_encode($response);*/
	    
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
			$this->load->view('customer_otp/mobile_email_otp');
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
				$this->load->view('customer_otp/mobile_email_otp');
				return;	
			}
			else
			{
				$id = $this->session->userdata("UID");
				
				 $array_input_more = array(
											'CUST_ID' => $id,
											'STATUS'=>('Aadhar E-sign complete'),
											'last_updated_date'=>date("Y/m/d")
											);
				$result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);

				 $array_input_more1 = array(
											'Application_completed_date'=>date("Y/m/d")
											);
							
				 $Result_id1 = $this->Customercrud_model->update_profile($id, $array_input_more1);


				 //---------------------------- send email -----------------------------------------
				 	$applicant_information = $this->Dsacustomers_model->get_all_customers($id);

                    //------------------------- find sourcing data------------------------------------

				 	$data_row = $this->Operations_user_model->getProfileData($id);
					//print_r($data_row);
					
					//exit;
				 	$DSA_ID=$data_row->DSA_ID;
					$MANAGER_ID=$data_row->MANAGER_ID;
					$CSR_ID=$data_row->CSR_ID;
			        $BM_ID=$data_row->BM_ID;
					$CM_ID=$data_row->CM_ID;
					$RO_ID=$data_row->RO_ID;
					$SM_ID=$data_row->SM_ID;
					if($DSA_ID!='NULL' && $DSA_ID!='' && $DSA_ID!='0')
						{
							$Sourcing_info= $this->Dsacrud_model->getProfileData($DSA_ID);
							$Sourcing_Type="DSA";
							$Sourcing_By="DSA";
							if(!empty($Sourcing_info))
							{
								if($Sourcing_info->MN!='')
								{
									$Sourcing_name=$Sourcing_info->FN." ".$Sourcing_info->MN." ".$Sourcing_info->LN;
								}
								else
								{
									$Sourcing_name=$Sourcing_info->FN."  ".$Sourcing_info->LN;
								}
								$Sourcing_city=$Sourcing_info->Location;
								$Sourcing_state=$Sourcing_info->STATE;
							}
							else
							{
								$Sourcing_name='';
								$Sourcing_city='';
								$Sourcing_state='';
							}
						}
					else if($MANAGER_ID!='NULL' && $MANAGER_ID!=''&& $MANAGER_ID!='0')
						{
							$Sourcing_Type="Manager";
							$Sourcing_By="Manager";
							$Sourcing_info= $this->Dsacrud_model->getProfileData($MANAGER_ID);
							if(!empty($Sourcing_info))
							{
								if($Sourcing_info->MN!='')
									{
										$Sourcing_name=$Sourcing_info->FN." ".$Sourcing_info->MN." ".$Sourcing_info->LN;
									}
									else
									{
										$Sourcing_name=$Sourcing_info->FN."  ".$Sourcing_info->LN;
									}
									$Sourcing_city=$Sourcing_info->Location;
								    $Sourcing_state=$Sourcing_info->STATE;
							}
						
							else
							{
								$Sourcing_name='';
								$Sourcing_city='';
								$Sourcing_state='';
							}
						}
					else if($CSR_ID!='NULL' && $CSR_ID!=''&& $CSR_ID!='0')
						{
							$Sourcing_Type="CSR";
							$Sourcing_By="CSR";
							$Sourcing_info= $this->Dsacrud_model->getProfileData($CSR_ID);
							if(!empty($Sourcing_info))
							{
								if($Sourcing_info->MN!='')
									{
										$Sourcing_name=$Sourcing_info->FN." ".$Sourcing_info->MN." ".$Sourcing_info->LN;
									}
									else
									{
										$Sourcing_name=$Sourcing_info->FN."  ".$Sourcing_info->LN;
									}
									$Sourcing_city=$Sourcing_info->Location;
								    $Sourcing_state=$Sourcing_info->STATE;
							}
							else
							{
								$Sourcing_name='';
								$Sourcing_city='';
								$Sourcing_state='';
							}
						}
					else if($BM_ID!='NULL' && $BM_ID!=''&& $BM_ID!='0')
						{
							$Sourcing_Type="Finaleap Sales";
							$Sourcing_By="Branch Manager";
							
							$Sourcing_info= $this->Dsacrud_model->getProfileData($BM_ID);
							
							if(!empty($Sourcing_info))
							{
								if($Sourcing_info->MN!='')
									{
										$Sourcing_name=$Sourcing_info->FN." ".$Sourcing_info->MN." ".$Sourcing_info->LN;
									}
									else
									{
										$Sourcing_name=$Sourcing_info->FN."  ".$Sourcing_info->LN;
									}
									 $Sourcing_city=$Sourcing_info->Location;
								    $Sourcing_state=$Sourcing_info->STATE;
								
							}
							else
							{
								$Sourcing_name='';
								$Sourcing_city='';
								$Sourcing_state='';
							}
						}
					else if($CM_ID!='NULL' && $CM_ID!='' && $CM_ID!='0')
						{
							$Sourcing_Type="Finaleap Sales";
							$Sourcing_By="Cluster Manager";
							
							$Sourcing_info= $this->Dsacrud_model->getProfileData($CM_ID);
							
							if(!empty($Sourcing_info))
							{
								if($Sourcing_info->MN!='')
									{
										$Sourcing_name=$Sourcing_info->FN." ".$Sourcing_info->MN." ".$Sourcing_info->LN;
									}
									else
									{
										$Sourcing_name=$Sourcing_info->FN."  ".$Sourcing_info->LN;
									}
									 $Sourcing_city=$Sourcing_info->Location;
								    $Sourcing_state=$Sourcing_info->STATE;
								
							}
							else
							{
								$Sourcing_name='';
								$Sourcing_city='';
								$Sourcing_state='';
							}
						}
					else if($RO_ID!='NULL' && $RO_ID!=''&& $RO_ID!='0')
						{
							$Sourcing_Type="Finaleap Sales";
							$Sourcing_By="Relationship Officer";
							$Sourcing_info= $this->Dsacrud_model->getProfileData($RO_ID);
							if(!empty($Sourcing_info))
							{
								if($Sourcing_info->MN!='')
									{
										$Sourcing_name=$Sourcing_info->FN." ".$Sourcing_info->MN." ".$Sourcing_info->LN;
									}
									else
									{
										$Sourcing_name=$Sourcing_info->FN."  ".$Sourcing_info->LN;
									}
									$Sourcing_city=$Sourcing_info->Location;
								    $Sourcing_state=$Sourcing_info->STATE;
							}
							else
							{
								$Sourcing_name='';
								$Sourcing_city='';
								$Sourcing_state='';
							}
						}
					else if($SELES_ID!='NULL' && $SELES_ID!=''&& $SELES_ID!='0')
						{
							$Sourcing_Type="Finaleap Sales";
							$Sourcing_By="SALES MANAGER";
							$Sourcing_info= $this->Dsacrud_model->getProfileData($SELES_ID);
							if(!empty($Sourcing_info))
							{
								if($Sourcing_info->MN!='')
									{
										$Sourcing_name=$Sourcing_info->FN." ".$Sourcing_info->MN." ".$Sourcing_info->LN;
									}
									else
									{
										$Sourcing_name=$Sourcing_info->FN."  ".$Sourcing_info->LN;
									}
									$Sourcing_city=$Sourcing_info->Location;
								    $Sourcing_state=$Sourcing_info->STATE;
							}
							else
							{
								$Sourcing_name='';
								$Sourcing_city='';
								$Sourcing_state='';
							}
						}
					else
						{
							$Sourcing_Type="Direct";
							$Sourcing_name='';
							$Sourcing_city='';
							$Sourcing_state='';
						}
					
				//-------------------------------------------------------------------------------
    				$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
					$bank_name=$this->Admin_model->get_corporate_Banks_by_id($data_appliedloan->bank_id);
					
				    $array = json_decode( json_encode($applicant_information),true);
					$Customer_name= $array[0]['FN']." ".$array[0]['LN'];
			        $data1=array(
						     'Application_ID'=>$data_appliedloan->Application_id,
							 'Name'=>$array[0]['FN']." ".$array[0]['LN'],
							 'Email'=>$array[0]['EMAIL'],
							 'CustomerStatus'=>$array[0]['STATUS'],
							 'CreatedDate'=>$array[0]['TIMESTAMP'],
							 'LastUpdatedDate'=>$array[0]['last_updated_date'],
							 'Sourcing_name'=>$Sourcing_name,
							 'Sourcing_By'=>$Sourcing_By,
							 'Sourcing_city'=>$Sourcing_city,
							 'bank_name'=>$bank_name->Bank_name
							 );
						 $data['data']=$data1;
						 
				   /* $this->sendEmail_lead($Email,$data2);*/
				    $config['protocol']='smtp';
					$config['smtp_host']='smtp-relay.sendinblue.com';
           			 $config['smtp_port']='587'; 
					$config['smtp_timeout']='30';
					$config['smtp_crypto']='tls';
					//$config['smtp_user']='info@finaleap.com';
					//$config['smtp_pass']='skP37cnpCIq0';
					//$config['smtp_user']='flconnect@finaleap.com';
                    //$config['smtp_pass']='iNF0SYS@589';
                    //$from_email = "flconnect@finaleap.com";
					$config['smtp_user']='flconnect@finaleap.com';
					$config['smtp_pass']='Qns9hEpIMJVwUFgZ'; 
					$from_email = "flconnect@finaleap.com"; 
					$config['charset']='utf-8';
					$config['newline']="\r\n";
					$config['wordwrap'] = TRUE;
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					$this->email->set_newline("\r\n");
					//$from_email = "info@finaleap.com";
					$this->email->from($from_email,'Finaleap'); 
				    $send_email_to_support='ganesh.saini@finaleap.com,dayanand.sake@finaleap.com,sandeep.belbhandare@finaleap.com,santosh.sant@finaleap.com,sachin.kardile@finaleap.com,arun.pawar@finaleap.com,rupali.more@finaleap.com';
					//$send_email_to_support ='priyanka.abdagire@finaleap.com';
					$this->email->to($send_email_to_support);
					//$this->email->subject('Testing by priyanka please ignore this email'); 
					
					$this->email->subject('Loan Application Submitted For customer : '.$Customer_name); 
					$mailContent = $this->load->view('templates/Email_after_aadhar_esigne',$data,true);
					//$mailContent='hiii';
					
					$this->email->message($mailContent); 
					$this->email->Send();
	    		
					$this->session->set_tempdata('Mobile_verification', 'sucess', 180);
					redirect(base_url('index.php/customer/Customer_loan_apply_sucess'));
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
		
		
		
		
		$this->load->view('loginotp/set_password_1',$data);	
				
		
		
		
		
	}
	function updatepassword(){
		$id = $this->session->userdata('email');
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
	public function set_count()
	{
		$count_resend=$this->input->post('count_resend');
		$_SESSION['Resend_count']=$count_resend+1;
		echo $_SESSION['Resend_count'];
	}
	public function unset_count()
	{
		$this->session->unset_userdata('Resend_count');
	} 	
}
?>