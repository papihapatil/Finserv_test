<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regional_Manager extends CI_Controller 
{

    public function __construct() 
	{
        parent:: __construct();

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('email');
		$this->load->model('Regional_Model');
		$this->load->model('Operations_user_model');
		$this->load->model('Customercrud_model');
		$this->load->model('Admin_model');
		$this->load->model('Dsacrud_model');
		
        $this->load->helper(array('form', 'url'));

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
            // ==========================================================
			$dashboard_data = $this->Cluster_Model->getClusterDashboardData($id); 
            $data['row']=$this->Customercrud_model->getProfileData($id);	
            $q='all';
 			$branch_manager_arr = $this->Cluster_Model->getBranchManagers($id);
            
			$data['dashboard_data'] = $dashboard_data;
			$this->load->view('dashboard_header', $data);
			$this->load->view('Regional_Manager/dashboard', $data);
			//$this->load->view('footer');
		}
	}
	 public function branch_manager()
	{
		
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'Cluster_Manager'){
            redirect(base_url('index.php/admin'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $id = $this->session->userdata('ID');
     	    $branch_manager_arr = $this->Cluster_Model->getBranchManagers($id);
            $_SESSION["data_for_excel"] = $branch_manager_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['data'] =$branch_manager_arr;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['row']=$this->Customercrud_model->getProfileData($id);
            $this->load->view('dashboard_header', $data);
            $this->load->view('Regional_Manager/branch_managers', $data);   
			
        }        
	}
	public function Relationship_Officer()
	{
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'Cluster_Manager')
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
             $this->load->view('Regional_Manager/Relationship_Officer', $data);   
			
        }        
	}
    public function dsa()
	{
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'Cluster_Manager')
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
             $this->load->view('Regional_Manager/dsa', $data);   
			
        }        
	}
    public function Connector()
{
	 
       
     if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'Cluster_Manager')
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
         $this->load->view('Regional_Manager/Connector', $data);   
        
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
            $this->load->view('Regional_Manager/Create_lead', $data);   
	}
	public function add_new_single_lead()
	{
		
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'Cluster_Manager'){
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
				redirect('Regional_Manager/Create_lead');
			}
			
		    else if($id_email_exist > 0){
				$this->session->set_flashdata("result", 7);
				$this->session->set_flashdata("message",'Email id already in use' );
				//$this->View_Lead();
				redirect('Regional_Manager/Create_lead');
				
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
	public function add_new_lead ()
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
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'Cluster_Manager'){
            redirect(base_url('index.php/login'));
        }else{
        	$id = $this->input->get('id');
			if($id == '')$id = $this->session->userdata('ID');
			$customers = $this->Cluster_Model->getLead($id);
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
            $this->load->view('Regional_Manager/veiw_lead', $data); 
			
			
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
				
				redirect('Cluster_Manager/View_Lead');
			}
			
		    else  if($id_email_exist > 0){
				$this->session->set_flashdata("result", 2);
				$this->session->set_flashdata("message",'Email id already in use' );
				//$this->View_Lead();
				redirect('Cluster_Manager/View_Lead');
				
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
						redirect('Regional_Manager/View_Lead');
						}
						else
						{
							$this->session->set_flashdata("result", 4);
							$this->session->set_flashdata("message",'Error in Save Customer Details' );
							redirect('Regional_Manager/View_Lead');
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
				  redirect('Regional_Manager/View_Lead');
		
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
				 redirect('Regional_Manager/View_Lead');
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
				redirect('Regional_Manager/View_Lead');
            }
            
            else  if($id_email_exist > 0){
                $this->session->set_flashdata("result", 2);
                $this->session->set_flashdata("message",'Email id already in use' );
                //$this->View_Lead();
				redirect('Regional_Manager/View_Lead');
                
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
					 redirect('Regional_Manager/View_Lead');
                     }
                     else
                     {
                         $this->session->set_flashdata("result", 4);
                         $this->session->set_flashdata("message",'Error in Save Customer Details' );
						 redirect('Regional_Manager/View_Lead');
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
		$config['smtp_host']='smtp-relay.sendinblue.com'; 
		$config['smtp_port']='587';
		$config['smtp_timeout']='30';
		$config['smtp_crypto']='tls';
		//$config['smtp_user']='info@finaleap.com';
		//$config['smtp_pass']='skP37cnpCIq0';
		//$config['smtp_user']='flconnect@finaleap.com';
        //$config['smtp_pass']='iNF0SYS@589';
        //$from_email = "flconnect@finaleap.com";
		$config['smtp_user']='flconnect@finaleap.com'; 
		$config['smtp_pass']='Qns9hEpIMJVwUFgZ';
		$from_email = "flconnect@finaleap.com";
		$config['charset']='utf-8';
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'text';
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
		
         if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'Cluster_Manager')
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

	

}

?>