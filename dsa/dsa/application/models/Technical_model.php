<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Technical_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
    function getDashboardData($id){
        $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 1 AND Technical_id='$id'" ); 
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
		//$executedQuery = $this->db->last_query();
  
        return $response;
	  
	}
}
?>