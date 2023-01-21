<?php
class Accountant extends CI_Controller {
	
	

    public function __construct() {
        parent:: __construct();
		
		$this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Admin_model');
		$this->load->model('Dsacrud_model');
		$this->load->model('Accountant_model');
       $this->load->model('credit_manager_user_model');
       $this->load->model('common_model','common');
        $this->load->library('email');
       $this->load->model('Operations_user_model');
        $this->load->model('Customercrud_model');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Sales_Manager_model');
        $this->load->library('upload');
		
		if($this->session->userdata('SITE') != 'finserv'){
				
            redirect(base_url('index.php/login'));
        }
	
	}
		public function online_payments()
 {
	 
	 //print_r($config);
	 //echo "Online payments";
	 
	  //$login_fees=$this->Admin_model->Get_Login_fees($bank_id);
	  
$id = $this->input->get("ID");
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				
				//print_r($data_row);
	  
		 
		 $get_payment_deteils=$this->Accountant_model->get_payment_deteils_online_all();
		 
		 	  
		 
		 //print_r($get_payment_deteils);
		
		$data['row'] = $data_row;
		
		$data['payments'] = $get_payment_deteils;
		
		//print_r($get_payment_deteils);
		
		
	 
		$this->load->view('dashboard_profile_header', $data);
		//echo 'Test';
	  
	  //exit;
	   $this->load->view('Accountant/online_payments', $data);

	 
 }
 public function UPI_payments()
 {
	 
	 //print_r($config);
	 //echo "Online payments";
	 
	  //$login_fees=$this->Admin_model->Get_Login_fees($bank_id);
	  
         $id = $this->input->get("ID");
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				
				//print_r($data_row);
	  
		 
		 $get_payment_deteils=$this->Accountant_model->get_payment_deteils_offline_all_UPI();
		 
		 	  
		 
		 //print_r($get_payment_deteils);
		
		$data['row'] = $data_row;
		
		$data['payments'] = $get_payment_deteils;
		
		//print_r($get_payment_deteils);
		
		
	 
		$this->load->view('dashboard_profile_header', $data);
		//echo 'Test';
	  
	  //exit;
	   $this->load->view('Accountant/offline_payments_UPI', $data);

	 
 }
	
		
		
	public function offline_payments()
 {
	// echo "Offline payments";
	//print_r($this->session);
	$id = $this->input->get("ID");
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
			//	print_r($id);
				
				$data_row = $this->Customercrud_model->getProfileData($id);
	  
	 
	 $get_payment_deteils=$this->Accountant_model->get_payment_deteils_offline_all();
		 
		 //print_r($get_payment_deteils);
		 
		 		$data['row'] = $data_row;

		 
		 $data['payments'] = $get_payment_deteils;
		 
		// print_r($data);
	 
	     $this->load->view('dashboard_profile_header', $data);
	 
	 	// $this->load->view('admin/admin_dashbord', $data);

	 	  $this->load->view('Accountant/offline_payments', $data);
		  
		  //$this->load->view('admin/offline_payments_fee', $data);

 }
 
 
 
 public function credit_bureau_branch_count()
 {
	 // $this->session->userdata('USER_TYPE');
	 
	 
	 /*		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'){
            redirect(base_url('index.php/admin'));
        }else{
			
			*/
			
			$id = $this->input->get("ID");
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				
				//print_r($data_row);
			
            $this->load->helper('url');
            $type = $this->input->get('type');

           // added by priya 23-04-2022
              $filter_branch_name = $this->input->get('B');
              $filter_Start_Date = $this->input->get('SD');
              $filter_End_Date = $this->input->get('ED');


            $age = $this->session->userdata('AGE');
			
			$data['row'] = $data_row;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
	
            $search_=$this->input->post('select_filters');
           // echo   $search_;
            //exit();

			if(isset($search_))
			{
            // echo   $search_;
            //exit();
				$filter='search';
				$search_name =$this->input->post('select_filters');	
			}
			else
			{
				$filter = '';
				$search_name="";
			}
			
			
			$data['row'] = $data_row;
			
			
            $customers = $this->Accountant_model->getCustomersList_count($filter_branch_name ,  $filter_Start_Date, $filter_End_Date);
            $data['idccr_users'] = $this->Accountant_model->get_idccr_users();
            //$this->load->view('header', $data);
            $data['customers'] = $customers;
            $this->load->view('dashboard_profile_header', $data);
            $this->load->view('Accountant/credit_bureau_branch_count', $data);
       // }
	 
 }
 
 public function Monthly_Billing()
 {
	 /* if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'){
            redirect(base_url('index.php/admin'));
        }
		else
		{
			*/
			
			$id = $this->input->get("ID");
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
								//print_r($data_row);
								
								//exit;

				
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s=='')
			{
				$s='all';
			}
     	    $data['Bank_names'] = $this->Admin_model->getcooperator_Banks();
			$data['row'] = $data_row;
           
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           
            $this->load->view('dashboard_profile_header', $data);
            $this->load->view('Accountant/calculate_billing', $data);   
			
       // }      
	 
 }
 public function get_cooperator_Loan_type()
	{
		$bank_id=$this->input->post('bank_id');
		 $Loan_types= $this->Admin_model->getcooperator_Loan_type($bank_id);
		 echo json_encode($Loan_types);
		//return $bank_id;
	}
 
 /*---------------------Added by papiha on 25_01_2022-------------------------------------------------------*/
	public function get_rate_of_intrest()
	{
		$bank_id=$this->input->post('Bank_name');
		$loan_type=$this->input->post('Loan_Type');
		$Rate_of_Intrest= $this->Accountant_model->get_rate_of_intrest($bank_id,$loan_type);
       
		$start_date=$this->input->post('Start_Date');
		$end_date=$this->input->post('End_Date');
		$get_Loan_disbured_customers=$this->Accountant_model->get_Loan_disbured_customers($bank_id,$loan_type);
       // echo'<pre>';
       // print_r($get_Loan_disbured_customers);
        //exit;
		$this->Amortization($get_Loan_disbured_customers,$Rate_of_Intrest,$start_date,$end_date);
		
		
	}
 
 
 public function One_Monthly_Billing()
 {
	 
	// print_r($this->session->userdata('USER_TYPE'));
	 
	 /* if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'){
            redirect(base_url('index.php/admin'));
        }
		else
		{
			*/
			
			$id = $this->input->get("ID");
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
			
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s=='')
			{
				$s='all';
			}
     	    $data['Bank_names'] = $this->Accountant_model->getcooperator_Banks();
			
           
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           
		   $data['row'] = $data_row;
		   
		   
            $this->load->view('dashboard_profile_header', $data);
			
			//print_r($this->session);
			
			//exit;
            $this->load->view('Accountant/one_time_calculate_billing', $data);   
			
       /* }   */   
	 
	 
 }
 
 
 public function get_insurance_amount()
	{
		
		$bank_id=$this->input->post('Bank_name');
		$loan_type=$this->input->post('Loan_Type');
        
		$calulate_amount =$this->Accountant_model->get_insurance_amount($bank_id,$loan_type);
		$start_date=$this->input->post('Start_Date');
		$end_date=$this->input->post('End_Date');
		$get_Loan_disbured_customers_one=$this->Accountant_model->get_Loan_disbured_customers_one($bank_id,$loan_type,$start_date,$end_date);
		$get_Loan_disbured_customers_one = json_decode(json_encode($get_Loan_disbured_customers_one), true);
		$customer_final=array();
		foreach($get_Loan_disbured_customers_one as $Customer)
				{
					//echo '<pre>';
					//print_r($data);
						$profile_info = $this->Dsacrud_model->getProfileData($Customer['Cust_Id']);
						//$data['Customer_name']=
						//foreach($Customer as $row)
						//{
							//$final_customer
						//}	
						
						$data['customer_name']=$profile_info->FN.' '.$profile_info->LN;
						$data['Loan_Type']=$Customer['Loan_Type'];
						$data['Loan_Amount_Saction']=$Customer['Loan_Amount_Saction'];
						$data['Processing_Fees']=$Customer['Processing_Fees'];
					    $data['Insurance_Amount']=$Customer['Insurance_Amount'];
						array_push($customer_final,$data);
						
					
				}
				
				
		
		$details_array['array_intrest_final']=$customer_final;
	    $details_array['Processing_Fees']=$calulate_amount->Processing_Fees;
		$details_array['Insurance_Amount']=$calulate_amount->Insurance_Amount;
		$_SESSION["data_for_excel"] =$details_array;
		
		$this->load->view('Accountant/one_time_billing_details',$details_array);
	}
	
	public function credit_bureau_reports(){
              
       /* if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'){
            redirect(base_url('index.php/admin'));
        }else{ */
            $this->load->helper('url');
            $type = $this->input->get('type');

           // added by priya 23-04-2022
              $filter_branch_name = $this->input->get('B');
              $filter_Start_Date = $this->input->get('SD');
              $filter_End_Date = $this->input->get('ED');


            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
	
            $search_=$this->input->post('select_filters');
           // echo   $search_;
            //exit();

			if(isset($search_))
			{
            // echo   $search_;
            //exit();
				$filter='search';
				$search_name =$this->input->post('select_filters');	
			}
			else
			{
				$filter = '';
				$search_name="";
			}
			
			//echo "TEST";
			
			//exit;
            $customers = $this->Admin_model->getCustomersList($filter,$search_name,   $filter_branch_name ,  $filter_Start_Date, $filter_End_Date);
            $data['idccr_users'] = $this->Admin_model->get_idccr_users();
            //$this->load->view('header', $data);
            $data['customers'] = $customers;
            $this->load->view('dashboard_profile_header', $data);
            $this->load->view('Accountant/show_credit_bureau_reports', $data);
        // }
    }

 
 public function Amortization($get_Loan_disbured_customers,$Rate_of_Intrest,$start_date,$end_date)
	{
		$array_intrest_final=array();
	    include "class.amort.php";
        //echo'<pre>';
        // print_r($get_Loan_disbured_customers);
        // exit;
        $i=1;
		Foreach($get_Loan_disbured_customers as $Customer)
		{
            //echo'<pre>';
          //print_r($Customer);
		  //echo exit;
			$sanction_amount = 0;
			    $amount= $Customer->Loan_Amount_Disbursed;
				$rate=$Customer->Rate_Of_Intrest;
				$years=$Customer->Tenure;
				$monthly_emi_date=$Customer->EMI_Start_Date;
				$start_date=$start_date;
				$end_date=$end_date;
				$profile_info = $this->Dsacrud_model->getProfileData($Customer->Cust_Id);
				$date=date_create($monthly_emi_date);
				date_format($date,"d-m-Y");
                if($Customer->Loan_Amount_Disbursed == $Customer->Loan_Amount_Saction )
				{
					$am=new amort($sanction_amount,$amount,$rate,$years,$monthly_emi_date);
					$array_intrest=$am->Get_Monthly_EMI($start_date,$end_date);
				}
				else
				{
					$am=new amort($sanction_amount,$amount,$rate,$years,$monthly_emi_date);
					$array_intrest=$am->Get_Monthly_EMI_Past($Customer,$start_date,$end_date);
					
				}
               // echo $i;
				
				$Rate_of_Intrest=$this->Admin_model->get_rate_of_intrest($Customer->Name_Of_Bank,$Customer->Loan_Type);
				$Rate_of_Intrest=floatval($Rate_of_Intrest);
				foreach($array_intrest as $data)
				{
					//echo '<pre>';
					//print_r($data);
					   if(!empty($profile_info->FN))
                       {
                           $FN=$profile_info->FN;
                       }
                       else{
                        $FN="";
                       }
                       if(!empty($profile_info->LN))
                       {
                           $LN=$profile_info->LN;
                       }
                       else{
                        $LN="";
                       }
						$data['Customer_name']=$FN.' '.$LN; 
						$them= floatval($data['Interest_Payment'])*$Rate_of_Intrest/100;
						//$profit=$data['Interest_Payment']*$Rate_of_Intrest/$rate;
						//echo $rate.'<br>';
						//echo $Rate_of_Intrest.'<br>';
						$profit=floatval( $data['Interest_Payment'])*($rate-$Rate_of_Intrest)/$rate;
						$data['Profit']=$profit;
						$GST_Amount=$profit*18/100;
						$data['GST_Amount']=$GST_Amount;
                        $data['Rate_Of_Intrest']=$rate;
						$data['Tenure']=$years;
						array_push($array_intrest_final,$data);
					
				}
				
				
				//print_r($array_intrest_final);
                //$i++;
		}
        
	    $_SESSION["data_for_excel"] =$array_intrest_final;
		$data['array_intrest_final']=$array_intrest_final;
		$this->load->view('Accountant/Billing_details',$data);
		//$this->showtable($array_intrest_final);
	}
 
 public function get_rate_of_intrest2()
	{
		$bank_id=$this->input->post('Bank_name');
		$loan_type=$this->input->post('Loan_Type');
		$Rate_of_Intrest= $this->Admin_model->get_rate_of_intrest($bank_id,$loan_type);
       
		$start_date=$this->input->post('Start_Date');
		$end_date=$this->input->post('End_Date');
		$get_Loan_disbured_customers=$this->Admin_model->get_Loan_disbured_customers($bank_id,$loan_type);
       // echo'<pre>';
       // print_r($get_Loan_disbured_customers);
        //exit;
		$this->Amortization($get_Loan_disbured_customers,$Rate_of_Intrest,$start_date,$end_date);
		
		
	}
	public function update_paymnet_recevied()
    {
   
                // echo "edit";exit();
                $CUST_ID= $this->input->post('cust_id');
                $array_input = array(
                    
              		'Payment_Recived_date' =>$this->input->post('Payment_Recived_date')
                    );
					$array_input3 = array(
								'Sub_Stage'=>"Login Fee Received",
				                );
			        $updated_id = $this->Customercrud_model->update_profile($CUST_ID,$array_input3);
                    $idS = $this->Admin_model->Update_payment_recived_date($array_input,$CUST_ID);
					
					$data_applicant_row = $this->Customercrud_model->getProfileData($CUST_ID);
					$datarow = $this->Customercrud_model->getCustomerId($CUST_ID);

					//print_r($datarow);
					
					//exit;
					$fee = 5900;
					
					$appnumber = $CUST_ID;
					
					$date = $this->input->post('Payment_Recived_date');
					
					$date=date_create($date);
					
					$date = date_format($date,"j F Y");
					
					$subject = "Payment received";
					
					 $message = "Dear ".$data_applicant_row->FN.", <br> <br> We have received payment of Rs ".$fee." as login fees towards your application no ".$datarow->Application_id." with Finaleap Finserv on ".$date." <br><br>Thanks and Regards, <br> Finaleap Finserv Private Limited";
					
					
					//exit;
					
					$toemail = "jaykumar.nimbalkar@gmail.com";
					
					$toemail = $data_applicant_row->EMAIL;
					
					$this->sendEmail($toemail,$subject,$message);
					
					$smstemplate = "Dear Customer, We have received payment of Rs 5900 as login fees towards your application no ".$datarow->Application_id." with Finaleap Finserv on ".$date."";
					//echo "TEST ";
										$mobilenumber = $data_applicant_row->MOBILE;
					$output = $this->sendsms($mobilenumber,$smstemplate);
					//echo $output;
					//exit;
                    if($idS > 0){   
                        $this->session->set_flashdata("result", 3);
                        //$this->offline_payments();
						redirect(base_url('/index.php/accountant/offline_payments'));
                    }else {
                        $this->session->set_flashdata("result",0 );
                        //$this->offline_payments();
						redirect(base_url('/index.php/accountant/accountant/offline_payments'));
                    }
            
    }	
	
	public function sendEmail($email, $subject, $message){
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
		//$config['mailtype'] = 'text';
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$from_email = FROM_EMAIL;
		$this->email->from($from_email, 'Finaleap'); 
		$this->email->to('suhani.dhokret@finaleap.com');
		//$this->email->bcc('customercare@finaleap.com');
		
		//$this->email->cc('accounts@finaleap.com');
		$this->email->subject($subject); 
		
		// echo "BCC";
		
		$this->email->message($message); 
				
		//Send mail 
		if($this->email->send()) {	
			
		}else{
			
		}
		
		
		
	}
	
	
	public function sendsms($mobileno,$message){

        //$id = $this->input->get("ID");
        //echo $id;
        //exit();
	    //$mobileno="9325983064";
        //$mobileno=$data['mobileno']; 
        $OTP=rand(1000,10000);
		 $this->session->set_tempdata('OTP', $OTP, 600);
		 $var="FINPL000255";
        // $message='Your one time login password for Finaleap is '.$OTP.'. This password will be valid for 10 min';
        //$message='Dear Customer, \nThank you for choosing FINALEAP. We regret to Inform that Your Loan Application No'.$OTP.' is rejected based on Current Assessment';
         $message = urlencode($message);
         $sender = 'FNLPFN'; 
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
        
        $response = array
        ( 'msg'=>'fail',
        );
		echo json_encode($response);
    }
	else
	{
        echo $response ;
		$response = array
        ( 'msg'=>'sucess',
        );
		echo json_encode($response);
	}
    
    }
		
	function find_my_bank_statement()
	{
		$Entry_ID= $this->input->post('Entry_ID');
        $find_cust_id = $this->Admin_model->find_cust_id($Entry_ID);
		//print_r($find_cust_id );
		$find_my_bank_statement_documents = $this->Admin_model->find_info_bank_statement($find_cust_id->Cust_id);
		//print_r($find_my_bank_statement_documents );
		if(!empty($find_my_bank_statement_documents))
		{
			$doc='<a href="'.base_url().'index.php/customer/view_cloud_file/'.$find_my_bank_statement_documents->ID.'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
		}
		else
		{
			$doc='<a ><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
		}
		$response = array
        ( 'msg'=>'sucess',
		  'data'=> $find_cust_id,
		  'doc'=>$doc
        );
		echo json_encode($response);
	}
	
}
?>