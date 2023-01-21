<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Relationship_Officer extends CI_Controller 
    {

		public function __construct() {
			parent:: __construct();

			$this->load->helper('url');
			$this->load->library("pagination");
			$this->load->library('session');
			$this->load->library('upload');
			$this->load->helper(array('form', 'url'));
			$this->load->model('credit_manager_user_model');
			$this->load->model('Customercrud_model');
			$this->load->model('Dsacrud_model');
			$this->load->model('Operations_user_model');
			$this->load->model('HR_model');
			$this->load->model('Admin_model');
			$this->load->library('email');
			
			if($this->session->userdata('SITE') != 'finserv'){
				
            redirect(base_url('index.php/login'));
        }
		}

		public function index()
		{
			//echo $this->session->userdata("USER_TYPE");
			//exit();
			if($this->session->userdata("USER_TYPE") == ''){
				$data['showNav'] = 0;
				$data['error'] = '';
				$age = $this->session->userdata('AGE');
				$data['userType'] = "none";
				$data['age'] = $age;
				$this->load->view('header', $data);
			
				$this->load->view('login');
				
			}
			else{
				if($this->session->userdata('login_count')==0)
				{
				 $this->session->set_flashdata('sucess','sucess');
				 redirect('dsa/reset_password');
				}
				else{
					$this->load->helper('url');
				$age = $this->session->userdata('AGE');
				$data['showNav'] = 1;
				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				//$this->load->view('header', $data);
				$id = $this->session->userdata('ID');
				
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
				 $Relationship=$this->Admin_model->get_RO($id);
				// print_r($Relationship);
				 //exit;
				 $Start_Date = date('Y-m-01'); 
				$End_Date  = date('Y-m-t');
				 $dashboard_data = $this->Admin_model->current_month($Start_Date,$End_Date,$id);
				
		         $data['current']=$dashboard_data;
				 $data['Start_Date'] = $Start_Date;
				 $data['End_Date'] = $End_Date;
				 
				  $dashboard_data = $this->Admin_model->current_month1($Start_Date,$End_Date,$id);
				    $data['ntbcurrent']=$dashboard_data;
				 
				  $dashboard_data = $this->Admin_model->current_month2($Start_Date,$End_Date,$id,$Relationship);
				    $data['leadcurrent']=$dashboard_data;	
					
				  $Curr_Date = date('Y-m-d');
				 $Today_Date  = date('Y-m-d');
				 $dashboard = $this->Admin_model->current_month($Curr_Date,$Today_Date,$id);
		         $data['today']=$dashboard;
				 
				 $dashboard = $this->Admin_model->current_month1($Curr_Date,$Today_Date,$id);
		         $data['ntbtoday']=$dashboard;
				 
				 $dashboard = $this->Admin_model->current_month2($Curr_Date,$Today_Date,$id,$Relationship);
		         $data['leadtoday']=$dashboard;
				 
				  $dashboard = $this->Admin_model->bureau_pull($Start_Date,$End_Date,$id);
		         $data['bureau_pull']=$dashboard;
				 
				 
				 $dashboard = $this->Admin_model->today_pull($Curr_Date,$Today_Date,$id);
		         $data['bureautoday']=$dashboard;
		        
				  $dashboard = $this->Admin_model->current_month3($Curr_Date,$Today_Date,$id);
		         $data['existingtoday']=$dashboard;
				 
				  $dashboard = $this->Admin_model->current_month3($Start_Date,$End_Date,$id);
		         $data['existing']=$dashboard;
				 
				$data['username'] =$user_name;
				$data['row']=$this->Customercrud_model->getProfileData($id);
				//$dashboard_data = $this->Dsacrud_model->getDashboardData($id);  
				$dashboard_data = $this->Admin_model->getDashboardData3($id);    // added by sonal 24-02-2022        
		
				
				$data['dashboard_data'] = $dashboard_data;
				$this->load->view('dashboard_header', $data);
				$this->load->view('Relationship_Officer/Dashboard', $data);
				}
				//$this->load->view('footer');
			}
		}

		public function MIS_Updates(){
			if($this->session->userdata("USER_TYPE") == ''){
				$data['showNav'] = 0;
				$data['error'] = '';
				$age = $this->session->userdata('AGE');
				$data['userType'] = "none";
				$data['age'] = $age;
				$this->load->view('header', $data);
			
				$this->load->view('login');
				
			}
			else{
				if($this->session->userdata('login_count')==0)
				{
				 $this->session->set_flashdata('sucess','sucess');
				 redirect('dsa/reset_password');
				}
				else{
					$this->load->helper('url');
				$age = $this->session->userdata('AGE');
				$data['showNav'] = 1;
				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				//$this->load->view('header', $data);
				$id = $this->session->userdata('ID');
					
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
				$data['row']=$this->Customercrud_model->getProfileData($id);
				//$dashboard_data = $this->Dsacrud_model->getDashboardData($id);  
				$dashboard_data = $this->Admin_model->getDashboardData3($id);    // added by sonal 24-02-2022        
						
				$lead_area =$this->Admin_model->get_branch_location();	
				$data['lead_area']=$lead_area;
				$data['dashboard_data'] = $dashboard_data;
				$this->load->view('dashboard_header', $data);
				$this->load->view('MIS_Update',$data);
				}
				//$this->load->view('footer');
			}
			
		}
		//------------------------------------------added by pooja----------------------------//
			public function dsaform()
			{

				$id = $this->session->userdata('ID');
				
				$array_input = array(
				
				'RO_ID'=>$id ,
				'meeting ' => $this->input->post('dsa_meeting'),
				'meeting_type'=>$this->input->post('dsa_meeting_type'),
				'dsa_connector_name' => $this->input->post('dname'),
				'dsa_connector_mobile' =>$this->input->post('dmobile'),
				'dsa_connector_office_name' => $this->input->post('doffice'),
				'dsa_connector_address' =>$this->input->post('daddress'),
				'any_file_disbussed '=>$this->input->post('dfile'),
				'name_reffered_dsa '=>$this->input->post('name_customer'),
				'dsa_onboarding'=>$this->input->post('dsa_onboarding'),
				'meeting_photo '=>$this->input->post('meeting_photo'),
				'revisit_date  '=>$this->input->post('rdate'),
				'remarks'=>$this->input->post('remark'),
				'pincode'=>$this->input->post('pincode'),
				'city'=>$this->input->post('city'),
				 'last_updated_date'=> date("Y-m-d"),
				);
				//print_r($array_input);
				//exit;
				$getdata = $this->Admin_model->savedata($array_input);
				 /* $isIdExist_dsavisit = $this->Admin_model->isIdExist_dsavisit($id);
					if(!empty($isIdExist_dsavisit))
					{
						$getdata = $this->Admin_model->update_dsavisit($id,$array_input);
					}
					else{
					  $getdata = $this->Admin_model->savedata($array_input);
					}
				*/

				  if($getdata == '')
					{
						
						$_SESSION['result'] = "error";
					}
					else
					{
						$_SESSION['result'] = "Success";
						
					}  
					redirect('Relationship_Officer/MIS_Updates');
			}
//------------------------------for NTB---------------------------------//
			public function Ntbform()
			{
				$id = $this->session->userdata('ID');
				
				$array_input = array(
				'RO_ID'=>$id ,
				'date_of_meeting ' => date("Y-m-d"),
				'product'=>$this->input->post('ntb_pro'),
				'cust_name' => $this->input->post('ntb_name'),
				'cust_number' =>$this->input->post('ntb_number'),
				'cust_email' => $this->input->post('ntb_email'),
				'address_meeting' =>$this->input->post('ntb_address'),
				'cust_location '=>$this->input->post('ntb_location'),
				'customer_insterest '=>$this->input->post('ntb_interest'),
				'next_action_date'=>$this->input->post('ntby_date'),
				'applicant_name '=>$this->input->post('ntby_name'),
				'applicant_income  '=>$this->input->post('ntby_income'),
				'applicant_bureu_score'=>$this->input->post('ntby_score'),
				'applicant_is'=>$this->input->post('ntby_appli'),
				'coapplicant_name'=>$this->input->post('ntby_coappliname'),
				'coapplicant_income'=>$this->input->post('ntby_coincome'),
				'coapplicant_bruer_score'=>$this->input->post('ntby_coscore'),
				'coapplicant_is'=>$this->input->post('ntby_coappli'),
				'custyes_profile'=>$this->input->post('ntby_profile'),
				'custyes_type'=>$this->input->post('ntby_type'),
				'custyes_loan'=>$this->input->post('ntby_loan'),
				'custyes_area'=>$this->input->post('ntby_area'),
				'custyes_laedass'=>$this->input->post('ntby_lead'),
				'custyes_purpose'=>$this->input->post('ntby_purpose'),
				'custyes_remarks'=>$this->input->post('ntby_remark'),
				'custyes_selfy'=>$this->input->post('ntby_selfy'),
				'custno_inst'=>$this->input->post('ntbn_customer'),
				'custno_folldate'=>$this->input->post('ntbn_foldate'),
				'pincode'=>$this->input->post('pincode1'),
				'city'=>$this->input->post('city1'),
				 'last_updated_date'=> date("Y-m-d"),
				);
				 $getdata = $this->Admin_model->ntbdata($array_input);
				/*$isIdExist_ntbvisit = $this->Admin_model->isIdExist_ntbvisit($id);
					if(!empty($isIdExist_ntbvisit))
					{
						$getdata = $this->Admin_model->update_ntbform($id,$array_input);
					}
					else{
					  $getdata = $this->Admin_model->ntbdata($array_input);
					}*/
				  if($getdata == '')
					{
						$_SESSION['result'] = "error";
					}
					else
					{
						$_SESSION['result'] = "Success";
					}  
					redirect('Relationship_Officer/MIS_Updates');
			}
			
//----------------------------------for Existing Customer------------------------------------//
		public function Existingform()
			{
				$id = $this->session->userdata('ID');
				
				$array_input = array(
				'RO_ID'=>$id ,
				'exist_date_of_meeting ' => date("Y-m-d"),
				'exist_product'=>$this->input->post('exit_product'),
				'exist_cust_name' => $this->input->post('exit_name'),
				'exist_cust_number' =>$this->input->post('exit_number'),
				'exist_address_meeting' => $this->input->post('exit_add'),
				'reason_follow_meeting' =>$this->input->post('exit_reason'),
				'pincode'=>$this->input->post('pincode2'),
				'city'=>$this->input->post('city2'),
				 'last_updated_date'=> date("Y-m-d"),
				);
				 $getdata = $this->Admin_model->existingdata($array_input);
				 /* $isIdExist_existingvisit = $this->Admin_model->isIdExist_existingvisit($id);
					if(!empty($isIdExist_existingvisit))
					{
						$getdata = $this->Admin_model->update_existingform($id,$array_input);
					}
					else{
					  $getdata = $this->Admin_model->existingdata($array_input);
					}*/
				
				  if($getdata == '')
					{
						$_SESSION['result'] = "error";
					}
					else
					{
						$_SESSION['result'] = "Success";
					}  
					redirect('Relationship_Officer/MIS_Updates');
			}
			
//----------------------------------------for lead----------------------------------------//
			public function Leadform()
			{
				$id = $this->session->userdata('ID');
				
				$array_input = array(
				'RO_ID'=>$id ,
				'lead_type ' => $this->input->post('lead_type'),
				'area_lead'=>$this->input->post('lead_area'),
				'lead_name' => $this->input->post('lead_name'),
				'lead_number' =>$this->input->post('lead_num'),
				'lead_address' => $this->input->post('lead_add'),
				'lead_assign' =>$this->input->post('lead_ass'),
				'lead_branch' =>$this->input->post('lead_branch'),
				'lead_assign_to' =>$this->input->post('lead_assito'),
				'lead_status' =>$this->input->post('lead_status'),
				'lead_reasons' =>$this->input->post('lead_reason'),
				 'last_updated_date'=> date("Y-m-d"),
				);
				$getdata = $this->Admin_model->leaddata($array_input);
				/*$isIdExist_leadvisit = $this->Admin_model->isIdExist_leadvisit($id);
					if(!empty($isIdExist_leadvisit))
					{
						$getdata = $this->Admin_model->update_leadform($id,$array_input);
					}
					else{
					  $getdata = $this->Admin_model->leaddata($array_input);
					}*/
				  if($getdata == '')
					{
						$_SESSION['result'] = "error";
					}
					else
					{
						$_SESSION['result'] = "Success";
					}  
					redirect('Relationship_Officer/MIS_Updates');
			}
		//------------------------------------------end by pooja------------------------------//
		
		
		//---------------------------------added by pooja-----------------------------//

	
	
public function RO_souring(){
		
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/login'));
    }
    else{
        $id = $this->input->get('id');
        if($id == '')$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');
        $date = $this->input->get('date');
        $userType2 = $this->input->get('userType2');
        if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
		if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['Start_Date'];
         }
         else{
             $data['End_Date']='';
         }
         if(isset($_GET['filter']))
         {
           $data['filter_by']=$_GET['filter'];
         }else{
              $data['filter_by']='';
         }
         if(isset($_GET['range']))
         {
           $data['range']=$_GET['range'];
         }
         else
         {
             $data['range']='';
         }
          if(isset($_GET['RB']))
         {
           $data['RB']=$_GET['RB'];
         }
         else
         {
             $data['RB']='';
         }
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
        $this->load->helper('url');
        $this->load->model('Dsacustomers_model');
         if($userType=='Relationship_Officer')
        {
             $customers=  $this->Dsacustomers_model->getALLCustomers($id,$userType);        }
        else
        {
            $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
        }
       // $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
       
        $_SESSION["data_for_excel"] =   $customers ;
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
		$Start_Date = date('Y-m-01'); 
				$End_Date  = date('Y-m-t');
				 $customers = $this->Admin_model->current_month($Start_Date,$End_Date,$id);
		         $arr['customers']=$customers;
		
        $data['username'] =$user_name;
        $arr['userType'] = $userType;
      
	  
        $this->load->view('dashboard_header', $data);
        if($userType=='Relationship_Officer')
        {
            $this->load->view('admin/RO_souring',$arr);
        }
        else
        {
            $this->load->view('admin/Operational_users_customers', $arr);
        }
      
        
    }
}

	
public function RO_sourings()
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
  
  $Start_Date=$_POST['Start_Date'];

  $End_Date=$_POST['End_Date'];
 
 
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_dsavisit($id,$userType);
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_customers_Admin_filters($id,$searchValue,$Start_Date,$End_Date);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_customers_Admin_filter_paginations($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
  $empRecords = $sel;
  $data = array();
        foreach($empRecords as $row)
        {
          $data[] = array(
                "ID"=>$row->id,
				 "Meeting"=>$row->last_updated_date,
				 "Meeting type"=>$row->meeting_type,
                "FN"=>$row->dsa_connector_name,
                "Mobile"=>$row->dsa_connector_mobile,
                "Office_name"=>$row->dsa_connector_office_name,
               "Customer reffered"=>$row->name_reffered_dsa,
				"Revisit_date"=>$row->revisit_date,
				"Remarks"=>$row->remarks,
              
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
	  
	  
	  public function Today_souring(){
		
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/login'));
    }
    else{
        $id = $this->input->get('id');
        if($id == '')$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');
        $date = $this->input->get('date');
        $userType2 = $this->input->get('userType2');
        if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
		if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']="";
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['Start_Date'];
         }
         else{
             $data['End_Date']="";
         }
         if(isset($_GET['filter']))
         {
           $data['filter_by']=$_GET['filter'];
         }else{
              $data['filter_by']='';
         }
         if(isset($_GET['range']))
         {
           $data['range']=$_GET['range'];
         }
         else
         {
             $data['range']='';
         }
          if(isset($_GET['RB']))
         {
           $data['RB']=$_GET['RB'];
         }
         else
         {
             $data['RB']='';
         }
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
        $this->load->helper('url');
        $this->load->model('Dsacustomers_model');
         if($userType=='Relationship_Officer')
        {
             $customers=  $this->Dsacustomers_model->getALLCustomers($id,$userType);        }
        else
        {
            $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
        }
       // $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
       
        $_SESSION["data_for_excel"] =   $customers ;
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
		  $Curr_Date = date('Y-m-d');
				 $Today_Date  = date('Y-m-d');
				 $today = $this->Admin_model->current_month($Curr_Date,$Today_Date,$id);
		         $arr['today']=$today;
		//$customers = $this->Admin_model->get_all_dsavisit();
        $data['username'] =$user_name;
        $arr['userType'] = $userType;
      // $arr['customers'] = $customers;
	  
        $this->load->view('dashboard_header', $data);
        if($userType=='Relationship_Officer')
        {
            $this->load->view('admin/Today_souring',$arr);
        }
        else
        {
            $this->load->view('admin/Operational_users_customers', $arr);
        }
      
        
    }
}

 public function tod_sourings()
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

   $Start_Date=date('Y-m-d');

  $End_Date=date('Y-m-d');
  
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_dsavisit($id,$userType);
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_customers_Admin_filters($id,$searchValue,$Start_Date,$End_Date);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_customers_Admin_filter_paginations($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
  $empRecords = $sel;
  $data = array();
        foreach($empRecords as $row)
        {
          $data[] = array(
                "ID"=>$row->id,
				 "Meeting"=>$row->last_updated_date,
                "FN"=>$row->dsa_connector_name,
                "Mobile"=>$row->dsa_connector_mobile,
                "Office_name"=>$row->dsa_connector_office_name,
                
				"Revisit_date"=>$row->revisit_date,
				"Remarks"=>$row->remarks,
              
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
	  
 //------------------------------for Ntb---------------------------//
 public function Ntb_souring(){
		
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/login'));
    }
    else{
        $id = $this->input->get('id');
        if($id == '')$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');
        $date = $this->input->get('date');
        $userType2 = $this->input->get('userType2');
        if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
		if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['Start_Date'];
         }
         else{
             $data['End_Date']='';
         }
         if(isset($_GET['filter']))
         {
           $data['filter_by']=$_GET['filter'];
         }else{
              $data['filter_by']='';
         }
         if(isset($_GET['range']))
         {
           $data['range']=$_GET['range'];
         }
         else
         {
             $data['range']='';
         }
          if(isset($_GET['RB']))
         {
           $data['RB']=$_GET['RB'];
         }
         else
         {
             $data['RB']='';
         }
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
        $this->load->helper('url');
        $this->load->model('Dsacustomers_model');
         if($userType=='Relationship_Officer')
        {
             $customers=  $this->Dsacustomers_model->getALLCustomers($id,$userType);        }
        else
        {
            $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
        }
       // $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
       
        $_SESSION["data_for_excel"] =   $customers ;
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
		$Start_Date = date('Y-m-01'); 
				$End_Date  = date('Y-m-t');
				 $customers = $this->Admin_model->current_month1($Start_Date,$End_Date,$id);
		         $arr['customers']=$customers;
		
        $data['username'] =$user_name;
        $arr['userType'] = $userType;
      
	  
        $this->load->view('dashboard_header', $data);
        if($userType=='Relationship_Officer')
        {
            $this->load->view('admin/Ntb_souring',$arr);
        }
        else
        {
            $this->load->view('admin/Operational_users_customers', $arr);
        }
      
        
    }
}

	
public function Ntb_sourings()
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
  
  $Start_Date=$_POST['Start_Date'];

  $End_Date=$_POST['End_Date'];
 
 
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_ntbvisit($id,$userType);
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_customers_Admin_filters1($id,$searchValue,$Start_Date,$End_Date);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_customers_Admin_filter_paginations1($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
  $empRecords = $sel;
  $data = array();
        foreach($empRecords as $row)
        {
			if($row->customer_insterest=='Yes')
			{
			 $edit =' <a href="'.base_url().'index.php/Relationship_Officer/NewMisUpdates?I='.base64_encode($row->id).'"$class="btn modal_test" ><i class="fa fa-edit text-right" style="color:blue;" ></i></a>';
			}
			else{
				 $edit =' <a href="'.base_url().'index.php/Relationship_Officer/NewMisUpdates" class="btn modal_test disabled" ><i class="fa fa-edit text-right" style="color:blue;"  ></i></a>';
			
			}
          $data[] = array(
                "ID"=>$row->id,
				 "Meeting"=>$row->last_updated_date,
                "PRODUCT"=>$row->product,
                "NAME"=>$row->cust_name,
                "NUMBER"=>$row->cust_number,
                "EMAIL"=>$row->cust_email,
                "LOCATION"=>$row->cust_location,
                "INSTEREST"=>$row->customer_insterest,
				"edit"=>$edit ,
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
	  
	  
	    public function Todayntb_souring(){
		
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/login'));
    }
    else{
        $id = $this->input->get('id');
        if($id == '')$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');
        $date = $this->input->get('date');
        $userType2 = $this->input->get('userType2');
        if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
		if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']="";
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['Start_Date'];
         }
         else{
             $data['End_Date']="";
         }
         if(isset($_GET['filter']))
         {
           $data['filter_by']=$_GET['filter'];
         }else{
              $data['filter_by']='';
         }
         if(isset($_GET['range']))
         {
           $data['range']=$_GET['range'];
         }
         else
         {
             $data['range']='';
         }
          if(isset($_GET['RB']))
         {
           $data['RB']=$_GET['RB'];
         }
         else
         {
             $data['RB']='';
         }
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
        $this->load->helper('url');
        $this->load->model('Dsacustomers_model');
         if($userType=='Relationship_Officer')
        {
             $customers=  $this->Dsacustomers_model->getALLCustomers($id,$userType);        }
        else
        {
            $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
        }
       // $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
       
        $_SESSION["data_for_excel"] =   $customers ;
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
		  $Curr_Date = date('Y-m-d');
				 $Today_Date  = date('Y-m-d');
				 $today = $this->Admin_model->current_month1($Curr_Date,$Today_Date,$id);
		         $arr['ntbtoday']=$today;
		//$customers = $this->Admin_model->get_all_dsavisit();
        $data['username'] =$user_name;
        $arr['userType'] = $userType;
      // $arr['customers'] = $customers;
	  
        $this->load->view('dashboard_header', $data);
        if($userType=='Relationship_Officer')
        {
            $this->load->view('admin/Todayntb_souring',$arr);
        }
        else
        {
            $this->load->view('admin/Operational_users_customers', $arr);
        }
      
        
    }
}

 public function Todayntb_sourings()
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
  
   $Start_Date=date('Y-m-d');

  $End_Date=date('Y-m-d');
 
 
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_ntbvisit($id,$userType);
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_customers_Admin_filters1($id,$searchValue,$Start_Date,$End_Date);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_customers_Admin_filter_paginations1($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
  $empRecords = $sel;
  $data = array();
        foreach($empRecords as $row)
        {
			if($row->customer_insterest=='Yes')
			{
			 $edit =' <a href="'.base_url().'index.php/Relationship_Officer/NewMisUpdates?I='.base64_encode($row->id).'"$class="btn modal_test" ><i class="fa fa-edit text-right" style="color:blue;" ></i></a>';
			}
			else{
				 $edit =' <a href="'.base_url().'index.php/Relationship_Officer/NewMisUpdates" class="btn modal_test disabled" ><i class="fa fa-edit text-right" style="color:blue;"  ></i></a>';
			
			}
          $data[] = array(
                "ID"=>$row->id,
				 "Meeting"=>$row->last_updated_date,
                "PRODUCT"=>$row->product,
                "NAME"=>$row->cust_name,
                "NUMBER"=>$row->cust_number,
                "EMAIL"=>$row->cust_email,
                "LOCATION"=>$row->cust_location,
                "INSTEREST"=>$row->customer_insterest,
				"edit"=>$edit ,
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
	 
//-----------------------------------For lead----------------------------------//

 public function Lead_souring(){
		
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/login'));
    }
    else{
        $id = $this->input->get('id');
        if($id == '')$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');
        $date = $this->input->get('date');
        $userType2 = $this->input->get('userType2');
        if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
		if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['Start_Date'];
         }
         else{
             $data['End_Date']='';
         }
         if(isset($_GET['filter']))
         {
           $data['filter_by']=$_GET['filter'];
         }else{
              $data['filter_by']='';
         }
         if(isset($_GET['range']))
         {
           $data['range']=$_GET['range'];
         }
         else
         {
             $data['range']='';
         }
          if(isset($_GET['RB']))
         {
           $data['RB']=$_GET['RB'];
         }
         else
         {
             $data['RB']='';
         }
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
        $this->load->helper('url');
        $this->load->model('Dsacustomers_model');
         if($userType=='Relationship_Officer')
        {
             $customers=  $this->Dsacustomers_model->getALLCustomers($id,$userType);        }
        else
        {
            $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
        }
       // $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
       
        $_SESSION["data_for_excel"] =   $customers ;
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
		$Start_Date = date('Y-m-01'); 
				$End_Date  = date('Y-m-t');
				 $Relationship=$this->Admin_model->get_RO($id);
				 $customers = $this->Admin_model->current_month2($Start_Date,$End_Date,$id,$Relationship);
		         $arr['customers']=$customers;
		
        $data['username'] =$user_name;
        $arr['userType'] = $userType;
      
	  
        $this->load->view('dashboard_header', $data);
        if($userType=='Relationship_Officer')
        {
            $this->load->view('admin/Lead_souring',$arr);
        }
        else
        {
            $this->load->view('admin/Operational_users_customers', $arr);
        }
      
        
    }
}

	
public function Lead_sourings()
      {
        $id = $this->input->get('id');
        if($id == '')$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');

        $date = $this->input->get('date');
        $userType2 = $this->input->get('userType2');
        if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
			$Relationship=$this->Admin_model->get_RO($id);
  # Read value
  $draw = $_POST['draw'];
  $row = $_POST['start'];
  $rowperpage = $_POST['length']; // Rows display per page
  $columnIndex = $_POST['order'][0]['column']; // Column index
  
  $Start_Date=$_POST['Start_Date'];

  $End_Date=$_POST['End_Date'];
 
 
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_leadvisit($id,$userType,$Relationship);
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_customers_Admin_filters2($id,$searchValue,$Start_Date,$End_Date,$Relationship);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_customers_Admin_filter_paginations2($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date,$Relationship);
  $empRecords = $sel;
  $data = array();
        foreach($empRecords as $row)
        {
          $data[] = array(
               "ID"=>$row->id,
			    "Meeting"=>$row->last_updated_date,
                "LEADTYPE"=>$row->lead_type,
                "AREA"=>$row->area_lead,
                "NAME"=>$row->lead_name,
                "NUMBER"=>$row->lead_number,
                "ADDRESS"=>$row->lead_address,
              
				 "LEADSTATUS"=>$row->lead_status,
				 "LEADREASON"=>$row->lead_reasons,
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
	  
	  
	    public function Todaylead_souring(){
		
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/login'));
    }
    else{
        $id = $this->input->get('id');
        if($id == '')$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');
        $date = $this->input->get('date');
        $userType2 = $this->input->get('userType2');
        if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
		
		if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']="";
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['Start_Date'];
         }
         else{
             $data['End_Date']="";
         }
         if(isset($_GET['filter']))
         {
           $data['filter_by']=$_GET['filter'];
         }else{
              $data['filter_by']='';
         }
         if(isset($_GET['range']))
         {
           $data['range']=$_GET['range'];
         }
         else
         {
             $data['range']='';
         }
          if(isset($_GET['RB']))
         {
           $data['RB']=$_GET['RB'];
         }
         else
         {
             $data['RB']='';
         }
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
        $this->load->helper('url');
        $this->load->model('Dsacustomers_model');
         if($userType=='Relationship_Officer')
        {
             $customers=  $this->Dsacustomers_model->getALLCustomers($id,$userType);        }
        else
        {
            $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
        }
       // $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
       
        $_SESSION["data_for_excel"] =   $customers ;
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
		  $Curr_Date = date('Y-m-d');
				 $Today_Date  = date('Y-m-d');
				  $Relationship=$this->Admin_model->get_RO($id);
				 $today = $this->Admin_model->current_month2($Curr_Date,$Today_Date,$id, $Relationship);
		         $arr['leadtoday']=$today;
		//$customers = $this->Admin_model->get_all_dsavisit();
        $data['username'] =$user_name;
        $arr['userType'] = $userType;
      // $arr['customers'] = $customers;
	  
        $this->load->view('dashboard_header', $data);
        if($userType=='Relationship_Officer')
        {
            $this->load->view('admin/Todaylead_souring',$arr);
        }
        else
        {
            $this->load->view('admin/Operational_users_customers', $arr);
        }
      
        
    }
}

 public function Todaylead_sourings()
      {
        $id = $this->input->get('id');
        if($id == '')$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');

        $date = $this->input->get('date');
        $userType2 = $this->input->get('userType2');
        if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
		$Relationship=$this->Admin_model->get_RO($id);
  # Read value
  $draw = $_POST['draw'];
  $row = $_POST['start'];
  $rowperpage = $_POST['length']; // Rows display per page
  $columnIndex = $_POST['order'][0]['column']; // Column index
  
   $Start_Date=date('Y-m-d');

  $End_Date=date('Y-m-d');
 
 
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_leadvisit($id,$userType,$Relationship);
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_customers_Admin_filters2($id,$searchValue,$Start_Date,$End_Date,$Relationship);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_customers_Admin_filter_paginations2($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date,$Relationship);
  $empRecords = $sel;
  $data = array();
        foreach($empRecords as $row)
        {
          $data[] = array(
                "ID"=>$row->id,
                "LEADTYPE"=>$row->lead_type,
                "AREA"=>$row->area_lead,
                "NAME"=>$row->lead_name,
                "NUMBER"=>$row->lead_number,
                "ADDRESS"=>$row->lead_address,
                "LEADASSIGN"=>$row->lead_assign,
				 "LEADBRANCH"=>$row->lead_branch,
				 "LEADASSIGNTO"=>$row->lead_assign_to,
				 "LEADSTATUS"=>$row->lead_status,
				 "LEADREASON"=>$row->lead_reasons,
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
//---------------------------------for bureau_pull-------------------//


 public function Bureaupull(){
		
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/login'));
    }
    else{
        $id = $this->input->get('id');
        if($id == '')$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');
        $date = $this->input->get('date');
        $userType2 = $this->input->get('userType2');
        if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
		if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['Start_Date'];
         }
         else{
             $data['End_Date']='';
         }
         if(isset($_GET['filter']))
         {
           $data['filter_by']=$_GET['filter'];
         }else{
              $data['filter_by']='';
         }
         if(isset($_GET['range']))
         {
           $data['range']=$_GET['range'];
         }
         else
         {
             $data['range']='';
         }
          if(isset($_GET['RB']))
         {
           $data['RB']=$_GET['RB'];
         }
         else
         {
             $data['RB']='';
         }
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
        $this->load->helper('url');
        $this->load->model('Dsacustomers_model');
         if($userType=='Relationship_Officer')
        {
             $customers=  $this->Dsacustomers_model->getALLCustomers($id,$userType);        }
        else
        {
            $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
        }
       // $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
       
        $_SESSION["data_for_excel"] =   $customers ;
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
		$Start_Date = date('Y-m-01'); 
				$End_Date  = date('Y-m-t');
				 $customers = $this->Admin_model->bureau_pull($Start_Date,$End_Date,$id);
		         $arr['customers']=$customers;
		
        $data['username'] =$user_name;
        $arr['userType'] = $userType;
      
	  
        $this->load->view('dashboard_header', $data);
        if($userType=='Relationship_Officer')
        {
            $this->load->view('admin/Bureaupull',$arr);
        }
        else
        {
            $this->load->view('admin/Operational_users_customers', $arr);
        }
      
        
    }
}

	public function bureau_pulls()
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

   $Start_Date=$_POST['Start_Date'];

  $End_Date=$_POST['End_Date'];
 
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_bureau($id,$Start_Date,$End_Date);
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_customers_Admin_bureau($id,$searchValue,$Start_Date,$End_Date);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_customers_Admin_filter_bureau($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
  $empRecords = $sel;
  $data = array();
  
        foreach($empRecords as $row)
        {
			
          $data[] = array(
               "ID"=>$row->ID,
               "FirstName"=>$row->FN,
			   "LastName"=>$row->LN,
			   "Bureau_reports"=>'<a style="margin-left: 8px; " href="'.base_url().'index.php/Relationship_Officer/show_coapplicants?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>',
          
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
	  
	  

	  
	  public function Todaypull(){
		
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/login'));
    }
    else{
        $id = $this->input->get('id');
        if($id == '')$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');
        $date = $this->input->get('date');
        $userType2 = $this->input->get('userType2');
        if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
		if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['Start_Date'];
         }
         else{
             $data['End_Date']='';
         }
         if(isset($_GET['filter']))
         {
           $data['filter_by']=$_GET['filter'];
         }else{
              $data['filter_by']='';
         }
         if(isset($_GET['range']))
         {
           $data['range']=$_GET['range'];
         }
         else
         {
             $data['range']='';
         }
          if(isset($_GET['RB']))
         {
           $data['RB']=$_GET['RB'];
         }
         else
         {
             $data['RB']='';
         }
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
        $this->load->helper('url');
        $this->load->model('Dsacustomers_model');
         if($userType=='Relationship_Officer')
        {
             $customers=  $this->Dsacustomers_model->getALLCustomers($id,$userType);        }
        else
        {
            $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
        }
       // $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
       
        $_SESSION["data_for_excel"] =   $customers ;
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
		  $Curr_Date = date('Y-m-d');
				 $Today_Date  = date('Y-m-d');
				 $today = $this->Admin_model->today_pull($Curr_Date,$Today_Date,$id);
		         $arr['bureautoday']=$today;
		        
		
        $data['username'] =$user_name;
        $arr['userType'] = $userType;
      
	  
        $this->load->view('dashboard_header', $data);
        if($userType=='Relationship_Officer')
        {
            $this->load->view('admin/Todaypull',$arr);
        }
        else
        {
            $this->load->view('admin/Operational_users_customers', $arr);
        }
      
        
    }
}

	
public function today_pulls()
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

   $Start_Date=date('Y-m-d');

  $End_Date=date('Y-m-d');
 
 
 
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_bureau1($id,$Start_Date,$End_Date);
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_customers_Admin_bureau1($id,$searchValue,$Start_Date,$End_Date);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_customers_Admin_filter_bureau1($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
  $empRecords = $sel;
  $data = array();
  
        foreach($empRecords as $row)
        {
          $data[] = array(
               "ID"=>$row->ID,
               "FirstName"=>$row->FN,
			   "LastName"=>$row->LN,
			   "Bureau_reports"=>'<a style="margin-left: 8px; " href="'.base_url().'index.php/Relationship_Officer/show_coapplicants?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>',
          
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
	  
	  
	  
	  
public function show_coapplicants()
	{
		//$id = $_GET['ID']; 
		
        	$id = $_GET['ID']; 

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
			$Applicant_row=$this->Customercrud_model->getProfileData($id);

			//code for showing documents
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
			  	 array_push($Get_Doc_Master_Type_Coapplicant_Documents,$coapplicant_documents_all);
			  }
			  $doc_type_user = 2;
			  $u_type = $this->session->userdata("USER_TYPE");
			  if($u_type == 'CUSTOMER')$doc_type_user = 1;
			  $this->load->helper('url');
			  $age = $this->session->userdata('AGE');
			  $q = 1;
			  if($u_type == 'DSA')$q = 2;
			  $main_doc_row = $this->Customercrud_model->getMainDocumentsCount($q);
			  $saved_doc_row = $this->Customercrud_model->getSavedDocumentsCount_KYC($id);
			  $arr['Get_Doc_Master_Type']=$applicant_documents;
		  	  $arr['Coapplicant_Doacuments']=$Get_Doc_Master_Type_Coapplicant_Documents;
	
        	$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			$find_coapplicants =$this->Dsacustomers_model->getCustomers_coapplicants($id);
		    $arr['Applicant_row'] = $Applicant_row;
			//$arr['userType'] = $userType;
			$arr['customers'] = $customers;
			$arr['coapplicants']= $find_coapplicants;
			$arr['s'] = $filter;

			$dsa_id=$this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($dsa_id);
			$arr['userType'] = $this->session->userdata("USER_TYPE");
			//echo $arr['userType'];
			//exit();
			$user_info= $this->Operations_user_model->getProfileData($dsa_id);
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
			$this->load->view('dashboard_header', $data);
			
			//echo $this->session->userdata('USER_TYPE');
			  $arr['get_internal_bureau']=$this->Admin_model->get_internal_bureau();
			if($this->session->userdata('USER_TYPE') == 'RegionalManager' || $this->session->userdata('USER_TYPE') == 'DSA' || $this->session->userdata('USER_TYPE') == 'branch_manager' ||$this->session->userdata('USER_TYPE') == 'Sales_Manager'  || $this->session->userdata('USER_TYPE') == 'Relationship_Officer' || $this->session->userdata('USER_TYPE') == 'Cluster_Manager' ||  $this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'Operations_user' || $this->session->userdata('USER_TYPE') == 'ADMIN' ||  $this->session->userdata('USER_TYPE') == 'Cluster_credit_manager') 
			$this->load->view('Relationship_Officer/view_coapplicants', $arr);
			
		
	}	
	  
	  public function pdf(){
		
	     $id=$this->input->get("ID");
		 $respnse=$this->Dsacrud_model->get_credit_score($id);
		  if($respnse)
		  {
		 $dataArr = json_decode($respnse->response,true);
		 $data['score_success']=$respnse->score_success;
		  
		  }
		  else
		  {
			  $dataArr='';
			  $data['score_success']='';
		  }
	
	     $data['response']=$dataArr;
		
		
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
		 $mpdf->SetHTMLHeader($this->load->view('pdf/IDCCR_header',$data,true));
         $mpdf->SetHTMLFooter($this->load->view('pdf/IDCCR_footer',[],true));


		$mpdf->SetDisplayMode('fullwidth');
		$mpdf->debug = true;
		$mpdf->AddPage('P');
		$stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
		$stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));

		
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->list_indent_first_level = 0;
		
		 $html = $this->load->view('pdf/IDCCR_report_pdf',$data,true);
		$mpdf->WriteHTML($html);
		$file_name=md5(rand()).'pdf';
	
        $file=$mpdf->Output();
        
	}
	
	public function NewMisUpdates(){
		
			if($this->session->userdata("USER_TYPE") == ''){
				$data['showNav'] = 0;
				$data['error'] = '';
				$age = $this->session->userdata('AGE');
				$data['userType'] = "none";
				$data['age'] = $age;
				$this->load->view('header', $data);
			
				$this->load->view('login');
			
				
			}
			else{
				if($this->session->userdata('login_count')==0)
				{
				 $this->session->set_flashdata('sucess','sucess');
				 redirect('dsa/reset_password');
				}
				else{
					
					$this->load->helper('url');
				$age = $this->session->userdata('AGE');
				$data['showNav'] = 1;
				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				$ID = base64_decode($this->input->get("I"));
                $data2=$this->Admin_model->get_more_info($ID);
				$data['get_more_info'] = $data2;
				//print_r($data);
				//$this->load->view('header', $data);
				$id = $this->session->userdata('ID');
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
				$data['row']=$this->Customercrud_model->getProfileData($id);
				//$dashboard_data = $this->Dsacrud_model->getDashboardData($id);  
				$dashboard_data = $this->Admin_model->getDashboardData3($id);    // added by sonal 24-02-2022        
				
				$data['dashboard_data'] = $dashboard_data;
				$this->load->view('dashboard_header', $data);
				$this->load->view('NewMisUpdates',$data);
				}
				//$this->load->view('footer');
			}
			
		}


	

//----------------------For Existing----------------------//


 public function Existing_souring(){
		
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/login'));
    }
    else{
        $id = $this->input->get('id');
        if($id == '')$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');
        $date = $this->input->get('date');
        $userType2 = $this->input->get('userType2');
        if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
		if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['Start_Date'];
         }
         else{
             $data['End_Date']='';
         }
         if(isset($_GET['filter']))
         {
           $data['filter_by']=$_GET['filter'];
         }else{
              $data['filter_by']='';
         }
         if(isset($_GET['range']))
         {
           $data['range']=$_GET['range'];
         }
         else
         {
             $data['range']='';
         }
          if(isset($_GET['RB']))
         {
           $data['RB']=$_GET['RB'];
         }
         else
         {
             $data['RB']='';
         }
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
        $this->load->helper('url');
        $this->load->model('Dsacustomers_model');
         if($userType=='Relationship_Officer')
        {
             $customers=  $this->Dsacustomers_model->getALLCustomers($id,$userType);        }
        else
        {
            $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
        }
       // $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
       
        $_SESSION["data_for_excel"] =   $customers ;
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
		$Start_Date = date('Y-m-01'); 
				$End_Date  = date('Y-m-t');
				 $customers = $this->Admin_model->current_month3($Start_Date,$End_Date,$id);
		         $arr['customers']=$customers;
		
        $data['username'] =$user_name;
        $arr['userType'] = $userType;
      
	  
        $this->load->view('dashboard_header', $data);
        if($userType=='Relationship_Officer')
        {
            $this->load->view('admin/Existing_souring',$arr);
        }
        else
        {
            $this->load->view('admin/Operational_users_customers', $arr);
        }
      
        
    }
}

	
public function Existing_sourings()
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
  
  $Start_Date=$_POST['Start_Date'];

  $End_Date=$_POST['End_Date'];
 
 
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_existingvisit($id,$userType);
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_customers_Admin_filters3($id,$searchValue,$Start_Date,$End_Date);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_customers_Admin_filter_paginations3($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
  $empRecords = $sel;
  $data = array();
        foreach($empRecords as $row)
        {
			
          $data[] = array(
                "ID"=>$row->id,
				 "Meeting"=>$row->exist_date_of_meeting,
                "PRODUCT"=>$row->exist_product,
                "NAME"=>$row->exist_cust_name,
                "NUMBER"=>$row->exist_cust_number,
                "REASONS"=>$row->reason_follow_meeting,
				
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
	  
	  
	    public function Todayexisting_souring(){
		
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/login'));
    }
    else{
        $id = $this->input->get('id');
        if($id == '')$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');
        $date = $this->input->get('date');
        $userType2 = $this->input->get('userType2');
        if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
		if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']="";
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['Start_Date'];
         }
         else{
             $data['End_Date']="";
         }
         if(isset($_GET['filter']))
         {
           $data['filter_by']=$_GET['filter'];
         }else{
              $data['filter_by']='';
         }
         if(isset($_GET['range']))
         {
           $data['range']=$_GET['range'];
         }
         else
         {
             $data['range']='';
         }
          if(isset($_GET['RB']))
         {
           $data['RB']=$_GET['RB'];
         }
         else
         {
             $data['RB']='';
         }
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
        $this->load->helper('url');
        $this->load->model('Dsacustomers_model');
         if($userType=='Relationship_Officer')
        {
             $customers=  $this->Dsacustomers_model->getALLCustomers($id,$userType);        }
        else
        {
            $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
        }
       // $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
       
        $_SESSION["data_for_excel"] =   $customers ;
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
		  $Curr_Date = date('Y-m-d');
				 $Today_Date  = date('Y-m-d');
				 $today = $this->Admin_model->current_month3($Curr_Date,$Today_Date,$id);
		         $arr['existingtoday']=$today;
		//$customers = $this->Admin_model->get_all_dsavisit();
        $data['username'] =$user_name;
        $arr['userType'] = $userType;
      // $arr['customers'] = $customers;
	  
        $this->load->view('dashboard_header', $data);
        if($userType=='Relationship_Officer')
        {
            $this->load->view('admin/Todayexisting_souring',$arr);
        }
        else
        {
            $this->load->view('admin/Operational_users_customers', $arr);
        }
      
        
    }
}

 public function Todayexisting_sourings()
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
  
   $Start_Date=date('Y-m-d');

  $End_Date=date('Y-m-d');
 
 
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_existingvisit($id,$userType);
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_customers_Admin_filters3($id,$searchValue,$Start_Date,$End_Date);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_customers_Admin_filter_paginations3($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
  $empRecords = $sel;
  $data = array();
        foreach($empRecords as $row)
        {
			
          $data[] = array(
              "ID"=>$row->id,
				 "Meeting"=>$row->exist_date_of_meeting,
                "PRODUCT"=>$row->exist_product,
                "NAME"=>$row->exist_cust_name,
                "NUMBER"=>$row->exist_cust_number,
                "REASONS"=>$row->reason_follow_meeting,
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
	 

//------------------------------Function for combined excel data --------------------------//

			    public Function alldownload_excel()
				{
				  $id = $this->input->get('id');
				if($id == '')$id = $this->session->userdata('ID');
				$userType = $this->input->get('userType');

				$date = $this->input->get('date');
				$userType2 = $this->input->get('userType2');
				if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
				 $this->load->library('excel');

				$this->excel->createSheet();
				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				$this->excel->setActiveSheetIndex(1);
					$this->excel->createSheet();
				$this->excel->setActiveSheetIndex(2);
						$this->excel->createSheet();
				$this->excel->setActiveSheetIndex(3);
				//name the worksheet
                $file_name=$this->session->userdata('file_name');
				 $file_name1=$this->session->userdata('file_name1');
				
               

				$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                
				
                
				$this->excel->getActiveSheet()->getStyle("A1:K1")->applyFromArray(array("font" => array("bold" => true)));

				
                $this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'MEETING DATE');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'MEETING BY');
                $this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'MEETING TYPE');
				$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'DSA / CONNECTOR NAME');
                $this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'DSA / CONNECTOR MOBILE');
				$this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'CUSTOMER REFFERED BY DSA');
                $this->excel->setActiveSheetIndex(0)->setCellValue('H1', 'REVISIT DATE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('I1', 'REMARKS');
				
				 if(isset($file_name))
                {
                    $this->excel->getActiveSheet()->setTitle($file_name);
                }
                else{
				$this->excel->getActiveSheet()->setTitle('DSA list');
                }
				   $data_for_excel= $this->Admin_model->getDSAexcel($id,$userType);
				$users=json_decode(json_encode($data_for_excel), true);
				 $count=2;
				 $i=1;
                 foreach($users as $row)
				 {
					    if($row['last_updated_date']=='')
								{
									$meeting_date="";
									
								}
								else{
									$exist = $row['last_updated_date'];
								$meeting_date = date("d-m-Y", strtotime($exist));
							
								}
								 if($row['revisit_date']=='')
								{
									$revisit_date="";
									
								}
								else{
									$exist1 = $row['revisit_date'];
								$revisit_date = date("d-m-Y", strtotime($exist1));
							
								}
                      $this->excel->getActiveSheet(0)->setCellValue('A'.$count,$i);
					  $this->excel->getActiveSheet(0)->setCellValue('B'.$count,$meeting_date);
				      $this->excel->getActiveSheet(0)->setCellValue('C'.$count,$row['meeting']);
					  $this->excel->getActiveSheet(0)->setCellValue('D'.$count,$row['meeting_type']);
                      $this->excel->getActiveSheet(0)->setCellValue('E'.$count,$row['dsa_connector_name']);
                      $this->excel->getActiveSheet(0)->setCellValue('F'.$count,$row['dsa_connector_mobile']);
					  $this->excel->getActiveSheet(0)->setCellValue('G'.$count,$row['name_reffered_dsa']);
                      $this->excel->getActiveSheet(0)->setCellValue('H'.$count,$revisit_date);
					  $this->excel->getActiveSheet(0)->setCellValue('I'.$count,$row['remarks']);
                     
                     $count++; $i++;
				 }
				 
				
				
				$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                
				
                
				$this->excel->getActiveSheet()->getStyle("A1:K1")->applyFromArray(array("font" => array("bold" => true)));
               
				 $this->excel->setActiveSheetIndex(1)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(1)->setCellValue('B1', 'MEETING DATE');
				$this->excel->setActiveSheetIndex(1)->setCellValue('C1', 'PRODUCT');
                $this->excel->setActiveSheetIndex(1)->setCellValue('D1', 'CUSTOMER NAME');
				$this->excel->setActiveSheetIndex(1)->setCellValue('E1', 'CUSTOMER NUMBER');
                $this->excel->setActiveSheetIndex(1)->setCellValue('F1', 'CUSTOMER INTEREST');
				$this->excel->setActiveSheetIndex(1)->setCellValue('G1', 'NEXT ACTION DATE');
                $this->excel->setActiveSheetIndex(1)->setCellValue('H1', 'REMARKS');
                
              
			  
				 if(isset($file_name1))
                {
                    $this->excel->getActiveSheet()->setTitle($file_name1);
                }
                else{
					$this->excel->getActiveSheet()->setTitle('NTB list');
                }
				// get all users in array formate
				
				
             
              
				  $data_for_excel1= $this->Admin_model->getNtbexcel($id,$userType);
				$users1=json_decode(json_encode($data_for_excel1), true);
				
                
				 $count=2;
				 $i=1;
				  foreach($users1 as $rows)
				 {
					    if($rows['last_updated_date']=='')
								{
									$meeting_date1="";
									
								}
								else{
									$exist2 = $rows['last_updated_date'];
								$meeting_date1 = date("d-m-Y", strtotime($exist2));
							
								}
								 
							if($rows['next_action_date']=='')
								{
									$next_date="";
									
								}
								else{
									$exist3 = $rows['next_action_date'];
								$next_date = date("d-m-Y", strtotime($exist3));
							
								}
                      $this->excel->getActiveSheet(1)->setCellValue('A'.$count,$i);
					  $this->excel->getActiveSheet(1)->setCellValue('B'.$count,$meeting_date1);
				      $this->excel->getActiveSheet(1)->setCellValue('C'.$count,$rows['product']);
					  $this->excel->getActiveSheet(1)->setCellValue('D'.$count,$rows['cust_name']);
                      $this->excel->getActiveSheet(1)->setCellValue('E'.$count,$rows['cust_number']);
                      $this->excel->getActiveSheet(1)->setCellValue('F'.$count,$rows['customer_insterest']);
					  $this->excel->getActiveSheet(1)->setCellValue('G'.$count,$next_date);
                      $this->excel->getActiveSheet(1)->setCellValue('H'.$count,$rows['custyes_remarks']);
					 
                     
                     $count++; $i++;
				 }
				 
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                
				
                
				$this->excel->getActiveSheet()->getStyle("A1:K1")->applyFromArray(array("font" => array("bold" => true)));
				 
				  $this->excel->setActiveSheetIndex(2)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(2)->setCellValue('B1', 'MEETING DATE');
				$this->excel->setActiveSheetIndex(2)->setCellValue('C1', 'PRODUCT');
                $this->excel->setActiveSheetIndex(2)->setCellValue('D1', 'EXISTING CUSTOMER NAME');
					$this->excel->setActiveSheetIndex(2)->setCellValue('E1', 'REASONS');
               
			  
				 if(isset($file_name1))
                {
                    $this->excel->getActiveSheet()->setTitle($file_name1);
                }
                else{
					$this->excel->getActiveSheet()->setTitle('EXISTING list');
                }
				// get all users in array formate
				
				
             
              
				  $data_for_excel2= $this->Admin_model->getExistingexcel($id,$userType);
				$users2=json_decode(json_encode($data_for_excel2), true);
				
                
				 $count=2;
				 $i=1;
				  foreach($users2 as $rows)
				 {
					  if($rows['exist_date_of_meeting']=='')
								{
									$exit_date="";
									
								}
								else{
									$exist3 = $rows['exist_date_of_meeting'];
								$exit_date = date("d-m-Y", strtotime($exist3));
							
								}
                      $this->excel->getActiveSheet(2)->setCellValue('A'.$count,$i);
				      $this->excel->getActiveSheet(2)->setCellValue('B'.$count,$exit_date);
					  $this->excel->getActiveSheet(2)->setCellValue('C'.$count,$rows['exist_product']);
                      $this->excel->getActiveSheet(2)->setCellValue('D'.$count,$rows['exist_cust_name']);
                     $this->excel->getActiveSheet(2)->setCellValue('E'.$count,$rows['reason_follow_meeting']);
                     
                     $count++; $i++;
				 }
				 
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                
				
                
				$this->excel->getActiveSheet()->getStyle("A1:K1")->applyFromArray(array("font" => array("bold" => true)));
				 
				 $this->excel->setActiveSheetIndex(3)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(3)->setCellValue('B1', 'LEAD TYPE');
				$this->excel->setActiveSheetIndex(3)->setCellValue('C1', 'LEAD AREA');
                $this->excel->setActiveSheetIndex(3)->setCellValue('D1', 'NAME');
				$this->excel->setActiveSheetIndex(3)->setCellValue('E1', 'NUMBER');
                $this->excel->setActiveSheetIndex(3)->setCellValue('F1', 'STATUS');
				$this->excel->setActiveSheetIndex(3)->setCellValue('G1', 'REMARKS');
               
			  
				 if(isset($file_name1))
                {
                    $this->excel->getActiveSheet()->setTitle($file_name1);
                }
                else{
					$this->excel->getActiveSheet()->setTitle('LEAD list');
                }
				// get all users in array formate
				
				
             
              
				  $data_for_excel2= $this->Admin_model->getLeadexcel($id,$userType);
				$users2=json_decode(json_encode($data_for_excel2), true);
				
                
				 $count=2;
				 $i=1;
				  foreach($users2 as $rows)
				 {
					  
                      $this->excel->getActiveSheet(3)->setCellValue('A'.$count,$i);
				      $this->excel->getActiveSheet(3)->setCellValue('B'.$count,$rows['lead_type']);
					  $this->excel->getActiveSheet(3)->setCellValue('C'.$count,$rows['area_lead']);
                      $this->excel->getActiveSheet(3)->setCellValue('D'.$count,$rows['lead_name']);
                      $this->excel->getActiveSheet(3)->setCellValue('E'.$count,$rows['lead_number']);
					  $this->excel->getActiveSheet(3)->setCellValue('F'.$count,$rows['lead_status']);
                      $this->excel->getActiveSheet(3)->setCellValue('G'.$count,$rows['lead_reasons']);
					 
                     
                     $count++; $i++;
				 }
				 
				 
				// read data to active sheet
				    $filename='MISDSA_data.xlsx';
                              header('Content-Type: application/vnd.ms-excel'); 
                              header('Content-Disposition: attachment;filename="'.$filename.'"'); 
                              header('Cache-Control: max-age=0'); 
                              $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
                              //ob_end_clean();
                              //ob_end_flush();
                              $objWriter->save('php://output'); 
	}
		
//----------------------------------------For Current Month ------------------------------//	
		
		 public Function save_excel()
				{
				$id = $this->input->get('id');
				if($id == '')$id = $this->session->userdata('ID');
				$userType = $this->input->get('userType');

				$date = $this->input->get('date');
				$userType2 = $this->input->get('userType2');
				if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
				 $this->load->library('excel');

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
                $file_name=$this->session->userdata('file_name');
                if(isset($file_name))
                {
                    $this->excel->getActiveSheet()->setTitle($file_name);
                }
                else{
				$this->excel->getActiveSheet()->setTitle('DSA list');
                }

				$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                

				$this->excel->getActiveSheet()->getStyle("A1:K1")->applyFromArray(array("font" => array("bold" => true)));

				
                $this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'MEETING DATE');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'MEETING BY');
                $this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'MEETING TYPE');
				$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'DSA / CONNECTOR NAME');
                $this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'DSA / CONNECTOR MOBILE');
				$this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'CUSTOMER REFFERED BY DSA');
                $this->excel->setActiveSheetIndex(0)->setCellValue('H1', 'REVISIT DATE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('I1', 'REMARKS');
                
              
				// get all users in array formate
				
				 $Start_Date = date('Y-m-01'); 
				$End_Date  = date('Y-m-t');
                $data_for_excel= $this->Admin_model->getDSAexcel1($id,$userType, $Start_Date,$End_Date );
				$users=json_decode(json_encode($data_for_excel), true);
              
                 $count=2;
				 $i=1;
				 foreach($users as $row)
				 {
					   if($row['last_updated_date']=='')
								{
									$meeting_date="";
									
								}
								else{
									$exist = $row['last_updated_date'];
								$meeting_date = date("d-m-Y", strtotime($exist));
							
								}
								 if($row['revisit_date']=='')
								{
									$revisit_date="";
									
								}
								else{
									$exist1 = $row['revisit_date'];
								$revisit_date = date("d-m-Y", strtotime($exist1));
							
								}
                      $this->excel->getActiveSheet()->setCellValue('A'.$count,$i);
					  $this->excel->getActiveSheet()->setCellValue('B'.$count,$meeting_date);
				      $this->excel->getActiveSheet()->setCellValue('C'.$count,$row['meeting']);
					  $this->excel->getActiveSheet()->setCellValue('D'.$count,$row['meeting_type']);
                      $this->excel->getActiveSheet()->setCellValue('E'.$count,$row['dsa_connector_name']);
                      $this->excel->getActiveSheet()->setCellValue('F'.$count,$row['dsa_connector_mobile']);
					  $this->excel->getActiveSheet()->setCellValue('G'.$count,$row['name_reffered_dsa']);
                      $this->excel->getActiveSheet()->setCellValue('H'.$count,$revisit_date);
					  $this->excel->getActiveSheet()->setCellValue('I'.$count,$row['remarks']);
                     
                     $count++; $i++;
				 }
				 
				// read data to active sheet
				    $filename='LoanMitra_data.xlsx';
                              header('Content-Type: application/vnd.ms-excel'); 
                              header('Content-Disposition: attachment;filename="'.$filename.'"'); 
                              header('Cache-Control: max-age=0'); 
                              $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
                              //ob_end_clean();
                              //ob_end_flush();
                              $objWriter->save('php://output'); 
	}



			public Function Ntb_excel()
				{
				$id = $this->input->get('id');
				if($id == '')$id = $this->session->userdata('ID');
				$userType = $this->input->get('userType');

				$date = $this->input->get('date');
				$userType2 = $this->input->get('userType2');
				if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
				 $this->load->library('excel');

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
                $file_name=$this->session->userdata('file_name');
                if(isset($file_name))
                {
                    $this->excel->getActiveSheet()->setTitle($file_name);
                }
                else{
				$this->excel->getActiveSheet()->setTitle('NTB list');
                }

				$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                

				$this->excel->getActiveSheet()->getStyle("A1:K1")->applyFromArray(array("font" => array("bold" => true)));

				
                
				 $this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'MEETING DATE');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'PRODUCT');
                $this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'CUSTOMER NAME');
				$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'CUSTOMER NUMBER');
                $this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'CUSTOMER INTEREST');
				$this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'NEXT ACTION DATE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('H1', 'REMARKS');
                
              
				// get all users in array formate
				
				 $Start_Date = date('Y-m-01'); 
				$End_Date  = date('Y-m-t');
                $data_for_excel= $this->Admin_model->getNtbexcel1($id,$userType, $Start_Date,$End_Date );
				$users=json_decode(json_encode($data_for_excel), true);
              
                 $count=2;
				 $i=1;
				 foreach($users as $row)
				 {
					  if($row['last_updated_date']=='')
								{
									$meeting_date="";
									
								}
								else{
									$exist = $row['last_updated_date'];
								$meeting_date = date("d-m-Y", strtotime($exist));
							
								}
								 if($row['next_action_date']=='')
								{
									$next_date="";
									
								}
								else{
									$exist1 = $row['next_action_date'];
								$next_date = date("d-m-Y", strtotime($exist1));
							
								}
                     $this->excel->getActiveSheet(1)->setCellValue('A'.$count,$i);
					  $this->excel->getActiveSheet(1)->setCellValue('B'.$count,$meeting_date);
				      $this->excel->getActiveSheet(1)->setCellValue('C'.$count,$row['product']);
					  $this->excel->getActiveSheet(1)->setCellValue('D'.$count,$row['cust_name']);
                      $this->excel->getActiveSheet(1)->setCellValue('E'.$count,$row['cust_number']);
                      $this->excel->getActiveSheet(1)->setCellValue('F'.$count,$row['customer_insterest']);
					  $this->excel->getActiveSheet(1)->setCellValue('G'.$count,$next_date);
                      $this->excel->getActiveSheet(1)->setCellValue('H'.$count,$row['custyes_remarks']);
                     
                     $count++; $i++;
				 }
				 
				// read data to active sheet
				    $filename='NTB_data.xlsx';
                              header('Content-Type: application/vnd.ms-excel'); 
                              header('Content-Disposition: attachment;filename="'.$filename.'"'); 
                              header('Cache-Control: max-age=0'); 
                              $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
                              //ob_end_clean();
                              //ob_end_flush();
                              $objWriter->save('php://output'); 
	}
		
		
		public Function Existing_excel()
				{
				$id = $this->input->get('id');
				if($id == '')$id = $this->session->userdata('ID');
				$userType = $this->input->get('userType');

				$date = $this->input->get('date');
				$userType2 = $this->input->get('userType2');
				if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
				 $this->load->library('excel');

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
                $file_name=$this->session->userdata('file_name');
                if(isset($file_name))
                {
                    $this->excel->getActiveSheet()->setTitle($file_name);
                }
                else{
				$this->excel->getActiveSheet()->setTitle('EXISTING list');
                }

				$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                

				$this->excel->getActiveSheet()->getStyle("A1:K1")->applyFromArray(array("font" => array("bold" => true)));

				
					$this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
					$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'MEETING DATE');
					$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'PRODUCT');
					$this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'EXISTING CUSTOMER NAME');
					$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'REASONS');
                
              
				// get all users in array formate
				
				 $Start_Date = date('Y-m-01'); 
				$End_Date  = date('Y-m-t');
                $data_for_excel= $this->Admin_model->getExistingexcel1($id,$userType, $Start_Date,$End_Date );
				$users=json_decode(json_encode($data_for_excel), true);
              
                 $count=2;
				 $i=1;
				 foreach($users as $row)
				 { if($row['exist_date_of_meeting']=='')
								{
									$exist_date="";
									
								}
								else{
									$exist = $row['exist_date_of_meeting'];
								$exist_date = date("d-m-Y", strtotime($exist));
							
								}
					$this->excel->getActiveSheet(0)->setCellValue('A'.$count,$i);
				    $this->excel->getActiveSheet(0)->setCellValue('B'.$count,$exist_date);
					$this->excel->getActiveSheet(0)->setCellValue('C'.$count,$row['exist_product']);
                    $this->excel->getActiveSheet(0)->setCellValue('D'.$count,$row['exist_cust_name']);
                    $this->excel->getActiveSheet(0)->setCellValue('E'.$count,$row['reason_follow_meeting']);
                     
                     $count++; $i++;
				 }
				 
				// read data to active sheet
				    $filename='EXISTING_data.xlsx';
                              header('Content-Type: application/vnd.ms-excel'); 
                              header('Content-Disposition: attachment;filename="'.$filename.'"'); 
                              header('Cache-Control: max-age=0'); 
                              $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
                              //ob_end_clean();
                              //ob_end_flush();
                              $objWriter->save('php://output'); 
	}
	
	
			public Function Lead_excel()
				{
				$id = $this->input->get('id');
				if($id == '')$id = $this->session->userdata('ID');
				$userType = $this->input->get('userType');

				$date = $this->input->get('date');
				$userType2 = $this->input->get('userType2');
				if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
				 $this->load->library('excel');

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
                $file_name=$this->session->userdata('file_name');
                if(isset($file_name))
                {
                    $this->excel->getActiveSheet()->setTitle($file_name);
                }
                else{
				$this->excel->getActiveSheet()->setTitle('LEAD list');
                }

				$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                

				$this->excel->getActiveSheet()->getStyle("A1:K1")->applyFromArray(array("font" => array("bold" => true)));

				$this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'LEAD TYPE');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'LEAD AREA');
                $this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'NAME');
				$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'NUMBER');
                $this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'STATUS');
				$this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'REMARKS');
                
              
				// get all users in array formate
				
				 $Start_Date = date('Y-m-01'); 
				$End_Date  = date('Y-m-t');
                $data_for_excel= $this->Admin_model->getLeadexcel1($id,$userType, $Start_Date,$End_Date );
				$users=json_decode(json_encode($data_for_excel), true);
              
                 $count=2;
				 $i=1;
				 foreach($users as $row)
				 {
					  
						$this->excel->getActiveSheet(0)->setCellValue('A'.$count,$i);
				      $this->excel->getActiveSheet(0)->setCellValue('B'.$count,$row['lead_type']);
					  $this->excel->getActiveSheet(0)->setCellValue('C'.$count,$row['area_lead']);
                      $this->excel->getActiveSheet(0)->setCellValue('D'.$count,$row['lead_name']);
                      $this->excel->getActiveSheet(0)->setCellValue('E'.$count,$row['lead_number']);
					  $this->excel->getActiveSheet(0)->setCellValue('F'.$count,$row['lead_status']);
                      $this->excel->getActiveSheet(0)->setCellValue('G'.$count,$row['lead_reasons']);
                     $count++; $i++;
				 }
				 
				// read data to active sheet
				    $filename='LEAD_data.xlsx';
                              header('Content-Type: application/vnd.ms-excel'); 
                              header('Content-Disposition: attachment;filename="'.$filename.'"'); 
                              header('Cache-Control: max-age=0'); 
                              $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
                              //ob_end_clean();
                              //ob_end_flush();
                              $objWriter->save('php://output'); 
	}
	


//----------------------------------------For Today Month ------------------------------//	
		
		 public Function savetoday_excel()
				{
				$id = $this->input->get('id');
				if($id == '')$id = $this->session->userdata('ID');
				$userType = $this->input->get('userType');

				$date = $this->input->get('date');
				$userType2 = $this->input->get('userType2');
				if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
				 $this->load->library('excel');

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
                $file_name=$this->session->userdata('file_name');
                if(isset($file_name))
                {
                    $this->excel->getActiveSheet()->setTitle($file_name);
                }
                else{
				$this->excel->getActiveSheet()->setTitle('DSA list');
                }

				$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                

				$this->excel->getActiveSheet()->getStyle("A1:K1")->applyFromArray(array("font" => array("bold" => true)));

				
                $this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'MEETING DATE');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'MEETING BY');
                $this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'MEETING TYPE');
				$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'DSA / CONNECTOR NAME');
                $this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'DSA / CONNECTOR MOBILE');
				$this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'CUSTOMER REFFERED BY DSA');
                $this->excel->setActiveSheetIndex(0)->setCellValue('H1', 'REVISIT DATE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('I1', 'REMARKS');
                
              
				// get all users in array formate
				
				 $Start_Date = date('Y-m-d'); 
				$End_Date  = date('Y-m-d');
                $data_for_excel= $this->Admin_model->getDSAexcel1($id,$userType, $Start_Date,$End_Date );
				$users=json_decode(json_encode($data_for_excel), true);
              
                 $count=2;
				 $i=1;
				 foreach($users as $row)
				 {
					  if($row['last_updated_date']=='')
								{
									$meeting_date="";
									
								}
								else{
									$exist = $row['last_updated_date'];
								$meeting_date = date("d-m-Y", strtotime($exist));
							
								}
								 if($row['revisit_date']=='')
								{
									$revisit_date="";
									
								}
								else{
									$exist1 = $row['revisit_date'];
								$revisit_date = date("d-m-Y", strtotime($exist1));
							
								}
                      $this->excel->getActiveSheet()->setCellValue('A'.$count,$i);
					  $this->excel->getActiveSheet()->setCellValue('B'.$count,$meeting_date);
				      $this->excel->getActiveSheet()->setCellValue('C'.$count,$row['meeting']);
					  $this->excel->getActiveSheet()->setCellValue('D'.$count,$row['meeting_type']);
                      $this->excel->getActiveSheet()->setCellValue('E'.$count,$row['dsa_connector_name']);
                      $this->excel->getActiveSheet()->setCellValue('F'.$count,$row['dsa_connector_mobile']);
					  $this->excel->getActiveSheet()->setCellValue('G'.$count,$row['name_reffered_dsa']);
                      $this->excel->getActiveSheet()->setCellValue('H'.$count,$revisit_date);
					  $this->excel->getActiveSheet()->setCellValue('I'.$count,$row['remarks']);
                     
                     $count++; $i++;
				 }
				 
				// read data to active sheet
				    $filename='LoanMitra_data.xlsx';
                              header('Content-Type: application/vnd.ms-excel'); 
                              header('Content-Disposition: attachment;filename="'.$filename.'"'); 
                              header('Cache-Control: max-age=0'); 
                              $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
                              //ob_end_clean();
                              //ob_end_flush();
                              $objWriter->save('php://output'); 
	}



			public Function Ntbtoday_excel()
				{
				$id = $this->input->get('id');
				if($id == '')$id = $this->session->userdata('ID');
				$userType = $this->input->get('userType');

				$date = $this->input->get('date');
				$userType2 = $this->input->get('userType2');
				if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
				 $this->load->library('excel');

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
                $file_name=$this->session->userdata('file_name');
                if(isset($file_name))
                {
                    $this->excel->getActiveSheet()->setTitle($file_name);
                }
                else{
				$this->excel->getActiveSheet()->setTitle('NTB list');
                }

				$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                

				$this->excel->getActiveSheet()->getStyle("A1:K1")->applyFromArray(array("font" => array("bold" => true)));

				
                
				 $this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'MEETING DATE');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'PRODUCT');
                $this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'CUSTOMER NAME');
				$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'CUSTOMER NUMBER');
                $this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'CUSTOMER INTEREST');
				$this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'NEXT ACTION DATE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('H1', 'REMARKS');
                
              
				// get all users in array formate
				
				 $Start_Date = date('Y-m-d'); 
				$End_Date  = date('Y-m-d');
                $data_for_excel= $this->Admin_model->getNtbexcel1($id,$userType, $Start_Date,$End_Date );
				$users=json_decode(json_encode($data_for_excel), true);
              
                 $count=2;
				 $i=1;
				 foreach($users as $row)
				 {
					  if($row['last_updated_date']=='')
								{
									$meeting_date="";
									
								}
								else{
									$exist = $row['last_updated_date'];
								$meeting_date = date("d-m-Y", strtotime($exist));
							
								}
								 if($row['next_action_date']=='')
								{
									$next_date="";
									
								}
								else{
									$exist1 = $row['next_action_date'];
								$next_date = date("d-m-Y", strtotime($exist1));
							
								}
                     $this->excel->getActiveSheet(1)->setCellValue('A'.$count,$i);
					  $this->excel->getActiveSheet(1)->setCellValue('B'.$count,$meeting_date);
				      $this->excel->getActiveSheet(1)->setCellValue('C'.$count,$row['product']);
					  $this->excel->getActiveSheet(1)->setCellValue('D'.$count,$row['cust_name']);
                      $this->excel->getActiveSheet(1)->setCellValue('E'.$count,$row['cust_number']);
                      $this->excel->getActiveSheet(1)->setCellValue('F'.$count,$row['customer_insterest']);
					  $this->excel->getActiveSheet(1)->setCellValue('G'.$count,$next_date);
                      $this->excel->getActiveSheet(1)->setCellValue('H'.$count,$row['custyes_remarks']);
                     
                     $count++; $i++;
				 }
				 
				// read data to active sheet
				    $filename='NTB_data.xlsx';
                              header('Content-Type: application/vnd.ms-excel'); 
                              header('Content-Disposition: attachment;filename="'.$filename.'"'); 
                              header('Cache-Control: max-age=0'); 
                              $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
                              //ob_end_clean();
                              //ob_end_flush();
                              $objWriter->save('php://output'); 
	}
		
		
		public Function Existingtoday_excel()
				{
				$id = $this->input->get('id');
				if($id == '')$id = $this->session->userdata('ID');
				$userType = $this->input->get('userType');

				$date = $this->input->get('date');
				$userType2 = $this->input->get('userType2');
				if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
				 $this->load->library('excel');

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
                $file_name=$this->session->userdata('file_name');
                if(isset($file_name))
                {
                    $this->excel->getActiveSheet()->setTitle($file_name);
                }
                else{
				$this->excel->getActiveSheet()->setTitle('EXISTING list');
                }

				$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                

				$this->excel->getActiveSheet()->getStyle("A1:K1")->applyFromArray(array("font" => array("bold" => true)));

				
					$this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
					$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'MEETING DATE');
					$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'PRODUCT');
					$this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'EXISTING CUSTOMER NAME');
					$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'REASONS');
                
              
				// get all users in array formate
				
				 $Start_Date = date('Y-m-d'); 
				$End_Date  = date('Y-m-d');
                $data_for_excel= $this->Admin_model->getExistingexcel1($id,$userType, $Start_Date,$End_Date );
				$users=json_decode(json_encode($data_for_excel), true);
              
                 $count=2;
				 $i=1;
				 foreach($users as $row)
				 {
					   if($row['exist_date_of_meeting']=='')
								{
									$exist_date="";
									
								}
								else{
									$exist = $row['exist_date_of_meeting'];
								$exist_date = date("d-m-Y", strtotime($exist));
							
								}
					$this->excel->getActiveSheet(0)->setCellValue('A'.$count,$i);
				    $this->excel->getActiveSheet(0)->setCellValue('B'.$count,$exist_date);
					$this->excel->getActiveSheet(0)->setCellValue('C'.$count,$row['exist_product']);
                    $this->excel->getActiveSheet(0)->setCellValue('D'.$count,$row['exist_cust_name']);
                    $this->excel->getActiveSheet(0)->setCellValue('E'.$count,$row['reason_follow_meeting']);
                     
                     $count++; $i++;
				 }
				 
				// read data to active sheet
				    $filename='EXISTING_data.xlsx';
                              header('Content-Type: application/vnd.ms-excel'); 
                              header('Content-Disposition: attachment;filename="'.$filename.'"'); 
                              header('Cache-Control: max-age=0'); 
                              $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
                              //ob_end_clean();
                              //ob_end_flush();
                              $objWriter->save('php://output'); 
	}
	
	
			public Function Leadtoday_excel()
				{
				$id = $this->input->get('id');
				if($id == '')$id = $this->session->userdata('ID');
				$userType = $this->input->get('userType');

				$date = $this->input->get('date');
				$userType2 = $this->input->get('userType2');
				if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
				 $this->load->library('excel');

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
                $file_name=$this->session->userdata('file_name');
                if(isset($file_name))
                {
                    $this->excel->getActiveSheet()->setTitle($file_name);
                }
                else{
				$this->excel->getActiveSheet()->setTitle('LEAD list');
                }

				$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                

				$this->excel->getActiveSheet()->getStyle("A1:K1")->applyFromArray(array("font" => array("bold" => true)));

				$this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'LEAD TYPE');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'LEAD AREA');
                $this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'NAME');
				$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'NUMBER');
                $this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'STATUS');
				$this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'REMARKS');
                
              
				// get all users in array formate
				
				 $Start_Date = date('Y-m-d'); 
				$End_Date  = date('Y-m-d');
                $data_for_excel= $this->Admin_model->getLeadexcel1($id,$userType, $Start_Date,$End_Date );
				$users=json_decode(json_encode($data_for_excel), true);
              
                 $count=2;
				 $i=1;
				 foreach($users as $row)
				 {
					  
					  $this->excel->getActiveSheet(0)->setCellValue('A'.$count,$i);
				      $this->excel->getActiveSheet(0)->setCellValue('B'.$count,$row['lead_type']);
					  $this->excel->getActiveSheet(0)->setCellValue('C'.$count,$row['area_lead']);
                      $this->excel->getActiveSheet(0)->setCellValue('D'.$count,$row['lead_name']);
                      $this->excel->getActiveSheet(0)->setCellValue('E'.$count,$row['lead_number']);
					  $this->excel->getActiveSheet(0)->setCellValue('F'.$count,$row['lead_status']);
                      $this->excel->getActiveSheet(0)->setCellValue('G'.$count,$row['lead_reasons']);
                     $count++; $i++;
				 }
				 
				// read data to active sheet
				    $filename='LEAD_data.xlsx';
                              header('Content-Type: application/vnd.ms-excel'); 
                              header('Content-Disposition: attachment;filename="'.$filename.'"'); 
                              header('Cache-Control: max-age=0'); 
                              $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
                              //ob_end_clean();
                              //ob_end_flush();
                              $objWriter->save('php://output'); 
	}
	
	  public function get_address_by_pincode(){
		  
			$data = file_get_contents("php://input");
			$data_obj = json_decode($data);
			
			$row = $this->Admin_model->get_address_by_pincode($data_obj->pincode);
			
			$response = array('status' => 1, 'data' => $row);
			echo json_encode($response);
		}
			
			
			
	  public function get_address_by_mobileno(){
		  
			$data = file_get_contents("php://input");
			$data_obj = json_decode($data);
			
			$row = $this->Admin_model->get_address_by_mobileno($data_obj->mobileno);
		
			$response = array('status' => 1, 'data' => $row);
			echo json_encode($response);
		}
		
		 public function get_branch_lead(){
		  
			$data = file_get_contents("php://input");
			$data_obj = json_decode($data);
			
			$row = $this->Admin_model->get_branch_lead($data_obj->branch);
			
			$response = array('status' => 1, 'data' => $row);
			//print_r($response);
			echo json_encode($response);
		}
			
			
    }
?>