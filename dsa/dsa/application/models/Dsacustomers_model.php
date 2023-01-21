<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DsaCustomers_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

  /* function getCustomers($dsa_id, $filter, $userType, $userType2, $date)
    {
		
        $response = array();

        $this->db->select('*');
        $this->db->where("ROLE", 1);
        if ($date!='') {
            $this->db->like("CREATED_AT", $date, 'both');
        }
       
        
       
    
        if($userType == 'DSA')
		{
           $where = "DSA_ID='".$dsa_id."' OR Refer_By='".$dsa_id."' AND ROLE=1";
		    
            $this->db->where($where);
            if($filter == 'self'){
                $this->db->where("MANAGER_ID", '0');
                $this->db->where("CSR_ID", '0');
            }
            if($filter == 'consent')
            {
                 $this->db->where("customer_consent", 'true');
            }
            
        }else if($userType == 'DSA_MANAGER') {        
            $this->db->where("MANAGER_ID", $dsa_id);
			$this->db->or_where('Refer_By', $dsa_id);
            if($filter == 'self')$this->db->where("CSR_ID", '0');
        }else if($userType == 'DSA_CSR') {     
            $this->db->where("CSR_ID", $dsa_id);
			$this->db->or_where('Refer_By', $dsa_id);
        }else if($userType == 'NONE' && $userType2 == 'csr') {  
            //it calls when manager or DSA see CSR's customers from his profile   
            $this->db->where("CSR_ID", $dsa_id);
			$this->db->or_where('Refer_By', $dsa_id);
        }else if($userType == 'NONE' && $userType2 == 'manager') {  
            //it calls when DSA see MANAGERS's customers from his profile   
            $this->db->where("MANAGER_ID", $dsa_id);
			$this->db->or_where('Refer_By', $dsa_id);
        }
        else if($userType == 'branch_manager') 
		{
           // $where = "BM_ID='".$dsa_id."' OR Refer_By='".$dsa_id."'";	
			if($filter == 'Complete')
			{     
				$this->db->where("PROFILE_PERCENTAGE",'100');
				$where = "BM_ID='".$dsa_id."' OR Refer_By='".$dsa_id."' AND ROLE=1 AND PROFILE_PERCENTAGE='100'";
				
				$this->db->where($where);
			}
			else  if($filter == 'Incomplete') 
			{ 
				$this->db->where("PROFILE_PERCENTAGE!=",'100');
				$where = "BM_ID='".$dsa_id."' OR Refer_By='".$dsa_id."' AND ROLE=1 AND PROFILE_PERCENTAGE!='100'";
				$this->db->where($where);
			}
			else{
				$where = "BM_ID='".$dsa_id."' OR Refer_By='".$dsa_id."' AND ROLE=1";
				
				$this->db->where($where);
			}
				
			
        }
		else if($userType == 'Relationship_Officer') 
		{     
            if($filter == 'Complete')
			{     
				$this->db->where("PROFILE_PERCENTAGE",'100');
				$where = "RO_ID='".$dsa_id."' OR Refer_By='".$dsa_id."' AND ROLE=1 AND PROFILE_PERCENTAGE='100'";
				
				$this->db->where($where);
			}
			else  if($filter == 'Incomplete') 
			{ 
				$this->db->where("PROFILE_PERCENTAGE!=",'100');
				$where = "RO_ID='".$dsa_id."' OR Refer_By='".$dsa_id."' AND ROLE=1 AND PROFILE_PERCENTAGE!='100'";
				$this->db->where($where);
			}
			else{
				$where = "RO_ID='".$dsa_id."' OR Refer_By='".$dsa_id."' AND ROLE=1";
				
				$this->db->where($where);
			}
        }
       
        
        else if($userType == 'ADMIN') {     
            
        }
        else
        $this->db->where("ROLE", 1);   
        $q = $this->db->from('USER_DETAILS');
        $this->db->order_by("ID", "desc");
        $response = $q->get()->result();
        //echo $this->db->last_query();
		//exit;
        return $response;
    }*/

      


      
 
    function getCustomers_more(){

    $this->db->select('*');
    $this->db->where("ROLE", 1);
	$q = $this->db->from('USER_DETAILS');
    $this->db->order_by("ID", "desc");
	$i=1;
    $customers = $q->get()->result();
				foreach($customers as $customer)
			{
				//echo $customer->UNIQUE_CODE;
				//echo '<br>';
				$this->db->select('*');
                $this->db->where("CUST_ID", $customer->UNIQUE_CODE);
				$this->db->where("CUST_ID", $customer->UNIQUE_CODE);
				$q=$this->db->from('CUSTOMER_MORE_DETAILS');
				$query = $q->get()->result_array();
				$response[$i]=$query;
		        $i++;
                //$this->join('customer_more_details', 'customer_more_details.CUST_ID= USER_DETAILS.UNIQUE_CODE');
			}
			
    /*$this->db->select('*');
    $this->db->from('USER_DETAILS');
    $this->db->where("ROLE", 1);
    $this->join('customer_more_details', 'customer_more_details.CUST_ID= USER_DETAILS.UNIQUE_CODE');
    $this->db->order_by("ID", "desc");
    $response = $this->result();*/
    
    return $response;
  }
  
  


  function leadinfo($id)
  {
	  
	  $this->db->select('*');
      $this->db->from('register');
      $this->db->where('id', $id);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
  }

  function getLoans($dsa_id, $limit, $start){
    $response = array();
    $query = $this->db->select('t1.*, t2.*')
     ->from('USER_DETAILS as t1')
     //->limit($limit, $start)
     ->where('t1.DSA_ID', $dsa_id)
     ->join('CUSTOMER_APPLIED_LOANS as t2', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
     ->order_by("t2.ID", "desc")
     ->get();
    $response = $query->result();
    return $response;
  }

  function getLoansManager($dsa_id, $limit, $start){
    $response = array();
    $query = $this->db->select('t1.*, t2.*')
     ->from('USER_DETAILS as t1')
     ->limit($limit, $start)
     ->where('t1.MANAGER_ID', $dsa_id)
     ->join('CUSTOMER_APPLIED_LOANS as t2', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
     ->order_by("t2.ID", "desc")
     ->get();
    $response = $query->result();
    return $response;
  }

  function getLoansDsa($dsa_id, $limit, $start){
    $response = array();
    $query = $this->db->select('t1.*, t2.*')
     ->from('USER_DETAILS as t1')
     ->limit($limit, $start)
     ->where('t1.CSR_ID', $dsa_id)
     ->join('CUSTOMER_APPLIED_LOANS as t2', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
     ->order_by("t2.ID", "desc")
     ->get();
    $response = $query->result();
    return $response;
  }

  public function get_count($dsa_id) {
        return $this->db->select('t1.*, t2.*')
         ->from('USER_DETAILS as t1')        
         ->where('t1.DSA_ID', $dsa_id)
         ->join('APPLIED_LOANS as t2', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
         ->count_all_results();
    }
 //====================================================================================

   public function getCustomers_coapplicants($id)
   {
    $this->db->select('*');
    $this->db->where("CUST_ID",$id);   
    $q = $this->db->from('COAPPLICANT_DETAILS');
    $this->db->order_by("ID", "desc");
    $response = $q->get()->result();
    return $response;
   }

   function get_customer_applied_loan($dsa_id,$q)
   {

           if($q == 'all')
        {
            $response = array();
            $query = $this->db->select('t1.*, t2.*')
            ->from('USER_DETAILS as t1')
            //->limit($limit, $start)
            ->where('t2.LOAN_TYPE !=', NULL)
            ->where('t1.DSA_ID', $dsa_id)
            ->join('CUSTOMER_APPLIED_LOANS as t2', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
            ->order_by("t2.ID", "desc")
            ->get();
            $response = $query->result();
            return $response;	 
        }
       if($q == 'business'){
            $response = array();
            $query = $this->db->select('t1.*, t2.*')
            ->from('USER_DETAILS as t1')
            //->limit($limit, $start)
            ->where('t2.LOAN_TYPE','business')
            ->where('t1.DSA_ID', $dsa_id)
            ->join('CUSTOMER_APPLIED_LOANS as t2', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
            ->order_by("t2.ID", "desc")
            ->get();
            $response = $query->result();
            return $response;
        }
       if($q == 'personal'){
            $response = array();
            $query = $this->db->select('t1.*, t2.*')
            ->from('USER_DETAILS as t1')
            ->where('t2.LOAN_TYPE','personal')
            ->where('t1.DSA_ID', $dsa_id)
            ->join('CUSTOMER_APPLIED_LOANS as t2', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
            ->order_by("t2.ID", "desc")
            ->get();
            $response = $query->result();
            return $response;
        }
       if($q == 'credit'){   
            $response = array();
            $query = $this->db->select('t1.*, t2.*')
            ->from('USER_DETAILS as t1')
            ->where('t2.LOAN_TYPE','credit')
            ->where('t1.DSA_ID', $dsa_id)
            ->join('CUSTOMER_APPLIED_LOANS as t2', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
            ->order_by("t2.ID", "desc")
            ->get();
            $response = $query->result();
            return $response; 	
        }
         if($q == 'home'){
            $response = array();
            $query = $this->db->select('t1.*, t2.*')
            ->from('USER_DETAILS as t1')
            ->where('t2.LOAN_TYPE','home')
            ->where('t1.DSA_ID', $dsa_id)
            ->join('CUSTOMER_APPLIED_LOANS as t2', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
            ->order_by("t2.ID", "desc")
            ->get();
            $response = $query->result();
            return $response; 	
       }
       if($q == 'lap'){ 
            $response = array();
            $query = $this->db->select('t1.*, t2.*')
            ->from('USER_DETAILS as t1')
            ->where('t2.LOAN_TYPE','lap')
            ->where('t1.DSA_ID', $dsa_id)
            ->join('CUSTOMER_APPLIED_LOANS as t2', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
            ->order_by("t2.ID", "desc")
            ->get();
            $response = $query->result();
            return $response;
       }
     
   }

   // ------------------------------added by papiha --------------------------
   function getCustomer_created_by()
   {
       $this->db->select('UNIQUE_CODE,FN,LN');
       $this->db->where("ROLE !=",1);
       $q = $this->db->from('USER_DETAILS');
       $response = $q->get()->result();
        return $response;
   }
    //-------------Added by papiha on 1_12_2021----------------------------------------
    function get_DSA($BM_ID)
    {
        $this->db->select('UNIQUE_CODE');
        $this->db->where("ROLE",2);
        $this->db->where("BM_ID",$BM_ID);
        $q = $this->db->from('USER_DETAILS');
        $response = $q->get()->result();
         return $response;
    }
     function get_Connector($BM_ID)
    {
        $this->db->select('UNIQUE_CODE');
        $this->db->where("ROLE",4);
        $this->db->where("BM_ID",$BM_ID);
        $q = $this->db->from('USER_DETAILS');
        $response = $q->get()->result();
         return $response;
    }
     function get_Relationship_Officer($BM_ID)
    {
        $this->db->select('UNIQUE_CODE');
        $this->db->where("ROLE",14);
        $this->db->where("BM_ID",$BM_ID);
        $q = $this->db->from('USER_DETAILS');
        $response = $q->get()->result();
         return $response;
    }
    function get_Assign_Lead($dsa_id, $filter, $userType, $userType2, $date)
    {
          $response = array();
     
         $this->db->select('*');
         
        /* if ($date!='') {
             $this->db->like("CREATED_AT", $date, 'both');
         }*/
 
         if($userType == 'DSA'){
             $this->db->where("Lead_Assign_To", $dsa_id);
             if($filter == 'self'){
                 $this->db->where("MANAGER_ID", '0');
                 $this->db->where("CSR_ID", '0');
             }
             if($filter == 'Converted'){
                 $this->db->where("status", 'Convert to Customer');
                 
             }
             if($filter == 'Hold')
             {
                 $this->db->where("status", 'Hold');
             }
             if($filter == 'Reject')
             {
                 $this->db->where("status", 'Reject');
             }
         }
         else  if($userType == 'connector'){
             $this->db->where("Lead_Assign_To", $dsa_id);
             if($filter == 'self'){
                 $this->db->where("MANAGER_ID", '0');
                 $this->db->where("CSR_ID", '0');
                 $this->db->where("DSA_ID", '0');
             }
             if($filter == 'Converted'){
                 $this->db->where("status", 'Convert to Customer');
                 
             }
             if($filter == 'Hold')
             {
                 $this->db->where("status", 'Hold');
             }
             if($filter == 'Reject')
             {
                 $this->db->where("status", 'Reject');
             }
         }
        else if($userType == 'DSA_MANAGER') {        
             $this->db->where("Lead_Assign_To", $dsa_id);
            if($filter == 'self'){
               
                 $this->db->where("CSR_ID", '0');
             }
             if($filter == 'Converted'){
                 $this->db->where("status", 'Convert to Customer');
                 
             }
             if($filter == 'Hold')
             {
                 $this->db->where("status", 'Hold');
             }
             if($filter == 'Reject')
             {
                 $this->db->where("status", 'Reject');
             }
         }
         else if($userType == 'branch_manager') {        
             $this->db->where("Lead_Assign_To", $dsa_id);
             
             if($filter == 'Converted'){
                 $this->db->where("status", 'Convert to Customer');
                 
             }
             if($filter == 'Hold')
             {
                 $this->db->where("status", 'Hold');
             }
             if($filter == 'Reject')
             {
                 $this->db->where("status", 'Reject');
             }
             
         }else if($userType == 'Relationship_Officer') { 
             
             $this->db->where("Lead_Assign_To", $dsa_id);
             //$this->db->where("Lead_Assign_To", 'NULL');
            if($filter == 'self'){
               
                 $this->db->where("CSR_ID", '0');
             }
             if($filter == 'Converted'){
                 $this->db->where("status", 'Convert to Customer');
                 
             }
             if($filter == 'Hold')
             {
                 $this->db->where("status", 'Hold');
             }
             if($filter == 'Reject')
             {
                 $this->db->where("status", 'Reject');
             }
         }
         else if($userType == 'DSA_CSR') {     
             $this->db->where("Lead_Assign_To", $dsa_id);
         }
         $q = $this->db->from('register');
         $this->db->order_by("id", "desc");
         $response = $q->get()->result();
         return $response;
     } /*-----------------------------------------------Added by papiha  on 20-12-2021--------------------------------------------------------*/
     function getLead_user($dsa_id,$userType){
         
     $response = array();
     
     $this->db->select('*');
     
    /* if ($date!='') {
         $this->db->like("CREATED_AT", $date, 'both');
     }*/
 
     if($userType == 'DSA'){
         $this->db->where("DSA_ID", $dsa_id);
         
     }
     else if($userType == 'Relationship_officer') {        
         $this->db->where("RO_ID", $dsa_id);
        
     }
     else if($userType == 'Connector') {        
        $this->db->where("CONNECTOR_ID", $dsa_id);
       
    }
     $q = $this->db->from('register');
     $this->db->order_by("id", "desc");
     $response = $q->get()->result();
     
     return $response;
   }
   function get_Assign_Lead_user($dsa_id)
     {
         $response = array();
      
          $this->db->select('*');
          $this->db->where("Lead_Assign_To", $dsa_id);
          $q = $this->db->from('register');
          $this->db->order_by("id", "desc");
          $response = $q->get()->result();
          return $response;
      }
      /*-----------------------------------Added by papiha on 26_02_2022 ------------------------------------*/
    function getCustomers($id, $filter, $userType, $userType2, $date)
    {
       // echo $userType;
        if($userType=='Relationship_officer')
        {
            $userType = 'Relationship_Officer';
        }
       // exit;
        
       /* if($userType=='ADMIN')
		{
            $this->db->select('*');
			  
            $this->db->where("ROLE", 1);   
            $this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->order_by("USER_DETAILS.ID", "desc");
            $query = $this->db->get()->result();
        
           return $query;
		}*/
        /*if($userType=='ADMIN')
            {
                        $this->db->select('*');
            
                        $this->db->where("ROLE", 1);
                        //$where = "CREATED_AT <= ".$this->input->post('End_Date')." AND CREATED_AT >= ".$this->input->post('End_Date');
                        //          $this->db->where($where);
                        if(isset($_REQUEST['Start_Date']) && $_REQUEST['Start_Date'] != '')
                        {
                        //$this->db->where("CREATED_AT BETWEEN '".$this->input->post('Start_Date')."' AND '".$this->input->post('End_Date')."'");
                        $this->db->where('CREATED_AT >=',$this->input->post('Start_Date'));
                        }

                        if(isset($_REQUEST['End_Date']) &&  $_REQUEST['End_Date'] != '')
                        {
                        //$this->db->where("CREATED_AT BETWEEN '".$this->input->post('Start_Date')."' AND '".$this->input->post('End_Date')."'");
                        $this->db->where('CREATED_AT <=',$this->input->post('End_Date'));
                        }

                        if(isset($_REQUEST['select_filters']) && $_REQUEST['select_filters'] != '')
                        {

                        $this->db->where('STATUS',$this->input->post('select_filters'));

                        }


                                    $this->db->from('USER_DETAILS');
                                    $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                                    $this->db->order_by("USER_DETAILS.ID", "desc");
                                    $query = $this->db->get()->result();

                        //echo "I am hfdd";

                        // echo    $sql = $this->db->last_query();

                        //exit;
                        //exit;
                            
                                return $query;
            }*/
            if($userType=='ADMIN')
            {
                        $this->db->select('USER_DETAILS.*,CUSTOMER_MORE_DETAILS.STATUS,CUSTOMER_MORE_DETAILS.last_updated_date');
             
                        $this->db->where("ROLE", 1);
            
            if(isset($_REQUEST['Start_Date']) && $_REQUEST['Start_Date'] != '')
            {
            
             $this->db->where("DATE_FORMAT(CUSTOMER_MORE_DETAILS.last_updated_date,'%Y-%m-%d') >=",$this->input->post('Start_Date'));
            }
            
            if(isset($_REQUEST['End_Date']) &&  $_REQUEST['End_Date'] != '')
            {
            
             $this->db->where("DATE_FORMAT(CUSTOMER_MORE_DETAILS.last_updated_date,'%Y-%m-%d') <=",$this->input->post('End_Date'));
            }
            
            
            
            if(isset($_REQUEST['select_filters']) && $_REQUEST['select_filters'] != '')
            {
            
             $this->db->where('CUSTOMER_MORE_DETAILS.STATUS',$this->input->post('select_filters'));
            
            }
            
            
                        $this->db->from('USER_DETAILS');
                        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                        $this->db->order_by("USER_DETAILS.ID", "desc");
                        $query = $this->db->get()->result();
            
            
                   
                    return $query;
            }


        if($userType=='Legal')
		{
			$Combine_Customers=array();
            $this->db->select('*');
			  
            $this->db->where("ROLE", 1); 
            $this->db->where("Legal_id", $id);			
            $this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->order_by("USER_DETAILS.ID", "desc");
            $query = $this->db->get()->result();
			$array = json_decode(json_encode($query), true);
		    foreach($array as $user)
                        {
                        array_push($Combine_Customers,$user);
                        }
        
          
            return $Combine_Customers;
		}
       else if($userType=='Technical')
		{
			$Combine_Customers=array();
            $this->db->select('*');
			  
            $this->db->where("ROLE", 1); 
            $this->db->where("Technical_id", $id);			
            $this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->order_by("USER_DETAILS.ID", "desc");
            $query = $this->db->get()->result();
			$array = json_decode(json_encode($query), true);
		    foreach($array as $user)
                        {
                        array_push($Combine_Customers,$user);
                        }
        
          
            return $Combine_Customers;
		}
       else if($userType=='credit_manager_user')
        {
            $Combine_Customers=array();	
			    $this->db->select('*');
                $this->db->from('USER_DETAILS');
			    $this->db->where("ROLE", 1);   
                $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                $this->db->order_by("USER_DETAILS.ID", "desc");
				$Customers = $this->db->get()->result();
                $array = json_decode(json_encode($Customers), true);
                foreach($array as $user)
                            {
                            array_push($Combine_Customers,$user);
                            }
                            return $Combine_Customers;
			
        }
        else  if($userType=='Cluster_Manager')
		{
		    $Combine_Customers=array();	
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=1 AND CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=1";
			$this->db->where($where);
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->order_by("USER_DETAILS.ID", "desc");
			
			$Customers =$this->db->get()->result();
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
				$where = "ROLE=1 AND BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=1";
				$this->db->where($where);
               // $this->db->order_by("ID", "desc");
                $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                $this->db->order_by("USER_DETAILS.ID", "desc");
                
                $Customers1 =$this->db->get()->result();
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
					$where = "ROLE=1 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=1";
					$this->db->where($where);
                   // $this->db->order_by("ID", "desc");
                    $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                    $this->db->order_by("USER_DETAILS.ID", "desc");
                    
                    $Customers2 =$this->db->get()->result();
					$array2 = json_decode(json_encode($Customers2), true);
				    foreach($array2 as $user2)
                        {
                        array_push($Combine_Customers,$user2);
                        }
						$this->db->select('*');
						$this->db->from('USER_DETAILS');
						$where = "ROLE=2 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
						$this->db->where($where);
						$query = $this->db->get();
						$DSAS = $query->result();
						foreach($DSAS as $DSA)
				         {
							$this->db->select('*');
							$this->db->from('USER_DETAILS');
							$where = "ROLE=1 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=1";
							$this->db->where($where);
                            //$this->db->order_by("ID", "desc");
							$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                            $this->db->order_by("USER_DETAILS.ID", "desc");
                    
                            $Customers3 =$this->db->get()->result();
							$array3 = json_decode(json_encode($Customers3), true);
							foreach($array3 as $user3)
								{
								array_push($Combine_Customers,$user3);
								}
								
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
		}/*
        else  if($userType=='Sales_Manager')
		{
			  $Combine_Customers=array();	
			    $this->db->select('*');
				$this->db->from('USER_DETAILS');
				$where = "ROLE=1 AND SELES_ID='".$id."' OR Refer_By='".$id."' AND ROLE=1";
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
				$where = "ROLE=14 AND BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=14";
				$this->db->where($where);
				$query = $this->db->get();
				$Relationship_Officer = $query->result();
				foreach($Relationship_Officer as $RO)
				{
					$this->db->select('*');
					$this->db->from('USER_DETAILS');
					$where = "ROLE=1 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=1";
					$this->db->where($where);
					$query = $this->db->get();
					$Customers2 = $query->result();
					$array2 = json_decode(json_encode($Customers2), true);
				    foreach($array2 as $user2)
                        {
                        array_push($Combine_Customers,$user2);
                        }
						$this->db->select('*');
						$this->db->from('USER_DETAILS');
						$where = "ROLE=2 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
						$this->db->where($where);
						$query = $this->db->get();
						$DSAS = $query->result();
						foreach($DSAS as $DSA)
				         {
							$this->db->select('*');
							$this->db->from('USER_DETAILS');
							$where = "ROLE=1 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=1";
							$this->db->where($where);
                            //$this->db->order_by("ID", "desc");
							$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                            $this->db->order_by("USER_DETAILS.ID", "desc");
                    
                            $Customers3 =$this->db->get()->result();
							$array3 = json_decode(json_encode($Customers3), true);
							foreach($array3 as $user3)
								{
								array_push($Combine_Customers,$user3);
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
		}*/
        else if($userType=='Sales_Manager')
		{
			  $Combine_Customers=array();	
			    $this->db->select('*');
				$this->db->from('USER_DETAILS');
				$where = "ROLE=1 AND SELES_ID='".$id."' OR Refer_By='".$id."' AND ROLE=1";
				$this->db->where($where);
				$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                $this->db->order_by("USER_DETAILS.ID", "desc");
                
                $Customers1 =$this->db->get()->result();

				$array1 = json_decode(json_encode($Customers1), true);
				foreach($array1 as $user1)
                        {
                        array_push($Combine_Customers,$user1);
                        }
				$this->db->select('*');
				$this->db->from('USER_DETAILS');
				$where = "ROLE=14 AND BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=14";
				$this->db->where($where);
                $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                $this->db->order_by("USER_DETAILS.ID", "desc");
                
				$query = $this->db->get();
				$Relationship_Officer = $query->result();
				foreach($Relationship_Officer as $RO)
				{
					$this->db->select('*');
					$this->db->from('USER_DETAILS');
					$where = "ROLE=1 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=1";
					$this->db->where($where);
					$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                    $this->db->order_by("USER_DETAILS.ID", "desc");
                    $Customers2 =$this->db->get()->result();
					$array2 = json_decode(json_encode($Customers2), true);
				    foreach($array2 as $user2)
                        {
                        array_push($Combine_Customers,$user2);
                        }
						$this->db->select('*');
						$this->db->from('USER_DETAILS');
						$where = "ROLE=2 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
						$this->db->where($where);
						$query = $this->db->get();
						$DSAS = $query->result();
						foreach($DSAS as $DSA)
				         {
							$this->db->select('*');
							$this->db->from('USER_DETAILS');
							$where = "ROLE=1 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=1";
							$this->db->where($where);
							$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                            $this->db->order_by("USER_DETAILS.ID", "desc");
                            $Customers3 =$this->db->get()->result();
							$array3 = json_decode(json_encode($Customers3), true);
							foreach($array3 as $user3)
								{
								array_push($Combine_Customers,$user3);
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
		}
        else if($userType=='branch_manager')
		{
			  $Combine_Customers=array();	
			    $this->db->select('*');
				$this->db->from('USER_DETAILS');
				$where = "ROLE=1 AND BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=1";
				$this->db->where($where);
				$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                $this->db->order_by("USER_DETAILS.ID", "desc");
                
                $Customers1 =$this->db->get()->result();

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
					$where = "ROLE=1 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=1";
					$this->db->where($where);
					$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                    $this->db->order_by("USER_DETAILS.ID", "desc");
                    $Customers2 =$this->db->get()->result();
					$array2 = json_decode(json_encode($Customers2), true);
				    foreach($array2 as $user2)
                        {
                        array_push($Combine_Customers,$user2);
                        }
						$this->db->select('*');
						$this->db->from('USER_DETAILS');
						$where = "ROLE=2 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
						$this->db->where($where);
						$query = $this->db->get();
						$DSAS = $query->result();
						foreach($DSAS as $DSA)
				         {
							$this->db->select('*');
							$this->db->from('USER_DETAILS');
							$where = "ROLE=1 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=1";
							$this->db->where($where);
							$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                            $this->db->order_by("USER_DETAILS.ID", "desc");
                            $Customers3 =$this->db->get()->result();
							$array3 = json_decode(json_encode($Customers3), true);
							foreach($array3 as $user3)
								{
								array_push($Combine_Customers,$user3);
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
		}
        else if($userType=='Relationship_Officer')
		{
           
			        $Combine_Customers=array();
			        $this->db->select('*');
					$this->db->from('USER_DETAILS');
					$where = "ROLE=1 AND RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=1";
					$this->db->where($where);
					$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                    $this->db->order_by("USER_DETAILS.ID", "desc");
                    $Customers2 =$this->db->get()->result();
					$array2 = json_decode(json_encode($Customers2), true);
				    foreach($array2 as $user2)
                        {
                        array_push($Combine_Customers,$user2);
                        }
						$this->db->select('*');
						$this->db->from('USER_DETAILS');
						$where = "ROLE=2 AND RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";
						$this->db->where($where);
						$query = $this->db->get();
						$DSAS = $query->result();
						foreach($DSAS as $DSA)
				         {
							$this->db->select('*');
							$this->db->from('USER_DETAILS');
							$where = "ROLE=1 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=1";
							$this->db->where($where);
							$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                            $this->db->order_by("USER_DETAILS.ID", "desc");
                            $Customers3 =$this->db->get()->result();
							$array3 = json_decode(json_encode($Customers3), true);
							foreach($array3 as $user3)
								{
								array_push($Combine_Customers,$user3);
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
        else if($userType=='DSA')
		{
			                $Combine_Customers=array();
			                $this->db->select('*');
							$this->db->from('USER_DETAILS');
							$where = "ROLE=1 AND DSA_ID='".$id."' OR Refer_By='".$id."' AND ROLE=1";
							$this->db->where($where);
							$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
                            $this->db->order_by("USER_DETAILS.ID", "desc");
                            $Customers3 =$this->db->get()->result();
							$array3 = json_decode(json_encode($Customers3), true);
							foreach($array3 as $user3)
								{
								array_push($Combine_Customers,$user3);
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
    
                 
    
/*------------------------------------------------------Added by papiha on 28_02_2022----------------------------------------------*/
function getConnector($id, $filter, $userType, $userType2, $date)
{
    if($userType=='ADMIN'|| $userType=='credit_manager_user' ||$userType=='Operations_user' )
    {
         $this->db->select('*');
          
            $this->db->where("ROLE", 4);   
            $q = $this->db->from('USER_DETAILS');
            $this->db->order_by("ID", "desc");
            $response = $q->get()->result();
        
        return $response;
    }
    if($userType=='Cluster_Manager')
    {
        $Combine_Customers=array();	
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $where = "ROLE=4 AND CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4";
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
            $where = "ROLE=4 AND BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=4";
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
                $where = "ROLE=4 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=4";
                $this->db->where($where);
                $query = $this->db->get();
                $Customers2 = $query->result();
                $array2 = json_decode(json_encode($Customers2), true);
                foreach($array2 as $user2)
                    {
                    array_push($Combine_Customers,$user2);
                    }
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $where = "ROLE=2 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
                    $this->db->where($where);
                    $query = $this->db->get();
                    $DSAS = $query->result();
                    foreach($DSAS as $DSA)
                     {
                        $this->db->select('*');
                        $this->db->from('USER_DETAILS');
                        $where = "ROLE=4 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
                        $this->db->where($where);
                        $query = $this->db->get();
                        $Customers3 = $query->result();
                        $array3 = json_decode(json_encode($Customers3), true);
                        foreach($array3 as $user3)
                            {
                            array_push($Combine_Customers,$user3);
                            }
                            
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
        if($userType=='Sales_Manager')
    {
        
         
          $Combine_Customers=array();	
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $where = "ROLE=4 AND SELES_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4";
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
                $where = "ROLE=4 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=4";
                $this->db->where($where);
                $query = $this->db->get();
                $Customers2 = $query->result();
                $array2 = json_decode(json_encode($Customers2), true);
                foreach($array2 as $user2)
                    {
                    array_push($Combine_Customers,$user2);
                    }
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $where = "ROLE=2 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
                    $this->db->where($where);
                    $query = $this->db->get();
                    $DSAS = $query->result();
                    foreach($DSAS as $DSA)
                     {
                        $this->db->select('*');
                        $this->db->from('USER_DETAILS');
                        $where = "ROLE=4 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
                        $this->db->where($where);
                        $query = $this->db->get();
                        $Customers3 = $query->result();
                        $array3 = json_decode(json_encode($Customers3), true);
                        foreach($array3 as $user3)
                            {
                            array_push($Combine_Customers,$user3);
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
    }
    if($userType=='branch_manager')
    {
        
         
          $Combine_Customers=array();	
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $where = "ROLE=4 AND BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4";
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
                $where = "ROLE=4 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=4";
                $this->db->where($where);
                $query = $this->db->get();
                $Customers2 = $query->result();
                $array2 = json_decode(json_encode($Customers2), true);
                foreach($array2 as $user2)
                    {
                    array_push($Combine_Customers,$user2);
                    }
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $where = "ROLE=2 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
                    $this->db->where($where);
                    $query = $this->db->get();
                    $DSAS = $query->result();
                    foreach($DSAS as $DSA)
                     {
                        $this->db->select('*');
                        $this->db->from('USER_DETAILS');
                        $where = "ROLE=4 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
                        $this->db->where($where);
                        $query = $this->db->get();
                        $Customers3 = $query->result();
                        $array3 = json_decode(json_encode($Customers3), true);
                        foreach($array3 as $user3)
                            {
                            array_push($Combine_Customers,$user3);
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
    }
    if($userType=='Relationship_Officer')
    {
                $Combine_Customers=array();
                $this->db->select('*');
                $this->db->from('USER_DETAILS');
                $where = "ROLE=4 AND RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4";
                $this->db->where($where);
                $query = $this->db->get();
                $Customers2 = $query->result();
                $array2 = json_decode(json_encode($Customers2), true);
                foreach($array2 as $user2)
                    {
                    array_push($Combine_Customers,$user2);
                    }
                    $this->db->select('*');
                    $this->db->from('USER_DETAILS');
                    $where = "ROLE=2 AND RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";
                    $this->db->where($where);
                    $query = $this->db->get();
                    $DSAS = $query->result();
                    foreach($DSAS as $DSA)
                     {
                        $this->db->select('*');
                        $this->db->from('USER_DETAILS');
                        $where = "ROLE=4 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
                        $this->db->where($where);
                        $query = $this->db->get();
                        $Customers3 = $query->result();
                        $array3 = json_decode(json_encode($Customers3), true);
                        foreach($array3 as $user3)
                            {
                            array_push($Combine_Customers,$user3);
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
    if($userType=='DSA')
    {
                        $Combine_Customers=array();
                        $this->db->select('*');
                        $this->db->from('USER_DETAILS');
                        $where = "ROLE=4 AND DSA_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4";
                        $this->db->where($where);
                        $query = $this->db->get();
                        $Customers3 = $query->result();
                        $array3 = json_decode(json_encode($Customers3), true);
                        foreach($array3 as $user3)
                            {
                            array_push($Combine_Customers,$user3);
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
/*-----------------------------------Added by papiha on 02_03-2022-----------------------------------------------------*/
             

function getLead($dsa_id, $filter, $userType, $userType2, $date){
		
    $response = array();
    if($userType=='ADMIN')
    {
        $this->db->select('*');
		$this->db->from('register');
        $query = $this->db->get();
        $Customers = $query->result();
        return $Customers;
    }
    
    if($userType=='credit_manager_user'|| $userType=='Operations_user')
    {
        $Combine_Customers=array();	
        $this->db->select('*');
       $this->db->from('register');
       // $where = "CM_ID='".$dsa_id."'";
        //$this->db->where($where);
        $query = $this->db->get();
        $Customers = $query->result();
        $array = json_decode(json_encode($Customers), true);
        foreach($array as $user)
                    {
                    array_push($Combine_Customers,$user);
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
    
 
else if($userType=='Cluster_Manager')
		{ 
	        
		    $Combine_Customers=array();	
			$this->db->select('*');
			$this->db->from('register');
		    $where = "CM_ID='".$dsa_id."'";
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
			$where = "ROLE=13 AND CM_ID='".$dsa_id."' OR Refer_By='".$dsa_id."' AND ROLE=13";
			$this->db->where($where);
			$query = $this->db->get();
			$Branch_Manager = $query->result();
			
			foreach($Branch_Manager as $BM)
			{
				$this->db->select('*');
				$this->db->from('register');
		        $where = "BM_ID='".$BM->UNIQUE_CODE."'";
				//$this->db->from('USER_DETAILS');
               // $where = "ROLE=4 AND BM_ID='".$BM->UNIQUE_CODE."' OR Refer_By='".$BM->UNIQUE_CODE."' AND ROLE=4";
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
					//$this->db->from('USER_DETAILS');
					//$where = "ROLE=4 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=4";
					$this->db->from('register');
		            $where = "RO_ID='".$RO->UNIQUE_CODE."'";
					$this->db->where($where);
					$query = $this->db->get();
					$Customers2 = $query->result();
					$array2 = json_decode(json_encode($Customers2), true);
				    foreach($array2 as $user2)
                        {
                        array_push($Combine_Customers,$user2);
                        }
					
						$this->db->select('*');
						$this->db->from('USER_DETAILS');
						$where = "ROLE=2 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
						$this->db->where($where);
						$query = $this->db->get();
						$DSAS = $query->result();
						foreach($DSAS as $DSA)
				         {
							$this->db->select('*');
							//$this->db->from('USER_DETAILS');
							//$where = "ROLE=4 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
							$this->db->from('register');
		                    $where = "DSA_ID='".$DSA->UNIQUE_CODE."'";
							$this->db->where($where);
							$query = $this->db->get();
							$Customers3 = $query->result();
							$array3 = json_decode(json_encode($Customers3), true);
							foreach($array3 as $user3)
								{
								array_push($Combine_Customers,$user3);
							
						 }
				}
			}
            $this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=2 AND CM_ID='".$dsa_id."' OR Refer_By='".$dsa_id."' AND ROLE=2";
			$this->db->where($where);
			$query = $this->db->get();
			$DSAS = $query->result();
			
			foreach($DSAS as $DSA)
				        {
							$this->db->select('*');
							//$this->db->from('USER_DETAILS');
							//$where = "ROLE=4 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
							$this->db->from('register');
		                    $where = "DSA_ID='".$DSA->UNIQUE_CODE."'";
							$this->db->where($where);
							$query = $this->db->get();
							$Customers3 = $query->result();
						
							$array3 = json_decode(json_encode($Customers3), true);
							foreach($array3 as $user3)
								{
								array_push($Combine_Customers,$user3);
							
						        }
								$this->db->select('*');
								$this->db->from('USER_DETAILS');
								$where = "ROLE=4 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
								$this->db->where($where);
								$query = $this->db->get();
								$Connectors = $query->result();
								foreach($Connectors as $Connector)
								 {
									$this->db->select('*');
									//$this->db->from('USER_DETAILS');
									//$where = "ROLE=4 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
									$this->db->from('register');
									$where = "Connector_id='".$Connector->UNIQUE_CODE."'";
									$this->db->where($where);
									$query = $this->db->get();
									$Customers4 = $query->result();
									$array4 = json_decode(json_encode($Customers4), true);
									foreach($array4 as $user4)
										{
										array_push($Combine_Customers,$user4);
										}
								 }
						}
						       $this->db->select('*');
								$this->db->from('USER_DETAILS');
								$where = "ROLE=4 AND CM_ID='".$dsa_id."' OR Refer_By='".$dsa_id."' AND ROLE=4";
								$this->db->where($where);
								$query = $this->db->get();
								$Connectors = $query->result();
								foreach($Connectors as $Connector)
								 {
									$this->db->select('*');
									//$this->db->from('USER_DETAILS');
									//$where = "ROLE=4 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
									$this->db->from('register');
									$where = "Connector_id='".$Connector->UNIQUE_CODE."'";
									$this->db->where($where);
									$query = $this->db->get();
									$Customers4 = $query->result();
									$array4 = json_decode(json_encode($Customers4), true);
									foreach($array4 as $user4)
										{
										array_push($Combine_Customers,$user4);
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
		}
    else if($userType == 'DSA'){
        //$this->db->where("DSA_ID", $dsa_id);
		$Combine_Customers=array();	
			    $this->db->select('*');
				$this->db->from('register');
				$where = "DSA_ID='".$dsa_id."'";
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
    else  if($userType == 'connector'){
        $Combine_Customers=array();	
			    $this->db->select('*');
				$this->db->from('register');
				$where = "CONNECTOR_ID='".$dsa_id."'";
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
   else if($userType == 'DSA_MANAGER') {        
        $this->db->where("MANAGER_ID", $dsa_id);

    }
	else if($userType == 'branch_manager') {        
        //$this->db->where("BM_ID", $dsa_id);
		  $Combine_Customers=array();	
			    $this->db->select('*');
				$this->db->from('register');
				$where = "BM_ID='".$dsa_id."'";
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
				$where = "ROLE=14 AND BM_ID='".$dsa_id."' OR Refer_By='".$dsa_id."' AND ROLE=14";
				$this->db->where($where);
				$query = $this->db->get();
				$Relationship_Officer = $query->result();
				foreach($Relationship_Officer as $RO)
				{
					$this->db->select('*');
					$this->db->from('register');
					$where = "RO_ID='".$RO->UNIQUE_CODE."'";
					$this->db->where($where);
					$query = $this->db->get();
					$Customers2 = $query->result();
					$array2 = json_decode(json_encode($Customers2), true);
				    foreach($array2 as $user2)
                        {
                        array_push($Combine_Customers,$user2);
                        }
						$this->db->select('*');
						$this->db->from('USER_DETAILS');
						$where = "ROLE=2 AND RO_ID='".$RO->UNIQUE_CODE."' OR Refer_By='".$RO->UNIQUE_CODE."' AND ROLE=2";
						$this->db->where($where);
						$query = $this->db->get();
						$DSAS = $query->result();
						foreach($DSAS as $DSA)
				         {
							$this->db->select('*');
							$this->db->from('register');
							$where = "DSA_ID='".$DSA->UNIQUE_CODE."'";
							$this->db->where($where);
							$query = $this->db->get();
							$Customers3 = $query->result();
							$array3 = json_decode(json_encode($Customers3), true);
							foreach($array3 as $user3)
								{
								array_push($Combine_Customers,$user3);
								}
								
						 }
				}
                $this->db->select('*');
                $this->db->from('USER_DETAILS');
                $where = "ROLE=2 AND BM_ID='".$dsa_id."' OR Refer_By='".$dsa_id."' AND ROLE=2";
                $this->db->where($where);
                $query = $this->db->get();
                $DSAS = $query->result();
                
                foreach($DSAS as $DSA)
                            {
                                $this->db->select('*');
                                //$this->db->from('USER_DETAILS');
                                //$where = "ROLE=4 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
                                $this->db->from('register');
                                $where = "DSA_ID='".$DSA->UNIQUE_CODE."'";
                                $this->db->where($where);
                                $query = $this->db->get();
                                $Customers3 = $query->result();
                            
                                $array3 = json_decode(json_encode($Customers3), true);
                                foreach($array3 as $user3)
                                    {
                                    array_push($Combine_Customers,$user3);
                                
                                    }
                                    $this->db->select('*');
                                    $this->db->from('USER_DETAILS');
                                    $where = "ROLE=4 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
                                    $this->db->where($where);
                                    $query = $this->db->get();
                                    $Connectors = $query->result();
                                    foreach($Connectors as $Connector)
                                     {
                                        $this->db->select('*');
                                        //$this->db->from('USER_DETAILS');
                                        //$where = "ROLE=4 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
                                        $this->db->from('register');
                                        $where = "Connector_id='".$Connector->UNIQUE_CODE."'";
                                        $this->db->where($where);
                                        $query = $this->db->get();
                                        $Customers4 = $query->result();
                                        $array4 = json_decode(json_encode($Customers4), true);
                                        foreach($array4 as $user4)
                                            {
                                            array_push($Combine_Customers,$user4);
                                            }
                                     }
                            }
                                   $this->db->select('*');
                                    $this->db->from('USER_DETAILS');
                                    $where = "ROLE=4 AND BM_ID='".$dsa_id."' OR Refer_By='".$dsa_id."' AND ROLE=4";
                                    $this->db->where($where);
                                    $query = $this->db->get();
                                    $Connectors = $query->result();
                                    foreach($Connectors as $Connector)
                                     {
                                        $this->db->select('*');
                                        //$this->db->from('USER_DETAILS');
                                        //$where = "ROLE=4 AND DSA_ID='".$DSA->UNIQUE_CODE."' OR Refer_By='".$DSA->UNIQUE_CODE."' AND ROLE=4";
                                        $this->db->from('register');
                                        $where = "Connector_id='".$Connector->UNIQUE_CODE."'";
                                        $this->db->where($where);
                                        $query = $this->db->get();
                                        $Customers4 = $query->result();
                                        $array4 = json_decode(json_encode($Customers4), true);
                                        foreach($array4 as $user4)
                                            {
                                            array_push($Combine_Customers,$user4);
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
      
    }else if($userType == 'Relationship_Officer') {        
        //$this->db->where("RO_ID", $dsa_id);
        //$where = "RO_ID='".$dsa_id."' OR Refer_By='".$dsa_id."' OR Lead_Assign_To='".$dsa_id."'";
		//$this->db->where($where);
		$Combine_Customers=array();	
		$this->db->select('*');
					$this->db->from('register');
					$where = "RO_ID='".$dsa_id."' OR Lead_Assign_To='".$dsa_id."'";
					//$where = "RO_ID=".$dsa_id." OR Lead_Assign_To=".$dsa_id;
					$this->db->where($where);
					$query = $this->db->get();
					$Customers2 = $query->result();
					$array2 = json_decode(json_encode($Customers2), true);
				    foreach($array2 as $user2)
                        {
                        array_push($Combine_Customers,$user2);
                        }
						$this->db->select('*');
						$this->db->from('USER_DETAILS');
						$where = "ROLE=2 AND RO_ID='".$dsa_id."' OR Refer_By='".$dsa_id."' AND ROLE=2";
						$this->db->where($where);
						$query = $this->db->get();
						$DSAS = $query->result();
						foreach($DSAS as $DSA)
				         {
							$this->db->select('*');
							$this->db->from('register');
							//$where = "DSA_ID='".$DSA->UNIQUE_CODE."'";
							$where = "DSA_ID='".$DSA->UNIQUE_CODE."' OR Lead_Assign_To='".$DSA->UNIQUE_CODE."'";
							$this->db->where($where);
							$query = $this->db->get();
							$Customers3 = $query->result();
							$array3 = json_decode(json_encode($Customers3), true);
							foreach($array3 as $user3)
								{
								array_push($Combine_Customers,$user3);
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
	else if($userType == 'DSA_CSR') {     
        $this->db->where("CSR_ID", $dsa_id);
    }
    /*$q = $this->db->from('register');
    $this->db->order_by("id", "desc");
    $response = $q->get()->result();
    
    return $response;*/
  }	
    /*---------------------------------------------- Added by papiha on 12_03_2022-----------------------------------------------------*/
     public function get_self_customers($id,$User_Type)
     {
         
        if($User_Type=='Cluster_Manager')
		{ 
            $Combine_Customers=array();	
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=1 AND CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=1";
			$this->db->where($where);
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->order_by("USER_DETAILS.ID", "desc");
			
			$Customers =$this->db->get()->result();
           
			$array = json_decode(json_encode($Customers), true);
		    foreach($array as $user)
                        {
                          array_push($Combine_Customers,$user);
                        }
            return $Combine_Customers;
        }
       else if($User_Type=='branch_manager')
		{ 
            $Combine_Customers=array();	
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=1 AND BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=1";
			$this->db->where($where);
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->order_by("USER_DETAILS.ID", "desc");
			
			$Customers =$this->db->get()->result();
           
			$array = json_decode(json_encode($Customers), true);
		    foreach($array as $user)
                        {
                          array_push($Combine_Customers,$user);
                        }
            return $Combine_Customers;
        }
        else if($User_Type=='Relationship_Officer')
		{ 
            $Combine_Customers=array();	
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=1 AND RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=1";
			$this->db->where($where);
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->order_by("USER_DETAILS.ID", "desc");
			
			$Customers =$this->db->get()->result();
           
			$array = json_decode(json_encode($Customers), true);
		    foreach($array as $user)
                        {
                          array_push($Combine_Customers,$user);
                        }
            return $Combine_Customers;
        }
        else if($User_Type=='DSA')
		{ 
            $Combine_Customers=array();	
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=1 AND DSA_ID='".$id."' OR Refer_By='".$id."' AND ROLE=1";
			$this->db->where($where);
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->order_by("USER_DETAILS.ID", "desc");
			
			$Customers =$this->db->get()->result();
           
			$array = json_decode(json_encode($Customers), true);
		    foreach($array as $user)
                        {
                          array_push($Combine_Customers,$user);
                        }
            return $Combine_Customers;
        }
     }
        
     public function get_self_Connector($id,$User_Type)
     {
         
        if($User_Type=='Cluster_Manager')
		{ 
            $Combine_Customers=array();	
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=4 AND CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4";
			$this->db->where($where);
          
            $this->db->order_by("USER_DETAILS.ID", "desc");
			
			$Customers =$this->db->get()->result();
           print_r($this->db->last_query());
           exit;
			$array = json_decode(json_encode($Customers), true);
		    foreach($array as $user)
                        {
                          array_push($Combine_Customers,$user);
                        }
            return $Combine_Customers;

        }
       else if($User_Type=='branch_manager')
		{ 
            $Combine_Customers=array();	
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=4 AND BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4";
			$this->db->where($where);
         
            $this->db->order_by("USER_DETAILS.ID", "desc");
			
			$Customers =$this->db->get()->result();
           
			$array = json_decode(json_encode($Customers), true);
		    foreach($array as $user)
                        {
                          array_push($Combine_Customers,$user);
                        }
            return $Combine_Customers;
        }
        else if($User_Type=='Relationship_Officer')
		{ 
            $Combine_Customers=array();	
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=4 AND RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4";
			$this->db->where($where);
         
            $this->db->order_by("USER_DETAILS.ID", "desc");
			
			$Customers =$this->db->get()->result();
           
			$array = json_decode(json_encode($Customers), true);
		    foreach($array as $user)
                        {
                          array_push($Combine_Customers,$user);
                        }
            return $Combine_Customers;
        }
        else if($User_Type=='DSA')
		{ 
            $Combine_Customers=array();	
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=4 AND DSA_ID='".$id."' OR Refer_By='".$id."' AND ROLE=4";
			$this->db->where($where);
         
            $this->db->order_by("USER_DETAILS.ID", "desc");
			
			$Customers =$this->db->get()->result();
           
			$array = json_decode(json_encode($Customers), true);
		    foreach($array as $user)
                        {
                          array_push($Combine_Customers,$user);
                        }
            return $Combine_Customers;
        }
     }   
     public function get_self_dsa($id,$User_Type)
     {
         
        if($User_Type=='Cluster_Manager')
		{ 
            $Combine_Customers=array();	
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=2 AND CM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";
			$this->db->where($where);
          
            $this->db->order_by("USER_DETAILS.ID", "desc");
			
			$Customers =$this->db->get()->result();
           print_r($this->db->last_query());
           exit;
			$array = json_decode(json_encode($Customers), true);
		    foreach($array as $user)
                        {
                          array_push($Combine_Customers,$user);
                        }
            return $Combine_Customers;

        }
       else if($User_Type=='branch_manager')
		{ 
            $Combine_Customers=array();	
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=2 AND BM_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";
			$this->db->where($where);
         
            $this->db->order_by("USER_DETAILS.ID", "desc");
			
			$Customers =$this->db->get()->result();
           
			$array = json_decode(json_encode($Customers), true);
		    foreach($array as $user)
                        {
                          array_push($Combine_Customers,$user);
                        }
            return $Combine_Customers;
        }
        else if($User_Type=='Relationship_Officer')
		{ 
            $Combine_Customers=array();	
			$this->db->select('*');
			$this->db->from('USER_DETAILS');
			$where = "ROLE=2 AND RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=2";
			$this->db->where($where);
         
            $this->db->order_by("USER_DETAILS.ID", "desc");
			
			$Customers =$this->db->get()->result();
           
			$array = json_decode(json_encode($Customers), true);
		    foreach($array as $user)
                        {
                          array_push($Combine_Customers,$user);
                        }
            return $Combine_Customers;
        }
       
     } 
     public function get_all_customers($id)
     {
          $this->db->select('*');
			  
            $this->db->where("ROLE", 1);   
            $this->db->from('USER_DETAILS');
            $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $this->db->where("USER_DETAILS.UNIQUE_CODE",$id);
            $query = $this->db->get()->result();
            return $query;
       
     }


     //===========================================added by priya 29-04-2022

     function getALLCustomers($id,$userType)
     {

         $this->db->select('count(*) as count');
         $this->db->from('USER_DETAILS');
         $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         
         $where = "ROLE=1 AND RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=1";
         $this->db->where($where);
         $query = $this->db->get();
         $response = $query->row();
         return $response->count;
         //print_r($this->db->last_query());
         //exit; 
     }
      function Get_ALLCustomer_Filter($id,$searchValue)
     {
         $this->db->select('count(*) as count');
         $this->db->from('USER_DETAILS');
         $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         $where = "ROLE=1 AND RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=1";
         $this->db->where($where);
         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=1 ";
        // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
         $this->db->where($where);
         }
         $query = $this->db->get();
         $response = $query->row();
        
         //exit;
         return $response->count; 
     } 
    function Get_ALLCustomer_With_Page($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
     {
        
     
        $this->db->select('*');
         $this->db->from('USER_DETAILS');
           $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         
         if($searchValue!= '')
         {
         $where = "ROLE=1 AND RO_ID='".$id."' AND FN like '%".$searchValue."%' OR Refer_By='".$id."' AND ROLE=1 AND LN like '%".$searchValue."%'";
         $this->db->where($where);
         }
         else
         {
                
                 $where = "ROLE=1 AND RO_ID='".$id."' OR Refer_By='".$id."' AND ROLE=1";
                  $this->db->where($where);
         }
        
        // $this->db->order_by($columnName, $columnSortOrder);
         $this->db->limit($rowperpage,$row);
         $query = $this->db->get();
         $response = $query->result();
        //print_r($this->db->last_query());
        //exit;
         //exit;
        return $response; 
     }
     public function download_excel_customer()
     {
        $this->db->select('USER_DETAILS.*,CUSTOMER_MORE_DETAILS.STATUS,CUSTOMER_MORE_DETAILS.last_updated_date');
             
        $this->db->where("ROLE", 1);
        $this->db->from('USER_DETAILS');
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $this->db->order_by("USER_DETAILS.ID", "desc");
        $query = $this->db->get()->result();
        return $query;
     }
     function reject_case($id)
     {
         
         $this->db->select('*');
         $this->db->from('internal_loan_application_status');
         $this->db->where('Applicant_ID', $id);
         $q = $this->db->get();
         $row = $q->row();
         return $row;
     }
     //===========================================added by papiha 01-08-2022================================================//

function getALLCustomers_FI($id,$userType)
{

    $this->db->select('count(*) as count');
    $this->db->from('USER_DETAILS');
    $this->db->join('fi_details', 'fi_details.cust_id= USER_DETAILS.UNIQUE_CODE');
    $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.Application_id= fi_details.application_number');
    
   
    $this->db->where('fi_id',$id);
    $query = $this->db->get();
    $response = $query->row();
    return $response->count;
    //print_r($this->db->last_query());
    //exit; 
}
 function Get_ALLCustomer_Filter_FI($id,$searchValue)
{
    $this->db->select('count(*) as count');
    $this->db->from('USER_DETAILS');
    $this->db->join('fi_details', 'fi_details.cust_id= USER_DETAILS.UNIQUE_CODE');
    $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.Application_id= fi_details.application_number');
    $this->db->where('fi_id',$id);
    if($searchValue!= '')
    {
    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=1 ";
   // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
    $this->db->where($where);
    }
    $query = $this->db->get();
    $response = $query->row();
   
    //exit;
    return $response->count; 
} 
function Get_ALLCustomer_With_Page_FI($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
{
   

   $this->db->select('*');
   $this->db->from('USER_DETAILS');
   $this->db->join('fi_details', 'fi_details.cust_id= USER_DETAILS.UNIQUE_CODE');
   $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.Application_id= fi_details.application_number');
    if($searchValue!= '')
    {
    $where = "FN like '%".$searchValue."%' AND ROLE=1 OR ROLE=1 AND LN like '%".$searchValue."%'";
    $this->db->where($where);
    }
    
   
   // $this->db->order_by($columnName, $columnSortOrder);
    $this->db->limit($rowperpage,$row);
    $query = $this->db->get();
    $response = $query->result();
   //print_r($this->db->last_query());
   //exit;
    //exit;
   return $response; 
}
    
//===========================================added by papiha 06-08-2022================================================//

function getALLCustomers_RCU($id,$userType)
{

    $this->db->select('count(*) as count');
    $this->db->from('USER_DETAILS');
    $this->db->join('RCU_details', 'RCU_details.cust_id= USER_DETAILS.UNIQUE_CODE');
    $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.Application_id= RCU_details.application_number');
    
   
    $this->db->where('RCU_id',$id);
    $query = $this->db->get();
    $response = $query->row();
    return $response->count;
    //print_r($this->db->last_query());
    //exit; 
}
 function Get_ALLCustomer_Filter_RCU($id,$searchValue)
{
    $this->db->select('count(*) as count');
    $this->db->from('USER_DETAILS');
    $this->db->join('RCU_details', 'RCU_details.cust_id= USER_DETAILS.UNIQUE_CODE');
    $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.Application_id= RCU_details.application_number');
    $this->db->where('RCU_id',$id);
    if($searchValue!= '')
    {
    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=1 ";
   // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
    $this->db->where($where);
    }
    $query = $this->db->get();
    $response = $query->row();
   
    //exit;
    return $response->count; 
} 
function Get_ALLCustomer_With_Page_RCU($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
{
   

   $this->db->select('*');
   $this->db->from('USER_DETAILS');
   $this->db->join('RCU_details', 'RCU_details.cust_id= USER_DETAILS.UNIQUE_CODE');
   $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.Application_id= RCU_details.application_number');
   $this->db->where('RCU_id',$id);
    if($searchValue!= '')
    {
    $where = "FN like '%".$searchValue."%' AND ROLE=1 OR ROLE=1 AND LN like '%".$searchValue."%'";
    $this->db->where($where);
    }
    
   
   // $this->db->order_by($columnName, $columnSortOrder);
    $this->db->limit($rowperpage,$row);
    $query = $this->db->get();
    $response = $query->result();
  
    //exit;
   return $response; 
}

/*------------------------------------------------ Addded by papiha on 08_08_2022-----------------------------------------------*/


function getALLCustomers_Legal($id,$userType)
{

    $this->db->select('count(*) as count');
    $this->db->from('USER_DETAILS');
    $this->db->join('Legal_details', 'Legal_details.cust_id= USER_DETAILS.UNIQUE_CODE');
    $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.Application_id= Legal_details.application_number');
    
   
    $this->db->where('Legal_details.Legal_id',$id);
    $query = $this->db->get();
    $response = $query->row();
    return $response->count;
    //print_r($this->db->last_query());
    //exit; 
}
 function Get_ALLCustomer_Filter_Legal($id,$searchValue)
{
    $this->db->select('count(*) as count');
    $this->db->from('USER_DETAILS');
    $this->db->join('Legal_details', 'Legal_details.cust_id= USER_DETAILS.UNIQUE_CODE');
    $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.Application_id= Legal_details.application_number');
    $this->db->where('Legal_details.Legal_id',$id);
    if($searchValue!= '')
    {
    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=1 ";
   // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
    $this->db->where($where);
    }
    $query = $this->db->get();
    $response = $query->row();
   
    //exit;
    return $response->count; 
} 
function Get_ALLCustomer_With_Page_Legal($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
{
   

   $this->db->select('*');
   $this->db->from('USER_DETAILS');
   $this->db->join('Legal_details', 'Legal_details.cust_id= USER_DETAILS.UNIQUE_CODE');
   $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.Application_id= Legal_details.application_number');
   $this->db->where('Legal_details.Legal_id',$id);
    if($searchValue!= '')
    {
    $where = "FN like '%".$searchValue."%' AND ROLE=1 OR ROLE=1 AND LN like '%".$searchValue."%'";
    $this->db->where($where);
    }
    
   
   // $this->db->order_by($columnName, $columnSortOrder);
    $this->db->limit($rowperpage,$row);
    $query = $this->db->get();
    $response = $query->result();
  
    //exit;
   return $response; 
}
/*------------------------------------------------ Addded by papiha on 11_08_2022-----------------------------------------------*/


function getALLCustomers_Technical($id,$userType)
{

    $this->db->select('count(*) as count');
    $this->db->from('USER_DETAILS');
    $this->db->join('Technical_details', 'Technical_details.cust_id= USER_DETAILS.UNIQUE_CODE');
    $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.Application_id= Technical_details.application_number');
    
   
    $this->db->where('Technical_details.Technical_id',$id);
    $query = $this->db->get();
    $response = $query->row();
    return $response->count;
    //print_r($this->db->last_query());
    //exit; 
}
 function Get_ALLCustomer_Filter_Technical($id,$searchValue)
{
    $this->db->select('count(*) as count');
    $this->db->from('USER_DETAILS');
    $this->db->join('Technical_details', 'Technical_details.cust_id= USER_DETAILS.UNIQUE_CODE');
    $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.Application_id= Technical_details.application_number');
    $this->db->where('Technical_details.Technical_id',$id);
    if($searchValue!= '')
    {
    $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%' AND ROLE=1 ";
   // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
    $this->db->where($where);
    }
    $query = $this->db->get();
    $response = $query->row();
   
    //exit;
    return $response->count; 
} 
function Get_ALLCustomer_With_Page_Technical($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage)
{
   

   $this->db->select('*');
   $this->db->from('USER_DETAILS');
   $this->db->join('Technical_details', 'Technical_details.cust_id= USER_DETAILS.UNIQUE_CODE');
   $this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.Application_id= Technical_details.application_number');
   $this->db->where('Technical_details.Technical_id',$id);
    if($searchValue!= '')
    {
    $where = "FN like '%".$searchValue."%' AND ROLE=1 OR ROLE=1 AND LN like '%".$searchValue."%'";
    $this->db->where($where);
    }
    
   
   // $this->db->order_by($columnName, $columnSortOrder);
    $this->db->limit($rowperpage,$row);
    $query = $this->db->get();
    $response = $query->result();
  
    //exit;
   return $response; 
}
}
?>