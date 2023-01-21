<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Help_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function saverecords($data)
    {
        $this->db->insert('help_enquiry',$data);
           return $this->db->insert_id();

    }
    function saveDoc($data1)
    {
        $this->db->insert('issue_document',$data1);
           return $this->db->insert_id();

    }
    public function last_row()
    {
        $this->db->select('id');
        $this->db->from('help_enquiry');
        $q = $this->db->get();
        
        $row = $q->last_row();
        return $row;
				  
    }
   
    public function get_id()
    {
        $this->db->select('*');
        $this->db->from('help_enquiry');
        $q = $this->db->get();
        
        $row = $q->last_row();
        return $row;

    }
    
    public function get_path()
    {
        $this->db->select('*');
        $this->db->from('issue_document');
        $q = $this->db->get();
        
        $row = $q->last_row();
        return $row;

    }
   
    public function getProfileData($ID){
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('UNIQUE_CODE', $id);
        $q = $this->db->get();
        
        $row = $q->row();
        return $row;
      }
      public function get_issue_category()
      {
          $this->db->order_by('id', 'DESC');
          $issue_category=$this->db->get('issue_category')->result_array();
          
          return $issue_category;
      }
      public function get_sub_issue_category($issue_category_id)
      {
          $this->db->where('issue_category_id',$issue_category_id);
          $sub_issue_category=$this->db->get('sub_category')->result_array();
          return $sub_issue_category;
      }
      public function tikit_data($id)
    {
        $this->db->select('*');
            $this->db->from('help_enquiry');
            $this->db->order_by('tikit_id', 'DESC');
            $query = $this->db->get();
           
            $response = $query->result();
            return  $response;
            /*echo '<pre>';
            print_r( $response);
            exit;*/
             // $str = $this->db->last_query();
           // print_r($str);
            //exit;

    }
    public function tikit_data_seperate($id)
    {
        $this->db->select('*');
            $this->db->from('help_enquiry');
            $this->db->order_by('tikit_id', 'DESC');

            $this->db->where('user_id',$id); 
            $query = $this->db->get();
            $response = $query->result();
           // $str = $this->db->last_query();
           // print_r($str);
            //exit;
            return $response;

    }
    
    public function tikit_row($tikit_id)
    {
        $this->db->select('*');
        $this->db->from('help_enquiry');
        $this->db->where('tikit_id',$tikit_id);
        $q=$this->db->get();
        $row=$q->row();
         return $row;
         
       // $str = $this->db->last_query();
     //print_r($str);
      //  exit;

    }
    public function doc_path($tikit_id)
    {
        $this->db->select('*');
        $this->db->from('issue_document');
        $this->db->where('tikit_id',$tikit_id);
        $q=$this->db->get();
        $row=$q->row();
         return $row;
       // $str = $this->db->last_query();
        // print_r($str);
         //exit;
    }
  


    
    public function detele_row($id)
    {	
	
        $this->db->where('id',$id);	 
       
        return $this->db->delete('help_enquiry');
    

    }
    public function help_row($tikit_id)
    {
        $this->db->select('*');
        $this->db->from('help_enquiry');
        $this->db->where('tikit_id',$tikit_id);
        $q=$this->db->get();
        $row=$q->row();
       
       return $row;
       //$str = $this->db->last_query();
       //  print_r($str);
           // exit;

    }
    public function update_tikit($tikit_id,$data)
    {
      
       $this->db->where('tikit_id',$tikit_id);

       return $this->db->update('help_enquiry',$data);
     //$str = $this->db->last_query();
       // print_r($str);
          // exit;

    }
       
    public function Count_data_for_admin()
    {
        $this->db->select('*');
        $this->db->from('help_enquiry');
        
        $query = $this->db->get();
        $response = $query->result();
        return $response;
     }  
    

      
     
      public function get_assign_name()
      {
          $help_supporter=$this->db->get('help_supporter')->result_array();
          return $help_supporter;
      }
      public function getSupporterData_profe($sid)
      {
        $this->db->select('*');
        $this->db->from('help_supporter');
        $this->db->where('id',$sid);

        $q=$this->db->get();
        $row=$q->row();
       
         return $row;
        // $str = $this->db->last_query();
      // print_r($str);
         //  exit;
      }
 public function getSaveData($id)
     {
       $this->db->select('*');
       $this->db->from('help_enquiry');
       $this->db->where('tikit_id',$id);
       $q=$this->db->get();
       $row=$q->row();
      
      return $row;
     }
     
     
        
      public function getAdminID()
	{
		  $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  
		 
          $this->db->where('ROLE',5);
		  $q = $this->db->get();
		   $q->result();
          $row=$q->row();
		  return $row;
          
	}
    public function getsupportID()
	{
		  $this->db->select('*');
		  $this->db->from('USER_DETAILS');
		  
		 
          $this->db->where('ROLE',20);
		  $q = $this->db->get();
		   $q->result();
          $row=$q->row();
		  return $row;
          
	}
    public function getUSERID($id)
	{
		  $this->db->select('*');
		  $this->db->from('help_enquiry');
		  
        
		  $q = $this->db->get();
		   $q->result();
         $row=$q->row();
		 return $row;
          
	}
    function getDashboardData(){
        $response = [];
    
        $query = $this->db->query("SELECT count(*) as count FROM help_enquiry");
        $issue_count= $query->row(); 
        $response['issue_count']=$issue_count->count;
       // print_r( $response);  
         //exit;
      

        return $response;
    }
      function save_issue_category($data)
    {
        $this->db->insert('issue_category',$data);
           return $this->db->insert_id();

    }
    function save_sub_category($data)
    {
        $this->db->insert('sub_category',$data);
           return $this->db->insert_id();

    }
    function delete_issue_category($arr){
        return $this->db->delete('issue_category', $arr); 
      }
      public function delete_customer($id)
	  {
		  $this -> db -> where('ID', $id);
		  return $this -> db -> delete('USER_DETAILS');
    }
     
          
    }

?>