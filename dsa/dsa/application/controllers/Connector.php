<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connector extends CI_Controller {

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
		$this->load->model('HR_model');
		$this->load->model('Admin_model');
		$this->load->model('Operations_user_model');
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
			$data['userType'] = "none";
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
			$dashboard_data = $this->Dsacrud_model->getDashboardData($id);            
			$data['dashboard_data'] = $dashboard_data;
			$this->load->view('dashboard_header', $data);
			$this->load->view('Connector/Dashboard', $data);
			}
			//$this->load->view('footer');
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
		$this->load->view('Connector/profile_new', $profileArr);
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
		$this->load->view('Connector/dsa_update_profile_one_new', $data);
	}

    public function dsa_update_profile_one_new_action(){
		
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER'){
            redirect(base_url('index.php/login'));
        }else{
			$this->load->model('Customercrud_model');	
			//$id = $this->session->userdata('ID');
			$id=$this->input->post('id');
		     
           // echo $this->input->post('income_type');
			//echo $this->input->post('dsa_profession');
			//echo $this->input->post('bank_name');
			//exit();

			$Acc_name=$_POST['Acc_name'];
			$Acc_type=$_POST['Acc_type'];
 			$Branch_name=$_POST['Branch_name'];
			$IFSC_code=$_POST['IFSC_code'];
 			$Acc_number=$_POST['Acc_number'];
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
			
			$array_input = array(
				'FN' => $this->input->post('f_name'),
				'MN' => $this->input->post('m_name'),	
				'LN' => $this->input->post('l_name'),
				'EMAIL' => $this->input->post('email'),
				'MOBILE' => $this->input->post('mobile'),
				'DOB' => base64_encode($this->input->post('dob')),
				'EDUCATION_BACKGROUND' => $this->input->post('education_type'),	
				'AADHAR_NUMBER' => base64_encode($this->input->post('aadhar')),
				'PAN_NUMBER' => base64_encode($this->input->post('pan')),
		     	'CITY' => $this->input->post('resi_city'),
				'STATE' => $this->input->post('resi_state'),
				'DISTRICT' => $this->input->post('resi_district'),	
				'dsa_address_line_1' => $this->input->post('resi_add_1'),	
				'dsa_address_line_2' => $this->input->post('resi_add_2'),	
				'dsa_address_line_3' => $this->input->post('resi_add_3'),	
				'dsa_landmark' => $this->input->post('resi_landmark'),
				'dsa_pincode' => $this->input->post('resi_pincode'),
				'dsa_property_type' => $this->input->post('resi_sel_property_type'),
				'dsa_BANK_DETAILS_JSON' => 	$bank_details_json,
				'YEARS_IN_CITY_LIVING' => $this->input->post('resi_no_of_years'),	

				'dsa_income_type' => $this->input->post('income_type'),
				'dsa_profession' => $this->input->post('dsa_profession'),
				'dsa_bank_name' => $this->input->post('bank_name'),	

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
			$data['connector_id']=$this->session->userdata('ID');
			//$this->load->view('header', $data);
			$id = $this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$dashboard_data = $this->Dsacrud_model->getDashboardData($id);            
			$data['dashboard_data'] = $dashboard_data;
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
		    $this->load->view('Connector/Create_lead', $data);
	}
	public function add_new_lead ()
	{           
	            // require_once('./PHPExcel/Classes/PHPExcel.php');
				$MANAGER_ID=0;
				$CSR_ID=0;
				$CONNECTOR_ID=0;
				$BM_ID=0;
				$RO_ID=0;
				if ($this->session->userdata('USER_TYPE') == 'DSA_MANAGER') {
					$MANAGER_ID = $this->session->userdata('ID');
				}else if ($this->session->userdata('USER_TYPE') == 'DSA_CSR') {
					$CSR_ID= $this->session->userdata('ID');
					$MANAGER_ID= $this->Dsacrud_model->getManagerId($this->session->userdata('ID'));
				}
				else if ($this->session->userdata('USER_TYPE') == 'branch_manager') 		
				{
					$BM_ID=$this->session->userdata('ID');
					
				}
				else if ($this->session->userdata('USER_TYPE') == 'Relationship_Officer') 		
				{
					$RO_ID=$this->session->userdata('ID');
					
				}
				else if ($this->session->userdata('USER_TYPE') == 'connector') 		
				{
					$CONNECTOR_ID=$this->session->userdata('ID');
					
				}
				if ($this->session->userdata('USER_TYPE') == 'DSA_MANAGER' || $this->session->userdata('USER_TYPE') == 'DSA_CSR') {
					$id=$this->session->userdata('ID');
					$DSA_ID = $this->Dsacrud_model->getDsaId($id);				
				}else if ($this->session->userdata('USER_TYPE') == 'ADMIN') {
					$DSA_ID  = 0;
				}
				else{
					
					if ($this->session->userdata('USER_TYPE') == 'connector') 		
					{
						$CONNECTOR_ID=$this->session->userdata('ID');
						$DSA_ID=0;
					}
					else
					{
					$DSA_ID=$this->session->userdata('ID');
					}
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
							   $inserdata[$i]['CONNECTOR_ID']=$CONNECTOR_ID;
							   $inserdata[$i]['BM_ID']=$BM_ID;
							   $inserdata[$i]['RO_ID']=$RO_ID;
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
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER'){
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
				redirect('connector/Create_lead');
			}
			
		    else if($id_email_exist > 0){
				$this->session->set_flashdata("result", 7);
				$this->session->set_flashdata("message",'Email id already in use' );
				//$this->View_Lead();
				redirect('connector/Create_lead');
				
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
					'DSA_ID' => 0,
					'MANAGER_ID' => 0,
					'CSR_ID' => 0,
					'CONNECTOR_ID' => $this->input->post('connector_id'),
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
         
			$old_pass_1=md5($old_pass);
			$confirm_pass_2=md5($confirm_pass);
			
			$check_existing_password= $this->Dsacrud_model->check_old_passord($old_pass_1,$dsa_id);
			if(isset($check_existing_password))
			{
				
				$result = $this->Dsacrud_model->update_dsa_password($old_pass_1,$dsa_id,$confirm_pass_2);
				
				//$this->session->set_flashdata('success', 'Password Changed Successfully');
				$this->session->set_flashdata("result", 1);
				//$this->Create_lead();
				redirect("connector/changePassword?ID=$dsa_id");
		
			}
			else
			{
				//$this->session->set_flashdata('error', 'Old password not found. Please try again');
				$this->session->set_flashdata("result", 0);
				redirect("connector/changePassword?ID=$dsa_id");
				
			}
		}
		$this->load->view('Connector/changepassword');
	}

}
?>