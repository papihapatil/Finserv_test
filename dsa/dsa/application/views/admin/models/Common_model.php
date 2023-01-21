<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}



	public function get_user_data($id=''){

		$this->db->where('ID',$id);
		$result = $this->db->get('user_details')->row_array();
		return $result;
	}


	public function save_credit_bureau($data){

		$this->db->insert('credit_bureau',$data);
		return $this->db->insert_id();
	}
	public function save_aadhar_esign($data){

		$this->db->insert('aadhar_esign',$data);
		return $this->db->insert_id();
	}
	public function update_credit_bureau($data)
	{
		
	  $this->db->where('Payment_id', $data['Payment_id']);
      return $this->db->update('credit_bureau',$data);
	}
	public function update_aadhar_esign($data)
	{
		
	  $this->db->where('Payment_id', $data['Payment_id']);
      return $this->db->update('aadhar_esign',$data);
	}
	public function save_payment_details($data){

		$this->db->insert('payment_details',$data);
		return $this->db->insert_id();
	}
	function check_payment_details($email,$mobile,$name)
	{

		$date=date("Y/m/d");
		$this->db->select('*');
        $this->db->from('payment_details');
		$this->db->where('cemail',$email);
		$this->db->where('cmob',$mobile);
		$this->db->where('cname',$name);
		$this->db->where('status','success');
		//$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->num_rows();
		
	    return $response;
		
	}
	
	function get_payment_id($email,$mobile)
	{

		$date=date("Y/m/d");
		$this->db->select('razorpay_payment_id');
        $this->db->from('payment_details');
		$this->db->where('cemail',$email);
		//$this->db->where('cmob',$mobile);
		$this->db->where('status','success');
		$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->razorpay_payment_id;
		
	}
	function get_refund_status($email,$mobile)
	{

		$date=date("Y/m/d");
		$this->db->select('refund');
        $this->db->from('payment_details');
		$this->db->where('cemail',$email);
		$this->db->where('cmob',$mobile);
		$this->db->where('status','success');
		$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->refund;
		
	}
	function check_cedit_details($email,$mobile)
	{
		
		$date=date("Y/m/d");
		$this->db->select('*');
        $this->db->from('credit_bureau');
		$this->db->where('email',$email);
		$this->db->where('mobile',$mobile);
		$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->num_rows();
		
	    return $response;
		
	}
		function check_aadhar_details($email,$mobile)
	{
		
		$date=date("Y/m/d");
		$this->db->select('*');
        $this->db->from('aadhar_esign');
		$this->db->where('email',$email);
		$this->db->where('mobile',$mobile);
		$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->num_rows();
		
	    return $response;
		
	}
		function check_aadhar_details_status($email,$mobile)
	{
		
		$date=date("Y/m/d");
		$this->db->select('*');
        $this->db->from('aadhar_esign');
		$this->db->where('email',$email);
		$this->db->where('mobile',$mobile);
		$this->db->where('created_date',$date);
		$this->db->where('status','sucess');
		$query = $this->db->get();
		$response = $query->num_rows();
		
	    return $response;
		
	}
	function get_credit_pull_count($email,$mobile)
	{
		
		$date=date("Y/m/d");
		$this->db->select('*');
        $this->db->from('credit_bureau');
		$this->db->where('email',$email);
		$this->db->where('mobile',$mobile);
		$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->credit_pull_count;
		
	  
		
	}
	function get_aadhar_pull_count($email,$mobile)
	{
		
		$date=date("Y/m/d");
		$this->db->select('*');
        $this->db->from('aadhar_esign');
		$this->db->where('email',$email);
		$this->db->where('mobile',$mobile);
		$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->pull_chance;
		
	  
		
	}
	function get_referance_no($razor_pay_id)
	{
		
		$date=date("Y/m/d");
		$this->db->select('*');
        $this->db->from('credit_bureau');
		$this->db->where('Payment_id',$razor_pay_id);
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->response;
		
	  
		
	}
	function get_email($razor_pay_id)
	{
		
		$date=date("Y/m/d");
		$this->db->select('*');
        $this->db->from('credit_bureau');
		$this->db->where('Payment_id',$razor_pay_id);
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->email;
		
	  
		
	}
	function check_cedit_details_sucess($email,$mobile)
	{
		
		$date=date("Y/m/d");
		$this->db->select('*');
        $this->db->from('credit_bureau');
		$this->db->where('email',$email);
		$this->db->where('mobile',$mobile);
		$this->db->where('created_date',$date);
		$this->db->where('score_success','success');
		$query = $this->db->get();
		$response = $query->num_rows();
		
	    return $response;
		
	}
	
	function verify_send_otp($mobile)
	{
		
		$date=date("Y/m/d");
		$this->db->select('*');
        $this->db->from('payment_details');
		$this->db->where('cmob',$mobile);
		$this->db->where('created_date',$date);
		$this->db->where('verify_send_otp','true');
		$query = $this->db->get();
		$response = $query->num_rows();
		if($response>0)
		{
	       return 1;
		}
		else
		{
			return 0;
		}
		
	}
    function save_refund_details($data,$payment_id){
      $this->db->where('razorpay_payment_id', $payment_id );
      return $this->db->update('payment_details',$data);      
    }
	 function save_link_details($data,$payment_id){
      $this->db->where('Payment_id', $payment_id );
      return $this->db->update('aadhar_esign',$data);      
    }
	function check_auto_refund()
	{
		/*$emails=array();
		$payment_id=array();
		$date=date("Y-m-d");
		$this->db->distinct();
		$this->db->select('email');
        $this->db->from('credit_bureau');
		$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->result_array();
		foreach($response as $res)
		{
			$this->db->select('score_success,email');
			$this->db->from('credit_bureau');
			$this->db->where('created_date',$date);
			$this->db->where('email',$res['email']);
			$query = $this->db->get();
			$response = $query->result_array();
			foreach($response as $res)
			{
				if($res['score_success']=='success')
				{
					break;
				}
				else
				{
					$emails[]=$res['email'];
				}
			}
			
			 
		}
		foreach($emails as $email)
		{
			
			$this->db->select('razorpay_payment_id,refund');
			$this->db->from('payment_details');
			$this->db->where('created_date',$date);
			$this->db->where('cemail',$email);
			$query = $this->db->get();
			$response = $query->row();
            if($response->refund!='Refund Proceed' || $response->refund!='Not Applicable' )
				{
					$payment_id[]=$response->razorpay_payment_id;
				}
			
		
			
		}
		 return $payment_id;*/
		 $refund_payment_id=array();
		$payment_id=array();
		$date=date("Y-m-d");
		$this->db->distinct();
		$this->db->select('razorpay_payment_id');
        $this->db->from('payment_details');
		$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->result_array();
		foreach($response as $res)
		{
			$this->db->select('score_success,Payment_id');
			$this->db->from('credit_bureau');
			$this->db->where('created_date',$date);
			$this->db->where('Payment_id',$res['razorpay_payment_id']);
			$query = $this->db->get();
			$response = $query->result_array();
			foreach($response as $res)
			{
				if($res['score_success']=='success')
				{
					break;
				}
				else
				{
					$Payment_id[]=$res['Payment_id'];
				}
			}
			
			 
		}
			
		foreach($Payment_id as $id)
		{
			
			$this->db->select('razorpay_payment_id,refund');
			$this->db->from('payment_details');
			$this->db->where('created_date',$date);
			$this->db->where('razorpay_payment_id',$id);
			$query = $this->db->get();
			$response = $query->row();
            if($response->refund!='Refund Processed')
				{
					$refund_payment_id[]=$response->razorpay_payment_id;
				}
			
		
			
		}
	    return $refund_payment_id;
		
	   
	}
	function check_auto_refund_aadhar()
	{
		
		 $refund_payment_id=array();
		$payment_id=array();
		$date=date("Y-m-d");
		$this->db->distinct();
		$this->db->select('razorpay_payment_id');
        $this->db->from('payment_details');
		$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->result_array();
		foreach($response as $res)
		{
			$this->db->select('status,Payment_id');
			$this->db->from('aadhar_esign');
			$this->db->where('created_date',$date);
			$this->db->where('Payment_id',$res['razorpay_payment_id']);
			$query = $this->db->get();
			$response = $query->result_array();
			foreach($response as $res)
			{
				if($res['status']=='success')
				{
					break;
				}
				else
				{
					$Payment_id[]=$res['Payment_id'];
				}
			}
			
			 
		}
			
		foreach($Payment_id as $id)
		{
			
			$this->db->select('razorpay_payment_id,refund');
			$this->db->from('payment_details');
			$this->db->where('created_date',$date);
			$this->db->where('razorpay_payment_id',$id);
			$query = $this->db->get();
			$response = $query->row();
            if($response->refund!='Refund Processed')
				{
					$refund_payment_id[]=$response->razorpay_payment_id;
				}
			
		
			
		}
	    return $refund_payment_id;
		
	   
	}

//==========================code by peiyanka
function check_payment_details_condition_2($mobile,$name)
{

	$date=date("Y/m/d");
	$this->db->select('*');
	$this->db->from('payment_details');
	$this->db->where('cmob',$mobile);
	$this->db->where('cname',$name);
	$this->db->where('status','success');
	//$this->db->where('created_date',$date);
	$query = $this->db->get();
	$response = $query->num_rows();
	
	return $response;
	
}
function check_payment_details_condition_3($email,$name)
{

	    $date=date("Y/m/d");
		$this->db->select('*');
        $this->db->from('payment_details');
		$this->db->where('cemail',$email);
		$this->db->where('cname',$name);
		$this->db->where('status','success');
		//$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->num_rows();
		
	    return $response;

	
}


//code added by priyanka
function check_combined_cedit_details_sucess($email,$mobile)
	{
		
		$date=date("Y/m/d");
		$this->db->select('*');
        $this->db->from('combined_credit_bureau');
		$this->db->where('email',$email);
		$this->db->where('mobile',$mobile);
		$this->db->where('created_date',$date);
		$this->db->where('score_success','success');
		$query = $this->db->get();
		$response = $query->num_rows();
		
	    return $response;
		
	}
	function find_combined_cedit_details_sucess($email,$mobile)
	{
		
		$date=date("Y/m/d");
		$this->db->select('*');
        $this->db->from('combined_credit_bureau');
		$this->db->where('email',$email);
		$this->db->where('mobile',$mobile);
		//$this->db->where('created_date',$date);
		$this->db->where('score_success','success');
		$query = $this->db->get();
		$response = $query->row();
	    return $response;
		
	}
	function check_combined_cedit_details($email,$mobile)
	{
		
		$date=date("Y/m/d");
		$this->db->select('*');
        $this->db->from('combined_credit_bureau');
		$this->db->where('email',$email);
		$this->db->where('mobile',$mobile);
		$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->num_rows();
		
	    return $response;
		
	}

	function get_combined_credit_pull_count($email,$mobile)
	{
		
		$date=date("Y/m/d");
		$this->db->select('*');
        $this->db->from('combined_credit_bureau');
		$this->db->where('email',$email);
		$this->db->where('mobile',$mobile);
		$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->row();
		return $response;
	//	return $response->credit_pull_count;
	
	}
	public function update_combined_credit_bureau($data)
	{
		
	  $this->db->where('Payment_id', $data['Payment_id']);
      return $this->db->update('combined_credit_bureau',$data);
	}

	public function save_combined_credit_bureau($data){

		$this->db->insert('combined_credit_bureau',$data);
		return $this->db->insert_id();
	}
	// code by priyanka

	function check_payment_for($payment_id)
	{
		
		$this->db->select('*');
        $this->db->from('combined_credit_bureau');
		// $this->db->where('email',$email);
		// $this->db->where('mobile',$mobile);
		$this->db->where('Payment_id',$payment_id);
		$query = $this->db->get();
		$response = $query->num_rows();
		
	    return $response;
		
	}

	function get_payment_id_condition1($email,$mobile,$name)
	{

		$date=date("Y/m/d");
		$this->db->select('razorpay_payment_id');
        $this->db->from('payment_details');
		$this->db->where('cemail',$email);
		$this->db->where('cname',$name);
		$this->db->where('cmob',$mobile);
		$this->db->where('status','success');
		$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->razorpay_payment_id;
		
	}
	function get_payment_id_condition2($mobile,$name)
	{

		$date=date("Y/m/d");
		$this->db->select('razorpay_payment_id');
        $this->db->from('payment_details');
		$this->db->where('cname',$name);
		$this->db->where('cmob',$mobile);
		$this->db->where('status','success');
		$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->razorpay_payment_id;
		
	}
	function get_payment_id_condition3($email,$name)
	{

		$date=date("Y/m/d");
		$this->db->select('razorpay_payment_id');
        $this->db->from('payment_details');
		$this->db->where('cemail',$email);
		$this->db->where('cname',$name);
		$this->db->where('status','success');
		$this->db->where('created_date',$date);
		$query = $this->db->get();
		$response = $query->row();
		
	    return $response->razorpay_payment_id;
		
	}









}

?>