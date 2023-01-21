<?php
date_default_timezone_set('asia/kolkata');
defined('BASEPATH') OR exit('No direct script access allowed');

class Credit_manager_user extends CI_Controller {

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
		//echo $this->session->userdata("USER_TYPE");
		//exit();
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
			$dashboard_data = $this->credit_manager_user_model->getDashboardData();  
				$data['row']=$this->Customercrud_model->getProfileData($id);
			$data['dashboard_data'] = $dashboard_data;
			$getDashboardData_4=$this->Operations_user_model->getDashboardData_incomplete_Legal();
			$getDashboardData_5=$this->Operations_user_model->getDashboardData_complete_Legal();
			$getDashboardData_6=$this->Operations_user_model->getDashboardData_incomplete_Tech();
			$getDashboardData_7=$this->Operations_user_model->getDashboardData_complete_Tech();
			$getDashboardData_8=$this->Operations_user_model->getDashboardData_complete_FI();
			$getDashboardData_9=$this->Operations_user_model->getDashboardData_complete_RCU();
			$getDashboardData_10=$this->Operations_user_model->getDashboardData_incomplete_FI();
			$getDashboardData_11=$this->Operations_user_model->getDashboardData_incomplete_RCU();
			$data['dashboard_data_4'] = $getDashboardData_4;
			$data['getDashboardData_5'] = $getDashboardData_5;
			$data['getDashboardData_6'] = $getDashboardData_6;
			$data['getDashboardData_7'] = $getDashboardData_7;
			$data['getDashboardData_8']=$getDashboardData_8;
			$data['getDashboardData_9']=$getDashboardData_9;
			$data['getDashboardData_10']=$getDashboardData_10;
			$data['getDashboardData_11']=$getDashboardData_11;
			$this->load->view('dashboard_header', $data);
			$this->load->view('credit_manager_user/Dashboard', $data);
			//$this->load->view('footer');
			}
		}
	}
	public function customers(){
		//echo $this->session->userdata("USER_TYPE");
		//exit();
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER'){
            redirect(base_url('index.php/login'));
        }else{
        	$id = $this->input->get('id');
			$Cust_id=$this->session->set_userdata('Cust_id');
			if($id == '')
			$id = $this->session->userdata('ID');

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
			 $data_row = $this->credit_manager_user_model->getProfileData($id);
			
			//$customers = $this->credit_manager_user_model->getCustomers($filter,$date);
			
			//$_SESSION["data_for_excel"] =  $customers ;
			$_SESSION["file_name"] =  'Customer List' ;
			$age = $this->session->userdata('AGE');
			$arr['data_row']=$data_row;
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			//$this->load->view('header', $data);

			//echo $this->session->userdata('USER_TYPE');
			$arr['userType'] = $userType;
			//$arr['customers'] = $customers;
			$arr['s'] = $filter;
			$data['row']=$this->Customercrud_model->getProfileData($id);
		    $this->load->view('dashboard_header', $data);
			//if($this->session->userdata('USER_TYPE') =='credit_manager_user')$this->load->view('credit_manager_user/customers_new', $arr);
			if($this->session->userdata('USER_TYPE') =='credit_manager_user' || $this->session->userdata('USER_TYPE') == 'Cluster_credit_manager')$this->load->view('credit_manager_user/customers_new_PG', $arr);

			else if($this->session->userdata('USER_TYPE') == 'DSA')$this->load->view('dsa/customers_new', $arr);
			else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER')$this->load->view('manager/customers_new', $arr);
			else if($this->session->userdata('USER_TYPE') == 'DSA_CSR')$this->load->view('csr/customers_new', $arr);
		
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
			if ($id == '') {
				$id = $this->session->userdata("ID");
			}
			$this->session->set_userdata('Cust_id',$id );
		    $data_row = $this->credit_manager_user_model->getProfileData($id);
			$dsa_id=$data_row->DSA_ID;
			$dsa_info= $this->Dsacrud_model->getProfileData($dsa_id);
			if($dsa_info->MN!='')
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
			else
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
			
			$data_row_more = $this->credit_manager_user_model->getProfileDataMore($id);	
			
			$data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($id);
			
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->credit_manager_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->credit_manager_user_model->getCoapplicantById($id);
			}
			else
			{
				$data_coapplicant_no=0;
				$data_coapplicant=array();
			}
			
			
			$data_incomedetails=$this->credit_manager_user_model->getIncomedetails($id);
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
			$data['coapplicants']=$data_coapplicant;
			$data['appliedloan']=$data_appliedloan;
			$data['no_of_coapplicant']=$data_coapplicant_no;
			$data['income_details']=$data_incomedetails;
			$data['dsa_name']=$dsa_name;
			$this->load->view('header', $data);
			$this->load->view('credit_manager_user/CAM_Applicant_Details');	
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
			$this->session->set_userdata('Cust_id',$id );
			$data_row = $this->credit_manager_user_model->getProfileData($id);
			$data_row_more = $this->credit_manager_user_model->getProfileDataMore($id);	
			
			$data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($id);
			
			
			
			
			$data_incomedetails=$this->credit_manager_user_model->getIncomedetails($id);
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
			
			$data['appliedloan']=$data_appliedloan;
			
			$data['income_details']=$data_incomedetails;
			$this->load->view('header', $data);
			$this->load->view('credit_manager_user/Other_attributes');	
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
			$this->session->set_userdata('Cust_id',$id );
			$data_row = $this->credit_manager_user_model->getProfileData($id);
			$data_row_more = $this->credit_manager_user_model->getProfileDataMore($id);	
			
			$data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($id);
			
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->credit_manager_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->credit_manager_user_model->getCoapplicantById($id);
			}
			else
			{
				$data_coapplicant_no=0;
				$data_coapplicant=array();
			}
			
			
			$data_incomedetails=$this->credit_manager_user_model->getIncomedetails($id);
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
			$data['coapplicants']=$data_coapplicant;
			$data['appliedloan']=$data_appliedloan;
			$data['no_of_coapplicant']=$data_coapplicant_no;
			$data['income_details']=$data_incomedetails;
			$this->load->view('header', $data);
			$this->load->view('credit_manager_user/edit_Other_attributes');	
		}
	}
	
	public function update_Other_attributes()
	
	{
		
		$id = $this->session->userdata("Cust_id");
		
		
		
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
			   redirect('credit_manager_user/Other_attributes');
				
			}
			else
			{
				 $this->session->set_flashdata('error','error');
			     redirect('credit_manager_user/Other_attributes');
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
			'Legal_report'=>$this->input->post('Legal_report')
			);
			//$updated_array= $this->Customercrud_model->update_profile($id, $array_input);
			$updated_array_input_more=$this->Customercrud_model->update_profile_more($id, $array_input_more);
			if($updated_array_input_more > 0)
			{
			   $this->session->set_flashdata('success','success');
			   redirect('credit_manager_user/collateral');
				
			}
			else
			{
				 $this->session->set_flashdata('error','error');
			     redirect('credit_manager_user/collateral');
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
			$this->session->set_userdata('Cust_id',$id );
			$data_row = $this->credit_manager_user_model->getProfileData($id);
			$data_row_more = $this->credit_manager_user_model->getProfileDataMore($id);	
			
			$data_credit_analysis=$this->credit_manager_user_model->getcreditData($id);
			$data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($id);
			
			
			
			
			$data_incomedetails=$this->credit_manager_user_model->getIncomedetails($id);
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
			$data['data_credit_analysis']=$data_credit_analysis;
			$data['appliedloan']=$data_appliedloan;
			
			$data['income_details']=$data_incomedetails;
			$this->load->view('header', $data);
			$this->load->view('credit_manager_user/collateral');	
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
			$this->session->set_userdata('Cust_id',$id );
			$data_row = $this->credit_manager_user_model->getProfileData($id);
			$data_row_more = $this->credit_manager_user_model->getProfileDataMore($id);	
			
			$data_credit_analysis=$this->credit_manager_user_model->getcreditData($id);
			$data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($id);
			
			
			
			
			$data_incomedetails=$this->credit_manager_user_model->getIncomedetails($id);
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
			$data['data_credit_analysis']=$data_credit_analysis;
			$data['appliedloan']=$data_appliedloan;
			
			$data['income_details']=$data_incomedetails;
			$this->load->view('header', $data);
			$this->load->view('credit_manager_user/edit_collateral');	
		}
	}
	public function customer_edit_profile_2()
	{
		
		$id = $this->session->userdata("Cust_id");
		$data_row = $this->credit_manager_user_model->getProfileData($id);
		$data_row_more = $this->credit_manager_user_model->getProfileDataMore($id);
		$data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($id);
		$data_incomedetails=$this->credit_manager_user_model->getIncomedetails($id);
        if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->credit_manager_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->credit_manager_user_model->getCoapplicantById($id);
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
		if($saved_doc_row->doc_count==$main_doc_row->doc_count){
			$age = 1;
		}else $age = 0;
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
		$this->load->view('credit_manager_user/customer_update_profile_2');
	}
	public function customer_flow_update_s_one()
	{
		$id = $this->session->userdata("Cust_id");
		$data_coapplicant_no=$this->credit_manager_user_model->getCoapplicantNo($id);
		
		
		for ($i =1; $i<=$data_coapplicant_no; $i++) 
		{
		  $name=$this->input->post('f_name_'.$i);
			$COAPP_ID=$this->input->post('COAPP_ID_'.$i);
			
		$u_unique_code = $this->input->post('COAPP_ID_'.$i);
		$dob = $this->input->post('dob_'.$i);		
		$diff = abs(strtotime(date("Y-m-d")) - strtotime($dob));
		$years = floor($diff / (365*60*60*24));
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
			'Vechical_NO_available'=>$this->input->post('Vechical_NO_available_'.$i),
			'Vechical_Number'=>$this->input->post('vechical_no_'.$i),
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
			'MARTIAL_STATUS' => $this->input->post('marital')
			);
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
			'Vechical_Number'=>$this->input->post('vechical_no'),
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
			'Locality_type'=>$this->input->post('Locality_type')
			);
			$updated_array= $this->Customercrud_model->update_profile($id, $array_input);
			$updated_array_input_more=$this->Customercrud_model->update_profile_more($id, $array_input_more);
			if($updated_array > 0)
			{
			   $this->session->set_flashdata('success','success');
			   redirect('credit_manager_user/Document_verification');
				
			}
			else
			{
				 $this->session->set_flashdata('error','error');
			     redirect('credit_manager_user/CAM_Applicant_Details');
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
			$data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($id);
			$data_row = $this->credit_manager_user_model->getProfileData($id);
			$data_row_more = $this->credit_manager_user_model->getProfileDataMore($id);
            $data_doc = $this->Dsacrud_model->getDocument($id);
			$data_coapplicant=$this->credit_manager_user_model->getCoapplicantById($id);
			$data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
			$address=$data_row_more->RES_ADDRS_LINE_1." ".$data_row_more->RES_ADDRS_LINE_2." ".$data_row_more->RES_ADDRS_LINE_3;
			$per_address=$data_row_more->PER_ADDRS_LINE_1." ".$data_row_more->PER_ADDRS_LINE_2." ".$data_row_more->PER_ADDRS_LINE_3;
           
			$data_incomedetails=$this->credit_manager_user_model->getIncomedetails($id);
			if($data_credit_score!='')
			{
				$data_response=$data_credit_score->response;
				$data_address=json_decode($data_response,true);
				$data_emails=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
				$data_add=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
				
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
			}
			if($data_appliedloan->LOAN_TYPE=='home')
				{
					$data_coapplicant_no=$this->credit_manager_user_model->getCoapplicantNo($id);
					$data_coapplicant=$this->credit_manager_user_model->getCoapplicantById($id);
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
							$coapp_data_address=json_decode($data_response,true);
							$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
							$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
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
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row'] = $data_row;
			$data['appliedloan']=$data_appliedloan;
			$data['row_more'] = $data_row_more;
			$data['Doc'] = $data_doc;
			$data['data_incomedetails']=$data_incomedetails;
			$data['coapplicants']=$data_coapplicant;
			$data['address_flag']=$address_flag;
			$data['email_flag']=$email_flag;
			$data['coapplicants']=$data_coapplicant;
			$data['coapp_add_flag']=$coapp_add_flag;
			$data['coapp_email_flag']=$coapp_email_flag;
			$this->load->view('header', $data);
			$this->load->view('credit_manager_user/CAM_Document_details');	
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
			$data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($id);
			$data_row = $this->credit_manager_user_model->getProfileData($id);
			$data_row_more = $this->credit_manager_user_model->getProfileDataMore($id);
            $data_doc = $this->Dsacrud_model->getDocument($id);
			$data_coapplicant=$this->credit_manager_user_model->getCoapplicantById($id);
			$data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
			$address=$data_row_more->RES_ADDRS_LINE_1." ".$data_row_more->RES_ADDRS_LINE_2." ".$data_row_more->RES_ADDRS_LINE_3;
			$per_address=$data_row_more->PER_ADDRS_LINE_1." ".$data_row_more->PER_ADDRS_LINE_2." ".$data_row_more->PER_ADDRS_LINE_3;
           
			$data_incomedetails=$this->credit_manager_user_model->getIncomedetails($id);
			if($data_credit_score!='')
			{
				$data_response=$data_credit_score->response;
				$data_address=json_decode($data_response,true);
				$data_emails=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
				$data_add=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
				
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
			}
			if($data_appliedloan->LOAN_TYPE=='home')
				{
					$data_coapplicant_no=$this->credit_manager_user_model->getCoapplicantNo($id);
					$data_coapplicant=$this->credit_manager_user_model->getCoapplicantById($id);
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
							$coapp_data_address=json_decode($data_response,true);
							$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
							$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
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
			$this->load->view('credit_manager_user/Edit_CAM_Document_details');	
		}
		
	}
	public function Update_Document_verification()
	{
		$id =$this->session->userdata("Cust_id");
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
			
			$data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($id);
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->credit_manager_user_model->getCoapplicantNo($id);
			}
					for ($i =1; $i<=$data_coapplicant_no; $i++) 
				{
				 
				    $COAPP_ID=$this->input->post('COAPP_ID_'.$i);
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
			   redirect('credit_manager_user/Credit_Analysis');
				
			}
			else
			{
				 $this->session->set_flashdata('error','error');
			     redirect('credit_manager_user/Document_verification');
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
				
		   
            $data_row = $this->credit_manager_user_model->getProfileData($id);
			$data_credit_analysis=$this->credit_manager_user_model->getcreditData($id);
			$data_row_more = $this->credit_manager_user_model->getProfileDataMore($id);	
			$data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
			$address=$data_row_more->RES_ADDRS_LINE_1." ".$data_row_more->RES_ADDRS_LINE_2." ".$data_row_more->RES_ADDRS_LINE_3;
			$per_address=$data_row_more->PER_ADDRS_LINE_1." ".$data_row_more->PER_ADDRS_LINE_2." ".$data_row_more->PER_ADDRS_LINE_3;
			$data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($id);
			if($data_credit_score!='')
			{
				$credit_score_response=json_decode($data_credit_score->response,true);
				$data_add=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
				$data_obligations=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
				
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
				$data_coapplicant_no=$this->credit_manager_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->credit_manager_user_model->getCoapplicantById($id);
				$coapp_add_flag=array();
				$coapp_email_flag=array();
				$i=1;
				foreach($data_coapplicant as $coapplicant)
				{
				
					
					 
					$coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
			        $coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
					$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
					
					$coapp_data_credit_analysis=$this->credit_manager_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
					
				
					if(!empty($coapp_data_credit_score))
					{
						$coapp_data_response=$coapp_data_credit_score->response;
					    $coapp_data_address=json_decode($coapp_data_response,true);
				
					$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
					$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
						$coapp_data_response=$coapp_data_credit_score->response;
						$coapp_credit_score=json_decode($coapp_data_response,true);
						$coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
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
							 $coapp_add_flag[$i]=$address_flag;
					         $coapp_email_flag[$i]=$email_flag;
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
			$data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($id);
			
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->credit_manager_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->credit_manager_user_model->getCoapplicantById($id);
			}
			else
			{
				$data_coapplicant_no=0;
				$data_coapplicant=array();
			}
			
			
			$data_incomedetails=$this->credit_manager_user_model->getIncomedetails($id);
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
			$this->load->view('header', $data);
			$this->load->view('credit_manager_user/Credit_Analysis');		
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
				
		   
            $data_row = $this->credit_manager_user_model->getProfileData($id);
			$data_credit_analysis=$this->credit_manager_user_model->getcreditData($id);
			$data_row_more = $this->credit_manager_user_model->getProfileDataMore($id);	
			$data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
			$address=$data_row_more->RES_ADDRS_LINE_1." ".$data_row_more->RES_ADDRS_LINE_2." ".$data_row_more->RES_ADDRS_LINE_3;
			$per_address=$data_row_more->PER_ADDRS_LINE_1." ".$data_row_more->PER_ADDRS_LINE_2." ".$data_row_more->PER_ADDRS_LINE_3;
			$data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($id);
			if($data_credit_score!='')
			{
				$credit_score_response=json_decode($data_credit_score->response,true);
				$data_add=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
				$data_obligations=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
				
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
				$data_coapplicant_no=$this->credit_manager_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->credit_manager_user_model->getCoapplicantById($id);
				$coapp_add_flag=array();
				$coapp_email_flag=array();
				$i=1;
				foreach($data_coapplicant as $coapplicant)
				{
				
					
					 
					$coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
			        $coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
					$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
					
					$coapp_data_credit_analysis=$this->credit_manager_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
					
				
					if(!empty($coapp_data_credit_score))
					{
						$coapp_data_response=$coapp_data_credit_score->response;
					    $coapp_data_address=json_decode($coapp_data_response,true);
				
					$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
					$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
						$coapp_data_response=$coapp_data_credit_score->response;
						$coapp_credit_score=json_decode($coapp_data_response,true);
						$coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
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
							 $coapp_add_flag[$i]=$address_flag;
					         $coapp_email_flag[$i]=$email_flag;
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
			$data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($id);
			
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->credit_manager_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->credit_manager_user_model->getCoapplicantById($id);
			}
			else
			{
				$data_coapplicant_no=0;
				$data_coapplicant=array();
			}
			
			
			$data_incomedetails=$this->credit_manager_user_model->getIncomedetails($id);
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
			$this->load->view('header', $data);
			$this->load->view('credit_manager_user/Edit_Credit_Analysis');		
			}			
	 }
	  public function Update_Credit_Analysis()
	  {
		  
		   $id =$this->session->userdata("Cust_id");
         
		   $data_incomedetails=$this->credit_manager_user_model->getIncomedetails($id);
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
		   $data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($id);
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant=$this->credit_manager_user_model->getCoapplicantById($id);
				
				$data_coapplicant_no=$this->credit_manager_user_model->getCoapplicantNo($id);
			
					for ($i =1; $i<=$data_coapplicant_no; $i++) 
				{
					
				 
				    $COAPP_ID=$this->input->post('COAPP_ID_'.$i);
					
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
						
						
						);
						
						 $array_input = array(
							  'ORG_SALARY_1'=>$this->input->post('gross_salary_1_'.$i),
							  'ORG_SALARY_2'=>$this->input->post('gross_salary_2_'.$i),
							  'ORG_SALARY_3'=>$this->input->post('gross_salary_3_'.$i),
						 );
						 $Result_id = $this->Customercrud_model->update_coapplicant_income($COAPP_ID, $array_input);
				
					$check_id = $this->credit_manager_user_model->check_coapp_cam_profile($COAPP_ID);
					
					if($check_id > 0)$update_id = $this->credit_manager_user_model->update_coapp_cam_credit($COAPP_ID, $coapp_array_input_more);
					else $update_id = $this->credit_manager_user_model->insert_coapp_cam_credit($COAPP_ID, $coapp_array_input_more);
					
				}
			}
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
			'Gross_Total_Income_1'=>$this->input->post('Gross_Total_Income_1'),
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
			
			
			);
			 $array_input = array(
			      'ORG_SALARY_1'=>$this->input->post('gross_salary_1'),
				  'ORG_SALARY_2'=>$this->input->post('gross_salary_2'),
				  'ORG_SALARY_3'=>$this->input->post('gross_salary_3'),
			 );
			 $Result_id = $this->Customercrud_model->update_profile_income_details($id, $array_input);
			$check_id = $this->credit_manager_user_model->check_cam_profile($id);
			if($check_id > 0)$update_id = $this->credit_manager_user_model->update_cam_credit($id, $array_input_more);
			else $update_id = $this->credit_manager_user_model->insert_cam_credit($id, $array_input_more);
			if($update_id > 0)
			{
				 $array_input_more1 = array(
															
															'cam_status'=>('Cam details complete')
															);
							
				$Result_id1 = $this->Customercrud_model->update_profile($id, $array_input_more1);
			   $this->session->set_flashdata('success','success');
			   redirect('credit_manager_user/Credit_Analysis');
				
			}
			else
			{
				 $this->session->set_flashdata('error','error');
			     redirect('credit_manager_user/Edit_Credit_Analysis');
			}
	  }
	  //=========================== code for credit_manager-user First level===================
	  public function credit_sanction_loan_first_level()
	  {
		  $id = $this->input->get("ID"); // shows id of customer
		  $id1=$this->session->userdata("ID"); //shows id of credite manager user
		  $id2=$this->session->userdata("customer_id");
		 	 
		  
		  if($this->session->userdata("USER_TYPE") == ''){
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				//$this->load->view('header', $data);
				$this->load->view('login', $data);
			}
			else
			{
				$id = $this->input->get("ID");
				$CM_ID=$this->input->get("CM");
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				$data_row2= $this->Customercrud_model->getProfileData($CM_ID);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
                $data_row_applied_loan=	$this->Customercrud_model->getCustomerLoanAppliedInfo($id);
                $data_row_sanction_form= $this->credit_manager_user_model->getSanctionFormData($data_row_applied_loan->Application_id,$CM_ID);		
				$data_row_remark = $this->credit_manager_user_model->getApprovalRemarkData_remark($id,$CM_ID);
				$credit_analysis_data=$this->credit_manager_user_model->getCreditAnalysisData($id);
				$data_income_details=$this->credit_manager_user_model->getCustomerIncomeInfo($id);
				$get_cluster_manager_name_list = $this->credit_manager_user_model->get_cluster_manager_name_list();
					//=============== added by priya 19-07-2022
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
					$data['coapplicants'] = $data_coapplicant;
					 $x=1;
					foreach($data_coapplicant as $coapplicant)
					{
						$coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
						$coapp_data_credit_analysis_array[$x]=$coapp_data_credit_analysis;
    				$x++;
					}
				$data['coapp_data_credit_analysis_array']=$coapp_data_credit_analysis_array;
				//=================================================================================
              
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
				$data['CM_ID'] = $CM_ID;
				$data['row'] = $data_row;
				$data['row_2'] = $data_row2;
				$data['row_more'] = $data_row_more;
				$data['data_row_applied_loan']=$data_row_applied_loan;
				$data['row_sanction']=$data_row_sanction_form;
				$data['row_remark'] =$data_row_remark ;	
				$data['credit_analysis_data']=$credit_analysis_data;	
				$data['data_income_details']=$data_income_details;
				$data['get_cluster_manager_name_list']=$get_cluster_manager_name_list;
				$this->load->view('credit_manager_user/Sanction_dashbord', $data); 
			   	$this->load->view('credit_manager_user/credit_sanction_loan_first_level', $data);
				

			}
		
		  
	  }
	
	 
	  
	  public function View_customer_details()
	  {
		  $id = $this->input->get("ID");
		  if($this->session->userdata("USER_TYPE") == '')
		  {
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				//$this->load->view('header', $data);
				$this->load->view('login', $data);
			}else
			{
				$id = $this->input->get("ID");
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
                $data_row_applied_loan=	$this->Customercrud_model->getCustomerLoanAppliedInfo($id);			
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
			  	$this->load->view('credit_manager_user/header', $data);
				$this->load->view('credit_manager_user/customer_view_profile_1_credit_manager');
			}
		  
	  }
	  
	  
	  public function View_Applicant_details()
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
			if ($id == '') {
				$id = $this->session->userdata("ID");
			}
			//echo $id;
			//exit();
			$this->session->set_userdata('Cust_id',$id );
		    $data_row = $this->credit_manager_user_model->getProfileData($id);
			//print_r($data_row);
			//exit();
			$dsa_id=$data_row->DSA_ID;
			//echo $dsa_id;
			//exit();
			$dsa_info= $this->Dsacrud_model->getProfileData($dsa_id);
			//print_r($dsa_info);
			//exit();
			if($dsa_info->MN!='')
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
			else
			{
				$dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			}
			
			$data_row_more = $this->credit_manager_user_model->getProfileDataMore($id);	
			
			$data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($id);
			
			if($data_appliedloan->LOAN_TYPE=='home')
			{
				$data_coapplicant_no=$this->credit_manager_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->credit_manager_user_model->getCoapplicantById($id);
			}
			else
			{
				$data_coapplicant_no=0;
				$data_coapplicant=array();
			}
			
			
			$data_incomedetails=$this->credit_manager_user_model->getIncomedetails($id);
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
			$data['coapplicants']=$data_coapplicant;
			$data['appliedloan']=$data_appliedloan;
			$data['no_of_coapplicant']=$data_coapplicant_no;
			$data['income_details']=$data_incomedetails;
			$data['dsa_name']=$dsa_name;
			$this->load->view('credit_manager_user/header', $data);
			$this->load->view('credit_manager_user/CAM_Applicant_Details');	
		}
	  }
	  
	  public function View_Co_applicant_details()
	  {
		  
			$id = $this->input->get("ID");
			
				
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
				$data['userType'] = $this->session->userdata("USER_TYPE");

				$co_app = $this->Customercrud_model->getMyCoapplicants($id);
               
				
				$data['co_app'] = $co_app;
				$isCoapp = count($co_app) > 0 ? 'true' : 'false';
				$isProfileFull = 'false';
				for ($i=0; $i < count($co_app); $i++) { 
					if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
				}
				$data['coapplicant'] = $isCoapp;
				$data['isProfileFull'] = $isProfileFull;
				
				$this->load->view('credit_manager_user/header', $data);
				$this->load->view('credit_manager_user/coapplicants_customer_apply_loan_screen_1');
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

				$data['userType'] = $this->session->userdata("USER_TYPE");
				$data['co_app'] = $co_app;
				$isCoapp = count($co_app) > 0 ? 'true' : 'false';
				$isProfileFull = 'false';
				for ($i=0; $i < count($co_app); $i++) { 
					if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
				}
				$data['coapplicant'] = $isCoapp;
				$data['isProfileFull'] = $isProfileFull;
				$this->load->view('credit_manager_user/header', $data);
				$this->load->view('credit_manager_user/coapplicants_customer_apply_loan_screen_1');
			}
	  }
	  
	  
	   public function View_Income_details()
	  {
		 if($this->session->userdata("USER_TYPE") == ''){
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				$this->load->view('credit_manager_user/header', $data);
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
			
			if($saved_doc_row->doc_count==$main_doc_row->doc_count){
				$age = 1;
			}else $age = 0;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['error'] = '';
			$data['id'] = $id;
			$data['userType'] = $u_type;
			$data['documents'] = $data_row;
			//$data['documents_type'] = $data_doctype;
			$this->load->view('credit_manager_user/header', $data);
			$data['error'] = $this->input->get('error');
			$this->load->view('credit_manager_user/customer_view_income_doc', $data);
			}
		  
	  }
	  
	    public function View_Deviations_details()
	  {
		 $id = $this->input->get("ID");
		   $id1=$this->session->userdata("ID");
		  if($this->session->userdata("USER_TYPE") == '')
		  {
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				//$this->load->view('header', $data);
				$this->load->view('login', $data);
			}else
			{
				$id = $this->input->get("ID");
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
				$data_row2= $this->Customercrud_model->getProfileData($id1);
                $data_row_applied_loan=	$this->Customercrud_model->getCustomerLoanAppliedInfo($id);	
                $data_row_file_path=$this->credit_manager_user_model-> getDeviatioonDetails($id,$id1);						
								
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
				$data['row_2'] = $data_row2;
				$data['row_more'] = $data_row_more;
				$data['data_row_applied_loan']=$data_row_applied_loan;
				$data['data_row_file_path']=$data_row_file_path;
			   // echo "<pre>";
				//print_r($data);
				//exit();
				$this->load->view('credit_manager_user/header', $data);
				$this->load->view('credit_manager_user/deviations_details', $data);
			
			}
		
	  }
	  
	    public function View_CAM_details()
	  {
		    
  $id = $this->input->get("ID");
  $data_row = $this->Operations_user_model->getProfileData($id);
  $dsa_id=$data_row->DSA_ID;
	  $dsa_info= $this->Dsacrud_model->getProfileData($dsa_id);
	  if(!empty($dsa_info))
	  {
		  if($dsa_info->MN!='')
		  {
			  $dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			  $dsa_city=$dsa_info->CITY;
			  $dsa_state=$dsa_info->STATE;
		  }
		  else
		  {
			  $dsa_name=$dsa_info->FN." ".$dsa_info->MN." ".$dsa_info->LN;
			  $dsa_city=$dsa_info->CITY;
			  $dsa_state=$dsa_info->STATE;
		  }
	  }
	  else
	  {
		  $dsa_name='';
		  $dsa_city='';
		  $dsa_state='';
	  }
  $data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
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
	  }
	  else
	  {
		$data_emails=[];
	  }
	  $data_add=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
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
				  //	echo $data_obligation['Institution'].$data_obligation['Balance'];
				  //	echo "<br>";
					  
				  $k++;	 
				  }
				  
				  else
				  {
					  //break;
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
				  $TotalSanctionAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];
				  $data['TotalSanctionAmount']=$TotalSanctionAmount;
				  
				  $coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
				  $coapp_data_response=$coapp_data_credit_score->response;
				  $coapp_credit_score=json_decode($coapp_data_response,true);
				  $coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
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
				
				
				
				$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
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
		
			if(isset($Applicant_obligation_Array))
			{
				$sorted_array=array_diff($Co_Applicant_obligation_Array ,$Applicant_obligation_Array);
			}
			else
			{
				//$sorted_array =$Co_Applicant_obligation_Array 
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

 
  


	  
	  
	  


	  
	  
	  //echo $Co_Applicant_sorted_array[];
	  //exit();Co_Applicant_sorted_array
	  $data['Co_Applicant_sorted_array'] = $Co_Applicant_sorted_array;
	  $data['row'] = $data_row;
	  $data['data_row_more']=$data_row_more;
	  $data['dsa_name']=$dsa_name;
	  $data['dsa_city']=$dsa_city;
	  $data['dsa_state']=$dsa_state;
	  $data['PER_ADDRS_LINE_1']=$data_row_more->PER_ADDRS_LINE_1;
	  $data['RES_ADDRS_LINE_1']=$data_row_more->RES_ADDRS_LINE_1;
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
	  $data['Land_value']=$data_row_more->Land_value;
	  $data['Total_Value']=$data_row_more->Total_Value;
	  $data['Construction_value']=$data_row_more->Construction_value;
	  $data['Agreement_value']=$data_row_more->Agreement_value;
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
   
  $mpdf->SetHTMLHeader($this->load->view('Operations_user/header',[],true));
   ob_start();
  $mpdf->SetDisplayMode('fullwidth');
  $mpdf->debug = true;
  $mpdf->AddPage('P');
  $stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
  $stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));

  
  $mpdf->WriteHTML($stylesheet,1);
  $mpdf->list_indent_first_level = 0;
  $html = $this->load->view('Operations_user/cam_pdf',$data,true);
  $footer = "<table name='footer' width=\"1000\">
           <tr>
             <td style='font-size: 16px; padding-bottom: 2px;' align=\"right\">[Page : {PAGENO}]</td>
           </tr>
         </table>";
		 $mpdf->SetFooter($footer);
		   	ob_end_clean();
  $mpdf->WriteHTML($html);

  $mpdf->Output();

  //$mpdf->Output('assets/report.pdf','F');

  exit();
	  }
	  
	    public function View_Property_details()
	  {
		$id = $this->input->get("ID");
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
				$row_more = $this->credit_manager_user_model->getCustomerLoanAppliedInfo($id);
                $row_more2 = $this->credit_manager_user_model->getCustomerLoanAppliedInfo2($id);
				$data['userType'] = $this->session->userdata("USER_TYPE");
				$data['co_app'] = $co_app;
				$isCoapp = count($co_app) > 0 ? 'true' : 'false';
				$isProfileFull = 'false';
				for ($i=0; $i < count($co_app); $i++) { 
					if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
				}
				$data['coapplicant'] = $isCoapp;
				$data['isProfileFull'] = $isProfileFull;
				$data['row_more']=$row_more;
				$data['row_more2']=$row_more2;
				
				$this->load->view('credit_manager_user/header', $data);
				$this->load->view('credit_manager_user/property_details');
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
				$row_more = $this->credit_manager_user_model->getCustomerLoanAppliedInfo($id);
				$row_more2 = $this->credit_manager_user_model->getCustomerLoanAppliedInfo2($id);

				$data['userType'] = $this->session->userdata("USER_TYPE");
				$data['co_app'] = $co_app;
				$isCoapp = count($co_app) > 0 ? 'true' : 'false';
				$isProfileFull = 'false';
				for ($i=0; $i < count($co_app); $i++) { 
					if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
				}
				$data['coapplicant'] = $isCoapp;
				$data['isProfileFull'] = $isProfileFull;
				$data['row_more']=$row_more;
				$data['row_more2']=$row_more2;
				$this->load->view('credit_manager_user/header', $data);
				$this->load->view('credit_manager_user/property_details');
			}				
	  }
	  
	    public function View_Approval_Remark_details()
	  {
		  
		  $id   =$this->session->userdata("id"); // shows customer id
		  $id1 =$this->session->userdata("id1"); 
		  
		 // echo $id;
		  //echo $id1;
		  //exit();
		  
		   if($this->session->userdata("USER_TYPE") == ''){
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				$this->load->view('login', $data);
			}
			else
			{
				$id = $this->input->get("ID");
				
				if ($id == '') {
					$id = $this->session->userdata("id");
				}
				$data_row = $this->credit_manager_user_model->getApprovalRemarkData($id,$id1);
				
				$data_row_remark = $this->credit_manager_user_model->getApprovalRemarkData_remark($id,$id1);
				$this->load->helper('url');	
				$age = $this->session->userdata('AGE');
				$u_type = $this->session->userdata("USER_TYPE");
				$q = 1;
				if($u_type == 'DSA')$q = 2;
				else $age = 0;
				$data['showNav'] = $age;
				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				$data['id'] = $id;
				$data['row'] = $data_row;
				$data['row_remark'] =$data_row_remark ;
			
			   	$this->load->view('credit_manager_user/header', $data);
				$this->load->view('credit_manager_user/view_approval_remark', $data);
			}
				
			
	  }
	  
	    public function View_Verification_Result_details()
	  {
		 $id = $this->input->get("ID");
		  if($this->session->userdata("USER_TYPE") == '')
		  {
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				//$this->load->view('header', $data);
				$this->load->view('login', $data);
			}else
			{
				$id = $this->input->get("ID");
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
				$data_row = $this->credit_manager_user_model->getProfileData($id);
				$data_row_more = $this->credit_manager_user_model->getProfileDataMore($id);
                $data_row_applied_loan=	$this->credit_manager_user_model->getCustomerLoanAppliedInfo($id);
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
			   // echo "<pre>";
				//print_r($data);
				//exit();
				$this->load->view('credit_manager_user/header', $data);
				//echo "First level verification details";
				
			}  
	  }
	  
	    public function View_FI_details()
	  {
		 $id = $this->input->get("ID");
		  $id1=$this->session->userdata("ID");
		  if($this->session->userdata("USER_TYPE") == '')
		  {
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				//$this->load->view('header', $data);
				$this->load->view('login', $data);
			}else
			{
				$id = $this->input->get("ID");
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
                $data_row_applied_loan=	$this->Customercrud_model->getCustomerLoanAppliedInfo($id);	
                $data_row_file_path=$this->credit_manager_user_model->getFiFilePath($id,$id1);						
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
				$data['data_row_file_path']=$data_row_file_path;
			   // echo "<pre>";
				//print_r($data);
				//exit();
				$this->load->view('credit_manager_user/header', $data);
				//echo "First level FI details";
				$this->load->view('credit_manager_user/FI', $data);
			}
	  }
	  
	   
	    public function View_bank_report_details()
	  {
		 $id = $this->input->get("ID");
		 $id1=$this->session->userdata("ID");
		  if($this->session->userdata("USER_TYPE") == '')
		  {
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				//$this->load->view('header', $data);
				$this->load->view('login', $data);
			}else
			{
				$id = $this->input->get("ID");
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
                $data_row_applied_loan=	$this->Customercrud_model->getCustomerLoanAppliedInfo($id);		
                $data_row_bank_documnet=$this->credit_manager_user_model->getCustomerBankDocument($id);
                $data_row_bank_form= $this->credit_manager_user_model->getBankFormData($id,$id1);					
				$this->load->helper('url');	
				$age = $this->session->userdata('AGE');
				$u_type = $this->session->userdata("USER_TYPE");
				$q = 1;
				if($u_type == 'DSA')$q = 2;
				if($data_row->PROFILE_PERCENTAGE == 100){
					$age = 1;
				}else $age = 0;				$data['showNav'] = $age;

				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				$data['id'] = $id;
				$data['row'] = $data_row;
				$data['row_more'] = $data_row_more;
				$data['data_row_applied_loan']=$data_row_applied_loan;
				$data['data_row_bank_documnet']=$data_row_bank_documnet;
				$data['row_bank_form']=$data_row_bank_form;
			   // echo "<pre>";
				//print_r($data);
				//exit();
				$this->load->view('credit_manager_user/header', $data);
			    //echo "bank details";
				$this->load->view('credit_manager_user/bank_report', $data);
			}
	  }
	  
	  
	    public function View_GST_PAN_ITR_details()
	  {
		  $id = $this->input->get("ID");
		  if($this->session->userdata("USER_TYPE") == '')
		  {
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				//$this->load->view('header', $data);
				$this->load->view('login', $data);
			}else
			{
				$id = $this->input->get("ID");
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
				$data_row = $this->credit_manager_user_model->getProfileData($id);
				$data_row_more = $this->credit_manager_user_model->getProfileDataMore($id);
				
                $data_row_applied_loan=	$this->credit_manager_user_model->getCustomerLoanAppliedInfo($id);
                $data_row_cust_income_details=$this->credit_manager_user_model->getCustomerIncomeInfo($id);				
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
				$data['data_cust_income_details']=$data_row_cust_income_details;
			   // echo "<pre>";
				//print_r($data);
				//exit();
				$this->load->view('credit_manager_user/header', $data);
				$this->load->view('credit_manager_user/verification_results', $data);
			} 
	  }
	  
	     public function View_CIBIL_Equifax_details()
	  {
		 $id = $this->input->get("ID");
		 $respnse=$this->Dsacrud_model->get_credit_score($id);
		  //print_r($respnse->response);
		  if($respnse)
		  {
		  $dataArr = json_decode($respnse->response,true);
		  }
		  else
		  {
			  $dataArr='';
		  }
		 // print_r($dataArr);
		   //$respnse->response
		 // exit;
	     $data['response']=$dataArr;
		
		
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
		$file_name=md5(rand()).'pdf';
        $file=$mpdf->Output();
         
	  }
	  
	  
	 
	  
	     public function View_RCU_Reports_details()
	  {
		  $id = $this->input->get("ID");
		  $id1=$this->session->userdata("ID");		  
		  if($this->session->userdata("USER_TYPE") == '')
		  {
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				//$this->load->view('header', $data);
				$this->load->view('login', $data);
			}else
			{
				$id = $this->input->get("ID");
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
                $data_row_applied_loan=	$this->Customercrud_model->getCustomerLoanAppliedInfo($id);
                $data_row_file_path=$this->credit_manager_user_model->getRcuFilePath($id,$id1);					
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
				$data['data_row_file_path']=$data_row_file_path;
			   // echo "<pre>";
				//print_r($data);
				//exit();
				$this->load->view('credit_manager_user/header', $data);
				//echo "First level rcu details";
				$this->load->view('credit_manager_user/RCU_report', $data);
			}
		 
	  }
	  
	     public function View_Eligibility_details()
	  {
		  $id = $this->input->get("ID");
		  if($this->session->userdata("USER_TYPE") == '')
		  {
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				//$this->load->view('header', $data);
				$this->load->view('login', $data);
			}else
			{
				$id = $this->input->get("ID");
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
                $data_row_applied_loan=	$this->Customercrud_model->getCustomerLoanAppliedInfo($id);
                $data_row_income_details=$this->Customercrud_model->getCustomerIncomeInfo($id);				
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
				$data['data_row_income_details']=$data_row_income_details;
			   // echo "<pre>";
				//print_r($data);
				//exit();
				
				 $cust_type=$data_row_income_details->CUST_TYPE; 
				 if( $cust_type=='self employeed')
				 {
				
					$this->load->view('credit_manager_user/header', $data);
					$this->load->view('credit_manager_user/eligibility_non_salaried', $data);
				 }
				 else
				 {
					
					$this->load->view('credit_manager_user/header', $data);
					$this->load->view('credit_manager_user/eligibility_salaried', $data);
				 }
				
				//echo "First level eligibility details";
				
			} 
	  }
	  
	     public function View_Personal_Disussion_details()
	  {
		  $id = $this->input->get("ID");
		  $id1=$this->session->userdata("ID");
		  if( $id=='')  {     $id=$this->session->userdata("id");   }
		  if( $id1=='') {	  $id1=$this->session->userdata("id1"); }

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
				$CM_ID = $this->input->get("CM");
				//$this->session->set_userdata("CM_ID",$CM_ID); 
				
				if($CM_ID == '')
				{
                  $CM_ID = $this->session->userdata("CM_ID");
				}
				
				$CM_data_row = $this->Customercrud_model->getProfileData($CM_ID);
				$data['CM_data_row'] = $CM_data_row;
				$data['CM_ID'] = $CM_ID;
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				$data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
				if(!empty($data_row_pd_table))
				{
					$data['data_row_pd_table'] = $data_row_pd_table;
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
                $data_row_applied_loan=	$this->Customercrud_model->getCustomerLoanAppliedInfo($id);
                $data_row_personal_discussion_form= $this->credit_manager_user_model->getPersonalDiscussionData($id,$id1);
				//$data_row_personal_discussion_form= $this->credit_manager_user_model->getPDData($id);
				//check_personal_discussion_pdf_details
				 //$data_row_PD_details= $this->credit_manager_user_model->check_personal_discussion_pdf_details($id,$id1);
				 //--------------------------- details for obligation
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
				if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']))
				{
				$data_obligations_micro=$credit_score_response['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['MicrofinanceAccountDetails'];
			    }
			    else
			    {
			    	$data_obligations_micro=array();
			    }
				$data_add=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
				
				}
				else
				{
					$data_obligations=array();
					$data_add=array();
				}
				$total_obligation=0;
				
				
				
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
				 $data_obligations=array();
				 $credit_score_response=array();
			}
				//--------------------------------------------------












                 /*----added by nnnn-----*/
			    $data['data_obligations_micro']=$data_obligations_micro;
				$data['data_obligations']=$data_obligations;
				 $data_row_PD_details= $this->credit_manager_user_model->getPDData($id);
				 $data['data_row_PD_details']=$data_row_PD_details;
				$data_row_income = $this->Customercrud_model->getProfileDataIncome($id);	

				$data_credit_analysis=$this->Operations_user_model->getcreditData($id);
				$co_app = $this->Customercrud_model->getMyCoapplicants($id);
				$data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
				if(!empty($data_credit_score))
				{
					$data_response=$data_credit_score->response;
			        $credit_score_response=json_decode($data_credit_score->response,true);
				}
				else
				{
					$credit_score_response='';
				}
         		$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
				$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
				$Z=0;
				foreach($data_coapplicant as $coapplicant)
				{
					$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
					$coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
					if(!empty($coapp_data_credit_score))
					{
						$coapp_data_response=$coapp_data_credit_score->response;
						$coapp_credit_score_array[$Z]=json_decode($coapp_data_response,true);

					}
					else
					{
						$coapp_credit_score_array[$Z]=array();	
					}

					$Z++;
				}
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
				$data['coapplicants'] = $data_coapplicant;
				$data['data_row_income'] = $data_row_income;
				$data['credit_score_response'] =$credit_score_response;
				$data['data_credit_analysis'] =$data_credit_analysis;
				$data['row_personal_discussion_form']=$data_row_personal_discussion_form;
				$this->load->view('credit_manager_user/Sanction_dashbord',$data); 
				//$this->load->view('credit_manager_user/personal_discussion',$data);

			
				$check_steps= $this->session->userdata("check_steps");
				
								    if(isset($data_row_pd_table))
									{
									$credit_manager_ID=$data_row_pd_table->Credit_manager_id;
									$credit_manager_data=$this->Operations_user_model->getProfileData($credit_manager_ID);
								    $data['credit_manager_data']=$credit_manager_data;
									}
									else
									{
										$data['credit_manager_data']=array();
									}
			
				if(isset($check_steps))
				{
				            if($check_steps=='submit_form_1') 
							{
								   
									$this->session->unset_userdata("check_steps");
                                   	$this->load->view('credit_manager_user/personal_discussion_step2',$data);

							}
							else if($check_steps=='submit_form_2') 
							{
								
								    $this->session->unset_userdata("check_steps");
                                    $this->load->view('credit_manager_user/personal_discussion_step3',$data);
							}
							else if($check_steps=='submit_form_3') 
		                    {
								   $this->session->unset_userdata("check_steps");
                                   $get_pd_images = $this->credit_manager_user_model->get_pd_images($id);
								   if(!empty( $get_pd_images))
								   {
								     $data['get_pd_images'] =$get_pd_images;
								   }
								   else 
								   {
									 $data['get_pd_images'] =array();   
								   }

                                   $this->load->view('credit_manager_user/personal_discussion_step4',$data);
							}
							else
							{
								  
									
									$this->session->unset_userdata("check_steps");
								    $this->load->view('credit_manager_user/personal_discussion_step1',$data);

							}
				}
				else 
				{
					               // echo "else outer";
									//exit();
								
									
									$this->session->unset_userdata("check_steps");
								    $this->load->view('credit_manager_user/personal_discussion_step1',$data);
                }

			} 
	  }
	  
	//===============================data retrive function====================================
		public function profile_view_p_t()
		{
			if($this->session->userdata("USER_TYPE") == ''){
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				$this->load->view('credit_manager_user/header',$data);
				$this->load->view('login');
			}else{
				$id = $this->input->get("ID");
				$data_row = $this->Customercrud_model->getProfileDataIncome($id);	
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
				$this->load->view('credit_manager_user/header', $data);
				$this->load->view('credit_manager_user/customer_view_profile_2', $data);
			}
		}
		public function profile_view_p_thre()
		{
			if($this->session->userdata("USER_TYPE") == ''){
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				$this->load->view('credit_manager_user/header', $data);
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
			if($saved_doc_row->doc_count==$main_doc_row->doc_count){
				$age = 1;
			}else $age = 0;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['error'] = '';
			$data['id'] = $id;
			$data['userType'] = $u_type;
			$data['documents'] = $data_row;
			//$data['documents_type'] = $data_doctype;
			$this->load->view('credit_manager_user/header', $data);
			$data['error'] = $this->input->get('error');
			$this->load->view('credit_manager_user/customer_view_profile_3', $data);
			}
		}
		
			public function coapplicant_new_screen_one()
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
			$this->load->view('credit_manager_user/header', $data);
			$this->load->view('credit_manager_user/credit_manager_coapplicant_details_screen_one');
		}
		
		
			public function customer_edit_profile_2_income()
		{
		
			$COAPPID   = $this->input->get("COAPPID");
			$coapp_row = $this->Customercrud_model->getCoapplicantIncome($COAPPID);
			$this->load->helper('url');
			$data['showNav'] = 1;	
			$data['row']=$coapp_row;
			$data['age'] = 0;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$this->load->view('credit_manager_user/header', $data);
			$this->load->view('credit_manager_user/credit_manager_user_customer_update_profile_2_income',$data);
		}
		
		
		
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

			$this->Customercrud_model->update_coapp_user_type($coappId,$type);
					
			$this->session->set_userdata("PATIENT_USER_TYPE", $data['type']);
			$this->load->view('credit_manager_user/header', $data);
			$this->load->view('credit_manager_user/coapplicant_income_screen_2', $data);
		}
        
			public function customer_documents()
		{
			$u_type = $this->session->userdata("USER_TYPE");
			$id = $this->input->get("UID");
			
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
			$u_id = $this->input->get("ID"); 
			$loan_application_amount=$this->Admin_model->get_loan_application_price();
			$data['loan_application_amount']=$loan_application_amount;
			$coapp = false;
			if(!empty($u_id)){
				$id = $u_id;
				$coapp = true;
			}
			
			$data_row = $this->Customercrud_model->getDocuments($id); // get users uploaded documents

			$row=$this->Customercrud_model->getProfileData($id);
			if(empty($u_id))
			{
			$role=$row->ROLE;
		 
			$doc_type_user = $role;
			}
			else
			{
				$doc_type_user=1;
			}
			
			//if($u_type == 'CUSTOMER')$doc_type_user = 1;
			$data_doctype = "";//$this->Customercrud_model->getDocumentsType($doc_type_user);
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			//$q = 1;
			//if($u_type == 'DSA')$q = 2;
			$data['showNav'] = $age;
            $data['data_row']=$row;
			$inc_src = $this->Customercrud_model->get_user_type($id);

             $savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "kyc");
			
			if($savedDocType->doc_count > 0){
				$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "residential");

				if($savedDocType->doc_count > 0){
					/*$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "INCOME");
					$data['doc_type'] = "INCOME";
					$data['doc_count'] = 1;
					$data['message'] = "Upload any one document for INCOME";*/
					if($inc_src == "salaried"){ 
						$doc1 = $this->Customercrud_model->get_salaried_salary_slip_SavedDocumentsCount($id, "income");
						$doc2 = $this->Customercrud_model->get_salaried_itr_SavedDocumentsCount($id, "income");
						$doc3 = $this->Customercrud_model->get_salaried_bank_SavedDocumentsCount($id, "income");

						$count = $doc1+$doc2+$doc3;
						if($count > 1){
							$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "employment");
							if($savedDocType->doc_count > 0){
								$data['save'] = true;
								$data_doctype = $this->Customercrud_model->getDocumentsType_incomesrc($doc_type_user,"salaried","EMPLOYMENT");
								$data['doc_type'] = "employment";
								$data['doc_count'] = 4;
								$data['message'] = "All documents Uploaded Successfully";
							} else {
								$data_doctype = $this->Customercrud_model->getDocumentsType_incomesrc($doc_type_user,"salaried","EMPLOYMENT");
								$data['doc_type'] = "employment";
								$data['doc_count'] = 4;
								$data['message'] = "Upload any one document for Employment/Business";
							}

						} else {

							$data_doctype = $this->Customercrud_model->getDocumentsType_incomesrc($doc_type_user,"salaried","INCOME");
							$data['doc_type'] = "INCOME";  
							$data['doc_count'] = 3;
							$data['message'] = "Upload any two document for Income";

						}
					} else if($inc_src == "business"){

						$doc1 = $this->Customercrud_model->get_business_bank_SavedDocumentsCount($id, "INCOME");
						$doc2 = $this->Customercrud_model->get_business_balance_audit_itr_SavedDocumentsCount($id, "INCOME");
						$count = $doc1+$doc2;
						if($count > 1){
							$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "business");
							if($savedDocType->doc_count > 0){
								$data['save'] = true;
								$data_doctype = $this->Customercrud_model->getDocumentsType_incomesrc($doc_type_user,"self-employed","BUSINESS");
								$data['doc_type'] = "business";
								$data['doc_count'] = 4;
								$data['message'] = "All documents Uploaded Successfully";

							} else {
								$data_doctype = $this->Customercrud_model->getDocumentsType_incomesrc($doc_type_user,"self-employed","BUSINESS");
								$data['doc_type'] = "business";  
								$data['doc_count'] = 4;
								$data['message'] = "Only one document is Mandatory others if available";

							}

						} else {

							$data_doctype = $this->Customercrud_model->getDocumentsType_incomesrc($doc_type_user,"self-employed","INCOME");
							$data['doc_type'] = "INCOME";  
							$data['doc_count'] = 3;
							$data['message'] = "All documents are Mandatory";
						}
					}

				}else{
					$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "RESIDENTIAL");
				
					$data['doc_type'] = "residential";
					$data['doc_count'] = 2;
					$data['message'] = "Upload any one document for Residential";

				}	
			}else{
				$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "KYC");
				$data['doc_type'] = "kyc";
				$data['doc_count'] = 1;
				$data['message'] = "Upload any one document for kyc";

			}
			
			$data['age'] = $age;
			$data['error'] = '';
			$data['userType'] = $u_type;
			$data['coapp_id'] = $u_id;
			$data['documents'] = $data_row;
			$data['documents_type'] = $data_doctype;
			$data['user_type'] = $inc_src;

			
			$this->load->view('credit_manager_user/header', $data);
			$data['error'] = $this->input->get('error');
			$this->session->set_flashdata('message',$data['message']);
			if(empty($u_id)){$this->load->view('credit_manager_user/customerdocumentsnew', $data);}
			else{ $this->load->view('credit_manager_user/customerdocumentsnewcoapp', $data);}
		}
		
	//===============================end of the code===========================================
	//===============================function for form submission==============================
	 public function credit_manager_first_level_form()
	 { 
		 $credit_manager_user_id =$this->session->userdata("id1");
		 $customer_ID=$this->input->post("customer_ID");

	   $credit_manager_user_id=$this->session->userdata("ID");
	   $customer_ID=$this->input->post('customer_ID');
	   $application_number=$this->input->post('application_number');
	   $loan_type=$this->input->post('loan_type');
	   $tenure=$this->input->post('tenure');
	   $loan_amount=$this->input->post('loan_amount');
	   $channel=$this->input->post('channel');
	   $roi=$this->input->post('roi');
	   $customer_name=$this->input->post('customer_name');
	   $product=$this->input->post('product');
	   $program=$this->input->post('program');
	   $income_assessed=$this->input->post('income_assessed');
	  // $income_assessed=$this->input->post('income_assessed');
	   $final_tenure=$this->input->post('final_tenure');
	   $eligibility=$this->input->post('eligibility');
	   $approval_remark=$this->input->post('approval_remark');
	   $final_loan_amount=$this->input->post('final_loan_amount');
	   $recommended_by=$this->input->post('recommended_by');
	     $recommended_to=$this->input->post('recommended_to');
	     $loan_status=$this->input->post('loan_status');
	     $EMI=$this->input->post('EMI');
	     $PROP_ADD_LINE=$this->input->post('PROP_ADD_LINE');
	     $Total_Value_of_property=$this->input->post('Total_Value_of_property');
	     $LTV=$this->input->post('LTV');
	     $case_details=$this->input->post('case_details');
	       $Deviation_details=$this->input->post('Deviation_details');
	     $End_use_of_loan=$this->input->post('End_use_of_loan');
	     $date = date('d-m-Y');



	     			$Reference_type=$this->input->post('Reference_type');
					$Name=$this->input->post('Name');
					$Contact_No=$this->input->post('Contact_No');
					
					$count = count($Reference_type);
					$references_array=array();
			        for($i=0; $i<$count; $i++)
					{
						array_push($references_array, array(
										'Reference_type'=>$Reference_type[$i],
										'Name'=>$Name[$i],
										'Contact_No'=>$Contact_No[$i],
										));	
					}
					$more_property_details =json_encode($references_array);


		 $data = array(

			'credit_manager_id' =>$credit_manager_user_id,
			'Customer_id'=>$customer_ID,
			'application_number' =>$application_number,
			'loan_type' =>$loan_type,
			'tenure' =>$tenure,
			'loan_amount' =>$loan_amount,
			'channel' => $channel,
			'roi'=>$roi,
			'customer_name' =>$customer_name,
			'product' => $product,
			'program' => $program,
			'income_assessed' =>$income_assessed,
			'final_tenure' =>$final_tenure,
			'eligibility' => $eligibility,
			'approval_remark' =>$approval_remark,
			'final_loan_amount' =>$final_loan_amount,
			'recommended_by' =>$recommended_by,
			'recommended_to' =>$recommended_to,
			'form_submit_date' => $date,
			'loan_status' => $loan_status ,
			'Recommendation_status' =>'Recommended' ,
			'Recommendation_status_added_by' =>'Credit Manager' ,
			'EMI' =>$EMI,
			'PROP_ADD_LINE' =>$PROP_ADD_LINE,
			'Total_Value_of_property' =>$Total_Value_of_property,
			'LTV' => $LTV,
			'case_details' => $case_details ,
			'Deviation_details' => $Deviation_details ,
			'End_use_of_loan' => $End_use_of_loan ,
			'more_property_details' => $more_property_details ,
		 );
     
    	$cluster_credit_manager_email_id=$this->Dsacrud_model->getProfileData($recommended_to);
    	$credit_manager_profile_data=$this->Dsacrud_model->getProfileData($credit_manager_user_id);
		$config['protocol']='smtp';
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
		$send_email_to=$cluster_credit_manager_email_id->EMAIL;
		//$send_email_to='piyuabdagire@gmail.com';
		$this->email->to($send_email_to);
			
		$check_existing_entry= $this->credit_manager_user_model->check_first_level_sanction_details($application_number, $credit_manager_user_id);
		if(isset($check_existing_entry))
		{
     		$result = $this->credit_manager_user_model->update_first_level_sanction_details($application_number, $credit_manager_user_id,$data);
			$status="success";
			$data=array(
			  'credit_manager_id' =>$credit_manager_user_id,
			  'UNIQUE_CODE' =>$customer_ID,
			  'credit_sanction_status'=>$status,
			  'loan_status'=>$loan_status
			
			);
			$result_for_status = $this->credit_manager_user_model->update_credit_sanction_status($customer_ID,$data);


			$this->email->subject('Revert Changes Done For :  '.$customer_name.''); 
		    $Email_data=array(
								 'Application_Id'=>$application_number,
								 'Customer_name'=>$customer_name,
								 'loan_type' =>$loan_type,
								 'final_loan_amount'=>$final_loan_amount,
								 'final_tenure' =>$final_tenure,
								 'roi'=>$roi,
								 'Submitted_by'=>$credit_manager_profile_data->FN." ".$credit_manager_profile_data->LN,
								 'submission_date'=>$date,
							     'Recommendation_status'=>'Recommended',
							     'Recommendation_status_added_by' =>'Credit Manager' 
								 );

		    $data2['data']=$Email_data;
		    $mailContent = $this->load->view('templates/sanction_recommendation_email',$data2,true);
		    $this->email->message($mailContent); 
	        $this->email->Send() ;

			$this->session->set_flashdata('success', 'Recommendation Updated Successfully');
		    redirect("credit_manager_user/credit_sanction_loan_first_level?ID=".$customer_ID."&CM=".$credit_manager_user_id);

			
		}
		else
		{
			
			$result = $this->credit_manager_user_model->save_first_level_sanction_details($data);
			$status="success";
			$data=array(
			  'credit_manager_id' =>$credit_manager_user_id,
			  'UNIQUE_CODE' =>$customer_ID,
			  'credit_sanction_status'=>$status,
			  'loan_status'=>$loan_status
			
			);
			$result_for_status = $this->credit_manager_user_model->update_credit_sanction_status($customer_ID,$data);
			// send email to cluster credit manager  for recommendations    $recommended_by

			$this->email->subject('Sanction Recommendation Submitted For :  '.$customer_name.''); 
		    $Email_data=array(
								 'Application_Id'=>$application_number,
								 'Customer_name'=>$customer_name,
								 'loan_type' =>$loan_type,
								 'final_loan_amount'=>$final_loan_amount,
								 'final_tenure' =>$final_tenure,
								 'roi'=>$roi,
								 'Submitted_by'=>$credit_manager_profile_data->FN." ".$credit_manager_profile_data->LN,
								 'submission_date'=>$date,
							     'Recommendation_status'=>'Recommended' ,
							     'Recommendation_status_added_by' =>'Credit Manager'
								 );

		    $data2['data']=$Email_data;
		    $mailContent = $this->load->view('templates/sanction_recommendation_email',$data2,true);
		    $this->email->message($mailContent); 
	        $this->email->Send() ;
			$this->session->set_flashdata('success', 'Recommendation Submitted Successfully');
		    redirect("credit_manager_user/credit_sanction_loan_first_level?ID=".$customer_ID."&CM=".$credit_manager_user_id);

		}


		
		
    }
	 
	 public function personal_discussion()
	 {   
		 
	     
		 $application_number     =$this->session->userdata("id"); // shows customer id
		 $credit_manager_user_id =$this->session->userdata("id1"); // shows credit manager id
		 //echo $application_number;		 echo $credit_manager_user_id;
		 //exit();
        // =========================new code lines============================================
        /*
        echo "section 1";
		echo "Personal";
		echo "<br>LeadID= ".$this->input->post('LeadID');
		echo "<br>PDDoneWith= ".$this->input->post('PDDoneWith');
		echo "<br>PrimaryProfileOfPDPerson= ".$this->input->post('PrimaryProfileOfPDPerson');
		echo "<br>PersonMet= ".$this->input->post('PersonMet');
		echo "<br>Product= ".$this->input->post('Product');
		echo "<br>Date= ".$this->input->post('Date');
		echo "<br>ReportGenerationDate= ".$this->input->post('ReportGenerationDate');
		echo "<br>PDDoneby= ".$this->input->post('PDDoneby');
		echo "<br>CustomerDetails= ".$this->input->post('CustomerDetails');
		echo "<br>FamilyBackground= ".$this->input->post('FamilyBackground');
		echo "<br>FamilySize= ".$this->input->post('FamilySize');
		echo "<br>NoOfDependent= ".$this->input->post('NoOfDependent');
		echo "<br>NoOfEarningMembers= ".$this->input->post('NoOfEarningMembers');
		echo "<br>ResidenceOwnership= ".$this->input->post('ResidenceOwnership');
		echo "<br>Co-applicantName= ".$this->input->post('Co-applicantName');
		echo "<br>ResidenceType= ".$this->input->post('ResidenceType');
		echo "<br>StayingSinceAtCurrentAddress= ".$this->input->post('StayingSinceAtCurrentAddress');
		echo "<br>NativeOf= ".$this->input->post('NativeOf');
		echo "<br>StayingInCitySince= ".$this->input->post('StayingInCitySince');
		echo "<br>Relation= ".$this->input->post('Relation');


		echo "CONTACT DETAILS";
		echo "<br>PrimaryContactNo= ".$this->input->post('PrimaryContactNo');
		echo "<br>AlternateContactNo= ".$this->input->post('AlternateContactNo');
		echo "<br>EmailID= ".$this->input->post('EmailID');
		echo "<br>PDAddress= ".$this->input->post('PDAddress');
		echo "<br>PDAddressIfOthers= ".$this->input->post('PDAddressIfOthers');

		echo "BUSINESS DETAILS";
		echo "<br>NameOfBusiness= ".$this->input->post('NameOfBusiness');
		echo "<br>NatureOfBusiness= ".$this->input->post('NatureOfBusiness');
		echo "<br>BusinessSetUp= ".$this->input->post('BusinessSetUp');
		echo "<br>BusinessVintage= ".$this->input->post('BusinessVintage');
		echo "<br>NoOfEmployees= ".$this->input->post('NoOfEmployees');
		echo "<br>BusinessHolderName= ".$this->input->post('BusinessHolderName');
		echo "<br>SubProfile= ".$this->input->post('SubProfile');
		echo "<br>BusinessPlace= ".$this->input->post('BusinessPlace');
		echo "<br>IndustryExperience= ".$this->input->post('IndustryExperience');
		echo "<br>BusinessDocsVerified= ".$this->input->post('BusinessDocsVerified');

        





		echo "section 2";
		echo "Personal";
		echo "<br>AdditionalIncome= ".$this->input->post('AdditionalIncome');
		echo "<br>IncomeConsidered= ".$this->input->post('IncomeConsidered');
		echo "<br>IncomeAmount= ".$this->input->post('IncomeAmount');
		echo "<br>Comments= ".$this->input->post('Comments');
		echo "<br>IncomeGrid= ".$this->input->post('IncomeGrid');
		echo "<br>PrimaryIncome= ".$this->input->post('PrimaryIncome');
		echo "<br>AdditionalIncome= ".$this->input->post('AdditionalIncome');
		echo "<br>TotalIncome= ".$this->input->post('TotalIncome');
		echo "<br>LocationToBeTagged= ".$this->input->post('LocationToBeTagged');
		echo "<br>LocationAddress= ".$this->input->post('LocationAddress');




		echo "section 3";	
		echo "<br>RequestedLoanAmount= ".$this->input->post('RequestedLoanAmount');
		echo "<br>ModeOfPropertyAcquisition= ".$this->input->post('ModeOfPropertyAcquisition');
		echo "<br>TypeOfTransaction= ".$this->input->post('TypeOfTransaction');
		echo "<br>MixTransaction= ".$this->input->post('MixTransaction');
		echo "<br>PropertyOwnedSince= ".$this->input->post('PropertyOwnedSince');
		echo "<br>POSHLLAN= ".$this->input->post('POSHLLAN');
		echo "<br>OccupancyStatus= ".$this->input->post('OccupancyStatus');
		echo "<br>MOB= ".$this->input->post('MOB');
		echo "<br>EndUse= ".$this->input->post('EndUse');

		echo "section 3 Property / End use Brief";
		echo "<br>PropertyEndUseBrief= ".$this->input->post('PropertyEndUseBrief');

		echo "Loan Details- Applicant";
		echo "<br>NoOfActiveLoans= ".$this->input->post('NoOfActiveLoans');
		echo "<br>CumulativeEMI= ".$this->input->post('CumulativeEMI');
		echo "<br>ObligatedEMI= ".$this->input->post('ObligatedEMI');
		echo "<br>ComfortableEMI= ".$this->input->post('ComfortableEMI');


		echo "Loan Details- Co - Applicant";
		echo "<br>NoOfActiveLoans_co= ".$this->input->post('NoOfActiveLoans_co');
		echo "<br>CumulativeEMI_co= ".$this->input->post('CumulativeEMI_co');
		echo "<br>ObligatedEMI_co= ".$this->input->post('ObligatedEMI_co');
		echo "<br>ComfortableEMI_co= ".$this->input->post('ComfortableEMI_co');
		echo "<br>PDStatusOf= ".$this->input->post('PDStatusOf');
		echo "<br>OverallPDStatus= ".$this->input->post('OverallPDStatus'); */


		//exit();


		  	 $pd_data = array(
			'customer_id' =>$application_number,
			'Credit_manager_id' => $credit_manager_user_id,
			'Credit_manager_name' =>$this->input->post('PDDoneby'),
			'Lead_ID' =>$this->input->post('LeadID'),
			'PD_done_with' =>$this->input->post('PDDoneWith'),
			'profile_of_PD_person' =>$this->input->post('PrimaryProfileOfPDPerson'),
			'Person_Met' =>$this->input->post('PersonMet'),
			'Product' =>$this->input->post('Product'),
			'Date' =>$this->input->post('Date'),
			'Report_Generation_Date' =>$this->input->post('ReportGenerationDate'),
			'PD_Done_by' =>$this->input->post('PDDoneby'),
			'Customer_details' =>$this->input->post('CustomerDetails'),
			'Family_Background' =>$this->input->post('FamilyBackground'),
			'Family_Size' =>$this->input->post('FamilySize'),
			'No_of_Dependent' =>$this->input->post('NoOfDependent'),
			'No_of_Earning_Members' =>$this->input->post('NoOfEarningMembers'),
			'Residence_Ownership' =>$this->input->post('ResidenceOwnership'),
			'Residence_Type' =>$this->input->post('ResidenceType'),
			'Staying_Since_at_Current_Address' =>$this->input->post('StayingSinceAtCurrentAddress'),
			'Native_Of' =>$this->input->post('NativeOf'),
			'Staying_in_City_Since' =>$this->input->post('StayingInCitySince'),
			'Relation' =>$this->input->post('Relation'),
			'Co-applicant_Name' =>$this->input->post('Co-applicantName'),
			'Primary_contact_no' =>$this->input->post('PrimaryContactNo'),
			'Alternate_Contact_No' =>$this->input->post('AlternateContactNo'),
			'Email_ID' =>$this->input->post('EmailID'),
			'PD_Address' =>$this->input->post('PDAddress'),
			'PD_Address_If_Others' =>$this->input->post('PDAddressIfOthers'),
			'Name_of_Business' =>$this->input->post('NameOfBusiness'),
			'Nature_of_Business' =>$this->input->post('NatureOfBusiness'),
			'Business_Set_up' =>$this->input->post('BusinessSetUp'),
			'Business_Vintage' =>$this->input->post('BusinessVintage'),
			'No_of_Employees' =>$this->input->post('NoOfEmployees'),
			'Business_Holder_Name' =>$this->input->post('BusinessHolderName'),
			'Sub_Profile' =>$this->input->post('SubProfile'),
			'Business_Place' =>$this->input->post('BusinessPlace'),
			'Industry_Experience' =>$this->input->post('IndustryExperience'),
			'Business_Docs_Verified' =>$this->input->post('BusinessDocsVerified'),
			'Business_Description' =>$credit_manager_user_id,
			'No_of_Units_CD' =>$credit_manager_user_id,
			'No_of_Units_Ass' =>$credit_manager_user_id,
			'Average_Sale_price_CD' =>$credit_manager_user_id,
			'Average_Sale_price_Ass' =>$credit_manager_user_id,
			'Daily_Sales_CD' =>$credit_manager_user_id,
			'Daily_Sales_Ass' =>$credit_manager_user_id,
			'Days_Operation_CD' =>$credit_manager_user_id,
			'Days_Operation_Ass' =>$credit_manager_user_id,
			'Monthly_Sales_CD' =>$credit_manager_user_id,
			'Monthly_Sales_Ass' =>$credit_manager_user_id,
			'Purchase_of_Raw_Material_CD' =>$credit_manager_user_id,
			'Purchase_of_Raw_Material_Ass' =>$credit_manager_user_id,
			'Wages_CD' =>$credit_manager_user_id,
			'Wages_Ass' =>$credit_manager_user_id,
			'Electricity_CD' =>$credit_manager_user_id,
			'Electricity_Ass' =>$credit_manager_user_id,
			'Rent_CD' =>$credit_manager_user_id,
			'Rent_Ass' =>$credit_manager_user_id,
			'Other_EXp_CD' =>$credit_manager_user_id,
			'Other_EXp_Ass' =>$credit_manager_user_id,
			'Monthly_Exp_CD' =>$credit_manager_user_id,
			'Monthly_Exp_Ass' =>$credit_manager_user_id,
			'Net_Profit_CD' =>$credit_manager_user_id,
			'Net_Profit_Ass' =>$credit_manager_user_id,
			'Margin_CD' =>$credit_manager_user_id,
			'Margin_Ass' =>$credit_manager_user_id,
			'Additional_Income' =>$this->input->post('AdditionalIncome'),
			'Income_Considered' =>$this->input->post('IncomeConsidered'),
			'Income_Amount' =>$this->input->post('IncomeAmount'),
			'income_Comments' =>$this->input->post('Comments'),
			'Income_Grid' =>$this->input->post('IncomeGrid'),
			'Primary_Income' =>$this->input->post('PrimaryIncome'),
			'Additional_Income2' =>$this->input->post('AdditionalIncome'),
			'Total_Income' =>$this->input->post('TotalIncome'),
			'Location_to_be_Tagged' =>$this->input->post('LocationToBeTagged'),
			'Location_Address' =>$this->input->post('LocationAddress'),
			'Requested_Loan_Amount' =>$this->input->post('RequestedLoanAmount'),
			'Mode_of_Property_Acquisition' =>$this->input->post('ModeOfPropertyAcquisition'),
			'Type_of_Transaction' =>$this->input->post('TypeOfTransaction'),
			'Mix_Transaction' =>$this->input->post('MixTransaction'),
			'Property_Owned_Since' =>$this->input->post('PropertyOwnedSince'),
			'POS_HL_LAN' =>$this->input->post('POSHLLAN'),
			'Occupancy_Status' =>$this->input->post('OccupancyStatus'),
			'MOB' =>$this->input->post('MOB'),
			'End_Use' =>$this->input->post('EndUse'),
			'Property_End_use_Brief' =>$this->input->post('PropertyEndUseBrief'),
			'Insurance' =>$credit_manager_user_id,
			'Mutual_Funds' =>$credit_manager_user_id,
			'FD' =>$credit_manager_user_id,
			'Jewellery' =>$credit_manager_user_id,
			'Property' =>$credit_manager_user_id,
			'Chit_Fund' =>$credit_manager_user_id,
			'RD' =>$credit_manager_user_id,
			'Reference_type_1' =>$credit_manager_user_id,
			'Reference_type_2' =>$credit_manager_user_id,
			'Name_1' =>$credit_manager_user_id,
			'Name_2' =>$credit_manager_user_id,
			'Contact_No_1' =>$credit_manager_user_id,
			'Contact_No_2' =>$credit_manager_user_id,
			'Relation_1' =>$credit_manager_user_id,
			'Relation_2' =>$credit_manager_user_id,
			'Known_Since_1' =>$credit_manager_user_id,
			'Known_Since_2' =>$credit_manager_user_id,
			'Verification_Status_1' =>$credit_manager_user_id,
			'Verification_Status_2' =>$credit_manager_user_id,
			'Brief_on_Reference_1' =>$credit_manager_user_id,
			'Brief_on_Reference_2' =>$credit_manager_user_id,
			'PD_Status_of' =>$this->input->post('PDStatusOf'),
			'Overall_PD_Status' =>$this->input->post('OverallPDStatus'),
			'PD_STATUS' =>'Completed'
		 );

		$check_existing_entry= $this->credit_manager_user_model->check_personal_discussion_pdf_details($application_number,$credit_manager_user_id);
		if(isset($check_existing_entry))
		{
			$result = $this->credit_manager_user_model->update_personal_discussion_pdf_details($application_number,$credit_manager_user_id,$pd_data);
			redirect("credit_manager_user/View_Personal_Disussion_details?ID=$application_number");
		}
		else
		{
		$result = $this->credit_manager_user_model->save_personal_discussion_pdf_details($pd_data);
		redirect("credit_manager_user/View_Personal_Disussion_details?ID=$application_number");
		}

		
	 }
	
	 public function deviations_details()
	 {
		   
		 $application_number     =$this->session->userdata("id"); // shows customer id
		 $credit_manager_user_id =$this->session->userdata("id1"); // shows credit manager id
		 $code=$this->input->post('code');
		 $description=$this->input->post('description');
		 $level=$this->input->post('level');
		 $mitigants=$this->input->post('mitigants');
		 $approved_by=$this->input->post('approved_by');
		 
		//echo $application_number;
		// echo $credit_manager_user_id;
		// echo $code;
		// echo $description;
		// echo $level;
		// echo $mitigants;
		// echo $approved_by;
		// exit();
		 
		 
		 //echo $id;		 echo $id1;
		
		 $date = date('d-m-y');
		
		 $data = array(

			'credit_manager_id' =>$credit_manager_user_id,
			'application_number' =>$application_number,
			'code' =>$code ,
			'description' =>$description ,
			'level' =>$level ,
			'mitigants' =>$mitigants ,
			'approved_by' =>$approved_by ,
			'date'=>$date
		 );
		
		
		
		$check_existing_entry= $this->credit_manager_user_model->check_deviation_details($application_number, $credit_manager_user_id);
		if(isset($check_existing_entry))
		{
			$result = $this->credit_manager_user_model->update_deviation_details($application_number, $credit_manager_user_id,$data);
		    $this->session->set_flashdata('success', 'Deviations details updated successfully');
		    redirect("credit_manager_user/View_Deviations_details?ID=$application_number");
		}
		else
		{
		$result = $this->credit_manager_user_model->deviation_details($data);
		$this->session->set_flashdata('success', 'Deviations details added successfully');
		redirect("credit_manager_user/View_Deviations_details?ID=$application_number");
		}
		//echo $result;
	 }
	
	public function save_bank_report()
	{
		 $application_number     =$this->session->userdata("id"); // shows customer id
		 $credit_manager_user_id =$this->session->userdata("id1"); // shows credit manager id
		 //echo $application_number;
		 //echo  $credit_manager_user_id;
		 $emi=$this->input->post('emi');
		 $credits=$this->input->post('credits');
		 $no_of_outward=$this->input->post('no_of_outward');
		 $digital_receipts=$this->input->post('digital_receipts');
		 $no_of_total_credit=$this->input->post('no_of_total_credit');
		 $average_balance=$this->input->post('average_balance');
		 $no_of_inward=$this->input->post('no_of_inward');
		 $digital_payment=$this->input->post('digital_payment');
		 $no_of_total_debit=$this->input->post('no_of_total_debit');
		 
		 
		 $data = array(

			'credit_manager_id' =>$credit_manager_user_id,
			'application_number' =>$application_number,
			'emi' =>$emi ,
			'credits' =>$credits ,
			'outward' =>$no_of_outward ,
			'digital_receipts' =>$digital_receipts ,
			'total_credit' =>$no_of_total_credit ,
			'average_balance' =>$average_balance ,
			'inward' =>$no_of_inward ,
			'digital_payments' =>$digital_payment ,
			'total_debit' =>$no_of_total_credit 			
		 );
		
		$check_existing_entry= $this->credit_manager_user_model->check_bank_report_details($application_number, $credit_manager_user_id);
		if(isset($check_existing_entry))
		{
			$result = $this->credit_manager_user_model->update_bank_report_details($application_number, $credit_manager_user_id,$data);
		    $this->session->set_flashdata('success', 'Bank Report updated successfully');
		    redirect("credit_manager_user/View_bank_report_details?ID=$application_number");
		}
		else
		{
		$result = $this->credit_manager_user_model->bank_report_details($data);
		$this->session->set_flashdata('success', 'Bank report added successfully');
		redirect("credit_manager_user/View_bank_report_details?ID=$application_number");
		}
		
		 		 
			 
	}
	
	public function save_fi()
	{
		 $application_number     =$this->session->userdata("id"); // shows customer id
		 $credit_manager_user_id =$this->session->userdata("id1"); // shows credit manager id
		 $fi_status=$this->input->post('status');
		 $fi_comment=$this->input->post('comment');
		 $fi_file_path=$this->input->post('file');
		 
		 $fileName=$_FILES["file"]["name"];
		 $fileSize=$_FILES["file"]["size"]/1024;
         $fileType=$_FILES["file"]["type"];
         $fileTmpName=$_FILES["file"]["tmp_name"];  
		 
		 $newFileName=$fileName;
		 $uploadPath="./images/all_document_pdf/".$newFileName;		

         if(move_uploaded_file($fileTmpName,$uploadPath))
		   {
			//echo "Successful"; 
			//echo "File Name :".$newFileName; 
			//echo "File Size :".$fileSize." kb"; 
			//echo "File Type :".$fileType; 
			 $data = array(

			'credit_manager_id' =>$credit_manager_user_id,
			'application_number' =>$application_number,
			'fi_status' =>$fi_status ,
			'fi_comment' =>$fi_comment ,
            'fi_file_path' =>$uploadPath,
			'fi_file_name'=>$newFileName
		     );
			 
			 
			 
				$check_existing_entry= $this->credit_manager_user_model->check_fi_details($application_number, $credit_manager_user_id);
				if(isset($check_existing_entry))
				{
					$result = $this->credit_manager_user_model->update_fi_details($application_number, $credit_manager_user_id,$data);
					$this->session->set_flashdata('success', 'Data updated successfully');
					redirect("credit_manager_user/View_FI_details?ID=$application_number");
				}
				else
				{
					$result = $this->credit_manager_user_model->fi_details($data);
					$this->session->set_flashdata('success', 'Data added successfully');
					redirect("credit_manager_user/View_FI_details?ID=$application_number");
				}
		 
			}	
        else
		{
			echo "error";
			
		}			
	
	}
	public function save_eligibility_non_salaried()
	{   
		 $application_number=$this->session->userdata("id"); // shows customer id
		 $credit_manager_user_id =$this->session->userdata("id1"); // shows credit manager id
		 $assessed_income_per_month=$this->input->post('assessed_income_per_month');
		 $Foir_income_50_non_sal=$this->input->post('Foir_income_50_non_sal');
		 $existing_liabilities=$this->input->post('existing_liabilities');
		 $property_value=$this->input->post('property_value');
		 $LTV_dropdown=$this->input->post('LTV_B');
		 $minimum_a_b=$this->input->post('minimum_a_b');
		 $rate_of_intrest=$this->input->post('rate_of_intrest');
		 $tenure=$this->input->post('tenure');
		 $emi=$this->input->post('emi');
		 $net_amount=$this->input->post('net_amount');
		 $Loan_amount=$this->input->post('Loan_amount');
		  $date = date('d-m-y');
		// echo $assessed_income_per_month;
		//  echo $Foir_income_50_non_sal;
		 //  echo $existing_liabilities;
		 //   echo $property_value;
			// echo $LTV_dropdown;
			//  echo $minimum_a_b;
			//   echo $rate_of_intrest;
			//    echo $tenure;
			//	 echo $emi;
			//	  echo $net_amount;
			//	   echo $Loan_amount;
				  
		// $fileName=$_FILES["file"]["name"];
		// $fileSize=$_FILES["file"]["size"]/1024;
        // $fileType=$_FILES["file"]["type"];
        // $fileTmpName=$_FILES["file"]["tmp_name"];  
		 
		// $newFileName=$fileName;
		// $uploadPath="./images/all_document_pdf/".$newFileName;		

      //   if(move_uploaded_file($fileTmpName,$uploadPath))
		 //  {
			//echo "Successful"; 
			//echo "File Name :".$newFileName; 
			//echo "File Size :".$fileSize." kb"; 
			//echo "File Type :".$fileType; 
			 $data = array(

			'credit_manager_id' =>$credit_manager_user_id,
			'application_number' =>$application_number,
			'accessed_income' =>$assessed_income_per_month ,
			'foir_@_50' =>$Foir_income_50_non_sal ,
            'existing_liabilities' =>$existing_liabilities,
			'property_value' =>$property_value,
			'lvt_b' =>$LTV_dropdown,
			'minimum_a_b' =>$minimum_a_b,
			'roi' =>$rate_of_intrest,
			'tenure' =>$tenure,
		    'emi' =>$emi,
		    'net_income' =>$net_amount,
		    'loan_amount_a' =>$Loan_amount,
		    'excel_path' =>'no file',
			'date'=>$date
		     );
			 $check_existing_entry= $this->credit_manager_user_model->check_eligibility_non_salaried_details($application_number, $credit_manager_user_id);
				if(isset($check_existing_entry))
				{
					$result = $this->credit_manager_user_model->update_eligibility_non_salaried_details($application_number, $credit_manager_user_id,$data);
					$this->session->set_flashdata('success', 'Data updated successfully');
					redirect("credit_manager_user/View_Eligibility_details?ID=$application_number");
				}
				else
				{
					$result = $this->credit_manager_user_model->save_eligibility_non_salaried_details($data);
					$this->session->set_flashdata('success', 'Data added successfully');
					redirect("credit_manager_user/View_Eligibility_details?ID=$application_number");
				}
		 
		//	}	
       // else
		// {
		//	echo "error";
			
		// }			
	
	}
	public function Sanction_dashbord()
	{ 
		$id = $this->input->get("ID"); // shows id of customer
		  $id1=$this->session->userdata("ID"); //shows id of credite manager user
		  $id2=$this->session->userdata("customer_id");
		 	 
		  
		  if($this->session->userdata("USER_TYPE") == ''){
				$data['showNav'] = 0;
				$data['error'] = '';
				$data['age'] = '';
				$data['userType'] = "none";
				//$this->load->view('header', $data);
				$this->load->view('login', $data);
			}
			else
			{
				$id = $this->input->get("ID");
				$CM_ID = $this->input->get("CM");
				$data['CM_ID'] = $CM_ID;

				if ($id == '') {
					$id = $this->session->userdata("id");
				}
				$data_row = $this->Customercrud_model->getProfileData($id);
				$data_row2= $this->Customercrud_model->getProfileData($id1);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
                $data_row_applied_loan=	$this->Customercrud_model->getCustomerLoanAppliedInfo($id);
                $data_row_sanction_form= $this->credit_manager_user_model->getSanctionFormData($id,$id1);		
				$data_row_remark = $this->credit_manager_user_model->getApprovalRemarkData_remark($id,$id1);
				$credit_analysis_data=$this->credit_manager_user_model->getCreditAnalysisData($id);
				$data_income_details=$this->credit_manager_user_model->getCustomerIncomeInfo($id);
				
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
				$data['row_2'] = $data_row2;
				$data['row_more'] = $data_row_more;
				$data['data_row_applied_loan']=$data_row_applied_loan;
				$data['row_sanction']=$data_row_sanction_form;
				$data['row_remark'] =$data_row_remark ;	
				$data['credit_analysis_data']=$credit_analysis_data;	
				$data['data_income_details']=$data_income_details;
			   //	$this->load->view('credit_manager_user/credit_sanction_loan_first_level', $data);
		        $this->load->view('credit_manager_user/Sanction_dashbord',$data);
			}
	}
		public function save_eligibility_salaried()
	{   
	
	
		 $application_number=$this->session->userdata("id"); // shows customer id
		 $credit_manager_user_id =$this->session->userdata("id1"); // shows credit manager id
		 $salary_for_the_month=$this->input->post('salary_for_the_month');
		 $type_of_salary=$this->input->post('type_of_salary');
		 $applicable_foir=$this->input->post('applicable_foir');
		 
		 $existing_liabilities=$this->input->post('existing_liabilities');
		 $property_value=$this->input->post('property_value');
		 $LTV_B_salaried=$this->input->post('LTV_B_salaried');
		 $roi=$this->input->post('roi');
		 $tenure=$this->input->post('tenure');
		 $emi_per_lakh=$this->input->post('emi_per_lakh');
		 $net_income=$this->input->post('net_income');
		 $loan_amount=$this->input->post('loan_amount');
		 $minimum_a_b=$this->input->post('minimum_a_b');
		 $date = date('d-m-y');
		 //echo $salary_for_the_month;
	   //  echo $type_of_salary;
		 // echo $applicable_foir;
		 // echo $existing_liabilities;
		//	echo $property_value;
		// echo $LTV_B_salaried;
		//	  echo $tenure;
		//	   echo $emi_per_lakh;
		//	 echo $net_income;
		//echo $loan_amount;
			//   echo $minimum_a_b;
		//	exit();	  
		// $fileName=$_FILES["file"]["name"];
		// $fileSize=$_FILES["file"]["size"]/1024;
        // $fileType=$_FILES["file"]["type"];
        // $fileTmpName=$_FILES["file"]["tmp_name"];  
		 
		// $newFileName=$fileName;
		// $uploadPath="./images/all_document_pdf/".$newFileName;		

      //   if(move_uploaded_file($fileTmpName,$uploadPath))
		 //  {
			//echo "Successful"; 
			//echo "File Name :".$newFileName; 
			//echo "File Size :".$fileSize." kb"; 
			//echo "File Type :".$fileType; 
			 $data = array(

			'credit_manager_id' =>$credit_manager_user_id,
			'application_number' =>$application_number,
			'salary_for_month' =>$salary_for_the_month ,
			'type_of_salary' =>$type_of_salary ,
            'foir_income' =>$applicable_foir,
			'existing_liabilities' =>$existing_liabilities,
			'property_value' =>$property_value,
			'lvt_b' =>$LTV_B_salaried,
			'roi' =>$roi,
			'tenure' =>$tenure,
		    'emi_per_lakh' =>$emi_per_lakh,
		    'net_income' =>$net_income,
		    'loan_amount_a' =>$loan_amount,
		    'minimum_a_b' =>'minimum_a_b',
			'excel_path' =>'no file',
			'date'=>$date
		     );
			 $check_existing_entry= $this->credit_manager_user_model->check_eligibility_salaried_details($application_number, $credit_manager_user_id);
				if(isset($check_existing_entry))
				{
					$result = $this->credit_manager_user_model->update_eligibility_salaried_details($application_number, $credit_manager_user_id,$data);
					$this->session->set_flashdata('success', 'Data updated successfully');
					redirect("credit_manager_user/View_Eligibility_details?ID=$application_number");
				}
				else
				{
					$result = $this->credit_manager_user_model->save_eligibility_salaried_details($data);
					$this->session->set_flashdata('success', 'Data added successfully');
					redirect("credit_manager_user/View_Eligibility_details?ID=$application_number");
				}
		 
		//	}	
       // else
		// {
		//	echo "error";
			
		// }			
	
	}
		public function save_rcu_report()
	{
		 $application_number     =$this->session->userdata("id"); // shows customer id
		 $credit_manager_user_id =$this->session->userdata("id1"); // shows credit manager id
	
		 $rcu_status=$this->input->post('status');
		 $rcu_comment=$this->input->post('comment');
		 $rcu_file_path=$this->input->post('file');
		 
		 $fileName=$_FILES["file"]["name"];
		 $fileSize=$_FILES["file"]["size"]/1024;
         $fileType=$_FILES["file"]["type"];
         $fileTmpName=$_FILES["file"]["tmp_name"];  
		 
		 $newFileName= $application_number.$credit_manager_user_id.$fileName;
		 $uploadPath="./images/all_document_pdf/".$newFileName;		

         if(move_uploaded_file($fileTmpName,$uploadPath))
		   {
			//echo "Successful"; 
			//echo "File Name :".$newFileName; 
			//echo "File Size :".$fileSize." kb"; 
			//echo "File Type :".$fileType; 
			 $data = array(

			'credit_manager_id' =>$credit_manager_user_id,
			'application_number' =>$application_number,
			'rcu_status' =>$rcu_status ,
			'rcu_comment' =>$rcu_comment ,
			'rcu_file_path' =>$uploadPath,
			'rcu_file_name'=>$fileName
		     );
			
			 
			    $check_existing_entry= $this->credit_manager_user_model->check_rcu_details($application_number, $credit_manager_user_id);
				if(isset($check_existing_entry))
				{
					$result = $this->credit_manager_user_model->update_rcu_details($application_number, $credit_manager_user_id,$data);
					$this->session->set_flashdata('success', 'RCU report updated successfully');
			        redirect("credit_manager_user/View_RCU_Reports_details?ID=$application_number ");
				}
				else
				{
					 $result = $this->credit_manager_user_model->save_rcu_report($data);
		     		 $this->session->set_flashdata('success', 'RCU report saved successfully');
			         redirect("credit_manager_user/View_RCU_Reports_details?ID=$application_number ");
				}	 
			 
			}
            else
		    {
			echo "error";
			
		   }			
	
	}
	
	   
	//==================================================added by priyanka 29-12-2021
	 public function pdf()
	 {
	     $id=$this->input->get("ID");
		 $id1=$this->session->userdata("id1");
         $data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
		 $data_row_applied_loan=$this->Customercrud_model->getCustomerLoanAppliedInfo($id);
		 $data_row_PD_details= $this->credit_manager_user_model->check_personal_discussion_pdf_details($id,$id1);
		 $data_row_income = $this->Customercrud_model->getProfileDataIncome($id);	
		 $data['data_row_income']=$data_row_income;
		 $data['data_row_PD_details']=$data_row_PD_details;
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
		 $data['data_row_applied_loan']=$data_row_applied_loan;
								   if(!empty($data_row_pd_table))
								   {
									 $data['data_row_pd_table'] = $data_row_pd_table;
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
          $mpdf->SetHTMLHeader($this->load->view('credit_manager_user/PD_header',$data,true));
          $mpdf->SetHTMLFooter($this->load->view('credit_manager_user/PD_footer',[],true));
          $mpdf->SetDisplayMode('fullwidth');
	      $mpdf->debug = true;
          $mpdf->AddPage('P');
          $stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
          $stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));
	      $mpdf->allow_charset_conversion = true;
          $mpdf->WriteHTML($stylesheet,1);
          $mpdf->list_indent_first_level = 0;
          $html = $this->load->view('credit_manager_user/PD_pdf',$data,true);
          $mpdf->WriteHTML($html);
          $file_name=md5(rand()).'pdf';
		  	ob_end_clean();
          $file=$mpdf->Output();
     }

	 public function PD_section_one()
	 {
        	     
		 $application_number     =$this->session->userdata("id"); // shows customer id
		 $credit_manager_user_id =$this->session->userdata("id1"); // shows credit manager id
		 $co_app = $this->Customercrud_model->getMyCoapplicants($application_number);
		 $total_coapplicants=  count($co_app);
	    //==================================================section one 
	 
	    if(isset($_POST['submit_form_1']) ) 
		{
				
		       // coapplicant json ---------------------------------
			      $customer_id = $application_number;
			      $Credit_manager_id = $credit_manager_user_id;
	              $Basic_details_array= array(
												'LeadID'=>$this->input->post('LeadID'),
												'PDDoneWith'=>$this->input->post('PDDoneWith'),
												'PrimaryProfileOfPDPerson'=>$this->input->post('PrimaryProfileOfPDPerson'),
												'PersonMet'=>$this->input->post('PersonMet'),
												'Product'=>$this->input->post('Product'),
												'Date'=>$this->input->post('Date'),
												'PDDoneby'=>$this->input->post('PDDoneby')
														 
												 );
	              $Basic_details_array_JSON = json_encode($Basic_details_array);
				  $Applicant_details_array= array(
												'applicant_name'=>$this->input->post('applicant_name'),
												'age'=>$this->input->post('age'),
												'occupation'=>$this->input->post('occupation'),
												'app_income'=>$this->input->post('app_income'),
												'email_id'=>$this->input->post('email_id'),
												'app_education'=>$this->input->post('app_education'),
												'working_since'=>$this->input->post('working_since'),
												'app_contact'=>$this->input->post('app_contact'),
												'app_alternative_contact'=>$this->input->post('app_alternative_contact')
												);
                   $Applicant_details_array_JSON = json_encode($Applicant_details_array);
				

				   $co_number = $this->input->post('co_number');
				   $co_name = $this->input->post('co_name');
				   $co_relation = $this->input->post('co_relation');
				   $co_age = $this->input->post('co_age');
				   $co_occupation = $this->input->post('co_occupation');
				   $co_income_mon_or_year = $this->input->post('co_income_mon_or_year');
				   $co_education = $this->input->post('co_education');
				   $co_staying = $this->input->post('co_staying');
				   $co_contact_no = $this->input->post('co_contact_no');
				   $co_email = $this->input->post('co_email');
				   $consider_coapplicant_as = $this->input->post('consider_coapplicant_as');
				   $count_coapp_relation = count($co_number);
				   $Coapplicant_details_array=array();
    			   for($i=0; $i<$total_coapplicants; $i++)
					{
												array_push($Coapplicant_details_array, array(
												'co_number'=>$co_number[$i],
												'co_name'=>$co_name[$i],
												'co_relation'=>$co_relation[$i],
												'co_age'=>$co_age[$i],
												'co_occupation'=>$co_occupation[$i],
												'co_income_mon_or_year'=>$co_income_mon_or_year[$i],
												'co_education'=>$co_education[$i],
												'co_staying'=>$co_staying[$i],
												'co_contact_no'=>$co_contact_no[$i],
												'co_email'=>$co_email[$i],
												'consider_coapplicant_as'=>$consider_coapplicant_as[$i],
			
			
												));	
					}
					$Coapplicant_details_array_JSON = json_encode($Coapplicant_details_array);
					$customer_details_comments=$this->input->post('customer_details_comments');
					$Applicant_family_details_array= array(
												'FamilySize'=>$this->input->post('FamilySize'),
												'NoOfDependent'=>$this->input->post('NoOfDependent'),
												'NoOfEarningMembers'=>$this->input->post('NoOfEarningMembers'),
												'ResidenceOwnership'=>$this->input->post('ResidenceOwnership'),
												'ResidenceType'=>$this->input->post('ResidenceType'),
												'stayingInSamelocation'=>$this->input->post('stayingInSamelocation'),
												'NativeOf'=>$this->input->post('NativeOf'),
												'StayingInCitySince'=>$this->input->post('StayingInCitySince')
												);
                    $Applicant_family_details_array_JSON = json_encode($Applicant_family_details_array);
				    $Applicant_family_members_array= array(
												'app_father_name'=>$this->input->post('app_father_name'),
												'app_mother_name'=>$this->input->post('app_mother_name'),
												'app_spouse_name'=>$this->input->post('app_spouse_name'),
												'app_father_contact'=>$this->input->post('app_father_contact'),
												'app_mother_contact'=>$this->input->post('app_mother_contact'),
												'app_spouse_contact'=>$this->input->post('app_spouse_contact'),
												'app_father_age'=>$this->input->post('app_father_age'),
												'app_mother_age'=>$this->input->post('app_mother_age'),
												'app_spouse_age'=> $this->input->post('app_spouse_age'),
												'app_father_earning'=>$this->input->post('app_father_earning'),
												'app_mother_earning'=>$this->input->post('app_mother_earning'),
												'app_spouse_earning'=>$this->input->post('app_spouse_earning'),
												'app_father_aliment'=>$this->input->post('app_father_aliment'),
												'app_mother_aliment'=>$this->input->post('app_mother_aliment'),
												'app_spouse_aliment'=>$this->input->post('app_spouse_aliment'),
												'app_father_medical'=>$this->input->post('app_father_medical'),
												'app_mother_medical'=>$this->input->post('app_mother_medical'),
												'app_spouse_medical'=>$this->input->post('app_spouse_medical')
				 
												 );
	                $Applicant_family_members_array_JSON = json_encode($Applicant_family_members_array);

				   $Children_name = $this->input->post('Children_name');
				   $Children_age = $this->input->post('Children_age');
				   $Children_study = $this->input->post('Children_study');
				   $Children_amount = $this->input->post('Children_amount');
				   $Children_medical = $this->input->post('Children_medical');
				   $count_Children_name = count($Children_name);
				   $Children_details_array=array();
    			   for($i=0; $i<$count_Children_name; $i++)
					{
												array_push($Children_details_array, array(
												'Children_name'=>$Children_name[$i],
												'Children_age'=>$Children_age[$i],
												'Children_study'=>$Children_study[$i],
												'Children_amount'=>$Children_amount[$i],
												'Children_medical'=>$Children_medical[$i]
												));	
					}
					$Children_details_array_JSON = json_encode($Children_details_array);
					$family_background_comments=$this->input->post('FamilyBackground');

					 $name_of_company = $this->input->post('name_of_company');
					 $Position = $this->input->post('Position');
				     $CTC = $this->input->post('CTC');
				     $vintage = $this->input->post('vintage');
					 $work_type = $this->input->post('work_type');
				     $ref_name = $this->input->post('ref_name');
				     $ref_mobile = $this->input->post('ref_mobile');
                     $count_name_of_company = count($name_of_company);
		             $past_work_array=array();
					 for($i=0; $i<$count_name_of_company; $i++)
				     {
												array_push($past_work_array, array(
												'name_of_company'=>$name_of_company[$i],
												'Position'=>$Position[$i],
												'CTC'=>$CTC[$i],
												'vintage'=>$vintage[$i],
												'work_type'=>$work_type[$i],
												'ref_name'=>$ref_name[$i],
												'ref_mobile'=>$ref_mobile[$i]
												));	
				     }
				     $past_work_array_JSON = json_encode($past_work_array);
				  	 $current_employement_array= array(
												'name_of_current_employement'=>$this->input->post('name_of_current_employement'),
												//'Constitution'=>$this->input->post('Constitution'),
												'Vintage'=>$this->input->post('Vintage'),
												'reporting_manager_name'=>$this->input->post('reporting_manager_name'),
												'product_offering'=>$this->input->post('product_offering'),
												'type_of_work'=> $this->input->post('type_of_work'),
												'position'=>$this->input->post('position'),
												'no_of_employee'=>$this->input->post('no_of_employee')
												 );
	                $current_employement_array_JSON = json_encode($current_employement_array);
					$pd_details_array=array(
												'PDAddress'=>$this->input->post('PDAddress'),
												 );
	                $pd_details_array_JSON = json_encode($pd_details_array);
					$business_details_array= array(
												'NameOfBusiness'=>$this->input->post('NameOfBusiness'),
												'NatureOfBusiness'=>$this->input->post('NatureOfBusiness'),
												//'BusinessSetUp'=>$this->input->post('BusinessSetUp'),
												//'BusinessHolderName'=>$this->input->post('BusinessHolderName'),
												'SubProfile'=>$this->input->post('SubProfile'),
												//'BusinessPlace'=> $this->input->post('BusinessPlace'),
												'IndustryExperience'=>$this->input->post('IndustryExperience'),
												'BusinessDocsVerified'=>$this->input->post('BusinessDocsVerified'),
												'Constitution'=> $this->input->post('Constitution'),
												//'Authorised_Signatory'=>$this->input->post('Authorised_Signatory'),
												'BusinessVintage'=>$this->input->post('BusinessVintage'),
												'business_offered_type'=>$this->input->post('business_offered_type'),
												'business_premises_type'=> $this->input->post('business_premises_type'),
												//'business_competition_type'=>$this->input->post('business_competition_type'),
												//'business_premises_ownership'=>$this->input->post('business_premises_ownership'),
												//'rent_of_shops'=> $this->input->post('rent_of_shops'),
												'rent_agreement'=>$this->input->post('rent_agreement'),
												'NoOfEmployees'=>$this->input->post('NoOfEmployees'),
												'salaries_of_employees'=> $this->input->post('salaries_of_employees'),
												'other_expenses'=>$this->input->post('other_expenses'),
												 );
	                $business_details_array_JSON = json_encode($business_details_array);
					$business_description_comments=$this->input->post('BusinessDescription');

					  $final_loan_amount = $this->input->post('final_loan_amount');
				     $final_roi = $this->input->post('final_roi');
					 $final_tenure = $this->input->post('final_tenure');
				    $pd_data = array(
									'customer_id' =>$application_number,
									'Credit_manager_id' => $credit_manager_user_id,
									'Lead_ID' =>$this->input->post('LeadID'),
									'Basic_details_JSON' =>$Basic_details_array_JSON,
									'Applicant_details_JSON' =>$Applicant_details_array_JSON,
									'Coapplicant_details_JSON' =>$Coapplicant_details_array_JSON,
									'customer_details_comments' =>$customer_details_comments,
									'Applicant_family_details_JSON' =>$Applicant_family_details_array_JSON,
									'Applicant_family_members_JSON' =>$Applicant_family_members_array_JSON,
									'Children_details_JSON' =>$Children_details_array_JSON,
									'family_background_comments' =>$family_background_comments,
									'past_work_json' =>$past_work_array_JSON,
									'current_employement_json' =>$current_employement_array_JSON,
									'pd_details_json' =>$pd_details_array_JSON,
									'business_details_json' =>$business_details_array_JSON,
									'business_description_comments' =>$business_description_comments,
									'final_loan_amount' =>$final_loan_amount,
									'final_roi' =>$final_roi,
									'final_tenure' =>$final_tenure,
								   );
								 $check_steps ="submit_form_1";
    	}
		//=================================================section two
		else if(isset($_POST['submit_form_2'])) 
		{
			//print_r($this->input->post('ActiveLoans'));
					 $ActiveLoans = $this->input->post('ActiveLoans');
					 $TypeofLoan = $this->input->post('TypeofLoan');
					 $LoanAmount = $this->input->post('LoanAmount');
					 $BalanceAmount = $this->input->post('BalanceAmount');
					 $EMI = $this->input->post('EMI');
				     $checkbox=$this->input->post('check_box');
					 $count_ActiveLoans  = count($ActiveLoans);
		             $edited_obligation_array=array();
					 for($i=0; $i<$count_ActiveLoans; $i++)
				     {
						array_push($edited_obligation_array, array(
						 			 'ActiveLoans'=>$ActiveLoans[$i],
									 'TypeofLoan'=>$TypeofLoan[$i],
									 'LoanAmount'=>$LoanAmount[$i],
									 'BalanceAmount'=>$BalanceAmount[$i],
									 'EMI'=>$EMI[$i],
									 'check_box'=>$checkbox[$i]
								   ));
				     }

				     $edited_obligation_array_JSON = json_encode($edited_obligation_array);
					//print_r($edited_obligation_array_JSON);
					//exit();
			          $Existing_loan_array= array(
									'number_of_loans'=>$this->input->post('number_of_loans'),
									//'existing_loans'=>$this->input->post('existing_loans'),
									//'frequency_of_payments'=>$this->input->post('frequency_of_payments'),
									//'type_of_loans'=>$this->input->post('type_of_loans'),
									//'no_of_emi'=>$this->input->post('no_of_emi'),
									'amount_of_emi'=> $this->input->post('amount_of_emi'),
									'defaults_and_bounces'=>$this->input->post('defaults_and_bounces'),
									'loan_outstanding_amount'=>$this->input->post('loan_outstanding_amount'),
									'no_of_credit_cards'=>$this->input->post('no_of_credit_cards'),
									'outstanding_credit_cards_amount'=> $this->input->post('outstanding_credit_cards_amount'),
									'handheld_loan'=>$this->input->post('handheld_loan'),
									//'additional_source_of_income'=>$this->input->post('additional_source_of_income')
									 );
	               $Existing_loan_array_JSON =json_encode($Existing_loan_array);

				  
				   $invesment_and_assets_array= array(
									'ownership_assets'=>$this->input->post('ownership_assets'),
									'type_of_assets'=>$this->input->post('type_of_assets'),
									'value_of_assets'=>$this->input->post('value_of_assets'),
									'no_of_banks'=>$this->input->post('no_of_banks'),
									'saving_habits'=>$this->input->post('saving_habits'),
									'property'=> $this->input->post('property')
									 );
	               $invesment_and_assets_array_JSON =json_encode($invesment_and_assets_array);
				  
				   $business_cash_flow_income_array= array(
									'No_of_Units_CD'=>$this->input->post('No_of_Units_CD'),
									'No_of_Units_Ass'=>$this->input->post('No_of_Units_Ass'),
									'Average_Sale_price_CD'=>$this->input->post('Average_Sale_price_CD'),
									'Average_Sale_price_Ass'=>$this->input->post('Average_Sale_price_Ass'),
									'Daily_Sales_CD'=>$this->input->post('Daily_Sales_CD'),
									'Daily_Sales_Ass'=>$this->input->post('Daily_Sales_Ass'),
									'Days_Operation_CD'=>$this->input->post('Days_Operation_CD'),
									'Days_Operation_Ass'=>$this->input->post('Days_Operation_Ass'),
									'Monthly_Sales_CD'=>$this->input->post('Monthly_Sales_CD'),
									'Monthly_Sales_Ass'=>$this->input->post('Monthly_Sales_Ass')
									 );
	               $business_cash_flow_income_array_JSON =json_encode($business_cash_flow_income_array);

				   $business_cash_flow_expences_array= array(
									'Purchase_of_Raw_Material_CD'=>$this->input->post('Purchase_of_Raw_Material_CD'),
									'Purchase_of_Raw_Material_Ass'=>$this->input->post('Purchase_of_Raw_Material_Ass'),
									'Wages_CD'=>$this->input->post('Wages_CD'),
									'Wages_Ass'=>$this->input->post('Wages_Ass'),
									'Electricity_CD'=>$this->input->post('Electricity_CD'),
									'Electricity_Ass'=>$this->input->post('Electricity_Ass'),
									'Rent_CD'=>$this->input->post('Rent_CD'),
									'Rent_Ass'=>$this->input->post('Rent_Ass'),
									'Other_EXp_CD'=>$this->input->post('Other_EXp_CD'),
									'Other_EXp_Ass'=>$this->input->post('Other_EXp_Ass'),
									'Monthly_Exp_CD'=>$this->input->post('Monthly_Exp_CD'),
									'Monthly_Exp_Ass'=>$this->input->post('Monthly_Exp_Ass'),
									'Net_Profit_CD'=>$this->input->post('Net_Profit_CD'),
									'Net_Profit_Ass'=>$this->input->post('Net_Profit_Ass'),
									'Margin_CD'=>$this->input->post('Margin_CD'),
									'Margin_Ass'=>$this->input->post('Margin_Ass')
									 );
	               $business_cash_flow_expences_array_JSON =json_encode($business_cash_flow_expences_array);
				    
				   $supplier_name = $this->input->post('supplier_name');
					  if($supplier_name!=''){ 
				  
				    $supplier_contact = $this->input->post('supplier_contact');
				     $supplier_address = $this->input->post('supplier_address');
				     $supplier_type_of_material = $this->input->post('supplier_type_of_material');
					 $count_supplier_name  = count($supplier_name);
		             $suppliers_array=array();
					 for($i=0; $i<$count_supplier_name; $i++)
				     {
						array_push($suppliers_array, array(
						 			 'supplier_name'=>$supplier_name[$i],
									 'supplier_contact'=>$supplier_contact[$i],
									 'supplier_address'=>$supplier_address[$i],
									 'supplier_type_of_material'=>$supplier_type_of_material[$i]
								   ));
				     }
				     $suppliers_array_JSON = json_encode($suppliers_array);
					}
					else
					{
						$suppliers_array_JSON='';
					}
					$Reference_type=$this->input->post('Reference_type');
					$Name=$this->input->post('Name');
					$Contact_No=$this->input->post('Contact_No');
					$additional_emi_comments=$this->input->post('additional_emi_comments');
					$count = count($Reference_type);
					$references_array=array();
			        for($i=0; $i<$count; $i++)
					{
						array_push($references_array, array(
										'Reference_type'=>$Reference_type[$i],
										'Name'=>$Name[$i],
										'Contact_No'=>$Contact_No[$i],
										'additional_emi_comments'=>$additional_emi_comments[$i],
										
				
						));	
					}
					$reference_check_JSON2 =json_encode($references_array);
                   


				   $additional_income_array= array(
									'AdditionalIncomeType'=>$reference_check_JSON2,
									
									'IncomeAmount'=>$this->input->post('IncomeAmount'),
									'Comments'=>$this->input->post('Comments'),
									'IncomeGrid'=>$this->input->post('IncomeGrid'),
									'PrimaryIncome'=>$this->input->post('PrimaryIncome'),
									'additional_income'=>$this->input->post('additional_income'),
									'TotalIncome'=>$this->input->post('TotalIncome')
									 );
	               $additional_income_array_JSON =json_encode($additional_income_array);
				  /* echo "<pre>";
				   print_r(json_decode($additional_income_array_JSON));
				   echo "</pre>";
				   $avc= json_decode($additional_income_array_JSON)->AdditionalIncomeType;
				   echo "<pre>";
				   print_r(json_decode($avc));
				   echo "</pre>";
				   echo json_decode($avc)[0]->Reference_type;
				   exit(); */
				   $geo_tagging_array= array(
									'LocationToBeTagged'=>$this->input->post('LocationToBeTagged'),
									'LocationAddress'=>$this->input->post('LocationAddress')
									 );
	               $geo_tagging_array_JSON =json_encode($geo_tagging_array);


	               $all_coapp_business_cash_flow_data=array();

	               for($i=1; $i<=$total_coapplicants; $i++)
					{
						    $coapp_business_cash_flow= array(
							'No_of_Units_CD_' => $this->input->post('No_of_Units_CD_'.$i),
							'No_of_Units_Ass_' => $this->input->post('No_of_Units_Ass_'.$i),		
							'Average_Sale_price_CD_' => $this->input->post('Average_Sale_price_CD_'.$i),
							'Average_Sale_price_Ass_' => $this->input->post('Average_Sale_price_Ass_'.$i),	
							'Daily_Sales_CD_' => $this->input->post('Daily_Sales_CD_'.$i),
							'Daily_Sales_Ass_' => $this->input->post('Daily_Sales_Ass_'.$i),
							'Days_Operation_CD_' => $this->input->post('Days_Operation_CD_'.$i),	
							'Days_Operation_Ass_' => $this->input->post('Days_Operation_Ass_'.$i),
							'Monthly_Sales_CD_' => $this->input->post('Monthly_Sales_CD_'.$i),	
							'Monthly_Sales_Ass_' => $this->input->post('Monthly_Sales_Ass_'.$i),
							'Purchase_of_Raw_Material_CD_' => $this->input->post('Purchase_of_Raw_Material_CD_'.$i),	
							'Purchase_of_Raw_Material_Ass_' => $this->input->post('Purchase_of_Raw_Material_Ass_'.$i),
							'Wages_CD_' => $this->input->post('Wages_CD_'.$i),	
							'Wages_Ass_' => $this->input->post('Wages_Ass_'.$i),
							'Electricity_CD_' => $this->input->post('Electricity_CD_'.$i),	
							'Electricity_Ass_' => $this->input->post('Electricity_Ass_'.$i),
							'Rent_CD_' => $this->input->post('Rent_CD_'.$i),	
							'Rent_Ass_' => $this->input->post('Rent_Ass_'.$i),
							'Other_EXp_CD_' => $this->input->post('Other_EXp_CD_'.$i),	
							'Other_EXp_Ass_' => $this->input->post('Other_EXp_Ass_'.$i),
							'Monthly_Exp_CD_' => $this->input->post('Monthly_Exp_CD_'.$i),	
							'Monthly_Exp_Ass_' => $this->input->post('Monthly_Exp_Ass_'.$i),
							'Net_Profit_CD_' => $this->input->post('Net_Profit_CD_'.$i),
							'Net_Profit_Ass_' => $this->input->post('Net_Profit_Ass_'.$i),
							'Margin_CD_' => $this->input->post('Margin_CD_'.$i),
							'Margin_Ass_' => $this->input->post('Margin_Ass_'.$i),
							'coapp_ID_' => $this->input->post('coapp_ID_'.$i),
							'coapp_name_' => $this->input->post('coapp_name_'.$i),
						);
						array_push($all_coapp_business_cash_flow_data, array($coapp_business_cash_flow));	
					}
				    $all_coapp_business_cash_flow_data_JSON =json_encode($all_coapp_business_cash_flow_data);
				    

    		  		$pd_data = array(	'Existing_loan_JSON' =>$Existing_loan_array_JSON,
										'invesment_and_assets_JSON' =>$invesment_and_assets_array_JSON,
										'business_cash_flow_income_JSON' =>$business_cash_flow_income_array_JSON,
										'business_cash_flow_expences_JSON' =>$business_cash_flow_expences_array_JSON,
										'suppliers_JSON' =>$suppliers_array_JSON,
										'additional_income_JSON' =>$additional_income_array_JSON,
										'geo_tagging_JSON' =>$geo_tagging_array_JSON, 
										'Edited_obligation_details_JSON' =>$edited_obligation_array_JSON,
										'all_coapp_business_cash_flow_data_JSON'=>$all_coapp_business_cash_flow_data_JSON,
									  );
								   $check_steps ="submit_form_2";

								   /*echo "<pre>";
								   print_r($pd_data);
								   echo "</pre>";
								   exit();*/
		}
		//==================================================section three
		else if(isset($_POST['submit_form_3'])) 
			{
				   $property_details_array= array(
										'residence_ownership'=>$this->input->post('residence_ownership'),
										'staying_in_city'=>$this->input->post('staying_in_city'),
										'age_of_property'=>$this->input->post('age_of_property'),
										'customer_no_of_years_stay'=>$this->input->post('customer_no_of_years_stay'),
										'document_varified_to_validate'=>$this->input->post('document_varified_to_validate'),
										'type_of_property'=>$this->input->post('type_of_property'),
										'govt_scheme'=>$this->input->post('govt_scheme'),
										'no_of_rooms'=>$this->input->post('no_of_rooms'),
										'area_of_house'=>$this->input->post('area_of_house'),
										'Ancestral_property'=>$this->input->post('Ancestral_property'),
										'no_of_people_staying_in_house'=>$this->input->post('no_of_people_staying_in_house'),
										'name_plate_name'=>$this->input->post('name_plate_name'),
										'checked_with_security'=>$this->input->post('checked_with_security'),
										'remark_on_upkeep'=>$this->input->post('remark_on_upkeep'),
										'upkeep_of_house'=>$this->input->post('upkeep_of_house'),
										'neighbours_check'=>$this->input->post('neighbours_check'),
										'name_of_neighbour'=>$this->input->post('name_of_neighbour'),
										'relative_check'=>$this->input->post('relative_check'),
										'name_of_relative'=>$this->input->post('name_of_relative'),
										'assement_remark'=>$this->input->post('assement_remark'),
										'collateral_info'=>$this->input->post('collateral_info'),
										 );
					 $property_details_array_JSON =json_encode($property_details_array);

					 $invesment_details_array= array(
										'Insurance'=>$this->input->post('Insurance'),
										'MutualFunds'=>$this->input->post('MutualFunds'),
										'FD'=>$this->input->post('FD'),
										'Jewellery'=>$this->input->post('Jewellery'),
										'Property'=>$this->input->post('Property'),
										'Property_value'=>$this->input->post('Property_value'),
										'ChitFund'=>$this->input->post('ChitFund'),
										'RD'=>$this->input->post('RD')
										 );
					$invesment_details_array_JSON =json_encode($invesment_details_array);
			
					$Reference_type=$this->input->post('Reference_type');
					$Name=$this->input->post('Name');
					$Contact_No=$this->input->post('Contact_No');
					$Relation=$this->input->post('Relation');
					$KnownSince=$this->input->post('KnownSince');
					$Verification_Status=$this->input->post('Verification_Status');
					$Brief_on_Reference=$this->input->post('Brief_on_Reference');

					$count = count($Reference_type);
					$references_array=array();
			        for($i=0; $i<$count; $i++)
					{
						array_push($references_array, array(
										'Reference_type'=>$Reference_type[$i],
										'Name'=>$Name[$i],
										'Contact_No'=>$Contact_No[$i],
										'Relation'=>$Relation[$i],
										'KnownSince'=>$KnownSince[$i],
										'Verification_Status'=>$Verification_Status[$i],
										'Brief_on_Reference'=>$Brief_on_Reference[$i]
				
						));	
					}
					$end_use_of_loan=$this->input->post('end_use_of_loan');
					$reference_check_JSON =json_encode($references_array);
                    $pd_data = array(
										'property_details_JSON' =>$property_details_array_JSON,
										'invesment_details_JSON' =>$invesment_details_array_JSON,
										'reference_check_JSON' =>$reference_check_JSON,
										'PD_Status_of' =>$this->input->post('PDStatusOf'),
										'Overall_PD_Status' =>$this->input->post('OverallPDStatus'),
										'PD_STATUS' =>'Completed',
										'end_use_of_loan' =>$end_use_of_loan,

										
										'Land_value' =>$this->input->post('Land_value'),
										'Construction_value' =>$this->input->post('Construction_value'),
										'Agreement_value' =>$this->input->post('Agreement_value'),
										'Total_Value' =>$this->input->post('Total_Value'),
									    'LTV' =>$this->input->post('LTV'),
									  );
					$check_steps ="submit_form_3";

						        $array_customer_more_details = array(
								'CUST_ID'  =>$application_number,
								'STATUS'  =>'PD Completed'
								);
								$Result_id1 = $this->Customercrud_model->update_customer_more_details($application_number, $array_customer_more_details);
					$array_input_more2 = array(
												'PD_completed_date'=>date("Y/m/d")
															);
							
				    $Result_id2 = $this->Customercrud_model->update_profile($application_number,$array_input_more2);



                  //============== last updated date added on 23-04-2022
                 
				  $array_input_more3 = array(
											'CUST_ID' => $application_number,
											'STATUS'=>('PD Completed'),
											'last_updated_date'=>date("Y/m/d")
											);
				$result_id1 = $this->Customercrud_model->update_profile_more($application_number, $array_input_more3);
                 //--------------------------------------------------------------------------------------

		    }
		        $this->session->set_userdata("check_steps",$check_steps);
		       // $check_existing_entry= $this->credit_manager_user_model->check_personal_discussion_pdf_details($application_number,$credit_manager_user_id);
				$check_existing_entry= $this->credit_manager_user_model->check_personal_discussion_pdf_details($application_number);
			   if(isset($check_existing_entry))
				{
					$get_existing_entry= $this->credit_manager_user_model->getPDData($application_number);
			    	if($get_existing_entry->Credit_manager_id == $credit_manager_user_id)
					{
						 $result = $this->credit_manager_user_model->update_personal_discussion_pdf_details($application_number,$credit_manager_user_id,$pd_data);
     					 redirect("credit_manager_user/View_Personal_Disussion_details?ID=$application_number");
					}
					else
					{
						 redirect("credit_manager_user/View_Personal_Disussion_details?ID=$application_number");
					}
			   
				}
				else
				{   
					     $result = $this->credit_manager_user_model->save_personal_discussion_pdf_details($pd_data);
  						 redirect("credit_manager_user/View_Personal_Disussion_details?ID=$application_number");
				}
	 }
	 
	 public function view_cloud_file($fileid)
	 {
		 $user = $this->Customercrud_model->get_pd_images($fileid);

						$documentname = $user->doc_cloud_dir.$user->doc_cloud_name;

						$pathname = "cloudfile/".$user->doc_cloud_name;
				
				 $downloadfile = " curl -X GET -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$documentname."  --output ".$pathname." ";

 exec($downloadfile);
$url = base_url().$pathname;
          redirect($url, 'refresh');
		 
	 }
	 
	 public function upload_documents()
	 {
		 //print_r($fd);

		// echo $this->input->post('customer_id');
		// exit();
		 $images_from = $this->input->post('step_one_images');
		 if($images_from == 'step_one_images')
		 {
            $images_from_ = "step_one_images";
		 }
		 else if($images_from == 'step_two_images')
		 {
            $images_from_ = "step_two_images";
		 }
		 else if($images_from == 'step_three_images')
		 {
            $images_from_ = "step_three_images";
		 }

		 $application_number     =$this->session->userdata("id"); // shows customer id
		 $credit_manager_user_id =$this->session->userdata("id1"); // shows credit manager id

		 $fileName=$_FILES["file"]["name"];
		 $fileSize=$_FILES["file"]["size"]/1024;
         $fileType=$_FILES["file"]["type"];
		 $ext = end((explode(".", $fileName)));
         $fileTmpName=$_FILES["file"]["tmp_name"];  

		// echo $ext ;
		// exit();


		// if( $fileType=='application/pdf' || $fileType=='application/octet-stream' || $fileType='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || $fileType=='application/vnd.openxmlformats-officedocument.wordprocessingml.document' )
		/* {
			
			    $file_error="file type not allowed";
			 	$check_steps= "submit_form_3";
				$this->session->set_userdata("check_steps",	$check_steps);
			    $this->session->set_userdata("file_error",$file_error);
				redirect("credit_manager_user/View_Personal_Disussion_details?ID=$application_number");*/
		// }
		// else 
		// {
			 
		 $time = time();
		 $newFileName = $time.".".$ext; 
		// $newFileName=$time.$fileextension;
        //echo  $newFileName;
		//exit;
		 $uploadPath="./images/all_document_pdf/".$newFileName;		

         if(move_uploaded_file($fileTmpName,$uploadPath))
		   {
			  	$check_steps= "submit_form_3";
				$this->session->set_userdata("check_steps",	$check_steps);
            	 
					 $data = array(
						'customer_id' =>$application_number ,
						'Credit_manager_id	' => $credit_manager_user_id,
						'DOC_TYPE' =>$images_from_,
						'DOC_NAME' =>$newFileName ,
						'DOC_FILE_TYPE' =>$fileType,
						'DOC_FILE_PATH' =>$uploadPath
						 );
				$result = $this->credit_manager_user_model->update_pd_images($data);
				 $file_error="allowed";
				 $this->session->set_userdata("file_error",$file_error);
				redirect("credit_manager_user/View_Personal_Disussion_details?ID=$application_number");
		   }
		   else
		   {
			   echo "error";
			   exit();
		   }


		// }

		
		
	 }
	
	 public function upload_documents3()
	 {
		//print_r($fd);

		// echo $this->input->post('customer_id');
		// exit();
		 $images_from = $this->input->post('step_one_images');
		 if($images_from == 'step_one_images')
		 {
            $images_from_ = "step_one_images";
		 }
		 else if($images_from == 'step_two_images')
		 {
            $images_from_ = "step_two_images";
		 }
		 else if($images_from == 'step_three_images')
		 {
            $images_from_ = "step_three_images";
		 }

		 $application_number     =$this->session->userdata("id"); // shows customer id
		 $credit_manager_user_id =$this->session->userdata("id1"); // shows credit manager id
		 
		 $dir = $application_number."/";

		 	$time = time();
						/* code to export files to Nextcloud starts here */
						

				/*		$fileextensionarr = explode(".",$_FILES["file"]["name"]);

						$fileextension = $fileextensionarr[1];
						
						$filename = $time.".".$fileextension;


			  $correcturl = "curl -X PUT -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$filename." -T ".$_FILES["file"]["tmp_name"]."";

 exec($correcturl);
 */
 
 $fileextensionarr = explode(".",$_FILES["file"]["name"]);

						$fileextension = $fileextensionarr[1];
						
						$filename = $time.".".$fileextension;
						
						$dirname = "Finaleap/customers/";
						
						$dirname = "Finaleap/customers/";

						$filenamewithdir = $dirname.$filename;

			  $correcturl = "curl -X PUT -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["file"]["tmp_name"]."";

 exec($correcturl);

 /* code to upload file ends here */

		 $fileName=$_FILES["file"]["name"];
		 $fileSize=$_FILES["file"]["size"]/1024;
         $fileType=$_FILES["file"]["type"];
         $fileTmpName=$_FILES["file"]["tmp_name"];  

		 //echo $fileType ;
		// exit();


		// if( $fileType=='application/pdf' || $fileType=='application/octet-stream' || $fileType='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || $fileType=='application/vnd.openxmlformats-officedocument.wordprocessingml.document' )
		/* {
			
			    $file_error="file type not allowed";
			 	$check_steps= "submit_form_3";
				$this->session->set_userdata("check_steps",	$check_steps);
			    $this->session->set_userdata("file_error",$file_error);
				redirect("credit_manager_user/View_Personal_Disussion_details?ID=$application_number");*/
		// }
		// else 
		// {
			 
		      
		 $newFileName=$fileName;

		 $uploadPath="./images/all_document_pdf/".$newFileName;		

         //if(move_uploaded_file($fileTmpName,$uploadPath))
			if(true)
		   {
			  	$check_steps= "submit_form_3";
				$this->session->set_userdata("check_steps",	$check_steps);
            	 

					

					 $data = array(
						'customer_id' =>$application_number ,
						'Credit_manager_id	' => $credit_manager_user_id,
						'DOC_TYPE' =>$images_from_,
						'DOC_NAME' =>$fileName ,
						'DOC_FILE_TYPE' =>$fileType,
						'DOC_FILE_PATH' =>$uploadPath,
						 'doc_cloud_name' => $filename,
						'doc_cloud_dir' => $dirname
						 );
				$result = $this->credit_manager_user_model->update_pd_images($data);
				 $file_error="allowed";
				 $this->session->set_userdata("file_error",$file_error);
				redirect("credit_manager_user/View_Personal_Disussion_details?ID=$application_number");
		   }
		   else
		   {
			   echo "error";
			   exit();
		   }


		// }

		
		
	
	 }

	 public function delete_documents()
	 {
		 $id = $this->input->get('id');
		 
		 $application_number     =$this->session->userdata("id"); // shows customer id
		 $credit_manager_user_id =$this->session->userdata("id1"); // shows credit manager id
		 $result = $this->credit_manager_user_model->delete_photo($id);
		 if( $result == 1 )
		 {
			 echo "deleted successfully";
			   $check_steps ="submit_form_3";
			       $this->session->set_userdata("check_steps",$check_steps);
			
			  redirect("credit_manager_user/View_Personal_Disussion_details?ID=$application_number");
		 }
		 else
		 		
		{
			 echo "error";
			  redirect("credit_manager_user/View_Personal_Disussion_details?ID=$application_number");
		}
	 }
/*-----------------------------------------Added by papiha on 02_03_2022--------------------------------------------------------------------*/
public function dsa()
 {
       
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
			 if ($s == '') {
                $s= 'all';
            }
			if ($s == 'Complete') {
                $s = 'Complete';
            }
			if ($s == 'Incomplete') {
                $s = 'Incomplete';
            }
			if ($s == 'city') {
                $s = 'city';
            }
            $bank = $this->input->get('bnk_name');
			$city = $this->input->get('city_name');
            $dsa_arr = $this->Admin_model->getDsaList($id, $filter, $userType, $userType2, $date,$bank);
            $data['row']=$this->Customercrud_model->getProfileData($id);          
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
            $this->load->view('admin/dsa', $data);   
          
    }
	/*---------------------------------------Added by papiha on 09_03_2022-------------------------------------------------*/
	public function View_KVC_documents()
	{
		
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
		  $applicant_details=$this->Customercrud_model->getProfileData($id);
		  $Get_Doc_Master_Type=$this->Customercrud_model->Get_Doc_Master_Type($id);
		  $applicant_documents = json_decode(json_encode($applicant_details),true);
		  array_push($applicant_documents,$data_row);
		  array_push($applicant_documents,$Get_Doc_Master_Type);
		 
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
			  /*$Combine_Customers=array();
			  $coapplicant_documents = json_decode(json_encode($coapplicant),true);
			  
			  
			 
			   $Get_Doc_Master_Type_Coapps=$this->Customercrud_model->Get_Doc_Master_Type($coapplicant->UNIQUE_CODE);
			   $Get_Doc_Master_Type_Coapp = json_decode(json_encode($Get_Doc_Master_Type_Coapps));
			   
										  
										  array_push($array4,$Get_Doc_Master_Type_Coapp);*/
										  
			   
			   
			  array_push($Get_Doc_Master_Type_Coapplicant_Documents,$coapplicant_documents_all);
			  
		  }
		  
		  /*Foreach ($Get_Doc_Master_Type AS $Master)
		  {
				 echo $Master->DOC_MASTER_TYPE;
		  }
		  exit;*/
		 
		  /*Foreach ($Get_Doc_Master_Type AS $Master)
		  {
			$Get_documert_masterwise=$this->Customercrud_model->Get_documert_masterwise($id,$Master->DOC_MASTER_TYPE);
			echo $Master->DOC_MASTER_TYPE;
			if($Get_documert_masterwise['DOC_MASTER_TYPE']==$Master->DOC_MASTER_TYPE)
			{
				echo $data_row->DOC_MASTER_TYPE;
			  }
		  }
		  exit;*/
		  $doc_type_user = 2;
		  if($u_type == 'CUSTOMER')$doc_type_user = 1;
		  //$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user);
		  $this->load->helper('url');
		  $age = $this->session->userdata('AGE');
		  $q = 1;
		  if($u_type == 'DSA')$q = 2;
		  $main_doc_row = $this->Customercrud_model->getMainDocumentsCount($q);
		  $saved_doc_row = $this->Customercrud_model->getSavedDocumentsCount_KYC($id);
		  if($saved_doc_row->doc_count==$main_doc_row->doc_count){
			  $age = 1;
		  }else $age = 0;
		  $data['showNav'] = $age;
		  $data['age'] = $age;
		  $data['error'] = '';
		  $data['id'] = $id;
		  $data['userType'] = $u_type;
		  $data['documents'] = $data_row;
		  $data['error'] = $this->input->get('error');
		  $data['CM_ID']=$this->session->userdata("id");
		  $data['Get_Doc_Master_Type']=$applicant_documents;
		  $data['Coapplicant_Doacuments']=$Get_Doc_Master_Type_Coapplicant_Documents;
		
		  //$data['documents_type'] = $data_doctype;
		 // $this->load->view('credit_manager_user/header2', $data);
		  		$this->load->view('credit_manager_user/Sanction_dashbord', $data); 
	      
		  $this->load->view('credit_manager_user/View_Documents',$data); 
		  //$this->load->view('credit_manager_user/customer_view_profile_3', $data);
		  }
		
	}
		/*---------------------------------------- Added by papiha on 14-03-2022-------------------------------------------*/
	/*---------------------------------------- Added by papiha on 14-03-2022-------------------------------------------*/
			
	public function Send_TO_Legal()
	{
		
		 $Application_ID = $this->input->get('ID');
		 $uid = $this->session->userdata('ID');
		 $this->load->helper('url');
                $age = $this->session->userdata('AGE');
                $data['showNav'] = 1;
                $data['age'] = $age;
                $data['userType'] = $this->session->userdata("USER_TYPE");
                //$this->load->view('header', $data);
              	$data['banks']=$this->Customercrud_model->get_banks();
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
                
                $data['cust_info']=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_ID);
				
				$data['Legal_docs']=$this->Legal_model->get_legal_docs($Application_ID);
				
				
				$data['uid']= $uid;
                $data ['Legals']=$this->Legal_model->getLegals();
                $this->load->view('dashboard_header', $data);
                $this->load->view('credit_manager_user/Send_To_Legal', $data);
				
	}	
		public function customers_pd()
		{
			if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER'){
				redirect(base_url('index.php/login'));
			}else{
				$id = $this->input->get('id');
				$Cust_id=$this->session->set_userdata('Cust_id');
				if($id == '')
				$id = $this->session->userdata('ID');
	
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
				 $data_row = $this->credit_manager_user_model->getProfileData($id);
				
				//$customers = $this->credit_manager_user_model->getCustomers_for_pd($filter,$date);
				
				
				$age = $this->session->userdata('AGE');
				$arr['data_row']=$data_row;
				$data['showNav'] = 1;
				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");			
				//$this->load->view('header', $data);
	
				//echo $this->session->userdata('USER_TYPE');
				$arr['userType'] = $userType;
				//$arr['customers'] = $customers;
				
				$arr['s'] = $filter;
				$data['row']=$this->Customercrud_model->getProfileData($id);
				$this->load->view('dashboard_header', $data);
				if($this->session->userdata('USER_TYPE') =='credit_manager_user' || $this->session->userdata('USER_TYPE') == 'Cluster_credit_manager')$this->load->view('credit_manager_user/customers_for_pd', $arr);
				else if($this->session->userdata('USER_TYPE') == 'DSA')$this->load->view('dsa/customers_new', $arr);
				else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER')$this->load->view('manager/customers_new', $arr);
				else if($this->session->userdata('USER_TYPE') == 'DSA_CSR')$this->load->view('csr/customers_new', $arr);
			
			}
		}
		public function Update_Legal_user()
		{
			
			 $id=$this->input->post('id');
			 $legal_id=$this->input->post('Legal');
			 $legal_doc=$this->input->post('Legal_doc');
			 $Legal_doc_status=$this->input->post('Legal_doc_status');
			 $Loan_type=$this->input->post('Loan_type');
			 $resi_pincode=$this->input->post('resi_pincode');
			
			 $Legal_Docs_array=array();
					   for($i=0; $i<count($legal_doc); $i++)
						{
							 
			 
													array_push($Legal_Docs_array, array(
													'Doc_name'=>$legal_doc[$i],
													'status'=>$Legal_doc_status[$i],
													
													));	
						}
						
			 $data = array(
							'Legal_Id' =>  $this->input->post('Legal'),
							'Legal_name' =>$this->input->post('Legal_name'),
							'Send_to_legal_by'=>$this->input->post('User_name')
							
							 );
							
			
			
			  $result = $this->credit_manager_user_model->update_Legal_user($id,$data);
			  $Documents_Name=json_encode($Legal_Docs_array);
			  $Application_id=$this->input->post('Application_Id');
			   $data_doc = array(
							'Application_Id' => $Application_id,
							'Documents_Name' =>$Documents_Name,
							'Credit_id'=>$this->input->post('Credit_id'),
							'Legal_id'=>$this->input->post('Legal'),
							'Status'=>'Send To Legal'
							 );
			   $check_id=$this->Legal_model->get_legal_docs($Application_id);
			   
			   if(!empty($check_id))
			   {    
				   $data_doc['Status']='Revert action from credit';
				   $result_docs = $this->credit_manager_user_model->Update_Legal_Documents($Application_id,$data_doc);
				   $notification_data=['user_id'=>$this->input->post('Legal'),'notification'=>'Customer Revert Action For Customer :'.$this->input->post('name'),'status'=>'unseen'];
				   $notification=$this->Admin_model->insert_notification($notification_data); 
				}
			   else
			   {
				   
				$result_docs = $this->credit_manager_user_model->Insert_Legal_Documents($data_doc);
				$this->sendEmail_Legal($id,$legal_id,$Loan_type,$resi_pincode);
			   }
			
				if($result_docs > 0)
					{   
						$this->session->set_userdata("result", 1);
						redirect('Credit_manager_user/Send_TO_Legal?ID='.$Application_id);
						
					 }
					 else {
						$this->session->set_userdata("result",0 );
						 redirect('Credit_manager_user/Send_TO_Legal?ID='.$Application_id);
					}			
					
					
		}
		public function sendEmail_legal($Application_ID,$uid,$Loan_type,$resi_pincode)
    {
		  //echo $Application_ID;
	      $row=$this->Customercrud_model->getProfileData($uid);
		  $cust_info=$this->Customercrud_model->getProfileData($Application_ID);
		  //$cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_ID);
		 
		  $config['protocol']='smtp';
		  /*$config['smtp_host']='smtp.zoho.in';
		  $config['smtp_port']='465';
		  $config['smtp_timeout']='30';
		  $config['smtp_crypto']='ssl';
		  $config['smtp_user']='info@finaleap.com';
		  $config['smtp_pass']='skP37cnpCIq0';*/
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
		  //$code = $this->generate_uuid();
		  $from_email = "infoflfinserv@finaleap.com";
		  $this->email->from($from_email, 'Finaleap'); 

		  
			  $send_email_to_support=$row->EMAIL;
			  //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
		  
			  //$send_email_to_support='info@finaleap.com';
			  $this->email->to($send_email_to_support);
			  $this->email->subject('Customer For Legal'); 
	  
		  
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
			 </style>
			 <body>
			 <h5>Dear '.$row->FN.' '.$row->LN.'</h5><br>
			 </h6>New Customer Are Assigned To You</h6>
			 
			 <div class="container">
			  <table class="table table-bordered">
			 <thead>
			   <tr>
				 <th>Sr.No</th>
				 <th>Customer Name</th>
				 <th>Mobile No</th>
				 <th>Email</th>
				 <th>Loan Type</th>
				 <th>Property pincode <th>
			   </tr>
			 </thead>
			 <tbody>';
		 
			 $msg.= '<tr>
				 <td>'.$z.'</td>
				 <td>'.$cust_info->FN.' '.$cust_info->LN.'</td>
				 <td>'.$cust_info->MOBILE.'</td>
				 <td>'.$cust_info->EMAIL.'</td>
				 <td>'.$Loan_type.'</td>
				 <td>'.$resi_pincode.'</td>
				
				 </tr>';
			   
			 
			 $z++;
			$notification_data=['user_id'=>$row->UNIQUE_CODE,'notification'=>'New Customer Assign To you :'.$cust_info->FN.' '.$cust_info->LN,'status'=>'unseen'];
			$notification=$this->Admin_model->insert_notification($notification_data);	
		 
		 
			 
			 $z++;
	 
		 
		 $msg.='</tbody>
				</table>
				</div>
				 <br><br>
				 <h5>Best Regards,</h5>
				 <h5>Finaleap.Pvt.Ltd</h5>
				 </body>
				 </html>';
		  
		 $this->email->message($msg);
			  
		  //	$this->email->message('Dear Team ,'."\r\n\n".'Following application is accepted by - '.$HR_name."\r\n".'Name		:'.$name."\r\n".'Applied for	:'.$applied_for."\r\n".'Email ID	:'.$email."\r\n".'Mobile		:'.$mobile."\r\n".'Total Experience	:'.$total_experience."\r\n".'Applied on		:'.$date."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
			  $this->email->send();
			  
		  
    }
	function Revert_customer()
	{   
	    $USER_TYPE=$this->session->userdata('USER_TYPE');
		
		$Application_ID = $this->input->post('Application_id');
		
		$Credit_id=$this->input->post('credit_id');
		$Legal_name=$this->input->post('User_name');
		$Cust_id=$this->input->post('id');
		$Legal_doc_status=$this->input->post('Legal_doc_status');
		$cust_name=$this->input->post("name");
		$cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_ID);
		
			 $legal_doc=$this->input->post('Legal_doc');
			/*$Legal_Docs_array=array();
    			   for($i=0; $i<count($legal_doc); $i++)
					{
						 
		 
												array_push($Legal_Docs_array, array(
												'Doc_name'=>$legal_doc[$i],
												'status'=>$Legal_doc_status[$i],
												
												));	
					}
						$DocumentsName=json_encode($Legal_Docs_array);*/
		//$USER_TYPE = $this->session->userdata("USER_TYPE");
		if($USER_TYPE=='Legal')
		{
		
		        $data_doc = array(
						'Legal_status' => 'Revert From Legal',
						'Legal_comment'=>$this->input->post('Comment'),
						'Last_updated_by_Legal'=>date("d-m-Y h:i:sa")
						
						
						 );
	        $data_status['Legal_status']='Revert From Legal';
			 $result_docs1 = $this->credit_manager_user_model->Update_Legal_status($Cust_id,$data_status);
		}
		else if($USER_TYPE=='Technical')
		{
			$data_doc = array(
						'Technical_Status' => 'Revert From Technical',
						'Technical_Comment'=>$this->input->post('Comment'),
						'Technical_document_by_finaleap'=>$DocumentsName
						 );
	        $data_status['Technical_Status']='Revert From Technical';
			 $result_docs1 = $this->credit_manager_user_model->Update_Legal_status($Cust_id,$data_status);
		}
		  $row=$this->Customercrud_model->getProfileData($Credit_id);
		    $notification_data=['user_id'=>$row->UNIQUE_CODE,'notification'=>'Customer Revert From Legal:'.$cust_name,'status'=>'unseen'];
			$notification=$this->Admin_model->insert_notification($notification_data);	
			
		  $result_docs = $this->credit_manager_user_model->Update_Legal_Documents($Application_ID,$data_doc);
		// $this->Sendmail_credit($Credit_id,$Legal_name,$Cust_id,$Application_ID);	
		/*------------------------------------- Send Email To  all -------------------------------------------*/
		       if($cust_info->Location!=NULL)
			   {
		        $get_credit=$this->Operations_user_model->getcredit_by_location($cust_info->Location);
				$get_cluster=$this->Operations_user_model->getcluster_by_location($cust_info->Location);
				$get_cpa=$this->Operations_user_model->getcpa_by_location($cust_info->Location);
				$cpas=json_decode( json_encode($get_cpa), true);
				$clusters = json_decode( json_encode($get_cluster), true);
				$credits= json_decode( json_encode($get_credit), true);
				$Eamils=array();
				/*foreach($clusters as $cluster)
				{
                    //$this->sendEmail_credits($user_info,$cust_info)
					 // $EamilString=$EamilString.','.$cluster['EMAIL'];
					  array_push($Eamils,$cluster['EMAIL']);
					
				}*/
				foreach($credits as $credit)
				{
                    //$this->sendEmail_credits($user_info,$cust_info)
					 // $EamilString=$EamilString.','.$cluster['EMAIL'];
					  array_push($Eamils,$credit['EMAIL']);
					
				}
				/*foreach($cpas as $cpa)
				{
                    //$this->sendEmail_credits($user_info,$cust_info)
					 // $EamilString=$EamilString.','.$cluster['EMAIL'];
					  array_push($Eamils,$cpa['EMAIL']);
					
				}*/
				
				 //array_push($Eamils,'papiha.patil@finaleap.com');
				 //array_push($Eamils,'papiha.patil@finaleap.com','sachin.kardile@finaleap.com','arun.pawar@finaleap.com','prashant.kolhapure@finaleap.com');
			     //$send_to_emails= implode(",",$Eamils);
			}
			$send_to_emails= implode(",",$Eamils);	
			$send_to_emails=$send_to_emails.'papiha.patil@finaleap.com,sachin.kardile@finaleap.com,arun.pawar@finaleap.com,sandeep.belbhandare@finaleap.com,prashant.kolhapure@finaleap.com';
				 $this->Sendmail_all_revert_from_legal($Legal_name,$cust_info, $send_to_emails,$Application_ID);
			
		/*-------------------------- ----------------------------------------------------------------*/
		        
				if($result_docs > 0)
                {   
                    echo json_encode(1);
                 }
                 else {
					echo json_encode(0);
                   
                }
						
				
	}
	/*public function sendEmail_all_sent_to_legal($Legal_info,$cust_info,$send_to_emails)
    {
		  //echo $Application_ID;
	      //$row=$this->Customercrud_model->getProfileData($uid);
		  //$cust_info=$this->Customercrud_model->getProfileData($Application_ID);
		  //$cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_ID);
		 
		  $config['protocol']='smtp';
		  $config['smtp_host']='smtp.zoho.in';
		  $config['smtp_port']='465';
		  $config['smtp_timeout']='30';
		  $config['smtp_crypto']='ssl';
		  $config['smtp_user']='info@finaleap.com';
		  $config['smtp_pass']='skP37cnpCIq0';
		  $config['charset']='utf-8';
		  $config['newline']="\r\n";
		  $config['wordwrap'] = TRUE;
		  $config['mailtype'] = 'html';
		  $this->email->initialize($config);
		  $this->email->set_newline("\r\n");
		  //$code = $this->generate_uuid();
		  $from_email = "info@finaleap.com";
		  $this->email->from($from_email, 'Finaleap'); 

		  
			  $send_email_to_support=$send_to_emails;
			  //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
		  
			  //$send_email_to_support='info@finaleap.com';
			  $this->email->to($send_email_to_support);
			  $this->email->subject('Testing mail from system:Customer '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).' Send To Legal'); 
	  
		  
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
			 </style>
			 <body>
			 <h5>Dear Team</h5><br>
			 </h6> Customer '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).' is Send To Legal '.strtoupper($Legal_info->FN).' '.strtoupper($Legal_info->LN).' </h6>
			 
			 <div class="container">';
			
			 
		 
		 $msg.='
				</div>
				 <br><br>
				 <h5>Best Regards,</h5>
				 <h5>Finaleap.Pvt.Ltd</h5>
				 </body>
				 </html>';
		  
		 $this->email->message($msg);
			  
		  //	$this->email->message('Dear Team ,'."\r\n\n".'Following application is accepted by - '.$HR_name."\r\n".'Name		:'.$name."\r\n".'Applied for	:'.$applied_for."\r\n".'Email ID	:'.$email."\r\n".'Mobile		:'.$mobile."\r\n".'Total Experience	:'.$total_experience."\r\n".'Applied on		:'.$date."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
			  $this->email->send();
			  
		  
    }*/
	public function Update_Legal_user_doc ()
	{
		if(isset($_POST['revert']))
		{
			 if($USER_TYPE=='Technical')
			{
				$this->Revert_customer_From_Technical();
			}
			else{
				$this->Revert_customer();
			}
		}
		else{
			 
			 
				 $id=$this->input->post('id');
				 $legal_id=$this->input->post('Legal');
				 $legal_doc=$this->input->post('Legal_doc');
				 $Legal_doc_status=$this->input->post('Legal_doc_status');
				 $credit_id=$this->input->post('credit_id');
				 $USER_TYPE = $this->session->userdata("USER_TYPE");
				 $Legal_name=$this->input->post("Legal_name");
				 $Technical_name=$this->input->post("Technical_name");
				 $cust_name=$this->input->post("name");
				 
				/* $Legal_Docs_array=array();
						   for($i=0; $i<count($legal_doc); $i++)
							{
								 
				 
														array_push($Legal_Docs_array, array(
														'Doc_name'=>$legal_doc[$i],
														'status'=>$Legal_doc_status[$i],
														
														));	
							}
							$Documents_Name=json_encode($Legal_Docs_array);*/
							$Application_id=$this->input->post('Application_Id');
							
							
							if($USER_TYPE=='Technical')
							{
								$data_status['Technical_Status']='Document received by Technical';
								$data_doc['Technical_Status']='Document received by Technical';
								$data_doc['Last_updated_by_technical']=date("d-m-Y h:i:sa");
							    $result_docs1 = $this->credit_manager_user_model->Update_Legal_status($id,$data_status);
								$result_docs = $this->credit_manager_user_model->Update_Legal_Documents($Application_id,$data_doc);
								$notification_data=['user_id'=>$credit_id,'notification'=>'Document received by Technical:'.$Technical_name.' '.'for customer '.$cust_name,'status'=>'unseen'];
								$notification=$this->Admin_model->insert_notification($notification_data);
							}
							else if($USER_TYPE=='Legal')
							{
								$data_status['Legal_status']='Document received by Legal';
								$data_doc['Legal_status']='Document received by Legal';
								$data_doc['Last_updated_by_Legal']=date("d-m-Y h:i:sa");
							    $result_docs1 = $this->credit_manager_user_model->Update_Legal_status($id,$data_status);
								$result_docs = $this->credit_manager_user_model->Update_Legal_Documents($Application_id,$data_doc);
								$notification_data=['user_id'=>$credit_id,'notification'=>'Document received by Legal:'.$Legal_name.' '.'for customer'.' '.$cust_name,'status'=>'unseen'];
								$notification=$this->Admin_model->insert_notification($notification_data);
							}
							 
							
								
						if($result_docs > 0)
						{   
							$this->session->set_userdata("result", 1);
						 redirect('Legal/View_Details_Customer?x='.base64_encode($Application_id));
						 }
						 else {
							$this->session->set_userdata("result",0 );
							redirect('Legal/View_Details_Customer?x='.base64_encode($Application_id));
						}	
			 }
		}
           		
	
	public function Sendmail_credit($Credit_id,$Legal_name,$Cust_id,$Application_ID)
	{
		
		  $Customer=$this->Customercrud_model->getProfileData($Cust_id);
		  $Credit=$this->Customercrud_model->getProfileData($Credit_id);
		  $Appication_info=$this->Legal_model->get_legal_docs($Application_ID);
		  $config['protocol']='smtp';
		  /*$config['smtp_host']='smtp.zoho.in';
		  $config['smtp_port']='465';
		  $config['smtp_timeout']='30';
		  $config['smtp_crypto']='ssl';
		  $config['smtp_user']='info@finaleap.com';
		  $config['smtp_pass']='skP37cnpCIq0';*/
		  $config['smtp_host']='smtp-relay.sendinblue.com';
          $config['smtp_port']='587';
          $config['smtp_crypto']='tls';
          $config['smtp_user']='flconnect@finaleap.com';
          $config['smtp_pass']='Qns9hEpIMJVwUFgZ'; 
		  $config['charset']='utf-8';
		  $config['newline']="\r\n";
		  $config['wordwrap'] = TRUE;
		  $config['mailtype'] = 'html';
		  $this->email->initialize($config);
		  $this->email->set_newline("\r\n");
		  //$code = $this->generate_uuid();
		  $from_email = "infoflfinserv@finaleap.com";
		  $this->email->from($from_email, 'Finaleap'); 
 
		  
			  $send_email_to_support=$Credit->EMAIL;
			  //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
		  
			  //$send_email_to_support='info@finaleap.com';
			  $this->email->to($send_email_to_support);
			  $this->email->subject('Revert customer From     '.$Legal_name); 
	  
		  
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
			 </style>
			 <body>
			 <h5>Dear '.$Credit->FN.' '.$Credit->LN.'</h5><br>
			 </h6>Customer '.$Customer->FN.' '.$Customer->LN.' '.'is revert From '.$Legal_name .' Reson is Mention below</h6><br>Reson : ';
			
		 
			 $msg.=$Appication_info->Comment; 
		 
		
		 
		 $this->email->message($msg);
		    $notification_data=['user_id'=>$Credit->UNIQUE_CODE,'notification'=>'Customer Revert :'.$Customer->FN.' '.$Customer->LN,'status'=>'unseen'];
			$notification=$this->Admin_model->insert_notification($notification_data);	
			  
		  //	$this->email->message('Dear Team ,'."\r\n\n".'Following application is accepted by - '.$HR_name."\r\n".'Name		:'.$name."\r\n".'Applied for	:'.$applied_for."\r\n".'Email ID	:'.$email."\r\n".'Mobile		:'.$mobile."\r\n".'Total Experience	:'.$total_experience."\r\n".'Applied on		:'.$date."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
			  $this->email->send();
	}
	/*public function view_Legal_docs()
	{
		 $Applicatio_id=$_GET['ID'];
		 $UNIQUE_CODE=$_GET['UNIQUE_CODE'];
		 $fileList = glob("./images/Legal_Documents/".$Applicatio_id.'/*');
		
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
				$this->load->view('dashboard_header', $data);
                $this->load->view('credit_manager_user/view_legal_doc', $data);
				
	}*/
	/*---------------------------------- Addded by papiha on 22_04_2022---------------------------------------------------------------*/
	
	

	
	public function delete_doc()
	{
			
			
			$id = $this->input->get("UID");
			
			$doc_id=$this->input->post('id');
			$form_id = $this->input->post('form_id');
			$application_id=base64_encode($id);
			$array_input = array(
				'id' => $this->input->post('id')		
			);	
			$get_document_for_delete=$this->credit_manager_user_model->get_document_by_id($doc_id);
			
			 unlink($get_document_for_delete->path);
	
			$result = $this->credit_manager_user_model->delete_doc($array_input);
			if($result > 0)
			{
				 $this->session->set_userdata("delelet_doc", 1);
				 redirect('Credit_manager_user/Vendors?x='.$application_id);
			}
			
	}
	/*----------------------- added by papiha on 23_04_2022-----------------------------------------------*/
	public function sendEmail_all_sent_to_legal($Legal_info,$cust_info,$send_to_emails,$Application_id)
    {
		  //echo $Application_ID;
	      //$row=$this->Customercrud_model->getProfileData($uid);
		  //$cust_info=$this->Customercrud_model->getProfileData($Application_ID);
		  //$cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_ID);
		 
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
		  //$code = $this->generate_uuid();
		//  $from_email = "infoflfinserv@finaleap.com";
		  $this->email->from($from_email, 'Finaleap'); 

		  
			  $send_email_to_support=$send_to_emails;
			  //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
		  
			  //$send_email_to_support='info@finaleap.com';
			  $this->email->to($send_email_to_support);
			 // $this->email->subject('Testing mail from system:Customer '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).' Send To Legal'); 
			
			 $this->email->subject('Legal Report Request Initiated ----'.$Application_id.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).' Send To Legal'); 
	  
		  
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
						  <p style="font-size:12px;"> This is to inform you that Legal Report Request has initiated for Mr/Mrs. <b>'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'</b> </p>
						  <p style="font-size:12px;">Please keep track and visit our portal for future reference.</p>';
						 
			  
						  
						  
						 
						  
					  
					  $msg.='
							 </div>
							  
							  <p style="font-size:12px;">Warm Regards,</p>
							  <p style="font-size:12px;">Team Finaleap </p>
							  </body>
							  </html>';
		  
		 $this->email->message($msg);
			  
		  //	$this->email->message('Dear Team ,'."\r\n\n".'Following application is accepted by - '.$HR_name."\r\n".'Name		:'.$name."\r\n".'Applied for	:'.$applied_for."\r\n".'Email ID	:'.$email."\r\n".'Mobile		:'.$mobile."\r\n".'Total Experience	:'.$total_experience."\r\n".'Applied on		:'.$date."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
			  $this->email->send();
			  
		  
    }
	/*-------------------------------------------- added by papiha on 23_04_2022-----------------------------------------------------*/
	public function Sendmail_all_revert_from_legal($Legal_name,$cust_info,$send_to_emails,$Application_ID)
	{
		
		 // $Customer=$this->Customercrud_model->getProfileData($Cust_id);
		 // $Credit=$this->Customercrud_model->getProfileData($Credit_id);
		  $Appication_info=$this->Legal_model->get_legal_docs($Application_ID);
		  /*$config['protocol']='smtp';
		  $config['smtp_host']='smtp.zoho.in';
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
		  $config['mailtype'] = 'html';
		  $this->email->initialize($config);
		  $this->email->set_newline("\r\n");
		  //$code = $this->generate_uuid();
		  $from_email = "infoflfinserv@finaleap.com";
		  $this->email->from($from_email, 'Finaleap'); 
 
		  
			  $send_email_to_support=$send_to_emails;
			  //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
		  
			  //$send_email_to_support='info@finaleap.com';
			  $this->email->to($send_email_to_support);
			 // $this->email->subject('Testing mail from system:Revert customer From '.$Legal_name); 
			 $this->email->subject('Alert : Query Raised ---- Legal Report  ----'.$Application_ID.' ---- '.$cust_info->FN.' '.$cust_info->LN);
	  
		  
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
						  <p style="font-size:12px;">This is to inform you that Legal Report request has been on hold due to queries raised by agency in the case of Mr/Mrs. <b>'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'</b> </p>
						  <p style="font-size:12px;">Please reslove the queries as early as possible for further process.</p>';
						 
			  
						  
						  
						 
						  
					  
					  $msg.='
							 </div>
							  
							  <p style="font-size:12px;">Warm Regards,</p>
							  <p style="font-size:12px;">Team Finaleap </p>
							  </body>
							  </html>';
		 
		
		 
		 $this->email->message($msg);
		  
			  
		  //	$this->email->message('Dear Team ,'."\r\n\n".'Following application is accepted by - '.$HR_name."\r\n".'Name		:'.$name."\r\n".'Applied for	:'.$applied_for."\r\n".'Email ID	:'.$email."\r\n".'Mobile		:'.$mobile."\r\n".'Total Experience	:'.$total_experience."\r\n".'Applied on		:'.$date."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
			  $this->email->send();
	}
	public function customer_revert_action_to_all($legal_info,$cust_info, $send_to_emails,$Application_id)
	{
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
		  $config['mailtype'] = 'html';
		  $this->email->initialize($config);
		  $this->email->set_newline("\r\n");
		  //$code = $this->generate_uuid();
		  $from_email = "infoflfinserv@finaleap.com";
		  $this->email->from($from_email, 'Finaleap'); 

		  
			  $send_email_to_support=$send_to_emails;
			  //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
		  
			  //$send_email_to_support='info@finaleap.com';
			  $this->email->to($send_email_to_support);
			 // $this->email->subject('Testing mail from system:Revert Action Taken For Customer '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
			 $this->email->subject('Alert : Query Resolved ----- Legal Report ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	  
		  
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
				 body {
					font-family: Arial, sans-serif;
				  }
							  </style>
							  <body>
							  <p style="font-size:12px;">Dear Sir / Ma’am,</p>
							  <p style="font-size:12px;">This is to inform you that  queries raised on the Legal Report of Mr/Mrs. <b>'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'</b>has been successfully resolved.</b> </p>';
							  
							 
				  
							  
							  
							 
							  
						  
						  $msg.='
								 </div>
								  
								   <p style="font-size:12px;">Warm Regards,</p>
				                   <p style="font-size:12px;">Team Finaleap </p>
								  </body>
								  </html>';
		  
		 $this->email->message($msg);
			  
		  //	$this->email->message('Dear Team ,'."\r\n\n".'Following application is accepted by - '.$HR_name."\r\n".'Name		:'.$name."\r\n".'Applied for	:'.$applied_for."\r\n".'Email ID	:'.$email."\r\n".'Mobile		:'.$mobile."\r\n".'Total Experience	:'.$total_experience."\r\n".'Applied on		:'.$date."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
			  $this->email->send();
	}
	function do_upload_Legal_doc_legal()
	{
		if(isset($_POST['upload']))
		{
			$Application_id = $this->input->post('Application_Id');
			$unique_code=$this->input->post('unique_code');
			$Doc_type = $this->input->post('Legal_doc');
			$form_id = $this->input->post('form_id');
			//$_SESSION['form_id']=$form_id;
			$ID=$this->session->userdata('ID');
			$u_type = $this->session->userdata("USER_TYPE");
			$count = count($_FILES['userfile']['name']);

			
			    for($i=0;$i<$count;$i++)
						 {
							 //$file_name = $_FILES["userfile"]['name'][$i];
							//$file_name = time().".".pathinfo($file_name, PATHINFO_EXTENSION);
							//$file_name = str_replace(' ', '', $file_name);
							//$file_type = $_FILES["userfile"]['type'][$i];
							//$file_size = $_FILES["userfile"]['size'][$i];
							  $_FILES['file']['name'] = $_FILES['userfile']['name'][$i];
							  $_FILES['file']['name'] = time().$i.".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
							  $_FILES['file']['name'] = str_replace(' ', '', $_FILES['file']['name']);
							  $_FILES['file']['type'] = $_FILES['userfile']['type'][$i];
							  $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
							  $_FILES['file']['error'] = $_FILES['userfile']['error'][$i];
							  $_FILES['file']['size'] = $_FILES['userfile']['size'][$i];
								$config = array(
									'upload_path' => "./images/Legal_Documents/".$Application_id,
									'allowed_types' => "gif|jpg|png|jpeg|pdf",
									'overwrite' => TRUE
								);

							$config['file_name'] = $_FILES['file']['name'];
							$config['image_type'] = $_FILES['file']['type'];
							$config['file_size'] = $_FILES['file']['size'];
							

							$this->upload->initialize($config);
							$upload_data = $this->upload->data();
							$file_input_arr = array(
								'Application_id' => $Application_id,
								'Doc_name' =>'',	
								'path' =>"./images/Legal_Documents/".$Application_id."/".$_FILES['file']['name'],
								'User'=>$u_type,
								'Send_to'=>'CPA',
							'doc_cloud_name' => $filename
								
							);

							 $this->session->set_userdata("result", 1);
										 $this->credit_manager_user_model->saveDocuments($file_input_arr);
										 redirect('Legal/Send_Documents?x='.base64_encode($Application_id).'&y='.base64_encode($ID));
							
						/*	if (!file_exists('./images/Legal_Documents/'.$Application_id) ){   
								 mkdir('./images/Legal_Documents/'.$Application_id);
									if($this->upload->do_upload('file'))
									{
										 $this->session->set_userdata("result", 1);
										 $this->credit_manager_user_model->saveDocuments($file_input_arr);
										 redirect('Legal/Send_Documents?x='.base64_encode($Application_id).'&y='.base64_encode($ID));
										
									}
									else
									{
										
									}
								}
								else
								{
									if($this->upload->do_upload('file'))
									{
										    $this->session->set_userdata("result", 1);
											 $this->credit_manager_user_model->saveDocuments($file_input_arr);
                                             redirect('Legal/Send_Documents?x='.base64_encode($Application_id).'&y='.base64_encode($ID));										 
									}
									else{
									
									}
								}

								*/
						 }
			}
		
	}
	public function delete_doc_legal()
	{
			
			
			$id = $this->input->get("UID");
			
			$doc_id=$this->input->post('id');
			$form_id = $this->input->post('form_id');
			$unique_code=$this->input->post('unique_code');
			$application_id=base64_encode($id);
			$array_input = array(
				'id' => $this->input->post('id')		
			);	
			$get_document_for_delete=$this->credit_manager_user_model->get_document_by_id($doc_id);
			
			 unlink($get_document_for_delete->path);
	
			$result = $this->credit_manager_user_model->delete_doc($array_input);
			if($result > 0)
			{
				 $this->session->set_userdata("result", 2);
				 redirect('Legal/Send_Documents?x='.$application_id.'&y='.$unique_code);
			}
			
	}
	public function view_Legal_docs()
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
                $this->load->view('credit_manager_user/view_legal_doc', $data);
	}
	public function customer_revert_from_finaleap($legal_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment)
	{
		
		  $Appication_info=$this->Legal_model->get_legal_docs($Application_id);
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
		  $config['mailtype'] = 'html';
		  $this->email->initialize($config);
		  $this->email->set_newline("\r\n");
		  //$code = $this->generate_uuid();
		  $from_email = "infoflfinserv@finaleap.com";
		  $this->email->from($from_email, 'Finaleap'); 

		  
			  $send_email_to_support=$legal_info->EMAIL;
			  //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
		  
			  //$send_email_to_support='info@finaleap.com';
			  $this->email->to($send_email_to_support);
			 // $this->email->subject('Testing mail from system:Revert Action Taken For Customer '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
			 $this->email->subject('Review :Legal Report ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	  
		  
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
				 body {
					font-family: Arial, sans-serif;
				  }
							  </style>
							  <body>
							  <p style="font-size:13px;">Dear Sir / Ma’am,</p>
							  <p style="font-size:13px;">Thanks you for the Legal Report  of  Mr/Mrs. <b>'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'</b>  </p>
							  <p style="font-size:13px;">However, We request you to please review the case again for below reason.</p>
							  <p style="font-size:13px;">Reason:'.$Credit_Comment.' </p>
							   <p style="font-size:13px;">Thank You in advance for consideration.</p>';
							 
				  
							  
							  
							 
							  
						  
						  $msg.='
								 </div>
								  
								   <p style="font-size:13px;">Thanks & Regards,</p>
				                   <p style="font-size:13px;">Finaleap.Pvt.Ltd </p>
								  </body>
								  </html>';
		  
		 $this->email->message($msg);
			  
		  //	$this->email->message('Dear Team ,'."\r\n\n".'Following application is accepted by - '.$HR_name."\r\n".'Name		:'.$name."\r\n".'Applied for	:'.$applied_for."\r\n".'Email ID	:'.$email."\r\n".'Mobile		:'.$mobile."\r\n".'Total Experience	:'.$total_experience."\r\n".'Applied on		:'.$date."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
			  $this->email->send();
	}
	public function customer_revert_from_finaleap_Team($legal_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment)
	{
		
		  $Appication_info=$this->Legal_model->get_legal_docs($Application_id);
		  $config['protocol']='smtp';
		 /* $config['smtp_host']='smtp.zoho.in';
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
		  $config['mailtype'] = 'html';
		  $this->email->initialize($config);
		  $this->email->set_newline("\r\n");
		  //$code = $this->generate_uuid();
		  $from_email = "infoflfinserv@finaleap.com";
		  $this->email->from($from_email, 'Finaleap'); 

		  
			  $send_email_to_support=$send_to_emails;
			  //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
		  
			  //$send_email_to_support='info@finaleap.com';
			  $this->email->to($send_email_to_support);
			 // $this->email->subject('Testing mail from system:Revert Action Taken For Customer '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
			 //$this->email->subject('Review :Legal Report ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	          	 $this->email->subject('Alert : Query Raised To Legal---- Legal Report  ----'.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN));
		  
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
				 body {
					font-family: Arial, sans-serif;
				  }
							  </style>
							  <body>
							  <p style="font-size:13px;">Dear Sir / Ma’am,</p>
							  <p style="font-size:13px;">This is to inform you that queries raised to legal in the case of  Mrs/Mr <b>'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'</b> For below Reason </p>
							  <p style="font-size:13px;">Reason:'.$Credit_Comment.' </p>';
							 
							 
				  
							  
							  
							 
							  
						  
						  $msg.='
								 </div>
								  
								   <p style="font-size:13px;">Warm Regards,</p>
				                   <p style="font-size:13px;">Team Finaleap </p>
								  </body>
								  </html>';
		  
		 $this->email->message($msg);
			  
		  //	$this->email->message('Dear Team ,'."\r\n\n".'Following application is accepted by - '.$HR_name."\r\n".'Name		:'.$name."\r\n".'Applied for	:'.$applied_for."\r\n".'Email ID	:'.$email."\r\n".'Mobile		:'.$mobile."\r\n".'Total Experience	:'.$total_experience."\r\n".'Applied on		:'.$date."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
			  $this->email->send();
	}
	public function Accept_report($legal_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment)
	{
		
		  $Appication_info=$this->Legal_model->get_legal_docs($Application_id);
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
		  $config['mailtype'] = 'html';
		  $this->email->initialize($config);
		  $this->email->set_newline("\r\n");
		  //$code = $this->generate_uuid();
		  $from_email = "infoflfinserv@finaleap.com";
		  $this->email->from($from_email, 'Finaleap'); 

		  
			  $send_email_to_support=$legal_info->EMAIL;
			  //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
		  
			  //$send_email_to_support='info@finaleap.com';
			  $this->email->to($send_email_to_support);
			 // $this->email->subject('Testing mail from system:Revert Action Taken For Customer '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
			 $this->email->subject('Legal Report Success ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	  
		  
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
				 body {
					font-family: Arial, sans-serif;
				  }
							  </style>
							  <body>
							  <p style="font-size:13px;">Dear Sir / Ma’am,</p>
							  <p style="font-size:13px;">Thanks you for successful submission of Legal Report on the case of  Mr/Mrs. <b>'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'</b>  </p>
							  <p style="font-size:13px;">We value your association with us.</p>';
							 
							 
				  
							  
							  
							 
							  
						  
						  $msg.='
								 </div>
								  
								    <p style="font-size:13px;">Warm Regards,</p>
				                   <p style="font-size:13px;">Team Finaleap </p>
								  </body>
								  </html>';
		  
		 $this->email->message($msg);
			  
		  //	$this->email->message('Dear Team ,'."\r\n\n".'Following application is accepted by - '.$HR_name."\r\n".'Name		:'.$name."\r\n".'Applied for	:'.$applied_for."\r\n".'Email ID	:'.$email."\r\n".'Mobile		:'.$mobile."\r\n".'Total Experience	:'.$total_experience."\r\n".'Applied on		:'.$date."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
			  $this->email->send();
	}
	 public function Accept_report_Team($legal_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment)
	 {
		  $Appication_info=$this->Legal_model->get_legal_docs($Application_id);
		  $config['protocol']='smtp';
		 /* $config['smtp_host']='smtp.zoho.in';
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
		  $config['mailtype'] = 'html';
		  $this->email->initialize($config);
		  $this->email->set_newline("\r\n");
		  //$code = $this->generate_uuid();
		  $from_email = "infoflfinserv@finaleap.com";
		  $this->email->from($from_email, 'Finaleap'); 

		  
			  $send_email_to_support=$send_to_emails;
			  //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
		  
			  //$send_email_to_support='info@finaleap.com';
			  $this->email->to($send_email_to_support);
			 // $this->email->subject('Testing mail from system:Revert Action Taken For Customer '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
			 $this->email->subject('Success Notification ---- Report Received --- Legal '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	  
		  
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
				 body {
					font-family: Arial, sans-serif;
				  }
							  </style>
							  <body>
							  <p style="font-size:13px;">Dear Sir / Ma’am,</p>
							  <p style="font-size:13px;">This is to inform you that Legal Report for Mrs. <b>'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).' has been successfully published</b>  </p>';
							 
							 
							 
				  
							  
							  
							 
							  
						  
						  $msg.='
								 </div>
								  
								   <p style="font-size:13px;">Thanks & Regards,</p>
				                   <p style="font-size:13px;">Finaleap.Pvt.Ltd </p>
								  </body>
								  </html>';
		  
		 $this->email->message($msg);
			  
		  //	$this->email->message('Dear Team ,'."\r\n\n".'Following application is accepted by - '.$HR_name."\r\n".'Name		:'.$name."\r\n".'Applied for	:'.$applied_for."\r\n".'Email ID	:'.$email."\r\n".'Mobile		:'.$mobile."\r\n".'Total Experience	:'.$total_experience."\r\n".'Applied on		:'.$date."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
			  $this->email->send();
	 }
/*----------------------------- Techical Flow adde by papiha------------------------------------------------*/

	
	function Revert_customer_From_Technical()
	{   
	    $USER_TYPE=$this->session->userdata('USER_TYPE');
		
		$Application_ID = $this->input->post('Application_id');
		
		$Credit_id=$this->input->post('credit_id');
		$Legal_name=$this->input->post('User_name');
		$Cust_id=$this->input->post('id');
		$Legal_doc_status=$this->input->post('Legal_doc_status');
		$cust_name=$this->input->post("name");
		$cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_ID);
		
			 $legal_doc=$this->input->post('Legal_doc');
			/*$Legal_Docs_array=array();
    			   for($i=0; $i<count($legal_doc); $i++)
					{
						 
		 
												array_push($Legal_Docs_array, array(
												'Doc_name'=>$legal_doc[$i],
												'status'=>$Legal_doc_status[$i],
												
												));	
					}
						$DocumentsName=json_encode($Legal_Docs_array);*/
		//$USER_TYPE = $this->session->userdata("USER_TYPE");
		if($USER_TYPE=='Legal')
		{
		
		        $data_doc = array(
						'Legal_status' => 'Revert From Legal',
						'Legal_comment'=>$this->input->post('Comment'),
						'Last_updated_by_Legal'=>date("d-m-Y h:i:sa")
						
						
						
						 );
	        $data_status['Legal_status']='Revert From Legal';
			 $result_docs1 = $this->credit_manager_user_model->Update_Legal_status($Cust_id,$data_status);
			 $row=$this->Customercrud_model->getProfileData($Credit_id);
		    $notification_data=['user_id'=>$row->UNIQUE_CODE,'notification'=>'Customer Revert From Legal:'.$cust_name,'status'=>'unseen'];
			$notification=$this->Admin_model->insert_notification($notification_data);	
		}
		else if($USER_TYPE=='Technical')
		{
			$data_doc = array(
						'Technical_Status' => 'Revert From Technical',
						'Technical_Comment'=>$this->input->post('Comment'),
						'Last_updated_by_technical'=>date("d-m-Y h:i:sa") 
						
						 );
	        $data_status['Technical_Status']='Revert From Technical';
			 $result_docs1 = $this->credit_manager_user_model->Update_Legal_status($Cust_id,$data_status);
			 $row=$this->Customercrud_model->getProfileData($Credit_id);
			 $notification_data=['user_id'=>$row->UNIQUE_CODE,'notification'=>'Customer Revert From Technical:'.$cust_name,'status'=>'unseen'];
			 $notification=$this->Admin_model->insert_notification($notification_data);	
		}
		  
			
		  $result_docs = $this->credit_manager_user_model->Update_Legal_Documents($Application_ID,$data_doc);
		// $this->Sendmail_credit($Credit_id,$Legal_name,$Cust_id,$Application_ID);	
		/*------------------------------------- Send Email To  all -------------------------------------------*/
		       if($cust_info->Location!=NULL)
			   {
		        $get_credit=$this->Operations_user_model->getcredit_by_location($cust_info->Location);
				$get_cluster=$this->Operations_user_model->getcluster_by_location($cust_info->Location);
				$get_cpa=$this->Operations_user_model->getcpa_by_location($cust_info->Location);
				$cpas=json_decode( json_encode($get_cpa), true);
				$clusters = json_decode( json_encode($get_cluster), true);
				$credits= json_decode( json_encode($get_credit), true);
				$Eamils=array();
				/*foreach($clusters as $cluster)
				{
                    //$this->sendEmail_credits($user_info,$cust_info)
					 // $EamilString=$EamilString.','.$cluster['EMAIL'];
					  array_push($Eamils,$cluster['EMAIL']);
					
				}*/
				/*foreach($credits as $credit)
				{
                    //$this->sendEmail_credits($user_info,$cust_info)
					 // $EamilString=$EamilString.','.$cluster['EMAIL'];
					  array_push($Eamils,$credit['EMAIL']);
					
				}*/
				/*foreach($cpas as $cpa)
				{
                    //$this->sendEmail_credits($user_info,$cust_info)
					 // $EamilString=$EamilString.','.$cluster['EMAIL'];
					  array_push($Eamils,$cpa['EMAIL']);
					
				}*/
				
				 //array_push($Eamils,'papiha.patil@finaleap.com');
				 //array_push($Eamils,'papiha.patil@finaleap.com','sachin.kardile@finaleap.com','arun.pawar@finaleap.com','prashant.kolhapure@finaleap.com');
			     //$send_to_emails= implode(",",$Eamils);
			}
			$send_to_emails= implode(",",$Eamils);	
			$send_to_emails=$send_to_emails.'papiha.patil@finaleap.com,sachin.kardile@finaleap.com,arun.pawar@finaleap.com,sandeep.belbhandare@finaleap.com,prashant.kolhapure@finaleap.com';
				 $this->revert_from_Technical($Legal_name,$cust_info, $send_to_emails,$Application_ID);
			
		/*-------------------------- ----------------------------------------------------------------*/
		        
				if($result_docs > 0)
                {   
                    echo json_encode(1);
                 }
                 else {
					echo json_encode(0);
                   
                }
						
				
	}
	public function revert_from_Technical($Legal_name,$cust_info,$send_to_emails,$Application_ID)
	{
		
		 // $Customer=$this->Customercrud_model->getProfileData($Cust_id);
		 // $Credit=$this->Customercrud_model->getProfileData($Credit_id);
		  $Appication_info=$this->Legal_model->get_legal_docs($Application_ID);
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
		  $config['mailtype'] = 'html';
		  $this->email->initialize($config);
		  $this->email->set_newline("\r\n");
		  //$code = $this->generate_uuid();
		  $from_email = "infoflfinserv@finaleap.com";
		  $this->email->from($from_email, 'Finaleap'); 
 
		  
			  $send_email_to_support=$send_to_emails;
			  //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
		  
			  //$send_email_to_support='info@finaleap.com';
			  $this->email->to($send_email_to_support);
			 // $this->email->subject('Testing mail from system:Revert customer From '.$Legal_name); 
			 $this->email->subject('Alert : Query Raised ---- Technical Report  ----'.$Application_ID.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN));
	  
		  
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
						  <p style="font-size:12px;">This is to inform you that Technical Report request has been on hold due to queries raised by agency in the case of Mr/Mrs. <b>'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'</b> </p>
						  <p style="font-size:12px;">Please reslove the queries as early as possible for further process.</p>';
						 
			  
						  
						  
						 
						  
					  
					  $msg.='
							 </div>
							  
							  <p style="font-size:12px;">Warm Regards,</p>
							  <p style="font-size:12px;">Team Finaleap </p>
							  </body>
							  </html>';
		 
		
		 
		 $this->email->message($msg);
		  
			  
		  //	$this->email->message('Dear Team ,'."\r\n\n".'Following application is accepted by - '.$HR_name."\r\n".'Name		:'.$name."\r\n".'Applied for	:'.$applied_for."\r\n".'Email ID	:'.$email."\r\n".'Mobile		:'.$mobile."\r\n".'Total Experience	:'.$total_experience."\r\n".'Applied on		:'.$date."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
			  $this->email->send();
	}
    
	/*----------------------------------- added by papiha on 29_04_2022-------------------------------------------------------------------*/
	public function Credit_user_customers_PG()
    {

	$id = $this->input->get('id');
	if($id == '')$id = $this->session->userdata('ID');
	$userType = $this->input->get('userType');
    $CM_ID=$this->session->userdata('ID');
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
	$sel = $this->credit_manager_user_model->getCustomers_for_pd();
   // $sel=$this->Admin_model->Get_Total_No_Customer();
	$totalRecords =$sel;
	## Total number of records with filtering
	$sel=$this->credit_manager_user_model->getCustomers_for_pd_Filter($searchValue);
	$totalRecordwithFilter =$sel;
	## Fetch records
	$sel=$this->credit_manager_user_model->getCustomers_for_pd_With_Page($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
	$empRecords = $sel;
	$data = array();

	foreach($empRecords as $row){
		 if(!empty($row->credit_sanction_status))
		{
		
		
			if($row->credit_sanction_status == 'REJECT')
	        	{
		
	            $Status='<td style="color:red">REJECTED</td>';
	  
			    }
			else  if($row->credit_sanction_status == 'HOLD')
			{
		
				$Status='<td style="color:orange;">'.$row->credit_sanction_status.'</td>';
	   
			}
			else  if($row->credit_sanction_status == 'CONTINUE')
			{
				$Status='<td></td>';
			}
			else
			{
				$Status='<td></td>';
			}
		}
		else
		{
			$Status='<td></td>';
		}
			/*-------------------------------- pre came and PD ------------------------------------------------*/
			 if( $row->PD_completed_date != NULL ||  $row->PD_completed_date != '')
			{
			     $PD='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/credit_manager_user/pdf?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';
			 }
			else
				{
					
					$PD='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
					
				}
			/*---------------------------------- Action -------------------------------------------------------------*/
			 if( $row->PROFILE_PERCENTAGE == '100') {
				
				
				 $action ='<a href="'.base_url().'index.php/credit_manager_user/credit_sanction_loan_first_level?ID='.$row->UNIQUE_CODE.'&CM='.$CM_ID.'"  class="btn modal_test" target="_blank"><i class="fa fa-edit text-right" style="color:blue;"></i></a></br>
				
				   <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>
				   </br>
				
				 <a href="'.base_url().'index.php/credit_manager_user/View_Personal_Disussion_details?ID='.$row->UNIQUE_CODE.'&CM='.$CM_ID.'"  class="btn modal_test" target="_blank"><i class="fa fa-edit text-right" style="color:red;"></i></a>';
			
				  
			 }
			else 
			{
			
			
				$action = '<a  class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a></br>
				            <a  class="btn modal_test"><i class="fa fa-eye text-right" style="color:gray;"></i></a>';
			
			
			
			}
		
			/*-------------------------------- pre came and PD ------------------------------------------------*/
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
				"ID"=>$row->Application_id,
				"FN"=>$row->FN.' '.$row->LN,
				"Created_on"=>$row->CREATED_AT,
				"Application_Status"=>$Status,
				"Referred_by"=>$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]',
				"Bureau_reports"=>'<a style="margin-left: 8px; " href="'.base_url().'index.php/dsa/show_coapplicants?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>',
				"Pre_cam"=>'<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>',
				"CAM"=>'<a style="margin-left: 8px; " href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>',
				"SendToVendors"=>'<a href="'.base_url().'index.php/credit_manager_user/Vendors?x='.base64_encode($row->Application_id).'" class="btn modal_test"> FI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </i></a>
				<br><a href="'.base_url().'index.php/credit_manager_user/Vendors_RCU?x='.base64_encode($row->Application_id).'" class="btn modal_test">RCU&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
				<br><a href="'.base_url().'index.php/credit_manager_user/Vendors_Legal?x='.base64_encode($row->Application_id).'" class="btn modal_test">Legal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
				<br><a href="'.base_url().'index.php/credit_manager_user/Vendors_Technical?x='.base64_encode($row->Application_id).'" class="btn modal_test">Technical</a>',	
				"PD"=>$PD,
				"Sanction_letter"=>$Sanction_letter,
				"MITC"=>$MITC,
				"Action"=>$action
				
				
		
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

/*----------------------------------- added by sonal on 05_05_2022-------------------------------------------------------------------*/
public function Credit_user_customers()
{
	$CM_ID=$this->input->post('CM_ID');
        $filter_by=$this->input->post('filter');

$id = $this->input->get('id');
$Cust_id=$this->session->set_userdata('Cust_id');
if($id == '')
$id = $this->session->userdata('ID');
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
$sel = $this->credit_manager_user_model->getCustomers_for_Customer($filter_by);
// $sel=$this->Admin_model->Get_Total_No_Customer();
$totalRecords =$sel;
## Total number of records with filtering
$sel=$this->credit_manager_user_model->getCustomers_for_Customer_Filter($searchValue,$filter_by);
$totalRecordwithFilter =$sel;
## Fetch records
$sel=$this->credit_manager_user_model->getCustomers_for_Customer_With_Page($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
$empRecords = $sel;
$data = array();

foreach($empRecords as $row){

			if( $row->cam_status=='PD Completed')
			{
				$Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>';
			}
			else if( $row->cam_status=='Cam details complete')
			{
				$Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>';
			}
			else
			{
				$Cam_pdf='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
			} 

	
	if($row->STATUS == 'PD Completed')
	{
		if( $row->STATUS=='Rule Engine Process')
		{
			$journy= "Rule Engine Step one";
		}
		else{ 
			$journy= $row->STATUS;
		}

																			
	}
	else if($row->STATUS == 'Aadhar E-sign complete')
   {
																			
		if( $row->STATUS=='Rule Engine Process')
	{ 
		$journy='Rule Engine Step one';
	}
	else
	{
		$journy= $row->STATUS;
		
	}
   }
   else
   {
																		
	if( $row->STATUS=='Rule Engine Process')
	{ 
		$journy='Rule Engine Step one';
	}
	else
	{ 
		$journy= $row->STATUS;
	} 
																		
	}
	$BUREAU='<a style="margin-left: 8px; "  href="'.base_url().'index.php/dsa/show_coapplicants?ID='.$row->UNIQUE_CODE.'"  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>';
	$preCam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';																	
		
	if($row->STATUS == 'PD Completed')
	{
																		
	$pd='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/credit_manager_user/pdf?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';
	}
	else
	{
																	  
	$pd='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
																				
	}

	
if($row->STATUS == 'PD Completed')
{
																		  
 $LINK1='<a href="'.base_url().'index.php/credit_manager_user/credit_sanction_loan_first_level?ID='.$row->UNIQUE_CODE.'"  class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
 $LINK2='<a href="'.base_url().'index.php/customer/profile_view_p_o?ID='.$row->UNIQUE_CODE.'"  class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
																			 
}
else if($row->STATUS == 'Aadhar E-sign complete') 
{
																				
	$LINK1='<a href="'.base_url().'index.php/credit_manager_user/credit_sanction_loan_first_level?ID='.$row->UNIQUE_CODE.'&CM='.$CM_ID.'" class="btn modal_test">  <i class="fa fa-edit text-right" style="color:blue;"></i></a>';
	$LINK2='<a href="'.base_url().'index.php/customer/profile_view_p_o?ID='.$row->UNIQUE_CODE.'"  class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
																			   
																		
}
else 
{
  
	$LINK1='<a  class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a>';
	$LINK2='<a  class="btn modal_test"><i class="fa fa-eye text-right" style="color:gray;"></i></a>';
																		
}
if( $row->cam_status=='Cam details complete')
{
  if($row->credit_sanction_status =='success')
   {
																			
	$button='<button type="submit" class="btn btn-success" style="margin-top:9px;margin-left:10px;">Done</button>';
																		   
  }
   else
 {
																		
	$button='<button type="submit" class="btn btn-primary" style="margin-top:9px; margin-left:10px;">Pending</button>';
																			  
 }
}
else
{
	$button='<button type="submit" class="btn btn-primary" style="margin-top:9px; margin-left:10px;">Pending</button>';
}


$legal=' <a href="'.base_url().'index.php/credit_manager_user/Send_TO_Legal?ID='.$row->UNIQUE_CODE.'&CM='.$CM_ID.'"  class="btn modal_test"><i class="fa fa-paper-plane text-right" style="color:blue;"></i></a> 
';
																		
																			
	$data[] = array(
		
			"FN"=>$row->FN.' '.$row->LN,
			"EMAIL"=>$row->EMAIL,
			"MOBILE"=>$row->MOBILE,
			"Referred_by"=>$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]',
			"journy_status"=>$journy,
			"Date"=>$row->CREATED_AT,
			"Bureau"=>$BUREAU,
			"pre_cam"=>$preCam,
			"CAM"=>$Cam_pdf,
			"pd"=>$pd,
			"SendToVendors"=>'<a href="'.base_url().'index.php/credit_manager_user/Vendors?x='.base64_encode($row->Application_id).'" class="btn modal_test"> FI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </i></a>
				<br><a href="'.base_url().'index.php/credit_manager_user/Vendors_RCU?x='.base64_encode($row->Application_id).'" class="btn modal_test">RCU&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
				<br><a href="'.base_url().'index.php/credit_manager_user/Vendors_Legal?x='.base64_encode($row->Application_id).'" class="btn modal_test">Legal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
				<br><a href="'.base_url().'index.php/credit_manager_user/Vendors_Technical?x='.base64_encode($row->Application_id).'" class="btn modal_test">Technical</a>',	
			//"action"=>$LINK1." ".$LINK2,
			"action"=>$LINK2,
			"Sanction_Status"=>$button,
			"Legal"=>$legal,
	
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


//===================================== added by priya 24-06-2022 updated on 30-06-22
public function Sanction_cum_acceptance_letter()
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
				$CM_ID = $this->input->get("CM");
				//$this->session->set_userdata("CM_ID",$CM_ID); 
				
				if($CM_ID == '')
				{
                  $CM_ID = $this->session->userdata("CM_ID");
				}
				
				$CM_data_row = $this->Customercrud_model->getProfileData($CM_ID);
				$data['CM_data_row'] = $CM_data_row;
				$data['CM_ID'] = $CM_ID;
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				$data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
				if(!empty($data_row_pd_table))
				{
					$data['data_row_pd_table'] = $data_row_pd_table;
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
                $data_row_applied_loan=	$this->Customercrud_model->getCustomerLoanAppliedInfo($id);
                $getCustomerSanction_letter_details=	$this->credit_manager_user_model->getCustomerSanction_letter_details($id);
                $data_row_personal_discussion_form= $this->credit_manager_user_model->getPersonalDiscussionData($id,$id1);
				//$data_row_personal_discussion_form= $this->credit_manager_user_model->getPDData($id);
				//check_personal_discussion_pdf_details
				 //$data_row_PD_details= $this->credit_manager_user_model->check_personal_discussion_pdf_details($id,$id1);
				 //--------------------------- details for obligation
			    //$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			
				$data_credit_analysis=$this->Operations_user_model->getcreditData($id);
				 $data_row_PD_details= $this->credit_manager_user_model->getPDData($id);
				 $data['data_row_PD_details']=$data_row_PD_details;
				$data_row_income = $this->Customercrud_model->getProfileDataIncome($id);	
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
				$data['row_personal_discussion_form']=$data_row_personal_discussion_form;
				$this->load->view('credit_manager_user/Sanction_dashbord',$data); 
				//$this->load->view('credit_manager_user/personal_discussion',$data);

			

				
								    if(isset($data_row_pd_table))
									{
									$credit_manager_ID=$data_row_pd_table->Credit_manager_id;
									$credit_manager_data=$this->Operations_user_model->getProfileData($credit_manager_ID);
								    $data['credit_manager_data']=$credit_manager_data;
									}
									else
									{
										$data['credit_manager_data']=array();
									}
			
			
					               // echo "else outer";
									//exit();
								
									
									$this->session->unset_userdata("check_steps");
								    $this->load->view('credit_manager_user/sanction_cum_acceptance_letter',$data);
                

			} 
	  }



 public function Sanction_Letter()
	 {
	     $id=$this->input->get("ID");
		 $id1=$this->session->userdata("id1");
         $data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
		 $data_row_applied_loan=$this->Customercrud_model->getCustomerLoanAppliedInfo($id);
		 $getCustomerSanction_letter_details=	$this->credit_manager_user_model->getCustomerSanction_letter_details($id);
		 $data['getCustomerSanction_recommendation_details']=$this->credit_manager_user_model->getCustomerSanction_recommendation_details($id);
		 $data_row_income = $this->Customercrud_model->getProfileDataIncome($id);
		   $data['data_row_PD_details']=$data_row_pd_table;
         $data_row = $this->Customercrud_model->getProfileData($id);
         $data_row_more = $this->Customercrud_model->getProfileDataMore($id);
         $data['Sanction_letter_details']=$getCustomerSanction_letter_details;
         $data['row'] = $data_row;	
         $data['data_row_more'] = $data_row_more;	
		 $data['data_row_income']=$data_row_income;
		 $co_app = $this->Customercrud_model->getMyCoapplicants($id);
		 $data['coapplicants'] = $co_app;
		      $get_all_values= $this->Admin_model->get_all_values();
            $data['get_all_values'] = $get_all_values ;
		 $get_pd_images = $this->credit_manager_user_model->get_pd_images($id);
								   if(!empty( $get_pd_images))
								   {
								     $data['get_pd_images'] =$get_pd_images;
								   }
								   else 
								   {
									 $data['get_pd_images'] =array();   
								   }
		 $data['data_row_applied_loan']=$data_row_applied_loan;
								   if(!empty($data_row_pd_table))
								   {
									 $data['data_row_pd_table'] = $data_row_pd_table;
								   }
                             
         include("./vendor/autoload.php");

		 $mpdf = new \Mpdf\Mpdf([
           'setAutoTopMargin' => 'stretch',
           'autoMarginPadding' => 20,
           'orientation' => 'P'
		  ]);
		  $arrContextOptions=array(
           "ssl"=>array(
               "verify_peer"=>false,
               "verify_peer_name"=>false,
            ),
          );  
		 
		
         $mpdf->SetHTMLHeader($this->load->view('credit_manager_user/Sanction_header',$data,true));
          $mpdf->SetHTMLFooter($this->load->view('credit_manager_user/Sanction_Footer',[],true));
		  //$mpdf->mPDF('utf-8','A4','','','15','15','28','18'); 
          $mpdf->SetDisplayMode('fullwidth');
	      $mpdf->debug = true;
          $mpdf->AddPage('P');
          $stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
          $stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));
	      $mpdf->allow_charset_conversion = true;
          $mpdf->WriteHTML($stylesheet,1);
          $mpdf->list_indent_first_level = 0;
          $html = $this->load->view('credit_manager_user/Sanction_Pdf',$data,true);
          $mpdf->WriteHTML($html);
          $file_name=$data_row->FN.'_Sanction_Letter.pdf';
		  //	ob_end_clean();
			 	ob_end_clean();
         // $file=$mpdf->Output();
         $file=$mpdf->Output($file_name, 'D');
		 // $mpdf->Output($file_name, 'D');
     }


     public function submit_sanction_letter_form_one()
	{
		          $data=array(
					 'customer_id'=>$this->input->post('customer_id'),
		             'credit_manager_id'=>$this->input->post('credit_manager_id'),
		             'property_address'=>$this->input->post('property_address'),
					 'nature_of_facility'=>$this->input->post('nature_of_facility'),
					 'Branch'=>$this->input->post('Branch'),
					 'purpose_of_loan'=>$this->input->post('purpose_of_loan'),
					 'Interest_type'=>$this->input->post('Interest_type'),
					 'ffpl_plr'=>$this->input->post('ffpl_plr'),
					 'rate_of_interest'=>$this->input->post('rate_of_interest'),
					 'loan_amount'=>$this->input->post('loan_amount'),
					 'property_insurance'=>$this->input->post('property_insurance'),
					 'credit_shield'=>$this->input->post('credit_shield'),
					 'total_loan_amount'=>$this->input->post('total_loan_amount'),
					 'tenure'=>$this->input->post('tenure'),
					 'EMI'=>$this->input->post('EMI'),
					 'Emi_due_date'=>$this->input->post('Emi_due_date'),
					 'repayment'=>$this->input->post('repayment'),
					 'processing_fees'=>$this->input->post('processing_fees'),
					 'MODT'=>$this->input->post('MODT'),
					 'CERSAI_1'=>$this->input->post('CERSAI_1'),
					 'CERSAI_2'=>$this->input->post('CERSAI_2'),
					 'notice_of_intimation'=>$this->input->post('notice_of_intimation'),
					 'Security'=>$this->input->post('Security'),
					 'power_of_attorney'=>$this->input->post('power_of_attorney'),
					  'bank_name'=>$this->input->post('bank_name'),
					 'account_number'=>$this->input->post('account_number'),
					 'Repayment_account_holder_name'=>$this->input->post('Repayment_account_holder_name'),
					 'Progress'=>"50",
					 'last_updated'=>date("Y/m/d")
		           );
				
				  //echo $data['property_insurance'];
				  //exit();

						 $check_entry = $this->credit_manager_user_model->check_sanction_letter_details($data['customer_id']);
					     if($check_entry > 0)
							{
								$Result_id1 = $this->credit_manager_user_model->update_sanction_letter_details($data['customer_id'], $data);
							}
						 else 
							{
								$Result_id = $this->credit_manager_user_model->insert_sanction_letter_details($data['customer_id'], $data);
	    					}
                            
					   

                           $json = array
										(   'msg'=>'sucess',
											'response' =>'Form Submitted Successfully',
											'customer_id'=>$data['customer_id'],
											'CM_ID'=>$data['credit_manager_id']
										  
											
										);
										echo json_encode($json);
				   
				  
	}

	public function Sanction_cum_acceptance_letter_F2()
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
				$CM_ID = $this->input->get("CM");
				//$this->session->set_userdata("CM_ID",$CM_ID); 
				
				if($CM_ID == '')
				{
                  $CM_ID = $this->session->userdata("CM_ID");
				}
				
				$CM_data_row = $this->Customercrud_model->getProfileData($CM_ID);
				$data['CM_data_row'] = $CM_data_row;
				$data['CM_ID'] = $CM_ID;
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				$data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
				if(!empty($data_row_pd_table))
				{
					$data['data_row_pd_table'] = $data_row_pd_table;
				}
				
				$data_row = $this->Customercrud_model->getProfileData($id);
				$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
                $data_row_applied_loan=	$this->Customercrud_model->getCustomerLoanAppliedInfo($id);
                $data_row_personal_discussion_form= $this->credit_manager_user_model->getPersonalDiscussionData($id,$id1);
                $getCustomerSanction_letter_details=	$this->credit_manager_user_model->getCustomerSanction_letter_details($id);
				//$data_row_personal_discussion_form= $this->credit_manager_user_model->getPDData($id);
				//check_personal_discussion_pdf_details
				 //$data_row_PD_details= $this->credit_manager_user_model->check_personal_discussion_pdf_details($id,$id1);
				 //--------------------------- details for obligation
			    //$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			
				$data_credit_analysis=$this->Operations_user_model->getcreditData($id);
				 $data_row_PD_details= $this->credit_manager_user_model->getPDData($id);
				  $data['getCustomerSanction_recommendation_details']=$this->credit_manager_user_model->getCustomerSanction_recommendation_details($id);
		
				 $data['data_row_PD_details']=$data_row_PD_details;
				$data_row_income = $this->Customercrud_model->getProfileDataIncome($id);	
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
				$data['row_personal_discussion_form']=$data_row_personal_discussion_form;
				$this->load->view('credit_manager_user/Sanction_dashbord',$data); 
				//$this->load->view('credit_manager_user/personal_discussion',$data);

			

				
								    if(isset($data_row_pd_table))
									{
									$credit_manager_ID=$data_row_pd_table->Credit_manager_id;
									$credit_manager_data=$this->Operations_user_model->getProfileData($credit_manager_ID);
								    $data['credit_manager_data']=$credit_manager_data;
									}
									else
									{
										$data['credit_manager_data']=array();
									}
			
			
					               // echo "else outer";
									//exit();
								
									
									$this->session->unset_userdata("check_steps");
								    $this->load->view('credit_manager_user/Sanction_cum_acceptance_letter_F2',$data);
                

			} 
	  }


     public function submit_sanction_letter_form_two()
	{
        
		 $application_number     =$this->session->userdata("id"); // shows customer id
		 $credit_manager_user_id =$this->session->userdata("id1"); // shows credit manager id
		 $fist_condition=$this->input->post('fist_condition');
		 $fist_condition_2=$this->input->post('fist_condition_2');
		 $fist_condition_3=$this->input->post('fist_condition_3');
		 $fist_condition_4=$this->input->post('fist_condition_4');
		 $fist_condition_5=$this->input->post('fist_condition_5');
		 $fist_condition_6=$this->input->post('fist_condition_6');
		 $fist_condition_7=$this->input->post('fist_condition_7');
         $second_condition=$this->input->post('second_condition');
         $third_condition=$this->input->post('third_condition');
         $additional_emi_comments=$this->input->post('additional_emi_comments');
	     $additional_sanction_conditions=$this->input->post('additional_sanction_conditions');
		 $additional_legal_conditions=$this->input->post('additional_legal_conditions');
	     $data3=array(
                     'additional_sanction_conditions'=>$this->input->post('additional_sanction_conditions'),
                     'additional_legal_conditions'=> $this->input->post('additional_legal_conditions')
                     );
		 $result = $this->credit_manager_user_model->update_recommendation_details($application_number,$data3);
		   
         if(!empty( $additional_emi_comments))
         {
         $count = count($additional_emi_comments);
		 $needed_before_first_disbursement=array();
			for($i=0; $i<$count; $i++)
				{
					array_push($needed_before_first_disbursement, array(
								'additional_emi_comments'=>$additional_emi_comments[$i],
								));	
				}
				$needed_before_first_disbursement_JSON =json_encode($needed_before_first_disbursement);
			}
			else
			{
				$needed_before_first_disbursement_JSON='';
			}
         $fourth_condition=$this->input->post('fourth_condition');
         $additional_emi_comments3=$this->input->post('additional_emi_comments_3');
         if(!empty(  $additional_emi_comments3))
         {
			$count = count($additional_emi_comments3);
		    $submitted_before_first_disbursement=array();
			for($i=0; $i<$count; $i++)
				{
					array_push($submitted_before_first_disbursement, array(
								'additional_emi_comments'=>$additional_emi_comments3[$i],
								));	
				}
				$submitted_before_first_disbursement_JSON =json_encode($submitted_before_first_disbursement);
			}
			else
			{
					$submitted_before_first_disbursement_JSON ='';
			}
         $fifth_condition = $this->input->post('fifth_condition');  
         $Conditions_to_Loan_Sanction=array(
         	 'fist_condition'=>$fist_condition,
         	 'fist_condition_2'=>$fist_condition_2,
         	 'fist_condition_3'=>$fist_condition_3,
         	 'fist_condition_4'=>$fist_condition_4,
         	 'fist_condition_5'=>$fist_condition_5,
         	 'fist_condition_6'=>$fist_condition_6,
         	 'fist_condition_7'=>$fist_condition_7,
         	 'second_condition'=>$second_condition,
         	 'third_condition'=>$third_condition,
         	 'needed_before_first_disbursement'=>$needed_before_first_disbursement_JSON,
         	 'fourth_condition'=>$fourth_condition,
         	 'submitted_before_first_disbursement'=>$submitted_before_first_disbursement_JSON,
         	 'fifth_condition'=>$fifth_condition
         );
         $Conditions_to_Loan_Sanction_JSON =json_encode($Conditions_to_Loan_Sanction);
         $customer_id=$this->input->post('customer_id');
         $getCustomerSanction_letter_details=	$this->credit_manager_user_model->getCustomerSanction_letter_details($customer_id);
		  
		   //================= send email
          $getSanctionrecommendationFormData=  $this->credit_manager_user_model->getSanctionrecommendationData($customer_id);
		 $user_info= $this->Operations_user_model->getProfileData($getCustomerSanction_letter_details->customer_id);
		 $credit_manager_info= $this->Operations_user_model->getProfileData($getCustomerSanction_letter_details->credit_manager_id);


         $year= date("Y", strtotime($getCustomerSanction_letter_details->last_updated));
         $month=date("m", strtotime($getCustomerSanction_letter_details->last_updated));
         $date2=date("d", strtotime($getCustomerSanction_letter_details->last_updated));
         $string="FFPL";
         $ID_from_database=$getCustomerSanction_letter_details->ID;
         $letter_id=$year."/".$string."/".$date2."".$month."".$year."0".$ID_from_database;
         $data=array(
					 'Letter_ID'=>$letter_id,
		             'Conditions_to_Loan_Sanction_JSON'=>$Conditions_to_Loan_Sanction_JSON,
					 'Progress'=>"100",
					 'last_updated'=>date("Y/m/d"),
					 'Status'=>"Submited for Approval",
					 'Status_added_by'=>"Credit Manager",
					 'submitted_by'=>$credit_manager_info->FN." ".$credit_manager_info->LN,
					 'submitted_to'=>$getSanctionrecommendationFormData->recommended_to,
		           );
		 $credit_manager_id=$this->input->post('credit_manager_id');
		 $Result_id1 = $this->credit_manager_user_model->update_sanction_letter_details($customer_id, $data);

		

         $sanction_details=array(
         					'Customer_name'=> $user_info->FN." ".$user_info->LN,
         					'CM_Name'=>$credit_manager_info->FN." ".$credit_manager_info->LN,
         					'Letter_ID'=> $getCustomerSanction_letter_details->Letter_ID,
         					'loan_amount'=> $getCustomerSanction_letter_details->loan_amount,
         					'Submitted_date'=> $getCustomerSanction_letter_details->last_updated,
         					'Status'=> $getCustomerSanction_letter_details->Status,
         						);
             $data['Customer_name']=$sanction_details['Customer_name'];
             $data['CM_Name']=$sanction_details['CM_Name'];
             $data['Letter_ID']=$sanction_details['Letter_ID'];
             $data['loan_amount']=$sanction_details['loan_amount'];
             $data['Submitted_date']=$sanction_details['Submitted_date'];
             $data['Status']=$sanction_details['Status'];


           
		    /*$config['protocol']='smtp';
			$config['smtp_host']='smtp.zoho.in';
			$config['smtp_port']='465';
			$config['smtp_timeout']='30';
			$config['smtp_crypto']='ssl';
			//$config['smtp_user']='info@finaleap.com';
			//$config['smtp_pass']='skP37cnpCIq0';
			//$config['smtp_user']='flconnect@finaleap.com';
            //$config['smtp_pass']='iNF0SYS@589';
			//$from_email = "flconnect@finaleap.com";
			$config['smtp_user']='flinfo@finaleap.com';
			$config['smtp_pass']='Qt@411037';*/
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
			//$code = $this->generate_uuid();
			//$from_email = "info@finaleap.com";
			
			$this->email->from($from_email, 'Finaleap');

			$send_email_to_3_HR='piyuabdagire@gmail.com,shiv@finaleap.com,amit@finaleap.com,vipul@finaleap.com,sachin.kardile@finaleap.com,sunil.kalan@finaleap.com';
			//$send_email_to_3_HR='piyuabdagire@gmail.com,priyanka.abdagire@finaleap.com,backupfiles.priyanka@gmail.com';
			$this->email->to($send_email_to_3_HR);
			$this->email->subject('Sanctioned letter submitted for Approval :  '.$sanction_details['Customer_name'].''); 
			//$this->email->subject('System testing plz ignor this mail , Sanctioned letter submitted for Approval :  '.$sanction_details['Customer_name'].''); 
		
			// $data2['approved_by_name']=$approved_by_name;

          
			$mailContent = $this->load->view('templates/Sanction_letter_submitted',$data,true);
			$this->email->message($mailContent); 
	   	    $this->email->Send();   

		   redirect("credit_manager_user/Sanction_cum_acceptance_letter?ID=".$customer_id."&CM=".$credit_manager_id);

   
				  
	}

public function MITAC_pdf()
	 {
	     $id=$this->input->get("ID");
		 $id1=$this->session->userdata("id1");
         $data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
		 $data_row_applied_loan=$this->Customercrud_model->getCustomerLoanAppliedInfo($id);
		 $getCustomerSanction_letter_details=	$this->credit_manager_user_model->getCustomerSanction_letter_details($id);
		 $data_row_income = $this->Customercrud_model->getProfileDataIncome($id);
         $data_row = $this->Customercrud_model->getProfileData($id);
         $data['Sanction_letter_details']=$getCustomerSanction_letter_details;
         $data['row'] = $data_row;	
		 $data['data_row_income']=$data_row_income;
		      $data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
            $data['data_row_PD_details']=$data_row_pd_table;
		      $get_all_values= $this->Admin_model->get_all_values();
            $data['get_all_values'] = $get_all_values ;
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
		 $data['data_row_applied_loan']=$data_row_applied_loan;
								   if(!empty($data_row_pd_table))
								   {
									 $data['data_row_pd_table'] = $data_row_pd_table;
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
          );  /*

  $html2 = '
<style>
.gradient {
 border:0.1mm solid #220044;
 background-color: #f0f2ff;
 background-gradient: linear #c7cdde #f0f2ff 0 1 0 0.5;
}
.radialgradient {
 border:0.1mm solid #220044;
 background-color: #f0f2ff;
 background-gradient: radial #00FFFF #FFFF00 0.5 0.5 0.5 0.5 0.65;
 margin: auto;
}
.rounded {
 border:0.1mm solid #220044;
 background-color: #f0f2ff;
 background-gradient: linear #c7cdde #f0f2ff 0 1 0 0.5;
 border-radius: 2mm;
 background-clip: border-box;
}
h4 {
 font-family: sans;
 font-weight: bold;
 margin-top: 1em;
 margin-bottom: 0.5em;
}
div {
 padding:1em;
 margin-bottom: 1em;
 text-align:justify;
}
.example pre {
 background-color: #d5d5d5;
 margin: 1em 1cm;
 padding: 0 0.3cm;
}
pre { text-align:left }
pre.code { font-family: monospace }
</style>
<body style="background-gradient: linear #88FFFF #FFFF44 0 0.5 1 0.5;">
<h1>mPDF</h1>
<h2>Backgrounds & Borders</h2>
<div style="border:0.1mm solid #220044; padding:1em 2em; background-color:#ffffcc; ">
<h4>Page background</h4>
<div class="gradient">
The background colour can be set by CSS styles on the &lt;body&gt; tag. This will set the background
for the whole page. In this document, the background has been set as a gradient (see below).
</div>
<h4>Background Gradients</h4>
<div class="gradient">
Background can be set as a linear or radial gradient between two colours. The background has been set
on this &lt;div&gt; element to a linear gradient. CSS style used here is:<br />';  */
        //    $mpdf->SetHTMLHeader($this->load->view('credit_manager_user/Sanction_header',$data,true));
        // $mpdf->SetHTMLHeader($this->load->view('credit_manager_user/Sanction_Footer',$data,true));
       //   $mpdf->SetHTMLFooter($this->load->view('credit_manager_user/Sanction_header',[],true));
 $mpdf->SetHTMLHeader($this->load->view('credit_manager_user/Sanction_header',$data,true));
          $mpdf->SetHTMLFooter($this->load->view('credit_manager_user/Sanction_Footer',[],true));
          $mpdf->SetDisplayMode('fullwidth');
	      $mpdf->debug = true;
          $mpdf->AddPage('P');
          $stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
          $stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));
	      $mpdf->allow_charset_conversion = true;
          $mpdf->WriteHTML($stylesheet,1);
          $mpdf->list_indent_first_level = 0;
          $html = $this->load->view('credit_manager_user/MITAC_pdf',$data,true);
          $mpdf->WriteHTML($html);
           // $mpdf->WriteHTML($html2);
          $file_name=$data_row->FN.'_MITC_Letter.pdf';
		  	ob_end_clean();
          $file=$mpdf->Output($file_name, 'D');
     }


	   public function Sanction_Documents()
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
				$data['userType'] = $this->session->userdata("USER_TYPE");
				$id = $this->input->get("ID");
				$CM_ID = $this->input->get("CM");
				//$this->session->set_userdata("CM_ID",$CM_ID); 
				
				if($CM_ID == '')
				{
                  $CM_ID = $this->session->userdata("CM_ID");
				}
				
				$CM_data_row = $this->Customercrud_model->getProfileData($CM_ID);
				$data['CM_data_row'] = $CM_data_row;
				$data['CM_ID'] = $CM_ID;
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				$data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
				$data['find_my_legal_technical_documents']=$this->credit_manager_user_model->find_my_legal_technical_documents($id);
				
				$data['find_my_legal_documents']=$this->credit_manager_user_model->find_my_legal_documents($id);
				$data['find_my_technical_documents']=$this->credit_manager_user_model->find_my_technical_documents($id);
				$data['find_my_FI_documents']=$this->credit_manager_user_model->find_my_FI_documents($id);
				$data['find_my_RCU_documents']=$this->credit_manager_user_model->find_my_RCU_documents($id);
				$data['find_my_Court_case_documents']=$this->credit_manager_user_model->find_my_Court_case_documents($id);
				$data['find_my_Legal_Document_Search_documents']=$this->credit_manager_user_model->find_my_Legal_Document_Search_documents($id);
				$data['find_my_CRIF_documents']=$this->credit_manager_user_model->find_my_CRIF_documents($id);
				$data['find_my_IncomeAnalysisbankstatement']=$this->credit_manager_user_model->find_my_IncomeAnalysisbankstatement($id);
				$data['Property_document_list']=$this->credit_manager_user_model->Property_document_list($id);
				
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
                $data_row_personal_discussion_form= $this->credit_manager_user_model->getPersonalDiscussionData($id,$id1);
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
				$data['row_personal_discussion_form']=$data_row_personal_discussion_form;
				$data['get_documents']=$get_documents;
				if(	$u_type == "ADMIN")
				{
				$this->load->view('admin/admin_dashbord', $data);
			}
			else
			{
				$this->load->view('credit_manager_user/Sanction_dashbord',$data); 
			}
				//$this->load->view('credit_manager_user/personal_discussion',$data);
		    if(isset($data_row_pd_table))
			{
				$credit_manager_ID=$data_row_pd_table->Credit_manager_id;
				$credit_manager_data=$this->Operations_user_model->getProfileData($credit_manager_ID);
			    $data['credit_manager_data']=$credit_manager_data;
			}
			else
			{
				$data['credit_manager_data']=array();
			}
				$this->load->view('credit_manager_user/Sanction_documents',$data);
                

			} 
	  }

       public function upload_sanction_documents()
	 { 


	  
       $customer_id=$this->input->post('customer_id');
       $CM_ID=$this->input->post('dsa_id');
         $document_name=$this->input->post('document_name');
 		$customer_details = $this->Customercrud_model->getProfileData($customer_id);


	   /* code to export files to Nextcloud starts here */
	   $time = time();
	   $dir = $customer_details->ID."/";
	 // print_r(	$customer_details);
	  // exit();
	   $dirname = "Finserv/customers/".$dir;
                     $curlurl = "curl -X MKCOL -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
                //echo "<br>";
                     exec($curlurl);
       $fileextensionarr = explode(".",$_FILES["sanction_recommendation_doc"]["name"]);
       $fileextension = $fileextensionarr[1];
	   $filename = "sanction_recommendation_doc_".$time.".".$fileextension;
	   $dirname = "Finserv/customers/".$dir;
	   $dirname = "Finserv/customers/";
       $filenamewithdir = $dirname.$filename;
       $correcturl = "curl -X PUT -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["sanction_recommendation_doc"]["tmp_name"]."";
       exec($correcturl);
       $file_input_arr = array(
						'USER_ID' => $customer_id,
						'DOC_TYPE' =>$document_name,	
						'DOC_NAME' => $filename,
						'DOC_SIZE' => $_FILES['sanction_recommendation_doc']['size'],
						'DOC_FILE_TYPE' => $_FILES['sanction_recommendation_doc']['type'],
						'DOC_MASTER_TYPE' => 'Sanction Recommendation',
						'doc_cloud_name' => $filename,
						'doc_cloud_dir' => $dirname
					);
		$docid = $this->Customercrud_model->saveDocuments($file_input_arr);

		//echo $docid ;
		 redirect("credit_manager_user/Sanction_documents?ID=".$customer_id."&CM=".$CM_ID);

		
    }



    public function Welcome_Letter_pdf()
	 {
	     $id=$this->input->get("ID");
		 $id1=$this->session->userdata("id1");
         $data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
		 $data_row_applied_loan=$this->Customercrud_model->getCustomerLoanAppliedInfo($id);
		 $getCustomerSanction_letter_details=	$this->credit_manager_user_model->getCustomerSanction_letter_details($id);
		 $data_row_income = $this->Customercrud_model->getProfileDataIncome($id);
         $data_row = $this->Customercrud_model->getProfileData($id);
         $data['Sanction_letter_details']=$getCustomerSanction_letter_details;
         $data['row'] = $data_row;	
		 $data['data_row_income']=$data_row_income;
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
		 $data['data_row_applied_loan']=$data_row_applied_loan;
								   if(!empty($data_row_pd_table))
								   {
									 $data['data_row_pd_table'] = $data_row_pd_table;
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
            $mpdf->SetHTMLHeader($this->load->view('credit_manager_user/Sanction_header',$data,true));
         //$mpdf->SetHTMLHeader($this->load->view('credit_manager_user/Sanction_Footer',$data,true));
       //   $mpdf->SetHTMLFooter($this->load->view('credit_manager_user/Sanction_header',[],true));
          $mpdf->SetDisplayMode('fullwidth');
	      $mpdf->debug = true;
          $mpdf->AddPage('P');
          $stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
          $stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));
	      $mpdf->allow_charset_conversion = true;
          $mpdf->WriteHTML($stylesheet,1);
          $mpdf->list_indent_first_level = 0;
          $html = $this->load->view('credit_manager_user/Welcome_Letter_pdf',$data,true);
          $mpdf->WriteHTML($html);
          $file_name=md5(rand()).'pdf';
		  	ob_end_clean();
          $file=$mpdf->Output();
     }
public function Decline_Letter_pdf()
	 {
	     $id=$this->input->get("ID");
		 $id1=$this->session->userdata("id1");
         $data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
		 $data_row_applied_loan=$this->Customercrud_model->getCustomerLoanAppliedInfo($id);
		 $getCustomerSanction_letter_details=	$this->credit_manager_user_model->getCustomerSanction_letter_details($id);
		 $data_row_income = $this->Customercrud_model->getProfileDataIncome($id);
         $data_row = $this->Customercrud_model->getProfileData($id);
         $data['Sanction_letter_details']=$getCustomerSanction_letter_details;
         $data['row'] = $data_row;	
         $data_row_more = $this->Operations_user_model->getProfileDataMore($id);
         $data['row_more'] = $data_row_more;	
		 $data['data_row_income']=$data_row_income;
		  $data['data_row_applied_loan']=$data_row_applied_loan;
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
		                            $data['data_row_applied_loan']=$data_row_applied_loan;
								   if(!empty($data_row_pd_table))
								   {
									 $data['data_row_pd_table'] = $data_row_pd_table;
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
            $mpdf->SetHTMLHeader($this->load->view('credit_manager_user/Sanction_header',$data,true));
         //$mpdf->SetHTMLHeader($this->load->view('credit_manager_user/Sanction_Footer',$data,true));
       //   $mpdf->SetHTMLFooter($this->load->view('credit_manager_user/Sanction_header',[],true));
          $mpdf->SetDisplayMode('fullwidth');
	      $mpdf->debug = true;
          $mpdf->AddPage('P');
          $stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
          $stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));
	      $mpdf->allow_charset_conversion = true;
          $mpdf->WriteHTML($stylesheet,1);
          $mpdf->list_indent_first_level = 0;
          $html = $this->load->view('credit_manager_user/Decline_Letter_pdf.php',$data,true);
          $mpdf->WriteHTML($html);
          $file_name=md5(rand()).'pdf';
		  	ob_end_clean();
          $file=$mpdf->Output();
     }


       public function submit_sanction_letter_form_one_cluster()
	{
		
		          $data=array(
					 'customer_id'=>$this->input->post('customer_id'),
		             'credit_manager_id'=>$this->input->post('credit_manager_id'),
		             'property_address'=>$this->input->post('property_address'),
					 'nature_of_facility'=>$this->input->post('nature_of_facility'),
					 'Branch'=>$this->input->post('Branch'),
					 'purpose_of_loan'=>$this->input->post('purpose_of_loan'),
					 'Interest_type'=>$this->input->post('Interest_type'),
					 'ffpl_plr'=>$this->input->post('ffpl_plr'),
					 'rate_of_interest'=>$this->input->post('rate_of_interest'),
					 'loan_amount'=>$this->input->post('loan_amount'),
					 'property_insurance'=>$this->input->post('property_insurance'),
					 'credit_shield'=>$this->input->post('credit_shield'),
					 'total_loan_amount'=>$this->input->post('total_loan_amount'),
					 'tenure'=>$this->input->post('tenure'),
					 'EMI'=>$this->input->post('EMI'),
					 'Emi_due_date'=>$this->input->post('Emi_due_date'),
					 'repayment'=>$this->input->post('repayment'),
					 'processing_fees'=>$this->input->post('processing_fees'),
					 'MODT'=>$this->input->post('MODT'),
					 'CERSAI_1'=>$this->input->post('CERSAI_1'),
					 'CERSAI_2'=>$this->input->post('CERSAI_2'),
					 'notice_of_intimation'=>$this->input->post('notice_of_intimation'),
					 'Security'=>$this->input->post('Security'),
					 'power_of_attorney'=>$this->input->post('power_of_attorney'),
					 'Security'=>$this->input->post('Security'),
					 'account_number'=>$this->input->post('account_number'),
					 'Repayment_account_holder_name'=>$this->input->post('Repayment_account_holder_name'),
				     'last_updated'=>date("Y/m/d"),
				     'Status_added_by'=>"Cluster Credit Manager"
		           );
				
				  //echo $data['property_insurance'];
				  //exit();

						 $check_entry = $this->credit_manager_user_model->check_sanction_letter_details($data['customer_id']);
					     if($check_entry > 0)
							{
								$Result_id1 = $this->credit_manager_user_model->update_sanction_letter_details($data['customer_id'], $data);
							}
						 else 
							{
								$Result_id = $this->credit_manager_user_model->insert_sanction_letter_details($data['customer_id'], $data);
	    					}
                            
					   

                           $json = array
										(   'msg'=>'sucess',
											'response' =>'Form Submitted Successfully',
											'customer_id'=>$data['customer_id'],
											'CM_ID'=>$data['credit_manager_id']
										  
											
										);
										echo json_encode($json);
				   
				  
	}
	  
 /*--------------------added by papiha on 28_07_2022 ----------------------*/
 public function Vendors()
 {
	 
	 $decodede_id=base64_decode($this->input->get('x'));
	  
	  
	  $Application_ID = $decodede_id;
	 
	  $uid = $this->session->userdata('ID');
	  $this->load->helper('url');
			 $age = $this->session->userdata('AGE');
			 $data['showNav'] = 1;
			 $data['age'] = $age;
			 $data['userType'] = $this->session->userdata("USER_TYPE");
			 $data_row = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_ID,'','Legal');
			 $data_row_technical = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_ID,'','Technical');				
			 //$this->load->view('header', $data);
			   $data['banks']=$this->Customercrud_model->get_banks();
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
			 
			 $data['cust_info']=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_ID);
			 
			 /*echo'<pre>';
			 print_r($data['cust_info']);
			 exit;*/
			 $data['Doc_list']=$this->credit_manager_user_model->getProprty_docs();
			 
			 $data['Legal_docs']=$this->Legal_model->get_fi_docs($Application_ID);
			 $data['documents']=$data_row;
			 $data['Technical_documents']=$data_row_technical;
			 $data['uid']= $uid;
			 $data ['Legals']=$this->Legal_model->getLegals();
			 $data_row_FI = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_ID,'','FI');	
			 
			 $data['FI_Doc_list']=$this->credit_manager_user_model->getfi_docs();
			 $data['documents']=$data_row_FI;
			 $FI_Report = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_ID,'FI','CPA');	
			 $data['FI_Report']=$FI_Report;
			 $this->load->view('dashboard_header', $data);
			 //$this->load->view('credit_manager_user/Vendors', $data);
			 $this->load->view('credit_manager_user/FI_Vendors', $data);
			 
 }	
 function do_upload_FI_doc()
 {
	$submit_button_name_upload=$this->input->post('submit_button_name_upload');
	 if($submit_button_name_upload=='upload')
	 {

		
		 $Application_id = $this->input->post('Application_Id');
		 $Doc_type = $this->input->post('Legal_doc');
		 $form_id = $this->input->post('form_id');
		 $_SESSION['form_id']=$form_id;
		 $data['userType']=$this->session->userdata("USER_TYPE");
		 $u_type = $this->session->userdata("USER_TYPE");
		 /* Create directory for customers on Next cloud STARTS HERE */
		 //$id=$this->input->post("id");
		 $id=$this->input->post('id');
		 
		 $dirname = "Finserv/FI_documents/".$id;

			  $curlurl = "curl -X MKCOL -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";

		 //echo "<br>";
			  exec($curlurl);

			 

			  /* cREATE DIRECTORY FOR CUSTOMERS ENDS HERE */ 
		  /* code to export files to Nextcloud starts here */
			$time = time();
			//$dir = $customer_details->ID."/";
			$fileextensionarr = explode(".",$_FILES["userfile"]["name"]);
			$fileextension = $fileextensionarr[1];
			$filename = $time.".".$fileextension;
			$dirname = "Finserv/FI_documents/".$id."/";
			
			$dirname = "Finserv/FI_documents/";
			$filenamewithdir = $dirname.$filename;
			$correcturl = "curl -X PUT -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["userfile"]["tmp_name"]."";
			exec($correcturl);
			$file_input_arr = array
			(
			 'Application_id' => $Application_id,
			 'Doc_name' => $Doc_type,	
			 'path' =>$dirname,
			 'User'=>'',
			 'Send_to'=>$this->input->post('send_to'),
			 'doc_cloud_name' => $filename,
			 'Cust_Id'=>$id
			 
			 );
			 $this->credit_manager_user_model->saveDocuments($file_input_arr);
			  //redirect('credit_manager_user/Vendors?x='.base64_encode($Application_id));
			  $data_row_FI = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'','FI');	
			  $response = array('result' => 3,'docs'=>$data_row_FI);
			  echo json_encode($response);
			
		 
	 }
	 if(isset($_POST['submit']))
	 {
		 
		$Application_id = $this->input->post('Application_Id');
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$data_row_FI = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'','FI');
		$doc_count=count($data_row_FI);
	   
	   if($doc_count<=0)
	   {
		   
		  $this->session->set_userdata("result", 2);
		  redirect('credit_manager_user/Vendors?x='.base64_encode($Application_id));
	   }
	   else
	   {

		 $Application_id = $this->input->post('Application_Id');
		 $cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		 $uid = $this->session->userdata('ID');
		 $FI_name=$this->input->post('FI_name');
		 $FI_name_1=$this->input->post('FI_name_1');
		 $Credit_Comment=$this->input->post('comment');
		 $form_id = $this->input->post('form_id');
		 $bank_name= $this->input->post('bank_name');
		 $cust_id=$this->input->post('id');
		 /*$data_doc = array(
						 
						 'Application_id'=>$Application_id,
						 'Credit_Comment_FI'=>$Credit_Comment,
						 'FI_Status'=>'Send_TO_FI',
						 'FI'=>$FI_name,
						 'FI_name'=>$FI_name_1,
						 'Send_To_FI'=>$uid,
						 'Send_to_FI_date'=>date("d-m-Y h:i:sa"),
						 'Last_updated_by_credit_to_FI'=>date("d-m-Y h:i:sa")
						 
						  );
					 */
		   $data_doc = array(
			   'credit_manager_id'=>$uid,
			   'application_number'=>$Application_id,
			   'fi_status'=>'Send TO FI',
			   'credit_comment_fi'=>$Credit_Comment,
			   'send_to_fi_date'=>date("d-m-Y h:i:sa"),
			   'last_updated_by_credit_to_fi'=>date("d-m-Y h:i:sa"),
			   'cust_id'=>$cust_id,
			   'fi_id'=>$FI_name,
			   'fi_name'=>$FI_name_1

		   );
		   

		 $check_id=$this->Legal_model->get_fi_docs($Application_id);
		 if(!empty($check_id))
		 {
		   
			  $result_docs = $this->credit_manager_user_model->Update_Fi_details($Application_id,$data_doc);
		 }
		 else
		 {
			 $result_docs = $this->credit_manager_user_model->Insert_fi_details($data_doc);
		 }	
		 $notification_data=['user_id'=>$this->input->post('FI_name'),'notification'=>'New Customer is Assigned To You :'.$this->input->post('name'),'status'=>'unseen'];
		 $notification=$this->Admin_model->insert_notification($notification_data);
		 if($result_docs>0)
		 {
			  $this->session->set_userdata("result", 1);
			 /*-----------------------------send Mail to Legal------------------------------*/
			 
			 $FI_info= $this->Operations_user_model->getProfileData($FI_name);
			
			 $this->SendEmail_To_FI($FI_info->EMAIL,$Application_id,$cust_info,$data_row_FI);
			 $this->SendEmail_to_team_initate_FI($Application_id,$cust_info);
			 redirect('credit_manager_user/Vendors?x='.base64_encode($Application_id));
		 }
		 else{
		   $this->session->set_userdata("result", 2);
		   redirect('credit_manager_user/Vendors?x='.base64_encode($Application_id));

		 }
		}
	 }
	 else if(isset($_POST['revert_action']))
	 {
		 $Application_id = $this->input->post('Application_Id');
		 $cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		 $uid = $this->session->userdata('ID');
		 $FI_name=$this->input->post('FI_name');
		 $Legal_name=$this->input->post('Legal_name');
		 $Credit_Comment=$this->input->post('comment');
		 $form_id = $this->input->post('form_id');
		 $FI_info= $this->Operations_user_model->getProfileData($FI_name);
		 $data_doc = array(
						 
						 'application_number'=>$Application_id,
						 'credit_comment_fi'=>$Credit_Comment,
						 'fi_status'=>'Revert Action Taken',
						 'fi_id'=>$FI_name,
						 'credit_manager_id'=>$uid,
						 'last_updated_by_credit_to_fi'=>date("d-m-Y h:i:sa")
						 
						  );
						 
		 
						  $check_id=$this->Legal_model->get_fi_docs($Application_id);
						  if(!empty($check_id))
						  {
							   $result_docs = $this->credit_manager_user_model->Update_Fi_details($Application_id,$data_doc);
						  }
						  else
						  {
							  $result_docs = $this->credit_manager_user_model->Insert_fi_details($data_doc);
						  }	
		 $notification_data=['user_id'=>$this->input->post('FI_name'),'notification'=>'Revert Action Taken For Customer :'.$this->input->post('name'),'status'=>'unseen'];
		 $notification=$this->Admin_model->insert_notification($notification_data);
		   $this->SendEmail_Revert_Action_To_FI($FI_info->EMAIL,$Application_id,$cust_info);
		   $this->SendEmail_to_team_Revert_Action_Credit($Application_id,$cust_info);
		 
		 
	   
		 /*---------------------------- send mail--------------------------------------------*/
		 if($result_docs>0)
		 {
			 $this->session->set_userdata("result", 1);
			 redirect('Credit_manager_user/Vendors?x='.base64_encode($Application_id));
		 }
		 else
		 {
			 $this->session->set_userdata("result", 0);
			 redirect('Credit_manager_user/Vendors?x='.base64_encode($Application_id));
		 }
		 
	 }
	 else if(isset($_POST['revert_to_FI']))
   {
	   $Application_id = $this->input->post('Application_Id');
	   $cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
	   $uid = $this->session->userdata('ID');
	   $FI_name=$this->input->post('FI_name');
	   $Legal_name=$this->input->post('Legal_name');
	   $Credit_Comment=$this->input->post('comment');
	   $form_id = $this->input->post('form_id');
	   $data_doc = array(
						 
		   'application_number'=>$Application_id,
		   'credit_comment_fi'=>$Credit_Comment,
		   'fi_status'=>'Revert From Finaleap',
		   'fi_id'=>$FI_name,
		   'credit_manager_id'=>$uid,
		   'last_updated_by_credit_to_fi'=>date("d-m-Y h:i:sa")
		   
			);
	   
   
			$check_id=$this->Legal_model->get_fi_docs($Application_id);
			if(!empty($check_id))
			{
				 $result_docs = $this->credit_manager_user_model->Update_Fi_details($Application_id,$data_doc);
			}
			else
			{
				$result_docs = $this->credit_manager_user_model->Insert_fi_details($data_doc);
			}	
	   $notification_data=['user_id'=>$this->input->post('FI_name'),'notification'=>'Revert  For Customer :'.$this->input->post('name'),'status'=>'unseen'];
	   $notification=$this->Admin_model->insert_notification($notification_data); 
	   
	   $user_info= $this->Operations_user_model->getProfileData($FI_name);
	   $this->SendEmail_to_FI_revert_FI_Report($user_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment);
	   $this->SendEmail_to_team_revert_FI_Report($user_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment);			
	   /*---------------------------- send mail--------------------------------------------*/
	   if($result_docs>0)
	   {
		   $this->session->set_userdata("result", 1);
		   redirect('Credit_manager_user/Vendors?x='.base64_encode($Application_id));
	   }
	   else
	   {
		   $this->session->set_userdata("result", 0);
		   redirect('Credit_manager_user/Vendors?x='.base64_encode($Application_id));
	   }
   }
   else if(isset($_POST['Accepted']))
   {
	   $Application_id = $this->input->post('Application_Id');
	   $cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
	   $uid = $this->session->userdata('ID');
	   $FI_name=$this->input->post('FI_name');
	   $Legal_name=$this->input->post('Legal_name');
	   $Credit_Comment=$this->input->post('comment');
	   $form_id = $this->input->post('form_id');
	   $data_doc = array(
						 
		   'application_number'=>$Application_id,
		   'credit_comment_fi'=>$Credit_Comment,
		   'fi_status'=>'Accepted from Finaleap',
		   'fi_id'=>$FI_name,
		   'credit_manager_id'=>$uid,
		   'last_updated_by_credit_to_fi'=>date("d-m-Y h:i:sa")
		   
			);
	   
   
			$check_id=$this->Legal_model->get_fi_docs($Application_id);
			if(!empty($check_id))
			{
				 $result_docs = $this->credit_manager_user_model->Update_Fi_details($Application_id,$data_doc);
			}
			else
			{
				$result_docs = $this->credit_manager_user_model->Insert_fi_details($data_doc);
			}	
	   
	   /*---------------------------- send mail--------------------------------------------*/
	   if($result_docs>0)
	   {
		   $this->session->set_userdata("result", 1);
		   redirect('Credit_manager_user/Vendors?x='.base64_encode($Application_id));
	   }
	   else
	   {
		   $this->session->set_userdata("result", 0);
		   redirect('Credit_manager_user/Vendors?x='.base64_encode($Application_id));
	   }
   }
 }
 public Function SendEmail_To_FI($FI_EMAIL,$Application_id,$cust_info,$documents)
 {
	 
 
	 
	 /*$Appication_info=$this->Legal_model->get_legal_docs($Application_id);
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
	 $send_to_emails=$FI_EMAIL;
	 $send_email_to_support=$send_to_emails;
	 $this->email->to($send_email_to_support);
	 $this->email->subject($Application_id.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'---- FI REPORT INITIATE'); 
	 $data['cust_info']=$cust_info;
	 $mailContent = $this->load->view('templates/FI_Initiate_to_FI',$data,true);
	 $this->email->message($mailContent); 
	 if($this->email->Send())
	 {
		 
	 }
	 else{
		 echo $this->email->print_debugger();
	 }*/
	    $data_row_FI = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'','FI');
		foreach($data_row_FI as $row_doc)
		{
			
		$user = $this->Customercrud_model->get_vendors_doc($row_doc->id);
		$documentname = $user->path.$user->doc_cloud_name;
		$pathname = "cloudfile/".$user->doc_cloud_name;
		$downloadfile = " curl -X GET -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$documentname."  --output ".$pathname." ";
		exec($downloadfile);
		}
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
		$this->email->from($from_email, 'Finaleap Finserv'); 
		$send_to_emails=$FI_EMAIL;
		$send_email_to_support=$send_to_emails;
		$this->email->to($send_email_to_support);
		$this->email->subject($Application_id.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'---- FI REPORT INITIATE'); 
		$data['cust_info']=$cust_info;
		$data['documents']=$documents;
		$mailContent = $this->load->view('templates/FI_Initiate_to_FI',$data,true);
		foreach($data_row_FI as $row_doc)
		{
			$user = $this->Customercrud_model->get_vendors_doc($row_doc->id);
			$pathname = "cloudfile/".$user->doc_cloud_name;
			$this->email->attach($pathname);
		}
		$this->email->message($mailContent); 
		if($this->email->Send())
		{
			
		}
		else{
			echo $this->email->print_debugger();
		}

 }
 public Function SendEmail_to_team_initate_FI($Application_id,$cust_info)
 {
	 
	 
			 $Eamils=array();
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
			// $cpas=json_decode( json_encode($get_cpa), true);
			 $clusters = json_decode( json_encode($get_cluster), true);
			 //$credits= json_decode( json_encode($get_credit), true);
			 
			/*if(!empty($credits))
			{
			 $EamilString='';
			 foreach($credits as $credit)
			 {
				 
				 
				 array_push($Eamils,$credit['EMAIL']);
				 
			 }
		   }*/
		  
			 if(!empty($Eamils))
			 {
				 $send_to_emails= implode(",",$Eamils);
			 }
			 else
			 {
				 $send_to_emails='';
			 }
			 
		// $send_to_emails=$send_to_emails.',sachin.kardile@finaleap.com,sunil.kalan@finaleap.com,rupali.more@finaleap.com';
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
	 $this->email->from($from_email, 'Finaleap Finserv'); 
	 $send_to_emails=$send_to_emails;
	 $send_email_to_support=$send_to_emails;
	 $this->email->to($send_email_to_support);
	 $this->email->subject( 'Testing Mail From System FI Request Initiated '.$Application_id.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	 $data['cust_info']=$cust_info;
	 $mailContent = $this->load->view('templates/FI_Initiate_to_Team',$data,true);
	 $this->email->message($mailContent); 
	 if($this->email->Send())
	 {
		 
	 }
	 else{
		 echo $this->email->print_debugger();
	 }
   
   
 }
 public Function SendEmail_Revert_Action_To_FI($FI_EMAIL,$Application_id,$cust_info)
 {
	 
 
	 
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
	 $this->email->from($from_email, 'Finaleap Finserv'); 
	 $send_to_emails=$FI_EMAIL;
	 $send_email_to_support=$send_to_emails;
	 $this->email->to($send_email_to_support);
	 $this->email->subject('Alert : Query Resolved ----- FI Report ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	 $data['cust_info']=$cust_info;
	 $mailContent = $this->load->view('templates/Credit_Revert_action_to_FI',$data,true);
	 $this->email->message($mailContent); 
	 if($this->email->Send())
	 {
		 
	 }
	 else{
		 echo $this->email->print_debugger();
	 }
 }
 public Function SendEmail_to_team_Revert_Action_Credit($Application_id,$cust_info)
 {
	 
	 
			 $Eamils=array();
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
			// $get_cpa=$this->Operations_user_model->getcpa_by_location($cust_info->Location);
			// $cpas=json_decode( json_encode($get_cpa), true);
			 $clusters = json_decode( json_encode($get_cluster), true);
			 //$credits= json_decode( json_encode($get_credit), true);
			 
			/*if(!empty($credits))
			{
			 $EamilString='';
			 foreach($credits as $credit)
			 {
				 
				 
				 array_push($Eamils,$credit['EMAIL']);
				 
			 }
		   }*/
		  
			 if(!empty($Eamils))
			 {
				 $send_to_emails= implode(",",$Eamils);
			 }
			 else
			 {
				 $send_to_emails='';
			 }
			 
		 //$send_to_emails=$send_to_emails.'sachin.kardile@finaleap.com,sunil.kalan@finaleap.com,rupali.more@finaleap.com';
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
	 $this->email->from($from_email, 'Finaleap Finserv'); 
	 $send_to_emails=$send_to_emails;
	 $send_email_to_support=$send_to_emails;
	 $this->email->to($send_email_to_support);
	 $this->email->subject('Alert : Query Resolved ----- FI Report ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	 $data['cust_info']=$cust_info;
	 $mailContent = $this->load->view('templates/Team_Revert_Action_From_Credit',$data,true);
	 $this->email->message($mailContent); 
	 if($this->email->Send())
	 {
		 
	 }
	 else{
		 echo $this->email->print_debugger();
	 }
   
   
 }
 public Function SendEmail_to_team_revert_FI_Report($legal_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment)
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
   
   $send_to_emails.',sachin.kardile@finaleap.com,sunil.kalan@finaleap.com,rupali.more@finaleap.com';
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
	   $this->email->from($from_email, 'Finaleap Finserv'); 
	  // $send_to_emails=$send_to_emails;
	   //$send_email_to_support=$send_to_emails;
	  // $send_email_to_support='patilpapiha@gmail.com';
	   $this->email->to($send_to_emails);
	   
	   $this->email->subject('Alert : Query Raised To Legal---- Legal Report  ----'.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN));
	   $data['cust_info']=$cust_info;
	   $data['credit_comment_fi']=$Credit_Comment;
	   $mailContent = $this->load->view('templates/Revert_FI_Report_To_Team',$data,true);
	   $this->email->message($mailContent); 
	   if($this->email->Send())
	   {
		   
	   }
	   else{
		   echo $this->email->print_debugger();
	   }
   }
public function SendEmail_to_FI_revert_FI_Report($legal_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment)
{
   
	 $Appication_info=$this->Legal_model->get_legal_docs($Application_id);
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
	 $config['mailtype'] = 'html';
	 $this->email->initialize($config);
	 $this->email->set_newline("\r\n");
	 //$code = $this->generate_uuid();
	 $from_email = "infoflfinserv@finaleap.com";
	 $this->email->from($from_email, 'Finaleap Finserv'); 

	 
		 $send_email_to_support=$legal_info->EMAIL;
		 //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
	 
		 //$send_email_to_support='info@finaleap.com';
		 $this->email->to($send_email_to_support);
		// $this->email->subject('Testing mail from system:Revert Action Taken For Customer '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
		$this->email->subject('Review :FI Report ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
		$data['cust_info']=$cust_info;
		$data['credit_comment_fi']=$Credit_Comment;
		$mailContent = $this->load->view('templates/FI_revert_FI_Report',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
		{
			
		}
		else{
			echo $this->email->print_debugger();
		}
}

/*----------------------------------------- Added by papiha on 06_08_2022--------------------------------------------------------*/
public function Vendors_RCU()
{
	
	$decodede_id=base64_decode($this->input->get('x'));
	 
	 
	 $Application_ID = $decodede_id;
	
	 $uid = $this->session->userdata('ID');
	 $this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data_row = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_ID,'','Legal');
			//$data_row_technical = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_ID,$data['userType'],'Technical');				
			//$this->load->view('header', $data);
			  $data['banks']=$this->Customercrud_model->get_banks();
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
			
			$data['cust_info']=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_ID);
			
			/*echo'<pre>';
			print_r($data['cust_info']);
			exit;*/
			$data['Doc_list']=$this->credit_manager_user_model->getProprty_docs();
			
			$data['Legal_docs']=$this->Legal_model->get_RCU_docs($Application_ID);
			$data['documents']=$data_row;
			//$data['Technical_documents']=$data_row_technical;
			$data['uid']= $uid;
		   // $data ['Legals']=$this->Legal_model->getLegals();
			$data_row_FI = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_ID,'','RCU');	
			$FI_Report = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_ID,'RCU','CPA');	
			$data['FI_Doc_list']=$this->credit_manager_user_model->getfi_docs();
			$data['documents']=$data_row_FI;
			$data['FI_Report']=$FI_Report;
			$this->load->view('dashboard_header', $data);
			//$this->load->view('credit_manager_user/Vendors', $data);
			$this->load->view('credit_manager_user/RCU_Vendors', $data);
			
}
function do_upload_RCU_doc()
  {
	$submit_button_name_upload=$this->input->post('submit_button_name_upload');
	  if($submit_button_name_upload=='upload')
	  {
		  $data['userType']= $this->session->userdata("USER_TYPE");
		  $Application_id = $this->input->post('Application_Id');
		  $Doc_type = $this->input->post('Legal_doc');
		  $form_id = $this->input->post('form_id');
		  $_SESSION['form_id']=$form_id;
		  
		  $u_type = $this->session->userdata("USER_TYPE");
		  /* Create directory for customers on Next cloud STARTS HERE */
		  //$id=$this->input->post("id");
		  $id=$this->input->post('id');
		  
		  $dirname = "Finserv/RCU_documents/".$id;

			   $curlurl = "curl -X MKCOL -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";

		  //echo "<br>";
			   exec($curlurl);

			  

			   /* cREATE DIRECTORY FOR CUSTOMERS ENDS HERE */ 
		   /* code to export files to Nextcloud starts here */
			 $time = time();
			 //$dir = $customer_details->ID."/";
			 $fileextensionarr = explode(".",$_FILES["userfile"]["name"]);
			 $fileextension = $fileextensionarr[1];
			 $filename = $time.".".$fileextension;
			 $dirname = "Finserv/RCU_documents/".$id."/";
			 
			 $dirname = "Finserv/RCU_documents/";
			 $filenamewithdir = $dirname.$filename;
			 $correcturl = "curl -X PUT -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["userfile"]["tmp_name"]."";
			 exec($correcturl);
			 $file_input_arr = array
			 (
			  'Application_id' => $Application_id,
			  'Doc_name' => $Doc_type,	
			  'path' =>$dirname,
			  'User'=>'',
			  'Send_to'=>$this->input->post('send_to'),
			  'doc_cloud_name' => $filename,
			  'Cust_Id'=>$id
			  
			  );
			  $this->credit_manager_user_model->saveDocuments($file_input_arr);
			  // redirect('credit_manager_user/Vendors_RCU?x='.base64_encode($Application_id));
			  $data_row_FI = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'','RCU');	
			  $response = array('result' => 3,'docs'=>$data_row_FI);
			  echo json_encode($response);
			 
		  
	  }
	  if(isset($_POST['submit']))
	  {
		$Application_id = $this->input->post('Application_Id');
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$data_row_FI = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'','RCU');
		$doc_count=count($data_row_FI);
	   
	   if($doc_count<=0)
	   {
		   
		  $this->session->set_userdata("result", 2);
		  redirect('credit_manager_user/Vendors_RCU?x='.base64_encode($Application_id));
	   }
		else
		{

		  $Application_id = $this->input->post('Application_Id');
		  $cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		  $uid = $this->session->userdata('ID');
		  $RCU_name=$this->input->post('RCU_name');
		  $RCU_name_1=$this->input->post('RCU_name_1');
		  $Credit_Comment=$this->input->post('comment');
		  $form_id = $this->input->post('form_id');
		  $bank_name= $this->input->post('bank_name');
		  $cust_id=$this->input->post('id');
		  /*$data_doc = array(
						  
						  'Application_id'=>$Application_id,
						  'Credit_Comment_FI'=>$Credit_Comment,
						  'FI_Status'=>'Send_TO_FI',
						  'FI'=>$FI_name,
						  'FI_name'=>$FI_name_1,
						  'Send_To_FI'=>$uid,
						  'Send_to_FI_date'=>date("d-m-Y h:i:sa"),
						  'Last_updated_by_credit_to_FI'=>date("d-m-Y h:i:sa")
						  
						   );
					  */
			$data_doc = array(
				'credit_manager_id'=>$uid,
				'application_number'=>$Application_id,
				'RCU_status'=>'Send TO RCU',
				'credit_comment_RCU'=>$Credit_Comment,
				'send_to_RCU_date'=>date("d-m-Y h:i:sa"),
				'last_updated_by_credit_to_RCU'=>date("d-m-Y h:i:sa"),
				'cust_id'=>$cust_id,
				'RCU_id'=>$RCU_name,
				'RCU_name'=>$RCU_name_1

			);

		  $check_id=$this->Legal_model->get_RCU_docs($Application_id);
		  if(!empty($check_id))
		  {
			
			   $result_docs = $this->credit_manager_user_model->Update_RCU_details($Application_id,$data_doc);
		  }
		  else
		  {
			
			  $result_docs = $this->credit_manager_user_model->Insert_RCU_details($data_doc);
		  }	
		  $notification_data=['user_id'=>$this->input->post('RCU_name'),'notification'=>'New Customer is Assigned To You For RCU Report :'.$this->input->post('name'),'status'=>'unseen'];
		  $notification=$this->Admin_model->insert_notification($notification_data);
		  if($result_docs>0)
		  {
			$this->session->set_userdata("result", 1);
			  /*-----------------------------send Mail to Legal------------------------------*/
			  $RCU_info= $this->Operations_user_model->getProfileData($RCU_name);
			  $this->SendEmail_To_RCU($RCU_info->EMAIL,$Application_id,$cust_info);
			  $this->SendEmail_to_team_initate_RCU($Application_id,$cust_info);
			  redirect('credit_manager_user/Vendors_RCU?x='.base64_encode($Application_id));

		  }
		  else{
			$this->session->set_userdata("result", 0);
			redirect('credit_manager_user/Vendors_RCU?x='.base64_encode($Application_id));
			  
		  }
		}
	  }
	  else if(isset($_POST['revert_action']))
	  {
		  $Application_id = $this->input->post('Application_Id');
		  $cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		  $uid = $this->session->userdata('ID');
		  $RCU_name=$this->input->post('RCU_name');
		 
		  $Credit_Comment=$this->input->post('comment');
		  $form_id = $this->input->post('form_id');
		  $RCU_info= $this->Operations_user_model->getProfileData($RCU_name);
		  
		  $data_doc = array(
						  
						  'application_number'=>$Application_id,
						  'credit_comment_RCU'=>$Credit_Comment,
						  'RCU_status'=>'Revert Action Taken',
						  'RCU_id'=>$RCU_name,
						  'credit_manager_id'=>$uid,
						  'last_updated_by_credit_to_RCU'=>date("d-m-Y h:i:sa")
						  
						   );
						  
		  
						   $check_id=$this->Legal_model->get_RCU_docs($Application_id);
						   if(!empty($check_id))
						   {
								$result_docs = $this->credit_manager_user_model->Update_RCU_details($Application_id,$data_doc);
						   }
						   else
						   {
							   $result_docs = $this->credit_manager_user_model->Insert_RCU_details($data_doc);
						   }	
		  $notification_data=['user_id'=>$this->input->post('RCU_name'),'notification'=>'Revert Action Taken  on RCU Report For Customer :'.$this->input->post('name'),'status'=>'unseen'];
		  $notification=$this->Admin_model->insert_notification($notification_data);
			$this->SendEmail_Revert_Action_To_RCU($RCU_info->EMAIL,$Application_id,$cust_info);
			$this->SendEmail_to_team_Revert_Action_Credit_TO_RCU($Application_id,$cust_info);
		  
		  
		
		  /*---------------------------- send mail--------------------------------------------*/
		  if($result_docs>0)
		  {
			  $this->session->set_userdata("result", 1);
			  redirect('Credit_manager_user/Vendors_RCU?x='.base64_encode($Application_id));
		  }
		  else
		  {
			  $this->session->set_userdata("result", 0);
			  redirect('Credit_manager_user/Vendors_RCU?x='.base64_encode($Application_id));
		  }
		  
	  }
	  else if(isset($_POST['revert_to_RCU']))
	{
		$Application_id = $this->input->post('Application_Id');
		$cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		$uid = $this->session->userdata('ID');
		$RCU_name=$this->input->post('RCU_name');
	
		$Credit_Comment=$this->input->post('comment');
		$form_id = $this->input->post('form_id');
		$data_doc = array(
						  
			'application_number'=>$Application_id,
			'credit_comment_RCU'=>$Credit_Comment,
			'RCU_status'=>'Revert From Finaleap',
			'RCU_id'=>$RCU_name,
			'credit_manager_id'=>$uid,
			'last_updated_by_credit_to_RCU'=>date("d-m-Y h:i:sa")
			
			 );
		
	
			 $check_id=$this->Legal_model->get_RCU_docs($Application_id);
			 if(!empty($check_id))
			 {
				  $result_docs = $this->credit_manager_user_model->Update_RCU_details($Application_id,$data_doc);
			 }
			 else
			 {
				 $result_docs = $this->credit_manager_user_model->Insert_RCU_details($data_doc);
			 }	
		$notification_data=['user_id'=>$this->input->post('RCU_name'),'notification'=>' RCU Report Revert  For Customer :'.$this->input->post('name'),'status'=>'unseen'];
		$notification=$this->Admin_model->insert_notification($notification_data); 
		
		$user_info= $this->Operations_user_model->getProfileData($RCU_name);
		$this->SendEmail_to_RCU_revert_RCU_Report($user_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment);
		$this->SendEmail_to_team_revert_RCU_Report($user_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment);			
		/*---------------------------- send mail--------------------------------------------*/
		if($result_docs>0)
		{
			$this->session->set_userdata("result", 1);
			redirect('Credit_manager_user/Vendors_RCU?x='.base64_encode($Application_id));
		}
		else
		{
			$this->session->set_userdata("result", 0);
			redirect('Credit_manager_user/Vendors_RCU?x='.base64_encode($Application_id));
		}
	}
	else if(isset($_POST['Accepted']))
	{
		$Application_id = $this->input->post('Application_Id');
		$cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		$uid = $this->session->userdata('ID');
		$RCU_name=$this->input->post('RCU_name');
	
		$Credit_Comment=$this->input->post('comment');
		$form_id = $this->input->post('form_id');
		$data_doc = array(
						  
			'application_number'=>$Application_id,
			'credit_comment_RCU'=>$Credit_Comment,
			'RCU_status'=>'Accepted from Finaleap',
			'RCU_id'=>$RCU_name,
			'credit_manager_id'=>$uid,
			'last_updated_by_credit_to_RCU'=>date("d-m-Y h:i:sa")
			
			 );
		
	
			 $check_id=$this->Legal_model->get_RCU_docs($Application_id);
			 if(!empty($check_id))
			 {
				  $result_docs = $this->credit_manager_user_model->Update_RCU_details($Application_id,$data_doc);
			 }
			 else
			 {
				 $result_docs = $this->credit_manager_user_model->Insert_RCU_details($data_doc);
			 }	
		$notification_data=['user_id'=>$this->input->post('RCU_name'),'notification'=>'Accept RCU Report For Customer :'.$this->input->post('name'),'status'=>'unseen'];
		$notification=$this->Admin_model->insert_notification($notification_data); 
		
		$user_info= $this->Operations_user_model->getProfileData($RCU_name);
		//$this->SendEmail_to_RCU_revert_RCU_Report($user_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment);
		//$this->SendEmail_to_team_revert_RCU_Report($user_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment);			
		/*---------------------------- send mail--------------------------------------------*/
		if($result_docs>0)
		{
			$this->session->set_userdata("result", 1);
			redirect('Credit_manager_user/Vendors_RCU?x='.base64_encode($Application_id));
		}
		else
		{
			$this->session->set_userdata("result", 0);
			redirect('Credit_manager_user/Vendors_RCU?x='.base64_encode($Application_id));
		}
	}
  }
  public Function SendEmail_To_RCU($FI_EMAIL,$Application_id,$cust_info)
  {
	  
  
	  
	 /*$Appication_info=$this->Legal_model->get_legal_docs($Application_id);
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
	  $send_to_emails=$FI_EMAIL;
	  $send_email_to_support=$send_to_emails;
	  $this->email->to($send_email_to_support);
	  $this->email->subject($Application_id.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'---- RCU REPORT INITIATE'); 
	  $data['cust_info']=$cust_info;
	  $mailContent = $this->load->view('templates/RCU_Initiate_to_RCU',$data,true);
	  $this->email->message($mailContent); 
	  if($this->email->Send())
	  {
		  
	  }
	  else{
		  echo $this->email->print_debugger();
	  }*/
	    $data_row_RCU = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'','RCU');
		foreach($data_row_RCU as $row_doc)
		{
			
		$user = $this->Customercrud_model->get_vendors_doc($row_doc->id);
		$documentname = $user->path.$user->doc_cloud_name;
		$pathname = "cloudfile/".$user->doc_cloud_name;
		$downloadfile = " curl -X GET -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$documentname."  --output ".$pathname." ";
		exec($downloadfile);
		}
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
		$this->email->from($from_email, 'Finaleap Finserv'); 
		$send_to_emails=$FI_EMAIL;
		$send_email_to_support=$send_to_emails;
		$this->email->to($send_email_to_support);
		$this->email->subject($Application_id.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'---- RCU REPORT INITIATE'); 
		$data['cust_info']=$cust_info;
		$mailContent = $this->load->view('templates/RCU_Initiate_to_RCU',$data,true);
		foreach($data_row_RCU as $row_doc)
		{
			$user = $this->Customercrud_model->get_vendors_doc($row_doc->id);
			$pathname = "cloudfile/".$user->doc_cloud_name;
			$this->email->attach($pathname);
		}
		$this->email->message($mailContent); 
		if($this->email->Send())
		{
			
		}
		else{
			echo $this->email->print_debugger();
		}
  }
  public Function SendEmail_to_team_initate_RCU($Application_id,$cust_info)
  {
	  
	  
			  $Eamils=array();
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
			  
			 // $get_credit=$this->Operations_user_model->getcredit_by_location($cust_info->Location);
			  $get_cluster=$this->Operations_user_model->getcluster_by_location($cust_info->Location);
			  //$get_cpa=$this->Operations_user_model->getcpa_by_location($cust_info->Location);
			 // $cpas=json_decode( json_encode($get_cpa), true);
			  $clusters = json_decode( json_encode($get_cluster), true);
			 // $credits= json_decode( json_encode($get_credit), true);
			  
			/* if(!empty($credits))
			 {
			  $EamilString='';
			  foreach($credits as $credit)
			  {
				  
				  
				  array_push($Eamils,$credit['EMAIL']);
				  
			  }
			}*/
		   
			  if(!empty($Eamils))
			  {
				  $send_to_emails= implode(",",$Eamils);
			  }
			  else
			  {
				  $send_to_emails='';
			  }
			  
		  //$send_to_emails=$send_to_emails.',sachin.kardile@finaleap.com,sunil.kalan@finaleap.com';
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
	  $this->email->to($send_email_to_support);
	  $this->email->subject( 'RCU Request Initiated '.$Application_id.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	  $data['cust_info']=$cust_info;
	  $mailContent = $this->load->view('templates/RCU_Initiate_to_Team',$data,true);
	  $this->email->message($mailContent); 
	  if($this->email->Send())
	  {
		  
	  }
	  else{
		  echo $this->email->print_debugger();
	  }
	
	
  }
  public Function SendEmail_Revert_Action_To_RCU($FI_EMAIL,$Application_id,$cust_info)
  {
	  
  
	  
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
	  $send_to_emails=$FI_EMAIL;
	  $send_email_to_support=$send_to_emails;
	  $this->email->to($send_email_to_support);
	  $this->email->subject('Alert : Query Resolved ----- RCU Report ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	  $data['cust_info']=$cust_info;
	  $mailContent = $this->load->view('templates/Credit_Revert_action_to_RCU',$data,true);
	  $this->email->message($mailContent); 
	  if($this->email->Send())
	  {
		  
	  }
	  else{
		  echo $this->email->print_debugger();
	  }
  }
  public Function SendEmail_to_team_Revert_Action_Credit_TO_RCU($Application_id,$cust_info)
  {
	  
	  
			  $Eamils=array();
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
			 // $get_cpa=$this->Operations_user_model->getcpa_by_location($cust_info->Location);
			  //$cpas=json_decode( json_encode($get_cpa), true);
			  $clusters = json_decode( json_encode($get_cluster), true);
			  //$credits= json_decode( json_encode($get_credit), true);
			  
			 /*if(!empty($credits))
			 {
			  $EamilString='';
			  foreach($credits as $credit)
			  {
				  
				  
				  array_push($Eamils,$credit['EMAIL']);
				  
			  }
			}*/
		   
			  if(!empty($Eamils))
			  {
				  $send_to_emails= implode(",",$Eamils);
			  }
			  else
			  {
				  $send_to_emails='';
			  }
			  
		  //$send_to_emails=$send_to_emails.',sachin.kardile@finaleap.com,sunil.kalan@finaleap.com';
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
	  $this->email->to($send_email_to_support);
	  $this->email->subject('Alert : Query Resolved ----- RCU Report ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	  $data['cust_info']=$cust_info;
	  $mailContent = $this->load->view('templates/Team_Revert_Action_From_Credit_To_RCU',$data,true);
	  $this->email->message($mailContent); 
	  if($this->email->Send())
	  {
		  
	  }
	  else{
		  echo $this->email->print_debugger();
	  }
	
	
  }
  public Function SendEmail_to_team_revert_RCU_Report($legal_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment)
  {
	  
	  
	$Eamils=array();
	$Appication_info=$this->Legal_model->get_RCU_docs($Application_id);
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
		
	}
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
		//$send_email_to_support=$send_to_emails;
		$send_email_to_support='patilpapiha@gmail.com';
		$this->email->to($send_email_to_support);
		
		$this->email->subject('Alert : Query Raised To RCU---- RCU Report  ----'.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN));
		$data['cust_info']=$cust_info;
		$data['credit_comment_fi']=$Credit_Comment;
		$mailContent = $this->load->view('templates/Revert_RCU_Report_To_Team',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
		{
			
		}
		else{
			echo $this->email->print_debugger();
		}
	}
public function SendEmail_to_RCU_revert_RCU_Report($legal_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment)
{
	
	  $Appication_info=$this->Legal_model->get_legal_docs($Application_id);
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
	  $config['mailtype'] = 'html';
	  $this->email->initialize($config);
	  $this->email->set_newline("\r\n");
	  //$code = $this->generate_uuid();
	  $from_email = "infoflfinserv@finaleap.com";
	  $this->email->from($from_email, 'Finaleap'); 

	  
		  $send_email_to_support=$legal_info->EMAIL;
		  //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
	  
		  //$send_email_to_support='info@finaleap.com';
		  $this->email->to($send_email_to_support);
		 // $this->email->subject('Testing mail from system:Revert Action Taken For Customer '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
		 $this->email->subject('Review :RCU Report ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
		 $data['cust_info']=$cust_info;
		 $data['credit_comment_fi']=$Credit_Comment;
		 $mailContent = $this->load->view('templates/RCU_revert_RCU_Report',$data,true);
		 $this->email->message($mailContent); 
		 if($this->email->Send())
		 {
			 
		 }
		 else{
			 echo $this->email->print_debugger();
		 }
}

/*------------------------------------------ added by papiha on 08_08_2022 for Legal <Flow--------------------------------------></Flow-------------------------------------->/*----------------------------------------- Added by papiha on 06_08_2022--------------------------------------------------------*/
public function Vendors_Legal()
{
	
	$decodede_id=base64_decode($this->input->get('x'));
	 
	 
	 $Application_ID = $decodede_id;
	
	 $uid = $this->session->userdata('ID');
	 $this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data_row = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_ID,'','Legal');
			//$data_row_technical = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_ID,$data['userType'],'Technical');				
			//$this->load->view('header', $data);
			  $data['banks']=$this->Customercrud_model->get_banks();
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
			
			$data['cust_info']=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_ID);
			
			/*echo'<pre>';
			print_r($data['cust_info']);
			exit;*/
			$data['Doc_list']=$this->credit_manager_user_model->getProprty_docs();
			
			$data['Legal_docs']=$this->Legal_model->get_legal_docs($Application_ID);
			$data['documents']=$data_row;
			//$data['Technical_documents']=$data_row_technical;
			$data['uid']= $uid;
		   // $data ['Legals']=$this->Legal_model->getLegals();
			$data_row_FI = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_ID,'','Legal');	
			$FI_Report = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_ID,'Legal','CPA');
			
			$data['Legal_Doc_list']=$this->credit_manager_user_model->getProprty_docs();
			$data['documents']=$data_row_FI;
			$data['FI_Report']=$FI_Report;
			$this->load->view('dashboard_header', $data);
			//$this->load->view('credit_manager_user/Vendors', $data);
			$this->load->view('credit_manager_user/Legal_Vendors', $data);
			
}
function do_upload_Legal_doc()
  {
	
	$submit_button_name_upload=$this->input->post('submit_button_name_upload');
	 $submit_button_name=$this->input->post('submit_button_name');
	  if($submit_button_name_upload=='upload')
	  {
		  $Application_id = $this->input->post('Application_Id');
		  $Doc_type = $this->input->post('Legal_doc');
		  $form_id = $this->input->post('form_id');
		  $_SESSION['form_id']=$form_id;
		  $data['userType'] = $this->session->userdata("USER_TYPE");
		  $u_type = $this->session->userdata("USER_TYPE");
		  /* Create directory for customers on Next cloud STARTS HERE */
		  //$id=$this->input->post("id");
		  $id=$this->input->post('id');
		  
		  $dirname = "Finserv/Legal_documents/".$id;

			   $curlurl = "curl -X MKCOL -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";

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
			 $dirname = "Finserv/Legal_documents/";
			 $filenamewithdir = $dirname.$filename;
			 $correcturl = "curl -X PUT -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["userfile"]["tmp_name"]."";
			 exec($correcturl);
			 $file_input_arr = array
			 (
			  'Application_id' => $Application_id,
			  'Doc_name' => $Doc_type,	
			  'path' =>$dirname,
			  'User'=>'',
			  'Send_to'=>$this->input->post('send_to'),
			  'doc_cloud_name' => $filename,
			  'Cust_Id'=>$id
			  
			  );
			  $this->credit_manager_user_model->saveDocuments($file_input_arr);
			  $data_row_FI = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'','Legal');	
			  $response = array('result' => 3,'docs'=>$data_row_FI);
			  echo json_encode($response);
			 
		  
	  }
	  if($submit_button_name=='submit')
	  {
		
		  
		  $Application_id = $this->input->post('Application_Id');
		  $data['userType'] = $this->session->userdata("USER_TYPE");
		  $data_row_FI = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'','Legal');
		  $doc_count=count($data_row_FI);
		 
		 if($doc_count<=0)
		 {
			 
			$this->session->set_userdata("result", 2);
			redirect('credit_manager_user/Vendors_Legal?x='.base64_encode($Application_id));
		 }
		 else
		 {
		  $cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		  $uid = $this->session->userdata('ID');
		  $Legal_name=$this->input->post('RCU_name');
		  $Legal_name_1=$this->input->post('RCU_name_1');
		  $Credit_Comment=$this->input->post('comment');
		  $form_id = $this->input->post('form_id');
		  $bank_name= $this->input->post('bank_name');
		  $cust_id=$this->input->post('id');
			$data_doc = array(
				'credit_manager_id'=>$uid,
				'application_number'=>$Application_id,
				'Legal_status'=>'Send TO Legal',
				'credit_comment_Legal'=>$Credit_Comment,
				'send_to_Legal_date'=>date("d-m-Y h:i:sa"),
				'last_updated_by_credit_to_Legal'=>date("d-m-Y h:i:sa"),
				'cust_id'=>$cust_id,
				'Legal_id'=>$Legal_name,
				'Legal_name'=>$Legal_name_1

			);

		  $check_id=$this->Legal_model->get_Legal_docs($Application_id);
		  if(!empty($check_id))
		  {
			   $result_docs = $this->credit_manager_user_model->Update_Legal_details($Application_id,$data_doc);
		  }
		  else
		  {
			  $result_docs = $this->credit_manager_user_model->Insert_Legal_details($data_doc);
		  }	
		  $notification_data=['user_id'=>$this->input->post('RCU_name'),'notification'=>'New Customer is Assigned To You :'.$this->input->post('name'),'status'=>'unseen'];
		  $notification=$this->Admin_model->insert_notification($notification_data);
		  if($result_docs>0)
		  {
			  /*-----------------------------send Mail to Legal------------------------------*/
			  $this->session->set_userdata("result", 1);
			
			  $RCU_info= $this->Operations_user_model->getProfileData($Legal_name);
			  $this->SendEmail_To_Legal($RCU_info->EMAIL,$Application_id,$cust_info,$data_row_FI);
			  $this->SendEmail_to_team_initate_Legal($Application_id,$cust_info);
			  redirect('credit_manager_user/Vendors_Legal?x='.base64_encode($Application_id));

		  }
		  else{
			$this->session->set_userdata("result", 0);
			redirect('credit_manager_user/Vendors_Legal?x='.base64_encode($Application_id));
			

		  }
		}
	  }
	  else if($submit_button_name=='revert_action')
	  {
		  $Application_id = $this->input->post('Application_Id');
		  $cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		  $uid = $this->session->userdata('ID');
		  $Legal_name=$this->input->post('RCU_name');
		 
		  $Credit_Comment=$this->input->post('comment');
		  $form_id = $this->input->post('form_id');
		  $Legal_info= $this->Operations_user_model->getProfileData($Legal_name);
		  
		  $data_doc = array(
						  
						  'application_number'=>$Application_id,
						  'credit_comment_Legal'=>$Credit_Comment,
						  'Legal_status'=>'Revert Action Taken',
						  'Legal_id'=>$Legal_name,
						  'credit_manager_id'=>$uid,
						  'last_updated_by_credit_to_Legal'=>date("d-m-Y h:i:sa")
						  
						   );
						  
		  
						   $check_id=$this->Legal_model->get_Legal_docs($Application_id);
						   if(!empty($check_id))
						   {
								$result_docs = $this->credit_manager_user_model->Update_Legal_details($Application_id,$data_doc);
						   }
						   else
						   {
							   $result_docs = $this->credit_manager_user_model->Insert_Legal_details($data_doc);
						   }	
		  $notification_data=['user_id'=>$this->input->post('RCU_name'),'notification'=>'Revert Action Taken For Customer :'.$this->input->post('name'),'status'=>'unseen'];
		  $notification=$this->Admin_model->insert_notification($notification_data);
			$this->SendEmail_Revert_Action_To_Legal($Legal_info->EMAIL,$Application_id,$cust_info);
			$this->SendEmail_to_team_Revert_Action_Credit_TO_Legal($Application_id,$cust_info);
			
			
		  
		  
		
		  /*---------------------------- send mail--------------------------------------------*/
		  if($result_docs>0)
		  {
			  $this->session->set_userdata("result", 1);
			  redirect('Credit_manager_user/Vendors_Legal?x='.base64_encode($Application_id));
		  }
		  else
		  {
			  $this->session->set_userdata("result", 0);
			  redirect('Credit_manager_user/Vendors_Legal?x='.base64_encode($Application_id));
		  }
		  
	  }
	  else if($submit_button_name=='revert_to_Legal')
	{
		$Application_id = $this->input->post('Application_Id');
		$cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		$uid = $this->session->userdata('ID');
		$RCU_name=$this->input->post('RCU_name');
	
		$Credit_Comment=$this->input->post('comment');
		$form_id = $this->input->post('form_id');
		$data_doc = array(
						  
			'application_number'=>$Application_id,
			'credit_comment_Legal'=>$Credit_Comment,
			'Legal_status'=>'Revert From Finaleap',
			'Legal_id'=>$RCU_name,
			'credit_manager_id'=>$uid,
			'last_updated_by_credit_to_Legal'=>date("d-m-Y h:i:sa")
			
			 );
		
	
			 $check_id=$this->Legal_model->get_Legal_docs($Application_id);
			 if(!empty($check_id))
			 {
				  $result_docs = $this->credit_manager_user_model->Update_Legal_details($Application_id,$data_doc);
			 }
			 else
			 {
				 $result_docs = $this->credit_manager_user_model->Insert_Legal_details($data_doc);
			 }	
		$notification_data=['user_id'=>$this->input->post('RCU_name'),'notification'=>'Revert  For Customer :'.$this->input->post('name'),'status'=>'unseen'];
		$notification=$this->Admin_model->insert_notification($notification_data); 
		
		$user_info= $this->Operations_user_model->getProfileData($RCU_name);
		$send_to_emails='';
		$this->SendEmail_to_Legal_revert_Legal_Report($user_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment);
		$this->SendEmail_to_team_revert_Legal_Report($user_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment);			
		/*---------------------------- send mail--------------------------------------------*/
		if($result_docs>0)
		{
			$this->session->set_userdata("result", 1);
			redirect('Credit_manager_user/Vendors_Legal?x='.base64_encode($Application_id));
		}
		else
		{
			$this->session->set_userdata("result", 0);
			redirect('Credit_manager_user/Vendors_Legal?x='.base64_encode($Application_id));
		}
	}
	else if($submit_button_name=='Accepted')
	{
		$Application_id = $this->input->post('Application_Id');
		$cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		$uid = $this->session->userdata('ID');
		$RCU_name=$this->input->post('RCU_name');
	
		$Credit_Comment=$this->input->post('comment');
		$form_id = $this->input->post('form_id');
		$data_doc = array(
						  
			'application_number'=>$Application_id,
			'credit_comment_Legal'=>$Credit_Comment,
			'Legal_status'=>'Accepted from Finaleap',
			'Legal_id'=>$RCU_name,
			'credit_manager_id'=>$uid,
			'last_updated_by_credit_to_Legal'=>date("d-m-Y h:i:sa")
			
			 );
		
	
			 $check_id=$this->Legal_model->get_Legal_docs($Application_id);
			 if(!empty($check_id))
			 {
				  $result_docs = $this->credit_manager_user_model->Update_Legal_details($Application_id,$data_doc);
			 }
			 else
			 {
				 $result_docs = $this->credit_manager_user_model->Insert_Legal_details($data_doc);
			 }	
		$notification_data=['user_id'=>$this->input->post('RCU_name'),'notification'=>'Accept Legal Report For Customer :'.$this->input->post('name'),'status'=>'unseen'];
		$notification=$this->Admin_model->insert_notification($notification_data); 
		
		$user_info= $this->Operations_user_model->getProfileData($RCU_name);
		//$this->SendEmail_to_RCU_revert_RCU_Report($user_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment);
		//$this->SendEmail_to_team_revert_RCU_Report($user_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment);			
		/*---------------------------- send mail--------------------------------------------*/
		if($result_docs>0)
		{
			$this->session->set_userdata("result", 1);
			redirect('Credit_manager_user/Vendors_Legal?x='.base64_encode($Application_id));
		}
		else
		{
			$this->session->set_userdata("result", 0);
			redirect('Credit_manager_user/Vendors_Legal?x='.base64_encode($Application_id));
		}
  }
}
  public Function SendEmail_To_Legal($FI_EMAIL,$Application_id,$cust_info,$documents)
  {
	  
  
	  
	  /*$Appication_info=$this->Legal_model->get_legal_docs($Application_id);
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
	  $send_to_emails=$FI_EMAIL;
	  $send_email_to_support=$send_to_emails;
	  $this->email->to($send_email_to_support);
	  $this->email->subject($Application_id.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'---- Legal REPORT INITIATE'); 
	  $data['cust_info']=$cust_info;
	  $mailContent = $this->load->view('templates/Legal_Initiate_to_Legal',$data,true);
	  $this->email->message($mailContent); 
	  if($this->email->Send())
	  {
		  
	  }
	  else{
		  echo $this->email->print_debugger();
	  }*/
	    $data_row = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'','Legal');
		
		foreach($data_row as $row_doc)
		{
			
		$user = $this->Customercrud_model->get_vendors_doc($row_doc->id);
		$documentname = $user->path.$user->doc_cloud_name;
		$pathname = "cloudfile/".$user->doc_cloud_name;
		$downloadfile = " curl -X GET -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$documentname."  --output ".$pathname." ";
		exec($downloadfile);
		}
		
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
		$send_to_emails=$FI_EMAIL;
		$send_email_to_support=$send_to_emails;
		$this->email->to($send_email_to_support);
		$this->email->subject($Application_id.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'---- Legal REPORT INITIATE'); 
		$data['cust_info']=$cust_info;
		$data['documents']=$documents;
		$mailContent = $this->load->view('templates/Legal_Initiate_to_Legal',$data,true);
		foreach($data_row as $row_doc)
		{
			$user = $this->Customercrud_model->get_vendors_doc($row_doc->id);
			$pathname = "cloudfile/".$user->doc_cloud_name;
		    $this->email->attach($pathname);
		}
		$this->email->message($mailContent); 
		if($this->email->Send())
		{
			
		}
		else{
			echo $this->email->print_debugger();
		}

  }
  public Function SendEmail_to_team_initate_Legal($Application_id,$cust_info)
  {
	  
	  
			  $Eamils=array();
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
			 // $cpas=json_decode( json_encode($get_cpa), true);
			  $clusters = json_decode( json_encode($get_cluster), true);
			 // $credits= json_decode( json_encode($get_credit), true);
			  
			/* if(!empty($credits))
			 {
			  $EamilString='';
			  foreach($credits as $credit)
			  {
				  
				  
				  array_push($Eamils,$credit['EMAIL']);
				  
			  }
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
			$send_to_emails=$send_to_emails.',sachin.kardile@finaleap.com,credit@fianleap.com,operations@finaleap.com';
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
	  $send_email_to_support=$send_to_emails;
	  $this->email->to($send_email_to_support);
	  $this->email->subject( 'Legal Request Initiated '.$Application_id.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	  $data['cust_info']=$cust_info;
	  $mailContent = $this->load->view('templates/Legal_Initiate_to_Team',$data,true);
	  $this->email->message($mailContent); 
	  if($this->email->Send())
	  {
		  
	  }
	  else{
		  echo $this->email->print_debugger();
	  }
	
	
  }
  public Function SendEmail_Revert_Action_To_Legal($FI_EMAIL,$Application_id,$cust_info)
  {
	  
  
	  
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
	  $send_to_emails=$FI_EMAIL;
	  $send_email_to_support=$send_to_emails;
	  $this->email->to($send_email_to_support);
	  $this->email->subject('Alert : Query Resolved ----- Legal Report ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	  $data['cust_info']=$cust_info;
	  $mailContent = $this->load->view('templates/Credit_Revert_action_to_Legal',$data,true);
	  $this->email->message($mailContent); 
	  if($this->email->Send())
	  {
		  
	  }
	  else{
		  echo $this->email->print_debugger();
	  }
  }
  public Function SendEmail_to_team_Revert_Action_Credit_TO_Legal($Application_id,$cust_info)
  {
	  
	  
			  $Eamils=array();
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
			 // $cpas=json_decode( json_encode($get_cpa), true);
			  $clusters = json_decode( json_encode($get_cluster), true);
			 // $credits= json_decode( json_encode($get_credit), true);
			  
			 /*if(!empty($credits))
			 {
			  $EamilString='';
			  foreach($credits as $credit)
			  {
				  
				  
				  array_push($Eamils,$credit['EMAIL']);
				  
			  }
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
	  $this->email->to($send_email_to_support);
	  $this->email->subject('Alert : Query Resolved ----- Legal Report ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	  $data['cust_info']=$cust_info;
	  $mailContent = $this->load->view('templates/Team_Revert_Action_From_Credit_To_Legal',$data,true);
	  $this->email->message($mailContent); 
	  if($this->email->Send())
	  {
		  
	  }
	  else{
		  echo $this->email->print_debugger();
	  }
	
	
  }
  public function SendEmail_to_Legal_revert_Legal_Report($legal_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment)
{
	
	  $Appication_info=$this->Legal_model->get_legal_docs($Application_id);
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
	  $config['mailtype'] = 'html';
	  $this->email->initialize($config);
	  $this->email->set_newline("\r\n");
	  //$code = $this->generate_uuid();
	  $from_email = "infoflfinserv@finaleap.com";
	  $this->email->from($from_email, 'Finaleap'); 

	  
		  $send_email_to_support=$legal_info->EMAIL;
		  //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
	  
		  //$send_email_to_support='info@finaleap.com';
		  $this->email->to($send_email_to_support);
		 // $this->email->subject('Testing mail from system:Revert Action Taken For Customer '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
		 $this->email->subject('Review :Legal Report ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
		 $data['cust_info']=$cust_info;
		 $data['credit_comment_fi']=$Credit_Comment;
		 $mailContent = $this->load->view('templates/Legal_revert_Legal_Report',$data,true);
		 $this->email->message($mailContent); 
		 if($this->email->Send())
		 {
			 
		 }
		 else{
			 echo $this->email->print_debugger();
		 }
}
public Function SendEmail_to_team_revert_Legal_Report($legal_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment)
{
	
	
  $Eamils=array();
  $Appication_info=$this->Legal_model->get_RCU_docs($Application_id);
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
  
 // $get_credit=$this->Operations_user_model->getcredit_by_location($cust_info->Location);
  $get_cluster=$this->Operations_user_model->getcluster_by_location($cust_info->Location);
 // $get_cpa=$this->Operations_user_model->getcpa_by_location($cust_info->Location);
  $cpas=json_decode( json_encode($get_cpa), true);
  $clusters = json_decode( json_encode($get_cluster), true);
  $credits= json_decode( json_encode($get_credit), true);
  
 /*if(!empty($credits))
 {
  $EamilString='';
  foreach($credits as $credit)
  {
	  
	  
	  array_push($Eamils,$credit['EMAIL']);
	  
  }
  }*/

  if(!empty($Eamils))
  {
	  $send_to_emails= implode(",",$Eamils);
  }
  else
  {
	  $send_to_emails='';
  }
  
   // $send_to_emails=$send_to_emails.',sachin.kardile@finaleap.com,sunil.kalan@finaleap.com,rupali.more@finaleap.com';
   $send_to_emails=$send_to_emails.',sachin.kardile@finaleap.com,credit@fianleap.com,operations@finaleap.com';
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
	  $send_email_to_support=$send_to_emails;
	 // $send_email_to_support='patilpapiha@gmail.com';
	  $this->email->to($send_email_to_support);
	  
	  $this->email->subject('Alert : Query Raised To Legal---- Legal Report  ----'.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN));
	  $data['cust_info']=$cust_info;
	  $data['credit_comment_fi']=$Credit_Comment;
	  $mailContent = $this->load->view('templates/Revert_Legal_Report_To_Team',$data,true);
	  $this->email->message($mailContent); 
	  if($this->email->Send())
	  {
		  
	  }
	  else{
		  echo $this->email->print_debugger();
	  }
  }
   /*------------------------------------------------------ Added by papiha on 11_08_2022 for Technical Flow-------------------------------------------------*/
 
public function Vendors_Technical()
{
	
	$decodede_id=base64_decode($this->input->get('x'));
	 
	 
	 $Application_ID = $decodede_id;
	
	 $uid = $this->session->userdata('ID');
	 $this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data_row = $this->credit_manager_user_model->getDocuments_send_to_Legal($Application_ID,$data['userType'],'Technical');
			//$data_row_technical = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_ID,$data['userType'],'Technical');				
			//$this->load->view('header', $data);
			  $data['banks']=$this->Customercrud_model->get_banks();
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
			
			$data['cust_info']=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_ID);
			
			/*echo'<pre>';
			print_r($data['cust_info']);
			exit;*/
			$data['Doc_list']=$this->credit_manager_user_model->getProprty_docs();
			
			$data['Legal_docs']=$this->Legal_model->get_Technical_docs($Application_ID);
			$data['documents']=$data_row;
			//$data['Technical_documents']=$data_row_technical;
			$data['uid']= $uid;
		   // $data ['Legals']=$this->Legal_model->getLegals();
			$data_row_FI = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_ID,'','Technical');	
			$FI_Report = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_ID,'Technical','CPA');	
			$data['Legal_Doc_list']=$this->credit_manager_user_model->getProprty_docs();
			$data['documents']=$data_row_FI;
			$data['FI_Report']=$FI_Report;
			$this->load->view('dashboard_header', $data);
			//$this->load->view('credit_manager_user/Vendors', $data);
			$this->load->view('credit_manager_user/Technical_Vendors', $data);
			
}
function do_upload_Technical_doc()
  {
	$submit_button_name_upload=$this->input->post('submit_button_name_upload');
	  if($submit_button_name_upload=='upload')
	  {
		$data['userType'] = $this->session->userdata("USER_TYPE");
		  $Application_id = $this->input->post('Application_Id');
		  $Doc_type = $this->input->post('Legal_doc');
		  $form_id = $this->input->post('form_id');
		  $_SESSION['form_id']=$form_id;
		  
		  $u_type = $this->session->userdata("USER_TYPE");
		  /* Create directory for customers on Next cloud STARTS HERE */
		  //$id=$this->input->post("id");
		  $id=$this->input->post('id');
		  
		  $dirname = "Finserv/Technical_documents/".$id;

			   $curlurl = "curl -X MKCOL -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";

		  //echo "<br>";
			   exec($curlurl);

			  

			   /* cREATE DIRECTORY FOR CUSTOMERS ENDS HERE */ 
		   /* code to export files to Nextcloud starts here */
			 $time = time();
			 //$dir = $customer_details->ID."/";
			 $fileextensionarr = explode(".",$_FILES["userfile"]["name"]);
			 $fileextension = $fileextensionarr[1];
			 $filename = $time.".".$fileextension;
			 $dirname = "Finserv/Technical_documents/".$id."/";
			 $dirname = "Finserv/Technical_documents/";
			 $filenamewithdir = $dirname.$filename;
			 $correcturl = "curl -X PUT -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["userfile"]["tmp_name"]."";
			 exec($correcturl);
			 $file_input_arr = array
			 (
			  'Application_id' => $Application_id,
			  'Doc_name' => $Doc_type,	
			  'path' =>$dirname,
			  'User'=>'',
			  'Send_to'=>$this->input->post('send_to'),
			  'doc_cloud_name' => $filename,
			  'Cust_Id'=>$id
			  
			  );
			  $this->credit_manager_user_model->saveDocuments($file_input_arr);
			 
			  $data_row_FI = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'','Technical');	
			  $response = array('result' => 3,'docs'=>$data_row_FI);
			  echo json_encode($response);
			 
		  
	  }
	  if(isset($_POST['submit']))
	  {
		$Application_id = $this->input->post('Application_Id');
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$data_row_FI = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'','Technical');
		$doc_count=count($data_row_FI);
	   
	   if($doc_count<=0)
	   {
		   
		  $this->session->set_userdata("result", 2);
		  redirect('credit_manager_user/Vendors_Technical?x='.base64_encode($Application_id));
	   }
	   else{

		  $Application_id = $this->input->post('Application_Id');
		  $cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		  $uid = $this->session->userdata('ID');
		  $Legal_name=$this->input->post('RCU_name');
		  $Legal_name_1=$this->input->post('RCU_name_1');
		  $Credit_Comment=$this->input->post('comment');
		  $form_id = $this->input->post('form_id');
		  $bank_name= $this->input->post('bank_name');
		  $cust_id=$this->input->post('id');
		  /*$data_doc = array(
						  
						  'Application_id'=>$Application_id,
						  'Credit_Comment_FI'=>$Credit_Comment,
						  'FI_Status'=>'Send_TO_FI',
						  'FI'=>$FI_name,
						  'FI_name'=>$FI_name_1,
						  'Send_To_FI'=>$uid,
						  'Send_to_FI_date'=>date("d-m-Y h:i:sa"),
						  'Last_updated_by_credit_to_FI'=>date("d-m-Y h:i:sa")
						  
						   );
					  */
			$data_doc = array(
				'credit_manager_id'=>$uid,
				'application_number'=>$Application_id,
				'Technical_status'=>'Send TO Technical',
				'credit_comment_Technical'=>$Credit_Comment,
				'send_to_Technical_date'=>date("d-m-Y h:i:sa"),
				'last_updated_by_credit_to_Technical'=>date("d-m-Y h:i:sa"),
				'cust_id'=>$cust_id,
				'Technical_id'=>$Legal_name,
				'Technical_name'=>$Legal_name_1

			);

		  $check_id=$this->Legal_model->get_Technical_docs($Application_id);
		  if(!empty($check_id))
		  {
			   $result_docs = $this->credit_manager_user_model->Update_Technical_details($Application_id,$data_doc);
		  }
		  else
		  {
			  $result_docs = $this->credit_manager_user_model->Insert_Technical_details($data_doc);
		  }	
		  $notification_data=['user_id'=>$this->input->post('RCU_name'),'notification'=>'New Customer is Assigned To You :'.$this->input->post('name'),'status'=>'unseen'];
		  $notification=$this->Admin_model->insert_notification($notification_data);
		  if($result_docs>0)
		  {
			  /*-----------------------------send Mail to Legal------------------------------*/
			  $this->session->set_userdata("result", 1);
			  $RCU_info= $this->Operations_user_model->getProfileData($Legal_name);
			  $this->SendEmail_To_Technical($RCU_info->EMAIL,$Application_id,$cust_info,$data_row_FI);
			  $this->SendEmail_to_team_initate_Technical($Application_id,$cust_info);
			  redirect('credit_manager_user/Vendors_Technical?x='.base64_encode($Application_id));

		  }
		  else{
			$this->session->set_userdata("result", 0);
			redirect('credit_manager_user/Vendors_Technical?x='.base64_encode($Application_id));
		  }
		}
	  }
	  else if(isset($_POST['revert_action']))
	  {
		  $Application_id = $this->input->post('Application_Id');
		  $cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		  $uid = $this->session->userdata('ID');
		  $Legal_name=$this->input->post('RCU_name');
		 
		  $Credit_Comment=$this->input->post('comment');
		  $form_id = $this->input->post('form_id');
		  $Legal_info= $this->Operations_user_model->getProfileData($Legal_name);
		  
		  $data_doc = array(
						  
						  'application_number'=>$Application_id,
						  'credit_comment_Technical'=>$Credit_Comment,
						  'Technical_status'=>'Revert Action Taken',
						  'Technical_id'=>$Legal_name,
						  'credit_manager_id'=>$uid,
						  'last_updated_by_credit_to_Technical'=>date("d-m-Y h:i:sa")
						  
						   );
						  
		  
						   $check_id=$this->Legal_model->get_Technical_docs($Application_id);
						   if(!empty($check_id))
						   {
								$result_docs = $this->credit_manager_user_model->Update_Technical_details($Application_id,$data_doc);
						   }
						   else
						   {
							   $result_docs = $this->credit_manager_user_model->Insert_Technical_details($data_doc);
						   }	
		  $notification_data=['user_id'=>$this->input->post('RCU_name'),'notification'=>'Revert Action Taken For Customer :'.$this->input->post('name'),'status'=>'unseen'];
		  $notification=$this->Admin_model->insert_notification($notification_data);
			$this->SendEmail_Revert_Action_To_Technical($Legal_info->EMAIL,$Application_id,$cust_info);
			$this->SendEmail_to_team_Revert_Action_Credit_TO_Technical($Application_id,$cust_info);
		  
		  
		
		  /*---------------------------- send mail--------------------------------------------*/
		  if($result_docs>0)
		  {
			  $this->session->set_userdata("result", 1);
			  redirect('Credit_manager_user/Vendors_Technical?x='.base64_encode($Application_id));
		  }
		  else
		  {
			  $this->session->set_userdata("result", 0);
			  redirect('Credit_manager_user/Vendors_Technical?x='.base64_encode($Application_id));
		  }
		   
	  }
	  else if(isset($_POST['Accepted']))
	  {
		  $Application_id = $this->input->post('Application_Id');
		  $cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		  $uid = $this->session->userdata('ID');
		  $RCU_name=$this->input->post('RCU_name');
	  
		  $Credit_Comment=$this->input->post('comment');
		  $form_id = $this->input->post('form_id');
		  $data_doc = array(
						  
			  'application_number'=>$Application_id,
			  'credit_comment_Technical'=>$Credit_Comment,
			  'Technical_status'=>'Accepted from Finaleap',
			  'Technical_id'=>$RCU_name,
			  'credit_manager_id'=>$uid,
			  'last_updated_by_credit_to_Technical'=>date("d-m-Y h:i:sa")
			  
			  );
		  
	  
			  $check_id=$this->Legal_model->get_Technical_docs($Application_id);
			  if(!empty($check_id))
			  {
				  $result_docs = $this->credit_manager_user_model->Update_Technical_details($Application_id,$data_doc);
			  }
			  else
			  {
				  $result_docs = $this->credit_manager_user_model->Insert_Technical_details($data_doc);
			  }	
		  $notification_data=['user_id'=>$this->input->post('RCU_name'),'notification'=>'Accept Technical Report For Customer :'.$this->input->post('name'),'status'=>'unseen'];
		  $notification=$this->Admin_model->insert_notification($notification_data); 
		  
		  $user_info= $this->Operations_user_model->getProfileData($RCU_name);
		  //$this->SendEmail_to_RCU_revert_RCU_Report($user_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment);
		  //$this->SendEmail_to_team_revert_RCU_Report($user_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment);			
		  /*---------------------------- send mail--------------------------------------------*/
		  if($result_docs>0)
		  {
			  $this->session->set_userdata("result", 1);
			  redirect('Credit_manager_user/Vendors_Technical?x='.base64_encode($Application_id));
		  }
		  else
		  {
			  $this->session->set_userdata("result", 0);
			  redirect('Credit_manager_user/Vendors_Technical?x='.base64_encode($Application_id));
		  }
	  }
  
	  else if(isset($_POST['revert_to_Technical']))
	{
		$Application_id = $this->input->post('Application_Id');
		$cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		$uid = $this->session->userdata('ID');
		$RCU_name=$this->input->post('RCU_name');
	
		$Credit_Comment=$this->input->post('comment');
		$form_id = $this->input->post('form_id');
		$data_doc = array(
						  
			'application_number'=>$Application_id,
			'credit_comment_Technical'=>$Credit_Comment,
			'Technical_status'=>'Revert From Finaleap',
			'Technical_id'=>$RCU_name,
			'credit_manager_id'=>$uid,
			'last_updated_by_credit_to_Technical'=>date("d-m-Y h:i:sa")
			
			 );
		
	
			 $check_id=$this->Legal_model->get_Technical_docs($Application_id);
			 if(!empty($check_id))
			 {
				  $result_docs = $this->credit_manager_user_model->Update_Technical_details($Application_id,$data_doc);
			 }
			 else
			 {
				 $result_docs = $this->credit_manager_user_model->Insert_Technical_details($data_doc);
			 }	
		$notification_data=['user_id'=>$this->input->post('RCU_name'),'notification'=>'Revert  For Customer :'.$this->input->post('name'),'status'=>'unseen'];
		$notification=$this->Admin_model->insert_notification($notification_data); 
		
		$user_info= $this->Operations_user_model->getProfileData($RCU_name);
		$send_to_emails='';
		$this->SendEmail_to_Technical_revert_Technical_Report($user_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment);
		$this->SendEmail_to_team_revert_Technical_Report($user_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment);			
		/*---------------------------- send mail--------------------------------------------*/
		if($result_docs>0)
		{
			$this->session->set_userdata("result", 1);
			redirect('Credit_manager_user/Vendors_Technical?x='.base64_encode($Application_id));
		}
		else
		{
			$this->session->set_userdata("result", 0);
			redirect('Credit_manager_user/Vendors_Technical?x='.base64_encode($Application_id));
		}
	}
  }
  public Function SendEmail_To_Technical($FI_EMAIL,$Application_id,$cust_info,$documents)
  {
	  
  
	  
	 /* $Appication_info=$this->Legal_model->get_Technical_docs($Application_id);
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
	  $send_to_emails=$FI_EMAIL;
	  $send_email_to_support=$send_to_emails;
	  $this->email->to($send_email_to_support);
	  $this->email->subject($Application_id.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'---- TECHNICAL REPORT INITIATE'); 
	  $data['cust_info']=$cust_info;
	  $mailContent = $this->load->view('templates/Technical_Initiate_to_Legal',$data,true);
	  $this->email->message($mailContent); 
	  if($this->email->Send())
	  {
		  
	  }
	  else{
		  echo $this->email->print_debugger();
	  }*/	
	    $find_coapplicants =$this->Dsacustomers_model->getCustomers_coapplicants($cust_info->UNIQUE_CODE);
	    $data['coapplicants']=$find_coapplicants ;
	    $data_row= $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'','Technical');
		foreach($data_row as $row_doc)
		{
			
		$user = $this->Customercrud_model->get_vendors_doc($row_doc->id);
		$documentname = $user->path.$user->doc_cloud_name;
		$pathname = "cloudfile/".$user->doc_cloud_name;
		$downloadfile = " curl -X GET -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$documentname."  --output ".$pathname." ";
		exec($downloadfile);
		}
		$Appication_info=$this->Legal_model->get_Technical_docs($Application_id);
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
		$send_to_emails=$FI_EMAIL;
		$send_email_to_support=$send_to_emails;
		$this->email->to($send_email_to_support);
		$this->email->subject($Application_id.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'---- TECHNICAL REPORT INITIATE'); 
		$data['cust_info']=$cust_info;
		$data['documents']=$documents;
		$mailContent = $this->load->view('templates/Technical_Initiate_to_Legal',$data,true);
		$this->email->message($mailContent); 
		foreach($data_row as $row_doc)
			{
				$user = $this->Customercrud_model->get_vendors_doc($row_doc->id);
				$pathname = "cloudfile/".$user->doc_cloud_name;
				$this->email->attach($pathname);
			}
		if($this->email->Send())
		{
			
		}
		else{
			echo $this->email->print_debugger();
		}
			

  }
  public Function SendEmail_to_team_initate_Technical($Application_id,$cust_info)
  {
	  
	  
			  $Eamils=array();
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
			 // $get_cpa=$this->Operations_user_model->getcpa_by_location($cust_info->Location);
			 // $cpas=json_decode( json_encode($get_cpa), true);
			  $clusters = json_decode( json_encode($get_cluster), true);
			 // $credits= json_decode( json_encode($get_credit), true);
			  
			/* if(!empty($credits))
			 {
			  $EamilString='';
			  foreach($credits as $credit)
			  {
				  
				  
				  array_push($Eamils,$credit['EMAIL']);
				  
			  }
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
		 // $send_to_emails='papiha.patil@finaleap.com';
		 $send_to_emails=$send_to_emails.',sachin.kardile@finaleap.com,credit@fianleap.com,operations@finaleap.com';
		  
	  $Appication_info=$this->Legal_model->get_Technical_docs($Application_id);
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
	  $this->email->to($send_email_to_support);
	  $this->email->subject( 'Technical Request Initiated '.$Application_id.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	  $data['cust_info']=$cust_info;
	  $mailContent = $this->load->view('templates/Technical_Initiate_to_Team',$data,true);
	  $this->email->message($mailContent); 
	  if($this->email->Send())
	  {
		  
	  }
	  else{
		  echo $this->email->print_debugger();
	  }
	
	
  }
  public Function SendEmail_Revert_Action_To_Technical($FI_EMAIL,$Application_id,$cust_info)
  {
	  
  
	  
	  $Appication_info=$this->Legal_model->get_Technical_docs($Application_id);
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
	  $send_to_emails=$FI_EMAIL;
	  $send_email_to_support=$send_to_emails;
	  $this->email->to($send_email_to_support);
	  $this->email->subject('Alert : Query Resolved ----- Technical Report ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	  $data['cust_info']=$cust_info;
	  $mailContent = $this->load->view('templates/Credit_Revert_action_to_Technical',$data,true);
	  $this->email->message($mailContent); 
	  if($this->email->Send())
	  {
		  
	  }
	  else{
		  echo $this->email->print_debugger();
	  }
  }
  public Function SendEmail_to_team_Revert_Action_Credit_TO_Technical($Application_id,$cust_info)
  {
	  
	  
			  $Eamils=array();
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
			 // $credits= json_decode( json_encode($get_credit), true);
			  
			 /*if(!empty($credits))
			 {
			  $EamilString='';
			  foreach($credits as $credit)
			  {
				  
				  
				  array_push($Eamils,$credit['EMAIL']);
				  
			  }
			}*/
		   
			  if(!empty($Eamils))
			  {
				  $send_to_emails= implode(",",$Eamils);
			  }
			  else
			  {
				  $send_to_emails='';
			  }
			  
		 // $send_to_emails=$send_to_emails.',sachin.kardile@finaleap.com,sunil.kalan@finaleap.com,rupali.more@finaleap.com';
		  //$send_to_emails='papiha.patil@finaleap.com';
		  $send_to_emails=$send_to_emails.',sachin.kardile@finaleap.com,credit@fianleap.com,operations@finaleap.com';
		  
	  $Appication_info=$this->Legal_model->get_Technical_docs($Application_id);
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
	  $this->email->to($send_email_to_support);
	  $this->email->subject('Alert : Query Resolved ----- Technical Report ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
	  $data['cust_info']=$cust_info;
	  $mailContent = $this->load->view('templates/Team_Revert_Action_From_Credit_To_Technical',$data,true);
	  $this->email->message($mailContent); 
	  if($this->email->Send())
	  {
		  
	  }
	  else{
		  echo $this->email->print_debugger();
	  }
	
	
  }
  public function SendEmail_to_Technical_revert_Technical_Report($legal_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment)
{
	
	  $Appication_info=$this->Legal_model->get_Technical_docs($Application_id);
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
	  $config['mailtype'] = 'html';
	  $this->email->initialize($config);
	  $this->email->set_newline("\r\n");
	  //$code = $this->generate_uuid();
	  $from_email = "infoflfinserv@finaleap.com";
	  $this->email->from($from_email, 'Finaleap'); 

	  
		  $send_email_to_support=$legal_info->EMAIL;
		  //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
	  
		  //$send_email_to_support='info@finaleap.com';
		  $this->email->to($send_email_to_support);
		 // $this->email->subject('Testing mail from system:Revert Action Taken For Customer '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
		 $this->email->subject('Review :Technical Report ---- '.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN)); 
		 $data['cust_info']=$cust_info;
		 $data['credit_comment_fi']=$Credit_Comment;
		 $mailContent = $this->load->view('templates/Technical_revert_Technical_Report',$data,true);
		 $this->email->message($mailContent); 
		 if($this->email->Send())
		 {
			 
		 }
		 else{
			 echo $this->email->print_debugger();
		 }
}
public Function SendEmail_to_team_revert_Technical_Report($legal_info,$cust_info, $send_to_emails,$Application_id,$Credit_Comment)
{
	
	
  $Eamils=array();
  $Appication_info=$this->Legal_model->get_Technical_docs($Application_id);
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
  
 // $get_credit=$this->Operations_user_model->getcredit_by_location($cust_info->Location);
  $get_cluster=$this->Operations_user_model->getcluster_by_location($cust_info->Location);
 // $get_cpa=$this->Operations_user_model->getcpa_by_location($cust_info->Location);
 // $cpas=json_decode( json_encode($get_cpa), true);
  $clusters = json_decode( json_encode($get_cluster), true);
  //$credits= json_decode( json_encode($get_credit), true);
  
 /*if(!empty($credits))
 {
  $EamilString='';
  foreach($credits as $credit)
  {
	  
	  
	  array_push($Eamils,$credit['EMAIL']);
	  
  }
  }*/

  if(!empty($Eamils))
  {
	  $send_to_emails= implode(",",$Eamils);
  }
  else
  {
	  $send_to_emails='';
  }
  
  // $send_to_emails=$send_to_emails.',sachin.kardile@finaleap.com,sunil.kalan@finaleap.com';
  //$send_to_emails='papiha.patil@finaleap.com';
  $send_to_emails=$send_to_emails.',sachin.kardile@finaleap.com,credit@fianleap.com,operations@finaleap.com';
	  $Appication_info=$this->Legal_model->get_Technical_docs($Application_id);
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
	  
	  $this->email->subject('Alert : Query Raised To Technical---- Technical Report  ----'.$Application_id.' ---- '.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN));
	  $data['cust_info']=$cust_info;
	  $data['credit_comment_fi']=$Credit_Comment;
	  $mailContent = $this->load->view('templates/Revert_Technical_Report_To_Team',$data,true);
	  $this->email->message($mailContent); 
	  if($this->email->Send())
	  {
		  
	  }
	  else{
		  echo $this->email->print_debugger();
	  }
  }
  /*------------------------------------------ added by papiha on 16_08_2022 for geteting sending Legal Doc---------------------------------------------------*/
  
  
  /*------------------------------------------ added by priya 30-08-2022 --------------------------------------------------------------------------------------*/
    public function Disbursement_Pending_Documents(){
	
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER'){
            redirect(base_url('index.php/login'));
        }else{
        	$id = $this->input->get('id');
			$Cust_id=$this->session->set_userdata('Cust_id');
			if($id == '')
			$id = $this->session->userdata('ID');

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
			$data_row = $this->credit_manager_user_model->getProfileData($id);
			$_SESSION["file_name"] =  'Customer List' ;
			$age = $this->session->userdata('AGE');
			$arr['data_row']=$data_row;
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			$arr['userType'] = $userType;
			$arr['s'] = $filter;
			$data['row']=$this->Customercrud_model->getProfileData($id);
		    $this->load->view('dashboard_header', $data);
		    $this->load->view('credit_manager_user/Disbursement_pending_documents', $arr);

		
		}
	}
	/*-------------------------------------------------------------------------------------------------------------------------------------------- */
	
	
	public function Disbursement_pending_documents_PG()
{
	$draw = $_POST['draw'];
	$row = $_POST['start'];
	$rowperpage = $_POST['length']; 
	$columnIndex = $_POST['order'][0]['column']; 
	$columnName = $_POST['columns'][$columnIndex]['data']; 
	$columnSortOrder = $_POST['order'][0]['dir']; 
	$searchValue = $_POST['search']['value']; 
	$searchQuery = " ";
	$find_all_reverted_documents = $this->credit_manager_user_model->find_all_reverted_documents();
	//print_r($find_all_reverted_documents );
	$Uniquecode_array = array();
	$i=1;
	foreach($find_all_reverted_documents as $row)
	{			
        $Uniquecode_array[$i]=$row->USER_ID;
		
		$i++;
	}
    //print_r(array_unique($Uniquecode_array ));
	//exit();
     $pass_array=array_unique($Uniquecode_array );
	$sel = $this->credit_manager_user_model->getPending_doc_count($pass_array);
	$totalRecords =$sel;
	$sel=$this->credit_manager_user_model->searchPending_document($searchValue,$pass_array);
	$totalRecordwithFilter =$sel;
	$sel=$this->credit_manager_user_model->getPending_document_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$pass_array);
	$empRecords = $sel;
	//print_r($empRecords );
	//exit();
	$data = array();
	$Uniquecode_array = array();
	$i=0;
	foreach($empRecords as $row)
	{	
	    $edit ='<a href="'. base_url().'index.php/Credit_manager_user/Edit_pending_documents?I='. base64_encode($row->UNIQUE_CODE).'"Class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                          
		$data[] = array(
		
			"FN"=>$row->FN." ".$row->LN,
			"edit"=> $edit
		
			
	
		);
		$i++;
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

  //========================= added by priya 30-08-2022


	   public function Edit_pending_documents()
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
              $login_user_id = $this->session->userdata('ID');
            //=====================added by priyanka===============
            $user_info= $this->Operations_user_model->getProfileData($login_user_id);
            $data['userID']=$user_info->UNIQUE_CODE;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
	        $data['row']=$this->Customercrud_model->getProfileData($user_info->UNIQUE_CODE);
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $dashboard_data =$this->credit_manager_user_model->getDashboardData();  
            $data['row']=$this->Customercrud_model->getProfileData($user_info->UNIQUE_CODE);
			
			$data2['row']=$this->Customercrud_model->getProfileData($id);
            $data2['loan_details']=$this->Operations_user_model->getAplliedLoanDetails($id);
            $data2['disbursement_property_type_documents']=$this->credit_manager_user_model->get_disbursement_property_type_documents();
            $data2['disbursement_property_subtype_documents']=$this->credit_manager_user_model->get_disbursement_property_subtype_documents();
            $data2['dashboard_data'] = $dashboard_data;
            $data2['applicant_id']= $id;
			
            $this->load->view('dashboard_header',$data);
            $this->load->view('Disbursement_OPS/Credit_view_customers_disbursement_details', $data2);  
            
        }        
    }
	
	
       public function credit_show_join_subtypes()
		{
	        $data=array(
			'master_doc_id'=>$this->input->post('master_doc_id'),
			'applicant_unique_code'=>$this->input->post('applicant_unique_code'),
			 );
	       
	        $present_subtypes = $this->credit_manager_user_model->get_disbursement_property_not_available_subtype_documents_($data['master_doc_id'],$data['applicant_unique_code']);
       
          $not_present_subtypes =array();
         
			$json = array (  
							'subtypes'=>$present_subtypes,
							'not_present_subtypes'=>$not_present_subtypes,
							  );
						echo json_encode($json); 
        }
		
		//========== added by priya 28-09-2022
		 public function save_RCU_document()
    {
		
         $data=array(
                    'loan_application_id'=>$this->input->post('loan_application_id'),
                    'customer_id'=>$this->input->post('customer_id'),
		            );
		
		if(!empty($_FILES['file']['name']))
		{
				$Application_id = $this->input->post('loan_application_id');
						$unique_code=$this->input->post('customer_id');
						$Doc_type = "RCU document";
						$u_type ="Credit Manager";
						$id=$this->input->post('customer_id');
						$dirname = "Finserv/RCU_documents/".$id;
						$curlurl = "curl -X MKCOL -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
						exec($curlurl);
						$time = time();
						$fileextensionarr = explode(".",$_FILES["file"]["name"]);
						$fileextension = $fileextensionarr[1];
						$filename = $time.".".$fileextension;
						$dirname = "Finserv/RCU_documents/".$id."/";
						$filenamewithdir = $dirname.$filename;
						$correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["file"]["tmp_name"]."";
						exec($correcturl);
				   $file_input_arr = array
				   (
					'Application_id' => $Application_id,
					'Doc_name' => $Doc_type ,	
					'path' =>$dirname,
					'User'=>$u_type,
					'doc_cloud_name' => $filename,
					'Cust_Id'=>$id
					
					);
				
					$this->credit_manager_user_model->saveDocuments($file_input_arr);
					    $json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json);
					///$data_row_FI = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,'Legal','CPA');	
					//$response = array('result' => 3,'docs'=>$data_row_FI);
					//echo json_encode($response);
		}
		
			//$update=$this->credit_manager_user_model->Update_save_status_for_documentdoc_approval_details($file_input_arr,$data['Waiver_loan_document_comment_id']);
           // $json = array (  
                           // 'status'=>"success",
                            //  );
                            // echo json_encode($json);
					  
                       
    }
	
	
	public function save_FI_document()
			{
				$data=array(
                    'loan_application_id'=>$this->input->post('loan_application_id'),
                    'customer_id'=>$this->input->post('customer_id'),
		            );
				if(!empty($_FILES['file']['name']))
				{
						$Application_id = $this->input->post('loan_application_id');
						$unique_code=$this->input->post('customer_id');
						$Doc_type = "FI document";
						$u_type ="Credit Manager";
						$id=$this->input->post('customer_id');
						$dirname = "Finserv/FI_documents/".$id;
						$curlurl = "curl -X MKCOL -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
						exec($curlurl);
						$time = time();
						$fileextensionarr = explode(".",$_FILES["file"]["name"]);
						$fileextension = $fileextensionarr[1];
						$filename = $time.".".$fileextension;
						$dirname = "Finserv/FI_documents/".$id."/";
						$filenamewithdir = $dirname.$filename;
						$correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["file"]["tmp_name"]."";
						exec($correcturl);
						$file_input_arr = array
						(
						'Application_id' => $Application_id,
						'Doc_name' => $Doc_type ,	
						'path' =>$dirname,
						'User'=>$u_type,
						'doc_cloud_name' => $filename,
						'Cust_Id'=>$id
						);
						$this->credit_manager_user_model->saveDocuments($file_input_arr);
						$json = array (  
									'status'=>"success",
									  );
						echo json_encode($json);

				}

                       
			}	
			 public function save_technical_document()
			{
				$data=array(
                    'loan_application_id'=>$this->input->post('loan_application_id'),
                    'customer_id'=>$this->input->post('customer_id'),
		            );
				if(!empty($_FILES['file']['name']))
				{
						$Application_id = $this->input->post('loan_application_id');
						$unique_code=$this->input->post('customer_id');
						$Doc_type = "Technical document";
						$u_type ="Credit Manager";
						$id=$this->input->post('customer_id');
						$dirname = "Finserv/Technical_documents/".$id;
						$curlurl = "curl -X MKCOL -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
						exec($curlurl);
						$time = time();
						$fileextensionarr = explode(".",$_FILES["file"]["name"]);
						$fileextension = $fileextensionarr[1];
						$filename = $time.".".$fileextension;
						$dirname = "Finserv/Technical_documents/".$id."/";
						$filenamewithdir = $dirname.$filename;
						$correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["file"]["tmp_name"]."";
						exec($correcturl);
						$file_input_arr = array
						(
						'Application_id' => $Application_id,
						'Doc_name' => $Doc_type ,	
						'path' =>$dirname,
						'User'=>$u_type,
						'doc_cloud_name' => $filename,
						'Cust_Id'=>$id
						);
						$this->credit_manager_user_model->saveDocuments($file_input_arr);
						$json = array (  
									'status'=>"success",
									  );
						echo json_encode($json);

				}

                       
			}	
			public function save_legal_document()
			{
				$data=array(
                    'loan_application_id'=>$this->input->post('loan_application_id'),
                    'customer_id'=>$this->input->post('customer_id'),
		            );
				if(!empty($_FILES['file']['name']))
				{
						$Application_id = $this->input->post('loan_application_id');
						$unique_code=$this->input->post('customer_id');
						$Doc_type = "Legal document";
						$u_type ="Credit Manager";
						$id=$this->input->post('customer_id');
						$dirname = "Finserv/Legal_documents/".$id;
						$curlurl = "curl -X MKCOL -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
						exec($curlurl);
						$time = time();
						$fileextensionarr = explode(".",$_FILES["file"]["name"]);
						$fileextension = $fileextensionarr[1];
						$filename = $time.".".$fileextension;
						$dirname = "Finserv/Legal_documents/".$id."/";
						$filenamewithdir = $dirname.$filename;
						$correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["file"]["tmp_name"]."";
						exec($correcturl);
						$file_input_arr = array
						(
						'Application_id' => $Application_id,
						'Doc_name' => $Doc_type ,	
						'path' =>$dirname,
						'User'=>$u_type,
						'doc_cloud_name' => $filename,
						'Cust_Id'=>$id
						);
						$this->credit_manager_user_model->saveDocuments($file_input_arr);
						$json = array (  
									'status'=>"success",
									  );
						echo json_encode($json);

				}

                       
			}	
			
				public function save_Report_document()
			{
				$data=array(
                    'loan_application_id'=>$this->input->post('loan_application_id'),
                    'customer_id'=>$this->input->post('customer_id'),
					'select_repot_name'=>$this->input->post('select_repot_name'),
		            );
				if($data['select_repot_name']== "CRIF")
				{
					$id=$this->input->post('select_user_name');
				}
				else
				{
					$id=$this->input->post('customer_id');
				}
				if(!empty($_FILES['file']['name']))
				{
						$Application_id = $this->input->post('loan_application_id');
						$unique_code=$this->input->post('customer_id');
						$u_type ="Credit Manager";
						
						
						if($data['select_repot_name']== "Legal document")
						{
							$Doc_type = "Legal document";
							$dirname = "Finserv/Legal_documents/".$id;
						}
						else if($data['select_repot_name']== "Technical document")
						{
							$Doc_type = "Technical document";
							$dirname = "Finserv/Technical_documents/".$id;
						}
						else if($data['select_repot_name']== "FI document")
						{
							$Doc_type = "FI document";
							$dirname = "Finserv/FI_documents/".$id;
						}
						else if($data['select_repot_name']== "RCU document")
						{
							$Doc_type = "RCU document";
							$dirname = "Finserv/RCU_documents/".$id;
						}
						else if($data['select_repot_name']== "Court case document")
						{
							$Doc_type = "Court case document";
							$dirname = "Finserv/Court_case_document/".$id;
						}
						else if($data['select_repot_name']== "CRIF")
						{
							$Doc_type = "CRIF";
							$dirname = "Finserv/CRIF/".$id;
						}
						else if($data['select_repot_name']== "Legal Document Search")
						{
							$Doc_type = "Legal Document Search";
							$dirname = "Finserv/Legal_Document_Search/".$id;
						}
					else if($data['select_repot_name']== "Income Analysis bank statement")
						{
							$Doc_type = "Income Analysis bank statement";
							$dirname = "Finserv/IncomeAnalysisbankstatement/".$id;
						}
						else if($data['select_repot_name']== "CAM Excel")
						{
							$Doc_type = "CAM Excel";
							$dirname = "Finserv/CAMExcel/".$id;
						}
						
					     $curlurl = "curl -X MKCOL -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
						exec($curlurl);
						$time = time();
						$fileextensionarr = explode(".",$_FILES["file"]["name"]);
						$fileextension = $fileextensionarr[1];
						$filename = $time.".".$fileextension;
						
						
						if($data['select_repot_name']== "Legal document")
						{
							
							$dirname = "Finserv/Legal_documents/".$id."/";
						}
						else if($data['select_repot_name']== "Technical document")
						{
							$dirname = "Finserv/Technical_documents/".$id."/";
						}
						else if($data['select_repot_name']== "FI document")
						{
							$dirname = "Finserv/FI_documents/".$id."/";
						}
						else if($data['select_repot_name']== "RCU document")
						{
							$dirname = "Finserv/RCU_documents/".$id."/";
						}
						else if($data['select_repot_name']== "Court case document")
						{
							$dirname = "Finserv/Court_case_document/".$id."/";
						}
						else if($data['select_repot_name']== "CRIF")
						{
							$dirname = "Finserv/CRIF/".$id."/";
						}
						else if($data['select_repot_name']== "Legal Document Search")
						{
							$dirname = "Finserv/Legal_Document_Search/".$id."/";
						}
						else if($data['select_repot_name']== "Income Analysis bank statement")
						{
							
							$dirname = "Finserv/IncomeAnalysisbankstatement/".$id."/";;
						}
						else if($data['select_repot_name']== "CAM Excel")
						{
							
							$dirname = "Finserv/CAMExcel/".$id."/";
						}
						
						$filenamewithdir = $dirname.$filename;
						$correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["file"]["tmp_name"]."";
						exec($correcturl);
						 if($data['select_repot_name']== "CAM Excel")
						{
							     $file_input_arr = array(
								'USER_ID' => $id,
								'DOC_TYPE' =>'CAM Excel',	
								'DOC_NAME' => $filename,
								'DOC_SIZE' => $_FILES['file']['size'],
								'DOC_FILE_TYPE' => $_FILES['file']['type'],
								'DOC_MASTER_TYPE' => 'CAM Excel',
								'doc_cloud_name' => $filename,
								'doc_cloud_dir' => $dirname
							);
							$docid = $this->Customercrud_model->saveDocuments($file_input_arr);
						}
						else
						{
								$file_input_arr = array
								(
								'Application_id' => $Application_id,
								'Doc_name' => $Doc_type ,	
								'path' =>$dirname,
								'User'=>$u_type,
								'doc_cloud_name' => $filename,
								'Cust_Id'=>$id
								);
							$this->credit_manager_user_model->saveDocuments($file_input_arr);
						}
						$json = array (  
									'status'=>"success",
									  );
						echo json_encode($json);

				}

                       
			}
			
			public function save_KYC_document()
			{
				$data=array(
                    'loan_application_id'=>$this->input->post('loan_application_id'),
                    //'customer_id'=>$this->input->post('customer_id'),
					'select_KYC_document_name'=>$this->input->post('select_KYC_document_name'),
		            );
						$id=$this->input->post('select_KYC_user_name');
					//print_r($data);
					
						if(!empty($_FILES['file']['name']))
				{
						$Application_id = $this->input->post('loan_application_id');
						$unique_code=$this->input->post('select_KYC_user_name');
						
							$Doc_type = "KYC";
							$dirname = "Finserv/KYC/".$id;
						
					     $curlurl = "curl -X MKCOL -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
						exec($curlurl);
						$time = time();
						$fileextensionarr = explode(".",$_FILES["file"]["name"]);
						$fileextension = $fileextensionarr[1];
						$filename = $time.".".$fileextension;
						
					    $dirname = "Finserv/KYC/".$id."/";
						
						
						
						$filenamewithdir = $dirname.$filename;
						$correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["file"]["tmp_name"]."";
						exec($correcturl);
					
					
					
								 $file_input_arr = array(
								'USER_ID' => $id,
								'DOC_TYPE' =>$data['select_KYC_document_name'],	
								'DOC_NAME' => $filename,
								'DOC_SIZE' => $_FILES['file']['size'],
								'DOC_FILE_TYPE' => $_FILES['file']['type'],
								'DOC_MASTER_TYPE' => 'KYC',
								'doc_cloud_name' => $filename,
								'doc_cloud_dir' => $dirname
							);
							$docid = $this->Customercrud_model->saveDocuments($file_input_arr);
						
						
						$json = array (  
									'status'=>"success",
									  );
						echo json_encode($json);
				}
				}
}
?>