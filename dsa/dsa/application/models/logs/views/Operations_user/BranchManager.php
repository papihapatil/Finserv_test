<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BranchManager extends CI_Controller {

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
			//$dashboard_data = $this->Dsacrud_model->getDashboardData($id);  
			$dashboard_data = $this->Admin_model->getDashboardData4($id); 
			$data['dashboard_data'] = $dashboard_data;
			$this->load->view('dashboard_header', $data);
			$this->load->view('BranchManager/Dashboard', $data);
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
		$this->load->view('BranchManager/profile_new', $profileArr);
	}
	public function update_basic_profile()
	{
		
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
		
		
		$this->load->view('header', $data);
	
		$this->load->view('BranchManager/dsa_update_profile_one_new', $data);
	}

    public function dsa_update_profile_one_new_action(){
		
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER'){
            redirect(base_url('index.php/login'));
        }else{
			$this->load->model('Customercrud_model');	
			//$id = $this->session->userdata('ID');
			$id=$this->input->post('id');
		     
         

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
			//echo $this->input->post('BM_ID');
			//exit();
			$email=$this->input->post('email');
			$mob=$this->input->post('mobile');
			$id_mobile_exist = $this->Customercrud_model->check_mobile_new_lead($mob);
			$id_email_exist = $this->Customercrud_model->check_email_new_lead($email);

			if($id_mobile_exist > 0)
			{
				
				
				$this->session->set_flashdata("result", 6);
				$this->session->set_flashdata("message",'Mobile number already in use' );
				//$this->View_Lead();
				redirect('BranchManager/Create_lead');
			}
			
		    else if($id_email_exist > 0){
				
				$this->session->set_flashdata("result", 7);
				$this->session->set_flashdata("message",'Email id already in use' );
				//$this->View_Lead();
				redirect('BranchManager/Create_lead');
				
			}
			else
			{
				
     			
				 $array_input = array(
					'first_name' => $this->input->post('fname'),
					'last_name' => $this->input->post('lname'),	
					'address' => $this->input->post('address'),
					'email' => $this->input->post('email'),
					'mobile' => $this->input->post('mobile'),
					'DSA_ID' => 0,
					'MANAGER_ID' => 0,
					'CSR_ID' => 0,
					'CONNECTOR_ID' =>0,
					'created_at' =>date("Y/m/d"),
                    'Refer_By_Category'=>$this->input->post('Refer_By_Category'),
					'Refer_By_Name'=>$this->input->post('Refered_By_Name'),
					'Refer_By'=>$this->input->post('Refer_By'),	
                    'Location'=>$this->input->post('Location'),
                 				
				);
				if($this->input->post('Refer_By_Category')=='Agency')
				{
					$array_input['Refer_By_Name']=$this->input->post('Refered_By_Name_1');
				}
				else
				{
					$array_input['Refer_By_Name']=$this->input->post('Refered_By_Name');
				}
				
                if($this->session->userdata('USER_TYPE') == 'Relationship_Officer')
					{
						
						$array_input['RO_ID'] = $this->session->userdata('ID');
						
					}		
					else if($this->session->userdata('USER_TYPE') == 'branch_manager')
					{
						$array_input['BM_ID'] = $this->session->userdata('ID');
						
					}	
					else if($this->session->userdata('USER_TYPE') == 'connector')
					{
						$array_input['CONNECTOR_ID'] = $this->session->userdata('ID');
						
					}	
					else if($this->session->userdata('USER_TYPE') == 'DSA')
					{
						$array_input['DSA_ID'] = $this->session->userdata('ID');
						
					}	
				 $insert_query=$this->Customercrud_model->insert_new_lead($array_input);
				
				 if(isset($insert_query))
				 {
					
					$this->session->set_flashdata("result", 1);
					$this->Create_lead();
					$this->Asign_Lead_Round_Robin($insert_query);
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
				redirect("BranchManager/changePassword?ID=$dsa_id");
		
			}
			else
			{
				//$this->session->set_flashdata('error', 'Old password not found. Please try again');
				$this->session->set_flashdata("result", 0);
				redirect("BranchManager/changePassword?ID=$dsa_id");
				
			}
		}
		$this->load->view('BranchManager/changepassword');
	}


	public function customers(){
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER'){
            redirect(base_url('index.php/login'));
        }else{
        	$id = $this->input->get('id');
			if($id == '')$id = $this->session->userdata('ID');
			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$userType2 = $this->input->get('userType2');
			$search_name="";
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");

			$filter = $this->input->get('s');
			if ($filter == '') {
				$filter = 'all';
				$search_name="";
			}
			if($filter == 'Complete_profile')
			{
				$filter ='Complete_profile';
				$search_name="";

			}
			if($filter == 'Incomplete_profile')
			{
				$filter ='Incomplete_profile';
				$search_name="";

			}
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			$customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date,$search_name);
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
			$this->load->view('BranchManager/customers_new', $arr);
		}
	}
	/*----------------------------------Added by papiha on 29_12_2021-------------------------------------------------*/
	public function Change_Contact_Status()
	{
		$BM_ID = $this->session->userdata('ID');
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
										'BM_ID' => $BM_ID,
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
                                        'BM_ID' => $BM_ID,
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
                    $this->sendsms($row->mobile,$message_to_send,$unique_code);
                     $this->sendEmail($row->mobile, $row->email, $rnd_password, $type,$unique_code);
                     $this->session->set_flashdata("result", 3);
                     $this->session->set_flashdata("message",'Customer entry created successfully and credentials has beed sent to customers email-id and mobile number' );
					 if($this->session->userdata('USER_TYPE') == 'DSA') redirect('dsa/View_Lead');
					 else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
					 else if($this->session->userdata('USER_TYPE') == 'branch_manager')redirect('BranchManager/View_Lead');
                     }
                     else
                     {
                         $this->session->set_flashdata("result", 4);
                         $this->session->set_flashdata("message",'Error in Save Customer Details' );
						 if($this->session->userdata('USER_TYPE') == 'DSA') redirect('dsa/View_Lead');
						 else if($this->session->userdata('USER_TYPE') == 'ADMIN')redirect('admin/View_Lead');
						else if($this->session->userdata('USER_TYPE') == 'branch_manager')redirect('BranchManager/View_Lead');
                     }
                }
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
	public function sendEmail($mobile, $email, $password, $type, $unique_code){
		
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
		$config['mailtype'] = 'text';
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$code = $this->generate_uuid();
		$from_email = "info@finaleap.com";
		$this->email->from($from_email, 'Finaleap'); 
		$this->email->to($email);
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
		   
			$this->email->message('Thank you for your interest in Finaleap, Please Click On Link And Fill your details. '.base_url().'index.php/customer/customer_consent?ID='.base64_encode($unique_code)); 
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
		
			
				
		//Send mail 
		if($this->email->send()) {	
			
		}else{
			
		}
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


	public function Loan_sanction_form()
	{
		$data['unique_code']=$this->input->get('ID');
		$data['Loan_disburst_data']=$this->Customercrud_model->getLoan_disburst_data($data['unique_code']);
		$id = $this->session->userdata('ID');
		$data['Bank_names'] = $this->Admin_model->getcooperator_Banks();
		$data['row']=$this->Customercrud_model->getProfileData($id);
		$this->load->view('dashboard_header', $data);
		$this->load->view('BranchManager/Loan_saction_form',$data);
	}
	public function Save_Loan_Disbursed_deatils()
	{
		$EMI_Start_Date=date("d-m-Y", strtotime($this->input->post('EMI_Start_Date')));  
		
		$array_input = array(
				'Loan_Amount_Saction' => $this->input->post('Loan_Amount_Saction'),
				'Loan_Type' => $this->input->post('Loan_Type'),
				'Tenure' => $this->input->post('Tenure'),
				'Rate_Of_Intrest' => $this->input->post('Rate_Of_Intrest'),
				'Processing_Fees' =>$this->input->post('Processing_Fees'),
				'Name_Of_Bank' =>$this->input->post('Bank_name'), 
				'EMI' => $this->input->post('EMI'),
				'EMI_Start_Date' =>$this->input->post('EMI_Start_Date'),
				'Insurance_Amount' =>$this->input->post('Insurance_Amount'),
				'Disbursement_date'=>$this->input->post('Disbursement_date'),
                'Cust_Id'=>$this->input->post('Cust_Id')
				);
				
		$check_data=$this->Customercrud_model->getLoan_disburst_data($array_input['Cust_Id']);
		if(!empty($check_data))
		{
			$data=$this->Customercrud_model->update_Loan_disburt($array_input['Cust_Id'],$array_input);
		}
		else
		{
		   $data=$this->Customercrud_model->insert_Loan_disburt($array_input);
		}
		if($data>0)
		{
			$this->session->set_flashdata('success','success');
			redirect('/BranchManager/Loan_sanction_form?ID='.$array_input["Cust_Id"]);
			
			
			
		}
		else
		{
			redirect('/BranchManager/Loan_sanction_form?ID='.$array_input["Cust_Id"]);
			$this->session->set_flashdata('error','error');
		}
	}
public function Amortization_Schedule()
{
	
	include "class.amort.php";
    $ID=$_GET['ID'];
    $row=$this->Customercrud_model->getLoan_disburst_data($ID);
	
	if(!empty($row) || $row!='' )
	{
	$amount= $row->Loan_Amount_Saction;
	$rate=$row->Rate_Of_Intrest;
	$years=$row->Tenure;
	$monthly_emi_date=$row->EMI_Start_Date;
	}
	else{
		$amount= 0;
	$rate=0;
	$years=0;
	$monthly_emi_date='';
	
	}
	$am=new amort($amount,$rate,$years,$monthly_emi_date);   //make an instance of amort and set the numbers
	$am->showForm();                       //show the form to get the numbers
	if($amount*$rate*$years <>0){          //if any one is zero, don't show the table
	$am->showTable(true);                  //if true, show table, else don't
	}
	}
 

 /*---------------------------------------- Added by papiha on 01_03_2022--------------------------------------------*/
 public function Asign_Lead_Round_Robin($lead_id)
 {
	
	 $Lead_Info=$this->Admin_model->get_lead_details($lead_id);
	 //$array = json_decode($Lead_Info, true);
	 //echo "<pre>";
	 //print_r($Lead_Info[0] );
	 //echo "</pre>";
	 $array_lead_info=$Lead_Info[0];
	 
	 $city=$array_lead_info->Location;
	 
	 //$city=$Lead_Info['Location'];
	 $RO=$this->Customercrud_model->get_RO_By_Location($city);
	
	 $Sum_Lead_Status=$this->Admin_model->get_sum_lead_staus($city);
	 $RO_Count=count($RO);
	 if($Sum_Lead_Status==$RO_Count)
	 {
		 foreach($RO as $R)
		 {
			$data = ['Lead_Status' =>0];
			$update_All_Lead_Satus=$this->Admin_model->update_lead_status($data,$R->UNIQUE_CODE);

		 }
		 $RO=$this->Customercrud_model->get_RO_By_Location($city);
		 foreach($RO as $R)
			  {
				  if($R->Lead_Status==0)
				  {
					   $name=$R->FN.' '.$R->LN;
					   //$data = ['Lead_Assign_To' =>$R->UNIQUE_CODE];
					   $data=['Lead_Assign_To_Name'=>$name,'Lead_Assign_To' =>$R->UNIQUE_CODE];
					   $result = $this->Admin_model->Assign_Lead($lead_id,$data);
					   $data = ['Lead_Status' =>1];
					   $result1 = $this->Admin_model->update_lead_status($data,$R->UNIQUE_CODE);
					   $Assign_Leads=[];
					   
					   $result_Lead = $this->Admin_model->get_lead_details($lead_id);
					   
					  
					   $Email=$R->EMAIL;
					 
					   $user_id=$R->UNIQUE_CODE;
						
					   $this->sendEmail_lead($Email,$result_Lead,$name,$user_id);
					   break;
				  }
			  }
		 
		
	 }
	 else
	 {
		 foreach($RO as $R)
			  {
				  if($R->Lead_Status==0)
				  {
					   $name=$R->FN.' '.$R->LN;
					   //$data = ['Lead_Assign_To' =>$R->UNIQUE_CODE];
					   $data=['Lead_Assign_To_Name'=>$name,'Lead_Assign_To' =>$R->UNIQUE_CODE];
					   $result = $this->Admin_model->Assign_Lead($lead_id,$data);
					   $data = ['Lead_Status' =>1];
					   $result1 = $this->Admin_model->update_lead_status($data,$R->UNIQUE_CODE);
					   $Assign_Leads=[];
					   
					   $result_Lead = $this->Admin_model->get_lead_details($lead_id);
					   
					  
					   $Email=$R->EMAIL;
					   
					   $user_id=$R->UNIQUE_CODE;
						
					   $this->sendEmail_lead($Email,$result_Lead,$name,$user_id);
					   break;
				  }
			  }
	 }
	 
 }
 public function sendEmail_lead($email,$data,$name,$user_id)
  {
		 
	  
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

		  
			  $send_email_to_support=$email;
			  //$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
		  
			  //$send_email_to_support='info@finaleap.com';
			  $this->email->to($send_email_to_support);
			  $this->email->subject('Assigned Leads'); 
	  
		  
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
			 <h5>Dear '.$name.' </h5><br>
			 </h6>New Leads Are Assigned To You</h6>
			 
			 <div class="container">
			  <table class="table table-bordered">
			 <thead>
			   <tr>
				 <th>Sr.No</th>
				 <th>Lead Name</th>
				 <th>Mobile No</th>
				 <th>Email</th>
				 <th>City</th>
			   </tr>
			 </thead>
			 <tbody>';
		 foreach ($data as $info)
		 {
			 $msg.= '<tr>
				 <td>'.$z.'</td>
				 <td>'.$info->first_name.' '.$info->last_name.'</td>
				 <td>'.$info->mobile.'</td>
				 <td>'.$info->email.'</td>
				 <td>'.$info->Location.'</td>
				 </tr>';
			   
			 
			 $z++;
			$notification_data=['user_id'=>$user_id,'notification'=>'New Lead Assign To you :'.$info->first_name.' '.$info->last_name,'status'=>'unseen'];
			$notification=$this->Admin_model->insert_notification($notification_data);	
		 }
		 
			 
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
			  
			  $this->email->send();
			  
		  
  }
  function Lead_assign_To_Function()
 {
	 $Assign_To=$this->input->post('Relatyionship_Off');
	 $user_info= $this->Operations_user_model->getProfileData($Assign_To);
	 $Email=$user_info->EMAIL;
	 $name=$user_info->FN.' '.$user_info->LN;
	 $Lead_id=$this->input->post('id');
	 $result_Lead = $this->Admin_model->get_lead_details($Lead_id);
	 
	 $data = ['Lead_Assign_To' => $Assign_To ];
	 $data=['Lead_Assign_To_Name'=>$name];
	 $Lead_Assign_TO_Id=$Lead_id;
	 $result = $this->Admin_model->Assign_Lead($Lead_Assign_TO_Id,$data);
	 $arr = ['Lead_Status' =>1];
	 $result1 = $this->Admin_model->update_lead_status($arr,$Assign_To);
	 if($result > 0)
	 {
		 $this->session->set_userdata("result", 1);
		 $this->session->set_userdata("message",'Lead Assign Sucessfully');
		 $this->sendEmail_lead($Email,$result_Lead,$name,$Assign_To);
		 redirect('dsa/Assign_Lead');
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
		 $Cities = $this->Admin_model->get_Master_Cities();
		 //echo '<pre>';
		 //print_r($Cities);
		 //exit;
		 $data['userType'] = $this->session->userdata("USER_TYPE");
		 $data['BM_ID']=$this->session->userdata('ID');
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
			 $data['Cities']=$Cities;
		 $data['row']=$this->Customercrud_model->getProfileData($id);
		 $dashboard_data = $this->Dsacrud_model->getDashboardData($id);            
		 $data['dashboard_data'] = $dashboard_data;
		 $this->load->view('dashboard_header', $data);
		 $this->load->view('BranchManager/Create_lead', $data);
 }



}