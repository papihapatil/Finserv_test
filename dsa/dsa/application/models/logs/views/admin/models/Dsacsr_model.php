<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DsaCsr_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

  function getCsrs($dsa_id, $type, $filter,$search_name){

        if($filter=='all')
        {
             $response = array();
            $this->db->select('*');
            if($type == 'DSA')
            {
             $this->db->where("DSA_ID", $dsa_id);
                if ($filter != '')
                {
                     if ($filter == 'self') 
                    {
                         $this->db->where("MANAGER_ID", 0);
                    }
                }
            }
            else if($type == 'DSA_MANAGER')
            $this->db->where("MANAGER_ID", $dsa_id);
            $this->db->where("ROLE", 6);
            $q = $this->db->from('USER_DETAILS');
            $this->db->order_by("ID", "desc");
             $response = $q->get()->result();
            return $response;
        }
        else if($filter=='search')
        {
             $response = array();
            $this->db->select('*');
            if($type == 'DSA')
            {
             $this->db->where("DSA_ID", $dsa_id);
                if ($filter != '')
                {
                     if ($filter == 'self') 
                    {
                         $this->db->where("MANAGER_ID", 0);
                    }
                }
            }
            else if($type == 'DSA_MANAGER')
            $this->db->where("MANAGER_ID", $dsa_id);
            $this->db->where("ROLE", 6);
            $this->db->where("FN",$search_name);
            $q = $this->db->from('USER_DETAILS');
            $this->db->order_by("ID", "desc");
             $response = $q->get()->result();
            return $response;
        }
        else if($filter=='Complete')
        {
             $response = array();
            $this->db->select('*');
            if($type == 'DSA')
            {
             $this->db->where("DSA_ID", $dsa_id);
                if ($filter != '')
                {
                     if ($filter == 'self') 
                    {
                         $this->db->where("MANAGER_ID", 0);
                    }
                }
            }
            else if($type == 'DSA_MANAGER')
            $this->db->where("MANAGER_ID", $dsa_id);
            $this->db->where("ROLE", 6);
            $this->db->where("Profile_Status",'Complete');
            $q = $this->db->from('USER_DETAILS');
            $this->db->order_by("ID", "desc");
             $response = $q->get()->result();
            return $response;
        }
        else if($filter=='Incomplete')
        {
             $response = array();
            $this->db->select('*');
            if($type == 'DSA')
            {
             $this->db->where("DSA_ID", $dsa_id);
                if ($filter != '')
                {
                     if ($filter == 'self') 
                    {
                         $this->db->where("MANAGER_ID", 0);
                    }
                }
            }
            else if($type == 'DSA_MANAGER')
            $this->db->where("MANAGER_ID", $dsa_id);
            $this->db->where("ROLE", 6);
            $this->db->where("Profile_Status",NULL);
            $q = $this->db->from('USER_DETAILS');
            $this->db->order_by("ID", "desc");
             $response = $q->get()->result();
            return $response;
        }
        else
        {
            $response = array();
            $this->db->select('*');
            if($type == 'DSA')
            {
             $this->db->where("DSA_ID", $dsa_id);
                if ($filter != '')
                {
                     if ($filter == 'self') 
                    {
                         $this->db->where("MANAGER_ID", 0);
                    }
                }
            }
            else if($type == 'DSA_MANAGER')
            $this->db->where("MANAGER_ID", $dsa_id);
            $this->db->where("ROLE", 6);
            $q = $this->db->from('USER_DETAILS');
            $this->db->order_by("ID", "desc");
             $response = $q->get()->result();
            return $response;
        }
  }

  function getDashboardData($id){
    $response = [];
    $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 1 AND CSR_ID = '".$id."'"); 
    $cust_count = $query->row();
    $response['cust_count'] = $cust_count->count;

    $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 7 AND CSR_ID = '".$id."'"); 
    $manager_count = $query->row();
    $response['manager_count'] = $manager_count->count;

    $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where ROLE = 6 AND CSR_ID = '".$id."'"); 
    $csr_count = $query->row();
    $response['csr_count'] = $csr_count->count;

    $query = $this->db->query("SELECT count(*) as count FROM CUSTOMER_APPLIED_LOANS WHERE CUST_ID  IN(select UNIQUE_CODE from USER_DETAILS where CSR_ID = '".$id."')"); 
    $applied_loan_count = $query->row();
    $response['applied_loan_count'] = $applied_loan_count->count;

    $query = $this->db->query("SELECT count(*) as count FROM USER_DETAILS where PROFILE_PERCENTAGE < 100 and ROLE = 1  AND CSR_ID = '".$id."'"); 
    $pending_profile_count = $query->row();
    $response['pending_profile_count'] = $pending_profile_count->count;

    return $response;
}

}
?>