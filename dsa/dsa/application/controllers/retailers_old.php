<?php
date_default_timezone_set('asia/kolkata');
defined('BASEPATH') OR exit('No direct script access allowed');

class Retailers extends CI_Controller 
{

    public function __construct() 
	{
        parent:: __construct();
		
		//echo "TEST";

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('email');
		//$this->load->model('Regional_Model');
		$this->load->model('Operations_user_model');
		$this->load->model('Customercrud_model');
		$this->load->model('Admin_model');
		$this->load->model('Dsacrud_model');
		
		$this->load->model('Retailer_model');
		
		$this->load->model('Distributor_model');
		
        $this->load->helper(array('form', 'url'));
		

    }
	
	public function dashboard()
	{
		 $id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
	//	 print_r($row);
		 
		 $data['row'] = $row;
		
//exit;
		
		$this->load->view('dashboard_header', $data);
		
	}
	
	public function index()
	{
		//echo "Test";
		
		 $id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
	//	 print_r($row);
		 
		 $data['row'] = $row;
		
//exit;
		
		$this->load->view('dashboard_header', $data);
	}
	
	public function retailers()
	{
		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
	//	 print_r($row);
		 
		 $data['row'] = $row;
		
//exit;
		
		$this->load->view('dashboard_header', $data);
		//echo "Retailers wiil come hree";
	}
	
	
	public function listrequest()
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
	  $sel = $this->Retailer_model->getrequestcount($userid);
	 
	 
	 
	  $totalRecords = $sel;
	 
	  $sel = $this->Retailer_model->getrequestfilter($userid);
	 
	  $totalRecordwithFilter =$sel;
	  
	  //exit;
	 
	 $sel = $this->Retailer_model->getrequestfilterlist($userid);
	 
	 print_r($sel);
	 
	 exit;
	 $empReceords = $sel;
	 
	  $data = array();

     foreach($empReceords as $row)
         {
            
            
            if($row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                                                                          
               $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
              
        
        $data[] = array(
             //"ID"=>$row->ID,
           // "invoiceissuedby"=>$row->invoiceissuedby,
            "invoicenumber"=>$row->invoicenumber,
            "invoicedate"=>$row->invoicedate,
          
            "invoiceamount"=>$row->invoiceamount,
			"fundingamount"=>$row->fundingamount,
			"tenure"=>$row->tenure,			
           "product"=>$row->product,
            //"Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
            "Action"=>$link." ".$link1,
          
        );                                                                 
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
	
	
	public function saverequest()
	{
		//print_r($_REQUEST);
		
		/* code to export files to Nextcloud starts here */
					$time = time();
					
					$id = $this->session->userdata("ID");
					$row = $this->Customercrud_model->getProfileData($id);
					
					$retailerid = $row->ID;
					
					//$dir
					
					//$dir = $row->ID."/";
					
					// print_r($_FILES);
					 
					// print_r($_REQUEST);

						$fileextensionarr = explode(".",$_FILES["invoicefile"]["name"]);
						
						//print_r($fileextensionarr);

						$fileextension = $fileextensionarr[1];
						
						$filename = "invoice"."_".$time.".".$fileextension;
						
						$dirname = "Finaleap/customers/".$dir;

						$filenamewithdir = $dirname.$filename;

			  $correcturl = "curl -X PUT -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$filenamewithdir." -T ".$_FILES["invoicefile"]["tmp_name"]."";

 //exec($correcturl);
 
 //exit;

 /* code to upload file ends here */
		
		
		//print_r($_REQUEST);
		$data['invoicenumber'] = $this->input->post('invoicenumber');
		$data['invoiceamount'] = $this->input->post('invoiceamount');
		$data['product'] = $this->input->post('loanproduct');
		//$data['invoiceissuedby'] = $this->input->post('invoiceissuedby');
		$data['invoicedate'] = $this->input->post('invoicedate');
		
		//$data['distributorid'] = $this->input->post('distributorid');
		
		//$data['invoiceamount'] = $this->input->post('funding');
		
		$data['fundingamount'] = $this->input->post('funding');
		
		$data['tenure'] = $this->input->post('loantenure');
		
		$data['distributorid'] = $this->input->post('DistributorList');
		
		$data['retailerid'] = $retailerid;
		
		$data['filename'] = $filename;
		
		$data['dirname'] = $dirname;
		
		$data['totalvalue'] = $this->input->post('totalamount');
		
		//$data['createdate'] = 'now()';
		
		//$data['modifydate'] = 'now()';
		
		$this->Retailer_model->saverequest($data);
		
		//exit;
		
		redirect('retailers/managerequest', 'refresh');
		
	}
	
	public function addrequest()
	{
		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
	//	 print_r($row);
		 
		 $data['row'] = $row;
		 
		 $userid = $row->ID;
		 
		 $DistributorList = $this->Distributor_model->getdistributorlist();
		 
		// print_r($RetailerList);
		
		$loanlist = $this->Distributor_model->getloanuser($userid);
		
		//print_r($loanlist);
		
		$data['loanlist'] = $loanlist;
		
		 
		 $data['DistributorList'] = $DistributorList;
		
//exit;
		
		$this->load->view('dashboard_header', $data);
		
		
		$this->load->view('retailer/addrequest', $data);
		
		//echo "Add request";
	}
	
	public function managerequest()
	{
		
		//echo "Manage request will come here... ";
		
		//echo "Manage invoice will come hr=ere=";
		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
		 //print_r($row);
		 
		 $data['row'] = $row;
		
//exit;

$invoicelist = $this->Distributor_model->getinvoicelist();

$data['invoicelist'] = $invoicelist;

//print_r($invoicelist);
		
		$this->load->view('dashboard_header', $data);
		
				$this->load->view('retailer/managerequest', $data);
		
		
		
		
	}
	
	public function listretailers()
	{

				$filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
	
	
	$userType=$this->session->userdata("USER_TYPE");  
     $id = $this->session->userdata('ID');
	 
	 $draw = $_POST['draw'];
     $row = $_POST['start'];
     $rowperpage = $_POST['length']; // Rows display per page
     $columnIndex = $_POST['order'][0]['column']; // Column index
    
     $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
     
     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
     $searchValue = $_POST['search']['value']; // Search value
     ## Search
     $searchQuery = " ";
	 
	
	 
	 
	 $sel = $this->Retailer_model->getretailercount();
	 
	   $totalRecords = $sel;

	   
	 //exit;
	 $sel = $this->Retailer_model->getretailercountfilter();
	 
	  $totalRecordwithFilter =$sel;
	  
	  	 
	 
	 $sel = $this->Retailer_model->getretailer();
	 //echo $sel; 
	// print_r($distributorlist);
	
	
	 $empReceords = $sel;
	 
	  //exit;
	 
	  $data = array();

     foreach($empReceords as $row)
         {
            
            
            if($row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/distributor/assignproduct?id='.$row->ID.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                                                                          
               $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
              
        
        $data[] = array(
             //"ID"=>$row->ID,
            "FN"=>$row->FN.' '.$row->LN,
            "Email"=>$row->EMAIL,
            "mobile"=>$row->MOBILE,
          
            "Profile_Status"=>$incomplete1,  
           
            "Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
            "Action"=>$link." ".$link1,
          
        );                                                                 
         }

      
         
        
     
     $response = array(
     "draw" => intval($draw),
     "iTotalRecords" => $totalRecords,
     "iTotalDisplayRecords" => $totalRecordwithFilter,
     "aaData" => $data
     );
     echo json_encode($response);
	 
	 
		
	}
	
	public function manageretailer()
	{
		//echo "TEST";
		
		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
	//	 print_r($row);
		 
		 $data['row'] = $row;
		
		
		
		//$this->load->view('dashboard_header', $data);
		
		
	}
	
	public function addinvoice()
	{
		
		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
	//	 print_r($row);
		 
		 $data['row'] = $row;
		$this->load->view('dashboard_header', $data);
		
		//echo "This test";
		
		$this->load->view('retailer/addinvoice', $data);
		
		
		
		
		//$this->
	}
	
	public function getretailerlist()
	{
		
		
		echo "This is tewst";
	}
	
	
	public function getinvoicelist()
	{
		//echo "This is test";
		$filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
	$userType=$this->session->userdata("USER_TYPE");  
      $id = $this->session->userdata('ID');
	  
	  $profile_data=$this->Customercrud_model->getProfileData($id);
	  
	  $profile_id = $profile_data->ID;
	 
	 $draw = $_POST['draw'];
     $row = $_POST['start'];
     $rowperpage = $_POST['length']; // Rows display per page
     $columnIndex = $_POST['order'][0]['column']; // Column index
    
     $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
     
     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
     $searchValue = $_POST['search']['value']; // Search value
     ## Search
     $searchQuery = " ";
	 
	  $sel = $this->Retailer_model->getinvoicecount($profile_id);
	 
	  $totalRecords = $sel;
	 
	  $sel = $this->Retailer_model->getinvoicefilter($profile_id);
	 
	  $totalRecordwithFilter =$sel;
	 
	 $sel = $this->Retailer_model->getinvoice($profile_id);
	 
	// print_r($distributorlist);
	 
	 $empReceords = $sel;
	 
	 //print_r($empRecords);
	 
	  $data = array();

     foreach($empReceords as $row)
         {
            
            
            if($row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
			    $link2='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#editModel" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
			   
			    $link2='<a style="margin-left: 8px; "href="'.base_url().'index.php/retailers/editstatus?id='.$row->id.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';

			   
			   //$link2='<a style="margin-left: 8px; "href="'.base_url().'index.php/retailers/updateinvoicestatus?id='.$row->id.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/retailers/payment?id='.$row->id.'"  class="btn modal_test"><i class="fa fa-credit-card text-right" style="color:blue;"></i></a>';
                                                                          
               $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn modal_test" ><i class="fa fa-trash text-right" style="color:red;"></i></a>';
              
			  
        
        $data[] = array(
             //"ID"=>$row->ID,
            "invoiceissuedby"=>$row->invoiceissuedby,
            "invoicenumber"=>$row->invoicenumber,
            "invoicedate"=>$row->invoicedate,
          
            "invoiceamount"=>$row->invoiceamount,  
           "product"=>$row->product,
		   "invoicestatus"=>$row->invoicestatus,

            //"Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
            "Action"=>$link2." ".$link." ".$link1,
          
        );                                                                 
         }

      
         
        
     
     $response = array(
     "draw" => intval($draw),
     "iTotalRecords" => $totalRecords,
     "iTotalDisplayRecords" => $totalRecordwithFilter,
     "aaData" => $data
     );
     echo json_encode($response);
	 
		
	}
	
	
	public function managerequest2()
	{
		
		
	}
	
	
	public function payment()
	{
		//echo "Payment will come here. ..";
		
		//print_r($_REQUEST);
		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		 //echo "<pre>";
		 
		 	  $invoiceid =  $_REQUEST['id'];

		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		  $userid = $row->ID;
		 
		//print_r($row);
		
		$result = $this->Retailer_model->getinvoicebyid($userid,$invoiceid);
		
		//print_r($result);
		
		$data['invoice'] = $result;
		
		//echo "This test";
		
	
		 
		 $data['row'] = $row;
		
		$this->load->view('dashboard_header', $data);
			   
			   $this->load->view('retailer/payment', $data);
		
	}
	
	
	public function updatepayment()
	{
		
		//print_r($_REQUEST);
		
		$data['invoiceid'] = $_REQUEST['invoiceid'];
		
		$data['loantenure'] = $_REQUEST['loantenure'];
		
		$data['createdate'] = date('Y-m-d H:i:s');
		
		$this->Retailer_model->updatepayment($data);
		
		
		redirect('retailers/manageinvoice', 'refresh');
	}
	
	
	public function updateinvoice()
	{
		
		//echo "I am here...";
		
		//print_r($_REQUEST);
		
		//$data['invoicenumber'] = $this->input->post('invoicenumber');
		$data['invoiceamount'] = $this->input->post('invoiceamount');
		//$data['product'] = $this->input->post('product');
		//$data['invoiceissuedby'] = $this->input->post('invoiceissuedby');
		//$data['invoicedate'] = $this->input->post('invoicedate');
		
		$data['invoicestatus'] = $this->input->post('invoicestatus');
		
		$invoiceid = $this->input->post('invoiceid');
		
		//exit;
		$this->Retailer_model->updateinvoice($data,$invoiceid);
		
		
		redirect('retailers/manageinvoice', 'refresh');
		
	}
	
	public function editstatus()
	{
		//print_r($_REQUEST);
		
		  $invoiceid =  $_REQUEST['id'];

		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		  $userid = $row->ID;
	 //print_r($row);
		 
		 $data['row'] = $row;
		$this->load->view('dashboard_header', $data);
		
		
		$result = $this->Retailer_model->getinvoicebyid($userid,$invoiceid);
		
		//print_r($result);
		
		$data['invoice'] = $result;
		
		//echo "This test";
		
	$this->load->view('retailer/updateinvoice', $data);
		
		
		
	}
	
	public function view_cloud_file($fileid)
	{
			echo $fileid;

	}		
	public function delete_Invoice()
	{
		
		print_r($_REQUEST);
	}
	
	public function edit_Invoice()
	{
		//echo "TESt";
		print_r($_REQUEST);
		
	}
	
	public function updateinvoicestatus()
	{
		//echo "updateinvoicestatus";
		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		 //echo "<pre>";
		 
		//print_r($row);
		 
		 $data['row'] = $row;
		
		$this->load->view('dashboard_header', $data);
			   
			   $this->load->view('retailer/updateinvoicestatus', $data);
	}
	
	public function manageinvoice()
	{
		
		
		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		 //echo "<pre>";
		 
		//print_r($row);
		 
		 $data['row'] = $row;
		//echo "Test me ";
		
		//$this->load->view('dashboard_profile_header', $data);
		
			   $this->load->view('dashboard_header', $data);
			   
			   $this->load->view('retailer/manageinvoice', $data);

	}
	
	
	
	
	public function manageretailer2()
	{
		
		
		
	}
	
	public function saveprofile()
	{
		//print_r($_REQUEST);
		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		//echo "Hi";
		  $userid = $row->ID;
		//print_r($row);
		//$data = array();
		
		$data['ownername'] = $this->input->post('ownername');
		
		$data['firmname'] = $this->input->post('firmname');
		
		$data['natureofbusiness'] = $this->input->post('natureofbusiness');
		
		$data['pan'] = $this->input->post('pan');
		
		
		$data['gstnumber'] = $this->input->post('gstnumber');
		
		$data['businessaddress'] = $this->input->post('businessaddress');
		
		$data['businessexperience'] = $this->input->post('businessexperience');
		
		$data['monthlyturnover'] = $this->input->post('monthlyturnover');
		
		$data['addressline1'] = $this->input->post('addressline1');
		
		$data['district'] = $this->input->post('district');
		
		$data['state'] = $this->input->post('state');
		
		$data['pincode'] = $this->input->post('pincode');
		
		$data['userid'] = $userid;
		
		$this->Retailer_model->saveprofile($data,$userid);
		
		redirect('retailers/profile', 'refresh');
		
	}
	
	
	public function profile()
	{
		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		  $userid = $row->ID;
	 print_r($row);
	 
	 $profiledata = $this->Retailer_model->getprofiledata($userid);
	 
	 $data['profiledata'] = $profiledata;
		 
		 $data['row'] = $row;
		$this->load->view('dashboard_header', $data);
		
		$this->load->view('retailer/profile', $data);
		
	}
	
	
}
?>