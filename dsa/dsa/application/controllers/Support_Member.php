<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Support_Member extends CI_Controller 
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
            $this->load->model('Support_model');
			$this->load->library('email');
			$this->load->library('upload');
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
                    $dashboard_data = $this->Help_model->getDashboardData(); 
                    $data['dashboard_data'] = $dashboard_data;
               

                    $this->load->view('admin/support_dash',$data);
               

                }
                //$this->load->view('footer');
              }
           }
       
           public function view_issue()
           {
           
                $this->load->helper('url');
               
                $data['userType'] = $this->session->userdata("USER_TYPE");
                
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
                $this->load->helper('url');
			    $data['userType'] = $this->session->userdata("USER_TYPE");
                $UNIQUE_CODE=$this->Help_model->getsupportID();
								
                $UNIQUE_CODE->UNIQUE_CODE;
                
                    
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
            
            
            
            
                    
                    
                $this->load->view('admin/support_dashboard',$data);
                $this->load->view('admin/support_view_issue',$data);
            }
            public function view_issue_form()
            {
                $this->load->helper('url');
                    
                    
                $data['userType'] = $this->session->userdata("USER_TYPE");
                
            
                $id = $this->session->userdata('ID');
            
                $data['user_data']=$this->Help_model->tikit_row($_GET['tikit_id']);
            
                $data['doc_path']=$this->Help_model->doc_path($_GET['tikit_id']);
                
                
            
                $tikit_data = $this->Help_model->tikit_data($id);
                $data['tikit_data']=$tikit_data;
                
                $this->load->view('admin/support_dashboard',$data);
                $this->load->view('admin/support_view_form',$data);

            }
            public function edit_row()
		    {
				
				$issue_id=$this->input->post('tikit_id');
				
                $edit_data=$this->Help_model->help_row($tikit_id);
                $data['edit_data']=$edit_data;
					
                $this->load->view('admin/support_dashboard',$data);
                $this->load->view('admin/support_view_form',$data);
            }
            public function update_tikit()
            {
            
                $this->load->helper('url');
                $data['userType'] = $this->session->userdata("USER_TYPE");
                $id = $this->session->userdata('ID');
                $data['id']=$id;

                $tikit_id=$this->input->post('tikit_id');
            
                $comment=$this->input->post('comment');
                $statuss=$this->input->post('status');
                $date=date('d-m-Y');
                $data=array('status'=>$statuss,
                
                'issue_close'=>$date,
                'comment'=>$comment
                
			);
		 
			   $data = $this->Help_model->update_tikit($tikit_id,$data);

               $data1=$this->Help_model->getUSERID($id);
               
               $user_name=$data1->user_name;
         
               $user_email=$data1->user_email;
			
               $user_id=$data1->user_id;
          
          
           
				$notification='Your Issue has been Updated. Ticket_id='.$tikit_id.'<br> Comment='.$comment.'<br> Status='.$statuss.' on date - '.$date;
				$status='unseen';
	 
				$data = array(
			 
				 'user_id' =>$user_id,
				 'notification' => $notification,
				 'status' => $status
				  );
				  $data=$this->Customercrud_model->save_notification($data);
			
			$this->session->set_flashdata('success','success');
				   $config['protocol']='smtp';
				  /* $config['smtp_host']='smtp.zoho.in';
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
				   $send_email_to_support ='sonal.s.chopade@gmail.com';
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
					  <h3>Dear '.$user_name.',</h3><br>
		
		
		
                 
                   <h4>Your Issue has been Updated.<h4>
		         
				  <div class="container">
				  <table class="table table-bordered">
				 <thead>
				   <tr>
					 <th>Sr.No</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Ticket_id</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Comment</th>&nbsp;&nbsp;&nbsp;&nbsp;
                     <th>status</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 <th>Issue Close Date</th>&nbsp;&nbsp;&nbsp;&nbsp;
					 
					 
				   </tr>
				 </thead>
				 <tbody>';
			 
				 $msg.= '<tr>
					 <td>'.$z.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$tikit_id.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$comment.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
                     <td>'.$statuss.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					 <td>'.$date.'</td>&nbsp;&nbsp;&nbsp;&nbsp;
					
					
					 </tr>';
				   
				 
				 $z++;
				
			 
			 
				 
			
		 
			 
			 $msg.='</tbody>
					</table>
					</div>
					 <br><br>
					 <h3>Best Regards,</h3>
					 <h4>Finaleap</h4>
					 </body>
					 </html>';
			  
				   $this->email->message($msg); 
				   $this->email->send();
			
			
		
				
			 
			if($data>0)
		    {
                $this->session->set_flashdata('success','success');
                redirect("Support_Member/view_issue_form?tikit_id=$tikit_id");
            }
            else
            {
                $this->session->set_flashdata('success','fail');
                redirect("Support_Member/view_issue_form?tikit_id=$tikit_id");
            }
		
	  
	
        }
           public function delete_Support_Member()
        {
            $id=$this->input->post('id');
            $delete_SM = $this->Help_model->delete_customer($id);
            //$this->Support_Member();
            if($data>0)
		    {
                $this->session->set_flashdata('success','success');
                redirect("admin/Support_Member");
            }
            else
            {
                $this->session->set_flashdata('success','fail');
                redirect("admin/Support_Member");
            }
            
        }

    }

        

    

   
    

    

    


?>