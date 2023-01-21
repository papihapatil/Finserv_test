<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operations_user_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
	
	
			public function encryption($original_string)
		{
			

$cipher_algo = "AES-128-CTR"; //The cipher method, in our case, AES 
$iv_length = openssl_cipher_iv_length($cipher_algo); //The length of the initialization vector
$option = 0; //Bitwise disjunction of flags
$encrypt_iv = '8746375678619797'; //Initialization vector, non-null
$encrypt_key = "Delftstack!fina"; // The encryption key

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

$decrypt_iv = '8746375678619797'; //Initialization vector, non-null
$decrypt_key = "Delftstack!fina"; // The encryption key

$decrypted_string=openssl_decrypt($encrypted_string, $cipher_algo,
		$decrypt_key, $option, $decrypt_iv);


return $decrypted_string;
			
		}

   /* function getDashboardData(){
        $response = [];
        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 1"); 
        $cust_count = $query->row();
        $response['cust_count'] = $cust_count->count;
        return $response;
    }*/
  /*----------------added by sonal on 5-5-2022----------------------------*/
  function getDashboardData(){
	$response = [];
	$query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 1"); 
	$cust_count = $query->row();
	$response['cust_count'] = $cust_count->count;

	$query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 2"); 
	$dsa_count = $query->row();
	$response['dsa_count'] = $dsa_count->count;

	$query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 4"); 
	$csr_count = $query->row();
	$response['connector_count'] = $csr_count->count;
   
	 $this->db->select('*');
  
		$this->db->from('USER_DETAILS');
				$this->db->where("ROLE", 1); 
		$this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
		$this->db->where("USER_DETAILS.credit_sanction_status",null); 
	   // $this->db->or_where("USER_DETAILS.credit_sanction_status",'CONTINUE'); 
		//$this->db->where("USER_DETAILS.cam_status",NULL);    
		//$this->db->order_by("USER_DETAILS.ID","desc");
		$response['in_progress'] = $this->db->get()->result();


		   $this->db->select('*');
		$this->db->where("ROLE", 1);   
		$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
	   // $this->db->where("USER_DETAILS.credit_sanction_status",null); 
		$this->db->where("USER_DETAILS.credit_sanction_status",'CONTINUE'); 
		//$this->db->where("USER_DETAILS.cam_status",NULL);    
		//$this->db->order_by("USER_DETAILS.ID","desc");
		$response['in_progress2'] = $this->db->get()->result();

		 $this->db->select('*');
		$this->db->where("ROLE", 1);   
		$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
		$this->db->where("CUSTOMER_MORE_DETAILS.STATUS ",'Created' );
		$this->db->order_by("USER_DETAILS.ID","desc");
		$response['just_login'] = $this->db->get()->result();



		$this->db->select('*');
		$this->db->where("ROLE", 1);   
		$this->db->from('USER_DETAILS');
		$this->db->where("USER_DETAILS.credit_sanction_status",'REJECT');   
		$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
		$this->db->order_by("USER_DETAILS.ID", "desc");
		 $response['rejected'] = $this->db->get()->result();



		$this->db->select('*');
		$this->db->where("ROLE", 1);   
		$this->db->from('USER_DETAILS');
		  $this->db->where("USER_DETAILS.credit_sanction_status",'HOLD');   
		$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
		$this->db->order_by("USER_DETAILS.ID", "desc");
		 $response['hold'] = $this->db->get()->result();


   
	return $response;
}



    /*function getDashboardData_2()
    {
         $response = array();
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		 $where = '(ROLE=1 or ROLE =2)';
		$this->db->where($where);
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->result();
		
		return $response;
    }*/
	/*function getCustomers($filter,$date,$search_name)
	{
    if($filter=='search')
    {
		$response = array();
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		 $where = '(ROLE=1 or ROLE =2)';
		$this->db->where($where);
        $this->db->where("LN",$search_name);
        $this->db->or_where("FN",$search_name);
		if ($date!='') {
			$this->db->like("CREATED_AT", $date, 'both');
		}
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->result();
		
		return $response;
  }
  else if($filter=='date')
  {
        $response = array();
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		 $where = '(ROLE=1 or ROLE =2)';
		$this->db->where($where);
        $this->db->like("LN",$date);
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->result();
		
		return $response;
  }
  else if($filter=='Completed_CAM')
  {
        $response = array();
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		 $where = '(ROLE=1 or ROLE =2)';
		$this->db->where($where);
        $this->db->where("cam_status","Cam details complete");
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->result();
		
		return $response;
  }
  else if($filter=='Incomplete_CAM')
  {
        $response = array();
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		 $where = '(ROLE=1 or ROLE =2)';
		$this->db->where($where);
        $this->db->where("cam_status",NULL);
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->result();
		
		return $response;
  }
  else if($filter=='Completed_loan_process')
  {
        $response = array();
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		 $where = '(ROLE=1 or ROLE =2)';
		$this->db->where($where);
        $this->db->where("STATUS","Aadhar E-sign complete");
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->result();
		
		return $response;
  }
  else if($filter=='Incomplete_loan_process')
  {
        $response = array();
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		 $where = '(ROLE=1 or ROLE =2)';
		$this->db->where($where);
        $this->db->where("STATUS!=","Aadhar E-sign complete");
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->result();
		
		return $response;
  }
  else
  {
         $response = array();
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		 $where = '(ROLE=1 or ROLE =2)';
		$this->db->where($where);
		if ($date!='') {
			$this->db->like("CREATED_AT", $date, 'both');
		}
         $this->db->where("STATUS","Aadhar E-sign complete");
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->result();
		
		return $response;
  }

    }*/
	public function getProfileData($id)
	{
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('UNIQUE_CODE', $id);
      $q = $this->db->get();
      $row = $q->row();
	  
 if(isset($row->KYC) && $row->KYC != '')
	  {
			 $KYC = $row->KYC;
			  $row->KYC = $this->decryption($KYC);
	  }
	  
	  if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
	  
	  
      return $row;
    }
	public function getcreditData($id)
	{
      $this->db->select('*');
      $this->db->from('cam_credit_analysis');
      $this->db->where('ID', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }
	public function getcoappcreditData($id)
	{
      $this->db->select('*');
      $this->db->from('coapp_cam_credit_analysis');
      $this->db->where('ID', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }
	
	 public function getProfileDataMore($id){
      $this->db->select('*');
      $this->db->from('CUSTOMER_MORE_DETAILS');
	  
      $this->db->where('CUST_ID', $id);
      $q = $this->db->get();
      $row = $q->row();
	  
	  
	  
	  if(isset($row->KYC) && $row->KYC != '')
	  {
			 $KYC = $row->KYC;
			  $row->KYC = $this->decryption($KYC);
	  }
	  
	  if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
	  
      return $row;
    }
	 public function getCoapplicantById($id){
      $this->db->select('*');
      $this->db->from('COAPPLICANT_DETAILS');
	  $this->db->join('COAPPLICANT_INCOME_DETAILS', 'COAPPLICANT_DETAILS.UNIQUE_CODE = COAPPLICANT_INCOME_DETAILS.COAPP_ID');
      $this->db->where('CUST_ID', $id);
	  
	  $result = $this->db->get()->result();
	  
	  foreach($result as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->KYC) && $row->KYC != '')
	  {
			 $KYC = $row->KYC;
			  $row->KYC = $this->decryption($KYC);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
	  
	 // print_r($result);
     
     return $result;
    }
	 public function getAplliedLoanDetails($id){
      $this->db->select('*');
      $this->db->from('CUSTOMER_APPLIED_LOANS');
      $this->db->where('CUST_ID', $id);
	  $this->db->order_by("ID", "desc");
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }
	public function getCoapplicantNo($id){
      $this->db->select('*');
      $this->db->from('COAPPLICANT_DETAILS');
      $this->db->where('CUST_ID', $id);
      $q = $this->db->get();
      $row = $q->num_rows();
	  
      return $row;
    }
	public function getIncomedetails($id){
      $this->db->select('*');
      $this->db->from('CUSTOMER_INCOME_DETAILS');
      $this->db->where('CUST_ID', $id);
      $q = $this->db->get();
      $row =$q->row();
	  
      return $row;
    }
	 public function update_coapplicant($id, $data){
      $this->db->where('UNIQUE_CODE', $id);
      return $this->db->update('COAPPLICANT_DETAILS', $data);
    }
	 public function check_cam_profile($id)
	 {
      $response = array();
      $this->db->select('*');
      $this->db->where("ID", $id);      
      $q = $this->db->from('cam_credit_analysis');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }
	 public function check_coapp_cam_profile($id)
	 {
      $response = array();
      $this->db->select('*');
      $this->db->where("ID", $id);      
      $q = $this->db->from('coapp_cam_credit_analysis');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }
	 public function update_cam_credit($id, $data){
      $this->db->where('ID', $id);
      return $this->db->update('cam_credit_analysis', $data);
    }
	 public function update_coapp_cam_credit($id, $data){
      $this->db->where('ID', $id);
     return $this->db->update('coapp_cam_credit_analysis', $data);
     
    }
	 public function insert_cam_credit($id, $data){
      $this->db->where('ID', $id);
      return $this->db->insert('cam_credit_analysis', $data);
    }
	public function insert_coapp_cam_credit($id, $data){
      $this->db->where('ID', $id);
      return $this->db->insert('coapp_cam_credit_analysis', $data);
    }
  //======================================================================================================
    public function getCustomers_coapplicants($id)
    {
      $this->db->select('*');
     $this->db->from('COAPPLICANT_DETAILS');
     $this->db->where('CUST_ID', $id);
     $this->db->order_by("ID", "desc");
     $q = $this->db->get();
     $row = $q->row();
     return $row;

    }
    public function get_dsa_details($id)
    {
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('UNIQUE_CODE',$id);
      $query = $this->db->get();
      $row = $query->row();
	  
	  if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
	  
      return $row;
    }
    
    function getDsaList($q, $bank ,$city){

      if($q == 'all'){
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 2);          
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }else if ($q == 'bnk') {   

        $response = array();
        $query = $this->db->select('t1.*, t2.*')
         ->from('USER_DETAILS as t1')
         ->where('t1.ROLE', 2)
         ->like('t2.BANK_NAME', $bank , 'both')
         ->join('DSA_BANKS as t2', 't1.UNIQUE_CODE = t2.DSA_ID', 'RIGHT')
         ->order_by("t1.ID", "desc")
         ->get();
         $response = $query->result();
		 foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
        return $response;
      } 
      else if($q == 'Complete')
  {
    $this->db->select('*');
        $this->db->from('USER_DETAILS');
    //  $this->db->where("PROFILE_PERCENTAGE",'100');
        $this->db->where("Profile_Status",'Complete');
        $this->db->where('ROLE', 2);    
        $this->db->order_by("ID", "desc");      
        $query = $this->db->get();
        $response = $query->result();
		foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
        return $response;
    
  }	
      else if($q == 'Incomplete')
  {
      $this->db->select('*');
        $this->db->from('USER_DETAILS');
    //  $this->db->where("PROFILE_PERCENTAGE",'');
         $this->db->where("Profile_Status",NULL); 
         $this->db->where('ROLE', 2);          
         $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
		foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
        return $response;
  }
  else if($q == 'city'){
      if($city == '')
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 2);  
        $this->db->where('CITY', NULL); 
        $this->db->order_by("ID", "desc");		   
         $query = $this->db->get();
        $response = $query->result();
		
		foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
			
        return $response;
      }
      else
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 2);  
        $this->db->where('CITY', $city); 
        $this->db->order_by("ID", "desc");		   
         $query = $this->db->get();
        $response = $query->result();
		
		foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		
        return $response;
      }
      }

      
      
  
      
  }
  function getBanks(){
    $this->db->select('*');
    $this->db->from('SYS_BANKS');        
    $this->db->order_by("ID", "desc");
    $query = $this->db->get();
    $response = $query->result();
    return $response;
}
function getCity()
{
   $this->db->select('CITY');
  $this->db->where('ROLE', 2); 
  $this->db->distinct();
  $this->db->from('USER_DETAILS');   
       
  $query = $this->db->get();
 $response = $query->result();
  return $response;
}
public function get_applicant_loan_application_details($id)
	{
      $this->db->select('*');
      $this->db->from('CUSTOMER_APPLIED_LOANS');
      $this->db->where('CUST_ID', $id);
      $q = $this->db->get();
      $row = $q->row();
     // print_r($row);
     // exit();
      return $row;
    }
    /*------------------------------------------------- Added by papiha on _10-03-2022-----------------------------------------------------*/
    public function getDashboardData_incomplete_Loan_app()
    {

      $query=$this->db->query("SELECT Count(*) as count  FROM USER_DETAILS INNER JOIN CUSTOMER_MORE_DETAILS ON USER_DETAILS.UNIQUE_CODE=CUSTOMER_MORE_DETAILS.CUST_ID Where ROLE=1 AND UNIQUE_CODE NOT IN (SELECT CUST_ID  FROM CUSTOMER_APPLIED_LOANS)");
     
	  $cust_count = $query->row();
	  $response= $cust_count->count;
	  return $response;
    }

    //======================== added by priya 22-03-2022
	public function get_dsa_users($user_id,$ROLE_for_category)
	{
	  if($ROLE_for_category == 'All')
	  {
		   $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('DSA_ID',$user_id);
		  $query = $this->db->get();
		  $response = $query->result();
		  foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		   return $response;
	  }
	  else
	  {
		  $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('DSA_ID',$user_id);
		  $this->db->where('ROLE',$ROLE_for_category);
		  $query = $this->db->get();
		  $response = $query->result();
		  foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		   return $response;
	  }
    }
	public function get_RO_users($user_id,$ROLE_for_category)
	{
		if($ROLE_for_category == 'All')
	  {
		  $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('RO_ID',$user_id);
		  $query = $this->db->get();
		  $response = $query->result();
		  foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		   return $response;
	  }
	  else
	  {
		   $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('RO_ID',$user_id);
		  $this->db->where('ROLE',$ROLE_for_category);
		  $query = $this->db->get();
		  $response = $query->result();
		  foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		   return $response;
	  }
    }
	public function get_BM_users($user_id,$ROLE_for_category)
	{
		
	  if($ROLE_for_category == 'All')
	  {
		  $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('BM_ID',$user_id);
		  $query = $this->db->get();
		  $response = $query->result();
		  
		  foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		   return $response;
		   
		   
		
	  }
	  else
	  {
		  $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('BM_ID',$user_id);
		  $this->db->where('ROLE',$ROLE_for_category);
		  $query = $this->db->get();
		  $response = $query->result();
		  
		  foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		  
		   return $response;
	  }
    }
	public function get_Manager_users($user_id,$ROLE_for_category)
	{
	  if($ROLE_for_category == 'All')
	  {
		  $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('MANAGER_ID',$user_id);
		  $query = $this->db->get();
		  $response = $query->result();
		  
		  foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		   return $response;
	  }
	  else
	  {
		  $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('MANAGER_ID',$user_id);
		  $this->db->where('ROLE',$ROLE_for_category);
		  $query = $this->db->get();
		  $response = $query->result();
		  
		  foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
			
		   return $response;
	  }
    }
    public function get_sales_manager_users($user_id,$ROLE_for_category)
	{
	  if($ROLE_for_category == 'All')
	  {
		  $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('SELES_ID',$user_id);
		  $query = $this->db->get();
		  $response = $query->result();
		  
		  foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
			
		   return $response;
	  }
	  else
	  {
		  $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('SELES_ID',$user_id);
		  $this->db->where('ROLE',$ROLE_for_category);
		  $query = $this->db->get();
		  $response = $query->result();
		  foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		   return $response;
	  }
    }
	public function get_CSR_users($user_id,$ROLE_for_category)
	{
	  if($ROLE_for_category == 'All')
	  {
		   $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('CSR_ID',$user_id);
	      $query = $this->db->get();
		  $response = $query->result();
		  
		  foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		  
		   return $response;
	  }
	  else
	  {
		  $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('CSR_ID',$user_id);
		  $this->db->where('ROLE',$ROLE_for_category);
		  $query = $this->db->get();
		  $response = $query->result();
		  
		  foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		   return $response;
	  }
    }
	public function get_Cluster_manager_users($user_id,$ROLE_for_category)
	{
	  if($ROLE_for_category == 'All')
	  {
		  $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('CM_ID',$user_id);
		  $query = $this->db->get();
		  $response = $query->result();
		  $str = $this->db->last_query();
   foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		 
		   return $response;
	  }
	  else
	  {
		  $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('CM_ID',$user_id);
		  $this->db->where('ROLE',$ROLE_for_category);
		  $query = $this->db->get();
		  $response = $query->result();
		  
		  foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		   return $response;
	  }
    }
	//----------------------- added by priyanka 23-02-2022
	public function assigning_process($unique_code, $update_array){
      $this->db->where('UNIQUE_CODE', $unique_code);
      return $this->db->update('USER_DETAILS', $update_array);
	   //$executedQuery = $this->db->last_query();
       //print_r($executedQuery);
       // exit;
    }
	public function change_user_role($User_ID, $Convert_to_role){
      $this->db->where('UNIQUE_CODE', $User_ID);
	  $this->db->SET('ROLE', $Convert_to_role);
      return $this->db->update('USER_DETAILS');
	   //$executedQuery = $this->db->last_query();
       //print_r($executedQuery);
       // exit;
    }
	/*------------------------------------ added by papiha on 23_04_2022------------------------------------*/
  
	public function getcredit_by_location($Location)
	{
		  $this->db->select('EMAIL');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('Location',$Location);
		  $this->db->where('ROLE',8);
		  $query = $this->db->get();
		  $response = $query->result();
		   return $response;
	}
	public function getcluster_by_location($Location)
	{
		
		  $this->db->select('EMAIL');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('Location',$Location);
		  $this->db->where('ROLE',15);
		  $query = $this->db->get();
		  $response = $query->result();
		   return $response;
	}
	public function getcpa_by_location($Location)
	{
		
		  $this->db->select('EMAIL');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('Location',$Location);
		  $this->db->where('ROLE',3);
		  $query = $this->db->get();
		  $response = $query->result();
		   return $response;
	}
   
function getCustomers($filter,$date,$search_name)
	{
    if($filter=='search')
    {
		$response = array();
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		 $where = '(ROLE=1 or ROLE =2)';
		$this->db->where($where);
        $this->db->where("LN",$search_name);
        $this->db->or_where("FN",$search_name);
		if ($date!='') {
			$this->db->like("CREATED_AT", $date, 'both');
		}
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->result();
		
		foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		
		return $response;
  }
  else if($filter=='date')
  {
        $response = array();
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		 $where = '(ROLE=1 or ROLE =2)';
		$this->db->where($where);
        $this->db->like("LN",$date);
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->result();
		
		foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		
		return $response;
  }
  else if($filter=='Completed_CAM')
  {
        $response = array();
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		 $where = '(ROLE=1 or ROLE =2)';
		$this->db->where($where);
        $this->db->where("cam_status","Cam details complete");
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->result();
		
		return $response;
  }
  else if($filter=='Incomplete_CAM')
  {
        $response = array();
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		 $where = '(ROLE=1 or ROLE =2)';
		$this->db->where($where);
        $this->db->where("cam_status",NULL);
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->result();
		
		foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		
		return $response;
  }
  else if($filter=='Completed_loan_process')
  {
        $response = array();
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		 $where = '(ROLE=1 or ROLE =2)';
		$this->db->where($where);
        $this->db->where("STATUS","Aadhar E-sign complete");
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->result();
		
		foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
		
		return $response;
  }
  else if($filter=='Incomplete_loan_process')
  {
        $response = array();
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		 $where = '(ROLE=1 or ROLE =2)';
		$this->db->where($where);
        $this->db->where("STATUS!=","Aadhar E-sign complete");
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->result();
		
		return $response;
  }
  else
  {
         $response = array();
		     $this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		     $where = '(ROLE=1 or ROLE =2)';
		      $this->db->where($where);
		/*if ($date!='') {
			$this->db->like("CREATED_AT", $date, 'both');
		}*/
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->result();
		
		return $response;
  }

    }
	/*----------------------------------Added by papiha 27_04_2022-----------------------------------*/
	  /*------------------------------- Added by papiha 27_04_2022-  changes by priya 04-05-2022----------------------------------*/
    
    /* function getDashboardData_2()
    {
         $response = array();
		$this->db->select('count(*) as count');
		 $where = '(ROLE=1)';
		$this->db->where($where);
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$query = $this->db->get();
		    $response = $query->row();
			
		
			return $response->count;
		
		
    } 
	public function Get_Customer_Filter_In_CAM($searchValue)
	{
		$response = array();
		$this->db->select('count(*) as count');
		$where = 'ROLE=1';
		$this->db->where($where);
		if($searchValue!= '')
			{
			$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
			$this->db->where($where);
			}
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$query = $this->db->get();
		    $response = $query->row();
			
	
			return $response->count;
	}
	public function Get_Customer_With_Page_In_CAM($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
	{
		$response = array();
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		$where = 'ROLE=1';
		$this->db->where($where);
		if($searchValue!= '')
			{
			$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
			$this->db->where($where);
			}
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		    $this->db->order_by($columnName, $columnSortOrder);
			$this->db->limit($rowperpage,$row);
			$query = $this->db->get();
			$response = $query->result();
			//print_r($this->db->last_query());
			//exit;
			
		    return $response;
		
	}*/
	   function getDashboardData_2($filter)
    {
    	if($filter=='all')
    	{
    			 $response = array();
			$this->db->select('count(*) as count');
		 	$where = '(ROLE=1)';
			$this->db->where($where);
			$q=$this->db->from('USER_DETAILS');
			$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
      $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
			$this->db->order_by("CUSTOMER_APPLIED_LOANS.ID", "desc");
			$query = $this->db->get();
		  $response = $query->row();
			//exit;
			return $response->count;
    	}
    	else if($filter=='Completed_CAM')
    	{
				 		$response = array();
						$this->db->select('count(*) as count');
					 	$where = '(ROLE=1)';
						$this->db->where($where);
						$where = "CUSTOMER_MORE_DETAILS.STATUS='Cam details complete' OR  CUSTOMER_MORE_DETAILS.STATUS='PD Completed'";
						$this->db->where($where);
						$q=$this->db->from('USER_DETAILS');
						$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
			      $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
						$this->db->order_by("CUSTOMER_APPLIED_LOANS.ID", "desc");
						$query = $this->db->get();
					  $response = $query->row();
						//exit;
						return $response->count;
    	}
    	else if($filter=='Incomplete_CAM')
    	{
					  $response = array();
						$this->db->select('count(*) as count');
					 	$where = '(ROLE=1)';
						$this->db->where($where);
					$where = "CUSTOMER_MORE_DETAILS.STATUS='Aadhar E-sign complete' AND USER_DETAILS.cam_status IS NULL OR CUSTOMER_MORE_DETAILS.STATUS='Aadhar E-sign complete' AND USER_DETAILS.credit_sanction_status='CONTINUE' AND USER_DETAILS.credit_sanction_status != 'REJECT'";
						$this->db->where($where);
						$q=$this->db->from('USER_DETAILS');
						$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
			      $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
						$this->db->order_by("CUSTOMER_APPLIED_LOANS.ID", "desc");
						$query = $this->db->get();
					  $response = $query->row();
						//exit;
						return $response->count;
    	}
    	else
    	{     
    	 $response = array();
			$this->db->select('count(*) as count');
		 	$where = '(ROLE=1)';
			$this->db->where($where);
			$q=$this->db->from('USER_DETAILS');
			$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
      $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
			$this->db->order_by("CUSTOMER_APPLIED_LOANS.ID", "desc");
			$query = $this->db->get();
		  $response = $query->row();
			//exit;
			return $response->count;
			}
		
		
    }
	
	public function Get_Customer_Filter_In_CAM($searchValue,$filter)
	{
		if($filter=='all')
    	{
				$response = array();
				$this->db->select('count(*) as count');
				$where = 'ROLE=1';
				$this->db->where($where);
				if($searchValue!= '')
					{
					 $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
					 $this->db->where($where);
					}
				$q=$this->db->from('USER_DETAILS');
				$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
		    $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
				$this->db->order_by("CUSTOMER_APPLIED_LOANS.ID", "desc");
				$query = $this->db->get();
				    $response = $query->row();
					
					//exit;
					return $response->count;
				}
				else if($filter=='Completed_CAM')
	    	{
	    			$response = array();
						$this->db->select('count(*) as count');
						$where = 'ROLE=1';
						$this->db->where($where);
						$where = "CUSTOMER_MORE_DETAILS.STATUS='Cam details complete' OR CUSTOMER_MORE_DETAILS.STATUS='PD Completed'";
						$this->db->where($where);
						if($searchValue!= '')
							{
							$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
							$this->db->where($where);
							}
						$q=$this->db->from('USER_DETAILS');
						$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
				    $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
						$this->db->order_by("CUSTOMER_APPLIED_LOANS.ID", "desc");
						$query = $this->db->get();
						    $response = $query->row();
					
					//exit;
					return $response->count;
	    	}
	    	else if($filter=='Incomplete_CAM')
	    	{
	    			$response = array();
						$this->db->select('count(*) as count');
						$where = 'ROLE=1';
						$this->db->where($where);
						    $where = "CUSTOMER_MORE_DETAILS.STATUS='Aadhar E-sign complete' AND USER_DETAILS.cam_status IS NULL OR CUSTOMER_MORE_DETAILS.STATUS='Aadhar E-sign complete' AND USER_DETAILS.credit_sanction_status='CONTINUE AND USER_DETAILS' AND USER_DETAILS.credit_sanction_status != 'REJECT'";
						$this->db->where($where);
						if($searchValue!= '')
							{
							$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
							$this->db->where($where);
							}
						$q=$this->db->from('USER_DETAILS');
						$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
				    $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
						$this->db->order_by("CUSTOMER_APPLIED_LOANS.ID", "desc");
						$query = $this->db->get();
						    $response = $query->row();
							
							//exit;
							return $response->count;
	    	}


				else
				{
					$response = array();
				  $this->db->select('count(*) as count');
				  $where = 'ROLE=1';
				  $this->db->where($where);
				  if($searchValue!= '')
					{
					 $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
					 $this->db->where($where);
					}
				$q=$this->db->from('USER_DETAILS');
				$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
		        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
				$this->db->order_by("CUSTOMER_APPLIED_LOANS.ID", "desc");
				$query = $this->db->get();
				    $response = $query->row();
					
					//exit;
					return $response->count;
				}

	}
	public function Get_Customer_With_Page_In_CAM($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
	{
			if($filter=='all')
    		{
					$response = array();
					$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
					$where = 'ROLE=1';
					$this->db->where($where);
					if($searchValue!= '')
					{
					$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
					$this->db->where($where);
					}
					$q=$this->db->from('USER_DETAILS');
					$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
		      $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		      $this->db->order_by("CUSTOMER_APPLIED_LOANS.ID", "desc");
			    $this->db->order_by($columnName, $columnSortOrder);
					$this->db->limit($rowperpage,$row);
					$query = $this->db->get();
					$response = $query->result();
					//print_r($this->db->last_query());
					//exit;
					
					foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
					
				    return $response;
				  }
				  else if($filter=='Completed_CAM')
	    	{
	    		$response = array();
					$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
					$where = 'ROLE=1';
					$this->db->where($where);
								$where = "CUSTOMER_MORE_DETAILS.STATUS='Cam details complete' OR CUSTOMER_MORE_DETAILS.STATUS='PD Completed'";
						$this->db->where($where);
					if($searchValue!= '')
					{
					$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
					$this->db->where($where);
					}
					$q=$this->db->from('USER_DETAILS');
					$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
		      $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		      $this->db->order_by("CUSTOMER_APPLIED_LOANS.ID", "desc");
			    $this->db->order_by($columnName, $columnSortOrder);
					$this->db->limit($rowperpage,$row);
					$query = $this->db->get();
					$response = $query->result();
					//print_r($this->db->last_query());
					//exit;
					
					foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
					
				    return $response;
	    	}
	    	else if($filter=='Incomplete_CAM')
	    	{
	    		$response = array();
					$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
					$where = 'ROLE=1';
					$this->db->where($where);
						    $where = "CUSTOMER_MORE_DETAILS.STATUS='Aadhar E-sign complete' AND USER_DETAILS.cam_status IS NULL OR CUSTOMER_MORE_DETAILS.STATUS='Aadhar E-sign complete' AND USER_DETAILS.credit_sanction_status='CONTINUE' AND USER_DETAILS.credit_sanction_status != 'REJECT'";
					$this->db->where($where);
					if($searchValue!= '')
					{
					$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
					$this->db->where($where);
					}
					$q=$this->db->from('USER_DETAILS');
					$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
		      $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		      $this->db->order_by("CUSTOMER_APPLIED_LOANS.ID", "desc");
			    $this->db->order_by($columnName, $columnSortOrder);
					$this->db->limit($rowperpage,$row);
					$query = $this->db->get();
					$response = $query->result();
					//print_r($this->db->last_query());
					//exit;
					
					foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
					
				    return $response;
	    	}


				  else
				  {
				  	$response = array();
						$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
						$where = 'ROLE=1';
						$this->db->where($where);
						if($searchValue!= '')
							{
							$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
							$this->db->where($where);
							}
						$q=$this->db->from('USER_DETAILS');
						$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
				    $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
				    $this->db->order_by("CUSTOMER_APPLIED_LOANS.ID", "desc");
						$this->db->order_by($columnName, $columnSortOrder);
						$this->db->limit($rowperpage,$row);
						$query = $this->db->get();
						$response = $query->result();
						//print_r($this->db->last_query());
						//exit;
						
						foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
						return $response;
				  }
		
			}
		

  
		/*------------------------------- Added by papiha on 04_05_2022-------------------------------------*/
		function getDashboardData_incomplete_Legal()
		{
			$response = array();
			$this->db->select('count(*) as count');
			$this->db->where('Legal_status!=','Accepted from Finaleap');
			$q=$this->db->from('Legal_details');
			$this->db->join('CUSTOMER_APPLIED_LOANS', 'Legal_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
			$query = $this->db->get();
			$response = $query->row();
			return $response->count;
		}

  /*  function customers_for_editing()
    {
            $this->db->select('*');
            $this->db->where("ROLE", 1); 
            $this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->order_by("USER_DETAILS.ID", "desc");
            $query = $this->db->get()->result();
        
        return $query;
    }
*/

     function customers_for_editing($filter)
    {
      if($filter=='all')
      {
           $response = array();
      $this->db->select('count(*) as count');
      $where = '(ROLE=1)';
      $this->db->where($where);
      $q=$this->db->from('USER_DETAILS');
      $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
   $this->db->order_by("USER_DETAILS.ID", "desc");
      $query = $this->db->get();
      $response = $query->row();
      //exit;
      return $response->count;
      }
     
      
      else
      {     
       $response = array();
      $this->db->select('count(*) as count');
      $where = '(ROLE=1)';
      $this->db->where($where);
      $q=$this->db->from('USER_DETAILS');
      $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
    $this->db->order_by("USER_DETAILS.ID", "desc");
      $query = $this->db->get();
      $response = $query->row();
      //exit;
      return $response->count;
      }
    
    
    }
  
  public function Get_customers_for_editing_Filter_In_CAM($searchValue,$filter)
  {
    if($filter=='all')
      {
        $response = array();
        $this->db->select('count(*) as count');
        $where = 'ROLE=1';
        $this->db->where($where);
        if($searchValue!= '')
          {
           $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
           $this->db->where($where);
          }
        $q=$this->db->from('USER_DETAILS');
        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
   $this->db->order_by("USER_DETAILS.ID", "desc");
        $query = $this->db->get();
            $response = $query->row();
          
          //exit;
          return $response->count;
        }
        
       

        else
        {
          $response = array();
          $this->db->select('count(*) as count');
          $where = 'ROLE=1';
          $this->db->where($where);
          if($searchValue!= '')
          {
           $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
           $this->db->where($where);
          }
        $q=$this->db->from('USER_DETAILS');
        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
 $this->db->order_by("USER_DETAILS.ID", "desc");
        $query = $this->db->get();
            $response = $query->row();
          
          //exit;
          return $response->count;
        }

  }
  public function Get_customers_for_editing_In_CAM($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
  {
      if($filter=='all')
        {
          $response = array();
          $this->db->select('*');
          $where = 'ROLE=1';
          $this->db->where($where);
          if($searchValue!= '')
          {
          $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
          $this->db->where($where);
          }
          $this->db->from('USER_DETAILS');
          $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
      $this->db->order_by("USER_DETAILS.ID", "desc");
        //  $this->db->order_by($columnName, $columnSortOrder);
          $this->db->limit($rowperpage,$row);
          $query = $this->db->get();
          $response = $query->result();
          //print_r($this->db->last_query());
          //exit;
		  
		  foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
          
            return $response;
          }
         
        

          else
          {
            $response = array();
            $this->db->select('*');
            $where = 'ROLE=1';
            $this->db->where($where);
            if($searchValue!= '')
              {
              $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
              $this->db->where($where);
              }
            $q=$this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->order_by("USER_DETAILS.ID", "desc");
            //$this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
            //print_r($this->db->last_query());
            //exit;
			
			foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
			
            return $response;
          }
    
      }

	  /*---------------------------------------added by sonal on 21-05-2022----------------------------------*/  


					
					/*------------------------------------------- Addded by  pappiha on 18_05_2022--------------------------------*/
				function get_incomplete_Legal()
				{
				$response = array();
				$this->db->select('count(*)as count');
				$this->db->where('Legal_Status!=','Accept From Finaleap');
				$q=$this->db->from('legal_documents');
				$this->db->join('CUSTOMER_APPLIED_LOANS', 'legal_documents.Application_id = CUSTOMER_APPLIED_LOANS.Application_id');
				$query = $this->db->get();
							$response = $query->row();
				return $response->count;
				}
				function get_incomplete_Legal_search($searchValue)
				{
				$response = array();
				$this->db->select('count(*)as count');
				if($searchValue!= '')
							{
							$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
							$this->db->where($where);
							}
				$this->db->where('legal_documents.Legal_Status!=','Accept From Finaleap');
				$q=$this->db->from('legal_documents');
				$this->db->join('CUSTOMER_APPLIED_LOANS', 'legal_documents.Application_id = CUSTOMER_APPLIED_LOANS.Application_id');
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
				$query = $this->db->get();
							$response = $query->row();
				return $response->count;
				}
				function get_incomplete_Legal_search_details($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
				{
				$response = array();
				$this->db->select('*');
				if($searchValue!= '')
							{
							$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
							$this->db->where($where);
							}
				$this->db->where('legal_documents.Legal_Status!=','Accept From Finaleap');
				$q=$this->db->from('legal_documents');
				$this->db->join('CUSTOMER_APPLIED_LOANS', 'legal_documents.Application_id = CUSTOMER_APPLIED_LOANS.Application_id');
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
				$this->db->limit($rowperpage,$row);
							$query = $this->db->get();
							$response = $query->result();
							//print_r($this->db->last_query());
							//exit;
						
							return $response;
				}
				public function getLegalData(){
					$this->db->select('*');
					$this->db->from('legal_documents');
					
					$q = $this->db->get();
					
					$row = $q->row();
					return $row;
				}
				public function getBankName(){
					$this->db->select('*');
					$this->db->from('cooperator');
					
					$q = $this->db->get();
					
					$row = $q->row();
					return $row;
				}




				/*------------------------------------------- Addded by  sonal on 20_05_2022--------------------------------*/
				function get_complete_Legal()
				{
				$response = array();
				$this->db->select('count(*)as count');
				$this->db->where('Legal_Status','Accept From Finaleap');
				$q=$this->db->from('legal_documents');
				$this->db->join('CUSTOMER_APPLIED_LOANS', 'legal_documents.Application_id = CUSTOMER_APPLIED_LOANS.Application_id');
				$query = $this->db->get();
							$response = $query->row();
				return $response->count;
				}
				function get_complete_Legal_search($searchValue)
				{
				$response = array();
				$this->db->select('count(*)as count');
				if($searchValue!= '')
							{
							$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
							$this->db->where($where);
							}
				$this->db->where('legal_documents.Legal_Status','Accept From Finaleap');
				$q=$this->db->from('legal_documents');
				$this->db->join('CUSTOMER_APPLIED_LOANS', 'legal_documents.Application_id = CUSTOMER_APPLIED_LOANS.Application_id');
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
				$query = $this->db->get();
							$response = $query->row();
				return $response->count;
				}
				function get_complete_Legal_search_details($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
				{
				$response = array();
				$this->db->select('*');
				if($searchValue!= '')
							{
							$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
							$this->db->where($where);
							}
				$this->db->where('legal_documents.Legal_Status','Accept From Finaleap');
				$q=$this->db->from('legal_documents');
				$this->db->join('CUSTOMER_APPLIED_LOANS', 'legal_documents.Application_id = CUSTOMER_APPLIED_LOANS.Application_id');
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
				$this->db->limit($rowperpage,$row);
							$query = $this->db->get();
							$response = $query->result();
							//print_r($this->db->last_query());
							//exit;
						
							return $response;
				}

					/*------------------------------- Added by sonal on 20_05_2022-------------------------------------*/
					function getDashboardData_complete_Legal()
					{
						$response = array();
						$this->db->select('count(*) as count');
						$this->db->where('Legal_status','Accepted from Finaleap');
						$q=$this->db->from('Legal_details');
						$this->db->join('CUSTOMER_APPLIED_LOANS', 'Legal_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
						$query = $this->db->get();
						$response = $query->row();
						return $response->count;
					}
				/*------------------------------- Added by sonal on 20_05_2022-------------------------------------*/
				function getDashboardData_incomplete_Tech()
				{
					$response = array();
					$this->db->select('count(*) as count');
					$this->db->where('Technical_status!=','Accepted From Finaleap');
					$q=$this->db->from('Technical_details');
					$this->db->join('CUSTOMER_APPLIED_LOANS', 'Technical_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
					$query = $this->db->get();
					$response = $query->row();
					return $response->count;
				}
				/*------------------------------------------- Addded by  pappiha on 18_05_2022--------------------------------*/
				function get_incomplete_Tech()
				{
				$response = array();
				$this->db->select('count(*)as count');
				$this->db->where('Technical_Status!=','Accept From Finaleap');
				$q=$this->db->from('legal_documents');
				$this->db->join('CUSTOMER_APPLIED_LOANS', 'legal_documents.Application_id = CUSTOMER_APPLIED_LOANS.Application_id');
				$query = $this->db->get();
							$response = $query->row();
				return $response->count;
				}
				function get_incomplete_Tech_search($searchValue)
				{
				$response = array();
				$this->db->select('count(*)as count');
				if($searchValue!= '')
								{
								$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
								$this->db->where($where);
								}
				$this->db->where('legal_documents.Technical_Status!=','Accept From Finaleap');
				$q=$this->db->from('legal_documents');
				$this->db->join('CUSTOMER_APPLIED_LOANS', 'legal_documents.Application_id = CUSTOMER_APPLIED_LOANS.Application_id');
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
				$query = $this->db->get();
							$response = $query->row();
				return $response->count;
				}
				function get_incomplete_Tech_search_details($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
				{
				$response = array();
				$this->db->select('*');
				if($searchValue!= '')
								{
								$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
								$this->db->where($where);
								}
				$this->db->where('legal_documents.Technical_Status!=','Accept From Finaleap');
				$q=$this->db->from('legal_documents');
				$this->db->join('CUSTOMER_APPLIED_LOANS', 'legal_documents.Application_id = CUSTOMER_APPLIED_LOANS.Application_id');
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
				$this->db->limit($rowperpage,$row);
							$query = $this->db->get();
							$response = $query->result();
							//print_r($this->db->last_query());
							//exit;
						
							return $response;
				}
				
				
				
				/*------------------------------- Added by sonal on 20_05_2022-------------------------------------*/
				function getDashboardData_complete_Tech()
				{
					$response = array();
					$this->db->select('count(*) as count');
					$this->db->where('Technical_status','Accepted from Finaleap');
					$q=$this->db->from('Technical_details');
					$this->db->join('CUSTOMER_APPLIED_LOANS', 'Technical_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
					$query = $this->db->get();
					$response = $query->row();
					return $response->count;
				}
				/*------------------------------------------- Addded by  sonal on 20_05_2022--------------------------------*/
				function get_complete_Tech()
				{
				$response = array();
				$this->db->select('count(*)as count');
				$this->db->where('Technical_Status','Accept From Finaleap');
				$q=$this->db->from('legal_documents');
				$this->db->join('CUSTOMER_APPLIED_LOANS', 'legal_documents.Application_id = CUSTOMER_APPLIED_LOANS.Application_id');
				$query = $this->db->get();
							$response = $query->row();
				return $response->count;
				}
				function get_complete_Tech_search($searchValue)
				{
				$response = array();
				$this->db->select('count(*)as count');
				if($searchValue!= '')
								{
								$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
								$this->db->where($where);
								}
				$this->db->where('legal_documents.Technical_Status','Accept From Finaleap');
				$q=$this->db->from('legal_documents');
				$this->db->join('CUSTOMER_APPLIED_LOANS', 'legal_documents.Application_id = CUSTOMER_APPLIED_LOANS.Application_id');
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
				$query = $this->db->get();
							$response = $query->row();
				return $response->count;
				}
				function get_complete_Tech_search_details($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
				{
				$response = array();
				$this->db->select('*');
				if($searchValue!= '')
								{
								$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
								$this->db->where($where);
								}
				$this->db->where('legal_documents.Technical_Status','Accept From Finaleap');
				$q=$this->db->from('legal_documents');
				$this->db->join('CUSTOMER_APPLIED_LOANS', 'legal_documents.Application_id = CUSTOMER_APPLIED_LOANS.Application_id');
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
				$this->db->limit($rowperpage,$row);
							$query = $this->db->get();
							$response = $query->result();
							//print_r($this->db->last_query());
							//exit;
						
							return $response;
				}
/*--------------------------Addded by papiha on 23_05_2022----------------------------------------------*/
				function get_document_details($ID)
				{
					 $this->db->select('*');
					 $this->db->from('DOCUMENTS');
					 $this->db->where('ID',$ID);  
					 $query = $this->db->get();
					 $response = $query->row();
					 return $response; 
				}
				/*------------------------ added by priya 12-08-2022---------------------------------------------- */
public function online_login_fees_details($id)
	{
      $this->db->select('*');
      $this->db->from('online_login_fees');
      $this->db->where('Cust_id', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }
    public function offline_login_fees_details($id)
	{
      $this->db->select('*');
      $this->db->from('offline_login_fees');
      $this->db->where('Cust_id', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }
/*-------------------------------- addded by papiha on 17_08_2022---------------------------------------*/
function getDashboardData_complete_FI()
				{
					$response = array();
					$this->db->select('count(*) as count');
					$this->db->where('fi_status','Accepted from Finaleap');
					$q=$this->db->from('fi_details');
					$this->db->join('CUSTOMER_APPLIED_LOANS', 'fi_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
					$query = $this->db->get();
					$response = $query->row();
					return $response->count;
				}
				function getDashboardData_complete_RCU()
				{
					$response = array();
					$this->db->select('count(*) as count');
					$this->db->where('RCU_status','Accepted from Finaleap');
					$q=$this->db->from('RCU_details');
					$this->db->join('CUSTOMER_APPLIED_LOANS', 'RCU_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
					$query = $this->db->get();
					$response = $query->row();
					return $response->count;
				}
				function getDashboardData_incomplete_FI()
				{
					$response = array();
					$this->db->select('count(*) as count');
					$this->db->where('fi_status!=','Accepted from Finaleap');
					$q=$this->db->from('fi_details');
					$this->db->join('CUSTOMER_APPLIED_LOANS', 'fi_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
					$query = $this->db->get();
					$response = $query->row();
					return $response->count;
				}
				function getDashboardData_incomplete_RCU()
				{
					$response = array();
					$this->db->select('count(*) as count');
					$this->db->where('RCU_status!=','Accepted from Finaleap');
					$q=$this->db->from('RCU_details');
					$this->db->join('CUSTOMER_APPLIED_LOANS', 'RCU_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
					$query = $this->db->get();
					$response = $query->row();
					return $response->count;
				}
				public function Get_Customer_Count_Legal_Completed($searchValue)
				{
					/*$this->db->select('count(*) as count');
						$this->db->where('Legal_status','Accepted from Finaleap');
						$q=$this->db->from('Legal_details');
						$this->db->join('CUSTOMER_APPLIED_LOANS', 'Legal_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
						$query = $this->db->get();
						$response = $query->row();
						*/
							$response = array();
							$this->db->select('count(*) as count');
							$where = 'ROLE=1';
							$this->db->where($where);
							if($searchValue!= '')
								{
								$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
								$this->db->where($where);
								}
							$this->db->where('Legal_details.Legal_status','Accepted from Finaleap');
							$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
							$this->db->join('Legal_details', 'Legal_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
							$query = $this->db->get();
							$response = $query->row();
							
							return $response->count;
							
							

				}
				public function Get_Customer_With_Page_Legal_Completed($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
				{
					$response = array();
					$this->db->select('*');
					$where = 'ROLE=1';
					$this->db->where($where);
					if($searchValue!= '')
						{
						$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
						$this->db->where($where);
						}
					$this->db->where('Legal_details.Legal_status','Accepted from Finaleap');
					$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
					$this->db->join('Legal_details', 'Legal_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
					$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
					$query = $this->db->get();
					$response = $query->result();
					
					return $response;
				}
				public function Get_Customer_Count_Legal_InCompleted($searchValue)
				{
					/*$this->db->select('count(*) as count');
						$this->db->where('Legal_status','Accepted from Finaleap');
						$q=$this->db->from('Legal_details');
						$this->db->join('CUSTOMER_APPLIED_LOANS', 'Legal_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
						$query = $this->db->get();
						$response = $query->row();
						*/
							$response = array();
							$this->db->select('count(*) as count');
							$where = 'ROLE=1';
							$this->db->where($where);
							if($searchValue!= '')
								{
								$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
								$this->db->where($where);
								}
							$this->db->where('Legal_details.Legal_status!=','Accepted from Finaleap');
							$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
							$this->db->join('Legal_details', 'Legal_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
							$query = $this->db->get();
							$response = $query->row();
							
							return $response->count;
							
							

				}
				public function Get_Customer_With_Page_Legal_InCompleted($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
				{
					$response = array();
					$this->db->select('*');
					$where = 'ROLE=1';
					$this->db->where($where);
					if($searchValue!= '')
						{
						$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
						$this->db->where($where);
						}
					$this->db->where('Legal_details.Legal_status!=','Accepted from Finaleap');
					$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
					$this->db->join('Legal_details', 'Legal_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
					$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
					$query = $this->db->get();
					$response = $query->result();
					
					return $response;
				}
				public function Get_Customer_Count_Technical_Completed($searchValue)
				{
					/*$this->db->select('count(*) as count');
						$this->db->where('Legal_status','Accepted from Finaleap');
						$q=$this->db->from('Legal_details');
						$this->db->join('CUSTOMER_APPLIED_LOANS', 'Legal_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
						$query = $this->db->get();
						$response = $query->row();
						*/
							$response = array();
							$this->db->select('count(*) as count');
							$where = 'ROLE=1';
							$this->db->where($where);
							if($searchValue!= '')
								{
								$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
								$this->db->where($where);
								}
							$this->db->where('Technical_details.Technical_status','Accepted from Finaleap');
							$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
							$this->db->join('Technical_details', 'Technical_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
							$query = $this->db->get();
							$response = $query->row();
							
							return $response->count;
							
							

				}
				public function Get_Customer_With_Page_Technical_Completed($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
				{
					$response = array();
					$this->db->select('*');
					$where = 'ROLE=1';
					$this->db->where($where);
					if($searchValue!= '')
						{
						$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
						$this->db->where($where);
						}
					$this->db->where('Technical_details.Technical_status','Accepted from Finaleap');
					$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
					$this->db->join('Technical_details', 'Technical_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
					$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
					$query = $this->db->get();
					$response = $query->result();
					
					return $response;
				}
				public function Get_Customer_Count_Technical_InCompleted($searchValue)
				{
					/*$this->db->select('count(*) as count');
						$this->db->where('Legal_status','Accepted from Finaleap');
						$q=$this->db->from('Legal_details');
						$this->db->join('CUSTOMER_APPLIED_LOANS', 'Legal_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
						$query = $this->db->get();
						$response = $query->row();
						*/
							$response = array();
							$this->db->select('count(*) as count');
							$where = 'ROLE=1';
							$this->db->where($where);
							if($searchValue!= '')
								{
								$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
								$this->db->where($where);
								}
							$this->db->where('Technical_details.Technical_status!=','Accepted from Finaleap');
							$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
							$this->db->join('Technical_details', 'Technical_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
							$query = $this->db->get();
							$response = $query->row();
							
							return $response->count;
							
							

				}
				public function Get_Customer_With_Page_Technical_InCompleted($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
				{
					$response = array();
					$this->db->select('*');
					$where = 'ROLE=1';
					$this->db->where($where);
					if($searchValue!= '')
						{
						$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
						$this->db->where($where);
						}
					$this->db->where('Technical_details.Technical_status!=','Accepted from Finaleap');
					$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
					$this->db->join('Technical_details', 'Technical_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
					$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
					$query = $this->db->get();
					$response = $query->result();
					
					return $response;
				}
				public function Get_Customer_Count_FI_Completed($searchValue)
				{
					/*$this->db->select('count(*) as count');
						$this->db->where('Legal_status','Accepted from Finaleap');
						$q=$this->db->from('Legal_details');
						$this->db->join('CUSTOMER_APPLIED_LOANS', 'Legal_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
						$query = $this->db->get();
						$response = $query->row();
						*/
							$response = array();
							$this->db->select('count(*) as count');
							$where = 'ROLE=1';
							$this->db->where($where);
							if($searchValue!= '')
								{
								$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
								$this->db->where($where);
								}
							$this->db->where('fi_details.fi_status','Accepted from Finaleap');
							$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
							$this->db->join('fi_details', 'fi_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
							$query = $this->db->get();
							$response = $query->row();
							
							return $response->count;
							
							

				}
				public function Get_Customer_With_Page_FI_Completed($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
				{
					$response = array();
					$this->db->select('*');
					$where = 'ROLE=1';
					$this->db->where($where);
					if($searchValue!= '')
						{
						$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
						$this->db->where($where);
						}
					$this->db->where('fi_details.fi_status','Accepted from Finaleap');
					$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
					$this->db->join('fi_details', 'fi_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
					$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
					$query = $this->db->get();
					$response = $query->result();
					
					return $response;
				}
				public function Get_Customer_Count_FI_InCompleted($searchValue)
				{
					/*$this->db->select('count(*) as count');
						$this->db->where('Legal_status','Accepted from Finaleap');
						$q=$this->db->from('Legal_details');
						$this->db->join('CUSTOMER_APPLIED_LOANS', 'Legal_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
						$query = $this->db->get();
						$response = $query->row();
						*/
							$response = array();
							$this->db->select('count(*) as count');
							$where = 'ROLE=1';
							$this->db->where($where);
							if($searchValue!= '')
								{
								$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
								$this->db->where($where);
								}
							$this->db->where('fi_details.fi_status!=','Accepted from Finaleap');
							$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
							$this->db->join('fi_details', 'fi_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
							$query = $this->db->get();
							$response = $query->row();
							
							return $response->count;
							
							

				}
				public function Get_Customer_With_Page_FI_InCompleted($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
				{
					$response = array();
					$this->db->select('*');
					$where = 'ROLE=1';
					$this->db->where($where);
					if($searchValue!= '')
						{
						$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
						$this->db->where($where);
						}
					$this->db->where('fi_details.fi_status!=','Accepted from Finaleap');
					$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
					$this->db->join('fi_details', 'fi_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
					$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
					$query = $this->db->get();
					$response = $query->result();
					
					return $response;
				}
				public function Get_Customer_Count_RCU_Completed($searchValue)
				{
					/*$this->db->select('count(*) as count');
						$this->db->where('Legal_status','Accepted from Finaleap');
						$q=$this->db->from('Legal_details');
						$this->db->join('CUSTOMER_APPLIED_LOANS', 'Legal_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
						$query = $this->db->get();
						$response = $query->row();
						*/
							$response = array();
							$this->db->select('count(*) as count');
							$where = 'ROLE=1';
							$this->db->where($where);
							if($searchValue!= '')
								{
								$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
								$this->db->where($where);
								}
							$this->db->where('RCU_details.RCU_status','Accepted from Finaleap');
							$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
							$this->db->join('RCU_details', 'RCU_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
							$query = $this->db->get();
							$response = $query->row();
							
							return $response->count;
							
							

				}
				public function Get_Customer_With_Page_RCU_Completed($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
				{
					$response = array();
					$this->db->select('*');
					$where = 'ROLE=1';
					$this->db->where($where);
					if($searchValue!= '')
						{
						$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
						$this->db->where($where);
						}
					$this->db->where('RCU_details.RCU_status','Accepted from Finaleap');
					$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
					$this->db->join('RCU_details', 'RCU_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
					$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
					$query = $this->db->get();
					$response = $query->result();
					//print_r($this->db->last_query());
							//exit;
						
					return $response;
				}
				public function Get_Customer_Count_RCU_InCompleted($searchValue)
				{
					/*$this->db->select('count(*) as count');
						$this->db->where('Legal_status','Accepted from Finaleap');
						$q=$this->db->from('Legal_details');
						$this->db->join('CUSTOMER_APPLIED_LOANS', 'Legal_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
						$query = $this->db->get();
						$response = $query->row();
						*/
							$response = array();
							$this->db->select('count(*) as count');
							$where = 'ROLE=1';
							$this->db->where($where);
							if($searchValue!= '')
								{
								$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
								$this->db->where($where);
								}
							$this->db->where('RCU_details.RCU_status!=','Accepted from Finaleap');
							$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
							$this->db->join('RCU_details', 'RCU_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
							$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
							$query = $this->db->get();
							$response = $query->row();
							
							return $response->count;
							
							

				}
				public function Get_Customer_With_Page_RCU_InCompleted($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
				{
					$response = array();
					$this->db->select('*');
					$where = 'ROLE=1';
					$this->db->where($where);
					if($searchValue!= '')
						{
						$where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
						$this->db->where($where);
						}
					$this->db->where('RCU_details.RCU_status!=','Accepted from Finaleap');
					$q=$this->db->from('CUSTOMER_APPLIED_LOANS');
					$this->db->join('RCU_details', 'RCU_details.application_number = CUSTOMER_APPLIED_LOANS.Application_id');	
					$this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
					$query = $this->db->get();
					$response = $query->result();
					
					return $response;
				}

				//==================== added by priya
				public function get_all_disbursement_documents($id)
				{
					  $response = array();
			      $this->db->select('*');
			      $this->db->from('Disbursement_DOCUMENTS');
			      $this->db->where('USER_ID', $id);
			     	$query = $this->db->get();
			     	$response = $query->result();
			     	return $response;
			    }

			    public function check_document($doc_id,$id)
						{
					      $this->db->select('count(*) as count');
					      $this->db->from('Disbursement_DOCUMENTS');
					      $this->db->where('selected_document_type_id', $doc_id);
						   $this->db->where('USER_ID', $id);
					      $q = $this->db->get();
					      $row = $q->row();
					      return $row->count;
					     // echo $row->count;
					    //  exit();
					     // $executedQuery = $this->db->last_query();
     //  print_r($executedQuery);
      //  exit;
					    }
						
	public function getsanctionLetterDetails($id){
      $this->db->select('*');
      $this->db->from('sanction_letter_values');
      $this->db->where('customer_id', $id);
	  //$this->db->order_by("ID", "desc");
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }
	
	//----------------------------------------------------- addded by priya 10-09-2022
	   function customers_for_editing_DSA($filter, $login_user_id)
    {
      if($filter=='all')
      {
           $response = array();
      $this->db->select('count(*) as count');
	  $this->db->where("DSA_ID",$login_user_id);
      $where = '(ROLE=1)';
	  
      $this->db->where($where);
      $q=$this->db->from('USER_DETAILS');
      $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
      $this->db->order_by("USER_DETAILS.ID", "desc");
      $query = $this->db->get();
      $response = $query->row();
      //exit;
      return $response->count;
      }
     
      
      else
      {     
       $response = array();
      $this->db->select('count(*) as count');
	   $this->db->where("DSA_ID",$login_user_id);
      $where = '(ROLE=1)';
      $this->db->where($where);
      $q=$this->db->from('USER_DETAILS');
      $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
    $this->db->order_by("USER_DETAILS.ID", "desc");
      $query = $this->db->get();
      $response = $query->row();
      //exit;
      return $response->count;
      }
    
    
    }
  
  public function Get_customers_for_editing_Filter_In_CAM_DSA($searchValue,$filter, $login_user_id)
  {
    if($filter=='all')
      {
        $response = array();
        $this->db->select('count(*) as count');
		 $this->db->where("DSA_ID",$login_user_id);
        $where = 'ROLE=1';
        $this->db->where($where);
        if($searchValue!= '')
          {
           $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
           $this->db->where($where);
          }
        $q=$this->db->from('USER_DETAILS');
        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
       $this->db->order_by("USER_DETAILS.ID", "desc");
        $query = $this->db->get();
            $response = $query->row();
          
          //exit;
          return $response->count;
        }
        
       

        else
        {
          $response = array();
          $this->db->select('count(*) as count');
		   $this->db->where("DSA_ID",$login_user_id);
          $where = 'ROLE=1';
          $this->db->where($where);
          if($searchValue!= '')
          {
           $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
           $this->db->where($where);
          }
        $q=$this->db->from('USER_DETAILS');
        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
 $this->db->order_by("USER_DETAILS.ID", "desc");
        $query = $this->db->get();
            $response = $query->row();
          
          //exit;
          return $response->count;
        }

  }
  public function Get_customers_for_editing_In_CAM_DSA($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter, $login_user_id)
  {
      if($filter=='all')
        {
          $response = array();
          $this->db->select('*');
		   $this->db->where("DSA_ID",$login_user_id);
          $where = 'ROLE=1';
          $this->db->where($where);
          if($searchValue!= '')
          {
          $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
          $this->db->where($where);
          }
          $this->db->from('USER_DETAILS');
          $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
      $this->db->order_by("USER_DETAILS.ID", "desc");
        //  $this->db->order_by($columnName, $columnSortOrder);
          $this->db->limit($rowperpage,$row);
          $query = $this->db->get();
          $response = $query->result();
          //print_r($this->db->last_query());
          //exit;
		  
		  foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
          
            return $response;
          }
         
        

          else
          {
            $response = array();
            $this->db->select('*');
			 $this->db->where("DSA_ID",$login_user_id);
            $where = 'ROLE=1';
            $this->db->where($where);
            if($searchValue!= '')
              {
              $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
              $this->db->where($where);
              }
            $q=$this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->order_by("USER_DETAILS.ID", "desc");
            //$this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
            //print_r($this->db->last_query());
            //exit;
			
			foreach($response as $row)
			{
				if(isset($row->PAN_NUMBER) && $row->PAN_NUMBER != '')
	  {
			 $pan = $row->PAN_NUMBER;
			  $row->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($row->AADHAR_NUMBER) && $row->AADHAR_NUMBER != '')
	  {
			   $row->AADHAR_NUMBER = $this->decryption($row->AADHAR_NUMBER);
	  }
	  
	  if(isset($row->DOB) && $row->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->DOB = $this->decryption($row->DOB);
	  }
				
			}
			
            return $response;
          }
    
      }
   //================== added by priya 12-09-2022
   	public function get_disbursement_agreement_details($id){
      $this->db->select('*');
      $this->db->from('disbursement_loan_agreement_details');
      $this->db->where('customer_ID', $id);
	  //$this->db->order_by("ID", "desc");
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }
	
  }
  ?>