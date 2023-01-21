<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Credit_manager_user_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

   /* function getDashboardData(){
        $response = [];
        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where cam_status ='Cam details complete'"); 
        $cust_count = $query->row();
        $response['cust_count'] = $cust_count->count;
        return $response;
    }*/
	
	
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
		
		

	
	
	function getCustomers($filter,$date)
	{
		$response = array();
		
		$this->db->select('*');
		//$this->db->where("cam_status", "Cam details complete");
        $this->db->where("ROLE",1);
		if ($date!='') {
			$this->db->like("CREATED_AT", $date, 'both');
		}
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
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
	public function getCustomerLoanAppliedInfo($id){
      $this->db->select('*');
      $this->db->from('CUSTOMER_MORE_DETAILS');
      $this->db->where('CUST_ID', $id);
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

    public function getCreditAnalysisData($id){
      $this->db->select('*');
      $this->db->from('cam_credit_analysis');
      $this->db->where('ID', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }
	public function getCustomerLoanAppliedInfo2($id){
      $this->db->select('*');
      $this->db->from('CUSTOMER_APPLIED_LOANS');
      $this->db->where('CUST_ID', $id);
      $q = $this->db->get();
      $row = $q->row();
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
	public function getProfileData($id)
	{
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('UNIQUE_CODE', $id);
      $q = $this->db->get();
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
	  
      return $row;
    }
	public function getCustomerBankDocument($id)
	{
      $this->db->select('*');
      $this->db->from('DOCUMENTS');
      $this->db->where('USER_ID', $id);
      $q = $this->db->get();
      $row = $q->row();
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
	  
      $row = $q->row();
      return $row;
    }
	 public function getCoapplicantById($id){
      $this->db->select('*');
      $this->db->from('COAPPLICANT_DETAILS');
	  $this->db->join('COAPPLICANT_INCOME_DETAILS', 'COAPPLICANT_DETAILS.UNIQUE_CODE = COAPPLICANT_INCOME_DETAILS.COAPP_ID');
      $this->db->where('CUST_ID', $id);
	  
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
     
     return $this->db->get()->result();
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
	
	//=============================function for credit manager sanction forms==================================
	public function save_first_level_sanction_details($data)
	{

		$this->db->insert('first_level_sanction_details',$data);
		return $this->db->insert_id();
	}
	public function save_personal_discussion_details($data)
	{
        $this->db->insert('personal_discussion',$data);
		return $this->db->insert_id();
	}
	public function deviation_details($data)
	{
        $this->db->insert('deviations_details',$data);
		return $this->db->insert_id();
	}
	public function bank_report_details($data)
	{
        $this->db->insert('bank_report',$data);
		return $this->db->insert_id();
	}
	public function fi_details($data)
	{
        $this->db->insert('fi_details',$data);
		return $this->db->insert_id();
	}
	public function save_rcu_report($data)
	{
        $this->db->insert('rcu_report_details',$data);
		return $this->db->insert_id();
	}
	public function getApprovalRemarkData($id,$id1)
	{ 
      //$this->db->select('*');
     // $this->db->from(' first_level_sanction_details');
      //$this->db->where('application_number',$id);
	  //$this->db->where('credit_manager_id',$id1);
      //$q = $this->db->get();
      //$row = $q->row();
     // return $row;
	 
	     $response = [];
        $query = $this->db->query("SELECT count(*) as count FROM first_level_sanction_details where application_number = '.$id.' and credit_manager_id='.$id1.'"); 
        $cust_count = $query->row();
        $response['cust_count'] = $cust_count->count;
        return $response;
	  
	   
    }
	public function getApprovalRemarkData_remark($id,$id1)
	{ 
      $this->db->select('*');
      $this->db->from('first_level_sanction_details');
      $this->db->where('application_number',$id);
	  $this->db->where('credit_manager_id',$id1);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
	 
	  
	   
    }
	public function check_first_level_sanction_details($id,$id1)
	{
	  $this->db->select('*');
      $this->db->from('first_level_sanction_details');
      $this->db->where('application_number',$id);
	  $this->db->where('credit_manager_id',$id1);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
	}
	
	public function update_first_level_sanction_details($application_number,$credit_manager_user_id,$data)
	{
		 $this->db->where('application_number',$application_number);
		 $this->db->where('credit_manager_id', $credit_manager_user_id );
         return $this->db->update('first_level_sanction_details', $data);
	}
	public function check_personal_discussion_details($id,$id1)
	{
	  $this->db->select('*');
      $this->db->from(' personal_discussion');
      $this->db->where('application_number',$id);
	  $this->db->where('credit_manager_id',$id1);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
	}
	
	public function update_personal_discussion_details($application_number,$credit_manager_user_id,$data)
	{
		 $this->db->where('application_number',$application_number);
		 $this->db->where('credit_manager_id', $credit_manager_user_id );
         return $this->db->update(' personal_discussion', $data);
	}
	
	public function check_deviation_details($id,$id1)
	{
	  $this->db->select('*');
      $this->db->from(' deviations_details');
      $this->db->where('application_number',$id);
	  $this->db->where('credit_manager_id',$id1);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
	}
	
	public function update_deviation_details($application_number,$credit_manager_user_id,$data)
	{
		 $this->db->where('application_number',$application_number);
		 $this->db->where('credit_manager_id', $credit_manager_user_id );
         return $this->db->update('deviations_details', $data);
	}
	
	
	public function check_bank_report_details($id,$id1)
	{
	  $this->db->select('*');
      $this->db->from('bank_report');
      $this->db->where('application_number',$id);
	  $this->db->where('credit_manager_id',$id1);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
	}
	
	public function update_bank_report_details($application_number,$credit_manager_user_id,$data)
	{
		 $this->db->where('application_number',$application_number);
		 $this->db->where('credit_manager_id', $credit_manager_user_id );
         return $this->db->update('bank_report', $data);
	}

    public function check_fi_details($id,$id1)
	{
	  $this->db->select('*');
      $this->db->from('fi_details');
      $this->db->where('application_number',$id);
	  $this->db->where('credit_manager_id',$id1);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
	}
	
	/*public function update_fi_details($application_number,$credit_manager_user_id,$data)
	{
		 $this->db->where('application_number',$application_number);
		 $this->db->where('credit_manager_id', $credit_manager_user_id );
         return $this->db->update('fi_details', $data);
	}
	
	
	    public function check_rcu_details($id,$id1)
	{
	  $this->db->select('*');
      $this->db->from('rcu_report_details');
      $this->db->where('application_number',$id);
	  $this->db->where('credit_manager_id',$id1);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
	}*/
	public function save_eligibility_non_salaried_details($data)
	{
        $this->db->insert('eligibility_non_salaried',$data);
		return $this->db->insert_id();
	}
	    public function check_eligibility_non_salaried_details($id,$id1)
	{
	  $this->db->select('*');
      $this->db->from('eligibility_non_salaried');
      $this->db->where('application_number',$id);
	  $this->db->where('credit_manager_id',$id1);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
	}
	public function update_eligibility_non_salaried_details($application_number,$credit_manager_user_id,$data)
	{
		 $this->db->where('application_number',$application_number);
		 $this->db->where('credit_manager_id', $credit_manager_user_id );
         return $this->db->update('eligibility_salaried', $data);
	}
		public function save_eligibility_salaried_details($data)
	{
        $this->db->insert('eligibility_salaried',$data);
		return $this->db->insert_id();
	}
	    public function check_eligibility_salaried_details($id,$id1)
	{
	  $this->db->select('*');
      $this->db->from('eligibility_salaried');
      $this->db->where('application_number',$id);
	  $this->db->where('credit_manager_id',$id1);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
	}
	public function update_eligibility_salaried_details($application_number,$credit_manager_user_id,$data)
	{
		 $this->db->where('application_number',$application_number);
		 $this->db->where('credit_manager_id', $credit_manager_user_id );
         return $this->db->update('eligibility_salaried', $data);
	}
	
	public function getFiFilePath($id,$id1)
	{
	  $this->db->select('*');
      $this->db->from('fi_details');
      $this->db->where('application_number',$id);
	  $this->db->where('credit_manager_id',$id1 );
      $q = $this->db->get();
      $row =$q->row();
	  return $row;
    }
	public function getRcuFilePath($id,$id1)
	{
	  $this->db->select('*');
      $this->db->from('rcu_report_details');
      $this->db->where('application_number',$id);
	  $this->db->where('credit_manager_id',$id1 );
      $q = $this->db->get();
      $row =$q->row();
	  return $row;
    }
	public function getDeviatioonDetails($id,$id1)
	{
	  $this->db->select('*');
      $this->db->from('deviations_details');
      $this->db->where('application_number',$id);
	  $this->db->where('credit_manager_id',$id1 );
      $q = $this->db->get();
      $row =$q->row();
	  return $row;
    }
	
	public function update_credit_sanction_status($application_number,$data)
	{
		 $this->db->where('UNIQUE_CODE',$application_number);
		 
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
	  
		 
		 return $this->db->update('USER_DETAILS',$data);
	}
	
	public function getSanctionFormData($id,$id1)
	{
	  $this->db->select('*');
      $this->db->from('first_level_sanction_details');
      $this->db->where('application_number',$id);
	  //$this->db->where('credit_manager_id',$id1 );
      $q = $this->db->get();
      $row =$q->row();
	  return $row;
    }
	public function getBankFormData($id,$id1)
	{
	  $this->db->select('*');
      $this->db->from('bank_report');
      $this->db->where('application_number',$id);
	  $this->db->where('credit_manager_id',$id1 );
      $q = $this->db->get();
      $row =$q->row();
	  return $row;
    }
	public function getPersonalDiscussionData($id,$id1)
	{
	  $this->db->select('*');
      $this->db->from('personal_discussion');
      $this->db->where('application_number',$id);
	  $this->db->where('credit_manager_id',$id1 );
      $q = $this->db->get();
      $row =$q->row();
	  return $row;
    }

	//==============================added by priyanka 29-12-2021
	
	
	public function save_personal_discussion_pdf_details($data)
	{
        $this->db->insert('table_credit_pd',$data);
		return $this->db->insert_id();
	}

	public function check_personal_discussion_pdf_details($id)
	{
	  $this->db->select('*');
      $this->db->from('table_credit_pd');
      $this->db->where('customer_id',$id);
	 // $this->db->where('Credit_manager_id',$id1);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
	}

    public function getPDData($id)
	{
	  $this->db->select('*');
      $this->db->from('table_credit_pd');
      $this->db->where('customer_id',$id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
	}

	public function update_personal_discussion_pdf_details($application_number,$credit_manager_user_id,$data)
	{
		 $this->db->where('customer_id',$application_number);
		 $this->db->where('Credit_manager_id',$credit_manager_user_id );
         return $this->db->update('table_credit_pd', $data);
	}

	 public function data_row_pd_table($id){
      $this->db->select('*');
      $this->db->from('table_credit_pd');
      $this->db->where('customer_id',$id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }

	//==============================================added by priyanka 5-1-2022
	public function update_pd_images($data)
	{

		$this->db->insert('pd_photos',$data);
		return $this->db->insert_id();
	}
	public function get_pd_images($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('pd_photos');
        $this->db->where('customer_id',$id);
		$this->db->order_by("id", "desc");
		$response =$q->get()->result();
	    return $response;
	}

	 public function delete_photo($id)
    {
      $this->db->where("id", $id);
      return  $this->db->delete("pd_photos");
    }
    	/*--------------------------------- Added by papiha on 14-04-2022------------------------------------------*/
	public function update_Legal_user($id,$data)
	{
       
		$this->db->where('UNIQUE_CODE',$id );
		
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
  /*----------------------------------- added by papiha on 23_03_2022-------------------------------------------------------------*/
  /*function getDashboardData(){
		$data=array();
        $this->db->select('*');
        $this->db->where("ROLE",1);
		
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->num_rows();
	    $data['cust_count_all']=$response;


 
            $this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->where("USER_DETAILS.credit_sanction_status",null); 
           // $this->db->or_where("USER_DETAILS.credit_sanction_status",'CONTINUE'); 
            //$this->db->where("USER_DETAILS.cam_status",NULL);    
            //$this->db->order_by("USER_DETAILS.ID","desc");
            $data['in_progress'] = $this->db->get()->result();

 
            $this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           // $this->db->where("USER_DETAILS.credit_sanction_status",null); 
            $this->db->where("USER_DETAILS.credit_sanction_status",'CONTINUE'); 
            //$this->db->where("USER_DETAILS.cam_status",NULL);    
            //$this->db->order_by("USER_DETAILS.ID","desc");
            $data['in_progress2'] = $this->db->get()->result();

           
            $this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->where("CUSTOMER_MORE_DETAILS.STATUS ",'Created' );
            $this->db->order_by("USER_DETAILS.ID","desc");
            $data['just_login'] = $this->db->get()->result();


   
            $this->db->from('USER_DETAILS');
            $this->db->where("USER_DETAILS.credit_sanction_status",'REJECT');   
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->order_by("USER_DETAILS.ID", "desc");
             $data['rejected'] = $this->db->get()->result();


   
            $this->db->from('USER_DETAILS');
              $this->db->where("USER_DETAILS.credit_sanction_status",'HOLD');   
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->order_by("USER_DETAILS.ID", "desc");
             $data['hold'] = $this->db->get()->result();


                $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 2"); 
       			$dsa_count = $query->row();
       			$data['dsa_count'] = $dsa_count->count;


       			$query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 4"); 
        		$csr_count = $query->row();
        		$data['connector_count'] = $csr_count->count;

		
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		//$where = '(ROLE=1 AND Application_Id="'.$id.'")';
		//$this->db->where($where);
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response1 = $q->get()->num_rows();
		$data['cust_count_PD']=$response1;




		return $data;
    }*/
    
 /*   function getCustomers_for_pd()
    {
      $Combine_Customers=array();
              $this->db->select('*');
              $this->db->where("ROLE", 1); 
              $this->db->where("cam_status","Cam details complete");  
              $this->db->from('USER_DETAILS');
              $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
              $this->db->order_by("USER_DETAILS.ID","desc");
              $query = $this->db->get()->result();
             return $query;
        
        
    }*/
    function getCustomers_for_pd_info($Application_ID)
    {
      $Combine_Customers=array();
              $this->db->select('*');
          
              $this->db->where("ROLE", 1); 
              $this->db->where("Application_id", $Application_ID);
                
              $this->db->from('USER_DETAILS');
              $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
              $this->db->order_by("USER_DETAILS.ID", "desc");
              $query = $this->db->get()->row();
			  
			  if(isset($query->PAN_NUMBER) && $query->PAN_NUMBER != '')
	  {
			 $pan = $query->PAN_NUMBER;
			  $query->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($query->AADHAR_NUMBER) && $query->AADHAR_NUMBER != '')
	  {
			   $query->AADHAR_NUMBER = $this->decryption($query->AADHAR_NUMBER);
	  }
	  
	  if(isset($query->DOB) && $query->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $query->DOB = $this->decryption($query->DOB);
	  }
        
        /*$array = json_decode(json_encode($query), true);
          foreach($array as $user)
                          {
                          array_push($Combine_Customers,$user);
                          }
          
            
              return $Combine_Customers;*/
        return $query;
        
        
    }
    public function Insert_Legal_Documents($data)
	{

		$this->db->insert('legal_documents',$data);
		return $this->db->insert_id();
	}
  function Update_Legal_Documents($Application_Id,$data)
	{
		$this->db->where('Application_Id',$Application_Id );
        return $this->db->update('legal_documents', $data);
		
	}   
  /*--------------------------------added by papiha on 28_03_2022--------------------------------------------------*/
  function Update_Legal_status($id,$data)
	{
		$this->db->where('UNIQUE_CODE',$id );
		
		
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
  /*------------------------------ Added by papiha on 22_04_2022-------------------------------------------*/
  public function getDocuments_send_to_legal($id,$user_type,$send_to){
    $response = array();
    $this->db->select('*');
    $this->db->where("Application_id", $id);
  $this->db->where("User",$user_type);
  $this->db->where("Send_to",$send_to);
    $q = $this->db->from('legal_doc');
    $this->db->order_by("id", "asce");
    $response = $q->get()->result();
    return $response;
  }	
  function getProprty_docs()
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('property_documents');
		$response =$q->get()->result();
	    return $response;
	}
  public function checkSavedDocument($Application_id, $type){
    $response = array();
    $this->db->select('*');
    $this->db->where("Application_id", $Application_id);
    $this->db->where("Doc_name", $type);
   
    $q = $this->db->from('legal_doc');
    $response = $q->get();
   /* $str = $this->db->last_query();
    echo "<pre>";
    print_r($str);
    exit;*/
    if ( $response->num_rows() > 0 ){
           return 1;
    }else return 0;
  }
  public function saveDocuments($data){
    $this->db->insert('legal_doc',$data);
    return $this->db->insert_id();
  }
  public function get_document_by_id($doc_id)
	{
		$this->db->select('*');
        $this->db->where("id", $doc_id);
        $this->db->from('legal_doc');
        $q = $this->db->get();
		$row = $q->row();
		return $row;
	}
  public function delete_doc($data){      
    return $this->db->delete('legal_doc', $data); 

  }
  public function getDocuments_send_to_legal_by_CPA($id,$send_to){
    $response = array();
    $this->db->select('*');
    $this->db->where("Application_id", $id);
   $this->db->where("Send_to",$send_to);
    $q = $this->db->from('legal_doc');
    $this->db->order_by("id", "asce");
    $response = $q->get()->result();
    return $response;
  }	
  /*-------------------------added by papiha on 29_04_2022-----------------------------------------------------*/
  function getDashboardData(){
		$data=array();
        $this->db->select('count(*) as count');
        $this->db->where("ROLE",1);
        $q=$this->db->from('USER_DETAILS');
        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->order_by("USER_DETAILS.ID", "desc");
        $query = $this->db->get();
		    $response = $query->row();
        $data['cust_count_all']=$response->count;


            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where("ROLE",1);
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->where("USER_DETAILS.credit_sanction_status",null); 
           // $this->db->or_where("USER_DETAILS.credit_sanction_status",'CONTINUE'); 
            //$this->db->where("USER_DETAILS.cam_status",NULL);    
            //$this->db->order_by("USER_DETAILS.ID","desc");
            $query = $this->db->get();
            $response = $query->row();
            $data['in_progress'] = $response->count;

            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           // $this->db->where("USER_DETAILS.credit_sanction_status",null); 
            $this->db->where("USER_DETAILS.credit_sanction_status",'CONTINUE'); 
            //$this->db->where("USER_DETAILS.cam_status",NULL);    
            //$this->db->order_by("USER_DETAILS.ID","desc");
            $query = $this->db->get();
            $response = $query->row();
            $data['in_progress2'] =$response->count;

            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->where("CUSTOMER_MORE_DETAILS.STATUS ",'Created' );
            $this->db->order_by("USER_DETAILS.ID","desc");
            $query = $this->db->get();
            $response = $query->row();
            $data['just_login'] = $response->count;


   
            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where("USER_DETAILS.credit_sanction_status",'REJECT');   
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->order_by("USER_DETAILS.ID", "desc");
            $query = $this->db->get();
            $response = $query->row();
             $data['rejected'] = $response->count;


   
             $this->db->select('count(*) as count');
             $this->db->from('USER_DETAILS');
              $this->db->where("USER_DETAILS.credit_sanction_status",'HOLD');   
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->order_by("USER_DETAILS.ID", "desc");
            $query = $this->db->get();
            $response = $query->row();
             $data['hold'] =$response->count;


                $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 2"); 
       			$dsa_count = $query->row();
       			$data['dsa_count'] = $dsa_count->count;


       			$query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 4"); 
        		$csr_count = $query->row();
        		$data['connector_count'] = $csr_count->count;

		
		//$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		//$where = '(ROLE=1 AND Application_Id="'.$id.'")';
		//$this->db->where($where);
   		/* $this->db->select('count(*) as count');
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
        $query = $this->db->get();
        $response = $query->row();
		    $data['cust_count_PD']=$response->count;*/
		      $Combine_Customers=array();
              $this->db->select('count(*) as count');
              $this->db->where("ROLE", 1); 
              //$this->db->where("cam_status","Cam details complete");  
              //$where = "USER_DETAILS.cam_status='Cam details complete' AND USER_DETAILS.credit_sanction_status IS NULL ";
        	  //$this->db->where($where);
        	 // $where = "USER_DETAILS.cam_status='Cam details complete' AND USER_DETAILS.credit_sanction_status IS NULL OR USER_DETAILS.credit_sanction_status='CONTINUE' AND USER_DETAILS.cam_status='Cam details complete' ";
              $where = "USER_DETAILS.cam_status='Cam details complete'";
        	  $this->db->where($where);
              $this->db->from('USER_DETAILS');
              $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
              $this->db->order_by("USER_DETAILS.ID","desc");
              $query = $this->db->get();
              $response = $query->row();
              $data['cust_count_PD']=$response->count;



    
		return $data;
    }
    /*----------------------------------------Addded by papiha on 29_04_2022--------------------------------------------------*/
    function getCustomers_for_pd()
    {
              $Combine_Customers=array();
              $this->db->select('count(*) as count');
              $this->db->where("ROLE", 1); 
              //$this->db->where("cam_status","Cam details complete");  
             // $where = "USER_DETAILS.cam_status='Cam details complete' AND USER_DETAILS.credit_sanction_status IS NULL OR USER_DETAILS.credit_sanction_status='CONTINUE' AND USER_DETAILS.cam_status='Cam details complete' ";
              $where = "USER_DETAILS.cam_status='Cam details complete'";
             // $where = " USER_DETAILS.cam_status='Cam details complete' ";
        	  $this->db->where($where);
              $this->db->from('USER_DETAILS');
              $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
              $this->db->order_by("CUSTOMER_APPLIED_LOANS.ID","desc");
              $query = $this->db->get();
              $response = $query->row();

				

             return $response->count;
        
        
    }
    function getCustomers_for_pd_Filter($searchValue)
    {
        $this->db->select('count(*) as count');
        $this->db->from('USER_DETAILS');
        if($searchValue!= '')
        {

        $where = "FN like '%".$searchValue."%' AND ROLE=1 OR LN like '%".$searchValue."%'AND ROLE=1 ";
        $this->db->where($where);
        }
        //$this->db->where("cam_status","Cam details complete");  
         //  $where = "USER_DETAILS.cam_status='Cam details complete' AND USER_DETAILS.credit_sanction_status IS NULL OR USER_DETAILS.credit_sanction_status='CONTINUE' AND USER_DETAILS.cam_status='Cam details complete' ";
        $where = " USER_DETAILS.cam_status='Cam details complete' ";
        	  $this->db->where($where);
       
        
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $this->db->order_by("CUSTOMER_APPLIED_LOANS.ID","desc");
        $query = $this->db->get();
        $response = $query->row();
		
		if(isset($response->PAN_NUMBER) && $response->PAN_NUMBER != '')
	  {
			 $pan = $response->PAN_NUMBER;
			  $response->PAN_NUMBER = $this->decryption($pan);
	  }
	  
	  if(isset($response->AADHAR_NUMBER) && $response->AADHAR_NUMBER != '')
	  {
			   $response->AADHAR_NUMBER = $this->decryption($response->AADHAR_NUMBER);
	  }
	  
	  if(isset($response->DOB) && $response->DOB != '')
	  {
		  //echo $row->DOB."<br>";
			  $response->DOB = $this->decryption($response->DOB);
	  }
		
        //print_r($this->db->last_query());
       // exit;
      return $response->count;
    }
     function getCustomers_for_pd_With_Page($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
     {
     
        $this->db->select('*');
       // $this->db->where("ROLE", 1); 
       // $this->db->where("cam_status","Cam details complete");
        $this->db->from('USER_DETAILS');
       if($searchValue!= '')
        {
        $where = "FN like '%".$searchValue."%'AND ROLE=1 AND USER_DETAILS.cam_status='Cam details complete' OR LN like '%".$searchValue."%' AND ROLE=1 AND USER_DETAILS.cam_status='Cam details complete'";
        $this->db->where($where);
      
        }  
            // $where = "USER_DETAILS.cam_status='Cam details complete' AND USER_DETAILS.credit_sanction_status IS NULL OR USER_DETAILS.credit_sanction_status='CONTINUE' AND USER_DETAILS.cam_status='Cam details complete' ";
       $where = "USER_DETAILS.cam_status='Cam details complete' ";
        	  $this->db->where($where);
        
      
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $this->db->order_by("CUSTOMER_APPLIED_LOANS.ID","desc");
       
        $this->db->limit($rowperpage,$row);
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
		
      // print_r($response);
    // print_r($this->db->last_query());
	//	exit;
     return $response;
     }
     /*----------------------------------------Addded by sonal on 05_05_2022-- filter added by priya 5-05-2022------------------------------------------------*/
    function getCustomers_for_Customer($filter_by)
    {
    	if($filter_by=='all')
    	{
    		
            $Combine_Customers=array();
              $this->db->select('count(*) as count');
              $this->db->where("ROLE", 1); 
              
              $this->db->from('USER_DETAILS');
              $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
              
              $this->db->order_by("USER_DETAILS.ID","desc");
              $query = $this->db->get();
              $response = $query->row();
             return $response->count;
         }
        else if($filter_by=='Completed_CAM')
    	{
    		 $Combine_Customers=array();
              $this->db->select('count(*) as count');
              $this->db->where("ROLE", 1); 
              $where = "CUSTOMER_MORE_DETAILS.STATUS='Cam details complete' OR  CUSTOMER_MORE_DETAILS.STATUS='PD Completed'";
			  $this->db->where($where);
              $this->db->from('USER_DETAILS');
              $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
              	
              $this->db->order_by("USER_DETAILS.ID","desc");
              $query = $this->db->get();
              $response = $query->row();
             return $response->count;
    	}
    		else if($filter_by=='Incomplete_CAM')
    	{

    		 $Combine_Customers=array();
              $this->db->select('count(*) as count');
              $this->db->where("ROLE", 1); 
             	$where = "CUSTOMER_MORE_DETAILS.STATUS='Aadhar E-sign complete' AND USER_DETAILS.cam_status IS NULL AND USER_DETAILS.credit_sanction_status IS NULL OR USER_DETAILS.credit_sanction_status='CONTINUE'";
						$this->db->where($where);
              $this->db->from('USER_DETAILS');
              $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
              	
              $this->db->order_by("USER_DETAILS.ID","desc");
              $query = $this->db->get();
              $response = $query->row();
             return $response->count;
    	}
    	  else if($filter_by=='Completed_PD')
    	{
    		 $Combine_Customers=array();
              $this->db->select('count(*) as count');
              $this->db->where("ROLE", 1); 
              $where = "CUSTOMER_MORE_DETAILS.STATUS='PD Completed'";
			  $this->db->where($where);
              $this->db->from('USER_DETAILS');
              $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
              	
              $this->db->order_by("USER_DETAILS.ID","desc");
              $query = $this->db->get();
              $response = $query->row();
             return $response->count;
    	}

         else
         {
         	 $Combine_Customers=array();
              $this->db->select('count(*) as count');
              $this->db->where("ROLE", 1); 
              
              $this->db->from('USER_DETAILS');
              $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
              
              $this->db->order_by("USER_DETAILS.ID","desc");
              $query = $this->db->get();
              $response = $query->row();

             return $response->count;
         }
        
        
    }
    function getCustomers_for_Customer_Filter($searchValue,$filter_by)
    {
    	if($filter_by=='all')
    	{
    		
	        $this->db->select('count(*) as count');
	        $this->db->where("ROLE", 1); 
	        if($searchValue!= '')
	        {
	        $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
	        $this->db->where($where);
	        }
	        $this->db->from('USER_DETAILS');
	        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
	        $this->db->order_by("USER_DETAILS.ID","desc");
	        $query = $this->db->get();
	        $response = $query->row();
	      return $response->count;
	  }
	   else if($filter_by=='Completed_CAM')
    	{
    		  $this->db->select('count(*) as count');
	        $this->db->where("ROLE", 1); 
	           $where = "CUSTOMER_MORE_DETAILS.STATUS='Cam details complete' OR  CUSTOMER_MORE_DETAILS.STATUS='PD Completed'";
			  $this->db->where($where);
	        if($searchValue!= '')
	        {
	        $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
	        $this->db->where($where);
	        }
	        $this->db->from('USER_DETAILS');
	        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
	        $this->db->order_by("USER_DETAILS.ID","desc");
	        $query = $this->db->get();
	        $response = $query->row();
	      return $response->count;
    	}
    	 else if($filter_by=='Completed_PD')
    	{
    		  $this->db->select('count(*) as count');
	        $this->db->where("ROLE", 1); 
	           $where = "CUSTOMER_MORE_DETAILS.STATUS='PD Completed'";
			  $this->db->where($where);
	        if($searchValue!= '')
	        {
	        $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
	        $this->db->where($where);
	        }
	        $this->db->from('USER_DETAILS');
	        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
	        $this->db->order_by("USER_DETAILS.ID","desc");
	        $query = $this->db->get();
	        $response = $query->row();
	      return $response->count;
    	}
    		else if($filter_by=='Incomplete_CAM')
    	{
    		  $this->db->select('count(*) as count');
	        $this->db->where("ROLE", 1); 
	       	$where = "CUSTOMER_MORE_DETAILS.STATUS='Aadhar E-sign complete' AND USER_DETAILS.cam_status IS NULL AND USER_DETAILS.credit_sanction_status IS NULL OR USER_DETAILS.credit_sanction_status='CONTINUE'";
			$this->db->where($where);
	        if($searchValue!= '')
	        {
	        $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
	        $this->db->where($where);
	        }
	        $this->db->from('USER_DETAILS');
	        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
	        $this->db->order_by("USER_DETAILS.ID","desc");
	        $query = $this->db->get();
	        $response = $query->row();
	      return $response->count;
    	}
   	
	  else
	  {

	        $this->db->select('count(*) as count');
	        $this->db->where("ROLE", 1); 
	        if($searchValue!= '')
	        {
	        $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
	        $this->db->where($where);
	        }
	        $this->db->from('USER_DETAILS');
	        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
	        $this->db->order_by("USER_DETAILS.ID","desc");
	        $query = $this->db->get();
	        $response = $query->row();
	      return $response->count;
	  }
    }
     function getCustomers_for_Customer_With_Page($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by)
     {
     
     if($filter_by=='all')
    	{
    		
        	$this->db->select('*');
	        $this->db->where("ROLE", 1); 
	        if($searchValue!= '')
	        {
	        $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
	        $this->db->where($where);
	        }
	        $this->db->from('USER_DETAILS');
	        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
			$this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID= CUSTOMER_MORE_DETAILS.CUST_ID');
	        $this->db->order_by("USER_DETAILS.ID","desc");
	       
	        $this->db->limit($rowperpage,$row);
	        $query = $this->db->get();
	        $response = $query->result();
			
			//echo $this->db->last_query();
			
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
			
	      // print_r($response);
	     
	      return $response;
	  }
	     else if($filter_by=='Completed_CAM')
    	{
    			$this->db->select('*');
	        $this->db->where("ROLE", 1); 
	              $where = "CUSTOMER_MORE_DETAILS.STATUS='Cam details complete' OR  CUSTOMER_MORE_DETAILS.STATUS='PD Completed'";
			  $this->db->where($where);
	        if($searchValue!= '')
	        {
	        $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
	        $this->db->where($where);
	        }
	        $this->db->from('USER_DETAILS');
	        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
			$this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
	        $this->db->order_by("USER_DETAILS.ID","desc");
	       
	        $this->db->limit($rowperpage,$row);
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
			
	      // print_r($response);
	    //  print_r($this->db->last_query());
			   //	exit;
	      return $response;
    		}
    		 else if($filter_by=='Completed_PD')
    	{
    			$this->db->select('*');
	        $this->db->where("ROLE", 1); 
	              $where = "CUSTOMER_MORE_DETAILS.STATUS='PD Completed'";
			  $this->db->where($where);
	        if($searchValue!= '')
	        {
	        $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
	        $this->db->where($where);
	        }
	        $this->db->from('USER_DETAILS');
	        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
			$this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
	        $this->db->order_by("USER_DETAILS.ID","desc");
	       
	        $this->db->limit($rowperpage,$row);
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
	      // print_r($response);
	    //  print_r($this->db->last_query());
			   //	exit;
	      return $response;
    		}
    	else if($filter_by=='Incomplete_CAM')
    	{
    		$this->db->select('*');
	        $this->db->where("ROLE", 1); 
	               	$where = "CUSTOMER_MORE_DETAILS.STATUS='Aadhar E-sign complete' AND USER_DETAILS.cam_status IS NULL AND USER_DETAILS.credit_sanction_status IS NULL OR USER_DETAILS.credit_sanction_status='CONTINUE'";
			$this->db->where($where);
	        if($searchValue!= '')
	        {
	        $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
	        $this->db->where($where);
	        }
	        $this->db->from('USER_DETAILS');
	        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
			$this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
	        $this->db->order_by("USER_DETAILS.ID","desc");
	       
	        $this->db->limit($rowperpage,$row);
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
	      // print_r($response);
	    //  print_r($this->db->last_query());
			   //	exit;
	      return $response;
    	}
	  else
	  {
	  	$this->db->select('*');
	        $this->db->where("ROLE", 1); 
	        if($searchValue!= '')
	        {
	        $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' ";
	        $this->db->where($where);
	        }
	        $this->db->from('USER_DETAILS');
	        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
			$this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
	        $this->db->order_by("USER_DETAILS.ID","desc");
	       
	        $this->db->limit($rowperpage,$row);
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
	      // print_r($response);
	    //  print_r($this->db->last_query());
			   //	exit;
	      return $response;
	  }
     }


      public function check_sanction_letter_details($id){
      $response = array();
      $this->db->select('*');
      $this->db->where("customer_id", $id);      
      $q = $this->db->from('sanction_letter_values');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }

	 public function update_sanction_letter_details($id, $data){
      $this->db->where('customer_id', $id);
      return $this->db->update('sanction_letter_values',$data);
    }

    public function insert_sanction_letter_details($id, $data){
      $this->db->where('customer_id', $id);
      return $this->db->insert('sanction_letter_values',$data);
    }
     public function getCustomerSanction_letter_details($id){
    $this->db->select('*');
    $this->db->from('sanction_letter_values');
    $this->db->where('customer_id', $id);
    $q = $this->db->get();
    $row = $q->row();
    return $row;
  }
     function get_cluster_manager_name_list()
    {
       $this->db->select('*');
      $this->db->where('ROLE', 23); 
      $this->db->distinct();
      $this->db->from('USER_DETAILS');        
      $query = $this->db->get();
     $response = $query->result();
      return $response;
    }
    

    function getClusterCreditManagerDashboardData(){
		$data=array();
        $this->db->select('count(*) as count');
      
        $q=$this->db->from('first_level_sanction_details');

        $query = $this->db->get();
		$response = $query->row();
        $data['recommendations']=$response->count;


         $this->db->select('count(*) as count');
        $this->db->where("ROLE",1);
        $q=$this->db->from('USER_DETAILS');
        $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->order_by("USER_DETAILS.ID", "desc");
        $query = $this->db->get();
		    $response = $query->row();
        $data['cust_count_all']=$response->count;


            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where("ROLE",1);
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->where("USER_DETAILS.credit_sanction_status",null); 
   
            $query = $this->db->get();
            $response = $query->row();
            $data['in_progress'] = $response->count;

            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          
            $this->db->where("USER_DETAILS.credit_sanction_status",'CONTINUE'); 
         
            $query = $this->db->get();
            $response = $query->row();
            $data['in_progress2'] =$response->count;

            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->where("CUSTOMER_MORE_DETAILS.STATUS ",'Created' );
            $this->db->order_by("USER_DETAILS.ID","desc");
            $query = $this->db->get();
            $response = $query->row();
            $data['just_login'] = $response->count;


   
            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where("USER_DETAILS.credit_sanction_status",'REJECT');   
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->order_by("USER_DETAILS.ID", "desc");
            $query = $this->db->get();
            $response = $query->row();
             $data['rejected'] = $response->count;


   
             $this->db->select('count(*) as count');
             $this->db->from('USER_DETAILS');
              $this->db->where("USER_DETAILS.credit_sanction_status",'HOLD');   
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->order_by("USER_DETAILS.ID", "desc");
            $query = $this->db->get();
            $response = $query->row();
             $data['hold'] =$response->count;


                $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 2"); 
       			$dsa_count = $query->row();
       			$data['dsa_count'] = $dsa_count->count;


       			$query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 4"); 
        		$csr_count = $query->row();
        		$data['connector_count'] = $csr_count->count;

		      $Combine_Customers=array();
              $this->db->select('count(*) as count');
              $this->db->where("ROLE", 1); 
              //$this->db->where("cam_status","Cam details complete");  
              //$where = "USER_DETAILS.cam_status='Cam details complete' AND USER_DETAILS.credit_sanction_status IS NULL ";
        	  //$this->db->where($where);
        	  //$where = "USER_DETAILS.cam_status='Cam details complete' AND USER_DETAILS.credit_sanction_status IS NULL OR USER_DETAILS.credit_sanction_status='CONTINUE' AND USER_DETAILS.cam_status='Cam details complete' ";
        	  $where = "USER_DETAILS.cam_status='Cam details complete'";
        	  $this->db->where($where);
              $this->db->from('USER_DETAILS');
              $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
              $this->db->order_by("USER_DETAILS.ID","desc");
              $query = $this->db->get();
              $response = $query->row();
              $data['cust_count_PD']=$response->count;















        


    
		return $data;
    }

    //=====================added by priya 11-07-2022
    function Get_Total_no_of_sanction_recommendations()
  {
     $this->db->select('count(*) as count');
     $this->db->from('first_level_sanction_details');
     $this->db->join('USER_DETAILS','first_level_sanction_details.Customer_id= USER_DETAILS.UNIQUE_CODE');
     $this->db->order_by("first_level_sanction_details.ID", "desc");
     $query = $this->db->get();
     $response = $query->row();
     return $response->count;
  }
  function Get_sanction_recommendations($searchValue)
  {
    $this->db->select('count(*) as count');
    $this->db->from('first_level_sanction_details');
    $this->db->join('USER_DETAILS','first_level_sanction_details.Customer_id= USER_DETAILS.UNIQUE_CODE');
    $this->db->order_by("first_level_sanction_details.ID", "desc");
    $query = $this->db->get();
    $response = $query->row();
    return $response->count;
  }
  function Get_sanction_recommendations_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
  {
     $this->db->select('*');
     $this->db->from('first_level_sanction_details');
     $this->db->join('USER_DETAILS','first_level_sanction_details.Customer_id= USER_DETAILS.UNIQUE_CODE');
     $this->db->order_by("first_level_sanction_details.ID", "desc");
     $this->db->limit($rowperpage,$row);
     $query = $this->db->get();
     $response = $query->result();
     return $response;
  }

  	public function update_recommendation_details($Customer_ID,$data)
	{
	
		 $this->db->where('Customer_id', $Customer_ID );
         return $this->db->update('first_level_sanction_details', $data);
	}
	public function getSanctionrecommendationData($id)
	{
	  $this->db->select('*');
      $this->db->from('first_level_sanction_details');
      $this->db->where('Customer_id',$id);
	 $q = $this->db->get();
      $row =$q->row();
	  return $row;
    }
	/*--------------------------------Addded by papiha on 28_07_2022--------------------------------*/
	function getfi_docs()
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('fi_docs');
		$response =$q->get()->result();
	    return $response;
	}
	/*------------------------ added by papiha on 01_08_2022---------------------------------------------------*/
	function Update_Fi_details($Application_Id,$data)
	{
		$this->db->where('application_number',$Application_Id );
        return $this->db->update('fi_details', $data);
		
	} 
	public function Insert_fi_details($data)
	{

		$this->db->insert('fi_details',$data);
		return $this->db->insert_id();
	}  
	
/*-----------------------addded by papiha on 08_08_2022-------------------------------------------*/

function Update_RCU_details($Application_Id,$data)
{
	$this->db->where('application_number',$Application_Id );
	return $this->db->update('RCU_details', $data);
	
} 
public function Insert_RCU_details($data)
{

	$this->db->insert('RCU_details',$data);
	return $this->db->insert_id();
}  
function getRCU_docs()
{
	$response = array();
	$this->db->select('*');
	$q=$this->db->from('RCU_docs');
	$response =$q->get()->result();
	return $response;
}

/*----------------------------------- added by papiha on 08_08_2022 for legal Flow-----------------------------------------------------*/
function Update_Legal_details($Application_Id,$data)
{
  $this->db->where('application_number',$Application_Id );
      return $this->db->update('Legal_details', $data);
  
} 
public function Insert_Legal_details($data)
{

  $this->db->insert('Legal_details',$data);
  return $this->db->insert_id();
}  
/*-----------------------addded by papiha on 11_08_2022 for technical Flow-------------------------------------------*/

function Update_Technical_details($Application_Id,$data)
{
  $this->db->where('application_number',$Application_Id );
      return $this->db->update('Technical_details', $data);
  
} 
public function Insert_Technical_details($data)
{

  $this->db->insert('Technical_details',$data);
  return $this->db->insert_id();
}  
function getTechnical_docs()
{
  $response = array();
  $this->db->select('*');
  $q=$this->db->from('Technical_docs');
  $response =$q->get()->result();
    return $response;
}
//====================== added by priya 16-08-2022

 function Total_Files_for_disbursement()
  {

      $this->db->select('count(*) as count');
      $this->db->from('sanction_letter_values');
     // $this->db->where("payment_recived_date!=", NULL);
	     $this->db->where("Credit_proceed_status","Confirmed");
      $this->db->join('USER_DETAILS', 'sanction_letter_values.customer_id= USER_DETAILS.UNIQUE_CODE');
      $this->db->order_by("sanction_letter_values.ID", "desc");
      $query = $this->db->get();
      $response = $query->row();
      return $response->count;


            
 
  }
  function Search_Files_for_disbursement($searchValue)
  {
           $this->db->select('count(*) as count');
     
               $this->db->from('sanction_letter_values');
        $this->db->where("Credit_proceed_status","Confirmed");
      $this->db->join('USER_DETAILS', 'sanction_letter_values.customer_id= USER_DETAILS.UNIQUE_CODE');
                if($searchValue!= '')
                {
                  
                $where = "USER_DETAILS.FN like '%".$searchValue."%' OR USER_DETAILS.LN like '%".$searchValue."%' AND payment_recived_date != 'NULL' OR USER_DETAILS.FN like '%".$searchValue."%' OR USER_DETAILS.LN like '%".$searchValue."%' AND payment_recived_date != '' ";
                 
             
                $this->db->where($where);
                }
                $query = $this->db->get();
                 $response = $query->row();

                //exit;
                return $response->count;
  }
  function Files_for_disbursement_with_pagination($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
  {
           $this->db->select('*');
         
           $this->db->from('sanction_letter_values');
       $this->db->where("Credit_proceed_status","Confirmed");
     		 $this->db->join('USER_DETAILS', 'sanction_letter_values.customer_id= USER_DETAILS.UNIQUE_CODE');
                if($searchValue!= '')
                {
                       $where = "USER_DETAILS.FN like '%".$searchValue."%' OR USER_DETAILS.LN like '%".$searchValue."%' AND payment_recived_date != 'NULL' OR USER_DETAILS.FN like '%".$searchValue."%' OR USER_DETAILS.LN like '%".$searchValue."%' AND payment_recived_date != '' ";
                 
                  $this->db->where($where);
                }

                $this->db->order_by($columnName, $columnSortOrder);
                $this->db->limit($rowperpage,$row);
                $query = $this->db->get();
                $response = $query->result();
         
                return $response;
  }
//------------------------- added by priya 22-08-2022
  function get_disbursement_property_type_documents()
{
      $this->db->select('*');
      $this->db->from('disbursement_property_type_documents');        
      $this->db->order_by("id", "asc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
  }
  function get_disbursement_property_subtype_documents()
{
      $this->db->select('*');
      $this->db->from('disbursement_property_subtype_documents');        
      $this->db->order_by("id", "asc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
     
  }
   function get_disbursement_property_subtype_documents_by_id($id)
{
      $this->db->select('*');
      $this->db->from('disbursement_property_subtype_documents');      
      $this->db->where('Main_Document_Type_id',$id); 
      $this->db->order_by("id", "asc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
     
  }

  function get_disbursement_property_subtype_documents_by_id_join($id,$cust_id)
{
         $this->db->select('*');
		$this->db->where('Main_Document_Type_id',$id);
		$q=$this->db->from('disbursement_property_subtype_documents');
		$this->db->join('Disbursement_DOCUMENTS','disbursement_property_subtype_documents.id = Disbursement_DOCUMENTS.selected_document_type_id');
		$this->db->order_by("disbursement_property_subtype_documents.id","Asc");
		$this->db->where("Disbursement_DOCUMENTS.USER_ID",$cust_id);
		$response = $q->get()->result();
		   return $response;
     
  }

  function get_disbursement_property_subtype_documents_by_id_join_not_present($id,$IDS)
{
         $this->db->select('*');
		$this->db->where('Main_Document_Type_id',$id);
		$q=$this->db->from('disbursement_property_subtype_documents');
		$this->db->where_not_in('disbursement_property_subtype_documents.id',$IDS);
		$this->db->order_by("disbursement_property_subtype_documents.id","Asc");
		$response = $q->get()->result();

    
		   return $response;
     
  }
//----------------- added by priya 26-08-2022
  function Update_doc_approval_details($data,$doc_id){
  $this->db->where('selected_document_type_id', $doc_id);
  return $this->db->update('Disbursement_DOCUMENTS',$data);      
}
 public function delete_disbursement_doc($id)
    {
      $this->db->where("selected_document_type_id", $id);
      return  $this->db->delete("Disbursement_DOCUMENTS");
    }
//--------------------------------- added by priya 30-08-2022

 function getPending_doc_count()
    {
		//print_r($data);
		//exit();
     	$Combine_Customers=array();
        $this->db->select('count(*) as count');
        $this->db->from('sanction_letter_values');
		$this->db->join('USER_DETAILS','sanction_letter_values.customer_id = USER_DETAILS.UNIQUE_CODE');
		$this->db->where("sanction_letter_values.Status","Approved");
             $this->db->order_by("sanction_letter_values.ID","desc");
        $query = $this->db->get();
        $response = $query->row();

	    return $response->count;
         
        
        
    }
    function searchPending_document($searchValue)
    {
        $this->db->select('count(*) as count');
        if($searchValue!= '')
	    {
	      $where = "Status like '%".$searchValue."%'";
	      $this->db->where($where);
	    }
	
	    $this->db->from('sanction_letter_values');
			$this->db->join('USER_DETAILS','sanction_letter_values.customer_id = USER_DETAILS.UNIQUE_CODE');
				$this->db->where("sanction_letter_values.Status","Approved");
       $this->db->order_by("sanction_letter_values.ID","desc");

	    $query = $this->db->get();
	    $response = $query->row();
	    return $response->count;
	  
    }
     function getPending_document_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
     {
     
	  	$this->db->select('*');
	    if($searchValue!= '')
	    {
	         $where = "Status like '%".$searchValue."%'";
                 
	      $this->db->where($where);
	    }
	   
	   $this->db->from('sanction_letter_values');
	   	$this->db->join('USER_DETAILS','sanction_letter_values.customer_id = USER_DETAILS.UNIQUE_CODE');
	   		$this->db->where("sanction_letter_values.Status","Approved");
        $this->db->order_by("sanction_letter_values.ID","desc");
	   //$this->db->limit($rowperpage,$row);
	   //$this->db->limit($rowperpage,$row);
	    $query = $this->db->get();
	    $response = $query->result();
		 //$executedQuery = $this->db->last_query();
   // print_r($executedQuery);
   // exit;
    	return $response;
	  
     }
     
	 function find_all_reverted_documents()
	 {
		 $this->db->select('*');
	     $this->db->from('Disbursement_DOCUMENTS');
		 $this->db->where("not_available_status",'Reverted'); 
	     $query = $this->db->get();
	     $response = $query->result();
      	 return $response;
	 }

//----------------------- added by priya 30-08-2022
function get_disbursement_property_not_available_subtype_documents_($id,$cust_id)
{
        $this->db->select('*');
		$this->db->where('Main_Document_Type_id',$id);
	
		$q=$this->db->from('disbursement_property_subtype_documents');
		$this->db->join('Disbursement_DOCUMENTS','disbursement_property_subtype_documents.id = Disbursement_DOCUMENTS.selected_document_type_id');
		$this->db->where('Disbursement_DOCUMENTS.not_available_status','Reverted');
		$this->db->where('Disbursement_DOCUMENTS.USER_ID',$cust_id);
		$this->db->order_by("disbursement_property_subtype_documents.id","Asc");
		$response = $q->get()->result();
		return $response;
     
  }
  
  //==================================================== added by priya 1-09-2022
   function get_disbursement_property_subtype($master_Type)
	 {
		 $this->db->select('*');
	     $this->db->from('disbursement_property_subtype_documents');
		 $this->db->where("Main_Document_Type_id",$master_Type); 
	     $query = $this->db->get();
	     $response =$query->result();
      	 return $response;
	 }
	 
	 public function find_doc_present_or_not($master_Sub_Type,$id)
	{
		 $this->db->select('*');
	     $this->db->from('Disbursement_DOCUMENTS');
		 $this->db->where("selected_document_type_id",$master_Sub_Type); 
		 	 $this->db->where("USER_ID",$id); 
	     $query = $this->db->get();
	     $response = $query->result();
      	 return $response;
	 
    }
	
	 public function find_Disbursement_document_approval_data($id)
	{
		$this->db->select('*');
		$this->db->from('Disbursement_Document_status');
		$this->db->where('User_ID',$id);
		$q = $this->db->get();
		$row =$q->row();
		return $row;
	 
    }
	
	
	  function Update_disbursement_doc_approval_details($id,$data)
	  {
		$this->db->where('User_ID',$id);
		return $this->db->update('Disbursement_Document_status',$data);      
	  }
	  
	  
	  function find_my_disbursement_amounts($cust_id)
{
         
		$this->db->select('*');
		$this->db->where('User_ID',$cust_id);
		$q=$this->db->from('disbursement_checque_details');
		$this->db->order_by("id","DESC");
	    $response = $q->get()->result();
	return $response;
     
  }
  
    function loan_application_documents($id)
{
      $this->db->select('*');
      $this->db->from('DOCUMENTS'); 
      $this->db->where('USER_ID',$id);	  
     // $this->db->order_by("id", "asc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
     
  }
   public function getCustomerSanction_recommendation_details($id){
    $this->db->select('*');
    $this->db->from('first_level_sanction_details');
    $this->db->where('Customer_id', $id);
    $q = $this->db->get();
    $row = $q->row();
    return $row;
  }
  
  
  //================================== added by priya 10-09-2022
    function find_my_disbursement_agreement_data($cust_id)
	{
         
		$this->db->select('*');
		$this->db->where('customer_ID',$cust_id);
		$q=$this->db->from('disbursement_loan_agreement_details');
		$this->db->order_by("id","Asc");
	    $response = $q->get()->result();
		return $response;
     
	}
	
	public function save_my_disbursement_agreement_data($agreement_data)
	{

		$this->db->insert('disbursement_loan_agreement_details',$agreement_data);
		return $this->db->insert_id();
	}
	
	 public function update_my_disbursement_agreement_data($id, $data){
      $this->db->where('customer_ID', $id);
      return $this->db->update('disbursement_loan_agreement_details', $data);
    }
	
	  function get_get_coapp_documents($IDS)
{
        $this->db->select('*');
		$q=$this->db->from('DOCUMENTS');
		$this->db->where_in('USER_ID',$IDS);
		$response = $q->get()->result();
        return $response;
     
  }
  
   public function delete_cheque($id)
    {
      $this->db->where("id", $id);
      return  $this->db->delete("disbursement_checque_details");
    }
	
	 public function delete_disbursement_cheque_document($id)
    {
      $this->db->where("ID", $id);
      return  $this->db->delete("DOCUMENTS");
    }
	
	public function update_disbursement_cheque_document_entry($id, $data){
      $this->db->where('document_inserted_id', $id);
      return $this->db->update('disbursement_checque_details', $data);
    }
	
	public function update_uplodede_cheque_entry($id, $data){
      $this->db->where('id', $id);
      return $this->db->update('disbursement_checque_details', $data);
    }
	
	//------------------ added by priya 22-09-2022
	  function Update_save_status_for_documentdoc_approval_details($data,$doc_id)
	  {
		$this->db->where('id', $doc_id);
		return $this->db->update('DOCUMENTS',$data);      
	}
	
	//============= added by priya 27-09-2022
	public function find_my_legal_technical_documents($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->order_by("id", "desc");
		$response =$q->get()->result();
	    return $response;
	}
	public function find_my_legal_documents($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"Legal document");
		$this->db->order_by("id", "desc");
		$response =$q->get()->result();
	    return $response;
	}
	public function find_my_technical_documents($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"Technical document");
		$this->db->order_by("id", "desc");
		$response =$q->get()->result();
	    return $response;
	}
	public function find_my_FI_documents($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"FI document");
		$this->db->order_by("id", "desc");
		$response =$q->get()->result();
	    return $response;
	}
	public function find_my_RCU_documents($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"RCU document");
		$this->db->order_by("id", "desc");
		$response =$q->get()->result();
	    return $response;
	}
	public function find_my_Court_case_documents($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"Court case document");
		$this->db->order_by("id", "desc");
		$response =$q->get()->result();
	    return $response;
	}
	public function find_my_CRIF_documents($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"CRIF");
		$this->db->order_by("id", "desc");
		$response =$q->get()->result();
	    return $response;
	}
	public function find_my_Legal_Document_Search_documents($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"Legal Document Search");
		$this->db->order_by("id", "desc");
		$response =$q->get()->result();
	    return $response;
	}
	public function find_my_IncomeAnalysisbankstatement($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"Income Analysis bank statement");
		$this->db->order_by("id", "desc");
		$response =$q->get()->result();
	    return $response;
	}
	public function Property_document_list($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('property_documents');
     	$response =$q->get()->result();
	    return $response;
	}
	public function find_my_bank_statement_documents($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"Income Analysis bank statement");
		$this->db->order_by("id", "ASC");
		$response =$q->get()->result();
	    return $response;
	}
	
	public function find_my_loan_application_form($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"Loan Application Form");
		$this->db->order_by("id", "ASC");
		$response =$q->get()->result();
	    return $response;
	}
	public function find_my_KYC_documents($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"KYC");
		$this->db->order_by("id", "ASC");
		$response =$q->get()->result();
	    return $response;
	
	}
	public function find_my_loan_agreement($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"Signed Loan Agreement");
		$this->db->order_by("id", "ASC");
		$response =$q->get()->result();
	    return $response;
	}
	public function find_my_sanction_letter($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"Signed Sanction Letter");
		$this->db->order_by("id", "ASC");
		$response =$q->get()->result();
	    return $response;
	}
	public function find_my_MITC_letter($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"Signed MITC Letter");
		$this->db->order_by("id", "ASC");
		$response =$q->get()->result();
	    return $response;
	}
	function Update_save_report_approval_details($data,$doc_id)
	  {
		$this->db->where('id', $doc_id);
		return $this->db->update('legal_doc',$data);      
	}
	
	public function find_my_Bank_signature_verification($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"Bank signature verification");
		$this->db->order_by("id", "ASC");
		$response =$q->get()->result();
	    return $response;
	}//
	public function find_my_Vernacular_Declaration($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"Vernacular Declaration");
		$this->db->order_by("id", "ASC");
		$response =$q->get()->result();
	    return $response;
	}
	public function find_my_Dual_name_declatarion($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"Dual name declatarion");
		$this->db->order_by("id", "ASC");
		$response =$q->get()->result();
	    return $response;
	}
	public function find_my_End_use_letter($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"End use letter");
		$this->db->order_by("id", "ASC");
		$response =$q->get()->result();
	    return $response;
	}
	public function find_my_Pre_EMI_letter($id)
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('legal_doc');
        $this->db->where('Cust_id',$id);
		$this->db->where('Doc_name',"Pre EMI letter");
		$this->db->order_by("id", "ASC");
		$response =$q->get()->result();
	    return $response;
	}
	//====================== added by priya 11-10-2022
	public function find_info($id)
	{
      $this->db->select('*');
      $this->db->from('DOCUMENTS');
      $this->db->where('ID', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }
	public function find_report_info($id)
	{
      $this->db->select('*');
      $this->db->from('legal_doc');
      $this->db->where('id', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }
	
	public function update_disbursement_status($id, $data){
      $this->db->where('CUST_ID', $id);
      return $this->db->update('CUSTOMER_MORE_DETAILS',$data);
    }
	//============================= added by priya 18-01-2023==============================
	public function get_dvu_checklist()
	{
		$response = array();
		$this->db->select('*');
		$q=$this->db->from('dvu_checklist');
		$this->db->order_by("id", "ASC");
		$response =$q->get()->result();
	    return $response;
	}

}

?>