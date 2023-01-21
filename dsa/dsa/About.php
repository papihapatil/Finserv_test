<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct() 
  {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->library('email');
        $this->load->library("pagination");
        $this->load->library('session');
	     $this->load->library('upload');
		  $this->load->helper(array('form', 'url'));
        $this->load->model('job_application_model');
     }
     public function send_email(){
         $data=array(
             'cname'=>$this->input->post('cname'),
             'cemail'=>$this->input->post('cemail'),
             'cmessage'=>$this->input->post('cmessage')
         );
         $email=$data['cemail'];
         $name=$data['cname'];
         $msg=$data['cmessage'];
         
          $to = 'info@finaleap.com';
          $from = 'info@finaleap.com';
          $fromName =$data['cemail'];
          $mailSubject = 'Contact Request Submitted by '.$data['cname'];

          $mailContent = '
            New Visitor From Finaleap.com :
            Name: '.$data['cname'].'
            Email:'.$data['cemail'].'
            Message:'.$data['cmessage'].'
            ';
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
           
            $this->email->to($to);
            $this->email->from($from, $fromName);
            $this->email->subject($mailSubject);
            $this->email->message($mailContent);
           //$message = "Mail Sent";
           //echo $message ;
          // exit();
            if($this->email->send())
            {
              
               //$message = "Mail Sent";
               Redirect('https://finaleap.com/');
         
            } else {
         
               echo $this->email->print_debugger();  
            }   
     }
      

     public function send_request(){
    
      $data=array(
          'rname'=>$this->input->post('rname'),
          'remail'=>$this->input->post('remail'),
          'rphone'=>$this->input->post('rphone'),
          'rselect'=>$this->input->post('rselect')
      );
      //echo $data['rname'];
     // echo $data['remail'];
     // echo $data['rphone'];
     // echo $data['rselect'];
     // exit();
      $rname=$data['rname'];
      $remail=$data['remail'];
      $rphone=$data['rphone'];
      $rmsg=$data['rselect'];
      
       $to = 'info@finaleap.com';
       $from = 'info@finaleap.com';
       $fromName =$data['remail'];
       $mailSubject = 'Meeting Request Submitted by '.$data['rname'];

       $mailContent = '
         Meeting Request From Finaleap.com :
         Name:'.$data['rname'].'
         Email:'.$data['remail'].'
         Contact No.:'.$data['rphone'].'
         Intrested in:'.$data['rselect'].'
         ';
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
        
         $this->email->to($to);
         $this->email->from($from, $fromName);
         $this->email->subject($mailSubject);
         $this->email->message($mailContent);

         if($this->email->send())
         {
           
           // $message = "Mail Sent";
            //echo $message;
            Redirect('https://finaleap.com/');
      
         } else {
      
            echo $this->email->print_debugger();  
         }   
  }
   
  public function submit_application()
  {
     
       $fname  =$this->input->post('fname');
       $lname  = $this->input->post('lname');
       $email  = $this->input->post('email');
       $mobile = $this->input->post('mobile');
       $total_experience = $this->input->post('total_experience');
       $relevent_experience = $this->input->post('relevent_experience');
       $current_working = $this->input->post('currently_working');
       $name_of_org =  $this->input->post('name_of_org');
       $notice_period = $this->input->post('notice_period');
       $current_sal = $this->input->post('current_sal');
       $expected_sal = $this->input->post('expected_sal');
       $position = $this->input->post('position');
       $file= $this->input->post('file');

       $fileName=$_FILES["file"]["name"];
		 $fileSize=$_FILES["file"]["size"]/1024;
         $fileType=$_FILES["file"]["type"];
         $fileTmpName=$_FILES["file"]["tmp_name"];  
         $date = date("Y-m-d");
		 $newFileName=$fileName;
		 $uploadPath="./images/all_document_pdf/".$newFileName;		

         if(move_uploaded_file($fileTmpName,$uploadPath)) 
		   {
            
               $data = array(

               'fname' => $fname,
               'lname' =>$lname,
               'email' =>$email ,
               'mobile' =>$mobile ,
               'total_experience'=>$total_experience,
               'relevent_experience' =>$relevent_experience,
               'currently_working'=>$current_working,
               'name_of_org' =>$name_of_org,
               'notice_period' =>$notice_period ,
               'current_sal_p_m' =>$current_sal ,
               'expected_sal_p_m' =>$expected_sal,
               'position' =>$position,
               'resume_path'=>$newFileName,
               'date'=>$date
                 );

                 $check_existing_entry= $this->job_application_model->check_job_application_details($email, $mobile);
                 if(isset($check_existing_entry))
                 {
                    $result = $this->job_application_model->update_job_application_details($email,$mobile,$data);
                   // $this->session->set_flashdata('success', 'Data updated successfully');
                   Redirect('https://finaleap.com/');
                 }
                 else
                 {
                    $result = $this->job_application_model->save_job_application_details_details($data);
                   // $this->session->set_flashdata('success', 'Data added successfully');
                   Redirect('https://finaleap.com/');
                 }
                





         }
         else
         {
            echo "file not  uploded";
         }
    
  }
    
}
?>