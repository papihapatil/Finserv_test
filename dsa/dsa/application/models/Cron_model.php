<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }


	public function insertcustomer($custid)
	{
		$InsertQuery = "INSERT INTO userdir SET
		dirname = '".$custid."',
		userid = '".$custid."',
		createdate = now()
		";
		$ResultQuery = $this->db->query($InsertQuery);

	}
	
	public function sendexcelfiledsa($filepath)
	{
		$subject = "Customer excell file for today.";
		 $message = "Hi \n \n Please find attached file \n \n You can also download file from server. https://finaleap.com/dsa/dsa/".$filepath." \n \n  Finaleap Support";

//echo "<br>";
/*
$this->sendEmailWithAttachmentdsa('vishnukant.gawade@finaleap.com',$subject,$message,$filepath);
$this->sendEmailWithAttachmentdsa('sandeep.belbhandare@finaleap.com',$subject,$message,$filepath);
$this->sendEmailWithAttachmentdsa('sachin.kardile@finaleap.com',$subject,$message,$filepath);
$this->sendEmailWithAttachmentdsa('shiv@finaleap.com',$subject,$message,$filepath);
$this->sendEmailWithAttachmentdsa('arun.pawar@finaleap.com',$subject,$message,$filepath);
*/
$this->sendEmailWithAttachmentdsa('jaykumar.nimbalkar@gmail.com',$subject,$message,$filepath);
		
	}
	
	public function sendexcelfile($filepath)
	{
		$subject = "Customer excell file for today.";
		 $message = "Hi \n \n Please find attached file \n \n You can also download file from server. https://finaleap.com/dsa/dsa/".$filepath." \n \n  Finaleap Support";

//echo "<br>";
/*
$this->sendEmailWithAttachment('vishnukant.gawade@finaleap.com',$subject,$message,$filepath,$dsa,$conn);
$this->sendEmailWithAttachment('sandeep.belbhandare@finaleap.com',$subject,$message,$filepath,$dsa,$conn);
$this->sendEmailWithAttachment('sachin.kardile@finaleap.com',$subject,$message,$filepath,$dsa,$conn);
$this->sendEmailWithAttachment('shiv@finaleap.com',$subject,$message,$filepath,$dsa,$conn);
$this->sendEmailWithAttachment('arun.pawar@finaleap.com',$subject,$message,$filepath,$dsa,$conn);
*/
$this->sendEmailWithAttachment('jaykumar.nimbalkar@gmail.com',$subject,$message,$filepath);
		
	}
	
	public function truncatetable()
	{
		$this->db->query("TRUNCATE table userdir");
	}


	public function createdircust()
	{
		//$this->db->query("TRUNCATE table userdir");
		

		$this->db->select('*');

$this->db->where("ROLE",1);

		//		    $this->db->where("customer_consent",NULL);

			//		$this->db->or_where('customer_consent', '');

 //$this->db->where("credit_sanction_status",NULL);

				//	$this->db->or_where('credit_sanction_status', '');


$this->db->from('USER_DETAILS');

 $q = $this->db->get();

//print_r($q);
$rows = $q->result();

$dirarr = array();



foreach($rows as $row)
		{
		//	print_r($row);

			$this->db->select('*');

$this->db->where("userid",$row->ID);


$this->db->from('userdir');

 $q = $this->db->get();

//print_r($q);
$users = $q->result();

if(count($users) > 0)
			{

			}else
			{
				
				$dirarr[] = $row;
			}

		}

//print_r($dirarr);

return $dirarr;
		
	}

public function update_customer_consent()
	{
		
		//echo "update_customer_consent";
//$this->db->set('field', 'field+1', FALSE);

$this->db->select('*');
$this->db->where('DATEDIFF(CURTIME(), CREATED_AT) =', 15);

$this->db->where("ROLE",1);

				    $this->db->where("customer_consent",NULL);

					$this->db->or_where('customer_consent', '');

 $this->db->where("credit_sanction_status",NULL);

					$this->db->or_where('credit_sanction_status', '');


$this->db->from('USER_DETAILS');

 $q = $this->db->get();

//print_r($q);
$rows = $q->result();
    //  print_r($this->db->last_query());  
	//  echo "<pre>";
//print_r($rows);


foreach($rows as $row){

$subject = "Auto Rejected";

  echo $message = "Hi ".$row->FN." \n \n You not provided consent for 15 days so your application is Auto Rejected \n \n Please contact Branch Manager If you want sign in again. \n \n Finaleap Support";

//echo "<br>";
$this->sendEmail($row->EMAIL,$subject,$message);

//echo "<pre>";
//print_r($row);

$BM_ID = $row->BM_ID;

 $RO_ID = $row->RO_ID;



if(isset($BM_ID) && $BM_ID != '0' && $BM_ID != '' )
	{

	//echo "T".$BM_ID;

		$this->db->select('*');
    $this->db->where("UNIQUE_CODE",$BM_ID);

	    
    $this->db->from('USER_DETAILS');
    $bm = $this->db->get();

	$bmrow = $bm->result();

$subject = "Password expired";

  echo $message = "Hi ".$row->FN." (".$row->EMAIL.") \n \n You not provided consent for 15 days so your application is Auto Rejected \n \n Please contact Branch Manager If you want sign in again. \n \n  Finaleap Support";

//echo "<br>";
$this->sendEmail($bmrow[0]->EMAIL,$subject,$message);



	}

	//echo "TEST".$RO_ID;

	if(isset($RO_ID) && $RO_ID != '0'  && $RO_ID != '' )
	{
		//echo $RO_ID;

		$this->db->select('*');
    $this->db->where("UNIQUE_CODE",$RO_ID);

	    
    $this->db->from('USER_DETAILS');
    $ro = $this->db->get();

	$rorow = $ro->result();

	//print_r($rorow);

$subject = "Password expired";

   $message = "Hi ".$row->FN." (".$row->EMAIL.")  \n \n You not provided consent for 15 days so your application is Auto Rejected \n \n Please contact Branch Manager If you want sign in again. \n \n  Finaleap Support";

//echo "<br>";
$this->sendEmail($rorow[0]->EMAIL,$subject,$message);

	}


}


					$subject = "update_customer_consent";

  $message = "Hi update_customer_consent";

$this->sendEmail('jaykumar.nimbalkar@gmail.com',$subject,$message);


				$this->db->set('credit_sanction_status', 'REJECTED');


			    $this->db->where('DATEDIFF(CURTIME(), CREATED_AT) =', 15);

				$this->db->where("ROLE",1);

				    $this->db->where("customer_consent",NULL);

					$this->db->or_where('customer_consent', '');

 $this->db->where("credit_sanction_status",NULL);

					$this->db->or_where('credit_sanction_status', '');

					
					$this->db->update('USER_DETAILS');








	}
	
	       // $this->email->attach('./images/all_document_pdf/'.$respnse_no.'.pdf');

public function sendEmailWithAttachment($email, $subject, $message,$attachment){
		$config['protocol']=PROTOCOL;
		$config['smtp_host']=SMTP_HOST;
		$config['smtp_port']=SMTP_PORT;
		$config['smtp_timeout']=SMTP_TIMEOUT;
		$config['smtp_crypto']=SMTP_CRYPTO;
		$config['smtp_user']=SMTP_USER;
		$config['smtp_pass']=SMTP_PASS;
		$config['charset']=CHARSET;
		$config['newline']=NEWLINE;
		$config['wordwrap'] = WORDWRAP2;
		$config['mailtype'] = MAILTYPE;
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$from_email = FROM_EMAIL;
		$this->email->from($from_email, 'Finaleap'); 
		$this->email->to($email);
		$this->email->subject($subject); 
		
		$this->email->message($message);

		$this->email->attach($attachment);
		
		//$this->email->attach($dsa);
		
		//$this->email->attach($conn);
				
		//Send mail 
		if($this->email->send()) {	
			
		}else{
			
		}
	}
	
	public function sendEmailWithAttachmentdsa($email, $subject, $message,$attachment){
		$config['protocol']=PROTOCOL;
		$config['smtp_host']=SMTP_HOST;
		$config['smtp_port']=SMTP_PORT;
		$config['smtp_timeout']=SMTP_TIMEOUT;
		$config['smtp_crypto']=SMTP_CRYPTO;
		$config['smtp_user']=SMTP_USER;
		$config['smtp_pass']=SMTP_PASS;
		$config['charset']=CHARSET;
		$config['newline']=NEWLINE;
		$config['wordwrap'] = WORDWRAP2;
		$config['mailtype'] = MAILTYPE;
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$from_email = FROM_EMAIL;
		$this->email->from($from_email, 'Finaleap'); 
		$this->email->to($email);
		$this->email->subject($subject); 
		
		$this->email->message($message);

		$this->email->attach($attachment);
		
		//$this->email->attach($dsa);
		
		//$this->email->attach($conn);
				
		//Send mail 
		if($this->email->send()) {	
			
		}else{
			
		}
	}
	

	public function sendEmail($email, $subject, $message){
				$config['protocol']=PROTOCOL;
		$config['smtp_host']=SMTP_HOST;
		$config['smtp_port']=SMTP_PORT;
		$config['smtp_timeout']=SMTP_TIMEOUT;
		$config['smtp_crypto']=SMTP_CRYPTO;
		$config['smtp_user']=SMTP_USER;
		$config['smtp_pass']=SMTP_PASS;
		$config['charset']=CHARSET;
		$config['newline']=NEWLINE;
		$config['wordwrap'] = WORDWRAP2;
		$config['mailtype'] = MAILTYPE;
		//$config['mailtype'] = 'text';
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$from_email = FROM_EMAIL;
		$this->email->from($from_email, 'Finaleap'); 
		$this->email->to($email);
		$this->email->bcc('customercare@finaleap.com');
		$this->email->subject($subject); 
		
		echo "BCC";
		
		$this->email->message($message); 
				
		//Send mail 
		if($this->email->send()) {	
			
		}else{
			
		}
	}


	public function getUser($key)
	{

		$this->db->select('*');
    $this->db->where("CODE",$key);

	 //   $this->db->where('DATEDIFF(CURTIME(), CREATED_AT) =', 28);

		//	    $this->db->or_where('DATEDIFF(CURTIME(), last_pass_updated_at) =', 28);

    $this->db->from('update_password');
    $q = $this->db->get();

	$rows = $q->result();

	//print_r($rows);

	return $rows[0];

	}

function createUpdateEntry($data){
      return $this->db->insert('update_password', $data);
    }
	public function resetpassword()
	{

		$this->db->select('*');
    $this->db->where("last_pass_updated_at",NULL);

	    $this->db->where('DATEDIFF(CURTIME(), CREATED_AT) =', 28);

			    $this->db->or_where('DATEDIFF(CURTIME(), last_pass_updated_at) =', 28);

    $this->db->from('USER_DETAILS');
    $q = $this->db->get();

//print_r($q);
$rows = $q->result();
//echo "<pre>";

//echo $this->db->last_query();

//$subject = "Password will expire within two days.";

 // $message = "Hi  \n \n Your Password is expiring within 2 days. \n \n Please reset your password http://localhost/dsa/dsa/index.php/Cron/changepassword here  \n \n Finaleap Support";

//$this->sendEmail('jaykumar.nimbalkar@gmail.com',$subject,$message);


foreach($rows as $row){

$subject = "Password will expire within two days.";
$uid = $this->generate_uuid();
date_default_timezone_set('Asia/Kolkata');
						$date = date('Y-m-d H:i:s');						
						$dataForgot = array('EMAIL_MOBILE' => $row->EMAIL, 'DATE_TIME'=>$date, 'CODE'=>$uid, 'TYPE'=>'Email');
$this->createUpdateEntry($dataForgot);
//echo $this->db->last_query();
   $message = "Hi ".$row->FN." \n \n Your Password is expiring within 2 days. \n \n Please reset your password https://finaleap.com/dsa/dsa/index.php/Cron/changepassword/".$uid." here  \n \n Finaleap Support";

$this->sendEmail($row->EMAIL,$subject,$message);
$BM_ID = $row->BM_ID;

$RO_ID = $row->RO_ID;

if(isset($BM_ID) && $BM_ID != '0' )
	{

		$this->db->select('*');
    $this->db->where("UNIQUE_CODE",$BM_ID);

	    
    $this->db->from('USER_DETAILS');
    $bm = $this->db->get();

	$bmrow = $bm->result();

$subject = "Password expired";

  $message = "Hi ".$row->FN." (".$row->EMAIL.") \n \n Your Password is expiring within 2 days. \n \n Please reset your password https://finaleap.com/dsa/dsa/index.php/Cron/changepassword/".$uid." here  \n \n Finaleap Support";

//echo "<br>";
$this->sendEmail($bmrow[0]->EMAIL,$subject,$message);



	}

	if(isset($RO_ID) && $RO_ID != '0' )
	{

		$this->db->select('*');
    $this->db->where("UNIQUE_CODE",$RO_ID);

	    
    $this->db->from('USER_DETAILS');
    $ro = $this->db->get();

	$rorow = $ro->result();

	//print_r($rorow);

$subject = "Password expired";

  $message = "Hi ".$row->FN." (".$row->EMAIL.") \n \n Your Password is expiring within 2 days. \n \n Please reset your password https://finaleap.com/dsa/dsa/index.php/Cron/changepassword/".$uid." here  \n \n Finaleap Support";

//echo "<br>";
$this->sendEmail($rorow[0]->EMAIL,$subject,$message);

	}

 // print_r($row);



	}

	}
	
	
	public function consenttat()
	{

		$this->db->select('*');
    //$this->db->where("last_pass_updated_at",NULL);

	    $this->db->where('DATEDIFF(CURTIME(), CREATED_AT) =', 2);

$this->db->where("ROLE",1);

				    $this->db->where("customer_consent",NULL);

					$this->db->or_where('customer_consent', '');

    $this->db->from('USER_DETAILS');
    $q = $this->db->get();

//print_r($q);
$rows = $q->result();

//print_r($rows);

foreach($rows as $row){

$subject = "User not given consent 2 days";
$uid = $this->generate_uuid();
date_default_timezone_set('Asia/Kolkata');
						$date = date('Y-m-d H:i:s');						
						$dataForgot = array('EMAIL_MOBILE' => $row->EMAIL, 'DATE_TIME'=>$date, 'CODE'=>$uid, 'TYPE'=>'Email');
$this->createUpdateEntry($dataForgot);
//echo $this->db->last_query();
   $message = "Hi ".$row->FN." ".$row->LN.",  \n \n you not send consent within 2 days. \n \n Please send consent  \n \n Finaleap Support";

$this->sendEmail($row->EMAIL,$subject,$message);
$BM_ID = $row->BM_ID;

$RO_ID = $row->RO_ID;

if(isset($BM_ID) && $BM_ID != '0' )
	{

		$this->db->select('*');
    $this->db->where("UNIQUE_CODE",$BM_ID);

	    
    $this->db->from('USER_DETAILS');
    $bm = $this->db->get();

	$bmrow = $bm->result();

$subject = "Password expired";

  //$message = "Hi ".$row->FN." (".$row->EMAIL.") \n \n Your Password is expiring within 2 days. \n \n Please reset your password https://finaleap.com/dsa/dsa/index.php/Cron/changepassword/".$uid." here  \n \n Finaleap Support";
$message = "Hi,  \n \n ".$row->FN." ".$row->LN." (".$row->EMAIL.") not send consent within 2 days. \n \n Please consult with user for sending consent  \n \n Finaleap Support";

//echo "<br>";
$this->sendEmail($bmrow[0]->EMAIL,$subject,$message);



	}

	if(isset($RO_ID) && $RO_ID != '0' )
	{

		$this->db->select('*');
    $this->db->where("UNIQUE_CODE",$RO_ID);

	    
    $this->db->from('USER_DETAILS');
    $ro = $this->db->get();

	$rorow = $ro->result();

	//print_r($rorow);

$subject = "Password expired";

  //$message = "Hi ".$row->FN." (".$row->EMAIL.") \n \n Your Password is expiring within 2 days. \n \n Please reset your password https://finaleap.com/dsa/dsa/index.php/Cron/changepassword/".$uid." here  \n \n Finaleap Support";
$message = "Hi,  \n \n ".$row->FN." ".$row->LN." (".$row->EMAIL.") not send consent within 2 days. \n \n Please consult with user for sending consent  \n \n Finaleap Support";

//echo "<br>";
$this->sendEmail($rorow[0]->EMAIL,$subject,$message);

	}

 // print_r($row);



	}

	}
	
	
	function updatepassword2($password, $id, $type){
      $converted_pass = md5($password);
	 // echo "TEST";
	 // print_r($_REQUEST);
        $query = $this->db->query("UPDATE USER_DETAILS set PASSWORD= '".$converted_pass."',last_pass_updated_at = now() where MOBILE ='".$id."'"); 
        if($type == 'Email'){
          $query = $this->db->query("UPDATE USER_DETAILS set PASSWORD= '".$converted_pass."',last_pass_updated_at = now() where EMAIL ='".$id."'"); 
		 // echo "UPDATE USER_DETAILS set PASSWORD= '".$converted_pass."',last_pass_updated_at = now() where EMAIL ='".$id."'";

		 // exit;
        }

		return $query;

	}

	function updatepasswordexpire($password, $id, $type){
      $converted_pass = md5($password);
        $query = $this->db->query("UPDATE update_password set IS_EXPIRED = 0 where EMAIL_MOBILE ='".$id."'");                 
        return $query;
    }
	
	
	public function updatepassword()
	{

			//echo "Customer Consent";

		$this->db->select('*');
    $this->db->where("last_pass_updated_at",NULL);

	    $this->db->where('DATEDIFF(CURTIME(), CREATED_AT) =', 30);

			    $this->db->or_where('DATEDIFF(CURTIME(), last_pass_updated_at) =', 30);

    $this->db->from('USER_DETAILS');
    $q = $this->db->get();

//print_r($q);
$rows = $q->result();
//echo "<pre>";

//$subject = "Password expired";

  //$message = "Hi  \n \n Your Password is expired. \n \n Please reset your password \n \n Finaleap Support";

//echo "<br>";
//$this->sendEmail('jaykumar.nimbalkar@gmail.com',$subject,$message);

foreach($rows as $row){

$subject = "Password expired";

  $message = "Hi ".$row->FN." \n \n Your Password is expired. \n \n Please reset your password \n \n Finaleap Support";

//echo "<br>";
$this->sendEmail($row->EMAIL,$subject,$message);

//echo "<pre>";
//print_r($row);

$BM_ID = $row->BM_ID;

 $RO_ID = $row->RO_ID;



if(isset($BM_ID) && $BM_ID != '0'  && $BM_ID != '' )
	{

	//echo "T".$BM_ID;

		$this->db->select('*');
    $this->db->where("UNIQUE_CODE",$BM_ID);

	    
    $this->db->from('USER_DETAILS');
    $bm = $this->db->get();

	$bmrow = $bm->result();

$subject = "Password expired";

   $message = "Hi ".$row->FN." (".$row->EMAIL.") \n \n Your Password is expired. \n \n Please reset your password \n \n Finaleap Support";

//echo "<br>";
$this->sendEmail($bmrow[0]->EMAIL,$subject,$message);



	}

	//echo "TEST".$RO_ID;

	if(isset($RO_ID) && $RO_ID != '0' && $RO_ID != '' )
	{
		//echo $RO_ID;

		$this->db->select('*');
    $this->db->where("UNIQUE_CODE",$RO_ID);

	    
    $this->db->from('USER_DETAILS');
    $ro = $this->db->get();

	$rorow = $ro->result();
echo "<pre>";
	//print_r($rorow);

$subject = "Password expired";

   $message = "Hi ".$row->FN." (".$row->EMAIL.")  \n \n Your Password is expired. \n \n Please reset your password \n \n Finaleap Support";

//echo "<br>";
$this->sendEmail($rorow[0]->EMAIL,$subject,$message);

	}


}

//echo $this->db->last_query();
//		echo "</pre>";

	}


	public function TestCron()
	{

		$subject = "Password expired";

  $message = "Hi  \n \n Your Password is expired. \n \n Please reset your password \n \n Finaleap Support";

//echo "<br>";
$this->sendEmail('jaykumar.nimbalkar@gmail.com',$subject,$message);

	}

public function get_customer_consent()
	{
		//echo "Customer Consent";

		$this->db->select('*');
    $this->db->where("customer_consent",NULL);

	    $this->db->where('DATEDIFF(CURTIME(), CREATED_AT) >', 15);

    $this->db->from('user_details');
    $q = $this->db->get();

	echo $this->db->last_query();
	$numrows = $q->num_rows();

	}


	public function generate_uuid() {
		return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
			mt_rand( 0, 0xffff ),
			mt_rand( 0, 0x0C2f ) | 0x4000,
			mt_rand( 0, 0x3fff ) | 0x8000,
			mt_rand( 0, 0x2Aff ), mt_rand( 0, 0xffD3 ), mt_rand( 0, 0xff4B )
		);
	
	}


	public function changepassword()
	{
		echo "Change Password";

	}

}

?>