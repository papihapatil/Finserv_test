<?php
date_default_timezone_set('asia/kolkata');
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'views/razorpay/Razorpay.php';
use Razorpay\Api\Api;
class Admin extends CI_Controller {

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
        $this->load->model('Sales_Manager_model');
        $this->load->library('upload');
			$this->load->model('CustomerCrud_model');
			$this->load->model('Accountant_model');


    }
	
	public function encryption($original_string)
		{
			
//Encryption
//$original_string = "Hello! This is delftstack";  // Plain text/String
$cipher_algo = "AES-128-CTR"; //The cipher method, in our case, AES 
$iv_length = openssl_cipher_iv_length($cipher_algo); //The length of the initialization vector
$option = 0; //Bitwise disjunction of flags
$encrypt_iv = '8746376827619797'; //Initialization vector, non-null
$encrypt_key = "Delftstack!"; // The encryption key
// Use openssl_encrypt() encrypt the given string
$encrypted_string = openssl_encrypt($original_string, $cipher_algo,
			$encrypt_key, $option, $encrypt_iv);
			
			return $encrypted_string;



		}
		
		public function decryption($encrypted_string)
		{
			$cipher_algo = "AES-128-CTR"; //The cipher method, in our case, AES 
$iv_length = openssl_cipher_iv_length($cipher_algo); //The length of the initialization vector
			//Decryption
			
			$option = 0; //Bitwise disjunction of flags

$decrypt_iv = '8746376827619797'; //Initialization vector, non-null
$decrypt_key = "Delftstack!"; // The encryption key
// Use openssl_decrypt() to decrypt the string
$decrypted_string=openssl_decrypt ($encrypted_string, $cipher_algo,
		$decrypt_key, $option, $decrypt_iv);

//Display Strings
//echo "The Original String is: <br>" . $original_string. "<br><br>" ;
//echo "The Encrypted String is: <br>" . $encrypted_string . "<br><br>";
//echo "The Decrypted String is: <br>" . $decrypted_string;

return $decrypted_string;
			
		}

    public function index(){
        $this->load->helper('url');  
        $data['error'] = '';      
		
		$site = $this->session->userdata("SITE");
			if($site == 'finaleap')
			{
				

			$data['error'] = 'You logged in Finaleap please logout from Finaleap by clicking <a target="_blank" href="https://finaleap.com/dsa/dsa/index.php/logout" > here </a>';
			}
			else{
				$data['error'] = '';
			}
			
			
			
        $this->load->view('admin/login', $data);
    }
	public function profile(){
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;

		$customer_link = $this->input->get('customer_link');
		if ($customer_link == '')$customer_link = false;

		$data['userType'] = $this->session->userdata("USER_TYPE");
		//$this->load->view('header', $data);
		$this->load->model('Dsacrud_model');
				
		$id = $this->input->get('id');
		if($id == ''){
			$id = $this->session->userdata('ID');
			$profileArr['edit'] = 1;
		}else $profileArr['edit'] = 0;
		$dsa_banks=$this->Dsacrud_model->get_dsa_Banks($id);
		$profile_info = $this->Dsacrud_model->getProfileData($id);
        
		$profileArr['row'] = $profile_info;
		$profileArr['customer_link'] = $customer_link;
		$profileArr['id'] = $id;
		$profileArr['type'] = $this->input->get('type');
		$profileArr['dsa_banks']=$dsa_banks;
		$this->load->view('admin/profile_new', $profileArr);
	}
	public function update_basic_profile_dsa()
	{
		//$statle_str = file_get_contents(base_url('json/allCities.json'));
        //$state_json = json_decode($statle_str, true);
        //$states = array_keys($state_json);
		$this->load->model('Customercrud_model');
		$id = $this->input->get('id');
		if($id == ''){
			$id = $this->session->userdata('ID');
		}
		$data_row = $this->Customercrud_model->getProfileData($id);	
		$data_banks=$this->Dsacrud_model->get_all_Banks();
		$dsa_banks=$this->Dsacrud_model->get_dsa_Banks($id);
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['userType'] = "ADMIN";
		$data['row'] = $data_row;
		
		$data['AADHAR_NUMBER'] = $this->decryption($data_row->AADHAR_NUMBER);
				$data['dob'] = $this->decryption($data_row->DOB);
				 $data['PAN_NUMBER'] = $this->decryption($data_row->PAN_NUMBER);
				 
		$data['banks']=$data_banks;
		$data['dsa_banks']=$dsa_banks;
		
		//$data['states'] = $states;
		$this->load->view('header', $data);
		//print_r($data);exit;
		$this->load->view('admin/dsa_update_profile_one_new_dsa', $data);
	}

 /*public function dsa()
 {
       
       
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' ){
            redirect(base_url('index.php/admin'));
        }
        else{
             $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			 if ($s == '') {
                $s= 'all';
            }
			if ($s == 'Complete') {
                $s = 'Complete';
            }
			if ($s == 'Incomplete') {
                $s = 'Incomplete';
            }
			if ($s == 'city') {
                $s = 'city';
            }
            $bank = $this->input->get('bnk_name');
			$city = $this->input->get('city_name');
            $dsa_arr = $this->Admin_model->getDsaList($s, $bank ,$city);
			          
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['data'] = $dsa_arr;
            $data['userType'] = $this->session->userdata('USER_TYPE');
            //$this->load->view('header', $data);             
            $banks = $this->Admin_model->getBanks();
			$cities = $this->Admin_model->getCity();
            $data['banks'] = $banks;
			$data['cities']=$cities ;
            $this->load->view('admin/dsa', $data);   
        }    
    }*/

	 public function Manager(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
             $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            if($s==''){
				$s='all';
			}
            //$dsa_arr = $this->Admin_model->getManagerList($s);
           // $_SESSION["data_for_excel"] =$dsa_arr ;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            //$data['data'] = $dsa_arr;
            $data['userType'] = $this->session->userdata('USER_TYPE');
            //$this->load->view('header', $data);             
            $banks = $this->Admin_model->getBanks();
            $data['banks'] = $banks;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/manager_PG', $data);
          //  $this->load->view('admin/manager', $data);   
        }        
    }
     public function csr()
	{
		
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'csr' || $this->session->userdata('SITE') != 'finserv')
		{		
            redirect(base_url('index.php/login'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s=='')
			{
				$s='all';
			}
		
	        $Credit_manager_user_arr = $this->Admin_model->get_Csr_user($s);
            $_SESSION["data_for_excel"] =$Credit_manager_user_arr ;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
			$cities = $this->Admin_model->getCsrCity();
           	$data['cities']=$cities ;
            $data['data'] =$Credit_manager_user_arr;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/csr', $data);   
			
        }        
	}
	
	
	/*---------------------------------------Added by papiha-----------------------------------------------------*/
     public function Regional_Manager_Finserv()
	 {
		  
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s=='')
			{
				$s='all';
			}
     	    $Area_Manager_arr = $this->Admin_model->getRegional_Manager($s);
            $_SESSION["data_for_excel"] = $Area_Manager_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['data'] =$Area_Manager_arr;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/Regional_Manager', $data);   
			
        }      
	 }

	
	
	 /*---------------------------------------Added by papiha-----------------------------------------------------*/
     public function Regional_Manager()
	 {
		  
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finaleap'){
            redirect(base_url('index.php/admin'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s=='')
			{
				$s='all';
			}
     	    $Area_Manager_arr = $this->Admin_model->getRegional_Manager($s);
            $_SESSION["data_for_excel"] = $Area_Manager_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['data'] =$Area_Manager_arr;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/Regional_Manager', $data);   
			
        }      
	 }

    public function credit_manager_user()
	{
		
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('SITE') != 'finserv')
		{		
            redirect(base_url('index.php/login'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');

            //$Credit_manager_user_arr = $this->Admin_model->getCredit_manager_user($s);
            //$_SESSION["data_for_excel"] =$Credit_manager_user_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           // $data['data'] =$Credit_manager_user_arr;
            $this->load->view('admin/admin_dashbord', $data);
          //  $this->load->view('admin/Credit_manager_users', $data);
          $this->load->view('admin/Credit_manager_users_PG',$data)   ;
			
        }        
	}
    
	  
    public function Operations_user()
    {
         if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'Operations_user' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
             $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');

            $search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');
            if(!empty($search_))
            {
                $s='search';
                $search_name =$this->input->post('filter_name');    
            }
            else if (!empty($select_filters))
            {
                $s=$select_filters;
                $search_name=""; 
            }
            else
            {
                $s=$this->input->get('s');
                $search_name="";
            }

             if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['End_Date'];
         }
         else{
             $data['End_Date']='';
         }
         if(isset($_GET['filter']))
         {
                 $filter=$_GET['filter'];
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

          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
          $filter_location = $this->Admin_model->getLocationByData();
          $data['filter_location']=$filter_location ;
            //$Operations_user_arr = $this->Admin_model->getOperations_user($s,$search_name);
           // $_SESSION["data_for_excel"] =$Operations_user_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           // $data['data'] = $Operations_user_arr;
            $this->load->view('admin/admin_dashbord', $data);
          //  $this->load->view('admin/Operations_user', $data);   
          $this->load->view('admin/Operations_user_PG', $data);  
            
        }        
    }

	

    public function dashboard(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $dashboard_data = $this->Admin_model->getDashboardData();            
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['dashboard_data'] = $dashboard_data;
            $data['userType'] = $this->session->userdata('USER_TYPE');
            //$this->load->view('header', $data);
                $this->load->view('admin/admin_dashbord', $data); 
            $this->load->view('admin/index', $data);
        }
    }

    public function customers(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
            $id = $this->input->get('id');
            if($id == '')$id = $this->session->userdata('ID');
            $userType = $this->input->get('userType');
            $date = $this->input->get('date');
            $userType2 = $this->input->get('userType2');
            if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
            $filter = $this->input->get('s');
            //$Start_Date = $this->input->get('SD');
            //$End_Date = $this->input->get('ED');
            $search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');
             //echo  $select_filters;
             //exit();
         
            if(!empty($search_))
			{
                $filter='search';
				$search_name =$this->input->post('filter_name');	
			}
         	else if (!empty($select_filters))
            {
                $filter=$select_filters;
                $search_name=""; 
            }
            else
			{
                $filter= $this->input->get('s');
				$search_name="";
			}

            $this->load->helper('url');
            $this->load->model('Dsacustomers_model');
            $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date,$search_name);
            $customer_created_by=$this->Dsacustomers_model->getCustomer_created_by();
            $_SESSION["data_for_excel"] =  $customers ;
            $_SESSION["customer_created_by"] =  $customer_created_by ;
            $_SESSION['file_name']='Customer List';

            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['userType'] = $this->session->userdata("USER_TYPE");          
            //$this->load->view('header', $data);

            $arr['userType'] = $userType;
            $arr['customers'] = $customers;
            $arr['customer_created_by'] = $customer_created_by;
            $arr['s'] = $filter;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/customers', $arr);
        }
    }
	 public function payment_report(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
            $id = $this->input->get('id');
            if($id == '')$id = $this->session->userdata('ID');
            $userType = $this->input->get('userType');
            $date = $this->input->get('date');
            $userType2 = $this->input->get('userType2');
            if ($userType == '')$userType = $this->session->userdata("USER_TYPE");

            $filter = $this->input->get('s');
            if ($filter == '') {
                $filter = 'all';
            }
            $this->load->helper('url');
            $this->load->model('Dsacustomers_model');
            $customers = $this->Admin_model->getPayments($filter,$date);
            $age = $this->session->userdata('AGE');
            $arr['showNav'] = 1;
            $arr['age'] = $age;
            $arr['userType'] = $this->session->userdata("USER_TYPE");          
            //$this->load->view('header', $data);

            $arr['userType'] = $userType;
            $arr['customers'] = $customers;
            $arr['s'] = $filter;
            $this->load->view('admin/admin_dashbord', $arr);
            $this->load->view('admin/payment', $arr);
        }
    }
	 public function aadhar_esign_report(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
            $id = $this->input->get('id');
            if($id == '')$id = $this->session->userdata('ID');
            $userType = $this->input->get('userType');
            $date = $this->input->get('date');
            $userType2 = $this->input->get('userType2');
            if ($userType == '')$userType = $this->session->userdata("USER_TYPE");

            $filter = $this->input->get('s');
            if ($filter == '') {
                $filter = 'all';
            }
            $this->load->helper('url');
            $this->load->model('Dsacustomers_model');
            $customers = $this->Admin_model->get_aadhar_esign_report($filter,$date);
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['userType'] = $this->session->userdata("USER_TYPE");          
            //$this->load->view('header', $data);

            $arr['userType'] = $userType;
            $arr['customers'] = $customers;
            $arr['s'] = $filter;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/aadhar_esign_report', $arr);
        }
    }
	
    public function manage_documents_type(){
                
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
            $doc_types = $this->Admin_model->getDocTypeList();
            //$this->load->view('header', $data);
            $data['documents'] = $doc_types;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/manage_documents_type', $data);
        }
    }

    public function manage_banks(){
        
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
            $doc_types = $this->Admin_model->getBanks();
            //$this->load->view('header', $data);
            $data['banks'] = $doc_types;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/manage_banks', $data);
        }
    }

      public function Loan_types(){
        
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
            $Loan_types = $this->Admin_model->get_loan_types();
            //$this->load->view('header', $data);
            $data['Loan_types'] = $Loan_types;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/manage_loan_types', $data);
        }
    }

    public function new_doc_type(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
            $this->load->view('header', $data);
            $this->load->view('admin/new_doc_type');
        }
    }

    public function new_admin_bank(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
            //  $this->load->view('header', $data);
            $this->load->view('admin/new_bank');
        }
    }
	 public function new_loan_type(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
            //  $this->load->view('header', $data);
            $this->load->view('admin/new_loan_type');
        }
    }

  public function credit_buerau_price(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
			$data['credit_buerau_price'] = $this->Admin_model->get_credit_buerau_price();
		   
             //$this->load->view('header', $data);
             $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/credit_buerau_price',$data);
        }
    }
	 public function loan_application_fees(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
			$data['loan_application_fees'] = $this->Admin_model->get_loan_application_price();
		   
             //$this->load->view('header', $data);
             $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/loan_application_fees',$data);
        }
    }
	 public function aadhar_esign_price(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
			$data['aadhar_esign_price'] = $this->Admin_model->get_aadhar_esign_price();
		   
             //$this->load->view('header', $data);
             $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/aadhar_esign_price',$data);
        }
    }
	 public function credit_buerau_price_action(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $array_input = array(
                'price' => $this->input->post('price'),            
            );
           
            $idS = $this->Admin_model->update_credit_buerau_price($array_input);
            if($idS > 0){   
                $response = array('status' => $idS, 'message' => " Credit Buerau Price save successfully");
                echo json_encode($response);
            }else {
                $response = array('status' => $idS, 'message' => "Error in Credit Buerau Price save");
                echo json_encode($response);
            }
        }
    }
	 public function loan_application_fees_action(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $array_input = array(
                'price' => $this->input->post('price'),            
            );
           
            $idS = $this->Admin_model->update_loan_application_fees($array_input);
            if($idS > 0){   
                $response = array('status' => $idS, 'message' => "Loan Apllication Fess save successfully");
                echo json_encode($response);
            }else {
                $response = array('status' => $idS, 'message' => "Error in Loan application fees save");
                echo json_encode($response);
            }
        }
    }
	 public function aadhar_esign_price_action(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $array_input = array(
                'price' => $this->input->post('price'),            
            );
           
            $idS = $this->Admin_model->update_aadhar_esign_price($array_input);
            if($idS > 0){   
                $response = array('status' => $idS, 'message' => "Aadhar Esign Price save successfully");
                echo json_encode($response);
            }else {
                $response = array('status' => $idS, 'message' => "Error in Aadhar Esign Price save");
                echo json_encode($response);
            }
        }
    }
	public function credit_buerau_pull_chances(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
			$data['credit_buerau_pull_chances'] = $this->Admin_model->get_credit_buerau_pull_chances();
		   
             //$this->load->view('header', $data);
             $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/credit_buerau_pull_chances',$data);
        }
    }
	public function aadhar_esign_pull_chances(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
			$data['aadhar_esign_pull_chances'] = $this->Admin_model->get_aadhar_pull_chances();
		   
             //$this->load->view('header', $data);
             $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/aadhar_esign_pull_chances',$data);
        }
    }
	 public function refund_money()
	 {
		  if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
			
		   
             //$this->load->view('header', $data);
             $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/refund_money',$data);
        }
	 }
	  public function refund_money_aadhar()
	 {
		  if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
			
		   
             //$this->load->view('header', $data);
             $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/refund_money_aadhar',$data);
        }
	 }
	 public function credit_buerau_pull_chances_action(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $array_input = array(
                'chance' => $this->input->post('chance'),            
            );
           
            $idS = $this->Admin_model->update_credit_buerau_chances($array_input);
            if($idS > 0){   
                $response = array('status' => $idS, 'message' => " Credit Buerau Pull Chances save successfully");
                echo json_encode($response);
            }else {
                $response = array('status' => $idS, 'message' => "Error in Credit Buerau Pull Chances save");
                echo json_encode($response);
            }
        }
    }
	 public function aadhar_esign_pull_chances_action(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $array_input = array(
                'chance' => $this->input->post('chance'),            
            );
           
            $idS = $this->Admin_model->update_aadhar_esign_chances($array_input);
            if($idS > 0){   
                $response = array('status' => $idS, 'message' => "Aadhar E-sign Pull Chances save successfully");
                echo json_encode($response);
            }else {
                $response = array('status' => $idS, 'message' => "Error in Aadhar E-sign Pull Chances save");
                echo json_encode($response);
            }
        }
    }
    public function delete_doctype(){
        
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $array_input = array(
                'ID' => $this->input->post('id')        
            );      
            
            $id = $this->Admin_model->delete_doctype($array_input);
            if($id > 0){            
                $response = array('status' => 1, 'message' => 'Document type deleted successfully');
                echo json_encode($response);
            }else {
                $response = array('status' => 0, 'message' => 'Error in document type delete');
                echo json_encode($response);
            }
        }        
    }

    public function load_district(){
        $name = $this->input->get('name');
        $required = $this->input->get('req');
        $state = $this->input->post('country');
        $statle_str = file_get_contents(base_url('json/allCities.json'));
        $state_json = json_decode($statle_str, true);
        $states = array_keys($state_json[$state]);
        $str_arr = '';
        $str_arr.="<select class='".$name."' required style='background-color:#F8F8F8; border:none' name='".$name."' id='".$name."'>";
        $str_arr.="<option value=''>"."District"."</option>";
        foreach($states as $value){
            $str_arr.="<option value='".$value."'>". $value . "</option>";
        }
        $str_arr.="</select>";            
        echo $str_arr;
    }

    public function load_city(){
        $name = $this->input->get('name');
        $required = $this->input->get('req');
        $state = $this->input->post('country');
        $district = $this->input->post('district');
        $statle_str = file_get_contents(base_url('json/allCities.json'));
        $state_att = json_decode($statle_str, true);
        $state_obj = $state_att[$state];
        $districts = $state_obj[$district];
        $str_arr = '';
        $str_arr.="<select class='".$name."' required style='background-color:#F8F8F8; border:none' name='".$name."' id='".$name."'>";
        $str_arr.="<option value=''>"."City"."</option>";
        foreach($districts as $value){
            $str_arr.="<option value='".$value."'>". $value . "</option>";
        }
        $str_arr.="</select>";            
        echo $str_arr;
    }

    public function delete_admin_bank(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $array_input = array(
                'ID' => $this->input->post('id')        
            );      
            
            $id = $this->Admin_model->delete_bank($array_input);
            if($id > 0){            
                $response = array('status' => 1, 'message' => 'Bank deleted successfully');
                echo json_encode($response);
            }else {
                $response = array('status' => 0, 'message' => 'Error in bank delete');
                echo json_encode($response);
            }
        }
    }
	public function delete_Loan_type(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $array_input = array(
                'ID' => $this->input->post('id')        
            );      
            
            $id = $this->Admin_model->delete_loan_type($array_input);
            if($id > 0){            
                $response = array('status' => 1, 'message' => 'Loan Type deleted successfully');
                echo json_encode($response);
            }else {
                $response = array('status' => 0, 'message' => 'Error in Loan type delete');
                echo json_encode($response);
            }
        }
    }


    public function new_doctype_action(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
			$doc=$this->input->post('doc_type');
			
			foreach ($doc as $selectedOption)
			{
				$array_input = array(
					'DOC_NAME' => $this->input->post('doc_name'),
					'DOC_FOR' => $this->input->post('doc_for'),   
					'DOC_MANDATORY' => $this->input->post('doc_mandatory'),
					'DOC_MASTER_TYPE' => $selectedOption, 
					'INCOME_SRC'=>$this->input->post('INCOME_SRC')				
				);
				
				$idS = $this->Admin_model->saveDocType($array_input);
				
				
			}
			
            if($idS > 0){   
                $response = array('status' => $idS, 'message' => "Document Type saved successfully");
                echo json_encode($response);
            }else {
                $response = array('status' => $idS, 'message' => "Error in Document Type save");
                echo json_encode($response);
            }
        }
    }

    public function new_admin_bank_action(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $array_input = array(
                'BANK_NAME' => $this->input->post('bank_name'),            
            );
            
            $idS = $this->Admin_model->saveBank($array_input);
            if($idS > 0){   
                $response = array('status' => $idS, 'message' => "Bank saved successfully");
                echo json_encode($response);
            }else {
                $response = array('status' => $idS, 'message' => "Error in bank save");
                echo json_encode($response);
            }
        }
    }
	  public function new_loan_type_action(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $array_input = array(
                'loan_type' => $this->input->post('loan_type'),            
            );
            
            $idS = $this->Admin_model->loan_type($array_input);
            if($idS > 0){   
                $response = array('status' => $idS, 'message' => "Loan type saved successfully");
                echo json_encode($response);
            }else {
                $response = array('status' => $idS, 'message' => "Error in Loan type save");
                echo json_encode($response);
            }
        }
    }

    public function strategic_partner(){
        $partner = $this->input->get('partner');
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $array_input = array(
                'IS_STRATEGIC_PARTNER' => $partner,            
            );
            
            $id = $this->input->get('id');
            $idS = $this->Admin_model->strategic_partner($id, $array_input);
            if($idS > 0){
                $message = "DSA successfully converted to strategic partner";
                if($partner == 0)$message = "DSA removed from strategic partner";   
                $response = array('status' => $idS, 'message' => $message);
                echo json_encode($response);
            }else {
                $response = array('status' => $idS, 'message' => "Error please try again.");
                echo json_encode($response);
            }
        }
    }

    public function logmein(){
        $this->load->helper('url'); 
        $data = array('EMAIL' => $this->input->post("email"), 'PASSWORD' => $this->input->post("pass"));
        $res = $this->Admin_model->login($data);
        $err_message = '';
        if ($res == 5) {
            $this->session->set_userdata("USER_TYPE", "ADMIN");
            redirect(base_url('index.php/admin/dashboard'));
        }else if($res == 10){
            $err_message = 'INVALID EMAIL/MOBILE AND PASSWORD';
        }else if($res == 11){
            $err_message = 'INVALID EMAIL/MOBILE';
        }else if($res == 12){
            $err_message = 'INVALID PASSWORD';
        }else $err_message = 'INVALID EMAIL/MOBILE AND PASSWORD';

        $data['error'] = $err_message;
        $this->load->view('admin/login', $data);     
    }
	public function pan()
	{
		

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://signzy.tech/api/v2/patrons/5f6ed17f0d997a9a4febf8e6/identities",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\"type\":\"individualPan\",\"callbackUrl\":\"http://localhost/dsa/dsa/index.php/admin/pancall\",\"email\":\"maheshkumawat2020@gmail.com\",\"images\":[]}",
		                       
		  CURLOPT_HTTPHEADER => array(
			"accept: */*",
			"accept-language: en-US,en;q=0.8",
			"authorization: 4XfrmiypqxENgt1OesgYimnVMKDrKrGKHxEKNSVmexLDirD6ksvOPMIWPitP6sRY",
			"content-type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
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
			//$this->load->view('header', $data);
			$id = $this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$dashboard_data = $this->Dsacrud_model->getDashboardData($id);            
			$data['dashboard_data'] = $dashboard_data;
		$this->load->view('admin/Create_lead', $data);
	}
	public function add_new_lead ()
	{           
	            // require_once('./PHPExcel/Classes/PHPExcel.php');
				$MANAGER_ID=0;
				$CSR_ID=0;
				if ($this->session->userdata('USER_TYPE') == 'DSA_MANAGER') {
					$MANAGER_ID = $this->session->userdata('ID');
				}else if ($this->session->userdata('USER_TYPE') == 'DSA_CSR') {
					$CSR_ID= $this->session->userdata('ID');
					$MANAGER_ID= $this->Dsacrud_model->getManagerId($this->session->userdata('ID'));
				} 		
				if ($this->session->userdata('USER_TYPE') == 'DSA_MANAGER' || $this->session->userdata('USER_TYPE') == 'DSA_CSR'  || $this->session->userdata('SITE') != 'finserv') {
					$id=$this->session->userdata('ID');
					$DSA_ID = $this->Dsacrud_model->getDsaId($id);				
				}else if ($this->session->userdata('USER_TYPE') == 'ADMIN') {
					$DSA_ID  = 0;
				}
				else{
					$DSA_ID=$this->session->userdata('ID');
				}
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
							   $inserdata[$i]['DSA_ID']=$DSA_ID;
							   $inserdata[$i]['MANAGER_ID']=$MANAGER_ID;
							   $inserdata[$i]['CSR_ID']=$CSR_ID;

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
	public function View_Lead(){
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
        	$id = $this->input->get('id');
			if($id == '')$id = $this->session->userdata('ID');
			$userType = $this->input->get('userType');
			$date = $this->input->get('date');
			$userType2 = $this->input->get('userType2');
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");

			$filter = $this->input->get('s');
			if ($filter == '') {
				$filter = 'all';
			}
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			$customers = $this->Dsacustomers_model->getLead($id, $filter, $userType, $userType2, $date);
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");			
			//$this->load->view('header', $data);

			//echo $this->session->userdata('USER_TYPE');
			$arr['userType'] = $userType;
			$arr['customers'] = $customers;
			$arr['s'] = $filter;
            $this->load->view('admin/admin_dashbord', $data);
			if($this->session->userdata('USER_TYPE') == 'DSA')$this->load->view('dsa/View_lead', $arr);
			else if($this->session->userdata('USER_TYPE') == 'DSA_MANAGER')$this->load->view('manager/View_lead', $arr);
			else if($this->session->userdata('USER_TYPE') == 'ADMIN')$this->load->view('admin/View_lead', $arr);
		}
	}
	public function Change_Contact_Status()
	{
		$DSA_ID = $this->session->userdata('ID');
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
				//$this->View_Lead();
				redirect('manager/View_Lead');
			}
			
		    else  if($id_email_exist > 0){
				$this->session->set_flashdata("result", 2);
				$this->session->set_flashdata("message",'Email id already in use' );
				//$this->View_Lead();
				redirect('manager/View_Lead');
				
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
										'DSA_ID' => $DSA_ID,
										'login_count'=>0
														
										);
					$result = $this->Dsacrud_model->register_screen_one($array_input);
					$fourRandomDigit=rand(1000,100000);
					if($result > 0){	
						   $login_details = "Login Credentials are : Email : ".$email." Password : ".$rnd_password;
						   $message_to_send='Thank you for your interest in Finaleap, Please Click On Link And Fill your details.'.$login_details;
						   $data=array('status'=>'Convert to Customer');
						    $this->Dsacrud_model->update_lead($row->id,$data);
						$this->sendsms($row->mobile,$message_to_send );
						$this->sendEmail($row->mobile, $row->email, $rnd_password, $type,$unique_code);
						$this->session->set_flashdata("result", 3);
				        $this->session->set_flashdata("message",'Customer entry created successfully and credentials has beed sent to customers email-id and mobile number' );
						redirect('manager/View_Lead');
						}
						else
						{
							$this->session->set_flashdata("result", 4);
							$this->session->set_flashdata("message",'Error in Save Customer Details' );
						    redirect('manager/View_Lead');
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
				  redirect('manager/View_Lead');
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
				  redirect('manager/View_Lead');
			   }
			   
		}
		
        		
	}
	
	public function delete_customer()
	{
		$id= $this->input->post('id');
		$cust_row = $this->Customercrud_model->getProfileData($id);
		$result=$this->Admin_model->delete_customer($id);
		if($result > 0)
		{
			$this->session->set_flashdata("result", 1);
			 $this->session->set_flashdata("message",'Customer Deleted Sucessfully' );
			 redirect('admin/customers');
		}
		else
		{
			$this->session->set_flashdata("result", 2);
			 $this->session->set_flashdata("message",'Something get Wrong' );
			 redirect('admin/customers');
		}

	} 
	public function delete_DSA()
	{
         if($this->session->userdata('USER_TYPE') != 'ADMIN')
         {
              redirect(base_url('index.php/login'));
		       
         }
         else
         {
              $id= $this->input->post('id');
	          $result=$this->Admin_model->delete_customer($id);
		        if($result > 0)
		        {
			        $this->session->set_flashdata("result", 1);
			         $this->session->set_flashdata("message",'DSA Deleted Sucessfully' );
			         redirect('admin/dsa?s=all');
		        }
		        else
		        {
			        $this->session->set_flashdata("result", 2);
			         $this->session->set_flashdata("message",'Something get Wrong' );
			         redirect('admin/dsa?s=all');
		        }
         }


	}
	public function delete_CSR()
	{
		$id= $this->input->post('id');
		
		$result=$this->Admin_model->delete_customer($id);
		if($result > 0)
		{
			$this->session->set_flashdata("result", 1);
			 $this->session->set_flashdata("message",'CSR Deleted Sucessfully' );
			 redirect('admin/CSR');
		}
		else
		{
			$this->session->set_flashdata("result", 2);
			 $this->session->set_flashdata("message",'Something get Wrong' );
			 redirect('admin/CSR');
		}

	}
	public function delete_Manager()
	{
		$id= $this->input->post('id');
		
		$result=$this->Admin_model->delete_customer($id);
		if($result > 0)
		{
			$this->session->set_flashdata("result", 1);
			 $this->session->set_flashdata("message",'Manager Deleted Sucessfully' );
			 redirect('admin/Manager');
		}
		else
		{
			$this->session->set_flashdata("result", 2);
			 $this->session->set_flashdata("message",'Something get Wrong' );
			 redirect('admin/Manager');
		}

	}
	public function delete_Operational_user()
	{
		$id= $this->input->post('id');
		
		$result=$this->Admin_model->delete_customer($id);
		if($result > 0)
		{
			$this->session->set_flashdata("result", 1);
			 $this->session->set_flashdata("message",'Operational User Deleted Sucessfully' );
			 redirect('admin/Operations_user?s=all');
		}
		else
		{
			$this->session->set_flashdata("result", 2);
			 $this->session->set_flashdata("message",'Something get Wrong' );
			 redirect('admin/Operations_user?s=all');
		}

	}
	public function pancall()
	{
		echo "pan call back";
	}


    public function customer_applied_loan()
	{
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'csr' || $this->session->userdata('SITE') != 'finserv')
		{		
            redirect(base_url('index.php/login'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $search_name ='';
            $search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');

            if(!empty($search_))
			{
				$s='search';
				$search_name =$this->input->post('filter_name');	
			}
            else if(!empty($select_filters))
            {
                $s=$select_filters;
                $search_name="";
            }
			else
			{
				$s ='all';
				$search_name="";
			}
		
            $customer_applied_loan = $this->Admin_model->get_customer_applied_loan($s,$search_name);
			
            $data['showNav'] = 1;
            $data['age'] = $age; 
            $data['s'] = $s;
		    $data['data'] =$customer_applied_loan;
            $this->load->view('admin/customer_applied_loan', $data);   
			
        }        
	}

    //================================code by priyanka ========================================
    public function HR()
	{
		
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR' || $this->session->userdata('SITE') != 'finserv')
		{		
            redirect(base_url('index.php/login'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
           // $HR_user_arr = $this->Admin_model->HR($s);
           // $_SESSION["data_for_excel"] =$HR_user_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           // $data['data'] =$HR_user_arr;
            $this->load->view('admin/admin_dashbord', $data);             
           // $this->load->view('admin/HR', $data);  
           $this->load->view('admin/HR_PG', $data);  
			
        }        
	}

    public function credit_bureau_reports(){
                
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');

           // added by priya 23-04-2022
              $filter_branch_name = $this->input->get('B');
              $filter_Start_Date = $this->input->get('SD');
              $filter_End_Date = $this->input->get('ED');


            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
	
            $search_=$this->input->post('select_filters');
           // echo   $search_;
            //exit();

			if(isset($search_))
			{
            // echo   $search_;
            //exit();
				$filter='search';
				$search_name =$this->input->post('select_filters');	
			}
			else
			{
				$filter = '';
				$search_name="";
			}
            $customers = $this->Admin_model->getCustomersList($filter,$search_name,   $filter_branch_name ,  $filter_Start_Date, $filter_End_Date);
            $data['idccr_users'] = $this->Admin_model->get_idccr_users();
            //$this->load->view('header', $data);
            $data['customers'] = $customers;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/show_credit_bureau_reports', $data);
        }
    }


    public function pdf(){
		
        $id=$this->input->get("ID");
       // echo $id;
        //exit();
        $respnse=$this->Admin_model->get_credit_score($id);
        
        // echo json_decode($respnse->response,true);
        // exit();
         

         if($respnse)
         {
         $dataArr = json_decode($respnse->response,true);
         $data['score_success']=$respnse->score_success;
         //echo "<pre>";
         //print_r( $dataArr );
        // echo "</pre>";
        // exit();
         }
         else
         {
             $dataArr='';
             $data['score_success']='';
         }
         
   //  echo "<pre>";
   //  print_r($dataArr);
   // echo "</pre>";
      //$respnse->response
    // exit;
        $data['response']=$dataArr;
       
       
       include("./vendor/autoload.php");
       $mpdf = new \Mpdf\Mpdf([
           'setAutoTopMargin' => 'stretch',
           'autoMarginPadding' => 10,
           'orientation' => 'P'
       ]);
       $arrContextOptions=array(
           "ssl"=>array(
               "verify_peer"=>false,
               "verify_peer_name"=>false,
           ),
       );  
 $mpdf->curlAllowUnsafeSslRequests = true;
       $mpdf->SetHTMLHeader($this->load->view('pdf/IDCCR_header',$data,true));
       $mpdf->SetHTMLFooter($this->load->view('pdf/IDCCR_footer',[],true));
       $mpdf->SetDisplayMode('fullwidth');
       $mpdf->debug = true;
       $mpdf->AddPage('P');
       $stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
       $stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));

       $mpdf->WriteHTML($stylesheet,1);
       $mpdf->list_indent_first_level = 0;
       $html = $this->load->view('pdf/IDCCR_report_pdf',$data,true);
       $mpdf->WriteHTML($html);
       $file_name=md5(rand()).'pdf';
      // ob_end_clean();
       $file=$mpdf->Output();
     }

     public function loan_application_status()
     {
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
            $date = $this->input->get('date');
            $filter = $this->input->get('s');

            



			if ($filter == '') {
				$filter = 'all';
			}
            if($filter == 'Accepted')
            {
                $filter = 'Accepted';
            }
            if($filter == 'Rejected')
            {
                $filter = 'Rejected';
            }
            if($filter == 'Progress')
            {
                $filter = 'Progress';
            }
            if($filter == 'hold')
            {
                $filter = 'hold';
            }
			$this->load->helper('url');
			$this->load->model('Dsacustomers_model');
			$customers = $this->Admin_model->getCustomers_loan_application($filter,$date);
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			//$data['userType'] = $this->session->userdata("USER_TYPE");			
			$arr['userType'] = $this->session->userdata("USER_TYPE");
			$arr['customers'] = $customers;
			$arr['s'] = $filter;
          
            
            $this->load->view('admin/loan_application_status_customers', $arr);
        }
     }
     public function sendsms(){

        //$id = $this->input->get("ID");
        //echo $id;
        //exit();
	    //$mobileno="9325983064";
        //$mobileno=$data['mobileno']; 
        $OTP=rand(1000,10000);
		 $this->session->set_tempdata('OTP', $OTP, 600);
		 $var="FINPL000255";
        // $message='Your one time login password for Finaleap is '.$OTP.'. This password will be valid for 10 min';
        $message='Dear Customer, \nThank you for choosing FINALEAP. We regret to Inform that Your Loan Application No'.$OTP.' is rejected based on Current Assessment';
         $message = urlencode($message);
         $sender = 'FINALP'; 
         $apikey = '975cgeoe8x043trf759q7160r99060j02l';
         $baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;

          $url = $baseurl.'&sender='.$sender.'&to='.$mobileno.'&message='.$message;    
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_POST, false);
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $response = curl_exec($ch);
         curl_close($ch);

    // Use file get contents when CURL is not installed on server.
    if(!$response){
        
        $response = array
        ( 'msg'=>'fail',
        );
		echo json_encode($response);
    }
	else
	{
        echo $response ;
		$response = array
        ( 'msg'=>'sucess',
        );
		echo json_encode($response);
	}
    
    }

    public function sendreject_sms(){
	  
        $id = $this->input->get("ID");
        $mobileno=$this->input->get("mob");
        $result_id_row = $this->Customercrud_model->find_customer_entry_id($id);
        $var=$result_id_row->Application_id;
        $date_time =$result_id_row->CREATED_AT;
        $message='Dear Customer, \nThank you for choosing FINALEAP. We regret to Inform that Your Loan Application No '.$var.' is rejected based on Current Assessment';
        $message = urlencode($message);
        $sender = 'FINALP'; 
        $apikey = '975cgeoe8x043trf759q7160r99060j02l';
        $baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;
        $url = $baseurl.'&sender='.$sender.'&to='.$mobileno.'&message='.$message;    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
      // Use file get contents when CURL is not installed on server.
       if(!$response)
       {   //echo $response ;
           $response = array
           ( 'msg'=>'fail',
           );
       }
       else
       {
           //echo $response;
           $array_input_more = array(
           'CUST_ID' => $id,
           'message_status'=>"Success",
           );							
           $result_id1 = $this->Customercrud_model->update_loan_application_id($id, $array_input_more,$date_time);
           redirect("https://finaleap.com/dsa/dsa/index.php/Admin/loan_application_status?s=all");
       }
   
   }


    public function View_DSA_profile()
    {
       //$data['userType'] = $this->session->userdata("USER_TYPE");
       //$this->load->view('header', $data);
       if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
           redirect(base_url('index.php/admin'));
       }else{
           $this->load->helper('url');
           $type = $this->input->get('type');
           $age = $this->session->userdata('AGE');
           $data['showNav'] = 1;
           $data['age'] = $age;
           $data['type'] = $type;
           $data['userType'] = $this->session->userdata("USER_TYPE");
       $this->load->model('Dsacrud_model');
               
       $id = $this->input->get('ID');
       //echo $id;
       //exit();
       $dsa_banks=$this->Dsacrud_model->get_dsa_Banks($id);
       $profile_info = $this->Dsacrud_model->getProfileData($id);
       $profileArr['row'] = $profile_info;
       //$profileArr['customer_link'] = $customer_link;
       $profileArr['id'] = $id;
       $profileArr['type'] = $this->input->get('type');
       $profileArr['dsa_banks']=$dsa_banks;
       $this->load->view('admin/view_dsa_profile', $profileArr);
       }
    }

    /*public function Connector()
	{
       	
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'Connector')
		{		
            redirect(base_url('index.php/login'));
        }
		else
		{
			if($this->session->userdata('USER_TYPE') == 'branch_manager')
			{
			}
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');
           // echo  $select_filters;
            //exit();
            if(!empty($search_))
			{
				$s='search';
				$search_name =$this->input->post('filter_name');	
			}
            else if(!empty($select_filters))
            {
                $s=$select_filters;
                $search_name="";
            }
			else
			{
				$s = $this->input->get('s');
				$search_name="";
			}

			$id = $this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($id);
			if($this->session->userdata('USER_TYPE') == 'branch_manager')
			{
				$Connector_arr = $this->Admin_model->getConnector_branchManger($s,$id,$search_name);
			}
            else if(!empty($BM_ID= $this->input->get('BM_ID')))
            { 
                 $BM_ID=$this->input->get('BM_ID');
                 $search_name='';
                 $s='all';
                 $Connector_arr = $this->Admin_model->getConnector_branchManger($s,$BM_ID,$search_name);
            }
            else if(!empty($RO_ID= $this->input->get('RO_ID')))
            { 
                 $BM_ID=$this->input->get('RO_ID');
                 $Connector_arr = $this->Admin_model->getConnector_RelationshipOfficer($s,$RO_ID);
            }
			else
            {
                $Connector_arr= $this->Admin_model->getConnector($s,$search_name);
			}
            $_SESSION["data_for_excel"] = $Connector_arr;

             $data['showNav'] = 1;
             $data['age'] = $age;
             $data['s'] = $s;
             $data['data'] =$Connector_arr;
            $this->load->view('admin/Connector', $data);   
			
        }        
	}*/
   public function branch_manager()
    {
        
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $search_name ='';
            $search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');

            if(!empty($search_))
            {
                $s='search';
                $search_name =$this->input->post('filter_name');    
            }
            else if(!empty($select_filters))
            {
                $s=$select_filters;
                $search_name="";
            }
            else
            {
                $s = $this->input->get('s');
                $search_name="";
            }


               if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['End_Date'];
         }
         else{
             $data['End_Date']='';
         }
         if(isset($_GET['filter']))
         {
                 $filter=$_GET['filter'];
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
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }


          //  $branch_manager_arr = $this->Admin_model->getBranchManagers($s,$search_name);
          //   $_SESSION["data_for_excel"] = $branch_manager_arr;
            $filter_location = $this->Admin_model->getLocationByData();
            $data['filter_location']=$filter_location ;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           // $data['data'] =$branch_manager_arr;
            $this->load->view('admin/admin_dashbord', $data);
           // $this->load->view('admin/branch_managers', $data);   
           $this->load->view('admin/branch_managers_PG', $data); 
            
        }        
    }

    //=================================================== functions for idccr users==========================================
    public function IDCCR_USERS(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
			$data['idccr_pull_chances'] = $this->Admin_model->get_idccr_pull_chances();
            $data['idccr_users'] = $this->Admin_model->get_idccr_users();
            $_SESSION["data_for_excel"] =$this->Admin_model->get_idccr_users();
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/IDCCR_USERS',$data);
        }
    }
    public function save_idccr_pull_chances(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $array_input = array(
                'Chances' => $this->input->post('chance'),            
            );
            $idS = $this->Admin_model->update_idccr_pull_chnaces($array_input);
            if($idS > 0){   
                $this->session->set_flashdata("result", 1);
				$this->IDCCR_USERS();
            }else {
                $this->session->set_flashdata("result", 0);
				$this->IDCCR_USERS();
            }
        }
    }

    
    public function Save_idccr_user(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{

            $email=$this->input->post('email');
			$mob=$this->input->post('mobile');
            $pass=$this->input->post('password');
           //$id_mobile_exist = $this->Admin_model->check_idccr_user_mobile($mob);
			$id_email_exist = $this->Admin_model->check_idccr_user_email($email);
            $id_pass_exist = $this->Admin_model->check_idccr_user_pass($pass);
            
			if($id_email_exist > 0)
			{
				$this->session->set_flashdata("result", 6);
                $this->IDCCR_USERS();
            }
            // else if($id_mobile_exist > 0)
			// {
            //     $this->session->set_flashdata("result", 5);
            //     $this->IDCCR_USERS();
            // }
            else if($id_pass_exist > 0)
			{
                $this->session->set_flashdata("result", 7);
                $this->IDCCR_USERS();
            }
            else
            {
                $array_input = array(
                    'User_name' => $this->input->post('fullname'),   
                    'Email' => $this->input->post('email'), 
                    'mobile' => $this->input->post('mobile'),    
                    'Password' => $this->input->post('password'),
                    'Count' => $this->input->post('Count'),
                    'Balance' => $this->input->post('balance')  ,
					'Branch_name' => $this->input->post('branch_name')  
                );
                $idS = $this->Admin_model->save_idccr_users($array_input);
                if($idS > 0)
                {   
                    $this->session->set_flashdata("result", 2);
				    $this->IDCCR_USERS();
                 }
                 else {
                    $this->session->set_flashdata("result",0 );
				    $this->IDCCR_USERS();
                }
            }
        }
    }

    public function Edit_or_delete_idccr_user(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{

            $Update = $this->input->post('Update');
            $delete =$this->input->post('delete'); 
            $Reset =$this->input->post('Reset');

            if(isset($Reset))
            {
                // echo "edit";exit();
                $user_ID= $this->input->post('user_ID');
                $count= $this->input->post('edit_balance')+$this->input->post('idccr_pull_chances');
                $array_input = array(
                    'User_name' => $this->input->post('edit_name'),   
                    'Email' => $this->input->post('edit_email'), 
                    'mobile' => $this->input->post('edit_mobile'),    
                    'Password' => $this->input->post('edit_password'),
                    'Count' =>$this->input->post('edit_count'),
                     'Balance' =>$count,
					'Branch_name' =>$this->input->post('edit_branch')
                    );
                    $idS = $this->Admin_model->Update_idccr_users($array_input,$user_ID);
                    if($idS > 0){   
                        $this->session->set_flashdata("result", 8);
                        $this->IDCCR_USERS();
                    }else {
                        $this->session->set_flashdata("result",0 );
                        $this->IDCCR_USERS();
                    }
            }
            if(isset($Update))
            {
                // echo "edit";exit();
                $user_ID= $this->input->post('user_ID');
                $array_input = array(
                    'User_name' => $this->input->post('edit_name'),   
                    'Email' => $this->input->post('edit_email'), 
                    'mobile' => $this->input->post('edit_mobile'),    
                    'Password' => $this->input->post('edit_password'),
                   // 'Count' => $this->input->post('Count'),
                    'Balance' => $this->input->post('edit_balance')  ,
              		'Branch_name' =>$this->input->post('edit_branch')
                    );
                    $idS = $this->Admin_model->Update_idccr_users($array_input,$user_ID);
                    if($idS > 0){   
                        $this->session->set_flashdata("result", 3);
                        $this->IDCCR_USERS();
                    }else {
                        $this->session->set_flashdata("result",0 );
                        $this->IDCCR_USERS();
                    }
            }
            if(isset($delete))
            {
                $user_ID= $this->input->post('user_ID');
                $idS = $this->Admin_model->Delete_idccr_user($user_ID);
                if($idS > 0){   
                    $this->session->set_flashdata("result", 4);
                    $this->IDCCR_USERS();
                }else {
                    $this->session->set_flashdata("result",0 );
                    $this->IDCCR_USERS();
                }
                
            }
            
        }
    }
    
    public function IDCCR_login(){
        unset($_SESSION['IDCCR_user_email']);
        unset($_SESSION['IDCCR_user_pass']);
        $this->load->helper('url');  
        $data['error'] = '';      
        $this->load->view('idccr_login/login', $data);
    }
    public function Idccr_user_login()
    {
        
         
        if(isset( $_SESSION['IDCCR_user_email']))
        {
           $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
           $res = $this->Admin_model->Idccr_user_login($data);
           $user_details = $this->Admin_model->Idccr_user_details($res);

           $data['user_details']=$user_details;
           $idccr_user_email=$_SESSION['IDCCR_user_email'];
           // echo  $idccr_user_email;
           // exit();
            $idccr_user_pull_chances = $this->Admin_model->get_idccr_user_pull_chances($idccr_user_email);
            $get_idccr_user_pull_counts =$this->Admin_model->get_idccr_user_pull_counts($idccr_user_email);
            if($get_idccr_user_pull_counts < $idccr_user_pull_chances )
            {
              $data['bureau_counts_']='';
            }
            else
            {
                $data['bureau_counts']='Reset';
            }
           $this->load->view('idccr_login/index', $data);
        }
        else
        {

        $this->load->helper('url'); 
        $data = array('EMAIL' => $this->input->post("email"), 'PASSWORD' => $this->input->post("pass"));
        $res = $this->Admin_model->Idccr_user_login($data);
        $err_message = '';
        if($res == 10){
            $err_message = 'INVALID EMAIL AND PASSWORD';
            $data['error'] = $err_message;
            $this->load->view('idccr_login/login', $data);
           
        }else if($res == 11){
            $err_message = 'INVALID EMAIL';
            $data['error'] = $err_message;
            $this->load->view('idccr_login/login', $data);
            
        }else if($res == 12){
            $err_message = 'INVALID PASSWORD';
            $data['error'] = $err_message;
            $this->load->view('idccr_login/login', $data);
        }
        else 
        {   
            $user_details = $this->Admin_model->Idccr_user_details($res);

            $data['user_details']=$user_details;
            $_SESSION['IDCCR_user_email']= $this->input->post("email");
            $_SESSION['IDCCR_user_pass']= $this->input->post("pass");
            $idccr_user_email=$_SESSION['IDCCR_user_email'];
            $idccr_user_pull_chances = $this->Admin_model->get_idccr_user_pull_chances($idccr_user_email);
            $get_idccr_user_pull_counts =$this->Admin_model->get_idccr_user_pull_counts($idccr_user_email);
            if($get_idccr_user_pull_counts < $idccr_user_pull_chances )
            {
              $data['bureau_counts_']='';
            }
            else
            {
                $data['bureau_counts']='Reset';
            }
            $this->load->view('idccr_login/index', $data);
         
        }
        }
    }
    public function Reset_Count_Request()
    {

        if(isset($_SESSION['IDCCR_user_email']))
        {
           
           // exit();
           $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
           $res = $this->Admin_model->Idccr_user_login($data);
           $user_details = $this->Admin_model->Idccr_user_details($res);
           //echo  "name".$user_details->User_name;
           //echo  "ID".$user_details->Email;
   
           $to = 'info@finaleap.com';
          // $from = 'info@finaleap.com';
         //  $to = 'flconnect@finaleap.com';
           $from = 'infoflfinserv@finaleap.com';
           $fromName =$user_details->User_name;
           $mailSubject = 'Request Submitted by '.$user_details->User_name;
   
           $mailContent = '
             Request for Reset IDCCR Bureau Counts :
             User Name :'.$user_details->User_name.'
             User ID   :'.$user_details->Email.'
             Message   : Please Reset My Bureau Counts
             ';
             /*$config['protocol']='smtp';
             $config['smtp_host']='smtp.zoho.in';
             $config['smtp_port']='465';
             $config['smtp_timeout']='30';
             $config['smtp_crypto']='ssl';
             //$config['smtp_user']='info@finaleap.com';
            // $config['smtp_pass']='skP37cnpCIq0';
             $config['smtp_user']='flconnect@finaleap.com';
             $config['smtp_pass']='iNF0SYS@589';*/
             $config['smtp_host']='smtp-relay.sendinblue.com';
            $config['smtp_port']='587';

            $config['smtp_crypto']='tls';
            $config['smtp_user']='flconnect@finaleap.com';
            $config['smtp_pass']='Qns9hEpIMJVwUFgZ'; 
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
               $data['user_details']=$user_details;
               $err_message = 'Request Sent Successfully.';
               $data['success'] = $err_message;
               $idccr_user_email=$_SESSION['IDCCR_user_email'];
               $idccr_user_pull_chances = $this->Admin_model->get_idccr_user_pull_chances($idccr_user_email);
               $get_idccr_user_pull_counts =$this->Admin_model->get_idccr_user_pull_counts($idccr_user_email);
               if($get_idccr_user_pull_counts < $idccr_user_pull_chances )
               {
                 $data['bureau_counts_']='';
               }
               else
               {
                   $data['bureau_counts']='Reset';
               }
               
               // $result = $this->common->save_combined_credit_bureau($data);
               $this->load->view('idccr_login/index', $data);
          
             } else {
                $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
                $res = $this->Admin_model->Idccr_user_login($data);
                $user_details = $this->Admin_model->Idccr_user_details($res);
                $data['user_details']=$user_details;
                $err_message = $this->email->print_debugger();
                $data['error'] = $err_message;
                $idccr_user_email=$_SESSION['IDCCR_user_email'];
                $idccr_user_pull_chances = $this->Admin_model->get_idccr_user_pull_chances($idccr_user_email);
                $get_idccr_user_pull_counts =$this->Admin_model->get_idccr_user_pull_counts($idccr_user_email);
                if($get_idccr_user_pull_counts < $idccr_user_pull_chances )
                {
                  $data['bureau_counts_']='';
                }
                else
                {
                    $data['bureau_counts']='Reset';
                }
                // $result = $this->common->save_combined_credit_bureau($data);
                $this->load->view('idccr_login/index', $data);
             }   
        }
        else
        {
            $this->load->helper('url'); 
            $data['error'] = '';  
            $this->load->view('idccr_login/index', $data);
        }
      
       /// exit();
    }
    public function Idccr_user_IDCCR_Form(){
       // echo "giiii";
       // exit();
       $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
       $res = $this->Admin_model->Idccr_user_login($data);
       $user_details = $this->Admin_model->Idccr_user_details($res);
       $data['user_details']=$user_details;
       $this->load->view('idccr_login/combined_credit_bureau',$data);
    }
    public function Combined_credit_bureau_for_IDCCR_Users()
 { 
    //   date_default_timezone_set('Asia/Kolkata');
    //   $date = date('d-m-y h:i:s');
            
             $data = array(
             'fname' => $this->input->post('fname'), 
             'mname' => $this->input->post('mname'), 
             'lname' => $this->input->post('lname'), 
             'gender' => $this->input->post('gender'), 
             'email' => $this->input->post('email'), 
             'mobile' => $this->input->post('mobile'), 
             'pan_number' =>$this->input->post('pan'), 
             'ID_type' =>$this->input->post('ID_type'), 
             'address1' =>$this->input->post('address1'), 
              'pincode' =>$this->input->post('pincode'), 
             'state' => $this->input->post('state'), 
             'district' =>$this->input->post('district'), 
             'city' => $this->input->post('city'), 
             'terms' => $this->input->post('cterms'), 
             'dob'=> $this->input->post('dob'), 
             'verify_otp'=>$this->input->post('verify_otp_status'),
             'created_date'=>date("Y/m/d"),
             'Payment_id'=>'Registered_user',
             'ID_2_number'=>$this->input->post('pan2'), 
             'ID_type_2' =>$this->input->post('ID_type2'), 
     );

     $Check_data = $this->Admin_model->Idccr_report_data($data);
     if(!empty($Check_data))
     {
        $string = $Check_data->score_success;
        if($Check_data->score_success=='success' || $Check_data->score_success=='Consumer not found in both retail and microfince bureau'  )
        {
           //echo "!!!!!success";
           $cust_name =$Check_data->fname." ".$Check_data->lname;
           $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
           $res = $this->Admin_model->Idccr_user_login($data);
           $user_details = $this->Admin_model->Idccr_user_details($res);
           $data['user_details']=$user_details;
           $err_message = 'You have already pulled record successfully For customer : '.$cust_name;
           $data['success'] = $err_message;
           $this->load->view('idccr_login/combined_credit_bureau',$data);
        }
        else if( $Check_data->score_success!='Consumer not found in both retail and microfince bureau' || $Check_data->score_success!='success')
        {
           // echo $Check_data->id;
            //exit();
         
          //  print_r($Check_data);
          //  exit();
            $cust_name =$Check_data->fname." ".$Check_data->lname;
            $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
            $res = $this->Admin_model->Idccr_user_login($data);
            $user_details = $this->Admin_model->Idccr_user_details($res);
            $data['user_details']=$user_details;
            $err_message = $string.'. Please enter the valid details for customer : '.$cust_name;
            $data['error'] = $err_message;
            $data['customer_data']=$Check_data;
          //  echo "<pre>";
           // print_r($data);
          //  echo "</pre>";
          //  exit();
            $this->load->view('idccr_login/combined_credit_bureau',$data); 
        }
        /*
        else  if (str_contains($string, 'Phone does not match with credit file'))
        {   $cust_name =$Check_data->fname." ".$Check_data->lname;
            $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
            $res = $this->Admin_model->Idccr_user_login($data);
            $user_details = $this->Admin_model->Idccr_user_details($res);
            $data['user_details']=$user_details;
            $err_message = $string.'. Please enter the required mobile number for customer : '.$cust_name;
            $data['error'] = $err_message;
            $this->load->view('idccr_login/combined_credit_bureau',$data); 
        }
        else  if (str_contains($string, 'ID - Voter does not match with credit file'))
        {
            $cust_name =$Check_data->fname." ".$Check_data->lname;
            $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
            $res = $this->Admin_model->Idccr_user_login($data);
            $user_details = $this->Admin_model->Idccr_user_details($res);
            $data['user_details']=$user_details;
            $err_message = $string.'. Please enter valid ID details for customer : '.$cust_name;
            $data['error'] = $err_message;
            $this->load->view('idccr_login/combined_credit_bureau',$data); 
        }
        else  if (str_contains($string, 'ID - Name does not match with credit file'))
        {
            $cust_name =$Check_data->fname." ".$Check_data->lname;
            $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
            $res = $this->Admin_model->Idccr_user_login($data);
            $user_details = $this->Admin_model->Idccr_user_details($res);
            $data['user_details']=$user_details;
            $err_message = $string.'. Please enter valid Name details for customer : '.$cust_name;
            $data['error'] = $err_message;
            $this->load->view('idccr_login/combined_credit_bureau',$data); 
        }
        else  if (str_contains($string, 'ID - PAN does not match with credit file'))
        {
            $cust_name =$Check_data->fname." ".$Check_data->lname;
            $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
            $res = $this->Admin_model->Idccr_user_login($data);
            $user_details = $this->Admin_model->Idccr_user_details($res);
            $data['user_details']=$user_details;
            $err_message = $string.'. Please enter valid ID details for customer : '.$cust_name;
            $data['error'] = $err_message;
            $this->load->view('idccr_login/combined_credit_bureau',$data); 
        }*/
        else
        {
            $this->session->set_userdata("score", '');
      $filterArr = [];
      $email=$this->input->post('email');
         
      $filterArr['pan'] =$this->input->post('pan');
      $filterArr['ID_type'] =$this->input->post('ID_type');
      $filterArr['pan2'] =$this->input->post('pan2');
      $filterArr['ID_type2'] =$this->input->post('ID_type2');
      $filterArr['email'] =$this->input->post('email');
      $filterArr['mobile'] =$this->input->post('mobile');
      $filterArr['first_name'] =$this->input->post('fname');
      $filterArr['middle_name']=$this->input->post('mname');
      $filterArr['last_name'] = $this->input->post('lname');
      $filterArr['relation_mem_name'] = $this->input->post('fname')." ".$this->input->post('mname')." ".$this->input->post('lname');
      $filterArr['address_line_1'] =$this->input->post('address1');
      $filterArr['locality'] = $this->input->post('city');
      $filterArr['city'] = $this->input->post('city');
      $filterArr['state'] = $this->input->post('state');
      $filterArr['postal_code'] = $this->input->post('pincode');
      $filterArr['dob'] =$this->input->post('dob');
     
      if($this->input->post('gender')!=''){
         if($this->input->post('gender') == "male")$filterArr['gender'] = "M";
         else $filterArr['gender'] = "F";
      } else $filterArr['gender'] = "F";
      $stateAbbr = $this->Customercrud_model->getStateAbbr($filterArr['state']);
      if($stateAbbr)$filterArr['state'] = $stateAbbr->state_abbr;
      $name = "Mana rao";
      //$url = 'https://ists.equifax.co.in/cir360service/cir360report';
      //$url='https://eportuat.equifax.co.in/cir360Report/cir360Report';	"CustomerId": "21", "UserId": "UAT_FINALE","Password": "V2*Pdhbr","MemberNumber": "027FZ01852","SecurityCode": "FU1",
      $url ='https://ists.equifax.co.in/cir360service/cir360report';
     $dataInput = '{
         "RequestHeader": {
             "CustomerId": "7716",
             "UserId": "STS_CCRFL2",
             "Password": "u4raGfV#kk",
             "MemberNumber": "027FZ28423",
             "SecurityCode": "4UG",
             "CustRefField": "123456",
             "ProductCode": [
                 "IDCCR"
             ]
         },
         "RequestBody": {
             "InquiryPurpose": "05",
             "FirstName": "'.$filterArr['first_name'].'",
             "MiddleName": "'.$filterArr['middle_name'].'",
             "LastName": "'.$filterArr['last_name'].'",
             "DOB": "'.$filterArr['dob'].'",
             "InquiryAddresses": [
                 {
                     "seq": "1",
                     "AddressType": ["H"],
                     "AddressLine1": "'.$filterArr['address_line_1'].'",
                     "State": "'.$filterArr['state'].'",
                     "Postal": "'.$filterArr['postal_code'].'"
                 }
             ],
             "InquiryPhones": [
                 {
                     "seq": "1",
                     "Number": "'.$filterArr['mobile'].'",
                     "PhoneType": ["M" ]
                 } ],
             "IDDetails": [
                 {
                     "seq": "1",
                     "IDValue": "'.$filterArr['pan'].'",
                     "IDType": "'.$filterArr['ID_type'].'"
                 },
                 {
                     "seq": "2",
                     "IDValue": "'.$filterArr['pan2'].'",
                     "IDType": "'.$filterArr['ID_type2'].'"
                 }
             ],
             "MFIDetails": {
                 "FamilyDetails": [
                     {
                        "seq": "1",
                         "AdditionalNameType":"O",
                         "AdditionalName": "'.$filterArr['relation_mem_name'].'"
                     }
                 ]
             }
         },
         "Score": [
             {
                 "Type": "ERS",
                 "Version": "3.1"
             }
         ]
     }';

          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $dataInput);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
          $arr = curl_exec($ch);
          $respnse = $arr;
          curl_close($ch);
        
         $dataArr = json_decode($arr,true);
        
         $idccr_user_email=$this->input->post('Idccr_user_email');
         $idccr_user_pull_chances = $this->Admin_model->get_idccr_user_pull_chances($idccr_user_email);
         $get_idccr_user_pull_counts =$this->Admin_model->get_idccr_user_pull_counts($idccr_user_email);
         if($get_idccr_user_pull_counts < $idccr_user_pull_chances )
         {
             $result =$this->Admin_model->get_idccr_user_pull_counts($idccr_user_email);
             $idccr_user_data['Count']=$result+1;//-------------------this is for idccr_users table 
             $idccr_user_data['Email']=$this->input->post('Idccr_user_email');
             $this->Admin_model->update_idccr_user_count($idccr_user_data);

             $data['credit_pull_count']=$dataArr['InquiryResponseHeader']['ReportOrderNO'];//-----------------this is for combined credit bureau table
             $data['IDCCR_user']=$this->input->post('Idccr_user_email');
             $data['Branch_name']=$this->input->post('Idccr_user_branch');
             $code = $dataArr['InquiryResponseHeader']['SuccessCode'];
             if($code==0)
             {
                         if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode']))
                         {
                             $error_code = $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'];
                             if($error_code == 'GSWDOE116')
                             {
                                 $strpos = strpos( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ':');
                                 $score_error = substr( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ($strpos+1));
                                 $data['score_success'] = $dataArr['Error']['ErrorDesc'];
                                 $data['score']=0;
                                 $data['reatil_score']=0;
                                 $data['response'] = $respnse;
                                 $result = $this->common->save_combined_credit_bureau($data);
                                 $this->session->set_flashdata('warning',$score_error);
                                 //$this->Idccr_user_IDCCR_Form();
                                 redirect('admin/Idccr_user_IDCCR_Form');

                                    //wordning message						$this->session->set_flashdata('warning',$score_error);
                             }
                             else if($error_code >='E0401' && $error_code<='E0420')
                             {
                                 $data['score']=0;
                                 $data['reatil_score']=0;
                                 $data['response'] = $respnse;
                                 $data['score_success']='Something Wrong in your file';
                                 $this->session->set_flashdata('warning','Something Wrong in your file');
                                 $this->Idccr_user_IDCCR_Form();
                                //wordning message						$this->session->set_flashdata('warning','Something Wrong in your file');

                             }
                             else if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc']=='Consumer not found in bureau')
                             {
                                 $data['score']=0;
                                 $data['reatil_score']=0;
                                 $data['response'] = $respnse;
                                 $data['score_success'] ='success';
                                 //$this->session->set_flashdata('sucess','Consumer not found in Retail bureau');
                                 
                                 $this->Idccr_user_IDCCR_Form();
                                //wordning message						$this->session->set_flashdata('warning','Consumer not found in bureau');

                             }
                            //redirect          				    redirect('front/combined_credit_bureau');
                                        $this->Idccr_user_IDCCR_Form();
                         }
                         else
                         {
                                //wordning message						
                                        $this->session->set_flashdata('warning','Something Wrong in your file');
                                        $this->Idccr_user_IDCCR_Form();
                        //redirect          				    
                         }
             }
             else
             {
                 if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']))  //error found	
                 {
                     $error_code = $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'];
                         if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc']=='Consumer not found in bureau')  // if for condition a)
                         { 
                             if(isset($dataArr['CCRResponse']['CIRReportDataLst'][1]['Error'])) // if for condition A)
                             {
                                 $error_code = $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorCode'];
                                 if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorDesc']=='Consumer not found in bureau')
                                 {
                                     $data['score']=0;
                                     $data['reatil_score']=0;
                                     $data['response'] = $respnse;
                                     $data['score_success'] ='Consumer not found in both retail and microfince bureau';
                                     $result = $this->common->save_combined_credit_bureau($data);
                                    // $this->session->set_flashdata('sucess','Consumer not found in both retail and microfince bureau');
                                    $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
                                    $res = $this->Admin_model->Idccr_user_login($data);
                                    $user_details = $this->Admin_model->Idccr_user_details($res);
                                    $data['user_details']=$user_details;
                                    $err_message = 'Consumer not found in both retail and microfince bureau.';
                                    $data['error'] = $err_message;
                                   // $result = $this->common->save_combined_credit_bureau($data);
                                    $this->load->view('idccr_login/combined_credit_bureau',$data);
                                    									
                                 }
                             }
                             else
                             {
                                 $data['reatil_score']=0;
                                 if(isset($dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value']))
                                 {
                                     $data['score']=$dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
                                 }
                                 else
                                 {
                                     $data['score']=0;
                                 }
                                 $data['response'] = $respnse;
                                 $data['score_success'] ='success';
                                 $result = $this->common->save_combined_credit_bureau($data);
                                 //$this->session->set_flashdata('sucess','Consumer not found in Retail bureau');
                                 $dataemail = $this->IDCCR_users_pdf($dataArr,$email);
                                 if($dataemail['email_status']=='success')
                                 {
                                    $micro =$dataemail['micro'];
                                $credit= $dataemail['credit']; 
                                $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
                                $res = $this->Admin_model->Idccr_user_login($data);
                                $user_details = $this->Admin_model->Idccr_user_details($res);
                                $data['user_details']=$user_details;
                                $success_message = 'Success !! Your Credit Microfinance Risk Score is <b>'.$micro.'</b> and Credit Score is <b> '.$credit.' </b> .Bureau Reoport Send On Your Mail Id Sucessfully';
                                $data['success'] = $success_message;
                            // $this->Idccr_user_IDCCR_Form();
                                $this->load->view('idccr_login/combined_credit_bureau',$data);
                                 }
                                 else
                                 {
                                    $err_message = 'something wrong';
                                    $data['error'] = $err_message;
                                    // $this->Idccr_user_IDCCR_Form();
                                    $this->load->view('idccr_login/combined_credit_bureau',$data);
    
                                 }


                             }
                       								

                         }
                         else if($error_code == 'GSWDOE116') //else if for condition b)
                         {
                             $strpos = strpos( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ':');
                             $score_error = substr( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ($strpos+1));
                             $data['score']=0;
                             $data['reatil_score']=0;
                             $data['score_success'] = $score_error;
                             $data['response'] = $respnse;
                             $result = $this->common->save_combined_credit_bureau($data);
                            $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
                            $res = $this->Admin_model->Idccr_user_login($data);
                            $user_details = $this->Admin_model->Idccr_user_details($res);
                            $data['user_details']=$user_details;
                            $err_message = $score_error;
                            $data['error'] = $err_message;
                            $this->load->view('idccr_login/combined_credit_bureau',$data);
 	
                         }
                         else if($error_code >='E0401' && $error_code<='E0420') //else if for condition c) 
                         {
                                 $data['score']=0;
                                 $data['reatil_score']=0;
                                 $data['response'] = $respnse;
                                 $data['score_success']='Something Wrong in your file';
                                 $result = $this->common->save_combined_credit_bureau($data);
                                 $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
                                 $res = $this->Admin_model->Idccr_user_login($data);
                                 $user_details = $this->Admin_model->Idccr_user_details($res);
                                 $data['user_details']=$user_details;
                                 $err_message = 'Something Wrong in your file';
                                 $data['error'] = $err_message;
                                 $this->load->view('idccr_login/combined_credit_bureau',$data);
      	
                         }
                        //redirect          			     redirect('front/combined_credit_bureau');
                      //   $this->Idccr_user_IDCCR_Form();


                 }
                 else                                                                //else fot error not found
                 {
                     if(isset($dataArr['CCRResponse']['CIRReportDataLst'][1]['Error'])) // if for condition A)
                     {
                         $error_code = $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorCode'];
                         if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorDesc']=='Consumer not found in bureau')
                         {
                             $data['score']=0;
                             if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
                             {
                                   $data['reatil_score']=$dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
                             }
                             else
                             {
                                 $data['reatil_score']=0;
                             }
                             $data['response'] = $respnse;
                             $data['score_success'] ='success';
                             $result = $this->common->save_combined_credit_bureau($data);
                             $dataemail = $this->IDCCR_users_pdf($dataArr,$email);
                             if($dataemail['email_status']=='success')
                             {
                                $credit= $dataemail['credit']; 
                                $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
                                $res = $this->Admin_model->Idccr_user_login($data);
                                $user_details = $this->Admin_model->Idccr_user_details($res);
                                $data['user_details']=$user_details;
                                $success_message = 'Success !! Your Retail Score is <b> '.$credit.'</b> Consumer not found in Microfinance Risk bureau. Bureau Reoport Send On Your Mail Id Sucessfully';
                                $data['success'] = $success_message;
                            // $this->Idccr_user_IDCCR_Form();
                                $this->load->view('idccr_login/combined_credit_bureau',$data);
                             }
                             else
                             {
                                $err_message = 'something wrong';
                                $data['error'] = $err_message;
                                // $this->Idccr_user_IDCCR_Form();
                                $this->load->view('idccr_login/combined_credit_bureau',$data);

                             }
                            //wordning message						$this->session->set_flashdata('warning','Consumer not found in micro ');										
                         }
                         else
                         {
                             if(isset($dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value']))
                             {
                             $data['score']=$dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
                             }
                             else
                             {
                                 $data['score']=0;
                             }
                             if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
                             {
                               $data['reatil_score']=$dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
                             }
                             else
                             {
                                 $data['reatil_score']=0;
                             }
                             $data['score_success'] ='success';
                             $data['response'] = $respnse;
                             $result = $this->common->save_combined_credit_bureau($data);
                             $dataemail = $this->IDCCR_users_pdf($dataArr,$email);
                             if($dataemail['email_status']=='success')
                             {
                                $micro =$dataemail['micro'];
                                $credit= $dataemail['credit']; 
                                $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
                                $res = $this->Admin_model->Idccr_user_login($data);
                                $user_details = $this->Admin_model->Idccr_user_details($res);
                                $data['user_details']=$user_details;
                                $success_message = 'Success !! Your Credit Microfinance Risk Score is <b>'.$micro.'</b> and Credit Score is <b> '.$credit.' </b> .Bureau Reoport Send On Your Mail Id Sucessfully';
                                $data['success'] = $success_message;
                            // $this->Idccr_user_IDCCR_Form();
                                $this->load->view('idccr_login/combined_credit_bureau',$data);
                             }
                             else
                             {
                                $err_message = 'something wrong';
                                $data['error'] = $err_message;
                                // $this->Idccr_user_IDCCR_Form();
                                $this->load->view('idccr_login/combined_credit_bureau',$data);

                             }

                         }
                     }
                     else
                     {
                        // echo "line 2109";
                         //exit();
                             if(isset($dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value']))
                             {
                             $data['score']=$dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
                             }
                             else
                             {
                                 $data['score']=0;
                             }
                             if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
                             {
                               $data['reatil_score']=$dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
                             }
                             else
                             {
                                 $data['reatil_score']=0;
                             }
                             $data['score_success'] ='success';
                             $data['response'] = $respnse;
                             $result = $this->common->save_combined_credit_bureau($data);
                             $dataemail = $this->IDCCR_users_pdf($dataArr,$email);
                             if($dataemail['email_status']=='success')
                             {
                                $micro =$dataemail['micro'];
                                $credit= $dataemail['credit']; 
                                $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
                                $res = $this->Admin_model->Idccr_user_login($data);
                                $user_details = $this->Admin_model->Idccr_user_details($res);
                                $data['user_details']=$user_details;
                                $success_message = 'Success !! Your Credit Microfinance Risk Score is <b>'.$micro.'</b> and Credit Score is <b> '.$credit.' </b> .Bureau Reoport Send On Your Mail Id Sucessfully';
                                $data['success'] = $success_message;
                            // $this->Idccr_user_IDCCR_Form();
                                $this->load->view('idccr_login/combined_credit_bureau',$data);
                             }
                             else
                             {
                                $err_message = 'something wrong';
                                $data['error'] = $err_message;
                                // $this->Idccr_user_IDCCR_Form();
                                $this->load->view('idccr_login/combined_credit_bureau',$data);

                             }
                     }


                 }

             }
             

         }
         else
         {
            //  echo "out of counts. please reset count";
            //  exit();
            $err_message = 'Opps!!.Your Pull counts are expired. Please Reset counts.';
            $data['error'] = $err_message;
            // $this->Idccr_user_IDCCR_Form();
            $this->load->view('idccr_login/combined_credit_bureau',$data);
         }
        }
     }
     else
     {
         

      $this->session->set_userdata("score", '');
      $filterArr = [];
      $email=$this->input->post('email');
         
      $filterArr['pan'] =$this->input->post('pan');
      $filterArr['ID_type'] =$this->input->post('ID_type');
      $filterArr['pan2'] =$this->input->post('pan2');
      $filterArr['ID_type2'] =$this->input->post('ID_type2');
      $filterArr['email'] =$this->input->post('email');
      $filterArr['mobile'] =$this->input->post('mobile');
      $filterArr['first_name'] =$this->input->post('fname');
      $filterArr['middle_name']=$this->input->post('mname');
      $filterArr['last_name'] = $this->input->post('lname');
      $filterArr['relation_mem_name'] = $this->input->post('fname')." ".$this->input->post('mname')." ".$this->input->post('lname');
      $filterArr['address_line_1'] =$this->input->post('address1');
      $filterArr['locality'] = $this->input->post('city');
      $filterArr['city'] = $this->input->post('city');
      $filterArr['state'] = $this->input->post('state');
      $filterArr['postal_code'] = $this->input->post('pincode');
      $filterArr['dob'] =$this->input->post('dob');
     
      if($this->input->post('gender')!=''){
         if($this->input->post('gender') == "male")$filterArr['gender'] = "M";
         else $filterArr['gender'] = "F";
      } else $filterArr['gender'] = "F";
      $stateAbbr = $this->Customercrud_model->getStateAbbr($filterArr['state']);
      if($stateAbbr)$filterArr['state'] = $stateAbbr->state_abbr;
      $name = "Mana rao";
      //$url = 'https://ists.equifax.co.in/cir360service/cir360report';
      //$url='https://eportuat.equifax.co.in/cir360Report/cir360Report';	"CustomerId": "21", "UserId": "UAT_FINALE","Password": "V2*Pdhbr","MemberNumber": "027FZ01852","SecurityCode": "FU1",
      $url ='https://ists.equifax.co.in/cir360service/cir360report';
     $dataInput = '{
         "RequestHeader": {
             "CustomerId": "7716",
             "UserId": "STS_CCRFL2",
             "Password": "u4raGfV#kk",
             "MemberNumber": "027FZ28423",
             "SecurityCode": "4UG",
             "CustRefField": "123456",
             "ProductCode": [
                 "IDCCR"
             ]
         },
         "RequestBody": {
             "InquiryPurpose": "05",
             "FirstName": "'.$filterArr['first_name'].'",
             "MiddleName": "'.$filterArr['middle_name'].'",
             "LastName": "'.$filterArr['last_name'].'",
             "DOB": "'.$filterArr['dob'].'",
             "InquiryAddresses": [
                 {
                     "seq": "1",
                     "AddressType": ["H"],
                     "AddressLine1": "'.$filterArr['address_line_1'].'",
                     "State": "'.$filterArr['state'].'",
                     "Postal": "'.$filterArr['postal_code'].'"
                 }
             ],
             "InquiryPhones": [
                 {
                     "seq": "1",
                     "Number": "'.$filterArr['mobile'].'",
                     "PhoneType": ["M" ]
                 } ],
             "IDDetails": [
                 {
                     "seq": "1",
                     "IDValue": "'.$filterArr['pan'].'",
                     "IDType": "'.$filterArr['ID_type'].'"
                 },
                 {
                     "seq": "2",
                     "IDValue": "'.$filterArr['pan2'].'",
                     "IDType": "'.$filterArr['ID_type2'].'"
                 }
             ],
             "MFIDetails": {
                 "FamilyDetails": [
                     {
                        "seq": "1",
                         "AdditionalNameType":"O",
                         "AdditionalName": "'.$filterArr['relation_mem_name'].'"
                     }
                 ]
             }
         },
         "Score": [
             {
                 "Type": "ERS",
                 "Version": "3.1"
             }
         ]
     }';

          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $dataInput);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
          $arr = curl_exec($ch);
          $respnse = $arr;
          curl_close($ch);
        
         $dataArr = json_decode($arr,true);
        
         $idccr_user_email=$this->input->post('Idccr_user_email');
         $idccr_user_pull_chances = $this->Admin_model->get_idccr_user_pull_chances($idccr_user_email);
         $get_idccr_user_pull_counts =$this->Admin_model->get_idccr_user_pull_counts($idccr_user_email);
         if($get_idccr_user_pull_counts < $idccr_user_pull_chances )
         {
             $result =$this->Admin_model->get_idccr_user_pull_counts($idccr_user_email);
             $idccr_user_data['Count']=$result+1;//-------------------this is for idccr_users table 
             $idccr_user_data['Email']=$this->input->post('Idccr_user_email');
             $this->Admin_model->update_idccr_user_count($idccr_user_data);

             $data['credit_pull_count']=$dataArr['InquiryResponseHeader']['ReportOrderNO'];//-----------------this is for combined credit bureau table
             $data['IDCCR_user']=$this->input->post('Idccr_user_email');
             $data['Branch_name']=$this->input->post('Idccr_user_branch');
             $code = $dataArr['InquiryResponseHeader']['SuccessCode'];
             if($code==0)
             {
                         if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode']))
                         {
                             $error_code = $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'];
                             if($error_code == 'GSWDOE116')
                             {
                                 $strpos = strpos( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ':');
                                 $score_error = substr( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ($strpos+1));
                                 $data['score_success'] = $dataArr['Error']['ErrorDesc'];
                                 $data['score']=0;
                                 $data['reatil_score']=0;
                                 $data['response'] = $respnse;
                                 $result = $this->common->save_combined_credit_bureau($data);
                                 $this->session->set_flashdata('warning',$score_error);
                                 //$this->Idccr_user_IDCCR_Form();
                                 redirect('admin/Idccr_user_IDCCR_Form');

                                    //wordning message						$this->session->set_flashdata('warning',$score_error);
                             }
                             else if($error_code >='E0401' && $error_code<='E0420')
                             {
                                 $data['score']=0;
                                 $data['reatil_score']=0;
                                 $data['response'] = $respnse;
                                 $data['score_success']='Something Wrong in your file';
                                 $this->session->set_flashdata('warning','Something Wrong in your file');
                                 $this->Idccr_user_IDCCR_Form();
                                //wordning message						$this->session->set_flashdata('warning','Something Wrong in your file');

                             }
                             else if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc']=='Consumer not found in bureau')
                             {
                                 $data['score']=0;
                                 $data['reatil_score']=0;
                                 $data['response'] = $respnse;
                                 $data['score_success'] ='success';
                                 //$this->session->set_flashdata('sucess','Consumer not found in Retail bureau');
                                 
                                 $this->Idccr_user_IDCCR_Form();
                                //wordning message						$this->session->set_flashdata('warning','Consumer not found in bureau');

                             }
                            //redirect          				    redirect('front/combined_credit_bureau');
                                        $this->Idccr_user_IDCCR_Form();
                         }
                         else
                         {
                                //wordning message						
                                        $this->session->set_flashdata('warning','Something Wrong in your file');
                                        $this->Idccr_user_IDCCR_Form();
                        //redirect          				    
                         }
             }
             else
             {
                 if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']))  //error found	
                 {
                     $error_code = $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorCode'];
                         if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc']=='Consumer not found in bureau')  // if for condition a)
                         { 
                             if(isset($dataArr['CCRResponse']['CIRReportDataLst'][1]['Error'])) // if for condition A)
                             {
                                 $error_code = $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorCode'];
                                 if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorDesc']=='Consumer not found in bureau')
                                 {
                                     $data['score']=0;
                                     $data['reatil_score']=0;
                                     $data['response'] = $respnse;
                                     $data['score_success'] ='Consumer not found in both retail and microfince bureau';
                                     $result = $this->common->save_combined_credit_bureau($data);
                                    // $this->session->set_flashdata('sucess','Consumer not found in both retail and microfince bureau');
                                    $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
                                    $res = $this->Admin_model->Idccr_user_login($data);
                                    $user_details = $this->Admin_model->Idccr_user_details($res);
                                    $data['user_details']=$user_details;
                                    $err_message = 'Consumer not found in both retail and microfince bureau.';
                                    $data['error'] = $err_message;
                                   // $result = $this->common->save_combined_credit_bureau($data);
                                    $this->load->view('idccr_login/combined_credit_bureau',$data);
                                    									
                                 }
                             }
                             else
                             {
                                 $data['reatil_score']=0;
                                 if(isset($dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value']))
                                 {
                                     $data['score']=$dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
                                 }
                                 else
                                 {
                                     $data['score']=0;
                                 }
                                 $data['response'] = $respnse;
                                 $data['score_success'] ='success';
                                 $result = $this->common->save_combined_credit_bureau($data);
                                 //$this->session->set_flashdata('sucess','Consumer not found in Retail bureau');
                                 $dataemail = $this->IDCCR_users_pdf($dataArr,$email);
                                 if($dataemail['email_status']=='success')
                                 {
                                    $micro =$dataemail['micro'];
                                $credit= $dataemail['credit']; 
                                $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
                                $res = $this->Admin_model->Idccr_user_login($data);
                                $user_details = $this->Admin_model->Idccr_user_details($res);
                                $data['user_details']=$user_details;
                                $success_message = 'Success !! Your Credit Microfinance Risk Score is <b>'.$micro.'</b> and Credit Score is <b> '.$credit.' </b> .Bureau Reoport Send On Your Mail Id Sucessfully';
                                $data['success'] = $success_message;
                            // $this->Idccr_user_IDCCR_Form();
                                $this->load->view('idccr_login/combined_credit_bureau',$data);
                                 }
                                 else
                                 {
                                    $err_message = 'something wrong';
                                    $data['error'] = $err_message;
                                    // $this->Idccr_user_IDCCR_Form();
                                    $this->load->view('idccr_login/combined_credit_bureau',$data);
    
                                 }


                             }
                       								

                         }
                         else if($error_code == 'GSWDOE116') //else if for condition b)
                         {
                             $strpos = strpos( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ':');
                             $score_error = substr( $dataArr['CCRResponse']['CIRReportDataLst'][0]['Error']['ErrorDesc'], ($strpos+1));
                             $data['score']=0;
                             $data['reatil_score']=0;
                             $data['score_success'] = $score_error;
                             $data['response'] = $respnse;
                             $result = $this->common->save_combined_credit_bureau($data);
                            $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
                            $res = $this->Admin_model->Idccr_user_login($data);
                            $user_details = $this->Admin_model->Idccr_user_details($res);
                            $data['user_details']=$user_details;
                            $err_message = $score_error;
                            $data['error'] = $err_message;
                            $this->load->view('idccr_login/combined_credit_bureau',$data);
 	
                         }
                         else if($error_code >='E0401' && $error_code<='E0420') //else if for condition c) 
                         {
                                 $data['score']=0;
                                 $data['reatil_score']=0;
                                 $data['response'] = $respnse;
                                 $data['score_success']='Something Wrong in your file';
                                 $result = $this->common->save_combined_credit_bureau($data);
                                 $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
                                 $res = $this->Admin_model->Idccr_user_login($data);
                                 $user_details = $this->Admin_model->Idccr_user_details($res);
                                 $data['user_details']=$user_details;
                                 $err_message = 'Something Wrong in your file';
                                 $data['error'] = $err_message;
                                 $this->load->view('idccr_login/combined_credit_bureau',$data);
      	
                         }
                        //redirect          			     redirect('front/combined_credit_bureau');
                      //   $this->Idccr_user_IDCCR_Form();


                 }
                 else                                                                //else fot error not found
                 {
                     if(isset($dataArr['CCRResponse']['CIRReportDataLst'][1]['Error'])) // if for condition A)
                     {
                         $error_code = $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorCode'];
                         if($error_code==00 && $dataArr['CCRResponse']['CIRReportDataLst'][1]['Error']['ErrorDesc']=='Consumer not found in bureau')
                         {
                             $data['score']=0;
                             if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
                             {
                                   $data['reatil_score']=$dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
                             }
                             else
                             {
                                 $data['reatil_score']=0;
                             }
                             $data['response'] = $respnse;
                             $data['score_success'] ='success';
                             $result = $this->common->save_combined_credit_bureau($data);
                             $dataemail = $this->IDCCR_users_pdf($dataArr,$email);
                             if($dataemail['email_status']=='success')
                             {
                                $credit= $dataemail['credit']; 
                                $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
                                $res = $this->Admin_model->Idccr_user_login($data);
                                $user_details = $this->Admin_model->Idccr_user_details($res);
                                $data['user_details']=$user_details;
                                $success_message = 'Success !! Your Retail Score is <b> '.$credit.'</b> Consumer not found in Microfinance Risk bureau. Bureau Reoport Send On Your Mail Id Sucessfully';
                                $data['success'] = $success_message;
                            // $this->Idccr_user_IDCCR_Form();
                                $this->load->view('idccr_login/combined_credit_bureau',$data);
                             }
                             else
                             {
                                $err_message = 'something wrong';
                                $data['error'] = $err_message;
                                // $this->Idccr_user_IDCCR_Form();
                                $this->load->view('idccr_login/combined_credit_bureau',$data);

                             }
                            //wordning message						$this->session->set_flashdata('warning','Consumer not found in micro ');										
                         }
                         else
                         {
                             if(isset($dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value']))
                             {
                             $data['score']=$dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
                             }
                             else
                             {
                                 $data['score']=0;
                             }
                             if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
                             {
                               $data['reatil_score']=$dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
                             }
                             else
                             {
                                 $data['reatil_score']=0;
                             }
                             $data['score_success'] ='success';
                             $data['response'] = $respnse;
                             $result = $this->common->save_combined_credit_bureau($data);
                             $dataemail = $this->IDCCR_users_pdf($dataArr,$email);
                             if($dataemail['email_status']=='success')
                             {
                                $micro =$dataemail['micro'];
                                $credit= $dataemail['credit']; 
                                $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
                                $res = $this->Admin_model->Idccr_user_login($data);
                                $user_details = $this->Admin_model->Idccr_user_details($res);
                                $data['user_details']=$user_details;
                                $success_message = 'Success !! Your Credit Microfinance Risk Score is <b>'.$micro.'</b> and Credit Score is <b> '.$credit.' </b> .Bureau Reoport Send On Your Mail Id Sucessfully';
                                $data['success'] = $success_message;
                            // $this->Idccr_user_IDCCR_Form();
                                $this->load->view('idccr_login/combined_credit_bureau',$data);
                             }
                             else
                             {
                                $err_message = 'something wrong';
                                $data['error'] = $err_message;
                                // $this->Idccr_user_IDCCR_Form();
                                $this->load->view('idccr_login/combined_credit_bureau',$data);

                             }

                         }
                     }
                     else
                     {
                        // echo "line 2109";
                         //exit();
                             if(isset($dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value']))
                             {
                             $data['score']=$dataArr['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
                             }
                             else
                             {
                                 $data['score']=0;
                             }
                             if(isset($dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
                             {
                               $data['reatil_score']=$dataArr['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
                             }
                             else
                             {
                                 $data['reatil_score']=0;
                             }
                             $data['score_success'] ='success';
                             $data['response'] = $respnse;
                             $result = $this->common->save_combined_credit_bureau($data);
                             $dataemail = $this->IDCCR_users_pdf($dataArr,$email);
                             if($dataemail['email_status']=='success')
                             {
                                $micro =$dataemail['micro'];
                                $credit= $dataemail['credit']; 
                                $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
                                $res = $this->Admin_model->Idccr_user_login($data);
                                $user_details = $this->Admin_model->Idccr_user_details($res);
                                $data['user_details']=$user_details;
                                $success_message = 'Success !! Your Credit Microfinance Risk Score is <b>'.$micro.'</b> and Credit Score is <b> '.$credit.' </b> .Bureau Reoport Send On Your Mail Id Sucessfully';
                                $data['success'] = $success_message;
                            // $this->Idccr_user_IDCCR_Form();
                                $this->load->view('idccr_login/combined_credit_bureau',$data);
                             }
                             else
                             {
                                $err_message = 'something wrong';
                                $data['error'] = $err_message;
                                // $this->Idccr_user_IDCCR_Form();
                                $this->load->view('idccr_login/combined_credit_bureau',$data);

                             }
                     }


                 }

             }
             

         }
         else
         {
            //  echo "out of counts. please reset count";
            //  exit();
            $err_message = 'Opps!!.Your Pull counts are expired. Please Reset counts.';
            $data['error'] = $err_message;
            // $this->Idccr_user_IDCCR_Form();
            $this->load->view('idccr_login/combined_credit_bureau',$data);
         }
         
        }//ending of else
              
 
 
 }
 public function IDCCR_bureau_reports()
 {
     if(isset($_SESSION['IDCCR_user_email']))
     {
        $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
        $res = $this->Admin_model->Idccr_user_login($data);
        $user_details = $this->Admin_model->Idccr_user_details($res);
        $data['user_details']=$user_details;
        $_SESSION['IDCCR_user_email']= $this->input->post("email");
        $_SESSION['IDCCR_user_pass']= $this->input->post("pass");
        $user_email=$_SESSION['IDCCR_user_email'];
        //echo $user_details->Email;
        //exit();
      //  $customers = $this->Admin_model->getIdccrCustomersList($user_details->Email);
         //$this->load->view('header', $data);
       //  $data['customers'] = $customers;
       //  $this->load->view('idccr_login/show_credit_bureau_reports', $data);
       //   $this->load->view('idccr_login/show_credit_bureau_reports_PG', $data);
            $this->load->view('idccr_login/show_credit_bureau_reports_PG', $data);
     }
     else
     {
         $this->load->helper('url'); 
         $data['error'] = '';  
         $this->load->view('idccr_login/index', $data);
     }
 }
 public function IDCCR_users_pdf($respnse,$email)
 {	//echo "success";
     //exit();
     
     $data['response']=$respnse;
     if(isset($respnse['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ReportOrderNO'])){ $respnse_no=$respnse['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ReportOrderNO'];}
    
    include("./vendor/autoload.php");
    $mpdf = new \Mpdf\Mpdf([
        'setAutoTopMargin' => 'stretch',
        'autoMarginPadding' => 10,
        'orientation' => 'L'
    ]);
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );  
 $mpdf->curlAllowUnsafeSslRequests = true;
    $mpdf->SetHTMLHeader($this->load->view('pdf/IDCCR_header',$data,true));
    $mpdf->SetHTMLFooter($this->load->view('pdf/IDCCR_footer',[],true));
    $mpdf->SetDisplayMode('fullwidth');
    $mpdf->debug = true;
    $mpdf->AddPage();
    $stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
    $stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));

    
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->list_indent_first_level = 0;
    $html = $this->load->view('pdf/IDCCR_report_pdf',$data,true);
    $mpdf->WriteHTML($html);
    //$file_name=md5(rand()).'pdf';
    //$file=$mpdf->Output();
     //file_put_contents('report.pdf',$file);
    //$mpdf->Output('assets/report.pdf','F');
    //$mpdf->Output(base_url('index.php/assets/report.pdf'), 'F');
   /* $directoryName="./images/all_document_pdf/";
                        if(!is_dir($directoryName))
                        {
                                    mkdir($directoryName, 0755);
                                    file_put_contents($mpdf->Output('$respnse_no.pdf','F'));

                        }
                        else
                        {
                            $dir='./images/all_document_pdf/';    
                            $filename= "$respnse_no.pdf";                                      
                             if(file_exists($dir.$filename))
                             {
                                 unlink($dir.$filename);
                                  $mpdf ->Output($dir.$filename,'F');
                             }
                             else
                             {
                               $mpdf ->Output($dir.$filename,'F');
                             }
                        
                        }*/

    $config['protocol']='smtp';
    /*$config['smtp_host']='smtp.zoho.in';
    $config['smtp_port']='465';
    $config['smtp_timeout']='30';
    $config['smtp_crypto']='ssl';
   // $config['smtp_user']='info@finaleap.com';
   // $config['smtp_pass']='skP37cnpCIq0';

    $config['smtp_user']='flconnect@finaleap.com';
    $config['smtp_pass']='iNF0SYS@589';*/
    $config['smtp_host']='smtp-relay.sendinblue.com';
            $config['smtp_port']='587';

            $config['smtp_crypto']='tls';
            $config['smtp_user']='flconnect@finaleap.com';
            $config['smtp_pass']='Qns9hEpIMJVwUFgZ'; 
    
    $config['charset']='utf-8';
    $config['newline']="\r\n";
    $config['wordwrap'] = TRUE;
    $config['mailtype'] = 'text';
    $this->email->initialize($config);
    $this->email->set_newline("\r\n");
    $from_email = "infoflfinserv@finaleap.com";
    $this->email->from($from_email, 'Finaleap'); 
    $this->email->to($email);
    $this->email->subject('Combined Credit Bureau Report'); 
    //$login_details = " Login Credentials are : Email : ".$email." Password : ".$password;
    $this->email->message('Combined Credit Bureau Report');
    $dir='./images/all_document_pdf/'.$respnse_no.'.pdf';
    $this->email->attach('./images/all_document_pdf/'.$respnse_no.'.pdf');
    //Send mail 
    if($this->email->send()) {	
                     
                              if(isset($respnse['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value']))
                                {
                                 $micro=$respnse['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
                                 if(isset($respnse['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
                              {
                                 $credit= $respnse['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']; 
                              }
                              else
                              {
                                 $credit=0;
                              }
                            }
                            else if(isset($respnse['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
                            {
                                 //$credit_score = $respnse['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
                                 $credit= $respnse['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']; 
                                 if(isset($respnse['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value']))
                                {
                                 $micro=$respnse['CCRResponse']['CIRReportDataLst'][1]['CIRReportData']['ScoreDetails'][0]['Value'];
                                }
                                else
                                {
                                 $micro=0;
                                }

                            }
                            else
                            {
                             //$credit_score= 0; 
                             $micro=0;
                             $credit=0;
                            }
                            $email_result['micro']=$micro;
                            $email_result['credit']= $credit;
                            $email_result['email_status']='success';

                            // ==================== added by priya 11-05-2022
                      

                            $dir='./images/all_document_pdf/';    
                             $filename=$respnse_no.".pdf";                                        
                            unlink($dir.$filename);
                                 
                           
                             
                             //============================================
                            return  $email_result;
                         
                            
                            
        
    }
    else
    {
             $this->session->unset_userdata('userdata');
             $email_result['email_status']='fail';
             return  $email_result;
                                        
        
    }
    
      exit();


 }
 //===========================added by papiha


 /*public function dsa_allusers(){
    if($this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('USER_TYPE') != 'Branch_manager' ){
        $this->load->helper('url');  
        $age = $this->session->userdata('AGE');
        $s = $this->input->get('s');
        $search_=$this->input->post('filter_name');
        $select_filters=$this->input->post('select_filters');
        if($s=='')
		 {
			 $s='all';
		 }
        $bank = $this->input->get('bnk_name');
        $city = $this->input->get('city_name');
        $id = $this->session->userdata('ID');
       if($this->session->userdata('USER_TYPE') == 'branch_manager' || $this->session->userdata('USER_TYPE') == 'Relationship_Officer')
        {
             $dsa_arr = $this->Admin_model->getDsaList_userwise($s, $bank ,$city,$id);
        }
        else
        {
             $dsa_arr = $this->Admin_model->getDsaList($s, $bank ,$city);
        }
        $_SESSION["data_for_excel"] =  $dsa_arr ;
       
        $data['row']=$this->Customercrud_model->getProfileData($id);
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

        $data['showNav'] = 1;
        $data['age'] = $age;
        $data['s'] = $s;
        $data['data'] = $dsa_arr;
        $data['userType'] = $this->session->userdata('USER_TYPE');
        //$this->load->view('header', $data);             
        $banks = $this->Admin_model->getBanks();
        $cities = $this->Admin_model->getCity();
        $data['banks'] = $banks;
        $data['cities']=$cities ;
        $this->load->view('dashboard_header', $data); 
        $this->load->view('admin/dsa_allusers', $data); 
    }
    else{
        redirect(base_url('index.php/admin'));
    }
   
    
}*/


/*public function Connector_alluser()
{
	 
       
     if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'Connector')
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
        $data['row']=$this->Customercrud_model->getProfileData($id);
        if($this->session->userdata('USER_TYPE') == 'branch_manager' || $this->session->userdata('USER_TYPE') == 'DSA')
        {
            $Connector_arr = $this->Admin_model->getConnector_branchManger($s,$id);
        }else if($this->session->userdata('USER_TYPE') == 'Relationship_Officer')
        {
            $Connector_arr = $this->Admin_model->getConnector_Relationship_Officer($s,$id);
        }
        else
        {
            $Connector_arr= $this->Admin_model->getConnector($s,$search_name);
        }
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
         //print_r($Connector_arr);
        // exit();
         $this->load->view('dashboard_header', $data);
         $this->load->view('admin/Connector_allusers', $data);   
        
    }        
}*/
//======================== original
/*  
public function customers_allusers(){
		
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
        $this->load->view('admin/Operational_users_customers', $arr);
    }
}
*/
// added by priyanka 29-04-2022 only changes done for RO
public function customers_allusers(){
		
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/login'));
    }
    else{
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
         if($userType=='Relationship_Officer')
        {
             $customers=  $this->Dsacustomers_model->getALLCustomers($id,$userType);        }
        else
        {
            $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
        }
       // $customers = $this->Dsacustomers_model->getCustomers($id, $filter, $userType, $userType2, $date);
       
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
		$data['AADHAR_NUMBER'] = $this->decryption($user_info->AADHAR_NUMBER);
				$data['dob'] = $this->decryption($user_info->DOB);
				 $data['PAN_NUMBER'] = $this->decryption($user_info->PAN_NUMBER);
        $data['username'] =$user_name;
        $arr['userType'] = $userType;
        $arr['customers'] = $customers;
        $arr['s'] = $filter;
        $this->load->view('dashboard_header', $data);
        if($userType=='Relationship_Officer')
        {
            $this->load->view('admin/Operational_users_customers_PG',$arr);
        }
        else
        {
            $this->load->view('admin/Operational_users_customers', $arr);
        }
      
        
    }
}


/*public function Relationship_Officer()
	{
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'Operations_user'){
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
		    $Relation_Officer_arr = $this->Admin_model->getRelationOfficer($s,$id);
            $_SESSION["data_for_excel"] =$Relation_Officer_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['data'] = $Relation_Officer_arr;
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
            $this->load->view('admin/Relationship_Officer', $data);   
			
        }        
	}*/

    

    // --------------------------added by papiha--------------------
	public function get_BranchManager()
	{
		$s="all";
		$bank="";
		$city='';
		$search_name="";
		
		 $dsa_arr = $this->Admin_model->getBrachmanager_for_select();
		 if(!empty($dsa_arr ))
		 {
			 echo json_encode($dsa_arr);
		 }
	}
    public function get_RelationshipManager()
	{
		$s="all";
		$bank="";
		$city='';
		$search_name="";
		
		 $dsa_arr = $this->Admin_model->getRelationshipManager_for_select();
		 if(!empty($dsa_arr ))
		 {
			 echo json_encode($dsa_arr);
		 }
	}
	
    public function get_Connector_AsperBM()
	{


		$BM_ID = $this->input->get('BM_ID');
		$s='all';
		
		 $dsa_arr = $this->Admin_model->getConnector_branchmanger($s,$BM_ID);

		 if(!empty($dsa_arr ))
		 {
			 echo json_encode($dsa_arr);
		 }
	}


	
    public Function save_Excel()
	{
		
				 $this->load->library('excel');

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
                $file_name=$this->session->userdata('file_name');
                if(isset($file_name))
                {
                    $this->excel->getActiveSheet()->setTitle($file_name);
                }
                else{
				$this->excel->getActiveSheet()->setTitle('DSA list');
                }

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
                

				$this->excel->getActiveSheet()->getStyle("A1:K1")->applyFromArray(array("font" => array("bold" => true)));

				/*$this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'FIRST NAME');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'LAST NAME');
                $this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'Profile Status');
				$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'EMAIL ADDRESS');
				$this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'MOBILE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'CITY');
                $this->excel->setActiveSheetIndex(0)->setCellValue('H1', 'Location');
				$this->excel->setActiveSheetIndex(0)->setCellValue('I1', 'Refer By');
                $this->excel->setActiveSheetIndex(0)->setCellValue('J1', 'Login Date');*/
                $this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'NAME');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'CUSTOMER STATUS');
                $this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'APPLICATION STATUS');
				$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'SOURCE NAME');
                $this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'REFERRED BY');
				$this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'CREATED DATE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('H1', 'APPLICATION LAST UPDATED DATE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('I1', 'APPLICATION COMPLETED DATE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('J1', 'CAM COMPLETED DATE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('K1', 'PD COMPLETED DATE');
              
				// get all users in array formate
                $data_for_excel= $this->Dsacustomers_model->download_excel_customer();
				$users=json_decode(json_encode($data_for_excel), true);
                $customer_created_by_data=$this->Dsacustomers_model->getCustomer_created_by();
                $customer_created_by=json_decode(json_encode($customer_created_by_data), true);
				//$this->excel->getActiveSheet()->fromArray($users, null, 'A2');
                 $count=2;
				 $i=1;
				 foreach($users as $row)
				 {
					  /*$this->excel->getActiveSheet()->setCellValue('A'.$count,$i);
					  $this->excel->getActiveSheet()->setCellValue('B'.$count,$row['FN']);
					  $this->excel->getActiveSheet()->setCellValue('C'.$count,$row['LN']);
                      if($row['Profile_Status']=='' || $row['Profile_Status']==NULL)
                      {
                      $this->excel->getActiveSheet()->setCellValue('D'.$count,'Incomplete Profile');
                      }
                      else{
                        $this->excel->getActiveSheet()->setCellValue('D'.$count,'Complete ');
                      }
					  $this->excel->getActiveSheet()->setCellValue('E'.$count,$row['EMAIL']);
					  $this->excel->getActiveSheet()->setCellValue('F'.$count,$row['MOBILE']);
                      $this->excel->getActiveSheet()->setCellValue('G'.$count,$row['CITY']);
                      $this->excel->getActiveSheet()->setCellValue('H'.$count,$row['Location']);
					  $this->excel->getActiveSheet()->setCellValue('I'.$count,$row['Refer_By_Name']);
                      $this->excel->getActiveSheet()->setCellValue('J'.$count,$row['CREATED_AT']);
					  $count++; $i++;*/
                      $this->excel->getActiveSheet()->setCellValue('A'.$count,$i);
                      $this->excel->getActiveSheet()->setCellValue('B'.$count,strtoupper($row['FN'].' '.$row['LN']));
                      if($row['STATUS'] == 'PD Completed')
                      {
                        if( $row['STATUS']=='Rule Engine Process')
                        {
                            $this->excel->getActiveSheet()->setCellValue('C'.$count,strtoupper('Rule Engine Step one'));
                        }
                        else
                        {
                            $this->excel->getActiveSheet()->setCellValue('C'.$count,strtoupper($row['STATUS']));
                        }
                      }
                      else if($row['STATUS'] == 'Aadhar E-sign complete')
					  {
                        if( $row['STATUS']=='Rule Engine Process')
                        {
                            $this->excel->getActiveSheet()->setCellValue('C'.$count,strtoupper('Rule Engine Step one'));
                        }
                        else
                        {
                            $this->excel->getActiveSheet()->setCellValue('C'.$count,strtoupper($row['STATUS']));
                        }
                      }
                      else
                      {
                        if( $row['STATUS']=='Rule Engine Process')
                        {
                            $this->excel->getActiveSheet()->setCellValue('C'.$count,strtoupper('Rule Engine Step one'));
                        }
                        else
                        {
                            $this->excel->getActiveSheet()->setCellValue('C'.$count,strtoupper($row['STATUS']));
                        }
                      }
                      /*--------------------------------Application status----------------------------------------*/
                      if($row['credit_sanction_status'] == 'REJECT')
                      {
                        
                            $this->excel->getActiveSheet()->setCellValue('D'.$count,'REJECTED');
                        
                      }
                      else if($row['credit_sanction_status'] == 'HOLD')
					  {
                        $this->excel->getActiveSheet()->setCellValue('D'.$count,'HOLD');
                      }
                      else
                      {
                        if( $row['STATUS']== 'PD Completed')
                        {
                            $this->excel->getActiveSheet()->setCellValue('D'.$count,$row['STATUS']);
                        }
                        else if($row['STATUS'] == 'Aadhar E-sign complete')
                        {
                            if($row['cam_status'] == 'Cam details complete')
                            {
                                $this->excel->getActiveSheet()->setCellValue('D'.$count,strtoupper('Submitted to Credit'));
                            }
                            else
                            {
                                $this->excel->getActiveSheet()->setCellValue('D'.$count,strtoupper('Submitted to CPA'));
                            }
                        }
                        else if($row['cam_status'] == 'Cam details complete')
                            {
                                $this->excel->getActiveSheet()->setCellValue('D'.$count,strtoupper('Submitted to Credit'));
                            }
                        else
                        {
                            $this->excel->getActiveSheet()->setCellValue('D'.$count,strtoupper('In Progress'));
                        }
                      }
                      /*----------------------------- Source name---------------------------------------*/
                       //  $this->excel->getActiveSheet()->setCellValue('E'.$count,);
                       foreach($customer_created_by as $row1)
																						{ 
									     													if($row['DSA_ID']!=NULL && $row['DSA_ID']!='0' )
																							{
																								if($row1['UNIQUE_CODE']==$row['DSA_ID'])
																								{
																									//echo $row1->FN.' '.$row1->LN.' [DSA]<br>';
                                                                                                    $this->excel->getActiveSheet()->setCellValue('E'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
																								}
																							}
																							else if($row['RO_ID']!=NULL && $row['RO_ID']!='0' )
																							{
																								if($row1['UNIQUE_CODE']==$row['RO_ID'])
																								{
																									//echo $row1->FN.' '.$row1->LN.' [RO]<br>';
                                                                                                    $this->excel->getActiveSheet()->setCellValue('E'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
																								}
																							}
																							else if($row['BM_ID']!=NULL && $row['BM_ID']!='0' )
																							{
																								if($row1['UNIQUE_CODE']==$row['BM_ID'])
																								{
																									//echo $row1->FN.' '.$row1->LN.' [BM]<br>';
                                                                                                    $this->excel->getActiveSheet()->setCellValue('E'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
																								}
																							}
                                                                                            else if($row['SELES_ID']!=NULL && $row['SELES_ID']!='0' )
																							{
																								if($row1['UNIQUE_CODE']==$row['SELES_ID'])
																								{
																									//echo $row1->FN.' '.$row1->LN.' [BM]<br>';
                                                                                                    $this->excel->getActiveSheet()->setCellValue('E'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
																								}
																							}
																						}
                      /*--------------------------------------- Created date----------------------*/
                     $this->excel->getActiveSheet()->setCellValue('F'.$count,strtoupper($row['Refer_By_Name']));
					 $date = date_create($row['CREATED_AT']);
                     $date1 = $row['last_updated_date'];
                     if($date1 =='NULL' || $date1 ==' ' || $date1 =='' )
                     {
                        $date1=' ';
                     }
                     else
                     {
                         if($date1!=' ')
                         {
                        $date1 = date_create($date1);
                        $date1 =date_format($date1, 'd-m-Y');
                         }
                     }
                     $date2 = $row['Application_completed_date'];
                     if($date2 =='NULL'  || $date2 ==' ' || $date2 ==''  )
                     {
                        $date2=' ';
                     }
                     else
                     {
                        if($date2!=' ')
                        {
                        $date2 = date_create($date2);
                        $date2 =  date_format($date2, 'd-m-Y');
                        }
                     }
                     $date3 = $row['Cam_completed_date'];
                     if( $date3=='NULL'  || $date3 ==' ' || $date3 =='' )
                     {
                        $date3=' ';
                     }
                     else
                     {
                        if($date3!=' ')
                        {
                        $date3 = date_create($date3);
                        $date3 = date_format($date3, 'd-m-Y');
                        }
                     }
                     $date4 =$row['PD_completed_date'];
                     if( $date4=='NULL' ||  $date4 ==' '  || $date4 =='')
                     {
                        $date4=' ';  
                     }
                     else
                     {
                        if($date4!=' ')
                        {
                        $date4 = date_create($date4);
                        $date4 = date_format($date4, 'd-m-Y');
                        }
                     }
                     $this->excel->getActiveSheet()->setCellValue('G'.$count,date_format($date, 'd-m-Y'));
                     $this->excel->getActiveSheet()->setCellValue('H'.$count,$date1);
                     $this->excel->getActiveSheet()->setCellValue('I'.$count,$date2);
                     $this->excel->getActiveSheet()->setCellValue('J'.$count,$date3);
                     $this->excel->getActiveSheet()->setCellValue('K'.$count,$date4);
                     $count++; $i++;
				 }
				// read data to active sheet
				
				

				$filename=time().'_Finaleap_data.xlsx'; //save our workbook as this file name

				header('Content-Type: application/vnd.ms-excel'); //mime type

				header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name

				header('Cache-Control: max-age=0'); //no cache

				//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
				//if you want to save it as .XLSX Excel 2007 format

				$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');

				//force user to download the Excel file without writing it to server's HD
						//ob_end_clean();
				$objWriter->save($filename);
	}
	/////////////----------------------------------------------Added by papiha 0 09_12_2021-----------------------------


    public Function download_Excel()
	{
		
				 $this->load->library('excel');

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
                $file_name=$this->session->userdata('file_name');
                
				$this->excel->getActiveSheet()->setTitle('DSA list');
                

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
                

				$this->excel->getActiveSheet()->getStyle("A1:M1")->applyFromArray(array("font" => array("bold" => true)));

				/*$this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'FIRST NAME');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'LAST NAME');
                $this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'Profile Status');
				$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'EMAIL ADDRESS');
				$this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'MOBILE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'CITY');
                $this->excel->setActiveSheetIndex(0)->setCellValue('H1', 'Location');
				$this->excel->setActiveSheetIndex(0)->setCellValue('I1', 'Refer By');
                $this->excel->setActiveSheetIndex(0)->setCellValue('J1', 'Login Date');*/
                $this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
                $this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'Branch');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'NAME');
				$this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'CUSTOMER STATUS');
                $this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'APPLICATION STATUS');
				$this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'SOURCE NAME');
                $this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'REFERRED BY');
				$this->excel->setActiveSheetIndex(0)->setCellValue('H1', 'CREATED DATE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('I1', 'APPLICATION LAST UPDATED DATE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('J1', 'APPLICATION COMPLETED DATE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('K1', 'CAM COMPLETED DATE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('L1', 'PD COMPLETED DATE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('M1', 'Reject Reason ');
               
                
              
				// get all users in array formate
                $data_for_excel= $this->Dsacustomers_model->download_excel_customer();
				$users=json_decode(json_encode($data_for_excel), true);
                $customer_created_by_data=$this->Dsacustomers_model->getCustomer_created_by();
                $customer_created_by=json_decode(json_encode($customer_created_by_data), true);
				//$this->excel->getActiveSheet()->fromArray($users, null, 'A2');
                 $count=2;
				 $i=1;
				 foreach($users as $row)
				 {
					  /*$this->excel->getActiveSheet()->setCellValue('A'.$count,$i);
					  $this->excel->getActiveSheet()->setCellValue('B'.$count,$row['FN']);
					  $this->excel->getActiveSheet()->setCellValue('C'.$count,$row['LN']);
                      if($row['Profile_Status']=='' || $row['Profile_Status']==NULL)
                      {
                      $this->excel->getActiveSheet()->setCellValue('D'.$count,'Incomplete Profile');
                      }
                      else{
                        $this->excel->getActiveSheet()->setCellValue('D'.$count,'Complete ');
                      }
					  $this->excel->getActiveSheet()->setCellValue('E'.$count,$row['EMAIL']);
					  $this->excel->getActiveSheet()->setCellValue('F'.$count,$row['MOBILE']);
                      $this->excel->getActiveSheet()->setCellValue('G'.$count,$row['CITY']);
                      $this->excel->getActiveSheet()->setCellValue('H'.$count,$row['Location']);
					  $this->excel->getActiveSheet()->setCellValue('I'.$count,$row['Refer_By_Name']);
                      $this->excel->getActiveSheet()->setCellValue('J'.$count,$row['CREATED_AT']);
					  $count++; $i++;*/
                      $this->excel->getActiveSheet()->setCellValue('A'.$count,$i);
                      $this->excel->getActiveSheet()->setCellValue('B'.$count,strtoupper($row['Employee_Branch']));
                      $this->excel->getActiveSheet()->setCellValue('C'.$count,strtoupper($row['FN'].' '.$row['LN']));
                      if($row['STATUS'] == 'PD Completed')
                      {
                        if( $row['STATUS']=='Rule Engine Process')
                        {
                            $this->excel->getActiveSheet()->setCellValue('D'.$count,strtoupper('Rule Engine Step one'));
                        }
                        else
                        {
                            $this->excel->getActiveSheet()->setCellValue('D'.$count,strtoupper($row['STATUS']));
                        }
                      }
                      else if($row['STATUS'] == 'Aadhar E-sign complete')
					  {
                        if( $row['STATUS']=='Rule Engine Process')
                        {
                            $this->excel->getActiveSheet()->setCellValue('D'.$count,strtoupper('Rule Engine Step one'));
                        }
                        else
                        {
                            $this->excel->getActiveSheet()->setCellValue('D'.$count,strtoupper($row['STATUS']));
                        }
                      }
                      else
                      {
                        if( $row['STATUS']=='Rule Engine Process')
                        {
                            $this->excel->getActiveSheet()->setCellValue('D'.$count,strtoupper('Rule Engine Step one'));
                        }
                        else
                        {
                            $this->excel->getActiveSheet()->setCellValue('D'.$count,strtoupper($row['STATUS']));
                        }
                      }
                      /*--------------------------------Application status----------------------------------------*/
                      if($row['credit_sanction_status'] == 'REJECT')
                      {
                        
                            $reject_Reson=$this->Dsacustomers_model->reject_case($row['UNIQUE_CODE']);
                            $this->excel->getActiveSheet()->setCellValue('M'.$count,$reject_Reson->REMARK);
                            $this->excel->getActiveSheet()->setCellValue('E'.$count,'REJECTED');
                        
                      }
                      else if($row['credit_sanction_status'] == 'HOLD')
					  {
                        $this->excel->getActiveSheet()->setCellValue('E'.$count,'HOLD');
                      }
                      else
                      {
                        if( $row['STATUS']== 'PD Completed')
                        {
                            $this->excel->getActiveSheet()->setCellValue('E'.$count,$row['STATUS']);
                        }
                        else if($row['STATUS'] == 'Aadhar E-sign complete')
                        {
                            if($row['cam_status'] == 'Cam details complete')
                            {
                                $this->excel->getActiveSheet()->setCellValue('E'.$count,strtoupper('Submitted to Credit'));
                            }
                            else
                            {
                                $this->excel->getActiveSheet()->setCellValue('E'.$count,strtoupper('Submitted to CPA'));
                            }
                        }
                        else if($row['cam_status'] == 'Cam details complete')
                            {
                                $this->excel->getActiveSheet()->setCellValue('E'.$count,strtoupper('Submitted to Credit'));
                            }
                        else
                        {
                            $this->excel->getActiveSheet()->setCellValue('E'.$count,strtoupper('In Progress'));
                        }
                      }
                      /*----------------------------- Source name---------------------------------------*/
                       //  $this->excel->getActiveSheet()->setCellValue('E'.$count,);
                       foreach($customer_created_by as $row1)
																						{ 
									     													if($row['DSA_ID']!=NULL && $row['DSA_ID']!='0' )
																							{
																								if($row1['UNIQUE_CODE']==$row['DSA_ID'])
																								{
																									//echo $row1->FN.' '.$row1->LN.' [DSA]<br>';
                                                                                                    $this->excel->getActiveSheet()->setCellValue('F'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
																								}
																							}
																							else if($row['RO_ID']!=NULL && $row['RO_ID']!='0' )
																							{
																								if($row1['UNIQUE_CODE']==$row['RO_ID'])
																								{
																									//echo $row1->FN.' '.$row1->LN.' [RO]<br>';
                                                                                                    $this->excel->getActiveSheet()->setCellValue('F'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
																								}
																							}
																							else if($row['BM_ID']!=NULL && $row['BM_ID']!='0' )
																							{
																								if($row1['UNIQUE_CODE']==$row['BM_ID'])
																								{
																									//echo $row1->FN.' '.$row1->LN.' [BM]<br>';
                                                                                                    $this->excel->getActiveSheet()->setCellValue('F'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
																								}
																							}
                                                                                            else if($row['SELES_ID']!=NULL && $row['SELES_ID']!='0' )
																							{
																								if($row1['UNIQUE_CODE']==$row['SELES_ID'])
																								{
																									//echo $row1->FN.' '.$row1->LN.' [BM]<br>';
                                                                                                    $this->excel->getActiveSheet()->setCellValue('F'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
																								}
																							}
																						}
                      /*--------------------------------------- Created date----------------------*/
                     $this->excel->getActiveSheet()->setCellValue('G'.$count,strtoupper($row['Refer_By_Name']));
					 $date = date_create($row['CREATED_AT']);
                     $date1 = $row['last_updated_date'];
                     if($date1 =='NULL' || $date1 ==' ' || $date1 =='' )
                     {
                        $date1=' ';
                     }
                     else
                     {
                         if($date1!=' ')
                         {
                        $date1 = date_create($date1);
                        $date1 =date_format($date1, 'd-m-Y');
                         }
                     }
                     $date2 = $row['Application_completed_date'];
                     if($date2 =='NULL'  || $date2 ==' ' || $date2 ==''  )
                     {
                        $date2=' ';
                     }
                     else
                     {
                        if($date2!=' ')
                        {
                        $date2 = date_create($date2);
                        $date2 =  date_format($date2, 'd-m-Y');
                        }
                     }
                     $date3 = $row['Cam_completed_date'];
                     if( $date3=='NULL'  || $date3 ==' ' || $date3 =='' )
                     {
                        $date3=' ';
                     }
                     else
                     {
                        if($date3!=' ')
                        {
                        $date3 = date_create($date3);
                        $date3 = date_format($date3, 'd-m-Y');
                        }
                     }
                     $date4 =$row['PD_completed_date'];
                     if( $date4=='NULL' ||  $date4 ==' '  || $date4 =='')
                     {
                        $date4=' ';  
                     }
                     else
                     {
                        if($date4!=' ')
                        {
                        $date4 = date_create($date4);
                        $date4 = date_format($date4, 'd-m-Y');
                        }
                     }
                     $this->excel->getActiveSheet()->setCellValue('H'.$count,date_format($date, 'd-m-Y'));
                     $this->excel->getActiveSheet()->setCellValue('I'.$count,$date1);
                     $this->excel->getActiveSheet()->setCellValue('J'.$count,$date2);
                     $this->excel->getActiveSheet()->setCellValue('K'.$count,$date3);
                     $this->excel->getActiveSheet()->setCellValue('L'.$count,$date4);
                     
                     $count++; $i++;
				 }
				// read data to active sheet
				
				

				$filename='Finaleap_finserv_customer_data.'. date("d_m_Y").'.xlsx'; //save our workbook as this file name

				header('Content-Type: application/vnd.ms-excel'); //mime type

				header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name

				header('Cache-Control: max-age=0'); //no cache

				//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
				//if you want to save it as .XLSX Excel 2007 format

				$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');

				//f/orce user to download the Excel file without writing it to server's HD
					//	ob_end_clean();
				$objWriter->save('php://output');
	}
	/////////////----------------------------------------------Added by papiha 0 09_12_2021-----------------------------
	
	 public function get_Lead_From_users()
	{
		  $user = $this->input->post('user');
		  $id = $this->session->userdata('ID');
		  if($user=='Connector')
		  {
			  $dsa_arr = $this->Admin_model->get_Lead_From_Connector_for_BM($id );
		  }
		  else if($user=='DSA')
		  {
			 $dsa_arr = $this->Admin_model->get_Lead_From_DSA_for_BM($id );  
		  }
		  else if($user=='Relationship_officer')
		  {
			   $dsa_arr = $this->Admin_model->get_Lead_From_RO_for_BM($id ); 
		  }
		  if(!empty($dsa_arr ))
		 {
			 echo json_encode($dsa_arr);
		 }
		 
		  
	}
	 public function Get_lead_For_Assign()
	{
		$user = $this->input->post('user');
		$user_id = $this->input->post('id');
		
		    if($user=='Connector')
		    {
			  $lead_arr = $this->Admin_model->get_lead_For_Assign_from_connector($user_id );
		    }
			if($user=='DSA')
		    {
			  $lead_arr = $this->Admin_model->get_lead_For_Assign_from_DSA($user_id );
		    }
			if($user=='RO')
		    {
			  $lead_arr = $this->Admin_model->get_lead_For_Assign_from_RO($user_id );
		    }
			if(!empty($lead_arr ))
			 {
				 echo json_encode($lead_arr);
			 }
			
			
		
		 
		 

	}
	function Lead_assign_To_Function()
	{
		$Assign_To=$this->input->post('Lead_Assign_To');
        $Email=$this->input->post('Email');
	    $name=$this->input->post('Lead_Assign_To_name');
		
		$Lead_ID_To_Assign=$_SESSION['Lead_ID_To_Assign'];
		$data = ['Lead_Assign_To' => $Assign_To ];
		//UPDATE `register` SET `Lead_Assign_To` = '788888' WHERE `register`.`id` = 893
		$result='';
		if(!empty($Lead_ID_To_Assign)){foreach($Lead_ID_To_Assign as $Lead_Assign_TO_Id)
		{
			 $result = $this->Admin_model->Assign_Lead($Lead_Assign_TO_Id,$data);
		}}
		if($result > 0)
			{	
			      $this->session->set_flashdata("result", 1);
				  $this->session->set_flashdata("message",'Lead Assign Sucessfully');
				  //$result = $this->Admin_model->get_lead_details($Lead_Assign_TO_Id);
				  $Assign_Leads=[];
				  if(!empty($Lead_ID_To_Assign)){foreach($Lead_ID_To_Assign as $Lead_Assign_TO_Id)
					{
						 $result = $this->Admin_model->get_lead_details($Lead_Assign_TO_Id);
						
						array_push($Assign_Leads,$result[0] );
					}}
				 
				  if($result > 0)
				  {
					  $this->sendEmail_lead($Email,$Assign_Leads,$name);
				  }
				 redirect('dsa/Assign_Lead');
			}
	}	
	
	
	function Get_Id_To_Assign_Lead()
	{
		($_SESSION['Lead_ID_To_Assign']=$_POST['Lead_ID_To_Assign']);
		
	}
     // ============================================== 13-12-2021
     public function get_JobOpenings()
     {
             
          $dsa_arr = $this->Admin_model->get_JobOpenings();
          if(!empty($dsa_arr ))
          {
              echo json_encode($dsa_arr);
          }
     }

     // ========================================17-12-2021 ==========added by priyanka
     public function Internal_bureau_reports()
     {
                
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $id = $this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($id);
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
           // $customers = $this->Admin_model->get_internal_bureau();
            //$this->load->view('header', $data);
            //$data['data'] = $customers;
            $this->load->view('admin/admin_dashbord', $data);
            //$this->load->view('admin/Internal_bureau_reports', $data);
              $this->load->view('admin/Internal_bureau_reports_PG', $data);
        }
    }
    /*-----------------------------added by papiha on 18_12_2021-------------------------------*/
	/*	public function get_Dsa_User()
        {
            $s="all";
            $bank="";
            $city='';
            $search_name="";
            $User_id=$this->input->post('User_id');
             $dsa_arr = $this->Admin_model->getDsa_for_select_user($User_id);
             if(!empty($dsa_arr ))
             {
                 echo json_encode($dsa_arr);
             }
        }*/
        
      /*  public function get_RM_user()
        {
            $s="all";
            $bank="";
            $city='';
            $search_name="";
            $User_id=$this->input->post('User_id');
             $dsa_arr = $this->Admin_model->getRM_for_select_user($User_id);
             if(!empty($dsa_arr ))
             {
                 echo json_encode($dsa_arr);
             }
        }*/
        public function get_customer_user_DSA()
        {
           $User_id=$this->input->post('User_id');
           $User_Type=$this->input->post('User_Type');
           $filter='';
           $userType2='';
           $date='';
           $dsa_arr = $this->Dsacustomers_model->getCustomers($User_id, $filter, $User_Type, $userType2, $date);
                 echo json_encode($dsa_arr);
             
            
        }
       /* public function get_customer_user_RO()
        {
             $User_id=$this->input->post('User_id');
             $dsa_arr = $this->Admin_model->get_customer_user_RO($User_id);
            
                 echo json_encode($dsa_arr);
             
            
        }*/

        //=========================================added by priyanka 25-12-2021====================
		public function Relationship_Officer_list()
	  {
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'Operations_user'  || $this->session->userdata('SITE') != 'finserv'){
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
            $userType=$this->session->userdata('USER_TYPE');
			$data['row1']=$this->Customercrud_model->getProfileData($id);
		    $Relation_Officer_arr = $this->Admin_model->getRelationOfficer_list($s);
            $_SESSION["data_for_excel"] =$Relation_Officer_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] =$s ;
            $data['data'] = $Relation_Officer_arr;
            $data['userType']=$userType;
			//$this->load->view('dashboard_header', $data);
            $this->load->view('admin/Relationship_Officer_list', $data);   
			
        }        
	 }
     //===========================================added by priyanka 28-12-2021====================
     public function delete_RelationshipOfficer()
	{
		$id=$this->input->post('id');
        $delete_RO = $this->Admin_model->delete_customer($id);
		$this->Relationship_Officer_list();
		
	}
    public function delete_HR()
	{
		$id=$this->input->post('id');
		$delete_HR = $this->Admin_model->delete_customer($id);
		$this->HR();
		
	}
      public function delete_RO()
	{
		$id=$this->input->post('id');
		$delete_HR = $this->Admin_model->delete_customer($id);
		$this->Relationship_Officer();
		
	}
    
	public function delete_credit_manager()
	{
		$id=$this->input->post('id');
		$delete_HR = $this->Admin_model->delete_customer($id);
		$this->credit_manager_user();

		
	}
    /*----------------------------------------------Added by papiha on 27_12_2021-------------------------*/
	public function get_user_data()
	{
		 $User_id=$this->input->post('User_id');
         $filter='';
         $User_Type='';
         $userType2='';
         $date='';

		 $dsa_arr = $this->Customercrud_model->getProfileData($User_id);
        // print_r($dsa_arr);
         // echo $dsa_arr->UNIQUE_CODE;
         $response = array('UNIQUE_CODE' => $dsa_arr->UNIQUE_CODE, 'FN' => $dsa_arr->FN,'LN' => $dsa_arr->LN);
         /*if(!empty($dsa_arr ))
           {
               return json_encode($dsa_arr);
           }*/
          // $dsa_arr = $this->Dsacustomers_model->getCustomers($User_id, $filter, $User_Type, $userType2, $date);
    
           echo json_encode($response);		 
		
	}public function sendEmail_lead($email,$data,$name)
	{
		   
		
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
			//$code = $this->generate_uuid();
			//$from_email = "infoflfinserv@finaleap.com";
			$this->email->from($from_email, 'Finaleap Finserv'); 

			
				$send_email_to_support=$email;
				//$send_email_to_support='piyuabdagire@gmail.com ,poojavishwa566@gmail.com';
			
				//$send_email_to_support='info@finaleap.com';
				$this->email->to($send_email_to_support);
				$this->email->subject('Assigned Leads'); 
		
			
			$z=1;
                $msg='';
				foreach ($data as $info)
				{
					$msg.='
					Lead No - '.$z.'
					Lead Name - '.$info->first_name.' '.$info->last_name.'
					Mobile - '.$info->mobile.'
					Email - '.$info->email.'
					Address-'.$info->address.'
					
					';
					
					$z++;
					
				}
				
				$this->email->message('Dear '.$name.','."\r\n\n".$msg."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
				
			//	$this->email->message('Dear Team ,'."\r\n\n".'Following application is accepted by - '.$HR_name."\r\n".'Name		:'.$name."\r\n".'Applied for	:'.$applied_for."\r\n".'Email ID	:'.$email."\r\n".'Mobile		:'.$mobile."\r\n".'Total Experience	:'.$total_experience."\r\n".'Applied on		:'.$date."\r\n\n\n".'Best Regards,'."\r\n".'Finaleap Private Limited '); 
				$this->email->send();
				
			
	}
     //====================================Added by papiha on 10_01_2022=================================================================//
    public function Cluster_Manager()
    {
        
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            if($s=='')
            {
                $s='all';
            }

               if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['End_Date'];
         }
         else{
             $data['End_Date']='';
         }
         if(isset($_GET['filter']))
         {
                 $filter=$_GET['filter'];
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
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }

        $filter_location = $this->Admin_model->getLocationByData();
        $data['filter_location']=$filter_location ;
           // $Cluster_Manager_arr = $this->Admin_model->getCluster_Manager($s);
           // $_SESSION["data_for_excel"] = $Cluster_Manager_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           // $data['data'] =$Cluster_Manager_arr;
            $this->load->view('admin/admin_dashbord', $data);
           // $this->load->view('admin/Cluster_Manager', $data);  
           $this->load->view('admin/Cluster_Manager_PG', $data);  // changes by sonal
            
        }        
    }
    public function delete_Cluster_Manager()
	{
		$id= $this->input->post('id');
		
		$result=$this->Admin_model->delete_customer($id);
		if($result > 0)
		{
			$this->session->set_flashdata("result", 1);
			 $this->session->set_flashdata("message",'Cluster Manager Deleted Sucessfully' );
			 redirect('admin/Cluster_Manager?s=all');
		}
		else
		{
			$this->session->set_flashdata("result", 2);
			 $this->session->set_flashdata("message",'Something get Wrong' );
			 redirect('admin/Cluster_Manager?s=all');
		}

	}
    /*-------------------------------Added by papiha on  13_01_2022-------------------------------------*/
	  public function get_BM_user()
      {
          $s="all";
          $bank="";
          $city='';
          $search_name="";
          $User_id=$this->input->post('User_id');
           $dsa_arr = $this->Admin_model->getBM_for_select_user($User_id);
           if(!empty($dsa_arr ))
           {
               echo json_encode($dsa_arr);
           }
      }
      public function get_customer_user_BM()
      {
           $User_id=$this->input->post('User_id');
           $User_Type=$this->input->post('User_Type');
           
           $filter='';
           $userType2='';
           $date='';
           $dsa_arr = $this->Dsacustomers_model->getCustomers($User_id, $filter, $User_Type, $userType2, $date);
          
               echo json_encode($dsa_arr);
           
          
      }
      /*---------------------------------------Added by papiha-----------------------------------------------------*/
     public function Area_Manager()
	 {
		  
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s=='')
			{
				$s='all';
			}
     	    $Area_Manager_arr = $this->Admin_model->getArea_Manager($s);
            $_SESSION["data_for_excel"] = $Area_Manager_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['data'] =$Area_Manager_arr;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/Area_Manager', $data);   
			
        }      
	 }		
     /*public function get_Connector_user_BM()
     {
          $User_id=$this->input->post('User_id');
          $dsa_arr = $this->Admin_model->get_Connector_user_BM($User_id);
         
              echo json_encode($dsa_arr);
          
         
     }		*/
  /*-----------------------------------------Added by papiha 0n 24_01_2022--------------------------------------*/
	public function Monthly_Billing()
	{
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s=='')
			{
				$s='all';
			}
     	    $data['Bank_names'] = $this->Admin_model->getcooperator_Banks();
			
           
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/calculate_biiling', $data);   
			
        }      
	}
	public function get_cooperator_Loan_type()
	{
		$bank_id=$this->input->post('bank_id');
		 $Loan_types= $this->Admin_model->getcooperator_Loan_type($bank_id);
		 echo json_encode($Loan_types);
		//return $bank_id;
	}
	/*---------------------Added by papiha on 25_01_2022-------------------------------------------------------*/
	public function get_rate_of_intrest()
	{
		$bank_id=$this->input->post('Bank_name');
		$loan_type=$this->input->post('Loan_Type');
		$Rate_of_Intrest= $this->Admin_model->get_rate_of_intrest($bank_id,$loan_type);
       
		$start_date=$this->input->post('Start_Date');
		$end_date=$this->input->post('End_Date');
		$get_Loan_disbured_customers=$this->Admin_model->get_Loan_disbured_customers($bank_id,$loan_type);
       // echo'<pre>';
       // print_r($get_Loan_disbured_customers);
        //exit;
		$this->Amortization($get_Loan_disbured_customers,$Rate_of_Intrest,$start_date,$end_date);
		
		
	}
	public function Amortization($get_Loan_disbured_customers,$Rate_of_Intrest,$start_date,$end_date)
	{
		$array_intrest_final=array();
	    include "class.amort.php";
        //echo'<pre>';
        // print_r($get_Loan_disbured_customers);
        // exit;
        $i=1;
		Foreach($get_Loan_disbured_customers as $Customer)
		{
           // echo'<pre>';
         // print_r($Customer);
			    $amount= $Customer->Loan_Amount_Disbursed;
				$rate=$Customer->Rate_Of_Intrest;
				$years=$Customer->Tenure;
				$monthly_emi_date=$Customer->EMI_Start_Date;
				$start_date=$start_date;
				$end_date=$end_date;
				$profile_info = $this->Dsacrud_model->getProfileData($Customer->Cust_Id);
				$date=date_create($monthly_emi_date);
				date_format($date,"d-m-Y");
                /*echo $amount.'<br>';
                echo $rate.'<br>';
                echo $years.'<br>';
                echo $monthly_emi_date;
                exit;*/
				$am=new amort($amount,$rate,$years,$monthly_emi_date);
				
				$array_intrest=$am->Get_Monthly_EMI($start_date,$end_date);
               // echo $i;
				
				$Rate_of_Intrest= $this->Admin_model->get_rate_of_intrest($Customer->Name_Of_Bank,$Customer->Loan_Type);
				foreach($array_intrest as $data)
				{
					//echo '<pre>';
					//print_r($data);
					   if(!empty($profile_info->FN))
                       {
                           $FN=$profile_info->FN;
                       }
                       else{
                        $FN="";
                       }
                       if(!empty($profile_info->LN))
                       {
                           $LN=$profile_info->LN;
                       }
                       else{
                        $LN="";
                       }
						$data['Customer_name']=$FN.' '.$LN; 
						$them= $data['Interest_Payment']*$Rate_of_Intrest/100;
						//$profit=$data['Interest_Payment']*$Rate_of_Intrest/$rate;
						$profit=$data['Interest_Payment']*($rate-$Rate_of_Intrest)/$rate;
						$data['Profit']=$profit;
						$GST_Amount=$profit*18/100;
						$data['GST_Amount']=$GST_Amount;
                        $data['Rate_Of_Intrest']=$rate;
						$data['Tenure']=$years;
						array_push($array_intrest_final,$data);
					
				}
				/*if(!empty($array_intrest))
				{
				    $array_intrest['Customer_name']=$profile_info->FN.' '.$profile_info->LN; 
				    $them= $array_intrest['Interest_Payment']*$Rate_of_Intrest/100;
					$profit=$array_intrest['Interest_Payment']*$Rate_of_Intrest/$rate;
					
				    $array_intrest['Profit']=$profit;
					array_push($array_intrest_final,$array_intrest);
				}*/
			   
				
				//print_r($array_intrest_final);
                //$i++;
		}
        
	    $_SESSION["data_for_excel"] =$array_intrest_final;
		$data['array_intrest_final']=$array_intrest_final;
		$this->load->view('admin/Billing_details',$data);
		//$this->showtable($array_intrest_final);
	}
	public function showtable($array_intrest_final)
	{	
	/*print "</table>";
  print "<table border='1' width='100%'><tr>";
  print "<td width='14%' align='center'>Payment Number</td>";
  print "<td width='14%' align='center'>Beginning Balance</td>";
  print "<td width='14%' align='center'>EMI Date</td>";
  print "<td width='14%' align='center'>Interest Payment</td>";
  print "<td width='14%' align='center'>Our Payment</td>";
  print "<td width='14%' align='center'>Principal Payment</td>";
  print "<td width='14%' align='center'>Ending Balance</td>";
  print "<td width='14%' align='center'>Cumulative Interest</td>";
  print "<td width='14%' align='center'>Cumulative Payments</td>";
   print "<td width='14%' align='center'>Customer Name</td>";
   
 print "</tr>";

$count=count($array_intrest_final);


	foreach($array_intrest_final as $array_intrest)
	{
		
	  print "<tr>";

	  print "<td width='14%' align='right'>". $array_intrest['Payment Number'] . "</td>";
	  print "<td width='14%' align='right'>" . $array_intrest['Beginning Balance']. "</td>";
	  print "<td width='14%' align='right'>" . $array_intrest['EMI Date'] . "</td>";
	  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$array_intrest['Interest Payment']),2) . "</td>";
	  print "<td width='14%' align='right'>" . number_format(sprintf("%01.2f",$array_intrest['Profit']),2) . "</td>";
	  print "<td width='14%' align='right'>" .$array_intrest['Principal Payment']. "</td>";
	  print "<td width='14%' align='right'>" .$array_intrest['Ending Balance'] . "</td>";
	  print "<td width='14%' align='right'>" .$array_intrest['Cumulative Interest'] . "</td>";
	  print "<td width='14%' align='right'>" .$array_intrest['Cumulative Payments'] . "</td>";
	  print "<td width='14%' align='right'>" .$array_intrest['Customer name'] . "</td>";
	  print "</tr>";
	}

 
 print "</table>";*/
 }
 /*-------------------------------------added by papiha on  28_01_2022--------------------------------------------*/
 
 /*public function get_Connector_user_BM()
        {
             $User_id=$this->input->post('User_id');
             $dsa_arr = $this->Admin_model->get_Connector_user_BM($User_id);
            
                 echo json_encode($dsa_arr);
             
            
        }*/
/*-----------------------------------Added by papiha on 29_01_2022-------------------------------------------------------*/
    public Function download_Excel_Monthly_Billing()
	{
		
				 $this->load->library('excel');

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
				$this->excel->getActiveSheet()->setTitle('Monthly_Billing');

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


				$this->excel->getActiveSheet()->getStyle("A1:J1")->applyFromArray(array("font" => array("bold" => true)));

				$this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'Customer Name');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'EMI');
				$this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'Beginning Balance');
				$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'EMI Date');
                $this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'Interest Payment');
                $this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'Finaleap Payment');
				$this->excel->setActiveSheetIndex(0)->setCellValue('H1', 'GST Amount');
                $this->excel->setActiveSheetIndex(0)->setCellValue('I1', 'Principal Payment');
				$this->excel->setActiveSheetIndex(0)->setCellValue('J1', 'Ending Balance');

				// get all users in array formate
                $data_for_excel= $this->session->userdata('data_for_excel');
				//$users=json_decode(json_encode($data_for_excel), true);
				//$this->excel->getActiveSheet()->fromArray($users, null, 'A2');
                 $count=2;
				 $i=1;
				 $total=0; $Total_GstAmout=0;
				
				 foreach($data_for_excel as $row)
				 {
					 $total=$total+$row['Profit'];  $Total_GstAmout=$Total_GstAmout+$row['GST_Amount'];
					  $this->excel->getActiveSheet()->setCellValue('A'.$count,$i);
					  $this->excel->getActiveSheet()->setCellValue('B'.$count,$row['Customer_name']);
					  $this->excel->getActiveSheet()->setCellValue('C'.$count,$row['Payment_Number']);
					 
					 // $this->excel->getActiveSheet()->getStyle('D')->getNumberFormat()->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_TEXT );
					  $this->excel->getActiveSheet()->getStyle('D'.$count)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
					  $this->excel->getActiveSheet()->setCellValue('D'.$count,$row['Beginning_Balance']);
					  $this->excel->getActiveSheet()->setCellValue('E'.$count,$row['EMI_Date']);
					  $this->excel->getActiveSheet()->getStyle('F'.$count)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
                      $this->excel->getActiveSheet()->setCellValue('F'.$count,$row['Interest_Payment']);
					  $this->excel->getActiveSheet()->getStyle('G'.$count)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
                      $this->excel->getActiveSheet()->setCellValue('G'.$count,$row['Profit']);
					  $this->excel->getActiveSheet()->getStyle('H'.$count)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
					  $this->excel->getActiveSheet()->setCellValue('H'.$count,$row['GST_Amount']);
					  $this->excel->getActiveSheet()->getStyle('I'.$count)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
					  $this->excel->getActiveSheet()->setCellValue('I'.$count,$row['Principal_Payment']);
					  $this->excel->getActiveSheet()->getStyle('J'.$count)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
					  $this->excel->getActiveSheet()->setCellValue('J'.$count,$row['Ending_Balance']);
					  $count++; $i++;
				 }
				// read data to active sheet
				$num_rows = $this->excel->getActiveSheet()->getHighestRow();
				$current_row=$num_rows+1;
				$this->excel->getActiveSheet()->getStyle('F'.$current_row)->applyFromArray(array("font" => array("bold" => true)));
				$this->excel->getActiveSheet()->setCellValue('F'.$current_row,'SubTotal');
				$this->excel->getActiveSheet()->getStyle('G'.$current_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
				//$this->excel->getActiveSheet()->getStyle('G'.$current_row)->setBold(); 
				$this->excel->getActiveSheet()->getStyle('G'.$current_row)->applyFromArray(array("font" => array("bold" => true)));
				$this->excel->getActiveSheet()->setCellValue('G'.$current_row,$total);
				$this->excel->getActiveSheet()->getStyle('H'.$current_row)->applyFromArray(array("font" => array("bold" => true)));
				$this->excel->getActiveSheet()->getStyle('H'.$current_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
				$this->excel->getActiveSheet()->setCellValue('H'.$current_row,$Total_GstAmout);
				$next_row=$current_row+1;
				$this->excel->getActiveSheet()->setCellValue('F'.$next_row,'Total');
				$this->excel->getActiveSheet()->getStyle('G'.$next_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
				$this->excel->getActiveSheet()->mergeCells("G".$next_row. ':H'.$next_row);
				$this->excel->getActiveSheet()->getStyle('G'.$next_row)->applyFromArray(array("alignment" => array("horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)));
				//$this->excel->getActiveSheet()->getStyle('G'.$next_row)->applyFromArray(array("alignment" => array("fill" => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb' => '#ffff00')))));
				$this->excel->getActiveSheet()->getStyle('G'.$next_row)->applyFromArray(array('fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb' => 'FFFF00'))));
               $this->excel->getActiveSheet()->getStyle('G'.$next_row)->applyFromArray(array("font" => array("bold" => true)));
				$this->excel->getActiveSheet()->setCellValue('G'.$next_row,$Total_GstAmout+$total);
				//exit;

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
	/*--------------------------------------------Added by papiha on 29_01_2022 for one time billing --------------------------------------------*/
	public function One_Monthly_Billing()
	{
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s=='')
			{
				$s='all';
			}
     	    $data['Bank_names'] = $this->Admin_model->getcooperator_Banks();
			
           
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/one_time_calculate_biiling', $data);   
			
        }      
	}
	
	public function get_insurance_amount()
	{
		
		$bank_id=$this->input->post('Bank_name');
		$loan_type=$this->input->post('Loan_Type');
        
		$calulate_amount =$this->Admin_model->get_insurance_amount($bank_id,$loan_type);
		$start_date=$this->input->post('Start_Date');
		$end_date=$this->input->post('End_Date');
		$get_Loan_disbured_customers_one=$this->Admin_model->get_Loan_disbured_customers_one($bank_id,$loan_type,$start_date,$end_date);
		$get_Loan_disbured_customers_one = json_decode(json_encode($get_Loan_disbured_customers_one), true);
		$customer_final=array();
		foreach($get_Loan_disbured_customers_one as $Customer)
				{
					//echo '<pre>';
					//print_r($data);
						$profile_info = $this->Dsacrud_model->getProfileData($Customer['Cust_Id']);
						//$data['Customer_name']=
						//foreach($Customer as $row)
						//{
							//$final_customer
						//}	
						
						$data['customer_name']=$profile_info->FN.' '.$profile_info->LN;
						$data['Loan_Type']=$Customer['Loan_Type'];
						$data['Loan_Amount_Saction']=$Customer['Loan_Amount_Saction'];
						$data['Processing_Fees']=$Customer['Processing_Fees'];
					    $data['Insurance_Amount']=$Customer['Insurance_Amount'];
						array_push($customer_final,$data);
						
					
				}
				
				
		
		$details_array['array_intrest_final']=$customer_final;
	    $details_array['Processing_Fees']=$calulate_amount->Processing_Fees;
		$details_array['Insurance_Amount']=$calulate_amount->Insurance_Amount;
		$_SESSION["data_for_excel"] =$details_array;
		$this->load->view('admin/one_time_billing_details',$details_array);
	}
	public Function download_Exce_One_Time_Monthly_Billing()
	{
		
		 $data_for_excel= $this->session->userdata('data_for_excel');
		
	
				 $this->load->library('excel');

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
				$this->excel->getActiveSheet()->setTitle('Monthly_Billing');

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


				$this->excel->getActiveSheet()->getStyle("A1:J1")->applyFromArray(array("font" => array("bold" => true)));

				$this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'Customer Name');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'Loan Type');
				$this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'Loan Amount Saction');
				$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'Bank Processing Fees in (%)');
                $this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'Finaleap Processing Fees in (%)');
                $this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'finaleap Processing fees in Rupees');
				$this->excel->setActiveSheetIndex(0)->setCellValue('H1', 'Insurance Ammount Taken');
                $this->excel->setActiveSheetIndex(0)->setCellValue('I1', 'Bank Insurance in (%)');
				$this->excel->setActiveSheetIndex(0)->setCellValue('J1', 'Finaleap Insurance Amount');
				$this->excel->setActiveSheetIndex(0)->setCellValue('K1', 'GST Amount (18%)');

				// get all users in array formate
               
				
				//$users=json_decode(json_encode($data_for_excel), true);
				//$this->excel->getActiveSheet()->fromArray($users, null, 'A2');
                 $count=2;
				 $i=1;
				$finaleap_isurance_Amount=0; 
				$finaleap_Processing_fee_amount=0; 
				$finaleap_GST_Amount=0; 
				
				
				if(!empty( $data_for_excel['array_intrest_final']))
				{
					/*echo'<pre>';
					print_r($data_for_excel);
                    exit;*/
					foreach ($data_for_excel['array_intrest_final'] as $row)
					{
				      
                       

						  
					      $Finaleap_pf=$row['Loan_Amount_Saction']*$row['Processing_Fees']/100; 
						  $bank_pf=$Finaleap_pf*$data_for_excel['Processing_Fees']/100; 
						  $bank_insurance=$row['Insurance_Amount']*$data_for_excel['Insurance_Amount']/100; 
						  $finaleap_Processing_fee=$Finaleap_pf-$bank_pf;
						  $finaleap_isurance=$row['Insurance_Amount']-$bank_insurance; 
						  $finaleap_GST=($finaleap_isurance+$finaleap_Processing_fee)*18/100;
						  $finaleap_isurance_Amount=$finaleap_isurance_Amount+$finaleap_isurance;
						  $finaleap_Processing_fee_amount=$finaleap_Processing_fee_amount+$finaleap_Processing_fee;
						  $finaleap_GST_Amount=$finaleap_GST_Amount+$finaleap_GST;
						
						 
						  $this->excel->getActiveSheet()->setCellValue('A'.$count,$i);
						  $this->excel->getActiveSheet()->setCellValue('B'.$count,$row['customer_name']);
						  $this->excel->getActiveSheet()->setCellValue('C'.$count,$row['Loan_Type']);
						 
						 // $this->excel->getActiveSheet()->getStyle('D')->getNumberFormat()->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_TEXT );
						  $this->excel->getActiveSheet()->getStyle('D'.$count)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
						  $this->excel->getActiveSheet()->setCellValue('D'.$count,$row['Loan_Amount_Saction']);
						  // $this->excel->getActiveSheet()->getStyle('E'.$count)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
						  $this->excel->getActiveSheet()->setCellValue('E'.$count,$row['Processing_Fees']*$data_for_excel['Processing_Fees']/100);
						 // $this->excel->getActiveSheet()->getStyle('F'.$count)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
						  $this->excel->getActiveSheet()->setCellValue('F'.$count,$row['Processing_Fees']-($row['Processing_Fees']*$data_for_excel['Processing_Fees']/100));
						  $this->excel->getActiveSheet()->getStyle('G'.$count)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
						  $this->excel->getActiveSheet()->setCellValue('G'.$count,$finaleap_Processing_fee);
						  $this->excel->getActiveSheet()->getStyle('H'.$count)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
						  $this->excel->getActiveSheet()->setCellValue('H'.$count,$row['Insurance_Amount']);
						  $this->excel->getActiveSheet()->getStyle('I'.$count)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
						  $this->excel->getActiveSheet()->setCellValue('I'.$count,$data_for_excel['Insurance_Amount']);
						  $this->excel->getActiveSheet()->getStyle('J'.$count)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
						  $this->excel->getActiveSheet()->setCellValue('J'.$count,$finaleap_isurance);
						  $this->excel->getActiveSheet()->getStyle('K'.$count)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
						  $this->excel->getActiveSheet()->setCellValue('K'.$count,$finaleap_GST);
						  $count++; $i++;
					 
					}
				}
				// read data to active sheet
				$num_rows = $this->excel->getActiveSheet()->getHighestRow();
				$current_row=$num_rows+1;
				$this->excel->getActiveSheet()->getStyle('G'.$current_row)->applyFromArray(array("font" => array("bold" => true)));
				$this->excel->getActiveSheet()->setCellValue('G'.$current_row,'SubTotal');
				$this->excel->getActiveSheet()->getStyle('H'.$current_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
				//$this->excel->getActiveSheet()->getStyle('G'.$current_row)->setBold(); 
				$this->excel->getActiveSheet()->getStyle('H'.$current_row)->applyFromArray(array("font" => array("bold" => true)));
				$this->excel->getActiveSheet()->setCellValue('H'.$current_row,$finaleap_Processing_fee_amount);
				$this->excel->getActiveSheet()->getStyle('J'.$current_row)->applyFromArray(array("font" => array("bold" => true)));
				$this->excel->getActiveSheet()->getStyle('J'.$current_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
				$this->excel->getActiveSheet()->setCellValue('J'.$current_row,$finaleap_isurance_Amount);
				$this->excel->getActiveSheet()->getStyle('K'.$current_row)->applyFromArray(array("font" => array("bold" => true)));
				$this->excel->getActiveSheet()->getStyle('K'.$current_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
				$this->excel->getActiveSheet()->setCellValue('K'.$current_row,$finaleap_GST_Amount);
				$next_row=$current_row+1;
				$this->excel->getActiveSheet()->setCellValue('H'.$next_row,'Total');
				$this->excel->getActiveSheet()->getStyle('H'.$next_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1); 
				$this->excel->getActiveSheet()->mergeCells("H".$next_row. ':K'.$next_row);
				$this->excel->getActiveSheet()->getStyle('H'.$next_row)->applyFromArray(array("alignment" => array("horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)));
				//$this->excel->getActiveSheet()->getStyle('G'.$next_row)->applyFromArray(array("alignment" => array("fill" => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb' => '#ffff00')))));
				$this->excel->getActiveSheet()->getStyle('H'.$next_row)->applyFromArray(array('fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb' => 'FFFF00'))));
               $this->excel->getActiveSheet()->getStyle('H'.$next_row)->applyFromArray(array("font" => array("bold" => true)));
				$this->excel->getActiveSheet()->setCellValue('H'.$next_row,$finaleap_Processing_fee_amount+$finaleap_isurance_Amount+$finaleap_GST_Amount);
				//exit;

				$filename='Finaleap_data.xlsx'; //save our workbook as this file name

				header('Content-Type: application/vnd.ms-excel'); //mime type

				header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name

				header('Cache-Control: max-age=0'); //no cache

				//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
				//if you want to save it as .XLSX Excel 2007 format

				$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');

				//force user to download the Excel file without writing it to server's HD
						//ob_end_clean();
				$objWriter->save('php://output');
	}
/*--------------------------------------------Added by papiha on 1_02_2022----------------------------------------*/
public function manage_coorporate_banks(){
		
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/admin'));
    }else{
        $this->load->helper('url');
        $type = $this->input->get('type');
        $age = $this->session->userdata('AGE');
        $data['showNav'] = 1;
        $data['age'] = $age;
        $data['type'] = $type;
        $data['userType'] = $this->session->userdata("USER_TYPE");
        $doc_types = $this->Admin_model->get_corporate_Banks();
        //$this->load->view('header', $data);
        $data['banks'] = $doc_types;
         $this->load->view('admin/admin_dashbord', $data);  
        $this->load->view('admin/manage_coorporate_banks', $data);
    }
}


public function new_corporate_admin_bank(){
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/admin'));
    }else{
        $this->load->helper('url');
        $type = $this->input->get('type');
        $age = $this->session->userdata('AGE');
        $data['showNav'] = 1;
        $data['age'] = $age;
        $data['type'] = $type;
        $data['userType'] = $this->session->userdata("USER_TYPE");
        //  $this->load->view('header', $data);
        $this->load->view('admin/new_corporate_bank');
    }
}
/*public function new_corporate_admin_bank_action(){
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'){
        redirect(base_url('index.php/admin'));
    }else{
        $array_input = array(
            'BANK_NAME' => $this->input->post('bank_name'),            
        );
        
        $idS = $this->Admin_model->save_corporate_Bank($array_input);
        if($idS > 0){   
            $response = array('status' => $idS, 'message' => "Bank saved successfully");
            echo json_encode($response);
        }else {
            $response = array('status' => $idS, 'message' => "Error in bank save");
            echo json_encode($response);
        }
    }
}*/
public function delete_admin_corporate_bank(){
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/admin'));
    }else{
        $array_input = array(
            'id' => $this->input->post('id')        
        );      
        
        $id = $this->Admin_model->delete_corporate_bank($array_input);
        if($id > 0){            
            $response = array('status' => 1, 'message' => 'Bank deleted successfully');
            echo json_encode($response);
        }else {
            $response = array('status' => 0, 'message' => 'Error in bank delete');
            echo json_encode($response);
        }
    }
}
public function Save_Bank_details(){
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/admin'));
    }else{
        $array_input = array(
            'bank_id' => $this->input->post('id') ,
            'Processing_Fees'=> $this->input->post('Processing_fess'), 
            'Insurance_Amount'=> $this->input->post('Insurance_fees'),
            'rate_of_intrest'=> $this->input->post('Rate_of_intrest'),
            'loan_type'=>$this->input->post('Loan_type')			
        );      
        
        $id = $this->Admin_model->save_corporate_Bank_details($array_input);
        if($id > 0){            
            $response = array('status' => 1, 'message' => 'Bank Details Save successfully');
            echo json_encode($response);
        }else {
            $response = array('status' => 0, 'message' => 'Error in bank Details Save');
            echo json_encode($response);
        }
    }
}

 public function edit_corporate_bank(){
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/admin'));
    }else{
        $id=$this->input->get('id');
        $this->load->helper('url');
        $type = $this->input->get('type');
        $age = $this->session->userdata('AGE');
        $data['showNav'] = 1;
        $data['age'] = $age;
        $data['type'] = $type;
        $data['userType'] = $this->session->userdata("USER_TYPE");
        $data['corporate_bank_details'] = $this->Admin_model->corporate_bank_details($id);
        $data['corporate_bank_name'] = $this->Admin_model->get_corporate_Banks_by_id($id);
        
        $this->load->view('admin/corporate_bank_details',$data);
    }
}

public function Update_bank_details(){
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/admin'));
    }else{

        $Update = $this->input->post('Update');
        $delete =$this->input->post('delete'); 
        $Reset =$this->input->post('Reset');

        
        if(isset($Update))
        {
            // echo "edit";exit();
            $id= $this->input->post('id');
            $bank_id=$this->input->post('bank_id');
            $array_input = array(
                'loan_type' => $this->input->post('loan_type'),   
                'rate_of_intrest' => $this->input->post('rate_of_intrest'), 
                'Processing_Fees' => $this->input->post('Processing_Fees'),    
                'Insurance_Amount' => $this->input->post('Insurance_Amount'),
              
                );
                $idS = $this->Admin_model->Update_bank_details($array_input,$id);
                if($idS > 0){   
                    $this->session->set_flashdata("result", 3);
                   // $this->edit_corporate_bank();
                    redirect('admin/edit_corporate_bank?id='.$bank_id);
                }else {
                    $this->session->set_flashdata("result",0 );
                    //$this->IDCCR_USERS();
                    redirect('admin/edit_corporate_bank?id='.$bank_id);
                }
        }
        
        
    }
}
/*------------------------------------------Added by papiha on 11_02_2022---------------------------------------------------------------*/
public function Get_notification()
	{
		if(isset($_POST['user_id']))
		{
			$user_id = $this->input->post('user_id');
		   
			$notifications=$this->Admin_model->Get_notifications($user_id);
			//echo $notifications;
			echo json_encode($notifications);
			//return $notifications;
		}
	}
	public function change_notification_satus()
	{
		
		if(isset($_POST['user_id']))
		{
			$user_id = $this->input->post('user_id');
		    //$data['status'=>'seen'];
			$data = ['status' =>'seen'];
			$notifications=$this->Admin_model->change_notification_satus($user_id,$data);
			//echo $notifications;
			echo json_encode($notifications);
			//return $notifications;
		}
	}
    /*------------------------------------Added by papiha on 12_02_2022----------------------------------------*/
   /* public function New_Branch_Location(){
		
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
            $Cities = $this->Admin_model->get_Master_Cities();
            //$this->load->view('header', $data);
            $data['Cities'] = $Cities;
            $this->load->view('admin/admin_dashbord', $data);   
            $this->load->view('admin/Add_Branch_Location', $data);
        }
    }*/
	public function Add_New_City(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
            //  $this->load->view('header', $data);
            $this->load->view('admin/Add_New_City');
        }
    }
	public function add_new_city_action(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $array_input = array(
                'city_name' => $this->input->post('city_name'),            
            );
            
            $idS = $this->Admin_model->save_master_city($array_input);
            if($idS > 0){   
                $response = array('status' => $idS, 'message' => "New City Added successfully");
                echo json_encode($response);
            }else {
                $response = array('status' => $idS, 'message' => "Error in City save");
                echo json_encode($response);
            }
        }
    }
	public function Save_Branch_Location(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $array_input1 = array(
                'Branch_Location' => $this->input->post('branch_location') ,
				'city'=> $this->input->post('city_name')
							
            );      
           
            $id = $this->Admin_model->save_branch_location_master($array_input1);
            if($id > 0){            
               $this->session->set_userdata('branch',1);
              //$this->New_Branch_Location();
			  //$this->New_Branch_Location();
			    redirect('admin/New_Branch_Location');
            }else {
                $this->session->set_userdata('branch',0);
                 redirect('admin/New_Branch_Location');
            }
        }
    }
	public function delete_city_master()
	{
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $array_input = array(
                'Branch_id' => $this->input->post('id')        
            );      
           
            $id = $this->Admin_model->delete_branch_master($array_input);
            if($id > 0){            
                $this->session->set_userdata('branch',2);
                redirect('admin/New_Branch_Location');
            }else {
                $this->session->set_userdata('branch',3);
                redirect('admin/New_Branch_Location');
            }
        }
    }
	public function get_Branches()
	{
		$city_id=$this->input->post('city_id');
		$Branches = $this->Admin_model->get_Branches($city_id);
		echo json_encode($Branches);
	}
    //--------------------------- added by priyanka 21-02-2022
    public function Generate_pre_cam()
    {
            $id = $this->input->get("ID");
            $data_row = $this->Operations_user_model->getProfileData($id);
         if($data_row->PROFILE_PERCENTAGE == '100')
         {
            $loan_details=$this->Dsacrud_model->getAplliedLoanDetails($id);
            $DSA_ID=$data_row->DSA_ID;
			$MANAGER_ID=$data_row->MANAGER_ID;
			$CSR_ID=$data_row->CSR_ID;
	        $BM_ID=$data_row->BM_ID;
			$CM_ID=$data_row->CM_ID;
			$RO_ID=$data_row->RO_ID;
		    if($DSA_ID!='NULL' && $DSA_ID!='' && $DSA_ID!='0')
			{
				$Sourcing_info= $this->Dsacrud_model->getProfileData($DSA_ID);
				$Sourcing_Type="DSA";
				$Sourcing_By="DSA Name";
				if(!empty($Sourcing_info))
				{
					if($Sourcing_info->MN!='')
					{
						$Sourcing_name=$Sourcing_info->FN." ".$Sourcing_info->MN." ".$Sourcing_info->LN;
					}
					else
					{
						$Sourcing_name=$Sourcing_info->FN."  ".$Sourcing_info->LN;
					}
					$Sourcing_city=$Sourcing_info->CITY;
					$Sourcing_state=$Sourcing_info->STATE;
				}
				else
				{
					$Sourcing_name='';
					$Sourcing_city='';
					$Sourcing_state='';
				}
			}
			else if($MANAGER_ID!='NULL' && $MANAGER_ID!=''&& $MANAGER_ID!='0')
			{
				$Sourcing_Type="Manager";
				$Sourcing_By="Manager Name";
				$Sourcing_info= $this->Dsacrud_model->getProfileData($MANAGER_ID);
				if(!empty($Sourcing_info))
				{
					if($Sourcing_info->MN!='')
						{
							$Sourcing_name=$Sourcing_info->FN." ".$Sourcing_info->MN." ".$Sourcing_info->LN;
						}
						else
						{
							$Sourcing_name=$Sourcing_info->FN."  ".$Sourcing_info->LN;
						}
						$Sourcing_city=$Sourcing_info->CITY;
					    $Sourcing_state=$Sourcing_info->STATE;
				}
			
				else
				{
					$Sourcing_name='';
					$Sourcing_city='';
					$Sourcing_state='';
				}
			}
			else if($CSR_ID!='NULL' && $CSR_ID!=''&& $CSR_ID!='0')
			{
				$Sourcing_Type="CSR";
				$Sourcing_By="CSR Name";
				$Sourcing_info= $this->Dsacrud_model->getProfileData($CSR_ID);
				if(!empty($Sourcing_info))
				{
					if($Sourcing_info->MN!='')
						{
							$Sourcing_name=$Sourcing_info->FN." ".$Sourcing_info->MN." ".$Sourcing_info->LN;
						}
						else
						{
							$Sourcing_name=$Sourcing_info->FN."  ".$Sourcing_info->LN;
						}
						$Sourcing_city=$Sourcing_info->CITY;
					    $Sourcing_state=$Sourcing_info->STATE;
				}
				else
				{
					$Sourcing_name='';
					$Sourcing_city='';
					$Sourcing_state='';
				}
			}
			else if($BM_ID!='NULL' && $BM_ID!=''&& $BM_ID!='0')
			{
				$Sourcing_Type="Finaleap Sales";
				$Sourcing_By="Branch Manager Name";
				
				$Sourcing_info= $this->Dsacrud_model->getProfileData($BM_ID);
				
				if(!empty($Sourcing_info))
				{
					if($Sourcing_info->MN!='')
						{
							$Sourcing_name=$Sourcing_info->FN." ".$Sourcing_info->MN." ".$Sourcing_info->LN;
						}
						else
						{
							$Sourcing_name=$Sourcing_info->FN."  ".$Sourcing_info->LN;
						}
						 $Sourcing_city=$Sourcing_info->CITY;
					    $Sourcing_state=$Sourcing_info->STATE;
					
				}
				else
				{
					$Sourcing_name='';
					$Sourcing_city='';
					$Sourcing_state='';
				}
			}
		   else if($CM_ID!='NULL' && $CM_ID!='' && $CM_ID!='0')
			{
				$Sourcing_Type="Finaleap Sales";
				$Sourcing_By="Cluster Manager Name";
				
				$Sourcing_info= $this->Dsacrud_model->getProfileData($CM_ID);
				
				if(!empty($Sourcing_info))
				{
					if($Sourcing_info->MN!='')
						{
							$Sourcing_name=$Sourcing_info->FN." ".$Sourcing_info->MN." ".$Sourcing_info->LN;
						}
						else
						{
							$Sourcing_name=$Sourcing_info->FN."  ".$Sourcing_info->LN;
						}
						 $Sourcing_city=$Sourcing_info->CITY;
					    $Sourcing_state=$Sourcing_info->STATE;
					
				}
				else
				{
					$Sourcing_name='';
					$Sourcing_city='';
					$Sourcing_state='';
				}
			}
			else if($RO_ID!='NULL' && $RO_ID!=''&& $RO_ID!='0')
			{
				$Sourcing_Type="Finaleap Sales";
				$Sourcing_By="Relationship Officer Name";
				$Sourcing_info= $this->Dsacrud_model->getProfileData($RO_ID);
               // print_r($Sourcing_info);
               // exit();
				if(!empty($Sourcing_info))
				{
					if($Sourcing_info->MN!='')
						{
							$Sourcing_name=$Sourcing_info->FN." ".$Sourcing_info->MN." ".$Sourcing_info->LN;
						}
						else
						{
							$Sourcing_name=$Sourcing_info->FN."  ".$Sourcing_info->LN;
						}
						$Sourcing_city=$Sourcing_info->CITY;
					    $Sourcing_state=$Sourcing_info->STATE;
				}
				else
				{
					$Sourcing_name='';
					$Sourcing_city='';
					$Sourcing_state='';
				}
			}
			else
			{
				$Sourcing_Type="Direct";
				$Sourcing_name='';
				$Sourcing_city='';
				$Sourcing_state='';
			}

              $data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
              $data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
              $data_row_more = $this->Operations_user_model->getProfileDataMore($id);	
  
              $data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
              $address=$data_row_more->RES_ADDRS_LINE_1." ".$data_row_more->RES_ADDRS_LINE_2." ".$data_row_more->RES_ADDRS_LINE_3;
              $per_address=$data_row_more->PER_ADDRS_LINE_1." ".$data_row_more->PER_ADDRS_LINE_2." ".$data_row_more->PER_ADDRS_LINE_3;
              $data_credit_analysis=$this->Operations_user_model->getcreditData($id);
              if(!empty($data_credit_score))
                {
	              $data_response=$data_credit_score->response;
  	              $data_address=json_decode($data_response,true);
	              $credit_score_response=json_decode($data_credit_score->response,true);
	              if(isset($data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
	              {
	              $data_emails=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
	              }
	              else
	              {
		            $data_emails=[];
	              }
	             if(isset($data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'] ))
	              {
                       $data_add=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
                  
	              }
	              else
	              {
		            $data_add=[]; 
		           
	              }
	              if(isset($data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
	              {
	              $data_obligations=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
	              $data_obligations_array=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
	              }
	              else
	              {
		            $data_obligations=[]; 
		            $data_obligations_array=[];
	              }
                  $address_flag='false';
	              $total_obligation=0;
	              foreach($data_add as $data_ad)
		              {
			              $str1= preg_replace('/\s+/', ' ', trim($address));
			              $str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
			              $str3=preg_replace('/\s+/', ' ', trim($per_address));
			               if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
			               {
				              $address_flag='true';
					            break;
			               }
			               else
			               {
				               $address_flag='false';
			               }
		              }
		             foreach($data_emails as $data_email)
		              {
			              $str1= preg_replace('/\s+/', ' ', trim($data_row->EMAIL));
			              $str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
			               if(strcmp($str1,$str2)==0 )
			               {
				              $email_flag='true';
					            break;
			               }
			               else
			               {
				               $email_flag='false';
				  
			               }
		              }	
		        	  $k=0;
		              $Applicant_obligation_Array = []; 
		              foreach($data_obligations as $data_obligation)
			          {
				    	  if($data_obligation['Open']=='Yes')
				            {
					   if(isset($data_obligation['InstallmentAmount']))
					   {
						  $total_obligation= $total_obligation+ $data_obligation['InstallmentAmount'];
					   }
					  //echo $k;
					  $Applicant_obligation_Array[$k]= $data_obligation['AccountNumber'];
			
				  $k++;	 
				  }
				  
				  else
				  {
					  //break;
				  }
			    }
	 
  }
  else
  {
	   $email_flag='false';
	   $address_flag='false';
	   
	   $data_address="";
	   $total_obligation=0;
	   $data_obligations=array();
	   $credit_score_response=array();
  }
  if(!empty($data_appliedloan))
  {
  if($data_appliedloan->LOAN_TYPE=='home')
	  {
		  $data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
		  $data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
		  
		  $coapp_add_flag=array();
		  $coapp_email_flag=array();
		  $i=1;
		  foreach($data_coapplicant as $coapplicant)
		  {
			  $coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
			  $coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
			  $coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
			  $coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
			  
		  
			  if(!empty($coapp_data_credit_score))
			  {
				  $coapp_data_response=$coapp_data_credit_score->response;
				  $coapp_data_address=json_decode($coapp_data_response,true);
				 
				  if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
				 {
				  $coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
				  }
				  else
				  {
					  $coapp_data_emails="";
				  }
				  if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']))
				  {
				  $TotalSanctionAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];
				  $data['TotalSanctionAmount']=$TotalSanctionAmount;
				  }
				  else
				  {
					$TotalSanctionAmount="";
					$data['TotalSanctionAmount']=$TotalSanctionAmount;
				  }
				  if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo']))
				  {
					    $coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
				  $coapp_data_response=$coapp_data_credit_score->response;
				  $coapp_credit_score=json_decode($coapp_data_response,true);
				  }
				  else
				  {
					  $coapp_data_add=array();
					  $coapp_data_response='';
					  $coapp_credit_score=array();
				  }
				
				  if(isset($coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
				  {
				  $coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
				  }
				  else
				  {
					$coapp_data_obligations=[];  
				  }
      //==============================================added by priyanka==============================================
				  $k=0;
				  $Co_Applicant_obligation_Array = []; 
				  $Co_Applicant_obligation_Array_attributes= []; 
				  foreach($coapp_data_obligations as $coapp_data_obligation)
				  {
					  
					  if($coapp_data_obligation['Open']=='Yes')
					  {
						   if(isset($coapp_data_obligation['InstallmentAmount']))
						   {
							  $total_obligation= $total_obligation+ $coapp_data_obligation['InstallmentAmount'];
						   }
						 $Co_Applicant_obligation_Array[$k] = $coapp_data_obligation['AccountNumber']; 
						  

																				  if(isset($coapp_data_obligation['SanctionAmount']))
																				  {  
																					  $SanctionAmount = $coapp_data_obligation['SanctionAmount'];
																				  }
																				  else if(isset($coapp_data_obligation['CreditLimit']))
																				  {
																					  $SanctionAmount = $coapp_data_obligation['CreditLimit'];
																				  }
																				  else
																				  {
																					  $SanctionAmount=0;
																				  }
																				 // "Balance"=>$coapp_data_obligation['Balance'],
																				  if(isset($coapp_data_obligation['InstallmentAmount']))
																				  {
																					   $InstallmentAmount =$coapp_data_obligation['InstallmentAmount'];
																				  }
																				  else
																				  {
																					  if(isset($coapp_data_obligation['SanctionAmount']))
																					  {
																						  $InstallmentAmount =($coapp_data_obligation['SanctionAmount']*0.03);
																						 }
																					  elseif(isset($coapp_data_obligation['CreditLimit']))
																					  {
																						  $InstallmentAmount =($coapp_data_obligation['CreditLimit']*0.03);
																					  }
																					  else
																					  {
																						  $InstallmentAmount= 0;
																					  }
																				  }
																				  $new_array = array();
																				  foreach($Co_Applicant_obligation_Array as $value) {
																			
																					if(isset($Applicant_obligation_Array))
																					{
																					if(!in_array($value, $Applicant_obligation_Array)) {
																						array_push($new_array, $value);
																					}
																				  }
																				  else
																				  {
																					  $Applicant_obligation_Array=[];
																					  if(!in_array($value, $Applicant_obligation_Array)) {
																						  array_push($new_array, $value);
																					  }
																				  }
																				  }
																				  if(!empty($new_array))
																				  {
											  
																						  $Co_Applicant_obligation_Array_attributes[$k] =array(
																						  "Institution"=>$coapp_data_obligation['Institution'],
																						  "AccountType"=>$coapp_data_obligation['AccountType'],
																						  "SanctionAmount"=>$SanctionAmount,
																						  "Balance"=>$coapp_data_obligation['Balance'],
																						  "InstallmentAmount"=>$InstallmentAmount
																						); 
																			

																				  
																			  }
						  
						
						   $k++;


					  
					  }
			  
					  else
					  {
					  //	break;
					  }

				  }
						  
	
			  $sorted_array=array_diff($Co_Applicant_obligation_Array ,$Applicant_obligation_Array);
		        
			//==============================================added by priyanka==============================================
			if(isset($Co_Applicant_obligation_Array_attributes))
			{
			$Co_Applicant_obligation_Array_attributes[$i]=$Co_Applicant_obligation_Array_attributes;
			}
			else
			{
			$Co_Applicant_obligation_Array_attributes[$i]="";
			}

			if(isset($sorted_array)){
			$Co_Applicant_sorted_array[$i]=$sorted_array;	
			}
			else
			{
			$Co_Applicant_sorted_array[$i]="";
			}
							$coapp_data_obligations_array[$i]=$coapp_data_obligations;	
							$coapp_credit_score_array[$i]=$coapp_credit_score;
							foreach($coapp_data_add as $data_ad)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
									$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
									$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
									if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
									{
										$address_flag='true';
											break;
									}
									else
									{
										$address_flag='false';
									}
									
								}
								if($coapp_data_emails!="")
								{
								foreach($coapp_data_emails as $data_email)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
									$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
									if(strcmp($str1,$str2)==0 )
									{
										$email_flag='true';
											break;
									}
									else
									{
										$email_flag='false';
										
									}
								}	
								
									$coapp_email_flag[$i]=$email_flag;
							}
									$coapp_add_flag[$i]=$address_flag;
								
								
						}
						else
						{
							$total_obligation=0;
							$coapp_add_flag[$i]='false';
							$coapp_add_flag[$i]='false';
							$coapp_data_obligations_array[$i]=array();	
							$Co_Applicant_obligation_Array_attributes[$i]=array();
							$Co_Applicant_sorted_array[$i]=array();
							$coapp_credit_score_array[$i]=array();
							$coapp_credit_score=array();
							
						}
								
						$coapp_data_credit_analysis_array[$i]=$coapp_data_credit_analysis;
						$coapp_data_credit_score_array[$i]=$coapp_data_credit_score;
						$coapp_data_obligation_array[$i]=$total_obligation;
						if(isset($sorted_array))
						{
						$Co_Applicant_sorted_array[$i]=$sorted_array;
						}
						else
						{
							$Co_Applicant_sorted_array[$i]=[];
						}
						$i++;
					
					}
					
					
				}
				else if($data_appliedloan->LOAN_TYPE=='lap')
				{
					$data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
					$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
					
					$coapp_add_flag=array();
					$coapp_email_flag=array();
					$i=1;
					foreach($data_coapplicant as $coapplicant)
					{
					
					
						
						
						$coapp_address=$coapplicant->RES_ADDRS_LINE_1." ".$coapplicant->RES_ADDRS_LINE_2." ".$coapplicant->RES_ADDRS_LINE_3;
						$coapp_per_address=$coapplicant->PER_ADDRS_LINE_1." ".$coapplicant->PER_ADDRS_LINE_2." ".$coapplicant->PER_ADDRS_LINE_3;
						$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
						$coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
						
					
						if(!empty($coapp_data_credit_score))
						{
							$coapp_data_response=$coapp_data_credit_score->response;
							$coapp_data_address=json_decode($coapp_data_response,true);
						
							if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo']))
						{
							$coapp_data_emails=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'];
							}
							else
							{
								$coapp_data_emails="";
							}

							if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount']))
							{
								$TotalSanctionAmount=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];
								$data['TotalSanctionAmount']=$TotalSanctionAmount;
							}
							else
							{
								$TotalSanctionAmount=""; $data['TotalSanctionAmount']="";
							}
							
							
							if(isset($coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo']))
							{
									$coapp_data_add=$coapp_data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'];
							
							}
							else
							{
								$coapp_data_add=array();
							}
						$coapp_data_response=$coapp_data_credit_score->response;
							$coapp_credit_score=json_decode($coapp_data_response,true);
							if(isset($coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
							{
							$coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
							}
							else
							{
								$coapp_data_obligations=array();
							}
							$k=0;
							$Co_Applicant_obligation_Array = []; 
							$Co_Applicant_obligation_Array_attributes= []; 
							foreach($coapp_data_obligations as $coapp_data_obligation)
							{
								
								if($coapp_data_obligation['Open']=='Yes')
								{
									if(isset($coapp_data_obligation['InstallmentAmount']))
									{
										$total_obligation= $total_obligation+ $coapp_data_obligation['InstallmentAmount'];
									}
									//echo $k;
									// $Co_Applicant_obligation_Array[$k] = $coapp_data_obligation['Institution'].$coapp_data_obligation['Balance']; 
									$Co_Applicant_obligation_Array[$k] = $coapp_data_obligation['AccountNumber']; 
									

																							if(isset($coapp_data_obligation['SanctionAmount']))
																							{  
																								$SanctionAmount = $coapp_data_obligation['SanctionAmount'];
																							}
																							else if(isset($coapp_data_obligation['CreditLimit']))
																							{
																								$SanctionAmount = $coapp_data_obligation['CreditLimit'];
																							}
																							else
																							{
																								$SanctionAmount=0;
																							}
																						// "Balance"=>$coapp_data_obligation['Balance'],
																							if(isset($coapp_data_obligation['InstallmentAmount']))
																							{
																								$InstallmentAmount =$coapp_data_obligation['InstallmentAmount'];
																							}
																							else
																							{
																								if(isset($coapp_data_obligation['SanctionAmount']))
																								{
																									$InstallmentAmount =($coapp_data_obligation['SanctionAmount']*0.03);
																								}
																								elseif(isset($coapp_data_obligation['CreditLimit']))
																								{
																									$InstallmentAmount =($coapp_data_obligation['CreditLimit']*0.03);
																								}
																								else
																								{
																									$InstallmentAmount= 0;
																								}
																							}
																							$new_array = array();
																							foreach($Co_Applicant_obligation_Array as $value) {
																								if(!in_array($value, $Applicant_obligation_Array)) {
																									array_push($new_array, $value);
																								}
																							}
																							if(!empty($new_array))
																							{
														
																									$Co_Applicant_obligation_Array_attributes[$k] =array(
																									"Institution"=>$coapp_data_obligation['Institution'],
																									"AccountType"=>$coapp_data_obligation['AccountType'],
																									"SanctionAmount"=>$SanctionAmount,
																									"Balance"=>$coapp_data_obligation['Balance'],
																									"InstallmentAmount"=>$InstallmentAmount
																								); 
																					

																							
																						}
									
								
									$k++;


								
								}
						
								else
								{
								//	break;
								}

							}
									
							
					
						if(isset($Applicant_obligation_Array))
						{
							$sorted_array=array_diff($Co_Applicant_obligation_Array ,$Applicant_obligation_Array);
						}
						else
						{
							
						}
					
			          
			            if(isset($Co_Applicant_obligation_Array_attributes))
			            {
			            $Co_Applicant_obligation_Array_attributes[$i]=$Co_Applicant_obligation_Array_attributes;
			            }
			            else
			            {
			            $Co_Applicant_obligation_Array_attributes[$i]="";
			            }

			            if(isset($sorted_array)){
			            $Co_Applicant_sorted_array[$i]=$sorted_array;	
			            }
			            else
			            {
			            $Co_Applicant_sorted_array[$i]="";
			            }
							$coapp_data_obligations_array[$i]=$coapp_data_obligations;	
							$coapp_credit_score_array[$i]=$coapp_credit_score;
							foreach($coapp_data_add as $data_ad)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapp_address));
									$str2= preg_replace('/\s+/', ' ', trim($data_ad['Address']));
									$str3=preg_replace('/\s+/', ' ', trim($coapp_per_address));
									if(strcmp($str1,$str2)==0 ||strcmp($str3,$str2)==0)
									{
										$address_flag='true';
										break;
									}
									else
									{
										$address_flag='false';
									}
									
								}
								if($coapp_data_emails!="")
								{
								foreach($coapp_data_emails as $data_email)
								{
									$str1= preg_replace('/\s+/', ' ', trim($coapplicant->EMAIL));
									$str2= preg_replace('/\s+/', ' ', trim($data_email['EmailAddress']));
									if(strcmp($str1,$str2)==0 )
									{
										$email_flag='true';
										break;
									}
									else
									{
										$email_flag='false';
										
									}
								}	
								
								$coapp_email_flag[$i]=$email_flag;
							}
								$coapp_add_flag[$i]=$address_flag;
								
								
						}
						else
						{
							$total_obligation=0;
							$coapp_add_flag[$i]='false';
							$coapp_add_flag[$i]='false';
							$coapp_data_obligations_array[$i]=array();	
							$Co_Applicant_obligation_Array_attributes[$i]=array();
							$Co_Applicant_sorted_array[$i]=array();
							$coapp_credit_score_array[$i]=array();
							$coapp_credit_score=array();
							
						}
							
						$coapp_data_credit_analysis_array[$i]=$coapp_data_credit_analysis;
						$coapp_data_credit_score_array[$i]=$coapp_data_credit_score;
						$coapp_data_obligation_array[$i]=$total_obligation;
						//$Co_Applicant_sorted_array[$i]=$sorted_array;
						$i++;
					
					}
				
					
					
				}
				else
				{
					$data_coapplicant_no=0;
					$data_coapplicant=array();
					$coapp_add_flag=array();
					$coapp_email_flag=array();
					$coapp_credit_score=array();
					$coapp_data_credit_analysis_array=array();
					$coapp_data_credit_score_array=array();
					$coapp_data_obligation_array=array();
					$coapp_data_obligations_array=array();
					$Co_Applicant_obligation_Array_attributes=array();
					
					$coapp_credit_score_array=array();
				}
		
    }
                else
                {
        
					            $data_coapplicant_no=0;
					            $data_coapplicant=array();
					            $coapp_add_flag=array();
					            $coapp_email_flag=array();
					            $coapp_credit_score=array();
					            $coapp_data_credit_analysis_array=array();
					            $coapp_data_credit_score_array=array();
					            $coapp_data_obligation_array=array();
					            $coapp_data_obligations_array=array();
					            $Co_Applicant_obligation_Array_attributes=array();
					            $Co_Applicant_sorted_array=array();
					            $coapp_credit_score_array=array();
                }
        	/* added by papiha------------------*/
					$data['Sourcing_name']=$Sourcing_name;
					$data['Sourcing_By']=$Sourcing_By;
					$data['Sourcing_Type']=$Sourcing_Type;
					$data['Sourcing_city']=$Sourcing_city;
					$data['Sourcing_state']=$Sourcing_state;
				/* ended by papiha--------------------*/;
				$data['Co_Applicant_sorted_array'] = $Co_Applicant_sorted_array;
     			$data['row'] = $data_row;
				$data['data_row_more']=$data_row_more;
				
				$data['PER_ADDRS_LINE_1']=$data_row_more->PER_ADDRS_LINE_1;
				$data['RES_ADDRS_LINE_1']=$data_row_more->RES_ADDRS_LINE_1;
				$data['Locality_type']=$data_row_more->Locality_type;
				$data['NO_OF_DEPENDANTS']=$data_row_more->NO_OF_DEPENDANTS;
				$data['NATIVE_PLACE']=$data_row_more->NATIVE_PLACE;
				$data['VERIFY_PAN']=$data_row_more->VERIFY_PAN;
				$data['TIMESTAMP']=$data_row_more->TIMESTAMP;
				$data['verify_ca_regi_status']=$data_row_more->verify_ca_regi_status;
				$data['verify_cs_regi_status']=$data_row_more->verify_cs_regi_status;
				$data['verify_icwa_regi_status']=$data_row_more->verify_icwa_regi_status;
				$data['STATUS']=$data_row_more->STATUS;
				$data['Passport_Number']=$data_row_more->Passport_Number;
				$data['verify_Passport_no']=$data_row_more->verify_Passport_no;
				//$data['KYC_doc']=$data_row_more->KYC_doc;
				$data['Driving_l_Number']=$data_row_more->Driving_l_Number;
				$data['verify_Driving_l_Number']=$data_row_more->verify_Driving_l_Number;
				$data['Vechical_Number']=$data_row_more->Vechical_Number;
				$data['verify_Vechical']=$data_row_more->verify_Vechical;
				$data['verify_It_Returns']=$data_row_more->verify_It_Returns;
				$data['verify_Udyog_Aadhar']=$data_row_more->verify_Udyog_Aadhar;
				$data['verify_GST_status']=$data_row_more->verify_GST_status;
				$data['verify_Shop_Act']=$data_row_more->verify_Shop_Act;
				$data['verify_Professional_Certificate']=$data_row_more->verify_Professional_Certificate;
				$data['verify_Residence']=$data_row_more->verify_Residence;
				$data['Recidance_Comment']=$data_row_more->Recidance_Comment;
				$data['verify_Employment']=$data_row_more->verify_Employment;
				$data['Employment_Comment']=$data_row_more->Employment_Comment;
				$data['EPFO_Number']=$data_row_more->EPFO_Number;
				$data['verify_EPFO_Number']=$data_row_more->verify_EPFO_Number;
				$data['Account_Number']=$data_row_more->Account_Number;
				$data['verify_Account_Number']=$data_row_more->verify_Account_Number;
				$data['Official_mail']=$data_row_more->Official_mail;
				$data['verify_Official_Mail']=$data_row_more->verify_Official_Mail;
				$data['Pre_employement']=$data_row_more->Pre_employement;
				$data['Past_Employement']=$data_row_more->Past_Employement;
				$data['Edu_background']=$data_row_more->Edu_background;
				$data['Connects']=$data_row_more->Connects;
				$data['Recommendations']=$data_row_more->Recommendations;
				$data['Professional_courses']=$data_row_more->Professional_courses;
				$data['Hobbies']=$data_row_more->Hobbies;
				$data['Skills']=$data_row_more->Skills;
				$data['vacation']=$data_row_more->vacation;
				$data['anti_post']=$data_row_more->anti_post;
				$data['Sale_Deed']=$data_row_more->Sale_Deed;
				$data['Sale_Deed']=$data_row_more->Sale_Deed;
				$data['Land_value']=$data_row_more->Land_value;
				$data['Total_Value']=$data_row_more->Total_Value;
				$data['Construction_value']=$data_row_more->Construction_value;
				$data['Self_occupied']=$data_row_more->Self_occupied;
				$data['Date_of_Agreement']=$data_row_more->Date_of_Agreement;
				$data['LTV']=$data_row_more->LTV;
				$data['LTV_new']=$data_row_more->LTV_new;
				$data['Legal_report']=$data_row_more->Legal_report;
				//$data['row_more'] = $data_row_more;
				$data['coapplicants']=$data_coapplicant;
				$data['appliedloan']=$data_appliedloan;
				$data['no_of_coapplicant']=$data_coapplicant_no;
				$data['income_details']=$data_incomedetails;
				$data['data_address']=$data_address;
				$data['data_credit_score']=$data_credit_score;
				$data['total_obligation']=$total_obligation;
				$data['data_obligations']=$data_obligations;
				$data['credit_score_response']=$credit_score_response;
				$data['address_flag']=$address_flag;
				$data['data_credit_analysis']=$data_credit_analysis;
				$data['coapp_credit_score']=$coapp_credit_score;
				$data['coapp_data_credit_analysis_array']=$coapp_data_credit_analysis_array;
				$data['coapp_data_credit_score_array']=$coapp_data_credit_score_array;
				$data['coapp_data_obligation_array']=$coapp_data_obligation_array;
				$data['coapp_data_obligations_array']=$coapp_data_obligations_array;
				
			//==============================================added by priyanka==============================================
							if(isset($Co_Applicant_obligation_Array_attributes))
							{
								$data['Co_Applicant_obligation_Array_attributes']=$Co_Applicant_obligation_Array_attributes;
							}
							else
							{
							$data['Co_Applicant_obligation_Array_attributes']="";
							}
				
			//==============================================added by priyanka==============================================
				$data['coapp_credit_score_array']=$coapp_credit_score_array;
				$data['coapp_add_flag']=$coapp_add_flag;
				
				$data['coapp_email_flag']=$coapp_email_flag;
				$data['loan_details']=$loan_details;
                 }
         else
         {
             	    $data['Sourcing_name']='';
					$data['Sourcing_By']='';
					$data['Sourcing_Type']='';
					$data['Sourcing_city']='';
					$data['Sourcing_state']='';
                    $data['Co_Applicant_sorted_array'] =array();
     				$data['row'] = $data_row;
				$data['data_row_more']='';
				
				$data['PER_ADDRS_LINE_1']='';
				$data['RES_ADDRS_LINE_1']='';
				$data['Locality_type']='';
				$data['NO_OF_DEPENDANTS']='';
				$data['NATIVE_PLACE']='';
				$data['VERIFY_PAN']='';
				$data['TIMESTAMP']='';
				$data['verify_ca_regi_status']='';
				$data['verify_cs_regi_status']='';
				$data['verify_icwa_regi_status']='';
				$data['STATUS']='';
				$data['Passport_Number']='';
				$data['verify_Passport_no']='';
				//$data['KYC_doc']=$data_r';
				$data['verify_Driving_l_Number']='';
				$data['Vechical_Number']='';
				$data['verify_Vechical']='';
				$data['verify_It_Returns']='';
				$data['verify_Udyog_Aadhar']='';
				$data['verify_GST_status']='';
				$data['verify_Shop_Act']='';
				$data['verify_Professional_Certificate']='';
				$data['verify_Residence']='';
				$data['Recidance_Comment']='';
				$data['verify_Employment']='';
				$data['Employment_Comment']='';
				$data['EPFO_Number']='';
				$data['verify_EPFO_Number']='';
				$data['Account_Number']='';
				$data['verify_Account_Number']='';
				$data['Official_mail']='';
				$data['verify_Official_Mail']='';
				$data['Pre_employement']='';
				$data['Past_Employement']='';
				$data['Edu_background']='';
				$data['Connects']='';
				$data['Recommendations']='';
				$data['Professional_courses']='';
				$data['Hobbies']='';
				$data['Skills']='';
				$data['vacation']='';
				$data['anti_post']='';
				$data['Sale_Deed']='';
				$data['Sale_Deed']='';
				$data['Land_value']='';
				$data['Total_Value']='';
				$data['Construction_value']='';
				$data['Self_occupied']='';
				$data['Date_of_Agreement']='';
				$data['LTV']='';
				$data['LTV_new']='';
				$data['Legal_report']='';
				//$data['row_more'] = $data_row_more;
				$data['coapplicants']='';
				$data['appliedloan']='';
				$data['no_of_coapplicant']='';
				$data['income_details']='';
				$data['data_address']='';
				$data['data_credit_score']='';
				$data['total_obligation']='';
				$data['data_obligations']='';
				$data['credit_score_response']='';
				$data['address_flag']='';
				$data['data_credit_analysis']='';
				$data['coapp_credit_score']='';
				$data['coapp_data_credit_analysis_array']='';
				$data['coapp_data_credit_score_array']='';
				$data['coapp_data_obligation_array']='';
				$data['coapp_data_obligations_array']='';
				
			//==============================================added by priyanka==============================================
							if(isset($Co_Applicant_obligation_Array_attributes))
							{
								$data['Co_Applicant_obligation_Array_attributes']=$Co_Applicant_obligation_Array_attributes;
							}
							else
							{
							$data['Co_Applicant_obligation_Array_attributes']="";
							}
				
			//==============================================added by priyanka==============================================
				$data['coapp_credit_score_array']='';
				$data['coapp_add_flag']='';
				
				$data['coapp_email_flag']='';
				$data['loan_details']='';

         }
			
				/*echo "<pre>";
				print_r($coapp_data_obligations_array);
				echo "</pre>";
				exit();*/
			
			//$id='0';
				
			//require base_url('mpdf/src/Mpdf.php');
			include("./vendor/autoload.php");
				
			$mpdf = new \Mpdf\Mpdf([
					'setAutoTopMargin' => 'stretch',
				'autoMarginPadding' => 10,
				'orientation' => 'P'
			]);
			$arrContextOptions=array(
				"ssl"=>array(
					"verify_peer"=>false,
					"verify_peer_name"=>false,
				),
			);  
			 $mpdf->curlAllowUnsafeSslRequests = true;
			$mpdf->SetHTMLHeader($this->load->view('admin/pre_cam_header',[],true));
			
			$mpdf->SetDisplayMode('fullwidth');
			$mpdf->debug = true;
			$mpdf->AddPage('P');
			$stylesheet = file_get_contents(base_url('assets/style.css'),false, stream_context_create($arrContextOptions));
			$stylesheet.=  file_get_contents(base_url('assets/css/bootstrap.css'),false, stream_context_create($arrContextOptions));

			
			$mpdf->WriteHTML($stylesheet,1);
			$mpdf->list_indent_first_level = 0;
			$html = $this->load->view('admin/pre_cam_pdf',$data,true);
			$footer = "<table name='footer' width=\"1000\">
					<tr>
						<td style='font-size: 16px; padding-bottom: 2px;' align=\"right\">[Page : {PAGENO}]</td>
					</tr>
					</table>";
					$mpdf->SetFooter($footer);
			$mpdf->WriteHTML($html);
           // ob_end_clean();
			$mpdf->Output();

			//$mpdf->Output('assets/report.pdf','F');

			exit();
}
/*------------------------------- Addded by papiha on 25_02_2022--------------------------------------------------------------------*/
/*public function Connector_alluser()
{
	 
       
     if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'Connector')
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
        $data['row']=$this->Customercrud_model->getProfileData($id);
        if($this->session->userdata('USER_TYPE') == 'Cluster_Manager')
		{
			$Connector_arr = $this->Admin_model->getConnector_Cluster_Manager($s,$id);
		}
        else if($this->session->userdata('USER_TYPE') == 'branch_manager')
        {
            $Connector_arr = $this->Admin_model->getConnector_branchManger($s,$id);
        }else if($this->session->userdata('USER_TYPE') == 'Relationship_Officer')
        {
            $Connector_arr = $this->Admin_model->getConnector_Relationship_Officer($s,$id);
        }
        else if($this->session->userdata('USER_TYPE') == 'DSA')
        {
            $Connector_arr = $this->Admin_model->getConnector_DSA($s,$id);
        }
        else
        {
            $Connector_arr= $this->Admin_model->getConnector($s,$search_name);
        }
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
         //print_r($Connector_arr);
        // exit();
         $this->load->view('dashboard_header', $data);
         $this->load->view('admin/Connector_allusers', $data);   
        
    }        
}*/
/*------------------------------------------------- Added by papiha on 26_2_2022------------------------------------------*/
public function get_RM_user()
{
    $s="all";
    $bank="";
    $city='';
    $search_name="";
    $userType2="";
    $date="";
    $User_id=$this->input->post('User_id');
    $User_Type =$this->input->post('User_Type');
     $dsa_arr = $this->Admin_model->getRelationOfficer($User_id, $s, $User_Type, $userType2, $date);
     //$dsa_arr = $this->Admin_model->getRM_for_select_user($User_id,$User_Type);
     if(!empty($dsa_arr ))
     {
         echo json_encode($dsa_arr);
     }
}
public function get_customer_user_RO()
{
    $User_id=$this->input->post('User_id');
    $User_Type=$this->input->post('User_Type');
    $filter='';
    $userType2='';
    $date='';
    $dsa_arr = $this->Dsacustomers_model->getCustomers($User_id, $filter, $User_Type, $userType2, $date);
    
         echo json_encode($dsa_arr);
     
    
}
public function get_Dsa_User()
{
    $filter="all";
    $bank="";
    $city='';
    $search_name="";
    $userType2="";
    $date="";
    $bank="";
    $User_id=$this->input->post('User_id');
    $User_Type =$this->input->post('User_Type');
     //$dsa_arr = $this->Admin_model->getDsa_for_select_user($User_id,$User_Type);
     $dsa_arr = $this->Admin_model->getDsaList($User_id, $filter, $User_Type, $userType2, $date,$bank);
     if(!empty($dsa_arr ))
     {
         echo json_encode($dsa_arr);
     }
}
/*---------------------------------------Added by papiha on 28_02_2022-----------------------------------------------*/
public function Connector()
	{
       	
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'Connector'  || $this->session->userdata('SITE') != 'finserv' )
		{		
            redirect(base_url('index.php/login'));
        }
		else
		{
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

        if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['End_Date'];
         }
         else{
             $data['End_Date']='';
         }
         if(isset($_GET['filter']))
         {
                 $filter=$_GET['filter'];
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
        if(isset($_GET['RB']))
         {
           $data['RB']=$_GET['RB'];
         }
         else
         {
             $data['RB']='';
         }
             if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
         $Reffered_by = $this->Admin_model->getReferredByData();
          $data['Reffered_by']=$Reffered_by;

            $filter_location = $this->Admin_model->getLocationByData();
                  $data['filter_location']=$filter_location;


			if($this->session->userdata('USER_TYPE') == 'branch_manager')
			{
			}
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');
           // echo  $select_filters;
            //exit();
            if(!empty($search_))
			{
				$s='search';
				$search_name =$this->input->post('filter_name');	
			}
            else if(!empty($select_filters))
            {
                $s=$select_filters;
                $search_name="";
            }
			else
			{
				$s = $this->input->get('s');
				$search_name="";
			}

			$id = $this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($id);
			if($this->session->userdata('USER_TYPE') == 'branch_manager')
			{
				$Connector_arr = $this->Admin_model->getConnector_branchManger($s,$id,$search_name);
			}
            else if(!empty($BM_ID= $this->input->get('BM_ID')))
            { 
                 $BM_ID=$this->input->get('BM_ID');
                 $search_name='';
                 $s='all';
                 $Connector_arr = $this->Admin_model->getConnector_branchManger($s,$BM_ID,$search_name);
            }
            else if(!empty($RO_ID= $this->input->get('RO_ID')))
            { 
                 $BM_ID=$this->input->get('RO_ID');
                 $Connector_arr = $this->Admin_model->getConnector_RelationshipOfficer($s,$RO_ID);
            }
			else
            {
                $Connector_arr= $this->Dsacustomers_model->getConnector($id, $filter, $userType, $userType2, $date);
			}
            $_SESSION["data_for_excel"] = $Connector_arr;
            $this->session->set_userdata('file_name','Connector List');
             $data['showNav'] = 1;
             $data['age'] = $age;
             $data['s'] = $s;
             $data['data'] =$Connector_arr;
            // $this->load->view('admin/admin_dashbord', $data);
            //$this->load->view('admin/Connector', $data);   
            $this->load->view('admin/Connector_PG', $data);   

        }        
	}
	public function Connector_alluser()
   {
	 
	 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'CUSTOMER' || $this->session->userdata('SITE') != 'finserv'){
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
        $customers = $this->Dsacustomers_model->getConnector($id, $filter, $userType, $userType2, $date);
	
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
        $arr['data'] = $customers;
        $arr['s'] = $filter;
        $this->load->view('dashboard_header', $data);
        $this->load->view('admin/Connector_allusers', $arr);
    }
}
public function dsa_allusers(){
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
       $age = $this->session->userdata('AGE');
       $s = $this->input->get('s');
       $search_=$this->input->post('filter_name');
       $select_filters=$this->input->post('select_filters');
       if($s=='')
        {
            $s='all';
        }
       $bank = $this->input->get('bnk_name');
       $city = $this->input->get('city_name');
       $id = $this->session->userdata('ID');
    
            $dsa_arr = $this->Admin_model->getDsaList($id, $filter, $userType, $userType2, $date,$bank);
       
       $_SESSION["data_for_excel"] =  $dsa_arr ;
      
       $data['row']=$this->Customercrud_model->getProfileData($id);
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

       $data['showNav'] = 1;
       $data['age'] = $age;
       $data['s'] = $s;
       $data['data'] = $dsa_arr;
       $data['userType'] = $this->session->userdata('USER_TYPE');
       //$this->load->view('header', $data);             
       $banks = $this->Admin_model->getBanks();
       $cities = $this->Admin_model->getCity();
       $data['banks'] = $banks;
       $data['cities']=$cities ;
       $this->load->view('dashboard_header', $data); 
       $this->load->view('admin/dsa_allusers', $data); 
   
   
   
}
public function dsa()
 {
       
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
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
        else{
             $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
             if ($s == '') {
                $s= 'all';
            }
            if ($s == 'Complete') {
                $s = 'Complete';
            }
            if ($s == 'Incomplete') {
                $s = 'Incomplete';
            }
            if ($s == 'city') {
                $s = 'city';
            }

            
             if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['End_Date'];
         }
         else{
             $data['End_Date']='';
         }
         if(isset($_GET['filter']))
         {
                 $filter=$_GET['filter'];
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

          if(isset($_GET['RB']))
         {
           $data['RB']=$_GET['RB'];
         }
         else
         {
             $data['RB']='';
         }
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }


            $bank = $this->input->get('bnk_name');
            $city = $this->input->get('city_name');
            $dsa_arr = $this->Admin_model->getDsaList($id, $filter, $userType, $userType2, $date,$bank);
            $data['row']=$this->Customercrud_model->getProfileData($id);          
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['data'] = $dsa_arr;
            $data['userType'] = $this->session->userdata('USER_TYPE');
            //$this->load->view('header', $data);             
            $banks = $this->Admin_model->getBanks();
            $cities = $this->Admin_model->getCity();
            $Reffered_by = $this->Admin_model->getReferredByData();
              $filter_location = $this->Admin_model->getLocationByData();
            $data['banks'] = $banks;
            $data['cities']=$cities ;
            $data['Reffered_by']=$Reffered_by ;
             $data['filter_location']=$filter_location ;
            //print_r($Reffered_by);
            //exit();
            $_SESSION["data_for_excel"] =  $dsa_arr ;
              $this->session->set_userdata('file_name','DSA List');
            //$this->load->view('admin/admin_dashbord', $data);
           // $this->load->view('admin/dsa', $data);   
           $this->load->view('admin/dsa_PG', $data);   

        }    
    }
    public function Relationship_Officer()
	{
		 $id = $this->input->get('id');
        if($id == '')$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');
		
			if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
		
        $date = $this->input->get('date');
        $userType2 = $this->input->get('userType2');
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'Operations_user'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/login'));
        }else{
             $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s=$this->input->get('s');	
		           
           

			$id = $this->session->userdata('ID');
			$data['row1']=$this->Customercrud_model->getProfileData($id);
		    $Relation_Officer_arr = $this->Admin_model->getRelationOfficer($id, $s, $userType, $userType2, $date);
            $_SESSION["data_for_excel"] =$Relation_Officer_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['data'] = $Relation_Officer_arr;
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
             $data['userType']=$userType;
			$this->load->view('dashboard_header', $data);
            $this->load->view('admin/Relationship_Officer', $data);   
			
        }        
	}

/*-------------------------------------------- Added by papiha on 04_03_2022---------------------------------------*/
public function get_dsa_user_BM()
{
    $User_id=$this->input->post('User_id');
 
    $dsa_arr = $this->Admin_model->get_dsa_user_BM($User_id);

     echo json_encode($dsa_arr);
 

}
public function get_dsa_user_RO()
{
    $User_id=$this->input->post('User_id');
 
    $dsa_arr = $this->Admin_model->get_dsa_user_RO($User_id);

     echo json_encode($dsa_arr);

}
/*----------------------------------------Added by papiha on 05_03_20222-------------------------------------*/
	
public function get_connector_user_RO()
{
    $filter="";
    $userType2="";
    $date="";
    $User_id=$this->input->post('User_id');
    $User_Type=$this->input->post('User_Type');
    $dsa_arr =$this->Dsacustomers_model->getConnector($User_id, $filter, $User_Type, $userType2, $date);

     echo json_encode($dsa_arr);
 

}
public function get_connector_user_BM()
{
    $filter="";
    $userType2="";
    $date="";
    $User_id=$this->input->post('User_id');
    $User_Type=$this->input->post('User_Type');
    $dsa_arr =$this->Dsacustomers_model->getConnector($User_id, $filter, $User_Type, $userType2, $date);
    //$dsa_arr = $this->Admin_model->get_connector_user_BM($User_id,$User_Type);

     echo json_encode($dsa_arr);
 

}
public function get_connector_user_DSA()
{
    $filter="";
    $userType2="";
    $date="";
    $User_id=$this->input->post('User_id');
    $User_Type=$this->input->post('User_Type');
    $dsa_arr =$this->Dsacustomers_model->getConnector($User_id, $filter, $User_Type, $userType2, $date);

     echo json_encode($dsa_arr);
 

}
public function get_ro_user_BM()
    {
        $User_id=$this->input->post('User_id');
     
        $dsa_arr = $this->Admin_model->get_ro_user_BM($User_id);
    
         echo json_encode($dsa_arr);
     
    
    }
    /*------------------------------------------- Added by papiha on 05_03_2022 download excel for customers of operational user -----------------------------------------------------------------*/
    
    public Function download_Excel_customer_op()
	{
		
				 $this->load->library('excel');

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
				$this->excel->getActiveSheet()->setTitle('Customer list');

				$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);


				$this->excel->getActiveSheet()->getStyle("A1:J1")->applyFromArray(array("font" => array("bold" => true)));


                $this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'Application ID');
				$this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'NAME');
				$this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'EMAIL ADDRESS');
				$this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'MOBILE');
				$this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'PIN CODE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'PROFILE STATUS');
                $this->excel->setActiveSheetIndex(0)->setCellValue('H1', 'LOAN STATUS');
			
                $this->excel->setActiveSheetIndex(0)->setCellValue('I1', 'CREATED DATE');
                $this->excel->setActiveSheetIndex(0)->setCellValue('J1', 'CAM STATUS');


				// get all users in array formate
                $data_for_excel= $this->session->userdata('data_for_excel');
				$users=json_decode(json_encode($data_for_excel), true);
				//$this->excel->getActiveSheet()->fromArray($users, null, 'A2');
                 $count=2;
				 $i=1;
				 foreach($users as $row)
				 {   $date = date_create($row['CREATED_AT']); $date2= date_format($date, 'd-m-Y');
					  $this->excel->getActiveSheet()->setCellValue('A'.$count,$i);
					  $this->excel->getActiveSheet()->setCellValue('B'.$count,$row['Application_id']);
					  $this->excel->getActiveSheet()->setCellValue('C'.$count,$row['FN'].' '.$row['LN']);
					  $this->excel->getActiveSheet()->setCellValue('D'.$count,$row['EMAIL']);
					  $this->excel->getActiveSheet()->setCellValue('E'.$count,$row['MOBILE']);
                      $this->excel->getActiveSheet()->setCellValue('F'.$count,$row['RES_ADDRS_PINCODE']);
                     if($row['PROFILE_PERCENTAGE'] == '' || $row['PROFILE_PERCENTAGE']!=100) 
                     {   $this->excel->getActiveSheet()->setCellValue('G'.$count,'INCOMPLETE');
                    }else{
                        $this->excel->getActiveSheet()->setCellValue('G'.$count,'COMPLETED');
                    }
					  if($row['STATUS']!='Aadhar E-sign complete')
                      { $this->excel->getActiveSheet()->setCellValue('H'.$count,'INCOMPLETE');
                    } else
                    {$this->excel->getActiveSheet()->setCellValue('H'.$count,'COMPLETED');
                    }
                      $this->excel->getActiveSheet()->setCellValue('I'.$count,$date2);
                      $this->excel->getActiveSheet()->setCellValue('J'.$count,$row['cam_status']);
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
						//ob_end_clean();
				$objWriter->save('php://output');
	}
    /*------------------------------------------- Addeec by papiha on 12_03_2022----------------------------------------------------------------------*/
     public function get_self_customers()
     {
         
        $User_id=$this->input->post('User_id');
        $User_Type=$this->input->post('User_Type');
        
      
        $dsa_arr = $this->Dsacustomers_model->get_self_customers($User_id,$User_Type);
       
            echo json_encode($dsa_arr);
     }
     public function get_self_Connector()
     {
        $User_id=$this->input->post('User_id');
        $User_Type=$this->input->post('User_Type');
        
      
        $dsa_arr = $this->Dsacustomers_model->get_self_Connector($User_id,$User_Type);
       
            echo json_encode($dsa_arr);
     }
     
     public function get_self_dsa()
     {
        $User_id=$this->input->post('User_id');
        $User_Type=$this->input->post('User_Type');
        
      
        $dsa_arr = $this->Dsacustomers_model->get_self_dsa($User_id,$User_Type);
       
            echo json_encode($dsa_arr);
     }
     /*------------------------------------- Added by papiha on 14-03-2022-----------------------------------------------------------*/
    public function Legal()
 {
       
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
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
        else{
             $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
           
			
            
           // $dsa_arr = $this->Admin_model->getLegal();
            $data['row']=$this->Customercrud_model->getProfileData($id);          
            $data['showNav'] = 1;
            $data['age'] = $age;
           
           // $data['data'] = $dsa_arr;
            $data['userType'] = $this->session->userdata('USER_TYPE');
            //$this->load->view('header', $data);   
            //$this->load->view('admin/Legal', $data);  
            $this->load->view('admin/Legal_PG', $data); 
        }    
    }

    //------------------------------- added by priyanka 22-03-2022
    
	public function Manage_user_access(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            if($s==''){
				$s='all';
			}
            $get_all_users_types = $this->Admin_model->get_all_users_types();
			$get_all_users_assigne_from_list= $this->Admin_model->get_all_users_assigne_from_list();
			$data['get_all_users_assigne_from_list'] = $get_all_users_assigne_from_list ;
            
			$get_all_user_accounts= $this->Admin_model->get_all_user_accounts();
			$data['get_all_user_accounts'] = $get_all_user_accounts ;
			//echo "<pre>";
			//print_r($get_all_users_assigne_from_list);
			//echo "</pre>";
			//exit();
			$data['get_all_users_types'] = $get_all_users_types ;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['userType'] = $this->session->userdata('USER_TYPE');
            //$this->load->view('header', $data);             
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/Manage_user_access', $data);   
        }        
    }
    //-------------------------------- added by priya 22-03-2022
    public function find_role_for_user()
	{
		 $data=array(
					 'find_role_for_assign_from_user'=>$this->input->post('find_role_for_assign_from_user'),
		            );
	     $user_id=$data['find_role_for_assign_from_user'];
		 $user_info= $this->Operations_user_model->getProfileData($user_id);
		 	$json = array (   'ROLE' =>$user_info->ROLE,
							  'msg'=>'success'
						  );
						 echo json_encode($json);
	}
	public function find_entries_for_assigne_process()
	{
		 $data=array(
					 'User_ID'=>$this->input->post('User_ID'),
					 'ROLE_for_category'=>$this->input->post('ROLE_for_category'),
		            );
	     $user_id=$data['User_ID'];
		 $ROLE_for_category=$data['ROLE_for_category'];
		 $user_info= $this->Operations_user_model->getProfileData($user_id);
		 $user_info_ROLE=$user_info->ROLE;
	
		 if($user_info->ROLE == 2)
		 {

			  $get_dsa_users= $this->Operations_user_model->get_dsa_users($user_id,$ROLE_for_category);
			  $json = array ( 'Display_users' =>$get_dsa_users,
							  'msg'=>'success'
						  );
						 echo json_encode($json);
		 }
		 else if($user_info->ROLE == 14)
		 {
			  $get_RO_users= $this->Operations_user_model->get_RO_users($user_id,$ROLE_for_category);
			  $json = array ( 'Display_users' =>$get_RO_users,
							  'msg'=>'success'
						  );
						 echo json_encode($json);
		 }
		  else if($user_info->ROLE == 13)
		 {
			  $get_BM_users= $this->Operations_user_model->get_BM_users($user_id,$ROLE_for_category);
			  $json = array ( 'Display_users' =>$get_BM_users,
							  'msg'=>'success'
						  );
						 echo json_encode($json);
		 }
		  else if($user_info->ROLE == 6)
		 {
			  $get_CSR_users= $this->Operations_user_model->get_CSR_users($user_id,$ROLE_for_category);
			  $json = array ( 'Display_users' =>$get_CSR_users,
							  'msg'=>'success'
						  );
						 echo json_encode($json);
		 }
		  else if($user_info->ROLE == 7)
		 {
			  $get_Manager_users= $this->Operations_user_model->get_Manager_users($user_id,$ROLE_for_category);
			  $json = array ( 'Display_users' =>$get_Manager_users,
							  'msg'=>'success'
						  );
						 echo json_encode($json);
		 }
		  else if($user_info->ROLE == 15)
		 {
			  $get_Cluster_manager_users= $this->Operations_user_model->get_Cluster_manager_users($user_id,$ROLE_for_category);
			  $json = array ( 'Display_users' =>$get_Cluster_manager_users,
							  'msg'=>'success'
						  );
						 echo json_encode($json);
		 }
           else if($user_info->ROLE == 21)
		 {
			  $get_sales_manager_users= $this->Operations_user_model->get_sales_manager_users($user_id,$ROLE_for_category);
			  $json = array ( 'Display_users' =>$get_sales_manager_users,
							  'msg'=>'success'
						  );
						 echo json_encode($json);
		 }
		


	}
    //--------------------- added by priyanka 23-02-2022
    public function submit_assigne_users_data()
	{
		$data=array(
					 'assigne_from'=>$this->input->post('assigne_from'),
					 'category'=>$this->input->post('category'),
					 'assigne_to'=>$this->input->post('assigne_to'),
					 'assign_user_array'=>$this->input->post('assign_user_array'),
		            );
                    
        $assigne_from =$data['assigne_from'];
		$assigne_to =$data['assigne_to'];
		$replace_ID = $assigne_to;
		$assign_user_array =$data['assign_user_array'];


		$assigne_from_user_info = $this->Operations_user_model->getProfileData($assigne_from);
		$assigne_from_user_role = $assigne_from_user_info->ROLE;
		
		if($assigne_from_user_role == 6)//csr
		{
			$update_array=array(
					                    'CSR_ID'=>'0'
									);
		}
		else if($assigne_from_user_role == 7)//manager
		{
			$update_array=array(
					                    'MANAGER_ID'=>'0'
									);
		}
		else if($assigne_from_user_role == 2)//DSA
		{
			$update_array=array(
					                    'DSA_ID'=>'0'
									);
		}
		else if($assigne_from_user_role == 13)//BM
		{
			$update_array=array(
					                    'BM_ID'=>'0'
									);
		}
		else if($assigne_from_user_role == 14)//RO
		{
			$update_array=array(
					                    'RO_ID'=>'0'
									);
		}
		else if($assigne_from_user_role == 15)//cluster manager
		{
			$update_array=array(
					                    'CM_ID'=>'0'
									);
		}
		else if($assigne_from_user_role == 16)//area manager
		{
			
		}
		else if($assigne_from_user_role == 17)//Regional manager
		{
		}	
		else if($assigne_from_user_role == 21)//Regional manager
        {
            $update_array=array(
                                        'SELES_ID'=>'0'
                                    );
            
        }

		$assigne_to_user_info = $this->Operations_user_model->getProfileData($assigne_to);
		$assigne_to_user_role = $assigne_to_user_info->ROLE;
		//echo $assigne_to_user_role;
		if($assigne_to_user_role == 6)// csr
		{
			foreach($assign_user_array as $value)
			{
				$unique_code =$value;
				$update_array['CSR_ID']=$replace_ID;
			
				$this->Operations_user_model->assigning_process($unique_code,$update_array);
			}
			$json = array (   'msg'=>'success'
						  );
						 echo json_encode($json);
		} 
		else if($assigne_to_user_role == 7) //manager
		{
			foreach($assign_user_array as $value)
			{
				$unique_code =$value;
				$update_array['MANAGER_ID']=$replace_ID;
			
				$this->Operations_user_model->assigning_process($unique_code,$update_array);
			}
			$json = array (   'msg'=>'success'
						  );
						 echo json_encode($json);
		}
		else if($assigne_to_user_role == 2) //DSA
		{
			foreach($assign_user_array as $value)
			{
				$unique_code =$value;
				$update_array['DSA_ID']=$replace_ID;
			
				$this->Operations_user_model->assigning_process($unique_code,$update_array);
			}
			$json = array (   'msg'=>'success'
						  );
						 echo json_encode($json);
		}
		else if($assigne_to_user_role == 13) //BM
		{
			foreach($assign_user_array as $value)
			{
				$unique_code =$value;
				$update_array['BM_ID']=$replace_ID;
			
				$this->Operations_user_model->assigning_process($unique_code,$update_array);
			}
			$json = array (   'msg'=>'success'
						  );
						 echo json_encode($json);

		}
		else if($assigne_to_user_role == 14) //RO
		{
			foreach($assign_user_array as $value)
			{
				$unique_code =$value;
				$update_array['RO_ID']=$replace_ID;
			
				$this->Operations_user_model->assigning_process($unique_code,$update_array);
			}
			$json = array (   'msg'=>'success'
						  );
						 echo json_encode($json);

		}
		else if($assigne_to_user_role == 15) // cluster manager
		{
			foreach($assign_user_array as $value)
			{
				$unique_code =$value;
				$update_array['CM_ID']=$replace_ID;
			
				$this->Operations_user_model->assigning_process($unique_code,$update_array);
			}
			$json = array (   'msg'=>'success'
						  );
						 echo json_encode($json);
		}
        else if($assigne_to_user_role == 21) // cluster manager
		{
			foreach($assign_user_array as $value)
			{
				$unique_code =$value;
				$update_array['SELES_ID']=$replace_ID;
			
				$this->Operations_user_model->assigning_process($unique_code,$update_array);
			}
			$json = array (   'msg'=>'success'
						  );
						 echo json_encode($json);
		}
		else if($assigne_to_user_role == 16) // area Manager
		{

		}
	    else if($assigne_to_user_role == 17) //regional manager
		{

		}



	  /*  $json = array ( 'Display_users' =>$get_Cluster_manager_users,
							  'msg'=>'success'
						  );
						 echo json_encode($json);*/
	}
    	public function submit_convert_account_data()
	{
		$data=array(
					 'User_ID'=>$this->input->post('User_ID'),
					 'Convert_to_role'=>$this->input->post('Convert_to_role'),
				     );
        $User_ID= $data['User_ID'];
		$Convert_to_role=$data['Convert_to_role'];
	    $selected_user_info =$this->Operations_user_model->getProfileData($User_ID);
		$selected_user_info_role =$selected_user_info->ROLE;
		$ROLE_for_category='All';

		$change_role= $this->Operations_user_model->change_user_role($User_ID,$Convert_to_role);

		if($Convert_to_role == 6)//csr
		{
			$update_array=array(
					                    'CSR_ID'=>$User_ID
									);
		}
		
		else if($Convert_to_role == 7)//manager
		{
			$update_array=array(
					                    'MANAGER_ID'=>$User_ID
									);
		}
		else if($Convert_to_role == 2)//DSA
		{
			$update_array=array(
					                    'DSA_ID'=>$User_ID
									);
		}
		else if($Convert_to_role == 13)//BM
		{
			$update_array=array(
					                    'BM_ID'=>$User_ID
									);
		}
		else if($Convert_to_role == 14)//RO
		{
			$update_array=array(
					                    'RO_ID'=>$User_ID
									);
		}
		else if($Convert_to_role == 15)//cluster manager
		{
			$update_array=array(
					                    'CM_ID'=>$User_ID
									);
		}
		else if($Convert_to_role == 16)//area manager
		{
			
		}
		else if($Convert_to_role == 17)//Regional manager
		{
			
		}


		 if($selected_user_info_role == 2)
		 {
			  $update_array['DSA_ID']=0;
			    
			  $get_dsa_users=  json_decode(json_encode($this->Operations_user_model->get_dsa_users($User_ID,$ROLE_for_category)),true);

			  foreach($get_dsa_users as $value)
			{
				$unique_code =$value['UNIQUE_CODE'];
				$this->Operations_user_model->assigning_process($unique_code,$update_array);
			}
			$json = array (   'msg'=>'success'
						  );
						 echo json_encode($json);


		 }
		 else if($selected_user_info_role == 14)
		 {
			  $update_array['RO_ID']=0;
			  $get_RO_users= json_decode(json_encode($this->Operations_user_model->get_RO_users($User_ID,$ROLE_for_category)),true);
		
			foreach($get_RO_users as $value)
			{
				
				$unique_code =$value['UNIQUE_CODE'];
				$this->Operations_user_model->assigning_process($unique_code,$update_array);
			}
			$json = array (   'msg'=>'success'
						  );
						 echo json_encode($json);
			 
		 }
		  else if($selected_user_info_role == 13)
		 {
			  $update_array['BM_ID']=0;
			  $get_BM_users= json_decode(json_encode($this->Operations_user_model->get_BM_users($User_ID,$ROLE_for_category)),true);
			  
			
			  foreach($get_BM_users as $value)
			{
				$unique_code =$value['UNIQUE_CODE'];
				$this->Operations_user_model->assigning_process($unique_code,$update_array);
			}
			$json = array (   'msg'=>'success'
						  );
						 echo json_encode($json);
			  
		 }
		  else if($selected_user_info_role == 6)
		 {
			 $update_array['CSR_ID']=0;
			  $get_CSR_users= json_decode(json_encode($this->Operations_user_model->get_CSR_users($User_ID,$ROLE_for_category)),true);
			 
			 foreach($get_CSR_users as $value)
			{
				$unique_code =$value['UNIQUE_CODE'];
				$this->Operations_user_model->assigning_process($unique_code,$update_array);
			}
			$json = array (   'msg'=>'success'
						  );
						 echo json_encode($json);
			 
		 }
		  else if($selected_user_info_role == 7)
		 {
			  $update_array['MANAGER_ID']=0;
			   $get_Manager_users= json_decode(json_encode($this->Operations_user_model->get_Manager_users($User_ID,$ROLE_for_category)),true);
			   foreach($get_Manager_users as $value)
			{
				$unique_code =$value['UNIQUE_CODE'];
				$this->Operations_user_model->assigning_process($unique_code,$update_array);
			}
			$json = array (   'msg'=>'success'
						  );
						 echo json_encode($json);
			  
		 }
		  else if($selected_user_info_role == 15)
		 {
			  $update_array['CM_ID']=0;
			
			  $get_Cluster_manager_users= json_decode(json_encode($this->Operations_user_model->get_Cluster_manager_users($User_ID,$ROLE_for_category)),true);
			   foreach($get_Cluster_manager_users as $value)
			{
				$unique_code =$value['UNIQUE_CODE'];
				$this->Operations_user_model->assigning_process($unique_code,$update_array);
			}
			$json = array (   'msg'=>'success'
						  );
						 echo json_encode($json);
			 
		 }
		




	}
    //added by sonal 8-04-2022
    public function Support_Member()
	{
		
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $search_name ='';
            $search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');

            if(!empty($search_))
			{
				$s='search';
				$search_name =$this->input->post('filter_name');	
			}
            else if(!empty($select_filters))
            {
                $s=$select_filters;
                $search_name="";
            }
			else
			{
				$s = $this->input->get('s');
				$search_name="";
			}

           // $support_member_arr = $this->Admin_model->support_member();       
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            //$data['data'] =$support_member_arr;
            
          //  $this->load->view('support_member', $data);   
          $this->load->view('support_member_PG', $data);   
			
        }        
	}
     //added by sonal on 14-4-2022
    public function delete_Sales_Manager()
	{
		$id=$this->input->post('id');
        $delete_SALES = $this->Admin_model->delete_customer($id);
		$this->Sales_Manager();
		
	}
     public function Sales_Manager()
	{
		
        if($this->session->userdata('USER_TYPE') == ''){
            redirect(base_url('index.php/admin'));
        }
		else
		{
            $id = $this->session->userdata('ID');
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $search_name ='';
            $search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');

            if(!empty($search_))
			{
				$s='search';
				$search_name =$this->input->post('filter_name');	
			}
            else if(!empty($select_filters))
            {
                $s=$select_filters;
                $search_name="";
            }
			else
			{
				$s = $this->input->get('s');
				$search_name="";
			}

           // $sales_member_arr = $this->Admin_model->sales_manager();       
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           // $data['data'] =$sales_member_arr;
            
           // $this->load->view('admin/sales_manager_view', $data);
           $data['row']=$this->Customercrud_model->getProfileData($id);
           $this->load->view('dashboard_header', $data);
           $this->load->view('admin/sales_manager_view_PG', $data);      
			
        }        
	}
    /*----------------------------------------------------- added by papiha on 16_04_2022-----------------------------------------------------------*/
    public Function download_Excel_user()
	{
        
          
                $customer_created_by_data=$this->Dsacustomers_model->getCustomer_created_by();
                $customer_created_by=json_decode(json_encode($customer_created_by_data), true);
        
		
				 $this->load->library('excel');

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
                $file_name=$this->session->userdata('file_name');
                if(isset($file_name))
                {
                    $this->excel->getActiveSheet()->setTitle($file_name);
                }
                else{
				$this->excel->getActiveSheet()->setTitle('DSA list');
                }

				$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
               

				$this->excel->getActiveSheet()->getStyle("A1:J1")->applyFromArray(array("font" => array("bold" => true)));

				$this->excel->setActiveSheetIndex(0)->setCellValue('A1', 'SR NO');
				$this->excel->setActiveSheetIndex(0)->setCellValue('B1', 'FIRST NAME');
                $this->excel->setActiveSheetIndex(0)->setCellValue('C1', 'LAST NAME');
                $this->excel->setActiveSheetIndex(0)->setCellValue('D1', 'Location');
                $this->excel->setActiveSheetIndex(0)->setCellValue('E1', 'Profile Status');
                $this->excel->setActiveSheetIndex(0)->setCellValue('F1', 'Refer By');
                $this->excel->setActiveSheetIndex(0)->setCellValue('G1', 'Assign To');
                $this->excel->setActiveSheetIndex(0)->setCellValue('H1', 'Login Date');
                
              
			
              


				// get all users in array formate
                $data_for_excel= $this->session->userdata('data_for_excel');
				$users=json_decode(json_encode($data_for_excel), true);
				//$this->excel->getActiveSheet()->fromArray($users, null, 'A2');
                 $count=2;
				 $i=1;
				 foreach($users as $row)
				 {
                  
					  $this->excel->getActiveSheet()->setCellValue('A'.$count,$i);
					  $this->excel->getActiveSheet()->setCellValue('B'.$count,$row['FN']);
					  $this->excel->getActiveSheet()->setCellValue('C'.$count,$row['LN']);
                      $this->excel->getActiveSheet()->setCellValue('D'.$count,$row['Location']);
                      if($row['Profile_Status']=='' || $row['Profile_Status']==NULL)
                      {
                      $this->excel->getActiveSheet()->setCellValue('E'.$count,'Incomplete Profile');
                      }
                      else{
                        $this->excel->getActiveSheet()->setCellValue('E'.$count,'Complete ');
                      }
                      $this->excel->getActiveSheet()->setCellValue('F'.$count,$row['Refer_By_Name']);
                      $this->excel->getActiveSheet()->setCellValue('H'.$count,$row['CREATED_AT']);
                      foreach($customer_created_by as $row1)
                      { 
                           if($row['DSA_ID']!=NULL && $row['DSA_ID']!='0' )
                          {
                              if($row1['UNIQUE_CODE']==$row['DSA_ID'])
                              {
                                  //echo $row1->FN.' '.$row1->LN.' [DSA]<br>';
                                  $this->excel->getActiveSheet()->setCellValue('G'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
                              }
                          }
                          else if($row['RO_ID']!=NULL && $row['RO_ID']!='0' )
                          {
                              if($row1['UNIQUE_CODE']==$row['RO_ID'])
                              {
                                  //echo $row1->FN.' '.$row1->LN.' [RO]<br>';
                                  $this->excel->getActiveSheet()->setCellValue('G'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
                              }
                          }
                          else if($row['BM_ID']!=NULL && $row['BM_ID']!='0' )
                          {
                              if($row1['UNIQUE_CODE']==$row['BM_ID'])
                              {
                                  //echo $row1->FN.' '.$row1->LN.' [BM]<br>';
                                  $this->excel->getActiveSheet()->setCellValue('G'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
                              }
                          }
                          else if($row['SELES_ID']!=NULL && $row['SELES_ID']!='0' )
                          {
                              if($row1['UNIQUE_CODE']==$row['SELES_ID'])
                              {
                                  //echo $row1->FN.' '.$row1->LN.' [BM]<br>';
                                  $this->excel->getActiveSheet()->setCellValue('G'.$count,strtoupper($row1['FN'].' '.$row1['LN']));
                              }
                          }
                      }
					 
                     
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
						//ob_end_clean();
				$objWriter->save('php://output');
	}

    public function submit_account_disable_data()
	{
		$data=array(
					 'User_ID'=>$this->input->post('User_ID'),
					 );
        $User_ID= $data['User_ID'];
		$selected_user_info =$this->Operations_user_model->getProfileData($User_ID);
		$selected_user_info_role =$selected_user_info->ROLE;

		$change_Role_for_disable = "10".$selected_user_info_role;
		//$original_role =  substr($change_Role_for_disable, 2);
		$change_role_for_disable=array(
			       	 'ROLE'=>$change_Role_for_disable
					 );
		$update_role = $this->Admin_model->update_disable_user_role($User_ID,$change_role_for_disable);
		$json = array ( 'msg'=>'success'
						  );
				echo json_encode($json);

	}
	public function find_disable_user()
	{
		

			  $get_disabled_users= $this->Admin_model->get_disabled_users();
			  $json = array ( 'Display_users' =>$get_disabled_users,
							  'msg'=>'success'
						  );
						 echo json_encode($json);
		
	
		


	}
	public function enable_data()
	{
			$data=array(
					 'User_ID'=>$this->input->post('User_ID'),
					 );
			 $User_ID= $data['User_ID'];
			$selected_user_info =$this->Operations_user_model->getProfileData($User_ID);
			$selected_user_info_role =$selected_user_info->ROLE;
			$original_role =  substr($selected_user_info_role, 2);
			$change_role_for_enable=array(
			       	 'ROLE'=>$original_role
					 );
		   $update_role = $this->Admin_model->update_disable_user_role($User_ID,$change_role_for_enable);
		   $json = array ( 'msg'=>'success'
						  );
				echo json_encode($json);
			
	}
    /*----------------------------------- Added by papiha on 21_04_2022---------------------------------------------------*/
    public function New_Branch_Location(){
		
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
            $Cities = $this->Admin_model->get_Master_Cities();
            //$this->load->view('header', $data);
            $data['Cities'] = $Cities;
          
			$Branches = $this->Admin_model->get_all_Branches();
			
			$data['Branches']=$Branches;
            $this->load->view('admin/admin_dashbord', $data);   
            $this->load->view('admin/Add_Branch_Location', $data);
        }
    }


      //======================= added by priya 29-04-2022

    //-------------------------- function added for RO ---- before uploding plz do changes in admin/customers_allusers() function
    public function Operations_user_customers_PG()
    {

        $id = $this->input->get('id');
        if($id == '')$id = $this->session->userdata('ID');
        $userType = $this->input->get('userType');

        $date = $this->input->get('date');
        $userType2 = $this->input->get('userType2');
        if ($userType == '')$userType = $this->session->userdata("USER_TYPE");

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
        $sel = $this->Dsacustomers_model->getALLCustomers($id,$userType);
       // $sel=$this->Admin_model->Get_Total_No_Customer();
        $totalRecords =$sel;
        ## Total number of records with filtering
        $sel=$this->Dsacustomers_model->Get_ALLCustomer_Filter($id,$searchValue);
        $totalRecordwithFilter =$sel;
        ## Fetch records
        $sel=$this->Dsacustomers_model->Get_ALLCustomer_With_Page($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
        $empRecords = $sel;
        $data = array();

        foreach($empRecords as $row){
            if($row->STATUS == 'PD Completed')
            {
                $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                $PD='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/credit_manager_user/pdf?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
            }
            else if($row->STATUS == 'Aadhar E-sign complete')
            {
                 $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                 $PD='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
            }
            else
            {
                 $Pre_cam='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                 $PD='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
            }

            if($row->cam_status == 'Cam details complete')
            {
                $CAM='<a style="margin-left: 8px; " href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
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


            /*-------------------------------- pre came and PD ------------------------------------------------*/
              if( $row->STATUS =='Loan Sanctioned')
            {
                 $Sanction_letter='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/Sanction_Letter?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                 $MITC='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/MITAC_pdf?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
             }
            else
                {
                    
                    $Sanction_letter='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                    $MITC='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                    
                }

            $data[] = array(
                    "ID"=>$row->ID,
                    "FN"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->FN.' '.$row->LN.'</a>',
                    "Customer_status"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->STATUS.'</a>',
                    "Application_Status"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->STATUS.'</a>',
                   
					/* "Stage"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->Stage.'</a>',
					 "Sub_Stage"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->Sub_Stage.'</a>',*/
					"Loan_Type"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->loan_type.'</a>',
                    "Referred_by"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]'.'</a>',
                    "Created_on"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->CREATED_AT.'</a>',
                    "Last_updated_on"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->last_updated_date.'</a>',
                    "UNIQUE_CODE"=>'<a style="margin-left: 8px;" href="'.base_url().'index.php/dsa/Go_No_GO_?ID='.$row->UNIQUE_CODE.'"class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a><a style="margin-left: 8px; " href="'.base_url().'index.php/customer/profile_view_p_o?ID='.$row->UNIQUE_CODE.'"class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>',
                    "Bureau_reports"=>'<a style="margin-left: 8px; " href="'.base_url().'index.php/dsa/show_coapplicants?ID='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>',
                     "Pre_cam"=>$Pre_cam,
                     "CAM"=>$CAM,
                     "PD"=>$PD,
                     "Sanction_letter"=>$Sanction_letter,
                     "MITC"=>$MITC,
                     "Loan_sanction_form"=>$Loan_sanction_form,
                     "Amortization"=>$Amortization
            
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


            /*-------------------admin HR pagination 30-04-2022------------------------->work on filter on 11-05-2022*/ 
            public function customer_with_paginations_HR()
            {
                $filter_by=$this->input->post('filter');
        
                # Read value
                $draw = $_POST['draw'];
                $row = $_POST['start'];
                $rowperpage = $_POST['length']; // Rows display per page
                $columnIndex = $_POST['order'][0]['column']; // Column index
                $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                $searchValue = $_POST['search']['value']; // Search value
        
        
        
                ## Search
                $searchQuery = " ";
                ## Total number of records without filtering
                $sel=$this->Admin_model->Get_Total_No_Customer_HR($filter_by);
                $totalRecords =$sel;
                ## Total number of records with filtering
                $sel=$this->Admin_model->Get_Customer_Filter_HR($searchValue,$filter_by);
                $totalRecordwithFilter =$sel;
                ## Fetch records
                $sel=$this->Admin_model->Get_Customer_With_Page_HR($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
                $empRecords = $sel;
                //return $empRecords
                //print_r($empRecords);
                
                    $data = array();
        
                    foreach($empRecords as $row){
                        
                      $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                                   
                      $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
                     
   
                      if($row->Profile_Status=="Complete") 
                      {
                       $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
                        }
                        else
                         { 
                           $incomplete='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                          
                         } 
                       $data[] = array(
                           "FN"=>$row->FN." ".$row->LN,
                           "Email"=>$row->EMAIL,
                           "MOBILE"=>$row->MOBILE,
                           "Profile_Status"=>$incomplete,
                           "date"=>$row->CREATED_AT,
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
                    /*-------------------admin  Cluster Manager pagination------------------------->work on filter on 11-05-2022*/ 
                   public function customer_with_paginations_Cluster()
                    {
                       
                       $filter_by=$this->input->post('filter');
                             $Start_Date=$_POST['Start_Date'];
                       $End_Date=$_POST['End_Date'];
                       $filter_by=$_POST['filter'];
                        $location=$_POST['location'];

                        # Read value
                        $draw = $_POST['draw'];
                        $row = $_POST['start'];
                        $rowperpage = $_POST['length']; // Rows display per page
                        $columnIndex = $_POST['order'][0]['column']; // Column index
                        $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                        $searchValue = $_POST['search']['value']; // Search value
                
                
                
                        ## Search
                        $searchQuery = " ";
                        ## Total number of records without filtering
                        $sel=$this->Admin_model->Get_Total_No_Customer_Cluster($filter_by);
                        $totalRecords =$sel;
                        ## Total number of records with filtering
                       $sel=$this->Admin_model->Get_Customer_Filter_Cluster($searchValue,$filter_by,$Start_Date,$End_Date, $location);
                        $totalRecordwithFilter =$sel;
                        ## Fetch records
                       $sel=$this->Admin_model->Get_Customer_With_Page_Cluster($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date,$location);
                        $empRecords = $sel;
                        //return $empRecords
                        //print_r($empRecords);
                        
                            $data = array();
                
                            foreach($empRecords as $row){
                              $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                                           
                              $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
                             
           
                              if($row->Profile_Status=="Complete") 
                              {
                               $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
                                }
                                else
                                 { 
                                   $incomplete='<h6 style="font-size: 10px; color: red">    INCOMPLETE PROFILE </h6>';
                                  
                                 } 
                               $data[] = array(
                                   "FN"=>$row->FN." ".$row->LN,
                                   "Email"=>$row->EMAIL,
                                   "MOBILE"=>$row->MOBILE,
                                   "LOCATION"=>$row->Location,
                                   "Profile_Status"=>$incomplete,
                                   "date"=>$row->CREATED_AT,
                                   "Action"=>$link,//." ".$link1,
                                   
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
           

                /*-------------------admin  Branch Manager pagination------------------------->*/ 
                 public function customer_with_paginations_Branch()
                 {
                    
                    $Start_Date=$_POST['Start_Date'];
                       $End_Date=$_POST['End_Date'];
                       $filter_by=$_POST['filter'];
                        $location=$_POST['location'];
                     # Read value
                     $draw = $_POST['draw'];
                     $row = $_POST['start'];
                     $rowperpage = $_POST['length']; // Rows display per page
                     $columnIndex = $_POST['order'][0]['column']; // Column index
                     $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                     $searchValue = $_POST['search']['value']; // Search value
             
             
             
                     ## Search
                     $searchQuery = " ";
                     ## Total number of records without filtering
                     $sel=$this->Admin_model->Get_Total_No_Customer_Branch($filter_by);
                     $totalRecords =$sel;
                     ## Total number of records with filtering
                    $sel=$this->Admin_model->Get_Customer_Filter_Branch($searchValue,$filter_by,$Start_Date,$End_Date,$location);
                     $totalRecordwithFilter =$sel;
                     ## Fetch records
                     $sel=$this->Admin_model->Get_Customer_With_Page_Branch($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date,$location);
                     $empRecords = $sel;
                     //return $empRecords
                     //print_r($empRecords);
                     
                         $data = array();
             
                         foreach($empRecords as $row){
                           $link='<a style="margin-left: 8px;"'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                                        
                           $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
                          
        
                           if($row->IS_STRATEGIC_PARTNER == 0)
                           {    
                            $action='<form action="'.base_url().'index.php/admin/strategic_partner?partner=1&id='.$row->UNIQUE_CODE.'" method="GET" id="strategic_partner_add">
                                <button style="border-radius: 30px; text-align: center; display: inline; background-color: #e3eaed; color: black; font-size: 11px; padding-left: 5px; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">Convert To Strategic Parter</button>  
                             </form>';                          
                           }
                           else if($row->IS_STRATEGIC_PARTNER == 1)
                           {
                            $action='<form action="href="'.base_url().'index.php/admin/strategic_partner?partner=0&id='.$row->UNIQUE_CODE.'" method="GET"  id="strategic_partner_remove">
                              <td><button style="border-radius: 30px; text-align: center; display: inline; background-color: #e3eaed; color: black; font-size: 11px; padding-left: 5px; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">Remove From Strategic Parter</button>       
                             </form>';                                              
                           }
                           if($row->Profile_Status=="Complete") 
                           {
                            $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
                             }
                             else
                              { 
                                $incomplete='<h6 style="font-size: 10px; color: red">   INCOMPLETE PROFILE </h6>';
                               
                              } 
                            $data[] = array(
                                "FN"=>$row->FN." ".$row->LN,
                                "Email"=>$row->EMAIL,
                                "MOBILE"=>$row->MOBILE,
                                "LOCATION"=>$row->Location,
                                "Profile_Status"=>$incomplete,
                                "date"=>$row->CREATED_AT,
                                "Actions"=>$action,
                                "Action"=>$link,//." ".$link1,
                                
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
                      /*-------------------admin  Sales Manager pagination------------------------->*/

                      public function customer_with_paginations_Sales()
                      {
                          $filter_by=$this->input->post('filter');
                  
                          # Read value
                          $draw = $_POST['draw'];
                          $row = $_POST['start'];
                          $rowperpage = $_POST['length']; // Rows display per page
                          $columnIndex = $_POST['order'][0]['column']; // Column index
                          $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                          $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                          $searchValue = $_POST['search']['value']; // Search value
                  
                  
                  
                          ## Search
                          $searchQuery = " ";
                          ## Total number of records without filtering
                          $sel=$this->Admin_model->Get_Total_No_Customer_Sales($filter_by);
                          $totalRecords =$sel;
                          ## Total number of records with filtering
                          $sel=$this->Admin_model->Get_Customer_Filter_Sales($searchValue,$filter_by);
                          $totalRecordwithFilter =$sel;
                          ## Fetch records
                          $sel=$this->Admin_model->Get_Customer_With_Page_Sales($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
                          $empRecords = $sel;
                          //return $empRecords
                          //print_r($empRecords);
                          
                          $data = array();
                  
                          foreach($empRecords as $row){
                            $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                                         
                            $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
                           
             
                            if($row->Profile_Status=="Complete") 
                            {
                             $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
                              }
                              else
                               { 
                                 $incomplete='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                                
                               } 
                             $data[] = array(
                                 "FN"=>$row->FN." ".$row->LN,
                                 "Email"=>$row->EMAIL,
                                 "MOBILE"=>$row->MOBILE,
                                 "Profile_Status"=>$incomplete,
                                 "date"=>$row->CREATED_AT,
                                 "Actions"=>$link,//." ".$link1,
                                 
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
            /*-------------------admin  Operation User pagination------------------------->*/ 
            public function customer_with_paginations_Operation()
            {
     
                  $Start_Date=$_POST['Start_Date'];
                       $End_Date=$_POST['End_Date'];
                       $filter_by=$_POST['filter'];
                        $location=$_POST['location'];

                # Read value
                $draw = $_POST['draw'];
                $row = $_POST['start'];
                $rowperpage = $_POST['length']; // Rows display per page
                $columnIndex = $_POST['order'][0]['column']; // Column index
                $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                $searchValue = $_POST['search']['value']; // Search value
        
        
        
                ## Search
                $searchQuery = " ";
                ## Total number of records without filtering
                $sel=$this->Admin_model->Get_Total_No_Customer_Operation($filter_by);
                $totalRecords =$sel;
                ## Total number of records with filtering
                $sel=$this->Admin_model->Get_Customer_Filter_Operation($searchValue,$filter_by,$Start_Date,$End_Date,$filter_by,$location);
                $totalRecordwithFilter =$sel;
                ## Fetch records
                $sel=$this->Admin_model->Get_Customer_With_Page_Operation($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date,$filter_by,$location);
                $empRecords = $sel;
                //return $empRecords
                //print_r($empRecords);
                
                $data = array();
        
                    foreach($empRecords as $row){
                      $link='<a style="margin-left: 8px;"'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                                   
                      $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
                     
   
                      if($row->IS_STRATEGIC_PARTNER == 0)
                      { 
                       $action='<form action="'.base_url().'index.php/admin/strategic_partner?partner=1&id='.$row->UNIQUE_CODE.'" method="GET" id="strategic_partner_add">
                           <button style="border-radius: 30px; text-align: center; display: inline; background-color: #e3eaed; color: black; font-size: 11px; padding-left: 5px; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">Convert To Strategic Parter</button>   
                        </form>';                           
                      }
                      else if($row->IS_STRATEGIC_PARTNER == 1)
                      {
                       $action='<form action="href="'.base_url().'index.php/admin/strategic_partner?partner=0&id='.$row->UNIQUE_CODE.'" method="GET"  id="strategic_partner_remove">
                         <td><button style="border-radius: 30px; text-align: center; display: inline; background-color: #e3eaed; color: black; font-size: 11px; padding-left: 5px; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">Remove From Strategic Parter</button>        
                        </form>';                                               
                      }
                      if($row->Profile_Status=="Complete") 
                      {
                       $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
                        }
                        else
                         { 
                           $incomplete='<h6 style="font-size: 10px; color: red">    INCOMPLETE PROFILE </h6>';
                          
                         } 
                       $data[] = array(
                           "FN"=>$row->FN." ".$row->LN,
                           "Email"=>$row->EMAIL,
                           "MOBILE"=>$row->MOBILE,
                           "Profile_Status"=>$incomplete,
                           "date"=>$row->CREATED_AT,
                           "Actions"=>$action,
                           "Action"=>$link,//." ".$link1,
                           
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
      
   
   

                /*-------------------admin  Credit_Manager pagination------------------------->*/ 
                public function customer_with_paginations_Credit()
                {
                   
                   $filter_by=$this->input->post('filter');
       
                    # Read value
                    $draw = $_POST['draw'];
                    $row = $_POST['start'];
                    $rowperpage = $_POST['length']; // Rows display per page
                    $columnIndex = $_POST['order'][0]['column']; // Column index
                    $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                    $searchValue = $_POST['search']['value']; // Search value
            
            
            
                    ## Search
                    $searchQuery = " ";
                    ## Total number of records without filtering
                    $sel=$this->Admin_model->Get_Total_No_Customer_Credit($filter_by);
                    $totalRecords =$sel;
                    ## Total number of records with filtering
                    $sel=$this->Admin_model->Get_Customer_Filter_Credit($searchValue,$filter_by);
                    $totalRecordwithFilter =$sel;
                    ## Fetch records
                    $sel=$this->Admin_model->Get_Customer_With_Page_Credit($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
                    $empRecords = $sel;
                    //return $empRecords
                    //print_r($empRecords);
                    
                    $data = array();
            
                    foreach($empRecords as $row){
                      $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                                   
                      $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
                     
       
                      if($row->Profile_Status=="Complete") 
                      {
                       $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
                        }
                        else
                         { 
                           $incomplete='<h6 style="font-size: 10px; color: red">    INCOMPLETE PROFILE </h6>';
                          
                         } 
                       $data[] = array(
                           "FN"=>$row->FN." ".$row->LN,
                           "Email"=>$row->EMAIL,
                           "MOBILE"=>$row->MOBILE,
                           "Profile_Status"=>$incomplete,
                           "date"=>$row->CREATED_AT,
                           "Actions"=>$link,//." ".$link1,
                           
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
        /*---------------------------------------- Added by  papiha on 02_05_2022----------------------------------------*/
        public function Technical()
		{
			   
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
			if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv' ){
					redirect(base_url('index.php/admin'));
				}
				else{
					 $this->load->helper('url');  
					$age = $this->session->userdata('AGE');
				   
					
					
					//$dsa_arr = $this->Admin_model->getTechnical();
					$data['row']=$this->Customercrud_model->getProfileData($id);          
					$data['showNav'] = 1;
					$data['age'] = $age;
				   
					//$data['data'] = $dsa_arr;
					$data['userType'] = $this->session->userdata('USER_TYPE');
					$this->load->view('admin/admin_dashbord', $data);   
					//$this->load->view('admin/Technical', $data);
                    $this->load->view('admin/Technical_PG', $data);   


				}    
		}


        //=====================================internal bureu report PG by priya 2-05-2022
         //==================internal bureau reports  


    public function Show_internal_bureau_PG_reports()
    {
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
        $sel=$this->Admin_model->get_internal_idccr_List();
        $totalRecords =$sel;
        ## Total number of records with filtering
        $sel=$this->Admin_model->Get_internal_idccr_Filter($searchValue);
        $totalRecordwithFilter =$sel;
        ## Fetch records
        $sel=$this->Admin_model->Get_internal_idccr_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
        $empRecords = $sel;
        //return $empRecords
        //print_r($empRecords);
        $data = array();

        foreach($empRecords as $row){
               $data[] = array(
                    "ID"=>$row->id,
                    "customer_id"=>$row->customer_id,
                    "score"=>$row->score,
                    "checkedDate"=>$row->checked_dts,
                    "Bureau"=>'<a style="margin-left: 8px; margin-top:-10px;" target="_blank" href="'.base_url().'index.php/dsa/pdf?ID='.$row->customer_id.'" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>'
        


                );

        }
        //print_r($data);
        $response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
    } 

    //=========================== for idccr users reports  Show_idccr_PG_reports


      public function Show_idccr_PG_reports()
    {
   
     
        $data = array('EMAIL' => $_SESSION['IDCCR_user_email'], 'PASSWORD' => $_SESSION['IDCCR_user_pass']);
        $res = $this->Admin_model->Idccr_user_login($data);
        $user_details = $this->Admin_model->Idccr_user_details($res);
        $data['user_details']=$user_details;

       
        
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
        $sel=$this->Admin_model->get_IDCCR_bureauList($user_details->Email);
       
        $totalRecords =$sel;
        ## Total number of records with filtering
        $sel=$this->Admin_model->Get_idccr_bureau_Filter($user_details->Email,$searchValue);
        $totalRecordwithFilter =$sel;
        ## Fetch records
        $sel=$this->Admin_model->Get_idccr_bureau_With_Page($user_details->Email,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
        $empRecords = $sel;
        //return $empRecords
        //print_r($empRecords);
        $data = array();

        foreach($empRecords as $row){
          
               if($row->score_success=='success')
               {
                 $report='<a style="margin-left: 8px; " href="'.base_url().'index.php/admin/pdf?ID='.$row->id.'" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>';
               }
               else
               {
                  $report='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
               }

                if($row->score_success=='success')
               {
                 $Status='<lable style="width:15%;color:green;" >'.$row->score_success.'</lable>';
               }
               else
               {
                   $Status='<lable style="width:15%;color:red;" >'.$row->score_success.'</lable>';
               }

            $data[] = array(
                    "ID"=>$row->id,
                    "Name"=>$row->fname.' '.$row->lname,
                    "Email"=>$row->email,
                    "Mobile"=>$row->mobile,
                    "Status"=>$Status,
                    "Retail"=> $row->reatil_score,
                    "Score"=>$row->score,
                    "Created_at"=>date_format(date_create($row->created_date) , 'd-m-Y'),
                    "Report"=>$report
                    );

        }
        //print_r($data);
        $response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
    } 

  /*-------------------admin Support_Member pagination---added by sonal on 30-4-2022----------------------> */
  public function customer_with_paginations_Support()
  {
     

      # Read value
      $draw = $_POST['draw'];
      $row = $_POST['start'];
      $rowperpage = $_POST['length']; // Rows display per page
      $columnIndex = $_POST['order'][0]['column']; // Column index
      $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
      $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
      $searchValue = $_POST['search']['value']; // Search value



      ## Search
      $searchQuery = " ";
      ## Total number of records without filtering
      $sel=$this->Admin_model->Get_Total_No_Customer_Support();
      $totalRecords =$sel;
      ## Total number of records with filtering
      $sel=$this->Admin_model->Get_Customer_Filter_Support($searchValue);
      $totalRecordwithFilter =$sel;
      ## Fetch records
     $sel=$this->Admin_model->Get_Customer_With_Page_Support($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
      $empRecords = $sel;
      //return $empRecords
      //print_r($empRecords);
      
      $data = array();

      foreach($empRecords as $row){
        $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                     
        $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
       

       
         $data[] = array(
             "FN"=>$row->FN." ".$row->LN,
             "Email"=>$row->EMAIL,
             "MOBILE"=>$row->MOBILE,
            
           
           
             "Actions"=>$link,//." ".$link1,
             
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

  /*--------------------------------added by sonal--30-04-2022--- Manager Pagination------------------------------>*/
       /*-------------------admin  Manager pagination---added by sonal on 30-4-2022----------------------> */
       public function customer_with_paginations_Manager()
       {
          
        $filter_by=$this->input->post('filter');

           # Read value
           $draw = $_POST['draw'];
           $row = $_POST['start'];
           $rowperpage = $_POST['length']; // Rows display per page
           $columnIndex = $_POST['order'][0]['column']; // Column index
           $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
           $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
           $searchValue = $_POST['search']['value']; // Search value
   
   
   
           ## Search
           $searchQuery = " ";
           ## Total number of records without filtering
           $sel=$this->Admin_model->Get_Total_No_Customer_Manager($filter_by);
           $totalRecords =$sel;
           ## Total number of records with filtering
           $sel=$this->Admin_model->Get_Customer_Filter_Manager($searchValue,$filter_by);
           $totalRecordwithFilter =$sel;
           ## Fetch records
           $sel=$this->Admin_model->Get_Customer_With_Page_Manager($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
           $empRecords = $sel;
           //return $empRecords
           //print_r($empRecords);
           
           $data = array();
   
           foreach($empRecords as $row){
             $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                          
             $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
            

             if($row->Profile_Status=="Complete") 
             {
              $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
               }
               else
                { 
                  $incomplete='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                 
                } 
              $data[] = array(
                  "FN"=>$row->FN." ".$row->LN,
                  "Email"=>$row->EMAIL,
                  "MOBILE"=>$row->MOBILE,
                  "Profile_Status"=>$incomplete,
                  "date"=>$row->CREATED_AT,
                  "Actions"=>$link,//." ".$link1,
                  
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

      /*-------------------admin Legal pagination---added by sonal on 30-4-2022----------------------> */
      public function customer_with_paginations_Legal()
      {
         
  
          # Read value
          $draw = $_POST['draw'];
          $row = $_POST['start'];
          $rowperpage = $_POST['length']; // Rows display per page
          $columnIndex = $_POST['order'][0]['column']; // Column index
          $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
          $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
          $searchValue = $_POST['search']['value']; // Search value
  
  
  
          ## Search
          $searchQuery = " ";
          ## Total number of records without filtering
          $sel=$this->Admin_model->Get_Total_No_Customer_Legal();
          $totalRecords =$sel;
          ## Total number of records with filtering
          $sel=$this->Admin_model->Get_Customer_Filter_Legal($searchValue);
          $totalRecordwithFilter =$sel;
          ## Fetch records
         $sel=$this->Admin_model->Get_Customer_With_Page_Legal($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
          $empRecords = $sel;
          //return $empRecords
          //print_r($empRecords);
          
          $data = array();
  
          foreach($empRecords as $row){
            $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                         
            $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
           

            if($row->Profile_Status=="Complete") 
            {
             $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
             $data[] = array(
                 "FN"=>$row->FN." ".$row->LN,
                 "Email"=>$row->EMAIL,
                 "MOBILE"=>$row->MOBILE,
                
                 "Profile_Status"=>$incomplete,
                 "date"=>$row->CREATED_AT,
                 "Actions"=>$link,//." ".$link1,
                 
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
    /*-------------------admin rejected pagination added by priya 5-5-2022------------------------->*/ 
        //========================== rejected customers
      public function Rejected_customers()
    {
        
         if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR'  || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
           // $HR_user_arr = $this->Admin_model->HR($s);
           // $_SESSION["data_for_excel"] =$HR_user_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           // $data['data'] =$HR_user_arr;
           // $this->load->view('admin/admin_dashbord', $data);             
           // $this->load->view('admin/HR', $data);  
             if( $this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'Operations_user' || $this->session->userdata('USER_TYPE') == 'Cluster_credit_manager')
            {
                    $id = $this->session->userdata('ID');
                    $dashboard_data = $this->credit_manager_user_model->getDashboardData();  
                    $data['row']=$this->Customercrud_model->getProfileData($id);
                    $data['dashboard_data'] = $dashboard_data;
                    $this->load->view('dashboard_header', $data);
            }
            else
            {
                  $this->load->view('admin/admin_dashbord',$data);             
              }
           $this->load->view('admin/Rejected_PG', $data);  
            
        }        
    }
            public function customer_with_paginations_Rejected_customers()
            {
               
        
                # Read value
                $draw = $_POST['draw'];
                $row = $_POST['start'];
                $rowperpage = $_POST['length']; // Rows display per page
                $columnIndex = $_POST['order'][0]['column']; // Column index
                $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                $searchValue = $_POST['search']['value']; // Search value
        
        
        
                ## Search
                $searchQuery = " ";
                ## Total number of records without filtering
                $sel=$this->Admin_model->Get_Total_No_of_rejectedCustomers();
                $totalRecords =$sel;
                ## Total number of records with filtering
                $sel=$this->Admin_model->Get_rejected_Customer_Filter($searchValue);
                $totalRecordwithFilter =$sel;
                ## Fetch records
                $sel=$this->Admin_model->Get_rejected_Customer_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
                $empRecords = $sel;
                //return $empRecords
                //print_r($empRecords);
                
                    $data = array();
        
                    foreach($empRecords as $row){
                        
                     
                       $data[] = array(
                           "FN"=>$row->FN." ".$row->LN,
                           "Email"=>$row->EMAIL,
                           "MOBILE"=>$row->MOBILE,
                           "ApplicationStatus"=>$row->credit_sanction_status,
                           "Rejected_by"=>$row->DSA_NAME,
                           "Remarks"=>$row->REMARK,
                           "date"=>$row->Date,
                      
                           
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

 public function hold_customers()
    {
        
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR' || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           // $this->load->view('admin/admin_dashbord',$data);  
            if( $this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'Operations_user' ||  $this->session->userdata('USER_TYPE') == 'Cluster_credit_manager')
            {
                    $id = $this->session->userdata('ID');
                    $dashboard_data = $this->credit_manager_user_model->getDashboardData();  
                    $data['row']=$this->Customercrud_model->getProfileData($id);
                    $data['dashboard_data'] = $dashboard_data;
                    $this->load->view('dashboard_header', $data);
            }
            else
            {
                  $this->load->view('admin/admin_dashbord',$data);             
            }           
            $this->load->view('admin/HOLD_PG',$data);  
            
        }        
    }

     public function customer_with_paginations_Hold_customers()
            {
               
        
                # Read value
                $draw = $_POST['draw'];
                $row = $_POST['start'];
                $rowperpage = $_POST['length']; // Rows display per page
                $columnIndex = $_POST['order'][0]['column']; // Column index
                $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                $searchValue = $_POST['search']['value']; // Search value
        
                 $CM_ID=$this->session->userdata('ID');
                 $userType = $this->input->get('userType');
                 if ($userType == '')$userType = $this->session->userdata("USER_TYPE");
               
        
                ## Search
                $searchQuery = " ";
                ## Total number of records without filtering
                $sel=$this->Admin_model->Get_Total_No_of_HoldCustomers();
                $totalRecords =$sel;
                ## Total number of records with filtering
                $sel=$this->Admin_model->Get_Hold_Customer_Filter($searchValue);
                $totalRecordwithFilter =$sel;
                ## Fetch records
                $sel=$this->Admin_model->Get_Hold_Customer_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
                $empRecords = $sel;
                //return $empRecords
                //print_r($empRecords);
                
                    $data = array();
        
                    foreach($empRecords as $row){
                             
                             if( $row->DSA_ID == $CM_ID) 
                             {
                
                                    if($userType == 'Operations_user')
                                    {
                                                $encoded = base64_encode($CM_ID);
                                            $action='<a  href="'. base_url().'index.php/Operations_user/CAM_Applicant_Details?ID='. $row->UNIQUE_CODE.'&c='.$encoded.'"Class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                                    }
                                    else  if($userType == 'credit_manager_user')
                                    {
                                          $action ='<a href="'.base_url().'index.php/credit_manager_user/credit_sanction_loan_first_level?ID='.$row->UNIQUE_CODE.'&CM='.$CM_ID.'"  class="btn modal_test" target="_blank"><i class="fa fa-edit text-right" style="color:blue;"></i></a></br>
                                        <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                                    }
                                    else
                                    {
                                        $action = '<a  class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a></br>
                                        <a  class="btn modal_test"><i class="fa fa-eye text-right" style="color:gray;"></i></a>';
                                    }
                                   
            
                  
                            }
                            else 
                            {
            
                                $action = '<a  class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a></br>
                                <a  class="btn modal_test"><i class="fa fa-eye text-right" style="color:gray;"></i></a>';
            
            
            
                            }
                     
                       $data[] = array(
                           "FN"=>$row->FN." ".$row->LN,
                           "Email"=>$row->EMAIL,
                           "MOBILE"=>$row->MOBILE,
                           "ApplicationStatus"=>$row->credit_sanction_status,
                           "Rejected_by"=>$row->DSA_NAME,
                           "Remarks"=>$row->REMARK,
                           "date"=>$row->Date,
                           "Action"=>$action
                      
                           
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
                /*-------------------admin Technical pagination---added by sonal on 5-5-2022----------------------> */
    public function customer_with_paginations_Technical()
    {
       

        # Read value
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; // Rows display per page
        $columnIndex = $_POST['order'][0]['column']; // Column index
        $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        $searchValue = $_POST['search']['value']; // Search value



        ## Search
        $searchQuery = " ";
        ## Total number of records without filtering
        $sel=$this->Admin_model->Get_Total_No_Customer_Technical();
        $totalRecords =$sel;
        ## Total number of records with filtering
        $sel=$this->Admin_model->Get_Customer_Filter_Technical($searchValue);
        $totalRecordwithFilter =$sel;
        ## Fetch records
       $sel=$this->Admin_model->Get_Customer_With_Page_Technical($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
        $empRecords = $sel;
        //return $empRecords
        //print_r($empRecords);
        
        $data = array();

        foreach($empRecords as $row){
          $link5='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                       
          $link6='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
         

          if($row->Profile_Status=="Complete") 
          {
           $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
            }
            else
             { 
               $incomplete='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
              
             } 
           $data[] = array(
               "FN"=>$row->FN." ".$row->LN,
               "Email"=>$row->EMAIL,
               "MOBILE"=>$row->MOBILE,
              
               "Profile_Status"=>$incomplete,
               "date"=>$row->CREATED_AT,
               "Actions"=>$link5,//." ".$link6,
               
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
  /*--------------------------------- Addded by papiha on 06_05_2022-------------------------------------*/
  public function new_corporate_admin_bank_action(){
    if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
        redirect(base_url('index.php/admin'));
    }else{
        $array_input = array(
            'BANK_NAME' => $this->input->post('bank_name'),  
			'Login_fees_in_rs'=>$this->input->post('Login_fees_in_rs')
        );
        
        $idS = $this->Admin_model->save_corporate_Bank($array_input);
        if($idS > 0){   
            $response = array('status' => $idS, 'message' => "Bank saved successfully");
            echo json_encode($response);
        }else {
            $response = array('status' => $idS, 'message' => "Error in bank save");
            echo json_encode($response);
        }
    }
}
public Function Update_Login_Fees()
	{
		$Login_fees=$this->input->post('Login_Fees');
		$bank_id=$this->input->post('bank_id');
		$array_input = array(
                'Login_fees_in_rs' =>$Login_fees );
        $idS = $this->Admin_model->Update_Coorporate_bank($array_input,$bank_id);
		$response = array(
							"id" => $idS
						);
						 echo json_encode($response);

		
	}
/*-------------------------------------------- Added by papiha on 11_05_2022-----------------------------------------------------------------*/
 /*---------------------- added by papiha on 11_05_2022------------- For cLuster customers-----------------------------*/
 public function Cluster_customers()
 {
    $filter_by=$this->input->post('filter');//added by sonal on 12-05-2022
    if( $filter_by=="")
    {
        $filter_by="all";
    }
     $id = $this->session->userdata('ID');
     $Branch_manger=$this->Admin_model->get_cluster_BM($id);
     $Relationship=$this->Admin_model->get_RO_BM($Branch_manger,$id);
     $DSA=$this->Admin_model->get_DSA_BM($Branch_manger,$Relationship,$id);
     $sales_id=$this->Admin_model->get_Sales_BM($Branch_manger);
    
     $customers = $this->Admin_model->get_all_customers_cluster($Branch_manger,$Relationship,$DSA,$sales_id,$id,$filter_by);//added by sonal on 12-05-2022
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
     
     $this->load->view('admin/Cluster_customer_PG',$arr);
     
 }
 public function Cluster_customers_PG()
 {
    $filter_by=$this->input->post('filter');//added by sonal on 12-05-2022
     /*-------------------------- For Cluster---------------------------*/
     $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
     $Branch_manger=$this->Admin_model->get_cluster_BM($id);
     
     $Relationship=$this->Admin_model->get_RO_BM($Branch_manger,$id);
     $sales_id=$this->Admin_model->get_Sales_BM($Branch_manger);
	// print_r( $sales_id);
     $DSA=$this->Admin_model->get_DSA_BM($Branch_manger,$Relationship,$id);
	 // print_r( $DSA);
     //$Customers=$this->Admin_model->get_cluster_customer($Branch_manger,$Relationship,$DSA,$id);
     /*------------------------------------------------------------------------*/
     
    
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

     foreach($empRecords as $row){
		 
		 /*-------------------------------- pre came and PD ------------------------------------------------*/
			 if( $row->Sanctioned_date != NULL ||  $row->Sanctioned_date != '')
			{
			     $Sanction_letter='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/Sanction_Letter?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';
			     $MITC='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/MITAC_pdf?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';
			 }
			else
				{
					
					$Sanction_letter='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
					$MITC='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
					
				}
			$Insurance = '<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Insurance/PremiumCalculationForm?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';	
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
                 "Referred_by"=>$row->Refer_By.'[ '.$row->Refer_By_Category.' ]',
                 "Created_on"=>$row->CREATED_AT,
                 "Last_updated_on"=>$row->last_updated_date,
                 "UNIQUE_CODE"=>'<a style="margin-left: 8px;" href="'.base_url().'index.php/dsa/Go_No_GO_?ID='.$row->UNIQUE_CODE.'"class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a><a style="margin-left: 8px; " href="'.base_url().'index.php/customer/profile_view_p_o?ID='.$row->UNIQUE_CODE.'"class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>',
                 "Bureau_reports"=>'<a style="margin-left: 8px; " href="'.base_url().'index.php/dsa/show_coapplicants?ID='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>',
                  "Pre_cam"=>$Pre_cam,
                  "CAM"=>$CAM,
                  "PD"=>$PD,
				  "Insurance"=>$Insurance,
				  "Sanction_letter"=>$Sanction_letter,
				  "MITC"=>$MITC,
                
         
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
 /*-------------------admin rejected pagination added by priya 12-5-2022------------------------->*/ 
          
      public function REVERT_customers()
    {
        
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR' || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            if( $this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'DSA')
            {
                    $id = $this->session->userdata('ID');
                    $dashboard_data = $this->credit_manager_user_model->getDashboardData();  
                    $data['row']=$this->Customercrud_model->getProfileData($id);
                    $data['dashboard_data'] = $dashboard_data;
                    $this->load->view('dashboard_header', $data);
            }
            else
            {
                  $this->load->view('admin/admin_dashbord',$data);             
              
            }
               $this->load->view('admin/REVERT_PG',$data); 
            
        }        
    }

     public function customer_with_paginations_REVERT_customers()
            {
               
        
                # Read value
                $draw = $_POST['draw'];
                $row = $_POST['start'];
                $rowperpage = $_POST['length']; // Rows display per page
                $columnIndex = $_POST['order'][0]['column']; // Column index
                $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                $searchValue = $_POST['search']['value']; // Search value
                $id = $this->session->userdata('ID');
        
        
                ## Search
                $searchQuery = " ";
                ## Total number of records without filtering
                $sel=$this->Admin_model->Get_Total_No_of_REVERTCustomers($id);
                $totalRecords =$sel;
                ## Total number of records with filtering
                $sel=$this->Admin_model->Get_REVERT_Customer_Filter($searchValue,$id);
                $totalRecordwithFilter =$sel;
                ## Fetch records
                $sel=$this->Admin_model->Get_REVERT_Customer_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$id);
                $empRecords = $sel;
                //return $empRecords
                //print_r($empRecords);
               

                
                    $data = array();
        
                    foreach($empRecords as $row){
                       
                       $find_pages_for_revrt_encode = json_encode($this->Admin_model->get_pages_for_revert($row->UNIQUE_CODE));
                       $find_pages_for_revrt_decode = json_decode($find_pages_for_revrt_encode);
                          $personal = '';
                          $income='';
                          $Documents='';
                          $loan_form='';
                          $loanDocs='';
                       /*
                       foreach($find_pages_for_revrt_decode as $f)
                       {
                           
                         
                          if($f->Revert_ON_page == 'ApplicantPersonalDetails')
                          {
                             $personal='yes';
                            
                          }
                          else
                          {
                             $personal='no';
                            
                          }

                          if($f->Revert_ON_page == 'ApplicantIncomeDetails')
                          {
                             $income='yes';
                            
                          }
                          else
                          {
                             $income='no';
                             
                          }

                          if($f->Revert_ON_page == 'ApplicantDocumentDetails')
                          {
                             $Documents='yes';
                            
                          }
                          else
                          {
                             $Documents='no';
                             
                          }

                          if($f->Revert_ON_page == 'LoanApplicationForm')
                          {
                             $loan_form='yes';
                              
                          }
                          else
                          {
                             $loan_form='no';
                             
                          }

                          if($f->Revert_ON_page == 'LoanApplicantDocuments')
                          {
                             $loanDocs='yes';
                              
                          }
                          else
                          {
                             $loanDocs='no';
                            
                          }

                          
                       } 
                       */
                       

                    /*$data_for_pages= '  <table>
                                            <tbody>
                                                <tr>
                                                    <td><lable>Personal Details</lable></td>
                                                    <td>'.$personal.'</td>
                                                </tr>
                                                <tr>
                                                    <td><lable>Income Details</lable></td>
                                                    <td>'.$income.'</td>
                                                </tr>
                                                <tr>
                                                    <td><lable>Documents Details</lable></td>
                                                    <td>'.$Documents.'</td>
                                                </tr>
                                                <tr>
                                                    <td><lable>Loan Form Details </lable></td>
                                                    <td>'.$loan_form.'</td>
                                                </tr>
                                                <tr>
                                                    <td><lable>Loan Docs Details  </lable></td>
                                                    <td>'.$loanDocs.'</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        ';
<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>
                                        */
                            $data_for_pages='<a style="margin-left: 8px; "href="'.base_url().'index.php/admin/View_Revert_details?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><button type="button" class="btn btn-outline-success">View Pages</button></a>';
                       $data[] = array(
                           "FN"=>$row->FN." ".$row->LN,
                           "Email"=>$row->EMAIL,
                           "MOBILE"=>$row->MOBILE,
                           "ApplicationStatus"=>$row->STATUS,
                           "Rejected_by"=>$row->DSA_NAME,
                           "Remarks"=>$row->REMARK,
                           "Pages"=>$data_for_pages,
                           "date"=>$row->Date,
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
  public function View_Revert_details()
  {
     if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR'  || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $UNIQUE_CODE = $this->input->get('id');
               $s = $this->input->get('s');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;

           /* if( $this->session->userdata('USER_TYPE') == 'credit_manager_user')
            {
                    $id = $this->session->userdata('ID');
                    $dashboard_data = $this->credit_manager_user_model->getDashboardData();  
                    $data['row']=$this->Customercrud_model->getProfileData($id);
                    $data['dashboard_data'] = $dashboard_data;
                    $this->load->view('dashboard_header', $data);
            }
            else
            {
                  $this->load->view('admin/admin_dashbord',$data);             
              
            } */
               $find_pages_for_revrt_encode = json_encode($this->Admin_model->get_pages_for_revert($UNIQUE_CODE));
               $data['find_pages_for_revrt_encode']=$find_pages_for_revrt_encode;
            if( $this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'DSA')
            {
                    $id = $this->session->userdata('ID');
                    $dashboard_data = $this->credit_manager_user_model->getDashboardData();  
                    $data['row']=$this->Customercrud_model->getProfileData($id);
                    $data['dashboard_data'] = $dashboard_data;
                    $this->load->view('dashboard_header', $data);
            }
            else
            {
                  $this->load->view('admin/admin_dashbord',$data);             
              
            }
            //   $this->load->view('admin/admin_dashbord',$data);    
               $this->load->view('admin/View_Revert_details',$data); 
            
        }     
  }

  public function Revert_Personal_Details()
  {
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR' || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $customer_id = $this->input->get('ID');
          
            $s = $this->input->get('s');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $find_pages_for_revrt_encode = json_encode($this->Admin_model->get_pages_for_revert($customer_id));
            $data['find_pages_for_revrt_encode']=$find_pages_for_revrt_encode;
            $data_row = $this->Customercrud_model->getProfileData($customer_id);
            $data_row_more = $this->Customercrud_model->getProfileDataMore($customer_id);
            $data['row_one'] = $data_row;
            $data['row_more'] = $data_row_more;
                if( $this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'DSA')
            {
                    $id = $this->session->userdata('ID');
                    $dashboard_data = $this->credit_manager_user_model->getDashboardData();  
                    $data['row']=$this->Customercrud_model->getProfileData($id);
                    $data['dashboard_data'] = $dashboard_data;
                    $this->load->view('dashboard_header', $data);
            }
            else
            {
                  $this->load->view('admin/admin_dashbord',$data);             
              
            }
         //   $this->load->view('admin/admin_dashbord',$data);    
            $this->load->view('admin/REVERT_PAGES/Update_Applicant_personal_details',$data); 
            
        }     
  }

  public function Revert_Income_Details()
  {
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR' || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $customer_id = $this->input->get('ID');
          
            $s = $this->input->get('s');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
    

                $login_user_id = $this->input->get("UID");
                
                $data['dsa_id']=$login_user_id;
                if(  $data['dsa_id'] == '')
                {
                    $data['dsa_id'] = $this->session->userdata("dsa_id");
                }
            
     
           
           
                $cust_row = $this->Customercrud_model->getProfileData($customer_id);
                $data_row = $this->Customercrud_model->getProfileDataIncome($customer_id);   
                $data_row_more = $this->Customercrud_model->getProfileDataMore($customer_id);
                $perms_type = $this->input->get('type');
                
                
                $this->load->helper('url'); 
                $age = $this->session->userdata('AGE');
                  
                $data['row_one'] = $data_row;
                $data['cust_row']=$cust_row;
                $data['row_more']=$data_row_more;
                $data['profile_percentage'] = $cust_row->PROFILE_PERCENTAGE;
                $data['userType'] = $this->session->userdata("USER_TYPE");
                if(!empty($data_row) && $data_row->BIS_PROFESSION != ''){
                    $data['type'] = 'business';
                }else {
                    $getType = $this->input->get('type');
                    //echo $getType;
                    if(!empty($data_row) && $data_row->ORG_NAME != ''){
                        $data['type'] = 'salaried'; 
                    }else {
                        if(!empty($getType)){
                            if($getType == 'notworking'){
                                $data['type'] = 'notworking';
                                //redirect('customer/customer_documents?ID='.$id.'&error=', 'refresh');
                            }else {
                                $data['type'] = 'salaried';
                                if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
                            }
                        }else {
                            $data['type'] = 'salaried';
                            if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
                        }               
                    }                       
                }
    
                $type = array('USER_TYPE' => $data['type']);
                    if( $this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'DSA')
            {
                    $id = $this->session->userdata('ID');
                    $dashboard_data = $this->credit_manager_user_model->getDashboardData();  
                    $data['row']=$this->Customercrud_model->getProfileData($id);
                    $data['dashboard_data'] = $dashboard_data;
                    $this->load->view('dashboard_header', $data);
            }
            else
            {
                  $this->load->view('admin/admin_dashbord',$data);             
              
            }
            //    $this->load->view('admin/admin_dashbord',$data);    
            $this->load->view('admin/REVERT_PAGES/Update_Income_personal_details',$data); 
           // $this->load->view('customer/customer_update_profile_2_income', $data);
            
        }     
  }
   
 public function Revert_ProfileDocument_Details()
  {
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR' || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $customer_id = $this->input->get('ID');
            $id = $customer_id;
            $data_row = $this->Customercrud_model->getDocuments($id);//get applicant uploaded documents;
            $row=$this->Customercrud_model->getProfileData($id);// get applicant details
            $role=$row->ROLE;// assign role of applicant
            $doc_type_user = $role;//select document where document only for customer
            $data_doctype = "";//$this->Customercrud_model->getDocumentsType($doc_type_user);
            $this->load->helper('url');
            $age = $this->session->userdata('AGE');
            $data['showNav'] = $age;//for dashbord
            $data['data_row']=$row;//for dashbord
            $inc_src = $this->Customercrud_model->get_user_type_Income($id);//applicant type saleried and self employeed
            $Master_type_documen_customer=$this->Customercrud_model->getDocuments_Type_customer_Master();//Distinct Master type from table Like Kyc ,residance,Employment                                           
            $Uploded_Doc_Count=$this->Customercrud_model->getUploded_Documents_Type($id);
            $Total_savedDocType=0;//Total mandatory document save by applicant count 
            $Total_mandatory_doc_count=0;
            $Total_mandatory_doc_count_inc_src=$this->Customercrud_model->inc_src_doc_count($doc_type_user,$inc_src);
            $data_doctype=array();
            if($inc_src=='retired')
            {
                $Master_type_documen_customer=$this->Customercrud_model->getDocuments_Type_customer_Master_retired();
                //print_r($Master_type_documen_customer);
                //exit;
                
            }else{
                
            }
            //echo $Total_mandatory_doc_count_inc_src;
            foreach ($Master_type_documen_customer as $Documents)
            {
                
                //echo $Documents->DOC_MASTER_TYPE,'<br>';
                if($Documents->DOC_MASTER_TYPE=='EMPLOYMENT PROOF')
                {
                //echo "hello".'<br>';
                    
                    $data_doctype = $this->Customercrud_model->getDocumentsType_by_Employment_type($Documents->DOC_MASTER_TYPE,$doc_type_user,$inc_src );
                    /*$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user,$inc_src );*/
                    $mandatory_doc_count=$this->Customercrud_model->get_Mandatory_doc_count_for_employment($doc_type_user,$Documents->DOC_MASTER_TYPE,$inc_src);
                    $savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, $Documents->DOC_MASTER_TYPE);
                    $Total_savedDocType=$Total_savedDocType+$savedDocType->doc_count;
                    $Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
                    //echo $Total_savedDocType.'<br>';
                    
                    
                }
                else if($Documents->DOC_MASTER_TYPE=='INCOME PROOF')
                {
                    if($inc_src=='self employeed')
                        {
                            $ITR_status = $this->Customercrud_model->get_user_itr_yes_no($id);//ITR yes or no
                            if($ITR_status=='no')
                            {
                                continue;
                            }
                            else
                            {
                                $data_doctype = $this->Customercrud_model->getDocumentsType_by_Employment_type($Documents->DOC_MASTER_TYPE,$doc_type_user,$inc_src );
                                /*$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user,$inc_src );*/
                                $mandatory_doc_count=$this->Customercrud_model->get_Mandatory_doc_count_for_employment($doc_type_user,$Documents->DOC_MASTER_TYPE,$inc_src);
                                $savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, $Documents->DOC_MASTER_TYPE);
                                $Total_savedDocType=$Total_savedDocType+$savedDocType->doc_count;
                                $Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
                            }
                            
                        }
                        else
                        {
                                $data_doctype = $this->Customercrud_model->getDocumentsType_by_Employment_type($Documents->DOC_MASTER_TYPE,$doc_type_user,$inc_src );
                                /*$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user,$inc_src );*/
                                $mandatory_doc_count=$this->Customercrud_model->get_Mandatory_doc_count_for_employment($doc_type_user,$Documents->DOC_MASTER_TYPE,$inc_src);
                                $savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, $Documents->DOC_MASTER_TYPE);
                                $Total_savedDocType=$Total_savedDocType+$savedDocType->doc_count;
                                $Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
                        }
                    
                }
                
                
                
                else
                {
                    //echo "hello1".'<br>';
                    
                    
                    //echo $Total_savedDocType.'<br>';
                      if($Documents->DOC_MASTER_TYPE=='Home Loans'||$Documents->DOC_MASTER_TYPE=='LAP'||$Documents->DOC_MASTER_TYPE=='Re-Finance'||$Documents->DOC_MASTER_TYPE=='Balance Transfer'|| $Documents->DOC_MASTER_TYPE=='House Construction On Self Own Plot'|| $Documents->DOC_MASTER_TYPE=='Home Improvement Loans')
                      {
                          $Total_mandatory_doc_count=$Total_mandatory_doc_count+0;
                      }
                      else
                      {
                        $data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user,$Documents->DOC_MASTER_TYPE );
                        $mandatory_doc_count=$this->Customercrud_model->get_Mandatory_doc_count($doc_type_user,$Documents->DOC_MASTER_TYPE );
                        $savedDocType =$this->Customercrud_model->getSavedDocumentsCountWithMaster($id, $Documents->DOC_MASTER_TYPE);
                        $Total_savedDocType=$Total_savedDocType+$savedDocType->doc_count;
                          $Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
                      }
                    //$Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
                    //echo $Documents->DOC_MASTER_TYPE.'<br>';
                    
                    
                    
                }
                

            /*  echo $Documents->DOC_MASTER_TYPE.'<br>';
                    echo $Total_mandatory_doc_count+$Total_mandatory_doc_count_inc_src.'<br>';
                    echo $Total_savedDocType.'<br>';
                    echo $savedDocType->doc_count.'<br>';*/
                if($Total_mandatory_doc_count==$Total_savedDocType)
                {
                    //$data_doctype =$this->Customercrud_model->getDocumentsType_by_Employment_type_other($inc_src);
                    
                    $data_doctype =$this->Customercrud_model->Get_Other_Documents($inc_src);
                    
                    //$data_doctype=array();
                    $data['doc_type'] ='';
                    $data['doc_count'] =count($data_doctype);
                    $data['message'] = "All Document uploaded sucessfully. If you want to upload other document you can upload here.";
                    $data['save'] = true;
                    
                }
                else
                {
                    
                    if($savedDocType->doc_count==$mandatory_doc_count || $Documents->DOC_MASTER_TYPE=='Home Loans'||$Documents->DOC_MASTER_TYPE=='LAP'||$Documents->DOC_MASTER_TYPE=='Re-Finance'||$Documents->DOC_MASTER_TYPE=='Balance Transfer'|| $Documents->DOC_MASTER_TYPE=='House Construction On Self Own Plot'|| $Documents->DOC_MASTER_TYPE=='Home Improvement Loans' ||  $mandatory_doc_count==0 ){
                        //echo "hello2".'<br>';
                         //$Total_savedDocType=$Total_savedDocType+$savedDocType;
                        continue;
                    }
                    else
                    {
                    //echo "hello3".'<br>';
                        //exit;
                    $data['doc_type'] = $Documents->DOC_MASTER_TYPE;
                    $data['doc_count'] = count($data_doctype);
                    $data['message'] = "Upload  document for ".$Documents->DOC_MASTER_TYPE.'. '. $mandatory_doc_count .' Documents are mandatory';
                    //$data['doc_mandatory']=;
                    $data['save'] = false;
                    break;
                    }
                }
                
                
            }
            //echo $Total_mandatory_doc_count;
            $u_type = $this->session->userdata("USER_TYPE");
            $data['row_one']=$row;
            $data['age'] = $age;
            $data['error'] = '';
            $data['userType'] = $u_type;
            $data['documents'] = $data_row;
            $data['documents_type'] = $data_doctype;
            $data['user_type'] = $inc_src;
           
            $data['error'] = $this->input->get('error');
            /*echo '<pre>';
            print_r($data);
            exit;*/
            $this->session->set_flashdata('message',$data['message']);
                if( $this->session->userdata('USER_TYPE') == 'credit_manager_user' || $this->session->userdata('USER_TYPE') == 'DSA')
            {
                    $id = $this->session->userdata('ID');
                    $dashboard_data = $this->credit_manager_user_model->getDashboardData();  
                    $data['row']=$this->Customercrud_model->getProfileData($id);
                    $data['dashboard_data'] = $dashboard_data;
                    $this->load->view('dashboard_header', $data);
            }
            else
            {
                  $this->load->view('admin/admin_dashbord',$data);             
              
            }
         //   $this->load->view('admin/admin_dashbord',$data); //
           // redirect('Customer/customer_documents');
           // $this->Customer->customer_documents();   
            $this->load->view('admin/REVERT_PAGES/Update_ProfileDocuments_details',$data); 
           // $this->load->view('customer/customerdocumentsnew', $data);
            
        }     
  }

  public function Revert_LoanForm_Details()
  {
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR' || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $customer_id = $this->input->get('ID');
          
            $s = $this->input->get('s');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $find_pages_for_revrt_encode = json_encode($this->Admin_model->get_pages_for_revert($customer_id));
            $data['find_pages_for_revrt_encode']=$find_pages_for_revrt_encode;
            $data_row = $this->Customercrud_model->getProfileData($customer_id);
            $data_row_more = $this->Customercrud_model->getProfileDataMore($customer_id);
            $data['row_one'] = $data_row;
            $data['row_more'] = $data_row_more;
            $this->load->view('admin/admin_dashbord',$data);    
            $this->load->view('admin/REVERT_PAGES/Update_LoanForm_details',$data); 
            //$this->load->view('customer/customer_apply_loan_screen_1',$data);
            
        }     
  }
   
public function Revert_LoanDOcument_Details()
  {
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR'  || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $customer_id = $this->input->get('ID');
          
            $s = $this->input->get('s');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $find_pages_for_revrt_encode = json_encode($this->Admin_model->get_pages_for_revert($customer_id));
            $data['find_pages_for_revrt_encode']=$find_pages_for_revrt_encode;
            $data_row = $this->Customercrud_model->getProfileData($customer_id);
            $data_row_more = $this->Customercrud_model->getProfileDataMore($customer_id);
            $data['row_one'] = $data_row;
            $data['row_more'] = $data_row_more;
            $this->load->view('admin/admin_dashbord',$data);    
            $this->load->view('admin/REVERT_PAGES/Update_Applicant_LoanDocument_details',$data); 
            
        }     
  }
   
public function update_revert_personal_form_details()
{
           
           $id = $this->input->Post("ID");
                if ($id == '') {
                    $id = $this->session->userdata("ID");
                }
                $cust_id=$id;
            $dob = $this->input->post('dob');       
            $diff = abs(strtotime(date("Y-m-d")) - strtotime($dob));
            $years = floor($diff / (365*60*60*24));
            $array_input = array(
                'AGE' => $years,
                'EDUCATION_BACKGROUND' =>$this->input->post('education_type'),
                'FN' => $this->input->post('f_name'),
                'MN' => $this->input->post('m_name'),
                'LN' => $this->input->post('l_name'),
                'EMAIL' => $this->input->post('email'),
                'MOBILE' => $this->input->post('mobile'),
                'GENDER' => $this->input->post('gender'),           
                'DOB' =>$this->input->post('dob'),          
                //'PAN_NUMBER' => base64_encode($this->input->post('pan')),
                'PAN_NUMBER' => $this->encryption($this->input->post('pan')),
                'AADHAR_NUMBER' => $this->encryption($this->input->post('aadhar')),
                'MARTIAL_STATUS' => $this->input->post('marital'),
                
                );
                $array_input_more = array(
                'CUST_ID' => $id,
                'MOTHER_F_NAME' => $this->input->post('m_f_name'),
                'MOTHER_M_NAME' => $this->input->post('m_m_name'),
                'MOTHER_L_NAME' => $this->input->post('m_l_name'),
                'IS_SPOUSE_FATHER' => $this->input->post('spouse'),
                'SPOUSE_F_NAME' => $this->input->post('s_f_name'),
                'SPOUSE_M_NAME' => $this->input->post('s_m_name'),
                'SPOUSE_L_NAME' => $this->input->post('s_l_name'),          
                'RES_ADDRS_LINE_1' => $this->input->post('resi_add_1'),         
                'RES_ADDRS_LINE_2' => $this->input->post('resi_add_2'),
                'RES_ADDRS_LINE_3' => $this->input->post('resi_add_3'),
                'RES_ADDRS_LANDMARK' => $this->input->post('resi_landmark'),
                'RES_ADDRS_PINCODE' => $this->input->post('resi_pincode'),
                'RES_ADDRS_CITY' => $this->input->post('resi_city'),
                'NATIVE_PLACE'=>$this->input->post('NATIVE_PLACE'),
                'RES_ADDRS_STATE' => $this->input->post('resi_state'),
                'RES_ADDRS_DISTRICT' => $this->input->post('resi_district'),
                'RES_ADDRS_PROPERTY_TYPE' => $this->input->post('resi_sel_property_type'),
                'RES_ADDRS_NO_YEARS_LIVING' => $this->input->post('resi_no_of_years'),
                'RES_CITY_NO_YEARS_LIVING'=>$this->input->post('resi_no_of_years_city'),
                'PER_ADDRS_LINE_1' => $this->input->post('per_add_1'),
                'PER_ADDRS_LINE_2' => $this->input->post('per_add_2'),
                'PER_ADDRS_LINE_3' => $this->input->post('per_add_3'),
                'PER_ADDRS_LANDMARK' => $this->input->post('per_landmark'),
                'PER_ADDRS_PINCODE' => $this->input->post('per_pincode'),
                'PER_ADDRS_PROPERTY_TYPE' => $this->input->post('per_sel_property_type'),
                'PER_ADDRS_STATE' => $this->input->post('per_state'),
                'PER_ADDRS_DISTRICT' => $this->input->post('per_district'),
                'PER_ADDRS_CITY' => $this->input->post('per_city'),
                'PER_ADDRS_NO_YEARS_LIVING' => $this->input->post('per_no_of_years'),
                'TOTAL_BRO_SIS' => $this->input->post('no_of_bro_sis'),
                'NO_OF_DEPENDANTS'=>$this->input->post('NO_OF_DEPENDANTS')                
                );

              


                if($this->input->post('KYC_doc')=='Driving Licence'||$this->input->post('KYC_doc')=='Passport')
                {
                    $updated_array_input_more=$this->Customercrud_model->update_profile_more($id, $array);
                }
            $id_mobile_exist = $this->Customercrud_model->check_mobile($id, $array_input['MOBILE']);
            if($id_mobile_exist > 0){
                $response = array('status' => 0, 'message' => 'Mobile number already in use');
                echo json_encode($response);
                exit();
            }
            $id_email_exist = $this->Customercrud_model->check_email($id, $array_input['EMAIL']);
            if($id_email_exist > 0){
                $response = array('status' => 0, 'message' => 'Email id already in use');
                echo json_encode($response);
                exit();
            }
            $updated_id = $this->Customercrud_model->update_profile($id, $array_input);
            $check_id = $this->Customercrud_model->check_more_profile($id);
            if($check_id > 0)$id = $this->Customercrud_model->update_profile_more($id, $array_input_more);
            else $id = $this->Customercrud_model->insert_profile_more($id, $array_input_more);

            if($id > 0){
                $age = $this->session->set_userdata("AGE", $array_input['AGE']);
                $response = array('status' => 1, 'message' => 'Profile updated successfully','ID'=> $cust_id);
                echo json_encode($response);
            }else {
                $response = array('status' => 0, 'message' => 'Error in profile update');
                echo json_encode($response);
            }
        }

/*---------------------------------  added by papiha on 13_05_2022-------------------------------------------*/
public function online_payment()
{
    $UID=base64_decode($_GET['x']);
    $Customer_data = $this->Dsacrud_model->getProfileData($UID);
    $bank_id=$this->Admin_model->Get_bank_id($UID);
    $login_fees=$this->Admin_model->Get_Login_fees($bank_id);
    $login_fees_in_rs=(int)$login_fees['Login_fees']*100;
  
    /*------------------razorpay starts--------------------------*/
 /*  $keyId = 'rzp_test_SJDzvrWZgo0DzG';

   $keySecret = 'o4i2rSxn7IunbwHCoUxFtdWD'; */   
  
    $keyId = 'rzp_live_b6GiUgpuvUgnPo';

    $keySecret = 'nbBSruPerfFMXdd7oiKDjtMX';

    $displayCurrency = 'INR';

    $api = new Api($keyId, $keySecret);
  $order=$api->order->create(['receipt' => '123', 'amount' => $login_fees_in_rs, 'currency' => 'INR']);
  
  $data['keyId']=$keyId;
  $data['order']=$order;
  $data['Customer_data']=$Customer_data;
  $this->session->set_userdata('customer_data',$Customer_data);
  $data['callback_url']='index.php/admin/Payment_Status';
  /*-----------------------------------------------------------*/
  $this->load->view('razorpay/razorpay-checkout',$data);   
}
public function Payment_Status()
{
    date_default_timezone_set('asia/kolkata');
    $keySecret = 'nbBSruPerfFMXdd7oiKDjtMX';
    $razorpay_payment_id=$_POST['razorpay_payment_id'];
    $razorpay_order_id=$_POST['razorpay_order_id'];
    $razorpay_signature=$_POST['razorpay_signature'];
    $data=$razorpay_order_id ."|" . $razorpay_payment_id;
    $generated_signature = hash_hmac("sha256",$data,$keySecret);
    $cust_name=$this->input->post('cust_name');
    $customer_data=$this->session->userdata('customer_data');
    if ($generated_signature == $razorpay_signature) 
    {
       $result ='Successful';
    }
    else
    {
         $result ='Fail';
    }
    $data=array(
    'Cust_id'=>$customer_data->UNIQUE_CODE,
    'razorpay_payment_id'=>$razorpay_payment_id,
    'razorpay_order_id'=> $razorpay_order_id,
    'razorpay_signature'=>$razorpay_signature,
    'payment_status'=>$result,
    'payment_date'=>date("d-m-Y h:i:sa"));
    $Customer_data_save = $this->Admin_model->Savepayment_details($data);
    if($Customer_data_save>0)
    {
        $result=1;
        $cust_id=$customer_data->UNIQUE_CODE;
        $this->Payment_result($result,$cust_id);
        
          //$this->session->unset_userdata('customer_data');
    }
    else
    {
        $result=0;
        $cust_id=$customer_data->UNIQUE_CODE;
        $this->Payment_result($result,$cust_id);
        //$this->session->unset_userdata('customer_data');
    }
    
}
public function Payment_result($result,$cust_id)
{
          $get_payment_deteils=$this->Admin_model->get_payment_deteils($cust_id);
          $age = $this->session->userdata("AGE");
          $id = $this->input->get("UID");
         
          $data_row = $this->Customercrud_model->getAppliedLoans($id);
          $data['showNav'] = 1;
          $data['age'] = $age;
          $data['error'] = '';
          $data['loans'] = $data_row;
          $data['userType'] = $this->session->userdata("USER_TYPE");
          $data['id']=$id;
          $data['payment_details']=$get_payment_deteils;
          $this->load->view('header', $data);
              
          $this->load->view('customer/Payment_status',);
    
    
}

public function offline_payment()
{
    $cust_id= $_POST['cust_id'];
    
   
    if(isset($_POST['cash_save']))
    {
         $data=array(
            
            'Recived_date'=>$_POST['Recived_date'],
            'Amount'=>$_POST['Amount'],
            'cheque_handover_to'=>$_POST['RO_ID'],
            'save_date'=>date("d-m-Y h:i:sa")
            );
    }
   
    else{
        $data=array(
                'Cust_id'=>$_POST['cust_id'],
                'Acc_holder_name'=>$_POST['Acc_holder_name'],
                'Bank_name'=>$_POST['Bank_name'],
                'Branch_name'=>$_POST['Branch_name'],
                'Check_no'=>$_POST['Check_no'],
                'IFSC_code'=>$_POST['IFSC_code'],
                'Recived_date'=>$_POST['Recived_date'],
                'Amount'=>$_POST['Amount'],
                'cheque_handover_to'=>$_POST['RO_ID'],
                'save_date'=>date("d-m-Y h:i:sa"),
                'Payment_Recived_date'=>$_POST['Recived_date_acc'],
                'payment_mode'=>$_POST['payment_mode'],
                'Acc_type'=>$_POST['Acc_type'],
               
                );
    }
    $get_payment_deteils_offline=$this->Admin_model->get_payment_deteils_offline($_POST['cust_id']);
    if(!empty($get_payment_deteils_offline))
    {
           $update=$this->Admin_model->Update_payment_recived_date($data,$_POST['cust_id']);
           if($update>0)
        {
            /*$result=2;
            
            $this->Payment_result_offline($result,$cust_id);
            
            $this->session->unset_userdata('customer_data');*/
            
            $response = array(
            "result" => 2
            );
            echo  json_encode($response);
        }
        else
        {
        /* $result=3;
        
            $this->Payment_result_offline($result,$cust_id);
            $this->session->unset_userdata('customer_data');*/
            $response = array(
            "result" => 3
            );
            return json_encode($response);
        }
    }
    else
    {
     $Customer_data_save = $this->Admin_model->Savepayment_details_offline($data);
        if($Customer_data_save>0)
        {
            /*$result=2;
            
            $this->Payment_result_offline($result,$cust_id);
            
            $this->session->unset_userdata('customer_data');*/
            
            $response = array(
            "result" => 2
            );
            echo  json_encode($response);
        }
        else
        {
        /* $result=3;
        
            $this->Payment_result_offline($result,$cust_id);
            $this->session->unset_userdata('customer_data');*/
            $response = array(
            "result" => 3
            );
            return json_encode($response);
        }
    }
    
}
public function offline_payment_cash()
{
    $cust_id= $_POST['cust_id'];
    
    
  
         $data=array(
            'Cust_id'=> $cust_id,
            'Recived_date'=>$_POST['Recived_date'],
            'Amount'=>$_POST['Amount'],
            'cheque_handover_to'=>$_POST['RO_ID'],
            'save_date'=>date("d-m-Y h:i:sa"),
            'payment_mode'=>$_POST['payment_mode']
            );
            $get_payment_deteils_offline=$this->Admin_model->get_payment_deteils_offline($_POST['cust_id']);
            if(!empty($get_payment_deteils_offline))
            {
                   $update=$this->Admin_model->Update_payment_recived_date($data,$_POST['cust_id']);
                   if($update>0)
                {
                    /*$result=2;
                    
                    $this->Payment_result_offline($result,$cust_id);
                    
                    $this->session->unset_userdata('customer_data');*/
                    
                    $response = array(
                    "result" => 2
                    );
                    echo  json_encode($response);
                }
                else
                {
                /* $result=3;
                
                    $this->Payment_result_offline($result,$cust_id);
                    $this->session->unset_userdata('customer_data');*/
                    $response = array(
                    "result" => 3
                    );
                    return json_encode($response);
                }
            }
            else
            {
                    $Customer_data_save = $this->Admin_model->Savepayment_details_offline($data);
                    if($Customer_data_save>0)
                    {
                        /*$result=2;
                        
                        $this->Payment_result_offline($result,$cust_id);
                        
                        $this->session->unset_userdata('customer_data');*/
                        
                        $response = array(
                        "result" => 4
                        );
                        echo  json_encode($response);
                    }
                    else
                    {
                    /* $result=3;
                    
                        $this->Payment_result_offline($result,$cust_id);
                        $this->session->unset_userdata('customer_data');*/
                        $response = array(
                        "result" => 3
                        );
                        return json_encode($response);
                    }
                }
    
}
public function offline_payment_upi()
{
    $cust_id= $_POST['cust_id'];
    
    
       $data=array(
            'Cust_id'=>$_POST['cust_id'],
            'Amount'=>$_POST['Amount'],
            'save_date'=>date("d-m-Y h:i:sa"),
            'Recived_date'=>$_POST['Recived_date'],
            'transaction_id'=>$_POST['transaction_id'],
            //'Account'=>$_POST['Account'],
           // 'Payment_Recived_date'=>$_POST['Recived_date_acc'],
            'payment_mode'=>$_POST['payment_mode'],
            'Acc_holder_name'=>$_POST['Acc_holder_name']
            );
			$array_input3 = array(
									'Sub_Stage'=>"Login Fee Added",
				                );
			$updated_id = $this->Customercrud_model->update_profile($_POST['cust_id'], $array_input3);
            $get_payment_deteils_offline=$this->Admin_model->get_payment_deteils_offline($_POST['cust_id']);
            if(!empty($get_payment_deteils_offline))
            {
                   $update=$this->Admin_model->Update_payment_recived_date($data,$_POST['cust_id']);
                   if($update>0)
                {
                    /*$result=2;
                    
                    $this->Payment_result_offline($result,$cust_id);
                    
                    $this->session->unset_userdata('customer_data');*/
                    
                    $response = array(
                    "result" => 2
                    );
                    echo  json_encode($response);
                }
                else
                {
                /* $result=3;
                
                    $this->Payment_result_offline($result,$cust_id);
                    $this->session->unset_userdata('customer_data');*/
                    $response = array(
                    "result" => 3
                    );
                    return json_encode($response);
                }
            }
            else
            {
    
                    $Customer_data_save = $this->Admin_model->Savepayment_details_offline($data);
                    if($Customer_data_save>0)
                    {
                        /*$result=2;
                        
                        $this->Payment_result_offline($result,$cust_id);
                        
                        $this->session->unset_userdata('customer_data');*/
                        
                        $response = array(
                        "result" => 4
                        );
                        echo  json_encode($response);
                    }
                    else
                    {
                    /* $result=3;
                    
                        $this->Payment_result_offline($result,$cust_id);
                        $this->session->unset_userdata('customer_data');*/
                        $response = array(
                        "result" => 3
                        );
                        return json_encode($response);
                    }
                }
    
}
public function Payment_result_offline()
{
          $result=$this->input->get('x');
          $cust_id=$this->input->get('y');
          
          $get_payment_deteils=$this->Admin_model->get_payment_deteils_offline($cust_id);
          
          $age = $this->session->userdata("AGE");
          $id = $this->input->get("UID");
         
          $data_row = $this->Customercrud_model->getAppliedLoans($id);
          $data['showNav'] = 1;
          $data['age'] = $age;
          $data['error'] = '';
          $data['loans'] = $data_row;
          $data['userType'] = $this->session->userdata("USER_TYPE");
          $data['id']=$id;
          $data['result']=$result;
          $data['payment_details_offline']=$get_payment_deteils;
          $this->load->view('header', $data);
              
          $this->load->view('customer/Payment_status',);
    
    
}
public function offline_payment_view()
{
          $age = $this->session->userdata("AGE");
          $id = base64_decode($this->input->get("x"));
 
          $dsa_id=$this->session->userdata('ID');
		  $data['row']=$this->Customercrud_model->getProfileData($dsa_id);
          $Customer_data = $this->Dsacrud_model->getProfileData($id);
         // $bank_id=$this->Admin_model->Get_bank_id($id);
		 $bank_id=1;
          $login_fees=$this->Admin_model->Get_Login_fees($bank_id);
          $get_payment_deteils_offline=$this->Admin_model->get_payment_deteils_offline($id);
         
          $get_payment_deteils=$this->Admin_model->get_payment_deteils($id);
          $Relationshi_officer=$this->Admin_model->get_all_RO();
          $BM=$this->Admin_model->get_all_BM();
          $RO=array_merge($Relationshi_officer,$BM);
          $documents = $this->Admin_model->getDocuments_cheque($id);
          $result=$this->input->get('z');
          $payment_mode=$this->input->get('w');
          
         
          $data_row = $this->Customercrud_model->getAppliedLoans($id);
                  $data['showNav'] = 1;
                  $data['age'] = $age;
                  $data['error'] = '';
                  $data['loans'] = $data_row;
                  $data['userType'] = $this->session->userdata("USER_TYPE");
                  $data['id']=$id;
                  $data['login_fees']=$login_fees['Login_fees'];
                  $data['RO']=$RO;
                  $data['Customer_data']=$Customer_data;
                  $data['documents']=$documents;
                  $data['result']=$result;
                  $data['get_payment_deteils_offline']=$get_payment_deteils_offline;
                  $data['payment_mode']=$payment_mode;
                 
                //  $this->load->view('header', $data);
				 $this->load->view('dashboard_header', $data);
                  $this->load->view('admin/offline_payment');
    
}
public function upload_cheque()
{
    $cust_id = $this->input->post('cust_id');
    $count = count($_FILES['userfile']['name']);
    $upload_mode=$this->input->post('upload_mode');
           
               for($i=0;$i<$count;$i++)
               {
                   //$file_name = $_FILES["userfile"]['name'][$i];
                  //$file_name = time().".".pathinfo($file_name, PATHINFO_EXTENSION);
                  //$file_name = str_replace(' ', '', $file_name);
                  //$file_type = $_FILES["userfile"]['type'][$i];
                  //$file_size = $_FILES["userfile"]['size'][$i];
                    $_FILES['file']['name'] = $_FILES['userfile']['name'][$i];
                    $_FILES['file']['name'] = time().".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    $_FILES['file']['name'] = str_replace(' ', '', $_FILES['file']['name']);
                    $_FILES['file']['type'] = $_FILES['userfile']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['userfile']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['userfile']['size'][$i];
                      $config = array(
                          'upload_path' => "./images/documents/",
                          'allowed_types' => "gif|jpg|png|jpeg|pdf",
                          'overwrite' => TRUE
                      );

                  $config['file_name'] = $_FILES['file']['name'];
                  $config['image_type'] = $_FILES['file']['type'];
                  $config['file_size'] = $_FILES['file']['size'];
                  

                  $this->upload->initialize($config);
                  $upload_data = $this->upload->data();
                  
                  $file_input_arr = array(
                      'USER_ID' => $cust_id,
                      'DOC_TYPE' => 'Cheque',	
                      'DOC_NAME' => $upload_data['file_name'],
                      'DOC_SIZE' => $upload_data['file_size'],
                      'DOC_FILE_TYPE' => $upload_data['image_type'],
                      'DOC_MASTER_TYPE' => 'Cheque',
                  );
              if($this->upload->do_upload('file'))
              {
                  $this->Customercrud_model->saveDocuments($file_input_arr);
                  $data_row = $this->Customercrud_model->getDocuments($cust_id);
                 redirect('admin/offline_payment_view?x='.base64_encode($cust_id).'&w='.$upload_mode);
                  
              }
              else
              {
                print_r($this->upload->display_errors());
                   redirect('admin/offline_payment_view?x='. base64_encode($cust_id).'&error='.$error, 'refresh');
              }
              
      }
                              
}
public function upload_upi()
{
    $cust_id = $this->input->post('cust_id');
    $count = count($_FILES['userfile']['name']);
           
               for($i=0;$i<$count;$i++)
               {
                   //$file_name = $_FILES["userfile"]['name'][$i];
                  //$file_name = time().".".pathinfo($file_name, PATHINFO_EXTENSION);
                  //$file_name = str_replace(' ', '', $file_name);
                  //$file_type = $_FILES["userfile"]['type'][$i];
                  //$file_size = $_FILES["userfile"]['size'][$i];
                    $_FILES['file']['name'] = $_FILES['userfile']['name'][$i];
                    $_FILES['file']['name'] = time().".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    $_FILES['file']['name'] = str_replace(' ', '', $_FILES['file']['name']);
                    $_FILES['file']['type'] = $_FILES['userfile']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['userfile']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['userfile']['size'][$i];
                      $config = array(
                          'upload_path' => "./images/documents/",
                          'allowed_types' => "gif|jpg|png|jpeg|pdf",
                          'overwrite' => TRUE
                      );

                  $config['file_name'] = $_FILES['file']['name'];
                  $config['image_type'] = $_FILES['file']['type'];
                  $config['file_size'] = $_FILES['file']['size'];
                  

                  $this->upload->initialize($config);
                  $upload_data = $this->upload->data();
                  
                  $file_input_arr = array(
                      'USER_ID' => $cust_id,
                      'DOC_TYPE' => 'Cheque',	
                      'DOC_NAME' => $upload_data['file_name'],
                      'DOC_SIZE' => $upload_data['file_size'],
                      'DOC_FILE_TYPE' => $upload_data['image_type'],
                      'DOC_MASTER_TYPE' => 'Cheque',
                  );
              if($this->upload->do_upload('file'))
              {
                  $this->Customercrud_model->saveDocuments($file_input_arr);
                  $data_row = $this->Customercrud_model->getDocuments($cust_id);
                 // redirect('admin/offline_payment_view?x='.base64_encode($cust_id));
                  
              }
              else
              {
                print_r($this->upload->display_errors());
                   //redirect('admin/offline_payment_view?x='. base64_encode($cust_id).'&error='.$error, 'refresh');
              }
              
      }
                              
}
public function delete_doc_cheque(){
          
          $id = $this->input->get("UID");
          $documents = $this->Admin_model->getDocuments_cheque($id);
              $dir="./images/documents/".$documents->DOC_NAME;    
                                  
              unlink($dir);
              
              
          $array_input = array(
              'ID' => $this->input->post('id')		
          );		
          $cust_id=$id;
          $u_type = $this->session->userdata("USER_TYPE");
          $result = $this->Customercrud_model->delete_doc($array_input);
          if($result > 0){	
                              
                          redirect('admin/offline_payment_view?x='.base64_encode($cust_id));	
                              
                                  
                                      
                                   
                          }		
                      
              
          else 
          {
              redirect('admin/offline_payment_view?x='.base64_encode($cust_id));
          }
      }
  public function check_payment_doc_present()
  {
      $cust_id=$this->input->post("cust_id");
      
      
      $documents_cheque = $this->Admin_model->getDocuments_cheque($cust_id);
      $documents = json_decode(json_encode($documents_cheque), true);
      if(!empty($documents))
      {
          $response = array(
          "doc" => count($documents)
          );
      }
      else
      {
              $response = array(
             "doc" => 0
              );
      }
     echo json_encode($response);
     
  }
  /*-------------------------------------------- Added by sonal on 13_05_2022-----------------------------------------------------------------*/
 /*---------------------- added by sonal on 13_05_2022------------- For cLuster connector-----------------------------*/
 public function Cluster_connector()
 {
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
     $id = $this->session->userdata('ID');
     $Branch_manger=$this->Admin_model->get_cluster_BM_connector($id);
     $Relationship=$this->Admin_model->get_RO_BM_connector($Branch_manger);
     $DSA=$this->Admin_model->get_DSA_BM_connector($Branch_manger,$Relationship,$id);
     $connector = $this->Admin_model->get_all_connector_cluster($Branch_manger,$Relationship,$DSA,$id,$filter_by);
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
     
     $this->load->view('admin/Cluster_connector_PG', $arr);
     
 }
 public function Cluster_connector_PG()

 {

    $filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
    
     $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
     $Branch_manger=$this->Admin_model->get_cluster_BM_connector($id);
     $Relationship=$this->Admin_model->get_RO_BM_connector($Branch_manger);
     $DSA=$this->Admin_model->get_DSA_BM_connector($Branch_manger,$Relationship,$id);
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
     $sel = $this->Admin_model->get_all_connector_cluster($Branch_manger,$Relationship,$DSA,$id,$searchValue,$filter_by);
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel=$this->Admin_model->get_all_connector_cluster_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
     $totalRecordwithFilter =$sel;
     
     ## Fetch records
     $sel=$this->Admin_model->get_all_connector_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
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
            "Created_on"=>$row->CREATED_AT,  
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
    


    /*-------------------------------------------- Added by sonal on 13_05_2022-----------------------------------------------------------------*/
 /*---------------------- added by sonal on 13_05_2022------------- For cLuster Dsa-----------------------------*/
 public function Cluster_Dsa()
 {
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
     $id = $this->session->userdata('ID');
     $Branch_manger=$this->Admin_model->get_cluster_BM_Dsa($id);
     $Relationship=$this->Admin_model->get_RO_BM_Dsa($Branch_manger);
     $DSA=$this->Admin_model->get_DSA_BM_Dsa($Branch_manger,$Relationship,$id);
     $dsa = $this->Admin_model->get_all_Dsa_cluster($Branch_manger,$Relationship,$DSA,$id,$filter_by);
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
     
     $arr['dsa'] = $dsa;
    
     $this->load->view('dashboard_header', $data);
     
     $this->load->view('admin/cluster_Dsa_PG', $arr);
     
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
     $DSA=$this->Admin_model->get_DSA_BM_Dsa($Branch_manger,$Relationship,$id);
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
     $sel = $this->Admin_model->get_all_Dsa_cluster($Branch_manger,$Relationship,$DSA,$id,$searchValue,$filter_by);
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel=$this->Admin_model->get_all_Dsa_cluster_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
     $totalRecordwithFilter =$sel;
     
     ## Fetch records
     $sel=$this->Admin_model->get_all_Dsa_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
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
        
        $data[] = array(
             
            "FN"=>$row->FN.' '.$row->LN,
            "Email"=>$row->EMAIL,
            "mobile"=>$row->MOBILE,
            "Location"=>$row->Location,
            "Profile_Status"=>$incomplete1,  
            "Refered_by"=>$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]', 
            "Created_on"=>$row->CREATED_AT,  
          
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


     /*-------------------------------------------- Added by sonal on 13_05_2022-----------------------------------------------------------------*/
 /*---------------------- added by sonal on 13_05_2022------------- For cLuster RO-----------------------------*/
 public function Cluster_RO()
 {
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
     $id = $this->session->userdata('ID');
     $Branch_manger=$this->Admin_model->get_cluster_BM_Dsa($id);
     $Relationship=$this->Admin_model->get_RO_BM_Dsa($Branch_manger);
     $DSA=$this->Admin_model->get_DSA_BM_Dsa($Branch_manger,$Relationship,$id);
     $dsa = $this->Admin_model->get_all_Dsa_cluster($Branch_manger,$Relationship,$DSA,$id,$filter_by);
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
     
     $arr['dsa'] = $dsa;
    
     $this->load->view('dashboard_header', $data);
     
     $this->load->view('admin/Cluster_RO_PG', $arr);
     
 }
 public function Cluster_RO_PG()

 {

    $filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
    
     $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');

     $Branch_manger=$this->Admin_model->get_cluster_BM_RO($id);
     $Relationship=$this->Admin_model->get_RO_BM_RO($Branch_manger);
     $DSA=$this->Admin_model->get_DSA_BM_RO($Branch_manger,$Relationship,$id);
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
     $sel = $this->Admin_model->get_all_RO_cluster($Branch_manger,$Relationship,$DSA,$id,$searchValue,$filter_by);
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel=$this->Admin_model->get_all_RO_cluster_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
     $totalRecordwithFilter =$sel;
     
     ## Fetch records
     $sel=$this->Admin_model->get_all_RO_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
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
           
            "Created_on"=>$row->CREATED_AT,  
            "Action"=>$link,//." ".$link1,
          
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

      /*-------------------------------------------- Added by sonal on 13_05_2022-----------------------------------------------------------------*/
 /*---------------------- added by sonal on 13_05_2022------------- For cLuster BM-----------------------------*/
 public function Cluster_BM()
 {
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
     $id = $this->session->userdata('ID');
     $Branch_manger=$this->Admin_model->get_cluster_BM_Branch_Manager($id);
     $Relationship=$this->Admin_model->get_RO_BM_BM($Branch_manger);
     $DSA=$this->Admin_model->get_DSA_BM_BM($Branch_manger,$Relationship,$id);
     $BranchManager = $this->Admin_model->get_all_BM_cluster($Branch_manger,$Relationship,$DSA,$id,$filter_by);
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
     
     $arr['BranchManager'] = $BranchManager;
    
     $this->load->view('dashboard_header', $data);
     
     $this->load->view('admin/Cluster_BM_PG', $arr);
     
 }
 public function Cluster_BM_PG()

 {

    $filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
    
     $userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
     $Branch_manger=$this->Admin_model->get_cluster_BM_Branch_Manager($id);
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
           
            "Created_on"=>$row->CREATED_AT,  
            "Action"=>$link,//." ".$link1,
          
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
    /*------------------------- Added by papiha on 14_05_2022--------------------------------------*/
	public function Login_fees_details()
	{
		$age = $this->session->userdata('AGE');
        $data['showNav'] = 1;
        $data['age'] = $age;
        $data['userType'] = $this->session->userdata("USER_TYPE"); 
		$id=$this->input->get('ID');
		$Customer_data = $this->Dsacrud_model->getProfileData($id);
		$bank_id=$this->Admin_model->Get_bank_id($id);
		
		$login_fees=$this->Admin_model->Get_Login_fees($bank_id);
		$corporate_bank_details=$this->Admin_model->get_corporate_Banks_by_id($bank_id);
		
		$get_payment_deteils=$this->Admin_model->get_payment_deteils($id);
		
		$get_payment_deteils_offline=$this->Admin_model->get_payment_deteils_offline($id);
		$data['Customer_data']=$Customer_data;
		$data['get_payment_deteils']=$get_payment_deteils;
		$data['get_payment_deteils_offline']=$get_payment_deteils_offline;
		$data['login_fees']=$login_fees;
		$data['corporate_bank_details']=$corporate_bank_details;
		$this->load->view('admin/admin_dashbord',$data);    
        $this->load->view('admin/Login_fees_details',$data); 
		
		
	}
/*-------------------------------------------- Added by sonal on 14_05_2022-----------------------------------------------------------------*/
 /*---------------------- added by papiha on 11_05_2022------------- For Branch customers-----------------------------*/
    
 public function BranchManager_customers()
 {
    $filter_by=$this->input->post('filter');//added by sonal on 12-05-2022
    if($filter_by=="")
    {
        $filter_by="all";
    }
     $id = $this->session->userdata('ID');
     //$Branch_manger=$this->Admin_model->get_Branch_BM($id);
     $Relationship=$this->Admin_model->get_Branch_RO_BM($id);
     $DSA=$this->Admin_model->get_Branch_BM_BM($Relationship,$id);
    // $customers = $this->Admin_model->get_customers_Branch($Relationship,$DSA,$id,$filter_by);
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
     
    // $arr['customers'] = $customers;
    
     $this->load->view('dashboard_header', $data);
     
     $this->load->view('admin/Branch_customer_PG');
     
 }
 public function Branch_customers_PG()
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
     $Relationship=$this->Admin_model->get_Branch_RO_BM($id);
     $DSA=$this->Admin_model->get_Branch_BM_BM($Relationship,$id);
     $sales_id=$this->Admin_model->get_Sales_BM($id);
     //$Customers=$this->Admin_model->get_cluster_customer($Branch_manger,$Relationship,$DSA,$id);
     /*------------------------------------------------------------------------*/
     
    
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
     $sel = $this->Admin_model->get_all_customers_Branch($Relationship,$DSA,$sales_id,$id,$filter_by);
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel=$this->Admin_model->get_all_customers_Branch_filter($Relationship,$DSA,$sales_id,$id,$searchValue,$filter_by);
     $totalRecordwithFilter =$sel;
     ## Fetch records
     $sel=$this->Admin_model->get_all_customers_Branch_filter_with_page($Relationship,$DSA,$sales_id,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
     $empRecords = $sel;
     $data = array();

     foreach($empRecords as $row)
     {
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
                 "FN"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->FN.' '.$row->LN.'</a>',
                 "Customer_status"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->STATUS.'</a>',
                 "Application_Status"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$Application_Status.'</a>',
                 "Loan_Type"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->loan_type.'</a>',
                 "Referred_by"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]</a>',
                 "Created_on"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->CREATED_AT.'</a>',
                 "Last_updated_on"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->last_updated_date.'</a>',
                 "UNIQUE_CODE"=>'<a style="margin-left: 8px;" href="'.base_url().'index.php/dsa/Go_No_GO_?ID='.$row->UNIQUE_CODE.'"class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a><a style="margin-left: 8px; " href="'.base_url().'index.php/customer/profile_view_p_o?ID='.$row->UNIQUE_CODE.'"class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>',
                 "Bureau_reports"=>'<a style="margin-left: 8px; " href="'.base_url().'index.php/dsa/show_coapplicants?ID='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>',
                  "Pre_cam"=>$Pre_cam,
                  "CAM"=>$CAM,
                  "PD"=>$PD,
                  "loan_form"=>$Loan_sanction_form,
                  "Amortisation"=>$Amortization
                
         
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


 
 /*---------------------- added by papiha on 11_05_2022------------- For Branch connector-----------------------------*/
    
 public function BranchManager_connector()
 {
    $filter_by=$this->input->post('filter');//added by sonal on 12-05-2022
    if($filter_by=="")
    {
        $filter_by="all";
    }
     $id = $this->session->userdata('ID');
     //$Branch_manger=$this->Admin_model->get_Branch_BM($id);
     $Relationship=$this->Admin_model->get_Branch_RO_BM_connector($id);
     $DSA=$this->Admin_model->get_Branch_BM_BM_connector($Relationship,$id);
//$customers = $this->Admin_model->get_customers_Branch_connector($Relationship,$DSA,$id,$filter_by);
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
     
    // $arr['customers'] = $customers;
    
     $this->load->view('dashboard_header', $data);
     
     $this->load->view('admin/Branch_connector_PG');
     
 }
 public function Branch_connector_PG()
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
     $Relationship=$this->Admin_model->get_Branch_RO_BM_connector($id);
     $DSA=$this->Admin_model->get_Branch_BM_BM_connector($Relationship,$id);
     $sales_id=$this->Admin_model->get_Sales_BM($id);
     //$Customers=$this->Admin_model->get_cluster_customer($Branch_manger,$Relationship,$DSA,$id);
     /*------------------------------------------------------------------------*/
     
    
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
     $sel = $this->Admin_model->get_all_connector_Branch($Relationship,$DSA,$sales_id,$id,$filter_by);
    // $sel=$this->Admin_model->Get_Total_No_Customer();
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel=$this->Admin_model->get_all_connector_Branch_filter($Relationship,$DSA,$sales_id,$id,$searchValue,$filter_by);
     $totalRecordwithFilter =$sel;
     ## Fetch records
     $sel=$this->Admin_model->get_all_connector_Branch_filter_with_page($Relationship,$DSA,$sales_id,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
     $empRecords = $sel;
     $data = array();

     foreach($empRecords as $row)
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
            "Created_on"=>$row->CREATED_AT,  
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

/*---------------------- added by papiha on 14_05_2022------------- For Branch DSA-----------------------------*/
    
public function BranchManager_dsa()
{
   $filter_by=$this->input->post('filter');
   if($filter_by=="")
   {
       $filter_by="all";
   }
    $id = $this->session->userdata('ID');
    //$Branch_manger=$this->Admin_model->get_Branch_BM($id);
    $Relationship=$this->Admin_model->get_Branch_RO_BM_dsa($id);
    $DSA=$this->Admin_model->get_Branch_BM_BM_dsa($Relationship,$id);
  //  $customers = $this->Admin_model->get_customers_Branch_dsa($Relationship,$DSA,$id,$filter_by);
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
    
   // $arr['customers'] = $customers;
   
    $this->load->view('dashboard_header', $data);
    
    $this->load->view('admin/Branch_dsa_PG');
    
}
public function Branch_dsa_PG()
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
    $Relationship=$this->Admin_model->get_Branch_RO_BM_dsa($id);
    $DSA=$this->Admin_model->get_Branch_BM_BM_dsa($Relationship,$id);
    $sales_id=$this->Admin_model->get_Sales_BM($id);
    //$Customers=$this->Admin_model->get_cluster_customer($Branch_manger,$Relationship,$DSA,$id);
    /*------------------------------------------------------------------------*/
    
   
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
    $sel = $this->Admin_model->get_all_dsa_Branch($Relationship,$DSA,$sales_id,$id,$filter_by);
   // $sel=$this->Admin_model->Get_Total_No_Customer();
    $totalRecords =$sel;
    ## Total number of records with filtering
    $sel=$this->Admin_model->get_all_dsa_Branch_filter($Relationship,$DSA,$sales_id,$id,$searchValue,$filter_by);
    $totalRecordwithFilter =$sel;
    ## Fetch records
    $sel=$this->Admin_model->get_all_dsa_Branch_filter_with_page($Relationship,$DSA,$sales_id,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
    $empRecords = $sel;
    $data = array();

    foreach($empRecords as $row)
        {
           
           
            
            
            
            if($row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">INCOMPLETE PROFILE </h6>';
                
               } 
            $data[] = array(
                 
                "FN"=>$row->FN.' '.$row->LN,
                "Email"=>$row->EMAIL,
                "mobile"=>$row->MOBILE,
                "Location"=>$row->Location,
                "Profile_Status"=>$incomplete1,  
                "Refered_by"=>$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]', 
                "Created_on"=>$row->CREATED_AT,  
              
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
 

// ////////////////////////////
/*---------------------- added by papiha on 14_05_2022------------- For Branch RO-----------------------------*/
    
public function BranchManager_RO()
{
   // echo "hiii";
   // exit();
   $filter_by=$this->input->post('filter');
   if($filter_by=="")
   {
       $filter_by="all";
   }
    $id = $this->session->userdata('ID');
    //$Branch_manger=$this->Admin_model->get_Branch_BM($id);
    $Relationship=$this->Admin_model->get_Branch_RO_BM_RO($id);
    $DSA=$this->Admin_model->get_Branch_BM_BM_RO($Relationship,$id);
    $customers = $this->Admin_model->get_customers_Branch_RO($Relationship,$DSA,$id,$filter_by);
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
    
    $this->load->view('admin/Branch_RO_PG',$arr);
    
}
public function Branch_RO_PG()
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
    $Relationship=$this->Admin_model->get_Branch_RO_BM_RO($id);
    $DSA=$this->Admin_model->get_Branch_BM_BM_RO($Relationship,$id);
    //$Customers=$this->Admin_model->get_cluster_customer($Branch_manger,$Relationship,$DSA,$id);
    /*------------------------------------------------------------------------*/
    
   
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



    $sel = $this->Admin_model->get_all_RO_Branch($Relationship,$DSA,$id,$filter_by);
   // $sel=$this->Admin_model->Get_Total_No_Customer();
    $totalRecords =$sel;
    ## Total number of records with filtering
    $sel=$this->Admin_model->get_all_RO_Branch_filter($Relationship,$DSA,$id,$searchValue,$filter_by);
    $totalRecordwithFilter =$sel;
    ## Fetch records
    $sel=$this->Admin_model->get_all_RO_Branch_filter_with_page($Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
    $empRecords = $sel;
    $data = array();

    foreach($empRecords as $row)
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
        "Created_on"=>$row->CREATED_AT,  
        "Action"=>$link,//." ".$link1,
      
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

/*--------------------------------added by sonal--26-05-2022--- admin Dsa Pagination changes by priya 9-06-2022------------------------------>*/
/*
public function customer_with_paginations_admin_DSA()
 {
    
  $filter_by=$this->input->post('filter');

     # Read value
     $draw = $_POST['draw'];
     $row = $_POST['start'];
     $rowperpage = $_POST['length']; // Rows display per page
     $columnIndex = $_POST['order'][0]['column']; // Column index
     $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
     $searchValue = $_POST['search']['value']; // Search value



     ## Search
     $searchQuery = " ";
     ## Total number of records without filtering
     $sel=$this->Admin_model->Get_Total_No_Customer_admin_DSA($filter_by);
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel=$this->Admin_model->Get_Customer_Filter_admin_DSA($searchValue,$filter_by);
     $totalRecordwithFilter =$sel;
     ## Fetch records
     $sel=$this->Admin_model->Get_Customer_With_Page_admin_DSA($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
     $empRecords = $sel;
     //return $empRecords
     //print_r($empRecords);
     
     $data = array();

     foreach($empRecords as $row)
     {
       $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                    
       $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel_delete" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a></td>';
      

       if($row->Profile_Status=="Complete") 
       {
        $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
         }
         else
          { 
            $incomplete='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
           
          } 
          
        $data[] = array(
            "FN"=>$row->FN." ".$row->LN,
            "Email"=>$row->EMAIL,
            "MOBILE"=>$row->MOBILE,
            "Profile_Status"=>$incomplete,
            "Refered_by"=>$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]', 
            "date"=>$row->CREATED_AT,
            "Actions"=>$link." ".$link1,
            
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
 */
public function customer_with_paginations_admin_DSA()
 {
    
   $Start_Date=$_POST['Start_Date'];
   $End_Date=$_POST['End_Date'];
   $filter_by=$_POST['filter'];
   $Reffered_by=$_POST['Reffered_by'];
   $location=$_POST['location'];
     # Read value
     $draw = $_POST['draw'];
     $row = $_POST['start'];
     $rowperpage = $_POST['length']; // Rows display per page
     $columnIndex = $_POST['order'][0]['column']; // Column index
     $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
     $searchValue = $_POST['search']['value']; // Search value



     ## Search
     $searchQuery = " ";
     ## Total number of records without filtering
     $sel=$this->Admin_model->Get_Total_No_Customer_admin_DSA($filter_by);
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel=$this->Admin_model->Get_Customer_Filter_admin_DSA($searchValue,$filter_by,$Start_Date,$End_Date,$Reffered_by,$location);
     $totalRecordwithFilter =$sel;
     ## Fetch records
     $sel=$this->Admin_model->Get_Customer_With_Page_admin_DSA($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date,$Reffered_by,$location);
     $empRecords = $sel;
     //return $empRecords
     //print_r($empRecords);
     
     $data = array();

     foreach($empRecords as $row)
     {
       $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                    
       $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel_delete" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a></td>';
      

       if($row->Profile_Status=="Complete") 
       {
        $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
         }
         else
          { 
            $incomplete='<h6 style="font-size: 10px; color: red">   INCOMPLETE PROFILE </h6>';
           
          } 
          
        $data[] = array(
            "FN"=>$row->FN." ".$row->LN,
            "Email"=>$row->EMAIL,
            "MOBILE"=>$row->MOBILE,
            "LOCATION"=>$row->Location,
            "Profile_Status"=>$incomplete,
            "Refered_by"=>$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]', 
            "date"=>$row->CREATED_AT,
            "Actions"=>$link." ".$link1,
            
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
/*--------------------------------added by sonal--26-05-2022--- admin Connector Pagination------------------------------>*/
public function customer_with_paginations_admin_Connector()
 {
    
  $Start_Date=$_POST['Start_Date'];
  
  $End_Date=$_POST['End_Date'];
  $filter_by=$_POST['filter'];
   $Reffered_by=$_POST['Reffered_by'];
      $location=$_POST['location'];
     # Read value
     $draw = $_POST['draw'];
     $row = $_POST['start'];
     $rowperpage = $_POST['length']; // Rows display per page
     $columnIndex = $_POST['order'][0]['column']; // Column index
     $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
     $searchValue = $_POST['search']['value']; // Search value



     
     ## Search
     $searchQuery = " ";
     ## Total number of records without filtering
     $sel=$this->Admin_model->Get_Total_No_Customer_admin_Connector($filter_by);
     $totalRecords =$sel;
     ## Total number of records with filtering
     $sel=$this->Admin_model->Get_Customer_Filter_admin_Connector($searchValue,$filter_by,$Start_Date,$End_Date,$Reffered_by,$location);
     $totalRecordwithFilter =$sel;
     ## Fetch records
     $sel=$this->Admin_model->Get_Customer_With_Page_admin_Connector($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date,$Reffered_by,$location);
     $empRecords = $sel;
     //return $empRecords
     //print_r($empRecords);
     
     $data = array();

     foreach($empRecords as $row)
     {
       $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                    
       $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
      

       if($row->Profile_Status=="Complete") 
       {
        $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
         }
         else
          { 
            $incomplete='<h6 style="font-size: 10px; color: red">   INCOMPLETE PROFILE </h6>';
           
          } 
          
        $data[] = array(
            "FN"=>$row->FN." ".$row->LN,
            "Email"=>$row->EMAIL,
            "MOBILE"=>$row->MOBILE,
             "Location"=>$row->Location,
            "Profile_Status"=>$incomplete,

            "Refered_by"=>$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]', 
            "date"=>$row->CREATED_AT,
            "Actions"=>$link,//." ".$link1,
            
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
public function credit_bureau_branch_count()
	 {
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');
            $type = $this->input->get('type');

           // added by priya 23-04-2022
              $filter_branch_name = $this->input->get('B');
              $filter_Start_Date = $this->input->get('SD');
              $filter_End_Date = $this->input->get('ED');


            $age = $this->session->userdata('AGE');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['type'] = $type;
            $data['userType'] = $this->session->userdata("USER_TYPE");
	
            $search_=$this->input->post('select_filters');
           // echo   $search_;
            //exit();

			if(isset($search_))
			{
            // echo   $search_;
            //exit();
				$filter='search';
				$search_name =$this->input->post('select_filters');	
			}
			else
			{
				$filter = '';
				$search_name="";
			}
            $customers = $this->Admin_model->getCustomersList_count($filter_branch_name ,  $filter_Start_Date, $filter_End_Date);
            $data['idccr_users'] = $this->Admin_model->get_idccr_users();
            //$this->load->view('header', $data);
            $data['customers'] = $customers;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/credit_bureau_branch_count', $data);
        }
	 }
     public function last_update()
	 {
		 $craete_date=$this->Admin_model->get_created_date();
		 
	 }
 /*--------------------------------------------------------- Addded by papiha on 03_06_2022-------------------------------------------------------------*/
 /*-------------------------- Added by papiha on 16_05_2022---------------------------------------------*/
 public function Admin_customers()
 {
         $userType=$this->session->userdata("USER_TYPE"); 
         $dashboard_data = $this->Admin_model->getDashboardData(); 
         $age = $this->session->userdata('AGE');
         $data['customers']=$dashboard_data['cust_count'];
         
         $data['showNav'] = 1;
         $data['age'] = $age;
         $data['userType'] = $this->session->userdata("USER_TYPE");   
         $arr['userType'] = $userType;
         if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['End_Date'];
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
          if(isset($_GET['RB']))
         {
           $data['RB']=$_GET['RB'];
         }
         else
         {
             $data['RB']='';
         }
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
        //$arr['customers'] = $customers;

         $Reffered_by = $this->Admin_model->getReferredByData();
              $filter_location = $this->Admin_model->getLocationByData();

            $arr['Reffered_by']=$Reffered_by ;
             $arr['filter_location']=$filter_location ;
      
         $this->load->view('admin/admin_dashbord', $data);
         $this->load->view('admin/admin_customers', $arr);
         
 }
public function Admin_customers_PG()
{
  
   
   

  /*-------------------------- For Cluster---------------------------*/
  $userType=$this->session->userdata("USER_TYPE");  
 
  
 
  # Read value
  $draw = $_POST['draw'];
  $row = $_POST['start'];
  $rowperpage = $_POST['length']; // Rows display per page
  $columnIndex = $_POST['order'][0]['column']; // Column index
  $Start_Date=$_POST['Start_Date'];
  
  $End_Date=$_POST['End_Date'];
  $filter_by=$_POST['filter'];

  $Reffered_by=$_POST['Reffered_by'];
   $location=$_POST['location'];
 
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_customers_Admin();
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_customers_Admin_filter($searchValue,$filter_by,$Start_Date,$End_Date, $Reffered_by, $location);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_customers_Admin_filter_pagination($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date, $Reffered_by, $location);
  $empRecords = $sel;
  $data = array();
$Insurance = "test ";
  foreach($empRecords as $row){
       /*---------------------- cam-----------------------------------*/
         if( $row->cam_status=='Cam details complete')
         {
             $Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
         }
         else
         {
             $Cam_pdf='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
         }  
         /*----------------------------------edit----------------------------------------*/
                      if($row->STATUS == 'Disbursed')
                     {
                       $Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
                       $edit =' <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                       $PD='<a  href="'. base_url().'index.php/credit_manager_user/pdf?ID='. $row->UNIQUE_CODE.'"Class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
                       $Eligibility ='<a style="margin-left: 8px; " href="'.base_url().'index.php/Rule_Engine/Calculate_eligibility?ID='.$row->UNIQUE_CODE.'"   class="btn Calculate_eligibility"><i class="fa fa-calculator text-right" style="color:green;"></i></a';
                       $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Login_fees_details?ID='.$row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
                       $Sanction_form ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Loan_sanction_form?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                       $Amortaization ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Amortization_Schedule?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                       $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                     }
                      else if($row->STATUS == 'Loan Sanctioned')
                     {
								$Insurance ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
                              $Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
         
                       $edit =' <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                       $PD='<a  href="'. base_url().'index.php/credit_manager_user/pdf?ID='. $row->UNIQUE_CODE.'"Class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
                       $Eligibility ='<a style="margin-left: 8px; " href="'.base_url().'index.php/Rule_Engine/Calculate_eligibility?ID='.$row->UNIQUE_CODE.'"   class="btn Calculate_eligibility"><i class="fa fa-calculator text-right" style="color:green;"></i></a';
                       $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Login_fees_details?ID='.$row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
                       $Sanction_form ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Loan_sanction_form?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                       $Amortaization ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Amortization_Schedule?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                       $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                     }
                     
                     else if($row->STATUS == 'PD Completed')
                     {
                              $Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
         
                 
                        $edit ='      
                       <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                       $PD='<a  href="'. base_url().'index.php/credit_manager_user/pdf?ID='. $row->UNIQUE_CODE.'"Class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
                       $Eligibility ='<a style="margin-left: 8px; " href="'.base_url().'index.php/Rule_Engine/Calculate_eligibility?ID='.$row->UNIQUE_CODE.'"   class="btn Calculate_eligibility"><i class="fa fa-calculator text-right" style="color:green;"></i></a';
                      $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Login_fees_details?ID='.$row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
                      $Sanction_form ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Loan_sanction_form?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                      $Amortaization ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Amortization_Schedule?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                      $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                     }
                     else if( $row->STATUS=='Aadhar E-sign complete')
                     {
						 
                         
                        $edit ='    <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                        $PD='<a  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
                        $Eligibility ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-calculator text-right" aria-hidden="true" style="color:gray;"></i></a>';
                        $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Login_fees_details?ID='.$row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
                        $Sanction_form ='<a style="margin-left: 8px;" class="btn" href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:grey;"></i></a>';
                        $Amortaization ='<a style="margin-left: 8px;" class="btn" href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                        $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                   }    
                     else if($row->STATUS == 'Cam details complete')
                     {
                                     $Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
         
                         $edit =' <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                         $PD='<a  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
                         $Eligibility ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-calculator text-right" aria-hidden="true" style="color:gray;"></i></a>';
                         $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Login_fees_details?ID='.$row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
                         $Sanction_form ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:grey;"></i></a>';
                         $Amortaization ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                         $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                     }
                     else {

                           
                          $edit ='<a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                          $PD='<a  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
                          $Eligibility ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-calculator text-right" aria-hidden="true" style="color:gray;"></i></a>';
                          $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-money" aria-hidden="true" style="color:gray;"></i></a>';
                          $Sanction_form ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:grey;"></i></a>';
                           $Amortaization ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                          $Pre_cam='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
						       $Cam_pdf='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
       
                     }

    if($row->credit_sanction_status == 'REJECT'|| $row->credit_sanction_status == 'reject' )
      {
          $Application_Status='<lable style="color:red;">REJECTED</lable>';
      }
      else if($row->credit_sanction_status == 'HOLD')
      {
          $Application_Status='<lable style="color:orange;">HOLD</lable>';
      }
      else
      {
		  if($row->STATUS == 'Disbursed')
         {
            $Application_Status = '<lable style="color:GREEN;">'.$row->STATUS.'</lable>';
         }
        else if($row->STATUS == 'Loan Sanctioned')
         {
            $Application_Status = '<lable style="color:GREEN;">'.$row->STATUS.'</lable>';
         }
        else if($row->STATUS == 'PD Completed')
         {
             $Application_Status = '<lable style="color:GREEN;">'.$row->STATUS.'</lable>';
         
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

         

   
        $customer_created_by=$this->Dsacustomers_model->getCustomer_created_by();//added by sonal on 12-05-2022
          $source_name='';
       foreach($customer_created_by as $row1)
                                                                                     { 
                                                                                           
                                                                                        if($row->CM_ID!=NULL && $row->CM_ID!='0' )
                                                                                        {
                                                                                            if($row1->UNIQUE_CODE==$row->CM_ID)
                                                                                            {
                                                                                                //echo $row1->FN.' '.$row1->LN.' [DSA]<br>';
                                                                                                $source_name=strtoupper($row1->FN.' '.$row1->LN);
                                                                                            }
                                                                                        }
                                                                                          
                                                                                          if($row->DSA_ID!=NULL && $row->DSA_ID!='0' )
                                                                                         {
                                                                                             if($row1->UNIQUE_CODE==$row->DSA_ID)
                                                                                             {
                                                                                                 //echo $row1->FN.' '.$row1->LN.' [DSA]<br>';
                                                                                                 $source_name=strtoupper($row1->FN.' '.$row1->LN);
                                                                                             }
                                                                                         }
                                                                                         else if($row->RO_ID!=NULL && $row->RO_ID!='0' )
                                                                                         {
                                                                                             if($row1->UNIQUE_CODE==$row->RO_ID)
                                                                                             {
                                                                                                 //echo $row1->FN.' '.$row1->LN.' [RO]<br>';
                                                                                                $source_name=strtoupper($row1->FN.' '.$row1->LN);
                                                                                             }
                                                                                         }
                                                                                         else if($row->BM_ID!=NULL && $row->BM_ID!='0' )
                                                                                         {
                                                                                             if($row1->UNIQUE_CODE==$row->BM_ID)
                                                                                             {
                                                                                                 //echo $row1->FN.' '.$row1->LN.' [BM]<br>';
                                                                                                 $source_name=strtoupper($row1->FN.' '.$row1->LN);
                                                                                             }
                                                                                         }
                                                                                         else if($row->SELES_ID!=NULL && $row->SELES_ID!='0' )
                                                                                         {
                                                                                             if($row1->UNIQUE_CODE==$row->SELES_ID)
                                                                                             {
                                                                                                 //echo $row1->FN.' '.$row1->LN.' [BM]<br>';
                                                                                                 $source_name=strtoupper($row1->FN.' '.$row1->LN);
                                                                                             }
                                                                                         }
              
                                                                       }
 if( $row->STATUS =='Disbursed')
            {
                 $Sanction_letter='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/Sanction_Letter?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                 $MITC='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/MITAC_pdf?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
             }
         else if( $row->STATUS =='Loan Sanctioned')
            {
                 $Sanction_letter='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/Sanction_Letter?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                 $MITC='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/MITAC_pdf?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
             }
            else
                {
                    
                    $Sanction_letter='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                    $MITC='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                    
                }
    
	//  $edit2 ='<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='. $row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-edit text-right" style="color:blue;" ></i></a>';
      $edit2 = "";
      $data[] = array(
              "ID"=>$row->ID,
              "FN"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='. $row->UNIQUE_CODE.'"  target="_blank">'.$row->FN.' '.$row->LN.'</a>',
			  "loan_type"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='. $row->UNIQUE_CODE.'"  target="_blank">'.$row->loan_type.'</a>',
              "Customer_status"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='. $row->UNIQUE_CODE.'"  target="_blank">'.$row->STATUS.'</a>',
              "Application_Status"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='. $row->UNIQUE_CODE.'"  target="_blank">'.$Application_Status.'</a>',
              "source_name"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='. $row->UNIQUE_CODE.'" target="_blank">'.$source_name.'</a>',
              "Refered_by"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='. $row->UNIQUE_CODE.'" target="_blank">'.$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]</a>',
              "LOCATION"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='. $row->UNIQUE_CODE.'" target="_blank">'.$row->Location.'</a>',
              "Created_on"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='. $row->UNIQUE_CODE.'"  target="_blank">'.$row->CREATED_AT.'</a>',
              "Last_updated_on"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='. $row->UNIQUE_CODE.'"  target="_blank">'.$row->last_updated_date.'</a>',
              "Bureau_reports"=>'<a style="margin-left: 8px; " href="'.base_url().'index.php/dsa/show_coapplicants?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>',
              "Insurance"=>'test',
			  "CAM"=>$Cam_pdf,
              "PD"=>$PD,
              "Sanction_letter"=>$Sanction_letter,
              "MITC"=>$MITC,
              "action"=>$edit." ".$edit2,
              "eligibility"=>$Eligibility,
              "login_fees_details"=>$Login_fees_details,
              "Sanction_form"=>$Sanction_form,
              "Amortaization"=>$Amortaization,
              "Pre_cam"=>$Pre_cam." "
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

 //======================================================= added by priya 16-06-2022 ==============================================================
public function operations_user_dsa_list_pagination()
                {
                   
                   $filter_by=$this->input->post('filter');
       
                    # Read value
                    $draw = $_POST['draw'];
                    $row = $_POST['start'];
                    $rowperpage = $_POST['length']; // Rows display per page
                    $columnIndex = $_POST['order'][0]['column']; // Column index
                    $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                    $searchValue = $_POST['search']['value']; // Search value
            
            
            
                    ## Search
                    $searchQuery = " ";
                    ## Total number of records without filtering
                    $sel=$this->Admin_model->operation_user_dsa_count($filter_by);
                    $totalRecords =$sel;
                    ## Total number of records with filtering
                    $sel=$this->Admin_model->Get_operations_user_dsa($searchValue,$filter_by);
                    $totalRecordwithFilter =$sel;
                    ## Fetch records
                    $sel=$this->Admin_model->Get_DSA_Wth_Pagination($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
                    $empRecords = $sel;
                    //return $empRecords
                    //print_r($empRecords);
                    
                    $data = array();
            
                    foreach($empRecords as $row){
  
                     
       
                      if($row->Profile_Status=="Complete") 
                      {
                       $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
                        }
                        else
                         { 
                           $incomplete='<h6 style="font-size: 10px; color: red">    INCOMPLETE PROFILE </h6>';
                          
                         } 
                       $data[] = array(
                           "FN"=>$row->FN." ".$row->LN,
                           "Email"=>$row->EMAIL,
                           "MOBILE"=>$row->MOBILE,
                           "Profile_Status"=>$incomplete,
                           "Location"=>$row->Location,
                           "Refered_by"=>$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]', 
                           "date"=>$row->CREATED_AT,
                          
                           
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

//=========================================================================================================================================
            public function Sanction_letters()
    {
        
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR'  || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
			
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s == '')
			{
				 $s='All';
			}
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['filter_by'] = $s;
			
             $data['userType']=$this->session->userdata("USER_TYPE");
			//echo  $data['userType'];
			//exit();
                  $this->load->view('admin/admin_dashbord',$data);             
              
            
               $this->load->view('admin/Sanction_letters_PG',$data); 
            
        }        
    }
 public function Sanction_letters_PG()
            {
               
			   
				 $filter_by=$this->input->post('filter');
                # Read value
                $draw = $_POST['draw'];
                $row = $_POST['start'];
                $rowperpage = $_POST['length']; // Rows display per page
                $columnIndex = $_POST['order'][0]['column']; // Column index
                $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                $searchValue = $_POST['search']['value']; // Search value
                $id = $this->session->userdata('ID');
        
              
                ## Search
                $searchQuery = " ";
                ## Total number of records without filtering
                $sel=$this->Admin_model->Get_Total_no_of_sanction_letters( $filter_by);
                $totalRecords =$sel;
                ## Total number of records with filtering
                $sel=$this->Admin_model->Get_sanction_letters($searchValue, $filter_by);
                $totalRecordwithFilter =$sel;
                ## Fetch records
                $sel=$this->Admin_model->Get_sanction_letters_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage, $filter_by);
                $empRecords = $sel;
                            
                    $data = array();
                    foreach($empRecords as $row){
                          $userType=$this->session->userdata("USER_TYPE"); 
						 $disbursement_data =  $this->credit_manager_user_model->find_Disbursement_document_approval_data($row->UNIQUE_CODE);
						  
                          //echo $userType;
                          //exit();

                          if($userType == "ADMIN" || $userType == "Cluster_credit_manager" || $userType == "Chief_Risk_Officer" )
                         {
                            $edit ='<a href="'. base_url().'index.php/Admin/Sanction_cum_acceptance_letter_admin?ID='.$row->customer_id.'&CM='.$row->credit_manager_id.'" "Class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                              $ProcessingFee ='<a  "Class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a>';
							
                         }
                         else if($userType == "Account_Manager")
                         {
                            $ProcessingFee ='<a href="'. base_url().'index.php/Admin/Processing_fee_receipt?ID='.$row->customer_id.'&CM='.$row->credit_manager_id.'" "Class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                          
						 
                              $edit ='<a  "Class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a>';
                         }
                        else
                        {
                              $edit ='<a  "Class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a>';
                              $ProcessingFee ='<a  "Class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a>';
							 
                             // $ProcessingFee ='<button type="button" class="btn btn-primary" >Checkout</button>';

                        }
                             if( $row->Sanctioned_date != NULL ||  $row->Sanctioned_date != '')
            {
                 $Sanction_letter='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/Sanction_Letter?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';
                 $MITC='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/MITAC_pdf?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';
				  $Loan_agreement='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Disbursement_OPS/Loan_Aggrement_AUTO?I='.base64_encode($row->UNIQUE_CODE).'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a>';
			
																		
			 }
            else
                {
                    
                    $Sanction_letter='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                    $MITC='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                     $Loan_agreement='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                 
                }
                 
           if($row->payment_recived_date != "")
           {
                $payment_status='<span style="color:green">Received on '.$row->payment_recived_date.'</span>';
				 if($userType == "Account_Manager")
				 {
					 
					 if(!empty($disbursement_data))
					 {
						$Cheque ='<a href="'. base_url().'index.php/Admin/Disbursement_cheques?ID='.base64_encode($row->customer_id).'&CM='.$row->credit_manager_id.'" "Class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
					 }
					 else
					 {
						
						 $Cheque ='<a  "Class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a>';
					 }
				 }
				 else
				 {
					
			      $Cheque ='<a  "Class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a>';
          
				 }
           }
           else
           {
			   
                $payment_status='<span style="color:red">Pending</span>' ;
				  $Cheque ='<a  "Class="btn modal_test"><i class="fa fa-edit text-right" style="color:gray;"></i></a>';
           }
		      $documents = '<a class="dropdown-item" href="'. base_url().'index.php/credit_manager_user/Sanction_Documents?ID='.$row->UNIQUE_CODE.'&CM=" target="_blank">
           			<button type="button" class="btn btn-success">View Documents </button> 
           		</a>';
                       $data[] = array(
                           "Name"=>$row->FN." ".$row->LN,
                           //"Letter_ID"=>$row->Letter_ID,
                           "loan_amount"=>"Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$row->total_loan_amount),
                           
                           "Status"=>$row->Status,

                           "last_updated"=>$row->last_updated,
                            "Sanction_letter"=>$Sanction_letter,
                            "MITC"=>$MITC,
                           "edit"=>$edit,
						   "ProcessingFeeAmount"=>"Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$row->processing_fee_amount),
                           "ProcessingFee"=> $ProcessingFee ,
                           "payment_status"=> $payment_status,
						   "Cheque"=>$Cheque,
						   "documents"=>$documents,
						   "Loan_agreement"=>$Loan_agreement
                           
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



    public function Sanction_cum_acceptance_letter_admin()
      {
          $id = $this->input->get("ID");
          $id1=$this->session->userdata("ID");
          if( $id=='')  
            {     
                $id=$this->session->userdata("id");   
            }
          if( $id1=='') 
            {     
                $id1=$this->session->userdata("id1"); 
            }

            if($this->session->userdata("USER_TYPE") == '')
            {
                $data['showNav'] = 0;
                $data['error'] = '';
                $data['age'] = '';
                $data['userType'] = "none";
                $this->load->view('login', $data);
            }
          else
            {
                $id = $this->input->get("ID");
                $CM_ID = $this->input->get("CM");
                //$this->session->set_userdata("CM_ID",$CM_ID); 
                
                if($CM_ID == '')
                {
                  $CM_ID = $this->session->userdata("CM_ID");
                }
                
                $CM_data_row = $this->Customercrud_model->getProfileData($CM_ID);
                $data['CM_data_row'] = $CM_data_row;
                $data['CM_ID'] = $CM_ID;
                if ($id == '') {
                    $id = $this->session->userdata("ID");
                }
                $data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
                if(!empty($data_row_pd_table))
                {
                    $data['data_row_pd_table'] = $data_row_pd_table;
                }
                
                $data_row = $this->Customercrud_model->getProfileData($id);
                $data_row_more = $this->Customercrud_model->getProfileDataMore($id);
                $data_row_applied_loan= $this->Customercrud_model->getCustomerLoanAppliedInfo($id);
                $getCustomerSanction_letter_details=    $this->credit_manager_user_model->getCustomerSanction_letter_details($id);
                $data_row_personal_discussion_form= $this->credit_manager_user_model->getPersonalDiscussionData($id,$id1);
                //$data_row_personal_discussion_form= $this->credit_manager_user_model->getPDData($id);
                //check_personal_discussion_pdf_details
                 //$data_row_PD_details= $this->credit_manager_user_model->check_personal_discussion_pdf_details($id,$id1);
                 //--------------------------- details for obligation
                //$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
            
                $data_credit_analysis=$this->Operations_user_model->getcreditData($id);
                 $data_row_PD_details= $this->credit_manager_user_model->getPDData($id);
                 $data['data_row_PD_details']=$data_row_PD_details;
                $data_row_income = $this->Customercrud_model->getProfileDataIncome($id);    
                $co_app = $this->Customercrud_model->getMyCoapplicants($id);
                            $data['co_app'] = $co_app;
                $isCoapp = count($co_app) > 0 ? 'true' : 'false';
                $isProfileFull = 'false';
                for ($i=0; $i < count($co_app); $i++) { 
                    if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
                }
                $this->load->helper('url'); 
                $age = $this->session->userdata('AGE');
                $u_type = $this->session->userdata("USER_TYPE");
                $q = 1;
                if($u_type == 'DSA')$q = 2;
                if($data_row->PROFILE_PERCENTAGE == 100){
                    $age = 1;
                }else $age = 0;
                $data['showNav'] = $age;
                $data['age'] = $age;
                $data['userType'] = $this->session->userdata("USER_TYPE");
                $data['id'] = $id;
                $data['row'] = $data_row;
                $data['row_more'] = $data_row_more;
                $data['data_row_applied_loan']=$data_row_applied_loan;
                $data['coapplicants'] = $co_app;
                $data['data_row_income'] = $data_row_income;
                $data['data_credit_analysis']=$data_credit_analysis;
                $data['Sanction_letter_details']=$getCustomerSanction_letter_details;
                $data['row_personal_discussion_form']=$data_row_personal_discussion_form;
                    
                  $this->load->view('admin/admin_dashbord',$data);  
              

                
                                    if(isset($data_row_pd_table))
                                    {
                                    $credit_manager_ID=$data_row_pd_table->Credit_manager_id;
                                    $credit_manager_data=$this->Operations_user_model->getProfileData($credit_manager_ID);
                                    $data['credit_manager_data']=$credit_manager_data;
                                    }
                                    else
                                    {
                                        $data['credit_manager_data']=array();
                                    }
            
                                    
                                    $this->session->unset_userdata("check_steps");
                                    $this->load->view('admin/sanction_cum_acceptance_letter_admin',$data);
                

            } 
      }
public function Sanction_cum_acceptance_letter_F2_admin()
      {
          $id = $this->input->get("ID");
          $id1=$this->session->userdata("ID");
          if( $id=='')  
            {     
                $id=$this->session->userdata("id");   
            }
          if( $id1=='') 
            {     
                $id1=$this->session->userdata("id1"); 
            }

            if($this->session->userdata("USER_TYPE") == '')
            {
                $data['showNav'] = 0;
                $data['error'] = '';
                $data['age'] = '';
                $data['userType'] = "none";
                $this->load->view('login', $data);
            }
          else
            {
                $id = $this->input->get("ID");
                $CM_ID = $this->input->get("CM");
                //$this->session->set_userdata("CM_ID",$CM_ID); 
                
                if($CM_ID == '')
                {
                  $CM_ID = $this->session->userdata("CM_ID");
                }
                
                $CM_data_row = $this->Customercrud_model->getProfileData($CM_ID);
                $data['CM_data_row'] = $CM_data_row;
                $data['CM_ID'] = $CM_ID;
                if ($id == '') {
                    $id = $this->session->userdata("ID");
                }
                $data_row_pd_table=$this->credit_manager_user_model->data_row_pd_table($id);
                if(!empty($data_row_pd_table))
                {
                    $data['data_row_pd_table'] = $data_row_pd_table;
                }
                
                $data_row = $this->Customercrud_model->getProfileData($id);
                $data_row_more = $this->Customercrud_model->getProfileDataMore($id);
                $data_row_applied_loan= $this->Customercrud_model->getCustomerLoanAppliedInfo($id);
                $data_row_personal_discussion_form= $this->credit_manager_user_model->getPersonalDiscussionData($id,$id1);
                $getCustomerSanction_letter_details=    $this->credit_manager_user_model->getCustomerSanction_letter_details($id);
                //$data_row_personal_discussion_form= $this->credit_manager_user_model->getPDData($id);
                //check_personal_discussion_pdf_details
                 //$data_row_PD_details= $this->credit_manager_user_model->check_personal_discussion_pdf_details($id,$id1);
                 //--------------------------- details for obligation
                //$data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
            
                $data_credit_analysis=$this->Operations_user_model->getcreditData($id);
                 $data_row_PD_details= $this->credit_manager_user_model->getPDData($id);
                 $data['data_row_PD_details']=$data_row_PD_details;
				 $data['getCustomerSanction_recommendation_details']=$this->credit_manager_user_model->getCustomerSanction_recommendation_details($id);
		
                $data_row_income = $this->Customercrud_model->getProfileDataIncome($id);    
                $co_app = $this->Customercrud_model->getMyCoapplicants($id);
                            $data['co_app'] = $co_app;
                $isCoapp = count($co_app) > 0 ? 'true' : 'false';
                $isProfileFull = 'false';
                for ($i=0; $i < count($co_app); $i++) { 
                    if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
                }
                $this->load->helper('url'); 
                $age = $this->session->userdata('AGE');
                $u_type = $this->session->userdata("USER_TYPE");
                $q = 1;
                if($u_type == 'DSA')$q = 2;
                if($data_row->PROFILE_PERCENTAGE == 100){
                    $age = 1;
                }else $age = 0;
                $data['showNav'] = $age;
                $data['age'] = $age;
                $data['userType'] = $this->session->userdata("USER_TYPE");
                $data['id'] = $id;
                $data['row'] = $data_row;
                $data['row_more'] = $data_row_more;
                $data['data_row_applied_loan']=$data_row_applied_loan;
                $data['coapplicants'] = $co_app;
                $data['data_row_income'] = $data_row_income;
                $data['data_credit_analysis']=$data_credit_analysis;
                $data['Sanction_letter_details']=$getCustomerSanction_letter_details;
                $data['row_personal_discussion_form']=$data_row_personal_discussion_form;
               // $this->load->view('credit_manager_user/Sanction_dashbord',$data); 
                //$this->load->view('credit_manager_user/personal_discussion',$data);
               $this->load->view('admin/admin_dashbord',$data);  
            

                
                                    if(isset($data_row_pd_table))
                                    {
                                    $credit_manager_ID=$data_row_pd_table->Credit_manager_id;
                                    $credit_manager_data=$this->Operations_user_model->getProfileData($credit_manager_ID);
                                    $data['credit_manager_data']=$credit_manager_data;
                                    }
                                    else
                                    {
                                        $data['credit_manager_data']=array();
                                    }
            
            
                                   
                                    $this->load->view('admin/Sanction_cum_acceptance_letter_F2_admin',$data);
                

            } 
      }


        public function save_and_continue_sanction_form_2_admin()
    {
        
         $application_number     =$this->session->userdata("id"); // shows customer id
         $credit_manager_user_id =$this->session->userdata("id1"); // shows credit manager id
            

         $fist_condition=$this->input->post('fist_condition');
         $second_condition=$this->input->post('second_condition');
         $third_condition=$this->input->post('third_condition');

         $additional_emi_comments=$this->input->post('additional_emi_comments');
         $count = count($additional_emi_comments);
         $needed_before_first_disbursement=array();
            for($i=0; $i<$count; $i++)
                {
                    array_push($needed_before_first_disbursement, array(
                                'additional_emi_comments'=>$additional_emi_comments[$i],
                                )); 
                }
                $needed_before_first_disbursement_JSON =json_encode($needed_before_first_disbursement);
                   
         $fourth_condition=$this->input->post('fourth_condition');
         $additional_emi_comments3=$this->input->post('additional_emi_comments_3');
            $count = count($additional_emi_comments3);
            $submitted_before_first_disbursement=array();
            for($i=0; $i<$count; $i++)
                {
                    array_push($submitted_before_first_disbursement, array(
                                'additional_emi_comments'=>$additional_emi_comments3[$i],
                                )); 
                }
                $submitted_before_first_disbursement_JSON =json_encode($submitted_before_first_disbursement);
                 
         $fifth_condition = $this->input->post('fifth_condition');  
         
         $Conditions_to_Loan_Sanction=array(
             'fist_condition'=>$fist_condition,
             'second_condition'=>$second_condition,
             'third_condition'=>$third_condition,
             'needed_before_first_disbursement'=>$needed_before_first_disbursement_JSON,
             'fourth_condition'=>$fourth_condition,
             'submitted_before_first_disbursement'=>$submitted_before_first_disbursement_JSON,
             'fifth_condition'=>$fifth_condition
         );
         
         $Conditions_to_Loan_Sanction_JSON =json_encode($Conditions_to_Loan_Sanction);
                  // echo "<pre>";
                 // print_r(json_decode($Conditions_to_Loan_Sanction_JSON,true));
                 // echo "</pre>";
                 // exit();

         //create letter_id
         $customer_id=$this->input->post('customer_id');
              $getCustomerSanction_letter_details=  $this->credit_manager_user_model->getCustomerSanction_letter_details($customer_id);
                
         $year= date("Y", strtotime($getCustomerSanction_letter_details->last_updated));
         $month=date("m", strtotime($getCustomerSanction_letter_details->last_updated));
         $date2=date("d", strtotime($getCustomerSanction_letter_details->last_updated));
         $string="FFPL";
         $ID_from_database=$getCustomerSanction_letter_details->ID;
         $letter_id=$year."/".$string."/".$date2."".$month."".$year."0".$ID_from_database;

         

                  $data=array(
                     'Letter_ID'=>$letter_id,
                     'Conditions_to_Loan_Sanction_JSON'=>$Conditions_to_Loan_Sanction_JSON,
                     'Progress'=>"100",
                     'last_updated'=>date("Y/m/d"),
                     'Status'=>"Approved"
                   );


                  
                  $credit_manager_id=$this->input->post('credit_manager_id');

                  $Result_id1 = $this->credit_manager_user_model->update_sanction_letter_details($customer_id, $data);
                   redirect("Admin/Sanction_cum_acceptance_letter_admin?ID=".$customer_id."&CM=".$credit_manager_id);

   
                  
    }

    public function Sanction_letter_status()
    {
       
         $config['protocol']='smtp';
            /*$config['smtp_host']='smtp.zoho.in';
            $config['smtp_port']='465';
            $config['smtp_timeout']='30';
            $config['smtp_crypto']='ssl';
            //$config['smtp_user']='info@finaleap.com';
            //$config['smtp_pass']='skP37cnpCIq0';
            //$config['smtp_user']='flconnect@finaleap.com';
            //$config['smtp_pass']='iNF0SYS@589';
            //$from_email = "flconnect@finaleap.com";
            $config['smtp_user']='flinfo@finaleap.com';
            $config['smtp_pass']='Qt@411037';*/
            $config['smtp_host']='smtp-relay.sendinblue.com';
            $config['smtp_port']='587';

            $config['smtp_crypto']='tls';
            $config['smtp_user']='flconnect@finaleap.com';
            $config['smtp_pass']='Qns9hEpIMJVwUFgZ'; 
            $from_email = "infoflfinserv@finaleap.com";
            $config['charset']='utf-8';
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
    
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            //$code = $this->generate_uuid();
            //$from_email = "info@finaleap.com";
            
            $this->email->from($from_email, 'Finaleap Finserv');

            


        $data=array(
                     'User_ID'=>$this->input->post('User_ID'),
                     'Status'=>$this->input->post('Status'),
                     'dsa_id'=>$this->input->post('dsa_id'),
                     'admin_comments'=>$this->input->post('admin_comments'),
                    );
					
					  $data3=array(
					 'sanction_conditions'=>$this->input->post('sanction_conditions'),
                     'legal_conditions'=> $this->input->post('legal_conditions'),
                     'additional_sanction_conditions'=>$this->input->post('additional_sanction_conditions'),
                     'additional_legal_conditions'=> $this->input->post('additional_legal_conditions')
                     );
		 $result = $this->credit_manager_user_model->update_recommendation_details($data['User_ID'],$data3);
		   

        $Applicant_ID=$data['User_ID'];
        $user_info= $this->Operations_user_model->getProfileData($data['User_ID']);
        $dsa_info=$this->Operations_user_model->getProfileData($data['dsa_id']);
		
			$who_is_going_to_approve_ID = $this->session->userdata('ID');
		$Status_added_by_info =  $this->Operations_user_model->getProfileData($who_is_going_to_approve_ID);
		$Status_added_by_name= $Status_added_by_info->FN." ".$Status_added_by_info->LN;
		
		
        $getCustomerSanction_letter_details=  $this->credit_manager_user_model->getCustomerSanction_letter_details($data['User_ID']);
		
        if($data['Status'] == 'approved')
        {
            $data2=array(
                     'last_updated'=>date("Y/m/d"),
                     'Status'=>"Approved",
                     'Status_added_by'=>$Status_added_by_name,
                      'admin_comments'=>$data['admin_comments']
                   );
            $array_customer_more_details = array(
                                'CUST_ID'  =>$Applicant_ID,
                                'STATUS'  =>'Loan Sanctioned'
                                );
             $this->Customercrud_model->update_customer_more_details($Applicant_ID, $array_customer_more_details);
       
        }
        else if($data['Status'] == 'Revert')
        {
             $data2=array(
                     'last_updated'=>date("Y/m/d"),
                     'Status'=>"Revert",
                     'Status_added_by'=>$Status_added_by_name,
                     'admin_comments'=>$data['admin_comments']
                   );

        }
        else if($data['Status'] == 'Rejected')
        {
             $data2=array(
                     'last_updated'=>date("Y/m/d"),
                     'Status'=>"Rejected",
                     'Status_added_by'=>$Status_added_by_name,
                     'admin_comments'=>$data['admin_comments']
                   );

                $array_customer_more_details = array(
                                'CUST_ID'  =>$Applicant_ID,
                                'STATUS'  =>'Sanction Rejected'
                                );
         $this->Customercrud_model->update_customer_more_details($Applicant_ID, $array_customer_more_details);
       

        }
         $Result_id1 = $this->credit_manager_user_model->update_sanction_letter_details($Applicant_ID, $data2);
        // update custoomer status



        //update status of customer----------------------------------------------------------
      $array_input_more2 = array(
                                'Sanctioned_date'=>date("Y/m/d")   
                                );
                            
        $Result_id2 = $this->Customercrud_model->update_profile($Applicant_ID,$array_input_more2);
        //-----------------------------------------------------------------------------------


          $customer_id=$this->input->post('User_ID');
             $getCustomerSanction_letter_details=  $this->credit_manager_user_model->getCustomerSanction_letter_details($customer_id);
             $user_info= $this->Operations_user_model->getProfileData($getCustomerSanction_letter_details->customer_id);
             $credit_manager_info= $this->Operations_user_model->getProfileData($getCustomerSanction_letter_details->credit_manager_id);

              $sanction_details=array(
                            'Customer_name'=> $user_info->FN." ".$user_info->LN,
                            'CM_Name'=>$credit_manager_info->FN." ".$credit_manager_info->LN,
                            'Letter_ID'=> $getCustomerSanction_letter_details->Letter_ID,
                            'loan_amount'=> $getCustomerSanction_letter_details->loan_amount,
                            'Submitted_date'=> $getCustomerSanction_letter_details->last_updated,
                            'Status'=> $getCustomerSanction_letter_details->Status,
                            'admin_comments'=> $getCustomerSanction_letter_details->admin_comments,
                            'Status_added_by'=> $getCustomerSanction_letter_details->Status_added_by,
                                );
            $mail_data['Customer_name']=$sanction_details['Customer_name'];
             $mail_data['CM_Name']=$sanction_details['CM_Name'];
             $mail_data['Letter_ID']=$sanction_details['Letter_ID'];
             $mail_data['loan_amount']=$sanction_details['loan_amount'];
             $mail_data['Submitted_date']=$sanction_details['Submitted_date'];
             $mail_data['Status']=$sanction_details['Status'];
             $mail_data['admin_comments']=$sanction_details['admin_comments'];
             $mail_data['Status_added_by']=$sanction_details['Status_added_by'];
			 $mail_data['Applicant_ID']=$Applicant_ID;
			 $mail_data['tenure']=$getCustomerSanction_letter_details->tenure;
			 $mail_data['roi']=$getCustomerSanction_letter_details->rate_of_interest;
			 $mail_data['EMI']=$getCustomerSanction_letter_details->EMI;




          if($data['Status'] == 'approved')
        {
            
            $CM_MAil=$credit_manager_info->EMAIL;
           //  $send_email_to_3_HR='shiv@finaleap.com,amit@finaleap.com,vipul@finaleap.com,sachin.kardile@finaleap.com,'.$CM_MAil.',sunil.kalan@finaleap.com,arun.pawar@finaleap.com';
             $send_email_to_3_HR='piyuabdagire@gmail.com,priyanka.abdagire@finaleap.com,backupfiles.priyanka@gmail.com,'.$CM_MAil.'';
             //$send_email_to_3_HR=$credit_manager_info->EMAIL;
                $this->email->to($send_email_to_3_HR);
                $this->email->subject('Sanctioned letter Approved For the customer :  '.$mail_data['Customer_name'].''); 
              //  $this->email->subject('System testing plz ignor this mail , Sanctioned letter submitted for Approval :  '.$sanction_details['Customer_name'].''); 
        }
        else if($data['Status'] == 'Revert')
        {
                 //$send_email_to_3_HR='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com,vipul@finaleap.com';
               $send_email_to_3_HR='piyuabdagire@gmail.com,priyanka.abdagire@finaleap.com,backupfiles.priyanka@gmail.com';
               //  $send_email_to_3_HR=$credit_manager_info->EMAIL;
				//   $send_email_to_3_HR=''.$CM_MAil.',sunil.kalan@finaleap.com';
              
                $this->email->to($send_email_to_3_HR);
                $this->email->subject('Sanctioned letter Revert For the customer :  '.$mail_data['Customer_name'].'');
            //  $this->email->subject('System testing plz ignor this mail , Sanctioned letter submitted for Approval :  '.$sanction_details['Customer_name'].'');  
        }
        else if($data['Status'] == 'Rejected')
        {
            
              
             // $send_email_to_3_HR='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com,vipul@finaleap.com';
                $send_email_to_3_HR='piyuabdagire@gmail.com,priyanka.abdagire@finaleap.com,backupfiles.priyanka@gmail.com';
             //$send_email_to_3_HR=$credit_manager_info->EMAIL;
              // $CM_MAil=$credit_manager_info->EMAIL;
                 $send_email_to_3_HR='shiv@finaleap.com,amit@finaleap.com,vipul@finaleap.com,sachin.kardile@finaleap.com,'.$CM_MAil.',sunil.kalan@finaleap.com,arun.pawar@finaleap.com';
                $this->email->to($send_email_to_3_HR);
                $this->email->subject('Sanctioned letter Rejected For the customer :  '.$mail_data['Customer_name'].''); 
             //   $this->email->subject('System testing plz ignor this mail , Sanctioned letter submitted for Approval :  '.$sanction_details['Customer_name'].''); 
        }

            $mailContent = $this->load->view('templates/Sanction_letter_submitted',$mail_data,true);
            $this->email->message($mailContent); 
            $this->email->Send(); 
			//----------------this mail is for document verification------------------------------ //
			if($data['Status'] == 'approved')
			{
				$config['protocol']='smtp';
				$config['smtp_host']='smtp-relay.sendinblue.com';
				$config['smtp_port']='587';
				$config['smtp_crypto']='tls';
				$config['smtp_user']='flconnect@finaleap.com';
				$config['smtp_pass']='Qns9hEpIMJVwUFgZ'; 
				$from_email = "infoflfinserv@finaleap.com";
				$config['charset']='utf-8';
				$config['newline']="\r\n";
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");
				$this->email->from($from_email, 'Finaleap Finserv');
				//$send_email_to_credit='credit@finaleap.com';
				//$send_email_to_credit='credit@finaleap.com';
				$send_email_to_credit='piyuabdagire@gmail.com';
				$this->email->to($send_email_to_credit);
				//$this->email->bcc('info@finaleap.com');
				$this->email->subject('Post sanctioned documents verification for the customer :  '.$mail_data['Customer_name'].''); 
				$mailContent = $this->load->view('templates/Post_sanction_document_verification',$mail_data,true);
				$this->email->message($mailContent); 
				$this->email->Send(); 
				 //================== customer consent email added by priya 29-12-2022==============================
			    $config['protocol']='smtp';
				$config['smtp_host']='smtp-relay.sendinblue.com';
				$config['smtp_port']='587';
				$config['smtp_crypto']='tls';
				$config['smtp_user']='flconnect@finaleap.com';
				$config['smtp_pass']='Qns9hEpIMJVwUFgZ'; 
				$from_email = "infoflfinserv@finaleap.com";
				$config['charset']='utf-8';
				$config['newline']="\r\n";
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");
				$this->email->from($from_email, 'Finaleap Finserv');
				//$send_email_to_credit='credit@finaleap.com';
				$send_email_to_credit='piyuabdagire@gmail.com';
				$this->email->to($send_email_to_credit);
				//$this->email->bcc('info@finaleap.com');
				$this->email->subject('Sanction of your loan application with Finaleap Finserv Private Limited'); 
				$mailContent = $this->load->view('templates/Sanction_letter_customer_consent',$mail_data,true);
				$this->email->message($mailContent); 
				$this->email->Send(); 
		  
			} 

         $json = array (  
           'customer_id'=>$data['User_ID'],
           'CM_ID'=>$data['dsa_id'],
            'msg'=>'success'  );
        echo json_encode($json);
   }

     //==================added by priya 04-07-2022 =============== 
    public function Cluster_credit_manager()
    {
        
         if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'admin' || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/Cluster_credit_manager_PG',$data)   ;
        }        
    }


       public function cluster_credit_managers_list()
                {
                   
                   $filter_by=$this->input->post('filter');
       
                    # Read value
                    $draw = $_POST['draw'];
                    $row = $_POST['start'];
                    $rowperpage = $_POST['length']; // Rows display per page
                    $columnIndex = $_POST['order'][0]['column']; // Column index
                    $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                    $searchValue = $_POST['search']['value']; // Search value
            
            
            
                    ## Search
                    $searchQuery = " ";
                    ## Total number of records without filtering
                    $sel=$this->Admin_model->Get_Total_No_of_cluster_Credit_manager($filter_by);
                    $totalRecords =$sel;
                    ## Total number of records with filtering
                    $sel=$this->Admin_model->search_cluster_credit_manager($searchValue,$filter_by);
                    $totalRecordwithFilter =$sel;
                    ## Fetch records
                    $sel=$this->Admin_model->Get_all_cluster_credit_manager_list($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
                    $empRecords = $sel;
                    //return $empRecords
                    //print_r($empRecords);
                    
                    $data = array();
            
                    foreach($empRecords as $row){
                      $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                                   
                      $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
                     
       
                      if($row->Profile_Status=="Complete") 
                      {
                       $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
                        }
                        else
                         { 
                           $incomplete='<h6 style="font-size: 10px; color: red">    INCOMPLETE PROFILE </h6>';
                          
                         } 
                       $data[] = array(
                           "FN"=>$row->FN." ".$row->LN,
                           "Email"=>$row->EMAIL,
                           "MOBILE"=>$row->MOBILE,
                           "Profile_Status"=>$incomplete,
                           "date"=>$row->CREATED_AT,
                           "Actions"=>$link." ".$link1,
                           
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
			   
			   
			    /*---------------------------------------Added by Jaykumar-----------------------------------------------------*/
     public function Accountant()
	 {
		  
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s=='')
			{
				$s='all';
			}
     	    $Accountant_arr = $this->Admin_model->getAccount_Manager($s);
            $_SESSION["data_for_excel"] = $Accountant_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['data'] =$Accountant_arr;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/AccountManager', $data);   
			
        }        
	 }


		public function delete_Account_Manager()
	{
		$id= $this->input->post('id');
		
		$result=$this->Admin_model->delete_customer($id);
		if($result > 0)
		{
			$this->session->set_flashdata("result", 1);
			 $this->session->set_flashdata("message",'Account Manager Deleted Sucessfully' );
			 redirect('admin/Accountant?s=all');
		}
		else
		{
			$this->session->set_flashdata("result", 2);
			 $this->session->set_flashdata("message",'Something get Wrong' );
			 redirect('admin/Accountant?s=all');
		}

	}

    //======================= added by priya 12-07-2022
    public function Sanction_recommendations()
    {
        
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR'  || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           $data['userType'] = $this->session->userdata("USER_TYPE");
                  $this->load->view('admin/admin_dashbord',$data);             
              
            
               $this->load->view('admin/Sanction_recommendations_PG',$data); 
            
        }        
    }
     public function Sanction_recommendations_PG()
            {
               
        
                # Read value
                $draw = $_POST['draw'];
                $row = $_POST['start'];
                $rowperpage = $_POST['length']; // Rows display per page
                $columnIndex = $_POST['order'][0]['column']; // Column index
                $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                $searchValue = $_POST['search']['value']; // Search value
                $id = $this->session->userdata('ID');
        
        
                ## Search
                $searchQuery = " ";
                ## Total number of records without filtering
                $sel=$this->Admin_model->Get_Total_no_of_sanction_recommendations();
                $totalRecords =$sel;
                ## Total number of records with filtering
                $sel=$this->Admin_model->Get_sanction_recommendations($searchValue);
                $totalRecordwithFilter =$sel;
                ## Fetch records
                $sel=$this->Admin_model->Get_sanction_recommendations_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
                $empRecords = $sel;
                            
                    $data = array();
                    foreach($empRecords as $row){
                       $edit ='<a href="'. base_url().'index.php/Admin/Sanction_recommendations_admin?ID='.$row->Customer_id.'&CM='.$row->recommended_to.'" Class="btn modal_test" target="_blank"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                       $documents = '<a class="dropdown-item" href="'. base_url().'index.php/credit_manager_user/Sanction_Documents?ID='.$row->Customer_id.'&CM=" target="_blank">
           			<button type="button" class="btn btn-success">View Documents </button> 
           		</a>';
                       $data[] = array(
                           "Name"=>$row->FN." ".$row->LN,
                           "Application_number"=>$row->application_number,
                           "Loan_Status"=>$row->Recommendation_status,
                           "last_updated"=>$row->form_submit_date,
                           "edit"=>$edit,
						    "documents"=>$documents,
                           
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


       public function Sanction_recommendations_admin()
      {

            if($this->session->userdata("USER_TYPE") == '')
            {
                $data['showNav'] = 0;
                $data['error'] = '';
                $data['age'] = '';
                $data['userType'] = "none";
                $this->load->view('login', $data);
            }
          else
            {
                $data['userType'] = $this->session->userdata("USER_TYPE");
                $id = $this->input->get("ID");
                $id1 = $this->input->get("CM");
                $data_row = $this->Customercrud_model->getProfileData($id);
                $data_row2= $this->Customercrud_model->getProfileData($id1);
                $data_row_more = $this->Customercrud_model->getProfileDataMore($id);
                $data_row_applied_loan= $this->Customercrud_model->getCustomerLoanAppliedInfo($id);
                $data_row_sanction_form= $this->credit_manager_user_model->getSanctionrecommendationData($id);        
                $data_row_remark = $this->credit_manager_user_model->getApprovalRemarkData_remark($id,$id1);
                $credit_analysis_data=$this->credit_manager_user_model->getCreditAnalysisData($id);
                $data_income_details=$this->credit_manager_user_model->getCustomerIncomeInfo($id);
                    $get_cluster_manager_name_list = $this->credit_manager_user_model->get_cluster_manager_name_list();
              
                $this->load->helper('url'); 
                $age = $this->session->userdata('AGE');
                $u_type = $this->session->userdata("USER_TYPE");
                $q = 1;
                if($u_type == 'DSA')$q = 2;
                if($data_row->PROFILE_PERCENTAGE == 100){
                    $age = 1;
                }else $age = 0;
                $data['showNav'] = $age;
                $data['age'] = $age;
                $data['userType'] = $this->session->userdata("USER_TYPE");
                $data['id'] = $id;
                $data['CM_ID'] =  $id1;
                $data['row'] = $data_row;
                $data['row_2'] = $data_row2;
                $data['row_more'] = $data_row_more;
                $data['data_row_applied_loan']=$data_row_applied_loan;
                $data['row_sanction']=$data_row_sanction_form;
                $data['row_remark'] =$data_row_remark ; 
                $data['credit_analysis_data']=$credit_analysis_data;    
                $data['data_income_details']=$data_income_details;
                $data['get_cluster_manager_name_list']=$get_cluster_manager_name_list;
                //$this->load->view('credit_manager_user/Sanction_dashbord', $data); 
                  $this->load->view('admin/admin_dashbord', $data);
                $this->load->view('admin/credit_sanction_loan_first_level', $data);
                

            } 
      }

       public function Admin_Sanction_recommendation_status()
    {
	
    
        $data=array(
                     'Customer_ID'=>$this->input->post('Customer_ID'),
                     'Recommendation_status'=>$this->input->post('Recommendation_status'),
                     'admin_comments'=>$this->input->post('admin_comments'),
					 
					 'final_loan_amount'=>$this->input->post('final_loan_amount'),
                     'roi'=>$this->input->post('final_roi'),
                     'final_tenure'=>$this->input->post('final_tenure'),
					 'EMI'=>$this->input->post('EMI'),
					     					 
                     'sanction_conditions'=>$this->input->post('sanction_conditions'),
                     'legal_conditions'=> $this->input->post('legal_conditions'),
                     'Recommendation_status_added_by'=>'Admin',
                     'form_submit_date'=>date('d-m-y'),
                    );
				
        $Customer_ID=$this->input->post('Customer_ID');
        $result = $this->credit_manager_user_model->update_recommendation_details($Customer_ID,$data);

        //update status of customer----------------------------------------------------------
        $array_customer_more_details = array(
                                'CUST_ID'  =>$Customer_ID,
                                'STATUS'  =>'Loan Recommendation Approved'
                                );
        $Result_id1 = $this->Customercrud_model->update_customer_more_details($Customer_ID, $array_customer_more_details);
        $array_input_more2 = array(
                                'loan_recommendation_date'=>date("Y/m/d")
                                );
                            
        $Result_id2 = $this->Customercrud_model->update_profile($Customer_ID,$array_input_more2);
        //-----------------------------------------------------------------------------------

         $data_row_sanction_form= $this->credit_manager_user_model->getSanctionrecommendationData($Customer_ID);
        $cluster_credit_manager_profile_data=$this->Dsacrud_model->getProfileData($data_row_sanction_form->recommended_to); 
        $credit_manager_profile_data=$this->Dsacrud_model->getProfileData($data_row_sanction_form->credit_manager_id);   

         $config['protocol']='smtp';
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
        $this->email->from($from_email, 'Finaleap Finserv');

        $status_by_CCM = $this->input->post('Recommendation_status');
        if($status_by_CCM =='Loan Recommendation Approved')    //------------send mail to ccm,CM,Admin,ALL
        {
            $send_email_to='amit@finaleap.com,vipul@finaleap.com,'.$credit_manager_profile_data->EMAIL.','.$cluster_credit_manager_profile_data->EMAIL.'';
           // $send_email_to='piyuabdagire@gmail.com,amit@finaleap.com'.$credit_manager_profile_data->EMAIL.','.$cluster_credit_manager_profile_data->EMAIL.'';
            $this->email->to($send_email_to);
            $this->email->subject('Sanction Recommendation Approved For :  '.$data_row_sanction_form->customer_name.''); 
            $Email_data=array(
                                 'Application_Id'=> $data_row_sanction_form->application_number,
                                 'Customer_name'=>$data_row_sanction_form->customer_name,
                                  'loan_type' =>$data_row_sanction_form->loan_type,
                                 'final_loan_amount'=>$data_row_sanction_form->final_loan_amount,
                                 'final_tenure' =>$data_row_sanction_form->final_tenure,
                                 'roi'=>$data_row_sanction_form->roi,
                                 'Submitted_by'=>$cluster_credit_manager_profile_data->FN." ".$cluster_credit_manager_profile_data->LN,
                                 'submission_date'=>date('d-m-y'),
                                 'Recommendation_status'=>$this->input->post('Recommendation_status'),
                                 'Recommendation_status_added_by' =>'Admin' ,
                                 );

            $data2['data']=$Email_data;
            $mailContent = $this->load->view('templates/sanction_recommendation_email',$data2,true);
            $this->email->message($mailContent); 
            $this->email->Send() ;
        }
        else if($status_by_CCM =='Reverted') // ------------send mail to perticular credit manager
        {
            //$send_email_to='piyuabdagire@gmail.com';   //$credit_manager_profile_data->EMAIL;
            $send_email_to=$cluster_credit_manager_profile_data->EMAIL;
            $this->email->to($send_email_to);
            $this->email->subject('Revert Changes For : '.$data_row_sanction_form->customer_name.''); 
              $Email_data=array(
                                 'Application_Id'=> $data_row_sanction_form->application_number,
                                 'Customer_name'=>$data_row_sanction_form->customer_name,
                                  'loan_type' =>$data_row_sanction_form->loan_type,
                                 'final_loan_amount'=>$data_row_sanction_form->final_loan_amount,
                                 'final_tenure' =>$data_row_sanction_form->final_tenure,
                                 'roi'=>$data_row_sanction_form->roi,
                                 'Submitted_by'=>$cluster_credit_manager_profile_data->FN." ".$cluster_credit_manager_profile_data->LN,
                                 'submission_date'=>date('d-m-y'),
                                 'Recommendation_status'=>$this->input->post('Recommendation_status'),
                                 'Recommendation_status_added_by' =>'Admin' ,
                                 'admin_comments' =>$this->input->post('admin_comments') ,
                                 );

            $data2['data']=$Email_data;
            $mailContent = $this->load->view('templates/sanction_recommendation_email',$data2,true);
            $this->email->message($mailContent); 
            $this->email->Send() ;
        }
        else if($status_by_CCM =='Rejected') // ------------send mail to perticular credit manager
        {
            //$send_email_to='piyuabdagire@gmail.com'; //$credit_manager_profile_data->EMAIL;
            $send_email_to='amit@finaleap.com,vipul@finaleap.com,'.$credit_manager_profile_data->EMAIL.','.$cluster_credit_manager_profile_data->EMAIL.'';
           // $send_email_to='piyuabdagire@gmail.com,amit@finaleap.com,'.$credit_manager_profile_data->EMAIL.','.$cluster_credit_manager_profile_data->EMAIL.'';
            $this->email->to($send_email_to);
            $this->email->subject('Sanction Recommendation Rejected For :  '.$data_row_sanction_form->customer_name.''); 
             $Email_data=array(
                                 'Application_Id'=> $data_row_sanction_form->application_number,
                                 'Customer_name'=>$data_row_sanction_form->customer_name,
                                  'loan_type' =>$data_row_sanction_form->loan_type,
                                 'final_loan_amount'=>$data_row_sanction_form->final_loan_amount,
                                 'final_tenure' =>$data_row_sanction_form->final_tenure,
                                 'roi'=>$data_row_sanction_form->roi,
                                 'Submitted_by'=>$cluster_credit_manager_profile_data->FN." ".$cluster_credit_manager_profile_data->LN,
                                 'submission_date'=>date('d-m-y'),
                                 'Recommendation_status'=>$this->input->post('Recommendation_status'),
                                 'Recommendation_status_added_by' =>'Admin' ,
                                 'Cluster_manager_Comments' =>$this->input->post('Cluster_manager_Comments') ,
                                 );

            $data2['data']=$Email_data;
            $mailContent = $this->load->view('templates/sanction_recommendation_email',$data2,true);
            $this->email->message($mailContent); 
            $this->email->Send() ;
        }




        $json = array (  
           'customer_id'=>$Customer_ID,
           'CM_ID'=>$this->input->post('CM_ID'),
           'msg'=>'success');
        echo json_encode($json);
   }
    /*-------------------- added by nnnn -----------------*/
	 
    public function FI()
    {
           
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
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv' ){
                redirect(base_url('index.php/admin'));
            }
            else{
                 $this->load->helper('url');  
                $age = $this->session->userdata('AGE');
               
                
                
                //$dsa_arr = $this->Admin_model->getTechnical();
                $data['row']=$this->Customercrud_model->getProfileData($id);          
                $data['showNav'] = 1;
                $data['age'] = $age;
               
                //$data['data'] = $dsa_arr;
                $data['userType'] = $this->session->userdata('USER_TYPE');
                $this->load->view('admin/admin_dashbord', $data);   
                //$this->load->view('admin/Technical', $data);
                $this->load->view('admin/FI_PG', $data);   


            }    
    }
public function customer_with_paginations_FI()
{
   

    # Read value
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    $searchValue = $_POST['search']['value']; // Search value



    ## Search
    $searchQuery = " ";
    ## Total number of records without filtering
    $sel=$this->Admin_model->Get_Total_No_Customer_FI();
    $totalRecords =$sel;
    ## Total number of records with filtering
    $sel=$this->Admin_model->Get_Customer_Filter_FI($searchValue);
    $totalRecordwithFilter =$sel;
    ## Fetch records
    $sel=$this->Admin_model->Get_Customer_With_Page_FI($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
    $empRecords = $sel;
    //return $empRecords
    //print_r($empRecords);
    
    $data = array();

    foreach($empRecords as $row){
      $link5='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                   
      $link6='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
     

      if($row->Profile_Status=="Complete") 
      {
       $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
        }
        else
         { 
           $incomplete='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
          
         } 
       $data[] = array(
           "FN"=>$row->FN." ".$row->LN,
           "Email"=>$row->EMAIL,
           "MOBILE"=>$row->MOBILE,
          
           "Profile_Status"=>$incomplete,
           "date"=>date("d-m-Y", strtotime($row->CREATED_AT)),
           "Actions"=>$link5,//." ".$link6,
           
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
public function RCU()
    {
           
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
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv' ){
                redirect(base_url('index.php/admin'));
            }
            else{
                 $this->load->helper('url');  
                $age = $this->session->userdata('AGE');
               
                
                
                //$dsa_arr = $this->Admin_model->getTechnical();
                $data['row']=$this->Customercrud_model->getProfileData($id);          
                $data['showNav'] = 1;
                $data['age'] = $age;
                  $banks = $this->Admin_model->getBanks();
			$cities = $this->Admin_model->getCity();
			  $data['banks'] = $banks;
			    $data['cities'] =$cities ;
                //$data['data'] = $dsa_arr;
                $data['userType'] = $this->session->userdata('USER_TYPE');
                $this->load->view('admin/admin_dashbord', $data);   
                //$this->load->view('admin/Technical', $data);
                $this->load->view('admin/RCU_PG', $data);   


            }    
    }
public function customer_with_paginations_PG()
{
   

    # Read value
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    $searchValue = $_POST['search']['value']; // Search value



    ## Search
    $searchQuery = " ";
    ## Total number of records without filtering
    $sel=$this->Admin_model->Get_Total_No_Customer_RCU();
    $totalRecords =$sel;
    ## Total number of records with filtering
    $sel=$this->Admin_model->Get_Customer_Filter_RCU($searchValue);
    $totalRecordwithFilter =$sel;
    ## Fetch records
    $sel=$this->Admin_model->Get_Customer_With_Page_RCU($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
    $empRecords = $sel;
    //return $empRecords
    //print_r($empRecords);
    
    $data = array();

    foreach($empRecords as $row){
      $link5='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                   
      $link6='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
     

      if($row->Profile_Status=="Complete") 
      {
       $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
        }
        else
         { 
           $incomplete='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
          
         } 
       $data[] = array(
           "FN"=>$row->FN." ".$row->LN,
           "Email"=>$row->EMAIL,
           "MOBILE"=>$row->MOBILE,
          
           "Profile_Status"=>$incomplete,
           "date"=>date("d-m-Y", strtotime($row->CREATED_AT)),
           "Actions"=>$link5,//." ".$link6,
           
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
/*------------------------- added by poapiha on 23_07_2022-----------------------------------*/


  public function Sanction_letter_status_CCM()
    {
        
         $config['protocol']='smtp';
            /*$config['smtp_host']='smtp.zoho.in';
            $config['smtp_port']='465';
            $config['smtp_timeout']='30';
            $config['smtp_crypto']='ssl';
            //$config['smtp_user']='info@finaleap.com';
            //$config['smtp_pass']='skP37cnpCIq0';
            //$config['smtp_user']='flconnect@finaleap.com';
            //$config['smtp_pass']='iNF0SYS@589';
            //$from_email = "flconnect@finaleap.com";
            $config['smtp_user']='flinfo@finaleap.com';
            $config['smtp_pass']='Qt@411037';*/
            $config['smtp_host']='smtp-relay.sendinblue.com';
            $config['smtp_port']='587';

            $config['smtp_crypto']='tls';
            $config['smtp_user']='flconnect@finaleap.com';
            $config['smtp_pass']='Qns9hEpIMJVwUFgZ'; 
            $from_email = "infoflfinserv@finaleap.com";
            $config['charset']='utf-8';
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
    
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            //$code = $this->generate_uuid();
            //$from_email = "info@finaleap.com";
            
            $this->email->from($from_email, 'Finaleap Finserv');

            


        $data=array(
                     'User_ID'=>$this->input->post('User_ID'),
                     'Status'=>$this->input->post('Status'),
                     'dsa_id'=>$this->input->post('dsa_id'),
                     'admin_comments'=>$this->input->post('admin_comments'),
                    );

        $Applicant_ID=$data['User_ID'];
        $user_info= $this->Operations_user_model->getProfileData($data['User_ID']);
        $dsa_info=$this->Operations_user_model->getProfileData($data['dsa_id']);
		
        $getCustomerSanction_letter_details=  $this->credit_manager_user_model->getCustomerSanction_letter_details($data['User_ID']);
        if($data['Status'] == 'approved')
        {
            $data2=array(
                     'last_updated'=>date("Y/m/d"),
                     'Status'=>"Submited for Approval",
                     'Status_added_by'=>"Cluster Credit Manager",
                      'admin_comments'=>$data['admin_comments']
                   );
            $array_customer_more_details = array(
                                'CUST_ID'  =>$Applicant_ID,
                                'STATUS'  =>'Loan Sanctioned'
                                );
             $this->Customercrud_model->update_customer_more_details($Applicant_ID, $array_customer_more_details);
       
        }
        else if($data['Status'] == 'Revert')
        {
             $data2=array(
                     'last_updated'=>date("Y/m/d"),
                     'Status'=>"Revert",
                     'Status_added_by'=>"Cluster Credit Manager",
                     'admin_comments'=>$data['admin_comments']
                   );

        }
        else if($data['Status'] == 'Rejected')
        {
             $data2=array(
                     'last_updated'=>date("Y/m/d"),
                     'Status'=>"Rejected",
                     'Status_added_by'=>"Cluster Credit Manager",
                     'admin_comments'=>$data['admin_comments']
                   );

                $array_customer_more_details = array(
                                'CUST_ID'  =>$Applicant_ID,
                                'STATUS'  =>'Sanction Rejected'
                                );
         $this->Customercrud_model->update_customer_more_details($Applicant_ID, $array_customer_more_details);
       

        }
         $Result_id1 = $this->credit_manager_user_model->update_sanction_letter_details($Applicant_ID, $data2);
        // update custoomer status



        //update status of customer----------------------------------------------------------
      $array_input_more2 = array(
                                'Sanctioned_date'=>date("Y/m/d")   
                                );
                            
        $Result_id2 = $this->Customercrud_model->update_profile($Applicant_ID,$array_input_more2);
        //-----------------------------------------------------------------------------------


          $customer_id=$this->input->post('User_ID');
             $getCustomerSanction_letter_details=  $this->credit_manager_user_model->getCustomerSanction_letter_details($customer_id);
             $user_info= $this->Operations_user_model->getProfileData($getCustomerSanction_letter_details->customer_id);
             $credit_manager_info= $this->Operations_user_model->getProfileData($getCustomerSanction_letter_details->credit_manager_id);

              $sanction_details=array(
                            'Customer_name'=> $user_info->FN." ".$user_info->LN,
                            'CM_Name'=>$credit_manager_info->FN." ".$credit_manager_info->LN,
                            'Letter_ID'=> $getCustomerSanction_letter_details->Letter_ID,
                            'loan_amount'=> $getCustomerSanction_letter_details->loan_amount,
                            'Submitted_date'=> $getCustomerSanction_letter_details->last_updated,
                            'Status'=> $getCustomerSanction_letter_details->Status,
                            'admin_comments'=> $getCustomerSanction_letter_details->admin_comments,
                            'Status_added_by'=> $getCustomerSanction_letter_details->Status_added_by,
                                );
             $mail_data['Customer_name']=$sanction_details['Customer_name'];
             $mail_data['CM_Name']=$sanction_details['CM_Name'];
             $mail_data['Letter_ID']=$sanction_details['Letter_ID'];
             $mail_data['loan_amount']=$sanction_details['loan_amount'];
             $mail_data['Submitted_date']=$sanction_details['Submitted_date'];
             $mail_data['Status']=$sanction_details['Status'];
             $mail_data['admin_comments']=$sanction_details['admin_comments'];
               $mail_data['Status_added_by']=$sanction_details['Status_added_by'];




          if($data['Status'] == 'approved')
        {
            
            $CM_MAil=$credit_manager_info->EMAIL;
             $send_email_to_3_HR='shiv@finaleap.com,amit@finaleap.com,vipul@finaleap.com,sachin.kardile@finaleap.com,'.$CM_MAil.'';
              // $send_email_to_3_HR='piyuabdagire@gmail.com,priyanka.abdagire@finaleap.com,backupfiles.priyanka@gmail.com,'.$CM_MAil.'';
             //$send_email_to_3_HR=$credit_manager_info->EMAIL;
                $this->email->to($send_email_to_3_HR);
                $this->email->subject('Sanctioned letter Approved For the customer :  '.$mail_data['Customer_name'].''); 
              //  $this->email->subject('System testing plz ignor this mail , Sanctioned letter submitted for Approval :  '.$sanction_details['Customer_name'].''); 
        }
        else if($data['Status'] == 'Revert')
        {
                 //$send_email_to_3_HR='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com,vipul@finaleap.com';
             //   $send_email_to_3_HR='piyuabdagire@gmail.com,priyanka.abdagire@finaleap.com,backupfiles.priyanka@gmail.com';
                 $send_email_to_3_HR=$credit_manager_info->EMAIL;
                $this->email->to($send_email_to_3_HR);
                $this->email->subject('Sanctioned letter Revert For the customer :  '.$mail_data['Customer_name'].'');
            //  $this->email->subject('System testing plz ignor this mail , Sanctioned letter submitted for Approval :  '.$sanction_details['Customer_name'].'');  
        }
        else if($data['Status'] == 'Rejected')
        {
            
              
              $send_email_to_3_HR='shiv@finaleap.com,amit@finaleap.com,vipul@finaleap.com';
               // $send_email_to_3_HR='piyuabdagire@gmail.com,priyanka.abdagire@finaleap.com,backupfiles.priyanka@gmail.com';
             //$send_email_to_3_HR=$credit_manager_info->EMAIL;
               $CM_MAil=$credit_manager_info->EMAIL;
               //  $send_email_to_3_HR='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com,vipul@finaleap.com,sachin.kardile@finaleap.com,'.$CM_MAil.'';
                $this->email->to($send_email_to_3_HR);
                $this->email->subject('Sanctioned letter Rejected For the customer :  '.$mail_data['Customer_name'].''); 
             //   $this->email->subject('System testing plz ignor this mail , Sanctioned letter submitted for Approval :  '.$sanction_details['Customer_name'].''); 
        }

            $mailContent = $this->load->view('templates/Sanction_letter_submitted',$mail_data,true);
            $this->email->message($mailContent); 
            $this->email->Send(); 

         $json = array (  
           'customer_id'=>$data['User_ID'],
           'CM_ID'=>$data['dsa_id'],
            'msg'=>'success'  );
        echo json_encode($json);
   }
 public function MSLV(){
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'){
            redirect(base_url('index.php/admin'));
        }else{
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
      
            $get_all_values= $this->Admin_model->get_all_values();
            $data['get_all_values'] = $get_all_values ;
            $data['showNav'] = 1;
            $data['age'] = $age;
          //  echo"<pre>";
          //  print_r( $get_all_values);
          //  echo"</pre>";
           // exit();
            $data['userType'] = $this->session->userdata('USER_TYPE');
            //$this->load->view('header', $data);             
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/MSLV', $data);   
        }        
    }
    public function update_sanction_letter_pdf_values()
    {
       $value_1 = $this->input->post('value_1');
       $value_2 = $this->input->post('value_2');
       $value_3 = $this->input->post('value_3');
       $value_4 = $this->input->post('value_4');
       $value_5 = $this->input->post('value_5');
       $value_6 = $this->input->post('value_6');
       $value_7 = $this->input->post('value_7');
       $value_8 = $this->input->post('value_8');
       $value_9 = $this->input->post('value_9');
       $value_10 = $this->input->post('value_10');
       $value_11 = $this->input->post('value_11');
       $value_12 = $this->input->post('value_12');
       $value_13= $this->input->post('value_13');
       $value_14 = $this->input->post('value_14');
       $value_15 = $this->input->post('value_15');
       $value_16 = $this->input->post('value_16');
       $value_17 = $this->input->post('value_17');
       $value_18 = $this->input->post('value_18');
       $value_19= $this->input->post('value_19');
       $value_20 = $this->input->post('value_20');
       $value_21 = $this->input->post('value_21');


        $updated_value=array(
                                'value_1'=> $value_1,
                                'value_2'=> $value_2,
                                'value_3'=> $value_3,
                                'value_4'=> $value_4,
                                'value_5'=> $value_5,
                                'value_6'=> $value_6,
                                'value_7'=> $value_7,
                                'value_8'=> $value_8,
                                'value_9'=> $value_9,
                                'value_10'=> $value_10,
                                'value_11'=> $value_11,
                                'value_12'=> $value_12,
                                'value_13'=> $value_13,
                                'value_14'=> $value_14,
                                'value_15'=> $value_15,
                                'value_16'=> $value_16,
                                'value_17'=> $value_17,
                                'value_18'=> $value_18,
                                'value_19'=> $value_19,
                                'value_20'=> $value_20,
                                'value_21'=> $value_21,
                            );

             $idS = $this->Admin_model->update_sanction_letter_pdf_values($updated_value);
              redirect(base_url('index.php/admin/MSLV'));

    }

    public function Processing_fee_receipt()
    {
        
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR'  || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['userType']=$this->session->userdata("USER_TYPE");
            $id = $this->input->get("ID");
            $customer_info = $this->Customercrud_model->getProfileData($id);
              $get_documents = $this->Customercrud_model->getDocuments($id);
              $data['get_documents']=$get_documents;
            $data['customer_info']=$customer_info;
            $getCustomerSanction_letter_details=  $this->credit_manager_user_model->getCustomerSanction_letter_details($id);
            $data['getCustomerSanction_letter_details']=$getCustomerSanction_letter_details;
            //print_r($customer_info);
            //exit();
            $this->load->view('admin/admin_dashbord',$data);             
            $this->load->view('admin/Processing_fee_receipt',$data); 
            
        }    
    }

    public function Submit_Processing_fee_details()
    {
        
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR'  || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['userType']=$this->session->userdata("USER_TYPE");
          
            $customer_id = $this->input->post('customer_id');
            $payment_recived_date = $this->input->post('payment_recived_date');
            $customer_info = $this->Customercrud_model->getProfileData($customer_id);
            $data['customer_info']=$customer_info;
            $values=array(
                'payment_recived_date'=>$payment_recived_date,
            );
            $this->Admin_model->update_processing_fee_details($customer_id,$values);
            $this->load->view('admin/admin_dashbord',$data);             
           // $this->load->view('admin/Sanction_letters'); 
              redirect(base_url('index.php/admin/Sanction_letters'));

            
        }
    }

     public function Disbursement_OPS()
    {
         if($this->session->userdata('USER_TYPE') == '' ){
            redirect(base_url('index.php/login'));
        }else{
             $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');

            $search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');
            if(!empty($search_))
            {
                $s='search';
                $search_name =$this->input->post('filter_name');    
            }
            else if (!empty($select_filters))
            {
                $s=$select_filters;
                $search_name=""; 
            }
            else
            {
                $s=$this->input->get('s');
                $search_name="";
            }

             if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['End_Date'];
         }
         else{
             $data['End_Date']='';
         }
         if(isset($_GET['filter']))
         {
                 $filter=$_GET['filter'];
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

          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
          $filter_location = $this->Admin_model->getLocationByData();
          $data['filter_location']=$filter_location ;
          $data['showNav'] = 1;
          $data['age'] = $age;
          $data['s'] = $s;
          $this->load->view('admin/admin_dashbord', $data);
          $this->load->view('admin/Disbursement_OPS_PG', $data);  
            
        }        
    }

        /*-------------------admin  Disbursement_OPS_Pagination------------------------->*/ 
            public function Disbursement_OPS_Pagination()
            {
     
                $Start_Date=$_POST['Start_Date'];
                $End_Date=$_POST['End_Date'];
                $filter_by=$_POST['filter'];
                $location=$_POST['location'];
                # Read value
                $draw = $_POST['draw'];
                $row = $_POST['start'];
                $rowperpage = $_POST['length']; // Rows display per page
                $columnIndex = $_POST['order'][0]['column']; // Column index
                $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                $searchValue = $_POST['search']['value']; // Search value
                $searchQuery = " ";
                $sel=$this->Admin_model->Get_Total_no_of_Disbursement_OPS($filter_by);
                $totalRecords =$sel;
                $sel=$this->Admin_model->Search_Disbursement_OPS($searchValue,$filter_by,$Start_Date,$End_Date,$filter_by,$location);
                $totalRecordwithFilter =$sel;
                $sel=$this->Admin_model->Disbursement_OPS_Data($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date,$filter_by,$location);
                $empRecords = $sel;
                $data = array();
                        foreach($empRecords as $row)
                        {
                            $link='<a style="margin-left: 8px;"'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                            $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
                     
                           if($row->IS_STRATEGIC_PARTNER == 0)
                           { 
                            $action='<form action="'.base_url().'index.php/admin/strategic_partner?partner=1&id='.$row->UNIQUE_CODE.'" method="GET" id="strategic_partner_add">
                                <button style="border-radius: 30px; text-align: center; display: inline; background-color: #e3eaed; color: black; font-size: 11px; padding-left: 5px; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">Convert To Strategic Parter</button>   
                            </form>';                           
                            }
                            else if($row->IS_STRATEGIC_PARTNER == 1)
                            {
                            $action='<form action="href="'.base_url().'index.php/admin/strategic_partner?partner=0&id='.$row->UNIQUE_CODE.'" method="GET"  id="strategic_partner_remove">
                             <td><button style="border-radius: 30px; text-align: center; display: inline; background-color: #e3eaed; color: black; font-size: 11px; padding-left: 5px; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">Remove From Strategic Parter</button>        
                            </form>';                                               
                            }
                      if($row->Profile_Status=="Complete") 
                      {
                       $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
                        }
                        else
                         { 
                           $incomplete='<h6 style="font-size: 10px; color: red">    INCOMPLETE PROFILE </h6>';
                          
                         } 
                       $data[] = array(
                           "FN"=>$row->FN." ".$row->LN,
                           "Email"=>$row->EMAIL,
                           "MOBILE"=>$row->MOBILE,
                           "Profile_Status"=>$incomplete,
                           "date"=>$row->CREATED_AT,
                           "Actions"=>$action,
                           "Action"=>$link,//." ".$link1,
                           
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
      //=================================== added by priya 05-09-2022
	  public function SMS_testing_1(){

        //$id = $this->input->get("ID");
        //echo $id;
        //exit();
	    $mobileno="9325983064";
        //$mobileno=$data['mobileno']; 
  
		 $var1=5000000;
		 $var2="FINPL000255";
		  $var3="2022-09-05";
		//  $message ='Dear Customer,We have received payment of Rs '.$var1.' as processing fees towards your loan application no '.$var2.' with Finaleap Finserv on '.$var3.'';
        // $message='Your one time login password for Finaleap is '.$OTP.'. This password will be valid for 10 min';
       // $message='Dear Customer, \nThank you for choosing FINALEAP. We regret to Inform that Your Loan Application No'.$OTP.' is rejected based on Current Assessment';
        // $message='Dear Customer, We have received payment of Rs {#var#} as login fees towards your application no {#var#} with Finaleap Finserv on {#var#}';
		$message='Your one time login password for Finaleap is '.$var1.'. This password will be valid for '.$var1.''.$var1.'';
		$message = urlencode($message); 
         $sender = 'FINALP'; 
         $apikey = '975cgeoe8x043trf759q7160r99060j02l';
         $baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;
         $url = $baseurl.'&sender='.$sender.'&to='.$mobileno.'&message='.$message;    
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_POST, false);
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $response = curl_exec($ch);
         curl_close($ch);
		 echo $response;
      if(!$response){
        echo "fail";
    }
	else
	{
         echo "success";
	}
    
    }


    //=========================== added by priya 17-09-2022
	public function Disbursement_cheques()
    {
        
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'HR'  || $this->session->userdata('SITE') != 'finserv')
        {       
            redirect(base_url('index.php/login'));
        }
        else
        {
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['userType']=$this->session->userdata("USER_TYPE");
			$login_user_id = $this->session->userdata('ID');
            $user_info= $this->Operations_user_model->getProfileData($login_user_id);
            $data['userID']=$user_info->UNIQUE_CODE;
		    $id = base64_decode($this->input->get("ID"));
            $customer_info = $this->Customercrud_model->getProfileData($id);
            $get_documents = $this->Customercrud_model->getDocuments($id);
			$data['sanction_details']=$this->Operations_user_model->getsanctionLetterDetails($id);
			$data['find_my_disbursement_amounts_data'] = $this->credit_manager_user_model->find_my_disbursement_amounts($id);
			$data['disbursement_details'] = $this->credit_manager_user_model->find_Disbursement_document_approval_data($id);
            $data['get_documents']=$get_documents;
            $data['customer_info']=$customer_info;
			$data['loan_details']=$this->Operations_user_model->getAplliedLoanDetails($id);
            $getCustomerSanction_letter_details=  $this->credit_manager_user_model->getCustomerSanction_letter_details($id);
            $data['getCustomerSanction_letter_details']=$getCustomerSanction_letter_details;
			
			//------------------- pre emi ----------------------------------
					$userid = $id;
					$sanction_details=$this->Operations_user_model->getsanctionLetterDetails($userid);
					$total_loan_amount = $sanction_details->total_loan_amount;
					$rate_of_interest = $sanction_details->rate_of_interest;
					$yearlyinterest = $total_loan_amount * $rate_of_interest/100;
					$dailyinterest = $yearlyinterest/360;
					$EMI = $sanction_details->EMI;
					if(!empty($data['disbursement_details']))
					{
					$Sanctioned_date = $data['disbursement_details']->disbursement_date;
					}
					else
					{
						$Sanctioned_date =date('d-m-Y');
					}
					$tenure = $sanction_details->tenure;
					$payment_recived_date = $sanction_details->payment_recived_date;
					$sanctiondatearr = explode("-",$payment_recived_date);
					$sanctionmonth = $sanctiondatearr[1];
					$nextyear = $sanctiondatearr[0];
					$nextmonth = $sanctiondatearr[1];
					if($sanctiondatearr[2] > 10)
					{
						$nextmonth = (int) ($sanctionmonth+1)%12;
						if($sanctionmonth == 12)
							{
								$nextyear = $nextyear+1;
							}
					}
					else
					{
						$nextmonth = (int)$sanctionmonth;
					}
					if($nextmonth < 10)
					{
						$nextmonth = "0".$nextmonth;
					}
					$nextday = 10;
					
					$row=$this->Customercrud_model->getProfileData($id);
					$data['row'] = $row;
					$data['sanction_details']=$this->Operations_user_model->getsanctionLetterDetails($userid);
					$nextdate = $nextyear."-".$nextmonth."-".$nextday;
					$date1=date_create($payment_recived_date);
					$date2=date_create($nextdate);
					$diff=date_diff($date1,$date2);
					$datediff = $diff->format("%a");
					$preemi = $dailyinterest*$datediff;
					$preemi = number_format((float)$preemi, 2, '.', '');
				
			//--------------------------------------------------------------
			
            $this->load->view('admin/admin_dashbord',$data);             
            $this->load->view('admin/Disbursement_cheques',$data); 
            
        }    
    }
	
	function update_cheque_details()
    {
		
         $data=array(
                     'mode_of_payment_'=>$this->input->post('mode_of_payment_'),
                     'Cheque_status_'=>$this->input->post('Cheque_status_'),
					 'Transaction_id_'=>$this->input->post('Transaction_id_'),
					 'total_amount_'=>$this->input->post('total_amount_'),
					 'amount_handover_date_'=>$this->input->post('amount_handover_date_'),
				     'customer_name_'=>$this->input->post('customer_name_'),
					 'checque_bank_name_'=>$this->input->post('checque_bank_name_'),
					 'comments_'=>$this->input->post('comments_'),
					 'login_user_unique_code'=>$this->input->post('login_user_unique_code'),
					 'applicant_unique_code'=>$this->input->post('applicant_unique_code'),
					 'cheque_number_'=>$this->input->post('cheque_number_'),
					  'account_type_'=>$this->input->post('account_type_'),
					  'transaction_throught_'=>$this->input->post('transaction_throught_'),
					   'cheque_id'=>$this->input->post('cheque_id'),
					    'action'=>$this->input->post('action'),
                     );
					 $mode_of_payment = $this->input->post('mode_of_payment_');
					 if($data['action'] == 'from_accounts')
					 {
						 $status = $this->input->post('Cheque_status_');
					 }
					 else if($data['action'] == 'from_OPS')
					 {
						 $status ="applied";
					 }
					 
					 if( $data['mode_of_payment_']== 'CHEQUE')
					 {
						 $update_data=array(
					
						 'Cheque_status'=> $status,
						 'Transaction_id'=>$this->input->post('Transaction_id_'),
						 'total_amount'=>$this->input->post('total_amount_'),
						 'amount_handover_date'=>$this->input->post('amount_handover_date_'),
						 'customer_name'=>$this->input->post('customer_name_'),
						 'checque_bank_name'=>$this->input->post('checque_bank_name_'),
						 'cheque_comments'=>$this->input->post('comments_'),
						// 'cheque_number'=>$this->input->post('cheque_number'),
						 'account_type'=>$this->input->post('account_type_'),
						 'cheque_status_by'=>$this->input->post('login_user_unique_code'),
						  );
					 }
					 else
					 {
						 $update_data=array(

						 'Cheque_status'=> $status,
						 'Transaction_id'=>$this->input->post('Transaction_id_'),
						 'total_amount'=>$this->input->post('total_amount_'),
						  'cheque_comments'=>$this->input->post('comments_'),
						   'customer_name'=>$this->input->post('customer_name_'),
						 'checque_bank_name'=>$this->input->post('checque_bank_name_'),
						 'amount_handover_date'=>$this->input->post('amount_handover_date_'),
						 'transaction_throught'=>$this->input->post('transaction_throught_'),
						 'cheque_status_by'=>$this->input->post('login_user_unique_code'),
						  );
					 }
					 
		 //==============================================send email to accounts
			            $credit_manager_info= $this->Operations_user_model->getProfileData($data['login_user_unique_code']);
						$customer_info = $this->Operations_user_model->getProfileData($data['applicant_unique_code']);
						$getCustomerSanction_letter_details=  $this->credit_manager_user_model->getCustomerSanction_letter_details($data['applicant_unique_code']);
						//$data['disbursement_details'] = $this->credit_manager_user_model->find_my_disbursement_amounts($data['applicant_unique_code']);
						
						$customer_name =$customer_info->FN." ".$customer_info->LN;
								$config['protocol']=PROTOCOL;
						$config['smtp_host']=SMTP_HOST; 
						$config['smtp_port']=SMTP_PORT; 
						$config['smtp_timeout']=SMTP_TIMEOUT;
						$config['smtp_crypto']=SMTP_CRYPTO; 
						$config['smtp_user']=SMTP_USER; 
						$config['smtp_pass']=SMTP_PASS;
						$from_email = FROM_EMAIL; 
						$config['charset']=CHARSET;
						$config['newline']=NEWLINE;
						$config['wordwrap'] = WORDWRAP2;
						$config['mailtype'] = 'html';
						$this->email->initialize($config);
						$this->email->set_newline("\r\n");
						$this->email->from($from_email, 'Finaleap Finserv');
						//$CM_MAil=$credit_manager_info->EMAIL;
                       //$send_email_to_3_HR='shiv@finaleap.com,priyanka.abdagire@finaleap.com,amit@finaleap.com,vipul@finaleap.com,sachin.kardile@finaleap.com,'.$CM_MAil.',sunil.kalan@finaleap.com';
						$send_email_to_3_HR="piyuabdagire@gmail.com"; 
						$send_email_to_3_HR="operations@finaleap.com"; 
						$this->email->to($send_email_to_3_HR);
						//$this->email->cc('credit@finaleap.com,accountsfin@finaleap.com,amit@finaleap.com,vipul@finaleap.com,sachin.kardile@finaleap.com');
						//$this->email->bcc('info@finaleap.com');
							$mail_data['added_by']= $credit_manager_info->FN." ".$credit_manager_info->LN;
						    $mail_data['Amount']=$data['total_amount_'];
						
							$mail_data['PayeeName']=$data['customer_name_'];
							$mail_data['PayeeBankName']=$data['checque_bank_name_'];
							$mail_data['AccountChequeNumber']=$data['cheque_number_'];
							$mail_data['AccountType']=$data['account_type_'];
							$mail_data['AmountHandoverDate']=$data['amount_handover_date_'];
						
						
							$mail_data['ModeOfPayment']= $mode_of_payment;
							$mail_data['transaction_throught']=$data['transaction_throught_'];
							$mail_data['TransactionID']=$data['Transaction_id_'];
					    
						$this->email->subject('Disbursement Cheque/NEFT Request Approved For The Customer '. $customer_name .''); 
						$mailContent = $this->load->view('templates/Disbursement_cheque_approved',$mail_data,true);
						$this->email->message($mailContent); 
						if($this->email->Send())
						{
							  $idS = $this->Admin_model->update_disbursement_cheque_status($update_data,$data['applicant_unique_code'],$data['cheque_id']);
							
							 $json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json);
								
			
						}
						else
						{
							$json = array (  
											'status'=>"error",
										  );
									 echo json_encode($json); 
						}
							
			//=====================================================================
		
    }
	
function delete_disbursement_cheque_document()
    {
         $data=array(
                     'Delete_Document_number'=>$this->input->post('Delete_Document_number'),
                    );
          $delete=$this->credit_manager_user_model->delete_disbursement_cheque_document($data['Delete_Document_number']);
		  
		   $data2=array(
                     'document_inserted_id'=>'',
                    );
		   $update=$this->credit_manager_user_model->update_disbursement_cheque_document_entry($data['Delete_Document_number'],$data2);
         $json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json);
    }
	//==================== added by priya 22-09-2022
	
	function upload_new_cheque_file()
    {
            $data=array(
                     'UploadFile_for_cheque_no'=>$this->input->post('UploadFile_for_cheque_no'),
					 	'login_user_unique_code'=>$this->input->post('login_user_unique_code'),
					'applicant_unique_code'=>$this->input->post('applicant_unique_code'),
                    );
			    if(!empty($_FILES['file']['name']))
			    {
					$login_user_id =$data['login_user_unique_code'];
					//echo  $login_user_id;
					$user_info= $this->Operations_user_model->getProfileData($login_user_id);
					//print_r($user_info);
					$login_user_name = $user_info->FN." ".$user_info->LN;
					$customer_id=$data['applicant_unique_code'];
					$uploded_by_user=$data['login_user_unique_code'];
					$document_name=$_FILES['file']['name'];
					$customer_details = $this->Customercrud_model->getProfileData($customer_id);
					$time = time();
					$dir = $customer_details->ID."/";
					$dirname = "Finserv/customers/".$dir;
								 $curlurl = "curl -X MKCOL -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
								  exec($curlurl);
							 
					$fileextensionarr = explode(".",$_FILES["file"]["name"]);
					$fileextension = $fileextensionarr[1];
					$filename = "disbursement_amount_doc".$time.".".$fileextension;
					$dirname = "Finserv/customers/".$dir;
					$filenamewithdir = $dirname.$filename;
					$correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["file"]["tmp_name"]."";
					exec($correcturl);
					$file_input_arr = array(
								'USER_ID' => $customer_id,
								'DOC_TYPE' =>'DISBURSEMENT AMOUNT ATTACHMENTS',	
								'DOC_NAME' => $filename,
								'DOC_SIZE' => $_FILES['file']['size'],
								'DOC_FILE_TYPE' => $_FILES['file']['type'],
								'DOC_MASTER_TYPE' => 'DISBURSEMENT AMOUNT ATTACHMENTS',
								'doc_cloud_name' => $filename,
								'doc_cloud_dir' => $dirname,
								'DOC_UPLOAD_DATE'=>date("d/m/Y"),
										);
					$docid = $this->Customercrud_model->saveDocuments($file_input_arr);
					}
					else
					{
						$docid= '';
					}
			 
			
			$data2=array(
                  'document_inserted_id'=>$docid,
                  );
		   $update=$this->credit_manager_user_model->update_uplodede_cheque_entry($data['UploadFile_for_cheque_no'],$data2);
           $json = array (  
                            'status'=>"success",
                              );
                             echo json_encode($json);
    }
    /*------------------------------- addded by papiha 23_09_2022--------------------------------------------------------------*/
    public function MIS()
     {
            
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
         if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN'  || $this->session->userdata('SITE') != 'finserv'){
                 redirect(base_url('index.php/admin'));
             }
             else{
                  $this->load->helper('url');  
                 $age = $this->session->userdata('AGE');
                
                 
                 
                 //$dsa_arr = $this->Admin_model->getTechnical();
                 $data['row']=$this->Customercrud_model->getProfileData($id);          
                 $data['showNav'] = 1;
                 $data['age'] = $age;
                
                 //$data['data'] = $dsa_arr;
                 $data['userType'] = $this->session->userdata('USER_TYPE');
                 $this->load->view('admin/admin_dashbord', $data);   
                 //$this->load->view('admin/Technical', $data);
                 $this->load->view('admin/MIS_PG', $data);   


             }    
     }
    public function MIS_PG()
    {
        

        # Read value
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; // Rows display per page
        $columnIndex = $_POST['order'][0]['column']; // Column index
        $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        $searchValue = $_POST['search']['value']; // Search value



        ## Search
        $searchQuery = " ";
        ## Total number of records without filtering
        $sel=$this->Admin_model->Get_Total_No_MIS();
        $totalRecords =$sel;
        ## Total number of records with filtering
        $sel=$this->Admin_model->Get_Filter_MIS($searchValue);
        $totalRecordwithFilter =$sel;
        ## Fetch records
        $sel=$this->Admin_model->Get_With_Page_MIS($searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
        $empRecords = $sel;
        //return $empRecords
        //print_r($empRecords);
        
        $data = array();

        foreach($empRecords as $row){
        $link5='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                        
        $link6='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
        

        if($row->Profile_Status=="Complete") 
        {
            $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
            }
            else
            { 
                $incomplete='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
            
            } 
            $data[] = array(
                "FN"=>$row->FN." ".$row->LN,
                "Email"=>$row->EMAIL,
                "MOBILE"=>$row->MOBILE,
            
                "Profile_Status"=>$incomplete,
                "date"=>date("d-m-Y", strtotime($row->CREATED_AT)),
                "Actions"=>$link5,//." ".$link6,
                
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
//---------------------------------------------------- added by priya 24-09-2022
     public function Business_Head()
	 {
		  
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s=='')
			{
				$s='all';
			}
     	    $Business_Head_arr = $this->Admin_model->getBusiness_Head($s);
            $_SESSION["data_for_excel"] = $Business_Head_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['data'] =$Business_Head_arr;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/Business_Head', $data);   
			
        }        
	 }
//---------------------------------------------------- added by priya
     public function Chief_Risk_Officer()
	 {
		  
        if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'ADMIN' || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			if($s=='')
			{
				$s='all';
			}
     	    $Chief_Risk_Officer_arr = $this->Admin_model->getChief_Risk_Officer($s);
            $_SESSION["data_for_excel"] = $Chief_Risk_Officer_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['data'] =$Chief_Risk_Officer_arr;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('admin/Chief_Risk_Officer', $data);   
			
        }        
	 }

//--------------------- added by priya 24-09-2022
 public function All_users()
 {
         $userType=$this->session->userdata("USER_TYPE"); 
         $dashboard_data = $this->Admin_model->getDashboardData(); 
         $age = $this->session->userdata('AGE');
         $data['customers']=$dashboard_data['cust_count'];
         
         $data['showNav'] = 1;
         $data['age'] = $age;
         $data['userType'] = $this->session->userdata("USER_TYPE");   
         $arr['userType'] = $userType;
         if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['End_Date'];
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
          if(isset($_GET['RB']))
         {
           $data['RB']=$_GET['RB'];
         }
         else
         {
             $data['RB']='';
         }
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
        //$arr['customers'] = $customers;

         $Reffered_by = $this->Admin_model->getReferredByData();
              $filter_location = $this->Admin_model->getLocationByData();

            $arr['Reffered_by']=$Reffered_by ;
             $arr['filter_location']=$filter_location ;
      
         $this->load->view('admin/admin_dashbord', $data);
         $this->load->view('admin/all_users', $arr);
         
 }
	
public function All_users_PG()
{
  
   
   

  /*-------------------------- For Cluster---------------------------*/
  $userType=$this->session->userdata("USER_TYPE");  
 
  
 
  # Read value
  $draw = $_POST['draw'];
  $row = $_POST['start'];
  $rowperpage = $_POST['length']; // Rows display per page
  $columnIndex = $_POST['order'][0]['column']; // Column index
  $Start_Date=$_POST['Start_Date'];
  
  $End_Date=$_POST['End_Date'];
  $filter_by=$_POST['filter'];

  $Reffered_by=$_POST['Reffered_by'];
   $location=$_POST['location'];
 
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->get_all_users();
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->get_all_users_Admin_filter($searchValue,$filter_by,$Start_Date,$End_Date, $Reffered_by, $location);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->get_all_users_Admin_filter_pagination($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date, $Reffered_by, $location);
  $empRecords = $sel;
  $data = array();

  foreach($empRecords as $row){
       /*---------------------- cam-----------------------------------*/
         

      $data[] = array(
              "ID"=>$row->ID,
              "FN"=>$row->FN.' '.$row->LN,
              "Delete"=>'<a  href="'.base_url().'index.php/Admin/Delete_USER_DATA?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-trash" style="color:red;"></i></a>'
         
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

function Delete_USER_DATA()
{
    $id = $this->input->get('ID');
	$data_coapplicant=$this->credit_manager_user_model->getCoapplicantById($id);
	if(!empty($data_coapplicant))
	{
		foreach ($data_coapplicant as $d)
		{
			$coapp = $d->UNIQUE_CODE;
			$this->Admin_model->delete_coapp_data($coapp);
		}
	}
	$this->Admin_model->delete_user_data($id);
	$this->All_users();
}
//===================================== added by priya ======================================================================
//===================================== added by priya ======================================================================
public function Area_managers_ClusterManager()
 {
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
     $id = $this->session->userdata('ID');
     $Branch_manger=$this->Admin_model->get_cluster_BM_Branch_Manager($id);
     $Relationship=$this->Admin_model->get_RO_BM_BM($Branch_manger);
     $DSA=$this->Admin_model->get_DSA_BM_BM($Branch_manger,$Relationship,$id);
     $BranchManager = $this->Admin_model->get_all_BM_cluster($Branch_manger,$Relationship,$DSA,$id,$filter_by);
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
     
     $arr['BranchManager'] = $BranchManager;
      $arr['login_id']=$id ;
     $this->load->view('dashboard_header', $data);
     
     $this->load->view('admin/Area_managers_ClusterManager_PG', $arr);
     
 }
 
 public function Area_managers_ClusterManager_PG()
 {
					  $login_id=$this->input->post('login_id');
					  $filter_by=$this->input->post('filter');
                        $Start_Date=$_POST['Start_Date'];
                       $End_Date=$_POST['End_Date'];
                       $filter_by=$_POST['filter'];
                        $location=$_POST['location'];

                        # Read value
                        $draw = $_POST['draw'];
                        $row = $_POST['start'];
                        $rowperpage = $_POST['length']; // Rows display per page
                        $columnIndex = $_POST['order'][0]['column']; // Column index
                        $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                        $searchValue = $_POST['search']['value']; // Search value
                
                
                
                        ## Search
                        $searchQuery = " ";
                        ## Total number of records without filtering
                        $sel=$this->Admin_model->Get_my_Cluster($filter_by,$login_id);
                        $totalRecords =$sel;
                        ## Total number of records with filtering
                       $sel=$this->Admin_model->search_my_Cluster($searchValue,$filter_by,$Start_Date,$End_Date, $location,$login_id);
                        $totalRecordwithFilter =$sel;
                        ## Fetch records
                       $sel=$this->Admin_model->show_my_Cluster($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date,$location,$login_id);
                        $empRecords = $sel;
                        //return $empRecords
                        //print_r($empRecords);
                        
                            $data = array();
                
                            foreach($empRecords as $row){
                              $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                                           
                              $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
                             
           
                              if($row->Profile_Status=="Complete") 
                              {
                               $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
                                }
                                else
                                 { 
                                   $incomplete='<h6 style="font-size: 10px; color: red">    INCOMPLETE PROFILE </h6>';
                                  
                                 } 
                               $data[] = array(
                                   "FN"=>$row->FN." ".$row->LN,
                                   "Email"=>$row->EMAIL,
                                   "MOBILE"=>$row->MOBILE,
                                   "LOCATION"=>$row->Location,
                                   "Profile_Status"=>$incomplete,
                                   "date"=>$row->CREATED_AT,
                                   "Action"=>$link,//." ".$link1,
                                   
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
     //please comment previous data 
 }
 
 public function Area_managers_BM()
 {
	  if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'Area_Manager'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
        else
        {
			     $id = $this->session->userdata('ID');
				
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			 $data['userType'] = $this->session->userdata("USER_TYPE");  
            $search_name ='';
            $search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');

            if(!empty($search_))
            {
                $s='search';
                $search_name =$this->input->post('filter_name');    
            }
            else if(!empty($select_filters))
            {
                $s=$select_filters;
                $search_name="";
            }
            else
            {
                $s = $this->input->get('s');
                $search_name="";
            }


               if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['End_Date'];
         }
         else{
             $data['End_Date']='';
         }
         if(isset($_GET['filter']))
         {
                 $filter=$_GET['filter'];
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
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }


          //  $branch_manager_arr = $this->Admin_model->getBranchManagers($s,$search_name);
          //   $_SESSION["data_for_excel"] = $branch_manager_arr;
            $filter_location = $this->Admin_model->getLocationByData();
            $data['filter_location']=$filter_location ;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           // $data['data'] =$branch_manager_arr;
            $this->load->view('admin/admin_dashbord', $data);
			   $data['login_id']=$id ;
           // $this->load->view('admin/branch_managers', $data);   
           $this->load->view('admin/Area_managers_branch_managers_PG', $data); 
            
        }        
 }
  public function Area_managers_branch_managers_PG()
                 {
                      $login_id=$this->input->post('login_id');
					  $MY_Cluster_managers=$this->Admin_model->get_area_managers_CM($login_id); 
					 // print_r( $MY_Cluster_managers)."<br>";
					  $MY_Cluster_managers_BM=$this->Admin_model->get_area_managers_cluster_managers_BM($MY_Cluster_managers);
				// print_r( $MY_Cluster_managers_BM);
				// exit();
				      $Start_Date=$_POST['Start_Date'];
                      $End_Date=$_POST['End_Date'];
                      $filter_by=$_POST['filter'];
                       $location=$_POST['location'];
                     # Read value
                     $draw = $_POST['draw'];
                     $row = $_POST['start'];
                     $rowperpage = $_POST['length']; // Rows display per page
                     $columnIndex = $_POST['order'][0]['column']; // Column index
                     $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                     $searchValue = $_POST['search']['value']; // Search value
             
             
             
                     ## Search
                     $searchQuery = " ";
                     ## Total number of records without filtering
                     $sel=$this->Admin_model->Get_AMS_Branch_MAnagers($filter_by,$MY_Cluster_managers_BM);
                     $totalRecords =$sel;
                     ## Total number of records with filtering
                    $sel=$this->Admin_model->search_AMS_Branch_MAnagers($searchValue,$filter_by,$Start_Date,$End_Date,$location,$MY_Cluster_managers_BM);
                     $totalRecordwithFilter =$sel;
                     ## Fetch records
                     $sel=$this->Admin_model->show_AMS_Branch_MAnagers($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date,$location,$MY_Cluster_managers_BM);
                     $empRecords = $sel;
                     //return $empRecords
                     //print_r($empRecords);
                     
                         $data = array();
             
                         foreach($empRecords as $row){
                           $link='<a style="margin-left: 8px;"'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                                        
                           $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
                          
        
                           if($row->IS_STRATEGIC_PARTNER == 0)
                           {    
                            $action='<form action="'.base_url().'index.php/admin/strategic_partner?partner=1&id='.$row->UNIQUE_CODE.'" method="GET" id="strategic_partner_add">
                                <button style="border-radius: 30px; text-align: center; display: inline; background-color: #e3eaed; color: black; font-size: 11px; padding-left: 5px; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">Convert To Strategic Parter</button>  
                             </form>';                          
                           }
                           else if($row->IS_STRATEGIC_PARTNER == 1)
                           {
                            $action='<form action="href="'.base_url().'index.php/admin/strategic_partner?partner=0&id='.$row->UNIQUE_CODE.'" method="GET"  id="strategic_partner_remove">
                              <td><button style="border-radius: 30px; text-align: center; display: inline; background-color: #e3eaed; color: black; font-size: 11px; padding-left: 5px; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">Remove From Strategic Parter</button>       
                             </form>';                                              
                           }
                           if($row->Profile_Status=="Complete") 
                           {
                            $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
                             }
                             else
                              { 
                                $incomplete='<h6 style="font-size: 10px; color: red">   INCOMPLETE PROFILE </h6>';
                               
                              } 
                            $data[] = array(
                                "FN"=>$row->FN." ".$row->LN,
                                "Email"=>$row->EMAIL,
                                "MOBILE"=>$row->MOBILE,
                                "LOCATION"=>$row->Location,
                                "Profile_Status"=>$incomplete,
                                "date"=>$row->CREATED_AT,
                                "Actions"=>$action,
                                "Action"=>$link,//." ".$link1,
                                
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
					
	public function Area_managers_RO()
	{
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'Area_Manager'  || $this->session->userdata('SITE') != 'finserv'){
            redirect(base_url('index.php/admin'));
        }
        else
        {
			     $id = $this->session->userdata('ID');
				
            $this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
			 $data['userType'] = $this->session->userdata("USER_TYPE");  
            $search_name ='';
            $search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');

            if(!empty($search_))
            {
                $s='search';
                $search_name =$this->input->post('filter_name');    
            }
            else if(!empty($select_filters))
            {
                $s=$select_filters;
                $search_name="";
            }
            else
            {
                $s = $this->input->get('s');
                $search_name="";
            }


               if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['End_Date'];
         }
         else{
             $data['End_Date']='';
         }
         if(isset($_GET['filter']))
         {
                 $filter=$_GET['filter'];
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
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }


          //  $branch_manager_arr = $this->Admin_model->getBranchManagers($s,$search_name);
          //   $_SESSION["data_for_excel"] = $branch_manager_arr;
            $filter_location = $this->Admin_model->getLocationByData();
            $data['filter_location']=$filter_location ;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           // $data['data'] =$branch_manager_arr;
            $this->load->view('admin/admin_dashbord', $data);
			   $data['login_id']=$id ;
           // $this->load->view('admin/branch_managers', $data);   
           $this->load->view('admin/Area_managers_RO_PG', $data);   
	}}
	 public function Area_managers_RO_PG()
                 {
                      $login_id=$this->input->post('login_id');
					  $MY_Cluster_managers=$this->Admin_model->get_area_managers_CM($login_id); 
					  //print_r( $MY_Cluster_managers)."<br>";
					  $MY_Cluster_managers_BM=$this->Admin_model->get_area_managers_cluster_managers_BM($MY_Cluster_managers);
					  //print_r( $MY_Cluster_managers_BM)."<br>";
					  $ROS=$this->Admin_model->get_RO_BM($MY_Cluster_managers_BM);
					   //  print_r( $ROS)."<br>";
						// exit();
                        $Start_Date=$_POST['Start_Date'];
                       $End_Date=$_POST['End_Date'];
                       $filter_by=$_POST['filter'];
                        $location=$_POST['location'];
                     # Read value
                     $draw = $_POST['draw'];
                     $row = $_POST['start'];
                     $rowperpage = $_POST['length']; // Rows display per page
                     $columnIndex = $_POST['order'][0]['column']; // Column index
                     $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
                     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
                     $searchValue = $_POST['search']['value']; // Search value
             
             
             
                     ## Search
                     $searchQuery = " ";
                     ## Total number of records without filtering
                     $sel=$this->Admin_model->Get_AMS_RO($filter_by,$ROS, $MY_Cluster_managers_BM,$MY_Cluster_managers);
                     $totalRecords =$sel;
                     ## Total number of records with filtering
                    $sel=$this->Admin_model->search_AMS_RO($searchValue,$filter_by,$Start_Date,$End_Date,$location,$ROS, $MY_Cluster_managers_BM,$MY_Cluster_managers);
                     $totalRecordwithFilter =$sel;
                     ## Fetch records
                     $sel=$this->Admin_model->show_AMS_RO($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date,$location,$ROS, $MY_Cluster_managers_BM,$MY_Cluster_managers);
                     $empRecords = $sel;
                     //return $empRecords
                     //print_r($empRecords);
                     
                         $data = array();
             
                         foreach($empRecords as $row){
                           $link='<a style="margin-left: 8px;"'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                                        
                           $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
                          
        
                           if($row->IS_STRATEGIC_PARTNER == 0)
                           {    
                            $action='<form action="'.base_url().'index.php/admin/strategic_partner?partner=1&id='.$row->UNIQUE_CODE.'" method="GET" id="strategic_partner_add">
                                <button style="border-radius: 30px; text-align: center; display: inline; background-color: #e3eaed; color: black; font-size: 11px; padding-left: 5px; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">Convert To Strategic Parter</button>  
                             </form>';                          
                           }
                           else if($row->IS_STRATEGIC_PARTNER == 1)
                           {
                            $action='<form action="href="'.base_url().'index.php/admin/strategic_partner?partner=0&id='.$row->UNIQUE_CODE.'" method="GET"  id="strategic_partner_remove">
                              <td><button style="border-radius: 30px; text-align: center; display: inline; background-color: #e3eaed; color: black; font-size: 11px; padding-left: 5px; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">Remove From Strategic Parter</button>       
                             </form>';                                              
                           }
                           if($row->Profile_Status=="Complete") 
                           {
                            $incomplete='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
                             }
                             else
                              { 
                                $incomplete='<h6 style="font-size: 10px; color: red">   INCOMPLETE PROFILE </h6>';
                               
                              } 
                            $data[] = array(
                                "FN"=>$row->FN." ".$row->LN,
                                "Email"=>$row->EMAIL,
                                "MOBILE"=>$row->MOBILE,
                                "LOCATION"=>$row->Location,
                                "Profile_Status"=>$incomplete,
                                "date"=>$row->CREATED_AT,
                                "Actions"=>$action,
                                "Action"=>$link,//." ".$link1,
                                
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
					
	public function Area_managers_customers()
 {
      $userType=$this->session->userdata("USER_TYPE"); 
	  $id = $this->session->userdata('ID');
         $dashboard_data = $this->Admin_model->getDashboardData(); 
         $age = $this->session->userdata('AGE');
         $data['customers']=$dashboard_data['cust_count'];
         
         $data['showNav'] = 1;
         $data['age'] = $age;
         $data['userType'] = $this->session->userdata("USER_TYPE");   
         $arr['userType'] = $userType;
         if(isset($_GET['Start_Date']))
         {
           $data['Start_date']=$_GET['Start_Date'];
         }else{
             $data['Start_date']='';
         }
         if(isset($_GET['End_Date']))
         {
           $data['End_Date']=$_GET['End_Date'];
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
          if(isset($_GET['RB']))
         {
           $data['RB']=$_GET['RB'];
         }
         else
         {
             $data['RB']='';
         }
          if(isset($_GET['l']))
         {
           $data['location']=$_GET['l'];
         }
         else
         {
             $data['location']='';
         }
        //$arr['customers'] = $customers;

         $Reffered_by = $this->Admin_model->getReferredByData();
              $filter_location = $this->Admin_model->getLocationByData();

            $arr['Reffered_by']=$Reffered_by ;
             $arr['filter_location']=$filter_location ;
      
         $this->load->view('admin/admin_dashbord', $data);
        // $this->load->view('admin/admin_customers', $arr);
     	   $arr['login_id']=$id ;
     $this->load->view('admin/Area_managers_customer_PG',$arr);
     
 }
  public function Area_managers_customer_PG()
 {
      

  /*-------------------------- For Cluster---------------------------*/
  $userType=$this->session->userdata("USER_TYPE");  
 
  
 
  # Read value
      $login_id=$this->input->post('login_id');
	 // echo $login_id."<br>";
	  
	  $MY_Cluster_managers=$this->Admin_model->get_area_managers_CM($login_id); 
	  // print_r(  $MY_Cluster_managers)."<br>";
	  $MY_Cluster_managers_BM=$this->Admin_model->get_area_managers_cluster_managers_BM($MY_Cluster_managers);
	  //  print_r(  $MY_Cluster_managers_BM)."<br>";
	  $ROS=$this->Admin_model->get_All_RO_AM($MY_Cluster_managers_BM,$MY_Cluster_managers,$login_id);
	  $sales_id=$this->Admin_model->get_Sales_BM($MY_Cluster_managers_BM);
	 // print_r( $sales_id)."<br>";
	  
     $DSA=$this->Admin_model->get_DSA_BM($MY_Cluster_managers_BM,$ROS,$MY_Cluster_managers);
     // print_r( $DSA)."<br>";
	  //    print_r(  $ROS);			  
	  // exit();
  $draw = $_POST['draw'];
  $row = $_POST['start'];
  $rowperpage = $_POST['length']; // Rows display per page
  $columnIndex = $_POST['order'][0]['column']; // Column index
  $Start_Date=$_POST['Start_Date'];
  
  $End_Date=$_POST['End_Date'];
  $filter_by=$_POST['filter'];

  $Reffered_by=$_POST['Reffered_by'];
   $location=$_POST['location'];
 
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value
  ## Search
  $searchQuery = " ";
  ## Total number of records without filtering
  $sel = $this->Admin_model->Area_managers_customers($login_id, $MY_Cluster_managers,$MY_Cluster_managers_BM, $ROS, $sales_id,  $DSA);
  
 // $sel=$this->Admin_model->Get_Total_No_Customer();
  $totalRecords =$sel;
  ## Total number of records with filtering
  $sel=$this->Admin_model->Search_Area_managers_customers($searchValue,$filter_by,$Start_Date,$End_Date, $Reffered_by, $location, $login_id, $MY_Cluster_managers,$MY_Cluster_managers_BM, $ROS, $sales_id,  $DSA);
  $totalRecordwithFilter =$sel;
  
  ## Fetch records
  $sel=$this->Admin_model->show_Search_Area_managers_customers($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date, $Reffered_by, $location, $login_id, $MY_Cluster_managers,$MY_Cluster_managers_BM, $ROS, $sales_id,  $DSA);
  $empRecords = $sel;
  $data = array();

  foreach($empRecords as $row){
       /*---------------------- cam-----------------------------------*/
         if( $row->cam_status=='Cam details complete')
         {
             $Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
         }
         else
         {
             $Cam_pdf='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
         }  
         /*----------------------------------edit----------------------------------------*/
                     
          if($row->STATUS == 'Disbursed')
                     {
                        $Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
                        $edit =' <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                       $PD='<a  href="'. base_url().'index.php/credit_manager_user/pdf?ID='. $row->UNIQUE_CODE.'"Class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
                       $Eligibility ='<a style="margin-left: 8px; " href="'.base_url().'index.php/Rule_Engine/Calculate_eligibility?ID='.$row->UNIQUE_CODE.'"   class="btn Calculate_eligibility"><i class="fa fa-calculator text-right" style="color:green;"></i></a';
                       $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Login_fees_details?ID='.$row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
                       $Sanction_form ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Loan_sanction_form?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                       $Amortaization ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Amortization_Schedule?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                       $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                     }

                      else if($row->STATUS == 'Loan Sanctioned')
                     {
                        $Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
                        $edit =' <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                       $PD='<a  href="'. base_url().'index.php/credit_manager_user/pdf?ID='. $row->UNIQUE_CODE.'"Class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
                       $Eligibility ='<a style="margin-left: 8px; " href="'.base_url().'index.php/Rule_Engine/Calculate_eligibility?ID='.$row->UNIQUE_CODE.'"   class="btn Calculate_eligibility"><i class="fa fa-calculator text-right" style="color:green;"></i></a';
                       $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Login_fees_details?ID='.$row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
                       $Sanction_form ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Loan_sanction_form?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                       $Amortaization ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Amortization_Schedule?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                       $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                     }
                     
                     else if($row->STATUS == 'PD Completed')
                     {
                              $Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
         
                 
                        $edit ='      
                       <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                       $PD='<a  href="'. base_url().'index.php/credit_manager_user/pdf?ID='. $row->UNIQUE_CODE.'"Class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
                       $Eligibility ='<a style="margin-left: 8px; " href="'.base_url().'index.php/Rule_Engine/Calculate_eligibility?ID='.$row->UNIQUE_CODE.'"   class="btn Calculate_eligibility"><i class="fa fa-calculator text-right" style="color:green;"></i></a';
                      $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Login_fees_details?ID='.$row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
                      $Sanction_form ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Loan_sanction_form?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                      $Amortaization ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Amortization_Schedule?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                      $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                     }
                     else if( $row->STATUS=='Aadhar E-sign complete')
                     {
						 
                         
                        $edit ='    <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                        $PD='<a  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
                        $Eligibility ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-calculator text-right" aria-hidden="true" style="color:gray;"></i></a>';
                        $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Login_fees_details?ID='.$row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
                        $Sanction_form ='<a style="margin-left: 8px;" class="btn" href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:grey;"></i></a>';
                        $Amortaization ='<a style="margin-left: 8px;" class="btn" href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                        $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                   }    
                     else if($row->STATUS == 'Cam details complete')
                     {
                                     $Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
         
                         $edit =' <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                         $PD='<a  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
                         $Eligibility ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-calculator text-right" aria-hidden="true" style="color:gray;"></i></a>';
                         $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Login_fees_details?ID='.$row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
                         $Sanction_form ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:grey;"></i></a>';
                         $Amortaization ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                         $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                     }
                     else {

                           
                          $edit ='<a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                          $PD='<a  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
                          $Eligibility ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-calculator text-right" aria-hidden="true" style="color:gray;"></i></a>';
                          $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-money" aria-hidden="true" style="color:gray;"></i></a>';
                          $Sanction_form ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:grey;"></i></a>';
                           $Amortaization ='<a style="margin-left: 8px; " class="btn" href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                          $Pre_cam='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
						       $Cam_pdf='<a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
       
                     }

       if($row->credit_sanction_status == 'REJECT'|| $row->credit_sanction_status == 'reject' )
      {
          $Application_Status='<lable style="color:red;">REJECTED</lable>';
      }
      else if($row->credit_sanction_status == 'HOLD')
      {
          $Application_Status='<lable style="color:orange;">HOLD</lable>';
      }
      else
      {
		  if($row->STATUS == 'Disbursed')
         {
            $Application_Status = '<lable style="color:GREEN;">'.$row->STATUS.'</lable>';
         }
        else if($row->STATUS == 'Loan Sanctioned')
         {
            $Application_Status = '<lable style="color:GREEN;">'.$row->STATUS.'</lable>';
         }
        else if($row->STATUS == 'PD Completed')
         {
             $Application_Status = '<lable style="color:GREEN;">'.$row->STATUS.'</lable>';
         
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

         

   
        $customer_created_by=$this->Dsacustomers_model->getCustomer_created_by();//added by sonal on 12-05-2022
          $source_name='';
       foreach($customer_created_by as $row1)
                                                                                     { 
                                                                                           
                                                                                        if($row->CM_ID!=NULL && $row->CM_ID!='0' )
                                                                                        {
                                                                                            if($row1->UNIQUE_CODE==$row->CM_ID)
                                                                                            {
                                                                                                //echo $row1->FN.' '.$row1->LN.' [DSA]<br>';
                                                                                                $source_name=strtoupper($row1->FN.' '.$row1->LN);
                                                                                            }
                                                                                        }
                                                                                          
                                                                                          if($row->DSA_ID!=NULL && $row->DSA_ID!='0' )
                                                                                         {
                                                                                             if($row1->UNIQUE_CODE==$row->DSA_ID)
                                                                                             {
                                                                                                 //echo $row1->FN.' '.$row1->LN.' [DSA]<br>';
                                                                                                 $source_name=strtoupper($row1->FN.' '.$row1->LN);
                                                                                             }
                                                                                         }
                                                                                         else if($row->RO_ID!=NULL && $row->RO_ID!='0' )
                                                                                         {
                                                                                             if($row1->UNIQUE_CODE==$row->RO_ID)
                                                                                             {
                                                                                                 //echo $row1->FN.' '.$row1->LN.' [RO]<br>';
                                                                                                $source_name=strtoupper($row1->FN.' '.$row1->LN);
                                                                                             }
                                                                                         }
                                                                                         else if($row->BM_ID!=NULL && $row->BM_ID!='0' )
                                                                                         {
                                                                                             if($row1->UNIQUE_CODE==$row->BM_ID)
                                                                                             {
                                                                                                 //echo $row1->FN.' '.$row1->LN.' [BM]<br>';
                                                                                                 $source_name=strtoupper($row1->FN.' '.$row1->LN);
                                                                                             }
                                                                                         }
                                                                                         else if($row->SELES_ID!=NULL && $row->SELES_ID!='0' )
                                                                                         {
                                                                                             if($row1->UNIQUE_CODE==$row->SELES_ID)
                                                                                             {
                                                                                                 //echo $row1->FN.' '.$row1->LN.' [BM]<br>';
                                                                                                 $source_name=strtoupper($row1->FN.' '.$row1->LN);
                                                                                             }
                                                                                         }
                                                                                     }

        if( $row->STATUS =='Disbursed')
            {
                 $Sanction_letter='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/Sanction_Letter?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                 $MITC='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/MITAC_pdf?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
             }
        else if( $row->STATUS =='Loan Sanctioned')
            {
                 $Sanction_letter='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/Sanction_Letter?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                 $MITC='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/Credit_manager_user/MITAC_pdf?ID='.$row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
             }
            else
                {
                    
                    $Sanction_letter='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                    $MITC='<a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                    
                }
    

      $data[] = array(
              "ID"=>$row->ID,
              "FN"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->FN.' '.$row->LN.'</a>',
              "Customer_status"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->STATUS.'</a>',
              "Application_Status"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$Application_Status.'</a>',
              "source_name"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$source_name.'</a>',
              "Refered_by"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->Refer_By_Name.'[ '.$row->Refer_By_Category.' ]</a>',
              "LOCATION"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->Location.'</a>',
              "Created_on"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->CREATED_AT.'</a>',
              "Last_updated_on"=>'<a href="'.base_url().'index.php/Admin/Customer_Summary?ID='.$row->UNIQUE_CODE.'" target="_blank">'.$row->last_updated_date.'</a>',
              "Bureau_reports"=>'<a style="margin-left: 8px; " href="'.base_url().'index.php/dsa/show_coapplicants?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>',
              "CAM"=>$Cam_pdf,
              "PD"=>$PD,
              "Sanction_letter"=>$Sanction_letter,
              "MITC"=>$MITC,
              "action"=>$edit,
              "eligibility"=>$Eligibility,
              "login_fees_details"=>$Login_fees_details,
              "Sanction_form"=>$Sanction_form,
              "Amortaization"=>$Amortaization,
              "Pre_cam"=>$Pre_cam,
			   "Documents"=>'<a href="'.base_url().'index.php/dsa/show_coapplicants?ID='.$row->UNIQUE_CODE.'" class="btn modal_test" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>'	,
					
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
 //============================================ added by priya 07-12-2022========================================================================================
  public function Customer_Summary()
 {
	 	$id = $this->input->get("ID");
		$data_row = $this->Customercrud_model->getProfileData($id);
		$data_row_more = $this->Customercrud_model->getProfileDataMore($id);	
		$data_loan_application=$this->CustomerCrud_model->getCustomerId($id);
		$getCam_credit_anylsis=$this->CustomerCrud_model->getCam_credit_anylsis($id);
		$coapplicants=$this->Dsacustomers_model->getCustomers_coapplicants($id);
		$data_incomedetails=$this->Operations_user_model->getIncomedetails($id);
		$get_documents = $this->Customercrud_model->getDocuments($id);
		$Get_Doc_Master_Type_Coapplicant_Documents=array();
	    foreach($coapplicants As $coapplicant )
		 {
			 $coapplicant_details=$coapplicant;
			 $coapplicant_documents = $this->Customercrud_model->getDocuments($coapplicant->UNIQUE_CODE);
			 $coapplicant_Get_Doc_Master_Type=$this->Customercrud_model->Get_Doc_Master_Type($coapplicant->UNIQUE_CODE);
			 $coapplicant_documents_all = json_decode(json_encode($coapplicant_details),true);
			 array_push($coapplicant_documents_all,$coapplicant_documents);
			 array_push($coapplicant_documents_all,$coapplicant_Get_Doc_Master_Type);
		     array_push($Get_Doc_Master_Type_Coapplicant_Documents,$coapplicant_documents_all);
			  
		  }
			$Get_Doc_Master_Type_Coapplicant_Documents=array();
		    foreach($coapplicants As $coapplicant )
			{
				 $coapplicant_details=$coapplicant;
				 $coapplicant_documents = $this->Customercrud_model->getDocuments($coapplicant->UNIQUE_CODE);
				 $coapplicant_Get_Doc_Master_Type=$this->Customercrud_model->Get_Doc_Master_Type($coapplicant->UNIQUE_CODE);
				 $coapplicant_documents_all = json_decode(json_encode($coapplicant_details),true);
				 array_push($coapplicant_documents_all,$coapplicant_documents);
				 array_push($coapplicant_documents_all,$coapplicant_Get_Doc_Master_Type);
			  	 array_push($Get_Doc_Master_Type_Coapplicant_Documents,$coapplicant_documents_all);
			 }
			 $coapplicant_CRIF=array();
			 foreach($coapplicants As $coapplicant )
			  {
				 $coapplicant_details=$coapplicant;
				 $coapplicant_documents = $this->credit_manager_user_model->find_my_CRIF_documents($coapplicant->UNIQUE_CODE);
				 array_push($coapplicant_CRIF,$coapplicant_documents);
			  }
			  $data['coapplicant_CRIF']=$coapplicant_CRIF;
			  $coapplicant_bank_statement=array();
			  foreach($coapplicants As $coapplicant )
			  {
				 $coapplicant_details=$coapplicant;
				 $coapplicant_documents = $this->credit_manager_user_model->find_my_bank_statement_documents($coapplicant->UNIQUE_CODE);
				 array_push($coapplicant_bank_statement,$coapplicant_documents);
			  }
			  $data['coapplicant_bank_statement']=$coapplicant_bank_statement;
			  $data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
			  $data['Coapplicant_income']=$data_coapplicant;
			  $data['find_my_CRIF_documents']=$this->credit_manager_user_model->find_my_CRIF_documents($id);
		      $data['Coapplicant_Doacuments']=$Get_Doc_Master_Type_Coapplicant_Documents;
			  $data_appliedloan=$this->Operations_user_model->getAplliedLoanDetails($id);
			  $data['data_appliedloan']=$data_appliedloan;
			  $data['find_my_legal_documents']=$this->credit_manager_user_model->find_my_legal_documents($id);
			  $data['find_my_technical_documents']=$this->credit_manager_user_model->find_my_technical_documents($id);
			  $data['find_my_FI_documents']=$this->credit_manager_user_model->find_my_FI_documents($id);
			  $data['find_my_RCU_documents']=$this->credit_manager_user_model->find_my_RCU_documents($id);
			  $data['find_my_Court_case_documents']=$this->credit_manager_user_model->find_my_Court_case_documents($id);
			  $data['find_my_Legal_Document_Search_documents']=$this->credit_manager_user_model->find_my_Legal_Document_Search_documents($id);
			  $data['getCustomerSanction_recommendation_details']=$this->credit_manager_user_model->getCustomerSanction_recommendation_details($id);
			  $data['find_my_uploded_sanction_conditions']=$this->CustomerCrud_model->find_my_uploded_sanction_conditions($id);
			  $data['find_my_IncomeAnalysisbankstatement']=$this->credit_manager_user_model->find_my_IncomeAnalysisbankstatement($id);
		      $data['get_documents']=$get_documents;
	       	  $data['row'] = $data_row;
		      $get_payment_deteils=$this->Accountant_model->get_my_payment_deteils_offline($id);
		      $getCustomerSanction_letter_details = $this->credit_manager_user_model->getCustomerSanction_letter_details($id);
     	      $data['getCustomerSanction_letter_details'] = $getCustomerSanction_letter_details;
		      $data['payments'] = $get_payment_deteils;
		      $data['Applicant_row'] = $data_row;
		      $data['row_more'] = $data_row_more;
		      $data['data_row_more'] = $data_row_more;
		      $data['loan_details'] = $data_loan_application;
		      $data['getCam_credit_anylsis']=$getCam_credit_anylsis;
		      $data['coapplicants']=$coapplicants;
		      $data['data_incomedetails']=$data_incomedetails;
              $userType=$this->session->userdata("USER_TYPE"); 
              $dashboard_data = $this->Admin_model->getDashboardData(); 
              $age = $this->session->userdata('AGE');
              $data['showNav'] = 1;
			  $data['age'] = $age;
			  $data['userType'] = $this->session->userdata("USER_TYPE");   
			  $arr['userType'] = $userType;
			  $Reffered_by = $this->Admin_model->getReferredByData();
			  $filter_location = $this->Admin_model->getLocationByData();
			  $arr['Reffered_by']=$Reffered_by ;
			  $arr['filter_location']=$filter_location ;
			  //----------------------- code for bureau summary ------------------------------------------------------------------
			     $data_credit_score=$this->Customercrud_model->get_saved_credit_score($id);
				 		 $coapp_data_obligations_array=array();
				 if(!empty($data_credit_score))
					{
						$data_response=$data_credit_score->response;
						$data_address=json_decode($data_response,true);
						$credit_score_response=json_decode($data_credit_score->response,true);
					
						 if(isset($data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
						  {
						  $data_obligations=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
						  $data_obligations_array=$data_address['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
						  }
						  else
						  {
							$data_obligations=[]; 
							$data_obligations_array=[];
						  }
		
					}
					else
					{
						$data_obligations=array();
					    $credit_score_response=array();
					}
			        $data_coapplicant_no=$this->Operations_user_model->getCoapplicantNo($id);
					$data_coapplicant=$this->Operations_user_model->getCoapplicantById($id);
					$i=1;
					foreach($data_coapplicant as $coapplicant)
					{
					
						$coapp_data_credit_score=$this->Customercrud_model->get_saved_credit_score($coapplicant->UNIQUE_CODE);
						$coapp_data_credit_analysis=$this->Operations_user_model->getcoappcreditData($coapplicant->UNIQUE_CODE);
						
					
						if(!empty($coapp_data_credit_score))
						{
							$coapp_data_response=$coapp_data_credit_score->response;
					
						    $coapp_data_response=$coapp_data_credit_score->response;
							$coapp_credit_score=json_decode($coapp_data_response,true);
							if(isset($coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails']))
							{
							$coapp_data_obligations=$coapp_credit_score['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'];
							}
							else
							{
								$coapp_data_obligations=array();
							}
			//==============================================added by priyanka==============================================
						
						$i++;
						$coapp_data_obligations_array[$i]=$coapp_data_obligations;	
							$coapp_credit_score_array[$i]=$coapp_credit_score;
					
					}
					else
					{
						$coapp_data_obligations_array[$i]='';	
							$coapp_credit_score_array[$i]='';
					}
					}
					
					$data['data_obligations']=$data_obligations;	
					$data['coapp_data_obligations_array']=$coapp_data_obligations_array;
                     $data['credit_score_response']=$credit_score_response;					
			  //-------------------------------------end--------------------------------------------------------------------------
	
			  $this->load->view('admin/admin_dashbord', $data);
			  $this->load->view('admin/customer_summary', $arr);
         
 }
 //==============================================================================================================================================================
 
 
  //===========================pooja added by 26-12-22-===================================//
  
  
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
    //$Branch_manger=$this->Admin_model->get_Branch_BM($id);
    $Relationship=$this->Admin_model->get_Branch_RO_BM_RO($id);
    $DSA=$this->Admin_model->get_Branch_BM_BM_RO($Relationship,$id);
    $customers = $this->Admin_model->get_customers_Branch_RO($Relationship,$DSA,$id,$filter_by);
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
   
		         $arr['customers']=$customers;  
  //  $arr['customers'] = $customers;
    $Relationship=$this->Admin_model->bm_get_all_dsavisit($id);
			  $Relationship=$this->Admin_model->bm_get_all_ntbvisit($id);
			  $Relationship=$this->Admin_model->bm_get_all_existingvisit($id);
			   $Relationship=$this->Admin_model->bm_get_all_leadvisit($id);
			   $Relationship=$this->Admin_model->bm_get_all_bureaupull($id);
				$Start_Date = date('Y-m-01'); 
				$End_Date  = date('Y-m-t');
				 $dashboard_data = $this->Admin_model->bm_current_month($Relationship,$id,$Start_Date,$End_Date);
		         $arr['current']=$dashboard_data;
				  $Curr_Date = date('Y-m-d');
				 $Today_Date  = date('Y-m-d');
				 $dashboard = $this->Admin_model->bm_current_month($Relationship,$id,$Curr_Date,$Today_Date);
		         $arr['today']=$dashboard;
				   $dashboard_data = $this->Admin_model->bm_current_month1( $Relationship,$id,$Start_Date,$End_Date);
				    $arr['ntbcurrent']=$dashboard_data;
				  $dashboard = $this->Admin_model->bm_current_month1( $Relationship,$id,$Curr_Date,$Today_Date);
		         $arr['ntbtoday']=$dashboard;
				 
				   $dashboard = $this->Admin_model->bm_current_month3($Relationship,$id,$Curr_Date,$Today_Date);
		         $arr['existingtoday']=$dashboard;
				 
				  $dashboard = $this->Admin_model->bm_current_month3($Relationship,$id,$Start_Date,$End_Date);
		         $arr['existing']=$dashboard;
				 
				  $dashboard_data = $this->Admin_model->bm_current_month4($id,$Start_Date,$End_Date);
				    $arr['leadcurrent']=$dashboard_data;
					
					$dashboard = $this->Admin_model->bm_current_month4($id,$Curr_Date,$Today_Date);
		         $arr['leadtoday']=$dashboard;
    $this->load->view('dashboard_header', $data);
    
    $this->load->view('admin/Salestracker',$arr);
    
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
    $Relationship=$this->Admin_model->get_Branch_RO_BM_RO($id);
    $DSA=$this->Admin_model->get_Branch_BM_BM_RO($Relationship,$id);
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



    $sel = $this->Admin_model->get_all_RO_Branch($Relationship,$DSA,$id,$filter_by);
   // $sel=$this->Admin_model->Get_Total_No_Customer();
    $totalRecords =$sel;
    ## Total number of records with filtering
    $sel=$this->Admin_model->get_all_RO_Branch_filter($Relationship,$DSA,$id,$searchValue,$filter_by);
    $totalRecordwithFilter =$sel;
    ## Fetch records
    $sel=$this->Admin_model->get_all_RO_Branch_filter_with_page($Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
		 
   $empRecords = $sel;
    $data = array();


    foreach($empRecords as $row)
    {
		
				 $New = $this->Admin_model->meeting_type($Relationship,$id,$Start_Date,$End_Date);	
				 $Existing = $this->Admin_model->meeting_type1($Relationship,$id,$Start_Date,$End_Date);
				$Customer_existing = $this->Admin_model->customer_exit($Relationship,$id,$Start_Date,$End_Date);
				$Customer_ntb = $this->Admin_model->customer_ntb($Relationship,$id,$Start_Date,$End_Date);				
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
 //=========================== added by priya 29-12-2022
 public function scc()
   {
		 $z = $this->input->get('z');
		 $customer_id=base64_decode($z);
		 $getCustomerSanction_letter_details=  $this->credit_manager_user_model->getCustomerSanction_letter_details($customer_id);
		 $data['Sanction_letter_details']=$getCustomerSanction_letter_details;
	     $this->load->view('admin/sanction_letter_customer_consent',$data);
   }
   public function save_sanction_letter_consent()
	 {
		 $data=array(
						'User_ID'=>$this->input->post('User_ID'),
						'comments'=>$this->input->post('comments'),
						'status'=>$this->input->post('status')
			        );
					$status_by_customer = $this->input->post('status');
		  if($status_by_customer == 'Reject')
		  {
			  $consent='Rejected by Customer';
			    $data2=array(
						'customer_consent_comments'=>$this->input->post('comments'),
						'sanction_letter_customer_consent'=>$this->input->post('status'),
						'status'=> $consent,
						'Customer_consent_date'=>date('d-m-Y')
						
			        );	
			 	   $data3=array(
                     'Recommendation_status'=>'Recommended',
                     'Recommendation_status_added_by'=>'Credit Manager',
                     );
				$result = $this->credit_manager_user_model->update_recommendation_details($data['User_ID'],$data3);
		  
		  }
			else 
			{
				  $data2=array(
						'customer_consent_comments'=>$this->input->post('comments'),
						'sanction_letter_customer_consent'=>$this->input->post('status'),
						'Customer_consent_date'=>date('d-m-Y')
						
			        );	
			}
		  
		 
		  $Applicant_ID= $data['User_ID'];
		  $Result_id1 = $this->credit_manager_user_model->update_sanction_letter_details($Applicant_ID, $data2);
		  $getCustomerSanction_letter_details=$this->credit_manager_user_model->getCustomerSanction_letter_details($Applicant_ID);
          $user_info= $this->Operations_user_model->getProfileData($Applicant_ID);
          $sanction_details=array(
                            'Customer_name'=> $user_info->FN." ".$user_info->LN,
                            'Letter_ID'=> $getCustomerSanction_letter_details->Letter_ID,
                            'loan_amount'=> $getCustomerSanction_letter_details->loan_amount,
                            'Submitted_date'=>$getCustomerSanction_letter_details->last_updated,
                            'Status'=>$getCustomerSanction_letter_details->Status,
                            'admin_comments'=>$getCustomerSanction_letter_details->admin_comments,
                            'Status_added_by'=>$getCustomerSanction_letter_details->Status_added_by,
                                );  
				 $mail_data['Customer_name']=$sanction_details['Customer_name'];
				 $mail_data['Letter_ID']=$sanction_details['Letter_ID'];
				 $mail_data['loan_amount']=$sanction_details['loan_amount'];
				 $mail_data['Submitted_date']=$sanction_details['Submitted_date'];
				 $mail_data['Status']=$sanction_details['Status'];
				 $mail_data['admin_comments']=$sanction_details['admin_comments'];
				 $mail_data['Status_added_by']=$sanction_details['Status_added_by'];
				 $mail_data['Applicant_ID']=$Applicant_ID;
				 $mail_data['tenure']=$getCustomerSanction_letter_details->tenure;
				 $mail_data['roi']=$getCustomerSanction_letter_details->rate_of_interest;
				 $mail_data['EMI']=$getCustomerSanction_letter_details->EMI;
				 $mail_data['status_by_customer']=$status_by_customer ;
			    $config['protocol']='smtp';
				$config['smtp_host']='smtp-relay.sendinblue.com';
				$config['smtp_port']='587';
				$config['smtp_crypto']='tls';
				$config['smtp_user']='flconnect@finaleap.com';
				$config['smtp_pass']='Qns9hEpIMJVwUFgZ'; 
				$from_email = "infoflfinserv@finaleap.com";
				$config['charset']='utf-8';
				$config['newline']="\r\n";
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");
				$this->email->from($from_email, 'Finaleap Finserv');
				//$send_email_to_credit='credit@finaleap.com';
				$send_email_to_credit='piyuabdagire@gmail.com';
				$this->email->to($send_email_to_credit);
				//$this->email->bcc('info@finaleap.com');
				 if($status_by_customer == 'Reject')
					{
						$this->email->subject('Customer has rejected his loan sanction terms and conditions'); 
					}
					else
					{
						$this->email->subject('Customer has approved his loan sanction terms and conditions'); 
					}
				
				$mailContent =$this->load->view('templates/Sanction_letter_customer_consent_replay',$mail_data,true);
				$this->email->message($mailContent); 
				$this->email->Send(); 
		        $json =array(  
						'msg'=>'success'  
					   );
			      echo json_encode($json);
   
		 
	 }
	 //============================================ added by priya 30-12-2022====================================================
 public function Telecaller()
	{
        if($this->session->userdata('USER_TYPE') == '')
		{
            redirect(base_url('index.php/admin'));
        }
		else
		{
            $id = $this->session->userdata('ID');
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');
            $search_name ='';
            $search_=$this->input->post('filter_name');
            $select_filters=$this->input->post('select_filters');
            if(!empty($search_))
			{
				$s='search';
				$search_name =$this->input->post('filter_name');	
			}
            else if(!empty($select_filters))
            {
                $s=$select_filters;
                $search_name="";
            }
			else
			{
				$s = $this->input->get('s');
				$search_name="";
			}
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $data['row']=$this->Customercrud_model->getProfileData($id);
            $this->load->view('dashboard_header', $data);
            $this->load->view('admin/Telecaller_view_PG', $data);      
        }        
	}
	
	
	//===========================================added by pooja 03-01-23=================================//
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
	  
	  
	  
	  
}
?>