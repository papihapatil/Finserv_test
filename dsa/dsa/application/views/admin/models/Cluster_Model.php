<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cluster_Model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
	function getBranchManagers($id)
    {
       
	   
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 13); 
            $this->db->where('CM_ID', $id); 			
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
	}
	    function getClusterDashboardData($id)
    {
        

            $response = [];
            $this->db->select('*');
            $this->db->where("ROLE", 1);   
            $this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->where("USER_DETAILS.credit_sanction_status",null); 
            $response['in_progress'] = $this->db->get()->result();

            $this->db->select('*');
            $this->db->where("ROLE", 1);   
            $this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_MORE_DETAILS','CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->where("USER_DETAILS.credit_sanction_status",'CONTINUE'); 
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


             $this->db->select('*');
		        $this->db->from('USER_DETAILS');
		        $this->db->where('CM_ID',$id); 
		        $this->db->where('ROLE', 14);          
		        $this->db->order_by("ID", "desc");
		    
		        $response['MY_RO'] = $this->db->get()->result();

		         $this->db->select('*');
		        $this->db->from('USER_DETAILS');
		        $this->db->where('CM_ID',$id); 
		        $this->db->where('ROLE', 2);          
		        $this->db->order_by("ID", "desc");
		      
		        $response['MY_DSA'] = $this->db->get()->result();

		         $this->db->select('*');
		        $this->db->from('USER_DETAILS');
		        $this->db->where('CM_ID',$id); 
		        $this->db->where('ROLE', 4);          
		        $this->db->order_by("ID", "desc");
		    
		        $response['MY_CONNECTOR'] = $this->db->get()->result();

		         $this->db->select('*');
		        $this->db->from('USER_DETAILS');
		        $this->db->where('CM_ID',$id); 
		        $this->db->where('ROLE', 13);          
		        $this->db->order_by("ID", "desc");
		     
		        $response['MY_BM'] = $this->db->get()->result();


		           $this->db->select('*');
		        $this->db->from('USER_DETAILS');
		        $this->db->where('CM_ID',$id); 
		        $this->db->where('ROLE', 1);          
		        $this->db->order_by("ID", "desc");
		     
		        $response['MY_Customers'] = $this->db->get()->result();


          
    
        return $response;





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
	   function getMyDsa($id)
	{
	  
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$this->db->where('ROLE', 2);     
			$where = "CM_ID='".$id."' OR Refer_By='".$id."'AND ROLE=4";
      $this->db->where($where); 			
			$this->db->order_by("ID", "desc");
			$query = $this->db->get();
			$response = $query->result();
			return $response;
	  
	   
		
	}
	function getBranchManger($User_id)
    {
     
   
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',13);   
	  $this->db->where('CM_ID',$User_id);
	  $this->db->order_by("ID", "desc");
	  $query = $this->db->get();
	  $response = $query->result();
	  
	  return $response;
    
    }
	function getRelationship_Officer($User_id)
    {
     
   
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',14);   
	  $this->db->where('CM_ID',$User_id);
	  $this->db->order_by("ID", "desc");
	  $query = $this->db->get();
	  $response = $query->result();
	  
	  return $response;
    
    }
	function getDsa_for_lead($User_id)
    {
     
   
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',2);   
	  $this->db->where('CM_ID',$User_id);
	  $this->db->order_by("ID", "desc");
	  $query = $this->db->get();
	  $response = $query->result();
	  
	  return $response;
    
    }
	function getConnector_for_lead($User_id)
    {
     
   
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',4);   
	  $this->db->where('CM_ID',$User_id);
	  $this->db->order_by("ID", "desc");
	  $query = $this->db->get();
	  $response = $query->result();
	  
	  return $response;
    
    }
	function getLead($CM_ID)
	{
		
        $response = array();
        $this->db->select('*');
		$where = "CM_ID='".$CM_ID."' OR Refer_By='".$CM_ID."'";
		$this->db->where($where);
        $q = $this->db->from('register');
        $this->db->order_by("id", "desc");
        $response = $q->get()->result();
    
        return $response;
  }
   /*---------------------------Added by papiha 12_01_2022-------------------------------------------------*/
  function get_RO_user_BM($User_id)
    {
      $user_type= $this->session->userdata("USER_TYPE");
   
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',14);  
      $this->db->where('BM_ID',$User_id); 
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    
    }
    function get_DSA_user_BM($User_id)
    {
      $user_type= $this->session->userdata("USER_TYPE");
   
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',2);  
      //$this->db->where('BM_ID',$User_id);
      $where = "BM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=2 ";	
	  $this->db->where($where);
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    
    }
	function get_DSA_user_RO($User_id)
    {
      $user_type= $this->session->userdata("USER_TYPE");
   
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',2);  
      $where = "RO_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=2 ";	
	  $this->db->where($where);
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    
    }
	function get_Connector_user_BM($User_id)
    {
      $user_type= $this->session->userdata("USER_TYPE");
   
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',4);  
      $where = "BM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=4 ";	
	  $this->db->where($where);
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    
    }
	function get_Connector_user_RO($User_id)
    {
      $user_type= $this->session->userdata("USER_TYPE");
   
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',4);  
      $where = "RO_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=4 ";	
	  $this->db->where($where);
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    
    }
	
	function get_Connector_user_DSA($User_id)
    {
      $user_type= $this->session->userdata("USER_TYPE");
   
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',4);  
      $where = "DSA_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=4 ";	
	  $this->db->where($where);
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    
    }
    function getCustomers($User_id)
    {
      $user_type= $this->session->userdata("USER_TYPE");
   
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE',1);  
      $where = "CM_ID='".$User_id."' OR Refer_By='".$User_id."' AND ROLE=1 ";	
	  $this->db->where($where);
      $this->db->order_by("ID", "desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    
    }
}
?>