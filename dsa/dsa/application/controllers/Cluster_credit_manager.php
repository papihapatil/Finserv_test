<?php
date_default_timezone_set('asia/kolkata');
defined('BASEPATH') OR exit('No direct script access allowed');

class Cluster_credit_manager extends CI_Controller {

	public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
	     $this->load->library('upload');
		$this->load->helper(array('form', 'url'));
		$this->load->model('credit_manager_user_model');
		$this->load->model('Operations_user_model');
		$this->load->model('Customercrud_model');
		$this->load->model('Admin_model');
		$this->load->model('Dsacrud_model');
		$this->load->model('Dsacustomers_model');
        $this->load->library('email');
		$this->load->model('Legal_model');
		$this->load->model('CustomerCrud_model');
	
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
			if($this->session->userdata('login_count')==0)
		    {
				$this->session->set_flashdata('sucess','sucess');
				redirect('dsa/reset_password');
			}
			else
			{
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			//$this->load->view('header', $data);
			$id = $this->session->userdata('ID');
			$dashboard_data = $this->credit_manager_user_model->getClusterCreditManagerDashboardData();  
			//print_r($dashboard_data);
				$data['row']=$this->Customercrud_model->getProfileData($id);
			$data['dashboard_data'] = $dashboard_data;
			$this->load->view('dashboard_header', $data);
			$this->load->view('cluster_credit_manager/Dashboard', $data);
			
			}
		}
	}

	public function sanction_recommendations()
	{
		
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'cluster_credit_manager')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['userType'] = $this->session->userdata("USER_TYPE");
			//$this->load->view('header', $data);
			$id = $this->session->userdata('ID');
			$dashboard_data = $this->credit_manager_user_model->getDashboardData();  
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$data['dashboard_data'] = $dashboard_data;
			$this->load->view('dashboard_header', $data);
            $this->load->view('cluster_credit_manager/Sanction_Recommendations_PG',$data); 
            
        }        
	}
	

	public function sanction_recommendations_list()
            {
               
        
                # Read value
                $draw = $_POST['draw'];
                $row = $_POST['start'];
                $rowperpage = $_POST['length']; // Rows display per page
                $columnIndex = $_POST['order'][0]['column']; // Column index
                $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                $searchValue = $_POST['search']['value']; // Search value
                $id = $this->session->userdata('ID');
        
        
                ## Search
                $searchQuery = " ";
                ## Total number of records without filtering
                $sel=$this->credit_manager_user_model->Get_Total_no_of_sanction_recommendations();
                $totalRecords =$sel;
                ## Total number of records with filtering
                $sel=$this->credit_manager_user_model->Get_sanction_recommendations($searchValue);
                $totalRecordwithFilter =$sel;
                ## Fetch records
                $sel=$this->credit_manager_user_model->Get_sanction_recommendations_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
                $empRecords = $sel;
                            
                    $data = array();
                    foreach($empRecords as $row){
                       $edit ='<a href="'. base_url().'index.php/Cluster_credit_manager/view_sanction_recommendations?ID='.$row->Customer_id.'&CM='.$row->credit_manager_id.'" "Class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                   
                       $data[] = array(
                           "Name"=>$row->FN." ".$row->LN,
                           "Application_id"=>$row->application_number,
                           "loan_amount"=>$row->final_loan_amount,
                           "Recommendation_status"=>$row->Recommendation_status,
                           "form_submit_date"=>$row->form_submit_date,
                           "edit"=>$edit
                           
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

	public function view_sanction_recommendations()
      {
          $id = $this->input->get("ID");
          $id1=$this->session->userdata("ID");
          if( $id=='')  
            {     
                $id=$this->session->userdata("id");   
            }
          if( $id1=='') 
            {     
                $id1=$this->session->userdata("id1"); 
            }

            if($this->session->userdata("USER_TYPE") == '')
            {
                $data['showNav'] = 0;
                $data['error'] = '';
                $data['age'] = '';
                $data['userType'] = "none";
                $this->load->view('login', $data);
            }
          else
            {
               $id = $this->input->get("ID");
				$CM_ID=$this->input->get("CM");
				
				if ($id == '') {
					$id = $this->session->userdata("id");
				}
				$data_row = $this->Customercrud_model->getProfileData($id);
				$data_row2= $this->Customercrud_model->getProfileData($CM_ID);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
                $data_row_applied_loan=	$this->Customercrud_model->getCustomerLoanAppliedInfo($id);
               // $data_row_sanction_form= $this->credit_manager_user_model->getSanctionFormData($data_row_applied_loan->Application_id,$id1);
                $data_row_sanction_form= $this->credit_manager_user_model->getSanctionrecommendationData($id);    		
				$data_row_remark = $this->credit_manager_user_model->getApprovalRemarkData_remark($id,$id1);
				$credit_analysis_data=$this->credit_manager_user_model->getCreditAnalysisData($id);
				$data_income_details=$this->credit_manager_user_model->getCustomerIncomeInfo($id);
				$get_cluster_manager_name_list = $this->credit_manager_user_model->get_cluster_manager_name_list();
                $data_credit_analysis=$this->Operations_user_model->getcreditData($id);
                $data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
                $i=1;
                foreach($data_coapplicant as $coapplicant)
				{
				  $coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
              	  $coapp_data_credit_analysis_array[$i]=$coapp_data_credit_analysis;
              	  $coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
					
              	  if(!empty($coapp_data_credit_score))
					{
						$coapp_data_response=$coapp_data_credit_score->response;
					    $coapp_data_address=json_decode($coapp_data_response,true);
			       
						$coapp_data_response=$coapp_data_credit_score->response;
						$coapp_credit_score=json_decode($coapp_data_response,true);
						if(isset($coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
						{ $coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']; }
						else
						{ $coapp_data_obligations=array(); }

                     
						$coapp_data_obligations_array[$i]=$coapp_data_obligations;	
						
					    $coapp_credit_score_array[$i]=$coapp_credit_score;
						
						
							
					}
					else
					{
						
						$coapp_data_obligations_array[$i]=array();	
						$coapp_credit_score_array[$i]=array();
						$coapp_credit_score=array();
						
					}
				  $i++;
		    	}
  				$get_pd_data= $this->credit_manager_user_model->getPDData($id);
  				$data['data_row_PD_details']=$get_pd_data;
  				$data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
  				if($data_credit_score!='')
					{
						$credit_score_response=json_decode($data_credit_score->response,true);
						if(!empty($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
						{
							$data_obligations=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
						
						}
						else
						{
							$data_obligations=array();
					
						}
			
					}
					else
					{
						 
						 $data_obligations=array();
					
					}
					if(!empty( $coapp_data_obligations))
					{
                         foreach($coapp_data_obligations as $coapp_data_obligation)
							{
								
								if($coapp_data_obligation['Open']=='Yes')
								{
									
									 $k='';
									$Applicant_obligation_Array=array();
									// $Co_Applicant_obligation_Array[$k] = $coapp_data_obligation['Institution'].$coapp_data_obligation['Balance']; 
									$Co_Applicant_obligation_Array[$k] = $coapp_data_obligation['AccountNumber']; 
									

																							if(isset($coapp_data_obligation['SanctionAmount']))
																							{  
																								$SanctionAmount = $coapp_data_obligation['SanctionAmount'];
																							}
																							else if(isset($coapp_data_obligation['CreditLimit']))
																							{
																								$SanctionAmount = $coapp_data_obligation['CreditLimit'];
																							}
																							else
																							{
																								$SanctionAmount=0;
																							}
																						// "Balance"=>$coapp_data_obligation['Balance'],
																							if(isset($coapp_data_obligation['InstallmentAmount']))
																							{
																								$InstallmentAmount =$coapp_data_obligation['InstallmentAmount'];
																							}
																							else
																							{
																								if(isset($coapp_data_obligation['SanctionAmount']))
																								{
																									$InstallmentAmount =($coapp_data_obligation['SanctionAmount']*0.03);
																								}
																								elseif(isset($coapp_data_obligation['CreditLimit']))
																								{
																									$InstallmentAmount =($coapp_data_obligation['CreditLimit']*0.03);
																								}
																								else
																								{
																									$InstallmentAmount= 0;
																								}
																							}
																							$new_array = array();
																							foreach($Co_Applicant_obligation_Array as $value) {
																								if(!in_array($value, $Applicant_obligation_Array)) {
																									array_push($new_array, $value);
																								}
																							}
																							if(!empty($new_array))
																							{
														
																									$Co_Applicant_obligation_Array_attributes[$k] =array(
																									"Institution"=>$coapp_data_obligation['Institution'],
																									"AccountType"=>$coapp_data_obligation['AccountType'],
																									"SanctionAmount"=>$SanctionAmount,
																									"Balance"=>$coapp_data_obligation['Balance'],
																									"InstallmentAmount"=>$InstallmentAmount
																								); 
																					

																							
																						}
									
								
									$k++;


								
								}
						
								else
								{
								//	break;
								}

							}
					}
							
						//	echo "<pre>";
						//	print_r($Co_Applicant_obligation_Array);
						//	echo "</pre>";
							
							//echo "Co applicant array " ;            
							//echo "<pre>";
							//print_r($Co_Applicant_obligation_Array_attributes);
							//echo "</pre>";
						//echo "<pre>";
						//print_r( array_intersect($Applicant_obligation_Array,$Co_Applicant_obligation_Array));
						//print_r(array_unique($Applicant_obligation_Array,$Co_Applicant_obligation_Array_attributes));
						//print_r(array_diff($Co_Applicant_obligation_Array ,$Applicant_obligation_Array));
						if(isset($Applicant_obligation_Array))
						{
							$sorted_array=array_diff($Co_Applicant_obligation_Array ,$Applicant_obligation_Array);
						}
						else
						{
							//$sorted_array =$Co_Applicant_obligation_Array 
						}
					
						//echo "</pre>";

				
						/*	$new_array = array();
							foreach($Co_Applicant_obligation_Array as $value) {
								if(!in_array($value, $Applicant_obligation_Array)) {
									array_push($new_array, $value);
								}
							}
							
							echo "<pre>";
							print_r($new_array);
							echo "</pre>";
			*/             
			//==============================================added by priyanka==============================================
			if(isset($Co_Applicant_obligation_Array_attributes))
			{
			$Co_Applicant_obligation_Array_attributes[$i]=$Co_Applicant_obligation_Array_attributes;
			}
			else
			{
			$Co_Applicant_obligation_Array_attributes[$i]="";
			}

			if(isset($sorted_array)){
			$Co_Applicant_sorted_array[$i]=$sorted_array;	
			}
			else
			{
			$Co_Applicant_sorted_array[$i]="";
			}
			$data['Co_Applicant_sorted_array'] = $Co_Applicant_sorted_array;	



               	$this->load->helper('url');	
				$age = $this->session->userdata('AGE');
				$u_type = $this->session->userdata("USER_TYPE");
				$q = 1;
				if($u_type == 'DSA')$q = 2;
				if($data_row->PROFILE_PERCENTAGE == 100){
					$age = 1;
				}else $age = 0;
				$data['showNav'] = $age;
				$data['age'] =$age;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				$data['id'] =$id;
				$data['CM_ID'] =$CM_ID;
				$data['row'] =$data_row;
				$data['row_2'] =$data_row2;
				$data['row_more'] =$data_row_more;
				$data['data_row_applied_loan']=$data_row_applied_loan;
				$data['row_sanction']= $data_row_sanction_form;
				$data['row_remark'] = $data_row_remark;	
				$data['credit_analysis_data']= $credit_analysis_data;
				$data['data_credit_analysis']=$data_credit_analysis;	
				$data['data_income_details']= $data_income_details;
				$data['coapplicants']=$data_coapplicant;
				$data['coapp_data_credit_analysis_array']=$coapp_data_credit_analysis_array;
				$data['get_cluster_manager_name_list']= $get_cluster_manager_name_list;
                $this->load->view('dashboard_header',$data);
                $this->load->view('cluster_credit_manager/View_sanction_recommendation',$data);
                

            } 
      }



    public function Sanction_recommendation_status()
    {
        $data=array(
                     'Customer_ID'=>$this->input->post('Customer_ID'),
                     'Recommendation_status'=>$this->input->post('Recommendation_status'),
                     'Cluster_manager_Comments'=>$this->input->post('Cluster_manager_Comments'),
                     'Recommendation_status_added_by'=>'Cluster Credit Manager',
                     'form_submit_date'=>date('d-m-y'),
					 'final_tenure'=>$this->input->post('final_tenure'),
					 'final_loan_amount'=>$this->input->post('final_loan_amount'),
					 'roi'=>$this->input->post('roi'),
					 'EMI'=>$this->input->post('EMI'),
					 
                    );
        $Customer_ID=$this->input->post('Customer_ID');
        $data_row_sanction_form= $this->credit_manager_user_model->getSanctionrecommendationData($Customer_ID);
        $cluster_credit_manager_profile_data=$this->Dsacrud_model->getProfileData($data_row_sanction_form->recommended_to); 
        $credit_manager_profile_data=$this->Dsacrud_model->getProfileData($data_row_sanction_form->credit_manager_id);   
     	$result = $this->credit_manager_user_model->update_recommendation_details($Customer_ID,$data);


       
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
		$this->email->from($from_email, 'Finaleap Finserv');
		//$send_email_to=$cluster_credit_manager_email_id->EMAIL;
		
 

     	$status_by_CCM = $this->input->post('Recommendation_status');
     	if($status_by_CCM =='Recommended')    //------------send mail to admin
     	{
     		$send_email_to='piyuabdagire@gmail.com';
     		//$send_email_to='piyuabdagire@gmail.com,amit@finaleap.com,vipul@finaleap.com';
     		//$send_email_to='piyuabdagire@gmail.com,amit@finaleap.com,vipul@finaleap.com,'.$credit_manager_profile_data->EMAIL.','.$cluster_credit_manager_profile_data->EMAIL.'';
		    $this->email->to($send_email_to);
     		$this->email->subject('Sanction Recommendation Submitted For :  '.$data_row_sanction_form->customer_name.''); 
		    $Email_data=array(
								 'Application_Id'=> $data_row_sanction_form->application_number,
								 'Customer_name'=>$data_row_sanction_form->customer_name,
								 'loan_type' =>$data_row_sanction_form->loan_type,
								 'final_loan_amount'=>$data['final_loan_amount'],
								 'final_tenure' =>$data['final_tenure'],
								 'roi'=>$data['roi'],
								  'EMI'=>$data['EMI'],
								 'Submitted_by'=>$cluster_credit_manager_profile_data->FN." ".$cluster_credit_manager_profile_data->LN,
								 'submission_date'=>date('d-m-y'),
							     'Recommendation_status'=>$this->input->post('Recommendation_status'),
							     'Recommendation_status_added_by' =>'Cluster Credit Manager' ,
								 );

		    $data2['data']=$Email_data;
		    $mailContent = $this->load->view('templates/sanction_recommendation_email',$data2,true);
		    $this->email->message($mailContent); 
	        $this->email->Send() ;
     	}
     	else if($status_by_CCM =='Reverted') // ------------send mail to perticular credit manager
     	{
			$send_email_to='piyuabdagire@gmail.com';
     		//$send_email_to='info@finaleap.com';   //$credit_manager_profile_data->EMAIL;
     		//$send_email_to=$credit_manager_profile_data->EMAIL;  
			$this->email->to($send_email_to);
			$this->email->subject('Revert Changes For : '.$data_row_sanction_form->customer_name.''); 
		      $Email_data=array(
								 'Application_Id'=> $data_row_sanction_form->application_number,
								 'Customer_name'=>$data_row_sanction_form->customer_name,
								   'loan_type' =>$data_row_sanction_form->loan_type,
								 'final_loan_amount'=>$data['final_loan_amount'],
								 'final_tenure' =>$data['final_tenure'],
								 'roi'=>$data['roi'],
								  'EMI'=>$data['EMI'],
								 'Submitted_by'=>$cluster_credit_manager_profile_data->FN." ".$cluster_credit_manager_profile_data->LN,
								 'submission_date'=>date('d-m-y'),
							     'Recommendation_status'=>$this->input->post('Recommendation_status'),
							     'Recommendation_status_added_by' =>'Cluster Credit Manager' ,
							     'Cluster_manager_Comments' =>$this->input->post('Cluster_manager_Comments') ,
								 );

		    $data2['data']=$Email_data;
		    $mailContent = $this->load->view('templates/sanction_recommendation_email',$data2,true);
		    $this->email->message($mailContent); 
	        $this->email->Send() ;
     	}
     	else if($status_by_CCM =='Rejected') // ------------send mail to perticular credit manager
     	{
     		//$send_email_to='info@finaleap.com'; //$credit_manager_profile_data->EMAIL;
			$send_email_to='piyuabdagire@gmail.com';
     	//	$send_email_to=$credit_manager_profile_data->EMAIL;
			$this->email->to($send_email_to);
     		$this->email->subject('Sanction Recommendation Rejected For :  '.$data_row_sanction_form->customer_name.''); 
		     $Email_data=array(
								 'Application_Id'=> $data_row_sanction_form->application_number,
								 'Customer_name'=>$data_row_sanction_form->customer_name,
								  'loan_type' =>$data_row_sanction_form->loan_type,
								 'final_loan_amount'=>$data['final_loan_amount'],
								 'final_tenure' =>$data['final_tenure'],
								 'roi'=>$data['roi'],
								  'EMI'=>$data['EMI'],
								 'Submitted_by'=>$cluster_credit_manager_profile_data->FN." ".$cluster_credit_manager_profile_data->LN,
								 'submission_date'=>date('d-m-y'),
							     'Recommendation_status'=>$this->input->post('Recommendation_status'),
							     'Recommendation_status_added_by' =>'Cluster Credit Manager' ,
							     'Cluster_manager_Comments' =>$this->input->post('Cluster_manager_Comments') ,
								 );

		    $data2['data']=$Email_data;
		    $mailContent = $this->load->view('templates/sanction_recommendation_email',$data2,true);
		    $this->email->message($mailContent); 
	        $this->email->Send() ;
     	}





        $json = array (  
           'customer_id'=>$Customer_ID,
           'CM_ID'=>$this->input->post('CM_ID'),
           'msg'=>'success');
        echo json_encode($json);
   }
    
    public function Submit_Processing_fee_details()
    {
        
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR'  || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
			
			//echo "TEst ";

            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['userType']=$this->session->userdata("USER_TYPE");
          
            $customer_id = $this->input->post('customer_id');
          //  $get_documents = $this->Customercrud_model->getDocuments($customer_id);
            $customer_info = $this->Customercrud_model->getProfileData($customer_id);
            $data['customer_info']=$customer_info;
			
			$datarow = $this->Customercrud_model->getCustomerId($customer_id);
          
           // print_r($get_documents);
           // exit();

            $mode_of_payment = $this->input->post('mode_of_payment');

            $values=array(
                'mode_of_payment'=>$mode_of_payment,
            );
            $this->Admin_model->update_processing_fee_details($customer_id,$values);
           
           
      

            if($mode_of_payment  == 'CHEQUE')
            {

            	$mode_of_payment = $this->input->post('mode_of_payment');
            	$account_holder_name = $this->input->post('account_holder_name');
            	$IFSC_code = $this->input->post('IFSC_code');
            	$branch_name = $this->input->post('branch_name');
            	$bank_name = $this->input->post('bank_name');
            	$cheque_number = $this->input->post('cheque_number');
            	$account_type = $this->input->post('account_type');
            	$payment_recived_date = $this->input->post('payment_recived_date');
				$processing_fee_amount = $this->input->post('processing_fee_amount');
            	$cheque_doc =$_FILES["cheque_doc"]["name"];


            	$payment_data=array(

            		'mode_of_payment'=>$mode_of_payment,
            		'account_holder_name'=>$account_holder_name,
            		'IFSC_code'=>$IFSC_code,
            		'branch_name'=>$branch_name,
            		'checque_bank_name'=>$bank_name,
            		'cheque_number'=>$cheque_number,
            		'account_type'=>$account_type,
            		'payment_recived_date'=>$payment_recived_date,
					'processing_fee_amount'=>$processing_fee_amount

            	);
				
				$fee = $processing_fee_amount;
					
					$appnumber = $CUST_ID;
					
					
					
					$date = $this->input->post('Payment_Recived_date');
					
					$subject = "Payment received";
					
					
					//$date = date_format($payment_recived_date,"j F Y");
					
					$date = $this->input->post('Payment_Recived_date');
					
					$date=date_create($date);
					
					
					
					  $payment_recived_date  = date_format($date,"j F Y");
					
					 $message = "Dear ".$customer_info->FN.", <br> <br> We have received payment of Rs ".$fee." as processing fees towards your application no ".$datarow->Application_id." with Finaleap Finserv on ".$payment_recived_date." <br><br>Thanks and Regards, <br> Finaleap Finserv Private Limited";
					
					//exit;
					//print_r($customer_info);
					//exit;
					
					$toemail = "jaykumar.nimbalkar@gmail.com";
					
					$toemail = $customer_info->EMAIL;  
					
					$this->sendEmail($toemail,$subject,$message);
					
					$smstemplate = "Dear Customer, We have received payment of Rs ".$fee." as processing fees towards your loan application no ".$datarow->Application_id." with Finaleap Finserv on ".$payment_recived_date."";
				
				
				$mobilenumber = $customer_info->MOBILE;
				
				//$mobilenumber = 9960763466;
					$output = $this->sendsms($mobilenumber,$smstemplate);
					
					
					
            	$this->Admin_model->update_processing_fee_details($customer_id,$payment_data);


                if(!empty($cheque_doc))
                {
            	   $time = time();
            	   $document_name="DISBURSEMENT CHEQUE";
				   $dir = $customer_info->ID."/";
			       $fileextensionarr = explode(".",$_FILES["cheque_doc"]["name"]);
			       $fileextension = $fileextensionarr[1];
				   $filename = "Disbursement_payment_cheque".$time.".".$fileextension;
				   $dirname = "Finserv/customers/";
			       $filenamewithdir = $dirname.$filename;
			       $correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["cheque_doc"]["tmp_name"]."";
			       exec($correcturl);
			       $file_input_arr = array(
									'USER_ID' => $customer_id,
									'DOC_TYPE' =>$document_name,	
									'DOC_NAME' => $filename,
									'DOC_SIZE' => $_FILES['cheque_doc']['size'],
									'DOC_FILE_TYPE' => $_FILES['cheque_doc']['type'],
									'DOC_MASTER_TYPE' => 'DISBURSEMENT CHEQUE',
									'doc_cloud_name' => $filename,
									'doc_cloud_dir' => $dirname
								);
			 
					$docid = $this->Customercrud_model->saveDocuments($file_input_arr);
				}


	         	if($account_holder_name == '')
            	{
            		$_SESSION['CHEQUE_error'] = 'account_holder_name';
            	    $this->load->view('admin/admin_dashbord',$data);             
               		redirect(base_url('index.php/Admin/Processing_fee_receipt?ID='.$customer_id));
            	}
            	else if($IFSC_code == '')
            	{
            		$_SESSION['CHEQUE_error'] = 'IFSC_code';
            		$this->load->view('admin/admin_dashbord',$data);             
               		redirect(base_url('index.php/Admin/Processing_fee_receipt?ID='.$customer_id));
            	}
            	else if($branch_name == '')
            	{
            		$_SESSION['CHEQUE_error'] = 'branch_name';
            		$this->load->view('admin/admin_dashbord',$data);             
               		redirect(base_url('index.php/Admin/Processing_fee_receipt?ID='.$customer_id));
            	}
            	else if($bank_name == '')
            	{
            		$_SESSION['CHEQUE_error'] = 'bank_name';
            		$this->load->view('admin/admin_dashbord',$data);             
               		redirect(base_url('index.php/Admin/Processing_fee_receipt?ID='.$customer_id));
            	}
            	else if($cheque_number == '')
            	{
            		$_SESSION['CHEQUE_error'] = 'cheque_number';
            		$this->load->view('admin/admin_dashbord',$data);             
               		redirect(base_url('index.php/Admin/Processing_fee_receipt?ID='.$customer_id));
            	}
            	else if($account_type == '')
            	{
            		$_SESSION['CHEQUE_error'] = 'account_type';
            		$this->load->view('admin/admin_dashbord',$data);             
               		redirect(base_url('index.php/Admin/Processing_fee_receipt?ID='.$customer_id));
            	}
            	else if($payment_recived_date == '')
            	{
            		$_SESSION['CHEQUE_error'] = 'payment_recived_date';
            		$this->load->view('admin/admin_dashbord',$data);             
               		redirect(base_url('index.php/Admin/Processing_fee_receipt?ID='.$customer_id));
            	}
            	else
            	{
            		$_SESSION['CHEQUE_success'] = 'Success';
            		$this->load->view('admin/admin_dashbord',$data);             
               		redirect(base_url('index.php/Admin/Processing_fee_receipt?ID='.$customer_id));
            	}
               $this->load->view('admin/admin_dashbord',$data);             
               redirect(base_url('index.php/Admin/Processing_fee_receipt?ID='.$customer_id));
            }
            else if($mode_of_payment  == 'UPI_NEFT_RTGS')
            {
            	$Transaction_id = $this->input->post('Transaction_id');
				$payment_recived_date = $this->input->post('payment_recived_date');
				$transaction_throught = $this->input->post('transaction_throught');
				$processing_fee_amount = $this->input->post('processing_fee_amount');
				$cheque_doc =$_FILES["cheque_doc"]["name"];

				$payment_data=array(

            		'Transaction_id'=>$Transaction_id,
            		'payment_recived_date'=>$payment_recived_date,
            		'transaction_throught'=>$transaction_throught,
					'processing_fee_amount'=>$processing_fee_amount

            	);
				
				
					$date = $this->input->post('Payment_Recived_date');
					
					$date=date_create($date);
					
					
					
					  $payment_recived_date  = date_format($date,"j F Y");
					 
					 
					
					$subject = "Payment received";
					
					 $message = "Dear ".$customer_info->FN.", <br> <br> We have received payment of Rs ".$processing_fee_amount." as processing fees towards your application no ".$datarow->Application_id." with Finaleap Finserv on ".$payment_recived_date." <br><br>Thanks and Regards, <br> Finaleap Finserv Private Limited";
					
					//exit;
					
					//$toemail = "jaykumar.nimbalkar@gmail.com";
					
					//print_r($customer_info);
					
					//exit;
					
					$toemail = $customer_info->EMAIL;
					
					$this->sendEmail($toemail,$subject,$message);
					
					
            	$this->Admin_model->update_processing_fee_details($customer_id,$payment_data);

				
            	//$this->Admin_model->update_processing_fee_details($customer_id,$payment_data);
				
				$smstemplate = "Dear Customer, We have received payment of Rs ".$processing_fee_amount." as processing fees towards your loan application no ".$datarow->Application_id." with Finaleap Finserv on ".$payment_recived_date."";
				
				
				$mobilenumber = $customer_info->MOBILE;
				
				//$mobilenumber = 9960763466;
					$output = $this->sendsms($mobilenumber,$smstemplate);
				
            	 if(!empty($cheque_doc))
                {
            	   $time = time();
            	   $document_name="DISBURSEMENT CHEQUE";
				   $dir = $customer_info->ID."/";
			       $fileextensionarr = explode(".",$_FILES["cheque_doc"]["name"]);
			       $fileextension = $fileextensionarr[1];
				   $filename = "Disbursement_payment_cheque".$time.".".$fileextension;
				   $dirname = "Finserv/customers/";
			       $filenamewithdir = $dirname.$filename;
			       $correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["cheque_doc"]["tmp_name"]."";
			       exec($correcturl);
			       $file_input_arr = array(
									'USER_ID' => $customer_id,
									'DOC_TYPE' =>$document_name,	
									'DOC_NAME' => $filename,
									'DOC_SIZE' => $_FILES['cheque_doc']['size'],
									'DOC_FILE_TYPE' => $_FILES['cheque_doc']['type'],
									'DOC_MASTER_TYPE' => 'DISBURSEMENT CHEQUE',
									'doc_cloud_name' => $filename,
									'doc_cloud_dir' => $dirname
								);
			 
					$docid = $this->Customercrud_model->saveDocuments($file_input_arr);
				}

            	if($Transaction_id == '')
            	{
            		$_SESSION['NEFT_error'] = 'Transaction_id';
            		$this->load->view('admin/admin_dashbord',$data);             
               		redirect(base_url('index.php/Admin/Processing_fee_receipt?ID='.$customer_id));
            	}
            	else if($payment_recived_date == '')
            	{
            		$_SESSION['NEFT_error'] = 'payment_recived_date';
            		$this->load->view('admin/admin_dashbord',$data);             
               		redirect(base_url('index.php/Admin/Processing_fee_receipt?ID='.$customer_id));
            	}
            	else
            	{
            		$_SESSION['NEFT_success'] = 'Success';
            		$this->load->view('admin/admin_dashbord',$data);             
               		redirect(base_url('index.php/Admin/Processing_fee_receipt?ID='.$customer_id));
            	}

                $this->load->view('admin/admin_dashbord',$data);             
               redirect(base_url('index.php/Admin/Processing_fee_receipt?ID='.$customer_id));
            }
            else
            {
            	echo "something went wrong";
            	exit();
            }
         
            $values=array(
                'payment_recived_date'=>$payment_recived_date,
            );
            $this->Admin_model->update_processing_fee_details($customer_id,$values);
          

            
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
		$this->email->to($email);
		//$this->email->bcc('customercare@finaleap.com');
		//$this->email->cc('accounts@finaleap.com');
		$this->email->subject($subject); 
		
		//echo "BCC";
		
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

}
?>