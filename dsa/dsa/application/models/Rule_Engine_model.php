<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rule_Engine_model extends CI_Model 
   {

		public function __construct()
		{
			parent::__construct();
		}
		function get_Risk_Dimention()
		{
		  
				$this->db->select('*');
				$this->db->from('risk_dimention');	
				$query = $this->db->get();
				$this->db->order_by("risk_dimention.RD_ID", "desc");
				$response = $query->result();
				Return $response;

		   
		}
		function get_parameters()
		{
		  
				$this->db->select('*');
				$this->db->from('parameters');
				$this->db->join('risk_dimention', 'parameters.RD_ID = risk_dimention.RD_ID');
				$query = $this->db->get();
				$response = $query->result();
				return $response;
		   
		}
		function get_parameters_BY_Id($RD_ID)
		{
		  
				$this->db->select('*');
				$this->db->from('parameters');
				$this->db->where('RD_ID',$RD_ID);
				$query = $this->db->get();
				$response = $query->result();
				return $response;
		   
		}
		function get_criteria($P_ID)
		{
			    $this->db->select('*');
				$this->db->from('criteria');
		        $this->db->where('criteria.P_ID',$P_ID);
				$query = $this->db->get();
				$response = $query->result();
				return $response;
		}
		function save_risk_dimentions($data,$table_name)
		{
			$this->db->insert($table_name,$data);
		    return $this->db->insert_id();
		}
		function get_criteria_Weights($P_ID)
		{
			    $this->db->select('Weights');
				$this->db->distinct();
				$this->db->from('criteria');
		        $this->db->where('criteria.P_ID',$P_ID);
				$query = $this->db->get();
				$response = $query->result();
				return $response;
		}
		function get_parameter_Weights($P_ID)
		{
			    $this->db->select('Weights');
				$this->db->from('parameters');
		        $this->db->where('P_ID',$P_ID);
				$query = $this->db->get();
				$response = $query->row();
				if(!empty($response))
				{
					return $response->Weights;
				}
				else
				{
					return "NOT AVAILABLE";
				}
		}
		function Update_Weights($P_ID,$data)
		{
		     $this->db->where('P_ID', $P_ID);
			 $this->db->update('parameters',$data);
			 return $this->db->affected_rows();
		}
		function Remove_Parameter($arr)
		{
		   $this->db->delete('parameters', $arr);
           return $this->db->affected_rows();		   
		}
		function Remove_Criteria($arr)
		{
		  
		   $this->db->delete('criteria', $arr);
           return $this->db->affected_rows();		   
		}
		
		function Remove_Risk_Dimention($arr)
		{
		  
		   $this->db->delete('risk_dimention', $arr);
           return $this->db->affected_rows();		   
		}
		function check_credit_score($id)
		{
			$query = $this->db->query("SELECT * FROM credit_score where customer_id ='".$id."'"); 
			$row = $query->row();
			return $row;
		}
		function get_parameter_id($parameters)
		{
			    $this->db->select('P_ID');
				$this->db->from('parameters');
		        $this->db->where('parameters',$parameters);
				$query = $this->db->get();
				$response = $query->row();
				if(!empty($response))
				{
					return $response->P_ID;
				}
				else
				{
					return "NOT AVAILABLE";
				}
				
		}
		
   }
?>