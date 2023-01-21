<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegionalManager extends CI_Controller 
{

    public function __construct() 
	{
        parent:: __construct();

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('email');
		$this->load->model('Cluster_Model');
		$this->load->model('Operations_user_model');
		$this->load->model('Customercrud_model');
		$this->load->model('Admin_model');
		$this->load->model('Dsacrud_model');
		
		
		$this->load->model('RegionalManager_model');
        $this->load->helper(array('form', 'url'));
		
		if($this->session->userdata('SITE') != 'finserv'){
				
            redirect(base_url('index.php/login'));
        }

    }
	public function index()
	{
		if($this->session->userdata("USER_TYPE") == '' || $this->session->userdata('SITE') != 'finserv'){
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
            // ==========================================================
			$dashboard_data = $this->Cluster_Model->getClusterDashboardData($id); 
            $data['row']=$this->Customercrud_model->getProfileData($id);	
            $q='all';
 			$branch_manager_arr = $this->RegionalManager_model->getBranchManagers($id);
			
			//print_r($dashboard_data);
            
			$data['dashboard_data'] = $dashboard_data;
			$this->load->view('dashboard_header', $data);
			$this->load->view('Cluster_Manager/dashboard', $data);
			//$this->load->view('footer');
		}
	}
	 public function branch_manager()
	{
		
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'RegionalManager'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $id = $this->session->userdata('ID');
     	    $branch_manager_arr = $this->RegionalManager_Model->getBranchManagers($id);
            $_SESSION["data_for_excel"] = $branch_manager_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['data'] =$branch_manager_arr;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['row']=$this->Customercrud_model->getProfileData($id);
            $this->load->view('dashboard_header', $data);
            $this->load->view('RegionalManager/branch_managers', $data);   
			
        }        
	}
	
	
	public function cluster_manager()
	{
		
		//echo $this->session->userdata('USER_TYPE');
		
		//exit; 
		
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'RegionalManager'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
             $id = $this->session->userdata('ID');
     	    $branch_manager_arr = $this->RegionalManager_model->getClusterManagers($id);
			
			//echo "<pre>";
			//print_r($branch_manager_arr);
			
            $_SESSION["data_for_excel"] = $branch_manager_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['data'] =$branch_manager_arr;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['row']=$this->Customercrud_model->getProfileData($id);
            $this->load->view('dashboard_header', $data);
            $this->load->view('RegionalManager/cluster_managers', $data);   
			
        }        
	}
	
	
	public function Relationship_Officer()
	{
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'RegionalManager'  || $this->session->userdata('SITE') != 'finserv')
		 {
            redirect(base_url('index.php/login'));
        }else{
             $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s=$this->input->get('s');	
			if($s=='')
			{
				$s='all';
			}
			 
                    
           

			$id = $this->session->userdata('ID');
			$data['row1']=$this->Customercrud_model->getProfileData($id);
		    $Relation_Officer_arr = $this->Cluster_Model->getRelationOfficer($s,$id);
            $_SESSION["data_for_excel"] =$Relation_Officer_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['data'] = $Relation_Officer_arr;
			$data['userType'] = $this->session->userdata("USER_TYPE");
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
             $this->load->view('RegionalManager/Relationship_Officer', $data);   
			
        }        
	}
    public function dsa()
	{
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'RegionalManager' || $this->session->userdata('SITE') != 'finserv')
		 {
            redirect(base_url('index.php/login'));
        }else{
             $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s=$this->input->get('s');	
			if($s=='')
			{
				$s='all';
			}
			$bank = $this->input->get('bnk_name');
			$city = $this->input->get('city_name');
			$id = $this->session->userdata('ID');
			$data['row1']=$this->Customercrud_model->getProfileData($id);
		    $dsa_arr = $this->Cluster_Model->getDsa($s, $bank ,$city,$id);
            $_SESSION["data_for_excel"] =$dsa_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['data'] = $dsa_arr;
			$data['userType'] = $this->session->userdata("USER_TYPE");
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
             $banks = $this->Admin_model->getBanks();
			 $cities = $this->Admin_model->getCity();
			 $data['banks'] = $banks;
			 $data['cities']=$cities ;
			 $this->load->view('dashboard_header', $data);
             $this->load->view('RegionalManager/dsa', $data);   
			
        }        
	}
    public function Connector()
{
	 
       
     if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'RegionalManager'  || $this->session->userdata('SITE') != 'finserv')
    {		
        redirect(base_url('index.php/login'));
    }
    else
    {

        $this->load->helper('url');  
        $age = $this->session->userdata('AGE');
        
        $search_name='';
        $s = $this->input->get('s');
		if($s=='')
		{
			$s="all";
		}
		 $id = $this->session->userdata('ID');
         $Connector_arr = $this->Cluster_Model->getConnector($s,$id);
       
        $_SESSION["data_for_excel"] = $Connector_arr;
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
            $data['userType'] = $this->session->userdata("USER_TYPE");
         $data['showNav'] = 1;
         $data['age'] = $age;
         $data['s'] = $s;
         $data['data'] =$Connector_arr;
		  $data['row']=$this->Customercrud_model->getProfileData($id);
         //print_r($Connector_arr);
        // exit();
        $this->load->view('dashboard_header', $data);
         $this->load->view('RegionalManager/Connector', $data);   
        
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
			$data['row']=$this->Customercrud_model->getProfileData($id);
			
            
			$this->load->view('dashboard_header', $data);
            $this->load->view('RegionalManager/Create_lead', $data);   
	}
	public function add_new_single_lead()
	{
		
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'RegionalManager'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }
		else
		{
			//echo $this->input->post('BM_ID');
			//exit();
			$id = $this->session->userdata('ID');
			$email=$this->input->post('email');
			$mob=$this->input->post('mobile');
			$id_mobile_exist = $this->Customercrud_model->check_mobile_new_lead($mob);
			$id_email_exist = $this->Customercrud_model->check_email_new_lead($email);

			if($id_mobile_exist > 0)
			{
				
				
				$this->session->set_flashdata("result", 6);
				$this->session->set_flashdata("message",'Mobile number already in use' );
				//$this->View_Lead();
				redirect('RegionalManager/Create_lead');
			}
			
		    else if($id_email_exist > 0){
				$this->session->set_flashdata("result", 7);
				$this->session->set_flashdata("message",'Email id already in use' );
				//$this->View_Lead();
				redirect('RegionalManager/Create_lead');
				
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
					'CONNECTOR_ID' =>0,
					'RO_ID'=>0,
					'BM_ID'=>0,
					'CM_ID'=>$id,
					'created_at' =>date("Y/m/d"),
                    'Refer_By_Category'=>$this->input->post('Refer_By_Category'),
					'Refer_By_Name'=>$this->input->post('Refered_By_Name'),
					'Refer_By'=>$this->input->post('Refer_By')					
				);
				if($this->input->post('Refer_By_Category')=='Agency')
				{
					$array_input['Refer_By_Name']=$this->input->post('Refered_By_Name_1');
				}
				else
				{
					$array_input['Refer_By_Name']=$this->input->post('Refered_By_Name');
				}
				
              
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
	public function getBranchManger()
        {
            $s="all";
            $bank="";
            $city='';
            $search_name="";
            $User_id=$this->input->post('User_id');
             $branch_manager_arr = $this->Cluster_Model->getBranchManger($User_id);
             if(!empty($branch_manager_arr ))
             {
                 echo json_encode($branch_manager_arr);
             }
        }

public function getRelationship_Officer()
        {
            $s="all";
            $bank="";
            $city='';
            $search_name="";
            $User_id=$this->input->post('User_id');
             $RO_arr = $this->Cluster_Model->getRelationship_Officer($User_id);
             if(!empty($RO_arr ))
             {
                 echo json_encode($RO_arr);
             }
        }
          
		public function getDsa()
        {
            $s="all";
            $bank="";
            $city='';
            $search_name="";
            $User_id=$this->input->post('User_id');
             $dsa_arr = $this->Cluster_Model->getDsa_for_lead($User_id);
             if(!empty($dsa_arr ))
             {
                 echo json_encode($dsa_arr);
             }
        }
          
		public function getConnector_for_lead()
        {
            $s="all";
            $bank="";
            $city='';
            $search_name="";
            $User_id=$this->input->post('User_id');
             $connector_arr = $this->Cluster_Model->getConnector_for_lead($User_id);
             if(!empty($connector_arr ))
             {
                 echo json_encode($connector_arr);
             }
        }
	public function add_new_lead()
	{           
	          
				
				  $CM_ID=$this->session->userdata('ID');
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
							   $inserdata[$i]['DSA_ID']=0;
							   $inserdata[$i]['MANAGER_ID']=0;
							   $inserdata[$i]['CSR_ID']=0; 
							   $inserdata[$i]['CM_ID']=$CM_ID;
							   

							   $i++;
							}
							else
							{
								$i++;
							}
						 }
						 if(!empty($inserdata))
						 {
                          $result = $this->Dsacrud_model->importdata($inserdata);
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
	public function View_Lead()
	{
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'RegionalManager' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
        	$id = $this->input->get('id');
			if($id == '')$id = $this->session->userdata('ID');
			$customers = array();
			$customers = $this->Cluster_Model->getLead($id);
			//if(count($customers)>)
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			
			
			$data['customers'] = $customers;
			
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
            $this->load->view('RegionalManager/view_lead', $data); 
			
			
		}
	}
	public function Change_Contact_Status()
	{
		$CM_ID = $this->session->userdata('ID');
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
				
				redirect('RegionalManager/View_Lead');
			}
			
		    else  if($id_email_exist > 0){
				$this->session->set_flashdata("result", 2);
				$this->session->set_flashdata("message",'Email id already in use' );
				//$this->View_Lead();
				redirect('RegionalManager/View_Lead');
				
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
										'CM_ID' => $CM_ID,
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
						redirect('RegionalManager/View_Lead');
						}
						else
						{
							$this->session->set_flashdata("result", 4);
							$this->session->set_flashdata("message",'Error in Save Customer Details' );
							redirect('RegionalManager/View_Lead');
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
				  redirect('RegionalManager/View_Lead');
		
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
				 redirect('RegionalManager/View_Lead');
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
				redirect('RegionalManager/View_Lead');
            }
            
            else  if($id_email_exist > 0){
                $this->session->set_flashdata("result", 2);
                $this->session->set_flashdata("message",'Email id already in use' );
                //$this->View_Lead();
				redirect('RegionalManager/View_Lead');
                
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
                                        'CM_ID' => $CM_ID,
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
                        $data=array('status'=>'consent');
                        $this->Dsacrud_model->update_lead($row->id,$data);
                      //$this->sendsms($row->mobile,$message_to_send,$unique_code);
                     $this->sendEmail($row->mobile, $row->email, $rnd_password, $type,$unique_code);
                     $this->session->set_flashdata("result", 3);
                     $this->session->set_flashdata("message",'Customer entry created successfully and credentials has beed sent to customers email-id and mobile number' );
					 redirect('RegionalManager/View_Lead');
                     }
                     else
                     {
                         $this->session->set_flashdata("result", 4);
                         $this->session->set_flashdata("message",'Error in Save Customer Details' );
						 redirect('RegionalManager/View_Lead');
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
	/*------------------------Added by papiha on 10_01_2022---------------------------------------------------------------------*/
	    public function get_RO_user_BM()
        {
             $User_id=$this->input->post('User_id');
             $dsa_arr = $this->Cluster_Model->get_RO_user_BM($User_id);
            
                 echo json_encode($dsa_arr);
             
            
        }
		
		 public function get_DSA_user_BM()
        {
             $User_id=$this->input->post('User_id');
             $dsa_arr = $this->Cluster_Model->get_DSA_user_BM($User_id);
            
                 echo json_encode($dsa_arr);
             
            
        }
		 public function get_DSA_user_RO()
        {
             $User_id=$this->input->post('User_id');
             $dsa_arr = $this->Cluster_Model->get_DSA_user_RO($User_id);
            
                 echo json_encode($dsa_arr);
             
            
        }
		public function get_Connector_user_BM()
        {
             $User_id=$this->input->post('User_id');
             $dsa_arr = $this->Cluster_Model->get_Connector_user_BM($User_id);
            
                 echo json_encode($dsa_arr);
             
            
        }
		public function get_Connector_user_RO()
        {
             $User_id=$this->input->post('User_id');
             $dsa_arr = $this->Cluster_Model->get_Connector_user_RO($User_id);
            
                 echo json_encode($dsa_arr);
             
            
        }
		
		public function get_Connector_user_DSA()
        {
             $User_id=$this->input->post('User_id');
             $dsa_arr = $this->Cluster_Model->get_Connector_user_DSA($User_id);
            
                 echo json_encode($dsa_arr);
             
            
        }
		public function Customer()
	{
		
         if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'RegionalManager'  || $this->session->userdata('SITE') != 'finserv')
		 {
           redirect(base_url('index.php/login'));
          }else
		    {
				$id = $this->input->get('id');
				if($id == '')$id = $this->session->userdata('ID');
				$customers = $this->Cluster_Model->getCustomers($id);
				$_SESSION["data_for_excel"] =$customers ;
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
				
				$data['customers'] = $customers;
				
				$this->load->view('dashboard_header', $data);
				$this->load->view('admin/Operational_users_customers', $data); 
		    }
    }
	/*---------------------------------------------------------------*/
	public function clustors_customer()
	{
		$id = $this->session->userdata('ID');
		$Branch_manger=$this->Admin_model->get_cluster_BM($id);
		$Relationship=$this->Admin_model->get_RO_BM($Branch_manger);
		$DSA=$this->Admin_model->get_DSA_BM($Branch_manger,$Relationship,$id);
		$Customers=$this->Admin_model->get_cluster_customer($Branch_manger,$Relationship,$DSA,$id);
	}
	
	
	public function Regional_BM()
	{
$filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
	
	$id = $this->session->userdata('ID');
		$Cluster_manger=$this->RegionalManager_model->getRegionalClusterManagers($id);
		//echo "<pre>";
		//print_r($Cluster_manger);
		
		$BranchManager = $this->RegionalManager_model->get_Cluster_BranchManager($Cluster_manger);
		//echo "<pre>";
		//print_r($clusterbmarr);
		
     $id = $this->session->userdata('ID');
     $Branch_manger=$this->RegionalManager_model->get_cluster_BM_Branch_Manager($id);
   //  $Relationship=$this->RegionalManager_model->get_RO_BM_BM($Branch_manger);
    // $DSA=$this->RegionalManager_model->get_DSA_BM_BM($Branch_manger,$Relationship,$id);
    // $BranchManager = $this->RegionalManager_model->get_all_BM_cluster($Branch_manger,$Relationship,$DSA,$id,$filter_by,$filter_by,$Cluster_manger);
     //print_r($BranchManager);
    // exit;
     $age = $this->session->userdata('AGE');
     $data['showNav'] = 1;
    
     $data['age'] = $age;
     $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s=='')
			{
				$s='all';
			}
     	 
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
   
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
     
     $arr['BranchManager'] = $BranchManager;
    
     $this->load->view('dashboard_header', $data);
     
     $this->load->view('RegionalManager/Regional_BM_PG', $arr);
     		
	}
	
	public function Regional_RO()
	{
$filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
     $id = $this->session->userdata('ID');
     $Branch_manger=$this->RegionalManager_model->get_cluster_BM_Dsa($id);
	 
	 //print_r($Branch_manger);
	      $Relationship_Officer=$this->RegionalManager_model->get_regional_BM_RO($id);

     $Relationship=$this->RegionalManager_model->get_RO_BM_Dsa($Branch_manger);
     $DSA=$this->RegionalManager_model->get_DSA_BM_Dsa($Branch_manger,$Relationship,$id);
     $RO = $this->RegionalManager_model->get_all_RO_Regional($Branch_manger,$Relationship,$DSA,$id,$filter_by);
   //  print_r($RO);
    //exit;
     $age = $this->session->userdata('AGE');
     $data['showNav'] = 1;
    
     $data['age'] = $age;
     $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s=='')
			{
				$s='all';
			}
     	 
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
   
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
     
     $arr['dsa'] = $RO;
    
     $this->load->view('dashboard_header', $data);
     
     $this->load->view('RegionalManager/Regional_RO_PG', $arr);	}
	
	public function Regional_Dsa()
	{
		$filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
     $id = $this->session->userdata('ID');
	 
	 $Cluster_manger=$this->RegionalManager_model->getRegionalClusterManagers($id);
		//echo "<pre>";
		//print_r($Cluster_manger);
		
		$Cluster_DSA = $this->RegionalManager_model->getClusterDSA($Cluster_manger);
		
		//print_r($Cluster_DSA);
		
		$clusterbmarr = $this->RegionalManager_model->get_Cluster_BranchManager($Cluster_manger);
		//echo "<pre>";
		//print_r($clusterbmarr);
		
		$BranchDSA = $this->RegionalManager_model->get_bm_DSA($clusterbmarr);
		
		//print_r($BranchDSA);
	 
     $Branch_manger=$this->RegionalManager_model->get_cluster_BM_Dsa($id);
     $Relationship=$this->RegionalManager_model->get_RO_BM_Dsa($Branch_manger);
     $DSA=$this->RegionalManager_model->get_DSA_BM_Dsa($Branch_manger,$Relationship,$id);
     $sales_id=$this->RegionalManager_model->get_Sales_BM($Branch_manger);
     $dsa = $this->RegionalManager_model->get_all_Dsa_cluster($Branch_manger,$Relationship,$DSA,$sales_id,$id,$filter_by,$Cluster_DSA,$BranchDSA);
    // print_r($dsa);
    // exit;
     $age = $this->session->userdata('AGE');
     $data['showNav'] = 1;
    
     $data['age'] = $age;
     $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s=='')
			{
				$s='all';
			}
     	 
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
   
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
     
     $arr['dsa'] = $dsa;
    
     $this->load->view('dashboard_header', $data);
     
     $this->load->view('RegionalManager/regional_Dsa_PG', $arr);
	}
	
	public function Regional_connector()
	{
		
$filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
     $id = $this->session->userdata('ID');
     $Branch_manger=$this->RegionalManager_model->get_Regional_BM_connector($id);
     $Relationship=$this->RegionalManager_model->get_RO_BM_connector($Branch_manger);
     $DSA=$this->RegionalManager_model->get_DSA_BM_connector($Branch_manger,$Relationship,$id);
     $connector = $this->RegionalManager_model->get_all_connector_regional($Branch_manger,$Relationship,$DSA,$id,$filter_by);
    // print_r($connector);
    // exit;
     $age = $this->session->userdata('AGE');
     $data['showNav'] = 1;
    
     $data['age'] = $age;
     $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s=='')
			{
				$s='all';
			}
     	 
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
   
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
     
     $arr['connector'] = $connector;
    
     $this->load->view('dashboard_header', $data);
     
     $this->load->view('RegionalManager/Regional_connector_PG', $arr);
     	}
	
	public function Regional_customers()
	{
$filter_by=$this->input->post('filter');//added by sonal on 12-05-2022
    if( $filter_by=="")
    {
        $filter_by="all";
    }
     $id = $this->session->userdata('ID');

     $Branch_manger=$this->RegionalManager_model->get_cluster_BM($id);
     $Relationship=$this->RegionalManager_model->get_RO_BM($Branch_manger);
     $DSA=$this->RegionalManager_model->get_DSA_BM($Branch_manger,$Relationship,$id);
     $sales_id=$this->RegionalManager_model->get_Sales_BM($Branch_manger);
    
     $customers = $this->RegionalManager_model->get_all_customers_cluster($Branch_manger,$Relationship,$DSA,$sales_id,$id,$filter_by);//added by sonal on 12-05-2022
     $age = $this->session->userdata('AGE');
     $data['showNav'] = 1;
      /*--------------------added by sonal on 12-5-2022-----------------*/
      $data['age'] = $age;
      $age = $this->session->userdata('AGE');
             $s = $this->input->get('s');
             if($s=='')
             {
                 $s='all';
             }
           
             $data['showNav'] = 1;
             $data['age'] = $age;
             $data['s'] = $s;
     /*------------------------------------------------------------------*/ 
    
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
     
     $arr['customers'] = $customers;
    
     $this->load->view('dashboard_header', $data);
     
     $this->load->view('RegionalManager/Regional_customer_PG',$arr);		
	}
	
	
	public function Regional_BM_PG()

 {

    $filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
    
     $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
     $Branch_manger=$this->Regional_model->get_regional_BM_Branch_Manager($id);
	 
	// print_r($Branch_manger);
	// exit;
     $Relationship=$this->Admin_model->get_RO_BM_BM($Branch_manger);
     $DSA=$this->Admin_model->get_DSA_BM_BM($Branch_manger,$Relationship,$id);
     //$Customers=$this->Admin_model->get_cluster_customer($Branch_manger,$Relationship,$DSA,$id);
   
    
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
     $sel = $this->Admin_model->get_all_BM_cluster($Branch_manger,$Relationship,$DSA,$id,$searchValue,$filter_by);
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel=$this->Admin_model->get_all_BM_cluster_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
     $totalRecordwithFilter =$sel;
     
     ## Fetch records
     $sel=$this->Admin_model->get_all_BM_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
     $empReceords = $sel;
     //print_r($empReceords);
    // exit;

     $data = array();

     foreach($empReceords as $row)
         {
            
            
            if($row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                          
               $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
              
        
        $data[] = array(
             //"ID"=>$row->ID,
            "FN"=>$row->FN.' '.$row->LN,
            "Email"=>$row->EMAIL,
            "mobile"=>$row->MOBILE,
          
            "Profile_Status"=>$incomplete1,  
           
            "Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
            "Action"=>$link." ".$link1,
          
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
	
	function getregionalpg()
	{
		echo "TeST";
		
		exit;
		
	}
	
	
	public function Get_Regional_BM_new()
	{
		//echo "TEST ,,";
		
		echo "TEst tede";
		
	}
	
	public function Get_Regional_BM()
	{
		$filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
    
     $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
	 
	 $id = $this->session->userdata('ID');
		$Cluster_manger=$this->RegionalManager_model->getRegionalClusterManagers($id);
		//echo "<pre>";
		
		//echo "TEST 123";
		//print_r($Cluster_manger);
		
		$clusterbmarr = $this->RegionalManager_model->get_Cluster_BranchManager($Cluster_manger);
		
		//print_r($clusterbmarr);
		//echo "<pre>";
		//print_r($clusterbmarr);
	 $Cluster_BM = $this->RegionalManager_model->get_Cluster_BM_Branch_Manager($id);
	 
	//print_r($Cluster_BM);
     $Branch_manger=$this->RegionalManager_model->get_Regional_BM_Branch_Manager($id);
	
     $Relationship=$this->RegionalManager_model->get_RO_BM_BM($Branch_manger);
	 
	  
     $DSA=$this->RegionalManager_model->get_DSA_BM_BM($Branch_manger,$Relationship,$id);
     //$Customers=$this->Admin_model->get_cluster_customer($Branch_manger,$Relationship,$DSA,$id);
   
    
     # Read value
	 if(isset($_POST['draw']))
	 {
     $draw = $_POST['draw'];
	 }
	 if(isset($_POST['start']))
	 {
     $row = $_POST['start'];
	 }
	 if(isset($_POST['length']))
	 {
     $rowperpage = $_POST['length']; // Rows display per page
     }
	 if(isset($_POST['order'][0]['column']))
	 {
	 $columnIndex = $_POST['order'][0]['column']; // Column index
	 }
	 if(isset($_POST['columns']))
	 {
     $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
     }
	 
	 if(isset($_POST['order']))
	 {
     $columnSortOrder = $_POST['order'][0]['dir'];
	 }
	 // asc or desc
	 if(isset($_POST['search']))
	 {
     $searchValue = $_POST['search']['value']; // Search value
	 }
     ## Search
     $searchQuery = " ";
     ## Total number of records without filtering
	 
	 $sel = "";
     $sel = $this->RegionalManager_model->get_all_BM_cluster($Branch_manger,$Relationship,$DSA,$id,$searchValue,$filter_by,$clusterbmarr);
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
	 
	 
     $sel=$this->RegionalManager_model->get_all_BM_cluster_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$clusterbmarr);
     $totalRecordwithFilter =$sel;
     
	 //echo "Test";
	 
	 
     ## Fetch records
     $sel=$this->RegionalManager_model->get_all_BM_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$clusterbmarr);
     $empReceords = $sel;
     //print_r($empReceords);
    // exit;

     $data = array();
	 /*
	 print_r($Branch_manger);
	  
	  print_r($Relationship);
	  
	  print_r($DSA);
	  
	  print_r($totalRecords);
	  
	  print_r($sel);
	  
	 exit;
	 */

     foreach($empReceords as $row)
         {
            
            
            if($row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                          
               $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
              
        
        $data[] = array(
             //"ID"=>$row->ID,
            "FN"=>$row->FN.' '.$row->LN,
            "Email"=>$row->EMAIL,
            "mobile"=>$row->MOBILE,
          
            "Profile_Status"=>$incomplete1,  
           
            "Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
            "Action"=>$link." ".$link1,
          
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
	
	
	public function Regional_RO_PG()

 {

    $filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
    
     $userType=$this->session->userdata("USER_TYPE");  
      $id = $this->session->userdata('ID');
	 
	 $ClusterManagers = $this->RegionalManager_model->getRegionalClusterManagers($id);
	 
	 //print_r($ClusterManagers);
	 
	 
	 
	 	 $BranchManagers = $this->RegionalManager_model->getRegionalBranchManagers($ClusterManagers);
		 
		// print_r($BranchManagers);
		 
		 	 	 $RelationshipOfficers = $this->RegionalManager_model->getRegionalRelationshipOfficers($ClusterManagers);

		$RelationshipOfficers = $this->RegionalManager_model->getBMRelationshipOfficers($BranchManagers);
	 
     $Branch_manger=$this->RegionalManager_model->get_cluster_BM_RO($id);
     $Relationship=$this->RegionalManager_model->get_RO_BM_RO($Branch_manger);
     $DSA=$this->RegionalManager_model->get_DSA_BM_RO($Branch_manger,$Relationship,$id);
     //$Customers=$this->Admin_model->get_cluster_customer($Branch_manger,$Relationship,$DSA,$id);
   
    
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
     $sel = $this->RegionalManager_model->get_all_RO_cluster($Branch_manger,$Relationship,$DSA,$id,$searchValue,$filter_by,$RelationshipOfficers);
    // $sel=$this->Admin_model->Get_Total_No_Customer();
	
	//echo $sel;
	
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel=$this->RegionalManager_model->get_all_RO_cluster_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$RelationshipOfficers);
     $totalRecordwithFilter =$sel;
     
     ## Fetch records
     $sel=$this->RegionalManager_model->get_all_RO_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$RelationshipOfficers);
     $empReceords = $sel;
     //print_r($empReceords);
    // exit;

     $data = array();

     foreach($empReceords as $row)
         {
            
            
            if($row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                          
               $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
              
        
        $data[] = array(
             //"ID"=>$row->ID,
            "FN"=>$row->FN.' '.$row->LN,
            "Email"=>$row->EMAIL,
            "mobile"=>$row->MOBILE,
            "Location"=>$row->Location,
            "Profile_Status"=>$incomplete1,  
           
            "Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
            "Action"=>$link." ".$link1,
          
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

     
		public function Cluster_Dsa_PG()

 {

    $filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
    
     $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
     $Branch_manger=$this->Admin_model->get_cluster_BM_Dsa($id);
     $Relationship=$this->Admin_model->get_RO_BM_Dsa($Branch_manger);
     $sales_id=$this->Admin_model->get_Sales_BM($Branch_manger);
     $DSA=$this->Admin_model->get_DSA_BM_Dsa($Branch_manger,$Relationship,$sales_id,$id);
     
     //$Customers=$this->Admin_model->get_cluster_customer($Branch_manger,$Relationship,$DSA,$id);
   
    
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
     $sel = $this->Admin_model->get_all_Dsa_cluster($Branch_manger,$Relationship,$DSA,$sales_id,$id,$searchValue,$filter_by);
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel=$this->Admin_model->get_all_Dsa_cluster_filter($Branch_manger,$Relationship,$DSA,$sales_id,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
     $totalRecordwithFilter =$sel;
     
     ## Fetch records
     $sel=$this->Admin_model->get_all_Dsa_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$sales_id,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
     $empReceords = $sel;
     //print_r($empReceords);
    // exit;

     $data = array();

     foreach($empReceords as $row)
         {
            
            $customer_created_by_data=$this->Dsacustomers_model->getCustomer_created_by();
            $customer_created_by=json_decode(json_encode($customer_created_by_data), true);
            
            foreach($customer_created_by as $row1)
            { 
                 if($row->DSA_ID!=NULL && $row->DSA_ID!='0' )
                {
                    if($row1['UNIQUE_CODE']==$row->DSA_ID)
                    {
                        $source_name= $row1['FN'].' '.$row1['LN'].' [DSA]';
                        //$this->excel->getActiveSheet()->setCellValue('G'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
                    }
                }
                else if($row->RO_ID!=NULL && $row->RO_ID!='0' )
                {
                    if($row1['UNIQUE_CODE']==$row->RO_ID)
                    {
                        $source_name= $row1['FN'].' '.$row1['LN'].' [RO]';
                        //$this->excel->getActiveSheet()->setCellValue('G'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
                    }
                }
                else if($row->BM_ID!=NULL && $row->BM_ID!='0' )
                {
                    if($row1['UNIQUE_CODE']==$row->BM_ID)
                    {
                        $source_name= $row1['FN'].' '.$row1['LN'].' [BM]';
                        //$this->excel->getActiveSheet()->setCellValue('G'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
                    }
                }
                else if($row->SELES_ID!=NULL && $row->SELES_ID!='0' )
                {
                    if($row1['UNIQUE_CODE']==$row->SELES_ID)
                    {
                        $source_name= $row1['FN'].' '.$row1['LN'].' [BM]';
                       // $this->excel->getActiveSheet()->setCellValue('G'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
                    }
                }
            }
           
           
          if($row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
        
        $data[] = array(
             
            "FN"=>$row->FN.' '.$row->LN,
            "Email"=>$row->EMAIL,
            "mobile"=>$row->MOBILE,
            "Location"=>$row->Location,
            "Profile_Status"=>$incomplete1,  
            "Refered_by"=>$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]', 
            "Source_name"=> $source_name,
            "Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
          
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
	
	
	public function Regional_Dsa_PG()
	{
		$filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
	
	     $id = $this->session->userdata('ID');

	
	$Cluster_manger=$this->RegionalManager_model->getRegionalClusterManagers($id);
		//echo "<pre>";
		//print_r($Cluster_manger);
		
		$Cluster_DSA = $this->RegionalManager_model->getClusterDSA($Cluster_manger);
		
		//print_r($Cluster_DSA);
		
		$clusterbmarr = $this->RegionalManager_model->get_Cluster_BranchManager($Cluster_manger);
		//echo "<pre>";
		//print_r($clusterbmarr);
		
		$BranchDSA = $this->RegionalManager_model->get_bm_DSA($clusterbmarr);
		
		//print_r($BranchDSA);
    
     $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
     $Branch_manger=$this->RegionalManager_model->get_cluster_BM_Dsa($id);
	// print_r($Branch_manger);
	 
	 //exit;
     $Relationship=$this->RegionalManager_model->get_RO_BM_Dsa($Branch_manger);
     $sales_id=$this->RegionalManager_model->get_Sales_BM($Branch_manger);
     $DSA=$this->RegionalManager_model->get_DSA_BM_Dsa($Branch_manger,$Relationship,$sales_id,$id);
     
     //$Customers=$this->Admin_model->get_cluster_customer($Branch_manger,$Relationship,$DSA,$id);
   

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
	 
	 //print_r($totalRecords);
    // exit;
      $sel = $this->RegionalManager_model->get_all_Dsa_cluster($Branch_manger,$Relationship,$DSA,$sales_id,$id,$searchValue,$filter_by,$order,$start,$end,$Cluster_DSA,$BranchDSA);
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
	 
	 //echo $sel;
	 
	 
     ## Total number of records with filtering
      $sel=$this->RegionalManager_model->get_all_Dsa_cluster_filter($Branch_manger,$Relationship,$DSA,$sales_id,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$order,$Cluster_DSA,$BranchDSA);
     $totalRecordwithFilter =$sel;
     
     ## Fetch records
     $sel=$this->RegionalManager_model->get_all_Dsa_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$sales_id,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Cluster_DSA,$BranchDSA);
     $empReceords = $sel;
     
//print_r($empReceords);

     $data = array();
	 
	     

     foreach($empReceords as $row)
         {
            
           // $customer_created_by_data=$this->Dsacustomers_model->getCustomer_created_by();
           // $customer_created_by=json_decode(json_encode($customer_created_by_data), true);
            
           /* foreach($customer_created_by as $row1)
            { 
                 if($row->DSA_ID!=NULL && $row->DSA_ID!='0' )
                {
                    if($row1['UNIQUE_CODE']==$row->DSA_ID)
                    {
                        $source_name= $row1['FN'].' '.$row1['LN'].' [DSA]';
                        //$this->excel->getActiveSheet()->setCellValue('G'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
                    }
                }
                else if($row->RO_ID!=NULL && $row->RO_ID!='0' )
                {
                    if($row1['UNIQUE_CODE']==$row->RO_ID)
                    {
                        $source_name= $row1['FN'].' '.$row1['LN'].' [RO]';
                        //$this->excel->getActiveSheet()->setCellValue('G'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
                    }
                }
                else if($row->BM_ID!=NULL && $row->BM_ID!='0' )
                {
                    if($row1['UNIQUE_CODE']==$row->BM_ID)
                    {
                        $source_name= $row1['FN'].' '.$row1['LN'].' [BM]';
                        //$this->excel->getActiveSheet()->setCellValue('G'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
                    }
                }
                else if($row->SELES_ID!=NULL && $row->SELES_ID!='0' )
                {
                    if($row1['UNIQUE_CODE']==$row->SELES_ID)
                    {
                        $source_name= $row1['FN'].' '.$row1['LN'].' [BM]';
                       // $this->excel->getActiveSheet()->setCellValue('G'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
                    }
                }
            } */
           
           
          if($row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
        
        $data[] = array(
             
            "FN"=>$row->FN.' '.$row->LN,
            "Email"=>$row->EMAIL,
            "mobile"=>$row->MOBILE,
            "Location"=>$row->Location,
            "Profile_Status"=>$incomplete1,  
            "Refered_by"=>$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]', 
            "Source_name"=> $source_name,
            "Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
          
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
	
	
	public function RM_connector_PG()
	{

 

    $filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
    
     $userType=$this->session->userdata("USER_TYPE");  
       $id = $this->session->userdata('ID');
	  
	  $cluster_managers = $this->RegionalManager_model->getClusterManagersCust($id);
	  
	  //print_r($cluster_managers);
	  
	  $branch_managers = $this->RegionalManager_model->getRegionalBranchManagers($cluster_managers);
	  
	  //print_r($branch_managers);
	  
	  $relationship_manager = $this->RegionalManager_model->getRegionalrelationship_manager($cluster_managers,$branch_managers);
	  
	  	  $dsa_manager = $this->RegionalManager_model->getRegionaldsa_manager($cluster_managers,$branch_managers,$relationship_manager);

	  
     $Branch_manger=$this->RegionalManager_model->get_Regional_BM_connector($id);
     $Relationship=$this->RegionalManager_model->get_RO_BM_connector($Branch_manger);
     $DSA=$this->RegionalManager_model->get_DSA_BM_connector($Branch_manger,$Relationship,$id);
     //$Customers=$this->Admin_model->get_cluster_customer($Branch_manger,$Relationship,$DSA,$id);
   
    
     # Read value
	 if(isset($_POST['draw']))
	 {
     $draw = $_POST['draw'];
	 }
	 if(isset($_POST['start']))
	 {
     $row = $_POST['start'];
	 }
	 if(isset($_POST['length']))
	 {
     $rowperpage = $_POST['length']; 
	 }// Rows display per page
	 if(isset($_POST['order']))
	 {
     $columnIndex = $_POST['order'][0]['column']; // Column index
	 }
	 if(isset($_POST['columns']))
	 {
     $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
     }
	 if(isset($_POST['order']))
	 {
     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
	 }
	 if(isset($_POST['search']))
	 {
     $searchValue = $_POST['search']['value']; // Search value
	 }
     ## Search
     $searchQuery = " ";
     ## Total number of records without filtering
    // $sel = $this->RegionalManager_model->get_all_connector_regional($Branch_manger,$Relationship,$DSA,$id,$searchValue,$filter_by);
	
	//$sel = $this->RegionalManager_model->get_all_connector_rm($cluster_managers,$branch_managers,$relationship_manager,$dsa_manager,$id,$searchValue,$filter_by);
	
	$sel = $this->RegionalManager_model->get_all_connector_rm($cluster_managers,$branch_managers,$relationship_manager,$dsa_manager,$id,$searchValue,$filter_by);
	
    // $sel=$this->Admin_model->Get_Total_No_Customer();
      $totalRecords =$sel;
	  
	  	$sel = $this->RegionalManager_model->get_all_connector_regional_filternew($cluster_managers,$branch_managers,$relationship_manager,$dsa_manager,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);

     ## Total number of records with filtering
     //$sel=$this->RegionalManager_model->get_all_connector_regional_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
     $totalRecordwithFilter =$sel;
     
     ## Fetch records
     //$sel=$this->RegionalManager_model->get_all_connector_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
     
	 	  	$sel = $this->RegionalManager_model->get_all_connector_regional_filternew_page($cluster_managers,$branch_managers,$relationship_manager,$dsa_manager,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);

	 
	 $empReceords = $sel;
     //print_r($empReceords);
    // exit;

     $data = array();

     foreach($empReceords as $row)
         {
            
            
            if($row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
               $link9='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
        
        $data[] = array(
             
            "FN"=>$row->FN.' '.$row->LN,
            "Email"=>$row->EMAIL,
            "mobile"=>$row->MOBILE,
            "Profile_Status"=>$incomplete1,  
            "Refered_by"=>$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]', 
            "Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
            "profile"=>$link9,          
    
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
	
	
	public function Regional_connector_PG()

 {

    $filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
    
     $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
	 
	 $clustermanagers = $this->RegionalManager_model->getRegionalClusterManagers($id);
	 
	 
	 
     $Branch_manger=$this->RegionalManager_model->get_Regional_BM_connector($id);
     $Relationship=$this->RegionalManager_model->get_RO_BM_connector($Branch_manger);
     $DSA=$this->RegionalManager_model->get_DSA_BM_connector($Branch_manger,$Relationship,$id);
     //$Customers=$this->Admin_model->get_cluster_customer($Branch_manger,$Relationship,$DSA,$id);
   
    
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
     $sel = $this->RegionalManager_model->get_all_connector_regional($Branch_manger,$Relationship,$DSA,$id,$searchValue,$filter_by);
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel=$this->RegionalManager_model->get_all_connector_regional_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
     $totalRecordwithFilter =$sel;
     
     ## Fetch records
     $sel=$this->RegionalManager_model->get_all_connector_regional_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
     $empReceords = $sel;
     //print_r($empReceords);
    // exit;

     $data = array();

     foreach($empReceords as $row)
         {
            
            
            if($row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
               $link9='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
        
        $data[] = array(
             
            "FN"=>$row->FN.' '.$row->LN,
            "Email"=>$row->EMAIL,
            "mobile"=>$row->MOBILE,
            "Profile_Status"=>$incomplete1,  
            "Refered_by"=>$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]', 
            "Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
            "profile"=>$link9,          
    
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
    


public function Cluster_customers_PG()
 {
    $filter_by=$this->input->post('filter');//added by sonal on 12-05-2022
     /*-------------------------- For Cluster---------------------------*/
     $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
	 $cluster_list = $this->RegionalManager_model->getClusterManagersCust($id);
	 //print_r($cluster_list);
     $Branch_manger = $this->RegionalManager_model->get_Cluster_BranchManager($cluster_list);
	 
	// print_r($BranchManager);
     $Relationship=$this->Admin_model->get_RO_BM($Branch_manger);
     $sales_id=$this->Admin_model->get_Sales_BM($Branch_manger);
     $DSA=$this->Admin_model->get_DSA_BM($Branch_manger,$Relationship,$id);
     //$Customers=$this->Admin_model->get_cluster_customer($Branch_manger,$Relationship,$DSA,$id);
     /*------------------------------------------------------------------------*/
     $Branch_manger=$this->Admin_model->get_cluster_DSA($cluster_list,$Relationship,$DSA,$id);
	 
	 //print_r($Branch_manger);
    
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
     $sel = $this->Admin_model->get_all_customers_cluster($Branch_manger,$Relationship,$DSA,$sales_id,$id,$filter_by);
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel=$this->Admin_model->get_all_customers_cluster_filter($Branch_manger,$Relationship,$DSA,$sales_id,$id,$searchValue,$filter_by);
     $totalRecordwithFilter =$sel;
     ## Fetch records
     $sel=$this->Admin_model->get_all_customers_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$sales_id,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
     $empRecords = $sel;
     $data = array();
 //print_r($sel);
     foreach($empRecords as $row){
         if($row->STATUS == 'PD Completed')
         {
             $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';
             $PD='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/credit_manager_user/pdf?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';
         }
         else if($row->STATUS == 'Aadhar E-sign complete')
         {
              $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';
              $PD='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
         }
         else
         {
              $Pre_cam='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
              $PD='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
         }

         if($row->cam_status == 'Cam details complete')
         {
             $CAM='<a style="margin-left: 8px; " href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>';
         }
         else
         {
              $CAM='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
         }

         if( $userType=='branch_manager' || $userType=='Operations_user' )
         {
             $Loan_sanction_form='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Loan_sanction_form?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
             $Amortization='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Amortization_Schedule?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
         }
         else
         {
             $Loan_sanction_form='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
             $Amortization='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
         }

         if($row->credit_sanction_status == 'REJECT')
         {
             $Application_Status='<lable style="color:red;">REJECTED</lable>';
         }
         else if($row->credit_sanction_status == 'HOLD')
         {
             $Application_Status='<lable style="color:orange;">HOLD</lable>';
         }
         else
         {
            if($row->STATUS == 'PD Completed')
            {
               $Application_Status =  $row->STATUS;
            }
            else if($row->STATUS == 'Aadhar E-sign complete')
            {
                if($row->cam_status == 'Cam details complete')
                {
                  $Application_Status='<lable style="color:GREEN;">Submitted to Credit</lable>';
                }
                else
                {
                    $Application_Status='<lable style="color:GREEN;">Submitted to CPA</lable>';
                }

            }
             else if($row->STATUS == 'Cam details complete')
            {
                $Application_Status='<lable style="color:GREEN;">Submitted to Credit</lable>';
            }

            else
            {
                 $Application_Status='<lable style="color:GREEN;">In Progress</lable>';
            }

                                                                       



      
         }
         $data[] = array(
                 "ID"=>$row->ID,
                 "FN"=>$row->FN.' '.$row->LN,
                 "Customer_status"=>$row->STATUS,
                 "Application_Status"=>$Application_Status,
                 "Loan_Type"=>$row->loan_type,
                 "Referred_by"=>$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]',
                 "Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),
                 "Last_updated_on"=>$row->last_updated_date,
                 "UNIQUE_CODE"=>'<a style="margin-left: 8px;" href="'.base_url().'index.php/dsa/Go_No_GO_?ID='.$row->UNIQUE_CODE.'"class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a><a style="margin-left: 8px; " href="'.base_url().'index.php/customer/profile_view_p_o?ID='.$row->UNIQUE_CODE.'"class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>',
                 "Bureau_reports"=>'<a style="margin-left: 8px; " href="'.base_url().'index.php/dsa/show_coapplicants?ID='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>',
                  "Pre_cam"=>$Pre_cam,
                  "CAM"=>$CAM,
                  "PD"=>$PD
                
         
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
	

}

?>