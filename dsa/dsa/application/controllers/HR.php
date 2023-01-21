<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HR extends CI_Controller {

	public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
	     $this->load->library('upload');
		$this->load->helper(array('form', 'url'));
		$this->load->model('credit_manager_user_model');
		$this->load->model('Operations_user_model');
		$this->load->model('Customercrud_model');
		$this->load->model('Dsacrud_model');
		$this->load->model('HR_model');
		$this->load->model('Admin_model');
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
			
		}else{
			if($this->session->userdata('login_count')==0)
			{
			$this->session->set_flashdata('sucess','sucess');
				redirect('dsa/reset_password');
			}
			else{

			$id = $this->session->userdata('ID');
			$user_info= $this->Operations_user_model->getProfileData($id);
			$data['user_info']=$user_info;
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			//$this->load->view('header', $data);
			$id = $this->session->userdata('ID');
			$dashboard_data = $this->HR_model->getHrDashboardData();            
			$data['dashboard_data'] = $dashboard_data;
			$this->load->view('HR/Dashboard', $data);
			//$this->load->view('footer');
			}
		}
	}
	
	public function download_cloud_file($fileid)
	{
		//echo "File ID = ".$fileid;
		$user = $this->HR_model->getApplicantDetails($fileid);

				//		print_r($user);

						$documentname = $user->cloud_file_name;
						
						 $documentdir = $user->cloud_file_path.$documentname;

						$pathname = "cloudfile/".$documentname;
				
				 $downloadfile = " curl -X GET -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$documentdir."  --output ".$pathname." ";

 exec($downloadfile);
$url = base_url().$pathname;

//exit;
         redirect($url, 'refresh');
		
	}

	public function Applicants(){
		//echo "hii";
		//exit();
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
            $id = $this->input->get('id');
            if($id == '')
			$id = $this->session->userdata('ID');
			$user_info= $this->Operations_user_model->getProfileData($id);
            $userType = $this->input->get('userType');
            $date = $this->input->get('date');
            $userType2 = $this->input->get('userType2');
            if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
			$date = $this->input->get('date');
            $s = $this->input->get('s');
			$bank = $this->input->get('city_name');
            if ($s == '') {
                $s = 'all';
            }
			else if($s == 'all')
			{
				$s = 'all';
			}
			else if($s == 'city')
			{
				$s = 'city';
				$bank = $this->input->get('city_name');
			}
			else if($s == 'bnk')
			{
				$s = 'bnk';
				$bank = $this->input->get('bnk_name');
			}
			else
			{
				
				$s = $this->input->get('s');
				if($s == 'bnk')
				{
					$s = 'bnk';
					$bank = $this->input->get('bnk_name');
				}
				else if($s == 'city')
				{
					$s = 'city';
					$bank = $this->input->get('city_name');
				}
				else if($s == 'application_status')
				{
					$s = 'application_status';
					$bank = $this->input->get('application_status');
				}
			}
            $this->load->helper('url');
            $this->load->model('HR_model');
		
            $Applicants = $this->HR_model->getApplicants($s,$bank,$date);
			$_SESSION["data_for_excel"] =  $Applicants ;
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['userType'] = $this->session->userdata("USER_TYPE");          
            //$this->load->view('header', $data);
			$cities = $this->HR_model->getCity();
			$application_status = $this->HR_model->getApplicationStatus();
			$arr['cities']=$cities ;
			$banks =$this->Admin_model->getJobOppnings();
			$arr['application_status'] = $application_status;
			$arr['banks'] = $banks;
            $arr['user_info'] = $user_info;
            $arr['Applicants'] =$Applicants ;
            $arr['s'] = $s;
            $this->load->view('HR/Applicants', $arr);
        }
    }

    
	public function job_profiles(){
		//echo "hii";
		//exit();
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
			    $id = $this->input->get('id');
            if($id == '')
			$id = $this->session->userdata('ID');
			$user_info= $this->Operations_user_model->getProfileData($id);
            $job_profiles = $this->HR_model->getJobProfiles();
			$arr['job_profiles'] =$job_profiles ;
			$arr['user_info'] =$user_info ;
            $this->load->view('HR/Job_profiles',$arr);
        }
    }
	public function job_Analysis(){
		//echo "hii";
		//exit();
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{

		 $id = $this->input->get('id');
            if($id == '')
			$id = $this->session->userdata('ID');
			$user_info= $this->Operations_user_model->getProfileData($id);
			$arr['user_info'] =$user_info ;
			$profile_name = $this->input->get('profile_name');
			if($profile_name=='')
			{
				$profile_name=='all';
			}
			else
			{
				$profile_name = $this->input->get('profile_name');	
			}
			if( $profile_name=='all')
			{
				$job_profiles = $this->HR_model->getJobProfiles();
				$arr['job_opening_data'] =$job_profiles ;
				$arr['job_profiles'] =$job_profiles ;
			}
		    else
			{
				$job_opening_data = $this->HR_model->job_opening_data($profile_name);
				$arr['job_opening_data'] =$job_opening_data ;
				$arr['job_profiles'] =$job_profiles ;
			}
			
         
            $this->load->view('HR/Job_Analysis',$arr);
        }
    }
	public function job_Analysis_details(){
		//echo "hii";
		//exit();
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{

			$profile_name = $this->input->get('profile_name');
		

			if( $profile_name=='all')
			{
				$job_profiles = $this->HR_model->getJobProfiles();
				$arr['job_opening_data'] =$job_profiles ;
			}
			else
			{
				$job_opening_data = $this->HR_model->job_opening_data($profile_name);
				$arr['job_opening_data'] =$job_opening_data ;
			}
		
      
			$applicants_from_profile_name = $this->HR_model->applicants_from_profile_name($profile_name);
			$job_profiles = $this->HR_model->getJobProfiles();
			$arr['job_profiles'] =$job_profiles ;
		
			$arr['applicants_from_profile_name'] =$applicants_from_profile_name ;
            $this->load->view('HR/Job_Analysis',$arr);
        }
    }
	public function add_job_openings()
	{
		$new_job_openings= $this->input->post('new_job_openings');
		$priority= $this->input->post('priority');
		$experience_from= $this->input->post('experience_from');
		$experience_to= $this->input->post('experience_to');
		$expected_joining_date= $this->input->post('expected_joining_date');
		$job_locations= $this->input->post('job_locations');
		$Skills_text= $this->input->post('Skills_text');
		$roles_text= $this->input->post('roles_text');
		$job_positions= $this->input->post('job_positions');


		//exit();

		$data = array(
               'current_openings' => $new_job_openings,
			   'priority' => $priority,
			   'Exe_from' => $experience_from,
			   'Exe_to' => $experience_to,
			   'Expected_date' => $expected_joining_date,
			   'Skills_text' => $Skills_text,
			   'Roles_text' => $roles_text,
			   'Posted_date' =>date("Y-m-d"),
			   'job_locations'=>$job_locations,
			   'job_positions'=>$job_positions
			 );

			 $check_existing_entry= $this->HR_model->check_job_profile_details($new_job_openings);
			 if(isset($check_existing_entry))
			 {
				$result = $this->HR_model->update_job_profile_details($new_job_openings,$data);
			    $this->session->set_flashdata('success', 'Job Profile updated successfully');
				redirect("HR/job_profiles");
			   //Redirect('http://localhost/dsa');
			 }
			 else
			 {
				$result = $this->HR_model->save_job_profile_details($data);
			     $this->session->set_flashdata('success', 'Job Profile added successfully');
				 redirect("HR/job_profiles");
			   //Redirect('http://localhost/dsa');
			 }


	}
   
	public function remove_job_profile()
	{
		$id = $this->input->get("ID");
		$array_input = array(
			'id' => $this->input->get("ID")       
		);  
		$result = $this->HR_model->delete_job_profile($array_input);
		$this->session->set_flashdata('success', 'Job Profile Removed Successfully');
		redirect("HR/job_profiles");
		//echo $id;
		//exit();

	}
	public function Applicant_details()
	{
	if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
		    $this->load->view('login', $data);
		}
		else
		{

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
		   $data['HR_name'] =$user_name;
		   $data['HR_ID'] =$this->session->userdata('ID');

			$id = $this->input->get("ID"); 
			//echo $id;
			//exit();
			
			if ($id == '') {
				$id = $this->session->userdata("id");
			}
           // $Applicants = $this->HR_model->getApplicants($filter,$bank);
			$data_row = $this->HR_model->getApplicantDetails($id);
		    $this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$q = 1;
			if($u_type == 'DSA')$q = 2;
			 $age = 0;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id; 
			$data['row'] = $data_row;
			$data['user_info'] = $user_info;
			//$arr['s'] = $filter;
		 //   $this->load->view('HR/Applicant_details', $data);
		     $this->load->view('HR/View_applicant_details', $data);
			

		}
	}


	public function job_application_actions(){
	
		
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }
		else{
			$s = $this->input->get('s');
			$applicant_id = $this->input->get('ID');
			$HR_name= $this->input->get('HR');
			$remarks = $this->input->get('remark');
			$HR_ID= $this->input->get('HR_ID');
			
			// echo 	$HR_name;
			// exit();
			$applicant_email = $this->HR_model->getApplicantDetails($applicant_id); 
			$send_email=$applicant_email->email;
			$name=$applicant_email->fname;

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
			//$from_email = "infoflfinserv@finaleap.com";
			$this->email->from($from_email, 'Finaleap'); 

			if(	$s=='accept')
			{
				$send_email_to_support='support@finaleap.in,info@finaleap.com,hr@finaleap.com';
				//$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
			
				//$send_email_to_support='info@finaleap.com';
				$this->email->to($send_email_to_support);
				$this->email->subject('Application accepted by HR'); 
			}
			else
			{
				$this->email->to($send_email);
				$this->email->subject('Response to your job application Date '.$applicant_email->date.''); 
			}
			
			
			

			if(	$s=='accept')
			{	   
				$name=$applicant_email->fname.' '.$applicant_email->lname;
				$applied_for = $applicant_email->position;
				$email = $applicant_email->email;
				$mobile = $applicant_email->mobile;
				$date = $applicant_email->date;
				$total_experience = $applicant_email->total_experience;
				$mailContent = '
				Dear Team, 



				Following application is accepted by - '.$HR_name.'

				Applicant Name - '.$name.'
				Email - '.$email .'
				Mobile - '.$mobile.'
				Applied for - '.$applied_for.'
				Total Experience - '.$total_experience.'
				Job Location - '.$applicant_email->location.'
				Remarks - '.$remarks .'



				Best Regards, 
				Finaleap Private Limited 
				';
				$this->email->message('Dear Team ,'.$mailContent."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
				
			//	$this->email->message('Dear Team ,'."\r\n\n".'Following application is accepted by - '.$HR_name."\r\n".'Name		:'.$name."\r\n".'Applied for	:'.$applied_for."\r\n".'Email ID	:'.$email."\r\n".'Mobile		:'.$mobile."\r\n".'Total Experience	:'.$total_experience."\r\n".'Applied on		:'.$date."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
				$this->email->send();
				$array_data = array('job_status' =>'accept','Remarks'=> $remarks,'HR_name'=>$HR_name ,'HR_ID'=>$HR_ID );
				$job_application_actions = $this->HR_model->job_application_actions($applicant_id,$s,$array_data); 
			    redirect('HR/Applicant_details?ID='.$applicant_id); 
			
			}
			else if($s=='reject')
			{
				$this->email->message('Dear '.$name.','."\r\n\n".'    Thanks you for your interest in Finaleap. We have evaluated your profile and as of now your skills does not match our requirements.'."\r\n".'    We will get in touch with you for future needs.'."\r\n\n\n".'Best Regards,'."\r\n".'HR Team'."\r\n".'Finaleap Private Limited '); 
				$this->email->send();
				$array_data = array('job_status' =>'reject','Remarks'=> $remarks,'HR_name'=>$HR_name ,'HR_ID'=>$HR_ID );
				$job_application_actions = $this->HR_model->job_application_actions($applicant_id,$s,$array_data);
			
			    redirect('HR/Applicant_details?ID='.$applicant_id);  
			
			}
			else if($s=='hold')
			{
				$this->email->message('Dear '.$name.','."\r\n\n".'    Thanks you for your interest in Finaleap. We have evaluated your profile and as of now your skills does not match our requirements.  We will get in touch with you for future needs.'."\r\n\n\n".'Best Regards,'."\r\n".'HR Team'."\r\n".'Finaleap Private Limited '); 
				$this->email->send();
				$array_data = array('job_status' =>'hold','Remarks'=> $remarks,'HR_name'=>$HR_name ,'HR_ID'=>$HR_ID );
				$job_application_actions = $this->HR_model->job_application_actions($applicant_id,$s,$array_data); 
			     redirect('HR/Applicant_details?ID='.$applicant_id);  
			
			}
			
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
//////////////////////////////////////////3_12_2021=====================================================
public Function download_Excel()
	{
		
				 $this->load->library('excel');

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
				$this->excel->getActiveSheet()->setTitle('Job Applications');

				$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);


				$this->excel->getActiveSheet()->getStyle("A1:R1")->applyFromArray(array("font" => array("bold" => true)));

				$this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'FIRST NAME');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'LAST NAME');
				$this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'EMAIL ADDRESS');
				$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'MOBILE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'Total Experience');
                $this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'Relevent Experience');
				$this->excel->setActiveSheetIndex(0)->setCellValue('H1', 'Currently Working Status');
				$this->excel->setActiveSheetIndex(0)->setCellValue('I1', 'Organization Name');
				$this->excel->setActiveSheetIndex(0)->setCellValue('J1', 'Notice Period');
				$this->excel->setActiveSheetIndex(0)->setCellValue('K1', 'Current Salary p/m');
				$this->excel->setActiveSheetIndex(0)->setCellValue('L1', 'Expected Salary p/m');
				$this->excel->setActiveSheetIndex(0)->setCellValue('M1', 'Position Applied For');
				$this->excel->setActiveSheetIndex(0)->setCellValue('N1', 'Application Date');
				$this->excel->setActiveSheetIndex(0)->setCellValue('O1', 'Job Location');
				$this->excel->setActiveSheetIndex(0)->setCellValue('P1', 'Application Status');
				$this->excel->setActiveSheetIndex(0)->setCellValue('Q1', 'Remarks');
				$this->excel->setActiveSheetIndex(0)->setCellValue('R1', 'Remarks By');

				// get all users in array formate
                $data_for_excel= $this->session->userdata('data_for_excel');
				$users=json_decode(json_encode($data_for_excel), true);
				//$this->excel->getActiveSheet()->fromArray($users, null, 'A2');
                 $count=2;
				 $i=1;
				 foreach($users as $row)
				 {
					  $this->excel->getActiveSheet()->setCellValue('A'.$count,$i);
					  $this->excel->getActiveSheet()->setCellValue('B'.$count,$row['fname']);
					  $this->excel->getActiveSheet()->setCellValue('C'.$count,$row['lname']);
					  $this->excel->getActiveSheet()->setCellValue('D'.$count,$row['email']);
					  $this->excel->getActiveSheet()->setCellValue('E'.$count,$row['mobile']);
                      $this->excel->getActiveSheet()->setCellValue('F'.$count,$row['total_experience']);
					  $this->excel->getActiveSheet()->setCellValue('G'.$count,$row['relevent_experience']);
					  if($row['currently_working']=='working_yes')
					  {
						$this->excel->getActiveSheet()->setCellValue('H'.$count,'Yes');
					  }
					  else if($row['currently_working']=='working_no')
					  {
						$this->excel->getActiveSheet()->setCellValue('H'.$count,'No');	  
					  }
					 
					  $this->excel->getActiveSheet()->setCellValue('I'.$count,$row['name_of_org']);
					  $this->excel->getActiveSheet()->setCellValue('J'.$count,$row['notice_period']);
					  $this->excel->getActiveSheet()->setCellValue('K'.$count,$row['current_sal_p_m']);
					  $this->excel->getActiveSheet()->setCellValue('L'.$count,$row['expected_sal_p_m']);
					  $this->excel->getActiveSheet()->setCellValue('M'.$count,$row['position']);
					  $this->excel->getActiveSheet()->setCellValue('N'.$count,$row['date']);
					  $this->excel->getActiveSheet()->setCellValue('O'.$count,$row['location']);
					  $this->excel->getActiveSheet()->setCellValue('P'.$count,$row['job_status']);
					  $this->excel->getActiveSheet()->setCellValue('Q'.$count,$row['Remarks']);
					  $this->excel->getActiveSheet()->setCellValue('R'.$count,$row['HR_name']);
					  $count++; $i++;
				 }
				// read data to active sheet
				
				

				$filename='Finaleap_job_application_data.xlsx'; //save our workbook as this file name

				header('Content-Type: application/vnd.ms-excel'); //mime type

				header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name

				header('Cache-Control: max-age=0'); //no cache

				//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
				//if you want to save it as .XLSX Excel 2007 format

				$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');

				//force user to download the Excel file without writing it to server's HD
					//	ob_end_clean();
				$objWriter->save('php://output');
	}

	public function download_resume()
	{
		// f="resume.doc";   

       $file = ('https://finaleap.com/dsa/dsa/images/all_document_pdf/CV-Sam.pdf');

       $filetype=filetype($file);

       $filename=basename($file);

       header ("Content-Type: ".$filetype);

       header ("Content-Length: ".filesize($file));

       header ("Content-Disposition: attachment; filename=".$filename);

       readfile($file);


	}
	

	//=================================new engagement added by priyanka 20-01-2022===============================================
	public function New_Engagement_Dashbord()
	{
	if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
		    $this->load->view('login', $data);
		}
		else
		{

			$id = $this->session->userdata('ID');
			$user_info= $this->Operations_user_model->getProfileData($id);
			if(!empty($user_info))
			{
				
					$user_name=$user_info->FN." ".$user_info->LN;
				
			}
			else
			{
				$user_name='';
			}


		    $data['HR_name'] =$user_name;
		    $data['HR_ID'] =$this->session->userdata('ID');
			 $data['user_info']=$user_info;

			$all_engagements=$this->HR_model->get_all_engagements();
			$data['all_engagements']=$all_engagements;
			//print_r($data['all_engagements']);
    	    $this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$data['userType'] = $this->session->userdata("USER_TYPE");
			
			//$arr['s'] = $filter;
		 //   $this->load->view('HR/Applicant_details', $data);
		     $this->load->view('HR/HR_Dashbord',$data);
		     $this->load->view('HR/New_Engagement_dashbord',$data);
			

		}
	}

	public function Add_Engagement()
	{
	if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
		    $this->load->view('login', $data);
		}
		else
		{

			  $form_id_ = $this->input->get('form_id');
			  $form_id= base64_decode($form_id_);
			  if(!empty($form_id))
			  {
				  $form_data= $this->HR_model->get_engagement_form_Details($form_id);
				  $status=$form_data->Status;
				  if(isset($status))
				  {
					  if($status == 'Approved' || $status == 'Rework')
					  {
						   $form_approved_by= $this->Operations_user_model->getProfileData($form_data->Approved_by);
						   $approved_by=$form_approved_by->FN." ".$form_approved_by->LN;
						   $data['approved_by']=$approved_by;
				 
					  }

				  }
				 
			
				  $data['form_data']=$form_data;
			  }
			  else
			  {
				 
			  }

			 
			  //exit();
			  
			$id = $this->session->userdata('ID');
			$user_info= $this->Operations_user_model->getProfileData($id);
			  $data['user_info']=$user_info;
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
		    $data['HR_name'] =$user_name;
		    $data['HR_ID'] =$this->session->userdata('ID');
		
			
    	    $this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$data['userType'] = $this->session->userdata("USER_TYPE");
		
			//$arr['s'] = $filter;
		 //   $this->load->view('HR/Applicant_details', $data);
		     $this->load->view('HR/HR_Dashbord',$data);
		     $this->load->view('HR/Add_Engagement',$data);
    	}
	}

	public function save_engagement_form()
	{   
		
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
			$code = $this->generate_uuid();
			//$from_email = "infoflfinserv@finaleap.com";
			$this->email->from($from_email, 'Finaleap');

			 $submitted_by=$this->input->post('Engagement_submitter');
			 $client_name=$this->input->post('Client_name');
			 $client_contact=$this->input->post('client_contact');
			 $client_email_for_invoice=$this->input->post('client_email_for_invoice');
			 $resource_name=$this->input->post('resource_name');
			 $ResourceEmail=$this->input->post('ResourceEmail');
			 $resourcPhone=$this->input->post('resourcPhone');
			 $resourceType=$this->input->post('resourceType');
			 $Engagement_start_date=$this->input->post('Engagement_start_date');
			 $Engagement_end_date=$this->input->post('Engagement_end_date');

		              $status=$this->input->post('Status');
					  $data2['form_status']=$status;
					 if($status=='Submitted')
					 {
						     $Generate_ID="FNLP_".rand(1000,9999);
							 $existing_form = $this->input->post('Form_id');
							 if(!empty($existing_form))
							 {
							 	 $data=array(
								 'Form_id'=>$existing_form,
								 'client_name'=>$this->input->post('Client_name'),
								 'client_contact'=>$this->input->post('client_contact'),
								 'client_address'=>$this->input->post('client_address'),
								 'client_gst_number'=>$this->input->post('client_gst_number'),
								 'client_email_for_invoice'=>$this->input->post('client_email_for_invoice'),
								 'resource_name'=>$this->input->post('resource_name'),
								 'resourcPhone'=>$this->input->post('resourcPhone'),
								 'resource_role'=>$this->input->post('resource_role'),
								 'ResourceEmail'=>$this->input->post('ResourceEmail'),
								 'Engagement_start_date'=>$this->input->post('Engagement_start_date'),
								 'Engagement_end_date'=>$this->input->post('Engagement_end_date'),
								 'Billing_start_date'=>$this->input->post('Billing_start_date'),
								 'monthly_compensation'=>$this->input->post('monthly_compensation'),
								 'monthly_billing'=>$this->input->post('monthly_billing'),
								 'GST_applicable'=>$this->input->post('GST_applicable'),
								 'travel_expenses'=>$this->input->post('travel_expenses'),
								 'notes'=>$this->input->post('notes'),
								 'Engagement_submitter'=>$this->input->post('Engagement_submitter'),
								 'HR_ID'=>$this->input->post('HR_ID'),
								 'submission_date'=>date("Y-m-d"),
								 'Status'=>'Submitted',
								  'resourceType'=>$this->input->post('resourceType')
								 );


							 }
							 else
							 {
								 $data=array(
								 'Form_id'=>$Generate_ID,
								 'client_name'=>$this->input->post('Client_name'),
								 'client_contact'=>$this->input->post('client_contact'),
								 'client_address'=>$this->input->post('client_address'),
								 'client_gst_number'=>$this->input->post('client_gst_number'),
								 'client_email_for_invoice'=>$this->input->post('client_email_for_invoice'),
								 'resource_name'=>$this->input->post('resource_name'),
								 'resourcPhone'=>$this->input->post('resourcPhone'),
								 'resource_role'=>$this->input->post('resource_role'),
								 'ResourceEmail'=>$this->input->post('ResourceEmail'),
								 'Engagement_start_date'=>$this->input->post('Engagement_start_date'),
								 'Engagement_end_date'=>$this->input->post('Engagement_end_date'),
								 'Billing_start_date'=>$this->input->post('Billing_start_date'),
								 'monthly_compensation'=>$this->input->post('monthly_compensation'),
								 'monthly_billing'=>$this->input->post('monthly_billing'),
								 'GST_applicable'=>$this->input->post('GST_applicable'),
								 'travel_expenses'=>$this->input->post('travel_expenses'),
								 'notes'=>$this->input->post('notes'),
								 'Engagement_submitter'=>$this->input->post('Engagement_submitter'),
								 'HR_ID'=>$this->input->post('HR_ID'),
								 'submission_date'=>date("Y-m-d"),
								 'Status'=>'Submitted',
								  'resourceType'=>$this->input->post('resourceType')
								 );

							 }
							$send_email_to_3_HR='shiv@finaleap.com,amit@finaleap.com,vipul@finaleap.com';
							//$send_email_to_3_HR='piyuabdagire@gmail.com,priyanka.abdagire@finaleap.com,backupfiles.priyanka@gmail.com';
					   	    $this->email->to($send_email_to_3_HR);
							$check_entry= $this->HR_model->check_engagement_entry($data['HR_ID'],$data['Form_id']);
							if($check_entry > 0)
								{
									 $Result_id1 = $this->HR_model->update_new_engagement_details($data['HR_ID'],$data['Form_id'],$data);
									 $response = array('msg' => "updated");
									 echo json_encode($response);
								}
							else 
								{
									 $this->email->subject('New Engagement added in system For client :  '.$client_name.''); 
									 $data2['data']=$data;
								 // $data2['approved_by_name']=$approved_by_name;
								  $mailContent = $this->load->view('templates/Email',$data2,true);
									// $mailContent = $this->load->view('templates/Email',$data,true);
									 $this->email->message($mailContent); 
	    							 $this->email->Send() ;
									 $Result_id = $this->HR_model->save_new_engagement_details($data);
									 $response = array('msg' => "inserted");
									 echo json_encode($response);
	    						}
					 }
					 else if($status=='Submit_rework_form')
					 {
						     $existing_form = $this->input->post('Form_id');
							 $data=array(
							 'Form_id'=>$existing_form,
							 'client_name'=>$this->input->post('Client_name'),
							 'client_contact'=>$this->input->post('client_contact'),
							 'client_address'=>$this->input->post('client_address'),
							 'client_gst_number'=>$this->input->post('client_gst_number'),
							 'client_email_for_invoice'=>$this->input->post('client_email_for_invoice'),
							 'resource_name'=>$this->input->post('resource_name'),
							 'resourcPhone'=>$this->input->post('resourcPhone'),
							 'resource_role'=>$this->input->post('resource_role'),
							 'ResourceEmail'=>$this->input->post('ResourceEmail'),
							 'Engagement_start_date'=>$this->input->post('Engagement_start_date'),
							 'Engagement_end_date'=>$this->input->post('Engagement_end_date'),
							 'Billing_start_date'=>$this->input->post('Billing_start_date'),
							 'monthly_compensation'=>$this->input->post('monthly_compensation'),
							 'monthly_billing'=>$this->input->post('monthly_billing'),
							 'GST_applicable'=>$this->input->post('GST_applicable'),
							 'travel_expenses'=>$this->input->post('travel_expenses'),
							 'notes'=>$this->input->post('notes'),
							 'Engagement_submitter'=>$this->input->post('Engagement_submitter'),
							 'HR_ID'=>$this->input->post('HR_ID'),
							 'submission_date'=>date("Y-m-d"),
							 'Status'=>'Submitted',
							 'status_notes'=>$this->input->post('status_notes'),
							 'resourceType'=>$this->input->post('resourceType')
							 );

							//$send_email_to_3_HR='piyuabdagire@gmail.com,priyanka.abdagire@finaleap.com,backupfiles.priyanka@gmail.com';
							 //$send_email_to_3_HR='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com,vipul@finaleap.com';
				       	    $send_email_to_3_HR='shiv@finaleap.com,amit@finaleap.com,vipul@finaleap.com';
							
							 //$send_email_to_3_HR='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com';
							 // $send_email_to_3_HR='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com,vipul@finaleap.com';
				       	     $this->email->to($send_email_to_3_HR);
							 $this->email->subject('Engagement Rework Done For : '.$client_name.''); 
							// $mailContent = $this->load->view('templates/Email',$data,true);
							 $data2['data']=$data;
							//  $data2['approved_by_name']=$approved_by_name;
						     $mailContent = $this->load->view('templates/Email',$data2,true);
							 $this->email->message($mailContent); 
	    					 $this->email->Send();
							 $Result_id1 = $this->HR_model->update_new_engagement_details($data['HR_ID'],$data['Form_id'],$data);
							 $response = array('msg' => "updated");
							 echo json_encode($response);
							
					 }
					 else if($status=='Approved')
					 {
						     $existing_form = $this->input->post('Form_id');
							 $data=array(
							 'Form_id'=>$existing_form,
							 'client_name'=>$this->input->post('Client_name'),
							 'client_contact'=>$this->input->post('client_contact'),
							 'client_address'=>$this->input->post('client_address'),
							 'client_gst_number'=>$this->input->post('client_gst_number'),
							 'client_email_for_invoice'=>$this->input->post('client_email_for_invoice'),
							 'resource_name'=>$this->input->post('resource_name'),
							 'resourcPhone'=>$this->input->post('resourcPhone'),
							 'resource_role'=>$this->input->post('resource_role'),
							 'ResourceEmail'=>$this->input->post('ResourceEmail'),
							 'Engagement_start_date'=>$this->input->post('Engagement_start_date'),
							 'Engagement_end_date'=>$this->input->post('Engagement_end_date'),
							 'Billing_start_date'=>$this->input->post('Billing_start_date'),
							 'monthly_compensation'=>$this->input->post('monthly_compensation'),
							 'monthly_billing'=>$this->input->post('monthly_billing'),
							 'GST_applicable'=>$this->input->post('GST_applicable'),
							 'travel_expenses'=>$this->input->post('travel_expenses'),
							 'notes'=>$this->input->post('notes'),
							 'Engagement_submitter'=>$this->input->post('Engagement_submitter'),
							 'HR_ID'=>$this->input->post('HR_ID'),
							 'submission_date'=>date("Y-m-d"),
							 'Status'=>'Approved',
							   'Approved_by'=>$this->input->post('Approved_by'),
							  'Approved_on'=>date("Y-m-d"),
							   'resourceType'=>$this->input->post('resourceType')
							 );
							  
							  $approved_by_id=$this->input->post('Approved_by'); 
							  $approved_by_user_info= $this->Operations_user_model->getProfileData($approved_by_id);
								if(!empty($approved_by_user_info))
								{
			
									if($approved_by_user_info->MN!='')
									{
										$approved_by_name=$approved_by_user_info->FN." ".$approved_by_user_info->LN;
									}
									else
									{
										$approved_by_name=$approved_by_user_info->FN." ".$approved_by_user_info->LN;
									}
								}
								else
								{
									$approved_by_name='';
								}
					           // $send_email_to_5_members='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com,vipul@finaleap.com,accounts@finaleap.com,support@finaleap.in';
		        	             $send_email_to_5_members='shiv@finaleap.com,amit@finaleap.com,vipul@finaleap.com,accounts@finaleap.com,support@finaleap.in';
							    //   $send_email_to_5_members='piyuabdagire@gmail.com,priyanka.abdagire@finaleap.com,backupfiles.priyanka@gmail.com';
								// $send_email_to_5_members='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com';
								// $send_email_to_5_members='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com,vipul@finaleap.com,accounts@finaleap.com,support@finaleap.in';
				       		       $this->email->to($send_email_to_5_members);
								   $this->email->subject('Engagement Approved For Client : '.$client_name.''); 
								   $data2['data']=$data;
								  $data2['approved_by_name']=$approved_by_name;
								  $mailContent = $this->load->view('templates/Email',$data2,true);
								   //$mailContent = $this->load->view('templates/Email',$data,true);
								   $this->email->message($mailContent); 
	    						   $this->email->Send();
								   $Result_id1 = $this->HR_model->update_new_engagement_details($data['HR_ID'],$data['Form_id'],$data);
						           $response = array('msg' => "Approved");
						           echo json_encode($response);
					 }
					 else if($status=='Rework')
					 {
						    $existing_form = $this->input->post('Form_id');
							$data=array(
							'Form_id'=>$existing_form,
							'client_name'=>$this->input->post('Client_name'),
							'client_contact'=>$this->input->post('client_contact'),
							 'client_address'=>$this->input->post('client_address'),
							 'client_gst_number'=>$this->input->post('client_gst_number'),
							 'client_email_for_invoice'=>$this->input->post('client_email_for_invoice'),
							 'resource_name'=>$this->input->post('resource_name'),
							 'resourcPhone'=>$this->input->post('resourcPhone'),
							 'resource_role'=>$this->input->post('resource_role'),
							 'ResourceEmail'=>$this->input->post('ResourceEmail'),
							 'Engagement_start_date'=>$this->input->post('Engagement_start_date'),
							 'Engagement_end_date'=>$this->input->post('Engagement_end_date'),
							 'Billing_start_date'=>$this->input->post('Billing_start_date'),
							 'monthly_compensation'=>$this->input->post('monthly_compensation'),
							 'monthly_billing'=>$this->input->post('monthly_billing'),
							 'GST_applicable'=>$this->input->post('GST_applicable'),
							 'travel_expenses'=>$this->input->post('travel_expenses'),
							 'notes'=>$this->input->post('notes'),
							 'Engagement_submitter'=>$this->input->post('Engagement_submitter'),
							 'HR_ID'=>$this->input->post('HR_ID'),
							 'submission_date'=>date("Y-m-d"),
							 'Status'=>'Rework',
							   'Approved_by'=>$this->input->post('Approved_by'),
							  'Approved_on'=>date("Y-m-d"),
							   'status_notes'=>$this->input->post('status_notes'),
							    'resourceType'=>$this->input->post('resourceType')
							 );

							   $approved_by_id=$this->input->post('Approved_by'); 
							   $rework_notes=$this->input->post('status_notes');
							   $approved_by_user_info= $this->Operations_user_model->getProfileData($approved_by_id);
								if(!empty($approved_by_user_info))
								{
			
									if($approved_by_user_info->MN!='')
									{
										$approved_by_name=$approved_by_user_info->FN." ".$approved_by_user_info->LN;
									}
									else
									{
										$approved_by_name=$approved_by_user_info->FN." ".$approved_by_user_info->LN;
									}
								}
								else
								{
									$approved_by_name='';
								}
							      //$send_email_to_3_HR='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com,vipul@finaleap.com';
				       	            $send_email_to_3_HR='shiv@finaleap.com,amit@finaleap.com,vipul@finaleap.com';
							     //  $send_email_to_3_HR='piyuabdagire@gmail.com,priyanka.abdagire@finaleap.com,backupfiles.priyanka@gmail.com';
							   //  $send_email_to_5_members='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com,vipul@finaleap.com';
							    // $send_email_to_5_members='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com';
				       			  $this->email->to($send_email_to_3_HR);
								  $this->email->subject('Engagement Rework For client : '.$client_name.'');
								  $data2['data']=$data;
								  $data2['approved_by_name']=$approved_by_name;
								  $mailContent = $this->load->view('templates/Email',$data2,true);
								  $this->email->message($mailContent); 
	    						  $this->email->Send() ;
								  $Result_id1 = $this->HR_model->update_new_engagement_details($data['HR_ID'],$data['Form_id'],$data);
								  $response = array('msg' => "Rework");
						          echo json_encode($response);
					 }
					 else if($status=='In Draft')
					 {
						 $Generate_ID="FNLP_".rand(1000,9999);
						 $existing_form = $this->input->post('Form_id');
						 if(!empty($existing_form))
						 {
							 $data=array(
							 'Form_id'=>$existing_form,
							 'client_name'=>$this->input->post('Client_name'),
							 'client_contact'=>$this->input->post('client_contact'),
							 'client_address'=>$this->input->post('client_address'),
							 'client_gst_number'=>$this->input->post('client_gst_number'),
							 'client_email_for_invoice'=>$this->input->post('client_email_for_invoice'),
							 'resource_name'=>$this->input->post('resource_name'),
							 'resourcPhone'=>$this->input->post('resourcPhone'),
							 'resource_role'=>$this->input->post('resource_role'),
							 'ResourceEmail'=>$this->input->post('ResourceEmail'),
							 'Engagement_start_date'=>$this->input->post('Engagement_start_date'),
							 'Engagement_end_date'=>$this->input->post('Engagement_end_date'),
							 'Billing_start_date'=>$this->input->post('Billing_start_date'),
							 'monthly_compensation'=>$this->input->post('monthly_compensation'),
							 'monthly_billing'=>$this->input->post('monthly_billing'),
							 'GST_applicable'=>$this->input->post('GST_applicable'),
							 'travel_expenses'=>$this->input->post('travel_expenses'),
							 'notes'=>$this->input->post('notes'),
							 'Engagement_submitter'=>$this->input->post('Engagement_submitter'),
							 'HR_ID'=>$this->input->post('HR_ID'),
							 'submission_date'=>date("Y-m-d"),
							 'Status'=>'In Draft',
							 'resourceType'=>$this->input->post('resourceType')
							 );
						 }
						 else
						 {
							 $data=array(
							 'Form_id'=>$Generate_ID,
							 'client_name'=>$this->input->post('Client_name'),
							 'client_contact'=>$this->input->post('client_contact'),
							 'client_address'=>$this->input->post('client_address'),
							 'client_gst_number'=>$this->input->post('client_gst_number'),
							 'client_email_for_invoice'=>$this->input->post('client_email_for_invoice'),
							 'resource_name'=>$this->input->post('resource_name'),
							 'resourcPhone'=>$this->input->post('resourcPhone'),
							 'resource_role'=>$this->input->post('resource_role'),
							 'ResourceEmail'=>$this->input->post('ResourceEmail'),
							 'Engagement_start_date'=>$this->input->post('Engagement_start_date'),
							 'Engagement_end_date'=>$this->input->post('Engagement_end_date'),
							 'Billing_start_date'=>$this->input->post('Billing_start_date'),
							 'monthly_compensation'=>$this->input->post('monthly_compensation'),
							 'monthly_billing'=>$this->input->post('monthly_billing'),
							 'GST_applicable'=>$this->input->post('GST_applicable'),
							 'travel_expenses'=>$this->input->post('travel_expenses'),
							 'notes'=>$this->input->post('notes'),
							 'Engagement_submitter'=>$this->input->post('Engagement_submitter'),
							 'HR_ID'=>$this->input->post('HR_ID'),
							 'submission_date'=>date("Y-m-d"),
							 'Status'=>'In Draft',
							 'resourceType'=>$this->input->post('resourceType')
							 );
						 }

							$check_entry= $this->HR_model->check_engagement_entry($data['HR_ID'],$data['Form_id']);
							if($check_entry > 0)
							{
							     $Result_id1 = $this->HR_model->update_new_engagement_details($data['HR_ID'],$data['Form_id'],$data);
								 $response = array('msg' => "in_draft");
								 echo json_encode($response);
							}
							else 
							{
								$Result_id = $this->HR_model->save_new_engagement_details($data);
								 $response = array('msg' => "in_draft");
								 echo json_encode($response);
	    					}

					 }


		
	}

	
	//================================================================================

	
    public Function download_all_engagement_Excel_()
	{
		
				 $this->load->library('excel');
				 $all_engagements=$this->HR_model->get_all_engagements();
			

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
				$this->excel->getActiveSheet()->setTitle('Engagement list');

				$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
			

				$this->excel->getActiveSheet()->getStyle("A1:I1")->applyFromArray(array("font" => array("bold" => true)));

				$this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'Client Name');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'Resource Name');
				$this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'Monthly Consultant Compensation');
				$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'Monthly Billing to Client');
                $this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'Engagement start date');
                $this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'Engagement end date');
				$this->excel->setActiveSheetIndex(0)->setCellValue('H1', 'Billing start date');
				$this->excel->setActiveSheetIndex(0)->setCellValue('I1', 'Status');
			


				// get all users in array formate
              
				//$this->excel->getActiveSheet()->fromArray($users, null, 'A2');
                 $count=2;
				 $i=1;
				 foreach($all_engagements as $row)
				 {
					  $this->excel->getActiveSheet()->setCellValue('A'.$count,$i);
					  $this->excel->getActiveSheet()->setCellValue('B'.$count,$row->Client_name);
					  $this->excel->getActiveSheet()->setCellValue('C'.$count,$row->resource_name);
					  $this->excel->getActiveSheet()->setCellValue('D'.$count,$row->monthly_compensation);
					  $this->excel->getActiveSheet()->setCellValue('E'.$count,$row->monthly_billing);
                      $this->excel->getActiveSheet()->setCellValue('F'.$count,$row->Engagement_start_date);
                      $this->excel->getActiveSheet()->setCellValue('G'.$count,$row->Engagement_end_date);
					  $this->excel->getActiveSheet()->setCellValue('H'.$count,$row->Billing_start_date);
					  $this->excel->getActiveSheet()->setCellValue('I'.$count,$row->Status);
					  $count++; $i++;
				 }
				// read data to active sheet
				
				

				$filename='Finaleap_data.xlsx'; //save our workbook as this file name

				header('Content-Type: application/vnd.ms-excel'); //mime type

				header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name

				header('Cache-Control: max-age=0'); //no cache

				//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
				//if you want to save it as .XLSX Excel 2007 format

				$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');

				//force user to download the Excel file without writing it to server's HD
					//	ob_end_clean();
				$objWriter->save('php://output');
	}

}
?>