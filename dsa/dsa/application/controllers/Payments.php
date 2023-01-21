<?php

class Payments extends CI_Controller {
	
	private $merchantId; //
	private $txnId;
	private $totalamount; //
	private $accountNo; //
	private $consumerId;
	private $consumerMobileNo; //
	private $consumerEmailId; //
	private $debitStartDate; //
	private $debitEndDate; //
	private $maxAmount; //
	private $amountType; //
	private $frequency; //
	private $cardNumber; //
	private $expMonth;  //
	private $expYear; //
	private $cvvCode; //
	private $SALT; //
	

	private $token;
	private $deviceId;
	private $returnUrl;
	private $responseHandler;
	private $paymentMode;
	//private $merchantId;
	private $txnType;
	private $txnSubType;
	private $items = array();
	private $bankCode;
	//private $accountNo;
	private $accountType;
	private $accountHolderName;
	private $ifscCode;
	
	

    public function __construct() {
        parent:: __construct();
		
		$this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Admin_model');
		$this->load->model('Dsacrud_model');
		$this->load->model('Accountant_model');
		
		$this->load->model('Payments_model');
		
       $this->load->model('credit_manager_user_model');
       $this->load->model('common_model','common');
        $this->load->library('email');
       $this->load->model('Operations_user_model');
        $this->load->model('Customercrud_model');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Sales_Manager_model');
        $this->load->library('upload');
	
	}
	
	
	public function paymentwebform($id=0)
	{
		
		if(isset($id) && $id=='')
				{
				$id = $this->session->userdata("ID");
				}
			
				$row=$this->Customercrud_model->getProfileData($id);
				
				$data['row'] = $row;
				
				//print_r($row);
		
		//$data = array();
		
				$this->load->view('dashboard_profile_header', $data);

		$this->load->view('Payments/paymentwebform', $data);
		
	}
	
	public function getData($data)
	{
		 $this->load->view('Payments/enachtemplate', $data);
		
	}
	
	public function getFieldArr()
	{
		//$this->view
			  

	}
	
	public function mandatelist()
	{
		
		$mandatelist=$this->Payments_model->getMandateList();
		
		print_r($mandatelist);

		
	}
	
	public function managemandate()
	{
		
		$result = $this->Payments_model->getMandateList();
		//echo "<pre>";
		//print_r($result);
		
		//echo "</pre>";
		
		//echo "<pre>";
		//print_r($_REQUEST);
		
		if(isset($_REQUEST['I']))
		{
		
		 $mandateuserid = base64_decode($_REQUEST['I']);
		 
		}
		
		//echo "</pre>";
		
		
		
		//exit;
		
		$userid = $this->session->userdata("ID");
				
			
				$row=$this->Customercrud_model->getProfileData($userid);
				
				$data2['row']=$row;
		
		$data['result'] = $result;
		
		$this->load->view('dashboard_header', $data2);
		
		$this->load->view('Payments/managemandate', $data);
		
	}
	
	
	public function listtransaction2()
	{
		
		
		
	}
	
	public function mandatelink($id=1)
	{
		
		//$id = 26;
		
		//echo $id;
		
		//$userid = $this->session->userdata("ID");
				
			
				$row=$this->Payments_model->getMandateLink($id);
				
				//print_r($row);
				
				//exit;
				
				//$row = "testr";
				
				//$data['row'] = $row;
		//$result = $this->Payments_model->getMandateData($id);
		
		//print_r($result);
		
		//exit;
		
		$data['mandatedetails'] = $row;
		
		//$this->load->view('dashboard_profile_header', $data);
		//echo 'Test';
	  //print_r($_REQUEST);
	  //exit;
	   $this->load->view('Payments/mandatelink', $data);

		
	}
	
	public function MandateVerification()
	{
		//print_r($_REQUEST);
		$mandateid = $this->input->get('ID');

		
		//echo "Test 3 ".$mandateid;
		
		$mandatedata = $this->Payments_model->getMandateData($mandateid);
		
		//print_r($mandatedata);
		
		//exit;
		
		$startdate = $mandatedata->startdate;
		
		$enddate = $mandatedata->enddate;
		
		$mandateid = $mandatedata->id;
		
		//exit;
		
		$url = "https://www.paynimo.com/api/paynimoV2.req";
		
	/*	$JSONArr['merchant']['identifier'] = 'T764243';
		
		$JSONArr['payment']['instruction'] = '';

		
		
		$JSONArr['transaction']['deviceIdentifier'] = 'S';
		
		$JSONArr['transaction']['type'] = '002';
		
		$JSONArr['transaction']['currency'] = 'INR';
				
		$JSONArr['transaction']['identifier'] = '1854744735';
		
		$JSONArr['transaction']['dateTime'] = '03-09-2022';

		
		$JSONArr['transaction']['subType'] = '003';
		
		$JSONArr['transaction']['requestType'] = 'TSI';
		
		
		$JSONArr['consumer']['identifier'] = 'c90001008';

	echo "<pre>";
	
	print_r($JSONArr);
	
	 $JSON2 = json_encode($JSONArr); 
	 
	 $JSON2 = '{

  "merchant": {

    "identifier": "T764243"

  },

  "payment": {

    "instruction": {}

  },

  "transaction": {

    "deviceIdentifier": "S",

    "type": "002",

    "currency": "INR",

    "identifier": "156321",

    "dateTime": "26-07-2022",

    "subType": "002",

    "requestType": "TSI"

  },

  "consumer": {

    "identifier": "60091701"

  }

}';

*/

$cosumerid = $mandatedata->cosumerid;
$txnid = $mandatedata->txnId;

$createdate = $mandatedata->createdate2;
	
	  $JSON = '{
  "merchant": {
    "identifier": "T764243"
  },
  "payment": {
    "instruction": {}
  },
  "transaction": {
    "deviceIdentifier": "S",
    "type": "002",
    "currency": "INR",
    "identifier": "'.$txnid.'",
    "dateTime": "'.$createdate.'",
    "subType": "002",
    "requestType": "TSI"
  },
  "consumer": {
    "identifier": "'.$cosumerid.'"
  }
}';

//echo $JSON;
		
		$ch = curl_init( $url );
# Setup request to send json via POST.
//$payload = json_encode( array( "customer"=> $data ) );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $JSON );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
//echo "<pre>$result</pre>";
$response = json_decode($result);

$data3['response'] = trim($result);

$data3['responsetype'] = 'Mandate';

$data3['status'] = 'Transaction';

$mandate_reg_num = $response->paymentMethod->token;

$this->Payments_model->saveresponse($data3);


  $statuscode = $response->paymentMethod->paymentTransaction->statusCode;

  $statusMessage = $response->paymentMethod->paymentTransaction->statusMessage;
  
  
  $data['statuscode'] = $statuscode;
  
  
  $data['statusMessage'] = $statusMessage;
  
  
  $dbdata['status'] = $statuscode;
  
  $dbdata['message'] = $statusMessage;
  
  $dbdata['mandate_reg_num'] = $mandate_reg_num;
  
  $this->Payments_model->UpdateMandate($dbdata,$mandateid);
  

	$userid = $this->session->userdata("ID");
				
			
				$row=$this->Customercrud_model->getProfileData($userid);
				
				$data2['row']=$row;
		
		$data['result'] = $result;
		
		$this->load->view('dashboard_profile_header', $data2);
		
		$this->load->view('Payments/MandateVerification', $data);


	}

	
	public function ScheduleTransaction2()
	{
		$url = "curl -X POST --data @taskjson.txt https://www.paynimo.com/api/paynimoV2.req";
		
		$return = exec($url);
		
		print_r($return);
		
	}
	
	public function form2()
	{
		
		$this->load->view('dashboard_profile_header', $data);
		//echo 'Test';
	  //print_r($_REQUEST);
	  //exit;
	   $this->load->view('Payments/TestNetbanking', $data);
		
		
	}
	
	public function netbanking()
	{
		
		$this->consumerEmailId = $this->input->post('email'); //
				
				$this->consumerMobileNo = $this->input->post('mobile'); //
				
				$this->totalamount = $this->input->post('totalamount'); //
				
				$this->maxAmount = $this->input->post('maxAmount'); //
				
				$this->debitStartDate = $this->input->post('debitStartDate'); //
				
				$this->debitEndDate = $this->input->post('debitEndDate'); //

				
				$this->cardNumber = $this->input->post('cardNumber'); //
				
				$this->expMonth = $this->input->post('expMonth'); //
				
				$this->expYear = $this->input->post('expYear'); //
				
				$this->cvvCode = $this->input->post('cvvCode'); //
				
				$this->bankCode = $this->input->post('bankCode');
				
				$this->accountNo = $this->input->post('accountNo'); //
				
				$this->accountType = $this->input->post('accountType');
				
				$this->accountHolderName = $this->input->post('accountHolderName');
				
				$this->itemId = 'Test';

				$this->ifscCode = $this->input->post('ifscCode');

				$this->amount = $this->input->post('amount');

				$this->comAmt = $this->input->post('comAmt');


				$this->paymentMode = $this->input->post('paymentMode');
				
				$this->frequency = $this->input->post('frequency'); //
				
				$this->amountType = $this->input->post('amountType'); //
				
				$this->txnSubType = $this->input->post('txnSubType');
				
				$this->cartDescription = $this->input->post('cartDescription');
				
				$this->merchantId ='T764243'; //
				
				$this->SALT = '9713751370GPPGFH'; //
				
				$this->txnId = "45346";
				
				$this->consumerId = "900000004305";
				
				
				  $FieldList = $this->merchantId."|".$this->txnId."|".$this->totalamount."|".$this->accountNo."|".$this->consumerId."|".$this->consumerMobileNo."|".$this->consumerEmailId."|".$this->debitStartDate."|".$this->debitEndDate."|".$this->maxAmount."|".$this->amountType."|".$this->frequency."|".$this->cardNumber."|".$this->expMonth."|".$this->expYear."|".$this->cvvCode."|".$this->SALT;
				
				//echo $this;
				// echo $FieldList."<br>";
				
				//  echo $token = hash('sha512',$FieldList);
				
				
				//exit;
				
				// echo "Txnid = ".$this->txnId;
				
		$data['txnId'] = $this->txnId;
		$data['token'] = $token;
		
		$data['maxAmount'] = $this->maxAmount;
		$data['amountType'] = $this->amountType;
		$data['consumerEmailId'] = $this->consumerEmailId;

		$data['consumerMobileNo'] = $this->consumerMobileNo;

		$data['totalamount'] = $this->totalamount;
		
		$data['debitStartDate'] = $this->debitStartDate;
		
		
		$data['debitEndDate'] = $this->debitEndDate;

		$data['cardNumber'] = $this->cardNumber;

		$data['expMonth'] = $this->expMonth;
		
		$data['expYear'] = $this->expYear;
		
		$data['cvvCode'] = $this->cvvCode;
		
		
		$data['bankCode'] = $this->bankCode;

		$data['accountNo'] = $this->accountNo;

		$data['accountType'] = $this->accountType;
		
		$data['accountHolderName'] = $this->accountHolderName;
		
		 // $data['itemId'] = $this->itemId;

$data['itemId'] = "Test";

$data['frequency'] = $this->frequency;

		$data['ifscCode'] = $this->ifscCode;

		$data['amount'] = $this->amount;
		
		$data['comAmt'] = $this->comAmt;
		
		$data['paymentMode'] = $this->paymentMode;



$data['txnSubType'] = $this->txnSubType;

		$data['cartDescription'] = $this->cartDescription;

		$data['merchantId'] = $this->merchantId;
		
		$data['SALT'] = $this->SALT;
		
		$data['consumerId'] = $this->consumerId;
		$this->load->view('dashboard_profile_header', $data);
		//echo 'Test';
	  //print_r($_REQUEST);
	  //exit;
	   $this->load->view('Payments/TestNetbanking', $data);
		
		
	}
	
	public function listtransactions()
	{
		
		$filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
	$userType=$this->session->userdata("USER_TYPE");  
      $id = $this->session->userdata('ID');
	  
	  		 $result = $this->Customercrud_model->getProfileData($id);
			 //echo "User id = ";
			 $userid = $result->ID;
	 
	 $draw = $_POST['draw'];
     $row = $_POST['start'];
     $rowperpage = $_POST['length']; // Rows display per page
     $columnIndex = $_POST['order'][0]['column']; // Column index
    
     $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
     
     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
     $searchValue = $_POST['search']['value']; // Search value
     ## Search
     $searchQuery = " ";
	 //exit;
	  $sel = $this->Payments_model->gettransactioncount($userid);
	 
	 
	 
	  $totalRecords = $sel;
	 
	  $sel = $this->Payments_model->gettransactionsfilter($userid);
	 
	  $totalRecordwithFilter =$sel;
	  
	  //exit;
	 
	 $sel = $this->Payments_model->gettransactionfilterlist($userid,$row,$rowperpage);
	 
	//print_r($sel);
	// echo "TEST";
	//exit;
	 $empReceords = $sel;
	 
	  $data = array();

	if(count($empReceords) > 0)
		{
     foreach($empReceords as $row)
         {
            
            
         /*   if($row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
			   if($row->status == 'Revert')
			   {
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/retailers/editrequest?id='.$row->id.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
			   }
				else
				{
					
					$link = "";
				}
				*/
				
				$link = "";
               $link3='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
              $link = "";
			 $link ='<a href="'. base_url().'index.php/Payments/MandateVerification?ID='.$row->id.'" Class="btn modal_test">Verify Mandate</a>';
			
			$link1 ='<a href="'. base_url().'index.php/Payments/TransactionSchedule2?ID='.$row->id.'" Class="btn modal_test">Schedule Transaction</a>';
			  
			// $link2 ='<a href="'. base_url().'index.php/Payments/VerifyTransaction2?ID='.$row->id.'" Class="btn modal_test">Verify Transaction</a>';
			
			$link2 ='<a href="'. base_url().'index.php/Payments/ViewTransaction?ID='.$row->id.'" Class="btn modal_test">View Transaction</a>';
			
			  //$link1 = "";
        
        $data[] = array(
             //"ID"=>$row->ID,
           // "invoiceissuedby"=>$row->invoiceissuedby,
            "merchantid"=>$row->merchantid,
            "fullname"=>$row->fullname,
          
            "emailid"=>$row->emailid,
			"phonenumber"=>$row->phonenumber,
			"accounttype"=>$row->accounttype,			
           "collectionamount"=>$row->collectionamount,
		   
            //"Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
            "Action"=>$link." ".$link1." ".$link2." ".$link3,
          
        );                                                                 
         }
		
		
	}
	
	}
	
	
	public function managetransaction()
	{
		$result = $this->Payments_model->getMandateList();
		//echo "<pre>";
		//print_r($result);
		
		//echo "</pre>";
		
		$userid = $this->session->userdata("ID");
				
			
				$row=$this->Customercrud_model->getProfileData($userid);
				
				$data2['row']=$row;
		
		$data['result'] = $result;
		
		$this->load->view('dashboard_header', $data2);
		
		$this->load->view('Payments/managetransaction', $data);
		
		
		
	}
	
	
	public function listtransaction()
	{
		
		$filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
	$userType=$this->session->userdata("USER_TYPE");  
      $id = $this->session->userdata('ID');
	  
	  		 $result = $this->Customercrud_model->getProfileData($id);
			 //echo "User id = ";
			 $userid = $result->ID;
	 
	 $draw = $_POST['draw'];
     $row = $_POST['start'];
     $rowperpage = $_POST['length']; // Rows display per page
     $columnIndex = $_POST['order'][0]['column']; // Column index
    
     $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
     
     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
     $searchValue = $_POST['search']['value']; // Search value
     ## Search
     $searchQuery = " ";
	 //exit;
	  $sel = $this->Payments_model->gettransactioncount($userid);
	 
	 
	 
	  $totalRecords = $sel;
	 
	  $sel = $this->Payments_model->gettransactionfilter($userid);
	 
	  $totalRecordwithFilter =$sel;
	  
	  //exit;
	 
	 $sel = $this->Payments_model->gettransactionfilterlist($userid,$row,$rowperpage);
	 
	// print_r($sel);
	// echo "TEST";
	//exit;
	 $empReceords = $sel;
	 
	  $data = array();

	if(count($empReceords) > 0)
		{
     foreach($empReceords as $row)
         {
            
            
         /*   if($row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
			   if($row->status == 'Revert')
			   {
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/retailers/editrequest?id='.$row->id.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
			   }
				else
				{
					
					$link = "";
				}
				*/
				
				$link = "";
				
				$link1 = ""; 
				if($row->responsecode == 300 ||  $row->responsecode == 398 )
				{
               $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
              $link = "<a href='https://finaleap.com/finaleap_finserv/dsa/dsa/index.php/Payments/TransactionSchedule/$row->id'>Schedule Transaction </a>";
			  
			  $link1 = "<a href='https://finaleap.com/finaleap_finserv/dsa/dsa/index.php/Payments/TransactionVerification/$row->id'>Verify Transaction </a>";

				}
        $data[] = array(
             //"ID"=>$row->ID,
           // "invoiceissuedby"=>$row->invoiceissuedby,
            "responsecode"=>$row->responsecode,
            "message"=>$row->message,
          
            "clienttxn"=>$row->clienttxn,
			"bankid"=>$row->bankid,
			"tspltxnid"=>$row->tspltxnid,			
           "mandate_reg_no"=>$row->mandate_reg_no,
		   "txn_amt"=>$row->txn_amt,
            //"Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
            "Action"=>$link." ".$link1,
          
        );                                                                 
         }

		}

      
         
       // print_r($data);
     
     $response = array(
     "draw" => intval($draw),
     "iTotalRecords" => $totalRecords,
     "iTotalDisplayRecords" => $totalRecordwithFilter,
     "aaData" => $data
     );
     echo json_encode($response);
	 
		
		
	
		
	}
	
	public function getResponse()
	{
		$result = $this->Payments_model->getResponseList();
		echo "<pre>";
		print_r($result);
		
	}
	
		public function TransactionVerification($id='')
	{
		
		//echo $id;
		
		$row = $this->Payments_model->getTransactionsDetails($id);
		
		//print_r($row);
		
		//exit;
		
		 //$clienttxn = $row->clienttxn;
		
		//echo "TEST test";
		
		$identifier = $row->identifier;
		$dateTime = $row->dateTime;
		
		$JSONArr = array();
		
		$url = "https://www.paynimo.com/api/paynimoV2.req";
		
		$JSONArr['merchant']['identifier'] = 'T764243';
		
		$JSONArr['payment']['instruction'] = '';

		
		
		$JSONArr['transaction']['deviceIdentifier'] = 'S';
		
		$JSONArr['transaction']['type'] = '002';
		
		$JSONArr['transaction']['currency'] = 'INR';
				
		$JSONArr['transaction']['identifier'] = $identifier;
		
		$JSONArr['transaction']['dateTime'] = $dateTime;

		//$JSONArr['transaction']['dateTime'] = '22-11-2022';
		
		$JSONArr['transaction']['subType'] = '003';
		
		$JSONArr['transaction']['requestType'] = 'TSI';
  

	//echo "<pre>";
	
	$JSON = json_encode($JSONArr);
	
	//print_r($JSONArr);
	
//	$JSON = json_encode($JSONArr);
	    //"identifier": "'.$clienttxn.'",
 	$JSON = '{
  "merchant": {
    "identifier": "T764243"
  },
  "payment": {
    "instruction": {
    }
  },
  "transaction": {
    "deviceIdentifier": "S",
    "type": "002",
    "currency": "INR",

	"identifier": '.$identifier.',
    "dateTime": "'.$dateTime.'",
    "subType": "004",
    "requestType": "TSI"
  }
}';



	//echo $JSON;
	
	$ch = curl_init( $url );
# Setup request to send json via POST.
//$payload = json_encode( array( "customer"=> $data ) );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $JSON );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
//echo "<pre>$result</pre>";



//$JSON = json_decode($result);

$data['response'] = $result;

$data['responsetype'] = 'TransactionVerification';

$data['status'] = 'Transaction';

//echo "</pre>jj";
//print_r($result);

//exit;

$this->Payments_model->saveresponse($data); 

$JSON = json_decode($result);

$data['JSON'] = $JSON;

//print_r($JSON);
//exit;
$statusCode = $JSON->paymentMethod->paymentTransaction->statusCode;

$dateTime = $JSON->paymentMethod->paymentTransaction->dateTime;

$identifier = $JSON->paymentMethod->paymentTransaction->identifier;

//$jsonarr = $JSON;

$merchantCode = $JSON->merchantCode;

$merchantTransactionIdentifier = $JSON->merchantTransactionIdentifier;

$userid = $this->session->userdata("ID");
				
			
				$row=$this->Customercrud_model->getProfileData($userid);
				
				$data2['row']=$row;

$this->load->view('dashboard_profile_header', $data2);

		$this->load->view('Payments/transaction_verify', $data);

		
	}
	
	
	
	public function TransactionVerification_old($id='')
	{
		
		//echo $id;
		
		$row = $this->Payments_model->getPaymentsDetails($id);
		
		//print_r($row);
		
		//exit;
		
		 $clienttxn = $row->clienttxn;
		
		//echo "TEST test";
		
		$mandate_reg_no = $row->mandate_reg_no;
		
		
		$JSONArr = array();
		
		$url = "https://www.paynimo.com/api/paynimoV2.req";
		
		$JSONArr['merchant']['identifier'] = 'T764243';
		
		$JSONArr['payment']['instruction'] = '';

		
		
		$JSONArr['transaction']['deviceIdentifier'] = 'S';
		
		$JSONArr['transaction']['type'] = '002';
		
		$JSONArr['transaction']['currency'] = 'INR';
				
		$JSONArr['transaction']['identifier'] = 'OFDaGg5UJw';
		
		$JSONArr['transaction']['dateTime'] = '15-11-2022';

		
		$JSONArr['transaction']['subType'] = '003';
		
		$JSONArr['transaction']['requestType'] = 'TSI';
  

	//echo "<pre>";
	
	$JSON = json_encode($JSONArr);
	
	//print_r($JSONArr);
	
//	$JSON = json_encode($JSONArr);
	    //"identifier": "'.$clienttxn.'",
 	$JSON = '{
  "merchant": {
    "identifier": "T764243"
  },
  "payment": {
    "instruction": {
    }
  },
  "transaction": {
    "deviceIdentifier": "S",
    "type": "002",
    "currency": "INR",

	"identifier": "82qIidFQ4z",
    "dateTime": "10-11-2022",
    "subType": "004",
    "requestType": "TSI"
  }
}';


	//echo $JSON;
	
	$ch = curl_init( $url );
# Setup request to send json via POST.
//$payload = json_encode( array( "customer"=> $data ) );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $JSON );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
//echo "<pre>$result</pre>";



//$JSON = json_decode($result);

$data['response'] = $result;

$data['responsetype'] = 'TransactionVerification';

$data['status'] = 'Transaction';

//echo "</pre>";
//print_r($result);

//exit;

$this->Payments_model->saveresponse($data); 

$JSON = json_decode($result);

$data['JSON'] = $JSON;


//exit;
$statusCode = $JSON->paymentMethod->paymentTransaction->statusCode;

$dateTime = $JSON->paymentMethod->paymentTransaction->dateTime;

$identifier = $JSON->paymentMethod->paymentTransaction->identifier;

//$jsonarr = $JSON;

$merchantCode = $JSON->merchantCode;

$merchantTransactionIdentifier = $JSON->merchantTransactionIdentifier;

$userid = $this->session->userdata("ID");
				
			
				$row=$this->Customercrud_model->getProfileData($userid);
				
				$data2['row']=$row;

$this->load->view('dashboard_profile_header', $data2);

		$this->load->view('Payments/transaction_verify', $data);

		
	}
	
	
	public function ScheduleTransaction()
	{
		
		$res = $this->Payments_model->getPaymentsList();
		
		//print_r($res);
		
		$id = $this->session->userdata("ID");
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
		
		foreach($res as $row)
		{
			$this->TransactionSchedule($row->id);
			
		}
		
		$data_row = $this->Customercrud_model->getProfileData($id);
		
		//print_r($data_row);
		//$this->load->view('dashboard_profile_header', $data_row);
		//echo 'Test';
	  //print_r($_REQUEST);
	  //exit;
	   //$this->load->view('Payments/sampleform', $data);
	}
	
	
	public function CalculatePreemi()
	{
		//echo "Pre emi";
		
		 $userid = base64_decode($_REQUEST['I']);
				$sanction_details=$this->Operations_user_model->getsanctionLetterDetails($userid);
		
	//	echo "<br> Total loan amount = ";
   $total_loan_amount = $sanction_details->total_loan_amount;

//echo "<br>";
//echo "<br>Rate of interest = ";
 $rate_of_interest = $sanction_details->rate_of_interest;
//echo "<br> Yearly interest amount = ";
 $yearlyinterest = $total_loan_amount * $rate_of_interest/100;

 //echo $yearlyinterest." interst <br>"; 
//echo "<br> Daily interest amount = ";
 $dailyinterest = $yearlyinterest/360;

//echo $dailyinterest."<br>";

 $EMI = $sanction_details->EMI;

$Sanctioned_date = $row->Sanctioned_date;

//$Sanctioned_date = "2022-09-30";

 $tenure = $sanction_details->tenure;

//echo "<br> Payment Receied date = ";
  $payment_recived_date = $sanction_details->payment_recived_date;


$sanctiondatearr = explode("-",$payment_recived_date);

//print_r($sanctiondatearr);

 $sanctionmonth = $sanctiondatearr[1];

$nextyear = $sanctiondatearr[0];

$nextmonth = $sanctiondatearr[1];

if($sanctiondatearr[2] > 10)
{
$nextmonth = (int) ($sanctionmonth+1)%12;

if($sanctionmonth == 12)
{
	$nextyear = $nextyear+1;
}

}
else
{
	$nextmonth = (int)$sanctionmonth;
	
}

if($nextmonth < 10)
{
	$nextmonth = "0".$nextmonth;
	
}


$nextday = 10;

$id = $this->session->userdata("ID");
				
			
				$row=$this->Customercrud_model->getProfileData($id);
				
				$data['row'] = $row;
				
				$row=$this->Customercrud_model->getProfileData($userid);
				
				$data2['row'] = $row;
				//print_r($row);
				
				//$userid = base64_decode($_REQUEST['I']);
				$data['sanction_details']=$this->Operations_user_model->getsanctionLetterDetails($userid);

//echo $nextmonth;

$nextdate = $nextyear."-".$nextmonth."-".$nextday;

$date1=date_create($payment_recived_date);
$date2=date_create($nextdate);
$diff=date_diff($date1,$date2);
$datediff = $diff->format("%a");

//echo "<br> date differance = ".$datediff;

$preemi = $dailyinterest*$datediff;

$preemi = number_format((float)$preemi, 2, '.', '');

//echo "<br>Pre emi = ".$preemi;


$this->load->view('dashboard_profile_header', $data);

		$this->load->view('Payments/preemi', $data2);

	}
	
	public function TransactionSchedule($id)
	{
		$JSONArr = array();
		
		//echo "ID = ";
		$payment = $this->Payments_model->getPaymentsDetails($id);
		
		
		//print_r($payment);
		
		
		
		//exit;
		
		$date =  Date('10mY', strtotime('today'));
		
		 $clienttxn = $this->RandomString();
		
		//$clienttxn = $payment->clienttxn;
		
		$url = "https://www.paynimo.com/api/paynimoV2.req";
		
		$JSONArr['merchant']['identifier'] = 'T764243'; // merchsnt
		
		$JSONArr['payment']['instrument']['identifier'] = 'Test'; //scheme code

		$JSONArr['payment']['instruction']['amount'] = '1';
		
		$JSONArr['payment']['instruction']['endDateTime'] = $date; // date of debit
		
		$JSONArr['payment']['instruction']['identifier'] = $payment->mandate_reg_no; // respone number
		
		$JSONArr['transaction']['deviceIdentifier'] = 'S'; //default
		
		$JSONArr['transaction']['type'] = '002'; // default
		
		$JSONArr['transaction']['currency'] = 'INR'; //default
				
		$JSONArr['transaction']['identifier'] = $clienttxn; // Unique transaction number to be generated by finaleap
		
		$JSONArr['transaction']['subType'] = '003'; // default
		
		$JSONArr['transaction']['requestType'] = 'TSI'; // default
		
		
		//$this->load->view('dashboard_profile_header', $data);
		//echo 'Test';
	  //print_r($_REQUEST);
	  //exit;
	   //$this->load->view('Payments/sampleform', $data);
		
		//exit;


	//echo "<pre>";
	
	//print_r($JSONArr);
	
	$JSON = json_encode($JSONArr);
	
	//echo $JSON;
	
	$ch = curl_init( $url );
# Setup request to send json via POST.
//$payload = json_encode( array( "customer"=> $data ) );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $JSON );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
//echo "<pre>$result</pre>";

$JSON = json_decode($result);

//echo "<pre>";

//print_r($JSON);

//echo "</pre>";

//exit;

$data['response'] = $result;

$data['responsetype'] = 'Transaction';

$data['status'] = 'Transaction';

$this->Payments_model->saveresponse($data);  


//$this->load->view('dashboard_profile_header', $data);
		//echo 'Test';
	  //print_r($_REQUEST);
	  //exit;
	  // $this->load->view('Payments/sampleform', $data);
	  
	  $id = $this->session->userdata("ID");
				
			
				$row=$this->Customercrud_model->getProfileData($id);
				
				$data['row'] = $row;
				
				$data2['JSON'] = $JSON;

$this->load->view('dashboard_profile_header', $data);

		$this->load->view('Payments/transaction_schedule', $data2);


		
	}
	
	
	public function Enach()
	{
		
		//echo "Enach Test";
		$id = $this->session->userdata('ID');
		 $id = $_SESSION['ID'];
		 //echo "Ted = ".$id;
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
	//	 print_r($row);
		 
		 $data['row'] = $row;
		 
		 
		$this->load->view('dashboard_profile_header', $data);
		//echo 'Test';
	  //print_r($_REQUEST);
	  //exit;
	   $this->load->view('Payments/sampleform', $data);
		
	}
	
	public function uploadfile()
	{
		$id = $_SESSION['ID'];
		 //echo "Ted = ".$id;
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
	//	 print_r($row);
		 
		 $data['row'] = $row;
		 
		 		//$this->load->view('dashboard_profile_header', $data);

		
		$this->load->view('Payments/upload', $data);
		
	}
	
	public function testupload()
	{
		echo "TEST ";
		
		$dirname = "Finserv/customers/";

						$filenamewithdir = $dirname.$filename;
						
						$i = 0;

			  $correcturl = "curl -X PUT -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/index.php/s/Dr6nEzSqaF764Xo -T ".$_FILES["userfile"]["tmp_name"][$i]."";

 exec($correcturl);
		
	}
	
	//public function 
	
	public function webformsubmit()
	{
		
		//print_r($_REQUEST);
		
		$startdateinput = $_REQUEST['debitStartDate'];
		
		$startdatearr = explode("-",$startdateinput);
		
		$startdate = $startdatearr['2']."-".$startdatearr['1']."-".$startdatearr['0'];
		
		$enddateinput = $_REQUEST['debitEndDate'];
		
		$enddatearr = explode("-",$enddateinput);
		
		$enddate = $enddatearr['2']."-".$enddatearr['1']."-".$enddatearr['0'];
		
		$data = array();
		
		$data['consumerid'] = $this->input->post('ConsumerID'); //
		$data['EmailID'] = $this->input->post('EmailID');
		
		//$data['EmailID'] = 'jaykumar.nimbalkar@gmail.com';
		
		$data['accountHolderName'] = $this->input->post('accountHolderName');
		$data['MobileNumber'] = $this->input->post('MobileNumber');
		
		
		
		$data['AccountType'] = $this->input->post('AccountType'); //
		$data['amountType'] = $this->input->post('amountType');
		$data['frequency'] = $this->input->post('frequency');
		//$data['debitEndDate'] = $this->input->post('debitEndDate');
		
		$data['debitEndDate'] = $enddate;
		
		$data['CollectionAmount'] = $this->input->post('CollectionAmount'); //
		$data['amount'] = $this->input->post('amount');
		
		
		
		
		//$data['debitStartDate'] = $this->input->post('debitStartDate');
		$data['debitStartDate'] = $startdate;
		
		
		$dbdata = array();
		
		$dbdata['User_ID'] = $this->input->post('userid');
		
		$dbdata['merchantid'] = $data['consumerid'];
		
		$dbdata['fullname'] = $this->input->post('accountHolderName');
		
		$dbdata['emailid'] = $this->input->post('EmailID');
		
		//$dbdata['emailid'] = 'jaykumar.nimbalkar@gmail.com';
		
		$dbdata['phonenumber'] = $this->input->post('MobileNumber');
		
		$dbdata['accounttype'] = $this->input->post('AccountType');
		
		$dbdata['amounttype'] = $this->input->post('amountType');
		
		$dbdata['frequency'] = $this->input->post('frequency');
		
		$dbdata['collectionamount'] = $this->input->post('CollectionAmount');
		
		$dbdata['maxamount'] = $this->input->post('amount');
		
		$dbdata['startdate'] = $this->input->post('debitStartDate');
		
		$dbdata['enddate'] = $this->input->post('debitEndDate');
		
		$dbdata['txnId'] = $this->RandomString();
		
		$data['txnId'] = $dbdata['txnId'];
		
		$dbdata['cosumerid'] = $this->RandomString();
		
		$data['customerid'] = $dbdata['cosumerid'];
		
		
		$id = $this->session->userdata("ID");
				
			
				$row=$this->Customercrud_model->getProfileData($id);
				
				$data['row'] = $row;
		
		
		
		$tokenfields = "".$data['consumerid']."|".$dbdata['txnId']."|".$data['CollectionAmount']."||".$dbdata['cosumerid']."|".$data['MobileNumber']."|".$data['EmailID']."|".$data['debitStartDate']."|".$data['debitEndDate']."|".$data['amount']."|".$data['amountType']."|".$data['frequency']."|||||9713751370GPPGFH";
		
		//$tokenfields = "T764243|A125|2||Z103|9960763466|jaykumar.nimbalkar@gmail.com|06-09-2022|31-12-2022|10|M|ADHO|||||9713751370GPPGFH";
		
		
						   $token = hash('sha512',$tokenfields);
						   
						   $data['token'] = $token;
						  
						$dbdata['token'] =  $token;
						
						$dbdata['createdate2'] = date("Y-m-d");
		$mandateid = $this->Payments_model->savemandate($dbdata);
		
				$this->load->view('dashboard_profile_header', $data);

		$this->load->view('Payments/webformsubmit', $data);  
		
		$url = "https://finaleap.com/finaleap_finserv/dsa/dsa/index.php/Payments/mandatelink/".$dbdata['txnId'];
		
		$email = "jaykumar.nimbalkar@gmail.com";
		
		 $email = $this->input->post('EmailID');
		
		$subject = "Mandate registration link";
		
		$message = "Click on link bellow for Register Mandate and then click on Next Button. <br>
		".$url."
		";
		
		$this->sendEmail($email,$subject,$message);
		
		
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
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$from_email = FROM_EMAIL;
		$this->email->from($from_email, 'Finaleap'); 
		$this->email->to($email);
		$this->email->subject($subject); 
		
		$this->email->message($message); 
				
		//Send mail 
		if($this->email->send()) {	
			
		}else{
			
		}
	}
	
	/*function RandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring = $randstring.$characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }
	*/
	
	public function RandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	
	function sampleform()
	{
		
		$tokenfields = "L764243|A129|2||Z109|9960763466|jaykumar.nimbalkar@gmail.com|06-09-2022|31-12-2022|5|M|ADHO|||||9713751370GPPGFH";
		
		
						   $token = hash('sha512',$tokenfields);
						   
						   $data['token'] = $token;
						  
						  
		$this->load->view('dashboard_profile_header', $data);
		//echo 'Test';
	  //print_r($_REQUEST);
	  //exit;
	   $this->load->view('Payments/sampleform', $data);

		
		
		
	}
	
	
	
	public function parseresponse()
	{
		$response = "0300|success|NA|MNy2phiGBT|11050|1892392543|2.00|{itc:~mandateData{UMRNNumber:SBIN7010909220030003~IFSCCode:SBIN0004343~amount_type:M~frequency:ADHO~account_number:30360235847~expiry_date:31-12-2022~ifsc_code:~amount:5~identifier:~schedule_date:06-09-2022~debitDay:~debitFlag:N~aadharNo:~accountHolderName:Jaykumar Nimbalkar~accountType:Saving~dateOfBirth:~mandatePurpose:~utilityNo:~helpdeskNo:~helpdeskEmail:~pan:AGJPN6533C~phoneNumber:~emailID:jaykumar.nimbalkar@gmail.com}}{email:jaykumar.nimbalkar@gmail.com}{mob:9960763466}|09-09-2022 12:31:24|NA|||c50b59469f98436580b8e361329e5950|972101834|175919e0-f044-4478-94be-5c52185498fa|37e979d9712770eed15bac3a10f259d1343e650ecef513cc15e2f2de3a2058c5ac4f34ebf9305ceeab8da002304c24f2b2dde9788ccd823ba5de6f4e4bc6108b&";
		$response = $_REQUEST['msg'];
		$responsearr = explode("|",$response);
		
		//print_r($response);
			
		$data['responsecode'] = $responsearr[0];
		
		$data['message'] = $responsearr[1];
		
		$data['clienttxn'] = $responsearr[3];
		
		$data['User_ID'] = $responsearr[3];
		
		$data['bankid'] = $responsearr[4];
		
		
		$data['tspltxnid'] = $responsearr[5];
		
		$data['txn_amt'] = $responsearr[6];
		
		$data['mandate_reg_no'] = $responsearr[13];
		
		$data['status'] = $responsearr[0];
		
		// $data['bankid'] = $responsearr[4];
		
		$mandateid = $this->Payments_model->savepayment($data);
		
		
		$data2['response'] = $response;

$data2['responsetype'] = 'Mandate';

$data2['status'] = 'Registration';

$this->Payments_model->saveresponse($data2);

//$row=$this->Customercrud_model->getProfileData($userid);
				
				//$data2['row']=$row;
		
		//$data['result'] = $result;
		
		$this->load->view('blankheader', $data2); 

	   $this->load->view('Payments/parseresponse2', $data);

		
	}
	
	public function RegisterMandate()
	{
		//echo "TEst";
		
				$this->consumerEmailId = $this->input->post('email'); //
				
				$this->consumerMobileNo = $this->input->post('mobile'); //
				
				$this->totalamount = $this->input->post('totalamount'); //
				
				$this->maxAmount = $this->input->post('maxAmount'); //
				
				$this->debitStartDate = $this->input->post('debitStartDate'); //
				
				$this->debitEndDate = $this->input->post('debitEndDate'); //

				
				$this->cardNumber = $this->input->post('cardNumber'); //
				
				$this->expMonth = $this->input->post('expMonth'); //
				
				$this->expYear = $this->input->post('expYear'); //
				
				$this->cvvCode = $this->input->post('cvvCode'); //
				
				$this->bankCode = $this->input->post('bankCode');
				
				$this->accountNo = $this->input->post('accountNo'); //
				
				$this->accountType = $this->input->post('accountType');
				
				$this->accountHolderName = $this->input->post('accountHolderName');
				
				$this->itemId = $this->input->post('itemId');

				$this->ifscCode = $this->input->post('ifscCode');

				$this->amount = $this->input->post('amount');

				$this->comAmt = $this->input->post('comAmt');


				$this->paymentMode = $this->input->post('paymentMode');
				
				$this->frequency = $this->input->post('frequency'); //
				
				$this->amountType = $this->input->post('amountType'); //
				
				$this->txnSubType = $this->input->post('txnSubType');
				
				$this->cartDescription = $this->input->post('cartDescription');
				
				$this->merchantId =$this->input->post('merchantId'); //
				
				$this->SALT = '9713751370GPPGFH'; //
				
				 $this->txnId = $this->input->post('txnId');
				
				$this->consumerId = $this->input->post('consumerId');
				
				
				  echo $FieldList = $this->merchantId."|".$this->txnId."|".$this->totalamount."|".$this->accountNo."|".$this->consumerId."|".$this->consumerMobileNo."|".$this->consumerEmailId."|".$this->debitStartDate."|".$this->debitEndDate."|".$this->maxAmount."|".$this->amountType."|".$this->frequency."|".$this->cardNumber."|".$this->expMonth."|".$this->expYear."|".$this->cvvCode."|".$this->SALT;
				
				//echo $this;
				 //$FieldList."<br>";
				 
				 echo "<br>";
				
				  echo $token = hash('sha512',$FieldList);
				
				
				//exit;
				
				
				
		$data['txnId'] = $this->txnId;
		$data['token'] = $token;
		
		$data['maxAmount'] = $this->maxAmount;
		$data['amountType'] = $this->amountType;
		$data['consumerEmailId'] = $this->consumerEmailId;

		$data['consumerMobileNo'] = $this->consumerMobileNo;

		$data['totalamount'] = $this->totalamount;
		
		$data['debitStartDate'] = $this->debitStartDate;
		
		
		$data['debitEndDate'] = $this->debitEndDate;

		$data['cardNumber'] = $this->cardNumber;

		$data['expMonth'] = $this->expMonth;
		
		$data['expYear'] = $this->expYear;
		
		$data['cvvCode'] = $this->cvvCode;
		
		
		$data['bankCode'] = $this->bankCode;

		$data['accountNo'] = $this->accountNo;

		$data['accountType'] = $this->accountType;
		
		$data['accountHolderName'] = $this->accountHolderName;
		
		$data['itemId'] = $this->itemId;



$data['frequency'] = $this->frequency;

		$data['ifscCode'] = $this->ifscCode;

		$data['amount'] = $this->amount;
		
		$data['comAmt'] = $this->comAmt;
		
		$data['paymentMode'] = $this->paymentMode;



$data['txnSubType'] = $this->txnSubType;

		$data['cartDescription'] = $this->cartDescription;

		$data['merchantId'] = $this->merchantId;
		
		$data['SALT'] = $this->SALT;
		
		$data['consumerId'] = $this->consumerId;
		
		/*$data['txnId'] = $this->txnId;
		
		$data['txnId'] = $this->txnId;
		
		$data['txnId'] = $this->txnId;
*/
		
		$this->load->view('dashboard_profile_header', $data);
		//echo 'Test';
	  //print_r($_REQUEST);
	  //exit;
	   $this->load->view('Payments/TestNetbanking', $data);
		
	}
	
	
	public function Sample_Checkout_Code_ENACH()
	{
		$this->load->view('dashboard_profile_header', $data);
		//echo 'Test';
	  //print_r($_REQUEST);
	  //exit;
	   $this->load->view('Payments/Sample_Checkout_Code_ENACH', $data);
		
	}
	
	public function PaymentForm()
	{
		
		//print_r($_REQUEST);
		
		$data = array();
		$this->load->view('dashboard_profile_header', $data);
		//echo 'Test';
	  
	  //exit;
	   $this->load->view('Payments/PaymentForm', $data);
		
	}
	
	public function generatehash()
	{
		
		print_r($_REQUEST);
		
	}
	
	public function mapreturnurl()
	{
		
		$text = $_REQUEST['msg'];
		// txn_status|txn_msg|txn_err_msg|clnt_txn_ref|tpsl_bank_cd|tpsl_txn_id|txn_amt|clnt_rqst_meta|tpsl_txn_time|bal_amt|card_id|alias_name|BankTransactionID|mandate_reg_no|token|hash
		 $text =  "0300|success|NA|156321|11050|1855076168|1.00|{itc:~mandateData{UMRNNumber:SBIN7012607220050981~IFSCCode:SBIN0004343~amount_type:M~frequency:MNTH~account_number:30360235847~expiry_date:12-10-2022~ifsc_code:SBIN0000305~amount:10~identifier:~schedule_date:10-08-2022~debitDay:~debitFlag:N~aadharNo:~accountHolderName:Jaykumar Chandrakant Nimbalkar~accountType:Saving~dateOfBirth:~mandatePurpose:~utilityNo:~helpdeskNo:~helpdeskEmail:~pan:AGJPN6533C~phoneNumber:~emailID:jaykumar.nimbalkar@gmail.com}}{email:jaykumar.nimbalkar@gmail.com}{mob:9960763466}|26-07-2022 15:46:46|NA|||db1e57b08538457c998cc4a4ebb20799|964546673|6359f9fb-9f97-4d76-95eb-cd964346d447|f72556c6295ccdfc028dd838b52f02be69fb02e2e8b372020094a97ca618307bf1d93d5f5a4a2f02ca97346dd3320b4491fa6a1327183339e99b7a15f7fe8293";
		 $data = "0300|success|NA|156321|11050|1855076168|1.00|{itc:~mandateData{UMRNNumber:SBIN7012607220050981~IFSCCode:SBIN0004343~amount_type:M~frequency:MNTH~account_number:30360235847~expiry_date:12-10-2022~ifsc_code:SBIN0000305~amount:10~identifier:~schedule_date:10-08-2022~debitDay:~debitFlag:N~aadharNo:~accountHolderName:Jaykumar Chandrakant Nimbalkar~accountType:Saving~dateOfBirth:~mandatePurpose:~utilityNo:~helpdeskNo:~helpdeskEmail:~pan:AGJPN6533C~phoneNumber:~emailID:jaykumar.nimbalkar@gmail.com}}{email:jaykumar.nimbalkar@gmail.com}{mob:9960763466}|26-07-2022 15:46:46|NA|||db1e57b08538457c998cc4a4ebb20799|964546673|6359f9fb-9f97-4d76-95eb-cd964346d447|9713751370GPPGFH";
		
								   $token1 = hash('sha512',$data);
								   
								   echo $token1."<br>";

		$token2 = "f72556c6295ccdfc028dd838b52f02be69fb02e2e8b372020094a97ca618307bf1d93d5f5a4a2f02ca97346dd3320b4491fa6a1327183339e99b7a15f7fe8293";
		echo $token2;
		
		$str = explode("|",$text);
		
		echo "<pre>";
		print_r($str);
		
		$txn_status = $str[0];
		$txn_msg = $str[1];
		$txn_err_msg = $str[2];
		$clnt_txn_ref = $str[3];
		
		$tpsl_bank_cd = $str[4];
		
		$tpsl_txn_id = $str[5];
		
		$txn_amt = $str[6];
		
		$transactiondatetime = $str[8];
		
		$mandate_reg_no = $str[13];
		
		
	
	}
	
	
	public function returnUrl()
	{
		print_r($_REQUEST['msg']);
		
		$text = $_REQUEST['msg'];
		
		$text = "0300|success|NA|15632|11050|1854744735|1.00|{itc:~mandateData{UMRNNumber:SBIN7012607220019177~IFSCCode:SBIN0004343~amount_type:M~frequency:MNTH~account_number:30360235847~expiry_date:12-10-2022~ifsc_code:SBIN0000305~amount:10~identifier:~schedule_date:10-08-2022~debitDay:~debitFlag:N~aadharNo:~accountHolderName:Jaykumar Chandrakant Nimbalkar~accountType:Saving~dateOfBirth:~mandatePurpose:~utilityNo:~helpdeskNo:~helpdeskEmail:~pan:~phoneNumber:~emailID:jaykumar.nimbalkar@gmail.com}}{email:jaykumar.nimbalkar@gmail.com}{mob:9960763466}|26-07-2022 10:09:21|NA|||39cf002fa8c245e69e419eb7b9c3e59c|964474483|65afd0a0-0cf2-4d40-bfb4-2f52a882cf02|921c7b114c8ac57189ba7c2b4f417af8cfcfe25ce98de8d9c63ad726ce61a9977e5d4529b2090c0688198b1b55c9eb3f263969e5ec9aea9b73d1b8f8d17c592d";
		
		$str = explode("|",$text);
		
		echo "<pre>";
		//print_r($str);
		
		echo $txn_status = $str[0];
		echo "=txn_status<br>";
		echo $txn_msg = $str[1];
		echo "=txn_msg <br>";
		echo $txn_err_msg = $str[2];
		echo "= txn_err_msg<br>";
		echo $clnt_txn_ref = $str[3];
		echo "=clnt_txn_ref<br>";
		echo $tpsl_bank_cd = $str[4];
		echo "=tpsl_bank_cd<br>";
		echo $tpsl_txn_id = $str[5];
		echo "=tpsl_txn_id<br>";
		echo $txn_amt = $str[6];
		echo "=txn_amt<br>";
		echo $transactiondatetime = $str[8];
		echo "=transactiondatetime<br>";
		echo $mandate_reg_no = $str[13];
		echo "=mandate_reg_no<br>";
		
	}
	
	
	public function samplecode()
	{
		$this->load->view('dashboard_profile_header', $data);
		//echo 'Test';
	  
	  //exit;
	   $this->load->view('Payments/samplecode', $data);
		
	}
	
	
	public function managepayment()
	{
		
				$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
		 //print_r($row);
		 
		 $data['row'] = $row;
		
		$this->load->view('dashboard_header', $data);
		//echo 'Test';
	 
	  //exit;
	   $this->load->view('Payments/managepayment', $data);
		
	}
	
	
	public function VerifyTransactions()
	{
		//echo "HI";
		$mandateid = $_REQUEST['ID'];
		$result = $this->Payments_model->getMandateDataTransaction($mandateid);
		//echo "<pre>";
		//print_r($result);
		
		//echo "</pre>";
		
		//exit;
		
		$id = $this->session->userdata('ID');
		
		$row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
		 //print_r($row);
		 
		 $data['row'] = $row;
		
		$this->load->view('dashboard_header', $data);
		
		$data['transactionlist'] = $result;
		//echo 'Test';
	 
	  //exit;
	   $this->load->view('Payments/ViewTransactions', $data);
		
		
		
	}
	
	
	public function ViewTransactions()
	{
		//echo "HI";
		$mandateid = $_REQUEST['ID'];
		$result = $this->Payments_model->getMandateDataTransaction($mandateid);
		//echo "<pre>";
		//print_r($result);
		
		//echo "</pre>";
		
		//exit;
		
		$id = $this->session->userdata('ID');
		
		$row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
		 //print_r($row);
		 
		 $data['row'] = $row;
		
		$this->load->view('dashboard_header', $data);
		
		$data['transactionlist'] = $result;
		//echo 'Test';
	 
	  //exit;
	   $this->load->view('Payments/ViewTransactions', $data);
		
	}
	
	
	public function listpayments()
	{
    
		
		//echo "List request will come hree... ";
		
		$filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
	$userType=$this->session->userdata("USER_TYPE");  
      $id = $this->session->userdata('ID');
	  
	  		 $result = $this->Customercrud_model->getProfileData($id);
			 //echo "User id = ";
			 $userid = $result->ID;
	 
	 $draw = $_POST['draw'];
     $row = $_POST['start'];
     $rowperpage = $_POST['length']; // Rows display per page
     $columnIndex = $_POST['order'][0]['column']; // Column index
    
     $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
     
     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
     $searchValue = $_POST['search']['value']; // Search value
     ## Search
     $searchQuery = " ";
	 //exit;
	  $sel = $this->Payments_model->getrequestcount($userid);
	 
	 
	 
	  $totalRecords = $sel;
	 
	  $sel = $this->Payments_model->getrequestfilter($userid);
	 
	  $totalRecordwithFilter =$sel;
	  
	  //exit;
	 
	 $sel = $this->Payments_model->getrequestfilterlist($userid,$row,$rowperpage);
	 
	//print_r($sel);
	// echo "TEST";
	//exit;
	 $empReceords = $sel;
	 
	  $data = array();

	if(count($empReceords) > 0)
		{
     foreach($empReceords as $row)
         {
            
            
         /*   if($row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
			   if($row->status == 'Revert')
			   {
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/retailers/editrequest?id='.$row->id.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
			   }
				else
				{
					
					$link = "";
				}
				*/
				
				$link = "";
               $link3='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
              $link = "";
			 $link ='<a href="'. base_url().'index.php/Payments/MandateVerification?ID='.$row->id.'" Class="btn modal_test">Verify Mandate</a>';
			
			$link1 ='<a href="'. base_url().'index.php/Payments/TransactionSchedule2?ID='.$row->id.'" Class="btn modal_test">Schedule Transaction</a>';
			  
			//$link2 ='<a href="'. base_url().'index.php/Payments/VerifyTransaction2?ID='.$row->id.'" Class="btn modal_test">Verify Transaction</a>';
			$link2 ='<a href="'. base_url().'index.php/Payments/ViewTransactions?ID='.$row->id.'" Class="btn modal_test">View Transaction</a>';
			
			  //$link1 = "";
        
        $data[] = array(
             //"ID"=>$row->ID,
           // "invoiceissuedby"=>$row->invoiceissuedby,
            "merchantid"=>$row->merchantid,
            "fullname"=>$row->fullname,
          
            "emailid"=>$row->emailid,
			"phonenumber"=>$row->phonenumber,
			"accounttype"=>$row->accounttype,			
           "collectionamount"=>$row->collectionamount,
		   
            //"Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
            "Action"=>$link." ".$link1." ".$link2." ".$link3,
          
        );                                                                 
         }

		}

      
         
       // print_r($data);
     
     $response = array(
     "draw" => intval($draw),
     "iTotalRecords" => $totalRecords,
     "iTotalDisplayRecords" => $totalRecordwithFilter,
     "aaData" => $data
     );
     echo json_encode($response);
	 
		
		
	
	
	
		
	}
	
	
	public function TestFunction()
	{
		echo "HI how are you; ";
		
		
		$time = time();
		
		$filename = "";

						$fileextensionarr = explode(".",$_FILES["userfile"]["name"]);
						if(count($fileextensionarr)==2){
						$fileextension = $fileextensionarr[1];
						
						$documentname = $fileextensionarr[0];
						
						$filename = $time.".".$fileextension;
				 }elseif(count($fileextensionarr) == 3){
					 $fileextension = $fileextensionarr[2];
							$filename = $time.".".$fileextension;
						}
						elseif(count($fileextensionarr) == 4){
					 $fileextension = $fileextensionarr[3];
							$filename = $time.".".$fileextension;
						}
						elseif(count($fileextensionarr) == 5){
					 $fileextension = $fileextensionarr[4];
							$filename = $documentname."_".$time.".".$fileextension;
						}
						elseif(count($fileextensionarr) == 6){
					 $fileextension = $fileextensionarr[5];
							$filename = $time.".".$fileextension;
						}
		
		$dirname = "Finserv/customers/";

						$filenamewithdir = $dirname.$filename;
						
						$i = 0;

			  //echo $correcturl = "curl -X PUT -u jaynimbalkar:Jay@1985  https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$filenamewithdir." -T ".$_FILES["userfile"]["tmp_name"]."";

				//$correcturl = "curl -X PUT -u jaynimbalkar:Jay@1985   https://files.finaleap.com/index.php/s/jWmdKQimsSim59J -T ".$_FILES["userfile"]["tmp_name"]."";

  $response = exec($correcturl);
		//https://files.finaleap.com/index.php/f/28192
		 print_r($response);
	}
	
	public function uploadform()
	{
		$id = $this->session->userdata('ID');
	  
	  		 $result = $this->Customercrud_model->getProfileData($id);
			 $data['row'] = $result;
		$this->load->view('dashboard_header', $data);
		//echo 'Test';
	    
	  //exit;
	   $this->load->view('Payments/Submitform', $data);
		
	}
	
	public function getAadharcontent()
	{
		
		//echo phpinfo();
		
		//exit;
		//echo base_url().'vendor/HTTP_Request2/HTTP/Request2.php';
require_once("/var/www/finaleap/finaleap_finserv/dsa/dsa/vendor/HTTP_Request2/HTTP/Request2.php");
$request = new HTTP_Request2();
$request->setUrl('https://ping.arya.ai/api/v1/kyc');
$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setConfig(array(
'follow_redirects' => TRUE
));
$request->setHeader(array(
  'token' => '9124f9ccf36a6d91a82eb7e44cd3ae4a',
  'content-type' => 'application/json'
));
$request->setBody('{"doc_type":"image", "doc_base64": "data:image/jpeg;base64,/9j/4AAQSkZJRgABAgAAZABkAAD/7AARRHVja3kAAQAEAAAACgAA/+4ADkFkb2JlAGTAAAAAAf/bAIQAFBAQGRIZJxcXJzImHyYyLiYmJiYuPjU1NTU1PkRBQUFBQUFERERERERERERERERERERERERERERERERERERERAEVGRkgHCAmGBgmNiYgJjZENisrNkREREI1QkRERERERERERERERERERERERERERERERERERERERERERERERERE/8AAEQgHAwaKAwEiAAIRAQMRAf/EARsAAAMBAQEBAQEBAQEAAAAAAAEAAgMEBQYHCAkKCwEBAQEBAQEBAQEBAQEAAAAAAAECAwQFBgcICQoLEAACAgEDAgMEBwYDAwYCATUBAAIRAyESMQRBUSITYXEygZGxQqEF0cEU8FIjcjNi4YLxQzSSorIV0lMkc8JjBoOT4vKjRFRkJTVFFiZ0NlVls4TD03Xj80aUpIW0lcTU5PSltcXV5fVWZnaGlqa2xtbm9hEAAgIABQEGBgEDAQMFAwYvAAERAiEDMUESUWFxgZEiEzLwobEEwdHh8UJSI2JyFJIzgkMkorI0U0Rjc8LSg5OjVOLyBRUlBhYmNWRFVTZ0ZbOEw9N14/NGlKSFtJXE1OT0pbXF1eX1VmZ2hv/aAAwDAQACEQMRAD8A+oShWFFVVAVVUBVVQFVLJkgJl4OZOTsQlKBH8z+IfQo9XxDaEAXk8QgSyf4fvaUhAndl7bU7svfan3KwA35PAfSnfk8B9KVQB6mT+EfSj1Mn8I+lpUAepP8Ah+8L6s/4PvSqAPUn/B94X1Z/wH6QlCA+pL+AqcshzAqlAn1j/DJPrH+GX0JQgPr/AOGX0L6/+E/QqUAet/hl9C+sPA/QlUAeuPA/Qvrx8D/ySlAsd0B9ePt+gr68fb9CQSEkkoA9eH7hfXh4/cncVKAP2iHivrwPdO4raAPXh4qeox/xBTqyIgjUBAP7Rj/iC/tGPxXaBpQ+haHgEB/aMfin9oh4qdUUPBoD+0Y/FH7Rj8VGnCWAf2jH4oPU4x3X2K0CepgP9i/tEPb9BTyqBI6qB4P3KOpgeL+hNrZQH9oj7foK/tEfA/QVtNoA9ceB+hfXHgfoWytoD648JfQgdQDwCfklbQB64/hP0J9f/CVsotgH1/8ACU+sf4Sgq0B9Y/wlHrH+EquqA+rL+CSfVkPsFCWAfVl/CV9WX8BVBlXa2gPqT/gP0r6s/wCH71VgH1J/w/evqT/h+9VaAepk/h+9fUyfwj6UpQBvyfwj6V35PAf8pKGAHqZP4R9KPUyfwj6UqgJll7CP0o35fCLSoE78ngE7sn+FKopJll/w/ejdmP8ACG1RCby+MV/mfxD6GlQJ/m/xD6FrJ/H/AM1pUUFT/j/5v+a1P+P7kqTSICp/x/cu2XeZ+gLE2LSik7D/ABn7mwSPahNohYNtOXtDUZW0FqqoCqqgBVVAL0Q4DzvRD4QiFKqtAJcH3PK9UuC8zCmc+WKbnyywCqqiigpZKBEikSZkyga2nc5bk2gVE22GIhsIBK2q0iCqaVAlDSGgCqtoAWlsLYQGkUu4IMkAqjcEb0ClZ3LuQCqNyNyBSs7l3MBS0zuXc0FLTO5O5ApaZ3LuQBIJAZkVjJhS6TtZ3JEkA7QnajcE2EQdoXbSbCdEUkBqkqgShpBDAREUS052d1dm+GgIOrQNuYLQQNQU25WnciGm8+K7z4lzBSgX6kvEr6kvEsFCBp6svFHrT8WFQL9efin9on4uaLaDX9omv7TP2ONhG4IHR+1T9i/tUvAPNvCN4QOv9ql4Bf2o+Dyb0b0Ds/a/Z96f2z/D97w71E0IO/8Aax4L+1jwLwbl3IHf+1x8Cn9rh4F8+0Wgej+1w9qf2qHtfNtbKkQen+1Y/Ff2nH4vmarqpEHp/tOPxT+0Y/4nytV1UiD1vXx/xBfWh/EPpfJorRUiD1/Vh/EPpT6kfEfS+PRWipEHsb4+ITYfEMSkAqRB7avi0Ui1Ig9lXx7kO5T6kx3P0qRB66vkerP+I/S0M0/4j9KkQeqr5nrZP4io6jJ4qRB6avnftGTxX9py+P3BSINlVUBVVQFVSgBVQTSAJFhJQgKqrAFCqgKqqAVQqApQlAASg6apQFVVAUJVAVVUAKqUAKlCAqqoClCUBVVQFVVAVSqAFVUBVVQFC2toCqqgKqlACqqAqqtAqqoCqqwCtIW0Aqi1tAUUtm9eE2gKraoClCnwaBHj2ShKAqqsAqqoCq2toChKCgKqlACVVAVVUBVVQFVVAUoVAKqtoCqqgBKEoCvKqgESrlsFzUWGg1VkSBaQAqVQF6Mfwh53fH8KBaqrSAlwfc8z0y4PueVhSZcsBuTLAJZSUEooCWDM+CT7UEoGcsh4osHNXMT9DoSxIooBmHeJ+hIzew/QjcS1zywFjNp8J+hr1vYWYt20gPWP8JX1JfwlbXTwCAN8/BbyeCSAeQEbY+A+hAbmipNIQBtku0pXhEJMZLtkmlaUGw+K7GkUOWAdiNqVQHajaoTZRAbV2qqKDanatrygO1FJW0AUnahKA7V2rytIAlFAi0UVfIQHa0Ioqk2gO1O0rdqgO0rRTaEB8yN0ho0NOFtAj1JDspykchr5BSgZnOImyCn9oj7foaKlhTM9RDxUdTj/AIg0SWCUCh1OPjcEjqMZ+0yA2AD2CAR1OMd0/tMTxZ+SQ1bSGJ6oA1RSM8jxEujNIA3zPZd0/Y0qBFS8VESe7RVAkw8SnYlCAiIKKCUV3QDQWgqEQdPBOiFRQqqoCnRlUA2gnwVCAbRZVUA2i1VANoJVCBQKCq0gNoGhSghAJ1VASgK2qEAqgFpAUqqApQlA61VWkFVVAVVBKAksWpNqgJKFQwBVVQFVQgFUWthAKWNwXeEC1Y3hd4QKUMeoF3hAtLG9G/2IGiGN/sXf7EC1Y9T2L6gQLUljePFByDsimlrbG72FG6XgiGlq52V1QNFctVRTW1sOS7q8EDWwjcHPcu/2hA13BdwcfUHiF9SPchA1JCAQHM5YfxBj9oxjuEDo3Bdwef8Aa8f8QR+14/4ggdFhbDz/ALXi/iCP2vF/EEIOncu55T1mL+Jf2zF/EgdO5O72PJ+24f4l/bcP8SEHXu9i7nk/bcPifoQeuwjufoQOvd7F3PJ+3Yvafkv7dj8D9CB12VsvH+3Q8Cj9ugeIy+hCDsspsvH+3QHMZfQv7bD+GSB17itnweT9tj/DL6FPW+EJfQgdZPsSC8X7af4Cn9sP8EvoQOzcu4PGesI+xL6EDrz/AAn6EDt3BG4PH+3/AOEp/br+z9yB2bwjcHj/AGyR1ET9Cf22faBaDs3hd7xjq8n8BX9pzf8Adn6QwHZu9ibLxevm/gP0oOfNEEnGaHtQO6ytl4h1GUixA/Sp6nKOYFA7bK28P7VlPEEjqMp+x96B2bkGTy+vl/gR+05P4UDrEg0C8X7RPuEjNPgxF+9A7U28QzTPEfvX1sn8P3oHZa28Zy5P4R9KjLlP2YoHXabDx+rm8Aj1svFBA7bCLDyg5Zc0Pcj+bHij70Dr3Bdzy3m/wsHJm4uP0IHbuKNxeP8A8I8R9DO7OOSPoQO8SaBfPHUZBoQHfHm3coHSrINpRA2qEoBVCoDXd0DAbDQUqEoC74/hcHbF8KBoqq0gJcH3PK9UuC8zARLlm0z5c2FEleFQigKKaQgZkOZDsQ50wpG3W/B0AUNBAQGggJaQUBKoCqpQAqUIgoXlKKBaSi0BVFraAqi0WgUrNraBSsWtoFKza2gUrNraBaGbW0Cks2toFFEWd1qCgWli02gUrNptApUWtoBpKLW0BVbW0AFCZHRDAAhiqdCwUUAAdA5k17XQaIFBKAlpBQm0ICqkraAFTaLQEqpKCUBVbW0AoW1tACUWm0BVbW0BRSbW0AITaoCqqgKE2i0BVNqgCkqqAoLSECVSQgICpCVQJpoKqAVW0oCEoBaQOpKFaQVVUBQUoKBmVUqgKEoQCqotgCwZUpLBIiLLQJl4ucuoxx5LyT6nfPbx4a8uuLp9xuTCl/tmP2/Qv7XH+GX0PRHEBwG9gQOQdWP4ZfQv7UP4ZfQ9mxHphA5P2ofwSX9p/wAEns2BGwIHJ65/gl9ynPL/ALs/SHs2LsQOL9on2xn6U+tlPGMf8p7Ni7UDk9TP/DH6WJZsw+yC921gxsoHF6+X+EKMuY6xA+h7RjDWwIHBfUXY7prqD9qnu2rTAcQx5v4yvpZv4y9u1O1A4f2acuZn5KOh8ZSPzfQ2rTQcH7CCPikfmkdBDxP0vdVaJpA4P+r4eJ+lI6DH4H6XukCB5eU0gcP7Dj8F/YYeD3UqBxfsMPAfQk9Dj/hFvYqBy/seP+EJ/Y8f8IepUQ5f2PH/AAhP7Jj/AIQ9CUDn/Zsf8IX9nh4B6EIGPoR8An0YjsHVKBj6UfAJ9MeDqhAz9KPgF9MDs6qgZ+mPBdgbSgZ+mPBfTDaoGfphfTDolAx9MJ2OtIpAz2J2BtUDM4gj0Q7IQMhhASMQDqgoGfphdgdKZnIgHaLNaDxQJMF2tj2r3pAnauwND7koGfphdjaUDMwR6YdVpoMfTDE8QPL01SCEDi2nGKAsNC5B6TFnb3QMoi+UjHrboYqPagDYgxDpaDqgZgAaNUzKKYoDSRANJCA7WJQBdEEWgcWWJgfYxXccvdKIkKeeUNrk0hxZSdDy9ANvIObeqLSMpKqiCqqgLoHJ0DQUlCUBdsXDi7YuEDRVVpAS4LzPTLg+55mAyycsNZeWGFEqqoo8oShAkstFylMDksBV0kSDznqcY03Bf2rF4hFOq1eYdViPcJ/acX8QRDe028x6rH/EEHqRz2aDrRbyft2Mclk/iGId0DttFvCfxHEyfxPGgeha2+d/1jAqevigehaLfOPXhg9f4aoHp2tvkH8QJ7M/t8vBA9mwjcHxv26Rc/26R4QPc3hfUD4X7bMo/bJlA93eF3h8P9qnwn9qyctgHt7wu8Ph/tWRR1kvBQD3N4RvD437WeNqjrJeA1QPZ3hd4fH/AGu+xQOrPaKgHtbwu8Pi/tchyF/a5eFIHt7wj1A+L+1SOvZI6mR8VAPZEwneHyR1Er7p/aq5UA9beF3h8v8AavekdUB4oHqbgncHzP2vvrSR1o9rAena2+dHrYtjrYd0Du3LbyDq4eKR1ePxQOmR0UF5/wBpxngrHqMdcsKdBKCXH9pxfxKc+PxQNQXQSDzevj/ia/acY+0EDfcE2HD9px9pBf2rH/EEQ33Bmw5ftUPEI/asfiA0G1hNuH7TjP2gg58f8SBva28xz4/4kevj/iQOm0bnlOfH/EEftGPxQOveF3h4v2iHiF9ePiEDs3hd4eP1h4o9YIHbvC7w8XrBPrBA7Ny7ni9cHQFfWQO3ejeHi9VO9A6/UC+qHk3JtsA6vUC+oHl3I3KAdfqBfUDyWtsgHX6gTvDx2m2wDs3hIkHi3Nb2A67W3lGRsZEDoRwwJ21doFKgFpAUUlUBShKAVpFtbSgdSqrSCqqgKClBQMyqqgKAlCASyTSS5TlSAyyCGpeSeU5D7EbZZJcW9EOmH2mFOf0IZB5hb2dPhGKO0En+o26RxiPDoGAFJVKAEqlpALSVKAKUpQgCu6pVAk6qI0lUBpaVbRQUmlaAQJpNJVEBSpQgKULaAVVkiygUhVqkBSqEBShWgVVKAqqoCq2qAoVKAoKrSAgUqVQAlVQFVVAVVUBVVpgFVVAVUK0CqVQM9tEy8WkopgAlaKoDSpVAASqEArSrfZABCCGuFQMyaQQ2QhAgFpG3uEhASHO9XRTG0B5TSBo00EyFjwSkhWADnKNutMkIHIY0dNHeLGXTVqJtIpqqEogoShALYc3QIFKqtAXbFwXF1xd0DVVVpAS4LzPTLgvMwGOXlhvLywwoqqooFtXOZpAjLkrRzhhM9ZOmLFuO4vVGKBzR6XGPsi/c3+y4/wCEfQ9ICGkOQ9LD+EfQEfs0Y8AfQ9ZNORG5oOf0ImtA36UY6U71SKssBj+y4zzEf8kNfs2MfZH0OwapSDm/ZsZ+yPoQelh2iPoeqkUpBynpoH7I+hyPTwGm17jFxOIiWnCkHKemiToG8fRD7QH0PbDHTpVIHH+w4zzEfQv7Bi/hH0B7aWkDhHRY7+EfQ0ejxgaRH0PZS0gcX7Fj/hH0Keixn7IewRpNIHF+xY/4Qv7FjP2Q9tIpA5P2PH/CEfsOP+EfQ9lJpA4h0OP+EfQn9ix/wj6HspNIHF+xYz9kJHRwHAeyl4QOT9jh4J/ZYeAeqlpgOUdLAfZCf2aHgHqpWg5f2aHgF/ZocUHqRTAc46aA4C/s8fB6KVAw/Z4+C/s8PB3VAw9CPgEfs8O4D0UtIHP+z4/4R9C/s8PAO9KgY/s8P4QvoQ/hDsqBj6EPAL6EP4Q6i79jSBz/ALPDwCD00DzEPSikDD9mx/wj6Efs2P8AhH0PRSoHP+zY/wCEfQyekxH7I+h6lpA5f2PF/BH6FHRYv4A9VLTQc37Jj/hDH7Fi/hD2KwHGehxH7IZP4fhPMXupaRTzZ/hmGQqiPcXMfhOOJsX8zb6tLSB5R/DIHlk/hcH1hE2b47I2oHlH8Nj4lH/Vuuki+mRSFIPMP4b7V/6vI0t9WkUpB5R/DzRIJJ96YdBIgEkg+B7PqUmlIPN/6vP8RX/q+X8RfTpVIPL/AGGf8RQejyA/E+qtNkHk/seT+JodDM8y+59QRTtUkPM/YJfx/cj9gl/H9z6dLSkHmfsM/wCP7l/YZ/xPp0tIHlnpskfa52YmpCi+vtefqMQnGkDljJ1jJ5Y9OcOoJdoTthTcGm3MG2wUClVUAslpBFoFYY2dXp3hxh5QqB0KqtIKqqAoKUFAySpVAUJQgAuOTh2LjkYC8UKAdgGYDQNRNooUoSiAUpWkAANKrQKGkIApUqgBUoQFAFNKgAsxDZURphRpVQCDqEQKqqAqqtAqqoCqEoDSqoN8ICqqgKpVACqqAoW1QG7VCxkJCxwgFVSgS0FZo37EClpKLQCqClAC0lUQVVUUVVSgBVSgBUqgKAKSgEHUaoCq2qAWaSTWqsACoKUUgHlaVCAqpiDRPbUKgNptCWAUHVfYloM5w3Ag3r4KQ6IQM6aCSGUApCFqmgo6oW0oAUoQWAyyrEDszmJbgilqqogUJQgLoHN1DQFKEoC64u7k6Yu6Bsqq0gJcH3PM9MuD7nmYDHLyw3l5YYUVVCKJcch0di45OEDeGgdA5QNhu2kKtBLMieyxutUA0tJpQbQAtXolNICAmlVgFFKRaQKYBATtVLQCjWlWmkqgCkRN9qSi6NE6tAUW0qAFSqAFShAVCVQFVVAVVUBVVQFVVAVVUBVBvslAVVUBQlBNC0BVRrqqAs1rbSoCAqqgKqqAqqoCqqgKqqAqhUAqi0oDSqlACpVAki3Mwrh1UhgMgmmjFCKSpaRSAFStIASg32SgKUJ+pAKCtraINIaQgAMThuFNpaDzzd7SHDLiMTui+lkx3q5ShehZoU5Mcz3d4lxlEROjtHUIGgaZDSAphG9UVbZ0FIAvVpgctoHQqq0gqqoCgpQUDJVSgBCVQAXGbsXGfDAdEOGmMfAbItAUqkIAGqVpLQBSa1SzIkcaoB5VVQFUEuYyX2I96Botsbk2gWqEhAIVCoCiMRAVEUAlWAVVBQGN1rz7GlCtAEJVAVSgCkBUADQKtIBVVQFCVQAqqgBVKQgA6cqKStICqqgKqoQFVSEQUa37EqgAAgnVKqgKqqAoF90qiiqqgKnRVQFFUlUAJQlgFCVQAUXrSVQFVQgFkEkail4efLn7Red7qi5WNVq3odKvPizXpJ3VLq65VFqtAlIggAE2fo9rSoJERZ4D0MiDrRSoNqgJ1ZOjSDq0ExStMmhygUui2i0AhB11B0W1QMcvCYIyapgwpolCograqgLqHF2DQFVVAXXFy5OuLlA2VVaQEuC8z0y4LzIGOXn5MN5efkw5KKqqKSXGcZS9zuXORpA0gG+eHGBJ5dbvQIBEG6QGmkJhjjjG2IoNIREkiyKKAnlIQtsBTJNUK5Tt3CimMaFIDSJCQB20T2tomlYBCVVAVQrQJu+1felVaBVUEIAkCao1R19qaUgnhRogGlVDAIlfCUJaAoKqgKqqIKqqKKqqAqlCIKqqAUKqAqqooFShAVVUBVVQFVVAVVUBVVQFWTKueGkBpVVABCgJVAVVKAFSqAqqoAQQ0ikCUNEMsAhVVAUNKgSbrTlU7U0ikapSpQFVVEDTOt+xIKktAEENIQOXqIdwxjduo+FxgGFL4LVrVo50QLBpUAUlAQ6OY5dEDdVVpBVVQFktIKBkqUIBQVQUAEOWR2cZ8IG+M6B0Dnj4DqEBSFVAVRa2gKraEBt58/V4unF5ZCPvP6clHV9QOnxnIRddve+HPqjGUeqIEjkqMbhWznQE+KB7UuqhPEcmOQIAJ3PzU5nKIyyTO0jzGU5HXv5YgcNdbDHI5MkYkSEjZjIeHcff7XLq+qnkEsQIMiT/ADI6WCNQ0G2bpceIx80Zg1L7XHbXwfX/AArqPUxmF2YGvkdR+Xyfn4ZjYkZA7RGIjW2J29iO49zsQTKEpm5Sx3IcAea/EeOln5IH0Y/EMJlt3d9t0dt+G7j73rErfnD1IyYsfTEc0JbI7tAPs8/S9nR9XKOc4DIyhWkpiiJeH0MB7INpZi0gJVaVgFaVWgUqqAoSqAEhUIBQlUAKtUgSBJ9iAUoVAShKEAqqoBQqUAKlUAKlUQCUWlAXHqMRyw2CRhdax5dlQIMiCBRN/c2hKAqqoCqqgKqqAqqooUKqAqqsAGMkDMVGRj7Q2qBEsogaKjJE93kyy3SLFvzrfltWaiapnoWWoPRtLzYDMc8O9vty7q9eSwOVqwzLPLbH2l46e6VclGj583JtmWnlFVobrbitDjAL1YZbhr2aoE+xqh209yyci2XaeWG6Fr8loFmeoIacM0ZHjh9GZfhXlEnOqlhOYDQtY8280HiIIbxS2yBfDX8q1rpOFU7vLUHehKl+keYk6skXy2tNBCpIpCAAfFSElk+DCmMzq6wcsnLpBA0VUogENIQF0DkXYNAVVUAt4uWG8XxIG6qrSAlwfc8z0y4PueZgMcvLDeXlhhRVVRRLjN2ccnCBWPh2jGg5YhbukGEJQFKICxx3VVQGkgKloEJcpGQkKArWzf0e9rcgUSpL5HWfixwSlGMAdpomUtovn9XjP41mAJMcYHjcq+pgPowUvlfh/wCIy6kmGQCMgBLymwb+Q4fSEvFAtUApQCqFtAUoU+xAKqqAoIvgqI0lAVShpBVKEBVQQVQFVVAKBfdUoChKoCqq0ChKsAFVUAJVUAKqooqqoCqqgKoSgKqhAUhCoBVVQFQKVErFUL1QKVVQFVQgFUFbZICqAb1CpOcUAllpFNBJCLaZIYAqhLQFA9qVYAIaRSBJVKopKbWvFUA2gi1pBQMM/wALlB0z8MQQNQg6apCatAkatUgCtEoCOXRzHLaB0KqtIKoVAVVUDMoUqgKClBQA5zdHOfCBtj4dXLCPKHVAKFVAVQLrVUBUqlA8v8Vx5dnqYtdlkx9niPaH5/H1E5Y5RyGQ88Nly0rwF6P2Mg/N/ifTY8eWMYDndMgnQe4dtWg4smIZMdWLJNkjv/po/wDK08HL1ZdRtnH+bKI/mY5AWQNL9qc+UemLJJ286nWRrnT6OHDGIyreNwHlNfELNfM+7QIG055MwOzFKMga3yN7QOwah6cJCcTIyiYxBPNVzrx7+y+lCJlMAE7vKN0jt7a+PvHd5zMA7BWp81Hv42gbQymMhUiJAkeTQE+JkRyfc+h+GYeozZTGc7jAjfLua4j8nzpTEj6sa3CjOB/e+O55ug/Y9NjhCAGMVGrAHtQN4hpVYBVVQFLJkBzolAKqqIKqqAqqoCg3Yr5ppUUShKEBVKEBVKEBVVQGkoSgKqqIBbVCKZRnkOQxMahXllepLsikoBVVRBVVtAVVUBVVQFVVFFVQSgFUG+yUBVUWwCgptFopxCBkaDrtjiG6RArkljqeqh0w8ZHiIeEdNm6sieY7QeA+KmRWmNvVY9Kmymz41NM/4rAf2xuPidA8xz9Xn+G/9Ip9PF0eHFxGz4nVvJ1OPF8cgPe+n1PsCtVYUrL7TxT0PUz1MT8yg/h/UD7P3vpn8UwDuT/pQPxTAe5HviuL/wBR09zM/wBB5ldTg184+p3w/is4msgBHiNC+pj6nHl+CQLnn6PFlBJFHxC9S7THOrwzKmmHqsecXA/Lu2ZmPOofB6jpsnSS3A6dpB9Ho+uGbyT0n9bG3ZelxYzbLSXKuNTrqGUW5HEYlOWFax0dcWXdoeXyOtcy3Gy4Zn3JLSlYo2CUJt+gcBVbQiBYIbZJaCUEWoBHKUDny8twZyhqDCmgvu0yqIUhFruQC6RcIyJ5FO8WgpANpVAW8fxMN4/iCB0KqtICXB9zzPRLg+552Axy8sN5eWGFFVVFFyyOpcsiBriFB0c8fDfHCIG1VWgaPZoBASgKCaS83WZTixSmNaCBx9b1x+HDLbR8+TbujD/N459R1GCjhyDMJAmsp10/hqvHh5MGbHklPBEExyDdu9TXQeHieachIyhHTSMK1F6nW9NfmOO6KbjLHOZTnLbOYlMxkNBt0G0+yP3hxxficzhOLfIkzqI+1s+p5Dl34PteQyiaHlAl3dodPOgYSHG418NeJ1u2kOjDn/Z8kMkDvrSUAON/t4B8ot9TH1WbqBKYmMUY9vLP5k+Hu+l8DH1EjhqEDtMhMy4+HX2u08m3cAagdbAluJrwlZlpwToinvdF+JRziIySEcnBj2l7Yl9MF+T6jq4T2YzkkDAiR3xojTTjs/TdLl9bHHJVbhbCG5jdHwSlWACkWtJQFaVUBVVApAKoVoChVQEADjuzPd9nn2tKiCqqiilCogVVDQFVQgFCUICqqwAtU0ikUVVUBpUqiAVVQAtpVFFBWkoAVU0gCkqqAqlCAq8+bKYmgyOoPd8r/KorOltjp7bak6rQJWLYhkE+Goin0VsrKa4ow1GoSaeOeczsDQPRmsig8/oy8Hw/kvMs+FKvju+p1oksWOPIYe57IyEhYeP0JB3wiUdCz8Z5lXwvV8duwt0mpRuhHe0SmIiy+9tJSzjAWTw5S6gdgzDMZyovBfkZbsq1ctm+DiTcJZS+gwUqAlpBKsSM9wEQNuu43r7G0AELSVYAUtJQgBVQgc/UcMQDWfhmCKaBpkFKAlFhLlLp4ylvN+5A0GpdNrA0LqgbKqtIBVVAUJQUDNVVAUFUFgFym6kuU+EDox6B0c8fAbaBtbVaQFQEqgBUo4QAX5r8fiYZYTA+IbL+f5P0vLy9b0sepxnGeT8J8D2QPiOpkMkt2o0AAOp09vf3txJGtAivKTpQu9PafHsHu6L8MOWMzn0hjEhQ5J8UD8MyTxjJjMdpJgI+Ht9roHNPLekiBqOLrt9HvHLzGQMxesQb1I8XbDinnybMenmBMz9m+PqeyX4NIZMmOEzIxiJRvv4oHJDfkmIX5yaEh9oE/v7gH7rHEQiIjgaB+a/AOjJmc0wRsFAS8TyfofpwGApVVgFVVASL5ShKIKqqAqqoCqqgKqqAlCUIohKFQChKogFtNIIRQqqogClCUUCpVACKN68dmlRBVVQM8omYn0yBLtu4bCVaBVVQFVVgFVVFFVVAUAUlUDOeQQ5cD1BPAdOoFxt5X5v5GdmVtwrgj0UqmpNseScjTeXIYioi5H4R+acUBEX3LZoWX1ZKuqzdzZ/QxZqcEc2HpBA+pk82Q8n8meo63HgJEtT4B4+s/EjezD85fk8fT9Jk6g2OP4i7bVdNTssufXmuEVn/ABDLl0B2x8B+bni6XLlNwiT7f831+m/DsXTgUNXfL1OPD8cgFFnqa91L05dTyo/hWY6mh7Fl+FZhwQXrl+LYQaAkfksfxbCeQQzguv2HPN14nlZely4dZRI9oejpvxGeMiOTzR+99jFmhnFxIIeHrPw6JG/ENRzFY07h7iv6cxQdoMM8NKlEvi9X0sumncfh5iWej6o9PLX4DyH2s+IZ8Zj46gprkuS1JjlWh/CzPoupHUQ1+IaSTkjslo+P02WXTZbPjUg+/OImPqeWbT3KSviroZsuFsPhY4su7Q8uebdE3Zpw1HvewEZYvCt7ZtOMxev1I1xc7HMMkg9OHIZnUPKQQaenpxQJLPx8y7uqN4bi6USboq9Uq/TPMBzkadWZBA58qYlnKBSYjRhTQFLmSWgUCkJQgDu7xcCHYcIhasg200C3D4gw1D4ggdKqrSEy4Pued6ZcH3PMgY5eWG8vLDkoqlUUBcp8OhcpoG8OGmYkaDxaCIEapSEtAAlCk0gAoItNEpKB8z1/4d+zSlmxgCPIP8N+z7XseOETGJF+YAR+nvQ1Hvfa/HZVhj4bxel9i/O5MxEBIfaMpUOOPZxzqC0In1JHJIwNEkRMZcTA/flE+mhvBOIeaMpCImK5+lzw1QiTQkddw8vB1PifAeL0xyARGoow1Gl+wk8/R8KBGOcxkBl5YUYRjyI3xXiszMAZBpcdpP2rHifD26DsHHOaA7ChrXPzdoS2aH2epD9fo5J8UD1Og/DT1EoZcgGweYnnefZ7PYX6YaB8r8DFdNGtY3LafZb63LAMZCQsGwe4SCzGIgNsQAB2DQYBShKAEoRfigUqFQCqFQCqLVAY3WupShWgUoVAUoVAKqhAKqqAqqoCqqgKqgG0QKoSigSqogoShFEG1VUBVVQAlUoAVKEBUralA4MhuRKxgZcO/o6kljN1OPpxR5/hD8uv40+vOcLp1PVyn00xZcMW3UnVueWMB5iB73yJ9Zn6jy4gQP8AD+bMfwzNPWZAvxNl9ta8VGXWEHlrXNtHYekevwD7Q+VoH4jgP2vuP5PIPwjxn/zf82T+EHtP/m/5uvX2Djk/6n8+B6cOpx5PhkC62+DP8MzR1jUvcXOHU5+mNGx/hk2WtUParb/o7SfREgalyyY9+oLzdN+IQzeU+WXge70mxrH6HGYlauK5I5cXR44M5pwMeUQNG3pjkE9DyxLBXwvgeTpfJfJfY6q21jcG+zVKBSX6p5gJBc57qO2r7WkFSDRChLSAVSgHxYAk0hKoAQUoLQcmcoinOERYU0CUNBAVVKAO7ox3dEDVVVpBQlCAoShAzVSqAEFKCgAucuHQuUzowp0Y+G3HESQ6gIgQ0qtAqqUAIISqAGZNEvPlzDHW7SJ79ggeXGJieoxyHlBAH+p5Onl6fS5IxOmLKdfY11H4jjGLOYSBmJXHW74p5Y9TDD088UAZiQBkR4mPmaDt6jNHDDDIjSY2g17bD0dJljk6nKQdR9VuHXThHpcO7vsEfoeWPVYsXUxyQNeoYiftEhr9BQPZ/DaqVeIfSD4nRdZiw5J4JyESDfm019n3PsxNoFqqWEAqqiilVQFVVEFVVAVVUBVVQFCVRRQlUQUIEgTQ7NIDSqqAEoBB1HCUBVVQFVVoFVVAVVUAJVWAVQloFSLVUBVVYBVVRRZsk1Wni0yY67vBAZx3Cnmx4zuo9nqQXz5mSr2rZ7fU3WzSgbfE/EOu9Q+ljPl+0fH/ACfVz+eJhEgSI8Xi6X8NGPzZKJ8Oz0s3ojrl8a+u2uyOfo/w7fU8vw9o+L6eTJDBG5ERiGOp6qPTxs6yPAfDyZMnUzuWp7AMwqu02lbNfK2FTo6n8SnkuMPLH73nw9Jlz6xGh+0eH0el/DRDzZdZeHZ2z/iGLB5fikOwZDtrgjfNL05VZOWP4Oe8wPcGJ/hM4i4SB9nCJfi2QnyxAH0u/T/i0ZnblG0+I4XGuzDecsTzY+p007FxkH3el6mPUQvv3Dl13TjNjMh8QFgvmdDn9LML4PlLaynxYtGbXkviRp+I9N6U98R5ZfW9f4Zm3YzA8x+ou/XYhlwyHceYfJ8r8Pn6eaPt8q+G0GV68vHWpp+J4RDIJ9pfWH0egynJijfI8pc/xDFuwk/wm3H8IlpOB9hSUOCP1ZU71OrPHbK/FOCdGuxdM8fLfg8wfm3/ANlmyu8V9VTryY90gR3dox2imIzJjYFmnQP0KZdU3mV/yPPZv4egV5VXsYBSC0WSLaDnzRsX4Ihw65B5T7nKHCBdJpoKQwEpq07U0gTdOkXN0BQKShLQLUeQy1HkIHSqq0gJcH3PM9MuD7nmYDHLyw3l5YYUKEqigcZupcpoHRHhoBgNhEDKwNOUqrQPC0vKmjogFChaQOPr+lHVYZYrong+BfjJ45+p6YBEx5KHJPBfvi+N6cMfXkgASlG/uN/UGg+XqeGfpyHmjIfcfoTKUgCAf4jYqua7/W+90sxkydRDLEVRkPbGy8svw3HlIzE1Ayxx2VprEfmgeNI75A6kV4dg64wc0oxh/cJ2x9uv7kv0YAyZcFDgDtXI/wAl6HoMeHq5GI0G7aOw+H8yger0eAYMUcQ+yAHc32UNMAhIVKAFQYg0T2SwEzmICzw856uAT1YJjp4vAf3/AH/f8vNmXtVwsD0ZdE1LO79sj4FI6qPe3z1LzWbbqdfaqemOoge4SM0TwQ+XZRbfet2GfZR6wyx8R9K+rHxD5V/v+/7/AKrp51kPZXU9U5YjuFGQHu+VaEs59B7K6nr7gE2+QP3/AH/f8zuIXv8AYT2e09e1t8nefEpE5Dufpa86Niez2nq2gaCny/UlXJQZn9/3/f6izp2Hs9p61rb5YySGoJXdKR0u2+89OJPZ7T1LTb5u/IdLOjpGOaQu3azG9KmXlxujuW3ijjy9zTpjJGvmkPc6Vm9awZdFs5N98fHhpgGR7V72x7XaMMFjxSwcUfAN8JTuRxsKqTXKtIC0qqKFCqgKpVACpVAFsmQHJc88jGqLyvhzvyXSzoq4rc61y5UnaMkSeWiXmwws2XTLGU/KDQ7n8nvlXvavKy10I6pODmz9VKUvSwC5dz2Dni/Do3vzHfL7nsjCGGOlAB87qfxT7OH/AJRdNquuNjrXlb05eC6nomcMI1IiHkyfimKOkbk+TWXqZd5F7Mf4VOXxkR92qm9tMDft0r/0lsSj+LntD/nf5Jj+L+MPoLqPwrGOSSg/hOP7JIXG3UcsnoaYvxLFk0PlPtemUIZY1IAgvj5vwzJDWPmHs5cun6qfTnTjvEqWviHtVtjlM36v8POHz49Yj6Q69F11kY8h17S/N78OaGeO6PHg+T1/S+jLfAeU/cU1HqQq+f8As8zXZnrZMe7zDlcebtL6XDoOq9aO2XxR+p0zQ2mxwXy5qeW/ey/+sjEY8LHWCtvPhyfZPyRmhRvxels9+37lFPVdDnwxhnSja8QkY8F6cM5S5ZlfkLMfHjDLajWJqEslL6zkFaZBaRAKPamkICgptBQObqAzBrOzFFNA0GQ0gKqqA93RzdEDVVVpBQlCAoVUDJKqgKCqlABcZuxcpsBvjGgdAxj4bQCqEtAqSqoCiqUk9lCAC/P/AI71Xw9PjNyJuUA/QSD8llEcvW5ckjRjOMYxPfsfuagc0hm6gRxQxiBifMRHUy9qIx6iMvREjE/asafv7H3DgywnLJjoxrWye3uvWnjBsWQbI/TloM8sMk8MMV646MZbR29jxZemzyBMvMAfsxHfw1vt4MiR3DWW/d8PsfSIl5ZR/iqQPFEd2A4+p6nqhAGYIFCO7b9epfoPwXq/2jBESJM46Svl5snSkyMYkUADkBvm793HsZ6UV19YvhEDu93ZA+hCoi0wgEqggnjRAKqgi0UKoSiCqqiiqqiCqlUUVShEFVVAaVKEBVBS0CqqgKqqAqqoChKoASqoCqqgKqqAqqoCqqgKqrAKoPscsuTaPa5tZVXK2hpKXBZmByxmyenAzHYW81mR1e2rFF4ZWd7rtxUJHR1VYPG/D8c8uQ5jx4+JfQ6nqI9PDdL5DxdZyjiiSdIh+f6nNLqZ38oh6zxWOp1S923J4VRMjPqcl8yL6/S9JHpo2fi7yT0fRjp47pfGefY+f13W+qdmP4B38WJf5WNtvMfCnwrUPWdfLJcMeke8vFw6fosnUajSPiXp6Hojk/mZfh7Dx/yenq+uGDyYwDLv4BmuLwReXH/Z5SxIh+EYgPNIkvB1vRHpyCNYl1x/iOXeDI2L4fR6+Ilhl7NU6qJRFa9LJXcyeVh6/LGPpAbuw8XkIMT7Q+h+Fw/mk+AZ/E4bc1+IBY5eJ1TSu6pdp6+I+pjB7SD89D+XkHsl+r7vQf2Il8XONuWQ/wATq2zOWVrep72aO/HIHwL5X4Wf5xH+F9gxJjXsfH/DYH19RwJW1/EjFPguj2cguJeJ75fCfc8NPz/zF6qvsJl6M6enNimvWANFzwd3PIPMXos21Mqll3MzxTs0dkZWLaBeTDk26Hh6g+vLzFdSjnasFIW6S9TBlPguUOHafDhj4QNglASgFCqgA68NY4kDXVkuoQCqqgKRyqoHUqq0gJcH3PM9MuC8zAZZeWGsvLLCihKEUBcp8OpcciBvFsMxDbSBDXKAEoCtKqAEoClABL5uWIPU7wPNDGf+c7dd1I6XFLJV19ZfnMnXS83UHKDMj0/TjH8uyB19DKOXqJ5P92YemD40dfvXBgll6CcbqRlLaf6TQfJwZowxiGQz2AaACuTq93T9VGPQZMcJeYbtt3dE/k0Gsc88WbFkl/b2xEj4cxfU6c/+E5L8NPpD8v1PVCUDjhOxX8Ptv7i94/ENcfUwyAHaROBF6j590U+qBtoPB+HdYOrxjIPdL3veGEKSgX3SiChQbVAkhxlggezn13Unp42BZPD5EuvzHXdQPscPHCJOds9ZbjGew9kdPAJ9GHg+Getzd5FJ63MD8WrGo2Rn/la/3vnxPTn0xHwmw5ehkv2V++rxR6/MD8V+8OsPxLIBRAJeby09jrX8xbnVHp5n/Nr9ln7Hl/60nfwhv/rXwj97fbr0Zr/llf8AUb/skvYj9ln7HH/rU94/eg/ip/h+9e3VbMf8rX+o6P2afsX9lk85/FfCP3/5JH4qQNY6+9nt114sf8rr/qOmPSE8kBr9kPi8w/FY3rEtf9aQr4TbrjT/AEj/AJUn/kjp/ZB4tDpY99XlH4pj8D+/zbH4livv9DYqtvoP+UT/AJnXHDGOgCfSjdgV7nl/6yw+J+hf+ssN1Z+h3KZn3V/qXmdgiI8NPB/1lh8T9BX/AKyw3ya8aUk9yv8AqXmd6vAPxLFdWVP4li8T9C5Ic6/6kd9rbxS/EMUa8134Mx/EMMjd0eNVyQ51/wBSPQV5P23Fdbgv7diq9wXJF5LqjqKbeP8Ab8P8QaHW4v4guSHKvVHVa25wyRmLibCiUrIrTsXRZNFYgSfi0KzkYiwLPgEJNFcBmka8kvu/N3RE5FVVFMs0bj7nljHcae4ucMW0kvjzcjnmVtt/kdq3hQVEUKcs+eOGO6R0byTGOJkeA+Dlnk6zJQ18B4B9FnHprqay6c3NtEDqOrn1Mto0j2i9PT/hZl5s2n+EPX0vRR6cXzLxZ6rr44PLHzS+pQq66nV3b9GUsDpAx4I9oxeTJ+KY46QBl9T5WTJk6iWtyJ4D24fwuUtcpr2Dlk2t2Ie3SuOY5ZJ/Fp9ogNR/FpD4oj5F6x+H4B9m/mXPL+GYpDyXE++28XsxyytOJ0dP1mPqNImpeB5cet6IZhvhpP63ycuKfTzqWhHBD7PRdV+0Q1+IcpOfTYlqcP8AaZbwPI6bPLpp324kH28uOPUY65Eho+b+J4NkxkA0lz73f8Mzb4HGeY8e5i14msz1VWbXU8/BkPTZtexqT9BICUafH/E8O3Ju7SD6HQZPUwxvtoxKU6PQmbiq5iI7+56oyE4auOaNS964ZbZewvzsp+3mPLt8LwZl+pSRKNGnpwRqN+KzxbiCPm7RFCn05GQ6XtZ6bGL3lQKGih9pxJSlaQAClFUlEAPoUpQUDl6hiLfU8MRRTUNICUBVVQF0c3S0DZCq0goSqAEJQUDNVVAUFKCgBynw6uU+GA6MfDQLGLh0pAaSqtAqFVAQKVKEQEn5f8X6LLHqf2jHCUxIfZ5Eg/UEPJk6nD09QnMA8eaQtoPlsPV9NCyRkhPvtmef38XKPXRhqD98fpD6+bofw3LMzOSIJNnblH+bkel6HFW3JY7n1Iaf83VFOUddhIuxf9J/2L/1njGOUdtmWnI4fQ/ZOhkf7ps6fEPyWf4f0GKWyeUg+BnSB5cOrPUyjjjHdkl5bHL7/wCEfh0ukjKWU3knz3oDs4dNH8N6SW/HKG7+Izt7um/EMeWZx7o39nabsIHoBKAlEFVVAVVWAVVUUVVUQVOg0VUUQfpShUBVA0FJRBVKtACVVWAUcaJVoFVVgFCqgKqqAVVUAJVDQFVVgFVQ0BW1VAVVUBtVREUKu2ALkcIJs6uqubUrZRZSiptaGXoxdEqyuXWnwKCtt6mWbDHMNsxY8HKHR4sZ3Rjq9LGQExIBonu1pblVnpOAJxEwYkWD2cP2LB/AHk/6vyUZTyHd80dJ1GTPjnjJ8wGk3MpvFHZVaU0thuenpVPNj6LHG9wEjZN1Wng+b0ss/UkxGQih73fP02fFAzOUmk3V6ovttPjzhncekxE3sF+50nGMgROq72+T0uDN1Ed3qka03+IY8mPDCNmQHxH6lhGmAdPUq88fsd2KOEH+Xtv/AA1+jpPFGZuUQT7nz8XSQJx5sBqufa8/4iJYp7hM1InSzopSUcQqTbC2J7UYiIoCgwcGMmzEWfEPnw/DZSAJyS1eXp8U8uU4t8gBet+CbTwaCosWr6anvCuyAAOBy+f/ANWf+VJff+blm/D/AE4Sn6kjQts9UzKpV4K/0PXRURy+R0fRDPj3mUrvs+vix+nER5oUyK3+Ks96Rm6VMFbEIiBwpgG6QW8KxEKOhzlk7A0jW/YlqqlooEiqq0hEzpq8+Ph6MnDhDhFNQ0gJaQVpbVABiC6hgOgQFVSgKqqB1KgJaQEuC8z0y4LzMBjk5ZbycsMKKqqBBLlkdpOU0U3hxq2D4cuePhoY6lvs1VbezTLNQgi1QZgEA8nhFKVCUAIKQgoHzP45OWXPHBZ9OIE5ge/U/IMnpemhlAkBGMh8JOgPP3g/cv4wJ4Oq3wO31Y1uP0H7nowdXmyi4YscselDd5gK44aDl6jpMUsglAeWNir0J8frPycD1gBIokDS/a1vImdNvmPJ9p0P0kMz6eMvhmQDzEopoYYr3TGktvm10s+yvcfezk/D4RiQSYkg7ZGehMRqK/V3w9LGeOW7QAf5j73pl1MZbZShEwETYvgk6kaa8Ihj+F7+hyxwy+DLfPaXb6X6S6HF+5+c6CR6/qROUfLhGt/x9n6OHAJFIFpQlhCdwBonVKDEEg9wlA5ur6b141wRqHxp9Dmx/Zv3av0SNrTjfKV3OjPmP2fJrUTp7HSHRZcguMTT9HtTSwOf/J1vY+dP4fmAvaXmMDHnQ+1+q2uWXpceb4xaSRm34/8AoePafM0gitH3j+FYjpr9LI/CcfclcV1OXsX6Hi+3uivpffj+G4Y9ifeUj8Owg3tULc17F+w8Cu68P0P7Bhqto+9k/h2Eitv3qF1H/J79nz4Hz9UnnTxfeP4bhPavmn/q3D/D96hD/k9+w+fpfpfoP+rsNVX3r/1dh8FCJ/ye/YfPnwWvpfox0WECtgT+x4udgUJGv+T26o+bGnC0/Tx6fHD4YgfJPow8B9CcD/k1v9SPmhikfhBrxd4dDlmLEdH6ERpNLBHRfjrdnz8ugzR12/Q1HoSYDnce200+7S0sOhf+T1PGj+FykCSaPYdnqxfhsAP5nmk+hS0p6G1k0W0nCPw3EDepTLogK9ICPias/e9qqTXt16HLDppwGkz/AMkOgwjbtJJHvdlYbVUjIYgCCLFdvH3uqEhFFKq0CqESkIiy5bSUvQqUhQTWrgc5JoJ6mEp45RhyQ8qZqzE3l4wb4w1y3OcdVi6qRw0aI58XbD08MAqA5+lx6Po/Q80tZH7nH8Q63ZeKHPc+DqeKx1OscrcMv4Qdb+Ibbx4ue8ngwdNk6mWnHeRa6Toz1Bs6QHJfWy5cfSY/DwDmP87nZtU9GXjYEMWLo4WTXjI8vFm/FSdMQ+ZePLlydTPXUngPf0/4YALzan+ELG3YhxrT1ZmNjgPWZjqZl6em/EpxNZTcfHuH1I9PiAoRFe58v8R6SOKpw0B0r2sdY9SZVel3wdYO3rscc2EyGpA3RfM6HN6eUeB8pRgGfMDixny9xejgYmEiDoQWzjyN1pCeXMnu9dDfhl4jV838OntzAeIIfYP8zGfbH6w+F0prLA+0NfxI5ZeNLVPT/E8e7Fu/hLn+EysSifEF6+tG7BL3PB+FfHL3N/yM1xyn2Hp5xpbzB68o8peR+X+UozJ6omXod8DYBbDhgPlWOcXR0foLOqlR2cckcXVy4N0FQbS9zmCkoSgBDSC0EqdU0gsBy52YOmfhziimoSgJQCqqgAujDaBqqUNIKqqAEFKCgZqpVAUFKCgAlynw6lynwgb4vhDq44uHZgAqVaBVKEAoS55ZGMTKIsgaDxRCi+b1/RzzzjOBAoSHwg8+95D+NZdksnpCoERlc61Ps5al+KZx6hOKAGP4ryfU0oj8MnKABlRAhQ+zpyCB7dWD+E5ZY63RE6yAgRBB3G/kp/FssIxnOOOImLiDORP0CJev8N63J1kZTlGIiDtFE/qApBhL8LmM0coMSBISIPPHHho9PWdJPOAIyoX5ufuIp5Oq/FMuDMcP8rgyuUjx7faXM/inU7cRrFeUjbHz37+UDSX4ZlMY1IWBCJB1+Eg6a9/c9WDojjzDKSTpMEk3ydNOz5vVfi3U4LoQkInbKUYT2g+8lqP4l1M9hhPEd8xD4JCr96B9EC0+J0fV9T1GeePfjMcdbiIHX2PtBECqqgKqrAKqhFFKqgKlUIBVFpQFVVAVW7VEFUKihQqoCqFQCqCgi0ClQlAKoVECqoQFVQRraKEKqoClCUQVVWgVVDAFUKihVVQAXz83WyxZtkwBDxfRefqemj1EdsvkXNp2N0dZ9WhzdR00s5uOQiJHA4L53S5MuPdjxQBOtl6f2PqsfkhPy+96uk6MdODZuR5LjV4Ho5KtYbVuiOH8J/uS9z6PWj+TP3PJ+H4J48hMokAju9/VQM8Uox1JGja41M3a9xeByfhX9o/1PX1JEcciRYA4cfw7DPFjImKNvZKIkKPBdR6Tndrm32ng9H0nrgyMiI3xH99E/iEI44wxgk7b5Nl7D+FCMjLHOUb8Hm6v8P8ASAlC5fxE/c84cbnpV07Ty8D1MR8sfcHyuj06qX+p9XHHbAAjUAB4un6TJDqJZCPKTL73T1Rxo0lfuO/JDfExur7vg+lkjk9DJMxB+gv0N1y8/VdIOojXEhwVZPVEyr8cHo/oX0+GOGAhHs7vJ0cM0I1lN18L1ulEYHK+rxkUJtBdGRVCUBVeOFQM8nDjDh2nw4w4YU2CUBLSDQVVQC6ByLoEClQlAVQlA6RwEojwEtICXBeZ6ZcH3PMwGOXn5MOmTlhhQJVaQJk45HYhymOEU2gCI6cuhkIgyloBqiIa0I1RAQmJgSibB1BaUChQREEDU20BpUqUABVCCgcvV9Hi6qO3NESA1D8z1f4P1OLLIdMCcZ+Gpavt9flz4ZwGORImTpHHuofTy+eet6s4xOJu4iR8kRQJr3+9oPL/AOreq+3CWvuP6useh6uGkRkA93+b1ZeqzZYWZ7oCU6IxcbBoXU9b1UZwgZjz7NTAfa8NfvQPMP4d1Z02Tr3f5u3Sfg3UZMo9aO3GD5rI49lF9r8Qz5enI2TAuhGJhyffuDxy/EepxiJlKI3xEhePuTVcoHu9Pgx4I7MURGPgHcPhdJkznqta2y3CUttbjH2X977oQKVCWEFUWt600BUpVACUd1QCqqgK0lCAoASlACpVACqpAPKA0g3WjSEBVVQFVSwAVKGgVSqAFVUAKqsABfdTqlCKCmghIQChKohNvPkE5njR6FeWZlrMXGzcdhutuJyRxyB1etKCsrKrlLjX6ltbkc3VZJwj/LiZSPFPkY+izZZ1KJAPMiH2Z9TigdspAHwLsHUVbnU6VvaiwWu5gRHp8dQiSBwAHxc2PPnnulGVn2PvznGAuRoeLGLJjmP5ZBHsTSbxePQUu6zbjPaYdL0g6eNnWXc/k8nVZs+U7ccZRj7tS+rPJGAuRoe1x/a8RNbx9LLcXg34CtrTz48meP08MmLNHQg3T6X4jAyw0Beo4ewUaPPgg5YCWwkbvBsJKCvMdrK0Yo878MxSjv3AjjkPL1uGfrSIBp9yU4wFyIA9qYyEhYNhOqeHQLNas7xqZYQfSjfO0fU+JghP1Y6H4h29r7s82PGanIA+0tgiQsNwbnoSt3WcPiMuogZYpAckF8/8MwyjOUiCBVavrEgCyzHJGXBB+ahTO5lXaq6xgwZR5S8lPcZACywM0CaEh9L5s3JrmWl2hlrZpaE9PwXGcTZewJpX/GVq1py+EivDbOfDMx0PD0g2tK9sujpXjMmLOXIoSRavUyBKqgAoKUFA5s/DEG+o4YiwpoGkBKAqqoC25uiBqqq0gqqoAQUoKBmqqgKClCAC5T4dS5S9qBti4Dq5YuA6sKCUtoMjwNUg2L8VS0gqqoCghKoHj9T+CYpRmcQ/mSO65E6Og/DRM5hlowy7a+QfTS2QecOlyAwn5d8PL7JQ/R16Tpjg37je6ZmPm9lLSkHD1HRDJP1ICO4jbPcLsfmHOH4cYYscQR6uL4Z1++hfSpVIPJ6v8Gx9R5rMZkiXJ237kn8KufqGZM/UjksjtH7L6qqQcsenOPLvx0BL+4PE9j73qCqwBVFqgFUWqApRaoBVFqgFUWtoBVFraAVKLRaAVRaDqgUShbQgG1tCoBtUWtoCq2tooVRaGApLKgtIECkotFoBpVtAKAbQJWp1VApbZtbRYDaoBW0IKVm1tCA2rNraEFX4KCza8cIQWrNruQgZREqvslFraBSs2u5CClBtjdXKdyEFK5xyxnrEg0a08WjJggNKzuHiu4IQUrAOpsrvHihBZQAOe7ByABO8IQWlyOQBPqDxRYZa25nJHxCPViO4QhmpKuPqQu7Fp9aHihxYSNHGHDZzQ8Q5wNoNQbRaZi00yKpQgLoHMukUAqqoClCUDohwGmYfCGmkBLg+55nplwfc8zAZZOWG8nLDCgFlKqgAuUuR73UuUuQinTFLMW0QkzESIk6nhNqQOe4eD8TP8uMTpGU4Rmf8JOrQdwyA8FJk+LLHDpeohsxemCdglGQAlp3jy1DqeoIx5N0TDLLaIiPF3RvvxqgevuBWMrGr4x/EZjHvAFwhKeUV9oaV8zr7nOPX9RCMzLWsZnEmBiAR29oQPalES51o2gY4jgAVo+acnV7zjEoCQhvMtnt0A1c5db1GSJljMY7cUcpuN2Tenu0aD08eKtxuxI3VcN+nHQVoOHyZ9dnwCRybZHZGcdo4MjXz5X9t6kXHvcBGU4GPxSo6IHs0GfSht20Nvg+TlydQbxSmLjkxeYR5EvZb29VmnDZDGQJTlt3EXWhPHyQN5Y4giQoEHUn2uu4PiZJZs04YskhcMwifL8Xl3B7Oq/uYP6z/ANCSB6Fo3PjYOr6isWXIYmOQyG2MaI5rW/Y5nJnySwZMhiYTMpCIFV5D7dUD3dzQfn5ddmx4onF9nFGZjGG7t3P2Q+5ilvAl3IBQNVVUQUqqAqgJQChUGQHJpApUKgFUKDeqAUMgHcTelcNIBQqoCqqwBVAU32aAqhQgFVQgJNKpQwoqqoChKoCqlFoBVVQFCVQAzKQiLPAbeL8QyjHiPidHNnCNVXJpHlSxnPHJn8C+x0eX1MUT34PyfPw/h8smMS3kWLrs3+FyMTLEeeXNVxcHqzItVw/hK/FMhO3FHmRc+l/8H6iWI8HhnJE9X1JANCPcdqY6nBLpZRybt2vJ9jlf6jSSj25xa0O78T/s/MOPTdFiyYYmUdSNS6fiEgcAkOCQXLB12PFijDUyA4pspO0mKq3BcNZJ6KUsOY4CbjrXyZz5PT6sTnoABda9nTocU8uQ9RIUDdfNnPAT6wRkLB7fJQ4qtzcrm/8AhxHrusxZce2Bs34Pd0X9mHueTr+mx48e6EQDYdceT0ulEv8AD96Th2nEw0nSqr1OHqL6nJkkOIDR9H8Py78Q8Y+V4el6PJkgZie0SLf4eTiyyxS7/WFVRHaauk6uqfwnT+J5dmHaOZPH04/ZeojE8SA+9rrL6jqBiieO/t5c+r6fLiAyTnuIP0Mn/LaS0SVVRv4j0uuP8ifufMxYMMsJnM1MX3/R7+pyep0pmO4BeHH0ccnTnJrvF/c1rF9xnLwri49R2/hUpSxa8X5X0Xh/DsvqYqPMdHuD0Wh58342FVVpzChVQFVBVAWSlSgcvU8MRb6jhmLCmgSyGkBVVQFumG0DVVVpBVVQAgpQeEDNVKoCgqpQA5T4dXKfDCmuM+UN2+ackgaBR6kvE/S8XmpbHdZU4yenKYgN0tAO6bfKMieU7i599dC+z2nqbl3Pl7z4oMi33l0Hs9p625G4Plbltz766F9ntPV3Bd4fKtbas7sHs9p6u8eKPUj4h8u1tjz42L7K6nqerHxX1Y+IfLVLOnYeyup6nqx8R9KPWh4h8y1tPO7B7K6npetAfaX14eIfMtbas6dh7KPS/aIeIX9oh4vm2tsec+hfZR6X7RDxX9ph4vm2tpZzew9lHo/tMPFf2mHi+da2nnPoPZqeh+1QX9qg+em2LOb2HtVO/wDaoeK/tUPa8Fraec0Paqd37XH2r+1x9rw2glLNsy+1U7v2uPgUftcfAvFa2nmse1U7f2seBX9sHg8VqxZtuwe1U7P2weC/tg8HiSnmsvtVOv8Aa/Yv7X7HktbXu3Ht16HV+1+xf2w+H3vItp5th7deh1/tZ8Av7WfAPJa2vctux7deh1ftcvAL+1y8A8oK2x5li+3XodX7XL2L+1y9jypXuW6jhXodH7XP2L+1T9jzOZzwGhkLXuXehfbr0O39qn7EftM3mBvUNM9y3UcK9Db9pmn9pn4uCF7lnuOFeh0ftM/H7kftE/FxVe5bqOFehr+0T8V9efi5IXO73HGvQ2Oefij1p+JclXO3UcV0NfWn4lBzT8S5quVt2y8V0NBmkdbK+rLxc0s522Y4roV6kvFRMi6J15ZVcrb2Y4roX6kvEo3HxZZnPaCSVys9xCNN57Fd8vEvF+2D+H724dVCWnBdPkuprj2HTuK7izaueVt2yQigaRZVkS3CxqFyt1EIq0ElbrUqDeo/f9/39k5NbjAbW0WnlS92BtbtAT+/7/v/AJHZlEJMmeyW95A2tsgrdslgZGhoncgqsECnrxcPFen7/v8Av9Pbi4e+S9TzZ2xvFtiLb6TziqqiC6ByLqEAqqUBVCUDfH8IbYx/CG2kBLg+55nolwfc87AY5OWWsnLLCiqqiklzlyHQuc+QgdISwC1aBTnlxRyxMJi4nkFrcm2kOLH+HYMUhOMTuHwmUjKvpLWP8Pw4p+pGPm176C/AcB67QSpEGA6TEN9RHn+P2uUfw7BCMogEiQ2ndInTw9gey1tSIMRigSZ1qRt+TMOixRBjWhiMZ/pDvQu/Fq1Igwn0mKYIlEG47D/T4MQ6DDAUI9wbJJPl419j1WthSIOfJ0ePKCJi9xBOp+zw1m6bHnjsyCwNQ7WtqRBzw6PFjERGNCJ3D3+LpPDGZjI8xNxdLW1IOYdNCMYiMdIHyj9/e5w/DMEJCYjqLrzHS/AXo9trbZEHDL8L6eXMdBEQqzRA4t7MeMY4iEeAKDVrbJAUotQUAqjctoFKza2gUiURLkXWqLW0ClRaLQCUotbQCrNo13XelcIFqxabQKVFoEggUqLW0Aqi1tAKotbQCqLW0BpVtHdAJvslFotAJQzeqbQClklIKAUWtotAZw9SJidLBGiBjFAHWh3Ta2gO1AxxBsAX401a2ikjHEGwAEygJaEWm1tAk44kUQK8GY4MYNiIv3Oi2hLDTBxRvdQvxbtbQJljjIVIWGfTiRtoV4OiEJYBEDQCgx6EN27aN3jWroCqEszjggJbwBZ7tTxRmKkLHtbtUJZl6MNuyht8ExxRgNsQAPAOi2hLM8eGGL4ABfg6KtoPEKotHvRA34JRa2gFULaAqUWpKBzdTwxFvqOGYsKaBKAlAKEoQEtMlr8kDZVVpBVVQAg8JQeEDNVVAUJQUAFynw6lynwwpxy5ZamdSy+CzxZ766IUoVykaCtKqkCotSrYA2rEs0IaSIC+pHxC7kUtXP1YfxD6V9WH8QXEGiufrQ/iC+tDxCjogaILBzw8Wf2jH4t4vcGM+qINRDrh6gZNDoXDFKEMhsiuxTmyYz5onzB0+iXiajY7UV7XAdVCtTr7l/acfF/czizMM3X9/wB/3/zx/acZ7qOogTV8shiDdVQxIClUFjBhl6kQNAW5DrJdwGDt9S5axt6PXxju9lVJaGvAOPqIT9hduXkySwzGpos4uoMdJGwO7lqdCQdt08mTqiDUOPF0PU4+L+55sMxjnZGja1jVBI0j1GQayGnudodRGWnB8EwzxmaDhknhn318WPHCBrsdqHjxdQYjz6jxdP2uHtXGCQzoS837XD2r+1w8C5dWxDOhXmHVx8Cv7XHwLri0IZ0C+6Xm/bI+Bax9SJnaAdWcWIZ0IQzImwANPFk7ELVzymUYkx5eUTzT1FpVbxKkdxeU9KJSJuh4BkZZyuHEmJ5M0PiNO0nsVJmuORwS2S4PD1W+dI5MkbOoWGTJLyxJY6TjJWj0bW3i25/Eo2ZvE/So7SR2ndavnzlkh8RLQx5jwTXvZx6sQdy8PBPHmgNxOg9qwhlmN0Tp728ejEdp3WtvnEy43f8AORIzB+K79qVBxPTUvLhwzhIGRse96g5aIxRuCyjYIfNnDZLaqpaIqUnp2Ebh4vH+yHxcIYxKW35OuE7iF1PSMx4hw6oiUdCNDbzZcPpUOW49ODDffZqSUQWEsZNenGPbZq+9t5PSrWvk8mLH6hq6U49ststB4tdVOpYx1LGX0T5TcfB645oEXYeXHhO/XgIzYPTG671ZCZMGdhyQH2hfv/f9/vAyQA8pAHseXD04yRslmWOETrLT3a2oWhIR2+rDxDJzQ/iDwT2abCXWGOG0SlKrXBassHUc0P4gvrQOm4OQ6aBGhJDOTp4xBNmwzBvcmBv6+Pmwj14eIeTBjGQ0Ws+IYwK7thJwiwtDp/aMfiv7RDxeeOCHp7jd0z08IzJEhwoT6iEdP7RDx+4t48gmLjw8OKAlMRPD3xgMYqLLQtCNJFLyqg24SIIBe7Fw8VPZi4fRk6s82dsbxbYi2+k8oqqoAkXSHDBdAgFVVAKqhA6MXwtueL4XRpAS4PueZ6ZcF5UDLJyy3k5YclFVVAkvP1MtkDIaEPQQ5TGo96ZVqeUOsz/xlf2/OPtfc+6IDwSMcaqg549p6Pdr/oR4J63qDVSqudOU/t+f+L7g+96Y8B9CDjiOw+hnDtHvV/0I8CP4jnq930gfk1/1jmOm4fQH2wISoivYn0x4BvDtHu1/0L58Dwz+IZ+0kft+f+L7n3fTj4D6Aj0xegH0M4do92v+hHif9YZ/4vuC/wDWGf8Aife9OPgFOOPgFw7R71f9CPAP4hnH2vuX9v6g/a+594Yx3AU44+A+hcO0e9X/AEL58D5+XX9R2lr7QPySPxHP/F9wffEADx9yfTDeHaPer/oXz4Hz/wD1hnP2vuC/9YdR/F9z9B6Y8B9CPTj4D6GcO0vvV/0L58Dwf+sc4+19yf8ArHP/ABfcH3TAeAX04+Abw7Se9X/QvnwPB/6wz/xfcv8A1hn7n7n3hij4D6E+nHwH0Lh2j3q/6EeD/wBY5/EfQv8A1jnH2vuD7vpRPIH0BRjiew+hnDtL71f9C+fA8IfiWcfaH0BI/Es57j6H3fTj4BfSj4D6G8O0nvU/0L58Dwf+seo8R9Cf+sc/iPofd9GHO0fQF9KPgPoXDtHvV/0I8L/rLN4j6E/9ZZz3H0PuelHwH0L6MP4R9C4drHu0/wBCPCP4lnHe/kkfiWfxH0PuejDwH0L6MPAfQuHaPdp/oR4n/WWc9x9CP+s818j6A+36EP4R9CnDAdh9DOH+8x7tP9CPE/6zz+I+hP8A1lnPh9D7XpR/hH0L6MP4Y/8AJC4do92n+hHi/wDWWb2fQg/imb2fQ+36MP4R9AX0YeA+hvDtHu0/0Hi/9aZv8P0L/wBZ5vZ9D7JwY/4R9C+hj/hH0M4do92n+g8b/rTMPD6F/wCtM3+H6H2TghxtH0IPT4+do+hvDtHu0/0Hj/8AWuW6ofQv/Wmb/D9D68emxj7I+hr0Mf8ACPoZwf8AqHu0/wBB4w/FM3hH6D+bX/WmXwj9B/N9c9Pj/hj/AMkOZ6WO4ERiIgGxtHybwf8AqHuU/wBB5f8A1tl8Ir/1rm8Ivrjp8fO0fQn9mx/wj6FwfUe7T/QeP/1rl8Itf9a5f4Yvq/suL+CP0L+y4v4R9DOD/wBQ9zL/ANB5B/FsvhFf+tsnhF9c9LiP2R9CP2XF/BH6G8H/AKmPcy/9B5X/AFrl/hC/9aZP4Q+t+yYv4Aj9kxfwR+gM4PqPcy/9B5Y/Fcn8Mfv/ADT/ANa5P4R976f7Hi/gj9C/seH+CP0N4vqPcy/9B5f/AFrk/hC/9aZOdofU/ZcX8A+hf2TEfsR+hnF9R7mX/oPL/wCtZ/wj70/9az/hD6X7Hh/gj9C/seEfYC4P/UPcy/8AQeZ/1rP+EJ/61n/CH0v2PF/AF/Y8P8AbxfUe5l/6Dzf+tp/wj6Sp/Fpj7I+99L9iw/wBH7Fh/gj9DOD6j3Mv/Qed/wBbT/hH0lI/Fp94D6X0P2HD/BFf2HB/APvXF9Rzyv8AQef/ANay/hH0r/1tP+APofsOH+AL+wYP4A3i+o55f+k4P+tpfwD6Uf8AW0v4B9L6H/V+D+AL+wYf4Qzi+o55X+k8/wD61l/CPpT/ANbS/g+97/2DB/AEf9X4T9gN4vqOeV/pOH/rc/wD6V/63l/APpe3/q7B/Cn/AKuwfws42/1F55X+n58zh/63l/B/zv8AJI/Fz/B/zv8AJ64/h2KvNEX7L/NP/VuD+H7z+beL6k55X+l/PicX/XBsVD3+ZP8A1uf4Pvev/qzB/D95X/qzB/CfpZxt1Lyyv9L+fE5P+t/8H3qPxe/sf856/wDqzB/D96P+rMHgfpLeNuo55X+l/Picw/Fh/B96/wDW/wDg+96f+rMHgfpK/wDVmAdj9LONuo5ZP+l/Pic3/W/+D70f9b/4Pv8A8nq/6sweB+lf+rcHgfpXG3Ucsn/S/nxOYfi3+D/nf5L/ANbj+D73oP4ZgPY/SV/6sweB/wCUVxt1HLK/0v58Tnj1vrnbtp6ouUujx4fNC79pdYukmtTjd1b9GhoEoDTTAqqoAa/JDSBqqq0gqqEBLJ4aZPCBCEqgBVVADlJ1c5cMKcUuUNS5ZfDZYs99dEKAqXBoVVVHUCqqp6A8+cRDITP4Szhx+oSCXrzzMY2BY9rx4sksZJGr2Wh0UtDmxemQAbby4BjiDdljJMzNyFPRmN4omq9il4DoTh6eM4iR5c8+MY5AB6cAvFp7XkjCUpbdSUtWFqdMeniQCSf3+TkY4RyT8nqzR8hA8HmwYBkFy8WK0rEyuplk9P7F37WxhjLFu5LXUYY4wDG7aB/kOphGtiOnxRnZkvUQjCtvPdrpxujIeLnGEYyIyGqZuNzTJiiMe4DVemxRkLPNrmzwMdob6T4T72OVUmMHSlVeWpkUEWlS3Qh5/UYhjIAdYdPCUQT3DPWDUN0ThoeD0xaRvZGUvRj4n3I245A0CCB3XCMZBM2sksQHlGvsdaYF8yOnxxyE7kZoCE9o4dOk+I+5jqfj+SU8hubTwRECYjWmcBx1Uqv2u5mMcQZOMsuGdmQ1cyzKkkxEcm0axl2c88RGdAUGsEN89wFRCOp/ufQ1amlqaZ8cRCwKLljxEjdV12eueP1Ibe9PPjyHBcZBThCIngbY44p8AWzOeGOlC/Y8uSYkbAp3w9OJjcT8gyIxYiDGchOVxFPfDFGOoABWOOGPUCmozEtRq5s5wRGylKq5WBkxjlMpmB0pyyyyiVDj2BvPAxPqR5HLUepgRqad64pSaOTH/Lnc7DWfLHJW3sjNkGWWnHDfU44wAMRTvddTW5cJCOGy59J8XydcX9r6XHpfi08HO1idSs+SUpbI8MnHPD5yR9KcsfTyCXYr1OQSoRNtWyAIY5ZrJPDpgyGMvTkzhzQxwrW2enG/JfzTlzOg6hz55G4EUOHSMTHCQOS3mwbjuj8TI6gxO3IKLJUekbYGeKGIxuRF+9zybNwEHTJ6J11v2OBHGlBqW5UeoEoCvLFnMLw9VAiW7sXtBvUaokARR4LU+LkqcGP7RADl5cBvIPe1ljihwST4M4f7geixRqMDXq+Q6QkPS+Tn1fZ1wxAxe8FmiRNkYdKalr4N9XP7DHSfH8nsyYxkFFPC0leDOOPSylzo11GkREmyFl0+TgHT3uc+nOONn7mzL1Ka479E7faxgxwkDKTt0g8mvizPpL1ifpY2k2SdUY5zCwIfSnDg3izoFzYPSAJNukJmGKwL5darAu2BECcWQxidDojqoS3WeOG+nhvlvPb63qlASFFy7QyNwzn6bGY+Y9+GuoxymLj2ZjM4DtlqOxen3cfv+/76ZeDkjwcnGMsRj2HmivSR1JeuUIy5FpAA0GgXKROBwYD/ADB73veDCCMgHtL3hty21DSP3/f9/wDMocamRGj24uHiqntwfCH05W55s7RHRFpiLb6DyhQqoC6BzLoEAqqoCqpQNsXDo54uHRpAS4PueZ6ZcF5kDLJyw3k5YYUVVWAkuZ5DoXM/EEU6gmkRaaQBvsqUIAKpUoASEBpAVSyUCmStm/YlAVVWkFVVAmQsV9SRGhTSoARKQgLOgSsY7RQQBSVSwoqVVoAL7pU8aKiCpNJVACpVACpVAFIaQwoFVUAkIpnJDeKsjUHRolAQtIBtKAqlUBVVaBVVRAa37EqqAqqoCqqwCqqigSoSgNISrSAQmksKBUoQAqVQFVtUBVbRaAVRa2gFUBKApQrQFCUIgqlDCgSqoCtKqAEFKCgc+fWLEWuoB+TMWFNAlAaQFVVASjb9SSqIbqqtAoShAUHhKDwgZqqoChKEAOcnQucmFOKY1KGp8svhvqz300QqgpcJRqaFUoUtgKFISoSBJF6Gqc8eCOORkO7srZb0KcHWCpD3OnUf2h8noljjPQi07RVdnUxHYWdDHpvgC5sZv1I/EHWMY4/KO/DbJbcknExx5BkHt7hx/sT/AMJdxCEJWOS3KIkKIts8e4Sjm6rWArxWA/k/S9NDjssYCIqOgScos4HL0fd3yYYz5GrYgASR3Sm8ZRG8ZOSfSxjE1ZKek4PveumRER47qZWInAKgIMQeWnLcEFCUJIHJ1Y1Dtg1gPc6kA6HVEYiIocNdsILOBjPpoy14Pscz0kQCdSa0etWpscmcPSfER7EdUDuvs9oiAbrVSARR1C5YlnGSDATgAXCXR80dXr4VJwSWc+CYI2cEdnHqondfansoAk1q1TOWMoTiTDge5MoiWkhaUrQhkMUAKADjPpTd4zT1KyXsWTh/Zsh5P3u+DCcfJ+TvS07dnA5SKqrziSC4T6WMjY0d1dTAkyx9PHHqNSufF6gFHh1VmMyWdzHFi2w2n2sYsBxzvkU9Kt5CSZQEhUnIdLAG9XdaYpRJMJdLCRs93XHjjjFRbVS3gJFkxEtC1S0tAZjDAGwGc2H1PYQ7IUvUSIStLSkAYyY/UFEkD2OlLSjcSZQwQhwESwgyEojUF2pabyEkyhGfxC0QgIDaG00zvBkMURLeNC6JpaUtiQIMQRq1S0tNBJnCAhoOG00tKOokkxBFFEICAocNEJpT0Ek14LZa2rS0BEoCQo8KIiIocNUb9idpYsRJKtCJKREpuBJmYxJsjUK3sPguw+10kJJVrYfBOwnsXLewkh6sJ0efZPwL04Rpq+nJ3PPnOUjoi1bAafSeUpVCUAOgc3QIBVVQFKEoGuLgurlh7urSAlwXmemXBeZAyycsN5OWWFAqqwALkfiDoXHISNYiz2HiinWClgHh05aQKEqgBBSpQABTSAkoCNFKqgKs8HU88NIgsmYBEdbN/c0FGuoaBStIIvRAKADraQKRuF7b15pAaSqoCtKrCiqrTSBQEoJpAKqqADd+xBJHAtpUASojXhYkSFjgqReigVoEAqqoAKEo97CizIEpF1rykoACaQlAKoWrNoBVVQFCVaBVVRAqqoChSa4FpQJSqsKFVVpBVUIBVCsKKqqIKoW0UKFZBJJFcd0CihKDqxlASezQQA0kGKpVpBRK605Si6aQVUexUBUKrChVCUBZJrlNa2iURIUdQUBu+FKgUKClA5uo4Yi31HDMWFLDSAlAVVKIAoSUIHQqq0CqqgLMuEsy4QIVVQFCVQJLnJ0LEkDikPMUU92GII4dtg8A+Z5UtuT0rNhRB5dJp9PYPBoQAY8l9S+8uh5Qiu19URCdoSyO0nvdh5G0tbX1NqaXst7j3uw8rau0+D6tLTVkxuPe7Dy9h8F9M+D6tLS9jtHv9h5PpE9vuT6cvAvqsysCwLLfZXUnvdh5npS8D9CfSl4F9SlpnsdWPffQ8v0Z+BX0ZeBfUpab7PaPefQ8z0J+BT+zz8C+lSaXsLqT3n0PM9CfgV/Z5+D6VLTfZXUe8zzf2afgn9mn4Po0tL2UPeZ5v7NPwT+zT8H0aRSeSuo95nn/ALNPwX9mm95fPz/i/S4JGE8gsc0CfqXs1HvWD+yz9i/ss/Y303X4Op/tTEvZ3+hmX4n00TRyw/5Qb7K6j3bE/ss/Yv7LL2J/606X/vYfSyfxXpP+9j9KWVUnu2K/ZZexf2WXsY/646T/AL2P0o/656P/AL2K9mvaPdsafskvEJ/ZD4uP/XXR/wDej6D+SD+N9IP94PoP5L2qj3bG/wCyHxC/sh8Q8/8A170f/efcUf8AXvR/x/8ANK9mo92x0/sh8U/sh8Xk/wCvuj/jP/JKP+v+j/jP/Il+TfaqT3bHZ+ye1f2T2vGP/Lg6P+KX/IL6eDNHPCOSHwyFi17NR7tjH9k9v3J/ZB4vWhvtVJ7tupy/sg8Ufso8WOu/EMfQgHICd3G188/+XJ0/8M/oH5s9qq2HuW6nqfso8V/ZY+L5X/ry9P8Awz+gfmgf+XLgJoRl9zfbq9h7lup6p6YJ/ZY+JfI/9ebB/BP7lP8A5cuLtCX0he3VbD3LdT1/2WHtT+zQ9r4v/rzYv+7l9IQf/LmxDX05f8oL2qvYe5bqe3+zQ9qf2aHtfC/9ejH/AN2f+WPyR/688f8Auj/yg1ZdVsTnbqe9+zwX9ng+B/69Ef8Auj/yl/8AXnH/AHX/AD/8l7deg526nv8A7PBP7PDwfnv/AF5j2xf8/wDyU/8AlzT/AO6/53+S4V6DnbqfQ/s8PBfQh4Pzn/rzz/7of8pf/Xmyf90PpK9uvQc7dT6P0IeC+jDwfmz/AOXLl/7qP/KP5LH/AMuTNLjED7txbwXQnN9T6X0IeAaGCHgHxfw/8Xz9Tmjini2xN3Kpfro+8Ge3XoOb6kehDwC+hDwDqreK6Dk+pn6MPAJ9GHgGwlKlVokTk+pn6UfAL6UfAOirhXoOT6mZxR8E+nHwDariug5Mj04+CfTHg0lcK9BLI2DwXYPBtW8V0EsyAs/DQa2DwaAQaZxS0QljtCBH2JpHw8riuglh2hdq2m2whINrJFN2yT4M4oSZlxjyXeThHktBYbDMW6aQIShKAugcw6BAVVUBSqoGuHu6uWLu6tICXB9zzPTLgvMgZZOWWsnLDCitqhgJLH2h73STjOUYESkaA5JRTrDYcoyt0DSBRYuko1QBGVk8iklUoAC1fPjolUBVdVQARaVSiCqq0CqqgK1rarqgKUKgKVQgNpZ1J547NICqqgKqgWgFVVAVVUBQTSWZC2FMf2rF/HH/AJQR+1Yv44/S82T8PwgGVGwPF83osEM8zGfFW85c8cD01y6NO0vA9v8AasX8Y+lf2nH/ABD6Xyuu6THgiJQ5JrV0wdLilhGWYPtpS8dMB7dIVscT0R1OP+IfSv7Tj/iH0vkn9j/xo/8AA/GS5PqvqX2l0sev+04v4x9K/tOP+IfS+L1GPDsE8V80berpugxZMcZyuyPFJth5dEuTk9D9pxfxR+lP7Tj/AIo/8oPIPw3F/i+n/Jz6joMcMcpRuwO6bsscDCrltxLPQ/aMf8UfpX9ox/xD6Xxuh6SHUbt96VwXPrOnjgyCMeKvVNuJN+1Xlwlye/HNCRqMgT73R4um6HHhInG7r63teinc89kk/SKURuteUtMCqqgBVVhRSqCWgKEoKAotUOQEEpQloAqVQBSpVAAIIsJpaVAA9qVVAKqrSAS57pb9teWr3e3wbQFVVAVVWFCqFQFVVAGt+xSlBQObqOGYtdRwzFhTQJQEogVQEoAKGkIG6qrQKEqgBiXDbMuECFVUBVVQJLEm2JIBw8O41efBq9AFMKFKEtIC+yVVASoSqAoN9kq0goSrAKpVoAqVQAqUICoN8KqAqqUAKlCAoSrAZzFh+L6PDjw9WcfWCqv4+L9r9sQ8H4hDptm7qhEx8ZBoPmOvnHD1wlhoC4EbKr7n2uo/AsHUZDlkZRMtSI1VvznWHBDqP/Bv7XlPf58v03/XfSf94PoKKfO/i3QQ6LIIYySDG/M+n0n4Dgy4YZJGdyAJoj8ng/Gurx9VljPCdwEaOj9N+Hf8Nj/pDSHyHX9LHp+olhhe0EAXzq/RR/8ALe6UjXd/ynxPxgf+Gz98X7KA0HuCB4mf8A6WEJTG6wCR5nw/wvpsfU9RHHksxkDwafR/EPxfqYZcmCoxiPLxZpj/AMt7pjPOcv2YDn2lA9YfgPSfwn/lMT/BehhrIV750+vM7Yk+AfisOHN+L5zulrySeAPYGA9j/q38MHeP/m0/9p4vxPpeixYDLp632OJmX6vSP/LXj3yn/kh4+v8AwMdHhObeZEECtvYtBv8Agf4f0/VYpSzR3ESoP02DDDDAY8YqMRQD4f8A5bP9mf8AV+j9CGAVSqBzdR0uLqKGWIlXFvh/jXQ9Pg6YzxwjGW4agP0GUS2nb8VaPwXUZ+pmTjzSlI3rEnv7kD0//Lf6bFnGT1YCVEVuer8b6TDh6fdjhGMtw1AefpOm/EOhxb8UIyE9TA/EHj6/qOuzQ/8ACImML420Gg9D/wAt/pcWbFM5IRkRLmQt9r9g6Yf7qH/Ij+T5f/ltf2Z/1D6no/HfWjg34ZGO0+bboaQPD/HMUMfUbYRERtGkRT9F0HT45dPjkYRsxH2Q/JYcWbrswhZlI9yboe9+6xYxjgIDiIAQObqf2bpo78ojGPtiHxsv450sf7eHd7TGIZ/G4SzdZjxE1EgAH3nV9np/w7p+nFQgL8ZDcfvYD5fr/wARHVwERiGOjdj/AGB9D8H6np+n6bdmMQdx51LP/lwdZjyCOCBsxNyrgex8/wDDvwrJ1xsHbjHMvyQPpum/EOj6iW3HKO7wMa+t7tkfAfQH57r/AMFwdL08suMy3w1BMn0fwfq5dTgBmblE7SfFA+f/AA+P/qQiP8cn7IRD8d+H/wDqxH/jJfq/YTjvgY8WKQPJ/wDLgP8A4KR/ii8f/ls3eXw8r4uXo8mPKcJFzB+l+t/BugPR4an8cjul7PY0HphoKAkBgEpCFQClCoBVUoCgDUm+UqwAGiVVAVRaoBQqoCggHlKDaKFeGUoBZVBDATJwhyXaqFc+9xjyUU2i0xFtpAqqoC6ByLoEAqqoClCoGuLl2ccXLs0gJcF5nplwXmQMsnLDeTlhyUVVUCS5SFkA6upc5cj3opuBToGIttIFnVpUCRdpUmuVKAQlF0lEFVulQAQqVaBW1KoCqqgKUJQAClCQgAmiB4pItV5QFVVAVK8pQAju0qAFWlQFVVAUEWKKbVA8f8ShkjLcCdh0oM9P0WfGN8CIyP2T4Pr5MYyRMZCwXhE5dGdmSzj+zLw9hefFLE9VcxuvFa/c4Osh1AAOY6XpRfS6AXgiPe834lkjKEQCDr2en8PP8iPzZWJcGrtvLTeGJw/iGKMJxjCIAIerD+H44R843F6s/Twzx2yeGX4fmGkMhr2thpysSK6tVV5cTLr8ePHGMcYA1t6+jju6eIurHL53U9FPBESkbs9n1fw8fyIe5iUt8i3aVFDnHU8XJhnin6cibvl6c34fPHAyM7A1faOOMtSAa8Q49YP5U/cuCSZFnNuq06nn/hPE/k5fif8AdHuDv+FDSfycfxQH1B4Ux6VNr/pWezj4HuDo5w4Do9jxMVVUQVVUBQlUAcpZN9tEoBQqsKAsGVOjJi5aKhBaQBTTpEYFSqIBVVAVShFFUoJoWezSBVmEhICQ4Pjom0AoShAVVUAEJVLAKEoJpASaQCCLHCg3qlFFBSgoHL1HARFPUHhEWFNAlASiCqVQFm2mUDpQqtAoShAWZcNMSQJVUIBVCUCSxJssSQDg4eh58HDuGAKUJaBVVQCqEoglVVoFBIAsqCa1XlgCDao17JaAqhUBVVQASgSSWCaQNArALVoBVVQFUKwC8vWdLDqsZxZOD9z1K0HwfV/hWbpcgjIGUSaEo9/833x/5bvS/wCP/lf5Pt0ghSD4r8Y6LH0eSMMV0Y35jfd+m/DP+Fx/0h8z8f6LNmMcuOJlGIo1yNfB9P8ACx/4Ji/pCB8x+M6dbP8A0/UH7PHqB7n5f8b/AA/Mc0uojHdAgajWqHd+oxfCPcEDyfxn8K/ao+rjH8yPb+IeH5O/4Tmw5MIGKOzbpKHgX0yHyut/D57/ANo6U7M3cdp+woHpHV+b2f8AVXXCR/s5bF+F/kfufW/Duv8A2sGM4GGSGkwRp9L0dX0mPqsZxZBYP3HxQNol8r8eH/gkvfH60fh0+o6ef7JmiZCPwZRxt9v729f4l0kurwSxRIBNVfsQPM/8tr+1k/q/R+hD4n4F0uXpRkx5Y0dw+ej7YQFKqwoCHx/xDopwyDrOmF5I/FD+Ifm+yyQ0hxdF1mPq4b4dviieQXi/8uAX0p/qi6dd+GzM/wBp6Q7Mw5HaXvdM/R5Ou6b089Y5nXy+YWEDg/8ALa/tZP6h9T78oCQoiwXyvwXoMvRDJDLWsgQRwdH2ED58Yz+D5TIC+myHU94H8n24SEgDE2DwWpwEwYyFg6EF8ePSdR+H5QOmG/BM6wJ+BFOn8T/Dh1sAAds46wk+Fn6f8WI9I75DxjX1j9X64IIRD4bq/wAJy9HiGXKQCTW0a/e+3/5bprppf1n6g+l1/QR67H6ciY0bBHi4fhX4fPpMc8WWpAyJFdxSB5P43+JxzD9nwmxfnkO/sD6n4N0Z6bpxu+KZ3n9GofgnTY8wzRBFcQ+zfi+nSB8X0YA/ER/4yX6v2Q8HyJfggh1UepxS03bpRl+j7I8EDz/xD8P/AGisuI7M0Pgl+hXoOvGe8WUbM8figfrD6RfO/EPw2PVgTidmaPwzH6op6ETbTy9EM0cYHUkHJ32vSUApRaUAUlVRBVVtAVRaWFFQqoCqCkIClFqgFBW1QIBaWlukBWlVAiQcI8l6JPOOSgaRbYi2gFVVAWww6BAUoSgBUoQNMXLu4Yvid2kBLgvM9MuC8yBlk5YbycssKBKFYAFylyHQuZ+IIp0RaN6UgNIgV5QkaNAqqoCoVUQfb2W0q0CitbSqAqqoBWlVAVVUBpVVAVVUBVVQFKFQFVVAVVUBVVQFUWOEoC8vWg+lKhZp6kEWxqVBqrhyfP8AT9JjyxM8ktur0YYZMXn6efqQHMXuydBhyHcY6+x0w9NDD8Aq3Cqei2cmt+56E4OojljY0PBB7PRThLpgcgyDQjmu70O1O5wtH+JJiJCiLCIY44xtiKAbVpmRpBFpVEMoYYwJMRV8rkwwyDbMWHVkSskUdEWXqEClKqgFUJRBVVQFUJQFFJQgKEqwE7hu296tpCooVVBFikQKUAUKVoCqFQFVVAKFSgLGQSIqJo6a1bSoCqqgJKLTS0wDaUJQAqUICqoIRQEgcqdQmkFA5uo7IivUdliwpoEoCUQKqqAGaaQgdCqrQKqhADMuG2JoEoShAVVUAFzk6FiSAcPBdw4YO7uGAKUJaAJQqAVQglApXjj1sZZfRo349nfJk2RMuaFqTTq1rua2rydN1ceoBMQRXi9NojTThlWts28nVdb+zkCrv2qRWrs4R2pcxOxadyIWrNraAS5lolzmUCg1bjerYKBpa283U5jhxmY1IZ6PqZZ4bpAA3WjJ2NcXHLY67W2DJ4D1k45xh0I01TcCtXbQ9K1JYEk20yUhG5G5AJC1SCXjxdb6mU4ttVet+DJNKrctbHYkaPB1WTOJj0r21rQa67qZYMdx5Jpcka9tuO07bXl8zp59RLFKcjZIuD0dHLMYn17u9LSci1InFYHWAlgyA5TbTnATSsmVCzwyJg6g2hBa3T5/XdZLpzHbWt8u2YyyYj6ZqRA1tkm+Dwb0Z1gpt4+kGSMKym5X427SzRh8RA97UyOuMLE2tXOOQSFxNj2KckRoSL96MwaLTgepxxltMgD4W7AoNNBQStvm/imYxgIg0ZH6k3BqleT4npWr434blMchxy7jv7H1pTERcjQDE5UlvTi+JaucM0cguBBHsY/aMZn6YkN3g0zDN7ZMgOTT5HVdYfWGyflFXX3un4hljlwiUDY3c/S55HVZTms/5HqCQPCbfNw9ZjxYoCZo1xy9eLPHKN0TYdSYtRruN0vLm6zFg0mdfBcPW4sxqB18DoicXExgdSC4ZuqhgAMzV8aWx+2Y5TGMWZFBVesGsc2OZMQQSOzrb5fT+iM0jEyMvNYI0eWfVRPUDJZ2WP3pzy6nX2pcV6Hv2g28R/EMcKu/MLGj0TyiETM8DV1JydWttTa0vN0/UxzjdG641drRlppwy7QJAvnZ/wAUx4ztAMiPDhrpesxZSRAbZHUjxUm/bslyjA6s2eGEbpmguDqI5xuhqLp8b8R6gZJ7QD5LBfR6CeOUP5cdovv4uVaXB0tl8aKz1OvJlGOJlLgOfT9THODKPANW59ZrhnXg8f4bPbikfA39ynGDKonR23k9YlbfLP4rHaTtO7tFvpvxIZpbCNp7atlEeVZKYPRtyz9RHDHfPh5+q62PT6Vcj2eDP146jGYkbTYI7hjtBqmU7Q49J6f7XD0vWF7XTB1Ec8d0bq61fPwSH7JchY10+br0WWHpGUY7YgnS0mW1Ek42cHoWtvky/FJEn04WB73p6Prh1GlVIJNMw8u1VLR2g2lncAjdbo5hLzjku0i4g6lA0DbAbQCqqgLoHN0CAUJVACpVArH8T0PPj+IPQ0gJcF5nplwfc8zAZZOWHSfLCKBVSwEFzPIdC5y5CKdMUshsNIKqfEqgKWYxppAVXlNIAVKKpAKqxRBu/kgWlm1tALIyR3bL81XXsTaWkCqEEoBW3E54btm4GX8N6/Q6AoFWqFtAKoJZlMRFk0EC1c4ZYzFxII9iZZBAXIgDxKBohiGQTFxIIPcNoBVCoBVCoEmETISI1HB97aFQCqFQCqFtAKoJYjljI0CCR4FA0VFqgFULaAqqCgFC2xKYjqTQ9qBorAlbVoBVFraAVQi0ClZtn1ATV6oGisgraBSEWySbFcd2FLW0WzvF13QLBSyC0gKqrSCqUIBVUFAKEqgBKqgKqhAKqqAqqGAVUKiigpQUDl6jsiKeo1pEWFNA0yGmkFVVgFmw0y0HQqqgKqqAGJNMTQJVVQFVVAksFssFAOA6F3t8vL1RwgiI83Y9mh+JitYm2GHeqcNnp2tvmf8AWkavaUf9aRv4T9Kkz7tOp6lrb5X/AFoP4T9Kf+tB/D97ZJ7tOp6lskvm/wDWYv4fvZP4nYvb97JL7tOpED/4YfefqfRz/wBuXuL4sc//AIR6le2npyfiBlEjbyPFwmsT1Zl0nTtSK/C5aTr2Ij+I5ZXGMQZdqefo+oOKMqF2WemzelKUwHM4KDpZ1TzHbHjB14evyxyCGYc+ynTr+oOLbQBu+Rb5+fOcuSMiKpPV9Qc1WAKby1U4hOrtRx8R6vU9X6GPd3PAeKHWdSB6ko3D3PN1ec5KB0p6D1sojbtFVTZl6mHelKVs1PJnT0PVzz7t9aVWi9F1eTNOQmRQ40D53SZzh3EDwXps8scpSjTFbQ1bivcw+FI9DrOqyYssYxOh9ntT1nV+mYwjyXzc+c5pxka7cM5ssp5RKXKdokteNlTtTZ2nNlh5idHtxZhMA+L5U8kiNZaJh1EscBVF0niccy9FWd+w9LrDeKXuefocgx4ZSPAJLyz6vJOBBpyjlkMRgODyxuGXLurZc7ckbxy9T1MjKBIA9tBiM5nqI+ppIEAs9P1E8UajxdnRzOaU8wnI6j9HO3KTssxc7ZfGOK1O7q+pySyDBi0Pdzmeo6MiUpGQP0PJKcp5DInXxWW4jzyJHtTbKrUqqp6WXTU9LrepJxRnjJAJ7Gnn9PqOoh6m6hWkbPZ5suSXpxheg4dh1OSIEQaADZl6nJ5qpRWS/wAmjp6PNPPjnjMtQNJe95MWGcsxxidSF+b3MdPlljvYaJpGPLIZJSBIOrJmDo7qtsyq2UnX+IylHJCpEadj7V/E8Rv1b0JoRePLlnOcTMkkV9bWfNOYqR78Ne5mub/0X+9KO7p8Rx4JT3XujdeC/h2XbjnIm6N/c8RzZBDZZ27eHPHOQgYgkWf0SekGXmJ1zHb/ABtB0Y8c+ulKUjQDv0oy9Pl9M2YEvBhyygCImjy3HqJk7RI172TvOJczMsnbLVJqkdnUdPl6jMd9xxjg9v3LyyrpcwGOW7i/p4cd0sp85JodyyaEgB7FO51rb4aPeukYeZ2/iOIRnvv4v0p3lh9LppAG7831Pm5ZEnW9CeS6TmaOpMWypZx91umXaNXH1O7o8vp9NKY7EvN0/Snq7yZJd3ms+nXY2mGTy7bqlOk6GndpZjy1NkzqiZdFnEQbifqKfxAn147eajTxAmUgR2/RJJ3jxczhHQ1W/qpyUWtVydnUdDHDj3gkkc+17+hy7sMTI6+18SZJvum/LF2oqzy2z3bJ9xrS0H0ZyDix9L4/VTGfqREHQUPzeS61YA3XImlZzgX8fMTVsy3pVd+87+ql6OcZY8Gi93U5YnFLUcPgyjQu3UkmIPfhzMSup1verrXMo+Sq0mz0PwyQx4yCe/dyGQftl3pZ1+TwwmBGj42uOzOz4KcF2G3yVsyV6eOD6nV1cMYzREKo1de0u/WnHHCIYyNJcX73ziakD805NQCO6wUpGVmWaybbW1O7punwSxgzPmI8eGfw/LHFKW40HlPAPsDOPiQShQzHutrOT/x08zpwCGfJKeY6eC9XHFAieA/IPLCWyweCp/mGo8Mf16nbld3TX/RRqdvX545Ywo68kOvTR6fDUpS8/L52aQl8m53u+h0muWJ5szOdcqtqaNtHR0+WI6iUz8PmZmcf7QNtbNNKeaHMq8CjdtlbnbuZ3V37nHrlyd3W5MWSERAi46VXZObqhLp4xvzGr+TxkfeGMY3SETwGtx8O5jIu7prMweW8fnvPW6XqMeCAgTr3az/iEDCQiTurTR8smzfijR6TCPB/yizvyeknT0csUImWQWSaGjGbJAZozw6cWHmjPaKIsJh5juOgDynDBYn0psrvMs17ManV1+WOSQ2ji70e0fiGOAqjp4Pjz1NtzPmLurSszx5udb2cuy1cno9R18JwMY3ZGjz9L1EcWKQlfmJr6HktI+D5p6ly81vJs3qrL9G/RZY4iZSFnQBZZoy6gZAKFuEBUSD3KIi5AnhxKS0xPQ8x+/es+nj/AAdGTNHN1G4jy+32OvVdVjy4620ezw63uimW6Quq/Vr35IlbO6yr1skl8R1Q6jb0/p1zf1p6bqY4cRhMEiRLzEeUDuFryVxyVLcYEeZhf1R6zph1soCsMBGPtc+kznFMzOujgDKttfNcYIsHw0YnEHS94WYprp6ccWep/wBaD+H70f8AWf8Ah+982rCgV34e0nyPdv1PSP4n4R+96sGT1BvqrfDGr7HRCscb8FMnfJvazfJzgdYDoA5h0DT0ilVQF0Dm6BAKqqAqqoFQ+IPQ88OQ9DSAlwfc8z0y4PueZAznyw3PlhhRVKsBBc5ch0LnPkIp0RLQYi20gkW5ZM8MWk5Ae92fF/Fvjj7i5s2lgdMuqtbiz0R1mH+OP0usMkZi4mw/K2+5+Ff2vmXNbNvE7ZmSqV5I9K1tUPQ8phn6qGD471cj+JYdoneh+ljLOWXfUYmeM6CTxQyHDllLqAbkNAA8234Hprl1ax+LvO7/AK0weJ/5LJ/FcI4s/J8/HUumyS72KazRjjx48g+Oq97mX1Ont0mIesHo/wDWeEAEk6+xH/WmDuT9DwSEh05jKG2qotZ4gehQ1IFupZPbp99zt/6z6c/aP0O+Dq8eckQN1rw+d+ITjYwiNGwbfVxwEAKABrsHVZb1OV61VU4cvtLlIRFnQB48X4l0+aWzHkjKXgC658oiYwIsTO37n53r4yxSEI4RiwwlEnMB28XZwOrqD0E8ks8csY5uROzoR++r1dP+M9NOAlPJGMu4vu+VPJ0nU9dhjhEZRuW6ho7dJgwftXU74R2x2kAjhA9X/rbpf+9h9Kn8V6Xvlh9L4cOouJ6mXTYx02utDd7G+ixCGUDqcMBHqDux8Hb7ED2f+tOlH+9h9L5/4n1vTdRjjD1YmO+O8A/Zc8cOm6nrNuLGNuOMhk8tC+zj+ymWI9QZYowO7yGHAHt8UDfFn6Tosgl0+SOyR2zhuuv8Q/V7Oo6zo+pxnHkywMT4SfL6np8cfw2GQQiJkQ81a8tdfA9JGMoYsUoERHmj5txQOvpur6bo8ghjyROGXbdeyX5H632cPUY8w3Y5CQ8Q/KdXgzDBKeXDixjSjAVLl+n6XDDFADHERFA0NOyIVn6vFgoZJiN8WXL/AKz6b/vYf8oPF+PYhLFGRiCRKOvgC8n4r02HGcIhCMd2QA0OQinsf9ZdN/3sP+Uv/WXTf97D6XwOsPSYOsjExAhEETG3uePe1+HYem6meeUYRMNNljhA93/rLp/+8h/yl/6x6f8A72H/ACg/Nfs2P/q4Zdo37vi78vbm6PAOswwEI7TEkitED3MfWYch2wnEnwEgXot8L8D6fH/MntG6OSQBrgPs5snpQMyLAF6IGc+swwlslOIl4WifWYcZ2ynEHwMnyvxLDGJMsXTjJPINZ+Gj5vVz6aXSRBIlnqMbrzaHj5IH0v7fg/7yH/KD5k8XT9PI9R0+SPq3uI36SHcfk8+fo8A6np4jHECQO4Vzo8vW4oYs0oCOHHEVt3x1N/JA+mwdZizAbZAkiwL1eu3xPwbosWPGMlQlOzU4PtBAnJkjjG6RAHiXD9tw/wDeQ/5Qa6uMJY5epHdECyPc/MZ+q6GeOXp4DdaS28H6UD6X9tw/95H/AJQR+2Yf44/8oPzefpMMeixZBAbyY3Lubb/FOn6TDLHihjEZylE2BpSB9B+3Yf8AvI/8oPl9fLB1WfGMmSPp1KwJ93Dqvw/p4dXghHHERlu3DxcOuwdL+0Y+nwwAnuG8AaUUD0ulzYukn6McgOKQ3QuV7T3F/U+h+24R/vI/8oPh/iH4f0+LLgjDGAJTqXtCMvTYp5ZYum6WEtmkpyNC0D3f27B/3kf+UF/bcP8A3kP+UH5LpvRxznjyYPUnu+GGoAfQz/sMIQljwCcshqMRyge7+24f+8h/ygv7Zh/jj/yg/NREJzOOHRDeOQTw3i6PDPq4QnhEAYEyh7UD6I9bh/jj/wAoPl5sHTxyS6nDkiM17h5xXu+bwdN0GKRz7cUZmEqhGRr73PDj9cyGPo4HaaPnNX9KB9J03XYs8YkSjcvs2LeoyERfAD8/+DdJjObLKUAJQl5f8L7uSAnExkLBFFAg9Xi/jj/ykftmH+OP/KD8/PL+GWR6JJGmkS8+LpMMugyZjAbwTUvoQPqP2vF/HH/lB8TF02HNPJkyZazCctshPjwcep6PFiw4pQxQJnW6UyQBp3Y/D/w/H1GYyyDEYCPw45E6+4oH0HRdZHLACco+oDtlR5I8Pe941fmvwvocH7Vm8g/lyGz2P0gQKVVRBVVQCqqgKqqAqzdC5aNIASySbFcd2kBVUIBVVYBQlCAsyNcatIKKcvUdkRT1HZEWFNA0yGmkFVVgFlpmkDoVVLQKERluSgBibbMkCFWlQFCUIALnJ0LBQPJ6w+evY8xt6er+P5PNRHzcM8Gb8bASefBb7eKn6kksWBxFbHCgeCKWoCT9K8I51SNeGzAJIvUcpInLlK24ddz2U/KtVKrStx0b2DEADb+5RHQStaQ2Fsc/fv65/wA9RN6EcjspG7X60qziir8i64xHo0DOpMiJIonRJjehT7U6yap+Teq44NTvsDHoD4Xyzto2Dy1EbQR4qGJYdp1zfyGsx2y2mmgCNEHw5WQE9VteezricH+TmN1tONdChHy6nQIkb47NDimaSUaEzc62YoenRCNfckaCvaiIXktjqZWZZV4LRkmA8aTGIjK/BeCXHN1MMOkjr4AM4ydl+TnPBM1MQdU7B31p4x+I4ie49peyMgRcdR2a6oizs3LrxmEMhuOqe33IrxSWwcHmWa4N4agAERXcoMQdUrwyFob9/MVvc5Y9RIvX6FPm55VVxRn3b+nH4dBlqo0FDhCb+hE9y0WU4WxZJgD245TEUK+lfalQkbefmOvB29JJAOqaGlBOnz/f6l7KEx7+aklyeAZHdyiqFHjwUBedAsEZWZdLjycdADSgOymIPKSe68acNhBZl1bkrOXqxGg0R9aTXIWl2EeZeeXJ8uoD9IX6l+Wq2o3M8nHGfT0HlPanDJ1EccxAgky/V29zCzZLjPpYpuhohbtsIis0uM4dA0PBb1tdK07/AL/5PH1fUyxVGHJYlJ0Vr2w5PzOyuyRXHg44Dk2Xl0l+/wBTpIkA+4ozysvSngUfb2XgacF4+i6iebdvN8PZoDajqW0ptT3jXbw7IvSko44TxM8nETh0DSF9zw9PmnPNKMj5RenzdJBJtdx3+76VF9nl6c5t8vVvb9m3ptjQeD1CdBoiA0Mu54TfvW/myDrXO4UtSqxtrYV4UarS1OA8/JT4LVoq/c0SP3qqrtMgvvwE+PsWkfW2ZA6KE0gMKFb5+v8Af6F/el9pWoHj2Jv6F1R+qnoA+/su76V9in3rvKOvzVdRxotJYgePd7X2Oj/tj3PjSO0biCQOwfY6P+2Pc1I9ORq+46w6BzDoHR6wqglbQEuocrdQgFVVEFVVAMeQ9LzR5D0tAJcF5nplwXmQM58stT5ZYUCVQwElynyHUuUuQim4B0qq7ul1ozHhoEcNIF87r+jn1BBhWg7vpITUmq2dXKPBP4VlPcfT/k+l0XTywQ2yPe3rkdosqxJLQ3bNtZQwqq205HJ1GLJu9TDW6qIPcOGDp808vq56FCgA+ktM4o6LMaUfU8XHgn6GWFebdw9cOlGXDAEkECwe4L30tUxVRbZrfZjJ43VdDm2GUpmZHZrPjkRgIGgq31q1QNbsVq1VSKs54Tsc/UYDOpw+OOo9vsdcOUZY2NOxB7F2pFU2DnylQ/Aw6nB60DG6PMT4EcPi9X+354HpjiA3aSyCXlp+ipkxaYPB6jpvS6zptsdBYJA7030mEnq+pjIUJCL7dAqQBqWg+Zy9D1MsMOhGPyxlfqX5THl6MWPqOs6jHLJjOLHhN69zw+9SaQPNydLkwyll6YAmWs4S+0fEHsXzeq6PJ1O6Q6cQlR3SySsfIDkv0lLTAfO9TjkfwyIANgQ+t9Hqej/asUQDtlHbKMudQ+hQCaQPmPxPp+vliJzSgYAgkYwbP3P0eEeSPuH1Om1NUgY9RCEoSGWthHmt+Vy9LCObHkwjJLHvA3z49w7/ADfrzESFEWPau1A5JdFinlGcx840t87osZjn6oVWor6H3aRt7tB4/wCDYRPoxCYsEyBB97vh/CsWHL6wMpS4juldD2PpCIHC0wHkfgsTGOUHQ+pJ9WURIUeGhEBKB4uXL1XR/wAuOI5Y/YlE/cfc8XVdHLF0BOSP8wy3Gu1l+lJ7DlaQPD6iB/a+mPaj9TnPpYYurnPqACMgHpSn8IPgfB+g2A9uGZ4ozBjIAg8gtB4/RYMvSwy5ZxiJHUQhxp+b1fhfWz6zF6k4iJsig9hwAQ9OHlFUK7MdJ0selxjHCyB3PJLAbEW+bn6KHT9PljiBqQlKn1EEWgfNZ4n/AKvxe+H1vt5Omx5wBkiJVqL7PR6caqtPBOwXdatB4/Wx/wDDen8PM7dRgGHKOrEbIG2fjXiPc+kYg89lIQPE/EKnl6aUTcTPkcN9V+H9RKcj02QQjP4wR38Q+sMUQNoAocBqmA+Y/D4y6LHnIBnKMq0GpenF+Hzx4MeQi80JHJXv5D7uwA3WqaQPHy9Nkz/+EdHk2GQqVjQ1+oeLpely4OvAzT3ylAnc/SbQOEHGCbrUIHj/AIXD+b1F/wAaJdH1nTXHpTA4yTIb+Rb7IgBrWpapA8L8DhOMswy6z3Dc+3SRAA33aQOKPRY8U55YCpTHm8HxMUD/ANW5RX2p/W/UUx6cRdAa8tB4PW9McvT4JkGWOG05IjvGmsfR7+ohkwRxxwx82+HMvYX3RAAUOHPH0+PETKEQDLmmA8z8NH/hPU3/ABRd+s6+fT5seKOMyE+T4PoCABJrU8pQCEoRaBSs20gNqqoClVQAYg89kqhAVOiLSwCNUqrQKqhAVWrUi9CgKClBNMKcnUchYr1B4WLCmgSgJaQKqrALNtMtB0KqoAApKqgBmTTMuECFVUAIIBFHhpCBJc5cOknOXCB5XVjzvMS9HVfF8nn4cngzfjYnRatkpcRicQhVHgj2ugH2IA0VUgPvTRRafZ3ZqB7Wq3WoVaFFPvZAluJJFJUAI00R7ki0FAI8UA+CPklaaiRPP1L2X2KtQE12QfahUsAEa/JQEg0PYurSmWbJ6cZT8A8HSdOM5OTJ5no66/RPytrov7Ir2tWmB0TikrdlT6bHIUYj3h5ulhkwzMJA7PFrNm6iMyMcbiODTGDqcs8gxzAA9zYcYmknxe6OrL1EcQ3S5PA7uA/EQD54EDxcdoz9SRLWMf0ezqcQnA9iBeiEVUJrEc3UxxREq3RP8LrCe+IkOCHzsN5unlE6kHR16HL/ACjf2NWNQR0UONUzU9UDl9ER95Z6jrRiO0AmXh4OPRA3PMeeA8/TZ4Y5GcwTI8Ng1wUvCYOzF18ZS2zjtt36nP6ERIi9afO6rqceYDaCJDu69VIz6fHI91A4KauInY0j1onkjCI0Joko/wCsRrcdewvl6OmxCGOIAGoEuHj6KAOWZlyL+tQiLhi40Lh18gduSNAvT1PUehESAu9OXn/Eh5I+8s9Z/Zxk/votSqqfFxqGfXy5xx8o7lJ68yAGONyPZ6IREcO0cbXm/DQKlLvoFCRPTDtx0L6fqzOWzINp7fuXTquqGChVyP0OGXTqo13pxy5K6gyrdtPHuUSXgm5jaYNP2zPjO7JDyn2U9c84GI5Ia6W8mTq55ImJxmj70YhKPTzEgR4W2A6rVpLEI6zLkAGOPmHJdOn6qZn6eUUTwW/w+NY78Sbcc+vVR/0rAnpbtWNDHPLKcg3CiPh9ur6OGUpRByCpeDydZpmx/v3fR7uWZu5rUichGJkTQeH9oz579IUA9HXEjCa7kJ6KIGGNe0/NYLElcK8tTLB1ct3pZviPd5eqOX1Bv5+zw7fiArJAjn8ivXkjJD9+7TrWJTjVHZgGTb/N+J0l8J936NEUCzPg6eLk4TjJwfhnMvk5jqc8pmETZuh7G/w3mXyXo/7069v1ut3J6HrZkSnn6Ug5DcT83r6nqvSgJD4pcOX4jXpj3uPVnTF4UERJW4t9pQxdVXqbtTrt/wAuGegkZ5jI8kEl9TQcPm9IAOpmO3mS0IrSrGnSZpzyzjKRIHY+9mU8nU5JY8ctsB+/zZ6PTNO/b9aTnz9RMjEaA/f96RYxbXZiRP1ejlEmW6J7W+oNQL7vj9VhyYqOSW4n2vsRJIHuDHgYzNE9QqQo+pRTl46HET7VpfuUtWABSB4BP3LytTIoK8J9nJUlH2rWtIBHKfqUAePHjutqUe37kQP3Jvv2RqdEhaFHjRGvJTV9lHj961A86L7Byq2u4B7Ps9OPKPc+Leht9rp9Yj3BqPXkbnQGwwOXQOj1ClCUBdA5ugQCqqgKqqIEcvS8r1NAJcF5nplwXmQM58stT5ZYUUJVgILlPQh1LlPkIHRHWnRiLbQFUBKIBCUBAKqvIQAC0xGAib8WmgKoW0BShSUAraLW0AqhbQFKFQCqqgKqqAUKqAVQlAVQqAqqoBVCAK4QKVCDKhaBSotUAqi1tAVVUBVCoBVCoBVCoClCoBQqoCqoQCqFGiAVVbQCqLVAVVUBQlWACqUNAtAopQECrVVQFFsz3V5av2qgVabZCWABvtqWghKKFC2rSCqqgAacpVWAClKCinH1PIWK9TyFjwwpoGmeyY2RroWkKVVYBZppCBuqUNAqqoAZk0zJAhVVAUJVAgsF1LmUDyetFF5vk9fWi5fJ49PDVxB4M342CR7L7Vkn9GM5bj2rxVbHzRSWBA8ICa8UAIBtHsSbtaaBXun3oAH0sKP1qn61C1AOU8r89F/RaABT+iArIADR5StoqtXUkFJ8UIUANJNrEFTRRdjLNi9WBgfDR4ej6gYLxZdBb6hDz5ulhl1PPi2VobrZJcbaAn1eOA3GQJ7bXz8GTf1AnLuXsh+H4gdSS7nBAyEq1Ggbgb5VSaruefOX7N1G8/DLX5F36jrIbSIEG3qnhhMbZ6hzh0OKB41/xMlE51cctUZdBjMMd/xfuHiziWGc4DiX1Pte3s5TwQyG5RsjhTGLFcz1Nvcjp8WzEB4jX5vDglHp8hhlHzrh9b293PJghk0mAfBJyZVteWKZxZ+rifLhoyPcBrrgfRiJcg6/Q9WLpsePWEdfFqeKOQbZCxzqsEa5pNQsEDDrjj7h9Tw9Dpln8/rfREREUOB4MxwxhZiACeV3mVbC3acn4j8A8L/Rz6v+zA+76n0JY4yFSFhEscSAJAEDsk9iq8ROxER/KH9P6PL+GHyS94fQoDTtxTMYRgKApGeWDXU4M5A6qN/4UdTGWDKM4GhfQOOJN0L9zRAN3r71JpX7NoPNyfiEZDyXvOjeyUeml6pNkXr4PZHFCJ0iAfc3Ve7u3BE5r/FQcnQf2ue5cc//ABUL9j6IFdv3/fVTrqQCycRzhu3U8zr/ACzhOtA9uLMMsd/ALsaRW0JsjtKVem5nnx+pAxPd4MPUy6X+XkjYBfTCSEu0VtGDxR5eKM+qyjJMeSLfXQJyQrV9DlSLBHFqS+5jOyD7eUEaaa6Ne+1HGo1YYPO/DoSG6wRoOdF6WEo5pmQIGvb2vo/UpHZSdHdue04uuhKcAIi9ezOXpzmxRA+IAVfue/3I9p7NmCc2o7DzI5+oiBj2a8A0vR4MmPKTIVodX06+SgKSvMwhJYnn9NhnHLORjQN19Lnjx5+lkdkdwPd9Su61YbI9x9h5WXp+ozDfIajTYPB9DAZmA9QbTwXWlZqS121EIefYgDUmueS1WtD5IZJzE/SpGv1J9iOdEsAPuRXza8fBkgCz46rUCCFIT+igWG6AB5vt3T+/7+9V07MakSJrn9/37IpJCjREB4tIrurIKNfR9an2pr70VXvDewAFrqn2oo/JaAdoIIPfs+z0g8g9z5AFaPsdL8A9zU5PVkas6g2GA26PWKVVAXQOboEAqqoCqqgL1PK9IaQZcF5nplwXmQM58stT5QwoFKoQJLnLkOhcz8QYDpiNGmYtNAoSXi6rrR05AIJvwY3BqtXZwjstXyj+Lw/hP0vZ0vUevHcBQumKyehq2XaqmyOlI0Ql0cwcDV5er66HSQ9SYJF7fKHm6v8AEzhy+jHFOZq7jxq4ZfxaEYCccc5w1sgfCR2KB6XTdVDqYDJjNg/SPe9AL8v/ANbjHk/aYYpjHPSfgT2I9r3j8YlX/D5f+S0Hs2tviT/HBjFzw5YjizFr/rk/9xl/5KB7BlT5/Vfi2Dpcnp5Cd1XQjdPJD8c3i44cpHsDyj8SGPqJZThyfzBGIuIuwgfQ4c8M0ROBuJ4IefrPxLF0Zj6pI3cULfHw/ig6fLKMcOQRn5hj267u9DwemX4vEnXp8vzggexjyxyREom4nUF1BfmcH4tHpchiMWQY56xiY8S717H3unzevjGTaY32lyiHRa2+X1/4qOjmIGEpGXFDT/a4S/HYQrfjyC9BcUD27W3xJfj0IkROPICeAY8qPx+BO0Ysm4cjbqint2m3wh+P45AkY8hEefLx96/+vBjERI48m08HaKP3oh7ZNNPjR/HccpbBiy7vDa+uJWLQDaCaeLruvHSAXCUjI0BEOA/FoygZCE90fix7fMPkgejDNGY3RNjxCY5IyJAOo5fmZddikZTwjPj/AI/T4+Y7PR0v4niwwrFiyyB1Mqvcfein0Nrb4k/x2EBcseQD2xaH4yP+6y/8hEPZZB7PkH8bhEXLFlA8TD/Nk/j+IDcYZNp4O3RFPaJeKP4phll9GJJldXRq/e8f/XUD/usv/IeXovxaGGBxDHkNE8R8fFA+j3JfHH41CtcWUf8AmN26P8Vx9XLbjjMf4jHREPSW0W+Z1H4tHDlOLZORHJjHRA9Ml5uq63F0sd+WW0PHm/GMWMCVTlEi90Y2HzOq/EsObLizShMwiT8UNNfBFPa6b8T6fqjWOYMv4ToXtEn5vqPxDp8/kGGZmNeNso+10wfjBwYhLqIyMT8M4i7Ht9qB9BabfFP49hFXDJrx5OVP49hjQMMgJ4GxA9m02+N/17gvbtyX4bED8fwGwI5CRyNnCB7Vrb4n/rwYCN22dDvtT/1/gFXHJrx5ED2bV8cfj2AmhHJY5Gx26X8Xw9VMQxidnuY6IHprbnlyjHEzN0Bej5h/G8X8OT/zWUQ9a3j6n8RwdLIQyy2mXGjxj8dwHgZD7oMH8W6XLqYSlWn9u0U9mMxIWOG7fnel/FsWAyxATMBrHymx7H3cWUZICYuiL1QNVt87qfxXD00/Tybt3sjbgfx/phod4P8AQUQ9i1t8b/r/AKa689+GwqP/AC4OmPG//kFFPZtbfH/6+6f/AB/8gtQ/HemlIRG+z/gQPXQi3ypfjvTxJB32P8BRD1gU2+KPx/pTwZf8gpP470xFHf8A8gop7LJfHh+PdKABEzoafAS7YPxfpurmMMdxMtKMTSB6YSiIAAA4CWEEBKqigtKCiwOUQoKqtA2qqwoFKoQOXqeyIr1J4WLCmgaZDTSBVCWAVVCBuqq0CqqgBmTTMkCFVUBVVQAXMuhcygeV1o8wLy8aeD6mTpTnOhqmB+F/4vucOTyZmXZ2bSPMIsfckDbp4Pqf9Vn+L7lH4ZX2vuUHP2b9DzKvVG19b/qz/F93+a/9WD+L7mQx7Nuh5XC13fV/6rH8X3KPwyPj9zWX2r9DyasLT64/C4/xFf8AquP8RSTJ7NzyqvjlAHd9f/qyP8RT/wBWxP2jbIZfZseRXZTrq+t/1bDxKf8Aq2H8RbiX2bHkUQir0fX/AOrYeJ+5P/VuP2sSZPZsePxqvsfZ/wCrcfiV/wCrcfclrkezbsPGr2aLXsfaH4dj51+lf+rsXgfpSRfYt2HiJAfa/wCrcXt+lI/DsXgfpZDY9i3YeKB4IAofW+3/ANX4vA/Sn9gxeB+luOw9i3YeGBWgT7X2/wBgxDt96f2HF4feUk9x7FuqPCqxSafd/YMXcL+wYf4U0x7FuqPCohSH3f2HF/Cn9ixfwhQ0X2LdUeCB2RVv0H7Fi/hX9jxfwjVQ3qPYfVHgUeUUH6H9jxfwhf2TF/CNFD2HsPqfPfvaQD/k/QfsmL+EJ/ZMX8A+hQ9x7D6nzxGnsQQ/RfsuP+EfQv7Nj52j6FDH/J31PnaTXZ+h/Z8f8IT+z4/4R9CgvsPqfO0u2vc/R+hDnaPoT6MP4R9ChvUex2nze29F2v0npR8B9CfSjd0LbD2H/J/94+aMSV2nl+l9OPgF9MeDIe4/5P8A7x81tvT9/wB/enb3Afpdq7U09h/yf/e+h81sPgfoT6cu4L9FDDHHHbEUB2a2hcS+wup836cjrR+hfSlXBp+kpdqhj/k6/wBR836M+AD9DQwz8D9H7l+ipQG8WPYXU+dGCYrQ0v7PMGtp+h+jpaZxe7L7C6nzw6fJ/Cf3/fsv7Lk/hP0P0O1Ai3ix7C6nz/7Ll42lR0uX+A2H6Glpiqx7C6s+e/ZMvO0p/Y8v8JffIrhdqdX1L7Fe08AdHl/hKf2LLXwl96kUFxY9ivaeEehy/wAKT0WUcin3KWMREUE6t7l9ivaeGOhzVqGh0Ga+PvfbpZaAnn3NgnsV7TxR+H5uKFe9A6DNrx9L7g4WmcX1L7Ne08T/AKuy+xf+rct9vpfbWmx2j2adp4n/AFbl50tP/VmT2PtUtM49o9mh43/VeS+QF/6sn4h9labx7S+zQ8b/AKrn4hI/C53yPofYVnHtHs06Hkf9Vy/iFqfwyX8Q+h9dSFx7R7NOh5H/AFZLvL7v80/9WH+L7n05GuWqXHtZfap0+55X/Vf+L7kj8Lr7X3PqCNCgpC49rHtU6Hlf9W/4vudsIMPL4PbKLzj4i1KDdaVr8KNQ2GA2HRoKqqAugc7dAgFVVAVVUQXpHDzPTHgNAy4LzPTLgvMgZz5ZaycssKKEoYCDywfiDoXM/EEDpDTITy0CXxvxb44+59kvN1HR485ud6CuXNqyjpl2VbSz5x9z8LH8r5lP/VeH2/S9HTYo4omMRQB7m2VrB2zc2tqwjcixXDOS9p281pfi2gi9HZ5Tycwz9VhicGQY5cT0+kewgvlQyZekw5uljjMzEy35BLTzd69z7HU/h2WUt/T5ZYzL4/A+2vFjB+FHBhyQ3bp5BLdKXckNB5OQf+ovEP8AFD6y93XTzZs+PpcUzjEomcpjnRM/w3NLoYYABvgQSL8CXu6roZZjHJilsywvbKrFHsUDxY4cvWZZdFPKTjw6mdeaUu1+56sX4jlj0ksu3fPHIwl2Bru2fwvPCJGHKIzmScsq5vwfQ6LoY9JhGIa/xE9yeUJPM/ZskOjhCdiJkJZdh12myap4xLp/2jDj6YzI32dxltGna32Zfh2TGb6XKcY/gI3R/wAnnn+F5BlxZjOWScZgzJ0Aj7A0hHUa/iOH+iX6vJ1HTdV+1Dp8WedSG83LgX28X1M3STl1mLOBcIiUZPR1f4di6sDeCJDiUTRCB4ufpp9Pm6eM8ssh9S/NyOH6SJt8KX4H6ObFlxGUqmN+860+9GIDAeV+L4z/ACsv2ccxKXsHi8H4l1mHPPDDFISIyAmn6HPIxgSImR/hD4Wb8LzynDKIwiBME44DgeN92gz/ABHPlHW4hHGSY3s/xX+Tp+HzyT67LLJHZLbHyvvbAeeXgx9HOHWZMxHklGIB9yB53Q4pTxdUI2SZTADhnyxPSYMO4eoJwuHcV7H2fw3pJ9P6gn9qZkPcXtPT45S9Qxju/ioX9KB5OH/1ZS/8WH2uz50OknHrZZyPIYCN+0PpbWA4Jzy5BkxxIjkifKa7di+RjOfoc5lmBzZMkbBh7O1PtdX0cstTxSMMg4kNdPAh5ul/DcsMpz9Rk3zraKFABoPM/DpHJi6mUhtJMtD20dunzZen/D4ZMI3EDUHwenp+gywHURkPjJ2n3h6/w3ppYenhjyDzAUQgeB1vUdZn6cTyxiMUjE3E6vb1Z6jJnx9PjmccTHduD3finRyzYPTxAWCDXub6jpDkjGcNMkNY/l80DwssurzxzA5QI4gYyAj8Tr1A/wDUbi/0Pr5emOXBPbDbPJHUe32vHm6DLPooYgPPHbY9yLJj+JkxlGWSeSGLbQ9L+L2t/hPojecM5ymfiGTQvR1+PqwIfsoBr4gXL8OGXPnll6ggZIjZsHI97Ac2Pr+vzmcIwhcNJWSP1ez8Bv8AZted0n1DiGpAFnu8f4T00+nw7Mgo7pIh2ZjKMCYayA0fP6mPUdRjiemyCG4eaw+oQ+Zn6HqIyJ6XIIA8xkLHyQPGl1E8HTT6YY5yI3RlMfD73XqB/wCB9P8A1QfQh+GTxdNkx7t+SdkyPiXLN0WafTYo1c4GJkCfBpTP8TBjOBwx3Zp+Wuxj4Fz6v18fRTh1AhE6bRA/o+1n6OHUQEZ3pwRyHyOq/wDLfBxylGU8mT7O8ohXVwIHT5j8GMjcfDRx6rq8WfqsEcctxiTdPsEHHhAMDI0BtAfKH4Zmjnx5RCEIA6xx9vee6Bj1XUZo9cNmIylGJERfxDxdfwqc5588sg2SNXHwfe9Mc1q+f03SZMfUZpyHlnRiUDzumxSyfh+WELJJloPejqMsMg6aEZAyEhYHIfV/Culn0+IwyCjukXq/ZcW/1BCO/wDirVA8npP+Oz+6Lp+CfBk/8ZJ1wdLkh1eXIR5ZiO0tfhXTZOnjOOQUTORHuQPQOj4vUxydT1ZxHLOEREGIgeX25C35vN0cImXr4cuTJIkicPurwYDr/C/SxyyYscpSkJXIzY/CCRjymIs756OX4bgzdLkJGExxTIGsgZD2n2Pf+F9NPBGccgomZI9zQcf4ScnUdRk6qcdoIEPmH3qeKWOXTz3wBMJHzRHY+I/V7gwHj/ikNmXDmlpCEjuPhbydZ1WLP1fTxxSEqkbp9zqpCMDcTO9NoF2+GPw3NHqMWUY4QgJaxx9ve0G+P/1Zy/8AFhj8Myx6UZo5ZbCMhkbNaPVDpckeuOUjySx0D7Q9PU/huDq6OaAkR34KB5WHqOt68yydPOMMYO2NxslP4dDLHr8ozyEp7BZAp7odL+x5R6Mf5U9JRH2SO/uPdnD02SPXzykeSUI1L3MB6daPi5ZdV1WXIIZRhxYzt0Fy977lPndZ+EYerlvkZRJ+Laa3e9A8DoJ9T62WPSkTuWuSf7931o/iMv2aeYwueM7ZxHGnf3OfSdDm6M9QMMasg4tx0e78P6H9mw7MnmlK5T9pKKcf4DikMUskxXqT3AexP4FoM3/jS9eAT6WYwEE4z/bl4V9mX6Fy/CemyYPVGQUTkJHtCIeoC0+Z1eLrJZ8csEgMQreNPm+iAbu9K4YUtaUK0gBZ5FKYg8prW1YBVVQFVVACC0hFOTqeB70Ra6nge9mPDCmgDSAlpBShLAKEoQOhCVaAKqoAZk2xJAhVVAVVUAFgtlgoAxd3cOGHkvQwDS0qWgaWlVAVVUBVVRBVx6jP6EDPaZV2iLLjj/EMUsZyk7RH4t+hHvCKdlIY33G46+DW5ECr5x/Et0jHDinkETRlGhG/ZZ1dsHXRyy2EShP+CYo/Lx+SKddJQCtogVW0WgFUWtooVZtNogVW0WEClpncF3NBSvN+0H1vS2yrbu3/AGfd73fcgUqLRCMYCo6BApUE1q8J/F+kH+9h9KB3q83T9dg6kkYpiZHNPRaAVRa2gNDlLNuWPqseScscTcoUJCjpaButs7mRCIkZj4jVn3IGiotbQCrO5yz9Vj6cA5DW6QiPeUDdUW8H/WmP9qPRmxOtD2KB6CvH1nWjpMYySBI3Rjp7XqEkClQClAVVzzZoYYmeQiMRySgaK8H4d+IDroznEVGMtsfaPFj8S/FcfQw7SyH4Yfn4BA9JXkzZcwxb8UBOelRvb975nU/ifW9NESnggNx2xHqWSfkge9a2+X1nW58JxY8cIyy5L8pPFBvpc3WSmR1GOEI1zGRJtA9C1t86fXGGXKJf2sMBKR77j2eM9d1scP7XKEPTrcceu/b434oHukskPm9T18gMUOnAlkzfBu4A8Szi6vqMWePT9Ttl6gJhOArUdiED1LTb5A6nqesyZI9NKOPHjO3dKO7dL8mY/isodNky5Y/zcR2SiODLt8iinspt8PJm67psX7TllGcR5p49oFR9kvY+lk6qGPEc8j5ANyB1Aot8n8K6zN1BzHPoRIbY/wAIIazdZKHUT1/lYcW+Y8ZHhEPUsJt8CJ62fT/tfq1Ot4xbRsrw8fm6dR1+TPDp4dOdkuo13fwx7oHtaLb4+/L0fU48ZySyYs1x/mcxk5YTl/EcmSZyTx44S2Qjj0Onc+KKe7YK2+N0ssvV48vTzyGOXHLackNCR2Lx9b0uXFLHhxdRllmyHSzoI9yUQ+ltNvh9bkkcmPo/UMIbd+XJdHaPb7XX8OhtyE4Mvq9ORwZ7pRl7PYinsKoVhCSREWdAEpIvQqiihmMSCSTdnT2expAk0fk4faLuQ4fbLAWGwyGw0CqUIAkLdAKYDoEAqqoCqpRAPRHgPO9EOA0BlwXmemXBeZAzycspycoYUUKrAQWPtBsudecFFOoNBkNNIJAPKkXolHKINIAUG0oABSlWgFLSUIDSqti67oAINacrEGhu5700yJgkgGyOUA0tKDYteUBpKpQBSqm0ALSpQAqUIDSj2rwEoApQErSAFpKoApUqgClpKoApaSqBNOZ6fGZ+rtG+q3ex2QgCk0qoCikqgClpKoApaSqBNJpKoApFNKgClSqBNJpKEBRTSEAbVppCA0qVQAimlQBSpQgNLSpQIlMQrceTQ97aqgClSqAKRSSgCmFCtqUIhQVVaAoSg+xgFUqgBVVFAgpQUDm6k6D3sxa6jt72YsKaBpkNNIFVQQgFCUMB0KqtAFVUBZlw0xJAhVVAVVUBLmWywUAYeS9Dz4uS9AYBSiktAqqoBQlCAuHU5MuON4Yb5eF07vN12KeXDOGI7ZkaEIh5+fr+qwR35MAA0H9zx+Tj1XUdTAxnPBDUiH927vsfK5dX0Jx9JHJOeTeNhlGUyRd+HD3fig/lw/8AGQ+t0AHqOtgP7OMAeOav0c8XX9XmlKEMeImNX/NJGvuejrulx5JxyZ47scN1x5Hvpw/Cuox5pZBixDHGJ5iK3MBj0UuqiJ44QxnZOQ805cnXwKep6jqDGUZ+hugDMAZDuFeHlenoY7pdRHj+Yfvi8XU9DkxYZYsWGFCJ3ZpkEn3fatoNZ9d1uLDHMY4jGW3ub8zpHqutlllhrEJQAJ1l3d8XTR6ro8cJcGMCPeE9N02b18ufNUd4EQInsO7Ac0+q62JnH+Vuxx3kebhk9V137N+03irbvqpWnL0mbpceSOGAmZg7s08mte6vqbq/wsf+K/RoJOfrIwjkyZcMIyA+KPi5ZevzQhKX7RgJAuojU/8AOfUwYo5MGMSAI2x517Pl9V+HTxYJ48cccY1KRyczPfitPfbAVlz9bj6f9p9TH8Ilt9M9/wDU+p0kc4jeecZk0Rtjtp8/P5vwy/8AynEvr4h5R7h9SB5fXZ8mHJR6mOMS+GHpbzTy9L1HUdROcD1UQYyMYgY4XL28vb+IjLCcf2b+9k8l7bAjyTfanh6Xp5wwdVjxjfk3mN9zoEDbqv2vAcYGcn1JiB/lgV96JjqodTDp/wBolUoynu2Rvyu/X/hc+qlikJkbDHeL+8e1xh0g6br8QEpS3QyazNtANnUnqf2c9ROtm+xGHj7nLLlMJyx/tWUyiDdYxtB9pAe7b/6kR7cP/knTqfw8zEqyTjCVylCOlmvHn5IHn/h2/rMcZftWTeR5oitC+rDpcg6j1jkJht2+n2vxeDosOWfS9LsFCJEp+wAl9CPWR/af2Xad23du+ygb5PhPuL81+G9d0mHAIZY3MGV1i3d/Gn6fILBfnPwv8Vw9NgGLIZ7hKWkYSPJQPS6XqsGWM5dPExMRruhs/wBryYOr67qsA6iHpxFEiJBO6vno9eH8QxdZuhjE7ESfNAxY/CoEdBASBB2y0I96Bz5vxXMcGDLhiN2aW3bJ0y9T1fTiGGRhPPlltgYjygdyfF5MOOf7N0XlNxya6e0vd+JYckMmLqscTP0id0Y87T4IGc+p6nopw/aJxy4py2GUYbTEn6wxCcsWfrZRPmiIke+mepmfxOWPFghLYJieSc47QAO3vdTgyHJ1h2mpxG3Tk7eyBhLqOtj0seulkGgEvSEdCPaebdOozdX0sYdRPIJCUoiePb5QJeB508XTJ08z+GDGInf6cRt723+K9Pky9NGOOJMhLGaHspAx6vrZT6mXTDNHBDGLlM7dxJ7Dcjouul60+mOWOYCBnDJGr9xrRPVdLLD1c+oOH1sWQa1ESlEj2F16THlyZJT9GOHFt2xBgBkJ+XA9iBzdJDqur6UZ555RnR2iIFafxeLj1U8nWdL0+eUzEmcRIR4u/i976n4Z0+TF0cMWQVMCWnzLw/sPUDoMWMQvLjmJ7LHaX0IHt44GEBEyMiNN0uS+Dn6T9r6vqYA1MRxyxy8JB9/DKeSAnOOyR5gTdfMPFh6TJHrMuaQ/lzjERN9wgeV1nW/tXRecVlhkxxyR9oP6vb1Ep9X1Z6XdKGKEBOew0ZE9r8GPxb8HyZ5jL09CRr1I3QlXB+T0dT0mfH1H7X0wEiY7J45GrHsPigY4d3RdZHpxOU8WWJIEzuMSPA+D68qmDjuiR25fO6fpM+XqB1XUgR2xMYY4m+e5L14R1H8z1BG7PpbfDtbAadL0/wCz4o4hIy2/alyjqOlxdRtGWIkIncAfFrpvW9MevXqfa28OxCB5H4Rz1A/8rSZ/GOmxw6fNmjEepIDdLu9fQ9HLp5ZjIgjJkMxXg3+IdLLqsE8MSAZCgS0F4vgj/TH6ny8A/bOunlPwYPJAf4jyX14YzGAieQAPoeb8P6I9JCUZESlKUpkj2sBy9b+Hz6nPDIMmyMIkeX4tfBywSydH1UelnOWTFkiZRM/iiY+17Os6CeTLHqME9mWI2+YXEj2hxj+G5vPmy5BPPKBxwIjUYg+AaDz8wOT8P6nP/wB7KUv9INB9TKY/sZP2fS/8i74ejjDBHpyLiI7D7fF4f+psxh+zyzk9P/Dt81fw34IHF0QIy9Fu74ZB7PxDXqelA59Qn5U9nVfh0c8YCJMJY9cco/Zpjp/w6Uco6jPkOXJEbYaCIjfgPFA5fwTTHlieY5slvNHBHqj1sDLbEzjUjwJAPpZfwwnJLLgyyxGfxiIBB9vsLpi/DMOPAenoyjK9xlzInugeR10uun0mSGcY4RjHzTBsz8KHa2c2UieHDlhOWLHCEzsgTunWnyD6Mfwa9scuWeTFCtuOXGnF+L6u1A+e/C+q39VnGyY9SQNmPw6fa8F2Sz9J1eYanKZ7f6YaB9ePQxgcsoykDlNyPhpWjXTdJHp8UcI1ERts90Dkw5Y/sMcl+X0ufk+V0sThPQSyaAxlH5y4fT/6iw3t3ZBiJv0t/k+j/N7Oo6LF1OP0sg8ulVpVcV4IHnfifm6jpcY+L1N/yAYx9Pl9bIehzR2mX8yEobtsvZx+T39L+G4sEjljulkI27sktxr2M9R+EYOomckhISPxbZGO730wHF+C4tss8xIyBnt3n7RHP3t/hw/aepz9VLsfRh7o8vq4enhggMeMCMY8AI6fpcfTxMcQ2gky+ZQPF63BCX4li9YXCUCBfBkOzccUMX4lGOEAXCRyiPHsv2vrdR0mLqYbM0RIM9N0OHpAfSiI3yeSfmUDpCVU+xgCqFtFFCqgAvP9svQXmJ85YDQOgcw6BoFVVAXQOboEAqqoClUIgvRD4Q87vj+FoKlwXmemXBeZAyycstZOWWFFSlBYCCx9oOhcz8QRTpDTEWq1u2kKVCUAUlCg9mkCqrdcoCgpQgKaHPdC+5AKpQgBLMZiV7TdGtGkBVVKALN+xKqgKUMiQkLGoQLQgGwlAUs97SgFUKgFUKgFUJQAUoU+xAKqqAqqoAVVQFVVAVVUBVUIClCUAJQqAUKUHUaIBSzEUK5aQAlCUBQqoBVCUBVBKoBQlCArEk8ikAVokMAUoVoCqqgBUqwElQGlaABUqgBQVSwCha1tUBVVRRQVQUDm6ngMxa6jszFhTQNICWkCqqgKEoQOhVVAUJQgAsyaZkgQqVQFCqgJcy6FzKAMXJegPNi5L0MKUrKbaQKoSgDlpCoCqqgZZ+nh1EDjmLiUZenhljtmLAIPzDspF6FpAU5+hD1PVrzVt97qBQpKBhDDDHKUoijM3L3ukoCQo6gtFKBGPFHHEQjpECg3SVQAYg6FzjghGHpgDZVbe1OqoEwgIARiKA0AUxB0LSoGYww2+nQ21W2tKbEa0DSoApAhEEkDU8tJQBTJgDrWo4bVAyxxJAMwBOtadKSqBIiAmkqgCl18SlUAUimlQJAr5rTSoE0tJVAFLSRfdKBNLTSEBpGnDSEBpaUi+UoApaSqAKVKoEGYBESdTwGiE0qAFShAWYwESSOSbLaEBVUoAQ0hAaQlUAUqVQAqVQFBSghAC1SgGzdV2TSAAqNoBMvFLAJVjLvr+XV2Pi8O7bQCQutLpNqtMKAlKqgBUoQJE/MY0dBd9kraLYBLz/aLueHAfEUUJMgRtFuwYDYaQKqqAugcw6BAIVVRBShUBd8fwuDvi4aCpcF5nplwXmQMsnLLWTllhQoShAksH4g2WD8QYDpisiQLAv2IFtNArShKAFpKtIKKF33W1GuqAVVB0QBG61r5NISgIVbVAAiI8Cr1UhKAKQHW/YlVQFUIMxGge+gQKRSUID3W1QAQgUqqgKqqAqqoCqqgKqyAT8XjogUqqgKqqAqqoCqEoCqqgBVVAVVUBVVQFUH2JQFVVAVVUBVVQFVVAUoVAVVUBVVYUKqrSDdqqoBVVQFUKgFUKgJVVtgFVtCKFiQJIIJAF2PFpDANqmmSgc/UdkRXP2WKKaBIQEhpAqqoCqqwG6qrQKFVABZlw0zJAlCqgKqqAlzLZYKAMXJegB58PJegMAaXalWgFLSUoE0qeVQAlUoAVVRBQlUAJBRSopSopdUQKlBNarGQkLHBQCEs7he3vy00CoVSa1QCqFQCqqgFUJQFCVQAqqgKqqAqqoCqqgKqqAqqoCqqgKqg8IBVGqhAKqikAqqoCqqgKqqAqqoCqqgC+ypQEBWr1VUBSjuqAqqoCqqgBVtdWAWQCNSWlpoJkCR5TRaUKwDSEqgBBFpRuF0ijVIaZu2AmThE2XYinCPxIpsGgyGg0gVVB0QCHQOQdQgFVVEFUoRRdsXDi7YuGkLlwXneiXBeZAzycsN5OWGFCqFQJLkT5g6lzPIYU6QlAKtIUEspQFIQoaQKqqA+9VtGqArdJrW1KBGwE3XmHdMiIAnwTwvdAQbFpRSUAC+6VQgK97ULaApQqApVCAVQtoBVCoBQqoBVUIBVCoBQRaVQFVVAAiBqO6VVAUJQgKoIvulAVVUBVVQFVVAVVUBUqqAqTSqgKoVAUoVAbShKAqqoClAVAVNkacpVgFVVAVVWgVVWAC2laRQILSoAATSqgCmanv7bK+d/k2qAEFpkoHN1HZEU9R2RFhTQJQEtIFVVAUJQgdCqqAFShAWJNMy4QIVaVAVVUAMFtgoAxcl6AHnxcl6QwCEqrQKqqAqVXlAVSqAKUqqAqqoCi0uPUYBnhsJlEeMJbT9KIa2kPh4Om3Zs2EzyGEdvM9dfa9kutMZnDhxnKYVu8wiB7LPJaU9BLzdL1UephvjY1og8gjs7Y4CAod9UQtKEoCq3aoClCUBVVQFKFQFVW0BVVQFVQgFUKgFUKgFUKgFUKgFVVAVVUBVVQFUKgFUKgFBNKqAqqoCqqgKqqAqi1QCtotUB3C6vVLNa2lAKoQBRKAYihV370oVAbXlaVAB9iVpaQFVpaYBVVpAaVV7opJZOjZZpgILiPiLuXAfEimobDAaaQKCBIUeEpQJ44dQ5F1CAVVUQVShAXbFwXF1xd2g0lwXmemXBeZAzycsNZOWWFFVVgJLnLkOhc5chFOgNMxavs0gqRfekpQAqUBEG+yVS0AQlCA2lASgDaCb7hPCqgKqhAVVjHKUhchtPhdoFqqEAqhUBtKCqAULdKDYtAKBIGx4KqAQqAqAVQlAVVUBShUAoVUBVVQFVVAVQlAUKqAqqoCqqgKqqAqqoClCoCtKqAqqoCqqworaqgKpVAUoVAKEskWgEJUJRBQlUAKyYmxRoDkeKiYJIB1HKKUlCUBVVRAKlBRRQUslA5+o4DMU9RwERYU0DTIS0gVVUBVKEDdVVAUKqAGZNMyQJQqoCqqgBgrKdcIKA4uS9AefFyXoDAUFVWgVVUBVVQFUoQFVVAUqqILJSqB5vTY5Dqs8iDR2UfHRxjKXR5cvqQlKOSW+EoR3duC+wtNB5PTyn0eGWXLA3PJu2jmIlpr+r6wZljjMVIAi7bQCqFQCqFQCqqgKqhAKotUAqhUAqb7IVAFG7vTwaQqAVQqAUKqAptCoCqoQKRaFtApFotFoFWt0zaoFKhbQCqFQKQqoCqqgKqyZVWhKBSoVAbShUAqhUBIsUUoVAKOEoQGkqqAqdVtUAXVAlEhKxR0vzfv72lQEqFVAVVUBVUcMAsltkopJecfEXeRecfEWFNg0GA2GkCqqgCnUOfd0CAVVUBVVRBdcXdydcXdoNJcF5nplwXmQMsnLLWTllhRVVYCS5T5DqXKfZFOiLYYiNHQBpBCVVEElAQIgcd9UtAlKFQChUWgFKKVgCqoaAoVSaQAbsVx3VeR4LX0oCtqFpAVVWAVQqKFA5pQlAVtCoBVVQFVVAUoVpAqhUAqhUAqhbQChUoChKoAVVpAUBKDfZAKqqAqqoCqqgK2qoCqqwCqUIClVaBVbVAbSzraWFCqqgKraoClCogpRaJAkUDR8WgKAEhWFCqFJPZAUoVEFVVFAdeEa92mSgc3UWiLXUcfNmLCmgSgJaQKqqAqqoG6qqAFVUAMSbLnJAlKFQCglKJCxXCBmNTfhwpbAAFBmSAMPJekPNi+IvSGAVCq0BVVQFVKhECqoQEJVCAqqoCi0oKAbV4M3UTj1WLED5JCZkPcif4pgxkgk0DRltO36Wg9BbeaPVQlkOIHzACXyLxdV15kYDCSP5oxy059iB61rbw/8AWOIepVkYh5pAae4HuXTJ1kMcYzldTMQP9XCB1Wtvmz/FYRlOMYTmcZqe2PHt/fVYfikJGPlnsmajkMfKSgenavnZPxHbKUMeOeTZ8ZhVD6SjJ+KQhDHOMZS9TSMYjW/BA9G1txxZTkgJyiYE8xlyHzMOA/iAObNOWwkiEIy2gAe7ugeza2+J1OPL03TZRKZlAAHGb849hLvj/EJCWOOTHKEclCMiQda7jsgepa2+ZPr81y9LCZQhpKRltv3Il+JkjEccDM5QdouqrxQPUtG4Pmw/ESBkGeGyWMbiBLcCD4HR4ut6nPOOP1MYjGU4EETsj3hA+gtbfKHXZp55YceMGMCN0zKtD+rGXr+oxxOb04xxg8TmRMjxrj3IHrbxdd2rfBz9ZjwdUM0zQOLQdzrw9Z6nqRiEvTHqSOkb0iPGRQPStbfIwdfkOU4MhxyO0yEsZ8OxcR+IdUcA6oxgIDmOu4i+b4+SB7m4M5M0MQ3TIiPEvlR9U9fYMdvpg1rdX9afxuIn0+08GUR96B6k8sYRMpEADUksR6jHKQiJAkjcB7PF8aeWUMGbpMpuUIHbI/ah/k3hzyjLHEAf2N11rpXfwQPb3IMqfA/bOsjgx9SZQ8xiPT26ebTl6hkz4s/oZZiYnCUhUdtEIHpYs0csROBuJ4Lpb870f7VDpBmjkAERIxx7BRAPc8279T1hJjI5hgxyiJDaN0yT7PBA9bN1EMI3TNAkD5lEOphOcsYPmhW75vgy6mfUdITKW4xyxjuIqxY5C5utPT9Vnxw0nMwAmR5Y+0oH0dp3PjdZkOAY8c85jHXdLnJL3aVTz4uryen1EYzmRCIlCWQVLVA+hBS8P4fiyRjvy5JTMxE68D3PegKg2qgUgKqqAqqoCqqgKqqAqlUCbF13SqUBQlUBVVQEoiABQ4SRaoCjhVYAqi6CRq0CqraAqqsAoKga34qimcnnHxF6JvOBUiwpsGgyGw0gUJQgPd0Dn3dQgKqqIKqqKLpi5c3TFyiGsuC8z0y4LzNBlk5ZaycssKFCqwElyny6lylyEU6IG3QMQDdNIFUKgJQIgWR3TyoaQIVUIBQqoCDY10UGzShatAKrSUCTEFKV4QBS00yABwgClppaQJQQ1SaQIpaapaYUgyEas1egSsge1X7WqQJVqlpAkJWkoARTS0iApB0aWkCUpTTQSqSE0gTSKapWAFKlBCAqqWgCEoQALN2EpVACk0lUCYmxfDSqgKqqAqqoDSEqgBKqwCq0loAqVQAlVQAlVQFVVgCjW/YqoDSpQRaAqqgUgKqtVwigJNptVQFVQgNoTSlA5uo4HvYi11Hb3oiwpYLTkBtPsLqEAqqtIK2qoG6qqAFVUAFzk2WZIEKlUBVVQA5ydHOSAMXxF6A8+L4i9AYClQlAKKVLQKqEoAVKogLVAJJII0SgKqgWgF5usznp8Usoju2i6D0qQ0HiftGPqurxSwSExCMzLb2saW8PUZxkwTPrUSJfyMcdb9ul+9+ljjjHSIA8doA+pOwA3QtA8TqpnBjw9ZDXZERlXeMh+bl1XSSHS4cZJEpZImUhzcuX1uo6OXUSiDOsQIJht+Ij2+HsesRaDwccJ4sOXoCLlGMpY5V8UT+rOXqoZ8WGGPcZCWLcNp8teL9DtWkDyOngd3U6cy/8i5HHI9J0+hsSxW+5S0geBkkcmTJHOcoN+THiBAI948faV6TDMR6W4kGM57ge3PL79LSBJGlPk4sk/wAP3Yp45yhuJhPGN2h1ovsoYDxcw6jqcGaUokCQrHj+17z73fqsE5ejtiTtnEn2aPp0jRA+fydNPJKYz4suXISdmtY67ez3u3S9LmiOm3QI2CYn7NH2qTSB5GfoZ5suUVUZ44xjL2gueePVZ4wh6RiYygZmxWh7PtWuiB5/T9PkhlzSIoSMTE/J8s/h2WeOUJYBLMbvNkmCPl3fpDooDQeMfw05skDlj5Bi2H2SZydF1MsUMc4jIMctY7q9SPZ9ylQPEwdDlGeOX0oYobZR2xOuvi6DoMn7D+zab9pHOnL66oHmnps0OphmgAY7Nk7lRHtHi6fiHSz6jFsx1u3Rlr7C91JYDy/xL8OPWY/IduQfDL38j3Ij+HzEoSJj5cRxHnnT2cPqqgeV/wBXTPS4+nsboGFnt5Tbtk6MzzxzWKjGca/qe9aQPEx/hnUxxfsxyx9M3Z2+YA9hrTtL8Py48vq9NKMbjGB3xutvg+qY2tNB44/CZ+nPHLJuMpxybiPCnY/hsZzzHId0cu3SuKfTpFKQeQPwzNDZOGUepCJhuMLBj9PLQ/CpfzTLIZHNHbIkcH2fk+tSsBlhx7IiPNAB0SqAqqoCqoBtAUqqAoSqArSqgKEqgKqqAoEhLg32SiMBG9oAvVAKqqAqqoCjhKoCqqgPdVVAVVWAUFKEUmTzfbL0Sef7ZYU1DYYDQaQKqqA26BhsIBVVRBVVQF0xcubpj5aDWXBeZ6ZcF5kDPJyw1k5ZYUVVWAkuU+Q6lynyEU6ISHZ0c4OjSCoRd6JA0QCVQTShpBShKAqhe6AVRaUAoW1QCFVFoBZlMRsnQAWT2aVAiOSMoicTcTqCG2TE1QNNIBQVOoVAaVVtAaVVQFVVAVVUAbRd90qqAqqoClDnHLGU5QB1jV6eKBqhVQFVVAUJVACqqAoK2qALSqoCqVQAqoQCqFYUKqrSClCUBVUIBVVQFVRV6oBVVQFVVAUJRTCilVRBVVQFeFVFB3SqoCqqgKqikBtBSpQOXqOyIp6jsiJYUsxsLAk86JDTSCqqgKEqgbqqoChKEAEMSDZZlwgZpVUBVVQJLBdHOSBOP4npDzY/iekMKFUqiDSVVoCqoQCrEpSEgALB5Pg2iCtKqACD2SqoCgpefqhcD5jD/FHn77aDWwOF3Pz/AFuTJg3wjPOZxjuEvLtrx4deqicOMH1spySrZES+IoHtbk7nxYYZHLlhLLlqAiQBPXV45mfqYon1hvJ8nrCUjGvZwgfTWu5+f66GLD05yDJkEr2jdM8+C4hgz9RHHiy5JR2SlKsk+UD6DckEl8PB0kJ5M0ZSykQkAB6s/C/FH4d02LqTPLtyCIkBETySuxz3QPd1PGrlmnOEbhEyN8XX1uPW9P62OtomQbAMjH7w/PdRARhEnEMYlMRB9aZJ1o6IH1Qku58XqOhxiezFijwZSlkyTAH3uUehww6cTEMeSZPxGUtnPjfZA94zcvVkJ1Q2V8W7W/c/P9Niwzy5ScWOWOAjZF1/pBGr1joum/aoxGOO04zKq05CKex60P4h9IaGQS+Eg+4vz2bpDPHknDDijAbgL3btO/g+z0eGGLFEY4iIIBNe5EOOeeefLOIzDFGB2gAQJPtuVtftc8AqeSGQH4Z/DR/xAdvaHOPS4T1Ob+XE+WBoxHOrwZMcsmD1fQw447he34h5q/hUA96HWYxEb8kBLvUxVr+39OP97j/82R/N83rMYxzAxwwwgNZTnEfcGOghiyYc0xGB80qMY6cdmg9Q/iXTDnLj/wCXH80f9ZdN/wB7D/lPBjifQwRxRgJTAG6UAa0tykN055/Js6cEX6Y88q1tgPSP4r0o/wB9D/lI/wCt+jH++h/ynj6qWTSUAYxMbEIY4y3E+J7J/DMk4YsMZkHeDQAoitfm0HWPxfpP+9j8i98ZCQBHBfL6SOaXU5J5xEbRtgI9wdbfVDAKqqAVQlAVVUBRaVQHlVVAVVUBVWd2tUfegUqqgKqqAqqoCNdVVKAoVbQFUoQFVJpUAVqlVQFVpUBVUMAxkJcJVWgVVWAVVUBQVQUUkuH23clwPxMKaBoMhtpAoTSoCGwwGwgFVVEFVVAW8fxMN4/iDQbS4LzvRLgvOgY5OWdGsnLLCiqoYCS5z5DoXKfI96KdUQ2yGmkEClVQEBKqlpBVClAVCqgFCppAQlCklAKqhAKoW9aQGtbXhVQE6qqoBVC2gFF61SqgKUKgFUJQAlCoBVCUBVCoBVUUgFUKgFUKgKK1tKoCqoQAtKlhQqhLSAKGkICq0hFCqEoCqqiCllKAVVCAWdwvbevNJSgKqqAqqoDSqlACqrCiqKWMdugv5m0AqSgapQFVVAVVUBQeNOVBvVKAEFKCgcvUdlijOdQmLCmgaZCWkCqCi/FApVVA3VVRBQlCKLE22JDRAhVVAVVUAMFtiSBOP4noDz4/iegMKUlCWkFKFtAKFVEFKEoCqqgKqrQLMhYopVA8vL+GAxntlKRlCUICR0jb2Hp4zgIzHAHH5u1raBwdL0A6XJklD4JiPck2Lu7cOowwxyxZ8OO4xkZTMAOK5L6pLzT6HBklvlHU80SAfeAaQBHocRxHFIboSJkd3iTay6UnPDKKqMZRI99PXVcLYaDmw9MceTJMnSZifoFOvpmMt0ODyP197oT4cpYBp4uq6DHmB2gRma81a6F7UEWbQOLrejl1QEBLbG/MR8VeA97fSdGOmx+kNYC9vu9r1raBxnoomcyfhnERMfc3+yj1Y5QfhiYV73pVA5snSiYlEGhMEH83bFj2QEeaADVpQMI9MI5ZZb1kIivcvUdLHPA4zoD4PQqBjk6eGUVkiJD/ABBzx9HDHvEeJm68NKeq0EoHPDpIRxDCdYxFfvTmPw3p6A2aDWrNX7fH5vXabQJMARTlg6WGGMYxHwiok8u9raBE8Ql7COCOXQItEpCOpND2oFKzvHLIyxNURrxrygaKi1tAKXOGWM9YkEcaNWgFLlkyxxxMpmgOSWY9RCUtgkN1bq9iBslm1tApUApQFVVAUAUKSqAqqoBVC3rSAqDeoShAKEqgKqqAoVUBShUAs637ErSAqqoETBkNCRqOG1VgFVVAeFVUBQlCKRJwPxu5cJfEwpoGww0GkKVVQF0DnboEBVVQFVVEFqHxBlqHIQN5cF53olwXnaDLJyw3k5YYUUJVAgucuQ6FzPIYU6oimmQlpAhKFsogqgG0tA8KVU6ICNVUMyBOgNIFKxjnuFtoCCSlAo8JQG1VUBQb7JVACUKgFDEMm8kURRrUVfuaJQDdpQqAraoLCjaWCtoF2ts2toFJtm0bihBas2toFKxa7kILtFufqgkxBsjkJ3IQXabYtbQgq0sbltCC0ItFoFIRaLQgpWbTaBSWbRaBasbk20QGUhEWeAq2tsANovd34StpaBQlBRBVVYUVVLSASqoCqqgKqqApQlACKaQwopQqIFUKgKlVRRVFJQFVVAClaQUDl6jkLFeo7LFhTQNMhppBQlUAKlUDdVVAUJQgLEmmZIEJQlACqqAucnRzkgRj+J6Q8+P4noDClJQrSBVVRBShUBShm0ClZ3NBAKqhoC5ZZ7ImXgLdHLMSIkxG4gaDxQPJxZOt6jH+0Y8kNRuGIRv5E+L15uqnHp/UrbkIAET2kXyZf9XZI+ru9DL3jCRjIS/p76vVgOTqB08c3x65Ze6Pw379EDaebP1OWWHBMYxjoTybRImR7AHRYZc/S5YY88xkhkO2M9u0iXgQNHOOaP4fmyev5YZDvjPtdag+CJZ4/iGbHHB5oY5b5z+zpwB4oHo9T1A6fFLKdREXTwxwdZlgMhzmEyLEIxGwew9y9fX9OeowTxx5I097xw/F8UYAZBKOUCjj2G79nigDN1uXCMEs/kJkY5IjW9Pm9mHr8eXdzEwFyExtIHjr2eKRzZJdNPNERkckjQ7CjV+1PU+pDNknCO6Xo6Crs7mg6Ifi2KRGkxGRqMzHyn5tZPxKEZyxRjOc4/EIRt8bLM5oQMcmTLISgZR27YQ18P8Aa+r0sZDqM5rkw1+SgGh/EcXpRyiyJ6RiB5ifCnmx9cZ9UQROIjjJlCQru82HHPFDHmMSRjyZTIAa0SdadIZD1HVGcIS2elKO6USL1UA6sf4viyQOQRmIAXuMdD7B7Wsf4juyRx5Mc8Zn8JmBR+gl5oxzQ6CAxAidRuh5gO9DxecYjPPhnijnkBLzTzbvDwP10oBv03XjDCe/dORySjCPJPsD25etnGQx48Usk63EAgAfMvlw6DLjlk6rHEjNHJIgH7UfD5uucTy5bywynEYx2Rxmte+7UfkoB1y/FIxxHKYSBEtkofaBah10zkGLLjMDIEwuQN17uC+bi6PKME4DGYn1YyEefLo+j1GGcuowzAsRM7PhogT+FZ8uWM/VB0nKiZX8vk3+J5zjwmMPjmdkfeWfw+E8RyYpwI88pCXYgsdV0cus6iIyA+lAbgbq5H3a6MAPw6UsBn0kyScesSe8SiH4lmyROSGG4RMgfMLNeDmfw09Nkx5sAO69uQbjLyn3+Dn0mXqPRljx4jK5ZBGdihr3aDrl+IylOEMEN++O8EyoD3tQ6+ZExLGfVhXkibu+KLxGGTpM+KGOPqbcRBF1eo4tvJ0fUZ45clbJz2gQ3fZj2Mh3KgG8euzQywx5oQAnoNk7IPtFB0/FtekyX/C8WPoMnqY54+nhhjCVy80TI/R+b6XX9PLP088cPikKFoHB0uWWGP7JlNnZeOX8Ua494cuiyiMOljtBJ36nkc8Pf1fQnqMIiDtyRA2SHYuHT/h+WEenEqvHu36+IQMv+sOqOE9SBAQiZDabuVH7noHU9Rjy445dphl4EbuOl890DoMn7JPBpvkZ1rpqbd83SynPDIVWM3L6KQPP6I9TsyHEYCMZzoSiSZfO9HfJ18548eSMoYoSFynPWj4Ad0Y+j6vCJwxmBjOUpAyu439ay/DJ4pY54RCeyOysv190Dln1suo6bqISkJ7AKnEVd+xc3WjpOpMzqZYoCI7X7fY9f/V2eQzb5RMssQBQ0Ffo7f8AV+7KZzowOMYyEDPPmzYMUTPLCJJ8+SVUB/hHdx6brpSyTxjJ6sdhnGZht1/Vv/qzNGEBGcTLETs3gkbT4+0eLrj6HP6pzZckZEwMNsQQB7kCvww9RlhHNmyCQkNICNU+m8/R4D0+KOImzEVb0MAVQtoBVbQgFVW0AE+CUKEAqqoAvWk2yZUQK5aQFVVAVZkTWnLSAqqoBQrJ3WKqu6AaVLMo2gO7WkqlgFUFKBIjRJ8WkWGRIkkURXfxRS0JVAiTzn4nok4S+JgLDbAbaAqqoC6BydAgFVVAVVUQUx5CEx5CB0S4LzvRLgvO0GWTlhvJyywooKUFgILmfiDoXM/EPeinTdBoBiN/JtpArwiy0iE3aVKWgVVAPigFHsUmlPsQEADhASzGG2RNk7vHt7kC1VUAIKyBIoGj4tIAVKEBpWZCyD3aBQGlVUBVVQFiRppEmFPG3y/bKs1uP1M/iWSccg2kjQcKNes/1fojrxuzxHsj9bxjBLtPcvir/wAJ39F1Pr47PxDQvLgySPVyBJrzaW4m+hz6fAfq/wAmulO7qyRqDupurXYTikrWXwtYB/EMk/WERIgEB0HQZv8AvfrcPxG/WG3mg7CHXeP3hLfDcuKrWGq4bnZggemxn1Jbu9vB6mfrpmMTtiPo/wA3r6gTHSnf8VeZj8KH8uXv/RsTaNkc04rbM1tJhPo8+Ab4Tuuez1dF1ZzxqXxDn2vZLh8X8PNZT2FH6wtLQgnzpZ21W5mMRn1MxA7ZSJs+56ZdHngDIZLI15LykzHUn0vjuVNZOp6i/TyHbfOlOf8AHQ7Q5Sq1podv4d1U8oMZmyO7wdRmyDJKpHk931Oi6X0I2Tcpdxw+bHEMuecf66Vlp3MzR15Wa0PVwdQJYRkPhZ+T4Z6jITe46nxdYZ9vTSx97FfP/Yzmhshjvkgy+kp4uTdKqrfaz6GJ0fG6/qZSymMCaj4fe+nny+ljM/AaPldEcY3HJIAnyi3VsXHQ4ZSibxJ6H4fnOXEN3xR0Lhk6LOSZDJpZPJeboMgxZzG7jLy39T7UuC3BqWLzS3p0Z4fTY83UEgTIrxJez0Z4MGQSlZJu3P8ACB5p+4Pd139ifuY0uM9hq9nz4bSjn/DMhOORkToe/ueaefN1mQwwmo/vqWuk06bJXt+pv8Jrz+Nj9Vq0npBXFXe8YrQiXQZ8Q3xnZHgS9HQdYcwMJ/GPve8vi9L/AMUa48y0so3MJ+5W3LVbk9Xnnj6iRBOhfXwZxmgJx7vkzxjL1ZjLgn9E9PkPR5Tjn8J/e3NcF2M6XqrVSXxJSb/hmSUskhIk6dy+uHxfwn+5L3fq+0HrXRHnz/jCqCaGiXRwFVVANKqoCqqgKqqAFq0oQECtAqqgFVVACqfZysbrXlAVVWAUIvWq+aUUKqqA2gmlVAKCqlA5Oo7LFPU9kRYU0DTIS0gVVUAKlUDdVVAUKqAGZNMTQJVVQFVVAWJNsSQIx/E9AeaHxPUB3YUKk0FVpAhKFRBVVQJk+LHpsfVZMnqSkMwkaqRBiO1D97fbL5WX8R6fFmMTCRygUTHHZr3+DQcubqZxli6fP/dGSNHtOPj+b70S+ZHrcPUSiDiyE35TLHwX1AEAqutpQApCUIGZwwJ3GIvx2i/pTsF7q14ttkyAQDtUDsjczLJGOpIHvQLpBj3Z9Qc2K96DmhW7cNvjuFfSgXS08+Tq4QxyzAiUYgnykF5x+IxkcRFbcgJJv4aFoHoUtPPLqRLGcmIxlQ0O7y/Mu2OZMQTVkdkCl55cD1mET9PfHf8Aw3q88vxCOPNPHlMYwiIkEnxQPQpFByHU49nq7o7Od16fS54uuw57GKcZEdgUDppNPn9N1wPTjPnMY82eBy9HT9Zi6kE4pCVc12QOilp5upymBhUhG5VqLv2ByzfinT4JGGSdSHIomvfSB3K88erxykICQJkN0faES6zFEyBlWwXP2WgdBDniwQwjbAUCSfmXmxfiWHNMY4kiR1G6Jjfusar0GeeWEjM2ROUfkEDpOCBmMhHmA2g+x0pxj1MJzljHxRqx73Cf4lhjA5CTQlsGmpl4Ad0DtW3zj18c2PIIbo5IxJ2yjtkPbq54erIGOU5SJOLeYgc+33oHrIeSXXY44o5tTGVba51b6rLLFilOIJIBoBA6FfKwfiJGDHPJCZnLQRrWR8R7Hp6frfVmcU4SxzAvbPw8dEDsV5Or60dNtuJluO0CPi8w/EpmRxejL1QL2XHjx3XSB6d60l80ficThGUQkZGWzYOd3h/msOtnKZw5sZxz2mUfNdhA9K1fG6Xq5YunxCEDOcrAH5kusPxIx9SOeGyWOO8gS3AhA9S13PmYetz5DCUsVY58SjLdX9Tx9N1OfGM3pYxIRySJMp7fo0KB7+4Jt8odRDLlwzEbMoSlGV8MdP8AiHUZonL6Q9MbuJXIkeA8ED2LUF8f9v6jFOAzxxiOQiNQmTMX4j60H8Qz5Mk44Bj/AJZrZORE5e4fUge0hjFIyiDIbSRqPBtAQlASwCqoaAraFYAoOvKEoopZAPfVpAUs637GmkFVQgNm0qhAKBoq2wCqqgKqlFFVQgSXCfxPRJ55fEwFhoMhoNBSqqAthzdAgFVVEFBNJQRaKINtDlgCmkDplwXmemXBeZpDPJyy1k5ZYUUJQgQXM/EHQuRFyHvYU6QGwzFtpBVVQAbtIUpaQVVA1QCqL7IjIkWRR8EArzqqUBVFa2lACBMEkA6jlNpQFCUEWgKqqA2oAGgU+xUBUrSoAMdwookEkgcpKKeIIH9suj8X6L1sJHqIkA1o+zS044nf3cU40UHJ1nS+vCvtDUPm/h2OQzCwRpJ91NNhTJmuY1V06ni9bCR6gGjXl4D7ICgAJCSgza/JJdCMkBOJieDo+MI5egmaFxP0F91BCaktMzjhqnseLl67LnGzHGr8NXp6LovSjcx5j28H0BEBqkqxjuW2ZhxqoR4nTwP7WSRWsns6zpRnjp8UeHvpBC4qOIea3ZWWEHk/h2aQ/kzv/Df1MdLA/tUjWnm7Ps0u1cSvN+LD4j5zN00hnMANDLT5vT+I4yJQA1AFPt0gAdmcFEGvfcpxoeP+JSlLbjiCe5dYfhWLaN13Wur6e1abxRj3XCrXA8LrOjHTkSxgkfq+piyHLhEyKJGoeik0uOvaS2Y7JJ6rc8j8JBEp34B7euBOGVeD1jXVaUYQHmTfnB5f4bjvFIEcn9HmOPL0GTdEXH7qfdpaTqa93FuMHqjxcn4lPINuONE9+Xf8P6OWK55NJHQDwfSpNJVjEPNw41XFHjRgf2260v8AR6PxHpPVhvj8UfqfRpaSqkoI81zWy2PG/CYmMpaHh9mJsWqWpQZvfm+QqqtOYCLSqoCqpQJiCBRNnxaQqAk0LKIzEwJRNg6gpWkBVVQFVVAKotUAoVapAVVWAASqooqqoA5VKEAd1Uoux70Dn6jt70RT1HZEWFNAlAS0gVQqAVVCB0IShAUoSgBmTTMjogQqqgKqqAGJNsSQM4fE9IeaHxPUGFDaqArSBVCUBVVQAXzOq6rp8WaMpbjlh2x2Tr40+kXyhPL0c5/yZ5IzluE8WvyPdqIdHT/iWLNIQ80ZHiM4mNveHyJZM3WmMBhlCIkJGeSu3gOX1ggUqoQFVUIAL456fHn6vN6o3ARhQPGtvsFxj08IzlkHxTrd8kD579nxjoPWq8kSdszyKlQovV1ER1HUSEcQzSiIiXqyAhG/D2n3Pp/sGL0TgryG9LPc3yzl/DsOafqSB3HQ7ZEWPbTQeCIb+k9OVbR1AjUToBY0Hse/qMOLHlhgw4RKQ3TjjJ2wHtOhs/J74/huCMdkY1HcJ1/iCeo6LF1BByDUcEEg/cgeNjgQeqxzjAeQEwx/CDR8e/ydIYIS/Y4mI2mJlVd9tvq4ugwYb9OAjuG2Vdx7UYPw/DgERAfBZjZurQPMzQjjn1UYCgcQlQ4vV9Xpv7MP6Y/U1LpcUjKUogmQ2y9odYwEAIx0A0CB85LHLFhlOIx5+n3Skb8sxr9Ye3DGOTrJzMQf5cKscW9svw7ppT9Q44mV3f76PQMMBIzAG4iifcgeCJRx4pY9oN5zGAkaiD7fY1GWT9uxjLLGZbJ6YxVe+yX2JdJhlEwMImMjukCNCfFcfR4cVbIRjXG2ICB86N3p9NLdGMROfmmLjus1b6PTbj1dzywnIQNjHCh8z9T6n7Pj27No2/w1ouLBjwiscREewUgcP4ialh/8ZF4f2mRGUxyQwQ3SEo7d05fSe76nUdLPPkgSQIQO+q8xP5PR6EN2/aN38W0X9KB4WO4dHg6kanFqf6b1TKZh0ks5jGRyzEvOLABNAn3DV97041toV4J2CqrTwQPnvV3dThvOM3mPwAbRp7H0Pwv4J/8AjJvoDHGIoAAe5oAIHjfic5dLMdTAE7gccq9vw/e8/UdNLBDBIzMYwvfkgAaMhz3fVzdHLPljKU/5cSJenX2h4n9HsApA+fxbc05zhlnm245DeRERF9tALLr0cTu6fQ16Mr09z7dLSB4XTYZ/tA6aQPp4SckT2N8D5PrZ4mWOQHJBeilpA+cGaZwYYjfCEfLllCHnBA/fV1/D8ddUZRjk2GGk8tm9fufepFIHn9djlKeExBNZATXYIhimOrlOjtOMC/bb6VIpA+fOLqIYiAJiJyyMxD49nsXpumI6kTx4pxgYSjuyHUn6TT9BS0gfPfs2eOHDCUchgN3qQxGpez5fNrp+jy48uSWPDsjLHURM3Zv7Wp5ffpaQPnsPQyGSEsOGeCQI3nf5K7gC9be/penyY4ZYyFGU5mPHBfSpaQPHwdJmgenMh8EJRlqNCUw6TOOjOGPlyeatfE+L69LTAfPf9X5DsOPp4YtsoykTK5yr2uvU9FkyykJ4YZbPkybhAge3vo+2U02QYdJhlhxRxzO6URRL0KrAKqtoCqqgJZu2kd2AVVUUISyGkQVVWgVVCAUA2lWAVVUBVVQFVXhAVVUUBeefxB3kARRcMnxBhSw0GA2GkKVCUAOocnUICqqiCqqiiqqgdEuD7nneg/D8nnaQznyy1PllhRQlCBBYPxBsuZ+IMKdIbYDbSCqCiJNC+e6AUxAiKDJLQKAVQFtpBXhVRR5SylAKk0hUQU2hUUKoVAVVKIKClUAKp1RuAIiTqeEAqlCAoSUMKNKm0ICVjdaqlpBVKoAVVQChKEBShUAqqoChVQEKqoBVFraAVRabQAlVQFVW0BVVQFVQgFUJtAVRaoBVCoBVCoBQvCoCTQtVVAKCaVUAqhUAqhLAKoSiiqqgBDSEAKUoQOXqOyxXqeyxYU0CUBLSClCsAVVWg3QqUAKlCAsyaYlwgSqFQChaWkBYLbEkDOPxvUHkj8YesMKwqqgNITHJGRMQbI5Hg0qoCqqgAvjehHq8uT1JyGSMqiIyraOxru+yXzcuHPDKc0I4sh4HMJ14XwWkOLqOonER6fOf5onCj/HG+R+r78Xy558eQxHVYZQINxMo7gD74vqRQKVVQFjJMY4mcjQGpLbMheiBljyCfnjLdCVGNLh6iGYbschIA1Y8Q+Nkx5ummeiw/Bls45fwD7Q/J26vOOghiwYjsEvLvMd20Dk1rZRT1pTEQZHgalxh1mKZiImzMbo6HUPlY+tM5Tw+ocsTCRE/TMKNcHygFPSZZ/8Ag2OJoSxS7DnsiHuWr4ketzS6eOMGuoM/RJ9o5P0PshAz6jqIdPA5Mh2xHd5en/FcOeYxgyEj8O+JjfutfxPCM8YxEoxnuBhu4Mh2p48vUZoyh+3YgYCQ25McrEZe46oHtbnLL1MccoRldzO2L52P1OsnkJyShGEvTgIGtR3Pi80c880un9TWUc08ZPjQ5QPf3Lufnc2Y5PUlGeacomW04hthGu2uhru6jLk6mfTg5JRE8cpT2mtyB7u5dz4OfLk6cZ8MZyMRj9SBJ80daq3p6vJIR6epEbp4wdebCB6wNpfG6TB63UZck5z/AJeTyREiI8eHd9gIBShUBVFpQCqFQCqqgKqqAVVCAVVUBQlUAKlCAqqoCqVQAqqgKqqAoVUBShbYAqqoChSqAqqUUVVUQKoWmgTaqrAFVVAVQlAAvv8AJKqgFANqtICqWZAnjRFAXnn8T0F55/EwpbYYDYaQpVCoAdAxToEBVVRBQlUUVVUDoPw/J53f7HycGkM58stT5ZYUUFKECCx9oNlg/EGFOkNMR9rTSAFjliWaETUpAH2kNl8H8TP84+4ObNrQ65VFdwz2P2nGftx+l2hISFjUPyz9B+H/ANiHuZVtm8zKVFKZ1qVQTQdnnJMwBZ4ebp+vhnltiCDzqx+JZvTxUOZaPnHGejljyeI8zhtz2I9FMtOuOr+E9+1twy5DGBlEbj2AfPnn6uEfVIAj4FrtBiuW7bpHr2zkyCETI8AW8h6ysAzVqeB7XlObqTjM5gGEhx3Y7dCrKe/WDux9bHJiOUA0OQ6dP1Azx3x4utXzOm/4WfzZ6Wef0qwAUCSSVOPgdHlKLRhDPbW3h6PqzmgTIax5pwPUdXMSlGO2I8Q3l2HL2nLThQera28PS9Yc2MzI80ew7vMep6uQOQRAiOxXILKctOFB69oJ7PBj6yWTp5ZQAJC3LD1fU5qMAKBqRXLGB7Tx0UHqa28/T9Xj6rcceuyRibHd6Hx+n/EaxZ8sogDHI6R7uzkevjMqG+hLvTT4H7d+IDH+0enA463bQfNT7WDL6sIzAI3C6KBrbJL534r18uiEJRju3S2kfk8mXr+s6YDN1GOPpHnafNH3oHuWm3x+v/Ep9PPEMUd/qA14+xB/EOo6bAZ9VAepe2EYH4vrQPZtNvg5Ov6/po+tnxQOP7QgTuiHq6v8TjhxQnjG+WTTHHxQPUt5ur6zH0kPUymg+Vk67rekAy9TjicV+YwOsXH8YyZZyxGIicZlEw8TL2+xA9zpOrh1cPUx3V15hT0W4dMchxg5gBP7Qjw8n4h18sEo4cMd+afwjsB4lEPRJeTrPxDF0YByk68ACy+efxDqelnEdZCIhM0Jw7H2vN1x6k9dj2xgSN3pWdD70U9/p88c+MZYXtlxYosjq8ZzHpwf5gG4j2N4t2wGYAlWtcW8A6n/AMNlh2x+AS3/AGvd7kQ9Pc8+Pq8eTLPDE+eFbvm+WfxDquqnIdHCJxwO3dM1uPscvwvNLJ1fUTyR2SIjuHhSKfQ2tvhj8Q6rqZSPSQj6cTW6f2vc9HR/iJzxmJx2Zcd7oIHqWgyp8Hp/xHresgJ4McdPiMjyfY7Yeuy9V085QiBljcTEnRA9GXWY44jnu4AEkjXhR1eP0xlJqB1BPtfF6HLlx9CZTjEwjE7L76/aZ/E8mTJ02KQjEQO0/wCrtXsQPowWrfIn12bBLEM4iBM7ZGPY9nfr+sl00YiABnOQhEH70D0FRG+6JmgT7EQq1t8LB+Idb1kN2DHAUSCZHQ+56Oi/EvWxTnlG2WM1MIp6loMgNTw+Lj6vrupj62GERD7ImfNINft2Tq+lnLFEDJG4zjI8eKB62LNHLETgbieCHS3xvwI5f2eImAMdeSuee739Tnj0mKWWZNRRDptjJljjiZyNRGpL4/7V+Iyh6wxw2fFsvzU59b1kur6E5cQGwg+oJcj3Ip6PR/iWLrJGOMS0F3IUHut8/wDCxl9GPqiIFR2bfD2unX9YOjxeoRuJO2MfElEOy3ml1kI5hgN75AyHhQfMydX1/Tx9bNCBx/ajH4g7S6wnq8eIAVOBnuI8yKehDqITlKETco1uHhbHTdZDqTMQvyS2SvxfF/Dj1J6zNYhW6Pqc/La9fS9VlzxzenGInCe2PYH3oHr2tvgdX1vX9JDfk9KiaAF2Xoy9fl6fp4TyxBzzNCA8SgevakvhZOs67pB62eMJYx8Yhdxduu/E54PSOECYynhA9e0GQD4OTreu6Mxn1MYHFIiJ2cxt6Ou63LHNDpunEfUkDLdPgBA9fc8+DrIZ5zxxu8Z2yt4em6nqo5vQ6mIIIuOTHe35vndPk6kdV1GPpoxsyBMp8BA+n3OHS9ZDqhIwuoyMDfiHzug67PPLPpupiBkgBK48EOeD8RyS6fPl2xEscpgADTTxQPdtL8/i6z8Q6jGOoxQgIVpGV7pPqdB1kesxDKBV6EeBDAdqqqIKFVFFCUFA5eo7LFeo7IiwpoGmQlECqqgFCVpoNlVKAoShASzLhpk8IGaUKgFVVADnJ0YkgZD4w9QLyfaeqLCloVIaQVVUBShUAH2Pk9T1PVwzjFAY9s/glK/o9765fMz9TlnkMOnxiew6zmaiD7GkDjHX7hu9Lbetbn0g+XHqupxEftOOIgSBvxyur8Q+pEoBVVQFFJpHCBy5elM8+PMDQgJCvG2eq6Q5ts4S25IG4Sqx8x3D12qB58OjzSMpZ8m4mJhGMI7Yi+9WbK4fw44zhO6/SgYcc299ptA4I/h0Y9UeqvkfD/i43fQ96qgc3WdHHqobZEgg7oyjzE+LyR/DMk5RPUZpZIxO4R2iIscX4vp2qB5+T8PnvlPDllj3/GAAQT4i+CmP4bjgMUYk1ilvH+Inm3vtncLq9VIPN/6poHGMsxhkSTjFd+fNzThl/DzHN0+OEpgY4TAyR5Hh7H2rW0Dixfh0IxmJk5JZBU5y5I8NOHMfhMbgZ5Mk/TIlDdIUK+X1vpWEqQc+Dpo4DOUbuct5vxehkkBEckZjdE2D3CBS2wMkZExB1HI8HGXW4Y5PSM4if8N6op0JYJA1J0CwyRyRE4m4nghA0VyGaBmcYIMo0SPC1yZ4YqMyBZERfiUQ1SgFUAqqoBQqoBQtpQFUKgKpQgPKpVACVVACqqAqqoCgpQwAVVRQ2qAKSgJPZQqoCrMZbvEe9oIDQ5aQlEFUE17UoAVSlAUBKAgNapVUBVVaBVSTa2wCzIkVQtpiMRAUPG0ULz5B5w724ZPiDClhsMhppCgqhUBbc3UICqqiCqqgKqqKbj4Pk4O4+D5ODSGc+WWp8ssKKEoKBJczyHQucjRDGVHSGnOJs02GkHb3fL6zoMmbIZxqiByX1VY1Jql3Ryjwf+rMw/h+n/J9bpcUsWOMJch2HtUa8pJI1bMdlDCBprqglpG3W2nM8fqhLquo9OJoR7+5GfoM5gTKe4AXT68cMIG4xAJ8A3TlUUdp395qOOiPHj1Mx0twPmj5S88xiOPdKZlkPa+H3I9PjiCIxAB59rA6TFG9sBqx0k0s2q0W8nlyxmXRxrsXY9ZjODbfmqqfSjijAVEADwYj0uOJ3RiLPsa6/Uz7ifxLeUeZ03/C5Pm9H4bEeiPfJ7P2bGYHGYjaeQ3HFGAqIoN4/YlsxNNRq5PI6AmEMpGpGrnCUc0DPPkN/wAL7MMEMd7BV+DB6LDe7YL5c8DfuqW41PM6KZx4cko8guQMcuMzzZJGfaFvuQwQhe2IF80zHpMUTuEQCuA95S3B5XTC+kyD3/o9f4bEnDXHOr1jp4RBiIijyK5ax444xURQ8A6ShyYvmKya6uRAoAXddy/P9FKEMHUnKCYb5bgPB+jp58XR4sQkIRoTJlL2kujgeAOklgxev0XUEQrdtnqPd+4fZ/D88+p6eGWYqUg5H8C6My3en8rNPpRgIigKAQPE/HJjH6Ep8DJZb/F8+MdJPUHeKj7SWvxnH6hwxI3A5BY9jth/BulxT9SMNRxZsD3BA83JjMM3RRlyAR9zt+MD05YMsvghPzfN9bJ0mPLOOSYuUL2nwtrJhjliYTAMTyCgcP4hnxw6acpEbTEge23xxA9NHosmXSMbEvZb7OP8D6SEhIQuuBIkj6Hsy9NjzRMMkRKJ7FA878WzQj0k7I8wqPtePq8Zhh6SMuROD6WH8G6XDITjCyONxunqzdJjz7TkF7Tuj72g1D4ueQw/iUJZNIyxmMT7X3AHDqekxdVHZliJDt7PcwHk/jsoywDECDOc47R3T1MSOv6b+mT29P8AhPTdPPfCNy7Skbp6Z9JjnkjmkPPC9p96BoBo+Ltv8TnXPpPuU4fseP1Tnrzkbb9iB5P4HMDAcR+OMpbgedS59PIZur6o4tbiIgjxovpdT+EdN1M/UnEiR5MTV+916f8AD8HTSMsUdpIAOvg0Hzv4X0eTNh8mecDEkShHs9XQ4YRy5zHLLLMRMZkjTg930eo/Bum6iRnKJEjyYkxv6Ho6fosXTQ9PFHbHugef+Ai+kh75fW4/ho/4r+uX/RfY6fpYdNAY8QqIRh6THgMjAVvO6XvYDxOnI/6rNHiEvrZ6z/1X4T7cb62P8I6fEJiESBkFSFl1l0OKeEdPKN4wAK9zQcn4p0/7R00hDWUfPH3xeLos3/WHUwyfZwwB/wBcnuzZMP4ViEIxkYkmgPNqv4P0Z6fBchU5nfIeHgED0MeWMyREgkc12Tk+E+4/U8vRdJ6GTLOtonKwLv5/N7TG2A8f8DH/AIKP6pfW8UMZnDrYx5Mn3+n6XH00PTxio8/SuLpMeEylAUZndL3tBxfhuaGTpoEEUIgH2U8HQ/zP2vLH4JGW35B9HJ+CdLkkZGFXyIkgH5PZDp4Y4enAAR4pA8/8EkD0mMXqAj8dgZ9JKuxjL5B6ul/DsPSSMsQoy51eoxEhR4YDjx9VjOEZbGyrv5Pi4IH/AKtzTrSZlIe631T+B9GZbtn+ncdv0PbPpceTGcJHkIqhpogZ9EP5GP8Api+f+OjbDFkI8sMgMvc+xjxjHEQjwBQRkxRyRMJgGJ5BQOLqetx9PiOYkEcijz7ngnI5OvwzIq8UjRe3H+CdJjmJiGo1AJsD5PWekxyyjMR54jaD7Gg8nopAdb1MSRZMWPw7NDCOpyTNRjkNvp5PwzBkzDqDH+YNbtEvwzBKM4GPlnLfIXyUDy+j/wDDMv7Z1BAA/s4yeB4lH45ETGHJZ2CdSlHtb3f9QdF/3f3l6sXQYcOL0IRHp/w88sB4XV9B0+PEcmTPkMD23g7nTqMYgeijG9olpu547vo4/wAD6THMTENRxZJH0F6svSY8sozmLMDcfeinm/jo/wDBr/xw+tz/ABCHTdRmh0+a45Nu6Exp8n2Oo6XH1EdmQXGwa9ocup6DD1cRHNESA48QiHidOc3R9Vj6cZTlx5AfLL4o/k9X4YP/AAnqv6x9T3dJ+F9P0hMsUakftHUu+LpMeGU5wFSyHdI+JQPKgP8A1KT/APFxeLphfR9X/VN+hHSYxlOev5hG2/Y8nV9JDB0uYYhW4SkfaUDL8O6rGelx5NwEYRqXspz/AAOQh0880vLCU5TBPh4o6L8G6bNhxZMuPzmMb1I+kPry6eEsZxEeQjbt9iKaYskckROBuJ1BDblgwQwQGPGKjEUA6sAqqoAQUoQOXqOyIp6g8IjwwpoEoCSLQClAFJRBVKtBsqqgKEqgBifDbMuEDNKEoCqqgBiTbEkDL7QemLy/aD1BhSkoS0govslUBVKEASfFz5fSzSGLNHFKRuUc0DtJ8QX2i+Z1XXxjI4/SlkhH+5IAGMfp/RpAQ6bqOoo5ssZY7B24oUDXjJ9SL87EY7GaOGWLETpkxzo+8x8H6GPCBVpQBTSAsSbZkLCB4H4PlmJHHORl6l5IbjfBojVHTZZZOvOUk7JRntHsiatH7L1GPpseTHA+rjlPy99siR/m7w6SeHPiEAajhnEy7bv9rQXP8Syxgc/oH0R9ozqVeO2v1YyZsg63+THeZYonWW0DXkvBPo55sBjLBkn1NeaU5eUHxj5q9wAfVwYMg6kZDEiPoxjZ8b4QGH4jKWKU/TPqQl6ZxxN+b3+HtTDrc0c0cGeEYmd7TCe7jxeTL0nUbMwgD5swlQNGUKF0UYujMeow5cOD08cSdxkfObHf2IHR0/4jnz7pjF/LiZgkSuRMf4Qg9fnxGEs0IRhMiO3d5434j604OkzR6XJjj5chlkMdfE6PJ+wZJRiMfT7JRlCUpzkDI1zRs3fyUA6pfiGbJlyY8EYE4zt2zlUpH2OefJl/a8MoRAnLFO4zPw663XNJ6vo5ZpzGXpxls/y8kZCFD/F308Xbp+hzY8mAzO7ZinCcr7nhgOfqOpzZOm6jHMRGTGKJjdGJ7jvbcuq6nH6OHGISnkidTdCu7tk6HLM9SAABljEQ18B9y4umzyyYMs4iHpxlGY3A9qCAMvUdRE7ScWIADdPIdDLwj5ho7fh3VnqsW+VWCYnb8OncPPk6LMOonl9PHlEq2HJL4K7VR+56fw3pcnTY5Qy0SZylceKKBh10znJ6WBobTLLIdo+HvP1L0EZz6HGMZ2S20JVdO+b8K6bNKWQwucu+4hP4b0P7HhECBv8At0bsoHJ+GYBgy54CRlUo2Zc3Tj+IYP2fppYcWIyhK5TyaEx1+LxJHsfTwdLLHmy5DVZDGvkHmPR9XGMsMZxMJXU5XvAPauD7NWgeowDqsEduSXp7bO37emlr+HRMuixiJ2kwoHwe3H0wxYRhhxGO0I6PpjgwQxSNmIokMB5nQdOOn6vNAEy8sCZSNknxR+J9MBOHUSlKUvUxiMfsxHsH6vo4+jMOonnJsSjGNd9E9Z0h6iMYggbZxnr/AIS0HQGlpWACUJQCqEoCqqgKqqAFSqAqhKAqqoCqqgBVSgBCVYCaQ1S0iiFSqAoStIgKVKUUVVCIK2tppACpQgKs7taaGqKPdNJVpBVVQAqASSRWnilgFCUFFAXnmPOHflwn8QYU0DTIaDSFKFVAXQObYQClVaQUJQgKqBSoG0fg+Ti7R+D6XFAznyynJyhhRVUIElylyHUucuQxlRvtv/JsCgzEttIKUKiASgJaAAAa+LSFQCqqgKqqAraqgKn2ISgKUM1LddjbXFd/egWqoQChKCQDXdAKoSCgKqqA0tKqAoSqAqqoCqqgKqqApQlAUJQgKqAAKHCoCqqgKFSgKDEHnslUAUmkqgBVW0AoVbQFVQSQNNUAqqEAqhUAqPahUBS4RxyGQzMrieI+Ds1kTkKoTbCgShUBVVQFVVAVQzj3Aefn2IpaE32VEAqVYUULaUBWtbQkBABZBJ5FNslA5eo7Iiuc6hYsKaBpkNNIFKAlAUJQgbqqogqqoAQeEoKKZKkqgKqqAGJNsyQMT8QegPMfiD0hhSwlASiCqq0BQoSgSXx+tgcEpSGaGKGT4/U58PK+yXxs88PT9RPJ1UbEq2TlHdECuO9NIc/Tk9SB00M+KeIVrH+4Yjt/m/QRfCz9T03VgQ6aO/LY2yhCtuvN6PuxFBApKAlAUJZKArQfI/DvxDJ1E5wy1YNwoVcbpMevyS679nFeltOtfaHOqB6tBOjxT/EumhL05ZAJXR5q/C6r73HP+IDp+pEMkqxmG7jXdaB6WidHz8vWwyYDlxZBEAgb6uteKTj6mX7RlhMgQhGEhfaxqgegtPBj/FMGSQiCfN8JlGURL+kkUXpx9RCeSWIfFCt2nigbUmkqgCkRsjzCi0qAKWkqgABUqgBUqgBVVAVSqBKpVAmlShAUoSgFCVQAqUICqqgBKpQAqVQAqqgKFVAKqgCkAqqsAqlCABEA2OSlVaBVVQFaVKAFXvSoCWWmWFDSYgDQcKApkBQPdpAqqoCqqgKqrABCVRSS80/jD0l5p/GGFNQ0GQ0GkKVQqAthz5dAgFKEtIBUoQFVVgNo/Afm4usfgLk0Gc+WWsnLLCihKECS5S5DqXKWpDGVHSExvuiLTSDWtqParnLNCJoyAPvTcFSb0NCVJoW4/tGP+KP0ukZiXBtJphprUqtdUryyWmRIujfCDuJ/w187fIzfjccUpROLJ5SRdaaOY/8ALihIXHDkI8QinvrblCe4A+ISLBPh2RDRUWjcgUqLRuQKV58/Uw6eO7IaFgfMuu+tUC0M7nl6jrY4MmPGQSch2hA7bQatgTt5s3WxxZYYSCTkuj7kDsTbx4utGTNPAAbgASe2r07kDRXl6rqh02OWWQsRF0HTFlGSImO4B+lA2QydXDq+qHS4zlkCQK0HtQOkLbAlerzdX1semETIE7pCGntQOuzfsSxu0UStA0QzuTaBSvNLqoDIMJPnI3V7GI9bE5z09G4xEr7aoHZavNi6rHmlKMDZgdsve72gUqLUlAKucZ7hfHva3IFKza2gFbefJ1UMc445HzS4Dz5utrKOnhe8jd7KvVFPRtFsCS7kQsFbcxJdyBpaLc97hHq4TySxA3KIBl80DrtbePB1YzTnARI2HbZ7+56dyBdrbO5G5Au1t5uo6mHTwOTIaiHSM7FoGtrbG5NoFKyTS7kCnDBknMHfHbRoD2OtotAq028OXroYs0cBB3SG4U1h6yOXJPEAQYEAk8H3IHZasbk2gUm2LSCgVaFQUApVUBVVQFCkHsrCiqKSgKUFKAEFPCCgcefkNR4Rn5TFhSw0gNBpBShKAstMoHQqqiCqqigQlCBmVVUBVUICxJtmSBifiD0B5/tB6QwpSUKL7ogU0hLQKqqAFpKoAAASqm+zSCqqgFkp1WkD5qE/2bFHq+2PJkjP+kn83TFilDP09/HOGWZ98tX3/SjW3aKPahS+mLutQ0Hg4OpwYujOHLICYEozxn4jI+zvbOPJHpeowftB2y9HbuPYv0HpRvdQ3Dv3SYA8hA+b6ojNDqs+PXHI4wD/ABSidS69Zinln1UMd7jjxUB3fe2CqoV4J2DlA+blPH1EYY458mQmUaxCMd0a8fKKp9/H1EJ5JYh8UKMtPF1EBynbrbAUqqgKqlACpVAVVUBQlCAsgAcKbv2KgUqFQChVQFCVQAq0rACE9wuiNSNWlVoFVpKAFVUBVVQFCUIBQqoCqEsAqhKKIShUQVSrQBKqgKqqAqqoChdb9ioAqtFSrCizimZxEjExscS5DatIKqqA0qqgA2eEqqABwtpZPPDCgLzZB5w9RebJ8QYUsNshtpAqhKAthzdAgFKFaQVSqAFVUDWHwlydYfCXNAyycstZOWWFFCUIElylyHQuc9SGMp0xaZiNG2kJ1A1fB/Ev759wfffL6vop5chmKqu7i6b0O+TZVtj0PIPtfoOgH8mD5v8A1Zm7V9P+T6vSY5YsYhIagKqaOmderrCe50oIVXoeM5uoj/Ln7QfqfP8AweezoYyPA3F9LqB/Kl/SXyvwyBn+HCPciYQBhydd1kfWxyjjgfgiRZI9r2fh/WS6jdDLHblxmpD9Xl/C+uxR6eMMkhCWMbZCRrhv8KPrZs3Ux+CZAifGkU9LqM8cGOWSXERZfIhk/EOoj60JQgDrHGRentL3/imKWbpskIcmOj4nSdH0OXCMk5yiQPMDMiigehD8WMulnnManjsSj7fycY5fxAw9eE8eQVfpxH3OfSz6fB0uTLjxyOORI2yN767h5svS9JDGeo6XMcZrcIiXfw8UDq/GpZp4sctIxJjcCNRJ7M+bqsGOEIgZM0jtsR8o9rw9dknPocWXLpLdAydPxPqzP0oYsuzHlJ3ZIoA6jqOv6IDLlnCcL80aop/Fck/U6eeIXLd5QfaHg/Eum6bp8XlyHJmNcz3e8vd+IZY4J9LllwD+iBWXP1vQ1lzmOTGTUhEVtb6qe7remI4IkfuR+K9Viy4DhxyE55KjERNozYzj6vpYntEj7kDow9XOXU5cUq2wjEjTV5MHU9b1sTmw5IRjZ24yLOni69Pp1vUEC6jHR4o4Oh6qJzxkcGSzuG7g+5A7eqzZMnQZJZ47J0bDljl+IejHLjMIxERthVkgDxcYZMmX8OzHJIyAsRme4faxR/8ABo/0D6kCvw/qz1eGOUirc/xXqJ9PgOTHW4GPIvu5/gQ/8Eh75fWj8cFdLL3x+tAnresyxnDp+nAOWety4A8XzuvPV4zjh1BjOJnEicRWvg9XUzHS9Zjz5NIShs3eBY/FusxT9LHCQlIzifKbpA6ut6rL6g6bpwDkkCSZcRDiOq6ropwHVGM8czt3RFbS8/4jhxjroy6gmOOcaEga1DGfp+jhOEImeWciKjGd/NA7er63qI9UOnwAHdG9ex8WYdV1fTZ4YupMZQyaCURVFvb/AOpIf+LX8TH8/pv60DkzDqj+IVCURLb5SR9n83tHU5ZdVkwRIAGMSjp3cs+SGHr4SyS2gwIBLWEX+I5P/FxQOX8Lj1XqZiJx0kd+nMq7PpfhnWy6nFeTScSYy94eP8Lywhnz4pSAmcliJ5Lz9dOXQZ8ghdZ4+Wv40D1eg6yfUmcz/b37MdDwfRfPwHF+HYIQyHaBUb/xF9DlEPO6/qM0JRxdPHzzPxHiLw5ep63opRlllHJCRESAKLp+KZ5+vj6f1DixzBMph8zr8PTYtgx5DkybhZlPdQRT3MvV5I9Xjwj4ZRkTp4L+I9XPpxj2fanGJ9xeTrZxwdZgyzNRqQty/FOsxZZ4seOQkROJO3sgPXjqD1uMQnEWDssceKOqlm/bYRw0ZmFbpcDxLr1+WOHrME8hEY1LUtipfiMSNQcZaCcWfqul6iOLqJDJDJe0gVVNZ+rz5856bpiIbBc8h7X2CfxCP/hXTf1S+p8/L02Edbkj1RMROpQldBgO3D1XUdPnjg6mQmJ/BMaasS6nq8/UZMGKUYiNHcR8Lhi6fox1UIYN2SY8xkJ2I+97OiH/AIb1HuggR0ufqcPUfs3USEwY7oyAp5+kx9R+25byDTbv8vxDw9j15h/6kcY/wSc8OWGLr80ZkAyENt90DbputkZ5/UPlxy09zhiPX9bD14ZI44nWEKvT2sYMRynrIR5Jr7nf8O/EMEemjHJIQljG2UZaEUgVHrOq/ZjI4z6wO2q09/uefqB+IdPjOY5onaLMNtBjq/xHNk6b1Yg44yntExzt8Xm6zpuixYTI5TlyEeXz3r7h+qB1fimXL1HSQyg7YnaZRrxejL1Wbo8ERKQyZpnbDShr+Ty9R/6rIH2R+tfxX0+oxYs4O/FCXnMfBA1ynrulj65yxyAayhXb2PtdPmGbHHJHiQt+bzdN+G48fqRlKd/DEZNS/Q9HjGPDCIBiAPhOpCBzfiPWZMOzFgAOXIajfA9rxZ8nXdBH155BlgPjjtqvc6/icv2fqcHUz/txMoyPhbP4r12GXTyx45Cc8g2xjHVAPX9fmhLCOno+peh+5xy5et6KUMmXJHJjlIRkBGqtOXEcWXo4HkaH6Ho/Go/yI/1w+tAzzn/1I4v6JOvT9VknmzwkfLjrb9DnnH/qSxf0TZ6P/iOr9m36mgy6TN+IddiE4ZI4wNLqzIvT0P4jOWHJLqK3YSRIjvTX4EP/AAOHvl9bxYcMs2LrIR5MzTAa4p/iHVw9eGSOMHWENt6e0vf+GdbLqoH1BWSB2zA8Xw+j6PoM2ETyTMZgecHJVH3Pp/gowQxzyYYyjDd8U5Xuruge2FcMOfH1WPfilcToJRehEABraUWlAVVmZI4F6hApCUMKFAQCSlAKoSgLJSgoHHn5aizn5DUWFNA0yGmkCqqgBDSEDdVVAVVUQCEoRTMqpVAVVUBYk2wUDE/EHpDzH4npDClBVDSIDhUq0ASikoClCoCDaUJaQCWSaFpDAFVVoFVSgKEqgBKqgKqlAUJVAVVUBVVQFVQgFCoKACqqwBVVaBQlBQFKArAFCq0CEoSgFCqgKqqAqqIkkaiigFVVAUJQwCqqDeoQFVSgKqrQKqqAI3WvKVVAVVBvsgEqqoCUc8qTrSUAMkkcNFWAKEoN9mgKoBvhUAqzrY8GkBBvVButOUqgClSgsKTK3mn8b0l5pfGwpqG2A20gpQlABdI8MNhAKqlpBVVQAUA2lmMBHhA2h8Jc3SHBc0DPJyw3k5YYUKEoQJLlL4g6lzl8QYU6Q0xE200g0LvupCeVQJCVW0BSyZUm2gEoiQo8FjFghhiIYwIxHADoqIcmb8N6bPLfkxxMvF1lhIhsxVCqqh+jugeCkCBpq8eT8K6XLLfPHEy9z3BUDIYogbaG0duzyj8K6US3jFG3vVAxy9PDLEwmBKJ7FxP4fgOP0dkfTH2XrVA48f4b02OJhHHERlzpy6S6TFLaJRB2/DfZ6FUg5MP4d0+CW/HjjGXiA6npscpjIYgyjxLuHURoUlSDKPTwjI5AAJS5Pi4ZPwzpsst88cTLxe1UDE9PjlD0jEbONvZoY4iO0DTim9UoGeLDDDHZACMR2C5cMM0dswJDwLoAqBlkwQyx2TiJR8C4Q/DOmgKjjiBd8d3sVSDHL08M0dmSIlHwLj0/QYOmleLHGJ8Ry9hQFIM/Qhv9TaN9Vu9jM+mhOQlMWQbjfb3O6UDl6jo8XUV6sBKuL7Nx6bHGRyCIEiKJ9juhA5ZdFh9T1tg9T+Lu+ZAT/EOohKWOUMeIk+bvJ91UDh67pD1MIwAHxAkntXh7XtATSoGGfpcXUDbliJD2ucfw/p4w9OOOIieRT11atBhl6bHmjsyREo+BDnDoMGOO2OOIAN8d3rVSDmy9Hizf3ICXvDQ6fGCJCIEgKB714O6sBjLBCZEpAEx+EkcM5emx5htyREh4SD0IQMMPS4sArFERH+ENxwwjIyAAkeT4uiUDE4YGQmQNw0BrVifSYskhOcAZDgkavShAxjhhAkxABlqSO7lk6DBllvnjiZeJD1EHslAylhjKOyQBj4Vo5YugwYr9PHGN81EPUrZBgOnxiHpiIEP4a0XH0uPHHZCIET2A0d1YDkh+H9PjlvhjiJeNPVSVQInijMGMgCDyC8+H8P6fAd2PHGJ8QHrVoMpYITIlKIMo/CT2XJghlG2cRIc6uqsBkengZjIYjeBQl3RHp8cTKUYgGXxHxd1QMseGGKOyAEYjsEQwQx2YRAMjZruXUJQOLL+G9NmlvyY4mXjT0DFER2ADbVV2dEoGeHDDDHZjiIxHYOio7oBQbrTlKoCqqgBUoYUVBtjLP04mVE12jy1ygFKF4QEslooKBx5uQ1FnLyGosKahKAlpAqhUBQlCB0KqoChKoAQlUDIqpVAVVUBcyXRghAy+09IeU/E9QYUoKhLSCqqgFVVAUJVAzjGYkST5ewdFVAUoSiClkG2mgVVUBVWIYxjG2PHvJ+tAtVVAUoUoBVCoBVCoBVCoBQqoCgr7UIClVQChKoAQlUAKlFIChK0woEoSgKUKRYppBVUoCq3XKUAKlCAFVapgFaVKAqqtAqqoCqqgKqqAKN8pVUAWb9iVpUBVVQAqlQWFCqFaQLJJ7Cyn3LRQCqqgAqlUBQqsBMnlmKk9ZebLpIMNFgtsBtpAqq2gENhzdAgFUq0gqqoCqqgXDg+5zdIcH3MIGWTlhvINWWFFCqgSXOXIdC5T5DGVHTFpzq2kQu0WyiVng00FJYBtMYiOgQCBSUKNUClWlaQVW1QEBKqgCtVSgICgCuTaQbZMSZCVkAX5fFANbmkWlACSgG0oEwkZCyCPekX3SqAhVVAVCiIGo7qgFVVACpVAANqlCAlKqgKqqAqtKgKEqgBVXlAVVUBVVQFV4VAVVUBVVQAqVQFVVAUJQRaApVCAVQlAVVUBQqoBQCDwlQEBVWcgkYkQNSrQnxQKHtVRxryqAoKWZC2FKQqUAUqVQAqqgJvshTEGieylA483LcWcvLUWFNAlkNNIFCpQAi2maQN0qqAqqtILJaQwGRVSqKFCVQAwW2CgYn4npDzn4g9IYUKhKog0lVaBVVQFKEoChBl7GrQFBOmiVRBHt5ShWgVVWAKoUNAVtCoBVCoCllUCkKqAryqoCqLVAUoSgISgKgFHCqgKqqAqqoCqqgBaSqAFVLABKoaAolIRBJ0AUrXZAINiwpKAlACqrAKWbTaAVRatAVQqAUE1qqUAJZlESFEWGkBLIBsm9Gl4QFbVjLCUwBGRibB0+pAtVVAWeGmSQRY19zCjabZtKBSoCtIFCVQG0WqsAoJWwVI8EUEnDJyHYuOTkMKUG2Q00gUEJVAadAHN1CAVVWkFVVAVVUC4d/cw1Dv7mUDLIy3kYYUCqqBMnKbqXHIxlR0xarwYAPZuIpEGkU2imgmMa5bpASiEA3q0FpTG6oooQqQtNITEg3RvVIIPCarhB5QCqqgKEqgSb7JShAUoSgKqqAqySQLAstBAVVUAqgESFhKAqhUBtaSqAoVUAqhKApQlAUJQgKqhAVVUBVV5QFVVAVVUBItVVAVVUBVjHGUR5zZs9qdEAISqAqqoDSOErSAqqoCqqgKqqAqqoCq0qAqq0wCqqiiqqgBVpUAJVUBZKWSgcuX4mgWMvxNhiKaBpkNBpBVUoCzbTNoHQqq0gqqoChKGAyKpKooqqEBIYLbBQMj8QemLyy+IPVFhSkoS0gqqoBVVQFVVEFVQihQvdKIKqqAFShFFbVBCAQQdQrljxwxARgNsRwA1vaQtDG9BmEC7TblvC+oEDW1ty9SPikZAeCgaWtuJzRGpkK94WOaE/hIN+BBQNbS4evD+Id+/hyz+2YQN2+NcXuQOpXAZ4SupA1zqxLrcMRZnEDTXcO/CB1Jt4v27CCAckfNWwXy2erxRh6hkBD+K9EDptbeP/rDARuGSNVd324aj1mKctkZgy10B8OfoQOq1t4ZfiXTxmcZyRE43uj3FI/6z6ff6XqDeRe3X3+CB32tvnYvxXpsvwZAdRHvyeGs34jh6exlnRjt3afxcIHfavm/9bdMIepv8oAldHg6B16f8Qw9SQMUrJG4adrpA7bW3zZfi+CIMjI0AZHQ8A19bMfxnp5w9SMjt8x+H+HlA9S1t8/B+J4eoxSz4yTCF3Y10ccP41gzRE4bqMjHWPcDd9SB61ot82H4thmYgXctlafxiwjqPxbD0+aPTz3b5VVDTX5oHp2r40/x3DGUI1O8nw6DxrXzJH45iOSeMRneO7OlaGvFA9i1t8/quvh05AkDe05NPAafq8s/x3FDLLERK4AknTsLQPatXxv8Ar3H63oiMr27r08Ldeq/FodNgh1EokxnVAc6oHqWi3yo/jEJV5Za+n/z/AMnGf49CMscdkv5ldxpZpFPctbfLP4oB0p6raaBI23roaT0P4oOs2VEx3iR1P8JpEPTW3xes/Gx020emZbpSh8VfCa8Co/Gv5+XB6euOMpXu52/JA9pLnjnviJeIBdAgFCqgFUJQFVVAUoVASaUAAUNAlCBNIbchUrMT3YUu1CKF33aQCjVb7JaQUJVAic4wFyNBJWzfGnipYUkuOTkO5Dhl+IMKWG3MBtpAqq0gLoHN1CApQrSBVCoBVCUCo9/cymPf3IQMsvLDeTlhhRVVQILlkdS5ZDWrGVHVFsOcC6JEFB9iVLogK1SqoClCoBWmPTuYnZ0FV2bQFSqoCqqgKqi9aQDr8lVUBVVpAVVUBVFC77qgFUWtoBVUG+yAVVUAoVUBVKEAqhKAqqEAqhUBVVQAlVQFUJQFVQgFVQgFUJQAqqgFWJRvuQ2gFGt+xVQCqqgKrSoCqqgKEqgBUoQFbVUBkTRrnsgXz3SgzAIieTwgFVVhRW1QUA2qEgIBQgyogeKUQm9fYlUopLJbtkoHJl+JsM5uQ1FhSw0yGmkFVSgBmy0ygdKqrSCqqgKEoQMzyqnlWFFVVADJaZKBhPkPSHmyDV6YsKUC0hLSCqqgKUMzjuFAke0IhaFSgKoKooUJUtIKqgMAUJVAClUFoOGRP7WPD0//ACT83+KSkBiN/wC8n3/xP0eT/ih/4uX1h+a/Ff8Ad+zJk+sIFwJPW9SL+xP9E45f+pSPy/6LEf8Ajuo/on/0Q1D/ANWkf9H/AEWg6usJ9eX9Z/8AdbwA31mH+iH/AEXv6s/+EH+sf+65PnQ16zB/Rj+pA5sVHp8/9UPrL7n4FpIf+Kj9ZfEwi+mz++H/AEn2/wAD5H/ih/0ygcU/7Mx/5Tn92R6PwPSWL+nL9bzZb9Kf/i8v/uwPR+CE3i8Kzf8AkUCMtbsg9vU/oXzDG+gBH/en/ovp5R55j/F1P/QD5df+Aj/xv/kUD6HoB5M4P8EP+g+V1Mb6aR9mD6i+r+HeaGb/AMXi/wCgXyOo16U/09P+qBEwBk6T+mH/AEn08+n4XIeEpf8ASfLkSZ9KD/DH/pl9TqP/AFWT/qn/AO7EDixadPH/AMVk/wCmH0eiP/hQ/qzfUC+Ziv8AZ4+HpZv+lF9HowR1YH+LN/0YoHn9QT/1hm92T/oogQPxCHe4x++Ceo0/EMvun/0EY9fxDH/Tj/6CBP4WRXt9bF+r2/jZ82f+nD9ZeH8L+H/zLg/6T3fjQ82Y/wCDD/00DilQ6Qj/AMp4/wDpvpfgUanj9uI/9N8w0ekP/io/+7S+j+Bk78f/AIqf/TQOXL/bn/Rm/wCm59OQOliO+3qPqBdMvwZP6Oo/6cXHpz/4NEDw6j/oBA7/AMHP/qOzD+v6ni/C9cUR/wCVP/fZez8H/wCAze+f/ReP8KA9OP8A40f9CSB04AN+Ijx6f6ij8Vr/AKyxf6PrXpfiw/8AvN/5JfxgV+IYv/Mf/SQOTqyBk6fTgn7sjWORj1HUkaEb/b9pjqpefAa7y/8AdpSTXUdVp2yf9IIHs/ih2kXr/JmL+h8uYB67MO2yf/QfU/F9CP8AxWX6g+VIV12Qf4J/+60CYgftgrvjH3we38VN/huA/wBH1PFir9ujfGyP/ut7PxIX+GYPD+X/ANFAiB0hXh0/1kPJkkBm6X2Af9MvTiIAxnxj03/TLzZT5+m93/vySB6mX/1WZPZKf/TR+BnTEP8ADl+sJy+b8Ny/1ZP+mx+B/wC7PszfXBA5fxc6wB7Zcn1hvX9v6iv4Mn/RY/GRW0n/AL3L/wCRakK6/qK/gy/9BA+r6f8Atw/pj9Tu4dNrjj/TH6nopgAqUMAqDapQFVOitAqqoCqi1QGq0CClUCUCVnRooYUoKgJRBVF9mSJGQIPl1sV+rQWhLMhfemFAXDLyHcnWnDLyGAoNhgNhoCqpQA6BzLoEAqqWkFCUICqqgVH9EJCEDLJyy1k5YYUKEoQJLjkdZOU2MqOiHj3dI33c4F1DUQKCLVWkEaJZukoCUHVJYkDYIQLiKFKTWpVUBtVGioEzkYiwCT4BpTfZQbQCqEoCqqgAmkqqAryqoChSqBJWIA4RJlA1tLAatAKLVBQKVCUBtVQgKVVAVVUBQqoCqqgFUKgKVQgFVVAVVCAVQlACqqApQqAVpVQFESTzolKAqqEAoVUAotUIBtUA2lhRpVZkSKoXZpApWI1I7xf8LaIKqqKKqqAhaVUBVUIClVQFktMlA5M/IaijPyEhhTQJQEtIKqlABYbYQOpVVpBVVQFCUIGZ5Q0eWWFChKoAZLTMkDCepenHwHmyGi9MOGFLShLSCqAbW0CkKqIKUKgJShKAqqtAqqoCqEoCyWkFA8/KP/Co/wDi5fWH5z8X0EP/ABuX6w/R5v8Aiof0S+sPzn4x8Mf/AB2X6w0Cf+P6i/4Mn/RCQK/FIA/4P+gg0evzX3x5P+i0f/Vnj90P+ggdPUxI6k2eZx/91yeCBMer6b+nF9T6PWj/AMIP9Uf/AHWXzo6dZ0x/w4/qQOXAT+z9QP8Axf8A0n2vwMax/wDFD/3ZJ8bD/Z6kD/B/0i+z+Ag3D/xY/wCmUDkyj+XP+jN/7tdfwU0cXuz/AFxcsmkJ/wBGb/3Y6fgg1xf+Zv0QDlH8zJ/V1X/RD5Y/4Ajv63/kH18w/mz8d/Uf9EPjD/gTX/e/+RQPofwzjL/4vF/7rfIz/wDCn+jpvqk+v+F6jLX/AHeP/oPlZv8AhZf0YP1QMZC5dJX8MP8Apl9XMCfw3J/VP/3Y+VK//BP6Y/8ATfWyD/1G5fZKf/TQPOxRvpRf/d5/+lF9PpdOrH9ef6oPnYB/4MP6M3/SD6PS69XH+vL98YoHn9UAPxDL/Tk/91lFD9vxeG3H/wC63TqYn/rLJ/TP/oOYhXX4vDbD/oIGX4X8Mv8AxuD/AKRe/wDGh5s39GH/AKReL8OFRmb/AN5i/wCkX0PxvSWYf4MX/SKB50RfSE/+U4/+7ZPo/ghG7EP/AClP/wB2PCI/+BH/AMUP/dj2/gQ8+L+if/TQMMkbhP8Ap6j/AN2B5ulF9PG9NOo/6IerLRjP3dR/0nn6MX08Cf8Ayt/0Qgdn4LHd0Wf/AFf9B5Pwkfy4/wDjh/7rL2fgf/B5v9X/AEXi/Cx5B/40f9AoHR0xo4v/AHm+qTX4yNvX4f8AzH/0mcMaOP8A8wfWW/xo/wDh+H2bP+kgcPV7RLAR4n/3aVya9V1Xuyf9IJ64ndgv+KX/ALsWQ/8ACup90/rCB7H4sLMfbizfUHzJyI6/IfHHk/8Adb6n4mNYf+Ky/UHzzKM+rkOJDGfmDBAwxnb10D/g/wDfb2deT/1Zh/8AMf1F5McSetx9vJH/AKD29eP/AFF4/wDSgZQhHJDGRY8vTj/nF5M2PbPpqvWv/dhezCP5cCOduH7pPN1I83THwJv/AJaB6ZH/AKjcw9s/+m4/gfGP3Zvri9Eh/wCo/NXaU/8ApOP4INMX/mX9EDj/ABrw/wDK2X9HSUf/AFIZwe+PL/0Qj8aB5/8AK0/0dCL/ABHLffHP/oIH0/Tf24/0j6noefpP7MP6Y/U7sAUJWkAKlCAqqlgFUBJNaoDSUA3qloGkAVoEqgBCWBEgkk3fHsYCtUoSgNKqEA32QlCKSXDJ8Qd3DL8QYUsNBgNhpBSyQezSAugYbCBSqrSCqqgBVVgCFUK0GWTlhvJywwoUJZQAXHI6lyyBjKjog6BzgXQJECqoLSCljc0EUKJgkaGilS0gqgHtSUBTSKpQbQCikqgBn1I7/TvzVur2NKgFVVAVQUoAVBkAa7lKACVShAmTFty4crQNIthzBbBQKVAaQAqVQAtLSUBVVQAQDoUqqAqqoAVUoChKEBU+xVQEKoFKgFUJQAlCoBQqoCqlCAUoVAkQAJkOTy2hKAqqoDaoVAVVLAACuFq0qgKqqAqqgUgKUKgKCARRSpNICqqgKBetokdoJomhdDlI1oooVVUAILTJQOXqOyYo6jkLFhTUJZDQaQUqqACy2ygdCpQ0gqqoCgpQgRLlCZcoYUVVUAMyaZkgYZDq9EOHnny9MRowpaUK0gpVUBVWZSogUdUClQlEFKqgKpVoAqpQBSpVAClKoHn5Y/8AhWP+mb89+M4ztFA360+3ufsKZIQPkPTl+35NDrCX/RQAf+ssPux3/wAl+x2o2BoPnetif2ng/Fj/AOjJ8wCQ6vpjX2Ydve/a7QnagfBYYn0uq08O3+N9j8CibgSD/bP/AE36aj4lFXygfJ5MU9s6iT5c4+E/xBv8GwzgcVxkKOW7BHYP1NLSB81mw5PVmRE/Hl7eMHyY9Nm/YpREJX6kdNuvD92tIHh/hmGcd+6JF48Y18aL5mXo8x6eQ2SvZiFbT2kX6+lpA+Ln0Wf/AMGrHLyjzaceZ9XL0+SX4flxiB3mU6j3+J9+lpA+SwdDnGAROOW7bmFV41X0vf03SZYdRGZgRESkbrxgP1fepaQPl+o6DqJ9fLKMZMCD5u3wucfw/qR1eLJsO0RhZ08NX6ykUpB8l0P4Z1MBPdjIueOQv2S1e/8AFehzZ5ZTjiZboQA94k+9SaQPlB+F9R+ynGYHd6ZjVjnff1PZ+E9BmwSxnLGtsZg6juRT71JoIHzs/wANzkTqPPrVqPtVTl034T1OPCISiBIHJ9r+KND736elpSDwfwr8OzdN02TFlAEpca+x5/w/8J6nDjEZxAPqRl8Q4oh+mpaAQPnsX4XniYEgeX07838MiT9zX4n+GZ+p6mGXFt2xq7lXf3PvLSkHzHUfgvU5DjMdvkMj8XjKx2bl+C9RLPmy3GsglWvi/SgJpSDyet/D8mcw2V5YTib9op5B+DZh1Pr+WqAqz/DT9EtKQeBH8IzDPHNcaAAPc8e506r8LyZ+jh0wMRKNc8PtUtIHgw/B8sYCJlHSMI9/sytjN+CZ5+nU41AyJu+8r8H6GlQPLP4dM9Lk6cSAlMyN615ix+H/AITLpNu6YO0z4B+0H1zpqqB4nXfgp6nX1BEbzk+G+QB4hofgxHUS6j1PiBjt2+Ma8X2JceKQpBngx+nCMOdoEfodVVgFUKL7oBVVQFFJRqgKVVAVVUAQBAqRs+Ki+6VJQFBShAVVWAVVUBQQDylBQJLhk+IPQ82U0QwpYbDANthoFKqgLoHN0CBSqrSChKEBVVQFKEoGWTlhvLfZygSRrywpSEoQJLlkdS5y5DCo3g6BiI0aaQKJKDqkoEXaYk90bWgECkXaknslpBVVQEG1VUAoVUBVUSuvLz7UAoEgeEhUCZQEiCRdGw1bJ5SgFBUlFoFIJVUAFxECDpw7s0gZGw6RCU0gEJQEoBVBKIknnT2IFKqoCqqgKqhAKFVAVVBQCqqgKqqAqqoBQqoCqqgKqqAoSqAqqoCqqgKqqAqVVAUoSgKqqAqqoCqqwE7dbv5NKhFECkqi9aQCqqiCqoItFCqqgKCqCgcvUchqPDGaQlRBvVqLCmgCUBLSBVVQEstFlA6VVDSCqqgKEoQIlyy1JlhQqqoAZk0zJAwnyPe9IeafIemLChvWq+bSArSFIW1QCqEoCqhKAEqrSCqqgFUJQFUKgFVVAVVUBVVQFUJQFjJMQiZHgAlpx6j+3L+mX1IEYOqHUY45cY8sv4vBGLq45ZzxgEHGdpt5Pwc/+B4/c8glIHrTDkcf8lA7ZfiwlIjBiyZhHQyxjy/SXq6TrcfVx3Y7sGpRPMT7XD8NER02IR42h6MUcMcktleodZ1z80DcmtXk6Xr8fVTnDHqIEDd2LvnwwzwOPILieQ+d0ERDquohEAAbKA9yB1dd+IY+ihvyHX7Me5dcmcQxnKeBHc+f+L9PjGDLm2g5DEDd3q3bqsMs/SnFAiMpRAs8IGWD8Uy5jGunmIS+0ZCq8X0M2eOGByTNRiLL42YdT+HwhlOU5IgxhKBiAKOnlcOt/EMOXqPSznbixa7aPnn+QQPX6f8AEY5un/aSNsaJ18A8o/FsgAyZMJhhkQN+4E68Gnj6HrcP7DMEbtglujxyzl6fqcfTRnlyb8UNszhqtP6uTTQe31XW4+lh6mQ14DufcjpOs9fBHPLygjcfYs4QyQ9WgSInaSNRYfNxWfwrTn05MBqfxbMI+v6P/g9/FfmrxrwfTlnjGBySNRAu/Y+GMOfH0seojnlujASENPTrwpjruvGWePFkjIYiI5Mm2JO7wj7mg9X8N/EP26MpgVESMY+57smQY4mUjQGpJfD/AAXqoTnlhGJFzMh5aAD7coiQoiwWA4Oj/Ex1eacIDyRAMZH7V9/c+iS+XgFdflr/ALuD6ZQPMxddknjzzNXilIR+Xiv4T+JnrcfnFZI/EP1eXp9MXVn/ABT+pzjCeDDg63ELlCERkH8UP8mg9T8P6qfUSyideSZiK8HvErv2PjfguSOX1skPhlksfQ+yGApUKdeUAqhUAoVUBVVQCqEoCzu1ppCAVRaoBRaVQFVVAVQlAEZCWoNhaUaJQFUBBuxXHdApCpQAqqwCqqgKAVVFJJefL8Qegl58vxBhTQNBgNhpAqqUAOgcy6R4QKQqtIFUJQFCVQAqqgZ5OWA3k5ZYUUJQgQXOXI97oXKXI97AdNnRpkNWgKkqgtA13+5pAUDxQDaqhpA2gyIIFHXulUAG1MqpKoBVVQFVVACpVAFAaKqoCRbOzzbtdA0DaoooShECGTylNICApSgnsgKUBKAqhNoDa2q0gFUXSoBQqoCqoQCqFQBaStKgKqqAqqhAKoVAQdaSqoCtqqAqqEAqhKAqqoCqqgKqqAVU+xUBVVQFVVAVQRfKWAkX3SlCKFVVAVCqiCTSEkWhFCqqgAoShA5M0REgAVr2aivUchQwpoEoCWkCqEoCUKStoG6pQ0gqqoChKGAiXLLUmUUVSqAGZNMyQOeZ1D1ReafIemLClKlAKINJAVb7NAUJQgFVVAKqqIKEoLQFVCoClCUBVCUBVVQAqUICqqgLMhYppCB42Poes6UHH004HHdx9Qaxt6ui6D9nhL1Jb55DunLxe9UDyIdB1fSgw6XLD0r0jliSY+6nq6Hof2bdOct+WZuc+PkPY9qoC8uDpDizZc12Mm3SuKetUDm63pj1WGWIHbuFWzn6OOfD6MyaoCx7O71oQPLj+G5pmI6nMckIGxHaI2Rxu8X0JYoyBsDX2Oi2gcOH8OhjwHp5HdE7r0rl5x+EzkBjy55zwjiFAcdieX1VaCJYwYmPGlOPTdJHBhGAHdECte702yCBowHl/wDU0fg9XJ6N36V+X3eNPqCNChom1QMOn6WOAzMSTvlvNvQq2gc8eljHNLOL3SAifDR6CFRaByw6DHAZIi6ykyl83XF08MWMYojyxG0X4OyoHN0nRYukBGIUJHcdXqRa2gG1tFoF90CkoVAKAbVUAqydVHlCASlm0oClCoCBSbZSgFUKgFUWtoBVFraAQbVCoBVFqgN60lCoAJNivm0hbYBVFraKZgz3m62UK8b7uiFQAXnyfEHoLzz+IMKaBsMBsNIFKFQF0Dm6RQKQlDSClCoBVUIBQqoGeTllrJyywooVUCC4z0IPtdi5TFljKjSWXaQPHu6RNsmAlGimMNoocIFoJQgUeOyIWClmkQ3a7vHT3NBXuSqkWgKqgXaBTJvSkpaQVQkIClC8oCCD8lQRuFfUmkAAkk6cJulWkBVV5YBVQloAlVQFk8tFmxdd0AqVVhQAVoFSqAptVaQA5tK0gD2oBVVQFCVQAhJQgFUUlACpRXdAVArhSqKFbQqAVVUQVVUAqhUB96qShhQ2tqqAUWlBFogVQqKFKFQFVVAUoVAUoSgCxwqUICoN8KoAGgQCDaqqIKo1vtVfO0ooAlCUAISWUDm6jkNBjOfMGgwpoGmQ00gqqoAKqVQOhCUNIKqqAoKUMBnJDU2EUKqqAsyaZkgYZOz0RLz5OQ9EGFLShKIKULbQNpRSUAoSqIBKoQChVQFKCLFLxogFVVoCqFQCqqgKqqBnknGAMpGgO7hDrsEyBGYO7j2+506n+3L+k/U/PRJz4MHSyGwTojIf8J4HtKB9LbOTJHGN0jQeHP1Exk9HHd7d1iO4+HseXqZZsnT4zm8k/UiJCvboUD08fV48gkRflNSBBsfJrF1EM0d+M7o+xIBHJs+L42OMujH7Tjs45GXrQ+fxD9UD2MXURy3tvQ0bBGvzdrfGPV7IGWMg+pl2xlyPNWrvDPkxdSME5b4ziZRJGoI5QPStxz9RDp4GeQ1EIzRyS27JbaNy0ux4Pi/ifWYpwyRkTcdIx2S+ZuqQPXzdZDDKMZXczUajbn1H4lh6eW2e6+5jEkR957PJ1WQZJdNOPBmPZ2ezqNYHHEXKdiv1KAc3XQwmANneajtF2uPrYTn6RuM6vbIVp7PF4OtxnEemxwq4zERfuZlvx9bjlnoiQlDHssUe920HdP8AEceOYhISonbv2+W/C2svWiGQYdsjIgkba7e8h5vxKWTHGOQCJxxkDOJ5Puc+p3HrcWwgHZPUi/yYDtHWACRyCUBEWd1cfIlEOtEpiEomJkLhu+1+/gXnzdNkz4cmHJMbpfCQK+6y88vWy58GLJECUPPIxlfAr72g7sXXDJmlgMJRlEX5uCPY69P1Pr2REgA1ZrX3Pn/ieKWQg4R/NxjcaNeTvH5vTj6iJwjN08DPQARjQPu+TAdmXL6cTKiaF0OWMHUDPjjlAIEhdFyjknlxSOSBxmj5ZEH6mfw3/hcf9IQNMHVftG8CJjslt8znLqsnqbMWMziDUp7gAPp1Y6H48/8A4z9HDqejjgkOo6e45DIWATU79n5IHd1XVjpsRyS1rsO7M+srYIi55PhBNDi+Xz/xCeYeqTikYiJEJWKA7lnP/PxYMU4mE51tlesaHI9pQPUwdScu4EVKB2kA39B0R0vUnPEyMdtSMaPseb8OM4ieHJ8WOWsh9q+59vijorOLJt535KQOqHUnLIjELjE1KZ4vwCOs6z9mhurcewfHxxOPpcWTESMokIkXyTLzAh1/EDnGPLKWMUdBLfxEeylAPeibDTjgMjAGY2mtRd/e6oBSylAVVUBVCUBVDjnzejCUzrtBKBta2+JH8ZyTiJw6bKQeK1/RMPxefqQx5ME8e87QZIHtWtvLn6mOCG/IaHGvc+Dz4fxCRjKefHLDGNazN39CB6Vrb53UdeYVHDH1ZkCW2J7eLGDrc+SYjkwmET9olA9Owm3w+r/Gjg80ce7H2nurV36b8SPVEHFHdDbcpbuJfwoHqkosvg4PxnLPqI9NkxbJE0fNdd30sPUZNkp54+ntJ735R3QO21t8b/rrHA3m8sJa4pCzvj4+x06jrOpw5CfTHoRoyybta7+XlA9W0bny8/4nW0YAJzkN4EtBt7n3+xx6j8bhh9KY/tZN1yIO4V7EU9q1t8/quozbBLphGUjqd5ry+LrHORAGZiJkXV6X+SB17lt8jp83XynH1YYxjPJjKy8w6/rM0TkxekICRj/MO3UMB7+5L8/k6/rcOM5Z+iYggHaSeX3YlAouE/iDsXCXxBhTUNhgNhpAqqUAF0jw5l0igUhVaQVVUAqhKAEqqBlk5YbycssKKEoQILnPkOhc5sYNwQBZ0TqiLSKFFJWmkEKoSgC1KCOTEC0j2oCoSoQGqQlUAKPa0qAFVUAItKKQDaUKUBspQqAtMUSPAtAUgFKERJI1FFpBN9lKWaYUIVIWkAKmlpAVSrSAVVQCikqgKEqgBCaTSBKtKgQlK0gBDVIphQKlCAhK0qAqhICACaStJpACppUBpaSqAEoVpAoShAKEqgBUsmQGpYAqqUAJVUUUJQgKqhANqEJQFWZxMhQJHtCaQCq2hAJZLTJ0QOTP8QbixmIJiQ2GFNA0yGmkFVVABVSn8kDdCUNIKpQgKEoQImy1JlhRVKoAZk0zJA58r0webK9EGbl2NFVKIK0qUBShWkCqqgBKq0CqqgKEqwAShKAqq8NAqqoCqqgZ5oHJAxBokVbxf9WRPTjppyJEfhlwR4F9FUDzsv4fLJtn6pjljp6kYjUe0cN5eg9THHHvOhEjKgSSHuVAjaa518XLB0/pQ2E7ueQO/ueixwqB5/8A1ZhGI4RYiZbxXMT7HWHSVLfORlOtu6qoPWilIOUdJUIQ3z8hBu9Ze90z9OM+M45E1Lwd1QOPqOiGeUJSlIGB3Rrxc8v4aMszkOTICdPLOg+gqB58/wANhMQBlMembjUtb8To6R6GEZjLIylMcGZuvdwHsQgcg6GANmU5C922UrF+5GXoYZcgykyEwKBjIir9z2KgcsOkjAmVyMiK3SlZ+Vt4+nhjvaNTye5d0IHPi6SGHdsvzG5Wb1Z6fosXTX6QIs2dTy9aECJ4xMGJ4LOLp4YYiGMVEcB1Sgc+LpceImUI0Zay9qMXRYcJ3Y4CJOuj0KgRPHGYMZCwdCCxPpseSOycQYjgEOxiDyqBlDBDHHbAADwC4+nx4tIREb8HVUDEdNjEvUERu8abljjIVIWD2LaoE0mkqgBUoQFbVCAVQqAvJ139jJ/TL6nqLz9UAcUxI0DE2fBA+X6yWaPT9N6RmAYfYMv0d8EpnF0nqWZerL4rv71Mv2bDjrq5jHIeTbj7MYc2LNmxnJ1M8hjKxGWPRoNemlAdRmOUysGYjZ8ns57+Dr0nXfs/Tn9rMSANMf2+e4fP/EMmXpjPDKA2zyetGV23gx/9ZftUzjiMhjHbu02n3lA6v2314E5oyxyjc4TraDXwx9vucZY+p6zHDquoO7GBezFYmbezqcfrTjhvedg3QPwRHeQP8Q8Hjz/iP7FLHj6YynHADGd/Cb44QMjGXVdZcCMBiIGMMw5+T34ujy4JGZnD9pJMox4Bj38rwDPiy5hYnKcanCc40TLwn4QHYvT1U5YckTPdIzG85MdyMT/BE38CBtn6gxlDq88CBqccNIyBGh3eN9nnnsyYjh/Z84jImdmWlnvfh7HLP+IQyYZnqIz9WYqIMfLH+n9XsH4nHaJRhnvZsA2+W/FA4sPSHq8Po5jU4VHCSCPLyff82s3TZfw8nqOgPkkNshRlVck37WukPX9VKOSox9LSsm4Xfd6ulhmhEjPkjOOO8m3BLdKV9iPBA83Fv6qgB6eOxPLKWu6fs8L8H0ut6aHUZjLqMsfQxfFjqtu4eIeSebNGUt0TPFI+p/KHmgRxGXYe0I6LIPxKcozIicteuLrdXGz9UDPMOoySljhCRykUTGj/ACvsiuPny5z9GW3B1E4mcY/GdNm3/dkePterJmjjyTjPJH1BHbKUZCvTH2Y/+VHp6PpY9VOOeMDHHGBhWWI3SJ4l4H3oG3R5Mk4dMelgYYSZbwNaHa/m+acGbq+jMccTOQzS48HfAY4MmLp55BA9MTKZJoT3eH+bjLp8JJI6fqNSTcZaH2/NAj9kzdN0OYZYGG6UKun63HwPc/L4MX4fkMo5hPEYkeXLk1fqYUBpxTGUJDhP4g7nVwn8QclNQ2GA0GkKVCUBLcXMuseEClVWkAqqgFUJQFCpQMsnLLU+WWFFCVQMy5ZHYuWQoG0To2+X/wBcdNA7TPX3J/666XXz8exhT06HPcLb5f8A13038R/5JT/1z011uP0NEHqJfK/676Wr3H/kqPxvprrcf+SiQepEjgJfJ/696XncdP8ACVH470przHX/AAoHrK+UPxzpbI3HT2L/ANe9N2J/5KB6qvln8b6a6s/8ksn8b6aiQTp/hQg9ZXyv+u+mHJl/yU/9edL/ABH/AJKEHqFBF6PmH8b6auZf8kr/ANedKDt3H/klA9NL5X/XnS18R/5Kf+u+mH2j9CB6ivkn8b6Um7lp/hKR+OdP4y/5KB6qvln8c6a6uX/JR/150xBsy0/w/wCaB6yvk/8AXnT/AOL/AJKD+OYNfiof4ShB69rb5H/XnT6fFZ7Uv/XnT3Xm05O1A9dXyP8Ar3p/CX/JWX43hGgErr+FA9dXx4/juGvMJe/b3+lP/XuHTyzs9trQewi3yP8Ar3B4Trx2o/6+w1e2f/JQPZQ+P/17iutsvbpwgfjuHnbOvcgeyr44/HcR02Tv3KPx3ET8E9OTSB7AS+L/ANe46vZP2aJ/68xg1snffy8IHsq+MPx3FzsnX9KP+vcfGyd+FIHtWtvi/wDXuO/gnXjSP+vYV/bnrxoge3avjD8bhdenP26cIH47D/u8n0IHtIfG/wCvIaD052fYv/XkDZGOdDvSB7Kvjf8AXkf+7yWeBS/9dxuhiye3yoHsWtvjf9eRq/SyV20X/roXXpTv3IHsq+OPxuJs+lOh3pT+NV/ucl9v3pA9hL43/XWtDFk050Qfxo1fo5NeED2rW3xf+uJXXo5L76J/64lqfRyV7kD2bW3xT+MTH+4nZ/fwSfxed/2J0OUD2bW3xP8ArfJV+hP2fvST+LZQa/Z533/ekD2bW3xv+uMmpPT5K/f2J/61y6D0J2UD2LW3xv8ArXMeOnyUFH4pn/8ASfJZ4/ekD2QU2+N/1pnHHTz9qP8ArXPV/s8/Yge0EPj/APWfU8Dp5X71/wCs+o5/Z51+/sQPYtNvi/8AWfU/+k0rPtT/ANZ9RenTzocoHs2tvj/9ZdTV/s8teF/6x6rj9nlff96WIPYtbfHH4l1PP7PKv39iP+sup0/8HlaB7Frb4/8A1l1Jv/weVDnVf+seqq/2eWvGv+TAevabfI/6w6m6/Z5e3X9/rQPxHqBqenlXvUA9hbfH/wCsep0H7NKyg/ifURsnp50ED2leToupPU4hlqr7PUEAslJLMiwHLm+IOgeU5zPNLHVbK18bekJFZoGmQ00gqqoAKfyRLhP5IG6qrSChKoAVVQIky1JlhRVVQAyWmZIHPleiDz5XfGwuxqlCogQlkRA47paAqqogVQloFVRWtoBVVQFVVACUJYBVVaAoSqAFVUBVVQFUoQJ9OO7fXmqr9jSVQAqVYAKlCAqqnVoFUXaoCqqgKqqAoStIASqoASqoCqFQFKFQCqqgKFVAUJVACqqAqtLSAC4dREHHIEGVg+Ud3oebq79Kdc7ZVXuQPlOqlHp8JwDBPF6lEGcr4Yw4xjjLp8sh00yPNKeu+J4FdkZ+knPp8eUTM50d8JSuQ17R5e45+phkrqceDbCMZSkYamPgCeZexoPQn0X7R0kMWOQNCEhKvi2+HvePL1cMUyOs6Y4o5/LOcp8gewPLhnLqMeafm/Zjk+GH9weFeAT6xnijCI9XpjYMR5s0R7fD2IFfh2bL6WTBgwmWKU5D1N3APsI7B7MH4L6XT5emGSxkIN1xT5EY5OhnuxkyxT8p22a3fZ9k30Om6KW/0zIwwZtRjySPq+X99fYgR0nQ5uthLLLOQZXilpzGL3ZOvh+GyxdNk+DZrPXt7Hm6Trs+PEc0478QMoiOMUY7e5ef1c2LKJxyY8cOoBzA5Re0eB0QN4dTg67NmyZjv6fHESjd6eNDlz63rc3kjHJLFImMY446jYeJX4+xy6jf+JSh00CJzifPmxjyUeOE9T0fTRhEdEfU6mBjuEZbuOdPC0Do6vPKddLgzzPUw8u2q3n2n3Pm9ZnydLP04YxgyaGUscrMg9Eup6zJMYurgZRyfYEYxMq8CHTN1nTw6mMs+CUMgMfNKfAHBpAy6bovxKI345EQyETlUx5r8X0cnTYZ5vR6XHGE4/HliKlC+DF5+r/EsxzRjGfoYzGUozkLE/Aj3t/h/VY82MkZRHrMooyrwOmnHCBHV9EcGU5seLFkxjHUt9ayHJ/qeLph1nVkzwz2QBoR37QB7AX1Mf4NOEJjOfWgd2QY9u3z+NuHVdT0IhAZIA5ce2HpEm4+y+9IE/jH4cBiicdSlCzOUiN5/NjP0fWQEThzSMPTEiJZKI08PB3/ABH8M6mXUDquluU5EaR+zQT+GHPmOTJnxmcgJYzkMh2+x/mgcv4X0MsuSPVZjCWM6y3Ss+y36yPGj8xh6bPiGSP7IDjyGJ2HKNK93L9Lj0iBVacMZTQvPM6h3Lhk5DkpqGgyGg0gUqqAtxYdIoBShLSChKEBVVQFVVAzycstZOWWFFVQgSXHI6lyyIHnfg2KE4TMgD5zyH1f2bHVCEf+SHzfwT+3Px9SX6PsBSDL9nx3e2N/0hf2bH/CPoDuhSDP0Ifwj6F9CGvlGvsDqlSDH0YcbRXuCfSjd0L9zqqIZejDjaPoT6MP4R9AbvX2JbIMTggfsj/khJxQ/hGnsDoL7oMbNqQZjFD+EX7mvRhxtFe5uk0gR6MLuhfuCjDCqoa+wOioGfoR/hH0L6UPAX7nS1vxQMvRhxtH0BPox5oX7g6GMSQT24SgZejHwH0L6UeKFe51VAz9KPgPoUY4jQAV7nSlQI2DwR6YPZ0pUCPTj4D6FEB4BtUCdgXYGlQJ2DwC7Q0qBO1drSoEbAnYPBN60lAnaF2BqlQJ2BdoaVAnau1pUCdq7Q0qBIj3XbXDSoE7V2tKgRS00qAKRtaVAnatNIQBSKbVAik0lUCdqdqVQBSaSqBNLtaVAG1aaVAmlpKoE7U0kmuVQBtQIACm0XqgDatNKgTtRTaCwEbU0lKBBj2efqx/Jn/SXrebrP7OT+mX1NBy/g9/smO/B9B8/wDB/wDhcfufRYUWZNFiTAeTCX/hWUf0voRfNhX7Zl8ai+kGlNAlAaRBVVQBLhr8mZNoGqqrSCqqgBUoKBEmWpMMKFVVADMmmZIHPm4d4hxyO8WFKjfdpm6SCiBTbJS0BVbUIBCqqIKVVoFVVAVVUBVVQFVWkBVKoEzJAJAs+CQqUAKqoCqqgFUJQFVW0BVVQAqUMAAbFpVF20CqVQAo9qqgFVVAUJQgKpQgKEoQFVVAVVbQFVVAVSqAKVKoAQlUAOWWJMSAaJBo+DqXDqK9OW7UUbQPmpYI+pkySyGE8BqWaIuUzLv+mjgOo6j8UnOAgMgEfKJyoRPG4X3fU/DPxHppYJbInHjxVZnLdz7Xm6jrun6/DZxHJtJJhCWoiPtH2FoOT9uPT9NLpRH088ZRHkvzAckl6fw/BlyQzdRhiMYyxAxbT3H1Of4f1kZE5ssCMcAYQyk6QBGkT4ku/wCE9QD08NmURGIynmG2/Lf78IHDH8Py4SP2uZjjMh/bluO/sa/V7OsxR/DpRz+pky5RfpxmNw8DZ7PlY83pZJ9R0uWsspmMYiOpjLvZ0fVH/WEMmHFkzmEsu6/KPLSBj/4WMs8cY48Ynj1juIh5u4P8TuOjwdFjhn6qRybIiOwmM46/wg9muo6yGaf7L1uLzRFwuXxH5cW5Yfw/Pl6iJ6nFtwQB2w3WIjsNNeUDTB+JD1Z48GKMCQNn8vbr/irsjrhmxdPulGEc+8H+VyY+39XLp/xP18+6A2ZTpQN+rXET/D72AZT9Tq8+WWOUZHHtjHdp/D7vagdX4f6fVz/bMplGcdTu0x6/w28XXfh4xxicmQHNOdaz0ETx7XswjNk6YHFjjkxZOcM5UMdeHv51Yy9J/wBY5j1EQPThERAJ5nH7PjXtQD0HUZT1EOkzRgYRiRGW3kR7glHW9JkxdUeqwSx7o0Y4vtcV8Lcuu3ZceLBih60ISHmkYiHiIngvJ0mIz9LrJTlPqZSO2Joi4/xEagIA6XFjyCc+uGWEtZbr2RPsF9/Bjp+oOTPHJjxSnixgwiNgMvZu7EuuWHW+rOOfbk3RlIRnImEfdf2h2dfwnOMWI4emEpZ5HcRkFRBHtQL6To5fiGSWXq5ec1/LhIxMfeGMUP2PqTPBhyjHtlAk+Ybr+L3OnXyyeniyzG3JKVZJYNSYj2runmqRlMRAIrg/MeHiwpxHOYyzHPkjOBMd8YaGf9J9j9dhowiRxQp+Zw/h8Opnkl1NY4x264yNmvgS/T4gIxABsACkwWXHJyHYuOXkOSlhuLAbDSFKhKAukXNuKBSqrSBQlCAqqoCqqwGc+WWsnLKKBUoQIcsvDsXHKNEDg/A79KXhvk+yHxvwT+1P+uT7A0YUpBRIbhoaQfENIWEsx9rSArY4QqACAdUsQkSLkKPhdtWgUm2bX5oBTbK0O6BasvF134lj6Lb6t+bihbQdyuWPNHJAZIm4kWCHTcEQKWbW0CrVm02gUqLW0Agqi1tASa0Si1tAEZbhZBHvaRaLQKQi1QDa2hbQCm2beDr/AMSHRGIMJS3fw9qQPRVxw5o5oicDcTqC6hAKqqAqqEAqqoCqqgKqqBnkEjWwga62OzYVUAoW0IBVCUBVVQFVVAVVUBVKoAVKEAqqEASF9yPclVQEswJI1FNKgFCIyEhYaQFVVAUJYy4xkiYkkA94migUqqwC8vWn+Rk/pl9T1PH1/wDYyf0y+poMvwn/AIXH7v1fQeD8K/4bH/T+pe5hRLEm2JMB5GP/AIvMf6PqfSD5mE/+F5v9P1PphpSw0yGkQVVKBJbpgt0gaqqtIKqqAFKUIETDLUmWFFVVADMmmZIGGR3gLDhld4cMKXS0kJRCaUA92ktBKU0qAhVpKIBKq0CqqgJVVQFVVAUoSgKEqgKFVAVVUBVUoAShUBVVQFKFQChVQFUqgBUqgSTrSUoQFVVAVVUBQlUAKlUAKtKgKEqgKqhAKqqAqqoAVZGhaoAN9nLPew1V0fi4+bs49QAcchI0Nps/JA8Lp+iz5csMmQYfS13DDxL36UaeHrJdNlyTEMWeGTbQjjEYR9hIHZ7ceX08GDpOnnpl3AZgKIrXj7nXqxLH1GOUicYOyPrDUzP8BHYe1oPJ6PpvKMuCQxnH5cwz/CZH2cfS9fW5IeqMwyYjix1L04fFLxHtcvxnrMY39NhhZmbyyo/ECz+H9BigJxyRjkziOmOVbfZR9oQPQOfpI9RjnOOwyx7hI0IgH9XzvxPLKczDpoyPrfa5E9tfB4e12/EMeXJ0t5cUIZBKGOGw35fpKZYs3SdFOOYRjPCP5M4zBlrLX3aIAyx6Xoun9bEDKWQekTuupVrz4OP4ZPqOtrpsoMunAqVCuBY1GvLeH8HnLpjLPOQ+LIIRIIOnPvLt0GHqDgjCUYYMMgDLLAmOT2X7Sgb/AIX0h6PpzlOKXrVK4dzR00Lz9H1WbLknnPTyyZIkwBBAER/CR4+11hnGOWbpJZDKEIXHJuvITLsPH2PnY59JjBkJ9QKPm003e1A9DqckIACXTk5Opvfj9Sj5fd+jOf8ADsHXzHVbwMcAIyjtOmzkW3nzT6yA9OOmXTp5geaBHxbj2cus6OZnHLiy444wIg7p1EzHN1ofagV1vTRzSwzw4vWwRhICIND2PL0fTdT0+UZuivNh03EeUSrkaunW5Yznghu3+WQnHpZd/Z7HHp+n/wCr+pjHqjIQuOyUTUL51/VAHU9RLLm9LN1G2I89VeyYPw+2k9T1OTDjOSOUxlPXcB/e/wAX+GmvxX18mT0IiE4z/mROOOu2+SR973/hfSw6YbMuTFk9T+2Ad2g5rcPqQObNHJ0eD1BkPTA3twjXze/28u3V4t+LF1Uspxy2RjYF2ZfmjqvxAdZhEcMNxMjHJjoGYj4jw97x9VmzRljnDFPHjgBi/mCxR/flA6DiE+k9DPlliOEXmiI7viOnv+Vv0XT0McdpsbY0fk+Jin6OXL0WOUYmo+lvG6ydTfi+7iBEQJc1rTClkuOXkOzjl5DkpYbDAbDSBSEJCAluHDBagdEC1VWkChKEBVVQFVVAzyMtZOWWFFCUFAlxyOpcsqBw/gn9qX9cn13yPwQfypf1l9dFPI6n8Ry4pyhGqBoWHH/rPMea+hy67+9P3uFPBNn0FSsLBH0+GRlASPcB0cem/tx/pDu9z59tQPDn6nLHIccMe6ntnZBrQvnHHPqsYAmYyHln++jm07HTLS1toQfxKVGcIXHuSeCg/iWTT+X8XGvLyXkhinhhEGIOsnbIP+H+X6OFjuenhVf4r5RUvxTKDrAADQg8uuX8Qywns9Pn4deXLqYyl1BjAiGl2Ty5znuzYomQmYmtwSHGrh8VodA/EcxkYDHchzGyzj6vJiIwxxUeREk23gH/AIXkrw/JnpoZMvUmeTmGjVOBmK4+lYKT0cE5zgJTjtPg8nXdZPp5ARwyyWOYdn0AHzPxYGYx4RIwE51KQ9z1PI8Webg/Ep9PlljGDIBLzxx9x41pw+gfxKRkIRwzkQBKYFeW/reTB03T9D1cImczkkCI7uHr6gQhlOXHljjyUN8ZaggeIRDHP+Mjpq24pSxn4Zg6Ent72P8ArzIDIywmMcYBybpVIX7HkzRlLpMU56b82/6S9X49jxjFvMCZHy749vf4qAaZ/wAang1lgntuhK9DfCJ/jeXFHfPp5iI7kvn9b1mTNghilinAboeeQ0+p7/xs5zjjhxAGOQ7Je/soAz/HcsIerLp5iHO69HQfi3UyFjpZkH2o/E8Xpfh8sZ12xiPvDHVRzZsmHBDIccJQ3GUebCBU/wAbzYiBPppgyNRuXJ+h9bp8kskBOcTCR5iTw/PdT0M+mzYDLLLJc683b736aI0QPJ6z8XydNl9P0JSBNQlY83ucY/jWeUzjHTS3x1lG9Qz+Mx6k58IxRBiDcT/i9rH4f637bm/aKE9sb28KAbYfxnqM0d2Pp5SHGkmz+J9SBZ6aVf1B4uhOWPRz9A1kE5Eae1mU/wAQ9COc5QIS58usQe50UA6j+O5Rj9Y4JDH/ABbtH1Oi6nJ1EN2TGcfgCb0fA6zLgwdCOmhkE5ace+36Pp/gj7ggY9d1WTp4CWLGckiaoPHH8UzUYSwkZwAfT3DUHuC9eQyOSeIyI3RuBHbx+98b9ny/h/UROM+tkyxPx6HyoGw/HcshIjp5HZ8fmGjQ/F+onEZI9Odp4luDydFvOLqzk0lZse2kdSI/9XYRMGRuO2Pj7EDTpvxLNhynFjwE7/PHHu4PevY/R4ZSlASkNsiNR4PzXRYv2LLCeXAMe47RKM7IMvY/Tg0gXylkFpEFVQgFVQgFUKgKqzDdXmq/YgUhKGFFVSgKEq0gqqoCqqgKpVAUJVACpQgKUJQGlVBQEgHnsg+xpUABKEoCqqgKqqAoVUBLx/iF+hkr+EvY8f4hX7Pkv+EoGf4V/wALi/pe4PD+F/8ADY/6Q9zCixK/k2xIIHj4f+Lzf6fqfTD5uH/is3vj9T6UUU0CUBKIKUJQJLpbnJtA1VVaQUJVACqqBEuGW5cMMKKqqAGZNMyQMMvDvj4cMvD0Q4YDReFW0BVQrQEJVBRBShKAou+E1aAABQ0DQICVSgBVVAVQrAFKFaAoVUBQlUBVVQChVQFVRKQiLkaA7lAKqNVQFVVAVBVKAE2hUAqi1QCqqgBUqgBVVAaVVQFVVAUJQgKqqAqpQwBVQrQNKqoCqoQFmQacs3wm7qjxygeX1mPqcZlkjmhixDjdjva+d0/U9TmxerLqowBmccbxjUh0xx6X0vSM8xjm0l6hFwrx/htww4+q6SZ6XH6RgT6kJZRY14o6Dd7g0CfxPN0mXIOozDIcZ2+ltozvuD7HPp8+PFj/AGbqh6GXHeXHklcqMuNBzp4pxT6iOXOJzwCe/wA/qAc19m3yuoiM05y6cSlCIuROteJ93ggez0/SmWYTxT9DMYnzVvOUd56/Dfg5Y+ixZPxE4+ryb5WOY16lj2cN9ZHHl6TF1GOV5IDHj0Ogvxerqs3W4ISlURPELnkMNJ3xt93dA839r66J3wkTiGT0oixWh+F9TD1OXr5z6fPgjsiayebg9nwDHH1WQ+lL0/LuO83uyd6rx7Pdi6uOH08mTyZOnBjLHI+aZl3Hu9qBzYsceonmzYgMPox3xENdRo9uP8PjljHHPPPdlj68o7dCfG3LHmllzZhKQyDJi2yyYx5YC+Ze7umHU/iOOUemxecGJ9OoDzQHcX2QD0/4jiwdNjEZyGTHuOyvLLXu7RhLJLb6cDlI3/s5P8vaft3fxHweePS4Olwk9dhlDJ9ndMjefAVxTWPL1Ucg6fo4SwwIGTYalz9qzrSB2wwfs0h1fUQjh9LSMcFSMt3jRt56PU9TOXW/BihHKMcDvifl9b3w6CODPDIcfqZDu35roX7va+d0scuLq8mPBiOMzgAfNe2z8ft9yB1ZumGTAZ9JOpSIMd0hEwh/CP4R7Hml0kujwRlkn5a88hK5Q/8AF+/u31P4TLLikRhvOJjz7vjHc1wPc7Z8GKOLEc+ARxQEt3mv0/o5QOD1en24+n6Y5IzMxumRtkYy9rfW9PEYZyjkzS9OcYkTOnvHi49RnwZZX6hM4DdDNtNmuIV7PF7cmDJl6QZup6mXpkRlKO29fDxQDg/FeiwxBEck5R1OSUQZfTb9BikMkRkHEgC/K5o+r0+P9lgMZzyljlGJ+KvEl+o6SBhihCWhEYg++mMps5ZeQ6uWXs5KWGwwGw0hSqqAC3A6MNx4QLVVRBVVaBVKEBVVQM8nLLWTllhRQUoKBDjm4di45uEDj/Bf7Uv6y+uHyfwT+zLw3yfXCBlLBjkbMYknxiGY9NjA1jG/6Q9CEWWTAdhwNG1CWkBy8fUdEMst8ZGEu9d3tVjU6lrZ1xR5v7AI4ZY4E7pdz7EHo5kYiOYUD9z6aqEb9yxz5umx5hUxf1vJL8PEZwniAqJ8z6dLSgivZaM4cfTSj1Esv2ZD8nTNglYyYvjHb+IeD1UhQtBzcyCN1ryxn6eGeBx5BuieQXVLTB4n/U0OlnHN0wMpxPwyl2Ohp06v8Fw9QTlr+bXN6EjxD6ytkh5PV9Hl6rBAUIzjKMjH3PozwxyAxkAYnkF0pNMB5/4j0Uuow+njoEGMh8npy4I5oGEuC72qB5fUdLn6np54J1u4jP8Ai7/J3zdKcmOO3TJCjE+38i9q0geb1XR5OoOGegMJCUovpAKlAkh8+HRSh1U8+hjOIH0PpMkGxXHdA8/8P6GXTxMZmzuJBHg95xgijqC0PalA8nqvwTDPHKOCEYTl3p9HHjMQAewdVQOXqukj1MdsiQRrGUeQXk6b8J9HL6+Scsk6oGXZ9WlQPIxfhs4ftESRWYkxPhYaH4Zv6WHT5DUoAVKPaQ7vqKpB5WLoTkzjL1EP5kBpOJ8svlzb1db0p6nDLEJbSe710qBh0mA9PijilLcYirehCUBVVQFVVAVVUBVUIBQglDClqgJaQVQSkFAUqqAoSqAqhUAqqoCqCaFlKAFVUBSzaUBVVBvVAUoVAKoSgKqqAFVUBIeTr6HT5LP2S9BIBAPJeX8R06fJ/SUCfwwx/Zsdfwh7d3seL8PF9Pj7eUPawoL9jMifBtiSB5GH/isx9o+p9IPnYL/aM39Q+p9EIpoEoCUQVVUAF0cz2dEDRVVpBVVQFBVUCJ8Mty4YYUVVUAMyaZkgY5eHeHDz5eHohwwGiUBWgVCVQCEIiDEUTZ8UtIKUJQFKFQCqoQChVQFVJVgFVQTTQFVVACppCAVQlAVVUBUi+VVAVVUBVVQFKFQChVQAUNIpAQUm+yAEoBQlUAKlUAKlUAKqUAKlCAoUqgAlCVphQhKFaQVShAVVUAOOckRJHNGndxyjynS9Dp46IHyWaGbL0EeogdZbjnlu1lRqNvYMnr4odRDzxxiMZY8mgG0ayj7fB84dTi6SWbFPDIQmIj0zOiK/N7c/T4usiOqhH1ICAxbYk+Q/xE99vdoNPxDqulGMZoYRkyZRviZQv6XgyzzDPHBDFijK47vTsxkD2lXbxfQ6H8QyQx/s/TYT1EMXlOSB0P0vnfteOEYz6Een1E5GEobrNdudOUDcfhv7RjyDBKUckZ+eB8uMS71XYdnTqhDH02PH1mSciDLd6Ut1+97el6r08E59Xm3EHbLy1sJHw6cuHT9H02PoMhxzG2YIlmo+Ph7EDmz9DgGLHn6i42Ywh6VcdjL2+JebqIYjll0nTmzM+fLnIOseNsmvxPKcuPH6UvU6aGyJ7AyH38MYcX7ZkEun6WOzH8cN+kr4QOmGPIMGSHSiAhtkJDIP5x8eO38Ln0+bB6PonHnJ03yHII7DwHsd+l6HrxnlnyExkI6ag7q4j7A8uLqTHLlObNPBKU7MIDcDft+5A6d0ejPUGB3REYnFLIdwJ71fLcMmGXT3tmMpmJVfmGnxePpj6HXro9PLGemxwG3EN05VrjEu8fEly/EZZMUMcsUI0RCAy7qlKP8ACR4S7oE+phxdXhyyyxlKW85pRn5LrTTs6x/Fc2XqJYoYzESiBG4/CT9o+MXTN+GwMIZfSxwyx5xWBCXvN9nkz9bnHU4hOMMZ3REp4pXcf4SeK9iBXVwn0eSJwxlPqpjeZR1HPm8mv+Tp1+GfUdNk6nOCKG7FjIow7G/G3q6rFm6qGQ49gyRlWOcJebZ3sji/Bw6EZep6WWLqpVEit+658/avhAx/b+ox4oemBlEalLJCI27QNY+8eLr0ssfW3CXTTjizH1JTM9NOOHpP7P0QGUSJxSrFtjWyz3P6vJ+y9Xj6j1MGSHpm/TgZ6bfYPYgY5vw3p+nz5BPETDaPRjZ80u4B8X6PpY7cUBt21GPlPbTh+fyD9mkT08vWnEXeY7o3/wCU65l7H6DpZynihOYqRAJHtYym7jl7Ozjm7e9yUsNhiLYaQKVVAS3FhuKBSqrSCqqwBVUNAqqUDGY83yQ1P4vkywooKUFAguOYeUuxcc3CByfgn9mX9ZfVuhb5P4Jfon+qT64QCJC67qmkBAKUWov5IBCqj2tIFVW0AoqlQdRpogFFAcLaEUNpZA7tICgX3Umha2iBVFraAUspQCi1VAVVCA2kFCsBSLVaB1aBA9qVVAKELaAVRaUAKqoAVVYUbShbaQKotUBulVFoFIRa2gJFoSSgMKEjcKPCSkK0hMQ2GbW0ClRaoBVUIBVCoBVlbQKVFraAUI3LaAraLW0CrSxadyBSs2oNoDt13eymkWtoBVC2gFCL7JQF4vxL/h8n9Je14/xAX0+T+kopP4af/Bsdfwva8X4b/wANj0ryvawALMmmNwkLCB5WD/iM39Q+p9EPn4b9fLf8Q+p9AIpoEoCUQKFVAznusbaru7ufd1QLVVaQUJVACpQgTLhhs8MMKKqqACzJpmSBhm4d4cOGXh6IcBgNAlCgVo0BVVRAqqtAqqoCqqgKpQgKpQgRMpibSQoYUKqlpAKlUAKqoApU0qAFTS0gKqqAFVUBShKAqqoCqqgBKFQCqqgKUKgFVVAVVUBVVQAqVQAqqgBKqgKqqAoSqAAqUIAcs3wS9x+p1LnkqteED5XH02XL0WHqcYE54zOUhIbjL2V3XH+FZcX8zNvlDJzj6cmJBl4iqp6Og6/COpnDGZDDLaMUaqIPf2BnqsEsWbdLqMnpT42SsiRPFXw0GfU5sHSiUcFwy9NUYbj8d9yPtfN16KU8mIdYIbs+SRxbogbY1xIxfN6/p+nxnJGM8uTMCPs2D832+j/DsfTwIjlltyR2/EKEj4e1A8TLCPTzyDrYTlOciYygdsT7a973dJ/6jMOPfinLNmJiYX4caFrpeih1AzYM8pEwmNkpfHQ8L7eNN9VOGXPkOMmQiB6p52Dxx/4vFAj8b6aGaMTCJHUUJHH4Q93DydJPL0eCIwebJ1QuFV5dunflEMv7DMT3GeWZobjuHpS8fCXse31j0+XqjjAM4GHowIvka7Rz9CBOGeSG6XXYpepOJxiZlW/wgANB73mPT5MuSJ9M5oY4mJxDT0j2iT3pyzdV1XT4zhnsnCVy30ZUZdhInQj7nowdZE4I5cF/tGICGw/bvk19rTuUDs/CIS62E8mfET6g2yyX8YB4ocV4uWbpumwdVGXV5d1ADHjMCKH2dQe3tRDof27eSSMwHlnjNYifZ+rHUdX1HSxG+eGewiBiADOh70DX8T6KX4hPJsy754uMO0eW/a8/RdZ0uWukz4YwgDoNTc+HukZ9dimBOEBnr0RxPTm65fO6TrLyWTEZ4eQmtJxj9mI/jPigdp6c/h2Yx6aRMslyGDiNDk3/AIeXk6XFLqcufJjmcwG24yAiMnsPhSZjIBnz9RCUcEpxJxnSfsqXau/i6fh8f2nFnyzIyyyRG7Fi0mK0QOfpekxyw31GQwx+tt9ICxf793tEZRzSHRwGb0zt8xr0ge0ddXn63DGh1XUYpxxREcQxE7ZWPtXx+rOLH1eWI6npxtjj0wwIEjKMude9e1AGfpz0WbFhwzlkyCW8Y5aRBl7X6rCZGAOQVMjzAG6L8v8Ag/4Wc2M9QJAT12f4ZA8+1+pwxlGAEzukBqfEsZS3HL2dy45uzkpQbDAaBN8NIUlVQEtR4Q1FApVVpBVVYAoVWgUqqBlk5ZaycssKBBSyUAOOXh1LjmNC0U5PwXTDL+uX6Prgvk/guuGX9cn1ACiFGTJ1+T4nU9XmjllESIALl+25/wCM/S8+Z6VkNrU+iJ8Gg44CTCJOpIDs9DzNQDupNM1RvxeDqZ5xM7ZxjACxdf7WNwarXk4PREwRa2+Keq6jJjOaEgIx0l/kzPqOqiIEzHn40Zy7Dt7L6o9zctvg5MnUiZiZndHw7uvUZupxSj5xUuAGcuwez/vLE9atOTy1b44ydV6vo+p5qu6XJPqseSOM5NZcU3l2E9n/AHl1PZBSTTz9NHJGNZZbjfLy/ivUZcOLdiNeYAyq9o8XZxahwehby9d1n7LiOQDcRoB4kvmYeq6vOJRwzxyMJVvI0kKeLJn67q8GSUjDZAndprcfBEPTx9b1sfPnweX/AAHzD5PpYOohmiJwNgviYZ/iWXHHLvxCJF+YPJkl1fSGWeGTERMgSENRZ70gfV7lNE2eQ/M5+s/EMGQYzKBsbrjHgO2bN+I4cRzHJjMRroOyB9DuXc/OZ+o/EcJxg5MZ9Q7QRFfW/ET1H7N6kN23de3RA+j3MmWvsfDlLr4GpdRhB8DEL+HdR1nUZZCeSBhjNS2xHm9xQPdBPdO5xy7jAiBqVaE+L4Qy/iB6g9McsNwjuvbogfR7l3PznTZev6iWSIywBxnafKmGb8Qn1Eun9WIMRuvZogfRbgu4PzufP1XT6ZeqxxPhtc+j6nreriZDPCIB2i48oH024PB+IdXlw7Y4IiU5naL4fL6nJ1+CeOBzRPqS2/ANHP8AEI9d00BlnmEqkKrGBqgex0fV5ZS9LqYiOSrBj8Mh7H0BK35frY9bgEMsswlUhVQqrff6WGSGOs0hOX8QFIHSZI3Pl/iIzxPqQzxxQA13Du+Vl6vqoRE8fUxyAyEPLEaWgfVWgkPP00ckMYjmlvn3lVPB+KDqsYlmw5dsIxvZttEPV3Lvfmuoy9Vg27+pJlIbhGOLdovS5Os6mcow6g0BGVnEBz7DSKfS7l3PzvSS63qt9Z9uyRh8A1azR6jCaydZGJ9saQPoNzx/iHVS6bBLLAXIVQ95p8Tp8nV9Rnlhx9SDGMd28RsFMMXVdVky9PPqDthQPlGtoHodP1PV4Zxj1giYzNCUPsy8C+sJW/Jx/as/S5css5IxmUTGudr7f4VHMcQy5shybwJAEfCgd2beYSGL46O2/F4Omy9RhmMXVkSM/gmPH+H8nbrcGTKB6WU4quyADf0vz0I9R1PSz6ieeXkJIjtHMeNUD60TTuD87ihmOCPUZeqnASFnQPLn6vIMZydP1cslGMSCK5QPf6vL1McmMYIgwJ/mE9gz1sOqyGP7NOMKvdu+58rNi6rH1GPB+0TIybta4pwn1QxyMJdXlBBo/wAtA+i6Pqjmj5xtyRO2cfA/kez12/H4ZZMnUQGHqJn1bjKW3afL7H6vFEwgIkmRAoyPdA03Ujc+F1UM8usGGOecIziZ6dq7PJeWHUTw5eqnGMAJCRrW0D6jcu4PzXVwy4enPUYupnMCq4o2U9Ziy9NhOQ9VPdt3CJrVA+j3W+XnHWYcss8Z78Q19Kta717nzepj1GIYSOoyEZTEa9rFo6v/AMGyenPqc0p8kQjdIH0uLLHJETibBFgtTlQt+f8AwXpp5IjKcuQRjM1A8Ee33vu5oGcTEExJFWOQiHidL+39VAdRHMICV7YbbFPodN1k9/odQBDLVivhkPGP5PidF0mSccsRnnCOKUoijp83kyYpz6OPVyzSOSJ0iSNNa96KfZ7l3PzvVdPDpICWXqc1y4A1Lx9RkEIwlh6jLIyOsdbEe50QPc/E82cyxYOnlsllMvP4CIYhHrekG4z9eA+KO2pfI/o+V1/R7MUM8M85gyG0k+PcOvV9Ni6MgZepygniI1KB9Dg6mGeAyYzcS67g/H4cETmxY+nzZBjy7jL7JBDrDpssj1F58v8AJ+Hzc6E6oH1e/Wk2/I+mR0g6iXU5BkMTKMN/P6t9X008WLFlhmyn1JRBEpcbggfV7l3Py8uinHrI9N6+TaYGV3royemJ6yPTQz5DExJJEtQReiB9XaX5r8P6SUuryQOXIY4jEx83PvfpQgLyfiH/AA+T+kvW8n4h/wAPk/pl9SBP4Z/w2P8Ape14vw3/AIbH/S9gLALMmmZcIHlYSP2jLX8Q+p9APm4T/wCFZvfH6n0ggaBLIaQFUqgSeQ6ufd0QLVVaQVVUBQlCAC5uhc2FFVVADMg2zJA58vDvj+Ee5xy8O2IeUMBqlAS0BQlUQCVUNApQqAqjaLvuEWbqtPFAtUKgFUKgKqqApQqAVVUBVVQFVVAVVCAUJQgBU0tMAEhVQFVVoFCUMAqqoClCWgVVUBShUAqqoCqqgKqqAoShAVShAKNUoQChKEBQlSgAuWQWDXg6FjIaBPsKB84MPUY/w8dMMRlORmDqPLrdvD+zZOkkMko/s0BDZInzbz3Hs3Pq482XruljLJKMIEyGaXw+UH7Pg8hwZDP1xnwnFEeiNxsbfq3NB0/gWfFmGQYMQxUY35rtw6jN00sJxdFETljMslDTZ/j18HLJiwZep6fpMYkMI3DeDW/3EcsZPw3PggcUcmP+UTmEa83z9iA4cXUZIDruqzSxgaQltE7EvcdL9zXRQzY+qyYsOMYd4gJbJX6Y/iHjbz5usw/ikccMnkygfGTUPbp7eyOq6KE4R/ZMeQZrPqQJuQHYn2HsgdHS9NHB1E8PU44zlU80ckuTX5uWLP68Or60ARyxEDAjmPbQuXVYMGLp47oSxdRujE+pI2Y95e5PTxy9NDqJ9NliY4xHcdl7vpQOnFPB1WWeMaYBi3kVxk7yA8XX8LlE45y6bHA5MZEcc5+UyieSXsyY8fUzEepyRljGOOQ4uCDXxX4PiZeu6YzOPLD1cUDWHbLbtj+qB1dNmy5ozh0oEJkVPGSYwxjtKJ8TyXqx4seTpycePHLLA7Mspgc15iD3Ph4txEOtxftg/lQPlzXruhHtpx8nl6LFjlOXQzx3iymWXHIk1Q+H2lAGPo59X6McchHp4btmQSAyUedGc8R0+aIyQAyz24/KPKIk6TB/7x5h+F5ek6yGOMtpkahl2+x9aeXD1kzE5twxxsR2/DOP2/8AJA5PxD8P6rMPTGSBx4/Lcshs/wBfa3r6qQjvxYICEYgetLHHbIg8bCKsvF03kGSfVj1OmykSOY6cceUaqfxHOf7BOXFg885Xt3Dw+SBzdN08pVm6k5DhE9oBsm+xIPbxfV6j8Ry9JmgCIywSvYMQuVB4pdfnxg9TuObp5jYYy8tSl28TXiub8R6c9NE4h6eeA8gAPkvnVA78GaGTbDqCIHHLeJYyI4z7L7nxD7mOQkAYmweCH5/Bgj1InLHjGTpxC8cJHaPU+17R732+ljtxQjtEKA8gNgey2MpuXHN2dqccvZyCg2GA3FoKVVQC1FlqKBSUJaQUJQgFVQgFVVAyycstZOWGFFCUIEOWYaOxcsvCBx/gv9mXhvk+t2fI/BD/ACpeO8vsBA+b62EvXlppbhsPg/VkM1ThVR6l+RCiCOnH8uPuDsgKQDoXZ5m5YJDcKPBfL24ZR9HqKBxnTWrD6zyT6PFkFT8xBOvfX3MaN0tGs+B5FSlDIMcv5cT8Pi65h/Lwe99P9kgMZxRFRLEuhEoQiTrDguVWPod/dq34/o4uvxD1BLJYxVQMRbzTyY5ShDEJbYn7T9Btvl5s/Rxy7a0MTYpvEzTNShW2OXbXW6fwrDptvVXM6fFD2+x7f2UesMwOtUQ3mwDNHadD2PgVBPcWCWnGGagMZIkxNVfa2scTGIEjZ8W3Z52fL9Hi6+GTLsEIky8wlHT5J6ISPR9QJ/Fc7p+lMXhxfhscUMmOyY5CT7raQ8vJh9XocBkDLHGjkjHkxfO6jL0gj6fSQkAZxMpG6frOl6f0MccV3tFWx1nRjqcfpk7dRKx4hA4Orwzx5odXGJmIxMZwjzR7jxfInjllmck8eYdKPsf5eD9eI0E0wHy2fr49XnwRxwkIRmKlIU91f+pI/wDi30eq6KPUGBJr05bhSD0Q9cdQD5tu0hoPJ6L8J6fKJevHdlE5b7J+Xd1/BsUcWXqMcBURIUH1D0v80ZYmjVSH8Xh9DODoo4MmTJEn+YQSPagbmNh+f6b8MyRy5LzSjmvQ8+X5v0dOGfpo5TGVmM4nSQ593uYU8j8GxSieoxykSRKjL9W/wrojgyZTlkZZLrX+HxfS6foo4JznG/5h3G/FrP0vqSjOJ2zj9oeHgfY0h4GWWHo8uQ5sRyZpSuB22CO2ry9B0ODPjydR1OgiZeXin6/a8P8A1TgMJY5AmM5b69qB45nOcOjlPkz7+HZ6fxPoTlz48k5EYiQJeAPb6X1M/QwznGeDjO6NPRPEJxMZCweQgeP+ND+TD/xkH2Y8PFP8NGXEMOSRIid0T3Fce97wKYDyfxfp/U9OcoHJjhK5wjyR7nxOqz4shgMGA44743Mx2v2JDzdV0cOqiIzvQiQrxDQbB8v8X6OWcQkDLbE+eMeTF9YBNMB4mTLGX/hPSzhYjsIma0/QuH4Tmln6jLOUhMkQ1iCB7hf1vr5Oh6fNPfPHGUx3MUx6WMMpzR+KQjAjtoinifh/TnNjziJqYzbon2jVHUdQOvzYsEsJE4z84kNAO/yfc6boodMZmHE5biPa9O1pD5/o+mhi/EMuOEQI+mNB7Xs6D8KHQ5MhjK4zqgeQ90ejxxznqB8ZjtPg9FIHy/Tj/wAA6n+rI+1+GD/wbF/QGofh2KEJ4gPJkJMhfi74MEcGOOOPERQYDm/Euj/a8EsQ0J1HvD4mT8NwHozPGZgwid0d32hzYfqSHlydFjnKUyPjG2YvSXv9qKeQOllm6PBKMd+zbP0+NzxfifUZM2MR9A4sYlG5Hnnjs/UYMEcEBjj8MRQtHU9Jj6mHp5BcbB+YRDyupF9f0/ukjr8PpdRDqp4zkxiNVEXtPjT6s+jx5MkMp+PH8Jeimg+XHV/tfX4CISiIk1uFEv0wGjnk6SGXJDLIebGbiXaqYDzeu6PJOUc/TkDNAEDdwQez4/S9KcnWZB11TlGIkf4X6kh5z0WI5JZdvmnHbL2hA+ay7ZdH1EsQ24Tkjs8NOX0uu6E5hj6iMBklCIuEvtCv0fSPQYTh/Z9oGP8AheiMKAHho0HynWZuqzZcJzY/SxiY2jvb6XUTn0ObJmGOWSGTbrDmJj+j6mfpMfUbRkF7SJR9hDttYDxfwXqM/UerLOdN3lieQ+wQx+zR9X19d9bTryPa7UgfPdB00epj1WKd1LIXk/EPwbF0fRmZ82QSHn958H6bD0uPDKUsYred0vevUdNDqIHHkG6J5DQeN1UY4Opw9Rl0x7NlniMq0eLpevxYZ5+pyk/zDWPQ+YR/cP1JwxMdkhYrg6uculxSq4RO34fKNPcwHzGXFLH+G4RPQnIDXsJfV6zpsuPP+1YYDIduwwPPvD6efpcfUR2ZBYsH5h22tB8vjPU5Ovwy6iAx2JbYj3d30Op/DchOSXTSEfV/uCYv5jwfSn00JzjkkPND4T73WmA8LN+EGGLF6YjknhFbZ/DIHn/J4Ovn1mU4znxjHjE40L1t+spyz9Lj6gCOQWARIe8IHkTH/qUgP/Kcv1c/+q+mxZ5xyxsZtYSuqPeOnfuH2z02OWQZiPPEECXsKc3TwzwOPILiezQeN+E4I4Or6jFjFRjsp91yh00IZDliKlIASPjTsRehYAPJ+If8Pk/pL108n4gL6fJ/SWFB+G/8Nj/pesADh4vwv/hsf9Ie5ADMm2ZIHkYR/wCFZte8fqfRD52H/isw9o+p9EIGgaZDSAFSqAK1dHPu6IFqqtIKqqAFVUAFzdC5sKKqqAsSaZkgY5eHfHwHDLw74+B7kDSkoCUBVSL0KogVVWgVVUBVVQFVVAVVUBVVQFVVAKoW0AqqEBShUAqhUBJpVUICqqUBVQbVAVVUBQlCAqqoCqqgFVVAVVUBShUAqhUAqhUB1WltbQChVQFKFQFUqgBVRaAueTQE86cOrllGh9yB8302fqMuCseDCMMjIbTLb7+7nlll6fEPUwYPSM4giMr1LgOiz9X0GIYYGdTmTX+aZ9Hl6XoNmWG0nPEj6PY0HV1M+lxZcmEerujQjsjfp/0+9jqM42/t3TRlMy/kSjON6Ac0H1elwZIdV1GQiozMNp8aDzz63F0uES6OIkJZNlceY8oHgbMn4jljCGOOMx52xMRprr7Xq6z8RnOePqem2jWgB8cjH+MDmPg+x0eDPhyGUoXHPeTJqP5Zo+X/ABPk5Y9Lhy4etwSrGZ0QIny7eT4oGvUYoYscetvfmkYwnGfmjHfyK7V2eX0cXSdVk6cE2CPT9Qj0/wDzJ4h9gYul/EsModOdg9QTmQNTLnu8vX/hc59SOpxCOXcblCUgBoEDPL12fPPJjxQhDbhJlKcKkQOdp/h/hdegz4Y4cAE8QAgRkjIDffZro/w+cIZeo6qREjCePaPNUPZ7vB4v2XHLD5scR04/38ReWu3l9vBQJ/CulyZxPZkj6c7jkh9rbfbwerLLo/XhizxyYvTjthOUqBEeHoyYR0e7qui2S8g3wJ4iNb01t87HDpfxDIJZMuQZZDdtkBsHegT28EDp6zq8cM8Z9JmhuyGsk5ndGNce526vqunzYR6VZskfMfS0qh8R/wANvjHFl/bQPTx7zIVD/dnT6H1xjh10jjAGCEY+cw8s9w5/0e1A58PVdT1eAx6jBLNjnRicdQ49yz6vEehli6bGaqQnHdZh7ZN9d1ePp+lPS9P6h2UBlA8vN/EHHPOGLH+xdHUt4/m5J0dJf4h+qBWbMD0GMyyRmI5MesRQjxofaHT8R67FlxZoxzRnuI9OMY0Rr41q8/U4eq6SAzTGIwMRiEY6jXiVfxe106P8H6XJhE8szGYH8wGVbT7UD0MUunxCfRyjtwxxjJMmR13c+3731el2DFEYv7e0bD7HyehnA5pSzkGcojHuFenIdgPGXiH3IREQABQDCjTjm7e93kQOXDMePe5BQbDEWw0FKqoBaDLQQKShLSChKEBVVQFKqgZ5OWG58sUwoFSgoEFyzcOpc8vCBw/gorFL+uT7AfK/B9IZB/jL6gQCg20hAKEqgJQpW2kChbVAUslKAVZib14TaAUoVAUEgalKoCqFtAbSwcgBq9WgbQKVANqgFVXkICqqgKrdKgNLSUICqqgKqpQFVtUAJVUBpaVKA0qqgKqqAqqsAoKUcoohKEoCqq0gqlUAKlCAqqoCqUICqqgKqqAqqUBQlUAKqoCglSLSgKqlACrr8lQAXj/EP+Hyf0l7C8X4h/w+T+mTCk/hn/DYv6Q97w/hmnTY6/hD3IAtmTdMyQPIxf8AE5v6h9T6EXz8X/EZv6h9QfQigaBpASgKqqAO7o5jl1QKVVaQVVUAKlCAC5ujmwoqqoCzJpkoGOXh2x8BxycO2L4QgaNMA600gFAFKqIFUJaBUqqAqqoClCoCqqgKqqAqqsAlVVoFVSgBUoQFQqoCqqgNqqoCBXCpVACpVACqqAqqoAVKoAShUAoVUAqhUAqqoClCoClCoDSpQgKqqAqqoCtKlADMo2KaQBXtQPE/9dzpxxLIB4CX+SR/5bnS6Wcho38Y/wCy+1S0pBzYujhiyTyxvdkrdZ008Hl6r8F6fq8nqZAbqqiaD6iEDgh+GYYHHIXeKJjDXsfFnpfwrp+kkZY4m5CvMbfRVA8/H+E4MWWWaIO+W69dPNzo54PwTpcGQZIRluibFyJfTKQNNeUDm6bo8fTRMcQoEmR1vUri6PFhnPJCNSyG5nxepUDzsX4R0uLfthW8GMvMdQU5PwjpcoiJ47EIiEblLQD5voKpBxx/D8EIwjGNDEScYs+W+e7WTo8WSZyTjczE4yf8J7PUQCikDlPQYfR/Z9o9L+Fzx/hnTYoyhDGBGYqQ11D3LSkHLPpMU4DHKIMYkGI8NvCJdDgnv3QB9SjP/FXi9VILJBzQ6HBCMYxhERid0RXB8XpVKKTIA8vPm5D0G3DNyGFKi3FgNhpClVUBbiy1FApVSiAVKtAFVUBSqoGc+WWp8ssKBBSgoEuWXh1Lll4QOL8IlYyf1vrB8j8HPlyeG8vrgoFIBShAKqqAKpylmgNNw+kOpfFy/h/Qy9TJKHwk7zcufpaD0vXx/wAUf+UE/tGP+KP0h+d6HpOg6zNkGKO7HERq5HlP4b+GdNnjkOSFmM5RGp4CB9B+1Y/44/SF/asX8cf+UH5voul6OHTyzdTGwJmN6/ouDoMGTpMmb06I3mBN3XZA+l/asX8cf+WPzR+1Yv44/wDKD84On6PD0mPNkxb5zAoDkl4c3oxyYzk6b0odxqdyB9j+14v44/SFHV4v44/8oPzHqdFM1h6QzrnkOn4f0+HP1hjLB6cRESEJXz4oH1IN63oxl6jHi/uSEfeXQPj/AIgOnywHUzxHKYnaIj8kQ9KfU44gGUogHizy5/tuD/vIf8oPz/T/ALNLFkHVCMaJOPFM6x07POekxf8AVwzbBv3Abvmins9Ti6XPk9YZhHIB5SMkdCHq6T8Rx5IeecRMHbIbhz7Pe+N+IdLiwbBixYgJDWWTj3L+F/h2PNOWTIMRGm0YzdH3IH1I1SzFtEJ3a00gRASgKqlAChaUCtAgFCqgKBfdKoCqqgIFaKqUAJVUBVUoChUoCqqgBVKoCqqgBKEsKKqrSCqqgKUKgFVQgKqqAqqUCIRjAbYigOwbVUBRaqgFUJQApCn2KgKVVACVVAUJVAiV9nj/ABH/AIfJX8MntLxfiP8Aw+T+ksKD8N/4bHX8L3PF+G/8NjvXyva0CdWJNsy4YDyMX/E5vfH6n0Q+di/4rNr3j9T6AQNQlkJQCqqEBHLo5jl0QKVVaQVVUBQqoAcjo6sFgJtKqiiyWmSgY5eHfH8IefLw74/hHuQNAFVKAqi9aSiCkIS0AtZR3CkqgKqqAqhUBShUBVVYBRFK0gFA0ShAKUK0CqOUoCqoQCqLpKAqqoBVCoCqraAqi1QCqFQCqoQChKEBVKEBRVJVAVVCAUspQDaspQCtoBtUApQqAqlUAJVCAqlCAIyEtQbCVQQb5QCqoQFVSwoqoVpBVVQFKFQChUIClF60tsAsSjbRFpRTDBGUI1kNl2Ui0WgJefNyHYACyBzy45uzAUGwxF0DQFbVCBTUWEY5GV9qNIGyUK0gVVUBQlCAVVUDPJyw1k5ZYUVKoQJLnl4bLnl4QOD8G4y/+ML7AHd8j8H4yeHqF9cIBtKFCAVpVQAXzOrn+yTOYxMsU/7ldj4+4jl9GMhO67GlItoPBwdZh6rqscelj8IlvkBQrw+l6up/CzkkZ4sksW74xHgnxfTjjjHgAe5qkQ8D8L6WOXpJ4Z8Gch9DHWdN14xSjLJD04xPwggkDtw+3mxyEScIAld68H/b4vjdf1ODLtj1UMsDE3t26S+d6tKa9N0ss3SYJYyBkgBKBPFvJl6bqR1eGXVTE9x0iOBT3/gkJbZy2mGKUv5cZdg+scYlVgGtQiHnQj+y9RK9IZtQf8Xh83KA/wDUkfbiH1vrGAmKkNL7tbBd1qwDT5nUnJ0kjOGM5McjZEOYn8i+mSIi013QPn8PTy62eXqOoxVExqEZjXTu8uw/9VDT7X/kn6mmfTjRjQo8img8P8T6bfLDkyDdhjpMeHt93i10vRyHUjJihjhhiNJY/t34+59rYGMfT48N+nERs2aYDj6nrsmDPjwxxmUZ8y8H0QoCaRQqhbRAqqoBVCoBQq2gKraUAKlUCZxMhQJGo1DQShAKoSgKqqAqi1QFVVAVQqAVQlAC2pQZCIs8MKUqFaQNqqoCtoSgKoKoBVVQFmeQQq+5oNKgKUKgKqqAqlUBVVQFVQgFVVAVRSoALx9f/wAPk/pL2F4/xD/h8n9JYUj8Lr9mx1/C97wfhn/D4/6XutALMuGmZIHkYf8Ais3vH1Poh8/EK6jL/UPqfQCBYaZDSAqqoDHl0ch8TrqgUqq0gqqoAVVQAwW2CgBVVhQFBSghAxycOuMEAOeTh2hwECwlQqAqqogpVWgCpcOo6jH08DkyyEYjuUDa0W+Zi/G+lzT9OM/MeNwpmf450kJGEp1IGiNpRT1LTb5H/X3R/wDef82X5I/9eDo/4z/yZfkwHsWtvj/+vB0f8f8AzV/9eDox9s/8ktB7Frb4/wD68HSfxH/klH/rw9H/ABH/AJJYD2bW3xh/5cPRniUv+S+j0vVQ6qAyY9YnxQOgFUE1q8R/EsAlW751opg0qu3wqTvtbePJ1+LGakeRYoOf/WeHxP0MlF9uz2Z32tvn/wDWeDxP0FOL8Sx5JbQCL4JXJF9u3RnfabeA/ieEGiTY9iP+tMHif+SVKHt2/wBLO9L53/WuDxP0J/60weJ+hcl1Ht3/ANLPQW2QbFvmdb+MYukyHFOMiQL8odHM9S1t8D/15en/AIZ/Qj/15un/AIZ/d+aB9BaNz4B/8uXCPsT+gfmj/wBeTDzsmget1vXY+jx+pk9wA5Ja6TrMfV4xkxmx9RfEzfj3TZoGGTHMxPYgJx/j+DFERx4sgiOAAK+tA+jtbfnj/wCXJiAs48g+hof+XHjIsYsle5EPftL5v4f+Jx60yEYSjtF+Z9IIClCoCry5+thgnDHKzLIaiALem0BvWltXzvxHrsnRCOQQ3Y7qZvWKB6K244s0csROBuJFgvF1v4kcOSGDDHfll28B4lA9JNsCRrXldyBdqza2gUFtjcu5Au02yCgmmFLtNvBh6+OXJ6dEc0fGntBUltV1wZQVm1tpClZJceo6gYYGdXTJKk24RurzZep9LbYvcQPc797tBpotC2i0QKWbW0ClZtJKAi615Shyz5hhhLIddoJr3NBtaHz/AMP/ABOHXRJiDGUeYn63bq+qHTYpZSLERdIHWhw6fP62OOQCtwEq97ruRAlLIKWFCqFtAGt+xKqgSXDN2d5B585ogMBYdA5h0DQFUoQC1FlqJQLVCWkFVVAVVUBVCoEZOWG8nLBYUUFKECC55OHUueThA4PwbjKf/KhfYD434Lxl/rL7AQCgXfsSVtARaUBKAslpgXZvjsgUFuuVQdeUAlnbbVrbQCmgi0WbYCkSJHAtQU20BAVFraAqhbYAqhbQClgJtoCVQoFIFIQm0QVRaNyBVo5YEiTpx4t2AiiPa2wDbVogVFsGYHJatApki1tbQCqLW0Aqi1tALMiey2wcsQREkWeAgaKyCm0BSi0FANojISFjuto3BFKVBKNzAWrljzQyXsINGjXi6W0gVJpFraAVVCAVRa2gFUWqAVRa2gFWN4BonUtWgEJRaoBVVQFSLVAu/YgUqEoChKoAShUBLxfiP/D5P6ZfU9heTr/7GSv4SimX4XH+RjlZI2jTtyX0Hg/Cz/4Njr+F7gwBZKUSQPHwn/wrMPbH6n0Q+bhB/a8xrvH6n0ggaBpkNICgS1pKoCBq6OceXRApVVpBVVQAqqgBgtsFgAqqiiyWmSgZZOHWHwhynw6Y9YhA1CWQ0gK0qogVQEtAC+fnywz5JdHOJNx3G+D7n0AQRYfO/EOmyS258H93HwP4geYoHznXznslgh0wxxj8Uqs6e1r8Qz9JPphHHKMs/luQGunL1dV+NTyY5YI4pRyEbSJcBx6noBg/D4yyQAy2LPfUtBn1vT44fh+KcYgTO25Aap/EumhDpME4RESdu6QHiO7r1o/9RmH/AE/q+10uCGfpIQyDdEwjY+SBwfiPT4IdHKUYREtoogavnQy4+m6KGT04TySJAM4gu/X/AIEOmxTyxySMYixGTr0nQ/tv4dHHxIGRifbZQOGfV5emgDl6bFc9YHZEfd/sctuQ9ZiGfHGBJj5IihXufVh00PxPFHFkJhnw+Uj/AC8C5fiMa/EcN/4PrQJ6zBAfiOKMYgRNWK05fpsUBAVEADwD8714r8Sw/wCn6y/SRYDHPn9IxFcmr8Hi6gTxSMcWIG9d3L6GfCMsTE93hl1mTB5MsCSO44Lyt2noy/8AdUvdHN0+XDjxGOXWVnQx4XoYROLISAT7vY69JgOQTy5Yjzaiwz+Hx/k5B+/DmPsd7NRaOqB0WCOXp5Cfjz3Dz48oEhUN8oaRI0+kPd+FxBxEe39F/Zc/TWMFGJ+lNaMnJcrVfgc/V1LJiIjV8gj2t9fEDNjoD9y4ZcWWOWBzGySPrerrx/Nxn9+V/Jd69zL63JjxRMNusgaICfwyA9K5DkvT1PTDqIbTzyCz02USHpTAjOOhj+TpL1YnHlOXC13Op8b8Y6zLhMMPTgHJkOhIt9oPl/jHTY8uHfOWyUDujMdi9Tzng/ifTdViwiXU5hKzpAfv2a6P8Q66OISxQBw4xr2uvbf1PHk6bqM2I9XlsxBABlyf8n0s2fIOhw4ccCfUiBuA017e9oB+M/iIz9PCMQduTzbvAg8PD1PX+t00MHpmIjXn8afpum/DIDpY9PmiJULPvPg8n47gGPoxCAO2Bjp4AAohx/imv4fi/wBH1O3UdXl6fpsGPAP5mSMQCj8Qhu/DsRqwNl/Q9sehj1nR4ok1IRiYyHY0geN+IdL1OLDv6nPuJI/l+K9D1fXRxA4Yg4cYN2Br82+u/Buox45Z82T1JRqgLP1unrZYfh+PHigZeoDHcO1k/eUD3+h6mPVYo5Y6X28C9bwfhfSHpMEccvi5l7y+gwCzI0Evmfi+eUMQxY/7mU+nH9SgYfh4/bOpydYfhH8vF+pfaAefpOnj02KOKPERT0oDTnlxxyRMZCwRRDopQPmDmyfg05YSDLDK5YvYfB9D8L6KWIHqM+ubJrL/AAjwcfx8Hbhr/vA+yAgeT+I58s80OjwS2SkN05jkR9jGX8MnhgcmDNl9QC/PPcD8l/EYT6bqYdbGJlADZMR5A8U5vxrBKBjgJyZCKjCMTdopz9V188/QRzxO2RMRLb43q+5E+Ue58LN+HZcf4b6QF5AROQH79nrx/jGCURGImcn/AHew3f790DHpM05YupJkSYynWvGjH4b02brMUMubLIRHwxj3o8yLP4bGZwdTvFSJnp8nv/BIkdJC/b9aB6QeXrsuzHtj8UvKHrfNMB1mcg/BDTTxcW6HTLSnk9EObpzhxRMPix0fze7FlGSAlHgvP/1bh/xf8py6UnBOfTnkWYOU4fedHFlg5aNNvUZiZGRxxvQAarhy5Meb0Zy32LvuHnw+llBPUT896gyIpMDij1EDjG2NEXwCUm8DTWqjRdP2dGTNky5fRxHaAPNJ5+thlx4zulviSORqHTeOn6iRnpGfBXr+phLGYRIkT4dmPFSKyrVSWHUetJEcZGpEho6Sw9QQZepR/hA0Y6vQYv6g954+Rb/qMu0Kpy4Oonkw76ueuniXMYM0huyZTGR7DQBwxynDpCcfNlrHDpNolKQka13Gz9CmTXGJjr0k36PPOZlCZEjE/EO7MoZ8spGUzjgNIgV9Ll0cojNkAG2/hidHPAMWQyPUnz3xI6JPTqV1ht92xvDLPDmjjOT1Iy8eR9Cc2XN+0DHjPMe/A9rhKWGGXGcYEYC7lWhennqx/Qk39Q0k5j/E6unxzhGsktx8XL8Q/wCHyf0S+p6w83Xf2Mn9MnqeRuXJ830/Tz6fp8XXdOPPEH1I/wAUbL6XXdTDqegnkxnymLt+DC+jx+58n8TwT/D/AFI4/wCxmHH8MkD0B1v7J0EMtWRCAiPEkLj6brMsd+TOYTOu2MRtDj1PTzzfh0BAXKMYTr3Pbg/E+nyYxM5IjTzCRohAH4d1mTJKeDPXq4zRI4I8X0w+H+HTGXPn63jEdInxEe76PQ/iGLrQfSJO3mxTAdZfOEOt/a926P7N4fv3t9J4x+IYPX/Zt38zwr9UDrq1iCLs3q0FQJLzZxqC9JefP297AVHh0DnF0DQUhVQFuLLUUCkqrSCqFQFKEoCqqgZTGtoaycssKBVVAkuWTh1k45eEDz/wbjJ4by+xb5H4PqMv9ZfWHCKcHUfiXo5DDbde1x/64/wf854+vH8+fv8A0ebu8ZZ765VGlhsfU4MnqwE6qxboRbzdH/Zh/SHpex4bYNiXl67N6OKUu50D1F8T8VzAzjA8R1PzcW0jqbyq8rIP4dmnHLsyE+YWLfWySERuJoB8DqOrx5JxnisGL6nU5cUsInk1gaIAYnCO2ZSXWzUTqih+I4Ca3PQcsYx3E+XxfD6iW7FccQhAV5zy31Uj+zYx2P5NlqQ8qriN2dmbrsM8cowlrThjmf2Imzev1unUdPjj05oDQXbjD/gj8/rZbctVWFx/1I36XrceHDEZJeb6S9+PNHLHfA2D3fP6PBA9PZiCZXbn+HyiMEzP4b1+hstGb0q+TUymdkvxLBE0ZfQHojmjOO+JuPi+Pu3Y5Rw4QIa+aRt06OUI9NI5NY2bUsWylGE6nWfxPADW77nc9RCMPUJuPiHx5ZN2KseKMYG6lLn5OkD/AOBH3/qyXiHlVw74PQHX4SREHWXGj0kvB+H4IDFGe0bube2T0XaccxVTiuxwdBKGPDIxyepESkTKXb/YsPxrpJz2DIL9xr6eHzuk6c9T0OXFE0ZTnX0uWTqJYsfodd0/8sabofv+rTmfTg24y6rGMowk+cjcI+xemlCWOJx/AQNvufO/GY+l6fVx5xS19sTygehn6rH04ByGtx2j3ly6r8SwdKduWQBPbkvFM/tXWQiPgxR9T3ylx9znkzQh1Ez0+KWbKaEz2jX1IHodL+JYOrv0pWRyOC8XQyuXV7idu+WvgKefpvUP4gDlhHHI4z5Y/r7XXo9T1n9cvqKB29Dkw4eljKEycQF758vH1f4x0+fDkxwJsxO24kA+54j5ug6aEvglkAl7rL7H4lhxy6XJEgARiTH2Ugb/AIb/AMNi/oi8P471voQjjBIlKUTp/CDq934Z/wANi/oj9Tx/j/8AYj/4yH6oHP8AiHWQyjps4JEPUJJkK4enH+O9POYh5oiRqMpCgXP8XgJz6eEuDkpP47Efsh0GhjXs1QO3qvxLF0hiMpI3XR9zng/F8ObFLNrGMDR3inj6+EcnVdLGWouRr6E/i8RKfTwl8Esnm8EDWP49gMgJRnCJ4nKFRe3P10MBgJWfUltjTj+IQhLpskZjyiJ+58iUpHB0Rlzvige71fWR6TEcs7IFce1jqvxDH0uMZMhOvAHJeP8AHZf+ByHtj9blnG7r+nE/h2SMf6kDQ/j+KI/mQnCWlRkObcPxHqY9P1uHLk+ERl7W/wAfET08SfiE47f1XqoCX4h04PaM/utA36b8ZhlyjDOE8cpfDvHLt1n4nDpiMdSnkPEICy834r8fTnv6oY6YA/iGcy+LbHb7kDq6X8Vhnn6M4yx5Odsxz7nfF1scmaeAA3jqz73zvxWvV6Yx+P1KHu7tdLp1/Ue6CB3ZOsEc8emo3KJnfufK6TrJy67IfTl5tsf6B7XbMQfxLGPDHJvo/wDjuo92P6kD1ZEgE80+D+GdXkl1WUHHKpz1JPwewvvS40fK/D/+I6n/AMYEDg/D+vlgGTHixyyz3ylUeAH2Og/EY9YJeUwnA1KMuzy/g0QIZa/7yTjjEv2nrNvO0V79pQN5fjEpyI6bFLLGJozGg+Xi93Q9dDrIbo2CDUonkF8H8Mw9XLp4nBlgIa+Uxsg/Q+h+FYZY82YzyRnMkbxEVRQPXnMRBkdANS+P/wBcZsgOXDglPEPtXX0B6/xUH9ly7edqegMT0+Mx+HbH6kDOf4thj046nUxlpGPcnwec/jGXDU+owSx4z9vcDXvDzdTlw5J9NPEAMQySB0obn0vxOh0uXfxt+/sgX1HXjDPFEDcMp2g2nr+t/Y8Xq1u80Y173x5XGHQ7+bHPuD1fj8q6YROhM418rQOnrfxL9lnCGwyMwaEeb8HHH+K5Y5Y4upxHHv0jK7R1Ivrum/pyI/GBr0//AI2KBzdV1OeP4hEwxbjGMhEbviH8T19T+LTw5j08MRnkoGIB5vn6Gc3/AKscX/i5/WuKN/icz4Y4/oga9P8AieSWWGHPj9MziZDzXqOz0dV1xwZMWKMd0skqq6oDkvJ+NYzHHHqIfFhkJfLujopDrOsn1A1hjiMcPedSge2EoCUQKoVAKqqAqySbqtPFKAUKqBMpCOpeXr/7GS/4S9ZeTrzWDJ/SUUz/AAv/AIXFf8Ie94PwsD9lx/0h72AWJNsS4QPKxX+05v6h9T6AfOxf8Tm/qH1PoxQKBbZAaQChKoAjy6uceXRAKqrSChKEBVVQAwW2CwAVVRRZLSCgYz4bxfCGMnDeL4QgahpkNICqpRBQlDQJQKkLDSoEbdb7s5MMckTCYBieQXVUDmHRYhi9DaDjAradXXFijiiIR+ECg6KgRKAkKIsFzwdNjwR2YxUbJr3uyUDA9Li9T1to9Sq3d1y9NjzEGcQTE3E9wXdUDDJ02PKYmcQTE3E+BdgEoQCilSgCnOGGECTEAXzTqrILLM4YowvaKvVukqoEyZzxRyfEAa1WeKM/iF02lQiyyWJYoSkJkeYcF0pVBJFBCaVEI2g6LDHHGBGIoDsG0tAKQYg6HhpUDMY4xG0AVxSYwERURQHYNKgCmY44wFRFDwDaoDSpQgJeI9EZdSOonKxGO2Ea48S9qoCEJVgJldHbz2aHtVWgSECNacpVABFs7QONG1QJ2rtCQQdB2SgTSaSqBmIUSbOrUYCPAppWQWQIMBd0LaVQJMjggTZiCfck44S0IGnsbrW0s4roXk+pEscZjzAEIjhhEbREAe50W1xXQSyTAHkcNUq22CSTsEdANGBgxxO4RAPudkM4ossj043urXxRLBCRuUQT7Q6quK6DkyDjjLQgGmhEA33Sq4oksUSiJAg6gpV0QiGKOMCMABEcAInijkG2YBHgdXRUDMYxHSIoDQU88vw/p5HdPHGUv4jHV7EUgYyhUdsQCOK4FM9N0mHpgRhiI3zT0LSA08/7Fg9X19g9T+Lu9C2gNKiUqBNXXglhSSa0efP2ekvPn5HvQDF0DEWwgFVVAW4stRQLVUNIKpQgKqlAUJVAzycsNZOWWFFVQgTJxzfC7FxzcIHH+EcZP6y+qA+R+Dmxl/rfYCKcmXoMWSRlIGzzqwPwvCdSD9L3lQoRrnZbsnHjGOIiOBo2oU6tMAL5+DopRyyy5KN8APoG2ccZRiBM7j3NUyMZNKzSaW5z58Ec0JQFW8v/AFfklg9KRFxNxfUSmkzSzLVULvPIl0PUZYbck40OAP1dz0RngGKZ80eCH0GSyEV5tn4Hk/sPUSh6c5jaOAHeHRSj05wkiz3e9KhB5tn9zl6fpzixDGdTq44Pw8wxSxTIO7uH0UcNhGfctj24nlQ6DOI+kZgY/YNXTF+HyjhlhmQbNgh9KkMhGnm2Z5I/D8xj6Usg2eAdYdDKOA4SRZ4L6NKoQebZ/c5+nxHBjEDrQ7OnxC9RY+borTm3LlnjYvwqf7LPp8hqUpSkDHt4OUul/EsuP0JyxiJG2UxyR7n3qVpDHp8I6fFHHHiIpeowxz45Y5cSBDtaoh5f4X+Hy6PHIZCJTkdSPAcOZ/D+pw5Zz6aUayHcRO+X2do7pRTxun/CsuPqY9TPIJmiJ6f9F26f8PliOckg+rIyHs5fTpKIeTD8JB6MdJlNkfaHjd288/wvrM8DhzZgYVpUdT4W+8hAw6XAcGKGMmzGIjfucPxLov23F6YO02JA+0PcqB5J/Ds2QYfWyCU8c95lt5enr+i/bMJwiW2yDfuNvatBA4M3Q+pmxZt1elelc231nRQ6vH6c7HcEcgvYhA8Q/hPUZgMfUdQZYh9kCifeXr6z8Nh1OIYgdm2jAjtT6CoHhZPwTLnjt6jPKZHw6aD2+1r8UjgkceHMTCR/t5B9kh9pw6jpcfUx2ZYiUfainzH4h0wuEJZjmyymIxF8Du/QZOiE+oh1F/2xIbfG2um/C+n6WW/FACXjz9b2AIHJ1PRDqDjJNenIT97j1n4YOomM0JHHljoJx8Pa+kqIeX034V6eT1805Zcg0BlwPcF6v8JGbL6+LJLFkraTHuH1FpA8vp/wiGDKM+6UpgESMvtW1P8AC4nqB1MZyhLTdEcSp9JUAU+cPwuMepPUwnIEm5QHBfSKAinL0nRR6USjEk7pGZv2ri6KGLLkzAndkqx20exUQ8if4LDeZYcmTFu+KOOVB7Oj6HH0cNmPvqSeSfa9aoEmIkKPD5P/AFFjFiGTJHGecYOj7CoHFk/DsOTD+zmP8scDw9vveWP4HjJHqznkjHiEpaPrqgcfV/h+Pq4enk4BuJGhBeP/AKhwyFZZzmdKlKXFeD7CtBzT6OE8sMxvdASA8PMvUdFDqNhnfkkJivEPSlgPP638LxdZKM5mUZR4lA06Y+hhjzHOCd5iIfIPWlA8n8U63D08JY8mspxltjR17Ov4T0n7J08IH4iN0veXtljjIgkAkcGuGwEAqqDfZAKFVAKqqApQqAraqgLx/iGnT5O3ll9T2PH+I/8AD5O/kl9SBH4Z/wANj/pe14vwr/hcf9P6vaTTCizJoGxbMkDy8I/8IzE/xD/oh7w+fgA/aMxH8UfqfQCBoEoCUAqqoDHl0c48ujQFVVEFVVACqqAGS0yUCVShhRQUslAyycN4fhDE+GsXwoGwaZDSApVWkFVVACVVAVVUBUmkoIB0KAqqoCqFtAKFtbQFVVAVVUBVVQFVVAVW1QFVW0BSi1tAKFVAVVCAVVFoBVFqgFULaAUWtoMgOUClQhAKWbTaAUWjVKA0oVbQFKFQElVQgFULaAVtm1tAq1RaoBtLNraBSoVANqi1tApbZVApBK2toBRaDqK4XVAKWYbq81X7EoCqqwCqoRQqhUBLzZ+Q9BefN8QYC4tsBsNAVVUAtBhuKBSqrSBQlCAVVUBVCUDOfLDeTlhhRVVQILll4dS45uEDh/Bv9747y+yHxfwaWuUdt5p9gGkCioQSjcgWlzhIkaii3aAkKrE57ASe2qCUls0XlwdZDqiYxsEa6vWEnJXV1cMKOVtBkiBVyy5BjgZngC3CPWxliOajQ7MbSNqreKO1Xn6fOM8BMCgfF3tplppww8KjcOFtEChbRaAlIRamQ4QChdE2GgaTbydV1g6c447TL1JbNO3tYHXD9p/ZqN7d+79EDvCvF0fXDqjkAFbJGHvp06vqf2bFLKRe0XSB0q4YM4zY45ONwEvpdbQKtWDRN92rRAq8XX9d+xxjPbu3SEOa5eoTRS1Z3I3IhSvD1PWnDmxYqv1SRfhT170UtFsGdPl9V+JZo5j0/TYvUlEbpWa5YD2EMQkSNeWjJApXg6DrT1W+wBsmYe+no6jJOGOUscd0wLjHxKBurhgyTnjjLJHbIgGUfAum5oHHPfESAIvtIUXRm1tAKWNydyIG7QBV+1BKAb1RS1tgyfLn1nU4ukyZs0RHJG9o7VeiB69rb5x6jPKGKWKIO7b6nsBHve4SQLSwJIMkQ0W2BK0koBtbfJ678RyQyDpumjvzHXXiI9rzyl+K4R6h9OYHMANUU94FLxdD1serxDLHS+R4EPVv7IGiGN6kohauUpn7NHXukTB4QNLVzMwoyA8HlFNFtyGWJNAi/ekzDAaK5Ryxl8JB9xUZYk0CCfYQ0hqlzMxEWURyxkLBsexA0tbcpTj3PGp1UZYyFxII8Qga28nX69Pk/pLz9N+Iet1GXEaEYbRH2u/XH/wfJf8ACUUj8K/4XH28r3PB+E/8Lj/pe9AFokqDwwHl4L/ac1/xD6n0IvnYa/ac39Q+p9EIGgSgJQCqqgMeXRzhy6IBVVaQVVUAKlCAGZNMyQAqFYUWZNMlAyycNYfhDOThrF8IQNg0GQ0EAqtq0gqgJQFVVAVVUBVVQFCUIAJYOQBOTh/OMkjuOp5PcoH6LvTufzU5L7n6V59qgH6UMgOjVvxP/lvRJ6wEDQRlf0P1HX9YOjwnKdSNIjxKB1ZM0cY3TIiPGRpyh12DIahkgT7JAvwebNm6zJumTOcuANfoCc/Q5+nAlmxyiPEhQD9DEmn478E/Fp4skenym8cjUSeYnt8n68FApmUqSS+J+O/iR6bH6WM/zJ/dHuUDs/636QGjliD73ujISFjh/NeH9E6c/wAuP9MfqQNzJ5c/X4On/uzjH3l838d/EZdNAYsRrJPv4B+WwdLm6vJtxRM5ck/mUD7bH+L9JkNRyxv6HujMHV/P+q/Duo6UXmhUfG7D2/gn4lPp8scMzeKZqvAnikD7WwEsxaQFBKlyy5BCJkeALKBObqceCO7JIRj4l4T+O9GDXqj5AvyHW9ZPrchyzOn2Y9gHqx/gfV5I7wALFgGWqgH2HT9bh6kXimJe78noBfzoer0uXvDJAv234d1n7XgjlPJ0l7wgdxNPD1H4t03T6Tnr4R1eD8f/ABCXTwGHGanPk+Ef835zo+iy9bIwxDjUknQIH2PT/i/TdQdsJjce0tD9736Sfz/q+hzdHIRyir4I4L9L+A/iEupxnFkNzhWvjFA9wmnj6v8AEcHSf3piJPbk/QEfiHWfsmCWXuOPeeH4cDL1mXvPJMop9ZH/AMuLoya3Ee0xL6eDqceeO/HISj4h+Oz/AIF1OGByHbKtSInX6nm6DrZ9FlGSHwn4o9iFBD9AtBlTAmCLHD83+P8A4lLd+y4zQ/3hH1fmgep1H450mA7TPcR2hqzh/H+kynbuMSf4xX3vzHQfhebrrMKjAfalwvXfhmXoaOSpROglFsCT7yMr1DT8v/5bvWys9NM2K3Q/UP04YCkKqACXy8/450uCZxzkd0TRqJL6MzT+e9RkOXLLJ/FIlA+s/wDXh6P+KX/JUf8Alw9H/FL/AJL8+PwPrP4B/wAoJ/6i6z+Af8sNgH2sZiQBHB1YzdRDDEzyERiO5RjBhEA8gAPx/wCNdbLqs5gD5MZ2ge3uWA9uf/lydNE1ETkPEAfm9XR/jHT9WdsJVL+GWhfnei/A8nVYvVlMQEvhFX83g6jp8nR5Tjn8UdQR9xCgSfoYkpk+Z+E9aer6eM5fEPLL3hw/Hetl02DbA1OZ2g+zugdWf8Ww4pbLMpeEfz4eaH/lw9OT5xKI/iIsfc/O/hnT5OqyiECBQsmWoA9z3fiH4VPpIHLGW6N+ahVfLWw2AfVY8scsROBBieCHPq+qh0uM5cl7R4PzX4F1ZxZvS+xPt2Ev833fxTp59V00sWP4jXLAcZ/8uTpf8f8AyUf+vN03hP8A5L5H/rvdZ4R/5Sn/AMt3q/8AD/ymwJPYP/lzdL4T+h7+g/EsXXiRxbvLV7h4vwmXGccjAkEg0SNQ/Xf+W90c+nwmc9DkIkI+AZAPcVUBAjDhGIEAk2TLU3y6WqsAoVUUm5ADue7SpQAXlzfEHqebN8QYCw2wGw0BVVKAtxYbigUlCtIKqqApQqAUKlAznyy1PllhQKqoElxyjR1Lnk4QPN/B+c3jvfZt8f8AB/izD/G+uYij7UU8frOrzY8soxlQ0eb9vz/xlv8AEARmkPc8hi8IZ9Gla8VgtD6XpZmeOO43KtXoeXoh/Jh7nqe58+2rF838Uzbcewcy+p9EvidSJdX1JhA/D3c26I6ZKm3J6VxIhE9Fmxk8SHm+fL62fJKEN0AZS7APl9T0OfYZznu2603Lq5/sglE1IHZI+DluEztaqvxsmnsw5Oo6vFH1JVt8K/cvRl60QwDNWp4HtfNyxwnEJCZnlPieHXLAz6OEgPh5Zs4NOlXxlbxpBWXL1XomcwDCQ47i0YT/AOAzPA1/R0ydbjl0+wfGY7drOD/gp/6k4xjoMYxXH1E9NLqTh/lUIxvXuXt6Pq5ZsRlIXKPh3Z/D/wDhgf6nl6CUoYcsojzDhuj8DNotywWFjQ5esMTlNQA7Efv9b0dN1U82Ez23MWKHd86HozgZZpk5P4dXXpsksfTZDjNyBXXuLaqa0xnpBU8nWRickiI19k8uw6yculOUUJDR4RHDPEZSJllN0CXfCB+wy9hLNmV1WEr/AC6Qa9Pk6nPtmCBDg+3x7PdnM/Tl6fx0dvvc/wAPA9GNe16iHolB5cxzaIiDx8f4lI9Cepl8cQQf6gjofxKU+klmzHz49275cPnZ8Mo9RLoB8OTLHJ8uSvW45Q6nJ0sB5eoMJD9XUHM6z1vUww9NOcvNln5/KPhPZ0H/AKtD/wCK/VH4vAQPTgcDIAPkGq/9Sv8A5iQK/BOeo/8AGyej8YP/AIJl/pcPwQa5/wDxpen8YH/geX+koHmYMHXzwRyQyiFRGzHXYePvdx+Mf+BftBHnB2bf8S9L+LdPHp4mcgJQiAY/a09jwnoss/w6UzHzSmcu3vtQOiUOujD1v2gbwN3p6bfc+t0HV/teGOXi+R7X57Z+E+l6mplXwbjuvwfe/C8Yh08ah6d+bZd8oHH/AOXBfoRrnfGvvebq8XXdLjPVHPco+aUNvl/f5PX+PaYYf+Mi7fjA/wDA8v8ASgYdb1+QYsYw1HJmqieI3y8eaWboY+tDqPVo+eEu/uR+IdPuw9NnlEzxwA9QD+EuOX/qzaB02MZckvhgL+9QDu6vIMnU9JMcSMiPmA55D1PUdZPBDJKGMRiTXYez3t9Xj9PqOjjW2jVDt7HKXWQ6Tr8hyWIyjEE1wgawlm6HqYYcmSWTFl0iZ8iTyYOjmetyQ9adxEZGXeXGhek5h+JdXi9GzjxEzlOtL9jt08T/ANY5v6IoFfhmac8vUCRJEZ0L7crDNM/iM8dnaMYO3tbyYeqh+H9Vnh1FxEyJxNE/U10Gb9p/EJ5ACInGNt9x4oHR+CcZv/Gyez8TkYdNklE0RE0Xk/Ax/f8A/Gyez8VjfS5f6CiHk9Vlzeh0vpyInMxF37O/iz1vS5Ogh+0wzZJSiRuEpaG/Y3kgfS6L+qP1PZ+OxJ6SXvj9agp6cDYB8XzvxLHlymMRk9PDr6kt1S9gfRxjyj3D6nwfxeMR1WOXVRlLp9p0AJG72oHJPJi6XPjPS55TJkBOBluFPpHJLp+vESSceaOgJ0Eg+Z1eTHkOM9LiMcUJi57Nur6/4xglPD6kPjxSGSKgGc8kup64QBOzDHdL2yLzdRhhKcpdfm26+SEZ1UXr/CMMvSlnyCp5ZGZ93Z8vpp4ME5jrMcpZtxIO3dfuQOn8Fz3ly4cczkxRqUDJxwzlL8MzGRJ1nyb8Hf8ADBkl1mWU8ZxicAYxI7dnPBhmPw3NGjdz0psA16qUo4+kokXKF/QF6nFPqOu9ETlGBx3Lae2rXV4pmHSUCalC9ONHcY5f9ZbqO306utPpYDlGD/q/q8McUpGGW4yjI23sP4l1OSOSUhixVERiasu/X4pHq+mIBIEjZ8HCfq/h3UTyiByYctE7eYyQM8fTHpevxY4zkcZEjESPGhfoDw/PYc2XqPxHFOcDAbZbBLmq5fowNEDxPwrzdT1M5fFv2/LV6es/EJ9NPbHDPJpe6HDz9X0/UdH1Eur6aO+M/wC5j7+9g/jOWflxdPk3+3hAgficR0eTLgx+mYnaBp8R7tx/A8c8YlOc/WIvfu7oxfhWY9Hkx5KGXJL1AB2KYfieeEBilgyHMBXw+U+20DmlkzdV0JmTebBPnx2/v9z1/iHWnJ0kfS+LPthH58vV+GdDLp8GzLrKZMp/6uz534f+H5YdVsyA+lg3HGT33cKBJn+JZIYJYujnMxwiNzMeZPHPquj6SUcvQyIkD5oG6lH5vtfiPTZceaHV4I7zAGMoeI9jkeq6rrJRx4McsQvzzmB9CEmXX4D1XXwxGRjGWPzV4Aljr+iHT/s3T4ZSjc5a3r5qfRl08/8ArCGQA7PTkN3tT+I4J5M/TyhEkRnciOwQPM/Evw7F0GOPUdPujOMo67ub8Xb8UxHP1eDHuMdwkCY+Hd7fxrp55+m2Y4mR3R0j70dR0859bgyCJMYiW41oLCB5fV/h8ekz4Y9NKUPVJhKj20/N06nocfQZsGXBcTKe2Wt2+h1/Tzn1HTSjEkRmTIjtxyj8U6fJllg2RJ25AZV2CB5n4h1OLL1Zw9SZejjA8kQTukfGnPp+o6fB1WP9i3CEzsyQINew6vpdVgz9L1R6vBD1IzG3JEc6dw1gydZ1eaMjGWHDHWQlzP2NByDo49Z1+cZbMIiBMQas1+jeDp49H1/o4rGOePdtt7ek6bJDrM+SUSIyENp8aWfTZD+IRyiJ2DGQZe1EOH8O6HCOszeX+0Y7NeLt9jrh/wCD5K/hk+fix9R03XZJDGZY8xj5x2p9Dr/+HyX/AAlgM/wrTpsdeH6ve8X4UP8AwXHf8L3opnYlwzLjR0r5MSYDyenP/hGWxRuN/wDJfSD52D/iMw9sfqfRCBoEoCUAqqoDDl0c4OiAVVWkFCqgKqqAucuXQsSQJVVYUCC0yUDKfDWH4QifDWH4QgahpkNICqVRARFe9KAKS0BQlUCZXpVe1KVQAqUICqqgSY6uR6fH/BH/AJI/J2KCgc2THjgDIiIA1JoPxXX9VLrc9wGnwwiP37vvf+XH1vp4hgifNk+L+kfm8H/ludH6uU9RLiGkf6i0Hu/hX4dHosW3mZ1mfb/kv4n+Gft8Iw3mG03xdvogIkaZIPE/DfwT9hynLKQnpUdKrxdvxjJCHS5N9ajbG+57Pf1M/TxTn/DGR+5/PsmTJkO7KZSJ4MiT9bQV0uM5c0IQ+IyD+iAvyX4Bn6XHOpWM0tBKXHuD9XeiBj1fVQ6bHLLPgfefB+JMs34l1F/bmfkB+Qer8b/Ef2rJsxn+XD7z4vrfgv4f+zYjlyD+ZMfRHwSB8pI8v6H0/wDbj/SPqfzuQ5+b+idN/bj/AEj6kDyvxP8ABcnW5vVjkA0AESC9P4T+HHocRhMgyMrJj9z6bE5iAMpGgOSUDh/FjCPS5N/G37+z8VhBnOERyZRH3vo/jH4r+2y9PH/aif8AlHx/J0/AOhlnzDPL+3j++X+SQPsYtsgJYBebqsZy4p4xzKMgPmHpYkgfnMCcUxuHwyBI9xfuMXW4csPUjOO0+JAfmPxnqen6jKThj5h8WTtL5fq+fDp8uQboQkY+Ii0HT+KdTDqOplkx/DoAfGu79J+B4ZYukiZaGRM/pfk+my48eQTyw3xHMeP39z9z03UQ6nGMmI3E/vSB8n+OZPU6yY7RqP3Ps/8AluYwOnMv4pH7tHwfxPXq8p/xF+k/8t8V0cffL60DH/y48YPTxl3jMfeHyPwHJs6yI/iEo/q+5/5cP/CH+qL87+ED/wAMxf1fogfZdR0mLq4bMo3Ru+aeXpvwfp+lyeriBEqI1N8vpR4ZnwwHn9f+IYemxy3SG6iBEc2/GYsUs8o4oC5S0D1Zvw3qo7sssUgCSTo6/hP4jj6KR3wsH/eD4g0H2EIiERHsBX0PwPVZTlyzyHvKRfvTMThuibBFg/J/Pr1N+1gPqun/ABDpvw/pseOZ820HbHU6oP4v0HWD084NXY3jS3yvw78Gn18fVMtkLq+SWPxL8In0AE92+BNXVEH2tB9Z03R9NiInhhEeEoj9XtD8l/5b3XShk/ZpHyy+H2F+sDAUpQqByddl9LBOfhEvweMgTiZfDYJ91v234vhy5+mljwjdKVaex+ZwfgfVZZ7JROMDmUuPk1A9E/8Aly4wajikR47gH0eh/FsHWHbCxP8Ahl++r5k//LahRGPKTMeI0fAPqYMn8M4H6CGQD7/NPZCUvAE/QH89kd3m8X7QdT+1dCco5lA37+78XDt7w0H6B0+MQxRiO0QPufm//LkhWaEvGP1F+oh8I9wfmv8Ay5f7mL+k/WgV/wCW1kP82H9MnH/y453mhDsI39Ja/wDLa/u5T/hH1uH/AJcF/tX+kIHb/wCWzAVln3uIfY/EYCXTZAf4S+V/5bH9rJ/UPqfY63+xk/pkgfEdLl9PLCQ7Sj9b+gx1fzrFHcY1zYf0SHAQCXx/xvrv2XDsh/cnoPYO5fXkQA/DfiHVnq885g6XtiPYGA6PwP8AD/2vNvmP5cNT7T2D9rEU8H4X0o6XBHH3q5e8vXM5B8MQeO9e9rBsqueaRjEmPLAaKxjkZAE6NsAoKe6oooSqAHmzfEHae6xtrnX3OGb4gwGgbDAbDQFSqlAW4ubUEDRVVpBVKoAVUoAShKBnPllqfLDCiqqgSXLJw6lyycIHnfhP9zMP8b7IfG/C5XmzjvuH6vsRFIomIURCUg9kQFU0qoC5Q6fHjJMYgE+DqrRLJMRIUeC5fs8IgxhEAHkVo7qwSzCPS4o3UIi/YmOKMI7YgAeFaOzMtNUXk3qYQ6XFHUQiCfY6DDAR2gDb4NDUApQl9SRjjGO2IoezRmOOGMVEU6o2tJLMBgxxlujEX403DDGHwgC3URSR4IssyjhhA3GIB9zQxRAoAUfY3SaRJZMYiOg0CUqgZHp8cpjKYjeNBLusunhKQmYgyHEu4dUFEM54IZK3gGjYvxT6MN3qUN1Vu702lAjHihjvaALNmu5XJGMokTAMTzu4bVA5z0WGUhI44Ejg7Q77UpQOb9jw7t+yO7x2u9JVAmUIy+IA+9JgJCjqGkIE7RVdmI4IQO6MYg+IiHVHCBBgDqRq+dj6OX7bkzSA9OUYgPqKgRHHGIqIAHsSIjmtWkTMgPKLPhwgAwEuQD707WlQABSkXylUAbQtJVACmNpVAmqVUsKTS7WqUCmgFJpKohNJpKoEkPl5+h6mOaWfpcgG74oT4+T6q0geZ0f4fljmPU9TMTyVtG0UIh9QBCUBpFJVAFLSVQAqVQGkUlKAKVVQAmkrY4QJq00lUAUtJtBJ0oIDShKoAI8Hl6/+xkFX5S9bydf/AGMn9JQM/wAJ/wCFx1/C975/4R/wmL+l9BABc5Ohc5MKeVgFdTm/qH1Poh87Df7VmB8Y/U+iECw0gJQCqoQDB0c4OiAVVWkAqhKAFSqAGJNFgnVACqrCigpQUDKfDWIeUMz4bw/CEDUJQEoBVVaQVVUBVUoCqqgKqqAoShAWJNvN1WT0scp/wglA+K/F+p/aOqnLsDtHyfqvwfpv2fpoR7kbpfN+KxQ9XJGPeUgPpL+iQFChwNGgvhiUgBqmfg/Pf+XH085Y4Zo3UTUq8D3clPcjkjOwCD82c+CGeJx5ADE9i/F/hf4h+wZdxFwkKmP1fd6j/wAuHp4wvETOfYVX0t0IfLZsfpZJQH2ZEA+5+m6nrsn/AFZHMD55ARJ+dF+ZAnmnQ805n6SX7Q/hUcnSR6SRIERGzHxGv1tB8XhyDFOMzESETe0932D/AOXJlI/tR/5R/J9D/wBdbB3yT/5v5Il/5bOAD4538vyQPlDrftfpvwz8byZ82PpzCIiRVi70D80Y1fsfr+g/BcOCUOojKW4AGrFahA9eeUQiZSNACyX438W/F5dafTx6YR/zvf8Ak93/AJcXWkEdLE6Vun+g/V+eiQCDIWAdR4sB6f4X+ET63zzuOLx7y9z9jgwwwwGPGKiOA/Lw/wDLklACMcMREaACRdY/+XNkJ/tRr+otB9UEsxNtMAC+b+M5ZYukySjzVfS+m8nX9N+04J4u8gQPf2QPg+mxjJlhjlwZAP30YiIqOgHAfz6UZ4pkGxKJ+gh+hwf+XJDZ/Ogd4528H8mg4/8Ay4cUMfUCURRnG5V4h6v/AC2Zn+bDt5ZPj9f1kutynLMVpUR4B+j/APLf6OWHCckxUshuv8I4QPC/GYGHWZPbUvpD73/luzvpdveMpPL/AOXH0ZO3qYjQeWf6F838L/Ez0MiJAyhLkDnTuED2v/LjlXTAeMw+N+BQ39ZA/wAO6X3I/FPxM9eQIxMYR11Otvqf+W30ZAl1EhW7yx93coHt5upxdOAcshEHi3LB+JdP1M/TxTEpVdUfycPxroj1XTkQFzgd0R9b8h03Uz6XIMuPSUf3pgP0A0/CficIw6rLGPG79H1Z/wDlzXDy46n7To+IBk6nJQG7JM/egfVfgMzk6OIl2Moj3PynUYziyTgeYykH7roOk/ZcEMXcDX3nl+e/8uD8PljyftMB5JfF7D/m0Hs/gxB6PFXgfrcPx8g9JId7j9b4n4d+MT6GPpyjvhdjXUI/EvxeXXAQjHZAG6uySwGP4Xf7Xir+IP3kX5T/AMt7opZMn7TIeWNiPtP+T9YAmAqUopA5Oq6zF0oBzSEQeLcem/Eun6qZhilukBfBZ/GOiPWYDGHxx80fy+b8dh6jJ0uUZIaTj2P1FA++L8N+KkHq8tfxfo+jL/y5chhUcYEvG7H0PkYsOTq8ohHzTmdT+pSB9R+DY93QiJ+1vfkKMdDyH9D6fp44MccceIin5H8a6A9LnMgP5c9Yn29w0H1nT5BkxwmODGJ+5+Z/8uOe7PGPhD6y5dF+N5ekx+kYicR8N6U8WfNk6zKZy1nLQCP1BgPc/wDLZx6ZZ+O2Lzf+XJjMc8J/xRr6C/QfhfRfsnTxxn4vil7y4fjf4eerw3DWcPNH2+IaDzf/AC2clerj7+WT6/4nkEOmySP8Jfjel6rJ0eT1IcjQg9/YXq678YzdZD0yBGPcDuwHN0uP1c8IjvIB/QIh+V/8t3oJTyftMh5Y/B7S/V1o1g878VyjpumySjoSKFeJflPwzB6/U44drs+4avu/+XLkrDCP8Ur+gPB/5bsN3UmXhH60D6+Kb1qlAaYBRoUqgIFKqUAKlWACqqKSQ82b4g9JcM3IQCGwyGooFKq2gBqCGoIFpQrSCqUIClCUBVVQM8nLDU+WWFFCVQJLlk4dS5ZOEDzfwn+7n8Nw/V9oPjfhf9/OPaH2QEVhShSiAEoy1ButEqBSaQEKjQOWXPDELnIRH+I0gbK4Y+phlG7HISH+E2ifVYoAmU4gDQkngoG9rbji6iGYbschIeMTYYzdXiwnbknGJPaRAQOi1L5fR9RPJ1eaBluhERMBegfSloGgo6pJp+a/C/xafqnF1BJjMkQkfEdnv/Gs+TDgEscjE74jRA9aJvnlLhLNHHHfMiMRyS44PxPpuolsxZIyl4BA7QU28s+rx45bckoxJG4Wew5YwfiXT9RLZiyRlLwQO20cIt8/8U649JjHpi8kztgPagehuUG3wx+EZso3dR1E9/fbwHToj1PTZ/2fKTkxkbo5K49hQPYtbePqfxDB0tetMRJ7d09P12HqQZYZiQHNdmA67SDbz4Opx5478ct0bq/aER6vHPJLFE3OHxDwQOpD5c/xvpIS2Snr4gEj6Xrn1mLHj9aUhs53DVA6lt83H+L9NkyHFCdyAvjT6XOf450kQDvJsXpEn6UIPVtbeSHW4p4vXjK8YF2PY8mT8e6SFee710B097QetavlZvxvpcNXLdYvyC6HtezH1ePJjGaMhsIvcwHSr43/AF/0u6rlt/j2+V7c/XY8GMZZnyGqMdeUDrtEjQ05fJP490wlt822637fL9Ll+N9d6eOMIEgzMTceNvvaD3AbS8/S9RHqIDJAERP8QoufW9fj6OIOQnXSIiLJRDstbfL6X8YxdRk9KpQmeBMVbfWfimLpCISuUzxCGpRT0rRb53R/iePqyYxuM48wnoXnz/juHFKUNs5SidpAH388IHs2i3h6T8Rh1UpQAlGUasT0OrWTrYRzx6aiZSBlpwAPFA6YZY5NYEEcaN2+V+H5sEcM54gYQEp7t3j3Lj/19GvUGKZxf95WiB7lrbwZ/wASw4cIzk3GXw1yXlx/jXmAz4p4oyNRlLhCD2bTb5vW/iQ6YxxxicmSXwwix0n4p62X0MuOWLIRYEu6B6ZLEM8JkxiQTHSQHZol8vps+MTzmENpjLzm/i0RD1rUG3wh+OTyx34MMpgC5eA/N9Hoeth1eL1Y6diD2KKdZNPNh/EMGaZx45iUh2FuH4pmnjwSMImVgg0eBXL5f4d1P7J0pzHBQjH47Hns/SgfSoMhEWTQcPX/AJXqV9ndXyt8T8S66fUdAMsYHbkHm1+HVA+iEhIWOEvix/EZ4OnxSyYzEyMcYF9q5e/rer/ZMMstbtvZA67W3yus/FR0sMczGxk7DtpbGL8UyDFPN1WI4hGqHeVoHsWm3wD+L9Tjj62TpyMPNiWoHjT7WHLHLATgbjIWCgahKEogqqoCqqgKoKhgCqq0AsXXd5eu/sZL/hl9T1vJ1/8AYyV/BL6kDL8J/wCFx/0ve8H4R/wuP3fqXvRRLlJ0c5MB5eKv2nNXNx+p9GL52A31Ob3x+p9EIGgSgJQFUqgON0c8bo0BVVRBVUIBQlCAucuXRzlygBVVhRQUslAznw3h+EMz4TgPlQNg0yClEChKGgIVVQG1VBBPBpApHCVQFVVACqqAvL12CWfBPHCt0omIt6lQPk+l/wDLd6jFmhklKNRlGRr2P1URSaSgSQzPGJgxkLB0IdFQPl+s/wDLYJkZdNIAH7M/zeSH/ltdUTRlADxs/k/ZUtNkHk/hv4Lj6E7735P4q49wfVASlgAzKNtqgfLS/wDLXlK/5o/5L9Fiw+nCMeaAH0O9KgfO9Z/5b0uqzTzHLW43Wzj73D/11fHN/wAz/N+oWmyD5f8A9dX/AMrH/kpj/wCWtRH87/mf5v06qQCIoNIVgCgi1tUDzuu/CcHWm5ip/wAcefn4vkS/8tY35c2ntjq/UK2QeF0n/luYMMhPITkkP4tI/R+b7YjSUsBnPGJAxIsHkF8PqP8Ay2sOSW7FIw9nIfoGZEgWBZ8EDwen/wDLawwluyylP/DwH3IwEAABQHADdKgSQ+Z1n4L0/VSM5AxmftQ0/wAn1VQPnP8A118V/wByVf0j831ei/DMHRD+VHU8yOpe5VIJ2szgJgxkAQeQXRCB4ef/AMtzpshJgZQ9g1CMH/lt9NAiUzKddjoH3KUKQTDHGAEYigOAHRCUBVFoBvVgCRb5/WfhPT9Wd2SNS/ijoX0FaDwR/wCW1096ynT6nSdBh6QViiB4nufm9SVIBTnlwwzRMMgEonkF1VA8Kf8A5bXTSNxlOI8AR+oezo/wnp+j82ONy/ilqf8AJ9FVIAAtWlUDzOs/Bum6uW+camftRNOGL/y3ekxm5CU/ZKWn3U+yrZBEMYgBGIAA4AbpKsBydX0GHq69YbtvGpH1M9L+G4OkkZYY7SRR1Je1UBCXPJv2+St3tagCB5tSgUvKqgIFKqoCqqwootVtAXny/EHa74cMvxBgLDcWA0A0FKqoAaghMUDRVVpBVVQFKFQCqFQM5/F8mWp8oYUCqqBJcsnDpJznwgeb+Gg/tOf3h9qL4v4b/wATnrxD7QRR17tM00iAKhEvMPBQKQE8Pz/4hHpMfUnL1k92lQxVw/QF8HJhz9L1eTNDD60cmoIIsfS0HJ+HTxDr/wDwaJhjnA+U6Wfc6dJ0OLqeq6g5huEZ6Dtfi74un6ufWQ6nLDbExMaB+Ae16uj6TLjzZ5SiBGc7jfcIHJ0uKHR9dkxYtIHHv29mfwvpMXWQn1OeIySnKQ82tAPf+yZB15zV/L9Pbft0eXH0/Vfh8pwwwGXDImUfNRiS0A/C+nj03WZ8UOAIke4vuEaPlfhvS9TDqMmbqALmI/CdPd8n2Cwh8v0fQjrejnDiQyTMD4Fx6rrT1HRbMmmXHkhGY/V9z8J6PJ02KUMoomcpDW9C8X4v+DT6iYzYANxreCav2tAOtiOp6vB0+TXHtMyPFfxnpMWPpznxxEJ4yDEx0err/wAPy5Tjz4CBmxcXwR4PPm6brvxADFnjHFisGdGzKkDLqoR6rqumGQWJQshv8TwY8M8GXFEQl6gj5RWnyezN0M5dVhywrZjBidW/xDo8nUDH6deXIJGz2QMuq/Fv2bIcfpZJV3iNHj6/P6mTpc8gYxMtRLt736ARebreih1mI4p6dwfAsKDqvW9M/s9ep23cPlQ6rrcXU4sPUbNuS/hdY4PxPANkDDJEcGRotdP+G55Zo9R1c7nH4YR4CBl+HQjn6nPmyC5RlsjfYL1OMdP1+GeIUclxnTtm6DqMGeXUdIY+f44T497XTdBnnnHVdXIGURUIQ4igc/T5B0XU5sUtIEetH9XnxicPw/N1P28tyv2Hh9D8W/C5daIHGQJDQk/wl7ZdLCWL0CPIY7fkgeF0s88MEcUOlBgY82PN7WI4suH8OzQyx2gG4i70e2HQ9f08fRwzgYfZlK9wH0Ow/CDDo59NGVznqZS8Wgvp+nx4+mG2IB2c14hx/A8MB0sTQuV7tOX0seAxwjGeRHb9zn+H9JLpcEcUiCY+HvRDxeiG3puqiOBKdPX+H4YDoIihUoEn2l2wfhssePPAkfzTIj2W9HTdHLD00cBIJEdtoHB+C4o/sQ0Hm3bnyzKQ/CzGPHqbflb9H0HRHpcEcMiCReo9rh0/4SIdNLpsp3CRkbHtQOAft8sXpeji9PbVGWlfS4Z8M8f4ZHHMgkTA8p3CrewfhXWCPojOPS44O+vD9y9Wb8JjLpR0uI7QCDZ14QJ6/FEdFOIA2iGgeHqyT+H4ffifb6jp/VwyxXW6O23ly/hfq9JHpTKjERqVdwgd8Tb5f4p00s2THPDkEM0LMBLu9/R4MmHGIZZ+pIfacfxD8OHV7ZRkYZIfDMMB5P7XmxZcf7fhidahlj2Lnj/aj12c4NhmKH8zw9j6OP8ACcs8kcnVZTl2G4xqhbr1f4X62T18Uziy8bh394aU8+GHqT1uPL1EsQmARtifNKP6u/4XjH7R1Mu++np6T8L9HIc+aZy5SK3Hge536boh088mQG/UlurwRDz+tH7J1ePqeIZP5WT9Cv4ZE58mXq5faOyH9MX0ut6OPWYjikavv4Frpemj02OOKPERSB82Cf8Aq7NX/eSv3W+9h2ehH+DYPdVL034dDBjliJ3xmZE3/ieP/qKh6cc0xh/7v/O/0QPP6yUZ5Om/ZNsYebZuHl3fN167p+snhI6nLijCxrs7vr5/wzDmwjARUY/DXIeSP4GJSBz5Z5Yx1EZcIGPU9P608XpZhDqYw0/xRXD1PU4Oox4urjCW7SGSI1e/rfwzH1e2RJhOPwyhyz0v4THDkGbJOWSY0iZnhA7y+J0t+p1fv/R92nlx9BDHLLIE/wA03L2e5A5PwQV0mP5sfggG3MO3qyfR6XpI9LjGKBJEfFHS9HDpd2wk75bjfigT1w/kZP6JPjTH/qIv/B+r9DlxDLCUDxIU4Y+ix48I6et0ANuvggc5yAdJvOkfT5+T5JH/AKhx/T+r3w/8t/BE0TOUO0DLR7Y/h2KPT/supx1Wp1QPK/FKHTYJdhLH9T0/jkwOjyWeePa74/wjDDAemO6UCb8x1HucB/5b/T0YzM5gihvle33aIHL1os9GDxuj9Tr/AOXBE+hE3QExZfSyfh+PJ6e6/wCUbj/m75cMMsTCY3RPIKB4ObpOqOKU8nVD09uvkHD6P4UI4ulxgT3RA0mRt+txH/lv9NoCZmA+wZeV7uo6HH1GL0JjyaaR04YU6gbSzCIgBEcAU0iCqqgKqrABUq0CqqgAvL1+vT5L/hk9by9b/Yyf0yQMfwg30uP3Pe+f+EEfsuOvB9BFEucw6WxJgPKwiuoy++P1PoB8/CQepy14x+p9CKBoEoCUAqqoDB0c8dujQFVVEFVVACqqAucnQuciwoFVUBRJLJQInwnB8KJcJwfCgahpkNICqrVogpQzHdZ3VX2a/VoLUKqAqqoCqotAKCa9qNy7kUpWdyNzBBSs7l3IQUrO5dyEFrbG5dyEFqgJaQVVUBVVQFCUEoCrJkEbwgUrG5O5ApbY3rvCBa2xuXcgXasbkb0DRbc9ydyBasgpJQCrBK7kClY3LaBdotncu5ApWLTuPggUrNruRS1YtNlEKVjeLpbQLW2Ny2wpdotkgS5RxoECwUsbl3IFE08mf8R6fAduTJGJ8HXLKWw7Pio176fmPwn8Nx9aJ5M9kiVbQe/ie7QfTYuqx5heOQkPYXcSfCyfgmHH58EpYpDiW7809L+JzxZB03WUJH4cg+GSB7tq5iTW5EDwU2xuQJGtdUCzIDkptwnihkkJSFkcOm6m4EUmi2xvSJMKUqLSgFAVWFFVVADz5PjDtrfsccnxBgLDYYAbDQKVVAUxQmCBoqq0gqqoCqqgKpVAznyymfKGFAqVQMyxPh0k5z4QPN/Dv+Jz/wCl9kF8b8OJPVZ/DyvsgsKIFNAoYx4447Ee5Mj7y0haWatpAEuNEAHvq0deVaAAJpVBsIggg6ppVQGlpVQBRv2JVUBpApKoAI8FpKoASqoDSKSgG0UaWk2rCAWkqigpNJQ0gpVUAUlVQAqVQBSpQgK0qoBQqoDS0qoCq2qAo7pVAVpVQFVVAaVKEBpVVAVVUBVVQGlApVQGlVUBVUoASi0oCqqgKqhAKKUmkoChKoCFW1QABXDzdd/Yyf0yep5eu/sZP6ZfUgYfhP8AwuP+l9APD+Ff8Nj/AKXuRRLEmyxJgPLxA/tOY+2P1PeHgxf8Tm98f+i94QNAlkNIBVVQHHw6MY22kCqqgKFVAVVUBLnJ0LEkCVVWFAiTSCgZS4XBwsk4OEDYNMtIClC3TSBVVQFVVAUX2SqBEyQCQLPg+f1GHqMs/LIxhXjx9HL2dVv9ORxmpVo4Tj+04hskYnxB+txbHA7Uw9WHTuOQ5cnSzGOc98ZfSGOox9RgjvOUkX4ljN0h6SsxInR4KOr6rLlhtlj2x5t5t4Y4HqSlp1hp6soR6g4vW9TSrqzbOGPUZoHIMh07W9UP+D/0lfwr+0fe2MYnYy7QrOFhaDz445ZMZzGUiQaocvoHF1E8UDvMZAHc8kxkzZ5fs42+NafS92DDkwQl6s7FfR82LQt3ppPQ4emjm6ncBkIr2lERnOY4RkN3zbv+Fcz+SwH/AIafefqS/wAcdStw7rDBFS6PqB5vWPHtcOlhm6iwMkhXtL1/iOXLiAMDUToU/hWAwiZyFbuG/wCUSzHJqnNx2HX0uKeKNTluN8vShL1R5G5cgW3zes/GcHR5PSybt1X5RfPzeX/14+m8J/8AJ/zaQ9y1fD/9ePpvCf8AyXo6T8Zw9XkGLGJiRv4o0NED1HDq4TnilHEdsyPKfB2RJEPkut/6w6KIlkzkgmvKW8eP8Ry4RnHUHaY7uTbyfiOXq+qznppjcYyO2MR9H3PZPN1/S4f2f0RUY7d8fNp9KKc/Qnr+u3ennI218R8fkWceTrsnUHpRnIkCRfbT5PZ/5bYr1f8AQ5dIP/UrL3z+pAy6+XX9AInJnMt11tJ7OnUw6/p8Przz3Hy6Am9fk4/jubNLN6WQAQjrj05BT1WbrpdPtzwAxeXzUPl3/RA16bD13U4vXjnIj5tDzp8nPoJdb124QzmO2uT4vqfhFfsP/LeP/wAtsf3fdFA2/wCrvxD/ANKfvkv/AFb13/pSfvfPz9Z1+POcEshEt1Dw14+Tp1n/AFj0gBy5dJHbcSPv0QB0mPrepnPGOoMZYzqCzm/bcOcdOc8iTXmBNavqfhP4eekEs2WQMpjsbAHvfO6rLDN+IwMCJC4CwgfRfh/T5cEDHPk9SV3u1eqYJBA8EhJRD478Rh1XQGIlnMt91Vim+s6frOkxerLqJSGmgJHPzcvx3Lmln2ZgAI/29Oy9dPr5YQOpiBjsa+X5cIptg6Tq+o6f9o/aJAEGW3dLs5fh2HquvEjHPKO0jkk8vrfh3/quH9M/1eX/AMtr4cvvh+qBw9EOq6nNLCM8htvUk9vm1OPUnqh0vrSu9u7dKvot26GP7F10x1FQEhLaZaA2fFEJxy/ionAiQMuR/Sgc84dSOqHSetKyQN1mntzfhXVYscsh6knaLrVzyf8Aq2j/AFR+p2/Hc/U4pRjAkYpjbQ7lA4/w/p+p64SIzyjtruTz82Bj6g9X+yetK7rdul+b09Fg6/ocROPEJb+x+IV8w49FLJL8Ric4rISdw+SgE9fhz9FKMZZpS3C+S9OToZ4iBk6vaSLqV/mn/wAuL+5j9x+t9T8R6LDnxepliSccSRRrsgeOenHfrh/yj/2nHqIzww9SHUnJqAdsjp97X4V+FDrAcmQkYxpQ5Jd/xX8OwdHhvFdykPilaBOPouon0/7R65rbu26r+HdL1HWgzGYxESPE3976WAf+o3/zHL9XL/y2/wC1k/qH1IHvDh838U6XP1EYjBMxN6i6BfSOofK6G5wy9PmJlkjIiZJ1IPBQPMzdNk/DYerHP5/4P4nefS5eviOqx5ZYxKNmFyqx4auOX/y3CBKXq3V7dPrZwfiPVywCODCDEDbuiD9SBy9B0/UdbKURmlHaB8RkXPB0eX9pPTQybTZuQvWnv/8ALc+LL7o/Wz0oP/Wsv6p/Ugcs+jyS6kdLnmSPsknn3W79D+FnLOYnCUccRtjv1qXiKp6/x/IKhi2gyOol3HuZ6X8M6wSGXJmMSO1mX09kDz+r6fP02aOH1pSsDWy94/COpokdQdPeP1cPxWcZ9bDaQa2g173q/GBPP1GPp922E/rtA48uA4wb6wEj7Ikf+0x0HT9R14kY5pR21zKR5e7qvw/ouixH1LMyPLcjZPuFPl/h/R5eruECYx03G9ED1f8Aqbqa/wCIP3/m8EsOePUjpfVlZIG6z3+b3dPKf4b1MellMzhkA57EuUif+tR/VH/ooG//AFL1Ff8AES/535vndFhzdZlOEZpRIvUk9n2/xjL1GHHGeE0AfOa+h5vwDpJxlLPMaHyx9viUD0/w3osnSCQyZDk3VXsfRDBO0X9TaIKqrCiqqgRK+zlPkO5ccnIYAhsMtBoCqqUBTFluKBaqrSCqpQAqqgKUJQM58stT5ZYUCpVAgsT4dC5y4QPO6OIj1WXxMY/W+remj4ks8umzzmISluAHldf+tMl0MGT26IrPVnOMdZGhbYfHP4lkkNcGSvcU/wDWeYUP2edoh7Frb4//AFrm/wDSedBH/WnUVf7PLX9/BoPYJATb4/8A1l1N0Onl7df8l/6z6jn9nlXvQPYBTb44/EOqJr9mlfvUfiHVGz+zSoIHsE0gF8j9u6zj9mlajr+rJr9nkAOdUD2LUHxfH/b+sq/2f3apHW9cdP2f/nIHr2tvj/tnXGz+z6f1I/a+vr/hxZ/xDT70D2bUyfG/bOuv/h9B/i/zX9q/EK/sD6UD2bRdPkev+IHT0QPbaB1H4hz6Ma8L1+tA9m0W+P6/4joPShZ9v+f5p9b8RJ0xQof4uUD2LRb40sv4kASccB/q4UZPxI8QhXjuGv3oHs2m3xt/4nqdkPYLC3+J8VC0D2bXc+Pf4nd1jrw8Vr8Tr/d6/d+/zQPYtbD4+38SvnHQ+/8Af5I2/ifN4/d+4QPZ3LufHOP8SNDdAe1Rj/Eud0ED2NwXc+P6P4lX9yGvsH5L6P4jf9yGns/yQPY3LufH9D8Sq/VjfuT+y/iBoetH6ED19yDMB8j9l/ELJ9aPsFf5fmv7L+IVXrR99f5fkgetuXc+SOl/EL1zD2aI/Yuur+/qfYgevuXcHyf2HreDn0HsX9h63n19fd+/1IHr7gnc+N/1f1tV+0e/y/5p/wCr+su/2j3aIHr7l3B8j/q3q6/4g686L/1b1N69RKh70D19wXc+P/1b1Wp/aJWf38V/6r6jQftEqCB7G5dz5H/Vee7/AGiV9tF/6pzVX7RP26f5oHr7lBfI/wCqcx56idDjT/NA/CMta55WeUQ9jcjc+T/1PPvnnSP+qZA658m48a/5op7G5dz5H/U0qo58ld9Uj8Hld+tk041QPW3I3Pk/9SaV62T2pP4KCf72Sh7UQ9bctnwfJ/6l/wDK2S/G0f8AUcar1Z170D19y7nyR+CgG/VyX21X/qSNV6uT26oHrbl3Plf9SRv+7l9nmR/1JHX+bls8ncPyRT1ty7nyv+o4afzclDtuUfgcBr6uS/egeruTb5P/AFFj49TJXfXlP/UeO73z9nmQPVtG98n/AKix/wAc9efMk/gWL+PJXhuQPV3hd75X/UWLX+Zks99yf+osWnnyV4bv8kD1N6N75g/A8V3vyE/1f5IP4Fiqt+T/AJSB6m8LufM/6jw38U67Dcj/AKiw0fNOz33IHq70bw+X/wBQ4NBc6HbckfgOHU7p2f8AEiHonJ4EUOXn63IPRnRAO0vN/wBQ9PVXP/lr/wBQ9PdkzPvl/kinR+E/8Li/pe9y6fAMGOOOPERQt1RAFzkHVmQYU8nFf7Tmvxh9T3h5zijDNKY5nRPyegIGgSgJQFSqlArHdNueMl0aAqhKIBUqgBVVAXOToxNAlVVhQILSCgZy4XBwsuEYDogbtMe5qF0N1X3pAKk1qqUQA1SqtAqqoCqqgAh83Ljy9NIywjdA6mPg+mzblqe83W0dq6HhZZZ+trHtoez83q6/Hs6cRu62h9O2ZASFHUOeODxxZ19zGuEKux52MX0f+kp/Ch/LP9T3wxxhHbEUB2RDHDHe0VZtsYz2Ed01ZdXJy5+hMpepikYTPPgXkn+HZshvLOwPm+zaNGOiCzbI8f8ACRrP5JgP/DT7z9T6kccIyMgACeVOOJIkQLHBXHTsNPMTdnHxIcmKOSJjLgvNhynBL0cp/ol4jwey2MmOGQbZiw1rdanNW/xtoagpYjQFDhNujmAwBR6cfAfQpmdwAHl7m2raIJ9OPgPoCiAHYNWyJAkjwYIKUraLQPN6/o5ykOo6fTPD/nD+EsY+th1eGdeWcYy3wPMTT6ppwPS4vU9baPUqt3doPA/8tsaZa/wfq5dIK/FpD2z+p+kx9NjxSlOEREy+Ku9LLp8csgymI3x4l3QBm6TF1EduWIkPa8H45ADo5AaAGP1vrAokBIUdQpEHi/g8Qei0/wAbyf8AltjzZR7Ifq/QYenhgjsxio2TXvWGDHjmckYgSlW4jvSBOXo8OaUZ5IiUo6xLWfp4Z4HHkFxPIdbW1Ig+eyf+W3rWPKRD+Eh8+fRjouux4gSRcDZ9pfsXDJhx5iBON7SJRPtUg3DTIocJtgMs/TY84rJESA8Q+V/5cEP/AAXT+KL7dsyAOh4aDxvw0X+HgDXyz/V5f/LZHlyj2x/V+gxYoYYiGMbYjgBYYIQkZxiAZfEQOUCc3TY+ojsyxEh7XHp/w7p+l82KAifHv972otSIPl80dv4rE+Mo/wDRff6npYdTjOLIND93tDrPDDIYylEExNxPg6KQeN0/Vz6af7L1Z1/3eXtIfm+dVfiw/qP/AEX6bLghlAGSIkAbFi0Sw45yjKQBlH4T3CB83/5ccSJ45VpR+t+ljHdGj4Iy4oZY+nMCQPYugG0KQeHl/A5wkZdJlOMH7Nmvu/J8rr/wrP08PWzZN5uu5+t+xtBAkKIsFSDx+miZfhtd/Tl+rj/5bhrHP+ofU+5jwxxREICojgBEMEMZlKEREyNyrugavm/iHRZJyHUdMduaIr2SHgX0rXlgPl+o6v8AEssTh9IxJ0JjH9eH0PwzoJ9J05jk+KVyIHbTh9dS0HzH/luxqeX3R+ss9OCPxWQP8U/qfpI4YCZyADdLQnxTLBCUxkMRvjxLugYdV0OPq4bMg41BHIL4+b8E6k6HqCYf4jL6n6NbUg+M6joR0XUY8V7rMTdV3fpur6GHWQ2T0I1jIch6cuCGYVOO4A2PYXSqUg+aP/lvGAlOeTdQJFR1+suX4HKWPHmmImRG07RyX6kuUMEMcpThEAy+Ku6kHzv4dhydf1J6rKKED9/YfJZx2/ioH+IH/mv0wizPBCcoylG5RNxPgpAyhGcTCQsEah8zFkP4ZkGDKScMj/LyH7P+EvrimM2CGeBx5BuieQgaA2NEi615YxY444iEBQGgDbAFVVABNKlUAOOT4g7OOT4gwFBoMBsNAVVUANxYbggWlCWkFCUICqqgKUJQM58stT5ZYUVVUCS5y4dCxLhAjCNS7iLhh0L0sRWTtWkyjuBB4KY8atINI2topAnaFADSBAAmQ5NX8mkCAtKBra3ZqkB2o2tKgClpLMICAoIBpFNKwpO1FBukIApaCnRKA0FoJVpAGAIoiwyMYAoCh4DRtUBpFLu1ql1QDS0oSgClpKEAa37E0lCA0tKrAK0mlaAUtJVAFIppCAqqUAUtKlAFLSVQJpaaVAmlShAK0oVAaWkqgClpKoAVbSgBaVKAFpKoApaSqAqtKgNKq2gKElAQFK0qAjVVSgBaSqBE5CAs2fc1VikqgACtAzISryVft4bVACpQgLJaQWFOTIPOHQOeT43QIFrSpQFSqlAqHDbnjOjogKVVpBVVQFCVQAxJtzmgBUJYUWS0zJAiXCMHB96ZcIw8IG4aDALYQCqEogK7pVDQHhVVAVVAvugCYJiRE0a0Lw/s3Vf9793+T6CuWpN1u69DzfR6q9vqiz7E/s/VHnKPofRVce1mvcfReSPN/Zuq/wC9+5ZYOpiLOUUPAf5PpIZx7WPcfReSPP8A2bqufW+5H7N1X/e/c+itLj3j3H0Xkjzv2XqT/vvu/wAl/ZOo7Zj9D6NKuPaPcfZ5I80dP1e6vV8tctfsnUHnMfofRQ3j3j3H2eSPO/Y+o7ZvuT+ydT/3x+h9BWce1j3H2eSPO/Zc54zE+Kf2TqP++P0PoAAJbx7WPdt2eSPO/Y+o/wC+P0I/Y+o/74vopXHvHuvs8ked+ydR/wB8foQeiz/98fofSQuPax7luzyR5w6PqBr6xSejz/8AfS/f5voKzj2se5bs8ked+xZ/++KP2LPz6xfSKCuI9x9nkjzv2LN/30k/sef/AL4/Q+gtLj2se5bs8ked+xZu+aX0L+xZv++L6NJXEe5bs8ked+xZj/vpfv8ANH7Bl/76X7/N9FW8e8e5bs8ked+w5R/vpL+w5f8AvpPoquPePct2eSPP/Ycv/fSX9hyf99J7wbSzj3j3LfKR5/7BP/vpLHoshFjNPV9BW8e8e5b5SPP/AGCf/fT/AH+af+r5f97N70rj3j3bfKR5/wCwZP8Avpo/6vl3yz+l9FVx7x7tvlI8/wD6vl/3s0f9XS/72b6Krj3+Y9y3zB53/V5/7yf0r/1fL/vZ/T/m99JXHv8AMe5Y87/qzW/Unaf+riOMs/pfQSzj3+Y92x53/V5/72f0qfw4n/eT+l9FDePf5j3LHn/9XH/vZI/6u/8AKk/pfRVce/zHu2POH4fKv7s/p/zX/q0/95N9FDOPa/Me7Y8//q4jjJP6V/6vl/3s/pfQVce/zHu2PP8A+rT/AN5P6V/6uP8A3sn0Erj2vzHu2PO/6tP/AHk/pX/q4/8Aez/f5voquPa/Me7Y87/q4/8AezR/1dIcZZPorS49r8x7tjzv+r5f97P6V/6uPbLL6X0WZR3CvqXHtfmPdseePw8n/ezT/wBXH/vJPoBK49r8y+7Y8/8A6vl/3sv3+af+rpf97J7hbS49r8ye7YjFj9OIjd13bVXRzbkVQqAVVCAuOT4g7OGT4gwFB0DAbDQKVVADUGW4oFJQlpBQlCAqlUAJVUDOfLLU+WWFChVQJLEnQuckCMXxPS82Ll6QxFYhKEtIKapA14aRAKpKtAqlUAKqGFG0oSgKqqIKqlFAqJA9mmgClKCaFogBEDjulQlACpVFFVVEFVBsWqAoSgsApQmrRRVUtIBVVACqrCitsyNNIBVVaQVVUBVVQFCUUgKqqAVVUAcKlCADICge/DSEoCqqgKqzG683PsQKVVQFVVAVVUBVVQFHdb8UGYBA8UClVCBSFCoBQDeiUIBQCTzoiVn4TWv3JQFVVADJLRZkwpzZPj+TYcpaZK9jsECwlASgKlVKBWO6bYhw1bQVyrzf8PIAfBL7j/m9LWiCqoYBVUoAYk2xNAhUqwoslpkoES4csebHDyylEG+DIOsuHgl+GdP1E/VyRJnY1sjhA9GUxAXI0B3LA6vD/HH/AJQXNgjmgccxcZcvEPwHo7vYbH+ItB6hmIi5GgO5Yh1GPIahKMj4CQKM2COeBx5BcZaF5+l/Cun6SRnhiRIiviJRDpydRjxfHIRv+I01DLHIN0SCPEPN1f4dg6wg5o3t41dOn6XH0sBixCo60PegE9XhEtpnG+K3C3SeWOMbpkADuXhl+C9LLJ6xh5yd12eXsz9PDqIHHkFxPIQBj6nHlNQkJH2G1ydTjxGskhEniy49L+GdP0kjLDHbIijqT9aer/DcHWEHNHcY8a0gdEMscg3QII8Q5HrsAltOSF3Vbg10/TQ6aAx4hURwOXlP4P0pn6hh5r3XZ5+lA7Z5YwG6RAA7ljH1WLKahOMj7Cufp4dRA48guJ5DzdL+G9P0kjPDHaSKOqB0ZerxYTWScYk/xEBvHmjljugRIeI1eXqegwdWQc0dxGg1I+p36fp8fTQGPEKiOAgSeuwCW05I3dVbtPLHHEymQAOSXil+DdJKfqHGNxO6/a9ebBDPA48guJ5CBOLq8OY7cc4yP+E2ubq8WAgZJxjfG4ufTfhvT9LLdhhtJFXZ/Up6n8PwdWQc0BIjhA2xZoZY7sZEh4hxl+IdPGW05IA3VbhduvT9Nj6aHp4htiOzzS/CellMzOMGRO4nXlA6p5Y44mczQHJLli63DmO3HOMjzQLrlwQzQOPILidCHDp/w3pumlvw4xGVVYQNM3V4sFDJMRJ43FrFnhmjuxkSj4hz6joMHUkHNASI4tvD08Onj6eKO2I7BFMpfiXTRlslkiJA1V93onljjiZzIERyS8svwvpZSM5YomRN3ry9OXDDLAwmLieQgZYutw5pbcc4yPNAtZ+rxdPQyzEb43Fzwfh/T9PLfigIyqrDWfo8PU160BKuLQNMPUQzx345CUfEOM/xHp8cjGWSIINEW64Onx4I7MURGPgHCf4Z0uSRnLFEyJskhgOmeWOOJnM1EakuGH8Q6fPLZiyRlKroF3nijkiYTFxOhDjh6Dp8Et+PHGMqqwgHP1eHp69WYjfFtYOox547sUhKPFhGfpMXUV6sBKuNwThwY+njsxxEY3wPFAwy/inS4pGGTJGMo6EEvTLLGETORqIFk+xxn+H9PkkZzxxMjySHeWMSjsIBidCGg58P4j0+eWzHMSlzQa6nrcXTAHNIRB4tGLoenwy348cYy8QNXTL0+PNQyREq43C0Cen6vF1MTLFISANaOOb8V6bDM48mQRkOQbejFgx4RtxxEQe0Q55Oh6fLIznjjKR5JjZYDSXUQjH1CajW6/Y4YPxTpuon6eKYlI9no9OJBgR5ar2MY+jw4pboQjGXiA0E9T12HpQDmkIiXFp6brMXVRM8Mt0Qat0y9PjzCskRKvELiwQwiscREewIHJm/FumwTOPJMCUeRq9hzRjA5CfKBuv2OU+iwTkZSxwMjyTEW7GAMdpGlVSBx4PxbpuomMeKYlI8CnTqOuxdKBLNLaDxoT9TWPosOKW6GOMSO4GrrkwY8oAyREgONwtgMul63F1cTLDLcAaOhH1uOf8AF+l6eZx5cgjKPIp68eDHiFY4iIP8IpifR4ch3ThEk9yGgr1omHqX5a3X7Hlw/i3TZ5jHjncpcCi9mwVtrSqpxx9Hhxy3QxwBHBERaA9V1uLpIieaW0E0EdL1+HqwThluEdC7ZMMMorJESHtCMXT48OmOIiDztCBy9R+LdN00zjyzqQ5FH9A9MM8Zw9QfCRuv2IydHhyHdOEZE9zEEugxgDaAK4r2IHDh/GOlzzGPHO5S4FPT1PV4+mjvynbG64J+pY9HhgRKMIgjggN5cEMw25IiQ8JC0DLpetxdUDLDLcBodCPrcuo/Fem6afp5Z7ZDkPTi6fHhBGOIiDztFIn0eHITKcIyJ7kMBUcsZwGQHykbr9jyYvxbpc0xjhMGR0Ao/k9oxgR2gUKqnGHQ4IESjjgCOCIhoD1PV4+lhvynbG6tnpeuw9XZwy3Vy65MMMo25IiQ8CjF0+PFfpxEb5pAw6j8T6fpp7Ms9suao/o9GLNHLATgbiRYPsYy9HhzHdkhGR8ZRt1hjjCIjEARGgAQOKH4v0uSYxxyAyJoD2vRm6mGCHqZTtjdWVj0PTxluGOIkNbp0y4IZo7ckRKPgdUDHpuuw9USMMt1c6H9Q59T+JYOmlsyzEZHWi74ulxYb9OAjfO0UuXpMOY7skIyPiQgHDmjmgMmM3E6gvNH8V6WUtkcgMidtUefoeyGKOOIjAVEcAOA/D+nEt4xx3A3e3uwF5+oh08DkynbEd3PpvxDB1RMcMxIjU075cMcsdswJDwLGHpMOAk44CJPNIGfUfiGDpiI5ZiJIsXbrhzwzwE8Z3RPBZzdHhzkSywjIj+IW3jwwxREIARiOAEDlH4r0pn6fqDde2va9GbPHBHfM1EclzHQ9OJbvTjuu7ru7ZMMM0TDIBKJ5BQMcHXYeoJjimJEc1a9R1+DpiI5ZiJIsW1h6PBgJOKEYk87Qubo8OciWWEZEcWgVhzwzRE8ZEonghwj1GPNMjHISMdJV2ejHhjijtgBGI4AeePT48UyccREy1lXdA6Q2GA2gFVVADcWG4oFJQlpBVVQFVVAVVUDOfLLWTllhRShUCSxLh0LnJAnFy7gU44e7uGIrFplIaQOgVUogFVWgKFVgFCbVFFVCCAUAqqtIKqixdd0AlVQwpSFCWkAqoIthSlQqIKbQrShWlVEECtFVCApQUMKUqq0gqqEBShUAJVUBShUAraFQCqFtAVtbRaAVRabQCrNraBSFtUBVklIQCqoQDaoW0ClQtoBVFqUAoUFbQCqCaSgNKqoCqotAIVVQG1KsiQPCBSoW0AotUMKG2StoKBzT/uOgcp/G6hA0CUBKAqVQUC4HRqgzjGjaBOTGMkTE93Pp8hkNs/jjoXdwywIkMkORyPEOl0IbqzCYmLjw0wAVVQFiXDbEuECEoSwoslpBQM5IwjQ+9Mlw8fNA1aCEhAKUJaQVVUBVVQGlVUBZJSXj67OcOGUxpXeuPagHN12HFLbOVEc+z3+D5fW/iOQTIwzGwV5gL9+tH7nh/ajKI2yJjMGMhXM7Fnu8OTJLZKMTtiZVIcDX7ginr/t+fDkG7Jvj5bqPj/p8Pa+zLrMUCBKQFvyMJnHMCRMtNdkrsAe/QfvTt0/UHHD0gQIzEd4I9tHj60D7EFp8b8J6wZZTxxluiNY8+UfN9kIgkWlVQFVVAVVUBc5zEBZbLwdXImVHgPLMvxUnXLrycFy6wdgz+2+x41fN7tok9XtV6HZ+2+z71/bf8P3vGv7/v8Av/kWbYvtV6HdHrB3FNx6qEu9e985Us6xl5VT1P2iHiEjLE8EPk2dFvu699zEE9ldT1zkiOSEGUJ80aN/N8q0W158bE9hdT1/UiO6PWh4h8m1te/2D2F1PVOWMdSQoyw8Q+UtpZ/YPZXU9fcObTd8Pjkp3kd2rPT2I8jtPXtO58feebSMsh3LffXQnsdp69oJfJ9WfiWv2ifiW+9Unsvqepa2+X68/FfXn/EV71UPZZ6lpt8oZ5/xFT1Ez3LfeqPZZ6trb5JzTPcrHPMcSLPer2j2X1PWtbfKOeZ7lqXUzkKuvc1Z1WPZZ6drb5HqS8S6x6uYFc+1LOqyPJex6Vrb5v7XP9wn9qnVH6W+7UezY9G1t839pyeKf2nJ4s96o9lnpK8McuWQBA09z1wkSPMKLut1bQ52o6ickeL14TviDtvVbBYOaI4sn2Bs9SQaoJA5SGJ4Y5Pia52Io3KEgeGnH9nh4OoFadkm91AcbBVVaZApHglUAaqlUUCpVEAWS2gopCg+KziJCjwWYR2RokyPiUC0sGVNICXGfxB2lIDlxn8QQLDYYDYQCqqgBuPDDcOEC1QlpBVVQFVVAVVUDOfLLWTllhRVVQAXOToXOSAMPd2t58He/F4JR/EvU0MNm7Tx2sRWevaQXl6mOU4z6BAyfZvh5uhh1wmT1JiYV9nx+hpD1LUF87r8fWTMf2ScYj7W526GGeGIDqZCWSzqPBA6yVJfGz9P+JSySOLLEQvyggcf8l9LPDJLFKOM7Z1pL2tBruB0Tb5fQ9N1uPIZdTlE4VwPF0/EOn6nNt/Zsgx1e6+/3MB3mXgnc8nRYc2LHt6ie+dnzB48/Q9dPLKWPPtgTpHXQIHsWtuObFKeMxhLbIihLwPi+f0XQdVgyiebMckaI2+1oPV3BbeH8Q6PN1IiMWQ46u67t9D02Tp4GGXJ6krvcUDqM6IHjw1b43V/hPUZ8sskOoMIk6Ro6fe+nPEZ4jAGiY7d36ohra2+V0f4Tk6fIMk80pgfZN/m79f0MusiIxnLGQb8v+1FO4S7J3PF+H9FLpIGEpnISbuTy9Z+Dnqcpy+tOF/ZCB625d1uXpfy/Ts/Dtvu+d0n4NHpsscvqTlt7S/2sB61rvePr+hHWwEJSMQDflZ6D8Pj0QlGMjLcb8yB2nIByU7tLfJ6r8ExdVlOWcpgntEvojCBj9LWtu32tBfqx8WjkERZIHv0fK6X8Dw9LljljKZMeNxH5PV1vQ4+tgIZCQAb8qB1RyCXBB9xtEs0YmiQD73l6H8Px9FExxWRI2dzj1f4J0/V5Dlybtx00KB6W4VfZyHUY5GhKJPsITDBGGMYh8IG35Pn4PwTp8GQZYCW6JsXIsB6M8sYC5EAe1YZoZPgINeBefq+ixdZD08oJjd6GkdF+H4eiEhhBAlzZtoOifU48Zqcog+2QDYyAjcCCPF4Oq/COn6rIcuUEyIrSVPXjwxxwGOPwgbR7kAR6vDI1GcSfZINTzwxjdMgDxLw4fwTpcMxkhEiUTY1enqekx9VD08ouN3SBpi6jHm/tyEq5o2jJ1eLEds5xifAly6ToMPSX6Mdu7nVnqfwvp+qn6mWO6VVyR9RQOuGSM47omwe4cR12CUhEZImR0q3TFhjhgMcBUYigHjx/g/SY5jJGFSB3A33RDszdRDDHdkkIjxkaRh6rFnv0pxlXO02jqOlx9THZlG6PNMdN0WHpb9GO3dyilZetw4Zbck4xPgS6xyxnESibB1BeXqPw3p+plvywEpVVl6MeGOKIxwFRAoBAwj+I9POQhHJEyJoC3bLnhhjvyERj4l58f4V0uOYyQxgSBsHXn6XfP0+PPHZliJR8CgDB1mLqL9KYlXNM5+vwdPLblmInnVem6LD01nDARvmlz9Bg6g7ssBI1VlA1hmjliJwIMTqCHmj+KdNKWyOSJkTVX3enHhjjiIQFRHAcI/hvTRlvGOO4G79qBtm6iGCO/IdsR3Lng63F1BIxSEiOXXNghmjsyASiexc8HR4enJOKAiTztCBHUfiGDpZCOWYiTq7Ys8c0Bkxm4ngsZujw5juyQEiNLk648UccRCAEYjgBA4v+t+lMtnqDde2qPP0PVnzw6eByZTtiOS5/wDV/T7t/px3Xd13d8uKOWOyYEonkFA5um/EcHVSMcMxIgWV6r8SwdJIRzS2k6h1w9JiwknHARJ5oJy9NizG8kIyI/iFoDg6iOeAyYzcTw8o/GelM/T3+a9tUeXtx4444iMABEcAOQ6HAJbhjhd3e0cohXU9VDpoHJlNRHLh0n4ng6wmOGVmIs6U9OTHHINswJDwLOPp8eI3jjGJPNBFOfq/xTB0khDLIiRF/CS9HT9THqIDLj1jLgrmw4p1LLGJ7eYW6QxxgNsQAB2CIed/170hn6e47r28d7p7ep6qHS4zlyaRjyn9kxA3sjfN06ThGY2yAIPY6oHH0f4ph6yRjiJJAs6I638UwdHIQykgkWKFvVjwY8ZuEYxJ/hiAmeCGQ3OIkfaAUDPpeqh1OMZcesTdX7HiP490oyelct27b8Pd9OGOMBtiAAOwZ/Z8d3tjfjSBHVdVHpcZy5L2x5rX2PP0X4ph62RhiuwLNinuMBIURY9qIYow+EAe4UgcXXfiuDoZCOWwZCxQejpeph1WMZsfwy4t2ljjLUgH3pEQNAEDyT+PdP6vpVLdu28d7p7ur6mPS45ZZ2Yx5p29ON3tF+4NGIIo6opwdD+KYutMo4t1xFncP8yx1v4ti6OYhkEiSL8ofREBHgAIljB5AKBwdD+KY+tlKOMSBiL8wZ678Vx9HMQyCRJG7R9AQA4ACDEIHDg6mPUxjliCBIaX73rDlKjIEeDsGAsJQEoCgpQUC4cNsQFBtoCqqiGUsWu6B2n7ij1TDTIK/wAQ4/ydkNnqB5VxN4T/AID93+TsxoCzIaNMlAhVVhRZkaaQUDOS4eFkuEaIGqQhIQKVCQKaQKqqAqqoCqFQFiYBFHUFtBQPkusw4+nzmEOBrX3/AJPm+pcybPh+/b6X1/8Ay4MEseQdQPhmNkvf/m+KcWTBKpRMdL+R8WlNcmLy1dCydAB39w/JncJizd3deI5czKUroWavx+bp0vTz6jLHAAbvX2BA+z6DpYdPjqH2vMT4vaHPHHaKHAdGECqEoCqqgKqqAC8nVYjLzD5vRlxepWpFES8prjt7m6cXryUG624uTxiKQ+pPp4S7V7nM9HDsS+R5Np7D1LOqeemnt/Y47rHDv6MPAL2bPsDzqo8ohafTOCB7PLl6Yx1jqHN8u1Vgarm1ZyrSyJjoQUh5xCOskp/f9/3/AMzSiJlwyokCtbCOzXpSPYrVklGSl09Gf8JQcch2P0OmsRyRm8+TrceORgbJHNC6eswPg+d12OGK81yhKQ2kjg+91VKYZm1oUo0n+IYIVc+RY0KP+s+n/j/5peLpetxYcAxyNSo9nX8OjfTSNd5fU9eCSxk5e43ENG//AFn0/wDEfoKj8S6c/b+4/k5/hgP7MJAWbLn0Qn1nVerGJjGMaKVFNsHh89B7jhaYnQfxPp/4j/yT+SP+s+n/AIj/AMkt9SeoGaPTYgN0huuXg8/WdN1sMM5ZDDYBrQ1Sy09mvnuI8yN/nzOvB1ePOagbI14dpzEImUuBqU/h3SmfT4zoPK9Z6M+Li2W5wTg2sxRi8TyP+tOn/iP/ACSv/WfT/wAR/wCSXmyHL1PVREccv5R8wHg6dTkGbqcA9OcAJV5+729mYlP58Dk859nz4m3/AFp0/wDEf+SV/wCssB+0f+Sfyer8X6r9lxbBCxkBjY0p0/C8cum6OO8GwDKnXsqNzPvW7DhH4n05OsiP9JSfxLpr8sjIf0lOPH1PWYx1E8kcWM+YAR7e14fwzL1MZZIdLGMyTZnPgD/NiyF8/wBivOZ3S/EemiLEpf8AILtj/FehiNZEn+iX5Njq5ZsOfHkAjlxxIkI8cchH4NIw6CMgCSNxod3dcmqxMPMsx/606EnmV+GwvpdHlxZ4b8Pw3VkV9b4n4Zkl1vWy6raYw20b8eH6SLpZdVikZd29zCWGWQ3I0O1NDAR9ou6s4Lq/MvNmccMY8OgAGgVXSSRhtsKoVpAoukWm0BSUKgFVRbQFCbVAaVVYAH2ISqKBBSUFgBSVSgSRfLjM+d3Lzy+NFNQ25h0DSClCUANw4Ybi0FqhKIKqqAqqoCqqgZ5OWWsnLLCiqqgAucnQsSQIw6X73dxw93dhWKotQTWvLSB5UKEsAEqxOewWWOyqpehUpLVzjljLTu3u7JWVlNXIaa1BKQjykG3lnGUzdFrDuiaINPCubZ3h1fHZnR0Ua4nUrNuZzxHD1tmVp8Tgwqt6GyERluFrOO4VqPdo9E5xMtFKgkggV82mgCppk1wgNsSyRhyaakdovwfLnIyNl43u64I65dOR2nqsfij9rh7XgtDy9yx6Paqeh+1w9qjqocavnko1b7lie1U9P9px+LoJg6h8go3V+/7/AL/dVmPcy8pbM9jcE7nx9zx/iWbJjwn05EagEjwdLMbcQYeVCmT6Pcnc/IQ9XoayGZnjNbhfF931/VJ1v72u8EWXJ7Ns2+RvJ1/f9/38FE/Bz7r6G/Z7T1dwumgXyLtE8hiCRyBa9x9A8ntPY3LufjsH7X1d5fWlHXsZfo9X7Z1nSa5icmP+Ich68vM5cPI+ntG58iHWHJEThImJfJyZeo6zPOAyGEYngFyryV5bR9duTb8vCfW9LrCfqx/hlz8nu6X8VPUxuHI5Faj9/wB/bXdakWW3ge1a2+Z+15P3CP2yfiHPuo17LPUtbfL/AGyXiEftc+d37/v+/i91F9lnq2tvl/tE+dxSeqyeLPdXQeyz07c8uaGKO6ZEYjuXyJfi+PDKpzHuces63Dnx7Msxsn4ez3Ovc7DPt9qPbw9RjzjdjkJD2F2t+Nj1GHopDN0s77Thr5h831/+vcNWJAfS659jM8Mdj27W3wf+vcX/AHg+hMvx3CeJj6Gc+xl9vtR7trb4P/XeL+P/AJq/9eYhzMfQufYx7faj3rUyA1L4cfx7CD5pae59Hpevw9UDLFKwDR7N5SuneZdY7TqjkEro3SxkJCw55s8MMDOZ0At8s/8AlxdIO8h/paSD2rcpZYjQkPk/+vF0dXuP/JcMn430Uga3ag67fFOdgo3O/J+NdJjlsOQX7NXrwdTjzx3Y5CQ9hfkPw/qOixwI6mG6d81YpObrenxT9ToRPHIf8k+8OiH2trb4GL/y4sQjWeMo5B8QAt0/9ePpf8X/ACUD3LTb4P8A68nTeE/+Sj/15el/xfQPzQPetNvg/wDry9KeN30BH/ry9N4T+hA9+1t8D/15en/hn9A/NP8A68vTeE/+SP8AtIHvqL7vH0PXQ62HqYwQLrzaPYEQKgUqoBYnATBjLgtIOiAUKlAUJQwpKCOzSCgcsoiMgAKAGjqHPJ8Y9zoECwlASgKClBQNIcNMw4aaAqqogoSqACLFFxxnYfTP+l3c8sNw05GoaugLZKwluFqWAhVVhRQUoKBnJOHj5rJGHj5oGpUKVQCGmE2gUqLpWkCqEoBQdUBSRwgFBK2goHD+JR3YJULIqQHuL5uaZjmz635N1eG12/FevGIjBExjKXm3T4Gv+T4kuu3yySB2+peoF6eH7+KKdsjh6YTjEbRPGJ34gvp9NjgOp3gC/Tjq+R1nVi4EUY+ntNg8ntwvS/iowxjklVgGEokm/EUgfWBpxw5RliJx4kLDURPeSSNlChWt90Q1VVQFbVCAVVUCQb47KTSS+b+IdSYDZHQnnxpjcGbWVVyZ2TzwhpKQBcv27DzvD89LXUqxtHl9+3RH0B67CPthf27D/GH5/v4otST37dEfQft2H+MKeuw/xB+fB7BAScj/AJRboj6HfjnrYIbEMcuwL83q1GRibiSDXZzFXqja/Kt0PpBigOwaiIx4FPzv7Xl/iP0qepym/PL6VFVsaf5U9T6S1t+Vl+KywnbvN/S7R/EsuUbozJHsd4IvvQpdWfSWFsPysvxmUTXqSdsn4tkgBIz0OgO1YF93/dsfRkhzy44ZYmEwDE8gvz+X8SyQFymQLc5/i0oSqWSSwJ706VZ72LpYYMXpYxURdX7Xz/wvpcmHpp4skalcufc8UPxWUgSJnQWXH/rON36kvvbKHuvarPZ/BsE+n6YY8o2yBLrPHLppHLhG6EtZ4x4/xR9viO740vxKeMCZmaPBdZ/imTGLlLk81alBZ3+6z1epwHMI5sWmSHmhel/4T72Orxz6vpJxhExnKPwy01fN/wCuJxkMZkN39Lc/xqWOQjLaCe1LAvuroz1fw+EsfT44TFSEQCHrfnp/jhxHbKr9yYfju+yKNanQovuLWGernwSEvWw/H9qJ4mPA+3wLw9Zgy9Rk6fMIECErkJcx1DEfxozhviBWvj2Z/wDXgxxAMhpLimlWYm4x8j2M+CGeBhMaH7va5YZZYy9LKDLTTIOJe/wP1vnw/wDLgwSIjRs8OsvxWruFV7WB5lVr+xy/geDJKyZiBN+mJeVy/D+hz9IM8YxAJIOPd8Pdj/14sV1R9/Z1y/jcMWso6Fo9xL+zD034bkhhynIQc+YHd4caB6Pwnp59P08ceQVIGVj5vJj/AB7FMgUdWs340MQ3GND3oPMqsHr3M6545dLI5MI3QkbnjHj/ABR/Ud3vjKxb4h/HYCYgRqeEn8ZIkIEDceOWE92vyme5a2/Pn/y4cQNV7+fydD+NwEfUA8njaL7i7fJnuWtvln8WxDH6gvi6efH+NeoN0I2Peg8yqxk9u02+PH8Ul/CPpej/AKzxVyb8KRFm0e56C2+cfxPENRZWP4njPNhF92n+o9Amk2+fP8TxRNC5DxHDP/WsP4Sh7tF/kemgi3zf+tcfgU/9aY/Aoe7TqekCrwR/EsJNXT2bgRaeBqtq2+FyVa2+acOfNK5ExiT49vc65jkl/LhEkV8V1qyVBnm+ncdyuPTxMICJNnubdUdE5Qlkl5euzTxgen8RL537R1YHmB+YZK6nO2YquIb7j2mnh6TJny65ABHwp7gjdbclIl55A7tXpcJ/EjZQdAwGw0gpQlADpHhzdI8IBSqtIKqqAqqoCqqgZ5OWWsnLLCiqqgBgtlzKAMXd2BccPd2YUVVUAsxyxnKUYmzHSQ8EhkmGMk6Ann2sbVVNsAlJo8+bzEV3aGYE0Lc8spkmGL4jzI8R/wA3nbjm1haHSqaZnlyYunF5Ja+Hdx/b82T+ziJHiUyHT9J5sh3ZD3Op/wAnA/ieTJ/Zh9Ov1NqlXCv0O6rOMT2vA0HU9bVyxD9/9SY/icoUM+Mx9v8Atcf2vrI2TDT+iTpi/EceTyZo1f0N06ovHD4U/wDhO+GaGeFwO4IMIy+HQjs+fn6aXTH1+nOg5j7PyevFlj1ePfHkch55leSxXLs/g58Ulyo/T9u86cIIFOhNOGLJeh5T69GiFXMpWtccNDk6ttm8TYXcLrvyiExMWGnummpWhzagVVXQJkLFPlzjtNHs+s5ZMMcnLyvTlidcu/HU8ukF7T0fgWP2SXiHj7dj0e5XqeB+J4ZzlCVGUBe4R5eLp8Es+KWXfIbNPofpeo/D5ZsUoXtJ4IPd8LH+CZ/TnPJI4zG/L/FT3rVwcL3XI4xikenPUb5XdbbLsejiMIyzykEiwCe/hy3DHf4ZLJ/ienL0h6jpYADzCIlFjleYrD7cDj6XpBmxHLOcogHt7HCX7P8Ax5D8g+pgxQzdL6WO+CDfIl7U9CIyxbTECULjIV3Zy1Zrjouw8nFgGXFkyGRBjwOzpHpcHojLlyGJlejp08f/AAbP73fH0n7T0kIx+IEmN/U1v7mUvscMOlienOfWwars+r+G9MIQGUE3MavD1P7V6eycBDHHnaKD6vQD+RCvBzaYN0jl4HTTjnxnLAwurFW7kEMmPi8Vgd2fPdP0pyZZ4hMx23qPZ80Zo4sctpzSNaGh+ZevohfV5B/Uz6eTopSHpDICbE6v5PolyeWMDijAGcMeOZMZ1r73XJ0mzqBh3nzfa76oBnLqIHJERJI0qnq6gf8Ah0Pk1tp+BEk14mWTCMWWOPNkkMYHll7WR0sJZTijK7G+Mxz7j+9vT1fVZceQw9MGHtF21+HdJKUZdTQ8wIiI8BmMSacTB53T9N62OczIjYOB7ixhxbgJ5CRjJ2mQ7F9L8GwerDJGiQdDTcvwzrMETiwxE8cvEausZaM4Qmc+XoumxC55iO4ebp8EM+f04mWzXXvw7fsQ6Kf/AIbA0R5SNY/Onp/6y6fDUcMdPZGv8y5fJYasq4vHBI9HBiGGAhHUDxTmyjFAzIJER2fQxdLGQErJBFjs6fsmPUEWDpRce238R1ebVLA+Y6uMIVn9LfvHjoD8nm6Q4RuHUUBdiJvR9efUZ/wr+VKByYR/bmDwPAuHQ9PL8R6ifU9RjHpkUAfF7KmEfU87vjJw/hvSQ6iOWUgDtGn3t9BhxT6eebLEERP6O/4PiB/aARwDX3uv4R037T0OTF/Ea+dNgnKDzccyf50sA9AHzED9bWAEZftcsH/g5O2nfLPPLp49B6chkjLXTQhZZc2fDHoMeIgg1I88NgjZt+Ijo8OPbCA3zjuxmI7e1c/SRjDp8MIQjkyDzTkPY+rn/CY5cWON1kxACM+fp9jydTkz7PT6zp/UA4ni/fREk8zP0cunyY8c5QkDIfDz836rD0WLFYhGh4Pyh6PLhnjyzx7ISmBEE2fm/bBQWWtCJYwRRHsfmugxY8fWZ4ZREAXQl7/yfqS+B+M/smWWyYM844jj+L5ohwxGLJ+JgQ2mHs4+FrBigfxScDEGOvlrT4fBw/Duky9P1uMZIGF3V+7xe3FhnH8VJlEgSBIPjo0hj+G4YT6zPCUQY+YVX+J8/JAQyy6fDD1YxlpcdfaNOz7P4bhlD8Qz7gRYJF9xb0dT+Dz9SWbpMhxSl8Q7FA8n8VnPJhxyy4/Tybtfbo9fW5MhyQ6XpoREpREjIgfq8X4h+E9RgiM2SZykmpVZp9zqvwsdZCEhIwyRAqQ9yB83+IYcnTyiMs4znzURx9wfRx/iHU4THJ1WMejI18IFfr9Lh134PPpBDJuM7PnlXD3db0nU9d1McUo7cMTu3cg/5+xA5/xzqqP7MICjtkJ+Pue2fSyh+G7NvnGPXTXxe3rvw8dTAbDtyQN45eH+S9D1ks0jhzRMM0PiHY+0IHzsp4/+rBG479/Hfn6U9VECHScDyj6w/Q5fwfpc0/UlAbvZpb534300t+GUInZHy+UaR1CB9BGIHDowG2AKo4SgKqqAoShAKClm7YUWS0goHLM+d07MT+N0CBYSgJQFBSzIWgax4aZhxq00gVVUBQlUBQlCBlI7Jew/W3LhM4iYoucJEgxlyGgCVVyUUFKCgQWcXdqTOHuga2fYiy1S0gTqtlqlpAUppSgBKrfggNJpGq00gmLJCUFA+V2wy5s3qyAkSRU/s0dNU5hHeBUbiNDHgvd+I/hcpSPUdOT6nOwgUXysnSdcZbp49pOmgADSyR0+Wc57Z8f0vVHpIZIDeIgyvcNBx39/sc/2frrF4+Pd+Zbxfh/WZ8lZgYwJ80tPuDAet+DSOycBrjhLbAvrB5ei6fH0+KOPF8IeoIgVVUAoIvlVQFVVAS+T+KYpGpDjh9ZmcBIUdQ5spM2ryTqfKkfein28v4ZCRuB2+x5j+F5exjpw5x3PE8m628jzqvtog6vd/wBW5uKH0ol+G5Ymqv2hd5j27f6WcfCPc+rj/CbAMpEEjiuGv+qB/Fr7ljoa9q72PI/RHsfWn+EmvLLX3PBl6aeLScSB4sbjAzbLtXVGLE5bQT4AtkIkLFdi3QwcHTCEcRyz1117ojOEYZDiJ9xaEM2C4xhvj2Ti6afnjkFbu4d9p6W1i2ysOCBxAEc8uEI7sE438J0dIjPjj6YjZHEnfp8Hpwo6k/EjLfGXM4yjlnM5hij46lc0hHOSY7tOHXpulnjyEyGg0j81yY8scpyY42KrVk4walTxWkMG6Msc6hs01eeObGMWwxuXjX6vXWbJGUZxA8unv+lqOKXobK8xBFNZE0tevU48kD6WKJ7n605J3jEJfFCVO0unyGGMVrE6p6rpZTmJwF38SNKylJ9pz9QKzSl/DtK9T58pmOAYh6cnTmWSZA0lGgXL9lyemARru3H3JBWWGOwMx255eXeK4ddwnimRDZQ+n7ly48scxyY42CGv504yGSIGmldz9LCYQtNtzlwSOKNHicdPe9PSwBwCwCdeUnppSwCBHnGoDp0+KUMW2Qo6olrJqVrJl0MIyx2RqCdWutlWOvEtdJjljx7Z6G3TPh9aJhweQzVmHZc52kylhh6WyhVc08c5Xgx3qQfuegx6nZ6e3Tjc1m6aRhCERdHUtk2mq6ucRwzE5Aelt5O6v8l67+17bfQHTZDqIGr8HHrOhz5IbYwJN+DOSmDNZdk4hHnZ4HJlABoiIIbjk9XNjl4h7sf4f1Es4lsNCNWnH+C9RHqAdtQNndegtvYdUm1EbYHB0kYzM9wB10sOJ8uPLDsCH0IfhnXYTIQxg7iddPzes/geSHRzjW7PIg6HjV0bVHLfceX1E9uCMBzKgnpo+lllivQiw+pP8HlmzYoSiY4ow88gdd1Lk/BD0+XHPpwZC/PuI0+phPafF1JhgnMXGJPyZMSCR3fdGLNxuAHsikdHEm5kyPtcJGPYww1PF/Z8m3eYna3g6Sec1Hjxff2Cq7JERHgNhya/5Oup5f8A1Vp8Wvucv+q8l8jTh9paXHtOntU6HmYvwuI/uGz7HPPHB0f2TKR4vh9inlPRYzLfKyT4prxI8tJRRKep5keoMvPshVvTi67JlOyEQT210e2PTYu0Ro6xxiPAASnokFl2X+XecuKGaJMsh3WNAHA9LnzaznXsHZ9IhQLHFNh9TfBNRj5mOHBDCBXPF+Luu1Wm0klCBSCElF2wo0lCUAFwl8bsTYqnnIESIjgCkU1DYYDoGkCqqgAukeGG4tIUqqgKqqAqqoCqqgZ5GG8jLCiqqgAuZdC5lAGLv73Vxxcl2YUK2qoBcc8bF+DtVoIvlxevOrqWrhyZ4oUL7l4Oq6w7vR6cXM6Eh6c2WMrwRlU5DT2POY4vw/HfMz9J/wAmJJKF8K+p3rrNlNnojPH0MMMfU6mVn7v80T/E4x8mCF/d9wcseHJ1p9XKah+/DoetxYPJ08b9v76t+nYdWpePrt9ED/rDPDWePQ+8Ow9Hr40dJj6R+YcofiR3bc0aB8HDPXS545MfwnWh97ZHHGI422aNukyy6fL6GU6cDw/cpA/YupAGkJ/v9yPxSA8mUe79Q3+ID1cMMg9h+kM/QUOH/rwfeduUbTuCZeeO4c90CXqYRLxAKcB1ovktVLMeW/hv9zltO6NcQ2xdYSMgCRR8FCX3VSSSWx525ciqq0yCxx3QS49T1MOmgcuQ1Ec0+T1f4tUd8LENNa11TM2sq6ntbl3B+XzfiPw7pHz8LPq9koxkT5uGYnJ52Pws+ntmcRMGMhoRRfmYdZvlIWbjy83/AFpCJrzGPiG4hZrbhVPoIfhmCGGXTGzjkSavUPRgwRxYxiGoiNur87PrBjiMhJMTxTpk6o4B6lnkexYkWc8PSz2P+rsQzetEkWKlEcH2o/6sxer6wJBIoi9C+Nl/F5YiIky4t26b8bnlOwA6C7kyOw6LOwnGD08X4VgxbwATGfMS79N0mPpsYxQ1iL5fKzfjE8IBkAbNe5xy/j08U/TMbI5peBVmp6Se7l6fHkiYTiDE6Unpunj0+OOKPERQt8jp/wAd9YHy+Yfv++rzj/y5JH/d/f8A5KewvNNn0tBnaPAPgH/y4DCEZyh8ROl6hvN+NmAiREESIA18VPYPcWGOp34/wzFjzyzx5kNY9nt2h+byf+XDkhIg49AatI/8uGYiZHHxWh9rceg5o9jqPw/HmyRzHScCOO48Czm/D8WXNHOdJwPI7+98vqPx3JjIEYakW5w/HM9SlKGgF6/UpZOaPpNoDydL+Hw6ac5QJ2z12dg+WfxyUMcckog7uI/5/wCSMP8A5cEzMRy4xES+HU/kpfQqumet0vQ4+jMjhBqZsjwewDxfF6n8b/Z4g7LJOgvsn/ru8XqQxkkj4bUk51iZwPYnCMxtkAR4EW5Y+jwYzuhjhE+IiHwf/Xjyk7Rh1Ha/8npx/jhlkGOWOriJctlortXqe6NEvzmT/wAuCcpEdPi3RHJP+TtD8ehPDLIInfEax9rJLyXU9xkh8fD+OQy4TkMalEG4uvS/i8c2MTlGpHsFJHaq1Z3RwY4TM4xAlL4j4tY8EMV7ABuNmvF8vrPxuOCAlCO6RPBax/jMZ4vU2m9t17VI51iZwPWIZ2h8jB+NDJg9WUal5tBxo8w/Hc04CcMQJ1vU9mjnXqfRaLT83i/Hc+QisUdt0Tq9PSfjRzbt8a2mhtQd6rc9ieOOQVMWOdXQF8HF+ObvVM41GB0ovL/151cv5kccfT8GDlXqfUWztF33fBz/AI9WEZcUbJNHd2cZfjvVYvNlxR2+xDktJPpaC0HwD+NZDm9OMRRgZD39nnP411u8Y9kNx7NHKvU+n0afnP8ArvNjlD1ogRl8Vcg/S7/9cGfUenAVjiLmSPNfgGSOVYmcD2zS6PldR+MY8MDIxJI4HiXzf+uOshWWcYmB+z7EOdep9Pouj8/1n41MDGenA8/8Sem/Euq9Ss4j6ffbz9bQ71WrPoCjR8fr/wAVOKEJYCCZS2mx2ceo/FJQ6z9nyEDEaFjQ2R4o0nKlYnvbl0L48eolj62WCJ8np7qOur5eLq+vz31OMRIiSOw/VgxPrQU2/O5fxmcuiPUY6jkEhGQ5D3/iPWS6bp/Uj8ZoR95aU9TctvhfhmXN1uIynkIkCYyAD6McGYCvU/5rMTnyc/C/p/J2pZgCAATZaabASRwLSqEAslNs2woUFKCgc+T42w5z+N0CBYSgJQFBSgoGseEoHCWkCqqgKqqAqqoAcssNd45H1OrMkDOMhIWEucgYHdH5huMhIWEAoKUFhSJLh4RJcPHzQNihVCAUoSgClClWkFLO7VbQKVFraASgo3LaB5fUdDmyZTKMqgfafD3uEvwrPRHqX4Gz7foPD7doKB52DosuMz3zMhIeXzHR5x+HdT3ya7v4pcace59kLaBy9D00unEhI3Zv7ntYtIkgWrFruQKS57qTuQLVjcncgUrNruQKVFqdUA0tKqAqqoCzKIIo8NKyAcmToMM/s17nnl+EwPEjT6as4ow6VeqPIl+D/wAMvpCj8IF6yNe59elXEz7NOh5Y/CYd5F6B+H4ara9itg0suq/xRxf9W4P4fvaHQYR9kPWq4ovCvRHN+xYarYFl0WGXMQ9Ks4ocV0Rxn8PwH7P0Mn8NwntXze1K4ocK/wClHAPwzCOxPzT/ANW4P4XuVQicK/6UcJ/DcB+yn/q7D/D972oXFF4V/wBK8jjP4dhP2fvWP4dhGu2/e9qqEOFf9KMY9PAcRH0J9CHG0V7nVWwjUGXoQ/hH0JGGI7B0SoQJ2rtaVoJ2qItKgTsBTSVQBSKaQgABKqgKEqgAJVUBQQTw0gi0ACIHCJA9mgpNICqqwBQqkoCWCQ0UUwogKU6qWgguEh53chwkfOwpqGwwGw0gVVUBLcXN0i0hSqhAKqqAqqoCqqgRNhuYYYUVVUCSwXQuZQIx/EXdyxcl2phQBIQlAmeQQq++gc4SlKWvDuEvN0bsrTgtjScHHOEOnMs51kf3p4MWGXVzObMKiO36e59ovLmnliaxwEhVkkumoxOlLvRa9TzsssnWT9PGDHGPl+/udDKPSeTDAzkOZF1l+IHZCcYXuJjzwU5erzYq3YwLNDzLA6+rCsKOkmXUE9V03qSjUhwO7yT6MDpxMRO8nV9HNnzY4XICJMqu7AHizk6nLhx75RiSDXPbsVgK2so4xrgpMuphKXSwFHcNrc8cpdGIgeYAae4py9VnxwEpwhR0+I93YT6n+CH/AC29TMtJaazqPT48gxxBOghW2tb97eOBEgSHKGfqJTljEYXGr1Pd9CI8XnbLV7K/Q52brM7nP5oyJANO4NtUtO6U46NnN2kCpQY629DB5P47/wAJP5fW+B1Jvpv9MX6rr+l/asE8XeQ0fmD+HdfkAwGFAabkcr1duMbHHlx+p6URyY0j1fUliEvijKpPp5vwzNCeM7fLDkuGboMnrRyxiaJBLYOHJLC2GD/ZyGRj6/6e96sMIjAAaqQ1ax9FMyymUfJLu4R/D+pyVghUgDagmFsJjT7HNZ/Zq8JvX1+uIdtQ9WP8G6ieA45R2yB01Y/6n63LUMoAiDzYUG+Lbnozjz7o54mAs7RoXp6eeSZPqRER2prrOgzwy741EgVyjBDqIyvKQY0tDlaI208TLrzpD+rhYf8AFTHs/J26np5ZhHbQo2bc8vT5vUM8cgAWBNcYb2f3RmRXVUP4dXHpZZxCsUQRd6vZg6U4iZzNzPdxx9J1GPyxmAPBGuVdJW2pPViUhiGTSROrjkkYxGGXMJfc9s+lyZBASIMom09T0nrSExoe9oK6UIj8R/tj+peuv0fmHXqsBywqxHUHVPU4Dmx7BodGmFZLj3nHl3DLj9PWW0V9Dczmlhn6oHGjv+zS9SGS9Iii65cRyQML1I5YXmvT9/E86PxYL4r77/2PdmGIgHJWh097nPoxPHGINShwQxDopmQlmlu28Bobq8ZiDLqMkDnjGZ8sRr+/0On4fkBgYX8J0+brDpBvlPJUtx004ax9J6WQziaiRVIO1ePHoY47HVTvw/Jif/Ey8dh+p6o9OY5Tlv4hSjpyMxyk1pVMJzU/9WDH8P8A7NjxNvPeucR+Gv1eiXQziScUzEHkOkOiEcRx38X2ka51Tdk9focIBwgS+zkjR9739FfoxHv+to9KJYhiJ4Gkv1bw4TjgISN014GbXVq9s/Q4OqzROcb+I8+8r0c7xzgO1ke4vXDoxGcpS8xkb1HCYdHWUzj3020i86xx+ZOfpD/4Of8AVbXQf2Rp3KZfhM7IjKQifs09mPpTjiIRB09llQxZqHG7OH8PHkP9Tz4cM8hlsntovsdL+GZMUdoBNm7Ip1wfg2TFu1Bs2oNS5s6p46HgwiRiyjmiPre/CR6UT2EafU6b8DEN5yyvf2cT/wCWzG9MshC/hr/NQdHR31wPAo/s11oZtdTHNGIOWW6BPZ+ozfgWHJiGKJMQK15Yzfgvqw9LdpprWuiLFk9N8TwzDZ1YFV5PubOOU+qhEDUxPHzfe/6pM8wzznZEdlAOo/DIDPDqATcQRXjaIsuX2RB4XX9OdhjIUR5nf8I/DjlxesTRkT92j9Bl6eOWBge4q2ei6SPSYo4YkkRvU+1Gq5SSdXijwPxnojhxCYNgSDXU9OI9NLKZDaY6fo/Q58EM8DjyC4y0IfIh/wCW5iEgZTlKA4gjXtV8jxcvSH0emqxKZlr89H0Oh6LqMMjISMwRQ3jT632c/wCH488scjY9M3EB69qNOs6OD5n8ZjljCG8ADf8AZccvSS6zrM2OVRlsB8fCn6Lregh1kYxmSBE7hSx6GEc8uoF7pDafBFVYUSz5voZz6rqv5lxkMeyVeMXq/Azih05nk2ipS+IjjR9iH4bihnl1MbE5aHweL/12+lu/P/yv8kWE9TwZQvoMsx8Msop9D8X6g+rhxiJltrJKI7+H1Pt5fwzDlwDpyKxiiBH2NY/w/HjzHqBe8gR57BFPD/BupP7XkiYmAy+cRPiP3L9OHnydDjyZodRK98ODb1AMAFWtU0worSKRR8S0B2krsLBifE/SjawGuwolAhz9MJ2DwQOeY87oGMgqYbCBYaZCUAsyaZKBrHhKI8JaQKqqAqqoChKoAQUoKBm5EembHB5dVQG7QWPgPsbKKZyXDwslw8fNgNSoUoQKCoVA5+rznDEEUbNPF+35PAV83f8AETUBfi+YRbQdR/EcngES/Esg4iPveMlgNgHd/wBY5B2DX/WGTwDwS9g1aB5QOwfiOQngL/1hk/w/v83hDd3+/wDmgbZfxTLjGgiTbkPxjN4ReXqdQNe7j20YDuy/jWaETICN+7/Nzj+N55Uaj+/zeDqDUD+/7/v84hpEXzX79/3+uwD08f43nkSCIaOp/GM3hH6HxsAqUw7k0wHpQ/Fs8pAeWvc7f9Y5jxt+h8rCTvD0DRsA7f8ArHN7PoZP4lm8R9DzEMElA6/+ss/s+hP/AFjn9n0PGDWijVA7R+I5j3H0JP4hm5BH0PHEJOqB9LjlcQT3AbtxxfAPcHHN1WWEjGOGUx/EJRFsIdtrb5X/AFlk3+l6E94G6t0OOPFnL+Kzxbt2CY2DdLzQ48fiQPXtbfMPXZwATgIB4vJAM4vxLNmBlDBIgEx+OI1HKB6trb5I/EsxnLEMB3RAkf5kOCx/1tk9EdR6J2Gq88e5pA9m02+Vm6/qMMZTn052x1JGSP5PX0+bLkB9TH6dcecSv6AEDqtG587N1meEjEYgQDofViHlwdXkllyHHg/meXefVHy8UD27W3xpfiuWM44/TgZSO0AZwTf0JzfiWbCJGWOHlG4x9Ubq91IHsWolb5R6nqpQJOGO0j/vRw59L1ef0ISxYYRx7QY3l4CB7NsZcscUTKZAiOSXzMX4hnyZvR9OB0EiY5b0uvBfxkzGESjESEZRkdxrg+7VA6sf4n02WW2GSJJ+X1vUJi67+D5WaXU5AY5MWEjwlkefo59RumY48ZlA+nulkN0NQLo2Age/a2+IfxPqLjGMcUjKWzyZiaPt8rp+19WcxwiGOxET+M8E14IHrWm3xpdb1Ud1jB5Rcv5h0Ri6/qsuIZwMIgRdynLT36IHtWtvhY/xLqMmQY4ejK47hIZDXNeDtn6rrcGOWSccVRF1vKB7CvL0ss8r9YQH8Oy/1epAKoVAUoW0AqqoCqqgDnlUqgBUoPF1ZQFASFQFKqgKEqgAhA1F/WlKAKVVpgFV1v2KigKqVYBVVLQSS88vjdpnjS9XEDzMBoHQMBsNAVVUAF0DmXQNBSqqIKqqAqqoCqqgTNzbmwwoVVUCCwXQsFAjD3p3cMfJdmFFNISgFLLSIAvmZRONwzRlkhdxlHn3F9VFJqTdbcTwpdPOEMZlY82kfB7eugSIUL84e+k1TOJt5rbTjQw6nFLLilCGhIfMz4JRwmMcVHTcbsl9tabBK5jr9zzethI4IgCzcXqzdPHPDZLR6FUfUzzcKNjg6HGcJOOUSJ959pfN9BEb7pGjYglrcnIo1v2JQ0wKoI1tKA0tBVQBSKtpUCNjIxxjwAHUsQnGYJibokfMIQIimkpYCDAS5DyZfw+EzY8vue5WmbUVviR5B/C5gnaRTl/1blHh9L7i0jk8inaeEOgzXQH3pj+HZq4A+b7lLTZ7DP8AyevVnk4/ws/bI+Tf/Vcf4jb6dLTJN+zToeaPwuI5kWh+GQqrL6CtkvtU6Hnn8Mxe1B/DMfYl9CwtKS+1T/Seb/1ZC/iNMn8KF2Jfc+lDGIXXc39LSkns06Hmj8Lj/EbWP4ZA82Pnb6SGSPZp0OAfhePxK/8AVePxN+L6AS2R7VOh53/VeO9CXWH4fij2v3vYtKWVZVF/ic/7LiOm0L+yYv4Q9CqWa4V6Iw/ZsY02ivc1DDCGkQA6qpY4roTtRTaGGgUmlVAQE0q2gKra2gKqqAIkm7FUdPa0hUAqqEAqi1QFmpbrvy1xXdq1QFKLVAKoSgKqqAqqoClC8oCWWmCdaYUKoKoHPk+MNhjL8YbCBYaQEoCgpQUDQJQOEtIFVVAVVUBVVQApVUDNCUMKJFud7dD8nRmYsU0hEkYjTN1oW8XDGU03IsLSEC6QQdKRwm0Dg/EvgGulvm88vp/iB8g17vmF0CDrww1TJ50QCOU90Xrx+/7/AL+JQEE8rev7/v8Av9IUaDRAy6o2B7y85PZ36m6DgD2QIz2IFiPw8601n+AliHbVEBgvzV4u8vEuHTmzLXu7opWE/wAwe4vT3efBZmPc9HekAkoOo1SUE0gAanVPChRRCAijz+/7/v7aJ/f9/wB/1Gi3ygfSYfgHuDzdbikQSIHJGQ2ygDR9hH6vTg+Ee4OzCHg/h3Snp+oEJARmcMTOvHcj8Q6TLhxZ5x8++PmnOWoiOwjT720XfdSAWg87N0f7QISG0mIoeoLAuta8Xg/Dunljxg443P1pRnP/AAgm328uOZo4zRHY8Fy6fpI4ZynACIlzGPj4oHF/1fn/AGjJlOUiMgNu0RvS9DY7POYk/hcPdj/6YfoKXaOK0QPN/EPw8dXtlZ8psxB+Idw92OcZi4utIYDz+t/DMXUSGT04SmDfm+1pVEvJ+HdKcObqMZAF+mfIKjqDx7n21oNB83izenmx48OKHpxPpzy1oZeyX76vR+Kfh5OLNkjtFjefJcjVabvD5PtbABQGidEDzcWCUCRCNYvSHHeWv6OGDpRm6LAJR3CAgZQPcAV93L7VLSB5ODDDH1v8qIjE4gfKKB8zv+LRJ6WYH+H/AKQe+glA83qfw3H1OaGbILEQYmJ4N8PP0vRR29TgiNsTMgAeFB9lUD52XR5cObCdkIYxk0ELJ1B70NPY94xkdcTWhxDX/UX06VA8CfQzEMfTjETCMt+aennrw8bPL04eln1EssssdkMm3bA1fl7ntr4Pq0lA8P8AYZR6symBkJxGjKIEd18Dw+t3y/hn7Rixet5smPaedJeIL6qhAjDMTF0Qe4PZ1ZW2ApWbTaAVW1tAVVbQAT2SCzabQClFraAqghKAqoFKgFUJQFVRYJruEAo3C9vflKoCqqwChUE0iiUSO0XV+5KLYA2glUNAC4/aLqS4/aYU1DYYbDSBVVQF0DkXSLSFKqoCqqgKqqAqqoEzc3SbmwoVVUCSwWywUDPH8TvXdwj8Rd2FYqCqogWgykIFKqtAqqCaQCrO5Fk8NIXas2fAruQKVkStNoFIVBKAqzabRSlYtoFEFKLQZIDIbhX1JccPUwzgnGbAJifeHUlAky7DlIJrVgcuefPHp4+pO9ug0F8sKdBNIjK3MzTE2UDa1GjNruDSFJY3LvCBasbkgoFOcrDotIER1DVqIgcKgKqqAoSlAFd0qqAGMmQY4mUjQAs/JsvjfjmcRxxwk16kgJEdojlA9Lp+px9TAZMRuJ4Kc2eOGEsk/hiLL4n4d1eKOfLhxG8Z/mw0r+ofq55fX6jo59ScpG6Mj6dR27fDi79ttB9DHIJASHBFhjH1MMspRidYHbL31b5MJZM+SOCEzjhDFCUjDkk8fJ5PUz4MXUkT/mjLAb654/RA+m3LufA6qebppQ6f1MkzkMpSnGNyAHaIbw5upBnDGMko7DKEs0KIn4XQBYD29wTuD8/0vUSjkxxyZM0JnScM48sj/hPHuYyZ8uOUj1E82OW47Zx82Lb20H3oH0Zk+bP8XxiREIZJiOkpQhcQ7jHumM28mO2to+E3rufPwYuowQ/8DlDLhJMoxlYOp4tA9TH1UMuMZom4Ebr9jz5PxPFjhCZEicguEALkXhOeOTozDFDZKUvRMPCRPmdsEAOuyDvHHAQ/p7tB0YPxOGSYxTjLHM/DHIKv3PcZaPl/i/8AbgR8fqQ2e+3p/EBL9nyiHO2VMBgfxYSs4sWTJAczhEV8tdXYfiOOUcc4XIZZbI+/2/QnotnoY9nw7Y1XufP6uOPMMUcB2x9aiYaa63/taD293inc+LjiOk6k44SIxnEZncbog86vBlJhiGfHHKZgxPrTltErP8PgfBgPqdyNz437PHqerzRyGRgBCoiRAvXXQuGOc8mLF08pHbLLPGTepjC9L9qB7MuqEcwwEGzEzv3Gnfc+HHpo9P1oGOxE4ZkRu61HDj02GGLoh1E5zE5w2mQJJ1NAAeKB9DucOl6wdRvoVsnKH/J7vjxxnD1GEwxTwiUjGW6d7hXcWXlxzkcksWW49NLPMSmDzLtE+A8UU+q3J3h8PqYQy5zjGKWYwiB6diOOF/q8YBn0vpnygdSIACV7RuGgPzQPp/UB4cul6qPUw9SN1ZGvsNPmfs2Lp+shDFHbHJDIJx1qVVz7XX8Dw48eDdCIBMpgkeyRpEPXVCUBVVQAyUkslhRShQKGiBhk+INhzyfGHQIFhpkNICyWkFA0CVCtIFVVAVVUBQlUAILTJQIQlDCigpQUDKcbCMN7deWpIxcIGqEoQEqlFUgef+JSqArxfMPsfU/EvgHvfMB/f9/3/Sgm607MWLbLA07NAhumAAePoTR5CAQUs34tAIHP1B4txAdOrnoBEWR4PKOor4ggHqB5CiNgDtozPPvgY1y4jqTEVWiBt09+bxt6K/2vHh6j0yb1sug6uJ5CB1dPZn7g7jnV5MHUY99k0K7/ALl64TjM1EgoBl4IN0mRrRmRsaIDEWLWJQEjRAqlRwUk/v8Av+/6gfS4Pgj7g6kueD4I+4fU4ZOuxwzehM7Tt3gyNAhhDPo+v9TCc2YxiBKcb4FRNOuLr8GYE48kZCIuVHh8TFkj+zY/KJb88zAzNR5JBLrilKXXxGSUJy9OW70x9x8UD2j1OMY/VMhsq93anl6frJSyZxkIEMUhR40IvV8uEZSnH8NI8uPIZn/xY80R9Jpyz4sks+fIPPix5ISyYv4qH6eCKfRw6rHMgRkCZDdH2jxRLrMUN26QGyt99r4fNlnx/teHKJDZLHPae3bR4eqyRyw6wxIMd2LX6EQ9wfiXTEkDJHy86/vfydMfWYs0DkxzEojk+Hvt87qccR1fTChoMlCvAB5uonHGer3REo3iuPA1HeuyB62H8S6fNPZjyRlLwBaH4hgMxiE47yTER72Hx8uWR6jpxLJjmRMVHFHjTxs/o9v4VjiZZ5UN3rTF1rpSB1dd1n7Lj3AbpEiMI+Mi8eT/AKwxR9XdDIRrLFGFfKJdfxXHIRx5ogkYskckgP4Ryxm/F+njj3YpDJM/BCPxE/ogM/xIYuo2ZTtxnGJ0R5t18PZDrcM8ZzCY9Mcy8HghEy66MpgCYwA1zR3PFlmMUepuMTH14jzDyx0HmPuaD2cH4jgzy2Y53KrqiNPmAx/1v0un8wa++vn4fN8sZvU63pz60cus/giBEeXixz7rThH/AKisntGQn/lFA9fqOuxdPQySongAWfueTpfxOMo5cuSY9OMxGMq7Fxx5I9N1JyZjtE8WMQmeNOR+rxEwydPnMR5Dnj27WFAPa/616bZ6m8bb28HU+wd2Z/iMMuHJLBLzQiTxRGmmhef8SynFlxC44x5v50o3t9g8LeGE9+TqSJnJeDSZjV1fHsQPYwddHZhGQ3kyRBAA59vuRl/FunxSMZSPl0kYxkQPeQKfL/D4S6KWKeQmUM8IR3nmEu0fc5/tBliyROT05Ez/APB8WMbvnoTrySge5m/EcOEgTlrIbo0CbHsp5834pD9nyZ8Jsw0og6H2h5OjF5elPhgP6L1EJSPXAXZjH/osB63S9QM+KOQXqBdite75uL8RyQ6vJjy/2jIQhL+GVcfN9Dos0M+GMoGxQHzDw4Omj1EuqxZB5TP9OQ0F5OpmOpyYzKoRxbxpwb5dI/iWLFDHGcjKcoCQqJuXyfMwxzetnhmHmhg2X/F4H5u/Rx/ndNof+H+/RA7f+t8G3cNxr4qgfL/V4OfUfiHpZ8WpOOcZGoi9x7e1zwRO3q9OZz/6Lyxyjp5dJkmDtGIgkC641QPXx/iOGcJT3bRD49wox94Yx/ieLJOMKnEy+EzjtEvc+bmnOfr9VhjugYY4RJje6jrKu9W5zmMmXBKOTLmrJHdKQIhH7lAN8nW5hjnISNjqBjHHw2NH0x1+IznAHTHrOX2R7L8Xw+oxGWHNGjr1I/R6B6vRQzdJCO4gSyYCRe4HkHxI+9A74fi2KRjYnGMzUJyjUTbR/E8QynABIzBEZbY3V9z7HxM0hkjjMcmbLITxmVxIhEX4Pr9CD+09SaIBlH/ooHp2lQrAKryqAVQqAUA2qoBVUbQavsgFVVgAUEpQQikg2laVASypKsKS5DSZdi5H40DRsMBsNIGlVUAOocS6hoKVVRBVVQFVVAVVUCZubpJzYUUqqBJYLcmCgZj4ndwj8TuGFChICKQCkISiFKhLQKCtqUDwR0RydZkxHLmERGMxtykfFz8nPpOj9YZfUyZpenOUY1lPAfbzdPDMKmPZYJBr3jt7Hi/C+m9D1obdsfVlt92lNIeQBinIwEOrMo8jfx97t+HdFHqTl9SWaO2e0ROQggV3fZ2HDlMgCYZCLrtLj6D9bj0OGWPLnMgQJZNw9ooNByfhHRxJllMpmUMk4i5kih4h9qe4RO3mtPe8P4ZhniGQTFE5Zke4vfMmMSQLIBNeLAYdHLPLGD1IAyWbEeHl/F5ZBiGzcI7h6hh8Qh3p6ehzz6jH6mSHpyJI2+5jrh1AEZ9NqYm5Q/jj4IHmdL+zHLA9DmIN+fHknI7o+493q6jNt6gz+zgxymR/ilw454ZeuMIjp5YjGUZHLkABAHhWpt6en6c5o5jlBHqykKI12/CPzaDm6f8ADo9XjGbqpSlkmN2kiBG+wD0fh08mPJk6XJIy9OjCR52nxccWXqukiMEsBy7fLHJCQojtd8PV0PTZIyn1GehkyV5RqIgcBA7pcacvgz6zLGfpnqCJ/wAP7JIvvmIPLhn6YZSJCUoyrbujzt8O/wCbAePgz9Tlwyzz6gRhGUh/ZF6ew6/JrBl6zPPbHLIQ23ungEXp6XozgwZMUokjfOUQDZIux8/ex0eHq/XObqSds40IDiNcX7SPBoOHL1nUQ2SGeW2U9m6WGhXjHxejqD1OPAc2PqDIXGP9uPc09PUfhsTPFkxA7o5BI3I6R14Cep6Cc8WSMTulPIMnhpY0+hA5s5yYJCM+pmZy12wwiRr5B0/C5Zs8pTnlmYwkYbZQEb9+lh754CMgyx+Ktp9o/wAmOj6eeKeUz4nkM4+4hAjrpSgBLfOIHMccdxL5seoy9RmxQhnlEzjIyhEQO2vkfm+1n6c5KlCRhMcTjr93d48f4acOXFKPm2mZyTNCRMu6B54n1R6WPUevPcZCJG2FfFX8L0dRi6jFlxYh1GQ75GJ+Gxp7nv6DpZYcAxZQL819xy6x6LDAERgAJGygeXhxZ8mXLjPUZKxkAceF6vT+EDJPEM2TJKZkPhlVCi6dJ0P7NkymIAhMgxr3auv4d08unwRxT+IXx70DsVVYAG+3KpQUAqhUBSqoCqqgAvL+yf8AhB6gmzt2Rj/D4/S9bJNIHJ1XR+vPHk3ESxmwauweR83kn+ESMJYIZjHDK/JtBIvtu8PZXzfUEweEgtB58/w6QMZ4ZnHOMRAnaCJAeILn/wBUfysmP1CTklGZlIdw+raoHH1XRDqNstxhOBuM49vzDlH8MBMpZ5yySnHZfw0PYB9b6LMpiIJkaA7lA8+P4aSY+rllkhAgxjIAajiyBqg/hZqUI5ZjFIknHpWvOvNPoiYIvszHNCVVIG+NefcgZR6URnGUZERjHYIfZeU/hIiT6WXJjjLUwgRXysafJ9K1tA4sf4djx+mIWI4yZV4yPcnxa6roMfUmMjcZx+GcDUg9MMsZi4kEexq0DiwfhsMc/VnKWSY4lkN17g9lWzkyxxjdMgDxKI5oykYgjcKsdxaBxH8Ixi/TnkhE8whOo/RTv+wYhHHGIqOOW6IHi9VraBzT6PHkyerLU7TjrttLz/8AVGKUfTnKcoj4YylpGvD/ADfRtLAYQ6aMMksovdIRB+Tkfw7CcZxkGjI5OdRI9wXrtbQOPF+H48c/VuUpmJgZSkToWj0GI4B05B9MDTXXx5eq1tA4Y/hmISjkJnKcDcZTnZ/Js/h2E454jHy5CZS95eq0SyRBAJFnj2oHHL8LxSlvuQlQjIxmRuA/i8WofhmCMdkY1HeMlX9oPRjzwyGQiQTE7Zewpl1EIzjjJqUr2jxpAEumhLJHKR54ggH38s9P0ePpjI4wRuNkWSL9g7PQlACVVAUKqBJQUmNkHwVhQKlUDmyaTDoGMo8wbCBYaZCUAoVUDVVVpAqhKAqqoCqqgBBShAgqgqwooKbQUDOS4+FlwjFwgaISFQCFVSged+J/AP6ny7/f9/3/AE9X8SP8sV/E+TevLQE2x7mjw59vc0BGuv7/AL/v7zVcIq9HDqs/oDT4zx7EDXN1MMIuWp8HzsnW5J6R8o9jzG8hPcl3j0+gRDG7Bu797PL1jAPFfSHHYIHLqUbTy9EsdHRRj7nlA56ILRxE69npMAF2BA4jcdCsJbTY0ejLjsPNKJjygelh6zf8b139ocfv+/76+EDT39Jm3eWuEU7dyQbHtWrtEOKQLJrRB/f9/wB/+0kLWlIH1GD4B7gubpsWcAZYRnXG4WvT6wj7g7sIYy6bHOHpyiDD+EjRmPTY4DyRjGr21ECrehG3W0Dg6Xo8kck8+cg5JAR8vAiHrGKIJIABPPtdVQMD02OUdkoRMf4TEUn0MdVtjR50HZ1VAjYCQSNRwvpR10GvPtbVAzh0+OAqMIgXekQNXSMBHgAXro0FQBTnHBCJ3RiAfGnVUCdgu618WfTGug15dFQMxjiOAAnYOK0bQgSYA6EAhdgbQgSYA6HVG0OiCgTsC7By0lAnau1pUCREDhaTfZBNcC0B2hFANJpAkBNJVAFI2tKgTSaSqBO1NJVAUJQgKqqAqtpQFUIEwSR3CBSqqAKspVWAUFSi7RRZKShgBSpQiglY4FuJP8z5PQ4H40Q0DYYDYaAqqoEydQ5OoaClVUQVVUBVVQFVVAmQtzdJuYYUKqqBMmC6FzIQM4/E7BxiPM7gMKEKU8KiATa0hAq0sTkYgyomhwOWomwDxY4aA0q8s8NIJKAQ+Jn6uGXqcmPJ1HpQgI7RCcY2e9n2eCf2+HTfD1EMsP8AFIGY9tjn3UintpfLw/inTxgBlzwlOvMY6B1/626T/vofSiHetvnf9b9H/wB9D6V/646P/vofSgegABwl87/rjo/++j9/5L/1x0Z/3sfv/JA79Eh84fjXR3/dH3veJWLHBQKUPFn/ABHB05Azy2SIutT9Tl/110g03/8ANP5IHp2tvl/9d9J/3n/NP5I/686Q6CZJ9kJn/wAigepyr4HW/iGDqJ48e+Xpkk5BGEwarT7N1fg69J+JYMUzhE5Sjps3RlY9muqB7auOfqIYIHJkNRDzZfxTDhAlPdGzXwGwfaK0QO9AFPm/9cYLEf5lngelO/qebL1WCWT1oerHJ4+nOjXYjhA91Xzul/FMXUGIgJ3L/Aav3u3UdbDpyBITN6+SEpfUEDqS+WfxjCCIkZATwPSlq0fxXGPsZf8AzUUD0lfKj+M4pgShDIQeCMZTL8XhEiJx5blpH+WdUD1EE1y5dPm9aO/bKPsnHafoLl104DGY5ISyRl5TGEb/ACQOq1t8Lp/xDF05jDHDL6c7EYmN0R4a/c9f/WV8Yc3/AJrQPQMxbQL81GePqM2XLkw5MmojA7dYUNQNdDb29L+JyMNceWRBMbERrXz58UD2Uvln8TMZRhLDlEpXtG0a1830oS3AHi+xQKVVQA+Z+L5jDCccPjyEY4/6ufufTL5nU9Aer6gHPEHDCPlF8yP5IHP+Fn9mnPoibEDuh/RL8ijH+IdXlxyzQxw2xMtDI3IRPbw+bpL8Lj0+bHm6SAiQayDdzE+89nl6I9TLp5Y8cImJllEZ7qq5Hkc/Q0HVL8Ry5MkMfTxiROHqbpE6N4+uzGOSBx3mx15YnQ7uD7vF5PSydL1OPHhAntw7SCdt0R73TL+H580MkzQyZDDyXpth9m/agXj6/LHPDDklikJ2P5RNxIF6u/4sf/BMv9LzQ6DKc2LIMWPFCEiTGJ82orl7+v6eXUdPPFD4pRoWged0c5dOD0mQ35TLFI941x7x9Tn0OQCHSR2g7hPUjUadn0Or6E9RiEQduSNGEh2kP0cOn/DsuMdPur+UJ79fEdkDD/rDqj056qoCMSbhrcgJVz2emHUdTDPjhl2mOTdpG7iRr80D8OyfsUumsbzu92srenN0sp5sWQVWPdfzFIHk9BLqo4JTxGG2EshEZRJMqJvW9PoerL185QhkhOGLHOO7fk1+QH6oxdH1mLHLCDj2zMzu1uO4+Hdr/q2eDJGeEQnGMBjrJ2ruPf3QOPP1sup6TMJGMzCcI74ChLzR1pvP1o6Xq8sYUcmQYowB4uuSfB3P4XlljzQlKJlllCYIFAVWn3O+X8NGaeY5K25IwiK5jtvVAjqc+bBGEZ5ccLvflnX0RjbzY/xPJ6XUETEziAlGe3bd+x3PQdSJY8u7HPJCJgd4ltP+IdwfFB/C8045xOcTLNERsRoAj9EDs6L9oMd3USiTKiIxFbXqmSASPB5eqOXHiHo/HcRxffV6pR3AhgPB/a+rHTw6ozidxiPT2aamubt7MeXPi6gYck98ZxlL4RGjE+zt72j+HS/ZYdNuFxMfN/Sbds3RnLlGS6AjOBH9XtaDyc34lkxwOQZomcTrihDdHnjdX329eXL1OXqThxTEICEJk7bOpOjJ/Cs8unPSnLEQraNsKJ8L1+mnux9IYZ5Zru4RhX9JOv3oHm9R1k4ymDnEZRvbDHDf7t3tLnPJk6nJ0eXdtMxI6Ac7bPPi9sPw7NjEsWPII4pmR+Dz+bnW6+5P/Vs4wwiExvw2LMdCCK4QOTp8eaUupOPIYAZJEVEamu99nbB1mTNLpZGh6kZmQruAHt6fozi9SzfqTM/dYpzwfhvpHD5r9ESjxzuQPQCVASwAU32W6SgBVpWFAUU0hAUJQUDDL8QaDOXkNBAsJQGkBQqoGqqFaQKqqAqqoCqqgKFUoGZQp5VhQEaqUslAiSMXCZLi4QLA7qoIOnggoFKqoHk/jOSUMcTGvi7viHqsg1qP3vs/jmKeTHH0zREv0fnz02Y/aDoG0utlWlIHUyPAHyty/YsxHxRZPSZv4ggbS6uUQTIAfS+flyyzSMpakunUYp4aEyDbhHUoh1dPj+09YjQccI/f9/3/AE1Patf3/f8Af4RQk+23MToe1OqDGtUA7vvQTXCk1+/7/v8AcnXW/wB/3/fwAgm+eWZG2yGCO/dAiXPH7/R+/wBWc4guvbQcexlEOUumPKYSBCMkaLMRrSB6A6jIew+lP7Tk42x0cxhzH+GkxwZiddqBr+1z8I/S1+0z7AH5n8nGXTZx/Dr7Uejm8I8fv2/f6wPtulN44H/DH6noefpP7UP6Y/U9DAY4unjhlOQu5ncbP1Ozli6aOKU5xJJmdxs39DsgBUqgClSgoAKQlUBVVQFVSgBUoQFVVACVVAVVUBVVQFCVQAqpQFVWtbQFVVAVVKAoVUAEX7EqpQATWqIyEgJR1B4TVppAACUD2pQFCVQJBux4JUcppACWY3WvKUAoBShgEspKEUWWkVqwCgXfsSmkUBcPttGWT1NtD060leu7wpkfEUQ0bDDYaAqqoEkauwcnUNAVVUQVVUBVVQFVVAmfDlHh1lq5hhQqqoElgtlgoGcT5iHeLhj+IvQwoVQE2gJQCe7SogpZB1ppoGkEJVpDyvTj+3ysDXEO3e3zupHU5ulyyyQxQAJBjsO6gexun6A9PD1PW+1t2/Jc2CGeEscxcZCi0HldfKWEQ2bMcKuWQxBPuHt97n+HbM/7RIAEGXOzb9nw7Pt+mKr62YdPCEpzA1yG5fRSB4+A5Y9HgjhqMpkRMyB5f82JzM5zzSyeTpQalUfNPvf1PtQ6XHDGMIFwAqjqz+xYNP5cfL8PlGiB5vU+vKskBIAwsQhGPxHncT2Y/Csk8ePBDJIS9QSoCNba9vd9sxcsWCGGIhAaR0HsQPP6WGeXUZJdSYggbIbNLjd2+pDQUzPFGfPbg9w44ul9PPkzfxiIr3IHJ+NjIcIGOG+5Rv2asYDlPXE5YCB9LQRlu7vs05+hD1PVrz1tv2IHm4Y9R+2Slml5REjFXcH8moE/t2Tk/wAqH1vozxRmKkLDIwQE/UA85G2/YEDySc0QeuyzjERiRGAGlE8GXc+56MR3dZuHfDE/TJ6ZdDglP1JQiZ+NOoww3+rXnrbfsQOb8QiZYqEJZNY+XH8XvfKzY8hwHNlPnyZsZrwAOgPt8X6Fzn0+PICJAEEiR947oHFmH/h2L+jI8ObqMuOM5HLIZ5zOOGPdpAeNe7W33ThjKQyEeaNgH3pGMckAnxpA838PIxZZdNhkZYoxBJuxvJ119vL19UZwAnGzEfHGPNeI9oeiOOMBUQAPYKTbAfOdPCZzYZylkkDlmIeqT8O3mjqHp63BlOSWQjLk0/lxhPbGOnfV9eWKMyJSFmJuJ8C3QaDwcIyS6DBESMIkgZJR5EbP725Sy45yyZZTltxDb043GzL+IePg/Q48UccRCAAiOA1tH0IHPgy1CAykDJIDy8EmtXTPHJLGRiIjOvLIi9WcvSxy5MeQ84ySPm70wHz0IZMWbpsU4SFTmTORB3SI1quzXVylhlkySMjmJEcEQTVeNDn22+7LFGRBIBMTY9hbpoPD6GMIZoYunO4CJOaWtGR/VPSYZZulyY4S2k5Mmo977dMxxxhe0VZs+9A8DD0xw9ZhAxjFD+YAN+4y05L9BFBxxJBI1HDaAqqsAEJePqetGGYxiMp5JCxCA1rxQOos48UMY2wAA5oe18frfxESwDLj3RMcsIzFVIeIp7MX4gJ5fSnCWORG6O8VYaDr9KG7fQ3VV+xt8yX4tEROUY5nCOcoAr6Luvkj9orrJXL+WMQn7PewHqq+ZH8UsCcsU44pGhlI8uvHtAL25ZeSV3VHjnjsgapp8vF1ohhxDHGeSU43Efaod5S4U/iojDIZ45RlirfCxwe6B6ivHk6wQnjgBuOQ6V2A7vJP8UmInNHDI4Y8z3RB9+06oHrJfLhkMut0PlOIED5vpWgUh5MfWCeXJhkNpx0ffE93kj+KyyRh6WMmeTcYxuvKPtE9kD1ii3xes6uWTps8MkTDJCNkXeh4ILR6gYsk5RgZTjhhL4uR4UgezavBPrwI4jAbjmIER7Ksn5L+KZJw6XJLHyI83SB6AKvlw6jqI48cBjEskhqdx2ADxNcnwdeh6yeaU8WSIE8ZAOyW6JtA9BBIiLPAW1QEEEAjgtICUBVVA1QChVQChVQFVQgNs7he29fBpmhd92FCgqpQMM3IaDGbkNhAsNMhYzEuECkKvdA1VVaQKqqAqqoCqqgKClBQMyqnlDCigpQUDOSMXCZcM4+EDVkCiT4pUIFBJRfZE4iYMTwUDg/FK9MH2vk86h9P8VFY4+yQfJMvodALA5r9/wB/391XbPfRA5fxEE4wTpReLBESOr39Ud2KVPH0xG0lEOqGnvbj7a/f9/37ck8nYPLKVlA9W4fuWd0ddXym4y7IHpWNfBG4VbzRyGqC+oSim5ywGsmDmgfk80yDbiUQ6ZZYyRGQu3CiNS3AhAvJEVYZ6bXIG6BFOnRQu5V35QO8HujQKCtoB9iQeyAbT21RT6rpv7cfcHdw6Y3jj/SHdhBVxxRyiUzkkJRJ8gAqh+rugKLShAKFVAKEqgKqqAVQlACpQgKqqAqqoCVCqgKqqAqqoE7db8GgqoClCoBQqoCqraAqqEAsTiZVRIo3p9SQb1CUAqyBS6oFIJpkjW/BQT3QKsHhQbCLW2ApC2rQLMpEECtD3UmlYCrVnhN2iiUJVABVVYBApKFQAXH7RdnD7RQNGwwA2GgKqhAXUOPd2DQFVVEFVVAVVUAWUoArhKBMnIO0nIMKKqqACwWywUCMfxF2LjAeYuzChW1RygWClkaBJvtyiBVVaBQU2yTrSIN3wiRl2+p8TqukjkzyGPAJkVKcp5JR1l4PFHo8Z6CWYxrKDPXcdKk0H1VoMg8/T9PDBDbjFA68vgyh0cesyYzjmYxiPLEZD5r50P38IH0u5SS/LnosJ/D/AFtn8z+K5X8fv8HtzdDgGYYMODGdDOUp3QiP1QPaMq5fMOfqOoyzhinDHHGRHzR3Skavx4fNw9NgMj1MscRglIYoR18a3c+P3PVi6Tp4dTmO0REBAxOvl0NloO3F1GbFLZ1G0g6DJD4b8JA8H7ns9QeIfnulhDPH04CM8UMcvUyDicjxffd314aj0uDD0OPOMEcstkDLx15LAfQepHxH0hPqx8R9IfC/YMPTdIMk8EcmSMbkK1+n2B5D0uMYMIn05jMzhvmeKMvfrpo0H1QkCLDl1InKBGOWyXaVbq+RXDhhgjsxxEYjsHn/ABHHjliMsmL1tuojp+rAHBnkP5eaUd413DQSH6e0O5zw/ij/AMoPznTYOmObp8JGOc9uQ5BCiPZfudcsMcIzzejj2RkccIUd0pcfX9yKdUeoz5ZZJxyxjsmYxxECiB4nnXsX0MXV48kRLcBYuiQ+V0vQYMUv2bLCE5iHqGW3xPH5OeDpccehx5IYsRmRrLJAEDzGye+jSHvftGP+KP8Ayg6h+Z6HDgzdXt24pxjjOsMe2JO4e/6Q/ShgInnhE1KQB8CQ+dmnL1Dkx9SAP+6lt2/TyLcfxXCcmbHGOCOTcQTM1fl1rXxHi59P0uOXWTEsEID04kRIiftc6NB6eP8AEMEoiRnAX2Mx+bX7dg/7yH/LD5GHBGODNPHjhKYyZNtxB7/p4OX4h08o4pVDH6YjGXqiABlZ4HgoB7f/AFh0/wD3sP8AlBP/AFh0/wD3kP8AlB4Oq6bEOp6cDHEAynY2jXyuObpIdOM8pYRIT1htxg15a8PL4sB6n/WPTf8Ae4/+XH83TD1mDMduPJCR8IyB+p8vYcPRQyYcUJy2QsGI4rU6cvofh/Txw4YRABkIgbo92g7VVWAVShAVVUBVVQAXxfxOGOWWPqwlQjplxXvjrxQ7Pts0Lvu0Hz3pZ8mGjvnEZsZx+pHz7fa9vU4pnqsM4gkCOWz2HFW+nS0gfL5sOTPgnHJDNPqKN2agPdrR9mj25eknnySABAngEBI/xeD7a0gfNx6TdAYvQy+poDvnL0x7buq8H3co/lyH+GX1O9OWfDHNAwkSAf4TRQPChDLLD09jJLD6fmjiNHd7dRp83foOiMcuYSxmGLJGIAkb8bv2vr48cccRCIqMRQDpSB434d0ebHMnMP7Y9LEfGPj9TxZOiy5MM45cM556leSc/J8ta9wp+mpFBA8vp8OT14Za8voxjf8Aivh7Oj6g9RiGQx23el3wa5emkRgIioigOyB434xinuhPEank/kH2xl+Wq9X+G+fHOGMZYQh6Zx3RrsRw+j+x4vV9ci8lUCTx7g76IHhH8PnLFm2YY4t8dsI3cj7zZD24umnHqfUI8pxRh8x2fRVA8jofw/Jhzkz/ALWMGOH3SNn6OHu63Ac+DJijzKJAepaYDxM3S583pyyYt8Ix2yw+oPi/i8C7fh/R5MGbJOUIwhMQ2xgeK+QfVpGgQCFW1RSlRabRAqi1QC54oyjGpy3Hxqm7Wu6AVtVQAqlUBQUslhQJQqBhm5DYYy8hsIFhKAlAV7qvcIGqqrSBVVQFVVAVVUBQUoKBl3VJ5QwooKWSgRLhjHw1LhiB0RUatcMgWkacIhSlbvlCB5v4t/bBH8T4/tfY/Fv7Q/qH1F8Yy/f9/wB/10A2yQOe6m+ECigTIAxMT3FPB08aEgeQXbLM+rs5BC4APNppZQOTNLXTREYSOgFEc295hroHGcJgc/v9KIcYkS1OJgTFuUJNwwWLPCBXTQs6hvMABpp+/v8A3+rowY4wsVrX7/v+5zyRkAeyB58kbSBuDuYeLBh4oEiJkLvT2oiDbp6XtbjDadUCYka09PSTjGFXqTw4iA1caoEIHq6qDTMRQA8AEi0Uprwpm7aGn7/v+/3AfU9Npjj/AEx+p6Hn6X+3H3B6GEMsUcolI5JAxJ8gEaofq7KqAqhUBVQlAVVUBVVQEqqoCqqgKqqAqqoCqqgKAKW1QFKFQCqqgKk+KoQCqEoCqqgKEopAVVUBVUFATLXhXM5B4j6VGQeKBormZDusZg8G0DRXKWWMdCQPeUDKJCwQQwpshx9ePYgn3s5JwlGjIAHuJUgdCuYyROgIPflIyxvbevggXdcrblLNAHbIgE9iVlljH4iB70DQlFuZyC9vfw7oOWIIBIBPYlgNrS4yyxgLkQB7SAgZ4Ebtwr3hoNi4/aKnPDncPpZjIE2OGFNg0GA2GkCqFQBt81uoYHLYaClVUQVVUBVVQFVVABcnUuTAFCVRSSwWywSgZgkE1qXUycx8WrpQu2FLRqovulAIKWQ0CiBKou0biR7WgpXDHkkQTKNU6RJI1QInhuYyR0PB9o/fh4x+G/8Ag0+mMtJGRv8AqNvoGSNzSAxwEICI7ABHpR3GdeYjbfemt4XcEDhP4eP2b9l3afxV7bds/SQzjz3dVcSYmvk77gncEDjh+G4oGJiDWP4ImR2j5OsOlEMs8t/GIgj+l33NWgc56aJJrQSG0gce9PTYBgxRxDUQG2y7WyMkSTEEWOQgRDDssD4P4fD3ez2OWXoY5IDHZAEozj7KN17noM4ggEizx7WcvUY8IvJIRB/iNIGOTHlPU45xJ9MRnvHazx83rpkTBFjUKMkSSAdRz7EDGfSRllhlGhhu+e4M5Ohw5Zic42Rr8/H3vRLJGNAkAk0PakzEQSdANSgYYejxYdxgNZfESbJ+bXTdNHp8ccUTYjdX77doyEhY1BaQOY9LH1hn7iJhXaibZ6XBPHPLKZJjKQMATdCnrVAzyYhkFScx0sRlObXcY7D7hq9CoHPg6aODcIX5pGZ95Rm6OGbHLFLSMuaelUDCfTRnKEz8UDcfop5vxGRhjq9sZeWU9u6gfY+gqBw9FGWKEcE9dsRtkOJR/Qt5+l3Y5whY3AiroX+j10qBlgxnHjjCRsxiAT7g6qqAqqoCqqgKqqACLebP1mLAaySETV6vSXyuoiJdfisWRCZCBWX8T6fbGYyiIJ5545HsejL1mLDETnICJ+Hvfurl87psYEus05kR/wA15ceXbHpogwxy9Oxlya17BqBaB6Wf8RhLp8mbp5AmA8OD7QXSX4hjwxj6x2ykLAGpPt0fEM98esO/1PJE76Av6HqnnMc+2M4YCMcP5k43KQPh7mlPTH4jgOL1949Pi/b4e9gfiGPNGfpS80Yk0RR99F8XB6c8GU5Jyr17GQCtp7SI8Hpx5ZnJOEpwzj05n1Ix80fYT7UQ6uk/FcWTHjE5eeQFnaRHd4Xxbv8AtYxzynJPywESRXw/Pu+dkiB+G4/Csf1o6wf8Z/RBA9Ifi3TmJmJeUEDg6k+Hi1h/EcWYmIJEojcROJia8dXj67IcOPCBUASB6hjezTl5cUhPqj55Zx6UxZAF+yKB6mP8VwZJCIJG41GUoSEZe4091vzOHOMfpx6bMcmsR+zZI7pR+fI2v0OPqITySxRPmhW75sBy/iGTN0+3PjN44n+bD/D4/Jzl1MuozxxdPLyACeSY8DxH5vpmIloeC+Z+D4Y48Ggq5z+toLn+KYoSlGpnb8coQMox95CJ9WZdTijCV45wnLTg1wXzMcR0onjzZc2Oe6R2wGkweNvkPPvd+nwHHk6aIjIAY8mktSL8aoKAdvSddAxxwMpTlkEjGRjV7S9ePqo5MksUb3QA3eGr4uPDL9hx5Yg78UjkA76S1HzD19ETg6efU5AbmZZpADWuw+QYD1SXwZdSc2fJjy9QcBjLbDGKjY/is82+3jmMkRMcEAvkZeo2mWLrsRkLOyUce6Jj29xQOrD1GTp8Jn1cgdpNTj9qPbjuWsf4gJTjjnCeOUvg3it3ufKx9HlOCRxwIgMscuLFLnbHn6ewezJP9uy4RjjIRhkGScpx21Xb3oD03X+nhM8pMics4RAFk66APTi/EBOZxThPHMR31OtR7KJD5ox58eAACcYnNk9T0x59pOlafeuHAR1XqRhlGP0pjfl3Ek/PUfc2AdcPxqEoDL6eQYjochAofK7r2vbj6uM8ssIu4iMr7Hc+H0+WeXoB00MczOcTAGvLRPxW9sYz6PqTIwlOEseOAlAXrDxYDaf4tjhj9UxlXqHDQGth7OnzSyw3ShKB/hly+Lj6bMcUd0CJftPqEeEb5fYy9R6WTHj2k+oSN3YIHQleUoChLMpiNX3NICUFKGFAhSgixSBjlOobDnl5DoEDQJQGkBR3SjuEDVVVpAqqoCqKSgKqqAslKlAyIVJQwoslpkoGcuHy8ebIOtOK/wCXs3Ae19OfD50CD1QGliMvfSKj0wlmISiFBSUBJDQeb+K/2h/UHx68H1vxYfyh/UHxbI4aCiyDo1vl4ouWupsoHLluMzkHYaIwSOzvq6zMidSaeeySRZI7Ih0WfcxIHguW83rqXaJGniikwxi9Xa6AjEauZ0cpynjjcdLQO4YSBuLlMePDxQ6ifwytJzGvFELnGljGxrw5RzTPPDrWn5IAI73p+/tUyrQLKx+/7/v98ykBxwgO5zJuR9yiRPLXxe9A7onyx9wbpiIIFX2r9/3/AM6P0IGnbujtYZ1aB0RT6rpf7cfcHe3n6b+3H+kMZvxDp8EtmSYjLw1/JhDsW3zv+uOk/wC9j9EvyR/1z0f/AHsUD0lfO/656Tn1RXzerD1MM0N+M3HxQN1t87/rjpf+8H0H8mT+MdLp/MH0FA9NbfB6Xqum9eUjkkckpeX4q2ngU+3KW0WUC1t5em6k58UctbdwsD6nLpOu/aN0ZjZkganC+Pb7igd6vD0fW/tW6UY1jB2wl/FXJ9z0xyxl8JBrwNoGquBzY4yoyAkfEtSzRj8RA95QNVZEgRYc/XgZGAkDIdgdUDa1t8uH4hLN1MsOPZshW4mXmOl+Uexvr+sydP6ccUYylklsG4kDj2IHoWtvlDruoxZYY+pxxAyExjLHInX2gh6cfVfGchiIxltB3e7nwPsQOxXzc34tghKEROJE5bSd3w0sPxPGJ5YZpRgISEYkyq/LaB6Vpc4TEwJRNg8ELHNAzOMSG8CzHvRQNUW49T1MOngcmQ1EeAt4uk/EDnx5Ms47BCUhXeoi9fagela2+P8At3UxxDq5xgMRqRgL3iJ73x8nTJ1efJnODp9o2xEzKYJu/AD60D1LS+f0fW+viOSdRMTKMq48vJHsc/w/8Ql1eTICNsI7dniQb1+aB6i3aLSgFVQTSAVVUCZA1pywLAG7U93RiSB8dkGDHjnmy4/Ukc84fERpy1ih0+QYc+LEMcvXjA+Yy+t6JdJmO/FPBHJA5J5Ik5dvKIdLlvFjhhhjhHJHIazCTQb5esy9ZHKKEMWIz3VLWe37Psvxb6TLgj00cvTy9GEZb8g5uhrHXl8iWfFhnMGxklml6hrnCeQ2AeqjA7jLAM4xxxbdBD/ZogdWWXT5MnqdWDkxy1hM3cb4jQRhy74ZIYYjDgiZS51nX2dstRuHcIl0x9eOLGBCMJieyJuO2J+IntL/AAs9V1GDrZ5IzxxlkgZREyT/AGx9oeJ9ndA87pyN3qdODGc5bPSAO3ZLtvfV6zH0/UYBGvTy4/5e2uPYNfh/xL0vVZsWE4YyMhW6E/4cNc/1D+EpHUDPUZbTklDaMspV/JPMjrpP/CgdPTEYdh24zOOLbv8AVF7v4eePa+ceozZ/UOOX/hMDI7o9sY5iD31R0fSYBGcTHHkMc2y8k68niNdWMeeHT5JDCCJDNZOMf7ruGA2ydT/bl1+OjsGzNGzIHt7LRn6uWY44TPqE1tHOn/eGuJezh0hmn10cmGcTISmZxOUECOPix7R2Dy4Yx6YyhilWSOTdvOm7COaPe/Du0p0dTLKeqjLGZH0IkZMkhW4A2ffo11P4j0+ScMuTFGczIbCLJGPx/q/wp9fN1AlGEjKMp+sB/wCUe8T7f8KMOHBjMiIQ3SyGcJSNenDt/qHNMBvl6vJ1kxiyYscsJ84lORFC+/YS/wAKeqh0sMOzBDQZY2K03POMM5gyMztGe7I8pA13f58PX1cRlxn09sCMgkTPyiVa2Pf7EDy+pzYIZ54hggQJbbsv0vS4o4RsgKiDw+JDZly7skMAkTZPqmRv5Pu9OJAef4u7CnTFpkNBECqqgI5dA5jl0DSBShUAqqoCqqgKqqAC4A607lzPLCiqqgAsFssFAzA8ztVuUfide7ChCqqApDKQgG0AWXLqIylEiJMSRVjt7WunEhACRsganxaQ1pm6aJr3LIA8IHh9b6seohAdRKEchkSPKNtajn9XPFLMYZskupyGOKRFw2GwAD4e19LN+HYc845ZxBmBXmANj2j6nLp+ilghmhARjulKWOuNYgfW0hwxHU5MkIRydSIm98pxiK004dMWHNkzZcR6jLthsr4ftC/Bvpek9M4/TBM/99OUtRQ1Fe3s92DppQz5chrbPZX+kU0HldGJdXkmMPUZTjgI1Lyjza2Phbw4M2WWaPr5bxyMY1IC/Lfg+qMHpEnGBtkblH2+IcsXSyxyzEmhkluiR28tIHiGWeGLGZ58nqzlCO3cNLPmBjzYfpcEDjgIkmRArceS+F0s4wyDF02PGSKjLOTYJ70f4j731Y5sn7T6VD09m6+93SBXW9SOnx7gLkfLCP8AFI8B8/8ADMM8XUZxkJlI+nKR9pF/Q+j1XQ4uqr1Y3t+HUj6nk6T8Kj03UTygDaRHZ5pEjTXlgObJgyx63Dkyz3GRyCMQKjEAfX4l6+p6bGJnqZYzmlQgMehoey/Hu7dR0ksmfDljVYzPd/qFMZsHUwynJgMZRkADjyEgAjvEj72g5PwwSl0soYpbJ750Kv09fhr2BP4Vi9DJ1GMyMqmPNLkkxe3oujlhE5ZSJZMkt8q49wT03SSxZc2SVVklGUfkKQPN6np8keswZckzLdOYjGqEY7T9/tej8X6eebBPzmOOMJExj9ogaa+D19T0ssuXDkiRWORkb8DEh06rAc2GeMcyjKOvtDAT0euDH/TH6nqcemxnFjhCWpjGMT8g7oChKEBShUBVVQFVSgTGRJIIoDg+LSqgBUoQEADQaKqoCqqgKEqgBgwiTuIFju2+d134nDopQjME7zVjtx+aB3enEXQGvPtZlhhICJiCBwKcOs6yPSYpZpCxHt4t9Pn9fHHIBW4CVe9A0OOPh7FlihL4gDXFgFy6vqf2bFLMRe0GVeLpDIJAHvQNe9ArYPAa8ojjjEVEAD2ClOQDk0kzAQHYKrsnaGTkiBZIA8bTvFXenigExHC04ZepEccskaltBOh8Ajp+pGaEZaCUoiW2/EIHRTEMMYzlkHxSq/k4Q62E808PBgIk6jv+TuM0SaBFjXkcIGq044+ox5TUJRlXO027WgCloOPUdRHp4HJPgfvTz9J1vr9OOoyVAUSfZRQO6mZwE4mMtQRRfP6L8S/bMmSMI1CG3aTYJu/u8HPL1vUiM88YRGKBOk7EpCPJ9nsQPVjERAiNANFp4s/4hDDjjkNkzFwiBcjpbXS9X6vTxz5Kjcd0vAIHYAmnzei/Ev2vNkhGJEIxiYmQom7192mjPV/ifpZY4cUTImcIzlXlju/VA9SkSgJAjxUTAIB5LaBh03TR6fHHFC9sRQt2pKoApk4oykJkAmPB8LbVACVVACqqKAqllgAUKVQOfNyHQOebkOkUis0CUBKIKO4SgcoGyqqIFVVoFVVAVVUAILSCgZE6qp5VhQIKUFAylw8WOJ9fdtG2iN32vd7ntnw+Ziyy/bPS127DL5sZUerEEpQKappBsDlrRCaQPM/FgDiGv2nw5af7P3/f7/c/F9MQ/qfDNNADV6I01oLI1wwCNbaAyr6XklQka0ewi9Xl6iBBEkDO71dIyr9/83Lgg1wplQRDrjki1MxN34vm+oQbaGXknlFOnJlsAUNP3/f97w3C7CDlvSggzAPCIbDTke9O4Vq5xyRLEpFA1JNafv8Av+/tykSTqsbKCaQCLLt08CTZ4cT7O73xjsiAewQLP7/v+/5oCN1pjqihvxbv9/3/AH+sQaOqg/v+/wC/6AfV9Jrih/SHLrMnpayO2BFb9t7Ze32O3Sf2o+4O5FsIeB+Hyy5Oox5MsjIyxSOsRGvP7HswDrZykckogRkQIbPiHbzX39z3nBA5BlI8wBiD7C600HzUv2mPS5PUxiMTMmVy1FzHZ+iAXLhjmiYTFxLYCB4H4j68I5N0skiRPbGER6Yj7TXh7bemeCWXFgnViG2Uh3rbWj6k8cZgxkLBFELDGIREY6ACgwHk9FOU+ryWCAIQAMhRIs609P4nMxwGMfimRjj/AKtPqt6xhjv9WvMRtv2IyYI5ZRlLUwO6PvQDDGIREY8AUHyPxfpwZ45RkYSyS9GZj3iX2w55enhm27xe07o+woHlfi0Di6aOPHQhvhAi6G3wJ8D3cPQlgz4p7cWG7FYzK5RrittF93JhjkiYTAlE8gvPg/DsHTy3Y4AS4vnT58NB8/lh6nSZM0MeMQIlL1Mp3ZD9A0Phq9cMEOq6rD6w3D9nBo+Nvpj8K6UEy9OOvvrX2cO8OkxY5CcYgSjHYD4R8EDn/EN2PpcnpaEQNU+Z1OLDj6XFPAIid4/TlEak3rr30u36Eh5sf4d0+KfqQxxE/EBA4uixRHV9R5YgiUKocXHVj8ZiJHADLaPU1kDVaeL60MEISlOIqUviPjTHUdLi6gCOaImBqBIWgeD1OOHTZsOTHlOXIZiIhKe/Q8keFeLn1URLF1UTweogPvi+9h/D+nwS3YscYnxjEW2ekxGwYAiR3S9svFA8zrcGLFk6eoxjH1D2A+yno8MJdV1RIBO+MfltD6ebpseeO3LESHNFqGCGMkxABlrL2qQcH4L/AMJD/V/0i9sTi9UgV6lDd/FXZvHhjijtgAAOwSMUBIzAG46GXdgDIW+V0MRL9oBFg5clh9dzjijC9oAs2a7lA+YzAS6TZjzGUJVHHiob7vg+wPVkx4cvVSx9YQBCERi822xXmN99X2Y9LijP1BCIn/EIi2svTY8wrJGMq/iFoHz2LDmz9P6XT1PDHIQNx27oDjXwvl6+glnPWZd8YjSG6pXVDStNX2owERQFAdlGOIJkALPJ8UAhPvVUAqhQbQEG+EEWvHsUoCyWmJIHyPU/ssRmhLMZm5SjjMSKme9vH0XT7gZYhuzj4YnTb/ivufY9fXQ6jqseScp2IZJfyzQNDv4l0lkE5QHU9PEiMIky3keT8/Y0HZ1vRnLjxZcsd047fVP+Ec/uHmhPBHFkx9HmMZDdmHlrTw1csfW5PSJ3yx4BMiE4x3Sr+GvD2uXVSHV7Y5RUjHyZY/a8N3aN90DcZf2jpvR6O/Wn5svbdprqdHDq+g/ZhjPpRO6Axnzf7w9+f8kdP1nUCP7IZSjMfBKIv3D+n2vXnlnhDHPOI5JiQxiG7y7v4iR3QL6Hpc3SgjqICGAYz6gEt26XiR40vVdP0IxQlhxwPqyjAHuBLvV8p6zr55oHFjFZYebNA6RMR8Qvv8nk/l48frSw4obh/LOKW6Yl20vRhS83RdP0kTjjGOfIPOfU8tRHtGl+zl3wTPT4P2jFhxwyHgCZ1h+/Z5Ifh059PKXUZCDK8gx2NT4kHW3LH1MsuyE8A3RAjHJ5t0faO1hpDbJ+KGAM5SnOUxUsOQVAA8044Zyz+XJhBidIykD5I+Efd2e3qh0ufJA5ZylKERHUfF73TP8AiUsctmIQiIix6lgUP4UUrp+m/ZJnp+lnKW74zQodrvsR4cvnZ8QxynjynJI7/KDDyzl7T++j6nS64THp5xOXKfUmCfhvwA1+lM8M4RhLqzI0REDGfLXjK0CemydVkHoSxwhCtti9B3AeOEJRyzwgHKIRMoQzXWnfbWp8HtxekcmTF0+SUpSgSDu8sXyY9R1XSEwyxlKzs9XbIzrwhI18kA5c2aYGI9OMZPm/lwqVD/N+j/Dt3oQ9S920XfL53UXGWKUBlEhEXKXO0dpe0vs4q7fexg3BaDAbDAFVVARy6BzHLoGgKqqIFVVAVVUBVUICXLu6lzPLCiqqgAsSbLMkDEHzu7iB53YFhQqVQgBIVUClQkNIUgaaKnlAaQRag1oUtIRLFGZsjXxbApKLBPuQGlItKoGUcMIxEIxAiOAA6UqoClCUBWlCoCtKlACqtICqqgKKN86JVAVVUBpUqgBKFQFKFQFUoQFVVAKqqAoW9a7qgAvi/imEZuow4zxIZY/TF9ouGTpoTyQyy+KF7fmgeCcsurxwxy5xwnLL/VEbR+axAy4umxbDll6e709wjD3y/J9qHQYYHJKIo5fj9rE/wvBOMIkEemNsSJEGvCwWg8LbLHj6zFtjACETshKxEkF68nS4+n/ZsuMVMzgJSv4tw1t9KP4X08BOMY0Mg2zonUfv3dp9LCYiJCxAgx9hHCB4eSEeollnDEMkQTE5M06ArtEexjHD9ph0cchJEhPdqdQB3fZl+F9PKZyGFkmyLO0n2x4dIdFihs2xr072ey+UDyp4ITzHFhwxyenGIIyS8kAfAUfpeTDA5em9LfCNZyIxN+nL/D7n3c34b0+efqZIAy4v8/FP/V/T7Dj9OOyRsx7WgePEekcuPJiGLJLFI/y5XAgezsWZ9Jiw9HhzQiBkBxHfXm1IvV9rF0GDEJRhAASFS5NjwdT0uOUBjMQYRqo+7hA8gYYDqeqIiARCJuvEG3nx4cGDoISOO5ZBCJo7TKz3l4Puz6PDPJ6soAzrbu70k9LiOP0TEenVbeyB4kYyx9bgEhihI7xsxc1Xd96ExO9pBrQ05Y+hwYa2QiCDYPf6U9P0wwb6+3IzLAcPVxzy6iJ9I5MUBujUwPN4m/Dsj8G3T6YRnCgDKrIN+Y/U+tTMMUcY2wAiPAaIHndOP/Dc/wDTi/Vw6yXT9bilOc5Q2bgQTVEeMe/sfYGOIJkANx5PjTnLpcM5+pKETMfaMRaBh005ZOnhkyCpGFn6HP8ACR/4Hi/p/UvoV4rCAiBGIoDsEDz8A/8ADs3/AIvF9ZX8UHlxf+Nx/W+iIRBMqFnkplAS5APfVAISqUAKlBvsgKlUEoEidkxo6V7vkm1sLYKAbQq2wooW1tAkslssSQOfKdQ7RefL8QeiLEVmgSgKLv2NIGlAsqoFlA1VVaQKqqAqqoChKEBUqqBkeUNS5QwoEFKCgZT4eTF08PVOfXdW3nSnsnw+ZhMT1R1nuEf9HP1oqPTiHRmLSIKWJSI4BOoGjSB5n4z/AGh/V+/d8K33fxg/yh/UHwpAugE0XOiG9QgnW/3/AH/f3AO5mcBkBifktfv+/wC/6dPT4N43z+Ac+1A8k2OdaY5D0dRnEspMRQvs86IQIkuohV6DVmJp09KUuEDOQHYUzQ76ukummOeWTjI0QJESeFMK7tiJGtsyB4QJAJ4UBANNQgZyA8UDbp8e6W48B7CfFoQ9MbRwGb4RQg+GqQWfd+/7/v7RfigVIt14uY0p0Mr1QPq+lP8AKj/SHbcHn6T+zD+mP1PD13SY5dTDLliPT2yEiTpfb9WEPW3Lup+e6PpOmy48uUYxkAnPaPEACgHPo+mwyj62TBEYpzAhuPmF0OPC0D6T1B4j6WhK35sdFgxnPKcBUZGgTxHaKI18X0/wnDDH08JxiBKUYmR8UDuyZ44zES5mdsfex1PV4+lgcuU1EPLP+b1kY9sUDP8A1S0H3W5fjdfs+vG+H1oHoxzxnAZAfKRuv2MdL1mPq4epiNxuuKfG9U4+nydIPjGT0Yf0zNj6Bf0M9LP9n6bKITGMRzSjuIuhpx7fBFPotzn0/Uw6iAyQNxJI8ONHxem6o/tMMcJ5JwmJX6sa1HhoHmw9XPF0+HHEyiJzybpQFyAEjx7SgfUXaXxeg6mfr+kDlnjMSbywoxI9vtfaCIKVQAQNUAqhKAoW1tAVRfgkHxQFVRaAVVQEBVVQFVRaAVc5brG2q722gFCrbAK2qEUKCqEAsSbZKB8x1mDd1MvUyVkxj1fWq6jekdvseWfU5fxORxCPqCMdLO3Xjf2+h9HovxDFHLmxmGyMTKcpWSTrX7h5s/4jj63ER6QkYEy2mRj5B9q/0dEOU9b6OAYMcdsxOssORIVrr7Xox9J1J6IxwxEfUnu23/uyPFww5iMWSeSHxxljxnk+wV4f4i9ozw/Zdu6R/l+j6Vfarnx+aBj0fS5zk2zzGGWMajtAkNnvct5x+pixR9XaZZTkl5TGQ0sDgvR0+DqTCJ6WoY5HzdjGuefdy79Fl6kEiWTfLcY7JEcfxfNA54dP1PXSE8svSHpCJkJRkZD2+F91Mei6bb6WMTnGUYykQRx3t6s3SUZHp4COacdSCO/N2zIejAYtgsQE5zHxX9ojtaKOSMurmcssMQQP5eQz19icMsvUUM+StnI0I07k8OW/LnlWWXkAEo7eT4WDpf3pGOeSEo4qGlShkO2x3JQMfxDp5SjvMhc5VGyK2m9fc6dDtzZBgz44SOOFRnV2B4XyPa4yww6qcZSMYDHDbtkaiZjwvmHtXP12SMjHFHHCUcdGZ0/5B7jwRDLLizdHmyZcO2V7oCMDcog+weDRyDHhE82XLu4OKY0kf+z2tPS4DpPpZE9Rkhc5SPlF86j7TyZsWejHqfMIzoyOs9vev8P6oG/S5p4sUjiw7cmSRqe0iMYHwl7Hq6nosgwDJky5ss9DEQO8bvH3e13wdTkyQhHAI/s/lxn1/LKXu8dHill6jDPJDF6gO6UIRNjHGHiPAjx4AQNc34hnGLGATAgxE/U8syf+z4l9ro5mcBKRBJu9uo57PzmXBLLGMLOQ7oicpndP27P8D9J0nTR6aAxQJIjxbGU6w2GQGgwBpVVAAOrqHMDVsNBSqFRAqqEAqhUAoSqAC5Hl1LkeWFCqqgAsyaYkUDMfG7OUfjdWFCtgcrd8KRfKBABF2b109yUn2coA8UBaBRS3SBTTALVtIEi0RiI6D3qCshaIFWcenlNCuG2gCUAJQJBs1RSlUCJEgiheuuvDas0b50QKBVAIkLCUBVVQGlVKAqhKAqqoAUBKoAVKEAAg8JWlQFVVAVVUBWlVAVVKAFVUBQlUAKqoCqopAUs6ppAKoVAKEoQFVVAVVUBVVtFASIizwqqwDSQoSGgKqqIKqlACUa37EoElUqgBaSVQAgtMsKSlSFQAzINIpA5cooj3u0eHLP297rHhIrLDSAlEFAFlKB8SBsqq0gVVUBVVQAqqgKLShAiSEyOqGFFktMlAzlw+bgzyj1UsBA2yHqA/QKfSlw+NsJ680aJxmj8wintxTaI8JKIFLNpQPN/GNMI/qH6/v+9viRE5Hg37v3/f7vp+oBIecD6Gg8YdFlPI2j2u+L8PE9ZEvZn4pvEPLpr3aDiP4WCR5tPc11RGOPlryivk90zuHsP7+D5XV5Kib5Gn0sB89P8AufNo6XoiRqfsdJxBFhpDKVchuOUgU5nhlA2OYnQoOQuWoRaBfqFO/RzTFAJ9icMqmD4Luawx3Wa7oHqwIyih8TkRtNd16WQPlOleL3HBHPU+D2RTgBtoae93ydJON1qB9LgLtAN9lB5tHHvSDoSUQ+r6L+zD+mP1N58kcYBnpE6X2HvZ6PXFD+kPQQCKPDAeZ0Nwy5MZ2ndKWWJjIHQ/U9Z6aJkDoRe7aReviPAumPBjw36cRG+dop0QMcvTY8w88QfAkcI6Xp/QxRxXe0CN+56FQOXD0xx5MmSRszN+4AUAx+IdN+04vT1HmidPYXtQR3QPPl+Gxl1UeqvgfD2J4v6GD+FXEgTIl6pzRlXB93d9NbUg86P4fM5odRlymUoXptAjR/f2sx/ChDFDHGZE8cjOGQDUX7PB9MJseKkHHg6OccnrZchySraNNsQPcHsRv8NVsn2e5ApBkAztvkpEa4QDutVTaAKUhNrbASaGp4T7k7vYjef4UUUAJ9Q+CBKzrY+SIELabH8SavXloJVNx8a96fL/ABD6WAlaTcexC2EAUtJv2FFnwQBS0ncf4SoPiEUFKmz4MzJA0FnwQCApCVtAzM6kI0dQTfbRJDV+xkk+CIeIOjn1GUZZZ90ITMtvp197zddh/ap7Z4oeoQRGW6XHb2PcYyx+SowjKZMx6nIPfX6kdRCBy45RlGUI15DIeWvtAg2T7HQPPh08Oj29RIzxEVCUYx3CQHtPi3i/EcPrxlAymZnZ5o1Q96fxHDk6iYJkBhjz5hp7a5b6bpjHF6ePJHH5twmNdwPv7op1YuoxgGHlEyTthfLy4eqOQmfUQjCAOy+5l2HjTXU4MciJS2boC/UlUj9Fj3uUM2Lqcg9Q+WMYk5JUNx5qvv0YDr6iZxyHpkDKR5Y8k14lzhGfrRhMjYI2YiQvd7kT6SXUZvUwT2Rr4oGzfg+dlzYuknGUIzExIDLPYRurnXvbSGmXLnl1Rj/KOwWIynUNO/Pxex6s+TP6Yy5MWOWWZ9PkmOw+J8Hzc2aE5y/k4CNpygmRuvbr8XserpcuXrcNgxhCR/ZzjuoiJ7i+ZexAOXD03V7cuU7DiAj6daSA/hvkeDPX4oznHKBAY/TrbM1KI9kfEdkdXh6ee2RllEsNYgIx83l+1Xh7WJj9v6mMIxMqx1I5hUufi96Bn0OLPh3S6eYlikCdu/z1/Ft/iDlDIPUJzZMu/wCHGMg0lDwkewPd6OmjH8O6iWCVHcCBlhrOI418Pa888Hq5T+1ZZHHu9KEzqTff+n2oHTix58+YYogygBxO9mM+OM96+y74DI9VPpp5cssfpzEvW+sez2u2T8Tj0uGEcIMtkhiIkNTEfaiBz7Dw80jmySySBwn1LjH1Z/zIxP2a7e5hQdNGODMJxnOcIxOIWPNr3iO8fa/Q4o7dOa7vzWCOSGLSV5oTEIEHiA+ID2P0mOQkbHCYOgNMDlsMAVQlARy6BzDYQKVVaQKoSgBUoQCqqgAuR5dS5dygFVVhQFgtlgoGYPndnEfG7MKCc44xciIi61NNXrTM8cZipgEc6tnTVAaWkAnW9PBKINIIaGqlAzAaXulAUhFKRbQEoog2Dp4dmlRCd/i0DaKXaGgpUCx3WygFUX7F3DjVAKrY8UoEkeCU0qAFVbQFUqgBKqgKFVAKqtoAVKoAWkoQFGrSoAVBNEDxSgKUKgKqqAqqLQCqFQChUoAVKoCqqgKEqgBaSqAENIQJVqkUigVKsAhpAS0gCeEqqApQqAVQlAUKqAqqoChKoEllooYUCCGkFA5c3b3usXHONR73aPCKzQNMhKIJWN2qx5QNVVWkCqqgKqqAqqoCgpQUDIiirUuWWFFkpKCgZy4eDHjvqfU00BHte+XDx45Yxn2mJ9SiRKu3dFR3hqkA+xKINLSQlA5eqB26ePjTgJHji3o6rSPzeWOkogHx/f8Af/ZQMgLl8gsI7AfY0AN5B/fRrITV1RHigYSFH2S407/Q+f1tCNn3aPpygCK5t4eojYo1yAQ0Hz+TF5d/eyCgvoSwiX8of4rfNMJRkYEixpyiEmPdgRdjimO1+7VmpDUhAggKY6WGjfgySgSA0K7pBvnRoDw+5AzPsd+kiSR4EuEuH0On6c7R2PKBqYbTu4B5e+HkAPHs7PKIX5jwfF6ccTEbgCD2A/f9/qFOg6G/FEsUcl7xdNcjaefH9yxiJo3yCQiGGXohzjP+l5pYpY/iBH7/AL/vx6e/Ua8pib51GoRT0+j/ALMP6Q9NvN01iIBFAAU59T+IYOjIjl3CxYoWwHbavnYPxbpuokY45G4jdKxVBGP8X6bJIRjI+Y1EkUD9LAemySbFcOObqceCByZJbYhyy9fhxYhnnKoHjTm/Y0Hai3h6b8Sw9TM44E7hrUhReyQEhR1DAElC8cOefKMUDknKoxFkoG2zx+9HlHGr5WH8Xw5ZxgROJn8BnHSTef8AF8WGcobZzMPjMBYDQemA1o+bn/FcWLHHLrIZPgERqUdN+J4+o3AAwlD4ozFEDxQPTsK+LH8ew2CYTGMnaMpj5X2Im0QpbQgoFWtviT/GwJSjjw5JiJMSYjTR26n8UGEwxxhKeWYsQjyB7UD1LDPqDdto8X7HzMX4vinhnmmDD09JxlyCxg/FjPJCGXHLGMnwSlwUU9jcEvh5fxjJiBlPpsgjHmRIAfR6Lqj1WGOYRMd3EZIh1o21qNF3C67pQGz3oo07x+hKUAWPArfgEqgAkostKgTZWylDABK0qKFCqiArW0FpktB4HWZeh6k5Z7Bky44m90SOD4vB+GdLiz4t/pRkTlo3KtsaHHuenqPxHJi3TE7hGZo7dZEfY93+Jg9Lgn1GOQgDvAlKEjtAvuDep9jQYY/UIkAAMMZzB1129xXPtTD8Qx5sgwencTIQiToY9mpfh+bAZS9PHe4mGWWSiPDT2PH6E8U/UlISzxPqEWKI94732QPRjg6WZlh2ROUAmJ1F9tb7uHVThHFHHmiKE43R3VpqavnlJ6nH1HUQMxKJlEAEg6T+f1uHVY8hyz9A7DtMJXpv91+KAMEzIT9DNOIjIzmAK/l/xe/2PX14nlydNct/Ty9IVI/Eb5MfaHzsdx2+nAwmaxzgQdko/wCKR4vu3jGTqcogdsDjlpl3VsiPsxJ007IHZ0/TYj6gGLHIjPKJE6G2Hs9zxz6mWE5cGLGJRGSUoSF+U8Aj3dln0sernIxB3QJ3kDSURzK/4j4PT0ZliEsXRTnuMSTHMNkR/i96BfSRn1NSlllGW3zZZeWYP8AvmHf3u0MmyUo4TLLmFiWWYrbDvtPfXUeLxnpPWnDN1MpzhGoSJH2r/wCh7X1sOfHlznDilOIjAxEQPL/UP0QODoyIQzZoxGQ+pslLJpI4yPN7z7Fzy6Lq8uIEzjtAjHH6Zqr4PgHbD+HjF6s+oyGUdxI1B83aX9Y7B06cR6uUMnqZITxR2S3ijON337eKKceWYx5pDHjjk9OyJZwY7dp+CHiB9nunocWPqo5MmTHA5JZLIyaeU8130dM3Uzy5ZdPCsmu+Ms527T/g/RvHgGKccmeEZm9kjA7zuPeQ/VAzjkx9JkyHp4b8m4iNA1GPv8H3sJkfi0Pd4cub9kEtNuMDygXrLs9fSCXpx33urW+XLB1BsMBoIBVKoDF0DEW0AqqtIKUKgFVVAVVUAFzPLoXOXKKKoSwALJSWSgZn4g7BxPxAOo0DCljVLIKbRASuxXHdpUIBtBG4V4qm0ARiBoGvYgJs/JoABSVLnjMzZyACidu0/Z7fNA0UhjJkGOJnLgCzWrdoCPBUGILSIAJVCA0lASgTKNirpRR4aVAFeCkHxSrQAEjmim1VAd0fFI14ooZ2g8hA02nwQxsRtl2JQNEMCU+6dSgUpruUV4ppASR7Vv2FNIQBfsW/YlUBtVRSAVIQY2tEcFAVtb8Vq+CgNpQizdVpXKBSoUSvVAb1pKpQAlCUAUlVQFC2qAqqoCqqgKsxkZE2CKNa9/a0gKqqA0hpCAAlKEBVVQChVQFVSgBVUhAVVDAFVQgLLSCigZLSCgc2ft73SLGYce9uKBYaZi2gBY8qseUDVVVpAqqoCqqgKqqAoShAiTLUmWFAgtMlAzk8MI5v2oEf2dpv+q3ulw8mLNWY4hGRsbjP7I9nvQPQHCrHhSSBpqUAhKAlA5usF4y8eOtxPgP37/v9XqEXyz6cRwA0Hy/UdXmycGgT8IT0UsxyVLIdNTry/S/s+PnaPoUYIR4iB8lgJPmM/WZ8MzGwYg6W1i64ZMgEgAe79HLpccjZjE/JA6TEDYhH6EQ8CGHbKzQNW+Z1+AgidUSLL9qcMDyAg9PjlzEH5NB+fxhIajRq5E+Y6nxfu/2PAOMcP+QPyT+y4rrZH/khA+DCdtl+7/ZMX8Ef+SFHSYR9iH/ICB8IMYl3o/cvoyiLPD93+y4v4I/8kI/ZMI4gB8kD4MY/UlQun2unxGUQRyH6QdNjqtor3Br0ojsPoCB86MYjKj3d4x26R0L7npR8F9IKQeQJjH8RA9rIyQkbgbPg+x6EOdo+gKMERwB9CB5np18knaLrXv8Avq+n6MfBfTj4MKOGUTAdtHLq8scGKWU67RervQDydd037ZjOIS26i9PBEOH8O6KI6eWTqPizebITpp4PL+KQyYxjO0Dpsc4bdnL7uXp45cRwyHlI2vmR/BpkRxZc0p4YG4w2gceJaDzfxLrIdXknCUtuPEDtieZzfRwy6bL02LNkI24gNfCX6voZ+khmxyx0AZCt20PJ1P4R6+LHiEzEYx2A8x8UDHot3W9T+2bdmKIMY2PNL2+590Pm9L0ObDMSnnnOIHwHj630QwBfN/Gpxj0mTdZBAGni+i4dV00OpxyxZNYyQPns0epxnpp9UYyxxlEDbyCeL/yez8JOnUbv+8lu91OuL8GEZxllyzyRgbhCXAT1H4NHLOU4ZJ4/U/uRjxJoOP8ADPTn0+O9vrXk9Hd7+zy5DlxZOpjnqWWeLcJR4oex9rN+EYsmOGONwOL+3KPIT034VDCZTnKWWcxtlPJqa8EDxSOowdHjzmcZYxt/kmI21+b9VjNgHxAL5MPwHFGQBnOWOJ3RxE+UF9cCkCmJmhfg0ghgPl4dHLH00+ow9SdDKY2fA69Hllm62OSfxTwRI/V7JfgGAk+aYgTuOPd5Xfq/wrF1O0m4SgKjKBogeDQeD1+surlH4RPFu/V9H8VIP7OByckTH3U92H8LwYsMsAFxn8dnWTHTfg+Dp5jIDOUoio75Xt9yByfiA/a+qxdFfk/uZPcOH3YAAUNA80OixxznqRe+Udvsp6gwBVFqECksraBVskkcKtoBVCoBZrW0qgKqrAFBVLQBiTZYkgfLegZDN0uSA3XLLjO4cljPPNhh+zyAyzxw9WOQyrZ/T/FTzdbgx5JHN/bgcsscq81d93+Tpg6nP1MfQhAZJQO7Hkkdpj2GnB9zQd/U9J+2Y8eTJkvbGMvSltqUvf2t82GDB0k5HqfJkkN2OMBuEfAgu2TocHTxP7XES3j+6NZDIeRQ8PFj0B0+I9TnkZTEduDTgcxl7ED0+tMYQw9QMfrZfLGMpWD73Kpjqf8AwsmUIw9au0Zez3PKes68nFMEUdkdomPMf8Xhb6efFk6gWMtHb5sESNpPgTz7EU8ufW9T1eDIIy/l7j5jIA7fDa1CGPFCEZRjKJEZnGOP6ufi9j5uLFE9TsyQAG7aYjUDXXXwfbxfsMsox9PjjvEqN6ceBvVEOKeb9nzbMeaUMUxvGyFmz2p6upx5zjPUGpS2HF5jW6H8X9XscOvyHDn/AJVwyyO07SNhsnUm+fZ2enGJ9bYBEvThtAMhplH2h+fCKYgZMPTQxzmTCUQaOh/oPhH2oieox9VGoQx/y9gIl5RH2E9/ALlxy63JjxSx7pQEfVnLQmj5h4ENfiHX4xIdLHCJ44nb5wQAfYiF9F00Y9TPFnyepZ9WI0INfaJHEmOojXU7uqzSG81jEQJCWM9iewTDo5dOTmw44SG2W+InoL5HOuizn0nVdPAyx7TjoVUuOa93iUA9f0//AIVH08YlCGLTwiAeY+0dg5yxz6UeuM8xhyeaU9o3bj/hfRH4hDDGIhADFpHvp8nGWcZhMZce/HvqO4nSXYe77mFNjkx9TDFjE5EnbLdt+KvHwfThyXl6fEMUIiAEBVmMdRZ9r042blNg0gJRAqqoBi2xFtoCqqiBQlUBVCUAKlUAFzPLoXOXKAFVWFEsFoslAyl8Qdhq4n4g7RLClJQlEBdJRylAUVSVQANNGmVErNIFqgJaB17KgE3VduWkBW1VEG0slIQChVBvhoFVVASa41ShUAqgG0oCqg2toDSpVAlUqgBKqgFCqgKqqAqgG0oCqFQFaSqANR7VBBSgi0BpB0TqOFvxCAEroVQFUKgFUKgFCoN9kAqqoDaUKgFVVAVVUBShUAoVUBtC0lAVQlAVQNUoA28+1KqgKoBB41SwCqq0AWlpbYUksQEgPOQTZ4FadnRFIHNmHDceGc4497QQNA05gW2EBWPxKmHKBoqq0gVVUBVVQAlCoBQqoETZakywosyaZkgZy4eTFAHNv3mwCBDt73slw+dGh1cbjZMZVPw40+aKerFKIppECEEpCoEVLcK47tpQgNskjl878ZyzxdMZYyYndDUe9HX5ZQOHaSLywBruKOjQejuXc/IdH1mefVGMskiP5ml+w05dH1mcxzXkkSMUiLPBsIH2lp3B+XzdVmAzVOWkMBGvF8/S+n+JZpwhiMSReXGDRqwUD1Ny2/IdN1WY9fsOSRjvn5TI13c/w7q80smQSnI1jyEXLuEQ+03Lufiei6zPLFnJySJGMEXLjzPp/wDlvdRkyjJ6kjKjGtxtA+jtbfmh1GT1AN0v+KMefs1x7nPp+oyfybnI2OovXwukD6gldz4uPLM/hm/cd3p3uvW3w+m6nNLBmJyTJHp15j/EgfbWtvx2XPkH4iI7pV6kdNxpnq8+UYIkSkP5uUfF7UD7Tcu58PpMkz+GGRJMvTnrevd86eWfpz80r/ZsR5PNjVA+s3Jt+Gw5sh6TN5jYlj7vX+GZZnHjuRP/AIQO/wDgQPrTJizfOng+N+JTkOohRP8Aazd/Y+F0mSZxZ7kT/L8T/EEU+5BQZPy3UzN5vf072/8Alwa9PH+sfUge3uCdwfh8pP7Ji1PxZO/tevFImMR/6az7+1EPrd4UTBfhui/sdR/RD/pPr/8Altm45P6o/UgfReoPEI9SPiPpfmIS88Cf/SnL/wBFywS0w/8Ai8/6op9ZGcTwQVOWI0JAPvfk/wDy3D/Pn/R+rj+LAH8QPF7sf6Ih9l60eLHNcjnw97Iz4ydolG/DcH5kj/wg/wDs3H6nh6P/AI4+/J9RQPthliRuBG3x7MDqsWp3xoc6jR8fox/6i6/8pz/V+f6UA4Oo4+CH/SQPuT1OMfajoa5HJajmjO9pBo0aL8rlPnyf+zGD6n0/wvSHUf8AjciB6ceswyJEZxNCzR7MjrsEgSMkSByd3D8Z+HV6mX/xWRjpQP2fqP6Yf9JA+5PVYgSDOIogHzDk8Lm6nHgAOWQiDxuNPzOcjdl/8dgev/y4xeLHf8R+pFPXl1/TxAkckaPBvlo9dhAvfGq38/Z8fc/F9SP/AAbAPZP63smKxS8f2WP1oh9XDqYTkYxkDIAEgHseGJ9dhhZlOIETtOvB8Hyvw4/+FZf6MX1PmfiPwdR/7MD/AKKB9KfxLpxETOSO02Ab8HTH1mLIQITBMhujXceL8Tl/4PD/AF5H1vws/wA3p/8AxEv+kgfQZOtxYzITmAYgSlZ4Bch+KdKYnIMsdoNE33L4v4mf5vUX/wB1j+t8nH/wWX/xkPqQPs8f4hgybTCYIkTGNXqR2esF+N/DB5em/wDHz/6L9gONECgNbShLAK0qk0gFVVoInDcCCTr4Ik3yyeQgeH0+OEM2XoZVKE7ymX9f2XDNnzSyx6f9niTjqcP5laDQH/J5NuDDhydVOxnGSYxHXkHw4+lz/bMmeY35PVjADJu27fTl419qvBoOfqul6oeWYAGTISIiUT5pPryx5cHTepkwRM4x9OQMucYHLHQfh3T58Us4nvy7pEZaMal7mvxHrv2YjHKXrCUBGeOqB9tjx8EDHpfww45jqYxEomHqQjI0BPkD3DxchnyYBeKAM8hOPeZaxlLXTmwD9rhc+XqcfTShl8kJDyV5jtrSHsHtc+o6i8WPJjBhAxGHJl5NVqNp+tFNdkBETgf5mT/wXN/VL4pX3P3JnLoenlsESNg2+qIndv8Apr2sTw4+nhh6XDkJnkyRyxlsqgeCs4xyRMJcHL6Rif4z/vP8uEQrAI9Rjll2ieKMvPCRr35Ob3Hwa6Uxw783Q44zjqTKdwkB/CB3Htc+l/Dx0+bJCeSjEHdER3bsft10vw5d8PWYcBl1EBvjEbMZogx8IV4f4kCv+s4Z545HLkxE7RKAh5Sb8T4tdfmgcM995o+rt80fg0+zXNOXWYZ9T04yZcxqZBjjEbqR4F/qjH1WYGPTYxcYYjHKOwPcg/aofSgD8NP7HvkJkxMZZMcK0kBwSex9jllznqMcuoMjZBG77USf93Ed4n+JnpsAgDiP83Gf5gxny3AfbJ5BH8LY2/ifUwx47xY8QPpy17ajlA6R02/FhnKo7cYnuMvNY1214Fo58soE55VCZuIB1/pI8PvXrs2PDsyZIDNkhUROXxE+NDsjpMY163qq1NxhHXb7+4PsLCnTg62M8kccRQEddCKPYAPqYnz4ZsMswOM6yjurbpZ/xdj7H0MftYDcNMBtAVW1QDF0cocurQKqlEAEqqAqqoCqqgAucuXQucuUAKqWFAzJpkoGR+IOsdedHGR1D0BgFVPgqAhKFCAKN+xJNcqDa+9ASEHRpSgTCVugcROJmYX5gLr2OoaApQqIKUMmUYUDpZoe9oKOiUKwBQIiIoaAKloGkCNJVAVVKAqqoCqqgKoSgKoSgC1Rt1u0oCqqgKpQgKqqAqqoCoVUBShUAqhUBIRSVQBZUEFK0gOiqg32QCqqgK0lUAUhpUCVapFICtrS0gC0rS0gBIUJQAlCUBVFqgFB8FVAQqqgAREeNEpQgJVVYAFBShFAqUIGGft72gzn7NDhAqLbEW0BWHKEw5QNEqrSCqqgKqqAFVUBVVQIky1JlhRZKSgoGcuHhhhJ6qOWwKjKO3uXvk80ATlBHAu9UU7Q0yE0iBCqNFpAF2taNKgeT+OC+lIH8UPrY/E9Bgv/AL2H1Nfjv/CS/qh/0kfieno+zLBpD5zof+Ml/wCZfqLn0I8mf/xUvrdeh/42V/8AlX6i49BrDN/4qTQd3UajNf8AB07634rpjw/+NxvldRRjm/8AF4P0fV/Fa9PFWo9XGgeD0/8A6sT/AFz/AFc/wzXNP/xeX6nXp7/6xIHHqT/Vy/Cv70/6Mv1FAjoP7We/+6H1vr/+W0NMnvi+R0H9nP8A+K/UPr/+W1xl98P1QMzpk/8Aeo/9Fjp9fR/96P1dP95/71/ox0v+49/UoHdi/wDVUP8AxT4PSf8AD5v/ADF/0n3sX/qpH/ij+r4PS6dPnP8A4v8A6SBvlN/iX/mSLHV/2AD/AN9lb6j/ANWf/mSH6M9b/ZH/AI7Kge30X/qs/wDMc3yp2ITrv0uP631ej1/DP9E/1fLkP5cv/ZWH1oHJg/4PP/Vjev8ADP7eOv8A0oj/ANF5cA/8Dz/1Yvrer8L/ALeP/wBmI/8ARQPU/EdepgP/AClmfn+jN4s//i/1foPxD/isX/i831Pz/RD+Vn/8V+oQO7qjrm9/Tvf/AOXCP/B4/wBY+p4OqGmavDpv0fQ/8uP+xH+v9CgeFm/4TD/Vke7DqIH/ANNp/W8WYf8AgmH+rJ+j2Yvhh/7LZP8ApFA4uj0wZ/6I/W+x/wCWz8OX+qL5HSD+Rn/oj/0n1v8Ay3NI5ffD9UDCA80P/ZnJ9Tn0xoYa/wC76h1gPPEf+nU/qc+m+HB/R1P6oA/8tvXNL+j9XL8W068++Dr/AOW3/el/R+ocvxcf+HE+2CB1SNZyP/TqP3xeLpP+PP8AVk/V7co/8Ikf/TuH/RePox/4f/qyfqgez0Rv8L/0Tfn+k/sZ/wCiP/SfoOi/9VQ/8XP9XwekH8jP/RH/AKQQO7L8WX/x2D6n1Pwz4M//AI3I+XlNSy/+P6f/AKL6n4WPL1H/AI7IgfPfh2k8h/8AKeRnpR/Izn/DD/pNfh2ssmn+6yfUz0h/kZ/6Y/8ASCB39Tocp/8AKuD6ns/8uU1jh/WfqeXqBZzD/wAq9P8AU9f/AJcv9qH9Z+ooHj9TAT6bBZo1OvpevJGsUtLP7MPuLx9Tf7N0+n/efWHsnI+iQeP2Yf8ASQPR/DB/4Tlv+DF9T5f4h8HUf+Pj/wBF9X8O/wCJy1/Bh/6L5X4j8Gf/ANmB/wBFA5M3/B4f68j6v4Z/e6f/AMRP63ysovo8X9eT9H1vwr+70/8A4if/AEkAfin93qP/ABUP+k+Vj/4LL/4zG+t+Jj+Z1P8A4qH/AEnycenRZf8AxmP9UDu/DBp03/j5/wDRfr4h+P8Awz4em/8AHT/6L9hEsYKShUBVVsMArarSAESLRZKB446rL1WMjFARPqSxmX8NfaeDP0/V9XMQz4/5fwCW4eU/x6fU6xzmcMmLD08pYzOYkRkA17uJxxAx9Pl6eUMcsmh9X7R9zoGIxnLLL0nRzIhHHrED4p8HnxYh6nQnGeowiOEED4rqfeX+T0x6jp8GTcMwE4y2y8h/tx+z7/a4dXPFgBx5InNDJL9oibMa3IAMT1WczGc+lkHpCe3uT8Fe7u44M+SeWXR5OolCGuIeXdetV7E/h0RHfklH+XkEscI3zI1Qv3d3p6TPm60T6Ld6dXrpLy8bP/OrtA4fTzxzRmfOMeQYYWQNY8D3PpYMMeqjLLHBGOYZTCREj5f8WvJB7Pn5ekhgAzQOz0sowyNXZjrv/wAns/acWLHGBx78k8kckfNW8n7fss/ZQJyY49BmMDmMckhvOfbZOvw7ePbb1dPjjMjqOjlvkf5WSVVqeZ6+Hg82DpY9R6mTJi3ZDmMZR9Stse/vpPSY88cufBgjeAynA6jy3pu8dAgPRxlOOfpI5CM2+Urr4wNPvc/w3q+sx5x01b9g2mFjy+35PZjhj/aMePFm25MUPTlcPiETrqWs5MOrraMspxNESEduMmiPb7+UCeo6bLgy5erw49shuiPN8QI+P2V4U7Rz5Dhhlnk3gRAywPFHmXvA7PN1f7N+HVDELB83pWTctaO7X6HHPl6Tr8mLJmlKEvLE4/TNWTxu09yKWetxZ7yYsEZZMZuG6x/LjxL3+x6ej6jD1Ez6c9spxvJiry7u5s93mmceXroRxQEo44iHnO0DbLmP8VdvFOHp8WXJllOEZSGeQ80ttR8fagCNAVEChl9IQGvm/wC894+h+gx++/a+L+HY8WLNPMDXnlhA7a6jV9vGxg1FtsBtgCqoQGHLs4xOrqgFKEtIKqqAqqoAVUoAc5cujnLlAUKrCiyeGmTwgYzNEO8XCfIdokoFEA8pXVaYAaJ0ZMAdCNC0NNEACQOoTYSqALVLMSSNRRaB7tIIUIFA3wlkJIsICqhLSAVRaUAKEqgKqqA0qqEAqhUBpUoQFVVAVVKAoZlfZoICqqgFUKgN6qqoCqqgKqqAqqoCqqgKkXqqoAN9kqqAqqoCqqgFFqqAVtCoDaWUoBVCoBVCoBVCoBQqoGcoSMxISIABuNaH/Y6KqAqqoDSrr8lBQCqFQFVUi0AKlDCgZLSEDnz8D3tjhnPwPe1HhAqAptmKUArDlDUOUDRVVpBVVQFVVACVVAUJQgRJlqTLCgQQm0FAg8PPCJOTcDQHI8Xolw88ATMHsEyo7ItMjhpEENUgJQAqVQPI/Hh/4JP3w/6QR+Jj+z/47H+r3db0g6vEcJNA1r7jbHVdLHNs3Gts4zHtI7NIfI9EP/DT78v1ScegFRzD/wApS/R+mw/gMMOb1hOR+LSh9oEfqxh/8t6GET2zJ3xMNQO7QeV1PwZj/wCUun+t9f8AF69PH/43H9bpk/BoTjOJlLzxhA6D7H5vX1XRDqYxgSRtlGen+FA+Swf+rP8A8yT/AFc/wrTPL/xeX6n6TH+BY4dR+0icr3GW2hWrPT/+W/i6eZnGciTGUaNfaQPmugH8vOP/ACl+ofW/8tof3h/R+r3YP/LexYYziJyO+Ow3Xver8O/CYdBu2SMt1XursgeN/vSP/TsfU59LzgPt6n6i+6fwnGZbtx/u+t8/BnH+D48eypS8hyEf+ZOUDiwD/wBRI/8AFH9XwOn06bqPdj/6T9nj/D4Q6b9lBJjt2X3eLH/5b+GEJ4xKZGTbfH2TfggeD1Ov4lr/AN5D9GOsH8gf+Oy/o/SZPwPDk6j9pMpbtwlXbRcv4Fhyw2EyA3Snoe8kDm6DX8M/0ZP/ACT5Z/ty/wDZWH1h+pw9DDDg/Z43sox9urzn8Gw0RctcYw8/ZH6oHyfTC+k6j34vrL2fhf8Aah/7MR/6L7mP8B6fHjniBltybd2v8Lph/BsGGIjDdQmMnPcaIHJ+I/8AE4v/ABeb/ovz3Rf2s4/8pfqH7TN0WPNMZJXcRKIo9pcvJi/AemxCQju88dsrl2QPF6m6z12HTPf/AOXCP/B4/wBf6F9CX4VhnusHz7L1/g4der6HH1cPTy3QN6GkD4/Lr0mL+rJ+j2YhYhf/AKS5Prfcl+C9NKEcRB2xJI83i6R/C8EAAAfLA4xr9koHyHSC8Gf+iP8A0n2P/Laj5cvvj9T6WP8ABemxxlGMTUwIy8x7avT0n4fi6QEYQRuq7N8IHz8b9SP/ALNT+py6Ybo4P6Op/V+k/wCrcAO4RNiZyc/aLMPwvBAREY/CJiOp+38SB85/5bv9+X9H6uX4wP8Aw4++H6P1HS/hfT9JIzwxqRFXukdPmVzfhfT55+rkhc9NbPZA8HIP58r/APSqP/ReLo/+P/1ZPqk/WH8OwSluMdTP1OfteLMPwrpoZPVjAb7Juz3QPP6CP/qM/wBGT9XwOl0w9R/4uP8A0g/bQ6bHjx+jGNQoive4x/CeliJRjjAEhUvaED57NHz5a/7/AKf6n1PwrjP/AONyPoHoMEiSYDWUZn3x4Lrj6fHivZEDcd0vaSyQfEfh1b8g/wDKWVnpP+H6kj+CH/SfsofhnTQJMccQSCDzweVj+F9LAGMcUQJaSFc02QfP9V8WY/8AlXp/qer/AMuPTDD+v9H2j0OCVkwjqRI6cmPH0NZ+lx5wBliJAai2A+K6g/8AguA3X9z/AKT25xUJ/wDstH/pP0Z/DenlEQOOJjG6FcW1+xYSK2RqtnH2fBsg8v8ADteqzf0Yf+i+V+Ijy9Rf/pR/5F+uhghAmUYgEgAn3MS6PDO90Incdx05PiwHxWb/AITD/Xk/R9b8KH83p/8AxEv+k+8ehwSAiccSBwKbh0uKBBjEAgbRQ4HgpB87+Jj+b1B/8pY/rfKx0Oiy3/3kPqfuJdNjmSZRiSRRscsfsWERMdkdp1I2tkHy34ZRj0//AI6f1P2A0DjHpMMaAhEAHcNOC9HDAKqtsKNJQqAULuVAWSkkDlJCB8fm6bL1HTkYYmRGbISAW8HTZenx4I5YmMvXuvk+vP8AAemnIyO6ybPnKcX4F02KcckRK4mxci6Ic/R9MMPT5o9SKgZ5Cb/hXJkjn/8AA8AGyWMVM+B4fVwdJDAJRhxImR3G9S8g/BumjlGYCW4Hd8WjAceXBDN08en6oemRL08Z8ZDQS0+ovB+Gz6TGP2XqJXOGa4Cpc9jpp9Jfdyfg/T5IHHIExMvUPmPxFvN+F4M+KOGcTsjxR/VoPM6v8IlPDkjGY3SyHMBXs4ePpfwzqJThD0zhxx2zmSd26cfqfby/gvTZhETEvKNo854d4dBjxzjON3COwa9kD5rP0mOeXNIYzlG6RlkiTEY/l3rl6cPRx6KEOs6Yer/LqQ43f4tfqfdPR4/V9evPW3Tivc4x/CsEZyyAG5gxl5tKPsQPnzjh+KZBP1d063DFtrTnbu/V58HTxGeV47AsmG74I99e9P1B/COnO24nyx2DWtHTF0OLHMTjEiUY7Ab7IHi4+hGWPq4j6XTxkMoFb9+37XNjwpjq+qx/ieaOIZD+zxicmQGJ5ifbrw+4fwzpzdx5mMp1PxD9+Ger/DOn6uQlmjZAoUaYD5wRn1uT1enwiWPHH08XmqiOJOWHpR1vUmGQCGSIPqHndPxfq8XQYcUhOEalGOwa9mD+HYBfl5l6h/qbIPHPSfsgjjkfIZxnv/xD7NPuY9HH/q3BGcsgj5pXu1Pd1xQEBsHA0clNg2xHVtAaVKoDEa26MR5baApQqIFUJQFUJQFVQgJcpcurlIaooqq0wCyS0wUDKfIdolwych3igWEsNUgPdGttMoBtINspCBSFVAQgEHhKhAALVoSgIKqqAIknlooUFAKszltiZamhegspibDSBQlKBMYiIoJVUBVVtAVVUAa37EqqAVQqAqqoCVVARQqtqiA1v2KUoQCqFQFKoQCyDZI8EqgNKqoCqqgFCqgKqqAVQqAVVUBVUIBVCUBVCoBVUAoBVVQFVVAVVUBShUBVVQHlQgHslAVVWAVQqKSSBylUIGOfsmLGZuPCBYaZCUBTDlUwQNFQlpAEnslCUBVVQFVVAUKqBMmGpMHRhRKlFKgRJyxDzF1k4Y5VLVjKjrDTgZyJAj4jdfh7Pa620hQTbALVoFIRa2gFaRabQEqu5ncgFKLUFAK0i02gKWbTaAULaLQCqLTaApRuXcgNLSLRaBSo3BbQDSWbTaArSLW0AoBB4UyRuQDSaZtbQKRS7kGSBVIpm02gFaRuC7kA0mmbTuQDSo3I3IBWkblMqQCrO5NoBpNI3LaAdFZtNoFKza7ggFUbltANKi13ICqLTaAVZ3IBoeKBfKoBW0AkA8qjctoQFLNruQCtM7lsoFs0VtdyBSCi1tAAjWtt0za7ggUhdyLQCrJKgoQFBRbJLCjK3KB1PvdLc4cn3oGwaZDTSCqqgGPLbnHl1QFVVpBVUoASqoCqoQFxmfNTs5y5RQKlWADmXQsFAxyHh2BcMrvE2ilJtlQUQtWbPZJNIDSUWpNIBXhkSF13atAN2pR7kWgEFLNqTppygV7lQCyZeHZAu0Wi0GzwgaWrEdGrQKW2bW0Cks2toFIpG4cKDSASi1tBKAVtkaBbQgpbRaLQgq1tFotCAiWqWbXchBSs2u5CClZ3LaEFKzuXchBSs7ltCApZtdyEFKwT4crZ7oQXaNe7O5bQgtWbW0IKVncu5CClRaLQgpWdy7kIKVm02pEBVncu5SIKVm13KRBSs7wjeFJYLVjcu8DuFIg0Vz9QeI+lfUj4hSIZorl6sfEfSn1Y+I+lSOLLPgoc/Wh/EPpC+tHxH0qUOLNEuJzwH2h9K/tGP+KP/KCkcX0NkOPr4/4o/wDKCP2jH/EPpZKLxfQ3Vw/aMf8AEPpR+1Yv44/8oKUOL6HQiWopx/acX8cf+UEHqsQ+3H6VKHB9Dbhbec9Xi/jj9K/tWKvjj9IUovC3QOZocPPPPDIQIyBPsL0RSMtRqWEoCQ0gtY2WoIFqqtIEKqoCqqgKqhAVVUCZMNycywolFJVAzL5ufNlx5Kxj7rfTk5Q0kxm6OHMSeb+09X4H/kL+09V4H/kPsjVqnHF9Tp7lf9CPF/aer7D/AJqD1XV+B/5L7VJpcX/qHuL/AEI8UdR1ngf+R/kv7R1p7H/kPtUilxf+ovur/Qjxf2nrPA/8lI6jrfA/8h9qikBcX/qHur/Qjw/2jrPb/wAgfkn9o62+/wDyX3KWlxf+onur/Qjw/wBo609j/wAlfX6zwl/yP8n3KTS4v/UPdX+hHh+t1nhL/kqc/We3/kvuUtLi/wDUPdX+hHhDqOs9v/JU5+s9v/IH5PuUtLi/9Q91f6EeH6/W+3/kp9frPA/8l9ulpcX/AKh7q/0I8P1+sPAl/wAn/JIy9b4S/wCS+3S0uL/1F91f6EeGc3W/4v8Akr63W+Ev+S+7SKXF/wCoe6v9CPE9XrT/ABf8gfkzLJ1tg3L5Afk+7S0uL/1E91f6EeIMvWf4voQc3Wf4v+T/AJPuUtLi/wDUPdX+hHh+p1nhL/k/5J9TrfCWnsfb2rS4v/UX3V/oR4Zydaf4voXf1v8Ai/5L7lKYri/9Q91f6EeHu63nzfQPyXf1v+J9ulpcX/qJ7q/0I8Td1p/iU/tn+P6H26Wm8X1Hur/Sjw663nzpH7b/AIn26URDOL/1D3v91Hh11v8AjUR63/E+5S0uL/1D3v8AdR4e3rrq5Lt63xn9L7lLTeL/ANQ97/dR4mzrf8S+n1vHmfbpVxfVj3v91HiDF1v+L6UjD1p0uX/KH5vtUmlxf+pj3v8AdR4gwdZ33f8AKX0es7GQ/wBT7VLS4vqx73+6jxRh6yuZf8tfQ6zxl/yn2k0uL6se8/8ASjxPQ63iz9Knp+s8Zf8AKfbpaXF/6mPef+lHieh1lcy/5f8Amv7N1vif+U+2ilxf+pj3n/pR4n7P1o7y/wCUn0OtP2pf8v8AzfbpFLi/9THvP/SjxP2brObl/wAtP7P1lVZ+l9ulpcX/AKmPef8ApR4n7N1nif8AlL+zdZ4n/lPtLTOL/wBTHvP/AEo8X9l6sjk/8pH7L1fib/qfbpabxf8AqY959EeJ+z9YdLl/y1/ZOrPMpf8AL/zfcpHLOL/1Me8+iPE/ZerHBP8Ayl/Zes8T/wAp9kivNzTQXF/6mPefRHifsnV+J/5a/snWeJ/5b7apUf8AqY959EeIej6vxP8AykDpOrHc/wDKfcVcX/qY959EeGel6urJl/y/81HS9X4n/lPuI0XF/wCpl959EeIek6sijKQ/1L+y9X4y/wCX/m+5S0uL/wBTJ7z/ANKPC/ZetJAs7e/naPR9V4n/AJT7dL3pcX/qY959EeH+ydX4n/lp/ZOr8Zf8v/N9ylTo/wDUy+++iPCPR9Vff/lL+y9XVWf+U+4ik6v/AFMe8+iPD/ZerPeX/L/zSOl6vxP/ACn26ZjZ5Farjb/Ux7z6I8X9m6vxl/ylPT9Z2Mv+W+5SKXG3+oe8/wDSjxDg6ruZf8p9HACIgHnu7zIDnB0k1q5MXvyWkGobYHDTo5BVVQDHltiLaAVVWkFKFQCqFQChVQFzly6OcuWFAlVQAWJB0YKBzdR8NvMPxHZoY6j2vXljeh4Z9CH8MfoYzpV1XxKTkn+K7eIX8/8AJg/jA52fe+gOmwy+xH6Gh02P+CP0MjtOnPL/ANB53/XB7Q+9n/riXeA/5X+T6n7Nj/hj9CR0+P8Ahj9AUdo55f8Ao+p5f/XB/gH0r/1zL+AfS+r+z4z9kfQv7Pj/AIR9CjtHPL/0fU8n/riX8A+lf+uJn7A+l9f0Yfwj6Ag4Ifwj/khR2j3Mv/R9TyP+uJjmI+lA/GpHiMfpL7GyI7BgYhztGvsUdo9yn+j6nlD8YyfwD71/63yniI+99bbEdh9ydsfAfQo7R7lP9B5A/GMv8MfvX/rjIfsx+99kRHZraFHaPcp/oPE/62zfwj71/wCts38I+gvt7QEVajtL7tP/ABtHij8Vz/wx+g/mn/rTP/CPoL7W0LoTXdQPdp/42jxf+s+o7RH/ACV/6y6n+Ef8kvuCK1Sgnu1/8bR4Y/EOqPEf+a1+39X/AA/8wvtoIXEe7X/QjxP23qzxH/mI/bet/h/5j7m1qlxHvV/0VPC/a+sPA/5qf2nrf4T/AMh9ul2riPeX+ip4n7V1ngf+R/kgdR1x7H/kvqdT1WLpQJZTtBNB5v8Arbp/GX/Ik3iPdX+ipxnqOu8D/wAlPq9cex/5Ier/AK36fxl/yJfkv/W3T/4v/NcvyXHvHvL/AEVOX1uuHY/8kIGTruakL9geyH4t08pRhcgZGo3CQv6Q+gAuI95f6Knib+v8JfQF39f4S/5L7m1SGcUPe/3K+R4W7r/CX0BO/rvCX3PsxxgEyHMudW6XFE97/dr5Hg/+Hn+L7k11/wDi+59zamlxRfe/3a+R4Vdf/iXb1/jL6Q+7S03ih7/+7XyPBMevPO77l9Lrv8X0vvUtBcUPff8Apr5Hg+l1/wDi+kI2dd/i/wCV/m+8Q8XV/iGDpCBllRPA5ZxQ99/6annel1x7y/5SDg63nzf8p2P490f8Z/5KP/Xg6P8AiP8AySoQ95/6amX7P1vjL/lf5qcPWiySaH+P/N0/9eDpP4pf8kr/AOvB0n8Uv+SVxQ9+3RGYwdZIWDLX/Ev7L1p7n/lN/wDrw9J4y/5K/wDrw9IO8v8AkthD37dKkDo+s8T/AMv/ADa/ZOs/iP8Ay3u6H8Rxdbu9M3tPFUXvpcUPft0R4P7F1Z8f+Ukfh/VeP/OfepaXFD/lFuw8E9B1Xc/89A/D+rErvTw3P0FLS4onv27DwP8Aq/qvH/nIH4d1PiP+U+/S0uKL/wAot2Hgn8M6j+L/AJxQfwrqD3H/ACn6ClUIf8ov2HgD8KzgVuH0r/1X1HFj/lF99aXFE/5RfsPBH4Vn/iH0o/6ozfxR+kvvOHUdRDAN0+FCH/KLnkf9UZfGLX/VOXtKP3vp9P1ePqBeM29HPChD37nif9T5f4gn/qfIeZR+99xabCH/ACi/U8P/AKnmeZR+/wDJP/U0/wCMfQX3KWlCHv36nhf9TT/iH0J/6lP8Q+h9ukqEPfzOp4Y/ByDW4e3RP/Ux/j/5r7VIERHhQie/fqeN/wBSn+Mf8n/NP/Uv+P8A5r7K0yEPfzOp43/Utfb/AOan/qYfx/c+wqhD379Txz+DD+M/Qo/Bh/H9z66qEPev1PI/6mj/ABn/AJKP+p4j7Z/5P+b66CoHvX/1HlY+ij00t26+3D6Ics3IdQkc7WdnL1LCg9lta7tMhaxsa928aBaVVpBVVQFVVAVQlACqqBMmG5cMMKAs3bRDIN8dkCS5QPmdi80jtlbGVHWC04wmC62gFLNpaQKUJQFKFQCq2qApZJcJ9ZhgaMxakqTeh0K4DqcZjvEht8bY/bsH8cfpZJeFuh1It5v23D/GEDrMQ+2PpUocLdGdSvEPxPBdbvuLrPq8WM1KQBUovCy2Z02ryHrsH8YR+34P4wpHC3RnWl5P27APtx+lR1+D+Mff+SkcLdGdasY8kckRKJsHgttMASqoCqqgKq5Zs8MMd2SQiPEmkC1eL/rLpv8AvI/8pT+JdN3yR+lA7bV4f+s+m/72H/KR/wBa9L/3sP8AlBA77V8//rbpP+9h9Kf+tel/72H0oHer5/8A1t0o/wB7D6UD8Y6T/vY/SgelaHz/APrfpP8AvYoP4v0o/wB7H70D0VfNP4z0n/exUfjHSf8AexQPSUaOGDqcfUR34pCUfEOkpCIJPAFtBdot80/jHSf97FP/AFx0n/exYD0lt8z/AK46Qf70ff8Akv8A110n/exQPTTb5f8A110n/exT/wBc9J/3o+g/kgenaLfM/wCuek/70fQfyX/rrpP+9CB6drb5n/XXSf8Aej71/wCuek/7wfegepaLfM/656T/ALwfev8A1z0n/exQPTtFvm/9cdJ/3o+iX5L/ANc9J/3o+g/kgekEvmf9ddJ/3sWo/jPSHjIPvQPSRaAbcOo6rF043ZZCI/xFA6EW+fh/F+lzS2QyDd4HRrN+J9NhkYZMgjIcgg/kgdplT8/n/wDLjAmY4ce8DuTz7gHsyfi3SSiY+rHUEd+/yfI/BOr6fpfUGSQjO9JeI9iB6GD/AMuHGSI54SxE9yNH2YZBIAggg8EPkdV+K9CYVkkMgPYDc+T0/wCIw6XJ/wCCmU8B1ljI80fcgfYWtvlx/GekIH82KT+M9INPVigena7tHyx+NdH/AN6PoP5L/wBddH/3o+g/kgeoJXqm3yh+N9H/AN7FofjXSf8Aej70D1LRb5n/AF10n/ej7/yR/wBd9H/3sfvQPUUvJ0vX4OqJGGYkRzT1oCWTY44atHKA2jVmeMTiYnggj6UwgMcRGPAFaoAI7OceS7OMeT70DQNMxaQFbShAMXRzi6IClCUBVVQFVS0gEqqAHOXLoxLlACqrCiwW2ZIGGRvHRvXhjIHcCkBICj2p2i77rtQFV4RogUqBISWJJ5FIFBk32aQUDzfxPq5dLglkgPNYjH5vyxz9T1O6eXLKMI6km++mgfrfxHo/2zH6dmOt2H5Pr8EOkl+zxkZk16hP3D9Wg1PQQGH9oPUHb7jfNcW84z9T0xEsWWRiRcTr41wfcj9mxbqN1vMfi7V7nX8NwYutl6GWRjIf25Dw8P1QPqvwzqZdTghknpIjze8PcCDw8vQ9LHpMQxQJIFmz7XqumAKIj2NKgBKliOOjKySJdj29yBapQSBygKUBKAm79iVQgFCqged+IYoZpYoTFxMpWP8AQWcWWfSSGHObgdMeT/yMvb4Hu7dV/dw/1n/oyY63LCMNko7zPyxh/F+/i0HaD7Xn6nqRgAu5SOkYjmReHFl6jo4jHmicunklDXX+E/miBydNl9bq6O8CInHjH/h9x/iQDk6aXlzZ9cpnj90RfA/U932IvD1h8sf/ABmP/pB7ooBvVaSrCAVVRRVVQFVVEFVQ0EyL8f8A+XIf/CI/0D6y/YEgiw/H/wDlyf8AEx/oH1lA8odNkOL1wLhu2e23ol+F9RHLHAQN8huGulO/4R1OLGZ4uoNY5VLX+KJeuX4tjnhnMn+d/MhDx2yKksHmf9XZt2OGh9UXAg6aIH4dmJnE0PTIErPjw93RfiOLF0pEz/Nx7hi/1BH4j+IYsuARxnz5DGWT/SKUiDkj+FdRPJPEAN2MXLX6nCXSzhhjnlW2RIj46PtH8WxRhjnE/wA2RgM3ui8H4r1OPLOEMBvFCND3lSIO7/y2T/Nyf0j636wPyX/ls/3cn9I+t+tCAUoCbYQVVLQBKFQFKotAUoVAXzPxbpJdRiqIsijt8afTHtQQgfCYsmXop+riB2g6jw9h/fV+v6HrB1OMTGh7h5vxH8Jh1Xnj5Z0/N4cuf8LzURXiPFFPuQUvF0PWw6uG+HzHg9oKIFUJtAUKSge3lhQpR3VAUqqIKEoJRRQpQgNsZCQCQLNceLbJQOaZ3USKPg7DhyyfEHUMRWWEoCaaQDcGG4IFqqtIFVVAVVUBQlUAKlUCJcMOkuHMMKLLSoEFzyQEg7MHwQMIxbEyDRa2oIsOTRqCyBMS5uLEDWjs0gtIUi2kCqqgFCqgRPJGFGRq9A+d1OHpsU9+W/NwBdfc9fWYzOFx+KJ3R+TI9Pq4AkWPA9i83j37HenpXLGN4PN6eccmesUagR5h7E/iOCGER2CrtPXY44pQGI7Cf4XDq+nnio5Jbr45eb0xWJ6qubVsnh06nR1XS4oYBOIo6Li6KGbpxKI8/jbt1v8Aww/0uvRA/s8a5o064ptnLnZUTnHkedtgYDHKQxyBqe4cvZmxYcmE5I6mMaEvc8eDBCcpHPPaQeO7tmz9PixyxYtTIdvzZqjdviSrMyHoemx5obpxs25dDhhkySjMWBx9L1/hg/lH3uH4YKyzHaj9bUl6TLs/9pjobdV0uDHjkYgCQGmrn+HdPjywJnGyCj8S6c7xlHB0PsfR6TAMGMQGve0knZ4GLWjL+KWzbHAY4iMRQDaFL2PKxtdz5XU5+vjkkMOGMofZkZOP7R+Kf9xj/wCV/wCdIHt7lEnxBm/Ff+6x/wDK/wDOns6GfWSkf2qEYitNpvVA9B5es6XH1UPTygmN3oaelzyw3xMeLBCB8d+MdFh6ScY4gaIJNm9Xt638K6fD00s0IkSAB1Pi8fTfhBn1Munyy27dfbIex6fxH8Nz4sMsks5nCPEZOgP4T+GYOpw+plBMrI0NPJ+FdHi6nPOGUExiDWvtfY/Af+F/1SeH8B16nJ7j/wBJgOf8V6PF0+fHjxioyqxftdvxf8NwdJiE8USCZVrInRjrvwfPHNcRKcZy0lzV+PuY/E/wr9igJ+oZ2dtENIdUfwzB+w+uYn1Nm69x59105/g3QYOqxSnmjZEq5rSn0B/6rP8AzEXH/wAt6An0+SMuDKj9DAX/ANX/AIZ4x/8ANjMui/DIg6wH/mT/ADfOP4HOHUxwyiTiJ+OP8Lt+IfgsOmEcuISOMf3BfmrxDcQD8H6Pp+rjMZI7jE6GyNC5HpMX/WP7PX8vdW35Pdg/Feh6PHtwxl7q1J9p4eLouo/avxGGaq3S4+TCn1XSdLj6aGzENsbunaYEgQeDoseElEPkPxnpMPT5scMUdoPxak9/a3+MdD03TYhLDECRlXxWv4l+DZv2gzxjdDJLkci/Fx/E/wAHh0OMTjOUrO2iA0HVD8N6f9h9Yw/mbN12eWPwXocPU4pTzR3EGhqfB7ga/DL/APKRY/8ALcj/ACJ/1fowp5v4P0mLqc2SOWO4RGn0rj6TFL8QPTmP8u5VH5PcOly/hOWWbHA5cUh2+KOtuX4bizdR1h6qUDGNyOvtFU0hzx6TEfxD9n2/y91bbPFfS+h1/Q9FgxTIjGOTbcfMb+t5oD/1LV/i/wDIun490BlKPUjj4Znw9qKZfgvQ4eqxylmjuIlQ+hwwdJhn15wVeO5aX4B9CP4DiOOPpZZAkayHEvk8P4dh9D8QGK72mQv5IgPxjpcXT5YRxDaCNfperrsPTdGYg9OZgj4hIsfj/wDex/0/q+91UJTwzjj+IxNfQwp8t+19D/6Tf8//ACc+oydPPETixHHIEX5ibHzfQ/Bp9LhEpZZCOUGvN2CPxr8Qw9RAYsUtxBskcIGuL8O6c9CMphc9hlus8/S5/gPQ4eqhKeaO4xkKe7Cf/UcP/Fn9XL/y2f7WT+qP1IH0HAfO6uHT/iOMgndGB+KHNjkB9Eh8fBIdH1E+nnpHIfUxH2n4gwHidb1HQHF6fTYyZdpmxT63T9BDqenx5OqhuybOe9dno6j8P6UQnOUIiwTKT4XQ9Dl6zCRHMYxiaMdSPrDQP4N0mLqskxmjuAFjUjv7CsOkxH8ROAx/l7j5dfB6P/Ld/uZP6R9bPTg/9a+aidxuv6UB6z8Oj0WePUCG7p780R9lrof2aPUGU8wmZAwgKIFHx9rv/wCXFHJsgRfpgndXj2twxYPwzpxunP1D7b+oIHP+KdNi6fqYY8UdsSBY18X0+twfh/Rx3ZcY14A5L5HXdZDrOphkgCANsfN730/xvEI5cWfIN2IGp/SgebLqOny36PSWK+Kyfqcvw6fSw3nqxeg2jX9H1et/G8MMZh02pIrioh8/8H6CHVzPqfBADy+NoHq9Hg/DesB9KAJHMTuv63zOt6TFj66OGEQIHZcfe9HWRx9J1uIdMBGQrcI+0/kvXf8Aqzh78aB6svwrocesscYj2mv1fD/D+nxZeuOMxEsdz07acPufi/RHrMFQ1lE7gPF4/wDy3ukjGMs93I+Xb/D7/agez03R4emJOKAiTzT1KAlgJN9ml4ZMta1/RAolgzALnKW3yxQBXLCmomC5R5PvZkWsY0QNA0gBppAWtqqBUW2ItoClCUBShLSCqqgKoVAWJ8tsTQAqqwoEFJZPCBlk7O4eefb3u4QClCUBpBCVQI44bDJ9iATaBograECZP55nyGeSUydTIn739ELz+lDvAX7g1A+AOWd3uPjz3b6aRhlhIciUfrfvfRx/wj/khRixg3tH0BYA1DYZCWAq1QEoBVnlKATfZQgG2kAJQgyEedECkM7kSyRiLJoIGjlCUjYmKrijdtbgzPLGAuRAHiTSB5/4rn/ZxjykEiM+B7nDpeqwQJy5cglllyaNRHgNH1Y5IZBuiRIeINpJjEWaADQcf/WvTD7Y+gsz/EulmDGUgQdCNp/J7hOJG4EVV2scgmBKJsHggoHg/tUYyh02MnJAzgYGpXGjwbHHgX6MOQyRMtljcBdd6dNwQLQzuXcwgZXXl59qbcZ54Y63EDcaF9y2JIpasgtICqskoFKwSjcgUX5v8d/DM/U5Y5MI3DbtL9FuRdtIfD/9Sdb/AN394T/1H1v/AHf3h+40cc+eGCO+ZqI/Vsg+O/6j63/u/wDnD80f9R9Z/wB3/wA6P5v2ObPDDA5JmojkugIItkiD4v8A6i63+Af8oJH4D1v8A/5QfsMWaGQyEeYHbLTu6aKQeJ+B/hmbo5TnmABI2gA2++GNwTuYUsK4S6mMZjEb3SBI08HQSQNEshKIKqi2gKHj6v8AEcXSERyXcuKFrDr8OTEc8ZfyxdnwphTtV87pvxbB1E/TiSJHWO6JF+57J5RCJkeALLQWde7T5eH8ZwZpxhHcDL4d0SAfm9/qBgNC8PXdBj6yO2Y17SHIereD3efJ1uPHljgkalP4fBsg8roPw/N+H5ZSMrh29r9AHlwdVDKJEabZGBvTUPRGQPCBoh5es67F0kd2Q1fA7n3OHU/iuLp5CM9x0EjtF7Qe5YDunkEBcuA2Hh6j8QxYNgkbOQgRA9vf3OR/FoRyjDKEwTLYDt0JQPTaYtNoBtDN2ke1ANoUoQCzCGwUSTXc8pUlgFklieStA5GUgySwM+Q7BxjqXYBqDCS0NWSDpTTSC3BhuCBaUK0gVVUBVVQFVVAUJQgCTm6S4cwwo0qqgBBDSL1pAksS01dCGZASG08FAylqNHeHAeUYxCdRJrweuLChSqLaQKEXbMo2RLXS+7AaKi1tAaeHP0BMjPDIwkea4e62dzGkzdbOuh52L8NInvyy3H9/Fr8R6eeUAwF1dvfbO5y6KIN+7bkrdDk6jDLL04jDU1EuvQxMcMQRRF2Pm7GSguoxky7t149skZulxZvjjZ8e7z5Pw3GISGOPmrQl7RJNsdUwr2W5w/h+M44GMgQRI/ox0WCeHNITHI0PzfRWwo07CvMb5f7wJREhR1BeOBn0shjIJxk1E+Hse210bGMmVaMNggptCtMDS0qWgFJpVQCghVsFA4Ov6H9pAnA7csNYT/T3PBly5uu6bLgMCM0RRH2Tr2L71MkIHi/gOOUOnMZAgicrB9web8I6bL0/V5I5YkXEkHsfMH6OgtBSAU+T+OdLkz4R6UdxjLcR7KL7CNFIPIwYZZfw4Y4jzSxmIB8XP8AwzxY8kMgMZCfB9z7lBdFIOXqMOTIKhLa6jHQo6+LqrCnny/Culkd3pRv9+3D5Z6HJh/EYZRCsRloY8fC/RmkU2SDEJpbRuCACHyvxrpcnUYQMQsxlur2U+ra2EDycPTzydAMQ0kce2jpqz+BYMmHHOGQGMhLg+4PsWAkSB4UgFMmLZNLYQPn5dFlx/iMc228cpfEP6e77koCQqQsHQhuw0pB40MWb8PyenCJydPI6AfFD/J54dFlxfiHqmPkkZESHu7v0B0ZBBNKQeF+N9DlzSjlxjcIiiBzy+3EWGwQedE6BSDg6n8K6fqTuyQ83iND9z5fX/geOGK+nHnB+1Lt9T9GySFIPFwwl+xRxcS2GJB9t8r+AYZ4Y5IzFHcPqdvxHDklMTxmqHmHYvT0WSUoXkjslfwop2283WdFj6yGzIPaCOQXotN2iHzk/wDqJ+WWe4dt24vrdH+Hw6PF6cDfeRPcvctqQfPfg/RZelz5Y5Y1YFHsdSv7Dlx/iQzEfy5EkSH9PfwfftAJKkQAwExR1BeCf4H0k5btlewEgPo3STL2KRB87+I/hBhkhk6eA2DaCI888n836A4ozBjIAg8gtAtWpB5//AFR00LOPHESo0XzfwnoM/TSzY5eSRjHbKrHfV+gMj4IsnspB4n4f+D5MWY5+pIlIHy63r4/kx1/Q5v2zH1AjuhugDXavF98FNhsgAjo+Z1fTZOnmer6Ueb/e4+0x4+99S0WwGfS5/XxxyAGIkOJcvQwm0AoK2ybrRAy7lS2Mfi1tAYUzEL5bATykBpBCVVAFKlCAYF0c4XfsdEBShKAqqogVVWgVVDALE22JtAFVWFFzk6MEIGM3aJcsgbidGA0TbANpaBvWglVBtASqksmSASrO5BPdAjPvMCMREZ9iRdPgg5v2OY3GUhllGRBqRiJa0/QW8suhwyxyxEeWUjM6/aOqB4uD8Ql0+PJAGQ8+zH6nMbHf3crglDL0JnOcpSxmfwyIsk6Pt4OjxYI7YR0vdrqb8UR6TAIeiB5Qd9e27bgJK/D+nPTYY45EylzInXUva57u672A0QwZAc6BfUA0JCBpSUDVKArVcaKFMQeUAnV8z8aNdHk9w/6QfTcsuKGaJhMAxPIKB4eXrup6UZYzMZSjDHKJEarca+55svWZs2DJHLrsniqVAcn2P0c+mxy3ExBMhtNjkeDEehwQjsjCIiTdV3bgJPD6n8Q6jHLNKOWIGKdDGY6yDPUS/aM/8wiNynG50RCMK4B0s8vsY/wzFHJPLOInKUt4Mh8LHVfhUc0/UidsjqbiJRJ8aPdCTxOkyyhCebDIbzDLKewaCvgNDQHl7MnXHLUIzEgenlOQ/wAVPodL+FxwHdI7jqKERGOvsD0w6LDj+GERdjQeKB8/LqckoRx+qMURgjMaDzkjhxl1mXH0+KGKZiY4t9Db9cvqD9RLpcUq3Qidvw3EaIPSYpVcInboPKNEJPJ6XqrzHLkIA9DFKR97h+IdbljPNWb09kR6cP47D7/7Njqtoojbx28Hh6r8Ij1MzMzlESAiYiqr2eCEnmdR1uWUpA5vS2Y4TgK+MkW3m63qcYA13dRCHp/4Z9/zfd/ZsZoSiDt+GxdNnGDRIBrhYCTyerzC8EYy3EZowl76ePHnzjZmOWRBz+ls7bbIfofRj4Dndx38VGKIFUOb+aBQTdcppaYBQUqQgeB+LSzxy+lhJ/nxER/hMefpDyQzZ8mOXX3IenKA2XoRHSX3v1BgDquwcUKbgD5bpf2nPkj02SUgJXnMrPEhoPkXH9q6sXPXyj9mPPxH7T9fsCPTCwGJ4nWZfT6Y4oSkZYjj3nW3k6nOc46meMkxvDt5fp9g+ldgQPkvxE2c4ymfq2PTiL27dPkvX5ZDOTEyjKBxgay49gGle9+t2rsWAPG6TOMM8xyXUs20aeID5WWdSJyGfr+sAdTt23p7H67Y8P8A1Rg9T1aN3vrcdu7xpYA8POZerOzk/avUHp1e3bf0U9OTDl/aP2QX6U5DNfgBzH6X6Hau1YA8PNkOfNjyQEtpx5eQ5dBgOKfTZI7rnGW+7+XufodqQEBilVYBtSVQUDyPxDDly9ThGKRgds7mBbhm6PZ02TpMW6UxWQkj4rNkf5Pd1P4lDBM4zGciAJHZG9C7Yupx5ccckT5ZcXo0HleseuzYBjhOPpy3TMo1t0qn0jl/aMEpRiRcZCpCj3djOINyIFeJSckY8kC/EoHzPS48hlgERlMoSG6OQeSI706Y8GQZYjZMdQMplLJ9nZ9VU/QnNAcyGvGrnDqoTnPHwYGIN8eYLAYnj9HglDqvUOOQxEz9MG/Ke5rtb0df0R6rqIjUVA7Z+Er0fUOWAuyNOdUDNjIsSBFXyED56PT5ziEs8JSAzSllgPtCufpfR/Dd/Twr05CE8h2R/gj7fY+hkyxhA5DwBueGH4rCWOWaUJxjEA+YfFfggafieL1+nntjumBUdNeRw+f+KdPlkaxxnc8YgTD4T7JeFPZ/1pH095hMS3CGwjzEl6um6mPUQ9SNjUgg8gjm0Dxur/Duq3RnHbKjjEdNY1+ni+pDFkn1ZnMeWEIiB7bpfE5YfxbFlJ0lECJmJS+1Ec010/4rjyiRmDj2gT8/8J4KB2dJn9eG6jGjKNH2GnpeLoepj1WP1ICo2R9D2hgFVVAULaJFAEpAcuMspkp1TVOSkhJDGpPLrGN8ooYimwEANcujIGkVSUANw4YpuHCBaqrSBVVQFVVAVQlAUJQgCXDkHWXDkGFCqqgKqqAoItKoEEEJtKoEVE6p2hOhXYEACMfpTQXau1ANBGi7VMUBNBAAPZO32oo+KAaHgtDwWj4rR8UBoJ08EAFaPigHRUUfFaPigFVo+KKPigFCaPiu0+KAqij4rR8UAptG32rsQDa7gjau1ArcFtnauxANraNgXaEA2to2BdgQKtFrsXagJkjcF2rsCA7gthdgXaEB3ItO0I2hAbC2u0LtQDao2+1dvtQCto2+0rt9pQG1tG32rtQDuXejYE7QgO5dy7Qu0IDuTuRtC7QgO5dy7Qu0IA0WwnaF2hAG5dydoTQQBuXcmgtBAG5d6aWkAbl3JpSgDctlaTSALK2U0mggTZXcmlpAncm1poBAncu5pUCNybLSoE6pASi0ArasymI8oFKi0oCqqgVFtiLaAEqqAqqogqqtAqqWADE3RzyNAFUKwooKVQMiLc5T9Pl3IRodCmERGYLRI5Z9OtQ1dCyxFKSzGYkLaaQEnxYDJj66XqTMrxmXgAL7B9ouRwQOT1a89bb9iB8x0eTJikMhJ88Msonde8jxH2aXHkn08N2KUiZ4Dklcr83j7H6DD+HdPhmZ44ASPPzTh/DsGDd6cAN2kvc3ASeZ+GROLMccZGUTihkNm/MXTrI5P2nBMzO0zAEO3D6PTdFh6W/SiI7uWs2KEzEzFmJ3RPgWA+dymf7UctnbHLCO7dqPZt8HTDfrRzWfUOeUCL+x4U+uehwSyesYAz5tJ6PEZnKIgZD9vv8A7VgUw/F8U59PMxmYxjEmQH2vY+f+Iwv05TG6PpaREttSoeZ9+cI5InHMXEij7XPN0eDMIjJASEfhvsiHzXW9ZPJ0+PFMyFQjORo+Y9hb3dV0mHrMmLbE78vmlLW9kQ+3PDDJH05AGJ0pIww3CZA3AbQfYsAaRFCmnOcjGJMRuPgkStAvhWbXewFKxKYCRIIFKHnz9RjwjdM+z6UQ6rFkNRkCR4IQbyjuINkUb0/Vt5sXUwyyMYSB280720B0VFraAQlncncgFUWi0ClY3I9QIFqxvRuQNFtz3I3hA0tLmJhO8IFo3C67o3JsIBSzuC2gEBLNptAKs7gm0Aqym0BVbRuCAaSEbkAgaBAqkLdotALJTaLQPn/xHDI9TKRjlMTCIBw+Nnl5c3R5/Sw+pCREYyjtEd1E8WPH2v1NropB89/1fKch60DLbg2jd/Ff1vLmgYV68N5OAAC9YSHd+p7uObo8PUG8sBIjxDQfN5+ly58cBHGT/KhtkI39/Z7Oo6TNL1ZiBNnBOI8do1feEQBQGifkyQfPZely9T6spYiN+TFLaa+Ect9X02TFPLDDiJhkxiEdtUKt975IJrspB5k+jzyx/ETH0xH0ToCdtcvnf9W5cuPLsxnFEiG3FKXMonV+kv2FVIPnodFnjH1I4zERyQyQwmWtAa/S+l+H9NOGGXqDbKcpz2+G570iQ8D9CkHz2H8Pz5IjFkjtGPHkx7r+Iy4p6ug6bKchyZ4bQMcMVHW9vf3PrgrdeKkHL+HYJ4YSExROSch7idHtBvhkFN0gUrBkDoQpmgURbE7UzPgfoYlIyNbSwpMdOUSsumws7CD7GQUMY6NhR7GgHRkQE0itfYlABSqhADpHhzLpDhApVVpAqqoAtKqgKEoQChKoAcpQI1j9DqqBhGVtNygDqNC53Ro8sKFUqgBVVACpVAmNkmw0QgCkoCqoKAVc4E626IDSqqArSg2qAaRVKTSOQgFAFKvdAKqqAVQqAUKqAhKEoCqEoCqqgA8MwJ4bQEAqqoCqqgKoVAVKqgBQlUAJZJpIQCqqgBKqgBVVAVVUBVUAoBCUKgKWRIHQJQFVVAVVUAqi1QFQitbSgFCqgFVVAVQlAVVCAVQlAVVUBVVQFBFpVAUUlUAKlCAUc6ILrGNe9AMY0EqrSCqqwoqqUQCpQgKqqKFzm6Oc2kAqqwoqqoARSmrSgTqE7klRSALC7gnaEbQgNhNo2hdqAbC2jaikA6LYXamkAWPBdwTSgIDYXRaRSAdFsLQXaEBsL5WRqSOzW0KANhdB2XaF2BASQjTwXYF2BAk4scjZiPoRHDjh8MQPk3sCdiABGEeAB7gGrDOxdgQKsLYZ2J2BANhdwRsCNgQK3LYRsRspAjKaG4dmwR2RLHYpjGLjy3Ym5ra2jb7V2nxYUOio2nxRt9qAbXcjanagHcu4I2BO0IA3BO4LsC7QgO4LuXaF2hAdy7l2rtCAdyLXYEbQgG13I2BdgQHcu5doXaEB3LuTS0gO5bRtC7QgG1tG0LtCAbVG0LtCAptG0KIhANraNoXaEA2ts7Qu0IFWi0bQu0eCA2oJ7qIhO0IDuXcmgtIA3I3NKgTuXcWmSUBoldrSoCqpQAlUICqqUAF0hw5EusRQQKShWkCqqgKqqAoSqAEqqAFVUBQQDylUDEiUPaEgg8OrnLH3joUAKgHsdCrCilCoCSoUqEAqhKAEoVAKoocqgPdNosIsIFLQYlMVozHNE6d0C7SWd0V3BAtLAkFOQIFoZ3hdyBSs7l3IFKxvC+oEC1Y3tbj4IBVneu9ApWd3sXcfBApLPm8FqXggUhFS8CtT/hP7/NAKs1P+E/d+a1k/h+8fmgUqBGfh967J+AQFV2SQccz2+8IBVRjn4D/lf5L6c/Z/yv8AzlAUo9KfiPpP5J9KfiEAWtp9KXig4peKAqvpHxT6R8UALafR9q+j7UCTqgN+iPEr6I8SgTa216EfGX3fkvox9v0oE6LbXow9v0r6MPA/SfzQJtdzXow8PvLXpx8EDIyC7nX0o+C+nHwQMtwXcHX04+C7IeAQMtwXcHYQj4D6E0PBAw3LuDvQWggYeoF3h6FaDlM+4a3ex6FYDn3HwXcfB6FtA57l4FNy/hLuttIc9y/hKfP4O92qKYVPwURmezurAYbZ+C7cng7q0hz7cngiIlLj3PSvCKY+nJfSl4uysBEIVzy2qoCqqgKqqApVUQVVUUVVUQDGQGtG1aDIESFpRkjtO4fNQb4YUVVKBmI0TrbalUAKEoQCqqgFVVAUUlCAqqoBQqUAC0qqAKSqoCtqybsVwgUlCoClCoCqpQAlC2gFCVQFC3SoCqVQA5x0kR46ujnPQiXyaiM0pVVhRVCUAFVQDaATwqVQFVVAVVUBVVQFVVAVVUBVVQFVVAVVFoBQqoCqqgKqqAnVeFUoDoVRoOFjda8oBVUE0gFVUIBUlVpACpVADMhfcimkGigFVVAUoVAKoQZAIBLNmWgTGJnqdA7AAaBoIhAR97aqiCqVQAEqqAqqoCqqgKqqAoVUBVVQFVVAEoCXLkMMv4v+b/m7KimXon+L7l9E/wARdSgMBn6P+Ir6H+IuqtIZegPEr6EfEuqopn6Efb9K+hF0VEI9GHgvow8G1QI9GHgn0o+DaECfTj4L6cfBpBNDRAHpx8F9OHgGgqBPpw/hH0NbY+ASqAKC0EqgTtHgF2jwH0NKgCh4D6EqqKRWrSqwBVVRBtVVAVVUUVVUBVVRAJQloAqqgKqqAqqsAqqooEqqAqxDJGZIj2NFpAKEoQFVVAVVUBVVQFKFQFUqgBUqgKqqAqqtAEqrAKoSgKCARR4KVQAAIihoAlVQFVVAVVUBVVQFVVAVVUBVVQFKEoCqqiCqqigSqoAShLSC4THp6j4XdUDm9WPivqx8XooeC0PAIpz+rHxT6kfF22jwH0Ltj4D6EDD1I+KnJHxd9kfAI2R8AgY+pHxCfUj4ughHign04fwj6EDPfHxC74+Lp6cPAL6cP4QiEbh4o3DxdPTh4BfSh4BhTPcPFdw8W/Qh4L6MPBAix4ojKyfB09GHgj0IeCALSv7Pj8F/Z8fggC1tP7Pj8F/Z4eH3oA5Sv7PD2/Sv7PD2oCq/s8Pb9K/s8Pb9KA2i0/s8fE/Sj9nj4n6UAqj9nHiV/Zx/EUAolEHlI6cfxFf2f/EUBVH7P/iK/s5/iKAlQn0D/EV9A/xloCqPQl/H9y+jL+JgCxkjuiQ16M/4kejP+L7mkJxy3RBbcseKYJjuGh8PF09LJ/EPoTCFKPSyfxD6Eelk8QwpSGfTyeIT6eTxDQUhkY8g8E7MvsQKVnbk8Au3J4BgKVnbk8B9K7cngPpaClZrJ/CP+Uv8z+H/AJyBSs/zP4fvXz/wsBSEXP8AhK3P+E/cgUhm5fwH7kbpfwSQLSxul/DL6F3H+GX0IFoZ3H+E/Qu//DL6ECltnf7D9CN/sP0IFpY3+w/Qu72H6EClYGQeB+hfVigXaLDPqA8fUomPb9CBas7wP9i+pFApSGPVh4p9SPigUi6Rvj4r6kfFAtCN8fFd8fFApCN48Ub4+KBSAjfHxUTj4oFKjcPFdwQDalneGogz9yBBl2Gpbx4a809T4OkYCPDTSASqEBShKAqqoCqqwCqqgKFVoFKFQFVVAVVWAVShoFVVASqqwoqqtIKKN+xKoCqqgKqqAqqoClUIBVCUAJQrAKVVoAlUMKFVVEFCVQAlCooVVUBVVQFUA2qAVVUAJQlEFCq0CqqgKqqAqqooqqoEiABJHJ5aVUQVVWFAqUIBQqoCqqgKqqApQqAVQlACqlAVVUBVVQFVVAVVUBVVQFVVAVVUBVVQFUqgBUqgBKqgBKEoCqqgKqqIKqqKKEq0gqqoCqqgBKEoCgpVAi6LTnmsRMhyGoGxaBSVVACqqAqlUBQlUBQlUBVVQFVVAVVUBVVQFVVAUoVAKqqAqqoCqqgKqhAyOmQe0fU6ueXQxPgXRrIhVVYUVVUBVVQFVVAVVUBVVQFVVAVVUBQlCApVUAKlCAqqoClCoBsrZQqAUKqAbW0KgG0KqApQlAUUEqgDaPBaCVQBQWglUAbR4I2x8EqgDbHwaQlAVVUBQlUAJQlAVVUBVVQFVVgFCqgKpQgFUJQFCVQFUJaBQlUAKq2iiqqwgqqoopQlpBVVQAlCUBQlCAqlWACpQihVVRBQlUUVVUQVVWgVVDChVVRBVVRRVVQFVVAVVWkFVVACpQgKqrAKqrQKqrCiqq0gqqsKKqqAFSqAFVKAFShAVVKAqqoCqqgKqrQKqrAKqqAqqoCqVQAqqgKIxEBQaVACpVoAlVRBVVYBVVaAJQlhRVVRBVVQGlVUC4Q3C2vS9q4yANWhOJ4IaCPS9q+l7XTcPFdw8UDP0vavpF03DxXcPFAy9Ir6Rddw8V3DxQMvSK+mXXcPFdw8UDE45L6cvB23DxXcPFAx9OS7D4O24eK7h4oGGw+CNp8Ho3DxXcPFAw2nwWi77h4ruHigc9LT0bh4ruHigc6vRuHiix4hAwV3uPsW4+xAwV38vsR5fYgYq7eX2LUPYgYq7bYLtggYq67YLth4oGSXTbHxXbHxQM0Ou2PijZHxQIVvYPFdg8UCFb2DxRsHiECVa2+0Lt9oQMc3wtrkx7o1Ya2e0LYEq1t9yNvuQAqavw+laQAqaQgKqqAqqoCqqgKqqAqqoCqqgKqhAKFVAUoSgBVVAVShAVVUBVVQFVSgKqqAqqoCqqgKqqAFShAUoSgKqqAqqoCqqgKqqAqqoCqqgKqqAqqsAqqoCqq0ChVQEJVUAIVWFCqqiCqqiilVaQVVWFFVVAVVUQVVWgCqrCilVQFVVpBVVYBVVQAqqihVVQFVVEFVVFFVVAVVWkFVVhRVVaQCqqAqqooqqsAqqtIKqqAoVWFCqqgKqqAqqoCqqgKqqAqqtIFVVAVVUBVVQFVVAVVUBVVQFVVAVVUBVVQFVVAVVUBVVQFKqwAVVaBVVQFxxfHP39v358VVq3BsqqwCqqgKqqAoVUAqqoChVQFKqgKFVAUqqAqqoCqqgKqqAqqoBVVQAgKqAVVUBVVQFKqgKFVAUqqAqqoChVQIx/C2qphCqqgKqqAqqoCqqgKqqAqqoCqqgKqqAoVUAoVUBVVQFVVAVVUBVVQFKqgKqqAqqoCqqgKqqAqqoASqoCqqgKqqAqqoCqqgf//Z","req_id": < string >  }');
try {
  $response = $request->send();
  if ($response->getStatus() == 200) {
	echo $response->getBody();
  }
  else {
	echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
	$response->getReasonPhrase();
  }
}
catch(HTTP_Request2_Exception $e) {
  echo 'Error: ' . $e->getMessage();
}
	
}


function TransactionSchedule2()
{
	
	$JSONArr = array();
		
		//echo "ID = ";
		
		$id = $_REQUEST['ID']; 
		$mandate = $this->Payments_model->getMandateData($id);
		
		
		
		
		$mandateid = $mandate->id;
		
		
		//exit;
		
		$date =  Date('2011Y', strtotime('today'));
		
		
		
		 $clienttxn = $this->RandomString();
		
		//$clienttxn = $payment->clienttxn;
		
		$url = "https://www.paynimo.com/api/paynimoV2.req";
		
		$JSONArr['merchant']['identifier'] = 'T764243'; // merchsnt
		
		$JSONArr['payment']['instrument']['identifier'] = 'Test'; //scheme code

		$JSONArr['payment']['instruction']['amount'] = '1';
		
		$JSONArr['payment']['instruction']['endDateTime'] = '24-11-2022'; // date of debit
		
		$JSONArr['payment']['instruction']['identifier'] = $mandate->mandate_reg_num; // respone number
		
		$JSONArr['transaction']['deviceIdentifier'] = 'S'; //default
		
		$JSONArr['transaction']['type'] = '002'; // default
		
		$JSONArr['transaction']['currency'] = 'INR'; //default
				
		$JSONArr['transaction']['identifier'] = $clienttxn; // Unique transaction number to be generated by finaleap
		
		$JSONArr['transaction']['subType'] = '003'; // default
		
		$JSONArr['transaction']['requestType'] = 'TSI'; // default
		
		
		//$this->load->view('dashboard_profile_header', $data);
		////echo 'Test';
	  //print_r($JSONArr);
	  //exit;
	   //$this->load->view('Payments/sampleform', $data);
		
		//exit;


	
	
	$JSON = json_encode($JSONArr);
	
	//echo $JSON;
	
	$ch = curl_init( $url );
# Setup request to send json via POST.
//$payload = json_encode( array( "customer"=> $data ) );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $JSON );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
//echo "<pre>$result</pre>";

$JSON = json_decode($result);

//echo "<pre>";

//print_r($JSON);

//echo "</pre>";
//exit();
//exit;

$data['response'] = $result;

$data['responsetype'] = 'Transaction';

$data['status'] = 'Transaction';

$this->Payments_model->saveresponse($data);  


//$this->load->view('dashboard_profile_header', $data);
		//echo 'Test';
	  //print_r($_REQUEST);
	  //exit;
	  // $this->load->view('Payments/sampleform', $data);
	  
	  
	  $datadb['errorMessage'] = $JSON->paymentMethod->paymentTransaction->errorMessage;
	  
	  $datadb['identifier'] = $JSON->paymentMethod->paymentTransaction->identifier;
	  
	  $datadb['dateTime'] = $JSON->paymentMethod->paymentTransaction->dateTime;
	  
	  $datadb['amount'] = $JSON->paymentMethod->paymentTransaction->amount;
	  
	  $datadb['statusCode'] = $JSON->paymentMethod->paymentTransaction->statusCode;
	  
	  $datadb['mandateid'] = $mandateid;
	  
	  $datadb['transaction_Identifier'] = $mandate->mandate_reg_num;
	  
	  $this->Payments_model->savetransaction($datadb);
	  
	  $id = $this->session->userdata("ID");
				
			
				$row=$this->Customercrud_model->getProfileData($id);
				
				$data['row'] = $row;
				
				$data2['JSON'] = $JSON;
				
				//print_r($JSON);

$this->load->view('dashboard_profile_header', $data);

		$this->load->view('Payments/transaction_schedule', $data2);

}

function VerifyTransaction2()
{
	echo "VerifyTransaction2";
	
}

public function MonthlySchedule()
{
	echo "Monthly Schedule";
}

}

?>