<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payments_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
	
	public function savemandate($data){
      $this->db->insert('mandate',$data);
	  // $this->db->last_query();
	  
	 // exit;
      return $this->db->insert_id();
    }
	
	public function getMandateData($id){
		
		//echo $id;
		//echo "I am here";
      $this->db->select('*');
      $this->db->from('mandate');
      $this->db->where('id', $id);
      $q = $this->db->get();
      $row = $q->row();
	  
	 // echo $this->db->last_query();
	  
	// print_r($row);
      return $row;
    }
	
	public function getMandateLink($id){
		
		//echo $id;
		//echo "I am here";
      $this->db->select('*');
      $this->db->from('mandate');
      $this->db->where('txnId', $id);
      $q = $this->db->get();
      $row = $q->row();
	  
	 // echo $this->db->last_query();
	  
	// print_r($row);
      return $row;
    }
	
	
	public function saveresponse($data){
      $this->db->insert('jsonresponse',$data);
      return $this->db->insert_id();
    }
	
	
	public function getMandateList(){
		
		//echo "I am here";
      $this->db->select('*');
      $this->db->from('mandate');
	  
	  $this->db->order_by("id", "desc");
      //$this->db->where('txnId', $id);
      $result = $this->db->get();
      $row = $result->result();
      return $row;
    }
	
	public function getResponseList(){
		
		//echo "I am here";
      $this->db->select('*');
      $this->db->from('jsonresponse');
      //$this->db->where('txnId', $id);
	  
	  $this->db->order_by("id", "desc");
      $result = $this->db->get();
      $row = $result->result();
      return $row;
    }
	
	
	public function getPaymentsDetails($id){
		
		//echo "I am here";
      $this->db->select('*');
      $this->db->from('payments');
      $this->db->where('id', $id);
      $result = $this->db->get();
      $row = $result->row();
      return $row;
    }
	
	
	public function getPaymentsList(){
		
		//echo "I am here";
      $this->db->select('*');
      $this->db->from('payments');
      //$this->db->where('txnId', $id);
      $result = $this->db->get();
      $row = $result->result();
      return $row;
    }
	
	
	public function savepayment($data){
		
		//print_r($data);
		
		//exit;
      $this->db->insert('payments',$data);
      return $this->db->insert_id();
    }
	
	
	public function gettransactionfilter()
	{
		$this->db->select('count(*) as counter');
            $this->db->from('payments');
           //$this->db->where('retailerid', $id);          
            $this->db->order_by("id", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			//echo "test1";
			return $cust_count->counter;
		
		
	}
	
	
	public function getrequestfilter($id)
	{
		
		//echo "TEST";
		//exit;
		
		$q = 'all';
		if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('mandate');
           //$this->db->where('retailerid', $id);          
            $this->db->order_by("id", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			//echo "test1";
			return $cust_count->counter;
       }
       else if($q == 'Complete')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('mandate');
         // $this->db->where('ROLE', 27);  
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          //$this->db->where("Profile_Status",'Complete');
		  
		  //$this->db->where('retailerid', $id);

          $this->db->order_by("id", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
			
			return $cust_count->counter;
      
         }	
        else if($q == 'Incomplete')
        {
        $this->db->select('count(*) as counter');
          $this->db->from('mandate');
         // $this->db->where('ROLE', 26); 
         // $this->db->where("Profile_Status",'');
         // $this->db->where("Profile_Status",NULL); 
		 // $this->db->where('retailerid', $id);
		  
          $this->db->order_by("ID", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $cust_count = $query->row();
			
			return $cust_count->counter;
        }
         else         {
            $this->db->select('count(*) as counter');
            $this->db->from('mandate');
            //$this->db->where('ROLE', 26);  
//echo "test2=".$id;
//$this->db->where('retailerid', $id);			
            $this->db->order_by("ID", "desc");
			
            $query = $this->db->get();
            //$response = $query->result();
            $cust_count = $query->row();
			
			//print_r($cust_count);
			
			return $cust_count->counter;
        }
		
	}
	
	
	public function gettransactioncount($userid)
	{
		
		$this->db->select('count(*) as counter');
            $this->db->from('payments');
           //$this->db->where('retailerid', $id);          
            $this->db->order_by("id", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			//echo "test1";
			return $cust_count->counter;
		
	}
	
	
	public function getrequestcount($id)
	{
		
		//echo "TEST";
		//exit;
		$q = 'all';
		if($q == 'all'){
            $this->db->select('count(*) as counter');
            $this->db->from('mandate');
           //$this->db->where('retailerid', $id);          
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $cust_count = $query->row();
			//echo "test1";
			return $cust_count->counter;
       }
       else if($q == 'Complete')
       {
          $this->db->select('count(*) as counter');
          $this->db->from('mandate');
         // $this->db->where('ROLE', 27);  
          // $this->db->where("PROFILE_PERCENTAGE",'100');
          //$this->db->where("Profile_Status",'Complete');
		  
		  //$this->db->where('retailerid', $id);

          $this->db->order_by("id", "desc");
          $query = $this->db->get();
          $cust_count = $query->row();
			
			return $cust_count->counter;
      
         }	
        else if($q == 'Incomplete')
        {
        $this->db->select('count(*) as counter');
          $this->db->from('mandate');
         // $this->db->where('ROLE', 26); 
         // $this->db->where("Profile_Status",'');
         // $this->db->where("Profile_Status",NULL); 
		 // $this->db->where('retailerid', $id);
		  
          $this->db->order_by("id", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
          $query = $this->db->get();
          $cust_count = $query->row();
			
			return $cust_count->counter;
        }
         else         {
            $this->db->select('count(*) as counter');
            $this->db->from('mandate');
            //$this->db->where('ROLE', 26);  
//echo "test2=".$id;
//$this->db->where('retailerid', $id);			
            $this->db->order_by("id", "desc");
			
            $query = $this->db->get();
            //$response = $query->result();
            $cust_count = $query->row();
			
			//print_r($cust_count);
			
			return $cust_count->counter;
        }
		
	}
	
	
	public function gettransactionfilterlist($id,$row,$rowperpage)
	{
		 $this->db->select('*');
            $this->db->from('payments');
           //$this->db->where('id', $id);          
            $this->db->order_by("id", "desc");
			$this->db->limit($rowperpage, $row);
            $query = $this->db->get();
            $cust_count = $query->result();
			//echo "test1";
			return $cust_count;
		
	}
	
	
	public function getrequestfilterlist($id,$row,$rowperpage)
	{
		
		//echo "TEST";
		//exit;
		$q = 'all';
		if($q == 'all'){
            $this->db->select('*');
            $this->db->from('mandate');
           //$this->db->where('id', $id);          
            $this->db->order_by("id", "desc");
			$this->db->limit($rowperpage, $row);
            $query = $this->db->get();
            $cust_count = $query->result();
			//echo "test1";
			return $cust_count;
       }
       else if($q == 'Complete')
       {
          $this->db->select('*');
          $this->db->from('mandate');
         // $this->db->where('ROLE', 27);  
          // $this->db->where("PROFILE_PERCENTAGE",'100');
         // $this->db->where("Profile_Status",'Complete');
		  
		  //$this->db->where('id', $id);
$this->db->limit($rowperpage, $row);
          $this->db->order_by("id", "desc");
          $query = $this->db->get();
          $cust_count = $query->result();
			
			return $cust_count;
      
         }	
        else if($q == 'Incomplete')
        {
        $this->db->select('*');
          $this->db->from('mandate');
         // $this->db->where('ROLE', 26); 
         // $this->db->where("Profile_Status",'');
        //  $this->db->where("Profile_Status",NULL); 
		  //$this->db->where('id', $id);
		  
          $this->db->order_by("id", "desc");
         //$this->db->where("PROFILE_PERCENTAGE!=",'100');
		 $this->db->limit($rowperpage, $row);
          $query = $this->db->get();
          $cust_count = $query->result();
			
			return $cust_count;
        }
         else         {
            $this->db->select('*');
            $this->db->from('mandate');
            //$this->db->where('ROLE', 26);  
//echo "test2=".$id;
//$this->db->where('id', $id);			
            $this->db->order_by("id", "desc");
			$this->db->limit($rowperpage, $row);
            $query = $this->db->get();
            //$response = $query->result();
            $cust_count = $query->result();
			
			//print_r($cust_count);
			
			//exit;
			
			return $cust_count;
        }
		
	}
	
	
}
	
?>