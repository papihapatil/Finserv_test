<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomerCrud_model extends CI_Model {

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
		
		
		public function update_profile($id, $data){
      $this->db->where('UNIQUE_CODE', $id);
	  //print_r($data);
	   if(isset($data['PAN_NUMBER']) && $data['PAN_NUMBER'] != '')
	  {
			$data['PAN_NUMBER'] = $this->encryption($data['PAN_NUMBER']);
	  }
	  
	  if(isset($data['AADHAR_NUMBER']) && $data['AADHAR_NUMBER'] != '')
	  {
			$data['AADHAR_NUMBER'] = $this->encryption($data['AADHAR_NUMBER']);
	  }
	  
	  if(isset($data['DOB']) && $data['DOB'] != '')
	  {
			$data['DOB'] = $this->encryption($data['DOB']);
	  }
	  
	 //$this->db->update('USER_DETAILS', $data);
	  
	  //echo $this->db->last_query();
	  
	  //exit;
	  
      return $this->db->update('USER_DETAILS', $data);
    }

    public function update_profile2($id, $data){
      $this->db->where('UNIQUE_CODE', $id);
	  
	   if(isset($data['PAN_NUMBER']) && $data['PAN_NUMBER'] != '')
	  {
			$data['PAN_NUMBER'] = $this->encryption($data['PAN_NUMBER']);
	  }
	  
	  if(isset($data['AADHAR_NUMBER']) && $data['AADHAR_NUMBER'] != '')
	  {
			$data['AADHAR_NUMBER'] = $this->encryption($data['AADHAR_NUMBER']);
	  }
	  
	  if(isset($data['DOB']) && $data['DOB'] != '')
	  {
			$data['DOB'] = $this->encryption($data['DOB']);
	  }
	  
      return $this->db->update('USER_DETAILS', $data);
    }

    public function update_profile_more($id, $data){
      $this->db->where('CUST_ID', $id);
	  if(isset($data['KYC']) && $data['KYC'] != '')
	  {
			$data['KYC'] = $this->encryption($data['KYC']);
	  }
	  if(isset($data['PAN_NUMBER']) && $data['PAN_NUMBER'] != '')
	  {
			$data['PAN_NUMBER'] = $this->encryption($data['PAN_NUMBER']);
	  }
	  
	  if(isset($data['AADHAR_NUMBER']) && $data['AADHAR_NUMBER'] != '')
	  {
			$data['AADHAR_NUMBER'] = $this->encryption($data['AADHAR_NUMBER']);
	  }
	  
	  if(isset($data['DOB']) && $data['DOB'] != '')
	  {
			$data['DOB'] = $this->encryption($data['DOB']);
	  }
	  
	  $result = $this->db->update('CUSTOMER_MORE_DETAILS', $data);
	  
	 // echo $this->db->last_query();
	  
      return $result;
    }

    public function co_update_profile_more($id, $data){
      $this->db->where('UNIQUE_CODE', $id);
	  
	   if(isset($data['PAN_NUMBER']) && $data['PAN_NUMBER'] != '')
	  {
			$data['PAN_NUMBER'] = $this->encryption($data['PAN_NUMBER']);
	  }
	  
	  if(isset($data['AADHAR_NUMBER']) && $data['AADHAR_NUMBER'] != '')
	  {
			$data['AADHAR_NUMBER'] = $this->encryption($data['AADHAR_NUMBER']);
	  }
	  
	  if(isset($data['DOB']) && $data['DOB'] != '')
	  {
			$data['DOB'] = $this->encryption($data['DOB']);
	  }
	  
	  if(isset($data['KYC']) && $data['KYC'] != '')
	  {
			$data['KYC'] = $this->encryption($data['KYC']);
	  }
	  
      return $this->db->update('COAPPLICANT_DETAILS', $data);
    }

    public function insert_profile_more($id, $data){
      $this->db->where('CUST_ID', $id);
	  
	  if(isset($data['KYC']) && $data['KYC'] != '')
	  {
			$data['KYC'] = $this->encryption($data['KYC']);
	  }
	  
      return $this->db->insert('CUSTOMER_MORE_DETAILS', $data);
    }

    //income details
    public function update_profile_income_details($id, $data){
      $this->db->where('CUST_ID', $id);
      return $this->db->update('CUSTOMER_INCOME_DETAILS', $data);
    }

    public function insert_profile_income_details($id, $data){
      $this->db->where('CUST_ID', $id);
      return $this->db->insert('CUSTOMER_INCOME_DETAILS', $data);
    }

    public function update_login_fees_offline($id, $data){
      $this->db->where('Cust_id', $id);
      return $this->db->update('offline_login_fees', $data);
    }
    public function update_login_fees_online($id, $data){
      $this->db->where('Cust_id', $id);
      return $this->db->update('online_login_fees', $data);
    }
    public function getProfileData($id){
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID =USER_DETAILS.UNIQUE_CODE');
      $this->db->where('UNIQUE_CODE', $id);
      $q = $this->db->get();
	  
	  //echo $this->db->last_query();
      $row = $q->row();
	  
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
	  
	  //echo "<br> ".$this->db->last_query();
	  
      return $row;
    }
	
	public function getCustomerId($id)
	{
		$this->db->select('*');
      $this->db->from('CUSTOMER_APPLIED_LOANS');
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID =USER_DETAILS.UNIQUE_CODE');
      $this->db->where('CUST_ID', $id);
      $q = $this->db->get();
      $row = $q->row();
	  
	  return $row;
	}
	
	 public function getProfileData_coapp($id){
      $this->db->select('*');
      $this->db->from('COAPPLICANT_DETAILS');
      $this->db->where('UNIQUE_CODE', $id);
      $q = $this->db->get();
      $row = $q->row();
	  
	  if(isset($row->KYC) && $row->KYC != '')
	  {
			 $kyc = $row->KYC;
			  $row->KYC = $this->decryption($kyc);
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
	
	 public function select_ID($mobile){

      $this->db->select('*');
      $this->db->from('USER_DETAILS');
	  $where = "EMAIL='".$mobile."'OR MOBILE='".$mobile."'";
	  $this->db->where($where);
	  $q = $this->db->get();
	  if($q->num_rows()>0)
	  {
       $row = $q->row()->UNIQUE_CODE;
	   //$row=$q->num_rows;
	   return $row;
	  }
      else{
		  return Null;
	  }
    }


    public function getCreditScoreSavedProfileData($id){
      $this->db->select('*');
      $this->db->from('credit_score_user_details');
      $this->db->where('customer_id', $id);
      $q = $this->db->get();
      $row = $q->row();
	  
	  if(isset($row->pan) && $row->pan != '')
	  {
			 $pan = $row->pan;
			  $row->pan = $this->decryption($pan);
	  }
	  
	
	  
	  if(isset($row->dob) && $row->dob != '')
	  {
		  //echo $row->DOB."<br>";
			  $row->dob = $this->decryption($row->dob);
	  }
	  
      return $row;
    }

    public function getStateAbbr($stateName){
      $this->db->select('*');
      $this->db->from('locations');
      $this->db->where('statename', $stateName);
      $this->db->limit(1);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }

    public function getCoapplicantByMobile($mobile){
      $this->db->select('*');
      $this->db->from('COAPPLICANT_DETAILS');
      $this->db->where('MOBILE', $mobile);
      $q = $this->db->get();
      $row = $q->row();
	  
	  if(isset($row->KYC) && $row->KYC != '')
	  {
			 $kyc = $row->KYC;
			  $row->KYC = $this->decryption($kyc);
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
      $this->db->where('UNIQUE_CODE', $id);
      $q = $this->db->get();
      $row = $q->row();
	  
	  if(isset($row->KYC) && $row->KYC != '')
	  {
			 $kyc = $row->KYC;
			  $row->KYC = $this->decryption($kyc);
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

    public function getCoapplicantIncome($coappid){
      $this->db->select('*');
      $this->db->from('COAPPLICANT_INCOME_DETAILS');
      $this->db->where('COAPP_ID', $coappid);
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
	  
	 // print_r($row);
	  
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
	  
	  //print_r($row);
	  
      return $row;
    }

    public function getSingleDoc($id){
      $this->db->select('*');
      $this->db->from('DOCUMENTS');
      $this->db->where('ID', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }

    public function getProfileDataIncome($id){
      $this->db->select('*');
      $this->db->from('CUSTOMER_INCOME_DETAILS');
      $this->db->where('CUST_ID', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }

    public function getDocuments($id){
      $response = array();
      $this->db->select('*');
      $this->db->where("USER_ID", $id);
      $q = $this->db->from('DOCUMENTS');
      $this->db->order_by("ID", "asc");
      $response = $q->get()->result();
      return $response;
    }
	public function getDocuments_Doctype($id){
      $response = array();
      $this->db->select('DOC_MASTER_TYPE');
      $this->db->where("USER_ID", $id);
      $q = $this->db->from('DOCUMENTS');
      $this->db->order_by("ID", "desc");
      $response = $q->get()->result();
      return $response;
    }
	 public function getDocuments_homeloan($id,$masterType){
      $response = array();
      $this->db->select('*');
      $this->db->where("USER_ID", $id);
	   $this->db->where("DOC_MASTER_TYPE", $masterType);
      $q = $this->db->from('DOCUMENTS');
      $this->db->order_by("ID", "desc");
      $response = $q->get()->result();
      /*$str = $this->db->last_query();
	    echo "<pre>";
      print_r($str);
      exit;*/
      return $response;
    }
	public function getDocuments_lap_loan($id){
      $response = array();
      $this->db->select('*');
      $this->db->where("USER_ID", $id);
	   $this->db->where("DOC_MASTER_TYPE", 'LAP');
      $q = $this->db->from('DOCUMENTS');
      //$this->db->order_by("ID", "desc");

      $response = $q->get()->result();
	  	
      return $response;
	  
    }

    public function checkSavedDocument($id, $type, $mastertype){
      $response = array();
      $this->db->select('*');
      $this->db->where("USER_ID", $id);
      $this->db->where("DOC_TYPE", $type);
      $this->db->where("DOC_MASTER_TYPE", $mastertype);
      $q = $this->db->from('DOCUMENTS');
      $response = $q->get();
     /* $str = $this->db->last_query();
	    echo "<pre>";
      print_r($str);
      exit;*/
      if ( $response->num_rows() > 0 ){
             return 1;
      }else return 0;
    }
	 public function check_Mandatory_Document($id, $type, $mastertype){
      
      $this->db->select('*');
      $this->db->where("DOC_FOR", $id);
      $this->db->where("DOC_NAME", $type);
      $this->db->where("DOC_MASTER_TYPE", $mastertype);
      $q = $this->db->from('DOCUMENTS_TYPE');
	   $query = $this->db->get();
	   
	  $row = $query->row();
	  
      return $row->DOC_MANDATORY;
	  
     
     
    }
	
	

    public function getDocumentsType($id, $masterType){
		
      $response = array();
      $this->db->select('*');
     
         $this->db->where("DOC_MASTER_TYPE", $masterType);
	 
	    $where = '(DOC_FOR="0" or DOC_FOR = "'.$id.'")';
       $this->db->where($where);
	
	  
     
      $q = $this->db->from('DOCUMENTS_TYPE');
      $this->db->order_by("ID", "desc");
      $response = $q->get()->result();
	  
	  //echo $this->db->last_query();
	
      return $response;
    } 
	
	public function getallDocumentsType_for_retailer($id, $masterType){
		
      $response = array();
      $this->db->select('*');
     
         //$this->db->where("DOC_MASTER_TYPE", $masterType);
	 
	    $where = '(DOC_FOR = "'.$id.'")';
       $this->db->where($where);
	
	  
     
      $q = $this->db->from('DOCUMENTS_TYPE');
      $this->db->order_by("ID", "asc");
      $response = $q->get()->result();
	  
	//  echo $this->db->last_query();
	
      return $response;
    }    

	    public function getDocumentsType_for_retailer($id, $masterType){
		
      $response = array();
      $this->db->select('*');
     
         $this->db->where("DOC_MASTER_TYPE", $masterType);
	 
	    $where = '(DOC_FOR = "'.$id.'")';
       $this->db->where($where);
	
	  
     
      $q = $this->db->from('DOCUMENTS_TYPE');
      $this->db->order_by("ID", "desc");
      $response = $q->get()->result();
	  //echo "TEST =";
	  //echo $this->db->last_query();
	
      return $response;
    }    
	
	 public function getDocumentsType_for_homeloan($id, $masterType){
      $response = array();
      $this->db->select('*');
      $this->db->where("DOC_FOR", $id);
      $this->db->where("DOC_MASTER_TYPE", $masterType);
      $q = $this->db->from('DOCUMENTS_TYPE');
      $this->db->order_by("ID", "desc");
      $response = $q->get()->result();
      $str = $this->db->last_query();
	 /* echo "<pre>";
      print_r($str);
      exit;*/
      return $response;
    }    
	 public function getDocumentscount_for_homeloan($id, $masterType){
     
      /*$this->db->select('*');
      $this->db->where("DOC_FOR", $id);
     
	   $this->db->where("DOC_MASTER_TYPE", $masterType);
      $q = $this->db->from('DOCUMENTS_TYPE');
      $this->db->order_by("ID", "desc");
      $response = $q->get()->num_rows();
      return $response;*/
      $response = array();
      $this->db->select('*');
	    $this->db->from('master_doc_type_count');
      $this->db->where("Master_Doc_Type", $masterType);
	     $q = $this->db->get();
      $row = $q->row();
	      return  $row->Doc_Count;
    }  
	 public function getDocumentscount_for_LAP($id, $masterType){
     
      $this->db->select('*');
      $this->db->where("DOC_FOR", $id);
      $this->db->where("DOC_MANDATORY", 'YES');
	   $this->db->where("DOC_MASTER_TYPE", $masterType);
      $q = $this->db->from('DOCUMENTS_TYPE');
      $this->db->order_by("ID", "desc");
      $response = $q->get()->num_rows();
      return $response;
    }  

    public function getAppliedLoans($id){
      $response = array();
      $this->db->select('*');
      $this->db->where("CUST_ID", $id);
      $q = $this->db->from('CUSTOMER_APPLIED_LOANS');
      $this->db->order_by("ID", "desc");
      $response = $q->get()->result();
      return $response;
    }

    public function saveDocuments($data){
      
      $this->db->insert('DOCUMENTS',$data);
      return $this->db->insert_id();
      
    }    

    public function saveApplyLoan($data){
      $this->db->insert('APPLIED_LOANS',$data);
      return $this->db->insert_id();
    }

    public function delete_doc($data){      
      return $this->db->delete('DOCUMENTS', $data); 

    }

    public function check_mobile($id, $mobile){
      $response = array();
      $this->db->select('*');
      $this->db->where("MOBILE", $mobile);
      $this->db->where('UNIQUE_CODE !=', $id);
      $q = $this->db->from('USER_DETAILS');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }

    public function check_more_profile($id){
      $response = array();
      $this->db->select('*');
      $this->db->where("CUST_ID", $id);      
      $q = $this->db->from('CUSTOMER_MORE_DETAILS');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }

    public function check_income_profile($id){
      $response = array();
      $this->db->select('*');
      $this->db->where("CUST_ID", $id);      
      $q = $this->db->from('CUSTOMER_INCOME_DETAILS');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }

    public function check_mobile_income_1($id, $mobile){
      $response = array();
      $this->db->select('*');
      $this->db->where("REF_1_MOBILE", $mobile);
      $this->db->where('CUST_ID !=', $id);
      $q = $this->db->from('CUSTOMER_INCOME_DETAILS');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }

    public function check_mobile_income_2($id, $mobile){
      $response = array();
      $this->db->select('*');
      $this->db->where("REF_2_MOBILE", $mobile);
      $this->db->where('CUST_ID !=', $id);
      $q = $this->db->from('CUSTOMER_INCOME_DETAILS');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }

    public function check_email($id, $email){
      $response = array();
      $this->db->select('*');
      $this->db->where("EMAIL", $email);
      $this->db->where('UNIQUE_CODE !=', $id);
      $q = $this->db->from('USER_DETAILS');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;      
    }

    public function get_address($id){
      $response = array();
      $this->db->select('*');
      $this->db->where("CUST_ID", $id);      
      $this->db->from('CUSTOMER_MORE_DETAILS');
      $q = $this->db->get();
      $row = $q->row();
	  if(isset($row->KYC) && $row->KYC != '')
	  {
			 $kyc = $row->KYC;
			  $row->KYC = $this->decryption($kyc);
	  }
      return $row;
    }

    public function get_coapp_address($id){
      $response = array();
      $this->db->select('*');
      $this->db->where("UNIQUE_CODE", $id);      
      $this->db->from('COAPPLICANT_DETAILS');
      $q = $this->db->get();
      $row = $q->row();
	  
	  if(isset($row->KYC) && $row->KYC != '')
	  {
			 $kyc = $row->KYC;
			  $row->KYC = $this->decryption($kyc);
	  }
	  if(isset($row->KYC_doc_1) && $row->KYC_doc_1 == 'Pan card')
	  {
			 $kyc = $row->KYC;
			  $row->KYC = $this->decryption($kyc);
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

    public function get_address_by_pincode($pincode){
      $response = array();
      $this->db->select('*');
      $this->db->where("pincode", $pincode);      
      $this->db->from('locations');
      $q = $this->db->get();
      $row = $q->row();
      //print_r($this->db->last_query());    
      return $row;
    }

    public function check_mobile_coapplicant($id, $mobile){
      $response = array();
      $this->db->select('*');
      $this->db->where("MOBILE", $mobile);
      $this->db->where('UNIQUE_CODE !=', $id);
      $q = $this->db->from('COAPPLICANT_DETAILS');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }

    public function check_email_coapplicant($id, $email){
      $response = array();
      $this->db->select('*');
      $this->db->where("EMAIL", $email);
      $this->db->where('UNIQUE_CODE !=', $id);
      $q = $this->db->from('COAPPLICANT_DETAILS');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }

    public function check_mobile_coapplicant_ref1($id, $mobile){
      $response = array();
      $this->db->select('*');
      $this->db->where("REF_1_MOBILE", $mobile);
      $this->db->where('COAPP_ID !=', $id);
      $q = $this->db->from('COAPPLICANT_INCOME_DETAILS');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }

    public function check_mobile_coapplicant_ref2($id, $mobile){
      $response = array();
      $this->db->select('*');
      $this->db->where("REF_2_MOBILE", $mobile);
      $this->db->where('COAPP_ID !=', $id);
      $q = $this->db->from('COAPPLICANT_INCOME_DETAILS');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }


    public function getMainDocumentsCount($id){
      //1=customer, 2=dsa, 0=all

      $query = $this->db->query("SELECT count(*) as doc_count FROM DOCUMENTS_TYPE where DOC_MANDATORY = 'YES' AND DOC_FOR IN (0, ".$id.")"); 
      $row = $query->row();
      return $row;
    }

    public function getSavedDocumentsCount($id){      
      $query = $this->db->query("SELECT count(*) as doc_count FROM DOCUMENTS where USER_ID = '".$id."'"); 
      $row = $query->row();
      return $row;
    }

    public function getSavedDocumentsCountWithMaster($id, $master){      
      $query = $this->db->query("SELECT count(*) as doc_count FROM DOCUMENTS where USER_ID = '".$id."' AND DOC_MASTER_TYPE = '".$master."'");
      /*$query = $this->db->query("SELECT count(*) as doc_count FROM DOCUMENTS where USER_ID = '".$id."' AND DOC_MASTER_TYPE = '".$master."'");*/
      $row = $query->row();
	   $str = $this->db->last_query();
	 /* echo "<pre>";
      print_r($str);
      exit;*/
	 
	
      return $row;
    }
    public function getSavedDocumentsCountWithMaster_home($id, $master){      
      // $query = $this->db->query("SELECT count(*) as doc_count FROM DOCUMENTS where USER_ID = '".$id."' AND DOC_MASTER_TYPE = '".$master."'");
     /*$this->db->distinct();
       $this->db->select('DOC_TYPE');
       $this->db->from('DOCUMENTS');
     $this->db->where('DOCUMENTS.USER_ID',$id);
       $this->db->join('DOCUMENTS_TYPE', 'DOCUMENTS_TYPE.DOC_NAME =DOCUMENTS.DOC_TYPE');
        
     $this->db->where('DOCUMENTS_TYPE.DOC_MANDATORY', 'YES');
     $this->db->where('DOCUMENTS_TYPE.DOC_MASTER_TYPE',$master);
   
     $query = $this->db->get();
      
     $row = $query->num_rows();
       return $row;*/
      $this->db->select('*');
        $this->db->from('DOCUMENTS');
      $this->db->where('DOCUMENTS.USER_ID',$id);
      //$this->db->where('DOCUMENTS.DOC_MANDATORY', 'YES');
      $this->db->where('DOCUMENTS.DOC_MASTER_TYPE',$master);
      $query = $this->db->get();
      
      $row = $query->num_rows();
        return $row;
      
      
     }

    public function getCoapplicantDetails($id, $coappid){      
      $query = $this->db->query("SELECT * FROM COAPPLICANT_DETAILS where CUST_ID = '".$id."' AND UNIQUE_CODE ='".$coappid."'"); 
	 
      $row = $query->row();
	  
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

    public function getCoapplicantIncomeDetails($coappid){      
      $query = $this->db->query("SELECT * FROM COAPPLICANT_INCOME_DETAILS where COAPP_ID ='".$coappid."'"); 
      $row = $query->row();
      return $row;
    }

    //coapplicant details
    public function update_coapplicant($id, $data){
      $this->db->where('UNIQUE_CODE', $id);

		 if(isset($data['PAN_NUMBER']) && $data['PAN_NUMBER'] != '')
	  {
			$data['PAN_NUMBER'] = $this->encryption($data['PAN_NUMBER']);
	  }
	  
	   if(isset($data['KYC']) && $data['KYC'] != '')
	  {
			$data['KYC'] = $this->encryption($data['KYC']);
	  }
	  
	  if(isset($data['AADHAR_NUMBER']) && $data['AADHAR_NUMBER'] != '')
	  {
			$data['AADHAR_NUMBER'] = $this->encryption($data['AADHAR_NUMBER']);
	  }
	  
	  if(isset($data['DOB']) && $data['DOB'] != '')
	  {
			$data['DOB'] = $this->encryption($data['DOB']);
	  }

      return $this->db->update('COAPPLICANT_DETAILS',$data);
    }

    public function insert_coapplicant($data){
		
		 if(isset($data['PAN_NUMBER']) && $data['PAN_NUMBER'] != '')
	  {
			$data['PAN_NUMBER'] = $this->encryption($data['PAN_NUMBER']);
	  }
	  
	  if(isset($data['AADHAR_NUMBER']) && $data['AADHAR_NUMBER'] != '')
	  {
			$data['AADHAR_NUMBER'] = $this->encryption($data['AADHAR_NUMBER']);
	  }
	  
	  if(isset($data['DOB']) && $data['DOB'] != '')
	  {
			$data['DOB'] = $this->encryption($data['DOB']);
	  }
	  
	  if(isset($data['KYC']) && $data['KYC'] != '')
	  {
			$data['KYC'] = $this->encryption($data['KYC']);
	  }
	  
      return $this->db->insert('COAPPLICANT_DETAILS', $data);
    }

    //coapplicant income details
    public function update_coapplicant_income($id, $data){
      $this->db->where('COAPP_ID', $id);
      return $this->db->update('COAPPLICANT_INCOME_DETAILS', $data);
       
    }

    public function insert_coapplicant_income($data){
      return $this->db->insert('COAPPLICANT_INCOME_DETAILS', $data);
    }

    public function getMyCoapplicants($id){      
      $query = $this->db->query("SELECT * FROM COAPPLICANT_DETAILS where CUST_ID = '".$id."'"); 
      $response = $query->result();
      return $response;
    }
   
	public function get_loan_types(){
		$loan_type=array();
      $this->db->select('loan_type');
      $this->db->from('loan_type');
	  foreach($this->db->get()->result() as $row)
	  {
		
		  array_push($loan_type,$row->loan_type);
	  }
	 return $loan_type;
    }

    public function insert_apply_for_loan($data){
      return $this->db->insert('CUSTOMER_APPLIED_LOANS', $data);
    }

    public function save_credit_score($data){
      $query = $this->db->query("SELECT * FROM credit_score where customer_id ='".$data['customer_id']."'"); 
      
      if($query->num_rows()>0){
        $row = $query->row();
        $this->db->where('customer_id', $row->customer_id);
        return $this->db->update('credit_score', $data);
      }else return $this->db->insert('credit_score', $data);
    }

    public function check_credit_score($id){
      $query = $this->db->query("SELECT * FROM credit_score where customer_id ='".$id."'"); 
      
      if($query->num_rows()>0){
        $row = $query->row();
        $now = time(); 
        $your_date = strtotime($row->checked_dts);
        $datediff = $now - $your_date;

        $days = round($datediff / (60 * 60 * 24));
        if($days > 30)return false;
        else return true;
      }else return false;
    }

    public function get_saved_credit_score($id){
      $query = $this->db->query("SELECT * FROM credit_score where customer_id ='".$id."'"); 
      $row = $query->row();
     
      return $row;
    }
	public function getUploded_Documents_Type($id)
	{
		 $this->db->distinct();
		 $this->db->select('DOC_MASTER_TYPE');
         $this->db->where("USER_ID", $id);
		 $q = $this->db->from('DOCUMENTS');
         $query = $q->get();
		 return $query->num_rows();
		
	}
	public function getDocuments_Type_customer()
	{
		    $this->db->distinct();
        $this->db->select('DOC_MASTER_TYPE');
        $this->db->where("DOC_FOR", 0);
	    	$this->db->or_where("DOC_FOR", 1);
        $q = $this->db->from('DOCUMENTS_TYPE');
        $query = $q->get();
		 return $query->num_rows();
	}

    public function save_credit_score_user_details($data){
      $query = $this->db->query("SELECT * FROM credit_score_user_details where customer_id ='".$data['customer_id']."'"); 
      
      if($query->num_rows()>0){
        $row = $query->row();
        $this->db->where('customer_id', $row->customer_id);
        return $this->db->update('credit_score_user_details', $data);
      }else return $this->db->insert('credit_score_user_details', $data);
    }
	///===============merger from vaibhav code---------------------//
	 public function update_user_type($id,$data)
	 {

		$this->db->where('UNIQUE_CODE',$id);
		$this->db->update('USER_DETAILS',$data);
		return 1;
	  }
	   public function update_coapp_user_type($id,$data)
	 {

		$this->db->where('UNIQUE_CODE',$id);
		
		if(isset($data['KYC']) && $data['KYC'] != '')
	  {
			$data['KYC'] = $this->encryption($data['KYC']);
	  }
		if(isset($data['PAN_NUMBER']) && $data['PAN_NUMBER'] != '')
	  {
			$data['PAN_NUMBER'] = $this->encryption($data['PAN_NUMBER']);
	  }
	  
	  if(isset($data['AADHAR_NUMBER']) && $data['AADHAR_NUMBER'] != '')
	  {
			$data['AADHAR_NUMBER'] = $this->encryption($data['AADHAR_NUMBER']);
	  }
	  
	  if(isset($data['DOB']) && $data['DOB'] != '')
	  {
			$data['DOB'] = $this->encryption($data['DOB']);
	  }
		$this->db->update('COAPPLICANT_DETAILS',$data);
		return 1;
	  }
  
    public function get_salaried_salary_slip_SavedDocumentsCount($id, $master)
	{
	  $count=0;
	  $this->db->where('DOC_TYPE','salary slip1');
	  $this->db->where('DOC_MASTER_TYPE',$master);
	  $this->db->where('USER_ID',$id);
	  $result = $this->db->get('DOCUMENTS')->result();
	  if($result){
		$this->db->where('DOC_TYPE','salary slip2');
		$this->db->where('DOC_MASTER_TYPE',$master);
		$this->db->where('USER_ID',$id);
		$result = $this->db->get('DOCUMENTS')->result();
		if($result){
		 $this->db->where('DOC_TYPE','salary slip3');
		 $this->db->where('DOC_MASTER_TYPE',$master);
		 $this->db->where('USER_ID',$id);
		 $result = $this->db->get('DOCUMENTS')->result();
		 if($result){
		   $count=1;
		 }
	   }
	 }
	 return $count;
	}
	public function get_salaried_itr_SavedDocumentsCount($id, $master)
	{
		 $count=0;
		 $this->db->where('DOC_TYPE','ITR'.'-'.(date('Y')-1));
		 $this->db->where('DOC_MASTER_TYPE',$master);
		 $this->db->where('USER_ID',$id);
		 $result = $this->db->get('DOCUMENTS')->result();
		 if($result){
		  $this->db->where('DOC_TYPE','ITR'.'-'.(date('Y')-2));
		  $this->db->where('DOC_MASTER_TYPE',$master);
		  $this->db->where('USER_ID',$id);
		  $result = $this->db->get('DOCUMENTS')->result();
		  if($result){
		   $count=1;
		 }
		}
		return $count;
		}
   public function getDocumentsType_incomesrc($id,$income,$masterType)
   {
          $response = array();
		  $this->db->select('*');
		  $this->db->where("DOC_FOR", $id);
		  $this->db->where("DOC_MASTER_TYPE", $masterType);
		  $this->db->where("INCOME_SRC", $income);
		  $q = $this->db->from('DOCUMENTS_TYPE');
		  $this->db->order_by("ID", "desc");
		  $response = $q->get()->result();
		  return $response;
		}  
	public function get_business_bank_SavedDocumentsCount($id, $master)
	{
		  $count = 0;
		  $this->db->where('DOC_TYPE','Updated Bank Passbook/Statement');
		  $this->db->where('DOC_MASTER_TYPE',$master);
		  $this->db->where('USER_ID',$id);
		  $result = $this->db->get('DOCUMENTS')->result();
		  if($result){
		   $count=1;
		 }
		 return $count;
	}
	public function get_business_balance_audit_itr_SavedDocumentsCount($id, $master)
	{
	 $count = 0;
	 $result = $this->get_business_itr_SavedDocumentsCount($id, $master);
	 if($result){
	  return $result;
	} else {
	 $this->db->where('DOC_TYPE','Balance Sheet');
	 $this->db->or_where('DOC_TYPE','Audited Financial Reports');
	 $this->db->where('DOC_MASTER_TYPE',$master);
	 $this->db->where('USER_ID',$id);
	 $result = $this->db->get('DOCUMENTS')->result();
	 if($result){
	  $count+=1;
	  return $count;
	}else{

	  return $count;
	}
	}
	}
	public function get_business_itr_SavedDocumentsCount($id, $master){
	 $count=0;
	 $this->db->where('DOC_TYPE','ITR'.'-'.(date('Y')-1));
	 $this->db->where('DOC_MASTER_TYPE',$master);
	 $this->db->where('USER_ID',$id);
	 $result = $this->db->get('DOCUMENTS')->result();
	 if($result){
	  $this->db->where('DOC_TYPE','ITR'.'-'.(date('Y')-2));
	  $this->db->where('DOC_MASTER_TYPE',$master);
	  $this->db->where('USER_ID',$id);
	  $result = $this->db->get('DOCUMENTS')->result();
	  $count=1;
	}
	return $count;
	}

	 public function get_user_type($id)
	 {
	     $this->db->where('UNIQUE_CODE',$id);
	     $result  = $this->db->get('USER_DETAILS')->row();
	    if($result)
		{
	     return $result->USER_TYPE;
		}
		else
		{
			 $this->db->where('UNIQUE_CODE',$id);
	        $result  = $this->db->get('COAPPLICANT_DETAILS')->row();
			 return $result->USER_TYPE;
			
		}
	  

	 }
	 public function get_salaried_bank_SavedDocumentsCount($id, $master)
	 {
	  $count = 0;
	  $this->db->where('DOC_TYPE','Updated Bank Passbook/Statement');
	  $this->db->where('DOC_MASTER_TYPE',$master);
	  $this->db->where('USER_ID',$id);
	  $result = $this->db->get('DOCUMENTS')->result();
	  if($result){
	   $count=1;
	 }
	 return $count;
	}
//========================================================new functions======================================================================================
  public function check_loan_payment_details($email,$mobile)
	{
	  $this->db->select('*');
      $this->db->from('payment_details');
	  $this->db->where('cemail',$email);
    $this->db->where('cmob',$mobile);
    $this->db->order_by("id", "desc");
      $q = $this->db->get();
      $row = $q->row();
     return $row;
		
	}
     public function check_loan_payment_details_email($email)
	{
	  $this->db->select('*');
      $this->db->from('payment_details');
	  $this->db->where('cemail',$email);
      $this->db->order_by("id", "desc");
      $q = $this->db->get();
      $row = $q->row();
     return $row;
		
	}
  public function getCustomerLoanAppliedInfo($id){
    $this->db->select('*');
    $this->db->from('CUSTOMER_APPLIED_LOANS');
    $this->db->where('CUST_ID', $id);
    $q = $this->db->get();
    $row = $q->row();
    return $row;
  }
  public function getSavedDocumentsCount_KYC($id){      
    $query = $this->db->query("SELECT count(*) as doc_count FROM DOCUMENTS where USER_ID = '".$id."' "); 
    $row = $query->row();
    return $row;
  }
  public function getCustomerIncomeInfo($id){
    $this->db->select('*');
    $this->db->from('CUSTOMER_INCOME_DETAILS');
    $this->db->where('CUST_ID', $id);
    $q = $this->db->get();
    $row = $q->row();
    return $row;
  }
	  public function get_Lap_loan_details($id){      
    $query = $this->db->query("SELECT * FROM CUSTOMER_APPLIED_LOANS where CUST_ID = '".$id."'"); 
    $response = $query->result();
    return $response;
  }

//===============================================================================================================================================
// public function getCustomerIncomeInfoget_lap_form_data($id){
//   $this->db->select('*');
//   $this->db->from('CUSTOMER_APPLIED_LOANS');
//   $this->db->where('CUST_ID', $id);
//   $q = $this->db->get();
//   $row = $q->row();
//   return $row;
// }
public function getCustomerIncomeInfoget_lap_form_data($id){

  $this->db->select('*');
  $this->db->from('CUSTOMER_APPLIED_LOANS');
  $this->db->where('CUST_ID', $id);
  $this->db->where('LOAN_TYPE','lap');
  $this->db->order_by("id", "desc");
  $q = $this->db->get();
  $row = $q->row();
  return $row;
}

public function getCustomerIncomeInfoget_home_form_data($id){
  $this->db->select('*');
  $this->db->from('CUSTOMER_APPLIED_LOANS');
  $this->db->where('CUST_ID', $id);
  $this->db->where('LOAN_TYPE','home');
  $this->db->order_by("id", "desc");
  $q = $this->db->get();
  $row = $q->row();
  return $row;
}
public function find_last_entry_id(){
  $this->db->select('*');
  $this->db->from('CUSTOMER_APPLIED_LOANS');
  $this->db->order_by("id", "desc");
  $this->db->limit(1);
  $q = $this->db->get();
  $row = $q->row();
  return $row;
}


public function find_customer_entry_id($id){
  $this->db->select('*');
  $this->db->from('CUSTOMER_APPLIED_LOANS');
  $this->db->where('CUST_ID', $id);
  $this->db->order_by("id", "desc");
  $q = $this->db->get();
  $row = $q->row();
  return $row;
}

public function find_customer_entry_id_data($id,$type){
  $this->db->select('*');
  $this->db->from('CUSTOMER_APPLIED_LOANS');
  $this->db->where('CUST_ID', $id);
  $this->db->where('LOAN_TYPE',$type);
  $this->db->order_by("id", "desc");
  $q = $this->db->get();
  $row = $q->row();
  
  return $row;
}

public function update_loan_application_id($id, $data,$date_time){
  $this->db->where('CUST_ID', $id);
  $this->db->where('CREATED_AT', $date_time);
  //return $this->db->update('CUSTOMER_APPLIED_LOANS', $data);
  return $this->db->update('CUSTOMER_APPLIED_LOANS', $data);
}

//=========================functions for connector lead process
public function check_mobile_new_lead($mobile){
  $response = array();
  $this->db->select('*');
  $this->db->where("MOBILE", $mobile);
   $q = $this->db->from('USER_DETAILS');
  $query = $q->get();
  if ( $query->num_rows() > 0 ){
         return 1;
   }else return 0;    
}

public function check_email_new_lead($email){
  $response = array();
  $this->db->select('*');
  $this->db->where("EMAIL", $email);
  $q = $this->db->from('USER_DETAILS');
  $query = $q->get();
  if ( $query->num_rows() > 0 ){
         return 1;
   }else return 0;      
}
public function insert_new_lead($data){
  $this->db->insert('register',$data);
  
  //echo $this->db->last_query();
  
  //exit;   
  return $this->db->insert_id();
}
public function insert_coapplicant_go_no_go($data){
	
	 if(isset($data['KYC']) && $data['KYC'] != '')
	  {
			$data['KYC'] = $this->encryption($data['KYC']);
	  }
	 
	 if(isset($data['PAN_NUMBER']) && $data['PAN_NUMBER'] != '')
	  {
			$data['PAN_NUMBER'] = $this->encryption($data['PAN_NUMBER']);
	  }
	  
	  if(isset($data['AADHAR_NUMBER']) && $data['AADHAR_NUMBER'] != '')
	  {
			$data['AADHAR_NUMBER'] = $this->encryption($data['AADHAR_NUMBER']);
	  }
	  
	  if(isset($data['DOB']) && $data['DOB'] != '')
	  {
			$data['DOB'] = $this->encryption($data['DOB']);
	  }
	
   $this->db->insert('COAPPLICANT_DETAILS', $data);
  return $this->db->insert_id();

}
/*------------------------------------------Added by papiha on 07_01_2022-----------------------------------------------*/
public function getAppliedLoans_rule_engine($id){
  $response = array();
  $this->db->select('*');
  $this->db->where("CUST_ID", $id);
  $q = $this->db->from('CUSTOMER_APPLIED_LOANS');
  $this->db->order_by("ID", "desc");
  $q = $this->db->get();
  $row = $q->row();
  return $row;
}


//=========================added by priyanka 11-01-2022

   public function check_go_no_go_details($id){
      $response = array();
      $this->db->select('*');
      $this->db->where("customer_id", $id);      
      $q = $this->db->from('go_no_go');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }

	 public function update_go_no_go_details($id, $data){
      $this->db->where('customer_id', $id);
      return $this->db->update('go_no_go',$data);
    }

    public function insert_go_no_go_details($id, $data){
      $this->db->where('customer_id', $id);
      return $this->db->insert('go_no_go',$data);
    }


	public function get_go_no_go_data($id){
      $this->db->select('*');
      $this->db->from('go_no_go');
      $this->db->where('customer_id', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }
    /*------------------------------------------Added by papiha 15_01_2022--------------------------------------------*/
	public function getCam_credit_anylsis($id)
	{
	  $this->db->select('*');
      $this->db->from('cam_credit_analysis');
      $this->db->where('ID', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
	}
    /*-----------------------------------Added by papiha on 18_01_2022-------------------------------------------------------------*/
	public function getPD($id)
	{
	  $this->db->select('*');
      $this->db->from('table_credit_pd');
      $this->db->where('customer_id', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
	}
 /*-----------------------------------Added by papiha on 22_01_2022-------------------------------------------------------------*/
 public function insert_Loan_disburt($data){
      
  return $this->db->insert('loan_disburst_details', $data);
}
public function getLoan_disburst_data($id)
{
  $this->db->select('*');
  $this->db->from('loan_disburst_details');
  $this->db->where('Cust_Id', $id);
  $q = $this->db->get();
  $row = $q->row();
  return $row;
}
public function update_Loan_disburt($id, $data)
{
  $this->db->where('Cust_Id', $id);
  return $this->db->update('loan_disburst_details', $data);
}
public function get_RO_By_Location($Location)
	{
		  $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('ROLE',14);
		  $this->db->where('Location', $Location);
		  $q = $this->db->get();
		  $response = $q->result();
		  return $response;
	}



/*--------------------------Added by papiha on 16_02_2022-------------------------*/
public function Get_Doc_Master_Type($id)
{
   $this->db->distinct();
   $this->db->from('DOCUMENTS');
   $this->db->select('DOC_MASTER_TYPE');
   $this->db->where('USER_ID', $id);
   $q = $this->db->get();
   $response = $q->result();
   return $response; 
}
public function Get_documert_masterwise($id,$Master)
{
        $this->db->select('*');
    $this->db->from('DOCUMENTS');
    $this->db->where('DOC_MASTER_TYPE',$Master);
        $this->db->where('USER_ID', $id);
    $q = $this->db->get();
    $response = $q->result();
    return $response;
}
/*-----------------------------------------------------------Added by papiha on 19_02_2022---------------------------------------------------------------- */
public function getDocuments_Type_customer_Master()
	{
		   $this->db->distinct();
        $this->db->select('DOC_MASTER_TYPE');
        $this->db->where("DOC_FOR", 0);
		   $this->db->or_where("DOC_FOR", 1);
      $this->db->from('DOCUMENTS_TYPE');
       // $query = $q->get();
		 //return $query->num_rows();
     $q = $this->db->get();
     $response = $q->result();
	 
     return $response;
	}

//------------------------------------------------------ added by priyanka 19-02-2022
 public function check_customer_more_details($id)
 {
      $response = array();
      $this->db->select('*');
      $this->db->where("CUST_ID", $id);      
      $q = $this->db->from('CUSTOMER_MORE_DETAILS');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }

    public function update_customer_more_details($id, $data){
      $this->db->where('CUST_ID', $id);
	  if(isset($data['KYC']) && $data['KYC'] != '')
	  {
			$data['KYC'] = $this->encryption($data['KYC']);
	  }
      return $this->db->update('CUSTOMER_MORE_DETAILS',$data);
    }

    public function insert_customer_more_details($id, $data){
      $this->db->where('CUST_ID', $id);
	  
	  if(isset($data['KYC']) && $data['KYC'] != '')
	  {
			$data['KYC'] = $this->encryption($data['KYC']);
	  }
	  
      return $this->db->insert('CUSTOMER_MORE_DETAILS',$data);
    }
     public function check_customer_in_user_table($id)
 {
      $response = array();
      $this->db->select('*');
      $this->db->where("UNIQUE_CODE",$id);      
      $q = $this->db->from('USER_DETAILS');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }
    public function get_Mandatory_doc_count($id,$masterType){
		
      $response = array();
      $this->db->select('*');
	  $this->db->from('master_doc_type_count');
      $this->db->where("Master_Doc_Type", $masterType);
	  $q = $this->db->get();
	  //echo $this->db->last_query();
      $row = $q->row();
	  return  $row->Doc_Count;
      //return $row->DOC_MANDATORY;
	   // $this->db->where('DOC_MANDATORY','YES');
	    //	$where = '(DOC_FOR="0" or DOC_FOR = "'.$id.'")';
        //$this->db->where($where);
       
	
	  
     
      
      
     // $row = $q->row();
      //return $row->Doc_Count;
      
     /*$str = $this->db->last_query();
	   echo "<pre>";
      print_r($str);
      echo '<br>';	 
      exit;*/
	  
     
    }   
/*-------------------------------------------Added by papiha on 21_02_2022-------------------------------------*/
function get_mandatory_or_not($master,$doc_type)
{
  /*echo $master.'<br>';
  echo $doc_type;
  exit;*/
  $this->db->select('DOC_MANDATORY');
  $this->db->from('DOCUMENTS_TYPE');
  $this->db->where('DOC_MASTER_TYPE',$master);
  $this->db->where('DOC_NAME',$doc_type);
  $q = $this->db->get();
      $row = $q->row();
      return $row->DOC_MANDATORY;
}
 public function getDocumentsType_by_Employment_type($masterType,$id,$inc_src)
{
  
    $response = array();
    $this->db->select('*');
   
       $this->db->where("DOC_MASTER_TYPE", $masterType);
    $this->db->where("INCOME_SRC",$inc_src);
 
    $where = '(DOC_FOR = "'.$id.'")';
     $this->db->where($where);

  
   
    $q = $this->db->from('DOCUMENTS_TYPE');
    $this->db->order_by("ID", "ASC");
    $response = $q->get()->result();
  $str = $this->db->last_query();
 /* echo "<pre>";
    print_r($str);
    exit;
  */

    return $response;
  } 
public function get_Mandatory_doc_count_for_employment($id,$masterType,$inc_src){
  
      /*$response = array();
      $this->db->select('*');
      $this->db->where("DOC_MASTER_TYPE", $masterType);
    $this->db->where('DOC_MANDATORY','YES');
  $this->db->where("INCOME_SRC",$inc_src);
    $where = '(DOC_FOR = "'.$id.'")';
      $this->db->where($where);
      $q = $this->db->from('DOCUMENTS_TYPE');
      $this->db->order_by("ID", "desc");
      $response = $q->get();*/
    
 
    $this->db->select('*');
      $this->db->where("Master_Doc_Type", $masterType);
     $this->db->where("Inc_Src",$inc_src);
      $this->db->from('master_doc_type_count');
   $q = $this->db->get();
   $row = $q->row();
   $str = $this->db->last_query();
    //echo "<pre>";
    //print_r($str);
    //echo '<br>';	
	//exit;
	if(isset($row->Doc_Count))
	{
		return $row->Doc_Count;
	}
 
    
    
  }
  public function Total_savedDocType($id, $master)
  {      
   // $query = $this->db->query("SELECT count(*) as doc_count FROM DOCUMENTS where USER_ID = '".$id."' AND DOC_MASTER_TYPE = '".$master."'");
  /*$this->db->distinct();
    $this->db->select('DOC_TYPE');
    $this->db->from('DOCUMENTS');
  $this->db->where('DOCUMENTS.USER_ID',$id);
    $this->db->join('DOCUMENTS_TYPE', 'DOCUMENTS_TYPE.DOC_NAME =DOCUMENTS.DOC_TYPE');
     
  $this->db->where('DOCUMENTS_TYPE.DOC_MANDATORY', 'YES');
  $this->db->where('DOCUMENTS_TYPE.DOC_MASTER_TYPE',$master);

  $query = $this->db->get();
   
  $row = $query->num_rows();
    return $row;*/
   $this->db->select('*');
     $this->db->from('DOCUMENTS');
   $this->db->where('DOCUMENTS.USER_ID',$id);
   $this->db->where('DOCUMENTS.DOC_MANDATORY', 'YES');
   $query = $this->db->get();
   
   $row = $query->num_rows();
     return $row;
   
   
  }	
  /*---------------------------------------------------------------------------------Added by papiha on 2_02_22 ---------------------------------------------------------*/
  public function get_user_type_Income($id)
  {
      $this->db->where('CUST_ID',$id);
      $result  = $this->db->get('CUSTOMER_INCOME_DETAILS')->row();
     if($result)
   {
      return $result->CUST_TYPE;
   }
   else
   {
      $this->db->where('COAPP_ID',$id);
         $result  = $this->db->get('COAPPLICANT_INCOME_DETAILS')->row();
		 if(isset($result->COAPP_TYPE))
		 {
      return $result->COAPP_TYPE;
		 }
		 else{
			 
			 return "";
			 
		 }
     
   }
   

  }
  /*---------------------------------Added by papiha on 24_02_2022-----------------------------------------------------------------*/
  function inc_src_doc_count($id,$inc_src)
  {
    //$this->db->select('*');
     // $this->db->where("Master_Doc_Type", $masterType);
     $this->db->select_sum('Doc_Count');
     $this->db->where("Inc_Src",$inc_src);
     $this->db->from('master_doc_type_count');
     $q = $this->db->get();
     $row = $q->row();
   
     return $row->Doc_Count;
 
  }
  /*------------------------------------ Added by papiha on 24_02_2022--------------------------------------*/
  function getDocuments_Type_customer_Master_retired()
  {
  
    $this->db->distinct();
    $this->db->select('DOC_MASTER_TYPE');
    $this->db->where("DOC_FOR", 0);
    $this->db->from('DOCUMENTS_TYPE');
    // $query = $q->get();
    //return $query->num_rows();
      $q = $this->db->get();
      $response = $q->result();
      return $response;
  }
  public function getDocumentsType_by_Employment_type_other($inc_src)
{
  
    $response = array();
    $this->db->select('*');
   
       //$this->db->where("DOC_MASTER_TYPE", $masterType);
        $this->db->where("INCOME_SRC",$inc_src);
 
   // $where = "INCOME_SRC='$inc_src'.";
    // $this->db->where($where);

  
   
    $q = $this->db->from('DOCUMENTS_TYPE');
    $this->db->order_by("ID", "ASC");
    $response = $q->get()->result();
    /*$str = $this->db->last_query();
     echo "<pre>";
    print_r($str);
    exit;*/
  

    return $response;
  } 
  //added by sonal 4-3-2022
  public function save_notification($data)
{
  
   $this->db->insert('notifications',$data);
   return $this->db->insert_id();
}
/*--------------------------Added by papiha on 08_03_2022---------------------------------------------------------------------------*/

  function get_requested_loan($id)
  {
    //$this->db->select('*');
    // $this->db->where("Master_Doc_Type", $masterType);
    $this->db->select('final_loan_amount');
    $this->db->where("ID",$id);
    $this->db->from('cam_credit_analysis');
    $q = $this->db->get();
    $row = $q->row();
  
    return $row->final_loan_amount;

  }
/*-------------------------------------------------- Added by papiha on 22_03_2022-----------------------------------------------------*/

public function get_banks(){
  $this->db->select('*');
  $this->db->from('cooperator');
  $q = $this->db->get();
  $row = $q->result();
  return $row;
}
/*------------------------------------------------------- Added by papiha on 24_03_2022------------------------------------*/
public function get_user_itr_yes_no($id)
{
    $this->db->where('CUST_ID',$id);
    $result  = $this->db->get('CUSTOMER_INCOME_DETAILS')->row();
   if($result)
 {
    return $result->ITR_status;
 }
 else
 {
    $this->db->where('COAPP_ID',$id);
       $result  = $this->db->get('COAPPLICANT_INCOME_DETAILS')->row();
    return $result->ITR_status;
   
 }
 

}
/*------------------------------------------ Added by papiha ------------------------------------------------*/
public function Get_Other_Documents($inc_src)
 {
   $response = array();
 
   $this->db->select('*');
   $this->db->from('DOCUMENTS_TYPE');
     //$this->db->where("DOC_MASTER_TYPE", $masterType);
     $where = "INCOME_SRC='".$inc_src."'OR DOC_MASTER_TYPE='KYC' OR DOC_MASTER_TYPE='RESIDENCE PROOF' ";
      $this->db->where($where);

 // $where = "INCOME_SRC='$inc_src'.";
  // $this->db->where($where);


 
 
  $this->db->order_by("ID", "ASC");
  $response =  $this->db->get()->result();
 return $response;
 }
 
 
 /*------------------------------------------ Added by papiha ------------------------------------------------*/
public function Get_Other_Documents_Retailer($documentstr)
 {
   $response = array();
 
   $this->db->select('*');
   $this->db->from('DOCUMENTS_TYPE');
     //$this->db->where("DOC_MASTER_TYPE", $masterType);
     $where = "DOC_NAME NOT IN (".$documentstr.") AND DOC_FOR='27' ";
      $this->db->where($where);

 // $where = "INCOME_SRC='$inc_src'.";
  // $this->db->where($where);


 
 
  $this->db->order_by("ID", "ASC");
  $response =  $this->db->get()->result();
 return $response;
 }
 /*---------------------------- added by papiha on 23_04_2022------------------------------------*/
 /*---------------------------------------------------- Addded by papiha on 19_04_2022----------------------------------------------------*/
 public function update_customer_applied_loan($id, $data){
  $this->db->where('CUST_ID', $id);
  return $this->db->update('CUSTOMER_APPLIED_LOANS', $data);
}
/*---------------------- Added by jay sir on 21_05_2022---------------------------------*/
public function update_customer_consent()
{

//echo "update_customer_consent";
//$this->db->set('field', 'field+1', FALSE);

$this->db->set('credit_sanction_status', 'reject');


   $this->db->where('DATEDIFF(CURTIME(), CREATED_AT) >', 15);

   $this->db->where("customer_consent",NULL);

$this->db->where('credit_sanction_status', NULL);

$this->db->update('USER_DETAILS');

}
 /*----------------------------- added by papiha on 28_07_2022-------------------------------------------*/
 public function get_vendors_doc($id){
  $this->db->select('*');
  $this->db->from('legal_doc');
  $this->db->where('ID', $id);
  $q = $this->db->get();
  $row = $q->row();
  return $row;
}
public function delete_vendor_doc($data){      
  return $this->db->delete('legal_doc', $data); 

}
public function getLoan_disburst_data_by_Loan_id($id)
{
  $this->db->select('*');
  $this->db->from('loan_disburst_details');
  $this->db->where('Loan_Application_No', $id);
  $q = $this->db->get();
  $row = $q->result();
  return $row;
}
//--------------------------------------- added by priya 24-08-2022
public function saveDisbursementDocuments($data){
      $this->db->insert('Disbursement_DOCUMENTS',$data);
      return $this->db->insert_id();
    } 
//--------------------------------------- added by priya 24-08-2022
    
    public function getdisbursementDoc($id){
      $this->db->select('*');
      $this->db->from('Disbursement_DOCUMENTS');
      $this->db->where('ID', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }
	
	//--------------------------------------- added by priya 24-08-2022
	public function saveDisbursementDocumentApprovalData($data)
	{
      $this->db->insert('Disbursement_Document_status',$data);
      return $this->db->insert_id();
    } 
	  

    public function saveDisbursementAmountData($data){
      
      $this->db->insert('disbursement_checque_details',$data);
      return $this->db->insert_id();
      
    } 
	
	 public function find_CAM_excel($id){
		
      $this->db->select('*');
      $this->db->from('DOCUMENTS');
      $this->db->where("DOC_TYPE","CAM Excel");
	  $this->db->where('USER_ID', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }    
	   public function update_CAM_excel($id, $data){
      $this->db->where('USER_ID', $id);
      return $this->db->update('DOCUMENTS', $data);
    }

    public function saveSanctionConditionDocuments($data){
      
      $this->db->insert('sanction_conditions_documents',$data);
      return $this->db->insert_id();
      
    }  
	public function checkSanctionCondition($id,$condition)
	{
      $this->db->select('*');
      $this->db->from('sanction_conditions_documents');
      $this->db->where("Customer_id",$id);
	  $this->db->where('SanctionCondition', $condition);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
	}
	  public function UpdateSanctionConditionDocuments($id,$condition, $data){
      $this->db->where("Customer_id",$id);
	  $this->db->where('SanctionCondition', $condition);
      return $this->db->update('sanction_conditions_documents', $data);
    }
	
	    function find_my_uploded_sanction_conditions($id)
{
      $this->db->select('*');
      $this->db->from('sanction_conditions_documents'); 
    $this->db->where("Customer_id",$id);  
     $query = $this->db->get();
      $response = $query->result();
      return $response;
     
  }
  
  public function ShowSanctionCondition($id)
	{
      $this->db->select('*');
      $this->db->from('sanction_conditions_documents');
      $this->db->where("ID",$id);
	   $q = $this->db->get();
      $row = $q->row();
      return $row;
	}
  /*------------------------------------------------------ addded by papiha on 22_12_2022--------------------------------------------------------*/
  public function savepropriter_details($data){
      
    $this->db->insert('propriter_details',$data);
    return $this->db->insert_id();
    
  }   
  public function get_propriter($id)
	{
      $this->db->select('*');
      $this->db->from('propriter_details');
      $this->db->where("dis_id",$id);
	    $q = $this->db->get();
      $response = $q->result();
      return $response;
       
	}
  /*----------------------------------------- addded by papiha on 12_01_2023-----------------------------------------------------------------*/
  public function getSavedDocumentsCountWithMaster_details($id, $master)
  {      
    $query = $this->db->query("SELECT * FROM DOCUMENTS where USER_ID = '".$id."' AND DOC_MASTER_TYPE = '".$master."'");
    
    $row = $query->result();
  
 

    return $row;
  }
  public function getDocuments_Type_coapplicant_Master()
	{
		  $this->db->distinct();
      $this->db->select('DOC_MASTER_TYPE');
      $this->db->where("DOC_MASTER_TYPE != 'Loan Application Form'");
      $this->db->where("DOC_FOR", 0);
		  $this->db->or_where("DOC_FOR", 1);
      $this->db->where("DOC_MASTER_TYPE != 'Loan Application Form'");
      $this->db->from('DOCUMENTS_TYPE');
      
      $q = $this->db->get();
      $response = $q->result();
     
     return $response;
	}
  public function get_Mandatory_doc_count_for_loan($id,$masterType)
  {
      $this->db->select('*');
      $this->db->where("Master_Doc_Type", $masterType);
      $this->db->from('master_doc_type_count');
      $q = $this->db->get();
      $row = $q->row();
      $str = $this->db->last_query();
      if(isset($row->Doc_Count))
      {
        return $row->Doc_Count;
      }

  
  
  } 
  
  //====================== added by priya ==========================
    public function update_bureau_comments($id, $data){
      $this->db->where('UNIQUE_CODE', $id);
  
	  $result = $this->db->update('USER_DETAILS', $data);
	  
	 // echo $this->db->last_query();
	  
      return $result;
    }
	  //====================== added by priya 17-01-2023==========================
  public function check_offline_login_fees_payment_details($id)
	{
	  $this->db->select('*');
      $this->db->from('offline_login_fees');
	  $this->db->where('Cust_id',$id);
      $this->db->order_by("id", "desc");
      $q = $this->db->get();
      $row = $q->row();
     return $row;
		
	}


}
?>