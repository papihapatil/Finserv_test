<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DsaEmployees_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();        
    }

    public function get_count($dsa_id) {
        $this->db->from('USER_DETAILS');
        $this->db->where("DSA_ID", $dsa_id);
        $this->db->where("ROLE", 7);        
        return $this->db->count_all_results();
    }

  function getManagers($dsa_id, $limit, $start,$s,$search_name){
    if($s=='all')
    {
    $response = array();
    $this->db->select('*');
    $this->db->limit($limit, $start);
    $this->db->where("DSA_ID", $dsa_id);
    $this->db->where("ROLE", 7);
    $this->db->order_by("ID", "desc");
    $q = $this->db->from('USER_DETAILS');
    $response = $q->get()->result();
    return $response;
    }
    else if($s == 'search'){
      $response = array();
    $this->db->select('*');
    $this->db->limit($limit, $start);
    $this->db->where("DSA_ID", $dsa_id);
    $this->db->where("ROLE", 7);
    $this->db->where("FN",$search_name);
    $this->db->order_by("ID", "desc");
    $q = $this->db->from('USER_DETAILS');
    $response = $q->get()->result();
    return $response;
    }
     else if($s == 'Complete')
    {
      $response = array();
      $this->db->select('*');
      $this->db->limit($limit, $start);
      $this->db->where("DSA_ID", $dsa_id);
      $this->db->where("ROLE", 7);
      $this->db->where("Profile_Status",'Complete');      
     // $this->db->where("PROFILE_PERCENTAGE",'100'); 
      $this->db->order_by("ID", "desc");
      $q = $this->db->from('USER_DETAILS');
      $response = $q->get()->result();
      return $response;
    }
    else if($s == 'Incomplete')
    {
      $response = array();
      $this->db->select('*');
      $this->db->limit($limit, $start);
      $this->db->where("DSA_ID", $dsa_id);
      $this->db->where("ROLE", 7);
      $this->db->where("Profile_Status",NULL);
     // $this->db->where("PROFILE_PERCENTAGE",'100'); 
      $this->db->order_by("ID", "desc");
      $q = $this->db->from('USER_DETAILS');
      $response = $q->get()->result();
      return $response;
    }
    else
    {
      $response = array();
      $this->db->select('*');
      $this->db->limit($limit, $start);
      $this->db->where("DSA_ID", $dsa_id);
      $this->db->where("ROLE", 7);
      $this->db->order_by("ID", "desc");
      $q = $this->db->from('USER_DETAILS');
      $response = $q->get()->result();
      return $response;
    }

  }

}

?>