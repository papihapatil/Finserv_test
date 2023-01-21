<?php
date_default_timezone_set('asia/kolkata');
defined('BASEPATH') OR exit('No direct script access allowed');

class Legal extends CI_Controller 
    {

		public function __construct() {
			parent:: __construct();

			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('Admin_model');
			$this->load->model('Dsacrud_model');
			$this->load->model('Customercrud_model');
			$this->load->model('credit_manager_user_model');
			$this->load->model('common_model','common');
			$this->load->library('email');
			$this->load->model('Operations_user_model');
			$this->load->model('Dsacustomers_model');
			$this->load->helper(array('form', 'url'));
            $this->load->model('Legal_model');
			$this->load->library('upload');
		}

		public function index(){
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
                $id = $this->session->userdata('ID');
                $data['row']=$this->Customercrud_model->getProfileData($id);
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
                $dashboard_data = $this->Legal_model->getDashboardData($id);    
                
            
                $data['dashboard_data'] = $dashboard_data;
                $this->load->view('dashboard_header', $data);
                $this->load->view('Legal/dashboard', $data); 
                //$this->load->view('footer');
            }
		}
	public function customers()
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
				$filter = $this->input->get('s');
				if($filter=='')
				{
					$filter='all';
				}
				

				$this->load->helper('url');
				$this->load->model('Dsacustomers_model');
				$customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
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
				$data['username'] =$user_name;
				$arr['userType'] = $userType;
				$arr['customers'] = $customers;
			
				$arr['s'] = $filter;
				$this->load->view('dashboard_header', $data);
				$this->load->view('Legal/customers', $arr);
			}
		}
		/*--------------------------------------- Added by papiha on 16-03-2022------------------------------------------*/
		public function View_Details_Customer()
		{
			 $USER_TYPE = $this->session->userdata("USER_TYPE");
			 $Application_id=$this->input->get('x');
			 $id = base64_decode($Application_id);
		
			 $uid = $this->session->userdata('ID');
			 $this->load->helper('url');
			 $data['userType'] = $this->session->userdata("USER_TYPE");
			   $data_row = $this->credit_manager_user_model->getDocuments_send_to_legal_by_CPA($id,'legal');
                $age = $this->session->userdata('AGE');
                $data['showNav'] = 1;
                $data['age'] = $age;
                $data['userType'] = $this->session->userdata("USER_TYPE");
                //$this->load->view('header', $data);
               $USER_TYPE = $this->session->userdata("USER_TYPE");
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
                $data['USER_TYPE']=$USER_TYPE;
                $data['cust_info']=$this->Legal_model->getProfileData($id);
				$data['Legal_docs_info']=$this->Legal_model->get_legal_docs($data['cust_info']->Application_id);
				$data['documents']=$data_row;
                $data ['Legals']=$this->Legal_model->getLegals();
                $this->load->view('dashboard_header', $data);
                $this->load->view('Legal/view_details_customer', $data);
		}
		public function Upload_Legal_doc()
		{
			 $id = $this->input->get('ID');
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
				$data['Applicant_data']=$this->Legal_model->get_legal_docs($id);
				$this->load->view('dashboard_header', $data);
                $this->load->view('Legal/Upload_Legal_doc', $data);
		
		}
		public function Do_upload_Legal_Doc()
		{
			$id = $this->input->post("id");
			$Credit_id = $this->input->post("Credit_id");
			$UNIQUE_CODE = $this->input->post("UNIQUE_CODE");
			$count = count($_FILES['userfile']['name']);
			$Results=array();
             $GLOBALS['msg'] = ""; 
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
							'upload_path' => "./images/Legal_Documents/".$id,
							'allowed_types' => "gif|jpg|png|jpeg|pdf",
							'overwrite' => TRUE
						);

					$config['file_name'] = $_FILES['file']['name'];
					$config['image_type'] = $_FILES['file']['type'];
					$config['file_size'] = $_FILES['file']['size'];
					

					$this->upload->initialize($config);
					$upload_data = $this->upload->data();
					
					if (!file_exists('./images/Legal_Documents/'.$id) ){   
						 mkdir('./images/Legal_Documents/'.$id);
							if($this->upload->do_upload('file'))
							{
								 //$this->session->set_userdata("result", 1);
				                 $GLOBALS['msg'] .= "File# ".($i+1)." (".$_FILES['userfile']['name'][$i].") uploaded successfully<br>";
								 array_push( $Results, $GLOBALS['msg']);
							}
							else
							{
								$GLOBALS['msg'] = "File# ".($i+1)." (".$_FILES['userfile']['name'][$i].") ". $this->upload->display_errors()."<br>"; 
								array_push( $Results, $GLOBALS['msg']);
							}
						}
						else
						{
							if($this->upload->do_upload('file'))
							{
								//$this->session->set_userdata("result", 1);
				                $GLOBALS['msg'] .= "File# ".($i+1)." (".$_FILES['userfile']['name'][$i].") uploaded successfully<br>";
                                array_push( $Results, $GLOBALS['msg']);								
							}
							else{
								$GLOBALS['msg'] = "File# ".($i+1)." (".$_FILES['userfile']['name'][$i].")".$this->upload->display_errors()."<br>"; 
							    array_push( $Results, $GLOBALS['msg']);
							}
						}
						
		}
			$row=$this->Customercrud_model->getProfileData($UNIQUE_CODE);
			$data_doc['Status']='Document Send By Legal';
			$data_doc['Legal_Remark']=$this->input->post("remark");
			$data_status['Legal_status']='Document Send By Legal';
			$data_status['Legal_Remark']=$this->input->post("remark");
			$result_doc1=$this->credit_manager_user_model->Update_Legal_status($UNIQUE_CODE,$data_status);
			$result_docs = $this->credit_manager_user_model->Update_Legal_Documents($id,$data_doc);
			$notification_data=['user_id'=>$Credit_id,'notification'=>'Legal Documents Recived for :'.$row->FN.' '.$row->LN,'status'=>'unseen'];
			   $notification=$this->Admin_model->insert_notification($notification_data); 
		//print_r($GLOBALS['msg']);
		$this->session->set_userdata("result", $GLOBALS['msg']);
		redirect('Legal/Upload_Legal_doc?ID='.$id.'&UID='.$UNIQUE_CODE);
		}
    
	/*------------------------------------------ Added by papiha on 23_03_2022-----------------------------------------------------------*/
	
		public function get_legal_by_bank()
		{
			$bank_id=$this->input->post('bank_id');
			$Legal_names=$this->Legal_model->get_legal_by_bank($bank_id);
			echo json_encode($Legal_names); 
		}
		public function get_coorporate_data()
		{
			$bank_id=$this->input->post('bank_id');
			$corporate_data=$this->Legal_model->corporate_data($bank_id);
			echo json_encode($corporate_data); 
		}
	 
		public function Send_Documents()
		{
			$Application_id=base64_decode($this->input->get('x'));
			$uid=base64_decode($this->input->get('y'));
		   $data['cust_info']=$this->credit_manager_user_model->getCustomers_for_pd_info($Application_id);
		   
			$USER_TYPE = $this->session->userdata("USER_TYPE");
			$ID=$this->session->userdata('ID');
			$data_row = $this->credit_manager_user_model->getDocuments_send_to_legal($Application_id,$USER_TYPE,'CPA');
			$this->load->helper('url');
			   $age = $this->session->userdata('AGE');
			   $data['showNav'] = 1;
			   $data['age'] = $age;
			   $data['userType'] = $this->session->userdata("USER_TYPE");
			   //$this->load->view('header', $data);
			 
			   $user_info= $this->Operations_user_model->getProfileData($ID);
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
   
			   $data['row']=$this->Customercrud_model->getProfileData($ID);
			   $data['documents']= $data_row ;
			   
			   $data['Applicant_data']=$this->Legal_model->get_legal_docs($Application_id);
			   
			   $this->load->view('dashboard_header', $data);
			   $this->load->view('Legal/send_documents', $data);
		}
		public function sendEmail_all_Document_Recived_legal($Legal_info,$cust_info,$send_to_emails,$Application_ID)
	  {
		
		 $Appication_info=$this->Legal_model->get_legal_docs($Application_ID);
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
			 $this->email->to($send_email_to_support);
			  $this->email->subject($Application_ID.'----'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'---- LEGAL REPORT'); 
		 
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
			<p style="font-size:12px;"> Kindly note that Legal Report for Mr/Mrs. <b>'.strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN).'</b> has been published on our portal under the section Customers > Vendors Report >  </p>
			<p style="font-size:12px;"> We request you to review and check all the details in the Report.</p>
			<p style="font-size:12px;">In case of any discrepancies in the report you can revert back to us within 1 / 2  working days </p>
			<p style="font-size:12px;">Looking forward to a continued association with us.</p>
			<p style="font-size:10px;">*Please do not reply to this mail.</p>';

			
			
		   
			
		
		$msg.='
			   </div>
				
				<p style="font-size:12px;">Thanks & Regards,</p>
				<p style="font-size:12px;">'.strtoupper($Legal_info->FN).' '.strtoupper($Legal_info->FN).' </p>
				</body>
				</html>';
		 
		$this->email->message($msg);
			 
			 $this->email->send();
			 
		 
	}
	public function Legal_remark()
		{
			
			$id = $this->input->post("id");
			$Legal_id = $this->session->userdata('ID');
			$Credit_id = $this->input->post("Credit_id");
			$UNIQUE_CODE = $this->input->post("UNIQUE_CODE");
			$USER_TYPE = $this->session->userdata("USER_TYPE");
			$cust_info=$this->credit_manager_user_model->getCustomers_for_pd_info($id);
			$row=$this->Customercrud_model->getProfileData($UNIQUE_CODE);
			 if($USER_TYPE=='Legal')
					{
						$data_doc['Legal_Remark']=$this->input->post("remark");
						$data_doc['Legal_status']='Document Received From Legal';
						$data_doc['Last_updated_by_Legal']=date("d-m-Y h:i:sa");
						$data_status['Legal_Remark']=$this->input->post("remark");
						$data_status['Legal_status']='Document Received From Legal';
					}
			if($USER_TYPE=='Technical')
					{
						$data_doc['Technical_Remark']=$this->input->post("remark");
						$data_doc['Last_updated_by_technical']=$this->input->post("remark");
						$data_doc['Technical_Status']='Document Received From Legal';
					    $data_status['Technical_Remark']=$this->input->post("remark");
						$data_doc['Technical_Status']='Document Received From Legal';
					}
			$result_doc1=$this->credit_manager_user_model->Update_Legal_status($UNIQUE_CODE,$data_status);
			$result_docs = $this->credit_manager_user_model->Update_Legal_Documents($id,$data_doc);
			if($result_doc1>0)
			{
				
			$result_doc1 = $this->credit_manager_user_model->Update_Legal_Documents($id,$data_doc);
			$this->session->set_userdata("result1", 1);
			$notification_data=['user_id'=>$Credit_id,'notification'=>'Document Received From Legal :'.$row->FN.' '.$row->LN,'status'=>'unseen'];
			$notification=$this->Admin_model->insert_notification($notification_data);
			/*---------------------------------- send Legal To all ---------------------------------------*/
			
			    $user_info= $this->Operations_user_model->getProfileData($Legal_id);
				
			$send_to_emails='papiha.patil@finaleap.com';
				
				 $this->sendEmail_all_Document_Recived_legal($user_info,$cust_info, $send_to_emails,$id);
			/*---------------------------------------------------------------------------------------------*/
			redirect('Legal/Send_Documents?x='.base64_encode($id).'&y='.base64_encode($UNIQUE_CODE));
			
			}
			else
			{
				$result_doc1 = $this->credit_manager_user_model->Update_Legal_Documents($id,$data_doc);
				$this->session->set_userdata("result1", 0);
			
				redirect('Legal/Send_Documents?x='.base64_encode($id).'&y='.base64_encode($UNIQUE_CODE));
			}
		}
   }