<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginCrud_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    function login($data){
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('EMAIL', $data['EMAIL']);
          $this->db->or_where('MOBILE', $data['EMAIL']);
          $query = $this->db->get();
          //print_r($this->db->last_query()); exit();
          $email_found = 0; $pass_found = 0; 

          if ( $query->num_rows() > 0 ){
             $email_found = 1;
          }

          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('PASSWORD', md5($data['PASSWORD']));
          $this->db->where("(EMAIL = '".$data['EMAIL']."' OR MOBILE = '".$data['EMAIL']."')");
          
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
			
            $this->session->set_userData("ID", $row->UNIQUE_CODE);
            $this->session->set_userData("AGE", $row->AGE);
            $this->session->set_userData("ROLE", $row->ROLE);
			$this->session->set_userData("login_count", $row->login_count);
			 $this->session->set_userData("ROLE", $row->ROLE);
			 
			 $this->session->set_userData("SITE", 'finserv');
           return $row->ROLE;
		  
          } 
    }

    function loginCustomer($data){
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('EMAIL', $data['EMAIL']);
          $this->db->or_where('MOBILE', $data['EMAIL']);
          $query = $this->db->get();
          //print_r($this->db->last_query()); exit();
          $email_found = 0;

          if ( $query->num_rows() > 0 ){
            $email_found = 1;
          }

          if ($email_found == 0) {
            return 11;
          }else{
            $row = $query->row();
            $this->session->set_userData("ID", $row->UNIQUE_CODE);
            $this->session->set_userData("AGE", $row->AGE);
            $this->session->set_userData("ROLE", $row->ROLE);
            return $row->ROLE;
          } 
    }

    function loginWithMobile($data){
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where('EMAIL', $data['EMAIL']);
          $this->db->or_where('MOBILE', $data['EMAIL']);
          $query = $this->db->get();

          if ( $query->num_rows() > 0 ){
            return 1;
          }else return 0;          
    }

    function checkForgotPassEntry($data){
        $query = $this->db->query("SELECT * FROM forgot_password where CODE ='".$data['CODE']."'"); 
        $row = $query->row();
        return $row;
    }

    function updatepassword($password, $id, $type){
      $converted_pass = md5($password);
        $query = $this->db->query("UPDATE USER_DETAILS set PASSWORD= '".$converted_pass."' where MOBILE ='".$id."'"); 
        if($type == 'email'){
          $query = $this->db->query("UPDATE USER_DETAILS set PASSWORD= '".$converted_pass."' where EMAIL ='".$id."'"); 
        }

        return $query;
    }
	 function updatepassword_dsa($password, $id, $type){
      $converted_pass = md5($password);
        $query = $this->db->query("UPDATE USER_DETAILS set PASSWORD= '".$converted_pass."' where UNIQUE_CODE ='".$id."'"); 
      

        return $query;
    }

    function updatepasswordexpire($password, $id, $type){
      $converted_pass = md5($password);
        $query = $this->db->query("UPDATE forgot_password set IS_EXPIRED = 0 where EMAIL_MOBILE ='".$id."'");                 
        return $query;
    }

    function createForgotPasswordEntry($data){
      return $this->db->insert('forgot_password', $data);
    }

    //================= added by priyanka 30-03-2022
	function login_user_all_data($data)
	{
		$this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where('EMAIL', $data['EMAIL']);
        $this->db->or_where('MOBILE', $data['EMAIL']);        
        $query=$this->db->get();
        $row=$query->row();
        return $row;
	}

	function reset_last_pass_updated_at($data, $data1){
        $this->db->where('EMAIL', $data['EMAIL']);
        $this->db->or_where('MOBILE', $data['EMAIL']); 
      return $this->db->update('USER_DETAILS',$data1);      
    }

}
?>