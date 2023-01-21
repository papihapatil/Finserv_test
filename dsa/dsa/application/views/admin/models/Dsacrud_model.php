<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DSACrud_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

    function getDashboardData($id){
        $response = [];
        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 1 AND DSA_ID = '".$id."'"); 
        $cust_count = $query->row();
        $response['cust_count'] = $cust_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 7 AND DSA_ID = '".$id."'"); 
        $manager_count = $query->row();
        $response['manager_count'] = $manager_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 6 AND DSA_ID = '".$id."'"); 
        $csr_count = $query->row();
        $response['csr_count'] = $csr_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM CUSTOMER_APPLIED_LOANS WHERE CUST_ID  IN(select UNIQUE_CODE from USER_DETAILS where DSA_ID = '".$id."')"); 
        $applied_loan_count = $query->row();
        $response['applied_loan_count'] = $applied_loan_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where PROFILE_PERCENTAGE < 100 and ROLE = 1  AND DSA_ID = '".$id."'"); 
        $pending_profile_count = $query->row();
        $response['pending_profile_count'] = $pending_profile_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 6 AND DSA_ID = '".$id."'"); 
        $conn_count = $query->row();
        $response['conn_count'] = $csr_count->count;

        return $response;
    }
    function getDashboardData_SCFO(){
      
      $response = [];
      $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE =27"); 
      $cust_count = $query->row();
      $response['retailer_count'] = $cust_count->count;
  
      $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE =29" ); 
      $manager_count = $query->row();
      $response['distributor_count'] = $manager_count->count;
      /*-----------------------pending Retailers------------------------------------*/

      
            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where("ROLE", 27);   
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Created'); 
           // $this->db->or_where("USER_DETAILS.credit_sanction_status",'CONTINUE'); 
            //$this->db->where("USER_DETAILS.cam_status",NULL);    
            //$this->db->order_by("USER_DETAILS.ID","desc");
             $q = $this->db->get();
            $row = $q->row();
            
            $response['retailer_incomplet'] = $row->count;
            /*-----------------------Approved Retailers------------------------------------*/
      
      
            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where("ROLE", 27);   
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Approved'); 
           // $this->db->or_where("USER_DETAILS.credit_sanction_status",'CONTINUE'); 
            //$this->db->where("USER_DETAILS.cam_status",NULL);    
            //$this->db->order_by("USER_DETAILS.ID","desc");
             $q = $this->db->get();
            $row = $q->row();
            
            $response['retailer_Approved'] = $row->count;


            /*---------------------------pending <distributor---------------------------------------*/
            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where("ROLE", 29);   
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Created'); 
           // $this->db->or_where("USER_DETAILS.credit_sanction_status",'CONTINUE'); 
            //$this->db->where("USER_DETAILS.cam_status",NULL);    
            //$this->db->order_by("USER_DETAILS.ID","desc");
            $q = $this->db->get();
            $row = $q->row();
            
            $response['distributor_incomplet'] = $row->count;
            /*-----------------------Approved distributors------------------------------------*/
      
      
            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where("ROLE", 29);   
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Approved'); 
           // $this->db->or_where("USER_DETAILS.credit_sanction_status",'CONTINUE'); 
            //$this->db->where("USER_DETAILS.cam_status",NULL);    
            //$this->db->order_by("USER_DETAILS.ID","desc");
             $q = $this->db->get();
            $row = $q->row();
            
            $response['distributors_Approved'] = $row->count;
            /*----------------------------pending request for approval-----------------------------------------*/
            $this->db->select('count(*) as count');
            $this->db->from('requests');
            $this->db->where('status', 'Approved By Distributor');   
           
            $q = $this->db->get();
            $row = $q->row();
            
            $response['scfo_pending_for_approval'] = $row->count;
            /*----------------------------------------scfo Approved request---------------------------------*/
            $this->db->select('count(*) as count');
            $this->db->from('requests');
            $this->db->where('status', 'Approved By SCFO');   
          
            $q = $this->db->get();
            $row = $q->row();
            
            $response['scfo_approval_request'] = $row->count;
            /*----------------------------------------scfo rejected request---------------------------------*/
            $this->db->select('count(*) as count');
            $this->db->from('requests');
            $this->db->where('status', 'Reject By SCFO');   
           
            $q = $this->db->get();
            $row = $q->row();
            
            $response['scfo_reject_request'] = $row->count;
             /*----------------------------------------All request---------------------------------*/
             $this->db->select('count(*) as count');
             $this->db->from('requests');
             $q = $this->db->get();
             $row = $q->row();
             
             $response['All_request'] = $row->count;
    
      
      return $response;

  }
  function getDashboardData_Distributor($id){
      
    $response = [];
    $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE =27 AND distributor_id='".$id."'"); 
    $cust_count = $query->row();
    $response['retailer_count'] = $cust_count->count;

    $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE =29" ); 
    $manager_count = $query->row();
    $response['distributor_count'] = $manager_count->count;
    /*-----------------------pending Retailers------------------------------------*/

    
          $this->db->select('count(*) as count');
          $this->db->from('USER_DETAILS');
          $this->db->where("ROLE", 27);   
          $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Created'); 
          $this->db->where("USER_DETAILS.distributor_id",$id); 
         // $this->db->or_where("USER_DETAILS.credit_sanction_status",'CONTINUE'); 
          //$this->db->where("USER_DETAILS.cam_status",NULL);    
          //$this->db->order_by("USER_DETAILS.ID","desc");
           $q = $this->db->get();
          $row = $q->row();
          
          $response['retailer_incomplet'] = $row->count;
          /*-----------------------Approved Retailers------------------------------------*/
    
    
          $this->db->select('count(*) as count');
          $this->db->from('USER_DETAILS');
          $this->db->where("ROLE", 27);   
          $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Approved'); 
          $this->db->where("USER_DETAILS.distributor_id",$id); 
         // $this->db->or_where("USER_DETAILS.credit_sanction_status",'CONTINUE'); 
          //$this->db->where("USER_DETAILS.cam_status",NULL);    
          //$this->db->order_by("USER_DETAILS.ID","desc");
           $q = $this->db->get();
          $row = $q->row();
          
          $response['retailer_Approved'] = $row->count;


          
          /*----------------------------request for approved-----------------------------------------*/
          $this->db->select('count(*) as count');
          $this->db->from('requests');
          $this->db->where('status', 'Approved By SCFO');   
          $this->db->where('distributorid', $id);  
          
          $q = $this->db->get();
          $row = $q->row();
          
          $response['request_approved'] = $row->count;
      
          /*----------------------------------------scfo rejected request---------------------------------*/
          $this->db->select('count(*) as count');
          $this->db->from('requests');
          $this->db->where('distributorid', $id);  
          $where = '(status="Reject By SCFO" or status = "Reject By Distributor")';
          $this->db->where($where);  
          $this->db->where('distributorid', $id);  
         
          $q = $this->db->get();
          $row = $q->row();
          
          $response['reject_request'] = $row->count;
           /*----------------------------------------All request---------------------------------*/
            /*--------------------------- approved by distributor-----------------------------------------*/
          $this->db->select('count(*) as count');
          $this->db->from('requests');
          $this->db->where('status', 'Approved By Distributor');   
          $this->db->where('distributorid', $id);  
          
          $q = $this->db->get();
          $row = $q->row();
          
          $response['request_approved_by_distributor'] = $row->count;
          /*-------------------------------------------------------------------------------------*/
           /*--------------------------- approved by distributor-----------------------------------------*/
           $this->db->select('count(*) as count');
           $this->db->from('requests');
           $this->db->where('status', 'Reject By Distributor');   
           $this->db->where('distributorid', $id);  
           
           $q = $this->db->get();
           $row = $q->row();
           
           $response['request_reject_by_distributor'] = $row->count;
           /*-------------------------------------------------------------------------------------*/
           $this->db->select('count(*) as count');
           $this->db->from('requests');
           $this->db->where('distributorid', $id); 
           $q = $this->db->get();
           $row = $q->row();
           
           $response['All_request'] = $row->count;
  
    
    return $response;

}
	public function getDashboardData_retailer($id)
  {
    $this->db->select('count(*) as counter');
    $this->db->from('requests');
    $this->db->where('retailerid', $id);               
    $this->db->order_by("id", "desc");
    $query = $this->db->get();
    $cust_count = $query->row();
    $response['all_request']=$cust_count->counter;
    /*----------------------------------- Approved request ---------------------------------------------------------*/
           $this->db->select('count(*) as counter');
          $this->db->from('requests');
          //$this->db->where('status', 'Approved by SCFO');			
          $this->db->where('retailerid', $id);	
          $where = "(status = 'Approved by Distributor' OR status = 'Approved by SCFO' AND retailerid='".$id."')";
          $this->db->where($where);		
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
		    	$response['Approved_request']= $cust_count->counter;
    /*------------------------------------------------------------------------------------------------*/
    /*---------------------------------------------Revert request ------------------------- -------*/
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          //$this->db->where('status', 'Revert by Distributor');	
          $where = "(status like 'Revert by Distributor' OR status like 'Revert by SCFO' AND retailerid='".$id."')";
          $this->db->where($where);				
          $this->db->where('retailerid', $id);			
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
          $response['Reverted_request']=$cust_count->counter;
    /*---------------------------------------------------------------------------------------------*/
    /*---------------------------------------------Reject request ------------------------- -------*/
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);	
          //$this->db->where('status', 'Revert by Distributor');	
          $where = "(status like 'Reject by Distributor' OR status like 'Reject by SCFO' AND retailerid='".$id."')";
          $this->db->where($where);		
        		
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
          $response['Rejected_request']=$cust_count->counter;
    /*---------------------------------------------------------------------------------------------*/

    return $response;
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
		
    function register_screen_one($data){
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('EMAIL', $data['EMAIL']);
          $query_by_email = $this->db->get();

          if ( $query_by_email->num_rows() > 0 ){
             return -1;
          }else{
              $this->db->select('*');
              $this->db->from('USER_DETAILS');
              $this->db->where('MOBILE', $data['MOBILE']);
              $query_by_mobile = $this->db->get();

              if ( $query_by_mobile->num_rows() > 0 ){
                 return -2;
              }  
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

          $this->db->insert('USER_DETAILS',$data);
          return $this->db->insert_id();
    }

    public function update_comission($id, $data){
      $this->db->where('ID', $id);
      return $this->db->update('APPLIED_LOANS',$data);      
    }

    public function getProfileData($id){
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
	  
	
     /* $str = $this->db->last_query();
	    echo "<pre>";
      print_r($str);
      //exit;*/
      return $row;

    }

    public function getDsaId($id){
      $this->db->select('DSA_ID');
      $this->db->from('USER_DETAILS');
      $this->db->where('UNIQUE_CODE', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row->DSA_ID;
    }

    public function getManagerId($id){
      $this->db->select('MANAGER_ID');
      $this->db->from('USER_DETAILS');
      $this->db->where('UNIQUE_CODE', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row->MANAGER_ID;
    }

    public function saveBank($data){
      $this->db->insert('DSA_BANKS',$data);
      return $this->db->insert_id();
    }

    public function getBanks($id){
      $response = array();
      $this->db->select('*');
      $this->db->where("DSA_ID", $id);
      $q = $this->db->from('DSA_BANKS');
      $this->db->order_by("ID", "desc");
      $response = $q->get()->result();
      return $response;
    }
	public function get_all_Banks()
	{
 		  $this->db->select('*');
		  $q = $this->db->from('SYS_BANKS');
		  $response = $q->get()->result();
		  return $response;
	}
	 public function getProfileDataMore($id){
      $this->db->select('*');
      $this->db->from('CUSTOMER_MORE_DETAILS');
      $this->db->where('CUST_ID', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }
   public function getCoapplicantById($id){
      $this->db->select('*');
      $this->db->from('COAPPLICANT_DETAILS');
      $this->db->where('CUST_ID', $id);
     
	  
	  $row = $this->db->get()->result();
	  
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
	  
	  //$this->db->get()->result()
	  
     return $row;
    }
	 public function getAplliedLoanDetails($id){
      $this->db->select('*');
      $this->db->from('CUSTOMER_APPLIED_LOANS');
      $this->db->where('CUST_ID', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }
	public function getCoapplicantNo($id){
      $this->db->select('*');
      $this->db->from('coapplicant_details');
      $this->db->where('CUST_ID', $id);
      $q = $this->db->get();
      $row = $q->num_rows();
	  
      return $row;
    }
	public function getDocument($id){
		$doc=array();
      $this->db->select('DOC_TYPE');
      $this->db->from('DOCUMENTS');
      $this->db->where('USER_ID', $id);
	  foreach($this->db->get()->result() as $row)
	  {
		
		  array_push($doc,$row->DOC_TYPE);
	  }
	 return $doc;
    }
	public function getDocumentCount($id){
      $this->db->select('DOC_TYPE');
      $this->db->from('DOCUMENTS');
      $this->db->where('USER_ID', $id);
      $q = $this->db->get();
      $row = $q->num_rows();
	  return $row;
    }
	public function getDocument_Coapplicant($id)
	{
		$UNIQUE_CODE=array();
		$doc=array();
		  $this->db->select('UNIQUE_CODE');
		  $this->db->from('coapplicant_details');
		  $this->db->where('CUST_ID', $id);
		  //$q = $this->db->get();
		  //$row = $q->result();
		  //return $row;
		  foreach($this->db->get()->result() as $row)
		  {
			 
			  /*$this->db->select('DOC_TYPE');
			  $this->db->from('documents');
			  $this->db->where('USER_ID', $row->UNIQUE_CODE);
			  $q = $this->db->get();
			  $row1 = $q->result();
		      return $row1;*/
			  array_push($UNIQUE_CODE,$row->UNIQUE_CODE);
		  }
		 // return $UNIQUE_CODE;
		  
			  /*$query = $this->db->where_in("USER_ID", $UNIQUE_CODE)->get("documents");
                    return $query->result_array();*/
					
					/*$this->db->select('*');
					$this->db->where_in('USER_ID', $UNIQUE_CODE);
					$query = $this->db->get('documents');
					$res = $query->result();
					return $res;*/
					$result=[];
					foreach($UNIQUE_CODE as $key => $id) 
					{
						$this->db->select('DOC_TYPE');
						$this->db->where_in('USER_ID', $id);
						$query = $this-> db-> get('documents');
						$r = $query-> result_array();
						array_push($result, $r);
					}
					return $result;

			         
		       
			  
		
	}
	
    function delete_bank($arr){
      return $this->db->delete('DSA_BANKS', $arr); 
    }
	public function update_dsa_banks($id, $data){
      $this->db->where('DSA_ID', $id);
      return $this->db->update('DSA_BANKS', $data);
    }
	public function insert_dsa_banks($id, $data){
      $this->db->where('DSA_ID', $id);
      return $this->db->insert('DSA_BANKS', $data);
    }
	public function check_dsa_banks($id){
        $this->db->select('*');
	    $this->db->from('DSA_BANKS');
		$this->db->where('DSA_ID', $id);
		$query = $this-> db-> get();
		$r = $query->num_rows();
		return $r;
    }
	public function remove_dsa_banks($data, $id)
	{
			$this->db->where("DSA_ID",$id);
         return $this->db->delete('DSA_BANKS',$data); 
	}
	public function get_dsa_Banks($id)
	{
 		  $this->db->select('*');
		  $q = $this->db->from('DSA_BANKS');
		  $this->db->where('DSA_ID', $id);
		  $response = $q->get()->result();
		  return $response;
	}
	public function get_credit_score($id)
	{
		  $this->db->select('*');
		  $this->db->from('credit_score');
		  $this->db->where('customer_id', $id);
		  $q = $this->db->get();
		  $row = $q->row();
     /* $str = $this->db->last_query();
	    echo "<pre>";
      print_r($str);
      //exit;*/
		  return $row;
	}
	public function importData($data) {
 
       // $this->db->set($data);
		// $res=$this->db->insert($this->db->dbprefix . 'register');
        //$res = $this->db->insert_batch('register',$data);
		  //$res = $this->db->insert_batch('stories_to_categories',_insert_($data));
		   $res=$this->db->insert_batch('register', $data);
        if($res){
            return 1;
        }else{
            return 0;
        }
 
    }
	public function update_lead($id, $data){
      $this->db->where('id', $id);
      return $this->db->update('register',$data);      
    }

     //========================code by priyanka =======================================================================
 public function check_old_passord($old_pass_1,$dsa_id)
 {
   $this->db->select('*');
     $this->db->from('USER_DETAILS');
     $this->db->where('UNIQUE_CODE',$dsa_id);
   $this->db->where('PASSWORD',$old_pass_1);
     $q = $this->db->get();
     $row = $q->row();
     return $row;
 }
 public function update_dsa_password($old_pass_1,$dsa_id,$confirm_pass_2)
	{
    $query = $this->db->query("UPDATE USER_DETAILS set PASSWORD= '".$confirm_pass_2."' where UNIQUE_CODE ='".$dsa_id."'"); 
    return $query;
	}

  //========================code by papiha=============================================================
  public function getBM_ID($id){
    $this->db->select('BM_ID');
    $this->db->from('USER_DETAILS');
    $this->db->where('UNIQUE_CODE', $id);
    $q = $this->db->get();
    $row = $q->row();
    return $row->BM_ID;
  }

  //==========================added by priyanka ======================================================
   public function save_GO_NO_GO_application_status($data)
	  {
        $this->db->insert('internal_loan_application_status',$data);
		return $this->db->insert_id();
	  }

   public function getinternal_loan_application_status($id){
      $this->db->select('*');
      $this->db->from('internal_loan_application_status');
      $this->db->where('Applicant_ID', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }

	public function update_GO_NO_GO_application_status($id, $data){
      $this->db->where('Applicant_ID', $id);
      return $this->db->update('internal_loan_application_status',$data);
    }
    /*-----------------------------------------Addeed by papiha on 07-03-2022--------------------------------------------------*/
	public function inser_user_details_more($data)
	{
		  $this->db->insert('CUSTOMER_MORE_DETAILS',$data);
          return $this->db->insert_id();
	}

   //===========================================added by priya 10-05-2022
    public function Save_pages_for_revert($data)
    {
        $this->db->insert('table_customer_revert_pages',$data);
    return $this->db->insert_id();
    }
  function kyc_doc_for_retailer_distributor(){
                                  $this->db->select('*');
                                  $this->db->from('DOCUMENTS_TYPE');  
                                  $this->db->where('DOC_MASTER_TYPE','KYC');      
                                  $this->db->order_by("ID", "desc");
                                  $query = $this->db->get();
                                  $response = $query->result();
                                  return $response;
                              }
  function buiss_doc_for_retailer_distributor(){
                                $this->db->select('*');
                                $this->db->from('DOCUMENTS_TYPE');  
                                $this->db->where('DOC_MASTER_TYPE','EMPLOYMENT PROOF');   
                                $this->db->where('INCOME_SRC','self employeed'); 
                                $this->db->order_by("ID", "desc");
                                $query = $this->db->get();
                                $response = $query->result();
                                return $response;
                            }
/*-------------------------------- addded by papiha on 24_08_2022-----------------------------------------------------------*/
 
}
?>