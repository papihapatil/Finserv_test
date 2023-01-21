<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retailer_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
	
	
	public function saverequest($data)
	{
		
		
		
		//$this->db->set('createdate',now());
		//$this->db->set('modifydate',now());
		$this->db->insert('requests',$data);
		
		
		
		$executedQuery = $this->db->last_query();
    //print_r($executedQuery);
	
	//exit;
	}
	
	public function getprofiledata($userid)
	{
		$this->db->select('*');
            $this->db->from('supplychainuser');
            $this->db->where('userid', $userid);          
            
            $query = $this->db->get();
            $response = $query->row();
			
			return $response;
		
	}
	
	
	public function deleterequest($requestid)
	{
		//echo "TEST";
		$this->db->where('id', $requestid);
    $this->db->delete('requests');
		
	}
	
	public function saveprofile($data,$userid)
	{
		
		//echo $userid." TEST ";
		$this->db->select('*');
            $this->db->from('supplychainuser');
            $this->db->where('userid', $userid);          
            
            $query = $this->db->get();
            $response = $query->result();
			
			//print_r($response);
		
		if(count($response) > 0)
		{
			$this->db->where('userid', $userid);
			$this->db->update('supplychainuser',$data);
		}
		else{
		$this->db->insert('supplychainuser',$data);
		}
		//$this->db->set('createdate',now());
		//$this->db->set('modifydate',now());
		//$this->db->insert('supplychainuser',$data);
		
		//$executedQuery = $this->db->last_query();
    //print_r($executedQuery);
	}
	
	public function getretailer($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$q)
	{
		
		
		if($q == 'all'){
              $this->db->select('*');
              $this->db->from('USER_DETAILS');
              $this->db->where('ROLE',27);
              $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
              // $this->db->where("PROFILE_PERCENTAGE",'100');
            
              if($searchValue!= '')
              {
              $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=27";
              $this->db->where($where);
              }
			  
			  $this->db->limit($rowperpage,$row);
        $this->db->order_by("USER_DETAILS.ID", "desc");
              $query = $this->db->get();
              $response = $query->result();
             
                 return $response;
       }
       else if($q == 'Approved')
       {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE',27);
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("CUSTOMER_MORE_DETAILS.SCFSTATUSE",'Approved');
          if($searchValue!= '')
          {
          $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=27 AND CUSTOMER_MORE_DETAILS.STATUS='Approved'";
          $this->db->where($where);
          }
          $this->db->limit($rowperpage,$row);
          $this->db->order_by("USER_DETAILS.ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
		  
		 // echo $this->db->last_query();
		  
		 // exit;
             
          return $response;
      
         }	
        else if($q == 'pending')
        {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE',27);
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("CUSTOMER_MORE_DETAILS.SCFSTATUSE");
          if($searchValue!= '')
          {
          $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=27 AND CUSTOMER_MORE_DETAILS.STATUS='Created'";
          $this->db->where($where);
          }
          $this->db->limit($rowperpage,$row);
          $this->db->order_by("USER_DETAILS.ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
		  
		 // echo $this->db->last_query();
             
         return $response;
        }
         else         {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 27);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
        }
		
	}
	
	public function getretailercount($q)
	{
		
		
		if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 27);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			
			return $cust_count->counter;
       }
       else if($q == 'Approved')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 27);  
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Approved');
          $this->db->order_by("USER_DETAILS.ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
          //print_r($this->db->last_query());
		  
		  //exit;
			    return $cust_count->counter;
      
         }	
        else if($q == 'pending')
        {
        $this->db->select('count(*) as counter');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 27); 
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         // $this->db->where("Profile_Status",'');
         $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Created');
          $this->db->order_by("USER_DETAILS.ID", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $cust_count = $query->row();
          //print_r($this->db->last_query());
			     return $cust_count->counter;
        }
         else         {
            $this->db->select('count(*) as counter');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 27);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            //$response = $query->result();
            $cust_count = $query->row();
			
			//print_r($cust_count);
			
			return $cust_count->counter;
        }
		
	}
	
	
	public function updatepayment($data)
	{
		$this->db->select('count(*) as counter');
          $this->db->from('invoicepayment');
          $this->db->where('invoiceid', $data['invoiceid']);

			$query = $this->db->get();
          $cust_count = $query->row();
		  
		 $counter = $cust_count->counter;
		  
		  if($counter == 0)
		  {
			$this->db->insert('invoicepayment',$data);
		  }
		  else{
			  
			  $this->db->where('invoiceid', $data['invoiceid']);
		$this->db->update('invoicepayment',$data);
		  }
		  
		//  exit;
		
		
	}
	
	public function getretailercountfilter($searchValue,$q)
	{
		
		if($q == 'all'){
            /*$this->db->select('count(*) as counter');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 27);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			
			return $cust_count->counter;*/
          $this->db->select('count(*) as count');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE',27);
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          // $this->db->where("PROFILE_PERCENTAGE",'100');
         
          if($searchValue!= '')
          {
          $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=27";
          $this->db->where($where);
          }
          $query = $this->db->get();
          $response = $query->row();
          return $response->count;
       }
       else if($q == 'Approved')
       {
          /*$this->db->select('count(*) as counter');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 27);  
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("Profile_Status",'Complete');
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
         $cust_count = $query->row();
			
			return $cust_count->counter;*/
          $this->db->select('count(*) as count');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE',27);
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Approved');
          if($searchValue!= '')
          {
          $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=27 AND CUSTOMER_MORE_DETAILS.STATUS='Approved'";
          $this->db->where($where);
          }
          $query = $this->db->get();
          $response = $query->row();
          //print_r($this->db->last_query());
          return $response->count;
      
         }	
        else if($q == 'pending')
        {
          $this->db->select('count(*) as count');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE',27);
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Created');
          if($searchValue!= '')
          {
          $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=27 AND CUSTOMER_MORE_DETAILS.STATUS='Created'";
          $this->db->where($where);
          }
          $query = $this->db->get();
          $response = $query->row();
          return $response->count;
        }
         else         {
            $this->db->select('count(*) as counter');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 27);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            //$response = $query->result();
			
			//print_r($response);
			
            $cust_count = $query->row();
			
			return $cust_count->counter;
        }
		
	}
	
	
	/* Invoice code starts here */
	
	
	public function getinvoicecount($id)
	{
		$q = "all";
		if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('invoice');
           $this->db->where('retailerid', $id);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			//echo "test1";
			return $cust_count->counter;
       }
       else if($q == 'Complete')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('invoice');
         // $this->db->where('ROLE', 27);  
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("Profile_Status",'Complete');
		  
		  $this->db->where('retailerid', $id);

          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
			
			return $cust_count->counter;
      
         }	
        else if($q == 'Incomplete')
        {
        $this->db->select('count(*) as counter');
          $this->db->from('invoice');
         // $this->db->where('ROLE', 26); 
         // $this->db->where("Profile_Status",'');
          $this->db->where("Profile_Status",NULL); 
		  $this->db->where('retailerid', $id);
		  
          $this->db->order_by("ID", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $cust_count = $query->row();
			
			return $cust_count->counter;
        }
         else         {
            $this->db->select('count(*) as counter');
            $this->db->from('invoice');
            //$this->db->where('ROLE', 26);  
//echo "test2=".$id;
$this->db->where('retailerid', $id);			
            $this->db->order_by("ID", "desc");
			
            $query = $this->db->get();
            //$response = $query->result();
            $cust_count = $query->row();
			
			//print_r($cust_count);
			
			return $cust_count->counter;
        }
		
	}
	
	
	public function getinvoicefilter($id)
	{
		$q = "all";
		
	/*	if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('invoice');
            //$this->db->where('ROLE', 26);  

$this->db->where('retailerid', $id);			
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			
			return $cust_count->counter;
       }
       else if($q == 'Complete')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('invoice');
          //$this->db->where('ROLE', 26);  
          // $this->db->where("PROFILE_PERCENTAGE",'100');
		  $this->db->where('retailerid', $id);
          $this->db->where("Profile_Status",'Complete');
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
         $cust_count = $query->row();
			
			return $cust_count->counter;
      
         }	
        else if($q == 'Incomplete')
        {
        $this->db->select('count(*) as counter');
          $this->db->from('invoice');
          //$this->db->where('ROLE', 26); 
         // $this->db->where("Profile_Status",'');
		 $this->db->where('retailerid', $id);
          $this->db->where("Profile_Status",NULL); 
          $this->db->order_by("ID", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
$cust_count = $query->row();
			
			return $cust_count->counter;
        }
         else         {
            $this->db->select('count(*) as counter');
            $this->db->from('invoice');
            //$this->db->where('ROLE', 26);
$this->db->where('retailerid', $id);			
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            //$response = $query->result();
			
			//print_r($response);
			
            $cust_count = $query->row();
			
			return $cust_count->counter;
        }
		
		*/
		
	}
	
	
	public function getinvoice($id)
	{
		$q = "all";
		if($q == 'all'){
            $this->db->select('*');
            $this->db->from('invoice');
           // $this->db->where('ROLE', 26);
$this->db->where('retailerid', $id);		   
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
       }
       else if($q == 'Complete')
       {
          $this->db->select('*');
          $this->db->from('invoice');
		  
		  $this->db->where('retailerid', $id);
          //$this->db->where('ROLE', 26);  
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
          $this->db->from('invoice');
		  
		  $this->db->where('retailerid', $id);
          // $this->db->where('ROLE', 26); 
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
            $this->db->from('invoice');
			$this->db->where('retailerid', $id);
            //$this->db->where('ROLE', 26);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
        }
		
	}
	
	/* Invoice code ends here */
	
	
	public function getinvoicebyid($userid,$invoiceid)
	{
		$this->db->select('*');
            $this->db->from('invoice');
			$this->db->where('retailerid', $userid);
            $this->db->where('id', $invoiceid);          
            $this->db->order_by("id", "desc");
            $query = $this->db->get();
            $response = $query->row();
			
			// $this->db->last_query();
            return $response;
		
		
	}
	
	public function updateinvoice($data,$invoiceid)
	{
		
		$this->db->where('id', $invoiceid);
		$this->db->update('invoice',$data);
	}
	
	
	public function getrequestcount($id,$q)
	{
		
		
	  if($q=='')
      {
         $q = 'all';
      }
		/*if($q == 'all')
      {
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
            $this->db->where('retailerid', $id);
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			      return $cust_count->counter;
       }
       else if($q == 'Rejected')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);	
          //$this->db->where('status', 'Revert by Distributor');	
          $where = "(status like 'Reject by Distributor' OR status like 'Reject by SCFO' AND retailerid='".$id."')";
          $this->db->where($where);		
        		
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
          return $cust_count->counter;
      
        }	
       else if($q == 'Reverted')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          //$this->db->where('status', 'Revert by Distributor');	
          $where = "(status like 'Revert by Distributor' OR status like 'Revert by SCFO' AND retailerid='".$id."')";
          $this->db->where($where);				
          $this->db->where('retailerid', $id);			
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
          return $cust_count->counter;
      
        }	
        else if($q == 'Approved')
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          //$this->db->where('status', 'Approved by SCFO');			
          $this->db->where('retailerid', $id);	
          $where = "(status = 'Approved by Distributor' OR status = 'Approved by SCFO' AND retailerid='".$id."')";
          $this->db->where($where);		
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
		    	return $cust_count->counter;
        }
        else 
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
          return $cust_count->counter;
        }
		*/
		
		if($q == 'all')
      {
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
            $this->db->where('retailerid', $id);
            $this->db->order_by("ID", "desc");
              $this->db->where('retailerid', $id);
            $query = $this->db->get();
            $cust_count = $query->row();
			   return $cust_count->counter;
       }
       else if($q == 'Approved By Distributor')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);
          $this->db->where('status', 'Approved By Distributor');  
          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
			
			 return $cust_count->counter;
      
         }

			else if($q == 'SendBack By Distributor')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);
          $this->db->where('status', 'SendBack By Distributor');  
          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
			
			 return $cust_count->counter;
      
         }	
         else if($q == 'Reject By Distributor')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);
          $this->db->where('status', 'Reject By Distributor');  
          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
			
			 return $cust_count->counter;
      
         }	
        else if($q == 'SCFO Approved')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('retailerid', $id);
         $this->db->where('status', 'Approved By SCFO');  
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
        
         return $cust_count->counter;
        }
		
		else if($q == 'SendBack By SCFO')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('retailerid', $id);
         $this->db->where('status', 'SendBack By SCFO');  
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
        
         return $cust_count->counter;
        }
        else if($q == 'Reject By SCFO')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('retailerid', $id);
         $this->db->where("status",'Reject By SCFO');
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
        
         return $cust_count->counter;
        }
		else if($q == 'In Progress')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('retailerid', $id);
         $this->db->where("status",'Created');
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
        
         return $cust_count->counter;
		}
		
	}
	
	
	
	public function getrequestfilter($id,$q,$searchValue)
	{
		
		if($q=='')
      {
         $q = 'all';
      }
     /*
		if($q == 'all')
      {
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
            $this->db->where('retailerid', $id);
            if($searchValue!='')
            {
               $where = "request_no like '%".$searchValue."%'";
               $this->db->where($where);
            }
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
            //print_r($this->db->last_query());
			   return $cust_count->counter;
       }
       else if($q == 'Reverted')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);
          if($searchValue!='')
            {
               $where = "request_no like '%".$searchValue."%'";
               $this->db->where($where);
            }	
          //$this->db->where('status', 'Revert by Distributor');	
          $where = "(status like 'Revert by Distributor' OR status like 'Revert by SCFO' AND retailerid='".$id."')";
          $this->db->where($where);		
        		
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
          return $cust_count->counter;
      
        }	
        else if($q == 'Rejected')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          if($searchValue!='')
            {
               $where = "request_no like '%".$searchValue."%'";
               $this->db->where($where);
            }	
            $where = "(status like 'Reject by Distributor' OR status like 'Reject by SCFO' AND retailerid='".$id."')";
          $this->db->where($where);				
          $this->db->where('retailerid', $id);			
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
          return $cust_count->counter;
      
        }	
        else if($q == 'Approved')
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          if($searchValue!='')
            {
               $where = "request_no like '%".$searchValue."%'";
               $this->db->where($where);
            }				
          $this->db->where('retailerid', $id);	
          $where = "(status = 'Approved by Distributor' OR status = 'Approved by SCFO' AND retailerid='".$id."')";
          $this->db->where($where);		
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
		    	return $cust_count->counter;
        }
        else 
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          if($searchValue!='')
          {
             $where = "request_no like '%".$searchValue."%'";
             $this->db->where($where);
          }		
          $this->db->where('retailerid', $id);
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
          return $cust_count->counter;
        }
		
		*/
		
		if($q == 'all')
      {
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
            $this->db->where('retailerid', $id);
            if($searchValue!='')
            {
               $where = "request_no like '%".$searchValue."%'";
               $this->db->where($where);
            }
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
            //print_r($this->db->last_query());
			   return $cust_count->counter;
       }
       else if($q == 'approved by distributor')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);
          $this->db->where('status', 'Approved By Distributor');  
          if($searchValue!='')
          {
             $where = "request_no like '%".$searchValue."%'";
             $this->db->where($where);
          }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
			
			 return $cust_count->counter;
      
         }

		else if($q == 'SendBack By Distributor')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);
          $this->db->where('status', 'SendBack By Distributor');  
          if($searchValue!='')
          {
             $where = "request_no like '%".$searchValue."%'";
             $this->db->where($where);
          }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
			
			 return $cust_count->counter;
      
         }
		 
         else if($q == 'Reject By Distributor')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);
          $this->db->where('status', 'Reject By Distributor');  
          if($searchValue!='')
          {
             $where = "request_no like '%".$searchValue."%'";
             $this->db->where($where);
          }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
			
			 return $cust_count->counter;
      
         }	
       else if($q == 'SCFO Pendig for approval')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('status', 'Approved By Distributor');    
          $this->db->where('retailerid', $id);
          if($searchValue!='')
         {
            $where = "request_no like '%".$searchValue."%'";
            $this->db->where($where);
         }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
          //print_r($this->db->last_query());
			 return $cust_count->counter;
      
         }	
        else if($q == 'SCFO Approved')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('status', 'Approved By SCFO');  
         $this->db->where('retailerid', $id);
         if($searchValue!='')
         {
            $where = "request_no like '%".$searchValue."%'";
            $this->db->where($where);
         }
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
         //print_r($this->db->last_query());
         return $cust_count->counter;
        }
		
		else if($q == 'SendBack By SCFO')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('status', 'SendBack By SCFO');  
         $this->db->where('retailerid', $id);
         if($searchValue!='')
         {
            $where = "request_no like '%".$searchValue."%'";
            $this->db->where($where);
         }
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
         //print_r($this->db->last_query());
         return $cust_count->counter;
        }
        else if($q == 'Reject By SCFO')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('retailerid', $id);
         $this->db->where('status', 'Approve');  
         $this->db->where("scfo_status",'Reject By SCFO');
         if($searchValue!='')
         {
            $where = "request_no like '%".$searchValue."%'";
            $this->db->where($where);
         }
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
         //print_r($this->db->last_query());
         return $cust_count->counter;
        }
		else if($q == 'In Progress')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('retailerid', $id);
         $this->db->where('status', 'Created');  
         //$this->db->where("scfo_status",'Reject By SCFO');
         if($searchValue!='')
         {
            $where = "request_no like '%".$searchValue."%'";
            $this->db->where($where);
         }
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
         //print_r($this->db->last_query());
         return $cust_count->counter;
        }
		
	}
	
	
	public function getrequestfilterlist($id,$q,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
	{
		
		//echo "TEST";
		//exit;

		if($q=='')
      {
         $q = 'all';
      }
    /*
		if($q == 'all')
      {
            $this->db->select('*');
            $this->db->from('requests');
            $this->db->where('retailerid', $id);
            if($searchValue!='')
            {
               $where = "request_no like '%".$searchValue."%'";
               $this->db->where($where);
            }
            $this->db->order_by("ID", "desc");
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
               
            return $response;
			   //return $cust_count->counter;
       }
       else if($q == 'Rejected')
       {
          $this->db->select('*');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);
          if($searchValue!='')
            {
               $where = "request_no like '%".$searchValue."%'";
               $this->db->where($where);
            }	
          //$this->db->where('status', 'Revert by Distributor');	
          $where = "(status like 'Reject by Distributor' OR status like 'Reject by SCFO' AND retailerid='".$id."')";
          $this->db->where($where);		
        		
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage,$row);
          $query = $this->db->get();
          $response = $query->result();
         return $response;
      
        }	
        else if($q == 'Reverted')
        {
           $this->db->select('*');
           $this->db->from('requests');
           if($searchValue!='')
             {
                $where = "request_no like '%".$searchValue."%'";
                $this->db->where($where);
             }	
             $where = "(status like 'Revert by Distributor' OR status like 'Revert by SCFO' AND retailerid='".$id."')";
           $this->db->where($where);				
           $this->db->where('retailerid', $id);			
           $this->db->order_by("ID", "desc");
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
            return $response;
       
         }	
         else if($q == 'Approved')
        {
          $this->db->select('*');
          $this->db->from('requests');
          if($searchValue!='')
            {
               $where = "request_no like '%".$searchValue."%'";
               $this->db->where($where);
            }				
          $this->db->where('retailerid', $id);	
          $where = "(status = 'Approved by Distributor' OR status = 'Approved by SCFO' AND retailerid='".$id."')";
          $this->db->where($where);		
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage,$row);
          $query = $this->db->get();
          $response = $query->result();
          return $response;
        }
        else 
        {
          $this->db->select('*');
          $this->db->from('requests');
          if($searchValue!='')
          {
             $where = "request_no like '%".$searchValue."%'";
             $this->db->where($where);
          }		
          $this->db->where('retailerid', $id);
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage,$row);
          $query = $this->db->get();
          $response = $query->result();
          return $response;
        }
		
		*/
		
		//echo $q;
		
		if($q == 'all')
      {
            $this->db->select('*');
            $this->db->from('requests');
            $this->db->where('retailerid', $id);
            if($searchValue!='')
            {
               $where = "request_no like '%".$searchValue."%'";
               $this->db->where($where);
            }
            $this->db->order_by("ID", "desc");
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
			
			//echo $this->db->last_query();
               
            return $response;
			   //return $cust_count->counter;
       }
       else if($q == 'Approved By Distributor')
       {
          $this->db->select('*');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);
          $this->db->where('status', 'Approved By Distributor');  
          if($searchValue!='')
          {
             $where = "request_no like '%".$searchValue."%'";
             $this->db->where($where);
          }
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage,$row);
          $query = $this->db->get();
          $response = $query->result();
		  
		  
		  // $this->db->last_query();
         return $response;
         //print_r($this->db->last_query());
      
         }	
		 
		 else if($q == 'SendBack By Distributor')
       {
          $this->db->select('*');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);
          $this->db->where('status', 'SendBack By Distributor');  
          if($searchValue!='')
          {
             $where = "request_no like '%".$searchValue."%'";
             $this->db->where($where);
          }
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage,$row);
          $query = $this->db->get();
          $response = $query->result();
		  //echo $this->db->last_query();
         return $response;
         //print_r($this->db->last_query());
      
         }
		  else if($q == 'SendBack By SCFO')
       {
          $this->db->select('*');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);
          $this->db->where('status', 'SendBack By SCFO');  
          if($searchValue!='')
          {
             $where = "request_no like '%".$searchValue."%'";
             $this->db->where($where);
          }
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage,$row);
          $query = $this->db->get();
          $response = $query->result();
		  //echo $this->db->last_query();
         return $response;
         //print_r($this->db->last_query());
      
         }
         else if($q == 'Reject By Distributor')
       {
          $this->db->select('*');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);
          $this->db->where('status', 'Reject By Distributor');  
          if($searchValue!='')
          {
             $where = "request_no like '%".$searchValue."%'";
             $this->db->where($where);
          }
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage,$row);
          $query = $this->db->get();
          $response = $query->result();
		  echo $this->db->last_query();
          return $response;
         }	
       else if($q == 'SCFO Pendig for approval')
       {
          $this->db->select('*');
          $this->db->from('requests');
          $this->db->where('retailerid', $id);
          $this->db->where('status', 'Approved By Distributor');   
          if($searchValue!='')
            {
               $where = "request_no like '%".$searchValue."%'";
               $this->db->where($where);
            }
         
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage,$row);
          $query = $this->db->get();
		  //echo $this->db->last_query();
          $response = $query->result();
             
          return $response;
      
         }	
        else if($q == 'SCFO Approved')
        {
         $this->db->select('*');
         $this->db->from('requests');
         $this->db->where('retailerid', $id);
         $this->db->where('status', 'Approved By SCFO');  
         if($searchValue!='')
            {
               $where = "request_no like '%".$searchValue."%'";
               $this->db->where($where);
            }
            $this->db->order_by("ID", "desc");
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
			
			//echo $this->db->last_query();
               
            return $response;
        }
        else if($q == 'Reject By SCFO')
        {
         $this->db->select('*');
         $this->db->from('requests');
         $this->db->where('retailerid', $id);
         $this->db->where("status",'Reject By SCFO');
         if($searchValue!='')
         {
            $where = "invoicenumber like '%".$searchValue."%'";
            $this->db->where($where);
         }
            $this->db->order_by("ID", "desc");
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
			
			//echo $this->db->last_query();
			
			//exit;
               
            return $response;
        }
		else if($q == 'In Progress')
        {
         $this->db->select('*');
         $this->db->from('requests');
         $this->db->where('retailerid', $id);
         $this->db->where("status",'Created');
         if($searchValue!='')
         {
            $where = "invoicenumber like '%".$searchValue."%'";
            $this->db->where($where);
         }
            $this->db->order_by("ID", "desc");
            $this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $response = $query->result();
			
			//echo $this->db->last_query();
               
            return $response;
        }
        
		
	}
  /*---------------------------------- addded by papiha on 25_08_2022-----------------------------*/
  public function get_all_distributors()
  {
    $this->db->select('*');
    $this->db->from('USER_DETAILS');
   $this->db->where('ROLE', 29);          
    
    $query = $this->db->get();
    $response= $query->result();
    return $response;
  }
	/*----------------------------- added by papiha on 27_08_2022--------------------------------------*/
  public function saverequestnew($data)
	{
		$this->db->insert('requests',$data);
		$executedQuery = $this->db->last_query();
    return $this->db->insert_id();
	}
	
	
	



	
	
	
	
	
  public function update_request($requestid,$data)
	{
		
		$this->db->where('id', $requestid);
		$this->db->update('requests',$data);
	}
	/*----------------------------------- addded by papiha on 01_09_2022------------------------------------------------*/
  public function getdistributorreportcount($id,$q)
	{
		
		//echo "TEST";
		//exit;
		if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
           $this->db->where('distributorid', $id);
			if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != ''&& isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
			{
				$this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
				$this->db->where('invoicedate <=', $_REQUEST['End_Date']);
			}
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			//echo "test1";
			return $cust_count->counter;
       }
       else if($q == 'Complete')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
         // $this->db->where('ROLE', 27);
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("Profile_Status",'Complete');
		  if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
			{
				$this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
				
				$this->db->where('invoicedate <=', $_REQUEST['End_Date']);
			}
		  $this->db->where('distributorid', $id);
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
			
			return $cust_count->counter;
         }	
        else if($q == 'Incomplete')
        {
        $this->db->select('count(*) as counter');
          $this->db->from('requests');
         // $this->db->where('ROLE', 26);
         // $this->db->where("Profile_Status",'');
          $this->db->where("Profile_Status",NULL);
		  $this->db->where('distributorid', $id);
		  if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
			{
				$this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
				
				$this->db->where('invoicedate <=', $_REQUEST['End_Date']);
			}
          $this->db->order_by("ID", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $cust_count = $query->row();
			
			return $cust_count->counter;
        }
         else         {
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
            //$this->db->where('ROLE', 26);
//echo "test2=".$id;
$this->db->where('distributorid', $id);	
if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
			{
				$this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
				
				$this->db->where('invoicedate <=', $_REQUEST['End_Date']);
			}		
            $this->db->order_by("ID", "desc");
			
            $query = $this->db->get();
            //$response = $query->result();
            $cust_count = $query->row();
			
			//print_r($cust_count);
			
			return $cust_count->counter;
        }
		
	}
	
	
	public function getinvoicelist($startdate='',$enddate='',$filter='')
	{
		$this->db->select('*');
            $this->db->from('invoice');
           // $this->db->where('ROLE', 27);
if(isset($startdate) && $startdate != '' && isset($enddate) && $enddate !='')
{	
$where = "invoicedate>='".$startdate."' && invoicedate <= '".$enddate."'";
$this->db->where($where);
}
	
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
			
			//print_r($response);
			
			//echo $this->db->last_query();
			
			//exit;
			
            return $response;
		
		
	}
	
	
  public function getdistributorreportfilter($id,$q)
	{
		
		//echo "TEST";
		//exit;
    if($q=='')
    {
      $this->db->select('count(*) as counter');
      $this->db->from('requests');
      $this->db->join('USER_DETAILS', 'USER_DETAILS.ID = requests.retailerid', 'left');
      $this->db->where('distributorid', $id);	
      $this->db->where('status', 'Approved By SCFO');	
      if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
      {
        $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
        
        $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
       // $this->db->where('retailerid', $_REQUEST['retailer_name']);
      }		
      $this->db->order_by("requests.id", "desc");
     
      $query = $this->db->get();
      $cust_count = $query->row();
      	return $cust_count->counter;
      //$executedQuery = $this->db->last_query();
      //print_r($executedQuery);
    }
		if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
           $this->db->where('distributorid', $id);
if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
			{
				$this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
				
				$this->db->where('invoicedate <=', $_REQUEST['End_Date']);
			}		  
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
		
			return $cust_count->counter;
       }
       else if($q == 'Complete')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
         // $this->db->where('ROLE', 27);
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("Profile_Status",'Complete');
		  if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
			{
				$this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
				
				$this->db->where('invoicedate <=', $_REQUEST['End_Date']);
			}
		  $this->db->where('distributorid', $id);
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
			
			return $cust_count->counter;
         }	
        else if($q == 'Incomplete')
        {
        $this->db->select('count(*) as counter');
          $this->db->from('requests');
         // $this->db->where('ROLE', 26);
         // $this->db->where("Profile_Status",'');
          $this->db->where("Profile_Status",NULL);
		  $this->db->where('distributorid', $id);
		  if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
			{
				$this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
				
				$this->db->where('invoicedate <=', $_REQUEST['End_Date']);
			}
          $this->db->order_by("ID", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $cust_count = $query->row();
			
			return $cust_count->counter;
        }
         else         {
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
            //$this->db->where('ROLE', 26);
//echo "test2=".$id;
$this->db->where('distributorid', $id);
if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
			{
				$this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
				
				$this->db->where('invoicedate <=', $_REQUEST['End_Date']);
			}			
            $this->db->order_by("ID", "desc");
			
            $query = $this->db->get();
            //$response = $query->result();
            $cust_count = $query->row();
			
			//print_r($cust_count);
			
			return $cust_count->counter;
        }
		
	}
  public function getdistributorreportfilterlist($id,$q,$row,$rowperpage)
	{
		
		//echo "TEST";
		//exit;
    if($q=='')
    {
      $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
      $this->db->from('requests');
      $this->db->join('USER_DETAILS', 'USER_DETAILS.ID = requests.retailerid', 'left');
      $this->db->where('distributorid', $id);	
      $this->db->where('status', 'Approved By SCFO');	
      if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
      {
        $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
        
        $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
      }		
      $this->db->order_by("ID", "desc");
      $this->db->limit($rowperpage, $row);
      $query = $this->db->get();
      $cust_count = $query->result();
      return $cust_count;
      //$executedQuery = $this->db->last_query();
      //print_r($executedQuery);
    }
		if($q == 'all'){
            $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
            $this->db->from('requests');
			      $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
            $this->db->where('distributorid', $id);
            if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '' && isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != '')
            {
              $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
              
              $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
              $this->db->where('retailerid', $_REQUEST['retailer_name']);
            }
            $this->db->order_by("ID", "desc");
			      $this->db->limit($rowperpage, $row);
            $query = $this->db->get();
          
            $cust_count = $query->result();
		return $cust_count;
    //$executedQuery = $this->db->last_query();
    //print_r($executedQuery);
       }
       else if($q == 'Approved By SCFO')
       {
        $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
        $this->db->from('requests');
        $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
        $this->db->where('distributorid', $id);
        $this->db->where('requests.status', 'Approved By SCFO');
        if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '' && isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != '')
        {
          $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
          
          $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
          $this->db->where('retailerid', $_REQUEST['retailer_name']);
        }
        $this->db->order_by("ID", "desc");
        $this->db->limit($rowperpage, $row);
        $query = $this->db->get();
      
        $cust_count = $query->result();
        return $cust_count;
         }	
        else if($q == 'Approved By Distributor')
        {
          $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
          $this->db->from('requests');
          $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
          $this->db->where('distributorid', $id);
          $this->db->where('requests.status', 'Approved By Distributor');
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '' && isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
            $this->db->where('retailerid', $_REQUEST['retailer_name']);
          }
          $this->db->order_by("requests.id", "desc");
          $this->db->limit($rowperpage, $row);
          $query = $this->db->get();
        
          $cust_count = $query->result();
          return $cust_count;
        }
        else if($q == 'Rejected By Distributor')
        {
          $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
          $this->db->from('requests');
          $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
          $this->db->where('distributorid', $id);
          $this->db->where('requests.status', 'Rejected By Distributor');
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '' && isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
            $this->db->where('retailerid', $_REQUEST['retailer_name']);
          }
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage, $row);
          $query = $this->db->get();
        
          $cust_count = $query->result();
          return $cust_count;
        }
        else if($q == 'Rejected By SCFO')
        {
          $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
          $this->db->from('requests');
          $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
          $this->db->where('distributorid', $id);
          $this->db->where('requests.status', 'Rejected By SCFO');
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '' && isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
            $this->db->where('retailerid', $_REQUEST['retailer_name']);
          }
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage, $row);
          $query = $this->db->get();
        
          $cust_count = $query->result();
          return $cust_count;
        }
        else if($q == 'Revert By SCFO')
        {
          $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
          $this->db->from('requests');
          $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
          $this->db->where('distributorid', $id);
          $this->db->where('requests.status', 'Revert By SCFO');
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '' && isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
            $this->db->where('retailerid', $_REQUEST['retailer_name']);
          }
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage, $row);
          $query = $this->db->get();
        
          $cust_count = $query->result();
          return $cust_count;
        }
        else if($q == 'Revert By Distributor')
        {
          $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
          $this->db->from('requests');
          $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
          $this->db->where('distributorid', $id);
          $this->db->where('requests.status', 'Revert By Distributor');
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '' && isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
            $this->db->where('retailerid', $_REQUEST['retailer_name']);
          }
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage, $row);
          $query = $this->db->get();
        
          $cust_count = $query->result();
          return $cust_count;
        }
        else if($q == 'Created')
        {
          $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
          $this->db->from('requests');
          $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
          $this->db->where('distributorid', $id);
          $this->db->where('requests.status', 'Created');
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '' && isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
            $this->db->where('retailerid', $_REQUEST['retailer_name']);
          }
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage, $row);
          $query = $this->db->get();
        
          $cust_count = $query->result();
          return $cust_count;
        }
        else         
        {
            $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
            $this->db->from('requests');
		      	$this->db->join('USER_DETAILS', 'USER_DETAILS.ID = requests.retailerid', 'left');
            $this->db->where('distributorid', $id);	
     if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != ''&& isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != '')
			{
				$this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
				$this->db->where('invoicedate <=', $_REQUEST['End_Date']);
        $this->db->where('retailerid', $_REQUEST['retailer_name']);
			}		
      $this->db->order_by("ID", "desc");
			$this->db->limit($rowperpage, $row);
      $query = $this->db->get();
      $cust_count = $query->result();
		   	return $cust_count;
        }
		
	}
  public function getreportcount($id,$q)
	{
		
	
		if($q == 'all')
    {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('retailerid', $id); 
        	if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
			    {
				     $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
				     $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
		    	}
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			
			//echo $this->db->last_query();
		       	return $cust_count->counter;
       }
       else if($q == 'Approved By SCFO')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('requests.status', 'Approved By SCFO');
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
          }
          $this->db->where('retailerid', $id);
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
			    return $cust_count->counter;
      
        }	
        else if($q == 'Approved By Distributor')
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('requests.status', 'Approved By Distributor'); 
          $this->db->where('retailerid', $id);
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
          }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
		    	return $cust_count->counter;
        }
        else if($q == 'Rejected By Distributor')
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('requests.status', 'Rejected By Distributor');
          $this->db->where('retailerid', $id);
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
          }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
		    	return $cust_count->counter;
        }
        else if($q == 'Rejected By SCFO')
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('requests.status', 'Rejected By SCFO');
          $this->db->where('retailerid', $id);
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
          }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
		    	return $cust_count->counter;
        }
        else if($q == 'Revert By SCFO')
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('requests.status', 'Revert By SCFO');
          $this->db->where('retailerid', $id);
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
          }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
		    	return $cust_count->counter;
        }
        else if($q == 'Revert By Distributor')
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('requests.status', 'Revert By Distributor');
          $this->db->where('retailerid', $id);
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
          }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
		    	return $cust_count->counter;
        }
        else if($q == 'Created')
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('requests.status', 'Created');
          $this->db->where('retailerid', $id);
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
          }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
		    	return $cust_count->counter;
        }
        else         
        {
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
            $this->db->where('retailerid', $id);	
            if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
                  {
                    $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
                    
                    $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
                  }		
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			      return $cust_count->counter;
        }
		
	}
	
	// function 2
	
	public function getreportfilter($id,$q,$searchValue)
	{
		
    if($q == 'all')
    {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('retailerid', $id); 
        	if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
			    {
				     $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
				     $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
		    	}
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
		       	return $cust_count->counter;
       }
       else if($q == 'Approved By SCFO')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('requests.status', 'Approved By SCFO');
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
          }
          $this->db->where('retailerid', $id);
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
			    return $cust_count->counter;
      
        }	
        else if($q == 'Approved By Distributor')
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('requests.status', 'Approved By Distributor'); 
          $this->db->where('retailerid', $id);
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
          }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
		    	return $cust_count->counter;
        }
        else if($q == 'Rejected By Distributor')
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('requests.status', 'Rejected By Distributor');
          $this->db->where('retailerid', $id);
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
          }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
		    	return $cust_count->counter;
        }
        else if($q == 'Rejected By SCFO')
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('requests.status', 'Rejected By SCFO');
          $this->db->where('retailerid', $id);
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
          }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
		    	return $cust_count->counter;
        }
        else if($q == 'Revert By SCFO')
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('requests.status', 'Revert By SCFO');
          $this->db->where('retailerid', $id);
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
          }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
		    	return $cust_count->counter;
        }
        else if($q == 'Revert By Distributor')
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('requests.status', 'Revert By Distributor');
          $this->db->where('retailerid', $id);
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
          }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
		    	return $cust_count->counter;
        }
        else if($q == 'Created')
        {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('requests.status', 'Created');
          $this->db->where('retailerid', $id);
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
          }
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
		    	return $cust_count->counter;
        }
        else         
        {
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
            $this->db->where('retailerid', $id);	
            if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
                  {
                    $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
                    
                    $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
                  }		
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			      return $cust_count->counter;
        }
		
	}
	
	
// function 3

public function getreportfilterlist($id,$q,$row,$rowperpage)
	{
		
		//print_r($_REQUEST['Start_Date']);
		
		//echo $q;
		
    if($q=='')
    {
      $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
      $this->db->from('requests');
      $this->db->join('USER_DETAILS', 'USER_DETAILS.ID = requests.retailerid', 'left');
      $this->db->where('retailerid', $id);	
      $this->db->where('status', 'Approved By SCFO');	
      if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
      {
        $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
        
        $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
      }		
      $this->db->order_by("ID", "desc");
      $this->db->limit($rowperpage, $row);
      $query = $this->db->get();
      $cust_count = $query->result();
	  
	  //echo $this->db->last_query();
	  
	  
      return $cust_count;
      //$executedQuery = $this->db->last_query();
      //print_r($executedQuery);
    }
		if($q == 'all'){
            $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
            $this->db->from('requests');
			      $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
            $this->db->where('retailerid', $id);
			//echo "test1"; && isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != ''
            if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '' )
            {
				//echo "Test2";
              $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
              
              $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
              //$this->db->where('retailerid', $_REQUEST['retailer_name']);
            }
            $this->db->order_by("ID", "desc");
			      $this->db->limit($rowperpage, $row);
            $query = $this->db->get();
          
            $cust_count = $query->result();
			
			//echo $this->db->last_query();
		return $cust_count;
    //$executedQuery = $this->db->last_query();
    //print_r($executedQuery);
       }
       else if($q == 'Approved By SCFO')
       {
        $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
        $this->db->from('requests');
        $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
        $this->db->where('retailerid', $id);
        $this->db->where('requests.status', 'Approved By SCFO');
        if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '' )
        {
          $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
          
          $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
         // $this->db->where('retailerid', $_REQUEST['retailer_name']);
        }
		
        $this->db->order_by("ID", "desc");
        $this->db->limit($rowperpage, $row);
        $query = $this->db->get();
      
        $cust_count = $query->result();
        return $cust_count;
         }	
        else if($q == 'Approved By Distributor')
        {
          $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
          $this->db->from('requests');
          $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
          $this->db->where('retailerid', $id);
          $this->db->where('requests.status', 'Approved By Distributor');
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
           // $this->db->where('retailerid', $_REQUEST['retailer_name']);
          }
          $this->db->order_by("requests.id", "desc");
          $this->db->limit($rowperpage, $row);
          $query = $this->db->get();
        
          $cust_count = $query->result();
          return $cust_count;
        }
        else if($q == 'Rejected By Distributor')
        {
          $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
          $this->db->from('requests');
          $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
          $this->db->where('retailerid', $id);
          $this->db->where('requests.status', 'Rejected By Distributor');
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
            //$this->db->where('retailerid', $_REQUEST['retailer_name']);  && isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != ''
          }
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage, $row);
          $query = $this->db->get();
        
          $cust_count = $query->result();
          return $cust_count;
        }
        else if($q == 'Rejected By SCFO')
        {
          $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
          $this->db->from('requests');
          $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
          $this->db->where('retailerid', $id);
          $this->db->where('requests.status', 'Rejected By SCFO');
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '' )
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
            //$this->db->where('retailerid', $_REQUEST['retailer_name']); && isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != ''
          }
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage, $row);
          $query = $this->db->get();
        
          $cust_count = $query->result();
          return $cust_count;
        }
        else if($q == 'SendBack By SCFO')
        {
          $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
          $this->db->from('requests');
          $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
          $this->db->where('retailerid', $id);
          $this->db->where('requests.status', 'Revert By SCFO');
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '' )
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
            //$this->db->where('retailerid', $_REQUEST['retailer_name']); && isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != ''
          }
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage, $row);
          $query = $this->db->get();
        
          $cust_count = $query->result();
          return $cust_count;
        }
        else if($q == 'SendBack By Distributor')
        {
          $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
          $this->db->from('requests');
          $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
          $this->db->where('retailerid', $id);
          $this->db->where('requests.status', 'Revert By Distributor');
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '' )
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
            //$this->db->where('retailerid', $_REQUEST['retailer_name']); && isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != ''
          }
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage, $row);
          $query = $this->db->get();
        
          $cust_count = $query->result();
          return $cust_count;
        }
        else if($q == 'Created')
        {
          $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
          $this->db->from('requests');
          $this->db->join('USER_DETAILS', 'USER_DETAILS.UNIQUE_CODE = requests.retailerid', 'left');
          $this->db->where('retailerid', $id);
          $this->db->where('requests.status', 'Created');
          if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '' )
          {
            $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
            
            $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
           // $this->db->where('retailerid', $_REQUEST['retailer_name']); && isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != ''
          }
          $this->db->order_by("ID", "desc");
          $this->db->limit($rowperpage, $row);
          $query = $this->db->get();
        
          $cust_count = $query->result();
          return $cust_count;
        }
        else         
        {
            $this->db->select('requests.*,USER_DETAILS.FN,USER_DETAILS.LN');
            $this->db->from('requests');
		      	$this->db->join('USER_DETAILS', 'USER_DETAILS.ID = requests.retailerid', 'left');
            $this->db->where('retailerid', $id);	
            if(isset($_REQUEST['Start_Date'])  && $_REQUEST['Start_Date'] != '' && isset($_REQUEST['End_Date'])  && $_REQUEST['End_Date'] != '')
              {
                $this->db->where('invoicedate >=', $_REQUEST['Start_Date']);
                $this->db->where('invoicedate <=', $_REQUEST['End_Date']);
                // $this->db->where('retailerid', $_REQUEST['retailer_name']); && isset($_REQUEST['retailer_name'])  && $_REQUEST['retailer_name'] != ''
              }		
              $this->db->order_by("ID", "desc");
              $this->db->limit($rowperpage, $row);
              $query = $this->db->get();
              $cust_count = $query->result();
                return $cust_count;
        }
		
	}
	/*------------------------- added by papiha on 01_09_2022------------------------------------------*/
  public function get_name($id)
  {
    $this->db->select('FN,LN');
    $this->db->from('USER_DETAILS');
    $this->db->where('UNIQUE_CODE', $id);
		$query = $this->db->get();
    $cust_count = $query->row();
		$counter = $cust_count;
    return $counter;
  }
	
	/*--------------------------- addded by papiha on 01_09_2022-------------------------------*/
  public function getretailercount_for_distributor($id,$q)
	{
		
		
		if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 27);  
            $this->db->where('distributor_id', $id);  
                    
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			
			return $cust_count->counter;
       }
       else if($q == 'Approved')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 27);  
          $this->db->where('distributor_id', $id);
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Approved');
          $this->db->order_by("USER_DETAILS.ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
          //print_r($this->db->last_query());
			    return $cust_count->counter;
      
         }	
        else if($q == 'pending')
        {
        $this->db->select('count(*) as counter');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 27); 
          $this->db->where('distributor_id', $id);
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         // $this->db->where("Profile_Status",'');
         $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Created');
          $this->db->order_by("USER_DETAILS.ID", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $cust_count = $query->row();
          //print_r($this->db->last_query());
			     return $cust_count->counter;
        }
        else if($q == 'reject')
        {
        $this->db->select('count(*) as counter');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 27); 
          $this->db->where('distributor_id', $id);
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         // $this->db->where("Profile_Status",'');
          $where = '(status="Reject By SCFO" or status = "Reject By Distributor")';
          $this->db->where('ROLE', 27); 
          $this->db->where('distributor_id', $id);
          $this->db->where($where);
          $this->db->order_by("USER_DETAILS.ID", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $cust_count = $query->row();
          //print_r($this->db->last_query());
			     return $cust_count->counter;
        }
         else         {
            $this->db->select('count(*) as counter');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 27);          
            $this->db->order_by("ID", "desc");
            $this->db->where('distributor_id', $id);
            $query = $this->db->get();
            //$response = $query->result();
            $cust_count = $query->row();
			
			//print_r($cust_count);
			
			return $cust_count->counter;
        }
		
	}
  public function getretailercountfilter_for_distributor($id,$searchValue,$q)
	{
		
		if($q == 'all'){
            /*$this->db->select('count(*) as counter');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 27);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			
			return $cust_count->counter;*/
          $this->db->select('count(*) as count');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE',27);
          $this->db->where('distributor_id', $id);

          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          // $this->db->where("PROFILE_PERCENTAGE",'100');
         
          if($searchValue!= '')
          {
          $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=27";
          $this->db->where($where);
          }
          $query = $this->db->get();
          $response = $query->row();
          return $response->count;
       }
       else if($q == 'Approved')
       {

          $this->db->select('count(*) as count');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE',27);
          $this->db->where('distributor_id', $id);

          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Approved');
          if($searchValue!= '')
          {
          $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=27 AND CUSTOMER_MORE_DETAILS.STATUS='Approved'";
          $this->db->where($where);
          }
          $query = $this->db->get();
          $response = $query->row();
         // print_r($this->db->last_query());
          return $response->count;
      
         }	
        else if($q == 'pending')
        {
          $this->db->select('count(*) as count');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE',27);
          $this->db->where('distributor_id', $id);

          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Created');
          if($searchValue!= '')
          {
          $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=27 AND CUSTOMER_MORE_DETAILS.STATUS='Created'";
          $this->db->where($where);
          }
          $query = $this->db->get();
          $response = $query->row();
          return $response->count;
        }
        else if($q == 'reject')
        {
        $this->db->select('count(*) as counter');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 27); 
          $this->db->where('distributor_id', $id);
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         // $this->db->where("Profile_Status",'');
          $where = '(status="Reject By SCFO" or status = "Reject By Distributor")';
          $this->db->where('ROLE', 27); 
          $this->db->where('distributor_id', $id);
          $this->db->where($where);
          $this->db->order_by("USER_DETAILS.ID", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $cust_count = $query->row();
          //print_r($this->db->last_query());
			     return $cust_count->counter;
        }
         else         {
            $this->db->select('count(*) as counter');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 27);   
          $this->db->where('distributor_id', $id);
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            //$response = $query->result();
			
			//print_r($response);
			
            $cust_count = $query->row();
			
			return $cust_count->counter;
        }
		
	}
  public function getretailer_for_distributor($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$q)
	{
		
		
		if($q == 'all'){
              $this->db->select('*');
              $this->db->from('USER_DETAILS');
              $this->db->where('ROLE',27);
              $this->db->where('distributor_id', $id);
              $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
              // $this->db->where("PROFILE_PERCENTAGE",'100');
            
              if($searchValue!= '')
              {
              $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=27";
              $this->db->where($where);
              }
              $this->db->limit($rowperpage,$row);
              $this->db->order_by("USER_DETAILS.ID", "desc");
              $query = $this->db->get();
              $response = $query->result();
             
                 return $response;
       }
       else if($q == 'Approved')
       {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE',27);
          $this->db->where('distributor_id', $id);
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Approved');
          if($searchValue!= '')
          {
          $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=27 AND CUSTOMER_MORE_DETAILS.STATUS='Approved'";
          $this->db->where($where);
          }
          $this->db->limit($rowperpage,$row);
          $this->db->order_by("USER_DETAILS.ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
             
          return $response;
      
         }	
         else if($q == 'reject')
         {
         $this->db->select('*');
           $this->db->from('USER_DETAILS');
           $this->db->where('ROLE', 27); 
           $this->db->where('distributor_id', $id);
           $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=27 AND CUSTOMER_MORE_DETAILS.STATUS='Created'";
           $this->db->where($where);
           }
          // $this->db->where("Profile_Status",'');
           $where = '(status="Reject By SCFO" or status = "Reject By Distributor")';
           $this->db->where('ROLE', 27); 
           $this->db->where('distributor_id', $id);
           $this->db->where($where);
           $this->db->limit($rowperpage,$row);
            $this->db->order_by("USER_DETAILS.ID", "desc");
          //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $response = $query->result();
             
         return $response;
         }
        else if($q == 'pending')
        {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE',27);
          $this->db->where('distributor_id', $id);
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Created');
          if($searchValue!= '')
          {
          $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=27 AND CUSTOMER_MORE_DETAILS.STATUS='Created'";
          $this->db->where($where);
          }
          $this->db->limit($rowperpage,$row);
          $this->db->order_by("USER_DETAILS.ID", "desc");
          $query = $this->db->get();
          $response = $query->result();
             
         return $response;
        }
         else         {
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 27); 
            $this->db->where('distributor_id', $id);         
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
        }
		
	}
  public function getstatus($id)
  {
      $this->db->select('STATUS');
      $this->db->from('CUSTOMER_MORE_DETAILS');
      $this->db->where('CUST_ID',$id); 
      $query = $this->db->get();
      $cust_count = $query->row();
      return $cust_count->STATUS;
     
  }
  /*------------------------------------- addded by papiha on 29_12_2022------------------------------------------------*/
  public function getscf_ops_count($q)
	{
		
      if($q == 'all')
      {
          $this->db->select('count(*) as counter');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 33);          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
        
          return $cust_count->counter;
      }
	 }
   public function getscf_ops_countfilter($searchValue,$q)
   {
     
      if($q == 'all')
      {
           $this->db->select('count(*) as count');
           $this->db->from('USER_DETAILS');
           $this->db->where('ROLE',33);
           $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=33";
           $this->db->where($where);
           }
           $query = $this->db->get();
           $response = $query->row();
           return $response->count;
      }
       
     
    }
    public function getscf_ops($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$q)
    {
      
      
        if($q == 'all')
        {
                  $this->db->select('*');
                  $this->db->from('USER_DETAILS');
                  $this->db->where('ROLE',33);
                  $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                  if($searchValue!= '')
                  {
                  $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=33";
                  $this->db->where($where);
                  }
                  $this->db->limit($rowperpage,$row);
                  $query = $this->db->get();
                  $response = $query->result();
                  return $response;
          }
        
      
    }
	
	


	
	
	
}
?>