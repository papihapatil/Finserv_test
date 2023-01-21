<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
	
	public function getdata()
	{
		
		
		
		
		$this->db->select('*');
    //$this->db->where("CODE",$key);

	 //   $this->db->where('DATEDIFF(CURTIME(), CREATED_AT) =', 28);

		//	    $this->db->or_where('DATEDIFF(CURTIME(), last_pass_updated_at) =', 28);

    $this->db->from('authenticate');
    $q = $this->db->get();

	$rows = $q->result();

	print_r($rows);

	return $rows;
		
		//$db = \Config\Database::connect();
	//$user = $db->find('authenticate');
	
	//$builder = $db->table('authenticate');
//$query   = $builder->get();

//$row = $query->getResult();
//foreach ($query->getResult() as $row) {
   //  print_r($row);
//}
	
	//$query   = $db->query('SELECT * FROM authenticate');
//$results = $query->getResultArray();

//print_r($results);

return $row;
	
	}
	
	
	public function updatedata($tokenid)
	{
				//$db = \Config\Database::connect();
	//$user = $db->find('authenticate');
	
	//$builder = $db->table('authenticate');
	
	$this->db->where('id', '1');
	
		$this->db->set('TokenId', $tokenid);
		//$builder->where('id', 1);
		
		$this->db->update('authenticate');
		
	}
	
	
	public function insertpremium($premiumobj)
	{
		//$db = \Config\Database::connect();
	//$user = $db->find('authenticate');
	
	//$builder = $db->table('premiumresponse');
	
		
		
		$this->db->insert('finserv_test.premiumresponse',$premiumobj);
		
		//echo $this->db->getLastQuery();
		
		//echo $str = $this->db->last_query();
		
		//exit;
		
		//echo $this->db->getLastQuery()->getQuery();
		
	}
	
}