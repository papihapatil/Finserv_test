<?php
date_default_timezone_set('asia/kolkata');
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance extends CI_Controller {
	
	

    public function __construct() {
        parent:: __construct();
		
		$this->load->helper('url');
        $this->load->library('session');
        $this->load->library('email');
		
		$this->load->model('Customercrud_model');
		$this->load->model('Retailer_model');
		
		$this->load->model('Admin_model');
		
		$this->load->model('User_model');
		
		$this->load->model('common_model','common');
		
		$this->load->model('Operations_user_model');
		
		
		}
		
		
		public function PremiumCalculationForm()
		{
			$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$Cities = $this->Admin_model->get_Master_Cities();
		$customer_link = $this->input->get('customer_link');
		if ($customer_link == '')$customer_link = false;

		 $data['userType'] = $this->session->userdata("USER_TYPE");
		//$this->load->view('header', $data);
		$this->load->model('Dsacrud_model');
				
		$id = $this->input->get('ID');
		if($id == ''){
			$id = $this->session->userdata('ID');
			$profileArr['edit'] = 1;
		}else $profileArr['edit'] = 0;
		$dsa_banks=$this->Dsacrud_model->get_dsa_Banks($id);
		$profile_info = $this->Dsacrud_model->getProfileData($id);
		$profileArr['row'] = $profile_info;
		$profileArr['customer_link'] = $customer_link;
		$profileArr['id'] = $id;
		$profileArr['type'] = $this->input->get('type');
		$profileArr['dsa_banks']=$dsa_banks;
		$profileArr['Cities']=$Cities;
		$data['status']=$this->Retailer_model->getstatus($id);
	
		$get_uploded_doc=$this->Customercrud_model->getDocuments($id);
		
		$user_info= $this->Operations_user_model->getProfileData($id);
				 if(!empty($user_info))
				 {
					 if($user_info->MN!='')
					 {
						 $user_name=$user_info->FN." ".$user_info->LN;
					 }
					 else
					 {
						 $user_name=$user_info->FN." ".$user_info->LN;
					 }
				 }
				 else
				 {
					 $user_name='';
				 }
				$data['username'] =$user_name;
	    $data['row']=$this->Customercrud_model->getProfileData($id);
		
		//print_r($data['row']);
		$data['get_uploded_doc']=$get_uploded_doc;
		//print_r($data);
		//$this->load->view('dashboard_profile_header', $data);
		//$this->load->view('dsa/profile_new', $profileArr,$data);
		
		$id = $this->session->userdata('ID');
		//echo "<pre>";
		//print_r($profileArr);
		
		$data['status']=$this->Retailer_model->getstatus($id);
			
			$data['row']=$this->Customercrud_model->getProfileData($id);
			
			//$this->load->view('dashboard_header', $data);
			
			$this->load->view('dashboard_profile_header', $data);
			$this->load->view('Insurance/PremiumCalculationForm',$profileArr,$data);
			
			
			
			
		}
		
		
		
		
		
		public function sendappform()
		{
			
			//echo "Insurance form test";
			
			//print_r($this->session->userdata("USER_TYPE"));
			
			/*exit;
			
			if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['userType'] = "none";
			$this->load->view('header', $data);
			$this->load->view('login');
		}
		
		*/
		
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$Cities = $this->Admin_model->get_Master_Cities();
		$customer_link = $this->input->get('customer_link');
		if ($customer_link == '')$customer_link = false;

		 $data['userType'] = $this->session->userdata("USER_TYPE");
		//$this->load->view('header', $data);
		$this->load->model('Dsacrud_model');
				
		$id = $this->input->get('id');
		if($id == ''){
			$id = $this->session->userdata('ID');
			$profileArr['edit'] = 1;
		}else $profileArr['edit'] = 0;
		$dsa_banks=$this->Dsacrud_model->get_dsa_Banks($id);
		$profile_info = $this->Dsacrud_model->getProfileData($id);
		$profileArr['row'] = $profile_info;
		$profileArr['customer_link'] = $customer_link;
		$profileArr['id'] = $id;
		$profileArr['type'] = $this->input->get('type');
		$profileArr['dsa_banks']=$dsa_banks;
		$profileArr['Cities']=$Cities;
		$data['status']=$this->Retailer_model->getstatus($id);
	
		$get_uploded_doc=$this->Customercrud_model->getDocuments($id);
		
		$user_info= $this->Operations_user_model->getProfileData($id);
				 if(!empty($user_info))
				 {
					 if($user_info->MN!='')
					 {
						 $user_name=$user_info->FN." ".$user_info->LN;
					 }
					 else
					 {
						 $user_name=$user_info->FN." ".$user_info->LN;
					 }
				 }
				 else
				 {
					 $user_name='';
				 }
				$data['username'] =$user_name;
	    $data['row']=$this->Customercrud_model->getProfileData($id);
		
		//print_r($data['row']);
		$data['get_uploded_doc']=$get_uploded_doc;
		//print_r($data);
		//$this->load->view('dashboard_profile_header', $data);
		//$this->load->view('dsa/profile_new', $profileArr,$data);
		
		$id = $this->session->userdata('ID');
		
		$data['status']=$this->Retailer_model->getstatus($id);
			
			$data['row']=$this->Customercrud_model->getProfileData($id);
			
			//$this->load->view('dashboard_header', $data);
			
			$this->load->view('dashboard_profile_header', $data);
			$this->load->view('Insurance/sendappform',$profileArr,$data);
		}
		
		/* start of codeigniter 4 code */
			public function authenticate()
	{
		$userModel = new User_model();
		
		$row = $userModel->getdata();
		
		
		$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://klibusuat.mykotaklife.com/services/Authentication.svc/Authenticate");
curl_setopt($ch, CURLOPT_POST, 1);

 $vars = '{"User_id":"'.$row[0]->User_id.'","password":"'.$row[0]->password.'","Domain":"'.$row[0]->Domain.'","Source":"'.$row[0]->Source.'"}';
 
curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);




curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type:application/json',
    'Esb_ID:W57ixTbOO+M9NLPRKScUd20LUUMVDxkuQR/Zb53WXQNmIWx7jZ7j9kBZolQ6TT0A',
	'Key:123'
]);

$server_output = curl_exec ($ch);

if (curl_errno($ch)) {
    print "Error: " . curl_error($ch);
    exit();
}

curl_close($ch);

//$server_output = '{ "ChannelDetails": { "ChannelId": null, "ChannelName": null, "SubChannelID": null, "SubChannelName": null }, "TokenDetails": { "TokenId": "70544025-d45f-44a5-a0e2-6fc1869e8e87" }, "UserRoleDetails": { "RoleCode": null, "RoleId": null, "RoleName": null }, "information": { "IsSeller": null, "LicenseExpDate": null, "LicenseNumber": null, "BranchName": null, "UserCode": null, "UserId": null, "UserName": null, "alias": null, "display_name": null, "email_id": null, "first_name": null, "last_name": null, "member_of": null, "user_department": null, "user_designation": null, "BranchCode": null, "ACRMode": null, "IsICROCR": null, "isValidationApplicable": null }, "status": "SUCCESS" }';

//print_r($server_output);

$jsonarr = json_decode($server_output);

//echo "<pre>";
//print_r($jsonarr);

$tokendetails = $jsonarr->TokenDetails;

//print_r($tokendetails);

$tokenid = $tokendetails->TokenId;

if(isset($tokenid) && $tokenid != '')
{
	
		
	if(count($row) > 0 )
	{		
		//print_r($tokenid);
		
		//print_r($row);
		
		$row = $userModel->updatedata($tokenid);

	}

}

		}
		
		
		
		public function PremiumCalculation()
	{
		$userModel = new User_model();
		
		$row = $userModel->getdata();
		
		
		print_r($_REQUEST);
		
		$TokenId = $row[0]->TokenId;
		
		//exit;
		//echo " Premium Calculation";
		
		$RequestInfo = array();
		
		//echo "test0";
		//$RequestInfo['CreationDate'] = new Date('Y-m-dT14:39:09.170');
		
		$RequestInfo['CreationDate'] =  date('c');
		//echo "test11";
		$RequestInfo['SourceName'] = 'ABC';
		//echo "test12";
		$RequestInfo['TransactionId'] = '123';
		
		//echo "test1";
		
		$TransactionData = array();
		
		$TransactionData['UserName'] = $_REQUEST['User_id'];
		
		$TransactionData['Type'] = "CalculatePrem";
		
		$CalculatePremium = array();
		
		//echo "test2";
		
		$date=date_create($_REQUEST['DateofBirth']);
$DateofBirth = date_format($date,"d/m/Y");

$date=date_create($_REQUEST['LoanCommencementdate']);
$LoanCommencementdate = date_format($date,"d/m/Y");

$date=date_create($_REQUEST['SecondaryInsDOB']);
$SecondaryInsDOB = date_format($date,"d/m/Y");
		
		//$CalculatePremium['DateofBirth'] = $_REQUEST['DateofBirth'];
		//$CalculatePremium['DateofBirth'] = "10/10/1990";
		$CalculatePremium['DateofBirth'] = $DateofBirth;
		$CalculatePremium['sumassured'] = $_REQUEST['sumassured'];
		//$CalculatePremium['LoanCommencementdate'] = $_REQUEST['LoanCommencementdate'];
		//$CalculatePremium['LoanCommencementdate'] = "10/01/2023";
		$CalculatePremium['LoanCommencementdate'] = $LoanCommencementdate;
		$CalculatePremium['SecondaryInsDOB'] = $SecondaryInsDOB;
		$CalculatePremium['PolicyTerm'] = $_REQUEST['PolicyTerm'];
		$CalculatePremium['PremiumFunding'] = $_REQUEST['PremiumFunding'];
		$CalculatePremium['TypeOfLoan'] = $_REQUEST['TypeOfLoan'];
		$CalculatePremium['PlanCode'] = $_REQUEST['PlanCode'];
		$CalculatePremium['UserName'] = $_REQUEST['UserName'];
		
		$CalculatePremium['PolicyMod'] = $_REQUEST['PolicyMod'];
		$CalculatePremium['PolicyRole'] = $_REQUEST['PolicyRole'];
		
		//$CalculatePremium['PolicyMod']="Single Premium";
                     //$CalculatePremium['PolicyRole']="Single Life";
		
			//$CalculatePremium['PolicyMod'] = 'Single Premium';
		//$CalculatePremium['PolicyRole'] = 'Single Life';
		//$CalculatePremium['PolicyMod'] = 'Single Premium';
		//$CalculatePremium['PolicyRole'] = 'Single Life';
		//$CalculatePremium['SecondaryInsDOB'] = $_REQUEST['SecondaryInsDOB'];
		$CalculatePremium['SecondaryInsDOB'] = "02/05/1987";
		$CalculatePremium['PrimaryGender'] = $_REQUEST['PrimaryGender'];
		$CalculatePremium['BorrowerStateCode'] = $_REQUEST['BorrowerStateCode'];
		
		$TransactionData['CalculatePremium'] = $CalculatePremium;
		//echo "test3";
		
		$RequestPayload = array();
		
		$RequestPayload['Transactions']['TransactionData'] = $TransactionData;
		$RequestPayload['Transactions']['Type'] = 'CalculatePrem';
		
		//echo "test4";
		$premiumrequest = array();
		
		$premiumrequest['Request']['RequestInfo'] = $RequestInfo;
		
		$premiumrequest['Request']['RequestPayload'] = $RequestPayload;
		
		echo "<pre>";
		//echo "test5";
		print_r($premiumrequest);
		
		$json = json_encode($premiumrequest);
		
		//echo "<br>";
		
		// print_r($json);
		
		
		/* start */
		
		$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://klibusuat.mykotaklife.com/services/FIGService.svc/CalculatePrem");
curl_setopt($ch, CURLOPT_POST, 1);

 
 
curl_setopt($ch, CURLOPT_POSTFIELDS,$json);  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);




curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Esb_TokenID:'.$TokenId.'',
    'Esb_ID:W57ixTbOO+M9NLPRKScUd20LUUMVDxkuQR/Zb53WXQNmIWx7jZ7j9kBZolQ6TT0A',
	'Userid:lo116',
	'Source:ABC'
]);

$server_output = curl_exec ($ch);

if (curl_errno($ch)) {
    print "Error: " . curl_error($ch);
    exit();
}

curl_close($ch);




print_r($server_output);

$jsonarr = json_decode($server_output);

echo "<pre>";

//print_r($jsonarr);

$Transactions = $jsonarr->Response->ResponsePayload->Transactions;

$TransactionData = $Transactions[0]->TransactionData;

print_r($TransactionData);

$IsSuccess = $TransactionData->IsSuccess;

$ResponseCode = $TransactionData->ResponseCode;

$ResponseMessage = $TransactionData->ResponseMessage;

$PremiumInfoDetails = $TransactionData->PremiumInfoDetails;

if($IsSuccess && $ResponseCode == '200' && $ResponseMessage == 'Success')
{
	
	print_r($PremiumInfoDetails);
	
	//$userModel = new UserModel();
		//$userModel
		$row = $userModel->insertpremium($PremiumInfoDetails);
	
}


		
		/* end  */
		
		
	}
		
		public function  SendApp()
	{
		echo "<pre>";
		
		$userModel = new User_model();
		
		$row = $userModel->getdata();
		
		print_r($_REQUEST);   
		
		//exit;
		
		$TokenId = $row[0]->TokenId;
		
		$RequestData = array();
		
		$RequestInfo = array();
		
		$RequestInfo['CreationDate'] =  date('c');
		//echo "test11";
		$RequestInfo['SourceName'] = 'ABC';
		//echo "test12";
		$RequestInfo['TransactionId'] = '123';
		
		$RequestPayload = array();
		
		$TransactionData = array();
		
		$Transactions = array();
		
		$ManualUpload = array();
		
		/* post data starts */
		//$ManualUpload[''] = '';
		
		echo "<pre>";
		
		$ManualUpload['PolicyNo'] = 'GH000132'; $ManualUpload['POLICYMOD'] = $_REQUEST['POLICYMOD'];
		
		//$ManualUpload['TypeOfLoan'] = 'Micro Loans';
		$ManualUpload['TypeOfLoan'] = $_REQUEST['TypeOfLoan'];
     //$ManualUpload['FIName'] = 'Demo Client';
	 
	 //$ManualUpload['FIName'] = 'Demo Client';
	 $ManualUpload['FIName'] = $_REQUEST['FIName'];
     // $ManualUpload['LoanID'] = '210789';
	 $ManualUpload['LoanID'] = $_REQUEST['LoanID'];
     //$ManualUpload['COIIssueStatus'] = 'Y';
	 $ManualUpload['COIIssueStatus'] = $_REQUEST['COIIssueStatus'];
     //$ManualUpload['COINo'] = 'COI123334assa1';
	 $ManualUpload['COINo'] = $_REQUEST['COINo'];
     //$ManualUpload['CustomerID'] = '320304573';
	 $ManualUpload['CustomerID'] = $_REQUEST['CustomerID'];
      // $ManualUpload['BorrowerSalutationDesc'] = 'Mr';
	  
	  $ManualUpload['BorrowerSalutationDesc'] = $_REQUEST['BorrowerSalutationDesc'];
	  
     //$ManualUpload['BorrowerFirstName'] = 'CHINNA';
	 $ManualUpload['BorrowerFirstName'] = $_REQUEST['BorrowerFirstName'];
    //$ManualUpload['BorrowerSurName'] = 'KANNAJI';
	$ManualUpload['BorrowerSurName'] = $_REQUEST['BorrowerSurName'];
    //$ManualUpload['EmailID'] = '';
	$ManualUpload['EmailID'] = $_REQUEST['EmailID'];
   //$ManualUpload['GenderDesc'] = 'M';
   $ManualUpload['GenderDesc'] = $_REQUEST['GenderDesc'];
    //$ManualUpload['BranchName'] = 'Tirupur';
	$ManualUpload['BranchName'] = $_REQUEST['BranchName'];
    //$ManualUpload['BranchCode'] = '932';
	$ManualUpload['BranchCode'] = $_REQUEST['BranchCode'];
  // $ManualUpload['RegOfficeName'] = 'South2';
      $ManualUpload['RegOfficeName'] = $_REQUEST['RegOfficeName'];                           //$ManualUpload['RegionId'] = 0;
																							$ManualUpload['RegionId'] = $_REQUEST['RegionId'];
                                                                                            // $ManualUpload['AddressLine1'] = 'HYDERABAD';
                                                                                            $ManualUpload['AddressLine1'] = $_REQUEST['AddressLine1'];
																							//$ManualUpload['AddressLine2'] = '';
																							$ManualUpload['AddressLine2'] = $_REQUEST['AddressLine2'];
                                                                                             //$ManualUpload['AddressLine3'] = '';
																							 $ManualUpload['AddressLine3'] = $_REQUEST['AddressLine3'];
                                                                                           // $ManualUpload['AddressLine4'] = '';
																						   $ManualUpload['AddressLine4'] = $_REQUEST['AddressLine4'];
                                                                                             //$ManualUpload['AddressLine5'] = '';
																							 $ManualUpload['AddressLine5'] = $_REQUEST['AddressLine5'];
                                                                                             //$ManualUpload['StateName'] = 'West Bengal';
																							 $ManualUpload['StateName'] = $_REQUEST['StateName'];
                                                                                             //$ManualUpload['PinCode'] = '682021';
																							 $ManualUpload['PinCode'] = $_REQUEST['PinCode'];
                                                                                            // $ManualUpload['NomSalutation'] = 'Mr';
                                                                                             $ManualUpload['NomSalutation'] = $_REQUEST['NomSalutation'];
																							 $ManualUpload['NomFirstName'] = $_REQUEST['NomFirstName'];
                                                                                             $ManualUpload['NomSurname'] = $_REQUEST['NomSurname'];
                                                                                             $ManualUpload['NomDOB'] = '2022-02-03T06:49:44';
																							 //$ManualUpload['NomDOB'] = $_REQUEST['NomDOB'];
                                                                                             //$ManualUpload['NomGender'] = 'M';
																							 $ManualUpload['NomGender'] = $_REQUEST['NomGender'];
                                                                                             //$ManualUpload['NomRelation'] = 'Father';
																							 $ManualUpload['NomRelation'] = $_REQUEST['NomRelation'];
                                                                                             $ManualUpload['NomPcnt'] = $_REQUEST['NomPcnt'];
                                                                                             //$ManualUpload['AppointeeSalutationDesc'] = '';
                                                                                             $ManualUpload['AppointeeSalutationDesc'] = $_REQUEST['AppointeeSalutationDesc'];
																							 //$ManualUpload['AppointeeFirstName'] = '';
                                                                                             $ManualUpload['AppointeeFirstName'] = $_REQUEST['AppointeeFirstName'];
																							 $ManualUpload['AppointeeSurName'] = $_REQUEST['AppointeeSurName'];
                                                                                             $ManualUpload['AppointeeGenderDesc'] = $_REQUEST['AppointeeGenderDesc'];
                                                                                             $ManualUpload['AppointeeMartialStatusDesc'] = $_REQUEST['AppointeeMartialStatusDesc'];
                                                                                              $ManualUpload['AppointeeDOB'] = '2022-02-03T06:49:44';
                                                                                             //$ManualUpload['AppointeeDOB'] = $_REQUEST['AppointeeDOB'];
																							 //$ManualUpload['AppointeeID'] = '';
																							 $ManualUpload['AppointeeID'] = $_REQUEST['AppointeeID'];
                                                                                             //$ManualUpload['AppointeeRelationDesc'] = '';
																							 $ManualUpload['AppointeeRelationDesc'] = $_REQUEST['AppointeeRelationDesc'];
                                                                                             //$ManualUpload['ProposerSalutationDesc'] = 'Mr';
																							 $ManualUpload['ProposerSalutationDesc'] = $_REQUEST['ProposerSalutationDesc'];
                                                                                             //$ManualUpload['ProposerFirstName'] = 'Jaykumar';
																							 $ManualUpload['ProposerFirstName'] = $_REQUEST['ProposerFirstName'];
                                                                                             //$ManualUpload['ProposerSurName'] = 'Nimbalkar';
																							 $ManualUpload['ProposerSurName'] = $_REQUEST['ProposerSurName'];
                                                                                             //$ManualUpload['ProposerGenderDesc'] = 'Male';
																							 $ManualUpload['ProposerGenderDesc'] = $_REQUEST['ProposerGenderDesc'];
                                                                                             //$ManualUpload['ProposerMartialStatusDesc'] = 'single';
                                                                                             $ManualUpload['ProposerMartialStatusDesc'] = $_REQUEST['ProposerMartialStatusDesc'];
																							 $ManualUpload['ProposerDOB'] = '2000-12-28T14:04:19+05:30';
																							// $ManualUpload['ProposerDOB'] = $_REQUEST['ProposerDOB'];
                                                                                             //$ManualUpload['ProposerID'] = '';
																							 $ManualUpload['ProposerID'] = $_REQUEST['ProposerID'];
                                                                                             //$ManualUpload['ProposerRelation'] = 'son';
																							 $ManualUpload['ProposerRelation'] = $_REQUEST['ProposerRelation'];
                                                                                             //$ManualUpload['SecSalutationDesc'] = '';
																							 $ManualUpload['SecSalutationDesc'] = $_REQUEST['SecSalutationDesc'];
                                                                                             //$ManualUpload['SecondaryMemberFirstName'] = '';
																							 $ManualUpload['SecondaryMemberFirstName'] = $_REQUEST['SecondaryMemberFirstName'];
                                                                                             //$ManualUpload['SecondaryMemberSirName'] = '';
																							 $ManualUpload['SecondaryMemberSirName'] = $_REQUEST['SecondaryMemberSirName'];
                                                                                             //$ManualUpload['SecCoverAmt'] = 0;
																							 $ManualUpload['SecCoverAmt'] = $_REQUEST['SecCoverAmt'];
                                                                                             //$ManualUpload['SecondaryMemID'] = '';
																							 $ManualUpload['SecondaryMemID'] = $_REQUEST['SecondaryMemID'];
                                                                                             //$ManualUpload['SecCOINo'] = '';
																							 $ManualUpload['SecCOINo'] = $_REQUEST['SecCOINo'];
                                                                                             //$ManualUpload['SecLoanID'] = '';
																							 $ManualUpload['SecLoanID'] = $_REQUEST['SecLoanID'];
                                                                                             //$ManualUpload['IsDOGHSubmitted'] = 'Y';
                                                                                             $ManualUpload['IsDOGHSubmitted'] = $_REQUEST['IsDOGHSubmitted'];
																							 $ManualUpload['UTRNo'] = $_REQUEST['UTRNo'];
                                                                                             $ManualUpload['Remarks'] = $_REQUEST['Remarks'];
                                                                                             //$ManualUpload['LoanTypeDesc'] = 'Micro Loans';
																							 $ManualUpload['LoanTypeDesc'] = $_REQUEST['LoanTypeDesc'];
                                                                                             $ManualUpload['DateOfCommencement'] = '2022-02-03T06:49:44';
																							 //$ManualUpload['DateOfCommencement'] = $_REQUEST['DateOfCommencement'];
                                                                                             $ManualUpload['DateOfBirth'] = '2022-02-03T06:49:44';
																							 //$ManualUpload['DateOfBirth'] = $_REQUEST['DateOfBirth'];
                                                                                             //$ManualUpload['SantionAmt'] = 100000;
																							 $ManualUpload['SantionAmt'] = $_REQUEST['SantionAmt'];
                                                                                             //$ManualUpload['IsFundedBySIB'] = 'Y';
																							 $ManualUpload['IsFundedBySIB'] = $_REQUEST['IsFundedBySIB'];
                                                                                             //$ManualUpload['LoanTenureYrs'] = '1';
																							 $ManualUpload['LoanTenureYrs'] = $_REQUEST['LoanTenureYrs'];
                                                                                             //$ManualUpload['RoleAssociated'] = 'Single Life';
																							 $ManualUpload['RoleAssociated'] = $_REQUEST['RoleAssociated'];
                                                                                             $ManualUpload['SecInsuredDOB'] = '2022-02-03T06:49:44';
																							//$ManualUpload['SecInsuredDOB'] = $_REQUEST['SecInsuredDOB'];
                                                                                             //$ManualUpload['SecondaryInsAge'] = 0;
																							 $ManualUpload['SecondaryInsAge'] = $_REQUEST['SecondaryInsAge'];
                                                                                             //$ManualUpload['SecondaryKotakPremium'] = '0';
																							 $ManualUpload['SecondaryKotakPremium'] = $_REQUEST['SecondaryKotakPremium'];
                                                                                             //$ManualUpload['TotalTenure'] = '1';
																							 $ManualUpload['TotalTenure'] = $_REQUEST['TotalTenure'];
                                                                                             //$ManualUpload['MobileNo'] = '4545454545';
                                                                                             $ManualUpload['MobileNo'] = $_REQUEST['MobileNo'];
																							 //$ManualUpload['AgeAtCommencement'] = '';
																							 $ManualUpload['AgeAtCommencement'] = $_REQUEST['AgeAtCommencement'];
                                                                                             //$ManualUpload['JobID'] = 715358;
																							 $ManualUpload['JobID'] = $_REQUEST['JobID'];
                                                                                             //$ManualUpload['EmployeeCode'] ='ER2345';
																							 $ManualUpload['EmployeeCode'] = $_REQUEST['EmployeeCode'];
                                                                                             //$ManualUpload['EmployeeName'] ='';
																							 $ManualUpload['EmployeeName'] = $_REQUEST['EmployeeName'];
                                                                                             //$ManualUpload['AADHARReferenceNo'] ='';
																							 $ManualUpload['AADHARReferenceNo'] = $_REQUEST['AADHARReferenceNo'];
		
		/* post data ends */
		
		$TransactionData['UserName'] = 'lo116';
		
		$TransactionData['JobID'] = '715358';
		
		$TransactionData['ManualUpload'] = $ManualUpload;
		
		$Transactions['TransactionData'] = $TransactionData;
		
		//$Type = array();
		
		$Transactions['Type'] = 'SendAppData';
		
		$RequestPayload['Transactions'] = $Transactions;
		
		$RequestData['Request']['RequestInfo'] = $RequestInfo;
		
		$RequestData['Request']['RequestPayload'] = $RequestPayload;
		
		
		print_r($RequestData);
		
		
		$json = json_encode($RequestData);
		
		//echo "<br>";
		
		// print_r($json);
		
		
		/* start */
		
		$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://klibusuat.mykotaklife.com/services/FIGService.svc/SendAppData");
curl_setopt($ch, CURLOPT_POST, 1);

 
 
curl_setopt($ch, CURLOPT_POSTFIELDS,$json);  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);




curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Esb_TokenID:'.$TokenId.'',
    'Esb_ID:W57ixTbOO+M9NLPRKScUd20LUUMVDxkuQR/Zb53WXQNmIWx7jZ7j9kBZolQ6TT0A',
	'Userid:lo116',
	'Source:ABC'
]);

$server_output = curl_exec ($ch);

if (curl_errno($ch)) {
    print "Error: " . curl_error($ch);
    exit();
}

curl_close($ch);




print_r($server_output);

$jsonarr = json_decode($server_output);

echo "<pre>";

print_r($jsonarr);

	
			
}
	
	public function  SendApp2()
	{
		echo "Send App";
		
		
		print_r($_REQUEST);
		
		$userModel = new User_model();
		
		$row = $userModel->getdata();
		
		//print_r($row[0]->TokenId);
		
		$TokenId = $row[0]->TokenId;
		
		$RequestData = array();
		
		$RequestInfo = array();
		
		$RequestInfo['CreationDate'] =  date('c');
		//echo "test11";
		$RequestInfo['SourceName'] = 'ABC';
		//echo "test12";
		$RequestInfo['TransactionId'] = '123';
		
		$RequestPayload = array();
		
		$TransactionData = array();
		
		$Transactions = array();
		
		$ManualUpload = array();
		
		/* post data starts */
		//$ManualUpload[''] = '';
		
		echo "<pre>";
		
		$ManualUpload['PolicyNo'] = 'GH000132'; $ManualUpload['POLICYMOD'] = $_REQUEST['POLICYMOD'];
		
		$ManualUpload['TypeOfLoan'] = $_REQUEST['TypeOfLoan'];
     $ManualUpload['FIName'] = $_REQUEST['FIName'];
     $ManualUpload['LoanID'] = $_REQUEST['LoanID'];
     $ManualUpload['COIIssueStatus'] = $_REQUEST['COIIssueStatus'];
     $ManualUpload['COINo'] = $_REQUEST['COINo'];
     $ManualUpload['CustomerID'] = $_REQUEST['CustomerID'];
      $ManualUpload['BorrowerSalutationDesc'] = $_REQUEST['BorrowerSalutationDesc'];
     $ManualUpload['BorrowerFirstName'] = $_REQUEST['BorrowerFirstName'];
    $ManualUpload['BorrowerSurName'] = $_REQUEST['BorrowerSurName'];
    $ManualUpload['EmailID'] = $_REQUEST['EmailID'];
   $ManualUpload['GenderDesc'] = $_REQUEST['GenderDesc'];
    $ManualUpload['BranchName'] = $_REQUEST['BranchName'];
    $ManualUpload['BranchCode'] = $_REQUEST['BranchCode'];
  $ManualUpload['RegOfficeName'] = $_REQUEST['RegOfficeName'];
                                                                                             $ManualUpload['RegionId'] = $_REQUEST['RegionId'];
                                                                                             $ManualUpload['AddressLine1'] = $_REQUEST['AddressLine1'];
                                                                                             $ManualUpload['AddressLine2'] = $_REQUEST['AddressLine2'];
                                                                                             $ManualUpload['AddressLine3'] = $_REQUEST['AddressLine3'];
                                                                                            $ManualUpload['AddressLine4'] = $_REQUEST['AddressLine4'];
                                                                                             $ManualUpload['AddressLine5'] = $_REQUEST['AddressLine5'];
                                                                                             $ManualUpload['StateName'] = $_REQUEST['StateName'];
                                                                                             $ManualUpload['PinCode'] = $_REQUEST['PinCode'];
                                                                                             $ManualUpload['NomSalutation'] = $_REQUEST['NomSalutation'];
                                                                                             $ManualUpload['NomFirstName'] = $_REQUEST['NomFirstName'];
                                                                                             $ManualUpload['NomSurname'] = $_REQUEST['NomSurname'];
                                                                                             $ManualUpload['NomDOB'] = $_REQUEST['NomDOB'];
                                                                                             $ManualUpload['NomGender'] = $_REQUEST['NomGender'];
                                                                                             $ManualUpload['NomRelation'] = $_REQUEST['NomRelation'];
                                                                                             $ManualUpload['NomPcnt'] = $_REQUEST['NomPcnt'];;
                                                                                             $ManualUpload['AppointeeSalutationDesc'] = $_REQUEST['AppointeeSalutationDesc'];
                                                                                             $ManualUpload['AppointeeFirstName'] = $_REQUEST['AppointeeFirstName'];
                                                                                             $ManualUpload['AppointeeSurName'] = $_REQUEST['AppointeeSurName'];
                                                                                             $ManualUpload['AppointeeGenderDesc'] = $_REQUEST['AppointeeGenderDesc'];
                                                                                             $ManualUpload['AppointeeMartialStatusDesc'] = $_REQUEST['AppointeeMartialStatusDesc'];
                                                                                             $ManualUpload['AppointeeDOB'] = $_REQUEST['AppointeeDOB'];
                                                                                             $ManualUpload['AppointeeID'] = $_REQUEST['AppointeeID'];
                                                                                             $ManualUpload['AppointeeRelationDesc'] = $_REQUEST['AppointeeRelationDesc'];
                                                                                             $ManualUpload['ProposerSalutationDesc'] = $_REQUEST['ProposerSalutationDesc'];
                                                                                             $ManualUpload['ProposerFirstName'] = $_REQUEST['ProposerFirstName'];
                                                                                             $ManualUpload['ProposerSurName'] = $_REQUEST['ProposerSurName'];
                                                                                             $ManualUpload['ProposerGenderDesc'] = $_REQUEST['ProposerGenderDesc'];
                                                                                             $ManualUpload['ProposerMartialStatusDesc'] = $_REQUEST['ProposerMartialStatusDesc'];
                                                                                             $ManualUpload['ProposerDOB'] = $_REQUEST['ProposerDOB'];
                                                                                             $ManualUpload['ProposerID'] = $_REQUEST['ProposerID'];
                                                                                             $ManualUpload['ProposerRelation'] = $_REQUEST['ProposerRelation'];
                                                                                             $ManualUpload['SecSalutationDesc'] = $_REQUEST['SecSalutationDesc'];
                                                                                             $ManualUpload['SecondaryMemberFirstName'] = $_REQUEST['SecondaryMemberFirstName'];
                                                                                             $ManualUpload['SecondaryMemberSirName'] = $_REQUEST['SecondaryMemberSirName'];
                                                                                             $ManualUpload['SecCoverAmt'] = $_REQUEST['SecCoverAmt'];
                                                                                             $ManualUpload['SecondaryMemID'] = $_REQUEST['SecondaryMemID'];
                                                                                             $ManualUpload['SecCOINo'] = $_REQUEST['SecCOINo'];
                                                                                             $ManualUpload['SecLoanID'] = $_REQUEST['SecLoanID'];
                                                                                             $ManualUpload['IsDOGHSubmitted'] = $_REQUEST['IsDOGHSubmitted'];
                                                                                             $ManualUpload['UTRNo'] = $_REQUEST['UTRNo'];
                                                                                             $ManualUpload['Remarks'] = $_REQUEST['Remarks'];
                                                                                             $ManualUpload['LoanTypeDesc'] = $_REQUEST['LoanTypeDesc'];
                                                                                             $ManualUpload['DateOfCommencement'] = $_REQUEST['DateOfCommencement'];
                                                                                             $ManualUpload['DateOfBirth'] = $_REQUEST['DateOfBirth'];
                                                                                             $ManualUpload['SantionAmt'] = $_REQUEST['SantionAmt'];
                                                                                             $ManualUpload['IsFundedBySIB'] = $_REQUEST['IsFundedBySIB'];
                                                                                             $ManualUpload['LoanTenureYrs'] = $_REQUEST['LoanTenureYrs'];
                                                                                             $ManualUpload['RoleAssociated'] = $_REQUEST['RoleAssociated'];
                                                                                             $ManualUpload['SecInsuredDOB'] = $_REQUEST['SecInsuredDOB'];
                                                                                             $ManualUpload['SecondaryInsAge'] = $_REQUEST['SecondaryInsAge'];
                                                                                             $ManualUpload['SecondaryKotakPremium'] = $_REQUEST['SecondaryKotakPremium'];
                                                                                             $ManualUpload['TotalTenure'] = $_REQUEST['TotalTenure'];
                                                                                             $ManualUpload['MobileNo'] = $_REQUEST['MobileNo'];
                                                                                             $ManualUpload['AgeAtCommencement'] = $_REQUEST['AgeAtCommencement'];
                                                                                             $ManualUpload['JobID'] = $_REQUEST['JobID'];
                                                                                             $ManualUpload['EmployeeCode'] = $_REQUEST['EmployeeCode'];
                                                                                             $ManualUpload['EmployeeName'] = $_REQUEST['EmployeeName'];
                                                                                             $ManualUpload['AADHARReferenceNo'] = $_REQUEST['AADHARReferenceNo'];
		
		/* post data ends */
		
		$TransactionData['UserName'] = 'lo116';
		
		$TransactionData['JobID'] = '715358';
		
		$TransactionData['ManualUpload'] = $ManualUpload;
		
		$Transactions['TransactionData'] = $TransactionData;
		
		//$Type = array();
		
		$Transactions['Type'] = 'SendAppData';
		
		$RequestPayload['Transactions'] = $Transactions;
		
		$RequestData['Request']['RequestInfo'] = $RequestInfo;
		
		$RequestData['Request']['RequestPayload'] = $RequestPayload;
		
		echo "<pre>";
		print_r($RequestData);
		
		
		$json = json_encode($RequestData);
		
		//echo "<br>";
		
		// print_r($json);
		
		
		/* start */
		
		$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://klibusuat.mykotaklife.com/services/FIGService.svc/SendAppData");
curl_setopt($ch, CURLOPT_POST, 1);

 
 
curl_setopt($ch, CURLOPT_POSTFIELDS,$json);  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);




curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Esb_TokenID:'.$TokenId.'',
    'Esb_ID:W57ixTbOO+M9NLPRKScUd20LUUMVDxkuQR/Zb53WXQNmIWx7jZ7j9kBZolQ6TT0A',
	'Userid:lo116',
	'Source:ABC'
]);

$server_output = curl_exec ($ch);

if (curl_errno($ch)) {
    print "Error: " . curl_error($ch);
    exit();
}

curl_close($ch);




print_r($server_output);

$jsonarr = json_decode($server_output);

echo "<pre>";

print_r($jsonarr);

	
			
}


public function GetApp()
	{
		echo "GetApp";
		

		
		$userModel = new User_model();
		
		$row = $userModel->getdata();
		
		//print_r($row[0]->TokenId);
		
		$TokenId = $row[0]->TokenId;
		
		$TransactionData = array();
		
		$Transactions = array();
		
		
		
		$TransactionData['UserName']='lo116';
		
		$TransactionData['ApplicationID']='1885998';
		
		$TransactionData['Type']='GetAppData';
		
		$Transactions['TransactionData'] = $TransactionData;
		
		print_r($TransactionData);
		$RequestInfo = array();
		$RequestPayload = array();
		
		$RequestInfo['CreationDate'] = '2022-12-28T09:51:11+05:30';
		$RequestInfo['SourceName'] = 'ABC';
		
		$RequestInfo['TransactionId'] = '1885998';
		
		$RequestPayload = array();
		
		$RequestPayload['Transactions'] = $Transactions;
		
		$RequestPayload['Type'] = 'GetAppData';
		
				$Request['Request']['RequestInfo'] = $RequestInfo;
				
				$Request['Request']['RequestPayload'] = $RequestPayload;
		
		$json = json_encode($Request);
		
		echo "<pre>";
		
		 print_r($Request);
		
		
		/* start */
		
		$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://klibusuat.mykotaklife.com/services/FIGService.svc/GetAppData");
curl_setopt($ch, CURLOPT_POST, 1);

 
 
curl_setopt($ch, CURLOPT_POSTFIELDS,$json);  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);




curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Esb_TokenID:'.$TokenId.'',
    'Esb_ID:W57ixTbOO+M9NLPRKScUd20LUUMVDxkuQR/Zb53WXQNmIWx7jZ7j9kBZolQ6TT0A',
	'Userid:lo116',
	'Source:ABC'
]);

$server_output = curl_exec ($ch);

if (curl_errno($ch)) {
    print "Error: " . curl_error($ch);
    exit();
}

curl_close($ch);




print_r($server_output);

$jsonarr = json_decode($server_output);

echo "<pre>";

print_r($jsonarr);
		
	}
	public function  SendApp3()
	{
		echo "Send App";
		
		$userModel = new User_model();
		
		$row = $userModel->getdata();
		
		print_r($_REQUEST);   
		
		//exit;
		
		$TokenId = $row[0]->TokenId;
		
		$RequestData = array();
		
		$RequestInfo = array();
		
		$RequestInfo['CreationDate'] =  date('c');
		//echo "test11";
		$RequestInfo['SourceName'] = 'ABC';
		//echo "test12";
		$RequestInfo['TransactionId'] = '123';
		
		$RequestPayload = array();
		
		$TransactionData = array();
		
		$Transactions = array();
		
		$ManualUpload = array();
		
		/* post data starts */
		//$ManualUpload[''] = '';
		
		echo "<pre>";
		
		$ManualUpload['PolicyNo'] = 'GH000132'; $ManualUpload['POLICYMOD'] = 'Single Premium';
		
		$ManualUpload['TypeOfLoan'] = 'Micro Loans';
     $ManualUpload['FIName'] = 'Demo Client';
     $ManualUpload['LoanID'] = '210789';
     $ManualUpload['COIIssueStatus'] = 'Y';
     $ManualUpload['COINo'] = 'COI123334assa1';
     $ManualUpload['CustomerID'] = '320304573';
      $ManualUpload['BorrowerSalutationDesc'] = 'Mr';
     $ManualUpload['BorrowerFirstName'] = 'CHINNA';
    $ManualUpload['BorrowerSurName'] = 'KANNAJI';
    $ManualUpload['EmailID'] = '';
   $ManualUpload['GenderDesc'] = 'M';
    $ManualUpload['BranchName'] = 'Tirupur';
    $ManualUpload['BranchCode'] = '932';
  $ManualUpload['RegOfficeName'] = 'South2';
                                                                                             $ManualUpload['RegionId'] = 0;
                                                                                             $ManualUpload['AddressLine1'] = 'HYDERABAD';
                                                                                             $ManualUpload['AddressLine2'] = '';
                                                                                             $ManualUpload['AddressLine3'] = '';
                                                                                            $ManualUpload['AddressLine4'] = '';
                                                                                             $ManualUpload['AddressLine5'] = '';
                                                                                             $ManualUpload['StateName'] = 'West Bengal';
                                                                                             $ManualUpload['PinCode'] = '682021';
                                                                                             $ManualUpload['NomSalutation'] = 'Mr';
                                                                                             $ManualUpload['NomFirstName'] = 'app';
                                                                                             $ManualUpload['NomSurname'] = 'app';
                                                                                             $ManualUpload['NomDOB'] = '2022-02-03T06:49:44';
                                                                                             $ManualUpload['NomGender'] = 'M';
                                                                                             $ManualUpload['NomRelation'] = 'Father';
                                                                                             $ManualUpload['NomPcnt'] = 100;
                                                                                             $ManualUpload['AppointeeSalutationDesc'] = '';
                                                                                             $ManualUpload['AppointeeFirstName'] = '';
                                                                                             $ManualUpload['AppointeeSurName'] = '';
                                                                                             $ManualUpload['AppointeeGenderDesc'] = '';
                                                                                             $ManualUpload['AppointeeMartialStatusDesc'] = '';
                                                                                             $ManualUpload['AppointeeDOB'] = '2022-02-03T06:49:44';
                                                                                             $ManualUpload['AppointeeID'] = '';
                                                                                             $ManualUpload['AppointeeRelationDesc'] = '';
                                                                                             $ManualUpload['ProposerSalutationDesc'] = 'Mr';
                                                                                             $ManualUpload['ProposerFirstName'] = 'Jaykumar';
                                                                                             $ManualUpload['ProposerSurName'] = 'Nimbalkar';
                                                                                             $ManualUpload['ProposerGenderDesc'] = 'Male';
                                                                                             $ManualUpload['ProposerMartialStatusDesc'] = 'single';
                                                                                             $ManualUpload['ProposerDOB'] = '2000-12-28T14:04:19+05:30';
                                                                                             $ManualUpload['ProposerID'] = '';
                                                                                             $ManualUpload['ProposerRelation'] = 'son';
                                                                                             $ManualUpload['SecSalutationDesc'] = '';
                                                                                             $ManualUpload['SecondaryMemberFirstName'] = '';
                                                                                             $ManualUpload['SecondaryMemberSirName'] = '';
                                                                                             $ManualUpload['SecCoverAmt'] = 0;
                                                                                             $ManualUpload['SecondaryMemID'] = '';
                                                                                             $ManualUpload['SecCOINo'] = '';
                                                                                             $ManualUpload['SecLoanID'] = '';
                                                                                             $ManualUpload['IsDOGHSubmitted'] = 'Y';
                                                                                             $ManualUpload['UTRNo'] = '10042017';
                                                                                             $ManualUpload['Remarks'] = '';
                                                                                             $ManualUpload['LoanTypeDesc'] = 'Micro Loans';
                                                                                             $ManualUpload['DateOfCommencement'] = '2022-02-03T06:49:44';
                                                                                             $ManualUpload['DateOfBirth'] = '2022-02-03T06:49:44';
                                                                                             $ManualUpload['SantionAmt'] = 100000;
                                                                                             $ManualUpload['IsFundedBySIB'] = 'Y';
                                                                                             $ManualUpload['LoanTenureYrs'] = '1';
                                                                                             $ManualUpload['RoleAssociated'] = 'Single Life';
                                                                                             $ManualUpload['SecInsuredDOB'] = '2022-02-03T06:49:44';
                                                                                             $ManualUpload['SecondaryInsAge'] = 0;
                                                                                             $ManualUpload['SecondaryKotakPremium'] = '0';
                                                                                             $ManualUpload['TotalTenure'] = '1';
                                                                                             $ManualUpload['MobileNo'] = '4545454545';
                                                                                             $ManualUpload['AgeAtCommencement'] = '';
                                                                                             $ManualUpload['JobID'] = 715358;
                                                                                             $ManualUpload['EmployeeCode'] ='ER2345';
                                                                                             $ManualUpload['EmployeeName'] ='';
                                                                                             $ManualUpload['AADHARReferenceNo'] ='';
		
		/* post data ends */
		
		$TransactionData['UserName'] = 'lo116';
		
		$TransactionData['JobID'] = '715358';
		
		$TransactionData['ManualUpload'] = $ManualUpload;
		
		$Transactions['TransactionData'] = $TransactionData;
		
		//$Type = array();
		
		$Transactions['Type'] = 'SendAppData';
		
		$RequestPayload['Transactions'] = $Transactions;
		
		$RequestData['Request']['RequestInfo'] = $RequestInfo;
		
		$RequestData['Request']['RequestPayload'] = $RequestPayload;
		
		
		print_r($RequestData);
		
		
		$json = json_encode($RequestData);
		
		//echo "<br>";
		
		// print_r($json);
		
		
		/* start */
		
		$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://klibusuat.mykotaklife.com/services/FIGService.svc/SendAppData");
curl_setopt($ch, CURLOPT_POST, 1);

 
 
curl_setopt($ch, CURLOPT_POSTFIELDS,$json);  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);




curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Esb_TokenID:'.$TokenId.'',
    'Esb_ID:W57ixTbOO+M9NLPRKScUd20LUUMVDxkuQR/Zb53WXQNmIWx7jZ7j9kBZolQ6TT0A',
	'Userid:lo116',
	'Source:ABC'
]);

$server_output = curl_exec ($ch);

if (curl_errno($ch)) {
    print "Error: " . curl_error($ch);
    exit();
}

curl_close($ch);




print_r($server_output);

$jsonarr = json_decode($server_output);

echo "<pre>";

print_r($jsonarr);

	
			
}

	
	public function GetCOI()
	{
		
		echo "GetCOI";
		
		
		$userModel = new User_model();
		
		$row = $userModel->getdata();
		
		//print_r($row[0]->TokenId);
		
		$TokenId = $row[0]->TokenId;
		
		$TransactionData = array();
		
		$Transactions = array();
		
		
		
		$TransactionData['UserName']='lo116';
		
		$TransactionData['ApplicationID']='1885998';
		
		
		
		$Transactions['TransactionData'] = $TransactionData;
		
		$Transactions['Type']='GetCOI';
		
		//print_r($TransactionData);
		$RequestInfo = array();
		$RequestPayload = array();  
		
		$RequestInfo['CreationDate'] = '2015-12-11';
		$RequestInfo['SourceName'] = 'ABC';
		
		$RequestInfo['TransactionId'] = '123';
		
		$RequestPayload = array();
		
		$RequestPayload['Transactions'][] = $Transactions;
		
		//$RequestPayload['Type'] = 'GetCOI';
		
				$Request['Request']['RequestInfo'] = $RequestInfo;
				
				$Request['Request']['RequestPayload'] = $RequestPayload;
		
		$json = json_encode($Request);
		
		echo "<pre>";
		
		// print_r($json);
		
		
		/* start */
		
		$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://klibusuat.mykotaklife.com/services/FIGService.svc/GetCOI");
curl_setopt($ch, CURLOPT_POST, 1);

 
 
curl_setopt($ch, CURLOPT_POSTFIELDS,$json);  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);




curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Esb_TokenID:'.$TokenId.'',
    'Esb_ID:W57ixTbOO+M9NLPRKScUd20LUUMVDxkuQR/Zb53WXQNmIWx7jZ7j9kBZolQ6TT0A',
	'Userid:lo116',
	'Source:ABC'
]);

$server_output = curl_exec ($ch);

if (curl_errno($ch)) {
    print "Error: " . curl_error($ch);
    exit();
}

curl_close($ch);




print_r($server_output);

$jsonarr = json_decode($server_output);

echo "<pre>";

print_r($jsonarr);

$response = array();

$responseinfo = array();

$ResponsePayload = array();

$Transactions = array();

$TransactionData = array();



$response = $jsonarr->Response;

$responseinfo = $response->ResponseInfo;

$ResponsePayload = $response->ResponsePayload;


$Transactions = $ResponsePayload->Transactions;

$TransactionData = $Transactions[0]->TransactionData;

 $Type = $Transactions[0]->Type;

$output = $TransactionData->output;

echo "<Br>".$output;


$this->basetopdf($output);

//print_r($TransactionData);

	}
	

public function basetopdf($base64)
	{
		/*echo "<br> Test1";
		$pdf_base64 = $base64;
//Get File content from txt file
$pdf_base64_handler = $pdf_base64;

echo "Test2";
*/
$pdf_content = $base64;

//echo "<br> Test 3";
//fclose ($pdf_base64_handler);
//Decode pdf content
$pdf_decoded = base64_decode ($pdf_content);
//Write data back to pdf file

 $pdfname = "Test_".time().".pdf";
$pdf = fopen ($pdfname,'w');
//echo "Test4";
fwrite ($pdf,$pdf_decoded);
//close output file
fclose ($pdf);
//echo 'Done';
		
	}
	
	
	
	public function GetDOGH()
	{
		echo "GetDOGH";
		
		$userModel = new User_model();
		
		$row = $userModel->getdata();
		
		//print_r($row[0]->TokenId);
		
		$TokenId = $row[0]->TokenId;
		
		$TransactionData = array();
		
		$Transactions = array();
		
		
		
		$TransactionData['UserName']='lo116';
		
		$TransactionData['ApplicationID']='1885998';
		
		
		
		$Transactions['TransactionData'] = $TransactionData;
		
		$Transactions['Type']='GetCOI';
		
		print_r($TransactionData);
		$RequestInfo = array();
		$RequestPayload = array();
		
		$RequestInfo['CreationDate'] = '2015-12-11';
		$RequestInfo['SourceName'] = 'FIG';
		
		$RequestInfo['TransactionId'] = '123';
		
		$RequestPayload = array();
		
		$RequestPayload['Transactions'][] = $Transactions;
		
		//$RequestPayload['Type'] = 'GetCOI';
		
				$Request['Request']['RequestInfo'] = $RequestInfo;
				
				$Request['Request']['RequestPayload'] = $RequestPayload;
		
		$json = json_encode($Request);
		
		echo "<pre>";
		
		 print_r($json);
		
		
		/* start */
		
		$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://klibusuat.mykotaklife.com/services/FIGService.svc/GetDOGH");
curl_setopt($ch, CURLOPT_POST, 1);

 
 
curl_setopt($ch, CURLOPT_POSTFIELDS,$json);  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);




curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Esb_TokenID:'.$TokenId.'',
    'Esb_ID:W57ixTbOO+M9NLPRKScUd20LUUMVDxkuQR/Zb53WXQNmIWx7jZ7j9kBZolQ6TT0A',
	'Userid:lo116',
	'Source:ABC'
]);

$server_output = curl_exec ($ch);

if (curl_errno($ch)) {
    print "Error: " . curl_error($ch);
    exit();
}

curl_close($ch);




print_r($server_output);

$jsonarr = json_decode($server_output);

echo "<pre>";

print_r($jsonarr);

$response = array();

$responseinfo = array();

$ResponsePayload = array();

$Transactions = array();

$TransactionData = array();


echo "test1";
$response = $jsonarr->Response;
echo "test2";
$responseinfo = $response->ResponseInfo;
echo "test3";
$ResponsePayload = $response->ResponsePayload;

echo "test4";
$Transactions = $ResponsePayload->Transactions;
echo "test5";
$TransactionData = $Transactions[0]->TransactionData;
echo "test6";

print_r($TransactionData);
 //$Type = $Transactions[0]->Type;
echo "test7";
echo $output = $TransactionData[0]->output;
echo "test8";
$this->basetopdf($output);
echo "test9";

		
	}
	
	
	public function GetCOIDOGH()
	{
		echo "GetCOIDOGH";
		
				
		$userModel = new User_model();
		
		$row = $userModel->getdata();
		
		//print_r($row[0]->TokenId);
		
		$TokenId = $row[0]->TokenId;
		
		$TransactionData = array();
		
		$Transactions = array();
		
		
		
		$TransactionData['UserName']='lo116';
		
		$TransactionData['ApplicationID']='1885998';
		
		
		
		$Transactions['TransactionData'] = $TransactionData;
		
		$Transactions['Type']='GetCOI';
		
		print_r($TransactionData);
		$RequestInfo = array();
		$RequestPayload = array();
		
		$RequestInfo['CreationDate'] = '2015-12-11';
		$RequestInfo['SourceName'] = 'FIG';
		
		$RequestInfo['TransactionId'] = '123';
		
		$RequestPayload = array();
		
		$RequestPayload['Transactions'][] = $Transactions;
		
		//$RequestPayload['Type'] = 'GetCOI';
		
				$Request['Request']['RequestInfo'] = $RequestInfo;
				
				$Request['Request']['RequestPayload'] = $RequestPayload;
		
		$json = json_encode($Request);
		
		echo "<pre>";
		
		 print_r($json);
		
		
		/* start */
		
		$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://klibusuat.mykotaklife.com/services/FIGService.svc/GetCOIDOGH");
curl_setopt($ch, CURLOPT_POST, 1);

 
 
curl_setopt($ch, CURLOPT_POSTFIELDS,$json);  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);




curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Esb_TokenID:'.$TokenId.'',
    'Esb_ID:W57ixTbOO+M9NLPRKScUd20LUUMVDxkuQR/Zb53WXQNmIWx7jZ7j9kBZolQ6TT0A',
	'Userid:lo116',
	'Source:ABC'
]);

$server_output = curl_exec ($ch);

if (curl_errno($ch)) {
    print "Error: " . curl_error($ch);
    exit();
}

curl_close($ch);




print_r($server_output);

$jsonarr = json_decode($server_output);

echo "<pre>";

print_r($jsonarr);


$response = array();

$responseinfo = array();

$ResponsePayload = array();

$Transactions = array();

$TransactionData = array();

echo "Test34";

$response = $jsonarr->Response;
echo 'test4';
//$responseinfo = $response->ResponseInfo;
echo 'test5';
$ResponsePayload = $response->ResponsePayload;

echo "test6";
$Transactions = $ResponsePayload->Transactions;
echo "test44";
$TransactionData = $Transactions[0]->TransactionData;
echo "newtest";
 //$Type = $Transactions[0]->Type;
 
 print_r($TransactionData);

echo $output = $TransactionData->output;

echo "test55";

$this->basetopdf($output);
	echo "test76";	
	}
	
	public function CancelCOI()
	{
		
		echo "CancelCOI";
		
	}
	

}
		
?>