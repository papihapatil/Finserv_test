<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Support_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

    function login($data){
        $this->db->select('*');
        $this->db->from('help_supporter');
        $this->db->where('email', $data['email']);
      
        $query = $this->db->get();
        $email_found = 0; $pass_found = 0; 

        if ( $query->num_rows() > 0 ){
           $email_found = 1;
        }

        $query = 
        $this->db->select('*');
        $this->db->from('help_supporter');
        $this->db->where('password', $data['password']);
        
        $query = $this->db->get();

        if ( $query->num_rows() > 0 ){
           $pass_found = 1;
        }

        if ($pass_found == 0 && $email_found == 0) {
          return 10;
        }else if ($email_found == 0) {
          return 11;
        }else if ($pass_found == 0) {
          return 12;
        }else{
            $row = $query->row();
            return $row->id;
          } 
  }
  public function getProfileData($id){
    $this->db->select('*');
    $this->db->from('help_supporter');
    $this->db->where('id', $id);
    $q = $this->db->get();
    
    $row = $q->row();
    return $row;
  }
  
}
?>