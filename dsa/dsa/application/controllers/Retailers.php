<?php
date_default_timezone_set('asia/kolkata');
defined('BASEPATH') OR exit('No direct script access allowed');

class retailers extends CI_Controller 
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
		
		$this->load->library('upload');
		
		$this->load->model('Distributor_model');
		
        $this->load->helper(array('form', 'url'));
		

    }
	
	public function dashboard()
	{
		 $id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
	
		 $data['row'] = $row;
		
//exit;
		
		$this->load->view('dashboard_header', $data);
		
	}
	
	/*public function index()
	{
	
		
		 $id = $this->session->userdata('ID');
		 
		 
		 $row = $this->Customercrud_model->getProfileData($id);
	
		 

		 
		 $data['row'] = $row;
		

		
		$this->load->view('dashboard_header', $data);
	}*/
	public function index()
	{
		
		if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['userType'] = "none";
			$this->load->view('header', $data);
			$this->load->view('login');
		}else{
			
			if($this->session->userdata('login_count')==0)
			{
				$this->session->set_flashdata('sucess','sucess');
				$this->reset_password();
			}
			else{
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			//$this->load->view('header', $data);
			$id = $this->session->userdata('ID');
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
			$data['status']=$this->Retailer_model->getstatus($id);
			$dashboard_data = $this->Dsacrud_model->getDashboardData_retailer($id);            
			$data['dashboard_data'] = $dashboard_data;
            $this->load->view('dashboard_header', $data);
			$this->load->view('retailer/dashboard_new', $data);
			//$this->load->view('footer');
			//echo "hello";
			}
		}
	}
	public function reset_password()
	{
		$id = $this->session->userdata('ID');
		$data['type'] = $this->session->userdata("USER_TYPE");
		$data['id']=$id;
		$this->load->view('dsa/set_password',$data);
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
		 $row = $this->Customercrud_model->getProductData($_REQUEST['id']);
		 //echo "Hi";
		 
		 //print_r($row);
		 
		 $data['product'] = $row;
		
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
	  $sel = $this->Retailer_model->getrequestcount($result->UNIQUE_CODE,$filter_by);
	 
	 
	 
	  $totalRecords = $sel;
	 
	  $sel = $this->Retailer_model->getrequestfilter($result->UNIQUE_CODE,$filter_by,$searchValue);
	 
	  $totalRecordwithFilter =$sel;
	  
	  //exit;
	 
	 $sel = $this->Retailer_model->getrequestfilterlist($result->UNIQUE_CODE,$filter_by,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
	 
	 //print_r($sel);
	 
	// exit;
	 $empReceords = $sel;
	 
	  $data = array();
	if(isset($empReceords) && count($empReceords) > 0 )
		{
     foreach($empReceords as $row)
         {
            
            $distributor_id=$row->distributorid;
			$dist_info=$this->Retailer_model->get_name($distributor_id);
			$dis_name=$dist_info->FN.' '.$dist_info->LN;
			
            if(isset($row->Profile_Status) && $row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
              // $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->id.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
               $link1='<a style="margin-left: 8px; "href="'.base_url().'index.php/retailers/addinvoice_edit?type=invoice&requestid='.$row->id.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';                                                           
               //$link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = '.$row->id.' data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/retailers/deleterequest?id='.$row->id.'" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';

        
        $data[] = array(
             //"ID"=>$row->ID,
           // "invoiceissuedby"=>$row->invoiceissuedby,
		    "request_no"=>$row->request_no,
            "invoicenumber"=>$row->invoicenumber,
            "invoicedate"=>$row->invoicedate,
          
            "invoiceamount"=>$row->invoiceamount,
			"fundingamount"=>$row->fundingamount,
			"tenure"=>$row->tenure,			
            "product"=>$dis_name,
			"status"=>$row->status,
			//"distributor"=>
            //"Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
            "Action"=>$link1." ".$link,
          
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
	
	
/*	public function saverequest()
	{
		
					$retailerid = $row->ID;
					
					//$dir
					
					//$dir = $row->ID."/";
					
					// print_r($_FILES);
					 
					// print_r($_REQUEST);

						$fileextensionarr = explode(".",$_FILES["invoicefile"]["name"]);
						
						//print_r($fileextensionarr);

						$fileextension = $fileextensionarr[1];
						
						$filename = "invoice"."_".$time.".".$fileextension;
						
						$dirname = "Finaleap/customers/";

						$filenamewithdir = $dirname.$filename;

			  $correcturl = "curl -X PUT -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$filenamewithdir." -T ".$_FILES["invoicefile"]["tmp_name"]."";

 
			  
		
		
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
		
		$data['retailerid'] = $row->UNIQUE_CODE;
		
		$data['filename'] = $filename;
		
		$data['dirname'] = $dirname;
		
		$data['totalvalue'] = $this->input->post('totalamount');
		$data['remark']=$this->input->post('remarks');
		
		//$data['createdate'] = 'now()';
		
		//$data['modifydate'] = 'now()';
		
		$this->Retailer_model->saverequest($data);
		
		//exit;
		
		redirect('retailers/managerequest', 'refresh');
		
	}*/
		
		
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
					if(isset($_FILES["invoicefile"]["name"]) && $_FILES["invoicefile"]["name"] != '')
					{
						$fileextensionarr = explode(".",$_FILES["invoicefile"]["name"]);
						
						//print_r($fileextensionarr);
						$fileextension = $fileextensionarr[1];
						
						$filename = "invoice"."_".$time.".".$fileextension;
						
						$dirname = "Finaleap/customers/".$dir;
						$filenamewithdir = $dirname.$filename;
			  $correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["invoicefile"]["tmp_name"]."";
 //exec($correcturl);
					}
 //exit;
 /* code to upload file ends here */
		
		
		//print_r($_REQUEST);
		
		//exit;
		$data['invoicenumber'] = $this->input->post('invoicenumber');
		$data['invoiceamount'] = $this->input->post('invoiceamount');
		$data['product'] = $this->input->post('loanproduct');
		//$data['invoiceissuedby'] = $this->input->post('invoiceissuedby');
		$data['invoicedate'] = $this->input->post('invoicedate');
		
		$data['totalcharges'] =  $this->input->post('totalcharges');
		//$data['totalcharges'] =0;
		//$data['distributorid'] = $this->input->post('distributorid');
		
		//$data['invoiceamount'] = $this->input->post('funding');
		
		$data['additionaldeduction'] = $this->input->post('invoiceamount') - $this->input->post('funding');
		
		$data['fundingamount'] = $this->input->post('totalamount');
		
		$data['disbursedamount'] = $this->input->post('funding');
		
		$data['tenure'] = $this->input->post('loantenure');
		
		$data['distributorid'] = $this->input->post('DistributorList');
		
		$data['retailerid'] = $row->UNIQUE_CODE;
		
		$data['filename'] = $filename;
		
		$data['dirname'] = $dirname;
		
		$data['totalvalue'] = $this->input->post('totalamount');
		$data['remark'] = $this->input->post('remarks');
		$data['status'] = 'Created';
		//$data['createdate'] = 'now()';
		
		//$data['modifydate'] = 'now()';
	
		//$this->Retailer_model->saverequest($data);
		
		//exit;
		$inserted_id=$this->Retailer_model->saverequestnew($data);
		$result_id = sprintf('%09s',$inserted_id);
		
		$data_update['request_no']=$result_id;
		$status = $this->Retailer_model->update_request($inserted_id,$data_update);
		
		//echo $status;
		
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
		  $this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			//$this->load->view('header', $data);
			$id = $this->session->userdata('ID');
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
			$data['status']=$this->Retailer_model->getstatus($id);
		    $this->load->view('dashboard_header', $data);
				$this->load->view('retailer/managerequest', $data);
		
		
		
		
	}
	
	public function deleterequest()
	{
		//print_r($_REQUEST);
		
		 $requestid = $_REQUEST['id'];
		
		
		$deleterequest = $this->Retailer_model->deleterequest($requestid);
		
		$_SESSION['message'] = "Request deleted successfully";
		
		$_SESSION['title']  = "Request Deleted";
		
		redirect('retailers/managerequest', 'refresh');
		
	}
	
	public function listretailers()
	{

				$filter_by=$this->input->get('s');
    
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
	 
	
	 
	 
	 $sel = $this->Retailer_model->getretailercount($filter_by);
	 
	   $totalRecords = $sel;

	   
	 //exit;
	 $sel = $this->Retailer_model->getretailercountfilter($searchValue,$filter_by);
	 
	  $totalRecordwithFilter =$sel;
	  
	  	 
	 //echo $filter_by;
	 $sel = $this->Retailer_model->getretailer($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
	 //echo $sel; 
	// print_r($distributorlist);
	$distributor = $this->Distributor_model->getdistributorlist();
	
					
				
	 $empReceords = $sel;
	 
	  //exit;
	 
	  $data = array();
    $i=1;     
foreach($empReceords as $row)
         {
			
            $credit_count=$this->Customercrud_model->get_saved_credit_score($row->UNIQUE_CODE);

			$select_option="";
			$select_option_add='';
			 foreach($distributor as $dis) { 
				if($row->distributor_id==$dis->UNIQUE_CODE)
				{
                    $select_option=$dis->dsa_firm_name;
					$selected="selected";}else{$selected='';
				}
			  //$select_option='<option value="'.$dis->UNIQUE_CODE.'" '.$selected.'>'.$dis->dsa_firm_name.'</option>';
			  //$select_option_add=$select_option_add.$select_option;
			  //$select_option='<option value="'.$dis->UNIQUE_CODE.'" '.$selected.'>'.$dis->dsa_firm_name.'</option>';
			 }
  //echo $select_option_add;
			$select_box= '<select  required class="form-control" name="retailerid" id="dis_id_'.$i.'" > 
			<option value=" ">Select Distributor *</option>'.$select_option_add.'

			</select>';
			
			if($row->SCFSTATUSE=='Approved')
			{
				//$approve_btn='<a style="margin-left: 8px;"  class="btn btn-success disabled">Approved</a>';
				$approve_btn='Approved';
			}
			else{
				$approve_btn=$row->SCFSTATUSE;
				//$approve_btn='<a style="margin-left: 8px;"  name="'.$i.'" id="'.$row->UNIQUE_CODE.'" class="btn btn-success " onclick="approve_status(this)">Approve</a>';
			}
            if($row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
			  
			   if($row->Buisness_con=='PROPRIETORSHIP')
			   {
				if(!empty($credit_count)>0)
				{
					$link3='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/pdf?ID='.$row->UNIQUE_CODE.'" target="_blank" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
				}
				else
				{
					$link3='<a style="margin-left: 8px; "href="'.base_url().'index.php/retailers/check_Bureau?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
				}
				
			   }
			   else{
				$link3="";   
			   }
			   $link2='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/update_basic_profile_2?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/distributor/assignproduct?id='.$row->ID.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                                                                          
               $link1='<a style="margin-left: 8px; "href="'.base_url().'index.php/distributor/delprofile?id='.$row->ID.'"  "  class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
               // $selectbox='<select><option value="" ></option>'.foreach($distributor as $dis){'hello'}.'</select>';
			   //$selectbox='<select><option value="" ></option>'.foreach($distributor as $dis) { .'<option'. if($dis->UNIQUE_CODE == $row->distributor_id) { .'selected'. }. 'value="'.echo $dis->UNIQUE_CODE;.'" >'.echo $dis->FN." ".$dis->LN;.'</option>'.}.'<select>'; 
        	  //$link3='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/update_basic_profile_2?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';

        $data[] = array(
             "dsa_firm_name"=>$row->dsa_firm_name,
            "FN"=>strtoupper($row->FN.' '.$row->LN),
            "Email"=>$row->EMAIL,
            "mobile"=>$row->MOBILE,
          
            "Profile_Status"=>$incomplete1,  
           
            "Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
			"select_box"=>$select_option,
            "Action"=>$link2,
			"Bureau"=>$link3,
			"approve_btn"=>$approve_btn
          
        );      
		$i++;                                                           
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
	
	
	public function do_upload(){
			$u_id = $this->input->post('coapp_id');
			$master_type = $this->input->post('master_type');
			
			$u_type = $this->session->userdata("USER_TYPE");
		     $id = $this->input->post("ID");
			
			//exit;
			
			//print_r($_FILES["userfile"]["tmp_name"]);

			//print_r($_FILES["userfile"]["name"]);

//print_r($_REQUEST);

	//		exit;
				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
			if(empty($u_id))
			{
				$profile_data=$this->Customercrud_model->getProfileData($id);
			    $role=$this->input->post("role");
				
			}
			else
			{
				$role='';
			}
			
			
		//	$dir = $profile_data->ID."/";
		
		//exit;
			
			if(!empty($u_id))$id = $u_id;
			
			
			$doc_type = $this->input->post('doc_type');
			
			
			
			$documentname = str_replace(" ","_",$doc_type);
			
			$documentname = str_replace(".","",$documentname);
			
			$documentname = str_replace("/","",$documentname);
			
			$chk_res = $this->Customercrud_model->checkSavedDocument($id, $doc_type, $master_type);
			if($chk_res > 0){
				
				$error = "Document ".$doc_type." already saved by you.";
				if($role == 2)
							{
								redirect('retailers/document_upload?error='.$error, 'refresh');
							}
				 else if($role == 6)
							{
								redirect('retailers/document_upload?error='.$error, 'refresh');
							}
				if(empty($u_id))redirect('retailers/document_upload?error='.$error, 'refresh');
				else redirect('retailers/document_upload?ID='.$id.'&error='.$error, 'refresh');
			}else {
				$count = count($_FILES['userfile']['name']);
             
                 for($i=0;$i<$count;$i++)
				 {
				     //$file_name = $_FILES["userfile"]['name'][$i];
					//$file_name = time().".".pathinfo($file_name, PATHINFO_EXTENSION);
					//$file_name = str_replace(' ', '', $file_name);
					//$file_type = $_FILES["userfile"]['type'][$i];
					//$file_size = $_FILES["userfile"]['size'][$i];
/* code to export files to Nextcloud starts here */
					$time = time();

						$fileextensionarr = explode(".",$_FILES["userfile"]["name"][$i]);
						if(count($fileextensionarr)==2){
						$fileextension = $fileextensionarr[1];
						
						$filename = $documentname."_".$time.".".$fileextension;
				 }elseif(count($fileextensionarr) == 3){
					 $fileextension = $fileextensionarr[2];
							$filename = $documentname."_".$time.".".$fileextension;
						}
						elseif(count($fileextensionarr) == 4){
					 $fileextension = $fileextensionarr[3];
							$filename = $documentname."_".$time.".".$fileextension;
						}
						elseif(count($fileextensionarr) == 5){
					 $fileextension = $fileextensionarr[4];
							$filename = $documentname."_".$time.".".$fileextension;
						}
						elseif(count($fileextensionarr) == 6){
					 $fileextension = $fileextensionarr[5];
							$filename = $documentname."_".$time.".".$fileextension;
						}
			if($doc_type=='AADHAR CARD')
			{
                $handle=realpath($_FILES['userfile']['tmp_name'][$i]);
				$img = file_get_contents( $handle);
				$data = base64_encode($img);
				$curl = curl_init();

							curl_setopt_array($curl, array(
							CURLOPT_URL => 'https://ping.arya.ai/api/v1/aadhaar-mask',
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => '',
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => true,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => 'POST',
							CURLOPT_POSTFIELDS =>'{
								"req_id":"1234",
								"doc_type":"image",
								"doc_base64":"'.$data.'"
							}',
							CURLOPT_HTTPHEADER => array(
								'token:cd26ae98a16368c1f52ae6b44ed0fd1b',
								'Content-Type: application/json'
							),
							));

							$response = curl_exec($curl);
							curl_close($curl);
							
							$response2=json_decode($response);
							if($response2->success=="true")
							{
								$doc_type_return=$response2->doc_type;
								$pre="data:".$doc_type_return.";base64,";
								$data=$pre.$response2->masked_aadhar;
								file_put_contents('assets/images/'.$filename, file_get_contents($data));
								$dirname = "Finserv/customers/";

								$filenamewithdir = $dirname.$filename;
								$correcturl = "curl -X PUT -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T assets/images/".$filename;
								
								exec($correcturl);
								unlink('assets/images/'.$filename);
							}
							else{
								$dirname = "Finserv/customers/";

								$filenamewithdir = $dirname.$filename;

								$correcturl = "curl -X PUT -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["userfile"]["tmp_name"][$i]."";

								exec($correcturl);

							}
							
							
							
			}
			else{
				
						
						
						
						$dirname = "Finserv/customers/";

						$filenamewithdir = $dirname.$filename;

			            $correcturl = "curl -X PUT -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$filenamewithdir." -T ".$_FILES["userfile"]["tmp_name"][$i]."";

                        exec($correcturl);
			}

 /* code to upload file ends here */


					  $_FILES['file']['name'] = $_FILES['userfile']['name'][$i];
					  $_FILES['file']['name'] = $time.".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
					  $_FILES['file']['name'] = str_replace(' ', '', $_FILES['file']['name']);
					  $_FILES['file']['type'] = $_FILES['userfile']['type'][$i];
					  $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
					  $_FILES['file']['error'] = $_FILES['userfile']['error'][$i];
					  $_FILES['file']['size'] = $_FILES['userfile']['size'][$i];
						$config = array(
							'upload_path' => "./images/documents/",
							'allowed_types' => "gif|jpg|png|jpeg|pdf",
							'overwrite' => TRUE
						);

					$config['file_name'] = $_FILES['file']['name'];
					$config['image_type'] = $_FILES['file']['type'];
					$config['file_size'] = $_FILES['file']['size'];
					

					$this->upload->initialize($config);
					$upload_data = $this->upload->data();
					
					$file_input_arr = array(
						'USER_ID' => $id,
						'DOC_TYPE' => $doc_type,	
						'DOC_NAME' => $upload_data['file_name'],
						'DOC_SIZE' => $upload_data['file_size'],
						'DOC_FILE_TYPE' => $upload_data['image_type'],
						'DOC_MASTER_TYPE' => $master_type,
						'doc_cloud_name' => $filename,
						'doc_cloud_dir' => $dirname
					);
				//if($this->upload->do_upload('file'))
				if(true){
					$this->Customercrud_model->saveDocuments($file_input_arr);
					$data_row = $this->Customercrud_model->getDocuments($id);
					/*$this->Customercrud_model->saveDocuments($file_input_arr);
					  require_once('./fpdf/fpdf.php');
                                 require_once('./fpdi/src/autoload.php');
								 require_once('./fpdi/src/Fpdi.php');
								//$id = $this->session->userdata('ID');
								$data_row = $this->Customercrud_model->getDocuments($id);
								//$pdf = new FPDF('P', 'pt', 'Letter');
								//$pdf->addPage();
								$pdf =new \setasign\Fpdi\Fpdi();
								foreach($data_row as $row)
								{ 
										$path = './images/documents/';
										$filename = $row->DOC_NAME;
										$url = $path.$filename;	
										if(substr($url, -4) == '.pdf')
										{
										
											

											$pageCount = $pdf->setSourceFile($url);
											
											for($j=1; $j<=$pageCount; $j++)
											{
												$pageId = $pdf->importPage($j,setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);
												$pdf->addPage();
												$pdf->useImportedPage($pageId, 50, 50,100,100);
												
											
                                              
											}

											
										}
										else
										{
											$pdf->addPage();
											$pdf->Image($url);
										}
										
								}*/
								$directoryName="./images/all_document_pdf/";
								if(!is_dir($directoryName))
								{
											mkdir($directoryName, 0755);
											//file_put_contents($pdf->Output('$id.pdf','F'));
								}
								else
								{
									$dir='./images/all_document_pdf/';    
									$filename= "$id.pdf";                                      
									 if(file_exists($dir.$filename))
									 {
										 //unlink($dir.$filename);
										 // $pdf ->Output($dir.$filename,'F');
									 }
									 else
									 {
									  // $pdf ->Output($dir.$filename,'F');
									 }
								
								}
								
								
					
				}
				else
				{
					$error = $this->upload->display_errors();
						if($role == 2)
								{
									redirect('customer/dsa_documents_upload?error='.$error, 'refresh');
								}
					 else if($role == 6)
								{
									redirect('customer/dsa_documents_upload?error='.$error, 'refresh');
								}
					if(empty($u_id))redirect('customer/customer_documents?ID='.$u_id.'&error='.$error, 'refresh');
					else redirect('customer/customer_documents?UID='.$id.'&error='.$error, 'refresh');
				} 
				
			}	
	
				
					            
								
                            					
                            
                             
							$no_of_doc_to_upload=$this->Customercrud_model->getDocuments_Type_customer();											
							$Uploded_Doc_Count=$this->Customercrud_model->getUploded_Documents_Type($id);
						/*	if($Uploded_Doc_Count==$no_of_doc_to_upload)
							{
								$array_input_more = array(
												'CUST_ID' => $id,
												'STATUS'=>('Document upload complete')
												);
								
								$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
							}*/
							/*if($role == 2)
							{
								redirect('customer/dsa_documents_upload', 'refresh');
							}
							else if($role == 6)
							{
								redirect('customer/dsa_documents_upload', 'refresh');
							}*/
						if(!empty($u_id))redirect('retailers/document_upload?ID='.$u_id, 'refresh');
						else redirect('retailers/document_upload?UID='.$id, 'refresh');
					 
				}
				 
				
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
	
	
	
	
	public function document_upload()
	{
		$u_type = $this->session->userdata("USER_TYPE");//user which nis loging important for dashbord
		
		//print_r($u_type);
		
		
				$login_user_id = $this->input->get("DID");
			
			    $data['dsa_id']=$login_user_id;
				if(  $data['dsa_id'] == '')
				{
					$data['dsa_id'] = $this->session->userdata("dsa_id");
				}
			$id = $this->input->get("UID"); //Applicant ID
			
			$login_id = $this->session->userdata('ID');
			$data_row = $this->Customercrud_model->getDocuments($id);//get applicant uploaded documents;
			$data_row_more = $this->Dsacrud_model->getProfileDataMore($id);
			
			
			$data['message'] = '';
			
			$data['doc_type'] = '';
			
			$row=$this->Customercrud_model->getProfileData($id);// get applicant details
			$login_details=$this->Customercrud_model->getProfileData($login_id);// get login details
			
			

			
			$role=$row->ROLE;// assign role of applicant
			$doc_type_user = $role;//select document where document only for customer
			 $Master_type_documen_customer = $this->Customercrud_model->getallDocumentsType_for_retailer($doc_type_user,'KYC');
			 /* echo "<pre>";
			 print_r($Master_type_documen_customer);
			 echo "</pre>";
			 */
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = $age;//for dashbord
            $data['data_row']=$row;//for dashbord
			$data['data_row_more']=$data_row_more;
			$inc_src = "";
			
			$Total_savedDocType=0;//Total mandatory document save by applicant count 
			$Total_mandatory_doc_count=0;

			$data_doctype=array();
			
			foreach ($Master_type_documen_customer as $Documents)
			{
				
			 //$Documents->DOC_MASTER_TYPE,'<br>';
				
					  
						
						
						$data_doctype = $this->Customercrud_model->getDocumentsType_for_retailer($doc_type_user,$Documents->DOC_MASTER_TYPE);;
						 $mandatory_doc_count=$this->Customercrud_model->get_Mandatory_doc_count($doc_type_user,$Documents->DOC_MASTER_TYPE );
						$savedDocType =$this->Customercrud_model->getSavedDocumentsCountWithMaster($id, $Documents->DOC_MASTER_TYPE);
						$Total_savedDocType=$Total_savedDocType+$savedDocType->doc_count;
						  $Total_mandatory_doc_count=$Total_mandatory_doc_count+$mandatory_doc_count;
					  
					//print_r($savedDocType);
					
					
					
				
				

			
				if($Total_mandatory_doc_count==$Total_savedDocType)
				{
					
					//print_r($data_row);
					$documentarr = array();
					foreach($data_row as $document)
					{
						$documentarr[] = $document->DOC_TYPE;
						
					}
					
					$documentstr = implode("','",$documentarr);
					
					$documentstr = "'".$documentstr."'";
					
					$data_doctype =$this->Customercrud_model->Get_Other_Documents_Retailer($documentstr);
					
					
					$data['doc_type'] ='';
					$data['doc_count'] =count($data_doctype);
					$data['message'] = "All Document uploaded sucessfully. If you want to upload other document you can upload here.";
					$data['save'] = true;
					
				}
				else
				{
					
					if($savedDocType->doc_count==$mandatory_doc_count || $Documents->DOC_MASTER_TYPE=='Home Loans'||$Documents->DOC_MASTER_TYPE=='LAP'||$Documents->DOC_MASTER_TYPE=='Re-Finance'||$Documents->DOC_MASTER_TYPE=='Balance Transfer'|| $Documents->DOC_MASTER_TYPE=='House Construction On Self Own Plot'|| $Documents->DOC_MASTER_TYPE=='Home Improvement Loans' ||  $mandatory_doc_count==0 ){
						
						continue;
					}
					else
					{
					
					$data['doc_type'] = $Documents->DOC_MASTER_TYPE;
					$data['doc_count'] = count($data_doctype);
					$data['message'] = "Upload  document for ".$Documents->DOC_MASTER_TYPE.'. '. $mandatory_doc_count .' Documents are mandatory';
					
					$data['save'] = false;
					break;
					}
				}
				
				
			}
			
			$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
			$data['data_row_more']=$data_row_more ;
			$data['row']=$row;
			$data['age'] = $age;
			$data['error'] = '';
			$data['userType'] = $u_type;
			$data['documents'] = $data_row;
			$data['documents_type'] = $data_doctype;
			$data['user_type'] = $inc_src;
			$data['login_details']=$login_details;
			$this->load->view('header', $data);
			$data['error'] = $this->input->get('error');
			
			$this->session->set_flashdata('message',$data['message']);
			$this->load->view('retailer/document_upload', $data);


		
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
	 //print_r($row);
	 
	 $profiledata = $this->Retailer_model->getprofiledata($userid);
	 
	 $data['profiledata'] = $profiledata;
		 
		 $data['row'] = $row;
		$this->load->view('dashboard_header', $data);
		
		$this->load->view('retailer/profile', $data);
		
	}
	public function delete_doc($doc_id){
			
	$id = $this->input->get("UID");

				
				if ($id == '') {
					$id = $this->session->userdata("ID");
				}
				
			$array_input = array(
				'ID' => $doc_id		
			);		
          
/*$docid = $this->input->post("id");
			$user = $this->Customercrud_model->getSingleDoc($docid);

						$documentname = $user->doc_cloud_name;
						
						$documentdir = $user->doc_cloud_dir;
						
						$documentpath = $documentdir.$documentname;

					//	$pathname = "cloudfile/".$documentname;
				
				 $deletefile = " curl -X DELETE -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$documentpath."   ";

  exec($deletefile);*/

			$cust_id=$id;
			$u_type = $this->session->userdata("USER_TYPE");
			$result = $this->Customercrud_model->delete_doc($array_input);



			
		 redirect('dsa/update_basic_profile?id='.$this->session->userdata("ID"));
	
	}
	/*-------------------------------------- addded by papiha on 27_08_2022----------------------------------------------*/
	public function addnewrequest()
	{
		$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			//$this->load->view('header', $data);
			$id = $this->session->userdata('ID');
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
			
		
			$data['status']=$this->Retailer_model->getstatus($id);
		$id = $this->session->userdata('ID');
		$row = $this->Customercrud_model->getProfileData($id);
		$data['row'] = $row;
		$userid = $row->ID;
		
		//print_r($row);

		$distributor_info=$this->Customercrud_model->getProfileData($row->distributor_id);
		//echo "<pre>";
		//print_r($distributor_info);
		
		//exit;
		
		//echo $distributor_info->product_id." <pre>";
		//print_r($distributor_info);
		//exit();
		$product_details = $this->Distributor_model->getproduct_details($distributor_info->product_id);
		$loanlist = $this->Distributor_model->getproduct_details($distributor_info->product_id);
		$data['product_details']=$product_details;
		$data['distributor_info']=$distributor_info;
		$data['loanlist'] = $loanlist;
		
		
		
		$this->load->view('dashboard_header', $data);
		$this->load->view('retailer/addnewrequest', $data);
		
	}
/*---------------------------------------------- addded by papiha on 27_08_2022------------------------------- */
public function saverequestnew()
	{
		
		$id = $this->session->userdata("ID");
					$row = $this->Customercrud_model->getProfileData($id);
					$retaileremail = $row->EMAIL;
					$retailerid = $row->ID;
					$distributor_info=$this->Customercrud_model->getProfileData($row->distributor_id);
					$distributoremail = $distributor_info->EMAIL;
					
					//exit;
					//$loanlist = $this->Distributor_model->getloanuser($retailerid);
					$loanlist = $this->Distributor_model->getproduct_details($distributor_info->product_id);
					$data['distributorid'] = $this->input->post('DistributorList');
		
		$data['retailerid'] = $row->UNIQUE_CODE;
		/*$data['invoicedate'] = $this->input->post('invoicedate');
		$data['invoiceamount'] = $this->input->post('amount');
		$data['fundingamount'] = $this->input->post('requestedamount');*/
		$data['invoicenumber'] = $this->input->post('invoicenumber');
		$data['invoiceamount'] = $this->input->post('invoiceamount');
		$data['product'] = $this->input->post('loanproduct');
		//$data['invoiceissuedby'] = $this->input->post('invoiceissuedby');
		$data['invoicedate'] = $this->input->post('invoicedate');
		$data['fundingamount'] = $this->input->post('funding');
		$data['totalcharges'] =  $this->input->post('totalcharges');
	
		
		$data['invoicenumber'] = $this->input->post('invoicenumber');
		
		$data['tenure'] = $this->input->post('loantenure');
		$data['remark']=$this->input->post('remarks');
		$data['status']="Created";
		//print_r($loanlist);
		
		$interestrate = $loanlist->interestrate;
		
		$processingfeetype = $loanlist->processingfeetype;
		
		$processingfee = $loanlist->processingfee;
		
		$requestedamount = $data['fundingamount'];
		
		$yearlyinterest = ($requestedamount*$interestrate)/100;
		
		$dailyinterest = $yearlyinterest/365;
		
		$tenure = $this->input->post('loantenure');
		
		$interest1= $tenure*$dailyinterest;
		
		if($processingfeetype == 'percentage')
		{
			$interest2 = ($processingfee*$requestedamount)/100;
			
		}
		else{
			
			$interest2 = $processingfee;
		}
	
		$totalcharges = $interest1+$interest2;
	
		$data['totalcharges'] = number_format((float)$totalcharges, 2, '.', '');
		
		$data['conveniencefee'] = number_format((float)$totalcharges, 2, '.', '');
		
		$data['additionaldeduction'] = $data['invoiceamount'] - $data['fundingamount'];
		
		//print_r($_REQUEST);
		
		//print_r($totalcharges);
		
		$disburseamount = $data['fundingamount'] - $totalcharges;
		
		 $data['disbursedamount'] = number_format((float)$disburseamount, 2, '.', '');
		
		$data['totalvalue'] = $data['invoiceamount'];
		
		$inserted_id=$this->Retailer_model->saverequestnew($data);
		$result_id = sprintf('%09s',$inserted_id);
		
		$data_update['request_no']=$result_id;
		$status = $this->Retailer_model->update_request($inserted_id,$data_update);
		
		$to = SCFEMAIL;
		
		$subject = "New request added by ".$row->FN." ".$row->LN;
		
		$message = "Dear Retailer, <br>
		New request added by ".$row->FN." details as following <br>
		Retailer Name : ".$row->FN." ".$row->LN." <br>
		Invoice Number : ".$data['invoicenumber']." <br>
		Invoice Amount : ".$data['invoiceamount']." <br>
		Invoice Product : ".$data['product']." <br>
		Invoice Invoice Date : ".$data['invoicedate']." <br>
		Invoice Total Charges : ".$data['totalcharges']." <br>
		tenure  : ".$data['tenure']." <br>
		remark  : ".$data['remark']." <br><br>
		
		Warm Regards, <br>
Finaleap Finserv Pvt Ltd
		";
		
		
		
		$this->sendemail($retaileremail,$subject,$message);
		
		$message = "Dear Distributor, <br>
		New request added by ".$row->FN." details as following <br>
		Retailer Name : ".$row->FN." ".$row->LN." <br>
		Invoice Number : ".$data['invoicenumber']." <br>
		Invoice Amount : ".$data['invoiceamount']." <br>
		Invoice Product : ".$data['product']." <br>
		Invoice Invoice Date : ".$data['invoicedate']." <br>
		Invoice Total Charges : ".$data['totalcharges']." <br>
		tenure  : ".$data['tenure']." <br>
		remark  : ".$data['remark']." <br><br>
		
		Warm Regards, <br>
Finaleap Finserv Pvt Ltd
		";
		
		$this->sendemail($distributoremail,$subject,$message);
		
		$message = "Dear SCFO, <br>
		New request added by ".$row->FN." details as following <br>
		Retailer Name : ".$row->FN." ".$row->LN." <br>
		Invoice Number : ".$data['invoicenumber']." <br>
		Invoice Amount : ".$data['invoiceamount']." <br>
		Invoice Product : ".$data['product']." <br>
		Invoice Invoice Date : ".$data['invoicedate']." <br>
		Invoice Total Charges : ".$data['totalcharges']." <br>
		tenure  : ".$data['tenure']." <br>
		remark  : ".$data['remark']." <br><br>
		
		Warm Regards, <br>
Finaleap Finserv Pvt Ltd
		";
		
		$this->sendemail(SCFEMAIL,$subject,$message);
		
		 $_SESSION['message'] = 'Request added successfully';
		
		$_SESSION['title'] = 'Add Request';
		
		redirect('retailers/managerequest', 'refresh');
		
		
	}

/*------------------------- added by papiha on 30_08_2022--------------------------------------------*/
public function addinvoice_edit()
	{
		
		
		$id = $this->session->userdata('ID');
		$row = $this->Customercrud_model->getProfileData($id);
		$data['row'] = $row;
		$RetailerList = $this->Distributor_model->getretailerlist();
		$requestid = "";
		/*-----------------------------------*/
		$userid = $row->ID;
	
		$distributor_info=$this->Customercrud_model->getProfileData($row->distributor_id);
		
		$product_details = $this->Distributor_model->getproduct_details($distributor_info->product_id);
	
		$data['product_details']=$product_details;
		$data['distributor_info']=$distributor_info;
		//$data['loanlist'] = $loanlist;
		//$data['DistributorList'] = $DistributorList;
		/*-----------------------------------*/

		 
		 if(isset($_REQUEST['requestid']))
		{
				$requestid = $_REQUEST['requestid'];
		}
		 
		 $Request = $this->Distributor_model->getRequest($requestid);
		 
		
		$retailerid=$Request->retailerid;
		$retailerinfo = $this->Customercrud_model->getProfileData($retailerid);
		 if(isset($_REQUEST['requestid']))
		{
				$requestid = $_REQUEST['requestid'];
		}
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		//$this->load->view('header', $data);
		$id = $this->session->userdata('ID');
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
		 $data['Request'] = $Request;
		 
		 $data['RetailerList']  = $RetailerList;
		 $data['retailerinfo']=$retailerinfo;
		 $data['status']=$this->Retailer_model->getstatus($id);
		 
		$this->load->view('dashboard_header', $data);
		
		//echo "This test";
		
		$this->load->view('retailer/addnewrequest_edit', $data);
		
		
		
		
		
	}
	public function update_request()
	{
		
		$requestid=$this->input->post('requestid');
		
		$request_info = $this->Distributor_model->getRequest($requestid);
	
		$distributor_info=$this->Customercrud_model->getProfileData($request_info->distributorid);
	
		$retailer_info=$this->Customercrud_model->getProfileData($request_info->retailerid);
	
		$data['invoicenumber'] = $this->input->post('invoicenumber');
		$data['invoiceamount'] = $this->input->post('invoiceamount');
		$data['product'] = $this->input->post('loanproduct');
		//$data['invoiceissuedby'] = $this->input->post('invoiceissuedby');
		$data['invoicedate'] = $this->input->post('invoicedate');
		
		$data['totalcharges'] =  $this->input->post('totalcharges');
		//$data['totalcharges'] =0;
		//$data['distributorid'] = $this->input->post('distributorid');
		
		//$data['invoiceamount'] = $this->input->post('funding');
		
		$data['additionaldeduction'] = $this->input->post('invoiceamount') - $this->input->post('funding');
		
		//$data['fundingamount'] = $this->input->post('totalamount');
		$data['fundingamount'] = $this->input->post('funding'); 
		$data['disbursedamount'] = $this->input->post('funding');
		
		$data['tenure'] = $this->input->post('loantenure');
		
		$data['distributorid'] = $this->input->post('DistributorList');
		
		$data['retailerid'] = $request_info->retailerid;
		
		$data['filename'] = $filename;
		
		$data['dirname'] = $dirname;
		
		$data['totalvalue'] = $this->input->post('totalamount');
		$data['remark'] = $this->input->post('remarks');
		$data['status'] = "Revert Action Taken By Retailer";
		//$data['createdate'] = 'now()';
		
		//$data['modifydate'] = 'now()';
		//print_r($data);
		//exit;
		$this->Retailer_model->update_request($requestid,$data);
	    $config['protocol']=PROTOCOL;
		$config['smtp_host']=SMTP_HOST; 
		$config['smtp_port']=SMTP_PORT; 
		$config['smtp_timeout']=SMTP_TIMEOUT;
		$config['smtp_crypto']=SMTP_CRYPTO; 
		$config['smtp_user']=SMTP_USER; 
		$config['smtp_pass']=SMTP_PASS;
		$from_email = FROM_EMAIL; 
		$config['charset']=CHARSET;
		$config['newline']=NEWLINE;
		$config['wordwrap'] = WORDWRAP2;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from($from_email, 'Finaleap'); 
		$send_to_emails=$send_to_emails;
		$send_email_to_support=$reteiler_EMAIL;
		//$send_email_to_support='patilpapiha@gmail.com';
		$this->email->to($send_email_to_support);
		$this->email->subject('Revert Action taken on invoice submitted '.$request_info->invoicenumber.' from retailer'.strtoupper($retailer_info->FN).' '.strtoupper($retailer_info->LN));
		$data['request_info']=$request_info;
		$data['reteiler_info']=$reteiler_info;
		
		$data['distributor_info']=$distributor_info;
		$mailContent = $this->load->view('templates/revert_action_taken_by_retailer',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
						
			}
			else
			{
				echo $this->email->print_debugger();
			}
			$notification_data=['user_id'=>$reteiler_id,'notification'=>'Revert Action taken by retailer for Invoice Number:'.$request_info->invoicenumber,'status'=>'unseen'];
			$notification=$this->Admin_model->insert_notification($notification_data);
		
		
		
		redirect('retailers/addinvoice_edit?type=invoice'.'&requestid='.$requestid, 'refresh');
		
	}
	public function update_request_new()
	{
		$requestid=$this->input->post('requestid');
		
		$request_info = $this->Distributor_model->getRequest($requestid);
		
		//print_r($request_info);
	
		$distributor_info=$this->Customercrud_model->getProfileData($request_info->distributorid);
	
		$retailer_info = $this->Customercrud_model->getProfileData($request_info->retailerid);
		
		//print_r($retailer_info);
		$id = $this->session->userdata("ID");
					$row = $this->Customercrud_model->getProfileData($id);
					
					$retailerid = $row->ID;
					$distributor_info=$this->Customercrud_model->getProfileData($row->distributor_id);
					//$loanlist = $this->Distributor_model->getloanuser($retailerid);
					$loanlist = $this->Distributor_model->getproduct_details($distributor_info->product_id);
					$data['distributorid'] = $this->input->post('DistributorList');
		
	
		$data['invoicenumber'] = $this->input->post('invoicenumber');
		$data['invoiceamount'] = $this->input->post('invoiceamount');
		$data['product'] = $this->input->post('loanproduct');
		//$data['invoiceissuedby'] = $this->input->post('invoiceissuedby');
		$data['invoicedate'] = $this->input->post('invoicedate');
		$data['fundingamount'] = $this->input->post('funding');
		$data['totalcharges'] =  $this->input->post('totalcharges');
	
		
		$data['invoicenumber'] = $this->input->post('invoicenumber');
		
		$data['tenure'] = $this->input->post('loantenure');
		$data['remark']=$this->input->post('remarks');
		$data['status']="SendBack Action Taken By Retailer";
		//print_r($loanlist);
		
		$interestrate = $loanlist->interestrate;
		
		$processingfeetype = $loanlist->processingfeetype;
		
		$processingfee = $loanlist->processingfee;
		
		$requestedamount = $data['fundingamount'];
		
		$yearlyinterest = ($requestedamount*$interestrate)/100;
		
		$dailyinterest = $yearlyinterest/365;
		
		$tenure = $this->input->post('loantenure');
		
		$interest1= $tenure*$dailyinterest;
		
		if($processingfeetype == 'percentage')
		{
			$interest2 = ($processingfee*$requestedamount)/100;
			
		}
		else{
			
			$interest2 = $processingfee;
		}
	
		$totalcharges = $interest1+$interest2;
	
		$data['totalcharges'] = number_format((float)$totalcharges, 2, '.', '');
		
		$data['conveniencefee'] = number_format((float)$totalcharges, 2, '.', '');
		
		$data['additionaldeduction'] = $data['invoiceamount'] - $data['fundingamount'];
		
		//print_r($_REQUEST);
		
		//print_r($totalcharges);
		
		$disburseamount = $data['fundingamount'] - $totalcharges;
		
		 $data['disbursedamount'] = number_format((float)$disburseamount, 2, '.', '');
		
		$data['totalvalue'] = $data['invoiceamount'];
		//$data['createdate'] = 'now()';
		
		//$data['modifydate'] = 'now()';
		//print_r($data);
		//exit;
		$this->Retailer_model->update_request($requestid,$data);
	    $config['protocol']=PROTOCOL;
		$config['smtp_host']=SMTP_HOST; 
		$config['smtp_port']=SMTP_PORT; 
		$config['smtp_timeout']=SMTP_TIMEOUT;
		$config['smtp_crypto']=SMTP_CRYPTO; 
		$config['smtp_user']=SMTP_USER; 
		$config['smtp_pass']=SMTP_PASS;
		$from_email = FROM_EMAIL; 
		$config['charset']=CHARSET;
		$config['newline']=NEWLINE;
		$config['wordwrap'] = WORDWRAP2;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from($from_email, 'Finaleap'); 
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$distributor_info->EMAIL;
		//$send_email_to_support='patilpapiha@gmail.com';
		$this->email->to($send_email_to_support);
		
		$subject = 'Revert Action taken on invoice submitted '.$request_info->invoicenumber.' from retailer'.strtoupper($retailer_info->FN).' '.strtoupper($retailer_info->LN);
		$this->email->subject($subject);
		
		$data['request_info']=$request_info;
		$data['retailer_info']=$retailer_info;
		
		$data['distributor_info']=$distributor_info;
		$mailContent = $this->load->view('templates/revert_action_taken_by_retailer',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
						$this->sendemail(SCFEMAIL,$subject,$mailContent);
			$this->sendemail($distributor_info->EMAIL,$subject,$mailContent);
			
			$this->sendemail($retailer_info->EMAIL,$subject,$mailContent);
			
			$_SESSION['message'] = "Request sendback by retailer ";
						$_SESSION['title'] = "Request Sendback";
			}
			else
			{
				echo $this->email->print_debugger();
			}
			$notification_data=['user_id'=>$reteiler_id,'notification'=>'Revert Action taken by retailer for Invoice Number:'.$request_info->invoicenumber,'status'=>'unseen'];
			$notification=$this->Admin_model->insert_notification($notification_data);
		
		
		
		redirect('retailers/addinvoice_edit?type=invoice'.'&requestid='.$requestid, 'refresh');











		
		
		
	}
	/*-------------------------- addded by papiha on 01_09_2022----------------------------------------------*/
	public function managereports()
	{
		
		$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			//$this->load->view('header', $data);
			$id = $this->session->userdata('ID');
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
			$data['status']=$this->Retailer_model->getstatus($id);
			
			//print_r($_REQUEST);
			$startdate = "";
			if(isset($_REQUEST['Start_Date']) && $_REQUEST['Start_Date'] != '')
			{
			$startdate = $_REQUEST['Start_Date'];
			}
			
			$enddate = "";
			if(isset($_REQUEST['End_Date']) && $_REQUEST['End_Date'] )
			{
			$enddate = $_REQUEST['End_Date'];
			
			}
			
			$filter = "";
			if(isset($_REQUEST['status']) && $_REQUEST['status'] != '')
			{
			$filter = $_REQUEST['status'];
			}
		
		$invoicelist = $this->Retailer_model->getinvoicelist($startdate,$enddate,$filter);
		$data['invoicelist'] = $invoicelist;
		$this->load->view('dashboard_header', $data);
		$this->load->view('retailer/managereports', $data);
		
		
		
		
	}
	public function listreport()
	{
	
	    $filter_by=$_REQUEST['status'];
		
		
		if($filter_by=="")
		{
			$filter_by="all";
		}
	    $userType=$this->session->userdata("USER_TYPE");  
		$id = $this->session->userdata('ID');
	    $result = $this->Customercrud_model->getProfileData($id); 
	    $userid = $result->UNIQUE_CODE;
	    $draw = $_POST['draw'];
        $row = $_POST['start'];
		$rowperpage = $_POST['length']; // Rows display per page
		$columnIndex = $_POST['order'][0]['column']; // Column index
		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
		$searchValue = $_POST['search']['value']; // Search value
		 ## Search
		$searchQuery = " ";
	    $sel = $this->Retailer_model->getreportcount($userid,$filter_by);
	    $totalRecords = $sel;
	    $sel = $this->Retailer_model->getreportfilter($userid,$filter_by,$searchValue);
	    $totalRecordwithFilter =$sel;
	    $sel = $this->Retailer_model->getreportfilterlist($userid,$filter_by,$row,$rowperpage);
	    $empReceords = $sel;
	    $data = array();
		$invoiceamount = 0;
		$totalcharges = 0;
		$disbursedamount = 0;
		if(count($empReceords) > 0)
		{
			foreach($empReceords as $row)
				{
					if($row->status == 'Revert')
					{
								$link='<a style="margin-left: 8px; "href="'.base_url().'index.php/retailers/editrequest?id='.$row->id.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
					}
					else
					{
					
					$link = "";
					}
				   $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
				   $link1 = "";
				   $distributor_info=$this->Customercrud_model->getProfileData($row->distributorid);
				   $product_details = $this->Distributor_model->getproduct_details($distributor_info->product_id);
				   $retailer_info=$this->Customercrud_model->getProfileData($row->retailerid);
				   $ratailer_name=$distributor_info->dsa_firm_name;
				   if($product_details->interestsubvention=='No')
				   {
					   $convience_fee=0;
				   }
				   else{
					   $convience_fee=$row->totalcharges;
				   }
				   if(isset($row->invoiceamount) && $row->invoiceamount != '')
				   {
					   $invoiceamount += $row->invoiceamount;
				   }
	   
				   if(isset($row->totalcharges) && $row->totalcharges != '')
				   {
					  $totalcharges += $convience_fee;
				   }
	   
				   if(isset($row->disbursedamount) && $row->disbursedamount != '')
				   {
					  $disbursedamount += $row->disbursedamount;
				   }
	   
				   $data[] = array(
					   "invoicenumber"=>$row->invoicenumber,
					   "invoicedate"=>$row->invoicedate,
					   "invoiceamount"=>$row->invoiceamount,
					   "deduction"=>$row->additionaldeduction,
					   "disbursedamount"=>$row->disbursedamount,
					   "totalcharges"=>$convience_fee,
					   "name"=>$ratailer_name,
					   "status"=>$row->status,
					   
				   
				   );                                                                
			   }
	   
	   
			  
	
	
	        }
			$data[] = array(
				"invoicenumber"=>'',
				"invoicedate"=>'Total Sum',
				"invoiceamount"=>$invoiceamount,
				"deduction"=>'',
				"disbursedamount"=>$disbursedamount,
				"totalcharges"=>$totalcharges,
				"name"=>'',
				"status"=>'',
			
			 
			);
	
		 
			 
		 
		 $response = array(
		 "draw" => intval($draw),
		 "iTotalRecords" => $totalRecords,
		 "iTotalDisplayRecords" => $totalRecordwithFilter,
		 "aaData" => $data
		 );
		 echo json_encode($response);
	
	
	
	
	}


	public function sendemail($to,$subject,$message)
	{
		$config['protocol']=PROTOCOL;
		$config['smtp_host']=SMTP_HOST; 
		$config['smtp_port']=SMTP_PORT; 
		$config['smtp_timeout']=SMTP_TIMEOUT;
		$config['smtp_crypto']=SMTP_CRYPTO; 
		$config['smtp_user']=SMTP_USER; 
		$config['smtp_pass']=SMTP_PASS;
		$from_email = FROM_EMAIL; 
		$config['charset']=CHARSET;
		$config['newline']=NEWLINE;
		$config['wordwrap'] = WORDWRAP2;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from($from_email, 'Finaleap'); 
		
		$this->email->to($to);
		$this->email->subject($subject);
		
		$this->email->message($message); 
		if($this->email->Send())
			{
						
			}
			else
			{
				echo $this->email->print_debugger();
			}
		
		
	}
	/*-------------------------------- added by papiha on 13_01_2023--------------------------------------*/
	public function Co_applicant_bureau()
		{
			
			         //$user_data=$this->Credit_model->get_more_info($data['applicant_id']);
					 $url ='https://ists.equifax.co.in/cir360service/cir360report';
                     $dataInput = '{
                     "RequestHeader": {
                        "CustomerId": "8620",
                        "UserId": "STS_FNLCCR",
                        "Password": "W3#QeicsB",
                        "MemberNumber": "027FZ30055",
                        "SecurityCode": "7KL",
                        "CustRefField": "123456",
                        "ProductCode": [
                            "CCR"
                        ]
                    },
                     "RequestBody": {
                         "InquiryPurpose": "05",
                         "FirstName": "VENKATA",
                         "MiddleName": "KRISHNAYYA",
                         "LastName": "RUDRA",
                         "DOB": "1952-12-17",
                         "InquiryAddresses": [
                             {
                                 "seq": "1",
                                 "AddressType": ["H"],
                                 "AddressLine1": "FLAT.NO.414, AJAYA ARCADE, NEAR VIJETHA SUPER MARKET, SECOND, PRAGATHI NAGAR, HYDERABAD",
                                 "State": "MH",
                                 "Postal": "500090"
                             }
                         ],
                         "InquiryPhones": [
                             {
                                 "seq": "1",
                                 "Number": "",
                                 "PhoneType": ["M" ]
                             } ],
                         "IDDetails": [
                             {
                                 "seq": "1",
                                 "IDValue": "ACJPR6598P",
                                 "IDType": "T"
                             },
                             {
                                 "seq": "2",
                                 "IDValue": "",
                                 "IDType": ""
                             }
                         ],
                         "MFIDetails": {
                             "FamilyDetails": [
                                 {
                                    "seq": "1",
                                     "AdditionalNameType":"O",
                                     "AdditionalName": ""
                                 }
                             ]
                         }
                     },
                     "Score": [
                         {
                             "Type": "ERS",
                             "Version": "3.1"
                         }
                     ]
                 }';
                 
                 $ch= curl_init($url);
                 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                 curl_setopt($ch, CURLOPT_POST, 1);
                 curl_setopt($ch, CURLOPT_POSTFIELDS, $dataInput);
                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                 $arr = curl_exec($ch);
                 $respnse = $arr;
                  $dataArr = json_decode($arr);
                 curl_close($ch);
				print_r($dataArr);
				exit;
				if(isset($dataArr->CCRResponse))
                {
					$bureau_status='success';
				}
				else
				{
					  if(isset($dataArr->Error))
                    {
                        if(isset($dataArr->Error->ErrorDesc))
                        {  
							$bureau_status= $dataArr->Error->ErrorDesc;
						}
					}
				}
				
			
				
		}
		/*----------------------------------------------------- addded by papiha on 16_01_2023----------------------------------------*/
		public function check_Bureau()
		{
			$ID=$_GET['id'];
			$propriter = $this->Customercrud_model->get_propriter($ID);
			$p =json_decode(json_encode ( $propriter ) , true);
			$propriters=$p[0];
			$data['propriters']=$propriters;
			$row = $this->Customercrud_model->getProfileData($ID);
	        $data['status']=$this->Retailer_model->getstatus($ID);
			$data['row'] = $row;
			if(count($propriter)==1)
			{
			    $data['propriters']=$propriters;
				$this->load->view('dashboard_header', $data);
				$this->load->view('retailer/bureau_pull',$data);
			
			}
			else if(count($propriter)==0)
			{
				echo "No Proprietor found";
			}
			else if(count($propriter)>1)
			{
				echo "multiple p";
			}
			
		}
		/*---------------------------------------- addded by papiha on 17_01_2021--------------------------------------------*/
		public function pull_Bureau()
		{
			
			list($first, $middle, $last) = explode(" ", $this->input->post('f_name'));
			$dis_id=$this->input->post('ID');
			$id=$dis_id;
			
			$data=array
					(
					   'applicant_id'=>$this->input->post('d_id'),
					   'first_name'=>$first,
					   'middle_name'=>$middle,
					   'last_name'=>$last,
					   'date_of_birth'=>$this->input->post('dob'),
					   'pan_number'=>$this->input->post('d_pan'),
					   'pincode_'=>$this->input->post('d_pincode'),
					   'city'=>$this->input->post('d_city'),
					   'state_abbr'=>$this->input->post('d_abbr') , 
					   'address_'=>$this->input->post('d_Address'),
					 
					);
			       
					 $url ='https://ists.equifax.co.in/cir360service/cir360report';
                     $dataInput = '{
                     "RequestHeader": {
                        "CustomerId": "8620",
                        "UserId": "STS_FNLCCR",
                        "Password": "W3#QeicsB",
                        "MemberNumber": "027FZ30055",
                        "SecurityCode": "7KL",
                        "CustRefField": "123456",
                        "ProductCode": [
                            "CCR"
                        ]
                    },
                     "RequestBody": {
                         "InquiryPurpose": "05",
                         "FirstName": "'.$data['first_name'].'",
                         "MiddleName": "'.$data['middle_name'].'",
                         "LastName": "'.$data['last_name'].'",
                         "DOB": "'.$data['date_of_birth'].'",
                         "InquiryAddresses": [
                             {
                                 "seq": "1",
                                 "AddressType": ["H"],
                                 "AddressLine1": "'.$data['address_'].'",
                                 "State": "'.$data['state_abbr'].'",
                                 "Postal": "'.$data['pincode_'].'"
                             }
                         ],
                         "InquiryPhones": [
                             {
                                 "seq": "1",
                                 "Number": " ",
                                 "PhoneType": ["M" ]
                             } ],
                         "IDDetails": [
                             {
                                 "seq": "1",
                                 "IDValue": "'.$data['pan_number'].'",
                                 "IDType": "T"
                             },
                             {
                                 "seq": "2",
                                 "IDValue": "",
                                 "IDType": ""
                             }
                         ],
                         "MFIDetails": {
                             "FamilyDetails": [
                                 {
                                    "seq": "1",
                                     "AdditionalNameType":"O",
                                     "AdditionalName": ""
                                 }
                             ]
                         }
                     },
                     "Score": [
                         {
                             "Type": "ERS",
                             "Version": "3.1"
                         }
                     ]
                 }';
                
                 $ch= curl_init($url);
                 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                 curl_setopt($ch, CURLOPT_POST, 1);
                 curl_setopt($ch, CURLOPT_POSTFIELDS, $dataInput);
                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                 $arr = curl_exec($ch);
                 $respnse = $arr;
                  $dataArr = json_decode($arr);
				
                 curl_close($ch);
				 $dataArr = json_decode($arr);
					 $code = $dataArr->InquiryResponseHeader->SuccessCode;
					 if($code == 1)
					{
						if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->Error))
						{
							  $customer_id= $id;
							  $creditSaveArray['customer_id'] = $id;
							  $this->session->set_userdata('Coapplicant_id',$customer_id);
							  if(isset($dataArr->Error->ErrorDesc))
							  {
								   $score_error = $dataArr->Error->ErrorDesc;
								   $score_error_dic= $dataArr->Error->ErrorDesc;
								   //$creditSaveArray['score'] = 0;
								   //$creditSaveArray['micro_score']=0;
								   $creditSaveArray['score_success'] = $score_error_dic;
								   $customer_id= $id;
								   $this->session->set_userdata('Coapplicant_id',$customer_id);
								   $creditSaveArray['customer_id'] = $id;
								   $creditSaveArray['response'] = $respnse;
								   $this->session->set_userdata("result", 3);
								   $this->session->set_userdata('score_success', $score_error_dic);
								   $this->Customercrud_model->save_credit_score($creditSaveArray);
    							   redirect('distributor/addretailerall');
						 
							  }
							  $error_code = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorCode;
						      $creditSaveArray['customer_id']=$customer_id;
						      $score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
							  if($error_code >='E0401' && $error_code<='E0420')
							  {
									$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
									$this->session->set_userdata('error_code', $error_code);
									$this->session->set_userdata('score_error_desc', $score_error );
									//$creditSaveArray['score'] = 0;
									//$creditSaveArray['score_success'] = $score_error;
									$this->session->set_userdata('score_success', $score_error);
									$this->session->set_userdata("result", 3);
									redirect('distributor/addretailerall');
							  }
							  else if($error_code==00 && $score_error=='Consumer not found in bureau')
							  { 
									$this->session->set_userdata('error_code', $error_code);
									$this->session->set_userdata('score_error_desc', $score_error );
									$creditSaveArray['score'] = 0;
									$array_input_more['Score']= 0;
									$customer_id= $id;
									$creditSaveArray['customer_id'] = $id;
									$this->session->set_userdata('Coapplicant_id',$customer_id);
									if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorDesc))
									{
										if($error_code==00 && $dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorDesc=='Consumer not found in bureau')
										{
											$creditSaveArray['micro_score'] = 0;
											$array_input_more['micro_score']=0;
										 }
										else
										{
									 		$creditSaveArray['score'] = 0;
											$array_input_more['Score']= 0;
											if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
											{
												$creditSaveArray['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
												$array_input_more['micro_score']=$creditSaveArray['micro_score'] ;
											}
											else
											{
												$creditSaveArray['micro_score']=0;
												$array_input_more['micro_score']= 0;
											}
										}
									}
									else
									{
										$creditSaveArray['score'] = 0;
										$array_input_more['Score']= 0;
										if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
										{
												$creditSaveArray['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
												$array_input_more['micro_score']=$creditSaveArray['micro_score'] ;

										}
										else
										{
												$creditSaveArray['micro_score']=0;
												$array_input_more['micro_score']= 0;
										}
									}
									$creditSaveArray['response'] = $respnse;
									$creditSaveArray['score_success'] = $score_error;
									$customer_id= $id;
									$creditSaveArray['customer_id']=$customer_id;
									//$this->Customercrud_model->save_credit_score($data);// save data into credit score table
									$id_result_update = $this->Customercrud_model->update_coapplicant($customer_id,$array_input_more); // save score and micro score in coapplicant table
    								$this->session->set_userdata('score_success', $score_error);
									$this->session->set_userdata("result", 4);
									$this->Customercrud_model->save_credit_score($creditSaveArray);

									redirect('distributor/addretailerall');
							  }
							  else if($error_code >='E0401' && $error_code<='E0420') //else if for condition c) 
							  {
									//$creditSaveArray['score'] = 0;
									$customer_id= $id;
									$creditSaveArray['customer_id'] = $id;
									//$creditSaveArray['micro_score']=0;
									$creditSaveArray['response'] = $respnse;
									$this->session->set_userdata('Coapplicant_id',$customer_id);
									$creditSaveArray['score_success'] ='Something Wrong in your file';
									$this->session->set_userdata("result", 3);
									$this->session->set_userdata('score_success', $data['score_success']);
									$this->Customercrud_model->save_credit_score($creditSaveArray);
									redirect('distributor/addretailerall');
							  }
							  else 
							  {
								  if($error_code == 'GSWDOE116')
								  {
								    $strpos = strpos($score_error, ':');
									$score_error = substr($score_error, ($strpos+1));
								  }
									$score_error_dic= $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
								  	//$creditSaveArray['score'] = 0;
									//$creditSaveArray['micro_score']=0;
									$creditSaveArray['score_success'] = $score_error_dic;
									$customer_id= $id;
									$this->session->set_userdata('Coapplicant_id',$customer_id);
									$creditSaveArray['customer_id'] = $id;
									$creditSaveArray['response'] = $respnse;
									$this->session->set_userdata("result", 3);

									$this->session->set_userdata('score_success', $score_error_dic);
									$this->Customercrud_model->save_credit_score($creditSaveArray);
									redirect('distributor/addretailerall');
							  }

						}
						else
						{
							 $score = $dataArr->CCRResponse->CIRReportDataLst[0]->CIRReportData->ScoreDetails[0]->Value;
							 $creditSaveArray = [];
						     $creditSaveArray['customer_id'] = $id;
						     $this->session->set_userdata('Coapplicant_id',$id);
						     $creditSaveArray['score'] = $score;
						     $array_input_more['Score']= $score;
							 if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
								{
									$creditSaveArray['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
									$array_input_more['micro_score']=$creditSaveArray['micro_score'] ;

								}
							 else
								{
									$creditSaveArray['micro_score']=0;
									$array_input_more['micro_score']= 0;
								}
								if($respnse!='')
								$creditSaveArray['response'] = $respnse;
								$creditSaveArray['checked_dts'] = date("Y-m-d h:m:s");
								$creditSaveArray['score_success'] ="Success";
								$data['score_success'] ="Success";
								$this->Customercrud_model->save_credit_score($creditSaveArray);
								$customer_id= $id;
				   			    $id_result_update = $this->Customercrud_model->update_coapplicant($customer_id,$array_input_more);
  								$this->session->set_flashdata("result", 1);
								  $send_rseponse =json_decode($arr,true);
								 //$dataemail = $this->send_internal_bureau_pdf($send_rseponse,$id);
								if($dataemail['email_status']=='success')
                                 {
									redirect('distributor/addretailerall');
								 }
								 else
								 {
									redirect('distributor/addretailerall');
								 }
								
						
						}
					}
					 else if ($code == 0)
					 {
							$customer_id= $id;
							$creditSaveArray['customer_id'] = $id;
							$this->session->set_userdata('Coapplicant_id',$customer_id);
							if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc))
							{
								$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
						    }
							else if(isset($dataArr->Error->ErrorDesc))
							{
								$score_error = $dataArr->Error->ErrorDesc;
								$score_error_dic= $dataArr->Error->ErrorDesc;
								//$creditSaveArray['score'] = 0;
								//$creditSaveArray['micro_score']=0;
								$creditSaveArray['score_success'] = $score_error_dic;
								$customer_id= $id;
								$creditSaveArray['customer_id'] = $id;
								$creditSaveArray['response'] = $respnse;
								$this->session->set_userdata("result", 3);
								$this->session->set_userdata('score_success', $score_error_dic);
								$this->Customercrud_model->save_credit_score($creditSaveArray);
    							redirect('retailers/check_Bureau?id='.$dis_id);
							}
							$error_code = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorCode;
							$creditSaveArray['customer_id']=$customer_id;
							if($error_code >='E0401' && $error_code<='E0420')
							{
								$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
								$this->session->set_userdata('error_code', $error_code);
								$this->session->set_userdata('score_error_desc', $score_error );
								//$creditSaveArray['score'] = 0;
								$creditSaveArray['score_success'] = $score_error;
								$this->session->set_userdata('score_success', $score_error);
								$this->session->set_userdata("result", 3);
								redirect('retailers/check_Bureau?id='.$dis_id);
							}
							else if($error_code==00 && $score_error=='Consumer not found in bureau')
							{   
								$this->session->set_userdata('error_code', $error_code);
								$this->session->set_userdata('score_error_desc', $score_error );
								$creditSaveArray['score'] = 0;
								$array_input_more['Score']= 0;
								$customer_id= $id;
								$creditSaveArray['customer_id'] = $id;
						
								 if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorDesc))
								 {
										 if($error_code==00 && $dataArr->CCRResponse->CIRReportDataLst[1]->Error->ErrorDesc=='Consumer not found in bureau')
										 {
											$creditSaveArray['micro_score'] = 0;
											$array_input_more['micro_score']=0;
										 }
										 else
										 {
									 
											 $creditSaveArray['score'] = 0;
											 $array_input_more['Score']= 0;
											 if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
											 {
													$creditSaveArray['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
													$array_input_more['micro_score']=$creditSaveArray['micro_score'] ;

											 }
											 else
											 {
													$creditSaveArray['micro_score']=0;
													$array_input_more['micro_score']= 0;
											 }
										 }
								 }
								 else
								 {
											$creditSaveArray['score'] = 0;
											 $array_input_more['Score']= 0;
											 if(isset($dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value))
											 {
													$creditSaveArray['micro_score']=$dataArr->CCRResponse->CIRReportDataLst[1]->CIRReportData->ScoreDetails[0]->Value;
													$array_input_more['micro_score']=$creditSaveArray['micro_score'] ;

											 }
											 else
											 {
													$creditSaveArray['micro_score']=0;
													$array_input_more['micro_score']= 0;
											 }
								 }
								$creditSaveArray['response'] = $respnse;
								$creditSaveArray['score_success'] = $score_error;
								$customer_id= $id;
								$creditSaveArray['customer_id']=$customer_id;
								//$this->Customercrud_model->save_credit_score($data);// save data into credit score table
								$id_result_update = $this->Customercrud_model->update_coapplicant($customer_id,$array_input_more); // save score and micro score in coapplicant table
    							$this->session->set_userdata('score_success', $score_error);
								$this->session->set_userdata("result", 4);
								$this->Customercrud_model->save_credit_score($creditSaveArray);
								redirect('retailers/check_Bureau?id='.$dis_id);
							}
							else if($error_code >='E0401' && $error_code<='E0420') //else if for condition c) 
							{
                               // $creditSaveArray['score'] = 0;
								$customer_id= $id;
				                $creditSaveArray['customer_id'] = $id;
								//$creditSaveArray['micro_score']=0;
								$creditSaveArray['response'] = $respnse;
								$creditSaveArray['score_success'] ='Something Wrong in your file';
								$this->session->set_userdata("result", 3);
								$this->session->set_userdata('score_success', $data['score_success']);
								$this->Customercrud_model->save_credit_score($creditSaveArray);
								redirect('retailers/check_Bureau?id='.$dis_id);
      	
							}
							else 
							{
				
								  if($error_code == 'GSWDOE116')
								  {
									  $strpos = strpos($score_error, ':');
									  $score_error = substr($score_error, ($strpos+1));
								  }
								$score_error_dic= $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
								//$creditSaveArray['score'] = 0;
								//$creditSaveArray['micro_score']=0;
								$creditSaveArray['score_success'] = $score_error_dic;
								$customer_id= $id;
								$creditSaveArray['customer_id'] = $id;
								$creditSaveArray['response'] = $respnse;
								$this->session->set_userdata("result", 3);
								$this->session->set_userdata('score_success', $score_error_dic);
								$this->Customercrud_model->save_credit_score($creditSaveArray);

								redirect('retailers/check_Bureau?id='.$dis_id);
							}
					 }
					 	redirect('retailers/check_Bureau?id='.$dis_id);
		}

	
	
	
}
?>