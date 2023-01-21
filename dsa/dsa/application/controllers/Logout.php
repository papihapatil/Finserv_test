<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');

    }

	public function index(){
		$this->session->unset_userdata("payment_done");
		$this->session->unset_userdata("payment_not_done");
		$this->session->unset_userdata("user_type_from_session");
		$this->session->unset_userdata("cust_consent_status");
		$this->session->unset_userdata("Cust_consent_id");
		$type = $this->session->userdata("USER_TYPE");
		$this->session->unset_userdata("SITE");
		$this->session->set_userdata("USER_TYPE", '');
		if($type == 'ADMIN'){
				redirect(base_url('index.php/admin'));
		}else{
			$data['showNav'] = 0;
			$data['userType'] = "none";
			$data['error'] = "";
			$data['age'] = '';
			//$this->load->view('header', $data);
			$this->load->view('login', $data);
		}			
	}
}
?>