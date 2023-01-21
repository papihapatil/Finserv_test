<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_application_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

    public function check_job_application_details($email, $mobile)
    {
      $this->db->select('*');
      $this->db->from(' tbl_job_application');
      $this->db->where('email',$email);
	    $this->db->where('mobile',$mobile);
      $q = $this->db->get();
      $row = $q->row();
      return $row;
    }

    public function update_job_application_details($email, $mobile,$data)
    {
      $this->db->where('email',$email);
	    $this->db->where('mobile',$mobile);
      return $this->db->update('tbl_job_application',$data);
    }
    
    public function save_job_application_details_details($data)
	{
        $this->db->insert('tbl_job_application',$data);
		    return $this->db->insert_id();
	}

}
?>