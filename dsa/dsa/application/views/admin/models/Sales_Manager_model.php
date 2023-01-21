<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_Manager_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

    /*function getSalesManager($id)
    {
       
	   
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 21); 
            $this->db->where('CM_ID', $id); 			
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
	}*/
    function getSalesManager($id)
    {
       if($q == 'all'){
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 21);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
       }
       else if($q == 'Complete')
       {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 21);
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
    function getRelationOfficer($q,$id)
    {
      if($q == 'all')
      {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('CM_ID',$id); 
        $this->db->where('ROLE', 14);          
        $this->db->order_by("ID", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
      }  
	}	  
	function getDsa($q, $bank ,$city,$id)
	{

	  if($q == 'all')
	  {
		$this->db->select('*');
		$this->db->from('USER_DETAILS');
		$this->db->where('ROLE', 2); 
		$where = "CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";
		$this->db->where($where);
			
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
		 $where = "CM_ID='".$id."' OR Refer_By='".$id."'AND t1.ROLE=2 AND t2.BANK_NAME='".$bank."'";
		 $this->db->where($where);
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
		$where = "CM_ID='".$id."' OR Refer_By='".$id."'AND ROLE=2 AND Profile_Status='Complete'";
		$this->db->where($where);
		 
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
		$where = "CM_ID='".$id."' OR Refer_By='".$id."'AND ROLE=2 AND Profile_Status=".NULL;
		$this->db->where($where);
		  
		$query = $this->db->get();
		$response = $query->result();
		return $response;
	  }
  
  
  

  
    }
    function getConnector($q,$id)
	{
	   if($q == 'all'){
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$this->db->where('ROLE', 4);     
			$where = "CM_ID='".$id."' OR Refer_By='".$id."'AND ROLE=4";
            $this->db->where($where); 			
			$this->db->order_by("ID", "desc");
			$query = $this->db->get();
			$response = $query->result();
			return $response;
	   }
	   
		
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
      $str = $this->db->last_query();
      //print_r($str);
      //exit;
      return $response;
    }
	
     
	   
  
}
?>