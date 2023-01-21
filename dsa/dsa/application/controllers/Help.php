<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller 
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
			$this->load->model('Help_model');
			$this->load->library('email');
			$this->load->library('upload');
			$this->load->helper(array('form', 'url'));
		}
		
		public function help_form()
		{
			
				$this->load->helper('url');
				
				
				$data['userType'] = $this->session->userdata("USER_TYPE");
				
			
				$id = $this->session->userdata('ID');
		
				
				$data['row']=$this->Customercrud_model->getProfileData($id);
				
			
				$issue_category1=$this->Help_model->get_issue_category();
				
			
                $data['issue_category']=$issue_category1;

                $data['id']=$id;
				
				$user_name=$data['row']->FN.' '.$data['row']->LN;
				$data['user_name'] =$user_name;
				
				$user_email=$data['row']->EMAIL;
				$data['user_email']= $user_email;
				
				$seperate_data = $this->Help_model->tikit_data_seperate($id);
				$data['seperate_data']=$seperate_data;
			
				
				$this->load->view('dashboard_header',$data);
				$this->load->view('admin/help_view',$data);
        }
		public function get_sub_issue()
		{
			
			$issue_category_id=$this->input->post('issue_category_id');
			
			$sub_issue=$this->Help_model->get_sub_issue_category($issue_category_id);
			
			$data['sub_category']=$sub_issue;

		     echo json_encode($sub_issue);

		}
		public function save_ticket()
		{
			$this->load->helper('url');
				
				
				$data['userType'] = $this->session->userdata("USER_TYPE");
				
			
				$id = $this->session->userdata('ID');
		
				
				$data['row']=$this->Customercrud_model->getProfileData($id);
				
			
				$issue_category1=$this->Help_model->get_issue_category();
				
			
                $data['issue_category']=$issue_category1;

                $data['id']=$id;
				
				$user_name=$data['row']->FN.' '.$data['row']->LN;
				$data['user_name'] =$user_name;
				
				$user_email=$data['row']->EMAIL;
				$data['user_email']= $user_email;
				//print_r($user_email);
				//exit;
				
				$seperate_data = $this->Help_model->tikit_data_seperate($id);
				$data['seperate_data']=$seperate_data;
				
			//	$issue_id=$this->tikit_id(); //calling tikit id function
			
            
			
				
				
			
            $subject=$this->input->post('subject');
			
			$files=$_FILES['image_file'];
			
			$filename=$files['name'];
			
			$fileerror=$files['error'];
			$filetmp=$files['tmp_name'];
			
			$destinationfile='./images/issues_screenshot/'.$filename;
			move_uploaded_file($filetmp,$destinationfile);
			
            $issue_id=$this->tikit_id();  //calling ticket id function
			$date=date('d-m-Y');
			
            $UID=$this->input->post('id');
			//$user_email=$this->input->post('user_email');
			
			$status='created';
				 
				
				 
			   
			$data = array(
				    
				'user_id'=> $UID,
				'user_email'=>$user_email,
				'subject'=> $this->input->post('subject'),
				'department'=> $this->input->post('department'),
				'user_name'=> $this->input->post('user_name'),
				'tikit_id'=>$issue_id,
				'issue_category'=> $this->input->post('category_name'),
				'sub_category'=> $this->input->post('sub_issue1'),
				'details_description'=> $this->input->post('details_description'),
				'impact'=> $this->input->post('impact'),
				'created_date'=> $date,
				'status'=> $status
				);
				

			$data1=array(
				'user_id'=>$UID,
				'tikit_id'=>$issue_id,
				'created_date'=> $date,
				'doc_name'=>$filename,
				'doc_path'=> $destinationfile
					
				);
				
				$doc=$this->Help_model->saveDoc($data1);
				
			
				$response=$this->Help_model->saverecords($data);
			
				
				$user_name=$this->input->post('user_name');	
				$sub=$this->input->post('subject');
				$issue= $this->input->post('category_name');
				$sub_issue=$this->input->post('sub_issue1');
				$description=$this->input->post('details_description');
				$impact=$this->input->post('impact');
				$date=$date;

				$UNIQUE_CODE=$this->Help_model->getAdminID();
				
                $UNIQUE_CODE->UNIQUE_CODE;
			   
				//$user_id=$AdminUser_id['UNIQUE_CODE'];
				//$data['user_id']= $user_id;
				
				
				$notification='Issue Received From - '.$user_name.' Ticket_id='.$issue_id.'<br> on date - '.$date;
				$status='unseen';
	            
				$data = array(
			 
				 'user_id' =>$UNIQUE_CODE->UNIQUE_CODE,
				 'notification' => $notification,
				 'status' => $status
				  );
				  $data=$this->Customercrud_model->save_notification($data);
				
               

				
				 

			    $this->session->set_flashdata('save','save');
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
				  // $from_email = "infoflfinserv@finaleap.com";
				   $this->email->from($from_email, 'Finaleap'); 
				   $send_email_to_support= 'sonal.s.chopade@gmail.com';
				   $this->email->to($send_email_to_support);
				   $this->email->subject('Issue - '.$sub.' '); 
				  
				   
				   $z=1;
				   $msg=
				   '<!DOCTYPE html>
					  <html lang="en">
					  <head>
						
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
					  <h3>Dear Admin ,</h3><br>
		
		
		
                 
                   <h4>Issue Received From - '.$user_name.'<h4>
		         
				  <div class="container">
				  <table class="table table-bordered">
				 <thead>
				   <tr>
					 <th>Sr.No</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Ticket_id</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Issue Category</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Sub Issue Category</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Detailed description</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Impact</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Issue date</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 
				   </tr>
				 </thead>
				 <tbody>';
			 
				 $msg.= '<tr>
					 <td>'.$z.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$issue_id.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$issue.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$sub_issue.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$description.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$impact.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$date.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					
					 </tr>';
				   
				 
				 $z++;
				
			 
			 
				 
			
		 
			 
			 $msg.='</tbody>
					</table>
					</div>
					 <br><br>
					 <h3>Best Regards,</h3>
					 <h4>'.$user_name.'</h4>
					 </body>
					 </html>';
			  
				   $this->email->message($msg); 
				   $this->email->send();
			
				

				if($response>0)
				{
					$this->session->set_userdata("result", 1);
					redirect('Help/help_form');
				}
				else
				{
					$this->session->set_userdata("result", 0);
					redirect('Help/help_form');
				}
				
				
				
			}
			public function tikit_id()
			{
				$row=$this->Help_model->last_row();
				//print_r($row);
				//exit;
			  
				   if($row)
				   {
				    $idPostfix = (int)substr($row->id,0)+1;
					//print_r($idPostfix);
					//exit;
					
				    $nextId = 'A'.STR_PAD((string)$idPostfix,5,"0",STR_PAD_LEFT);
					//echo $nextId;
					//exit;
				   }
				    else{$nextId = 'A00001';} // For the first time
				    return $nextId;
				   
			       }
			
             public function delete_row()
            {
                
                $id=$_GET['id'];

                $delete = $this->Help_model->detele_row($id);
             

                if($delete>0)
                {
                    $this->session->set_flashdata('delete','delete');
                    redirect('Help/help_form');
                }
                else
                {
                    $this->session->flashdata('delete','fail');
                    redirect('Help/help_form');
                }
                    
            }
			
		public function view_issue()
		{
			    $this->load->helper('url');
				
				
				$data['userType'] = $this->session->userdata("USER_TYPE");
				
			
				$id = $this->session->userdata('ID');
		
				
				$data['row']=$this->Customercrud_model->getProfileData($id);
				
			
				$issue_category1=$this->Help_model->get_issue_category();
				
			    $data['issue_category']=$issue_category1;

                $data['id']=$id;
				
			    $user_name=$data['row']->FN.' '.$data['row']->LN;
				$data['user_name'] =$user_name;
				
				$user_email=$data['row']->EMAIL;
				$data['user_email']= $user_email;
				
               
                 
				$tikit_data = $this->Help_model->tikit_data($id);
				$data['tikit_data']=$tikit_data;

				
		     $this->load->view('dashboard_header', $data);
			 $this->load->view('admin/Help_view_edit',$data);
		}
		public function help_view_edit_form()
		{
			$this->load->helper('url');
				
				
				$data['userType'] = $this->session->userdata("USER_TYPE");
				
			
				$id = $this->session->userdata('ID');
		
				
				$data['row']=$this->Customercrud_model->getProfileData($id);
			
				$issue_category1=$this->Help_model->get_issue_category();
				
				
                $data['issue_category']=$issue_category1;

				
                $data['id']=$id;
				
				$user_name=$data['row']->FN.' '.$data['row']->LN;
				$data['user_name'] =$user_name;
				
				$user_email=$data['row']->EMAIL;
				$data['user_email']= $user_email;
				
               
                 
				$tikit_data = $this->Help_model->tikit_data($id);
				$data['tikit_data']=$tikit_data;
				
				
		    $this->load->view('dashboard_header', $data);
			$this->load->view('admin/help_view_edit_form',$data);

		}
		public function help_view_Admin_form()
		{
			$this->load->helper('url');
				
			
			$data['userType'] = $this->session->userdata("USER_TYPE");
			
		
			$id = $this->session->userdata('ID');
			
	       
			
			$data['row']=$this->Customercrud_model->getProfileData($id);
		
			$issue_category1=$this->Help_model->get_issue_category();
			
			$data['issue_category']=$issue_category1;
            $data['id']=$id;
			
			$data['user_data']=$this->Help_model->tikit_row($_GET['tikit_id']);
		
			$data['doc_path']=$this->Help_model->doc_path($_GET['tikit_id']);
			
			$user_name=$data['row']->FN.' '.$data['row']->LN;
			$data['user_name'] =$user_name;
			
			$user_email=$data['row']->EMAIL;
			$data['user_email']= $user_email;
			
			$supporter=$this->Help_model->get_assign_name();
			$data['supporter']=$supporter;
			
			$tikit_data = $this->Help_model->tikit_data($id);
			$data['tikit_data']=$tikit_data;

			
	    $this->load->view('dashboard_header', $data);
		$this->load->view('admin/help_view_Admin_form',$data);

		}
		public function edit_row()
		{
				
		   $issue_id=$this->input->post('tikit_id');
				
           $edit_data=$this->Help_model->help_row($tikit_id);
           $data['edit_data']=$edit_data;
					
            $this->load->view('dashboard_header', $data);
		    $this->load->view('admin/help_view_Admin_form',$data);
		}
		public function update_tikit()
		{
			$this->load->helper('url');
				
			
			$data['userType'] = $this->session->userdata("USER_TYPE");
			
		    $sid=$this->input->post('supporter_name');
		    $data['sid']=$sid;
		 
		    $id = $this->session->userdata('ID');
			
	        $tikit_id=$this->input->post('tikit_id');
			$comment=$this->input->post('comment');
			$statuss=$this->input->post('status');
			$date=date('d-m-Y');
			$data=array('status'=>$statuss,
			'comment'=>$comment,
			'supporter_name'=>$this->input->post('supporter'),
			'issue_open'=>$date
			
			
             );
		 
			  $data = $this->Help_model->update_tikit($tikit_id,$data);
			 
			   $email_send=$this->send_mail($sid,$tikit_id);//calling email function
			 
			if($data>0)
		    {
				$this->session->set_flashdata('success','success');
				redirect("Help/help_view_Admin_form?tikit_id=$tikit_id");
		    }
			else
            {
				$this->session->set_flashdata('success','fail');
				redirect("Help/help_view_Admin_form?tikit_id=$tikit_id");
			}
		
	  
	
		} 
		public function send_mail($sid,$tikit_id)
		{
			$this->load->helper('url');
				
			$sid=$this->input->post('supporter_name');
			
			$data['sid']=$sid;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$id = $tikit_id;
			
            $saveData=$this->Help_model->getSaveData($id);
			
			
            $tikit_id=$saveData->tikit_id;
			$data=$saveData;

			$issue=$saveData->issue_category;
			$data=$issue;
		   
			$sub_issue=$saveData->sub_category;
			$data=$sub_issue;

			$sub_issue=$saveData->sub_category;
			$data=$sub_issue;

			$description=$saveData->details_description;
			$data=$description;
		
			$impact=$saveData->impact;
			$data=$impact;
            
			$date=$saveData->created_date;
			$data=$date;
 
			$sub=$saveData->subject;
			$data=$sub;

			$comment=$saveData->comment;
			$data=$comment;

			$statuss=$saveData->status;
			$data=$statuss;
			$supporter=$this->Help_model->getSupporterData_profe($sid);
			$data=$supporter;
            
			
			$supporter_name=$supporter->name;
			$data=$supporter_name;
		
			 
			$supporter_email=$supporter->email;
			$data= $supporter_email;

			$user_id=$this->Help_model->getsupportID();
				
			   $UNIQUE_CODE=$user_id->UNIQUE_CODE;
			 
			  
			 
			
			
			
			   
			

		    	$notification='New Issue Assigned To You From Admin Ticket_id='.$tikit_id.'<br> on date - '.$date;
				$status='unseen';
	 
				$data = array(
			 
				 'user_id' => $UNIQUE_CODE=$user_id->UNIQUE_CODE,
				 'notification' => $notification,
				 'status' => $status
				  );
				  $data=$this->Customercrud_model->save_notification($data);
			
			$this->session->set_flashdata('success','success');
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
				   //$from_email = "infoflfinserv@finaleap.com";
				   $this->email->from($from_email, 'Finaleap'); 
				   $send_email_to_support =$supporter_email;
				   $this->email->to($send_email_to_support);
				   $this->email->subject('Issue - '.$sub.' '); 
				  
			  
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
					  <h3>Dear '.$supporter_name.',</h3><br>
		
		
		
                 
                   <h4>New Issue Assigned To You.<h4>
		         
				  <div class="container">
				  <table class="table table-bordered">
				 <thead>
				   <tr>
					 <th>Sr.No</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Ticket_id</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Issue Category</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Sub Issue Category</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Detailed description</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Comment</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Status</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Impact</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Issue date</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 
				   </tr>
				 </thead>
				 <tbody>';
			 
				 $msg.= '<tr>
					 <td>'.$z.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$tikit_id.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$issue.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$sub_issue.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$description.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$comment.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$statuss.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$impact.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$date.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					
					 </tr>';
				   
				 
				 $z++;
			  
				   $this->email->message($msg); 
				   $this->email->send();
			
				
		}
			public function add_new_category()
		{
			$this->load->helper('url');
				
				
			$data['userType'] = $this->session->userdata("USER_TYPE");
			
		
			$id = $this->session->userdata('ID');
	
			
			$data['row']=$this->Customercrud_model->getProfileData($id);

			$issue_category1=$this->Help_model->get_issue_category();
			$data['issue_category']=$issue_category1;

		$this->load->view('dashboard_header',$data);
		$this->load->view('admin/add_new_category',$data);
		}
		public function add_category()
		{
			$this->load->helper('url');
				
				
				$data['userType'] = $this->session->userdata("USER_TYPE");
				
			
				$id = $this->session->userdata('ID');
		
				
				$data['row']=$this->Customercrud_model->getProfileData($id);
				
			$this->load->view('dashboard_header',$data);
			$this->load->view('admin/add_category_view',$data);
		}
		public function save_category()
		{
			$this->load->helper('url');
				
				
				$data['userType'] = $this->session->userdata("USER_TYPE");
				
			
				$id = $this->session->userdata('ID');
		
				
				$data['row']=$this->Customercrud_model->getProfileData($id);
				
			
				$issue_category1=$this->Help_model->get_issue_category();
				
			
                $data['issue_category']=$issue_category1;

                $data['id']=$id;
				

				$data = array(
				    
					
					'issue_category_name'=> $this->input->post('issue_category')
					
					);
					$response=$this->Help_model->save_issue_category($data);

					
				if($response>0)
				{
					$this->session->set_flashdata('save','save');
					redirect('Help/add_new_category');
				}
				else
				{
					$this->session->set_flashdata('save','fail');
					redirect('Help/add_new_category');
				}

		}
		public function add_sub_category()
		{
			$this->load->helper('url');
				
				
				$data['userType'] = $this->session->userdata("USER_TYPE");
				
			
				$id = $this->session->userdata('ID');
		
				
				$data['row']=$this->Customercrud_model->getProfileData($id);
				
			$this->load->view('dashboard_header',$data);
			$this->load->view('admin/add_sub_category',$data);
		}
		public function save_sub_category()
		{
			$this->load->helper('url');
				
				
				$data['userType'] = $this->session->userdata("USER_TYPE");
				
			
				$id = $this->session->userdata('ID');
		
				
				$data['row']=$this->Customercrud_model->getProfileData($id);
				
				$issue_category_id=$this->input->post('issue_category_id');
				
			
				$sub_issue=$this->Help_model->get_sub_issue_category($issue_category_id);
			
				$data['sub_category']=$sub_issue;

                $data['id']=$id;
				

				$data = array(
				    
					
					'sub_category_name'=> $this->input->post('sub_category'),
					'issue_category_id'=> $this->input->post('id')
					
					);
					$response=$this->Help_model->save_sub_category($data);

					if($response>0)
				{
					$this->session->set_flashdata('save','save');
					redirect('Help/add_new_category');
				}
				else
				{
					$this->session->set_flashdata('save','fail');
					redirect('Help/add_new_category');
				}

		}
		public function delete_issue_category(){
			if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'){
				redirect(base_url('index.php/admin'));
			}else{
				$array_input = array(
					'id' => $this->input->post('id')        
				);      
				
				$id = $this->Help_model->delete_issue_category($array_input);
				if($response>0)
				{
					$this->session->set_flashdata('save','save');
					redirect('Help/add_new_category');
				}
				else
				{
					$this->session->set_flashdata('save','fail');
					redirect('Help/add_new_category');
				}
				if($response>0)
				{
					$this->session->set_flashdata('save','save');
					redirect('Help/add_new_category');
				}
				else
				{
					$this->session->set_flashdata('save','fail');
					redirect('Help/add_new_category');
				}

				
			}
		}
	}
?>