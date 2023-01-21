<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managers_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();        
    }

    function getDashboardData($id){
      $response = [];
      $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 1 AND MANAGER_ID = '".$id."'"); 
      $cust_count = $query->row();
      $response['cust_count'] = $cust_count->count;

      $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 7 AND MANAGER_ID = '".$id."'"); 
      $manager_count = $query->row();
      $response['manager_count'] = $manager_count->count;

      $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 6 AND MANAGER_ID = '".$id."'"); 
      $csr_count = $query->row();
      $response['csr_count'] = $csr_count->count;

      $query = $this->db->query("SELECT count(*) as count FROM CUSTOMER_APPLIED_LOANS WHERE CUST_ID  IN(select UNIQUE_CODE from USER_DETAILS where MANAGER_ID = '".$id."')"); 
      $applied_loan_count = $query->row();
      $response['applied_loan_count'] = $applied_loan_count->count;

      $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where PROFILE_PERCENTAGE < 100 and ROLE = 1  AND MANAGER_ID = '".$id."'"); 
      $pending_profile_count = $query->row();
      $response['pending_profile_count'] = $pending_profile_count->count;

      return $response;
  }
}
?>