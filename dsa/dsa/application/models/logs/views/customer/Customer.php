<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Customer extends CI_Controller {

		public function __construct() {
			parent:: __construct();
		  
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('Customercrud_model');
			$this->load->model('Admin_model');
			$this->load->library('email');	
			$this->load->model('common_model','common');
			$this->load->library('upload');
			$this->load->helper(array('form', 'url'));
			$this->load->model('Dsacrud_model');

		}
		
		public function encryption($original_string)
		{
			

$cipher_algo = "AES-128-CTR"; //The cipher method, in our case, AES 
$iv_length = openssl_cipher_iv_length($cipher_algo); //The length of the initialization vector
$option = 0; //Bitwise disjunction of flags
$encrypt_iv = '8746375678619797'; //Initialization vector, non-null
$encrypt_key = "Delftstack!fina"; // The encryption key

$encrypted_string = openssl_encrypt($original_string, $cipher_algo,
			$encrypt_key, $option, $encrypt_iv);
			
			return $encrypted_string;



		}
		
		public function decryption($encrypted_string)
		{
			$cipher_algo = "AES-128-CTR"; //The cipher method, in our case, AES 
$iv_length = openssl_cipher_iv_length($cipher_algo); //The length of the initialization vector
			//Decryption
			
			$option = 0; //Bitwise disjunction of flags

$decrypt_iv = '8746375678619797'; //Initialization vector, non-null
$decrypt_key = "Delftstack!fina"; // The encryption key

$decrypted_string=openssl_decrypt ($encrypted_string, $cipher_algo,
		$decrypt_key, $option, $decrypt_iv);


return $decrypted_string;
			
		}

		public function index()
		{
			if($this->session->userdata("USER_TYPE") == ''){
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				//$this->load->view('header', $data);
				$this->load->view('login', $data);
			}else if($this->session->userdata("USER_TYPE") != 'CUSTOMER'){
				echo "Access Denied";
			}else{
				
				$id = $this->session->userdata("ID");
				$savedDocTypekyc = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "kyc");
				$savedDocTyperesidential = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "residential");
				$savedDocTypeincome = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "income");
				$savedDocTypebusiness = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "business");
				$savedDocTypemployment = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "employment");

				$cust_row = $this->Customercrud_model->getProfileData($id);
				
				print_r($cust_row);
				
				if($cust_row->PROFILE_PERCENTAGE == 0){
					$this->customer_edit_profile_2();	
				}else if($cust_row->PROFILE_PERCENTAGE == 30){
					$this->customer_edit_profile_2_income();	
				}else if($savedDocTypekyc->doc_count>0 && $savedDocTyperesidential->doc_count>0 && $savedDocTypeincome->doc_count>0 && $savedDocTypebusiness->doc_count>0 || $savedDocTypemployment->doc_count>0 ){
					redirect('customer/profile_view_p_o', 'refresh');	
				}else {
					redirect('customer/customer_documents', 'refresh');							
				}
			}
		}

		
		public function profile_view_p_o()
		{
			if($this->session->userdata("USER_TYPE") == ''){
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				//$this->load->view('header', $data);
				$this->load->view('login', $data);
			}
			else{
				
				$id = $this->input->get("ID");
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				
				//print_r($data_row);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);	
				
				$email=$data_row->EMAIL ;
				$mobile=$data_row->MOBILE ;
				
				$data_check_loan_payment =$this->Customercrud_model->check_loan_payment_details($email,$mobile);
				//echo $data_check_loan_payment->created_date;
				//echo  date("Y-m-d");
				//$days=
				//echo $days;


				//exit();
				if(isset($data_check_loan_payment))
				{   
					$date1=date_create($data_check_loan_payment->created_date);
					$date2=date_create(date("Y-m-d"));
	
					$diff=date_diff($date1,$date2);
					$days=$diff->format("%a"); 
					//echo "payment done";
				   // echo $days;
					//exit();
					if($days < 15)
					{
                         // echo "below 15";
						//  exit();
						$payment_done="payment_done";
					    $this->session->set_userdata("payment_done",$payment_done);
					}
					else
					{
						//echo "above 15";
						//exit(); we are taking payment again after 15 days
						$payment_not_done="payment_not_done";
					    $this->session->set_userdata("payment_not_done",$payment_not_done);
					}
					
				}
				else
				{
					//echo "payment not done";
			    	//exit();
					$payment_not_done="payment_not_done";
					$this->session->set_userdata("payment_not_done",$payment_not_done);
				}
				
				$this->load->helper('url');	
				$age = $this->session->userdata('AGE');
				$u_type = $this->session->userdata("USER_TYPE");
				$q = 1;
				if($u_type == 'DSA')$q = 2;
				if($data_row->PROFILE_PERCENTAGE == 100){
					$age = 1;
				}else $age = 0;
				$data['showNav'] = $age;
				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				$data['id'] = $id;
				$data['row'] = $data_row;
				$data['row_more'] = $data_row_more;
				$this->load->view('header', $data);
				$this->load->view('customer/customer_view_profile_1');	
			}
		}
        	public function profile_view_p_o_dsa()
		{
			if($this->session->userdata("USER_TYPE") == ''){
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				//$this->load->view('header', $data);
				$this->load->view('login', $data);
			}else{
				$id = $this->input->get("ID");
				$login_user_id = $this->input->get("UID");
				$this->session->set_userdata("dsa_id",$login_user_id);
			    $data['dsa_id']=$login_user_id;
				if(  $data['dsa_id'] == '')
				{
					$data['dsa_id'] = $this->session->userdata("dsa_id");
				}
			
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
				
			
				if($data_row->customer_consent=='true')
				{
					$Cust_consent_id = $id;
				    $this->session->set_userdata("Cust_consent_id",$Cust_consent_id);
					$cust_consent_status ="true";
					$this->session->set_userdata("cust_consent_status",$cust_consent_status);
					$user_type= $this->session->userdata("USER_TYPE");
					$this->session->set_userdata("user_type_from_session",$user_type);

					

				}
				
				$email=$data_row->EMAIL ;
				$mobile=$data_row->MOBILE ;
				
				$data_check_loan_payment =$this->Customercrud_model->check_loan_payment_details($email,$mobile);
				$data_check_loan_payment_email =$this->Customercrud_model->check_loan_payment_details_email($email);
				
				if(isset($data_check_loan_payment))
				{   
					$date1=date_create($data_check_loan_payment->created_date);
					$date2=date_create(date("Y-m-d"));
	
					$diff=date_diff($date1,$date2);
					$days=$diff->format("%a"); 
					//echo "payment done";
				   // echo $days;
					//exit();
					if($days < 15)
					{
                        // echo "below 15";
						// exit();
						$payment_done="payment_done";
					    $this->session->set_userdata("payment_done",$payment_done);
					}
					else
					{
						//echo "above 15";
						//exit(); //we are taking payment again after 15 days
						$payment_not_done="payment_not_done";
					    $this->session->set_userdata("payment_not_done",$payment_not_done);
					}
					
				}
				else if(isset($data_check_loan_payment_email))
				{   
					$date1=date_create($data_check_loan_payment_email->created_date);
					$date2=date_create(date("Y-m-d"));
	
					$diff=date_diff($date1,$date2);
					$days=$diff->format("%a"); 
					//echo "payment done";
				   // echo $days;
					//exit();
					if($days < 15)
					{
                        // echo "below 15";
						// exit();
						$payment_done="payment_done";
					    $this->session->set_userdata("payment_done",$payment_done);
					}
					else
					{
						//echo "above 15";
						//exit(); //we are taking payment again after 15 days
						$payment_not_done="payment_not_done";
					    $this->session->set_userdata("payment_not_done",$payment_not_done);
					}
					
				}
				else
				{
					//echo "payment not done";
			    	//exit();
					$payment_not_done="payment_not_done";
					$this->session->set_userdata("payment_not_done",$payment_not_done);
				}
                
               
				$this->load->helper('url');	
				$age = $this->session->userdata('AGE');
				$u_type = $this->session->userdata("USER_TYPE");
				$q = 1;
				if($u_type == 'DSA' )$q = 2;
				if($data_row->PROFILE_PERCENTAGE == 100){
					$age = 1;
				}else $age = 0;
				$data['showNav'] = $age;
				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				$data['id'] = $id;
				$data['row'] = $data_row;
				$data['row_more'] = $data_row_more;
				$this->load->view('header', $data);
				$this->load->view('customer/customer_view_profile_1_dsa');	
			}
		}
		public function profile_view_p_t()
		{
			//$Cust_consent_id = $id;
			$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
			//$cust_consent_status ="true";
			$cust_consent_status  =$this->session->userdata("cust_consent_status");
             $user_type_from_session=$this->session->userdata("user_type_from_session");
			//echo $Cust_consent_id;
			//echo $cust_consent_status;
			//exit();
			

			if($this->session->userdata("USER_TYPE") == ''){
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				$this->load->view('header', $data);
				$this->load->view('login');
			}else{
				$id = $this->input->get("ID");
				$data_row = $this->Customercrud_model->getProfileDataIncome($id);	
				$data_row_user_info = $this->Customercrud_model->getProfileData($id);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
				$data['row_more']=	$data_row_more;
				$this->load->helper('url');	
				$u_type = $this->session->userdata("USER_TYPE");
				$q = 1;
				if($u_type == 'DSA')$q = 2;
				$main_doc_row = $this->Customercrud_model->getMainDocumentsCount($q);
				$saved_doc_row = $this->Customercrud_model->getSavedDocumentsCount($id);
				if($saved_doc_row->doc_count==$main_doc_row->doc_count){
					$age = 1;
				}else $age = 0;
				$data['showNav'] = $age;
				$data['age'] = $age;
				$data['id'] = $id;		
				$data['row'] = $data_row;
				$data['data_row_user_info']=$data_row_user_info;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				if(empty($data_row)){
					redirect('customer/customer_documents?ID='.$id.'&error=', 'refresh');
				}else if(!empty($data_row) && $data_row->RETIRED==1){
					$data['type'] = 'notworking';
				}else if(!empty($data_row) && $data_row->BIS_PROFESSION != ''){
					$data['type'] = 'business';
				}else {
					$getType = $this->input->get('type');
					//echo $getType;
					if(!empty($data_row) && $data_row->ORG_NAME != ''){
						$data['type'] = 'salaried';	
					}else {
						if(!empty($getType)){
							if($getType == 'notworking'){
								redirect('customer/customer_documents?ID='.$id.'&error=', 'refresh');
							}else {
								$data['type'] = 'salaried';
								if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
							}
						}else {
							$data['type'] = 'salaried';
							if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
						}				
					}						
				}
						
				$this->session->set_userdata("PATIENT_USER_TYPE", $data['type']);
				$this->load->view('header', $data);
				$this->load->view('customer/customer_view_profile_2', $data);
			}
		}

		public function profile_view_p_thre()
		{

			//$Cust_consent_id = $id;
			$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
			//$cust_consent_status ="true";
			$cust_consent_status  =$this->session->userdata("cust_consent_status");
            $user_type_from_session=$this->session->userdata("user_type_from_session");
			//echo $Cust_consent_id;
			//echo $cust_consent_status;
			//exit();


			if($this->session->userdata("USER_TYPE") == ''){
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				$this->load->view('header', $data);
				$this->load->view('login');
			}else{
				$u_type = $this->session->userdata("USER_TYPE");
			$id = $this->input->get("ID");
			$data_row = $this->Customercrud_model->getDocuments($id);
			$doc_type_user = 2;
			if($u_type == 'CUSTOMER')$doc_type_user = 1;
			//$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user);
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$q = 1;
			if($u_type == 'DSA')$q = 2;
			$main_doc_row = $this->Customercrud_model->getMainDocumentsCount($q);
			$saved_doc_row = $this->Customercrud_model->getSavedDocumentsCount($id);
				$data_row_user_info = $this->Customercrud_model->getProfileData($id);
					$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
				$data['row_more']=	$data_row_more;
			if($saved_doc_row->doc_count==$main_doc_row->doc_count){
				$age = 1;
			}else $age = 0;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['error'] = '';
			$data['id'] = $id;
			$data['userType'] = $u_type;
			$data['documents'] = $data_row;
			$data['data_row_user_info']=$data_row_user_info;
			//$data['documents_type'] = $data_doctype;
			$this->load->view('header', $data);
			$data['error'] = $this->input->get('error');
			$this->load->view('customer/customer_view_profile_3', $data);
			}
		}
		public function Loan_application_fees()
		{
			$id = $this->input->get('UID');
		
			$array_input = array(
				'UNIQUE_CODE' => $id,
				'PROFILE_PERCENTAGE'=>100
				);
			$status=$this->Customercrud_model->update_profile($id,$array_input);
			$array_input_more = array(
												'CUST_ID' => $id,
												'STATUS'=>('Document upload complete'),
												'last_updated_date'=>date("Y/m/d")
												);
								
			$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);

			$var=$this->session->userdata("payment_done");
			
			if(isset($var))
			{
				
				//echo "done";exit();
				redirect('customer/redirect_to_apply_for_loan?UID='.$id );
			}
			else
			{
				if($id=='')
				{
				$id = $this->session->userdata("ID");
				}
			
				$row=$this->Customercrud_model->getProfileData($id);
			
				$role=$row->ROLE;
			
			
				if($role!=1){
					redirect('/', 'refresh');
				}
				$u_id = $this->input->get('coapp_id');
			
				$this->session->set_userdata('COAPP_ID',$this->input->get('coapp_id'));
			
			if($u_id != '')
			{
				//echo "hii"; exit();
				redirect('customer/redirect_to_apply_for_loan?coapp_id='.$u_id );
			}else if($id != ''){
				
				$cust_concent_id = $this->input->get('UID');
				$row=$this->Customercrud_model->getProfileData($cust_concent_id);
				$email=$row->EMAIL;
				$mobile=$row->MOBILE;
				$row_check_payment =$this->Customercrud_model->check_loan_payment_details($email,$mobile);
				if(isset($row_check_payment))
				{
				//	$this->session->set_userdata('check_payment',1);
					redirect('customer/redirect_to_apply_for_loan?UID='.$cust_concent_id );
				}
				else
				{
					$this->session->set_userdata('check_payment',0);
				}
			
				//$this->session->set_userdata('check_payment',0);
				$data_row = $this->Customercrud_model->getProfileData($id);
				
			
					
					$userdata = array(

							'fname' => $data_row->FN,
							'lname' => $data_row->LN,
							'email' => $data_row->EMAIL,
							'mobile' => $data_row->MOBILE,
							'verify_otp'=>'',
							'created_date'=>date("Y/m/d"),
						);
					
				  $this->session->set_userdata('userdata',$userdata);
				  $this->customer_documents();
					
			
						
				
				//$this->Customercrud_model->update_profile($id, $array_input_per);
				//$this->customer_apply_for_loan();
			 }
			} 
			
			
		}
		
	
		public function redirect_to_apply_for_loan()
		{
			
			$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
		
			$cust_consent_status  =$this->session->userdata("cust_consent_status");
			$user_type_from_session=$this->session->userdata("user_type_from_session");
		
            
            if($user_type_from_session=='DSA' && isset($Cust_consent_id))
           {
	           $id=$Cust_consent_id;
			   $row=$this->Customercrud_model->getProfileData($id);
			
			$role=$row->ROLE;
			$u_id = $this->input->get('coapp_id');
			//$u_type = $this->session->userdata("USER_TYPE");
			if($u_id=='')
			{
				if($role!=1 && $role!=2 ){
					redirect('/', 'refresh');
				}
			}
			
			
			$this->session->set_userdata('COAPP_ID',$this->input->get('coapp_id'));
			
			if($u_id != ''){
				$array_input_per['PROFILE_PERCENTAGE'] = 100;
				$this->Customercrud_model->update_coapplicant($u_id, $array_input_per);
				$this->Customercrud_model->update_profile($id, $array_input_per);
				//$this->session->set_userdata('COAPP_ID',$u_id);
				$this->coapplicant_credit_score();
			}else if($id != ''){
				$array_input_per['PROFILE_PERCENTAGE'] = 100;
				$this->Customercrud_model->update_profile($id, $array_input_per);
				//$this->customer_apply_for_loan();
				redirect('customer/customer_apply_for_loan?UID='.$id);
			}

            }
          else
         {

			$id = $this->input->get('UID');
			
			if($id=='')
			{
				$id = $this->session->userdata("ID");
			}
			
			$row=$this->Customercrud_model->getProfileData($id);
			
			$role=$row->ROLE;
			$u_id = $this->input->get('coapp_id');
			//$u_type = $this->session->userdata("USER_TYPE");
			if($u_id=='')
			{
				if($role!=1 && $role!=2 ){
					redirect('/', 'refresh');
				}
			}
			
			
			$this->session->set_userdata('COAPP_ID',$this->input->get('coapp_id'));
			
			if($u_id != ''){
				$array_input_per['PROFILE_PERCENTAGE'] = 100;
				$this->Customercrud_model->update_coapplicant($u_id, $array_input_per);
				$this->Customercrud_model->update_profile($id, $array_input_per);
				//$this->session->set_userdata('COAPP_ID',$u_id);
				$this->coapplicant_credit_score();
			}else if($id != ''){
				$array_input_per['PROFILE_PERCENTAGE'] = 100;
				$this->Customercrud_model->update_profile($id, $array_input_per);
				//$this->customer_apply_for_loan();
				redirect('customer/customer_apply_for_loan?UID='.$id);
			}
		 }
			
			
		}

		public function customer_edit_profile_2()
		{
			
			unset($_SESSION['credit_score_without_application']);
			$login_user_id = $this->input->get("UID");
				$this->session->set_userdata("dsa_id",$login_user_id);
			    $data['dsa_id']=$login_user_id;
				if(  $data['dsa_id'] == '')
				{
					$data['dsa_id'] = $this->session->userdata("dsa_id");
				}
			//$Cust_consent_id = $id;
			$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
			//$cust_consent_status ="true";
			$cust_consent_status  =$this->session->userdata("cust_consent_status");
			$user_type_from_session=$this->session->userdata("user_type_from_session");
			//echo $Cust_consent_id;
			//echo $cust_consent_status;
			//exit();













			if($user_type_from_session=='DSA' && isset($Cust_consent_id) || $user_type_from_session=='branch_manager' && isset($Cust_consent_id) || $user_type_from_session=='Relationship_Officer' && isset($Cust_consent_id)  || $user_type_from_session=='Cluster_Manager' && isset($Cust_consent_id)  || $user_type_from_session=='Sales_Manager' && isset($Cust_consent_id) || $user_type_from_session=='Operations_user' && isset($Cust_consent_id))
			{
	           //exit();
			  // echo "one";
			  // exit();
			   $id=$Cust_consent_id;
			  $data_row = $this->Customercrud_model->getProfileData($id);
			$data_row_more = $this->Customercrud_model->getProfileDataMore($id);	
			$email= $data_row->EMAIL;
			$mobile=$data_row->MOBILE;
			$data_check_loan_payment =$this->Customercrud_model->check_loan_payment_details($email,$mobile);
				$data_check_loan_payment_email =$this->Customercrud_model->check_loan_payment_details_email($email);
				
				if(isset($data_check_loan_payment))
				{   
					$date1=date_create($data_check_loan_payment->created_date);
					$date2=date_create(date("Y-m-d"));
	
					$diff=date_diff($date1,$date2);
					$days=$diff->format("%a"); 
					//echo "payment done";
				   // echo $days;
					//exit();
					if($days < 15)
					{
                        // echo "below 15";
						// exit();
						$payment_done="payment_done";
					    $this->session->set_userdata("payment_done",$payment_done);
					}
					else
					{
						//echo "above 15";
						//exit(); //we are taking payment again after 15 days
						$payment_not_done="payment_not_done";
					    $this->session->set_userdata("payment_not_done",$payment_not_done);
					}
					
				}
				else if(isset($data_check_loan_payment_email))
				{   
					$date1=date_create($data_check_loan_payment_email->created_date);
					$date2=date_create(date("Y-m-d"));
	
					$diff=date_diff($date1,$date2);
					$days=$diff->format("%a"); 
				//echo "payment done";
				   // echo $days;
					//exit();
					if($days < 15)
					{
                        // echo "below 15";
						// exit();
						$payment_done="payment_done";
					    $this->session->set_userdata("payment_done",$payment_done);
					}
					else
					{
						//echo "above 15";
						//exit(); //we are taking payment again after 15 days
						$payment_not_done="payment_not_done";
					    $this->session->set_userdata("payment_not_done",$payment_not_done);
					}
					
				}
				else
				{
				//echo "payment not done";
			    //	exit();
					$payment_not_done="payment_not_done";
					$this->session->set_userdata("payment_not_done",$payment_not_done);
				}
                






		$this->load->helper('url');	
		$age = $this->session->userdata('AGE');
		$u_type = $this->session->userdata("USER_TYPE");
		$q = 1;
		if($u_type == 'DSA' || $u_type=='branch_manager' || $u_type=='Relationship_Officer' ||  $u_type=='Cluster_Manager')$q = 2;
		$main_doc_row = $this->Customercrud_model->getMainDocumentsCount($q);
		$saved_doc_row = $this->Customercrud_model->getSavedDocumentsCount($id);
		if($saved_doc_row->doc_count==$main_doc_row->doc_count){
			$age = 1;
		}else $age = 0;
		$data['showNav'] = $age;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		
		//print_r($data_row_more);
		
		$data['row'] = $data_row;
		$data['row_more'] = $data_row_more;
		$this->load->view('header', $data);
		$this->load->view('customer/customer_update_profile_2');
			}
			else if($user_type_from_session!='DSA' || $user_type_from_session!='branch_manager' || $user_type_from_session!='Relationship_Officer' || $user_type_from_session!='Cluster_Manager' )
			{
				//echo "two";
				//exit();
				//echo $this->session->userdata("ID");
				//exit();
				$id = $this->session->userdata("ID");
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
			$data_row = $this->Customercrud_model->getProfileData($id);
			$data_row_more = $this->Customercrud_model->getProfileDataMore($id);	
			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$q = 1;
			if($u_type == 'DSA' || $u_type=='branch_manager'|| $u_type=='Relationship_Officer' ||  $u_type=='Cluster_Manager')$q = 2;
			$main_doc_row = $this->Customercrud_model->getMainDocumentsCount($q);
			$saved_doc_row = $this->Customercrud_model->getSavedDocumentsCount($id);
			if($saved_doc_row->doc_count==$main_doc_row->doc_count){
				$age = 1;
			}else $age = 0;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			
			//print_r($data_row);
			
			$data['row'] = $data_row;
			$data['row_more'] = $data_row_more;
			$this->load->view('header', $data);
			$this->load->view('customer/customer_update_profile_2');
			}
		
			else
			{
				$id = $this->session->userdata("ID");
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
			$data_row = $this->Customercrud_model->getProfileData($id);
			
			//print_r($data_row);
			
			
			$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
//echo "<pre>";
			//print_r($data_row_more);
			
			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$q = 1;
			if($u_type == 'DSA' || $u_type =='branch_manager' ||$u_type=='Relationship_Officer' ||  $u_type=='Cluster_Manager')$q = 2;
			$main_doc_row = $this->Customercrud_model->getMainDocumentsCount($q);
			$saved_doc_row = $this->Customercrud_model->getSavedDocumentsCount($id);
			if($saved_doc_row->doc_count==$main_doc_row->doc_count){
				$age = 1;
			}else $age = 0;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['row'] = $data_row;
			$data['row_more'] = $data_row_more;
			$this->load->view('header', $data);
			$this->load->view('customer/customer_update_profile_2');
			}
			
				
				
		}

		public function customer_edit_profile_2_income()
		{
		
           //$Cust_consent_id = $id;
			$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
				$login_user_id = $this->input->get("UID");
				
			    $data['dsa_id']=$login_user_id;
				if(  $data['dsa_id'] == '')
				{
					$data['dsa_id'] = $this->session->userdata("dsa_id");
				}
			
			//$cust_consent_status ="true";
			$cust_consent_status  =$this->session->userdata("cust_consent_status");
			$user_type_from_session=$this->session->userdata("user_type_from_session");
			//echo $Cust_consent_id;
			//echo $cust_consent_status;
			//exit();
			$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
			//$cust_consent_status ="true";
			$cust_consent_status  =$this->session->userdata("cust_consent_status");
			$user_type_from_session=$this->session->userdata("user_type_from_session");
			//echo $Cust_consent_id;
			//echo $cust_consent_status;
			//echo $user_type_from_session;
			//exit();
			if($user_type_from_session=='DSA' && isset($Cust_consent_id) || $user_type_from_session=='branch_manager' && isset($Cust_consent_id) || $user_type_from_session=='Relationship_Officer' && isset($Cust_consent_id)  || $user_type_from_session=='Cluster_Manager' && isset($Cust_consent_id)  || $user_type_from_session=='Sales_Manager' && isset($Cust_consent_id) || $user_type_from_session=='Operations_user' && isset($Cust_consent_id))
			{
				$id=$Cust_consent_id;
				$coappid = $this->input->get("COAPPID");
				if($coappid!='')$id = $coappid;
				$cust_row = $this->Customercrud_model->getProfileData($id);
				$data_row = $this->Customercrud_model->getProfileDataIncome($id);	
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
				$perms_type = $this->input->get('type');
				
				
				$this->load->helper('url');	
				$age = $this->session->userdata('AGE');
				$data['showNav'] = 1;
				$data['age'] = $age;		
				$data['row'] = $data_row;
				$data['cust_row']=$cust_row;
				$data['row_more']=$data_row_more;
				$data['profile_percentage'] = $cust_row->PROFILE_PERCENTAGE;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				if(!empty($data_row) && $data_row->BIS_PROFESSION != ''){
					$data['type'] = 'business';
				}else {
					$getType = $this->input->get('type');
					//echo $getType;
					if(!empty($data_row) && $data_row->ORG_NAME != ''){
						$data['type'] = 'salaried';	
					}else {
						if(!empty($getType)){
							if($getType == 'notworking'){
								$data['type'] = 'notworking';
								//redirect('customer/customer_documents?ID='.$id.'&error=', 'refresh');
							}else {
								$data['type'] = 'salaried';
								if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
							}
						}else {
							$data['type'] = 'salaried';
							if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
						}				
					}						
				}
	
				$type = array('USER_TYPE' => $data['type']);
	
				$this->Customercrud_model->update_user_type($id,$type);
				$this->session->set_userdata("PATIENT_USER_TYPE", $data['type']);
				$this->load->view('header', $data);
				$this->load->view('customer/customer_update_profile_2_income', $data);
			  }
            else
			{
			$id = $this->input->get("ID");
			
		
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
			
			$coappid = $this->input->get("COAPPID");
			if($coappid!='')$id = $coappid;
			$cust_row = $this->Customercrud_model->getProfileData($id);
			$data_row = $this->Customercrud_model->getProfileDataIncome($id);	
			$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
			$perms_type = $this->input->get('type');
			
			
			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;		
			$data['row'] = $data_row;
			$data['cust_row']=$cust_row;
			$data['row_more']=$data_row_more;
			$data['profile_percentage'] = $cust_row->PROFILE_PERCENTAGE;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			if(!empty($data_row) && $data_row->BIS_PROFESSION != ''){
				$data['type'] = 'business';
			}else {
				$getType = $this->input->get('type');
				//echo $getType;
				if(!empty($data_row) && $data_row->ORG_NAME != ''){
					$data['type'] = 'salaried';	
				}else {
					if(!empty($getType)){
						if($getType == 'notworking'){
							$data['type'] = 'notworking';
							//redirect('customer/customer_documents?ID='.$id.'&error=', 'refresh');
						}else {
							$data['type'] = 'salaried';
							if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
						}
					}else {
						$data['type'] = 'salaried';
						if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
					}				
				}						
			}

			$type = array('USER_TYPE' => $data['type']);

			$this->Customercrud_model->update_user_type($id,$type);
			$this->session->set_userdata("PATIENT_USER_TYPE", $data['type']);
			$this->load->view('header', $data);
			$this->load->view('customer/customer_update_profile_2_income', $data);
		}
		}
		public function coapplicant_new_screen_one()
		{
			//$Cust_consent_id = $id;
			$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
			//$cust_consent_status ="true";
			$cust_consent_status  =$this->session->userdata("cust_consent_status");
			$user_type_from_session=$this->session->userdata("user_type_from_session");
			//echo $Cust_consent_id;
			//echo $cust_consent_status;
			//echo $user_type_from_session;
			//exit();
			if($user_type_from_session=='DSA' && isset($Cust_consent_id))
              {
            	$id=$Cust_consent_id;
				$coappId = $this->input->get("COAPPID");
			
			     $data_row_more = $this->Customercrud_model->getCoapplicantDetails($id, $coappId);	
			
			    $this->load->helper('url');	
			    $data['id']=$id;
			
			    $data['showNav'] = 1;
			    $data['age'] = 0;
			    $data['userType'] = $this->session->userdata("USER_TYPE");
			    $data['row_more'] = $data_row_more;
				
		     	$this->load->view('header', $data);
			    $this->load->view('customer/coapplicant_details_screen_one');
              }
			else
			{

			$id = $this->input->get("UID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
			$coappId = $this->input->get("COAPPID");
			
			$data_row_more = $this->Customercrud_model->getCoapplicantDetails($id, $coappId);	
			
			$this->load->helper('url');	
			$data['id']=$id;
			
			$data['showNav'] = 1;
			$data['age'] = 0;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['row_more'] = $data_row_more;
			
			$this->load->view('header', $data);
			$this->load->view('customer/coapplicant_details_screen_one');
			}
		}

		public function coapplicant_new_screen_two()
		{
			
			//$id = $this->session->userdata("ID");
			$coappId = $this->input->get("COAPPID");
			$data_row = $this->Customercrud_model->getCoapplicantIncomeDetails($coappId);
				
			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = 0;	
			$data['co_app'] = $coappId;		
			$data['row'] = $data_row;		
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$getType = $this->input->get('type');
			
			
			if(!empty($data_row->COAPP_TYPE)){
				
				$data['type'] = $data_row->COAPP_TYPE;
			}
			else
			{
				
				$data['type']= $getType;
			}
         
	
		
			$type = array('USER_TYPE' => $data['type']);
         
			$this->Customercrud_model->update_coapp_user_type($coappId,$type);
				
			$coapp_data=$this->Customercrud_model->getProfileData_coapp($coappId);
			$data['coapp_data']=$coapp_data;
			
			$this->session->set_userdata("PATIENT_USER_TYPE", $data['type']);
			$this->load->view('header', $data);
			$this->load->view('customer/coapplicant_income_screen_2', $data);
		}

		public function customer_edit_profile_3_loanapp()
		{
			$statle_str = file_get_contents(base_url('json/allCities.json'));
			$state_json = json_decode($statle_str, true);
			$states = array_keys($state_json);

			$id = $this->session->userdata("ID");
			$data_row = $this->Customercrud_model->getProfileData($id);	
			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['row'] = $data_row;
			$data['states'] = $states;
			$data['type'] = 'salaried';
			if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
			$this->load->view('header', $data);
			$this->load->view('customer/customer_update_profile_3_loanapp', $data);
		}

		public function customer_edit_profile_1()
		{
			$id = $this->session->userdata("ID");
			$data_row = $this->Customercrud_model->getProfileData($id);	
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['row'] = $data_row;
			$this->load->view('header', $data);
			$this->load->view('customer/customer_update_profile_1');
		}

		public function moreinfo()
		{
			if($this->session->userdata("USER_TYPE") == ''){
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['userType'] = "none";
				$this->load->view('header', $data);
				$this->load->view('login');
			}else{
				$id = $this->session->userdata("ID");
				$data_row = $this->Customercrud_model->getProfileData($id);
				$this->load->helper('url');
				$age = $this->session->userdata('AGE');
				$data['showNav'] = 1;
				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				$data['row'] = $data_row;
				$this->load->view('header', $data);
				$this->load->view('customer/customermoreinfo');
			}
		}

		public function customer_documents()
		{
			$u_type = $this->session->userdata("USER_TYPE");//user which nis loging important for dashbord
				$login_user_id = $this->input->get("DID");
			
			    $data['dsa_id']=$login_user_id;
				if(  $data['dsa_id'] == '')
				{
					$data['dsa_id'] = $this->session->userdata("dsa_id");
				}
			$id = $this->input->get("UID"); //Applicant ID
			$data_row = $this->Customercrud_model->getDocuments($id);//get applicant uploaded documents;
			$row=$this->Customercrud_model->getProfileData($id);// get applicant details
			$role=$row->ROLE;// assign role of applicant
			$doc_type_user = $role;//select document where document only for customer
			$data_doctype = "";//$this->Customercrud_model->getDocumentsType($doc_type_user);
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = $age;//for dashbord
            $data['data_row']=$row;//for dashbord
			$inc_src = $this->Customercrud_model->get_user_type_Income($id);//applicant type saleried and self employeed
			$Master_type_documen_customer=$this->Customercrud_model->getDocuments_Type_customer_Master();//Distinct Master type from table Like Kyc ,residance,Employment											
			$Uploded_Doc_Count=$this->Customercrud_model->getUploded_Documents_Type($id);
			$Total_savedDocType=0;//Total mandatory document save by applicant count 
			$Total_mandatory_doc_count=0;
			$Total_mandatory_doc_count_inc_src=$this->Customercrud_model->inc_src_doc_count($doc_type_user,$inc_src);
			$data_doctype=array();
			if($inc_src=='retired')
			{
				$Master_type_documen_customer=$this->Customercrud_model->getDocuments_Type_customer_Master_retired();
				//print_r($Master_type_documen_customer);
				//exit;
				
			}else{
				
			}
			//echo $Total_mandatory_doc_count_inc_src;
			foreach ($Master_type_documen_customer as $Documents)
			{
				
				//echo $Documents->DOC_MASTER_TYPE,'<br>';
				if($Documents->DOC_MASTER_TYPE=='EMPLOYMENT PROOF')
				{
				//echo "hello".'<br>';
					
					$data_doctype = $this->Customercrud_model->getDocumentsType_by_Employment_type($Documents->DOC_MASTER_TYPE,$doc_type_user,$inc_src );
					/*$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user,$inc_src );*/
					$mandatory_doc_count=$this->Customercrud_model->get_Mandatory_doc_count_for_employment($doc_type_user,$Documents->DOC_MASTER_TYPE,$inc_src);
					$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, $Documents->DOC_MASTER_TYPE);
					$Total_savedDocType=$Total_savedDocType+$savedDocType->doc_count;
					$Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
					//echo $Total_savedDocType.'<br>';
					
					
				}
				else if($Documents->DOC_MASTER_TYPE=='INCOME PROOF')
				{
					if($inc_src=='self employeed')
						{
							$ITR_status = $this->Customercrud_model->get_user_itr_yes_no($id);//ITR yes or no
							if($ITR_status=='no')
							{
								continue;
							}
							else
							{
								$data_doctype = $this->Customercrud_model->getDocumentsType_by_Employment_type($Documents->DOC_MASTER_TYPE,$doc_type_user,$inc_src );
								/*$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user,$inc_src );*/
								$mandatory_doc_count=$this->Customercrud_model->get_Mandatory_doc_count_for_employment($doc_type_user,$Documents->DOC_MASTER_TYPE,$inc_src);
								$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, $Documents->DOC_MASTER_TYPE);
								$Total_savedDocType=$Total_savedDocType+$savedDocType->doc_count;
								$Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
							}
							
						}
						else
						{
							    $data_doctype = $this->Customercrud_model->getDocumentsType_by_Employment_type($Documents->DOC_MASTER_TYPE,$doc_type_user,$inc_src );
								/*$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user,$inc_src );*/
								$mandatory_doc_count=$this->Customercrud_model->get_Mandatory_doc_count_for_employment($doc_type_user,$Documents->DOC_MASTER_TYPE,$inc_src);
								$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, $Documents->DOC_MASTER_TYPE);
								$Total_savedDocType=$Total_savedDocType+$savedDocType->doc_count;
								$Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
						}
					
				}
				
				
				
				else
				{
					//echo "hello1".'<br>';
					
					
					//echo $Total_savedDocType.'<br>';
					  if($Documents->DOC_MASTER_TYPE=='Home Loans'||$Documents->DOC_MASTER_TYPE=='LAP'||$Documents->DOC_MASTER_TYPE=='Re-Finance'||$Documents->DOC_MASTER_TYPE=='Balance Transfer'|| $Documents->DOC_MASTER_TYPE=='House Construction On Self Own Plot'|| $Documents->DOC_MASTER_TYPE=='Home Improvement Loans')
					  {
						  $Total_mandatory_doc_count=$Total_mandatory_doc_count+0;
					  }
					  else
					  {
						$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user,$Documents->DOC_MASTER_TYPE );
						$mandatory_doc_count=$this->Customercrud_model->get_Mandatory_doc_count($doc_type_user,$Documents->DOC_MASTER_TYPE );
						$savedDocType =$this->Customercrud_model->getSavedDocumentsCountWithMaster($id, $Documents->DOC_MASTER_TYPE);
						$Total_savedDocType=$Total_savedDocType+$savedDocType->doc_count;
						  $Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
					  }
					//$Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
					//echo $Documents->DOC_MASTER_TYPE.'<br>';
					
					
					
				}
				

			/*	echo $Documents->DOC_MASTER_TYPE.'<br>';
					echo $Total_mandatory_doc_count+$Total_mandatory_doc_count_inc_src.'<br>';
				    echo $Total_savedDocType.'<br>';
				    echo $savedDocType->doc_count.'<br>';*/
				if($Total_mandatory_doc_count==$Total_savedDocType)
				{
					//$data_doctype =$this->Customercrud_model->getDocumentsType_by_Employment_type_other($inc_src);
					
					$data_doctype =$this->Customercrud_model->Get_Other_Documents($inc_src);
					
					//$data_doctype=array();
					$data['doc_type'] ='';
					$data['doc_count'] =count($data_doctype);
					$data['message'] = "All Document uploaded sucessfully. If you want to upload other document you can upload here.";
					$data['save'] = true;
					
				}
				else
				{
					
					if($savedDocType->doc_count==$mandatory_doc_count || $Documents->DOC_MASTER_TYPE=='Home Loans'||$Documents->DOC_MASTER_TYPE=='LAP'||$Documents->DOC_MASTER_TYPE=='Re-Finance'||$Documents->DOC_MASTER_TYPE=='Balance Transfer'|| $Documents->DOC_MASTER_TYPE=='House Construction On Self Own Plot'|| $Documents->DOC_MASTER_TYPE=='Home Improvement Loans' ||  $mandatory_doc_count==0 ){
						//echo "hello2".'<br>';
						 //$Total_savedDocType=$Total_savedDocType+$savedDocType;
						continue;
					}
					else
					{
					//echo "hello3".'<br>';
						//exit;
					$data['doc_type'] = $Documents->DOC_MASTER_TYPE;
					$data['doc_count'] = count($data_doctype);
					$data['message'] = "Upload  document for ".$Documents->DOC_MASTER_TYPE.'. '. $mandatory_doc_count .' Documents are mandatory';
					//$data['doc_mandatory']=;
					$data['save'] = false;
					break;
					}
				}
				
				
			}
			//echo $Total_mandatory_doc_count;
			
			$data['row']=$row;
			$data['age'] = $age;
			$data['error'] = '';
			$data['userType'] = $u_type;
			$data['documents'] = $data_row;
			$data['documents_type'] = $data_doctype;
			$data['user_type'] = $inc_src;
			$this->load->view('header', $data);
			$data['error'] = $this->input->get('error');
			/*echo '<pre>';
			print_r($data);
			exit;*/
			$this->session->set_flashdata('message',$data['message']);
			$this->load->view('customer/customerdocumentsnew', $data);
			/*echo'<pre>';
			print_r($Master_type_documen_customer);
			exit();*/
			

		}
		

		
		public function home_loan_doc()
		{
			//echo "hello";
			$u_type = $this->session->userdata("USER_TYPE");
			$id = $this->input->get("UID");
			$data['id']=$id;
			 $masterType=$this->session->userdata('home_loan_type');

			
			$data['dsa_id'] = $this->session->userdata("dsa_id");

			//$masterType = "Home Loans";
			
			$data_row = $this->Customercrud_model->getDocuments_homeloan($id,$masterType); // get users uploaded documents
		   
			$row=$this->Customercrud_model->getProfileData($id);
			
			$role=$row->ROLE;
		

			$doc_type_user = $role;
			$data_doctype = "";//$this->Customercrud_model->getDocumentsType($doc_type_user);
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$q = 1;
		
			$data['showNav'] = $age;

			
			
			$require_doc = $this->Customercrud_model->getDocumentscount_for_homeloan($doc_type_user, $masterType);
			$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster_home($id, $masterType);
			
		//	 echo $doc_type_user;

		//	exit;
			if($savedDocType>= $require_doc){
				
				                 $data['save'] = true;
								$data_doctype = $this->Customercrud_model->getDocumentsType_for_homeloan($doc_type_user, $masterType);
								$data['doc_type'] = $masterType;
								$data['doc_count'] = 2;
								$data['message'] = "Required documents Uploaded Successfully";
				

						}
						else
						{
							
							$data_doctype = $this->Customercrud_model->getDocumentsType_for_homeloan($doc_type_user, $masterType);
							$data['doc_type'] = $masterType;
							$data['doc_count'] = 2;
							$data['message'] = "Upload document for home loan";
							$data['save'] = false;

						}

						//print_r($data_row);
				
			$data['age'] = $age;
			$data['error'] = '';
			$data['userType'] = $u_type;
			//$data['coapp_id'] = $u_id;
			$data['documents'] = $data_row;
			$data['documents_type'] = $data_doctype;
			$data['masterType']=$masterType;
			//$data['user_type'] = $inc_src;

			
			$this->load->view('header', $data);
			$data['error'] = $this->input->get('error');
			$this->session->set_flashdata('message',$data['message']);
			$this->load->view('customer/customer_home_laon_doc', $data);
			
		}
		public function lap_loan_doc()
		{
			//echo "hello";
			$u_type = $this->session->userdata("USER_TYPE");
			$id = $this->input->get("UID");
			 $data['dsa_id'] = $this->session->userdata("dsa_id");
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				$data['dsa_id'] = $this->session->userdata("dsa_id");
			
			$data['id']=$id;
			$data_row = $this->Customercrud_model->getDocuments_lap_loan($id); // get users uploaded documents
			
		    $row=$this->Customercrud_model->getProfileData($id);
			
			$role=$row->ROLE;
            if($row->ROLE=2)
			{
				$role=1;
			}
			$doc_type_user = $role;
			//$doc_type_user = 2;
			//if($u_type == 'CUSTOMER')$doc_type_user = 1;
			$data_doctype = "";//$this->Customercrud_model->getDocumentsType($doc_type_user);
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$q = 1;
			if($u_type == 'DSA')$q = 2;
			$data['showNav'] = $age;

			
			$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "LAP");
			$require_doc = $this->Customercrud_model->getDocumentscount_for_LAP($doc_type_user, "LAP");
			
			
			if($savedDocType->doc_count >= $require_doc){
				
				                 $data['save'] = true;
								$data_doctype = $this->Customercrud_model->getDocumentsType_for_homeloan($doc_type_user, "LAP");
								$data['doc_type'] = "LAP";
								$data['doc_count'] = 1;
								$data['message'] = "All documents Uploaded Successfully";
				

						}
						else
						{
							
							$data_doctype = $this->Customercrud_model->getDocumentsType_for_homeloan($doc_type_user, "LAP");
							$data['doc_type'] = "LAP";
							$data['doc_count'] = 1;
							$data['message'] = "Upload document for loan agaist Property";

						}
				
			$data['age'] = $age;
			$data['error'] = '';
			$data['userType'] = $u_type;
			//$data['coapp_id'] = $u_id;
			$data['documents'] = $data_row;
			$data['documents_type'] = $data_doctype;
			//$data['user_type'] = $inc_src;

			
			$this->load->view('header', $data);
			$data['error'] = $this->input->get('error');
			$this->session->set_flashdata('message',$data['message']);
			$this->load->view('customer/customer_lap_laon_doc', $data);
			
		}

		public function dsa_documents_upload()
		{
			$u_type = $this->session->userdata("USER_TYPE");
			$id = $this->session->userdata("ID");
			
			
			$data_row = $this->Customercrud_model->getDocuments($id);
			$doc_types= $this->Customercrud_model->getDocuments_Doctype($id);
			
			
			$doc_type_user = 2;
			$data_doctype = "";//$this->Customercrud_model->getDocumentsType($doc_type_user);
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$q = 1;
			if($u_type == 'DSA')$q = 2;
			$age = 0;
			$data['showNav'] = $age;
		
			$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "kyc");
			
			if($savedDocType->doc_count > 0){
				
				$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "residential");
			  
				if($savedDocType->doc_count > 0){
						
					$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "income");
					
					if($savedDocType->doc_count > 0){
						$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "business");
						
						if($savedDocType->doc_count > 0){
							$data['save'] = true;
							$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "BUSINESS");
							$data['doc_type'] = "business";
							$data['doc_count'] = 4;
							if(!empty($data_doctype))
								{
									$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "BUSINESS");
									$data['doc_type'] = "business";
							        $data['doc_count'] = 4;
								}
								else
								{
									 $data_doctype="";
									 $data['doc_type'] = "none";
									 $data['doc_count'] = 1;
								}
						}else{
							$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "BUSINESS");
							
							if(!empty($data_doctype))
								{
									$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "BUSINESS");
									$data['doc_type'] = "business";
							        $data['doc_count'] = 4;
								}
								else
								{
									 $data_doctype="";
									 $data['doc_type'] = "none";
									 $data['doc_count'] = 1;
								}
						}
					}else{
						$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "INCOME");
							
						if(!empty($data_doctype))
						{
							$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "INCOME");
							$data['doc_type'] = "income";
						    $data['doc_count'] = 3;
						}
						else
						{
							$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "BUSINESS");
							
							if(!empty($data_doctype))
						     {
								 $data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "BUSINESS");
								 $data['doc_type'] = "business";
							     $data['doc_count'] = 4;
							 }
							 else
							 {
								 $data_doctype="";
								 $data['doc_type'] = "none";
								 $data['doc_count'] = 1;
							 }
						}

					}
				}else{
					
					$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "RESIDENTIAL");
					 
					if(!empty($data_doctype))
					{
						$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "RESIDENTIAL");
						$data['doc_type'] = "residential";
						$data['doc_count'] = 2;
					}
					else
					{
						
						$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "INCOME");
						
						if(!empty($data_doctype))
						{
							$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "INCOME");
							$data['doc_type'] = "income";
						    $data['doc_count'] = 3;
						}
						else
						{
							$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "BUSINESS");
							
							if(!empty($data_doctype))
						     {
								 $data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "BUSINESS");
								 $data['doc_type'] = "business";
							     $data['doc_count'] = 4;
							 }
							 else
							 {
								 $data_doctype="";
								 $data['doc_type'] = "none";
								 $data['doc_count'] = 1;
							 }
						}
						
						
						
					}

				}			
			}else{
				$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "KYC");
				$data['doc_type'] = "kyc";
				$data['doc_count'] = 1;
				
			}
           
			$data['age'] = $age;
			$data['error'] = '';
			$data['userType'] = $u_type;
			$data['documents'] = $data_row;
			$data['documents_type'] = $data_doctype;
			$data['doc_types']=$doc_types;
			$this->load->view('header', $data);
			$data['error'] = $this->input->get('error');
			$this->load->view('dsa/dsa_documents_upload', $data);
		}

		public function score_error_popup()
		{
			$error = $this->input->get('error');
			$data['error'] = $error;
			$this->load->view('customer/score_error_popup', $data);
		}

		public function credit_score_update_user_details()
		{
			$id = $this->input->get("UID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
			$reditScoreSavedProfileData = $this->Customercrud_model->getCreditScoreSavedProfileData($id);
			$u_type = $this->session->userdata("USER_TYPE");
			$error = $this->input->get('error');
			$data['error'] = $error;
			$data['showNav'] = 0;
			$data['age'] = 0;
			$data['userType'] = $u_type;
			$data['id']=$id;
			if($reditScoreSavedProfileData)$data['row'] = $reditScoreSavedProfileData;
			$this->load->view('header', $data);
			$this->load->view('customer/credit_score_update_user_details', $data);
		}

		public function customer_score_update_user_details_action()
		{
			$id = $this->input->get("UID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				$cust_id=$id;
			$data = [];
			$data['customer_id'] = $id;
			$data['postal_code'] = $this->input->post('resi_pincode');
			$data['address_line_1'] = $this->input->post('resi_add_1');
			$data['address_line_2'] = $this->input->post('resi_add_2');
			$data['state'] = $this->input->post('resi_state');
			$data['locality'] = $this->input->post('resi_city');
			$data['city'] = $this->input->post('resi_city');
			$data['first_name'] = $this->input->post('f_name');
			$data['last_name'] = $this->input->post('l_name');
			$data['dob'] = $this->input->post('dob');
			$data['email'] = $this->input->post('email');
			$data['mobile'] = $this->input->post('mobile');
			$data['gender'] = $this->input->post('gender');
			$data['pan'] = $this->input->post('pan');
			
			$id = $this->Customercrud_model->save_credit_score_user_details($data);	
			if($id > 0){
				$response = array('status' => 1, 'message' => 'You have successfully updated details for credit score, now you call check your credit score.','UID'=>$cust_id);
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Some unknown error coming, please try again.','UID'=>$cust_id);
				echo json_encode($response);
			}
		}

		public function customer_apply_for_loan_next()
		{ 
			$coapp_id=$this->input->get('coapp_id');
			$array_input_more = array(
				'UNIQUE_CODE' => $coapp_id,
				'PROFILE_PERCENTAGE'=>100
				);
				$dsa_id=$this->session->userdata("dsa_id");
				$data['dsa_id']=$dsa_id;
			 $Result_id1 = $this->Customercrud_model->update_coapplicant($coapp_id, $array_input_more);
		//$Cust_consent_id = $id;
		$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
		//$cust_consent_status ="true";
		$cust_consent_status  =$this->session->userdata("cust_consent_status");
        $user_type_from_session=$this->session->userdata("user_type_from_session");
		
		//echo $Cust_consent_id;
		//echo $cust_consent_status;
		//exit();
        
		if($user_type_from_session=='DSA' && isset($Cust_consent_id))
		{
			//echo $user_type;
			//echo $Cust_consent_id;
			//exit();
			//echo $Cust_consent_id ;
			//echo $cust_consent_status;
			//echo $user_type_from_session;
			//exit();
			$id=$Cust_consent_id;
            $data['id']=$id;
				
			    if($this->Customercrud_model->check_credit_score($id)){
				$row = $this->Customercrud_model->get_saved_credit_score($id);
			
				$data['score'] = $row->score;
				$data['score_success'] = 1;
				$this->session->set_userdata("score", $row->score);
				$this->load->helper('url');
				$data['showNav'] = 1;
				$data['age'] = '';
				$data['error'] = '';
				$data['type'] = 'home';
				$type = $this->input->get('type');
				if($type!='')$data['type'] = $type;
				

				$co_app = $this->Customercrud_model->getMyCoapplicants($id);
				$form_data =$this->Customercrud_model->getCustomerIncomeInfoget_home_form_data($id);
				$data['userType'] = $this->session->userdata("USER_TYPE");
				$data['co_app'] = $co_app;
				$isCoapp = count($co_app) > 0 ? 'true' : 'false';
				$isProfileFull = 'false';
				for ($i=0; $i < count($co_app); $i++) { 
					if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
				}
				$data['coapplicant'] = $isCoapp;
				$data['isProfileFull'] = $isProfileFull;
				$data['form_data']=$form_data;
				$data['banks']=$this->Customercrud_model->get_banks();
				
				$this->load->view('header', $data);
				$this->load->view('customer/customer_apply_loan_screen_1',$data);
				//exit;
			}
			else
			{
				
				$data['score_success'] = 1;
				$this->session->set_userdata("score", '0');
				$this->load->helper('url');
				$data['showNav'] = 1;
				$data['age'] = '';
				$data['error'] = '';
				$data['type'] = 'home';
				$data['score'] = '0';
				$type = $this->input->get('type');
				if($type!='')$data['type'] = $type;
				
				
				$co_app = $this->Customercrud_model->getMyCoapplicants($id);
				$form_data =$this->Customercrud_model->getCustomerIncomeInfoget_home_form_data($id);
				$data['userType'] = $this->session->userdata("USER_TYPE");
				$data['co_app'] = $co_app;
				$isCoapp = count($co_app) > 0 ? 'true' : 'false';
				$isProfileFull = 'false';
				for ($i=0; $i < count($co_app); $i++) { 
					if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
				}
				$data['coapplicant'] = $isCoapp;
				$data['isProfileFull'] = $isProfileFull;
				$data['form_data']=$form_data;
				$data['banks']=$this->Customercrud_model->get_banks();
				$this->load->view('header', $data);
				$this->load->view('customer/customer_apply_loan_screen_1',$data);
			}

		}
		else
		{
			$id = $this->input->get("UID");
			if ($id == '') {
					$id = $this->session->userdata("ID");
				}
			$data['id']=$id;
				
			if($this->Customercrud_model->check_credit_score($id)){
				$row = $this->Customercrud_model->get_saved_credit_score($id);
			
				$data['score'] = $row->score;
				$data['score_success'] = 1;
				$this->session->set_userdata("score", $row->score);
				$this->load->helper('url');
				$data['showNav'] = 1;
				$data['age'] = '';
				$data['error'] = '';
				$data['type'] = 'home';
				$type = $this->input->get('type');
				if($type!='')$data['type'] = $type;
				

				$co_app = $this->Customercrud_model->getMyCoapplicants($id);
				$form_data =$this->Customercrud_model->getCustomerIncomeInfoget_home_form_data($id);
				$data['userType'] = $this->session->userdata("USER_TYPE");
				$data['co_app'] = $co_app;
				$isCoapp = count($co_app) > 0 ? 'true' : 'false';
				$isProfileFull = 'false';
				for ($i=0; $i < count($co_app); $i++) { 
					if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
				}
				$data['coapplicant'] = $isCoapp;
				$data['isProfileFull'] = $isProfileFull;
				$data['form_data']=$form_data;
				$data['banks']=$this->Customercrud_model->get_banks();
				$this->load->view('header', $data);
				$this->load->view('customer/customer_apply_loan_screen_1',$data);
				//exit;
			}
			else
			{
				
				$data['score_success'] = 1;
				$this->session->set_userdata("score", '0');
				$this->load->helper('url');
				$data['showNav'] = 1;
				$data['age'] = '';
				$data['error'] = '';
				$data['type'] = 'home';
				$data['score'] = '0';
				$type = $this->input->get('type');
				if($type!='')$data['type'] = $type;
				
				
				$co_app = $this->Customercrud_model->getMyCoapplicants($id);
				$form_data =$this->Customercrud_model->getCustomerIncomeInfoget_home_form_data($id);
				$data['userType'] = $this->session->userdata("USER_TYPE");
				$data['co_app'] = $co_app;
				$isCoapp = count($co_app) > 0 ? 'true' : 'false';
				$isProfileFull = 'false';
				for ($i=0; $i < count($co_app); $i++) { 
					if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
				}
				$data['coapplicant'] = $isCoapp;
				$data['isProfileFull'] = $isProfileFull;
				$data['form_data']=$form_data;
				$data['banks']=$this->Customercrud_model->get_banks();
				$this->load->view('header', $data);
				$this->load->view('customer/customer_apply_loan_screen_1',$data);
			}
		 }
		}

		public function customer_apply_for_loan()
		{

			$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
            //$cust_consent_status ="true";
            $cust_consent_status  =$this->session->userdata("cust_consent_status");
            $user_type_from_session=$this->session->userdata("USER_TYPE");
            //echo $Cust_consent_id;
            //echo $cust_consent_status;
            //exit();
           if($user_type_from_session=='DSA' && isset($Cust_consent_id) || $user_type_from_session='Relationship_Officer'  && isset($Cust_consent_id) )
           {
			  
             	//echo   $user_type;
	            //echo $Cust_consent_id;
	           //exit();
	           $id=$Cust_consent_id;
			   $data['id']=$id;
			  $this->load->view('customer/loader_view',$data);
            }
		    else
			{

			$id = $this->input->get("UID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
			$data['id']=$id;
			$this->load->view('customer/loader_view',$data);
			}
		}

public function coapplicant_credit_score()
		{

			
			//echo date("Y-m-d h:m:s");exit;
			$id = $this->session->userdata("COAPP_ID");
			//$response = array('status' => 1, 'message' => '');
			//echo json_encode($response);
            
			 if($this->Customercrud_model->check_credit_score($id)){
				$response = array('status' => 1, 'message' => 'hhhhhh');
				echo json_encode($response);
				redirect('customer/customer_apply_for_loan_next');
			}else {
				
				$this->session->set_userdata("score", '');
				$filterArr = [];
				$reditScoreSavedProfileData = $this->Customercrud_model->getCreditScoreSavedProfileData($id);
			    
				if(!$reditScoreSavedProfileData || empty($reditScoreSavedProfileData)){
					$self_profile_data = $this->Customercrud_model->getProfileData_coapp($id);
					//$self_profile_data_more = $this->Customercrud_model->getProfileDataMore($id);
					$filterArr['pan'] = $self_profile_data->PAN_NUMBER;
					$filterArr['email'] = $self_profile_data->EMAIL;
					$filterArr['mobile'] = $self_profile_data->MOBILE;
					$filterArr['first_name'] = $self_profile_data->FN." ".$self_profile_data->LN;
					$filterArr['last_name'] = $self_profile_data->LN;
					$filterArr['address_line_1'] = $self_profile_data->RES_ADDRS_LINE_1;
					$filterArr['address_line_2'] = $self_profile_data->RES_ADDRS_LINE_2;
					$filterArr['locality'] = $self_profile_data->RES_ADDRS_CITY;
					$filterArr['city'] = $self_profile_data->RES_ADDRS_CITY;
					$filterArr['state'] = $self_profile_data->RES_ADDRS_STATE;
					$filterArr['postal_code'] = $self_profile_data->RES_ADDRS_PINCODE;
					$filterArr['dob'] = $self_profile_data->DOB;
					if($self_profile_data->GENDER!=''){
						if($self_profile_data->GENDER == "male")$filterArr['gender'] = "M";
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
				$score = $this->session->userdata("score");
				$code = 0;
				$respnse = "";
				if($score == ''){
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
					
					$dataArr = json_decode($arr);
					
				
					$code = $dataArr->InquiryResponseHeader->SuccessCode;
					if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->Error)){
						$code = 0;
					}else $score = $dataArr->CCRResponse->CIRReportDataLst[0]->CIRReportData->ScoreDetails[0]->Value;
						
					}else $code = 1;
				
				if($code == 1){
					if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->Error)){
						
						$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
						$error_code = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorCode;
						//if($error_code == 'GSWDOE116')echo("id error ".$score_error);
						//else echo("other error");
						
						$data['score'] = 0;
						$data['score_success'] = $score_error;
						$response = array('status' => 0, 'error' => $score_error);
						echo json_encode($response);
						redirect('customer/score_error_popup?error='.$score_error, 'refresh');
					}else{
						$id = $this->session->userdata("COAPP_ID");
						$creditSaveArray = [];
						$creditSaveArray['customer_id'] = $id;
						$creditSaveArray['score'] = $score;
						if($respnse!='')$creditSaveArray['response'] = $respnse;
						$creditSaveArray['checked_dts'] = date("Y-m-d h:m:s");

						$this->Customercrud_model->save_credit_score($creditSaveArray);
						$response = array('status' => 1, 'message' => '');
						echo json_encode($response);	
					}
				}else{
					$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
					
					$error_code = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorCode;
					 
					
					if($error_code >='E0401' && $error_code<='E0420')
					{
						
						$this->session->set_userdata('error_code', $error_code);
						$this->session->set_userdata('score_error_desc', $score_error );
						$data['score'] = 0;
						$data['score_success'] = $score_error;
						$response = array('status' => 0, 'error' => $score_error);
						echo json_encode($response);

						redirect('customer/score_error_popup?error='.$score_error, 'refresh');
					}
					else if($error_code==00 && $score_error=='Consumer not found in bureau')
					{
						$this->session->set_userdata('error_code', $error_code);
						$this->session->set_userdata('score_error_desc', $score_error );
						$data['score'] = 0;
						$data['score_success'] = $score_error;
						$response = array('status' => 0, 'error' => $score_error);
						echo json_encode($response);

						redirect('customer/score_error_popup?error='.$score_error, 'refresh');
					}
					else{
					
					//if($error_code == 'GSWDOE116')echo("id error ".$score_error);
					//else echo("other error");
					  if($error_code == 'GSWDOE116')
					  {
						  $strpos = strpos($score_error, ':');
						  $score_error = substr($score_error, ($strpos+1));
					  }
					
					$data['score'] = 0;
					$data['score_success'] = $score_error;
					$response = array('status' => 0, 'error' => $score_error);
					echo json_encode($response);

					redirect('customer/score_error_popup?error='.$score_error, 'refresh');
					}
					
				}

				redirect('customer/customer_apply_for_loan_next');
			}
			
			
		}
		
		public function customer_apply_for_loan_with_score_credit()
		{

			
			//echo date("Y-m-d h:m:s");exit;
			$id = $this->input->get("UID");
			//$response = array('status' => 1, 'message' => '');
			//echo json_encode($response);
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
			 $this->session->set_userdata('UID',$id);
			$cust_id=$id;
			if($this->Customercrud_model->check_credit_score($id)){
				$response = array('status' => 1, 'message' => '');
				echo json_encode($response);
			}else {
				
				$this->session->set_userdata("score", '');
				$filterArr = [];
				$reditScoreSavedProfileData = $this->Customercrud_model->getCreditScoreSavedProfileData($id);
			  
				if(!$reditScoreSavedProfileData || empty($reditScoreSavedProfileData)){
					$self_profile_data = $this->Customercrud_model->getProfileData($id);
					$self_profile_data_more = $this->Customercrud_model->getProfileDataMore($id);
					$filterArr['pan'] = $self_profile_data->PAN_NUMBER;
					$filterArr['email'] = $self_profile_data->EMAIL;
					$filterArr['mobile'] = $self_profile_data->MOBILE;
					$filterArr['first_name'] = $self_profile_data->FN." ".$self_profile_data->LN;
					$filterArr['last_name'] = $self_profile_data->LN;
					$filterArr['address_line_1'] = $self_profile_data_more->RES_ADDRS_LINE_1;
					$filterArr['address_line_2'] = $self_profile_data_more->RES_ADDRS_LINE_2;
					$filterArr['locality'] = $self_profile_data_more->RES_ADDRS_CITY;
					$filterArr['city'] = $self_profile_data_more->RES_ADDRS_CITY;
					$filterArr['state'] = $self_profile_data_more->RES_ADDRS_STATE;
					$filterArr['postal_code'] = $self_profile_data_more->RES_ADDRS_PINCODE;
					// $filterArr['dob'] = base64_decode($self_profile_data->DOB);
					$filterArr['dob'] =$self_profile_data->DOB;
					if($self_profile_data->GENDER!=''){
						if($self_profile_data->GENDER == "male")$filterArr['gender'] = "M";
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
				
				$stateAbbr = $this->Customercrud_model->getStateAbbr($filterArr['state']);
				if($stateAbbr)$filterArr['state'] = $stateAbbr->state_abbr;
				
				$name = "Mana rao";
				/*$url = 'https://ists.equifax.co.in/cir360service/cir360report';
				$dataInput = '{
					"RequestHeader": {
						"CustomerId": "7716",
						"UserId": "STS_FINALE",
						"Password": "W3#QeicsB",
						"MemberNumber": "027FP28332",
						"SecurityCode": "7AY",
						"CustRefField": "5000",
						"ProductCode": ["IDCR"]
					},*/
					$url ='https://eportuat.equifax.co.in/cir360Report/cir360Report';
					 $dataInput = '{
						 "RequestHeader": {
							"CustomerId": "21",
							"UserId": "UAT_FINFIN",
							"Password": "V2*Pdhbr",
							"MemberNumber": "028FZ00016",
							"SecurityCode": "FR7",
							"CustRefField": "123456",
							"ProductCode": [
								"CCR"
							]
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
					
					$dataArr = json_decode($arr);
				
					
				
					$code = $dataArr->InquiryResponseHeader->SuccessCode;
					if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->Error)){
						$code = 0;
					}elseif(isset($dataArr->CCRResponse) )
						{ 
							 $score = $dataArr->CCRResponse->CIRReportDataLst[0]->CIRReportData->ScoreDetails[0]->Value;
						}
					
						
				}
				else $code = 1;
				
				if($code == 1){
					if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->Error)){
						
						$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
						$error_code = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorCode;
						//if($error_code == 'GSWDOE116')echo("id error ".$score_error);
						//else echo("other error");
						
						$data['score'] = 0;
						$data['score_success'] = $score_error;
						$response = array('status' => 0, 'error' => $score_error);
						echo json_encode($response);
						redirect('customer/score_error_popup?error='.$score_error, 'refresh');
					}else{
						//$id = $this->session->userdata("ID");
						$creditSaveArray = [];
						$creditSaveArray['customer_id'] = $id;
						$creditSaveArray['score'] = $score;
						if($respnse!='')$creditSaveArray['response'] = $respnse;
						$creditSaveArray['checked_dts'] = date("Y-m-d h:m:s");
                        $profile_data=$this->Customercrud_model->getProfileData($id);
						$this->Customercrud_model->save_credit_score($creditSaveArray);
						$response = array('status' => 1, 'message' => '','UID'=>$cust_id);
						echo json_encode($response);
                        $this->pdf($arr,$profile_data);					
					}
				}else{
					if(isset($dataArr->CCRResponse) )
					{
						$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
						
						$error_code = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorCode;
						
						if($error_code >='E0401' && $error_code<='E0420')
						{
							
							$this->session->set_userdata('error_code', $error_code);
							$this->session->set_userdata('score_error_desc', $score_error );
							$data['score'] = 0;
							$data['score_success'] = $score_error;
							$response = array('status' => 0, 'error' => $score_error);
							echo json_encode($response);

							redirect('customer/score_error_popup?error='.$score_error, 'refresh');
						}
						else if($error_code==00 && $score_error=='Consumer not found in bureau')
						{
							$this->session->set_userdata('error_code', $error_code);
							$this->session->set_userdata('score_error_desc', $score_error );
							$data['score'] = 0;
							$data['score_success'] = $score_error;
							$response = array('status' => 0, 'error' => $score_error);
							echo json_encode($response);

							redirect('customer/score_error_popup?error='.$score_error, 'refresh');
						}
						else{
						
						//if($error_code == 'GSWDOE116')echo("id error ".$score_error);
						//else echo("other error");
						 if($error_code == 'GSWDOE116')
						  {
							  $strpos = strpos($score_error, ':');
							  $score_error = substr($score_error, ($strpos+1));
						  }
						
						$data['score'] = 0;
						$data['score_success'] = $score_error;
						$response = array('status' => 0, 'error' => $score_error);
						echo json_encode($response);

						redirect('customer/score_error_popup?error='.$score_error, 'refresh');
						}
					}
					else
					{
                         $score_error = $dataArr->Error->ErrorDesc;
						
						$error_code = $dataArr->Error->ErrorCode;
						$data['score'] = 0;
						$data['score_success'] = $score_error;
						$response = array('status' => 0, 'error' => $score_error);
						echo json_encode($response);

						redirect('customer/score_error_popup?error='.$score_error, 'refresh');
					}
					
				}
			}
			
		}
		

		public function customer_apply_for_loan_lap()
		{

           //$Cust_consent_id = $id;
			$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
			//$cust_consent_status ="true";
			$cust_consent_status  =$this->session->userdata("cust_consent_status");
			$user_type_from_session=$this->session->userdata("user_type_from_session");
			//echo $Cust_consent_id;
			//echo $cust_consent_status;
			//exit();
			//$$user_type= $this->session->userdata("USER_TYPE");
			if($user_type_from_session=='DSA' && isset($Cust_consent_id) || $user_type_from_session=='branch_manager' && isset($Cust_consent_id) || $user_type_from_session=='Relationship_Officer' && isset($Cust_consent_id)  || $user_type_from_session=='Cluster_Manager' && isset($Cust_consent_id)  ||  $user_type_from_session=='Sales_Manager' && isset($Cust_consent_id) || $user_type_from_session=='Operations_user' && isset($Cust_consent_id) )
			
			{
				//echo   $user_type;
				//echo $Cust_consent_id;
				//exit();
				$id=$Cust_consent_id;
				$this->load->helper('url');
			$data['showNav'] = 1;
			$data['age'] = '';
			$data['error'] = '';
			$data['type'] = 'lap';
			$type = $this->input->get('type');
			if($type!='')$data['type'] = $type;
			
			
			$score = $this->session->userdata("score");
			$data['score'] = $score;
			$co_app = $this->Customercrud_model->getMyCoapplicants($id);
			$form_data =$this->Customercrud_model->getCustomerIncomeInfoget_lap_form_data($id);
			//$get_lap_loan_details=$this->Customercrud_model->get_Lap_loan_details($id);
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['co_app'] = $co_app;
			//$isCoapp = 'true';
			//$isProfileFull = 'true';
			// added by priyanka-------------------------------
			    $isCoapp = count($co_app) > 0 ? 'true' : 'false';
				$isProfileFull = 'false';
				for ($i=0; $i < count($co_app); $i++) { 
					if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
				}
			//------------------------------------------------
			$data['id']=$id;
			$data['coapplicant'] = $isCoapp;
			$data['isProfileFull'] = $isProfileFull;
			$data['row_more'] =$form_data;
			$data['banks']=$this->Customercrud_model->get_banks();
			$this->load->view('header', $data);
			$this->load->view('customer/customer_apply_loan_lap', $data);
			}
			else
			{

               $id = $this->input->get("UID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}

				// echo $id;
			   //exit();
			$this->load->helper('url');
			$data['showNav'] = 1;
			$data['age'] = '';
			$data['error'] = '';
			$data['type'] = 'lap';
			$type = $this->input->get('type');
			if($type!='')$data['type'] = $type;
			$data['banks']=$this->Customercrud_model->get_banks();
			
			$score = $this->session->userdata("score");
			$data['score'] = $score;
			$co_app = $this->Customercrud_model->getMyCoapplicants($id);
			//$get_lap_loan_details=$this->Customercrud_model->get_Lap_loan_details($id);
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['co_app'] = $co_app;
			//$isCoapp = 'true';
			//$isProfileFull = 'true';
			// added by priyanka-------------------------------
			$isCoapp = count($co_app) > 0 ? 'true' : 'false';
			$isProfileFull = 'false';
			for ($i=0; $i < count($co_app); $i++) { 
				if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
			}
		    //------------------------------------------------
			$data['id']=$id;
			$data['coapplicant'] = $isCoapp;
			$data['isProfileFull'] = $isProfileFull;
			//$data['row_more'] = $get_lap_loan_details;
			$this->load->view('header', $data);
			$this->load->view('customer/customer_apply_loan_lap', $data);
			}
		}

		public function customer_apply_for_loan_personal_busi_cc()
		{

             $id = $this->input->get("UID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
		    $data['id']=$id;
			$this->load->helper('url');
			$data['showNav'] = 1;
			$data['age'] = '';
			$data['error'] = '';
			$data['type'] = 'personal';
			$type = $this->input->get('type');
			if($type!='')$data['type'] = $type;
			$score = $this->session->userdata("score");
			$data['score'] = $score;
			$data['userType'] = $this->session->userdata("USER_TYPE");		
			$this->load->view('header', $data);
			$this->load->view('customer/customer_apply_loan_personal_busi_cc');
		}

		public function applied_loans_list()
		{
			$age = $this->session->userdata("AGE");
			$id = $this->input->get("UID");
           //	echo $id;
			
				
				/*if ($id == '') {
					$id = $this->session->userdata("ID");
				}*/
			$data_row = $this->Customercrud_model->getAppliedLoans($id);
            //echo 	$id ;
			//exit();

			//------------------------------------------------------------------------------code for application id
              $result_id_row = $this->Customercrud_model->find_customer_entry_id($id);
			//print_r($result_id_row);
			$var=$result_id_row->ID;
			$date_time =$result_id_row->CREATED_AT;
            //echo $var;
			//exit();
            if($result_id_row->LOAN_TYPE=="personal")
			{
				$loan_type="PL";
			}
			if($result_id_row->LOAN_TYPE=="business")
			{
				$loan_type="BL";
			}
			if($result_id_row->LOAN_TYPE=="home")
			{
				$loan_type="HL";
			}
			if($result_id_row->LOAN_TYPE=="lap")
			{
				$loan_type="LP";
			}
			if($result_id_row->LOAN_TYPE=="credit")
			{
				$loan_type="CL";
			}

			$result_id = sprintf('%06s',$var);
			$application_id ="FF".$loan_type.$result_id;
			$array_input_more = array(
												'CUST_ID' => $id,
												'Application_id'=>$application_id,
											);							
			$result_id1 = $this->Customercrud_model->update_loan_application_id($id, $array_input_more,$date_time);
            //----------------------------------------Addded by papiha  on 08_03_2022--------------------------------------------
			$array_input_more = array(
				'CUST_ID' => $id,
				'STATUS'=>('Loan Document Uploaded'),
				'last_updated_date'=>date("Y/m/d")
				);
            $result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);

            //===============================================================================================================	
			$this->load->helper('url');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['error'] = '';
			$data['loans'] = $data_row;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id']=$id;
			$this->load->view('header', $data);
			$this->load->view('customer/aadhar_esign');
			//$this->load->view('customer/applied_loans');
		}

		public function customer_update_profile_2_l(){
			//$this->showErrorMessage("hi mahi");
			$id = $this->session->userdata('ID');
			$dob = $this->input->post('DOB');		
			$diff = abs(strtotime(date("Y-m-d")) - strtotime($dob));
			$years = floor($diff / (365*60*60*24));
			$array_input = array(
				'AGE' => $years,
				'CURRENT_RESIDENTIAL_ADDRESS' => $this->input->post('cra'),
				'EDUCATION_BACKGROUND' => $this->input->post('educationbac'),
				'OCCUPATION' => $this->input->post('occupation'),
				'NATIVE_PLACE' => $this->input->post('nativeplace'),
				'AGRI_LAND_IN_NATIVE' => $this->input->post('alin'),
				'AGRI_INCOME' => $this->input->post('agri_income'),
				'OTHER_INCOME_SOURCE' => $this->input->post('ois'),
				'DOB' => $dob,
				'EXISTING_ACTIVE_LOANS' => $this->input->post('eal'),
				'EXISTING_LOAN_EMI' => $this->input->post('ele'),
				'NO_OF_DEPENDANTS' => $this->input->post('nod'),
				'LIVING_YEAR_PRESENT_ADDRESS' => $this->input->post('paly'),
				'YEARS_IN_CITY_LIVING' => $this->input->post('lic'),
				'IT_RETURN_AVAILABLE' => $this->input->post('ITR'),
				'IT_RETURN_FILED_WITH_GAP' => $this->input->post('ITRG'),
				'ANNUAL_INCOME' => $this->input->post('annual_income'),			
				'TYPE_OF_LOAN' => $this->input->post('loan_type'),
				'PAN_NUMBER' => $this->input->post('Pan'),
				'AADHAR_NUMBER' => $this->input->post('aadhar'),			
				'DESIGNATION' => $this->input->post('designation'),
				'PAST_EMPLOYMENT_DETAILS' => $this->input->post('ped'),		
				'COMPANY_ADDRESS' => $this->input->post('ca'),
				'OFFICE_EMAIL' => $this->input->post('oe'),
				'OFFICE_CONTACT_NO' => $this->input->post('ocn'),
				'CASH_SALARY' => $this->input->post('cs'),
				'GROSS_SALARY' => $this->input->post('gs'),
				'BASIC_SALARY' => $this->input->post('bs'),
				'LOAN_EMI_DEDUCT_FROM_SALARY' => $this->input->post('ledfs'),
				'BANK_CREDIT_SALARY' => $this->input->post('sctb'),
				'SELF_BUSINESS_ADDRESS' => $this->input->post('sba'),
				'OWNERSHIP_TYPE' => $this->input->post('owner_type'),
				'PREMISES_RENTED_SELF' => $this->input->post('premise_type'),
				'BUSINESS_NATURE' => $this->input->post('bt'),
				'CITY' => $this->input->post('city'),
				'STATE' => $this->input->post('state'),
				'DISTRICT' => $this->input->post('district'),
				);

			if($this->input->post('userType') == 'salaried')$array_input['COMPANY_TYPE'] = $this->input->post('company_type');
			$id = $this->Customercrud_model->update_profile($id, $array_input);
			if($id > 0){
				$age = $this->session->set_userdata("AGE", $array_input['AGE']);
				$response = array('status' => 1, 'message' => 'Profile updated successfully');
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Error in profile update');
				echo json_encode($response);
			}
		}

		public function customer_apply_for_loan_action(){
			//$this->showErrorMessage("hi mahi");
			$id = $this->session->userdata('ID');
			$array_input = array(
				'LOAN_TYPE' => $this->input->post('loan_type'),
				'LOAN_AMOUNT' => $this->input->post('loan_amount'),
				'DURATION' => $this->input->post('loan_duration'),
				'CUST_ID' => $id,
				'LOAN_STATUS' => "NEW",			
				);
			
			$id = $this->Customercrud_model->saveApplyLoan($array_input);
			if($id > 0){
				$response = array('status' => 1, 'message' => 'You have successfully applied for loan, please wait for some time we will contact you very soon.');
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Some unknown error coming, please try again.');
				echo json_encode($response);
			}
		}

		public function customer_update_profile_1_l(){
			//$this->showErrorMessage("hi mahi");
			$id = $this->session->userdata('ID');
			$user_type = $this->session->userdata('USER_TYPE');
			$array_input = array(
				'FN' => $this->input->post('fn'),
				'LN' => $this->input->post('ln'),
				'EMAIL' => $this->input->post('email'),
				'MOBILE' => $this->input->post('mobile')			
				);

			if ($user_type!='CUSTOMER') {
				$array_input['DOB'] = $this->input->post('DOB');	
				$array_input['PAN_NUMBER'] = $this->input->post('pan');	
				$array_input['AADHAR_NUMBER'] = $this->input->post('aadhar');	
				$array_input['CURRENT_RESIDENTIAL_ADDRESS'] = $this->input->post('address');	
				$array_input['EXPERIENCE'] = $this->input->post('experience');	
				$array_input['CITY'] = $this->input->post('city');
				$array_input['STATE'] = $this->input->post('state');
				$array_input['DISTRICT'] = $this->input->post('district');
			}
			
			$chk_mobile = $this->Customercrud_model->check_mobile($id, $array_input['MOBILE']);
			$chk_email = $this->Customercrud_model->check_email($id, $array_input['EMAIL']);

			if($chk_email == 0 && $chk_mobile == 0){
				$id = $this->Customercrud_model->update_profile($id, $array_input);
				if($id > 0){			
					$response = array('status' => 1, 'message' => 'Profile updated successfully', 'user_type' =>$user_type);
					echo json_encode($response);
				}else {
					$response = array('status' => 0, 'message' => 'Error in profile update');
					echo json_encode($response);
				}
			}else if($chk_email == 1){
				$response = array('status' => 0, 'message' => 'Email id already in use by other user');
				echo json_encode($response);
			}else if($chk_mobile == 1){
				$response = array('status' => 0, 'message' => 'Mobile number already in use by other user');
				echo json_encode($response);
			}
		}

	/*	public function delete_doc(){
			
			$id = $this->input->get("UID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
			$array_input = array(
				'ID' => $this->input->post('id')		
			);		
			$cust_id=$id;
			$u_type = $this->session->userdata("USER_TYPE");
			$result = $this->Customercrud_model->delete_doc($array_input);
			if($result > 0){	
								require_once('./fpdf/fpdf.php');
                                 require_once('./fpdi/src/autoload.php');
								 require_once('./fpdi/src/Fpdi.php');
								//$id = $this->session->userdata('ID');
								$data_row = $this->Customercrud_model->getDocuments($id);
								

								//$pdf = new FPDF('P', 'pt', 'Letter');
								//$pdf->addPage();
								$pdf =new \setasign\Fpdi\Fpdi();
								foreach($data_row as $row)
								{ 
										$path = './images/documents/';
										$filename = $row->DOC_NAME;
										$url = $path.$filename;	
										if(substr($url, -4) == '.pdf')
										{
											/*    $doc = $url;
												$save = 'output.jpg';

											 exec('./images/documents/"'.$doc.'" -colorspace RGB -resize 800 "'.$save.'"', $output, $return_var);
											 print_r($output);
											
											exit;*/
											
/*
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
						
				$response = array('status' => 1, 'message' => 'Document deleted successfully','u_type'=>$u_type,'UID'=>$cust_id);
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Error in document delete','UID'=>$cust_id);
				echo json_encode($response);
			}
		}

		*/

	public function delete_doc(){
			
			$id = $this->input->get("UID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
			$array_input = array(
				'ID' => $this->input->post('id')		
			);		

$docid = $this->input->post("id");
			$user = $this->Customercrud_model->getSingleDoc($docid);

						$documentname = $user->doc_cloud_name;
						
						$documentdir = $user->doc_cloud_dir;
						
						$documentpath = $documentdir.$documentname;

					//	$pathname = "cloudfile/".$documentname;
				
				 $deletefile = " curl -X DELETE -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$documentpath."   ";

  exec($deletefile);

			$cust_id=$id;
			$u_type = $this->session->userdata("USER_TYPE");
			$result = $this->Customercrud_model->delete_doc($array_input);



			if($result > 0){	
								
								
						
				$response = array('status' => 1, 'message' => 'Document deleted successfully','u_type'=>$u_type,'UID'=>$cust_id);
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Error in document delete','UID'=>$cust_id);
				echo json_encode($response);
			}
		}

		public function delete_doc_coapp(){
			
			$id = $this->input->post('id');
			$array_input = array(
				'ID' => $id		
			);		
			
			$user = $this->Customercrud_model->getSingleDoc($id);
			
				$documentname = $user->doc_cloud_name;
						
						$documentdir = $user->doc_cloud_dir;
						
						$documentpath = $documentdir.$documentname;

					//	$pathname = "cloudfile/".$documentname;
				
				 $deletefile = " curl -X DELETE -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$documentpath."   ";

  exec($deletefile);
			
			$id = $this->Customercrud_model->delete_doc($array_input);
			if($id > 0){			
				$response = array('status' => 1, 'message' => 'Document deleted successfully', 'path'=>"/dsa/dsa/index.php/customer/customer_documents?ID=".$user->USER_ID);
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Error in document delete');
				echo json_encode($response);
			}
		}



		/*
Code for download files from NextCloud starts here 

*/

		public function view_cloud_file($fileid)
		{

						$user = $this->Customercrud_model->getSingleDoc($fileid);
						
						//print_r($user);

						 $documentname = $user->doc_cloud_dir.$user->doc_cloud_name;

						$pathname = "cloudfile/".$user->doc_cloud_name;
						
						//exit;
				
				 $downloadfile = " curl -X GET -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$documentname."  --output ".$pathname." ";

 exec($downloadfile);
$url = base_url().$pathname;
          redirect($url, 'refresh');
 

		}

		/*
			Code for download files from NextCloud ends here

		*/

/*
Code for download files from NextCloud starts here 

*/

		public function download_cloud_file($fileid)
		{

						$user = $this->Customercrud_model->getSingleDoc($fileid);

						$documentname = $user->doc_cloud_dir.$user->doc_cloud_name;

						$pathname = "cloudfile/".$user->doc_cloud_name;
				
				 $downloadfile = " curl -X GET -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$documentname."  --output ".$pathname." ";

 exec($downloadfile);
$url = base_url().$pathname;
         // redirect($url, 'refresh');
 
$data['url'] = $url;
     //    redirect($url, 'refresh');

	// echo "";

				$this->load->view('customer/download_cloud_file', $data);

		}

		/*
			Code for download files from NextCloud ends here

		*/

		/*
Code for download files from NextCloud starts here 

*/

		public function view_cloud_file2($fileid)
		{

						$user = $this->Customercrud_model->getSingleDoc($fileid);

						$documentname = $user->doc_cloud_dir.$user->doc_cloud_name;

						$pathname = "cloudfile/".$user->doc_cloud_name;
				
				 $downloadfile = " curl -X GET -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$documentname."  --output ".$pathname." ";

 exec($downloadfile);
$url = base_url().$pathname;
          redirect($url, 'refresh');
 

		}

		/*
			Code for download files from NextCloud ends here

		*/

/*
Code for download files from NextCloud starts here 

*/

		public function download_cloud_file2($fileid)
		{

						$user = $this->Customercrud_model->getSingleDoc($fileid);

						$documentname = $user->doc_cloud_dir.$user->doc_cloud_name;

						$pathname = "cloudfile/".$user->doc_cloud_name;
				
				 $downloadfile = " curl -X GET -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$documentname."  --output ".$pathname." ";

 exec($downloadfile);
$url = base_url().$pathname;
         // redirect($url, 'refresh');
 
$data['url'] = $url;
     //    redirect($url, 'refresh');

	// echo "";

				$this->load->view('customer/download_cloud_file', $data);

		}

		/*
			Code for download files from NextCloud ends here

		*/




		public function do_upload(){
			$u_id = $this->input->post('coapp_id');
			$master_type = $this->input->post('master_type');
			
			$u_type = $this->session->userdata("USER_TYPE");
		    $id = $this->input->post("ID");
			
			//print_r($_FILES["userfile"]["tmp_name"]);

			//print_r($_FILES["userfile"]["name"]);

//print_r($_REQUEST);

	//		exit;
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
			if(empty($u_id))
			{
				$profile_data=$this->Customercrud_model->getProfileData($id);
			    $role=$this->input->post("role");
				
			}
			else
			{
				$role='';
			}
			
			
			$dir = $profile_data->ID."/";
			
			if(!empty($u_id))$id = $u_id;
			
			
			$doc_type = $this->input->post('doc_type');
			$chk_res = $this->Customercrud_model->checkSavedDocument($id, $doc_type, $master_type);
			if($chk_res > 0){
				
				$error = "Document ".$doc_type." already saved by you.";
				if($role == 2)
							{
								redirect('customer/dsa_documents_upload?error='.$error, 'refresh');
							}
				 else if($role == 6)
							{
								redirect('customer/dsa_documents_upload?error='.$error, 'refresh');
							}
				if(empty($u_id))redirect('customer/customer_documents?error='.$error, 'refresh');
				else redirect('customer/customer_documents?ID='.$id.'&error='.$error, 'refresh');
			}else {
				$count = count($_FILES['userfile']['name']);
             
                 for($i=0;$i<$count;$i++)
				 {
				     //$file_name = $_FILES["userfile"]['name'][$i];
					//$file_name = time().".".pathinfo($file_name, PATHINFO_EXTENSION);
					//$file_name = str_replace(' ', '', $file_name);
					//$file_type = $_FILES["userfile"]['type'][$i];
					//$file_size = $_FILES["userfile"]['size'][$i];
/* code to export files to Nextcloud starts here */
					$time = time();

						$fileextensionarr = explode(".",$_FILES["userfile"]["name"][$i]);

						$fileextension = $fileextensionarr[1];
						
						$filename = $time.".".$fileextension;
						
						$dirname = "Finserv/customers/".$dir;

						$filenamewithdir = $dirname.$filename;

			  $correcturl = "curl -X PUT -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$filenamewithdir." -T ".$_FILES["userfile"]["tmp_name"][$i]."";

 exec($correcturl);

 /* code to upload file ends here */


					  $_FILES['file']['name'] = $_FILES['userfile']['name'][$i];
					  $_FILES['file']['name'] = $time.".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
					  $_FILES['file']['name'] = str_replace(' ', '', $_FILES['file']['name']);
					  $_FILES['file']['type'] = $_FILES['userfile']['type'][$i];
					  $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
					  $_FILES['file']['error'] = $_FILES['userfile']['error'][$i];
					  $_FILES['file']['size'] = $_FILES['userfile']['size'][$i];
						$config = array(
							'upload_path' => "./images/documents/",
							'allowed_types' => "gif|jpg|png|jpeg|pdf",
							'overwrite' => TRUE
						);

					$config['file_name'] = $_FILES['file']['name'];
					$config['image_type'] = $_FILES['file']['type'];
					$config['file_size'] = $_FILES['file']['size'];
					

					$this->upload->initialize($config);
					$upload_data = $this->upload->data();
					
					$file_input_arr = array(
						'USER_ID' => $id,
						'DOC_TYPE' => $doc_type,	
						'DOC_NAME' => $upload_data['file_name'],
						'DOC_SIZE' => $upload_data['file_size'],
						'DOC_FILE_TYPE' => $upload_data['image_type'],
						'DOC_MASTER_TYPE' => $master_type,
						'doc_cloud_name' => $filename,
						'doc_cloud_dir' => $dirname
					);
				//if($this->upload->do_upload('file'))
				if(true){
					$this->Customercrud_model->saveDocuments($file_input_arr);
					$data_row = $this->Customercrud_model->getDocuments($id);
					/*$this->Customercrud_model->saveDocuments($file_input_arr);
					  require_once('./fpdf/fpdf.php');
                                 require_once('./fpdi/src/autoload.php');
								 require_once('./fpdi/src/Fpdi.php');
								//$id = $this->session->userdata('ID');
								$data_row = $this->Customercrud_model->getDocuments($id);
								//$pdf = new FPDF('P', 'pt', 'Letter');
								//$pdf->addPage();
								$pdf =new \setasign\Fpdi\Fpdi();
								foreach($data_row as $row)
								{ 
										$path = './images/documents/';
										$filename = $row->DOC_NAME;
										$url = $path.$filename;	
										if(substr($url, -4) == '.pdf')
										{
										
											

											$pageCount = $pdf->setSourceFile($url);
											
											for($j=1; $j<=$pageCount; $j++)
											{
												$pageId = $pdf->importPage($j,setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);
												$pdf->addPage();
												$pdf->useImportedPage($pageId, 50, 50,100,100);
												
											
                                              
											}

											
										}
										else
										{
											$pdf->addPage();
											$pdf->Image($url);
										}
										
								}*/
								$directoryName="./images/all_document_pdf/";
								if(!is_dir($directoryName))
								{
											mkdir($directoryName, 0755);
											//file_put_contents($pdf->Output('$id.pdf','F'));
								}
								else
								{
									$dir='./images/all_document_pdf/';    
									$filename= "$id.pdf";                                      
									 if(file_exists($dir.$filename))
									 {
										 //unlink($dir.$filename);
										 // $pdf ->Output($dir.$filename,'F');
									 }
									 else
									 {
									  // $pdf ->Output($dir.$filename,'F');
									 }
								
								}
					
				}
				else
				{
					$error = $this->upload->display_errors();
						if($role == 2)
								{
									redirect('customer/dsa_documents_upload?error='.$error, 'refresh');
								}
					 else if($role == 6)
								{
									redirect('customer/dsa_documents_upload?error='.$error, 'refresh');
								}
					if(empty($u_id))redirect('customer/customer_documents?ID='.$u_id.'&error='.$error, 'refresh');
					else redirect('customer/customer_documents?UID='.$id.'&error='.$error, 'refresh');
				} 
				
			}	
	
				
					            
								
                            					
                            
                             
							$no_of_doc_to_upload=$this->Customercrud_model->getDocuments_Type_customer();											
							$Uploded_Doc_Count=$this->Customercrud_model->getUploded_Documents_Type($id);
						/*	if($Uploded_Doc_Count==$no_of_doc_to_upload)
							{
								$array_input_more = array(
												'CUST_ID' => $id,
												'STATUS'=>('Document upload complete')
												);
								
								$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
							}*/
							/*if($role == 2)
							{
								redirect('customer/dsa_documents_upload', 'refresh');
							}
							else if($role == 6)
							{
								redirect('customer/dsa_documents_upload', 'refresh');
							}*/
						if(!empty($u_id))redirect('customer/customer_documents?ID='.$u_id, 'refresh');
						else redirect('customer/customer_documents?UID='.$id, 'refresh');
					 
				}
				 
				
			}


			public function view_cloud_dsa_file($fileid)
		{

						$user = $this->Customercrud_model->getSingleDoc($fileid);

				//		print_r($user);

					$documentname = $user->doc_cloud_name;
						
						$documentdir = $user->doc_cloud_dir.$documentname;

						$pathname = "cloudfile/".$documentname;
				
				 $downloadfile = " curl -X GET -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$documentdir."  --output ".$pathname." ";

 exec($downloadfile);
$url = base_url().$pathname;
         redirect($url, 'refresh');
 

		}


		public function download_cloud_dsa_file($fileid)
		{

					$user = $this->Customercrud_model->getSingleDoc($fileid);

				//		print_r($user);

						$documentname = $user->doc_cloud_name;
						
						$documentdir = $user->doc_cloud_dir.$documentname;

						$pathname = "cloudfile/".$documentname;
				
				 $downloadfile = " curl -X GET -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$documentdir."  --output ".$pathname." ";

 exec($downloadfile);
$url = base_url().$pathname;

$data['url'] = $url;
     //    redirect($url, 'refresh');

	// echo "";

				$this->load->view('dsa/download_cloud_dsa_file', $data);
 

		}

		/*
			Code for download files from NextCloud ends here

		*/

			
			public function _dsa_document(){
			$u_id = $this->input->post('coapp_id');
			$master_type = $this->input->post('master_type');
			
			$u_type = $this->session->userdata("USER_TYPE");
		    $id = $this->input->post("ID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
			
			
			
			
			
			if(!empty($u_id))$id = $u_id;
			
			
			$doc_type = $this->input->post('doc_type');
			$chk_res = $this->Customercrud_model->checkSavedDocument($id, $doc_type, $master_type);
			if($chk_res > 0){
				
				$error = "Document ".$doc_type." already saved by you.";
				
							
								redirect('customer/dsa_documents_upload?error='.$error, 'refresh');
							
			}else {
				$count = count($_FILES['userfile']['name']);
             
                 for($i=0;$i<$count;$i++)
				 {
				     //$file_name = $_FILES["userfile"]['name'][$i];
					//$file_name = time().".".pathinfo($file_name, PATHINFO_EXTENSION);
					//$file_name = str_replace(' ', '', $file_name);
					//$file_type = $_FILES["userfile"]['type'][$i];
					//$file_size = $_FILES["userfile"]['size'][$i];

					$time = time();


					  $_FILES['file']['name'] = $_FILES['userfile']['name'][$i];
					  $_FILES['file']['name'] = $time.".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
					  $_FILES['file']['name'] = str_replace(' ', '', $_FILES['file']['name']);
					  $_FILES['file']['type'] = $_FILES['userfile']['type'][$i];
					  $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
					  $_FILES['file']['error'] = $_FILES['userfile']['error'][$i];
					  $_FILES['file']['size'] = $_FILES['userfile']['size'][$i];
						$config = array(
							'upload_path' => "./images/documents/",
							
							'allowed_types' => "gif|jpg|png|jpeg|pdf",
							'overwrite' => TRUE
						);

							/* code to export files to Nextcloud starts here */
						

							/* code to export files to Nextcloud starts here */
						
						$dir = "";

						$time = time();

						$fileextensionarr = explode(".",$_FILES["userfile"]["name"][$i]);

						$fileextension = $fileextensionarr[1];
						
						$filename = $time.".".$fileextension;
						
						$dirname = "Finaleap/dsa/".$dir;

						$filenamewithdir = $dirname.$filename;

			  $correcturl = "curl -X PUT -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$filenamewithdir." -T ".$_FILES["userfile"]["tmp_name"][$i]."";

 exec($correcturl);


 /* code to upload file ends here */


					$config['file_name'] = $_FILES['file']['name'];
					$config['image_type'] = $_FILES['file']['type'];
					$config['file_size'] = $_FILES['file']['size'];

					$this->upload->initialize($config);
					$upload_data = $this->upload->data();
					
					$file_input_arr = array(
						'USER_ID' => $id,
						'DOC_TYPE' => $doc_type,	
						'DOC_NAME' => $upload_data['file_name'],
						'DOC_SIZE' => $upload_data['file_size'],
						'DOC_FILE_TYPE' => $upload_data['image_type'],
						'DOC_MASTER_TYPE' => $master_type,
						'doc_cloud_name' => $filename,
						'doc_cloud_dir' => $dirname
					);

										$this->Customercrud_model->saveDocuments($file_input_arr);

				
				 
				
			}

			}

											redirect('customer/dsa_documents_upload', 'refresh');

			}
		
			
		
		
		public function do_upload_doc_LAP(){
			$u_id = $this->input->post('coapp_id');
			$master_type = $this->input->post('master_type');
			 $id = $this->input->post("ID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				$row=$this->Customercrud_model->getProfileData($id);
			
			$role=$row->ROLE;

			$doc_type_user = $role;
			$data['id']=$id;
			
			if(!empty($u_id))$id = $u_id;
			
			$dir = $row->ID."/";
			$doc_type = $this->input->post('doc_type');
			$chk_res = $this->Customercrud_model->checkSavedDocument($id, $doc_type, $master_type);
		
			if($chk_res > 0){
				$error = "Document ".$doc_type." already saved by you.";
				if(empty($u_id))redirect('customer/lap_loan_doc?error='.$error.'&UID='.$id, 'refresh');
				else redirect('customer/customer_documents?ID='.$id.'&error='.$error, 'refresh');
			}else {
				$count = count($_FILES['userfile']['name']);
              
                 for($i=0;$i<$count;$i++)
				 {
				     //$file_name = $_FILES["userfile"]['name'][$i];
					//$file_name = time().".".pathinfo($file_name, PATHINFO_EXTENSION);
					//$file_name = str_replace(' ', '', $file_name);
					//$file_type = $_FILES["userfile"]['type'][$i];
					//$file_size = $_FILES["userfile"]['size'][$i];

					$time = time();
						/* code to export files to Nextcloud starts here */
						

						$time = time();
						/* code to export files to Nextcloud starts here */
						

						//$dir = "";

						//$time = time();

						$fileextensionarr = explode(".",$_FILES["userfile"]["name"][$i]);

						$fileextension = $fileextensionarr[1];
						
						$filename = $time.".".$fileextension;
						
						$dirname = "Finaleap/customers/".$dir;

						$filenamewithdir = $dirname.$filename;

			  $correcturl = "curl -X PUT -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$filenamewithdir." -T ".$_FILES["userfile"]["tmp_name"][$i]."";

 exec($correcturl);


 /* code to upload file ends here */

					  $_FILES['file']['name'] = $_FILES['userfile']['name'][$i];
					  $_FILES['file']['name'] = $time.".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
					  $_FILES['file']['name'] = str_replace(' ', '', $_FILES['file']['name']);
					  $_FILES['file']['type'] = $_FILES['userfile']['type'][$i];
					  $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
					  $_FILES['file']['error'] = $_FILES['userfile']['error'][$i];
					  $_FILES['file']['size'] = $_FILES['userfile']['size'][$i];
						$config = array(
							'upload_path' => "./images/documents/",
							
							'allowed_types' => "gif|jpg|png|jpeg|pdf",
							'overwrite' => TRUE
						);

					$config['file_name'] = $_FILES['file']['name'];
					$config['image_type'] = $_FILES['file']['type'];
					$config['file_size'] = $_FILES['file']['size'];

					$this->upload->initialize($config);
					$upload_data = $this->upload->data();
					
					$file_input_arr = array(
						'USER_ID' => $id,
						'DOC_TYPE' => $doc_type,	
						'DOC_NAME' => $upload_data['file_name'],
						'DOC_SIZE' => $upload_data['file_size'],
						'DOC_FILE_TYPE' => $upload_data['image_type'],
						'DOC_MASTER_TYPE' => $master_type,
						'doc_cloud_name' => $filename,
						'doc_cloud_dir' => $dirname
					);

				//if($this->upload->do_upload('file'))
				if(true)
				{
							   
				  $result=$this->Customercrud_model->saveDocuments($file_input_arr);

				  redirect('customer/lap_loan_doc?UID='.$id, 'refresh');
					  require_once('./fpdf/fpdf.php');
                                 require_once('./fpdi/src/autoload.php');
								 require_once('./fpdi/src/Fpdi.php');
								//$id = $this->session->userdata('ID');
								$data_row = $this->Customercrud_model->getDocuments($id);
								//$pdf = new FPDF('P', 'pt', 'Letter');
								//$pdf->addPage();
								$pdf =new \setasign\Fpdi\Fpdi();
								foreach($data_row as $row)
								{ 
										$path = './images/documents/';
										$filename = $row->DOC_NAME;
										$url = $path.$filename;	
										if(substr($url, -4) == '.pdf')
										{
											/*    $doc = $url;
												$save = 'output.jpg';

											 exec('./images/documents/"'.$doc.'" -colorspace RGB -resize 800 "'.$save.'"', $output, $return_var);
											 print_r($output);
											
											exit;*/
											

											$pageCount = $pdf->setSourceFile($url);
											
											for($j=1; $j<=$pageCount; $j++)
											{
												$pageId = $pdf->importPage($j,setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);
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
				else
				{
					$error = $this->upload->display_errors();
											$error_arr = array('error' => $this->upload->display_errors());
					//print_r($error_arr);exit;
					 redirect('customer/lap_loan_doc'.'?error='.$error.'&UID='.$id, 'refresh');
				}
				
			}	
	
				
					            
								
                            					
                            
                             
							$no_of_doc_to_upload=$this->Customercrud_model->getDocuments_Type_customer();											
							$Uploded_Doc_Count=$this->Customercrud_model->getUploded_Documents_Type($id);
                           if(!empty($u_id))redirect('customer/customer_documents?ID='.$u_id, 'refresh');
						else redirect('customer/lap_loan_doc?UID='.$id, 'refresh');
				}
				 
				
			}
		public function do_upload_doc_homeloan(){
			//$u_id = $this->input->post('coapp_id');
			$master_type = $this->input->post('master_type');
			 $id = $this->input->post("CUST_ID");
			
				
				/*if ($id == '') {
					$id = $this->session->userdata("ID");
				}*/
			
			//$u_type = $this->session->userdata("USER_TYPE");
			//$doc_type_user = 2;
			//if($u_type == 'CUSTOMER')$doc_type_user = 1;
			
			$row=$this->Customercrud_model->getProfileData($id);
			
			$role=$row->ROLE;
			if($row->ROLE==2)
			{
				$role=1;
			}
			
			$dir=$row->ID."/";

			$doc_type_user = $role;
			$data['id']=$id;
		//	if(!empty($u_id))$id = $u_id;
			
			
			$doc_type = $this->input->post('doc_type');
			$chk_mandatory=$this->Customercrud_model->check_Mandatory_Document($doc_type_user, $doc_type, $master_type);
			$chk_res = $this->Customercrud_model->checkSavedDocument($id, $doc_type, $master_type);
		
			if($chk_res > 0){
				$error = "Document ".$doc_type." already saved by you.";
				if(empty($u_id))redirect('customer/home_loan_doc?error='.$error.'&UID='.$id, 'refresh');
				else redirect('customer/customer_documents?ID='.$id.'&error='.$error, 'refresh');
			}else {
				$count = count($_FILES['userfile']['name']);
              
                 for($i=0;$i<$count;$i++)
				 {

					 $time = time();
						/* code to export files to Nextcloud starts here */

						$fileextensionarr = explode(".",$_FILES["userfile"]["name"][$i]);

						$fileextension = $fileextensionarr[1];
						
						$filename = $time.".".$fileextension;
						
						$dirname = "Finserv/customers/".$dir;

						$filenamewithdir = $dirname.$filename;

			  $correcturl = "curl -X PUT -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$filenamewithdir." -T ".$_FILES["userfile"]["tmp_name"][$i]."";

 exec($correcturl);

 
 /* code to upload file ends here */
				     //$file_name = $_FILES["userfile"]['name'][$i];
					//$file_name = time().".".pathinfo($file_name, PATHINFO_EXTENSION);
					//$file_name = str_replace(' ', '', $file_name);
					//$file_type = $_FILES["userfile"]['type'][$i];
					//$file_size = $_FILES["userfile"]['size'][$i];
					  $_FILES['file']['name'] = $_FILES['userfile']['name'][$i];
					  $_FILES['file']['name'] = $time.".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
					  $_FILES['file']['name'] = str_replace(' ', '', $_FILES['file']['name']);
					  $_FILES['file']['type'] = $_FILES['userfile']['type'][$i];
					  $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
					  $_FILES['file']['error'] = $_FILES['userfile']['error'][$i];
					  $_FILES['file']['size'] = $_FILES['userfile']['size'][$i];
						$config = array(
							'upload_path' => "./images/documents/",
							
							'allowed_types' => "gif|jpg|png|jpeg|pdf",
							'overwrite' => TRUE
						);

					$config['file_name'] = $_FILES['file']['name'];
					$config['image_type'] = $_FILES['file']['type'];
					$config['file_size'] = $_FILES['file']['size'];

					$this->upload->initialize($config);
					$upload_data = $this->upload->data();
					
					$file_input_arr = array(
						'USER_ID' => $id,
						'DOC_TYPE' => $doc_type,	
						'DOC_NAME' => $upload_data['file_name'],
						'DOC_SIZE' => $upload_data['file_size'],
						'DOC_FILE_TYPE' => $upload_data['image_type'],
						'DOC_MASTER_TYPE' => $master_type,
						'doc_cloud_name' => $filename,
						'doc_cloud_dir' => $dirname
					);

				//if($this->upload->do_upload('file'))
				if(true)
				{
						$this->Customercrud_model->saveDocuments($file_input_arr);
					$data_row = $this->Customercrud_model->getDocuments($id);	
					redirect('customer/home_loan_doc?UID='.$id, 'refresh');
				  /*$result=$this->Customercrud_model->saveDocuments($file_input_arr);
					  require_once('./fpdf/fpdf.php');
                                 require_once('./fpdi/src/autoload.php');
								 require_once('./fpdi/src/Fpdi.php');
								//$id = $this->session->userdata('ID');
								$data_row = $this->Customercrud_model->getDocuments($id);
								//$pdf = new FPDF('P', 'pt', 'Letter');
								//$pdf->addPage();
								$pdf =new \setasign\Fpdi\Fpdi();
								foreach($data_row as $row)
								{ 
										$path = './images/documents/';
										$filename = $row->DOC_NAME;
										$url = $path.$filename;	
										if(substr($url, -4) == '.pdf')
										{
											8
											

											$pageCount = $pdf->setSourceFile($url);
											
											for($j=1; $j<=$pageCount; $j++)
											{
												$pageId = $pdf->importPage($j,setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);
												$pdf->addPage();
												$pdf->useImportedPage($pageId, 50, 50,100,100);
												
											
                                              
											}

											
										}
										else
										{
											$pdf->addPage();
											$pdf->Image($url);
										}
										
								}*/
								$directoryName="./images/all_document_pdf/";
								if(!is_dir($directoryName))
								{
											mkdir($directoryName, 0755);
											//file_put_contents($pdf->Output('$id.pdf','F'));
								}
								else
								{
									$dir='./images/all_document_pdf/';    
									$filename= "$id.pdf";                                      
									 if(file_exists($dir.$filename))
									 {
										 //unlink($dir.$filename);
										//  $pdf ->Output($dir.$filename,'F');
									 }
									 else
									 {
									   //$pdf ->Output($dir.$filename,'F');
									 }
								
								}
					
				}
				else
				{
					$error = $this->upload->display_errors();
											$error_arr = array('error' => $this->upload->display_errors());
					//print_r($error_arr);exit;
					 redirect('customer/home_loan_doc'.'?error='.$error.'&UID='.$id, 'refresh');
				}
				
			}	
	
				
					            
								
                            					
                            
                             
							$no_of_doc_to_upload=$this->Customercrud_model->getDocuments_Type_customer();											
							$Uploded_Doc_Count=$this->Customercrud_model->getUploded_Documents_Type($id);
							if(!empty($u_id))redirect('customer/customer_documents?ID='.$u_id, 'refresh');
						else redirect('customer/home_loan_doc?UID='.$id, 'refresh');
					 
				}
				 
				
			}
		

		public function getSalariedSavedAnotherIncome(){
			$response = [];
			$response['INCOME_SALARIED'] = $this->session->userdata("INCOME_SALARIED");
			$response['INCOME_AGRI'] = $this->session->userdata("INCOME_AGRI");
			echo json_encode($response);
		}


		//new flow update

		public function customer_flow_update_s_one(){
			//$this->showErrorMessage("hi mahi");
			
			$id = $this->input->Post("ID");
			
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				$cust_id=$id;
			$dob = $this->input->post('dob');		
			$diff = abs(strtotime(date("Y-m-d")) - strtotime($dob));
			$years = floor($diff / (365*60*60*24));
			$array_input = array(
				'AGE' => $years,
				'EDUCATION_BACKGROUND' => $this->input->post('education_type'),
				'FN' => $this->input->post('f_name'),
				'MN' => $this->input->post('m_name'),
				'LN' => $this->input->post('l_name'),
				'EMAIL' => $this->input->post('email'),
				'MOBILE' => $this->input->post('mobile'),
				'GENDER' => $this->input->post('gender'),			
				'DOB' =>$this->input->post('dob'),			
				//'PAN_NUMBER' => base64_encode($this->input->post('pan')),
				'PAN_NUMBER' => $this->input->post('pan'),
				'AADHAR_NUMBER' => $this->input->post('aadhar'),
				'MARTIAL_STATUS' => $this->input->post('marital'),
				'Profile_Status'=>'Complete'
				);
			$array_input_more = array(
				'CUST_ID' => $id,
				'MOTHER_F_NAME' => $this->input->post('m_f_name'),
				'MOTHER_M_NAME' => $this->input->post('m_m_name'),
				'MOTHER_L_NAME' => $this->input->post('m_l_name'),
				'IS_SPOUSE_FATHER' => $this->input->post('spouse'),
				'SPOUSE_F_NAME' => $this->input->post('s_f_name'),
				'SPOUSE_M_NAME' => $this->input->post('s_m_name'),
				'SPOUSE_L_NAME' => $this->input->post('s_l_name'),			
				'RES_ADDRS_LINE_1' => $this->input->post('resi_add_1'),			
				'RES_ADDRS_LINE_2' => $this->input->post('resi_add_2'),
				'RES_ADDRS_LINE_3' => $this->input->post('resi_add_3'),
				'RES_ADDRS_LANDMARK' => $this->input->post('resi_landmark'),
				'RES_ADDRS_PINCODE' => $this->input->post('resi_pincode'),
				'RES_ADDRS_CITY' => $this->input->post('resi_city'),
				'NATIVE_PLACE'=>$this->input->post('NATIVE_PLACE'),
				'RES_ADDRS_STATE' => $this->input->post('resi_state'),
				'RES_ADDRS_DISTRICT' => $this->input->post('resi_district'),
				'RES_ADDRS_PROPERTY_TYPE' => $this->input->post('resi_sel_property_type'),
				'RES_ADDRS_NO_YEARS_LIVING' => $this->input->post('resi_no_of_years'),
				'RES_CITY_NO_YEARS_LIVING'=>$this->input->post('resi_no_of_years_city'),
				'PER_ADDRS_LINE_1' => $this->input->post('per_add_1'),
				'PER_ADDRS_LINE_2' => $this->input->post('per_add_2'),
				'PER_ADDRS_LINE_3' => $this->input->post('per_add_3'),
				'PER_ADDRS_LANDMARK' => $this->input->post('per_landmark'),
				'PER_ADDRS_PINCODE' => $this->input->post('per_pincode'),
				'PER_ADDRS_PROPERTY_TYPE' => $this->input->post('per_sel_property_type'),
				'PER_ADDRS_STATE' => $this->input->post('per_state'),
				'PER_ADDRS_DISTRICT' => $this->input->post('per_district'),
				'PER_ADDRS_CITY' => $this->input->post('per_city'),
				'PER_ADDRS_NO_YEARS_LIVING' => $this->input->post('per_no_of_years'),
				'TOTAL_BRO_SIS' => $this->input->post('no_of_bro_sis'),
				'NO_OF_DEPENDANTS'=>$this->input->post('NO_OF_DEPENDANTS'),
				'CONSENT'=>$this->input->post('TC'),
				'STATUS'=>('Personal details complete'),
				'last_updated_date'=>date("Y/m/d"),
				'VERIFY_PAN'=>$this->input->post('verify_pan_status'),
				'KYC_doc'=>$this->input->post('KYC_doc'),
				'KYC'=>$this->input->post('KYC'),
				'VERIFY_KYC'=>$this->input->post('verify_kyc_status'),
				'File_Number_Passport'=>$this->input->post('file_number')
				
				
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
				exit();
			}

			$id_email_exist = $this->Customercrud_model->check_email($id, $array_input['EMAIL']);
			if($id_email_exist > 0){
				$response = array('status' => 0, 'message' => 'Email id already in use');
				echo json_encode($response);
				exit();
			}


			$updated_id = $this->Customercrud_model->update_profile($id, $array_input);

			$cust_row = $this->Customercrud_model->getProfileData($id);
			if($cust_row->PROFILE_PERCENTAGE < 30){
				$array_input_per = array(
					'PROFILE_PERCENTAGE' => 30
				);
				$this->Customercrud_model->update_profile($id, $array_input_per);
			}


			$check_id = $this->Customercrud_model->check_more_profile($id);
			if($check_id > 0)$id = $this->Customercrud_model->update_profile_more($id, $array_input_more);
			else $id = $this->Customercrud_model->insert_profile_more($id, $array_input_more);

			if($id > 0){
				$age = $this->session->set_userdata("AGE", $array_input['AGE']);
				$response = array('status' => 1, 'message' => 'Profile updated successfully','ID'=> $cust_id);
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Error in profile update');
				echo json_encode($response);
			}
		}

		public function customer_flow_update_s_two_salaried(){
			//$this->showErrorMessage("hi mahi");
			$id = $this->input->Post("ID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
              $cust_id=$id;
			if ($id == '') {
				$response = array('status' => 301, 'message' => 'Profile updated successfully');
				echo json_encode($response);
			}else {
					$array_input_more = array(
					'CUST_ID' => $id,
					'CUST_TYPE'=>('salaried'),
					'ORG_NAME' => $this->input->post('org_name'),
					'ORG_INDUSTRY_OPERATING' => $this->input->post('org_operating'),
					'ORG_TYPE' => $this->input->post('salaried_org_type'),
					'ORG_YEARS_WORKING' => $this->input->post('salaried_org_no_of_years_working'),
					'ORG_ADRS_LINE_1' => $this->input->post('salaried_org_add_line_1'),
					'ORG_ADRS_LINE_2' => $this->input->post('salaried_org_add_line_2'),
					'ORG_ADRS_LINE_3' => $this->input->post('salaried_org_add_line_3'),
					'ORG_LANDMARK' => $this->input->post('salaried_org_landmark'),
					'ORG_PINCODE' => $this->input->post('salaried_org_pin'),
					'ORG_STATE' => $this->input->post('resi_state'),
					'ORG_DISTRICT' => $this->input->post('resi_district'),
					'ORG_CITY' => $this->input->post('resi_city'),
					'ORG_DESIGNATION' => $this->input->post('org_designation'),
					'ORG_WORK_EMAIL' => $this->input->post('org_work_email'),
					'ORG_WORKED_FROM' => $this->input->post('org_working_from'),
					'ORG_SALARY_1' => $this->input->post('salary_1'),
					'ORG_SALARY_2' => $this->input->post('salary_2'),
					'ORG_SALARY_3' => $this->input->post('salary_3'),
					'ORG_EXP_YEAR' => $this->input->post('work_experience_year'),
					'ORG_EXP_MONTH' => $this->input->post('work_experience_month'),
					'ORG_ANNUAL_SALARY' => $this->input->post('org_gross_salary'),
					'ORG_OTHER_INCOME' => $this->input->post('other_income'),
					'ORG_DESIGNATION_PAST' => $this->input->post('org_past_designation'),
					'ORG_WORK_EMAIL_PAST' => $this->input->post('org_past_work_email'),
					'ORG_WORKED_FROM_PAST' => $this->input->post('org_past_working_from'),
					'ORG_SALARY_PAST_1' => $this->input->post('org_past_salary_1'),
					'ORG_SALARY_PAST_2' => $this->input->post('org_past_salary_2'),
					'ORG_SALARY_PAST_3' => $this->input->post('org_past_salary_3'),
					'ORG_ANNUAL_SALARY_PAST' => $this->input->post('org_past_gross_salary'),
					'ORG_NET_WORTH'=>$this->input->post('org_net_worth'),
					'EMIS' => $this->input->post('emis'),
					'REF_1_F_NAME' => $this->input->post('org_ref_f_name'),
					'REF_1_M_NAME' => $this->input->post('org_ref_m_name'),
					'REF_1_L_NAME' => $this->input->post('org_ref_l_name'),			
					'REF_1_MOBILE' => $this->input->post('org_ref_mobile'),			
					'REF_1_RELATION' => $this->input->post('org_ref_relation'),			
					'REF_2_F_NAME' => $this->input->post('org_ref_2_f_name'),			
					'REF_2_M_NAME' => $this->input->post('org_ref_2_m_name'),			
					'REF_2_L_NAME' => $this->input->post('org_ref_2_l_name'),			
					'REF_2_MOBILE' => $this->input->post('org_ref_2_mobile'),			
					'REF_2_RELATION' => $this->input->post('org_ref_2_relation'),	
                    'SALARY_RECIVED'=> $this->input->post('salary_recived'),					
				);
				

				$id_mobile_exist = $this->Customercrud_model->check_mobile($id, $array_input_more['REF_1_MOBILE']);
				if($id_mobile_exist > 0){
					$response = array('status' => 0, 'message' => 'Reference number one mobile number already in use');
					echo json_encode($response);
					exit();
				}

				$id_mobile_exist = $this->Customercrud_model->check_mobile($id, $array_input_more['REF_2_MOBILE']);
				if($id_mobile_exist > 0){
					$response = array('status' => 0, 'message' => 'Reference number two mobile number already in use');
					echo json_encode($response);
					exit();
				}

				$id_mobile_exist = $this->Customercrud_model->check_mobile_income_1($id, $array_input_more['REF_1_MOBILE']);
				if($id_mobile_exist > 0){
					$response = array('status' => 0, 'message' => 'Reference number one mobile number already in use');
					echo json_encode($response);
					exit();
				}

				$id_mobile_exist = $this->Customercrud_model->check_mobile_income_2($id, $array_input_more['REF_2_MOBILE']);
				if($id_mobile_exist > 0){
					$response = array('status' => 0, 'message' => 'Reference number two mobile number already in use');
					echo json_encode($response);
					exit();
				}

				$id_email_exist = $this->Customercrud_model->check_email($id, $array_input_more['ORG_WORK_EMAIL']);
				if($id_email_exist > 0){
					$response = array('status' => 0, 'message' => 'Email id already in use');
					echo json_encode($response);
					exit();
				}

				$cust_row = $this->Customercrud_model->getProfileData($id);
				if($cust_row->PROFILE_PERCENTAGE < 65){
					$array_input = array(
						'PROFILE_PERCENTAGE' => 65
					);
					$this->Customercrud_model->update_profile($id, $array_input);
				}			

				$check_id = $this->Customercrud_model->check_income_profile($id);
				if($check_id > 0){$Result_id = $this->Customercrud_model->update_profile_income_details($id, $array_input_more);
								$array_input_more1 = array(
																'CUST_ID' => $id,
																'STATUS'=>('Income details complete'),
																'last_updated_date'=>date("Y/m/d")
																);
								
								$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more1);
			
				}
				else {$Result_id = $this->Customercrud_model->insert_profile_income_details($id, $array_input_more);
				$array_input_more1 = array(
																'CUST_ID' => $id,
																'STATUS'=>('Income details complete'),
																'last_updated_date'=>date("Y/m/d")
																);
								
								$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more1);
				
				}

				if($Result_id > 0){
					$response = array('status' => 1, 'message' => 'Profile updated successfully','ID'=>$cust_id);
					echo json_encode($response);
				}else {
					$response = array('status' => 0, 'message' => 'Error in profile update');
					echo json_encode($response);
				}
			}	
		}

		public function customer_flow_update_s_two_retired(){
			//$this->showErrorMessage("hi mahi");
			$id = $this->input->post("ID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
            $cust_id=$id;
			if ($id == '') {
				$response = array('status' => 301, 'message' => 'Profile updated successfully');
				echo json_encode($response);
			}else {
					$array_input_more = array(
					'CUST_ID' => $id,
					'CUST_TYPE'=>('retired'),
					'RETIRED' => 1,
					'RETIRED_ANNUAL_INCOME' => $this->input->post('income'),
					'RETIRED_ANNUAL_INCOME_TYPE' => $this->input->post('income_type'),	
					'RETIRED_EMIS' => $this->input->post('emis'),					
				);	
				  

				$check_id = $this->Customercrud_model->check_income_profile($id);
				if($check_id > 0){
									$Result_id = $this->Customercrud_model->update_profile_income_details($id, $array_input_more);
									$array_input_more = array(
												'CUST_ID' => $id,
												'STATUS'=>('Income details complete'),
												'last_updated_date'=>date("Y/m/d")
												);
								
								$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
									
								 }  
				else {
						 $Result_id = $this->Customercrud_model->insert_profile_income_details($id, $array_input_more);
						 $array_input_more = array(
												'CUST_ID' => $id,
												'STATUS'=>('Income details complete'),
												'last_updated_date'=>date("Y/m/d")
												);
								
								$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);

					}

				if($Result_id > 0){
					$response = array('status' => 1, 'message' => 'Profile updated successfully','ID'=>$cust_id);
					echo json_encode($response);
				}else {
					$response = array('status' => 0, 'message' => 'Error in profile update');
					echo json_encode($response);
				}
			}	
		}

		public function customer_flow_update_s_two_coapp_retired(){
			//$this->showErrorMessage("hi mahi");
			$id = $this->input->post("coappid");

			if ($id == '') {
				$response = array('status' => 301, 'message' => 'Coapplicant Profile updated successfully');
				echo json_encode($response);
			}else {
					$array_input_more = array(
					'COAPP_ID' => $id,
					'COAPP_TYPE'=>('retired'),
					'RETIRED' => 1,
					'RETIRED_ANNUAL_INCOME' => $this->input->post('income'),
					'RETIRED_ANNUAL_INCOME_TYPE' => $this->input->post('income_type'),	
					'RETIRED_EMIS' => $this->input->post('emis'),					
				);	
				

				$checkRow = $this->Customercrud_model->getCoapplicantIncome($id);
			
				if(isset($checkRow))$id = $this->Customercrud_model->update_coapplicant_income($id, $array_input_more);
				else $id = $this->Customercrud_model->insert_coapplicant_income($array_input_more);

				if($id > 0){
					$response = array('status' => 1, 'message' => 'Coapplicant Profile updated successfully');
					echo json_encode($response);
				}else {
					$response = array('status' => 0, 'message' => 'Error in Coapplicant profile update');
					echo json_encode($response);
				}
			}	
		}
// code by priyanka abd ============================================================================================================
		public function customer_flow_update_s_two_business(){
			$id = $this->input->post("ID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
               $cust_id=$id;
			if ($id == '') 
			{
				$response = array('status' => 301);
				echo json_encode($response);
			}else 
			{
				$business_profession = $this->input->post('user_profession');
				if($business_profession== 'CA')
				{
					$array_input = array(
					'CUST_ID' => $id,
					'CUST_TYPE'=>('self employeed'),
					'ORG_ADRS_LINE_1' => $this->input->post('resi_add_1'),
					'ORG_ADRS_LINE_2' => $this->input->post('resi_add_2'),
					'ORG_ADRS_LINE_3' => $this->input->post('resi_add_3'),
					'ORG_LANDMARK' => $this->input->post('business_landmark'),
					'ORG_PINCODE' => $this->input->post('resi_pincode'),
					'ORG_STATE' => $this->input->post('resi_state'),
					'ORG_DISTRICT' => $this->input->post('resi_district'),
					'ORG_CITY' => $this->input->post('resi_city'),
					'BIS_YEARS_CURRERENT_ADDRS' => $this->input->post('resi_no_of_years'),
					'BIS_PROPERTY_TYPE' => $this->input->post('sel_property_type'),
					'BIS_PROFESSION' => $this->input->post('user_profession'),
					'REGI_NO' => $this->input->post('regi_no_ca'),
					'BIS_PAN' => $this->input->post('business_pan'),
					'BIS_GST' => $this->input->post('business_gst_no'),
					//'CA_regi_no' => $this->input->post('icai_number'),
					'CA_regi_no' => $this->input->post('regi_no_ca'),
					'ICWA_regi_no' => $this->input->post('icwai_number'),
					'CS_regi_no' => $this->input->post('cs_number'),
					'BIS_NAME'=> $this->input->post('org_name_buisness'),
					'BIS_ANNUAL_INCOME' => $this->input->post('business_annual_income'),
					'BIS_INDUS_OPERATING' => $this->input->post('self_emp_operating'),
					'BIS_PREMISES_TYPE' => $this->input->post('self_emp_property_type'),
					'BIS_NATURE_OF_BIS' => $this->input->post('business_nature'),
					'BIS_YEARS_IN_BIS' => $this->input->post('self_emp_no_years'),
					'BIS_CONSTITUTION' => $this->input->post('business_constitution'),
					'BIS_DESIGNATION' => $this->input->post('business_desi'),
					'BIS_BANK_BAL_JSON' => $this->input->post('bank_balance'),
					'BIS_EQUITY'=>$this->input->post('bis_equity')
					
					);
				}
				else if($business_profession== 'CS')
				{
					$array_input = array(
					'CUST_ID' => $id,
					'CUST_TYPE'=>('self employeed'),
					'ORG_ADRS_LINE_1' => $this->input->post('resi_add_1'),
					'ORG_ADRS_LINE_2' => $this->input->post('resi_add_2'),
					'ORG_ADRS_LINE_3' => $this->input->post('resi_add_3'),
					'ORG_LANDMARK' => $this->input->post('business_landmark'),
					'ORG_PINCODE' => $this->input->post('resi_pincode'),
					'ORG_STATE' => $this->input->post('resi_state'),
					'ORG_DISTRICT' => $this->input->post('resi_district'),
					'ORG_CITY' => $this->input->post('resi_city'),
					'BIS_YEARS_CURRERENT_ADDRS' => $this->input->post('resi_no_of_years'),
					'BIS_PROPERTY_TYPE' => $this->input->post('sel_property_type'),
					'BIS_PROFESSION' => $this->input->post('user_profession'),
					'REGI_NO' => $this->input->post('regi_no_cs'),
					'BIS_PAN' => $this->input->post('business_pan'),
					'BIS_GST' => $this->input->post('business_gst_no'),
					//'CA_regi_no' => $this->input->post('icai_number'),
					'CA_regi_no' => $this->input->post('ca_number'),
					'ICWA_regi_no' => $this->input->post('icwai_number'),
					'CS_regi_no' => $this->input->post('regi_no_cs'),
					'BIS_NAME'=> $this->input->post('org_name_buisness'),
					'BIS_ANNUAL_INCOME' => $this->input->post('business_annual_income'),
					'BIS_INDUS_OPERATING' => $this->input->post('self_emp_operating'),
					'BIS_PREMISES_TYPE' => $this->input->post('self_emp_property_type'),
					'BIS_NATURE_OF_BIS' => $this->input->post('business_nature'),
					'BIS_YEARS_IN_BIS' => $this->input->post('self_emp_no_years'),
					'BIS_CONSTITUTION' => $this->input->post('business_constitution'),
					'BIS_DESIGNATION' => $this->input->post('business_desi'),
					'BIS_BANK_BAL_JSON' => $this->input->post('bank_balance'),
					'BIS_EQUITY'=>$this->input->post('bis_equity')
					
					
					);
				}
				else if($business_profession== 'ICWA')
				{
					$array_input = array(
					'CUST_ID' => $id,
					'CUST_TYPE'=>('self employeed'),
					'ORG_ADRS_LINE_1' => $this->input->post('resi_add_1'),
					'ORG_ADRS_LINE_2' => $this->input->post('resi_add_2'),
					'ORG_ADRS_LINE_3' => $this->input->post('resi_add_3'),
					'ORG_LANDMARK' => $this->input->post('business_landmark'),
					'ORG_PINCODE' => $this->input->post('resi_pincode'),
					'ORG_STATE' => $this->input->post('resi_state'),
					'ORG_DISTRICT' => $this->input->post('resi_district'),
					'ORG_CITY' => $this->input->post('resi_city'),
					'BIS_YEARS_CURRERENT_ADDRS' => $this->input->post('resi_no_of_years'),
					'BIS_PROPERTY_TYPE' => $this->input->post('sel_property_type'),
					'BIS_PROFESSION' => $this->input->post('user_profession'),
					'REGI_NO' => $this->input->post('regi_no_icaw'),
					'BIS_PAN' => $this->input->post('business_pan'),
					'BIS_GST' => $this->input->post('business_gst_no'),
					//'CA_regi_no' => $this->input->post('icai_number'),
					'CA_regi_no' => $this->input->post('ca_number'),
					'ICWA_regi_no' => $this->input->post('regi_no_icaw'),
					'CS_regi_no' => $this->input->post('cs_number'),
					'BIS_NAME'=> $this->input->post('org_name_buisness'),
					'BIS_ANNUAL_INCOME' => $this->input->post('business_annual_income'),
					'BIS_INDUS_OPERATING' => $this->input->post('self_emp_operating'),
					'BIS_PREMISES_TYPE' => $this->input->post('self_emp_property_type'),
					'BIS_NATURE_OF_BIS' => $this->input->post('business_nature'),
					'BIS_YEARS_IN_BIS' => $this->input->post('self_emp_no_years'),
					'BIS_CONSTITUTION' => $this->input->post('business_constitution'),
					'BIS_DESIGNATION' => $this->input->post('business_desi'),
					'BIS_BANK_BAL_JSON' => $this->input->post('bank_balance'),
					'BIS_EQUITY'=>$this->input->post('bis_equity')
					
					
					);
				}
				else
				{

					$array_input = array(
					'CUST_ID' => $id,
					'CUST_TYPE'=>('self employeed'),
					'ORG_ADRS_LINE_1' => $this->input->post('resi_add_1'),
					'ORG_ADRS_LINE_2' => $this->input->post('resi_add_2'),
					'ORG_ADRS_LINE_3' => $this->input->post('resi_add_3'),
					'ORG_LANDMARK' => $this->input->post('business_landmark'),
					'ORG_PINCODE' => $this->input->post('resi_pincode'),
					'ORG_STATE' => $this->input->post('resi_state'),
					'ORG_DISTRICT' => $this->input->post('resi_district'),
					'ORG_CITY' => $this->input->post('resi_city'),
					'BIS_YEARS_CURRERENT_ADDRS' => $this->input->post('resi_no_of_years'),
					'BIS_PROPERTY_TYPE' => $this->input->post('sel_property_type'),
					'BIS_PROFESSION' => $this->input->post('user_profession'),
					'REGI_NO' => $this->input->post('regi_no'),
					'BIS_PAN' => $this->input->post('business_pan'),
					'BIS_GST' => $this->input->post('business_gst_no'),
					//'CA_regi_no' => $this->input->post('icai_number'),
					'CA_regi_no' => $this->input->post('ca_number'),
					'ICWA_regi_no' => $this->input->post('icwai_number'),
					'CS_regi_no' => $this->input->post('cs_number'),
					'BIS_NAME'=> $this->input->post('org_name_buisness'),
					'BIS_ANNUAL_INCOME' => $this->input->post('business_annual_income'),
					'BIS_INDUS_OPERATING' => $this->input->post('self_emp_operating'),
					'BIS_PREMISES_TYPE' => $this->input->post('self_emp_property_type'),
					'BIS_NATURE_OF_BIS' => $this->input->post('business_nature'),
					'BIS_YEARS_IN_BIS' => $this->input->post('self_emp_no_years'),
					'BIS_CONSTITUTION' => $this->input->post('business_constitution'),
					'BIS_DESIGNATION' => $this->input->post('business_desi'),
					'BIS_BANK_BAL_JSON' => $this->input->post('bank_balance'),

					// code for no ITR input values
					'ITR_status' =>  $this->input->post('itr_status'),
					'sales_per_month_1' =>  $this->input->post('NO_itr_value_1'),
					'sales_per_cust_1' => $this->input->post('NO_itr_value_2'),
					'cust_per_day_1' =>  $this->input->post('NO_itr_value_3'),
					'total_chachement_1' =>  $this->input->post('NO_itr_value_4'),
					'sales_per_month_2' => $this->input->post('NO_itr_value_5'),
					'sales_per_cust_2' =>  $this->input->post('NO_itr_value_6'),
					'cust_per_day_2' => $this->input->post('NO_itr_value_7'),
					'total_chachement_2' =>  $this->input->post('NO_itr_value_8'),
					'sales_per_month_3' =>   $this->input->post('NO_itr_value_9'),
					'sales_per_cust_3' =>  $this->input->post('NO_itr_value_10'),
					'cust_per_day_3' =>  $this->input->post('NO_itr_value_11'),
					'total_chachement_3' =>  $this->input->post('NO_itr_value_12'),
					'total_anual' =>  $this->input->post('total_annual'),
					'total_gross_margin' =>  $this->input->post('total_gross_margin'),
					'total_profit' =>  $this->input->post('total_profit'),
					'total_utilities' =>   $this->input->post('total_expenses_utilities'),
					'total_salaries' =>   $this->input->post('total_expenses_salaries'),
					'total_rental' =>   $this->input->post('total_expenses_rentals'),
					'total_recurring' =>   $this->input->post('total_additional_recurring_expenses'),
					'gross_profit' =>   $this->input->post('gross_profit'),
					'BIS_EQUITY'=>$this->input->post('bis_equity')
					);
				
				}
				$check_id = $this->Customercrud_model->check_income_profile($id);
				if($check_id > 0)
				{
					$Result_id = $this->Customercrud_model->update_profile_income_details($id, $array_input);
					$array_input_more = array(
												'CUST_ID' => $id,
												'STATUS'=>('Income details complete'),
												'last_updated_date'=>date("Y/m/d"),
												'verify_GST_status'=>$this->input->post('verify_GST_status'),
												'verify_Bis_Pan_status'=>$this->input->post('verify_Bis_Pan_status'),
												'verify_ca_regi_status'=>$this->input->post('verify_ca_regi_status'),
												'verify_cs_regi_status'=>$this->input->post('verify_cs_regi_status'),
												'verify_icwa_regi_status'=>$this->input->post('verify_icwa_regi_status')
												
												);
								
								$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
								
							
				}
				else {
					$Result_id = $this->Customercrud_model->insert_profile_income_details($id, $array_input);
					$array_input_more = array(
												'CUST_ID' => $id,
												'STATUS'=>('Income details complete'),
												'last_updated_date'=>date("Y/m/d"),
												'verify_GST_status'=>$this->input->post('verify_GST_status'),
												'verify_Bis_Pan_status'=>$this->input->post('verify_Bis_Pan_status'),
												'verify_ca_regi_status'=>$this->input->post('verify_ca_regi_status'),
												'verify_cs_regi_status'=>$this->input->post('verify_cs_regi_status'),
												'verify_icwa_regi_status'=>$this->input->post('verify_icwa_regi_status')
												);
								
								$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
				}

				if($Result_id > 0  ){
					
					$response = array('status' => 1, 'message' => 'Profile updated successfully','ID'=> $cust_id);
					echo json_encode($response);
				}else {
					$response = array('status' => 0, 'message' => 'Error in profile update');
					echo json_encode($response);
				}	
				
				
			 
				
				
			}
		}
//================================================================================================================================
		

		public function get_address(){
			$id = $this->input->get("ID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}

			
			$row = $this->Customercrud_model->get_address($id);
			
			$response = array('status' => 1, 'data' => $row);
			echo json_encode($response);
		}

		public function get_coapp_address(){
			$id = $this->input->get('ID');
			
			$row = $this->Customercrud_model->get_coapp_address($id);
			
			$response = array('status' => 1, 'data' => $row);
			echo json_encode($response);
		}

		public function get_address_by_pincode(){
			$data = file_get_contents("php://input");
			$data_obj = json_decode($data);
			
			$row = $this->Customercrud_model->get_address_by_pincode($data_obj->pincode);
			
			$response = array('status' => 1, 'data' => $row);
			echo json_encode($response);
		}


		//new flow update

		public function coapplicant_new_screen_one_action(){
			//$this->showErrorMessage("hi mahi");
			$id = $this->input->get("UID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
			if($id == ''){
				$response = array('status' => 3, 'message' => 'Email id already in use');
				echo json_encode($response);
				exit();
			}
			$dob = $this->input->post('dob');		
			$diff = abs(strtotime(date("Y-m-d")) - strtotime($dob));
			$years = floor($diff / (365*60*60*24));
			$unique_code = $this->generateRandomString();
			
			$array_input_more = array(
				'CUST_ID' => $id,
				'AGE' => $years,
				'EDUCATION_BACKGROUND' => $this->input->post('education_type'),
				'FN' => $this->input->post('f_name'),
				'MN' => $this->input->post('m_name'),
				'LN' => $this->input->post('l_name'),
				'EMAIL' => $this->input->post('email'),
				'MOBILE' => $this->input->post('mobile'),
				'GENDER' => $this->input->post('gender'),			
				'DOB' => $dob,			
				'PAN_NUMBER' => $this->input->post('pan'),
				'AADHAR_NUMBER' => $this->input->post('aadhar'),
				'MARTIAL_STATUS' => $this->input->post('marital'),
				'MOTHER_F_NAME' => $this->input->post('m_f_name'),
				'MOTHER_M_NAME' => $this->input->post('m_m_name'),
				'MOTHER_L_NAME' => $this->input->post('m_l_name'),
				'IS_SPOUSE_FATHER' => $this->input->post('spouse'),
				'SPOUSE_F_NAME' => $this->input->post('s_f_name'),
				'SPOUSE_M_NAME' => $this->input->post('s_m_name'),
				'SPOUSE_L_NAME' => $this->input->post('s_l_name'),			
				'RES_ADDRS_LINE_1' => $this->input->post('resi_add_1'),			
				'RES_ADDRS_LINE_2' => $this->input->post('resi_add_2'),
				'RES_ADDRS_LINE_3' => $this->input->post('resi_add_3'),
				'RES_ADDRS_LANDMARK' => $this->input->post('resi_landmark'),
				'RES_ADDRS_PINCODE' => $this->input->post('resi_pincode'),
				'RES_ADDRS_CITY' => $this->input->post('resi_city'),
				'NATIVE_PLACE' => $this->input->post('NATIVE_PLACE'),
				'RES_ADDRS_STATE' => $this->input->post('resi_state'),
				'RES_ADDRS_DISTRICT' => $this->input->post('resi_district'),
				'RES_ADDRS_PROPERTY_TYPE' => $this->input->post('resi_sel_property_type'),
				'RES_ADDRS_NO_YEARS_LIVING' => $this->input->post('resi_no_of_years'),
				'PER_ADDRS_LINE_1' => $this->input->post('per_add_1'),
				'PER_ADDRS_LINE_2' => $this->input->post('per_add_2'),
				'PER_ADDRS_LINE_3' => $this->input->post('per_add_3'),
				'PER_ADDRS_LANDMARK' => $this->input->post('per_landmark'),
				'PER_ADDRS_PINCODE' => $this->input->post('per_pincode'),
				'PER_ADDRS_PROPERTY_TYPE' => $this->input->post('per_sel_property_type'),
				'PER_ADDRS_STATE' => $this->input->post('per_state'),
				'PER_ADDRS_DISTRICT' => $this->input->post('per_district'),
				'PER_ADDRS_CITY' => $this->input->post('per_city'),
				'PER_ADDRS_NO_YEARS_LIVING' => $this->input->post('per_no_of_years'),
				'TOTAL_BRO_SIS' => $this->input->post('no_of_bro_sis'),
				'NO_OF_DEPENDANTS' => $this->input->post('NO_OF_DEPENDANTS'),
				'VERIFY_PAN'=>$this->input->post('verify_pan_status'),
				'KYC_doc'=>$this->input->post('KYC_doc'),
				'KYC'=>$this->input->post('KYC'),
				'VERIFY_KYC'=>$this->input->post('verify_kyc_status'),
				'File_Number_Passport'=>$this->input->post('file_number')
				
				);

			$u_unique_code = $this->input->post('COAPPID');
			$id_mobile_exist = $this->Customercrud_model->check_mobile_coapplicant($u_unique_code, $array_input_more['MOBILE']);
			if($id_mobile_exist > 0){
				$response = array('status' => 0, 'message' => 'Mobile number already in use');
				echo json_encode($response);
				exit();
			}

			$id_email_exist = $this->Customercrud_model->check_email_coapplicant($u_unique_code, $array_input_more['EMAIL']);
			if($id_email_exist > 0){
				$response = array('status' => 0, 'message' => 'Email id already in use');
				echo json_encode($response);
				exit();
			}

					
			if($u_unique_code!='')$cust_row = $this->Customercrud_model->getCoapplicantById($u_unique_code);
			$message = "Profile details updated";
			if(!empty($cust_row)){
				if($cust_row->PROFILE_PERCENTAGE == 0){
					$array_input_more['PROFILE_PERCENTAGE'] = 30;
				}

				$id = $this->Customercrud_model->update_coapplicant($cust_row->UNIQUE_CODE, $array_input_more);
			}else {
				$array_input_more['PROFILE_PERCENTAGE'] = 30;
				$array_input_more['UNIQUE_CODE'] = $unique_code;
				$id = $this->Customercrud_model->insert_coapplicant($array_input_more);
				$message = "Profile details saved";
			}
			
			if($id > 0){
				if($u_unique_code!='')$response = array('status' => 1, 'message' => $message, 'UNIQUE_CODE' => $u_unique_code);
				else $response = array('status' => 1, 'message' => $message, 'UNIQUE_CODE' => $unique_code);
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Error in profile update');
				echo json_encode($response);
			}
		}


		public function coapplicant_new_screen_two_action(){
			//$this->showErrorMessage("hi mahi");
			$id_login = $this->session->userdata('ID');
			$id = $this->input->post('coappid');

			if ($id_login == '') {
				$response = array('status' => 301);
				echo json_encode($response);
			}else {
					$array_input_more = array(
					'COAPP_ID' => $id,
					'COAPP_TYPE'=>('salaried'),
					'ORG_NAME' => $this->input->post('org_name'),
					'ORG_INDUSTRY_OPERATING' => $this->input->post('org_operating'),
					'ORG_TYPE' => $this->input->post('salaried_org_type'),
					'ORG_YEARS_WORKING' => $this->input->post('salaried_org_no_of_years_working'),
					'ORG_ADRS_LINE_1' => $this->input->post('salaried_org_add_line_1'),
					'ORG_ADRS_LINE_2' => $this->input->post('salaried_org_add_line_2'),
					'ORG_ADRS_LINE_3' => $this->input->post('salaried_org_add_line_3'),
					'ORG_LANDMARK' => $this->input->post('salaried_org_landmark'),
					'ORG_PINCODE' => $this->input->post('salaried_org_pin'),
					'ORG_STATE' => $this->input->post('resi_state'),
					'ORG_DISTRICT' => $this->input->post('resi_district'),
					'ORG_CITY' => $this->input->post('resi_city'),
					'ORG_DESIGNATION' => $this->input->post('org_designation'),
					'ORG_WORK_EMAIL' => $this->input->post('org_work_email'),
					'ORG_WORKED_FROM' => $this->input->post('org_working_from'),
					'ORG_SALARY_1' => $this->input->post('salary_1'),
					'ORG_SALARY_2' => $this->input->post('salary_2'),
					'ORG_SALARY_3' => $this->input->post('salary_3'),
					'ORG_EXP_YEAR' => $this->input->post('work_experience_year'),
					'ORG_EXP_MONTH' => $this->input->post('work_experience_month'),
					'ORG_ANNUAL_SALARY' => $this->input->post('org_gross_salary'),
					'ORG_OTHER_INCOME' => $this->input->post('other_income'),
					'ORG_DESIGNATION_PAST' => $this->input->post('org_past_designation'),
					'ORG_WORK_EMAIL_PAST' => $this->input->post('org_past_work_email'),
					'ORG_WORKED_FROM_PAST' => $this->input->post('org_past_working_from'),
					'ORG_SALARY_PAST_1' => $this->input->post('org_past_salary_1'),
					'ORG_SALARY_PAST_2' => $this->input->post('org_past_salary_2'),
					'ORG_SALARY_PAST_3' => $this->input->post('org_past_salary_3'),
					'ORG_ANNUAL_SALARY_PAST' => $this->input->post('org_past_gross_salary'),
					'EMIS' => $this->input->post('emis'),
					'REF_1_F_NAME' => $this->input->post('org_ref_f_name'),
					'REF_1_M_NAME' => $this->input->post('org_ref_m_name'),
					'REF_1_L_NAME' => $this->input->post('org_ref_l_name'),			
					'REF_1_MOBILE' => $this->input->post('org_ref_mobile'),			
					'REF_1_RELATION' => $this->input->post('org_ref_relation'),			
					'REF_2_F_NAME' => $this->input->post('org_ref_2_f_name'),			
					'REF_2_M_NAME' => $this->input->post('org_ref_2_m_name'),			
					'REF_2_L_NAME' => $this->input->post('org_ref_2_l_name'),			
					'REF_2_MOBILE' => $this->input->post('org_ref_2_mobile'),			
					'REF_2_RELATION' => $this->input->post('org_ref_2_relation'),
                    'SALARY_RECIVED' =>	$this->input->post('salary_recived'),			
				);

				$id_mobile_exist = $this->Customercrud_model->check_mobile($id, $array_input_more['REF_1_MOBILE']);
				if($id_mobile_exist > 0){
					$response = array('status' => 0, 'message' => 'Reference number one mobile number already in use');
					echo json_encode($response);
					exit();
				}

				$id_mobile_exist = $this->Customercrud_model->check_mobile($id, $array_input_more['REF_2_MOBILE']);
				if($id_mobile_exist > 0){
					$response = array('status' => 0, 'message' => 'Reference number two mobile number already in use');
					echo json_encode($response);
					exit();
				}

				$id_mobile_exist = $this->Customercrud_model->check_mobile_coapplicant_ref1($id, $array_input_more['REF_1_MOBILE']);
				if($id_mobile_exist > 0){
					$response = array('status' => 0, 'message' => 'Reference number one mobile number already in use');
					echo json_encode($response);
					exit();
				}

				$id_mobile_exist = $this->Customercrud_model->check_mobile_coapplicant_ref2($id, $array_input_more['REF_2_MOBILE']);
				if($id_mobile_exist > 0){
					$response = array('status' => 0, 'message' => 'Reference number two mobile number already in use');
					echo json_encode($response);
					exit();
				}

				$id_email_exist = $this->Customercrud_model->check_email($id, $array_input_more['ORG_WORK_EMAIL']);
				if($id_email_exist > 0){
					$response = array('status' => 0, 'message' => 'Email id already in use');
					echo json_encode($response);
					exit();
				}

				$cust_details_row = $this->Customercrud_model->getCoapplicantById($id);
				$cust_row = $this->Customercrud_model->getCoapplicantIncome($id);
				if(!empty($cust_details_row)){
					$array_input_per = [];
					if($cust_details_row->PROFILE_PERCENTAGE == 30){
						$array_input_per['PROFILE_PERCENTAGE'] = 65;
						$id = $this->Customercrud_model->update_coapplicant($cust_details_row->UNIQUE_CODE, $array_input_per);
					}				
				}

				$message = "Profile details updated";
				if(!empty($cust_row)){				
					$id = $this->Customercrud_model->update_coapplicant_income($id, $array_input_more);
				}else {		
				//print_r($array_input_more);		
					$id = $this->Customercrud_model->insert_coapplicant_income($array_input_more);
					$message = "Profile details saved";
				}
				
				if($id > 0){
					$response = array('status' => 1, 'message' => $message);
					echo json_encode($response);
				}else {
					$response = array('status' => 0, 'message' => 'Error in profile update');
					echo json_encode($response);
				}
			}	
		}


		public function coapplicant_new_screen_two_action_business(){
			$id_login = $this->session->userdata('ID');
			$id = $this->input->post('coappid');

			if ($id_login == '') {
				$response = array('status' => 301);
				echo json_encode($response);
			}else {

				$business_profession = $this->input->post('user_profession');
				if($business_profession== 'CA')
				{
					$array_input_more = array(
						'COAPP_ID' => $id,
						'COAPP_TYPE'=>('self employeed'),
						'ORG_ADRS_LINE_1' => $this->input->post('resi_add_1'),
						'ORG_ADRS_LINE_2' => $this->input->post('resi_add_2'),
						'ORG_ADRS_LINE_3' => $this->input->post('resi_add_3'),
						'ORG_LANDMARK' => $this->input->post('business_landmark'),
						'ORG_PINCODE' => $this->input->post('resi_pincode'),
						'ORG_STATE' => $this->input->post('resi_state'),
						'ORG_DISTRICT' => $this->input->post('resi_district'),
						'ORG_CITY' => $this->input->post('resi_city'),
						'BIS_YEARS_CURRERENT_ADDRS' => $this->input->post('resi_no_of_years'),
						'BIS_PROPERTY_TYPE' => $this->input->post('sel_property_type'),
						'BIS_PROFESSION' => $this->input->post('user_profession'),
						'BIS_PAN' => $this->input->post('business_pan'),
						'REGI_NO' => $this->input->post('regi_no_ca'),
						'BIS_GST' => $this->input->post('business_gst_no'),
						'CA_regi_no' => $this->input->post('regi_no_ca'),
						'ICWA_regi_no' => $this->input->post('icwai_number'),
						'CS_regi_no' => $this->input->post('cs_number'),
						'BIS_NAME'=> $this->input->post('org_name_buisness'),
						'BIS_ANNUAL_INCOME' => $this->input->post('business_annual_income'),
						'BIS_INDUS_OPERATING' => $this->input->post('self_emp_operating'),
						'BIS_PREMISES_TYPE' => $this->input->post('self_emp_property_type'),
						'BIS_NATURE_OF_BIS' => $this->input->post('business_nature'),
						'BIS_YEARS_IN_BIS' => $this->input->post('self_emp_no_years'),
						'BIS_CONSTITUTION' => $this->input->post('business_constitution'),
						'BIS_DESIGNATION' => $this->input->post('business_desi'),
						'BIS_BANK_BAL_JSON' => $this->input->post('bank_balance'),
						'verify_GST_status'=>$this->input->post('verify_GST_status'),
						'verify_Bis_Pan_status'=>$this->input->post('verify_Bis_Pan_status'),
						'verify_ca_regi_status'=>$this->input->post('verify_ca_regi_status'),
						'verify_cs_regi_status'=>$this->input->post('verify_cs_regi_status'),
						'verify_icwa_regi_status'=>$this->input->post('verify_icwa_regi_status')
					);
				}
				else if($business_profession== 'CS')
				{
					$array_input_more = array(
						'COAPP_ID' => $id,
						'COAPP_TYPE'=>('self employeed'),
						'ORG_ADRS_LINE_1' => $this->input->post('resi_add_1'),
						'ORG_ADRS_LINE_2' => $this->input->post('resi_add_2'),
						'ORG_ADRS_LINE_3' => $this->input->post('resi_add_3'),
						'ORG_LANDMARK' => $this->input->post('business_landmark'),
						'ORG_PINCODE' => $this->input->post('resi_pincode'),
						'ORG_STATE' => $this->input->post('resi_state'),
						'ORG_DISTRICT' => $this->input->post('resi_district'),
						'ORG_CITY' => $this->input->post('resi_city'),
						'BIS_YEARS_CURRERENT_ADDRS' => $this->input->post('resi_no_of_years'),
						'BIS_PROPERTY_TYPE' => $this->input->post('sel_property_type'),
						'BIS_PROFESSION' => $this->input->post('user_profession'),
						'BIS_PAN' => $this->input->post('business_pan'),
						'REGI_NO' => $this->input->post('regi_no_cs'),
						'BIS_GST' => $this->input->post('business_gst_no'),
						'CA_regi_no' => $this->input->post('ca_number'),
						'ICWA_regi_no' => $this->input->post('icwai_number'),
						'CS_regi_no' => $this->input->post('regi_no_cs'),
						'BIS_NAME'=> $this->input->post('org_name_buisness'),
						'BIS_ANNUAL_INCOME' => $this->input->post('business_annual_income'),
						'BIS_INDUS_OPERATING' => $this->input->post('self_emp_operating'),
						'BIS_PREMISES_TYPE' => $this->input->post('self_emp_property_type'),
						'BIS_NATURE_OF_BIS' => $this->input->post('business_nature'),
						'BIS_YEARS_IN_BIS' => $this->input->post('self_emp_no_years'),
						'BIS_CONSTITUTION' => $this->input->post('business_constitution'),
						'BIS_DESIGNATION' => $this->input->post('business_desi'),
						'BIS_BANK_BAL_JSON' => $this->input->post('bank_balance'),
						'verify_GST_status'=>$this->input->post('verify_GST_status'),
						'verify_Bis_Pan_status'=>$this->input->post('verify_Bis_Pan_status'),
						'verify_ca_regi_status'=>$this->input->post('verify_ca_regi_status'),
						'verify_cs_regi_status'=>$this->input->post('verify_cs_regi_status'),
						'verify_icwa_regi_status'=>$this->input->post('verify_icwa_regi_status')
					);
				}
				else if($business_profession== 'ICWA')
				{
					$array_input_more = array(
						'COAPP_ID' => $id,
						'COAPP_TYPE'=>('self employeed'),
						'ORG_ADRS_LINE_1' => $this->input->post('resi_add_1'),
						'ORG_ADRS_LINE_2' => $this->input->post('resi_add_2'),
						'ORG_ADRS_LINE_3' => $this->input->post('resi_add_3'),
						'ORG_LANDMARK' => $this->input->post('business_landmark'),
						'ORG_PINCODE' => $this->input->post('resi_pincode'),
						'ORG_STATE' => $this->input->post('resi_state'),
						'ORG_DISTRICT' => $this->input->post('resi_district'),
						'ORG_CITY' => $this->input->post('resi_city'),
						'BIS_YEARS_CURRERENT_ADDRS' => $this->input->post('resi_no_of_years'),
						'BIS_PROPERTY_TYPE' => $this->input->post('sel_property_type'),
						'BIS_PROFESSION' => $this->input->post('user_profession'),
						'BIS_PAN' => $this->input->post('business_pan'),
						'REGI_NO' => $this->input->post('regi_no_icaw'),
						'BIS_GST' => $this->input->post('business_gst_no'),
						'CA_regi_no' => $this->input->post('ca_number'),
						'ICWA_regi_no' => $this->input->post('regi_no_icaw'),
						'CS_regi_no' => $this->input->post('cs_number'),
						'BIS_NAME'=> $this->input->post('org_name_buisness'),
						'BIS_ANNUAL_INCOME' => $this->input->post('business_annual_income'),
						'BIS_INDUS_OPERATING' => $this->input->post('self_emp_operating'),
						'BIS_PREMISES_TYPE' => $this->input->post('self_emp_property_type'),
						'BIS_NATURE_OF_BIS' => $this->input->post('business_nature'),
						'BIS_YEARS_IN_BIS' => $this->input->post('self_emp_no_years'),
						'BIS_CONSTITUTION' => $this->input->post('business_constitution'),
						'BIS_DESIGNATION' => $this->input->post('business_desi'),
						'BIS_BANK_BAL_JSON' => $this->input->post('bank_balance'),
						'verify_GST_status'=>$this->input->post('verify_GST_status'),
						'verify_Bis_Pan_status'=>$this->input->post('verify_Bis_Pan_status'),
						'verify_ca_regi_status'=>$this->input->post('verify_ca_regi_status'),
						'verify_cs_regi_status'=>$this->input->post('verify_cs_regi_status'),
						'verify_icwa_regi_status'=>$this->input->post('verify_icwa_regi_status')
					);
				}
				else
				{
			     	$array_input_more = array(
					'COAPP_ID' => $id,
					'COAPP_TYPE'=>('self employeed'),
					'ORG_ADRS_LINE_1' => $this->input->post('resi_add_1'),
					'ORG_ADRS_LINE_2' => $this->input->post('resi_add_2'),
					'ORG_ADRS_LINE_3' => $this->input->post('resi_add_3'),
					'ORG_LANDMARK' => $this->input->post('business_landmark'),
					'ORG_PINCODE' => $this->input->post('resi_pincode'),
					'ORG_STATE' => $this->input->post('resi_state'),
					'ORG_DISTRICT' => $this->input->post('resi_district'),
					'ORG_CITY' => $this->input->post('resi_city'),
					'BIS_YEARS_CURRERENT_ADDRS' => $this->input->post('resi_no_of_years'),
					'BIS_PROPERTY_TYPE' => $this->input->post('sel_property_type'),
					'BIS_PROFESSION' => $this->input->post('user_profession'),
					'BIS_PAN' => $this->input->post('business_pan'),
					'REGI_NO' => $this->input->post('regi_no'),
					'BIS_GST' => $this->input->post('business_gst_no'),
					'CA_regi_no' => $this->input->post('ca_number'),
					'ICWA_regi_no' => $this->input->post('icwai_number'),
					'CS_regi_no' => $this->input->post('cs_number'),
					'BIS_NAME'=> $this->input->post('org_name_buisness'),
					'BIS_ANNUAL_INCOME' => $this->input->post('business_annual_income'),
					'BIS_INDUS_OPERATING' => $this->input->post('self_emp_operating'),
					'BIS_PREMISES_TYPE' => $this->input->post('self_emp_property_type'),
					'BIS_NATURE_OF_BIS' => $this->input->post('business_nature'),
					'BIS_YEARS_IN_BIS' => $this->input->post('self_emp_no_years'),
					'BIS_CONSTITUTION' => $this->input->post('business_constitution'),
					'BIS_DESIGNATION' => $this->input->post('business_desi'),
					'BIS_BANK_BAL_JSON' => $this->input->post('bank_balance'),
					'verify_GST_status'=>$this->input->post('verify_GST_status'),
					'verify_Bis_Pan_status'=>$this->input->post('verify_Bis_Pan_status'),
					'verify_ca_regi_status'=>$this->input->post('verify_ca_regi_status'),
					'verify_cs_regi_status'=>$this->input->post('verify_cs_regi_status'),
					'verify_icwa_regi_status'=>$this->input->post('verify_icwa_regi_status'),

					 // code for no ITR input values
					 'ITR_status' =>  $this->input->post('itr_status'),
					 'sales_per_month_1' =>  $this->input->post('NO_itr_value_1'),
					 'sales_per_cust_1' => $this->input->post('NO_itr_value_2'),
					 'cust_per_day_1' =>  $this->input->post('NO_itr_value_3'),
					 'total_chachement_1' =>  $this->input->post('NO_itr_value_4'),
					 'sales_per_month_2' => $this->input->post('NO_itr_value_5'),
					 'sales_per_cust_2' =>  $this->input->post('NO_itr_value_6'),
					 'cust_per_day_2' => $this->input->post('NO_itr_value_7'),
					 'total_chachement_2' =>  $this->input->post('NO_itr_value_8'),
					 'sales_per_month_3' =>   $this->input->post('NO_itr_value_9'),
					 'sales_per_cust_3' =>  $this->input->post('NO_itr_value_10'),
					 'cust_per_day_3' =>  $this->input->post('NO_itr_value_11'),
					 'total_chachement_3' =>  $this->input->post('NO_itr_value_12'),
					 'total_anual' =>  $this->input->post('total_annual'),
					 'total_gross_margin' =>  $this->input->post('total_gross_margin'),
					 'total_profit' =>  $this->input->post('total_profit'),
					 'total_utilities' =>   $this->input->post('total_expenses_utilities'),
					 'total_salaries' =>   $this->input->post('total_expenses_salaries'),
					 'total_rental' =>   $this->input->post('total_expenses_rentals'),
					 'total_recurring' =>   $this->input->post('total_additional_recurring_expenses'),
					 'gross_profit' =>   $this->input->post('gross_profit')
				);
			}
				$cust_details_row = $this->Customercrud_model->getCoapplicantById($id);
				$cust_row = $this->Customercrud_model->getCoapplicantIncome($id);
				if(!empty($cust_details_row)){
					$array_input_per = [];
					if($cust_details_row->PROFILE_PERCENTAGE == 30){
						$array_input_per['PROFILE_PERCENTAGE'] = 65;
						$id = $this->Customercrud_model->update_coapplicant($cust_details_row->UNIQUE_CODE, $array_input_per);
					}				
				}

				$message = "Profile details updated";
				if(!empty($cust_row)){				
					$id = $this->Customercrud_model->update_coapplicant_income($id, $array_input_more);
				}else {		
				//print_r($array_input_more);		
					$id = $this->Customercrud_model->insert_coapplicant_income($array_input_more);
					$message = "Profile details saved";
				}
				
				if($id > 0){
					$response = array('status' => 1, 'message' => $message);
					echo json_encode($response);
				}else {
					$response = array('status' => 0, 'message' => 'Error in profile update');
					echo json_encode($response);
				}		
			}
		}

		public function apply_loan_screen_home_loan_action(){
			$id = $this->input->get("UID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
			$home_loan_type=$this->input->post('select_loan_type');
			$this->session->set_userdata('home_loan_type',$home_loan_type);
			
			if ($id == '') {
				$response = array('status' => 301);
				echo json_encode($response);
			}else {
				$array_input_more = array(
					'CUST_ID' => $id,
					'LOAN_TYPE' => $this->input->post('actual_loan_type'),
					'IS_TRANSFER_OUTSTANDING' => $this->input->post('prop_outstand'),
					'IS_PROP_SHORTLISTED' => $this->input->post('prop_short_radio'),
					'PROP_ADD_LINE_1' => $this->input->post('resi_add_1'),
					'PROP_ADD_LINE_2' => $this->input->post('resi_add_2'),
					'PROP_ADD_LINE_3' => $this->input->post('resi_add_3'),
					'PROP_ADD_LANDMARK' => $this->input->post('resi_landmark'),
					'PROP_ADD_PINCODE' => $this->input->post('resi_pincode'),
					'PROP_ADD_STATE' => $this->input->post('resi_state'),
					'PROP_ADD_DISTRICT' => $this->input->post('resi_district'),
					'PROP_ADD_CITY' => $this->input->post('resi_city'),
					'PROP_ADD_PROP_TYPE' => $this->input->post('resi_sel_property_type'),
					'PROP_ADD_NO_YEARS' => $this->input->post('resi_no_of_years'),
					'SAVING_IN_BANK' => $this->input->post('savings_in_bank'),
					'OTHER_INVESTMENTS' => $this->input->post('other_invest'),
					'IMMOVABLE_PROP' => $this->input->post('immovable_prop'),
					'INSURANCE_POLICY' => $this->input->post('insurance_poli'),
					'RATE_OPTION' => $this->input->post('select_rate_option'),
					'TENURE' => $this->input->post('tenure_year'),
					'HOME_LOAN_TYPE' => $this->input->post('select_loan_type'),
					'DESIRED_LOAN_AMOUNT' => $this->input->post('desired_loan_amount'),
					'LOAN_AVAILED_FOR' => $this->input->post('loan_availed_for'),
					'AREA_OF_LAND' => $this->input->post('area_land'),
					'CARPET_AREA' => $this->input->post('carpet_area'),
					'BUILD_UP_AREA' => $this->input->post('buildup_area'),
					'STAGE_OF_CONSTRUCTION' => $this->input->post('stage_of_const'),
					'BANK_DETAILS_JSON' => $this->input->post('banks'),
					'FINAL_ESTIMATED_COST' => $this->input->post('estimate_req_fund'),
					'FINAL_LOAN_REQUESTED' => $this->input->post('requested_fund'),
					'FINAL_SAVING_FROM_BANK' => $this->input->post('bank_saving'),
					'FINAL_DISPOSAL_INVESTMENT' => $this->input->post('disposal_invest'),
					'FINAL_SALE_PROPERTY' => $this->input->post('sale_of_property'),
					'FINAL_FAMILY' => $this->input->post('family_amount'),
					'FINAL_PROVIDENT_FUND' => $this->input->post('provident_fund'),
					'FINAL_OTHERS' => $this->input->post('others'),
					'PROP_LOCATION' => $this->input->post('prop_location'),
					'bank_id'=>$this->input->post('bank_name')
				);
                
				
				// $result_id = $this->Customercrud_model->insert_apply_for_loan($array_input_more);
				
				// if($result_id > 0){
				// 	if($this->input->post('actual_loan_type')=='home')
				// 	{
				// 		//$response = array('status' => 1, 'message' => 'You have successfully applied for loan, Our loan consultant will contact you very soon.');
				// 		$response = array('status' => 1, 'message' => 'You have successfully applied for loan, Please Upload Document required For loan.');
				// 	    echo json_encode($response);
				// 		 $array_input_more = array(
				// 								'CUST_ID' => $id,
				// 								'STATUS'=>('Loan application complete')
				// 								);
								
				// 				$result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
						
				// 	}
					
				// }else {
				// 	$response = array('status' => 0, 'message' => 'Error in loan apply');
				// 	echo json_encode($response);
				// }
				
				//==============================================================================
				$type=$this->input->post('actual_loan_type');
				//exit();
				$result_id_row =$this->Customercrud_model->find_customer_entry_id_data($id ,$type);

				if(!empty($result_id_row))
				{
					//echo "one";
					//exit();
					$created_date=$result_id_row->CREATED_AT;
					$date1=date_create($result_id_row->CREATED_AT);
					$date2=date_create(date("Y-m-d"));
					$diff=date_diff($date1,$date2);
					$days=$diff->format("%a");
					if($days < 15)
					{
						//echo "two";
						//exit();
						$update_loan_details = $this->Customercrud_model->update_loan_application_id($id,$array_input_more,$created_date);
						if($update_loan_details > 0)
						{
							//echo "three";
						    //exit();

			    			if($this->input->post('actual_loan_type')=='home')
				 			{
								//echo "six";
								//exit();
				 			//$response = array('status' => 1, 'message' => 'You have successfully applied for loan, Our loan consultant will contact you very soon.');
				 			$response = array('status' => 1, 'message' => 'Loan application updated successfully, Please Upload Document required For loan.');
				 	   		echo json_encode($response);
				 			$array_input_more = array(
				 								'CUST_ID' => $id,
				 								'STATUS'=>('Loan application complete'),
												 'last_updated_date'=>date("Y/m/d")
				 								);
							$result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
						
				 			}
						}else 
						{
				 			$response = array('status' => 0, 'message' => 'Error in loan apply');
				 			echo json_encode($response);
				    	}
					}
					else
					{
						//echo "four";
						//exit(); 
						$result_id = $this->Customercrud_model->insert_apply_for_loan($array_input_more);
				
				   		if($result_id > 0)
						{
							//echo "five";
						    //exit();

			    			if($this->input->post('actual_loan_type')=='home')
				 			{
								//echo "seven";
								//exit();
				 			//$response = array('status' => 1, 'message' => 'You have successfully applied for loan, Our loan consultant will contact you very soon.');
				 			$response = array('status' => 1, 'message' => 'You have successfully applied for loan, Please Upload Document required For loan.');
				 	   		echo json_encode($response);
				 			$array_input_more = array(
				 								'CUST_ID' => $id,
				 								'STATUS'=>('Loan application complete'),
												 'last_updated_date'=>date("Y/m/d")
				 								);
							$result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
						
				 			}
						}else 
						{
				 			$response = array('status' => 0, 'message' => 'Error in loan apply');
				 			echo json_encode($response);
				    	}

					}
				}
				else
				{
					//echo "else";
					//	   exit(); 
					$result_id = $this->Customercrud_model->insert_apply_for_loan($array_input_more);
				
				    if($result_id > 0)
					{
			    		if($this->input->post('actual_loan_type')=='home')
				 		{
				 		//$response = array('status' => 1, 'message' => 'You have successfully applied for loan, Our loan consultant will contact you very soon.');
				 			$response = array('status' => 1, 'message' => 'You have successfully applied for loan, Please Upload Document required For loan.');
				 	   		echo json_encode($response);
				 			$array_input_more = array(
				 								'CUST_ID' => $id,
				 								'STATUS'=>('Loan application complete'),
												 'last_updated_date'=>date("Y/m/d")
				 								);
							$result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
						
				 		}
					}else 
					{
				 		$response = array('status' => 0, 'message' => 'Error in loan apply');
				 		echo json_encode($response);
				    }
				}

				//==============================================================================

			}
		}

		public function apply_loan_screen_lap_loan_action(){
			$id = $this->input->get("UID");
			
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				$cust_id=$id;
			if ($id == '') {
				$response = array('status' => 301);
				echo json_encode($response);
			}else {
				$array_input_more = array(
					'CUST_ID' => $id,
					'LOAN_TYPE' => $this->input->post('actual_loan_type'),				
					'PROP_ADD_LINE_1' => $this->input->post('resi_add_1'),
					'PROP_ADD_LINE_2' => $this->input->post('resi_add_2'),
					'PROP_ADD_LINE_3' => $this->input->post('resi_add_3'),
					'PROP_ADD_LANDMARK' => $this->input->post('resi_landmark'),
					'PROP_ADD_PINCODE' => $this->input->post('resi_pincode'),
					'PROP_ADD_STATE' => $this->input->post('resi_state'),
					'PROP_ADD_DISTRICT' => $this->input->post('resi_district'),
					'PROP_ADD_CITY' => $this->input->post('resi_city'),
					'PROP_ADD_PROP_TYPE' => $this->input->post('resi_sel_property_type'),
					'PROP_ADD_NO_YEARS' => $this->input->post('resi_no_of_years'),				
					'RATE_OPTION' => $this->input->post('select_rate_option'),
					'TENURE' => $this->input->post('tenure_year'),
					'HOME_LOAN_TYPE' => $this->input->post('select_loan_type'),
					'DESIRED_LOAN_AMOUNT' => $this->input->post('desired_loan_amount'),
					'LOAN_AVAILED_FOR' => $this->input->post('loan_availed_for'),
					'AREA_OF_LAND' => $this->input->post('area_land'),
					'CARPET_AREA' => $this->input->post('carpet_area'),
					'BUILD_UP_AREA' => $this->input->post('buildup_area'),				
					'BANK_DETAILS_JSON' => $this->input->post('banks'),
					
					'REASON_FOR_VISIT' => $this->input->post('visit_reason'),
					'IS_SOLE_OWNER' => $this->input->post('sole_owner'),
					'SHARE_IN_PROP' => $this->input->post('share_prop'),
					'IS_BANK_OBTAIN_SOLE' => $this->input->post('sole_owner_able'),
					'IS_LEGAL_TITLE_CLEAR' => $this->input->post('legal_title'),
					'IS_LOAN_ON_PROP' => $this->input->post('loan_on_property'),
					'HOW_MANY_PROP_OWN' => $this->input->post('no_of_property'),
					'bank_id'=>$this->input->post('bank_name')
					
				);

				
				$result_id = $this->Customercrud_model->insert_apply_for_loan($array_input_more);
				
				if($result_id > 0){
					if($this->input->post('actual_loan_type')=='lap')
					{
						//$response = array('status' => 1, 'message' => 'You have successfully applied for loan, Our loan consultant will contact you very soon.');
						$response = array('status' => 1, 'message' => 'You have successfully applied for loan, Please Upload Document required For loan.','UID'=>$cust_id );
					    echo json_encode($response);
						 $array_input_more = array(
												'CUST_ID' => $id,
												'STATUS'=>('Loan application complete'),
												'last_updated_date'=>date("Y/m/d")
												);
								
								$result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
						
					}
				}else {
					$response = array('status' => 0, 'message' => 'Error in loan apply','UID'=>$cust_id);
					echo json_encode($response);
				}		
			}
		}

		public function apply_loan_screen_busi_per_cc_loan_action()
		{
			$id = $this->input->get("UID");
			if ($id == '') 
			{ $id = $this->session->userdata("ID");
			}
			$cust_id=$id;
			if ($id == '') {
				$response = array('status' => 301);
				echo json_encode($response);
			}else {
				$type = $this->input->post('actual_loan_type');
				if($type == 'personal' || $type == 'business'){
					$array_input_more = array(
						'CUST_ID' => $id,
						'LOAN_TYPE' => $type,				
						'TENURE' => $this->input->post('tenure_year'),
						'DESIRED_LOAN_AMOUNT' => $this->input->post('desired_loan_amount'),				
						'REASON_FOR_VISIT' => $this->input->post('visit_reason')				
						
					);
				}else if($type == 'credit'){
					$array_input_more = array(
						'CUST_ID' => $id,
						'LOAN_TYPE' => $type,				
						'CC_BANK' => $this->input->post('bank_name')				
						
					);
				}
				
				$result_id = $this->Customercrud_model->insert_apply_for_loan($array_input_more);
				
				 if($result_id > 0){
				 	$response = array('status' => 1, 'message' => 'You have successfully applied for loan, Our loan consultant will contact you very soon.','UID'=>$id);
				 	echo json_encode($response);
				 		  $array_input_more = array(
				 								'CUST_ID' => $id,
				 								'STATUS'=>('Loan application complete'),
												 'last_updated_date'=>date("Y/m/d")
				 								);
								
				 				$result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
				 }else {
				 	$response = array('status' => 0, 'message' => 'Error in loan apply','UID'=>$id);
				 	echo json_encode($response);
				 }
				//============================================================
				// 	$result_id_row =$this->Customercrud_model->find_customer_entry_id_data($cust_id,$type);
				// 	if(!empty($result_id_row))
				// 	{	//echo "one";//exit();
				// 		$created_date=$result_id_row->CREATED_AT;
				// 		$date1=date_create($result_id_row->CREATED_AT);
				// 		$date2=date_create(date("Y-m-d"));
				// 		$diff=date_diff($date1,$date2);
				// 		$days=$diff->format("%a");
				// 		if($days < 15)
				// 		{  // Update loan details data;  // exit();
	  			// 			$update_loan_details = $this->Customercrud_model->update_loan_application_id($id,$array_input_more,$created_date);
	  			// 			if($update_loan_details > 0)
	  			// 			{
		 		// 				$response = array('status' => 1, 'message' => 'Loan Details Updated Successfully !, Our loan consultant will contact you very soon.','UID'=>$id);
		 		// 				echo json_encode($response);
		  		// 				$array_input_more = array(
				// 			 		'CUST_ID' => $id,
				// 			 		'STATUS'=>('Loan application complete')
				// 			 		);
				// 				$result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
	  			// 			}
	 			// 			else 
	 			// 			{
		 		// 				$response = array('status' => 0, 'message' => 'Error in loan apply','UID'=>$id);
		 		// 				echo json_encode($response);
	 			// 			} 
	  
				// 		}
				// 		else
				// 		{ //new entry 
				// 			$result_id = $this->Customercrud_model->insert_apply_for_loan($array_input_more);
		   		// 			if($result_id > 0)
		 		// 			{
				// 				$response = array('status' => 1, 'message' => 'You have successfully applied for loan, Our loan consultant will contact you very soon.','UID'=>$id);
				// 				echo json_encode($response);
				// 				$array_input_more = array(
				// 					'CUST_ID' => $id,
				// 					'STATUS'=>('Loan application complete')
				// 					);
				// 				$result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
				// 			}
				// 			else 
				// 			{
				// 				$response = array('status' => 0, 'message' => 'Error in loan apply','UID'=>$id);
				// 				echo json_encode($response);
				// 			} 
				// 		}
				// 	}
				// 	else
				// 	{//echo "four";	//exit();
				// 		$result_id = $this->Customercrud_model->insert_apply_for_loan($array_input_more);
	  			// 		if($result_id > 0)
	  			// 		{
				// 			$response = array('status' => 1, 'message' => 'You have successfully applied for loan, Our loan consultant will contact you very soon.','UID'=>$id);
				// 			echo json_encode($response);
			 	// 			$array_input_more = array(
				// 				'CUST_ID' => $id,
				// 				'STATUS'=>('Loan application complete')
				// 				);
				// 			$result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
	   			// 		}
	  			// 		else 
				// 		{
				// 			$response = array('status' => 0, 'message' => 'Error in loan apply','UID'=>$id);
				// 			echo json_encode($response);
				// 		} 	
				// }
				//=================================================================================

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
		public function view_doc()
		{
			$id = $this->input->get("UID");
			$this->session->set_userdata("UID",$id);
				
			//	if ($id == '') {
				//	$id = $this->session->userdata("ID");
			//	}
			$array_input_more = array(
				'Aadhar_Esign_Consent'=>'true'
				);
			$this->Customercrud_model->update_profile_more($id, $array_input_more);
			$data_cust_info=$this->Customercrud_model->getProfileData($id);
			
			
			$dir='./images/all_document_pdf/';    
			$filename= "$id.pdf";                                      
			if(file_exists($dir.$filename))
			{
				$data['link']=$dir.$filename;
			}
			else 
			{
				   
					 $this->session->set_flashdata('warning', 'You Are Not Uploaded Your Document Please Upload Documents');
			}
			

	
			$age = $this->session->userdata("AGE");
			
			$data_row = $this->Customercrud_model->getAppliedLoans($id);
			$this->load->helper('url');
			$data['id']=$id ;
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['error'] = '';
			$data['loans'] = $data_row;
			$data['cust_info'] = $data_cust_info;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$this->load->view('header', $data);
			$this->load->view('customer/view_doc');
		}
		public function Customer_loan_apply_sucess()
		{
			$id = $this->session->userdata('UID');
			$age = $this->session->userdata("AGE");
			$data['id']=$id ;
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['error'] = '';
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$this->load->view('header', $data);
			$this->load->view('customer/Customer_loan_apply_sucess');
		}
		public function Store_consent()
		{
			
			$data['link']=$this->input->post('link');
			$data['name']=$this->input->post('name');
			$data['Userid']=$this->input->post('UID');
			
			$this->session->set_flashdata('data', $data);
			redirect('Api_Functions/Customer_Login/'.$data);
		}
		public function view_esign_doc()
		{
				$id = $this->session->userdata('ID');
				$age = $this->session->userdata("AGE");
				$link=$this->session->flashdata('link');
				$data_row = $this->Customercrud_model->getAppliedLoans($id);
				$data['id']=$id ;
				$data['showNav'] = 1;
				$data['age'] = $age;
				$data['error'] = '';
				$data['loans'] = $data_row;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				$data['link']=$link;
				$this->load->view('header', $data);
				$this->load->view('customer/view_esign_doc');
			
		}
		public function update_pan_name()
		{
			$pan_name=$this->input->post('pan_name');
			$id = $this->session->userdata('ID');
			$array_input_more=array(
			'CUST_ID' => $id,
			'PAN_NAME'=>$pan_name
			);
			$check_id = $this->Customercrud_model->check_more_profile($id);
			if($check_id > 0)$update_id = $this->Customercrud_model->update_profile_more($id, $array_input_more);
			else $update_id = $this->Customercrud_model->insert_profile_more($id, $array_input_more);
			return $update_id;
			 
		}
		public function pdf($respnse,$profile_data){
		$email=$profile_data->EMAIL;
		
	      $respnse = json_decode($respnse,true);
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
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		
		$from_email = FROM_EMAIL;
		$this->email->from($from_email, 'Finserv'); 
		$this->email->to($email);
		$this->email->subject('Credit Bureau Report'); 
		
		
		//$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
		$this->email->message('Credit Bureau Report');
		$dir='./images/all_document_pdf/'.$respnse_no.'.pdf';
		
        $this->email->attach('./images/all_document_pdf/'.$respnse_no.'.pdf');
		
				
		//Send mail 
		if($this->email->send()) {	
		
		                       
		                        $email=$profile_data->EMAIL;
								$mobile=$profile_data->MOBILE;
								$payment_id= $this->common->get_payment_id($email,$mobile);
		                      $data=array(
									   'refund'=>'Not Applicable',
									   'email_send'=>'yes'
									   );
								$result = $this->common->save_refund_details($data,$payment_id);
		                        $credit_score=$respnse['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
							    $this->session->set_userdata('credit_score',$credit_score);
								
		                    	/*$this->session->unset_userdata('userdata');
								$this->session->set_flashdata('sucess','sucess');
								redirect('front/credit_bureau');*/
								
								
			
		}else{
				
				           $data=array(
									   'refund'=>'Not Applicable',
									   'email_send'=>'No'
									   );
							$result = $this->common->save_refund_details($data,$payment_id);
				        /*$this->session->unset_userdata('userdata');
			            $this->session->set_flashdata('warning','Something get wrong');
						redirect('front/credit_bureau');*/
							
			
		}
	
       
		exit();

	}
	/*
	public function customer_consent()
	{
		$UID = $this->input->get('ID');

		$ID=base64_decode($UID);
	   
	   $profile_data=$this->Customercrud_model->getProfileData($ID);
	   $DSA_ID=$profile_data->DSA_ID;
	   
	   if($DSA_ID!='0')
	    {
		   $dsa_data=$this->Customercrud_model->getProfileData($DSA_ID);
		   $dsa_name=$dsa_data->FN.' '.$dsa_data->LN;
		   $dsa_uniquecode=$dsa_data->UNIQUE_CODE;  
           $data['user_id']= $dsa_uniquecode;
		   $data['dsa_name']= $dsa_name;
	
		   $dsa_email=$dsa_data->EMAIL;
	       $data['dsa_email']= $dsa_email;
		   $data['ID']=$ID;
		}
		 else
		{
			$MANAGER_ID=$profile_data->MANAGER_ID;
			if($MANAGER_ID!='0' )
			{
				    $dsa_data=$this->Customercrud_model->getProfileData($MANAGER_ID);
					$dsa_name=$dsa_data->FN.' '.$dsa_data->LN;
					$dsa_uniquecode=$dsa_data->UNIQUE_CODE;  
                    $data['user_id']= $dsa_uniquecode;
					$data['dsa_name']= $dsa_name;
		
				   $dsa_email=$dsa_data->EMAIL;
				   $data['dsa_email']= $dsa_email;
					$data['ID']=$ID;
			}
			else
			{       $BM_ID=$profile_data->BM_ID;
					if($BM_ID!='0' )
						{
								$dsa_data=$this->Customercrud_model->getProfileData($BM_ID);
								$dsa_name=$dsa_data->FN.' '.$dsa_data->LN;
								$data['dsa_name']= $dsa_name;
								$dsa_uniquecode=$dsa_data->UNIQUE_CODE;
 					    $data['user_id']= $dsa_uniquecode;
								
							   $dsa_email=$dsa_data->EMAIL;
							   $data['dsa_email']= $dsa_email;
								$data['ID']=$ID;
						}
					else{
							$RO_ID=$profile_data->RO_ID;
							if($RO_ID!='0' )
								{
										$dsa_data=$this->Customercrud_model->getProfileData($RO_ID);
										$dsa_name=$dsa_data->FN.' '.$dsa_data->LN;
										$data['dsa_name']= $dsa_name;
										$dsa_uniquecode=$dsa_data->UNIQUE_CODE;
 					        $data['user_id']= $dsa_uniquecode;
								
									   $dsa_email=$dsa_data->EMAIL;
									   $data['dsa_email']= $dsa_email;
										$data['ID']=$ID;
								}
								else
									{
									$CM_ID=$profile_data->CM_ID;
									
										$dsa_data=$this->Customercrud_model->getProfileData($CM_ID);
										$dsa_name=$dsa_data->FN.' '.$dsa_data->LN;
										$data['dsa_name']= $dsa_name;
										$dsa_uniquecode=$dsa_data->UNIQUE_CODE;
					        $data['user_id']= $dsa_uniquecode;
									
									   $dsa_email=$dsa_data->EMAIL; 
									   $data['dsa_email']= $dsa_email; 
										$data['ID']=$ID;
									}
						}
					
			}
			 
		}
	      $this->load->view('customer/customer_consent',$data);

	}
	*/
	   /*if( $DSA_ID=='' ||  $DSA_ID==0)
	   {
		   
		    $MANAGER_ID=$profile_data->MANAGER_ID;
			if( $MANAGER_ID=='' ||  $MANAGER_ID==0)
	           {
				    $CSR_ID=$profile_data->CSR_ID;
			        
						$dsa_data=$this->Customercrud_model->getProfileData($CSR_ID);
						$dsa_name=$dsa_data->FN.' '.$dsa_data->LN;
						$data['dsa_name']= $dsa_name;
						$data['ID']=$ID;
					
				   
			   }
			else
			   {
				   
					$dsa_data=$this->Customercrud_model->getProfileData($MANAGER_ID);
					$dsa_name=$dsa_data->FN.' '.$dsa_data->LN;
					$data['dsa_name']= $dsa_name;
					$data['ID']=$ID;
			   }
	   }else
	   {
		   $dsa_data=$this->Customercrud_model->getProfileData($DSA_ID);
		   $dsa_name=$dsa_data->FN.' '.$dsa_data->LN;
		   $data['dsa_name']= $dsa_name;
		   $data['ID']=$ID;
	   }*/
	   
		
	   //  $dsa_id=$profile_data->DSA_ID;

	   //  $dsa_data=$this->Customercrud_model->getProfileData($dsa_id);
	   //  $dsa_name=$dsa_data->FN.' '.$dsa_data->LN;
	   //  $data['dsa_name']= $dsa_name;
	   //  $data['ID']=$ID;

	   // $array_input['customer_consent'] = 1;
	   //$this->Customercrud_model->update_profile($ID, $array_input);
	

	   //=================== function updated by priyanka

	   public function customer_consent()
	{
		$UID = $this->input->get('ID');

		$ID=base64_decode($UID);
	   
	   $profile_data=$this->Customercrud_model->getProfileData($ID);
	   $DSA_ID=$profile_data->DSA_ID;
	   $MANAGER_ID=$profile_data->MANAGER_ID;
	   $BM_ID=$profile_data->BM_ID;
	   $RO_ID=$profile_data->RO_ID;
	   $CM_ID=$profile_data->CM_ID; 
	   $SELES_ID=$profile_data->SELES_ID;
	   if($DSA_ID!='0')
	    {
		   $dsa_data=$this->Customercrud_model->getProfileData($DSA_ID);
		   $dsa_name=$dsa_data->FN.' '.$dsa_data->LN;
		   $dsa_uniquecode=$dsa_data->UNIQUE_CODE;  
           $data['user_id']= $dsa_uniquecode;
		   $data['dsa_name']= $dsa_name;
		   $dsa_email=$dsa_data->EMAIL;
	       $data['dsa_email']= $dsa_email;
		   $data['ID']=$ID;
		}
	    else if($MANAGER_ID!='0' )
		{
			$dsa_data=$this->Customercrud_model->getProfileData($MANAGER_ID);
			$dsa_name=$dsa_data->FN.' '.$dsa_data->LN;
			$dsa_uniquecode=$dsa_data->UNIQUE_CODE;  
            $data['user_id']= $dsa_uniquecode;
			$data['dsa_name']= $dsa_name;
		    $dsa_email=$dsa_data->EMAIL;
			$data['dsa_email']= $dsa_email;
			$data['ID']=$ID;
		}
		else if($BM_ID!='0' )
		{
			$dsa_data=$this->Customercrud_model->getProfileData($BM_ID);
			$dsa_name=$dsa_data->FN.' '.$dsa_data->LN;
			$data['dsa_name']= $dsa_name;
			$dsa_uniquecode=$dsa_data->UNIQUE_CODE;
 			$data['user_id']= $dsa_uniquecode;
			$dsa_email=$dsa_data->EMAIL;
			$data['dsa_email']= $dsa_email;
			$data['ID']=$ID;
		}
		else if($RO_ID!='0' )
		{
			$dsa_data=$this->Customercrud_model->getProfileData($RO_ID);
			$dsa_name=$dsa_data->FN.' '.$dsa_data->LN;
			$data['dsa_name']= $dsa_name;
			$dsa_uniquecode=$dsa_data->UNIQUE_CODE;
 		    $data['user_id']= $dsa_uniquecode;
		    $dsa_email=$dsa_data->EMAIL;
			$data['dsa_email']= $dsa_email;
			$data['ID']=$ID;
		}
		else if($CM_ID!='0' )
		{
			
			$dsa_data=$this->Customercrud_model->getProfileData($CM_ID);
			$dsa_name=$dsa_data->FN.' '.$dsa_data->LN;
			$data['dsa_name']= $dsa_name;
			$dsa_uniquecode=$dsa_data->UNIQUE_CODE;
			$data['user_id']= $dsa_uniquecode;
		    $dsa_email=$dsa_data->EMAIL; 
			$data['dsa_email']= $dsa_email; 
			$data['ID']=$ID;
		}
		else if($SELES_ID!='0' )
		{
			
			$dsa_data=$this->Customercrud_model->getProfileData($SELES_ID);
			$dsa_name=$dsa_data->FN.' '.$dsa_data->LN;
			$data['dsa_name']= $dsa_name;
			$dsa_uniquecode=$dsa_data->UNIQUE_CODE;
			$data['user_id']= $dsa_uniquecode;
		    $dsa_email=$dsa_data->EMAIL; 
			$data['dsa_email']= $dsa_email; 
			$data['ID']=$ID;
		}



		
	      $this->load->view('customer/customer_consent',$data);

	}























	 public function save_consent()
	 {
		   /*$id=$this->input->post('id');
	       $consent=$this->input->post('is_agree');
		   $array_input['customer_consent'] = $consent;
		   $result=$this->Customercrud_model->update_profile($id, $array_input);
		   if($result>0)
		   {
			   $this->session->set_flashdata('result', 'sucess');
			   $this->process_complete();
		   }
		   else
		   {
			    $this->session->set_flashdata('warnings', 'fail');
				 $this->process_complete();
		   }*/

		   // added by sonal -----------
				$id=$this->input->post('id');

			   $cust_info=$this->Customercrud_model->getProfileData($id);
			   $cust_name=$cust_info->FN." ".$cust_info->LN;
			   $cust_email=$cust_info->EMAIL;
			   $cust_mobile=$cust_info->MOBILE;

			   $date=date('Y-m-d');
			   $dsa_email=$this->input->post('email');
			   $dsa_name=$this->input->post('dsa_name');
			   $user_id=$this->input->post('user_id');

			   $notification='Consent received from customer- '.$cust_name.' on date - '.$date;
		       $status='unseen';

			   $data = array(
								'user_id' => $user_id,
								'notification' => $notification,
								'status' => $status
							 );
			   $data=$this->Customercrud_model->save_notification($data); // entry for notification table



			   $consent=$this->input->post('is_agree');
			   $array_input['customer_consent'] = $consent;
			   $result=$this->Customercrud_model->update_profile($id, $array_input);
			   if($result>0)
			   {
					$this->session->set_flashdata('result', 'sucess');
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
				   $this->email->initialize($config);
				   $this->email->set_newline("\r\n");
				   //$from_email = "infoflfinserv@finaleap.com";
				   		$from_email = FROM_EMAIL;

				   $this->email->from($from_email, 'Finaleap'); 
				   $send_email_to_support= $dsa_email;
				   $this->email->to($send_email_to_support);
				   $this->email->subject('Consent received from Customer - '.$cust_name.' '); 
				   $mailContent = '
				   Dear '.$dsa_name.' , 



				   Details of customer -'.$cust_name.'

				   Customer Name - '.$cust_name.'
				   Email - '.$cust_email .'
				   Mobile - '. $cust_mobile.'
				   Consent received date - '.$date.'
			  
				   Best Regards, 
				   Finaleap Private Limited 
				   ';
				   $this->email->message($mailContent); 
				   $this->email->send();

				  $this->process_complete();

			   //$this->sendEmail_DSA($dsa_email);
					}
					else
					 {
					$this->session->set_flashdata('warnings', 'fail');
					 $this->process_complete();
				// $this->sendEmail_DSA($dsa_email);
					 }
		   
		 
	 }
	 public function process_complete()
	 {
		 $this->load->view('customer/thanku');
	 }
	
	
		
	 //==========================================================================================
	 public function customer_flow_update_s_one_for_score1()
	 {
 
	   //echo "hiii";
	   //xit();
	   //echo $this->input->post('ID');
	   //exit();
		 $data['credit_buerau_price'] = $this->Admin_model->get_credit_buerau_price();
		 $email=$this->input->post('email');
		 $mobile=$this->input->post('mobile');
		 $name= $this->input->post('f_name')." ".$this->input->post('l_name');
		 //echo 	$name;
		 //exit();
		 //$data['ID']=$this->input->post('ID');
		 $userdata = array(
			  'Cust_ID'=> $this->input->post('ID'),
			 'fname' => $this->input->post('f_name'),
			 'mname' => $this->input->post('m_name'),
			 'lname' => $this->input->post('l_name'),
			 'mobile' => $this->input->post('mobile'),
			 'pan' => $this->input->post('pan'),
			 'aadhar' => $this->input->post('aadhar'),
			 'gender' => $this->input->post('gender'),
			 'email' => $this->input->post('email'),
			 'spouse' => $this->input->post('spouse'),
			 's_f_name' => $this->input->post('s_f_name'),
			 's_m_name' => $this->input->post('s_m_name'),
			 's_l_name' => $this->input->post('s_l_name'),
			 
			 'resi_add_1' => $this->input->post('resi_add_1'),
			 'resi_add_2' => $this->input->post('resi_add_2'),
			 'resi_add_3' => $this->input->post('resi_add_3'),
			  'resi_no_of_years' => $this->input->post('resi_no_of_years'),
			 'NATIVE_PLACE' => $this->input->post('NATIVE_PLACE'),
			 'resi_landmark' => $this->input->post('resi_landmark'),
			 'resi_sel_property_type' => $this->input->post('resi_sel_property_type'),
			 'resi_pincode' => $this->input->post('resi_pincode'),
			 'resi_state' => $this->input->post('resi_state'),
			 'resi_district' => $this->input->post('resi_district'),
			 'resi_city' => $this->input->post('resi_city'),
 
 
			 'per_add_1' => $this->input->post('per_add_1'),
			 'per_add_2' => $this->input->post('per_add_2'),
			 'per_add_3' => $this->input->post('per_add_3'),
			  'per_landmark' => $this->input->post('per_landmark'),
			 'per_pincode' => $this->input->post('per_pincode'),
			 'per_sel_property_type' => $this->input->post('per_sel_property_type'),
			 'per_state' => $this->input->post('per_state'),
			 'per_district' => $this->input->post('per_district'),
			 'per_city' => $this->input->post('per_city'),
			 'per_no_of_years' => $this->input->post('per_no_of_years'),
			 'city' => $this->input->post('resi_city'),
 
			 'verify_pan_status' => $this->input->post('verify_pan_status'),
			 'KYC_doc'=>$this->input->post('KYC_doc'),
			 'KYC' => $this->input->post('KYC'),
			 'verify_kyc_status'=>$this->input->post('verify_kyc_status'),
 
			 'file_number'=>$this->input->post('file_number'),
			 'employment_type' => $this->input->post('employment_type'),
			 'monthly_income'=>$this->input->post('monthly_income'),
			 'current_emi'=>$this->input->post('current_emi'),
 
 
				
 
			 'TC' => $this->input->post('TC'),
			 'dob'=>$this->input->post('dob'),
			 'created_date'=>date("Y/m/d"),
		 );
		 $this->session->set_userdata('userdata',$userdata);
 
 $result = $this->common->check_payment_details($email,$mobile,$name);
 $result2 = $this->common->check_payment_details_condition_2($mobile,$name);
 $result3 = $this->common->check_payment_details_condition_3($email,$name);
 if($result>0)
 {
 //echo "one";
 //exit;
 $payment_id = $this->common->get_payment_id($email,$mobile);
 $_SESSION['razorpay_payment_id']=$payment_id;
 redirect('front/save_credit_bureau_without_application');
		 
 }
 elseif($result2>0)
 {
 //echo "two";
 //exit;
 $payment_id = $this->common->get_payment_id($email,$mobile);
 $_SESSION['razorpay_payment_id']=$payment_id;
 redirect('front/save_credit_bureau_without_application');
 }
 elseif($result3>0)
 {
 //echo "three";
 //exit;
 $payment_id = $this->common->get_payment_id($email,$mobile);
 $_SESSION['razorpay_payment_id']=$payment_id;
 redirect('front/save_credit_bureau_without_application');
 }
 else
 {
 //echo "four";
 //exit;
 $this->session->set_userdata('check_payment',0);
 redirect('dsa/check_bureau_score_edit');
 }
 
	 }






	 //=============================================added by priyanka 21-12-2021 ==================================================================
public function coapplicant_check_email()
{
	$data=array(     'Entered_email'=>$this->input->post('Entered_email'),
					 'Applicant_id'=>$this->input->post('Applicant_id'),
					 'Coapplicant_id'=>$this->input->post('Coapplicant_id')
		           );

    $data_applicant_row = $this->Customercrud_model->getProfileData($data['Applicant_id']);
	$App_email = $data_applicant_row->EMAIL;
	$App_mobile= $data_applicant_row->MOBILE;

	if($App_email==$data['Entered_email'])
	{
		$json = array(
	                    'responce_msg'=>'Are you sure you want to proceed with applicants Email ID..',
						'email_to_proceed'=>$data['Entered_email'],
						'msg'=>'sucess'
		);
		echo json_encode($json);
	}
	else
	{
		$id_email_exist = $this->Customercrud_model->check_email_coapplicant($data['Coapplicant_id'],$data['Entered_email']);
	    if($id_email_exist > 0)
		{
	 			$json = array(
			                    'responce_msg'=>'Email id already in use..',
								'msg'=>'fail'
				);
				echo json_encode($json);

	    }

	}

}
public function coapplicant_check_mobile()
{
	$data=array(     'Entered_mobile'=>$this->input->post('Entered_mobile'),
					 'Applicant_id'=>$this->input->post('Applicant_id'),
					 'Coapplicant_id'=>$this->input->post('Coapplicant_id')
		           );

    $data_applicant_row = $this->Customercrud_model->getProfileData($data['Applicant_id']);
	$App_mobile= $data_applicant_row->MOBILE;

	if($App_mobile==$data['Entered_mobile'])
	{
		$json = array(
	                    'responce_msg'=>'Are you sure you want to proceed with applicants mobile number..',
						'msg'=>'sucess'
		);
		echo json_encode($json);
	}
	else
	{
		$id_mobile_exist = $this->Customercrud_model->check_mobile_coapplicant($data['Coapplicant_id'],$data['Entered_mobile']);
	    if($id_mobile_exist > 0){
	 			$json = array(
			                    'responce_msg'=>'Mobile number already in use..',
								'msg'=>'fail'
				);
				echo json_encode($json);

	    }

	}

}

public function coapplicant_new_screen_one_action_go_no_go()
{
	
	$id = $this->input->get("Applicant_ID");
	
	if ($id == '') {
			$id = $this->session->userdata("ID");
		}
	if($id == ''){
		$response = array('status' => 3, 'message' => 'Email id already in use');
		echo json_encode($response);
		exit();
	}

	if($this->Customercrud_model->get_saved_credit_score($id))
	{
		
		$row = $this->Customercrud_model->get_saved_credit_score($id);
		$data['score'] = $row->score;
		$data['score_details']=$row ;
		$data['score_success'] = 1;
		$this->session->set_userdata("score", $row->score);
	}
	else
	{
     	$data['score_success'] = 1;
		$this->session->set_userdata("score",0);
	}
	
	
	$data_row = $this->Customercrud_model->getProfileData($id);
	if($data_row->customer_consent=='true')
	{
		$Cust_consent_id = $id;
		$this->session->set_userdata("Cust_consent_id",$Cust_consent_id);
		$cust_consent_status ="true";
		$this->session->set_userdata("cust_consent_status",$cust_consent_status);
		$user_type= $this->session->userdata("USER_TYPE");
		$this->session->set_userdata("user_type_from_session",$user_type);
    }

	$dob = $this->input->post('dob');		
	$diff = abs(strtotime(date("Y-m-d")) - strtotime($dob));
	$years = floor($diff / (365*60*60*24));
	$unique_code = $this->generateRandomString();
	
	$array_input_more = array(
		'CUST_ID' => $id,
		'AGE' => $years,
    	'FN' => $this->input->post('f_name'),
		'MN' => $this->input->post('m_name'),
		'LN' => $this->input->post('l_name'),
		'EMAIL' => $this->input->post('email'),
		'MOBILE' => $this->input->post('mobile'),
		'GENDER' => $this->input->post('gender'),			
		'DOB' => $dob,			
		'PAN_NUMBER' => $this->input->post('pan'),
		'AADHAR_NUMBER' => $this->input->post('aadhar'),
		'IS_SPOUSE_FATHER' => $this->input->post('spouse'),
		'SPOUSE_F_NAME' => $this->input->post('s_f_name'),
		'SPOUSE_M_NAME' => $this->input->post('s_m_name'),
		'SPOUSE_L_NAME' => $this->input->post('s_l_name'),			
		'RES_ADDRS_LINE_1' => $this->input->post('resi_add_1'),			
		'RES_ADDRS_LINE_2' => $this->input->post('resi_add_2'),
		'RES_ADDRS_LINE_3' => $this->input->post('resi_add_3'),
		'RES_ADDRS_LANDMARK' => $this->input->post('resi_landmark'),
		'RES_ADDRS_PINCODE' => $this->input->post('resi_pincode'),
		'RES_ADDRS_CITY' => $this->input->post('resi_city'),
		'NATIVE_PLACE' => $this->input->post('NATIVE_PLACE'),
		'RES_ADDRS_STATE' => $this->input->post('resi_state'),
		'RES_ADDRS_DISTRICT' => $this->input->post('resi_district'),
		'RES_ADDRS_PROPERTY_TYPE' => $this->input->post('resi_sel_property_type'),
		'RES_ADDRS_NO_YEARS_LIVING' => $this->input->post('resi_no_of_years'),
		'VERIFY_PAN'=>$this->input->post('verify_pan_status'),
		'KYC_doc'=>$this->input->post('KYC_doc'),
		'KYC_doc_1'=>$this->input->post('KYC_doc_1'),
		'KYC'=>$this->input->post('KYC'),
		'VERIFY_KYC'=>$this->input->post('verify_kyc_status'),
		'File_Number_Passport'=>$this->input->post('file_number'),

		'employment_type' => $this->input->post('employment_type'),
		'monthly_income'=>$this->input->post('monthly_income'),
		'current_emi'=>$this->input->post('current_emi')
		
		);

	
		//$this->session->set_userdata('userdata',$array_input_more);
	    $u_unique_code = $this->input->post('COAPPID');
	/*$id_mobile_exist = $this->Customercrud_model->check_mobile_coapplicant($u_unique_code, $array_input_more['MOBILE']);
	if($id_mobile_exist > 0){
	   $this->session->set_flashdata("result",10);
	 	redirect('dsa/GO_No_GO_add_coapplicant?Applicant_ID='.$id,$data);
	}

	$id_email_exist = $this->Customercrud_model->check_email_coapplicant($u_unique_code, $array_input_more['EMAIL']);
	 if($id_email_exist > 0){
	 	$this->session->set_flashdata("result",11);
	 	redirect('dsa/GO_No_GO_add_coapplicant?Applicant_ID='.$id,$data);
	 }
	 */

			
				
	if($u_unique_code!='')
	
	$cust_row = $this->Customercrud_model->getCoapplicantById($u_unique_code);
	
	if(isset($cust_row))
	{
		
		if($cust_row->PROFILE_PERCENTAGE == 0){
			$array_input_more['PROFILE_PERCENTAGE'] = 10;
		}
		$id_result_update = $this->Customercrud_model->update_coapplicant($cust_row->UNIQUE_CODE, $array_input_more);
		$this->session->set_flashdata("result", 7);
		redirect('dsa/GO_No_GO?ID='.$id,$data);
	}
	else {
		
		$array_input_more['PROFILE_PERCENTAGE'] = 10;
		$array_input_more['UNIQUE_CODE'] = $unique_code;
		$id_result = $this->Customercrud_model->insert_coapplicant_go_no_go($array_input_more);
		$message = "Profile details saved";
		$this->session->set_flashdata("result", 6);
		redirect('dsa/GO_No_GO?ID='.$id,$data);
	
		
	}
	
	if($id_result > 0){
		// if($u_unique_code!='')$response = array('status' => 1, 'message' => $message, 'UNIQUE_CODE' => $u_unique_code);
		// else $response = array('status' => 1, 'message' => $message, 'UNIQUE_CODE' => $unique_code);
		// echo json_encode($response);
		redirect('dsa/GO_No_GO?ID='.$id,$data);
	}else {
		//$response = array('status' => 0, 'message' => 'Error in profile update');
		//echo json_encode($response);
		redirect('dsa/GO_No_GO?ID='.$id,$data);
	}
   }
   /*

	public function coapplicant_Go_no_go_credit_score()
		{
			  
		

		    $id =$this->input->get("COAPP_ID");
			$Applicant_id =$this->input->get("App_ID");

				
			$data['Coapplicant_id']=$id ;
			$data['Applicant_id']=$Applicant_id;
		
			

				$data_row = $this->Customercrud_model->getProfileData($Applicant_id);
				if($data_row->customer_consent=='true')
				{
					$Cust_consent_id = $Applicant_id;
					$this->session->set_userdata("Cust_consent_id",$Cust_consent_id);
					$cust_consent_status ="true";
					$this->session->set_userdata("cust_consent_status",$cust_consent_status);
					$user_type= $this->session->userdata("USER_TYPE");
					$this->session->set_userdata("user_type_from_session",$user_type);
    			}


				if($this->Customercrud_model->get_saved_credit_score($id))
				{
					$row = $this->Customercrud_model->get_saved_credit_score($id);
					$data['score'] = $row->score;
					$data['coapplicant_score'] = $row->score;
					//$data['score_details']=$row;
					$data['score_success'] = 1;
					//$this->session->set_userdata("score", $row->score);
					$customer_id= $id;
				
					$array_input_more['Score']=$row->score;
					$id_result_update = $this->Customercrud_model->update_coapplicant($customer_id,$array_input_more);
					$this->session->set_flashdata("result", 5);
					redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
				}
			else
				{
     				$data['score_success'] = 1;
					$this->session->set_userdata("score",0);
				}
            
				// $this->session->set_flashdata("result", 3);
				// $this->session->set_userdata($data);
				// redirect('dsa/GO_No_GO?ID='.$Applicant_id);


				$this->session->set_userdata($data);
			    if($this->Customercrud_model->check_credit_score($id)){
					$response = array('status' => 1, 'message' => '');
					echo json_encode($response);
					redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
				}else {
				
				$this->session->set_userdata("score", '');
				$filterArr = [];
				$reditScoreSavedProfileData = $this->Customercrud_model->getCreditScoreSavedProfileData($id);
			    
				if(!$reditScoreSavedProfileData || empty($reditScoreSavedProfileData)){
					$self_profile_data = $this->Customercrud_model->getProfileData_coapp($id);
					//$self_profile_data_more = $this->Customercrud_model->getProfileDataMore($id);
					$filterArr['pan'] = $self_profile_data->PAN_NUMBER;
					$filterArr['email'] = $self_profile_data->EMAIL;
					$filterArr['mobile'] = $self_profile_data->MOBILE;
					$filterArr['first_name'] = $self_profile_data->FN." ".$self_profile_data->LN;
					$filterArr['last_name'] = $self_profile_data->LN;
					$filterArr['address_line_1'] = $self_profile_data->RES_ADDRS_LINE_1;
					$filterArr['address_line_2'] = $self_profile_data->RES_ADDRS_LINE_2;
					$filterArr['locality'] = $self_profile_data->RES_ADDRS_CITY;
					$filterArr['city'] = $self_profile_data->RES_ADDRS_CITY;
					$filterArr['state'] = $self_profile_data->RES_ADDRS_STATE;
					$filterArr['postal_code'] = $self_profile_data->RES_ADDRS_PINCODE;
					$filterArr['dob'] = $self_profile_data->DOB;
					if($self_profile_data->GENDER!=''){
						if($self_profile_data->GENDER == "male")$filterArr['gender'] = "M";
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
				 $score = $this->session->userdata("score");
			 $code = 0;
			 $respnse = "";
			 if($score == ''){
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
					
				 	$dataArr = json_decode($arr);
					
				//$dataArr = json_decode($arr,true);
			


					
					//$email="piyuabdagire@gmail.com";
 		           // $mobile="9019765828";
         			//$result2 =$this->common->find_combined_cedit_details_sucess($email,$mobile);
					
         			//$arr=$result2->response;
					//$respnse =	$arr;
 					//$dataArr = json_decode($arr);



					//$code = $dataArr->InquiryResponseHeader->SuccessCode;
					if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->Error)){
						$code = 0;
					}
					// else 
					// 
						
					// }
					else 
					$code = 1;
					if(!empty( $dataArr->CCRResponse->CIRReportDataLst[0]->CIRReportData->ScoreDetails[0]->Value))
					{
					$score = $dataArr->CCRResponse->CIRReportDataLst[0]->CIRReportData->ScoreDetails[0]->Value;
					}
					else
					{
						$score='';
					}
				
				if($code == 1){
					if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->Error)){
						
						$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
						$error_code = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorCode;
						$data['score'] = 0;
						$data['score_success'] = $score_error;
						$this->session->set_flashdata("result", 2);
						$this->session->set_userdata('score_success', $score_error);
						redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);

					}else{
						//$id = $this->session->userdata("COAPP_ID");
						$creditSaveArray = [];
						$creditSaveArray['customer_id'] = $id;
						$creditSaveArray['score'] = $score;
						if($respnse!='')
						$creditSaveArray['response'] = $respnse;
						$creditSaveArray['checked_dts'] = date("Y-m-d h:m:s");
						$creditSaveArray['score_success'] ="Success";
						$data['score_success'] ="Success";
					
						$this->Customercrud_model->save_credit_score($creditSaveArray);

						$customer_id= $id;
				
					     $array_input_more['Score']= $score;
					     $id_result_update = $this->Customercrud_model->update_coapplicant($customer_id,$array_input_more);

  						$this->session->set_flashdata("result", 1);
						redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
					}
				}else{
					$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
					
					$error_code = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorCode;
					 
					
					if($error_code >='E0401' && $error_code<='E0420')
					{
						$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
					
						$this->session->set_userdata('error_code', $error_code);
						$this->session->set_userdata('score_error_desc', $score_error );
						$data['score'] = 0;
						$data['score_success'] = $score_error;
						$this->session->set_userdata('score_success', $score_error);
						$this->session->set_flashdata("result", 3);
						redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
					}
					else if($error_code==00 && $score_error=='Consumer not found in bureau')
					{
						$this->session->set_userdata('error_code', $error_code);
						$this->session->set_userdata('score_error_desc', $score_error );
						$data['score'] = 0;
						$data['score_success'] = $score_error;

						$customer_id= $id;
				
					     $array_input_more['Score']= 0;
					     $id_result_update = $this->Customercrud_model->update_coapplicant($customer_id,$array_input_more);


						$this->session->set_userdata('score_success', $score_error);
						$this->session->set_flashdata("result", 4);
						redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
					}
					else
					{
				
					  if($error_code == 'GSWDOE116')
					  {
						  $strpos = strpos($score_error, ':');
						  $score_error = substr($score_error, ($strpos+1));
					  }
					$score_error_dic= $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
					$data['score'] = 0;
					$data['score_success'] = $score_error_dic;
					$this->session->set_flashdata("result", 3);
					$this->session->set_userdata('score_success', $score_error_dic);
					redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
					}
					
				}
				redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
			}
			
			
		}
		*/
		public function coapplicant_Go_no_go_credit_score()
		{
			
			$id =$this->input->get("COAPP_ID");
			$Applicant_id =$this->input->get("App_ID");
			$data['Coapplicant_id']=$id ;
			$data['Applicant_id']=$Applicant_id;
			$this->session->set_userdata('Applicant_id',$Applicant_id);
			$data_row = $this->Customercrud_model->getProfileData($Applicant_id);
			if($data_row->customer_consent=='true')
			{
				$Cust_consent_id = $Applicant_id;
				$this->session->set_userdata("Cust_consent_id",$Cust_consent_id);
				$cust_consent_status ="true";
				$this->session->set_userdata("cust_consent_status",$cust_consent_status);
				$user_type= $this->session->userdata("USER_TYPE");
				$this->session->set_userdata("user_type_from_session",$user_type);
    		}
			$filterArr = [];
			$reditScoreSavedProfileData = $this->Customercrud_model->getCreditScoreSavedProfileData($id);
			$self_profile_data = $this->Customercrud_model->getProfileData_coapp($id);
			
			//$self_profile_data_more = $this->Customercrud_model->getProfileDataMore($id);
			$filterArr['pan'] = $self_profile_data->PAN_NUMBER;
			$filterArr['email'] = $self_profile_data->EMAIL;
			$filterArr['mobile'] = $self_profile_data->MOBILE;
			$filterArr['first_name'] = $self_profile_data->FN." ".$self_profile_data->MN." ".$self_profile_data->LN;
			$filterArr['middle_name'] = $self_profile_data->MN;
			$filterArr['last_name'] = $self_profile_data->LN;
			$filterArr['address_line_1'] = $self_profile_data->RES_ADDRS_LINE_1." ".$self_profile_data->RES_ADDRS_LINE_2;
			$filterArr['address_line_2'] = $self_profile_data->RES_ADDRS_LINE_2;
			$filterArr['locality'] = $self_profile_data->RES_ADDRS_CITY;
			$filterArr['city'] = $self_profile_data->RES_ADDRS_CITY;
			$filterArr['state'] = $self_profile_data->RES_ADDRS_STATE;
			$filterArr['postal_code'] = $self_profile_data->RES_ADDRS_PINCODE;
			$filterArr['dob'] = $self_profile_data->DOB;
			$filterArr['AADHAR_NUMBER'] = $self_profile_data->AADHAR_NUMBER;
			$filterArr['KYC'] = $self_profile_data->KYC;
			$filterArr['KYC_doc'] = $self_profile_data->KYC_doc;
			$filterArr['KYC_doc_1'] = $self_profile_data->KYC_doc_1;
			$filterArr['relation_mem_name'] = $self_profile_data->FN." ".$self_profile_data->MN." ".$self_profile_data->LN;
			if($self_profile_data->GENDER!='')
			{
				if($self_profile_data->GENDER == "male")
				{ 
					$filterArr['gender'] = "M";
				}
				else 
				{	
					$filterArr['gender'] = "F";
				}
			}
			else 
			{
				$filterArr['gender'] = "F";
			}
			/*----------------------------------first Document *------------------------------------------*/
				
			    if( $filterArr['KYC_doc'] == 'Aadhar')
				{
					    $filterArr['ID_type2']='M';
						$searchString = " ";
						$replaceString = "";
						$originalString = $filterArr['KYC'] ;
						$outputString = str_replace($searchString, $replaceString, $originalString, $count); 
						$filterArr['pan2']=$outputString ;

				}
				else if($filterArr['KYC_doc'] == 'Driving Licence')
				{
					$filterArr['ID_type2']='D';
					$filterArr['pan2']=$filterArr['KYC'];

				}
				else if($filterArr['KYC_doc']== 'Passport')
				{
					$filterArr['ID_type2']='P';
					$filterArr['pan2']=$filterArr['KYC'];
				}
				else if($filterArr['KYC_doc'] == 'VoterId')
				{
					$filterArr['ID_type2']='V';
					$filterArr['pan2']=$filterArr['KYC'];
				}
				else if($filterArr['KYC_doc']== 'Pan card')
				{
					$filterArr['ID_type2']='T';
					$filterArr['pan2']=$filterArr['KYC'];
				}
				/*----------------------------------Second Document *------------------------------------------*/
				
				if( $filterArr['KYC_doc_1'] == 'Aadhar')
				{
					    $filterArr['ID_type1']='M';
						$searchString = " ";
						$replaceString = "";
						$originalString = $filterArr['pan'] ;
						$outputString = str_replace($searchString, $replaceString, $originalString, $count); 
						$filterArr['ID_Value_1']=$outputString ;

				}
				else if($filterArr['KYC_doc_1']== 'Pan card')
				{
					$filterArr['ID_type1']='T';
					$filterArr['ID_Value_1']=$filterArr['pan'];
				}
				else if($filterArr['KYC_doc_1'] == 'Driving Licence')
				{
					$filterArr['ID_type1']='D';
					$filterArr['ID_Value_1']=$filterArr['pan'];

				}
				else if($filterArr['KYC_doc_1']== 'Passport')
				{
					$filterArr['ID_type1']='P';
					$filterArr['ID_Value_1']= $filterArr['pan'];
				}
				else if($filterArr['KYC_doc_1'] == 'VoterId')
				{
					$filterArr['ID_type1']='V';
					$filterArr['ID_Value_1']=$filterArr['pan'];
				}

				$stateAbbr = $this->Customercrud_model->getStateAbbr($filterArr['state']);
				if($stateAbbr)$filterArr['state'] = $stateAbbr->state_abbr;
				$name = "Mana rao";
				//$url = 'https://ists.equifax.co.in/cir360service/cir360report';
				//$url='https://eportuat.equifax.co.in/cir360Report/cir360Report';	"CustomerId": "21", "UserId": "UAT_FINALE","Password": "V2*Pdhbr","MemberNumber": "027FZ01852","SecurityCode": "FU1",
					 /*$url ='https://ists.equifax.co.in/cir360service/cir360report';
					 $dataInput = '{
						 "RequestHeader": {
							 "CustomerId": "7716",
							"UserId": "STS_CCRFL4",
							 "Password": "W3#QeicsB",
							 "MemberNumber": "027FZ28423",
							 "SecurityCode": "4UG",
							 "CustRefField": "123456",
							 "ProductCode": [
								 "IDCCR"
							 ]
						 },*/
						 $url ='https://eportuat.equifax.co.in/cir360Report/cir360Report';

 
						 $dataInput = '{
							"RequestHeader": {
								"CustomerId": "21",
								"UserId": "UAT_FINFIN",
								"Password": "V2*Pdhbr",
								"MemberNumber": "028FZ00016",
								"SecurityCode": "FR7",
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
									 "IDValue": "'.$filterArr['pan2'].'",
									 "IDType": "'.$filterArr['ID_type2'].'"
									
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
					 $dataArr = json_decode($arr);
					 $code = $dataArr->InquiryResponseHeader->SuccessCode;
					
					 if($code == 1)
					 {
						
						if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->Error))
						{
							  $customer_id= $id;
							  $creditSaveArray['customer_id'] = $id;
							  $this->session->set_userdata('Coapplicant_id',$customer_id);
							  if(isset($dataArr->Error->ErrorDesc))
							  {
								   $score_error = $dataArr->Error->ErrorDesc;
								   $score_error_dic= $dataArr->Error->ErrorDesc;
								   //$creditSaveArray['score'] = 0;
								   //$creditSaveArray['micro_score']=0;
								   $creditSaveArray['score_success'] = $score_error_dic;
								   $customer_id= $id;
								   $this->session->set_userdata('Coapplicant_id',$customer_id);
								   $creditSaveArray['customer_id'] = $id;
								   $creditSaveArray['response'] = $respnse;
								   $this->session->set_userdata("result", 3);
								   $this->session->set_userdata('score_success', $score_error_dic);
								   $this->Customercrud_model->save_credit_score($creditSaveArray);
    							   redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
						 
							  }
							  $error_code = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorCode;
						      $creditSaveArray['customer_id']=$customer_id;
						      $score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
							  if($error_code >='E0401' && $error_code<='E0420')
							  {
									$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
									$this->session->set_userdata('error_code', $error_code);
									$this->session->set_userdata('score_error_desc', $score_error );
									//$creditSaveArray['score'] = 0;
									//$creditSaveArray['score_success'] = $score_error;
									$this->session->set_userdata('score_success', $score_error);
									$this->session->set_userdata("result", 3);
									redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
							  }
							  else if($error_code==00 && $score_error=='Consumer not found in bureau')
							  { 
									$this->session->set_userdata('error_code', $error_code);
									$this->session->set_userdata('score_error_desc', $score_error );
									$creditSaveArray['score'] = 0;
									$array_input_more['Score']= 0;
									$customer_id= $id;
									$creditSaveArray['customer_id'] = $id;
									$this->session->set_userdata('Coapplicant_id',$customer_id);
									if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorDesc))
									{
										if($error_code==00 && $dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorDesc=='Consumer not found in bureau')
										{
											$creditSaveArray['micro_score'] = 0;
											$array_input_more['micro_score']=0;
										 }
										else
										{
									 		$creditSaveArray['score'] = 0;
											$array_input_more['Score']= 0;
											if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
											{
												$creditSaveArray['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
												$array_input_more['micro_score']=$creditSaveArray['micro_score'] ;
											}
											else
											{
												$creditSaveArray['micro_score']=0;
												$array_input_more['micro_score']= 0;
											}
										}
									}
									else
									{
										$creditSaveArray['score'] = 0;
										$array_input_more['Score']= 0;
										if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
										{
												$creditSaveArray['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
												$array_input_more['micro_score']=$creditSaveArray['micro_score'] ;

										}
										else
										{
												$creditSaveArray['micro_score']=0;
												$array_input_more['micro_score']= 0;
										}
									}
									$creditSaveArray['response'] = $respnse;
									$creditSaveArray['score_success'] = $score_error;
									$customer_id= $id;
									$creditSaveArray['customer_id']=$customer_id;
									//$this->Customercrud_model->save_credit_score($data);// save data into credit score table
									$id_result_update = $this->Customercrud_model->update_coapplicant($customer_id,$array_input_more); // save score and micro score in coapplicant table
    								$this->session->set_userdata('score_success', $score_error);
									$this->session->set_userdata("result", 4);
									$this->Customercrud_model->save_credit_score($creditSaveArray);

									redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
							  }
							  else if($error_code >='E0401' && $error_code<='E0420') //else if for condition c) 
							  {
									//$creditSaveArray['score'] = 0;
									$customer_id= $id;
									$creditSaveArray['customer_id'] = $id;
									//$creditSaveArray['micro_score']=0;
									$creditSaveArray['response'] = $respnse;
									$this->session->set_userdata('Coapplicant_id',$customer_id);
									$creditSaveArray['score_success'] ='Something Wrong in your file';
									$this->session->set_userdata("result", 3);
									$this->session->set_userdata('score_success', $data['score_success']);
									$this->Customercrud_model->save_credit_score($creditSaveArray);
									redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
							  }
							  else 
							  {
								  if($error_code == 'GSWDOE116')
								  {
								    $strpos = strpos($score_error, ':');
									$score_error = substr($score_error, ($strpos+1));
								  }
									$score_error_dic= $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
								  	//$creditSaveArray['score'] = 0;
									//$creditSaveArray['micro_score']=0;
									$creditSaveArray['score_success'] = $score_error_dic;
									$customer_id= $id;
									$this->session->set_userdata('Coapplicant_id',$customer_id);
									$creditSaveArray['customer_id'] = $id;
									$creditSaveArray['response'] = $respnse;
									$this->session->set_userdata("result", 3);

									$this->session->set_userdata('score_success', $score_error_dic);
									$this->Customercrud_model->save_credit_score($creditSaveArray);
									redirect('dsa/GO_No_GO?ID='.$Applicant_id);
							  }

						}
						else
						{
							 $score = $dataArr->CCRResponse->CIRReportDataLst[0]->CIRReportData->ScoreDetails[0]->Value;
							 $creditSaveArray = [];
						     $creditSaveArray['customer_id'] = $id;
						     $this->session->set_userdata('Coapplicant_id',$id);
						     $creditSaveArray['score'] = $score;
						     $array_input_more['Score']= $score;
							 if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
								{
									$creditSaveArray['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
									$array_input_more['micro_score']=$creditSaveArray['micro_score'] ;

								}
							 else
								{
									$creditSaveArray['micro_score']=0;
									$array_input_more['micro_score']= 0;
								}
								if($respnse!='')
								$creditSaveArray['response'] = $respnse;
								$creditSaveArray['checked_dts'] = date("Y-m-d h:m:s");
								$creditSaveArray['score_success'] ="Success";
								$data['score_success'] ="Success";
								$this->Customercrud_model->save_credit_score($creditSaveArray);
								$customer_id= $id;
				   			    $id_result_update = $this->Customercrud_model->update_coapplicant($customer_id,$array_input_more);
  								$this->session->set_flashdata("result", 1);
								  $send_rseponse =json_decode($arr,true);
								 $dataemail = $this->send_internal_bureau_pdf($send_rseponse,$id);
								if($dataemail['email_status']=='success')
                                 {
									redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
								 }
								 else
								 {
									redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
								 }
								
						
						}
					 }
					 else if ($code == 0)
					 {
							$customer_id= $id;
							$creditSaveArray['customer_id'] = $id;
							$this->session->set_userdata('Coapplicant_id',$customer_id);
							if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc))
							{
								$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
						    }
							else if(isset($dataArr->Error->ErrorDesc))
							{
								$score_error = $dataArr->Error->ErrorDesc;
								$score_error_dic= $dataArr->Error->ErrorDesc;
								//$creditSaveArray['score'] = 0;
								//$creditSaveArray['micro_score']=0;
								$creditSaveArray['score_success'] = $score_error_dic;
								$customer_id= $id;
								$creditSaveArray['customer_id'] = $id;
								$creditSaveArray['response'] = $respnse;
								$this->session->set_userdata("result", 3);
								$this->session->set_userdata('score_success', $score_error_dic);
								$this->Customercrud_model->save_credit_score($creditSaveArray);
    							redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
							}
							$error_code = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorCode;
							$creditSaveArray['customer_id']=$customer_id;
							if($error_code >='E0401' && $error_code<='E0420')
							{
								$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
								$this->session->set_userdata('error_code', $error_code);
								$this->session->set_userdata('score_error_desc', $score_error );
								//$creditSaveArray['score'] = 0;
								$creditSaveArray['score_success'] = $score_error;
								$this->session->set_userdata('score_success', $score_error);
								$this->session->set_userdata("result", 3);
								redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
							}
							else if($error_code==00 && $score_error=='Consumer not found in bureau')
							{   
								$this->session->set_userdata('error_code', $error_code);
								$this->session->set_userdata('score_error_desc', $score_error );
								$creditSaveArray['score'] = 0;
								$array_input_more['Score']= 0;
								$customer_id= $id;
								$creditSaveArray['customer_id'] = $id;
						
								 if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorDesc))
								 {
										 if($error_code==00 && $dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorDesc=='Consumer not found in bureau')
										 {
											$creditSaveArray['micro_score'] = 0;
											$array_input_more['micro_score']=0;
										 }
										 else
										 {
									 
											 $creditSaveArray['score'] = 0;
											 $array_input_more['Score']= 0;
											 if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
											 {
													$creditSaveArray['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
													$array_input_more['micro_score']=$creditSaveArray['micro_score'] ;

											 }
											 else
											 {
													$creditSaveArray['micro_score']=0;
													$array_input_more['micro_score']= 0;
											 }
										 }
								 }
								 else
								 {
											$creditSaveArray['score'] = 0;
											 $array_input_more['Score']= 0;
											 if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
											 {
													$creditSaveArray['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
													$array_input_more['micro_score']=$creditSaveArray['micro_score'] ;

											 }
											 else
											 {
													$creditSaveArray['micro_score']=0;
													$array_input_more['micro_score']= 0;
											 }
								 }
								$creditSaveArray['response'] = $respnse;
								$creditSaveArray['score_success'] = $score_error;
								$customer_id= $id;
								$creditSaveArray['customer_id']=$customer_id;
								//$this->Customercrud_model->save_credit_score($data);// save data into credit score table
								$id_result_update = $this->Customercrud_model->update_coapplicant($customer_id,$array_input_more); // save score and micro score in coapplicant table
    							$this->session->set_userdata('score_success', $score_error);
								$this->session->set_userdata("result", 4);
								$this->Customercrud_model->save_credit_score($creditSaveArray);
								redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
							}
							else if($error_code >='E0401' && $error_code<='E0420') //else if for condition c) 
							{
                               // $creditSaveArray['score'] = 0;
								$customer_id= $id;
				                $creditSaveArray['customer_id'] = $id;
								//$creditSaveArray['micro_score']=0;
								$creditSaveArray['response'] = $respnse;
								$creditSaveArray['score_success'] ='Something Wrong in your file';
								$this->session->set_userdata("result", 3);
								$this->session->set_userdata('score_success', $data['score_success']);
								$this->Customercrud_model->save_credit_score($creditSaveArray);
								redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
      	
							}
							else 
							{
				
								  if($error_code == 'GSWDOE116')
								  {
									  $strpos = strpos($score_error, ':');
									  $score_error = substr($score_error, ($strpos+1));
								  }
								$score_error_dic= $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
								//$creditSaveArray['score'] = 0;
								//$creditSaveArray['micro_score']=0;
								$creditSaveArray['score_success'] = $score_error_dic;
								$customer_id= $id;
								$creditSaveArray['customer_id'] = $id;
								$creditSaveArray['response'] = $respnse;
								$this->session->set_userdata("result", 3);
								$this->session->set_userdata('score_success', $score_error_dic);
								$this->Customercrud_model->save_credit_score($creditSaveArray);

								redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
							}
					 }
					 	redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);




			   
		}
		public function coapplicant_Go_no_go_credit_score_old()
		{
			 
		    $id =$this->input->get("COAPP_ID");
			$Applicant_id =$this->input->get("App_ID");
			$data['Coapplicant_id']=$id ;
			$data['Applicant_id']=$Applicant_id;
				$data_row = $this->Customercrud_model->getProfileData($Applicant_id);
				if($data_row->customer_consent=='true')
				{
					$Cust_consent_id = $Applicant_id;
					$this->session->set_userdata("Cust_consent_id",$Cust_consent_id);
					$cust_consent_status ="true";
					$this->session->set_userdata("cust_consent_status",$cust_consent_status);
					$user_type= $this->session->userdata("USER_TYPE");
					$this->session->set_userdata("user_type_from_session",$user_type);
    			}
				$check=$this->Customercrud_model->get_saved_credit_score($id);
				if(isset($check))
				{
			       $row = $this->Customercrud_model->get_saved_credit_score($id);
				}
				else
				{
			       $row = '';
				}

				
				if(!empty($row) && $row->score_success == 'success')
				{
		       
				 
					//$row = $this->Customercrud_model->get_saved_credit_score($id);
				   // if($row->score_success=='success')
					//{
						$data['score'] = $row->score;
					    $data['coapplicant_score'] = $row->score;
					    //$data['score_details']=$row;
					   $data['score_success'] = 1;
					   //$this->session->set_userdata("score", $row->score);
					    $customer_id= $id;
				
					$array_input_more['Score']=$row->score;
					$id_result_update = $this->Customercrud_model->update_coapplicant($customer_id,$array_input_more);
					$this->session->set_flashdata("result", 5);
					redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
					//}
				

				}
			
				else 
				{
			 

				$this->session->set_userdata("score", '');
				$filterArr = [];
				$reditScoreSavedProfileData = $this->Customercrud_model->getCreditScoreSavedProfileData($id);
			    
				/*
				if(!$reditScoreSavedProfileData || empty($reditScoreSavedProfileData)){
					$self_profile_data = $this->Customercrud_model->getProfileData_coapp($id);
					//$self_profile_data_more = $this->Customercrud_model->getProfileDataMore($id);
					$filterArr['pan'] = $self_profile_data->PAN_NUMBER;
					$filterArr['email'] = $self_profile_data->EMAIL;
					$filterArr['mobile'] = $self_profile_data->MOBILE;
					$filterArr['first_name'] = $self_profile_data->FN." ".$self_profile_data->LN;
					$filterArr['last_name'] = $self_profile_data->LN;
					$filterArr['address_line_1'] = $self_profile_data->RES_ADDRS_LINE_1;
					$filterArr['address_line_2'] = $self_profile_data->RES_ADDRS_LINE_2;
					$filterArr['locality'] = $self_profile_data->RES_ADDRS_CITY;
					$filterArr['city'] = $self_profile_data->RES_ADDRS_CITY;
					$filterArr['state'] = $self_profile_data->RES_ADDRS_STATE;
					$filterArr['postal_code'] = $self_profile_data->RES_ADDRS_PINCODE;
					$filterArr['dob'] = $self_profile_data->DOB;
					if($self_profile_data->GENDER!=''){
						if($self_profile_data->GENDER == "male")$filterArr['gender'] = "M";
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
					
					$self_profile_data = $this->Customercrud_model->getProfileData_coapp($id);
					//$self_profile_data_more = $this->Customercrud_model->getProfileDataMore($id);
					$filterArr['pan'] = $self_profile_data->PAN_NUMBER;
					$filterArr['email'] = $self_profile_data->EMAIL;
					$filterArr['mobile'] = $self_profile_data->MOBILE;
					$filterArr['first_name'] = $self_profile_data->FN." ".$self_profile_data->MN." ".$self_profile_data->LN;
					$filterArr['middle_name'] = $self_profile_data->MN;
					$filterArr['last_name'] = $self_profile_data->LN;
					$filterArr['address_line_1'] = $self_profile_data->RES_ADDRS_LINE_1." ".$self_profile_data->RES_ADDRS_LINE_2;
					$filterArr['address_line_2'] = $self_profile_data->RES_ADDRS_LINE_2;
					$filterArr['locality'] = $self_profile_data->RES_ADDRS_CITY;
					$filterArr['city'] = $self_profile_data->RES_ADDRS_CITY;
					$filterArr['state'] = $self_profile_data->RES_ADDRS_STATE;
					$filterArr['postal_code'] = $self_profile_data->RES_ADDRS_PINCODE;
					$filterArr['dob'] = $self_profile_data->DOB;
					$filterArr['AADHAR_NUMBER'] = $self_profile_data->AADHAR_NUMBER;
					$filterArr['KYC'] = $self_profile_data->KYC;
					$filterArr['KYC_doc'] = $self_profile_data->KYC_doc;
					$filterArr['KYC_doc_1'] = $self_profile_data->KYC_doc_1;

						$filterArr['relation_mem_name'] = $self_profile_data->FN." ".$self_profile_data->MN." ".$self_profile_data->LN;

				if( $filterArr['KYC_doc'] == 'Aadhar')
				{
					    $filterArr['ID_type2']='M';
						$searchString = " ";
						$replaceString = "";
						$originalString = $filterArr['KYC'] ;
						$outputString = str_replace($searchString, $replaceString, $originalString, $count); 
						$filterArr['pan2']=$outputString ;

				}
				else if($filterArr['KYC_doc'] == 'Driving Licence')
				{
					$filterArr['ID_type2']='D';
					$filterArr['pan2']=$filterArr['KYC'];

				}
				else if($filterArr['KYC_doc']== 'Passport')
				{
					$filterArr['ID_type2']='P';
					$filterArr['pan2']=$filterArr['KYC'];
				}
				else if($filterArr['KYC_doc'] == 'VoterId')
				{
					$filterArr['ID_type2']='V';
					$filterArr['pan2']=$filterArr['KYC'];
				}

				/*----------------------------------Second Document *------------------------------------------*/
				if( $filterArr['KYC_doc_1'] == 'Aadhar')
				{
					    $filterArr['ID_type1']='M';
						$searchString = " ";
						$replaceString = "";
						$originalString = $filterArr['pan'] ;
						$outputString = str_replace($searchString, $replaceString, $originalString, $count); 
						$filterArr['ID_Value_1']=$outputString ;

				}
				else if($filterArr['KYC_doc_1']== 'Pan card')
				{
					$filterArr['ID_type1']='T';
					$filterArr['ID_Value_1']=$filterArr['pan'];
				}
				else if($filterArr['KYC_doc_1'] == 'Driving Licence')
				{
					$filterArr['ID_type1']='D';
					$filterArr['ID_Value_1']=$filterArr['pan'];

				}
				else if($filterArr['KYC_doc_1']== 'Passport')
				{
					$filterArr['ID_type1']='P';
					$filterArr['ID_Value_1']= $filterArr['pan'];
				}
				else if($filterArr['KYC_doc_1'] == 'VoterId')
				{
					$filterArr['ID_type1']='V';
					$filterArr['ID_Value_1']=$filterArr['pan'];
				}

               /*--------------------------------------------------------------*/
					if($self_profile_data->GENDER!=''){
						if($self_profile_data->GENDER == "male")$filterArr['gender'] = "M";
						else $filterArr['gender'] = "F";
					}else $filterArr['gender'] = "F";

				}
				else
				{
					 
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

					
					if($reditScoreSavedProfileData->gender!=''){
						if($reditScoreSavedProfileData->gender == "male")$filterArr['gender'] = "M";
						else $filterArr['gender'] = "F";
					}else $filterArr['gender'] = "F";

					 /*------------------------aded by papiha on 05_02_2022 for adding 2nd KYC Doc-------------------------------------------------*/
			 if( $filterArr['KYC_doc_1'] == 'Aadhar')
				{
					    $filterArr['ID_type1']='M';
						$searchString = " ";
						$replaceString = "";
						$originalString = $filterArr['pan'] ;
						$outputString = str_replace($searchString, $replaceString, $originalString, $count); 
						$filterArr['ID_Value_1']=$outputString ;

				}
				else if($filterArr['KYC_doc_1']== 'Pan card')
				{
					$filterArr['ID_type1']='T';
					$filterArr['ID_Value_1']=$filterArr['pan'];
				}
				
				else if($filterArr['KYC_doc_1'] == 'Driving Licence')
				{
					$filterArr['ID_type1']='D';
					$filterArr['ID_Value_1']=$filterArr['pan'];

				}
				else if($filterArr['KYC_doc_1']== 'Passport')
				{
					$filterArr['ID_type1']='P';
					$filterArr['ID_Value_1']= $filterArr['pan'];
				}
				else if($filterArr['KYC_doc_1'] == 'VoterId')
				{
					$filterArr['ID_type1']='V';
					$filterArr['ID_Value_1']=$filterArr['pan'];
				}

			}


          

			 /*-----------------------------------------------------------------------------------------------------*/
				
				$stateAbbr = $this->Customercrud_model->getStateAbbr($filterArr['state']);
				if($stateAbbr)$filterArr['state'] = $stateAbbr->state_abbr;
				/*
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
				*/

				//============================================================================================


				 $name = "Mana rao";
				//$url = 'https://ists.equifax.co.in/cir360service/cir360report';
				//$url='https://eportuat.equifax.co.in/cir360Report/cir360Report';	"CustomerId": "21", "UserId": "UAT_FINALE","Password": "V2*Pdhbr","MemberNumber": "027FZ01852","SecurityCode": "FU1",
					  $url ='https://ists.equifax.co.in/cir360service/cir360report';
					 $dataInput = '{
						 "RequestHeader": {
							 "CustomerId": "7716",
							"UserId": "STS_CCRFL2",
							 "Password": "u4raGfV#kk",
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
									 "IDValue": "'.$filterArr['ID_Value_1'].'",
									 "IDType": "'.$filterArr['ID_type1'].'"
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
					
				 	$dataArr = json_decode($arr);
				

					$code = $dataArr->InquiryResponseHeader->SuccessCode;
					
					if(isset( $dataArr->CCRResponse->CIRReportDataLst[0]->CIRReportData->ScoreDetails[0]->Value))
					{
							$score = $dataArr->CCRResponse->CIRReportDataLst[0]->CIRReportData->ScoreDetails[0]->Value;
					}
					else
					{
						$score=0;
					}
				

				if($code == 1)
				{
		 

					if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->Error))
					{
			          

					   $customer_id= $id;
				       $creditSaveArray['customer_id'] = $id;
					   $this->session->set_userdata('Coapplicant_id',$customer_id);
					   if(isset($dataArr->Error->ErrorDesc))
					   {
					  	
                          $score_error = $dataArr->Error->ErrorDesc;
						 // echo $score_error;
						 // exit();


						  $score_error_dic= $dataArr->Error->ErrorDesc;
						  $creditSaveArray['score'] = 0;
						  $creditSaveArray['micro_score']=0;
					      $creditSaveArray['score_success'] = $score_error_dic;
					      $customer_id= $id;
						  $this->session->set_userdata('Coapplicant_id',$customer_id);
				          $creditSaveArray['customer_id'] = $id;
					      $creditSaveArray['response'] = $respnse;
					      $this->session->set_userdata("result", 3);
					      $this->session->set_userdata('score_success', $score_error_dic);
					      $this->Customercrud_model->save_credit_score($creditSaveArray);
    				      redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
				  
					   }
					     $error_code = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorCode;
						 $creditSaveArray['customer_id']=$customer_id;
						 $score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
					
						
						if($error_code >='E0401' && $error_code<='E0420')
						{
						
							$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
					
							$this->session->set_userdata('error_code', $error_code);
							$this->session->set_userdata('score_error_desc', $score_error );
							$creditSaveArray['score'] = 0;
							$creditSaveArray['score_success'] = $score_error;
							$this->session->set_userdata('score_success', $score_error);
							$this->session->set_userdata("result", 3);
							redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
						}
						else if($error_code==00 && $score_error=='Consumer not found in bureau')
						{   
						
							$this->session->set_userdata('error_code', $error_code);
							$this->session->set_userdata('score_error_desc', $score_error );
							$creditSaveArray['score'] = 0;
							$array_input_more['Score']= 0;
							$customer_id= $id;
							$creditSaveArray['customer_id'] = $id;
						    $this->session->set_userdata('Coapplicant_id',$customer_id);
							 if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorDesc))
							 {
									 if($error_code==00 && $dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorDesc=='Consumer not found in bureau')
									 {
										$creditSaveArray['micro_score'] = 0;
										$array_input_more['micro_score']=0;
									 }
									 else
									 {
									 
										 $creditSaveArray['score'] = 0;
										 $array_input_more['Score']= 0;
										 if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
										 {
												$creditSaveArray['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
												$array_input_more['micro_score']=$creditSaveArray['micro_score'] ;

										 }
										 else
										 {
												$creditSaveArray['micro_score']=0;
												$array_input_more['micro_score']= 0;
										 }
									 }
							 }
							 else
							 {
										$creditSaveArray['score'] = 0;
										 $array_input_more['Score']= 0;
										 if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
										 {
												$creditSaveArray['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
												$array_input_more['micro_score']=$creditSaveArray['micro_score'] ;

										 }
										 else
										 {
												$creditSaveArray['micro_score']=0;
												$array_input_more['micro_score']= 0;
										 }
							 }
							$creditSaveArray['response'] = $respnse;
							$creditSaveArray['score_success'] = $score_error;
							$customer_id= $id;
							 $creditSaveArray['customer_id']=$customer_id;
							//$this->Customercrud_model->save_credit_score($data);// save data into credit score table
							$id_result_update = $this->Customercrud_model->update_coapplicant($customer_id,$array_input_more); // save score and micro score in coapplicant table
    						$this->session->set_userdata('score_success', $score_error);
							$this->session->set_userdata("result", 4);
							$this->Customercrud_model->save_credit_score($creditSaveArray);

							redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
						}
						 else if($error_code >='E0401' && $error_code<='E0420') //else if for condition c) 
							 {
								 
									$creditSaveArray['score'] = 0;
									$customer_id= $id;
									 $creditSaveArray['customer_id'] = $id;
									$creditSaveArray['micro_score']=0;
									$creditSaveArray['response'] = $respnse;
									$this->session->set_userdata('Coapplicant_id',$customer_id);
									$creditSaveArray['score_success'] ='Something Wrong in your file';
									$this->session->set_userdata("result", 3);
									$this->session->set_userdata('score_success', $data['score_success']);
									$this->Customercrud_model->save_credit_score($creditSaveArray);

									redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
      	
							 }
							else 
							{
								
				              
							  if($error_code == 'GSWDOE116')
							  {
								  $strpos = strpos($score_error, ':');
								  $score_error = substr($score_error, ($strpos+1));
							  }
								$score_error_dic= $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
								
                               	$creditSaveArray['score'] = 0;
								$creditSaveArray['micro_score']=0;
								$creditSaveArray['score_success'] = $score_error_dic;
								$customer_id= $id;
								$this->session->set_userdata('Coapplicant_id',$customer_id);
								$creditSaveArray['customer_id'] = $id;
								$creditSaveArray['response'] = $respnse;
								$this->session->set_userdata("result", 3);

								$this->session->set_userdata('score_success', $score_error_dic);
								$this->Customercrud_model->save_credit_score($creditSaveArray);
								redirect('dsa/GO_No_GO?ID='.$Applicant_id);
							}
					

					}
					else
					{
						 									
					    $score = $dataArr->CCRResponse->CIRReportDataLst[0]->CIRReportData->ScoreDetails[0]->Value;
						//	echo $score;
					  // exit();
						//$id = $this->session->userdata("COAPP_ID");
						$score = $dataArr->CCRResponse->CIRReportDataLst[0]->CIRReportData->ScoreDetails[0]->Value;
						$creditSaveArray = [];
						$creditSaveArray['customer_id'] = $id;
						 $this->session->set_userdata('Coapplicant_id',$id);
						$creditSaveArray['score'] = $score;
						$array_input_more['Score']= $score;
									 if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
									 {
											$creditSaveArray['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
											$array_input_more['micro_score']=$creditSaveArray['micro_score'] ;

									 }
									 else
									 {
											$creditSaveArray['micro_score']=0;
											$array_input_more['micro_score']= 0;
									 }
								


						if($respnse!='')
						$creditSaveArray['response'] = $respnse;
						$creditSaveArray['checked_dts'] = date("Y-m-d h:m:s");
						$creditSaveArray['score_success'] ="Success";
						$data['score_success'] ="Success";
					
						$this->Customercrud_model->save_credit_score($creditSaveArray);

						$customer_id= $id;
				
					  
					     $id_result_update = $this->Customercrud_model->update_coapplicant($customer_id,$array_input_more);

  						$this->session->set_flashdata("result", 1);
						redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
					}
				}
				 //--------------------------------------------------  if code=0 ---------------------------------------------------
				else
				{
					
						$customer_id= $id;
				       $creditSaveArray['customer_id'] = $id;
					   $this->session->set_userdata('Coapplicant_id',$customer_id);
					   if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc))
					   {
					       $score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
						  // echo $score_error;
						 // exit();
					   }
					   else if(isset($dataArr->Error->ErrorDesc))
					   {
                          $score_error = $dataArr->Error->ErrorDesc;
						 // echo $score_error;
						 // exit();


						  $score_error_dic= $dataArr->Error->ErrorDesc;
						  $creditSaveArray['score'] = 0;
						  $creditSaveArray['micro_score']=0;
					      $creditSaveArray['score_success'] = $score_error_dic;
					      $customer_id= $id;
				          $creditSaveArray['customer_id'] = $id;
					      $creditSaveArray['response'] = $respnse;
					      $this->session->set_flashdata("result", 3);
					      $this->session->set_userdata('score_success', $score_error_dic);
					      $this->Customercrud_model->save_credit_score($creditSaveArray);
    				      redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
				  
					   }
					
					  // exit();
					  $error_code = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorCode;
					  $creditSaveArray['customer_id']=$customer_id;
					
					if($error_code >='E0401' && $error_code<='E0420')
					{
						$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
					
						$this->session->set_userdata('error_code', $error_code);
						$this->session->set_userdata('score_error_desc', $score_error );
						$creditSaveArray['score'] = 0;
						$creditSaveArray['score_success'] = $score_error;
						$this->session->set_userdata('score_success', $score_error);
						$this->session->set_flashdata("result", 3);
						redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
					}
					else if($error_code==00 && $score_error=='Consumer not found in bureau')
					{   
						$this->session->set_userdata('error_code', $error_code);
						$this->session->set_userdata('score_error_desc', $score_error );
						$creditSaveArray['score'] = 0;
						$array_input_more['Score']= 0;
						$customer_id= $id;
				        $creditSaveArray['customer_id'] = $id;
						
					     if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorDesc))
						 {
                                 if($error_code==00 && $dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorDesc=='Consumer not found in bureau')
                                 {
									$creditSaveArray['micro_score'] = 0;
									$array_input_more['micro_score']=0;
								 }
								 else
								 {
									 
									 $creditSaveArray['score'] = 0;
									 $array_input_more['Score']= 0;
									 if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
									 {
											$creditSaveArray['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
											$array_input_more['micro_score']=$creditSaveArray['micro_score'] ;

									 }
									 else
									 {
											$creditSaveArray['micro_score']=0;
											$array_input_more['micro_score']= 0;
									 }
								 }
						 }
						 else
						 {
									$creditSaveArray['score'] = 0;
									 $array_input_more['Score']= 0;
									 if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
									 {
											$creditSaveArray['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
											$array_input_more['micro_score']=$creditSaveArray['micro_score'] ;

									 }
									 else
									 {
											$creditSaveArray['micro_score']=0;
											$array_input_more['micro_score']= 0;
									 }
						 }
						$creditSaveArray['response'] = $respnse;
                        $creditSaveArray['score_success'] = $score_error;
						$customer_id= $id;
						 $creditSaveArray['customer_id']=$customer_id;
						//$this->Customercrud_model->save_credit_score($data);// save data into credit score table
					    $id_result_update = $this->Customercrud_model->update_coapplicant($customer_id,$array_input_more); // save score and micro score in coapplicant table
    					$this->session->set_userdata('score_success', $score_error);
						$this->session->set_flashdata("result", 4);
						$this->Customercrud_model->save_credit_score($creditSaveArray);

						redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
					}
					 else if($error_code >='E0401' && $error_code<='E0420') //else if for condition c) 
                         {
                                $creditSaveArray['score'] = 0;
								$customer_id= $id;
				                 $creditSaveArray['customer_id'] = $id;
								$creditSaveArray['micro_score']=0;
								$creditSaveArray['response'] = $respnse;
								$creditSaveArray['score_success'] ='Something Wrong in your file';
								$this->session->set_flashdata("result", 3);
								$this->session->set_userdata('score_success', $data['score_success']);
								$this->Customercrud_model->save_credit_score($creditSaveArray);

								redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
      	
                         }
					else 
					{
				
					  if($error_code == 'GSWDOE116')
					  {
						  $strpos = strpos($score_error, ':');
						  $score_error = substr($score_error, ($strpos+1));
					  }
					$score_error_dic= $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
					$creditSaveArray['score'] = 0;
					$creditSaveArray['micro_score']=0;
					$creditSaveArray['score_success'] = $score_error_dic;
					$customer_id= $id;
				    $creditSaveArray['customer_id'] = $id;
					$creditSaveArray['response'] = $respnse;
					$this->session->set_flashdata("result", 3);
					$this->session->set_userdata('score_success', $score_error_dic);
					$this->Customercrud_model->save_credit_score($creditSaveArray);

					redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
					}
					
				}
				redirect('dsa/GO_No_GO?ID='.$Applicant_id,$data);
			}
			
			
		}




	}
	public function coapplicant_documents()
		{
			$u_type = $this->session->userdata("USER_TYPE");//user which nis loging important for dashbord
			$id = $this->input->get("UID"); //Coapplicant ID
			$data_row = $this->Customercrud_model->getDocuments($id);//get Co applicant uploaded documents;
			$row=$this->Customercrud_model->getProfileData_coapp($id);// get applicant details
			
			$role=1;// assign role of applicant
			$doc_type_user = $role;//select document where document only for customer
			$data_doctype = "";//$this->Customercrud_model->getDocumentsType($doc_type_user);
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = $age;//for dashbord
            $data['data_row']=$row;//for dashbord
			$inc_src = $this->Customercrud_model->get_user_type_Income($id);//applicant type saleried and self employeed
		   // echo $inc_src;
			/*echo $inc_src;
			exit;*/
			if($inc_src=='retired')
			{
				$Master_type_documen_customer=$this->Customercrud_model->getDocuments_Type_customer_Master_retired();
				//print_r($Master_type_documen_customer);
				//exit;
				
			}
			else
			{
				$Master_type_documen_customer=$this->Customercrud_model->getDocuments_Type_customer_Master();//Distinct Master type from table Like Kyc ,residance,Employment	
			}										
				$Uploded_Doc_Count=$this->Customercrud_model->getUploded_Documents_Type($id);
				$Total_savedDocType=0;//Total mandatory document save by applicant count 
				$Total_mandatory_doc_count=0;

				foreach ($Master_type_documen_customer as $Documents)
				{
					
					//echo $Documents->DOC_MASTER_TYPE,'<br>';
					if($Documents->DOC_MASTER_TYPE=='EMPLOYMENT PROOF')
					{
						//echo "hello".'<br>';
						
						$data_doctype = $this->Customercrud_model->getDocumentsType_by_Employment_type($Documents->DOC_MASTER_TYPE,$doc_type_user,$inc_src );
						/*$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user,$inc_src );*/
						$mandatory_doc_count=$this->Customercrud_model->get_Mandatory_doc_count_for_employment($doc_type_user,$Documents->DOC_MASTER_TYPE,$inc_src);
						$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, $Documents->DOC_MASTER_TYPE);
						$Total_savedDocType=$Total_savedDocType+$savedDocType->doc_count;
						$Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
						//echo $Total_savedDocType.'<br>';
						
					}
					else if($Documents->DOC_MASTER_TYPE=='INCOME PROOF')
				{
					if($inc_src=='self employeed')
						{
							$ITR_status = $this->Customercrud_model->get_user_itr_yes_no($id);//ITR yes or no
							if($ITR_status=='no')
							{
								continue;
							}
							else
							{
								$data_doctype = $this->Customercrud_model->getDocumentsType_by_Employment_type($Documents->DOC_MASTER_TYPE,$doc_type_user,$inc_src );
								/*$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user,$inc_src );*/
								$mandatory_doc_count=$this->Customercrud_model->get_Mandatory_doc_count_for_employment($doc_type_user,$Documents->DOC_MASTER_TYPE,$inc_src);
								$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, $Documents->DOC_MASTER_TYPE);
								$Total_savedDocType=$Total_savedDocType+$savedDocType->doc_count;
								$Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
							}
							
						}
						else
						{
							    $data_doctype = $this->Customercrud_model->getDocumentsType_by_Employment_type($Documents->DOC_MASTER_TYPE,$doc_type_user,$inc_src );
								/*$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user,$inc_src );*/
								$mandatory_doc_count=$this->Customercrud_model->get_Mandatory_doc_count_for_employment($doc_type_user,$Documents->DOC_MASTER_TYPE,$inc_src);
								$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, $Documents->DOC_MASTER_TYPE);
								$Total_savedDocType=$Total_savedDocType+$savedDocType->doc_count;
								$Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
						}
					
				}
				
				
					
					else
					{
						//echo "hello1".'<br>';
						
						$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user,$Documents->DOC_MASTER_TYPE );
						$mandatory_doc_count=$this->Customercrud_model->get_Mandatory_doc_count($doc_type_user,$Documents->DOC_MASTER_TYPE );
						$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, $Documents->DOC_MASTER_TYPE);
						$Total_savedDocType=$Total_savedDocType+$savedDocType->doc_count;
						//echo $Total_savedDocType.'<br>';
						if($Documents->DOC_MASTER_TYPE=='Home Loans'||$Documents->DOC_MASTER_TYPE=='LAP'||$Documents->DOC_MASTER_TYPE=='Re-Finance'||$Documents->DOC_MASTER_TYPE=='Balance Transfer'|| $Documents->DOC_MASTER_TYPE=='House Construction On Self Own Plot'|| $Documents->DOC_MASTER_TYPE=='Home Improvement Loans')
						{
							$Total_mandatory_doc_count=$Total_mandatory_doc_count+0;
						}
						else
						{
							$Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
						}
						//$Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
						//echo $Documents->DOC_MASTER_TYPE.'<br>';
						
						
						
					}
					if($Total_mandatory_doc_count==$Total_savedDocType)
					{
						$data['doc_type'] = "";
						$data['doc_count'] =0;
						$data_doctype=array();
						$data['message'] = "Document uploaded sucessfully";
						$data['save'] = true;
					}
					else
					{
						
						if($savedDocType->doc_count==$mandatory_doc_count || $Documents->DOC_MASTER_TYPE=='Home Loans'||$Documents->DOC_MASTER_TYPE=='LAP'||$Documents->DOC_MASTER_TYPE=='Re-Finance'||$Documents->DOC_MASTER_TYPE=='Balance Transfer'|| $Documents->DOC_MASTER_TYPE=='House Construction On Self Own Plot'|| $Documents->DOC_MASTER_TYPE=='Home Improvement Loans'){
							//echo "hello2".'<br>';
							//$Total_savedDocType=$Total_savedDocType+$savedDocType;
							continue;
						}
						else
						{
						//echo "hello3".'<br>';
							//exit;
						$data['doc_type'] = $Documents->DOC_MASTER_TYPE;
						$data['doc_count'] = count($data_doctype);
						$data['message'] = "Upload  document for ".$Documents->DOC_MASTER_TYPE.'. '. $mandatory_doc_count .' Documents are mandatory';
						$data['save'] = false;
						//$data['doc_mandatory']=;
						break;
						}
					}
					
					
				}
		    
			$data['row']=$row;
			$data['age'] = $age;
			$data['error'] = '';
			$data['userType'] = $u_type;

			//print_r($data_row);
			
			$data['documents'] = $data_row;
			$data['documents_type'] = $data_doctype;
			$data['user_type'] = $inc_src;
			$this->load->view('header', $data);
			$data['error'] = $this->input->get('error');
			$this->session->set_flashdata('message',$data['message']);
			$this->load->view('customer/customerdocumentsnewcoapp', $data);
			
			/*echo'<pre>';
			print_r($Master_type_documen_customer);
			exit();*/
		}
		public function do_upload_coapplicant()
		{
			//$u_id = $this->input->post('coapp_id');
			echo $master_type = $this->input->post('master_type');
			$doc_mandatory=$this->input->post('doc_mandatory');
			$u_type = $this->session->userdata("USER_TYPE");
		    $id = $this->input->post("ID");

			//print_r($_REQUEST);

			//exit;
			
			if(empty($u_id))
			{
				$profile_data=$this->Customercrud_model->getProfileData($id);
			    $role=$this->input->post("role");
				
			}
			else
			{
				$role='';
			}
			
			
						$dir = $profile_data->ID."/";

			
			//if(!empty($u_id))$id = $u_id;
			
			
			$doc_type = $this->input->post('doc_type');
			$chk_res = $this->Customercrud_model->checkSavedDocument($id, $doc_type, $master_type);
			if($chk_res > 0){
				
				$error = "Document ".$doc_type." already saved by you.";
				/*if($role == 2)
							{
								redirect('customer/dsa_documents_upload?error='.$error, 'refresh');
							}
				 else if($role == 6)
							{
								redirect('customer/dsa_documents_upload?error='.$error, 'refresh');
							}*/
				/*if(empty($u_id))redirect('customer/customer_documents?UID='.$id.'&error='.$error, 'refresh');
				else redirect('customer/customer_documents?ID='.$id.'&error='.$error, 'refresh');*/
				redirect('customer/coapplicant_documents?UID='.$id.'&error='.$error, 'refresh');
			}else {
				$count = count($_FILES['userfile']['name']);
             
                 for($i=0;$i<$count;$i++)
				 {
				     //$file_name = $_FILES["userfile"]['name'][$i];
					//$file_name = time().".".pathinfo($file_name, PATHINFO_EXTENSION);
					//$file_name = str_replace(' ', '', $file_name);
					//$file_type = $_FILES["userfile"]['type'][$i];
					//$file_size = $_FILES["userfile"]['size'][$i];

/* code to export files to Nextcloud starts here */
						$time = time();

						$fileextensionarr = explode(".",$_FILES["userfile"]["name"][$i]);

						$fileextension = $fileextensionarr[1];
						
						$filename = $time.".".$fileextension;
						
						$dirname = "Finserv/customers/".$dir;

						$filenamewithdir = $dirname.$filename;

			  $correcturl = "curl -X PUT -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$filenamewithdir." -T ".$_FILES["userfile"]["tmp_name"][$i]."";

 exec($correcturl);
 /* code to upload file ends here */

					  $_FILES['file']['name'] = $_FILES['userfile']['name'][$i];
					  $_FILES['file']['name'] = $time.".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
					  $_FILES['file']['name'] = str_replace(' ', '', $_FILES['file']['name']);
					  $_FILES['file']['type'] = $_FILES['userfile']['type'][$i];
					  $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
					  $_FILES['file']['error'] = $_FILES['userfile']['error'][$i];
					  $_FILES['file']['size'] = $_FILES['userfile']['size'][$i];
						$config = array(
							'upload_path' => "./images/documents/",
							'allowed_types' => "gif|jpg|png|jpeg|pdf",
							'overwrite' => TRUE
						);

					$config['file_name'] = $_FILES['file']['name'];
					$config['image_type'] = $_FILES['file']['type'];
					$config['file_size'] = $_FILES['file']['size'];
					

					$this->upload->initialize($config);
					$upload_data = $this->upload->data();
					
					$file_input_arr = array(
						'USER_ID' => $id,
						'DOC_TYPE' => $doc_type,	
						'DOC_NAME' => $upload_data['file_name'],
						'DOC_SIZE' => $upload_data['file_size'],
						'DOC_FILE_TYPE' => $upload_data['image_type'],
						'DOC_MASTER_TYPE' => $master_type,
						'DOC_MANDATORY'=>$doc_mandatory,
						'doc_cloud_name' => $filename,
						'doc_cloud_dir' => $dirname
					);

				//	print_r($file_input_arr);
				//	exit;

				
			//	if($this->upload->do_upload('file'))
				if(true)
				{
						/*	   
								$this->Customercrud_model->saveDocuments($file_input_arr);
								 require_once('./fpdf/fpdf.php');
                                 require_once('./fpdi/src/autoload.php');
								 require_once('./fpdi/src/Fpdi.php');
						
								$data_row = $this->Customercrud_model->getDocuments($id);
								
								$pdf =new \setasign\Fpdi\Fpdi();
								foreach($data_row as $row)
								{ 
										$path = './images/documents/';
										$filename = $row->DOC_NAME;
										$url = $path.$filename;	
										if(substr($url, -4) == '.pdf')
										{
											
											

											$pageCount = $pdf->setSourceFile($url);
											
											for($j=1; $j<=$pageCount; $j++)
											{
												$pageId = $pdf->importPage($j,setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);
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
								
								}*/


								//echo "line 2793";
					//	exit();
							   
					             $this->Customercrud_model->saveDocuments($file_input_arr);
					             require_once('./fpdf/fpdf.php');
                                 require_once('./fpdi/src/autoload.php');
								 require_once('./fpdi/src/Fpdi.php');
								//$id = $this->session->userdata('ID');
								$data_row = $this->Customercrud_model->getDocuments($id);
								//$pdf = new FPDF('P', 'pt', 'Letter');
								//$pdf->addPage();
								/*$pdf =new \setasign\Fpdi\Fpdi();
								foreach($data_row as $row)
								{ 
										$path = './images/documents/';
										$filename = $row->DOC_NAME;
										$url = $path.$filename;	
										if(substr($url, -4) == '.pdf')
										{

											$pageCount = $pdf->setSourceFile($url);
											for($j=1; $j<=$pageCount; $j++)
											{
												$pageId = $pdf->importPage($j,setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);
												$pdf->addPage();
												$pdf->useImportedPage($pageId, 50, 50,100,100);
												
											
                                              
											}
						
										
										}
										else
										{
											 $pdf->addPage();
										     $pdf->Image($url);
									
										}
										
										
								}*/
								$directoryName="./images/all_document_pdf/";
								if(!is_dir($directoryName))
								{
							
								             mkdir($directoryName, 0755);
										//	file_put_contents($pdf->Output('$id.pdf','F'));
								}
								else
								{
									//echo "line 2859";
									//	exit();
									$dir='./images/all_document_pdf/';    
									$filename= "$id.pdf";                                      
									 if(file_exists($dir.$filename))
									 {
										// unlink($dir.$filename);
										//  $pdf ->Output($dir.$filename,'F');
									 }
									 else
									 {
									   //$pdf ->Output($dir.$filename,'F');
									 }
								
								}
					
				}
				else
				{
					$error = $this->upload->display_errors();
						/*
						if($role == 2)
								{
									redirect('customer/dsa_documents_upload?error='.$error, 'refresh');
								}
					 else if($role == 6)
								{
									redirect('customer/dsa_documents_upload?error='.$error, 'refresh');
								}
								*/
					/*if(empty($u_id))redirect('customer/customer_documents?ID='.$u_id.'&error='.$error, 'refresh');
					else redirect('customer/customer_documents?UID='.$id.'&error='.$error, 'refresh');*/
					redirect('customer/coapplicant_documents?UID='.$id.'&error='.$error, 'refresh');
				}
				
			}	
	
				
					            
								
                            					
                            
                             
							$no_of_doc_to_upload=$this->Customercrud_model->getDocuments_Type_customer();											
							$Uploded_Doc_Count=$this->Customercrud_model->getUploded_Documents_Type($id);
							/*if($Uploded_Doc_Count==$no_of_doc_to_upload)
							{
								$array_input_more = array(
									'UNIQUE_CODE' => $id,
									'PROFILE_PERCENTAGE'=>100
									);
					
					             $Result_id1 = $this->Customercrud_model->update_coapplicant($id, $array_input_more);
									}*/
							if($role == 2)
							{
								redirect('customer/dsa_documents_upload', 'refresh');
							}
							else if($role == 6)
							{
								redirect('customer/dsa_documents_upload', 'refresh');
							}
						/*if(!empty($u_id))redirect('customer/customer_documents?ID='.$u_id, 'refresh');
						else redirect('customer/customer_documents?UID='.$id, 'refresh');*/
						redirect('customer/coapplicant_documents?UID='.$id, 'refresh');
					 
				}
				 
				
		}
			
		//--------------------------------------------------------------- added by sonal 28-2-2022

		public function customer_view()
			  {
	
		$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
		if($Cust_consent_id=='')
		{
	       $Cust_consent_id  =$this->input->get('ID');
            }

		$cust_consent_status  =$this->session->userdata("cust_consent_status");
        $user_type_from_session=$this->session->userdata("user_type_from_session");
			$id=$Cust_consent_id;
            $data['id']=$id;
			$form_data =$this->Customercrud_model->find_customer_entry_id($id);
				$this->load->helper('url');
				$data['showNav'] = 1;
				$data['age'] = '';
				$data['error'] = '';
				$data['type'] =$form_data->LOAN_TYPE;
				$type =$form_data->LOAN_TYPE;
				if($type!='')
				$data['type'] = $type;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				$data['form_data']=$form_data;
	            $data['row_more']=$form_data;
	
				$this->load->view('header', $data);
				$this->load->view('customer/customer_view',$data);
				//exit;
		
		
		}
		  //================================== added by priyanka 11-04-2022
    public function send_internal_bureau_pdf($respnse,$coapp_id)
 {	    	
	 $coapp_info= $this->Customercrud_model->getProfileData_coapp($coapp_id);
	 $Coapp_email=$coapp_info->EMAIL;
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
 /*----------------------------- Addded by papiha on 13_05_2022--------------------------------------*/
 public function Payment_mode()
 {
		 $age = $this->session->userdata("AGE");
		 $id = $this->input->get("UID");
		 $Customer_data = $this->Dsacrud_model->getProfileData($id);
		 $bank_id=$this->Admin_model->Get_bank_id($id);
		 $login_fees=$this->Admin_model->Get_Login_fees($bank_id);
		 
		 $get_payment_deteils=$this->Admin_model->get_payment_deteils($id);
		 $RO=$this->Admin_model->get_all_RO();
		 $get_payment_deteils_offline=$this->Admin_model->get_payment_deteils_offline($id);
		 
		 if($login_fees['Login_fees_required']=='yes')
		 {
			 
		 if(!empty($get_payment_deteils))
		 {
			 if(count($get_payment_deteils)>0)
			 {
				 redirect('customer/applied_loans_list?UID='.$id);
			 }
			 else
			 {
				 $data_row = $this->Customercrud_model->getAppliedLoans($id);
				 $data['showNav'] = 1;
				 $data['age'] = $age;
				 $data['error'] = '';
				 $data['loans'] = $data_row;
				 $data['userType'] = $this->session->userdata("USER_TYPE");
				 $data['id']=$id;
				 $data['login_fees']=$login_fees['Login_fees'];
				 $data['RO']=$RO;
				 $this->load->view('header', $data);
				 $this->load->view('customer/Payment_mode');
			 }
		 }
		 else
		 {
			 if(!empty($get_payment_deteils_offline))
			 {
			 
				  if(count($get_payment_deteils_offline)>0)
				 {
					 redirect('customer/applied_loans_list?UID='.$id);
				 }
			 }
				 else
				 {
					 $data_row = $this->Customercrud_model->getAppliedLoans($id);
					 $data['showNav'] = 1;
					 $data['age'] = $age;
					 $data['error'] = '';
					 $data['loans'] = $data_row;
					 $data['userType'] = $this->session->userdata("USER_TYPE");
					 $data['id']=$id;
					 $data['login_fees']=$login_fees['Login_fees'];
					 $data['RO']=$RO;
					 $this->load->view('header', $data);
					 $this->load->view('customer/Payment_mode');
				 }
		 }
		 }
		 else
		 {
			 redirect('customer/applied_loans_list?UID='.$id);
		 }
	 
 
 }



	
		
		
	
	}