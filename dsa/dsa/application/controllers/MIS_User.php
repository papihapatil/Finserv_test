<?php
date_default_timezone_set('asia/kolkata');
defined('BASEPATH') OR exit('No direct script access allowed');

class MIS_User extends CI_Controller 
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
				$dashboard_data = $this->Admin_model->getDashboardData();        
                
            
                $data['dashboard_data'] = $dashboard_data;
                $this->load->view('dashboard_header', $data);
                $this->load->view('MIS_User/dashboard', $data); 
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
				//$this->load->model('Dsacustomers_model');
				//$customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
				//$_SESSION["data_for_excel"] =   $customers ;
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
				//$arr['customers'] = $customers;
			
				$arr['s'] = $filter;
				$this->load->view('dashboard_header', $data);
				
				$this->load->view('RCU/customers', $arr);
			}
		}
		


   }
?>