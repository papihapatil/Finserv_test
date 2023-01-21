<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributor_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
	
	
	public function getretailerlist()
	{
		$this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 27);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
		
		
	}
	
	public function delprofile($userid)
	{
		//echo "Del functionality".$userid;  
		
		$this->db->where('UNIQUE_CODE', $userid);
    $this->db->delete('USER_DETAILS');
	
	//exit;
		
	}
	
	
	public function getproductcount()
	{
		//if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('loanproduct');
            //$this->db->where('startdate', 26);
			
			$this->db->where('startdate <=',date('Y-m-d'));
$this->db->where('enddate >=',date('Y-m-d'));
            $this->db->order_by("id", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			
			//echo $this->db->last_query();
			
			//print_r($cust_count);
			
			//exit;
			
			return $cust_count->counter;
       //}
      
		
		
		
	}
	
	public function getproductlastid()
	{
		//if($q == 'all'){
            $this->db->select('id');
            $this->db->from('loanproduct');
            //$this->db->where('ROLE', 26);          
            $this->db->order_by("id", "desc");
			//$this->db->limit(0,1);
            $query = $this->db->get();
            $cust_count = $query->row();
			
			//print_r($cust_count);
			
			//exit;
			
			return $cust_count->id;
       //}
      
		
		
		
	}
	
	
	public function getproductfilter()
	{
		//if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('loanproduct');
            //$this->db->where('ROLE', 26);
$this->db->where('startdate <=',date('Y-m-d'));
$this->db->where('enddate >=',date('Y-m-d'));			
            $this->db->order_by("id", "desc");
			
            $query = $this->db->get();
            $cust_count = $query->row();
			
		//	print_r($cust_count);
			
		//	exit;
			
			return $cust_count->counter;
       //}
      
		
		
		
	}
	
	public function getproduct($row,$rowperpage)
	{
		//if($q == 'all'){
            $this->db->select('*');
            $this->db->from('loanproduct');
            //$this->db->where('ROLE', 26);

				$this->db->where('startdate <=',date('Y-m-d'));
$this->db->where('enddate >=',date('Y-m-d'));

//print_r($_REQUEST);

if($_REQUEST['filter'] == 'fixed')
{
	$this->db->where('processingfeetype','fixed');
}
if($_REQUEST['filter'] == 'percentage')
{
	$this->db->where('processingfeetype','percentage');
}

if($_REQUEST['filter'] == 'Interest_Subvent_Yes')
{
	$this->db->where('interestsubvention','Yes');
}

if($_REQUEST['filter'] == 'Interest_Subvent_No')
{
	$this->db->where('interestsubvention','No');
}

					
            $this->db->order_by("id", "desc");
			
			$this->db->limit($rowperpage,$row);
            $query = $this->db->get();
            $cust_count = $query->result();
			
			$this->db->last_query();
			
			return $cust_count;
       //}
      
		
		
		
	}
	
	
	
	
	public function getdistributorlist()
	{
		
		    $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 29);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
		
	}
	
	
	
	
	public function saveinvoice($data)
	{
		
		//$this->db->set('createdate',now());
		//$this->db->set('modifydate',now());
		$this->db->insert('invoice',$data);
		
		//$executedQuery = $this->db->last_query();
    //print_r($executedQuery);
	}
	
	
	public function getLoanProduct()
	{
		$this->db->select('*');
            $this->db->from('loanproduct');
           // $this->db->where('ROLE', 26); 
			$this->db->where('startdate <=',date('Y-m-d'));
$this->db->where('enddate >=',date('Y-m-d'));
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
			
			
            return $response;
		
	}
	
	public function getloanuser($userid)
	{
		
		      $this->db->select('loanproduct.*');
            $this->db->from('loanuser');
			   $this->db->join('loanproduct', 'loanuser.loanid = loanproduct.id');
            $this->db->where('userid', $userid);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->row();
			
			//print_r($response);
			
			//$executedQuery = $this->db->last_query();
    //print_r($executedQuery);
			
            return $response;
		
	}
	
	public function loanuser($data)
	{
		$this->db->insert('loanuser',$data);
		
	//	$executedQuery = $this->db->last_query();
   // print_r($executedQuery);
		
	}
	
	public function saveloanproduct($data)
	{
		
		//$this->db->set('createdate',now());
		//$this->db->set('modifydate',now());
		$this->db->insert('loanproduct',$data);
		
		//echo $executedQuery = $this->db->last_query();
   // print_r($executedQuery);
	}
	
	public function getdistributor($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$q)
	{
		if($q == 'all'){
         $this->db->select('*');
         $this->db->from('USER_DETAILS');
         $this->db->where('ROLE',29);
         $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         // $this->db->where("PROFILE_PERCENTAGE",'100');
       
         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=29";
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
     $this->db->where('ROLE',29);
     $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     // $this->db->where("PROFILE_PERCENTAGE",'100');
     $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Approved');
     if($searchValue!= '')
     {
     $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=29 AND CUSTOMER_MORE_DETAILS.STATUS='Approved'";
     $this->db->where($where);
     }
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID", "desc");
     $query = $this->db->get();
     $response = $query->result();
	 
	 //echo $this->db->last_query();
      //  exit;
     return $response;
 
    }	
    else if($q == 'Rejected')
    {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',29);
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       // $this->db->where("PROFILE_PERCENTAGE",'100');
       $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Rejected');
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=29 AND CUSTOMER_MORE_DETAILS.STATUS='Rejected'";
       $this->db->where($where);
       }
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID", "desc");
       $query = $this->db->get();
       $response = $query->result();
      
      //echo $this->db->last_query();
        //  exit;
       return $response;
   
      }	
   else if($q == 'pending')
   {
     $this->db->select('*');
     $this->db->from('USER_DETAILS');
     $this->db->where('ROLE',29);
     $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     // $this->db->where("PROFILE_PERCENTAGE",'100');
     $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Created');
     if($searchValue!= '')
     {
      $where = "CUSTOMER_MORE_DETAILS.STATUS!='Approved' AND CUSTOMER_MORE_DETAILS.STATUS!='Rejected' AND FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=29 AND CUSTOMER_MORE_DETAILS.STATUS!='Approved' AND CUSTOMER_MORE_DETAILS.STATUS!='Rejected'";
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
       $this->db->where('ROLE', 29);          
       $this->db->order_by("USER_DETAILS.ID", "desc");
       $this->db->limit($rowperpage,$row);
       
       $query = $this->db->get();
       $response = $query->result();
       return $response;
   }
		
	}
	
	public function getdistributorcount($q)
	{
		if($q == 'all'){
         $this->db->select('count(*) as counter');
         $this->db->from('USER_DETAILS');
         $this->db->where('ROLE', 29);          
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
      
      return $cust_count->counter;
    }
    else if($q == 'Approved')
    {
       $this->db->select('count(*) as counter');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE', 29);  
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Approved');
       $this->db->order_by("USER_DETAILS.ID", "desc");
       $query = $this->db->get();
       $cust_count = $query->row();
       //print_r($this->db->last_query());
       return $cust_count->counter;
   
      }	
      else if($q == 'Rejected')
    {
       $this->db->select('count(*) as counter');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE', 29);  
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Rejected');
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
       $this->db->where('ROLE', 29); 
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      // $this->db->where("Profile_Status",'');
      
      $where = "CUSTOMER_MORE_DETAILS.STATUS!='Approved' AND CUSTOMER_MORE_DETAILS.STATUS!='Rejected' ";
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
         $this->db->where('ROLE', 29);          
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         //$response = $query->result();
         $cust_count = $query->row();
      
      //print_r($cust_count);
      
      return $cust_count->counter;
     }
		
	}
	
	public function getdistributorcountfilter($searchValue,$q)
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
       $this->db->where('ROLE',29);
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       // $this->db->where("PROFILE_PERCENTAGE",'100');
      
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=29";
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
       $this->db->where('ROLE',29);
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Approved');
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=29 AND CUSTOMER_MORE_DETAILS.STATUS='Approved'";
       $this->db->where($where);
       }
       $query = $this->db->get();
       $response = $query->row();
       //print_r($this->db->last_query());
       return $response->count;
   
      }	
      else if($q == 'Rejected')
    {
      
       $this->db->select('count(*) as count');
       $this->db->from('USER_DETAILS');
       $this->db->where('ROLE',29);
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Rejected');
       if($searchValue!= '')
       {
       $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=29 AND CUSTOMER_MORE_DETAILS.STATUS='Rejected'";
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
       $this->db->where('ROLE',29);
       $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       // $this->db->where("PROFILE_PERCENTAGE",'100');
       $this->db->where("CUSTOMER_MORE_DETAILS.STATUS",'Created');
       if($searchValue!= '')
       {
         $where = "CUSTOMER_MORE_DETAILS.STATUS!='Approved' AND CUSTOMER_MORE_DETAILS.STATUS!='Rejected' AND FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=29 AND CUSTOMER_MORE_DETAILS.STATUS!='Approved' AND CUSTOMER_MORE_DETAILS.STATUS!='Rejected'";
       $this->db->where($where);
       }
       $query = $this->db->get();
       $response = $query->row();
       return $response->count;
     }
      else         {
         $this->db->select('count(*) as counter');
         $this->db->from('USER_DETAILS');
         $this->db->where('ROLE', 29);          
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         //$response = $query->result();
      
      //print_r($response);
      
         $cust_count = $query->row();
      
      return $cust_count->counter;
     }
		
	}
	
	
	public function getinvoicecount($q)
	{
		
		if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('invoice');
           // $this->db->where('ROLE', 27);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			
			return $cust_count->counter;
       }
       else if($q == 'Complete')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('invoice');
         // $this->db->where('ROLE', 27);  
          // $this->db->where("PROFILE_PERCENTAGE",'100');
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
         // $this->db->where('ROLE', 26); 
         // $this->db->where("Profile_Status",'');
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
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            //$response = $query->result();
            $cust_count = $query->row();
			
			//print_r($cust_count);
			
			return $cust_count->counter;
        }
		
	}
	
	
	public function getinvoicefilter($q,$searchValue,$filter_by,$Start_Date,$End_Date,$Reffered_by,$location)
	{
		
		if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('invoice');
            //$this->db->where('ROLE', 26);          
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
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            //$response = $query->result();
			
			//print_r($response);
			
            $cust_count = $query->row();
			
			return $cust_count->counter;
        }
		
	}
	
	
	public function getinvoice($q,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date)
	{
		
		if($q == 'all'){
            $this->db->select('*');
            $this->db->from('invoice');
           // $this->db->where('ROLE', 26);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
       }
       else if($q == 'Complete')
       {
          $this->db->select('*');
          $this->db->from('invoice');
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
            //$this->db->where('ROLE', 26);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
        }
		
	}
	
	
	public function getrequestcount($id,$q)
	{
		/*$q="";
		//echo "TEST";
		//exit;
		if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
           $this->db->where('distributorid', $id);          
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
		  
          $this->db->order_by("ID", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $cust_count = $query->row();
			
			return $cust_count->counter;
        }
         else         {
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
         
           $this->db->where('distributorid', $id);			
            $this->db->order_by("ID", "desc");
			
            $query = $this->db->get();
            //$response = $query->result();
            $cust_count = $query->row();
			
			//print_r($cust_count);
			
			return $cust_count->counter;
        }*/
        if($q=='')
      {
         $q = 'all';
      }
		if($q == 'all')
      {
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
            $this->db->where('distributorid', $id);
            $this->db->order_by("ID", "desc");
              $this->db->where('distributorid', $id);
            $query = $this->db->get();
            $cust_count = $query->row();
			   return $cust_count->counter;
       }
       else if($q == 'Approved By Distributor')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('distributorid', $id);
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
          $this->db->where('distributorid', $id);
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
          $this->db->where('distributorid', $id);
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
         $this->db->where('distributorid', $id);
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
         $this->db->where('distributorid', $id);
         $this->db->where('status', 'SendBack By SCFO');  
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
        
         return $cust_count->counter;
        }
        else if($q == 'SCFO Rejected')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('distributorid', $id);
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
         $this->db->where('distributorid', $id);
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
     
		if($q == 'all')
      {
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
            $this->db->where('distributorid', $id);
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
          $this->db->where('distributorid', $id);
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
          $this->db->where('distributorid', $id);
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
          $this->db->where('distributorid', $id);
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
          $this->db->where('distributorid', $id);
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
         $this->db->where('distributorid', $id);
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
         $this->db->where('distributorid', $id);
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
        else if($q == 'SCFO Rejected')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('distributorid', $id);
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
         $this->db->where('distributorid', $id);
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
		if($q=='')
      {
         $q = 'all';
      }
	  
	 // echo $q;
    
		if($q == 'all')
      {
            $this->db->select('*');
            $this->db->from('requests');
            $this->db->where('distributorid', $id);
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
          $this->db->where('distributorid', $id);
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
          $this->db->where('distributorid', $id);
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
          $this->db->where('distributorid', $id);
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
          $this->db->where('distributorid', $id);
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
		 // echo $this->db->last_query();
          return $response;
         }	
       else if($q == 'SCFO Pendig for approval')
       {
          $this->db->select('*');
          $this->db->from('requests');
          $this->db->where('distributorid', $id);
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
        else if($q == 'Approved By SCFO')
        {
         $this->db->select('*');
         $this->db->from('requests');
         $this->db->where('distributorid', $id);
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
         $this->db->where('distributorid', $id);
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
         $this->db->where('distributorid', $id);
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
	
	
	public function getRequest($requestid)
	{
      $this->db->select('*');
      $this->db->from('requests');
		$this->db->where('id', $requestid);
      $this->db->order_by("id", "desc");
      $query = $this->db->get();
      $cust_count = $query->row();
      return $cust_count;
	}
	
	
	
	public function getscmcount()
	{
		$q= "all";
		
		if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 28);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			
			return $cust_count->counter;
       }
       else if($q == 'Complete')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 28);  
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("Profile_Status",'Complete');
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
			
			return $cust_count->counter;
      
         }	
        else if($q == 'Incomplete')
        {
        $this->db->select('count(*) as counter');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 28); 
         // $this->db->where("Profile_Status",'');
          $this->db->where("Profile_Status",NULL); 
          $this->db->order_by("ID", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $cust_count = $query->row();
			
			return $cust_count->counter;
        }
         else         {
            $this->db->select('count(*) as counter');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 28);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            //$response = $query->result();
            $cust_count = $query->row();
			
			//print_r($cust_count);
			
			return $cust_count->counter;
        }
		
	}
	
	public function getscmfilter()
	{
		$q = "all";
		
		if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 28);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			
			return $cust_count->counter;
       }
       else if($q == 'Complete')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 28);  
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("Profile_Status",'Complete');
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
         $cust_count = $query->row();
			
			return $cust_count->counter;
      
         }	
        else if($q == 'Incomplete')
        {
        $this->db->select('count(*) as counter');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 28); 
         // $this->db->where("Profile_Status",'');
          $this->db->where("Profile_Status",NULL); 
          $this->db->order_by("ID", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
$cust_count = $query->row();
			
			return $cust_count->counter;
        }
         else         {
            $this->db->select('count(*) as counter');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 28);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            //$response = $query->result();
			
			//print_r($response);
			
            $cust_count = $query->row();
			
			return $cust_count->counter;
        }
		
	}
	
	
	public function getscm()
	{
		$q = "all";
		if($q == 'all'){
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 28);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
       }
       else if($q == 'Complete')
       {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('ROLE', 28);  
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
          $this->db->where('ROLE', 28); 
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
            $this->db->where('ROLE', 28);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
        }
		
	}
	
	public function getrequestcountall()
	{
		
		//echo "TEST";
		//exit;
		$q = "all";
		if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
          // $this->db->where('distributorid', $id);          
            $this->db->order_by("id", "desc");
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
		  
		 // $this->db->where('distributorid', $id);

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
		 // $this->db->where('distributorid', $id);
		  
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
//$this->db->where('distributorid', $id);			
            $this->db->order_by("ID", "desc");
			
            $query = $this->db->get();
            //$response = $query->result();
            $cust_count = $query->row();
			
			//print_r($cust_count);
			
			return $cust_count->counter;
        }
		
	}
	
	
	public function getrequestfilterall()
	{
		
		//echo "TEST";
		//exit;

		$q = "all";
		if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
           //$this->db->where('distributorid', $id);          
            $this->db->order_by("id", "desc");
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
		  
		 // $this->db->where('distributorid', $id);

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
		//  $this->db->where('distributorid', $id);
		  
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
//$this->db->where('distributorid', $id);			
            $this->db->order_by("ID", "desc");
			
            $query = $this->db->get();
            //$response = $query->result();
            $cust_count = $query->row();
			
			//print_r($cust_count);
			
			return $cust_count->counter;
        }
		
	}
	
	
	public function getrequestfilterlistall()
	{
		
		//echo "TEST";
		//exit;

		$q="all";
		if($q == 'all'){
            $this->db->select('*');
            $this->db->from('requests');
          // $this->db->where('distributorid', $id);          
            // $this->db->order_by("id", "desc");
            $query = $this->db->get();
            $cust_count = $query->result();
			//echo "test1";
			return $cust_count;
       }
       else if($q == 'Complete')
       {
          $this->db->select('*');
          $this->db->from('requests');
         // $this->db->where('ROLE', 27);  
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          $this->db->where("Profile_Status",'Complete');
		  
		  //$this->db->where('distributorid', $id);

          $this->db->order_by("id", "desc");
          $query = $this->db->get();
          $cust_count = $query->result();
			
			return $cust_count;
      
         }	
        else if($q == 'Incomplete')
        {
        $this->db->select('*');
          $this->db->from('requests');
         // $this->db->where('ROLE', 26); 
         // $this->db->where("Profile_Status",'');
          $this->db->where("Profile_Status",NULL); 
		//  $this->db->where('distributorid', $id);
		  
          $this->db->order_by("id", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $cust_count = $query->result();
			
			return $cust_count;
        }
         else         {
            $this->db->select('*');
            $this->db->from('requests');
            //$this->db->where('ROLE', 26);  
//echo "test2=".$id;
//$this->db->where('distributorid', $id);			
            $this->db->order_by("id", "desc");
			
            $query = $this->db->get();
            //$response = $query->result();
            $cust_count = $query->result();
			
			//print_r($cust_count);
			
			return $cust_count;
        }
		
	}
	
	public function getinvoicelist()
	{
		$this->db->select('*');
            $this->db->from('invoice');
           // $this->db->where('ROLE', 27);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
		
		
	}
	
	public function getinvoicelistall()
	{
		$this->db->select('*');
            $this->db->from('invoice');
           // $this->db->where('ROLE', 27);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
		
		
	}
	/*---------------------- addded by papiha on 27_08_2022------------------------------*/
   public function getproduct_details($product_code)
   {
            $this->db->select('*');
            $this->db->from('loanproduct');
            $this->db->where('product_code', $product_code); 
           
            $q = $this->db->get();
            $row = $q->row();
            return  $row;
   }
	
	/*---------------------------------- addded by papiha on 29_08_2022-------------------------------------*/
   public function saveDocuments($data){
      $this->db->insert('distributor_invoice_doc',$data);
      return $this->db->insert_id();
    }
    public function update_request($id, $data){
      $this->db->where('id', $id);
      return $this->db->update('requests',$data);
    }
    public function getscfo()
    {
      $this->db->select('*');
      $this->db->from('USER_DETAILS');
      $this->db->where('ROLE', 28); 
      $q = $this->db->get();
      $row = $q->row();
      return  $row;
    }
    /*---------------------------- addded by papiha on 29_08_2022-------------------------------------*/
    public function getrequestcount_SCFO($q)
	{
		if($q=='')
      {
         $q = 'all';
      }
	 
	  //echo $q;
		if($q == 'all')
      {
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
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
          
          $this->db->order_by("ID", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
			
			 return $cust_count->counter;
      
         }	
        else if($q == 'SCFO Approved')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('status', 'Approved By SCFO');  
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
        
         return $cust_count->counter;
        }
		else if($q == 'Reject By SCFO')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('status', 'Reject By SCFO');  
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
        
         return $cust_count->counter;
        }
		else if($q == 'Approved By Distributor')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
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
         $this->db->where('status', 'SendBack By Distributor');  
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
        
         return $cust_count->counter;
        }
		else if($q == 'SendBack By SCFO')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('status', 'SendBack By SCFO');  
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
        
         return $cust_count->counter;
        }
		else if($q == 'Reject by distributor')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('status', 'Reject by distributor');  
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
        
         return $cust_count->counter;
        }
        else if($q == 'SCFO Rejected')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('status', 'Approve');  
         $this->db->where("scfo_status",'Reject By SCFO');
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
		 
		// echo $this->db->last_query();
        
         return $cust_count->counter;
        }
        
		
	}
   public function getrequestfilter_SCFO($q,$searchValue)
	{
		if($q=='')
      {
         $q = 'all';
      }
	  
	//  echo $q;
     
		if($q == 'all')
      {
            $this->db->select('count(*) as counter');
            $this->db->from('requests');
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
       else if($q == 'SCFO Pendig for approval')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('requests');
          $this->db->where('status', 'Approved By Distributor');    
         
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
		else if($q == 'SCFO Rejected')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
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
		 
		 //echo "TESET";
         return $cust_count->counter;
        }
        else if($q == 'SendBack By SCFO')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('status', 'Approve');  
         $this->db->where("scfo_status",'SendBack By SCFO');
         if($searchValue!='')
         {
            $where = "request_no like '%".$searchValue."%'";
            $this->db->where($where);
         }
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
         //print_r($this->db->last_query());
		 
		 //echo "TESET";
         return $cust_count->counter;
        }
		else if($q == 'Approved By Distributor')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('status', 'Approved By Distributor'); 
if($searchValue!='')
         {
            $where = "invoicenumber like '%".$searchValue."%'";
            $this->db->where($where);
         }		 
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
		 
		 //echo $this->db->last_query();
        
         return $cust_count->counter;
        }
		else if($q == 'SendBack By Distributor')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('status', 'SendBack By Distributor');
if($searchValue!='')
         {
            $where = "invoicenumber like '%".$searchValue."%'";
            $this->db->where($where);
         }		 
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
        
         return $cust_count->counter;
        }
		else if($q == 'Reject by distributor')
        {
         $this->db->select('count(*) as counter');
         $this->db->from('requests');
         $this->db->where('status', 'Reject by distributor'); 
if($searchValue!='')
         {
            $where = "invoicenumber like '%".$searchValue."%'";
            $this->db->where($where);
         }		 
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->row();
		 
		// echo $this->db->last_query();
        
         return $cust_count->counter;
        }
        
		
	}
   public function getrequestfilterlist_SCFO($q,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
	{
		if($q=='')
      {
         $q = 'all';
      }
	  
	 // echo $q;
    
		if($q == 'all')
      {
            $this->db->select('*');
            $this->db->from('requests');
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
       else if($q == 'SCFO Pendig for approval')
       {
          $this->db->select('*');
          $this->db->from('requests');
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
             
          return $response;
      
         }	
        else if($q == 'SCFO Approved')
        {
         $this->db->select('*');
         $this->db->from('requests');
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
			
			//print_r($response);
			
			//echo $this->db->last_query();
			
			//exit;
               
            return $response;
        }
        else if($q == 'Reject By SCFO')
        {
         $this->db->select('*');
         $this->db->from('requests');
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
               
            return $response;
        }
		else if($q == 'SendBack By SCFO')
        {
         $this->db->select('*');
         $this->db->from('requests');
         $this->db->where("status",'SendBack By SCFO');
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
		else if($q == 'Approved By Distributor')
        {
         $this->db->select('*');
         $this->db->from('requests');
         $this->db->where('status', 'Approved By Distributor'); 
if($searchValue!='')
         {
            $where = "invoicenumber like '%".$searchValue."%'";
            $this->db->where($where);
         }		 
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->result();
		 
		 //echo $this->db->last_query();
        
         return $cust_count;
        }
		else if($q == 'SendBack By Distributor')
        {
         $this->db->select('*');
         $this->db->from('requests');
         $this->db->where('status', 'SendBack By Distributor'); 
if($searchValue!='')
         {
            $where = "invoicenumber like '%".$searchValue."%'";
            $this->db->where($where);
         }		 
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->result();
        
         return $cust_count;
        }
		else if($q == 'Reject by distributor')
        {
         $this->db->select('*');
         $this->db->from('requests');
         $this->db->where('status', 'Reject by distributor');
if($searchValue!='')
         {
            $where = "invoicenumber like '%".$searchValue."%'";
            $this->db->where($where);
         }		 
         $this->db->order_by("ID", "desc");
         $query = $this->db->get();
         $cust_count = $query->result();  
        //echo $this->db->last_query();
         return $cust_count;
        }
        
		
	}
	public function invoice_image($requestid)
   {
         $this->db->select('*');
         $this->db->from('distributor_invoice_doc');
         $this->db->where('request_id', $requestid); 
         $query = $this->db->get();
         $cust_count = $query->row();
         return $cust_count;
   }
   public function get_invoice_doc($id){
      $this->db->select('*');
      $this->db->from('distributor_invoice_doc');
      $this->db->where('request_id', $id);
      $q = $this->db->get();
      $row = $q->row();
     return $row;
     //$executedQuery = $this->db->last_query();
    //print_r($executedQuery);
    }
    /*---------------------- added by papiha on 30_08_2022-----------------------------------------*/
    public function delete_invoice_doc($data){      
      return $this->db->delete('distributor_invoice_doc', $data); 
    
    }
    public function getretailerlist_distributor_wise($id)
	{
		      $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 27);  
            $this->db->where('distributor_id', $id);        
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
		
		
	}
	
	public function getProductData($id)
{
  $this->db->select('*');
            $this->db->from('loanproduct');
            $this->db->where('id', $id); 
           
            $q = $this->db->get();
            $row = $q->row();
            return  $row;
}
	
	
}
?>