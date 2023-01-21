<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Legal_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
	function getDashboardData($id){
        $query = $this->db->query("SELECT count(*) as count FROM Legal_details where Legal_id='$id'" ); 
		$cust_count = $query->row();
		$response['cust_count'] = $cust_count->count;
		
		return  $response;
    }
	function getProfileData($id)
	{
		
		$this->db->select('*,CUSTOMER_APPLIED_LOANS.Application_id');
		$where = '(ROLE=1 AND Application_Id="'.$id.'")';
		$this->db->where($where);
		$q=$this->db->from('USER_DETAILS');
		$this->db->join('CUSTOMER_MORE_DETAILS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_MORE_DETAILS.CUST_ID');
        $this->db->join('CUSTOMER_APPLIED_LOANS', 'USER_DETAILS.UNIQUE_CODE = CUSTOMER_APPLIED_LOANS.CUST_ID');
		
		$this->db->order_by("USER_DETAILS.ID", "desc");
		$response = $q->get()->row();
		
		return $response;
	}
	function getLegals()
	{
		 $this->db->select('*');
        $this->db->from('USER_DETAILS');
		$this->db->where('ROLE', 18);    
        $this->db->order_by("ID", "desc");      
        $query = $this->db->get();
        $response = $query->result();
        return $response;
    
	}
	
	/*-------------------------------- Added by papiha on 23_03_2022----------------------------------- */
	
	function get_legal_by_bank($bank_id)
	{
		$this->db->select('*');
        $this->db->from('USER_DETAILS');
		$this->db->where('ROLE', 18);    
		$this->db->where('Legal_bank', $bank_id); 
        $this->db->order_by("ID", "desc");      
        $query = $this->db->get();
        $response = $query->result();
		  $executedQuery = $this->db->last_query();
  
        return $response;
	  
	}
	function corporate_data($bank_id)
	{
		$this->db->select('*');
        $this->db->from('cooperator');
		$this->db->where('id', $bank_id);    
		
             
        $query = $this->db->get();
       $row= $query->row();
  
        return $row;
	}
	/*---------------------------------- Addded by papiha on 28-07-2022----------------------------------------------------*/
	function get_FI_by_bank($bank_id)
	{
		$this->db->select('*');
        $this->db->from('USER_DETAILS');
		$this->db->where('ROLE', 24);    
		$this->db->where('Legal_bank', $bank_id); 
        $this->db->order_by("ID", "desc");      
        $query = $this->db->get();
        $response = $query->result();
		  $executedQuery = $this->db->last_query();
  
        return $response;
	  
	}
	/*---------------------------added by papiha on 01_08_2022----------------------------------------*/
	function get_fi_docs($id)
	{
		$this->db->select('*');
        $this->db->from('fi_details');
		$this->db->where('application_number', $id);
        $query = $this->db->get()->row();
         return $query;
	  
	}
	/*--------------------------- Added by papiha on 01_08_2022--------------------------------------------------*/
	function getDashboardData_FI($id){
        $query = $this->db->query("SELECT count(*) as count FROM fi_details where fi_id='$id'" ); 
        $cust_count = $query->row();
        $response['cust_count'] = $cust_count->count;
		$query = $this->db->query("SELECT count(*) as count FROM RCU_details where RCU_id='$id'" ); 
        $cust_count = $query->row();
        $response['RCU_cust_count'] = $cust_count->count;
		
        return  $response;
    }
/*--------------------------------Addded by papiha on 08_08_2022-------------------------------*/
function get_RCU_docs($id)
{
	$this->db->select('*');
	$this->db->from('RCU_details');
	$this->db->where('application_number', $id);
	$query = $this->db->get()->row();
	 return $query;
  
}
function getDashboardData_RCU($id){
	$query = $this->db->query("SELECT count(*) as count FROM RCU_details where RCU_id='$id'" ); 
	$cust_count = $query->row();
	$response['cust_count'] = $cust_count->count;
	
	return  $response;
}
function get_RCU_by_bank($bank_id)
{
	$this->db->select('*');
	$this->db->from('USER_DETAILS');
	$where = '(ROLE=24 OR ROLE=25)';
	$this->db->where($where);    
	$this->db->where('Legal_bank', $bank_id); 
	$this->db->order_by("ID", "desc");      
	$query = $this->db->get();
	$response = $query->result();
	$executedQuery = $this->db->last_query();
	
	 
	return $response;
  
}
/*---------------------------------------- addded by papiha on 08_08_2022 for Legal flow ----------------------------------------------*/
function get_legal_docs($id)
{
	$this->db->select('*');
	$this->db->from('Legal_details');
	$this->db->where('application_number', $id);
	$query = $this->db->get()->row();
	 return $query;
  
}
/*--------------------------------Addded by papiha on 11_08_2022 for Technical Flow-------------------------------*/
function get_Technical_docs($id)
{
	$this->db->select('*');
	$this->db->from('Technical_details');
	$this->db->where('application_number', $id);
	$query = $this->db->get()->row();
	 return $query;
  
}
function getDashboardData_Technical($id){
	$query = $this->db->query("SELECT count(*) as count FROM Technical_details where Technical_id='$id'" ); 
	$cust_count = $query->row();
	$response['cust_count'] = $cust_count->count;
	
	return  $response;
}
function get_Technical_by_bank($bank_id)
{
	$this->db->select('*');
	$this->db->from('USER_DETAILS');
	$this->db->where('ROLE', 19);    
	$this->db->where('Legal_bank', $bank_id); 
	$this->db->order_by("ID", "desc");      
	$query = $this->db->get();
	$response = $query->result();
	  $executedQuery = $this->db->last_query();

	return $response;
  
}
}
?>