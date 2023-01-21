<?php
date_default_timezone_set('asia/kolkata');
defined('BASEPATH') OR exit('No direct script access allowed');

class Legal extends CI_Controller 
    {

		public function __construct() {
			parent:: __construct();

			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('Admin_model');
			$this->load->model('Dsacrud_model');
			$this->load->model('Customercrud_model');
			$this->load->model('credit_manager_user_model');
			$this->load->model('common_model','common');
			$this->load->library('email');
			$this->load->model('Operations_user_model');
			$this->load->model('Dsacustomers_model');
			$this->load->helper(array('form', 'url'));
            $this->load->model('Legal_model');
			$this->load->library('upload');
		}

		public function index(){
			if($this->session->userdata("USER_TYPE") == ''){
                $data['showNav'] = 0;
                $data['error'] = '';
                $data['userType'] = "none";
                $this->load->view('header', $data);
                $this->load->view('login');
            }else{
                if($this->session->userdata('login_count')==0)
                {
                    $this->session->set_flashdata('sucess','sucess');
                    redirect('dsa/reset_password');
                }
                $id = $this->session->userdata('ID');
                $data['row']=$this->Customercrud_model->getProfileData($id);
                $this->load->helper('url');
                $age = $this->session->userdata('AGE');
                $data['showNav'] = 1;
                $data['age'] = $age;
                $data['userType'] = $this->session->userdata("USER_TYPE");
                //$this->load->view('header', $data);
                $id = $this->session->userdata('ID');
                //=====================added by priyanka===============
                $user_info= $this->Operations_user_model->getProfileData($id);
                 if(!empty($user_info))
                 {
                     if($user_info->MN!='')
                     {
                         $user_name=$user_info->FN." ".$user_info->LN;
                     }
                     else
                     {
                         $user_name=$user_info->FN." ".$user_info->LN;
                     }
                 }
                 else
                 {
                     $user_name='';
                 }
                $data['username'] =$user_name;
                // ==========================================================
                $dashboard_data = $this->Legal_model->getDashboardData($id);    
                
            
                $data['dashboard_data'] = $dashboard_data;
                $this->load->view('dashboard_header', $data);
                $this->load->view('Legal/dashboard', $data); 
                //$this->load->view('footer');
            }
		}
	public function customers()
	{
		
			if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER'){
				redirect(base_url('index.php/login'));
			}else{
				$id = $this->input->get('id');
				if($id == '')$id = $this->session->userdata('ID');
				$userType = $this->input->get('userType');
				$date = $this->input->get('date');
				$userType2 = $this->input->get('userType2');
				if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
				$filter = $this->input->get('s');
				if($filter=='')
				{
					$filter='all';
				}
				

				$this->load->helper('url');
				$this->load->model('Dsacustomers_model');
				//$customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
				//$_SESSION["data_for_excel"] =   $customers ;
				$age = $this->session->userdata('AGE');
				$data['showNav'] = 1;
				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");          
				//$this->load->view('header', $data);
				 $user_info= $this->Operations_user_model->getProfileData($id);
					 if(!empty($user_info))
					 {
						 if($user_info->MN!='')
						 {
							 $user_name=$user_info->FN." ".$user_info->LN;
						 }
						 else
						 {
							 $user_name=$user_info->FN." ".$user_info->LN;
						 }
					 }
					 else
					 {
						 $user_name='';
					 }
				$data['row']=$this->Customercrud_model->getProfileData($id);
				$data['username'] =$user_name;
				$arr['userType'] = $userType;
				//$arr['customers'] = $customers;
			
				$arr['s'] = $filter;
				$this->load->view('dashboard_header', $data);
				$this->load->view('Legal/customers', $arr);
			}
		}
		/*--------------------------------------- Added by papiha on 16-03-2022------------------------------------------*/
		public function View_Details_Customer()
		{
			 $USER_TYPE = $this->session->userdata("USER_TYPE");
			 $Application_id=$this->input->get('x');
			 $id = base64_decode($Application_id);
		
			 $uid = $this->session->userdata('ID');
			 $this->load->helper('url');
			 $data['userType'] = $this->session->userdata("USER_TYPE");
			   $data_row = $this->credit_manager_user_model->getDocuments_send_to_legal_by_CPA($id,'legal');
                $age = $this->session->userdata('AGE');
                $data['showNav'] = 1;
                $data['age'] = $age;
                $data['userType'] = $this->session->userdata("USER_TYPE");
                //$this->load->view('header', $data);
               $USER_TYPE = $this->session->userdata("USER_TYPE");
                $user_info= $this->Operations_user_model->getProfileData($uid);
                     if(!empty($user_info))
                     {
                         if($user_info->MN!='')
                         {
                             $user_name=$user_info->FN." ".$user_info->LN;
                         }
                         else
                         {
                             $user_name=$user_info->FN." ".$user_info->LN;
                         }
                     }
                     else
                     {
                         $user_name='';
                     }
                    $data['username'] =$user_name;
    
                $data['row']=$this->Customercrud_model->getProfileData($uid);
                //$dashboard_data = $this->Dsacrud_model->getDashboardData($id);  
				
                $data['USER_TYPE']=$USER_TYPE;
                $data['cust_info']=$this->Legal_model->getProfileData($id);
				$find_coapplicants =$this->Dsacustomers_model->getCustomers_coapplicants($data['cust_info']->UNIQUE_CODE);
			
				$data['coapplicants']=$find_coapplicants ;
				$data['Legal_docs_info']=$this->Legal_model->get_legal_docs($data['cust_info']->Application_id);
				$data['documents']=$data_row;
                $data ['Legals']=$this->Legal_model->getLegals();
                $this->load->view('dashboard_header', $data);
                $this->load->view('Legal/view_details_customer', $data);
		}
		public function Upload_Legal_doc()
		{
			 $id = $this->input->get('ID');
			 $uid = $this->session->userdata('ID');
			 $this->load->helper('url');
                $age = $this->session->userdata('AGE');
                $data['showNav'] = 1;
                $data['age'] = $age;
                $data['userType'] = $this->session->userdata("USER_TYPE");
                //$this->load->view('header', $data);
              
                $user_info= $this->Operations_user_model->getProfileData($uid);
                     if(!empty($user_info))
                     {
                         if($user_info->MN!='')
                         {
                             $user_name=$user_info->FN." ".$user_info->LN;
                         }
                         else
                         {
                             $user_name=$user_info->FN." ".$user_info->LN;
                         }
                     }
                     else
                     {
                         $user_name='';
                     }
                    $data['username'] =$user_name;
    
                $data['row']=$this->Customercrud_model->getProfileData($uid);
				$data['Applicant_data']=$this->Legal_model->get_legal_docs($id);
				$this->load->view('dashboard_header', $data);
                $this->load->view('Legal/Upload_Legal_doc', $data);
		
		}
		
    
	/*------------------------------------------ Added by papiha on 23_03_2022-----------------------------------------------------------*/
	
		public function get_legal_by_bank()
		{
			$bank_id=$this->input->post('bank_id');
			$Legal_names=$this->Legal_model->get_legal_by_bank($bank_id);
			echo json_encode($Legal_names); 
		}
		public function get_coorporate_data()
		{
			$bank_id=$this->input->post('bank_id');
			$corporate_data=$this->Legal_model->corporate_data($bank_id);
			echo json_encode($corporate_data); 
		}
	 
		public function Send_Documents()
		{
			$Application_id=base64_decode($this->input->get('x'));
			$uid=base64_decode($this->input->get('y'));
		   $data['cust_info']=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		   
			$USER_TYPE = $this->session->userdata("USER_TYPE");
			$ID=$this->session->userdata('ID');
			$data_row = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,$USER_TYPE,'CPA');
			$this->load->helper('url');
			   $age = $this->session->userdata('AGE');
			   $data['showNav'] = 1;
			   $data['age'] = $age;
			   $data['userType'] = $this->session->userdata("USER_TYPE");
			   //$this->load->view('header', $data);
			 
			   $user_info= $this->Operations_user_model->getProfileData($ID);
					if(!empty($user_info))
					{
						if($user_info->MN!='')
						{
							$user_name=$user_info->FN." ".$user_info->LN;
						}
						else
						{
							$user_name=$user_info->FN." ".$user_info->LN;
						}
					}
					else
					{
						$user_name='';
					}
				   $data['username'] =$user_name;
   
			   $data['row']=$this->Customercrud_model->getProfileData($ID);
			   $data['documents']= $data_row ;
			   
			   $data['Applicant_data']=$this->Legal_model->get_legal_docs($Application_id);
			   
			   $this->load->view('dashboard_header', $data);
			   $this->load->view('Legal/send_documents', $data);
		}
		
	public function Legal_remark()
	{
		
		$id = $this->input->post("id");
		$Legal_id = $this->session->userdata('ID');
		$Credit_id = $this->input->post("Credit_id");
		$UNIQUE_CODE = $this->input->post("UNIQUE_CODE");
		$USER_TYPE = $this->session->userdata("USER_TYPE");
		$cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($id);
		$row=$this->Customercrud_model->getProfileData($UNIQUE_CODE);
		$additional_emi_comments3=$this->input->post('additional_emi_comments_3');
		if(!empty(  $additional_emi_comments3))
		{
		 $count = count($additional_emi_comments3);
		 $submitted_before_first_disbursement=array();
		 for($i=0; $i<$count; $i++)
			 {
				 if(!empty($additional_emi_comments3[$i]))
				 {
					 array_push($submitted_before_first_disbursement, array(
								 'additional_comments'=>$additional_emi_comments3[$i],
								 ));	
				 }
			 }
			 $additional_comments =json_encode($submitted_before_first_disbursement);
		 }
		 else
		 {
				 $additional_comments ='';
		 }
			 
		 $data_doc['additional_comments']=$additional_comments;
		
				
					$data_doc['Legal_remark']=$this->input->post("remark");
					$data_doc['Legal_status']='Document Received From Legal';
					$data_doc['last_updated_by_Legal']=date("d-m-Y h:i:sa");
					
					$notification_data=['user_id'=>$Credit_id,'notification'=>'Document Received From Legal :'.$row->FN.' '.$row->LN,'status'=>'unseen'];
						  $notification=$this->Admin_model->insert_notification($notification_data);
				
		
		//$result_doc1=$this->credit_manager_user_model->Update_Legal_status($UNIQUE_CODE,$data_status);
		$result_docs = $this->credit_manager_user_model->Update_Legal_details($id,$data_doc);
		if($result_docs>0)
		{
			
		
		$this->session->set_userdata("result1", 1);
		}
			   $user_info=$this->Customercrud_model->getProfileData($Legal_id);
			  
	
				$this->sendEmail_all_Document_Recived_Legal($user_info,$cust_info,$id);
		
		/*---------------------------------------------------------------------------------------------*/
		redirect('Legal/Send_Documents?x='.base64_encode($id).'&y='.base64_encode($UNIQUE_CODE));
		
	}
		/*--------------------------------- Addded by papiha on 03_05_2022--------------------------------------------------------*/
		public function sendEmail_all_Document_Recived_Technical($Legal_info,$cust_info,$send_to_emails,$Application_ID)
	  {
		 //echo $Application_ID;
		 //$row=$this->Customercrud_model->getProfileData($uid);
		 //$cust_info=$this->Customercrud_model->getProfileData($Application_ID);
		 //$cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_ID);
		 $Appication_info=$this->Legal_model->get_legal_docs($Application_ID);
		 $config['protocol']=PROTOCOL;
            $config['smtp_host']=SMTP_HOST; 
            $config['smtp_port']=SMTP_PORT; 
            $config['smtp_timeout']=SMTP_TIMEOUT;
            $config['smtp_crypto']=SMTP_CRYPTO; 
            //$config['smtp_user']='info@finaleap.com';
            //$config['smtp_pass']='skP37cnpCIq0';
            //$config['smtp_user']='flconnect@finaleap.com';
            //$config['smtp_pass']='iNF0SYS@589';
            //$from = 'flconnect@finaleap.com';
            $config['smtp_user']=SMTP_USER; 
            $config['smtp_pass']=SMTP_PASS;
            $from_email = FROM_EMAIL; 
            $config['charset']=CHARSET;
            $config['newline']=NEWLINE;
            $config['wordwrap'] = WORDWRAP2;
            $config['mailtype'] = MAILTYPE;
		 $this->email->initialize($config);
		 $this->email->set_newline("\r\n");
		 //$code = $this->generate_uuid();
		// $from_email = "info@finaleap.com";
		 $this->email->from($from_email, 'Finaleap'); 

		 
			 $send_email_to_support=$send_to_emails;
			 //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
		 
			 //$send_email_to_support='info@finaleap.com';
			 $this->email->to($send_email_to_support);
			// $this->email->subject('Customer '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).' Send To Legal'); 
		    // $this->email->subject('Legal Document Received For Customer '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
		     $this->email->subject($Application_ID.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'---- TECHNICAL REPORT'); 
		 
		 $z=1;
		 $msg=
		 '<!DOCTYPE html>
			<html lang="en">
			<head>
			  <title>Bootstrap Example</title>
			  <meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
			  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
			  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
			  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
			</head>
			<style>
			table,td,th{
				border:1px solid black;
				border-collapse:collapse;
			}
			body {
				font-family: Arial, sans-serif;
				}
			</style>
			<body>
			<p style="font-size:12px;">Dear Sir / Ma’am,</p>
			<p style="font-size:12px;"> Kindly note that Technical Report for Mr/Mrs. <b>'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'</b> has been published on our portal under the section Customers > Vendors Report >  </p>
			<p style="font-size:12px;"> We request you to review and check all the details in the Report.</p>
			<p style="font-size:12px;">In case of any discrepancies in the report you can revert back to us within 1 / 2  working days </p>
			<p style="font-size:12px;">Looking forward to a continued association with us.</p>
			<p style="font-size:10px;">*Please do not reply to this mail.</p>';

			
			
		   
			
		
		$msg.='
			   </div>
				
				<p style="font-size:12px;">Thanks & Regards,</p>
				<p style="font-size:12px;">'.strtoupper($Legal_info->FN).' '.strtoupper($Legal_info->FN).' </p>
				</body>
				</html>';
		 
		$this->email->message($msg);
			 
		 //	$this->email->message('Dear Team ,'."\r\n\n".'Following application is accepted by - '.$HR_name."\r\n".'Name		:'.$name."\r\n".'Applied for	:'.$applied_for."\r\n".'Email ID	:'.$email."\r\n".'Mobile		:'.$mobile."\r\n".'Total Experience	:'.$total_experience."\r\n".'Applied on		:'.$date."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
			 $this->email->send();
			 
		 
	}
	/*----------------- added by papiha on 28_07_2022--------------------------------------*/
	public function get_FI_by_bank()
		{
			$bank_id=$this->input->post('bank_id');
			$Legal_names=$this->Legal_model->get_FI_by_bank($bank_id);
			echo json_encode($Legal_names); 
		}
   	/*----------------- added by papiha on 08_08_2022--------------------------------------*/
	public function get_RCU_by_bank()
	{
		$bank_id=$this->input->post('bank_id');
		$Legal_names=$this->Legal_model->get_RCU_by_bank($bank_id);
		echo json_encode($Legal_names); 
	}
	/*------------------------------- added by papiha on 08_08_2022 for Legal <Flow------------------------------------------------*/
	public function customers_PG()
    {
        
        $id = $this->input->get('id');
        if($id == '')$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');

        $date = $this->input->get('date');
        $userType2 = $this->input->get('userType2');
        if ($userType == '')$userType = $this->session->userdata("USER_TYPE");

        # Read value
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; // Rows display per page
        $columnIndex = $_POST['order'][0]['column']; // Column index
       
        $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
        
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        $searchValue = $_POST['search']['value']; // Search value
        ## Search
        $searchQuery = " ";
        ## Total number of records without filtering
        $sel = $this->Dsacustomers_model->getALLCustomers_Legal($id,$userType);
       // $sel=$this->Admin_model->Get_Total_No_Customer();
        $totalRecords =$sel;
        ## Total number of records with filtering
        $sel=$this->Dsacustomers_model->Get_ALLCustomer_Filter_Legal($id,$searchValue);
        $totalRecordwithFilter =$sel;
        ## Fetch records
        $sel=$this->Dsacustomers_model->Get_ALLCustomer_With_Page_Legal($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
        $empRecords = $sel;
        $data = array();

        foreach($empRecords as $row){
			if ($row->Legal_status=='Accepted from Finaleap') {
				                                                $view='<a href=""  class="btn modal_test"><i class="fa fa-paper-plane text-center" style="color:gray;"></i></a>';
																$document='<a href=""  class="btn modal_test"><i class="fa fa-envelope text-center" style="color:gray;"></i></a>';
			                                                   }
															else{ $view='<a href="'. base_url().'index.php/Legal/View_Details_Customer?x='.base64_encode($row->Application_id).'"  class="btn modal_test"><i class="fa fa-paper-plane text-center" style="color:blue;"></i></a>';
																$document='<a href="'.base_url().'index.php/Legal/Send_Documents?x='.base64_encode($row->Application_id).' &y='. base64_encode($row->UNIQUE_CODE).'"  class="btn modal_test"><i class="fa fa-envelope text-center" style="color:blue;"></i></a>';
															}
           

            $data[] = array(
                    "ID"=>$row->ID,
                    "FN"=>$row->Application_id,
                    "Customer_status"=>$row->FN." ".$row->LN,
                    "Application_Status"=>$row->EMAIL,
                    "Loan_Type"=>$row->MOBILE,
                    "Referred_by"=>$row->loan_type,
                    "Created_on"=>$row->Legal_status,
                    "Last_updated_on"=>$row->Legal_remark,
                    "UNIQUE_CODE"=>$view,
                    "Bureau_reports"=>$document,
                    
                );
        }
        $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
        );
        echo json_encode($response);
        //please comment previous data 
    }
	/*----------------------------- added by papiha on 08_08_2022-------------------------------------------------------------*/
	function Revert_customer()
	{   
	    $USER_TYPE=$this->session->userdata('USER_TYPE');
		
		$Application_ID = $this->input->post('Application_id');
		
		$Credit_id=$this->input->post('credit_id');
		$Legal_name=$this->input->post('User_name');
		$Cust_id=$this->input->post('id');
	
		$cust_name=$this->input->post("name");
		$cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_ID);
		
			
		
		
			$data_doc = array(
						'Legal_status' => 'Revert From Legal',
						'Legal_comment'=>$this->input->post('Comment'),
						
						 );
	       
		
		    $row=$this->Customercrud_model->getProfileData($Credit_id);
		    $notification_data=['user_id'=>$row->UNIQUE_CODE,'notification'=>'Customer Revert From Legal:'.$cust_name,'status'=>'unseen'];
			$notification=$this->Admin_model->insert_notification($notification_data);	
			
		  $result_docs = $this->credit_manager_user_model->Update_Legal_details($Application_ID,$data_doc);
	
			
			$this->SendEmail_to_team_revert_Legal($Application_ID,$cust_info);
			
		/*-------------------------- ----------------------------------------------------------------*/
		        
		
		if($result_docs > 0)
		{   
			echo json_encode(1);
		 }
		 else {
			echo json_encode(0);
		   
		}
						
				
	}
	public Function SendEmail_to_team_revert_Legal($Application_id,$cust_info)
	  {
		  
		
		$Eamils=array();
		$Appication_info=$this->Legal_model->get_Legal_docs($Application_id);
		
		
		$Operation_details=$this->Customercrud_model->getProfileData($Appication_info->credit_manager_id);
		if(!empty($Operation_details))
		{
			array_push($Eamils,$Operation_details->EMAIL);
		}
		if(!empty($cust_info->RO_ID))
		{
			$sourcing_employee_id=$cust_info->RO_ID;
			
		}
		else  if(!empty($cust_info->BM_ID))
		{
			$sourcing_employee_id=$cust_info->BM_ID;
		}
		else  if(!empty($cust_info->SELES_ID_ID))
		{
			$sourcing_employee_id=$cust_info->BM_ID;
		}
		
		$sourcing_employee_details=$this->Customercrud_model->getProfileData($sourcing_employee_id);
		if(!empty($sourcing_employee_details))
		{
			array_push($Eamils,$sourcing_employee_details->EMAIL);
		}
		
			if($sourcing_employee_details->ROLE=='14')
			{
				$BM_ID=$sourcing_employee_details->BM_ID;
				
			}
			else if($sourcing_employee_details->ROLE=='21')
			{
				$BM_ID=$sourcing_employee_details->BM_ID;
			}
			else{
				$BM_ID=$sourcing_employee_id;
			}
		
		$BM_details=$this->Customercrud_model->getProfileData($BM_ID);
		if(!empty($BM_details))
		{
			array_push($Eamils,$BM_details->EMAIL);
		}
		$Cluster_ID=$BM_details->CM_ID;
		$Cluster_details=$this->Customercrud_model->getProfileData($Cluster_ID);
		if(!empty($Cluster_details))
		{
			array_push($Eamils,$Cluster_details->EMAIL);
		}
		$RM_ID=$Cluster_details->RM_ID;
		$RM_Details=$this->Customercrud_model->getProfileData($RM_ID);
		if(!empty($RM_Details))
		{
			array_push($Eamils,$RM_Details->EMAIL);
		}
		
		//$get_credit=$this->Operations_user_model->getcredit_by_location($cust_info->Location);
		$get_cluster=$this->Operations_user_model->getcluster_by_location($cust_info->Location);
		//$get_cpa=$this->Operations_user_model->getcpa_by_location($cust_info->Location);
		//$cpas=json_decode( json_encode($get_cpa), true);
		$clusters = json_decode( json_encode($get_cluster), true);
		//$credits= json_decode( json_encode($get_credit), true);
		
	  /* if(!empty($credits))
	   {
		$EamilString='';
		foreach($credits as $credit)
		{
			
			
			array_push($Eamils,$credit['EMAIL']);
			
		}*/
	 
		if(!empty($Eamils))
		{
			$send_to_emails= implode(",",$Eamils);
		}
		else
		{
			$send_to_emails='';
		}
		
	    //$send_to_emails=$send_to_emails.',sachin.kardile@finaleap.com,sunil.kalan@finaleap.com,rupali.more@finaleap.com';
	//$send_to_emails='papiha.patil@finaleap.com';
	$send_to_emails=$send_to_emails.',sachin.kardile@finaleap.com,credit@fianleap.com,operations@finaleap.com';
	
			$Appication_info=$this->Legal_model->get_legal_docs($Application_id);
			$config['protocol']=PROTOCOL;
				$config['smtp_host']=SMTP_HOST; 
				$config['smtp_port']=SMTP_PORT; 
				$config['smtp_timeout']=SMTP_TIMEOUT;
				$config['smtp_crypto']=SMTP_CRYPTO; 
				$config['smtp_user']=SMTP_USER; 
				$config['smtp_pass']=SMTP_PASS;
				$from_email = FROM_EMAIL; 
				$config['charset']=CHARSET;
				$config['newline']=NEWLINE;
				$config['wordwrap'] = WORDWRAP2;
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			//$code = $this->generate_uuid();
			$this->email->from($from_email, 'Finaleap'); 
			$send_to_emails=$send_to_emails;
			$send_email_to_support=$send_to_emails;
			//$send_email_to_support='patilpapiha@gmail.com';
			$this->email->to($send_email_to_support);
			
			$this->email->subject('Alert : Query Raised ---- Legal Report  ----'.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN));
			$data['cust_info']=$cust_info;
			$mailContent = $this->load->view('templates/Legal_revert_to_Team',$data,true);
			$this->email->message($mailContent); 
			if($this->email->Send())
			{
				
			}
			else{
				echo $this->email->print_debugger();
			}
		}
		function do_upload_Legal_doc_Legal()
		{
			
				$Application_id = $this->input->post('Application_Id');
				$unique_code=$this->input->post('unique_code');
				$Doc_type = $this->input->post('Legal_doc');
				$form_id = $this->input->post('form_id');
				//$_SESSION['form_id']=$form_id;
				$ID=$this->session->userdata('ID');
				$u_type = $this->session->userdata("USER_TYPE");
				//$count = count($_FILES['userfile']['name']);
	
				
				$id=$this->input->post('unique_code');
			  
				$dirname = "Finserv/Legal_documents/";
	
					 $curlurl = "curl -X MKCOL -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
	
				//echo "<br>";
					 exec($curlurl);
	
					
	
					 /* cREATE DIRECTORY FOR CUSTOMERS ENDS HERE */ 
				 /* code to export files to Nextcloud starts here */
				   $time = time();
				   //$dir = $customer_details->ID."/";
				   $fileextensionarr = explode(".",$_FILES["userfile"]["name"]);
				   $fileextension = $fileextensionarr[1];
				   $filename = $time.".".$fileextension;
				   $dirname = "Finserv/Legal_documents/".$id."/";
				   $filenamewithdir = $dirname.$filename;
				   $correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["userfile"]["tmp_name"]."";
				   exec($correcturl);
				   $file_input_arr = array
				   (
					'Application_id' => $Application_id,
					'Doc_name' => 'Legal document',	
					'path' =>$dirname,
					'User'=>$u_type,
					'Send_to'=>$this->input->post('send_to'),
					'doc_cloud_name' => $filename,
					'Cust_Id'=>$id
					
					);
					$this->credit_manager_user_model->saveDocuments($file_input_arr);
					//redirect('Legal/Send_Documents?x='.base64_encode($Application_id).'&y='.base64_encode($id));
					$data_row_FI = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'Legal','CPA');	
					$response = array('result' => 3,'docs'=>$data_row_FI);
					echo json_encode($response);
				
			
		}
		public function delete_Legal_doc($docid,$unique_code){
			
	
			$array_input = array(
				'ID' => $docid	
			);
		
			$user = $this->Customercrud_model->get_vendors_doc($docid);
			$Application_id=$user->Application_id;
		
		
			//print_r($user) ;
			//exit();
		
						$documentname = $user->doc_cloud_name;
						
						$documentdir = $user->path;
						
						$documentpath = $documentdir.$documentname;
		
					//	$pathname = "cloudfile/".$documentname;
				
				 $deletefile = " curl -X DELETE -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$documentpath."   ";
		
						  exec($deletefile);
		
			
			$u_type = $this->session->userdata("USER_TYPE");
			$result = $this->Customercrud_model->delete_vendor_doc($array_input);
			redirect('Legal/Send_Documents?x='.base64_encode($Application_id).'&y='.base64_encode($unique_code));
		
		}
		public function sendEmail_all_Document_Recived_Legal($Legal_info,$cust_info,$Application_ID)
	  {
				$Eamils=array();
				$Appication_info=$this->Legal_model->get_fi_docs($Application_id);
				$Operation_details=$this->Customercrud_model->getProfileData($Appication_info->credit_manager_id);
				if(!empty($Operation_details))
				{
					array_push($Eamils,$Operation_details->EMAIL);
				}
				if(!empty($cust_info->RO_ID))
				{
					$sourcing_employee_id=$cust_info->RO_ID;
					
				}
				else  if(!empty($cust_info->BM_ID))
				{
					$sourcing_employee_id=$cust_info->BM_ID;
				}
				else  if(!empty($cust_info->SELES_ID_ID))
				{
					$sourcing_employee_id=$cust_info->BM_ID;
				}
				
				$sourcing_employee_details=$this->Customercrud_model->getProfileData($sourcing_employee_id);
				if(!empty($sourcing_employee_details))
				{
					array_push($Eamils,$sourcing_employee_details->EMAIL);
				}
				
					if($sourcing_employee_details->ROLE=='14')
					{
						$BM_ID=$sourcing_employee_details->BM_ID;
						
					}
					else if($sourcing_employee_details->ROLE=='21')
					{
						$BM_ID=$sourcing_employee_details->BM_ID;
					}
					else{
						$BM_ID=$sourcing_employee_id;
					}
				
				$BM_details=$this->Customercrud_model->getProfileData($BM_ID);
				if(!empty($BM_details))
				{
					array_push($Eamils,$BM_details->EMAIL);
				}
				$Cluster_ID=$BM_details->CM_ID;
				$Cluster_details=$this->Customercrud_model->getProfileData($Cluster_ID);
				if(!empty($Cluster_details))
				{
					array_push($Eamils,$Cluster_details->EMAIL);
				}
				$RM_ID=$Cluster_details->RM_ID;
				$RM_Details=$this->Customercrud_model->getProfileData($RM_ID);
				if(!empty($RM_Details))
				{
					array_push($Eamils,$RM_Details->EMAIL);
				}
				
				$get_credit=$this->Operations_user_model->getcredit_by_location($cust_info->Location);
				$get_cluster=$this->Operations_user_model->getcluster_by_location($cust_info->Location);
				$get_cpa=$this->Operations_user_model->getcpa_by_location($cust_info->Location);
				$cpas=json_decode( json_encode($get_cpa), true);
				$clusters = json_decode( json_encode($get_cluster), true);
				$credits= json_decode( json_encode($get_credit), true);
				
			if(!empty($credits))
			{
				$EamilString='';
				foreach($credits as $credit)
				{
					
					
					array_push($Eamils,$credit['EMAIL']);
					
				}
			}
	 
		if(!empty($Eamils))
		{
			$send_to_emails= implode(",",$Eamils);
		}
		else
		{
			$send_to_emails='';
		}
		
		$send_to_emails=$send_to_emails.',sachin.kardile@finaleap.com,sunil.kalan@finaleap.com,rupali.more@finaleap.com';
		//$send_to_emails='papiha.patil@finaleap.com';
		
				$Appication_info=$this->Legal_model->get_legal_docs($Application_id);
				$config['protocol']=PROTOCOL;
					$config['smtp_host']=SMTP_HOST; 
					$config['smtp_port']=SMTP_PORT; 
					$config['smtp_timeout']=SMTP_TIMEOUT;
					$config['smtp_crypto']=SMTP_CRYPTO; 
					$config['smtp_user']=SMTP_USER; 
					$config['smtp_pass']=SMTP_PASS;
					$from_email = FROM_EMAIL; 
					$config['charset']=CHARSET;
					$config['newline']=NEWLINE;
					$config['wordwrap'] = WORDWRAP2;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");
				//$code = $this->generate_uuid();
				$this->email->from($from_email, 'Finaleap'); 
				$send_to_emails=$send_to_emails;
				//$send_email_to_support=$send_to_emails;
				$send_email_to_support='patilpapiha@gmail.com';
				$this->email->to($send_email_to_support);
				
				$this->email->subject($Application_ID.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'---- Legal REPORT'); 
			
				$data['cust_info']=$cust_info;
				$data['Legal_info']=$Legal_info;
				$mailContent = $this->load->view('templates/Legal_document_recived_team',$data,true);
				$this->email->message($mailContent); 
				if($this->email->Send())
				{
					
				}
				else{
					echo $this->email->print_debugger();
				}
		
		 
			 
		 
	  }
   }
?>