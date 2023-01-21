<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

    function login($data){
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('EMAIL', $data['EMAIL']);
          $this->db->or_where('MOBILE', $data['EMAIL']);
          $query = $this->db->get();
          $email_found = 0; $pass_found = 0; 

          if ( $query->num_rows() > 0 ){
             $email_found = 1;
          }

          $query = 
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('PASSWORD', md5($data['PASSWORD']));
          $this->db->where("(EMAIL = '".$data['EMAIL']."' OR MOBILE = '".$data['EMAIL']."')");
          
          $query = $this->db->get();

          if ( $query->num_rows() > 0 ){
             $pass_found = 1;
          }

          if ($pass_found == 0 && $email_found == 0) {
            return 10;
          }else if ($email_found == 0) {
            return 11;
          }else if ($pass_found == 0) {
            return 12;
          }else{
            $row = $query->row();
            $this->session->set_userData("ID", $row->UNIQUE_CODE);
            $this->session->set_userData("AGE", $row->AGE);
            $this->session->set_userData("ROLE", $row->ROLE);
			$this->session->set_userData("SITE", 'finserv');
            return $row->ROLE;
          } 
    }

    /*function getDsaList($q, $bank ,$city,$search_name)
    {

      if($q == 'all'){
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 2);          
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }
      else if ($q == 'bnk') {   
        $response = array();
        $query = $this->db->select('t1.*, t2.*')
         ->from('USER_DETAILS as t1')
         ->where('t1.ROLE', 2)
         ->like('t2.BANK_NAME', $bank , 'both')
         ->join('DSA_BANKS as t2', 't1.UNIQUE_CODE = t2.DSA_ID', 'RIGHT')
         ->order_by("t1.ID", "desc")
         ->get();
         $response = $query->result();
        return $response;
      } 
      else if($q == 'Complete')
     {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 2);
        // $this->db->where("PROFILE_PERCENTAGE",'100');
        $this->db->where("Profile_Status",'Complete');
                 
        $query = $this->db->get();
        $response = $query->result();
        return $response;
    
       }	
      else if($q == 'Incomplete')
      {
      $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 2); 
        //$this->db->where("Profile_Status",'');
        $this->db->where("Profile_Status",NULL); 
       //$this->db->where("PROFILE_PERCENTAGE!=",'100');
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }
       else if($q== 'search')
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 2);  
        $this->db->where("LN",$search_name);
        $this->db->or_where("FN",$search_name); 
        $this->db->order_by("ID", "desc");		   
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }
      else if($q == 'city')
      {
       if($city == '')
       {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 2);  
        $this->db->where('CITY', NULL); 
        $this->db->order_by("ID", "desc");		   
         $query = $this->db->get();
        $response = $query->result();
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
        return $response;
        }
      }
        
  }*/
 /* function getDsaList_branchManger($q, $bank ,$city,$id){

    if($q == 'all'){
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE', 2); 
      $this->db->where('BM_ID', $id);         
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    }else if ($q == 'bnk') {   

      $response = array();
      $query = $this->db->select('t1.*, t2.*')
       ->from('USER_DETAILS as t1')
       ->where('t1.ROLE', 2)
       ->where('BM_ID', $id)
       ->like('t2.BANK_NAME', $bank , 'both')
       ->join('DSA_BANKS as t2', 't1.UNIQUE_CODE = t2.DSA_ID', 'RIGHT')
       ->order_by("t1.ID", "desc")
       ->get();
       $response = $query->result();
      return $response;
    } 
    else if($q == 'Complete')
{
  $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE', 2);
      $this->db->where("PROFILE_PERCENTAGE",'100');
     // $this->db->where("Profile_Status",'Complete');
      $this->db->where('BM_ID', $id);           
      $query = $this->db->get();
      $response = $query->result();
      return $response;
  
}	
    else if($q == 'Incomplete')
{
    $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE', 2); 
      //  $this->db->where("PROFILE_PERCENTAGE",'');
       $this->db->where("Profile_Status",NULL); 
     // $this->db->where("PROFILE_PERCENTAGE!=",'100');
      $this->db->where('BM_ID', $id); 
      $query = $this->db->get();
      $response = $query->result();
      return $response;
}
else if($q == 'city'){
    if($city == '')
    {
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE', 2);  
      $this->db->where('CITY', NULL); 
      $this->db->where('BM_ID', $id); 
      $this->db->order_by("ID", "desc");		   
       $query = $this->db->get();
      $response = $query->result();
      return $response;
    }
    else
    {
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE', 2);  
      $this->db->where('CITY', $city); 
      $this->db->where('BM_ID', $id); 
      $this->db->order_by("ID", "desc");		   
       $query = $this->db->get();
      $response = $query->result();
      return $response;
    }
    }
    

    
}*/


/*------------------------------------added by papiha on 15-01-2022 filter rework by priya 26-03-2022-------------------------------------------*/
 function getRegional_Manager($q)
  {
     if($q == 'all'){
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 17);          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
     }
	 else if($q == 'Complete')
	 {
		  $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 17);   
		   $this->db->where("Profile_Status",'Complete');
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
	 }
	 else if($q == 'Incomplete')
	 {
		  $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 17);    
		   $this->db->where("Profile_Status",NULL); 
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
	 }
	 else
	 {
		  $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 17);          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
	 }

}




     //===================================code by priyanka for HR================
     function HR($q)
     {
        if($q == 'all'){
             $this->db->select('*');
             $this->db->from('USER_DETAILS');
             $this->db->where('ROLE', 9);          
             $this->db->order_by("ID", "desc");
             $query = $this->db->get();
             $response = $query->result();
             return $response;
        }
        else if($q == 'Complete')
        {
           $this->db->select('*');
           $this->db->from('USER_DETAILS');
           $this->db->where('ROLE', 9);  
           // $this->db->where("PROFILE_PERCENTAGE",'100');
           $this->db->where("Profile_Status",'Complete');
           $this->db->order_by("ID", "desc");
           $query = $this->db->get();
           $response = $query->result();
           return $response;
       
          }	
         else if($q == 'Incomplete')
         {
         $this->db->select('*');
           $this->db->from('USER_DETAILS');
           $this->db->where('ROLE', 9); 
          // $this->db->where("Profile_Status",'');
           $this->db->where("Profile_Status",NULL); 
           $this->db->order_by("ID", "desc");
          //$this->db->where("PROFILE_PERCENTAGE!=",'100');
           $query = $this->db->get();
           $response = $query->result();
           return $response;
         }
          else {
                $this->db->select('*');
             $this->db->from('USER_DETAILS');
             $this->db->where('ROLE', 9);          
             $this->db->order_by("ID", "desc");
             $query = $this->db->get();
             $response = $query->result();
             return $response;
         }
             
     }
 
     
     function getJobOppnings(){
       $this->db->select('*');
       $this->db->from('job_openings');        
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

    
	function getManagerList($q){

    if($q == 'all'){
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE', 7);          
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
       }
       else if($q == 'Complete')
       {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 7);     
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("Profile_Status",'Complete');
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
      
         }	
        else if($q == 'Incomplete')
        {
        $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 7);    
         // $this->db->where("Profile_Status",'');
          $this->db->where("Profile_Status",NULL); 
          $this->db->order_by("ID", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $response = $query->result();
          return $response;
        }
         else
        {
           $this->db->select('*');
		   $this->db->from('USER_DETAILS');
		   $this->db->where('ROLE', 7);          
           $this->db->order_by("ID", "desc");
           $query = $this->db->get();
           $response = $query->result();
           return $response;
        }
        
    }
    function get_Csr_user($q)
    {
       if($q == 'all'){
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 6);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
       }
       else if($q == 'Complete')
       {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 6);  
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("Profile_Status",'Complete');
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
      
         }	
        else if($q == 'Incomplete')
        {
        $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 6); 
         // $this->db->where("Profile_Status",'');
          $this->db->where("Profile_Status",NULL); 
          $this->db->order_by("ID", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $response = $query->result();
          return $response;
        }
         else         {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 6);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
        }
        
    }
    function getCsrCity(){
      $this->db->select('CITY');
  $this->db->where('ROLE', 6); 
  $this->db->distinct();
      $this->db->from('USER_DETAILS');        
      $query = $this->db->get();
      $response = $query->result();
      return $response;
  }

	function getCSRList(){

        
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 6);          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
        
    }
	function getOperations_user($q,$search_name)
	{
		 if($q == 'all'){
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 3);          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
		 }
     else if($q == 'Complete')
     {
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE', 3);
        // $this->db->where("PROFILE_PERCENTAGE",'100');
        $this->db->where("Profile_Status",'Complete');
                 
        $query = $this->db->get();
        $response = $query->result();
        return $response;
    
       }	
      else if($q == 'Incomplete')
      {
        $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 3);   
          $this->db->where("Profile_Status",NULL);       
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
      }
       else if($q== 'search')
      {
        $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 3); 
        $this->db->where("LN",$search_name);
        $this->db->or_where("FN",$search_name); 
        $this->db->order_by("ID", "desc");		   
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }
		  
	}
    //===================================code for credit manager================
	function getCredit_manager_user($q)
	{
		 if($q == 'all'){
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 8);          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
		 }
     else if($q == 'Complete')
     {
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',8);
        // $this->db->where("PROFILE_PERCENTAGE",'100');
        $this->db->where("Profile_Status",'Complete');
        $query = $this->db->get();
        $response = $query->result();
        return $response;
    
       }	
      else if($q == 'Incomplete')
      {
        $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE',8);   
          $this->db->where("Profile_Status",NULL);       
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
      }
       else 
      {
        $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 8);          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
        
      }
		  
	}

    function getDocTypeList(){
        $this->db->select('*');
        $this->db->from('DOCUMENTS_TYPE');        
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
    }

    function getBanks(){
        $this->db->select('*');
        $this->db->from('SYS_BANKS');        
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
    }

    function saveDocType($data){
        $this->db->insert('DOCUMENTS_TYPE',$data);
      return $this->db->insert_id();
    }

    function delete_doctype($arr){
      return $this->db->delete('DOCUMENTS_TYPE', $arr); 
    }

    function saveBank($data){
        $this->db->insert('SYS_BANKS',$data);
      return $this->db->insert_id();
    }
	function loan_type($data){
        $this->db->insert('loan_type',$data);
      return $this->db->insert_id();
    }

    function delete_bank($arr){
      return $this->db->delete('SYS_BANKS', $arr); 
    }
	 function delete_loan_type($arr){
      return $this->db->delete('loan_type', $arr); 
    }

    function strategic_partner($id, $data){
      $this->db->where('UNIQUE_CODE', $id);
      return $this->db->update('USER_DETAILS',$data);      
    }

     function getDashboardData(){
        $response = [];
        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 1"); 
        $cust_count = $query->row();
        $response['cust_count'] = $cust_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 2"); 
        $dsa_count = $query->row();
        $response['dsa_count'] = $dsa_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 7"); 
        $manager_count = $query->row();
        $response['manager_count'] = $manager_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 6"); 
        $csr_count = $query->row();
        $response['csr_count'] = $csr_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 4"); 
        $csr_count = $query->row();
        $response['connector_count'] = $csr_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 13"); 
        $csr_count = $query->row();
        $response['branch_manager_count'] = $csr_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 3"); 
        $csr_count = $query->row();
        $response['operations_user'] = $csr_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 9"); 
        $csr_count = $query->row();
        $response['HR_count'] = $csr_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 8"); 
        $csr_count = $query->row();
        $response['credit_user_count'] = $csr_count->count;
		
        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 16"); 
        $csr_count = $query->row();
        $response['area_manager_count'] = $csr_count->count;

			
        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 15"); 
        $csr_count = $query->row();
        $response['cluster_manager_count'] = $csr_count->count;

				
        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 18"); 
        $csr_count = $query->row();
        $response['legal_count'] = $csr_count->count; 

					
        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 14"); 
        $csr_count = $query->row();
        $response['RO_count'] = $csr_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 18"); 
        $csr_count = $query->row();
        $response['legal_count'] = $csr_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 19"); 
        $csr_count = $query->row();
        $response['technical_count'] = $csr_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM idccr_users"); 
        $csr_count = $query->row();
        $response['Idccr_count'] = $csr_count->count;
        /*------------------ added by nnnn -------------------*/
        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 24"); 
        $csr_count = $query->row();
        $response['FI_count'] = $csr_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 25"); 
        $csr_count = $query->row();
        $response['RCU_count'] = $csr_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 30"); 
        $csr_count = $query->row();
        $response['MIS'] = $csr_count->count;
        /*----------------------------------------------*/
		$query = $this->db->query("SELECT count(*) as count FROM credit_bureau"); 
        $csr_count = $query->row();
        $response['credit_bureau_count'] = $csr_count->count;

		$query = $this->db->query("SELECT count(*) as count FROM credit_score"); 
        $csr_count = $query->row();
        $response['internal_bureau_count'] = $csr_count->count;

		
		$query = $this->db->query("SELECT count(*) as count FROM combined_credit_bureau"); 
        $csr_count = $query->row();
        $response['idccr_bureau_count'] = $csr_count->count;

		$query = $this->db->query("SELECT count(*) as count FROM register"); 
        $csr_count = $query->row();
        $response['lead_count'] = $csr_count->count;


        $query = $this->db->query("SELECT count(*) as count FROM CUSTOMER_APPLIED_LOANS"); 
        $applied_loan_count = $query->row();
        $response['applied_loan_count'] = $applied_loan_count->count;

        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where PROFILE_PERCENTAGE < 100 and ROLE = 1"); 
        $pending_profile_count = $query->row();
        $response['pending_profile_count'] = $pending_profile_count->count;

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

                $query = $this->db->query("SELECT count(*) as count FROM sanction_letter_values");
        $issue_count= $query->row(); 
        $response['sanction_letter_values']=$issue_count->count;

         $query = $this->db->query("SELECT count(*) as count FROM first_level_sanction_details WHERE Recommendation_status_added_by='Cluster Credit Manager'  AND Recommendation_status='Recommended' OR  Recommendation_status_added_by='Admin'  AND Recommendation_status='Loan Recommendation Approved'");
        $issue_count= $query->row(); 
        $response['sanction_recommendations']=$issue_count->count;
    


        $query = $this->db->query("SELECT count(*) as count FROM help_enquiry");
        $issue_count= $query->row(); 
        $response['issue_count']=$issue_count->count;
    
        return $response;
    }
	function get_credit_buerau_price()
	{
		$this->db->select('price');
        $this->db->from('credit_buerau_price');
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->price;
	}
	function get_aadhar_esign_price()
	{
		$this->db->select('price');
        $this->db->from('aadhar_esign_price');
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->price;
	}
	function get_loan_application_price()
	{
		$this->db->select('price');
        $this->db->from('loan_application_price');
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->price;
	}
	function update_credit_buerau_price($data){
      $this->db->where('id', 1);
      return $this->db->update('credit_buerau_price',$data);      
    }
	function update_loan_application_fees($data){
      $this->db->where('id', 1);
      return $this->db->update('loan_application_price',$data);      
    }
	function update_aadhar_esign_price($data){
      $this->db->where('id', 1);
      return $this->db->update('aadhar_esign_price',$data);      
    }
	
	function get_credit_buerau_pull_chances()
	{
		$this->db->select('chance');
        $this->db->from('credit_buerau_pull_chances');
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->chance;
	}
	function get_aadhar_pull_chances()
	{
		$this->db->select('chance');
        $this->db->from('aadhar_pull_chances');
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->chance;
	}
	function update_credit_buerau_chances($data){
      $this->db->where('id', 1);
      return $this->db->update('credit_buerau_pull_chances',$data);      
    }
	function update_aadhar_esign_chances($data){
      $this->db->where('id', 1);
      return $this->db->update('aadhar_pull_chances',$data);      
    }
	function getPayments($filter,$date)
	{
		    $this->db->select('*');
			if ($date!='') {
				$this->db->like("created_at", $date, 'both');
			}
			if($filter=='refund')
			{
				
				$this->db->like("refund",'Refund Processed');
			}
			$q = $this->db->from('payment_details');
			if($filter=='Sucess')
			{
			 $this->db->distinct();
			
			 $this->db->like("score_success", 'success');
			}
			$this->db->join('credit_bureau', 'credit_bureau.Payment_id = payment_details.razorpay_payment_id');
			$this->db->order_by("payment_details.id", "desc");
      $this->db->limit(1000);
			$response = $q->get()->result();
			
			return $response;
	}
	function get_aadhar_esign_report($filter,$date)
	{
		    $this->db->select('*');
			if ($date!='') {
				$this->db->like("created_at", $date, 'both');
			}
			if($filter=='refund')
			{
				
				$this->db->like("refund",'Refund Processed');
			
			}
			$q = $this->db->from('payment_details');
			if($filter=='Sucess')
			{
			$this->db->distinct();
			
			$this->db->like("aadhar_esign.status", 'success');
			}
			
			   
			    
              				
				$this->db->join('aadhar_esign', 'aadhar_esign.Payment_id = payment_details.razorpay_payment_id');
				
				$this->db->order_by("payment_details.id", "desc");
			    $response = $q->get()->result();
			
			return $response;
	}
	public function get_loan_types(){
		$loan_type=array();
      $this->db->select('*');
      $this->db->from('loan_type');
	  foreach($this->db->get()->result() as $row)
	  {
		
		  array_push($loan_type,$row);
	  }
	 return $loan_type;
    }
	  public function delete_customer($id)
	  {
		  $this -> db -> where('ID', $id);
		  return $this -> db -> delete('USER_DETAILS');
    }
    


     function get_customer_applied_loan($q,$search_name)
     {
          if($q == 'all')
          {
             $response = array();
              $query = $this->db->select('t1.*, t2.*')
              ->from('CUSTOMER_APPLIED_LOANS as t2','USER_DETAILS as t1')
              ->join('USER_DETAILS as t1', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
              ->where('t2.LOAN_TYPE !=', NULL)
              ->order_by("t1.ID", "desc")
              ->get();
              $response = $query->result();
             return $response;	 
         
        }
         else if($q == 'business'){
              $response = array();
              $query = $this->db->select('t1.*, t2.*')
              ->from('CUSTOMER_APPLIED_LOANS as t2')
              ->where('t2.LOAN_TYPE','business')
              ->join('USER_DETAILS as t1', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
              ->order_by("t1.ID", "desc")
              ->get();
              $response = $query->result();
             return $response;	
         }
         else if($q == 'personal'){
              $response = array();
              $query = $this->db->select('t1.*, t2.*')
              ->from('CUSTOMER_APPLIED_LOANS as t2')
              ->where('t2.LOAN_TYPE','personal')
              ->join('USER_DETAILS as t1', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
              ->order_by("t1.ID", "desc")
              ->get();
              $response = $query->result();
             return $response;	
         }
         else if($q == 'credit'){
              $response = array();
              $query = $this->db->select('t1.*, t2.*')
              ->from('CUSTOMER_APPLIED_LOANS as t2')
              ->where('t2.LOAN_TYPE','credit')
              ->join('USER_DETAILS as t1', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
              ->order_by("t1.ID", "desc")
              ->get();
              $response = $query->result();
             return $response;	
         }
        else if($q == 'home'){
              $response = array();
              $query = $this->db->select('t1.*, t2.*')
              ->from('CUSTOMER_APPLIED_LOANS as t2')
              ->where('t2.LOAN_TYPE','home')
              ->join('USER_DETAILS as t1', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
              ->order_by("t1.ID", "desc")
              ->get();
              $response = $query->result();
             return $response;	
         }
         else if($q == 'lap'){
              $response = array();
              $query = $this->db->select('t1.*, t2.*')
              ->from('CUSTOMER_APPLIED_LOANS as t2')
              ->where('t2.LOAN_TYPE','lap')
              ->join('USER_DETAILS as t1', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
              ->order_by("t1.ID", "desc")
              ->get();
              $response = $query->result();
             return $response;	
         }
         else if($q=='search')
         {
          $response = array();
          $query = $this->db->select('t1.*, t2.*')
          ->from('CUSTOMER_APPLIED_LOANS as t2')
          ->join('USER_DETAILS as t1', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
          ->where('t1.FN',$search_name)
          ->or_where('t1.LN',$search_name)
          ->order_by("t1.ID", "desc")
          ->get();
          $response = $query->result();
         return $response;
         }
       
     }
     // code added by priyanka
     function getCustomersList($filter,$search_name, $filter_branch_name , $filter_Start_Date, $filter_End_Date){
      if($filter=='search')
      {

        if($search_name=='All')
        {
           $this->db->select('id,fname,lname,email,mobile,score_success,reatil_score,score,created_date');
          $this->db->from('combined_credit_bureau');        
          $this->db->order_by("id", "desc");
          $this->db->limit(10000);
          $query = $this->db->get();
          $response = $query->result();
          return $response;
        }
        else
        {
         $this->db->select('id,fname,lname,email,mobile,score_success,reatil_score,score,created_date');
        $this->db->from('combined_credit_bureau');  
        $this->db->where('IDCCR_user',$search_name);     
        $this->db->limit(10000);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
        }
      }
      else if( $filter_branch_name != '') 
      {

           if( $filter_branch_name == 'All') 
        {
           $this->db->select('id,fname,lname,email,mobile,score_success,reatil_score,score,created_date');
           $this->db->from('combined_credit_bureau'); 
           $this->db->limit(10000);
           $this->db->order_by("id", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;

            $response=array();
            $query=$this->db->select('t1.*,t2.*')
            ->from('combined_credit_bureau as t2')
            ->join('idccr_users as t1','t1.EMAIL=t2.IDCCR_user','RIGHT')
            ->order_by("t1.id","desc")
            ->get();
            $response=$qyery->result();
            return $response;
      }
      else
      {
           $this->db->select('t1.*,t2.*');
           $this->db->from('combined_credit_bureau as t2');
           $this->db->join('idccr_users as t1','t1.Email=t2.IDCCR_user','RIGHT');
           $this->db->where('t1.Branch_name', $filter_branch_name);
           $this->db->where('t2.created_date >=', $filter_Start_Date);
           $this->db->where('t2.created_date <=', $filter_End_Date);
           $this->db->order_by("t1.id","desc");
           $query = $this->db->get();
           $response = $query->result();
      //       $executedQuery = $this->db->last_query();
  //  print_r($executedQuery);
  // exit;
            return $response;
        }
      }
     
      else{
      $this->db->select('id,fname,lname,email,mobile,score_success,reatil_score,score,created_date');
      $this->db->from('combined_credit_bureau'); 
        $this->db->limit(10000);
      $this->db->order_by("id", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
      }
  }  
  
  
  public function get_credit_score($id)
	{
		  $this->db->select('*');
		  $this->db->from('combined_credit_bureau');
		  $this->db->where('id', $id);
		  $q = $this->db->get();
		  $row = $q->row();
		  return $row;
	}
  public function getCustomers_loan_application($filter,$date)
  {

    if($filter=="Accepted")
    {
      $response = array();
      $this->db->select('*');
      $this->db->where("cam_status", "Cam details complete");
       $this->db->where("loan_status","Accepted");
       if ($date!='') {
			  $this->db->like("CREATED_AT", $date, 'both');
		  }
		  $q=$this->db->from('USER_DETAILS');
		  $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
	  	$this->db->order_by("USER_DETAILS.ID", "desc");
      $response = $q->get()->result();
	    return $response;
    }
    else if($filter=="Rejected")
    {
      $response = array();
      $this->db->select('*');
      $this->db->where("cam_status", "Cam details complete");
      $this->db->where("loan_status","Rejected");
      if ($date!='') {
			  $this->db->like("CREATED_AT", $date, 'both');
		  }
		  $q=$this->db->from('USER_DETAILS');
		  $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
	  	$this->db->order_by("USER_DETAILS.ID", "desc");
      $response = $q->get()->result();
	    return $response;
    }
    else if($filter=="Progress")
    { 
      $response = array();
      $this->db->select('*');
      $this->db->where("cam_status", "Cam details complete");
      $this->db->where("loan_status","in_progress");
      if ($date!='') {
			  $this->db->like("CREATED_AT", $date, 'both');
		  }
		  $q=$this->db->from('USER_DETAILS');
		  $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
	  	$this->db->order_by("USER_DETAILS.ID", "desc");
      $response = $q->get()->result();
	    return $response;
    }
    else if($filter=="hold")
    { 
      $response = array();
      $this->db->select('*');
      $this->db->where("cam_status", "Cam details complete");
      $this->db->where("loan_status","hold");
      if ($date!='') {
			  $this->db->like("CREATED_AT", $date, 'both');
		  }
		  $q=$this->db->from('USER_DETAILS');
		  $this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
	  	$this->db->order_by("USER_DETAILS.ID", "desc");
      $response = $q->get()->result();
	    return $response;
    }
   else 
   {

    $response = array();
		$this->db->select('*');
		$this->db->where("cam_status", "Cam details complete");
    if ($date!='') {
			  $this->db->like("CREATED_AT", $date, 'both');
		  }
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
		$this->db->order_by("USER_DETAILS.ID", "desc");
    $response = $q->get()->result();
		return $response;
   }
    }
       
     //==================connectors
      //====================connectors
    function getConnector($q,$search_name)
    {
       if($q == 'all'){
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 4);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
       }
       else if($q == 'search'){
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 4);  
        $this->db->where("LN",$search_name);
        $this->db->or_where("FN",$search_name);        
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }
      else if($q == 'Complete')
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 4);   
        $this->db->where("Profile_Status",'Complete');      
       // $this->db->where("PROFILE_PERCENTAGE",'100'); 
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }
      else if($q == 'Incomplete')
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 4);   
        //$this->db->where("Profile_Status",'');
        $this->db->where("Profile_Status",NULL);
      //$this->db->where("PROFILE_PERCENTAGE!=",'100');
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }
      else
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 4);          
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;

      }
     
        
    }
    /*function getConnector_branchManger($q,$id)
    {
       if($q == 'all'){
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 4); 
		 
	       if($this->session->userdata('USER_TYPE') == 'branch_manager')
			{
			   $where = "BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4";
			   $this->db->where($where);
			}
			else if($this->session->userdata('USER_TYPE') == 'DSA')
			{
			  $where = "DSA_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4";	
			  $this->db->where($where);
			   
			} 			
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
       }
       else if($q == 'Complete')
       {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 4); 
	  	$this->db->where("Profile_Status",'Complete');
        if($this->session->userdata('USER_TYPE') == 'branch_manager')
			{
			   $where = "BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4 AND Profile_Status='Complete'";
			   $this->db->where($where);
			}
			else if($this->session->userdata('USER_TYPE') == 'DSA')
			{
			  $where = "DSA_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4 AND Profile_Status='Complete'";	
			  $this->db->where($where);
			   
			} 	
          
                   
          $query = $this->db->get();
          $response = $query->result();
          return $response;
      
         }
         else if($q == 'Incomplete')
         {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 4); 
		  $this->db->where("Profile_Status",NULL);
           if($this->session->userdata('USER_TYPE') == 'branch_manager')
			{
			   $where = "BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4 AND Profile_Status=".NULL;
			   $this->db->where($where);
			}
			else if($this->session->userdata('USER_TYPE') == 'DSA')
			{
			  $where = "DSA_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4 AND Profile_Status=".NULL;	
			  $this->db->where($where);
			   
			} 	
            
                     
            $query = $this->db->get();
            $response = $query->result();
            return $response;
        
           }
           
        
    }
   */

    function getConnector_RelationshipOfficer($q,$id)
    {
       if($q == 'all'){
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 4);     
            $this->db->where('RO_ID', $id);     			
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
       }
       
        
    }
    function getBranchManagers($q,$search_name)
    {
       if($q == 'all'){
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 13);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
       }
       else if($q == 'Complete')
       {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 13);
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("Profile_Status",'Complete');
                   
          $query = $this->db->get();
          $response = $query->result();
          return $response;
      
         }	
        else if($q == 'Incomplete')
        {
        $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 13); 
         // $this->db->where("Profile_Status",'');
          $this->db->where("Profile_Status",NULL); 
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $response = $query->result();
          return $response;
        }
         else if($q== 'search')
        {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 13); 
          $this->db->where("LN",$search_name);
          $this->db->or_where("FN",$search_name); 
          $this->db->order_by("ID", "desc");		   
          $query = $this->db->get();
          $response = $query->result();
          return $response;
        }
        
    }

    	
	// functions for IDCCR user
  function get_idccr_pull_chances()
	{
		$this->db->select('Chances');
    $this->db->from('idccr_pull_chances');
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->Chances;
	}

  function update_idccr_pull_chnaces($data){
    $this->db->where('id', 1);
    return $this->db->update('idccr_pull_chances',$data);      
  }

  // public function check_idccr_user_mobile($mobile){
  //   $response = array();
  //   $this->db->select('*');
  //   $this->db->where("mobile", $mobile);
  //    $q = $this->db->from('idccr_users');
  //   $query = $q->get();
  //   if ( $query->num_rows() > 0 ){
  //          return 1;
  //    }else return 0;    
  // }
  
  public function check_idccr_user_email($email){
    $response = array();
    $this->db->select('*');
    $this->db->where("Email", $email);
    $q = $this->db->from('idccr_users');
    $query = $q->get();
    if ( $query->num_rows() > 0 ){
           return 1;
     }else return 0;      
  }
  public function check_idccr_user_pass($pass){
    $response = array();
    $this->db->select('*');
    $this->db->where("Password", $pass);
    $q = $this->db->from('idccr_users');
    $query = $q->get();
    if ( $query->num_rows() > 0 ){
           return 1;
     }else return 0;      
  }

  function save_idccr_users($data){
    $this->db->insert('idccr_users',$data);
  return $this->db->insert_id();
}
function get_idccr_users(){
      $response = array();
      $this->db->select('*');
      $q = $this->db->from('idccr_users');
      $this->db->order_by("id", "desc");
      $response = $q->get()->result();
      return $response;
   }

   function Update_idccr_users($data,$user_ID){
    $this->db->where('id', $user_ID);
    return $this->db->update('idccr_users',$data);      
  }

  public function Delete_idccr_user($id)
	{
		$this -> db -> where('id', $id);
		return $this -> db -> delete('idccr_users');
     }


     
    function Idccr_user_login($data){
      $this->db->select('*');
      $this->db->from('idccr_users');
      $this->db->where('Email', $data['EMAIL']);
      $query = $this->db->get();
      $email_found = 0; $pass_found = 0; 

      if ( $query->num_rows() > 0 ){
         $email_found = 1;
      }

      $query = 
      $this->db->select('*');
      $this->db->from('idccr_users');
      $this->db->where('Password',$data['PASSWORD']);
      $this->db->where("(Email = '".$data['EMAIL']."' )");
      
      $query = $this->db->get();

      if ( $query->num_rows() > 0 ){
         $pass_found = 1;
      }

      if ($pass_found == 0 && $email_found == 0) {
        return 10;
      }else if ($email_found == 0) {
        return 11;
      }else if ($pass_found == 0) {
        return 12;
      }else{
        $row = $query->row();
        return $row->id;
      } 
    }
    public function  Idccr_user_details($id)
    {
     
            $this->db->select('*');
            $this->db->from('idccr_users');
            $this->db->where('id',$id);          
             $query = $this->db->get();
             $row = $query->row();
            return $row;
             
    }

    function get_idccr_user_pull_chances($email)
	{
		$this->db->select('Balance');
    $this->db->from('idccr_users');
    $this->db->where('Email',$email);
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->Balance;
	}
  function get_idccr_user_pull_counts($email)
	{
		$this->db->select('Count');
    $this->db->from('idccr_users');
    $this->db->where('Email',$email);
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->Count;
	}

  public function update_idccr_user_count($data)
	{
		
	  $this->db->where('Email', $data['Email']);
      return $this->db->update('idccr_users',$data);
	}
  function getIdccrCustomersList($user_email){
    $this->db->select('*');
    $this->db->from('combined_credit_bureau');   
    $this->db->where('IDCCR_user',$user_email);        
    $this->db->order_by("id", "desc");
    $query = $this->db->get();
    $response = $query->result();
    return $response;
}  
public function  Idccr_report_data($data)
{
 
        $this->db->select('*');
        $this->db->from('combined_credit_bureau');
        $this->db->where('fname', $data['fname']);
        $this->db->where('lname', $data['lname']);
        $this->db->where('email', $data['email']);
        $this->db->where('mobile', $data['mobile']);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        $row = $query->row();
        return $row;
         
}
	
//--------------------------------- added by papiha
function getDsaList_userwise($q, $bank ,$city,$id){

  if($q == 'all')
  {
    $this->db->select('*');
    $this->db->from('USER_DETAILS');
    $this->db->where('ROLE', 2); 
       if($this->session->userdata('USER_TYPE') == 'branch_manager')
        {
           $where = "BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";
		   $this->db->where($where);
        }
        else if($this->session->userdata('USER_TYPE') == 'Relationship_Officer')
        {
		  $where = "RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";	
          $this->db->where($where);
		   
        }
    $this->db->order_by("ID", "desc");
    $query = $this->db->get();
    $response = $query->result();
    return $response;
	
  }
  else if ($q == 'bnk') 
  {   
     $response = array();
     $this->db->select('t1.*, t2.*');
     $this->db->from('USER_DETAILS as t1');
     $this->db->where('t1.ROLE', 2);
      $this->db->where('t2.BANK_NAME', $bank);
      $this->db->join('DSA_BANKS as t2', 't1.UNIQUE_CODE = t2.DSA_ID');
      $this->db->order_by("t1.ID", "desc");
	   if($this->session->userdata('USER_TYPE') == 'branch_manager')
      {
		$where = "BM_ID='".$id."' OR Refer_By='".$id."'AND t1.ROLE=2 AND t2.BANK_NAME='".$bank."'";
		$this->db->where($where);
	  }
	  else if($this->session->userdata('USER_TYPE') == 'Relationship_Officer')
      {
		  $where = "RO_ID='".$id."' OR Refer_By='".$id."'AND t1.ROLE=2 AND t2.BANK_NAME='".$bank."'" ;
		  $this->db->where($where);
	  }
      $query = $this->db->get();
      $response = $query->result();
	  //echo $this->db->last_query();
	  //exit;
      return $response;
	  
  } 
  else if($q == 'Complete')
  {
    $this->db->select('*');
    $this->db->from('USER_DETAILS');
	$this->db->where("Profile_Status",'Complete');
    $this->db->where('ROLE',2);
	if($this->session->userdata('USER_TYPE') == 'branch_manager')
      {
		$where = "BM_ID='".$id."' OR Refer_By='".$id."'AND ROLE=2 AND Profile_Status='Complete'";
		$this->db->where($where);
	  }
	   else if($this->session->userdata('USER_TYPE') == 'Relationship_Officer')
      {
		  $where = "RO_ID='".$id."' OR Refer_By='".$id."'AND ROLE=2 AND Profile_Status='Complete'";
		  $this->db->where($where);
	  }
	$query = $this->db->get();
    $response = $query->result();
    return $response;

  }	
  else if($q == 'Incomplete')
  {
   
	
    $this->db->select('*');
    $this->db->from('USER_DETAILS');
	$this->db->where("Profile_Status",NULL);
    $this->db->where('ROLE',2);
	if($this->session->userdata('USER_TYPE') == 'branch_manager')
      {
		$where = "BM_ID='".$id."' OR Refer_By='".$id."'AND ROLE=2 AND Profile_Status=".NULL;
		$this->db->where($where);
	  }
	   else if($this->session->userdata('USER_TYPE') == 'Relationship_Officer')
      {
		  $where = "RO_ID='".$id."' OR Refer_By='".$id."'AND ROLE=2 AND Profile_Status=".NULL;
		  $this->db->where($where);
	  }
	$query = $this->db->get();
    $response = $query->result();
    return $response;
  }
  
  
  

  
}


/*function getRelationOfficer($q,$id)
{
      if($q == 'all')
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        if($this->session->userdata('USER_TYPE') == 'branch_manager')
         {
              $this->db->where('BM_ID',$id); 
         }
        $this->db->where('ROLE', 14);          
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }
    
      else if($q == 'Complete')
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        if($this->session->userdata('USER_TYPE') == 'branch_manager')
         {
              $this->db->where('BM_ID',$id); 
         }
        $this->db->where('ROLE', 14); 
        $this->db->where("Profile_Status",'Complete');      
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }
      else if($q == 'Incomplete')
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        if($this->session->userdata('USER_TYPE') == 'branch_manager')
         {
              $this->db->where('BM_ID',$id); 
         }
        $this->db->where('ROLE', 14); 
        $this->db->where("Profile_Status",NULL);    
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }
      else
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        if($this->session->userdata('USER_TYPE') == 'branch_manager')
         {
              $this->db->where('BM_ID',$id); 
         }
        $this->db->where('ROLE', 14);          
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }
    
}*/


/*function getConnector_Relationship_Officer($q,$id)
{
   if($q == 'all'){
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 4);     
        $this->db->where('RO_ID', $id);     			
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
   }
   
    
}*/
function getRelationOfficer_branchManger($q,$id)
    {
       if($q == 'all'){
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 14);     
            $this->db->where('BM_ID', $id);     			
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
       }
       else if($q == 'Complete')
       {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 14);     
            $this->db->where('BM_ID', $id); 
            $this->db->where("Profile_Status",'Complete');
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
       }
       else if($q == 'Incomplete')
       {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 14);     
            $this->db->where('BM_ID', $id);    
            $this->db->where("Profile_Status",NULL);
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
       }
       else
       {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 14);     
            $this->db->where('BM_ID', $id);     			
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
       }
       
        
    }
 //===========================added by papiha on 09_12_2021===============================================
 function get_Lead_From_Connector_for_BM($id)
 {
       $this->db->select('*');
         $this->db->from('USER_DETAILS');
         $this->db->where('ROLE', 4); 
         $this->db->where('BM_ID',$id);   
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $response = $query->result();
         return $response;
 }
 function get_Lead_From_DSA_for_BM($id)
 {
       $this->db->select('*');
         $this->db->from('USER_DETAILS');
         $this->db->where('ROLE', 2); 
         $this->db->where('BM_ID',$id);   
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $response = $query->result();
         return $response;
 }
 function get_Lead_From_RO_for_BM($id)
 {
       $this->db->select('*');
         $this->db->from('USER_DETAILS');
         $this->db->where('ROLE', 14); 
         $this->db->where('BM_ID',$id);   
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $response = $query->result();
         return $response;
 }
 function get_lead_For_Assign_from_connector($user_id)
 {
   $this->db->select('*');
     $this->db->from('register');
     $this->db->where('Lead_Assign_To','0'); 
	 $where = "CONNECTOR_ID='".$user_id."' OR Refer_By='".$user_id."' AND Lead_Assign_To='0'";
	 $this->db->where($where);
     $this->db->order_by("ID", "desc");
     $query = $this->db->get();
     $response = $query->result(); 
     return $response;
 }
 function get_lead_For_Assign_from_DSA($user_id)
 {
   $this->db->select('*');
     $this->db->from('register');
     $this->db->where('Lead_Assign_To','0'); 
	 $where = "DSA_ID='".$user_id."' OR Refer_By='".$user_id."' AND Lead_Assign_To='0'";
	 $this->db->where($where);
     $this->db->order_by("ID", "desc");
     $query = $this->db->get();
     $response = $query->result(); 
     return $response;
 }
 function get_lead_For_Assign_from_RO($user_id)
 {
   $this->db->select('*');
     $this->db->from('register');
      
     $this->db->where('Lead_Assign_To','0'); 
	 $where = "RO_ID='".$user_id."' OR Refer_By='".$user_id."' AND Lead_Assign_To='0'";
	 $this->db->where($where);
     $this->db->order_by("ID", "desc");
     $query = $this->db->get();
     $response = $query->result(); 
     return $response;
 }
 function Assign_Lead($Lead_Assign_TO_Id,$data)
 {
   $this->db->where('id', $Lead_Assign_TO_Id);
     return $this->db->update('register',$data);
 }

 //==========================added by priyanka 13-12-2021
function get_JobOpenings(){

     
  $this->db->select('*');
  $this->db->from('job_openings');
  $this->db->order_by("id", "desc");
  $query = $this->db->get();
  $response = $query->result();
  return $response;

}

//=============================added by priyanka 17-12-2021
public function get_internal_bureau()
{
          // $this->db->select('*');
          // $this->db->from('credit_score'); 
          // $this->db->join('USER_DETAILS','USER_DETAILS.UNIQUE_CODE = credit_score.customer_id');       
          // $this->db->order_by("USER_DETAILS.ID", "desc");
          // $query = $this->db->get();
          // $response = $query->result();
          // return $response;
          $this->db->select('*');
          $this->db->from('credit_score'); 
          $this->db->order_by("id", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
}
/*----------------------------Added by papiha 0n 18_12_2021--------------------------------------------------*/
function getBrachmanager_for_select()
{

   
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE', 13);          
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    
   }
   /*function getDsa_for_select_user($User_id)
   {
         $user_type= $this->session->userdata("USER_TYPE");
      
         $this->db->select('*');
         $this->db->from('USER_DETAILS');
         $this->db->where('ROLE',2);   
     if($user_type=='branch_manager')
     {
        $where = "BM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=2";
         $this->db->where($where);
     }
     else if($user_type=='Relationship_Officer')
     {
         $where = "RO_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=2";
         $this->db->where($where);
     }
	  else if($user_type=='Cluster_Manager')
     {
        $where = "CM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=2";
         $this->db->where($where);
     }
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $response = $query->result();
         return $response;
       
    }
   
   
   */
   
   
    /* function getRM_for_select_user($User_id)
    {
          $user_type= $this->session->userdata("USER_TYPE");
       
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE',14);   
        if($user_type=='branch_manager')
        {
            $where = "BM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=14";
             $this->db->where($where);
           }
         if($user_type=='Cluster_Manager')
        {
            $where = "CM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=14";
             $this->db->where($where);
           }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
        
       }
*/
       function get_customer_user_DSA($User_id)
{
      $user_type= $this->session->userdata("USER_TYPE");
   
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
    
      $this->db->where('ROLE',1);  
      $this->db->where('DSA_ID',$User_id); 
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
      //print_r($response);
      
     return $response;
    
   }
   function get_customer_user_RO($User_id)
   {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',1);  
        $where = "RO_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=1";
        $this->db->where($where); 
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
   }
 //==========================added by priyanka 27-12-2021=====================================
 public function getRelationOfficer_list($s)
 {
	 if($s=='all')
	 {
	    $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 14); 
        $this->db->order_by("ID","desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
	 }
	 else if($s=='Complete')
	 {
	    $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 14); 
		  $this->db->where("Profile_Status",'Complete');
        $this->db->order_by("ID","desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
	 }
	  else if($s=='Incomplete')
	 {
	    $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 14); 
		  $this->db->where("Profile_Status",NULL);
        $this->db->order_by("ID","desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
	 }
	else
	 {
	    $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 14); 
        $this->db->order_by("ID","desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
	 }

 }
  /*-----------------Added byb papiha on 01-01-20211-----------------------------------------------------------*/
  function get_lead_details($id)
  {
     $this->db->select('*');
         $this->db->from('register');
     $this->db->where('id',$id);
     $this->db->order_by("id", "desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
     
  }
   /*------------------------------------added by papiha on 10-01-2022-------------------------------------------*/
   function getCluster_Manager($q)
   {
      if($q == 'all'){
           $this->db->select('*');
           $this->db->from('USER_DETAILS');
           $this->db->where('ROLE', 15);          
           $this->db->order_by("ID", "desc");
           $query = $this->db->get();
           $response = $query->result();
           return $response;
      }
      else if($q == 'Complete')
      {
           $this->db->select('*');
           $this->db->from('USER_DETAILS');
           $this->db->where('ROLE', 15);        
           $this->db->where("Profile_Status",'Complete');
           $this->db->order_by("ID", "desc");
           $query = $this->db->get();
           $response = $query->result();
           return $response;
      }
      else if($q == 'Incomplete')
      {
           $this->db->select('*');
           $this->db->from('USER_DETAILS');
           $this->db->where('ROLE', 15); 
           $this->db->where("Profile_Status",NULL); 
           $this->db->order_by("ID", "desc");
           $query = $this->db->get();
           $response = $query->result();
           return $response;
      }
   }
   /*-------------------------------Added by papiha on 13_01_2022-----------------------------------------*/
	function getBM_for_select_user($User_id)
	{
		  $user_type= $this->session->userdata("USER_TYPE");
	   
		  $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('ROLE',13);   
	      $where = "CM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=13";
          $this->db->where($where);
		  $this->db->order_by("ID", "desc");
		  $query = $this->db->get();
		  $response = $query->result();
		  return $response;
		
	   }
	function get_customer_user_BM($User_id)
    {
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',1);  
      $where = "USER_DETAILS.BM_ID='".$User_id."' OR USER_DETAILS.Refer_By='".$User_id."' AND ROLE=1";
      $this->db->where($where);
     // $this->db->join('internal_loan_application_status','internal_loan_application_status.DSA_ID=USER_DETAILS.DSA_ID');
      $this->db->order_by("USER_DETAILS.ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
    //  $str = $this->db->last_query();
      //print_r($str);
      //exit;
      return $response;
    }
    /*------------------------------------added by papiha on 15-01-2022 filter rework by priya 26-03-2022-------------------------------------------*/
 function getArea_Manager($q)
  {
     if($q == 'all'){
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 16);          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
     }
	 else if($q == 'Complete')
	 {
		  $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 16);   
		   $this->db->where("Profile_Status",'Complete');
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
	 }
	 else if($q == 'Incomplete')
	 {
		  $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 16);    
		   $this->db->where("Profile_Status",NULL); 
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
	 }
	 else
	 {
		  $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 16);          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
	 }

}
/*----------------------------------------------Addede by papiha on 28_01_2022-------------------------------------*/
/*function get_Connector_user_BM($User_id)
    {
	
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',4); 
      if($this->session->userdata('USER_TYPE')=='branch_manager')
	  {		  
      $where = "BM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=4";
	  }
	  else if($this->session->userdata('USER_TYPE')=='Relationship_Officer')
	  {
		  $where = "RO_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=4";
	  }
      $this->db->where($where);
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    }*/
/*--------------------------------------Added by papiha 24_01_2022-------------------------------------------*/
function  getcooperator_Banks()
{
  
        $this->db->select('*');
        $this->db->from('cooperator');
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
   
}
function  getcooperator_Loan_type($bank_id)
{
  
        $this->db->select('*');
        $this->db->from('cooperator_loan_type');
        $this->db->where('bank_id',$bank_id); 
        $this->db->order_by("id", "desc");
       
        $query = $this->db->get();
        $response = $query->result();
        return $response;
   
}
function  get_rate_of_intrest($bank_id,$loan_type)
{
        
        $this->db->select('rate_of_intrest');
        $this->db->from('cooperator_loan_type');
  $this->db->where('bank_id',$bank_id); 
        $this->db->where('loan_type',$loan_type); 
        $query = $this->db->get();
        $row = $query->row();
        return $row->rate_of_intrest;
   
}

function  get_Loan_disbured_customers($bank_id,$loan_type)
{
       
  
        $this->db->select('*');
        $this->db->from('loan_disburst_details');
       $this->db->where('Name_Of_Bank',$bank_id); 
       if($loan_type!='All')
       {
        $this->db->where('Loan_Type',$loan_type); 
       }
        $query = $this->db->get();
        $response = $query->result();
         //echo $this->db->last_query(); 
  //exit;
        return  $response;
      // print_r($response);
      // exit;
   
}
/*function get_Connector_user_BM($User_id)
{
  $this->db->select('*');
  $this->db->from('USER_DETAILS');
  $this->db->where('ROLE',4);  
  $where = "BM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=1";
  $this->db->where($where);
  $this->db->order_by("ID", "desc");
  $query = $this->db->get();
  $response = $query->result();
  return $response;
}*/
function get_insurance_amount($bank_id,$loan_type)
{
        
        $this->db->select('Processing_Fees,Insurance_Amount');
        $this->db->from('cooperator_loan_type');
       $this->db->where('bank_id',$bank_id); 
        $this->db->where('loan_type',$loan_type);
        $query = $this->db->get();
        $row = $query->row();
        return $row;
   
}
function  get_Loan_disbured_customers_one($bank_id,$loan_type,$start_date,$end_date)
{
  
        $this->db->select('*');
        $this->db->from('loan_disburst_details');
        $this->db->where('Name_Of_Bank',$bank_id); 
        if($loan_type!='All')
        {
        $this->db->where('Loan_Type',$loan_type);
        }
        $this->db->where('EMI_Start_Date >=', $start_date);
        $this->db->where('EMI_Start_Date <=', $end_date);			
        $query = $this->db->get();
        $response = $query->result();
  //echo $this->db->last_query(); 
  //exit;
       return  $response;
   
}

/*--------------------------------------Added by papiha on 01_02_2022-------------------------------------*/
function get_corporate_Banks()
{
      $this->db->select('*');
      $this->db->from('cooperator');        
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
     
  }
/*function  get_corporate_Banks_by_id($id)
{
      $this->db->select('*');
      $this->db->from('cooperator'); 
      $this->db->where('id',$id);  		
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $row = $query->row();
      return $row->Bank_name;
     
  }*/
 function save_corporate_Bank($data){
      $this->db->insert('cooperator',$data);
    return $this->db->insert_id();
  }

  function delete_corporate_bank($arr){
    return $this->db->delete('cooperator', $arr); 
  }
function save_corporate_Bank_details($data){
      
    $this->db->insert('cooperator_loan_type',$data);
    return $this->db->insert_id();	  
  }

function corporate_bank_details($id){
    
      $this->db->select('*');
      $this->db->from('cooperator_loan_type'); 
  $this->db->where('bank_id',$id); 
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;	  
     
  }
function Update_bank_details($data,$id)
{
  $this->db->where('id', $id);
  return $this->db->update('cooperator_loan_type',$data);      
  }
  /*-----------------------------Added by papiha on 08_02_2022--------------------------------------------*/
  function update_lead_status($data,$id)
	  {
		  
		   $this->db->where('UNIQUE_CODE', $id);
          return $this->db->update('USER_DETAILS',$data);      
  }
  /*------------------------------Added by papiha on 09_02_2022-----------------------------------------------*/
  function get_sum_lead_staus($city)
  {
	 /* $this->db->select_sum('Lead_Status') as total;
	  $this->db->from('Lead_Status'); 
	  $this->db->where('ROLE',14);
      $this->db->where('Location',$city);	  
      $query = $this->db->get();
      return $query->total;*/
	 $data =$this->db
     ->query("Select SUM(Lead_Status) as total from USER_DETAILS  where Location='$city'")
     ->row_array();
	 return $data['total'];
  }
  function Get_notifications($user_id)
  {
	   $this->db->select('*');
		$this->db->from('notifications');
		$this->db->where('user_id',$user_id);
		$this->db->where('status','unseen');
		$query = $this->db->get();
		$results = $query->result();
		return $results;
  }
  public function change_notification_satus($user_id,$data)
  {
	      
		$this->db->where('user_id', $user_id);
		return $this->db->delete('notifications');  
  }
  public function insert_notification($data)
  {
	  $this->db->insert('notifications',$data);
      return $this->db->insert_id();
  }
   /*------------------------------------------Added by papiha on  12_02_2022----------------------------------*/
  /* function get_Master_Cities()
   {
      $this->db->select('*');
      $this->db->from('city_master');        
      $this->db->order_by("city_id", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
     
   }*/
  function save_master_city($data)
  {
      $this->db->insert('city_master',$data);
    return $this->db->insert_id();
  }
  function save_branch_location_master($data)
  {
      
    $this->db->insert('branch_location_master',$data);
    return $this->db->insert_id();
    	  
  }
  function delete_city_master($arr){
     return $this->db->delete('city_master', $arr); 
    
  }
  function delete_branch_master($arr){
    return $this->db->delete('branch_location_master', $arr); 
    
 }
   function get_Branches($city_id){
      $this->db->select('*');
      $this->db->from('branch_location_master');        
      $this->db->where('city_id',$city_id);
      $query = $this->db->get();
      $response = $query->result();
     
    return $response;
  }
 /*----------------------------------- Added by sonal on 24-02-2022------------------------------------------------------*/
    function getDashboardData3($id){
      $response = [];
    
     
      
      
      
      $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 2 AND RO_ID = '".$id."' OR Refer_By='".$id."' AND ROLE = 2"); 
      $dsa_count = $query->row();
      $response['dsa_count'] = $dsa_count->count;
      


      $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 4 AND RO_ID = '".$id."' OR Refer_By='".$id."' AND ROLE = 4"); 
      $conn_count = $query->row();
      $response['conn_count'] = $conn_count->count;

      /*$query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 1 AND RO_ID = '".$id."' OR Refer_By='".$id."' AND ROLE = 1"); 
      $cust_count = $query->row();
      $response['cust_count'] = $cust_count->count;*/
      $this->db->select('count(*) as count');
      $this->db->from('USER_DETAILS');
      $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $where = "ROLE=1 AND RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=1";
      $this->db->where($where);
      $query = $this->db->get();
      $res = $query->row();
      $response['cust_count']= $res->count;


      return $response;
     }

     function getDashboardData4($id){
  $response = [];
 
  $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS  where ROLE = 14 AND BM_ID= '".$id."'"); 
  $RO_count = $query->row();
  $response['RO_count'] = $RO_count->count;

  $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 1 AND BM_ID = '".$id."' OR Refer_By='".$id."' AND ROLE = 1"); 
  $cust_count = $query->row();
  $response['cust_count'] = $cust_count->count;

  
  $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 2 AND BM_ID = '".$id."' OR Refer_By='".$id."' AND ROLE = 2"); 
  $dsa_count = $query->row();
  $response['dsa_count'] = $dsa_count->count;

 

  $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 4 AND BM_ID = '".$id."' OR Refer_By='".$id."' AND ROLE = 4"); 
  $conn_count = $query->row();
  $response['conn_count'] = $conn_count->count;

  return $response;
 
}
/*------------------------------------ Added by papiha on 25_02_2022 -------------------------------------------------------------*/
function getConnector_branchManger($q,$id)
{
   if($q == 'all')
   {
     $Combine_Connector=array();
     if($this->session->userdata('USER_TYPE') == 'branch_manager')
      {
       
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 4); 
        $where = "BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4";
        $this->db->where($where);
        $query = $this->db->get();
        $Connector1 = $query->result();
        $array = json_decode(json_encode($Connector1), true);
        //$Combine_Connector=$Combine_Connector.push($array);
        foreach($array as $user)
        {
         array_push($Combine_Connector,$user);
        }
      
        $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 14); 
            $where = "BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=14";
            $this->db->where($where);
            $query = $this->db->get();
            $response = $query->result();
            foreach($response As $RO)
          {
           
        $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 4); 
            $where = "RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=4";
            $this->db->where($where);
            $query = $this->db->get();
            $Connector2 = $query->result();
            $array1 = json_decode(json_encode($Connector2), true);
             //$Combine_Connector=$Combine_Connector.push($array);
            foreach($array1 as $user1)
            {
            array_push($Combine_Connector,$user1);
            }
           
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 2); 
            $where = "RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
            $this->db->where($where);
            $query = $this->db->get();
            $response1 = $query->result();
            foreach($response1 As $DSA)
            {
            
              $this->db->select('*');
              $this->db->from('USER_DETAILS');
              $this->db->where('ROLE', 4); 
              $where = "DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
              $this->db->where($where);
              $query = $this->db->get();
              $Connector3= $query->result();
              
              $array2 = json_decode(json_encode($Connector3), true);
                  //$Combine_Connector=$Combine_Connector.push($array2);
              foreach($array2 as $user2)
              {
              array_push($Combine_Connector,$user2);
              }
            }
          } 
          /*echo'<pre>';
          print_r($Combine_Connector);
          exit;*/
       return $Combine_Connector;
      }

  
    }
  else if($q == 'Complete')
    {
        $Combine_Connector=array();
        if($this->session->userdata('USER_TYPE') == 'branch_manager')
        {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 4); 
            $this->db->where("Profile_Status",'Complete');
            $where = "BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4 AND Profile_Status='Complete'";
            $this->db->where($where);
            $query = $this->db->get();
            $Connector1 = $query->result();
            $array = json_decode(json_encode($Connector1), true);
            //$Combine_Connector=$Combine_Connector.push($array);
            foreach($array as $user)
            {
            array_push($Combine_Connector,$user);
            }
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 14); 
            $where = "BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=14";
            $this->db->where($where);
            $query = $this->db->get();
            $response = $query->result();
            foreach($response As $RO)
            {
                $this->db->select('*');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE', 4); 
                $this->db->where("Profile_Status",'Complete');
                $where = "RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=4 AND Profile_Status='Complete'";
                $this->db->where($where);
                $query = $this->db->get();
                $Connector2 = $query->result();
                $array1 = json_decode(json_encode($Connector2), true);
                foreach($array1 as $user1)
                {
                array_push($Combine_Connector,$user1);
                }
                $this->db->select('*');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE', 2); 
                $where = "RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
                $this->db->where($where);
                $query = $this->db->get();
                $response1 = $query->result();
              foreach($response1 As $DSA)
              {
                $this->db->select('*');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE', 4); 
                $this->db->where("Profile_Status",'Complete');
                $where = "DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4 AND Profile_Status='Complete'";
                $this->db->where($where);
                $query = $this->db->get();
                $Connector3= $query->result();
                
                $array2 = json_decode(json_encode($Connector3), true);
                    //$Combine_Connector=$Combine_Connector.push($array2);
                foreach($array2 as $user2)
                {
                array_push($Combine_Connector,$user2);
                }
              }
            } 
            /*echo'<pre>';
            print_r($Combine_Connector);
            exit;*/
           return $Combine_Connector;
        }
    }
  else if($q == 'Incomplete')
     {
        $Combine_Connector=array();
        if($this->session->userdata('USER_TYPE') == 'branch_manager')
        {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 4); 
            $this->db->where("Profile_Status",NULL);
            $where = "BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4 AND Profile_Status=".NULL;
            $this->db->where($where);
            $query = $this->db->get();
            $Connector1 = $query->result();
            $array = json_decode(json_encode($Connector1), true);
            //$Combine_Connector=$Combine_Connector.push($array);
            foreach($array as $user)
            {
            array_push($Combine_Connector,$user);
            }
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 14); 
            $where = "BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=14";
            $this->db->where($where);
            $query = $this->db->get();
            $response = $query->result();
            foreach($response As $RO)
            {
                $this->db->select('*');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE', 4); 
                $this->db->where("Profile_Status",NULL);
                $where = "RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=4 AND Profile_Status=".NULL;
                $this->db->where($where);
                $query = $this->db->get();
                $Connector2 = $query->result();
                $array1 = json_decode(json_encode($Connector2), true);
                //$Combine_Connector=$Combine_Connector.push($array);
                            foreach($array1 as $user1)
                {
                array_push($Combine_Connector,$user1);
                }
                $this->db->select('*');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE', 2); 
                $where = "RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
                $this->db->where($where);
                $query = $this->db->get();
                $response1 = $query->result();
                foreach($response1 As $DSA)
                {
                  $this->db->select('*');
                  $this->db->from('USER_DETAILS');
                  $this->db->where('ROLE', 4); 
                  $this->db->where("Profile_Status",NULL);
                  $where = "DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4 AND Profile_Status=".NULL;
                  $this->db->where($where);
                  $query = $this->db->get();
                  $Connector3= $query->result();
                  
                  $array2 = json_decode(json_encode($Connector3), true);
                      //$Combine_Connector=$Combine_Connector.push($array2);
                  foreach($array2 as $user2)
                  {
                  array_push($Combine_Connector,$user2);
                  }
                }
            } 
              /*echo'<pre>';
                print_r($Combine_Connector);
                exit;*/
              return $Combine_Connector;
          }
     }

 
 
}
function getConnector_Relationship_Officer($q,$id)
	{
		if($q == 'all')
		{               $Combine_Connector=array();
			            $this->db->select('*');
						$this->db->from('USER_DETAILS');
						$this->db->where('ROLE', 4); 
						$where = "RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4";
						$this->db->where($where);
						$query = $this->db->get();
						$Connector2 = $query->result();
						$array1 = json_decode(json_encode($Connector2), true);
						//$Combine_Connector=$Combine_Connector.push($array);
                         foreach($array1 as $user1)
						{
						 array_push($Combine_Connector,$user1);
						}
					$this->db->select('*');
					$this->db->from('USER_DETAILS');
					$this->db->where('ROLE', 2); 
					$where = "RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";
					$this->db->where($where);
					$query = $this->db->get();
					$response1 = $query->result();
					
				  	
					foreach($response1 As $DSA)
					{
						$this->db->select('*');
						$this->db->from('USER_DETAILS');
						$this->db->where('ROLE', 4); 
						$where = "DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
						$this->db->where($where);
						$query = $this->db->get();
						$Connector3= $query->result();
						
						$array2 = json_decode(json_encode($Connector3), true);
				        //$Combine_Connector=$Combine_Connector.push($array2);
						foreach($array2 as $user2)
						{
						 array_push($Combine_Connector,$user2);
						}
					}
					/*echo'<pre>';
					print_r($Combine_Connector);
				   exit;*/
				   return $Combine_Connector;
				} 
	   if($q == 'Complete')
		        {               
	                    $Combine_Connector=array();
			            $this->db->select('*');
						$this->db->from('USER_DETAILS');
						$this->db->where('ROLE', 4); 
						$this->db->where("Profile_Status",'Complete');
						$where = "RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4 AND Profile_Status='Complete'";
						$this->db->where($where);
						$query = $this->db->get();
						$Connector2 = $query->result();
						$array1 = json_decode(json_encode($Connector2), true);
						//$Combine_Connector=$Combine_Connector.push($array);
                         foreach($array1 as $user1)
						{
						 array_push($Combine_Connector,$user1);
						}
					$this->db->select('*');
					$this->db->from('USER_DETAILS');
					$this->db->where('ROLE', 2); 
					$where = "RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";
					$this->db->where($where);
					$query = $this->db->get();
					$response1 = $query->result();
					
				  	
					foreach($response1 As $DSA)
					{
						$this->db->select('*');
						$this->db->from('USER_DETAILS');
						$this->db->where('ROLE', 4);
                        $this->db->where("Profile_Status",'Complete');						
						$where = "DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4 AND Profile_Status='Complete' ";
						$this->db->where($where);
						$query = $this->db->get();
						$Connector3= $query->result();
						
						$array2 = json_decode(json_encode($Connector3), true);
				        //$Combine_Connector=$Combine_Connector.push($array2);
						foreach($array2 as $user2)
						{
						 array_push($Combine_Connector,$user2);
						}
					}
					/*echo'<pre>';
					print_r($Combine_Connector);
				   exit;*/
				   return $Combine_Connector;
				} 
        else if($q == 'Incomplete')
                {
					$Combine_Connector=array();
			            $this->db->select('*');
						$this->db->from('USER_DETAILS');
						$this->db->where('ROLE', 4); 
						$this->db->where("Profile_Status",NULL);
						$where = "RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4 AND Profile_Status=".NULL;
						$this->db->where($where);
						$query = $this->db->get();
						$Connector2 = $query->result();
						$array1 = json_decode(json_encode($Connector2), true);
						//$Combine_Connector=$Combine_Connector.push($array);
                         foreach($array1 as $user1)
						{
						 array_push($Combine_Connector,$user1);
						}
					$this->db->select('*');
					$this->db->from('USER_DETAILS');
					$this->db->where('ROLE', 2); 
					$where = "RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";
					$this->db->where($where);
					$query = $this->db->get();
					$response1 = $query->result();
					
				  	
					foreach($response1 As $DSA)
					{
						$this->db->select('*');
						$this->db->from('USER_DETAILS');
						$this->db->where('ROLE', 4);
                        $this->db->where("Profile_Status",NULL);						
						$where = "DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4 AND Profile_Status=".NULL;
						$this->db->where($where);
						$query = $this->db->get();
						$Connector3= $query->result();
						
						$array2 = json_decode(json_encode($Connector3), true);
				        //$Combine_Connector=$Combine_Connector.push($array2);
						foreach($array2 as $user2)
						{
						 array_push($Combine_Connector,$user2);
						}
					}
					/*echo'<pre>';
					print_r($Combine_Connector);
				   exit;*/
				   return $Combine_Connector;
			    }
				
			
		
			
	   
		
  }
  public function getConnector_DSA($q,$id)
	{
		if($q == 'all')
		{
		                $this->db->select('*');
						$this->db->from('USER_DETAILS');
						$this->db->where('ROLE', 4);
                       // $this->db->where("Profile_Status",NULL);						
						$where = "DSA_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4 ";
						$this->db->where($where);
						$query = $this->db->get();
						$Connector= $query->result();
						return json_decode(json_encode($Connector), true);
	    }
		if($q == 'Complete')
		{
			 $this->db->select('*');
						$this->db->from('USER_DETAILS');
						$this->db->where('ROLE', 4);
                        $this->db->where("Profile_Status",'Complete');						
						$where = "DSA_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4 AND Profile_Status='Complete'";
						$this->db->where($where);
						$query = $this->db->get();
						$Connector= $query->result();
						return json_decode(json_encode($Connector), true);
		}
		if($q == 'Incomplete')
		{
			 $this->db->select('*');
						$this->db->from('USER_DETAILS');
						$this->db->where('ROLE', 4);
                        $this->db->where("Profile_Status",'NULL');						
						$where = "DSA_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4 AND Profile_Status=".NULL;
						$this->db->where($where);
						$query = $this->db->get();
						$Connector= $query->result();
						return json_decode(json_encode($Connector), true);
		}
						
	}
  public function getConnector_Cluster_Manager($q,$id)
	{
		if($q == 'all')
		{
      $Combine_Connector=array();
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE', 4); 
      $where = "CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4";
      $this->db->where($where);
      $query = $this->db->get();
      $Connector = $query->result();
      $array1 = json_decode(json_encode($Connector), true);
      foreach($array1 as $user1)
      {
       array_push($Combine_Connector,$user1);
      }
     
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE', 13); 
      $where = "CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=13";
      $this->db->where($where);
      $query = $this->db->get();
      $response1 = $query->result();
      
      foreach($response1 As $BM)
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 4); 
        $where = "BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=4";
        $this->db->where($where);
        $query = $this->db->get();
        $Connector3= $query->result();
        
        $array2 = json_decode(json_encode($Connector3), true);
            //$Combine_Connector=$Combine_Connector.push($array2);
        foreach($array2 as $user2)
        {
         array_push($Combine_Connector,$user2);
        }
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 14); 
        $where = "BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=14";
        $this->db->where($where);
        $query = $this->db->get();
        $Response2= $query->result();
        foreach($Response2 As $RO)
        {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 4); 
            $where = "RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=4";
            $this->db->where($where);
            $query = $this->db->get();
            $Connector4= $query->result();
            
            $array3 = json_decode(json_encode($Connector4), true);
                //$Combine_Connector=$Combine_Connector.push($array2);
            foreach($array3 as $user3)
            {
            array_push($Combine_Connector,$user3);
            }
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 2); 
            $where = "BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=2";
            $this->db->where($where);
            $query = $this->db->get();
            $Response3= $query->result();
            foreach($Response3 As $DSA)
            {
                $this->db->select('*');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE', 4); 
                $where = "DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
                $this->db->where($where);
                $query = $this->db->get();
                $Connector5= $query->result();
                
                $array4 = json_decode(json_encode($Connector5), true);
                    //$Combine_Connector=$Combine_Connector.push($array2);
                foreach($array4 as $user4)
                {
                array_push($Combine_Connector,$user4);
                }
            }

            
        }
        
       
          
     
      }
      return $Combine_Connector;
    }
    if($q == 'Complete')
		{
      $Combine_Connector=array();
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE', 4); 
      $this->db->where("Profile_Status",'Complete');	
      $where = "CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4 AND Profile_Status='Complete'";
      $this->db->where($where);
      $query = $this->db->get();
      $Connector = $query->result();
      $array1 = json_decode(json_encode($Connector), true);
      foreach($array1 as $user1)
      {
       array_push($Combine_Connector,$user1);
      }
     
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE', 13); 
      $where = "CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=13";
      $this->db->where($where);
      $query = $this->db->get();
      $response1 = $query->result();
      
      foreach($response1 As $BM)
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 4); 
        $this->db->where("Profile_Status",'Complete');
        $where = "BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=4 AND Profile_Status='Complete'";
        $this->db->where($where);
        $query = $this->db->get();
        $Connector3= $query->result();
        
        $array2 = json_decode(json_encode($Connector3), true);
            //$Combine_Connector=$Combine_Connector.push($array2);
        foreach($array2 as $user2)
        {
         array_push($Combine_Connector,$user2);
        }
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 14); 
        $where = "BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=14";
        $this->db->where($where);
        $query = $this->db->get();
        $Response2= $query->result();
        foreach($Response2 As $RO)
        {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 4); 
            $this->db->where("Profile_Status",'Complete');
            $where = "RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=4 AND Profile_Status='Complete' ";
            $this->db->where($where);
            $query = $this->db->get();
            $Connector4= $query->result();
            
            $array3 = json_decode(json_encode($Connector4), true);
                //$Combine_Connector=$Combine_Connector.push($array2);
            foreach($array3 as $user3)
            {
            array_push($Combine_Connector,$user3);
            }
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 2); 
            $where = "BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=2";
            $this->db->where($where);
            $query = $this->db->get();
            $Response3= $query->result();
            foreach($Response3 As $DSA)
            {
                $this->db->select('*');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE', 4); 
                $this->db->where("Profile_Status",'Complete');
                $where = "DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4 AND Profile_Status='Complete' ";
                $this->db->where($where);
                $query = $this->db->get();
                $Connector5= $query->result();
                
                $array4 = json_decode(json_encode($Connector5), true);
                    //$Combine_Connector=$Combine_Connector.push($array2);
                foreach($array4 as $user4)
                {
                array_push($Combine_Connector,$user4);
                }
            }

            
        }
        
       
          
     
      }
      return $Combine_Connector;
    }
    if($q == 'Incomplete')
		{
      $Combine_Connector=array();
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE', 4); 
      $this->db->where("Profile_Status",'NULL');	
      $where = "CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4 AND Profile_Status=".NULL;
      $this->db->where($where);
      $query = $this->db->get();
      $Connector = $query->result();
      $array1 = json_decode(json_encode($Connector), true);
      foreach($array1 as $user1)
      {
       array_push($Combine_Connector,$user1);
      }
     
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE', 13); 
      $where = "CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=13";
      $this->db->where($where);
      $query = $this->db->get();
      $response1 = $query->result();
      
      foreach($response1 As $BM)
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 4); 
        $this->db->where("Profile_Status",'NULL');
        $where = "BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=4 AND Profile_Status=".NULL;
        $this->db->where($where);
        $query = $this->db->get();
        $Connector3= $query->result();
        
        $array2 = json_decode(json_encode($Connector3), true);
            //$Combine_Connector=$Combine_Connector.push($array2);
        foreach($array2 as $user2)
        {
         array_push($Combine_Connector,$user2);
        }
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE', 14); 
        $where = "BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=14";
        $this->db->where($where);
        $query = $this->db->get();
        $Response2= $query->result();
        foreach($Response2 As $RO)
        {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 4); 
            $this->db->where("Profile_Status",'NULL');
            $where = "RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=4 AND Profile_Status=".NULL;
            $this->db->where($where);
            $query = $this->db->get();
            $Connector4= $query->result();
            
            $array3 = json_decode(json_encode($Connector4), true);
                //$Combine_Connector=$Combine_Connector.push($array2);
            foreach($array3 as $user3)
            {
            array_push($Combine_Connector,$user3);
            }
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 2); 
            $where = "BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=2";
            $this->db->where($where);
            $query = $this->db->get();
            $Response3= $query->result();
            foreach($Response3 As $DSA)
            {
                $this->db->select('*');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE', 4); 
                $this->db->where("Profile_Status",'NULL');
                $where = "DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4 AND Profile_Status=".NULL;
                $this->db->where($where);
                $query = $this->db->get();
                $Connector5= $query->result();
                
                $array4 = json_decode(json_encode($Connector5), true);
                    //$Combine_Connector=$Combine_Connector.push($array2);
                foreach($array4 as $user4)
                {
                array_push($Combine_Connector,$user4);
                }
            }

            
        }
        
       
          
     
      }
      return $Combine_Connector;
    }
   
  }
    /*---------------------------------------- Added by papiha on 26_02_2022---------------------------------*/
    function getRM_for_select_user($User_id,$User_Type)
    {
		 /*echo $User_id.'<br>';
     echo $User_Type;
     exit;*/
		if($User_Type=='Cluster_Manager')
		{
		  $Combine_RM=array();
          $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  $this->db->where('ROLE', 13); 
		  $where = "CM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=13";
		  $this->db->where($where);
		  $query = $this->db->get();
		  $response1 = $query->result();
     
		  foreach($response1 As $BM)
		  {
				$this->db->select('*');
				$this->db->from('USER_DETAILS');
				$where = "ROLE=14 AND BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=14";
				$this->db->where($where);
				$query = $this->db->get();
				$Customers1 = $query->result();
				$array1 = json_decode(json_encode($Customers1), true);
				foreach($array1 as $user1)
                        {
                        array_push($Combine_RM,$user1);
                        }
				
				
	       }
		   return $Combine_RM;
		}
		if($User_Type=='branch_manager')
		{
			
			$Combine_RM=array();
			$this->db->select('*');
				$this->db->from('USER_DETAILS');
				$where = "ROLE=14 AND BM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=14";
				$this->db->where($where);
				$query = $this->db->get();
				$Customers1 = $query->result();
				$array1 = json_decode(json_encode($Customers1), true);
				
				foreach($array1 as $user1)
                        {
                        array_push($Combine_RM,$user1);
                        }
				
				
	       
		      return $Combine_RM;
		}
        
    }
	function getDsa_for_select_user($User_id,$User_Type)
   {
        if($User_Type=='Cluster_Manager')
		{
			$Combine_DSA=array();	
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=2 AND CM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=2";
			$this->db->where($where);
			$query = $this->db->get();
			$DSA = $query->result();
			$array = json_decode(json_encode($DSA), true);
		    foreach($array as $user)
                        {
                        array_push($Combine_DSA,$user);
                        }
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=13 AND CM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=13";
			$this->db->where($where);
			$query = $this->db->get();
			$Branch_Manager = $query->result();
			foreach($Branch_Manager as $BM)
			{
				$this->db->select('*');
				$this->db->from('USER_DETAILS');
				$where = "ROLE=2 AND BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=2";
				$this->db->where($where);
				$query = $this->db->get();
				$DSA1 = $query->result();
				$array1 = json_decode(json_encode($DSA1), true);
				foreach($array1 as $user1)
                        {
                        array_push($Combine_DSA,$user1);
                        }
				$this->db->select('*');
				$this->db->from('USER_DETAILS');
				$where = "ROLE=14 AND BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=14";
				$this->db->where($where);
				$query = $this->db->get();
				$Relationship_Officer = $query->result();
				foreach($Relationship_Officer as $RO)
				{
					$this->db->select('*');
					$this->db->from('USER_DETAILS');
					$where = "ROLE=2 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
					$this->db->where($where);
					$query = $this->db->get();
					$DSA2 = $query->result();
					$array2 = json_decode(json_encode($DSA2), true);
				    foreach($array2 as $user2)
                        {
                        array_push($Combine_DSA,$user2);
                        }
				}
			}
			$givenArray = $Combine_DSA;
			$uniqueArry = array();
 
			foreach($givenArray as $val) { //Loop1 
				
				foreach($uniqueArry as $uniqueValue) { //Loop2 

					if($val == $uniqueValue) {
						continue 2; // Referring Outer loop (Loop 1)
					}
				}
				$uniqueArry[] = $val;
			}
			
		    return $uniqueArry;
		}			
        else if($User_Type=='branch_manager')
        {
		        $Combine_DSA=array();
			    $this->db->select('*');
				$this->db->from('USER_DETAILS');
				$where = "ROLE=2 AND BM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=2";
				$this->db->where($where);
				$query = $this->db->get();
				$DSA = $query->result();
				$array1 = json_decode(json_encode($DSA), true);
				
				foreach($array1 as $user1)
                        {
                        array_push($Combine_DSA,$user1);
                        }
				$this->db->select('*');
				$this->db->from('USER_DETAILS');
				$where = "ROLE=14 AND BM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=14";
				$this->db->where($where);
				$query = $this->db->get();
				$Relationship_Officer= $query->result();
				foreach($Relationship_Officer as $RO)
				{
					$this->db->select('*');
					$this->db->from('USER_DETAILS');
					$where = "ROLE=2 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
					$this->db->where($where);
					$query = $this->db->get();
					$DSA1 = $query->result();
					$array2 = json_decode(json_encode($DSA1), true);
				    foreach($array2 as $user2)
                        {
                        array_push($Combine_DSA,$user2);
                        }
				}
				$givenArray = $Combine_DSA;
				$uniqueArry = array();
	 
				foreach($givenArray as $val) { //Loop1 
					
					foreach($uniqueArry as $uniqueValue) { //Loop2 

						if($val == $uniqueValue) {
							continue 2; // Referring Outer loop (Loop 1)
						}
					}
					$uniqueArry[] = $val;
				}
				
				return $uniqueArry;
        }
     else if($User_Type=='Relationship_Officer')
     {
               $Combine_DSA=array();
			    $this->db->select('*');
				$this->db->from('USER_DETAILS');
				$where = "ROLE=2 AND RO_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=2";
				$this->db->where($where);
				$query = $this->db->get();
				$DSA = $query->result();
				$array1 = json_decode(json_encode($DSA), true);
				
				foreach($array1 as $user1)
                        {
                        array_push($Combine_DSA,$user1);
                        }
				$givenArray = $Combine_DSA;
				$uniqueArry = array();
	 
				foreach($givenArray as $val) { //Loop1 
					
					foreach($uniqueArry as $uniqueValue) { //Loop2 

						if($val == $uniqueValue) {
							continue 2; // Referring Outer loop (Loop 1)
						}
					}
					$uniqueArry[] = $val;
				}
				
				return $uniqueArry;
     }
	  
       
    }
	
 	
  /*-----------------------------------------Added by papiha on 28_02_2022 ---------------------------------*/
  function getDsaList($id, $filter, $userType, $userType2, $date,$bank)
	{
		if($userType=='ADMIN'|| $userType=='Operations_user'||$userType=='credit_manager_user')
		{
			 $this->db->select('*');
			  
			    $this->db->where("ROLE", 2);   
				$q = $this->db->from('USER_DETAILS');
				if ($filter == 'bnk')
				{
					$this->db->join('DSA_BANKS', 'USER_DETAILS.UNIQUE_CODE = DSA_BANKS.DSA_ID', 'RIGHT');
					$this->db->where('DSA_BANKS.BANK_NAME',$bank,'both');
					
				}
				$this->db->order_by("USER_DETAILS.ID", "desc");
				$response = $q->get()->result();
			
		    return $response;
		}
		if($userType=='Cluster_Manager')
		{
		    $Combine_Customers=array();	
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=2 AND CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";
			if ($filter == 'bnk')
			{
				$this->db->join('DSA_BANKS', 'USER_DETAILS.UNIQUE_CODE = DSA_BANKS.DSA_ID', 'RIGHT');
				$this->db->where('DSA_BANKS.BANK_NAME',$bank,'both');
				
			}
			$where = "ROLE=2 AND CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";
             $this->db->order_by("ID", "desc");
			$this->db->where($where);
			$query = $this->db->get();
			$Customers = $query->result();
			
			$array = json_decode(json_encode($Customers), true);
		    foreach($array as $user)
                        {
                        array_push($Combine_Customers,$user);
                        }
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=13 AND CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=13";
			$this->db->where($where);
			$query = $this->db->get();
			$Branch_Manager = $query->result();
			foreach($Branch_Manager as $BM)
			{
				$this->db->select('*');
				$this->db->from('USER_DETAILS');
				if ($filter == 'bnk')
					{
						$this->db->join('DSA_BANKS', 'UNIQUE_CODE = DSA_BANKS.DSA_ID', 'RIGHT');
				$this->db->where('DSA_BANKS.BANK_NAME',$bank,'both');
					}
				$where = "ROLE=2 AND BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=2";
                $this->db->order_by("ID", "desc");
				$this->db->where($where);
				$query = $this->db->get();
				$Customers1 = $query->result();
				
				$array1 = json_decode(json_encode($Customers1), true);
				
				foreach($array1 as $user1)
                        {
                        array_push($Combine_Customers,$user1);
                        }
				$this->db->select('*');
				$this->db->from('USER_DETAILS');
				$where = "ROLE=14 AND BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=14";
				$this->db->where($where);
				$query = $this->db->get();
				$Relationship_Officer = $query->result();
				foreach($Relationship_Officer as $RO)
				{
					$this->db->select('*');
					$this->db->from('USER_DETAILS');
					if ($filter == 'bnk')
					{
						$this->db->join('DSA_BANKS', 'UNIQUE_CODE = DSA_BANKS.DSA_ID', 'RIGHT');
				$this->db->where('DSA_BANKS.BANK_NAME',$bank,'both');
					}
					$where = "ROLE=2 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
          $this->db->order_by("ID", "desc");
					$this->db->where($where);
					$query = $this->db->get();
					$Customers2 = $query->result();
					
					$array2 = json_decode(json_encode($Customers2), true);
				    foreach($array2 as $user2)
                        {
                        array_push($Combine_Customers,$user2);
                        }
						
				}
			}
			$givenArray = $Combine_Customers;
			$uniqueArry = array();
 
			foreach($givenArray as $val) { //Loop1 
				
				foreach($uniqueArry as $uniqueValue) { //Loop2 

					if($val == $uniqueValue) {
						continue 2; // Referring Outer loop (Loop 1)
					}
				}
				$uniqueArry[] = $val;
			}
			
		    return $uniqueArry;
			//return $Combine_Customers;
		}
		if($userType=='branch_manager')
		{
			
			 
			  $Combine_Customers=array();	
			    $this->db->select('*');
				$this->db->from('USER_DETAILS');
				if ($filter == 'bnk')
			    {
				$this->db->join('DSA_BANKS', 'USER_DETAILS.UNIQUE_CODE = DSA_BANKS.DSA_ID', 'RIGHT');
				$this->db->where('DSA_BANKS.BANK_NAME',$bank,'both');
				
			    }
				$where = "ROLE=2 AND BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";
        $this->db->order_by("ID", "desc");
				$this->db->where($where);
				
				$query = $this->db->get();
				$Customers1 = $query->result();
				//print_r($Customers1);
				$array1 = json_decode(json_encode($Customers1), true);
				foreach($array1 as $user1)
                        {
                        array_push($Combine_Customers,$user1);
                        }
				$this->db->select('*');
				$this->db->from('USER_DETAILS');
				$where = "ROLE=14 AND BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=14";
				$this->db->where($where);
				$query = $this->db->get();
				$Relationship_Officer = $query->result();
				foreach($Relationship_Officer as $RO)
				{
					$this->db->select('*');
					$this->db->from('USER_DETAILS');
					if ($filter == 'bnk')
					{
					$this->db->join('DSA_BANKS', 'USER_DETAILS.UNIQUE_CODE = DSA_BANKS.DSA_ID', 'RIGHT');
					$this->db->where('DSA_BANKS.BANK_NAME',$bank,'both');
					
					}
					$where = "ROLE=2 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
          $this->db->order_by("ID", "desc");
					$this->db->where($where);
					$query = $this->db->get();
					$Customers2 = $query->result();
					$array2 = json_decode(json_encode($Customers2), true);
				    foreach($array2 as $user2)
                        {
                        array_push($Combine_Customers,$user2);
                        }
						
				}
			
			$givenArray = $Combine_Customers;
			$uniqueArry = array();
 
			foreach($givenArray as $val) { //Loop1 
				
				foreach($uniqueArry as $uniqueValue) { //Loop2 

					if($val == $uniqueValue) {
						continue 2; // Referring Outer loop (Loop 1)
					}
				}
				$uniqueArry[] = $val;
			}
			
		    return $uniqueArry;
		}
        //added by sonal
    if($userType=='Sales_Manager')
		{
			
			 
			  $Combine_Customers=array();	
			    $this->db->select('*');
				$this->db->from('USER_DETAILS');
				if ($filter == 'bnk')
			    {
				$this->db->join('DSA_BANKS', 'USER_DETAILS.UNIQUE_CODE = DSA_BANKS.DSA_ID', 'RIGHT');
				$this->db->where('DSA_BANKS.BANK_NAME',$bank,'both');
				
			    }
				$where = "ROLE=2 AND SELES_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";
				$this->db->where($where);
				
				$query = $this->db->get();
				$Customers1 = $query->result();
				//print_r($Customers1);
				$array1 = json_decode(json_encode($Customers1), true);
				foreach($array1 as $user1)
                        {
                        array_push($Combine_Customers,$user1);
                        }
				$this->db->select('*');
				$this->db->from('USER_DETAILS');
				$where = "ROLE=14 AND BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=14";
				$this->db->where($where);
				$query = $this->db->get();
				$Relationship_Officer = $query->result();
				foreach($Relationship_Officer as $RO)
				{
					$this->db->select('*');
					$this->db->from('USER_DETAILS');
					if ($filter == 'bnk')
					{
					$this->db->join('DSA_BANKS', 'USER_DETAILS.UNIQUE_CODE = DSA_BANKS.DSA_ID', 'RIGHT');
					$this->db->where('DSA_BANKS.BANK_NAME',$bank,'both');
					
					}
					$where = "ROLE=2 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
					$this->db->where($where);
					$query = $this->db->get();
					$Customers2 = $query->result();
					$array2 = json_decode(json_encode($Customers2), true);
				    foreach($array2 as $user2)
                        {
                        array_push($Combine_Customers,$user2);
                        }
						
				}
			
			$givenArray = $Combine_Customers;
			$uniqueArry = array();
 
			foreach($givenArray as $val) { //Loop1 
				
				foreach($uniqueArry as $uniqueValue) { //Loop2 

					if($val == $uniqueValue) {
						continue 2; // Referring Outer loop (Loop 1)
					}
				}
				$uniqueArry[] = $val;
			}
			
		    return $uniqueArry;
		}
		if($userType=='Relationship_Officer')
		{
			        $Combine_Customers=array();
			        $this->db->select('*');
					$this->db->from('USER_DETAILS');
					if ($filter == 'bnk')
					{
					$this->db->join('DSA_BANKS', 'USER_DETAILS.UNIQUE_CODE = DSA_BANKS.DSA_ID', 'RIGHT');
					$this->db->where('DSA_BANKS.BANK_NAME',$bank,'both');
					
					}
					$where = "ROLE=2 AND RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";
          $this->db->order_by("ID", "desc");
					$this->db->where($where);
					$query = $this->db->get();
					$Customers2 = $query->result();
					$array2 = json_decode(json_encode($Customers2), true);
				    foreach($array2 as $user2)
                        {
                        array_push($Combine_Customers,$user2);
                        }
						
						
						 $givenArray = $Combine_Customers;
							$uniqueArry = array();
				 
							foreach($givenArray as $val) { //Loop1 
								
								foreach($uniqueArry as $uniqueValue) { //Loop2 

									if($val == $uniqueValue) {
										continue 2; // Referring Outer loop (Loop 1)
									}
								}
								$uniqueArry[] = $val;
							}
							
							return $uniqueArry;
		}
		
		
	}
	
	public function getBranches()
	{
		$this->db->select('*');
		
		$q = $this->db->from('branch_location_master');
		$this->db->order_by("Branch_id", "desc");
		
      $response = $q->get()->result();
	  
	  
	  
	  return $response;
		
	}

	
  function getRelationOfficer($id, $filter, $userType, $userType2, $date,$Start_Date="",$End_Date="",$Branch="")
  {
      if($userType=='ADMIN')
  {  $Combine_Customers=array();	
     $this->db->select('*');
      
	 // echo $Start_Date;
         
			if(isset($filter) && $filter != '' && $filter == 'Complete')
			{
				$this->db->where("Profile_Status", 'Complete'); 
				
			}elseif(isset($filter) && $filter != '' && $filter == 'Incomplete')
			{
				$this->db->where("Profile_Status", '');
				$this->db->or_where("Profile_Status", NULL);
			}
			elseif($filter == '' || $filter == 'all'){
				
			}
			
			
			
			if(isset($Start_Date) && $Start_Date != ''  && isset($End_Date) && $End_Date != '')
			{
				$this->db->where("CREATED_AT  >=", $Start_Date);
				$this->db->where("CREATED_AT <=",  $End_Date);
				
			}
			
			if(isset($Branch) && $Branch != '')
			{
				
								$this->db->where("Branch",$Branch);

			}
			$this->db->where("ROLE", 14);
      $q = $this->db->from('USER_DETAILS');
      $this->db->order_by("ID", "desc");
      $response = $q->get()->result();
	  
	 //echo $this->db->last_query();
	  
	  //exit;
        $array = json_decode(json_encode($response), true);
             foreach($array as $user)
                      {
                      array_push($Combine_Customers,$user);
                      }
      return $Combine_Customers;
  }
  if($userType=='Cluster_Manager')
  {
      $Combine_Customers=array();	
    $this->db->select('*');
    $this->db->from('USER_DETAILS');
    $where = "ROLE=14 AND CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=14";
    
    
    $this->db->where($where);
    $query = $this->db->get();
    $Customers = $query->result();
    
    $array = json_decode(json_encode($Customers), true);
      foreach($array as $user)
                      {
                      array_push($Combine_Customers,$user);
                      }
    $this->db->select('*');
    $this->db->from('USER_DETAILS');
    $where = "ROLE=13 AND CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=13";
    $this->db->where($where);
    $query = $this->db->get();
    $Branch_Manager = $query->result();
    foreach($Branch_Manager as $BM)
    {
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $where = "ROLE=14 AND BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=14";
      $this->db->where($where);
      $query = $this->db->get();
      $Customers1 = $query->result();
      
      $array1 = json_decode(json_encode($Customers1), true);
      
      foreach($array1 as $user1)
                      {
                      array_push($Combine_Customers,$user1);
                      }
    
    }
    $givenArray = $Combine_Customers;
    $uniqueArry = array();

    foreach($givenArray as $val) { //Loop1 
      
      foreach($uniqueArry as $uniqueValue) { //Loop2 

        if($val == $uniqueValue) {
          continue 2; // Referring Outer loop (Loop 1)
        }
      }
      $uniqueArry[] = $val;
    }
    
      return $uniqueArry;
    //return $Combine_Customers;
  }
  if($userType=='Sales_Manager')
  {
    
     
        $Combine_Customers=array();	
        $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $where = "ROLE=14 AND SELES_ID='".$id."' OR Refer_By='".$id."' AND ROLE=14";
      $this->db->where($where);
      
      $query = $this->db->get();
      $Customers1 = $query->result();
      //print_r($Customers1);
      $array1 = json_decode(json_encode($Customers1), true);
      foreach($array1 as $user1)
                      {
                      array_push($Combine_Customers,$user1);
                      }
      
    
    $givenArray = $Combine_Customers;
    $uniqueArry = array();

    foreach($givenArray as $val) { //Loop1 
      
      foreach($uniqueArry as $uniqueValue) { //Loop2 

        if($val == $uniqueValue) {
          continue 2; // Referring Outer loop (Loop 1)
        }
      }
      $uniqueArry[] = $val;
    }
    
      return $uniqueArry;
  }
  if($userType=='branch_manager')
  {
    
     
        $Combine_Customers=array();	
        $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $where = "ROLE=14 AND BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=14";
      $this->db->where($where);
      
      $query = $this->db->get();
      $Customers1 = $query->result();
      //print_r($Customers1);
      $array1 = json_decode(json_encode($Customers1), true);
      foreach($array1 as $user1)
                      {
                      array_push($Combine_Customers,$user1);
                      }
      
    
    $givenArray = $Combine_Customers;
    $uniqueArry = array();

    foreach($givenArray as $val) { //Loop1 
      
      foreach($uniqueArry as $uniqueValue) { //Loop2 

        if($val == $uniqueValue) {
          continue 2; // Referring Outer loop (Loop 1)
        }
      }
      $uniqueArry[] = $val;
    }
    
      return $uniqueArry;
  }
  }
   /*---------------------------------Added by papiha on 01_03_2022 ----------------------------------------------------------------------*/      
    
   
 
 


/*------------------------------------------------------01_03_2022----------------------------------*/
function get_Master_Cities()
{
 $this->db->distinct();
   $this->db->select('City');
   $this->db->from('locations');        
   $this->db->where('statename','MAHARASHTRA');
 $this->db->order_by("City", "ASC"); 
   $query = $this->db->get();

   $response = $query->result();

   return $response;
  
}  	 
 /*----------------------------------------Added by papiha on 04_03_2022-------------------------------*/
 
 function get_Master_Branch()
{
 $this->db->distinct();
   $this->db->select('*');
   $this->db->from('branch_location_master');        
   //$this->db->where('statename','MAHARASHTRA');
 $this->db->order_by("Branch_id", "ASC"); 
   $query = $this->db->get();

   $response = $query->result();

   return $response;
  
}  	 
 
 function get_dsa_user_RO($User_id)
 {
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',2);  
      $where = "RO_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=2";
      $this->db->where($where); 
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
 }   
  function get_dsa_user_BM($User_id)
 {
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',2);  
      $where = "BM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=2";
      $this->db->where($where); 
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
  /*$str = $this->db->last_query();
  echo "<pre>";
  print_r($str);
  exit;*/
      return $response;
 } 
  /*------------------------------------------- Added by papiha on 05-03-2022-------------------------------------------*/
   
  function get_connector_user_RO($User_id)
  {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',4);  
       $where = "RO_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=4";
       $this->db->where($where); 
       $this->db->order_by("ID", "desc");
       $query = $this->db->get();
       $response = $query->result();
       return $response;
  }  

 function get_connector_user_BM($User_id,$User_Type)
  {
     
       if($User_Type=='Relationship_Officer')
       {
         
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',4);  
        $where = "RO_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=4";
        $this->db->where($where); 
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return  $response;
       
       }
       else if($User_Type=='branch_manager')
       {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',4);  
        $where = "BM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=4";
        $this->db->where($where); 
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return  $response;
   
       }
       else if($User_Type=='DSA')
       {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',4);  
        $where = "DSA_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=4";
        $this->db->where($where); 
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return  $response;
   
       }
       else if($User_Type=='Cluster_Manager')
       {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',4);  
        $where = "CM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=4";
        $this->db->where($where); 
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return  $response;
   
       }
  }   
   
  function get_connector_user_DSA($User_id)
  {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',4);  
       $where = "DSA_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=4";
       $this->db->where($where); 
       $this->db->order_by("ID", "desc");
       $query = $this->db->get();
       $response = $query->result();
   /*$str = $this->db->last_query();
   echo "<pre>";
   print_r($str);
   exit;*/
       return $response;
  }   	
  function get_ro_user_BM($User_id)
   {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',14);  
        $where = "BM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=14";
        $this->db->where($where); 
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
		/*$str = $this->db->last_query();
		echo "<pre>";
		print_r($str);
		exit;*/
        return $response;
   }  
   /*------------------------------------- Added by papiha on 14-03-2022---------------------------------------------------------------*/ 
   function getLegal()
	{
	   $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',18); 
       $this->db->order_by("ID", "desc");
       $query = $this->db->get();
       $response = $query->result();
	   return $response;
	}
    //=============================== added by priya 22-03-2022
    //===============================================================================
 function get_all_users_types()
    {
       $this->db->select('Role');
	   $this->db->where('ROLE!=', 5); 
       $this->db->distinct();
       $this->db->from('USER_DETAILS');        
       $query = $this->db->get();
       $response = $query->result();
       return $response;
    }
function get_all_users_assigne_from_list()
    {
       $this->db->select('UNIQUE_CODE , FN , LN ,ROLE');
       $where = "ROLE=13 OR ROLE=6 OR ROLE=7 OR ROLE=14 OR ROLE=15 OR ROLE=21";
	   $this->db->where($where);
	   $this->db->from('USER_DETAILS');        
       $query = $this->db->get();
	   $response = $query->result();
	   // print_r($this->db->last_query());
	  // exit;
      
       return $response;
    }
    /*--------------------------------added by sonal 8-04-2022--------------------------------*/  
function support_member()
{

   
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 20); 
          			
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;

}
/*--------------------------------added by sonal---on-11-04-2022--------------------------*/

function sales_manager()
{

   
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 21); 
          			
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;

}
//added by sonal--------------on 13-04-2022----------------------
function getDashboardData_sales($id){
  $response = [];
 
  $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS  where ROLE = 14 AND SELES_ID= '".$id."'"); 
  $RO_count = $query->row();
  $response['RO_count'] = $RO_count->count;

  $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 1 AND SELES_ID = '".$id."' OR Refer_By='".$id."' AND ROLE = 1"); 
  $cust_count = $query->row();
  $response['cust_count'] = $cust_count->count;

  
  $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 2 AND SELES_ID = '".$id."' OR Refer_By='".$id."' AND ROLE = 2"); 
  $dsa_count = $query->row();
  $response['dsa_count'] = $dsa_count->count;

 

  $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 4 AND SELES_ID = '".$id."' OR Refer_By='".$id."' AND ROLE = 4"); 
  $conn_count = $query->row();
  $response['conn_count'] = $conn_count->count;

  return $response;
 
}

	function get_all_user_accounts()
    {
       $this->db->select('UNIQUE_CODE , FN , LN ,ROLE');
       $where = "ROLE!=1";
	   $this->db->where($where);
	   $this->db->from('USER_DETAILS');        
       $query = $this->db->get();
	   $response = $query->result();
	   // print_r($this->db->last_query());
	  // exit;
      
       return $response;
    }
	 function update_disable_user_role($id, $data){
      $this->db->where('UNIQUE_CODE', $id);
      return $this->db->update('USER_DETAILS',$data);      
    }
	function get_disabled_users()
    {
       $this->db->select('*');
	   $this->db->like('ROLE',10); 
       $this->db->from('USER_DETAILS');        
       $query = $this->db->get();
       $response = $query->result();
	  // echo  $this->db->last_query() ;
       return $response;
    }
    /*------------------------------ added by papiha on 21_04_2022------------------------------------------------------------*/
    function get_all_Branches()
	{
      /*$this->db->select('*');
      $this->db->from('branch_location_master');        
      //$this->db->where('city_id',$city_id);
      $query = $this->db->get();
      $response = $query->result();
      return $response;*/
      $query=$this->db->query("SELECT DISTINCT * FROM branch_location_master"); 
   
      $response = $query->result();
      return $response;
  }

/*---------------------------- added by papiha on 22_04_2022-------------------------------------------*/
  /*--------------------------------added by sonal--29-04-2022---HR Pagination------------------------------>*/
  function Get_Total_No_Customer_HR($filter)
  {
   if($filter=='all')
   {
     $this->db->select('count(*) as count');
     $this->db->from('USER_DETAILS');
     $this->db->where('ROLE',9);
     $query = $this->db->get();
     $response = $query->row();
     return $response->count;
  }



  else if($filter=='Incomplete')
   {
     $this->db->select('count(*) as count');
     $this->db->from('USER_DETAILS');
     $this->db->where('ROLE',9);
     $this->db->where("Profile_Status",NULL); 
     $query = $this->db->get();
     $response = $query->row();
     return $response->count;
   }
   else if($filter=='Complete')
   {
     $this->db->select('count(*) as count');
     $this->db->from('USER_DETAILS');
     $this->db->where('ROLE',9);
     $this->db->where("Profile_Status",'Complete');
     $query = $this->db->get();
     $response = $query->row();
     return $response->count;
   }
 
   else
   {
     $this->db->select('count(*) as count');
     $this->db->from('USER_DETAILS');
     $this->db->where('ROLE',9);
     $query = $this->db->get();
     $response = $query->row();
     return $response->count;

   }
 }
 function Get_Customer_Filter_HR($searchValue,$filter)
 {
   if($filter=='all')
   {

         $this->db->select('count(*) as count');
         $this->db->from('USER_DETAILS');
         $this->db->where('ROLE',9);
         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=9 ";
         $this->db->where($where);
         }
         $query = $this->db->get();
         $response = $query->row();
         return $response->count;
   }
   else if($filter=='Complete')

       {
         
         $this->db->select('count(*) as count');
         $this->db->from('USER_DETAILS');
         $this->db->where('ROLE',9);
         $this->db->where("Profile_Status",'Complete');

         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=9 ";
         $this->db->where($where);
         }
         $query = $this->db->get();
         $response = $query->row();
         return $response->count;
       }
       else if($filter=='Incomplete')
       {
         $this->db->select('count(*) as count');
         $this->db->from('USER_DETAILS');
         $this->db->where('ROLE',9);
         $this->db->where("Profile_Status",NULL); 

         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=9 ";
         $this->db->where($where);
         }
         $query = $this->db->get();
         $response = $query->row();
         return $response->count;
       }
       else
       {
         $this->db->select('count(*) as count');
         $this->db->from('USER_DETAILS');
         $this->db->where('ROLE',9);
         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=9 ";
         $this->db->where($where);
         }
         $query = $this->db->get();
         $response = $query->row();
         return $response->count;
       }

 }
  function Get_Customer_With_Page_HR($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
  {
       if($filter=='all')
       {
         $this->db->select('*');
         $this->db->from('USER_DETAILS');
         $this->db->where('ROLE',9);
         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=9 ";
         $this->db->where($where);
         }
         $this->db->order_by($columnName, $columnSortOrder);
         $this->db->limit($rowperpage,$row);
         $query = $this->db->get();
         $response = $query->result();
             
         return $response;
       }
       else if($filter=='Incomplete')
       {
         $this->db->select('*');
         $this->db->from('USER_DETAILS');
         $this->db->where('ROLE',9);
         $this->db->where("Profile_Status",NULL); 

         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=9 ";
         $this->db->where($where);
         }
         $this->db->order_by($columnName, $columnSortOrder);
         $this->db->limit($rowperpage,$row);
         $query = $this->db->get();
         $response = $query->result();
               
         return $response;
       }
       else if($filter=='Complete')
       {
         $this->db->select('*');
         $this->db->from('USER_DETAILS');
         $this->db->where('ROLE',9);
         $this->db->where("Profile_Status",'Complete');

         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=9";
         $this->db->where($where);
         }
         $this->db->order_by($columnName, $columnSortOrder);
         $this->db->limit($rowperpage,$row);
         $query = $this->db->get();
         $response = $query->result();
         return $response;
       }
       else
       {
         $this->db->select('*');
         $this->db->from('USER_DETAILS');
         $this->db->where('ROLE',9);
         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=9 ";
         $this->db->where($where);
         }
         $this->db->order_by($columnName, $columnSortOrder);
         $this->db->limit($rowperpage,$row);
         $query = $this->db->get();
         $response = $query->result();
         return $response;
       }

  }

     /*--------------added by sonal--29-04-2022---Cluster Manager Pagination----------------------->*/
     function Get_Total_No_Customer_Cluster($filter)
     {
      if($filter=='all')
    	{
        $this->db->select('count(*) as count');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',15);
        $query = $this->db->get();
        $response = $query->row();
        return $response->count;
     }

   

     else if($filter=='Incomplete')
    	{
        $this->db->select('count(*) as count');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',15);
        $this->db->where("Profile_Status",NULL); 
        $query = $this->db->get();
        $response = $query->row();
        return $response->count;
      }
      else if($filter=='Complete')
      {
        $this->db->select('count(*) as count');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',15);
        $this->db->where("Profile_Status",'Complete');
        $query = $this->db->get();
        $response = $query->row();
        return $response->count;
      }
    
      else
      {
        $this->db->select('count(*) as count');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',15);
        $query = $this->db->get();
        $response = $query->row();
        return $response->count;

      }
    }
 function Get_Customer_Filter_Cluster($searchValue,$filter,$Start_Date,$End_Date,$location)
    {
      if($filter=='all')
      {

            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }
           if($Start_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
       }
      if($End_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
       }

                 if($location!='' )
      {
             $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
           $this->db->where($where);
        
      }
            $query = $this->db->get();
            $response = $query->row();
            return $response->count;
      }
      else if($filter=='Complete')

          {
            
            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
            $this->db->where("Profile_Status",'Complete');

            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }

              if($Start_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
             }
            if($End_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
             }

              if($location!='' )
              {
                     $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
                   $this->db->where($where);
                
              }
            $query = $this->db->get();
            $response = $query->row();
            return $response->count;
          }
          else if($filter=='Incomplete')
          {
            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
            $this->db->where("Profile_Status",NULL); 

            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }

            if($Start_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
             }
            if($End_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
             }

             if($location!='' )
              {
                     $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
                   $this->db->where($where);
                
              }
            $query = $this->db->get();
            $response = $query->row();
            return $response->count;
          }
          else
          {
            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }

                    if($Start_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
             }
            if($End_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
             }
             if($location!='' )
            {
                 $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
                 $this->db->where($where);
            }
            $query = $this->db->get();
            $response = $query->row();
            return $response->count;
          }

    }
     function Get_Customer_With_Page_Cluster($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter,$Start_Date,$End_Date,$location)
     {
          if($filter=='all')
          {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }
            if($Start_Date!='' )
           {
             $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
           }
          if($End_Date!='' )
           {
             $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
           }

           if($location!='' )
      {
             $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
           $this->db->where($where);
        
      }
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
                   //print_r($this->db->last_query());
                   //exit;
                   //exit;
            return $response;
          }
          else if($filter=='Incomplete')
          {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
            $this->db->where("Profile_Status",NULL); 

            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }

                    if($Start_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
       }
      if($End_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
       }
        if($location!='' )
      {
             $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
           $this->db->where($where);
        
      }
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
                   //print_r($this->db->last_query());
                   //exit;
                   //exit;
            return $response;
          }
          else if($filter=='Complete')
          {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
            $this->db->where("Profile_Status",'Complete');

            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }

              if($Start_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
             }
            if($End_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
             }
              if($location!='' )
            {
                   $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
                 $this->db->where($where);
              
            }
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
            return $response;
          }
          else
          {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }
            if($Start_Date!='' )
           {
             $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
           }
          if($End_Date!='' )
           {
             $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
           }
            if($location!='' )
          {
               $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
               $this->db->where($where);
            
          }
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
            return $response;
          }

     }


            /*--------------------------------added by sonal--29-04-2022---Branch Manager Pagination------------------------------>*/
            function Get_Total_No_Customer_Branch($filter)
            {
             if($filter=='all')
             {
               $this->db->select('count(*) as count');
               $this->db->from('USER_DETAILS');
               $this->db->where('ROLE',13);
               $query = $this->db->get();
               $response = $query->row();
               return $response->count;
            }
       
          
       
            else if($filter=='Incomplete')
             {
               $this->db->select('count(*) as count');
               $this->db->from('USER_DETAILS');
               $this->db->where('ROLE',13);
               $this->db->where("Profile_Status",NULL); 
               $query = $this->db->get();
               $response = $query->row();
               return $response->count;
             }
             else if($filter=='Complete')
             {
               $this->db->select('count(*) as count');
               $this->db->from('USER_DETAILS');
               $this->db->where('ROLE',13);
               $this->db->where("Profile_Status",'Complete');
               $query = $this->db->get();
               $response = $query->row();
               return $response->count;
             }
           
             else
             {
               $this->db->select('count(*) as count');
               $this->db->from('USER_DETAILS');
               $this->db->where('ROLE',13);
               $query = $this->db->get();
               $response = $query->row();
               return $response->count;
       
             }
           }
       function Get_Customer_Filter_Branch($searchValue,$filter,$Start_Date,$End_Date,$location)
           {
             if($filter=='all')
             {
       
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
                   $this->db->where('ROLE',13);
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13 ";
                   $this->db->where($where);
                   }
                   if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
             }
             else if($filter=='Complete')
       
                 {
                   
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
                   $this->db->where('ROLE',13);
                   $this->db->where("Profile_Status",'Complete');
       
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
                 }
                 else if($filter=='Incomplete')
                 {
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
                   $this->db->where('ROLE',13);
                   $this->db->where("Profile_Status",NULL); 
       
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
                 }
                 else
                 {
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
                   $this->db->where('ROLE',13);
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
                 }
       
           }
            function Get_Customer_With_Page_Branch($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter,$Start_Date,$End_Date,$location)
            {
                 if($filter=='all')
                 {
                   $this->db->select('*');
                   $this->db->from('USER_DETAILS');
                   $this->db->where('ROLE',13);
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $this->db->order_by($columnName, $columnSortOrder);
                   $this->db->limit($rowperpage,$row);
                   $query = $this->db->get();
                   $response = $query->result();
                          //print_r($this->db->last_query());
                          //exit;
                          //exit;
                   return $response;
                 }
                 else if($filter=='Incomplete')
                 {
                   $this->db->select('*');
                   $this->db->from('USER_DETAILS');
                   $this->db->where('ROLE',13);
                   $this->db->where("Profile_Status",NULL); 
       
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $this->db->order_by($columnName, $columnSortOrder);
                   $this->db->limit($rowperpage,$row);
                   $query = $this->db->get();
                   $response = $query->result();
                          //print_r($this->db->last_query());
                          //exit;
                          //exit;
                   return $response;
                 }
                 else if($filter=='Complete')
                 {
                   $this->db->select('*');
                   $this->db->from('USER_DETAILS');
                   $this->db->where('ROLE',13);
                   $this->db->where("Profile_Status",'Complete');
       
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $this->db->order_by($columnName, $columnSortOrder);
                   $this->db->limit($rowperpage,$row);
                   $query = $this->db->get();
                   $response = $query->result();
                   return $response;
                 }
                 else
                 {
                   $this->db->select('*');
                   $this->db->from('USER_DETAILS');
                   $this->db->where('ROLE',13);
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $this->db->order_by($columnName, $columnSortOrder);
                   $this->db->limit($rowperpage,$row);
                   $query = $this->db->get();
                   $response = $query->result();
                   return $response;
                 }
       
            }
       
                /*--------------------------------added by sonal--29-04-2022---Sales Manager Pagination------------------------------>*/
         /* function Get_Total_No_Customer_Sales()
          {
                $this->db->select('count(*) as count');
                        $this->db->from('USER_DETAILS');
                        $this->db->where('ROLE',21);
                        $query = $this->db->get();
                    $response = $query->row();
                        return $response->count;
                        //print_r($this->db->last_query());
                        //exit;
          }
          function Get_Customer_Filter_Sales($searchValue)
          {
                    $this->db->select('count(*) as count');
                        $this->db->from('USER_DETAILS');
                        $this->db->where('ROLE',21);
                        if($searchValue!= '')
                        {
                          $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=21 ";
                      
                        $this->db->where($where);
                        }
                        $query = $this->db->get();
                    $response = $query->row();
   
                        //exit;
                        return $response->count;
          }
          function Get_Customer_With_Page_Sales($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
          {
                   $this->db->select('*');
                        $this->db->from('USER_DETAILS');
                        $this->db->where('ROLE',21);
                        if($searchValue!= '')
                        {
                          $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=21 ";
                        
                          $this->db->where($where);
                        }
   
                        $this->db->order_by($columnName, $columnSortOrder);
                        $this->db->limit($rowperpage,$row);
                        $query = $this->db->get();
                        $response = $query->result();
                        //print_r($this->db->last_query());
                        //exit;
                        //exit;
                        return $response;
          }*/

          function Get_Total_No_Customer_Sales($filter)
                {
                 if($filter=='all')
                 {
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
                   $this->db->where('ROLE',21);
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
                }
           
              
           
                else if($filter=='Incomplete')
                 {
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
                   $this->db->where('ROLE',21);
                   $this->db->where("Profile_Status",NULL); 
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
                 }
                 else if($filter=='Complete')
                 {
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
                   $this->db->where('ROLE',21);
                   $this->db->where("Profile_Status",'Complete');
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
                 }
               
                 else
                 {
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
                   $this->db->where('ROLE',21);
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
           
                 }
               }
               function Get_Customer_Filter_Sales($searchValue,$filter)
               {
                 if($filter=='all')
                 {
           
                       $this->db->select('count(*) as count');
                       $this->db->from('USER_DETAILS');
                       $this->db->where('ROLE',21);
                       if($searchValue!= '')
                       {
                       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=21";
                       $this->db->where($where);
                       }
                       $query = $this->db->get();
                       $response = $query->row();
                       return $response->count;
                 }
                 else if($filter=='Complete')
           
                     {
                       
                       $this->db->select('count(*) as count');
                       $this->db->from('USER_DETAILS');
                       $this->db->where('ROLE',21);
                       $this->db->where("Profile_Status",'Complete');
           
                       if($searchValue!= '')
                       {
                       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=21 ";
                       $this->db->where($where);
                       }
                       $query = $this->db->get();
                       $response = $query->row();
                       return $response->count;
                     }
                     else if($filter=='Incomplete')
                     {
                       $this->db->select('count(*) as count');
                       $this->db->from('USER_DETAILS');
                       $this->db->where('ROLE',21);
                       $this->db->where("Profile_Status",NULL); 
           
                       if($searchValue!= '')
                       {
                       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=21 ";
                       $this->db->where($where);
                       }
                       $query = $this->db->get();
                       $response = $query->row();
                       return $response->count;
                     }
                     else
                     {
                       $this->db->select('count(*) as count');
                       $this->db->from('USER_DETAILS');
                       $this->db->where('ROLE',21);
                       if($searchValue!= '')
                       {
                       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=21 ";
                       $this->db->where($where);
                       }
                       $query = $this->db->get();
                       $response = $query->row();
                       return $response->count;
                     }
           
               }
                function Get_Customer_With_Page_Sales($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
                {
                     if($filter=='all')
                     {
                       $this->db->select('*');
                       $this->db->from('USER_DETAILS');
                       $this->db->where('ROLE',21);
                       if($searchValue!= '')
                       {
                       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=21 ";
                       $this->db->where($where);
                       }
                       $this->db->order_by($columnName, $columnSortOrder);
                       $this->db->limit($rowperpage,$row);
                       $query = $this->db->get();
                       $response = $query->result();
                              //print_r($this->db->last_query());
                              //exit;
                              //exit;
                       return $response;
                     }
                     else if($filter=='Incomplete')
                     {
                       $this->db->select('*');
                       $this->db->from('USER_DETAILS');
                       $this->db->where('ROLE',21);
                       $this->db->where("Profile_Status",NULL); 
           
                       if($searchValue!= '')
                       {
                       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=21";
                       $this->db->where($where);
                       }
                       $this->db->order_by($columnName, $columnSortOrder);
                       $this->db->limit($rowperpage,$row);
                       $query = $this->db->get();
                       $response = $query->result();
                              //print_r($this->db->last_query());
                              //exit;
                              //exit;
                       return $response;
                     }
                     else if($filter=='Complete')
                     {
                       $this->db->select('*');
                       $this->db->from('USER_DETAILS');
                       $this->db->where('ROLE',21);
                       $this->db->where("Profile_Status",'Complete');
           
                       if($searchValue!= '')
                       {
                       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=21";
                       $this->db->where($where);
                       }
                       $this->db->order_by($columnName, $columnSortOrder);
                       $this->db->limit($rowperpage,$row);
                       $query = $this->db->get();
                       $response = $query->result();
                       return $response;
                     }
                     else
                     {
                       $this->db->select('*');
                       $this->db->from('USER_DETAILS');
                       $this->db->where('ROLE',21);
                       if($searchValue!= '')
                       {
                       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=21";
                       $this->db->where($where);
                       }
                       $this->db->order_by($columnName, $columnSortOrder);
                       $this->db->limit($rowperpage,$row);
                       $query = $this->db->get();
                       $response = $query->result();
                       return $response;
                     }
           
                }
          /*--------------------------------added by sonal--29-04-2022---Operation User Pagination------------------------------>*/
          function Get_Total_No_Customer_Operation($filter)
             {
              if($filter=='all')
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',3);
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
             }
        
           
        
             else if($filter=='Incomplete')
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',3);
                $this->db->where("Profile_Status",NULL); 
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
              }
              else if($filter=='Complete')
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',3);
                $this->db->where("Profile_Status",'Complete');
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
              }
            
              else
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',3);
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
        
              }
            }
              function Get_Customer_Filter_Operation($searchValue,$filter,$Start_Date,$End_Date,$location)
            {
              if($filter=='all')
              {
        
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',3);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=3";
                    $this->db->where($where);
                    }
                    if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=3 ";
                       $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
              }
              else if($filter=='Complete')
        
                  {
                    
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',3);
                    $this->db->where("Profile_Status",'Complete');
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=3";
                    $this->db->where($where);
                    }
                    if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=3 ";
                       $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
                  }
                  else if($filter=='Incomplete')
                  {
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',3);
                    $this->db->where("Profile_Status",NULL); 
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=3";
                    $this->db->where($where);
                    }
                    if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=3 ";
                       $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
                  }
                  else
                  {
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',3);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=3";
                    $this->db->where($where);
                    }
                    if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=3 ";
                       $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
                  }
        
            }
             function Get_Customer_With_Page_Operation($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter,$Start_Date,$End_Date,$location)
             {
                  if($filter=='all')
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',3);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=3";
                    $this->db->where($where);
                    }
                    if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=3 ";
                       $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();
                          
                    return $response;
                  }
                  else if($filter=='Incomplete')
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',3);
                    $this->db->where("Profile_Status",NULL); 
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=3";
                    $this->db->where($where);
                    }
                     if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=3 ";
                       $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();

                    return $response;
                  }
                  else if($filter=='Complete')
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',3);
                    $this->db->where("Profile_Status",'Complete');
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=3";
                    $this->db->where($where);
                    }
                     if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=3 ";
                       $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();
                    return $response;
                  }
                  else
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',3);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=3";
                    $this->db->where($where);
                    }
                     if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=3 ";
                       $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();
                    return $response;
                  }
        
             }
             /*--------------------------------added by sonal--29-04-2022---Credit Manager Pagination------------------------------>*/
             function Get_Total_No_Customer_Credit($filter)
             {
              if($filter=='all')
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',8);
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
             }
        
           
        
             else if($filter=='Incomplete')
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',8);
                $this->db->where("Profile_Status",NULL); 
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
              }
              else if($filter=='Complete')
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',8);
                $this->db->where("Profile_Status",'Complete');
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
              }
            
              else
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',8);
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
        
              }
            }
            function Get_Customer_Filter_Credit($searchValue,$filter)
            {
              if($filter=='all')
              {
        
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',8);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
              }
              else if($filter=='Complete')
        
                  {
                    
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',8);
                    $this->db->where("Profile_Status",'Complete');
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
                  }
                  else if($filter=='Incomplete')
                  {
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',8);
                    $this->db->where("Profile_Status",NULL); 
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
                  }
                  else
                  {
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',8);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
                  }
        
            }
             function Get_Customer_With_Page_Credit($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
             {
                  if($filter=='all')
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',8);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();
                          
                    return $response;
                  }
                  else if($filter=='Incomplete')
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',8);
                    $this->db->where("Profile_Status",NULL); 
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();

                    return $response;
                  }
                  else if($filter=='Complete')
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',8);
                    $this->db->where("Profile_Status",'Complete');
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();
                    return $response;
                  }
                  else
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',8);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();
                    return $response;
                  }
        
             }
/*------------------------------------- Added by papiha on 02-05-2022---------------------------------------------------------------*/ 
   function getTechnical()
   {
      $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',19); 
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
      return $response;
   }

   //========================= added by priya 2-05-2022
   //---------------------------------internal bureau reports




      function get_internal_idccr_List()
        {
              
              $this->db->select('count(*) as count');
               $this->db->from('credit_score');   
              $this->db->order_by("id", "desc");
              $query = $this->db->get();
              $response = $query->row();
              return $response->count;
                         
        
        }
           function Get_internal_idccr_Filter($searchValue)
        {
            $this->db->select('count(*) as count');
            $this->db->from('credit_score');
 
            if($searchValue!= '')
            {
            $where = "customer_id like '%".$searchValue."%' ";
            $this->db->where($where);
            }
             $this->db->order_by("id", "desc");
            $query = $this->db->get();
            $response = $query->row();
            return $response->count; 
        }
        function Get_internal_idccr_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
        {
           
        
           $this->db->select('*');
           $this->db->from('credit_score');
         
            if($searchValue!= '')
            {
             $where = "customer_id like '%".$searchValue."%' ";
            $this->db->where($where);
            }
          
           
           // $this->db->order_by($columnName, $columnSortOrder);
             $this->db->order_by("id", "desc");
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
          // print_r($this->db->last_query());
           //exit;
            //exit;
           return $response; 
        } 

        //-------------------------------- added by priyanka 2-05-2022


 function get_IDCCR_bureauList($user_email)
        {
              
              $this->db->select('count(*) as count');
              $this->db->from('combined_credit_bureau');   
              $this->db->where('IDCCR_user',$user_email);        
              $this->db->order_by("id", "desc");
              $query = $this->db->get();
              $response = $query->row();
              return $response->count;
                         
        
        }
           function Get_idccr_bureau_Filter($user_email,$searchValue)
        {
            $this->db->select('count(*) as count');
            $this->db->from('combined_credit_bureau');
            $this->db->where('IDCCR_user',$user_email); 
            if($searchValue!= '')
            {
            $where = "fname like '%".$searchValue."%'  AND IDCCR_user == .$user_email. OR lname like '%".$searchValue."%' AND IDCCR_user == .$user_email.";
            $this->db->where($where);
            }
            $this->db->order_by("id", "desc");
            $query = $this->db->get();
            $response = $query->row();
            return $response->count; 
        }
        function Get_idccr_bureau_With_Page($user_email,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
        {
           
        
           $this->db->select('*');
           $this->db->from('combined_credit_bureau');
         
            if($searchValue!= '')
            {
             $where = "fname like '%".$searchValue."%'  AND IDCCR_user == .$user_email. OR lname like '%".$searchValue."%' AND IDCCR_user == .$user_email.";
            $this->db->where($where);
            }
            else
            {
                    $this->db->where('IDCCR_user',$user_email); 
               
            }
           $this->db->order_by("id", "desc");
           // $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
          // print_r($this->db->last_query());
           //exit;
            //exit;
           return $response; 
        } 

         /*--------------------------------added by sonal--30-04-2022--- Support_Member Pagination------------------------------>*/
      
         function Get_Total_No_Customer_Support()
         {
               $this->db->select('count(*) as count');
                       $this->db->from('USER_DETAILS');
                       $this->db->where('ROLE',20);
                       $query = $this->db->get();
                   $response = $query->row();
                       return $response->count;
                       //print_r($this->db->last_query());
                       //exit;
         }
         function Get_Customer_Filter_Support($searchValue)
         {
                   $this->db->select('count(*) as count');
                       $this->db->from('USER_DETAILS');
                       $this->db->where('ROLE',20);
                       if($searchValue!= '')
                       {
                        $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=20 ";
                  
                       $this->db->where($where);
                       }
                       $query = $this->db->get();
                   $response = $query->row();
   
                       //exit;
                       return $response->count;
         }
         function Get_Customer_With_Page_Support($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
         {
                  $this->db->select('*');
                       $this->db->from('USER_DETAILS');
                      $this->db->where('ROLE',20);
                       if($searchValue!= '')
                       {
                        $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=";
                    
                        $this->db->where($where);
                       }
   
                       $this->db->order_by($columnName, $columnSortOrder);
                       $this->db->limit($rowperpage,$row);
                       $query = $this->db->get();
                       $response = $query->result();
                       //print_r($this->db->last_query());
                       //exit;
                       //exit;
                       return $response;
         }
    /*--------------------------------added by sonal--30-04-2022--- Manager Pagination------------------------------>*/
      
    function Get_Total_No_Customer_Manager($filter)
     {
      if($filter=='all')
    	{
        $this->db->select('count(*) as count');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',7);
        $query = $this->db->get();
        $response = $query->row();
        return $response->count;
     }

   

     else if($filter=='Incomplete')
    	{
        $this->db->select('count(*) as count');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',7);
        $this->db->where("Profile_Status",NULL); 
        $query = $this->db->get();
        $response = $query->row();
        return $response->count;
      }
      else if($filter=='Complete')
      {
        $this->db->select('count(*) as count');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',7);
        $this->db->where("Profile_Status",'Complete');
        $query = $this->db->get();
        $response = $query->row();
        return $response->count;
      }
    
      else
      {
        $this->db->select('count(*) as count');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',7);
        $query = $this->db->get();
        $response = $query->row();
        return $response->count;

      }
    }
    function Get_Customer_Filter_Manager($searchValue,$filter)
    {
      if($filter=='all')
      {

            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',7);
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=7 ";
            $this->db->where($where);
            }
            $query = $this->db->get();
            $response = $query->row();
            return $response->count;
      }
      else if($filter=='Complete')

          {
            
            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',7);
            $this->db->where("Profile_Status",'Complete');

            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=7 ";
            $this->db->where($where);
            }
            $query = $this->db->get();
            $response = $query->row();
            return $response->count;
          }
          else if($filter=='Incomplete')
          {
            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',7);
            $this->db->where("Profile_Status",NULL); 

            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=7 ";
            $this->db->where($where);
            }
            $query = $this->db->get();
            $response = $query->row();
            return $response->count;
          }
          else
          {
            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',7);
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=7 ";
            $this->db->where($where);
            }
            $query = $this->db->get();
            $response = $query->row();
            return $response->count;
          }

    }
     function Get_Customer_With_Page_Manager($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
     {
          if($filter=='all')
          {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',7);
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=7 ";
            $this->db->where($where);
            }
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
                  
            return $response;
          }
          else if($filter=='Incomplete')
          {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',7);
            $this->db->where("Profile_Status",NULL); 

            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=7 ";
            $this->db->where($where);
            }
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
                  
            return $response;
          }
          else if($filter=='Complete')
          {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',7);
            $this->db->where("Profile_Status",'Complete');

            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=7";
            $this->db->where($where);
            }
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
            return $response;
          }
          else
          {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',7);
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=7";
            $this->db->where($where);
            }
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
            return $response;
          }

     }

        
          /*--------------------------------added by priya 5-5-2022 rejected customers Pagination------------------------------>*/
  function Get_Total_No_of_rejectedCustomers()
  {

      $this->db->select('count(*) as count');
      $this->db->from('USER_DETAILS');
      $this->db->where("ROLE", 1);
       $this->db->where("USER_DETAILS.credit_sanction_status",'REJECT'); 
      $this->db->join('internal_loan_application_status', 'internal_loan_application_status.Applicant_ID= USER_DETAILS.UNIQUE_CODE');
      $this->db->order_by("USER_DETAILS.ID", "desc");
      $query = $this->db->get();
      $response = $query->row();
      return $response->count;


            
 
  }
  function Get_rejected_Customer_Filter($searchValue)
  {
           $this->db->select('count(*) as count');
           $this->db->from('USER_DETAILS');
           $this->db->where("ROLE", 1); 
           $this->db->where("USER_DETAILS.credit_sanction_status",'REJECT');
           $this->db->join('internal_loan_application_status', 'internal_loan_application_status.Applicant_ID= USER_DETAILS.UNIQUE_CODE');
                if($searchValue!= '')
                {
                  
                $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=1  AND credit_sanction_status='REJECT'";
                 
             
                $this->db->where($where);
                }
                $query = $this->db->get();
                 $response = $query->row();

                //exit;
                return $response->count;
  }
  function Get_rejected_Customer_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
  {
           $this->db->select('*');
              $this->db->from('USER_DETAILS');
            $this->db->where("ROLE", 1); 
           $this->db->where("USER_DETAILS.credit_sanction_status",'REJECT');
           $this->db->join('internal_loan_application_status', 'internal_loan_application_status.Applicant_ID= USER_DETAILS.UNIQUE_CODE');
                if($searchValue!= '')
                {
                  $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=1  AND credit_sanction_status='REJECT'";
                 
                  $this->db->where($where);
                }

                $this->db->order_by($columnName, $columnSortOrder);
                $this->db->limit($rowperpage,$row);
                $query = $this->db->get();
                $response = $query->result();
                //print_r($this->db->last_query());
                //exit;
                //exit;
                return $response;
  }
//---------------------------for hold reason

function Get_Total_No_of_HoldCustomers()
  {

      $this->db->select('count(*) as count');
      $this->db->from('USER_DETAILS');
      $this->db->where("ROLE", 1);
       $this->db->where("USER_DETAILS.credit_sanction_status",'HOLD'); 
      $this->db->join('internal_loan_application_status', 'internal_loan_application_status.Applicant_ID= USER_DETAILS.UNIQUE_CODE');
      $this->db->order_by("USER_DETAILS.ID", "desc");
      $query = $this->db->get();
      $response = $query->row();
      return $response->count;


            
 
  }
  function Get_Hold_Customer_Filter($searchValue)
  {
           $this->db->select('count(*) as count');
           $this->db->from('USER_DETAILS');
           $this->db->where("ROLE", 1); 
           $this->db->where("USER_DETAILS.credit_sanction_status",'HOLD');
           $this->db->join('internal_loan_application_status', 'internal_loan_application_status.Applicant_ID= USER_DETAILS.UNIQUE_CODE');
                if($searchValue!= '')
                {
                  
                $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=1  AND credit_sanction_status='HOLD'";
                 
             
                $this->db->where($where);
                }
                $query = $this->db->get();
                 $response = $query->row();

                //exit;
                return $response->count;
  }
  function Get_Hold_Customer_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
  {
           $this->db->select('*');
              $this->db->from('USER_DETAILS');
            $this->db->where("ROLE", 1); 
           $this->db->where("USER_DETAILS.credit_sanction_status",'HOLD');
           $this->db->join('internal_loan_application_status', 'internal_loan_application_status.Applicant_ID= USER_DETAILS.UNIQUE_CODE');
                if($searchValue!= '')
                {
                  $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=1  AND credit_sanction_status='HOLD'";
                 
                  $this->db->where($where);
                }

                $this->db->order_by($columnName, $columnSortOrder);
                $this->db->limit($rowperpage,$row);
                $query = $this->db->get();
                $response = $query->result();
                //print_r($this->db->last_query());
                //exit;
                //exit;
                return $response;
  }
  /*--------------------------------added by sonal--5-5-2022--- Technical Pagination------------------------------>*/
      
function Get_Total_No_Customer_Technical()
{
      $this->db->select('count(*) as count');
              $this->db->from('USER_DETAILS');
              $this->db->where('ROLE',19);
              $query = $this->db->get();
          $response = $query->row();
              return $response->count;
              //print_r($this->db->last_query());
              //exit;
}
function Get_Customer_Filter_Technical($searchValue)
{
          $this->db->select('count(*) as count');
              $this->db->from('USER_DETAILS');
              $this->db->where('ROLE',19);
              if($searchValue!= '')
              {
               $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=18 ";
         
              $this->db->where($where);
              }
              $query = $this->db->get();
          $response = $query->row();

              //exit;
              return $response->count;
}
function Get_Customer_With_Page_Technical($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
{
         $this->db->select('*');
              $this->db->from('USER_DETAILS');
             $this->db->where('ROLE',19);
              if($searchValue!= '')
              {
               $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=";
           
               $this->db->where($where);
              }

              $this->db->order_by($columnName, $columnSortOrder);
              $this->db->limit($rowperpage,$row);
              $query = $this->db->get();
              $response = $query->result();
              //print_r($this->db->last_query());
              //exit;
              //exit;
              return $response;
}
/*------------------------------------- Added by papiha on 06_05_2022----------------------------------*/
function Update_Coorporate_bank($data,$id)
	    {
		  $this->db->where('id', $id);
		  return $this->db->update('cooperator',$data);  
		  //print_r($this->db->last_query());
		//exit;
		  
		}
    function  get_corporate_Banks_by_id($id)
    {
      $this->db->select('*');
      $this->db->from('cooperator'); 
      $this->db->where('id',$id);  		
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $row = $query->row();
      return $row;
     
    }
    /*-------------------------------- Addded by papiha on cluster paginatio on 11_05_2022------------------------------------------*/
    function get_cluster_BM($id)
	{
    $array=array();
		$this->db->select('UNIQUE_CODE');
        $this->db->from('USER_DETAILS');
        $this->db->where('CM_ID',$id);
		$this->db->where('ROLE',13);
		$query = $this->db->get();
		$response=$query->result();
		foreach ($response as $value) 
        $array[] = $value->UNIQUE_CODE;
	
        return $array;
	}
	public function get_RO_BM($Branch_manger)
	{
    $array=array();
		$this->db->select('UNIQUE_CODE');
        $this->db->from('USER_DETAILS');

        if(!empty($Branch_manger))
        {
        $this->db->where_in('BM_ID',$Branch_manger);
				$this->db->where('ROLE',14);
      }
		$query = $this->db->get();
		$response=$query->result();
		foreach ($response as $value) 
        $array[] = $value->UNIQUE_CODE;
	    
		return $array;
	}
	public function get_DSA_BM($Branch_manger,$Relationship,$id)
	{
    $array=array();
		$this->db->select('UNIQUE_CODE');
        $this->db->from('USER_DETAILS');

        if(!empty($Branch_manger))
        {
        $this->db->where_in('BM_ID',$Branch_manger);
		$this->db->where('ROLE',2);
  }
  if(!empty($Relationship))
        {
		$this->db->or_where_in('RO_ID',$Relationship);
		$this->db->where('ROLE',2);
  }
  if(!empty($id))
        {
		$this->db->or_where_in('CM_ID',$id);
		$this->db->where('ROLE',2);
  }
		$query = $this->db->get();
		$response=$query->result();
		foreach ($response as $value) 
        $array[] = $value->UNIQUE_CODE;
	    
		return $array;
	}
	public function get_cluster_customer($Branch_manger,$Relationship,$DSA,$id)
	{
    $array=array();
		$this->db->select('UNIQUE_CODE');
        $this->db->from('USER_DETAILS');
        $this->db->where_in('BM_ID',$Branch_manger);
		$this->db->where('ROLE',1);
		$this->db->or_where_in('RO_ID',$Relationship);
		$this->db->where('ROLE',1);
		$this->db->or_where_in('DSA_ID',$DSA);
		$this->db->where('ROLE',1);
		$this->db->or_where_in('CM_ID',$id);
		$this->db->where('ROLE',1);
		
		$query = $this->db->get();
		$response=$query->result();
		foreach ($response as $value) 
        $array[] = $value->UNIQUE_CODE;
	
		return $array;
	}
	
	/*public function get_all_customers_cluster($Branch_manger,$Relationship,$DSA,$id)
	{
		$this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
        $this->db->where_in('BM_ID',$Branch_manger);
		$this->db->where('ROLE',1);
		$this->db->or_where_in('RO_ID',$Relationship);
		$this->db->where('ROLE',1);
		$this->db->or_where_in('DSA_ID',$DSA);
		$this->db->where('ROLE',1);
		$this->db->or_where_in('CM_ID',$id);
		$this->db->where('ROLE',1);
		$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
		$query = $this->db->get();
		$response=$query->row();
		//echo $response->count;
		//exit;
		return $response->count;
		  
	}
	 function get_all_customers_cluster_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue)
     {
		$this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
		 if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
        // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
         $this->db->where($where);
         }
        $this->db->where_in('BM_ID',$Branch_manger);
		$this->db->where('ROLE',1);
		$this->db->or_where_in('RO_ID',$Relationship);
		$this->db->where('ROLE',1);
		$this->db->or_where_in('DSA_ID',$DSA);
		$this->db->where('ROLE',1);
		$this->db->or_where_in('CM_ID',$id);
		$this->db->where('ROLE',1);
		$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
		$query = $this->db->get();
		$response=$query->row();
		//echo $response->count;
		//exit;
		return $response->count; 


    
    
		 
     } 
	  function get_all_customers_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
     {
        
     
      /* $this->db->select('*');
        $this->db->from('USER_DETAILS');
		
        $this->db->where_in('BM_ID',$Branch_manger);
		$this->db->where('ROLE',1);
		if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%'  OR LN like '%".$searchValue."%'";
        // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
         $this->db->where($where);
		 $this->db->where('ROLE',1);
         }
		 
		$this->db->or_where_in('RO_ID',$Relationship);
		$this->db->where('ROLE',1);
		if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%'  OR LN like '%".$searchValue."%'";
        // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
         $this->db->where($where);
		 $this->db->where('ROLE',1);
         }
		 
		$this->db->or_where_in('DSA_ID',$DSA);
		$this->db->where('ROLE',1);
		if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%'  OR LN like '%".$searchValue."%'";
        // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
         $this->db->where($where);
		 $this->db->where('ROLE',1);
         }
		
		$this->db->or_where_in('CM_ID',$id);
		$this->db->where('ROLE',1);
		 if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%'  OR LN like '%".$searchValue."%'";
        // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
         $this->db->where($where);
		 $this->db->where('ROLE',1);
         }
		 
		$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         $this->db->limit($rowperpage,$row);
         $query = $this->db->get();
         $response = $query->result();
       print_r($this->db->last_query());
       exit;
         //exit;
        return $response; */
		/*$this->db->select('*');
        $this->db->from('USER_DETAILS');
		/*$where='';
		 if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
        // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
         
         }*/
   /*     $this->db->where_in('BM_ID',$Branch_manger);
		$this->db->where('ROLE',1);
		if($searchValue!= '')
         {
			 $this->db->like('FN',$searchValue);
		 }
		$this->db->or_where_in('BM_ID',$Branch_manger);
		$this->db->where('ROLE',1);
		if($searchValue!= '')
			{
				$this->db->like('LN',$searchValue);
			}
		$this->db->or_where_in('RO_ID',$Relationship);
		$this->db->where('ROLE',1);
		if($searchValue!= '')
         {
			 $this->db->like('FN',$searchValue);
		 }
		 $this->db->or_where_in('RO_ID',$Relationship);
		$this->db->where('ROLE',1);
		if($searchValue!= '')
         {
			 $this->db->like('LN',$searchValue);
		 }
		
		$this->db->or_where_in('DSA_ID',$DSA);
		$this->db->where('ROLE',1);
		if($searchValue!= '')
         {
			 $this->db->like('FN',$searchValue);
		 }
		 $this->db->or_where_in('DSA_ID',$DSA);
		$this->db->where('ROLE',1);
		if($searchValue!= '')
         {
			 $this->db->like('LN',$searchValue);
		 }
		
		$this->db->or_where_in('CM_ID',$id);
		$this->db->where('ROLE',1);
		if($searchValue!= '')
         {
			 $this->db->like('FN',$searchValue);
		 }
		 $this->db->or_where_in('CM_ID',$id);
		$this->db->where('ROLE',1);
		if($searchValue!= '')
         {
			 $this->db->like('FN',$searchValue);
		 }
		
		$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
    $this->db->limit($rowperpage,$row);
    $this->db->order_by("USER_DETAILS.ID","desc");
		$query = $this->db->get();
		 $response = $query->result();
      return $response;
		
		
     }*/
     	/*-----------------------filter added by sonal on 12-05-2022------------------------------*/
	public function get_all_customers_cluster($Branch_manger,$Relationship,$DSA,$sales_id,$id,$filter)
	{
    if($filter=='all')
    {
		    $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
        if(!empty($Branch_manger))
        {
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',1);
        }
         if(!empty($Relationship))
        {

        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',1);
      }
       if(!empty($DSA))
        {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',1);
      }
       if(!empty($id))
        {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
      }
       if(!empty($sales_id))
        {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
      }
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count;
    }
    else if($filter=='Application_Completed')
    {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      if(!empty($Branch_manger))
        {
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
    }
    if(!empty($Relationship))
        {
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
    }
    if(!empty($DSA))
        {
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
    }
    if(!empty($id))
        {
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
    }
    if(!empty($sales_id))
        {
      $this->db->or_where_in('SELES_ID',$sales_id);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
    }
      $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
    }
    else if($filter=='Application_InCompleted')
    {
        $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
        if(!empty($Branch_manger))
        {
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
      }
      if(!empty($Relationship))
        {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
      }
      if(!empty($DSA))
        {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
      }
      if(!empty($id))
        {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
      }
      if(!empty($sales_id))
        {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
      }
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count;
    }
    else if($filter=='Cam_Completed')
    {
          $this->db->select('count(*)as count');
          $this->db->from('USER_DETAILS');
           if(!empty($Branch_manger))
        {
          $this->db->where_in('BM_ID',$Branch_manger);
        
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
          }
           if(!empty($Relationship))
        {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
        }
         if(!empty($DSA))
        {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
        }
         if(!empty($id))
        {
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',1);
        
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
        }
         if(!empty($sales_id))
        {
          $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
        }
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          $query = $this->db->get();
          $response=$query->row();
          //echo $response->count;
          //exit;
          return $response->count;
    }
    else if($filter=='PD_Completed')
    {
        $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
            if(!empty($Branch_manger))
        {
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
      }
          if(!empty($Relationship))
        {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
      }
          if(!empty($DSA))
        {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
      }
          if(!empty($id))
        {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
      }
          if(!empty($sales_id))
        {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
      }
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count;
    }
   else if($filter=='income_details_complete')
    {
          $this->db->select('count(*)as count');
          $this->db->from('USER_DETAILS');
            if(!empty($Branch_manger))
        {
          $this->db->where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
        }
          if(!empty($Relationship))
        {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
        }
          if(!empty($DSA))
        {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
        }
          if(!empty($id))
        {
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',1);
        
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
      }
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          $query = $this->db->get();
          $response=$query->row();
          //echo $response->count;
          //exit;
          return $response->count;
    }
    else if($filter=='Created')
    {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
        if(!empty($Branch_manger))
        {
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
    }
      if(!empty($Relationship))
        {
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
    }  if(!empty($DSA))
        {
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
    }
      if(!empty($id))
        {
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',1);
    
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
    }
      if(!empty($sales_id))
        {
      $this->db->or_where_in('SELES_ID',$sales_id);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
    }
      $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
    }
    else if($filter=='reject')
    {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      if(!empty($Branch_manger))
        {
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
    }
    if(!empty($Relationship))
        {
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
    }
    if(!empty($DSA))
        {
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
    }
    if(!empty($id))
        {
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',1);
    
      $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
    }
    if(!empty($sales_id))
        {
      $this->db->or_where_in('SELES_ID',$sales_id);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
    }
      $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
    }
    /*-----------------------------added by sonal on 21-05-2022------------------------------------------*/
    else if($filter=='Hold')
    {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      if(!empty($Branch_manger))
        {
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
    }
    if(!empty($Relationship))
        {
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
    }
    if(!empty($DSA))
        {
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
    }
    if(!empty($id))
        {
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',1);
    
      $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
    }
  
      $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
    }
      else if($filter=='Continue')
      {
        $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
         if(!empty($Branch_manger))
        {
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',1);
        $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
      }
       if(!empty($Relationship))
        {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',1);
        $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
      }
       if(!empty($DSA))
        {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',1);
        $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
      }
       if(!empty($id))
        {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
      
        $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
      }
    
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count;
    }
    else
    {
        $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
         if(!empty($Branch_manger))
        {
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',1);
      }
       if(!empty($Relationship))
        {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',1);
      }
       if(!empty($DSA))
        {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',1);
      }
       if(!empty($id))
        {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
      }
       if(!empty($sales_id))
        {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
      }
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count;
    }


		  
	}
	 function get_all_customers_cluster_filter($Branch_manger,$Relationship,$DSA,$sales_id,$id,$searchValue,$filter)
     {
         if($filter=='all')
         {
		          $this->db->select('count(*)as count');
              $this->db->from('USER_DETAILS');
		          if($searchValue!= '')
              {
              $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
              // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
              $this->db->where($where);
              }

               if(!empty($Branch_manger))
             {
              $this->db->where_in('BM_ID',$Branch_manger);
              $this->db->where('ROLE',1);
            }
             if(!empty($Relationship))
        {
              $this->db->or_where_in('RO_ID',$Relationship);
              $this->db->where('ROLE',1);
            }
             if(!empty($DSA))
        {
              $this->db->or_where_in('DSA_ID',$DSA);
              $this->db->where('ROLE',1);
            }
             if(!empty($id))
        {
              $this->db->or_where_in('CM_ID',$id);
              $this->db->where('ROLE',1);
            }
             if(!empty($sales_id))
        {
              $this->db->or_where_in('SELES_ID',$sales_id);
              $this->db->where('ROLE',1);
              }
              $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
              $query = $this->db->get();
              $response=$query->row();
              //echo $response->count;
              //exit;
              return $response->count; 

      } 
      else if($filter=='Application_Completed')
      {
              $this->db->select('count(*)as count');
              $this->db->from('USER_DETAILS');
              if($searchValue!= '')
              {
              $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
              // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
              $this->db->where($where);
              }
                 if(!empty($Branch_manger))
              {

              $this->db->where_in('BM_ID',$Branch_manger);
              $this->db->where('ROLE',1);
              $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
            }  

               if(!empty($Relationship))
            {
             
              $this->db->or_where_in('RO_ID',$Relationship);
              $this->db->where('ROLE',1);
              $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
             }

                if(!empty($DSA))
              {
              $this->db->or_where_in('DSA_ID',$DSA);
              $this->db->where('ROLE',1);
              $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
            }
               if(!empty($id))
            {
             
              $this->db->or_where_in('CM_ID',$id);
              $this->db->where('ROLE',1);
              $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
            }
               if(!empty($sales_id))
        {
              $this->db->or_where_in('SELES_ID',$sales_id);
              $this->db->where('ROLE',1);
              $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
            }

              
              $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
              $query = $this->db->get();
              $response=$query->row();
              //echo $response->count;
              //exit;
              return $response->count; 
        }
        else if($filter=='Application_InCompleted')
        {
              $this->db->select('count(*)as count');
              $this->db->from('USER_DETAILS');
              if($searchValue!= '')
              {
              $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
              // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
              $this->db->where($where);
              }
            if(!empty($Branch_manger))
            {
              $this->db->where_in('BM_ID',$Branch_manger);
              $this->db->where('ROLE',1);
              $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
            }
            if(!empty($Relationship))
            {
              $this->db->or_where_in('RO_ID',$Relationship);
              $this->db->where('ROLE',1);
              $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
             }
             if(!empty($DSA))
             {
              $this->db->or_where_in('DSA_ID',$DSA);
              $this->db->where('ROLE',1);
              $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
            }
             if(!empty($id))
             {
              $this->db->or_where_in('CM_ID',$id);
              $this->db->where('ROLE',1);
              $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
              }
              if(!empty($sales_id))
              {
              $this->db->or_where_in('SELES_ID',$sales_id);;
              $this->db->where('ROLE',1);
              $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
              }

              $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
              $query = $this->db->get();
              $response=$query->row();
              //echo $response->count;
              //exit;
              return $response->count; 
        }
    else if($filter=='Cam_Completed')
    {
              $this->db->select('count(*)as count');
              $this->db->from('USER_DETAILS');
              if($searchValue!= '')
              {
              $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
              // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
              $this->db->where($where);
              }
               if(!empty($Branch_manger))
              {

              $this->db->where_in('BM_ID',$Branch_manger);
              $this->db->where('ROLE',1);
              $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
            }
             if(!empty($Relationship))
              {
              $this->db->or_where_in('RO_ID',$Relationship);
              $this->db->where('ROLE',1);
              $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
            }
             if(!empty($DSA))
              {
              $this->db->or_where_in('DSA_ID',$DSA);
              $this->db->where('ROLE',1);
              $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
            }
             if(!empty($id))
              {
              $this->db->or_where_in('CM_ID',$id);
              $this->db->where('ROLE',1);
              $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
            }
             if(!empty($sales_id))
              {
              $this->db->or_where_in('SELES_ID',$sales_id);;
              $this->db->where('ROLE',1);
              $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Cam details complete');
            }
              $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
              $query = $this->db->get();
              $response=$query->row();
              //echo $response->count;
              //exit;
              return $response->count; 
    }
    else if($filter=='PD_Completed')
    {
            $this->db->select('count(*)as count');
            $this->db->from('USER_DETAILS');
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
            // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
            $this->db->where($where);
            }
            if(!empty($Branch_manger))
              {
            $this->db->where_in('BM_ID',$Branch_manger);
            $this->db->where('ROLE',1);
            $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
          }
          if(!empty($Relationship))
              {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',1);
            $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
          }
          if(!empty($DSA))
              {
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',1);
            $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
          }
          if(!empty($id))
              {
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',1);
            $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
          }
          if(!empty($sales_id))
              {
            $this->db->or_where_in('SELES_ID',$sales_id);;
            $this->db->where('ROLE',1);
            $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','PD Completed');
          }
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $query = $this->db->get();
            $response=$query->row();
            //echo $response->count;
            //exit;
            return $response->count; 
    }
    else if($filter=='income_details_complete')
    {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      if($searchValue!= '')
      {
      $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
      // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
      $this->db->where($where);
      }

       if(!empty($Branch_manger))
              {
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
    }
     if(!empty($Relationship))
              {
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
    }
     if(!empty($DSA))
              {
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
    }
     if(!empty($id))
              {
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
    }
      $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count; 
    }
    else if($filter=='Created')
    {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      if($searchValue!= '')
      {
      $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
      // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
      $this->db->where($where);
      }
       if(!empty($Branch_manger))
              {
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
    }
     if(!empty($Relationship))
              {
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
    }
     if(!empty($DSA))
              {
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
    }
     if(!empty($id))
              {
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
    }
     if(!empty($sales_id))
              {
      $this->db->or_where_in('SELES_ID',$sales_id);;
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Created');
    }
      $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count; 
    }
    else if($filter=='reject')
    {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      if($searchValue!= '')
      {
      $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
      // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
      $this->db->where($where);
      }
      if(!empty($Branch_manger))
              {
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
    }
    if(!empty($Relationship))
              {
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
    }
    if(!empty($DSA))
              {
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
    }
    if(!empty($id))
              {
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
    }
    if(!empty($sales_id))
    {
      $this->db->or_where_in('SELES_ID',$sales_id);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
    }
      $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();         

      //echo $response->count;
      //exit;
      return $response->count;
    }
     //added by 21-05-2022
     else if($filter=='Hold')
     {
       $this->db->select('count(*)as count');
       $this->db->from('USER_DETAILS');
     
               $this->db->where('ROLE',1);
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
       // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
       $this->db->where($where);
       }
          if(!empty($Branch_manger))
    {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
     }
        if(!empty($Relationship))
    {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
     }
        if(!empty($DSA))
    {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
     }
        if(!empty($id))
    {
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
     }
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
       return $response->count;
     }
     else if($filter=='Continue')
     {
       $this->db->select('count(*)as count');
       $this->db->from('USER_DETAILS');
      
               $this->db->where('ROLE',1);
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
       // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
       $this->db->where($where);
       }
          if(!empty($Branch_manger))
    {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
     }
        if(!empty($Relationship))
    {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
     }
        if(!empty($DSA))
    {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
     }
        if(!empty($id))
    {
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
     }
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
       return $response->count;
     }
    else
    {
            $this->db->select('count(*)as count');
            $this->db->from('USER_DETAILS');
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
            // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
            $this->db->where($where);
            }
               if(!empty($Branch_manger))
    {
            $this->db->where_in('BM_ID',$Branch_manger);
            $this->db->where('ROLE',1);
          }
             if(!empty($Relationship))
    {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',1);
          }
             if(!empty($DSA))
    {
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',1);
          }
             if(!empty($id))
    {
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',1);
          }
             if(!empty($sales_id))
    {
            $this->db->or_where_in('SELES_ID',$sales_id);;
            $this->db->where('ROLE',1);
          }
           
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');

            $query = $this->db->get();
            $response=$query->row();
            //echo $response->count;
            //exit;
            return $response->count; 

    }
     } 
	  function get_all_customers_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$sales_id,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
     {
      if($filter=='all')
      {
	      	$this->db->select('*');
          $this->db->from('USER_DETAILS');
         if(!empty($Branch_manger))
    {
          $this->db->where_in('BM_ID',$Branch_manger);
		      $this->db->where('ROLE',1);
		      if($searchValue!= '')
          {
			    $this->db->like('FN',$searchValue);
		      }
        }
                      if(!empty($Branch_manger))
    {
		      $this->db->or_where_in('BM_ID',$Branch_manger);
		      $this->db->where('ROLE',1);
	      	if($searchValue!= '')
		    	{
				     $this->db->like('LN',$searchValue);
			    }
        }
                      if(!empty($Relationship))
    {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',1);
          if($searchValue!= '')
          {
			     $this->db->like('FN',$searchValue);
          }
        }
                      if(!empty($Relationship))
    {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',1);
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
        }
                      if(!empty($DSA))
    {
		
		      $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
          if($searchValue!= '')
          {
			    $this->db->like('FN',$searchValue);
		      }
        }
                      if(!empty($DSA))
    {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
		      }
		}
                  if(!empty($id))
    {
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',1);
          if($searchValue!= '')
         {
			   $this->db->like('FN',$searchValue);
		     }
       }
                     if(!empty($id))
    {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
        if($searchValue!= '')
        {
			     $this->db->like('FN',$searchValue);
		    }
      }
                    if(!empty($sales_id))
    {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        if($searchValue!= '')
        {
			     $this->db->like('FN',$searchValue);
		    }
		}
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $this->db->limit($rowperpage,$row);
        $this->db->order_by("USER_DETAILS.ID","desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }
        else if($filter=='Application_Completed')
        {
		
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
                            if(!empty($Branch_manger))
    {
          $this->db->where_in('BM_ID',$Branch_manger);
		      $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');

		      if($searchValue!= '')
          {
			    $this->db->like('FN',$searchValue);
		      }

        }
        if(!empty($Branch_manger))
        {
		      $this->db->or_where_in('BM_ID',$Branch_manger);
		      $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
         
	      	if($searchValue!= '')
		    	{
				     $this->db->like('LN',$searchValue);
			    }
        }
        if(!empty($Relationship))
        {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
          if($searchValue!= '')
          {
			     $this->db->like('FN',$searchValue);
          }
        }
         if(!empty($Relationship))
        {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
		}
        if(!empty($DSA))
         {
		      $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
          
          if($searchValue!= '')
          {
			    $this->db->like('FN',$searchValue);
		      }
        }
        if(!empty($DSA))
        {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
         
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
		      }
        }
        if(!empty($id))
        {
		
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
          if($searchValue!= '')
           {
  			   $this->db->like('FN',$searchValue);
  		     }
       }
        if(!empty($id))
        {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
        if($searchValue!= '')
        {
			     $this->db->like('FN',$searchValue);
		    }
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
	      }
		}
         if(!empty($id))
    {
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
         
          if($searchValue!= '')
         {
			   $this->db->like('FN',$searchValue);
		     }
       }
        if(!empty($id))
        {
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
          if($searchValue!= '')
            {
    			     $this->db->like('FN',$searchValue);
    		    }
            if($searchValue!= '')
            {
              $this->db->like('LN',$searchValue);
            }
        }
        if(!empty($sales_id))
        {
           $this->db->or_where_in('SELES_ID',$sales_id);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
           if($searchValue!= '')
          {
            $this->db->like('FN',$searchValue);
          }
         }
        if(!empty($sales_id))
      {
          $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
          if($searchValue!= '')
          {
            $this->db->like('FN',$searchValue);
          }
      }

       
		
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $this->db->limit($rowperpage,$row);
        $this->db->order_by("USER_DETAILS.ID","desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
     }
     else if($filter=='Application_InCompleted')
     {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          if(!empty($Branch_manger))
          {
          $this->db->where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
             
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
        }
        if(!empty($Branch_manger))
      {
          $this->db->or_where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
           
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
        }
        if(!empty($Relationship))
      {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
            
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
        }
        if(!empty($Relationship))
      {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
              
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
        }
        if(!empty($DSA))
      {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
              
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
        }
        if(!empty($DSA))
      {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
            
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
        }
        if(!empty($id))
      {
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
             
          if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
      }
      if(!empty($id))
      {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');

          
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
        }

        if(!empty($sales_id))
      {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
           
        if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
    }
    if(!empty($sales_id))
      {
      $this->db->or_where_in('SELES_ID',$sales_id);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
       
        if($searchValue!= '')
        {
          $this->db->like('FN',$searchValue);
        }
       }


        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $this->db->limit($rowperpage,$row);
        $this->db->order_by("USER_DETAILS.ID","desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
     }
     else if($filter=='Cam_Completed')
     {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
            if(!empty($Branch_manger))
      {
          $this->db->where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
        }
          if(!empty($Branch_manger))
      {
          $this->db->or_where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
        }
          if(!empty($Relationship))
      {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
        }
          if(!empty($Relationship))
      {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
}
  if(!empty($DSA))
      {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
        }
          if(!empty($DSA))
      {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
}
  if(!empty($id))
      {
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
          if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
      }
        if(!empty($id))
      {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
      }
        if(!empty($sales_id))
      {

        $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
          if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
      }
        if(!empty($sales_id))
      {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
        }
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $this->db->limit($rowperpage,$row);
        $this->db->order_by("USER_DETAILS.ID","desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
     }

     /*else if($filter=='PD_Completed')
     {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
         
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
          $this->db->or_where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');

          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');

          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }

          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');

          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');

          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }

          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');

          if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');


        $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');

          if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $this->db->limit($rowperpage,$row);
        $this->db->order_by("USER_DETAILS.ID","desc");
        
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }*/
      else if($filter=='PD_Completed')
      {
           $this->db->select('*');
           $this->db->from('USER_DETAILS');
           if(!empty($Branch_manger))
           {
           $this->db->where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','PD Completed');
              
           if($searchValue!= '')
           {
           $this->db->like('FN',$searchValue);
           }
         }
         if(!empty($Branch_manger))
       {
           $this->db->or_where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','PD Completed');
            
           if($searchValue!= '')
           {
             $this->db->like('LN',$searchValue);
           }
         }
         if(!empty($Relationship))
       {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','PD Completed');
             
           if($searchValue!= '')
           {
           $this->db->like('FN',$searchValue);
           }
         }
         if(!empty($Relationship))
       {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','PD Completed');
               
           if($searchValue!= '')
           {
             $this->db->like('LN',$searchValue);
           }
         }
         if(!empty($DSA))
       {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','PD Completed');
               
           if($searchValue!= '')
           {
           $this->db->like('FN',$searchValue);
           }
         }
         if(!empty($DSA))
       {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','PD Completed');
             
           if($searchValue!= '')
           {
             $this->db->like('LN',$searchValue);
           }
         }
         if(!empty($id))
       {
           $this->db->or_where_in('CM_ID',$id);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','PD Completed');
              
           if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
       }
       if(!empty($id))
       {
         $this->db->or_where_in('CM_ID',$id);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','PD Completed');
 
           
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
         }
 
         if(!empty($sales_id))
       {
         $this->db->or_where_in('SELES_ID',$sales_id);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','PD Completed');
            
         if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
      }
      if(!empty($sales_id))
       {
         $this->db->or_where_in('SELES_ID',$sales_id);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','PD Completed');
            
         if($searchValue!= '')
       {
       $this->db->like('LN',$searchValue);
       }
      }
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID","desc");
       $query = $this->db->get();
       $response = $query->result();
       //print_r($this->db->last_query());
        //exit;
       return $response;
    
  }
    
     
      /*else if($filter=='income_details_complete')
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
      
        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }

        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }

        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');

        if($searchValue!= '')
        {
          $this->db->like('FN',$searchValue);
        }
      

      
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $this->db->limit($rowperpage,$row);
        $this->db->order_by("USER_DETAILS.ID","desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }*/
      else if($filter=='income_details_complete')
      {
           $this->db->select('*');
           $this->db->from('USER_DETAILS');
           if(!empty($Branch_manger))
           {
           $this->db->where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','income details complete');
              
           if($searchValue!= '')
           {
           $this->db->like('FN',$searchValue);
           }
         }
         if(!empty($Branch_manger))
       {
           $this->db->or_where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','income details complete');
            
           if($searchValue!= '')
           {
             $this->db->like('LN',$searchValue);
           }
         }
         if(!empty($Relationship))
       {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','income details complete');
             
           if($searchValue!= '')
           {
           $this->db->like('FN',$searchValue);
           }
         }
         if(!empty($Relationship))
       {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','income details complete');
               
           if($searchValue!= '')
           {
             $this->db->like('LN',$searchValue);
           }
         }
         if(!empty($DSA))
       {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','income details complete');
               
           if($searchValue!= '')
           {
           $this->db->like('FN',$searchValue);
           }
         }
         if(!empty($DSA))
       {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','income details complete');
             
           if($searchValue!= '')
           {
             $this->db->like('LN',$searchValue);
           }
         }
         if(!empty($id))
       {
           $this->db->or_where_in('CM_ID',$id);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','income details complete');
              
           if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
       }
       if(!empty($id))
       {
         $this->db->or_where_in('CM_ID',$id);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','income details complete');
 
           
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
         }
 
         if(!empty($sales_id))
       {
         $this->db->or_where_in('SELES_ID',$sales_id);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','income details complete');
            
         if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
      }
      if(!empty($sales_id))
      {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','income details complete');
           
        if($searchValue!= '')
      {
      $this->db->like('LN',$searchValue);
      }
     }
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID","desc");
       $query = $this->db->get();
       $response = $query->result();
       //print_r($this->db->last_query());
        //exit;
       return $response;
    
  }
      /*else if($filter=='Created')
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
      
        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }

        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }

        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');

        if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');

          if($searchValue!= '')
          {
            $this->db->like('FN',$searchValue);
          }
          

          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }

          $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');

          if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');

        if($searchValue!= '')
        {
          $this->db->like('FN',$searchValue);
        }

        
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          $this->db->limit($rowperpage,$row);
          $this->db->order_by("USER_DETAILS.ID","desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
          }
          else if($filter=='reject')
          {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where_in('BM_ID',$Branch_manger);
            $this->db->where('ROLE',1);
            $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
          
            if($searchValue!= '')
            {
            $this->db->like('FN',$searchValue);
            }
            $this->db->or_where_in('BM_ID',$Branch_manger);
            $this->db->where('ROLE',1);
            $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');

            if($searchValue!= '')
            {
              $this->db->like('LN',$searchValue);
            }
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',1);
            $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');

            if($searchValue!= '')
            {
            $this->db->like('FN',$searchValue);
            }
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',1);
            $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');

            if($searchValue!= '')
            {
              $this->db->like('LN',$searchValue);
            }

            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',1);
            $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');

            if($searchValue!= '')
            {
            $this->db->like('FN',$searchValue);
            }
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',1);
            $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');

            if($searchValue!= '')
            {
              $this->db->like('LN',$searchValue);
            }

            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',1);
            $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');

            if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',1);
          $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');

          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
          
          $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',1);
          $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');

          if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }

        
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          $this->db->limit($rowperpage,$row);
          $this->db->order_by("USER_DETAILS.ID","desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
      }*/
      else if($filter=='Created')
      {
           $this->db->select('*');
           $this->db->from('USER_DETAILS');
           if(!empty($Branch_manger))
           {
           $this->db->where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Created');
              
           if($searchValue!= '')
           {
           $this->db->like('FN',$searchValue);
           }
         }
         if(!empty($Branch_manger))
       {
           $this->db->or_where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Created');
            
           if($searchValue!= '')
           {
             $this->db->like('LN',$searchValue);
           }
         }
         if(!empty($Relationship))
       {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Created');
             
           if($searchValue!= '')
           {
           $this->db->like('FN',$searchValue);
           }
         }
         if(!empty($Relationship))
       {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Created');
               
           if($searchValue!= '')
           {
             $this->db->like('LN',$searchValue);
           }
         }
         if(!empty($DSA))
       {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Created');
               
           if($searchValue!= '')
           {
           $this->db->like('FN',$searchValue);
           }
         }
         if(!empty($DSA))
       {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Created');
             
           if($searchValue!= '')
           {
             $this->db->like('LN',$searchValue);
           }
         }
         if(!empty($id))
       {
           $this->db->or_where_in('CM_ID',$id);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Created');
              
           if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
       }
       if(!empty($id))
       {
         $this->db->or_where_in('CM_ID',$id);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Created');
 
           
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
         }
 
         if(!empty($sales_id))
       {
         $this->db->or_where_in('SELES_ID',$sales_id);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Created');
            
         if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
      }
      if(!empty($sales_id))
       {
         $this->db->or_where_in('SELES_ID',$sales_id);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Created');
            
         if($searchValue!= '')
       {
       $this->db->like('LN',$searchValue);
       }
      }
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID","desc");
       $query = $this->db->get();
       $response = $query->result();
       //print_r($this->db->last_query());
        //exit;
       return $response;
    
  }
       //added by sonal on 21-05-2022

      /* else if($filter=='Hold')
       {
         $this->db->select('*');
         $this->db->from('USER_DETAILS');
       
               $this->db->where('ROLE',1);
         $this->db->where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',1);
         $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
       
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',1);
         $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
 
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',1);
         $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
 
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',1);
         $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
 
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
 
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',1);
         $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
 
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',1);
         $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
 
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
 
         $this->db->or_where_in('CM_ID',$id);
         $this->db->where('ROLE',1);
         $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
 
            if($searchValue!= '')
            {
            $this->db->like('FN',$searchValue);
            }
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',1);
            $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
      
            if($searchValue!= '')
            {
              $this->db->like('LN',$searchValue);
            }
            
      
          
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->limit($rowperpage,$row);
            $this->db->order_by("USER_DETAILS.ID","desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
      }*/
      else if($filter=='Hold')
      {
           $this->db->select('*');
           $this->db->from('USER_DETAILS');
           if(!empty($Branch_manger))
           {
           $this->db->where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Hold');
              
           if($searchValue!= '')
           {
           $this->db->like('FN',$searchValue);
           }
         }
         if(!empty($Branch_manger))
       {
           $this->db->or_where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Hold');
            
           if($searchValue!= '')
           {
             $this->db->like('LN',$searchValue);
           }
         }
         if(!empty($Relationship))
       {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Hold');
             
           if($searchValue!= '')
           {
           $this->db->like('FN',$searchValue);
           }
         }
         if(!empty($Relationship))
       {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Hold');
               
           if($searchValue!= '')
           {
             $this->db->like('LN',$searchValue);
           }
         }
         if(!empty($DSA))
       {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Hold');
               
           if($searchValue!= '')
           {
           $this->db->like('FN',$searchValue);
           }
         }
         if(!empty($DSA))
       {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Hold');
             
           if($searchValue!= '')
           {
             $this->db->like('LN',$searchValue);
           }
         }
         if(!empty($id))
       {
           $this->db->or_where_in('CM_ID',$id);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Hold');
              
           if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
       }
       if(!empty($id))
       {
         $this->db->or_where_in('CM_ID',$id);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Hold');
 
           
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
         }
 
         if(!empty($sales_id))
       {
         $this->db->or_where_in('SELES_ID',$sales_id);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Hold');
            
         if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
      }
      if(!empty($sales_id))
      {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS=','Hold');
           
        if($searchValue!= '')
      {
      $this->db->like('LN',$searchValue);
      }
     }
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID","desc");
       $query = $this->db->get();
       $response = $query->result();
       //print_r($this->db->last_query());
        //exit;
       return $response;
    
  }
  else if($filter=='reject')
  {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       if(!empty($Branch_manger))
       {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status=','REJECT');
          
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
     if(!empty($Branch_manger))
   {
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status=','REJECT');
        
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
     }
     if(!empty($Relationship))
   {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status=','REJECT');
         
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
     if(!empty($Relationship))
   {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status=','REJECT');
           
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
     }
     if(!empty($DSA))
   {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status=','REJECT');
           
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
     if(!empty($DSA))
   {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status=','REJECT');
         
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
     }
     if(!empty($id))
   {
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status=','REJECT');
          
       if($searchValue!= '')
     {
     $this->db->like('FN',$searchValue);
     }
   }
   if(!empty($id))
   {
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',1);
     $this->db->where('USER_DETAILS.credit_sanction_status=','REJECT');

       
     if($searchValue!= '')
     {
       $this->db->like('LN',$searchValue);
     }
     }

     if(!empty($sales_id))
   {
     $this->db->or_where_in('SELES_ID',$sales_id);
     $this->db->where('ROLE',1);
     $this->db->where('USER_DETAILS.credit_sanction_status=','REJECT');
        
     if($searchValue!= '')
   {
   $this->db->like('FN',$searchValue);
   }
  }
  if(!empty($sales_id))
  {
    $this->db->or_where_in('SELES_ID',$sales_id);
    $this->db->where('ROLE',1);
    $this->db->where('USER_DETAILS.credit_sanction_status=','REJECT');
       
    if($searchValue!= '')
  {
  $this->db->like('LN',$searchValue);
  }
 }
  
   $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $this->db->limit($rowperpage,$row);
   $this->db->order_by("USER_DETAILS.ID","desc");
   $query = $this->db->get();
   $response = $query->result();
   //print_r($this->db->last_query());
    //exit;
   return $response;

}
  
            else if($filter=='Continue')
            {
              $this->db->select('*');
              $this->db->from('USER_DETAILS');
              
                    $this->db->where('ROLE',1);
              $this->db->where_in('BM_ID',$Branch_manger);
              $this->db->where('ROLE',1);
              $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
            
              if($searchValue!= '')
              {
              $this->db->like('FN',$searchValue);
              }
              $this->db->or_where_in('BM_ID',$Branch_manger);
              $this->db->where('ROLE',1);
              $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
      
              if($searchValue!= '')
              {
                $this->db->like('LN',$searchValue);
              }
              $this->db->or_where_in('RO_ID',$Relationship);
              $this->db->where('ROLE',1);
              $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
      
              if($searchValue!= '')
              {
              $this->db->like('FN',$searchValue);
              }
              $this->db->or_where_in('RO_ID',$Relationship);
              $this->db->where('ROLE',1);
              $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
      
              if($searchValue!= '')
              {
                $this->db->like('LN',$searchValue);
              }
      
              $this->db->or_where_in('DSA_ID',$DSA);
              $this->db->where('ROLE',1);
              $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
      
              if($searchValue!= '')
              {
              $this->db->like('FN',$searchValue);
              }
              $this->db->or_where_in('DSA_ID',$DSA);
              $this->db->where('ROLE',1);
              $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
      
              if($searchValue!= '')
              {
                $this->db->like('LN',$searchValue);
              }
      
              $this->db->or_where_in('CM_ID',$id);
              $this->db->where('ROLE',1);
              $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
      
              if($searchValue!= '')
            {
            $this->db->like('FN',$searchValue);
            }
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',1);
            $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
      
            if($searchValue!= '')
            {
              $this->db->like('LN',$searchValue);
            }
            
      
          
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->limit($rowperpage,$row);
            $this->db->order_by("USER_DETAILS.ID","desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
      }
      else
      {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where_in('BM_ID',$Branch_manger);
            $this->db->where('ROLE',1);
            if($searchValue!= '')
            {
            $this->db->like('FN',$searchValue);
            }
            $this->db->or_where_in('BM_ID',$Branch_manger);
            $this->db->where('ROLE',1);
            if($searchValue!= '')
            {
              $this->db->like('LN',$searchValue);
            }
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',1);
            if($searchValue!= '')
            {
            $this->db->like('FN',$searchValue);
            }
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',1);
            if($searchValue!= '')
            {
              $this->db->like('LN',$searchValue);
            }

            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',1);
            if($searchValue!= '')
            {
            $this->db->like('FN',$searchValue);
            }
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',1);
            if($searchValue!= '')
            {
              $this->db->like('LN',$searchValue);
            }

            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',1);
            if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',1);
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
           
          
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',1);
            if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',1);
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }


          
          $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',1);
          if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          $this->db->limit($rowperpage,$row);
          $this->db->order_by("USER_DETAILS.ID","desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
      }
	
}
	//---------------------------for Revert reason

function Get_Total_No_of_REVERTCustomers($id)
  {

   
      if($id != 12345678)

    {

      $this->db->select('count(*) as count');
      $this->db->from('USER_DETAILS');
      $this->db->where("ROLE", 1);
      $this->db->where("USER_DETAILS.DSA_ID",$id);
      $this->db->where("USER_DETAILS.credit_sanction_status",'REVERT'); 
      $this->db->join('internal_loan_application_status', 'internal_loan_application_status.Applicant_ID= USER_DETAILS.UNIQUE_CODE');
      $this->db->order_by("USER_DETAILS.ID", "desc");
      $query = $this->db->get();
      $response = $query->row();
      return $response->count;
    }
    else
    {
      $this->db->select('count(*) as count');
      $this->db->from('USER_DETAILS');
      $this->db->where("ROLE", 1);
      $this->db->where("USER_DETAILS.credit_sanction_status",'REVERT'); 
      $this->db->join('internal_loan_application_status', 'internal_loan_application_status.Applicant_ID= USER_DETAILS.UNIQUE_CODE');
      $this->db->order_by("USER_DETAILS.ID", "desc");
      $query = $this->db->get();
      $response = $query->row();
      return $response->count;
    }


            
 
  }
  function Get_REVERT_Customer_Filter($searchValue,$id)
  {
  
      if($id != 12345678)

    {
           $this->db->select('count(*) as count');
           $this->db->from('USER_DETAILS');
           $this->db->where("ROLE", 1); 
          $this->db->where("USER_DETAILS.DSA_ID",$id);
           $this->db->where("USER_DETAILS.credit_sanction_status",'REVERT');
          
           $this->db->join('internal_loan_application_status', 'internal_loan_application_status.Applicant_ID= USER_DETAILS.UNIQUE_CODE');
                if($searchValue!= '')
                {
                $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=1  AND credit_sanction_status='REVERT'";
                $this->db->where($where);
                }
                $query = $this->db->get();
                 $response = $query->row();

                //exit;
                return $response->count;
              }
              else
              {
                    $this->db->select('count(*) as count');
           $this->db->from('USER_DETAILS');
           $this->db->where("ROLE", 1); 
        
           $this->db->where("USER_DETAILS.credit_sanction_status",'REVERT');
          
           $this->db->join('internal_loan_application_status', 'internal_loan_application_status.Applicant_ID= USER_DETAILS.UNIQUE_CODE');
                if($searchValue!= '')
                {
                $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=1  AND credit_sanction_status='REVERT'";
                $this->db->where($where);
                }
                $query = $this->db->get();
                 $response = $query->row();

                //exit;
                return $response->count;
              }
  }
  function Get_REVERT_Customer_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$id)
  {
      if($id != 12345678)
    {
           $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where("ROLE", 1); 
                 $this->db->where("USER_DETAILS.DSA_ID",$id); 
           $this->db->where("USER_DETAILS.credit_sanction_status",'REVERT');
     
           $this->db->join('internal_loan_application_status', 'internal_loan_application_status.Applicant_ID= USER_DETAILS.UNIQUE_CODE');
                if($searchValue!= '')
                {
                  $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=1  AND credit_sanction_status='REVERT'";
                 
                  $this->db->where($where);
                }

                $this->db->order_by($columnName, $columnSortOrder);
                $this->db->limit($rowperpage,$row);
                $query = $this->db->get();
                $response = $query->result();
                //print_r($this->db->last_query());
                //exit;
                //exit;
                return $response;
              }
              else
              {
                 $this->db->select('*');
              $this->db->from('USER_DETAILS');
            $this->db->where("ROLE", 1); 
         
           $this->db->where("USER_DETAILS.credit_sanction_status",'REVERT');
     
           $this->db->join('internal_loan_application_status', 'internal_loan_application_status.Applicant_ID= USER_DETAILS.UNIQUE_CODE');
                if($searchValue!= '')
                {
                  $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=1  AND credit_sanction_status='REVERT'";
                 
                  $this->db->where($where);
                }

                $this->db->order_by($columnName, $columnSortOrder);
                $this->db->limit($rowperpage,$row);
                $query = $this->db->get();
                $response = $query->result();
                //print_r($this->db->last_query());
                //exit;
                //exit;
                return $response;
              }
  }

  //----------------------------------added by priua 2022
  function get_pages_for_revert($Customer_ID){
      $response = array();
      $this->db->select('*');
      $this->db->where('Customer_ID',$Customer_ID);
      $q = $this->db->from('table_customer_revert_pages');
      $response = $q->get()->result();
      return $response;
   }
   /*----------------------- Added by papiha on 06_05_2022----------------------------------*/
	function Get_bank_id($id)
	{
		$this->db->select('*');
        $this->db->from('CUSTOMER_APPLIED_LOANS');
        $this->db->where('CUST_ID',$id);
		$query = $this->db->get();
		$response=$query->row();
		$bank_id=$response->bank_id;
    // print_r($this->db->last_query());
      //exit;
		return $bank_id;
	}
	function Get_Login_fees($bank_id)
	{
		$this->db->select('*');
        $this->db->from('cooperator');
        $this->db->where('id','1');
		$query = $this->db->get();
		$response=$query->row();
		$Login_fees=$response->Login_fees_in_rs;
		$data=array('Login_fees'=>$Login_fees,
		             'Login_fees_required'=>$response->Login_fees_required
		);
		
		return $data;
	}
	/*--------------------- Added by papiha on 07_05_2022----------------------------------------*/
	 function Savepayment_details($data){
        $this->db->insert('online_login_fees',$data);
      return $this->db->insert_id();
    }
	function get_payment_deteils($cust_id)
	{
		$this->db->select('*');
        $this->db->from('online_login_fees');
        $this->db->where('Cust_id',$cust_id);
		$query = $this->db->get();
		$response=$query->row();
		return $response;
	}
	/*---------------------- Addede by papiha on 09_05_2022-------------------------------------------*/
	function Savepayment_details_offline($data)
	{
		$this->db->insert('offline_login_fees',$data);
      return $this->db->insert_id();
	}
	function get_payment_deteils_offline($cust_id)
	{
		$this->db->select('*');
        $this->db->from('offline_login_fees');
        $this->db->where('Cust_id',$cust_id);
		$query = $this->db->get();
		$response=$query->row();
      
		return $response;
	}
  function get_all_RO()
	{
		$this->db->select('FN,LN,UNIQUE_CODE');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE','14');
		$query = $this->db->get();
		$response = $query->result();
		return $response;
	}
  function get_all_BM()
	{
		$this->db->select('FN,LN,UNIQUE_CODE');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE','13');
		$query = $this->db->get();
		$response = $query->result();
		return $response;
	}
  function getDocuments_cheque($id)
	{
		$this->db->select('*');
        $this->db->from('DOCUMENTS');
        $this->db->where('USER_ID',$id);
		 $this->db->where('DOC_TYPE','Cheque');
		$query = $this->db->get();
		$response=$query->row();
		return $response;
	}
/*-------------------------------- Addded by sonal on cluster connector pagination on 13_05_2022------------------------------------------*/
function get_cluster_BM_connector($id)
{

  $array=array();
  $this->db->select('UNIQUE_CODE');
      $this->db->from('USER_DETAILS');
      $this->db->where('CM_ID',$id);
  $this->db->where('ROLE',13);
  $query = $this->db->get();
  $response=$query->result();
  foreach ($response as $value) 
      $array[] = $value->UNIQUE_CODE;

  return $array;
}
public function get_RO_BM_connector($Branch_manger)
{
  $array=array();
  $this->db->select('UNIQUE_CODE');
      $this->db->from('USER_DETAILS');
  if(!empty($Branch_manger))
    {      $this->db->where_in('BM_ID',$Branch_manger);
  
  
  $this->db->where('ROLE',14);
}
  $query = $this->db->get();
  $response=$query->result();
  foreach ($response as $value) 
      $array[] = $value->UNIQUE_CODE;
    
  return $array;
}
public function get_DSA_BM_connector($Branch_manger,$Relationship,$id)
{
  $array=array();
  $this->db->select('UNIQUE_CODE');
      $this->db->from('USER_DETAILS');

       if(!empty($Branch_manger))
    {
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',2);
    }
     if(!empty($Relationship))
    {
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',2);
    }
     if(!empty($id))
    {
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',2);
    }
  $query = $this->db->get();
  $response=$query->result();
  foreach ($response as $value) 
      $array[] = $value->UNIQUE_CODE;
    
  return $array;
}
public function get_cluster_connector($Branch_manger,$Relationship,$DSA,$id)
{
  $array=array();
  $this->db->select('UNIQUE_CODE');
      $this->db->from('USER_DETAILS');
      $this->db->where_in('BM_ID',$Branch_manger);
  $this->db->where('ROLE',4);
  $this->db->or_where_in('RO_ID',$Relationship);
  $this->db->where('ROLE',4);
  $this->db->or_where_in('DSA_ID',$DSA);
  $this->db->where('ROLE',4);
  $this->db->or_where_in('CM_ID',$id);
  $this->db->where('ROLE',4);
  
  $query = $this->db->get();
  $response=$query->result();
  foreach ($response as $value) 
      $array[] = $value->UNIQUE_CODE;

  return $array;
}
/*-----------------------filter added by sonal on 13-05-2022------------------------------*/
public function get_all_connector_cluster($Branch_manger,$Relationship,$DSA,$id,$filter)
{
 if($filter=='all')
 {
  
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      if(!empty($Branch_manger))
      {
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',4);
      }
      if(!empty($Relationship))
     {
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',4);
    }
      if(!empty($DSA))
     {
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',4);
    }
      if(!empty($id))
     {
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
    }
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
  }
  else if($filter=='Complete')
  {
   $this->db->select('count(*)as count');
   $this->db->from('USER_DETAILS');
   if(!empty($Branch_manger))
      {
   $this->db->where_in('BM_ID',$Branch_manger);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
 }
 if(!empty($Relationship))
      {
   $this->db->or_where_in('RO_ID',$Relationship);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
 }
 if(!empty($DSA))
      {
   $this->db->or_where_in('DSA_ID',$DSA);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
 }
 if(!empty($id))
      {
   $this->db->or_where_in('CM_ID',$id);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
 }
  // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $query = $this->db->get();
   $response=$query->row();
   //echo $response->count;
   //exit;
   return $response->count;
  }
  else if($filter=='Incomplete')
  {
   $this->db->select('count(*)as count');
   $this->db->from('USER_DETAILS');
    if(!empty($Branch_manger))
      {
   $this->db->where_in('BM_ID',$Branch_manger);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);
 }
  if(!empty($Relationship))
      {
   $this->db->or_where_in('RO_ID',$Relationship);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);
 }
  if(!empty($DSA))
      {
   $this->db->or_where_in('DSA_ID',$DSA);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);
 }
  if(!empty($id))
      {
   $this->db->or_where_in('CM_ID',$id);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);
 }

  // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $query = $this->db->get();
   $response=$query->row();
   //echo $response->count;
   //exit;
   return $response->count;
  }
 
  else
  {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
        if(!empty($Branch_manger))
      {
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',4);
    }
      if(!empty($Relationship))
      {
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',4);
    }
      if(!empty($DSA))
      {
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',4);
    }
      if(!empty($id))
      {
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
    }
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
  }


    
}
 function get_all_connector_cluster_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue,$filter)
   {
       if($filter=='all')
       {
            $this->db->select('count(*)as count');
            $this->db->from('USER_DETAILS');
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%'AND ROLE=4 OR LN like '%".$searchValue."%' AND ROLE=4";
            // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
            $this->db->where($where);
            }
            if(!empty($Branch_manger))
      {
            $this->db->where_in('BM_ID',$Branch_manger);
            $this->db->where('ROLE',4);
            }
            if(!empty($Relationship))
      {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',4);
          }
          if(!empty($DSA))
      {
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',4);
          }
          if(!empty($id))
      {
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',4);
          }
            //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $query = $this->db->get();
            $response=$query->row();
            //echo $response->count;
            //exit;
            return $response->count; 

    } 
    else if($filter=='Complete')
    {
         $this->db->select('count(*)as count');
         $this->db->from('USER_DETAILS');
         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%'AND ROLE=4 OR LN like '%".$searchValue."%' AND ROLE=4 ";
         // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
         $this->db->where($where);
         }
             if(!empty($Branch_manger))
      {
         $this->db->where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',4);
         $this->db->where("Profile_Status",'Complete');
       }
           if(!empty($Relationship))
      {
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',4);
         $this->db->where("Profile_Status",'Complete');
       }
           if(!empty($DSA))
      {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',4);
         $this->db->where("Profile_Status",'Complete');
       }
           if(!empty($id))
      {
         $this->db->or_where_in('CM_ID',$id);
         $this->db->where('ROLE',4);
         $this->db->where("Profile_Status",'Complete');
       }
        // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         $query = $this->db->get();
         $response=$query->row();
         //echo $response->count;
         //exit;
         return $response->count; 

 } 
 else if($filter=='Incomplete')
 {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      if($searchValue!= '')
      {
      $where = "FN like '%".$searchValue."%'AND ROLE=4 OR LN like '%".$searchValue."%' AND ROLE=4 ";
      // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
      $this->db->where($where);
      }
            if(!empty($Branch_manger))
      {
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',4);
      $this->db->where("Profile_Status",NULL);
    }
          if(!empty($Relationship))
      {
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',4);
      $this->db->where("Profile_Status",NULL);
    }
          if(!empty($DSA))
      {
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',4);
      $this->db->where("Profile_Status",NULL);
    }
          if(!empty($id))
      {
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
      $this->db->where("Profile_Status",NULL);
    }
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count; 

} 
   
  
  else
  {
          $this->db->select('count(*)as count');
          $this->db->from('USER_DETAILS');
          if($searchValue!= '')
          {
          $where = "FN like '%".$searchValue."%'AND ROLE=4 OR LN like '%".$searchValue."%' AND ROLE=4";
          // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
          $this->db->where($where);
          }
              if(!empty($Branch_manger))
      {
          $this->db->where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',4);
        }
            if(!empty($Relationship))
      {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',4);
        }
            if(!empty($DSA))
      {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',4);
        }
            if(!empty($id))
      {
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',4);
        }
        //  $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          $query = $this->db->get();
          $response=$query->row();
          //echo $response->count;
          //exit;
          return $response->count; 

  }
   } 
  function get_all_connector_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
   {
     
    if($filter=='all')
    {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');

           if(!empty($Branch_manger))
      {
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
        
        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
      }

             if(!empty($Branch_manger))
      {
        $this->db->or_where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
        {
           $this->db->like('LN',$searchValue);
        }
      }

             if(!empty($Relationship))
      {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
        {
         $this->db->like('FN',$searchValue);
        }

      }

             if(!empty($Relationship))
      {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
  }
         if(!empty($DSA))
      {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
      }
             if(!empty($DSA))
      {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
      }

             if(!empty($id))
      {
  
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }

     }
            if(!empty($id))
      {
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
      if($searchValue!= '')
      {
         $this->db->like('FN',$searchValue);
      }
    }
  
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $this->db->limit($rowperpage,$row);
      $this->db->order_by("USER_DETAILS.ID","desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
     // print_r($this->db->last_query());
      //exit;
    }
    else if($filter=='Complete')
    {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        if(!empty($Branch_manger))
      {
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
      }
         if(!empty($Branch_manger))
      {
        $this->db->or_where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
           $this->db->like('LN',$searchValue);
        }
      }
         if(!empty($Relationship))
      {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
         $this->db->like('FN',$searchValue);
        }
      }
         if(!empty($Relationship))
      {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
  }

     if(!empty($DSA))
      {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
      }
         if(!empty($DSA))
      {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
  }
     if(!empty($id))
      {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
        if(!empty($id))
      {
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
      $this->db->where("Profile_Status",'Complete');

      if($searchValue!= '')
      {
         $this->db->like('FN',$searchValue);
      }
    }
  
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $this->db->limit($rowperpage,$row);
      $this->db->order_by("USER_DETAILS.ID","desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    } 
    else if($filter=='Incomplete')
    {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
         if(!empty($Branch_manger))
      {
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL);
        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
      }
       if(!empty($Branch_manger))
      {
        $this->db->or_where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
           $this->db->like('LN',$searchValue);
        }
      }

       if(!empty($Relationship))
      {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
         $this->db->like('FN',$searchValue);
        }
      }
       if(!empty($Relationship))
      {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
        }

         if(!empty($DSA))
      {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }

      }

       if(!empty($DSA))
      {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
      }

       if(!empty($id))
      {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }

     }

      if(!empty($id))
      {
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
      $this->db->where("Profile_Status",NULL);

      if($searchValue!= '')
      {
         $this->db->like('FN',$searchValue);
      }
    }
      //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $this->db->limit($rowperpage,$row);
      $this->db->order_by("USER_DETAILS.ID","desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    }

    else
    {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
           if(!empty($Branch_manger))
      {
          $this->db->where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
        }

         if(!empty($Branch_manger))
      {
          $this->db->or_where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
      }

       if(!empty($Relationship))
      {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
        }

         if(!empty($Relationship))
      {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
}
 if(!empty($DSA))
      {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
        }
         if(!empty($DSA))
      {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
}
 if(!empty($id))
      {
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
      }

       if(!empty($id))
      {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
        {
          $this->db->like('FN',$searchValue);
        }
      }
        //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $this->db->limit($rowperpage,$row);
        $this->db->order_by("USER_DETAILS.ID","desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
    }

}


/*-------------------------------- Addded by sonal on cluster dsa pagination on 13_05_2022------------------------------------------*/
function get_cluster_BM_Dsa($id)
{

 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');

      if(!empty($id))
      {
     $this->db->where('CM_ID',$id);
 $this->db->where('ROLE',13);
}
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}
public function get_RO_BM_Dsa($Branch_manger)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
     $this->db->where('ROLE',14);
   }
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}
public function get_DSA_BM_Dsa($Branch_manger,$Relationship,$id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     if(!empty($Branch_mange))
     {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',2);
      }
      if(!empty($Relationship))
     {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
     }
      if(!empty($id))
     {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',2);
      }
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}
public function get_cluster_Dsa($Branch_manger,$Relationship,$DSA,$id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
	 if(count($Branch_manger) > 0)
	 {
     $this->db->where_in('BM_ID',$Branch_manger);
 $this->db->where('ROLE',4);
	 }
 
 if(count($Relationship) > 0)
	 {
 $this->db->or_where_in('RO_ID',$Relationship);
 $this->db->where('ROLE',4);
	 }
	 if(count($DSA) > 0)
	 {
 $this->db->or_where_in('DSA_ID',$DSA);
 $this->db->where('ROLE',4);
	 }
	 
	 if($id != '' )
	 {
 $this->db->or_where_in('CM_ID',$id);
 $this->db->where('ROLE',4);
 
	 }
 
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}
/*-----------------------filter added by sonal on 13-05-2022------------------------------*/
public function get_all_Dsa_cluster($Branch_manger,$Relationship,$DSA,$id,$filter)
{
if($filter=='all')
{
 
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
        if(!empty($Branch_manger))
          {
           $this->db->where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',2);
         }
        if(!empty($Relationship))
         {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',2);
         }
        if(!empty($DSA))
          {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',2);
         }
        if(!empty($id))
          {
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',2);
          }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }
 else if($filter=='Complete')
 {
  $this->db->select('count(*)as count');
  $this->db->from('USER_DETAILS');
      if(!empty($Branch_manger))
          {
             $this->db->where_in('BM_ID',$Branch_manger);
             $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
      if(!empty($Relationship))
          {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
     if(!empty($DSA))
          {
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
    if(!empty($id))
          {
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
 // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
  $query = $this->db->get();
  $response=$query->row();
  //echo $response->count;
  //exit;
  return $response->count;
 }
 else if($filter=='Incomplete')
 {
  $this->db->select('count(*)as count');
  $this->db->from('USER_DETAILS');
    if(!empty($Branch_manger))
          {
             $this->db->where_in('BM_ID',$Branch_manger);
             $this->db->where('ROLE',2);
             $this->db->where("Profile_Status",NULL);
          }
     if(!empty($Relationship))
          {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",NULL);
          }
          if(!empty($DSA))
          {
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",NULL);
          }
          if(!empty($id))
          {
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",NULL);
          }
 // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
  $query = $this->db->get();
  $response=$query->row();
  //echo $response->count;
  //exit;
  return $response->count;
 }

 else
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
        if(!empty($Branch_manger))
          {
             $this->db->where_in('BM_ID',$Branch_manger);
             $this->db->where('ROLE',2);
          }
        if(!empty($Relationship))
          {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',2);
          }
       if(!empty($DSA))
          {
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',2);
          }
        if(!empty($id))
          {
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',2);
          }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }


   
}
function get_all_Dsa_cluster_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue,$filter)
  {
      if($filter=='all')
      {
           $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=2 OR LN like '%".$searchValue."%' AND ROLE=2";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }

            if(!empty($Branch_manger))
          {
           $this->db->where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',2);
           }
            if(!empty($Relationship))
          {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',2);
         }
          if(!empty($DSA))
          {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',2);
         }
          if(!empty($id))
          {
           $this->db->or_where_in('CM_ID',$id);
           $this->db->where('ROLE',2);
         }
           //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 

   } 
   else if($filter=='Complete')
   {
        $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
        if($searchValue!= '')
        {
        $where = "FN like '%".$searchValue."%'AND ROLE=2 OR LN like '%".$searchValue."%' AND ROLE=2 ";
        // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
        $this->db->where($where);
        }
           if(!empty($Branch_manger))
          {
            $this->db->where_in('BM_ID',$Branch_manger);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
          if(!empty($Relationship))
          {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
          if(!empty($DSA))
          { 
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
          if(!empty($id))
          {
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
       // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count; 

} 
else if($filter=='Incomplete')
{
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if($searchValue!= '')
     {
     $where = "FN like '%".$searchValue."%'AND ROLE=2 OR LN like '%".$searchValue."%' AND ROLE=2 ";
     // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
     $this->db->where($where);
     }
      if(!empty($Branch_manger))
          {
             $this->db->where_in('BM_ID',$Branch_manger);
             $this->db->where('ROLE',2);
             $this->db->where("Profile_Status",NULL);
         }
        if(!empty($Relationship))
          {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",NULL);
          }
        if(!empty($DSA))
          {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',2);
           $this->db->where("Profile_Status",NULL);
          }
        if(!empty($id))
          {
            $this->db->or_where_in('CM_ID',$id);
           $this->db->where('ROLE',2);
          $this->db->where("Profile_Status",NULL);
        }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count; 

} 
  
 
 else
 {
         $this->db->select('count(*)as count');
         $this->db->from('USER_DETAILS');
         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%'AND ROLE=2 OR LN like '%".$searchValue."%' AND ROLE=2";
         // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
         $this->db->where($where);
         }
         if(!empty($Branch_manger))
          {
            $this->db->where_in('BM_ID',$Branch_manger);
            $this->db->where('ROLE',2);
          }
        if(!empty($Relationship))
          {
             $this->db->or_where_in('RO_ID',$Relationship);
             $this->db->where('ROLE',2);
          }
          if(!empty($DSA))
          {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',2);
         }
         if(!empty($id))
          {
             $this->db->or_where_in('CM_ID',$id);
             $this->db->where('ROLE',2);
          }
       //  $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         $query = $this->db->get();
         $response=$query->row();
         //echo $response->count;
         //exit;
         return $response->count; 

 }
  } 
 function get_all_Dsa_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
  {
    
   if($filter=='all')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');

       if(!empty($Branch_manger))
       {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
      if(!empty($Branch_manger))
      {
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
     }

      if(!empty($Relationship))
      {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
     }
      if(!empty($Relationship))
      {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
       }

        if(!empty($DSA))
        {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
      if(!empty($DSA))
      {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
    }
     if(!empty($searchValue))
     {
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',2);
       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
    }
     if(!empty($searchValue))
     {
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',2);
     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
   }
 
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
    // print_r($this->db->last_query());
     //exit;
   }
   else if($filter=='Complete')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',2);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
 
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   } 
   else if($filter=='Incomplete')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',2);
     $this->db->where("Profile_Status",NULL);

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
 
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   }

   else
   {
         $this->db->select('*');
         $this->db->from('USER_DETAILS');
         $this->db->where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',2);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',2);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',2);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',2);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }

         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',2);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',2);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }

         $this->db->or_where_in('CM_ID',$id);
         $this->db->where('ROLE',2);
         if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
         $this->db->like('FN',$searchValue);
       }
       //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID","desc");
       $query = $this->db->get();
       $response = $query->result();
       return $response;
   }

}




/*-------------------------------- Addded by sonal on cluster RO pagination on 13_05_2022------------------------------------------*/
function get_cluster_BM_RO($id)
{

 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where('CM_ID',$id);
 $this->db->where('ROLE',13);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}
public function get_RO_BM_RO($Branch_manger)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
 
 $this->db->where('ROLE',14);
}
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}
public function get_DSA_BM_RO($Branch_manger,$Relationship,$id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
 $this->db->where('ROLE',2);
}
 if(!empty($Relationship))
     {
 $this->db->or_where_in('RO_ID',$Relationship);
 $this->db->where('ROLE',2);
}
 if(!empty($id))
     {
 $this->db->or_where_in('CM_ID',$id);
 $this->db->where('ROLE',2);
}
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}
public function get_cluster_RO($Branch_manger,$Relationship,$DSA,$id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
       if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
 $this->db->where('ROLE',4);
}
  if(!empty($Relationship))
     {
 $this->db->or_where_in('RO_ID',$Relationship);
 $this->db->where('ROLE',4);
}
  if(!empty($DSA))
     {
 $this->db->or_where_in('DSA_ID',$DSA);
 $this->db->where('ROLE',4);
}
  if(!empty($id))
     {
 $this->db->or_where_in('CM_ID',$id);
 $this->db->where('ROLE',4);
 }
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}
/*-----------------------filter added by sonal on 13-05-2022------------------------------*/
public function get_all_RO_cluster($Branch_manger,$Relationship,$DSA,$id,$filter)
{
if($filter=='all')
{
 
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
       if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
 $this->db->where('ROLE',14);
}
  if(!empty($Relationship))
     {
 $this->db->or_where_in('RO_ID',$Relationship);
 $this->db->where('ROLE',14);
}
  if(!empty($DSA))
     {
 $this->db->or_where_in('DSA_ID',$DSA);
 $this->db->where('ROLE',14);
}
  if(!empty($id))
     {
 $this->db->or_where_in('CM_ID',$id);
 $this->db->where('ROLE',14);
 }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }
 else if($filter=='Complete')
 {
  $this->db->select('count(*)as count');
  $this->db->from('USER_DETAILS');


    if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
 $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",'Complete');
}
  if(!empty($Relationship))
     {
 $this->db->or_where_in('RO_ID',$Relationship);
 $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",'Complete');
}
  if(!empty($DSA))
     {
 $this->db->or_where_in('DSA_ID',$DSA);
 $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",'Complete');
}
  if(!empty($id))
     {
 $this->db->or_where_in('CM_ID',$id);
 $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",'Complete');
 }
 // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
  $query = $this->db->get();
  $response=$query->row();
  //echo $response->count;
  //exit;
  return $response->count;
 }
 else if($filter=='Incomplete')
 {
  $this->db->select('count(*)as count');
  $this->db->from('USER_DETAILS');
     if(!empty($Branch_manger))
     {
  $this->db->where_in('BM_ID',$Branch_manger);
  $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",NULL);
}
   if(!empty($Relationship))
     {
  $this->db->or_where_in('RO_ID',$Relationship);
  $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",NULL);
}
   if(!empty($DSA))
     {
  $this->db->or_where_in('DSA_ID',$DSA);
  $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",NULL);
}
   if(!empty($id))
     {
  $this->db->or_where_in('CM_ID',$id);
  $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",NULL);
}



 // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
  $query = $this->db->get();
  $response=$query->row();
  //echo $response->count;
  //exit;
  return $response->count;
 }

 else
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
 if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
     $this->db->where('ROLE',14);
   }
    if(!empty($Relationship))
     {
     $this->db->or_where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',14);
   }
    if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',14);
   }
    if(!empty($id))
     {
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',14);
   }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }


   
}
function get_all_RO_cluster_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue,$filter)
  {
      if($filter=='all')
      {
           $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=14 OR LN like '%".$searchValue."%' AND ROLE=14";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($Branch_manger))
     {
           $this->db->where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',14);
           }
           if(!empty($Relationship))
     {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',14);
         }
         if(!empty($DSA))
     {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',14);
         }
         if(!empty($id))
     {
           $this->db->or_where_in('CM_ID',$id);
           $this->db->where('ROLE',14);
         }
           //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 

   } 
   else if($filter=='Complete')
   {
        $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
        if($searchValue!= '')
        {
        $where = "FN like '%".$searchValue."%'AND ROLE=14 OR LN like '%".$searchValue."%' AND ROLE=14";
        // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
        $this->db->where($where);
        }
            if(!empty($Branch_manger))
     {
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',14);
        $this->db->where("Profile_Status",'Complete');
      }
          if(!empty($Relationship))
     {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',14);
        $this->db->where("Profile_Status",'Complete');
      }
          if(!empty($DSA))
     {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',14);
        $this->db->where("Profile_Status",'Complete');
      }
          if(!empty($id))
     {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',14);
        $this->db->where("Profile_Status",'Complete');
      }
       // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count; 

} 
else if($filter=='Incomplete')
{
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if($searchValue!= '')
     {
     $where = "FN like '%".$searchValue."%'AND ROLE=14 OR LN like '%".$searchValue."%' AND ROLE=14";
     // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
     $this->db->where($where);
     }
            if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",NULL);
   }
          if(!empty($Relationship))
     {
     $this->db->or_where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",NULL);
   }
          if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",NULL);
   }
          if(!empty($id))
     {
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",NULL);
   }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count; 

} 
  
 
 else
 {
         $this->db->select('count(*)as count');
         $this->db->from('USER_DETAILS');
         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%'AND ROLE=14 OR LN like '%".$searchValue."%' AND ROLE=14";
         // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
         $this->db->where($where);
         }
                 if(!empty($Branch_manger))
     {
         $this->db->where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',14);
       }
               if(!empty($Relationship))
     {
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',14);
       }
               if(!empty($DSA))
     {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',14);
       }
               if(!empty($id))
     {
         $this->db->or_where_in('CM_ID',$id);
         $this->db->where('ROLE',14);
       }
       //  $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         $query = $this->db->get();
         $response=$query->row();
         //echo $response->count;
         //exit;
         return $response->count; 

 }
  } 
 function get_all_RO_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
  {
    
   if($filter=='all')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
             if(!empty($Branch_manger))
     {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',14);
      if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
}

        if(!empty($Branch_manger))
     {
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
     }

             if(!empty($Relationship))
     {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
     }

             if(!empty($Relationship))
     {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 }


             if(!empty($DSA))
     {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }

              if(!empty($DSA))
     {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 }

          if(!empty($id))
     {
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
    }
        if(!empty($id))
     {
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',14);
     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
 }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
    // print_r($this->db->last_query());
     //exit;
   }
   else if($filter=='Complete')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
           if(!empty($Branch_mangerid))
     {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
             if(!empty($Branch_mangerid))
     {
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
     }
             if(!empty($Relationship))
     {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
     }
           if(!empty($Relationship))
     {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 }
       if(!empty($DSA))
     {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
      if(!empty($DSA))
     {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 }
  if(!empty($id))
     {
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
    }
     if(!empty($id))
     {
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
 }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   } 
   else if($filter=='Incomplete')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
        if(!empty($Branch_manger))
     {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
      if(!empty($Branch_manger))
     {
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
     }
      if(!empty($Relationship))
     {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
     }
       if(!empty($Relationship))
     {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
     }
       if(!empty($DSA))
     {
 
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
       if(!empty($DSA))
     {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 }
   if(!empty($id))
     {
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
    }
      if(!empty($id))
     {
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",NULL);

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
 }
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   }

   else
   {
         $this->db->select('*');
         $this->db->from('USER_DETAILS');
           if(!empty($Branch_manger))
     {
         $this->db->where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',14);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
       }
           if(!empty($Branch_manger))
     {
         $this->db->or_where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',14);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
       }
           if(!empty($Relationship))
     {
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',14);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
       }
             if(!empty($Relationship))
     {
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',14);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
}
      if(!empty($DSA))
     {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',14);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
       }
             if(!empty($DSA))
     {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',14);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
}
      if(!empty($id))
     {
         $this->db->or_where_in('CM_ID',$id);
         $this->db->where('ROLE',14);
         if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
           if(!empty($id))
     {
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
         $this->db->like('FN',$searchValue);
       }
     }
       //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID","desc");
       $query = $this->db->get();
       $response = $query->result();
       return $response;
   }

}

/*-------------------------------- Addded by sonal on cluster BM pagination on 13_05_2022------------------------------------------*/
function get_cluster_BM_Branch_Manager($id)
{

 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where('CM_ID',$id);
 $this->db->where('ROLE',13);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}
public function get_RO_BM_BM($Branch_manger)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
     }
 
 $this->db->where('ROLE',14);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}
public function get_DSA_BM_BM($Branch_manger,$Relationship,$id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',2);
    }
     if(!empty($Relationship))
     {

 $this->db->or_where_in('RO_ID',$Relationship);
 $this->db->where('ROLE',2);
}
 if(!empty($id))
     {
 $this->db->or_where_in('CM_ID',$id);
 $this->db->where('ROLE',2);
}
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}
public function get_cluster_BM_BM($Branch_manger,$Relationship,$DSA,$id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
     $this->db->where('ROLE',4);
   }
    if(!empty($Relationship))
     {
 $this->db->or_where_in('RO_ID',$Relationship);
 $this->db->where('ROLE',4);
}
 if(!empty($DSA))
     {
 $this->db->or_where_in('DSA_ID',$DSA);
 $this->db->where('ROLE',4);
}
 if(!empty($id))
     {
 $this->db->or_where_in('CM_ID',$id);
 $this->db->where('ROLE',4);
 }
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}
/*-----------------------filter added by sonal on 13-05-2022------------------------------*/
public function get_all_BM_cluster($Branch_manger,$Relationship,$DSA,$id,$filter)
{
if($filter=='all')
{
  

     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
      if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
     $this->db->where('ROLE',13);
   }
    if(!empty($Relationship))
     {
     $this->db->or_where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',13);
   }
    if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',13);
   }
    if(!empty($id))
     {
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',13);
   }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }
 else if($filter=='Complete')
 {
  $this->db->select('count(*)as count');
  $this->db->from('USER_DETAILS');
  if(!empty($Branch_manger))
  {
  $this->db->where_in('BM_ID',$Branch_manger);
  $this->db->where('ROLE',13);

  $this->db->where("Profile_Status",'Complete');
}
if(!empty($Relationship))
{

  $this->db->or_where_in('RO_ID',$Relationship);
  $this->db->where('ROLE',13);
   $this->db->where("Profile_Status",'Complete');
}
if(!empty($DSA))
{
 
  $this->db->or_where_in('DSA_ID',$DSA);
  $this->db->where('ROLE',13);
  $this->db->where("Profile_Status",'Complete');
}
if(!empty($id))
{
  $this->db->or_where_in('CM_ID',$id);
  $this->db->where('ROLE',13);
  $this->db->where("Profile_Status",'Complete');
}
 // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
  $query = $this->db->get();
  $response=$query->row();
  //echo $response->count;
  //exit;
  return $response->count;
 }
 else if($filter=='Incomplete')
 {
  $this->db->select('count(*)as count');
  $this->db->from('USER_DETAILS');
  if(!empty($Branch_manger))
  {
  $this->db->where_in('BM_ID',$Branch_manger);
  $this->db->where('ROLE',13);
  $this->db->where("Profile_Status",NULL);
 }
  if(!empty($Relationship))
  {
  $this->db->or_where_in('RO_ID',$Relationship);
  $this->db->where('ROLE',13);
  $this->db->where("Profile_Status",NULL);
}
 if(!empty($DSA))
  {
  $this->db->or_where_in('DSA_ID',$DSA);
  $this->db->where('ROLE',13);
  $this->db->where("Profile_Status",NULL);
}
 if(!empty($id))
  {
  $this->db->or_where_in('CM_ID',$id);
  $this->db->where('ROLE',13);
  $this->db->where("Profile_Status",NULL);
}
 // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
  $query = $this->db->get();
  $response=$query->row();
  //echo $response->count;
  //exit;
  return $response->count;
 }

 else
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
      if(!empty($Branch_manger))
       {
     $this->db->where_in('BM_ID',$Branch_manger);
     $this->db->where('ROLE',13);
   }
    if(!empty($Relationship))
  {
     $this->db->or_where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',13);
   }
    if(!empty($DSA))
  {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',13);
   }
    if(!empty($id))
  {
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',13);
   }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }


   
}
function get_all_BM_cluster_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue,$filter)
  {
      if($filter=='all')
      {
           $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=13 OR LN like '%".$searchValue."%' AND ROLE=13";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($Branch_manger))
           {
           $this->db->where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',13);
           }
            if(!empty($Relationship))
           {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',13);
         }
          if(!empty($DSA))
           {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',13);
         } if(!empty($id))
           {
           $this->db->or_where_in('CM_ID',$id);
           $this->db->where('ROLE',13);
         }
           //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 

   } 
   else if($filter=='Complete')
   {
        $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
        if($searchValue!= '')
        {
        $where = "FN like '%".$searchValue."%'AND ROLE=13 OR LN like '%".$searchValue."%' AND ROLE=13";
        // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
        $this->db->where($where);
        }
        if(!empty($Branch_manger))
        {
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',13);
        $this->db->where("Profile_Status",'Complete');
      }
       if(!empty($Relationship))
        {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',13);
        $this->db->where("Profile_Status",'Complete');
      }
      if(!empty($DSA))
        {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',13);
        $this->db->where("Profile_Status",'Complete');
      }
      if(!empty($id))
        {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',13);
        $this->db->where("Profile_Status",'Complete');
      }
       // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count; 

} 
else if($filter=='Incomplete')
{
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if($searchValue!= '')
     {
     $where = "FN like '%".$searchValue."%'AND ROLE=13 OR LN like '%".$searchValue."%' AND ROLE=13";
     // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
     $this->db->where($where);
     }
      if(!empty($Branch_manger))
        {
     $this->db->where_in('BM_ID',$Branch_manger);
     $this->db->where('ROLE',13);
     $this->db->where("Profile_Status",NULL);
   }
    if(!empty($Relationship))
        {
     $this->db->or_where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',13);
     $this->db->where("Profile_Status",NULL);
   }
    if(!empty($DSA))
        {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',13);
     $this->db->where("Profile_Status",NULL);
   }
    if(!empty($id))
        {
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',13);
     $this->db->where("Profile_Status",NULL);
   }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count; 

} 
  
 
 else
 {
         $this->db->select('count(*)as count');
         $this->db->from('USER_DETAILS');
         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%'AND ROLE=13 OR LN like '%".$searchValue."%' AND ROLE=13";
         // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
         $this->db->where($where);
         }
           if(!empty($Branch_manger))
        {
         $this->db->where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',13);
       }
         if(!empty($Relationship))
        {
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',13);
       }
         if(!empty($DSA))
        {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',13);
       }
         if(!empty($id))
        {
         $this->db->or_where_in('CM_ID',$id);
         $this->db->where('ROLE',13);
       }
       //  $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         $query = $this->db->get();
         $response=$query->row();
         //echo $response->count;
         //exit;
         return $response->count; 

 }
  } 
 function get_all_BM_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
  {
    
   if($filter=='all')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');

      if(!empty($Branch_manger))
      {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',13);
       
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }

if(!empty($Branch_manger))
      {


       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',13);
       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
     }
     if(!empty($Relationship))
      {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',13);
       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
     }

     if(!empty($Relationship))
      {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',13);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
     }

     if(!empty($DSA))
      {
 
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',13);
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }

     if(!empty($DSA))
      {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',13);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }

     }

     if(!empty($id))
      {
 
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',13);
       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }

    }

    if(!empty($id))
      {
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',13);
     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
 }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
    // print_r($this->db->last_query());
     //exit;
   }
   else if($filter=='Complete')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',13);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
 
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   } 
   else if($filter=='Incomplete')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',13);
     $this->db->where("Profile_Status",NULL);

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
 
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   }

   else
   {
         $this->db->select('*');
         $this->db->from('USER_DETAILS');
         $this->db->where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',13);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',13);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',13);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',13);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }

         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',13);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',13);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }

         $this->db->or_where_in('CM_ID',$id);
         $this->db->where('ROLE',13);
         if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',13);
       if($searchValue!= '')
       {
         $this->db->like('FN',$searchValue);
       }
       //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID","desc");
       $query = $this->db->get();
       $response = $query->result();
       return $response;
   }

}
 /*-------------------------------- Addded by sonal Branch pagination and filter on 14_05_2022------------------------------------------*/
 
 public function get_Branch_RO_BM($id)
 {
   $array=array();
   $this->db->select('UNIQUE_CODE');
       $this->db->from('USER_DETAILS');
       $this->db->where_in('BM_ID',$id);
   $this->db->where('ROLE',14);
   $query = $this->db->get();
   $response=$query->result();
   foreach ($response as $value) 
       $array[] = $value->UNIQUE_CODE;
     
   return $array;
 }
 public function get_Branch_BM_BM($Relationship,$id)
 {
   $array=array();
   $this->db->select('UNIQUE_CODE');
       $this->db->from('USER_DETAILS');
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',2);
       if(!empty($Relationship))
       {
   $this->db->or_where_in('RO_ID',$Relationship);
   $this->db->where('ROLE',2);
       }
   
   $query = $this->db->get();
   $response=$query->result();
   foreach ($response as $value) 
       $array[] = $value->UNIQUE_CODE;
     
   return $array;
 }
 public function get_customers_Branch($Relationship,$DSA,$id)
 {
   $array=array();
   $this->db->select('UNIQUE_CODE');
       $this->db->from('USER_DETAILS');
       $this->db->where_in('BM_ID',$id);
   $this->db->where('ROLE',4);
   if(!empty($Relationship))
       {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
       }
       if(!empty($DSA))
       {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
       }
 
   
   $query = $this->db->get();
   $response=$query->result();
   foreach ($response as $value) 
       $array[] = $value->UNIQUE_CODE;
 
   return $array;
 }
 /*-----------------------filter added by sonal on 12-05-2022------------------------------*/
 public function get_all_customers_Branch($Relationship,$DSA,$sales_id,$id,$filter)
 {
   if($filter=='all')
   {
       $this->db->select('count(*)as count');
       $this->db->from('USER_DETAILS');
       if(!empty($Relationship))
       {
        $this->db->where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',1);
       }
       if(!empty($DSA))
       {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',1);
       }
       
       if(!empty($sales_id))
       {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
       }
       $this->db->where_in('BM_ID',$id);
       $this->db->where('ROLE',1);
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
       return $response->count;
   }
   else if($filter=='Application_Completed')
   {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
    
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
     if(!empty($Relationship))
     {
      $this->db->where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
     }
     if(!empty($DSA))
     {
    
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
     }
     if(!empty($sales_id))
     {
      $this->db->or_where_in('SELES_ID',$sales_id);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
     }
    
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',1);
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
     $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
   }
   else if($filter=='Application_InCompleted')
   {
       $this->db->select('count(*)as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
       if(!empty($Relationship))
       {
          $this->db->where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
       }
       if(!empty($DSA))
       {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
       }
       if(!empty($sales_id))
       {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
       }
       $this->db->where_in('BM_ID',$id);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
     
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
       return $response->count;
   }
   else if($filter=='Cam_Completed')
   {
         $this->db->select('count(*)as count');
         $this->db->from('USER_DETAILS');
        // $this->db->where_in('BM_ID',$Branch_manger);
       
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
         if(!empty($Relationship))
         {
         $this->db->where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
         }
         if(!empty($DSA))
         {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
         }
         if(!empty($sales_id))
         {
          $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
         }
         $this->db->or_where_in('BM_ID',$id);
         $this->db->where('ROLE',1);
       
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
     
         $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         $query = $this->db->get();
         $response=$query->row();
         //echo $response->count;
         //exit;
         return $response->count;
   }
   else if($filter=='PD_Completed')
   {
       $this->db->select('count(*)as count');
       $this->db->from('USER_DETAILS');
    
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
       if(!empty($Relationship))
       {
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
       }
       if(!empty($DSA))
       {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
       }
       if(!empty($sales_id))
       {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
       }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
       return $response->count;
   }
   else if($filter=='income_details_complete')
   {
         $this->db->select('count(*)as count');
         $this->db->from('USER_DETAILS');
         
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
         if(!empty($Relationship))
         {
         $this->db->where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
         }
         if(!empty($DSA))
         {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
         }
         if(!empty($sales_id))
          {
            $this->db->or_where_in('SELES_ID',$sales_id);
            $this->db->where('ROLE',1);
            $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
          }
         $this->db->or_where_in('BM_ID',$id);
         $this->db->where('ROLE',1);
       
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
     
         $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         $query = $this->db->get();
         $response=$query->row();
         //echo $response->count;
         //exit;
         return $response->count;
   }
   else if($filter=='Created')
   {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
     if(!empty($Relationship))
     {
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',1);
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
     }
     if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',1);
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
     }
     if(!empty($sales_id))
     {
       $this->db->or_where_in('SELES_ID',$sales_id);
       $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
     }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',1);
   
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
 
     $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
   }
   else if($filter=='reject')
   {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
    
     $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
     if(!empty($Relationship))
     {
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',1);
     $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
     }
     if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',1);
     $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
     }
     if(!empty($sales_id))
     {
       $this->db->or_where_in('SELES_ID',$sales_id);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
     }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',1);
   
     $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
 
     $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
   }
   else
   {
       $this->db->select('count(*)as count');
       $this->db->from('USER_DETAILS');
       if(!empty($Relationship))
        {
          $this->db->where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',1);
        }
        if(!empty($DSA))
        {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
        }
        if(!empty($sales_id))
        {
          $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',1);
         
        }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',1);
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
       return $response->count;
   }


     
 }
  function get_all_customers_Branch_filter($Relationship,$DSA,$sales_id,$id,$searchValue,$filter)
    {
        if($filter=='all')
        {
             $this->db->select('count(*)as count');
             $this->db->from('USER_DETAILS');
             if($searchValue!= '')
             {
             $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
             // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
             $this->db->where($where);
             }
             if(!empty($Relationship))
             {
             $this->db->where_in('RO_ID',$Relationship);
             $this->db->where('ROLE',1);
             }
             if(!empty($DSA))
             {
             $this->db->or_where_in('DSA_ID',$DSA);
             $this->db->where('ROLE',1);
             }
             if(!empty($sales_id))
             {
             $this->db->or_where_in('SELES_ID',$sales_id);
             $this->db->where('ROLE',1);
             }
           
             $this->db->or_where_in('BM_ID',$id);
             $this->db->where('ROLE',1);
             $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
             $query = $this->db->get();
             $response=$query->row();
             //echo $response->count;
             //exit;
             return $response->count; 

     } 
     else if($filter=='Application_Completed')
     {
             $this->db->select('count(*)as count');
             $this->db->from('USER_DETAILS');
             if($searchValue!= '')
             {
             $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
             // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
             $this->db->where($where);
             }
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
             if(!empty($Relationship))
             {
             $this->db->where_in('RO_ID',$Relationship);
             $this->db->where('ROLE',1);
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
             }
             if(!empty($DSA))
             {
             $this->db->or_where_in('DSA_ID',$DSA);
             $this->db->where('ROLE',1);
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
             }
             if(!empty($sales_id))
             {
             $this->db->or_where_in('SELES_ID',$sales_id);
             $this->db->where('ROLE',1);
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
             }
            
             $this->db->or_where_in('BM_ID',$id);
             $this->db->where('ROLE',1);
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
             
             $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
             $query = $this->db->get();
             $response=$query->row();
             //echo $response->count;
             //exit;
             return $response->count; 
       }
       else if($filter=='Application_InCompleted')
       {
             $this->db->select('count(*)as count');
             $this->db->from('USER_DETAILS');
             if($searchValue!= '')
             {
             $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
             // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
             $this->db->where($where);
             }
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
             if(!empty($Relationship))
             {
             $this->db->where_in('RO_ID',$Relationship);
             $this->db->where('ROLE',1);
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
             }
             if(!empty($DSA))
             {
             $this->db->or_where_in('DSA_ID',$DSA);
             $this->db->where('ROLE',1);
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
             }
             if(!empty($sales_id))
             {
             $this->db->or_where_in('SELES_ID',$sales_id);
             $this->db->where('ROLE',1);
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
             }
           
             $this->db->or_where_in('BM_ID',$id);
             $this->db->where('ROLE',1);
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
             
             $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
             $query = $this->db->get();
             $response=$query->row();
             //echo $response->count;
             //exit;
             return $response->count; 
       }
   else if($filter=='Cam_Completed')
   {
             $this->db->select('count(*)as count');
             $this->db->from('USER_DETAILS');
             if($searchValue!= '')
             {
             $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
             // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
             $this->db->where($where);
             }
             if(!empty($Relationship))
             {
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
             $this->db->where_in('RO_ID',$Relationship);
             $this->db->where('ROLE',1);
             }
             if(!empty($DSA))
             {
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
             $this->db->or_where_in('DSA_ID',$DSA);
             $this->db->where('ROLE',1);
             }
             if(!empty($sales_id))
             {
             $this->db->or_where_in('SELES_ID',$sales_id);
             $this->db->where('ROLE',1);
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
             }
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
             $this->db->or_where_in('BM_ID',$id);
             $this->db->where('ROLE',1);
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
             $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
             $query = $this->db->get();
             $response=$query->row();
             //echo $response->count;
             //exit;
             return $response->count; 
   }
   else if($filter=='PD_Completed')
   {
           $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
           if(!empty($Relationship))
           {
           $this->db->where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
           }
           if(!empty($DSA))
           {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
           }
           if(!empty($sales_id))
           {
           $this->db->or_where_in('SELES_ID',$sales_id);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
           }
           $this->db->or_where_in('BM_ID',$id);
           $this->db->where('ROLE',1);
           $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
           $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 
   }
   else if($filter=='income_details_complete')
   {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if($searchValue!= '')
     {
     $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
     // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
     $this->db->where($where);
     }
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
     if(!empty($Relationship))
     {
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',1);
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
     }
     if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',1);
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
     }
     if(!empty($sales_id))
     {
     $this->db->or_where_in('SELES_ID',$sales_id);
     $this->db->where('ROLE',1);
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
     }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',1);
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
     $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count; 
   }
   else if($filter=='Created')
   {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if($searchValue!= '')
     {
     $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
     // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
     $this->db->where($where);
     }
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
     if(!empty($Relationship))
     {
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',1);
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
     }
     if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',1);
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
     }
     if(!empty($sales_id))
     {
     $this->db->or_where_in('SELES_ID',$sales_id);
     $this->db->where('ROLE',1);
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
     }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',1);
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
     $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count; 
   }
   else if($filter=='reject')
   {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if($searchValue!= '')
     {
     $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
     // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
     $this->db->where($where);
     }
    
     $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
     if(!empty($Relationship))
     {
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',1);
     $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
     }
     if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',1);
     $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
     }
     if(!empty($sales_id))
     {
     $this->db->or_where_in('SELES_ID',$sales_id);
     $this->db->where('ROLE',1);
     $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
     }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',1);
     $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
     $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
   }
   else
   {
           $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($Relationship))
           {
           $this->db->where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',1);
           }
           if(!empty($DSA))
           {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',1);
           }
           if(!empty($sales_id))
           {
           $this->db->or_where_in('SELES_ID',$sales_id);
           $this->db->where('ROLE',1);
         
           }
           $this->db->or_where_in('BM_ID',$id);
           $this->db->where('ROLE',1);
           $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 

   }
    } 
   function get_all_customers_Branch_filter_with_page($Relationship,$DSA,$sales_id,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
    {
     if($filter=='all')
     {
      if(!empty($Relationship))
      {
         $this->db->where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',1);
         if($searchValue!= '')
         {
          $this->db->like('FN',$searchValue);
         }
         $this->db->where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',1);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
      }
      if(!empty($DSA))
      {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',1);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',1);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
      }
      if(!empty($sales_id))
      {
         $this->db->or_where_in('SELES_ID',$sales_id);
         $this->db->where('ROLE',1);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('SELES_ID',$sales_id);
         $this->db->where('ROLE',1);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
      }
     
         $this->db->or_where_in('BM_ID',$id);
         $this->db->where('ROLE',1);
         if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',1);
       if($searchValue!= '')
       {
          $this->db->like('FN',$searchValue);
       }
       $this->db->from('USER_DETAILS');
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID","desc");
       $query = $this->db->get();
       $response = $query->result();
      
       return $response;
     }
       else if($filter=='Application_Completed')
       {
 
        if(!empty($Relationship))
      {
         $this->db->where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
         if($searchValue!= '')
         {
          $this->db->like('FN',$searchValue);
         }
         $this->db->where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
        }
        if(!empty($DSA))
        {
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',1);
            $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
            
            if($searchValue!= '')
            {
            $this->db->like('FN',$searchValue);
            }
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',1);
            $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
            
            if($searchValue!= '')
            {
              $this->db->like('LN',$searchValue);
            }
          }
          if(!empty($sales_id))
          {
            $this->db->or_where_in('SELES_ID',$sales_id);
            $this->db->where('ROLE',1);
            $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
            if($searchValue!= '')
            {
            $this->db->like('FN',$searchValue);
            }
            $this->db->or_where_in('SELES_ID',$sales_id);
            $this->db->where('ROLE',1);
            $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
            if($searchValue!= '')
            {
              $this->db->like('LN',$searchValue);
            }
          }
   
         $this->db->or_where_in('BM_ID',$id);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
        
         if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
      
       if($searchValue!= '')
       {
          $this->db->like('FN',$searchValue);
       }
       $this->db->from('USER_DETAILS');
      
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID","desc");
       $query = $this->db->get();
       $response = $query->result();
       return $response;
    }
    else if($filter=='Application_InCompleted')
    {
      if(!empty($Relationship))
      {
         $this->db->where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
           
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
             
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
      }
      if(!empty($DSA))
      {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
             
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
           
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
      }
      if(!empty($sales_id))
      {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
      }
         $this->db->or_where_in('BM_ID',$id);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
            
         if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
      
       if($searchValue!= '')
       {
         $this->db->like('FN',$searchValue);
       }
      
       $this->db->from('USER_DETAILS');
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID","desc");
       $query = $this->db->get();
       $response = $query->result();
       return $response;
    }
    else if($filter=='Cam_Completed')
    {
      if(!empty($Relationship))
      {
         $this->db->where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }

        }
        if(!empty($DSA))
        {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
        }
        if(!empty($sales_id))
      {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
      }
         $this->db->or_where_in('BM_ID',$id);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
         if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
       if($searchValue!= '')
       {
         $this->db->like('FN',$searchValue);
       }
       $this->db->from('USER_DETAILS');
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID","desc");
       $query = $this->db->get();
       $response = $query->result();
       return $response;
    }

    else if($filter=='PD_Completed')
    {
      if(!empty($Relationship))
      {
         $this->db->where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');

         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');

         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
        }
        if(!empty($DSA))
      {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');

         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');

         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
        }
        if(!empty($sales_id))
        {
          $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
          $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
        }
         $this->db->or_where_in('BM_ID',$id);
         $this->db->where('ROLE',1);
         $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');

         if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');

       if($searchValue!= '')
       {
         $this->db->like('FN',$searchValue);
       }
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
       $this->db->from('USER_DETAILS');
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID","desc");
       $query = $this->db->get();
       $response = $query->result();
       return $response;
     }
     else if($filter=='income_details_complete')
     {
       
      if(!empty($Relationship))
      {
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }

       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
      }
      if(!empty($DSA))
      {
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
      if(!empty($sales_id))
      {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
      }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');

       if($searchValue!= '')
     {
     $this->db->like('FN',$searchValue);
     }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',1);
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');

     if($searchValue!= '')
     {
       $this->db->like('FN',$searchValue);
     }
    

     $this->db->from('USER_DETAILS');
     $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
     }
     else if($filter=='Created')
     {
      if(!empty($Relationship))
      {
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
      if(!empty($DSA))
      {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
      if(!empty($sales_id))
      {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
      }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',1);
       $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');

       if($searchValue!= '')
     {
     $this->db->like('FN',$searchValue);
     }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',1);
     $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');

     if($searchValue!= '')
     {
       $this->db->like('FN',$searchValue);
     }
    

     $this->db->from('USER_DETAILS');
     $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
     }
     else if($filter=='reject')
     {
      if(!empty($Relationship))
      {
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
      if(!empty($DSA))
      {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
      if(!empty($sales_id))
      {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
      }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',1);
       $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');

       if($searchValue!= '')
     {
     $this->db->like('FN',$searchValue);
     }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',1);
     $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');

     if($searchValue!= '')
     {
       $this->db->like('FN',$searchValue);
     }
    

     $this->db->from('USER_DETAILS');
     $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
     }
     else
     {
      if(!empty($Relationship))
      {
           $this->db->where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',1);
           if($searchValue!= '')
           {
           $this->db->like('FN',$searchValue);
           }
           $this->db->where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',1);
           if($searchValue!= '')
           {
             $this->db->like('LN',$searchValue);
           }
          }
          if(!empty($DSA))
         {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',1);
           if($searchValue!= '')
           {
           $this->db->like('FN',$searchValue);
           }
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',1);
           if($searchValue!= '')
           {
             $this->db->like('LN',$searchValue);
           }
           
          }
          if(!empty($sales_id))
          {
            $this->db->or_where_in('SELES_ID',$sales_id);
            $this->db->where('ROLE',1);
        
            if($searchValue!= '')
            {
            $this->db->like('FN',$searchValue);
            }
            $this->db->or_where_in('SELES_ID',$sales_id);
            $this->db->where('ROLE',1);
        
            if($searchValue!= '')
            {
              $this->db->like('LN',$searchValue);
            }
          }
          

           $this->db->or_where_in('BM_ID',$id);
           $this->db->where('ROLE',1);
           if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('BM_ID',$id);
         $this->db->where('ROLE',1);
         if($searchValue!= '')
         {
           $this->db->like('FN',$searchValue);
         }

         $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         $this->db->limit($rowperpage,$row);
         $this->db->order_by("USER_DETAILS.ID","desc");
         $query = $this->db->get();
         $response = $query->result();
         return $response;
     }
 
}




/*-------------------------------- Addded by sonal Branch pagination and filter on 14_05_2022----on Connector--------------------------------------*/

public function get_Branch_RO_BM_connector($id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where_in('BM_ID',$id);
 $this->db->where('ROLE',14);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}
public function get_Branch_BM_BM_connector($Relationship,$id)
{
  //print_r($Relationship);
 // exit();
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
      if(!empty($id))
          {
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',2);
   }
   
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
$array[] = $value->UNIQUE_CODE;
   
 return $array;
}
public function get_customers_Branch_connector($Relationship,$DSA,$id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
    
          $this->db->where_in('BM_ID',$id);
          $this->db->where('ROLE',4);
          if(!empty($Relationship))
          {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',4);
          }
          if(!empty($DSA))
          {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',4);
          }

 
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}
/*-----------------------filter added by sonal on 12-05-2022------------------------------*/
public function get_all_connector_Branch($Relationship,$DSA,$sales_id,$id,$filter)
{
 if($filter=='all')
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if(!empty($Relationship))
     {
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',4);
     }
     if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',4);
     }
      if(!empty($sales_id))
          {
            $this->db->or_where_in('SELES_ID',$sales_id);
            $this->db->where('ROLE',4);
          }
     $this->db->where_in('BM_ID',$id);
     $this->db->where('ROLE',4);
     $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }
 else if($filter=='Complete')
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if(!empty($Relationship))
     {
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',4);
     $this->db->where("Profile_Status",'Complete'); 
     }
     if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',4);
     $this->db->where("Profile_Status",'Complete'); 
     }
     if(!empty($sales_id))
     {
       $this->db->or_where_in('SELES_ID',$sales_id);
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",'Complete'); 
     }

     $this->db->where_in('BM_ID',$id);
     $this->db->where('ROLE',4);
     $this->db->where("Profile_Status",'Complete'); 

     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }
 else if($filter=='Incomplete')
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if(!empty($Relationship))
     {
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',4);
     $this->db->where("Profile_Status",NULL); 
     }
     if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',4);
     $this->db->where("Profile_Status",NULL); 
     }
     if(!empty($sales_id))
     {
       $this->db->or_where_in('SELES_ID',$sales_id);
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",NULL); 
     }
     $this->db->where_in('BM_ID',$id);
     $this->db->where('ROLE',4);
     $this->db->where("Profile_Status",NULL); 

     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }

 else
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if(!empty($Relationship))
     {
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',4);
     }
     if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',4);
     }
     if(!empty($sales_id))
     {
       $this->db->or_where_in('SELES_ID',$sales_id);
       $this->db->where('ROLE',4);
       
     }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',4);
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }


   
}
function get_all_connector_Branch_filter($Relationship,$DSA,$sales_id,$id,$searchValue,$filter)
  {
      if($filter=='all')
      {
           $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=4 OR LN like '%".$searchValue."%' AND ROLE=4 ";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($Relationship))
           {
           $this->db->where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',4);
           }
           if(!empty($DSA))
           {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',4);
           }
           if(!empty($sales_id))
           {
             $this->db->or_where_in('SELES_ID',$sales_id);
             $this->db->where('ROLE',4);
             
           }
           $this->db->or_where_in('BM_ID',$id);
           $this->db->where('ROLE',4);
           //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 

   } 
   else if($filter=='Complete')
      {
           $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=4 OR LN like '%".$searchValue."%' AND ROLE=4 ";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($Relationship))
           {
           $this->db->where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',4);
           $this->db->where("Profile_Status",'Complete'); 
           }
           if(!empty($DSA))
           {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',4);
           $this->db->where("Profile_Status",'Complete'); 
           }
           if(!empty($sales_id))
           {
             $this->db->or_where_in('SELES_ID',$sales_id);
             $this->db->where('ROLE',4);
             $this->db->where("Profile_Status",'Complete'); 
           }
           $this->db->or_where_in('BM_ID',$id);
           $this->db->where('ROLE',4);
           $this->db->where("Profile_Status",'Complete'); 

           //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 

   } 
   else if($filter=='Incomplete')
      {
           $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=4 OR LN like '%".$searchValue."%' AND ROLE=4 ";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($Relationship))
           {
           $this->db->where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',4);
           $this->db->where("Profile_Status",NULL); 
           }
           if(!empty($DSA))
           {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',4);
           $this->db->where("Profile_Status",NULL); 
           }
           if(!empty($sales_id))
           {
             $this->db->or_where_in('SELES_ID',$sales_id);
             $this->db->where('ROLE',4);
             $this->db->where("Profile_Status",NULL); 
           }
           $this->db->or_where_in('BM_ID',$id);
           $this->db->where('ROLE',4);
           $this->db->where("Profile_Status",NULL); 

          // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 

   } 
  
 else
 {
   $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=4 OR LN like '%".$searchValue."%' AND ROLE=4 ";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($Relationship))
           {
           $this->db->where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',4);
           }
           if(!empty($DSA))
           {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',4);
           }
           if(!empty($sales_id))
           {
             $this->db->or_where_in('SELES_ID',$sales_id);
             $this->db->where('ROLE',4);
            
           }
           $this->db->or_where_in('BM_ID',$id);
           $this->db->where('ROLE',4);
           //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 


 }
  } 
 function get_all_connector_Branch_filter_with_page($Relationship,$DSA,$sales_id,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
  {
   if($filter=='all')
   {
    if(!empty($Relationship))
    {
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',4);
       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',4);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
      if(!empty($DSA))
      {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',4);
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',4);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
      if(!empty($sales_id))
           {
             $this->db->or_where_in('SELES_ID',$sales_id);
             $this->db->where('ROLE',4);
             if($searchValue!= '')
             {
             $this->db->like('FN',$searchValue);
             }
             $this->db->or_where_in('SELES_ID',$sales_id);
             $this->db->where('ROLE',4);
             if($searchValue!= '')
             {
               $this->db->like('LN',$searchValue);
             }
            
           }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',4);
       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',4);
     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
     $this->db->from('USER_DETAILS');
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   }
  else if($filter=='Complete')
   {
    if(!empty($Relationship))
    {
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",'Complete'); 

       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",'Complete'); 

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
      if(!empty($DSA))
    {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",'Complete'); 

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",'Complete'); 

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
      if(!empty($sales_id))
      {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete'); 

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete'); 

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
       
      }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",'Complete'); 

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',4);
     $this->db->where("Profile_Status",'Complete'); 

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
     $this->db->from('USER_DETAILS');
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   }
   else if($filter=='Incomplete')
   {
    if(!empty($Relationship))
    {
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
      if(!empty($DSA))
    {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
      if(!empty($sales_id))
      {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL); 


        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL); 


        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
       
      }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',4);
     $this->db->where("Profile_Status",NULL); 

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
     $this->db->from('USER_DETAILS');
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   }
    
   else
   {
    if(!empty($Relationship))
    { 
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',4);
     if($searchValue!= '')
     {
      $this->db->like('FN',$searchValue);
     }
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',4);
     if($searchValue!= '')
     {
       $this->db->like('LN',$searchValue);
     }
    }
    if(!empty($DSA))
    {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',4);
     if($searchValue!= '')
     {
     $this->db->like('FN',$searchValue);
     }
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',4);
     if($searchValue!= '')
     {
       $this->db->like('LN',$searchValue);
     }
    }
    if(!empty($sales_id))
      {
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',4);
      

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',4);
       


        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
       
      }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',4);
     if($searchValue!= '')
    {
    $this->db->like('FN',$searchValue);
    }
   $this->db->or_where_in('BM_ID',$id);
   $this->db->where('ROLE',4);
   if($searchValue!= '')
   {
      $this->db->like('FN',$searchValue);
   }
   $this->db->from('USER_DETAILS');
   //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $this->db->limit($rowperpage,$row);
   $this->db->order_by("USER_DETAILS.ID","desc");
   $query = $this->db->get();
   $response = $query->result();
   return $response;
   }

}


/*-------------------------------- Addded by sonal Branch pagination and filter on 14_05_2022----on Dsa--------------------------------------*/

public function get_Branch_RO_BM_dsa($id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where_in('BM_ID',$id);
 $this->db->where('ROLE',14);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}
public function get_Branch_BM_BM_dsa($Relationship,$id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',2);
     if(!empty($Relationship))
    { 
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',2);
    }
 
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}
public function get_customers_Branch_dsa($Relationship,$DSA,$id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where_in('BM_ID',$id);
 $this->db->where('ROLE',4);
 if(!empty($Relationship))
 { 
 $this->db->or_where_in('RO_ID',$Relationship);
 $this->db->where('ROLE',4);
 }
 if(!empty($DSA))
 { 
 $this->db->or_where_in('DSA_ID',$DSA);
 $this->db->where('ROLE',4);
 }

 
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}
/*-----------------------filter added by sonal on 12-05-2022------------------------------*/
public function get_all_dsa_Branch($Relationship,$DSA,$sales_id,$id,$filter)
{
 if($filter=='all')
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if(!empty($Relationship))
      { 
          $this->db->where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',2);
      }
      if(!empty($DSA))
      { 
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',2);
      }
      if(!empty($sales_id))
      { 
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',2);
      }
     $this->db->where_in('BM_ID',$id);
     $this->db->where('ROLE',2);
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }
 else if($filter=='Complete')
 {
   $this->db->select('count(*)as count');
   $this->db->from('USER_DETAILS');
   if(!empty($Relationship))
      { 
        $this->db->where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',2);
        $this->db->where("Profile_Status",'Complete'); 
      }
      if(!empty($DSA))
      { 

          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',2);
          $this->db->where("Profile_Status",'Complete'); 
      }
      if(!empty($sales_id))
      { 
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',2);
        $this->db->where("Profile_Status",'Complete');
      }

   $this->db->where_in('BM_ID',$id);
   $this->db->where('ROLE',2);
   $this->db->where("Profile_Status",'Complete'); 

  // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $query = $this->db->get();
   $response=$query->row();
   //echo $response->count;
   //exit;
   return $response->count;
 }
 else if($filter=='Incomplete')
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if(!empty($Relationship))
      { 
        $this->db->where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',2);
        $this->db->where("Profile_Status",NULL); 
      }
      if(!empty($DSA))
      { 
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',2);
        $this->db->where("Profile_Status",NULL); 
      }
      if(!empty($sales_id))
      { 
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',2);
        $this->db->where("Profile_Status",NULL); 
      }

     $this->db->where_in('BM_ID',$id);
     $this->db->where('ROLE',2);
     $this->db->where("Profile_Status",NULL); 

     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }

 else
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if(!empty($Relationship))
      { 
        $this->db->where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',2);
      }
      if(!empty($DSA))
      { 
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',2);
      }
      if(!empty($sales_id))
      { 
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',2);
      
      }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',2);
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }


   
}
function get_all_dsa_Branch_filter($Relationship,$DSA,$sales_id,$id,$searchValue,$filter)
  {
      if($filter=='all')
      {
           $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=2 OR LN like '%".$searchValue."%' AND ROLE=2 ";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($Relationship))
           { 
           $this->db->where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',2);
           }
           if(!empty($DSA))
           { 
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',2);
           }
           if(!empty($sales_id))
            { 
              $this->db->or_where_in('SELES_ID',$sales_id);
              $this->db->where('ROLE',2);
            
            }
           $this->db->or_where_in('BM_ID',$id);
           $this->db->where('ROLE',2);
           //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 

   }   
   else if($filter=='Complete')
      {
       $this->db->select('count(*)as count');
       $this->db->from('USER_DETAILS');
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%'AND ROLE=2 OR LN like '%".$searchValue."%' AND ROLE=2 ";
       // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
       $this->db->where($where);
       }
       if(!empty($Relationship))
        { 
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');
        }
        if(!empty($DSA))
        { 
      
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');
        }
        if(!empty($sales_id))
        { 
          $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',2);
          $this->db->where("Profile_Status",'Complete');
        
        }
        
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');
       //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
       return $response->count; 

   } 
   else if($filter=='Incomplete')
      {
           $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=2 OR LN like '%".$searchValue."%' AND ROLE=2 ";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($Relationship))
           { 
           $this->db->where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',2);
           $this->db->where("Profile_Status",NULL); 
           }
           if(!empty($DSA))
           { 

           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',2);
           $this->db->where("Profile_Status",NULL); 
           }
           if(!empty($sales_id))
           { 
             $this->db->or_where_in('SELES_ID',$sales_id);
             $this->db->where('ROLE',2);
             $this->db->where("Profile_Status",NULL); 
           }
           
           
           $this->db->or_where_in('BM_ID',$id);
           $this->db->where('ROLE',2);
           $this->db->where("Profile_Status",NULL); 

          // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 

   } 
  
 else
 {
   $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=2 OR LN like '%".$searchValue."%' AND ROLE=2 ";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($Relationship))
           { 
           $this->db->where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',2);
           }
           if(!empty($DSA))
           { 
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',2);
           }
           if(!empty($sales_id))
           { 
             $this->db->or_where_in('SELES_ID',$sales_id);
             $this->db->where('ROLE',2);
             
           }
           $this->db->or_where_in('BM_ID',$id);
           $this->db->where('ROLE',2);
           //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 


 }
  } 
 function get_all_dsa_Branch_filter_with_page($Relationship,$DSA,$sales_id,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
  {
   if($filter=='all')
   {
    if(!empty($Relationship))
    { 
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
      if(!empty($DSA))
      { 
 
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
      if(!empty($sales_id))
           { 
             $this->db->or_where_in('SELES_ID',$sales_id);
             $this->db->where('ROLE',2);
             if($searchValue!= '')
             {
             $this->db->like('FN',$searchValue);
             }
             $this->db->or_where_in('SELES_ID',$sales_id);
             $this->db->where('ROLE',2);
             if($searchValue!= '')
             {
               $this->db->like('LN',$searchValue);
             }
             
           }
 
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',2);
       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',2);
     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
     $this->db->from('USER_DETAILS');
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   }
  else if($filter=='Complete')
   {
    if(!empty($Relationship))
    { 
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',2);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
     {
      $this->db->like('FN',$searchValue);
     }
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',2);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
     {
       $this->db->like('LN',$searchValue);
     }
    }
    if(!empty($DSA))
    { 
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',2);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
     {
     $this->db->like('FN',$searchValue);
     }
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',2);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
     {
       $this->db->like('LN',$searchValue);
     }
    }
    if(!empty($sales_id))
    { 
      $this->db->or_where_in('SELES_ID',$sales_id);
      $this->db->where("Profile_Status",'Complete');
      if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
      $this->db->or_where_in('SELES_ID',$sales_id);
      $this->db->where("Profile_Status",'Complete');
      if($searchValue!= '')
      {
        $this->db->like('LN',$searchValue);
      }
      
    }


     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',2);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
    {
    $this->db->like('FN',$searchValue);
    }
   $this->db->or_where_in('BM_ID',$id);
   $this->db->where('ROLE',2);
   $this->db->where("Profile_Status",'Complete');

   if($searchValue!= '')
   {
      $this->db->like('FN',$searchValue);
   }
   $this->db->from('USER_DETAILS');
   //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $this->db->limit($rowperpage,$row);
   $this->db->order_by("USER_DETAILS.ID","desc");
   $query = $this->db->get();
   $response = $query->result();
   return $response;
   }
   else if($filter=='Incomplete')
   {
    if(!empty($Relationship))
    { 
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
      if(!empty($DSA))
      { 
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',2);
        $this->db->where("Profile_Status",NULL); 

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',2);
        $this->db->where("Profile_Status",NULL); 

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
      }
      if(!empty($sales_id))
    { 
      $this->db->or_where_in('SELES_ID',$sales_id);
      $this->db->where("Profile_Status",NULL); 
      if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
      $this->db->or_where_in('SELES_ID',$sales_id);
      $this->db->where("Profile_Status",NULL); 
      if($searchValue!= '')
      {
        $this->db->like('LN',$searchValue);
      }
      
    }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',2);
     $this->db->where("Profile_Status",NULL); 

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
     $this->db->from('USER_DETAILS');
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   }
    
   else
   {
    if(!empty($Relationship))
    {
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',2);
     if($searchValue!= '')
     {
      $this->db->like('FN',$searchValue);
     }
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',2);
     if($searchValue!= '')
     {
       $this->db->like('LN',$searchValue);
     }
    }
    if(!empty($DSA))
    {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',2);
     if($searchValue!= '')
     {
     $this->db->like('FN',$searchValue);
     }
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',2);
     if($searchValue!= '')
     {
       $this->db->like('LN',$searchValue);
     }
    }
    if(!empty($sales_id))
    { 
      $this->db->or_where_in('SELES_ID',$sales_id);
     
      if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
      $this->db->or_where_in('SELES_ID',$sales_id);
    
      if($searchValue!= '')
      {
        $this->db->like('LN',$searchValue);
      }
      
    }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',2);
     if($searchValue!= '')
    {
    $this->db->like('FN',$searchValue);
    }
   $this->db->or_where_in('BM_ID',$id);
   $this->db->where('ROLE',2);
   if($searchValue!= '')
   {
      $this->db->like('FN',$searchValue);
   }
    $this->db->from('USER_DETAILS');
   //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $this->db->limit($rowperpage,$row);
   $this->db->order_by("USER_DETAILS.ID","desc");
   $query = $this->db->get();
   $response = $query->result();
   return $response;
   }

}


//////////////////////////////////
/*-------------------------------- Addded by sonal Branch pagination and filter on 14_05_2022----on RO--------------------------------------*/

public function get_Branch_RO_BM_RO($id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where_in('BM_ID',$id);
 $this->db->where('ROLE',14);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}
public function get_Branch_BM_BM_RO($Relationship,$id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',2);
     if(!empty($Relationship))
    {
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',2);
    }
 
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}
public function get_customers_Branch_RO($Relationship,$DSA,$id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where_in('BM_ID',$id);
 $this->db->where('ROLE',4);
 if(!empty($Relationship))
    {
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',4);
    }
    if(!empty($DSA))
    {
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',4);
    }

 
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}
/*-----------------------filter added by sonal on 12-05-2022------------------------------*/
public function get_all_RO_Branch($Relationship,$DSA,$id,$filter)
{
 if($filter=='all')
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if(!empty($Relationship))
     {
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',14);
     }
     if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',14);
     }
     $this->db->where_in('BM_ID',$id);
     $this->db->where('ROLE',14);
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }
 else if($filter=='Complete')
 {
   $this->db->select('count(*)as count');
   $this->db->from('USER_DETAILS');
   if(!empty($Relationship))
     {
        $this->db->where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',14);
        $this->db->where("Profile_Status",'Complete'); 
     }
     if(!empty($DSA))
     {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',14);
        $this->db->where("Profile_Status",'Complete'); 
     }

   $this->db->where_in('BM_ID',$id);
   $this->db->where('ROLE',14);
   $this->db->where("Profile_Status",'Complete'); 

  // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $query = $this->db->get();
   $response=$query->row();
   //echo $response->count;
   //exit;
   return $response->count;
 }
 else if($filter=='Incomplete')
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if(!empty($Relationship))
     {
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",NULL); 
     }
     if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",NULL); 
     }
     $this->db->where_in('BM_ID',$id);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",NULL); 

     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }

 else
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if(!empty($Relationship))
     {
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',14);
     }
     if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',14);
     }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',14);
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }


   
}
function get_all_RO_Branch_filter($Relationship,$DSA,$id,$searchValue,$filter)
  {
      if($filter=='all')
      {
           $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=14 OR LN like '%".$searchValue."%' AND ROLE=14 ";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($Relationship))
            {
            $this->db->where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',14);
            }
            if(!empty($DSA))
            {
              $this->db->or_where_in('DSA_ID',$DSA);
              $this->db->where('ROLE',14);
            }
           $this->db->or_where_in('BM_ID',$id);
           $this->db->where('ROLE',14);
           //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 

   }   
   else if($filter=='Complete')
      {
       $this->db->select('count(*)as count');
       $this->db->from('USER_DETAILS');
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%'AND ROLE=14 OR LN like '%".$searchValue."%' AND ROLE=14 ";
       // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
       $this->db->where($where);
       }
       if(!empty($Relationship))
       {
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');
       }
       if(!empty($DSA))
       {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');
       }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');
       //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
       return $response->count; 

   } 
   else if($filter=='Incomplete')
      {
           $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=14 OR LN like '%".$searchValue."%' AND ROLE=14 ";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($Relationship))
           {
           $this->db->where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',14);
           $this->db->where("Profile_Status",NULL); 
           }
           if(!empty($DSA))
           {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',14);
           $this->db->where("Profile_Status",NULL); 
           }
           $this->db->or_where_in('BM_ID',$id);
           $this->db->where('ROLE',14);
           $this->db->where("Profile_Status",NULL); 

          // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 

   } 
  
 else
 {
   $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=14 OR LN like '%".$searchValue."%' AND ROLE=14 ";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($Relationship))
           {
           $this->db->where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',14);
           }
           if(!empty($DSA))
           {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',14);
           }
           $this->db->or_where_in('BM_ID',$id);
           $this->db->where('ROLE',14);
           //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 


 }
  } 
 function get_all_RO_Branch_filter_with_page($Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
  {
   if($filter=='all')
   {
    if(!empty($Relationship))
    {
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
      if(!empty($DSA))
      {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',14);
     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
     $this->db->from('USER_DETAILS');
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   }
  else if($filter=='Complete')
   {
    if(!empty($Relationship))
    {
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
     {
      $this->db->like('FN',$searchValue);
     }
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
     {
       $this->db->like('LN',$searchValue);
     }
    }
    if(!empty($DSA))
    {

     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
     {
     $this->db->like('FN',$searchValue);
     }
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
     {
       $this->db->like('LN',$searchValue);
     }
    }

     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
    {
    $this->db->like('FN',$searchValue);
    }
   $this->db->or_where_in('BM_ID',$id);
   $this->db->where('ROLE',14);
   $this->db->where("Profile_Status",'Complete');

   if($searchValue!= '')
   {
      $this->db->like('FN',$searchValue);
   }
   $this->db->from('USER_DETAILS');
   //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $this->db->limit($rowperpage,$row);
   $this->db->order_by("USER_DETAILS.ID","desc");
   $query = $this->db->get();
   $response = $query->result();
   return $response;
   }
   else if($filter=='Incomplete')
   {
    
    if(!empty($Relationship))
    {
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       $this->db->where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
       if(!empty($DSA))
       {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
      }
       $this->db->or_where_in('BM_ID',$id);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",NULL); 

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
     $this->db->from('USER_DETAILS');
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   }
    
   else
   {
      
    if(!empty($Relationship))
    {
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',14);
     if($searchValue!= '')
     {
      $this->db->like('FN',$searchValue);
     }
     $this->db->where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',14);
     if($searchValue!= '')
     {
       $this->db->like('LN',$searchValue);
     }

    }
    if(!empty($DSA))
    {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',14);
     if($searchValue!= '')
     {
     $this->db->like('FN',$searchValue);
     }
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',14);
     if($searchValue!= '')
     {
       $this->db->like('LN',$searchValue);
     }
    }
     $this->db->or_where_in('BM_ID',$id);
     $this->db->where('ROLE',14);
     if($searchValue!= '')
    {
    $this->db->like('FN',$searchValue);
    }
   $this->db->or_where_in('BM_ID',$id);
   $this->db->where('ROLE',14);
   if($searchValue!= '')
   {
      $this->db->like('FN',$searchValue);
   }
    $this->db->from('USER_DETAILS');
   //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $this->db->limit($rowperpage,$row);
   $this->db->order_by("USER_DETAILS.ID","desc");
   $query = $this->db->get();
     
   //$response = $query->result();
   //return $response;
   }

}
public function customer_for_download()
{
      $this->db->select('*');
          $this->db->where("ROLE", 1);   
          $this->db->from('USER_DETAILS');
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          $this->db->order_by("USER_DETAILS.ID", "desc");
          $query = $this->db->get()->result();
          return $query;   
}
public function dsa_for_download()
{
          $this->db->select('*');
        $this->db->where("ROLE", 2);   
      $q = $this->db->from('USER_DETAILS');
      $this->db->order_by("USER_DETAILS.ID", "desc");
      $response = $q->get()->result();
          return $response;
}
public function connector_for_download()
{
      $this->db->select('*');
          $this->db->where("ROLE", 4);   
          $q = $this->db->from('USER_DETAILS');
          $this->db->order_by("ID", "desc");
          $response = $q->get()->result();
          return $response;
}

        /*--------------------------------added by sonal--30-04-2022--- Legal Pagination------------------------------>*/
      
        function Get_Total_No_Customer_Legal()
        {
              $this->db->select('count(*) as count');
                      $this->db->from('USER_DETAILS');
                      $this->db->where('ROLE',18);
                      $query = $this->db->get();
                  $response = $query->row();
                      return $response->count;
                      //print_r($this->db->last_query());
                      //exit;
        }
        function Get_Customer_Filter_Legal($searchValue)
        {
                  $this->db->select('count(*) as count');
                      $this->db->from('USER_DETAILS');
                      $this->db->where('ROLE',18);
                      if($searchValue!= '')
                      {
                       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=18 ";
                 
                      $this->db->where($where);
                      }
                      $query = $this->db->get();
                  $response = $query->row();
 
                      //exit;
                      return $response->count;
        }
        function Get_Customer_With_Page_Legal($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
        {
                 $this->db->select('*');
                      $this->db->from('USER_DETAILS');
                     $this->db->where('ROLE',18);
                      if($searchValue!= '')
                      {
                       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=";
                   
                       $this->db->where($where);
                      }
 
                      $this->db->order_by($columnName, $columnSortOrder);
                      $this->db->limit($rowperpage,$row);
                      $query = $this->db->get();
                      $response = $query->result();
                      //print_r($this->db->last_query());
                      //exit;
                      //exit;
                      return $response;
        }
        /*---------------------------------- Addded by papiha on 19_05_2022---------------------------------------------------------*/
        function get_Sales_BM($Branch_manger)
        {
          $array=array();
          $this->db->select('UNIQUE_CODE');
              $this->db->from('USER_DETAILS');
              if(!empty($Branch_manger))
              {
              $this->db->where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',21);
        }
          $query = $this->db->get();
          $response=$query->result();
          foreach ($response as $value) 
              $array[] = $value->UNIQUE_CODE;
        
          return $array;
        }

        
/*--------------------------------added by sonal--26-05-2022--- admin Dsa Pagination------------------------------>*/
      
function Get_Total_No_Customer_admin_DSA($filter)
{
 if($filter=='all')
 {
   $this->db->select('count(*) as count');
   $this->db->from('USER_DETAILS');
   $this->db->where('ROLE',2);
   $query = $this->db->get();
   $response = $query->row();
   return $response->count;
}



else if($filter=='Incomplete')
 {
   $this->db->select('count(*) as count');
   $this->db->from('USER_DETAILS');
   $this->db->where('ROLE',2);
   $this->db->where("Profile_Status",NULL); 
   $query = $this->db->get();
   $response = $query->row();
   return $response->count;
 }
 else if($filter=='Complete')
 {
   $this->db->select('count(*) as count');
   $this->db->from('USER_DETAILS');
   $this->db->where('ROLE',2);
   $this->db->where("Profile_Status",'Complete');
   $query = $this->db->get();
   $response = $query->row();
   return $response->count;
 }
 else if($filter=='Created')
 {
   $this->db->select('count(*) as count');
   $this->db->from('USER_DETAILS');
   $this->db->where('ROLE',2);
   $this->db->where("CUSTOMER_MORE_DETAILS.STATUS ",'Created');
   $query = $this->db->get();
   $response = $query->row();
   return $response->count;
 }
 else
 {
   $this->db->select('count(*) as count');
   $this->db->from('USER_DETAILS');
   $this->db->where('ROLE',2);
   $query = $this->db->get();
   $response = $query->row();
   return $response->count;

 }
}
/* 
function Get_Customer_Filter_admin_DSA($searchValue,$filter)
{
 if($filter=='all')
 {

       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=2 ";
       $this->db->where($where);
       }
       $query = $this->db->get();
       $response = $query->row();
       return $response->count;
 }
 else if($filter=='Complete')

     {
       
       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=2 ";
       $this->db->where($where);
       }
       $query = $this->db->get();
       $response = $query->row();
       return $response->count;
     }

     else if($filter=='Incomplete')
     {
       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=2 ";
       $this->db->where($where);
       }
       $query = $this->db->get();
       $response = $query->row();
       return $response->count;
     }
     else if($filter=='Created')
     {
       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',2);
       $this->db->where("CUSTOMER_MORE_DETAILS.STATUS ",'Created');

       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=2 ";
       $this->db->where($where);
       }
       $query = $this->db->get();
       $response = $query->row();
       return $response->count;
     }
     else
     {
       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=2 ";
       $this->db->where($where);
       }
       $query = $this->db->get();
       $response = $query->row();
       return $response->count;
     }

}
*/  // changes by priya 9-06-2022
function Get_Customer_Filter_admin_DSA($searchValue,$filter,$Start_Date,$End_Date,$Reffered_by,$location)
{



 if($filter=='all')
 {
       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=2 ";
       $this->db->where($where);
       }
       if($Start_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
       }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
         if($Reffered_by!='' )
      {
             $where = "Refer_By_Name like '%".$Reffered_by."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
         if($location!='' )
      {
             $where = "Location like '%".$location."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       $query = $this->db->get();
       $response = $query->row();
       return $response->count;
 }
 else if($filter=='Complete')

     {
       
       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=2 ";
       $this->db->where($where);
       }
            if($Start_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
        
          
        
      }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
            if($Reffered_by!='' )
      {
             $where = "Refer_By_Name like '%".$Reffered_by."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       if($location!='' )
      {
             $where = "Location like '%".$location."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       $query = $this->db->get();
       $response = $query->row();
       return $response->count;
     }

     else if($filter=='Incomplete')
     {
       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=2 ";
       $this->db->where($where);
       }
            if($Start_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
        
          
        
      }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
            if($Reffered_by!='' )
      {
             $where = "Refer_By_Name like '%".$Reffered_by."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       if($location!='' )
      {
             $where = "Location like '%".$location."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       $query = $this->db->get();
       $response = $query->row();
       return $response->count;
     }
     else if($filter=='Created')
     {
       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',2);
       $this->db->where("CUSTOMER_MORE_DETAILS.STATUS ",'Created');

       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=2 ";
       $this->db->where($where);
       }
            if($Start_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
        
          
        
      }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
            if($Reffered_by!='' )
      {
             $where = "Refer_By_Name like '%".$Reffered_by."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       if($location!='' )
      {
             $where = "Location like '%".$location."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       $query = $this->db->get();
       $response = $query->row();
       return $response->count;
     }
  
     else
     {
       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=2 ";
       $this->db->where($where);
       }
       if($Start_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
      
      }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
            if($Reffered_by!='' )
      {
             $where = "Refer_By_Name like '%".$Reffered_by."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       if($location!='' )
      {
             $where = "Location like '%".$location."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       $query = $this->db->get();
       $response = $query->row();

   // $str = $this->db->last_query();
   
    //echo "<pre>";
    //print_r($str);
   // exit;
      return $response->count;
     }

}

function Get_Customer_With_Page_admin_DSA($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter,$Start_Date,$End_Date,$Reffered_by,$location)
{
     if($filter=='all')
     {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=2 ";
       $this->db->where($where);
       }
            if($Start_Date!='' )
      {
       $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
        
      }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
            if($Reffered_by!='' )
      {
             $where = "Refer_By_Name like '%".$Reffered_by."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       if($location!='' )
      {
             $where = "Location like '%".$location."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       $this->db->order_by('ID','desc');
       $this->db->limit($rowperpage,$row);
       $query = $this->db->get();
       $response = $query->result();
             
       return $response;
     }
     else if($filter=='Incomplete')
     {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=2 ";
       $this->db->where($where);
       }
            if($Start_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
        
          
        
      }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
            if($Reffered_by!='' )
      {
           $where = "Refer_By_Name like '%".$Reffered_by."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       if($location!='' )
      {
             $where = "Location like '%".$location."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       $this->db->order_by('ID' ,'desc');
       $this->db->limit($rowperpage,$row);
       $query = $this->db->get();
       $response = $query->result();
             
       return $response;
     }
     else if($filter=='Complete')
     {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=2";
       $this->db->where($where);
       }
      if($Start_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
      }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
      }
      if($Reffered_by!='' )
      {
           $where = "Refer_By_Name like '%".$Reffered_by."%' AND ROLE=2 ";
           $this->db->where($where);
      }
       if($location!='' )
      {
             $where = "Location like '%".$location."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       $this->db->order_by('ID','desc');
       $this->db->limit($rowperpage,$row);
       $query = $this->db->get();
       $response = $query->result();
       return $response;
     }
     else if($filter=='Created')
     {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',2);
       $this->db->where("CUSTOMER_MORE_DETAILS.STATUS ",'Created');
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=2";
       $this->db->where($where);
       }
            if($Start_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
     
      }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
            if($Reffered_by!='' )
      {
             $where = "Refer_By_Name like '%".$Reffered_by."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       if($location!='' )
      {
             $where = "Location like '%".$location."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }
       $this->db->order_by('ID','desc');
       $this->db->limit($rowperpage,$row);
       $query = $this->db->get();
       $response = $query->result();
       return $response;
     }
     else
     {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=2";
       $this->db->where($where);
       }
            if($Start_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
        
          
        
      }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
      if($Reffered_by!='')
      {
       $where = "Refer_By_Name like '%".$Reffered_by."%' AND ROLE=2 ";
       $this->db->where($where);
        
      }
       if($location!='' )
      {
             $where = "Location like '%".$location."%' AND ROLE=2 ";
           $this->db->where($where);
        
      }

       $this->db->order_by('ID','desc');
       $this->db->limit($rowperpage,$row);
       $query = $this->db->get();
       $response = $query->result();
       return $response;
     }

}




/*--------------------------------added by sonal--26-05-2022--- admin Connector Pagination------------------------------>*/
      
function Get_Total_No_Customer_admin_Connector($filter)
{
 if($filter=='all')
 {
   $this->db->select('count(*) as count');
   $this->db->from('USER_DETAILS');
   $this->db->where('ROLE',4);
   $query = $this->db->get();
   $response = $query->row();
   return $response->count;
}



else if($filter=='Incomplete')
 {
   $this->db->select('count(*) as count');
   $this->db->from('USER_DETAILS');
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL); 
   $query = $this->db->get();
   $response = $query->row();
   return $response->count;
 }
 else if($filter=='Complete')
 {
   $this->db->select('count(*) as count');
   $this->db->from('USER_DETAILS');
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
   $query = $this->db->get();
   $response = $query->row();
   return $response->count;
 }
 else if($filter=='Created')
 {
   $this->db->select('count(*) as count');
   $this->db->from('USER_DETAILS');
   $this->db->where('ROLE',4);
   $this->db->where("CUSTOMER_MORE_DETAILS.STATUS ",'Created');
   $query = $this->db->get();
   $response = $query->row();
   return $response->count;
 }
 else
 {
   $this->db->select('count(*) as count');
   $this->db->from('USER_DETAILS');
   $this->db->where('ROLE',4);
   $query = $this->db->get();
   $response = $query->row();
   return $response->count;

 }
}
function Get_Customer_Filter_admin_Connector($searchValue,$filter,$Start_Date,$End_Date)
{
 if($filter=='all')
 {

       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',4);
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=4 ";
       $this->db->where($where);
       }
        if($Start_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
       }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
       $query = $this->db->get();
       $response = $query->row();
       return $response->count;
 }
 else if($filter=='Complete')

     {
       
       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=4 ";
       $this->db->where($where);
       }
        if($Start_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
       }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
       $query = $this->db->get();
       $response = $query->row();
       return $response->count;
     }

     else if($filter=='Incomplete')
     {
       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=4 ";
       $this->db->where($where);
       }
        if($Start_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
       }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
       $query = $this->db->get();
       $response = $query->row();
       return $response->count;
     }
     else if($filter=='Created')
     {
       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',4);
       $this->db->where("CUSTOMER_MORE_DETAILS.STATUS ",'Created');

       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=4 ";
       $this->db->where($where);
       }
        if($Start_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
       }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
       $query = $this->db->get();
       $response = $query->row();
       return $response->count;
     }
     else
     {
       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',4);
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=4 ";
       $this->db->where($where);
       }
        if($Start_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
       }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
       $query = $this->db->get();
       $response = $query->row();
       return $response->count;
     }

}
function Get_Customer_With_Page_admin_Connector($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter,$Start_Date,$End_Date,$Reffered_by,$location)
{
     if($filter=='all')
     {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',4);
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=4 ";
       $this->db->where($where);
       }
        if($Start_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
       }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
           if($Reffered_by!='' )
      {
             $where = "Refer_By_Name like '%".$Reffered_by."%' AND ROLE=4 ";
           $this->db->where($where);
        
      }
         if($location!='' )
      {
             $where = "Location like '%".$location."%' AND ROLE=4 ";
           $this->db->where($where);
        }
       $this->db->order_by('ID','desc');
       $this->db->limit($rowperpage,$row);
       $query = $this->db->get();
       $response = $query->result();
             
       return $response;
     }
     else if($filter=='Incomplete')
     {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",NULL); 

       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=4 ";
       $this->db->where($where);
       }
        if($Start_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
       }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
           if($Reffered_by!='' )
      {
             $where = "Refer_By_Name like '%".$Reffered_by."%' AND ROLE=4 ";
           $this->db->where($where);
        
      }
         if($location!='' )
      {
             $where = "Location like '%".$location."%' AND ROLE=4 ";
           $this->db->where($where);
       } 
       $this->db->order_by('ID','desc');
       $this->db->limit($rowperpage,$row);
       $query = $this->db->get();
       $response = $query->result();
             
       return $response;
     }
     else if($filter=='Complete')
     {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',4);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=4";
       $this->db->where($where);
       }
        if($Start_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
       }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
           if($Reffered_by!='' )
      {
             $where = "Refer_By_Name like '%".$Reffered_by."%' AND ROLE=4 ";
           $this->db->where($where);
        
      }
         if($location!='' )
      {
             $where = "Location like '%".$location."%' AND ROLE=4 ";
           $this->db->where($where);
        }
       $this->db->order_by('ID','desc');
       $this->db->limit($rowperpage,$row);
       $query = $this->db->get();
       $response = $query->result();
       return $response;
     }
     else if($filter=='Created')
     {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',4);
       $this->db->where("CUSTOMER_MORE_DETAILS.STATUS ",'Created');

       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=4";
       $this->db->where($where);
       }
        if($Start_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
       }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
           if($Reffered_by!='' )
      {
             $where = "Refer_By_Name like '%".$Reffered_by."%' AND ROLE=4 ";
           $this->db->where($where);
        
      }
         if($location!='' )
      {
             $where = "Location like '%".$location."%' AND ROLE=4 ";
           $this->db->where($where);
        }
       $this->db->order_by('ID','desc');
       $this->db->limit($rowperpage,$row);
       $query = $this->db->get();
       $response = $query->result();
       return $response;
     }
     else
     {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',4);
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=4";
       $this->db->where($where);
       }
        if($Start_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
       }
      if($End_Date!='' )
      {
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
        
      }
           if($Reffered_by!='' )
      {
             $where = "Refer_By_Name like '%".$Reffered_by."%' AND ROLE=4 ";
           $this->db->where($where);
        
      }
         if($location!='' )
      {
             $where = "Location like '%".$location."%' AND ROLE=4 ";
           $this->db->where($where);
        }
       $this->db->order_by('ID','desc');
       $this->db->limit($rowperpage,$row);
       $query = $this->db->get();
       $response = $query->result();
       
       return $response;
     }

}
function getCustomersList_count($filter_branch_name , $filter_Start_Date, $filter_End_Date){
      
  if( $filter_branch_name != '') 
  {

       if( $filter_branch_name == 'All') 
       {
          /*$this->db->select('Branch_name, count(*) as count');
          $this->db->from('combined_credit_bureau');
            $query = $this->db->get();
            $response = $query->result();
            return $response;

            $response=array();
            $query=$this->db->select('t1.*,t2.*')
            ->from('combined_credit_bureau as t2')
            ->join('idccr_users as t1','t1.EMAIL=t2.IDCCR_user','RIGHT')
            ->group_by('t2.Branch_name')
            ->get();
            $response=$qyery->result();
            return $response;*/
            $this->db->select('t2.Branch_name, count(*)as count');
            $this->db->from('combined_credit_bureau as t2');
            $this->db->join('idccr_users as t1','t1.Email=t2.IDCCR_user','RIGHT');
           // $this->db->where('t1.Branch_name', $filter_branch_name);
            $this->db->where('t2.created_date >=', $filter_Start_Date);
            $this->db->where('t2.created_date <=', $filter_End_Date);
            $this->db->group_by('t2.Branch_name');
            $query = $this->db->get();
            $response = $query->result();
            return $response;
       }
      else
      {
          $this->db->select('t2.Branch_name, count(*)as count');
          $this->db->from('combined_credit_bureau as t2');
          $this->db->join('idccr_users as t1','t1.Email=t2.IDCCR_user','RIGHT');
          $this->db->where('t1.Branch_name', $filter_branch_name);
          $this->db->where('t2.created_date >=', $filter_Start_Date);
          $this->db->where('t2.created_date <=', $filter_End_Date);
          $this->db->group_by('t2.Branch_name');
          $query = $this->db->get();
          $response = $query->result();
      //       $executedQuery = $this->db->last_query();
    //  print_r($executedQuery);
    // exit;
          return $response;
        }
  }
 
  else{
  $this->db->select('Branch_name, count(*) as count');
  $this->db->from('combined_credit_bureau');
    $this->db->group_by('Branch_name');
  $query = $this->db->get();
  $response = $query->result();
  return $response;

  }
}   
public function get_created_date()
  {
	        $this->db->select('UNIQUE_CODE,CREATED_AT');
            $this->db->where("ROLE", 1);   
            $this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $query = $this->db->get()->result();
		    foreach($query As $q)
			{
				$last= date('Y-m-d', strtotime($q->CREATED_AT));
				 //UPDATE customer_more_details SET last_updated_date = $q->CREATED_AT where customer_more_details.CUST_ID=$q->UNIQUE_CODE
			     $data=array('last_updated_date'=>$last);
				 $this->db->where('CUST_ID', $q->UNIQUE_CODE);
                 $this->db->update('CUSTOMER_MORE_DETAILS',$data);
				 print_r($this->db->last_query());
                  
			}
     //return $query;   
  }
  /*---------------------------------------------------------- Addded by papiha on 03_06_022--------------------------------------------------*/
  	/*------------------------- Added by papiha on 16_05_2022--------------------------------------------------------*/
	public function get_all_customers_Admin()
	{
		    $this->db->select('count(*) as count ');
            $this->db->where("ROLE",1 );   
			$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $q = $this->db->from('USER_DETAILS');
            $this->db->order_by("USER_DETAILS.ID", "desc");
            $query = $this->db->get();
			$response=$query->row();
			return $response->count; 

	}
	 public function get_all_customers_Admin_filter($searchValue,$filter_by,$Start_Date,$End_Date,$Reffered_by,$location)
     {
            /*   $this->db->select('count(*)as count');
              $this->db->from('USER_DETAILS');
          if($searchValue!= '')
              {
              $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
              // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
              $this->db->where($where);
              }
        if($Start_Date!='' && $End_Date!='')
        {
          if($this->db->where('USER_DETAILS.last_updated_date IS NOT NULL'))
          {
           $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
           $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
          }
          else
          {
             $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date >=', $Start_Date);
             $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date <=', $End_Date);
            
          }
        }
              $this->db->where("ROLE",1 );   
              $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
              $query = $this->db->get();
              $response=$query->row();
              //echo $response->count;
              //exit;
              return $response->count; */
             /* $this->db->select('count(*)as count');
              $this->db->from('USER_DETAILS');
              if($searchValue!= '')
              {
              $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
              // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
              $this->db->where($where);
              }
         if($Start_Date!='' )
        {
             $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date >=', $Start_Date);
          
            
          
        }
        if($End_Date!='' )
        {
             $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date <=', $End_Date);
          
        }
        if($filter_by=='REJECT' || $filter_by=='HOLD' )
        {
          if($filter_by=='REJECT')
          {
            $this->db->where('USER_DETAILS.credit_sanction_status =', 'reject');
            $this->db->or_where('USER_DETAILS.credit_sanction_status =', 'REJECT');
          }
          else{
            
             $this->db->where('USER_DETAILS.credit_sanction_status =', 'HOLD');
          }
        }
        if($filter_by!='all' && $filter_by!='' && $filter_by!='Select Filter')
        {
            $this->db->where('CUSTOMER_MORE_DETAILS.STATUS =', $filter_by);
        }
          
               $this->db->where("ROLE",1 );   
              $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        //$this->db->limit($rowperpage,$row);
              $this->db->order_by("USER_DETAILS.ID","desc");
              $query = $this->db->get();
              $response=$query->row();
            //  print_r($executedQuery);
             // echo $response->count;
            // exit;
            return $response->count;*/
            $this->db->select('count(*)as count');
            $this->db->from('USER_DETAILS');
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
            // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
            $this->db->where($where);
            }
       if($Start_Date!='' )
      {
           $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date >=', $Start_Date);
        
          
        
      }
      if($End_Date!='' )
      {
           $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date <=', $End_Date);
        
      }
      if($filter_by=='REJECT' || $filter_by=='HOLD' )
      {
        if($filter_by=='REJECT')
        {
          $this->db->where('USER_DETAILS.credit_sanction_status =', 'reject');
          $this->db->or_where('USER_DETAILS.credit_sanction_status =', 'REJECT');
        }
        else{
          
           $this->db->where('USER_DETAILS.credit_sanction_status =', 'HOLD');
        }
      }
      if($filter_by!='all' && $filter_by!='' && $filter_by!='Select Filter' && $filter_by!='REJECT' && $filter_by!='reject' && $filter_by!='HOLD')
      {
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS =', $filter_by);
      }

      if($Reffered_by!='' )
      {
           $where = "USER_DETAILS.Refer_By_Name like '%".$Reffered_by."%' AND ROLE=1 ";
           $this->db->where($where);
        
      }
      if($location!='' )
      {
           $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=1 ";
           $this->db->where($where);
      }
             $this->db->where("ROLE",1 );   
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          
            $this->db->order_by("USER_DETAILS.ID","desc");
           // $query = $this->db->get()->result();
         // $executedQuery = $this->db->last_query();
           //print_r($executedQuery);
         //  exit;
           // return $query; 
           $query = $this->db->get();
           $response=$query->row();
           return $response->count;

    
      } 
    public function get_all_customers_Admin_filter_pagination($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date,$Reffered_by,$location)
     {
      
     
               $this->db->select('*');
              $this->db->from('USER_DETAILS');
              if($searchValue!= '')
              {
              $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
              // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
              $this->db->where($where);
              }
         if($Start_Date!='' )
        {
             $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date >=', $Start_Date);
          
            
          
        }
        if($End_Date!='' )
        {
             $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date <=', $End_Date);
          
        }
        if($filter_by=='REJECT' || $filter_by=='HOLD' )
        {
          if($filter_by=='REJECT')
          {
            $this->db->where('USER_DETAILS.credit_sanction_status =', 'reject');
            $this->db->or_where('USER_DETAILS.credit_sanction_status =', 'REJECT');
            if($Start_Date!='' )
            {
                 $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date >=', $Start_Date);
              
                
              
            }
            if($End_Date!='' )
            {
                 $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date <=', $End_Date);
              
            }
          }
          else{
            
             $this->db->where('USER_DETAILS.credit_sanction_status =', 'HOLD');
          }
        }
        if($filter_by!='all' && $filter_by!='' && $filter_by!='Select Filter' && $filter_by!='REJECT' && $filter_by!='reject' && $filter_by!='HOLD')
        {
            $this->db->where('CUSTOMER_MORE_DETAILS.STATUS =', $filter_by);
        }
       if($Reffered_by!='' )
      {
           $where = "USER_DETAILS.Refer_By_Name like '%".$Reffered_by."%' AND ROLE=1 ";
           $this->db->where($where);
        
      }
      if($location!='' )
      {
           $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=1 ";
           $this->db->where($where);
      }
               $this->db->where("ROLE",1 );   
              $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
              $this->db->limit($rowperpage,$row);
              $this->db->order_by("USER_DETAILS.ID","desc");
              $query = $this->db->get()->result();
             //$executedQuery = $this->db->last_query();
             //print_r($executedQuery);
             //exit;
              return $query; 

      }



 function getReferredByData()
    {
       $this->db->select('Refer_By_Name');
      $this->db->where('ROLE', 2); 
      $this->db->distinct();
      $this->db->from('USER_DETAILS');        
      $query = $this->db->get();
     $response = $query->result();
      return $response;
    }

   function getLocationByData()
    {
       $this->db->select('Location');
      $this->db->where('ROLE', 2); 
      $this->db->distinct();
      $this->db->from('USER_DETAILS');        
      $query = $this->db->get();
     $response = $query->result();
      return $response;
    }


    
function Get_Total_no_of_sanction_letters($filter_by)
  {

        if($filter_by =='All')
        {
			  $this->db->select('count(*) as count');
			$this->db->from('sanction_letter_values');
		$this->db->join('USER_DETAILS','sanction_letter_values.customer_id= USER_DETAILS.UNIQUE_CODE');
	    
      $this->db->order_by("sanction_letter_values.last_updated", "desc");
      $query = $this->db->get();
      $response = $query->row();
      return $response->count;
        }
		else if($filter_by =='SubmitedforApproval')
		{
			  $this->db->select('count(*) as count');
			$this->db->from('sanction_letter_values');
			$this->db->join('USER_DETAILS','sanction_letter_values.customer_id= USER_DETAILS.UNIQUE_CODE');
				$this->db->where('sanction_letter_values.Status','Submited for Approval');
			$this->db->order_by("sanction_letter_values.last_updated", "desc");
			$query = $this->db->get();
			$response = $query->row();
			return $response->count;
		}
		else if($filter_by =='Approved')
		{
			  $this->db->select('count(*) as count');
			$this->db->from('sanction_letter_values');
			$this->db->join('USER_DETAILS','sanction_letter_values.customer_id= USER_DETAILS.UNIQUE_CODE');
				$this->db->where('sanction_letter_values.Status','Approved');
			$this->db->order_by("sanction_letter_values.last_updated", "desc");
			$query = $this->db->get();
			$response = $query->row();
			return $response->count;
		}
		

    
   


            
 
  }
  function Get_sanction_letters($searchValue ,$filter_by)
  {
  
		if($filter_by =='All')
        {
			  $this->db->select('count(*) as count');
           $this->db->from('sanction_letter_values');
		   
                    if($searchValue!= '')
                    {
                    $where = "USER_DETAILS.FN like '%".$searchValue."%' OR USER_DETAILS.LN like '%".$searchValue."%' ";
                    $this->db->where($where);
                    }
	            $this->db->join('USER_DETAILS','sanction_letter_values.customer_id= USER_DETAILS.UNIQUE_CODE');
         $this->db->order_by("sanction_letter_values.last_updated", "desc");
                $query = $this->db->get();
                 $response = $query->row();

                return $response->count;
		}
		else if($filter_by =='SubmitedforApproval')
		{
			  $this->db->select('count(*) as count');
           $this->db->from('sanction_letter_values');
		   
                    if($searchValue!= '')
                    {
                    $where = "USER_DETAILS.FN like '%".$searchValue."%' OR USER_DETAILS.LN like '%".$searchValue."%' ";
                    $this->db->where($where);
                    }
						$this->db->where('sanction_letter_values.Status','Submited for Approval');
	            $this->db->join('USER_DETAILS','sanction_letter_values.customer_id= USER_DETAILS.UNIQUE_CODE');
         $this->db->order_by("sanction_letter_values.last_updated", "desc");
                $query = $this->db->get();
                 $response = $query->row();

                return $response->count;
		}
		else if($filter_by =='Approved')
		{
			  $this->db->select('count(*) as count');
           $this->db->from('sanction_letter_values');
		   
                    if($searchValue!= '')
                    {
                    $where = "USER_DETAILS.FN like '%".$searchValue."%' OR USER_DETAILS.LN like '%".$searchValue."%' ";
                    $this->db->where($where);
                    }
				$this->db->where('sanction_letter_values.Status','Approved');
	            $this->db->join('USER_DETAILS','sanction_letter_values.customer_id= USER_DETAILS.UNIQUE_CODE');
         $this->db->order_by("sanction_letter_values.last_updated", "desc");
                $query = $this->db->get();
                 $response = $query->row();

                return $response->count;
		}
		
		
      
         
            
  }
  function Get_sanction_letters_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by)
  {
	  	if($filter_by =='All')
        {
			  $this->db->select('*');
            $this->db->from('sanction_letter_values');
			  if($searchValue!= '')
                    {
                    $where = "USER_DETAILS.FN like '%".$searchValue."%' OR USER_DETAILS.LN like '%".$searchValue."%' ";
                    $this->db->where($where);
                    }
		
            $this->db->order_by("sanction_letter_values.last_updated", "desc");
             $this->db->join('USER_DETAILS','sanction_letter_values.customer_id= USER_DETAILS.UNIQUE_CODE');
                $this->db->limit($rowperpage,$row);
                $query = $this->db->get();
                $response = $query->result();
           
                return $response;
		}
		else if($filter_by =='SubmitedforApproval')
		{
			  $this->db->select('*');
            $this->db->from('sanction_letter_values');
			  if($searchValue!= '')
                    {
                    $where = "USER_DETAILS.FN like '%".$searchValue."%' OR USER_DETAILS.LN like '%".$searchValue."%' ";
                    $this->db->where($where);
                    }
		$this->db->where('sanction_letter_values.Status','Submited for Approval');
            $this->db->order_by("sanction_letter_values.last_updated", "desc");
             $this->db->join('USER_DETAILS','sanction_letter_values.customer_id= USER_DETAILS.UNIQUE_CODE');
                $this->db->limit($rowperpage,$row);
                $query = $this->db->get();
                $response = $query->result();
           
                return $response;
		}
		else if($filter_by =='Approved')
		{
			  $this->db->select('*');
            $this->db->from('sanction_letter_values');
			  if($searchValue!= '')
                    {
                    $where = "USER_DETAILS.FN like '%".$searchValue."%' OR USER_DETAILS.LN like '%".$searchValue."%' ";
                    $this->db->where($where);
                    }
		$this->db->where('sanction_letter_values.Status','Approved');
            $this->db->order_by("sanction_letter_values.last_updated", "desc");
			
             $this->db->join('USER_DETAILS','sanction_letter_values.customer_id= USER_DETAILS.UNIQUE_CODE');
                $this->db->limit($rowperpage,$row);
                $query = $this->db->get();
                $response = $query->result();
           
                return $response;
		}
       
             
  }
    //----------------added by priya 04-07-2022
   function Get_Total_No_of_cluster_Credit_manager($filter)
             {
              if($filter=='all')
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',23);
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
             }
             else if($filter=='Incomplete')
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',23);
                $this->db->where("Profile_Status",NULL); 
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
              }
              else if($filter=='Complete')
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',23);
                $this->db->where("Profile_Status",'Complete');
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
              }
            
              else
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',23);
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
        
              }
            }

             function search_cluster_credit_manager($searchValue,$filter)
            {
              if($filter=='all')
              {
        
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',23);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
              }
              else if($filter=='Complete')
        
                  {
                    
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',23);
                    $this->db->where("Profile_Status",'Complete');
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
                  }
                  else if($filter=='Incomplete')
                  {
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',23);
                    $this->db->where("Profile_Status",NULL); 
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
                  }
                  else
                  {
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',23);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
                  }
        
            }

            function Get_all_cluster_credit_manager_list($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
             {
                  if($filter=='all')
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',23);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();
                          
                    return $response;
                  }
                  else if($filter=='Incomplete')
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',23);
                    $this->db->where("Profile_Status",NULL); 
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();

                    return $response;
                  }
                  else if($filter=='Complete')
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',23);
                    $this->db->where("Profile_Status",'Complete');
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();
                    return $response;
                  }
                  else
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',23);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=8";
                    $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();
                    return $response;
                  }
        
             }
			 
  function getAccount_Manager($q)
  {
     if($q == 'all'){
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 22);          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
     }
	 else if($q == 'Complete')
	 {
		  $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 22);   
		   $this->db->where("Profile_Status",'Complete');
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
	 }
	 else if($q == 'Incomplete')
	 {
		  $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 22);    
		   $this->db->where("Profile_Status",NULL); 
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
	 }
	 else
	 {
		  $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 22);          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
	 }

}

//=============================== added by priya 12-07-2022
   
function Get_Total_no_of_sanction_recommendations()
  {
     $this->db->select('count(*) as count');
    $this->db->from('first_level_sanction_details');

               $this->db->join('USER_DETAILS','first_level_sanction_details.Customer_id= USER_DETAILS.UNIQUE_CODE');
      $this->db->where('first_level_sanction_details.Recommendation_status_added_by','Cluster Credit Manager');
       $this->db->where('first_level_sanction_details.Recommendation_status','Recommended');
       $this->db->or_where('first_level_sanction_details.Recommendation_status_added_by','Admin');
       $this->db->where('first_level_sanction_details.Recommendation_status','Loan Recommendation Approved');
       $this->db->or_where('first_level_sanction_details.Recommendation_status_added_by','Admin');
       $this->db->where('first_level_sanction_details.Recommendation_status','Reverted');
      $query = $this->db->get();
      $response = $query->row();
      return $response->count;
            
 
  }
  function Get_sanction_recommendations($searchValue)
  {
  
      
           $this->db->select('count(*) as count');
           $this->db->from('first_level_sanction_details');
           $this->db->join('USER_DETAILS','first_level_sanction_details.Customer_id= USER_DETAILS.UNIQUE_CODE');
      $this->db->where('first_level_sanction_details.Recommendation_status_added_by','Cluster Credit Manager');
       $this->db->where('first_level_sanction_details.Recommendation_status','Recommended');
       $this->db->or_where('first_level_sanction_details.Recommendation_status_added_by','Admin');
       $this->db->where('first_level_sanction_details.Recommendation_status','Loan Recommendation Approved');
        $this->db->or_where('first_level_sanction_details.Recommendation_status_added_by','Admin');
       $this->db->where('first_level_sanction_details.Recommendation_status','Reverted');

      $this->db->order_by("first_level_sanction_details.id", "desc");
                $query = $this->db->get();
                 $response = $query->row();

                return $response->count;
            
  }
  function Get_sanction_recommendations_With_Page($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
  {
         $this->db->select('*');
            $this->db->from('first_level_sanction_details');
                    $this->db->join('USER_DETAILS','first_level_sanction_details.Customer_id= USER_DETAILS.UNIQUE_CODE');
      $this->db->where('first_level_sanction_details.Recommendation_status_added_by','Cluster Credit Manager');
       $this->db->where('first_level_sanction_details.Recommendation_status','Recommended');
       $this->db->or_where('first_level_sanction_details.Recommendation_status_added_by','Admin');
       $this->db->where('first_level_sanction_details.Recommendation_status','Loan Recommendation Approved');
        $this->db->or_where('first_level_sanction_details.Recommendation_status_added_by','Admin');
       $this->db->where('first_level_sanction_details.Recommendation_status','Reverted');
      $this->db->order_by("first_level_sanction_details.id", "desc");
                $this->db->limit($rowperpage,$row);
                $query = $this->db->get();
                $response = $query->result();
           
                return $response;
             
  }
  function get_score_success_iddcr($result)
  {
    $this->db->select('score_success');
    $this->db->from('credit_score');
    $this->db->where('customer_id',$result);
      $query = $this->db->get();
      $response=$query->row();
     
      return $response->score_success;
  }
   /*------------- added by nnnn --------------*/
        
function Get_Total_No_Customer_FI()
{
      $this->db->select('count(*) as count');
              $this->db->from('USER_DETAILS');
              $this->db->where('ROLE',24);
              $query = $this->db->get();
          $response = $query->row();
              return $response->count;
              //print_r($this->db->last_query());
              //exit;
}
function Get_Customer_Filter_FI($searchValue)
{
          $this->db->select('count(*) as count');
              $this->db->from('USER_DETAILS');
              $this->db->where('ROLE',24);
              if($searchValue!= '')
              {
               $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=18 ";
         
              $this->db->where($where);
              }
              $query = $this->db->get();
          $response = $query->row();

              //exit;
              return $response->count;
}
function Get_Customer_With_Page_FI($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
{
         $this->db->select('*');
              $this->db->from('USER_DETAILS');
             $this->db->where('ROLE',24);
              if($searchValue!= '')
              {
               $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=";
           
               $this->db->where($where);
              }

              $this->db->order_by($columnName, $columnSortOrder);
              $this->db->limit($rowperpage,$row);
              $query = $this->db->get();
              $response = $query->result();
              //print_r($this->db->last_query());
              //exit;
              //exit;
              return $response;
}
function Get_Total_No_Customer_RCU()
{
      $this->db->select('count(*) as count');
              $this->db->from('USER_DETAILS');
              $this->db->where('ROLE',25);
              $query = $this->db->get();
          $response = $query->row();
              return $response->count;
              //print_r($this->db->last_query());
              //exit;
}
function Get_Customer_Filter_RCU($searchValue)
{
          $this->db->select('count(*) as count');
              $this->db->from('USER_DETAILS');
              $this->db->where('ROLE',25);
              if($searchValue!= '')
              {
               $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=18 ";
         
              $this->db->where($where);
              }
              $query = $this->db->get();
          $response = $query->row();

              //exit;
              return $response->count;
}
function Get_Customer_With_Page_RCU($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
{
         $this->db->select('*');
              $this->db->from('USER_DETAILS');
             $this->db->where('ROLE',25);
              if($searchValue!= '')
              {
               $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=";
           
               $this->db->where($where);
              }

              $this->db->order_by($columnName, $columnSortOrder);
              $this->db->limit($rowperpage,$row);
              $query = $this->db->get();
              $response = $query->result();
              //print_r($this->db->last_query());
              //exit;
              //exit;
              return $response;
}
function Update_payment_recived_date($data,$user_ID){
  $this->db->where('Cust_id', $user_ID);
  return $this->db->update('offline_login_fees',$data);      
}
 //================================================================== added by priya 3-08-2022
  function get_all_values()
    {
       $this->db->select('*');
       $this->db->from('sanction_letter_pdf_values');   
       $this->db->where('ID','1');   
       $query = $this->db->get();
       $response=$query->row();
       return $response;
    }
  function update_sanction_letter_pdf_values($data){
      $this->db->where('ID', 1);
      return $this->db->update('sanction_letter_pdf_values',$data);      
    }
    function update_processing_fee_details($ID,$data)
    {
      $this->db->where('customer_id', $ID);
      return $this->db->update('sanction_letter_values',$data);      
    }
    function get_Distinct_City_Branches()
    {
        /*$this->db->select('*');
        $this->db->from('branch_location_master');        
        //$this->db->where('city_id',$city_id);
        $query = $this->db->get();
        $response = $query->result();
        return $response;*/
        $query=$this->db->query("SELECT DISTINCT city FROM branch_location_master"); 
     
        $response = $query->result();
        return $response;
    }

    //============================= added by priya 16-08-2022

     function Get_Total_no_of_Disbursement_OPS($filter)
             {
              if($filter=='all')
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',26);
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
             }
        
           
        
             else if($filter=='Incomplete')
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',26);
                $this->db->where("Profile_Status",NULL); 
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
              }
              else if($filter=='Complete')
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',26);
                $this->db->where("Profile_Status",'Complete');
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
              }
            
              else
              {
                $this->db->select('count(*) as count');
                $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',26);
                $query = $this->db->get();
                $response = $query->row();
                return $response->count;
        
              }
            }
              function Search_Disbursement_OPS($searchValue,$filter,$Start_Date,$End_Date,$location)
            {
              if($filter=='all')
              {
        
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',26);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=26";
                    $this->db->where($where);
                    }
                    if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=26 ";
                       $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
              }
              else if($filter=='Complete')
        
                  {
                    
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',26);
                    $this->db->where("Profile_Status",'Complete');
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=26";
                    $this->db->where($where);
                    }
                    if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=26 ";
                       $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
                  }
                  else if($filter=='Incomplete')
                  {
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',26);
                    $this->db->where("Profile_Status",NULL); 
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=26";
                    $this->db->where($where);
                    }
                    if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=26 ";
                       $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
                  }
                  else
                  {
                    $this->db->select('count(*) as count');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',26);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=26";
                    $this->db->where($where);
                    }
                    if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=26 ";
                       $this->db->where($where);
                    }
                    $query = $this->db->get();
                    $response = $query->row();
                    return $response->count;
                  }
        
            }
             function Disbursement_OPS_Data($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter,$Start_Date,$End_Date,$location)
             {
                  if($filter=='all')
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',26);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=26";
                    $this->db->where($where);
                    }
                    if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=26 ";
                       $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();
                          
                    return $response;
                  }
                  else if($filter=='Incomplete')
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',26);
                    $this->db->where("Profile_Status",NULL); 
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=26";
                    $this->db->where($where);
                    }
                     if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=26 ";
                       $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();

                    return $response;
                  }
                  else if($filter=='Complete')
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',26);
                    $this->db->where("Profile_Status",'Complete');
        
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=26";
                    $this->db->where($where);
                    }
                     if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=26 ";
                       $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();
                    return $response;
                  }
                  else
                  {
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $this->db->where('ROLE',26);
                    if($searchValue!= '')
                    {
                    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=26";
                    $this->db->where($where);
                    }
                     if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=26 ";
                       $this->db->where($where);
                    }
                    $this->db->order_by($columnName, $columnSortOrder);
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();
                    return $response;
                  }
        
             }
             /*--------------------------------addded by papiha on 17_08_20222----------------------------------------------------------------*/
function get_all_Branches_city()
    {
      $this->db->distinct();
      $this->db->select('city');
      $this->db->from('branch_location_master');    
      $query = $this->db->get();

      $response = $query->result();

      return $response;
      
    }  	
  function get_city_of_branch($branch)
  {
      $this->db->select('*');
      $this->db->from('branch_location_master');        
      $this->db->where('Branch_Location',$branch);
      $query = $this->db->get();
      $response = $query->row();
      return $response->city;
     
    
  }
  function saveDocuments($data)
  {
    $this->db->insert('DOCUMENTS',$data);
    return $this->db->insert_id();
  }
  
//======================== added by priya 25-08-2022
     function Get_Total_no_of_Disbursement_OPS1($USER_ID)
             {
              
                $this->db->select('count(*) as count');
                $this->db->from('Disbursement_DOCUMENTS');
                $this->db->where('USER_ID',$USER_ID);
                $query = $this->db->get();
                $response = $query->row();
               return $response->count;
      
              
            }
              function Search_Disbursement_OPS1($searchValue,$USER_ID)
            {
              
                    $this->db->select('count(*) as count');
                    $this->db->from('Disbursement_DOCUMENTS');
                    $this->db->where('USER_ID',$USER_ID);
                    if($searchValue!= '')
                    {
                    $where = "selected_document_type_name like '%".$searchValue."%' ";
                    $this->db->where($where);
                    }
                    
                    $query = $this->db->get();
                    $response = $query->row();
                   return $response->count;

                  
        
            }
             function Disbursement_OPS_Data1($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$USER_ID)
             {
                  
                    $this->db->select('*');
                     $this->db->from('Disbursement_DOCUMENTS');
                    $this->db->where('USER_ID',$USER_ID);
                  if($searchValue!= '')
                    {
                    $where = "selected_document_type_name like '%".$searchValue."%' ";
                    $this->db->where($where);
                    }
                    $this->db->order_by('ID','desc');
                    $this->db->limit($rowperpage,$row);
                    $query = $this->db->get();
                    $response = $query->result();
                    return $response;
                    //print_r( $response );
                  
        
             }
             //=================== added by priya 20-9-2022
			 function update_disbursement_cheque_status($data,$id,$cheque_id)
				{
				$this->db->where('User_ID',$id);
				$this->db->where('id',$cheque_id);
				return $this->db->update('disbursement_checque_details',$data);      
				}
         /*------------------------------------------- addded by papiha on 22_09_2022------------------------------------------------*/
    function Get_Total_No_MIS()
    {
          $this->db->select('count(*) as count');
                  $this->db->from('USER_DETAILS');
                  $this->db->where('ROLE',30);
                  $query = $this->db->get();
              $response = $query->row();
                  return $response->count;
                  //print_r($this->db->last_query());
                  //exit;
    }
    function Get_Filter_MIS($searchValue)
    {
              $this->db->select('count(*) as count');
                  $this->db->from('USER_DETAILS');
                  $this->db->where('ROLE',30);
                  if($searchValue!= '')
                  {
                  $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=30 ";
            
                  $this->db->where($where);
                  }
                  $query = $this->db->get();
              $response = $query->row();

                  //exit;
                  return $response->count;
    }
    function Get_With_Page_MIS($searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
    {
            $this->db->select('*');
                  $this->db->from('USER_DETAILS');
                $this->db->where('ROLE',30);
                  if($searchValue!= '')
                  {
                  $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=30";
              
                  $this->db->where($where);
                  }

                  $this->db->order_by($columnName, $columnSortOrder);
                  $this->db->limit($rowperpage,$row);
                  $query = $this->db->get();
                  $response = $query->result();
                  //print_r($this->db->last_query());
                  //exit;
                  //exit;
                  return $response;
    }
	//-------------------------------- added by priya 23-09-2022
	
	function getBusiness_Head($q)
  {
     if($q == 'all'){
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 31);          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
     }
	 else if($q == 'Complete')
	 {
		  $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 31);   
		   $this->db->where("Profile_Status",'Complete');
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
	 }
	 else if($q == 'Incomplete')
	 {
		  $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 31);    
		   $this->db->where("Profile_Status",NULL); 
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
	 }
	 else
	 {
		  $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 31);          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
	 }

}

//-------------------------------- added by priya 23-09-2022
	
	function getChief_Risk_Officer($q)
  {
     if($q == 'all'){
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 32);          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
     }
	 else if($q == 'Complete')
	 {
		  $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 32);   
		   $this->db->where("Profile_Status",'Complete');
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
	 }
	 else if($q == 'Incomplete')
	 {
		  $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 32);    
		   $this->db->where("Profile_Status",NULL); 
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
	 }
	 else
	 {
		  $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 32);          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
          return $response;
	 }

}

//====================== added by priya 24-09-2022
public function get_all_users()
	{
		    $this->db->select('count(*) as count ');
     	   $q = $this->db->from('USER_DETAILS');
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
			$response=$query->row();
			return $response->count; 

	}
	 public function get_all_users_Admin_filter($searchValue,$filter_by,$Start_Date,$End_Date,$Reffered_by,$location)
     {
          
            $this->db->select('count(*)as count');
            $this->db->from('USER_DETAILS');
            if($searchValue!= '')
            {
				$where = "FN like '%".$searchValue."%'OR LN like '%".$searchValue."%' ";
				$this->db->where($where);
            }
           $this->db->order_by("ID","desc");
           $query = $this->db->get();
           $response=$query->row();
           return $response->count;

    
      } 
    public function get_all_users_Admin_filter_pagination($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date,$Reffered_by,$location)
     {
              $this->db->select('*');
              $this->db->from('USER_DETAILS');
              if($searchValue!= '')
              {
              $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%'  ";
              $this->db->where($where);
              }
             
              
              $this->db->limit($rowperpage,$row);
              $this->db->order_by("ID","desc");
              $query = $this->db->get()->result();
        
              return $query; 

      }
	  
	  public function delete_user_data($id)
		{
		   // $this->db->query("DELETE FROM APPLIED_LOANS WHERE CUST_ID=".$id.""); 
		     $this->db->where('CUST_ID', $id);
             $this->db->delete('APPLIED_LOANS');
			 
			 $this->db->where('ID', $id);
             $this->db->delete('cam_credit_analysis');
			   
			   
			 $this->db->where('customer_id', $id);
             $this->db->delete('credit_score');
  
             $this->db->where('customer_id', $id);
             $this->db->delete('credit_score_user_details');
			 
			 $this->db->where('CUST_ID', $id);
             $this->db->delete('CUSTOMER_APPLIED_LOANS');
			 
		     $this->db->where('CUST_ID', $id);
             $this->db->delete('CUSTOMER_INCOME_DETAILS');
			
		     $this->db->where('CUST_ID', $id);
             $this->db->delete('CUSTOMER_MORE_DETAILS');
			 
		     $this->db->where('User_ID', $id);
             $this->db->delete('disbursement_checque_details');
			 
 		     $this->db->where('User_ID', $id);
             $this->db->delete('Disbursement_Document_status');
			 
			 $this->db->where('User_ID', $id);
             $this->db->delete('Disbursement_DOCUMENTS');
 
 			 $this->db->where('User_ID', $id);
             $this->db->delete('DOCUMENTS');

  			 $this->db->where('Customer_id', $id);
             $this->db->delete('first_level_sanction_details');

  			 $this->db->where('Customer_id', $id);
             $this->db->delete('go_no_go');
			 
  			 $this->db->where('user_id', $id);
             $this->db->delete('help_enquiry');

			 $this->db->where('Applicant_ID', $id);
             $this->db->delete('internal_loan_application_status');

			 $this->db->where('customer_id', $id);
             $this->db->delete('pd_photos');
			 
			 $this->db->where('customer_id', $id);
             $this->db->delete('sanction_letter_values');

			 $this->db->where('customer_id', $id);
             $this->db->delete('table_credit_pd');
			 
			 $this->db->where('UNIQUE_CODE', $id);
             $this->db->delete('USER_DETAILS');

		}
		
		
		public function delete_coapp_data($coapp)
		{
			 $this->db->where('COAPP_ID', $coapp);
             $this->db->delete('COAPPLICANT_INCOME_DETAILS');
			 
			 $this->db->where('ID', $coapp);
             $this->db->delete('coapp_cam_credit_analysis');
			 
			 $this->db->where('UNIQUE_CODE', $coapp);
		     $this->db->delete('COAPPLICANT_DETAILS');
			  
   		}
		//================= added by priya 13-10-2022
		function find_cust_id($id)
		{
			$this->db->select('*');
			$this->db->from('offline_login_fees');
			$this->db->where('id',$id);
			$query = $this->db->get();
			$response=$query->row();
			return $response;
		}
			public function find_info_bank_statement($id)
	{
      $this->db->select('*');
      $this->db->from('DOCUMENTS');
      $this->db->where('USER_ID', $id);
	  $this->db->where('DOC_TYPE',"BANK PASS BOOK/BANK STATEMENT");
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }
	
	//========================= added by priya 07-11-2022
	   function Get_my_Cluster($filter,$login_id)
     {
      if($filter=='all')
    	{
        $this->db->select('count(*) as count');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',15);
		 $this->db->where('AM_ID',$login_id);
        $query = $this->db->get();
        $response = $query->row();
        return $response->count;
     }

   

     else if($filter=='Incomplete')
    	{
        $this->db->select('count(*) as count');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',15);
			 $this->db->where('AM_ID',$login_id);
        $this->db->where("Profile_Status",NULL); 
        $query = $this->db->get();
        $response = $query->row();
        return $response->count;
      }
      else if($filter=='Complete')
      {
        $this->db->select('count(*) as count');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',15);
			 $this->db->where('AM_ID',$login_id);
        $this->db->where("Profile_Status",'Complete');
        $query = $this->db->get();
        $response = $query->row();
        return $response->count;
      }
    
      else
      {
        $this->db->select('count(*) as count');
        $this->db->from('USER_DETAILS');
        $this->db->where('ROLE',15);
			 $this->db->where('AM_ID',$login_id);
        $query = $this->db->get();
        $response = $query->row();
        return $response->count;

      }
    }
	
	function search_my_Cluster($searchValue,$filter,$Start_Date,$End_Date,$location,$login_id)
    {
      if($filter=='all')
      {

            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
				 $this->db->where('AM_ID',$login_id);
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }
           if($Start_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
       }
      if($End_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
       }

                 if($location!='' )
      {
             $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
           $this->db->where($where);
        
      }
            $query = $this->db->get();
            $response = $query->row();
            return $response->count;
      }
      else if($filter=='Complete')

          {
            
            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
				 $this->db->where('AM_ID',$login_id);
            $this->db->where("Profile_Status",'Complete');

            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }

              if($Start_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
             }
            if($End_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
             }

              if($location!='' )
              {
                     $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
                   $this->db->where($where);
                
              }
            $query = $this->db->get();
            $response = $query->row();
            return $response->count;
          }
          else if($filter=='Incomplete')
          {
            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
				 $this->db->where('AM_ID',$login_id);
            $this->db->where("Profile_Status",NULL); 

            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }

            if($Start_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
             }
            if($End_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
             }

             if($location!='' )
              {
                     $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
                   $this->db->where($where);
                
              }
            $query = $this->db->get();
            $response = $query->row();
            return $response->count;
          }
          else
          {
            $this->db->select('count(*) as count');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
				 $this->db->where('AM_ID',$login_id);
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }

                    if($Start_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
             }
            if($End_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
             }
             if($location!='' )
            {
                 $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
                 $this->db->where($where);
            }
            $query = $this->db->get();
            $response = $query->row();
            return $response->count;
          }

    }
	
	 function show_my_Cluster($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter,$Start_Date,$End_Date,$location,$login_id)
     {
          if($filter=='all')
          {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
				 $this->db->where('AM_ID',$login_id);
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }
            if($Start_Date!='' )
           {
             $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
           }
          if($End_Date!='' )
           {
             $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
           }

           if($location!='' )
      {
             $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
           $this->db->where($where);
        
      }
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
                   //print_r($this->db->last_query());
                   //exit;
                   //exit;
            return $response;
          }
          else if($filter=='Incomplete')
          {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
				 $this->db->where('AM_ID',$login_id);
            $this->db->where("Profile_Status",NULL); 

            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }

                    if($Start_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
       }
      if($End_Date!='' )
       {
         $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
       }
        if($location!='' )
      {
             $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
           $this->db->where($where);
        
      }
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
                   //print_r($this->db->last_query());
                   //exit;
                   //exit;
            return $response;
          }
          else if($filter=='Complete')
          {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
				 $this->db->where('AM_ID',$login_id);
            $this->db->where("Profile_Status",'Complete');

            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }

              if($Start_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
             }
            if($End_Date!='' )
             {
               $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
             }
              if($location!='' )
            {
                   $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
                 $this->db->where($where);
              
            }
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
            return $response;
          }
          else
          {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE',15);
				 $this->db->where('AM_ID',$login_id);
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=15 ";
            $this->db->where($where);
            }
            if($Start_Date!='' )
           {
             $this->db->where('USER_DETAILS.CREATED_AT >=', $Start_Date);
           }
          if($End_Date!='' )
           {
             $this->db->where('USER_DETAILS.CREATED_AT <=', $End_Date);
           }
            if($location!='' )
          {
               $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=15 ";
               $this->db->where($where);
            
          }
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
            return $response;
          }

     }
	 
	  function Get_AMS_Branch_MAnagers($filter,$MY_Cluster_managers_BM)
            {
             if($filter=='all')
             {
               $this->db->select('count(*) as count');
               $this->db->from('USER_DETAILS');
         
			    if(!empty($MY_Cluster_managers_BM))
				{
				$this->db->where_in('UNIQUE_CODE',$MY_Cluster_managers_BM);
				$this->db->where('ROLE',13);
				}
               $query = $this->db->get();
               $response = $query->row();
               return $response->count;
            }
            
       
            else if($filter=='Incomplete')
             {
               $this->db->select('count(*) as count');
               $this->db->from('USER_DETAILS');
           
				 if(!empty($MY_Cluster_managers_BM))
				{
				$this->db->where_in('UNIQUE_CODE',$MY_Cluster_managers_BM);
				$this->db->where('ROLE',13);
				}
               $this->db->where("Profile_Status",NULL); 
               $query = $this->db->get();
               $response = $query->row();
               return $response->count;
             }
             else if($filter=='Complete')
             {
               $this->db->select('count(*) as count');
               $this->db->from('USER_DETAILS');
       
				  if(!empty($MY_Cluster_managers_BM))
				{
				$this->db->where_in('UNIQUE_CODE',$MY_Cluster_managers_BM);
				$this->db->where('ROLE',13);
				}
               $this->db->where("Profile_Status",'Complete');
               $query = $this->db->get();
               $response = $query->row();
               return $response->count;
             }
           
             else
             {
               $this->db->select('count(*) as count');
               $this->db->from('USER_DETAILS');
     
				  if(!empty($MY_Cluster_managers_BM))
				{
				$this->db->where_in('CM_ID',$MY_Cluster_managers_BM);
				$this->db->where('ROLE',13);
				}
               $query = $this->db->get();
               $response = $query->row();
               return $response->count;
       
             }
			 
			 
   
           }
			 function search_AMS_Branch_MAnagers($searchValue,$filter,$Start_Date,$End_Date,$location,$MY_Cluster_managers_BM)
           {
             if($filter=='all')
             {
       
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
					if(!empty($MY_Cluster_managers_BM))
					{
					$this->db->where_in('UNIQUE_CODE',$MY_Cluster_managers_BM);
					$this->db->where('ROLE',13);
					}
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13 ";
                   $this->db->where($where);
                   }
				    if(!empty($MY_Cluster_managers_BM))
					{
					$this->db->where_in('UNIQUE_CODE',$MY_Cluster_managers_BM);
					$this->db->where('ROLE',1);
					}
                   if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
             }
             else if($filter=='Complete')
       
                 {
                   
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
                 
					  if(!empty($MY_Cluster_managers_BM))
				{
				$this->db->where_in('UNIQUE_CODE',$MY_Cluster_managers_BM);
				$this->db->where('ROLE',13);
				}
                   $this->db->where("Profile_Status",'Complete');
       
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
                 }
                 else if($filter=='Incomplete')
                 {
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
            
					  if(!empty($MY_Cluster_managers_BM))
				{
				$this->db->where_in('UNIQUE_CODE',$MY_Cluster_managers_BM);
				$this->db->where('ROLE',13);
				}
                   $this->db->where("Profile_Status",NULL); 
       
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
                 }
                 else
                 {
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
                  
					  if(!empty($MY_Cluster_managers_BM))
				{
				$this->db->where_in('UNIQUE_CODE',$MY_Cluster_managers_BM);
				$this->db->where('ROLE',13);
				}
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
                 }
       
           }
		   
		    function show_AMS_Branch_MAnagers($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter,$Start_Date,$End_Date,$location,$MY_Cluster_managers_BM)
            {
                 if($filter=='all')
                 {
                   $this->db->select('*');
                   $this->db->from('USER_DETAILS');
              
					  if(!empty($MY_Cluster_managers_BM))
				{
				$this->db->where_in('UNIQUE_CODE',$MY_Cluster_managers_BM);
				$this->db->where('ROLE',13);
				}
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $this->db->order_by($columnName, $columnSortOrder);
                   $this->db->limit($rowperpage,$row);
                   $query = $this->db->get();
                   $response = $query->result();
                          //print_r($this->db->last_query());
                          //exit;
                          //exit;
                 //  return $response;
	
                 }
                 else if($filter=='Incomplete')
                 {
                   $this->db->select('*');
                   $this->db->from('USER_DETAILS');
               
					  if(!empty($MY_Cluster_managers_BM))
				{
				$this->db->where_in('UNIQUE_CODE',$MY_Cluster_managers_BM);
				$this->db->where('ROLE',13);
				}
                   $this->db->where("Profile_Status",NULL); 
       
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $this->db->order_by($columnName, $columnSortOrder);
                   $this->db->limit($rowperpage,$row);
                   $query = $this->db->get();
                   $response = $query->result();
                          //print_r($this->db->last_query());
                          //exit;
                          //exit;
                   return $response;
                 }
                 else if($filter=='Complete')
                 {
                   $this->db->select('*');
                   $this->db->from('USER_DETAILS');
                 
					  if(!empty($MY_Cluster_managers_BM))
				{
				$this->db->where_in('UNIQUE_CODE',$MY_Cluster_managers_BM);
				$this->db->where('ROLE',13);
				}
                   $this->db->where("Profile_Status",'Complete');
       
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $this->db->order_by($columnName, $columnSortOrder);
                   $this->db->limit($rowperpage,$row);
                   $query = $this->db->get();
                   $response = $query->result();
                   return $response;
                 }
                 else
                 {
                   $this->db->select('*');
                   $this->db->from('USER_DETAILS');
                  
					  if(!empty($MY_Cluster_managers_BM))
				{
				$this->db->where_in('UNIQUE_CODE',$MY_Cluster_managers_BM);
				$this->db->where('ROLE',13);
				}
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=13 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=13 ";
                       $this->db->where($where);
                    }
                   $this->db->order_by($columnName, $columnSortOrder);
                   $this->db->limit($rowperpage,$row);
                   $query = $this->db->get();
                   $response = $query->result();
				   		//	  $str = $this->db->last_query();

                  return $response;
                 }
       
            }
			
			
	  function Get_AMS_RO($filter, $ROS)
            {
             if($filter=='all')
             {
               $this->db->select('count(*) as count');
               $this->db->from('USER_DETAILS');
       
				 if(!empty($ROS))
				{
				$this->db->where_in('UNIQUE_CODE',$ROS);
				$this->db->where('ROLE',14);
				}
               $query = $this->db->get();
               $response = $query->row();
               return $response->count;
            }
       
          
       
            else if($filter=='Incomplete')
             {
               $this->db->select('count(*) as count');
               $this->db->from('USER_DETAILS');
               if(!empty($ROS))
				{
				$this->db->where_in('UNIQUE_CODE',$ROS);
				$this->db->where('ROLE',14);
				}
               $this->db->where("Profile_Status",NULL); 
               $query = $this->db->get();
               $response = $query->row();
               return $response->count;
             }
             else if($filter=='Complete')
             {
               $this->db->select('count(*) as count');
               $this->db->from('USER_DETAILS');
				if(!empty($ROS))
				{
				$this->db->where_in('UNIQUE_CODE',$ROS);
				$this->db->where('ROLE',14);
				}
               $this->db->where("Profile_Status",'Complete');
               $query = $this->db->get();
               $response = $query->row();
               return $response->count;
             }
           
             else
             {
               $this->db->select('count(*) as count');
               $this->db->from('USER_DETAILS');
				if(!empty($ROS))
				{
				$this->db->where_in('UNIQUE_CODE',$ROS);
				$this->db->where('ROLE',14);
				}
               $query = $this->db->get();
               $response = $query->row();
               return $response->count;
       
             }
           }
			 function search_AMS_RO($searchValue,$filter,$Start_Date,$End_Date,$location,$ROS)
           {
             if($filter=='all')
             {
       
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
				if(!empty($ROS))
				{
				$this->db->where_in('UNIQUE_CODE',$ROS);
				$this->db->where('ROLE',14);
				}
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=14 ";
                   $this->db->where($where);
                   }
                   if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                      if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=14 ";
                       $this->db->where($where);
                    }
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
             }
             else if($filter=='Complete')
       
                 {
                   
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
					if(!empty($ROS))
					{
					$this->db->where_in('UNIQUE_CODE',$ROS);
					$this->db->where('ROLE',14);
					}
                   $this->db->where("Profile_Status",'Complete');
       
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=14 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=14 ";
                       $this->db->where($where);
                    }
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
                 }
                 else if($filter=='Incomplete')
                 {
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
              if(!empty($ROS))
				{
				$this->db->where_in('UNIQUE_CODE',$ROS);
				$this->db->where('ROLE',14);
				}
                   $this->db->where("Profile_Status",NULL); 
       
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=14 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=14 ";
                       $this->db->where($where);
                    }
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
                 }
                 else
                 {
                   $this->db->select('count(*) as count');
                   $this->db->from('USER_DETAILS');
             if(!empty($ROS))
				{
				$this->db->where_in('UNIQUE_CODE',$ROS);
				$this->db->where('ROLE',14);
				}
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=14 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=14 ";
                       $this->db->where($where);
                    }
                   $query = $this->db->get();
                   $response = $query->row();
                   return $response->count;
                 }
       
           }
		   
		    function show_AMS_RO($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter,$Start_Date,$End_Date,$location,$ROS)
            {
                 if($filter=='all')
                 {
                   $this->db->select('*');
                   $this->db->from('USER_DETAILS');
           if(!empty($ROS))
				{
				$this->db->where_in('UNIQUE_CODE',$ROS);
				$this->db->where('ROLE',14);
				}
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=14 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=14 ";
                       $this->db->where($where);
                    }
                   $this->db->order_by($columnName, $columnSortOrder);
                   $this->db->limit($rowperpage,$row);
                   $query = $this->db->get();
                   $response = $query->result();
                          //print_r($this->db->last_query());
                          //exit;
                          //exit;
                   return $response;
                 }
                 else if($filter=='Incomplete')
                 {
                   $this->db->select('*');
                   $this->db->from('USER_DETAILS');
             if(!empty($ROS))
				{
				$this->db->where_in('UNIQUE_CODE',$ROS);
				$this->db->where('ROLE',14);
				}
                   $this->db->where("Profile_Status",NULL); 
       
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=14 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=14 ";
                       $this->db->where($where);
                    }
                   $this->db->order_by($columnName, $columnSortOrder);
                   $this->db->limit($rowperpage,$row);
                   $query = $this->db->get();
                   $response = $query->result();
                          //print_r($this->db->last_query());
                          //exit;
                          //exit;
                   return $response;
                 }
                 else if($filter=='Complete')
                 {
                   $this->db->select('*');
                   $this->db->from('USER_DETAILS');
            if(!empty($ROS))
				{
				$this->db->where_in('UNIQUE_CODE',$ROS);
				$this->db->where('ROLE',14);
				}
                   $this->db->where("Profile_Status",'Complete');
       
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=14";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=14 ";
                       $this->db->where($where);
                    }
                   $this->db->order_by($columnName, $columnSortOrder);
                   $this->db->limit($rowperpage,$row);
                   $query = $this->db->get();
                   $response = $query->result();
                   return $response;
                 }
                 else
                 {
                   $this->db->select('*');
                   $this->db->from('USER_DETAILS');
   if(!empty($ROS))
				{
				$this->db->where_in('UNIQUE_CODE',$ROS);
				$this->db->where('ROLE',14);
				}
                   if($searchValue!= '')
                   {
                   $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=14 ";
                   $this->db->where($where);
                   }
                      if($Start_Date!='' )
                     {
                       $this->db->where('CREATED_AT >=', $Start_Date);
                     }
                    if($End_Date!='' )
                    {
                         $this->db->where('CREATED_AT <=', $End_Date);
                      
                    }
                       if($location!='' )
                    {
                       $where = "Location like '%".$location."%' AND ROLE=14 ";
                       $this->db->where($where);
                    }
                   $this->db->order_by($columnName, $columnSortOrder);
                   $this->db->limit($rowperpage,$row);
                   $query = $this->db->get();
                   $response = $query->result();
                   return $response;
                 }
       
            }
			
			public function Area_managers_customers( $login_id, $MY_Cluster_managers,$MY_Cluster_managers_BM, $ROS)
	{
		    $this->db->select('count(*) as count ');
			 if(!empty($login_id))
				{
			    $this->db->where("ROLE",1 );
				$this->db->where('AM_ID',$login_id);
		
			  }
         	 if(!empty($MY_Cluster_managers))
				{
			  $this->db->or_where_in('CM_ID',$MY_Cluster_managers);
			  $this->db->where('ROLE',1);
			}
           if(!empty($MY_Cluster_managers_BM))
				{
			  $this->db->or_where_in('BM_ID',$MY_Cluster_managers_BM);
			  $this->db->where('ROLE',1);
			}	
			if(!empty($ROS))
				{
			  $this->db->or_where_in('RO_ID',$ROS);
			  $this->db->where('ROLE',1);
			}			
			$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $q = $this->db->from('USER_DETAILS');
            $this->db->order_by("USER_DETAILS.ID", "desc");
            $query = $this->db->get();
			$response=$query->row();
			return $response->count; 

	}
	public function Search_Area_managers_customers($searchValue,$filter_by,$Start_Date,$End_Date,$Reffered_by,$location, $login_id, $MY_Cluster_managers,$MY_Cluster_managers_BM, $ROS)
     {
            
            $this->db->select('count(*)as count');
            $this->db->from('USER_DETAILS');
			 if(!empty($login_id))
				{
			    $this->db->where("ROLE",1 );
				$this->db->where('AM_ID',$login_id);
		
			  }
         	 if(!empty($MY_Cluster_managers))
				{
			  $this->db->or_where_in('CM_ID',$MY_Cluster_managers);
			  $this->db->where('ROLE',1);
			}
           if(!empty($MY_Cluster_managers_BM))
				{
			  $this->db->or_where_in('BM_ID',$MY_Cluster_managers_BM);
			  $this->db->where('ROLE',1);
			}	
			if(!empty($ROS))
				{
			  $this->db->or_where_in('RO_ID',$ROS);
			  $this->db->where('ROLE',1);
			}	
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
            // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
            $this->db->where($where);
            }
       if($Start_Date!='' )
      {
           $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date >=', $Start_Date);
        
          
        
      }
      if($End_Date!='' )
      {
           $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date <=', $End_Date);
        
      }
      if($filter_by=='REJECT' || $filter_by=='HOLD' )
      {
        if($filter_by=='REJECT')
        {
          $this->db->where('USER_DETAILS.credit_sanction_status =', 'reject');
          $this->db->or_where('USER_DETAILS.credit_sanction_status =', 'REJECT');
        }
        else{
          
           $this->db->where('USER_DETAILS.credit_sanction_status =', 'HOLD');
        }
      }
      if($filter_by!='all' && $filter_by!='' && $filter_by!='Select Filter' && $filter_by!='REJECT' && $filter_by!='reject' && $filter_by!='HOLD')
      {
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS =', $filter_by);
      }

      if($Reffered_by!='' )
      {
           $where = "USER_DETAILS.Refer_By_Name like '%".$Reffered_by."%' AND ROLE=1 ";
           $this->db->where($where);
        
      }
      if($location!='' )
      {
           $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=1 ";
           $this->db->where($where);
      }
            
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          
            $this->db->order_by("USER_DETAILS.ID","desc");
           // $query = $this->db->get()->result();
         // $executedQuery = $this->db->last_query();
           //print_r($executedQuery);
         //  exit;
           // return $query; 
           $query = $this->db->get();
           $response=$query->row();
           return $response->count;

    
      }
	   public function show_Search_Area_managers_customers($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date,$Reffered_by,$location, $login_id, $MY_Cluster_managers,$MY_Cluster_managers_BM, $ROS)
     {
      
     
               $this->db->select('*');
              $this->db->from('USER_DETAILS');
			   if(!empty($login_id))
				{
			    $this->db->where("ROLE",1 );
				$this->db->where('AM_ID',$login_id);
		
			  }
         	 if(!empty($MY_Cluster_managers))
				{
			  $this->db->or_where_in('CM_ID',$MY_Cluster_managers);
			  $this->db->where('ROLE',1);
			}
           if(!empty($MY_Cluster_managers_BM))
				{
			  $this->db->or_where_in('BM_ID',$MY_Cluster_managers_BM);
			  $this->db->where('ROLE',1);
			}	
			if(!empty($ROS))
				{
			  $this->db->or_where_in('RO_ID',$ROS);
			  $this->db->where('ROLE',1);
			}	
              if($searchValue!= '')
              {
              $where = "FN like '%".$searchValue."%'AND ROLE=1 OR LN like '%".$searchValue."%' AND ROLE=1 ";
              // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
              $this->db->where($where);
              }
         if($Start_Date!='' )
        {
             $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date >=', $Start_Date);
          
            
          
        }
        if($End_Date!='' )
        {
             $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date <=', $End_Date);
          
        }
        if($filter_by=='REJECT' || $filter_by=='HOLD' )
        {
          if($filter_by=='REJECT')
          {
            $this->db->where('USER_DETAILS.credit_sanction_status =', 'reject');
            $this->db->or_where('USER_DETAILS.credit_sanction_status =', 'REJECT');
            if($Start_Date!='' )
            {
                 $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date >=', $Start_Date);
              
                
              
            }
            if($End_Date!='' )
            {
                 $this->db->where('CUSTOMER_MORE_DETAILS.last_updated_date <=', $End_Date);
              
            }
          }
          else{
            
             $this->db->where('USER_DETAILS.credit_sanction_status =', 'HOLD');
          }
        }
        if($filter_by!='all' && $filter_by!='' && $filter_by!='Select Filter' && $filter_by!='REJECT' && $filter_by!='reject' && $filter_by!='HOLD')
        {
            $this->db->where('CUSTOMER_MORE_DETAILS.STATUS =', $filter_by);
        }
       if($Reffered_by!='' )
      {
           $where = "USER_DETAILS.Refer_By_Name like '%".$Reffered_by."%' AND ROLE=1 ";
           $this->db->where($where);
        
      }
      if($location!='' )
      {
           $where = "USER_DETAILS.Location like '%".$location."%' AND ROLE=1 ";
           $this->db->where($where);
      }
            		   
              $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
              $this->db->limit($rowperpage,$row);
              $this->db->order_by("USER_DETAILS.ID","desc");
              $query = $this->db->get()->result();
             //$executedQuery = $this->db->last_query();
             //print_r($executedQuery);
             //exit;
              return $query; 

      }
//============================= added by priya 08-11-2022
  function get_area_managers_CM($id)
	{
    $array=array();
		$this->db->select('UNIQUE_CODE');
        $this->db->from('USER_DETAILS');
        $this->db->where('AM_ID',$id);
		$this->db->where('ROLE',15);
		$query = $this->db->get();
		$response=$query->result();
		foreach ($response as $value) 
        $array[] = $value->UNIQUE_CODE;
	
        return $array;
	}
	public function get_area_managers_cluster_managers_BM($MY_Cluster_managers)
	{
    $array=array();
		$this->db->select('UNIQUE_CODE');
        $this->db->from('USER_DETAILS');

        if(!empty($MY_Cluster_managers))
        {
        $this->db->where_in('CM_ID',$MY_Cluster_managers);
				$this->db->where('ROLE',13);
      }
		$query = $this->db->get();
		$response=$query->result();
		foreach ($response as $value) 
        $array[] = $value->UNIQUE_CODE;
	    
		return $array;
	}
	public function get_All_RO_AM($MY_Cluster_managers_BM,  $MY_Cluster_managers,$login_id)
	{
    $array=array();
		$this->db->select('UNIQUE_CODE');
        $this->db->from('USER_DETAILS');

        if(!empty($MY_Cluster_managers_BM))
        {
        $this->db->where_in('BM_ID',$MY_Cluster_managers_BM);
				$this->db->where('ROLE',14);
      }
	   if(!empty($MY_Cluster_managers))
        {
        $this->db->or_where_in('CM_ID',$MY_Cluster_managers);
				$this->db->where('ROLE',14);
      }
	   if(!empty($login_id))
        {
        $this->db->or_where_in('AM_ID',$login_id);
				$this->db->where('ROLE',14);
      }
	  
		$query = $this->db->get();
		$response=$query->result();
		foreach ($response as $value) 
        $array[] = $value->UNIQUE_CODE;
	    
		return $array;
	}
	//----------------------added by pooja----------------------//
	
		function isIdExist_dsavisit($id)
		{
		   $this->db->select('*');
		   $this->db->where('RO_ID', $id);
		   $query = $this->db->get('dsavisit');
		   //$query = $this->db->get();
		   $response = $query->row(); 
		   return $response; 
	   }
	  public function savedata($data)
	  {
		$this->db->insert('dsavisit',$data);
		return $this->db->insert_id();
	  }
	  public function update_dsavisit($id,$data)
	  {
        $this->db->where('RO_ID', $id);
		return  $this->db->update('dsavisit', $data);
      
        }
		
		function isIdExist_ntbvisit($id)
		{
		   $this->db->select('*');
		   $this->db->where('RO_ID', $id);
		   $query = $this->db->get('ntbvisit');
		   //$query = $this->db->get();
		   $response = $query->row(); 
		   return $response; 
	   }
		  public function ntbdata($data)
		  {
			$this->db->insert('ntbvisit',$data);
			return $this->db->insert_id();
		  }
		  public function update_ntbform($id,$data)
		  {
			$this->db->where('RO_ID', $id);
			return  $this->db->update('ntbvisit', $data);
		  
			}
		
		function isIdExist_existingvisit($id)
		{
		   $this->db->select('*');
		   $this->db->where('RO_ID', $id);
		   $query = $this->db->get('existingvisit');
		   //$query = $this->db->get();
		   $response = $query->row(); 
		   return $response; 
	   }
	  public function existingdata($data)
	  {
		$this->db->insert('existingvisit',$data);
		return $this->db->insert_id();
	  }
	  public function update_existingform($id,$data)
	  {
        $this->db->where('RO_ID', $id);
		return  $this->db->update('existingvisit', $data);
      
        }
		
		function isIdExist_leadvisit($id)
		{
		   $this->db->select('*');
		   $this->db->where('RO_ID', $id);
		   $query = $this->db->get('leadvisit');
		   //$query = $this->db->get();
		   $response = $query->row(); 
		   return $response; 
	   }
	  public function leaddata($data)
	  {
		$this->db->insert('leadvisit',$data);
		return $this->db->insert_id();
	  }
	  public function update_leadform($id,$data)
	  {
        $this->db->where('RO_ID', $id);
		return  $this->db->update('leadvisit', $data);
      
        }
		
		
	
		public function get_all_dsavisit($id,$userType)
		{
		    $this->db->select('count(*) as count ');
			$q = $this->db->from('dsavisit');
			$this->db->where('RO_ID', $id);
            $this->db->order_by("id", "desc");
            $query = $this->db->get();
			$response=$query->row();
			return $response->count; 

		}
	
		public function get_all_customers_Admin_filters($id,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('dsavisit');
			$this->db->where('RO_ID', $id);
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('dsavisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date <=', $End_Date);
				
			  }
			  
				$this->db->order_by("dsavisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				// $executedQuery = $this->db->last_query();
				 // print_r($executedQuery);
				 // exit;
				return $response->count; 

    
      } 
			
		
		 public function get_all_customers_Admin_filter_paginations($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
              $this->db->select('*');
             $this->db->from('dsavisit');
			$this->db->where('RO_ID', $id);
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date <=', $End_Date);
				
			  }
			  
			 
      
             /*$executedQuery = $this->db->last_query();
             print_r($executedQuery);
             exit;*/
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("dsavisit.id","asec");
              $query = $this->db->get()->result();
              return $query;           
		}  
		
		
		public function current_month($Start_Date,$End_Date,$id){
		
            $this->db->select('count(*) as count ');
            $this->db->from('dsavisit');
			$this->db->where('RO_ID', $id);
			$this->db->where('dsavisit.last_updated_date >=', $Start_Date);
		    $this->db->where('dsavisit.last_updated_date <=', $End_Date);
			
				$this->db->order_by("dsavisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				// $executedQuery = $this->db->last_query();
				 // print_r($executedQuery);
				 // exit;
				return $response->count; 

      } 
	
		
		public function get_all_ntbvisit($id,$userType)
	{
		    $this->db->select('count(*) as count ');
     	   $q = $this->db->from('ntbvisit');
		   $this->db->where('RO_ID', $id);
            $this->db->order_by("id", "desc");
            $query = $this->db->get();
			$response=$query->row();
			return $response->count; 

	}
		
		public function get_all_customers_Admin_filters1($id,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('ntbvisit');
			$this->db->where('RO_ID', $id);
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('ntbvisit.last_updated_date <=', $End_Date);
				
			  }
			  
				$this->db->order_by("ntbvisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				// $executedQuery = $this->db->last_query();
				 // print_r($executedQuery);
				 // exit;
				return $response->count; 

    
      } 
			
		
		 public function get_all_customers_Admin_filter_paginations1($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
              $this->db->select('*');
             $this->db->from('ntbvisit');
			$this->db->where('RO_ID', $id);
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('ntbvisit.last_updated_date <=', $End_Date);
				
			  }
			  
			 
      
             /*$executedQuery = $this->db->last_query();
             print_r($executedQuery);
             exit;*/
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("ntbvisit.id","asec");
              $query = $this->db->get()->result();
              return $query;           
		}  
		
		
		public function current_month1($Start_Date,$End_Date,$id){
		
            $this->db->select('count(*) as count ');
            $this->db->from('ntbvisit');
			$this->db->where('RO_ID', $id);
			$this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
		    $this->db->where('ntbvisit.last_updated_date <=', $End_Date);
			
				$this->db->order_by("ntbvisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				// $executedQuery = $this->db->last_query();
				 // print_r($executedQuery);
				 // exit;
				return $response->count; 

    
      } 
			
			
			public function get_all_leadvisit($id,$userType,$Relationship)
	{
		    $this->db->select('count(*) as count ');
     	   $q = $this->db->from('leadvisit');
		  if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('leadvisit.lead_assign_to',$id);
				 
				}
           $this->db->order_by("leadvisit.id", "desc");
			  $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=leadvisit.lead_assign_to');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
            $query = $this->db->get();
			$response=$query->row();
			return $response->count; 

	}
		
		public function get_all_customers_Admin_filters2($id,$searchValue,$Start_Date,$End_Date,$Relationship)
			{
            $this->db->select('count(*) as count');
            $this->db->from('leadvisit');
			if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('leadvisit.lead_assign_to',$id);
				 
				}
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('leadvisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('leadvisit.last_updated_date <=', $End_Date);
				
			  }
			  
				$this->db->order_by("leadvisit.id","asec");
				  $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=leadvisit.lead_assign_to');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
				$query = $this->db->get();
				$response=$query->row();
				// $executedQuery = $this->db->last_query();
				 // print_r($executedQuery);
				 // exit;
				return $response->count; 

    
      } 
			
		
		 public function get_all_customers_Admin_filter_paginations2($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date,$Relationship)
			{
              $this->db->select('*');
             $this->db->from('leadvisit');
			if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('leadvisit.lead_assign_to',$id);
				 
				}
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('leadvisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('leadvisit.last_updated_date <=', $End_Date);
				
			  }
			  
			 
      
             /*$executedQuery = $this->db->last_query();
             print_r($executedQuery);
             exit;*/
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("leadvisit.id","asec");
			    $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=leadvisit.lead_assign_to');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
              $query = $this->db->get()->result();
              return $query;           
		}  
		
		
		public function current_month2($Start_Date,$End_Date,$id,$Relationship){
		
            $this->db->select('count(*) as count ');
            $this->db->from('leadvisit');
			//$this->db->where('id', $id);
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('leadvisit.lead_assign_to',$id);
				 
				}
			$this->db->where('leadvisit.last_updated_date >=', $Start_Date);
		    $this->db->where('leadvisit.last_updated_date <=', $End_Date);

				$this->db->order_by("leadvisit.id","asec");
				  $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=leadvisit.lead_assign_to');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
				$query = $this->db->get();
				$response=$query->row();
		//		$executedQuery = $this->db->last_query();
			//	 print_r($executedQuery);
 //exit;
			return $response->count; 

    
      } 
			
		public function bureau_pull($Start_Date,$End_Date,$id){
		 $this->db->select('count(*) as count ');
		$this->db->from('USER_DETAILS');
				$this->db->where('RO_ID', $id);
		  $this->db->where('ROLE',1);
    	  $this->db->where('CREATED_AT >=', $Start_Date);
	    $this->db->where('CREATED_AT <=', $End_Date);
		$this->db->join('credit_score','credit_score.customer_id= USER_DETAILS.UNIQUE_CODE'); 
		$this->db->order_by("USER_DETAILS.ID","asec");
				$query = $this->db->get();
				$response=$query->row();
				// $executedQuery = $this->db->last_query();
				//print_r($executedQuery);
				 // exit;
				return $response->count;		
		}
	
	
			public function get_all_bureau($id,$Start_Date,$End_Date)
	{
		
				 $this->db->select('count(*) as count ');
		$this->db->from('USER_DETAILS');
		$this->db->where('RO_ID', $id);
		  $this->db->where('ROLE',1);
    	  $this->db->where('CREATED_AT >=', $Start_Date);
	    $this->db->where('CREATED_AT <=', $End_Date);
		$this->db->join('credit_score','credit_score.customer_id= USER_DETAILS.UNIQUE_CODE'); 
		$this->db->order_by("USER_DETAILS.ID","asec");
				$query = $this->db->get();
				$response=$query->row();
				// $executedQuery = $this->db->last_query();
				//print_r($executedQuery);
				 // exit;
				return $response->count;	
				
		    

	}
		
		public function get_all_customers_Admin_bureau($id,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
           	$this->db->from('USER_DETAILS');
			$this->db->where('RO_ID', $id);
		  $this->db->where('ROLE',1);
            if($searchValue!= '')
            {
			$where = "FN like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('CREATED_AT >=', $Start_Date);
			  }
			  if($End_Date!='' )
			  {
				  $this->db->where('CREATED_AT <=', $End_Date);
				
			  }
			  $this->db->join('credit_score','credit_score.customer_id= USER_DETAILS.UNIQUE_CODE'); 
				$this->db->order_by("USER_DETAILS.ID","asec");
				$query = $this->db->get();
				$response=$query->row();
				// $executedQuery = $this->db->last_query();
				 // print_r($executedQuery);
				 // exit;
				return $response->count; 

    
      } 
			
		
		 public function get_all_customers_Admin_filter_bureau($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
              $this->db->select('*');
             $this->db->from('USER_DETAILS');
			$this->db->where('RO_ID', $id);
             if($searchValue!= '')
             {
             $where = "FN like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				 $this->db->where('CREATED_AT >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				    $this->db->where('CREATED_AT <=', $End_Date);
			  }
			  
			 
      
             /*$executedQuery = $this->db->last_query();
             print_r($executedQuery);
             exit;*/
			 $this->db->join('credit_score','credit_score.customer_id= USER_DETAILS.UNIQUE_CODE'); 
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("USER_DETAILS.ID","asec");
              $query = $this->db->get()->result();
              return $query;           
		}  
		
		
		public function get_all_bureau1($id,$Start_Date,$End_Date)
		{
		
		$this->db->select('count(*) as count ');
		$this->db->from('USER_DETAILS');
		$this->db->where('RO_ID', $id);
		  $this->db->where('ROLE',1);
    	// $query=$this->db->like('dates', array('dates' => date('Y-m-d')));
		$this->db->join('credit_score','credit_score.customer_id= USER_DETAILS.UNIQUE_CODE'); 
		 $where=$this->db->like('checked_dts', $Start_Date);
		 $where=$this->db->like('checked_dts',$End_Date);
		//  $this->db->where($where);
		 //$this->db->where('checked_dts >=', $Start_Date);
	    //$this->db->where('checked_dts <=', $End_Date);
		$this->db->order_by("USER_DETAILS.ID","asec");
				$query = $this->db->get();
				$response=$query->row();
				// $executedQuery = $this->db->last_query();
				//print_r($executedQuery);
			//	 exit;
				return $response->count;	
				
		    

		}
		
		public function get_all_customers_Admin_bureau1($id,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
           	$this->db->from('USER_DETAILS');
			$this->db->where('RO_ID', $id);
		  $this->db->where('ROLE',1);
            if($searchValue!= '')
            {
			$where = "FN like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			  
			  $this->db->join('credit_score','credit_score.customer_id= USER_DETAILS.UNIQUE_CODE'); 
			   if($Start_Date!='' )
			  {
				 
				 $where=$this->db->like('checked_dts', $Start_Date);
			  }
			  if($End_Date!='' )
			  {
				  $where=$this->db->like('checked_dts', $End_Date);
				
			  }
				$this->db->order_by("USER_DETAILS.ID","asec");
				$query = $this->db->get();
				$response=$query->row();
				// $executedQuery = $this->db->last_query();
				 // print_r($executedQuery);
				 // exit;
				return $response->count; 

    
      } 
			
		
		 public function get_all_customers_Admin_filter_bureau1($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
              $this->db->select('*');
             $this->db->from('USER_DETAILS');
			$this->db->where('RO_ID', $id);
             if($searchValue!= '')
             {
             $where = "FN like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 
			  
			 
      
             /*$executedQuery = $this->db->last_query();
             print_r($executedQuery);
             exit;*/
			 $this->db->join('credit_score','credit_score.customer_id= USER_DETAILS.UNIQUE_CODE');
				if($Start_Date!='' )
			  {
				   $where=$this->db->like('checked_dts', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				     $where=$this->db->like('checked_dts', $End_Date);
			  }			 
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("USER_DETAILS.ID","asec");
              $query = $this->db->get()->result();
              return $query;           
		}  
		
		public function today_pull($Start_Date,$End_Date,$id){
		 $this->db->select('count(*) as count ');
		$this->db->from('USER_DETAILS');
		$this->db->where('RO_ID', $id);
		  $this->db->where('ROLE',1);
    	
		$this->db->join('credit_score','credit_score.customer_id= USER_DETAILS.UNIQUE_CODE'); 
		$where=$this->db->like('checked_dts', $Start_Date);
		 $where=$this->db->like('checked_dts',$End_Date);
		$this->db->order_by("USER_DETAILS.ID","asec");
				$query = $this->db->get();
				$response=$query->row();
				// $executedQuery = $this->db->last_query();
				//print_r($executedQuery);
				 // exit;
				return $response->count;		
		}
	
	public function get_more_info($ID)
	{
		  $this->db->select('*');
            $this->db->from('ntbvisit');
			
           $this->db->where('id',$ID);
        
            $query = $this->db->get();
            $response=$query->row();
            return $response;
			//$executedQuery = $this->db->last_query();
		//print_r($executedQuery);
		//exit;
		
	} 
	
	 public function getDSAexcel($id,$userType)
    {
        $this->db->select('*');
        $q = $this->db->from('dsavisit');
		$this->db->where('RO_ID', $id);
        $this->db->order_by("id", "desc");
        $response = $q->get()->result();
        //echo '<pre>';
       // print_r($response);
        return $response;
    }    
	 public function getDSAexcel1($id,$userType,$Start_Date,$End_Date)
    {
        $this->db->select('*');
        $q = $this->db->from('dsavisit');
		$this->db->where('RO_ID', $id);
		$this->db->where('dsavisit.last_updated_date >=', $Start_Date);
		$this->db->where('dsavisit.last_updated_date <=', $End_Date);
        $this->db->order_by("id", "desc");
        $response = $q->get()->result();
       //$executedQuery = $this->db->last_query();
		//print_r($executedQuery);
		//exit;
        return $response;
    }    
	 public function getNtbexcel($id,$userType)
    {
        $this->db->select('*');
        $q = $this->db->from('ntbvisit');
		$this->db->where('RO_ID', $id);
        $this->db->order_by("id", "desc");
        $response = $q->get()->result();
        //echo '<pre>';
       // print_r($response);
        return $response;
    }    
	 public function getNtbexcel1($id,$userType,$Start_Date,$End_Date)
    {
        $this->db->select('*');
        $q = $this->db->from('ntbvisit');
		$this->db->where('RO_ID', $id);
		$this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
		$this->db->where('ntbvisit.last_updated_date <=', $End_Date);
        $this->db->order_by("id", "desc");
        $response = $q->get()->result();
        //echo '<pre>';
       // print_r($response);
        return $response;
    }    
	 public function getLeadexcel($id,$userType)
    {
        $this->db->select('*');
        $q = $this->db->from('leadvisit');
		$this->db->where('RO_ID', $id);
        $this->db->order_by("id", "desc");
        $response = $q->get()->result();
        //echo '<pre>';
       // print_r($response);
        return $response;
    }  
	
	public function getLeadexcel1($id,$userType,$Start_Date,$End_Date)
    {
        $this->db->select('*');
        $q = $this->db->from('leadvisit');
		$this->db->where('RO_ID', $id);
		$this->db->where('leadvisit.last_updated_date >=', $Start_Date);
		$this->db->where('leadvisit.last_updated_date <=', $End_Date);
        $this->db->order_by("id", "desc");
        $response = $q->get()->result();
        //echo '<pre>';
       // print_r($response);
        return $response;
    }  
	 public function getExistingexcel($id,$userType)
    {
        $this->db->select('*');
        $q = $this->db->from('existingvisit');
		$this->db->where('RO_ID', $id);
        $this->db->order_by("id", "desc");
        $response = $q->get()->result();
        //echo '<pre>';
       // print_r($response);
        return $response;
    }  
	 public function getExistingexcel1($id,$userType,$Start_Date,$End_Date)
    {
        $this->db->select('*');
        $q = $this->db->from('existingvisit');
		$this->db->where('RO_ID', $id);
		$this->db->where('existingvisit.last_updated_date >=', $Start_Date);
		$this->db->where('existingvisit.last_updated_date <=', $End_Date);
        $this->db->order_by("id", "desc");
        $response = $q->get()->result();
        //echo '<pre>';
       // print_r($response);
        return $response;
    }  
	
		public function current_month3($Start_Date,$End_Date,$id){
		
            $this->db->select('count(*) as count ');
            $this->db->from('existingvisit');
			$this->db->where('RO_ID', $id);
			$this->db->where('existingvisit.last_updated_date >=', $Start_Date);
		    $this->db->where('existingvisit.last_updated_date <=', $End_Date);
			
				$this->db->order_by("existingvisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				// $executedQuery = $this->db->last_query();
				 // print_r($executedQuery);
				 // exit;
				return $response->count; 

		}
		public function get_all_existingvisit($id,$userType)
	{
		    $this->db->select('count(*) as count ');
     	   $q = $this->db->from('existingvisit');
		   $this->db->where('RO_ID', $id);
            $this->db->order_by("id", "desc");
            $query = $this->db->get();
			$response=$query->row();
			return $response->count; 

	}
		
		public function get_all_customers_Admin_filters3($id,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('existingvisit');
			$this->db->where('RO_ID', $id);
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('existingvisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('existingvisit.last_updated_date <=', $End_Date);
				
			  }
			  
				$this->db->order_by("existingvisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				// $executedQuery = $this->db->last_query();
				 // print_r($executedQuery);
				 // exit;
				return $response->count; 

    
      } 
			
		
		 public function get_all_customers_Admin_filter_paginations3($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
              $this->db->select('*');
             $this->db->from('existingvisit');
			$this->db->where('RO_ID', $id);
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('existingvisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('existingvisit.last_updated_date <=', $End_Date);
				
			  }
			  
			 
      
             /*$executedQuery = $this->db->last_query();
             print_r($executedQuery);
             exit;*/
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("existingvisit.id","asec");
              $query = $this->db->get()->result();
              return $query;           
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
     public function get_address_by_mobileno($mobileno)
	 {
		
	       $this->db->select('*');
         
            $this->db->from('USER_DETAILS');
			$this->db->where('ROLE',1);
            $this->db->where("MOBILE", $mobileno);	
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
			$q = $this->db->get();
			$row = $q->row();
	       // $executedQuery = $this->db->last_query();
			//print_r($executedQuery);
			//exit;
			return $row;
  }
  
    public function get_branch_location(){
      $this->db->select('*');  
      $this->db->from('branch_location_master');
      $q = $this->db->get();
      $row = $q->result();
	    // $executedQuery = $this->db->last_query();
		//	print_r($executedQuery);
	//	exit;
      return $row;
    }
  
  //------------------------------For BM-------------------------//
  		
		public function bm_current_month($Relationship,$id,$Start_Date,$End_Date){
		
		  $this->db->select('count(*) as count ');
            $this->db->from('dsavisit');
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('dsavisit.RO_ID',$Relationship);
				 
				}
			$this->db->where('dsavisit.last_updated_date >=', $Start_Date);
		    $this->db->where('dsavisit.last_updated_date <=', $End_Date);
			
			 $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
				$this->db->order_by("dsavisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				//$executedQuery = $this->db->last_query();
				//print_r($executedQuery);
				// exit;
				return $response->count;
           
      } 
  
  public function bm_get_all_dsavisit($id)
		{ 
	
		$array=array();
		 $this->db->select('UNIQUE_CODE');
		$this->db->from('USER_DETAILS');
		 $this->db->where_in('BM_ID',$id);
		 $this->db->where('ROLE',14);
		 $query = $this->db->get();
		 $response=$query->result();
		 foreach ($response as $value) 
			 $array[] = $value->UNIQUE_CODE;
		   
		 return $array;
	
		}
		
	 public function get_all_customers_Branch1($Relationship,$id)
		{

		 $this->db->select('count(*)as count');
       $this->db->from('dsavisit');
       if(!empty($Relationship))
       {
        $this->db->where_in('dsavisit.RO_ID',$Relationship);
        
       } 
	   //$this->db->where_in('BM_ID',$id);
       $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
	    $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
	   
       return $response->count;
			
		   }
	
	public function get_all_customers_Branch_filter1($Relationship,$id,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('dsavisit');
		//	print_r($Relationship);
		//	exit;
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('dsavisit.RO_ID',$Relationship);
				  
				}
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('dsavisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date <=', $End_Date);
				
			  }
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
				$this->db->order_by("dsavisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				//$executedQuery = $this->db->last_query();
				 //print_r($executedQuery);
				//exit;
				
				return $response->count; 

    
      } 
	
		 public function get_all_customers_Branch_filter_with_page1($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
              $this->db->select('*');
             $this->db->from('dsavisit');
		
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('dsavisit.RO_ID',$Relationship);
				 
				}
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date <=', $End_Date);
				
			  }
			  
			 
      
             /*$executedQuery = $this->db->last_query();
             print_r($executedQuery);
             exit;*/
			  $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("dsavisit.id","asec");
              $query = $this->db->get()->result();
              return $query;           
		}  
		
	
  
  
  	public function bm_current_month1($Relationship,$id,$Start_Date,$End_Date){
		
		  $this->db->select('count(*) as count ');
            $this->db->from('ntbvisit');
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('ntbvisit.RO_ID',$Relationship);
				 
				}
			$this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
		    $this->db->where('ntbvisit.last_updated_date <=', $End_Date);
			
			 $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=ntbvisit.RO_ID');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
				$this->db->order_by("ntbvisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				///$executedQuery = $this->db->last_query();
				//print_r($executedQuery);
				// exit;
				return $response->count;
           
      } 
  
  public function bm_get_all_ntbvisit($id)
		{ 
	
		$array=array();
		 $this->db->select('UNIQUE_CODE');
			 $this->db->from('USER_DETAILS');
			 $this->db->where_in('BM_ID',$id);
		 $this->db->where('ROLE',14);
		 $query = $this->db->get();
		 $response=$query->result();
		 foreach ($response as $value) 
			 $array[] = $value->UNIQUE_CODE;
		   
		 return $array;
	
		}
		
	 public function get_all_customers_Branch_ntb($Relationship,$id)
		{
		 $this->db->select('count(*)as count');
       $this->db->from('ntbvisit');
       if(!empty($Relationship))
       {
        $this->db->where_in('ntbvisit.RO_ID',$Relationship);
        
       } 
	   //$this->db->where_in('BM_ID',$id);
       $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=ntbvisit.RO_ID');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
	    $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
       return $response->count;
			
		   }
	
	public function get_all_customers_Branch_filter_ntb($Relationship,$id,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('ntbvisit');
		//	print_r($Relationship);
		//	exit;
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('ntbvisit.RO_ID',$Relationship);
				  
				}
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('ntbvisit.last_updated_date <=', $End_Date);
				
			  }
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=ntbvisit.RO_ID');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
				$this->db->order_by("ntbvisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				//$executedQuery = $this->db->last_query();
				 //print_r($executedQuery);
				//exit;
				return $response->count; 

    
      } 
	
		 public function get_all_customers_Branch_filter_with_page_ntb($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
              $this->db->select('*');
             $this->db->from('ntbvisit');
		
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('ntbvisit.RO_ID',$Relationship);
				 
				}
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('ntbvisit.last_updated_date <=', $End_Date);
				
			  }
			  
			 
      
             /*$executedQuery = $this->db->last_query();
             print_r($executedQuery);
             exit;*/
			  $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=ntbvisit.RO_ID');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("ntbvisit.id","asec");
              $query = $this->db->get()->result();
              return $query;           
		}  
		
  
  	public function bm_current_month3($Relationship,$id,$Start_Date,$End_Date){
		
		  $this->db->select('count(*) as count ');
            $this->db->from('existingvisit');
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('existingvisit.RO_ID',$Relationship);
				 
				}
			$this->db->where('existingvisit.last_updated_date >=', $Start_Date);
		    $this->db->where('existingvisit.last_updated_date <=', $End_Date);
			
			 $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=existingvisit.RO_ID');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
				$this->db->order_by("existingvisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				///$executedQuery = $this->db->last_query();
				//print_r($executedQuery);
				// exit;
				return $response->count;
           
      } 
  
  public function bm_get_all_existingvisit($id)
		{ 
	
		$array=array();
		 $this->db->select('UNIQUE_CODE');
			 $this->db->from('USER_DETAILS');
			 $this->db->where_in('BM_ID',$id);
		 $this->db->where('ROLE',14);
		 $query = $this->db->get();
		 $response=$query->result();
		 foreach ($response as $value) 
			 $array[] = $value->UNIQUE_CODE;
		   
		 return $array;
	
		}
		
	 public function get_all_customers_Branch_existing($Relationship,$id)
		{
		 $this->db->select('count(*)as count');
       $this->db->from('existingvisit');
       if(!empty($Relationship))
       {
        $this->db->where_in('existingvisit.RO_ID',$Relationship);
        
       } 
	   //$this->db->where_in('BM_ID',$id);
      $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=existingvisit.RO_ID');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
	    $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
       return $response->count;
			
		   }
	
	public function get_all_customers_Branch_filter_existing($Relationship,$id,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('existingvisit');
		//	print_r($Relationship);
		//	exit;
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('existingvisit.RO_ID',$Relationship);
				  
				}
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('existingvisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('existingvisit.last_updated_date <=', $End_Date);
				
			  }
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=existingvisit.RO_ID');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
				$this->db->order_by("existingvisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				//$executedQuery = $this->db->last_query();
				 //print_r($executedQuery);
				//exit;
				return $response->count; 

    
      } 
	
		 public function get_all_customers_Branch_filter_with_page_existing($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
              $this->db->select('*');
             $this->db->from('existingvisit');
		
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('existingvisit.RO_ID',$Relationship);
				 
				}
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('existingvisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('existingvisit.last_updated_date <=', $End_Date);
				
			  }
			  
			 
      
             /*$executedQuery = $this->db->last_query();
             print_r($executedQuery);
             exit;*/
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=existingvisit.RO_ID');
			 $this->db->where_in('BM_ID',$id);
			  $this->db->where('ROLE',14);
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("existingvisit.id","asec");
              $query = $this->db->get()->result();
              return $query;           
		}  
		
  public function bm_current_month4($id,$Start_Date,$End_Date){
		
		  $this->db->select('count(*) as count ');
            $this->db->from('leadvisit');
			
			$this->db->where('leadvisit.last_updated_date >=', $Start_Date);
		    $this->db->where('leadvisit.last_updated_date <=', $End_Date);
			
			 // $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=leadvisit.RO_ID');
			 $this->db->where_in('RO_ID',$id);
			 // $this->db->where('ROLE',14);
				$this->db->order_by("leadvisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				///$executedQuery = $this->db->last_query();
				//print_r($executedQuery);
				// exit;
				return $response->count;
           
      } 
  
  public function bm_get_all_leadvisit($id)
		{ 
	
		$array=array();
		 $this->db->select('UNIQUE_CODE');
			 $this->db->from('USER_DETAILS');
			 $this->db->where_in('BM_ID',$id);
		 $this->db->where('ROLE',14);
		 $query = $this->db->get();
		 $response=$query->result();
		 foreach ($response as $value) 
			 $array[] = $value->UNIQUE_CODE;
		   
		 return $array;
	
		}
		
	 public function get_all_customers_Branch_lead($id)
		{
		 $this->db->select('count(*)as count');
       $this->db->from('leadvisit');
      
	   //$this->db->where_in('BM_ID',$id);
    //  $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=leadvisit.RO_ID');
	 $this->db->where('RO_ID',$id);
			//  $this->db->where('ROLE',14);
	    $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
       return $response->count;
			
		   }
	
	public function get_all_customers_Branch_filter_lead($id,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('leadvisit');
		//	print_r($Relationship);
		//	exit;
			/* if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('leadvisit.RO_ID',$Relationship);
				  
				}*/
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('leadvisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('leadvisit.last_updated_date <=', $End_Date);
				
			  }
			 //  $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=leadvisit.RO_ID');
			 $this->db->where('RO_ID',$id);
			  //$this->db->where('ROLE',14);
				$this->db->order_by("leadvisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				//$executedQuery = $this->db->last_query();
				 //print_r($executedQuery);
				//exit;
				return $response->count; 

    
      } 
	
		 public function get_all_customers_Branch_filter_with_page_lead($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
              $this->db->select('*');
             $this->db->from('leadvisit');
		
			/* if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('leadvisit.RO_ID',$Relationship);
				 
				}*/
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('leadvisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('leadvisit.last_updated_date <=', $End_Date);
				
			  }
			  
			 
      
             /*$executedQuery = $this->db->last_query();
             print_r($executedQuery);
             exit;*/
			//  $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=leadvisit.RO_ID');
			 $this->db->where('RO_ID',$id);
			//  $this->db->where('ROLE',14);
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("leadvisit.id","asec");
              $query = $this->db->get()->result();
              return $query;           
		}  
		
		
		public function get_all_customers_Branch_bureaupull($Relationship,$id,$Start_Date,$End_Date)
		{
			 
		if(!empty($Relationship))
				{
					$this->db->select('count(*) as count'); 
		$this->db->from('USER_DETAILS');
		  $this->db->where_in('RO_ID',$Relationship);
			         $this->db->where('ROLE',1);
				
    	  $this->db->where('checked_dts >=', $Start_Date);
	    $this->db->where('checked_dts <=', $End_Date);
		$this->db->join('credit_score','credit_score.customer_id= USER_DETAILS.UNIQUE_CODE'); 
		$this->db->order_by("USER_DETAILS.ID","asec");
				$query = $this->db->get();
				$response=$query->row();
				// $executedQuery = $this->db->last_query();
				//print_r($executedQuery);
				 // exit;
				return $response->count;	
				
				}

		}
		
		public function get_all_customers_Branch_filter_bureaupull($Relationship,$id,$searchValue,$Start_Date,$End_Date)
			{
        
			if(!empty($Relationship))
				{
			$this->db->select('count(*) as count');
           	$this->db->from('USER_DETAILS');
		  $this->db->where_in('RO_ID',$Relationship);
			         $this->db->where('ROLE',1);
					 
				 if($searchValue!= '')
            {
			$where = "FN like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('checked_dts >=', $Start_Date);
			  }
			  if($End_Date!='' )
			  {
				  $this->db->where('checked_dts <=', $End_Date);
				
			  }

			   $this->db->where_in('RO_ID',$Relationship);
			         $this->db->where('ROLE',1);
			  			  $this->db->join('credit_score','credit_score.customer_id= USER_DETAILS.UNIQUE_CODE'); 
				$this->db->order_by("USER_DETAILS.ID","asec");
				$query = $this->db->get();
				$response=$query->row();
						//$executedQuery = $this->db->last_query();
			//	 print_r($executedQuery);
				//  exit;
					return $response->count;
				}
      else{
		  return 0;
	  }
			   
			 

    
      } 
			
		
		 public function get_all_customers_Branch_filter_with_page_bureaupull($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
             			if(!empty($Relationship))
				{ 
			$this->db->select('*');
           	$this->db->from('USER_DETAILS');
		  $this->db->where_in('RO_ID',$Relationship);
			         $this->db->where('ROLE',1);
					 
				 if($searchValue!= '')
            {
			$where = "FN like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('checked_dts >=', $Start_Date);
			  }
			  if($End_Date!='' )
			  {
				  $this->db->where('checked_dts <=', $End_Date);
				
			  }
			   $this->db->where_in('RO_ID',$Relationship);
			         $this->db->where('ROLE',1);
			  $this->db->join('credit_score','credit_score.customer_id= USER_DETAILS.UNIQUE_CODE'); 
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("USER_DETAILS.ID","asec");
              $query = $this->db->get()->result();
              return $query;  
				}
          else{
		$var=array();
		return $var;
	  }

			         
		}  
		
		public function bm_current_month5($Relationship,$id,$dt,$dt1){
			
			
		 
		//print_r($Relationship);
		//exit;
			if(!empty($Relationship))
				{
					//echo "hi";
					$this->db->select('count(*) as count ');
		             $this->db->from('USER_DETAILS');
			         $this->db->where_in('RO_ID',$Relationship);
			         $this->db->where('ROLE',1);
					 $this->db->where('checked_dts >=', $dt);
					$this->db->where('checked_dts <=', $dt1);
					$this->db->join('credit_score','credit_score.customer_id= USER_DETAILS.UNIQUE_CODE'); 
			  		$this->db->order_by("USER_DETAILS.ID","asec");
				$query = $this->db->get();
				$response=$query->row();
				return $response->count;
				}
				else{
					return 0;
				}

				// $executedQuery = $this->db->last_query();
			//print_r($executedQuery);
			  //exit;
				
		}
	
		
	public function bm_get_all_bureaupull($id)
		{ 
	
		$array=array();
		 $this->db->select('UNIQUE_CODE');
			 $this->db->from('USER_DETAILS');
			 $this->db->where_in('BM_ID',$id);
		 $this->db->where('ROLE',14);
		 $query = $this->db->get();
		 $response=$query->result();
		 foreach ($response as $value) 
			 $array[] = $value->UNIQUE_CODE;
		   
		 return $array;
	
		}
  //------------------------For Excel--------------------------//
  public function getbm_excel($Relationship,$id,$userType,$Start_Date,$End_Date)
    {
        $this->db->select('*');
        $q = $this->db->from('dsavisit');
		if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('RO_ID',$Relationship);
				 
				}
		$this->db->where('dsavisit.last_updated_date >=', $Start_Date);
		$this->db->where('dsavisit.last_updated_date <=', $End_Date);
        $this->db->order_by("id", "desc");
        $response = $q->get()->result();
       //$executedQuery = $this->db->last_query();
		//print_r($executedQuery);
		//exit;
        return $response;
    }    
	
	
	
	  public function meeting_type($Relationship,$id,$Start_Date,$End_Date)
	  {
	
		
				$countarr = array();
				foreach($Relationship as $id)
				{
				 $SelectQuery = "SELECT count(*) as counter FROM finserv_test.dsavisit
				 WHERE dsavisit.RO_ID = '".$id."'
				AND `dsavisit`.`last_updated_date` >= '".$Start_Date."'
				AND `dsavisit`.`last_updated_date` <= '".$End_Date."'
				AND `meeting_type` = 'New'
				
				";
				//echo "<BR>";

				$result = $this->db->query($SelectQuery);

				$row = $result->result();



				$countarr[$id] = $row[0]->counter;

				//print_r($row);

								}
								
								//print_r($countarr);
								
								return $countarr;
						  
	

	  }
	
	 public function meeting_type1($Relationship,$id,$Start_Date,$End_Date)
	  {
		  
	$countarr = array();
				foreach($Relationship as $id)
				{
				 $SelectQuery = "SELECT count(*) as counter FROM finserv_test.dsavisit WHERE dsavisit.RO_ID = '".$id."'
				AND `dsavisit`.`last_updated_date` >= '".$Start_Date."'
				AND `dsavisit`.`last_updated_date` <= '".$End_Date."'
				AND `meeting_type` = 'Existing'
				";
				//echo "<BR>";

				$result = $this->db->query($SelectQuery);

				$row = $result->result();



				$countarr[$id] = $row[0]->counter;

				//print_r($row);

								}
								
								//print_r($countarr);
								
								return $countarr;
		
	  }
	
	
	 public function customer_exit($Relationship,$id,$Start_Date,$End_Date)
	  {
		    
		  $countarr = array();
				foreach($Relationship as $id)
				{
				 $SelectQuery = "SELECT count(*) as counter FROM finserv_test.existingvisit WHERE existingvisit.RO_ID = '".$id."'
				AND `existingvisit`.`last_updated_date` >= '".$Start_Date."'
				AND `existingvisit`.`last_updated_date` <= '".$End_Date."'
				
				";
				//echo "<BR>";

				$result = $this->db->query($SelectQuery);

				$row = $result->result();



				$countarr[$id] = $row[0]->counter;

				//print_r($row);

								}
								
								//print_r($countarr);
								
								return $countarr;
		 

	  }
	
	 public function customer_ntb($Relationship,$id,$Start_Date,$End_Date)
	  {
		  
		  
		     
		  $countarr = array();
				foreach($Relationship as $id)
				{
				 $SelectQuery = "SELECT count(*) as counter FROM finserv_test.ntbvisit WHERE ntbvisit.RO_ID = '".$id."'
				AND `ntbvisit`.`last_updated_date` >= '".$Start_Date."'
				AND `ntbvisit`.`last_updated_date` <= '".$End_Date."'
				
				";
				//echo "<BR>";

				$result = $this->db->query($SelectQuery);

				$row = $result->result();



				$countarr[$id] = $row[0]->counter;

				//print_r($row);

								}
								
								//print_r($countarr);
								
								return $countarr;
		 
	

	  }
	  
	  
	  public function loannew($ID)
	{
		  $this->db->select('*');
            $this->db->from('dsavisit');
			
           $this->db->where('RO_ID',$ID);
        
            $query = $this->db->get();
            $response=$query->row();
          return $response;
		///	$executedQuery = $this->db->last_query();
		//print_r($executedQuery);
	//exit;
		
	}
	
	
	public function get_all_dsavisit5( $Relationship,$id,$userType)
		{
			
		    $this->db->select('count(*) as count ');
			$q = $this->db->from('dsavisit');
			$this->db->where('dsavisit.RO_ID', $id);
		
            $this->db->order_by("id", "desc");
            $query = $this->db->get();
			$response=$query->row();
			
			
			if(!empty($response->count))
			{
			return $response->count; 
			}
			else{
				return 0;
			}
		//	return $response->count; 
		}
	
		public function get_all_customers_Admin_filters5( $Relationship,$id,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('dsavisit');
		$this->db->where('dsavisit.RO_ID', $id);
			
			$this->db->where('dsavisit.last_updated_date >=', $Start_Date);
			  $this->db->where('dsavisit.last_updated_date <=', $End_Date);
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('dsavisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date <=', $End_Date);
				
			  }
			
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID');
			
				$query = $this->db->get();
				$response=$query->row();
					if(!empty($response->count))
			{
			return $response->count; 
			}
			else{
				return 0;
			}

			
      } 
			
		
		
	public function get_all_customers_Admin_filter_paginations5( $Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
			//	echo "hi";
              $this->db->select('*');
             $this->db->from('dsavisit');
			$this->db->where('dsavisit.RO_ID', $id);
		
			  $this->db->where('dsavisit.last_updated_date >=', $Start_Date);
			  $this->db->where('dsavisit.last_updated_date <=', $End_Date);
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date <=', $End_Date);
				
			  }
			 $this->db->where('meeting_type=','New');
			
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID');
				 
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("dsavisit.id","asec");
              $query = $this->db->get()->result();
	//	$executedQuery = $this->db->last_query();
	//print_r($executedQuery);
	//exit;
	if(!empty($query))
					{
					return $query ;
					}
					else{
						$var=array();
						return $var;
					}   
					
			}



public function get_all_customers_Admin_filter_paginations6( $Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
			//	echo "hi";
              $this->db->select('*');
             $this->db->from('dsavisit');
			$this->db->where('dsavisit.RO_ID', $id);
		
			  $this->db->where('dsavisit.last_updated_date >=', $Start_Date);
			  $this->db->where('dsavisit.last_updated_date <=', $End_Date);
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date <=', $End_Date);
				
			  }
			 $this->db->where('meeting_type=','Existing');
			
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID');
				 
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("dsavisit.id","asec");
              $query = $this->db->get()->result();
	//	$executedQuery = $this->db->last_query();
	//print_r($executedQuery);
	//exit;
	if(!empty($query))
					{
					return $query ;
					}
					else{
						$var=array();
						return $var;
					}   
					
			}







	public function get_all_existing($id,$userType)
		{
			
		    $this->db->select('count(*) as count ');
			$q = $this->db->from('existingvisit');
			$this->db->where('existingvisit.RO_ID', $id);
			
            $this->db->order_by("id", "desc");
            $query = $this->db->get();
			$response=$query->row();
			if(!empty($response->count))
			{
			return $response->count; 
			}
			else{
				return 0;
			}
		//	return $response->count; 
		}
	
		public function get_all_customers_existing($id,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('existingvisit');
		$this->db->where('existingvisit.RO_ID', $id);
			
			$this->db->where('existingvisit.last_updated_date >=', $Start_Date);
			  $this->db->where('existingvisit.last_updated_date <=', $End_Date);
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('existingvisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('existingvisit.last_updated_date <=', $End_Date);
				
			  }
			
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=existingvisit.RO_ID');
			
				$query = $this->db->get();
				$response=$query->row();
					if(!empty($response->count))
			{
			return $response->count; 
			}
			else{
				return 0;
			}

			
      } 
			
		
		
	public function get_all_customers_Admin_existing_pagination($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
			//	echo "hi";
              $this->db->select('*');
             $this->db->from('existingvisit');
			$this->db->where('existingvisit.RO_ID', $id);
		
			  $this->db->where('existingvisit.last_updated_date >=', $Start_Date);
			  $this->db->where('existingvisit.last_updated_date <=', $End_Date);
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('existingvisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('existingvisit.last_updated_date <=', $End_Date);
				
			  }
			
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=existingvisit.RO_ID');
				 
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("existingvisit.id","asec");
              $query = $this->db->get()->result();
		//	$executedQuery = $this->db->last_query();
		//print_r($executedQuery);
	//exit;
			if(!empty($query))
					{
					return $query ;
					}
					else{
						$var=array();
						return $var;
					}     
					
			}



	public function get_all_ntb_customer($id,$userType)
		{
			
		    $this->db->select('count(*) as count ');
			$q = $this->db->from('ntbvisit');
			$this->db->where('ntbvisit.RO_ID', $id);
			
            $this->db->order_by("id", "desc");
            $query = $this->db->get();
			$response=$query->row();
			if(!empty($response->count))
			{
			return $response->count; 
			}
			else{
				return 0;
			}
		//	return $response->count; 
		}
	
		public function get_all_ntb_customers($id,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('ntbvisit');
		$this->db->where('ntbvisit.RO_ID', $id);
			
			$this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
			  $this->db->where('ntbvisit.last_updated_date <=', $End_Date);
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('ntbvisit.last_updated_date <=', $End_Date);
				
			  }
				
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=ntbvisit.RO_ID');
			
				$query = $this->db->get();
				$response=$query->row();
					if(!empty($response->count))
			{
			return $response->count; 
			}
			else{
				return 0;
			}

			
      } 
			
		
		
	public function get_all_ntb_customers_pagination($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
			//	echo "hi";
              $this->db->select('*');
             $this->db->from('ntbvisit');
			$this->db->where('ntbvisit.RO_ID', $id);
		
			  $this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
			  $this->db->where('ntbvisit.last_updated_date <=', $End_Date);
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('ntbvisit.last_updated_date <=', $End_Date);
				
			  }
			
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=ntbvisit.RO_ID');
				 
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("ntbvisit.id","asec");
              $query = $this->db->get()->result();
		//	$executedQuery = $this->db->last_query();
		//print_r($executedQuery);
	//exit;
			if(!empty($query))
					{
					return $query ;
					}
					else{
						$var=array();
						return $var;
					}     
					
			}


	public function get_more_info_lead($ID)
	{
		  $this->db->select('*');
            $this->db->from('leadvisit');
			
           $this->db->where('id',$ID);
        
            $query = $this->db->get();
            $response=$query->row();
            return $response;
			//$executedQuery = $this->db->last_query();
		//print_r($executedQuery);
		//exit;
		
	} 




 public function get_branch_lead($lead)
	 {
	       $this->db->select('*');
            $this->db->from('USER_DETAILS');
			$this->db->where('ROLE',14);
            $this->db->where("Employee_Branch", $lead);	
          $query = $this->db->get();
		 $response=$query->result();	
	 return $response;
	
  }


	public function get_RO($id)
		{
		//	echo $id;
		//	exit;
		    $this->db->select('count(*) as count ');
			$q = $this->db->from('leadvisit');
			$this->db->where('lead_assign_to', $id);
            $this->db->order_by("id", "desc");
            $query = $this->db->get();
			$response=$query->row();
			//	$executedQuery = $this->db->last_query();
	//	print_r($executedQuery);
	//	exit;
			return $response->count; 

		}
		
		//====================================added by pooja 12-1-23======================================//
  
  function getCustomer_created_by()
   {
       $this->db->select('UNIQUE_CODE,FN,LN');
       $this->db->where("ROLE",14);
       $q = $this->db->from('USER_DETAILS');
       $response = $q->get()->result();
        return $response;
   }
   
   
   //-------------------------------added by pooja 13-01-23--------------------------------------//\
   
   public function get_Branch_CL_BM($id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where_in('CM_ID',$id);
 $this->db->where('ROLE',13);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   //	$executedQuery = $this->db->last_query();
	//	print_r($executedQuery);
	//	exit;
 return $array;
}

 public function get_Branch_CL_RO($BM)
{
	
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where_in('BM_ID',$BM);
 $this->db->where('ROLE',14);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
  // 	$executedQuery = $this->db->last_query();
//		print_r($executedQuery);
//		exit;
 return $array;
}


  public function cl_bm_current_month($Relationship,$id,$Start_Date,$End_Date){
		
		  $this->db->select('count(*) as count ');
            $this->db->from('dsavisit');
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('dsavisit.RO_ID',$Relationship);
				 
				}
			$this->db->where('dsavisit.last_updated_date >=', $Start_Date);
		    $this->db->where('dsavisit.last_updated_date <=', $End_Date);
			
			 $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID');
			 $this->db->where_in('CM_ID',$id);
			  $this->db->where('ROLE',13);
				$this->db->order_by("dsavisit.id","desc");
				$query = $this->db->get();
				$response=$query->row();
				//$executedQuery = $this->db->last_query();
				//print_r($executedQuery);
				// exit;
				return $response->count;
           
      } 
		
			public function cl_ro_current_month($Relationship,$BM,$Start_Date,$End_Date){
		
		  $this->db->select('count(*) as count ');
            $this->db->from('dsavisit');
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('dsavisit.RO_ID',$Relationship);
				 
				}
			$this->db->where('dsavisit.last_updated_date >=', $Start_Date);
		    $this->db->where('dsavisit.last_updated_date <=', $End_Date);
			
			 $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID');
			 $this->db->where_in('BM_ID',$BM);
			  $this->db->where('ROLE',14);
				$this->db->order_by("dsavisit.id","desc");
				$query = $this->db->get();
				$response=$query->row();
				//$executedQuery = $this->db->last_query();
				//print_r($executedQuery);
				// exit;
				return $response->count;
           
      } 
	  
	  
	  	 public function cl_bm_current_month_ntb($Relationship,$id,$Start_Date,$End_Date){
		
		  $this->db->select('count(*) as count ');
            $this->db->from('ntbvisit');
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('ntbvisit.RO_ID',$Relationship);
				 
				}
			$this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
		    $this->db->where('ntbvisit.last_updated_date <=', $End_Date);
			
			 $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=ntbvisit.RO_ID');
			 $this->db->where_in('CM_ID',$id);
			  $this->db->where('ROLE',13);
				$this->db->order_by("ntbvisit.id","desc");
				$query = $this->db->get();
				$response=$query->row();
				//$executedQuery = $this->db->last_query();
				//print_r($executedQuery);
				// exit;
				return $response->count;
           
      } 
	  
	   public function cl_bm_current_month_existing($Relationship,$id,$Start_Date,$End_Date){
		
		  $this->db->select('count(*) as count ');
            $this->db->from('existingvisit');
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('existingvisit.RO_ID',$Relationship);
				 
				}
			$this->db->where('existingvisit.last_updated_date >=', $Start_Date);
		    $this->db->where('existingvisit.last_updated_date <=', $End_Date);
			
			 $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=existingvisit.RO_ID');
			 $this->db->where_in('CM_ID',$id);
			  $this->db->where('ROLE',13);
				$this->db->order_by("existingvisit.id","desc");
				$query = $this->db->get();
				$response=$query->row();
				//$executedQuery = $this->db->last_query();
				//print_r($executedQuery);
				// exit;
				return $response->count;
           
      } 
	  
	  
	   public function get_all_cl_bm($Relationship,$id)
		{

		 $this->db->select('count(*)as count');
       $this->db->from('dsavisit');
       if(!empty($Relationship))
       {
        $this->db->where_in('dsavisit.RO_ID',$Relationship);
        
       } 
	   //$this->db->where_in('BM_ID',$id);
       $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID');
			 $this->db->where_in('CM_ID',$id);
			  $this->db->where('ROLE',13);
	    $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
	   
       return $response->count;
			
		   }
		   
		   
		   	 public function get_all_cl_ro($Relationship,$BM)
		{

		 $this->db->select('count(*)as count');
       $this->db->from('dsavisit');
       if(!empty($Relationship))
       {
        $this->db->where_in('dsavisit.RO_ID',$Relationship);
        
       } 
	   //$this->db->where_in('BM_ID',$id);
       $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID');
			 $this->db->where_in('BM_ID',$BM);
			  $this->db->where('ROLE',14);
	    $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
	   
       return $response->count;
			
		   }
		   
		   
		   
		   public function get_all_cl_bm_filter1($Relationship,$id,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('dsavisit');
		//	print_r($Relationship);
		//	exit;
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('dsavisit.RO_ID',$Relationship);
				  
				}
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('dsavisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date <=', $End_Date);
				
			  }
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID');
			 $this->db->where_in('CM_ID',$id);
			  $this->db->where('ROLE',13);
				$this->db->order_by("dsavisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				//$executedQuery = $this->db->last_query();
				 //print_r($executedQuery);
				//exit;
				
				return $response->count; 

    
      } 
	  
	   public function get_all_cl_ro_filter1($Relationship,$BM,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('dsavisit');
		//	print_r($Relationship);
		//	exit;
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('dsavisit.RO_ID',$Relationship);
				  
				}
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('dsavisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date <=', $End_Date);
				
			  }
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID');
			 $this->db->where_in('BM_ID',$BM);
			  $this->db->where('ROLE',14);
				$this->db->order_by("dsavisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				//$executedQuery = $this->db->last_query();
				 //print_r($executedQuery);
				//exit;
				
				return $response->count; 

    
      } 
	  
	  
	   public function get_all_cl_bm_filter_with_page1($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
              $this->db->select('*');
             $this->db->from('dsavisit');
		
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('dsavisit.RO_ID',$Relationship);
				 
				}
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date <=', $End_Date);
				
			  }
			  
			 
      
            
			  $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID');
			 $this->db->where_in('CM_ID',$id);
			  $this->db->where('ROLE',13);
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("dsavisit.id","asec");
              $query = $this->db->get()->result();
			//   $executedQuery = $this->db->last_query();
           //  print_r($executedQuery);
           //  exit;
              return $query;           
		}  
		
		
		 public function get_all_cl_ro_filter_with_page1($Relationship,$BM,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
              $this->db->select('*');
             $this->db->from('dsavisit');
		
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('dsavisit.RO_ID',$Relationship);
				 
				}
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('dsavisit.last_updated_date <=', $End_Date);
				
			  }
			
			  $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID');
			 $this->db->where_in('BM_ID',$BM);
			  $this->db->where('ROLE',14);
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("dsavisit.id","asec");
              $query = $this->db->get()->result();
			 //  $executedQuery = $this->db->last_query();
             //print_r($executedQuery);
            // exit;
            return $query;           
		}  
		
	//-------------------------added by pooja 16-01-23----------------------//
		
		 public function get_all_cl_bm_ntb($Relationship,$id)
		{
		 $this->db->select('count(*)as count');
       $this->db->from('ntbvisit');
       if(!empty($Relationship))
       {
        $this->db->where_in('ntbvisit.RO_ID',$Relationship);
        
       } 
	   //$this->db->where_in('BM_ID',$id);
       $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=ntbvisit.RO_ID');
			 $this->db->where_in('CM_ID',$id);
			  $this->db->where('ROLE',13);
	    $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
       return $response->count;
			
		   }
		
		 public function get_all_cl_ro_ntb($Relationship,$BM)
		{
		 $this->db->select('count(*)as count');
       $this->db->from('ntbvisit');
       if(!empty($Relationship))
       {
        $this->db->where_in('ntbvisit.RO_ID',$Relationship);
        
       } 
	   //$this->db->where_in('BM_ID',$id);
       $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=ntbvisit.RO_ID');
			 $this->db->where_in('BM_ID',$BM);
			  $this->db->where('ROLE',14);
	    $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
       return $response->count;
			
		   }
		
		
			public function get_all_cl_bm_filter_ntb($Relationship,$id,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('ntbvisit');
		//	print_r($Relationship);
		//	exit;
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('ntbvisit.RO_ID',$Relationship);
				  
				}
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('ntbvisit.last_updated_date <=', $End_Date);
				
			  }
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=ntbvisit.RO_ID');
			 $this->db->where_in('CM_ID',$id);
			  $this->db->where('ROLE',13);
				$this->db->order_by("ntbvisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				//$executedQuery = $this->db->last_query();
				 //print_r($executedQuery);
				//exit;
				return $response->count; 

    
      } 
		
		
		public function get_all_cl_ro_filter_ntb($Relationship,$BM,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('ntbvisit');
		//	print_r($Relationship);
		//	exit;
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('ntbvisit.RO_ID',$Relationship);
				  
				}
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('ntbvisit.last_updated_date <=', $End_Date);
				
			  }
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=ntbvisit.RO_ID');
			 $this->db->where_in('BM_ID',$BM);
			  $this->db->where('ROLE',14);
				$this->db->order_by("ntbvisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				//$executedQuery = $this->db->last_query();
				 //print_r($executedQuery);
				//exit;
				return $response->count; 

    
      } 
	
		 public function get_all_cl_bm_filter_with_page_ntb($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
              $this->db->select('*');
             $this->db->from('ntbvisit');
		
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('ntbvisit.RO_ID',$Relationship);
				 
				}
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('ntbvisit.last_updated_date <=', $End_Date);
				
			  }
			  
			
			  $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=ntbvisit.RO_ID');
			 $this->db->where_in('CM_ID',$id);
			  $this->db->where('ROLE',13);
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("ntbvisit.id","asec");
              $query = $this->db->get()->result();
              return $query;           
		}  
		
		
		public function get_all_cl_ro_filter_with_page_ntb($Relationship,$BM,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
              $this->db->select('*');
             $this->db->from('ntbvisit');
		
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('ntbvisit.RO_ID',$Relationship);
				 
				}
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('ntbvisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('ntbvisit.last_updated_date <=', $End_Date);
				
			  }
			  

			  $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=ntbvisit.RO_ID');
			 $this->db->where_in('BM_ID',$BM);
			  $this->db->where('ROLE',14);
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("ntbvisit.id","asec");
              $query = $this->db->get()->result();
              return $query;           
		}  
		
		
		
	 public function get_all_cl_bm_existing($Relationship,$id)
		{
		 $this->db->select('count(*)as count');
       $this->db->from('existingvisit');
       if(!empty($Relationship))
       {
        $this->db->where_in('existingvisit.RO_ID',$Relationship);
        
       } 
	   //$this->db->where_in('BM_ID',$id);
      $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=existingvisit.RO_ID');
			 $this->db->where_in('CM_ID',$id);
			  $this->db->where('ROLE',13);
	    $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
       return $response->count;
			
		   }
	
	
	 public function get_all_cl_ro_existing($Relationship,$BM)
		{
		 $this->db->select('count(*)as count');
       $this->db->from('existingvisit');
       if(!empty($Relationship))
       {
        $this->db->where_in('existingvisit.RO_ID',$Relationship);
        
       } 
	   //$this->db->where_in('BM_ID',$id);
      $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=existingvisit.RO_ID');
			 $this->db->where_in('BM_ID',$BM);
			  $this->db->where('ROLE',14);
	    $query = $this->db->get();
       $response=$query->row();
       //echo $response->count;
       //exit;
       return $response->count;
			
		   }
	
	public function get_all_cl_bm_filter_existing($Relationship,$id,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('existingvisit');
		//	print_r($Relationship);
		//	exit;
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('existingvisit.RO_ID',$Relationship);
				  
				}
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('existingvisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('existingvisit.last_updated_date <=', $End_Date);
				
			  }
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=existingvisit.RO_ID');
			 $this->db->where_in('CM_ID',$id);
			  $this->db->where('ROLE',13);
				$this->db->order_by("existingvisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				//$executedQuery = $this->db->last_query();
				 //print_r($executedQuery);
				//exit;
				return $response->count; 

    
      } 
	  
	
	
	public function get_all_cl_ro_filter_existing($Relationship,$BM,$searchValue,$Start_Date,$End_Date)
			{
            $this->db->select('count(*) as count');
            $this->db->from('existingvisit');
		//	print_r($Relationship);
		//	exit;
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('existingvisit.RO_ID',$Relationship);
				  
				}
            if($searchValue!= '')
            {
			$where = "dsa_connector_name like '%".$searchValue."%'";
            
            $this->db->where($where);
            }
			   if($Start_Date!='' )
			  {
				 
				  $this->db->where('existingvisit.last_updated_date >=', $Start_Date);
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('existingvisit.last_updated_date <=', $End_Date);
				
			  }
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=existingvisit.RO_ID');
			 $this->db->where_in('BM_ID',$BM);
			  $this->db->where('ROLE',14);
				$this->db->order_by("existingvisit.id","asec");
				$query = $this->db->get();
				$response=$query->row();
				//$executedQuery = $this->db->last_query();
				 //print_r($executedQuery);
				//exit;
				return $response->count; 

    
      } 
	  
	  
	   public function get_all_cl_bm_filter_with_page_existing($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
              $this->db->select('*');
             $this->db->from('existingvisit');
		
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('existingvisit.RO_ID',$Relationship);
				 
				}
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('existingvisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('existingvisit.last_updated_date <=', $End_Date);
				
			  }
			  
			 
      
             /*$executedQuery = $this->db->last_query();
             print_r($executedQuery);
             exit;*/
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=existingvisit.RO_ID');
			 $this->db->where_in('CM_ID',$id);
			  $this->db->where('ROLE',13);
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("existingvisit.id","asec");
              $query = $this->db->get()->result();
              return $query;           
		}  
	  
	  
	  
		 public function get_all_cl_ro_filter_with_page_existing($Relationship,$BM,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$Start_Date,$End_Date)
			{
              $this->db->select('*');
             $this->db->from('existingvisit');
		
			 if(!empty($Relationship))
				{
					//echo "hi";
				  $this->db->where_in('existingvisit.RO_ID',$Relationship);
				 
				}
             if($searchValue!= '')
             {
             $where = "dsa_connector_name like '%".$searchValue."%'";
            
             $this->db->where($where);
			
             }
			 	 if($Start_Date!='' )
			  {
				   $this->db->where('existingvisit.last_updated_date >=', $Start_Date);
				
				  
				
			  }
			  if($End_Date!='' )
			  {
				   $this->db->where('existingvisit.last_updated_date <=', $End_Date);
				
			  }
			  
			 
      
             /*$executedQuery = $this->db->last_query();
             print_r($executedQuery);
             exit;*/
			   $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE=existingvisit.RO_ID');
			 $this->db->where_in('BM_ID',$BM);
			  $this->db->where('ROLE',14);
             $this->db->limit($rowperpage,$row);
              $this->db->order_by("existingvisit.id","asec");
              $query = $this->db->get()->result();
              return $query;           
		}  
		
		
		
		
		public function get_all_BM_Branch_ALL($Relationship,$id)
		{
	
			 $this->db->select('count(*)as count');
			 $this->db->from('USER_DETAILS');
			 if(!empty($Relationship))
			 {
			 $this->db->where_in('CM_ID',$Relationship);
			 $this->db->where('ROLE',13);
			 }
		   
			 $this->db->or_where_in('CM_ID',$id);
			 $this->db->where('ROLE',13);
			 //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
			 $query = $this->db->get();
			 $response=$query->row();
			 //echo $response->count;
			 //exit;
			 return $response->count;
		}


		function get_all_BM_Branch_filter_cl_all($Relationship,$id,$searchValue)
		{
     
			$this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=14 OR LN like '%".$searchValue."%' AND ROLE=14 ";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($Relationship))
           {
           $this->db->where_in('CM_ID',$Relationship);
           $this->db->where('ROLE',13);
           }
           
           $this->db->or_where_in('CM_ID',$id);
           $this->db->where('ROLE',13);
           //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 

		} 
	
	
	function get_all_BM_Branch_filter_with_page_all($Relationship,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
  {
  
    if(!empty($Relationship))
    {
       $this->db->where_in('CM_ID',$Relationship);
       $this->db->where('ROLE',13);
       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       
       $this->db->where_in('CM_ID',$Relationship);
       $this->db->where('ROLE',13);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
     
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',13);
       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',13);
     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
     $this->db->from('USER_DETAILS');
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   }
 

//-------------added by pooja 17-01-2023----------------------------//
		public function get_all_RO_Branch_ALL($RO,$Relationship)
		{
			//print_r($RO);
			//exit;
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if(!empty($RO))
     {
     $this->db->where_in('BM_ID',$RO);
     $this->db->where('ROLE',14);
     }
   
     $this->db->or_where_in('BM_ID',$Relationship);
     $this->db->where('ROLE',14);
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
  /*$executedQuery = $this->db->last_query();
             print_r($executedQuery);
             exit;*/
    return $response->count;
	}


function get_all_RO_Branch_filter_cl_all($RO,$Relationship,$searchValue)
  {
     
	$this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=14 OR LN like '%".$searchValue."%' AND ROLE=14 ";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($RO))
           {
           $this->db->where_in('BM_ID',$RO);
           $this->db->where('ROLE',14);
           }
           
           $this->db->or_where_in('BM_ID',$Relationship);
           $this->db->where('ROLE',14);
           //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 


 
  } 
	
	
	function get_all_RO_Branch_filter_with_page_all($RO,$Relationship,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
  {
  
    if(!empty($RO))
    {
       $this->db->where_in('BM_ID',$RO);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       
       $this->db->where_in('BM_ID',$RO);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
      }
     
       $this->db->or_where_in('BM_ID',$Relationship);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('BM_ID',$Relationship);
     $this->db->where('ROLE',14);
     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
     $this->db->from('USER_DETAILS');
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   }
 

	
	
	  public function meeting_type_cl($RO,$Relationship,$Start_Date,$End_Date)
	  {
	
		  
				$countarr = array();
				foreach($RO as $Relationship)
				{
				 $SelectQuery = "SELECT count(*) as counter FROM finserv_test.dsavisit WHERE dsavisit.RO_ID = '".$Relationship."'
				AND `dsavisit`.`last_updated_date` >= '".$Start_Date."'
				AND `dsavisit`.`last_updated_date` <= '".$End_Date."'
				AND `meeting_type` = 'New'
				";
				//echo "<BR>";

				$result = $this->db->query($SelectQuery);

				$row = $result->result();



				$countarr[$Relationship] = $row[0]->counter;

				//print_r($row);

								}
								
							//	print_r($countarr);
								
								return $countarr;
						  
	

	  }
	
	 public function meeting_type1_cl($RO,$Relationship,$Start_Date,$End_Date)
	  {
		  
	$countarr = array();
				foreach($RO as $Relationship)
				{
				 $SelectQuery = "SELECT count(*) as counter FROM finserv_test.dsavisit WHERE dsavisit.RO_ID = '".$Relationship."'
				AND `dsavisit`.`last_updated_date` >= '".$Start_Date."'
				AND `dsavisit`.`last_updated_date` <= '".$End_Date."'
				AND `meeting_type` = 'Existing'
				";
				//echo "<BR>";

				$result = $this->db->query($SelectQuery);

				$row = $result->result();



				$countarr[$Relationship] = $row[0]->counter;

				//print_r($row);

								}
								
								//print_r($countarr);
								
								return $countarr;
	  }

	  
	
	 public function customer_exit_bm($Relationship,$id,$Start_Date,$End_Date)
	  {
		  $countarr = array();
				foreach($Relationship as $id)
				{
				 $SelectQuery = "SELECT count(*) as counter FROM finserv_test.existingvisit WHERE existingvisit.RO_ID = '".$id."'
				AND `existingvisit`.`last_updated_date` >= '".$Start_Date."'
				AND `existingvisit`.`last_updated_date` <= '".$End_Date."'
				
				";
				//echo "<BR>";

				$result = $this->db->query($SelectQuery);

				$row = $result->result();



				$countarr[$id] = $row[0]->counter;

				//print_r($row);

								}
								
								//print_r($countarr);
								
								return $countarr;
		  
		
	

	  }
	
	 public function customer_ntb_bm($Relationship,$id,$Start_Date,$End_Date)
	  {
		  
		$countarr = array();
				foreach($Relationship as $id)
				{
				 $SelectQuery = "SELECT count(*) as counter FROM finserv_test.ntbvisit WHERE ntbvisit.RO_ID = '".$id."'
				AND `ntbvisit`.`last_updated_date` >= '".$Start_Date."'
				AND `ntbvisit`.`last_updated_date` <= '".$End_Date."'
				
				";
				//echo "<BR>";

				$result = $this->db->query($SelectQuery);

				$row = $result->result();



				$countarr[$id] = $row[0]->counter;

				//print_r($row);

								}
								
								//print_r($countarr);
								
								return $countarr;
	

	  }
	
	 public function customer_exit_cl($RO,$Relationship,$Start_Date,$End_Date)
	  {
		  
		  
		  $countarr = array();
				foreach($RO as $Relationship)
				{
				 $SelectQuery = "SELECT count(*) as counter FROM finserv_test.existingvisit WHERE existingvisit.RO_ID = '".$Relationship."'
				AND `existingvisit`.`last_updated_date` >= '".$Start_Date."'
				AND `existingvisit`.`last_updated_date` <= '".$End_Date."'
				
				";
				//echo "<BR>";

				$result = $this->db->query($SelectQuery);

				$row = $result->result();



				$countarr[$Relationship] = $row[0]->counter;

				//print_r($row);

								}
								
								//print_r($countarr);
								
								return $countarr;
		  
	  }
	
	 public function customer_ntb_cl($RO,$Relationship,$Start_Date,$End_Date)
	  {
		  
		  $countarr = array();
				foreach($RO as $Relationship)
				{
				 $SelectQuery = "SELECT count(*) as counter FROM finserv_test.ntbvisit WHERE ntbvisit.RO_ID = '".$Relationship."'
				AND `ntbvisit`.`last_updated_date` >= '".$Start_Date."'
				AND `ntbvisit`.`last_updated_date` <= '".$End_Date."'
				
				";
				//echo "<BR>";

				$result = $this->db->query($SelectQuery);

				$row = $result->result();



				$countarr[$Relationship] = $row[0]->counter;

				//print_r($row);

								}
								
								//print_r($countarr);
								
								return $countarr;

	  }


	public function get_branch_lead_bm($lead)
	 {
	       $this->db->select('*');
            $this->db->from('USER_DETAILS');
			$this->db->where('ROLE',13);
            $this->db->where("Employee_Branch", $lead);	
          $query = $this->db->get();
		 $response=$query->result();	
	 return $response;
	
  }

	
//----------------------------------added by pooja 18-01-23-------------------------------//	
	
      public function meeting_type_branch_bm_($id,$Start_Date,$End_Date,$branch)
	  {
	
			 $SelectQuery = "SELECT count(*) as counter FROM finserv_test.dsavisit INNER JOIN USER_DETAILS ON USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID 
				 where dsavisit.RO_ID = '".$id."'
				AND `dsavisit`.`last_updated_date` >= '".$Start_Date."'
				AND `dsavisit`.`last_updated_date` <= '".$End_Date."'
				AND `meeting_type` = 'New'
				AND `Employee_Branch` = '".$branch."'
				";
				//echo "<BR>";

				$result = $this->db->query($SelectQuery);

				$row = $result->result();

			      return $row[0]->counter;
				
			
	  }
	   public function meeting_type_branch_ro_($id,$Start_Date,$End_Date,$branch)
	  {
	
				 $SelectQuery = "SELECT count(*) as counter FROM finserv_test.dsavisit INNER JOIN USER_DETAILS ON USER_DETAILS.UNIQUE_CODE=dsavisit.RO_ID
				 where  dsavisit.RO_ID = '".$id."'
				
				AND `dsavisit`.`last_updated_date` >= '".$Start_Date."'
				AND `dsavisit`.`last_updated_date` <= '".$End_Date."'
				AND `meeting_type` = 'Existing'
				AND `Employee_Branch` = '".$branch."'
				";
				//echo "<BR>";

				$result = $this->db->query($SelectQuery);

				$row = $result->result();

				return $row[0]->counter;
		
	  }
	  public function customer_exit_bm_cl_($id,$Start_Date,$End_Date,$branch)
	  {
		  
				 $SelectQuery = "SELECT count(*) as counter FROM finserv_test.existingvisit INNER JOIN USER_DETAILS ON USER_DETAILS.UNIQUE_CODE=existingvisit.RO_ID
				 WHERE existingvisit.RO_ID = '".$id."'
				AND `existingvisit`.`last_updated_date` >= '".$Start_Date."'
				AND `existingvisit`.`last_updated_date` <= '".$End_Date."'
					AND `Employee_Branch` = '".$branch."'
				";
				//echo "<BR>";

				$result = $this->db->query($SelectQuery);

				$row = $result->result();

			      return $row[0]->counter;
	  }
	  public function customer_ntb_bm_cl_($id,$Start_Date,$End_Date,$branch)
	  {

				 $SelectQuery = "SELECT count(*) as counter FROM finserv_test.ntbvisit  INNER JOIN USER_DETAILS ON USER_DETAILS.UNIQUE_CODE=ntbvisit.RO_ID
				 WHERE ntbvisit.RO_ID = '".$id."'
				AND `ntbvisit`.`last_updated_date` >= '".$Start_Date."'
				AND `ntbvisit`.`last_updated_date` <= '".$End_Date."'
				AND `Employee_Branch` = '".$branch."'
				";
				//echo "<BR>";

				$result = $this->db->query($SelectQuery);

				$row = $result->result();
				return $row[0]->counter;
					
	  }
	  

	
}?>
	
	
	