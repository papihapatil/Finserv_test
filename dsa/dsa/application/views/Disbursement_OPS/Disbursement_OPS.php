<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 date_default_timezone_set("Asia/Kolkata");
class Disbursement_OPS extends CI_Controller {

	public function __construct() {
        parent:: __construct();
 
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
	     $this->load->library('upload');
		$this->load->helper(array('form', 'url'));
		$this->load->model('Operations_user_model');
		$this->load->model('credit_manager_user_model');
		$this->load->model('Customercrud_model');
		$this->load->model('Dsacrud_model');//Dsacustomers_model
		$this->load->model('Dsacustomers_model');
		$this->load->model('Admin_model');
        $this->load->library('email');
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
			$data['userID']=$user_info->UNIQUE_CODE;
            // ==========================================================
			$filter_by='all';
			$dashboard_data = $this->Operations_user_model->getDashboardData();     
			$dashboard_data_2 = $this->Operations_user_model->getDashboardData_2($filter_by);   
			$dashboard_data_3=$this->Operations_user_model->getDashboardData_incomplete_Loan_app();
			$getDashboardData_4=$this->Operations_user_model->getDashboardData_incomplete_Legal();
			$getDashboardData_5=$this->Operations_user_model->getDashboardData_complete_Legal();
			$getDashboardData_6=$this->Operations_user_model->getDashboardData_incomplete_Tech();
			$getDashboardData_7=$this->Operations_user_model->getDashboardData_complete_Tech();
			//$getDashboardData_6=$this->Operations_user_model->getDashboardData_incomplete_Tech();
			$data['total_files']=$this->credit_manager_user_model->Total_Files_for_disbursement();
			//echo $sel;
			//exit();
			$data['dashboard_data'] = $dashboard_data;
			$data['dashboard_data_4'] = $getDashboardData_4;
			$data['getDashboardData_5'] = $getDashboardData_5;
			$data['getDashboardData_6'] = $getDashboardData_6;
			$data['getDashboardData_7'] = $getDashboardData_7;
			$data['dashboard_data_2'] = $dashboard_data_2;
			$data['dashboard_data_3'] = $dashboard_data_3;
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$this->load->view('dashboard_header', $data);
			$this->load->view('Disbursement_OPS/Dashboard', $data);
			//$this->load->view('footer');
		}
	}
	
	
	public function register_mandate()
	{
		 $userid = base64_decode($_REQUEST['I']);
		
		
				$id = $this->session->userdata("ID");
				
			
				$row=$this->Customercrud_model->getProfileData($id);
				
				$data['row'] = $row;
				
				
				
				$row=$this->Customercrud_model->getProfileData($userid);
				
				$data2['row'] = $row;
				//print_r($row);
				
				
				$data['sanction_details']=$this->Operations_user_model->getsanctionLetterDetails($userid);
				
				//print_r($data['sanction_details']);
				
				//exit;
		
		//$data = array();
		
				$this->load->view('dashboard_profile_header', $data);

		$this->load->view('Payments/paymentwebform', $data2);
		
		
	}
	

	   public function Files_For_Disbursement()
    {
        
         if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR'  || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
           // $HR_user_arr = $this->Admin_model->HR($s);
           // $_SESSION["data_for_excel"] =$HR_user_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $id = $this->session->userdata('ID');
            $dashboard_data = $this->credit_manager_user_model->getDashboardData();  
            $data['row']=$this->Customercrud_model->getProfileData($id);
            $data['dashboard_data'] = $dashboard_data;
            $this->load->view('dashboard_header', $data);
            $this->load->view('Disbursement_OPS/Files_for_disbursement', $data);  
            
        }        
    }

    public function Files_for_disbursement_with_paginations()
            {
               
        
                # Read value
                $draw = $_POST['draw'];
                $row = $_POST['start'];
                $rowperpage = $_POST['length']; // Rows display per page
                $columnIndex = $_POST['order'][0]['column']; // Column index
                $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                $searchValue = $_POST['search']['value']; // Search value
        
        
        
                ## Search
                $searchQuery = " ";
                ## Total number of records without filtering
                $sel=$this->credit_manager_user_model->Total_Files_for_disbursement();
                $totalRecords =$sel;
                ## Total number of records with filtering
                $sel=$this->credit_manager_user_model->Search_Files_for_disbursement($searchValue);
                $totalRecordwithFilter =$sel;
                ## Fetch records
                $sel=$this->credit_manager_user_model->Files_for_disbursement_with_pagination($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
                $empRecords = $sel;
                //return $empRecords
                //print_r($empRecords);
                
                    
                    $data = array();
        
                    foreach($empRecords as $row){
						
                         $edit ='<a href="'. base_url().'index.php/Disbursement_OPS/View_details?I='. base64_encode($row->UNIQUE_CODE).'"Class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                          $edit2 ='<a href="'. base_url().'index.php/Disbursement_OPS/register_mandate?I='. base64_encode($row->UNIQUE_CODE).'"Class="btn modal_test">ENach Mandate</a>';
						//$edit3 ='<a href="'. base_url().'index.php/Payments/MandateVerification?I='. base64_encode($row->UNIQUE_CODE).'"Class="btn modal_test">Verify Mandate</a>';
						  $edit3 = '<a href="'. base_url().'index.php/Payments/CalculatePreemi?I='. base64_encode($row->UNIQUE_CODE).'"Class="btn modal_test">PreEmi
</a>';
						  $upload_docs ='<a href="'. base_url().'index.php/Disbursement_OPS/Uplad_documents?I='. base64_encode($row->UNIQUE_CODE).'"Class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                     
					 
			if($row->payment_recived_date != "")
           {
                $payment_status='<span style="color:green">Recived on '.$row->payment_recived_date.'</span>';
				$edit_ ='<a href="'. base_url().'index.php/Disbursement_OPS/View_details_?I='. base64_encode($row->UNIQUE_CODE).'"Class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                    	
				 
           }
           else
           {
                $payment_status='<span style="color:red">Pending</span>' ;
				  $edit_ ='<a  "Class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a>';
           }
		   
		   
                       $data[] = array(
                           "FN"=>$row->FN." ".$row->LN,
                           "Letter_ID"=>$row->Letter_ID,
						   "payment_status"=> $payment_status,
                           "upload_docs"=> $upload_docs,
                           "edit"=>$edit_." &nbsp;".$edit2." ".$edit3 
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


//============================= added by priya 06-10-2022
 public function View_details_()
    {
        
         if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR'  || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age =$this->session->userdata('AGE');
            $id = base64_decode($this->input->get('I'));
            $login_user_id = $this->session->userdata('ID');
            //=====================added by priyanka===============
            $user_info= $this->Operations_user_model->getProfileData($login_user_id);
            $data2['userID']=$user_info->UNIQUE_CODE;
            $data2['showNav'] = 1;
            $data2['age'] = $age;
			$data['USER_TYPE']=$this->session->userdata('USER_TYPE');
            //$data['s'] = $s;
            $dashboard_data =$this->credit_manager_user_model->getDashboardData();  
			$data2['row']=$this->Customercrud_model->getProfileData($login_user_id);
            $data['row']=$this->Customercrud_model->getProfileData($id);
		
		//=========================================================================
			$data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
				$data['find_my_legal_technical_documents']=$this->credit_manager_user_model->find_my_legal_technical_documents($id);
				
				$data['find_my_legal_documents']=$this->credit_manager_user_model->find_my_legal_documents($id);
				$data['find_my_technical_documents']=$this->credit_manager_user_model->find_my_technical_documents($id);
				$data['find_my_IncomeAnalysisbankstatement']=$this->credit_manager_user_model->find_my_IncomeAnalysisbankstatement($id);
				$data['find_my_FI_documents']=$this->credit_manager_user_model->find_my_FI_documents($id);
				$data['find_my_RCU_documents']=$this->credit_manager_user_model->find_my_RCU_documents($id);
				$data['find_my_Court_case_documents']=$this->credit_manager_user_model->find_my_Court_case_documents($id);
				$data['find_my_CRIF_documents']=$this->credit_manager_user_model->find_my_CRIF_documents($id);
				$data['find_my_loan_application_form']=$this->credit_manager_user_model->find_my_loan_application_form($id);
				$data['find_my_KYC_documents']=$this->credit_manager_user_model->find_my_KYC_documents($id);
				$data['Property_document_list']=$this->credit_manager_user_model->Property_document_list($id);
				$data['find_my_loan_agreement']=$this->credit_manager_user_model->find_my_loan_agreement($id);
				$data['find_my_sanction_letter']=$this->credit_manager_user_model->find_my_sanction_letter($id);
				$data['find_my_MITC_letter']=$this->credit_manager_user_model->find_my_MITC_letter($id);
				$data['find_my_Bank_signature_verification']=$this->credit_manager_user_model->find_my_Bank_signature_verification($id);
				$data['find_my_Vernacular_Declaration']=$this->credit_manager_user_model->find_my_Vernacular_Declaration($id);
				$data['find_my_Dual_name_declatarion']=$this->credit_manager_user_model->find_my_Dual_name_declatarion($id);
				$data['find_my_End_use_letter']=$this->credit_manager_user_model->find_my_End_use_letter($id);
				$data['find_my_Pre_EMI_letter']=$this->credit_manager_user_model->find_my_Pre_EMI_letter($id);
				//echo "<pre>";
				//print_r($data['find_my_legal_documents']);
				//echo "</pre>";
				//exit();
				if(!empty($data_row_pd_table))
				{
					$data['data_row_pd_table'] = $data_row_pd_table;
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
                $data_row_applied_loan=	$this->Customercrud_model->getCustomerLoanAppliedInfo($id);
                $getCustomerSanction_letter_details=	$this->credit_manager_user_model->getCustomerSanction_letter_details($id);
            //    $data_row_personal_discussion_form= $this->credit_manager_user_model->getPersonalDiscussionData($id,$id1);
                $get_documents = $this->Customercrud_model->getDocuments($id);
	
			
				$data_credit_analysis=$this->Operations_user_model->getcreditData($id);
				 $data_row_PD_details= $this->credit_manager_user_model->getPDData($id);
				 $data['data_row_PD_details']=$data_row_PD_details;
				$data_row_income = $this->Customercrud_model->getProfileDataIncome($id);
                 $Applicant_row=$this->Customercrud_model->getProfileData($id);
					$applicant_details=$this->Customercrud_model->getProfileData($id);
				  	$Get_Doc_Master_Type=$this->Customercrud_model->Get_Doc_Master_Type($id);
				  	$applicant_documents = json_decode(json_encode($applicant_details),true);
				 	array_push($applicant_documents,$data_row);
				  	array_push($applicant_documents,$Get_Doc_Master_Type);
				  	$coapplicants=$this->Dsacustomers_model->getCustomers_coapplicants($id);
					$data['coapplicants']=$coapplicants;
					$Get_Doc_Master_Type_Coapplicant_Documents=array();
					  foreach($coapplicants As $coapplicant )
					  {
						 $coapplicant_details=$coapplicant;
						 $coapplicant_documents = $this->Customercrud_model->getDocuments($coapplicant->UNIQUE_CODE);
						 $coapplicant_Get_Doc_Master_Type=$this->Customercrud_model->Get_Doc_Master_Type($coapplicant->UNIQUE_CODE);
						 $coapplicant_documents_all = json_decode(json_encode($coapplicant_details),true);
						 array_push($coapplicant_documents_all,$coapplicant_documents);
						 array_push($coapplicant_documents_all,$coapplicant_Get_Doc_Master_Type);
					  	 array_push($Get_Doc_Master_Type_Coapplicant_Documents,$coapplicant_documents_all);
					  }
					  
					  $coapplicant_CRIF=array();
					  foreach($coapplicants As $coapplicant )
					  {
						 $coapplicant_details=$coapplicant;
						 $coapplicant_documents = $this->credit_manager_user_model->find_my_CRIF_documents($coapplicant->UNIQUE_CODE);
						 array_push($coapplicant_CRIF,$coapplicant_documents);
					  }
					  $data['coapplicant_CRIF']=$coapplicant_CRIF;
					  
					  
					    $coapplicant_bank_statement=array();
					  foreach($coapplicants As $coapplicant )
					  {
						 $coapplicant_details=$coapplicant;
						 $coapplicant_documents = $this->credit_manager_user_model->find_my_bank_statement_documents($coapplicant->UNIQUE_CODE);
						 array_push($coapplicant_bank_statement,$coapplicant_documents);
					  }
					  $data['coapplicant_bank_statement']=$coapplicant_bank_statement;
					  
					  
					  $doc_type_user = 2;
					  $u_type = $this->session->userdata("USER_TYPE");
					  if($u_type == 'CUSTOMER')$doc_type_user = 1;
					  $this->load->helper('url');
					  $age = $this->session->userdata('AGE');
					  $q = 1;
					  if($u_type == 'DSA')$q = 2;
					  $main_doc_row = $this->Customercrud_model->getMainDocumentsCount($q);
					  $saved_doc_row = $this->Customercrud_model->getSavedDocumentsCount_KYC($id);
					  $data['Get_Doc_Master_Type']=$applicant_documents;
				  	  $data['Coapplicant_Doacuments']=$Get_Doc_Master_Type_Coapplicant_Documents;
                      $data['Applicant_row'] = $Applicant_row;
						$data['data_row_more'] = $data_row_more;



				$co_app = $this->Customercrud_model->getMyCoapplicants($id);
							$data['co_app'] = $co_app;
				$isCoapp = count($co_app) > 0 ? 'true' : 'false';
				$isProfileFull = 'false';
				for ($i=0; $i < count($co_app); $i++) { 
					if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
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
				$data['data_row_applied_loan']=$data_row_applied_loan;
				$data['coapplicants'] = $co_app;
				$data['data_row_income'] = $data_row_income;
				$data['data_credit_analysis']=$data_credit_analysis;
				$data['Sanction_letter_details']=$getCustomerSanction_letter_details;
				//$data['row_personal_discussion_form']=$data_row_personal_discussion_form;
				$data['get_documents']=$get_documents;
				//======================================================================================
		
			
		
		
			$coapplicants=$this->Dsacustomers_model->getCustomers_coapplicants($id);
			$Get_Doc_Master_Type_Coapplicant_Documents=array();
			  foreach($coapplicants As $coapplicant )
			  {
				 $coapplicant_details=$coapplicant;
				 $coapplicant_documents = $this->Customercrud_model->getDocuments($coapplicant->UNIQUE_CODE);
				 $coapplicant_Get_Doc_Master_Type=$this->Customercrud_model->Get_Doc_Master_Type($coapplicant->UNIQUE_CODE);
				 $coapplicant_documents_all = json_decode(json_encode($coapplicant_details),true);
				 array_push($coapplicant_documents_all,$coapplicant_documents);
				 array_push($coapplicant_documents_all,$coapplicant_Get_Doc_Master_Type);
			  	 array_push($Get_Doc_Master_Type_Coapplicant_Documents,$coapplicant_documents_all);
			  }
			  $data['Coapplicant_Doacuments']=$Get_Doc_Master_Type_Coapplicant_Documents;
	          $data['coapplicants']= $coapplicants;

			$data['sanction_details']=$this->Operations_user_model->getsanctionLetterDetails($id);
			$data['loan_application_documents']=$this->credit_manager_user_model->loan_application_documents($id);
            $data['loan_details']=$this->Operations_user_model->getAplliedLoanDetails($id);
			$data['find_Disbursement_document_approval_data']= $this->credit_manager_user_model->find_Disbursement_document_approval_data($id);
		    $data['disbursement_property_type_documents']=$this->credit_manager_user_model->get_disbursement_property_type_documents();
            $data['disbursement_property_subtype_documents']=$this->credit_manager_user_model->get_disbursement_property_subtype_documents();
            $data['dashboard_data'] = $dashboard_data;
            $data['applicant_id']= $id;
            $this->load->view('dashboard_header', $data2);
            $this->load->view('Disbursement_OPS/view_customers_disbursement_details_', $data);  
            
        }        
    }
	
//========================= added by priya 22-08-2022


	   public function View_details()
    {
        
         if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR'  || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age =$this->session->userdata('AGE');
            $id = base64_decode($this->input->get('I'));
            $login_user_id = $this->session->userdata('ID');
            //=====================added by priyanka===============
            $user_info= $this->Operations_user_model->getProfileData($login_user_id);
            $data2['userID']=$user_info->UNIQUE_CODE;
            $data2['showNav'] = 1;
            $data2['age'] = $age;
			$data['USER_TYPE']=$this->session->userdata('USER_TYPE');
            //$data['s'] = $s;
            $dashboard_data =$this->credit_manager_user_model->getDashboardData();  
			$data2['row']=$this->Customercrud_model->getProfileData($login_user_id);
            $data['row']=$this->Customercrud_model->getProfileData($id);
			/*$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
		
			
			  $array1 = array();
	          $i=0;

	        
              foreach($data_coapplicant as $v)
	          {
	          	   $array1[$i]=$v->UNIQUE_CODE;

	          	  // print_r($v);
	          	    
     				$i++;
	          }
			$data['get_coapp_documents'] = $this->credit_manager_user_model->get_get_coapp_documents($array1);
         	*/
			$coapplicants=$this->Dsacustomers_model->getCustomers_coapplicants($id);
			$Get_Doc_Master_Type_Coapplicant_Documents=array();
			  foreach($coapplicants As $coapplicant )
			  {
				 $coapplicant_details=$coapplicant;
				 $coapplicant_documents = $this->Customercrud_model->getDocuments($coapplicant->UNIQUE_CODE);
				 $coapplicant_Get_Doc_Master_Type=$this->Customercrud_model->Get_Doc_Master_Type($coapplicant->UNIQUE_CODE);
				 $coapplicant_documents_all = json_decode(json_encode($coapplicant_details),true);
				 array_push($coapplicant_documents_all,$coapplicant_documents);
				 array_push($coapplicant_documents_all,$coapplicant_Get_Doc_Master_Type);
			  	 array_push($Get_Doc_Master_Type_Coapplicant_Documents,$coapplicant_documents_all);
			  }
			  $data['Coapplicant_Doacuments']=$Get_Doc_Master_Type_Coapplicant_Documents;
	          $data['coapplicants']= $coapplicants;

			$data['sanction_details']=$this->Operations_user_model->getsanctionLetterDetails($id);
			$data['loan_application_documents']=$this->credit_manager_user_model->loan_application_documents($id);
            $data['loan_details']=$this->Operations_user_model->getAplliedLoanDetails($id);
			$data['find_Disbursement_document_approval_data']= $this->credit_manager_user_model->find_Disbursement_document_approval_data($id);
		    $data['disbursement_property_type_documents']=$this->credit_manager_user_model->get_disbursement_property_type_documents();
            $data['disbursement_property_subtype_documents']=$this->credit_manager_user_model->get_disbursement_property_subtype_documents();
            $data['dashboard_data'] = $dashboard_data;
            $data['applicant_id']= $id;
            $this->load->view('dashboard_header', $data2);
            $this->load->view('Disbursement_OPS/view_customers_disbursement_details', $data);  
            
        }        
    }

    public function show_subtypes()
		{
	        $data=array(
			'master_doc_id'=>$this->input->post('master_doc_id'),
			 );
	       
	        $subtypes = $this->credit_manager_user_model->get_disbursement_property_subtype_documents_by_id($data['master_doc_id']);
	      
			$json = array (  
							'subtypes'=>$subtypes,
							  );
						echo json_encode($json); 
        }

//========================= added by priya 23-08-2022

       public function Uplad_documents()
    {
        
         if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR'  || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $id = base64_decode($this->input->get('I'));
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;

            $login_user_id = $this->session->userdata('ID');
			//=====================added by priyanka===============
			$user_info= $this->Operations_user_model->getProfileData($login_user_id);
			$data['userID']=$user_info->UNIQUE_CODE;




            $get_all_disbursement_documents= $this->Operations_user_model->get_all_disbursement_documents($id);
              $data['get_all_disbursement_documents']= $get_all_disbursement_documents;
            $dashboard_data =$this->credit_manager_user_model->getDashboardData();  
            $data['row']=$this->Customercrud_model->getProfileData($id);
            $data['loan_details']=$this->Operations_user_model->getAplliedLoanDetails($id);
            $data['disbursement_property_type_documents']=$this->credit_manager_user_model->get_disbursement_property_type_documents();
            $data['disbursement_property_subtype_documents']=$this->credit_manager_user_model->get_disbursement_property_subtype_documents();
            $data['dashboard_data'] = $dashboard_data;
            $data['applicant_id']= $id;
            $this->load->view('dashboard_header', $data);
            $this->load->view('Disbursement_OPS/upload_customers_disbursement_document', $data);  
            
        }        
    }

    function upload_one_by_one_documents()
    {
    	//echo "hii";
    	//$filename = $_FILES['file']['name'];
    //	print_r($_FILES)    ;
    	$data=array(
			'selected_document_for_uploading'=> $_FILES['file']['name'],
			'selected_document_type_id'=>$this->input->post('selected_document_type_id'),
			'selected_document_type_name'=>$this->input->post('selected_document_type_name'),
			'login_user_unique_code'=>$this->input->post('login_user_unique_code'),
			'applicant_unique_code'=>$this->input->post('applicant_unique_code')
			 );
  

    	//=====================added by priyanka===============
    	    $login_user_id =$data['login_user_unique_code'];
			$user_info= $this->Operations_user_model->getProfileData($login_user_id);
			$login_user_name = $user_info->FN." ".$user_info->LN;

			;
       $customer_id=$data['applicant_unique_code'];
       $uploded_by_user=$data['login_user_unique_code'];
       $document_name=$_FILES['file']['name'];
 	   $customer_details = $this->Customercrud_model->getProfileData($customer_id);
	   $time = time();
	   $dir = $customer_details->ID."/";
       $fileextensionarr = explode(".",$_FILES["file"]["name"]);
       $fileextension = $fileextensionarr[1];
	   $filename = "disbursement_doc_".$time.".".$fileextension;
	   $dirname = "Finserv/customers/Disbursement/";
       $filenamewithdir = $dirname.$filename;
       $correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["file"]["tmp_name"]."";
       exec($correcturl);
       $file_input_arr = array(
						'USER_ID' => $customer_id,
						'DOC_TYPE' =>$document_name,	
						'DOC_NAME' => $filename,
						'DOC_SIZE' =>$_FILES["file"]["size"],
						'DOC_FILE_TYPE' => $_FILES['file']['type'],
						'DOC_MASTER_TYPE' => 'Disbursement Documents',
						'doc_cloud_name' => $filename,
						'doc_cloud_dir' => $dirname,
						'selected_document_for_uploading' => $data['selected_document_for_uploading'],
						'selected_document_type_id' => $data['selected_document_type_id'],
						'selected_document_type_name' => $data['selected_document_type_name'],
						'doc_uploded_by_ID' => $data['login_user_unique_code'],
						'doc_uploded_by_Name' =>$login_user_name,
						'date'=>date('d-m-Y'),
                        'available_type_'=>$this->input->post('available_type_'),
                        'not_available_'=>$this->input->post('not_available_'),
                        'is_pdd_'=>$this->input->post('is_pdd_'),
                        'not_applicable_'=>$this->input->post('not_applicable_')


					);

        if($_FILES["file"]["size"] == '')
         {
         	 $json = array (  
							'status'=>"blank",
							  );
						echo json_encode($json); 
						exit();
         }

       //print_r(	$file_input_arr);
       $check_document =$this->Operations_user_model->check_document($data['selected_document_type_id'],$data['login_user_unique_code']);
       
       if($check_document <= 0)
       {
		   $docid = $this->Customercrud_model->saveDisbursementDocuments($file_input_arr);
		   $json = array (  
							'status'=>"success",
							  );
						echo json_encode($json); 
	   }
	   else
	   {

        if($check_document == 1)
        {
           // echo "one";
            $json = array (  
							'status'=>"exist",
							  );
						echo json_encode($json); 
        }
        else
        {

             $docid = $this->credit_manager_user_model->Update_doc_approval_details($file_input_arr,$data['selected_document_type_id']);
             //echo  $docid ;
           $json = array (  
                            'status'=>"success",
                              );
                        echo json_encode($json); 
        }
	   }
    }

    public function view_Upladed_documents()
    {
    	  if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR'  || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $id = base64_decode($this->input->get('I'));
            $data['showNav'] = 1;
            $data['age'] = $age;
            //$data['s'] = $s;

            $login_user_id = $this->session->userdata('ID');
			//=====================added by priyanka===============
			$user_info= $this->Operations_user_model->getProfileData($login_user_id);
			$data['userID']=$user_info->UNIQUE_CODE;




            $get_all_disbursement_documents= $this->Operations_user_model->get_all_disbursement_documents($id);
              $data['get_all_disbursement_documents']= $get_all_disbursement_documents;
            $dashboard_data =$this->credit_manager_user_model->getDashboardData();  
            $data['row']=$this->Customercrud_model->getProfileData($id);
            $data['loan_details']=$this->Operations_user_model->getAplliedLoanDetails($id);
            $data['disbursement_property_type_documents']=$this->credit_manager_user_model->get_disbursement_property_type_documents();
            $data['disbursement_property_subtype_documents']=$this->credit_manager_user_model->get_disbursement_property_subtype_documents();
            $data['dashboard_data'] = $dashboard_data;
            $data['applicant_id']= $id;
            $this->load->view('dashboard_header', $data);
            $this->load->view('Disbursement_OPS/view_uploded_disbursement_documents', $data);  
            
        } 
    }

   /*  public function view_uploded_disbursement_documents_PG()
            {
     
                $applicant_unique_code=$_POST['applicant_unique_code'];
                echo $applicant_unique_code;
                exit();
                # Read value
                $draw = $_POST['draw'];
                $row = $_POST['start'];
                $rowperpage = $_POST['length']; // Rows display per page
                $columnIndex = $_POST['order'][0]['column']; // Column index
                $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                $searchValue = $_POST['search']['value']; // Search value
                $searchQuery = " ";
                $sel=$this->Admin_model->Get_Total_no_of_Disbursement_documents($applicant_unique_code);
                $totalRecords =$sel;
                $sel=$this->Admin_model->Search_Disbursement_document($searchValue,$applicant_unique_code);
                $totalRecordwithFilter =$sel;
                $sel=$this->Admin_model->Disbursement_document_Data($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$applicant_unique_code);
                $empRecords = $sel;
                $data = array();
                      
                       $data[] = array(
                           "selected_document_type_name"=>$row->selected_document_type_name,
                           
                           
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
 */
                 public function Disbursement_OPS_Pagination()
            {
     
                //$Start_Date=$_POST['Start_Date'];
                //$End_Date=$_POST['End_Date'];
                //$filter_by=$_POST['filter'];
               // $location=$_POST['location'];
                 $applicant_unique_code=$_POST['applicant_unique_code'];
                // echo $applicant_unique_code;
               //  exit();
                # Read value
                $draw = $_POST['draw'];
                $row = $_POST['start'];
                $rowperpage = $_POST['length']; // Rows display per page
                $columnIndex = $_POST['order'][0]['column']; // Column index
                $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                $searchValue = $_POST['search']['value']; // Search value
                $searchQuery = " ";
                $sel=$this->Admin_model->Get_Total_no_of_Disbursement_OPS1($applicant_unique_code);
                $totalRecords =$sel;
                $sel=$this->Admin_model->Search_Disbursement_OPS1($searchValue, $applicant_unique_code);
                $totalRecordwithFilter =$sel;
                $sel=$this->Admin_model->Disbursement_OPS_Data1($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$applicant_unique_code);
                $empRecords = $sel;
               
                $data = array();
                        foreach($empRecords as $row)
                        {
                        	          $link='<a style="margin-left: 8px;" href="'.base_url().'index.php/customer/view_Disbursement_file/'.$row->ID.'" target="_blank" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
								if($row->Approved_status == "Waiver")
										{
											 $waiver='<a style="margin-left: 8px;" href="'.base_url().'index.php/customer/view_Disbursement_file/'.$row->ID.'" target="_blank" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
									
										}
										else
										{
											 $waiver='';
									
										}
					   $data[] = array(
                           "Doc_name"=>$row->selected_document_type_name,
                           "Uploded_on"=>$row->date,
                           "Uploded_by"=>$row->doc_uploded_by_Name,
                            "view"=>$link,
							"Waiver"=> $waiver

                           
                           
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


       public function show_join_subtypes()
		{
	        $data=array(
			'master_doc_id'=>$this->input->post('master_doc_id'),
			'applicant_unique_code'=>$this->input->post('applicant_unique_code'),
			
			 );
	       
	        $present_subtypes = $this->credit_manager_user_model->get_disbursement_property_subtype_documents_by_id_join($data['master_doc_id'],$data['applicant_unique_code']);
            $array1 = array();
	          $i=0;

	        
              foreach($present_subtypes as $v)
	          {
	          	   $array1[$i]=$v->id;

	          	  // print_r($v);
	          	    
     				$i++;
	          }
    	
          if(!empty($array1))
          {
 		   $IDS =$array1;
          }
          else
          {
            $array1=(0);
             $IDS =$array1;
          }
          $not_present_subtypes = $this->credit_manager_user_model->get_disbursement_property_subtype_documents_by_id_join_not_present($data['master_doc_id'],$IDS);
         
			$json = array (  
							'subtypes'=>$present_subtypes,
							'not_present_subtypes'=>$not_present_subtypes,
							  );
						echo json_encode($json); 
        }

        //-------------------------------------------- 26-08-2022

        function Approval_of_document()
    {
        $data=array(
                    'selected_document_type_id'=>$this->input->post('selected_document_type_id'),
                    'selected_document_type_name'=>$this->input->post('selected_document_type_name'),
                    'login_user_unique_code'=>$this->input->post('login_user_unique_code'),
                    'applicant_unique_code'=>$this->input->post('applicant_unique_code'),
                    'available_type_'=>$this->input->post('available_type_'),
                    'not_available_'=>$this->input->post('not_available_'),
                    'not_applicable_'=>$this->input->post('not_applicable_'),
                    'is_pdd_'=>$this->input->post('is_pdd_'),
             );
  
            $login_user_id =$data['login_user_unique_code'];
            $user_info= $this->Operations_user_model->getProfileData($login_user_id);
            $login_user_name = $user_info->FN." ".$user_info->LN;
            $customer_id=$data['applicant_unique_code'];
            $uploded_by_user=$data['login_user_unique_code'];
            $customer_details = $this->Customercrud_model->getProfileData($customer_id);

            if($data['not_applicable_'] == '')
            {
                if($data['available_type_'] == '')
                    {
                         $json = array (  
                            'status'=>"blank",
                              );
                        echo json_encode($json); 
                        exit();
                    }
            }
            else
            {
                
                      $check_document =$this->Operations_user_model->check_document($data['selected_document_type_id'],$data['applicant_unique_code']);
                      if($check_document <= 0)
                      {
                          $file_input_arr = array(
                        'USER_ID' => $customer_id,
                       // 'selected_document_for_uploading' => $data['selected_document_for_uploading'],
                        'selected_document_type_id' => $data['selected_document_type_id'],
                        'selected_document_type_name' => $data['selected_document_type_name'],
                        //'doc_uploded_by_ID' => $data['login_user_unique_code'],
                        //'doc_uploded_by_Name' =>$login_user_name,
                        'date'=>date('d-m-Y'),
                        'available_type_'=>$this->input->post('available_type_'),
                        'not_available_'=>$this->input->post('not_available_'),
                        'is_pdd_'=>$this->input->post('is_pdd_'),
                        'not_applicable_'=>$this->input->post('not_applicable_')
                        );
                        $docid = $this->Customercrud_model->saveDisbursementDocuments($file_input_arr);
                        if($file_input_arr['not_applicable_']== 'no')
                        {
                             $json = array (  
                            'status'=>"saved",
                              );
                             echo json_encode($json); 
                       
                        }
                        else
                        {
                             $json = array (  
                            'status'=>"not_applicable_saved",
                              );
                             echo json_encode($json); 
                       
                        }
                       
                     }
                     else
                     {
                         $updation_data = 
                        array(
                                'available_type_'=>$this->input->post('available_type_'),
                                'not_available_'=>$this->input->post('not_available_'),
                                'is_pdd_'=>$this->input->post('is_pdd_'),
                                'Approved_status'=>"Approved",
                                'Approved_by'=>$login_user_id,
                                'Approved_by_name'=> $login_user_name,
                                ); 
                         $update=$this->credit_manager_user_model->Update_doc_approval_details($updation_data,$data['selected_document_type_id']);
                        $json = array (  
                            'status'=>"success",
                              );
                        echo json_encode($json); 
                     }

                    
                   
            }
           /* $check_document =$this->Operations_user_model->check_document($data['selected_document_type_id']);
            if($check_document <= 0)
             {
                $docid = $this->Customercrud_model->saveDisbursementDocuments($file_input_arr);
                $json = array (  
                            'status'=>"success",
                              );
                        echo json_encode($json); 
             }
             else
             {
                $json = array (  
                            'status'=>"exist",
                              );
                        echo json_encode($json); 
            }*/
    }

    //========================= added by priya 27-08-2022
    public function save_not_available_document_data()
    {
         $data=array(
                    'not_availabale_document_id'=>$this->input->post('not_availabale_document_id'),
                    'not_availabale_document_comments'=>$this->input->post('not_availabale_document_comments'),
                    'selected_document_type_id'=>$this->input->post('selected_document_type_id'),
                    'selected_document_type_name'=>$this->input->post('selected_document_type_name'),
                    'login_user_unique_code'=>$this->input->post('login_user_unique_code'),
                    'applicant_unique_code'=>$this->input->post('applicant_unique_code'),
                    'not_available_'=>$this->input->post('not_available_'),
                     );
            $login_user_id =$data['login_user_unique_code'];
            $user_info= $this->Operations_user_model->getProfileData($login_user_id);
            $login_user_name = $user_info->FN." ".$user_info->LN;

            ;

          $check_document =$this->Operations_user_model->check_document($data['selected_document_type_id'],$data['applicant_unique_code']);
                      if($check_document <= 0)
                      {

                             $updation_data = 

                            array(
                                'USER_ID'=>$this->input->post('applicant_unique_code'),
                                'not_availabale_document_comments'=>$this->input->post('not_availabale_document_comments'),
                                'selected_document_type_id'=>$this->input->post('selected_document_type_id'),
                                'selected_document_type_name'=>$this->input->post('selected_document_type_name'),
                                'doc_uploded_by_ID'=>$this->input->post('login_user_unique_code'),
                                'not_available_'=>$this->input->post('not_available_'),
                                'doc_uploded_by_name'=>$login_user_name,
                                'date'=>date('d-m-Y'),
                                 'not_available_status'=>"Reverted" 
                               
                                );
                             $docid = $this->Customercrud_model->saveDisbursementDocuments($updation_data);
                             $json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json); 
                      }
                      else
                      {
                         $updation_data = 

                            array(
                                  'not_availabale_document_comments'=>$this->input->post('not_availabale_document_comments'),
                                  'not_available_status'=>"Reverted" 

                                 );
                             $update=$this->credit_manager_user_model->Update_doc_approval_details($updation_data,$data['not_availabale_document_id']);
                            $json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json); 
  
                      }
        

       
    }

    function delete_disbursement_document()
    {
         $data=array(
                     'Delete_Document_number'=>$this->input->post('Delete_Document_number'),
                     'Delete_document_name'=>$this->input->post('Delete_document_name')
                     );
          $delete=$this->credit_manager_user_model->delete_disbursement_doc($data['Delete_Document_number']);
         $json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json);
    }
	
	//-------------------------------------------------------------------------- added by priya 30-08-2022
	
	public function Revert_for_not_available_file()
    {
         $data=array(
                    'selected_document_type_id'=>$this->input->post('selected_document_type_id'),
                    'selected_document_type_name'=>$this->input->post('selected_document_type_name'),
                    'login_user_unique_code'=>$this->input->post('login_user_unique_code'),
                    'applicant_unique_code'=>$this->input->post('applicant_unique_code'),
                    'comments_from_cm'=>$this->input->post('comments_from_cm'),
                     );
            $login_user_id =$data['login_user_unique_code'];
            $user_info= $this->Operations_user_model->getProfileData($login_user_id);
            $login_user_name = $user_info->FN." ".$user_info->LN;

            ;
              $updation_data = 

                            array(
                                  'comments_from_cm'=>$this->input->post('comments_from_cm'),
                                  'not_available_status'=>"Changes Done" 

                                 );
                            $update=$this->credit_manager_user_model->Update_doc_approval_details($updation_data,$data['selected_document_type_id']);
                            $json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json); 
  
                      
        

       
    }
	
	//======================== added by priya 01-09-2022
		
	public function Approve_disbursement_application()
	{
		 $data=array(
                     'login_user_unique_code'=>$this->input->post('login_user_unique_code'),
                     'applicant_unique_code'=>$this->input->post('applicant_unique_code'),
                    );
		  $disbursement_property_type_documents=$this->credit_manager_user_model->get_disbursement_property_type_documents();
          $disbursement_property_subtype_documents=$this->credit_manager_user_model->get_disbursement_property_subtype_documents();
		  $show_array=array();
		 
		  foreach ($disbursement_property_type_documents as $master)
		  {	//echo $master->id;
			$master_Type= $master->id;
			$disbursement_property_subtype_documents = $this->credit_manager_user_model->get_disbursement_property_subtype($master_Type);
			
			foreach ($disbursement_property_subtype_documents as $Subtype)
		    {
				$sub= $Subtype->id;
				$sub_name= $Subtype->subtype_document_name;
				$array3=
				array(
				    'ID'=>$sub,
					'sub_name'=>$sub_name
				);
				$find_doc_present_or_not = $this->credit_manager_user_model->find_doc_present_or_not($sub, $data['applicant_unique_code']);
				if(!empty($find_doc_present_or_not))
				{
					//$show_array[$z]=$find_doc_present_or_not;
				}
				else
				{
					 array_push($show_array,$array3);
				}
					
			}	
			
     	  }
		  if(!empty($show_array))
		  {
		         $json = array (  
				            'result'=>"pending",
							'show_array'=>$show_array,
							  );
						echo json_encode($json); 
		  }
		  else
		  {
			  $json = array (  
				            'result'=>"success",
							'show_array'=>$show_array,
							  );
						echo json_encode($json);
		  }
		
    }
    
	public function save_disbursement_approval()
	{
		$data=array(
                     'login_user_unique_code'=>$this->input->post('login_user_unique_code'),
                     'applicant_unique_code'=>$this->input->post('applicant_unique_code'),
					 'approval_remarks'=>$this->input->post('approval_remarks'),
					  'disbursement_date'=>$this->input->post('disbursement_date'),
                    );
					
	    $updation_data =array(
								 'Approved_by'=>$this->input->post('login_user_unique_code'),
								 'User_ID'=>$this->input->post('applicant_unique_code'),
								 'Approval_remarks'=>$this->input->post('approval_remarks'),
								 'disbursement_date'=>$this->input->post('disbursement_date'),
								 'Date'=>date('d-m-Y'),
								);
								
	    $find_Disbursement_document_approval_data= $this->credit_manager_user_model->find_Disbursement_document_approval_data($data['applicant_unique_code']);
		if(!empty($find_Disbursement_document_approval_data))
		{
			   $update=$this->credit_manager_user_model->Update_disbursement_doc_approval_details($data['applicant_unique_code'],$updation_data);
                        $json = array (  
                            'status'=>"updated",
                              );
                        echo json_encode($json);
		}
		else
		{
			$Disbursement_document_approval_data = $this->Customercrud_model->saveDisbursementDocumentApprovalData($updation_data);
                             $json = array (  
                            'status'=>"inserted",
                              );
                             echo json_encode($json); 
		}
		
		
	}
	
	public function cheque_details()
	{
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $id = base64_decode($this->input->get('I'));
            $login_user_id = $this->session->userdata('ID');
            $user_info= $this->Operations_user_model->getProfileData($login_user_id);
            $data['userID']=$user_info->UNIQUE_CODE;
            $data['showNav'] = 1;
            $data['age'] = $age;
           // $data['s'] = $s;
            $dashboard_data =$this->credit_manager_user_model->getDashboardData();  
            $data['row']=$this->Customercrud_model->getProfileData($id);
            $data['loan_details']=$this->Operations_user_model->getAplliedLoanDetails($id);
			$data['sanction_details']=$this->Operations_user_model->getsanctionLetterDetails($id);
			$data['find_Disbursement_document_approval_data']= $this->credit_manager_user_model->find_Disbursement_document_approval_data($id);
			       $data['find_my_disbursement_amounts_data'] = $this->credit_manager_user_model->find_my_disbursement_amounts($id);
		    $data['disbursement_property_type_documents']=$this->credit_manager_user_model->get_disbursement_property_type_documents();
			$data['disbursement_details'] = $this->credit_manager_user_model->find_Disbursement_document_approval_data($id);
            $data['disbursement_property_subtype_documents']=$this->credit_manager_user_model->get_disbursement_property_subtype_documents();
            $data['dashboard_data'] = $dashboard_data;
            $data['applicant_id']= $id;
				//------------------- pre emi ----------------------------------
					$userid = $id;
					$sanction_details=$this->Operations_user_model->getsanctionLetterDetails($userid);
					$total_loan_amount = $sanction_details->total_loan_amount;
					$rate_of_interest = $sanction_details->rate_of_interest;
					$yearlyinterest = $total_loan_amount * $rate_of_interest/100;
					$dailyinterest = $yearlyinterest/360;
					$EMI = $sanction_details->EMI;
					if(!empty($data['disbursement_details']))
					{
					$Sanctioned_date = $data['disbursement_details']->disbursement_date;
					}
					else
					{
						$Sanctioned_date =date('d-m-Y');
					}
					$tenure = $sanction_details->tenure;
					$payment_recived_date = $Sanctioned_date;
					$sanctiondatearr = explode("-",$payment_recived_date);
					$sanctionmonth = $sanctiondatearr[1];
					$nextyear = $sanctiondatearr[0];
					$nextmonth = $sanctiondatearr[1];
					if($sanctiondatearr[2] > 10)
					{
						$nextmonth = (int) ($sanctionmonth+1)%12;
						if($sanctionmonth == 12)
							{
								$nextyear = $nextyear+1;
							}
					}
					else
					{
						$nextmonth = (int)$sanctionmonth;
					}
					if($nextmonth < 10)
					{
						$nextmonth = "0".$nextmonth;
					}
					$nextday = 10;
					
					$row=$this->Customercrud_model->getProfileData($id);
					$data['row'] = $row;
					$data['sanction_details']=$this->Operations_user_model->getsanctionLetterDetails($userid);
					$nextdate = $nextyear."-".$nextmonth."-".$nextday;
					$date1=date_create($payment_recived_date);
					$date2=date_create($nextdate);
					$diff=date_diff($date1,$date2);
					$datediff = $diff->format("%a");
					$preemi = $dailyinterest*$datediff;
					$preemi = number_format((float)$preemi, 2, '.', '');
					
					if($data['sanction_details']->Finale_disbursement_amount != '')
					{
					}
					else
					{
						$total= 0;
						foreach($data['find_my_disbursement_amounts_data'] as $f)
							{

							 if( $f->Cheque_status == "Approved")
							{
								$total= $f->total_amount+ $total;
							}
							else
								{
								  $total= 0 + $total;
									}
							}
						$remaining= ($sanction_details->loan_amount )-$total -1180 -$preemi;
						
						  $values=array(
						   'Finale_disbursement_amount'=>$remaining,
						  );
						  $this->Admin_model->update_processing_fee_details($id,$values);
					}
				
			//--------------------------------------------------------------
            $this->load->view('dashboard_header', $data);
            $this->load->view('Disbursement_OPS/Disbursement_Cheque_details', $data);  
            
        }   
	}
	//======================= added by priya 02-09-2022
	 
    public function Submit_Processing_fee_details()
    {
        
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('SITE') != 'finserv')
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
            //$data['s'] = $s;
            $data['userType']=$this->session->userdata("USER_TYPE");
          
            $customer_id = $this->input->post('customer_id');
            $customer_info = $this->Customercrud_model->getProfileData($customer_id);
            $data['customer_info']=$customer_info;
            $mode_of_payment = $this->input->post('mode_of_payment');
            $values=array(
				'User_ID'=> $customer_id,
                'mode_of_payment'=>$mode_of_payment,
            );
            $this->credit_manager_user_model->update_disbursement_checque_details($values);
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
            	$cheque_doc =$_FILES["cheque_doc"]["name"];


            	$payment_data=array(

            		'mode_of_payment'=>$mode_of_payment,
            		'account_holder_name'=>$account_holder_name,
            		'IFSC_code'=>$IFSC_code,
            		'branch_name'=>$branch_name,
            		'checque_bank_name'=>$bank_name,
            		'cheque_number'=>$cheque_number,
            		'account_type'=>$account_type,
            		'payment_recived_date'=>$payment_recived_date

            	);
            	  $this->credit_manager_user_model->update_disbursement_checque_details($payment_data);


                if(!empty($cheque_doc))
                {
            	   $time = time();
            	   $document_name="DISBURSEMENT CHEQUE";
				   $dir = $customer_info->ID."/";
			       $fileextensionarr = explode(".",$_FILES["cheque_doc"]["name"]);
			       $fileextension = $fileextensionarr[1];
				   $filename = "Disbursement_payment_cheque".$time.".".$fileextension;
				   $dirname = "Finserv/customers/".$dir;
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
				$cheque_doc =$_FILES["cheque_doc"]["name"];

				$payment_data=array(

            		'Transaction_id'=>$Transaction_id,
            		'payment_recived_date'=>$payment_recived_date,
            		'transaction_throught'=>$transaction_throught,

            	);
            	//$this->Admin_model->update_processing_fee_details($customer_id,$payment_data);
				 $this->credit_manager_user_model->update_disbursement_checque_details($payment_data);

            	 if(!empty($cheque_doc))
                {
            	   $time = time();
            	   $document_name="DISBURSEMENT CHEQUE";
				   $dir = $customer_info->ID."/";
			       $fileextensionarr = explode(".",$_FILES["cheque_doc"]["name"]);
			       $fileextension = $fileextensionarr[1];
				   $filename = "Disbursement_payment_cheque".$time.".".$fileextension;
				   $dirname = "Finserv/customers/".$dir;
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
           // $this->Admin_model->update_processing_fee_details($customer_id,$values);
		   	 $this->credit_manager_user_model->update_disbursement_checque_details($values);
		   
          

            
        }
    }
  //================================================================================
  function save_disbursement_amount_details()
    {
		$id=$this->input->post('applicant_unique_code');
		$sanction_details=$this->Operations_user_model->getsanctionLetterDetails($id);
		$loan_amount=$this->input->post('total_amount');
		if($sanction_details->total_loan_amount <= $loan_amount )	
		{
			 $json = array (  
                            'status'=>"loan_amount_error",
                              );
                             echo json_encode($json); 
							 exit();
		}
		
    	$mode_of_payment = $this->input->post('mode_of_payment');
		
		//echo $_FILES["file"]["name"];
				if($mode_of_payment == 'CHEQUE')
				{
					$data=array(
					'login_user_unique_code'=>$this->input->post('login_user_unique_code'),
					'applicant_unique_code'=>$this->input->post('applicant_unique_code'),
					'customer_name'=>$this->input->post('customer_name'),
					'bank_name'=>$this->input->post('bank_name'),
					'cheque_number'=>$this->input->post('cheque_number'),
					'account_type'=>$this->input->post('account_type'),
					'total_amount_'=>$this->input->post('total_amount'),//
					'amount_handover_date'=>$this->input->post('amount_handover_date'),
					
					 );
					 $cheque_number=$this->input->post('cheque_number');
					 $len= strlen($cheque_number);
					 if($len!=6)
					 {
						  $json = array (  
                            'status'=>"Invalid_cheque_number",
                              );
                             echo json_encode($json); 
							 exit();
					 }
					 
								
		  
				}
				else if($mode_of_payment == 'UPI_NEFT_RTGS')
				{
					
					$data=array(
					'login_user_unique_code'=>$this->input->post('login_user_unique_code'),
					'applicant_unique_code'=>$this->input->post('applicant_unique_code'),
					'transaction_throught'=>$this->input->post('transaction_throught'),
					'Transaction_id'=>$this->input->post('Transaction_id'),
					'total_amount_'=>$this->input->post('total_amount'),//
					'amount_handover_date'=>$this->input->post('amount_handover_date'),
				
					 );
		  
				}
            
			if(!empty($_FILES['file']['name']))
			{
				
    	    $login_user_id =$data['login_user_unique_code'];
			//echo  $login_user_id;
			$user_info= $this->Operations_user_model->getProfileData($login_user_id);
			//print_r($user_info);
			$login_user_name = $user_info->FN." ".$user_info->LN;
            $customer_id=$data['applicant_unique_code'];
	        $uploded_by_user=$data['login_user_unique_code'];
			$document_name=$_FILES['file']['name'];
			$customer_details = $this->Customercrud_model->getProfileData($customer_id);
			$time = time();
			$dir = $customer_details->ID."/";
			$dirname = "Finserv/customers/".$dir;
						 $curlurl = "curl -X MKCOL -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
						  exec($curlurl);
					 
	        $fileextensionarr = explode(".",$_FILES["file"]["name"]);
			$fileextension = $fileextensionarr[1];
			$filename = "disbursement_amount_doc".$time.".".$fileextension;
			$dirname = "Finserv/customers/".$dir;
			$filenamewithdir = $dirname.$filename;
			$correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["file"]["tmp_name"]."";
			exec($correcturl);
    	    $file_input_arr = array(
						'USER_ID' => $customer_id,
						'DOC_TYPE' =>'DISBURSEMENT AMOUNT ATTACHMENTS',	
						'DOC_NAME' => $filename,
						'DOC_SIZE' => $_FILES['file']['size'],
						'DOC_FILE_TYPE' => $_FILES['file']['type'],
						'DOC_MASTER_TYPE' => 'DISBURSEMENT AMOUNT ATTACHMENTS',
						'doc_cloud_name' => $filename,
						'doc_cloud_dir' => $dirname,
						'DOC_UPLOAD_DATE'=>date("d/m/Y"),
								);
			$docid = $this->Customercrud_model->saveDocuments($file_input_arr);
			}
			else
			{
				$docid= '';
			}
			
			if($mode_of_payment == 'CHEQUE')
			{
				$data_for_insert=array(
					'User_ID'=>$data['applicant_unique_code'],
					'mode_of_payment'=>$mode_of_payment,
					'checque_bank_name'=>$data['bank_name'],
					'cheque_number'=>$data['cheque_number'],
					'account_type'=>$data['account_type'],
					'transaction_throught'=>$mode_of_payment,
					'date'=>date("d/m/Y"),
					'details_added_by'=>$data['login_user_unique_code'],
					'customer_name'=>$data['customer_name'],
					'total_amount'=>$data['total_amount_'],
					'amount_handover_date'=>$data['amount_handover_date'],
					'document_inserted_id'=>$docid,
					'Cheque_status'=>'applied',
					 );
			}
			else if($mode_of_payment == 'UPI_NEFT_RTGS')
			{
				$data_for_insert=array(
					'User_ID'=>$data['applicant_unique_code'],
					'mode_of_payment'=>$mode_of_payment,
					'Transaction_id'=>$data['Transaction_id'],
					'transaction_throught'=>$data['transaction_throught'],
					'date'=>date("d/m/Y"),
					'details_added_by'=>$data['login_user_unique_code'],
					'total_amount'=>$data['total_amount_'],
					'amount_handover_date'=>$data['amount_handover_date'],
					'document_inserted_id'=>$docid,
					'Cheque_status'=>'applied',
					 );
			}
			
		
			//==============================================send email to accounts
			            $credit_manager_info= $this->Operations_user_model->getProfileData($data['login_user_unique_code']);
						$customer_info = $this->Operations_user_model->getProfileData($data['applicant_unique_code']);
						$getCustomerSanction_letter_details=  $this->credit_manager_user_model->getCustomerSanction_letter_details($data['applicant_unique_code']);
						//$data['disbursement_details'] = $this->credit_manager_user_model->find_my_disbursement_amounts($data['applicant_unique_code']);
						
						$customer_name =$customer_info->FN." ".$customer_info->LN;
						$config['protocol']='smtp';
						$config['smtp_host']='smtp-relay.sendinblue.com';
						$config['smtp_port']='587';
						$config['smtp_crypto']='tls';
						$config['smtp_user']='flconnect@finaleap.com';
						$config['smtp_pass']='Qns9hEpIMJVwUFgZ'; 
						$from_email = "infoflfinserv@finaleap.com";
						$config['charset']='utf-8';
						$config['newline']="\r\n";
						$config['wordwrap'] = TRUE;
						$config['mailtype'] = 'html';
						$this->email->initialize($config);
						$this->email->set_newline("\r\n");
						$this->email->from($from_email, 'Finaleap Finserv');
						//$CM_MAil=$credit_manager_info->EMAIL;
                       //$send_email_to_3_HR='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com,vipul@finaleap.com,sachin.kardile@finaleap.com,'.$CM_MAil.',sunil.kalan@finaleap.com';
						$send_email_to_3_HR="piyuabdagire@gmail.com";
						$this->email->to($send_email_to_3_HR);
						$this->email->bcc('info@finaleap.com');
							$mail_data['added_by']= $credit_manager_info->FN." ".$credit_manager_info->LN;
						    $mail_data['Amount']=$data['total_amount_'];
							$mail_data['ModeOfPayment']=$mode_of_payment;
							$mail_data['PayeeName']=$data['customer_name'];
							if($mode_of_payment == 'CHEQUE')
		            	{
							
							$mail_data['PayeeBankName']=$data['bank_name'];
							$mail_data['AccountChequeNumber']=$data['cheque_number'];
							$mail_data['AccountType']=$data['account_type'];
							$mail_data['AmountHandoverDate']=$data['amount_handover_date'];
						
						}
						else
						{
							$mail_data['AmountHandoverDate']=$data['amount_handover_date'];
							$mail_data['transaction_throught']=$data['transaction_throught'];
							$mail_data['TransactionID']=$data['Transaction_id'];
					    }
						$this->email->subject('Disbursement Cheque/NEFT Approval Request For Customer :  '. $customer_name .''); 
						$mailContent = $this->load->view('templates/Disbursement_cheque_added',$mail_data,true);
						$this->email->message($mailContent); 
						if($this->email->Send())
						{
							$inserted_id = $this->Customercrud_model->saveDisbursementAmountData($data_for_insert);
							if(!empty($inserted_id))
								{
									 $json = array (  
												'status'=>"success",
												  );
												 echo json_encode($json); 
								}
								else
								{
									 $json = array (  
												'status'=>"error",
												  );
												 echo json_encode($json); 
								}
			
						}
						else
						{
							$json = array (  
											'status'=>"error",
										  );
									 echo json_encode($json); 
						}
							
			//=====================================================================
			
			
			
			
			
			
			
			
			
			
			
			
			
		
	
       
    }
	
	public function find_my_disbursement_amounts()
	{
		 $data=array(
				'applicant_unique_code'=>$this->input->post('applicant_unique_code')			
			 );
	       
	        $find_my_disbursement_amounts_data = $this->credit_manager_user_model->find_my_disbursement_amounts($data['applicant_unique_code']);
        //  print_r( $find_my_disbursement_amounts_data);
			$json = array (  
							'find_my_disbursement_amounts_data'=>$find_my_disbursement_amounts_data,
						  );
						echo json_encode($json); 
	}
	//===================================== 06-09-2022
	public function Loan_Aggrement()
	{
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $id = base64_decode($this->input->get('I'));
            $login_user_id = $this->session->userdata('ID');
            $user_info= $this->Operations_user_model->getProfileData($login_user_id);
            $data['userID']=$user_info->UNIQUE_CODE;
            $data['showNav'] = 1;
            $data['age'] = $age;
           // $data['s'] = $s;
            $dashboard_data =$this->credit_manager_user_model->getDashboardData();  
            $data['row']=$this->Customercrud_model->getProfileData($id);
            $data['loan_details']=$this->Operations_user_model->getAplliedLoanDetails($id);
			$data['sanction_details']=$this->Operations_user_model->getsanctionLetterDetails($id);
	        $data['disbursement_agreement_details']=$this->Operations_user_model->get_disbursement_agreement_details($id);
	
            $data['dashboard_data'] = $dashboard_data;
            $data['applicant_id']= $id;
            $this->load->view('dashboard_header', $data);
            $this->load->view('Disbursement_OPS/Disbursement_loan_agreement', $data);  
            
        }   
	}

    public function Loan_Aggrement_main_pdf()
    {
		$id = base64_decode($this->input->get('I'));
	    $data['row']=$this->Customercrud_model->getProfileData($id);
        $data['loan_details']=$this->Operations_user_model->getAplliedLoanDetails($id);
		$data['sanction_details']=$this->Operations_user_model->getsanctionLetterDetails($id);
		$data['disbursement_agreement_details']=$this->Operations_user_model->get_disbursement_agreement_details($id);
	    $data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
		   $data['data_row_PD_details']=$data_row_pd_table;
	    $co_app = $this->Customercrud_model->getMyCoapplicants($id);
		$data['coapplicants'] = $co_app;
		$get_pd_images = $this->credit_manager_user_model->get_pd_images($id);
								   if(!empty( $get_pd_images))
								   {
								     $data['get_pd_images'] =$get_pd_images;
								   }
								   else 
								   {
									 $data['get_pd_images'] =array();   
								   }
	
                             
         include("./vendor/autoload.php");
		 $mpdf = new \Mpdf\Mpdf([
           'setAutoTopMargin' => 'stretch',
           'autoMarginPadding' => 10,
           'orientation' => 'P'
		  ]);
		  $arrContextOptions=array(
           "ssl"=>array(
               "verify_peer"=>false,
               "verify_peer_name"=>false,
            ),
          );  
		   $mpdf->curlAllowUnsafeSslRequests = true;
         //  $mpdf->SetHTMLHeader($this->load->view('Disbursement_OPS/agreement_header',$data,true));
         //$mpdf->SetHTMLHeader($this->load->view('credit_manager_user/Sanction_Footer',$data,true));
       //   $mpdf->SetHTMLFooter($this->load->view('credit_manager_user/Sanction_header',[],true));
          $mpdf->SetDisplayMode('fullwidth');
	      $mpdf->debug = true;
          $mpdf->AddPage('P');
          $stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
          $stylesheet.= file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));
	      $mpdf->allow_charset_conversion = true;
          $mpdf->WriteHTML($stylesheet,1);
          $mpdf->list_indent_first_level = 0;
          $html = $this->load->view('Disbursement_OPS/agreement_pdf',$data,true);
          $mpdf->WriteHTML($html);
         // $file_name=md5(rand()).'pdf';
		  //	ob_end_clean();
          $file=$mpdf->Output();
        
    }
	
	public function submit_Loan_agreement_forms()
	{
		$section_name= $this->input->post('section_name');
		$login_user_unique_code =$this->input->post('login_user_unique_code') ;
		$applicant_unique_code =$this->input->post('applicant_unique_code') ;
		
		if($section_name == 'shedule')
		{
			        $data1=array(
              		 'place_and_date_of_loan_agreement'=>$this->input->post('place_and_date_of_loan_agreement'),
					 'loan_ac_no'=>$this->input->post('loan_ac_no'), 
					 'place'=>$this->input->post('place'),
					 'application_no'=>$this->input->post('application_no'),
					 'date'=>$this->input->post('date'),
					 'product'=>$this->input->post('product'),
					 'amount_of_loan'=>$this->input->post('amount_of_loan'),
					 'rate_1'=>$this->input->post('rate_1'),
					 'rate_2'=>$this->input->post('rate_2'),
					 'rate_3'=>$this->input->post('rate_3'),
					 'EMI'=>$this->input->post('EMI'),
					 'terms'=>$this->input->post('terms'),
					 'Commencement_date'=>$this->input->post('Commencement_date'),
					 'discription_of_property'=>$this->input->post('discription_of_property')
                    );
					$shedule_JSON = json_encode($data1);
					
					$agreement_data = array(
									'customer_ID' =>$applicant_unique_code,
									'submitted_by' => $login_user_unique_code,
									'shedule_JSON' =>$shedule_JSON,
									'generated_date' =>date('d-m-Y'),
										   );
				
					 
		}
		
		else if($section_name == 'acknowledgement')
		{
			$data2=array(
              		 'Received_amount'=>$this->input->post('Received_amount'),
					 'Recived_amount_text'=>$this->input->post('Recived_amount_text'), 
					 'Electronic_Transfer'=>$this->input->post('Electronic_Transfer'),
					 'dated'=>$this->input->post('dated'),
					 'drawn_on'=>$this->input->post('drawn_on'),
					 'Favouring'=>$this->input->post('Favouring'),
					 
                    );
			$acknowledgement_JSON = json_encode($data2);
			$agreement_data = array(
									'customer_ID' =>$applicant_unique_code,
									'submitted_by' => $login_user_unique_code,
							    	'acknowledgement_JSON' =>$acknowledgement_JSON,
									
								   );
		}
		else if($section_name == 'demand_note')
		{
			$data3=array(
              		 'on_demand_name'=>$this->input->post('on_demand_name'),
					   );
					$demand_note_JSON = json_encode($data3);
					$agreement_data = array(
									'customer_ID' =>$applicant_unique_code,
									'submitted_by' => $login_user_unique_code,
									'demand_note_JSON' =>$demand_note_JSON,
								
								   );
								   
		}
		else if($section_name == 'dp_note')
		{
			$data4=array(
              		
					   );
					$dp_note_JSON = json_encode($data4);
					$agreement_data = array(
									'customer_ID' =>$applicant_unique_code,
									'submitted_by' => $login_user_unique_code,
								
									'dp_note_JSON' =>$dp_note_JSON,
									
								   );
		}
		else if($section_name == 'borrower_letter')
		{
			$data5=array(
              		    'finaleap_branch_name' =>$this->input->post('finaleap_branch_name'),
					   );
					$borrower_letter_JSON = json_encode($data5);
					$agreement_data = array(
									'customer_ID' =>$applicant_unique_code,
									'submitted_by' => $login_user_unique_code,
									
									'borrower_letter_JSON' =>$borrower_letter_JSON,
									
								   );
		}
		else if($section_name == 'disbursal_request')
		{
				$data6=array(
              		 'bank_name'=>$this->input->post('bank_name'),
					 'account_number'=>$this->input->post('account_number'),
					 'Favouring'=>$this->input->post('Favouring2'),
					   );
			    $disbursal_request_JSON = json_encode($data6);
				$agreement_data = array(
									'customer_ID' =>$applicant_unique_code,
									'submitted_by' => $login_user_unique_code,
									
									'disbursal_request_JSON' =>$disbursal_request_JSON,
									'generated_date' =>date('d-m-Y'),
									'Status' =>'Completed',
								   );
		}
		
		
		$find_my_disbursement_agreement_data = $this->credit_manager_user_model->find_my_disbursement_agreement_data($applicant_unique_code);
		if(!empty($find_my_disbursement_agreement_data ))
		{
			$updated_data= $this->credit_manager_user_model->update_my_disbursement_agreement_data($applicant_unique_code,$agreement_data);
			if(!empty($updated_data))
			{
				$json = array (  
							'status'=>'updated',
							'submitted_section'=>$section_name
						  );
						echo json_encode($json); 
			}
			else
			{
				$json = array (  
							'status'=>'error',
						  );
						echo json_encode($json); 
			}
			
		}
		else
		{
			$inserted_data= $this->credit_manager_user_model->save_my_disbursement_agreement_data($agreement_data);
			if(!empty($inserted_data))
			{
				$json = array (  
							'status'=>'inserted',
							'submitted_section'=>$section_name
						  );
						echo json_encode($json); 
			}
			else
			{
				$json = array (  
							'status'=>'error',
						  );
						echo json_encode($json); 
			}
			
			
			
		}
		
        
		
			
	}
	
	
	
	public function Loan_Aggrement_AUTO()
    {
		$id = base64_decode($this->input->get('I'));
	    $data['row']=$this->Customercrud_model->getProfileData($id);
        $data['loan_details']=$this->Operations_user_model->getAplliedLoanDetails($id);
		$data['sanction_details']=$this->Operations_user_model->getsanctionLetterDetails($id);
		$data['data_row_more']= $this->credit_manager_user_model->getProfileDataMore($id);	
			
		$data['disbursement_agreement_details']=$this->Operations_user_model->get_disbursement_agreement_details($id);
	    $data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
		   $data['data_row_PD_details']=$data_row_pd_table;
	    $co_app = $this->Customercrud_model->getMyCoapplicants($id);
		$data['coapplicants'] = $co_app;
		$get_pd_images = $this->credit_manager_user_model->get_pd_images($id);
								   if(!empty( $get_pd_images))
								   {
								     $data['get_pd_images'] =$get_pd_images;
								   }
								   else 
								   {
									 $data['get_pd_images'] =array();   
								   }
	
                             
         include("./vendor/autoload.php");
		 $mpdf = new \Mpdf\Mpdf([
           'setAutoTopMargin' => 'stretch',
           'autoMarginPadding' => 10,
           'orientation' => 'P'
		  ]);
		  $arrContextOptions=array(
           "ssl"=>array(
               "verify_peer"=>false,
               "verify_peer_name"=>false,
            ),
          );  
		   $mpdf->curlAllowUnsafeSslRequests = true;
         //  $mpdf->SetHTMLHeader($this->load->view('Disbursement_OPS/agreement_header',$data,true));
         //$mpdf->SetHTMLHeader($this->load->view('credit_manager_user/Sanction_Footer',$data,true));
       //   $mpdf->SetHTMLFooter($this->load->view('credit_manager_user/Sanction_header',[],true));
          $mpdf->SetDisplayMode('fullwidth');
	      $mpdf->debug = true;
          $mpdf->AddPage('P');
          $stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
          $stylesheet.= file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));
	      $mpdf->allow_charset_conversion = true;
          $mpdf->WriteHTML($stylesheet,1);
          $mpdf->list_indent_first_level = 0;
          $html = $this->load->view('Disbursement_OPS/Disbursement_loan_agreement_AUTO',$data,true);
		 //   $html = $this->load->view('Disbursement_OPS/agreement_pdf',$data,true);
          $mpdf->WriteHTML($html);
         // $file_name=md5(rand()).'pdf';
		  //	ob_end_clean();
          $file=$mpdf->Output();
        
    }
	
	
	//======================================= added by priya 15-09-2022
	 public function save_pdd_date()
    {
         $data=array(
                    'not_availabale_document_id'=>$this->input->post('not_availabale_document_id'),
                    'not_availabale_document_comments'=>$this->input->post('not_availabale_document_comments'),
                    'selected_document_type_id'=>$this->input->post('selected_document_type_id'),
                    'selected_document_type_name'=>$this->input->post('selected_document_type_name'),
                    'login_user_unique_code'=>$this->input->post('login_user_unique_code'),
                    'applicant_unique_code'=>$this->input->post('applicant_unique_code'),
                    'is_pdd_'=>$this->input->post('is_pdd_'),
					'pdd_date'=>$this->input->post('pdd_date'),
                     );
            $login_user_id =$data['login_user_unique_code'];
            $user_info= $this->Operations_user_model->getProfileData($login_user_id);
            $login_user_name = $user_info->FN." ".$user_info->LN;
            
         $check_document =$this->Operations_user_model->check_document($data['selected_document_type_id'],$data['applicant_unique_code']);
                      if($check_document <= 0)
                      {
						 
                            $updation_data = 
                            array(
                                'USER_ID'=>$this->input->post('applicant_unique_code'),
                                'selected_document_type_id'=>$this->input->post('selected_document_type_id'),
                                'selected_document_type_name'=>$this->input->post('selected_document_type_name'),
                                'doc_uploded_by_ID'=>$this->input->post('login_user_unique_code'),
                                'is_pdd_'=>$this->input->post('is_pdd_'),
								'pdd_date'=>$this->input->post('pdd_date'),
                                'doc_uploded_by_name'=>$login_user_name,
                                'date'=>date('d-m-Y'),
                                 );
                            // $docid = $this->Customercrud_model->saveDisbursementDocuments($updation_data);
							 //$update=$this->credit_manager_user_model->Update_doc_approval_details($updation_data,$data['not_availabale_document_id']);
                             $Disbursement_document_approval_data = $this->Customercrud_model->saveDisbursementDocuments($updation_data);
                             $json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json); 
                      }
					  else
					  {
						  
						    $updation_data = 
                            array(
                                'USER_ID'=>$this->input->post('applicant_unique_code'),
                                'selected_document_type_id'=>$this->input->post('selected_document_type_id'),
                                'selected_document_type_name'=>$this->input->post('selected_document_type_name'),
                                'doc_uploded_by_ID'=>$this->input->post('login_user_unique_code'),
                                'is_pdd_'=>$this->input->post('is_pdd_'),
								'pdd_date'=>$this->input->post('pdd_date'),
                                'doc_uploded_by_name'=>$login_user_name,
                                'date'=>date('d-m-Y'),
                                 );
                             //$docid = $this->Customercrud_model->saveDisbursementDocuments($updation_data);
							 $update=$this->credit_manager_user_model->Update_doc_approval_details($updation_data,$data['not_availabale_document_id']);
                             //$Disbursement_document_approval_data = $this->Customercrud_model->saveDisbursementDocumentApprovalData($updation_data);
                             $json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json); 
					  }
                       
    }
	
	
	public function delete_cheque_entry()
	{
		 $data=array(
				'id'=>$this->input->post('id')			
			 );
	      
	        $delete_cheque = $this->credit_manager_user_model->delete_cheque($data['id']);
	         $json = array (  
							'status'=>"success",
						  );
						echo json_encode($json); 
	}
	
	//=============================== added by priya  22-09-2022
	 public function save_status_for_document()
    {
		
         $data=array(
                    'doc_id'=>$this->input->post('doc_id'),
                    'status_for_document'=>$this->input->post('status_for_document'),
                    );
					
					//print_r( $data);
				//	exit();
					
		 $updation_data = array(
		            'Disbursement_ststus' =>$data['status_for_document'],
					//'Disbursement_ststus_comments' =>$data['Disbursement_ststus_comments']
		 );
         $update=$this->credit_manager_user_model->Update_save_status_for_documentdoc_approval_details($updation_data,$data['doc_id']);
                             
         
					$json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json); 
					  
                       
    }
	
	
	 public function save_comments_for_document()
    {
		
         $data=array(
                    'reject_loan_document_comment'=>$this->input->post('reject_loan_document_comment'),
                    'reject_loan_document_comment_id'=>$this->input->post('reject_loan_document_comment_id'),
                    );
						
		 $updation_data = array(
		            'Disbursement_ststus_comments' =>$data['reject_loan_document_comment'],
					'Disbursement_ststus' =>"Reject",
					
		 );
         $update=$this->credit_manager_user_model->Update_save_status_for_documentdoc_approval_details($updation_data,$data['reject_loan_document_comment_id']);
                             
         
					$json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json); 
					  
                       
    }
	
	//-----------------------------added by priya 23-09-2022
	 public function save_Waiver_comments_for_document()
    {
		
         $data=array(
                    'Waiver_loan_document_comment'=>$this->input->post('Waiver_loan_document_comment'),
                    'Waiver_loan_document_comment_id'=>$this->input->post('Waiver_loan_document_comment_id'),
					'login_user_unique_code'=>$this->input->post('login_user_unique_code'),
					'applicant_unique_code'=>$this->input->post('applicant_unique_code'),
                    );
						
		/* $updation_data = array(
		            'Disbursement_ststus_comments' =>$data['reject_loan_document_comment'],
					'Disbursement_ststus' =>"Reject",
					
		 );
         $update=$this->credit_manager_user_model->Update_save_status_for_documentdoc_approval_details($updation_data,$data['reject_loan_document_comment_id']);
                             
         
					$json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json); */
		if(!empty($_FILES['file']['name']))
		{
			$login_user_id =$data['login_user_unique_code'];
			//echo  $login_user_id;
			$user_info= $this->Operations_user_model->getProfileData($login_user_id);
			//print_r($user_info);
			$login_user_name = $user_info->FN." ".$user_info->LN;
			$customer_id=$data['applicant_unique_code'];
			$uploded_by_user=$data['login_user_unique_code'];
			$document_name=$_FILES['file']['name'];
			$customer_details = $this->Customercrud_model->getProfileData($customer_id);
			$time = time();
			$dir = $customer_details->ID."/";
			$dirname = "Finserv/customers/".$dir;
			$curlurl = "curl -X MKCOL -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
			exec($curlurl);
			$fileextensionarr = explode(".",$_FILES["file"]["name"]);
			$fileextension = $fileextensionarr[1];
			$filename = "disbursement_amount_doc".$time.".".$fileextension;
			$dirname = "Finserv/customers/".$dir;
			$filenamewithdir = $dirname.$filename;
			$correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["file"]["tmp_name"]."";
			exec($correcturl);
			    $file_input_arr = array(
			    'Disbursement_ststus' =>"Waiver",
				'Waiver_loan_document_comment'=>$data['Waiver_loan_document_comment'],
				'Waiver_doc_cloud_name' => $filename,
				'Waiver_doc_cloud_dir' => $dirname,
				'Waiver_DOC_UPLOAD_DATE'=>date("d/m/Y"),
				'Waiver_DOC_UPLOADED_BY'=>$data['login_user_unique_code']
				);
		}
		else
		{
			   $file_input_arr = array(
			    'Disbursement_ststus' =>"Waiver",
				'Waiver_loan_document_comment'=>$data['Waiver_loan_document_comment'],
			    'Waiver_DOC_UPLOADED_BY'=>$data['login_user_unique_code']
				);
		}
			$update=$this->credit_manager_user_model->Update_save_status_for_documentdoc_approval_details($file_input_arr,$data['Waiver_loan_document_comment_id']);
            $json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json);
					  
                       
    }
	
	//=========================================================== added by priya 08-10-2022
	public function save_existing_doc_status()
    {
		
         $data=array(
                    'existing_doc_ID'=>$this->input->post('existing_doc_ID'),
                    'existing_doc_status'=>$this->input->post('existing_doc_status'),
					'comments'=>$this->input->post('comments'),
					'customer_id'=>$this->input->post('customer_id'),
				     'login_user_unique_code'=>$this->input->post('login_user_unique_code'),
                    );
				
				 if(!empty($_FILES['file']['name']))
				{
					$id = $this->input->post('customer_id');
					$dirname = "Finserv/waiver_documents/".$id;
					   $curlurl = "curl -X MKCOL -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
						exec($curlurl);
						$time = time();
						$fileextensionarr = explode(".",$_FILES["file"]["name"]);
						$fileextension = $fileextensionarr[1];
						$filename = $time.".".$fileextension;
						$dirname = "Finserv/waiver_documents/".$id."/";
						$filenamewithdir = $dirname.$filename;
						$correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["file"]["tmp_name"]."";
						exec($correcturl);
						 $file_input_arr = array(
							'Disbursement_ststus' =>$data['existing_doc_status'],
							'Disbursement_ststus_comments'=>$data['comments'],
							'Waiver_doc_cloud_name' => $filename,
							'Waiver_doc_cloud_dir' => $dirname,
							'Waiver_DOC_UPLOAD_DATE'=>date("d/m/Y"),
							'Waiver_DOC_UPLOADED_BY'=>$data['login_user_unique_code']
							);
				}
				else
				{
					 $file_input_arr = array(
					'Disbursement_ststus' =>$data['existing_doc_status'],
					'Disbursement_ststus_comments'=>$data['comments'],
					'Waiver_DOC_UPLOADED_BY'=>$data['login_user_unique_code']
				);
				}
		
	
         $update=$this->credit_manager_user_model->Update_save_status_for_documentdoc_approval_details($file_input_arr,$data['existing_doc_ID']);
     	 $json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json); 
					  
                       
    }
	public function save_report_doc_status()
    {
		
         $data=array(
                    'report_doc_id'=>$this->input->post('report_doc_id'),
                    'report_doc_status'=>$this->input->post('report_doc_status'),
					'comments_for_report'=>$this->input->post('comments_for_report'),
					'customer_id'=>$this->input->post('customer_id'),
				     'login_user_unique_code'=>$this->input->post('login_user_unique_code'),
                    );
					
		$file_input_arr = array(
					'Disbursement_ststus' =>$data['report_doc_status'],
					'Disbursement_ststus_comments'=>$data['comments_for_report'],
					'Waiver_DOC_UPLOADED_BY'=>$data['login_user_unique_code']
					);
				
					
	
         $update=$this->credit_manager_user_model->Update_save_report_approval_details($file_input_arr,$data['report_doc_id']);
     	 $json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json); 
					  
                       
    }
	
	//============================ added by priya 10-10-2022
		 public function save_waiver_data()
    {
         $data=array(
                    
                    'selected_document_type_id'=>$this->input->post('selected_document_type_id'),
                    'selected_document_type_name'=>$this->input->post('selected_document_type_name'),
                    'login_user_unique_code'=>$this->input->post('login_user_unique_code'),
                    'applicant_unique_code'=>$this->input->post('applicant_unique_code'),
                    'Waiver_loan_document_comment'=>$this->input->post('Waiver_loan_document_comment'),
				
                     );
            $login_user_id =$data['login_user_unique_code'];
            $user_info= $this->Operations_user_model->getProfileData($login_user_id);
            $login_user_name = $user_info->FN." ".$user_info->LN;
             if(!empty($_FILES['file']['name']))
				{
					$id = $login_user_id;
					$dirname = "Finserv/waiver_documents/".$id;
					   $curlurl = "curl -X MKCOL -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
						exec($curlurl);
						$time = time();
						$fileextensionarr = explode(".",$_FILES["file"]["name"]);
						$fileextension = $fileextensionarr[1];
						$filename = $time.".".$fileextension;
						$dirname = "Finserv/waiver_documents/".$id."/";
						$filenamewithdir = $dirname.$filename;
						$correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["file"]["tmp_name"]."";
						exec($correcturl);
					
				}
         $check_document =$this->Operations_user_model->check_document($data['selected_document_type_id'],$data['applicant_unique_code']);
                      if($check_document <= 0)
                      {
						 
                            $updation_data = 
                            array(
                                'USER_ID'=>$this->input->post('applicant_unique_code'),
                                'selected_document_type_id'=>$this->input->post('selected_document_type_id'),
                                'selected_document_type_name'=>$this->input->post('selected_document_type_name'),
                                'doc_uploded_by_ID'=>$this->input->post('login_user_unique_code'),
                                'is_waiver_'=>$this->input->post('is_waiver_'),
								'Waiver_loan_document_comment'=>$this->input->post('Waiver_loan_document_comment'),
                                'doc_uploded_by_name'=>$login_user_name,
                                'date'=>date('d-m-Y'),
								'Waiver_doc_cloud_name' => $filename,
								'Waiver_doc_cloud_dir' => $dirname,
								'Waiver_DOC_UPLOAD_DATE'=>date("d/m/Y"),
								'Waiver_DOC_UPLOADED_BY'=>$data['login_user_unique_code'],
								'Approved_status'=>'Waiver'
                                 );
                             $Disbursement_document_approval_data = $this->Customercrud_model->saveDisbursementDocuments($updation_data);
                             $json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json); 
                      }
					  else
					  {
						  
						    $updation_data = 
                            array(
                                'USER_ID'=>$this->input->post('applicant_unique_code'),
                                'selected_document_type_id'=>$this->input->post('selected_document_type_id'),
                                'selected_document_type_name'=>$this->input->post('selected_document_type_name'),
                                'doc_uploded_by_ID'=>$this->input->post('login_user_unique_code'),
                                'is_waiver_'=>$this->input->post('is_waiver_'),
								'Waiver_loan_document_comment'=>$this->input->post('Waiver_loan_document_comment'),
                                'doc_uploded_by_name'=>$login_user_name,
                                'date'=>date('d-m-Y'),
								'Waiver_doc_cloud_name' => $filename,
								'Waiver_doc_cloud_dir' => $dirname,
								'Waiver_DOC_UPLOAD_DATE'=>date("d/m/Y"),
								'Waiver_DOC_UPLOADED_BY'=>$data['login_user_unique_code'],
								'Approved_status'=>'Waiver'
                                 );
                             $update=$this->credit_manager_user_model->Update_doc_approval_details($updation_data,$data['not_availabale_document_id']);
                            $json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json); 
					  }
                       
    }
	//===================================================================added by priya 11-10-2022
	public function Find_INFO()
	{
		         $data=array(
							'ID'=>$this->input->post('ID'),
							);
				 $find_info=$this->credit_manager_user_model->find_info($data['ID']);
                  $json = array (  
                            'status'=>"success",
							'INFO_ARRAY'=> $find_info,
                              );
                             echo json_encode($json);     
							
							
	}
	public function Find_report_INFO()
	{
		         $data=array(
							'ID'=>$this->input->post('ID'),
							);
				 $find_info=$this->credit_manager_user_model->find_report_info($data['ID']);
                  $json = array (  
                            'status'=>"success",
							'INFO_ARRAY'=> $find_info,
                              );
                             echo json_encode($json);     
							
							
	}
	//--------------------------- added by priya 01-11-2022
	public function  save_Disbursement_status()
	{
		
				   $data=array(
								'applicant_unique_code'=>$this->input->post('applicant_unique_code'), //
								'login_user_unique_code'=>$this->input->post('login_user_unique_code'), 
								'status'=>$this->input->post('status'),
							  );
				 $file_input_arr = 
				            array(
								'Accounts_confirmation_status' => $data['status'],
								'Accounts_confirmation_status_added_on' =>date("d-m-Y"),
								'Accounts_confirmation_status_added_by' => $data['login_user_unique_code'],
					   		  );
				 $file_input_status = 
				            array(
								'STATUS' => $data['status'],
							  );
							  
							  
							  
							  //======================== send email to disbursement ops======================================================
					    $credit_manager_info= $this->Operations_user_model->getProfileData($data['login_user_unique_code']);
						$customer_info = $this->Operations_user_model->getProfileData($data['applicant_unique_code']);
						$getCustomerSanction_letter_details=  $this->credit_manager_user_model->getCustomerSanction_letter_details($data['applicant_unique_code']);
						$customer_name =$customer_info->FN." ".$customer_info->LN;
						$config['protocol']='smtp';
						$config['smtp_host']='smtp-relay.sendinblue.com';
						$config['smtp_port']='587';
						$config['smtp_crypto']='tls';
						$config['smtp_user']='flconnect@finaleap.com';
						$config['smtp_pass']='Qns9hEpIMJVwUFgZ'; 
						$from_email = "infoflfinserv@finaleap.com";
						$config['charset']='utf-8';
						$config['newline']="\r\n";
						$config['wordwrap'] = TRUE;
						$config['mailtype'] = 'html';
						$this->email->initialize($config);
						$this->email->set_newline("\r\n");
						$this->email->from($from_email, 'Finaleap Finserv');
						//$CM_MAil=$credit_manager_info->EMAIL;
                       //$send_email_to_3_HR='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com,vipul@finaleap.com,sachin.kardile@finaleap.com,'.$CM_MAil.',sunil.kalan@finaleap.com';
						$send_email_to_3_HR="piyuabdagire@gmail.com";
						$this->email->to($send_email_to_3_HR);
						$this->email->bcc('info@finaleap.com');
							$mail_data['confirmed_by']= $credit_manager_info->FN." ".$credit_manager_info->LN;
							$mail_data['customer_name']=$customer_name;
							$mail_data['nature_of_facility']=$getCustomerSanction_letter_details->nature_of_facility;
							$mail_data['purpose_of_loan']=$getCustomerSanction_letter_details->purpose_of_loan;
							$mail_data['total_loan_amount']=$getCustomerSanction_letter_details->total_loan_amount;
							$mail_data['EMI']=$getCustomerSanction_letter_details->EMI;
							$mail_data['tenure']=$getCustomerSanction_letter_details->tenure;
					
						$this->email->subject('Application Disbursed For the customer :  '. $customer_name .''); 
						$mailContent = $this->load->view('templates/Application_Disbursed',$mail_data,true);
						$this->email->message($mailContent); 
						if($this->email->Send())
						{
						//	$docid = $this->credit_manager_user_model->update_sanction_letter_details($data['applicant_unique_code'],$file_input_arr);
				         //	$finale_status = $this->credit_manager_user_model->update_disbursement_status($data['applicant_unique_code'],$file_input_status);
								$json = array (  
									'status'=>"success",
									  );
								echo json_encode($json);
						}
						else
						{
							echo $this->email->print_debugger();
							$json = array (  
								'status'=>"fail",
									  );
								echo json_encode($json); 
						}
							
					//=============================================================================
				
					
				
					
					
			
	}
	//----------------------------------------------------
	
}
?>