<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HR_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

    function getApplicants($s,$city,$date){

         if ($date!='') {
          $response = array();
          $this->db->select('*');
          $q = $this->db->from('tbl_job_application');
          $this->db->like("date", $date, 'both');
          $this->db->order_by("ID", "desc");
          $response = $q->get()->result();
          return $response;
        
        }

        if($s =='all')
        {
        $response = array();
        $this->db->select('*');
        $q = $this->db->from('tbl_job_application');
        $this->db->order_by("ID", "desc");
        $response = $q->get()->result();
        return $response;
        }
        else if($s =='city')
        {
          $response = array();
          $this->db->select('*');
          $q = $this->db->from('tbl_job_application');
          $this->db->where('location',$city);
          $this->db->order_by("ID", "desc");
          $response = $q->get()->result();
          return $response;
        }
        else if($s =='application_status')
        {
          $response = array();
          $this->db->select('*');
          $q = $this->db->from('tbl_job_application');
          if($city=='In Review')
          {
            $this->db->where('job_status',NULL);
          }
          else
          {
            $this->db->where('job_status',$city);
          }
          
          $this->db->order_by("ID", "desc");
          $response = $q->get()->result();
          return $response;
        }
        else if($s =='bnk')
        {
          $response = array();
          $this->db->select('*');
          $q = $this->db->from('tbl_job_application');
          $this->db->where('position',$city);
          $this->db->order_by("ID", "desc");
          $response = $q->get()->result();
          return $response;
        }
              
      }
      function getJobProfiles(){
       $response = array();
       $this->db->select('*');
       $q = $this->db->from('job_openings');
       $this->db->order_by("ID", "desc");
       $response = $q->get()->result();
       return $response;
      }

      function getJobProfiles_analysis(){
        $response = array();
        $this->db->select('*');
        $q = $this->db->from('job_openings');
        $this->db->order_by("ID", "desc");
        $response = $q->get()->result();
        return $response;
       }

       function job_opening_data($profile_name){
        $response = array();
        $this->db->select('*');
        $q = $this->db->from('job_openings');
        $this->db->where("current_openings",$profile_name);
        $response = $q->get()->result();
        return $response;
       }
      public function getApplicantDetails($id){
        $this->db->select('*');
        $this->db->from('tbl_job_application');
        $this->db->where('id', $id);
        $q = $this->db->get();
        $row = $q->row();
        return $row;
      }
        

      public function applicants_from_profile_name($profile_name){
            $response = array();
        $this->db->select('*');
        $q = $this->db->from('tbl_job_application');
        $this->db->like('position', $profile_name);
        $this->db->where('job_status',"accept");
        $response = $q->get()->result();
        return $response;
      }
      public function check_job_profile_details($new_job_openings)
      {
        $this->db->select('*');
        $this->db->from('job_openings');
        $this->db->where('current_openings',$new_job_openings);
        $q = $this->db->get();
        $row = $q->row();
        return $row;
      }
     
      public function update_job_profile_details($new_job_openings,$data)
    {
      $this->db->where('current_openings',$new_job_openings);
	    return $this->db->update('job_openings',$data);
    }
    
    public function save_job_profile_details($data)
	  {
        $this->db->insert('job_openings',$data);
		    return $this->db->insert_id();
	  }

    public function delete_job_profile($array_input)
    {
      return $this->db->delete('job_openings',$array_input); 
    }




      function getHrDashboardData(){
        $response = [];
        $query = $this->db->query("SELECT count(*) as count FROM  tbl_job_application"); 
        $cust_count = $query->row();
        $response['cust_count'] = $cust_count->count;
        return $response;
    }

  
  
 

  public function get_count($dsa_id) {
        return $this->db->select('t1.*, t2.*')
         ->from('USER_DETAILS as t1')        
         ->where('t1.DSA_ID', $dsa_id)
         ->join('APPLIED_LOANS as t2', 't1.UNIQUE_CODE = t2.CUST_ID', 'RIGHT')
         ->count_all_results();
    }

    function getCity()
    {
       $this->db->select('location');
       $this->db->distinct();
       $this->db->from('tbl_job_application');        
       $query = $this->db->get();
       $response = $query->result();
       return $response;
    }
    function getApplicationStatus()
    {
       $this->db->select('job_status');
       $this->db->distinct();
       $this->db->from('tbl_job_application');        
       $query = $this->db->get();
       $response = $query->result();
       return $response;
    }
    function getjob_positions()
    {
       $this->db->select('position');
       $this->db->distinct();
       $this->db->from('tbl_job_application');        
       $query = $this->db->get();
       $response = $query->result();
       return $response;
    }

    function job_application_actions($applicant_id,$s,$data){

      $this->db->where('id',$applicant_id);
      return $this->db->update('tbl_job_application',$data); 
    
    }


    public function save_job_profile_skills_details($data)
	  {
        $this->db->insert('job_openings_skills',$data);
		    return $this->db->insert_id();
	  }
    public function save_job_profile_Roles_details($data)
	  {
        $this->db->insert('job_openings_roles',$data);
		    return $this->db->insert_id();
	  }

	  public function check_engagement_entry($hr_id,$Form_id){
      $response = array();
      $this->db->select('*');
      $this->db->where("HR_ID",$hr_id); 
	  $this->db->where("Form_id",$Form_id);
	  $q = $this->db->from('new_engagement');
      $query = $q->get();
      if ( $query->num_rows() > 0 ){
             return 1;
       }else return 0;    
    }

	public function save_new_engagement_details($data)
	  {
        $this->db->insert('new_engagement',$data);
		    return $this->db->insert_id();
	  }

	 function update_new_engagement_details($hr_id,$Form_id,$data){

       $this->db->where("HR_ID",$hr_id); 
	  $this->db->where("Form_id", $Form_id);
      return $this->db->update('new_engagement',$data); 
    
    }

	public function get_all_engagements()
	{

		     $this->db->select('*');
             $this->db->from('new_engagement');
             $this->db->order_by("id", "desc");
             $query = $this->db->get();
             $response = $query->result();
             return $response;
	}

	  public function get_engagement_form_Details($id){
        $this->db->select('*');
        $this->db->from('new_engagement');
        $this->db->where('id', $id);
        $q = $this->db->get();
        $row = $q->row();
        return $row;
      }
}
?>