<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cluster_Manager extends CI_Controller 
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
		
        $this->load->helper(array('form', 'url'));
		
		if($this->session->userdata('SITE') != 'finserv'){
				
            redirect(base_url('index.php/login'));
        }

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
			$this->load->view('Cluster_Manager/dashboard', $data);
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
            $this->load->view('Cluster_Manager/branch_managers', $data);   
			
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
             $this->load->view('Cluster_Manager/Relationship_Officer', $data);   
			
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
             $this->load->view('Cluster_Manager/dsa', $data);   
			
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
         $this->load->view('Cluster_Manager/Connector', $data);   
        
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
            $this->load->view('Cluster_Manager/Create_lead', $data);   
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
				redirect('Cluster_Manager/Create_lead');
			}
			
		    else if($id_email_exist > 0){
				$this->session->set_flashdata("result", 7);
				$this->session->set_flashdata("message",'Email id already in use' );
				//$this->View_Lead();
				redirect('Cluster_Manager/Create_lead');
				
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
            $this->load->view('Cluster_Manager/veiw_lead', $data); 
			
			
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
						redirect('Cluster_Manager/View_Lead');
						}
						else
						{
							$this->session->set_flashdata("result", 4);
							$this->session->set_flashdata("message",'Error in Save Customer Details' );
							redirect('Cluster_Manager/View_Lead');
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
				  redirect('Cluster_Manager/View_Lead');
		
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
				 redirect('Cluster_Manager/View_Lead');
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
					 redirect('Cluster_Manager/View_Lead');
                     }
                     else
                     {
                         $this->session->set_flashdata("result", 4);
                         $this->session->set_flashdata("message",'Error in Save Customer Details' );
						 redirect('Cluster_Manager/View_Lead');
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
		/*$config['smtp_host']='smtp.zoho.in';
		$config['smtp_port']='465';
		$config['smtp_timeout']='30';
		$config['smtp_crypto']='ssl';
		//$config['smtp_user']='info@finaleap.com';
		//$config['smtp_pass']='skP37cnpCIq0';
		$config['smtp_user']='flconnect@finaleap.com';
            $config['smtp_pass']='iNF0SYS@589';*/

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
	
	
	
		
	//-------------------------------added by pooja 13-01-2023--------------------------//
	
	 
  public function Salestracker()
{
   // echo "hiii";
   // exit();
   $filter_by=$this->input->post('filter');
   if($filter_by=="")
   {
       $filter_by="all";
   }
    $id = $this->session->userdata('ID');
  
    $BM=$this->Admin_model->get_Branch_CL_BM($id);
	  $RO=$this->Admin_model->get_Branch_CL_RO($BM);
	
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
  

			  $Relationship=$this->Admin_model->bm_get_all_ntbvisit($id);
			
				$Start_Date = date('Y-m-01'); 
				$End_Date  = date('Y-m-t');
		
				  $BM_count = $this->Admin_model->cl_bm_current_month($Relationship,$id,$Start_Date,$End_Date);
				   $RO_count = $this->Admin_model->cl_ro_current_month($Relationship,$BM,$Start_Date,$End_Date);
				   $dashboard_data=$BM_count+ $RO_count;
		         $arr['current']=$dashboard_data;
				 
				  $Curr_Date = date('Y-m-d');
				$Today_Date  = date('Y-m-d');
				  $BM_count_today = $this->Admin_model->cl_bm_current_month($Relationship,$id,$Curr_Date,$Today_Date);
				   $RO_count_today = $this->Admin_model->cl_ro_current_month($Relationship,$BM,$Curr_Date,$Today_Date);
				   $dashboard=$BM_count_today+ $RO_count_today;
					$arr['today']=$dashboard;
				 
					$BM_count_ntb = $this->Admin_model->cl_bm_current_month_ntb( $Relationship,$id,$Start_Date,$End_Date);
				   $RO_count_ntb = $this->Admin_model->bm_current_month1( $Relationship,$BM,$Start_Date,$End_Date);
				      $dashboard_data=$BM_count_ntb+ $RO_count_ntb;
				    $arr['ntbcurrent']=$dashboard_data;
					
					$BM_count_ntb_today = $this->Admin_model->cl_bm_current_month_ntb( $Relationship,$id,$Curr_Date,$Today_Date);
					$RO_count_ntb_today = $this->Admin_model->bm_current_month1($Relationship,$BM,$Curr_Date,$Today_Date);
					  $dashboard_data=$BM_count_ntb_today+ $RO_count_ntb_today;
					$arr['ntbtoday']=$dashboard_data;
				 
				 
					$BM_count_existing = $this->Admin_model->cl_bm_current_month_existing( $Relationship,$id,$Start_Date,$End_Date);
				   $RO_count_existing = $this->Admin_model->bm_current_month3($Relationship,$BM,$Start_Date,$End_Date);
				     $dashboard_data=$BM_count_existing+ $RO_count_existing;
					   $arr['existing']=$dashboard_data;
				 
			
				 	$BM_count_existing_today = $this->Admin_model->cl_bm_current_month_existing( $Relationship,$id,$Curr_Date,$Today_Date);
					$RO_count_existing_today = $this->Admin_model->bm_current_month3($Relationship,$BM,$Curr_Date,$Today_Date);
					 $dashboard=$BM_count_existing_today+ $RO_count_existing_today;
		       		$arr['existingtoday']=$dashboard;
					
				  $dashboard_data = $this->Admin_model->bm_current_month4($id,$Start_Date,$End_Date);
				    $arr['leadcurrent']=$dashboard_data;
					
					$dashboard = $this->Admin_model->bm_current_month4($id,$Curr_Date,$Today_Date);
		         $arr['leadtoday']=$dashboard;
				 
				 
				 $lead_area =$this->Admin_model->get_branch_location();	
				$data['lead_area']=$lead_area;
				 
    $this->load->view('dashboard_header', $data);
    
    $this->load->view('admin/CL_Salestracker',$arr);
    
}
 	
 
 public function Branch_BM_ro()
{
    $filter_by=$this->input->post('filter');
   if($filter_by=="")
   {
       $filter_by="all";
   }
    /*-------------------------- For Cluster---------------------------*/
    $userType=$this->session->userdata("USER_TYPE");  
    $id = $this->session->userdata('ID');

    //$Branch_manger=$this->Admin_model->get_cluster_BM($id);
    $Relationship=$this->Admin_model->get_Branch_CL_BM($id);
	 $RO=$this->Admin_model->get_Branch_CL_RO($Relationship);
	// print_r($RO);
	 //exit;
  //  $DSA=$this->Admin_model->get_Branch_BM_BM_RO($Relationship,$id);
    //$Customers=$this->Admin_model->get_cluster_customer($Branch_manger,$Relationship,$DSA,$id);
    /*------------------------------------------------------------------------*/
    
   
    # Read value
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    $Start_Date=$_POST['Start_Date'];

	$End_Date=$_POST['End_Date'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
   
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    $searchValue = $_POST['search']['value']; // Search value
    ## Search
    $searchQuery = " ";
    ## Total number of records without filtering



      $sel1 = $this->Admin_model->get_all_BM_Branch_ALL($Relationship,$id);
	  $sel2 = $this->Admin_model->get_all_RO_Branch_ALL($RO,$Relationship);
	  $sel=$sel1+$sel2;
	  
	//print_r( $sel);
	//exit;
   // $sel=$this->Admin_model->Get_Total_No_Customer();
    $totalRecords =$sel;
    ## Total number of records with filtering
    $sel3=$this->Admin_model->get_all_BM_Branch_filter_cl_all($Relationship,$id,$searchValue);
	 $sel4=$this->Admin_model->get_all_RO_Branch_filter_cl_all($RO,$Relationship,$searchValue);
	 $sel=$sel3+$sel4;
	
	 
    $totalRecordwithFilter =$sel;
    ## Fetch records
    $sel5 =$this->Admin_model->get_all_BM_Branch_filter_with_page_all($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
	$sel6 =$this->Admin_model->get_all_RO_Branch_filter_with_page_all($RO,$Relationship,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage);	
  $sel=array_merge($sel5,$sel6);
 //  print_r($sel);
	 //exit;
   $empRecords = $sel;
    $data = array();


    foreach($empRecords as $row)
    {
				 $val1 = $this->Admin_model->meeting_type($Relationship,$id,$Start_Date,$End_Date);	
				 $val2 = $this->Admin_model->meeting_type_cl($RO,$Relationship,$Start_Date,$End_Date);
				 $New=$val1+$val2;
				// print_r($New);
				 //exit;
				 $val3 = $this->Admin_model->meeting_type1($Relationship,$id,$Start_Date,$End_Date);
				 $val4 = $this->Admin_model->meeting_type1_cl($RO,$Relationship,$Start_Date,$End_Date);
				  $Existing=$val3+$val4;
				  
				$ex1 = $this->Admin_model->customer_exit_bm($Relationship,$id,$Start_Date,$End_Date);
				$ex2 = $this->Admin_model->customer_exit_cl($RO,$Relationship,$Start_Date,$End_Date);
				$Customer_existing=$ex1 +$ex2 ;
				//print_r($ex1 );
				//exit;
				$cus1 = $this->Admin_model->customer_ntb_bm($Relationship,$id,$Start_Date,$End_Date);
				$cus2 = $this->Admin_model->customer_ntb_cl($RO,$Relationship,$Start_Date,$End_Date);	
				$Customer_ntb =$cus1+$cus2;
			$data[] = array(
			 //"ID"=>$row->ID,
			"FN"=>$row->FN.' '.$row->LN,
			"Existing"=>'<a href="'.base_url().'index.php/admin/Loannew1?id='.($row->UNIQUE_CODE).'&Start_Date='.$Start_Date.'&End_Date='.$End_Date.'">'.$Existing[$row->UNIQUE_CODE].'</a>',
			"New"=>'<a href="'.base_url().'index.php/admin/Loannew?id='.($row->UNIQUE_CODE).'&Start_Date='.$Start_Date.'&End_Date='.$End_Date.'">'.$New[$row->UNIQUE_CODE].'</a>',
			"Customer_existing"=>'<a href="'.base_url().'index.php/admin/Existing?id='.($row->UNIQUE_CODE).'&Start_Date='.$Start_Date.'&End_Date='.$End_Date.'">'.$Customer_existing[$row->UNIQUE_CODE].'</a>',
			"Customer_ntb"=>'<a href="'.base_url().'index.php/admin/NtbCustomer?id='.($row->UNIQUE_CODE).'&Start_Date='.$Start_Date.'&End_Date='.$End_Date.'">'.$Customer_ntb[$row->UNIQUE_CODE].'</a>',
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
 
 
		public function Loannew(){
		
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
					$this->load->helper('url');
				$age = $this->session->userdata('AGE');
				$data['showNav'] = 1;
				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				
				
				$ID = $this->input->get("id");
				
				//$data2=$this->Admin_model->loannew($ID);
				//$data['get_more_info'] = $data2;
				$data['ID'] = $ID;
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
				
				//print_r($data);
				//exit;
				$data['row']=$this->Customercrud_model->getProfileData($id);
				
				$dashboard_data = $this->Admin_model->getDashboardData3($id);   
			
				$this->load->view('dashboard_header', $data);
				$this->load->view('admin/Loannew',$data);
				}
			}
			
		}

 public function tod_sourings()
      {
      // $id = $this->input->get('id');
	    $id= $this->input->post('ID');
        if($id == '')
		$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');
		
	$Relationship=$this->Admin_model->get_Branch_RO_BM_RO($id);
  # Read value
  $draw = $_POST['draw'];
  $row = $_POST['start'];
   $Start_Date=$_POST['Start_Date'];

	$End_Date=$_POST['End_Date'];
  $rowperpage = $_POST['length']; // Rows display per page
  $columnIndex = $_POST['order'][0]['column']; // Column index

   //$Start_Date=date('Y-m-d');

//  $End_Date=date('Y-m-d');
  
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_dsavisit5($Relationship,$id,$userType);
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_customers_Admin_filters5($Relationship,$id,$searchValue,$Start_Date,$End_Date);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_customers_Admin_filter_paginations5($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
//print_r($sel);
//exit; 
 $empRecords = $sel;
  $data = array();
        foreach($empRecords as $row)
        {
			
          $data[] = array(
                "ID"=>$row->id,
				"Employee_name"=>$row->FN." ".$row->LN,
				 "Meeting"=>$row->last_updated_date,
                "FN"=>$row->dsa_connector_name,
				 "Meetingtype"=>$row->meeting_type,
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
	  
	  
	  
	  	public function Loannew1(){
		
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
					$this->load->helper('url');
				$age = $this->session->userdata('AGE');
				$data['showNav'] = 1;
				$data['age'] = $age;
				$data['userType'] = $this->session->userdata("USER_TYPE");
				
				
				$ID = $this->input->get("id");
				
				//$data2=$this->Admin_model->loannew($ID);
				//$data['get_more_info'] = $data2;
				$data['ID'] = $ID;
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
				
				//print_r($data);
				//exit;
				$data['row']=$this->Customercrud_model->getProfileData($id);
				
				$dashboard_data = $this->Admin_model->getDashboardData3($id);   
			
				$this->load->view('dashboard_header', $data);
				$this->load->view('admin/Loannew_existing',$data);
				}
			}
			
		}

 public function existing_ro()
      {
      // $id = $this->input->get('id');
	    $id= $this->input->post('ID');
        if($id == '')
		$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');
		
	$Relationship=$this->Admin_model->get_Branch_RO_BM_RO($id);
  # Read value
  $draw = $_POST['draw'];
  $row = $_POST['start'];
   $Start_Date=$_POST['Start_Date'];

	$End_Date=$_POST['End_Date'];
  $rowperpage = $_POST['length']; // Rows display per page
  $columnIndex = $_POST['order'][0]['column']; // Column index

  
   //$Start_Date=date('Y-m-d');

//  $End_Date=date('Y-m-d');
  
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_dsavisit5($Relationship,$id,$userType);
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_customers_Admin_filters5($Relationship,$id,$searchValue,$Start_Date,$End_Date);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_customers_Admin_filter_paginations6($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
//print_r($sel);
//exit; 
 $empRecords = $sel;
  $data = array();
        foreach($empRecords as $row)
        {
			
          $data[] = array(
                "ID"=>$row->id,
				"Employee_name"=>$row->FN." ".$row->LN,
				 "Meeting"=>$row->last_updated_date,
                "FN"=>$row->dsa_connector_name,
				 "Meetingtype"=>$row->meeting_type,
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

public function Existing(){
		
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
				
				
				$ID = $this->input->get("id");
				
				//$data2=$this->Admin_model->loannew($ID);
				//$data['get_more_info'] = $data2;
				$data['ID'] = $ID;
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
				
				//print_r($data);
				//exit;
				$data['row']=$this->Customercrud_model->getProfileData($id);
				
				$dashboard_data = $this->Admin_model->getDashboardData3($id);   
			
				$this->load->view('dashboard_header', $data);
				$this->load->view('admin/ExistingCustomer',$data);
				}
			}
			
		}

 public function exist_customer()
      {
      // $id = $this->input->get('id');
	    $id= $this->input->post('ID');
        if($id == '')
		$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');
		
	$Relationship=$this->Admin_model->get_Branch_RO_BM_RO($id);
  # Read value
  $draw = $_POST['draw'];
  $row = $_POST['start'];
   $Start_Date=$_POST['Start_Date'];

	$End_Date=$_POST['End_Date'];
  $rowperpage = $_POST['length']; // Rows display per page
  $columnIndex = $_POST['order'][0]['column']; // Column index

  
   //$Start_Date=date('Y-m-d');

//  $End_Date=date('Y-m-d');
  
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_existing($id,$userType);
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_customers_existing($id,$searchValue,$Start_Date,$End_Date);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_customers_Admin_existing_pagination($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
//print_r($sel);
//exit; 
 $empRecords = $sel;
  $data = array();
       foreach($empRecords as $row)
        {
			
          $data[] = array(
                "ID"=>$row->id,
				"Employee_name"=>$row->FN." ".$row->LN,
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
	  
	  
	  	public function NtbCustomer(){
		
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
				
				
				$ID = $this->input->get("id");
				
				//$data2=$this->Admin_model->loannew($ID);
				//$data['get_more_info'] = $data2;
				$data['ID'] = $ID;
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
				
				//print_r($data);
				//exit;
				$data['row']=$this->Customercrud_model->getProfileData($id);
				
				$dashboard_data = $this->Admin_model->getDashboardData3($id);   
			
				$this->load->view('dashboard_header', $data);
				$this->load->view('admin/NtbCustomer',$data);
				}
			}
			
		}

 public function ntb_customer()
      {
      // $id = $this->input->get('id');
	    $id= $this->input->post('ID');
        if($id == '')
		$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');
		
	$Relationship=$this->Admin_model->get_Branch_RO_BM_RO($id);
  # Read value
  $draw = $_POST['draw'];
  $row = $_POST['start'];
   $Start_Date=$_POST['Start_Date'];

	$End_Date=$_POST['End_Date'];
  $rowperpage = $_POST['length']; // Rows display per page
  $columnIndex = $_POST['order'][0]['column']; // Column index

  
   //$Start_Date=date('Y-m-d');

//  $End_Date=date('Y-m-d');
  
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_ntb_customer($id,$userType);
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_ntb_customers($id,$searchValue,$Start_Date,$End_Date);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_ntb_customers_pagination($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
//print_r($sel);
//exit; 
 $empRecords = $sel;
  $data = array();
       foreach($empRecords as $row)
        {
			
           $data[] = array(
                "ID"=>$row->id,
					"Employee_name"=>$row->FN." ".$row->LN,
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
	  
	  //--------------------------------------added by pooja---------------------------------------//
	  
 public function CL_RO_souring(){
	         $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
	    $BM=$this->Admin_model->get_Branch_CL_BM($id);
	  $RO=$this->Admin_model->get_Branch_CL_RO($BM);
	 $Relationship=$this->Admin_model->bm_get_all_dsavisit($id);
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
        
       
        $this->load->helper('url');
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
				  $BM_count = $this->Admin_model->cl_bm_current_month($Relationship,$id,$Start_Date,$End_Date);
				   $RO_count = $this->Admin_model->cl_ro_current_month($Relationship,$BM,$Start_Date,$End_Date);
				   $customers=$BM_count+ $RO_count;
				// $customers = $this->Admin_model->bm_current_month($Relationship,$id,$Start_Date,$End_Date);
		         $arr['customers']=$customers;
		
        $data['username'] =$user_name;
        $arr['userType'] = $userType;
      
	  
        $this->load->view('dashboard_header', $data);
		 $this->load->view('admin/CL_RO_souring',$arr);
       
      
}

	

public function CL_RO_sourings()
      {
		$userType=$this->session->userdata("USER_TYPE");  
		$id = $this->session->userdata('ID');
     //$Branch_manger=$this->Admin_model->get_cluster_BM($id);
	    $BM=$this->Admin_model->get_Branch_CL_BM($id);
		$RO=$this->Admin_model->get_Branch_CL_RO($BM);
		$Relationship=$this->Admin_model->bm_get_all_dsavisit($id);
	 //print_r( $Relationship);
 // exit;
    // $DSA=$this->Admin_model->get_Branch_BM_BM($Relationship,$id);
   //  $sales_id=$this->Admin_model->get_Sales_BM($id);
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
	   $sel1 = $this->Admin_model->get_all_cl_bm($Relationship,$id);
		$sel2 = $this->Admin_model->get_all_cl_ro($Relationship,$BM);
		$sel=$sel1+$sel2;
	//print_r($sel);
	//exit;
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel3=$this->Admin_model->get_all_cl_bm_filter1($Relationship,$id,$searchValue,$Start_Date,$End_Date);
	    $sel4=$this->Admin_model->get_all_cl_ro_filter1($Relationship,$BM,$searchValue,$Start_Date,$End_Date);
		$sel=$sel3+$sel4;
	// print_r( $sel);
	// exit;
     $totalRecordwithFilter =$sel;
     ## Fetch records
	   $sel5=$this->Admin_model->get_all_cl_bm_filter_with_page1($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date); 
	   $sel6=$this->Admin_model->get_all_cl_ro_filter_with_page1($Relationship,$BM,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);

	   $sel=array_merge($sel5,$sel6);

	 $empRecords=$sel;
	
     $data = array();

        foreach($empRecords as $row)
        {
          $data[] = array(
                "ID"=>$row->id,
					"Employee_name"=>$row->FN." ".$row->LN,
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
	 
//------------------------add by pooja 16-01-23-----------------------------------------//

	  
 public function Today_souring(){
	         $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
	    $BM=$this->Admin_model->get_Branch_CL_BM($id);
	  $RO=$this->Admin_model->get_Branch_CL_RO($BM);
	 $Relationship=$this->Admin_model->bm_get_all_dsavisit($id);
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
        
       
        $this->load->helper('url');
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
		$Start_Date = date('Y-m-d'); 
				$End_Date  = date('Y-m-d');
				  $BM_count = $this->Admin_model->cl_bm_current_month($Relationship,$id,$Start_Date,$End_Date);
				   $RO_count = $this->Admin_model->cl_ro_current_month($Relationship,$BM,$Start_Date,$End_Date);
				   $today=$BM_count+ $RO_count;
				//   print_r($customers);
				//	exit;
				   
				// $customers = $this->Admin_model->bm_current_month($Relationship,$id,$Start_Date,$End_Date);
		          $arr['today']=$today;
		
        $data['username'] =$user_name;
        $arr['userType'] = $userType;
      
	  
        $this->load->view('dashboard_header', $data);
		 $this->load->view('admin/CL_RO_Today_souring',$arr);
       
      
}

	

public function CL_RO_today_sourings()
      {
      $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
     //$Branch_manger=$this->Admin_model->get_cluster_BM($id);
	    $BM=$this->Admin_model->get_Branch_CL_BM($id);
	  $RO=$this->Admin_model->get_Branch_CL_RO($BM);
     $Relationship=$this->Admin_model->bm_get_all_dsavisit($id);
	 //print_r( $Relationship);
 // exit;
    // $DSA=$this->Admin_model->get_Branch_BM_BM($Relationship,$id);
   //  $sales_id=$this->Admin_model->get_Sales_BM($id);
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
   $sel1 = $this->Admin_model->get_all_cl_bm($Relationship,$id);
    $sel2 = $this->Admin_model->get_all_cl_ro($Relationship,$BM);
	$sel=$sel1+$sel2;
	//print_r($sel);
	//exit;
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel3=$this->Admin_model->get_all_cl_bm_filter1($Relationship,$id,$searchValue,$Start_Date,$End_Date);
	    $sel4=$this->Admin_model->get_all_cl_ro_filter1($Relationship,$BM,$searchValue,$Start_Date,$End_Date);
		$sel=$sel3+$sel4;
	// print_r( $sel);
	// exit;
     $totalRecordwithFilter =$sel;
     ## Fetch records
   $sel5=$this->Admin_model->get_all_cl_bm_filter_with_page1($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date); 
   $sel6=$this->Admin_model->get_all_cl_ro_filter_with_page1($Relationship,$BM,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
     $sel=array_merge($sel5,$sel6);
	
	 $empRecords=$sel;
	
     $data = array();

        foreach($empRecords as $row)
        {
          $data[] = array(
                "ID"=>$row->id,
					"Employee_name"=>$row->FN." ".$row->LN,
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
	 
	

public function CL_NTB_souring(){
	
        $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
	 	    $BM=$this->Admin_model->get_Branch_CL_BM($id);
	  $RO=$this->Admin_model->get_Branch_CL_RO($BM);
	 $Relationship=$this->Admin_model->bm_get_all_ntbvisit($id);
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
        
       
        $this->load->helper('url');
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
				$BM_count_ntb = $this->Admin_model->cl_bm_current_month_ntb( $Relationship,$id,$Start_Date,$End_Date);
				   $RO_count_ntb = $this->Admin_model->bm_current_month1( $Relationship,$BM,$Start_Date,$End_Date);
				      $customers=$BM_count_ntb+ $RO_count_ntb;
				 
		         $arr['customers']=$customers;
		
        $data['username'] =$user_name;
        $arr['userType'] = $userType;
      
	  
        $this->load->view('dashboard_header', $data);
		 $this->load->view('admin/CL_NTB_souring',$arr);
       
      
	
  
}

	
public function Ntb_sourings()
      {
		    $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
     //$Branch_manger=$this->Admin_model->get_cluster_BM($id);
	  $BM=$this->Admin_model->get_Branch_CL_BM($id);
	  $RO=$this->Admin_model->get_Branch_CL_RO($BM);
     $Relationship=$this->Admin_model->bm_get_all_dsavisit($id);
	 //print_r( $Relationship);
 // exit;
    // $DSA=$this->Admin_model->get_Branch_BM_BM($Relationship,$id);
   //  $sales_id=$this->Admin_model->get_Sales_BM($id);
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
   $sel1 = $this->Admin_model->get_all_cl_bm_ntb($Relationship,$id);
    $sel2= $this->Admin_model->get_all_cl_ro_ntb($Relationship,$BM);
	$sel=$sel1+$sel2;
/// print_r($sel);
//exit;
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
	  $sel3=$this->Admin_model->get_all_cl_bm_filter_ntb($Relationship,$id,$searchValue,$Start_Date,$End_Date);
     $sel4=$this->Admin_model->get_all_cl_ro_filter_ntb($Relationship,$BM,$searchValue,$Start_Date,$End_Date);	
	 $sel=$sel3+$sel4;
	 //print_r( $sel);
	// exit;
     $totalRecordwithFilter =$sel;
     ## Fetch records
     $sel5=$this->Admin_model->get_all_cl_bm_filter_with_page_ntb($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
	   $sel6=$this->Admin_model->get_all_cl_ro_filter_with_page_ntb($Relationship,$BM,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
	     $sel=array_merge($sel5,$sel6);
	  
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
					"Employee_name"=>$row->FN." ".$row->LN,
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
	  
	  
       
	  
	    public function CL_NTB_Today_souring(){
		
	  $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
	   $BM=$this->Admin_model->get_Branch_CL_BM($id);
	  $RO=$this->Admin_model->get_Branch_CL_RO($BM);
	 $Relationship=$this->Admin_model->bm_get_all_ntbvisit($id);
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
        
       
        $this->load->helper('url');
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
				 $BM_count_ntb = $this->Admin_model->cl_bm_current_month_ntb( $Relationship,$id,$Curr_Date,$Today_Date);
				   $RO_count_ntb = $this->Admin_model->bm_current_month1( $Relationship,$BM,$Curr_Date,$Today_Date);
				   $today=  $BM_count_ntb+$RO_count_ntb;
			//	 $today = $this->Admin_model->bm_current_month1($Relationship,$id,$Curr_Date,$Today_Date);
		         $arr['ntbtoday']=$today;
		
           $data['username'] =$user_name;
        $arr['userType'] = $userType;
      // $arr['customers'] = $customers;
	  
        $this->load->view('dashboard_header', $data);
		 $this->load->view('admin/CL_NTB_Today_souring',$arr);
		
		
	
}

 public function Todayntb_sourings()
      {
		   $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
     //$Branch_manger=$this->Admin_model->get_cluster_BM($id);
	  $BM=$this->Admin_model->get_Branch_CL_BM($id);
	  $RO=$this->Admin_model->get_Branch_CL_RO($BM);
     $Relationship=$this->Admin_model->bm_get_all_ntbvisit($id);
	 //print_r( $Relationship);
 // exit;
    // $DSA=$this->Admin_model->get_Branch_BM_BM($Relationship,$id);
   //  $sales_id=$this->Admin_model->get_Sales_BM($id);
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
    $sel1 = $this->Admin_model->get_all_cl_bm_ntb($Relationship,$id);
    $sel2= $this->Admin_model->get_all_cl_ro_ntb($Relationship,$BM);
	$sel=$sel1+$sel2;
/// print_r($sel);
//exit;
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
	  $sel3=$this->Admin_model->get_all_cl_bm_filter_ntb($Relationship,$id,$searchValue,$Start_Date,$End_Date);
     $sel4=$this->Admin_model->get_all_cl_ro_filter_ntb($Relationship,$BM,$searchValue,$Start_Date,$End_Date);	
	 $sel=$sel3+$sel4;
	 //print_r( $sel);
	// exit;
     $totalRecordwithFilter =$sel;
     ## Fetch records
     $sel5=$this->Admin_model->get_all_cl_bm_filter_with_page_ntb($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
	   $sel6=$this->Admin_model->get_all_cl_ro_filter_with_page_ntb($Relationship,$BM,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
	     $sel=array_merge($sel5,$sel6);
	
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
					"Employee_name"=>$row->FN." ".$row->LN,
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
 
 

public function CL_Existing_souring(){
	         $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
	 $BM=$this->Admin_model->get_Branch_CL_BM($id);
	  $RO=$this->Admin_model->get_Branch_CL_RO($BM);
	 $Relationship=$this->Admin_model->bm_get_all_existingvisit($id);
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
        
       
        $this->load->helper('url');
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
					$BM_count_existing = $this->Admin_model->cl_bm_current_month_existing( $Relationship,$id,$Start_Date,$End_Date);
				   $RO_count_existing = $this->Admin_model->bm_current_month3($Relationship,$BM,$Start_Date,$End_Date);
				     $customers=$BM_count_existing+ $RO_count_existing;
				// $customers = $this->Admin_model->bm_current_month3($Relationship,$id,$Start_Date,$End_Date);
		         $arr['customers']=$customers;
		
        $data['username'] =$user_name;
        $arr['userType'] = $userType;
      
	  
        $this->load->view('dashboard_header', $data);
		 $this->load->view('admin/CL_Existing_souring',$arr);
       
      
}

	
public function CL_Existing_sourings()
      {
      $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
	 	 $BM=$this->Admin_model->get_Branch_CL_BM($id);
	  $RO=$this->Admin_model->get_Branch_CL_RO($BM);
     //$Branch_manger=$this->Admin_model->get_cluster_BM($id);
     $Relationship=$this->Admin_model->bm_get_all_existingvisit($id);
	 //print_r( $Relationship);
 // exit;
    // $DSA=$this->Admin_model->get_Branch_BM_BM($Relationship,$id);
   //  $sales_id=$this->Admin_model->get_Sales_BM($id);
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
   $sel1 = $this->Admin_model->get_all_cl_bm_existing($Relationship,$id);
    $sel2 = $this->Admin_model->get_all_cl_ro_existing($Relationship,$BM);
	$sel=$sel1+$sel2;
/// print_r($sel);
//exit;
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel3=$this->Admin_model->get_all_cl_bm_filter_existing($Relationship,$id,$searchValue,$Start_Date,$End_Date);
	  $sel4=$this->Admin_model->get_all_cl_ro_filter_existing($Relationship,$BM,$searchValue,$Start_Date,$End_Date);
	  $sel=$sel3+$sel4;
	 //print_r( $sel);
	// exit;
     $totalRecordwithFilter =$sel;
     ## Fetch records
     $sel5=$this->Admin_model->get_all_cl_bm_filter_with_page_existing($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
	   $sel6=$this->Admin_model->get_all_cl_ro_filter_with_page_existing($Relationship,$BM,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
       $sel=array_merge($sel5,$sel6);
	 $empRecords = $sel; 
     $data = array();

        foreach($empRecords as $row)
        {
			
          $data[] = array(
                "ID"=>$row->id,
					"Employee_name"=>$row->FN." ".$row->LN,
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
	  
	 
  public function CL_Existing_Today_souring(){
		
		  $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
	 	 $BM=$this->Admin_model->get_Branch_CL_BM($id);
	  $RO=$this->Admin_model->get_Branch_CL_RO($BM);
	 $Relationship=$this->Admin_model->bm_get_all_existingvisit($id);
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
        
       
        $this->load->helper('url');
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
				 $BM_count_existing = $this->Admin_model->cl_bm_current_month_existing( $Relationship,$id,$Curr_Date,$Today_Date);
				   $RO_count_existing = $this->Admin_model->bm_current_month3($Relationship,$BM,$Curr_Date,$Today_Date);
				     $today=$BM_count_existing+ $RO_count_existing;
			//	 $today = $this->Admin_model->bm_current_month3($Relationship,$id,$Curr_Date,$Today_Date);
		         $arr['existingtoday']=$today;
		
           $data['username'] =$user_name;
        $arr['userType'] = $userType;
      // $arr['customers'] = $customers;
	  
        $this->load->view('dashboard_header', $data);
		 $this->load->view('admin/CL_Existing_Today_souring',$arr);
       
      
}

 public function Existing_today()
      {
      
      $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
     //$Branch_manger=$this->Admin_model->get_cluster_BM($id);
	 	 $BM=$this->Admin_model->get_Branch_CL_BM($id);
	  $RO=$this->Admin_model->get_Branch_CL_RO($BM);
     $Relationship=$this->Admin_model->bm_get_all_existingvisit($id);
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
  $sel1 = $this->Admin_model->get_all_cl_bm_existing($Relationship,$id);
    $sel2 = $this->Admin_model->get_all_cl_ro_existing($Relationship,$BM);
	$sel=$sel1+$sel2;
/// print_r($sel);
//exit;
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel3=$this->Admin_model->get_all_cl_bm_filter_existing($Relationship,$id,$searchValue,$Start_Date,$End_Date);
	  $sel4=$this->Admin_model->get_all_cl_ro_filter_existing($Relationship,$BM,$searchValue,$Start_Date,$End_Date);
	  $sel=$sel3+$sel4;
	 //print_r( $sel);
	// exit;
     $totalRecordwithFilter =$sel;
     ## Fetch records
     $sel5=$this->Admin_model->get_all_cl_bm_filter_with_page_existing($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
	   $sel6=$this->Admin_model->get_all_cl_ro_filter_with_page_existing($Relationship,$BM,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date);
      $sel=array_merge($sel5,$sel6);
  $empRecords = $sel;
  $data = array();
         foreach($empRecords as $row)
        {
			
          $data[] = array(
              "ID"=>$row->id,
			  	"Employee_name"=>$row->FN." ".$row->LN,
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
	 

	 public function get_branch_lead()
	 {
		 
			$data = file_get_contents("php://input");
		//	$data_obj = json_decode($data);
			$branch=$_POST['branch'];
			
			$Start_Date=$_POST['Start_Date'];
			
			$End_Date=$_POST['End_Date'];
			$id='';
			
			$row2 = $this->Admin_model->get_branch_lead_bm($branch);
			
		
			$row1 = $this->Admin_model->get_branch_lead($branch);
			$row=array_merge($row2,$row1);
			
			$response = array('status' => 1, 'data' => $row);
			//print_r($response);
		//	echo json_encode($response);
			$data=array();
			$counter=0;
			
			foreach($response['data'] as $array)
			{	
			                $data[$counter]['FN']=$array->FN;
							$data[$counter]['LN']=$array->LN;
			
			              $row_count = json_decode( json_encode($array), true);
					   
						 //$val1 = $this->Admin_model->meeting_type_branch_bm($row2,$id,$Start_Date,$End_Date,$branch);	
						 
						 $New = $this->Admin_model->meeting_type_branch_bm_($array->UNIQUE_CODE,$Start_Date,$End_Date,$branch);	
						 
						
						 $Existing = $this->Admin_model->meeting_type_branch_ro_($array->UNIQUE_CODE,$Start_Date,$End_Date,$branch);
						
				
						 
						$Customer_existing = $this->Admin_model->customer_exit_bm_cl_($array->UNIQUE_CODE,$Start_Date,$End_Date,$branch);
						
					
						$Customer_ntb = $this->Admin_model->customer_ntb_bm_cl_($array->UNIQUE_CODE,$Start_Date,$End_Date,$branch);
						

						$data[$counter]['link'] = array(
						
						"Existing"=>'<a href="'.base_url().'index.php/admin/Loannew1?id='.($row_count['UNIQUE_CODE']).'&Start_Date='.$Start_Date.'&End_Date='.$End_Date.'">'.$Existing.'</a>',
					
						"New"=>'<a href="'.base_url().'index.php/admin/Loannew?id='.($row_count['UNIQUE_CODE']).'&Start_Date='.$Start_Date.'&End_Date='.$End_Date.'">'.$New.'</a>',
						"Customer_existing"=>'<a href="'.base_url().'index.php/admin/Existing?id='.($row_count['UNIQUE_CODE']).'&Start_Date='.$Start_Date.'&End_Date='.$End_Date.'">'.$Customer_existing.'</a>',
						"Customer_ntb"=>'<a href="'.base_url().'index.php/admin/NtbCustomer?id='.($row_count['UNIQUE_CODE']).'&Start_Date='.$Start_Date.'&End_Date='.$End_Date.'">'.$Customer_ntb.'</a>',
						);   
						$counter++;
											
			}

			 echo json_encode($data);
			
	}
	
	
}
?>