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
		 
		 //echo phpinfo();
		 
		 //exit;
         $data=array(
             'cname'=>$this->input->post('cname'),
             'cemail'=>$this->input->post('cemail'),
             'cmessage'=>$this->input->post('cmessage')
         );
         $email=$data['cemail'];
         $name=$data['cname'];
         $msg=$data['cmessage'];
         
          $to = 'suhani.dhokret@finaleap.com';
          $from = 'infoflfinserv@finaleap.com';
          $fromName =$data['cemail'];
          $mailSubject = 'Contact Request Submitted by '.$data['cname'];

          $mailContent = '
            New Visitor From Finaleap.com :
            Name: '.$data['cname'].'
            Email:'.$data['cemail'].'
            Message:'.$data['cmessage'].'
            ';
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
		$from = FROM_EMAIL;
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
      
       $to = 'suhani.dhokret@finaleap.com';
       $from = 'infoflfinserv@finaleap.com';
       $fromName =$data['remail'];
       $mailSubject = 'Meeting Request Submitted by '.$data['rname'];

       $mailContent = '
         Meeting Request From Finaleap.com :
         Name:'.$data['rname'].'
         Email:'.$data['remail'].'
         Contact No.:'.$data['rphone'].'
         Intrested in:'.$data['rselect'].'
         ';
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
		$from = FROM_EMAIL;
		
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
       $position2 = $this->input->post('position');
       $location = $this->input->post('location');
       $file= $this->input->post('file');

       $fileName=$_FILES["file"]["name"];
		 $fileSize=$_FILES["file"]["size"]/1024;
         $fileType=$_FILES["file"]["type"];
         $fileTmpName=$_FILES["file"]["tmp_name"];  
         $date = date("Y-m-d");
		 $newFileName=$fileName;
		 $uploadPath="./images/all_document_pdf/".$newFileName;	
		 
		 $position = "";
		 if($_REQUEST['position'] == 'CA Fresher')
		 {
			$position = "CAFresher"; 
		 }
		 
		 if($_REQUEST['position'] == 'Credit Manager')
		 {
			$position = "CreditManager"; 
		 }
		 
		 if($_REQUEST['position'] == 'Relationship Manger')
		 {
			$position = "RelationshipManger"; 
		 }
		 
		 if($_REQUEST['position'] == 'Sales Manger')
		 {
			$position = "SalesManger"; 
		 }
		 
		 if($_REQUEST['position'] == 'Relationship Officer')
		 {
			$position = "RelationshipOfficer"; 
		 }
		 
		 if($_REQUEST['position'] == 'Branch Manager')
		 {
			$position = "BranchManager"; 
		 }
		 
		 if($_REQUEST['position'] == 'Mobile App developer')
		 {
			$position = "MobileAppdeveloper"; 
		 }
		 
		 if($_REQUEST['position'] == 'Web UI developer')
		 {
			$position = "WebUIdeveloper"; 
		 }
		 
		 if($_REQUEST['position'] == 'Java Fresher')
		 {
			$position = "JavaFresher"; 
		 }
		 
		 if($_REQUEST['position'] == '.net Developer')
		 {
			$position = "netDeveloper"; 
		 }
		 
		 if($_REQUEST['position'] == 'Java Developer')
		 {
			$position = "JavaDeveloper"; 
		 }
		 
		 if($_REQUEST['position'] == 'Mid Experience Java Developer')
		 {
			$position = "MidExperienceJavaDeveloper"; 
		 }
		 
		 if($_REQUEST['position'] == 'Web Developer')
		 {
			$position = "WebDeveloper"; 
		 }
		 
		 if($_REQUEST['position'] == 'HR EXECUTIVE')
		 {
			$position = "HREXECUTIVE"; 
		 }
                 


			/* code to export files to Nextcloud starts here */
						$time = time();

						$fileextensionarr = explode(".",$_FILES["file"]["name"]);

						$fileextension = $fileextensionarr[1];
						
						$filename = $time.".".$fileextension;
						
						$dirname = "Finaleap/resumes/".$position."/";

						$filenamewithdir = $dirname.$filename;

			  $correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD."  https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["file"]["tmp_name"]."";

 exec($correcturl);
 
 //exit;

 /* code to upload file ends here */

         if(true) 
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
               'position' =>$position2,
               'location'=>$location,
               'resume_path'=>$newFileName,
               'date'=>$date,
			   'cloud_file_name' => $filename,
			   'cloud_file_path' => $dirname
                 );
                 
                 $check_existing_entry= $this->job_application_model->check_job_application_details($email, $mobile);
                 if(isset($check_existing_entry))
                 {
                    $result = $this->job_application_model->update_job_application_details($email,$mobile,$data);
                   // $this->session->set_flashdata('success', 'Data updated successfully');
                   $this->send_email_job_application($fname,$lname,$email,$position,$date,$mobile,$location);
                   Redirect('https://finaleap.com/');
                 }
                 else
                 {
                    $result = $this->job_application_model->save_job_application_details_details($data);
                    $this->send_email_job_application($fname,$lname,$email,$position,$date,$mobile,$location); 
                   // $this->session->set_flashdata('success', 'Data added successfully');
                   Redirect('https://finaleap.com/');
                 }
                




                
         }
         else
         {
            echo "file not  uploded";
         }
    
  }

  public function send_email_job_application($fname,$lname,$email,$position,$date,$mobile,$location){

   $email_=$email;
   $fname_=$fname;
   $lname_=$lname;
   $position_=$position;
   $mobile_=$mobile;
   $location=$location;
  
   
    $to = 'suhani.dhokret@finaleap.com';
    $from = 'infoflfinserv@finaleap.com';
    $fromName =$email_;
    $mailSubject = 'Job Application submitted by '. $fname_.''. $lname_;

    $mailContent = '
      Applicant Details :
      Name: '.$fname_.' '. $lname_.'
      Email:'.$email_.'
      Mobile:'.$mobile_.'
      Applied for:'.$position_.'
      Job Location:'.$location.'
      Applied on:'.$date.'
      ';
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
		$from = FROM_EMAIL;
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

}
?>