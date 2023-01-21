<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dsa extends CI_Controller {

	public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
		$this->load->library('session');
		$this->load->model('Dsacrud_model');
        $this->load->library('email');
		$this->load->model('Admin_model');
		$this->load->model('Operations_user_model');
		$this->load->model('Logincrud_model');	
		$this->load->model('Customercrud_model');	
		$this->load->model('Dsacustomers_model');
        $this->load->library('upload');	
		$this->load->model('common_model','common');
		$this->load->model('credit_manager_user_model');
		$this->load->model('Retailer_model');
		$this->load->model('Distributor_model');
		$this->load->model('Cron_model');
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
				$this->reset_password();
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
			$dashboard_data = $this->Dsacrud_model->getDashboardData($id);            
			$data['dashboard_data'] = $dashboard_data;
            $this->load->view('dashboard_header', $data);
			$this->load->view('dsa/dashboard_new', $data);
			//$this->load->view('footer');
			}
		}
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
		$new_pass= md5($password);
		$user_data = $this->Customercrud_model->getProfileData($id);
		if(!empty($user_data))
		{
			$old_pass = $user_data->PASSWORD;
			if($new_pass == $old_pass)
			{
					$response = array('status' => 0, 'message' => "New password can not be same as Old password", 'path' => '');
			        echo json_encode($response);
			}
			else
			{
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
			else if($type=='Operations_user')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Operations_user'));
			   echo json_encode($response);
			}
			else if($type=='HR')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/HR'));
			   echo json_encode($response);
			}
			else if($type=='connector')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/connector'));
			   echo json_encode($response);
			}
			else if($type=='credit_manager_user')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Credit_manager_user'));
			   echo json_encode($response);
			}
			else if($type=='branch_manager')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/BranchManager'));
			   echo json_encode($response);
			}
			else if($type=='Relationship_Officer')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Relationship_Officer'));
			   echo json_encode($response);
			}
			else if($type=='Cluster_Manager')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Cluster_Manager'));
			   echo json_encode($response);
			}
			else if($type=='Support_Member')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Support_Member'));
			   echo json_encode($response);
			}
				else if($type=='Sales_Manager')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Sales_Manager'));
			   echo json_encode($response);
			}
							else if($type=='Account_Manager')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/dsa/profile'));
			   echo json_encode($response);
			}
			else if($type=='Technical')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Technical'));
			   echo json_encode($response);
			}
			else if($type=='Legal')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Legal'));
			   echo json_encode($response);
			}
			else if($type=='Regional_Manager')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/RegionalManager'));
			   echo json_encode($response);
			}
			else if($type=='FI')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/FI'));
			   echo json_encode($response);
			}
			else if($type=='RCU')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/RCU'));
			   echo json_encode($response);
			}
			else if($type=='Disbursement_OPS')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Disbursement_OPS'));
			   echo json_encode($response);
			}
			else if($type=='distributor')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/distributor'));
			   echo json_encode($response);
			}
			else if($type=='retailer')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/retailers'));
			   echo json_encode($response);
			}
			else if($type=='supplychainmanager')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Supply_chain'));
			   echo json_encode($response);
			}
			else if($type=='MIS User')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/MIS_User'));
			   echo json_encode($response);
			}
			else if($type=='Business_Head')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Business_Head_Controller'));
			   echo json_encode($response);
			}
			else if($type=='Chief_Risk_Officer')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Business_Head_Controller'));
			   echo json_encode($response);
			}
			else if($type=='Area_Manager')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Area_Manager'));
			   echo json_encode($response);
			}
			else if($type=='SCF Operations Userr')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/SCF_Operations_User'));
			   echo json_encode($response);
			}
			else if($type=='Telecaller')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Telecaller'));
			   echo json_encode($response);
			}
		}else{
			$response = array('status' => 0, 'message' => "Unable to update password, please try again", 'path' => '');
			echo json_encode($response);
		}
			}
		}
		else
		{
		
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
			else if($type=='Operations_user')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Operations_user'));
			   echo json_encode($response);
			}
			else if($type=='HR')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/HR'));
			   echo json_encode($response);
			}
			else if($type=='connector')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/connector'));
			   echo json_encode($response);
			}
			else if($type=='credit_manager_user')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Credit_manager_user'));
			   echo json_encode($response);
			}
			else if($type=='branch_manager')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/BranchManager'));
			   echo json_encode($response);
			}
			else if($type=='Relationship_Officer')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Relationship_Officer'));
			   echo json_encode($response);
			}
			else if($type=='Cluster_Manager')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Cluster_Manager'));
			   echo json_encode($response);
			}
			else if($type=='FI')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/FI'));
			   echo json_encode($response);
			}
			else if($type=='RCU')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/RCU'));
			   echo json_encode($response);
			}
			else if($type=='Disbursement_OPS')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Disbursement_OPS'));
			   echo json_encode($response);
			}
			else if($type=='distributor')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/distributor'));
			   echo json_encode($response);
			}
			else if($type=='retailer')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/retailers'));
			   echo json_encode($response);
			}
			else if($type=='supplychainmanager')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Supply_chain'));
			   echo json_encode($response);
			}
			else if($type=='MIS User')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/MIS_User'));
			   echo json_encode($response);
			}
			else if($type=='Business_Head')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Business_Head_Controller'));
			   echo json_encode($response);
			}
			else if($type=='Chief_Risk_Officer')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Business_Head_Controller'));
			   echo json_encode($response);
			}
			else if($type=='Area_Manager')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Area_Manager'));
			   echo json_encode($response);
			}
		}else{
			$response = array('status' => 0, 'message' => "Unable to update password, please try again", 'path' => '');
			echo json_encode($response);
		}
		}
	}
	/*
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
			else if($type=='Operations_user')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Operations_user'));
			   echo json_encode($response);
			}
			else if($type=='HR')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/HR'));
			   echo json_encode($response);
			}
			else if($type=='connector')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/connector'));
			   echo json_encode($response);
			}
			else if($type=='credit_manager_user')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Credit_manager_user'));
			   echo json_encode($response);
			}
			else if($type=='branch_manager')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/BranchManager'));
			   echo json_encode($response);
			}
			else if($type=='Relationship_Officer')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Relationship_Officer'));
			   echo json_encode($response);
			}
			else if($type=='Cluster_Manager')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Cluster_Manager'));
			   echo json_encode($response);
			}
			else if($type=='Legal')
			{
				$response = array('status' => 1, 'message' => "Password updated successfully.", 'path' => base_url('index.php/Legal'));
			   echo json_encode($response);
			}
		}else{
			$response = array('status' => 0, 'message' => "Unable to update password, please try again", 'path' => '');
			echo json_encode($response);
		}
	}
	*/
	public function profile(){
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$Cities = $this->Admin_model->get_Master_Cities();
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
		$profileArr['Cities']=$Cities;
		$data['status']=$this->Retailer_model->getstatus($id);
	
		$get_uploded_doc=$this->Customercrud_model->getDocuments($id);
		
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
		
		//print_r($data['row']);
		$data['get_uploded_doc']=$get_uploded_doc;
		//print_r($data);
		$this->load->view('dashboard_profile_header', $data);
		$this->load->view('dsa/profile_new', $profileArr,$data);
	}
	public function manger_profile(){
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
		$this->load->view('dsa/manager_profile_new', $profileArr);
	}
	public function Create_lead()
	{
		
				
		$id = $this->input->get('id');
		if($id == ''){
			$id = $this->session->userdata('ID');

		}
		$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			//$this->load->view('header', $data);
			$id = $this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$dashboard_data = $this->Dsacrud_model->getDashboardData($id);            
			$data['dashboard_data'] = $dashboard_data;
			$data['dsa_id']=$id;
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
				

				$this->load->view('dashboard_header', $data);
		$this->load->view('dsa/Create_lead', $data);
	}
	public function add_new_lead ()
	{           
	            // require_once('./PHPExcel/Classes/PHPExcel.php');
				$MANAGER_ID=0;
				$CSR_ID=0;
				if ($this->session->userdata('USER_TYPE') == 'DSA_MANAGER') {
					$MANAGER_ID = $this->session->userdata('ID');
				}else if ($this->session->userdata('USER_TYPE') == 'DSA_CSR') {
					$CSR_ID= $this->session->userdata('ID');
					$MANAGER_ID= $this->Dsacrud_model->getManagerId($this->session->userdata('ID'));
				} 		
				if ($this->session->userdata('USER_TYPE') == 'DSA_MANAGER' || $this->session->userdata('USER_TYPE') == 'DSA_CSR') {
					$id=$this->session->userdata('ID');
					$DSA_ID = $this->Dsacrud_model->getDsaId($id);				
				}else if ($this->session->userdata('USER_TYPE') == 'ADMIN') {
					$DSA_ID  = 0;
				}
				else{
					$DSA_ID=$this->session->userdata('ID');
				}
				 $this->load->library('excel');
				  if(isset($_FILES["userfile"]["name"]))
					  {
					    $path = $_FILES["userfile"]["tmp_name"];
					    $path =$path[0];
					  
					    //$object = PHPExcel_IOFactory::load($path);
						$inputFileType = PHPExcel_IOFactory::identify($path);
						 $objReader = PHPExcel_IOFactory::createReader($inputFileType);
						 $objPHPExcel = $objReader->load($path);
						 $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
						
						 $i=0;
						 foreach ($allDataInSheet as $value) 
						 {
							if($i>0)
							{
							   $inserdata[$i]['first_name'] = $value['A'];
							   $inserdata[$i]['last_name'] = $value['B'];
							   $inserdata[$i]['address'] = $value['C'];
							   $inserdata[$i]['email'] = $value['D'];
							   $inserdata[$i]['mobile'] = $value['E'];
							   $inserdata[$i]['DSA_ID']=$DSA_ID;
							   $inserdata[$i]['MANAGER_ID']=$MANAGER_ID;
							   $inserdata[$i]['CSR_ID']=$CSR_ID;

							   $i++;
							}
							else
							{
								$i++;
							}
						 }
						 if(!empty($inserdata))
						 {
                          $result = $this->Dsacrud_model->importData($inserdata);
						 }
						 else
						 {
							 $result=0;
						 }
						
						if($result > 0)
						{
							$this->session->set_flashdata("result", 1);
							$this->Create_lead();
						}
                        else	
						{
							$this->session->set_flashdata("result", 0);
							$this->Create_lead();
						}						
					  }
					 
	}
	public function add_new_single_lead()
	{
		//echo "hii";
		//exit();
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }
		else
		{
	        $email=$this->input->post('email');
			$mob=$this->input->post('mobile');
			$id_mobile_exist = $this->Customercrud_model->check_mobile_new_lead($mob);
			$id_email_exist = $this->Customercrud_model->check_email_new_lead($email);

			if($id_mobile_exist > 0)
			{
				
				
				$this->session->set_flashdata("result", 6);
				$this->session->set_flashdata("message",'Mobile number already in use' );
				//$this->View_Lead();
				redirect('dsa/Create_lead');
			}
			
		    else if($id_email_exist > 0){
				$this->session->set_flashdata("result", 7);
				$this->session->set_flashdata("message",'Email id already in use' );
				//$this->View_Lead();
				redirect('dsa/Create_lead');
				
			}
			else
			{
     			//  echo "fname".$this->input->post('fname')."<br>";
				//  echo "lname".$this->input->post('lname')."<br>";
				//  echo "email".$this->input->post('email')."<br>";
				//  echo "mobile".$this->input->post('mobile')."<br>";
				//  echo "address".$this->input->post('address')."<br>";
				//  echo "connector_id".$this->input->post('connector_id')."<br>";
				 $array_input = array(
					'first_name' => $this->input->post('fname'),
					'last_name' => $this->input->post('lname'),	
					'address' => $this->input->post('address'),
					'email' => $this->input->post('email'),
					'mobile' => $this->input->post('mobile'),
					'DSA_ID' => $this->input->post('dsa_id'),
					'MANAGER_ID' => 0,
					'CSR_ID' => 0,
					'CONNECTOR_ID' =>0,
					'created_at' =>date("Y/m/d")						
				);	
				 $insert_query=$this->Customercrud_model->insert_new_lead($array_input);
				 if(isset($insert_query))
				 {
					$this->session->set_flashdata("result", 1);
					$this->Create_lead();
				 }
				 else
				 {
					$this->session->set_flashdata("result", 0);
					$this->Create_lead();

				 }
				

				
			}
		}
	}
	public function manger_profile_dsa(){
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
		$this->load->view('dsa/manager_profile_dsa', $profileArr);
	}
	

	public function update_basic_profile()
	{
		//$statle_str = file_get_contents(base_url('json/allCities.json'));
        //$state_json = json_decode($statle_str, true);
        //$states = array_keys($state_json);
		$this->load->model('Customercrud_model');
		$id = $this->input->get('id');
		if($id == '')
		{
			$id = $this->session->userdata('ID');
		}
		$data_row = $this->Customercrud_model->getProfileData($id);	
		//echo base64_decode($data_row->PAN_NUMBER);
		//exit;
		
		//print_r($data_row);
		
		$data_banks=$this->Dsacrud_model->get_all_Banks();
		$dsa_banks=$this->Dsacrud_model->get_dsa_Banks($id);
		$Branches = $this->Admin_model->get_all_Branches();
		$city_branches= $this->Admin_model->get_Distinct_City_Branches();
		$kyc_doc_for_retailer_distributor=$this->Dsacrud_model->kyc_doc_for_retailer_distributor();
		$buiss_doc_for_retailer_distributor=$this->Dsacrud_model->buiss_doc_for_retailer_distributor();
		$get_uploded_doc=$this->Customercrud_model->getDocuments($id);
		/*echo'<pre>';
		print_r($get_uploded_doc);
		exit;*/
		$Cities = $this->Admin_model->get_Master_Cities();
			
		$data['Branches']=$Branches;
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['userType'] = "DSA_MANAGER";
		$data['row'] = $data_row;
		$data['banks']=$data_banks;
		$data['dsa_banks']=$dsa_banks;
		$data['Cities']=$Cities;
		$data['city_branches']=$city_branches;
		$data['kyc_doc_for_retailer_distributor']=$kyc_doc_for_retailer_distributor;
		$data['buiss_doc_for_retailer_distributor']=$buiss_doc_for_retailer_distributor;
		$data['get_uploded_doc']=$get_uploded_doc;
		$profile_info = $this->Dsacrud_model->getProfileData($id);
		$profileArr['row'] = $profile_info;
		//$data['states'] = $states;
		$this->load->view('header', $data);
		//print_r($data);exit;
		/*if($data_row->ROLE==29)
		{
			$this->load->view('dsa/scf_profile',$profileArr, $data);
		}
		else
		{
			$this->load->view('dsa/dsa_update_profile_one_new',$profileArr, $data);
		}*/
		$this->load->view('dsa/dsa_update_profile_one_new',$profileArr, $data);
	}
	public function update_basic_profile_2()
	{
		//$statle_str = file_get_contents(base_url('json/allCities.json'));
        //$state_json = json_decode($statle_str, true);
        //$states = array_keys($state_json);
		$this->load->model('Customercrud_model');
		$id = $this->input->get('id');
		if($id == '')
		{
			$id = $this->session->userdata('ID');
		}
		$data_row = $this->Customercrud_model->getProfileData($id);	
		$data_row_more = $this->Dsacrud_model->getProfileDataMore($id);
		$login_id=$this->session->userdata('ID');
		$Login_details = $this->Customercrud_model->getProfileData($login_id);	
		//echo base64_decode($data_row->PAN_NUMBER);
		//exit;
		
		//print_r($data_row);
		
		$data_banks=$this->Dsacrud_model->get_all_Banks();
		$dsa_banks=$this->Dsacrud_model->get_dsa_Banks($id);
		$Branches = $this->Admin_model->get_all_Branches();
		$city_branches= $this->Admin_model->get_Distinct_City_Branches();
		$kyc_doc_for_retailer_distributor=$this->Dsacrud_model->kyc_doc_for_retailer_distributor();
		$buiss_doc_for_retailer_distributor=$this->Dsacrud_model->buiss_doc_for_retailer_distributor();
		$getdistributorlist=$this->Distributor_model->getdistributorlist();
		$get_uploded_doc=$this->Customercrud_model->getDocuments($id);
		/*echo'<pre>';
		print_r($get_uploded_doc);
		exit;*/
		$Cities = $this->Admin_model->get_Master_Cities();
			
		$data['Branches']=$Branches;
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$loanproduct=$this->Distributor_model->getLoanProduct();
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['userType'] = "DSA_MANAGER";
		$data['row'] = $data_row;
		$data['banks']=$data_banks;
		$data['dsa_banks']=$dsa_banks;
		$data['Cities']=$Cities;
		$data['city_branches']=$city_branches;
		$data['kyc_doc_for_retailer_distributor']=$kyc_doc_for_retailer_distributor;
		$data['buiss_doc_for_retailer_distributor']=$buiss_doc_for_retailer_distributor;
		$data['get_uploded_doc']=$get_uploded_doc;
		$data['Login_details']=$Login_details;
		$data['data_row_more']=$data_row_more;
		$data['getdistributorlist']=$getdistributorlist;
		$profile_info = $this->Dsacrud_model->getProfileData($id);
		$profileArr['row'] = $profile_info;
		$data['loanproduct']=$loanproduct;
		//$data['states'] = $states;
		$this->load->view('header', $data);
		//print_r($data);exit;
		
	    if($data_row->ROLE==29)
		{
			$this->load->view('dsa/scf_profile',$profileArr, $data);
		}
		else if($data_row->ROLE==27)
		{
			$this->load->view('dsa/scf_retailer_profile',$profileArr, $data);
		}
		else
		{
			$this->load->view('dsa/dsa_update_profile_one_new',$profileArr, $data);
		}
	
	}
	public function update_basic_profile_dsa()
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
		$this->load->view('dsa/dsa_update_profile_one_new_dsa', $data);
	}
public function update_manager_basic_profile()
	{
		//$statle_str = file_get_contents(base_url('json/allCities.json'));
        //$state_json = json_decode($statle_str, true);
        //$states = array_keys($state_json);
		$this->load->model('Customercrud_model');
		$id = $this->session->userdata("ID");
		$data_row = $this->Customercrud_model->getProfileData($id);	
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
		$this->load->view('dsa/manager_update_profile_one_new', $data);
	}

	/*public function new_customer(){
		if(($this->session->userdata('USER_TYPE') != '') && 
			( $this->session->userdata('USER_TYPE') != 'DSA' || $this->session->userdata('USER_TYPE') != 'DSA_MANAGER')){
			$loan_types=$this->Customercrud_model->get_loan_types();
			$Cities = $this->Admin_model->get_Master_Cities();
			$this->load->helper('url');
			$type = $this->input->get('type');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['type'] = $type;
			$data['loan_types']=$loan_types;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['Cities']=$Cities;
			$this->load->view('header', $data);
			$this->load->view('dsa/new_customer', $data);            
        }else{		
        	redirect(base_url('index.php/login'));
        }
	}*/

	public function new_bank(){
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'DSA' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
			$this->load->helper('url');
			$type = $this->input->get('type');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['type'] = $type;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$this->load->view('header', $data);

			$this->load->model('Admin_model');
			$id = $this->session->userdata("ID");
			$banks = $this->Admin_model->getBanks();	
			$data['banks'] = $banks;
			$this->load->view('dsa/new_bank', $data);
		}
	}

	public function new_customer_action(){
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
			$profile='';
			$this->load->model('Dsacrud_model');	
			$id = $this->session->userdata('ID');
			$data_row = $this->Customercrud_model->getProfileData($id);	
			$BM_ID=0;
			$rnd_password = $this->generateRandomString();
			$unique_code = $this->generateRandomString();
			$auth = $this->generateRandomString();
			$type = $this->input->post('type');
			$role = 1; $message = "Customer added successfully and credentials sent to customer's Email-Id and Mobile Number";
			if ($type == 'customer' || $type == 'customer_consent' ) {
				$role = 1;
				$BM_ID=0;
			}else if ($type == 'manager') {
				$role = 7;
				$BM_ID=0;
				$message = "Manager added successfully and credentials sent to manager's Email-id";
			}else if ($type == 'csr') {
				$role = 6;
				$BM_ID=0;
				$message = "CSR added successfully and credentials sent to CSR's Email-Id ";
			}else if ($type == 'dsa_rockers_agents_for_biss') {
				$role = 2;
				$BM_ID=0;
				$message = "DSA added successfully and credentials sent to DSA's Email-id ";
			
			}else if ($type == 'Operations_user') {
				$role = 3;
				$BM_ID=0;
				$message = "Operations user added successfully and credentials sent to Email-Id ";
			}
			else if ($type == 'credit_manager_user') {
				$role = 8;
				$BM_ID=0;
				$message = "Credit Manager user added successfully and credentials sent to Credit MAnager's Email-Id ";
			}
			else if ($type == 'HR') {
				$role = 9;
				$BM_ID=0;
				$message = "HR added successfully and credentials sent to HR's Email-Id ";
			}
			else if ($type == 'connector') {
				$role = 4;
				$BM_ID=0;
				$message = "Connector added successfully and credentials sent to Connector's Email-Id ";
			}
			else if ($type == 'branch_manager') {
				$role = 13;
				//$BM_ID=0;
				$message = "Branch Manager added successfully and credentials sent to Branch Manager's Email-Id ";
			}
			else if ($type == 'Relationship_Officer') {
				$role = 14;
				
				$message = "Relationship Officer added successfully and credentials sent to Relationship Officer's Email-Id ";
			}
			else if ($type == 'Cluster_Manager') {
				$role = 15;
				
				$message = "Cluster Manager added successfully and credentials sent to Cluster Manager's Email-Id";
			}
			else if ($type == 'Area_Manager') {
				$role = 16;
				
				$message = "Area Manager added successfully and credentials sent to Area Manager's Email-Id ";
			}
			else if ($type == 'Regional_Manager') {
				$role = 17;
				
				$message = "Regional Manager added successfully and credentials sent to Regional Manager's Email-Id ";
			}
			else if ($type == 'Legal') {
				$role = 18;
				
				$message = "Legal User added successfully and credentials sent to Legal Uer's Email-Id";
			}else if ($type == 'Technical') {
				$role = 19;
				
				$message = "Technical User created successfully and credentials has been sent to Legal Uer's email-id and mobile number";
			}
			else if ($type == 'Support_Member') {
				$role = 20;
				
				$message = "Support Member added successfully and credentials sent to Support Member's Email-id ";
			}
				//added by sonal
			else if ($type == 'Sales_Manager') {
				$role = 21;
				
				$message = "Sales Manager added successfully and credentials has been sent to Sales Manager's email-id";
			}
			else if ($type == 'Account_Manager') {
				$role = 22;
				
				$message = "Account Manager added successfully and credentials has been sent to Account Manager's email-id";
			}
			else if ($type == 'FI') {
				$role = 24;
				
				$message = "FI User added successfully and credentials has been sent to Account Manager's email-id";
			}
			else if ($type == 'RCU') {
				$role = 25;
				
				$message = "RCU User added successfully and credentials has been sent to Account Manager's email-id";
			}
			else if ($type == 'Disbursement_OPS') {
				$role = 26;
				
				$message = "Disbursement OPS added successfully and credentials has beed sent to Disbursement OPS User's email-id";
			}
			else if ($type == 'distributor') {
				$role = 29;
				
				$message = "Distributor added successfully and credentials has been sent to Distributor's email-id";
			}
			
			else if ($type == 'retailer') {
				$role = 27;
				
				$message = "Retailer added successfully and credentials has been sent to retailer's email-id";
			}
			/*else if ($type == 'retailer') {
				$role = 27;
				
				$message = "Retailer added successfully and credentials has been sent to Distributor's email-id";
			}
			*/
			else if ($type == 'supplychainmanager') {
				$role = 28;
				$profile="Complete";
				$message = "suuply chain manager added successfully and credentials has been sent to suuply chain manager's email-id";
			}

			else if ($type == 'MIS') {
				$role = 30;
				
				$message = "MIS User added successfully and credentials has been sent to Account Manager's email-id";
			}
            else if ($type == 'Business_Head') {
				$role = 31;
				
				$message = "Business Head added successfully and credentials has been sent to Account Manager's email-id";
			}
			 else if ($type == 'Chief_Risk_Officer') {
				$role = 32;
				
				$message = "Chief Risk Officer added successfully and credentials has been sent to Account Manager's email-id";
			}
			else if ($type == 'SCF Operations User') {
				$role = 33;
				
				$message = "SCF Operations User added successfully and credentials has been sent to Account Manager's email-id";
			}
			else if ($type == 'Telecaller') {
				$role = 34;
				
				$message = "Telecaller added successfully and credentials has been sent to Telecaller's email-id";
			}
			if ($this->session->userdata('USER_TYPE') == 'DSA_MANAGER' || $this->session->userdata('USER_TYPE') == 'DSA_CSR') {
				$id = $this->Dsacrud_model->getDsaId($id);				
			}else if ($this->session->userdata('USER_TYPE') == 'ADMIN') {
				$id = 0;
				$BM_ID=0;
			}
			
			$location = $this->input->post('Location');
			
			if($location == 'Other')
			{
				$location = $this->input->post('OtherLocation');
			}
			else{
				$location = $this->input->post('Location');
			}
			
			
			$array_input = array(
				'FN' => $this->input->post('fn'),
				'LN' => $this->input->post('ln'),
				'EMAIL' => $this->input->post('email'),
				'MOBILE' => $this->input->post('mobile'),
				'PASSWORD' =>md5($rnd_password),
				'UNIQUE_CODE' => $unique_code,
				'AUTH_TOKEN' => $auth,
				'ROLE' => $role,
				'DSA_ID' =>$id,
                'BM_ID'=>$BM_ID,
                'login_count'=>0,
                'loan_type' => $this->input->post('loan_type'),
                //'Location'=>$this->input->post('city_name'),
				//'Branch'=>$this->input->post('location'),
				'Location'=>$location,
				'Refer_By_Name'=>$this->input->post('Refered_By_Name'),
				'Refer_By'=>$this->input->post('Refer_By'),
				'Legal_bank'=>$this->input->post('bank_name'),
				'Profile_Status'=>$profile,
				'Stage'=>"Case Initiation",
				'Sub_Stage'=>"Case Initiation"
				
				
              				
				);
				if ($this->session->userdata('USER_TYPE') == 'distributor') 
				{
					$array_input['distributor_id']=$id;
				}
				if ($type == 'MIS') 
				{
					$array_input['Profile_Status']='Complete';
				}
				if ($type == 'customer' || $type == 'customer_consent' ) 
				{
					//$array_input['Employee_Branch']=$data_row->Employee_Branch;
					//$city=$this->Admin_model->get_city_of_branch($data_row->Employee_Branch);
					if($this->session->userdata('USER_TYPE') == "DSA")
					{
						$array_input['Employee_Branch']="HO";
						$city=$this->Admin_model->get_city_of_branch($array_input['Employee_Branch']);
					}
					else
					{
						if(isset($data_row->Employee_Branch))
						{
						$array_input['Employee_Branch']=$data_row->Employee_Branch;
						$city=$this->Admin_model->get_city_of_branch($data_row->Employee_Branch);
						}
					}
					if(isset($city))
						{
							$array_input['Location']=$city;
						}

				}
				
             if($this->input->post('Refer_By_Category')=='Self')
			 {
				 $array_input['Refer_By_Category']=$this->input->post('Refer_By_Category_self');
			 }
			 else{
				 $array_input['Refer_By_Category']=$this->input->post('Refer_By_Category');
			 }
			
            $mobile=$this->input->post('mobile');
			$email=$this->input->post('email');
			if ($this->session->userdata('USER_TYPE') == 'DSA_MANAGER') {
				$array_input['MANAGER_ID'] = $this->session->userdata('ID');
			}else if ($this->session->userdata('USER_TYPE') == 'DSA_CSR') {
				$array_input['CSR_ID'] = $this->session->userdata('ID');
				$array_input['MANAGER_ID'] = $this->Dsacrud_model->getManagerId($this->session->userdata('ID'));
			} 
            else if($this->session->userdata('USER_TYPE') == 'branch_manager')
			{
                $array_input['BM_ID'] = $this->session->userdata('ID');
				$array_input['DSA_ID'] = 0;
				$array_input['AM_ID'] = 0;
			}	
            else if($this->session->userdata('USER_TYPE') == 'Relationship_Officer')
			{
				$array_input['BM_ID'] = 0;
                $array_input['RO_ID'] = $this->session->userdata('ID');
				$array_input['DSA_ID'] = 0;
				$array_input['AM_ID'] = 0;
			}	
             else if($this->session->userdata('USER_TYPE') == 'Cluster_Manager')
			{
				 $array_input['CM_ID']=$this->session->userdata('ID');
				 $array_input['DSA_ID'] = 0;
				 $array_input['AM_ID'] = 0;
			}
			  else if($this->session->userdata('USER_TYPE') == 'Area_Manager')
			{
				 $array_input['RM_ID'] = 0;
				 $array_input['DSA_ID'] = 0;
				 $array_input['CM_ID'] = 0;
				 $array_input['BM_ID'] = 0;
				 $array_input['AM_ID'] = $this->session->userdata('ID');
			}	
             else if($this->session->userdata('USER_TYPE') == 'Regional_Manager')
			{
				 $array_input['RM_ID']=$this->session->userdata('ID');
				 $array_input['DSA_ID'] =0;
				 $array_input['CM_ID'] = 0;
				 $array_input['BM_ID'] = 0;
				 $array_input['AM_ID'] = 0;
			}				
			else if($this->session->userdata('USER_TYPE') == 'Support_Member')
			{
				
                $array_input['SM_ID'] = $this->session->userdata('ID');
				$array_input['DSA_ID'] = 0;
				$array_input['AM_ID'] = 0;
			}	
				//added by sonal	
			else if($this->session->userdata('USER_TYPE') == 'Sales_Manager')
			{
                $array_input['SELES_ID'] = $this->session->userdata('ID');
				$array_input['DSA_ID'] = 0;
				$array_input['AM_ID'] = 0;
			}	
			else if($this->session->userdata('USER_TYPE') == 'dsa_rockers_agents_for_biss')
			{
				$array_input['Employee_Branch']=$data_row->Employee_Branch;
			}	
			else if($this->session->userdata('USER_TYPE') == 'dsa_rockers_agents_for_biss')
			{
				$array_input['Employee_Branch']=$data_row->Employee_Branch;
			}
			
			$id = $this->Dsacrud_model->register_screen_one($array_input);
			$array_input_more=array('CUST_ID' =>$unique_code,'STATUS'=>'Created','last_updated_date'=>date("Y/m/d"));
			
			/* Create directory for customers on Next cloud STARTS HERE */
			
			$dirname = "Finaleap/customers/".$id;

				 $curlurl = "curl -X MKCOL -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD."  https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
	
			//echo "<br>";
				 exec($curlurl);

				 $this->Cron_model->insertcustomer($id);
				 
				 /* cREATE DIRECTORY FOR CUSTOMERS ENDS HERE */
			
			$id_user_more = $this->Dsacrud_model->inser_user_details_more($array_input_more);
			$fourRandomDigit=rand(1000,100000);
			if($id > 0){	
			       $login_details = "Login Credentials are : Email : ".$email." Password : ".$rnd_password;
				   $message_to_send='Hi <br><br> Thank you for your interest in Finaleap <br><br> Please Click On Link And Fill your details <br><br>.'.$login_details." <br> <br> Regards, <br> Finaleap Finserv";
				   if ($type == 'customer_consent' ) 
				   {
				    // $this->sendsms($mobile,$message_to_send,$unique_code);
				   }
				$this->sendEmail($array_input['MOBILE'], $array_input['EMAIL'], $rnd_password, $type,$unique_code);
				$response = array('status' => $role, 'message' => $message."",'USER_TYPE'=>$this->session->userdata('USER_TYPE'));

				echo json_encode($response);
			}else if($id == -1){
				$response = array('status' => 0, 'message' => 'Email id already in use');
				echo json_encode($response);
			}else if($id == -2){
				$response = array('status' => 0, 'message' => 'Mobile number is already in use');
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Some unknown error coming, please try after some time later');
				echo json_encode($response);
			}
		}
	}






	public function sendsms($mobileno, $message,$unique_code){
              
				// $message = urlencode($message);
				// $sender = 'FINALP'; 
				// $apikey = '975cgeoe8x043trf759q7160r99060j02l';
				// $baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;

				// $url = $baseurl.'&sender='.$sender.'&to='.$mobileno.'&message='.$message;    
				// $ch = curl_init();
				// curl_setopt($ch, CURLOPT_POST, false);
				// curl_setopt($ch, CURLOPT_URL, $url);
				// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				// $response = curl_exec($ch);
				// curl_close($ch);

				// // Use file get contents when CURL is not installed on server.
				// if(!$response){
				// 	$response = file_get_contents($url);
				// }
				// else
				// {
				// 	//$response = array('status' => 1, 'message' => "OTP sent on provided details.", 'path' => base_url('index.php/Customer_mobile_otp/OTP'));
				// 	 //echo json_encode($response);
				// 	 //echo $response;
				// 	// exit;
					
				// }

			//	$OTP=rand(1000,10000);
				//$this->session->set_tempdata('OTP', $OTP, 600);
				
			   // $message='Your one time login password for Finaleap is '.$OTP.'. This password will be valid for 10 min';
			   // Please provide your consent for application.\nhttps://finaleap.com/finaleap_finserv/dsa/dsa/index.php/customer/customer_consent ?ID {#var#}
				//$message='Please provide your consent for application.\nhttps://finaleap.com/dsa/dsa/index.php/customer/customer_consent?ID='.base64_encode($unique_code); 
				$message='Please provide your consent for application.\nhttps://finaleap.com/finaleap_finserv/dsa/dsa/index.php/customer/customer_consent?ID='.base64_encode($unique_code); 
				 
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
			   
				// $response = array
				// ( 'msg'=>'fail',
				// );
			   // echo json_encode($response);
			   //echo "fail";
			   //exit();
		   }
		   else
		   {
			// 	$response = array
			//    ( 'msg'=>'sucess',
			// 	);
			//    echo json_encode($response);
			   //echo "success";
			   //exit();
		   }
				
			}

	public function new_bank_action(){
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER'){
            redirect(base_url('index.php/login'));
        }else{
			$this->load->model('Dsacrud_model');	
			$id = $this->session->userdata('ID');
			
			$array_input = array(
				'BANK_NAME' => $this->input->post('bnk_name'),
				'DSA_CODE' => $this->input->post('dsa_code'),	
				'DSA_ID' => $id,		
			);
			
			$idS = $this->Dsacrud_model->saveBank($array_input);
			if($idS > 0){	
				$response = array('status' => $idS, 'message' => "Bank saved successfully");
				echo json_encode($response);
			}else {
				$response = array('status' => $idS, 'message' => "Error in Bank save");
				echo json_encode($response);
			}
		}
	}

	
	public function dsa_update_profile_one_new_action(){
		
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
			$this->load->model('Customercrud_model');	
			//$id = $this->session->userdata('ID');
			$id=$this->input->post('id');
			
			
			if($this->session->userdata('USER_TYPE') == 'DSA' )
			{
				$banks=$this->input->post('bank');
			     $dsa_code=$this->input->post('dsa_code');
				 $count=count($banks);
				$check_dsa_banks=$this->Dsacrud_model->check_dsa_banks($id);
				
				if($check_dsa_banks>0)
				{
						$array_input = array(
						  	
					   );		
				
				   // $id = $this->Customercrud_model->delete_doc($array_input);
					$remove=$this->Dsacrud_model->remove_dsa_banks($array_input,$id);
					
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
			//=================================================== following add for cluster manager also
			if($this->session->userdata('USER_TYPE') == 'DSA' || $this->session->userdata('USER_TYPE') == 'connector')
			{
			$Acc_name=$_POST['Acc_name'];
			$Acc_type=$_POST['Acc_type'];
 			$Branch_name=$_POST['Branch_name'];
			$IFSC_code=$_POST['IFSC_code'];
 			$Acc_number=$_POST['Acc_number'];
			}
			else
			{
			    $Acc_name=Array();
				$Acc_type=Array();
				$Branch_name=Array();
				$IFSC_code=Array();
				$Acc_number=Array();
			}
			 $result=array();
 			for($i=0;$i<count($Acc_name);$i++)
 				{
  					if($Acc_name[$i]!="" && $Acc_type[$i]!="" && $Branch_name[$i]!="" &&  $IFSC_code[$i]!="" &&  $Acc_number[$i]!="" )
  						{
  							 //mysql_query("insert into employee_table values('$name[$i]','$age[$i]','$job[$i]')");	
							   array_push($result,array(
								"Acc_name"=>$Acc_name[$i],
								"Acc_type"=>$Acc_type[$i],
					     		"Branch_name"=>$Branch_name[$i],
								 "IFSC_code"=>$IFSC_code[$i],
								 "Acc_number"=>$Acc_number[$i],
								
								)
							); 
  						}
 				}
			$bank_details_json=json_encode(array("result"=>$result));
			//-----------------------------------------------
			if($this->session->userdata('USER_TYPE') == 'DSA' || $this->session->userdata('USER_TYPE') == 'connector')
			{
			$array_input = array(
				'FN' => $this->input->post('f_name'),
				'MN' => $this->input->post('m_name'),	
				'LN' => $this->input->post('l_name'),
				'EMAIL' => $this->input->post('email'),
				'MOBILE' => $this->input->post('mobile'),
				'DOB' => $this->input->post('dob'),
				'EDUCATION_BACKGROUND' => $this->input->post('education_type'),	
				'AADHAR_NUMBER' => $this->input->post('aadhar'),
				'PAN_NUMBER' => $this->input->post('pan'),
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
				'dsa_firm_name' => $this->input->post('nameonpan'),
				'dsa_pincode' => $this->input->post('resi_pincode'),
				'dsa_BANK_DETAILS_JSON' =>$bank_details_json,
				'dsa_property_type' => $this->input->post('resi_sel_property_type'),
				'EXPERIENCE' => $this->input->post('experience'),	
				'YEARS_IN_CITY_LIVING' => $this->input->post('resi_no_of_years'),
				
				'Profile_Status'=>'Complete'
			);
			
			}
			 else if($this->session->userdata('USER_TYPE') == 'Legal' || $this->session->userdata('USER_TYPE') == 'Technical' ||  $this->session->userdata('USER_TYPE') == 'FI' ||  $this->session->userdata('USER_TYPE') == 'RCU')
			{
				
				/*foreach($this->input->post('Location') as $Location) {
					$data= array(
						'Location' => $this->input->post('Location'),
					
					);
				}*/
				//$Location = implode(',', $this->input->post('Location'));
				
				$Location = "";
				
				
				$array_input = array(
				'FN' => $this->input->post('f_name'),
				'MN' => $this->input->post('m_name'),	
				'LN' => $this->input->post('l_name'),
				'EMAIL' => $this->input->post('email'),
				'MOBILE' => $this->input->post('mobile'),
				'DOB' => $this->input->post('dob'),
				'EDUCATION_BACKGROUND' => $this->input->post('education_type'),	
				'dsa_address_line_1' => $this->input->post('resi_add_1'),	
				'dsa_address_line_2' => $this->input->post('resi_add_2'),	
				'dsa_address_line_3' => $this->input->post('resi_add_3'),
				'dsa_firm_name' => $this->input->post('firm_name'),
				'dsa_firm_type' => $this->input->post('firm_type'),
				'PAN_NUMBER' => $this->input->post('pan'),
				'dsa_GST'=>$this->input->post('GST'),
				'Location'=>$Location,
				'dsa_corporate_dsa_name'=>$this->input->post('Contact_person'),
				'dsa_corporate_dsa_contact'=>$this->input->post('Contact_person_Mob'),
				'Profile_Status'=>'Complete'
				);

			}
			else if($this->session->userdata('USER_TYPE') == 'SCF Operations User' || $this->session->userdata('USER_TYPE') == 'retailer' || $this->session->userdata('USER_TYPE') =='distributor'  || $this->session->userdata('USER_TYPE') =='supplychainmanager')
			{
				
				
				/*foreach($this->input->post('Location') as $Location) {
					$data= array(
						'Location' => $this->input->post('Location'),
					
					);
				}*/
			
				$result=array(
					"bank_name"=>$this->input->post('Bank_name'),
					"acc_no"=>$this->input->post('acc_no'),
					"ifsc_code"=>$this->input->post('ifsc_code'),
					"bank_branch"=>$this->input->post('Bank_branch'),
					) ; 
                $bank_details_json=json_encode($result);
				
				if($this->input->post('gst_avail')=='yes')
				{
					$add=$this->input->post('Buisness_add');
					$add1=$this->input->post('Buisness_add_current');
					$con=$this->input->post('Buisness_con');
				}
				else if($this->input->post('gst_avail')=='no')
				{
					$add=$this->input->post('Buisness_add_2');
					$add1=$this->input->post('Buisness_add_current_2');
					$con=$this->input->post('Buisness_con_2');
				}
				else{
					$add=$this->input->post('Buisness_add');
					$add1=$this->input->post('Buisness_add_current');
					$con=$this->input->post('Buisness_con');
				}
				$array_input = array(
				'FN' => $this->input->post('f_name'),//firm name
				'EMAIL' => $this->input->post('email'),
				'MOBILE' => $this->input->post('mobile'),
				'alternate_mob' => json_encode($this->input->post('alternativemob')),
				'alternate_email' => json_encode($this->input->post('alternativeemail')),
				'DOB' => $this->input->post('dob'),//date of encorporation
				'dsa_GST'=>$this->input->post('GST_number'),//gst No
				'verify_retailer_dis_gst'=>$this->input->post('verify_GST_status'),
				'dsa_address_line_1' =>$add,	
				'dsa_address_line_2' => $add1,
				'dsa_firm_name' => $this->input->post('Buisness_name'),
				'Buisness_con'=>$con,
				'PAN_NUMBER' => $this->input->post('pan'),
				'verify_retailer_dis_pan'=>$this->input->post('verify_pan_status'),
				'verify_pan_response_bis'=>$this->input->post('verify_pan_response_bis'),
				'nameonpan' => $this->input->post('nameonpan'),
				'dsa_BANK_DETAILS_JSON'=>$bank_details_json,
				'gst_avail'=>$this->input->post('gst_avail'),
				'pan_avail'=>$this->input->post('pan_avail'),
				);
				
				//$to = 'jaykumar.nimbalkar@gmail.com';
				
				//$to = $this->input->post('email');
				//$subject = "Retailer approved by SCF Manager";
				
				//$message = "Retailer approved by SCF Manager";
				
				//$this->sendemailretailer($to,$subject,$message);
				//$this->sendemailretailer(SCFEMAIL,$subject,$message);
				
				
				

			}
			else
			{
				$array_input = array(
				'FN' => $this->input->post('f_name'),
				'MN' => $this->input->post('m_name'),	
				'LN' => $this->input->post('l_name'),
				'EMAIL' => $this->input->post('email'),
				'MOBILE' => $this->input->post('mobile'),
				'DOB' => $this->input->post('dob'),
				'EDUCATION_BACKGROUND' => $this->input->post('education_type'),	
				'Employee_ID' => $this->input->post('Employee_ID'),	
				'Employee_Branch' => $this->input->post('Employee_Branch'),	
				
				'Profile_Status'=>'Complete'
			);
			
			}
			//echo $this->session->userdata('USER_TYPE');

			$idS = $this->Customercrud_model->update_profile($id, $array_input);
			if($idS > 0){	
				$response = array('status' => $idS, 'message' => "Profile updated successfully", 'UID'=>$id);
				echo json_encode($response);
			}else {
				$response = array('status' => $idS, 'message' => "Error in Bank save");
				echo json_encode($response);
			}
		}
	}

	public function delete_bank(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
	        $array_input = array(
	            'ID' => $this->input->post('id')        
	        );      
	        
	        $this->load->model('Dsacrud_model');	
	        $id = $this->Dsacrud_model->delete_bank($array_input);
	        if($id > 0){            
	            $response = array('status' => $idS, 'message' => "Profile updated successfully",'UID'=>$id);
	            echo json_encode($response);
	        }else {
	            $response = array('status' => 0, 'message' => 'Error in bank delete');
	            echo json_encode($response);
	        }
	    }
    }


	
	public function managers(){

		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'DSA' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
			$this->load->helper('url');
			$this->load->model('Dsaemployees_model');		
			$id = $this->session->userdata('ID');
			$config = array();
		    $config["base_url"] = base_url() . "index.php/dsa/managers";
		    $config["total_rows"] = $this->Dsaemployees_model->get_count($id);
		    $config["per_page"] = 10;
		    $config["uri_segment"] = 3;
		    //various pagination configuration
	        $config['full_tag_open'] = '<div class="pagination">';
	        $config['full_tag_close'] = '</div>';
	        $config['first_tag_open'] = '<span class="first">';
	        $config['first_tag_close'] = '</span>';
	        $config['first_link'] = '';
	        $config['last_tag_open'] = '<span class="last">';
	        $config['last_tag_close'] = '</span>';
	        $config['last_link'] = '';
	        $config['prev_tag_open'] = '<span class="prev">';
	        $config['prev_tag_close'] = '</span>';
	        $config['prev_link'] = '';
	        $config['next_tag_open'] = '<span class="next">';
	        $config['next_tag_close'] = '</span>';
	        $config['next_link'] = '';
	        $config['cur_tag_open'] = '<span class="current">';
	        $config['cur_tag_close'] = '</span>';

		    $this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

	        $data["links"] = $this->pagination->create_links();

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
            else
			{
                $s= 'all';
				$search_name="";
			}


	        $managers = $this->Dsaemployees_model->getManagers($id, $config["per_page"], $page,$s,$search_name);
			$_SESSION["data_for_excel"] =  $managers ;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['managers'] = $managers;
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
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

            $this->load->view('dashboard_header', $data);
			//$this->load->view('header', $data);
			$this->load->view('dsa/managers_new', $data);
		}
	}

	public function comission_action(){
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
			$this->load->model('Dsacrud_model');	
			$id = $this->input->post('id');
			$array_input = array(
				'DSA_COMISSION' => $this->input->post('comission')		
			);
			
			$id = $this->Dsacrud_model->update_comission($id, $array_input);
			if($id > 0){			
				$response = array('status' => 1, 'message' => 'Comission added successfully');
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Some unknown error coming, please try after some time later');
				echo json_encode($response);
			}
		}
	}
	
	public function loans(){
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{

			$s = $this->input->get('s');
		    if($s == '') {
                $s= 'all';
						
            }
			if($s == 'business') {
                $s= 'business';
						
            }
			if($s == 'personal') {
                $s= 'personal';
						
            }
			if($s == 'credit') {
                $s= 'credit';
						
            }
			if($s == 'home') {
                $s= 'home';
						
            }
			if($s == 'lap') {
                $s= 'lap';
						
            }



			$this->load->model('Dsacustomers_model');
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$id = $this->session->userdata('ID');

			$config = array();
		    $config["base_url"] = base_url() . "index.php/dsa/loans";
		    $config["total_rows"] = $this->Dsacustomers_model->get_count($id);
		    $config["per_page"] = 10;
		    $config["uri_segment"] = 3;
		    //various pagination configuration
	        $config['full_tag_open'] = '<div class="pagination">';
	        $config['full_tag_close'] = '</div>';
	        $config['first_tag_open'] = '<span class="first">';
	        $config['first_tag_close'] = '</span>';
	        $config['first_link'] = '';
	        $config['last_tag_open'] = '<span class="last">';
	        $config['last_tag_close'] = '</span>';
	        $config['last_link'] = '';
	        $config['prev_tag_open'] = '<span class="prev">';
	        $config['prev_tag_close'] = '</span>';
	        $config['prev_link'] = '';
	        $config['next_tag_open'] = '<span class="next">';
	        $config['next_tag_close'] = '</span>';
	        $config['next_link'] = '';
	        $config['cur_tag_open'] = '<span class="current">';
	        $config['cur_tag_close'] = '</span>';

		    $this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["links"] = $this->pagination->create_links();
	        $data['s'] = $s;
			$user_info=$this->Operations_user_model->getProfileData($id);
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
	  		if($this->session->userdata('USER_TYPE') == 'DSA'  )$loans = $this->Dsacustomers_model->get_customer_applied_loan($id,$s);

			//if($this->session->userdata('USER_TYPE') == 'DSA')$loans = $this->Dsacustomers_model->getLoans($id, $config["per_page"], $page);
			else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER')$loans = $this->Dsacustomers_model->getLoansManager($id, $config["per_page"], $page);
			else if($this->session->userdata('USER_TYPE') == 'DSA_CSR')$loans = $this->Dsacustomers_model->getLoansDsa($id, $config["per_page"], $page);
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['loans'] = $loans;
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$this->load->view('dashboard_header', $data);
			//$this->load->view('header', $data);
			// if($this->session->userdata('USER_TYPE') == 'DSA')$this->load->view('dsa/loans_new', $data);
			if($this->session->userdata('USER_TYPE') == 'DSA')$this->load->view('dsa/loans_new_1', $data);
			else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER')$this->load->view('manager/loans_new', $data);
			else if($this->session->userdata('USER_TYPE') == 'DSA_CSR')$this->load->view('csr/loans_new', $data);
		}
	}
	public function customers(){
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
        	$id = $this->input->get('id');
			if($id == '')$id = $this->session->userdata('ID');
			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$userType2 = $this->input->get('userType2');
			if ($userType == '') 
			$userType = $this->session->userdata("USER_TYPE");

					
			$filter = $this->input->get('s');
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
                $filter= $this->input->get('s');
				$search_name="";
			}
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			$customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date,$search_name);
			$_SESSION["data_for_excel"] =$customers;
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			//$this->load->view('header', $data);
            $find_coapplicants =$this->Dsacustomers_model->getCustomers_coapplicants($id);
			//echo $this->session->userdata('USER_TYPE');
			$arr['userType'] = $userType;
			$arr['customers'] = $customers;
			$arr['coapplicants']= $find_coapplicants;
			$arr['s'] = $filter;
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
			$this->load->view('dashboard_header', $data);
			if($this->session->userdata('USER_TYPE') == 'DSA')$this->load->view('dsa/customers_new', $arr);
			else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER')$this->load->view('manager/customers_new', $arr);
			else if($this->session->userdata('USER_TYPE') == 'DSA_CSR')$this->load->view('csr/customers_new', $arr);
		}
	}
	/*public function View_Lead()
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

			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			$customers = $this->Dsacustomers_model->getLead($id,$userType);
			
			//$Assign_Lead = $this->Dsacustomers_model->get_Assign_Lead($id,$userType);
		
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			//$this->load->view('header', $data);

			//echo $this->session->userdata('USER_TYPE');
			$arr['userType'] = $userType;
			$arr['customers'] = $customers;
			$arr['s']='all';
			//$arr['Assign_Lead']=$Assign_Lead;
			//$arr['s'] = $filter;
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
            $this->load->view('dashboard_header', $data);
			//$this->load->view('dsa/View_lead', $arr);
			if($this->session->userdata('USER_TYPE') == 'DSA'||$this->session->userdata('USER_TYPE') == 'Relationship_Officer' )$this->load->view('dsa/View_lead', $arr);
			else if($this->session->userdata('USER_TYPE') == 'connector')$this->load->view('Connector/View_lead', $arr);
			else if($this->session->userdata('USER_TYPE') == 'branch_manager')$this->load->view('BranchManager/View_lead', $arr);
			else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER')$this->load->view('manager/customers_new', $arr);
			else if($this->session->userdata('USER_TYPE') == 'DSA_CSR')$this->load->view('csr/customers_new', $arr);
		}
	}*/
	
	/*public function Assign_Lead(){
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
			if ($filter == '') {
				$filter = 'all';
			}
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');	
			$get_DSA= $this->Dsacustomers_model->get_DSA($id);
			$get_Connector= $this->Dsacustomers_model->get_Connector($id);
			$get_Relationship_Officer= $this->Dsacustomers_model->get_Relationship_Officer($id);
			
			
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
            $this->load->view('dashboard_header', $data);
			if($this->session->userdata('USER_TYPE') == 'DSA')$this->load->view('dsa/View_lead', $arr);
			else if($this->session->userdata('USER_TYPE') == 'connector')$this->load->view('Connector/View_lead', $arr);
			else if($this->session->userdata('USER_TYPE') == 'branch_manager' || $this->session->userdata('USER_TYPE') == 'Relationship_Officer')$this->load->view('dsa/Assign_lead', $arr);
			else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER')$this->load->view('manager/customers_new', $arr);
			else if($this->session->userdata('USER_TYPE') == 'DSA_CSR')$this->load->view('csr/customers_new', $arr);
		}
	}*/
	
	
	public function Change_Contact_Status()
	{
		$DSA_ID = $this->session->userdata('ID');
		$id= $this->input->post('id');
		
		$this->load->model('Dsacustomers_model');
		$status=$this->input->post('status');
		if($status=='Convert to Customer')
		{
			$row=$this->Dsacustomers_model->leadinfo($id);
		    
			$email=$row->email;
			$mob=$row->mobile;
						$id_mobile_exist = $this->Customercrud_model->check_mobile($id, $mob);
						$id_email_exist = $this->Customercrud_model->check_email($id, $email);

			if($id_mobile_exist > 0)
			{
				
				
				$this->session->set_flashdata("result", 1);
				$this->session->set_flashdata("message",'Mobile number already in use' );
				//$this->View_Lead();
				if($this->session->userdata('USER_TYPE') == 'DSA'|| $this->session->userdata('USER_TYPE') == 'branch_manager') redirect('dsa/View_Lead');
				else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
			}
			
		    else  if($id_email_exist > 0){
				$this->session->set_flashdata("result", 2);
				$this->session->set_flashdata("message",'Email id already in use' );
				//$this->View_Lead();
				if($this->session->userdata('USER_TYPE') == 'DSA'|| $this->session->userdata('USER_TYPE') == 'branch_manager') redirect('dsa/View_Lead');
				else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
				
			}
			else
			{
				$rnd_password = $this->generateRandomString();
			    $unique_code = $this->generateRandomString();
			    $auth = $this->generateRandomString();
				$type ='customer';
				$array_input = array(
										'FN' => $row->first_name,
										'LN' => $row->last_name,
										'EMAIL' =>$row->email,
										'MOBILE' =>$row->mobile,
										'PASSWORD' =>md5($rnd_password),
										'UNIQUE_CODE' => $unique_code,
										'AUTH_TOKEN' => $auth,
										'ROLE' =>1,
										'DSA_ID' => $DSA_ID,
										'login_count'=>0,
										'Refer_By_Category'=>$row->Refer_By_Category,
										'Refer_By_Name'=>$row->Refer_By_Name,
										'Refer_By'=>$row->Refer_By
														
										);
										
					$result = $this->Dsacrud_model->register_screen_one($array_input);
					$fourRandomDigit=rand(1000,100000);
					if($result > 0){	
						   $login_details = "Login Credentials are : Email : ".$email." Password : ".$rnd_password;
						   $message_to_send='Thank you for your interest in Finaleap, Please Click On Link And Fill your details.'.$login_details;
						   $data=array('status'=>'Convert to Customer');
						    $this->Dsacrud_model->update_lead($row->id,$data);
						//$this->sendsms($row->mobile,$message_to_send );
						$this->sendEmail($row->mobile, $row->email, $rnd_password, $type,$unique_code);
						$this->session->set_flashdata("result", 3);
				        $this->session->set_flashdata("message",'Customer entry created successfully and credentials has beed sent to customers email-id and mobile number' );
						if($this->session->userdata('USER_TYPE') == 'DSA'|| $this->session->userdata('USER_TYPE') == 'branch_manager') redirect('dsa/View_Lead');
						else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
						}
						else
						{
							$this->session->set_flashdata("result", 4);
							$this->session->set_flashdata("message",'Error in Save Customer Details' );
							if($this->session->userdata('USER_TYPE') == 'DSA'|| $this->session->userdata('USER_TYPE') == 'branch_manager') redirect('dsa/View_Lead');
						   else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
						}
			}

			
		}
		else if($status=='Reject')
		{
			   $row=$this->Dsacustomers_model->leadinfo($id);
			   $data=array('status'=>'Reject');
			   $result=$this->Dsacrud_model->update_lead($row->id,$data);
			   if($result > 0)
			   {	
			      $this->session->set_flashdata("result", 5);
				  $this->session->set_flashdata("message",'Status Updated Sucessfully');
				  if($this->session->userdata('USER_TYPE') == 'DSA'|| $this->session->userdata('USER_TYPE') == 'branch_manager') redirect('dsa/View_Lead');
			     else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
		
			   }
			   
		}
		else if($status=='Hold')
		{
			   $row=$this->Dsacustomers_model->leadinfo($id);
			   $data=array('status'=>'Hold');
			   $result=$this->Dsacrud_model->update_lead($row->id,$data);
			   if($result > 0)
			   {	
			      $this->session->set_flashdata("result", 5);
				  $this->session->set_flashdata("message",'Status Updated Sucessfully');
				  if($this->session->userdata('USER_TYPE') == 'DSA'|| $this->session->userdata('USER_TYPE') == 'branch_manager') redirect('dsa/View_Lead');
			    else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
			   }
			   
		}
		else if($status='Convert to customer with consent')
        {
            //echo "hii";
            //exit();
            $row=$this->Dsacustomers_model->leadinfo($id);
            
            $email=$row->email;
            $mob=$row->mobile;
                        $id_mobile_exist = $this->Customercrud_model->check_mobile($id, $mob);
                        $id_email_exist = $this->Customercrud_model->check_email($id, $email);

            if($id_mobile_exist > 0)
            {
                
                
                $this->session->set_flashdata("result", 1);
                $this->session->set_flashdata("message",'Mobile number already in use' );
                //$this->View_Lead();
				if($this->session->userdata('USER_TYPE') == 'DSA'|| $this->session->userdata('USER_TYPE') == 'branch_manager') redirect('dsa/View_Lead');
			else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
            }
            
            else  if($id_email_exist > 0){
                $this->session->set_flashdata("result", 2);
                $this->session->set_flashdata("message",'Email id already in use' );
                //$this->View_Lead();
				if($this->session->userdata('USER_TYPE') == 'DSA'|| $this->session->userdata('USER_TYPE') == 'branch_manager') redirect('dsa/View_Lead');
			else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
                
            }
            else
            {
                $rnd_password = $this->generateRandomString();
                $unique_code = $this->generateRandomString();
                $auth = $this->generateRandomString();
                $type ='customer_consent';
                $array_input = array(
                                        'FN' => $row->first_name,
                                        'LN' => $row->last_name,
                                        'EMAIL' =>$row->email,
                                        'MOBILE' =>$row->mobile,
                                        'PASSWORD' =>md5($rnd_password),
                                        'UNIQUE_CODE' => $unique_code,
                                        'AUTH_TOKEN' => $auth,
                                        'ROLE' =>1,
                                        'DSA_ID' => $DSA_ID,
                                        'login_count'=>0,
										'Refer_By_Category'=>$row->Refer_By_Category,
										'Refer_By_Name'=>$row->Refered_By_Name,
										'Refer_By'=>$row->Refer_By
                                                        
                                        );
                    $result = $this->Dsacrud_model->register_screen_one($array_input);
                    $fourRandomDigit=rand(1000,100000);
                    if($result > 0){    
                        $login_details = "Login Credentials are : Email : ".$email." Password : ".$rnd_password;
                        $message_to_send='Thank you for your interest in Finaleap, Please Click On Link And Fill your details.'.$login_details;
                        $data=array('status'=>'consent');
                        $this->Dsacrud_model->update_lead($row->id,$data);
                  //  $this->sendsms($row->mobile,$message_to_send,$unique_code);
                     $this->sendEmail($row->mobile, $row->email, $rnd_password, $type,$unique_code);
                     $this->session->set_flashdata("result", 3);
                     $this->session->set_flashdata("message",'Customer entry created successfully and credentials has beed sent to customers email-id and mobile number' );
					 if($this->session->userdata('USER_TYPE') == 'DSA'|| $this->session->userdata('USER_TYPE') == 'branch_manager') redirect('dsa/View_Lead');
					 else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
                     }
                     else
                     {
                         $this->session->set_flashdata("result", 4);
                         $this->session->set_flashdata("message",'Error in Save Customer Details' );
						 if($this->session->userdata('USER_TYPE') == 'DSA'|| $this->session->userdata('USER_TYPE') == 'branch_manager') redirect('dsa/View_Lead');
						 else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
                     }
                }
        }
		
        		
	}
	






	public function banks(){
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
			$id = $this->session->userdata('ID');
			$this->load->helper('url');
			$this->load->model('Dsacrud_model');
			$customers = $this->Dsacrud_model->getBanks($id);
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['customers'] = $customers;
			//$this->load->view('header', $data);
			$this->load->view('dsa/banks_new', $data);
		}
	}

	public function csr()
	{
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('USER_TYPE') == 'DSA_CSR' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
			$this->load->helper('url');
			$this->load->model('Dsacsr_model');
			$id = $this->session->userdata('ID');
			$s = $this->input->get('s');
			if($s == '')$s = 'all';		
			
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
            else
			{
                $s= 'all';
				$search_name="";
			}




			$csrs = $this->Dsacsr_model->getCsrs($id, $this->session->userdata("USER_TYPE"), $s,$search_name);
			
			$_SESSION["data_for_excel"] = $csrs;
			$age = $this->session->userdata('AGE');	
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			$data['csrs'] = $csrs;
			$data['s'] = $s;
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
				$data['username'] =$user_name;
            $data['row']=$this->Customercrud_model->getProfileData($id);

            $this->load->view('dashboard_header', $data);
			if($this->session->userdata('USER_TYPE') == 'DSA')$this->load->view('dsa/csrs_new', $data);
			else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER')$this->load->view('manager/csrs_new', $data);
			
		}
	}

	public function custBureauReports(){
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$this->load->view('header', $data);
		$this->load->view('dsa/cust_bureau_report');
	}

	public function custOfferLetters(){
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$this->load->view('header', $data);
		$this->load->view('dsa/cust_offer_letter');
	}

	/*public function changePassword(){
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$this->load->view('header', $data);
		$this->load->view('dsa/changepassword');
	}
	==================following changePassword() code by priyanka=================================*/ 
	public function changePassword()
	{
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$data['title']="Change Password";
		$this->load->view('header', $data);

		if($this->input->post('change_pass'))
		{
			$old_pass=$this->input->post('old_pass');
			$new_pass=$this->input->post('new_pass');
			$confirm_pass=$this->input->post('confirm_pass');
			$dsa_id=$this->session->userdata('id');
            
            //echo $old_pass;
			//echo $new_pass;
			//echo $confirm_pass;
			//echo $dsa_id;
			//exit();


			$old_pass_1=md5($old_pass);
			$confirm_pass_2=md5($confirm_pass);
			
			$check_existing_password= $this->Dsacrud_model->check_old_passord($old_pass_1,$dsa_id);
			if(isset($check_existing_password))
			{
				
				$result = $this->Dsacrud_model->update_dsa_password($old_pass_1,$dsa_id,$confirm_pass_2);
				$this->session->set_flashdata('success', 'Password Changed Successfully');
				redirect("dsa/changePassword?ID=$dsa_id");
		
			}
			else
			{
				$this->session->set_flashdata('error', 'Old password not found. Please try again');
				redirect("dsa/changePassword?ID=$dsa_id");
				
			}
		}
		$this->load->view('dsa/changepassword');
	}




	public function customer_moreinfo()
	{
		$this->load->model('Customercrud_model');	
		$id = $this->input->get('id', TRUE);		
		$data_row = $this->Customercrud_model->getProfileData($id);
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['id'] = $id;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$data['row'] = $data_row;
		$this->load->view('header', $data);
		$this->load->view('dsa/customermoreinfo');
	}

	public function customer_profile()
	{
		$this->load->model('Customercrud_model');	
		$id = $this->input->get('id', TRUE);;
		$data_row = $this->Customercrud_model->getProfileData($id);
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['id'] = $id;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$data['row'] = $data_row;
		$this->load->view('header', $data);
		$this->load->view('dsa/customerprofile');
	}

	public function customer_applied_loans()
	{
		$this->load->model('Customercrud_model');	
		$id = $this->input->get('id', TRUE);;
		$data_row = $this->Customercrud_model->getAppliedLoans($id);
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['id'] = $id;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$data['loans'] = $data_row;
		$this->load->view('header', $data);
		$this->load->view('dsa/customer_applied_loans');
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

	public function sendEmail($mobile, $email, $password, $type, $unique_code){
		
	/*	$config['protocol']='smtp';
		$config['smtp_host']='smtp.zoho.in';
		$config['smtp_port']='465';
		$config['smtp_timeout']='30';
		$config['smtp_crypto']='ssl';
		//$config['smtp_user']='info@finaleap.com';
		//$config['smtp_pass']='skP37cnpCIq0';
		$config['smtp_user']='flconnect@finaleap.com';
        $config['smtp_pass']='iNF0SYS@589';
		*/
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
		$code = $this->generate_uuid();
		//$from_email = "info@finaleap.com";
		//$from_email = "flconnect@finaleap.com";
		$this->email->from($from_email, 'Finaleap'); 
		$this->email->to($email);
		$this->email->bcc('customercare@finaleap.com');
		 //if($type == 'customer')
		//{
			//$this->email->bcc('flconnect@finaleap.com');

		//}
		
		$this->email->subject('Finaleap Account Details'); 
		
		$login_details = "";
		if($type == 'dsa_rockers_agents_for_biss' || $type=='csr' || $type == 'manager'|| $type=='Operations_user')
		{
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
		    $this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
		}
		else if($type == 'customer')
		{
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/Newlogin'.$login_details); 
		}
		else if($type == 'customer_consent')
		{
		   $this->email->subject('Finaleap Consent Details'); 
			$this->email->message('Hello  <br><br> thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/customer/customer_consent?ID='.base64_encode($unique_code)."  <br> <br> Regards, <br>Finserv team."); 
		}
		else if($type == 'credit_manager_user')
		{
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}
		else if($type == 'HR')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Set your password by clicking set password. '.base_url().'index.php/'.$login_details); 
	
		}
		else if($type == 'connector')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}
		else if($type == 'branch_manager')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}
		else if($type == 'Relationship_Officer')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}
		else if($type == 'Cluster_Manager'|| $type == 'Area_Manager'|| $type == 'Legal' || $type =='Technical')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}
			else if($type == 'Support_Member')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}
			//added by sonal
		else if($type == 'Sales_Manager')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}else if($type == 'Account_Manager')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}else if($type == 'Regional_Manager')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}
		else if($type == 'FI')
		{   
			
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}
		else if($type == 'RCU')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}
		else if($type == 'Disbursement_OPS')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}
		
		else if($type == 'distributor')
		{   
			$login_details = " <br><br>Your login credentials are as follows <br> Email : ".$email." <br> Password : ".$password;
			//$this->email->message('Thank you for showing interest with Finaleap Finserv Private Limited. For availing the facility, please click on the below mentioned link and fill your details <br> <a href='.base_url()."index.php/".'>click here to Login </a><br>'.$login_details.'<br> '); 
			$this->email->message('Dear Customer,</br>Thank you for showing interest in our Credit Facility. To proceed further, kindly click on the link and complete the process for onboading.<br> <a href='.base_url()."index.php/".'>click here to Login </a><br>'.$login_details.'<br> '); 
	
		}
		
		else if($type == 'retailer')
		{   
			$login_details = " <br><br>Your login credentials are as follows <br> Email : ".$email." <br> Password : ".$password;
			//$this->email->message('Thank you for showing interest with Finaleap Finserv Private Limited. For availing the facility, please click on the below mentioned link and fill your details <br> '.base_url().'index.php/ <br>'.$login_details.'<br> '); 
			$this->email->message('Dear Customer,</br>Thank you for showing interest in our Credit Facility. To proceed further, kindly click on the link and complete the process for onboading.<br> <a href='.base_url()."index.php/".'>click here to Login </a><br>'.$login_details.'<br> '); 
	
		}
		else if($type == 'supplychainmanager')
		{   
			$login_details = " <br><br>Your login credentials are as follows <br> Email : ".$email." <br> Password : ".$password;
			$this->email->message('Thank you for showing interest with Finaleap Finserv Private Limited. For availing the facility, please click on the below mentioned link and fill your details <br> '.base_url().'index.php/ <br>'.$login_details.'<br> '); 
	
	
		}
		else if($type == 'MIS')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}
		else if($type == 'Business_Head')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}
		else if($type == 'Chief_Risk_Officer')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}
		else if($type == 'SCF Operations User')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
	
		}
		else if($type == 'Telecaller')
		{   
			$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
			$this->email->message('Thank you for your interest in Finaleap,Please Click On Link And Fill your details. '.base_url().'index.php/'.$login_details); 
		}
		
			
				
		//Send mail 
		if($this->email->send()) {	
			
		}else{
			
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
			
			$data_row = $this->Dsacrud_model->getProfileData($id);
			$data_row_more = $this->Dsacrud_model->getProfileDataMore($id);	
			$data_coapplicant=$this->Dsacrud_model->getCoapplicantById($id);
			$data_appliedloan=$this->Dsacrud_model->getAplliedLoanDetails($id);
			$data_coapplicant_no=$this->Dsacrud_model->getCoapplicantNo($id);
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
			$this->load->view('header', $data);
			$this->load->view('dsa/CAM_Applicant_Details');	
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
			$id = $this->input->get("ID");
			if ($id == '') {
				$id = $this->session->userdata("ID");
			}
			
			$data_row = $this->Dsacrud_model->getProfileData($id);
			$data_row_more = $this->Dsacrud_model->getProfileDataMore($id);
            $data_doc = $this->Dsacrud_model->getDocument($id);		
            $data_doc_Count= $this->Dsacrud_model->getDocumentCount($id);	
            $data_doc_coapplicant=$this->Dsacrud_model->getDocument_Coapplicant($id);			
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
			$data['Doc_Count'] = $data_doc_Count;
			$data['Doc_coapplicant']=$data_doc_coapplicant;
			$this->load->view('header', $data);
			$this->load->view('Dsa/CAM_Document_details');	
		}
		/*$id = $this->input->get("ID");
		
		
		$this->load->view('header', $data);
	    $this->load->view('dsa/CAM_Document_details');*/	
		     	
	}
	

	function generate_uuid() {
		return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
			mt_rand( 0, 0xffff ),
			mt_rand( 0, 0x0C2f ) | 0x4000,
			mt_rand( 0, 0x3fff ) | 0x8000,
			mt_rand( 0, 0x2Aff ), mt_rand( 0, 0xffD3 ), mt_rand( 0, 0xff4B )
		);
	
	}
	public function pdf(){
		
	     $id=$this->input->get("ID");
		 $respnse=$this->Dsacrud_model->get_credit_score($id);

		  
		  if($respnse)
		  {
		 $dataArr = json_decode($respnse->response,true);
		 $data['score_success']=$respnse->score_success;
		  //echo "<pre>";
		  //print_r( $dataArr );
		 // echo "</pre>";
		  }
		  else
		  {
			  $dataArr='';
			  $data['score_success']='';
		  }
	
		//echo "<pre>";
		//print_r($dataArr);
		// echo "</pre>";
		   //$respnse->response
		// exit;
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

		//$mpdf->SetHTMLHeader($this->load->view('pdf/header',$data,true));
		//$mpdf->SetHTMLFooter($this->load->view('pdf/footer',[],true));
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
		//$html = $this->load->view('pdf/report_pdf',$data,true);
		 $html = $this->load->view('pdf/IDCCR_report_pdf_new',$data,true);
		$mpdf->WriteHTML($html);
		$file_name=md5(rand()).'pdf';
		ob_end_clean();
        $file=$mpdf->Output();
         //file_put_contents('report.pdf',$file);
		//$mpdf->Output('assets/report.pdf','F');
		//$mpdf->Output(base_url('index.php/assets/report.pdf'), 'F');
		/*$directoryName="./images/all_document_pdf/";
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
							
							}*/
	}
	//added by papiha

	//=============================================== added by priyanka====================
	public function show_coapplicants()
	{
		//$id = $_GET['ID']; 
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
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
			  $arr['get_internal_bureau']=$this->Admin_model->get_internal_bureau();
			if($this->session->userdata('USER_TYPE') == 'DSA' || $this->session->userdata('USER_TYPE') == 'branch_manager' ||$this->session->userdata('USER_TYPE') == 'Sales_Manager'  || $this->session->userdata('USER_TYPE') == 'Relationship_Officer' || $this->session->userdata('USER_TYPE') == 'Cluster_Manager' ||  $this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'Operations_user' || $this->session->userdata('USER_TYPE') == 'ADMIN' ||  $this->session->userdata('USER_TYPE') == 'Cluster_credit_manager') 
			$this->load->view('dsa/view_coapplicants', $arr);
			
		}
	}	

	public function view_loan_details()
	{
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
        	$id = $_GET['ID']; 
           
			if($id == '')$id = $this->session->userdata('ID');
			$userType = $this->input->get('userType');
		
			$date = $this->input->get('date');
			$userType2 = $this->input->get('userType2');
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
			$search_name='';
			$filter = $this->input->get('s');
			if ($filter == '') {
				$filter = 'all';
				$search_name='';
			}
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			$customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date,$search_name);
			$Applicant_row=$this->Customercrud_model->getProfileData($id);
			$loan_details=$this->Dsacrud_model->getAplliedLoanDetails($id);
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");	
			
            $find_coapplicants =$this->Dsacustomers_model->getCustomers_coapplicants($id);
			$row = $this->Customercrud_model->get_saved_credit_score($id);
		    if(!empty($row))
			{
			    $arr['score'] = $row->score;
			}
			else
			{
				$arr['score'] ="";	
			}

			$arr['Applicant_row'] = $Applicant_row;
			$arr['userType'] = $userType;
		
			$arr['customers'] = $customers;
			$arr['coapplicants']= $find_coapplicants;
			$arr['form_data']= $loan_details;
			$arr['s'] = $filter;
		
			$dsa_id=$this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($dsa_id);
			$arr['userType'] = $this->session->userdata("USER_TYPE");
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
			if($this->session->userdata('USER_TYPE') == 'DSA' || $this->session->userdata('USER_TYPE') == 'branch_manager' ||$this->session->userdata('USER_TYPE') == 'Sales_Manager' || $this->session->userdata('USER_TYPE') == 'Relationship_Officer' || $this->session->userdata('USER_TYPE') == 'Cluster_Manager' || $this->session->userdata('USER_TYPE') == 'Operations_user' || $this->session->userdata('USER_TYPE') == 'credit_manager_user')$this->load->view('dsa/view_loan_Details', $arr);
			
		}
	}
	
	
	public function check_bureau_score()
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
			//$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row2'] = $data_row;
			$data['row_more'] = $data_row_more;

			
			if($this->Customercrud_model->get_saved_credit_score($id))
			{
				
				$row = $this->Customercrud_model->get_saved_credit_score($id);
			
				$data['score'] = $row->score;
			
				$data['score_success'] = 1;
				$this->session->set_userdata("score", $row->score);
			
			}
			else
			{
			
				$data['score_success'] = 1;
				$this->session->set_userdata("score",0);
			}
            
			$dsa_id=$this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($dsa_id);
			$data['userType'] = $this->session->userdata("USER_TYPE");
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




			//$this->load->view('header', $data);
			if($this->session->userdata('USER_TYPE') == 'DSA' || $this->session->userdata('USER_TYPE') == 'branch_manager' || $this->session->userdata('USER_TYPE') == 'Sales_Manager'  || $this->session->userdata('USER_TYPE') == 'Relationship_Officer' || $this->session->userdata('USER_TYPE') == 'Cluster_Manager' || $this->session->userdata('USER_TYPE') == 'Operations_user' || $this->session->userdata('USER_TYPE') == 'credit_manager_user')$this->load->view('dsa/check_bureau_score', $data);
			
		}
	}

	public function check_bureau_score_edit()
	{
		//$Cust_consent_id = $id;
	//	exit();
		$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
		//$cust_consent_status ="true";
		$cust_consent_status  =$this->session->userdata("cust_consent_status");
		$user_type_from_session=$this->session->userdata("user_type_from_session");
		//echo $Cust_consent_id;
		//echo $cust_consent_status;
		//exit();
		if($user_type_from_session=='DSA' && isset($Cust_consent_id) || $user_type_from_session=='Relationship_Officer' && isset($Cust_consent_id) ||  $user_type_from_session=='branch_manager' && isset($Cust_consent_id) )
		{
		   //exit();
			  $id=$Cust_consent_id;
			  $data_row = $this->Customercrud_model->getProfileData($id);
			$data_row_more = $this->Customercrud_model->getProfileDataMore($id);	
			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$q = 1;
			if($u_type == 'DSA' || $u_type='Relationship_Officer' || $u_type='branch_manager')$q = 2;
			$main_doc_row = $this->Customercrud_model->getMainDocumentsCount($q);
			$saved_doc_row = $this->Customercrud_model->getSavedDocumentsCount($id);
			if($saved_doc_row->doc_count==$main_doc_row->doc_count)
			{
				$age = 1;
			}
			else $age = 0;



			if($this->Customercrud_model->get_saved_credit_score($id))
			{
				
				$row = $this->Customercrud_model->get_saved_credit_score($id);
			
				$data['score'] = $row->score;
			
				$data['score_success'] = 1;
				$this->session->set_userdata("score", $row->score);
			
			}
			else
			{
			
				$data['score_success'] = 1;
				$this->session->set_userdata("score",0);
			}

			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['row2'] = $data_row;
			$data['row_more'] = $data_row_more;
			//$this->load->view('dsa/header', $data);
			$dsa_id=$this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($dsa_id);
			$arr['userType'] = $this->session->userdata("USER_TYPE");
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


			//$this->GO_No_GO();
			$this->load->view('dsa/edit_credit_bureau_score',$data);
			//$this->load->view('dsa/check_bureau_score_edit',$data);
	
		}
		else
		{
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
		if($u_type == 'DSA' || $u_type='Relationship_Officer' || $u_type='branch_manager')$q = 2;
		$main_doc_row = $this->Customercrud_model->getMainDocumentsCount($q);
		$saved_doc_row = $this->Customercrud_model->getSavedDocumentsCount($id);
		if($saved_doc_row->doc_count==$main_doc_row->doc_count){
			$age = 1;
		}else $age = 0;


		if($this->Customercrud_model->get_saved_credit_score($id))
		{
			$row = $this->Customercrud_model->get_saved_credit_score($id);
		
			$data['score'] = $row->score;
			$data['score_success'] = 1;
			$this->session->set_userdata("score", $row->score);
		
		}
		else
		{
			$data['score_success'] = 1;
			$this->session->set_userdata("score",0);
		}
		
		$data['showNav'] = $age;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$data['row'] = $data_row;
		$data['row_more'] = $data_row_more;
		$this->load->view('dsa/header', $data);
		$this->load->view('dsa/edit_credit_bureau_score',$data);
		//$this->GO_No_GO();
		//$this->load->view('dsa/check_bureau_score_edit',$data);
		}
		
			
			
	}


		//==============================================================21-12-2021 added by priyanka ===============================================
	public function GO_No_GO()
	{
		
		if($this->session->userdata("USER_TYPE") == '')
		{
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
			
			if ($id == '') {
				$id = $this->session->userdata("ID");
			}
			
			$data_row = $this->Customercrud_model->getProfileData($id);
			$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
			$internal_loan_application_status = $this->Dsacrud_model->getinternal_loan_application_status($id);
			$data['internal_loan_application_status']=$internal_loan_application_status;
			

			
			if($data_row->customer_consent=='true')
			{
				$Cust_consent_id = $id;
				$this->session->set_userdata("Cust_consent_id",$Cust_consent_id);
				$cust_consent_status ="true";
				$this->session->set_userdata("cust_consent_status",$cust_consent_status);
				$user_type= $this->session->userdata("USER_TYPE");
				$this->session->set_userdata("user_type_from_session",$user_type);

				

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
			//$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row2'] = $data_row;
			$data['row_more'] = $data_row_more;

			
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
			    $data['score'] ="Score not checked";  
				$data['score_success'] = 1;
				
				$this->session->set_userdata("score",0);
			}
            
			$dsa_id=$this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($dsa_id);
			$data['userType'] = $this->session->userdata("USER_TYPE");
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
				 	$data['dsa_id']=$user_info->UNIQUE_CODE;
				$data['username'] =$user_name;
			$this->load->view('dashboard_header', $data);


			$co_app = $this->Customercrud_model->getMyCoapplicants($id);
		
				$data['co_app'] = $co_app;
				$isCoapp = count($co_app) > 0 ? 'true' : 'false';
				$isProfileFull = 'false';
				for ($i=0; $i < count($co_app); $i++) { 
					if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
				}
				$data['coapplicant'] = $isCoapp;

		     
			//find payment details 
			$email=$data_row->EMAIL;
			$mobile=$data_row->MOBILE;
			$name=$data_row->FN." ".$data_row->LN;
		   	$data_check_loan_payment =$this->Customercrud_model->check_loan_payment_details($email,$mobile);
			 	$offline_login_fees_payment_details =$this->Customercrud_model->check_offline_login_fees_payment_details($id);
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
						//$payment_done="payment_done";
					   // $this->session->set_userdata("payment_done",$payment_done);
					    $data['payment'] ="done";
					}
					else
					{
						//echo "above 15";
						//exit(); we are taking payment again after 15 days
					//	$payment_not_done="payment_not_done";
					  //  $this->session->set_userdata("payment_not_done",$payment_not_done);
					   $data['payment'] ="pending";
					}
					
				}
				else
				{
					//echo "payment not done";
			    	//exit();
					//$payment_not_done="payment_not_done";
					//$this->session->set_userdata("payment_not_done",$payment_not_done);
					 $data['payment'] ="pending";
				}

			$data['offline_login_fees_payment_details']=$offline_login_fees_payment_details;
			//echo $this->session->userdata('USER_TYPE');
			//$this->load->view('header', $data);
			if($this->session->userdata('USER_TYPE') == 'DSA' || $this->session->userdata('USER_TYPE') == 'branch_manager' || $this->session->userdata('USER_TYPE') == 'Sales_Manager'  || $this->session->userdata('USER_TYPE') == 'Relationship_Officer'|| $this->session->userdata('USER_TYPE') == 'Cluster_Manager' || $this->session->userdata('USER_TYPE') == 'Operations_user' || $this->session->userdata('USER_TYPE') == 'credit_manager_user')
			$this->load->view('dsa/GO_No_GO', $data);
			
		}
	}

	public function GO_No_GO_edit()
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
			
			$data_row = $this->Customercrud_model->getProfileData($id);
			$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
			$internal_loan_application_status = $this->Dsacrud_model->getinternal_loan_application_status($id);
			$data['internal_loan_application_status']=$internal_loan_application_status;
			
			
			if($data_row->customer_consent=='true')
			{
				$Cust_consent_id = $id;
				$this->session->set_userdata("Cust_consent_id",$Cust_consent_id);
				$cust_consent_status ="true";
				$this->session->set_userdata("cust_consent_status",$cust_consent_status);
				$user_type= $this->session->userdata("USER_TYPE");
				$this->session->set_userdata("user_type_from_session",$user_type);
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
			//$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row2'] = $data_row;
			$data['row_more'] = $data_row_more;

			
			if($this->Customercrud_model->get_saved_credit_score($id))
			{
				
				$row = $this->Customercrud_model->get_saved_credit_score($id);
			
				$data['score'] = $row->score;
			
				$data['score_success'] = 1;
				$data['score_details']=$row ;
				$this->session->set_userdata("score", $row->score);
			
			}
			else
			{
			
				$data['score_success'] = 1;
				$this->session->set_userdata("score",0);
			}
            
			$dsa_id=$this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($dsa_id);
			$data['userType'] = $this->session->userdata("USER_TYPE");
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

			//echo "Hi";
			//echo $this->session->userdata('USER_TYPE');
			 
			//$this->load->view('header', $data);
			if($this->session->userdata('USER_TYPE') == 'DSA' || $this->session->userdata('USER_TYPE') == 'branch_manager' || $this->session->userdata('USER_TYPE') == 'Sales_Manager'  || $this->session->userdata('USER_TYPE') == 'Relationship_Officer'||$this->session->userdata('USER_TYPE') == 'Cluster_Manager' || $this->session->userdata('USER_TYPE') == 'Sales_Manager' || $this->session->userdata('USER_TYPE') == 'Operations_user' || $this->session->userdata('USER_TYPE') == 'credit_manager_user'|| $this->session->userdata('USER_TYPE') == 'RegionalManager' ) 
				$this->load->view('dsa/GO_No_GO_edit', $data);
			
		}
	}
	public function GO_No_GO_add_coapplicant()
	{
		if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
			//$this->load->view('header', $data);
			$this->load->view('login', $data);
		}else{
			$id = $this->input->get("Applicant_ID");
			
			if ($id == '') {
				$id = $this->session->userdata("ID");
			}
			
			//echo "Id ".$id;
			
			$data_row = $this->Customercrud_model->getProfileData($id);
			$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
			
			//print_r($data_row);
			
			if($data_row->customer_consent=='true')
			{
				$Cust_consent_id = $id;
				$this->session->set_userdata("Cust_consent_id",$Cust_consent_id);
				$cust_consent_status ="true";
				$this->session->set_userdata("cust_consent_status",$cust_consent_status);
				$user_type= $this->session->userdata("USER_TYPE");
				$this->session->set_userdata("user_type_from_session",$user_type);
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
			//$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row2'] = $data_row;
			$data['row_more'] = $data_row_more;

			
			if($this->Customercrud_model->get_saved_credit_score($id))
			{
				
				$row = $this->Customercrud_model->get_saved_credit_score($id);
			
				$data['score'] = $row->score;
			
				$data['score_success'] = 1;
				$data['score_details']=$row ;
				$this->session->set_userdata("score", $row->score);
			
			}
			else
			{
			
				$data['score_success'] = 1;
				$this->session->set_userdata("score",0);
			}
            
			$dsa_id=$this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($dsa_id);
			$data['userType'] = $this->session->userdata("USER_TYPE");
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
            
			if($this->session->userdata('Coapplicant_id'))
			{
				$Coapplicant_id=$this->session->userdata('Coapplicant_id');
				$data['Coapplicant_row']= $this->Customercrud_model->getProfileData_coapp($Coapplicant_id);

				if($this->session->userdata('score_success'))
				{
						$word = "ID";
						$mystring =$this->session->userdata('score_success');
 
				
						if(strpos($mystring, $word) !== false)
						{
							$array_input_per= array(
								         'VERIFY_PAN'=>'',
										 'KYC_doc'=>'',
										 'KYC'=>'',
										 'KYC_doc_1'=>'',
										 'PAN_NUMBER'=>'',
										 'VERIFY_KYC'=>''
							);
							$this->Customercrud_model->update_coapplicant($Coapplicant_id,$array_input_per);
						} 
					
				}
		







			}
			else
			{
				//$data['Coapplicant_row']=array()
			}
	    


			//$this->load->view('header', $data);
			if($this->session->userdata('USER_TYPE') == 'DSA' || $this->session->userdata('USER_TYPE') == 'branch_manager'  || $this->session->userdata('USER_TYPE') == 'Relationship_Officer' || $this->session->userdata('USER_TYPE') == 'Cluster_Manager'  || $this->session->userdata('USER_TYPE') == 'Sales_Manager' || $this->session->userdata('USER_TYPE') == 'Operations_user' || $this->session->userdata('USER_TYPE') == 'credit_manager_user')
			$this->load->view('dsa/GO_No_GO_add_coapplicant', $data);
			
		}
	}
	public function View_Lead_user()
	{
		$User_id=$this->input->post('User_id');
	    $userType=$this->input->post('userType');
		$customers = $this->Dsacustomers_model->getLead_user($User_id,$userType);
		echo json_encode($customers);
	}
	public function View_Lead_user_assign()
	{
		$User_id=$this->input->post('User_id');
		$customers = $this->Dsacustomers_model->get_Assign_Lead_user($User_id);
		echo json_encode($customers);
	}

	
	//===========================================added by priyanka 24-12-2021
/*
	public function GO_NO_GO_application_status()
	{
		
	    $Applicant_ID = $this->input->get('ID');
		$Applicant_NAME = $this->input->get('name');
		$REMARK = $this->input->get('remark');
		$STATUS = $this->input->get('action');
		$DSA_ID = $this->input->get('DSA_ID');
		$DSA_NAME = $this->input->get('DSA_NAME');
			$array_data = array(
									'Applicant_ID' =>$Applicant_ID,
									'Applicant_NAME'=>$Applicant_NAME,
									'REMARK'=>$REMARK,
									'STATUS'=>$STATUS, 
									'DSA_ID'=>$DSA_ID,
									'DSA_NAME'=>$DSA_NAME,
									'DATE'=>date("Y-m-d")
			                  );
           
			$internal_loan_application_status = $this->Dsacrud_model->getinternal_loan_application_status($Applicant_ID);
			if(!empty($internal_loan_application_status))
			{
				$update_GO_NO_GO_application_status = $this->Dsacrud_model->update_GO_NO_GO_application_status( $Applicant_ID,$array_data);
				if($update_GO_NO_GO_application_status > 0)
					{
					    $this->session->set_flashdata("result", 10);
						redirect('dsa/GO_No_GO?ID='.$Applicant_ID);
					}
				else
					{
              	        $this->session->set_flashdata("result", 9);
						redirect('dsa/GO_No_GO?ID='.$Applicant_ID);
					}

			}

			$save_GO_NO_GO_application_status = $this->Dsacrud_model->save_GO_NO_GO_application_status($array_data);
     		if($save_GO_NO_GO_application_status > 0)
			{
					    $this->session->set_flashdata("result", 8);
						redirect('dsa/GO_No_GO?ID='.$Applicant_ID);
			}
			else
			{
              	        $this->session->set_flashdata("result", 9);
						redirect('dsa/GO_No_GO?ID='.$Applicant_ID);
			}

	}
	*/

		//===========================================modify  by priyanka 17-02-2022

			public function GO_NO_GO_application_status()
	{
		$STATUS = $this->input->get('action');
		$Applicant_ID = $this->input->get('ID');
		$Applicant_NAME = $this->input->get('name');
		
		$DSA_ID = $this->input->get('DSA_ID');
		$DSA_NAME = $this->input->get('DSA_NAME');
		$REMARK = $this->input->get('remark');
		
	    if($STATUS == 'reject')
		{
			
			$customer_id=$Applicant_ID ;
			$Source_id =$DSA_ID;
			$customer_info= $this->Operations_user_model->getProfileData($customer_id);
			$Source_info= $this->Operations_user_model->getProfileData($Source_id);
		    
			$DSA_ID1=$customer_info->DSA_ID;
			$CSR_ID=$customer_info->CSR_ID;
			$BM_ID=$customer_info->BM_ID;
			$RO_ID=$customer_info->RO_ID;
			$CM_ID=$customer_info->CM_ID;

			$rejected_customer_name=$customer_info->FN." ".$customer_info->LN;
			$rejected_customer_email=$customer_info->EMAIL;
			$rejected_customer_mobile=$customer_info->MOBILE;
			$reason_for_rejected=$REMARK;
			$rejected_by=$Source_info->FN." ".$Source_info->LN;
			if($Source_info->ROLE == 2)
			{
				$rejected_role="DSA";
			}
			else if($Source_info->ROLE == 6)
			{
				$rejected_role="CSR";
			}
			else if($Source_info->ROLE == 7)
			{
				$rejected_role="MANAGER";
			}
			else if($Source_info->ROLE == 13)
			{
				$rejected_role="BRANCH MANAGER";
			}
			else if($Source_info->ROLE == 14)
			{
				$rejected_role="Relationship Officer";
			}
			else if($Source_info->ROLE == 15)
			{
				$rejected_role="CLUSTER MANAGER";
			}
			$rejected_date= date("Y-m-d");
			
			$Email_message_data=array(
				'rejected_customer_name' => $rejected_customer_name,
				'rejected_customer_email' => $rejected_customer_email,
				'rejected_customer_mobile' => $rejected_customer_mobile,
				'reason_for_rejected' => $reason_for_rejected,
				'rejected_by' => $rejected_by,
				'rejected_role' => $rejected_role,
				'rejected_date' => $rejected_date,
			);
			$Email_message_data['Email_message_data']=$Email_message_data;

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
			$code = $this->generate_uuid();
			//$from_email = "info@finaleap.com";
			$from_email = "flconnect@finaleap.com";
			$this->email->from($from_email, 'Finaleap');

		  
	
			if($DSA_ID1!='' && $DSA_ID1!='0' && $DSA_ID1!=NULL)
			{
			
				$DSA_ID_info= $this->Operations_user_model->getProfileData($DSA_ID1);
				$DSA_email =$DSA_ID_info->EMAIL;
				
			$send_email=$DSA_email;
				$this->email->to($send_email);
				$this->email->subject('File rejected in GO NO GO process For client :  '.$rejected_customer_name.''); 
				$mailContent = $this->load->view('templates/Rejected_file_Email',$Email_message_data,true);
				$this->email->message($mailContent); 
	    		$this->email->Send() ;
			
			
			}
			else if($CSR_ID !='' && $CSR_ID!='0' && $CSR_ID != NULL)
			{
					
				$CSR_ID_info= $this->Operations_user_model->getProfileData($CSR_ID);
				$CSR_ID_email =$CSR_ID_info->EMAIL;
				
				$send_email=$CSR_ID_email;
				$this->email->to($send_email);
				$this->email->subject('File rejected in GO NO GO process For client :  '.$rejected_customer_name.''); 
				$mailContent = $this->load->view('templates/Rejected_file_Email',$Email_message_data,true);
				$this->email->message($mailContent); 
	    		$this->email->Send() ;
			}
			else if($BM_ID !='' && $BM_ID!='0' && $BM_ID != NULL)
			{
				
			
			$BM_ID_info= $this->Operations_user_model->getProfileData($BM_ID);
				$BM_ID_email =$BM_ID_info->EMAIL;
		
				$send_email=$BM_ID_email;
				$this->email->to($send_email);
				$this->email->subject('File rejected in GO NO GO process For client :  '.$rejected_customer_name.''); 
				$mailContent = $this->load->view('templates/Rejected_file_Email',$Email_message_data,true);
				$this->email->message($mailContent); 
	    		$this->email->Send() ;
			}
			else if($RO_ID !='' && $RO_ID!='0' && $RO_ID != NULL)
			{
					
				$RO_ID_info= $this->Operations_user_model->getProfileData($RO_ID);
				$RO_ID_email =$RO_ID_info->EMAIL;

				$send_email=$RO_ID_email;
				$this->email->to($send_email);
				$this->email->subject('File rejected in GO NO GO process For client :  '.$rejected_customer_name.''); 
				$mailContent = $this->load->view('templates/Rejected_file_Email',$Email_message_data,true);
				$this->email->message($mailContent); 
	    		$this->email->Send() ;
			}
			else if($CM_ID !='' && $CM_ID!='0' && $CM_ID != NULL)
			{
				
				$CM_ID_info= $this->Operations_user_model->getProfileData($CM_ID);
				$CM_ID_email =$CM_ID_info->EMAIL;

				$send_email=$CM_ID_email;
				$this->email->to($send_email);
				$this->email->subject('File rejected in GO NO GO process For client :  '.$rejected_customer_name.''); 
				$mailContent = $this->load->view('templates/Rejected_file_Email',$Email_message_data,true);
				$this->email->message($mailContent); 
	    		$this->email->Send() ;
			}

					

		}

			$array_data = array(
									'Applicant_ID' =>$Applicant_ID,
									'Applicant_NAME'=>$Applicant_NAME,
									'REMARK'=>$REMARK,
									'STATUS'=>$STATUS, 
									'DSA_ID'=>$DSA_ID,
									'DSA_NAME'=>$DSA_NAME,
									'DATE'=>date("Y-m-d")
			                  );

		  // ------------------------------------------ added by priyanka 19-02-2022
		           $check_customer_in_user_table = $this->Customercrud_model->getProfileData($Applicant_ID);
					
					       if($check_customer_in_user_table->PROFILE_PERCENTAGE==10)
							{
								$array_customer_more_details = array(
								'CUST_ID'  =>$Applicant_ID,
								'STATUS'  =>'GO NO GO '.$STATUS,
								'last_updated_date'=>date("Y/m/d")
								);
								$Result_id1 = $this->Customercrud_model->update_customer_more_details($Applicant_ID, $array_customer_more_details);
							}
                    		

						//	$cust_id=$data['customer_id'];

          //------------------------------------------------------------------
		
				           $check_customer_in_user_table = $this->Customercrud_model->getProfileData($Applicant_ID);
						  // echo $Applicant_ID;
						  // echo $check_customer_in_user_table->PROFILE_PERCENTAGE;
						   //exit();
					       if($check_customer_in_user_table->PROFILE_PERCENTAGE==10)
							{
							   $array_input = array(
					  				'PROFILE_PERCENTAGE' =>20,
				                );
							    $updated_id = $this->Customercrud_model->update_profile($Applicant_ID, $array_input);
							}
   	
			
							
					
            //==============find privious entry
			$internal_loan_application_status = $this->Dsacrud_model->getinternal_loan_application_status($Applicant_ID);
			if(!empty($internal_loan_application_status))
			{
				$update_GO_NO_GO_application_status = $this->Dsacrud_model->update_GO_NO_GO_application_status( $Applicant_ID,$array_data);
				if($update_GO_NO_GO_application_status > 0)
					{
					    $this->session->set_flashdata("result", 10);
						redirect('dsa/GO_No_GO?ID='.$Applicant_ID);
					}
				else
					{
              	        $this->session->set_flashdata("result", 9);
						redirect('dsa/GO_No_GO?ID='.$Applicant_ID);
					}

			}



			$save_GO_NO_GO_application_status = $this->Dsacrud_model->save_GO_NO_GO_application_status($array_data);
     		if($save_GO_NO_GO_application_status > 0)
			{
					    $this->session->set_flashdata("result", 8);
						redirect('dsa/GO_No_GO?ID='.$Applicant_ID);
			}
			else
			{
              	        $this->session->set_flashdata("result", 9);
						redirect('dsa/GO_No_GO?ID='.$Applicant_ID);
			}

	}


	//==========================================added by priyanka 10-01-2022
	public function GO_No_GO_()
	{
		
		if($this->session->userdata("USER_TYPE") == '')
		{
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
			
			if ($id == '') {
				$id = $this->session->userdata("ID");
			}
			
			$data_row = $this->Customercrud_model->getProfileData($id);
			$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
			$data_cust_income_details=$this->Customercrud_model->getProfileDataIncome($id);
			$data_go_no_go=$this->Customercrud_model->get_go_no_go_data($id);
			$data['data_Go_NO_GO']=$data_go_no_go;
			$data['data_cust_income_details']=$data_cust_income_details;
			$internal_loan_application_status = $this->Dsacrud_model->getinternal_loan_application_status($id);
			$data['internal_loan_application_status']=$internal_loan_application_status;
			

			
			if($data_row->customer_consent=='true')
			{
				$Cust_consent_id = $id;
				$this->session->set_userdata("Cust_consent_id",$Cust_consent_id);
				$cust_consent_status ="true";
				$this->session->set_userdata("cust_consent_status",$cust_consent_status);
				$user_type= $this->session->userdata("USER_TYPE");
				$this->session->set_userdata("user_type_from_session",$user_type);

				

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
			//$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row2'] = $data_row;
			$data['row_more'] = $data_row_more;

			
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
			    $data['score'] ="Score not checked";  
				$data['score_success'] = 1;
				
				$this->session->set_userdata("score",0);
			}
            
			$dsa_id=$this->session->userdata('ID');
				$data['dsa_id']=$dsa_id;
			$data['row']=$this->Customercrud_model->getProfileData($dsa_id);
			$data['userType'] = $this->session->userdata("USER_TYPE");
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


			$co_app = $this->Customercrud_model->getMyCoapplicants($id);
			
				$data['co_app'] = $co_app;
				$isCoapp = count($co_app) > 0 ? 'true' : 'false';
				$isProfileFull = 'false';
				for ($i=0; $i < count($co_app); $i++) { 
					if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
				}
				$data['coapplicant'] = $isCoapp;

		     
	
			$email=$data_row->EMAIL;
			$mobile=$data_row->MOBILE;
			$name=$data_row->FN." ".$data_row->LN;
		   	$data_check_loan_payment =$this->Customercrud_model->check_loan_payment_details($email,$mobile);
			if(isset($data_check_loan_payment))
				{   
					$date1=date_create($data_check_loan_payment->created_date);
					$date2=date_create(date("Y-m-d"));
	
					$diff=date_diff($date1,$date2);
					$days=$diff->format("%a"); 
			
					if($days < 15)
					{
                        
					    $data['payment'] ="done";
					}
					else
					{
						
					   $data['payment'] ="pending";
					}
					
				}
				else
				{
		
					 $data['payment'] ="pending";
				}



			//$this->load->view('header', $data);
			if($this->session->userdata('USER_TYPE') == 'DSA' || $this->session->userdata('USER_TYPE') == 'branch_manager'|| $this->session->userdata('USER_TYPE') == 'Relationship_Officer'||$this->session->userdata('USER_TYPE') == 'Cluster_Manager' || $this->session->userdata('USER_TYPE') == 'Sales_Manager' || $this->session->userdata('USER_TYPE') == 'Operations_user' || $this->session->userdata('USER_TYPE') == 'credit_manager_user')
			$this->load->view('dsa/GO_No_GO_', $data);
			
		}
	}
	public function GO_No_GO_submit()
	{
		          $data=array(
					 'customer_id'=>$this->input->post('customer_id'),
		             'f_name'=>$this->input->post('f_name'),
					 'l_name'=>$this->input->post('l_name'),
					 'm_name'=>$this->input->post('m_name'),
					 'email'=>$this->input->post('email'),
					 'mobile'=>$this->input->post('mobile'),
					 'dob'=>$this->input->post('dob'),
					 'employment_type'=>$this->input->post('employment_type'),
					 'experience'=>$this->input->post('experience'),
					 'loan_amount'=>$this->input->post('loan_amount'),
					 'tenure'=>$this->input->post('tenure'),
					 'age'=>$this->input->post('age'),
					 'Sal_age'=>$this->input->post('Sal_age'),
					 'Self_age'=>$this->input->post('Self_age'),
					 'sal_exe'=>$this->input->post('sal_exe'),
					 'self_exe'=>$this->input->post('self_exe'),
					 'eligibility_status'=>$this->input->post('eligibility_status')
		           );
				
				   //insert loan amount, age ,tenure, Sal_age,Self_age, sal_exe,self_exe,eligibility_status in new gonogo table
				   	    $cust_id=$data['customer_id'];
				        $array_go_no_go = array(
						'customer_id' => $data['customer_id'],
						'loan_amount'=>$data['loan_amount'],
						'tenure' =>$data['tenure'],
						'age' =>$data['age'],
						'Sal_age' =>$data['Sal_age'],
						'Self_age' =>$data['Self_age'],
						'sal_exe' =>$data['sal_exe'],
						'self_exe' =>$data['self_exe'],
						'eligibility_status' =>$data['eligibility_status'],
						'date'=>date("Y/m/d")
						 );

						 $check_go_no_go_id = $this->Customercrud_model->check_go_no_go_details($cust_id);
					     if($check_go_no_go_id > 0)
							{
								$Result_id1 = $this->Customercrud_model->update_go_no_go_details($cust_id, $array_go_no_go);
							}
						 else 
							{
								$Result_id = $this->Customercrud_model->insert_go_no_go_details($cust_id, $array_go_no_go);
	    					}


				   //insert employment_type , experience in customer income details table
				   if($data['employment_type']=='salaried')
				   {
						 $array_input_more = array(
						'CUST_ID' => $data['customer_id'],
						'CUST_TYPE'=>('salaried'),
						'ORG_EXP_YEAR' =>$data['experience'],
						'BIS_YEARS_IN_BIS' =>''
						 );
				   }
				   else if($data['employment_type']=='self employeed')
				   {
					    $array_input_more = array(
						'CUST_ID' => $data['customer_id'],
						'CUST_TYPE'=>('self employeed'),
						'BIS_YEARS_IN_BIS' =>$data['experience'],
						'ORG_EXP_YEAR' =>''
						 );
				   }
				   else if($data['employment_type']=='retired')
				   {
						$array_input_more = array(
						'CUST_ID' => $data['customer_id'],
						'CUST_TYPE'=>('retired'),
						'BIS_YEARS_IN_BIS' =>'',
						'ORG_EXP_YEAR' =>''
						 );
				   }

					$check_id = $this->Customercrud_model->check_income_profile($cust_id);
					if($check_id > 0)
					{
						$Result_id1 = $this->Customercrud_model->update_profile_income_details($cust_id, $array_input_more);
					}
					else 
					{
						$Result_id = $this->Customercrud_model->insert_profile_income_details($cust_id, $array_input_more);
	    			}
					//=============================  save details into user table ==============================================
					$array_input3 = array(
					  				'DOB'=>$this->input->post('dob'),
									'Sub_Stage'=>"RULE ENGINE PROCESS",
				                );
							    $updated_id = $this->Customercrud_model->update_profile($cust_id, $array_input3);
							    
					$check_customer_in_user_table = $this->Customercrud_model->getProfileData($cust_id);
					  if($check_customer_in_user_table->PROFILE_PERCENTAGE=='' || $check_customer_in_user_table->PROFILE_PERCENTAGE == NULL || $check_customer_in_user_table->PROFILE_PERCENTAGE =='0')
							{
							   $array_input = array(
					  				'PROFILE_PERCENTAGE' =>10,
				                );
							    $updated_id = $this->Customercrud_model->update_profile($cust_id, $array_input);
							}

	                   	$check_customer_in_user_table = $this->Customercrud_model->getProfileData($cust_id);
					  if($check_customer_in_user_table->PROFILE_PERCENTAGE=='' || $check_customer_in_user_table->PROFILE_PERCENTAGE == NULL || $check_customer_in_user_table->PROFILE_PERCENTAGE =='0' || $check_customer_in_user_table->PROFILE_PERCENTAGE =='10')
							{
        						   $array_customer_more_details = array(
									'CUST_ID'  =>$cust_id,
									'STATUS'  =>'Rule Engine Process',
									'last_updated_date'=>date("Y/m/d")
									);

									 $check_customer_more_details = $this->Customercrud_model->check_customer_more_details($cust_id);
									 if($check_customer_more_details > 0)
										{
											$Result_id1 = $this->Customercrud_model->update_customer_more_details($cust_id, $array_customer_more_details);
										}
									 else 
										{
											$Result_id = $this->Customercrud_model->insert_customer_more_details($cust_id, $array_customer_more_details);
	    								}
                              }

				  //--------------------------------------------------------------------------------------------------------------
				   if($data['eligibility_status']=='Eligible')
				   {
				       
     				$json = array		(   'response' =>'congratulations you are eligible for further process !!',
											'msg'=>'sucess'
										);
										echo json_encode($json);
							   
				            
				   }
				   else if($data['eligibility_status']=='Not Eligible')
				   {
					     if($data['Sal_age']==0)
						 {
                           $reason1='Age and tenure not fits in our criteria';
						 }
						 else
						 {
							$reason1='';
						 }
						 if($data['Self_age']==0)
						 {
						   $reason2='Age and tenure not fits in our criteria';
						 }
						  else
						 {
							 $reason2='';
						 }

						  if($data['sal_exe']==0)
						 {
							$reason3='Your employment experience not fits in our criteria';
						 }
						  else
						 {
							 $reason3='';
						 }

						  if($data['self_exe']==0)
						 {
                            $reason4='Your business experience not fits in our criteria';
						 }
						  else
						 {
							 $reason4='';
						 }

                           $json = array
										(   'msg'=>'fail',
											'response' =>'Opps !! Currently you are not eligible for further process.Please try again later',
										    'rejection_reason1'=>$reason1,
											'rejection_reason2'=>$reason2,
											'rejection_reason3'=>$reason3,
											'rejection_reason4'=>$reason4
											
										);
										echo json_encode($json);
				   }
				  
	}
	/*public function new_customer()
	{
		if(($this->session->userdata('USER_TYPE') != '') && 
			( $this->session->userdata('USER_TYPE') != 'DSA' || $this->session->userdata('USER_TYPE') != 'DSA_MANAGER')){
			$loan_types=$this->Customercrud_model->get_loan_types();
			$Cities = $this->Admin_model->get_Master_Cities();
			$data['banks']=$this->Customercrud_model->get_banks();
			$this->load->helper('url');
			$type = $this->input->get('type');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['type'] = $type;
			$data['loan_types']=$loan_types;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['Cities']=$Cities;
			$this->load->view('header', $data);
			$this->load->view('dsa/new_customer', $data);            
        }else{		
        	redirect(base_url('index.php/login'));
        }
	}*/
	/*---------------------------------------------- Added by papiha on 02_03_2022-------------------------------------------------------*/
	public function View_Lead()
	{
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
			
			
			//$Assign_Lead = $this->Dsacustomers_model->get_Assign_Lead($id,$userType);
		
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			//$this->load->view('header', $data);

			//echo $this->session->userdata('USER_TYPE');
			$arr['userType'] = $userType;
			$arr['customers'] = $customers;
			$arr['s']='all';
			//$arr['Assign_Lead']=$Assign_Lead;
			//$arr['s'] = $filter;
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
            $this->load->view('dashboard_header', $data);
			//$this->load->view('dsa/View_lead', $arr);
			//if($this->session->userdata('USER_TYPE') == 'DSA'||$this->session->userdata('USER_TYPE') == 'Relationship_Officer' )$this->load->view('dsa/View_lead', $arr);
			//else if($this->session->userdata('USER_TYPE') == 'connector')$this->load->view('Connector/View_lead', $arr);
			$this->load->view('BranchManager/View_lead', $arr);
			//else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER')$this->load->view('manager/customers_new', $arr);
			//else if($this->session->userdata('USER_TYPE') == 'DSA_CSR')$this->load->view('csr/customers_new', $arr);
		}

}
/*------------------------------------ Addded by papiha on 02_03_2022--------------------------------------------------------------*/
public function Assign_Lead(){
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
		$get_DSA= $this->Dsacustomers_model->get_DSA($id);
		$get_Connector= $this->Dsacustomers_model->get_Connector($id);
		$get_Relationship_Officer= $this->Dsacustomers_model->get_Relationship_Officer($id);
		
		
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
		$this->load->view('dashboard_header', $data);
		
		$this->load->view('dsa/Assign_lead', $arr);
		
	}
}
//=========================== added by priyanka 1-04-2022
public function CONTINUE_CUSTOMER_APPLICATION()
{
	$data=array(
					 'User_ID'=>$this->input->post('User_ID'),
					 'Action'=>$this->input->post('Action'),
					 'dsa_id'=>$this->input->post('dsa_id'),
		            );

		$Applicant_ID=$data['User_ID'];
		$array_input3 = array(
									
					  				'Sub_Stage'=>"Approved",
				                );
		$updated_id = $this->Customercrud_model->update_profile($Applicant_ID, $array_input3);
		$user_info= $this->Operations_user_model->getProfileData($data['User_ID']);
	    $dsa_info=$this->Operations_user_model->getProfileData($data['dsa_id']);
		$Applicant_NAME=$user_info->FN." ".$user_info->LN;
		$DSA_NAME=$dsa_info->FN." ".$dsa_info->LN;
			$array_data = array(
									'Applicant_ID' =>$Applicant_ID,
									'Applicant_NAME'=>$Applicant_NAME,
									'STATUS'=>$data['Action'], 
									'DSA_ID'=>$data['dsa_id'],
									'DSA_NAME'=>$DSA_NAME,
									'DATE'=>date("Y-m-d")
			                  );
			$internal_loan_application_status = $this->Dsacrud_model->getinternal_loan_application_status($Applicant_ID);
			if(!empty($internal_loan_application_status))
			{
				$update_GO_NO_GO_application_status = $this->Dsacrud_model->update_GO_NO_GO_application_status( $Applicant_ID,$array_data);
			}
			else
			{
				$save_GO_NO_GO_application_status = $this->Dsacrud_model->save_GO_NO_GO_application_status($array_data);
     		
			}	
		$usertable_data=array(
			  'UNIQUE_CODE' =>$Applicant_ID,
			  'credit_sanction_status'=>$data['Action'],
		);
		$result_for_status = $this->credit_manager_user_model->update_credit_sanction_status($Applicant_ID,$usertable_data);
		
        //============================ added by priya 16-01-2023===================================================
		$applicant_id=	$Applicant_ID;
		$login_user_id=$data['dsa_id'];
		$Applicant_details = $this->Customercrud_model->getProfileData($applicant_id);
		$login_user_details = $this->Customercrud_model->getProfileData($login_user_id);
		$genarater_details= $this->Customercrud_model->getProfileData($Applicant_details->RO_ID);
	
		if($login_user_details->ROLE == '13')
		{
			$array = array(
			'Bureau_review' =>'Bureau Approved',
			'Bureau_review_submitted_by' => $login_user_details->FN." ".$login_user_details->LN,
			'Bureau_review_submitted_by_ID' =>$login_user_id,
			'Bureau_review_submitted_on' => date('d-m-Y'),
			'Bureau_review_submitted_to' =>$genarater_details->FN." ".$genarater_details->LN,
			'Bureau_review_submitted_to_ID' =>$genarater_details->UNIQUE_CODE,
			);
			$array_input_json=json_encode($array);
			 $array_input = array(
			'Bureau_review' =>$array_input_json,
			);
			$idS = $this->Customercrud_model->update_bureau_comments($applicant_id, $array_input);
			
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
			$data['submitted_to']=$genarater_details->FN." ".$genarater_details->LN;
			$data['submitted_by']=$login_user_details->FN." ".$login_user_details->LN;
			$data['submitted_for']=$Applicant_details->FN." ".$Applicant_details->LN;
			$data['submitted_on']=date('d-m-Y');
			$this->email->from($from_email, 'Finaleap Finserv Test'); 
			$send_email_to_support=$genarater_details->EMAIL;
			$this->email->to($send_email_to_support);
			$subject = 'Bureau Approved';
			$this->email->subject($subject);
			$mailContent = $this->load->view('templates/Application_approved_in_review.php',$data,true);
			$this->email->message($mailContent); 
			$this->email->Send();

		}
		//=============================================================================================
		$json = array (  
			'User_ID'=>$Applicant_ID,
			'DSA_ID'=>$data['dsa_id'],
			'msg'=>'success'  );
		echo json_encode($json);
}
public function HOLD_CUSTOMER_APPLICATION()
{
		  $data=array(
					 'User_ID'=>$this->input->post('User_ID'),
					 'Action'=>$this->input->post('Action'),
					 'Reason'=>$this->input->post('Reason'),
					 'dsa_id'=>$this->input->post('dsa_id'),
		            );
		$Applicant_ID=$data['User_ID'];
		$array_input3 = array(
									
					  				'Sub_Stage'=>"Hold",
				                );
							    $updated_id = $this->Customercrud_model->update_profile($Applicant_ID, $array_input3);
		$user_info= $this->Operations_user_model->getProfileData($data['User_ID']);
	    $dsa_info=$this->Operations_user_model->getProfileData($data['dsa_id']);
		$Applicant_NAME=$user_info->FN." ".$user_info->LN;
		$DSA_NAME=$dsa_info->FN." ".$dsa_info->LN;
		$array_data = array(
									'Applicant_ID' =>$Applicant_ID,
									'Applicant_NAME'=>$Applicant_NAME,
									'REMARK'=>$data['Reason'],
									'STATUS'=>$data['Action'], 
									'DSA_ID'=>$data['dsa_id'],
									'DSA_NAME'=>$DSA_NAME,
									'DATE'=>date("Y-m-d")
			                  );
			$internal_loan_application_status = $this->Dsacrud_model->getinternal_loan_application_status($Applicant_ID);
			if(!empty($internal_loan_application_status))
			{
				$update_GO_NO_GO_application_status = $this->Dsacrud_model->update_GO_NO_GO_application_status( $Applicant_ID,$array_data);
			}
			else
			{
				$save_GO_NO_GO_application_status = $this->Dsacrud_model->save_GO_NO_GO_application_status($array_data);
     		
			}	
		$usertable_data=array(
			  'UNIQUE_CODE' =>$Applicant_ID,
			  'credit_sanction_status'=>$data['Action'],
		);
		$result_for_status = $this->credit_manager_user_model->update_credit_sanction_status($Applicant_ID,$usertable_data);
		  
		$json = array (  
			'User_ID'=>$Applicant_ID,
			'DSA_ID'=>$data['dsa_id'],
			'msg'=>'success'  );
		echo json_encode($json);
}
public function REJECT_CUSTOMER_APPLICATION()
{
	
		  $data=array(
					 'User_ID'=>$this->input->post('User_ID'),
					 'Action'=>$this->input->post('Action'),
					 'Reason'=>$this->input->post('Reason'),
					 'dsa_id'=>$this->input->post('dsa_id'),
		            );
		 $Applicant_ID=$data['User_ID'];
		 $array_input3 = array(
								
					  				'Sub_Stage'=>"Reject",
				                );
							    $updated_id = $this->Customercrud_model->update_profile($Applicant_ID, $array_input3);
		$user_info= $this->Operations_user_model->getProfileData($data['User_ID']);
	    $dsa_info=$this->Operations_user_model->getProfileData($data['dsa_id']);

	     $find_online_login_fees_details= $this->Operations_user_model->online_login_fees_details($data['User_ID']);
        $find_offline_login_fees_details= $this->Operations_user_model->offline_login_fees_details($data['User_ID']);
        $data_appliedloan=$this->credit_manager_user_model->getAplliedLoanDetails($data['User_ID']);
       if(!empty($find_online_login_fees_details->Payment_Recived_date))
        {
        	$payment_flag= "true";
        }
        else if(!empty($find_offline_login_fees_details->Payment_Recived_date))
        {
        	$payment_flag= "true";
        }
        else
        {
        	$payment_flag= "false";
        }
       
        if($payment_flag == "true") 
        {
        	//echo "send rejection letter";
        	// $this->email->attach('./images/all_document_pdf/'.$respnse_no.'.pdf');
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
            $config['mailtype'] = MAILTYPE;
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$this->email->from($from_email, 'Finaleap'); 
			$send_email_to_customer=$user_info->EMAIL;
			//$send_email_to_customer='piyuabdagire@gmail.com';
			$this->email->to($send_email_to_customer);
			$this->email->subject('Loan Application Rejected'); 
			// $this->email->attach('./images/all_document_pdf/'.$respnse_no.'.pdf');
			 /*	<a target='_blank' href="<?php echo base_url()?>index.php/Credit_manager_user/Decline_Letter_pdf?ID=<?php echo $row->UNIQUE_CODE;?>">
			 <button type="button" class="btn btn-success">Decline LETTER</button></a>*/
			$name =$user_info->FN;
			$application_number= $data_appliedloan->Application_id;
		    $customer_unique_code =$user_info->UNIQUE_CODE;
			$Email_message_data=array(
				'name' =>$name ,
				'application_number' =>$application_number,
				'customer_unique_code' =>$customer_unique_code,
	
			);
			$Email_message_data['Email_message_data']=$Email_message_data;
			$mailContent = $this->load->view('templates/Rejected_file_Email_for_customer',$Email_message_data,true);
			$this->email->message($mailContent);
			$this->email->send();

        }
        else
        {
        	//echo "send rejection email";
        	//$message='Dear Customer, \nThank you for choosing FINALEAP. We regret to Inform that Your Loan Application No'.$OTP.' is rejected based on Current Assessment';


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
            $config['mailtype'] = MAILTYPE;
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$this->email->from($from_email, 'Finaleap'); 
			$send_email_to_customer=$user_info->EMAIL;
			//$send_email_to_customer='piyuabdagire@gmail.com';
			$this->email->to($send_email_to_customer);
			$this->email->subject('Loan Application Rejected'); 
			$name =$user_info->FN;
			if(!empty($data_appliedloan))
			{
			   $application_number= $data_appliedloan->Application_id;
			}
			else
			{
               $application_number='';
			}
					
			//$msg='Thank you for choosing FINALEAP FINSERV.
			//We regret to Inform that Your Loan Application No : '.$application_number.' is rejected based on Current Assessment';
			//$this->email->message('Dear '.$name.','."\r\n\n".$msg."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Finserv Private Limited '); 
			//$this->email->send();
			$Email_message_data=array(
				'name' =>$name ,
				'application_number' =>$application_number
	
			);
			$Email_message_data['Email_message_data']=$Email_message_data;
			$mailContent = $this->load->view('templates/Rejected_file_Email_for_customer',$Email_message_data,true);
			$this->email->message($mailContent);
			$this->email->send();
			
        }

        //exit();	
		$Applicant_NAME=$user_info->FN." ".$user_info->LN;
		$DSA_NAME=$dsa_info->FN." ".$dsa_info->LN;
		$array_data = array(
									'Applicant_ID' =>$Applicant_ID,
									'Applicant_NAME'=>$Applicant_NAME,
									'REMARK'=>$data['Reason'],
									'STATUS'=>$data['Action'], 
									'DSA_ID'=>$data['dsa_id'],
									'DSA_NAME'=>$DSA_NAME,
									'DATE'=>date("Y-m-d")
			                  );

		$internal_loan_application_status = $this->Dsacrud_model->getinternal_loan_application_status($Applicant_ID);
			if(!empty($internal_loan_application_status))
			{
				$update_GO_NO_GO_application_status = $this->Dsacrud_model->update_GO_NO_GO_application_status( $Applicant_ID,$array_data);
			}
			else
			{
				$save_GO_NO_GO_application_status = $this->Dsacrud_model->save_GO_NO_GO_application_status($array_data);
     		
			}
	
					
		$json = array (  
			'User_ID'=>$Applicant_ID,
			'DSA_ID'=>$data['dsa_id'],
			'msg'=>'success'  );
		echo json_encode($json);
}
public function onload_check_status()
{
	               $data=array(
					 'User_ID'=>$this->input->post('User_ID'),
			        );
				    $user_info= $this->Operations_user_model->getProfileData($data['User_ID']);
					$internal_loan_application_status = $this->Dsacrud_model->getinternal_loan_application_status($data['User_ID']);
		            $reason =$internal_loan_application_status->REMARK;
					$action_by =$internal_loan_application_status->DSA_NAME;
					if(!empty($user_info))
					{
						if(isset($user_info->credit_sanction_status))
						{
							$status= $user_info->credit_sanction_status;
							if($status == 'REJECT')
							{
									  
										$json = array (  
											'User_ID'=>$data['User_ID'],
											'reason'=>$reason,
											'action_by'=>$action_by,
											'msg'=>'REJECT'  );
										echo json_encode($json);

							}
							else if($status == 'HOLD')
							{
								$json = array (  
											'User_ID'=>$data['User_ID'],
											'reason'=>$reason,
											'action_by'=>$action_by,
											'msg'=>'HOLD'  );
										echo json_encode($json);
							}
							else if($status == 'CONTINUE')
							{
								$json = array (  
											'User_ID'=>$data['User_ID'],
											'action_by'=>$action_by,
											'msg'=>'CONTINUE'  );
										echo json_encode($json);
							}
							
						}
						else 
							{
								$json = array (  
											'User_ID'=>$data['User_ID'],
											'action_by'=>$action_by,
											'msg'=>'CONTINUE'  );
										echo json_encode($json);
							}
					}
}
/*--------------------Added by papiha on 22_04_2022------------------------------------------------------------*/
public function new_customer()
	{
		 //print_r($this->session->ID);
		
		
		if(($this->session->userdata('USER_TYPE') != '') && 
			( $this->session->userdata('USER_TYPE') != 'DSA' || $this->session->userdata('USER_TYPE') != 'DSA_MANAGER' )){
			$loan_types=$this->Customercrud_model->get_loan_types();
			$Cities = $this->Admin_model->get_Master_Cities();
			
			$Cities = $this->Admin_model->get_Master_Branch();
			
			$data['banks']=$this->Customercrud_model->get_banks();
			
			$userid = $this->session->ID;
			
			$userdata = $this->Customercrud_model->getProfileData($userid);
			
			//print_r($userdata);
			$data['userdata'] = $userdata;
			$this->load->helper('url');
			$type = $this->input->get('type');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['type'] = $type;
			$data['loan_types']=$loan_types;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['Cities']=$Cities;
			$Branches = $this->Admin_model->get_all_Branches();
			$Branches_city=$this->Admin_model->get_all_Branches_city();
		    $data['Branches_city']=$Branches_city;
			$data['Branches']=$Branches;
			$this->load->view('header', $data);
			$this->load->view('dsa/new_customer', $data);            
        }else{		
        	redirect(base_url('index.php/login'));
        }
	}

//============================================== revert applicant details added by priya 6-05-2022=======================
	public function Revert_Applicant_data()
	{
		  $data=array(
					 'Applicant_Array'=>$this->input->post('Applicant_Array'),
					 'User_ID'=>$this->input->post('User_ID'),
					 'dsa_id'=>$this->input->post('dsa_id'),
					 'RevertReason'=>$this->input->post('RevertReason')
			        );
		$Applicant_ID=$data['User_ID'];
		$user_info= $this->Operations_user_model->getProfileData($data['User_ID']);
	    $dsa_info=$this->Operations_user_model->getProfileData($data['dsa_id']);
		$Applicant_NAME=$user_info->FN." ".$user_info->LN;
		$DSA_NAME=$dsa_info->FN." ".$dsa_info->LN;
		$pages_for_revert=$data['Applicant_Array'];



        foreach($pages_for_revert as $a)
        {
        	$revert_pages_data = array(
									'Customer_ID' =>$Applicant_ID,
									'Revert_ON_page'=>$a,
									'Page_revert_status'=>'OPEN',
									'Date'=>date('d-m-Y'), 
								        );

      	$insert_pages_for_revert = $this->Dsacrud_model->Save_pages_for_revert($revert_pages_data);
 
        }
      
		$array_data = array(
									'Applicant_ID' =>$Applicant_ID,
									'Applicant_NAME'=>$Applicant_NAME,
									'REMARK'=>$data['RevertReason'],
									'STATUS'=>'REVERT', 
									'DSA_ID'=>$data['dsa_id'],
									'DSA_NAME'=>$DSA_NAME,
									'DATE'=>date("d-m-Y")
			                  );
			$internal_loan_application_status = $this->Dsacrud_model->getinternal_loan_application_status($Applicant_ID);
			if(!empty($internal_loan_application_status))
			{
				$update_GO_NO_GO_application_status = $this->Dsacrud_model->update_GO_NO_GO_application_status($Applicant_ID,$array_data);
			}
			else
			{
				$save_GO_NO_GO_application_status = $this->Dsacrud_model->save_GO_NO_GO_application_status($array_data);
     		
			}
	
		$usertable_data=array(
			  'UNIQUE_CODE' =>$Applicant_ID,
			  'credit_sanction_status'=>'REVERT',
		);
		$result_for_status = $this->credit_manager_user_model->update_credit_sanction_status($Applicant_ID,$usertable_data);
		  
		$json = array (  
			'User_ID'=>$Applicant_ID,
			'DSA_ID'=>$data['dsa_id'],
			'msg'=>'success');
		echo json_encode($json);
	}
	public function Revert_CoApplicant_data()
	{
		
			$json = array (  
				
				'msg'=>'success'  );
			echo json_encode($json);
	}
	/*-------------------------------------------------- Addded by papiha on 24_08_2022 upload document from profilw upload_retailer_doc--------------------------------------------*/
    public function upload_retailer_doc()
	{           
		        $id = $this->session->userdata('ID');
                $dirname = "Finserv/SCFO/".$id;
	
				$curlurl = "curl -X MKCOL -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD."  https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
	
				//echo "<br>";
					 exec($curlurl);
	
					
	
					 /* cREATE DIRECTORY FOR CUSTOMERS ENDS HERE */ 
				 /* code to export files to Nextcloud starts here */
				   $time = time();
				   //$dir = $customer_details->ID."/";
				  
				   $fileextensionarr = explode(".",$_FILES["userfile"]["name"]);
				   $fileextension = $fileextensionarr[1];
				   $filename = $time.".".$fileextension;
				   $dirname = "Finserv/SCFO/".$id."/";
				   $filenamewithdir = $dirname.$filename;
				   $correcturl = "curl -X PUT -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD."  https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["userfile"]["tmp_name"]."";
				   exec($correcturl);
				   $file_input_arr = array
				   (
					    'USER_ID' => $id,
						'DOC_TYPE' =>$this->input->post('DOC_TYPE'),	
						'DOC_NAME' => $filename,
						'DOC_SIZE' =>$_FILES["userfile"]["size"],
						'DOC_FILE_TYPE' => $_FILES['userfile']['type'],
						'DOC_MASTER_TYPE' =>$this->input->post('DOC_MASTER_TYPE'),
						'doc_cloud_name' => $filename,
						'doc_cloud_dir' => $dirname,
						
					
					);
					$this->Admin_model->saveDocuments($file_input_arr);
					//redirect('Legal/Send_Documents?x='.base64_encode($Application_id).'&y='.base64_encode($id));
					$retailer_doc=$this->Customercrud_model->getDocuments($id);
					$response = array('result' => 3,'docs'=>$retailer_doc);
					echo json_encode($response);
	}
	
	
	public function sendemailretailer($to,$subject,$message)
	{
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
		$this->email->from($from_email, 'Finaleap'); 
		
		$this->email->to($to);
		$this->email->subject($subject);
		
		$this->email->message($message); 
		if($this->email->Send())
			{
						
			}
			else
			{
				echo $this->email->print_debugger();
			}
		
		
	}
	public function get_bank_details()
	{
		$data = file_get_contents("php://input");
		$data_obj = json_decode($data);
		$ifsc=$data_obj->IFSC;
	

			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://ifsc.razorpay.com/'.$ifsc,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;


	}
	public function save_propriter_details()
	{
		$unique_code = $this->generateRandomString();
		$data=array(
			'dis_id'=>$this->input->post('dis_id'),
			'd_id'=>$unique_code,
			'd_name'=>$this->input->post('d_name'),
			'd_pan'=>$this->input->post('d_pan'),
			'd_verify_pan_status'=>$this->input->post('d_verify_pan_status'),
			'd_verify_pan_response'=>$this->input->post('d_verify_pan_response'),
			'd_dob'=>$this->input->post('d_dob'),
            'd_Address'=>$this->input->post('d_Address'),
            'd_pincode'=>$this->input->post('d_pincode'),
            'd_abbr'=>$this->input->post('d_abbr'),
            'd_city'=>$this->input->post('d_city')
			);
			$prp_id = $this->Customercrud_model->savepropriter_details($data);
			if(!empty($_FILES['d_aadhar']['name']))
				{
						
						
						
				
						
							$Doc_type = "KYC";
							$dirname = "Finserv/SCF/".$unique_code;
						
					     $curlurl = "curl -X MKCOL -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
						exec($curlurl);
						$time = time();
						$fileextensionarr = explode(".",$_FILES["d_aadhar"]["name"]);
						$fileextension = $fileextensionarr[1];
						$filename = $time.".".$fileextension;
						
					    $dirname = "Finserv/SCF/".$unique_code."/";
						
						
						
						$filenamewithdir = $dirname.$filename;
						$correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["d_aadhar"]["tmp_name"]."";
						exec($correcturl);
					
					
					
								 $file_input_arr = array(
								'USER_ID' => $unique_code,
								'DOC_TYPE' =>$Doc_type,	
								'DOC_NAME' => $filename,
								'DOC_SIZE' => $_FILES['d_aadhar']['size'],
								'DOC_FILE_TYPE' => $_FILES['d_aadhar']['type'],
								'DOC_MASTER_TYPE' => 'KYC',
								'doc_cloud_name' => $filename,
								'doc_cloud_dir' => $dirname,
								'Doc_updated_by'=>$this->input->post('dis_id'),
								'Doc_updated_date'=>date('d-m-Y'),
								
							);
							$docid = $this->Customercrud_model->saveDocuments($file_input_arr);
						
						
						
				}
				if(!empty($_FILES['d_pan_doc']['name']))
				{
						
						
						
				
						
							$Doc_type = "KYC";
							$dirname = "Finserv/SCF/".$unique_code;
						
					     $curlurl = "curl -X MKCOL -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
						exec($curlurl);
						$time = time();
						$fileextensionarr = explode(".",$_FILES["d_pan_doc"]["name"]);
						$fileextension = $fileextensionarr[1];
						$filename = $time.".".$fileextension;
						
					    $dirname = "Finserv/SCF/".$unique_code."/";
						
						
						
						$filenamewithdir = $dirname.$filename;
						$correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["d_pan_doc"]["tmp_name"]."";
						exec($correcturl);
					
					
					
								 $file_input_arr = array(
								'USER_ID' => $unique_code,
								'DOC_TYPE' =>$Doc_type,	
								'DOC_NAME' => $filename,
								'DOC_SIZE' => $_FILES['d_pan_doc']['size'],
								'DOC_FILE_TYPE' => $_FILES['d_pan_doc']['type'],
								'DOC_MASTER_TYPE' => 'KYC',
								'doc_cloud_name' => $filename,
								'doc_cloud_dir' => $dirname,
								'Doc_updated_by'=>$this->input->post('dis_id'),
								'Doc_updated_date'=>date('d-m-Y'),
								
							);
							$docid = $this->Customercrud_model->saveDocuments($file_input_arr);
						
						
						
				}
		
	}
	public function find_propriter_details()
	{
		$dis_id= $this->input->post('dis_id');
		$propriters = $this->Customercrud_model->get_propriter($dis_id);
		$propriter_all=array();
		if(!empty($propriters))
		{

			
			foreach($propriters as $propriter)
			{
				$propriter_details=$propriter;
				$propriter_documents = $this->Customercrud_model->getDocuments($propriter->d_id);
				$propriter_details_all= json_decode(json_encode($propriter_details),true);
				$propriter_details_all['doc']=$propriter_documents;
				//array_push($propriter_details_all,$propriter_documents);
				array_push($propriter_all,$propriter_details_all);
			}
			
			
		}
		echo json_encode ($propriter_all);
		//echo count($propriters);
		
	}
	/*----------------------------------------addded by papiha on 26_12_2022--------------------------------------------------*/
	public function change_profile_status()
	{
		$id=$this->input->post('User_ID');
		
		$array_input=array('Profile_Status'=>"Complete",'profile_fill_by' => $this->session->ID);
		$array_input_more = array(
			'STATUS'=>"Updated"
			
			);
		$this->Customercrud_model->update_profile_more($id, $array_input_more);
		$idS = $this->Customercrud_model->update_profile($id, $array_input);
		$response = array('msg' => "success");
		echo json_encode($response);
	}
	public function change_profile_status_revert_action()
	{
		$id=$this->input->post('User_ID');
		$data_row_more = $this->Dsacrud_model->getProfileDataMore($id);
		$array_input_more = array(
		   'STATUS'=>"Revet Action Taken"
		   
		   );
		   $array_input = array(
			'profile_fill_by' => $this->session->ID
			
			);
			$idS = $this->Customercrud_model->update_profile($id, $array_input);
		$this->Customercrud_model->update_profile_more($id, $array_input_more);
		$distributor = $this->Customercrud_model->getProfileData($id);
		$scfo_login = $this->Customercrud_model->getProfileData($data_row_more->profile_approved_by);
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
			$data['distributor']=$distributor;
			$this->email->from($from_email, 'Finaleap Finserv'); 
			//$send_to_emails=$send_to_emails;
			$send_email_to_support=$scfo_login->EMAIL;
			$this->email->to($send_email_to_support);
			$subject = strtoupper($distributor->FN).' Revert Action Taken On Profile';
			$this->email->subject($subject);
			$mailContent = $this->load->view('templates/Revert_action_taken_on_profile_to_scfo.php',$data,true);
			$this->email->message($mailContent); 
			if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}
			$response = array('msg' => "success");
		echo json_encode($response);
	}
	/*--------------------------------------------- addded by papiha on 03_01_2023------------------------------------------------------*/
	public function change_profile_status_revert_action_of_retailer()
	{
		$id=$this->input->post('User_ID');
		$data_row_more = $this->Dsacrud_model->getProfileDataMore($id);
		$array_input_more = array(
		   'STATUS'=>"Revet Action Taken"
		   
		   );
		   $array_input = array(
			'profile_fill_by' => $this->session->ID
			
			);
			$idS = $this->Customercrud_model->update_profile($id, $array_input);
		$this->Customercrud_model->update_profile_more($id, $array_input_more);
		$distributor = $this->Customercrud_model->getProfileData($id);
		$scfo_login = $this->Customercrud_model->getProfileData($data_row_more->profile_approved_by);
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
			$data['distributor']=$distributor;
			$this->email->from($from_email, 'Finaleap Finserv'); 
			//$send_to_emails=$send_to_emails;
			$send_email_to_support=$scfo_login->EMAIL;
			$this->email->to($send_email_to_support);
			$subject = strtoupper($distributor->FN).' Revert Action Taken On Profile';
			$this->email->subject($subject);
			$mailContent = $this->load->view('templates/Revert_action_taken_on_profile_to_scfo_from_retailer.php',$data,true);
			$this->email->message($mailContent); 
			if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}
			
			$response = array('msg' => "success");
		echo json_encode($response);
	}
	public function change_profile_status_revert_action_from_distributor()
	{
		$id=$this->input->post('User_ID');
		$data_row_more = $this->Dsacrud_model->getProfileDataMore($id);
		$array_input_more = array(
		   'STATUS'=>"Revet Action Taken"
		   
		   );
		   $array_input = array(
			'profile_fill_by' => $this->session->ID
			
			);
			$idS = $this->Customercrud_model->update_profile($id, $array_input);
		$this->Customercrud_model->update_profile_more($id, $array_input_more);
		$distributor = $this->Customercrud_model->getProfileData($id);
		$scfo_login = $this->Customercrud_model->getProfileData($data_row_more->profile_approved_by);
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
			$data['distributor']=$distributor;
			$this->email->from($from_email, 'Finaleap Finserv'); 
			//$send_to_emails=$send_to_emails;
			$send_email_to_support=$scfo_login->EMAIL;
			$this->email->to($send_email_to_support);
			$subject = strtoupper($distributor->FN).' Revert Action Taken On Profile';
			$this->email->subject($subject);
			$mailContent = $this->load->view('templates/Revert_action_taken_on_profile_to_distributor.php',$data,true);
			$this->email->message($mailContent); 
			if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}
			$response = array('msg' => "success");
		echo json_encode($response);
	}
	/*-------------------------- addded by papiha on 13_01_2023-----------------------------------*/
	public function get_address_by_pincode(){
		$data = file_get_contents("php://input");
		$data_obj = json_decode($data);
		
		$row = $this->Customercrud_model->get_address_by_pincode($data_obj->pincode);
		
		$response = array('status' => 1, 'data' => $row);
		echo json_encode($response);
	}
	//======================= added by priya 13-01-2023=================
		public function save_remarks_queries()
			{
				
				   $data=array(
								'customer_id'=>$this->input->post('customer_id'), //
								'dsa_id'=>$this->input->post('dsa_id'), 
								'remarks_queries'=>$this->input->post('remarks_queries'),
							  );
							
				   $login_user_info= $this->Operations_user_model->getProfileData($data['dsa_id']);		
					//echo $login_user_info->ROLE;				   
				   if( $login_user_info->ROLE == 2)
				   {
					   $role="DSA";
				   }
				   else if( $login_user_info->ROLE == 3)
				   {
					   $role="CPA";
				   }
				    else if( $login_user_info->ROLE == 5)
				   {
					   $role="ADMIN";
				   }
				    else if( $login_user_info->ROLE == 8)
				   {
					   $role="Credit Manager";
				   }
				     else if( $login_user_info->ROLE == 13)
				   {
					   $role="Branch Manager";
				   }
				    else if( $login_user_info->ROLE == 14)
				   {
					   $role="Relation Ship Officer";
				   }
				    else if( $login_user_info->ROLE == 26)
				   {
					   $role="Disbursement OPS";
				   }
				    else if( $login_user_info->ROLE == 23)
				   {
					   $role="Cluster Credit Manager";
				   }
				   $user_info= $this->Operations_user_model->getProfileData($data['customer_id']);
				 
                   $current_data=$user_info->Bureau_comments;
				  // echo "<pre>";
				  // print_r(json_decode($current_data,true));
				   //exit();
				   $array_data=json_decode($current_data,true);
				   $extra=array(
										'Query'=>$data['remarks_queries'],
										'role'=>$role,
										'added_on'=>date('d-m-Y H:i:s'),
										'added_by'=>$login_user_info->FN." ".$login_user_info->LN,
									);
				   
				   $array_data[]=$extra;
				   $final_data =json_encode($array_data);
			
					      $file_input_arr = 
				            array(
								'Bureau_comments' => $final_data,
								 );
				  				   
					$id = $this->Customercrud_model->update_bureau_comments($data['customer_id'], $file_input_arr);
				
				 				$json = array (  
								'status'=>"success",
									  );
								echo json_encode($json);
						
							
				
					
					
			}
	/*---------------------------------- added by priya 16-01-2023-------------------------------- */
	public function submit_for_review()
	{
		$applicant_id=$this->input->post('applicant_id');
		$login_user_id=$this->input->post('login_user_id');
		$Applicant_details = $this->Customercrud_model->getProfileData($applicant_id);
		$login_user_details = $this->Customercrud_model->getProfileData($login_user_id);
		
		if($login_user_details->BM_ID!= '0')
		{
			$senior_details= $this->Customercrud_model->getProfileData($login_user_details->BM_ID);
			$Bureau_review_submitted_to= $senior_details->FN." ".$senior_details->LN;
			$Bureau_review_submitted_to_ID=$senior_details->UNIQUE_CODE;
		}
		else if($login_user_details->AM_ID!='0')
		{
			$senior_details= $this->Customercrud_model->getProfileData($login_user_details->AM_ID);
			$Bureau_review_submitted_to= $senior_details->FN." ".$senior_details->LN;
			$Bureau_review_submitted_to_ID=$senior_details->UNIQUE_CODE;
		}
		else if($login_user_details->RM_ID!= '0')
		{
			$senior_details= $this->Customercrud_model->getProfileData($login_user_details->RM_ID);
			$Bureau_review_submitted_to= $senior_details->FN." ".$senior_details->LN;
			$Bureau_review_submitted_to_ID=$senior_details->UNIQUE_CODE;
		}
		else if($login_user_details->SM_ID!= '0')
		{
			$senior_details= $this->Customercrud_model->getProfileData($login_user_details->SM_ID);
			$Bureau_review_submitted_to= $senior_details->FN." ".$senior_details->LN;
			$Bureau_review_submitted_to_ID=$senior_details->UNIQUE_CODE;
		}
		else
		{
			$Bureau_review_submitted_to="Admin";
			$Bureau_review_submitted_to_ID="";
		}

		   $array = array(
			'Bureau_review' =>'Application is in review',
			'Bureau_review_submitted_by' => $login_user_details->FN." ".$login_user_details->LN,
			'Bureau_review_submitted_by_ID' =>$login_user_id,
			'Bureau_review_submitted_on' => date('d-m-Y'),
			'Bureau_review_submitted_to' =>$Bureau_review_submitted_to,
			'Bureau_review_submitted_to_ID' =>$Bureau_review_submitted_to_ID
			);
			$array_input_json=json_encode($array);
			 $array_input = array(
			'Bureau_review' =>$array_input_json,
			'Stage' =>"Bureau Review",
			'Sub_Stage' =>"Under Verification",
			);
			$idS = $this->Customercrud_model->update_bureau_comments($applicant_id, $array_input);
			
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
			$data['submitted_to']=$Bureau_review_submitted_to;
			$data['submitted_by']=$login_user_details->FN." ".$login_user_details->LN;
			$data['submitted_for']=$Applicant_details->FN." ".$Applicant_details->LN;
			$data['submitted_on']=date('d-m-Y');
			$this->email->from($from_email, 'Finaleap Finserv Test'); 
			$send_email_to_support=$senior_details->EMAIL;
			$this->email->to($send_email_to_support);
			$subject = ' Application Submitted for review';
			$this->email->subject($subject);
			$mailContent = $this->load->view('templates/Application_sent_for_review.php',$data,true);
			$this->email->message($mailContent); 
			$this->email->Send();
			
			$response = array('msg' => "success");
			echo json_encode($response);
	}
//============================== added by priya 18-01-2023=======================================
	public function DVU() // data view unit
	{
		
		if($this->session->userdata("USER_TYPE") == '')
		{
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
			
			if ($id == '') {
				$id = $this->session->userdata("ID");
			}
			/*$array_input3 = array(
									'Stage'=>"DVU",
									'Sub_Stage'=>"Physical File Verification",
				                );*/
			//$updated_id = $this->Customercrud_model->update_profile($id,$array_input3);
            
			$data_row = $this->Customercrud_model->getProfileData($id);
			$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
			$internal_loan_application_status = $this->Dsacrud_model->getinternal_loan_application_status($id);
			$data['internal_loan_application_status']=$internal_loan_application_status;
			

			
			if($data_row->customer_consent=='true')
			{
				$Cust_consent_id = $id;
				$this->session->set_userdata("Cust_consent_id",$Cust_consent_id);
				$cust_consent_status ="true";
				$this->session->set_userdata("cust_consent_status",$cust_consent_status);
				$user_type= $this->session->userdata("USER_TYPE");
				$this->session->set_userdata("user_type_from_session",$user_type);

				

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
			//$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row2'] = $data_row;
			$data['row_more'] = $data_row_more;

			
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
			    $data['score'] ="Score not checked";  
				$data['score_success'] = 1;
				
				$this->session->set_userdata("score",0);
			}
            
			$dsa_id=$this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($dsa_id);
			$data['userType'] = $this->session->userdata("USER_TYPE");
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
				 	$data['dsa_id']=$user_info->UNIQUE_CODE;
				$data['username'] =$user_name;
			$this->load->view('dashboard_header', $data);


			$co_app = $this->Customercrud_model->getMyCoapplicants($id);
		
				$data['co_app'] = $co_app;
				$isCoapp = count($co_app) > 0 ? 'true' : 'false';
				$isProfileFull = 'false';
				for ($i=0; $i < count($co_app); $i++) { 
					if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
				}
				$data['coapplicant'] = $isCoapp;

		     
			//find payment details 
			$email=$data_row->EMAIL;
			$mobile=$data_row->MOBILE;
			$name=$data_row->FN." ".$data_row->LN;
		   	$data_check_loan_payment =$this->Customercrud_model->check_loan_payment_details($email,$mobile);
			 	$offline_login_fees_payment_details =$this->Customercrud_model->check_offline_login_fees_payment_details($id);
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
						//$payment_done="payment_done";
					   // $this->session->set_userdata("payment_done",$payment_done);
					    $data['payment'] ="done";
					}
					else
					{
						//echo "above 15";
						//exit(); we are taking payment again after 15 days
					//	$payment_not_done="payment_not_done";
					  //  $this->session->set_userdata("payment_not_done",$payment_not_done);
					   $data['payment'] ="pending";
					}
					
				}
				else
				{
					//echo "payment not done";
			    	//exit();
					//$payment_not_done="payment_not_done";
					//$this->session->set_userdata("payment_not_done",$payment_not_done);
					 $data['payment'] ="pending";
				}
            
			$data['offline_login_fees_payment_details']=$offline_login_fees_payment_details;
			//echo $this->session->userdata('USER_TYPE');
			//$this->load->view('header', $data);
			$dvu_checklist = $this->credit_manager_user_model->get_dvu_checklist();
			$data['dvu_checklist']=$dvu_checklist;
			if($this->session->userdata('USER_TYPE') == 'DSA' || $this->session->userdata('USER_TYPE') == 'branch_manager' || $this->session->userdata('USER_TYPE') == 'Sales_Manager'  || $this->session->userdata('USER_TYPE') == 'Relationship_Officer'|| $this->session->userdata('USER_TYPE') == 'Cluster_Manager' || $this->session->userdata('USER_TYPE') == 'Operations_user' || $this->session->userdata('USER_TYPE') == 'credit_manager_user')
			$this->load->view('dsa/DVU', $data);
			
		}
	}
	//================================ added by priya 19-01-2023===================================
	public function submit_checklist()
	{
			$parameter=$this->input->post('parameter');
			$Checked_or_not=$this->input->post('Checked_or_not');
			$applicant_id=$this->input->post('applicant_id');
			$DSA_ID=$this->input->post('DSA_ID');
		
			$user_info= $this->Operations_user_model->getProfileData($applicant_id);
			$login_user_info= $this->Operations_user_model->getProfileData($DSA_ID);
			$current_data=$user_info->check_list_results;
			$array_data=json_decode($current_data,true);
		
			$extra=array(
							'parameter'=>$parameter,
							'Checked_or_not'=>$Checked_or_not,
							'checked_on'=>date('d-m-Y H:i:s'),
							'checked_by'=>$login_user_info->FN." ".$login_user_info->LN,
							'checked_by_id'=>$DSA_ID,
						);
			$entry="false";
			if(!empty($array_data))
			{
				for($i=0;$i<count($array_data);$i++)
					{
						if($array_data[$i]['parameter'] == $parameter)
						{
							$array_data[$i]['parameter']=$parameter;
							$array_data[$i]['Checked_or_not']=$Checked_or_not;
							$array_data[$i]['checked_on']=date('d-m-Y H:i:s');
							$array_data[$i]['checked_by']=$login_user_info->FN." ".$login_user_info->LN;
							$array_data[$i]['checked_by_id']=$DSA_ID;
							break;
						}
						else
						{
							$entry="true";
						}
											
					}
			}
		    else
			{
			   $array_data[]=$extra;
			}
			
			if($entry=="true")
			{
				 $array_data[]=$extra;
			}
	
			$final_data =json_encode($array_data);
			$file_input_arr = array(
								'check_list_results' => $final_data,
						);
			
			$id = $this->Customercrud_model->update_bureau_comments($applicant_id, $file_input_arr);
			
			$response = array('msg' => "success");
			echo json_encode($response);
	}
	
		//======================= added by priya 19-01-2023=================
		public function Raise_DVU_Query()
			{
				
				   $data=array(
								'customer_id'=>$this->input->post('customer_id'), //
								'dsa_id'=>$this->input->post('dsa_id'), 
								'Query'=>$this->input->post('Query'),
							  );
							
				   $login_user_info= $this->Operations_user_model->getProfileData($data['dsa_id']);		
						   
				   if( $login_user_info->ROLE == 2)
				   {
					   $role="DSA";
				   }
				   else if( $login_user_info->ROLE == 3)
				   {
					   $role="CPA";
				   }
				    else if( $login_user_info->ROLE == 5)
				   {
					   $role="ADMIN";
				   }
				    else if( $login_user_info->ROLE == 8)
				   {
					   $role="Credit Manager";
				   }
				     else if( $login_user_info->ROLE == 13)
				   {
					   $role="Branch Manager";
				   }
				    else if( $login_user_info->ROLE == 14)
				   {
					   $role="Relation Ship Officer";
				   }
				    else if( $login_user_info->ROLE == 26)
				   {
					   $role="Disbursement OPS";
				   }
				    else if( $login_user_info->ROLE == 23)
				   {
					   $role="Cluster Credit Manager";
				   }
				   $user_info= $this->Operations_user_model->getProfileData($data['customer_id']);
				 
                   $current_data=$user_info->DVU_Queries;
				  // echo "<pre>";
				  // print_r(json_decode($current_data,true));
				   //exit();
				   $array_data=json_decode($current_data,true);
				   $extra=array(
										'Query'=>$data['Query'],
										'role'=>$role,
										'added_on'=>date('d-m-Y H:i:s'),
										'added_by'=>$login_user_info->FN." ".$login_user_info->LN,
									);
				   
				   $array_data[]=$extra;
				   $final_data =json_encode($array_data);
			
					      $file_input_arr = 
				            array(
								'DVU_Queries' => $final_data,
								 );
				  				   
					$id = $this->Customercrud_model->update_bureau_comments($data['customer_id'], $file_input_arr);
				    $array_input3 = array(
									'Stage'=>"DVU",
									'Sub_Stage'=>"Query Raised",
				                );
							    $updated_id = $this->Customercrud_model->update_profile($data['customer_id'], $array_input3);
				 				$json = array (  
								'status'=>"success",
									  );
								echo json_encode($json);
	
					
					
			}
			//======================================= added by priya ----------------------------
			public function ResolveQuery()
			{
				
				   $data=array(
								'customer_id'=>$this->input->post('customer_id'), //
								'dsa_id'=>$this->input->post('dsa_id'), 
								'Query'=>$this->input->post('Query'),
							  );
							
				   $login_user_info= $this->Operations_user_model->getProfileData($data['dsa_id']);		
						   
				   if( $login_user_info->ROLE == 2)
				   {
					   $role="DSA";
				   }
				   else if( $login_user_info->ROLE == 3)
				   {
					   $role="CPA";
				   }
				    else if( $login_user_info->ROLE == 5)
				   {
					   $role="ADMIN";
				   }
				    else if( $login_user_info->ROLE == 8)
				   {
					   $role="Credit Manager";
				   }
				     else if( $login_user_info->ROLE == 13)
				   {
					   $role="Branch Manager";
				   }
				    else if( $login_user_info->ROLE == 14)
				   {
					   $role="Relation Ship Officer";
				   }
				    else if( $login_user_info->ROLE == 26)
				   {
					   $role="Disbursement OPS";
				   }
				    else if( $login_user_info->ROLE == 23)
				   {
					   $role="Cluster Credit Manager";
				   }
				   $user_info= $this->Operations_user_model->getProfileData($data['customer_id']);
				 
                   $current_data=$user_info->DVU_Queries;
				  // echo "<pre>";
				  // print_r(json_decode($current_data,true));
				   //exit();
				   $array_data=json_decode($current_data,true);
				   $extra=array(
										'Query'=>$data['Query'],
										'role'=>$role,
										'added_on'=>date('d-m-Y H:i:s'),
										'added_by'=>$login_user_info->FN." ".$login_user_info->LN,
									);
				   
				   $array_data[]=$extra;
				   $final_data =json_encode($array_data);
			
					      $file_input_arr = 
				            array(
								'DVU_Queries' => $final_data,
								 );
				  				   
					$id = $this->Customercrud_model->update_bureau_comments($data['customer_id'], $file_input_arr);
				    $array_input3 = array(
									'Stage'=>"DVU",
									'Sub_Stage'=>"Query Resolved",
				                );
							    $updated_id = $this->Customercrud_model->update_profile($data['customer_id'], $array_input3);
				 				$json = array (  
								'status'=>"success",
									  );
								echo json_encode($json);
	
					
					
			}
	function submit_dvu()
	{
	}
}

?>