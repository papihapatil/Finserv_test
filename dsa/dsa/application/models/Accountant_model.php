<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accountant_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
	
	function get_payment_deteils_offline_all()
	{
		$this->db->select('offline_login_fees.*,CUSTOMER_APPLIED_LOANS.bank_id,cooperator.Bank_name as LoanBank');
            $this->db->where('payment_mode',"Cheque");
           $this->db->from('offline_login_fees');
           
		$this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID = offline_login_fees.Cust_id', 'left');
		
		
				$this->db->join('cooperator', 'cooperator.id = CUSTOMER_APPLIED_LOANS.bank_id', 'left');

        //$this->db->where('Cust_id',$cust_id);
		$query = $this->db->get();
		$response=$query->result();
		
		//echo $this->db->last_query(); 
  //exit;
		return $response;
	}
      function get_payment_deteils_offline_all_UPI()
	{
		$this->db->select('offline_login_fees.*,CUSTOMER_APPLIED_LOANS.bank_id,cooperator.Bank_name as LoanBank');
            $this->db->where('payment_mode',"UPI");
           $this->db->from('offline_login_fees');
		$this->db->join('CUSTOMER_APPLIED_LOANS', 'CUSTOMER_APPLIED_LOANS.CUST_ID = offline_login_fees.Cust_id', 'left');
		
		
				$this->db->join('cooperator', 'cooperator.id = CUSTOMER_APPLIED_LOANS.bank_id', 'left');

        //$this->db->where('Cust_id',$cust_id);
		$query = $this->db->get();
		$response=$query->result();
		
		//print_r($response);
		return $response;
	}
	
	function get_payment_deteils_online_all()
	{
		$this->db->select('*');
        $this->db->from('online_login_fees');
        //$this->db->where('Cust_id',$cust_id);
		$query = $this->db->get();
		$response=$query->result();
		return $response;
	}
	
	
	
	
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


function get_idccr_users(){
      $response = array();
      $this->db->select('*');
      $q = $this->db->from('idccr_users');
      $this->db->order_by("id", "desc");
      $response = $q->get()->result();
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

function  get_rate_of_intrest3($bank_id,$loan_type)
{
        
        $this->db->select('rate_of_intrest');
        $this->db->from('cooperator_loan_type');
  $this->db->where('bank_id',$bank_id); 
        $this->db->where('loan_type',$loan_type); 
        $query = $this->db->get();
        $row = $query->row();
        return $row->rate_of_intrest;
   
}

function  get_Loan_disbured_customers5($bank_id,$loan_type)
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

     	function get_my_payment_deteils_offline($id)
	{
			$this->db->select('*');
			$this->db->from('offline_login_fees');
			$this->db->where('Cust_id',$id);
        $query = $this->db->get();
		$response=$query->row();
		
		//echo $this->db->last_query(); 
  //exit;
		return $response;
	}
	 	function get_my_payment_deteils_online($id)
	{
			$this->db->select('*');
			$this->db->from('online_login_fees');
			$this->db->where('Cust_id',$id);
        $query = $this->db->get();
		$response=$query->row();
		
		//echo $this->db->last_query(); 
  //exit;
		return $response;
	}
	
}
	
	?>