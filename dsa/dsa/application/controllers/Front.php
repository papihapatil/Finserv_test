<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct() {
		parent:: __construct();

		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->model('common_model','common');
		$this->load->model('Customercrud_model');
		$this->load->library('email');	
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
		 $this->load->library('upload');
       $this->load->helper('file');

	}


	public function home(){

		$data['view'] = 'front/home';
		$this->load->view('front/layout',$data);

	}


	public function credit_bureau()
	{
	  
		unset($_SESSION['save_combined_credit_bureau']);
		unset($_SESSION['combined_credit_bureau']);
		$data['view'] = 'front/credit_bureau';
		$data['credit_buerau_price'] = $this->Admin_model->get_credit_buerau_price();
		$this->load->view('front/layout',$data);

	}
	public function aadhar_esign()
	{
	  

		$data['view'] = 'front/aadhar_esign';
		$data['aadhar_esign_price'] = $this->Admin_model->get_aadhar_esign_price();
		$this->load->view('front/layout',$data);

	}


	public function save_credit_bureau(){
		$uerdata=$this->session->userdata('userdata');
		
		$data = array(

			'fname' => $uerdata['fname'],
			'lname' => $uerdata['lname'],
			'gender' => $uerdata['gender'],
			'email' => $uerdata['email'],
			'mobile' => $uerdata['mobile'],
			'pan_number' =>$uerdata['pan_number'],
			'address1' =>$uerdata['address1'],
			'address2' => $uerdata['address2'],
			'address3' => $uerdata['address3'],
			'pincode' => $uerdata['pincode'],
			'state' => $uerdata['state'],
			'district' => $uerdata['district'],
			'city' => $uerdata['city'],
			'terms' => $uerdata['terms'],
			'dob'=> $uerdata['dob'],
			'verify_otp'=> $uerdata['verify_otp'],
			'created_date'=>$uerdata['created_date'],
			'Payment_id'=>$_SESSION['razorpay_payment_id']
		);
					
			$this->session->set_userdata("score", '');
			$filterArr = [];
		
		 
			    $email=$uerdata['email'];
				
				$filterArr['pan'] = $uerdata['pan_number'];
				$filterArr['email'] = $uerdata['email'];
				$filterArr['mobile'] =$uerdata['mobile'];
				$filterArr['first_name'] =$uerdata['fname']." ".$uerdata['lname'];
				$filterArr['last_name'] = $uerdata['lname'];
				$filterArr['address_line_1'] = $uerdata['address1'];
				$filterArr['address_line_2'] = $uerdata['address2'];
				$filterArr['locality'] = $uerdata['city'];
				$filterArr['city'] = $uerdata['city'];
				$filterArr['state'] =$uerdata['state'];
				$filterArr['postal_code'] = $uerdata['pincode'];
				$filterArr['dob'] =$uerdata['dob'];
				
				if($uerdata['gender']!=''){
					if($uerdata['gender'] == "male")$filterArr['gender'] = "M";
					else $filterArr['gender'] = "F";
				}else $filterArr['gender'] = "F";
			
			
			$stateAbbr = $this->Customercrud_model->getStateAbbr($filterArr['state']);
			if($stateAbbr)$filterArr['state'] = $stateAbbr->state_abbr;
			
			
			$name = "Mana rao";
			$url = 'https://ists.equifax.co.in/cir360service/cir360report';
				$dataInput = '{
					"RequestHeader": {
						"CustomerId": "7716",
						"UserId": "STS_FINALE",
						"Password": "W3#QeicsB",
						"MemberNumber": "027FP28332",
						"SecurityCode": "7AY",
						"CustRefField": "5000",
						"ProductCode": ["IDCR"]
					},
				"RequestBody": {
					"InquiryPurpose": "00",
					"TransactionAmount": "0",
					"FirstName": "'.$filterArr['first_name'].'",
					"MiddleName": "",
					"LastName": "'.$filterArr['last_name'].'",
					"InquiryAddresses": [{
						"seq": "1",
						"AddressLine1": "'.$filterArr['address_line_1'].'",
						"AddressLine2": "'.$filterArr['address_line_2'].'",
						"Locality": "'.$filterArr['city'].'",
						"City": "'.$filterArr['city'].'",
						"State": "'.$filterArr['state'].'",
						"AddressType": ["H"],
						"Postal": "'.$filterArr['postal_code'].'"
					}],
					"InquiryPhones": [{
						"seq": "1",
						"Number": "'.$filterArr['mobile'].'",
						"PhoneType": ["M"]
					}],
					"EmailAddresses": [{
						"seq": "1",
						"Email": "'.$filterArr['email'].'",
						"EmailType": ["O"]
					}],
					"IDDetails": [{
						"seq": "1",
						"IDValue": "'.$filterArr['pan'].'",
						"IDType": "T"
					}],
					"DOB": "'.$filterArr['dob'].'",
					"Gender": "'.$filterArr['gender'].'"
				},
				"Score": [{
					"Type": "ERS",
					"Version": "3.1"
				}]
			}';

			//echo $dataInput;
			$email=$uerdata['email'];
		            $mobile=$uerdata['mobile'];
		    $result =$this->common->check_cedit_details_sucess($email,$mobile);
			
			if( $result>0)
			{
				 $this->session->unset_userdata('userdata');	
				$this->session->set_flashdata('warning','You have Already pull Credit Bureau Sucessfully');
				redirect('front/credit_bureau');
			}
			else{
			
		
			
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $dataInput);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				$arr = curl_exec($ch);
				$respnse = $arr;
				curl_close($ch);
				
				
              
				$dataArr = json_decode($arr,true);
				/*echo '<pre>';
				print_r($dataArr);
			 
				exit;*/
				$credit_buerau_pull_chances = $this->Admin_model->get_credit_buerau_pull_chances();
				$code = $dataArr['InquiryResponseHeader']['SuccessCode'];
				if($code==0)
				{
					$email=$uerdata['email'];
		            $mobile=$uerdata['mobile'];
					$result =$this->common->check_cedit_details($email,$mobile);
					if($result>=$credit_buerau_pull_chances)
					{
						
						
						
						redirect('front/refund');
					}
					if($result>0)
					{
						
						$result =$this->common->get_credit_pull_count($email,$mobile);
						if($result>=$credit_buerau_pull_chances)
							{
								
								
								
								redirect('front/refund');
								
							}
							else
							{
								$data['credit_pull_count']=$result+1;
								$data['score_success'] = $dataArr['Error']['ErrorDesc'];
								
							
								
								$result = $this->common->update_credit_bureau($data);

								$email=$uerdata['email'];
								$mobile=$uerdata['mobile'];
								$payment_id= $this->common->get_payment_id($email,$mobile);
		                        $data_refund=array(
									   'refund'=>'Due For Refund'
									   );
								$result = $this->common->save_refund_details($data_refund,$payment_id);
								if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode']))
								{
									$error_code = $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'];
									 if($error_code == 'GSWDOE116')
									  {
										  $strpos = strpos( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ':');
										  $score_error = substr( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ($strpos+1));
										 
										  $this->session->set_flashdata('warning',$score_error);
									  }
								}
								else if($dataArr['Error']['ErrorCode'])
								{
									    $error_code =['Error']['ErrorCode'];
										if($error_code >='E0401' && $error_code<='E0420')
					                     {
										           $this->session->set_flashdata('warning','Something Wrong in your file');
										 }
										 else
										 {
											  $this->session->set_flashdata('warning',$dataArr['Error']['ErrorDesc']);
										 }
								}
									
								redirect('front/credit_bureau');
							}
						
						//redirect('front/refund');
					}
					else
					{
							$data['credit_pull_count']=1;
							
							$data['score_success'] = $dataArr['Error']['ErrorDesc'];
							$error_code = $dataArr['Error']['ErrorCode'];
							$result = $this->common->save_credit_bureau($data);
							$email=$uerdata['email'];
							$mobile=$uerdata['mobile'];
							$payment_id= $this->common->get_payment_id($email,$mobile);
		                    $data_refund=array(
									   'refund'=>'Due For Refund'
							);
							$result = $this->common->save_refund_details($data_refund,$payment_id);
							if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode']))
								{
									$error_code = $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'];
									 if($error_code == 'GSWDOE116')
									  {
										  $strpos = strpos( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ':');
										  $score_error = substr( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ($strpos+1));
										 
										  $this->session->set_flashdata('warning',$score_error);
									  }
								}
								else if($dataArr['Error']['ErrorCode'])
								{
									    $error_code =['Error']['ErrorCode'];
										if($error_code >='E0401' && $error_code<='E0420')
					                     {
										           $this->session->set_flashdata('warning','Something Wrong in your file');
										 }
										 else
										 {
											  $this->session->set_flashdata('warning',$dataArr['Error']['ErrorDesc']);
										 }
								}
							redirect('front/credit_bureau');
					}
				}
				else
				{
					$result =$this->common->get_credit_pull_count($email,$mobile);
					if($result>0)
					{
						
						
						$data['credit_pull_count']=$result+1;
						
							$email=$uerdata['email'];
							$mobile=$uerdata['mobile'];
							$result =$this->common->check_cedit_details($email,$mobile);
							
							if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']))
					        {
                               
								$error_code = $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'];
								if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc']=='Consumer not found in bureau')
								{
									//$this->session->set_flashdata('sucess_not_Found','Consumer not found in bureau');
									//$this->session->set_userdata('credit_score','0');
									   $data['score']=0;
										$data['score_success'] ='success';
										$data['response'] = $respnse;
										$result = $this->common->update_credit_bureau($data);
									   $credit_score=0;
									    $this->session->set_userdata('credit_score',$credit_score);
										$this->session->unset_userdata('userdata');
										$this->session->set_flashdata('sucess','Consumer not found in bureau');
										redirect('front/credit_bureau');
									
									
								}
								//redirect('front/credit_bureau');
							}
							else{
									$data['score']=$dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
									$data['score_success'] ='success';
									$data['response'] = $respnse;
									$result = $this->common->update_credit_bureau($data);
								/*if($result){

									$this->session->set_flashdata('sucess','sucess');
									
									redirect('front/credit_bureau');
									
								} else{
									$this->session->set_flashdata('sucess','warning');
									
									
									redirect('front/credit_bureau');
								}*/
								$this->pdf($dataArr,$email);
							}
						
						//redirect('front/refund');
					}
					else
					{
							$data['credit_pull_count']=1;
							$email=$uerdata['email'];
							$mobile=$uerdata['mobile'];
							$result =$this->common->check_cedit_details($email,$mobile);
							if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']))
					        {
								$result = $this->common->save_credit_bureau($data);
								$error_code = $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'];
								if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc']=='Consumer not found in bureau')
								{
									//$this->session->set_flashdata('sucess_not_Found','Consumer not found in bureau');
									//$this->session->set_userdata('credit_score','0');
                                        $data['score']=0;
										$data['score_success'] ='success';
										$data['response'] = $respnse;
                                         $result = $this->common->save_credit_bureau($data);
                                        $credit_score=0;
									    $this->session->set_userdata('credit_score',$credit_score);
										$this->session->unset_userdata('userdata');
										$this->session->set_flashdata('sucess','Consumer not found in bureau');
										redirect('front/credit_bureau');
								}
								//redirect('front/credit_bureau');
							}
							else{
							
								$data['score']=$dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
								$data['score_success'] ='success';
								$data['response'] = $respnse;
								$result = $this->common->save_credit_bureau($data);
							/*if($result){

								$this->session->set_flashdata('sucess','sucess');
								
								redirect('front/credit_bureau');
								
							} else{
								$this->session->set_flashdata('sucess','warning');
								
								
								redirect('front/credit_bureau');
							}*/
							$this->pdf($dataArr,$email);
							}
					}
				
					
						
				}
			}
				
		

		

		
    
	}
	

	public function get_address_by_pincode(){
		$data = file_get_contents("php://input");
		$data_obj = json_decode($data);
		
		$row = $this->Customercrud_model->get_address_by_pincode($data_obj->pincode);
		
		$response = array('status' => 1, 'data' => $row);
		echo json_encode($response);
	}


	public function pdf($respnse,$email){
	
	     $data['response']=$respnse;
		 if(isset($respnse['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ReportOrderNO'])){ $respnse_no=$respnse['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ReportOrderNO'];}
		
        include("./vendor/autoload.php");
		$mpdf = new \Mpdf\Mpdf([
			'setAutoTopMargin' => 'stretch',
			'autoMarginPadding' => 10,
			'orientation' => 'L'
		]);
		$arrContextOptions=array(
			"ssl"=>array(
				"verify_peer"=>false,
				"verify_peer_name"=>false,
			),
		);  
 $mpdf->curlAllowUnsafeSslRequests = true;
		$mpdf->SetHTMLHeader($this->load->view('pdf/header',$data,true));
		$mpdf->SetHTMLFooter($this->load->view('pdf/footer',[],true));
		$mpdf->SetDisplayMode('fullwidth');
		$mpdf->debug = true;
		$mpdf->AddPage();
		$stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
		$stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));

		
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->list_indent_first_level = 0;
		$html = $this->load->view('pdf/report_pdf',$data,true);
		$mpdf->WriteHTML($html);
		//$file_name=md5(rand()).'pdf';
        //$file=$mpdf->Output();
         //file_put_contents('report.pdf',$file);
		//$mpdf->Output('assets/report.pdf','F');
		//$mpdf->Output(base_url('index.php/assets/report.pdf'), 'F');
		$directoryName="./images/all_document_pdf/";
							if(!is_dir($directoryName))
							{
										mkdir($directoryName, 0755);
										file_put_contents($mpdf->Output('$respnse_no.pdf','F'));

							}
							else
							{
								$dir='./images/all_document_pdf/';    
								$filename= "$respnse_no.pdf";                                      
								 if(file_exists($dir.$filename))
								 {
									 unlink($dir.$filename);
									  $mpdf ->Output($dir.$filename,'F');
								 }
								 else
								 {
								   $mpdf ->Output($dir.$filename,'F');
								 }
							
							}

		$config['protocol']='smtp';
		/*$config['smtp_host']='smtp.zoho.in';
		$config['smtp_port']='465';
		$config['smtp_timeout']='30';
		$config['smtp_crypto']='ssl';
		$config['smtp_user']='infoflfinserv@finaleap.com';
		$config['smtp_pass']='qT@411039';*/
		$config['smtp_host']='smtp-relay.sendinblue.com';
        $config['smtp_port']='587';
        $config['smtp_crypto']='tls';
        $config['smtp_user']='flconnect@finaleap.com';
        $config['smtp_pass']='Qns9hEpIMJVwUFgZ'; 
		$config['charset']='utf-8';
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'text';
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$from_email = "infoflfinserv@finaleap.com";
		$this->email->from($from_email, 'Finaleap'); 
		$this->email->to($email);
		$this->email->subject('Credit Bureau Report'); 
		
		
		//$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
		$this->email->message('Credit Bureau Report');
		$dir='./images/all_document_pdf/'.$respnse_no.'.pdf';
		
        $this->email->attach('./images/all_document_pdf/'.$respnse_no.'.pdf');
		
				
		//Send mail 
		if($this->email->send()) {	
		
		                        $uerdata=$this->session->userdata('userdata');
		                        $email=$uerdata['email'];
								$mobile=$uerdata['mobile'];
								$payment_id= $this->common->get_payment_id($email,$mobile);
		                      $data=array(
									   'refund'=>'Not Applicable',
									   'email_send'=>'yes'
									   );
								$result = $this->common->save_refund_details($data,$payment_id);
		                        $credit_score=$respnse['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
							    $this->session->set_userdata('credit_score',$credit_score);
								
		                    	$this->session->unset_userdata('userdata');
								$this->session->set_flashdata('sucess','sucess');
								redirect('front/credit_bureau');
								
								
			
		}else{
				
				           $data=array(
									   'refund'=>'Not Applicable',
									   'email_send'=>'No'
									   );
							$result = $this->common->save_refund_details($data,$payment_id);
				        $this->session->unset_userdata('userdata');
			            $this->session->set_flashdata('warning','Something get wrong');
						redirect('front/credit_bureau');
							
			
		}
	
       
		exit();

	}
	public function mobile_otp(){		
	        		$userdata = array(

							'fname' => $this->input->post('fname'),
							'lname' => $this->input->post('lname'),
							'gender' => $this->input->post('gender'),
							'email' => $this->input->post('email'),
							'mobile' => $this->input->post('mobile'),
							'pan_number' => $this->input->post('pan'),
							'address1' => $this->input->post('address1'),
							'address2' => $this->input->post('address2'),
							'address3' => $this->input->post('address3'),
							'pincode' => $this->input->post('pincode'),
							'state' => $this->input->post('state'),
							'district' => $this->input->post('District'),
							'city' => $this->input->post('city'),
							'terms' => $this->input->post('cterms'),
							'dob'=>$this->input->post('dob')
						);
					
		    $this->session->set_userdata('userdata',$userdata);
			$mobile = $this->session->userdata('mobile');
			$this->load->helper('url');
			$data['showNav'] = 0;
			$data['userType'] = "none";
			$data['age'] = '';
			$data['mobile'] = '';
			$data['error'] = '';
			//$this->load->view('header', $data);
			//$this->load->view('loginotp/loginotp',$data);		
			$this->load->view('pdf/loginotp',$data);
		
	}
	public function logmein(){
		$this->load->helper('url'); 
		$email = $this->input->post("email");
		$mobile = $this->input->post("mobile");
		$type=$this->input->post("resiperchk");
		$userName = $email;
		
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
	 function verify_send_otp()
	 {
		  $mobileno=$this->input->post('mobileno');
		  $verify_send_otp=$this->common->verify_send_otp($mobileno);
		 $response = array('status' =>$verify_send_otp );
         echo json_encode($response);
	 }
	 function send_mail()
	 {
		  $razor_pay_id=$this->input->post('razor');
		  $email=$this->input->post('email');
		  $response=$this->common->get_referance_no($razor_pay_id);
		 
		  if($response)
		  {
			  $response=json_decode($response,true);
			  if($response['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ReportOrderNO'])
			  {
				  $respnse_no = $response['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ReportOrderNO'];

				  $dir='./images/all_document_pdf/';    
								$filename= "$respnse_no.pdf";                                      
								 if(file_exists($dir.$filename))
								 {
									 
									
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
										$this->email->subject('Credit Bureau Report'); 
										
										
										//$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
										$this->email->message('Credit Bureau Report');
										$dir='./images/all_document_pdf/'.$respnse_no.'.pdf';
										
										$this->email->attach('./images/all_document_pdf/'.$respnse_no.'.pdf');
										
											
										//Send mail 
										if($this->email->send()) 
										{	
										  
													
										       $response = array('status' =>1);
                                               echo json_encode($response);     
					                            $data=array(
														   'email_send'=>'yes',
														 //  'file_path'=>$filename
														   );
													$result = $this->common->save_refund_details($data,$razor_pay_id);	
										           
										    
										   
										}	
										else
										{
											 $response = array('status' =>0);
                                                echo json_encode($response);   
										}
										     
								 
								 }else{
								    $response = array('status' =>2);
                                    echo json_encode($response);   
								 }
				  
			  }else{
			  $response = array('status' =>3);
                echo json_encode($response);
			  }
		  }
	 }
	function sendsms(){
	    $mobileno=$this->input->post('mobileno');
		$OTP=rand(1000,10000);
		$this->session->set_tempdata('OTP', $OTP, 600);
		//echo $OTP; 
    $message='Your one time login password for Finaleap is '.$OTP.'. This password will be valid for 10 min';
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
		$response = array('status' => 1, 'message' => "OTP sent on provided details.", 'path' => base_url('index.php/front/OTP'));
		 echo json_encode($response);
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
			$this->load->view('pdf/mobile_email_otp');		
		
	}
	public function mobile_otp_verify(){
		$otp = $this->session->userdata('OTP');
		$otp_verify=$this->input->post('otp');
		if($otp == $otp_verify)
		{
			
			$response = array('status' => 1);
		     echo json_encode($response);
		}
		else
		{
			
			$response = array('status' => 0);
		     echo json_encode($response);
		}
		
	}
	public function resendOtp(){
		$mobileno=$this->input->post('mobileno');
		$OTP=rand(1000,10000);
		$this->session->set_tempdata('OTP', $OTP, 600);
		$message='Your one time login password for Finaleap is '.$OTP.'. This password will be valid for 10 min';
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
			
			$response = array('status' => 1, 'message' => "OTP sent on provided details.", 'path' => base_url('index.php/front/OTP'));
			 echo json_encode($response);
		}
	    
	}
	public function payment_getway()
	{
		
		$data['credit_buerau_price'] = $this->Admin_model->get_credit_buerau_price();
					
		
		$this->load->view('razorpay_api/pay',$data);
	}
	public function payment_getway_aadhar_esign()
	{
		$data['aadhar_esign_price'] = $this->Admin_model->get_aadhar_esign_price();
		$this->load->view('razorpay_api/pay',$data);
	}
	public function payment_getway_loan_application()
	{
		$data['id']=$this->input->get('UID');
		
		$userType = $this->session->userdata("USER_TYPE");
	
		if($userType=='DSA')
		{
          $data['loan_application_amount'] = 1;
		
		}
		else
		{
            $data['loan_application_amount'] = $this->Admin_model->get_loan_application_price();
		
		}
		$this->load->view('razorpay_api/pay',$data);
	}
	public function refund()
	{
		$uerdata=$this->session->userdata('userdata');
		$email=$uerdata['email'];
		$mobile=$uerdata['mobile'];
		$data['credit_buerau_pull_chances'] = $this->Admin_model->get_credit_buerau_pull_chances();
		$data['payment_id'] = $this->common->get_payment_id($email,$mobile);
		$data['refund_status']=$this->common->get_refund_status($email,$mobile);
		$this->load->view('razorpay_api/refund',$data);
	}
	public function verify_payment_getway()
	{
		
		$data['id']=$this->input->get('UID');
		
	   
		$this->load->view('razorpay_api/verify',$data);
	}
	public function save_payent_details()
	{
		$UID=$this->input->get('UID');

		//==============================================================
		if(isset($_SESSION["credit_score_without_application"]))
		{
		$credit_score_without_application= $_SESSION["credit_score_without_application"];
		}
		if(isset($_SESSION["combined_credit_bureau"]))
		{
			$combined_credit_bureau=$_SESSION["combined_credit_bureau"];
		}
		//=============================================================
		
			if(isset($this->session->userdata['userdata']['verify_otp']))
			{
				$verify_send_otp=$this->session->userdata['userdata']['verify_otp'];
			}
			//=========================================================================
			else if(isset($_SESSION["credit_score_without_application"]))
			{
				$verify_send_otp='';
			}
			//========================================================================
			else
			{
				$verify_send_otp='';
			}
		 $data = array(

			'order_id' => $_SESSION['razorpay_order_id'],
			'razorpay_payment_id' => $_SESSION['razorpay_payment_id'],
			'status' =>'success',
			'cemail' => $this->session->userdata['userdata']['email'],
			'cname' =>$this->session->userdata['userdata']['fname']." ".$this->session->userdata['userdata']['lname'],
			'cmob' =>$this->session->userdata['userdata']['mobile'],
			'created_date'=>date("Y/m/d"),
			'verify_send_otp'=>$verify_send_otp,
			
			
		);
		$result = $this->common->save_payment_details($data);
		
		if($result > 0)
		{
			if(isset($this->session->userdata['aadhar_esign']))
			{
					$this->save_aadhar_esign();	
			}
			else if(isset($this->session->userdata['loan_application']))
			{
				//redirect('customer/redirect_to_apply_for_loan?coapp_id=&UID='.$UID);
				//echo "in redirect('customer/redirect_to_apply_for_loan function";
			   // exit();
		      if(isset($credit_score_without_application))
			  {
				$this->save_credit_bureau_without_application();
			  }
			  else{
				redirect('customer/redirect_to_apply_for_loan?coapp_id=&UID='.$UID);  
			  }
				
			}
			else if(isset($combined_credit_bureau))
			{
				//echo "in save combined bureau function call";
				//exit();
			 $this->save_combined_credit_bureau();
			}
			//===============================================================================
			else if(isset($credit_score_without_application))
			{
				
		   //  echo "in save credit bureau function without application function";
			// exit();
				$this->save_credit_bureau_without_application();
			}
		
			//=================================================================================
			else
			{
			 $this->save_credit_bureau();
			}

				//=================================================================================
				
			
		}
	}
	
	public function save_refund_details()
	{
		
		$data=array(
		       'refund'=>'Refund Processed'
			   );
	    $result = $this->common->save_refund_details($data,$_SESSION['payment_id']);
		if($result)
		{
			$credit_buerau_pull_chances= $this->Admin_model->get_credit_buerau_pull_chances();
			$this->session->set_flashdata('warning','Sorry Something wrong in your file You have alredy tried '.$credit_buerau_pull_chances.' times. Your payment will be refund in your Account');
			redirect('front/refund');
		}
		
		
	}
	
	public function save_refund_fail_details()
	{
		
		$data=array(
		       'refund'=>'Refund Fail'
			   );
	    $result = $this->common->save_refund_details($data,$_SESSION['payment_id']);
		if($result)
		{
			$credit_buerau_pull_chances= $this->Admin_model->get_credit_buerau_pull_chances();
			$this->session->set_flashdata('warning','Sorry Something wrong in your file You have alredy tried '.$credit_buerau_pull_chances.' times.Your payment will be refund in your Account');
			redirect('front/refund');
		}
		
		
	}
	
	public function save_fail_payent_details()
	{
		 $data = array(

			'order_id' => $_SESSION['razorpay_order_id'],
			'razorpay_payment_id' => $_SESSION['razorpay_payment_id'],
			'status' =>'fail',
			'cemail' => $this->session->userdata['userdata']['email'],
			'cname' =>$this->session->userdata['userdata']['fname']." ".$this->session->userdata['userdata']['lname'],
			'cmob' =>$this->session->userdata['userdata']['mobile'],
			
		);
		$result = $this->common->save_payment_details($data);
		if($result > 0)
		{
			 $this->session->set_flashdata('warning','warning');
			 redirect('front/verify_payment_getway');
		}
	}
	public function check_payment_details()
	{
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$name= $this->input->post('fname')." ".$this->input->post('lname');
		//$result = $this->common->check_payment_details($email,$mobile,$name);

	    		
		$userdata = array(

							'fname' => $this->input->post('fname'),
							'lname' => $this->input->post('lname'),
							'gender' => $this->input->post('gender'),
							'email' => $this->input->post('email'),
							'mobile' => $this->input->post('mobile'),
							'pan_number' => $this->input->post('pan'),
							'address1' => $this->input->post('address1'),
							'address2' => $this->input->post('address2'),
							'address3' => $this->input->post('address3'),
							'pincode' => $this->input->post('pincode'),
							'state' => $this->input->post('state'),
							'district' => $this->input->post('District'),
							'city' => $this->input->post('city'),
							'terms' => $this->input->post('cterms'),
							'dob'=>$this->input->post('dob'),
							'verify_otp'=>$this->input->post('verify_otp_status'),
							'created_date'=>date("Y/m/d"),
						);
							$this->session->set_userdata('userdata',$userdata);

		$result = $this->common->check_payment_details($email,$mobile,$name);
		$result2 = $this->common->check_payment_details_condition_2($mobile,$name);
		$result3 = $this->common->check_payment_details_condition_3($email,$name);
		if($result>0)
		{
			// echo "one";
			 //exit;
			$payment_id = $this->common->get_payment_id_condition1($email,$mobile,$name);
			$_SESSION['razorpay_payment_id']=$payment_id;
			redirect('front/save_credit_bureau');
						
		}
		elseif($result2>0)
		{
			//echo "two";
			//exit;
			$payment_id = $this->common->get_payment_id_condition2($mobile,$name);
			$_SESSION['razorpay_payment_id']=$payment_id;
			redirect('front/save_credit_bureau');
		}
		elseif($result3>0)
		{
			//echo "three";
			//exit;
			$payment_id = $this->common->get_payment_id_condition3($email,$name);
			$_SESSION['razorpay_payment_id']=$payment_id;
			redirect('front/save_credit_bureau');
		}
		else
		{
			//echo "four";
			//exit;
			$this->session->set_userdata('check_payment',0);
			redirect('front/credit_bureau');
		}
		
	}
	public function check_payment_details_aadhar_esign()
	{
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$name=$this->input->post('fname')." ".$this->input->post('lname');
		$result = $this->common->check_payment_details($email,$mobile,$name);
	    		
		$userdata = array(

							'fname' => $this->input->post('fname'),
							'lname' => $this->input->post('lname'),
							'email' => $this->input->post('email'),
							'mobile' => $this->input->post('mobile'),
							'created_date'=>date("Y/m/d"),
							'verify_otp'=>$this->input->post('verify_otp_status'),
						);
	    $this->session->set_userdata('userdata',$userdata);
		$this->session->set_userdata('aadhar_esign','aadhar_esign');
     
	   
		 $count = count($_FILES['files']['name']);
		$files=array();
		  $dir='./images/all_document_pdf/';    
								$filename=$this->input->post('mobile');                                      
								 if(file_exists($dir.$filename))
								 {
									     
								 
										  
									delete_files($dir.$filename, true);
									
									   
										mkdir($dir.$filename,0755, TRUE);

										for($i=0; $i<$count; $i++)
										{
										 if(!empty($_FILES['files']['name'][$i]))
										 {
    
											  $_FILES['file']['name'] = $_FILES['files']['name'][$i];
											  $_FILES['file']['type'] = $_FILES['files']['type'][$i];
											  $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
											  $_FILES['file']['error'] = $_FILES['files']['error'][$i];
											  $_FILES['file']['size'] = $_FILES['files']['size'][$i];
									  
											  $config['upload_path'] = $dir.$filename; 
											  $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
											  $config['max_size'] = '5000';
											  $config['file_name'] = $_FILES['files']['name'][$i];
											 
											  $this->upload->initialize($config);
											  $this->upload->do_upload('file');
			                                   $upload_data = $this->upload->data();
									            // $this->upload->do_upload();
											 
											  }
										 }
								 
	                                 }
								 else
								 {
									
										  mkdir($dir.$filename,0755, TRUE);
										
									for($i=0; $i<$count; $i++)
									{
										 if(!empty($_FILES['files']['name'][$i]))
										 {
    
											  $_FILES['file']['name'] = $_FILES['files']['name'][$i];
											  $_FILES['file']['type'] = $_FILES['files']['type'][$i];
											  $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
											  $_FILES['file']['error'] = $_FILES['files']['error'][$i];
											  $_FILES['file']['size'] = $_FILES['files']['size'][$i];
									  
											  $config['upload_path'] = $dir.$filename; 
											  $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
											  $config['max_size'] = '5000';
											  $config['overwrite'] = 1;
											  $config['file_name'] = $_FILES['files']['name'][$i];
											 
											  $this->upload->initialize($config);
											  $this->upload->do_upload('file');
			                                   $upload_data = $this->upload->data();
									            // $this->upload->do_upload();
											 
											 }
									}
									
								 }
		
		
		$this->session->set_userdata('files',$files);
		if($result>0)
		{
			$payment_id = $this->common->get_payment_id($email,$mobile);
			$_SESSION['razorpay_payment_id']=$payment_id;
			
	        redirect('front/save_aadhar_esign');
					
						
		}
		else
		{
			
			$this->session->set_userdata('check_payment',0);
			redirect('front/aadhar_esign');
		}
		
	}
	public function auto_refund()
	{
		
			$result = $this->common->check_auto_refund();
				$data['response']=$result;
				
				$this->load->view('razorpay_api/auto_refund',$data);
			
		
	}
	public function save_auto_refund_details()
	{
		$payment_id=$_SESSION['payment_id'];
		$fail_refund_id=$_SESSION['fail_refund_id'];
			foreach($payment_id as $id)
			{
				$data=array(
					   'refund'=>'Refund Processed'
					   );
				$result = $this->common->save_refund_details($data,$id);
			}
			foreach($fail_refund_id as $id)
			{
				$data=array(
					   'refund'=>'Refund Fail'
					   );
				$result = $this->common->save_refund_details($data,$id);
			}
			
			     $response = array('status' => 1, 'message' => "Refund Money To all Customers");
                echo json_encode($response);
			
		
	}
	
	public function save_aadhar_esign()
	{
		$uerdata=$this->session->userdata('userdata');
	//	$files=$this->session->userdata('files');
		//$count=count($files);
		$email=$uerdata['email'];
		$mobile=$uerdata['mobile'];
		$data = array(

			'fname' => $uerdata['fname'],
			'lname' => $uerdata['lname'],
			'email' => $uerdata['email'],
			'mobile' => $uerdata['mobile'],
			'created_date'=>$uerdata['created_date'],
			'Payment_id'=>$_SESSION['razorpay_payment_id']
		);
		$id=$_SESSION['razorpay_payment_id'];
		$aadhar_pull_chances = $this->Admin_model->get_aadhar_pull_chances();
		$result =$this->common->check_aadhar_details_status($email,$mobile);
		if($result>0)
		{
											$this->session->unset_userdata('userdata');	
								            $this->session->set_flashdata('warning','Sorry You have alredy get E-sign doc');
								            redirect('front/aadhar_esign');
		}
		
		$result =$this->common->check_aadhar_details($email,$mobile);
		if($result>0)
					{
						
						$result =$this->common->get_aadhar_pull_count($email,$mobile);
						if($result>=$aadhar_pull_chances)
							{
								
								$this->session->unset_userdata('userdata');	
								$this->session->set_flashdata('warning','Sorry You have alredy tried '.$aadhar_pull_chances.' times.');
								redirect('front/aadhar_esign');
								
							}
							else
							{
								$data['pull_chance']=$result+1;
								$result = $this->common->update_aadhar_esign($data);
							}
					}
		        else{
					        $data['pull_chance']=1;
							$result = $this->common->save_aadhar_esign($data);
		           }
		$razorpay_payment_id=$_SESSION['razorpay_payment_id'];
						        $dir='./images/all_document_pdf/';  
                               //$dir= base_url('/images/all_document_pdf/');
								
								$filename=$this->session->userdata['userdata']['mobile']; 
                               $path    = $dir.$filename;
								
				 if (file_exists($path)) 
								 {
									      
										  
										  //$files = scandir($path);
										 // $files = array_diff(scandir($path), array('.', '..'));
										 $files = array();

													   $cdir = scandir($path);
													   foreach ($cdir as $key => $value)
													   {
														  if (!in_array($value,array(".","..")))
														  {
															 if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
															 {
																$files[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
															 }
															 else
															 {
																$files[] = $value;
															 }
														  }
													   }
													  
													
										
										
										
										  
										      require_once('./fpdf/fpdf.php');
											 require_once('./fpdi/src/autoload.php');
											 require_once('./fpdi/src/Fpdi.php');
											//$id = $this->session->userdata('ID');
											//$data_row = $this->Customercrud_model->getDocuments($id);
											//$pdf = new FPDF('P', 'pt', 'Letter');
											//$pdf->addPage();
											$pdf =new \setasign\Fpdi\Fpdi();
											  foreach($files as $file)
											{ 
													
													$url = $path.'/'.$file;	
													
													if(substr($url, -4) == '.pdf')
										{
											/*    $doc = $url;
												$save = 'output.jpg';

											 exec('./images/documents/"'.$doc.'" -colorspace RGB -resize 800 "'.$save.'"', $output, $return_var);
											 print_r($output);
											
											exit;*/
											

											$pageCount = $pdf->setSourceFile($url);
											
											for($i=1; $i<=$pageCount; $i++)
											{
												$pageId = $pdf->importPage($i,setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);
												$pdf->addPage();
												$pdf->useImportedPage($pageId, 50, 50,100,100);
												
											
                                              
											}

											
										}
										else
										{
											$pdf->addPage();
											$pdf->Image($url);
										}
										
								}
								$directoryName="./images/all_document_pdf/";
								if(!is_dir($directoryName))
								{
											mkdir($directoryName, 0755);
											file_put_contents($pdf->Output('$id.pdf','F'));
								}
								else
								{
									$dir='./images/all_document_pdf/';    
									$filename= "$id.pdf";                                      
									 if(file_exists($dir.$filename))
									 {
										 unlink($dir.$filename);
										  $pdf ->Output($dir.$filename,'F');
									 }
									 else
									 {
									   $pdf ->Output($dir.$filename,'F');
									 }
								
								}
											
												
											
											
								 }

		$dir=$dir;    
		$filename= "$razorpay_payment_id.pdf"; 
        $final_url=	$dir.$filename;
		
		if(file_exists($final_url))
		{
			$data['link']=$final_url;
			$data['Userid']=$razorpay_payment_id;
			$data['name']=$this->session->userdata['userdata']['fname']." ".$this->session->userdata['userdata']['lname'];
			$this->session->set_flashdata('data',$data);
			redirect('front/Customer_Login');
		
		}
		
		
		                     
	}
	public function Customer_Login()
	{
		$data=$this->session->flashdata('data');
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
										  CURLOPT_URL => "https://esign-preproduction.signzy.tech/api/customers/login",
										  CURLOPT_RETURNTRANSFER => true,
										  CURLOPT_ENCODING => "",
										  CURLOPT_MAXREDIRS => 10,
										  CURLOPT_TIMEOUT => 30,
										  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										  CURLOPT_CUSTOMREQUEST => "POST",
										  CURLOPT_POSTFIELDS => "{\"username\":\"finaleap_test\",\"password\":\"JaWCbbPZQK5FhPS4N0PL\"}",
										  CURLOPT_HTTPHEADER => array(
											"accept: */*",
											"accept-language: en-US,en;q=0.8",
											"content-type: application/json"
										  ),
										)
							);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			  //echo "<pre>";
			 // echo $response;
			  //echo '<br>';
			  $this->File_Exchange($data,$response);
		}
		
	}
	public function File_Exchange($data,$response)
	{
		$link=$data['link'];
        $str2 = substr($link, 2);
	
		
		$this->session->set_userdata('Userid',$data['Userid']);
		$final_link=base_url().$str2;
		
		
		$cust_login=json_decode($response);
		$this->session->set_userdata('cust_login',$cust_login);
		
			
          
		     $content=$this->file_get_contents_curl($final_link);
			 
					$temp = tmpfile();
					fwrite($temp, $content);
					fseek($temp, 0);
					$metaData = stream_get_meta_data($temp);
                    $filepath = $metaData['uri'];
				   
		         //$tmp = tempnam(sys_get_temp_dir(), 'php');
                //file_put_contents($tmp,$content);
				 
			$curl = curl_init();
            
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://preproduction-persist.signzy.tech/api/files/upload",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING =>"",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_SSL_VERIFYHOST => 0,
			  CURLOPT_SSL_VERIFYPEER => 0,
			
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS =>array(
																	  'file' => new CURLFile($filepath),
																	  'ttl'  => 'infinity',
																	),
			  CURLOPT_HTTPHEADER => array(
				
				"content-type: multipart/form-data;"
				
			  ),
			));
          
			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);
             fclose($temp);
			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  echo $response;
			  exit;
			  // $this->Doc_Aadhar_Esign($response,$cust_login,$data);
			}
	}
	public function Doc_Aadhar_Esign($response,$cust_login,$data)
	{
		$file_details=json_decode($response,true);
		//$directURL=$file_details['file']['directURL'];
		
		$redirect_url=base_url().'index.php/front/get_E_signdoc';
		$name=$data['name'];
		$this->session->set_userdata('Cust_name',$data['name']);
		
		
		
		
				$curl = curl_init();

				 $options=array(
				  CURLOPT_URL => "https://esign-preproduction.signzy.tech/api/customers/".$cust_login->userId."/aadhaaresigns",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS =>"{\"task\": \"url\",\"inputFile\": \"$directURL\",\"callbackUrl\": \"$redirect_url\",\"redirectUrl\": \" $redirect_url\",\"redirectTime\": \"20\",\"signatureType\": \"aadhaaresign\",\"name\": \"$name\"}",
				  CURLOPT_HTTPHEADER => array(
					"authorization:".$cust_login->id,
					"cache-control: no-cache",
					"content-type: application/json",
					
				  ),
				);
				
			   curl_setopt_array($curl,$options );

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  //echo $response;
				  $uploded_file=json_decode($response,true);
				   $this->session->set_userdata("uploded_file",$uploded_file);
				  $redirect_url=$uploded_file['result']['url'];
				  
				  redirect($redirect_url);
				 
				  
				  
				  
				
				 
				  
				  
				}
	
	}
	public function get_E_signdoc()
	{	     
           $uerdata=$this->session->userdata('userdata');
		$uploded_file=$this->session->userdata("uploded_file");	
		$cust_login=$this->session->userdata("cust_login");	
		$Userid=$this->session->userdata("Userid");
		
		$customer_id=$uploded_file['customerId'];
        $customer_token=$uploded_file['result']['token'];
		$auth=$cust_login->id;
		$Cust_name=$this->session->userdata("Cust_name");	
      		
        $curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://esign-preproduction.signzy.tech/api/callbacks",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => " {\"customerId\": \"$customer_id\",\"token\": \"$customer_token\"}",
			  CURLOPT_HTTPHEADER => array(
				"authorization:".$auth,
				"cache-control: no-cache",
				"content-type: application/json"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else 
			{
			    $uerdata=$this->session->userdata('userdata');
			  //echo $response;
			   $this->load->helper('download');
			   $Esign_file_details=json_decode($response,true);
			   $fileName=$Esign_file_details['result']['esignedFile'];
			   
			   require 'fpdf.php';
			   $data = file_get_contents($fileName);
			   
				              $path='./images/all_document_pdf/'.$this->session->userdata['userdata']['mobile'].'/';    
								
						
						       $dir=$path;    
								$filename= "esign_$Userid.pdf"; 
                           
						
							if (file_exists($dir.$filename)) {
							  $fh = fopen($dir.$filename, 'a');
							  fwrite($fh, $data."\n");
							} else {
							  $fh = fopen($dir.$filename, 'w');
							  fwrite($fh, $data."\n");
							}
							fclose($fh);
							$link=$dir.$filename;
		$email=$uerdata['email'];
		
		$this->session->set_flashdata('link', $link);
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
		$this->email->subject('Aadhar esign Document'); 
		
		
		//$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
		$this->email->message('Aadhar esign Document');
	  
		$email=$uerdata['email'];
	    $mobile=$uerdata['mobile'];
	    $payment_id= $this->common->get_payment_id($email,$mobile);
        $this->email->attach($link);
		
		$aadhar_esign_data=array(
		'link'=>$link,
		'status'=>'sucess'
		);
		$result = $this->common->save_link_details($aadhar_esign_data,$payment_id);
				
		//Send mail 
		if($this->email->send()) {	
		
		                        
		                        $data=array(
									   'refund'=>'Not Applicable',
									   'email_send'=>'yes'
									   );
								$result = $this->common->save_refund_details($data,$payment_id);
		                         
								
		                    	$this->session->unset_userdata('userdata');
								
								$this->session->set_flashdata('sucess','sucess');
								redirect('front/view_doc');
								
								
			
		}else{
				
				           $data=array(
									   'refund'=>'Not Applicable',
									   'email_send'=>'No'
									   );
							$result = $this->common->save_refund_details($data,$payment_id);
				        $this->session->unset_userdata('userdata');
			            $this->session->set_flashdata('warning','Something get wrong');
						redirect('front/credit_bureau');
							
			
		}
							
							//redirect('Customer/Customer_loan_apply_sucess/');
				
			   
			 
						
						
				                
			   
			}   
										
	}
	public function view_doc()
	{
		$data['view'] = 'front/veiw_doc';
		$data['link']=$this->session->userdata('link');
		
		$this->load->view('front/layout',$data);
	}
	function file_get_contents_curl($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
		curl_setopt($ch, CURLOPT_URL, $url);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
		}
	function tempfile()
	{
		$temp = tmpfile();
					fwrite($temp, "writing to tempfile");
					fseek($temp, 0);
					echo fread($temp, 1024);
					fclose($temp); // this removes the file
						
					exit;
	}
	function uploadFile($name,$i=0){

        $file1 = basename($name);
        $postField = array();
       // $tmpfile = tempnam($name,"TMP0");
       // $filename = basename($name);
        $postField['files'] =  curl_file_create($name);
        $headers = array("Content-Type" => "multipart/form-data");
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, 'https://preproduction-persist.signzy.tech/api/files/upload');

        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl_handle, CURLOPT_POST, TRUE);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $postField);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
        $returned_fileName = curl_exec($curl_handle);
        curl_close($curl_handle);
        return json_decode($returned_fileName);
    }
	function create_file($name)
	{
		$handle = curl_init();
 
			$url = $name;
			
			 
			// Set the url
			curl_setopt($handle, CURLOPT_URL, $url);
			// Set the result output to be a string.
			curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
			 
			$output = curl_exec($handle);
			 
			curl_close($handle);
			 
			echo $output;

	}

	//===================================================================================
	//===================================
	public function save_credit_bureau_without_application()
{
	//echo "in save credit bureau without application";
	//exit();
	
	 $id= $this->session->userdata['userdata']['Cust_ID'];

	$dob = $this->input->post('dob');		
	$diff = abs(strtotime(date("Y-m-d")) - strtotime($dob));
	$years = floor($diff / (365*60*60*24));

	$array_input = array(
		'AGE' => $years,
		'FN' => $this->session->userdata['userdata']['fname'],
		'MN' => $this->session->userdata['userdata']['mname'],
		'LN' => $this->session->userdata['userdata']['lname'],
		'EMAIL' => $this->session->userdata['userdata']['email'],
		'MOBILE' =>$this->session->userdata['userdata']['mobile'],
		'GENDER' =>$this->session->userdata['userdata']['gender'],			
		'DOB' =>$this->session->userdata['userdata']['dob'],			
		 'PAN_NUMBER' =>$this->session->userdata['userdata']['pan'],
		'AADHAR_NUMBER' => $this->session->userdata['userdata']['aadhar'],
		);
		$array_input_more = array(
		'CUST_ID' => $id,
		'IS_SPOUSE_FATHER' =>$this->session->userdata['userdata']['spouse'],
		'SPOUSE_F_NAME' =>$this->session->userdata['userdata']['s_f_name'],
		'SPOUSE_M_NAME' =>$this->session->userdata['userdata']['s_m_name'],
		'SPOUSE_L_NAME' =>$this->session->userdata['userdata']['s_l_name'],			
		'RES_ADDRS_LINE_1' =>$this->session->userdata['userdata']['resi_add_1'],			
		'RES_ADDRS_LINE_2' =>$this->session->userdata['userdata']['resi_add_2'],
		'RES_ADDRS_LINE_3' =>$this->session->userdata['userdata']['resi_add_3'],
		'RES_ADDRS_LANDMARK' =>$this->session->userdata['userdata']['resi_landmark'],
		'RES_ADDRS_PINCODE' =>$this->session->userdata['userdata']['resi_pincode'],
		'RES_ADDRS_CITY' =>$this->session->userdata['userdata']['resi_city'],
		'NATIVE_PLACE'=>$this->session->userdata['userdata']['NATIVE_PLACE'],
		'RES_ADDRS_STATE' =>$this->session->userdata['userdata']['resi_state'],
		'RES_ADDRS_DISTRICT' => $this->session->userdata['userdata']['resi_district'],
		'RES_ADDRS_PROPERTY_TYPE' => $this->session->userdata['userdata']['resi_sel_property_type'],
		'RES_ADDRS_NO_YEARS_LIVING' =>$this->session->userdata['userdata']['resi_no_of_years'],
		'PER_ADDRS_LINE_1' =>$this->session->userdata['userdata']['per_add_1'],
		'PER_ADDRS_LINE_2' => $this->session->userdata['userdata']['per_add_2'],
		'PER_ADDRS_LINE_3' =>$this->session->userdata['userdata']['per_add_3'],
		'PER_ADDRS_LANDMARK' =>$this->session->userdata['userdata']['per_landmark'],
		'PER_ADDRS_PINCODE' =>$this->session->userdata['userdata']['per_pincode'],
		'PER_ADDRS_PROPERTY_TYPE' => $this->session->userdata['userdata']['per_sel_property_type'],
		'PER_ADDRS_STATE' =>$this->session->userdata['userdata']['per_state'],
		'PER_ADDRS_DISTRICT' =>$this->session->userdata['userdata']['per_district'],
		'PER_ADDRS_CITY' =>$this->session->userdata['userdata']['per_city'],
		'PER_ADDRS_NO_YEARS_LIVING' =>$this->session->userdata['userdata']['per_no_of_years'],
		'CONSENT'=>$this->session->userdata['userdata']['TC'],
		'VERIFY_PAN'=>$this->session->userdata['userdata']['verify_pan_status'],
		'KYC_doc'=>$this->session->userdata['userdata']['KYC_doc'],
		'KYC'=>$this->session->userdata['userdata']['KYC'],
		'VERIFY_KYC'=>$this->session->userdata['userdata']['verify_kyc_status'],
		'File_Number_Passport'=>$this->session->userdata['userdata']['file_number'],
		'employment_type'=>$this->session->userdata['userdata']['employment_type'],
		'monthly_income'=>$this->session->userdata['userdata']['monthly_income'],
		'current_emi'=>$this->session->userdata['userdata']['current_emi'],

		);
		

		if($this->input->post('KYC_doc')=='Driving Licence'||$this->input->post('KYC_doc')=='Passport')
		{
			if($this->input->post('KYC_doc')=='Passport')
			{
				$array = array(
					'CUST_ID' => $id,
					'Passport_available' =>'yes',			
					'Passport_Number' =>$this->input->post('KYC'),			
					'verify_Passport_no' =>$this->input->post('verify_kyc_status')
					);
			}
			if($this->input->post('KYC_doc')=='Driving Licence')
			{
				$array = array(
					'CUST_ID' => $id,
					'Driving_l_available' =>'yes',			
					'Driving_l_Number' =>$this->input->post('KYC'),			
					'verify_Driving_l_Number' =>$this->input->post('verify_kyc_status')
					);
			}
			$updated_array_input_more=$this->Customercrud_model->update_profile_more($id, $array);
		}

	$id_mobile_exist = $this->Customercrud_model->check_mobile($id, $array_input['MOBILE']);
	if($id_mobile_exist > 0){
		$response = array('status' => 0, 'message' => 'Mobile number already in use');
		echo json_encode($response);
		//exit();
	}

	$id_email_exist = $this->Customercrud_model->check_email($id, $array_input['EMAIL']);
	if($id_email_exist > 0){
		$response = array('status' => 0, 'message' => 'Email id already in use');
		echo json_encode($response);
		//exit();
	}


	$updated_id = $this->Customercrud_model->update_profile($id, $array_input);

	$cust_row = $this->Customercrud_model->getProfileData($id);
	if($cust_row->PROFILE_PERCENTAGE < 30){
		$array_input_per = array(
			'PROFILE_PERCENTAGE' => 20
		);
		$this->Customercrud_model->update_profile($id, $array_input_per);
	}


	$check_id = $this->Customercrud_model->check_more_profile($id);
	if($check_id > 0)$id = $this->Customercrud_model->update_profile_more($id, $array_input_more);
	else $id = $this->Customercrud_model->insert_profile_more($id, $array_input_more);

	if($id > 0){
		$cust_id= $id= $this->session->userdata['userdata']['Cust_ID'];
		$age = $this->session->set_userdata("AGE", $array_input['AGE']);
		$response = array('status' => 1, 'message' => 'Profile updated successfully','ID'=> $cust_id);
		 json_encode($response);
	}else {
		$response = array('status' => 0, 'message' => 'Error in profile update');
		echo json_encode($response);
	}

	$id= $this->session->userdata['userdata']['Cust_ID'];
  //  echo "save_credit_bureau_without_application";
   // exit();
	 $this->session->set_userdata('UID',$id);
	 $cust_id=$id;



	 $check=$this->Customercrud_model->check_credit_score($id);
				if(isset($check))
				{
			
                     $row = $this->Customercrud_model->get_saved_credit_score($id);
				   
				}
				else
				{
			
					 $row = '';
				}

	//if($this->Customercrud_model->check_credit_score($id)){
	if(!empty($row) && $row->score_success == 'success')
		{

		//$response = array('status' => 1, 'message' => '');
		//echo json_encode($response);
		//redirect('dsa/check_bureau_score_edit?ID='.$id, 'refresh');
		redirect('dsa/GO_No_GO?ID='.$id);
		//exit();
	
	}
	else {
		
		$this->session->set_userdata("score", '');
		$filterArr = [];
		$reditScoreSavedProfileData = $this->Customercrud_model->getCreditScoreSavedProfileData($id);
	  
		 /* if(!$reditScoreSavedProfileData || empty($reditScoreSavedProfileData)){
			//$self_profile_data = $this->Customercrud_model->getProfileData($id);
			//$self_profile_data_more = $this->Customercrud_model->getProfileDataMore($id);
			$filterArr['pan'] =$this->session->userdata['userdata']['pan'];
			$filterArr['email'] =$this->session->userdata['userdata']['email'];
			$filterArr['mobile'] =$this->session->userdata['userdata']['mobile'];
			$filterArr['first_name'] =$this->session->userdata['userdata']['fname'] ." ".$this->session->userdata['userdata']['lname'];
			$filterArr['last_name'] = $this->session->userdata['userdata']['lname'];
			$filterArr['address_line_1'] = $this->session->userdata['userdata']['resi_add_1'];
			$filterArr['address_line_2'] = $this->session->userdata['userdata']['resi_add_2'];
			$filterArr['locality'] =$this->session->userdata['userdata']['resi_city'];
			$filterArr['city'] =$this->session->userdata['userdata']['resi_city'];
			$filterArr['state'] =$this->session->userdata['userdata']['resi_state'];
			$filterArr['postal_code'] =$this->session->userdata['userdata']['resi_pincode'];
			// $filterArr['dob'] = base64_decode($self_profile_data->DOB);
			$filterArr['dob'] =$this->session->userdata['userdata']['dob'];
			if($this->session->userdata['userdata']['gender']!=''){
				if($this->session->userdata['userdata']['gender'] == "male")$filterArr['gender'] = "M";
				else $filterArr['gender'] = "F";
			}else $filterArr['gender'] = "F";
		}else{
			$filterArr['pan'] = $reditScoreSavedProfileData->pan;
			$filterArr['email'] = $reditScoreSavedProfileData->email;
			$filterArr['mobile'] = $reditScoreSavedProfileData->mobile;
			$filterArr['first_name'] = $reditScoreSavedProfileData->first_name." ".$reditScoreSavedProfileData->last_name;
			$filterArr['last_name'] = $reditScoreSavedProfileData->last_name;
			$filterArr['address_line_1'] = $reditScoreSavedProfileData->address_line_1;
			$filterArr['address_line_2'] = $reditScoreSavedProfileData->address_line_2;
			$filterArr['locality'] = $reditScoreSavedProfileData->city;
			$filterArr['city'] = $reditScoreSavedProfileData->city;
			$filterArr['state'] = $reditScoreSavedProfileData->state;
			$filterArr['postal_code'] = $reditScoreSavedProfileData->postal_code;
			$filterArr['dob'] = $reditScoreSavedProfileData->dob;
			
			if($reditScoreSavedProfileData->gender!=''){
				if($reditScoreSavedProfileData->gender == "male")$filterArr['gender'] = "M";
				else $filterArr['gender'] = "F";
			}else $filterArr['gender'] = "F";
		}
		*/
			if(!$reditScoreSavedProfileData || empty($reditScoreSavedProfileData))
			{
			
				$filterArr['pan'] =$this->session->userdata['userdata']['pan'];
				$filterArr['email'] =$this->session->userdata['userdata']['email'];
				$filterArr['mobile'] =$this->session->userdata['userdata']['mobile'];
				$filterArr['first_name'] =$this->session->userdata['userdata']['fname'] ." ".$this->session->userdata['userdata']['lname'];
                $filterArr['middle_name'] = $this->session->userdata['userdata']['mname'];
				$filterArr['last_name'] = $this->session->userdata['userdata']['lname'];
				$filterArr['address_line_1'] = $this->session->userdata['userdata']['resi_add_1']." ".$this->session->userdata['userdata']['resi_add_2'];
				$filterArr['address_line_2'] = $this->session->userdata['userdata']['resi_add_2'];
				$filterArr['locality'] =$this->session->userdata['userdata']['resi_city'];
				$filterArr['city'] =$this->session->userdata['userdata']['resi_city'];
				$filterArr['state'] =$this->session->userdata['userdata']['resi_state'];
				$filterArr['postal_code'] =$this->session->userdata['userdata']['resi_pincode'];
				
				$filterArr['relation_mem_name'] =$this->session->userdata['userdata']['fname']." ".$this->session->userdata['userdata']['mname']." ".$this->session->userdata['userdata']['lname'];

				if($this->session->userdata['userdata']['KYC_doc'] == 'Aadhar')
				{
					$filterArr['ID_type2']='M';
						$searchString = " ";
						$replaceString = "";
						$originalString = $this->session->userdata['userdata']['KYC'];
						$outputString = str_replace($searchString, $replaceString, $originalString, $count); 
						$filterArr['pan2']=$outputString ;

				}
				else if($this->session->userdata['userdata']['KYC_doc'] == 'Driving Licence')
				{
					$filterArr['ID_type2']='D';
					$filterArr['pan2']=$this->session->userdata['userdata']['KYC'];

				}
				else if($this->session->userdata['userdata']['KYC_doc'] == 'Passport')
				{
					$filterArr['ID_type2']='P';
					$filterArr['pan2']=$this->session->userdata['userdata']['KYC'];
				}
				else if($this->session->userdata['userdata']['KYC_doc'] == 'VoterId')
				{
					$filterArr['ID_type2']='V';
					$filterArr['pan2']=$this->session->userdata['userdata']['KYC'];
				}

				// $filterArr['dob'] = base64_decode($self_profile_data->DOB);
				$filterArr['dob'] =$this->session->userdata['userdata']['dob'];
				if($this->session->userdata['userdata']['gender']!='')
				{
					if($this->session->userdata['userdata']['gender'] == "male")$filterArr['gender'] = "M";
					else $filterArr['gender'] = "F";
				}
				else 
					$filterArr['gender'] = "F";
			}
			else
			{
				$filterArr['pan'] = $reditScoreSavedProfileData->pan;
				$filterArr['email'] = $reditScoreSavedProfileData->email;
				$filterArr['mobile'] = $reditScoreSavedProfileData->mobile;
				$filterArr['first_name'] = $reditScoreSavedProfileData->first_name;
				$filterArr['middle_name'] = $reditScoreSavedProfileData->middle_name;
				$filterArr['last_name'] = $reditScoreSavedProfileData->last_name;
				$filterArr['address_line_1'] = $reditScoreSavedProfileData->address_line_1;
				$filterArr['address_line_2'] = $reditScoreSavedProfileData->address_line_2;
				$filterArr['locality'] = $reditScoreSavedProfileData->city;
				$filterArr['city'] = $reditScoreSavedProfileData->city;
				$filterArr['state'] = $reditScoreSavedProfileData->state;
				$filterArr['postal_code'] = $reditScoreSavedProfileData->postal_code;
				$filterArr['dob'] = $reditScoreSavedProfileData->dob;
				
					$filterArr['relation_mem_name'] = $reditScoreSavedProfileData->first_name." ".$reditScoreSavedProfileData->middle_name." ".$reditScoreSavedProfileData->last_name;
					if($reditScoreSavedProfileData->KYC_doc == 'Aadhar')
				{
					$filterArr['ID_type2']='M';
						
					$searchString = " ";
					$replaceString = "";
					$originalString =$reditScoreSavedProfileData->KYC;
					$outputString = str_replace($searchString, $replaceString, $originalString, $count); 
					$filterArr['pan2']=$outputString ;


				}
				else if($reditScoreSavedProfileData->KYC_doc == 'Driving Licence')
				{
					$filterArr['ID_type2']='D';
					$filterArr['pan2']= $reditScoreSavedProfileData->KYC;
				}
				else if($reditScoreSavedProfileData->KYC_doc== 'Passport')
				{
					$filterArr['ID_type2']='P';
					$filterArr['pan2']= $reditScoreSavedProfileData->KYC;
				}
				else if($reditScoreSavedProfileData->KYC_doc == 'VoterId')
				{
					$filterArr['ID_type2']='V';
					$filterArr['pan2']= $reditScoreSavedProfileData->KYC;
				}
				else if($reditScoreSavedProfileData->KYC_doc == 'Ration Card')
				{
					$filterArr['ID_type2']='R';
					$filterArr['pan2']= $reditScoreSavedProfileData->KYC;
				}
				else if($reditScoreSavedProfileData->KYC_doc == 'Other ID')
				{
					$filterArr['ID_type2']='O';
					$filterArr['pan2']= $reditScoreSavedProfileData->KYC;
				}


				if($reditScoreSavedProfileData->gender!='')
				{
					if($reditScoreSavedProfileData->gender == "male")$filterArr['gender'] = "M";
					else $filterArr['gender'] = "F";
				}
				else 
				{
					$filterArr['gender'] = "F";
				}
			}

		$stateAbbr = $this->Customercrud_model->getStateAbbr($filterArr['state']);
		if($stateAbbr)$filterArr['state'] = $stateAbbr->state_abbr;
		
		/*$name = "Mana rao";
		$url = 'https://ists.equifax.co.in/cir360service/cir360report';
		$dataInput = '{
			"RequestHeader": {
				"CustomerId": "7716",
				"UserId": "STS_FINALE",
				"Password": "W3#QeicsB",
				"MemberNumber": "027FP28332",
				"SecurityCode": "7AY",
				"CustRefField": "5000",
				"ProductCode": ["IDCR"]
			},
			"RequestBody": {
				"InquiryPurpose": "00",
				"TransactionAmount": "0",
				"FirstName": "'.$filterArr['first_name'].'",
				"MiddleName": "",
				"LastName": "'.$filterArr['last_name'].'",
				"InquiryAddresses": [{
					"seq": "1",
					"AddressLine1": "'.$filterArr['address_line_1'].'",
					"AddressLine2": "'.$filterArr['address_line_2'].'",
					"Locality": "'.$filterArr['city'].'",
					"City": "'.$filterArr['city'].'",
					"State": "'.$filterArr['state'].'",
					"AddressType": ["H"],
					"Postal": "'.$filterArr['postal_code'].'"
				}],
				"InquiryPhones": [{
					"seq": "1",
					"Number": "'.$filterArr['mobile'].'",
					"PhoneType": ["M"]
				}],
				"EmailAddresses": [{
					"seq": "1",
					"Email": "'.$filterArr['email'].'",
					"EmailType": ["O"]
				}],
				"IDDetails": [{
					"seq": "1",
					"IDValue": "'.$filterArr['pan'].'",
					"IDType": "T"
				}],
				"DOB": "'.$filterArr['dob'].'",
				"Gender": "'.$filterArr['gender'].'"
			},
			"Score": [{
				"Type": "ERS",
				"Version": "3.1"
			}]
		}';
		*/
		
				  $name = "Mana rao";
					//$url = 'https://ists.equifax.co.in/cir360service/cir360report';
					//$url='https://eportuat.equifax.co.in/cir360Report/cir360Report';	"CustomerId": "21", "UserId": "UAT_FINALE","Password": "V2*Pdhbr","MemberNumber": "027FZ01852","SecurityCode": "FU1",
						  //$url ='https://ists.equifax.co.in/cir360service/cir360report';
						  $url ='https://ists.equifax.co.in/cir360service/cir360report';
						 $dataInput = '{
							 "RequestHeader": {
								"CustomerId": "8620",
								"UserId": "STS_FNLCCR",
								"Password": "W3#QeicsB",
								"MemberNumber": "027FZ30055",
								"SecurityCode": "7KL",
								"CustRefField": "123456",
								"ProductCode": [
									"CCR"
								]
							},
							 "RequestBody": {
								 "InquiryPurpose": "05",
								 "FirstName": "'.$filterArr['first_name'].'",
								 "MiddleName": "'.$filterArr['middle_name'].'",
								 "LastName": "'.$filterArr['last_name'].'",
								 "DOB": "'.$filterArr['dob'].'",
								 "InquiryAddresses": [
									 {
										 "seq": "1",
										 "AddressType": ["H"],
										 "AddressLine1": "'.$filterArr['address_line_1'].'",
										 "State": "'.$filterArr['state'].'",
										 "Postal": "'.$filterArr['postal_code'].'"
									 }
								 ],
								 "InquiryPhones": [
									 {
										 "seq": "1",
										 "Number": "'.$filterArr['mobile'].'",
										 "PhoneType": ["M" ]
									 } ],
								 "IDDetails": [
									 {
										 "seq": "1",
										 "IDValue": "'.$filterArr['pan'].'",
										 "IDType": "T"
									 },
									 {
										 "seq": "2",
										 "IDValue": "",
										 "IDType": ""
									 }
								 ],
								 "MFIDetails": {
									 "FamilyDetails": [
										 {
											"seq": "1",
											 "AdditionalNameType":"O",
											 "AdditionalName": "'.$filterArr['relation_mem_name'].'"
										 }
									 ]
								 }
							 },
							 "Score": [
								 {
									 "Type": "ERS",
									 "Version": "3.1"
								 }
							 ]
						 }';



				//---------------------------------------------------------------------------------------------------------------------------------------------
		

		$score = $this->session->userdata("score");
		$code = 0;
		$respnse = "";
		if($score == '')
		{
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $dataInput);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			$arr = curl_exec($ch);
			$respnse = $arr;
			
			curl_close($ch);
			/*echo "<pre>";
		    print_r($respnse);
	        echo "</pre>";
		    echo "===================================================='<br>'";*/
			$dataArr = json_decode($arr);
			   
		/*echo "<pre>";
		print_r($dataArr);
	    echo "</pre>";
		echo "===================================================='<br>'";
		echo $dataArr->CCRResponse->CIRReportDataLst[0]->InquiryResponseHeader->HitCode;
		*/
		
		
			
		
			$code = $dataArr->InquiryResponseHeader->SuccessCode;
			
			
				
		}
		else 
		{
			$code = 1;
		}
		
			if($code == 1)
				{
												
					if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->Error))
					{
						$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
						$error_code = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorCode;
						$data['customer_id'] = $id;
						$data['score'] = 0;
						$data['micro_score'] = 0;
						$data['score_success'] = $score_error;
						$this->session->set_flashdata('warning',$score_error);
					}
					else
					{
						$array_input3 = array(
									'Stage'=>"Bureau Pull",
					  				'Sub_Stage'=>"Bureau Pull",
				                );
							    $updated_id = $this->Customercrud_model->update_profile($id, $array_input3);
						$creditSaveArray = [];
						$creditSaveArray['customer_id'] = $id;
						$creditSaveArray['score_success'] ='success';
						if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->InquiryResponseHeader->HitCode))
						{
							
							if($dataArr->CCRResponse->CIRReportDataLst[0]->InquiryResponseHeader->HitCode=='10' || $dataArr->CCRResponse->CIRReportDataLst[0]->InquiryResponseHeader->HitCode=='11')
							{
								
									$creditSaveArray['score'] = $dataArr->CCRResponse->CIRReportDataLst[0]->CIRReportData->ScoreDetails[0]->Value;
							}
							else
							{
								
								$creditSaveArray['score'] = 0;
							}
						}
						else
						{
							
							$creditSaveArray['score'] = 0;
						}
						if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->InquiryResponseHeader->HitCode))
						{
							
							if($dataArr->CCRResponse->CIRReportDataLst[1]->InquiryResponseHeader->HitCode==10 || $dataArr->CCRResponse->CIRReportDataLst[1]->InquiryResponseHeader->HitCode==11)
							{
								
									$creditSaveArray['micro_score'] = $dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
							}
							else
							{
								
								$creditSaveArray['micro_score'] = 0;
							}
						}
						else
						{
							
							$creditSaveArray['micro_score'] = 0;
						}
	    				
						
						
					   
						if($respnse!='')
						$creditSaveArray['response'] = $respnse;
						$creditSaveArray['checked_dts'] = date("Y-m-d h:m:s");
						$profile_data=$this->Customercrud_model->getProfileData($id);
						$this->Customercrud_model->save_credit_score($creditSaveArray);
						$send_rseponse =json_decode($arr,true);
						$dataemail = $this->send_internal_bureau_pdf($send_rseponse,$id);
                        if($dataemail['email_status']=='success')
                                 {
									
									redirect('dsa/GO_No_GO?ID='.$id);
								 }
								 else
								 {
									redirect('dsa/GO_No_GO?ID='.$id);
								 }
						
								
					}
				}
				else
				{
					
					/*if(isset($dataArr->CCRResponse))
					{
						if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->Error))
						{
							$score_error = $dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorDesc;
							$error_code = $dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorCode;
						}
						else{
						$score_error = $dataArr->Error->ErrorDesc;
						$error_code = $dataArr->Error->ErrorCode;
						}
						if($error_code >='E0401' && $error_code<='E0420')
						{
							$this->session->set_flashdata('warning','Something Wrong in your file');
							redirect('dsa/GO_No_GO?ID='.$id);
						}
						else if($error_code =='E0048')
						{
					          if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
								 {
									$data['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
								 }
								 else
								 {
									$data['micro_score']=0;
								 }
								$data['customer_id'] = $id;
								$data['score'] = 0;
								$data['response'] = $respnse;
									$data['score_success'] = $score_error;
								//$data['micro_score'] = 0;
     							$this->Customercrud_model->save_credit_score($data);
							
								$this->session->set_flashdata('warning',$score_error);
								redirect('dsa/GO_No_GO?ID='.$id);
						}
						else if($error_code==00 && $score_error=='Consumer not found in bureau')
						{
							$this->session->set_userdata('error_code', $error_code);
							$this->session->set_userdata('score_error_desc', $score_error );
							$data['customer_id'] = $id;
							$data['score'] = 0;
							 $error_code = $dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorCode;
                                 if($error_code==00 && $dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorDesc=='Consumer not found in bureau')
                                 {
									$data['micro_score'] = 0;
								 }
								 else
								 {
									$data['score'] = 0;
									 if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
									 {
										$data['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
									 }
									 else
									 {
											$data['micro_score']=0;
									 }
								 }
                            $data['response'] = $respnse;
							$credit_score=0;
							$data['score_success'] = $score_error;
							$this->Customercrud_model->save_credit_score($data);
							$this->session->set_userdata('credit_score',$credit_score);
							$this->session->set_flashdata('sucess','Consumer not found in bureau');
							redirect('dsa/GO_No_GO?ID='.$id);
						}
						else if($error_code == 'GSWDOE116')
						  {
							 
							$strpos = strpos( $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc, ':');
							$score_error = substr( $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc, ($strpos+1));
							$this->session->set_flashdata('warning',$score_error);
		 				    $data['response'] = $respnse; 
						    $data['customer_id'] = $id;
						    $data['score'] = 0;
						    $data['micro_score']=0;
					        $data['score_success'] = $score_error;
						    $this->Customercrud_model->save_credit_score($data);
	             			redirect('dsa/GO_No_GO?ID='.$id);
						}
					}
					else
					{*/
						$score_error = $dataArr->Error->ErrorDesc;
						$error_code = $dataArr->Error->ErrorCode;
					    $data['response'] = $respnse;
						$data['customer_id'] = $id;
						$data['score'] = 0;
						$data['micro_score']=0;
						$data['score_success'] = $score_error;
     					$this->Customercrud_model->save_credit_score($data);
						$this->session->set_flashdata('warning',$score_error);
     					redirect('dsa/GO_No_GO?ID='.$id);
				
					/*}*/
			
				}
	}
	
}
//====================================  code for IDCCR
public function combined_credit_bureau()
{
	$this->session->unset_userdata(['loan_application']);
	$data['view'] = 'front/combined_credit_bureau';
	$data['credit_buerau_price'] = $this->Admin_model->get_credit_buerau_price();
	$this->load->view('front/layout',$data);

}

public function check_payment_details_CCR()
	{
		// echo "fname=".$this->input->post('fname');
		// echo "<br>lname=".$this->input->post('lname');
		// echo "<br>gender".$this->input->post('gender');
		// echo "<br>email".$this->input->post('email');
		// echo "<br>mobile".$this->input->post('mobile');
		// echo "<br>pan".$this->input->post('pan');
		// echo "<br>ID_type".$this->input->post('ID_type');
		// echo "<br>address1".$this->input->post('address1');
		// echo "<br>pincode".$this->input->post('pincode');
		// echo "<br>state".$this->input->post('state');
		// echo "<br>District".$this->input->post('district');
		// echo "<br>city".$this->input->post('city');
		// echo "<br>cterms".$this->input->post('cterms');
		// echo "<br>dob".$this->input->post('dob');
		// echo "<br>verify_otp_status".$this->input->post('verify_otp_status');
		// echo "<br>pan2".$this->input->post('pan2');
		// echo "<br>ID_type2".$this->input->post('ID_type2');
		$_SESSION["combined_credit_bureau"] = "combined_credit_bureau";
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$name= $this->input->post('fname')." ".$this->input->post('lname');
		 
		$userdata = array(

							'fname' => $this->input->post('fname'),
							'mname' => $this->input->post('mname'),
							'lname' => $this->input->post('lname'),
							'gender' => $this->input->post('gender'),
							'email' => $this->input->post('email'),
							'mobile' => $this->input->post('mobile'),
							'pan_number' => $this->input->post('pan'),
							'ID_type' => $this->input->post('ID_type'),
							

							'address1' => $this->input->post('address1'),
							
							'pincode' => $this->input->post('pincode'),
							'state' => $this->input->post('state'),
							'district' => $this->input->post('district'),
							'city' => $this->input->post('city'),
							'terms' => $this->input->post('cterms'),
							'dob'=>$this->input->post('dob'),
							'verify_otp'=>$this->input->post('verify_otp_status'),
							'created_date'=>date("Y/m/d"),
							'ID_2_number'=>$this->input->post('pan2'),
							'ID_type_2'=>$this->input->post('ID_type2'),

						);
							$this->session->set_userdata('userdata',$userdata);

		$result = $this->common->check_payment_details($email,$mobile,$name);
		$result2 = $this->common->check_payment_details_condition_2($mobile,$name);
		$result3 = $this->common->check_payment_details_condition_3($email,$name);
		if($result>0)
		{
			//echo "one";
			//exit;
			$payment_id = $this->common->get_payment_id_condition1($email,$mobile,$name);
			$_SESSION['razorpay_payment_id']=$payment_id;
			redirect('front/save_combined_credit_bureau');
						
		}
		else if($result2>0)
		{
			//echo "two";
			//exit;
			$payment_id = $this->common->get_payment_id_condition2($mobile,$name);
			$_SESSION['razorpay_payment_id']=$payment_id;
			redirect('front/save_combined_credit_bureau');
		}
		else if($result3>0)
		{
			//echo "three";
			//exit;
			$payment_id = $this->common->get_payment_id_condition3($email,$name);
			$_SESSION['razorpay_payment_id']=$payment_id;
			redirect('front/save_combined_credit_bureau');
		}
		else
		{
			//echo "four";
			//exit;
			$this->session->set_userdata('check_payment',0);
			redirect('front/combined_credit_bureau');
		}
		
	}
	public function save_combined_credit_bureau(){
        //phone does not match
		// $email="sandeep.belbhandare@finaleap.com";
		// $mobile="8999569414";

		// customer not found
// 		$email="priyanka.abdagire@finaleap.com";
// 		$mobile="8830828819";
//         $result2 =$this->common->find_combined_cedit_details_sucess($email,$mobile);
//         $arr2=$result2->response;
// 		$dataArr2 = json_decode($arr2,true);
// 		$credit_buerau_pull_chances = $this->Admin_model->get_credit_buerau_pull_chances();
// 		$code = $dataArr2['InquiryResponseHeader']['SuccessCode'];
// 		if(isset($dataArr2['CCRResponse']['CIRReportDataLst'][1]['Error']))
// 		{
// 			$error_code = $dataArr2['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorCode'];
// 			if($error_code==00 && $dataArr2['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorDesc']=='Consumer not found in bureau')
// 			{ 
             
// 				if(isset($dataArr2['CCRResponse']['CIRReportDataLst'][0]['Error']))
// 		        {
// 					$error_code2 = $dataArr2['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'];
// 			        if($error_code2==00 && $dataArr2['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc']=='Consumer not found in bureau')
// 			        { 
// 						$this->session->set_flashdata('warning','Consumer not found in both Retail and Microfines bureau');
// 						redirect('front/combined_credit_bureau');
// 					}

             
// 				}
// 				else
// 				{
					 
// 					$this->session->set_flashdata('warning','Consumer not found in Microfines bureau');
// 			         redirect('front/combined_credit_bureau');
// 				}



// 			}
// 			echo $error_code;
// 			exit();
// 			                         $error_code = $dataArr2['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'];
// 									 if($error_code == 'GSWDOE116')
// 									  {
// 									//	echo "two"; exit(); //======================================================
// 										  $strpos = strpos( $dataArr2['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ':');
// 										  $score_error = substr( $dataArr2['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ($strpos+1));
										 
// 										  $this->session->set_flashdata('warning',$score_error);
// 										  redirect('front/combined_credit_bureau');
// 									  }
// 									  if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc']=='Consumer not found in bureau')
// 								      { 
// 										$this->session->set_flashdata('sucess','Consumer not found in bureau');
// 										redirect('front/combined_credit_bureau');
// 									  }

			
// 		}
			
// echo "outer";
// exit();





		//echo "hiiii";
		//exit();
		//unset($_SESSION['save_combined_credit_bureau']);
		//unset($_SESSION['combined_credit_bureau']);
		$uerdata=$this->session->userdata('userdata');
		//echo $uerdata['pan_number2'];save_combined_credit_bureau
		//echo $uerdata['ID_type2'];
		//exit();
		$data = array(

			'fname' => $uerdata['fname'],
			'mname' => $uerdata['mname'],
			'lname' => $uerdata['lname'],
			'gender' => $uerdata['gender'],
			'email' => $uerdata['email'],
			'mobile' => $uerdata['mobile'],
			'pan_number' =>$uerdata['pan_number'],
			'ID_type' =>$uerdata['ID_type'],
			
			'address1' =>$uerdata['address1'],
			
			'pincode' => $uerdata['pincode'],
			'state' => $uerdata['state'],
			'district' => $uerdata['district'],
			'city' => $uerdata['city'],
			'terms' => $uerdata['terms'],
			'dob'=> $uerdata['dob'],
			'verify_otp'=> $uerdata['verify_otp'],
			'created_date'=>$uerdata['created_date'],
			'Payment_id'=>$_SESSION['razorpay_payment_id'],
			'ID_2_number'=>$uerdata['ID_2_number'],
			'ID_type_2' =>$uerdata['ID_type_2']
		);
					
			$this->session->set_userdata("score", '');
			$filterArr = [];
		
		 
			    $email=$uerdata['email'];
				
				$filterArr['pan'] = $uerdata['pan_number'];
				$filterArr['ID_type'] = $uerdata['ID_type'];
				$filterArr['pan2'] =$uerdata['ID_2_number'];
				$filterArr['ID_type2'] =$uerdata['ID_type_2'];
				$filterArr['email'] = $uerdata['email'];
				$filterArr['mobile'] =$uerdata['mobile'];
				$filterArr['first_name'] =$uerdata['fname'];
				$filterArr['middle_name']=$uerdata['mname'];
				$filterArr['last_name'] = $uerdata['lname'];
				//===========
				
				//$filterArr['relation_mem_name'] = $uerdata['mem_fname']." ".$uerdata['mem_lname'];
				$filterArr['relation_mem_name'] = $uerdata['fname']." ".$uerdata['mname']." ".$uerdata['lname'];
				//==========
				$filterArr['address_line_1'] = $uerdata['address1'];
		
				$filterArr['locality'] = $uerdata['city'];
				$filterArr['city'] = $uerdata['city'];
				$filterArr['state'] =$uerdata['state'];
				$filterArr['postal_code'] = $uerdata['pincode'];
				$filterArr['dob'] =$uerdata['dob'];
				
				if($uerdata['gender']!=''){
					if($uerdata['gender'] == "male")$filterArr['gender'] = "M";
					else $filterArr['gender'] = "F";
				}else $filterArr['gender'] = "F";
			
			
			$stateAbbr = $this->Customercrud_model->getStateAbbr($filterArr['state']);
			if($stateAbbr)$filterArr['state'] = $stateAbbr->state_abbr;
		
			$name = "Mana rao";
			//$url = 'https://ists.equifax.co.in/cir360service/cir360report';
			//$url='https://eportuat.equifax.co.in/cir360Report/cir360Report';	"CustomerId": "21", "UserId": "UAT_FINALE","Password": "V2*Pdhbr","MemberNumber": "027FZ01852","SecurityCode": "FU1",
		    $url ='https://ists.equifax.co.in/cir360service/cir360report';
			$dataInput = '{
				"RequestHeader": {
					"CustomerId": "7716",
					"UserId": "STS_CCRFL1",
					"Password": "YS7#1crzph",
					"MemberNumber": "027FZ28423",
					"SecurityCode": "4UG",
					"CustRefField": "123456",
					"ProductCode": [
						"IDCCR"
					]
				},
				"RequestBody": {
					"InquiryPurpose": "05",
					"FirstName": "'.$filterArr['first_name'].'",
					"MiddleName": "'.$filterArr['middle_name'].'",
					"LastName": "'.$filterArr['last_name'].'",
					"DOB": "'.$filterArr['dob'].'",
					"InquiryAddresses": [
						{
							"seq": "1",
							"AddressType": ["H"],
							"AddressLine1": "'.$filterArr['address_line_1'].'",
							"State": "'.$filterArr['state'].'",
							"Postal": "'.$filterArr['postal_code'].'"
						}
					],
					"InquiryPhones": [
						{
							"seq": "1",
							"Number": "'.$filterArr['mobile'].'",
							"PhoneType": ["M" ]
						} ],
					"IDDetails": [
						{
							"seq": "1",
							"IDValue": "'.$filterArr['pan'].'",
							"IDType": "'.$filterArr['ID_type'].'"
						},
						{
							"seq": "2",
							"IDValue": "'.$filterArr['pan2'].'",
							"IDType": "'.$filterArr['ID_type2'].'"
						}
					],
					"MFIDetails": {
						"FamilyDetails": [
							{
							   "seq": "1",
								"AdditionalNameType":"O",
								"AdditionalName": "'.$filterArr['relation_mem_name'].'"
							}
						]
					}
				},
				"Score": [
					{
						"Type": "ERS",
						"Version": "3.1"
					}
				]
			}';
			//echo $dataInput;
			$email=$uerdata['email'];
		    $mobile=$uerdata['mobile'];
		    $result =$this->common->check_combined_cedit_details_sucess($email,$mobile);
			
			if( $result>0)
			{
				 $this->session->unset_userdata('userdata');	
				$this->session->set_flashdata('warning','You have Already pull Credit Bureau Sucessfully');
				redirect('front/combined_credit_bureau');
			}
			else{
			
		
			
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $dataInput);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				$arr = curl_exec($ch);
				$respnse = $arr;
				curl_close($ch);
				
				
              
				$dataArr = json_decode($arr,true);
				//echo '<pre>';
				//print_r($dataArr);
			    //echo '</pre>';
				//exit;
				$credit_buerau_pull_chances = $this->Admin_model->get_credit_buerau_pull_chances();
				$code = $dataArr['InquiryResponseHeader']['SuccessCode'];
				if($code==0)
				{
					$email=$uerdata['email'];
		            $mobile=$uerdata['mobile'];
					$result =$this->common->check_combined_cedit_details($email,$mobile);
					if($result>=$credit_buerau_pull_chances)
					{
						redirect('front/refund');
					}
					if($result>0)
					{
						
						$result =$this->common->get_combined_credit_pull_count($email,$mobile);
						if($result>=$credit_buerau_pull_chances)
							{
					    		redirect('front/refund');
								
							}
							else
							{
								$data['credit_pull_count']=$result+1;
								$data['score_success'] = $dataArr['Error']['ErrorDesc'];
								$result = $this->common->update_combined_credit_bureau($data);

								$email=$uerdata['email'];
								$mobile=$uerdata['mobile'];
								$payment_id= $this->common->get_payment_id($email,$mobile);
		                        $data_refund=array(
									   'refund'=>'Due For Refund'
									   );
								$result = $this->common->save_refund_details($data_refund,$payment_id);
								if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode']))
								{
									//echo "one"; exit();//===============================================================
									$error_code = $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'];
									 if($error_code == 'GSWDOE116')
									  {
									//	echo "two"; exit(); //======================================================
										  $strpos = strpos( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ':');
										  $score_error = substr( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ($strpos+1));
										  $data['credit_pull_count']=$result+1;
										  $data['score_success'] = $dataArr['Error']['ErrorDesc'];
										  $result = $this->common->update_combined_credit_bureau($data);
										  $this->session->set_flashdata('warning',$score_error);
										  redirect('front/combined_credit_bureau');
									  }
								}
								else if($dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'])
								{
								//	echo "three"; exit();//================================================
									    $error_code =['Error']['ErrorCode'];
										if($error_code >='E0401' && $error_code<='E0420')
					                     {
											//echo "four"; exit();//================================================
										           $this->session->set_flashdata('warning','Something Wrong in your file');
												   redirect('front/combined_credit_bureau');
										 }
										
										 else
										 {
											//echo "five"; exit();//=========================================
											  $this->session->set_flashdata('warning',$dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode']);
											  redirect('front/combined_credit_bureau');
										 }
								}
														
								redirect('front/combined_credit_bureau');
							}
						
						//redirect('front/refund');
					}
					else
					{

						//echo "nine"; exit();//==============================================
							$data['credit_pull_count']=1;
							
							//$data['score_success'] = $dataArr['Error']['ErrorDesc']; $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode']
							
							$data['score_success'] = $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorCode']; 
							//$error_code = $dataArr['Error']['ErrorCode'];
							$error_code =  $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorCode'];
							$result = $this->common->save_combined_credit_bureau($data);// -------------------------create function
							$email=$uerdata['email'];
							$mobile=$uerdata['mobile'];
							$payment_id= $this->common->get_payment_id($email,$mobile);
		                    $data_refund=array(
									   'refund'=>'Due For Refund'
							);
							$result = $this->common->save_refund_details($data_refund,$payment_id);
							if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode']))
								{
									$error_code = $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'];
									 if($error_code == 'GSWDOE116')
									  {
										  $strpos = strpos( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ':');
										  $score_error = substr( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ($strpos+1));
										  $data['credit_pull_count']=$result+1;
										  $data['score_success'] = $dataArr['Error']['ErrorDesc'];
										  $result = $this->common->update_combined_credit_bureau($data);
										  $this->session->set_flashdata('warning',$score_error);
										  redirect('front/combined_credit_bureau');
									  }
								}
							else if($dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'])
								{
									    $error_code =['Error']['ErrorCode'];
										if($error_code >='E0401' && $error_code<='E0420')
					                     {
										           $this->session->set_flashdata('warning','Something Wrong in your file');
												   redirect('front/combined_credit_bureau');
										 }
										 else
										 {
											  $this->session->set_flashdata('warning',$dataArr['Error']['ErrorDesc']);
											  redirect('front/combined_credit_bureau');
										 }
								}
							
							redirect('front/combined_credit_bureau');
					}
				}
				else
				{   $email=$uerdata['email'];
		            $mobile=$uerdata['mobile'];
					//echo $email;
					//echo $mobile;

					$result_1 =$this->common->get_combined_credit_pull_count($email,$mobile);
					if(!empty($result_1))
					{
						$result=$result_1 ->credit_pull_count;
					}
					else
					{
						$result=0;
					}

					if($result>0)
					{
						
						$data['credit_pull_count']=$result+1;
						
							$email=$uerdata['email'];
							$mobile=$uerdata['mobile'];
							$result =$this->common->check_combined_cedit_details($email,$mobile);
							
							 if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']))
					        {
								
								$error_code = $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'];
								if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc']=='Consumer not found in bureau')
								{ 

									if(isset($dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']))
									{
										$error_code = $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorCode'];
										if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorDesc']=='Consumer not found in bureau')
										{ 
									    $data['score']=0;
										$data['score_success'] ='success';
										$data['response'] = $respnse;
										//$result = $this->common->update_combined_credit_bureau($data);
									    $credit_score=0;
									    $this->session->set_userdata('credit_score',$credit_score);
										$this->session->unset_userdata('userdata');
										$this->session->set_flashdata('sucess','Consumer not found in both retail and microfince bureau');
										// redirect('front/combined_credit_bureau');
										}
										// else
										// {
										// 	$data['score']=0;
										// 	$data['score_success'] ='success';
										// 	$data['response'] = $respnse;
										// 	$result = $this->common->update_combined_credit_bureau($data);
										// 	$credit_score=0;
										// 	$this->session->set_userdata('credit_score',$credit_score);
										// 	$this->session->unset_userdata('userdata');
										// 	$this->session->set_flashdata('sucess','Consumer not found in bureau');
										// 	//redirect('front/combined_credit_bureau');
										// }
                                        else
										{
                                        $data['score']=0;
										$data['score_success'] ='success';
								     	$data['response'] = $respnse;
									 	//$result = $this->common->update_combined_credit_bureau($data);
									 	$credit_score=0;
									 	$this->session->set_userdata('credit_score',$credit_score);
									 	$this->session->unset_userdata('userdata');
									 	$this->session->set_flashdata('sucess','Consumer not found in Retail bureau');
										}
										$result = $this->common->update_combined_credit_bureau($data);
										redirect('front/combined_credit_bureau');
									}
									else
									{
										$data['score']=$dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
									    if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
										{
											$data['reatil_score']=$dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
									 	}
									    else
										{
											$data['reatil_score']=0;
										}
									     $data['score_success'] ='success';
									    $data['response'] = $respnse;
									    $result = $this->common->update_combined_credit_bureau($data);
							
								       $this->IDCCR_pdf($dataArr,$email);
									}
									
								}
								else if($error_code == 'GSWDOE116')
								{
							  //	echo "two"; exit(); //======================================================
									$strpos = strpos( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ':');
									$score_error = substr( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ($strpos+1));
								   
									$this->session->set_flashdata('warning',$score_error);
									redirect('front/combined_credit_bureau');
								}
								else
								{
									if(isset($dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']))
									{
										$error_code = $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorCode'];
										if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorDesc']=='Consumer not found in bureau')
										{ 
									    $data['score']=0;
										$data['score_success'] ='success';
										$data['response'] = $respnse;
										//$result = $this->common->update_combined_credit_bureau($data);
									    $credit_score=0;
									    $this->session->set_userdata('credit_score',$credit_score);
										$this->session->unset_userdata('userdata');
										$this->session->set_flashdata('sucess','Consumer not found in bureau');
										//redirect('front/combined_credit_bureau');
										}
										else
										{
											$data['score']=0;
											$data['score_success'] ='success';
											$data['response'] = $respnse;
											//$result = $this->common->update_combined_credit_bureau($data);
											$credit_score=0;
											$this->session->set_userdata('credit_score',$credit_score);
											$this->session->unset_userdata('userdata');
											$this->session->set_flashdata('sucess','Consumer not found in bureau');
											//redirect('front/combined_credit_bureau');
										}
										$result = $this->common->update_combined_credit_bureau($data);
										redirect('front/combined_credit_bureau');
									}
									else
									{
										$data['score']=$dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
									    if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
										{
											$data['reatil_score']=$dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
									 	}
									    else
										{
											$data['reatil_score']=0;
										}
									     $data['score_success'] ='success';
									    $data['response'] = $respnse;
									    $result = $this->common->update_combined_credit_bureau($data);
							
								       $this->IDCCR_pdf($dataArr,$email);
									}
								// $data['score']=0;
								// $data['score_success'] ='success';
								// $data['response'] = $respnse;
								// $result = $this->common->update_combined_credit_bureau($data);
								// $credit_score=0;
								// $this->session->set_userdata('credit_score',$credit_score);
								// $this->session->unset_userdata('userdata');
								// $this->session->set_flashdata('sucess','Consumer not found in bureau');
								// redirect('front/combined_credit_bureau');
								}
								
							}
							else{
								
						
									$data['score']=$dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
									if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
										{
											$data['reatil_score']=$dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
										}
									else
										{
											$data['reatil_score']=0;
										}
									$data['score_success'] ='success';
									$data['response'] = $respnse;
									$result = $this->common->update_combined_credit_bureau($data);
							
								$this->IDCCR_pdf($dataArr,$email);
							}
					
					}
					else
					{
							$data['credit_pull_count']=1;
							$email=$uerdata['email'];
							$mobile=$uerdata['mobile'];
							$result =$this->common->check_combined_cedit_details($email,$mobile);
							if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']))
					        {
								//$result = $this->common->save_combined_credit_bureau($data); //----------------------------create function
								$error_code = $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'];
								if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc']=='Consumer not found in bureau')
								{
									if(isset($dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']))
									{
										$result = $this->common->save_combined_credit_bureau($data);
										$error_code = $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorCode'];
										if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorDesc']=='Consumer not found in bureau')
										{
                                        $data['score']=0;
										$data['score_success'] ='success';
										$data['response'] = $respnse;
                                        // $result = $this->common->save_combined_credit_bureau($data);//-----------------------------create function
                                        $credit_score=0;
									    $this->session->set_userdata('credit_score',$credit_score);
										$this->session->unset_userdata('userdata');
										$this->session->set_flashdata('sucess','Consumer not found in both retail and microfince bureau');
										//redirect('front/combined_credit_bureau');
										}

										
									}
									else
										{
                                        $data['score']=0;
										$data['score_success'] ='success';
								     	$data['response'] = $respnse;
									 	//$result = $this->common->update_combined_credit_bureau($data);
									 	$credit_score=0;
									 	$this->session->set_userdata('credit_score',$credit_score);
									 	$this->session->unset_userdata('userdata');
									 	$this->session->set_flashdata('sucess','Consumer not found in Retail bureau');
										}

									$result = $this->common->save_combined_credit_bureau($data);//-----------------------------create function
									redirect('front/combined_credit_bureau');
									
								}
								else if($error_code == 'GSWDOE116')
								{
							  //	echo "two"; exit(); //======================================================
									$strpos = strpos( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ':');
									$score_error = substr( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ($strpos+1));
								   
									$this->session->set_flashdata('warning',$score_error);
								}
								else
									{
										$data['score']=$dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
										if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
										{
								  			$data['reatil_score']=$dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
										}
										else
										{
											$data['reatil_score']=0;
										}
										$data['score_success'] ='success';
										$data['response'] = $respnse;
										$result = $this->common->save_combined_credit_bureau($data);
						
										$this->IDCCR_pdf($dataArr,$email);
									}
								//redirect('front/credit_bureau');
							}
						
							else {
							    //$credit_score=$respnse['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
								//$data['response']=$respnse;
								if(isset($dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value']))
								{
								$data['score']=$dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
								}
								else
								{
									$data['score']=0;
								}
								if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
								{
								  $data['reatil_score']=$dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
								}
								else
								{
									$data['reatil_score']=0;
								}
								$data['score_success'] ='success';
								$data['response'] = $respnse;
								$result = $this->common->save_combined_credit_bureau($data);
						
							$this->IDCCR_pdf($dataArr,$email);
							}
					}
				
					
						
				}
			}
				
		

		

		
    
	}

	public function IDCCR_pdf($respnse,$email){
	
		$data['response']=$respnse;
		if(isset($respnse['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ReportOrderNO'])){ $respnse_no=$respnse['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ReportOrderNO'];}
	   
	   include("./vendor/autoload.php");
	   $mpdf = new \Mpdf\Mpdf([
		   'setAutoTopMargin' => 'stretch',
		   'autoMarginPadding' => 10,
		   'orientation' => 'L'
	   ]);
	   $arrContextOptions=array(
		   "ssl"=>array(
			   "verify_peer"=>false,
			   "verify_peer_name"=>false,
		   ),
	   );  
 $mpdf->curlAllowUnsafeSslRequests = true;
	   $mpdf->SetHTMLHeader($this->load->view('pdf/IDCCR_header',$data,true));
	   $mpdf->SetHTMLFooter($this->load->view('pdf/IDCCR_footer',[],true));
	   $mpdf->SetDisplayMode('fullwidth');
	   $mpdf->debug = true;
	   $mpdf->AddPage();
	   $stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
	   $stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));

	   
	   $mpdf->WriteHTML($stylesheet,1);
	   $mpdf->list_indent_first_level = 0;
	   $html = $this->load->view('pdf/IDCCR_report_pdf',$data,true);
	   $mpdf->WriteHTML($html);
	   //$file_name=md5(rand()).'pdf';
	   //$file=$mpdf->Output();
		//file_put_contents('report.pdf',$file);
	   //$mpdf->Output('assets/report.pdf','F');
	   //$mpdf->Output(base_url('index.php/assets/report.pdf'), 'F');
	   $directoryName="./images/all_document_pdf/";
						   if(!is_dir($directoryName))
						   {
									   mkdir($directoryName, 0755);
									   file_put_contents($mpdf->Output('$respnse_no.pdf','F'));

						   }
						   else
						   {
							   $dir='./images/all_document_pdf/';    
							   $filename= "$respnse_no.pdf";                                      
								if(file_exists($dir.$filename))
								{
									unlink($dir.$filename);
									 $mpdf ->Output($dir.$filename,'F');
								}
								else
								{
								  $mpdf ->Output($dir.$filename,'F');
								}
						   
						   }

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
	   $this->email->subject('Combined Credit Bureau Report'); 
	   
	   
	   //$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
	   $this->email->message('Combined Credit Bureau Report');
	   $dir='./images/all_document_pdf/'.$respnse_no.'.pdf';
	   
	   $this->email->attach('./images/all_document_pdf/'.$respnse_no.'.pdf');
	   
			   
	   //Send mail 
	   if($this->email->send()) {	
	   
							   $uerdata=$this->session->userdata('userdata');
							   $email=$uerdata['email'];
							   $mobile=$uerdata['mobile'];
							   $name=$uerdata['fname'];
							   $payment_id= $this->common->get_payment_id($email,$mobile);
							   $data=array(
									  'refund'=>'Not Applicable',
									  'email_send'=>'yes'
									  );
							   $result = $this->common->save_refund_details($data,$payment_id);
							   if(isset($respnse['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value']))
							   {
							    // $credit_score=$respnse['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
								 $micro=$respnse['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
								 if(isset($respnse['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
								 {
									$credit= $respnse['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']; 
								 }
								 else
								 {
									$credit=0;
								 }
							   }
							   else if(isset($respnse['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
							   {
								    //$credit_score = $respnse['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
									$credit= $respnse['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']; 
								    if(isset($respnse['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value']))
							       {
									$micro=$respnse['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
								   }
								   else
								   {
									$micro=0;
								   }

							   }
							   else
							   {
								//$credit_score= 0; 
								$micro=0;
								$credit=0;
							   }
							  // $this->session->set_userdata('credit_score',$credit_score);
							   $this->session->set_userdata('micro',$micro);  
							    $this->session->set_userdata('credit',$credit);
							  // $this->session->unset_userdata('userdata');
							   $this->session->set_flashdata('sucess','sucess');
							   redirect('front/combined_credit_bureau');
							   
							   
		   
	   }else{
			   
						  $data=array(
									  'refund'=>'Not Applicable',
									  'email_send'=>'No'
									  );
						   $result = $this->common->save_refund_details($data,$payment_id);
					   $this->session->unset_userdata('userdata');
					   $this->session->set_flashdata('warning','Something get wrong');
					   redirect('front/combined_credit_bureau');
						   
		   
	   }
   
	  
	   exit();

   }

	  //================================== added by priyanka 11-04-2022
    public function send_internal_bureau_pdf($respnse,$cust_id)
 {	  
	 
	$score_sucess=$this->Admin_model->get_score_success_iddcr($cust_id);

     
	$data['score_success']= $score_sucess;  
	 //$dataArr = json_decode($arr,true);
	 $Cust_info= $this->Customercrud_model->getProfileData($cust_id);
	 $Cust_email=$Cust_info->EMAIL;
     $data['response']=$respnse;
     if(isset($respnse['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ReportOrderNO']))
	 { 
		 $respnse_no=$respnse['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ReportOrderNO'];
	 }
	
     include("./vendor/autoload.php");
    $mpdf = new \Mpdf\Mpdf([
        'setAutoTopMargin' => 'stretch',
        'autoMarginPadding' => 10,
        'orientation' => 'L'
    ]);
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );  
	 $mpdf->curlAllowUnsafeSslRequests = true;
	$mpdf->SetHTMLHeader($this->load->view('pdf/IDCCR_header',$data,true));
    $mpdf->SetHTMLFooter($this->load->view('pdf/IDCCR_footer',[],true));
    $mpdf->SetDisplayMode('fullwidth');
    $mpdf->debug = true;
    $mpdf->AddPage();
    $stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
    $stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->list_indent_first_level = 0;
    $html = $this->load->view('pdf/IDCCR_report_pdf',$data,true);
    $mpdf->WriteHTML($html);
    $directoryName="./images/all_document_pdf/";
                        if(!is_dir($directoryName))
                        {
                                    mkdir($directoryName, 0755);
                                    file_put_contents($mpdf->Output('$respnse_no.pdf','F'));
	                     }
                        else
                        {
                            $dir='./images/all_document_pdf/';    
                            $filename= "$respnse_no.pdf";                                      
                             if(file_exists($dir.$filename))
                             {
                                 unlink($dir.$filename);
                                  $mpdf ->Output($dir.$filename,'F');
                             }
                             else
                             {
                               $mpdf ->Output($dir.$filename,'F');
                             }
                        
                        }

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
    $this->email->to($Cust_email);
    $this->email->subject('Combined Credit Bureau Report'); 
    $this->email->message('Combined Credit Bureau Report');
    $dir='./images/all_document_pdf/'.$respnse_no.'.pdf';
    
    $this->email->attach('./images/all_document_pdf/'.$respnse_no.'.pdf');
    if($this->email->send()) 
	{	
      $email_result['email_status']='success';
      return  $email_result;
    }
    else
    {
      $email_result['email_status']='fail';
      return  $email_result;
	}
     exit();
 }


}
?>