<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operations_user extends CI_Controller {

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
		$this->load->model('Dsacrud_model');
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
			$getDashboardData_8=$this->Operations_user_model->getDashboardData_complete_FI();
			$getDashboardData_9=$this->Operations_user_model->getDashboardData_complete_RCU();
			$getDashboardData_10=$this->Operations_user_model->getDashboardData_incomplete_FI();
			$getDashboardData_11=$this->Operations_user_model->getDashboardData_incomplete_RCU();
			//$getDashboardData_6=$this->Operations_user_model->getDashboardData_incomplete_Tech();
			$data['dashboard_data'] = $dashboard_data;
			$data['dashboard_data_4'] = $getDashboardData_4;
			$data['getDashboardData_5'] = $getDashboardData_5;
			$data['getDashboardData_6'] = $getDashboardData_6;
			$data['getDashboardData_7'] = $getDashboardData_7;
			$data['dashboard_data_2'] = $dashboard_data_2;
			$data['dashboard_data_3'] = $dashboard_data_3;
			$data['getDashboardData_8']=$getDashboardData_8;
			$data['getDashboardData_9']=$getDashboardData_9;
			$data['getDashboardData_10']=$getDashboardData_10;
			$data['getDashboardData_11']=$getDashboardData_11;
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$this->load->view('dashboard_header', $data);
			$this->load->view('Operations_user/Dashboard', $data);
			//$this->load->view('footer');
		}
	}
	/*
	public function customers(){
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER'){
            redirect(base_url('index.php/login'));
        }else{
			
        	$id = $this->input->get('id');
		   
			$Cust_id=$this->session->set_userdata('Cust_id');
			if($id == '')$id = $this->session->userdata('ID');
			$CPA_ID=$id;

			//echo $id;
			//exit();
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


			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$search_name="";
			$userType2 = $this->input->get('userType2');
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");


                    
            $search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');
             //echo  $select_filters;
             //exit();
         
            if(!empty($search_))
            {
                $filter='search';
                $search_name =$this->input->post('filter_name');	
            }
             else if (!empty($select_filters))
            {
                $filter=$select_filters;
                $search_name=""; 
            }
            else
            {
                $filter=$this->input->get('s');
                $search_name="";
            }

	
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			//$customers = $this->Operations_user_model->getCustomers($filter,$date,$search_name);
			//$_SESSION["data_for_excel"] =	$customers;	
			
			//print_r($find_coapplicants);
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			//$this->load->view('header', $data);

			//echo $this->session->userdata('USER_TYPE');
			//$arr['coapplicants']= $find_coapplicants;
			$this->session->set_userdata('User_name',$user_name );
			$arr['user_name'] = $user_name;
			$arr['userType'] = $userType;
			//$arr['customers'] = $customers;
			$arr['CPA_ID'] = $CPA_ID; // added by piyu 19-04-2022
			$arr['userID']=$user_info->UNIQUE_CODE;
		//	$_SESSION["data_for_excel"] =$customers;
			$arr['s'] = $filter;
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$this->load->view('dashboard_header', $data);
			if($this->session->userdata('USER_TYPE') == 'Operations_user')$this->load->view('Operations_user/customers_new', $arr);
	
		}
	}*/
// changes by priya 04-05-2022
	public function customers(){
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
			
        	$id = $this->input->get('id');
		   
        	$filter = $this->input->get('s');

        	if($filter=='')
        	{
        		$filter='all';
        	}
			$Cust_id=$this->session->set_userdata('Cust_id');
			if($id == '')$id = $this->session->userdata('ID');
			$CPA_ID=$id;

			//echo $id;
			//exit();
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


			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$search_name="";
			$userType2 = $this->input->get('userType2');
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");


                    
            $search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');
             //echo  $select_filters;
             //exit();
         
          

	
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			//$customers = $this->Operations_user_model->getCustomers($filter,$date,$search_name);
			//$_SESSION["data_for_excel"] =	$customers;	
			/*foreach($customers as $row){
            
				$find_coapplicants =$this->Operations_user_model->getCustomers_coapplicants($row->UNIQUE_CODE);
				$find_dsa_details=$this->Operations_user_model->get_dsa_details($row->DSA_ID);
				if(isset($find_dsa_details))
				{
                    
					$arr['find_dsa_details']= $find_dsa_details;
     			}
				$arr['coapplicants']= $find_coapplicants;
			}*/
			//print_r($find_coapplicants);
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			//$this->load->view('header', $data);

			//echo $this->session->userdata('USER_TYPE');
			//$arr['coapplicants']= $find_coapplicants;
			$this->session->set_userdata('User_name',$user_name );
			$arr['user_name'] = $user_name;
			$arr['userType'] = $userType;
			//$arr['customers'] = $customers;
			$arr['CPA_ID'] = $CPA_ID; // added by piyu 19-04-2022
			$arr['userID']=$user_info->UNIQUE_CODE;
		//	$_SESSION["data_for_excel"] =$customers;
			$arr['s'] = $filter;
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$this->load->view('dashboard_header', $data);
				if($this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'Operations_user'  || $this->session->userdata('USER_TYPE') == 'DSA' )$this->load->view('Operations_user/customers_new', $arr);
	
		}
	}
	public function CAM_Applicant_Details()
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
			$CAP_ID=$this->input->get("c");
			if ($id == '') {
				$id = $this->session->userdata("ID");
			}
			$this->session->set_userdata('Cust_id',$id );
		    $data_row = $this->Operations_user_model->getProfileData($id);
			$DSA_ID=$data_row->DSA_ID;
			
			$MANAGER_ID=$data_row->MANAGER_ID;
			$CSR_ID=$data_row->CSR_ID;
	        $BM_ID=$data_row->BM_ID;
			$CM_ID=$data_row->CM_ID;
			$RO_ID=$data_row->RO_ID;
			$SELES_ID=$data_row->SELES_ID;
		    if($DSA_ID!='NULL' && $DSA_ID!='' && $DSA_ID!='0')
			{
				$Sourcing_info= $this->Dsacrud_model->getProfileData($DSA_ID);
				$Sourcing_Type="DSA";
				$Sourcing_By="DSA Name";
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
					$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Manager Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="CSR Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Branch Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Cluster Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Relationship Officer Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Sales Manager";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
			$data['Sourcing_name']=$Sourcing_name;
			$data['Sourcing_By']=$Sourcing_By;
			$data['Sourcing_Type']=$Sourcing_Type;
			$data['Sourcing_city']=$Sourcing_city;
			$data['Sourcing_state']=$Sourcing_state;

			$data_row_more = $this->Operations_user_model->getProfileDataMore($id);	
			
			$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
			}
			elseif($data_appliedloan->LOAN_TYPE=='lap')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
			}
			else
			{
				$data_coapplicant_no=0;
				$data_coapplicant=array();
			}
			
			
			$data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
			$data_row_documents= $this->Customercrud_model->getDocuments($id);


			  
			if(!empty($data_coapplicant))
			{
				$z=0;
				$new_doc_array = array();
				foreach ($data_coapplicant as $coapplicant) 
				{
					//echo $coapplicant->UNIQUE_CODE;
					$data_row_documents1 = $this->Customercrud_model->getDocuments($coapplicant->UNIQUE_CODE);
					array_push($new_doc_array ,$data_row_documents1);
					$z++ ;
		    	}
		    } 
			else{
				$new_doc_array = array();
			}

			//echo "<pre>";
			//print_r($new_doc_array);
			//echo "</pre>";
			//exit();


			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$q = 1;
			if($u_type == 'DSA')$q = 2;
			if($data_row->PROFILE_PERCENTAGE == 100){
				$age = 1;
			}
			else $age = 0;
            // added by priyanka=========================
			//echo $this->session->userdata("User_name");
			$username=$this->session->userdata("User_name");
			$data['username'] =$username;
			//===========================================
			$data['documents'] =$data_row_documents;
			$data['new_doc_array'] =$new_doc_array;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row'] = $data_row;
			$data['row_more'] = $data_row_more;
			$data['coapplicants']=$data_coapplicant;
			$data['appliedloan']=$data_appliedloan;
			$data['no_of_coapplicant']=$data_coapplicant_no;
			$data['income_details']=$data_incomedetails;
			$data['CPA_ID']=$CAP_ID;
			$data['cam_processed_userData']= $this->Operations_user_model->getProfileData($data_row_more->CPA_ID);
		
			/*
			echo $data['Sourcing_name'];
			echo $data['Sourcing_By'];
			echo $data['Sourcing_Type'];
			echo $data['Sourcing_city'];
			echo $data['Sourcing_state'];
			exit();*/
			$this->load->view('header', $data);
			$this->load->view('Operations_user/CAM_Applicant_Details');	
		}
	}
	public function Other_attributes()
	{
		if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
			//$this->load->view('header', $data);
			$this->load->view('login', $data);
		}else{
			$id =$this->session->userdata("Cust_id");
			if ($id == '') {
				$id =$this->session->userdata("Cust_id");
			}

			//=======================added by priyanka==============
		$data_row = $this->Operations_user_model->getProfileData($id);
		$dsa_id=$data_row->DSA_ID;
	
		$dsa_info= $this->Dsacrud_model->getProfileData($dsa_id);
		if(!empty($dsa_info))
		{
			if($dsa_info->MN!='')
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
			else
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
		}
		else
		{
			$dsa_name='';
		}
		$data['dsa_name']=$dsa_name;

		
		$DSA_ID=$data_row->DSA_ID;
			
			$MANAGER_ID=$data_row->MANAGER_ID;
			$CSR_ID=$data_row->CSR_ID;
	        $BM_ID=$data_row->BM_ID;
			$CM_ID=$data_row->CM_ID;
			$RO_ID=$data_row->RO_ID;
			$SELES_ID=$data_row->SELES_ID;
		    if($DSA_ID!='NULL' && $DSA_ID!='' && $DSA_ID!='0')
			{
				$Sourcing_info= $this->Dsacrud_model->getProfileData($DSA_ID);
				$Sourcing_Type="DSA";
				$Sourcing_By="DSA Name";
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
					$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Manager Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="CSR Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Branch Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Cluster Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Relationship Officer Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Sales Manager";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
			$data['Sourcing_name']=$Sourcing_name;
			$data['Sourcing_By']=$Sourcing_By;
			$data['Sourcing_Type']=$Sourcing_Type;
			$data['Sourcing_city']=$Sourcing_city;
			$data['Sourcing_state']=$Sourcing_state;
	//=====================================================
			$this->session->set_userdata('Cust_id',$id );
			$data_row = $this->Operations_user_model->getProfileData($id);
			$data_row_more = $this->Operations_user_model->getProfileDataMore($id);	
			
			$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
			}
			elseif($data_appliedloan->LOAN_TYPE=='lap')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
			}
			else
			{
				$data_coapplicant_no=0;
				$data_coapplicant=array();
			}


			if(!empty($data_coapplicant))
			{
				$z=0;
				$new_doc_array = array();
				foreach ($data_coapplicant as $coapplicant) 
				{
					//echo $coapplicant->UNIQUE_CODE;
					$data_row_documents1 = $this->Customercrud_model->getDocuments($coapplicant->UNIQUE_CODE);
					array_push($new_doc_array ,$data_row_documents1);
					$z++ ;
		    	}
		    } 
            $data['new_doc_array'] =$new_doc_array;
			
			
			$data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
			$data_row_documents= $this->Customercrud_model->getDocuments($id);
		

			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$q = 1;
			if($u_type == 'DSA')$q = 2;
			if($data_row->PROFILE_PERCENTAGE == 100){
				$age = 1;
			}else $age = 0;
			// added by priyanka=========================
			//echo $this->session->userdata("User_name");
			$username=$this->session->userdata("User_name");
			$data['username'] =$username;
			//===========================================
			$data['documents'] =$data_row_documents;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row'] = $data_row;
			$data['row_more'] = $data_row_more;
			$data['cam_processed_userData']= $this->Operations_user_model->getProfileData($data_row_more->CPA_ID);
			$data['coapplicants']=$data_coapplicant;
			$data['no_of_coapplicant']=$data_coapplicant_no;
			$data['appliedloan']=$data_appliedloan;
			
			$data['income_details']=$data_incomedetails;
			$this->load->view('header', $data);
			$this->load->view('Operations_user/Other_attributes');	
		}
	}
	public function edit_Other_Attributes()
	{
		if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
			//$this->load->view('header', $data);
			$this->load->view('login', $data);
		}else{
			$id =$this->session->userdata("Cust_id");
			if ($id == '') {
				$id =$this->session->userdata("Cust_id");
			}

			//=======================added by priyanka==============
		$data_row = $this->Operations_user_model->getProfileData($id);
		$dsa_id=$data_row->DSA_ID;
	
		$dsa_info= $this->Dsacrud_model->getProfileData($dsa_id);
		if(!empty($dsa_info))
		{
			if($dsa_info->MN!='')
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
			else
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
		}
		else
		{
			$dsa_name='';
		}
		$data['dsa_name']=$dsa_name;

		
		$DSA_ID=$data_row->DSA_ID;
			
			$MANAGER_ID=$data_row->MANAGER_ID;
			$CSR_ID=$data_row->CSR_ID;
	        $BM_ID=$data_row->BM_ID;
			$CM_ID=$data_row->CM_ID;
			$RO_ID=$data_row->RO_ID;
				$SELES_ID=$data_row->SELES_ID;
		    if($DSA_ID!='NULL' && $DSA_ID!='' && $DSA_ID!='0')
			{
				$Sourcing_info= $this->Dsacrud_model->getProfileData($DSA_ID);
				$Sourcing_Type="DSA";
				$Sourcing_By="DSA Name";
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
					$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Manager Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="CSR Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Branch Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Cluster Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Relationship Officer Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Sales Manager";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
			$data['Sourcing_name']=$Sourcing_name;
			$data['Sourcing_By']=$Sourcing_By;
			$data['Sourcing_Type']=$Sourcing_Type;
			$data['Sourcing_city']=$Sourcing_city;
			$data['Sourcing_state']=$Sourcing_state;
	//=====================================================
			$this->session->set_userdata('Cust_id',$id );
			$data_row = $this->Operations_user_model->getProfileData($id);
			$data_row_more = $this->Operations_user_model->getProfileDataMore($id);	
			
			$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
			}
			elseif($data_appliedloan->LOAN_TYPE=='lap')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
			}
			else
			{
				$data_coapplicant_no=0;
				$data_coapplicant=array();
			}
			
			
			$data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
			$data_row_documents= $this->Customercrud_model->getDocuments($id);
			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$q = 1;
			if($u_type == 'DSA')$q = 2;
			if($data_row->PROFILE_PERCENTAGE == 100){
				$age = 1;
			}else $age = 0;
			// added by priyanka=========================

			if(!empty($data_coapplicant))
			{
				$z=0;
				$new_doc_array = array();
				foreach ($data_coapplicant as $coapplicant) 
				{
					//echo $coapplicant->UNIQUE_CODE;
					$data_row_documents1 = $this->Customercrud_model->getDocuments($coapplicant->UNIQUE_CODE);
					array_push($new_doc_array ,$data_row_documents1);
					$z++ ;
		    	}
		    } 
            $data['new_doc_array'] =$new_doc_array;
			//echo $this->session->userdata("User_name");
			$username=$this->session->userdata("User_name");
			$data['username'] =$username;
			//===========================================
			$data['documents'] =$data_row_documents;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row'] = $data_row;
			$data['row_more'] = $data_row_more;
			$data['coapplicants']=$data_coapplicant;
			$data['appliedloan']=$data_appliedloan;
			$data['no_of_coapplicant']=$data_coapplicant_no;
			$data['income_details']=$data_incomedetails;
			$this->load->view('header', $data);
			$this->load->view('Operations_user/edit_Other_attributes');	
		}
	}
	
	public function update_Other_attributes()
	
	{
		
		$id = $this->session->userdata("Cust_id");
		$CAM_CREATED_BY=$this->input->post('CAM_CREATED_BY');

		$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
		for ($i =1; $i<=$data_coapplicant_no; $i++) 
		{

			// echo $this->input->post('Pre_employement_'.$i);
			// echo $this->input->post('Past_Employement_'.$i);
			// echo $this->input->post('Edu_background_'.$i);
			// echo $this->input->post('Recommendations_'.$i);
			// echo $this->input->post('Connects_'.$i);
			// echo $this->input->post('vacation_'.$i);
			// echo $this->input->post('anti_post_'.$i);
			 //echo $this->input->post('co_id_'.$i); 
		     $arr=$this->input->post('Professional_courses_'.$i);
			 $Professional_courses=implode(",",(array) $arr);
			 $arr=$this->input->post('Hobbies_'.$i);
			 $Hobbies=implode(",",(array) $arr);
			 $arr=$this->input->post('Skills_'.$i);
			 $Skills=implode(",",(array) $arr);
             $co_id=$this->input->post('co_id_'.$i);

			 $co_array_input_more = array(
			 	'Pre_employement'=>$this->input->post('Pre_employement_'.$i),
			 	'Past_Employement'=>$this->input->post('Past_Employement_'.$i),
			 	'Edu_background'=>$this->input->post('Edu_background_'.$i),
			 	'Recommendations'=>$this->input->post('Recommendations_'.$i),
			 	'Connects'=>$this->input->post('Connects_'.$i),
			 	'vacation'=>$this->input->post('vacation_'.$i),
			 	'anti_post'=>$this->input->post('anti_post_'.$i),
			 	'Professional_courses'=>$Professional_courses,
			 	'Hobbies'=>$Hobbies,
			 	'Skills'=>$Skills
			 );
			 $updated_array_input_more=$this->Customercrud_model->co_update_profile_more($co_id, $co_array_input_more);
			
		}


//exit();


		
		$dob = $this->input->post('dob');		
		$diff = abs(strtotime(date("Y-m-d")) - strtotime($dob));
		$years = floor($diff / (365*60*60*24));
		
			$arr=$this->input->post('Professional_courses');
			$Professional_courses=implode(",",$arr);
			$arr=$this->input->post('Hobbies');
			$Hobbies=implode(",",$arr);
			$arr=$this->input->post('Skills');
			$Skills=implode(",",$arr);


		
			$array_input_more = array(
			'Pre_employement'=>$this->input->post('Pre_employement'),
			'Past_Employement'=>$this->input->post('Past_Employement'),
			'Edu_background'=>$this->input->post('Edu_background'),
			'Recommendations'=>$this->input->post('Recommendations'),
			'Connects'=>$this->input->post('Connects'),
			'vacation'=>$this->input->post('vacation'),
			'anti_post'=>$this->input->post('anti_post'),
			'Professional_courses'=>$Professional_courses,
			'Hobbies'=>$Hobbies,
			'Skills'=>$Skills

			);
			
			//$updated_array= $this->Customercrud_model->update_profile($id, $array_input);
			$updated_array_input_more=$this->Customercrud_model->update_profile_more($id, $array_input_more);
			if($updated_array_input_more > 0)
			{
			   $this->session->set_flashdata('success','success');
			   redirect('Operations_user/Other_attributes');
				
			}
			else
			{
				 $this->session->set_flashdata('error','error');
			     redirect('Operations_user/Other_attributes');
			}
	}
	public function update_Collateral_attributes()
	
	{
		
		$id = $this->session->userdata("Cust_id");
			$array_input_more = array(
			'Sale_Deed'=>$this->input->post('Sale_Deed'),
			'Land_value'=>$this->input->post('Land_value'),
			'Construction_value'=>$this->input->post('Construction_value'),
			'Total_Value'=>$this->input->post('Total_Value'),
			'Agreement_value'=>$this->input->post('Agreement_value'),
			'Date_of_Agreement'=>$this->input->post('Date_of_Agreement'),
			'LTV'=>$this->input->post('LTV'),
			'LTV_new'=>$this->input->post('LTV_new'),
			'Legal_report'=>$this->input->post('Legal_report'),
			'Self_occupied'=>$this->input->post('Self_occupied')
			);
			//$updated_array= $this->Customercrud_model->update_profile($id, $array_input);
			$updated_array_input_more=$this->Customercrud_model->update_profile_more($id, $array_input_more);


			if($updated_array_input_more > 0)
			{



                    $array_input_more1 = array(
												'cam_status'=>('Cam details complete'),
												'Cam_completed_date'=>date("Y/m/d")
											);
							
				$Result_id1 = $this->Customercrud_model->update_profile($id, $array_input_more1);



                  //============== last updated date
                 
				  $array_input_more2 = array(
											'CUST_ID' => $id,
											'STATUS'=>('Cam details complete'),
											'last_updated_date'=>date("Y/m/d")
											);
				$result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more2);











			   $this->session->set_flashdata('success','success');
			   redirect('Operations_user/collateral');
				
			}
			else
			{
				 $this->session->set_flashdata('error','error');
			     redirect('Operations_user/collateral');
			}
	}
	
	public function collateral()
	{
		if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
			//$this->load->view('header', $data);
			$this->load->view('login', $data);
		}else{
			$id =$this->session->userdata("Cust_id");
			if ($id == '') {
				$id =$this->session->userdata("Cust_id");
			}

			//=======================added by priyanka==============
		$data_row = $this->Operations_user_model->getProfileData($id);
		$dsa_id=$data_row->DSA_ID;
	
		$dsa_info= $this->Dsacrud_model->getProfileData($dsa_id);
		if(!empty($dsa_info))
		{
			if($dsa_info->MN!='')
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
			else
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
		}
		else
		{
			$dsa_name='';
		}
		$data['dsa_name']=$dsa_name;
		
		$DSA_ID=$data_row->DSA_ID;
			
			$MANAGER_ID=$data_row->MANAGER_ID;
			$CSR_ID=$data_row->CSR_ID;
	        $BM_ID=$data_row->BM_ID;
			$CM_ID=$data_row->CM_ID;
			$RO_ID=$data_row->RO_ID;
			$SELES_ID=$data_row->SELES_ID;
		    if($DSA_ID!='NULL' && $DSA_ID!='' && $DSA_ID!='0')
			{
				$Sourcing_info= $this->Dsacrud_model->getProfileData($DSA_ID);
				$Sourcing_Type="DSA";
				$Sourcing_By="DSA Name";
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
					$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Manager Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="CSR Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Branch Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Cluster Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Relationship Officer Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Sales Manager";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
			$data['Sourcing_name']=$Sourcing_name;
			$data['Sourcing_By']=$Sourcing_By;
			$data['Sourcing_Type']=$Sourcing_Type;
			$data['Sourcing_city']=$Sourcing_city;
			$data['Sourcing_state']=$Sourcing_state;
	//=====================================================

			$this->session->set_userdata('Cust_id',$id );
			$data_row = $this->Operations_user_model->getProfileData($id);
			$data_row_more = $this->Operations_user_model->getProfileDataMore($id);	
			
			$data_credit_analysis=$this->Operations_user_model->getcreditData($id);
			$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			
			
			
			
			$data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
			$data_row_documents= $this->Customercrud_model->getDocuments($id);
			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$q = 1;
			if($u_type == 'DSA')$q = 2;
			if($data_row->PROFILE_PERCENTAGE == 100){
				$age = 1;
			}else $age = 0;
			// added by priyanka=========================
			//echo $this->session->userdata("User_name");


			// if(!empty($data_coapplicant))
			// {
			// 	$z=0;
			// 	$new_doc_array = array();
			// 	foreach ($data_coapplicant as $coapplicant) 
			// 	{
			// 		//echo $coapplicant->UNIQUE_CODE;
			// 		$data_row_documents1 = $this->Customercrud_model->getDocuments($coapplicant->UNIQUE_CODE);
			// 		array_push($new_doc_array ,$data_row_documents1);
			// 		$z++ ;
		    // 	}
		    // } 
            // $data['new_doc_array'] =$new_doc_array;

			$username=$this->session->userdata("User_name");
			$data['username'] =$username;
			//===========================================
			$data['documents'] =$data_row_documents;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row'] = $data_row;
			$data['row_more'] = $data_row_more;
			$data['data_credit_analysis']=$data_credit_analysis;
			$data['appliedloan']=$data_appliedloan;
			$data['cam_processed_userData']= $this->Operations_user_model->getProfileData($data_row_more->CPA_ID);
		
			$data['income_details']=$data_incomedetails;
			$this->load->view('header', $data);
			$this->load->view('Operations_user/collateral');	
		}
	}
	public function edit_collateral()
	{
		if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
			//$this->load->view('header', $data);
			$this->load->view('login', $data);
		}else{
			$id =$this->session->userdata("Cust_id");
			if ($id == '') {
				$id =$this->session->userdata("Cust_id");
			}

			//=======================added by priyanka==============
		$data_row = $this->Operations_user_model->getProfileData($id);
		$dsa_id=$data_row->DSA_ID;
	
		$dsa_info= $this->Dsacrud_model->getProfileData($dsa_id);
		if(!empty($dsa_info))
		{
			if($dsa_info->MN!='')
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
			else
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
		}
		else
		{
			$dsa_name='';
		}
		$data['dsa_name']=$dsa_name;

		
		$DSA_ID=$data_row->DSA_ID;
			
			$MANAGER_ID=$data_row->MANAGER_ID;
			$CSR_ID=$data_row->CSR_ID;
	        $BM_ID=$data_row->BM_ID;
				$SELES_ID=$data_row->SELES_ID;
			$RO_ID=$data_row->RO_ID;
		    if($DSA_ID!='NULL' && $DSA_ID!='' && $DSA_ID!='0')
			{
				$Sourcing_info= $this->Dsacrud_model->getProfileData($DSA_ID);
				$Sourcing_Type="DSA";
				$Sourcing_By="DSA Name";
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
					$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Manager Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="CSR Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Branch Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Relationship Officer Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Sales Manager";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By='';
			}
			$data['Sourcing_name']=$Sourcing_name;
			$data['Sourcing_By']=$Sourcing_By;
			$data['Sourcing_Type']=$Sourcing_Type;
			$data['Sourcing_city']=$Sourcing_city;
			$data['Sourcing_state']=$Sourcing_state;
	//=====================================================
			$this->session->set_userdata('Cust_id',$id );
			$data_row = $this->Operations_user_model->getProfileData($id);
			$data_row_more = $this->Operations_user_model->getProfileDataMore($id);	
			
			$data_credit_analysis=$this->Operations_user_model->getcreditData($id);
			$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			
			
			
			
			$data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
			$data_row_documents= $this->Customercrud_model->getDocuments($id);
			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$q = 1;
			if($u_type == 'DSA')$q = 2;
			if($data_row->PROFILE_PERCENTAGE == 100){
				$age = 1;
			}else $age = 0;
			// added by priyanka=========================
			//echo $this->session->userdata("User_name");
			$username=$this->session->userdata("User_name");
			$data['username'] =$username;


			// if(!empty($data_coapplicant))
			// {
			// 	$z=0;
			// 	$new_doc_array = array();
			// 	foreach ($data_coapplicant as $coapplicant) 
			// 	{
			// 		//echo $coapplicant->UNIQUE_CODE;
			// 		$data_row_documents1 = $this->Customercrud_model->getDocuments($coapplicant->UNIQUE_CODE);
			// 		array_push($new_doc_array ,$data_row_documents1);
			// 		$z++ ;
		    // 	}
		    // } 
           // $data['new_doc_array'] =$new_doc_array;
			//===========================================
			$data['documents'] =$data_row_documents;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row'] = $data_row;
			$data['row_more'] = $data_row_more;
			$data['data_credit_analysis']=$data_credit_analysis;
			$data['appliedloan']=$data_appliedloan;
			
			$data['income_details']=$data_incomedetails;
			$this->load->view('header', $data);
			$this->load->view('Operations_user/edit_collateral',$data);	
		}
	}
	public function customer_edit_profile_2()
	{
		
		$id = $this->session->userdata("Cust_id");
		
		/*--------------------------- Login fees details----------------------------*/
		$Customer_data = $this->Dsacrud_model->getProfileData($id);
		$bank_id=$this->Admin_model->Get_bank_id($id);
		$login_fees=$this->Admin_model->Get_Login_fees($bank_id);
		$get_payment_deteils=$this->Admin_model->get_payment_deteils($id);
		$get_payment_deteils_offline=$this->Admin_model->get_payment_deteils_offline($id);
		//print_r($get_payment_deteils_offline);
		//exit;
		$login_fees_status="no";
		if(!empty($get_payment_deteils))
		{
			if($get_payment_deteils->payment_status=='Successful')
			{
				$login_fees_status='yes';
			}
			else
			{
				$login_fees_status='no';
			}
		}
		else
		{
			if(!empty($get_payment_deteils_offline))
			{
				
					$login_fees_status='yes';
					if(!empty($get_payment_deteils_offline->Payment_Recived_date))
					{
					$Payment_Recived_date=$get_payment_deteils_offline->Payment_Recived_date;
					}
					else{
						$Payment_Recived_date='';
					}
				
					//echo $Payment_Recived_date;
					//exit;
				
				
			}
			else
			{
				$Payment_Recived_date='';
				$login_fees_status='no';
				
			}
		}
		  
	
        //=======================added by priyanka==============
		$data_row = $this->Operations_user_model->getProfileData($id);
			$dsa_id=$data_row->DSA_ID;
		
			$dsa_info= $this->Dsacrud_model->getProfileData($dsa_id);
			if(!empty($dsa_info))
			{
				if($dsa_info->MN!='')
				{
					$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
				}
				else
				{
					$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
				}
			}
			else
			{
				$dsa_name='';
			}
			$data['dsa_name']=$dsa_name;


			$DSA_ID=$data_row->DSA_ID;
			$CM_ID=$data_row->CM_ID;
			
			$MANAGER_ID=$data_row->MANAGER_ID;
			$CSR_ID=$data_row->CSR_ID;
	        $BM_ID=$data_row->BM_ID;
			
			$RO_ID=$data_row->RO_ID;
			$SELES_ID=$data_row->SELES_ID;
			$Sourcing_By='';
		    if($DSA_ID!='NULL' && $DSA_ID!='' && $DSA_ID!='0')
			{
				$Sourcing_info= $this->Dsacrud_model->getProfileData($DSA_ID);
				$Sourcing_Type="DSA";
				$Sourcing_By="DSA Name";
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
					$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Manager Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="CSR Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Branch Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Relationship Officer Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Sales Manager";
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
						$Sourcing_city=$Sourcing_info->CITY;
					    $Sourcing_state=$Sourcing_info->STATE;
				}
				else
				{
					$Sourcing_name='';
					$Sourcing_city='';
					$Sourcing_state='';
				}
			}
			else if($CM_ID!='NULL' && $CM_ID!=''&& $CM_ID!='0')
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By='';
				$Sourcing_name='';
				$Sourcing_city='';
				$Sourcing_state='';
			}
			$data['Sourcing_name']=$Sourcing_name;
			$data['Sourcing_By']=$Sourcing_By;
			$data['Sourcing_Type']=$Sourcing_Type;
			$data['Sourcing_city']=$Sourcing_city;
			$data['Sourcing_state']=$Sourcing_state;
		//=====================================================




		$data_row = $this->Operations_user_model->getProfileData($id);
		$data_row_more = $this->Operations_user_model->getProfileDataMore($id);
		$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
		$data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
		$data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
		if(!empty($data_credit_score))
		{
			$data_response=$data_credit_score->response;
			$credit_score_response=json_decode($data_credit_score->response,true);
		
			
			if(isset($credit_score_response['CCRResponse']['CIRReportDataLst']['0']['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Name']['FirstName']))
			{
				$FirstName=$credit_score_response['CCRResponse']['CIRReportDataLst']['0']['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Name']['FirstName'];
			}
			else{
				$FirstName="";
			}
			if(isset($credit_score_response['CCRResponse']['CIRReportDataLst']['0']['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Name']['MiddleName']))
			{
			$MiddleName=$credit_score_response['CCRResponse']['CIRReportDataLst']['0']['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Name']['MiddleName'];
			}
			else
			{
				$MiddleName="";
			}
			if(isset($credit_score_response['CCRResponse']['CIRReportDataLst']['0']['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Name']['LastName']))
			{
			$LastName=$credit_score_response['CCRResponse']['CIRReportDataLst']['0']['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Name']['LastName'];
			}
			else
			{
				$LastName="";
			}
			if(isset($credit_score_response['CCRResponse']['CIRReportDataLst']['0']['CIRReportData']['IDAndContactInfo']['PersonalInfo']['DateOfBirth']))
			{
			$DOB=$credit_score_response['CCRResponse']['CIRReportDataLst']['0']['CIRReportData']['IDAndContactInfo']['PersonalInfo']['DateOfBirth'];
			}
			else
			{
				$DOB="";
			}
			if(isset($credit_score_response['CCRResponse']['CIRReportDataLst']['0']['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Age']['Age']))
			{
			$Age=$credit_score_response['CCRResponse']['CIRReportDataLst']['0']['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Age']['Age'];
			}
			else
			{
				$Age="";
			}
			
			$data['FirstName']=$FirstName;
			$data['MiddleName']=$MiddleName;
			$data['LastName']=$LastName;
			$data['DOB']=$DOB;
			$data['Age']=$Age;
		
		//echo "<pre>";
		//print_r($credit_score_response);
		//print_r($InquiryRequestInfo);
			//echo "</pre>";

			//exit();
		}
        if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id); 
       //=======================================================================================================
                 $data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
				$total_obligation=0;
                $coapp_add_flag=array();
				$coapp_email_flag=array();
				$i=1;
				foreach($data_coapplicant as $coapplicant)
				{
				    $coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
			        $coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
					$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
					$coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);



				

					if(!empty($coapp_data_credit_score))
					{
						$coapp_data_response=$coapp_data_credit_score->response;
					    $coapp_data_address=json_decode($coapp_data_response,true);

						//echo "<pre>";
						//print_r($coapp_data_address);
						//echo "</pre>";
				
							//exit();
				       
					    if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
					   {
						$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
					   }
					   else
					   {
						$coapp_data_emails=''; 
					   }
					    if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo']))
						{
						$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
						$coapp_data_response=$coapp_data_credit_score->response;
						$coapp_credit_score=json_decode($coapp_data_response,true);
						}
						else
						{
							$coapp_credit_score='';
							$coapp_data_add=array();
						}
						if(isset($coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
						{
						$coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
						}
						else
						{
							$coapp_data_obligations=[];
						}

                        if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']))
						{
					    $TotalSanctionAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];
						$NoOfAccounts=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts'];
						$NoOfActiveAccounts=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'];
						$coapp_TotalBalanceAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount'];
						}
						else
						{
							$TotalSanctionAmount="";
							$NoOfAccounts="";
							$NoOfActiveAccounts="";
							$coapp_TotalBalanceAmount="";
						}
						//echo $TotalSanctionAmount;
						$data['TotalSanctionAmount']=$TotalSanctionAmount;
						
						$data['coapp_TotalBalanceAmount']=$coapp_TotalBalanceAmount;
						//exit();
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsOpened']))
						{
						$AccountsOpened=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsOpened'];
						}
						else
						{
							$AccountsOpened="";
						}
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsDeliquent']))
						{
						$AccountsDeliquent=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsDeliquent'];
						}
						else
						{
							$AccountsDeliquent="";	
						}
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['TotalInquiries']))
						{
							$TotalInquiries=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['TotalInquiries'];
						}
						else
						{
							$TotalInquiries="";
						}
					    if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsUpdated']))
						{
						$AccountsUpdated=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsUpdated'];
						}
						else
						{
							$AccountsUpdated="";
						}
						 
						foreach($coapp_data_obligations as $coapp_data_obligation)
						{
							
							if($coapp_data_obligation['Open']=='Yes')
							{
								 if(isset($coapp_data_obligation['InstallmentAmount']))
								 {
									$total_obligation= $total_obligation+ $coapp_data_obligation['InstallmentAmount'];
								 }
								 else
								 {
									$total_obligation=0; 
								 }
								 
							}
							else
							{
								break;
							}
						}
						$coapp_data_obligations_array[$i]=$coapp_data_obligations;	
					    $coapp_credit_score_array[$i]=$coapp_credit_score;
						foreach($coapp_data_add as $data_ad)
							{
								$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
								$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
								$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
								 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
								 {
									$address_flag='true';
									  break;
								 }
								 else
								 {
									 $address_flag='false';
								 }
								
							}
                           if($coapp_data_emails!='')
						   {

							foreach($coapp_data_emails as $data_email)
							{
								$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
								$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
								 if(strcmp($str1,$str2)==0 )
								 {
									$email_flag='true';
									  break;
								 }
								 else
								 {
									 $email_flag='false';
									
								 }
							}	
							  $coapp_email_flag[$i]=$email_flag;
							  $coapp_add_flag[$i]=$address_flag;
						}
					}
					else
					{
						$total_obligation=0;
						$coapp_add_flag[$i]='false';
						$coapp_add_flag[$i]='false';
						$coapp_data_obligations_array[$i]=array();	
						$coapp_credit_score_array[$i]=array();
						$coapp_credit_score=array();
						
					}
					
					$coapp_data_credit_analysis_array[$i]=$coapp_data_credit_analysis;
					$coapp_data_credit_score_array[$i]=$coapp_data_credit_score;
					if(isset($total_obligation))
					{
					$coapp_data_obligation_array[$i]=$total_obligation;
					}
					else
					{
						$coapp_data_obligation_array[$i]=[];
					}

                	$i++;
					
				}
              //======================================================================================================


			}
			elseif($data_appliedloan->LOAN_TYPE=='lap')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);

                $coapp_add_flag=array();
				$coapp_email_flag=array();
				$i=1;
				foreach($data_coapplicant as $coapplicant)
				{
				    $coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
			        $coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
					$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
					$coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);



				

					if(!empty($coapp_data_credit_score))
					{
						$coapp_data_response=$coapp_data_credit_score->response;
					    $coapp_data_address=json_decode($coapp_data_response,true);

						//echo "<pre>";
						//print_r($coapp_data_address);
						//echo "</pre>";
				
							//exit();
				       
					    if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
					   {
						$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
						$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
						
					   }
					   else
					   {
						$coapp_data_emails=''; 
						$coapp_data_add=array();
					   }

						$coapp_data_response=$coapp_data_credit_score->response;
						$coapp_credit_score=json_decode($coapp_data_response,true);
						if(isset($coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
						{
						 $coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
						}
						else
						{
							$coapp_data_obligations=array();
						}

						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']))
						{
					    $TotalSanctionAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];
						$NoOfAccounts=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts'];
						$NoOfActiveAccounts=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'];
						$coapp_TotalBalanceAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount'];
                        //echo $TotalSanctionAmount;
						$data['TotalSanctionAmount']=$TotalSanctionAmount;
						
						$data['coapp_TotalBalanceAmount']=$coapp_TotalBalanceAmount;
						}
						else
						{
							$TotalSanctionAmount="";
							$NoOfAccounts="";
							$NoOfActiveAccounts="";
							$coapp_TotalBalanceAmount="";
							//echo $TotalSanctionAmount;
							$data['TotalSanctionAmount']="";
							
							$data['coapp_TotalBalanceAmount']="";
						}
						//exit();
						$total_obligation=0;
					
						
						
					  
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsOpened']))
						{
							$AccountsOpened=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsOpened'];
						}
						else
						{
							$AccountsOpened ="";
						}

						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsDeliquent']))
						{
							$AccountsDeliquent=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsDeliquent'];
						}
						else
						{
							$AccountsDeliquent="";
						}
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['TotalInquiries']))
						{
							$TotalInquiries=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['TotalInquiries'];
						}
						else
						{
							$TotalInquiries="";
						}
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsUpdated']))
						{
							$AccountsUpdated=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsUpdated'];
					  	}
						else
						  {
							$AccountsUpdated="";
						  }
                   if(isset($coapp_data_obligations))
				   {
						foreach($coapp_data_obligations as $coapp_data_obligation)
						{
							
							if($coapp_data_obligation['Open']=='Yes')
							{
								 if(isset($coapp_data_obligation['InstallmentAmount']))
								 {
									$total_obligation = $total_obligation + $coapp_data_obligation['InstallmentAmount'];
								 }
								 else
								 {
									$total_obligation = 0; 
								 }
								 
							}
							else
							{
								$total_obligation = 0; 
								break;
							}
						}
						 $coapp_data_obligations_array[$i]=$coapp_data_obligations;	
					}
					else
					{
						$coapp_data_obligations_array[$i]="";
					}


					    $coapp_credit_score_array[$i]=$coapp_credit_score;

						foreach($coapp_data_add as $data_ad)
							{
								$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
								$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
								$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
								 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
								 {
									$address_flag='true';
									  break;
								 }
								 else
								 {
									 $address_flag='false';
								 }
								
							}
                           if($coapp_data_emails!='')
						   {

							foreach($coapp_data_emails as $data_email)
							{
								$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
								$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
								 if(strcmp($str1,$str2)==0 )
								 {
									$email_flag='true';
									  break;
								 }
								 else
								 {
									 $email_flag='false';
									
								 }
							}	
							  $coapp_email_flag[$i]=$email_flag;
							  $coapp_add_flag[$i]=$address_flag;
						   }

					 
					}
					else
					{
						$total_obligation=0;
						$coapp_add_flag[$i]='false';
						$coapp_add_flag[$i]='false';
						$coapp_data_obligations_array[$i]=array();	
						$coapp_credit_score_array[$i]=array();
						$coapp_credit_score=array();
						
					}
					
					$coapp_data_credit_analysis_array[$i]=$coapp_data_credit_analysis;
					$coapp_data_credit_score_array[$i]=$coapp_data_credit_score;
					$coapp_data_obligation_array[$i]=$total_obligation;
                	$i++;
					
				}

			   	
			}
			else
			{
				$data_coapplicant_no=0;
				$data_coapplicant=array();
			}		
		
		$this->load->helper('url');	
		$age = $this->session->userdata('AGE');
		$u_type = $this->session->userdata("USER_TYPE");
		$q = 1;
		if($u_type == 'DSA')$q = 2;
		$main_doc_row = $this->Customercrud_model->getMainDocumentsCount($q);
		$saved_doc_row = $this->Customercrud_model->getSavedDocumentsCount($id);
		$data_row_documents= $this->Customercrud_model->getDocuments($id);
		if(!empty($data_coapplicant))
			{
				$z=0;
				$new_doc_array = array();
				foreach ($data_coapplicant as $coapplicant) 
				{
					//echo $coapplicant->UNIQUE_CODE;
					$data_row_documents1 = $this->Customercrud_model->getDocuments($coapplicant->UNIQUE_CODE);
					array_push($new_doc_array ,$data_row_documents1);
					$z++ ;
		    	}
		    } 
			else{
			    $new_doc_array = array();
			}
        $data['new_doc_array'] =$new_doc_array;


		if($saved_doc_row->doc_count==$main_doc_row->doc_count){
			$age = 1;
		}else $age = 0;
        
		// added by priyanka=========================
		//echo $this->session->userdata("User_name");
			$username=$this->session->userdata("User_name");
			$data['username'] =$username;
		//===========================================
		$data['documents'] =$data_row_documents;
		$data['showNav'] = $age;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$data['id'] = $id;
		$data['row'] = $data_row;
		$data['row_more'] = $data_row_more;
		$data['coapplicants']=$data_coapplicant;
		$data['appliedloan']=$data_appliedloan;
		$data['no_of_coapplicant']=$data_coapplicant_no;
		$data['income_details']=$data_incomedetails;
		$data['login_fees_status']=$login_fees_status;
		$data['login_fees_required']=$login_fees['Login_fees_required'];
		$data['Payment_Recived_date']=$Payment_Recived_date;
		$this->load->view('header', $data);
		$this->load->view('Operations_user/customer_update_profile_2');
	}
	public function customer_flow_update_s_one()
	{
		$id = $this->session->userdata("Cust_id");
		$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
		  $CAM_CREATED_BY=$this->input->post('CAM_CREATED_BY');
		//	echo $CAM_CREATED_BY;
		//	exit();
		
		for ($i =1; $i<=$data_coapplicant_no; $i++) 
		{
		  $name=$this->input->post('f_name_'.$i);
			$COAPP_ID=$this->input->post('COAPP_ID_'.$i);
			
			$u_unique_code = $this->input->post('COAPP_ID_'.$i);
			$dob = $this->input->post('dob_'.$i);		
			$diff = abs(strtotime(date("Y-m-d")) - strtotime($dob));
			$years = floor($diff / (365*60*60*24));
			
 			
           
 			$coapp_ITR_Status = $this->input->post('itr_status_'.$i);

		    $array_input_more = array(
			'CUST_ID' => $id,
			'AGE' => $years,
			'FN' => $this->input->post('f_name_'.$i),
			'MN' => $this->input->post('m_name_'.$i),
			'LN' => $this->input->post('l_name_'.$i),
			'DOB' => $dob,
			'RES_ADDRS_LINE_1' => $this->input->post('resi_add_1_'.$i),			
			'RES_ADDRS_LINE_2' => $this->input->post('resi_add_2_'.$i),
			'RES_ADDRS_LINE_3' => $this->input->post('resi_add_3_'.$i),
			'EMAIL' => $this->input->post('email_'.$i),
			'MOBILE' => $this->input->post('mobile_'.$i),
			'EDUCATION_BACKGROUND' => $this->input->post('education_type_'.$i),
			'NO_OF_DEPENDANTS' => $this->input->post('NO_OF_DEPENDANTS_'.$i),
			'PER_ADDRS_LINE_1' => $this->input->post('per_add_1_'.$i),
			'PER_ADDRS_LINE_2' => $this->input->post('per_add_2_'.$i),
			'PER_ADDRS_LINE_3' => $this->input->post('per_add_3_'.$i),
			'GENDER' => $this->input->post('gender_'.$i),	
            'MARTIAL_STATUS' => $this->input->post('marital_'.$i),	
            'RES_ADDRS_PROPERTY_TYPE' => $this->input->post('resi_sel_property_type_'.$i),	
            'NATIVE_PLACE' => $this->input->post('NATIVE_PLACE_'.$i),
            'RES_ADDRS_NO_YEARS_LIVING' => $this->input->post('resi_no_of_years_'.$i),
			'Locality_type'=>$this->input->post('Locality_type_'.$i)
            
			
			
			);
			
			$array_input_income = array(
			'ITR_status'=>$coapp_ITR_Status,
			'Vechical_NO_available'=>$this->input->post('Vechical_NO_available_'.$i),
			'Vechical_Number'=>'',
			'Passport_available'=>$this->input->post('passport_avl_'.$i),
			'Passport_Number'=>$this->input->post('passport_no_'.$i),
			'Driving_l_available'=>$this->input->post('Driving_l_available_'.$i),
			'Driving_l_Number'=>$this->input->post('Driving_l_Number_'.$i),	
            'Account_Number_available'=>$this->input->post('Account_Number_available_'.$i),
			'Account_Number'=>$this->input->post('Account_Number_'.$i),		
            'EPFO_Number_available'=>$this->input->post('EPFO_Number_available_'.$i),
			'EPFO_Number'=>$this->input->post('EPFO_Number_'.$i),
            'Official_mail_available'=>$this->input->post('Official_mail_available_'.$i),
			'Official_mail'=>$this->input->post('Official_mail_'.$i)			
			);
			
			$this->Customercrud_model->update_coapplicant_income($u_unique_code, $array_input_income);
			$this->Customercrud_model->update_coapplicant($u_unique_code, $array_input_more);
			
		}
		
		
		    $Vechical_type=$_POST['Vechical_type'];
 			$vechical_no=$_POST['vechical_no'];
			
			$result=array();
		for($i=0;$i<count($vechical_no);$i++)
 				{
  					if($Vechical_type[$i]!="" && $vechical_no[$i]!="")
  						{
  							 //mysql_query("insert into employee_table values('$name[$i]','$age[$i]','$job[$i]')");	
							   array_push($result,array(
								"Vechical_type"=>$Vechical_type[$i],
								"vechical_no"=>$vechical_no[$i],
					     	
								)
							); 
  						}
 				}
			$Vechical_details=json_encode(array("result"=>$result));
		
		$dob = $this->input->post('dob');		
		$diff = abs(strtotime(date("Y-m-d")) - strtotime($dob));
		$years = floor($diff / (365*60*60*24));
		$array_input = array(
		    'FN' => $this->input->post('f_name'),
			'MN' => $this->input->post('m_name'),
			'LN' => $this->input->post('l_name'),
			'GENDER' => $this->input->post('gender'),	
			'AGE' => $years,
			'DOB' => $dob,
			'EMAIL' => $this->input->post('email'),
			'MOBILE' => $this->input->post('mobile'),
			'EDUCATION_BACKGROUND' => $this->input->post('education_type'),
			'MARTIAL_STATUS' => $this->input->post('marital'),
			'login_fees_verification'=>$this->input->post('login_fees')
			
			);
			//echo $id;
			//echo "resi_sel_property_type=".$this->input->post('resi_sel_property_type');			
			//echo "resi_add=".$this->input->post('resi_add_1');		
			//echo "resi_add_2=".$this->input->post('resi_add_2');
			//echo "resi_add_3=".$this->input->post('resi_add_3');
			//echo "NO_OF_DEPENDANTS=".$this->input->post('NO_OF_DEPENDANTS');
			//echo "NATIVE_PLACE=".$this->input->post('NATIVE_PLACE');
			//echo "resi_no_of_years=".$this->input->post('resi_no_of_years');
			//echo "per_add_1=".$this->input->post('per_add_1');
			//echo "per_add_2=".$this->input->post('per_add_2');
			//echo "per_add_3=".$this->input->post('per_add_3');
			//echo "Vechical_NO_available=".$this->input->post('Vechical_NO_available');
			//echo "vechical_no=".$this->input->post('vechical_no');
			//echo "passport_avl=".$this->input->post('passport_avl');
			//echo "passport_no=".$this->input->post('passport_no');
		    //echo "Driving_l_available=".$this->input->post('Driving_l_available');
			//echo "Driving_l_Number=".$this->input->post('Driving_l_Number');
			//echo "Account_Number_available=".$this->input->post('Account_Number_available');
			//echo "Account_Number=".$this->input->post('Account_Number');
			//echo "EPFO_Number_available=".$this->input->post('EPFO_Number_available');
			//echo "EPFO_Number=".$this->input->post('EPFO_Number');
			//echo "Official_mail_available=".$this->input->post('Official_mail_available');
			//echo "Official_mail=".$this->input->post('Official_mail');
			//echo "Locality_type=".$this->input->post('Locality_type');
            //exit();
	    //-------------- added by priya 4-08-2022-----------------------------
			$save_itr_status = array(
				 				 'ITR_status' =>  $this->input->post('itr_status')
				 			);
            $this->Customercrud_model->update_profile_income_details($id, $save_itr_status);
        //=====================================================================================
			$array_input_more = array(
			'CUST_ID' => $id,
			'RES_ADDRS_PROPERTY_TYPE' => $this->input->post('resi_sel_property_type'),			
			'RES_ADDRS_LINE_1' => $this->input->post('resi_add_1'),			
			'RES_ADDRS_LINE_2' => $this->input->post('resi_add_2'),
			'RES_ADDRS_LINE_3' => $this->input->post('resi_add_3'),
			'NO_OF_DEPENDANTS'=>$this->input->post('NO_OF_DEPENDANTS'),
			'NATIVE_PLACE'=>$this->input->post('NATIVE_PLACE'),
			'RES_ADDRS_NO_YEARS_LIVING' => $this->input->post('resi_no_of_years'),
			'PER_ADDRS_LINE_1' => $this->input->post('per_add_1'),
			'PER_ADDRS_LINE_2' => $this->input->post('per_add_2'),
			'PER_ADDRS_LINE_3' => $this->input->post('per_add_3'),
			'Vechical_NO_available'=>$this->input->post('Vechical_NO_available'),
			'Vechical_Number_1'=>$Vechical_details,
			'Passport_available'=>$this->input->post('passport_avl'),
			'Passport_Number'=>$this->input->post('passport_no'),
			'Driving_l_available'=>$this->input->post('Driving_l_available'),
			'Driving_l_Number'=>$this->input->post('Driving_l_Number'),
			'Account_Number_available'=>$this->input->post('Account_Number_available'),
			'Account_Number'=>$this->input->post('Account_Number'),
			'EPFO_Number_available'=>$this->input->post('EPFO_Number_available'),
			'EPFO_Number'=>$this->input->post('EPFO_Number'),
			'Official_mail_available'=>$this->input->post('Official_mail_available'),
			'Official_mail'=>$this->input->post('Official_mail'),
			'Locality_type'=>$this->input->post('Locality_type'),
			'CPA_ID'=>$CAM_CREATED_BY
			);
			$Login_fees=array('Payment_Recived_date'=>$this->input->post('dor'));
			$payment_details=$this->Admin_model->get_payment_deteils_offline($id);
			if(!empty($payment_details))
			{
				$updated_array_login= $this->Customercrud_model->update_login_fees_offline($id, $Login_fees);
			}
			else
			{
				$payment_details=$this->Admin_model->get_payment_deteils($id);
				if(!empty($payment_details))
				{
					$updated_array_login= $this->Customercrud_model->update_login_fees_online($id, $Login_fees);
				}

			}

			
			$updated_array= $this->Customercrud_model->update_profile($id, $array_input);
			$updated_array_input_more=$this->Customercrud_model->update_profile_more($id, $array_input_more);
			if($updated_array > 0)
			{
			   $this->session->set_flashdata('success','success');
			   redirect('Operations_user/Document_verification');
				
			}
			else
			{
				 $this->session->set_flashdata('error','error');
			     redirect('Operations_user/CAM_Applicant_Details');
			}
			
			
	}
public function Document_verification()
	{
		if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
			//$this->load->view('header', $data);
			$this->load->view('login', $data);
		}else{
			$id =$this->session->userdata("Cust_id");
			if ($id == '') {
				$id = $this->session->userdata("Cust_id");
			}

			//=======================added by priyanka==============
		$data_row = $this->Operations_user_model->getProfileData($id);
		$dsa_id=$data_row->DSA_ID;
	
		$dsa_info= $this->Dsacrud_model->getProfileData($dsa_id);
		if(!empty($dsa_info))
		{
			if($dsa_info->MN!='')
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
			else
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
		}
		else
		{
			$dsa_name='';
		}
		$data['dsa_name']=$dsa_name;

		$DSA_ID=$data_row->DSA_ID;
			
			$MANAGER_ID=$data_row->MANAGER_ID;
			$CSR_ID=$data_row->CSR_ID;
	        $BM_ID=$data_row->BM_ID;
			$CM_ID=$data_row->CM_ID;
			$RO_ID=$data_row->RO_ID;
			$SELES_ID=$data_row->SELES_ID;
		    if($DSA_ID!='NULL' && $DSA_ID!='' && $DSA_ID!='0')
			{
				$Sourcing_info= $this->Dsacrud_model->getProfileData($DSA_ID);
				$Sourcing_Type="DSA";
				$Sourcing_By="DSA Name";
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
					$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Manager Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="CSR Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Branch Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Cluster Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Relationship Officer Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Sales Manager";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
			$data['Sourcing_name']=$Sourcing_name;
			$data['Sourcing_By']=$Sourcing_By;
			$data['Sourcing_Type']=$Sourcing_Type;
			$data['Sourcing_city']=$Sourcing_city;
			$data['Sourcing_state']=$Sourcing_state;
	//=====================================================
			$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			$data_row = $this->Operations_user_model->getProfileData($id);
			$data_row_more = $this->Operations_user_model->getProfileDataMore($id);
            $data_doc = $this->Dsacrud_model->getDocument($id);
			$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
			$data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
			$data_row_documents= $this->Customercrud_model->getDocuments($id);
			$address=$data_row_more->RES_ADDRS_LINE_1." ".$data_row_more->RES_ADDRS_LINE_2." ".$data_row_more->RES_ADDRS_LINE_3;
			$per_address=$data_row_more->PER_ADDRS_LINE_1." ".$data_row_more->PER_ADDRS_LINE_2." ".$data_row_more->PER_ADDRS_LINE_3;
           
			$data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
			if($data_credit_score!='')
			{
				$data_response=$data_credit_score->response;
				$data_address=json_decode($data_response,true);
				if(isset($data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
				{
				$data_emails=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
				$data_add=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
				
				}
				else
				{
					$data_emails=array();
					$data_add=array();
				}
				
				foreach($data_add as $data_ad)
				{
					$str1= preg_replace('/\s+/', ' ', trim($address));
					$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
					$str3=preg_replace('/\s+/', ' ', trim($per_address));
					 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
					 {
						$address_flag='true';
						  break;
					 }
					 else
					 {
						 $address_flag='false';
					 }
				}
				foreach($data_emails as $data_email)
				{
					$str1= preg_replace('/\s+/', ' ', trim($data_row->EMAIL));
					$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
					 if(strcmp($str1,$str2)==0 )
					 {
						$email_flag='true';
						  break;
					 }
					 else
					 {
						 $email_flag='false';
						
					 }
				}	
			}
			else
			{
				 $address_flag='false';
				  $email_flag='false';
				  $data_address="";
			}
			if($data_appliedloan->LOAN_TYPE=='home')
				{
					$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
					$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
					$coapp_add_flag=array();
					$coapp_email_flag=array();
					$i=1;
					foreach($data_coapplicant as $coapplicant)
					{
					
						
						 
						$coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
						$coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
						$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
						if(!empty($coapp_data_credit_score))
						{
							$coapp_data_response=$coapp_data_credit_score->response;
							//$coapp_data_address=json_decode($data_response,true);
                            $coapp_data_address=json_decode($coapp_data_response,true);
							
							if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
							{
								$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
							}
							else
							{
								$coapp_data_emails="";
							}
							if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo']))
							{
								$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
							}
							else
							{
								$coapp_data_add=array();
							}
							
							foreach($coapp_data_add as $data_ad)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
									$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
									$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
									 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
									 {
										$address_flag='true';
										  break;
									 }
									 else
									 {
										 $address_flag='false';
									 }
								}
								if($coapp_data_emails!="")
								{
								foreach($coapp_data_emails as $data_email)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
									$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
									 if(strcmp($str1,$str2)==0 )
									 {
										$email_flag='true';
										  break;
									 }
									 else
									 {
										 $email_flag='false';
										
									 }
								}	
								}	
						}
						else
						{
							$address_flag='false';
							$email_flag='false';
						}
						if(isset($address_flag) )
						{
	                       $coapp_add_flag[$i]=$address_flag;
						}
						else
						{
							$address_flag='false';
							 $coapp_add_flag[$i]=$address_flag;
						
						}

						if(isset($email_flag) )
						{
	                       $coapp_email_flag[$i]=$email_flag;
						}
						else
						{
							 $email_flag='false';
							 
						$coapp_email_flag[$i]=$email_flag;
						
						}
					  
						$i++;
						
					}
				   
					
					
				}
				elseif($data_appliedloan->LOAN_TYPE=='lap')
				{
					$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
					$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
					$coapp_add_flag=array();
					$coapp_email_flag=array();
					$i=1;
					foreach($data_coapplicant as $coapplicant)
					{
					
						
						 
						$coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
						$coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
						$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
						if(!empty($coapp_data_credit_score))
						{
							$coapp_data_response=$coapp_data_credit_score->response;
							//$coapp_data_address=json_decode($data_response,true);
							$coapp_data_address=json_decode($coapp_data_response,true);
							
							if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
							{
								$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
								$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
							
							}
							else
							{
								$coapp_data_emails="";
								$coapp_data_add=array();
							}
							
							foreach($coapp_data_add as $data_ad)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
									$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
									$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
									 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
									 {
										$address_flag='true';
										  break;
									 }
									 else
									 {
										 $address_flag='false';
									 }
								}
								if($coapp_data_emails!="")
								{
								foreach($coapp_data_emails as $data_email)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
									$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
									 if(strcmp($str1,$str2)==0 )
									 {
										$email_flag='true';
										  break;
									 }
									 else
									 {
										 $email_flag='false';
										
									 }
								}	
							}
							else
							{
								$address_flag='false';
							    $email_flag='false';
							}
						}
						else
						{
							$address_flag='false';
							$email_flag='false';
						}

						$coapp_add_flag[$i]=$address_flag;
						$coapp_email_flag[$i]=$email_flag;
						$i++;
						
					}
				   
					
					
				}
				else
				{
					$data_coapplicant_no=0;
					$data_coapplicant=array();
					$coapp_add_flag=array();
					$coapp_email_flag=array();
				}		
			 
			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$q = 1;
			if($u_type == 'DSA')$q = 2;
			if($data_row->PROFILE_PERCENTAGE == 100){
				$age = 1;
			}else $age = 0;

			// added by priyanka=========================
			if(!empty($data_coapplicant))
			{
				$z=0;
				$new_doc_array = array();
				foreach ($data_coapplicant as $coapplicant) 
				{
					//echo $coapplicant->UNIQUE_CODE;
					$data_row_documents1 = $this->Customercrud_model->getDocuments($coapplicant->UNIQUE_CODE);
					array_push($new_doc_array ,$data_row_documents1);
					$z++ ;
		    	}
		    } 
            $data['new_doc_array'] =$new_doc_array;




			//echo $this->session->userdata("User_name");
			$username=$this->session->userdata("User_name");
			$data['username'] =$username;
			//===========================================

			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row'] = $data_row;
			$data['appliedloan']=$data_appliedloan;
			$data['documents'] =$data_row_documents;
			$data['row_more'] = $data_row_more;
			$data['Doc'] = $data_doc;
			$data['data_incomedetails']=$data_incomedetails;
			$data['coapplicants']=$data_coapplicant;
			$data['address_flag']=$address_flag;
			$data['email_flag']=$email_flag;
			$data['coapplicants']=$data_coapplicant;
			$data['coapp_add_flag']=$coapp_add_flag;
			$data['coapp_email_flag']=$coapp_email_flag;
			$data['cam_processed_userData']= $this->Operations_user_model->getProfileData($data_row_more->CPA_ID);
		
			$this->load->view('header', $data);
			$this->load->view('Operations_user/CAM_Document_details');	
		}
		
	}
	public function Edit_Document_verification()
	{
		if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
			//$this->load->view('header', $data);
			$this->load->view('login', $data);
		}else{
			$id =$this->session->userdata("Cust_id");
			if ($id == '') {
				$id = $this->session->userdata("Cust_id");
			}



			//=======================added by priyanka==============
		$data_row = $this->Operations_user_model->getProfileData($id);
		$dsa_id=$data_row->DSA_ID;
	
		$dsa_info= $this->Dsacrud_model->getProfileData($dsa_id);
		if(!empty($dsa_info))
		{
			if($dsa_info->MN!='')
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
			else
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
		}
		else
		{
			$dsa_name='';
		}
		$data['dsa_name']=$dsa_name;

		$DSA_ID=$data_row->DSA_ID;
			
			$MANAGER_ID=$data_row->MANAGER_ID;
			$CSR_ID=$data_row->CSR_ID;
	        $BM_ID=$data_row->BM_ID;
	        $SELES_ID=$data_row->SELES_ID;
			
			$RO_ID=$data_row->RO_ID;
		    if($DSA_ID!='NULL' && $DSA_ID!='' && $DSA_ID!='0')
			{
				$Sourcing_info= $this->Dsacrud_model->getProfileData($DSA_ID);
				$Sourcing_Type="DSA";
				$Sourcing_By="DSA Name";
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
					$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Manager Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="CSR Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Branch Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Relationship Officer Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Sales Manager";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By='';
			}
			$data['Sourcing_name']=$Sourcing_name;
			$data['Sourcing_By']=$Sourcing_By;
			$data['Sourcing_Type']=$Sourcing_Type;
			$data['Sourcing_city']=$Sourcing_city;
			$data['Sourcing_state']=$Sourcing_state;
	//=====================================================
			$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			$data_row = $this->Operations_user_model->getProfileData($id);
			$data_row_more = $this->Operations_user_model->getProfileDataMore($id);
            $data_doc = $this->Dsacrud_model->getDocument($id);
			$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
			$data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
			$address=$data_row_more->RES_ADDRS_LINE_1." ".$data_row_more->RES_ADDRS_LINE_2." ".$data_row_more->RES_ADDRS_LINE_3;
			$per_address=$data_row_more->PER_ADDRS_LINE_1." ".$data_row_more->PER_ADDRS_LINE_2." ".$data_row_more->PER_ADDRS_LINE_3;
           
			$data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
			if($data_credit_score!='')
			{
				$data_response=$data_credit_score->response;
				$data_address=json_decode($data_response,true);
				if(isset($data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
				{
				$data_emails=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
				$data_add=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
				
				}
				else{
					$data_emails=[];
					$data_add=array();
				}
				
				foreach($data_add as $data_ad)
				{
					$str1= preg_replace('/\s+/', ' ', trim($address));
					$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
					$str3=preg_replace('/\s+/', ' ', trim($per_address));
					 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
					 {
						$address_flag='true';
						  break;
					 }
					 else
					 {
						 $address_flag='false';
					 }
				}
				foreach($data_emails as $data_email)
				{
					$str1= preg_replace('/\s+/', ' ', trim($data_row->EMAIL));
					$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
					 if(strcmp($str1,$str2)==0 )
					 {
						$email_flag='true';
						  break;
					 }
					 else
					 {
						 $email_flag='false';
						
					 }
				}	
			}
			else
			{
				  $address_flag='false';
				  $email_flag='false';
				  $data_address="";
			}
			if($data_appliedloan->LOAN_TYPE=='home')
				{
					 
					$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
					$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
					$coapp_add_flag=array();
					$coapp_email_flag=array();
					$i=1;
					foreach($data_coapplicant as $coapplicant)
					{
					 
						$coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
						$coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
						$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
						if(!empty($coapp_data_credit_score))
						{
							$coapp_data_response=$coapp_data_credit_score->response;
							//$coapp_data_address=json_decode($data_response,true);
							$coapp_data_address=json_decode($coapp_data_response,true);
							if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
							{
								$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
							}
							else
							{
								$coapp_data_emails=array();
							}
							if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo']))
							{
									$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
							}
							else
							{
								$coapp_data_add=array();
							}
						 $email_flag='false';
						 $address_flag='false';
							foreach($coapp_data_add as $data_ad)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
									$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
									$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
									 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
									 {
										$address_flag='true';
										  break;
									 }
									 else
									 {
										 $address_flag='false';
									 }
								}
								if($coapp_data_emails!="")
								{
								foreach($coapp_data_emails as $data_email)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
									$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
									 if(strcmp($str1,$str2)==0 )
									 {
										$email_flag='true';
										  break;
									 }
									 else
									 {
										 $email_flag='false';
										
									 }
								}	
								$coapp_email_flag[$i]=$email_flag;
							}	
						}
						else
						{
							$address_flag='false';
							$email_flag='false';
						}

						$coapp_add_flag[$i]=$address_flag;
						$coapp_email_flag[$i]=$email_flag;
						$i++;
						
					}
				   
				
				}
				elseif($data_appliedloan->LOAN_TYPE=='lap')
				{
					
					$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
					$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
					$coapp_add_flag=array();
					$coapp_email_flag=array();
					$address_flag="false";
							$email_flag="false";
					$i=1;
					foreach($data_coapplicant as $coapplicant)
					{
					
						
						 
						$coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
						$coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
						$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
						if(!empty($coapp_data_credit_score))
						{
							$coapp_data_response=$coapp_data_credit_score->response;
							//$coapp_data_address=json_decode($data_response,true);
							$coapp_data_address=json_decode($coapp_data_response,true);
							if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
							{
								$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
								$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
						
							}
							else
							{
								$coapp_data_emails="";
								$coapp_data_add=array();
							}
							foreach($coapp_data_add as $data_ad)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
									$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
									$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
									 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
									 {
										$address_flag='true';
										  break;
									 }
									 else
									 {
										 $address_flag='false';
									 }
								}
								if($coapp_data_emails!="")
								{ 
								foreach($coapp_data_emails as $data_email)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
									$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
									 if(strcmp($str1,$str2)==0 )
									 {
										$email_flag='true';
										  break;
									 }
									 else
									 {
										 $email_flag='false';
										
									 }
								}	
							}
						}
						else
						{
							
							$address_flag="false";
							$email_flag="false";
							
						}
                      
						$coapp_add_flag[$i]=$address_flag;
						$coapp_email_flag[$i]=$email_flag;
						$i++;
						
					}
				   
					
					
				}
				else
				{
					echo "hello 3---";
					 exit;
					$data_coapplicant_no=0;
					$data_coapplicant=array();
					$coapp_add_flag=array();
					$coapp_email_flag=array();
				}		
			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$data_row_documents= $this->Customercrud_model->getDocuments($id);
			
			if(!empty($data_coapplicant))
			{
				$z=0;
				$new_doc_array = array();
				foreach ($data_coapplicant as $coapplicant) 
				{
					//echo $coapplicant->UNIQUE_CODE;
					$data_row_documents1 = $this->Customercrud_model->getDocuments($coapplicant->UNIQUE_CODE);
					array_push($new_doc_array ,$data_row_documents1);
					$z++ ;
		    	}
		    } 
            $data['new_doc_array'] =$new_doc_array;



			$q = 1;
			if($u_type == 'DSA')$q = 2;
			if($data_row->PROFILE_PERCENTAGE == 100){
				$age = 1;
			}else $age = 0;

			// added by priyanka=========================
			//echo $this->session->userdata("User_name");
			$username=$this->session->userdata("User_name");
			$data['username'] =$username;
			//===========================================

			$data['documents'] =$data_row_documents;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row'] = $data_row;
			$data['row_more'] = $data_row_more;
			$data['Doc'] = $data_doc;
			$data['appliedloan']=$data_appliedloan;
			$data['data_incomedetails']=$data_incomedetails;
			$data['coapplicants']=$data_coapplicant;
			$data['address_flag']=$address_flag;
			$data['email_flag']=$email_flag;
			$data['coapplicants']=$data_coapplicant;
			$data['coapp_add_flag']=$coapp_add_flag;
			$data['coapp_email_flag']=$coapp_email_flag;
			$this->load->view('header', $data);
			$this->load->view('Operations_user/Edit_CAM_Document_details');	
		}
		
	}
	public function Update_Document_verification()
	{
		$id =$this->session->userdata("Cust_id");
		$CAM_CREATED_BY=$this->input->post('CAM_CREATED_BY');
	
	     /*	echo $id;
		    echo "Passport_no".$this->input->post('passport_no');
			echo "verify_Passport_no".$this->input->post('passport_verify');			
			echo "verify_Driving_l_Number".$this->input->post('Driving_verify');		
			echo"verify_EPFO_Number".$this->input->post('EPFO_verify');
			echo "verify_Account_Number".$this->input->post('Account_verify');
			echo "verify_Official_Mail".$this->input->post('Official_Mail_verify');
			echo "Vechical_no".$this->input->post('Vehicle_no');
			echo "verify_Vechical".$this->input->post('Vechical_verify');
			echo "verify_It_Returns".$this->input->post('IT_Returns_verify');
			echo "verify_Udyog_Aadhar".$this->input->post('Udyog_Aadhar_verify');
			echo "verify_Shop_Act".$this->input->post('Shop_Act_verify');
			echo "verify_Professional_Certificate".$this->input->post('Certificate_verify');
			echo "verify_Residence".$this->input->post('Residence_verify');
			echo "verify_Employment".$this->input->post('Employement_verify');
			echo "Recidance_Comment".$this->input->post('Residence_Comment');
			echo "Employment_Comment".$this->input->post('Employment_Comment');
			exit(); */
		$array_input_more = array(
			'CUST_ID' => $id,
			'verify_Passport_no' => $this->input->post('passport_verify'),			
			'verify_Driving_l_Number' => $this->input->post('Driving_verify'),			
			'verify_EPFO_Number' => $this->input->post('EPFO_verify'),
			'verify_Account_Number' => $this->input->post('Account_verify'),
			'verify_Official_Mail'=>$this->input->post('Official_Mail_verify'),
			'verify_Vechical'=>$this->input->post('Vechical_verify'),
			'verify_It_Returns' => $this->input->post('IT_Returns_verify'),
			'verify_Udyog_Aadhar' => $this->input->post('Udyog_Aadhar_verify'),
			'verify_Shop_Act' => $this->input->post('Shop_Act_verify'),
			'verify_Professional_Certificate' => $this->input->post('Certificate_verify'),
			'verify_Residence' => $this->input->post('Residence_verify'),
			'verify_Employment' => $this->input->post('Employement_verify'),
			'Recidance_Comment' => $this->input->post('Residence_Comment'),
			'Employment_Comment' => $this->input->post('Employment_Comment'),
			
			);
			
			$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
			}
			if($data_appliedloan->LOAN_TYPE=='lap')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
			}
					for ($i =1; $i<=$data_coapplicant_no; $i++) 
				{
				 
				    $COAPP_ID=$this->input->post('COAPP_ID_'.$i);
				/*		echo $COAPP_ID;
		   
			echo "verify_Passport_no".$this->input->post('passport_verify_'.$i);			
			echo "verify_Driving_l_Number".$this->input->post('Driving_verify_'.$i);		
			echo"verify_EPFO_Number".$this->input->post('EPFO_verify_'.$i);
			echo "verify_Account_Number".$this->input->post('Account_verify_'.$i);
			echo "verify_Official_Mail".$this->input->post('Official_Mail_verify_'.$i);
			echo "verify_Vechical".$this->input->post('Vechical_verify_'.$i);
			echo "verify_It_Returns".$this->input->post('IT_Returns_verify_'.$i);
			echo "verify_Udyog_Aadhar".$this->input->post('Udyog_Aadhar_verify_'.$i);
			echo "verify_Shop_Act".$this->input->post('Shop_Act_verify_'.$i);
			echo "verify_Professional_Certificate".$this->input->post('Certificate_verify_'.$i);
			echo "verify_Residence".$this->input->post('Residence_verify_'.$i);
			echo "verify_Employment".$this->input->post('Employement_verify_'.$i);
			echo "Recidance_Comment".$this->input->post('Residence_Comment_'.$i);
			echo "Employment_Comment".$this->input->post('Employment_Comment_'.$i);
			exit(); */
					$array_input_more_coapp = array(
											
											'verify_Passport_no' => $this->input->post('passport_verify_'.$i),			
											'verify_Driving_l_Number' => $this->input->post('Driving_verify_'.$i),			
											'verify_EPFO_Number' => $this->input->post('EPFO_verify_'.$i),
											'verify_Account_Number' => $this->input->post('Account_verify_'.$i),
											'verify_Official_Mail'=>$this->input->post('Official_Mail_verify_'.$i),
											'verify_Vechical'=>$this->input->post('Vechical_verify_'.$i),
											'verify_It_Returns' => $this->input->post('IT_Returns_verify_'.$i),
											'verify_Udyog_Aadhar' => $this->input->post('Udyog_Aadhar_verify_'.$i),
											'verify_Shop_Act' => $this->input->post('Shop_Act_verify_'.$i),
											'verify_Professional_Certificate' => $this->input->post('Certificate_verify_'.$i),
											'verify_Residence' => $this->input->post('Residence_verify_'.$i),
											'verify_Employment' => $this->input->post('Employement_verify_'.$i),
											'Recidance_Comment' => $this->input->post('Residence_Comment_'.$i),
											'Employment_Comment' => $this->input->post('Employment_Comment_'.$i),
											
											);
				
					$this->Customercrud_model->update_coapplicant_income($COAPP_ID, $array_input_more_coapp);
					
				}
			$updated_array_input_more=$this->Customercrud_model->update_profile_more($id, $array_input_more);
			if($updated_array_input_more > 0)
			{
			  
			   $this->session->set_flashdata('success','success');
			   redirect('Operations_user/Credit_Analysis');
				
			}
			else
			{
				 $this->session->set_flashdata('error','error');
			     redirect('Operations_user/Document_verification');
			}
	}
	 public function Credit_Analysis()
	 {
		    if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
			//$this->load->view('header', $data);
			$this->load->view('login', $data);
			}else{
				$id =$this->session->userdata("Cust_id");
				if ($id == '') {
					$id = $this->session->userdata("Cust_id");
				}
				
		   //=======================added by priyanka==============
		$data_row = $this->Operations_user_model->getProfileData($id);
		$dsa_id=$data_row->DSA_ID;
	
		$dsa_info= $this->Dsacrud_model->getProfileData($dsa_id);
		if(!empty($dsa_info))
		{
			if($dsa_info->MN!='')
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
			else
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
		}
		else
		{
			$dsa_name='';
		}
		$data['dsa_name']=$dsa_name;

		
		$DSA_ID=$data_row->DSA_ID;
			
			$MANAGER_ID=$data_row->MANAGER_ID;
			$CSR_ID=$data_row->CSR_ID;
	        $BM_ID=$data_row->BM_ID;
			 $CM_ID=$data_row->CM_ID;
			$RO_ID=$data_row->RO_ID;
			$SELES_ID=$data_row->SELES_ID;
		    if($DSA_ID!='NULL' && $DSA_ID!='' && $DSA_ID!='0')
			{
				$Sourcing_info= $this->Dsacrud_model->getProfileData($DSA_ID);
				$Sourcing_Type="DSA";
				$Sourcing_By="DSA Name";
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
					$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Manager Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="CSR Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Cluster Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Branch Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Relationship Officer Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Sales Manager";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
			$data['Sourcing_name']=$Sourcing_name;
			$data['Sourcing_By']=$Sourcing_By;
			$data['Sourcing_Type']=$Sourcing_Type;
			$data['Sourcing_city']=$Sourcing_city;
			$data['Sourcing_state']=$Sourcing_state;
	//=====================================================
            $data_row = $this->Operations_user_model->getProfileData($id);
			$data_credit_analysis=$this->Operations_user_model->getcreditData($id);
			$data_row_more = $this->Operations_user_model->getProfileDataMore($id);	
			$data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
			$address=$data_row_more->RES_ADDRS_LINE_1." ".$data_row_more->RES_ADDRS_LINE_2." ".$data_row_more->RES_ADDRS_LINE_3;
			$per_address=$data_row_more->PER_ADDRS_LINE_1." ".$data_row_more->PER_ADDRS_LINE_2." ".$data_row_more->PER_ADDRS_LINE_3;
			$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			if($data_credit_score!='')
			{
				$credit_score_response=json_decode($data_credit_score->response,true);
				if(!empty($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
				{
				$data_obligations=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
				$data_add=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
				
				}
				else
				{
					$data_obligations=[];
					$data_add=array();
				}
				
				$total_obligation=0;
				
				
				
				foreach($data_add as $data_ad)
				{
					$str1= preg_replace('/\s+/', ' ', trim($address));
					$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
					$str3=preg_replace('/\s+/', ' ', trim($per_address));
					 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
					 {
						$address_flag='true';
						  break;
					 }
					 else
					 {
						 $address_flag='false';
					 }
				}
				foreach($data_obligations as $data_obligation)
					{
						
						if($data_obligation['Open']=='Yes')
						{
							 if(isset($data_obligation['InstallmentAmount']))
							 {
								$total_obligation= $total_obligation+ $data_obligation['InstallmentAmount'];
							 }
						}
						else
						{
							break;
						}
					}
				
			}
			else
			{
				 $address_flag='false';
				 $data_obligations=array();
				 $credit_score_response=array();
			}
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
				$coapp_add_flag=array();
				$coapp_email_flag=array();
				$i=1;
				 $address_flag=array();
				foreach($data_coapplicant as $coapplicant)
				{
				
					
					 
					$coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
			        $coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
					$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
					
					$coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
					
				
					if(!empty($coapp_data_credit_score))
					{
						$coapp_data_response=$coapp_data_credit_score->response;
					    $coapp_data_address=json_decode($coapp_data_response,true);
				
					if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
					{
						$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
					
					}
					else
					{
						$coapp_data_emails="";
					}
					$total_obligation=0;
					if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo']))
					{
						$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
						$coapp_data_response=$coapp_data_credit_score->response;
						$coapp_credit_score=json_decode($coapp_data_response,true);
					}
					else
					{
						$coapp_data_add=array();
						$coapp_data_response='';
						$coapp_credit_score=array();

					}
				
						if(isset($coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
						{
							$coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
						}
						else
						{
							$coapp_data_obligations=[];
						}
						
						foreach($coapp_data_obligations as $coapp_data_obligation)
						{
							
							if($coapp_data_obligation['Open']=='Yes')
							{
								 if(isset($coapp_data_obligation['InstallmentAmount']))
								 {
									$total_obligation= $total_obligation+ $coapp_data_obligation['InstallmentAmount'];
								 }
								 
							}
							else
							{
								break;
							}
						}
					
							$address_flag='false';
							$coapp_data_obligations_array[$i]=$coapp_data_obligations;	
							$coapp_credit_score_array[$i]=$coapp_credit_score;
							foreach($coapp_data_add as $data_ad)
							{
								$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
								$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
								$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
								 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
								 {
									$address_flag='true';
									  break;
								 }
								 else
								 {
									 $address_flag='false';
								 }
							}
							if($coapp_data_emails!="")
							{
							foreach($coapp_data_emails as $data_email)
							{
								$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
								$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
								 if(strcmp($str1,$str2)==0 )
								 {
									$email_flag='true';
									  break;
								 }
								 else
								 {
									 $email_flag='false';
									
								 }
							}	
							$coapp_email_flag[$i]=$email_flag;
						}
							 $coapp_add_flag[$i]=$address_flag;
					       
					}
					else
					{
						$total_obligation=0;
						$coapp_data_obligations_array[$i]=array();	
						$coapp_credit_score_array[$i]=array();
						$coapp_credit_score=array();
						
					}
					
					
						

					
                   
					$coapp_data_credit_analysis_array[$i]=$coapp_data_credit_analysis;
					$coapp_data_credit_score_array[$i]=$coapp_data_credit_score;
					$coapp_data_obligation_array[$i]=$total_obligation;

					
					
					
					$i++;
					
				}
               
				
				
			}
			elseif($data_appliedloan->LOAN_TYPE=='lap')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
				$coapp_add_flag=array();
				$coapp_email_flag=array();
			    $address_flag=array();
				$i=1;
				foreach($data_coapplicant as $coapplicant)
				{
				    $coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
			        $coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
					$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
					$coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);



				

					if(!empty($coapp_data_credit_score))
					{
						$coapp_data_response=$coapp_data_credit_score->response;
					    $coapp_data_address=json_decode($coapp_data_response,true);

						//echo "<pre>";
						//print_r($coapp_data_address);
						//echo "</pre>";
				
							//exit();
				       
					    if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
						{
							$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
							$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
						
					    }
						else
						{
							$coapp_data_emails='';
							$coapp_data_add=array();
						}
						$coapp_data_response=$coapp_data_credit_score->response;
						$coapp_credit_score=json_decode($coapp_data_response,true);
						if(isset($coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
						{ $coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']; }
						else
						{ $coapp_data_obligations=array(); }

                        if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount']))
						{
					    $TotalSanctionAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];
						$data['TotalSanctionAmount']=$TotalSanctionAmount;
					    }
						else{
							$TotalSanctionAmount="";	
							$data['TotalSanctionAmount']="";
						}
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts']))
						{
						$NoOfAccounts=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts'];
						}
						else
						{
							$NoOfAccounts="";	
						}
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts']))
						{
						$NoOfActiveAccounts=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'];
						}
						else
						{
							$NoOfActiveAccounts="";
						}
						
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount']))
						{
							$coapp_TotalBalanceAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount'];
                        }
						else
						{
							$coapp_TotalBalanceAmount="";
						}
						//echo $TotalSanctionAmount;
						//$data['TotalSanctionAmount']=$TotalSanctionAmount;
						//exit();

                        if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsOpened']))
						{ $AccountsOpened=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsOpened']; }
						else
						{ $AccountsOpened="" ;}
						
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsDeliquent']))
						{ $AccountsDeliquent=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsDeliquent']; }
						else
						{ $AccountsDeliquent="" ;}
						
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['TotalInquiries']))
						{ $TotalInquiries=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['TotalInquiries']; }
						else
						{ $TotalInquiries="";	}
						
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsUpdated']))
						{ $AccountsUpdated=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsUpdated']; }
						else
						{ $AccountsUpdated="" ;}
						 
						foreach($coapp_data_obligations as $coapp_data_obligation)
						{
							
							if($coapp_data_obligation['Open']=='Yes')
							{
								 if(isset($coapp_data_obligation['InstallmentAmount']))
								 {
									$total_obligation= $total_obligation+ $coapp_data_obligation['InstallmentAmount'];
								 }
								 else
								 {
									$total_obligation=0; 
								 }
								 
							}
							else
							{   $total_obligation=0; 
								break;
							}
						}
						$coapp_data_obligations_array[$i]=$coapp_data_obligations;	
						
					    $coapp_credit_score_array[$i]=$coapp_credit_score;
						foreach($coapp_data_add as $data_ad)
							{
								$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
								$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
								$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
								 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
								 {
									$address_flag='true';
									  break;
								 }
								 else
								 {
									 $address_flag='false';
								 }
								
							}
							if($coapp_data_emails!="")
							{
								foreach($coapp_data_emails as $data_email)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
									$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
									 if(strcmp($str1,$str2)==0 )
									 {
										$email_flag='true';
									 	 break;
									 }
									 else
									 {
										 $email_flag='false';
									
								 	}
								}
								$coapp_email_flag[$i]=$email_flag;
								$coapp_add_flag[$i]=$address_flag;
							}	
							
					}
					else
					{
						$total_obligation=0;
						$coapp_add_flag[$i]='false';
						 $coapp_add_flag[$i]='false';
						$coapp_data_obligations_array[$i]=array();	
						$coapp_credit_score_array[$i]=array();
						$coapp_credit_score=array();
						
					}
					
					$coapp_data_credit_analysis_array[$i]=$coapp_data_credit_analysis;
					$coapp_data_credit_score_array[$i]=$coapp_data_credit_score;
					$coapp_data_obligation_array[$i]=$total_obligation;
                	$i++;
					
				}
				
				
			}
			else
			{
				$data_coapplicant_no=0;
				$data_coapplicant=array();
				$coapp_add_flag=array();
				$coapp_email_flag=array();
				$coapp_credit_score=array();
				$total_obligation=0;
                $coapp_data_obligations_array[]=array();	
			    $coapp_credit_score_array[]=array();
			    $coapp_data_obligation_array[]=$total_obligation;
				$coapp_data_credit_analysis_array=array();
				$coapp_data_credit_score_array=array();
			}	
			$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
			}
			elseif($data_appliedloan->LOAN_TYPE=='lap')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
			}
			else
			{
				$data_coapplicant_no=0;
				$data_coapplicant=array();
			}
			
			
			$data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
			$data_row_documents= $this->Customercrud_model->getDocuments($id);
			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$q = 1;
			if($u_type == 'DSA')$q = 2;
			if($data_row->PROFILE_PERCENTAGE == 100){
				$age = 1;
			}else $age = 0;

			// added by priyanka=========================
			if(!empty($data_coapplicant))
			{
				$z=0;
				$new_doc_array = array();
				foreach ($data_coapplicant as $coapplicant) 
				{
					//echo $coapplicant->UNIQUE_CODE;
					$data_row_documents1 = $this->Customercrud_model->getDocuments($coapplicant->UNIQUE_CODE);
					array_push($new_doc_array ,$data_row_documents1);
					$z++ ;
		    	}
		    } 
            $data['new_doc_array'] =$new_doc_array;



			//echo $this->session->userdata("User_name");
			$username=$this->session->userdata("User_name");
			$data['username'] =$username;
			//===========================================

			$data['documents'] =$data_row_documents;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row'] = $data_row;
			$data['row_more'] = $data_row_more;
			$data['coapplicants']=$data_coapplicant;
			$data['appliedloan']=$data_appliedloan;
			$data['no_of_coapplicant']=$data_coapplicant_no;
			$data['income_details']=$data_incomedetails;
			$data['data_credit_score']=$data_credit_score;
			$data['total_obligation']=$total_obligation;
			$data['data_obligations']=$data_obligations;
			$data['credit_score_response']=$credit_score_response;
			$data['address_flag']=$address_flag;
			$data['data_credit_analysis']=$data_credit_analysis;
			$data['coapp_credit_score']=$coapp_credit_score;
			$data['coapp_data_credit_analysis_array']=$coapp_data_credit_analysis_array;
			$data['coapp_data_credit_score_array']=$coapp_data_credit_score_array;
			$data['coapp_data_obligation_array']=$coapp_data_obligation_array;
			$data['coapp_data_obligations_array']=$coapp_data_obligations_array;
			$data['coapp_credit_score_array']=$coapp_credit_score_array;
			$data['coapp_add_flag']=$coapp_add_flag;
			$data['coapp_email_flag']=$coapp_email_flag;
			$data['cam_processed_userData']= $this->Operations_user_model->getProfileData($data_row_more->CPA_ID);
		
			$this->load->view('header', $data);
			$this->load->view('Operations_user/Credit_Analysis');		
			}			
	 }
	  public function Edit_Credit_Analysis()
	 {
		     if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
			//$this->load->view('header', $data);
			$this->load->view('login', $data);
			}else{
				$id =$this->session->userdata("Cust_id");
				if ($id == '') {
					$id = $this->session->userdata("Cust_id");
				}
				
		   //=======================added by priyanka==============
		$data_row = $this->Operations_user_model->getProfileData($id);
		$dsa_id=$data_row->DSA_ID;
	    $address_flag=array();
		$dsa_info= $this->Dsacrud_model->getProfileData($dsa_id);
		if(!empty($dsa_info))
		{
			if($dsa_info->MN!='')
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
			else
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
		}
		else
		{
			$dsa_name='';
		}
		$data['dsa_name']=$dsa_name;

		
		$DSA_ID=$data_row->DSA_ID;
			
			$MANAGER_ID=$data_row->MANAGER_ID;
			$CSR_ID=$data_row->CSR_ID;
	        $BM_ID=$data_row->BM_ID;
			$CM_ID=$data_row->CM_ID;
			$RO_ID=$data_row->RO_ID;
			$SELES_ID=$data_row->SELES_ID;
		    if($DSA_ID!='NULL' && $DSA_ID!='' && $DSA_ID!='0')
			{
				$Sourcing_info= $this->Dsacrud_model->getProfileData($DSA_ID);
				$Sourcing_Type="DSA";
				$Sourcing_By="DSA Name";
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
					$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Manager Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="CSR Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Branch Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Cluster Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
					    $Sourcing_state=$Sourcing_info->STATE;
					
				}
			}
			else if($RO_ID!='NULL' && $RO_ID!=''&& $RO_ID!='0')
			{
				$Sourcing_Type="Finaleap Sales";
				$Sourcing_By="Relationship Officer Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Sales Manager";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
			$data['Sourcing_name']=$Sourcing_name;
			$data['Sourcing_By']=$Sourcing_By;
			$data['Sourcing_Type']=$Sourcing_Type;
			$data['Sourcing_city']=$Sourcing_city;
			$data['Sourcing_state']=$Sourcing_state;
	//=====================================================
            $data_row = $this->Operations_user_model->getProfileData($id);
			$data_credit_analysis=$this->Operations_user_model->getcreditData($id);
			$data_row_more = $this->Operations_user_model->getProfileDataMore($id);	
			$data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
			$address=$data_row_more->RES_ADDRS_LINE_1." ".$data_row_more->RES_ADDRS_LINE_2." ".$data_row_more->RES_ADDRS_LINE_3;
			$per_address=$data_row_more->PER_ADDRS_LINE_1." ".$data_row_more->PER_ADDRS_LINE_2." ".$data_row_more->PER_ADDRS_LINE_3;
			$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			if($data_credit_score!='')
			{
				$credit_score_response=json_decode($data_credit_score->response,true);
				//echo "<pre>";
				//print_r($credit_score_response);
				//echo "</pre>";
				//exit();
				if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
				{
				$data_obligations=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
				/*--------added by nnnn-----*/
				
				
				$data_add=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
				
				}
				else{
					$data_obligations=array();
					$data_add=array();
					
				}
				if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['MicrofinanceAccountDetails']))
				{
					$data_obligations_micro=$credit_score_response['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['MicrofinanceAccountDetails'];
				}
				else
				{
					$data_obligations_micro=array();
					$data_add=array();
				}
				$total_obligation=0;
				
				
				
				foreach($data_add as $data_ad)
				{
					$str1= preg_replace('/\s+/', ' ', trim($address));
					$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
					$str3=preg_replace('/\s+/', ' ', trim($per_address));
					 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
					 {
						$address_flag='true';
						  break;
					 }
					 else
					 {
						 $address_flag='false';
					 }
				}
				foreach($data_obligations as $data_obligation)
					{
						
						if($data_obligation['Open']=='Yes')
						{
							 if(isset($data_obligation['InstallmentAmount']))
							 {
								$total_obligation= $total_obligation+ $data_obligation['InstallmentAmount'];
							 }
						}
						else
						{
							break;
						}
					}
					/*--- added by nnnn */
					foreach($data_obligations_micro as $data_obligation)
					{
						
						if($data_obligation['Open']=='Yes')
						{
							 if(isset($data_obligation['InstallmentAmount']))
							 {
								$total_obligation= $total_obligation+ $data_obligation['InstallmentAmount'];
							 }
						}
						else
						{
							break;
						}
					}
				
			}
			else
			{
				 $address_flag='false';
				 $data_obligations=array();
				 $credit_score_response=array();
			}
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
				$coapp_add_flag=array();
				$coapp_email_flag=array();
				$i=1;
				foreach($data_coapplicant as $coapplicant)
				{
				
					
					 
					$coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
			        $coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
					$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
					
					$coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
					
				
					if(!empty($coapp_data_credit_score))
					{
						$coapp_data_response=$coapp_data_credit_score->response;
					    $coapp_data_address=json_decode($coapp_data_response,true);
				
			    	if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
					{
						$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
					
					}
					else
					{
						$coapp_data_emails="";
					}
					$total_obligation=0;
					   // $coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo']))
							{
									$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
							}
							else
							{
								$coapp_data_add=array();
							}
						$coapp_data_response=$coapp_data_credit_score->response;
						$coapp_credit_score=json_decode($coapp_data_response,true);
						if(isset($coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
						{
						$coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
						}
						else
						{
							$coapp_data_obligations=[];
						}
						foreach($coapp_data_obligations as $coapp_data_obligation)
						{
							
							if($coapp_data_obligation['Open']=='Yes')
							{
								 if(isset($coapp_data_obligation['InstallmentAmount']))
								 {
									$total_obligation= $total_obligation+ $coapp_data_obligation['InstallmentAmount'];
								 }
								 else
								 {
									$total_obligation=0;
								 }
								 
							}
							else
							{
								$total_obligation=0; 
								break;
							}
						}
					
							$address_flag='false';
											$coapp_data_obligations_array[$i]=$coapp_data_obligations;	
											$coapp_credit_score_array[$i]=$coapp_credit_score;
							foreach($coapp_data_add as $data_ad)
							{
								$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
								$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
								$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
								 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
								 {
									$address_flag='true';
									  break;
								 }
								 else
								 {
									 $address_flag='false';
								 }
							}
                           if($coapp_data_emails!="")
						   {
							foreach($coapp_data_emails as $data_email)
							{
								$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
								$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
								 if(strcmp($str1,$str2)==0 )
								 {
									$email_flag='true';
									  break;
								 }
								 else
								 {
									 $email_flag='false';
									
								 }
							}
						
					         $coapp_email_flag[$i]=$email_flag;
						}
						$coapp_add_flag[$i]=$address_flag;
					}
					else
					{
						$total_obligation=0;
						$coapp_data_obligations_array[$i]=array();	
						$coapp_credit_score_array[$i]=array();
						$coapp_credit_score=array();
						
					}
					
					
						

					
                   
					$coapp_data_credit_analysis_array[$i]=$coapp_data_credit_analysis;
					$coapp_data_credit_score_array[$i]=$coapp_data_credit_score;
					$coapp_data_obligation_array[$i]=$total_obligation;

					
					
					
					$i++;
					
				}
               
				
				
			}
			elseif($data_appliedloan->LOAN_TYPE=='lap')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
				$coapp_add_flag=array();
				$coapp_email_flag=array();
				$i=1;
				foreach($data_coapplicant as $coapplicant)
				{
				    $coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
			        $coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
					$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
					$coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);



				

					if(!empty($coapp_data_credit_score))
					{
						$coapp_data_response=$coapp_data_credit_score->response;
					    $coapp_data_address=json_decode($coapp_data_response,true);

						//echo "<pre>";
						//print_r($coapp_data_address);
						//echo "</pre>";
				
							//exit();
				       
					   if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
						{
							$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
							$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
						
					    }
						else
						{

							$coapp_data_emails='';
							$coapp_data_add=array();
						}
						$coapp_data_response=$coapp_data_credit_score->response;
						$coapp_credit_score=json_decode($coapp_data_response,true);
						if(isset($coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
						{ $coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']; }
						else
						{ $coapp_data_obligations=array() ; }

                        if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount']))
						{  $TotalSanctionAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount']; 
						   $data['TotalSanctionAmount']=$TotalSanctionAmount;
						}
						else
						{
							$TotalSanctionAmount="";
							$data['TotalSanctionAmount']="";
						}

						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts']))
						{ $NoOfAccounts=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts']; }
						else
						{ $NoOfAccounts=""; }
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts']))
						{ $NoOfActiveAccounts=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts']; }
						else
						{  $NoOfActiveAccounts="" ;}
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount']))
						{ $coapp_TotalBalanceAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount']; }
						else
						{ $coapp_TotalBalanceAmount=""; }
                        //echo $TotalSanctionAmount;
						//$data['TotalSanctionAmount']=$TotalSanctionAmount;
						//exit();
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsOpened']))
						{ $AccountsOpened=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsOpened']; }
						else
						{ $AccountsOpened="" ;}
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsDeliquent']))
						{ $AccountsDeliquent=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsDeliquent']; }
						else
						{  $AccountsDeliquent=""; }
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['TotalInquiries']))
						{ $TotalInquiries=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['TotalInquiries']; }
						else
						{ $TotalInquiries=""; }
						if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsUpdated']))
						{ $AccountsUpdated=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsUpdated']; }
						else
						{ $AccountsUpdated="" ;}
						 
						foreach($coapp_data_obligations as $coapp_data_obligation)
						{
							
							if($coapp_data_obligation['Open']=='Yes')
							{
								 if(isset($coapp_data_obligation['InstallmentAmount']))
								 {
									$total_obligation= $total_obligation+ $coapp_data_obligation['InstallmentAmount'];
								 }
								 else
								 {
									$total_obligation=0; 
								 }
								 
							}
							else
							{
								$total_obligation=0; 
								break;
							}
						}
						$coapp_data_obligations_array[$i]=$coapp_data_obligations;	
					    $coapp_credit_score_array[$i]=$coapp_credit_score;
						foreach($coapp_data_add as $data_ad)
							{
								$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
								$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
								$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
								 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
								 {
									$address_flag='true';
									  break;
								 }
								 else
								 {
									 $address_flag='false';
								 }
								
							}
							if($coapp_data_emails!='')
							{
							foreach($coapp_data_emails as $data_email)
							{
								$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
								$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
								 if(strcmp($str1,$str2)==0 )
								 {
									$email_flag='true';
									  break;
								 }
								 else
								 {
									 $email_flag='false';
									
								 }
							}	
							  $coapp_email_flag[$i]=$email_flag;
							  $coapp_add_flag[$i]=$address_flag;
						}
					}
					else
					{
						$total_obligation=0;
						$coapp_add_flag[$i]='false';
						 $coapp_add_flag[$i]='false';
						$coapp_data_obligations_array[$i]=array();	
						$coapp_credit_score_array[$i]=array();
						$coapp_credit_score=array();
						
					}
					
					$coapp_data_credit_analysis_array[$i]=$coapp_data_credit_analysis;
					$coapp_data_credit_score_array[$i]=$coapp_data_credit_score;
					$coapp_data_obligation_array[$i]=$total_obligation;
                	$i++;
					
				}
				
				
			}
			else
			{
				$data_coapplicant_no=0;
				$data_coapplicant=array();
				$coapp_add_flag=array();
				$coapp_email_flag=array();
				$coapp_credit_score=array();
				$total_obligation=0;
                $coapp_data_obligations_array[]=array();	
			    $coapp_credit_score_array[]=array();
			    $coapp_data_obligation_array[]=$total_obligation;
				$coapp_data_credit_analysis_array=array();
				$coapp_data_credit_score_array=array();
			}	
			$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
			}
			elseif($data_appliedloan->LOAN_TYPE=='lap')
			{
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
			}
			else
			{
				$data_coapplicant_no=0;
				$data_coapplicant=array();
			}
			
			
			$data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
			$data_row_documents= $this->Customercrud_model->getDocuments($id);
			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$q = 1;
			if($u_type == 'DSA')$q = 2;
			if($data_row->PROFILE_PERCENTAGE == 100){
				$age = 1;
			}else $age = 0;

			// added by priyanka=========================



			if(!empty($data_coapplicant))
			{
				$z=0;
				$new_doc_array = array();
				foreach ($data_coapplicant as $coapplicant) 
				{
					//echo $coapplicant->UNIQUE_CODE;
					$data_row_documents1 = $this->Customercrud_model->getDocuments($coapplicant->UNIQUE_CODE);
					array_push($new_doc_array ,$data_row_documents1);
					$z++ ;
		    	}
		    } 
            $data['new_doc_array'] =$new_doc_array;
			//echo $this->session->userdata("User_name");
			$username=$this->session->userdata("User_name");
			$data['username'] =$username;
			//===========================================

			$data['documents'] =$data_row_documents;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row'] = $data_row;
			$data['row_more'] = $data_row_more;
			$data['coapplicants']=$data_coapplicant;
			$data['appliedloan']=$data_appliedloan;
			$data['no_of_coapplicant']=$data_coapplicant_no;
			$data['income_details']=$data_incomedetails;
			$data['data_credit_score']=$data_credit_score;
			$data['total_obligation']=$total_obligation;
			$data['data_obligations']=$data_obligations;
			/*----added by nnnn-----*/
			$data['data_obligations_micro']=$data_obligations_micro;
			/* ------------- */
			$data['credit_score_response']=$credit_score_response;
			$data['address_flag']=$address_flag;
			$data['data_credit_analysis']=$data_credit_analysis;
			$data['coapp_credit_score']=$coapp_credit_score;
			$data['coapp_data_credit_analysis_array']=$coapp_data_credit_analysis_array;
			$data['coapp_data_credit_score_array']=$coapp_data_credit_score_array;
			$data['coapp_data_obligation_array']=$coapp_data_obligation_array;
			$data['coapp_data_obligations_array']=$coapp_data_obligations_array;
			$data['coapp_credit_score_array']=$coapp_credit_score_array;
			$data['coapp_add_flag']=$coapp_add_flag;
			$data['coapp_email_flag']=$coapp_email_flag;
			$this->load->view('header', $data);
			$this->load->view('Operations_user/Edit_Credit_Analysis');		
			}			
	 }
	 public function Update_Credit_Analysis()
	  {
		    $Active_laon_1= $this->input->post('Active_laon_1');
			$Type_of_Loan_1=$this->input->post('Type_of_Loan_1');
			$Loan_Amount_1=$this->input->post('Loan_Amount_1');
			$Balance_Amount_1=$this->input->post('Balance_Amount_1');
			$EMI_1=$this->input->post('EMI_1');
			$count = count($Active_laon_1);
            $Additional_Emi=array();
			   for($i=0; $i<$count; $i++)
				{
				array_push($Additional_Emi, array(
				'Active_laon_1'=>$Active_laon_1[$i],
				'Type_of_Loan_1'=>$Type_of_Loan_1[$i],
				'Loan_Amount_1'=>$Loan_Amount_1[$i],
				'Balance_Amount_1'=>$Balance_Amount_1[$i],
				'EMI_1'=>$EMI_1[$i]
				));
				}
				//echo json_encode($references_array),
		   //exit;
		   $id =$this->session->userdata("Cust_id");
         $CAM_CREATED_BY=$this->input->post('CAM_CREATED_BY');
	 	// echo $CAM_CREATED_BY;
	 	// exit();
		   $data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
		   if($data_incomedetails->CUST_TYPE=='self employeed')
		   {
			   $montly_income=$data_incomedetails->BIS_ANNUAL_INCOME/12;
			  
			   if($this->input->post('obligation_self')!='')
			   {
				    $obligations=$this->input->post('obligation_self');
			   }
			   else
			   {
				   $obligations=0;
			   }
			  
			   $Foir=$obligations/$montly_income*100;
			   $Foir=$Foir.'%';
			  
			  
		   }
		   else 
		   {
			   $Foir=$this->input->post('foir');
		   }
		   $data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				//echo "line 4869";
				//exit();
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
				
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
			
					for ($i =1; $i<=$data_coapplicant_no; $i++) 
				{
					
				 
				    $COAPP_ID=$this->input->post('COAPP_ID_'.$i);
					$Active_laon_1= $this->input->post('Active_laon_1_'.$i);
					
					$Type_of_Loan_1=$this->input->post('Type_of_Loan_1_'.$i);
					$Loan_Amount_1=$this->input->post('Loan_Amount_1_'.$i);
					$Balance_Amount_1=$this->input->post('Balance_Amount_1_'.$i);
					$EMI_1=$this->input->post('EMI_1_'.$i);
					$count = count($Active_laon_1);
					
					$Additional_Emi_coapp=array();
					   for($j=0; $j<$count; $j++)
						{
						array_push($Additional_Emi_coapp, array(
						'Active_laon_1'=>$Active_laon_1[$j],
						'Type_of_Loan_1'=>$Type_of_Loan_1[$j],
						'Loan_Amount_1'=>$Loan_Amount_1[$j],
						'Balance_Amount_1'=>$Balance_Amount_1[$j],
						'EMI_1'=>$EMI_1[$j]
						));
						}

					//echo $this->input->post('Top_Creditors_1_'.$i);
					//echo $this->input->post('Top_Creditors_2_'.$i);
					//echo $this->input->post('Top_Creditors_3_'.$i);
					//echo $this->input->post('Top_Debtors_1_'.$i);
					//echo $this->input->post('Top_Debtors_2_'.$i);
					//echo $this->input->post('Top_Debtors_3_'.$i);

					//echo $this->input->post('Top_Debtors_1_Amt_'.$i);
				    //echo $this->input->post('Top_Debtors_2_Amt_'.$i);
		    		//echo $this->input->post('Top_Debtors_3_Amt_'.$i);
				    //echo $this->input->post('Top_Creditors_1_Amt_'.$i);
				    //echo $this->input->post('Top_Creditors_2_Amt_'.$i);
					//echo $this->input->post('Top_Creditors_3_Amt_'.$i);
					//exit();
					 $coapp_array_input_more = array(
						'ID' => $COAPP_ID,
						'verify_salary' => $this->input->post('verify_salary_'.$i),			
						'credit_salary' => $this->input->post('credit_salary_'.$i),			
						'verify_credit_salary' => $this->input->post('verify_credit_salary_'.$i),
						'verify_obligation' => $this->input->post('verify_obligation_'.$i),
						'residual_income'=>$this->input->post('residual_income_'.$i),
						'verify_residual_income'=>$this->input->post('verify_residual_income_'.$i),
						'epf_deduction_1' => $this->input->post('epf_deduction_1_'.$i),
						'epf_deduction_2' => $this->input->post('epf_deduction_2_'.$i),
						'epf_deduction_3' => $this->input->post('epf_deduction_3_'.$i),
						'loan_advance_deduction_1' => $this->input->post('loan_advance_deduction_1_'.$i),
						'loan_advance_deduction_2' => $this->input->post('loan_advance_deduction_2_'.$i),
						'loan_advance_deduction_3' => $this->input->post('loan_advance_deduction_3_'.$i),
						'any_other_deduction_1'=>$this->input->post('any_other_deduction_1_'.$i),
						'any_other_deduction_2'=>$this->input->post('any_other_deduction_2_'.$i),
						'any_other_deduction_3'=>$this->input->post('any_other_deduction_3_'.$i),
						'net_salary_1'=>$this->input->post('net_salary_1_'.$i),
						'net_salary_2'=>$this->input->post('net_salary_2_'.$i),
						'net_salary_3'=>$this->input->post('net_salary_3_'.$i),
						'avg_salary'=>$this->input->post('avg_salary_'.$i),
						'avg_loan_advance_deduction'=>$this->input->post('avg_loan_advance_deduction_'.$i),
						'avg_net_salary'=>$this->input->post('avg_net_salary_'.$i),
						'b_s_avg_balance'=>$this->input->post('b_s_avg_balance_'.$i),
						'b_s_total_credits'=>$this->input->post('b_s_total_credits_'.$i),
						'b_s_total_debits'=>$this->input->post('b_s_total_debits_'.$i),
						'b_s_salary'=>$this->input->post('b_s_salary_'.$i),
						'b_s_reimbursements'=>$this->input->post('b_s_reimbursements_'.$i),
						'b_s_houshold'=>$this->input->post('b_s_houshold_'.$i),
						'b_s_emi'=>$this->input->post('b_s_emi_'.$i),
						'b_s_charges'=>$this->input->post('b_s_charges_'.$i),
						'b_s_cheque_bounce_charges'=>$this->input->post('b_s_cheque_bounce_charges_'.$i),

						'Gross_Total_Income_1'=>$this->input->post('Gross_Total_Income_1_'.$i),
						'Net_Sales_1'=>$this->input->post('Net_Sales_1_'.$i),
						'Gross_Profit_1'=>$this->input->post('Gross_Profit_1_'.$i),
						'Interest_Expense_1'=>$this->input->post('Interest_Expense_1_'.$i),
						'Depreciation_1'=>$this->input->post('Depreciation_1_'.$i),
						'PBT_1'=>$this->input->post('PBT_1_'.$i),
						'PAT_1'=>$this->input->post('PAT_1_'.$i),
						'Networth_1'=>$this->input->post('Networth_1_'.$i),
						'Debt_1'=>$this->input->post('Debt_1_'.$i),
						'Working_Capital_1'=>$this->input->post('Working_Capital_1_'.$i),
						'Creditors_1'=>$this->input->post('Creditors_1_'.$i),
						'Fixed_Assets_1'=>$this->input->post('Fixed_Assets_1_'.$i),
						'Debtors_1'=>$this->input->post('Debtors_1_'.$i),
						'Bank_Balance_1'=>$this->input->post('Bank_Balance_1_'.$i),
						'Gross_Total_Income_2'=>$this->input->post('Gross_Total_Income_2_'.$i),
						'Net_Sales_2'=>$this->input->post('Net_Sales_2_'.$i),
						'Gross_Profit_2'=>$this->input->post('Gross_Profit_2_'.$i),
						'Interest_Expense_2'=>$this->input->post('Interest_Expense_2_'.$i),
						'Depreciation_2'=>$this->input->post('Depreciation_2_'.$i),
						'PBT_2'=>$this->input->post('PBT_2_'.$i),
						'PAT_2'=>$this->input->post('PAT_2_'.$i),
						'Networth_2'=>$this->input->post('Networth_2_'.$i),
						'Debt_2'=>$this->input->post('Debt_2_'.$i),
						'Working_Capital_2'=>$this->input->post('Working_Capital_2_'.$i),
						'Creditors_2'=>$this->input->post('Creditors_2_'.$i),
						'Fixed_Assets_2'=>$this->input->post('Fixed_Assets_2_'.$i),
						'Debtors_2'=>$this->input->post('Debtors_2_'.$i),
						'Bank_Balance_2'=>$this->input->post('Bank_Balance_2_'.$i),
						'Gross_Total_Income_3'=>$this->input->post('Gross_Total_Income_3_'.$i),
						'Net_Sales_3'=>$this->input->post('Net_Sales_3_'.$i),
						'Gross_Profit_3'=>$this->input->post('Gross_Profit_3_'.$i),
						'Interest_Expense_3'=>$this->input->post('Interest_Expense_3_'.$i),
						'Depreciation_3'=>$this->input->post('Depreciation_3_'.$i),
						'PBT_3'=>$this->input->post('PBT_3_'.$i),
						'PAT_3'=>$this->input->post('PAT_3_'.$i),
						'Networth_3'=>$this->input->post('Networth_3_'.$i),
						'Debt_3'=>$this->input->post('Debt_3_'.$i),
						'Working_Capital_3'=>$this->input->post('Working_Capital_3_'.$i),
						'Creditors_3'=>$this->input->post('Creditors_3_'.$i),
						'Fixed_Assets_3'=>$this->input->post('Fixed_Assets_3_'.$i),
						'Debtors_3'=>$this->input->post('Debtors_3_'.$i),
						'Bank_Balance_3'=>$this->input->post('Bank_Balance_3_'.$i),
						'Top_Creditors_1'=>$this->input->post('Top_Creditors_1_'.$i),
						'Top_Creditors_2'=>$this->input->post('Top_Creditors_2_'.$i),
						'Top_Creditors_3'=>$this->input->post('Top_Creditors_3_'.$i),
						'Top_Debtors_1'=>$this->input->post('Top_Debtors_1_'.$i),
						'Top_Debtors_2'=>$this->input->post('Top_Debtors_2_'.$i),
						'Top_Debtors_3'=>$this->input->post('Top_Debtors_3_'.$i),
						'Sales_cash_1'=>$this->input->post('Sales_cash_1_'.$i),
						'Purchase_cash_1'=>$this->input->post('Purchase_cash_1_'.$i),
						'Sales_bank_1'=>$this->input->post('Sales_bank_1_'.$i),
						'Purchase_bank_1'=>$this->input->post('Purchase_bank_1_'.$i),
						'Labour_paid_1'=>$this->input->post('Labour_paid_1_'.$i),
						'Transport_charges_1'=>$this->input->post('Transport_charges_1_'.$i),
						'Other_charges_1'=>$this->input->post('Other_charges_1_'.$i),
						'Total_income_1'=>$this->input->post('Total_income_1_'.$i),
						'Sales_cash_2'=>$this->input->post('Sales_cash_2_'.$i),
						'Purchase_cash_2'=>$this->input->post('Purchase_cash_2_'.$i),
						'Sales_bank_2'=>$this->input->post('Sales_bank_2_'.$i),
						'Purchase_bank_2'=>$this->input->post('Purchase_bank_2_'.$i),
						'Labour_paid_2'=>$this->input->post('Labour_paid_2_'.$i),
						'Transport_charges_2'=>$this->input->post('Transport_charges_2_'.$i),
						'Other_charges_2'=>$this->input->post('Other_charges_2_'.$i),
						'Total_income_2'=>$this->input->post('Total_income_2_'.$i),
						'Sales_cash_3'=>$this->input->post('Sales_cash_3_'.$i),
						'Purchase_cash_3'=>$this->input->post('Purchase_cash_3_'.$i),
						'Sales_bank_3'=>$this->input->post('Sales_bank_3_'.$i),
						'Purchase_bank_3'=>$this->input->post('Purchase_bank_3_'.$i),
						'Labour_paid_3'=>$this->input->post('Labour_paid_3_'.$i),
						'Transport_charges_3'=>$this->input->post('Transport_charges_3_'.$i),
						'Other_charges_3'=>$this->input->post('Other_charges_3_'.$i),
						'Total_income_3'=>$this->input->post('Total_income_3_'.$i),
						'Sales_cash_4'=>$this->input->post('Sales_cash_4_'.$i),
						'Purchase_cash_4'=>$this->input->post('Purchase_cash_4_'.$i),
						'Sales_bank_4'=>$this->input->post('Sales_bank_4_'.$i),
						'Purchase_bank_4'=>$this->input->post('Purchase_bank_4_'.$i),
						'Labour_paid_4'=>$this->input->post('Labour_paid_4_'.$i),
						'Transport_charges_4'=>$this->input->post('Transport_charges_4_'.$i),
						'Other_charges_4'=>$this->input->post('Other_charges_4_'.$i),
						'Total_income_4'=>$this->input->post('Total_income_4_'.$i),
						'Sales_cash_5'=>$this->input->post('Sales_cash_5_'.$i),
						'Purchase_cash_5'=>$this->input->post('Purchase_cash_5_'.$i),
						'Sales_bank_5'=>$this->input->post('Sales_bank_5_'.$i),
						'Purchase_bank_5'=>$this->input->post('Purchase_bank_5_'.$i),
						'Labour_paid_5'=>$this->input->post('Labour_paid_5_'.$i),
						'Transport_charges_5'=>$this->input->post('Transport_charges_5_'.$i),
						'Other_charges_5'=>$this->input->post('Other_charges_5_'.$i),
						'Total_income_5'=>$this->input->post('Total_income_5_'.$i),
						'Sales_cash_6'=>$this->input->post('Sales_cash_6_'.$i),
						'Purchase_cash_6'=>$this->input->post('Purchase_cash_6_'.$i),
						'Sales_bank_6'=>$this->input->post('Sales_bank_6_'.$i),
						'Purchase_bank_6'=>$this->input->post('Purchase_bank_6_'.$i),
						'Labour_paid_6'=>$this->input->post('Labour_paid_6_'.$i),
						'Transport_charges_6'=>$this->input->post('Transport_charges_6_'.$i),
						'Other_charges_6'=>$this->input->post('Other_charges_6_'.$i),
						'Total_income_6'=>$this->input->post('Total_income_6_'.$i),
						'Total_Sales_cash'=>$this->input->post('Total_Sales_cash_'.$i),
						'Total_Purchase_cash'=>$this->input->post('Total_Purchase_cash_'.$i),
						'Total_Sales_bank'=>$this->input->post('Total_Sales_bank_'.$i),
						'Total_Purchase_bank'=>$this->input->post('Total_Purchase_bank_'.$i),
						'Total_Labour_paid'=>$this->input->post('Total_Labour_paid_'.$i),
						'Total_Transport_charges'=>$this->input->post('Total_Transport_charges_'.$i),
						'Total_Other_charges'=>$this->input->post('Total_Other_charges_'.$i),
						'Total_Total_income'=>$this->input->post('Total_Total_income_'.$i),
						'Top_Debtors_1_Amt'=>$this->input->post('Top_Debtors_1_Amt_'.$i),
						'Top_Debtors_2_Amt'=>$this->input->post('Top_Debtors_2_Amt_'.$i),
		    			'Top_Debtors_3_Amt'=>$this->input->post('Top_Debtors_3_Amt_'.$i),
						'Top_Creditors_1_Amt'=>$this->input->post('Top_Creditors_1_Amt_'.$i),
						'Top_Creditors_2_Amt'=>$this->input->post('Top_Creditors_2_Amt_'.$i),
						'Top_Creditors_3_Amt'=>$this->input->post('Top_Creditors_3_Amt_'.$i),
						'coapp_consider_status'=>$this->input->post('consider_coapplicant_'.$i),
							// code for no itr table values //

							'sales_per_month_1' =>  $this->input->post('NO_itr_value_1_'.$i),
							'sales_per_cust_1' => $this->input->post('NO_itr_value_2_'.$i),
							'cust_per_day_1' =>  $this->input->post('NO_itr_value_3_'.$i),
							'total_chachement_1' =>  $this->input->post('NO_itr_value_4_'.$i),
							'sales_per_month_2' => $this->input->post('NO_itr_value_5_'.$i),
							'sales_per_cust_2' =>  $this->input->post('NO_itr_value_6_'.$i),
							'cust_per_day_2' => $this->input->post('NO_itr_value_7_'.$i),
							'total_chachement_2' =>  $this->input->post('NO_itr_value_8_'.$i),
							'sales_per_month_3' =>   $this->input->post('NO_itr_value_9_'.$i),
							'sales_per_cust_3' =>  $this->input->post('NO_itr_value_10_'.$i),
							'cust_per_day_3' =>  $this->input->post('NO_itr_value_11_'.$i),
							'total_chachement_3' =>  $this->input->post('NO_itr_value_12_'.$i),
							'total_anual' =>  $this->input->post('total_annual_'.$i),
							'total_gross_margin' =>  $this->input->post('total_gross_margin_'.$i),
							'total_profit' =>  $this->input->post('total_profit_'.$i),
							'total_utilities' =>   $this->input->post('total_expenses_utilities_'.$i),
							'total_salaries' =>   $this->input->post('total_expenses_salaries_'.$i),
							'total_rental' =>   $this->input->post('total_expenses_rentals_'.$i),
							'total_recurring' =>   $this->input->post('total_additional_recurring_expenses_'.$i),
							'gross_profit' =>   $this->input->post('gross_profit_'.$i),
							'Additional_Emi'=>json_encode($Additional_Emi_coapp),
							'Aditional_Emi_Total'=>$this->input->post('Additinal_emi_total_'.$i),
							'Bureau_Emi_Total'=>$this->input->post('Bureau_Emi_Total_'.$i)
						
						
						);
						
						 $array_input = array(
							  'ORG_SALARY_1'=>$this->input->post('gross_salary_1_'.$i),
							  'ORG_SALARY_2'=>$this->input->post('gross_salary_2_'.$i),
							  'ORG_SALARY_3'=>$this->input->post('gross_salary_3_'.$i),
						 );

						/* 	echo $i;
					  echo "<pre>";
				      print_r($coapp_array_input_more);
					  echo "</pre>";
					  */
						 $Result_id = $this->Customercrud_model->update_coapplicant_income($COAPP_ID, $array_input);
				
					$check_id = $this->Operations_user_model->check_coapp_cam_profile($COAPP_ID);
					
					if($check_id > 0)$update_id = $this->Operations_user_model->update_coapp_cam_credit($COAPP_ID, $coapp_array_input_more);
					else $update_id = $this->Operations_user_model->insert_coapp_cam_credit($COAPP_ID, $coapp_array_input_more);
					
				}
				//exit();
			}

			if($data_appliedloan->LOAN_TYPE=='lap')
			{
			

				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
				
				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
			//echo $data_coapplicant_no	;			
					for ($i =1; $i<=$data_coapplicant_no; $i++) 
				{
					
				 
				    $COAPP_ID=$this->input->post('COAPP_ID_'.$i);
					//echo $COAPP_ID."<br>";
					//echo $this->input->post('b_s_avg_balance_'.$i);
					//echo $this->input->post('b_s_total_credits_'.$i);
					//echo $this->input->post('b_s_total_debits_'.$i);
					//echo $this->input->post('b_s_salary_'.$i);
					//echo $this->input->post('b_s_reimbursements_'.$i);
					//echo $this->input->post('b_s_houshold_'.$i);
					//echo $this->input->post('b_s_emi_'.$i);
	               // echo $this->input->post('b_s_charges_'.$i);
					//echo $this->input->post('b_s_cheque_bounce_charges_'.$i);
					//exit();

					 $coapp_array_input_more = array(
						'ID' => $COAPP_ID,
						'verify_salary' => $this->input->post('verify_salary_'.$i),			
						'credit_salary' => $this->input->post('credit_salary_'.$i),			
						'verify_credit_salary' => $this->input->post('verify_credit_salary_'.$i),
						'verify_obligation' => $this->input->post('verify_obligation_'.$i),
						'residual_income'=>$this->input->post('residual_income_'.$i),
						'verify_residual_income'=>$this->input->post('verify_residual_income_'.$i),
						'epf_deduction_1' => $this->input->post('epf_deduction_1_'.$i),
						'epf_deduction_2' => $this->input->post('epf_deduction_2_'.$i),
						'epf_deduction_3' => $this->input->post('epf_deduction_3_'.$i),
						'loan_advance_deduction_1' => $this->input->post('loan_advance_deduction_1_'.$i),
						'loan_advance_deduction_2' => $this->input->post('loan_advance_deduction_2_'.$i),
						'loan_advance_deduction_3' => $this->input->post('loan_advance_deduction_3_'.$i),
						'any_other_deduction_1'=>$this->input->post('any_other_deduction_1_'.$i),
						'any_other_deduction_2'=>$this->input->post('any_other_deduction_2_'.$i),
						'any_other_deduction_3'=>$this->input->post('any_other_deduction_3_'.$i),
						'net_salary_1'=>$this->input->post('net_salary_1_'.$i),
						'net_salary_2'=>$this->input->post('net_salary_2_'.$i),
						'net_salary_3'=>$this->input->post('net_salary_3_'.$i),
						'avg_salary'=>$this->input->post('avg_salary_'.$i),
						'avg_loan_advance_deduction'=>$this->input->post('avg_loan_advance_deduction_'.$i),
						'avg_net_salary'=>$this->input->post('avg_net_salary_'.$i),
						'b_s_avg_balance'=>$this->input->post('b_s_avg_balance_'.$i),
						'b_s_total_credits'=>$this->input->post('b_s_total_credits_'.$i),
						'b_s_total_debits'=>$this->input->post('b_s_total_debits_'.$i),
						'b_s_salary'=>$this->input->post('b_s_salary_'.$i),
						'b_s_reimbursements'=>$this->input->post('b_s_reimbursements_'.$i),
						'b_s_houshold'=>$this->input->post('b_s_houshold_'.$i),
						'b_s_emi'=>$this->input->post('b_s_emi_'.$i),
						'b_s_charges'=>$this->input->post('b_s_charges_'.$i),
						'b_s_cheque_bounce_charges'=>$this->input->post('b_s_cheque_bounce_charges_'.$i),
                      
						'Gross_Total_Income_1'=>$this->input->post('Gross_Total_Income_1_'.$i),
						'Net_Sales_1'=>$this->input->post('Net_Sales_1_'.$i),
						'Gross_Profit_1'=>$this->input->post('Gross_Profit_1_'.$i),
						'Interest_Expense_1'=>$this->input->post('Interest_Expense_1_'.$i),
						'Depreciation_1'=>$this->input->post('Depreciation_1_'.$i),
						'PBT_1'=>$this->input->post('PBT_1_'.$i),
						'PAT_1'=>$this->input->post('PAT_1_'.$i),
						'Networth_1'=>$this->input->post('Networth_1_'.$i),
						'Debt_1'=>$this->input->post('Debt_1_'.$i),
						'Working_Capital_1'=>$this->input->post('Working_Capital_1_'.$i),
						'Creditors_1'=>$this->input->post('Creditors_1_'.$i),
						'Fixed_Assets_1'=>$this->input->post('Fixed_Assets_1_'.$i),
						'Debtors_1'=>$this->input->post('Debtors_1_'.$i),
						'Bank_Balance_1'=>$this->input->post('Bank_Balance_1_'.$i),
						'Gross_Total_Income_2'=>$this->input->post('Gross_Total_Income_2_'.$i),
						'Net_Sales_2'=>$this->input->post('Net_Sales_2_'.$i),
						'Gross_Profit_2'=>$this->input->post('Gross_Profit_2_'.$i),
						'Interest_Expense_2'=>$this->input->post('Interest_Expense_2_'.$i),
						'Depreciation_2'=>$this->input->post('Depreciation_2_'.$i),
						'PBT_2'=>$this->input->post('PBT_2_'.$i),
						'PAT_2'=>$this->input->post('PAT_2_'.$i),
						'Networth_2'=>$this->input->post('Networth_2_'.$i),
						'Debt_2'=>$this->input->post('Debt_2_'.$i),
						'Working_Capital_2'=>$this->input->post('Working_Capital_2_'.$i),
						'Creditors_2'=>$this->input->post('Creditors_2_'.$i),
						'Fixed_Assets_2'=>$this->input->post('Fixed_Assets_2_'.$i),
						'Debtors_2'=>$this->input->post('Debtors_2_'.$i),
						'Bank_Balance_2'=>$this->input->post('Bank_Balance_2_'.$i),
						'Gross_Total_Income_3'=>$this->input->post('Gross_Total_Income_3_'.$i),
						'Net_Sales_3'=>$this->input->post('Net_Sales_3_'.$i),
						'Gross_Profit_3'=>$this->input->post('Gross_Profit_3_'.$i),
						'Interest_Expense_3'=>$this->input->post('Interest_Expense_3_'.$i),
						'Depreciation_3'=>$this->input->post('Depreciation_3_'.$i),
						'PBT_3'=>$this->input->post('PBT_3_'.$i),
						'PAT_3'=>$this->input->post('PAT_3_'.$i),
						'Networth_3'=>$this->input->post('Networth_3_'.$i),
						'Debt_3'=>$this->input->post('Debt_3_'.$i),
						'Working_Capital_3'=>$this->input->post('Working_Capital_3_'.$i),
						'Creditors_3'=>$this->input->post('Creditors_3_'.$i),
						'Fixed_Assets_3'=>$this->input->post('Fixed_Assets_3_'.$i),
						'Debtors_3'=>$this->input->post('Debtors_3_'.$i),
						'Bank_Balance_3'=>$this->input->post('Bank_Balance_3_'.$i),
						'Top_Creditors_1'=>$this->input->post('Top_Creditors_1_'.$i),
						'Top_Creditors_2'=>$this->input->post('Top_Creditors_2_'.$i),
						'Top_Creditors_3'=>$this->input->post('Top_Creditors_3_'.$i),
						'Top_Debtors_1'=>$this->input->post('Top_Debtors_1_'.$i),
						'Top_Debtors_2'=>$this->input->post('Top_Debtors_2_'.$i),
						'Top_Debtors_3'=>$this->input->post('Top_Debtors_3_'.$i),
						'Sales_cash_1'=>$this->input->post('Sales_cash_1_'.$i),
						'Purchase_cash_1'=>$this->input->post('Purchase_cash_1_'.$i),
						'Sales_bank_1'=>$this->input->post('Sales_bank_1_'.$i),
						'Purchase_bank_1'=>$this->input->post('Purchase_bank_1_'.$i),
						'Labour_paid_1'=>$this->input->post('Labour_paid_1_'.$i),
						'Transport_charges_1'=>$this->input->post('Transport_charges_1_'.$i),
						'Other_charges_1'=>$this->input->post('Other_charges_1_'.$i),
						'Total_income_1'=>$this->input->post('Total_income_1_'.$i),
						'Sales_cash_2'=>$this->input->post('Sales_cash_2_'.$i),
						'Purchase_cash_2'=>$this->input->post('Purchase_cash_2_'.$i),
						'Sales_bank_2'=>$this->input->post('Sales_bank_2_'.$i),
						'Purchase_bank_2'=>$this->input->post('Purchase_bank_2_'.$i),
						'Labour_paid_2'=>$this->input->post('Labour_paid_2_'.$i),
						'Transport_charges_2'=>$this->input->post('Transport_charges_2_'.$i),
						'Other_charges_2'=>$this->input->post('Other_charges_2_'.$i),
						'Total_income_2'=>$this->input->post('Total_income_2_'.$i),
						'Sales_cash_3'=>$this->input->post('Sales_cash_3_'.$i),
						'Purchase_cash_3'=>$this->input->post('Purchase_cash_3_'.$i),
						'Sales_bank_3'=>$this->input->post('Sales_bank_3_'.$i),
						'Purchase_bank_3'=>$this->input->post('Purchase_bank_3_'.$i),
						'Labour_paid_3'=>$this->input->post('Labour_paid_3_'.$i),
						'Transport_charges_3'=>$this->input->post('Transport_charges_3_'.$i),
						'Other_charges_3'=>$this->input->post('Other_charges_3_'.$i),
						'Total_income_3'=>$this->input->post('Total_income_3_'.$i),
						'Sales_cash_4'=>$this->input->post('Sales_cash_4_'.$i),
						'Purchase_cash_4'=>$this->input->post('Purchase_cash_4_'.$i),
						'Sales_bank_4'=>$this->input->post('Sales_bank_4_'.$i),
						'Purchase_bank_4'=>$this->input->post('Purchase_bank_4_'.$i),
						'Labour_paid_4'=>$this->input->post('Labour_paid_4_'.$i),
						'Transport_charges_4'=>$this->input->post('Transport_charges_4_'.$i),
						'Other_charges_4'=>$this->input->post('Other_charges_4_'.$i),
						'Total_income_4'=>$this->input->post('Total_income_4_'.$i),
						'Sales_cash_5'=>$this->input->post('Sales_cash_5_'.$i),
						'Purchase_cash_5'=>$this->input->post('Purchase_cash_5_'.$i),
						'Sales_bank_5'=>$this->input->post('Sales_bank_5_'.$i),
						'Purchase_bank_5'=>$this->input->post('Purchase_bank_5_'.$i),
						'Labour_paid_5'=>$this->input->post('Labour_paid_5_'.$i),
						'Transport_charges_5'=>$this->input->post('Transport_charges_5_'.$i),
						'Other_charges_5'=>$this->input->post('Other_charges_5_'.$i),
						'Total_income_5'=>$this->input->post('Total_income_5_'.$i),
						'Sales_cash_6'=>$this->input->post('Sales_cash_6_'.$i),
						'Purchase_cash_6'=>$this->input->post('Purchase_cash_6_'.$i),
						'Sales_bank_6'=>$this->input->post('Sales_bank_6_'.$i),
						'Purchase_bank_6'=>$this->input->post('Purchase_bank_6_'.$i),
						'Labour_paid_6'=>$this->input->post('Labour_paid_6_'.$i),
						'Transport_charges_6'=>$this->input->post('Transport_charges_6_'.$i),
						'Other_charges_6'=>$this->input->post('Other_charges_6_'.$i),
						'Total_income_6'=>$this->input->post('Total_income_6_'.$i),
						'Total_Sales_cash'=>$this->input->post('Total_Sales_cash_'.$i),
						'Total_Purchase_cash'=>$this->input->post('Total_Purchase_cash_'.$i),
						'Total_Sales_bank'=>$this->input->post('Total_Sales_bank_'.$i),
						'Total_Purchase_bank'=>$this->input->post('Total_Purchase_bank_'.$i),
						'Total_Labour_paid'=>$this->input->post('Total_Labour_paid_'.$i),
						'Total_Transport_charges'=>$this->input->post('Total_Transport_charges_'.$i),
						'Total_Other_charges'=>$this->input->post('Total_Other_charges_'.$i),
						'Total_Total_income'=>$this->input->post('Total_Total_income_'.$i),
						'Top_Debtors_1_Amt'=>$this->input->post('Top_Debtors_1_Amt_'.$i),
						'Top_Debtors_2_Amt'=>$this->input->post('Top_Debtors_2_Amt_'.$i),
		    			'Top_Debtors_3_Amt'=>$this->input->post('Top_Debtors_3_Amt_'.$i),
						'Top_Creditors_1_Amt'=>$this->input->post('Top_Creditors_1_Amt_'.$i),
						'Top_Creditors_2_Amt'=>$this->input->post('Top_Creditors_2_Amt_'.$i),
						'Top_Creditors_3_Amt'=>$this->input->post('Top_Creditors_3_Amt_'.$i),
						'coapp_consider_status'=>$this->input->post('consider_coapplicant_'.$i),

							// code for no itr table values //

							'sales_per_month_1' =>  $this->input->post('NO_itr_value_1_'.$i),
							'sales_per_cust_1' => $this->input->post('NO_itr_value_2_'.$i),
							'cust_per_day_1' =>  $this->input->post('NO_itr_value_3_'.$i),
							'total_chachement_1' =>  $this->input->post('NO_itr_value_4_'.$i),
							'sales_per_month_2' => $this->input->post('NO_itr_value_5_'.$i),
							'sales_per_cust_2' =>  $this->input->post('NO_itr_value_6_'.$i),
							'cust_per_day_2' => $this->input->post('NO_itr_value_7_'.$i),
							'total_chachement_2' =>  $this->input->post('NO_itr_value_8_'.$i),
							'sales_per_month_3' =>   $this->input->post('NO_itr_value_9_'.$i),
							'sales_per_cust_3' =>  $this->input->post('NO_itr_value_10_'.$i),
							'cust_per_day_3' =>  $this->input->post('NO_itr_value_11_'.$i),
							'total_chachement_3' =>  $this->input->post('NO_itr_value_12_'.$i),
							'total_anual' =>  $this->input->post('total_annual_'.$i),
							'total_gross_margin' =>  $this->input->post('total_gross_margin_'.$i),
							'total_profit' =>  $this->input->post('total_profit_'.$i),
							'total_utilities' =>   $this->input->post('total_expenses_utilities_'.$i),
							'total_salaries' =>   $this->input->post('total_expenses_salaries_'.$i),
							'total_rental' =>   $this->input->post('total_expenses_rentals_'.$i),
							'total_recurring' =>   $this->input->post('total_additional_recurring_expenses_'.$i),
							'gross_profit' =>   $this->input->post('gross_profit_'.$i)
			              
			
						
						
						);
						
                      /*  echo "<pre>";
						print_r( $coapp_array_input_more);
						echo "</pre>";
						exit();*/
						 $array_input = array(
							  'ORG_SALARY_1'=>$this->input->post('gross_salary_1_'.$i),
							  'ORG_SALARY_2'=>$this->input->post('gross_salary_2_'.$i),
							  'ORG_SALARY_3'=>$this->input->post('gross_salary_3_'.$i),
						 );
						 $Result_id = $this->Customercrud_model->update_coapplicant_income($COAPP_ID, $array_input);
						//echo $i;
					  //echo "<pre>";
				      //print_r($coapp_array_input_more);
					  //echo "</pre>";
					$check_id = $this->Operations_user_model->check_coapp_cam_profile($COAPP_ID);
					//echo $COAPP_ID;
					//exit();
					if($check_id > 0)$update_id = $this->Operations_user_model->update_coapp_cam_credit($COAPP_ID, $coapp_array_input_more);
					    // if($update_id ) echo "updated"; else echo "not updated";
					
					else $update_id = $this->Operations_user_model->insert_coapp_cam_credit($COAPP_ID, $coapp_array_input_more);
					//if($update_id ) echo "inserted"; else echo "not inserted";
					
					
				}
				//exit();
			}
			//echo $this->input->post('PAT_1');
			//echo $this->input->post('PAT_2');
			//echo $this->input->post('PAT_3');
			//exit();
		   $array_input_more = array(
			'ID' => $id,
			'verify_salary' => $this->input->post('verify_salary'),			
			'credit_salary' => $this->input->post('credit_salary'),			
			'verify_credit_salary' => $this->input->post('verify_credit_salary'),
			'verify_obligation' => $this->input->post('verify_obligation'),
			'residual_income'=>$this->input->post('residual_income'),
			'verify_residual_income'=>$this->input->post('verify_residual_income'),
			'foir' =>$Foir,
			'eligibility' => $this->input->post('eligibility'),
			'epf_deduction_1' => $this->input->post('epf_deduction_1'),
			'epf_deduction_2' => $this->input->post('epf_deduction_2'),
			'epf_deduction_3' => $this->input->post('epf_deduction_3'),
			'loan_advance_deduction_1' => $this->input->post('loan_advance_deduction_1'),
			'loan_advance_deduction_2' => $this->input->post('loan_advance_deduction_2'),
			'loan_advance_deduction_3' => $this->input->post('loan_advance_deduction_3'),
			'any_other_deduction_1'=>$this->input->post('any_other_deduction_1'),
			'any_other_deduction_2'=>$this->input->post('any_other_deduction_2'),
			'any_other_deduction_3'=>$this->input->post('any_other_deduction_3'),
			'net_salary_1'=>$this->input->post('net_salary_1'),
			'net_salary_2'=>$this->input->post('net_salary_2'),
			'net_salary_3'=>$this->input->post('net_salary_3'),
			'avg_salary'=>$this->input->post('avg_salary'),
			'avg_loan_advance_deduction'=>$this->input->post('avg_loan_advance_deduction'),
			'avg_net_salary'=>$this->input->post('avg_net_salary'),
			'b_s_avg_balance'=>$this->input->post('b_s_avg_balance'),
			'b_s_total_credits'=>$this->input->post('b_s_total_credits'),
			'b_s_total_debits'=>$this->input->post('b_s_total_debits'),
			'b_s_salary'=>$this->input->post('b_s_salary'),
			'b_s_reimbursements'=>$this->input->post('b_s_reimbursements'),
			'b_s_houshold'=>$this->input->post('b_s_houshold'),
			'b_s_emi'=>$this->input->post('b_s_emi'),
			'b_s_charges'=>$this->input->post('b_s_charges'),
			'b_s_cheque_bounce_charges'=>$this->input->post('b_s_cheque_bounce_charges'),
			'b_s_no_cheque_bounce'=>$this->input->post('b_s_no_cheque_bounce'),
			'b_s_no_transaction'=>$this->input->post('b_s_no_transaction'),
			'b_s_ratio_cheque_bounce'=>$this->input->post('b_s_ratio_cheque_bounce'),
			'Gross_Total_Income_1'=>$this->input->post('Gross_Total_Income_1'),
			'b_s_avg_monthly_balance'=>$this->input->post('b_s_avg_monthly_balance'),
            'b_s_emi_amount'=>$this->input->post('b_s_emi_amount'),
			'b_s_monthl_balance_emi'=>$this->input->post('b_s_monthl_balance_emi'),
			'b_s_annual_income'=>$this->input->post('b_s_annual_income'),
			'b_s_ratio_income_loan'=>$this->input->post('b_s_ratio_income_loan'),
			'Net_Sales_1'=>$this->input->post('Net_Sales_1'),
			'Gross_Profit_1'=>$this->input->post('Gross_Profit_1'),
			'Interest_Expense_1'=>$this->input->post('Interest_Expense_1'),
			'Depreciation_1'=>$this->input->post('Depreciation_1'),
			'PBT_1'=>$this->input->post('PBT_1'),
			'PAT_1'=>$this->input->post('PAT_1'),
			'Networth_1'=>$this->input->post('Networth_1'),
			'Debt_1'=>$this->input->post('Debt_1'),
			'Working_Capital_1'=>$this->input->post('Working_Capital_1'),
			'Creditors_1'=>$this->input->post('Creditors_1'),
			'Fixed_Assets_1'=>$this->input->post('Fixed_Assets_1'),
			'Debtors_1'=>$this->input->post('Debtors_1'),
			'Bank_Balance_1'=>$this->input->post('Bank_Balance_1'),
			'Gross_Total_Income_2'=>$this->input->post('Gross_Total_Income_2'),
			'Net_Sales_2'=>$this->input->post('Net_Sales_2'),
			'Gross_Profit_2'=>$this->input->post('Gross_Profit_2'),
			'Interest_Expense_2'=>$this->input->post('Interest_Expense_2'),
			'Depreciation_2'=>$this->input->post('Depreciation_2'),
			'PBT_2'=>$this->input->post('PBT_2'),
			'PAT_2'=>$this->input->post('PAT_2'),
			'Networth_2'=>$this->input->post('Networth_2'),
			'Debt_2'=>$this->input->post('Debt_2'),
			'Working_Capital_2'=>$this->input->post('Working_Capital_2'),
			'Creditors_2'=>$this->input->post('Creditors_2'),
			'Fixed_Assets_2'=>$this->input->post('Fixed_Assets_2'),
			'Debtors_2'=>$this->input->post('Debtors_2'),
			'Bank_Balance_2'=>$this->input->post('Bank_Balance_2'),
			'Gross_Total_Income_3'=>$this->input->post('Gross_Total_Income_3'),
			'Net_Sales_3'=>$this->input->post('Net_Sales_3'),
			'Gross_Profit_3'=>$this->input->post('Gross_Profit_3'),
			'Interest_Expense_3'=>$this->input->post('Interest_Expense_3'),
			'Depreciation_3'=>$this->input->post('Depreciation_3'),
			'PBT_3'=>$this->input->post('PBT_3'),
			'PAT_3'=>$this->input->post('PAT_3'),
			'Networth_3'=>$this->input->post('Networth_3'),
			'Debt_3'=>$this->input->post('Debt_3'),
			'Working_Capital_3'=>$this->input->post('Working_Capital_3'),
			'Creditors_3'=>$this->input->post('Creditors_3'),
			'Fixed_Assets_3'=>$this->input->post('Fixed_Assets_3'),
			'Debtors_3'=>$this->input->post('Debtors_3'),
			'Bank_Balance_3'=>$this->input->post('Bank_Balance_3'),
			'Top_Creditors_1'=>$this->input->post('Top_Creditors_1'),
			'Top_Creditors_2'=>$this->input->post('Top_Creditors_2'),
			'Top_Creditors_3'=>$this->input->post('Top_Creditors_3'),
			'Top_Debtors_1'=>$this->input->post('Top_Debtors_1'),
			'Top_Debtors_2'=>$this->input->post('Top_Debtors_2'),
			'Top_Debtors_3'=>$this->input->post('Top_Debtors_3'),
			'Sales_cash_1'=>$this->input->post('Sales_cash_1'),
			'Purchase_cash_1'=>$this->input->post('Purchase_cash_1'),
			'Sales_bank_1'=>$this->input->post('Sales_bank_1'),
			'Purchase_bank_1'=>$this->input->post('Purchase_bank_1'),
			'Labour_paid_1'=>$this->input->post('Labour_paid_1'),
			'Transport_charges_1'=>$this->input->post('Transport_charges_1'),
			'Other_charges_1'=>$this->input->post('Other_charges_1'),
			'Total_income_1'=>$this->input->post('Total_income_1'),
			'Sales_cash_2'=>$this->input->post('Sales_cash_2'),
			'Purchase_cash_2'=>$this->input->post('Purchase_cash_2'),
			'Sales_bank_2'=>$this->input->post('Sales_bank_2'),
			'Purchase_bank_2'=>$this->input->post('Purchase_bank_2'),
			'Labour_paid_2'=>$this->input->post('Labour_paid_2'),
			'Transport_charges_2'=>$this->input->post('Transport_charges_2'),
			'Other_charges_2'=>$this->input->post('Other_charges_2'),
			'Total_income_2'=>$this->input->post('Total_income_2'),
			'Sales_cash_3'=>$this->input->post('Sales_cash_3'),
			'Purchase_cash_3'=>$this->input->post('Purchase_cash_3'),
			'Sales_bank_3'=>$this->input->post('Sales_bank_3'),
			'Purchase_bank_3'=>$this->input->post('Purchase_bank_3'),
			'Labour_paid_3'=>$this->input->post('Labour_paid_3'),
			'Transport_charges_3'=>$this->input->post('Transport_charges_3'),
			'Other_charges_3'=>$this->input->post('Other_charges_3'),
			'Total_income_3'=>$this->input->post('Total_income_3'),
			'Sales_cash_4'=>$this->input->post('Sales_cash_4'),
			'Purchase_cash_4'=>$this->input->post('Purchase_cash_4'),
			'Sales_bank_4'=>$this->input->post('Sales_bank_4'),
			'Purchase_bank_4'=>$this->input->post('Purchase_bank_4'),
			'Labour_paid_4'=>$this->input->post('Labour_paid_4'),
			'Transport_charges_4'=>$this->input->post('Transport_charges_4'),
			'Other_charges_4'=>$this->input->post('Other_charges_4'),
			'Total_income_4'=>$this->input->post('Total_income_4'),
			'Sales_cash_5'=>$this->input->post('Sales_cash_5'),
			'Purchase_cash_5'=>$this->input->post('Purchase_cash_5'),
			'Sales_bank_5'=>$this->input->post('Sales_bank_5'),
			'Purchase_bank_5'=>$this->input->post('Purchase_bank_5'),
			'Labour_paid_5'=>$this->input->post('Labour_paid_5'),
			'Transport_charges_5'=>$this->input->post('Transport_charges_5'),
			'Other_charges_5'=>$this->input->post('Other_charges_5'),
			'Total_income_5'=>$this->input->post('Total_income_5'),
			'Sales_cash_6'=>$this->input->post('Sales_cash_6'),
			'Purchase_cash_6'=>$this->input->post('Purchase_cash_6'),
			'Sales_bank_6'=>$this->input->post('Sales_bank_6'),
			'Purchase_bank_6'=>$this->input->post('Purchase_bank_6'),
			'Labour_paid_6'=>$this->input->post('Labour_paid_6'),
			'Transport_charges_6'=>$this->input->post('Transport_charges_6'),
			'Other_charges_6'=>$this->input->post('Other_charges_6'),
			'Total_income_6'=>$this->input->post('Total_income_6'),
			'Total_Sales_cash'=>$this->input->post('Total_Sales_cash'),
			'Total_Purchase_cash'=>$this->input->post('Total_Purchase_cash'),
			'Total_Sales_bank'=>$this->input->post('Total_Sales_bank'),
			'Total_Purchase_bank'=>$this->input->post('Total_Purchase_bank'),
			'Total_Labour_paid'=>$this->input->post('Total_Labour_paid'),
			'Total_Transport_charges'=>$this->input->post('Total_Transport_charges'),
			'Total_Other_charges'=>$this->input->post('Total_Other_charges'),
			'Total_Total_income'=>$this->input->post('Total_Total_income'),
			'Top_Debtors_1_Amt'=>$this->input->post('Top_Debtors_1_Amt'),
			'Top_Debtors_2_Amt'=>$this->input->post('Top_Debtors_2_Amt'),
		    'Top_Debtors_3_Amt'=>$this->input->post('Top_Debtors_3_Amt'),
			'Top_Creditors_1_Amt'=>$this->input->post('Top_Creditors_1_Amt'),
			'Top_Creditors_2_Amt'=>$this->input->post('Top_Creditors_2_Amt'),
			'Top_Creditors_3_Amt'=>$this->input->post('Top_Creditors_3_Amt'),

						// code for no itr table values //

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

						'final_loan_amount' =>   $this->input->post('final_loan_amount'),
						'final_roi' =>   $this->input->post('final_roi'),
						'final_tenure' =>   $this->input->post('final_tenure'),
						'Additional_Emi'=>json_encode($Additional_Emi),
						'Aditional_Emi_Total'=>$this->input->post('Additinal_emi_total'),
						'Bureau_Emi_Total'=>$this->input->post('Bureau_Emi_Total'),
						'CPA_ID'=> $CAM_CREATED_BY
			
			
			);
			
			 $array_input = array(
			      'ORG_SALARY_1'=>$this->input->post('gross_salary_1'),
				  'ORG_SALARY_2'=>$this->input->post('gross_salary_2'),
				  'ORG_SALARY_3'=>$this->input->post('gross_salary_3'),
			 );
			 
			 $Result_id = $this->Customercrud_model->update_profile_income_details($id, $array_input);
			$check_id = $this->Operations_user_model->check_cam_profile($id);
			if($check_id > 0)$update_id = $this->Operations_user_model->update_cam_credit($id, $array_input_more);
			else $update_id = $this->Operations_user_model->insert_cam_credit($id, $array_input_more);
			if($update_id > 0)
			{
				/* $array_input_more1 = array(
												//'cam_status'=>('Cam details complete'),
												'Cam_completed_date'=>date("Y/m/d")
											);
							
				$Result_id1 = $this->Customercrud_model->update_profile($id, $array_input_more1);



                  //============== last updated date
                 
				  $array_input_more2 = array(
											'CUST_ID' => $id,
											'STATUS'=>('Cam details complete'),
											'last_updated_date'=>date("Y/m/d")
											);
				$result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more2);
                 //--------------------------------------------------------------------------------------
				*/
			   $this->session->set_flashdata('success','success');
			   redirect('Operations_user/Credit_Analysis');
				
			}
			else
			{
				 $this->session->set_flashdata('error','error');
			     redirect('Operations_user/Edit_Credit_Analysis');
			}
	  }

// 	  public function genrate_pdf()
// 	  {
		 
// 		$id = $this->input->get("ID");
// 		$data_row = $this->Operations_user_model->getProfileData($id);
// 		$dsa_id=$data_row->DSA_ID;
// 			$dsa_info= $this->Dsacrud_model->getProfileData($dsa_id);
// 			if(!empty($dsa_info))
// 			{
// 				if($dsa_info->MN!='')
// 				{
// 					$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
// 					$dsa_city=$dsa_info->CITY;
// 					$dsa_state=$dsa_info->STATE;
// 				}
// 				else
// 				{
// 					$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
// 					$dsa_city=$dsa_info->CITY;
// 					$dsa_state=$dsa_info->STATE;
// 				}
// 			}
// 			else
// 			{
// 				$dsa_name='';
// 				$dsa_city='';
// 				$dsa_state='';
// 			}
// 		$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
// 		$data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
// 		$data_row_more = $this->Operations_user_model->getProfileDataMore($id);	
		
// 		$data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
// 		$address=$data_row_more->RES_ADDRS_LINE_1." ".$data_row_more->RES_ADDRS_LINE_2." ".$data_row_more->RES_ADDRS_LINE_3;
// 		$per_address=$data_row_more->PER_ADDRS_LINE_1." ".$data_row_more->PER_ADDRS_LINE_2." ".$data_row_more->PER_ADDRS_LINE_3;
// 		$data_credit_analysis=$this->Operations_user_model->getcreditData($id);
// 		if(!empty($data_credit_score))
// 		{
// 			$data_response=$data_credit_score->response;
		
// 			$data_address=json_decode($data_response,true);
            

// 				   // echo "<pre>";
// 				   // print_r($data_address);
// 				   // echo "</pre>";
					
// 					//exit();
                        
// 			$credit_score_response=json_decode($data_credit_score->response,true);
// 			$data_emails=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
// 			$data_add=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
// 			$data_obligations=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
// 			$data_obligations_array=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
                                                              
//                                       //exit();
//                                       // echo "<pre>";        
// 				     //  print_r($data_obligations_array);
// 				     //  echo "</pre>";
// 					//exit();
// 			$total_obligation=0;
// 			foreach($data_add as $data_ad)
// 				{
// 					$str1= preg_replace('/\s+/', ' ', trim($address));
// 					$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
// 					$str3=preg_replace('/\s+/', ' ', trim($per_address));
// 					 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
// 					 {
// 						$address_flag='true';
// 						  break;
// 					 }
// 					 else
// 					 {
// 						 $address_flag='false';
// 					 }
// 				}
// 				foreach($data_emails as $data_email)
// 				{
// 					$str1= preg_replace('/\s+/', ' ', trim($data_row->EMAIL));
// 					$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
// 					 if(strcmp($str1,$str2)==0 )
// 					 {
// 						$email_flag='true';
// 						  break;
// 					 }
// 					 else
// 					 {
// 						 $email_flag='false';
						
// 					 }
// 				}	
				
// 				$k=0;
// 				$Applicant_obligation_Array = []; 
// 				 foreach($data_obligations as $data_obligation)
// 					{
						
// 						if($data_obligation['Open']=='Yes')
// 						{
// 							 if(isset($data_obligation['InstallmentAmount']))
// 							 {
// 								$total_obligation= $total_obligation+ $data_obligation['InstallmentAmount'];
// 							 }
//                             //echo $k;
// 							$Applicant_obligation_Array[$k]= $data_obligation['Institution'].$data_obligation['Balance'];
// 						//	echo $data_obligation['Institution'].$data_obligation['Balance'];
// 						//	echo "<br>";
// 							 $k++;
							 
// 						}
// 						else
// 						{
// 							break;
// 						}
// 					}
// 			//==============================================added by priyanka==============================================
// 					//echo "<pre>";
// 					//print_r($Applicant_obligation_Array);
// 					//echo "</pre>";
// 			//==============================================added by priyanka==============================================
// 		}
// 		else
// 		{
// 			 $email_flag='false';
// 			 $address_flag='false';
			 
// 			 $data_address="";
// 			 $total_obligation=0;
// 			 $data_obligations=array();
// 			 $credit_score_response=array();
// 		}
// 		if($data_appliedloan->LOAN_TYPE=='home')
// 			{
// 				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
// 				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
				
// 				$coapp_add_flag=array();
// 				$coapp_email_flag=array();
// 				$i=1;
// 				foreach($data_coapplicant as $coapplicant)
// 				{
				  
				   
					
					 
// 					$coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
// 			        $coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
// 					$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
// 					$coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
					
				
// 					if(!empty($coapp_data_credit_score))
// 					{
// 						$coapp_data_response=$coapp_data_credit_score->response;
// 					    $coapp_data_address=json_decode($coapp_data_response,true);
				       
// 					    if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
// 					   {
// 						$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
// 					    }
// 						else
// 						{
// 							$coapp_data_emails="";
// 						}
// 						$TotalSanctionAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];
// 						$data['TotalSanctionAmount']=$TotalSanctionAmount;
						
// 						$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
// 						$coapp_data_response=$coapp_data_credit_score->response;
// 						$coapp_credit_score=json_decode($coapp_data_response,true);
// 						$coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
// //==============================================added by priyanka==============================================
// 						$k=0;
// 						$Co_Applicant_obligation_Array = []; 
// 						$Co_Applicant_obligation_Array_attributes= []; 
// 						foreach($coapp_data_obligations as $coapp_data_obligation)
// 						{
							
// 							if($coapp_data_obligation['Open']=='Yes')
// 							{
// 								 if(isset($coapp_data_obligation['InstallmentAmount']))
// 								 {
// 									$total_obligation= $total_obligation+ $coapp_data_obligation['InstallmentAmount'];
// 								 }
// 								 //echo $k;
// 								 $Co_Applicant_obligation_Array[$k] = $coapp_data_obligation['Institution'].$coapp_data_obligation['Balance']; 



// 								                                                        if(isset($coapp_data_obligation['SanctionAmount']))
// 																						{  
// 																							$SanctionAmount = $coapp_data_obligation['SanctionAmount'];
// 																						}
// 																						else if(isset($coapp_data_obligation['CreditLimit']))
// 																						{
// 																							$SanctionAmount = $coapp_data_obligation['CreditLimit'];
// 																						}
// 																						else
// 																						{
// 																							$SanctionAmount=0;
// 																						}
// 																					   // "Balance"=>$coapp_data_obligation['Balance'],
// 																						if(isset($coapp_data_obligation['InstallmentAmount']))
// 																						{
// 																							 $InstallmentAmount =$coapp_data_obligation['InstallmentAmount'];
// 																						}
// 																						else
// 																						{
// 																							if(isset($coapp_data_obligation['SanctionAmount']))
// 																							{
// 																								$InstallmentAmount =($coapp_data_obligation['SanctionAmount']*0.03);
//                                                												}
// 																							elseif(isset($coapp_data_obligation['CreditLimit']))
// 																							{
//                                                 												$InstallmentAmount =($coapp_data_obligation['CreditLimit']*0.03);
// 																							}
// 																							else
// 																							{
// 																								$InstallmentAmount= 0;
// 																							}
// 																						}
// 																						$new_array = array();
// 																						foreach($Co_Applicant_obligation_Array as $value) {
// 																							if(!in_array($value, $Applicant_obligation_Array)) {
// 																								array_push($new_array, $value);
// 																							}
// 																						}
// 																						if(!empty($new_array))
// 																						{
													
// 																							    $Co_Applicant_obligation_Array_attributes[$k] =array(
// 																								"Institution"=>$coapp_data_obligation['Institution'],
// 																								"AccountType"=>$coapp_data_obligation['AccountType'],
// 																								"SanctionAmount"=>$SanctionAmount,
// 																								"Balance"=>$coapp_data_obligation['Balance'],
// 																								"InstallmentAmount"=>$InstallmentAmount
// 																							  ); 
// 																					//echo "<pre>";
// 																					//	print_r($new_array);
																						
// 																					//	echo "</pre>";
// 																					//	echo "<pre>";
// 																					//print_r($Co_Applicant_obligation_Array_attributes);
																						
// 																					//echo "</pre>";

																						
// 																					}
								
// 								 //echo $coapp_data_obligation['Institution'].$coapp_data_obligation['Balance'];
// 								// echo "<br>";
// 								// $k++;


							
// 							}
					
// 							else
// 							{
// 								break;
// 							}

// 						}
								
						
// 						//echo "<pre>";
// 						//print_r($Co_Applicant_obligation_Array);
// 						//echo "</pre>";
						
// 						//echo "Co applicant array " ;            
// 					//	echo "<pre>";
// 						//print_r($Co_Applicant_obligation_Array_attributes);
					
// 					//	echo "</pre>";
// 					//	echo "<pre>";
// 						//print_r( array_intersect($Applicant_obligation_Array,$Co_Applicant_obligation_Array));
// 						//print_r(array_unique($Applicant_obligation_Array,$Co_Applicant_obligation_Array));
// 						//echo "</pre>";
			
// 					/*	$new_array = array();
// 						foreach($Co_Applicant_obligation_Array as $value) {
// 							if(!in_array($value, $Applicant_obligation_Array)) {
// 								array_push($new_array, $value);
// 							}
// 						}
						
// 						echo "<pre>";
// 						print_r($new_array);
// 						echo "</pre>";
// 		*/             
// //==============================================added by priyanka==============================================
// if(isset($Co_Applicant_obligation_Array_attributes))
// {
// $Co_Applicant_obligation_Array_attributes[$i]=$Co_Applicant_obligation_Array_attributes;
// }
// else
// {
// $Co_Applicant_obligation_Array_attributes[$i]="";
// }
// 						$coapp_data_obligations_array[$i]=$coapp_data_obligations;	
// 					    $coapp_credit_score_array[$i]=$coapp_credit_score;
// 						foreach($coapp_data_add as $data_ad)
// 							{
// 								$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
// 								$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
// 								$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
// 								 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
// 								 {
// 									$address_flag='true';
// 									  break;
// 								 }
// 								 else
// 								 {
// 									 $address_flag='false';
// 								 }
								
// 							}
// 							if($coapp_data_emails!="")
// 							{
// 							foreach($coapp_data_emails as $data_email)
// 							{
// 								$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
// 								$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
// 								 if(strcmp($str1,$str2)==0 )
// 								 {
// 									$email_flag='true';
// 									  break;
// 								 }
// 								 else
// 								 {
// 									 $email_flag='false';
									
// 								 }
// 							}	
							 
// 					          $coapp_email_flag[$i]=$email_flag;
// 						}
// 							  $coapp_add_flag[$i]=$address_flag;
							 
							 
// 					}
// 					else
// 					{
// 						$total_obligation=0;
// 						$coapp_add_flag[$i]='false';
// 						 $coapp_add_flag[$i]='false';
// 						$coapp_data_obligations_array[$i]=array();	
// 						$Co_Applicant_obligation_Array_attributes[$i]=array();
// 						$coapp_credit_score_array[$i]=array();
// 						$coapp_credit_score=array();
						
// 					}
				           
// 					$coapp_data_credit_analysis_array[$i]=$coapp_data_credit_analysis;
// 					$coapp_data_credit_score_array[$i]=$coapp_data_credit_score;
// 					$coapp_data_obligation_array[$i]=$total_obligation;
//                 	$i++;
				
// 				}
               
				
// 			}
// 			elseif($data_appliedloan->LOAN_TYPE=='lap')
// 			{
// 				$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
// 				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
				
// 				$coapp_add_flag=array();
// 				$coapp_email_flag=array();
// 				$i=1;
// 				foreach($data_coapplicant as $coapplicant)
// 				{
				  
				   
					
					 
// 					$coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
// 			        $coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
// 					$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
// 					$coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
					
				
// 					if(!empty($coapp_data_credit_score))
// 					{
// 						$coapp_data_response=$coapp_data_credit_score->response;
// 					    $coapp_data_address=json_decode($coapp_data_response,true);
				       
// 					    if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
// 					   {
// 						$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
// 					    }
// 						else
// 						{
// 							$coapp_data_emails="";
// 						}
// 						$TotalSanctionAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];
// 						$data['TotalSanctionAmount']=$TotalSanctionAmount;
						
// 						$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
// 						$coapp_data_response=$coapp_data_credit_score->response;
// 						$coapp_credit_score=json_decode($coapp_data_response,true);
// 						$coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
// //==============================================added by priyanka==============================================
// 						$k=0;
// 						$Co_Applicant_obligation_Array = []; 
// 						$Co_Applicant_obligation_Array_attributes= []; 
// 						foreach($coapp_data_obligations as $coapp_data_obligation)
// 						{
							
// 							if($coapp_data_obligation['Open']=='Yes')
// 							{
// 								 if(isset($coapp_data_obligation['InstallmentAmount']))
// 								 {
// 									$total_obligation= $total_obligation+ $coapp_data_obligation['InstallmentAmount'];
// 								 }
// 								 //echo $k;
// 								 $Co_Applicant_obligation_Array[$k] = $coapp_data_obligation['Institution'].$coapp_data_obligation['Balance']; 



// 								                                                        if(isset($coapp_data_obligation['SanctionAmount']))
// 																						{  
// 																							$SanctionAmount = $coapp_data_obligation['SanctionAmount'];
// 																						}
// 																						else if(isset($coapp_data_obligation['CreditLimit']))
// 																						{
// 																							$SanctionAmount = $coapp_data_obligation['CreditLimit'];
// 																						}
// 																						else
// 																						{
// 																							$SanctionAmount=0;
// 																						}
// 																					   // "Balance"=>$coapp_data_obligation['Balance'],
// 																						if(isset($coapp_data_obligation['InstallmentAmount']))
// 																						{
// 																							 $InstallmentAmount =$coapp_data_obligation['InstallmentAmount'];
// 																						}
// 																						else
// 																						{
// 																							if(isset($coapp_data_obligation['SanctionAmount']))
// 																							{
// 																								$InstallmentAmount =($coapp_data_obligation['SanctionAmount']*0.03);
//                                                												}
// 																							elseif(isset($coapp_data_obligation['CreditLimit']))
// 																							{
//                                                 												$InstallmentAmount =($coapp_data_obligation['CreditLimit']*0.03);
// 																							}
// 																							else
// 																							{
// 																								$InstallmentAmount= 0;
// 																							}
// 																						}
// 																						$new_array = array();
// 																						foreach($Co_Applicant_obligation_Array as $value) {
// 																							if(!in_array($value, $Applicant_obligation_Array)) {
// 																								array_push($new_array, $value);
// 																							}
// 																						}
// 																						if(!empty($new_array))
// 																						{
													
// 																							    $Co_Applicant_obligation_Array_attributes[$k] =array(
// 																								"Institution"=>$coapp_data_obligation['Institution'],
// 																								"AccountType"=>$coapp_data_obligation['AccountType'],
// 																								"SanctionAmount"=>$SanctionAmount,
// 																								"Balance"=>$coapp_data_obligation['Balance'],
// 																								"InstallmentAmount"=>$InstallmentAmount
// 																							  ); 
// 																					//echo "<pre>";
// 																					//	print_r($new_array);
																						
// 																					//	echo "</pre>";
// 																					//	echo "<pre>";
// 																					//print_r($Co_Applicant_obligation_Array_attributes);
																						
// 																					//echo "</pre>";

																						
// 																					}
								
// 								 //echo $coapp_data_obligation['Institution'].$coapp_data_obligation['Balance'];
// 								// echo "<br>";
// 								// $k++;


							
// 							}
					
// 							else
// 							{
// 								break;
// 							}

// 						}
								
						
// 						//echo "<pre>";
// 						//print_r($Co_Applicant_obligation_Array);
// 						//echo "</pre>";
						
// 						//echo "Co applicant array " ;            
// 					//	echo "<pre>";
// 						//print_r($Co_Applicant_obligation_Array_attributes);
					
// 					//	echo "</pre>";
// 					//	echo "<pre>";
// 						//print_r( array_intersect($Applicant_obligation_Array,$Co_Applicant_obligation_Array));
// 						//print_r(array_unique($Applicant_obligation_Array,$Co_Applicant_obligation_Array));
// 						//echo "</pre>";
			
// 					/*	$new_array = array();
// 						foreach($Co_Applicant_obligation_Array as $value) {
// 							if(!in_array($value, $Applicant_obligation_Array)) {
// 								array_push($new_array, $value);
// 							}
// 						}
						
// 						echo "<pre>";
// 						print_r($new_array);
// 						echo "</pre>";
// 		*/             
// //==============================================added by priyanka==============================================
// if(isset($Co_Applicant_obligation_Array_attributes))
// {
// $Co_Applicant_obligation_Array_attributes[$i]=$Co_Applicant_obligation_Array_attributes;
// }
// else
// {
// $Co_Applicant_obligation_Array_attributes[$i]="";
// }
// 						$coapp_data_obligations_array[$i]=$coapp_data_obligations;	
// 					    $coapp_credit_score_array[$i]=$coapp_credit_score;
// 						foreach($coapp_data_add as $data_ad)
// 							{
// 								$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
// 								$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
// 								$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
// 								 if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
// 								 {
// 									$address_flag='true';
// 									  break;
// 								 }
// 								 else
// 								 {
// 									 $address_flag='false';
// 								 }
								
// 							}
// 							if($coapp_data_emails!="")
// 							{
// 							foreach($coapp_data_emails as $data_email)
// 							{
// 								$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
// 								$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
// 								 if(strcmp($str1,$str2)==0 )
// 								 {
// 									$email_flag='true';
// 									  break;
// 								 }
// 								 else
// 								 {
// 									 $email_flag='false';
									
// 								 }
// 							}	
							 
// 					          $coapp_email_flag[$i]=$email_flag;
// 						}
// 							  $coapp_add_flag[$i]=$address_flag;
							 
							 
// 					}
// 					else
// 					{
// 						$total_obligation=0;
// 						$coapp_add_flag[$i]='false';
// 						 $coapp_add_flag[$i]='false';
// 						$coapp_data_obligations_array[$i]=array();	
// 						$Co_Applicant_obligation_Array_attributes[$i]=array();
// 						$coapp_credit_score_array[$i]=array();
// 						$coapp_credit_score=array();
						
// 					}
				           
// 					$coapp_data_credit_analysis_array[$i]=$coapp_data_credit_analysis;
// 					$coapp_data_credit_score_array[$i]=$coapp_data_credit_score;
// 					$coapp_data_obligation_array[$i]=$total_obligation;
//                 	$i++;
				
// 				}
				
				
// 			}
// 			else
// 			{
// 				$data_coapplicant_no=0;
// 				$data_coapplicant=array();
// 				$coapp_add_flag=array();
// 				$coapp_email_flag=array();
// 				$coapp_credit_score=array();
// 				$coapp_data_credit_analysis_array=array();
// 				$coapp_data_credit_score_array=array();
// 				$coapp_data_obligation_array=array();
// 				$coapp_data_obligations_array=array();
// 				$Co_Applicant_obligation_Array_attributes=array();
				
// 				$coapp_credit_score_array=array();
// 			}
// //echo "<pre>";
// //print_r($Co_Applicant_obligation_Array_attributes);
// //echo "</pre>";
						
// 		 /*
// 		echo $data_row_more->CUST_ID;
// 		echo "<br>";
// 		echo $data_row_more->MOTHER_F_NAME;
// 		echo "<br>";
// 		echo $data_row_more->MOTHER_M_NAME;
// 		echo "<br>";
// 		echo $data_row_more->MOTHER_L_NAME;
// 		echo "<br>";
// 		echo $data_row_more->IS_SPOUSE_FATHER;
// 		echo "<br>";
// 		echo $data_row_more->SPOUSE_F_NAME;
// 		echo "<br>";
// 		echo $data_row_more->SPOUSE_M_NAME;
// 		echo "<br>";
// 		echo $data_row_more->SPOUSE_L_NAME;
// 		echo "<br>";
// 		echo $data_row_more->RES_ADDRS_LINE_1;
// 		echo "<br>";
		
// 		echo $data_row_more->RES_ADDRS_LINE_2;
// 		echo "<br>";
		
// 		echo $data_row_more->RES_ADDRS_LINE_3;
// 		echo "<br>";
// 		echo $data_row_more->RES_ADDRS_LANDMARK;
// 		echo "<br>";
// 		echo $data_row_more->RES_ADDRS_PINCODE;
// 		echo "<br>";
// 		echo $data_row_more->RES_ADDRS_CITY;
// 		echo "<br>";
// 		echo $data_row_more->NATIVE_PLACE;
// 		echo "<br>";
// 		echo $data_row_more->RES_ADDRS_STATE;
// 		echo "<br>";
// 		echo $data_row_more->RES_ADDRS_DISTRICT;
// 		echo "<br>";
// 		echo $data_row_more->RES_ADDRS_PROPERTY_TYPE;
// 		echo "<br>";
// 		echo $data_row_more->RES_ADDRS_NO_YEARS_LIVING;
// 		echo "<br>";
// 		echo $data_row_more->PER_ADDRS_LINE_1;
// 		echo "<br>";
// 		echo $data_row_more->PER_ADDRS_LINE_2;
// 		echo "<br>";
// 		echo $data_row_more->PER_ADDRS_LINE_3;
// 		echo "<br>";
// 		echo $data_row_more->PER_ADDRS_LANDMARK;
// 		echo "<br>";
// 		echo $data_row_more->PER_ADDRS_PINCODE;
// 		echo "<br>";
// 		echo $data_row_more->PER_ADDRS_PROPERTY_TYPE;
// 		echo "<br>";
// 		echo $data_row_more->PER_ADDRS_STATE;
// 		echo "<br>";
// 		echo $data_row_more->PER_ADDRS_DISTRICT;
// 		echo "<br>";
// 		echo $data_row_more->PER_ADDRS_CITY;
// 		echo "<br>";
// 		echo $data_row_more->PER_ADDRS_NO_YEARS_LIVING;
// 		echo "<br>";
// 		echo $data_row_more->TOTAL_BRO_SIS;
// 		echo "<br>";
// 		echo $data_row_more->NO_OF_DEPENDANTS;
// 		echo "<br>";
// 		echo $data_row_more->CONSENT;
// 		echo "<br>";
// 		echo $data_row_more->STATUS;
// 		echo "<br>";
// 		echo $data_row_more->PER_ADDRS_STATE;
// 		echo "<br>";
// 		echo $data_row_more->VERIFY_PAN;
// 		echo "<br>";
// 		echo $data_row_more->verify_GST_status;
// 		echo "<br>";
// 		echo $data_row_more->verify_ca_regi_status;
// 		echo "<br>";
// 		echo $data_row_more->verify_icwa_regi_status;
// 		echo "<br>";
// 		echo $data_row_more->verify_cs_regi_status;
// 		echo "<br>";
// 		echo $data_row_more->verify_Bis_Pan_status;
// 		echo "<br>";
// 		echo $data_row_more->Aadhar_Esign_Consent;
// 		echo "<br>";
		
// 		echo $data_row_more->verify_Passport_no;
// 		echo "<br>";
// 		echo $data_row_more->verify_Driving_l_Number;
// 		echo "<br>";
// 		echo $data_row_more->verify_EPFO_Number;
// 		echo "<br>";
// 		echo $data_row_more->verify_Account_Number;
// 		echo "<br>";
// 		echo $data_row_more->verify_Official_Mail;
// 		echo "<br>";
// 		echo $data_row_more->verify_Vechical;
// 		echo "<br>";
// 		echo $data_row_more->verify_It_Returns;
// 		echo "<br>";
// 		echo $data_row_more->verify_Udyog_Aadhar;
// 		echo "<br>";
// 		echo $data_row_more->verify_Shop_Act;
// 		echo "<br>";
// 		echo $data_row_more->verify_Professional_Certificate;
// 		echo "<br>";
// 		echo $data_row_more->verify_Residence;
// 		echo "<br>";
// 		echo $data_row_more->verify_Employment;
// 		echo "<br>";
// 		echo $data_row_more->Recidance_Comment;
// 		echo "<br>";
// 		echo $data_row_more->Employment_Comment;
// 		echo "<br>";
// 		echo $data_row_more->Passport_available;
// 		echo "<br>";
// 		echo $data_row_more->Passport_Number;
// 		echo "<br>";
// 		echo $data_row_more->Driving_l_available;
// 		echo "<br>";
// 		echo $data_row_more->Driving_l_Number;
// 		echo "<br>";
// 		echo $data_row_more->Vechical_NO_available;
// 		echo "<br>";
// 		echo $data_row_more->Vechical_Number;
// 		echo "<br>";
// 		echo $data_row_more->Account_Number_available;
// 		echo "<br>";
// 		echo $data_row_more->Account_Number;
// 		echo "<br>";
// 		echo $data_row_more->EPFO_Number_available;
// 		echo "<br>";
// 		echo $data_row_more->EPFO_Number;
// 		echo "<br>";
// 		echo $data_row_more->verify_Salary;
// 		echo "<br>";
// 		echo $data_row_more->verify_credit_salary;
// 		echo "<br>";
// 		echo $data_row_more->verify_obligation;
// 		echo "<br>";
// 		echo $data_row_more->verify_residual_income;
// 		echo "<br>";
// 		echo $data_row_more->Official_mail_available;
// 		echo "<br>";
// 		echo $data_row_more->Official_mail;
// 		echo "<br>";
// 		echo $data_row_more->KYC_doc;
// 		echo "<br>";
// 		echo $data_row_more->KYC;
// 		echo "<br>";
// 		echo $data_row_more->VERIFY_KYC;
// 		echo "<br>";
// 		echo $data_row_more->File_Number_Passport;
// 		echo "<br>";
// 		echo $data_row_more->Locality_type;
// 		echo "<br>";
// 		echo $data_row_more->Pre_employement;
// 		echo "<br>";
// 		echo $data_row_more->Past_Employement;
// 		echo "<br>";
// 		echo $data_row_more->Edu_background;
// 		echo "<br>";
// 		echo $data_row_more->Connects;
// 		echo "<br>";
// 		echo $data_row_more->Professional_courses;
// 		echo "<br>";
// 		echo $data_row_more->Hobbies;
// 		echo "<br>";
// 		echo $data_row_more->Recommendations;
// 		echo "<br>";
// 		echo $data_row_more->Skills;
// 		echo "<br>";
// 		echo $data_row_more->vacation;
// 		echo "<br>";
// 		echo $data_row_more->anti_post;
// 		echo "<br>";
// 		echo $data_row_more->TIMESTAMP;
// 		echo "<br>";
// 		echo $data_row_more->Sale_Deed;
// 		echo "<br>";
// 		echo $data_row_more->Land_value;
// 		echo "<br>";
// 		echo $data_row_more->Construction_value;
// 		echo "<br>";
// 		echo $data_row_more->Total_Value;
// 		echo "<br>";
// 		echo $data_row_more->Agreement_value;
// 		echo "<br>";
// 		echo $data_row_more->Date_of_Agreement;
// 		echo "<br>";
// 		echo $data_row_more->LTV;
// 		echo "<br>";
// 		echo $data_row_more->LTV_new;
// 		echo "<br>";
// 		echo $data_row_more->Legal_report;
// 		echo "<br>";
// 		*/
// 		//exit();
// 		//echo "<pre>";
// 		//print_r($coapp_data_obligations_array);
// 		//echo "</pre>";
// 		//exit();
//         $i=1;
// 			foreach($data_obligations as $data_obligation)
// 			{
// 				if($data_obligation['Open']=='Yes')
// 					{
// 						                       // if(!empty($data_obligation)){ echo "Institution==".$data_obligation['Institution'];}
// 												//if(!empty($data_obligation)){ echo "AccountType==".$data_obligation['AccountType'];}
// 												//if(!empty($data_obligation)){  echo "balance==".$data_obligation['Balance'];}
												
// 											 //   echo "<pre>";
// 											//	print_r($coapp_data_obligations_array);
// 											//	echo "</pre>";
												
											     
// 							$i++;
// 					}
// 			}
// 			//echo "<pre>";
// 			//print_r($coapp_data_credit_analysis_array);
// 			//echo "</pre>";
// 			//exit();
// 			$i=1;
// 			foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
// 			{
				
// 				if($coapp_data_obligations['Open']=='Yes')
// 				{
// 						                       // if(!empty($coapp_data_obligations)){ echo "Institution==".$coapp_data_obligations['Institution'];}
// 												//if(!empty($coapp_data_obligations)){ echo "AccountType==".$coapp_data_obligations['AccountType'];}
// 												//if(!empty($coapp_data_obligations)){  echo "balance==".$coapp_data_obligations['Balance'];}
												
// 											 //   echo "<pre>";
// 											//	print_r($coapp_data_obligations_array);
// 											//	echo "</pre>";
												
											     
// 							$i++;
// 					}
// 			}


// 			// echo "<pre>";
// 			// print_r($coapp_data_obligations_array);
// 			 //echo "</pre>";
//             //exit();
// 		    $data['row'] = $data_row;
// 			$data['dsa_name']=$dsa_name;
// 			$data['dsa_city']=$dsa_city;
// 			$data['dsa_state']=$dsa_state;
// 			$data['PER_ADDRS_LINE_1']=$data_row_more->PER_ADDRS_LINE_1;
// 			$data['RES_ADDRS_LINE_1']=$data_row_more->RES_ADDRS_LINE_1;
// 			$data['Locality_type']=$data_row_more->Locality_type;
// 			$data['NO_OF_DEPENDANTS']=$data_row_more->NO_OF_DEPENDANTS;
// 			$data['NATIVE_PLACE']=$data_row_more->NATIVE_PLACE;
// 			$data['VERIFY_PAN']=$data_row_more->VERIFY_PAN;
// 			$data['TIMESTAMP']=$data_row_more->TIMESTAMP;
// 			$data['verify_ca_regi_status']=$data_row_more->verify_ca_regi_status;
// 			$data['verify_cs_regi_status']=$data_row_more->verify_cs_regi_status;
// 			$data['verify_icwa_regi_status']=$data_row_more->verify_icwa_regi_status;
// 			$data['STATUS']=$data_row_more->STATUS;
// 			$data['Passport_Number']=$data_row_more->Passport_Number;
// 			$data['verify_Passport_no']=$data_row_more->verify_Passport_no;
// 			$data['KYC_doc']=$data_row_more->KYC_doc;
// 			$data['Driving_l_Number']=$data_row_more->Driving_l_Number;
// 			$data['verify_Driving_l_Number']=$data_row_more->verify_Driving_l_Number;
// 			$data['Vechical_Number']=$data_row_more->Vechical_Number;
// 			$data['verify_Vechical']=$data_row_more->verify_Vechical;
// 			$data['verify_It_Returns']=$data_row_more->verify_It_Returns;
// 			$data['verify_Udyog_Aadhar']=$data_row_more->verify_Udyog_Aadhar;
// 			$data['verify_GST_status']=$data_row_more->verify_GST_status;
// 			$data['verify_Shop_Act']=$data_row_more->verify_Shop_Act;
// 			$data['verify_Professional_Certificate']=$data_row_more->verify_Professional_Certificate;
// 			$data['verify_Residence']=$data_row_more->verify_Residence;
// 			$data['Recidance_Comment']=$data_row_more->Recidance_Comment;
// 			$data['verify_Employment']=$data_row_more->verify_Employment;
// 			$data['Employment_Comment']=$data_row_more->Employment_Comment;
// 			$data['EPFO_Number']=$data_row_more->EPFO_Number;
// 			$data['verify_EPFO_Number']=$data_row_more->verify_EPFO_Number;
// 			$data['Account_Number']=$data_row_more->Account_Number;
// 			$data['verify_Account_Number']=$data_row_more->verify_Account_Number;
// 			$data['Official_mail']=$data_row_more->Official_mail;
// 			$data['verify_Official_Mail']=$data_row_more->verify_Official_Mail;
// 			$data['Pre_employement']=$data_row_more->Pre_employement;
// 			$data['Past_Employement']=$data_row_more->Past_Employement;
// 			$data['Edu_background']=$data_row_more->Edu_background;
// 			$data['Connects']=$data_row_more->Connects;
// 			$data['Recommendations']=$data_row_more->Recommendations;
// 			$data['Professional_courses']=$data_row_more->Professional_courses;
// 			$data['Hobbies']=$data_row_more->Hobbies;
// 			$data['Skills']=$data_row_more->Skills;
// 			$data['vacation']=$data_row_more->vacation;
// 			$data['anti_post']=$data_row_more->anti_post;
// 			$data['Sale_Deed']=$data_row_more->Sale_Deed;
// 			$data['Land_value']=$data_row_more->Land_value;
// 			$data['Total_Value']=$data_row_more->Total_Value;
// 			$data['Construction_value']=$data_row_more->Construction_value;
// 			$data['Agreement_value']=$data_row_more->Agreement_value;
// 			$data['Date_of_Agreement']=$data_row_more->Date_of_Agreement;
// 			$data['LTV']=$data_row_more->LTV;
// 			$data['LTV_new']=$data_row_more->LTV_new;
// 			$data['Legal_report']=$data_row_more->Legal_report;
// 			//$data['row_more'] = $data_row_more;
// 			$data['coapplicants']=$data_coapplicant;
// 			$data['appliedloan']=$data_appliedloan;
// 			$data['no_of_coapplicant']=$data_coapplicant_no;
// 			$data['income_details']=$data_incomedetails;
// 			$data['data_address']=$data_address;
// 			$data['data_credit_score']=$data_credit_score;
// 			$data['total_obligation']=$total_obligation;
// 			$data['data_obligations']=$data_obligations;
// 			$data['credit_score_response']=$credit_score_response;
// 			$data['address_flag']=$address_flag;
// 			$data['data_credit_analysis']=$data_credit_analysis;
// 			$data['coapp_credit_score']=$coapp_credit_score;
// 			$data['coapp_data_credit_analysis_array']=$coapp_data_credit_analysis_array;
// 			$data['coapp_data_credit_score_array']=$coapp_data_credit_score_array;
// 			$data['coapp_data_obligation_array']=$coapp_data_obligation_array;
// 			$data['coapp_data_obligations_array']=$coapp_data_obligations_array;
// //==============================================added by priyanka==============================================
//                         if(isset($Co_Applicant_obligation_Array_attributes))
// 						{
// 							$data['Co_Applicant_obligation_Array_attributes']=$Co_Applicant_obligation_Array_attributes;
// 						}
// 						else
// 						{
// 						$data['Co_Applicant_obligation_Array_attributes']="";
// 						}
			
// //==============================================added by priyanka==============================================
// 			$data['coapp_credit_score_array']=$coapp_credit_score_array;
// 			$data['coapp_add_flag']=$coapp_add_flag;
			
// 			$data['coapp_email_flag']=$coapp_email_flag;
			
			
		
// 		//$id='0';
			
// 		//require base_url('mpdf/src/Mpdf.php');
// 		include("./vendor/autoload.php");
			
//         $mpdf = new \Mpdf\Mpdf([
// 	  		'setAutoTopMargin' => 'stretch',
// 			'autoMarginPadding' => 10,
// 			'orientation' => 'L'
// 		]);
// 		$arrContextOptions=array(
// 			"ssl"=>array(
// 				"verify_peer"=>false,
// 				"verify_peer_name"=>false,
// 			),
// 		);  
         
// 		$mpdf->SetHTMLHeader($this->load->view('Operations_user/header',[],true));
		
// 		$mpdf->SetDisplayMode('fullwidth');
// 		$mpdf->debug = true;
// 		$mpdf->AddPage();
// 		$stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
// 		$stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));

		
// 		$mpdf->WriteHTML($stylesheet,1);
// 		$mpdf->list_indent_first_level = 0;
// 		$html = $this->load->view('Operations_user/cam_pdf',$data,true);
// 		$mpdf->SetHTMLFooter('<table width="100%">  <tr>
        
//         <td width="33%" align="center">Page : {PAGENO}/{nbpg}</td></tr></table>');
// 		$mpdf->WriteHTML($html);
// 		$mpdf->Output();

// 		//$mpdf->Output('assets/report.pdf','F');

// 		exit();
// 	  }

public function genrate_pdf()
{
   
  $id = $this->input->get("ID");
  $get_pd_data= $this->credit_manager_user_model->getPDData($id);
  $data['data_row_PD_details']=$get_pd_data;
  $data_row = $this->Operations_user_model->getProfileData($id);
  /*------------------added by papih on 1_12_2021------------------------------*/
            $DSA_ID=$data_row->DSA_ID;
			$MANAGER_ID=$data_row->MANAGER_ID;
			$CSR_ID=$data_row->CSR_ID;
	        $BM_ID=$data_row->BM_ID;
			$CM_ID=$data_row->CM_ID;
			$RO_ID=$data_row->RO_ID;
		    if($DSA_ID!='NULL' && $DSA_ID!='' && $DSA_ID!='0')
			{
				$Sourcing_info= $this->Dsacrud_model->getProfileData($DSA_ID);
				$Sourcing_Type="DSA";
				$Sourcing_By="DSA Name";
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
					$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Manager Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="CSR Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Branch Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Cluster Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Relationship Officer Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
	    /*---------------------------------------------endedby papiha----------------------------------*/
  $data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
  $data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
  $data_row_more = $this->Operations_user_model->getProfileDataMore($id);
  
  //print_r($data_row_more);
  
  //exit;
  $data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
  $address=$data_row_more->RES_ADDRS_LINE_1." ".$data_row_more->RES_ADDRS_LINE_2." ".$data_row_more->RES_ADDRS_LINE_3;
  $per_address=$data_row_more->PER_ADDRS_LINE_1." ".$data_row_more->PER_ADDRS_LINE_2." ".$data_row_more->PER_ADDRS_LINE_3;
  $data_credit_analysis=$this->Operations_user_model->getcreditData($id);
  if(!empty($data_credit_score))
  {
	  $data_response=$data_credit_score->response;
  
	  $data_address=json_decode($data_response,true);
	  

			 // echo "<pre>";
			 // print_r($data_address);
			 // echo "</pre>";
			  
			  //exit();
				  
	  $credit_score_response=json_decode($data_credit_score->response,true);
	  if(isset($data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
	  {
	  $data_emails=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
	  $data_add=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
	  
	  }
	  else
	  {
		$data_emails=[];
		$data_add=array();
	  }
	 if(isset($data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
	  {
	  $data_obligations=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
	  $data_obligations_array=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
	  }
	  else
	  {
		$data_obligations=[]; 
		$data_obligations_array=[];
	  }

	  
														
								//exit();
								// echo "<pre>";        
			   //  print_r($data_obligations_array);
			   //  echo "</pre>";
			  //exit();
	  $total_obligation=0;
	  foreach($data_add as $data_ad)
		  {
			  $str1= preg_replace('/\s+/', ' ', trim($address));
			  $str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
			  $str3=preg_replace('/\s+/', ' ', trim($per_address));
			   if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
			   {
				  $address_flag='true';
					break;
			   }
			   else
			   {
				   $address_flag='false';
			   }
		  }
		  foreach($data_emails as $data_email)
		  {
			  $str1= preg_replace('/\s+/', ' ', trim($data_row->EMAIL));
			  $str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
			   if(strcmp($str1,$str2)==0 )
			   {
				  $email_flag='true';
					break;
			   }
			   else
			   {
				   $email_flag='false';
				  
			   }
		  }	
		  
		  $k=0;
		  $Applicant_obligation_Array = []; 
		   foreach($data_obligations as $data_obligation)
			  {
				  
				  if($data_obligation['Open']=='Yes')
				  {
					   if(isset($data_obligation['InstallmentAmount']))
					   {
						  $total_obligation= $total_obligation+ $data_obligation['InstallmentAmount'];
					   }
					  //echo $k;
					  $Applicant_obligation_Array[$k]= $data_obligation['AccountNumber'];
				  //	echo $data_obligation['Institution'].$data_obligation['Balance'];
				  //	echo "<br>";
					  
				  $k++;	 
				  }
				  
				  else
				  {
					  //break;
				  }
			  }
	  //==============================================added by priyanka==============================================
			  //echo "<pre>";
			  //print_r($Applicant_obligation_Array);
			  //echo "</pre>";
	  //==============================================added by priyanka==============================================
  }
  else
  {
	   $email_flag='false';
	   $address_flag='false';
	   
	   $data_address="";
	   $total_obligation=0;
	   $data_obligations=array();
	   $credit_score_response=array();
  }
  if($data_appliedloan->LOAN_TYPE=='home')
	  {
		  $data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
		  $data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
		  
		  $coapp_add_flag=array();
		  $coapp_email_flag=array();
		  $i=1;
		  
		  
		  foreach($data_coapplicant as $coapplicant)
		  {
			
			 
			  
			   
			  $coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
			  $coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
			  $coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
			  $coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
			  
		  
			  if(!empty($coapp_data_credit_score))
			  {
				  $coapp_data_response=$coapp_data_credit_score->response;
				  $coapp_data_address=json_decode($coapp_data_response,true);
				 
				  if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
				 {
				  $coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
				  }
				  else
				  {
					  $coapp_data_emails="";
				  }
				  if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']))
				  {
				  $TotalSanctionAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];
				  $data['TotalSanctionAmount']=$TotalSanctionAmount;
				  }
				  else
				  {
					$TotalSanctionAmount="";
					$data['TotalSanctionAmount']=$TotalSanctionAmount;
				  }
				  if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo']))
				  {
					    $coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
				  $coapp_data_response=$coapp_data_credit_score->response;
				  $coapp_credit_score=json_decode($coapp_data_response,true);
				  }
				  else
				  {
					  $coapp_data_add=array();
					  $coapp_data_response='';
					  $coapp_credit_score=array();
				  }
				
				  if(isset($coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
				  {
				  $coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
				  }
				  else
				  {
					$coapp_data_obligations=[];  
				  }
      //==============================================added by priyanka==============================================
				  $k=0;
				  $Co_Applicant_obligation_Array = []; 
				  $Co_Applicant_obligation_Array_attributes= []; 
				  foreach($coapp_data_obligations as $coapp_data_obligation)
				  {
					  
					  if($coapp_data_obligation['Open']=='Yes')
					  {
						   if(isset($coapp_data_obligation['InstallmentAmount']))
						   {
							  $total_obligation= $total_obligation+ $coapp_data_obligation['InstallmentAmount'];
						   }
						   //echo $k;
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
																					//   if(!in_array($value, $Applicant_obligation_Array)) {
																					// 	  array_push($new_array, $value);
																					//   }
																					if(isset($Applicant_obligation_Array))
																					{
																					if(!in_array($value, $Applicant_obligation_Array)) {
																						array_push($new_array, $value);
																					}
																				  }
																				  else
																				  {
																					  $Applicant_obligation_Array=[];
																					  if(!in_array($value, $Applicant_obligation_Array)) {
																						  array_push($new_array, $value);
																					  }
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
			  $sorted_array=array_diff($Co_Applicant_obligation_Array ,$Applicant_obligation_Array);
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
			}$address_flag='false';
							$coapp_data_obligations_array[$i]=$coapp_data_obligations;	
							$coapp_credit_score_array[$i]=$coapp_credit_score;
							foreach($coapp_data_add as $data_ad)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
									$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
									$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
									if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
									{
										$address_flag='true';
											break;
									}
									else
									{
										$address_flag='false';
									}
									
								}
								if($coapp_data_emails!="")
								{
								foreach($coapp_data_emails as $data_email)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
									$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
									if(strcmp($str1,$str2)==0 )
									{
										$email_flag='true';
											break;
									}
									else
									{
										$email_flag='false';
										
									}
								}	
								
									$coapp_email_flag[$i]=$email_flag;
							}
									$coapp_add_flag[$i]=$address_flag;
								
								
						}
						else
						{
							$total_obligation=0;
							$coapp_add_flag[$i]='false';
							$coapp_add_flag[$i]='false';
							$coapp_data_obligations_array[$i]=array();	
							$Co_Applicant_obligation_Array_attributes[$i]=array();
							$Co_Applicant_sorted_array[$i]=array();
							$coapp_credit_score_array[$i]=array();
							$coapp_credit_score=array();
							
						}
								
						$coapp_data_credit_analysis_array[$i]=$coapp_data_credit_analysis;
						$coapp_data_credit_score_array[$i]=$coapp_data_credit_score;
						$coapp_data_obligation_array[$i]=$total_obligation;
						if(isset($sorted_array))
						{
						$Co_Applicant_sorted_array[$i]=$sorted_array;
						}
						else
						{
							$Co_Applicant_sorted_array[$i]=[];
						}
						$i++;
					
					}
					
					
				}
				elseif($data_appliedloan->LOAN_TYPE=='lap')
				{
					$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
					$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
					
					$coapp_add_flag=array();
					$coapp_email_flag=array();
					$i=1;
					foreach($data_coapplicant as $coapplicant)
					{
					
					
						
						
						$coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
						$coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
						$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
						$coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
						
					
						if(!empty($coapp_data_credit_score))
						{
							$coapp_data_response=$coapp_data_credit_score->response;
							$coapp_data_address=json_decode($coapp_data_response,true);
						
							if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
						{
							$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
							}
							else
							{
								$coapp_data_emails="";
							}

							if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount']))
							{
								$TotalSanctionAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];
								$data['TotalSanctionAmount']=$TotalSanctionAmount;
							}
							else
							{
								$TotalSanctionAmount=""; $data['TotalSanctionAmount']="";
							}
							
							
							if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo']))
							{
									$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
							
							}
							else
							{
								$coapp_data_add=array();
							}
						$coapp_data_response=$coapp_data_credit_score->response;
							$coapp_credit_score=json_decode($coapp_data_response,true);
							if(isset($coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
							{
							$coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
							}
							else
							{
								$coapp_data_obligations=array();
							}
			//==============================================added by priyanka==============================================
							$k=0;
							$Co_Applicant_obligation_Array = []; 
							$Co_Applicant_obligation_Array_attributes= []; 
							$address_flag='';
							foreach($coapp_data_obligations as $coapp_data_obligation)
							{
								
								if($coapp_data_obligation['Open']=='Yes')
								{
									if(isset($coapp_data_obligation['InstallmentAmount']))
									{
										$total_obligation= $total_obligation+ $coapp_data_obligation['InstallmentAmount'];
									}
									//echo $k;
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
							$coapp_data_obligations_array[$i]=$coapp_data_obligations;	
							$coapp_credit_score_array[$i]=$coapp_credit_score;
							foreach($coapp_data_add as $data_ad)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
									$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
									$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
									if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
									{
										$address_flag='true';
										break;
									}
									else
									{
										$address_flag='false';
									}
									
								}
								if($coapp_data_emails!="")
								{
								foreach($coapp_data_emails as $data_email)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
									$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
									if(strcmp($str1,$str2)==0 )
									{
										$email_flag='true';
										break;
									}
									else
									{
										$email_flag='false';
										
									}
								}	
								
								$coapp_email_flag[$i]=$email_flag;
							}
								$coapp_add_flag[$i]=$address_flag;
								
								
						}
						else
						{
							$total_obligation=0;
							$coapp_add_flag[$i]='false';
							$coapp_add_flag[$i]='false';
							$coapp_data_obligations_array[$i]=array();	
							$Co_Applicant_obligation_Array_attributes[$i]=array();
							$Co_Applicant_sorted_array[$i]=array();
							$coapp_credit_score_array[$i]=array();
							$coapp_credit_score=array();
							
						}
							
						$coapp_data_credit_analysis_array[$i]=$coapp_data_credit_analysis;
						$coapp_data_credit_score_array[$i]=$coapp_data_credit_score;
						$coapp_data_obligation_array[$i]=$total_obligation;
						//$Co_Applicant_sorted_array[$i]=$sorted_array;
						$i++;
					
					}
				
					
					
				}
				else
				{
					$data_coapplicant_no=0;
					$data_coapplicant=array();
					$coapp_add_flag=array();
					$coapp_email_flag=array();
					$coapp_credit_score=array();
					$coapp_data_credit_analysis_array=array();
					$coapp_data_credit_score_array=array();
					$coapp_data_obligation_array=array();
					$coapp_data_obligations_array=array();
					$Co_Applicant_obligation_Array_attributes=array();
					
					$coapp_credit_score_array=array();
				}
			
			  $i=1;
				foreach($data_obligations as $data_obligation)
				{
					if($data_obligation['Open']=='Yes')
						{
													// if(!empty($data_obligation)){ echo "Institution==".$data_obligation['Institution'];}
													//if(!empty($data_obligation)){ echo "AccountType==".$data_obligation['AccountType'];}
													//if(!empty($data_obligation)){  echo "balance==".$data_obligation['Balance'];}
													
												//   echo "<pre>";
												//	print_r($coapp_data_obligations_array);
												//	echo "</pre>";
													
													
								$i++;
						}
				}
				//echo "<pre>";
				//print_r($coapp_data_credit_analysis_array);
				//echo "</pre>";
				//exit();
				$i=1;
				foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
				{
					
					if($coapp_data_obligations['Open']=='Yes')
					{
													// if(!empty($coapp_data_obligations)){ echo "Institution==".$coapp_data_obligations['Institution'];}
													//if(!empty($coapp_data_obligations)){ echo "AccountType==".$coapp_data_obligations['AccountType'];}
													//if(!empty($coapp_data_obligations)){  echo "balance==".$coapp_data_obligations['Balance'];}
													
												//   echo "<pre>";
												//	print_r($coapp_data_obligations_array);
												//	echo "</pre>";
													
													
								$i++;
						}
				}


				//echo "<pre>";
				//print_r($Co_Applicant_sorted_array);
				//echo "</pre>";
				//echo "<pre>";
				//print_r($coapp_data_obligations_array);
				//echo "</pre>";
				//$j=1;$k=0;
				//foreach($Co_Applicant_sorted_array[1] as $coapp_data_obligations_2)
				/// while ($Co_Applicant_sorted_array[$i]!="")
				// {
					//  $account = $coapp_data_obligations_2;
				//	echo "account=".$account;
				//	echo "<br>";
					//$j++;
					//foreach($coapp_data_obligations_array[1] as $coapp_data_obligations)
						//  {
					
						//		  if($coapp_data_obligations['AccountNumber']==$account)
						//		  {
									//echo  "account_inner_loop=".$coapp_data_obligations['AccountNumber'];
									//echo "<br>";
									//echo  "account_=".$coapp_data_obligations['Institution'];
									//echo "<br>";
						
						//		  }
					
				// }
				
				//}
				
				
				


				
				
				//echo $Co_Applicant_sorted_array[];
				//exit();Co_Applicant_sorted_array
				/* added by papiha------------------*/
					$data['Sourcing_name']=$Sourcing_name;
					$data['Sourcing_By']=$Sourcing_By;
					$data['Sourcing_Type']=$Sourcing_Type;
					$data['Sourcing_city']=$Sourcing_city;
					$data['Sourcing_state']=$Sourcing_state;
				/* ended by papiha--------------------*/;
				$data['Co_Applicant_sorted_array'] = $Co_Applicant_sorted_array;
				/*echo'<pre>';
				print_r($data['Co_Applicant_sorted_array']);
				exit;*/
				
     			$data['row'] = $data_row;
				$data['data_row_more']=$data_row_more;
				
				$data['PER_ADDRS_LINE_1']=$data_row_more->PER_ADDRS_LINE_1;
				$data['PER_ADDRS_LINE_2']=$data_row_more->PER_ADDRS_LINE_2;
				$data['PER_ADDRS_LINE_3']=$data_row_more->PER_ADDRS_LINE_3;
				$data['RES_ADDRS_LINE_1']=$data_row_more->RES_ADDRS_LINE_1;
				$data['RES_ADDRS_LINE_2']=$data_row_more->RES_ADDRS_LINE_2;
				$data['RES_ADDRS_LINE_3']=$data_row_more->RES_ADDRS_LINE_3;
				$data['Locality_type']=$data_row_more->Locality_type;
				$data['NO_OF_DEPENDANTS']=$data_row_more->NO_OF_DEPENDANTS;
				$data['NATIVE_PLACE']=$data_row_more->NATIVE_PLACE;
				$data['VERIFY_PAN']=$data_row_more->VERIFY_PAN;
				$data['TIMESTAMP']=$data_row_more->TIMESTAMP;
				$data['verify_ca_regi_status']=$data_row_more->verify_ca_regi_status;
				$data['verify_cs_regi_status']=$data_row_more->verify_cs_regi_status;
				$data['verify_icwa_regi_status']=$data_row_more->verify_icwa_regi_status;
				$data['STATUS']=$data_row_more->STATUS;
				$data['Passport_Number']=$data_row_more->Passport_Number;
				$data['verify_Passport_no']=$data_row_more->verify_Passport_no;
				//$data['KYC_doc']=$data_row_more->KYC_doc;
				$data['Driving_l_Number']=$data_row_more->Driving_l_Number;
				$data['verify_Driving_l_Number']=$data_row_more->verify_Driving_l_Number;
				$data['Vechical_Number']=$data_row_more->Vechical_Number;
				$data['verify_Vechical']=$data_row_more->verify_Vechical;
				$data['verify_It_Returns']=$data_row_more->verify_It_Returns;
				$data['verify_Udyog_Aadhar']=$data_row_more->verify_Udyog_Aadhar;
				$data['verify_GST_status']=$data_row_more->verify_GST_status;
				$data['verify_Shop_Act']=$data_row_more->verify_Shop_Act;
				$data['verify_Professional_Certificate']=$data_row_more->verify_Professional_Certificate;
				$data['verify_Residence']=$data_row_more->verify_Residence;
				$data['Recidance_Comment']=$data_row_more->Recidance_Comment;
				$data['verify_Employment']=$data_row_more->verify_Employment;
				$data['Employment_Comment']=$data_row_more->Employment_Comment;
				$data['EPFO_Number']=$data_row_more->EPFO_Number;
				$data['verify_EPFO_Number']=$data_row_more->verify_EPFO_Number;
				$data['Account_Number']=$data_row_more->Account_Number;
				$data['verify_Account_Number']=$data_row_more->verify_Account_Number;
				$data['Official_mail']=$data_row_more->Official_mail;
				$data['verify_Official_Mail']=$data_row_more->verify_Official_Mail;
				$data['Pre_employement']=$data_row_more->Pre_employement;
				$data['Past_Employement']=$data_row_more->Past_Employement;
				$data['Edu_background']=$data_row_more->Edu_background;
				$data['Connects']=$data_row_more->Connects;
				$data['Recommendations']=$data_row_more->Recommendations;
				$data['Professional_courses']=$data_row_more->Professional_courses;
				$data['Hobbies']=$data_row_more->Hobbies;
				$data['Skills']=$data_row_more->Skills;
				$data['vacation']=$data_row_more->vacation;
				$data['anti_post']=$data_row_more->anti_post;
				$data['Sale_Deed']=$data_row_more->Sale_Deed;
				$data['Sale_Deed']=$data_row_more->Sale_Deed;
				$data['Land_value']=$data_row_more->Land_value;
				$data['Total_Value']=$data_row_more->Total_Value;
				$data['Construction_value']=$data_row_more->Construction_value;
				$data['Self_occupied']=$data_row_more->Self_occupied;
				$data['Date_of_Agreement']=$data_row_more->Date_of_Agreement;
				$data['LTV']=$data_row_more->LTV;
				$data['LTV_new']=$data_row_more->LTV_new;
				$data['Legal_report']=$data_row_more->Legal_report;
				//$data['row_more'] = $data_row_more;
				$data['coapplicants']=$data_coapplicant;
				$data['appliedloan']=$data_appliedloan;
				$data['no_of_coapplicant']=$data_coapplicant_no;
				$data['income_details']=$data_incomedetails;
				$data['data_address']=$data_address;
				$data['data_credit_score']=$data_credit_score;
				$data['total_obligation']=$total_obligation;
				$data['data_obligations']=$data_obligations;
				$data['credit_score_response']=$credit_score_response;
				$data['address_flag']='true';
				$data['data_credit_analysis']=$data_credit_analysis;
				$data['coapp_credit_score']=$coapp_credit_score;
				$data['coapp_data_credit_analysis_array']=$coapp_data_credit_analysis_array;
				$data['coapp_data_credit_score_array']=$coapp_data_credit_score_array;
				$data['coapp_data_obligation_array']=$coapp_data_obligation_array;
				$data['coapp_data_obligations_array']=$coapp_data_obligations_array;
				$data['Agreement_value']=$data_row_more->Agreement_value;
			//==============================================added by priyanka==============================================
							if(isset($Co_Applicant_obligation_Array_attributes))
							{
								$data['Co_Applicant_obligation_Array_attributes']=$Co_Applicant_obligation_Array_attributes;
							}
							else
							{
							$data['Co_Applicant_obligation_Array_attributes']="";
							}
				
			//==============================================added by priyanka==============================================
				$data['coapp_credit_score_array']=$coapp_credit_score_array;
				$data['coapp_add_flag']=$coapp_add_flag;
				
				$data['coapp_email_flag']=$coapp_email_flag;
				
				/*echo "<pre>";
				print_r($coapp_data_obligations_array);
				echo "</pre>";
				exit();*/
			
			//$id='0';
				
			//require base_url('mpdf/src/Mpdf.php');
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
			$mpdf->SetHTMLHeader($this->load->view('Operations_user/header',[],true));
			
			$mpdf->SetDisplayMode('fullwidth');
			$mpdf->debug = true;
			$mpdf->AddPage('P');
			$stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
			$stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));
//echo "<pre>";
			//print_r($data);
			$mpdf->WriteHTML($stylesheet,1);
			$mpdf->list_indent_first_level = 0;
			$html = $this->load->view('Operations_user/cam_pdf',$data,true);
			$footer = "<table name='footer' width=\"1000\">
					<tr>
						<td style='font-size: 16px; padding-bottom: 2px;' align=\"right\">[Page : {PAGENO}]</td>
					</tr>
					</table>";
					$mpdf->SetFooter($footer);
			$mpdf->WriteHTML($html);
		
			$mpdf->Output();

			//$mpdf->Output('assets/report.pdf','F');

			exit();
}
	  public function reset_password()
	{
		$id = $this->session->userdata('ID');
		$data['type'] = $this->session->userdata("USER_TYPE");
		$data['id']=$id;
		$this->load->view('dsa/set_password',$data);
	}
	function updatepassword(){
		$id = $this->input->post('id');
		$type = $this->input->post('type');
		$password = $this->input->post('pass');
		
		$res = $this->Logincrud_model->updatepassword_dsa($password, $id, $type);
		
		if($res){
			$array_input=array('login_count'=>1);
			$idS = $this->Customercrud_model->update_profile($id, $array_input);
			$response = array('status' => 1, 'message' => "Password updated successfully, please login using newly updated password.", 'path' => base_url('index.php/dsa'));
			echo json_encode($response);
		}else{
			$response = array('status' => 0, 'message' => "Unable to update password, please try again", 'path' => '');
			echo json_encode($response);
		}
	}
    function updatepassword_dsa(){
		$id = $this->input->post('id');
		$type = $this->input->post('type');
		$password = $this->input->post('pass');
		
		$res = $this->Logincrud_model->updatepassword_dsa($password, $id, $type);
		
		if($res){
			$array_input=array('login_count'=>1);
			$idS = $this->Customercrud_model->update_profile($id, $array_input);
			if($idS )
			{
			$this->session->set_userData("login_count", 1);
			}
			if($type=='DSA')
			{
			$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/dsa'));
			echo json_encode($response);
			}
			else if($type=='DSA_MANAGER')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/manager'));
			   echo json_encode($response);
			}
			else if($type=='DSA_CSR')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/csr'));
			   echo json_encode($response);
			}
		}else{
			$response = array('status' => 0, 'message' => "Unable to update password, please try again", 'path' => '');
			echo json_encode($response);
		}
	}

//==========================================code by priyanka===========================================================
public function show_coapplicants()
{
	if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
		redirect(base_url('index.php/login'));
	}else{
		$id = $_GET['ID']; 
		//echo $id;
		//exit();
		if($id == '')$id = $this->session->userdata('ID');
			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$userType2 = $this->input->get('userType2');
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
			$search_name="";
			$filter = $this->input->get('s');
			if ($filter == '') {
				$filter = 'all';
				$search_name="";
			}
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			$customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date,$search_name);
			$Applicant_row= $this->Operations_user_model->getProfileData($id);
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			//$this->load->view('header', $data);
            $find_coapplicants =$this->Dsacustomers_model->getCustomers_coapplicants($id);
            $find_dsa_details=$this->Operations_user_model->get_dsa_details($Applicant_row->DSA_ID);
				if(isset($find_dsa_details))
				{
                    
					$arr['find_dsa_details']= $find_dsa_details;
                    //echo $find_dsa_details->FN;
                    

				}
                else
                {
                    $arr['find_dsa_details']=""; 
                }
			//echo "<pre>";
			//print_r( $find_coapplicants);
			//echo "</pre>";
			//echo $this->session->userdata('USER_TYPE');
			$arr['Applicant_row'] = $Applicant_row;
			$arr['userType'] = $userType;
			$arr['customers'] = $customers;
			$arr['coapplicants']= $find_coapplicants;
			$arr['s'] = $filter;
		if($this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'Operations_user'  || $this->session->userdata('USER_TYPE') == 'DSA' )$this->load->view('Operations_user/view_coapplicants', $arr);
		
	}
}

public function profile(){
	$this->load->helper('url');
	$age = $this->session->userdata('AGE');
	$data['showNav'] = 1;
	$data['age'] = $age;

	$customer_link = $this->input->get('customer_link');
	if ($customer_link == '')$customer_link = false;

	$data['userType'] = $this->session->userdata("USER_TYPE");
	//$this->load->view('header', $data);
	$this->load->model('Dsacrud_model');
			
	$id = $this->input->get('id');
	if($id == ''){
		$id = $this->session->userdata('ID');
		$profileArr['edit'] = 1;
	}else $profileArr['edit'] = 0;
	$dsa_banks=$this->Dsacrud_model->get_dsa_Banks($id);
	$profile_info = $this->Dsacrud_model->getProfileData($id);
	$profileArr['row'] = $profile_info;
	$profileArr['customer_link'] = $customer_link;
	$profileArr['id'] = $id;
	$profileArr['type'] = $this->input->get('type');
	$profileArr['dsa_banks']=$dsa_banks;
	$this->load->view('Operations_user/profile_new', $profileArr);
}
public function dsa_update_profile_one_new_action(){
		
	if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
		redirect(base_url('index.php/login'));
	}else{
		$this->load->model('Customercrud_model');	
		//$id = $this->session->userdata('ID');
		$id=$this->input->post('id');
		
		$banks=$this->input->post('bank');
		$dsa_code=$this->input->post('dsa_code');
		if($this->session->userdata('USER_TYPE') == 'DSA')
		{
			$count=count($banks);
			$check_dsa_banks=$this->Dsacrud_model->check_dsa_banks($id);
			
			if($check_dsa_banks>0)
			{
					$array_input = array(
					  'DSA_ID' => $id		
				   );		
			
			   // $id = $this->Customercrud_model->delete_doc($array_input);
				$remove=$this->Dsacrud_model->remove_dsa_banks($array_input);
				
			}
			for($i=0; $i<=$count-1; $i++)
			{
				$array_input =array(
				'BANK_NAME'=>$banks[$i],
				'DSA_CODE'=>$dsa_code[$i],
				'DSA_ID'=>$id
				);	
				$idS =$this->Dsacrud_model->insert_dsa_banks($id, $array_input);
				
			}
		}
		
		$array_input = array(
			'FN' => $this->input->post('f_name'),
			'MN' => $this->input->post('m_name'),	
			'LN' => $this->input->post('l_name'),
			'EMAIL' => $this->input->post('email'),
			'MOBILE' => $this->input->post('mobile'),
			'DOB' => ($this->input->post('dob')),
			'EDUCATION_BACKGROUND' => $this->input->post('education_type'),	
			'AADHAR_NUMBER' => ($this->input->post('aadhar')),
			'PAN_NUMBER' => ($this->input->post('pan')),
			'dsa_firm_name' => $this->input->post('firm_name'),
			'dsa_firm_type' => $this->input->post('firm_type'),
			'CITY' => $this->input->post('resi_city'),
			'STATE' => $this->input->post('resi_state'),
			'DISTRICT' => $this->input->post('resi_district'),	
			'dsa_corporate_dsa_name' => $this->input->post('corporate_dsa_name'),	
			'dsa_corporate_dsa_contact' => $this->input->post('corporate_dsa_contact'),	
			'dsa_works_loan_type' => $this->input->post('loan_types'),	
			'dsa_cases_processed_p_month' => $this->input->post('cases_processed'),	
			'dsa_avg_loan_size_anmt_in_lac' => $this->input->post('avg_loan'),	
			'dsa_fee_charge' => $this->input->post('fees'),	
			'dsa_address_line_1' => $this->input->post('resi_add_1'),	
			'dsa_address_line_2' => $this->input->post('resi_add_2'),	
			'dsa_address_line_3' => $this->input->post('resi_add_3'),	
			'dsa_landmark' => $this->input->post('resi_landmark'),
			'dsa_pincode' => $this->input->post('resi_pincode'),
			'dsa_property_type' => $this->input->post('resi_sel_property_type'),
			'EXPERIENCE' => $this->input->post('experience'),	
			'YEARS_IN_CITY_LIVING' => $this->input->post('resi_no_of_years'),	
			'Profile_Status'=>'Complete'
		);
		

		$idS = $this->Customercrud_model->update_profile($id, $array_input);
		if($idS > 0){	
			$response = array('status' => $idS, 'message' => "Profile updated successfully");
			echo json_encode($response);
		}else {
			$response = array('status' => $idS, 'message' => "Error in Bank save");
			echo json_encode($response);
		}
	}
}

public function update_basic_profile()
	{
		//$statle_str = file_get_contents(base_url('json/allCities.json'));
        //$state_json = json_decode($statle_str, true);
        //$states = array_keys($state_json);
		$this->load->model('Customercrud_model');
		$id = $this->input->get('id');
		if($id == ''){
			$id = $this->session->userdata('ID');
		}
		$data_row = $this->Customercrud_model->getProfileData($id);	
		//echo base64_decode($data_row->PAN_NUMBER);
		//exit;
		$data_banks=$this->Dsacrud_model->get_all_Banks();
		$dsa_banks=$this->Dsacrud_model->get_dsa_Banks($id);
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['userType'] = "DSA_MANAGER";
		$data['row'] = $data_row;
		$data['banks']=$data_banks;
		$data['dsa_banks']=$dsa_banks;
		
		//$data['states'] = $states;
		$this->load->view('header', $data);
		//print_r($data);exit;
		$this->load->view('Operations_user/dsa_update_profile_one_new', $data);
	}

	public function dsa(){
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
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
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			$search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');
            if(!empty($search_))
			{
                $s='search';
				$search_name =$this->input->post('filter_name');	
			}
         	else if (!empty($select_filters))
            {
                $s=$select_filters;
                $search_name=""; 
            }
            else if ($s == 'city') {
                  $s = 'city';
                  $search_name="";
            }
            else if ($s == 'bnk') {
                $s = 'bnk';
                $search_name="";
          }
            else
			{
                $s= $this->input->get('s');
				$search_name="";
			}
            $bank = $this->input->get('bnk_name');
			$city = $this->input->get('city_name');
            $id = $this->session->userdata('ID');
           if($this->session->userdata('USER_TYPE') == 'branch_manager' || $this->session->userdata('USER_TYPE') == 'Relationship_Officer' || $this->session->userdata('SITE') != 'finserv')
			{
				 $dsa_arr = $this->Admin_model->getDsaList_userwise($s, $bank ,$city,$id,$search_name);
			}
            else
            {
                 $dsa_arr = $this->Admin_model->getDsaList($id, $filter, $userType, $userType2, $date,$bank);
            }
            $_SESSION["data_for_excel"] = $dsa_arr;
            
           
            $data['row']=$this->Customercrud_model->getProfileData($id);
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

            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['data'] = $dsa_arr;
            $data['userType'] = $this->session->userdata('USER_TYPE');
            //$this->load->view('header', $data);             
            $banks = $this->Admin_model->getBanks();
			$cities = $this->Admin_model->getCity();
            $data['banks'] = $banks;
			$data['cities']=$cities ;
            $this->load->view('Operations_user/dsa', $data);   
        }        
    }
	public function View_DSA_profile()
    {
       //$data['userType'] = $this->session->userdata("USER_TYPE");
       //$this->load->view('header', $data);
	   if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
		redirect(base_url('index.php/login'));
	}else{
           $this->load->helper('url');
           $type = $this->input->get('type');
           $age = $this->session->userdata('AGE');
           $data['showNav'] = 1;
           $data['age'] = $age;
           $data['type'] = $type;
           $data['userType'] = $this->session->userdata("USER_TYPE");
       $this->load->model('Dsacrud_model');
               
       $id = $this->input->get('ID');
       //echo $id;
       //exit();
       $dsa_banks=$this->Dsacrud_model->get_dsa_Banks($id);
       $profile_info = $this->Dsacrud_model->getProfileData($id);
       $profileArr['row'] = $profile_info;
       //$profileArr['customer_link'] = $customer_link;
       $profileArr['id'] = $id;
       $profileArr['type'] = $this->input->get('type');
       $profileArr['dsa_banks']=$dsa_banks;
       $this->load->view('Operations_user/view_dsa_profile', $profileArr);
       }
    }
//=========================function for lead 
public function View_Lead(){
	if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
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
		$this->load->view('Operations_user/View_lead', $arr);
		
	}
}
/*----------------------------------- Addded by papiha on 18_05_2022-------------------------*/
public function customers_incomplete(){
	if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
	redirect(base_url('index.php/login'));
	}else{
	
	$id = $this->input->get('id');
	 
	$Cust_id=$this->session->set_userdata('Cust_id');
	if($id == '')$id = $this->session->userdata('ID');
	
	
	//echo $id;
	//exit();
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
	
	
	$userType = $this->input->get('userType');
	$date = $this->input->get('date');
	$search_name="";
	$userType2 = $this->input->get('userType2');
	if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
	
	
	
	$search_=$this->input->post('filter_name');
	$select_filters=$this->input->post('select_filters');
	//echo  $select_filters;
	//exit();
	
	if(!empty($search_))
	{
	$filter='search';
	$search_name =$this->input->post('filter_name');
	}
	else if (!empty($select_filters))
	{
	$filter=$select_filters;
	$search_name="";
	}
	else
	{
	$filter=$this->input->get('s');
	$search_name="";
	}
	
	
	$this->load->helper('url');
	$this->load->model('Dsacustomers_model');
	
	//print_r($find_coapplicants);
	$age = $this->session->userdata('AGE');
	$getDashboardData_5=$this->Operations_user_model->getDashboardData_complete_Legal();
	$data['showNav'] = 1;
	$data['age'] = $age;
	$data['userType'] = $this->session->userdata("USER_TYPE");
	//$this->load->view('header', $data);
	
	//echo $this->session->userdata('USER_TYPE');
	//$arr['coapplicants']= $find_coapplicants;
	$this->session->set_userdata('User_name',$user_name );
	$arr['user_name'] = $user_name;
	$arr['userType'] = $userType;
	$arr['customers'] = $getDashboardData_5;
	
	$arr['s'] = $filter;
	$data['row']=$this->Customercrud_model->getProfileData($id);
	$this->load->view('dashboard_header', $data);
	if($this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'Operations_user'  || $this->session->userdata('USER_TYPE') == 'DSA')$this->load->view('Operations_user/Incomplet_customers', $arr);
	
	 }
		}
/*----------------------- Addded by papiha on 28_04_2022-------------------------------------------*/
/*public function customers_with_pagination()
	{   
		$id = $this->session->userdata('ID');
		$CPA_ID=$id;
		$encoded = base64_encode($CPA_ID);
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
		$sel=$this->Operations_user_model->getDashboardData_2();
		$totalRecords =$sel;
		## Total number of records with filtering
		$sel=$this->Operations_user_model->Get_Customer_Filter_In_CAM($searchValue);
		$totalRecordwithFilter =$sel;
		## Fetch records
		$sel=$this->Operations_user_model->Get_Customer_With_Page_In_CAM($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
		$empRecords = $sel;
		//return $empRecords
		//print_r($empRecords);
		$data = array();
        
		foreach($empRecords as $row){
			//cam/
			//pd
			//edit
			





        
			if( $row->cam_status=='Cam details complete')
			{
				$Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>';
			}
			else
			{
				$Cam_pdf='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
			}  
         
		                 if($row->STATUS == 'PD Completed')
						{
					
						 $edit='<a  href="'. base_url().'index.php/Operations_user/CAM_Applicant_Details?ID='. $row->UNIQUE_CODE.'&c='.$encoded.'"Class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';

						  $PD='<a  href="'. base_url().'index.php/credit_manager_user/pdf?ID='. $row->UNIQUE_CODE.'&c='.$encoded.'"Class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
						 


						
						}
						else if( $row->STATUS=='Aadhar E-sign complete')
						{
							$edit='<a  href="'.base_url().'index.php/Operations_user/CAM_Applicant_Details?ID='.$row->UNIQUE_CODE.'&c='.$encoded.'"Class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
							$PD='<a  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
						 
					    }	
						else if($row->STATUS == 'Cam details complete')
						{
							$edit='<a  href="'.base_url().'index.php/Operations_user/CAM_Applicant_Details?ID='.$row->UNIQUE_CODE.'&c='.$encoded.'"Class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
							$PD='<a  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
						}
						else {

							$edit='<a  class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a>';
							$PD='<a  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
						}

				       
		


			$data[] = array(
			        
					"Application_id"=>$row->Application_id,
					"Cust_name"=>$row->FN.' '.$row->LN,
					"Application_Status"=>$row->STATUS,	
					"Referred_by"=>$row->Refer_By_Name.' [ '.$row->Refer_By_Category.' ]',		
					"Login_date"=>$row->CREATED_AT,	
					"Edit"=>$edit,	
					"CAM"=>$Cam_pdf,
					"PD"=>$PD,
					"BUREAU"=>'<a href="'.base_url().'index.php/Operations_user/show_coapplicants?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>',	
					"SendToVendors"=>'<a href="'.base_url().'index.php/credit_manager_user/Vendors?x='.base64_encode($row->Application_id).'" class="btn modal_test"><i class="fa fa-paper-plane text-center" style="color:blue;"></i>',	
					"VendorsReport"=>'	<a href="'.base_url().'index.php/credit_manager_user/view_Legal_docs?x='.base64_encode($row->Application_id).'&y='.base64_encode($row->UNIQUE_CODE).'"  class="btn modal_test"><i class="fa fa-envelope text-center" style="color:blue;"></i></a>',	
					"LoanDisbursementForm"=>'<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Loan_sanction_form?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>',		

					
				);
				
		}
		//print_r($data);
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		echo json_encode($response);
	} */

	//------------------------changes by priya 04-05-2022
	

	public function Edit_all_customers() // added by priya 10-05-2022
	{
			if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
			
        	$id = $this->input->get('id');
		   
        	$filter = $this->input->get('s');

        	if($filter=='')
        	{
        		$filter='all';
        	}
			$Cust_id=$this->session->set_userdata('Cust_id');
			if($id == '')$id = $this->session->userdata('ID');
			$CPA_ID=$id;

			//echo $id;
			//exit();
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


			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$search_name="";
			$userType2 = $this->input->get('userType2');
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");


                    
            $search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');
     
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
		
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			$this->session->set_userdata('User_name',$user_name );
			$arr['user_name'] = $user_name;
			$arr['userType'] = $userType;
			$arr['CPA_ID'] = $CPA_ID; 
			$arr['userID']=$user_info->UNIQUE_CODE;
	
			$arr['s'] = $filter;
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$this->load->view('dashboard_header', $data);
			if($this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'Operations_user'  || $this->session->userdata('USER_TYPE') == 'DSA') $this->load->view('Operations_user/Edit_all_customers', $arr);
	
		}
	}


	//------------------------changes by priya 10-05-2022
	public function edit_all_customers_with_pagination()
	{   
	   $data1['userType'] = $this->session->userdata("USER_TYPE");	
	    $login_user_id=$this->input->post('login_user_id');
	
	   $filter_by=$this->input->post('filter');

		$id = $this->session->userdata('ID');
		$CPA_ID=$id;
		$encoded = base64_encode($CPA_ID);
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
		if($data1['userType'] == 'DSA')
		{
				## Total number of records without filtering
				$sel=$this->Operations_user_model->customers_for_editing_DSA($filter_by, $login_user_id);
				$totalRecords =$sel;
				## Total number of records with filtering
				$sel=$this->Operations_user_model->Get_customers_for_editing_Filter_In_CAM_DSA($searchValue,$filter_by, $login_user_id);
				$totalRecordwithFilter =$sel;
				## Fetch records
				$sel=$this->Operations_user_model->Get_customers_for_editing_In_CAM_DSA($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by, $login_user_id);
				$empRecords = $sel;
				//return $empRecords
				//print_r($empRecords);
		}
		else
		{
				## Total number of records without filtering
				$sel=$this->Operations_user_model->customers_for_editing($filter_by);
				$totalRecords =$sel;
				## Total number of records with filtering
				$sel=$this->Operations_user_model->Get_customers_for_editing_Filter_In_CAM($searchValue,$filter_by);
				$totalRecordwithFilter =$sel;
				## Fetch records
				$sel=$this->Operations_user_model->Get_customers_for_editing_In_CAM($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
				$empRecords = $sel;
				//return $empRecords
				//print_r($empRecords);
		}
		
	
		$data = array();
        
		foreach($empRecords as $row){

         /*---------------------- cam-----------------------------------*/
			if( $row->cam_status=='Cam details complete')
			{
				$Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
			}
			else
			{
				$Cam_pdf='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
			}  
            /*----------------------------------edit----------------------------------------*/
		                 if($row->STATUS == 'PD Completed')
						{
					
					
								$edit= '<a  class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a><a style="margin-left: 8px; " href="'.base_url().'index.php/customer/profile_view_p_o?ID='.$row->UNIQUE_CODE.'"class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
						  $PD='<a  href="'. base_url().'index.php/credit_manager_user/pdf?ID='. $row->UNIQUE_CODE.'&c='.$encoded.'"Class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
						 


						
						}
						else if( $row->STATUS=='Aadhar E-sign complete')
						{
						
	$edit= '<a  class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a><a style="margin-left: 8px; " href="'.base_url().'index.php/customer/profile_view_p_o?ID='.$row->UNIQUE_CODE.'"class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
							$PD='<a  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
						 
					    }	
						else if($row->STATUS == 'Cam details complete')
						{

							

								$edit= '<a  class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a><a style="margin-left: 8px; " href="'.base_url().'index.php/customer/profile_view_p_o?ID='.$row->UNIQUE_CODE.'"class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
							
							$PD='<a  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
						}
						else {

								$edit= '<a style="margin-left: 8px;" href="'.base_url().'index.php/dsa/Go_No_GO_?ID='.$row->UNIQUE_CODE.'"class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a><a style="margin-left: 8px; " href="'.base_url().'index.php/customer/profile_view_p_o?ID='.$row->UNIQUE_CODE.'"class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';


							$PD='<a  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
						}

						if($row->credit_sanction_status == 'REJECT')
						{
                           $application_status='<lable style="color:red;">REJECTED</lable>';
						}
						else if($row->credit_sanction_status == 'HOLD')
						{
                           $application_status='<lable style="color:orange;">HOLD</lable>';
						}
						else
						{
							$application_status = $row->STATUS;
						}

				       
			/*--------------------------------------------------------------*/
			 if( $row->Sanctioned_date != NULL ||  $row->Sanctioned_date != '')
			{
			     $Sanction_letter='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/Sanction_Letter?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';
			     $MITC='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/MITAC_pdf?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';
			 }
			else
				{
					
					$Sanction_letter='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
					$MITC='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
					
				}


			$data[] = array(
			        
			
					"Cust_name"=>$row->FN.' '.$row->LN,
					"Application_Status"=>$application_status,	
					"Referred_by"=>$row->Refer_By_Name.' [ '.$row->Refer_By_Category.' ]',		
					"Login_date"=>$row->CREATED_AT,	
					"Edit"=>$edit,	
					"CAM"=>$Cam_pdf,
					"PD"=>$PD,
					"BUREAU"=>'<a href="'.base_url().'index.php/Operations_user/show_coapplicants?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>'	,
					  "Sanction_letter"=>$Sanction_letter,
				  "MITC"=>$MITC,
				

					
				);
				
		}
		//print_r($data);
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		echo json_encode($response);
	}

	/*-----------------------------------------------added by sonal on 21-05-2022--------------------------------------->*/
/*----------------------------------- Addded by papiha on 18_05_2022-------------------------
public function customers_incomplete(){
	if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER'){
	redirect(base_url('index.php/login'));
	}else{
	
	$id = $this->input->get('id');
	 
	$Cust_id=$this->session->set_userdata('Cust_id');
	if($id == '')$id = $this->session->userdata('ID');
	
	
	//echo $id;
	//exit();
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
	
	
	$userType = $this->input->get('userType');
	$date = $this->input->get('date');
	$search_name="";
	$userType2 = $this->input->get('userType2');
	if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
	
	
	
	$search_=$this->input->post('filter_name');
	$select_filters=$this->input->post('select_filters');
	//echo  $select_filters;
	//exit();
	
	if(!empty($search_))
	{
	$filter='search';
	$search_name =$this->input->post('filter_name');
	}
	else if (!empty($select_filters))
	{
	$filter=$select_filters;
	$search_name="";
	}
	else
	{
	$filter=$this->input->get('s');
	$search_name="";
	}
	
	
	$this->load->helper('url');
	$this->load->model('Dsacustomers_model');
	
	//print_r($find_coapplicants);
	$age = $this->session->userdata('AGE');
	$getDashboardData_5=$this->Operations_user_model->getDashboardData_complete_Legal();
	$data['showNav'] = 1;
	$data['age'] = $age;
	$data['userType'] = $this->session->userdata("USER_TYPE");
	//$this->load->view('header', $data);
	
	//echo $this->session->userdata('USER_TYPE');
	//$arr['coapplicants']= $find_coapplicants;
	$this->session->set_userdata('User_name',$user_name );
	$arr['user_name'] = $user_name;
	$arr['userType'] = $userType;
	$arr['customers'] = $getDashboardData_5;
	
	$arr['s'] = $filter;
	$data['row']=$this->Customercrud_model->getProfileData($id);
	$this->load->view('dashboard_header', $data);
	if($this->session->userdata('USER_TYPE') == 'Operations_user')$this->load->view('Operations_user/Incomplet_customers', $arr);
	
	 }
		}*/
	/*---------------------------------- Addded by papiha on 19_05_2022-------------------------------------*/
	public function Legal_incomplete()
	{
	
	
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
	$sel=$this->Operations_user_model->get_incomplete_Legal();
	$totalRecords =$sel;
	
	## Total number of records with filtering
	$sel=$this->Operations_user_model->get_incomplete_Legal_search($searchValue);
	$totalRecordwithFilter =$sel;
	## Fetch records
	$sel=$this->Operations_user_model->get_incomplete_Legal_search_details($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
	$empRecords = $sel;
	
	//return $empRecords
	//print_r($empRecords);
	$data = array();
	
	foreach($empRecords as $row){
	
		
	
		$edit='<a href="'.base_url().'index.php/Operations_user/Legal_incomplete_info?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
	
	
	
	
	
	
	
	$data[] = array(
	"Application_no"=>$row->Application_id,
	"Name"=>$row->FN.' '.$row->LN,
	"Status"=>$row->Legal_Status,
	"view"=>$edit,
	
	
	
	
	
	);
	
	}
	
	$response = array(
	"draw" => intval($draw),
	"iTotalRecords" => $totalRecords,
	"iTotalDisplayRecords" => $totalRecordwithFilter,
	"aaData" => $data
	);
	
	echo json_encode($response);
	}
	
//added by sonal on 20-5-2022

public function Legal_incomplete_info()
{
	if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
		redirect(base_url('index.php/login'));
		}else{
		
		$id = $this->input->get('id');
		 
		$Cust_id=$this->session->set_userdata('Cust_id');
		if($id == '')$id = $this->session->userdata('ID');
		
		
		//echo $id;
		//exit();
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
		
		
		$userType = $this->input->get('userType');
		$date = $this->input->get('date');
		$search_name="";
		$userType2 = $this->input->get('userType2');
		if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
		
		
		
		$search_=$this->input->post('filter_name');
		$select_filters=$this->input->post('select_filters');
		//echo  $select_filters;
		//exit();
		
		if(!empty($search_))
		{
		$filter='search';
		$search_name =$this->input->post('filter_name');
		}
		else if (!empty($select_filters))
		{
		$filter=$select_filters;
		$search_name="";
		}
		else
		{
		$filter=$this->input->get('s');
		$search_name="";
		}
		
		
		$this->load->helper('url');
		$this->load->model('Dsacustomers_model');
		
		//print_r($find_coapplicants);
		$age = $this->session->userdata('AGE');
		$getDashboardData_4=$this->Operations_user_model->getDashboardData_incomplete_Legal();
		$BankName_row=$this->Operations_user_model->getBankName();
		$BankName=$BankName_row->Bank_name;
		$Legaldata_row=$this->Operations_user_model->getLegalData();
		$Legal_name=$Legaldata_row->Legal_name;
		$Legal_Date=$Legaldata_row->Send_to_legal_date;
		$Last_updated_by_Legal=$Legaldata_row->Last_updated_by_Legal;
		$Remark=$Legaldata_row->Legal_remark;
	
	
				
		
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		//$this->load->view('header', $data);
		
		//echo $this->session->userdata('USER_TYPE');
		//$arr['coapplicants']= $find_coapplicants;
		$this->session->set_userdata('User_name',$user_name );
		$arr['user_name'] = $user_name;
		$arr['userType'] = $userType;
		$arr['customers'] = $getDashboardData_4;
		
		$arr['s'] = $filter;
		$data['row']=$this->Customercrud_model->getProfileData($id);
		$data['Legaldata_row']=$Legaldata_row;
		$data['BankName_row']=$BankName_row;
		$this->load->view('dashboard_header', $data);
		if($this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'Operations_user'  || $this->session->userdata('USER_TYPE') == 'DSA')$this->load->view('Operations_user/Legal_incomplete_info', $arr);
		
		 }
			}


			/*----------------------------------- Addded by sonal on 20_05_2022-------------------------*/
			public function customers_complete(){
			if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
			redirect(base_url('index.php/login'));
			}else{
			
			$id = $this->input->get('id');
			
			$Cust_id=$this->session->set_userdata('Cust_id');
			if($id == '')$id = $this->session->userdata('ID');
			
			
			//echo $id;
			//exit();
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
			
			
			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$search_name="";
			$userType2 = $this->input->get('userType2');
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
			
			
			
			$search_=$this->input->post('filter_name');
			$select_filters=$this->input->post('select_filters');
			//echo  $select_filters;
			//exit();
			
			if(!empty($search_))
			{
			$filter='search';
			$search_name =$this->input->post('filter_name');
			}
			else if (!empty($select_filters))
			{
			$filter=$select_filters;
			$search_name="";
			}
			else
			{
			$filter=$this->input->get('s');
			$search_name="";
			}
			
			
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			
			//print_r($find_coapplicants);
			$age = $this->session->userdata('AGE');
			$getDashboardData_5=$this->Operations_user_model->getDashboardData_complete_Legal();
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			//$this->load->view('header', $data);
			
			//echo $this->session->userdata('USER_TYPE');
			//$arr['coapplicants']= $find_coapplicants;
			$this->session->set_userdata('User_name',$user_name );
			$arr['user_name'] = $user_name;
			$arr['userType'] = $userType;
			$arr['customers'] = $getDashboardData_5;
			
			$arr['s'] = $filter;
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$this->load->view('dashboard_header', $data);
			if($this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'Operations_user'  || $this->session->userdata('USER_TYPE') == 'DSA')$this->load->view('Operations_user/complet_customers', $arr);
			
			}
				}
			/*---------------------------------- Addded by papiha on 19_05_2022-------------------------------------*/
			public function Legal_complete()
			{
				$id = $this->session->userdata('ID');
				$CPA_ID=$id;
				$encoded = base64_encode($CPA_ID);
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
			$sel=$this->Operations_user_model->get_complete_Legal();
			$totalRecords =$sel;
			
			## Total number of records with filtering
			$sel=$this->Operations_user_model->get_complete_Legal_search($searchValue);
			$totalRecordwithFilter =$sel;
			## Fetch records
			$sel=$this->Operations_user_model->get_complete_Legal_search_details($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
			$empRecords = $sel;
			
			//return $empRecords
			//print_r($empRecords);
			$data = array();
			
			foreach($empRecords as $row){
			
				
			
			
				$other='<a href="'.base_url().'index.php/Operations_user/view_Legal_docs_Legal?x='.base64_encode($row->Application_id).'&y='.base64_encode($row->UNIQUE_CODE).'"  class="btn modal_test"><i class="fa fa-envelope text-center" style="color:blue;"></i></a>';	
			
			
			
			
			
			$data[] = array(
			"Application_no"=>$row->Application_id,
			"Name"=>$row->FN.' '.$row->LN,
			"other_info"=>$other,

			
			
			
			
			
			
			);
			
			}
			
			$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
			);
			
			echo json_encode($response);
			}


			/*------------------------added by sonal on 20-05-2022 for technical-------------> */
			/*----------------------------------- Addded by sonal on 20_05_2022-------------------------*/
			public function customers_incomplete_Tech(){
			if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
			redirect(base_url('index.php/login'));
			}else{
			
			$id = $this->input->get('id');
			
			$Cust_id=$this->session->set_userdata('Cust_id');
			if($id == '')$id = $this->session->userdata('ID');
			
			
			//echo $id;
			//exit();
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
			
			
			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$search_name="";
			$userType2 = $this->input->get('userType2');
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
			
			
			
			$search_=$this->input->post('filter_name');
			$select_filters=$this->input->post('select_filters');
			//echo  $select_filters;
			//exit();
			
			if(!empty($search_))
			{
			$filter='search';
			$search_name =$this->input->post('filter_name');
			}
			else if (!empty($select_filters))
			{
			$filter=$select_filters;
			$search_name="";
			}
			else
			{
			$filter=$this->input->get('s');
			$search_name="";
			}
			
			
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			
			//print_r($find_coapplicants);
			$age = $this->session->userdata('AGE');
			$getDashboardData_6=$this->Operations_user_model->getDashboardData_incomplete_Tech();
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			//$this->load->view('header', $data);
			
			//echo $this->session->userdata('USER_TYPE');
			//$arr['coapplicants']= $find_coapplicants;
			$this->session->set_userdata('User_name',$user_name );
			$arr['user_name'] = $user_name;
			$arr['userType'] = $userType;
			$arr['customers'] = $getDashboardData_6;
			
			$arr['s'] = $filter;
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$this->load->view('dashboard_header', $data);
			if($this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'Operations_user'  || $this->session->userdata('USER_TYPE') == 'DSA')$this->load->view('Operations_user/incomplete_customers_tech', $arr);
			
			}
				}
			/*---------------------------------- Addded by papiha on 20_05_2022-------------------------------------*/
			public function Technical_incomplete()
			{
			
			
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
			$sel=$this->Operations_user_model->get_incomplete_Tech();
			$totalRecords =$sel;
			
			## Total number of records with filtering
			$sel=$this->Operations_user_model->get_incomplete_Tech_search($searchValue);
			$totalRecordwithFilter =$sel;
			## Fetch records
			$sel=$this->Operations_user_model->get_incomplete_Tech_search_details($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
			$empRecords = $sel;
			
			//return $empRecords
			//print_r($empRecords);
			$data = array();
			
			foreach($empRecords as $row){
			
				
			
					$edit='<a href="'.base_url().'index.php/Operations_user/Tech_incomplete_info?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-eye text-right" style="color:blue;"></i></a>';

			
			
			
			
			
			
			
			$data[] = array(
			"Application_no"=>$row->Application_id,
			"Name"=>$row->FN.' '.$row->LN,
			"Status"=>$row->Techical_status,
			"view"=>$edit,
			
			
			
			
			
			);
			
			}
			
			$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
			);
			
			echo json_encode($response);
			}
			
		//added by sonal on 20-5-2022

		public function Tech_incomplete_info()
		{
			if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
				redirect(base_url('index.php/login'));
				}else{
				
				$id = $this->input->get('id');
				
				$Cust_id=$this->session->set_userdata('Cust_id');
				if($id == '')$id = $this->session->userdata('ID');
				
				
				//echo $id;
				//exit();
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
				
				
				$userType = $this->input->get('userType');
				$date = $this->input->get('date');
				$search_name="";
				$userType2 = $this->input->get('userType2');
				if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
				
				
				
				$search_=$this->input->post('filter_name');
				$select_filters=$this->input->post('select_filters');
				//echo  $select_filters;
				//exit();
				
				if(!empty($search_))
				{
				$filter='search';
				$search_name =$this->input->post('filter_name');
				}
				else if (!empty($select_filters))
				{
				$filter=$select_filters;
				$search_name="";
				}
				else
				{
				$filter=$this->input->get('s');
				$search_name="";
				}
				
				
				$this->load->helper('url');
				$this->load->model('Dsacustomers_model');
				
				//print_r($find_coapplicants);
				$age = $this->session->userdata('AGE');
				$getDashboardData_6=$this->Operations_user_model->getDashboardData_incomplete_Tech();

				$BankName_row=$this->Operations_user_model->getBankName();
				$BankName=$BankName_row->Bank_name;
				$Legaldata_row=$this->Operations_user_model->getLegalData();
				$Technical_name=$Legaldata_row->Technical_name;
				$Legal_Date=$Legaldata_row->Send_to_Technical_Date;
				$Last_updated_by_Legal=$Legaldata_row->Last_updated_by_technical;
				$Remark=$Legaldata_row->Technical_Remark;
			
			
						
				
				$data['showNav'] = 1;
				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				//$this->load->view('header', $data);
				
				//echo $this->session->userdata('USER_TYPE');
				//$arr['coapplicants']= $find_coapplicants;
				$this->session->set_userdata('User_name',$user_name );
				$arr['user_name'] = $user_name;
				$arr['userType'] = $userType;
				$arr['customers'] = $getDashboardData_6;
				
				$arr['s'] = $filter;
				$data['row']=$this->Customercrud_model->getProfileData($id);
				$data['Legaldata_row']=$Legaldata_row;
				$data['BankName_row']=$BankName_row;
				$this->load->view('dashboard_header', $data);
				if($this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'Operations_user'  || $this->session->userdata('USER_TYPE') == 'DSA')$this->load->view('Operations_user/Tech_incomplete_info', $arr);
				
				}
					}


					
		/*----------------------------------- Addded by sonal on 20_05_2022-------------------------*/
			public function customers_complete_Tech(){
			if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
			redirect(base_url('index.php/login'));
			}else{
			
			$id = $this->input->get('id');
			
			$Cust_id=$this->session->set_userdata('Cust_id');
			if($id == '')$id = $this->session->userdata('ID');
			
			
			//echo $id;
			//exit();
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
			
			
			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$search_name="";
			$userType2 = $this->input->get('userType2');
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
			
			
			
			$search_=$this->input->post('filter_name');
			$select_filters=$this->input->post('select_filters');
			//echo  $select_filters;
			//exit();
			
			if(!empty($search_))
			{
			$filter='search';
			$search_name =$this->input->post('filter_name');
			}
			else if (!empty($select_filters))
			{
			$filter=$select_filters;
			$search_name="";
			}
			else
			{
			$filter=$this->input->get('s');
			$search_name="";
			}
			
			
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			
			//print_r($find_coapplicants);
			$age = $this->session->userdata('AGE');
			$getDashboardData_7=$this->Operations_user_model->getDashboardData_complete_Legal();
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			//$this->load->view('header', $data);
			
			//echo $this->session->userdata('USER_TYPE');
			//$arr['coapplicants']= $find_coapplicants;
			$this->session->set_userdata('User_name',$user_name );
			$arr['user_name'] = $user_name;
			$arr['userType'] = $userType;
			$arr['customers'] = $getDashboardData_7;
			
			$arr['s'] = $filter;
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$this->load->view('dashboard_header', $data);
			if($this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'Operations_user'  || $this->session->userdata('USER_TYPE') == 'DSA' )$this->load->view('Operations_user/complet_customers_tech', $arr);
			
			}
				}
			/*---------------------------------- Addded by papiha on 19_05_2022-------------------------------------*/
			public function Technical_complete()
			{
				$id = $this->session->userdata('ID');
				$CPA_ID=$id;
				$encoded = base64_encode($CPA_ID);
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
			$sel=$this->Operations_user_model->get_complete_Tech();
			$totalRecords =$sel;
			
			## Total number of records with filtering
			$sel=$this->Operations_user_model->get_complete_Tech_search($searchValue);
			$totalRecordwithFilter =$sel;
			## Fetch records
			$sel=$this->Operations_user_model->get_complete_Tech_search_details($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
			$empRecords = $sel;
			
			//return $empRecords
			//print_r($empRecords);
			$data = array();
			
			foreach($empRecords as $row){
			
				
			
			
				$other='<a href="'.base_url().'index.php/Operations_user/view_Legal_docs_Tech?x='.base64_encode($row->Application_id).'&y='.base64_encode($row->UNIQUE_CODE).'"  class="btn modal_test"><i class="fa fa-envelope text-center" style="color:blue;"></i></a>';	
			
			
			
			
			
			$data[] = array(
			"Application_no"=>$row->Application_id,
			"Name"=>$row->FN.' '.$row->LN,
			"other_info"=>$other,

			
			
			
			
			
			
			);
			
			}
			
			$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
			);
			
			echo json_encode($response);
			}
			public function view_Legal_docs_Tech()
			{
				 $id=$_GET['x'];
				 $Application_id=base64_decode($id);
				 $unique_id=$_GET['y'];
				 $UNIQUE_CODE=base64_decode($unique_id);
				 $fileList= $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'Legal','CPA');
				
				 //$fileList = glob("./images/Legal_Documents/".$Applicatio_id.'/*');
				$TechnicalList=$this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'Technical','CPA');
				 /*foreach($fileList as $filename){
					   //Simply print them out onto the screen.
					   echo $filename, '<br>'; 
					}*/
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
						$data['Applicant_data']=$this->Customercrud_model->getProfileData($UNIQUE_CODE);
						
						$data['fileList']=$fileList;
						$data['TechnicalList']=$TechnicalList;
						$this->load->view('dashboard_header', $data);
						$this->load->view('Operations_user/view_legal_doc_Tech', $data);
			}
			public function view_Legal_docs_Legal()
			{
				 $id=$_GET['x'];
				 $Application_id=base64_decode($id);
				 $unique_id=$_GET['y'];
				 $UNIQUE_CODE=base64_decode($unique_id);
				 $fileList= $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'Legal','CPA');
				
				 //$fileList = glob("./images/Legal_Documents/".$Applicatio_id.'/*');
				$TechnicalList=$this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'Technical','CPA');
				 /*foreach($fileList as $filename){
					   //Simply print them out onto the screen.
					   echo $filename, '<br>'; 
					}*/
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
						$data['Applicant_data']=$this->Customercrud_model->getProfileData($UNIQUE_CODE);
						
						$data['fileList']=$fileList;
						$data['TechnicalList']=$TechnicalList;
						$this->load->view('dashboard_header', $data);
						$this->load->view('Operations_user/view_legal_doc_Legal', $data);
			}



/*---------------------------- added by papiha on 23_05_2022-----------------------------------------------*/
public function get_document_details()
{
   $ID=$this->input->post('ID');
   $result=$this->Operations_user_model->get_document_details($ID);
   $result = json_decode(json_encode($result), true);
   
   if($result['doc_cloud_name']=='')
   {
           $view=base_url().'images/documents/'.$result['DOC_NAME'];
		   $download=base_url().'images/documents/'.$result['DOC_NAME'];
   }
   else
   {
	       $view=base_url().'index.php/customer/view_cloud_file/'.$ID;
		   $download=base_url().'index.php/customer/download_cloud_file/'.$ID;
   }

   $response = array('view' =>  $view, 'download'=>$download);
			echo json_encode($response);
 
   /*<?php if($row->doc_cloud_name == '') {  ?>
															<a href="<?php echo base_url();?>images/documents/<?php echo $row->DOC_NAME;?>">View</a>
															<a href="<?php echo base_url();?>images/documents/<?php echo $row->DOC_NAME;?>" target='_blank' download>Download</a>
														<?php } else { ?>
															<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $row->ID; ?>" target='_blank' >View</a> 

															<a href="<?php echo base_url();?>index.php/customer/download_cloud_file/<?php echo $row->ID; ?>" target='_blank' >Download</a> 
														<?php } ?>*/
}

/*------------------------ Addded by papiha on 08_08_2022------------------------------------------------------*/
public function customers_with_pagination()
	{   

        $filter_by=$this->input->post('filter');

		$id = $this->session->userdata('ID');
		$CPA_ID=$id;
		$encoded = base64_encode($CPA_ID);
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
		$sel=$this->Operations_user_model->getDashboardData_2($filter_by);
		$totalRecords =$sel;
		## Total number of records with filtering
		$sel=$this->Operations_user_model->Get_Customer_Filter_In_CAM($searchValue,$filter_by);
		$totalRecordwithFilter =$sel;
		## Fetch records
		$sel=$this->Operations_user_model->Get_Customer_With_Page_In_CAM($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
		$empRecords = $sel;
		//return $empRecords
		//print_r($empRecords);
		$data = array();
        
		foreach($empRecords as $row){
			//cam/
			//pd
			//edit
			





         /*---------------------- cam-----------------------------------*/
			if( $row->cam_status=='Cam details complete')
			{
				$Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>';
			}
			else
			{
				$Cam_pdf='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
			}  
            /*----------------------------------edit----------------------------------------*/
		                 if($row->STATUS == 'PD Completed' || $row->STATUS == 'Loan Recommendation Approved')
						{
					
						// $edit='<a  href="'. base_url().'index.php/Operations_user/CAM_Applicant_Details?ID='. $row->UNIQUE_CODE.'&c='.$encoded.'"Class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
						$edit='<a  class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a>';
							
						  $PD='<a  href="'. base_url().'index.php/credit_manager_user/pdf?ID='. $row->UNIQUE_CODE.'&c='.$encoded.'"Class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
						 


						
						}
						else if( $row->STATUS=='Aadhar E-sign complete')
						{
							$edit='<a  href="'.base_url().'index.php/Operations_user/CAM_Applicant_Details?ID='.$row->UNIQUE_CODE.'&c='.$encoded.'"Class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
							$PD='<a  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
						 
					    }	
						else if($row->STATUS == 'Cam details complete')
						{
							//$edit='<a  href="'.base_url().'index.php/Operations_user/CAM_Applicant_Details?ID='.$row->UNIQUE_CODE.'&c='.$encoded.'"Class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';

							$edit='<a  class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a>';
							$PD='<a  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
						}
						else {

							$edit='<a  class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a>';
							$PD='<a  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
						}

						if($row->credit_sanction_status == 'REJECT')
						{
                           $application_status='<lable style="color:red;">REJECTED</lable>';
						}
						else if($row->credit_sanction_status == 'HOLD')
						{
                           $application_status='<lable style="color:orange;">HOLD</lable>';
						}
						else
						{
							$application_status = $row->STATUS;
						}

				       
			/*--------------------------------------------------------------*/
if( $row->Sanctioned_date != NULL ||  $row->Sanctioned_date != '')
			{
			     $Sanction_letter='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/Sanction_Letter?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';
			     $MITC='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/MITAC_pdf?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';
			 }
			else
				{
					
					$Sanction_letter='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
					$MITC='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
					
				}

			$data[] = array(
			        
					"Application_id"=>$row->Application_id,
					"Cust_name"=>$row->FN.' '.$row->LN,
					"Application_Status"=>$application_status,	
					"Referred_by"=>$row->Refer_By_Name.' [ '.$row->Refer_By_Category.' ]',		
					"Login_date"=>$row->CREATED_AT,	
					"Edit"=>$edit,	
					"CAM"=>$Cam_pdf,
					"PD"=>$PD,
					  "Sanction_letter"=>$Sanction_letter,
				  "MITC"=>$MITC,
					"BUREAU"=>'<a href="'.base_url().'index.php/Operations_user/show_coapplicants?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>',	
					"SendToVendors"=>'<a href="'.base_url().'index.php/credit_manager_user/Vendors?x='.base64_encode($row->Application_id).'" class="btn modal_test"> FI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </i></a>
					              <br><a href="'.base_url().'index.php/credit_manager_user/Vendors_RCU?x='.base64_encode($row->Application_id).'" class="btn modal_test">RCU&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
								  <br><a href="'.base_url().'index.php/credit_manager_user/Vendors_Legal?x='.base64_encode($row->Application_id).'" class="btn modal_test">Legal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
								  <br><a href="'.base_url().'index.php/credit_manager_user/Vendors_Technical?x='.base64_encode($row->Application_id).'" class="btn modal_test">Technical</a>',	
				//	"VendorsReport"=>'	<a href="'.base_url().'index.php/credit_manager_user/view_Legal_docs?x='.base64_encode($row->Application_id).'&y='.base64_encode($row->UNIQUE_CODE).'"  class="btn modal_test"><i class="fa fa-envelope text-center" style="color:blue;"></i></a>',	
					"LoanDisbursementForm"=>'<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Loan_sanction_form?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>',		

					
				);
				
		}
		//print_r($data);
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		echo json_encode($response);
	}

	//=============================== added by priya 9-08-2022 ==========================================================
public function POST_CAM()
{
    $id = $this->input->get("ID");
  	$get_pd_data= $this->credit_manager_user_model->getPDData($id);
    $data['data_row_PD_details']=$get_pd_data;
    $data_row = $this->Operations_user_model->getProfileData($id);
   /*------------------added by papih on 1_12_2021------------------------------*/
    $DSA_ID=$data_row->DSA_ID;
	$MANAGER_ID=$data_row->MANAGER_ID;
	$CSR_ID=$data_row->CSR_ID;
	$BM_ID=$data_row->BM_ID;
	$CM_ID=$data_row->CM_ID;
	$RO_ID=$data_row->RO_ID;
	    if($DSA_ID!='NULL' && $DSA_ID!='' && $DSA_ID!='0')
		{
			$Sourcing_info= $this->Dsacrud_model->getProfileData($DSA_ID);
			$Sourcing_Type="DSA";
			$Sourcing_By="DSA Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Manager Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="CSR Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Branch Manager Name";
				
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Cluster Manager Name";
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
						 $Sourcing_city=$Sourcing_info->CITY;
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
				$Sourcing_By="Relationship Officer Name";
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
						$Sourcing_city=$Sourcing_info->CITY;
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
	    /*---------------------------------------------endedby papiha----------------------------------*/
  $data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
  $data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
  $data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
  $data_row_more = $this->Operations_user_model->getProfileDataMore($id);	
  $data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
  $address=$data_row_more->RES_ADDRS_LINE_1." ".$data_row_more->RES_ADDRS_LINE_2." ".$data_row_more->RES_ADDRS_LINE_3;
  $per_address=$data_row_more->PER_ADDRS_LINE_1." ".$data_row_more->PER_ADDRS_LINE_2." ".$data_row_more->PER_ADDRS_LINE_3;
  $data_credit_analysis=$this->Operations_user_model->getcreditData($id);
  if(!empty($data_credit_score))
  {
	  $data_response=$data_credit_score->response;
  	  $data_address=json_decode($data_response,true);
	  $credit_score_response=json_decode($data_credit_score->response,true);
	  if(isset($data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
	  {
	  $data_emails=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
	  $data_add=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
	  }
	  else
	  {
		$data_emails=[];
		$data_add=array();
	  }
	 if(isset($data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
	  {
	  $data_obligations=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
	  $data_obligations_array=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
	  }
	  else
	  {
		$data_obligations=[]; 
		$data_obligations_array=[];
	  }
	  $total_obligation=0;
	  foreach($data_add as $data_ad)
		  {
			  $str1= preg_replace('/\s+/', ' ', trim($address));
			  $str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
			  $str3=preg_replace('/\s+/', ' ', trim($per_address));
			   if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
			   {
				  $address_flag='true';
					break;
			   }
			   else
			   {
				   $address_flag='false';
			   }
		  }
		  foreach($data_emails as $data_email)
		  {
			  $str1= preg_replace('/\s+/', ' ', trim($data_row->EMAIL));
			  $str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
			   if(strcmp($str1,$str2)==0 )
			   {
				  $email_flag='true';
					break;
			   }
			   else
			   {
				   $email_flag='false';
				  
			   }
		  }	
		  
		  $k=0;
		  $Applicant_obligation_Array = []; 
		   foreach($data_obligations as $data_obligation)
			  {
				  
				  if($data_obligation['Open']=='Yes')
				  {
					   if(isset($data_obligation['InstallmentAmount']))
					   {
						  $total_obligation= $total_obligation+ $data_obligation['InstallmentAmount'];
					   }
					  //echo $k;
					  $Applicant_obligation_Array[$k]= $data_obligation['AccountNumber'];
			
				  $k++;	 
				  }
				  
				  else
				  {
				  }
			  }

  }
  else
  {
	   $email_flag='false';
	   $address_flag='false';
	   
	   $data_address="";
	   $total_obligation=0;
	   $data_obligations=array();
	   $credit_score_response=array();
  }
  if($data_appliedloan->LOAN_TYPE=='home')
	  {
		  $data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
		  $data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
		  
		  $coapp_add_flag=array();
		  $coapp_email_flag=array();
		  $i=1;
		  foreach($data_coapplicant as $coapplicant)
		  {
			  $coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
			  $coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
			  $coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
			  $coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
			  if(!empty($coapp_data_credit_score))
			  {
				  $coapp_data_response=$coapp_data_credit_score->response;
				  $coapp_data_address=json_decode($coapp_data_response,true);
				  if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
				 	{
				  		$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
				  	}
				  else
				  	{
					  	$coapp_data_emails="";
				  	}
				  if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']))
				 	 {
				  		$TotalSanctionAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];
				  		$data['TotalSanctionAmount']=$TotalSanctionAmount;
				  	}
				  else
				  	{
						$TotalSanctionAmount="";
						$data['TotalSanctionAmount']=$TotalSanctionAmount;
				  	}
				  if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo']))
				  	{
					    $coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
				  		$coapp_data_response=$coapp_data_credit_score->response;
				  		$coapp_credit_score=json_decode($coapp_data_response,true);
				  }
				  else
				  {
					  $coapp_data_add=array();
					  $coapp_data_response='';
					  $coapp_credit_score=array();
				  }
				
				  if(isset($coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
				  {
				  	   $coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
				  }
				  else
				  {
					   $coapp_data_obligations=[];  
				  }
      //==============================================added by priyanka==============================================
				  $k=0;
				  $Co_Applicant_obligation_Array = []; 
				  $Co_Applicant_obligation_Array_attributes= []; 
				  foreach($coapp_data_obligations as $coapp_data_obligation)
				  {
					  if($coapp_data_obligation['Open']=='Yes')
					  {
						   if(isset($coapp_data_obligation['InstallmentAmount']))
						   {
							  $total_obligation= $total_obligation+ $coapp_data_obligation['InstallmentAmount'];
						   }
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
						  foreach($Co_Applicant_obligation_Array as $value)
						   {
						    	if(isset($Applicant_obligation_Array))
								{
								 if(!in_array($value, $Applicant_obligation_Array)) 
								 {
							 	  array_push($new_array, $value);
								 }
						        } 
								else
								{
								  $Applicant_obligation_Array=[];
								  if(!in_array($value, $Applicant_obligation_Array)) 
								  {
								    array_push($new_array, $value);
								  }
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
				  		  }
     			  }
   			  $sorted_array=array_diff($Co_Applicant_obligation_Array ,$Applicant_obligation_Array);
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
			}$address_flag='false';
							$coapp_data_obligations_array[$i]=$coapp_data_obligations;	
							$coapp_credit_score_array[$i]=$coapp_credit_score;
							foreach($coapp_data_add as $data_ad)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
									$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
									$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
									if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
									{
										$address_flag='true';
											break;
									}
									else
									{
										$address_flag='false';
									}
									
								}
								if($coapp_data_emails!="")
								{
								foreach($coapp_data_emails as $data_email)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
									$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
									if(strcmp($str1,$str2)==0 )
									{
										$email_flag='true';
											break;
									}
									else
									{
										$email_flag='false';
										
									}
								}	
								
									$coapp_email_flag[$i]=$email_flag;
							}
									$coapp_add_flag[$i]=$address_flag;
								
								
						}
						else
						{
							$total_obligation=0;
							$coapp_add_flag[$i]='false';
							$coapp_add_flag[$i]='false';
							$coapp_data_obligations_array[$i]=array();	
							$Co_Applicant_obligation_Array_attributes[$i]=array();
							$Co_Applicant_sorted_array[$i]=array();
							$coapp_credit_score_array[$i]=array();
							$coapp_credit_score=array();
							
						}
								
						$coapp_data_credit_analysis_array[$i]=$coapp_data_credit_analysis;
						$coapp_data_credit_score_array[$i]=$coapp_data_credit_score;
						$coapp_data_obligation_array[$i]=$total_obligation;
						if(isset($sorted_array))
						{
						$Co_Applicant_sorted_array[$i]=$sorted_array;
						}
						else
						{
							$Co_Applicant_sorted_array[$i]=[];
						}
						$i++;
					
					}
					
					
				}
				elseif($data_appliedloan->LOAN_TYPE=='lap')
				{
					$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
					$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
					
					$coapp_add_flag=array();
					$coapp_email_flag=array();
					$i=1;
					foreach($data_coapplicant as $coapplicant)
					{
					
         				$coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
						$coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
						$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
						$coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
						
					
						if(!empty($coapp_data_credit_score))
						{
							$coapp_data_response=$coapp_data_credit_score->response;
							$coapp_data_address=json_decode($coapp_data_response,true);
						
							if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
						{
							$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
							}
							else
							{
								$coapp_data_emails="";
							}

							if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount']))
							{
								$TotalSanctionAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];
								$data['TotalSanctionAmount']=$TotalSanctionAmount;
							}
							else
							{
								$TotalSanctionAmount=""; $data['TotalSanctionAmount']="";
							}
							
							
							if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo']))
							{
									$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
							
							}
							else
							{
								$coapp_data_add=array();
							}
						$coapp_data_response=$coapp_data_credit_score->response;
							$coapp_credit_score=json_decode($coapp_data_response,true);
							if(isset($coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
							{
							$coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
							}
							else
							{
								$coapp_data_obligations=array();
							}
			//==============================================added by priyanka==============================================
							$k=0;
							$Co_Applicant_obligation_Array = []; 
							$Co_Applicant_obligation_Array_attributes= []; 
							foreach($coapp_data_obligations as $coapp_data_obligation)
							{
								
								if($coapp_data_obligation['Open']=='Yes')
								{
									if(isset($coapp_data_obligation['InstallmentAmount']))
									{
										$total_obligation= $total_obligation+ $coapp_data_obligation['InstallmentAmount'];
									}
			
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
			
						if(isset($Applicant_obligation_Array))
						{
							$sorted_array=array_diff($Co_Applicant_obligation_Array ,$Applicant_obligation_Array);
						}
						else
						{
							
						}
		

			            
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
							$coapp_data_obligations_array[$i]=$coapp_data_obligations;	
							$coapp_credit_score_array[$i]=$coapp_credit_score;
							foreach($coapp_data_add as $data_ad)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
									$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
									$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
									if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
									{
										$address_flag='true';
										break;
									}
									else
									{
										$address_flag='false';
									}
									
								}
								if($coapp_data_emails!="")
								{
								foreach($coapp_data_emails as $data_email)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
									$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
									if(strcmp($str1,$str2)==0 )
									{
										$email_flag='true';
										break;
									}
									else
									{
										$email_flag='false';
										
									}
								}	
								
								$coapp_email_flag[$i]=$email_flag;
							}
								$coapp_add_flag[$i]=$address_flag;
								
								
						}
						else
						{
							$total_obligation=0;
							$coapp_add_flag[$i]='false';
							$coapp_add_flag[$i]='false';
							$coapp_data_obligations_array[$i]=array();	
							$Co_Applicant_obligation_Array_attributes[$i]=array();
							$Co_Applicant_sorted_array[$i]=array();
							$coapp_credit_score_array[$i]=array();
							$coapp_credit_score=array();
							
						}
							
						$coapp_data_credit_analysis_array[$i]=$coapp_data_credit_analysis;
						$coapp_data_credit_score_array[$i]=$coapp_data_credit_score;
						$coapp_data_obligation_array[$i]=$total_obligation;
						//$Co_Applicant_sorted_array[$i]=$sorted_array;
						$i++;
					
					}
				
					
					
				}
				else
				{
					$data_coapplicant_no=0;
					$data_coapplicant=array();
					$coapp_add_flag=array();
					$coapp_email_flag=array();
					$coapp_credit_score=array();
					$coapp_data_credit_analysis_array=array();
					$coapp_data_credit_score_array=array();
					$coapp_data_obligation_array=array();
					$coapp_data_obligations_array=array();
					$Co_Applicant_obligation_Array_attributes=array();
					
					$coapp_credit_score_array=array();
				}
		
			
	
					$data['Sourcing_name']=$Sourcing_name;
					$data['Sourcing_By']=$Sourcing_By;
					$data['Sourcing_Type']=$Sourcing_Type;
					$data['Sourcing_city']=$Sourcing_city;
					$data['Sourcing_state']=$Sourcing_state;
		
				$data['Co_Applicant_sorted_array'] = $Co_Applicant_sorted_array;
     			$data['row'] = $data_row;
				$data['data_row_more']=$data_row_more;
				
				$data['PER_ADDRS_LINE_1']=$data_row_more->PER_ADDRS_LINE_1;
				$data['PER_ADDRS_LINE_2']=$data_row_more->PER_ADDRS_LINE_2;
				$data['PER_ADDRS_LINE_3']=$data_row_more->PER_ADDRS_LINE_3;
				$data['RES_ADDRS_LINE_1']=$data_row_more->RES_ADDRS_LINE_1;
				$data['RES_ADDRS_LINE_2']=$data_row_more->RES_ADDRS_LINE_2;
				$data['RES_ADDRS_LINE_3']=$data_row_more->RES_ADDRS_LINE_3;
				$data['Locality_type']=$data_row_more->Locality_type;
				$data['NO_OF_DEPENDANTS']=$data_row_more->NO_OF_DEPENDANTS;
				$data['NATIVE_PLACE']=$data_row_more->NATIVE_PLACE;
				$data['VERIFY_PAN']=$data_row_more->VERIFY_PAN;
				$data['TIMESTAMP']=$data_row_more->TIMESTAMP;
				$data['verify_ca_regi_status']=$data_row_more->verify_ca_regi_status;
				$data['verify_cs_regi_status']=$data_row_more->verify_cs_regi_status;
				$data['verify_icwa_regi_status']=$data_row_more->verify_icwa_regi_status;
				$data['STATUS']=$data_row_more->STATUS;
				$data['Passport_Number']=$data_row_more->Passport_Number;
				$data['verify_Passport_no']=$data_row_more->verify_Passport_no;
				//$data['KYC_doc']=$data_row_more->KYC_doc;
				$data['Driving_l_Number']=$data_row_more->Driving_l_Number;
				$data['verify_Driving_l_Number']=$data_row_more->verify_Driving_l_Number;
				$data['Vechical_Number']=$data_row_more->Vechical_Number;
				$data['verify_Vechical']=$data_row_more->verify_Vechical;
				$data['verify_It_Returns']=$data_row_more->verify_It_Returns;
				$data['verify_Udyog_Aadhar']=$data_row_more->verify_Udyog_Aadhar;
				$data['verify_GST_status']=$data_row_more->verify_GST_status;
				$data['verify_Shop_Act']=$data_row_more->verify_Shop_Act;
				$data['verify_Professional_Certificate']=$data_row_more->verify_Professional_Certificate;
				$data['verify_Residence']=$data_row_more->verify_Residence;
				$data['Recidance_Comment']=$data_row_more->Recidance_Comment;
				$data['verify_Employment']=$data_row_more->verify_Employment;
				$data['Employment_Comment']=$data_row_more->Employment_Comment;
				$data['EPFO_Number']=$data_row_more->EPFO_Number;
				$data['verify_EPFO_Number']=$data_row_more->verify_EPFO_Number;
				$data['Account_Number']=$data_row_more->Account_Number;
				$data['verify_Account_Number']=$data_row_more->verify_Account_Number;
				$data['Official_mail']=$data_row_more->Official_mail;
				$data['verify_Official_Mail']=$data_row_more->verify_Official_Mail;
				$data['Pre_employement']=$data_row_more->Pre_employement;
				$data['Past_Employement']=$data_row_more->Past_Employement;
				$data['Edu_background']=$data_row_more->Edu_background;
				$data['Connects']=$data_row_more->Connects;
				$data['Recommendations']=$data_row_more->Recommendations;
				$data['Professional_courses']=$data_row_more->Professional_courses;
				$data['Hobbies']=$data_row_more->Hobbies;
				$data['Skills']=$data_row_more->Skills;
				$data['vacation']=$data_row_more->vacation;
				$data['anti_post']=$data_row_more->anti_post;
				$data['Sale_Deed']=$data_row_more->Sale_Deed;
				$data['Sale_Deed']=$data_row_more->Sale_Deed;
				$data['Land_value']=$data_row_more->Land_value;
				$data['Total_Value']=$data_row_more->Total_Value;
				$data['Construction_value']=$data_row_more->Construction_value;
				$data['Self_occupied']=$data_row_more->Self_occupied;
				$data['Date_of_Agreement']=$data_row_more->Date_of_Agreement;
				$data['LTV']=$data_row_more->LTV;
				$data['LTV_new']=$data_row_more->LTV_new;
				$data['Legal_report']=$data_row_more->Legal_report;
				//$data['row_more'] = $data_row_more;
				$data['coapplicants']=$data_coapplicant;
				$data['appliedloan']=$data_appliedloan;
				$data['no_of_coapplicant']=$data_coapplicant_no;
				$data['income_details']=$data_incomedetails;
				$data['data_address']=$data_address;
				$data['data_credit_score']=$data_credit_score;
				$data['total_obligation']=$total_obligation;
				$data['data_obligations']=$data_obligations;
				$data['credit_score_response']=$credit_score_response;
				$data['address_flag']=$address_flag;
				$data['data_credit_analysis']=$data_credit_analysis;
				$data['coapp_credit_score']=$coapp_credit_score;
				$data['coapp_data_credit_analysis_array']=$coapp_data_credit_analysis_array;
				$data['coapp_data_credit_score_array']=$coapp_data_credit_score_array;
				$data['coapp_data_obligation_array']=$coapp_data_obligation_array;
				$data['coapp_data_obligations_array']=$coapp_data_obligations_array;
				$data['Agreement_value']=$data_row_more->Agreement_value;
				$data['data_row_pd_table']=$data_row_pd_table;
			//===============================================added by priyanka==============================================
							if(isset($Co_Applicant_obligation_Array_attributes))
							{
								$data['Co_Applicant_obligation_Array_attributes']=$Co_Applicant_obligation_Array_attributes;
							}
							else
							{
							$data['Co_Applicant_obligation_Array_attributes']="";
							}
				
			//==============================================added by priyanka==============================================
				$data['coapp_credit_score_array']=$coapp_credit_score_array;
				$data['coapp_add_flag']=$coapp_add_flag;
				
				$data['coapp_email_flag']=$coapp_email_flag;
		
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
			$mpdf->SetHTMLHeader($this->load->view('Operations_user/header',[],true));
			
			$mpdf->SetDisplayMode('fullwidth');
			$mpdf->debug = true;
			$mpdf->AddPage('P');
			$stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
			$stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));

			
			$mpdf->WriteHTML($stylesheet,1);
			$mpdf->list_indent_first_level = 0;
			$html = $this->load->view('Operations_user/POST_CAM',$data,true);
			$footer = "<table name='footer' width=\"1000\">
					<tr>
						<td style='font-size: 16px; padding-bottom: 2px;' align=\"right\">[Page : {PAGENO}]</td>
					</tr>
					</table>";
					$mpdf->SetFooter($footer);
			$mpdf->WriteHTML($html);
			//ob_end_clean();
			$mpdf->Output();

			exit();
		}
		/*------------------------------------------------- Addded by papiha on  18_08_2022------------------------------------------------------*/
		public function Legal_completed()
		{
			if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
				redirect(base_url('index.php/login'));
			}else{
				
				$id = $this->input->get('id');
			   
				$filter = $this->input->get('s');
	
				if($filter=='')
				{
					$filter='all';
				}
				$Cust_id=$this->session->set_userdata('Cust_id');
				if($id == '')$id = $this->session->userdata('ID');
				$CPA_ID=$id;
	
				//echo $id;
				//exit();
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
	
	
				$userType = $this->input->get('userType');
				$date = $this->input->get('date');
				$search_name="";
				$userType2 = $this->input->get('userType2');
				if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
	
	
						
				$search_=$this->input->post('filter_name');
				$select_filters=$this->input->post('select_filters');
				 //echo  $select_filters;
				 //exit();
			 
			  
	
		
				$this->load->helper('url');
				$this->load->model('Dsacustomers_model');
				//$customers = $this->Operations_user_model->getCustomers($filter,$date,$search_name);
				//$_SESSION["data_for_excel"] =	$customers;	
				/*foreach($customers as $row){
				
					$find_coapplicants =$this->Operations_user_model->getCustomers_coapplicants($row->UNIQUE_CODE);
					$find_dsa_details=$this->Operations_user_model->get_dsa_details($row->DSA_ID);
					if(isset($find_dsa_details))
					{
						
						$arr['find_dsa_details']= $find_dsa_details;
					 }
					$arr['coapplicants']= $find_coapplicants;
				}*/
				//print_r($find_coapplicants);
				$age = $this->session->userdata('AGE');
				$data['showNav'] = 1;
				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");			
				//$this->load->view('header', $data);
	
				//echo $this->session->userdata('USER_TYPE');
				//$arr['coapplicants']= $find_coapplicants;
				$this->session->set_userdata('User_name',$user_name );
				$arr['user_name'] = $user_name;
				$arr['userType'] = $userType;
				//$arr['customers'] = $customers;
				$arr['CPA_ID'] = $CPA_ID; // added by piyu 19-04-2022
				$arr['userID']=$user_info->UNIQUE_CODE;
			//	$_SESSION["data_for_excel"] =$customers;
				$arr['s'] = $filter;
				$data['row']=$this->Customercrud_model->getProfileData($id);
				$this->load->view('dashboard_header', $data);
					$this->load->view('Operations_user/Legal_completed_PG', $arr);
		
			}
		}
	public function Legal_completed_with_pagination()
	{   

        $filter_by=$this->input->post('filter');

		$id = $this->session->userdata('ID');
		$CPA_ID=$id;
		$encoded = base64_encode($CPA_ID);
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
		$sel=$this->Operations_user_model->getDashboardData_complete_Legal();
		$totalRecords =$sel;
		## Total number of records with filtering
		$sel=$this->Operations_user_model->Get_Customer_Count_Legal_Completed($searchValue);
		$totalRecordwithFilter =$sel;
		## Fetch records
		$sel=$this->Operations_user_model->Get_Customer_With_Page_Legal_Completed($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
		$empRecords = $sel;
		//return $empRecords
		//print_r($empRecords);
		$data = array();
        
		foreach($empRecords as $row){
			//cam/
			//pd
			//edit
			





         

				       
			/*--------------------------------------------------------------*/


			$data[] = array(
			        
					"Application_id"=>$row->Application_id,
					"Cust_name"=>$row->FN.' '.$row->LN,
					"Application_Status"=>$row->Legal_status,	
					"Referred_by"=>'<a href="'.base_url().'index.php/credit_manager_user/Vendors_Legal?x='.base64_encode($row->Application_id).'" class="btn modal_test"><i class="fa fa-eye" aria-hidden="true" style="color:blue"></i></a>',		
					
				);
				
		}
		//print_r($data);
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		echo json_encode($response);
	}
	public function Legal_incompleted_with_pagination()
	{   

        $filter_by=$this->input->post('filter');

		$id = $this->session->userdata('ID');
		$CPA_ID=$id;
		$encoded = base64_encode($CPA_ID);
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
		$sel=$this->Operations_user_model->getDashboardData_incomplete_Legal();
		$totalRecords =$sel;
		## Total number of records with filtering
		$sel=$this->Operations_user_model->Get_Customer_Count_Legal_InCompleted($searchValue);
		$totalRecordwithFilter =$sel;
		## Fetch records
		$sel=$this->Operations_user_model->Get_Customer_With_Page_Legal_InCompleted($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
		$empRecords = $sel;
		//return $empRecords
		//print_r($empRecords);
		$data = array();
        
		foreach($empRecords as $row){
			//cam/
			//pd
			//edit
			





         

				       
			/*--------------------------------------------------------------*/


			$data[] = array(
			        
					"Application_id"=>$row->Application_id,
					"Cust_name"=>$row->FN.' '.$row->LN,
					"Application_Status"=>$row->Legal_status,	
					"Referred_by"=>'<a href="'.base_url().'index.php/credit_manager_user/Vendors_Legal?x='.base64_encode($row->Application_id).'" class="btn modal_test"><i class="fa fa-eye" aria-hidden="true" style="color:blue"></i></a>',		
					
				);
				
		}
		//print_r($data);
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		echo json_encode($response);
	}
	public function Legal_incompleted()
	{
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
			redirect(base_url('index.php/login'));
		}else{
			
			$id = $this->input->get('id');
		   
			$filter = $this->input->get('s');

			if($filter=='')
			{
				$filter='all';
			}
			$Cust_id=$this->session->set_userdata('Cust_id');
			if($id == '')$id = $this->session->userdata('ID');
			$CPA_ID=$id;

			//echo $id;
			//exit();
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


			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$search_name="";
			$userType2 = $this->input->get('userType2');
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");


					
			$search_=$this->input->post('filter_name');
			$select_filters=$this->input->post('select_filters');
			 //echo  $select_filters;
			 //exit();
		 
		  

	
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			//$customers = $this->Operations_user_model->getCustomers($filter,$date,$search_name);
			//$_SESSION["data_for_excel"] =	$customers;	
			/*foreach($customers as $row){
			
				$find_coapplicants =$this->Operations_user_model->getCustomers_coapplicants($row->UNIQUE_CODE);
				$find_dsa_details=$this->Operations_user_model->get_dsa_details($row->DSA_ID);
				if(isset($find_dsa_details))
				{
					
					$arr['find_dsa_details']= $find_dsa_details;
				 }
				$arr['coapplicants']= $find_coapplicants;
			}*/
			//print_r($find_coapplicants);
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			//$this->load->view('header', $data);

			//echo $this->session->userdata('USER_TYPE');
			//$arr['coapplicants']= $find_coapplicants;
			$this->session->set_userdata('User_name',$user_name );
			$arr['user_name'] = $user_name;
			$arr['userType'] = $userType;
			//$arr['customers'] = $customers;
			$arr['CPA_ID'] = $CPA_ID; // added by piyu 19-04-2022
			$arr['userID']=$user_info->UNIQUE_CODE;
		//	$_SESSION["data_for_excel"] =$customers;
			$arr['s'] = $filter;
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$this->load->view('dashboard_header', $data);
			$this->load->view('Operations_user/Legal_incompleted_PG', $arr);
	
		}
	}
    public function Technical_completed()
		{
			if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
				redirect(base_url('index.php/login'));
			}else{
				
				$id = $this->input->get('id');
			   
				$filter = $this->input->get('s');
	
				if($filter=='')
				{
					$filter='all';
				}
				$Cust_id=$this->session->set_userdata('Cust_id');
				if($id == '')$id = $this->session->userdata('ID');
				$CPA_ID=$id;
	
				//echo $id;
				//exit();
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
	
	
				$userType = $this->input->get('userType');
				$date = $this->input->get('date');
				$search_name="";
				$userType2 = $this->input->get('userType2');
				if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
	
	
						
				$search_=$this->input->post('filter_name');
				$select_filters=$this->input->post('select_filters');
				 //echo  $select_filters;
				 //exit();
			 
			  
	
		
				$this->load->helper('url');
				$this->load->model('Dsacustomers_model');
				//$customers = $this->Operations_user_model->getCustomers($filter,$date,$search_name);
				//$_SESSION["data_for_excel"] =	$customers;	
				/*foreach($customers as $row){
				
					$find_coapplicants =$this->Operations_user_model->getCustomers_coapplicants($row->UNIQUE_CODE);
					$find_dsa_details=$this->Operations_user_model->get_dsa_details($row->DSA_ID);
					if(isset($find_dsa_details))
					{
						
						$arr['find_dsa_details']= $find_dsa_details;
					 }
					$arr['coapplicants']= $find_coapplicants;
				}*/
				//print_r($find_coapplicants);
				$age = $this->session->userdata('AGE');
				$data['showNav'] = 1;
				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");			
				//$this->load->view('header', $data);
	
				//echo $this->session->userdata('USER_TYPE');
				//$arr['coapplicants']= $find_coapplicants;
				$this->session->set_userdata('User_name',$user_name );
				$arr['user_name'] = $user_name;
				$arr['userType'] = $userType;
				//$arr['customers'] = $customers;
				$arr['CPA_ID'] = $CPA_ID; // added by piyu 19-04-2022
				$arr['userID']=$user_info->UNIQUE_CODE;
			//	$_SESSION["data_for_excel"] =$customers;
				$arr['s'] = $filter;
				$data['row']=$this->Customercrud_model->getProfileData($id);
				$this->load->view('dashboard_header', $data);
					$this->load->view('Operations_user/Technical_completed_PG', $arr);
		
			}
		}
		public function Technical_completed_with_pagination()
		{
			$filter_by=$this->input->post('filter');

			$id = $this->session->userdata('ID');
			$CPA_ID=$id;
			$encoded = base64_encode($CPA_ID);
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
			$sel=$this->Operations_user_model->getDashboardData_complete_Tech();
			$totalRecords =$sel;
			## Total number of records with filtering
			$sel=$this->Operations_user_model->Get_Customer_Count_Technical_Completed($searchValue);
			$totalRecordwithFilter =$sel;
			## Fetch records
			$sel=$this->Operations_user_model->Get_Customer_With_Page_Technical_Completed($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
			$empRecords = $sel;
			//return $empRecords
			//print_r($empRecords);
			$data = array();
			
			foreach($empRecords as $row){
				//cam/
				//pd
				//edit
				
	
	
	
	
	
			 
	
						   
				/*--------------------------------------------------------------*/
	
	
				$data[] = array(
						
						"Application_id"=>$row->Application_id,
						"Cust_name"=>$row->FN.' '.$row->LN,
						"Application_Status"=>$row->Technical_status,	
						"Referred_by"=>'<a href="'.base_url().'index.php/credit_manager_user/Vendors_Technical?x='.base64_encode($row->Application_id).'" class="btn modal_test"><i class="fa fa-eye" aria-hidden="true" style="color:blue"></i></a>',		
						
					);
					
			}
			//print_r($data);
			$response = array(
				"draw" => intval($draw),
				"iTotalRecords" => $totalRecords,
				"iTotalDisplayRecords" => $totalRecordwithFilter,
				"aaData" => $data
			);
	
			echo json_encode($response);
		}
		public function Technical_incompleted()
		{
			if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
				redirect(base_url('index.php/login'));
			}else{
				
				$id = $this->input->get('id');
			   
				$filter = $this->input->get('s');
	
				if($filter=='')
				{
					$filter='all';
				}
				$Cust_id=$this->session->set_userdata('Cust_id');
				if($id == '')$id = $this->session->userdata('ID');
				$CPA_ID=$id;
	
				//echo $id;
				//exit();
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
	
	
				$userType = $this->input->get('userType');
				$date = $this->input->get('date');
				$search_name="";
				$userType2 = $this->input->get('userType2');
				if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
	
	
						
				$search_=$this->input->post('filter_name');
				$select_filters=$this->input->post('select_filters');
				 //echo  $select_filters;
				 //exit();
			 
			  
	
		
				$this->load->helper('url');
				$this->load->model('Dsacustomers_model');
				//$customers = $this->Operations_user_model->getCustomers($filter,$date,$search_name);
				//$_SESSION["data_for_excel"] =	$customers;	
				/*foreach($customers as $row){
				
					$find_coapplicants =$this->Operations_user_model->getCustomers_coapplicants($row->UNIQUE_CODE);
					$find_dsa_details=$this->Operations_user_model->get_dsa_details($row->DSA_ID);
					if(isset($find_dsa_details))
					{
						
						$arr['find_dsa_details']= $find_dsa_details;
					 }
					$arr['coapplicants']= $find_coapplicants;
				}*/
				//print_r($find_coapplicants);
				$age = $this->session->userdata('AGE');
				$data['showNav'] = 1;
				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");			
				//$this->load->view('header', $data);
	
				//echo $this->session->userdata('USER_TYPE');
				//$arr['coapplicants']= $find_coapplicants;
				$this->session->set_userdata('User_name',$user_name );
				$arr['user_name'] = $user_name;
				$arr['userType'] = $userType;
				//$arr['customers'] = $customers;
				$arr['CPA_ID'] = $CPA_ID; // added by piyu 19-04-2022
				$arr['userID']=$user_info->UNIQUE_CODE;
			//	$_SESSION["data_for_excel"] =$customers;
				$arr['s'] = $filter;
				$data['row']=$this->Customercrud_model->getProfileData($id);
				$this->load->view('dashboard_header', $data);
				$this->load->view('Operations_user/Technical_incompleted_PG', $arr);
		
			}
		}
		public function Technical_incompleted_with_pagination()
		{
			$filter_by=$this->input->post('filter');

			$id = $this->session->userdata('ID');
			$CPA_ID=$id;
			$encoded = base64_encode($CPA_ID);
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
			$sel=$this->Operations_user_model->getDashboardData_incomplete_Tech();
			$totalRecords =$sel;
			## Total number of records with filtering
			$sel=$this->Operations_user_model->Get_Customer_Count_Technical_InCompleted($searchValue);
			$totalRecordwithFilter =$sel;
			## Fetch records
			$sel=$this->Operations_user_model->Get_Customer_With_Page_Technical_InCompleted($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
			$empRecords = $sel;
			//return $empRecords
			//print_r($empRecords);
			$data = array();
			
			foreach($empRecords as $row){
				//cam/
				//pd
				//edit
				
	
	
	
	
	
			 
	
						   
				/*--------------------------------------------------------------*/
	
	
				$data[] = array(
						
						"Application_id"=>$row->Application_id,
						"Cust_name"=>$row->FN.' '.$row->LN,
						"Application_Status"=>$row->Technical_status,	
						"Referred_by"=>'<a href="'.base_url().'index.php/credit_manager_user/Vendors_Technical?x='.base64_encode($row->Application_id).'" class="btn modal_test"><i class="fa fa-eye" aria-hidden="true" style="color:blue"></i></a>',		
						
					);
					
			}
			//print_r($data);
			$response = array(
				"draw" => intval($draw),
				"iTotalRecords" => $totalRecords,
				"iTotalDisplayRecords" => $totalRecordwithFilter,
				"aaData" => $data
			);
	
			echo json_encode($response);
		}
	/*------------------------------------------------ Addded by papiha on 18_08_2022 For FI Complete------------------------------*/
	public function FI_completed()
	{
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
			redirect(base_url('index.php/login'));
		}else{
			
			$id = $this->input->get('id');
		   
			$filter = $this->input->get('s');

			if($filter=='')
			{
				$filter='all';
			}
			$Cust_id=$this->session->set_userdata('Cust_id');
			if($id == '')$id = $this->session->userdata('ID');
			$CPA_ID=$id;

			//echo $id;
			//exit();
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


			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$search_name="";
			$userType2 = $this->input->get('userType2');
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");


					
			$search_=$this->input->post('filter_name');
			$select_filters=$this->input->post('select_filters');
			 //echo  $select_filters;
			 //exit();
		 
		  

	
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			//$customers = $this->Operations_user_model->getCustomers($filter,$date,$search_name);
			//$_SESSION["data_for_excel"] =	$customers;	
			/*foreach($customers as $row){
			
				$find_coapplicants =$this->Operations_user_model->getCustomers_coapplicants($row->UNIQUE_CODE);
				$find_dsa_details=$this->Operations_user_model->get_dsa_details($row->DSA_ID);
				if(isset($find_dsa_details))
				{
					
					$arr['find_dsa_details']= $find_dsa_details;
				 }
				$arr['coapplicants']= $find_coapplicants;
			}*/
			//print_r($find_coapplicants);
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			//$this->load->view('header', $data);

			//echo $this->session->userdata('USER_TYPE');
			//$arr['coapplicants']= $find_coapplicants;
			$this->session->set_userdata('User_name',$user_name );
			$arr['user_name'] = $user_name;
			$arr['userType'] = $userType;
			//$arr['customers'] = $customers;
			$arr['CPA_ID'] = $CPA_ID; // added by piyu 19-04-2022
			$arr['userID']=$user_info->UNIQUE_CODE;
		//	$_SESSION["data_for_excel"] =$customers;
			$arr['s'] = $filter;
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$this->load->view('dashboard_header', $data);
				$this->load->view('Operations_user/FI_completed_PG', $arr);
	
		}
	}
	public function FI_completed_with_pagination()
	{
		$filter_by=$this->input->post('filter');

		$id = $this->session->userdata('ID');
		$CPA_ID=$id;
		$encoded = base64_encode($CPA_ID);
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
		$sel=$this->Operations_user_model->getDashboardData_complete_FI();
		$totalRecords =$sel;
		## Total number of records with filtering
		$sel=$this->Operations_user_model->Get_Customer_Count_FI_Completed($searchValue);
		$totalRecordwithFilter =$sel;
		## Fetch records
		$sel=$this->Operations_user_model->Get_Customer_With_Page_FI_Completed($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
		$empRecords = $sel;
		//return $empRecords
		//print_r($empRecords);
		$data = array();
		
		foreach($empRecords as $row){
			//cam/
			//pd
			//edit
			





		 

					   
			/*--------------------------------------------------------------*/


			$data[] = array(
					
					"Application_id"=>$row->Application_id,
					"Cust_name"=>$row->FN.' '.$row->LN,
					"Application_Status"=>$row->fi_status,	
					"Referred_by"=>'<a href="'.base_url().'index.php/credit_manager_user/Vendors?x='.base64_encode($row->Application_id).'" class="btn modal_test"><i class="fa fa-eye" aria-hidden="true" style="color:blue"></i></a>',		
					
				);
				
		}
		//print_r($data);
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		echo json_encode($response);
	}
	/*------------------------------------------------ Addded by papiha on 18_08_2022 For FI InComplete------------------------------*/
	public function FI_Incompleted()
	{
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
			redirect(base_url('index.php/login'));
		}else{
			
			$id = $this->input->get('id');
		   
			$filter = $this->input->get('s');

			if($filter=='')
			{
				$filter='all';
			}
			$Cust_id=$this->session->set_userdata('Cust_id');
			if($id == '')$id = $this->session->userdata('ID');
			$CPA_ID=$id;

			//echo $id;
			//exit();
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


			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$search_name="";
			$userType2 = $this->input->get('userType2');
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");


					
			$search_=$this->input->post('filter_name');
			$select_filters=$this->input->post('select_filters');
			 //echo  $select_filters;
			 //exit();
		 
		  

	
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			//$customers = $this->Operations_user_model->getCustomers($filter,$date,$search_name);
			//$_SESSION["data_for_excel"] =	$customers;	
			/*foreach($customers as $row){
			
				$find_coapplicants =$this->Operations_user_model->getCustomers_coapplicants($row->UNIQUE_CODE);
				$find_dsa_details=$this->Operations_user_model->get_dsa_details($row->DSA_ID);
				if(isset($find_dsa_details))
				{
					
					$arr['find_dsa_details']= $find_dsa_details;
				 }
				$arr['coapplicants']= $find_coapplicants;
			}*/
			//print_r($find_coapplicants);
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			//$this->load->view('header', $data);

			//echo $this->session->userdata('USER_TYPE');
			//$arr['coapplicants']= $find_coapplicants;
			$this->session->set_userdata('User_name',$user_name );
			$arr['user_name'] = $user_name;
			$arr['userType'] = $userType;
			//$arr['customers'] = $customers;
			$arr['CPA_ID'] = $CPA_ID; // added by piyu 19-04-2022
			$arr['userID']=$user_info->UNIQUE_CODE;
		//	$_SESSION["data_for_excel"] =$customers;
			$arr['s'] = $filter;
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$this->load->view('dashboard_header', $data);
			$this->load->view('Operations_user/FI_incompleted_PG', $arr);
	
		}
	}
	public function FI_incompleted_with_pagination()
	{
		$filter_by=$this->input->post('filter');

		$id = $this->session->userdata('ID');
		$CPA_ID=$id;
		$encoded = base64_encode($CPA_ID);
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
		$sel=$this->Operations_user_model->getDashboardData_incomplete_FI();
		$totalRecords =$sel;
		## Total number of records with filtering
		$sel=$this->Operations_user_model->Get_Customer_Count_FI_InCompleted($searchValue);
		$totalRecordwithFilter =$sel;
		## Fetch records
		$sel=$this->Operations_user_model->Get_Customer_With_Page_FI_InCompleted($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
		$empRecords = $sel;
		//return $empRecords
		//print_r($empRecords);
		$data = array();
		
		foreach($empRecords as $row){
			//cam/
			//pd
			//edit
			





		 

					   
			/*--------------------------------------------------------------*/


			$data[] = array(
					
					"Application_id"=>$row->Application_id,
					"Cust_name"=>$row->FN.' '.$row->LN,
					"Application_Status"=>$row->fi_status,	
					"Referred_by"=>'<a href="'.base_url().'index.php/credit_manager_user/Vendors?x='.base64_encode($row->Application_id).'" class="btn modal_test"><i class="fa fa-eye" aria-hidden="true" style="color:blue"></i></a>',		
					
				);
				
		}
		//print_r($data);
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		echo json_encode($response);
	}
	/*------------------------------------------------ Addded by papiha on 18_08_2022 For RCU Complete------------------------------*/
	public function RCU_completed()
	{
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
			redirect(base_url('index.php/login'));
		}else{
			
			$id = $this->input->get('id');
		   
			$filter = $this->input->get('s');

			if($filter=='')
			{
				$filter='all';
			}
			$Cust_id=$this->session->set_userdata('Cust_id');
			if($id == '')$id = $this->session->userdata('ID');
			$CPA_ID=$id;

			//echo $id;
			//exit();
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


			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$search_name="";
			$userType2 = $this->input->get('userType2');
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");


					
			$search_=$this->input->post('filter_name');
			$select_filters=$this->input->post('select_filters');
			 //echo  $select_filters;
			 //exit();
		 
		  

	
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			//$customers = $this->Operations_user_model->getCustomers($filter,$date,$search_name);
			//$_SESSION["data_for_excel"] =	$customers;	
			/*foreach($customers as $row){
			
				$find_coapplicants =$this->Operations_user_model->getCustomers_coapplicants($row->UNIQUE_CODE);
				$find_dsa_details=$this->Operations_user_model->get_dsa_details($row->DSA_ID);
				if(isset($find_dsa_details))
				{
					
					$arr['find_dsa_details']= $find_dsa_details;
				 }
				$arr['coapplicants']= $find_coapplicants;
			}*/
			//print_r($find_coapplicants);
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			//$this->load->view('header', $data);

			//echo $this->session->userdata('USER_TYPE');
			//$arr['coapplicants']= $find_coapplicants;
			$this->session->set_userdata('User_name',$user_name );
			$arr['user_name'] = $user_name;
			$arr['userType'] = $userType;
			//$arr['customers'] = $customers;
			$arr['CPA_ID'] = $CPA_ID; // added by piyu 19-04-2022
			$arr['userID']=$user_info->UNIQUE_CODE;
		//	$_SESSION["data_for_excel"] =$customers;
			$arr['s'] = $filter;
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$this->load->view('dashboard_header', $data);
				$this->load->view('Operations_user/RCU_completed_PG', $arr);
	
		}
	}
	public function RCU_completed_with_pagination()
	{
		$filter_by=$this->input->post('filter');

		$id = $this->session->userdata('ID');
		$CPA_ID=$id;
		$encoded = base64_encode($CPA_ID);
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
		$sel=$this->Operations_user_model->getDashboardData_complete_RCU();
		$totalRecords =$sel;
		## Total number of records with filtering
		$sel=$this->Operations_user_model->Get_Customer_Count_RCU_Completed($searchValue);
		$totalRecordwithFilter =$sel;
		## Fetch records
		$sel=$this->Operations_user_model->Get_Customer_With_Page_RCU_Completed($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
		$empRecords = $sel;
		//return $empRecords
		//print_r($empRecords);
		$data = array();
		
		foreach($empRecords as $row){
			//cam/
			//pd
			//edit
			





		 

					   
			/*--------------------------------------------------------------*/


			$data[] = array(
					
					"Application_id"=>$row->Application_id,
					"Cust_name"=>$row->FN.' '.$row->LN,
					"Application_Status"=>$row->RCU_status,	
					"Referred_by"=>'<a href="'.base_url().'index.php/credit_manager_user/Vendors_RCU?x='.base64_encode($row->Application_id).'" class="btn modal_test"><i class="fa fa-eye" aria-hidden="true" style="color:blue"></i></a>',		
					
				);
				
		}
		//print_r($data);
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		echo json_encode($response);
	}
	/*------------------------------------------------ Addded by papiha on 18_08_2022 For RCU InComplete------------------------------*/
	public function RCU_Incompleted()
	{
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
			redirect(base_url('index.php/login'));
		}else{
			
			$id = $this->input->get('id');
		   
			$filter = $this->input->get('s');

			if($filter=='')
			{
				$filter='all';
			}
			$Cust_id=$this->session->set_userdata('Cust_id');
			if($id == '')$id = $this->session->userdata('ID');
			$CPA_ID=$id;

			//echo $id;
			//exit();
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


			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$search_name="";
			$userType2 = $this->input->get('userType2');
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");


					
			$search_=$this->input->post('filter_name');
			$select_filters=$this->input->post('select_filters');
			 //echo  $select_filters;
			 //exit();
		 
		  

	
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			//$customers = $this->Operations_user_model->getCustomers($filter,$date,$search_name);
			//$_SESSION["data_for_excel"] =	$customers;	
			/*foreach($customers as $row){
			
				$find_coapplicants =$this->Operations_user_model->getCustomers_coapplicants($row->UNIQUE_CODE);
				$find_dsa_details=$this->Operations_user_model->get_dsa_details($row->DSA_ID);
				if(isset($find_dsa_details))
				{
					
					$arr['find_dsa_details']= $find_dsa_details;
				 }
				$arr['coapplicants']= $find_coapplicants;
			}*/
			//print_r($find_coapplicants);
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			//$this->load->view('header', $data);

			//echo $this->session->userdata('USER_TYPE');
			//$arr['coapplicants']= $find_coapplicants;
			$this->session->set_userdata('User_name',$user_name );
			$arr['user_name'] = $user_name;
			$arr['userType'] = $userType;
			//$arr['customers'] = $customers;
			$arr['CPA_ID'] = $CPA_ID; // added by piyu 19-04-2022
			$arr['userID']=$user_info->UNIQUE_CODE;
		//	$_SESSION["data_for_excel"] =$customers;
			$arr['s'] = $filter;
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$this->load->view('Operations_user/RCU_incompleted_PG', $arr);
	
		}
	}
	public function RCU_incompleted_with_pagination()
	{
		$filter_by=$this->input->post('filter');

		$id = $this->session->userdata('ID');
		$CPA_ID=$id;
		$encoded = base64_encode($CPA_ID);
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
		$sel=$this->Operations_user_model->getDashboardData_incomplete_RCU();
		$totalRecords =$sel;
		## Total number of records with filtering
		$sel=$this->Operations_user_model->Get_Customer_Count_RCU_InCompleted($searchValue);
		$totalRecordwithFilter =$sel;
		## Fetch records
		$sel=$this->Operations_user_model->Get_Customer_With_Page_RCU_InCompleted($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
		$empRecords = $sel;
		//return $empRecords
		//print_r($empRecords);
		$data = array();
		
		foreach($empRecords as $row){
			//cam/
			//pd
			//edit
			





		 

					   
			/*--------------------------------------------------------------*/


			$data[] = array(
					
					"Application_id"=>$row->Application_id,
					"Cust_name"=>$row->FN.' '.$row->LN,
					"Application_Status"=>$row->RCU_status,	
					"Referred_by"=>'<a href="'.base_url().'index.php/credit_manager_user/Vendors_RCU?x='.base64_encode($row->Application_id).'" class="btn modal_test"><i class="fa fa-eye" aria-hidden="true" style="color:blue"></i></a>',		
					
				);
				
		}
		//print_r($data);
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		echo json_encode($response);
	}
}
?>