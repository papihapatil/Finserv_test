<?php
date_default_timezone_set('asia/kolkata');
defined('BASEPATH') OR exit('No direct script access allowed');


class Distributor extends CI_Controller 
{

    public function __construct() 
	{
        parent:: __construct();
		
		//echo "Test";
		
		//exit;

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('email');
		//$this->load->model('Regional_Model');
		$this->load->model('Operations_user_model');
		$this->load->model('Customercrud_model');
		$this->load->model('Admin_model');
		$this->load->model('Dsacrud_model');
		$this->load->model('Distributor_model');
		
		
		$this->load->model('Retailer_model');
		
        $this->load->helper(array('form', 'url'));

    }
	
	
	public function index()
	{
		//echo "This is test.";
		//echo "Test";
		
		//exit;
		
		 $id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
	//	 print_r($row);
		 
		 $data['row'] = $row;
		
//exit;
		
		$this->load->view('dashboard_header', $data);
		
	}
	
	public function test()
	{
		
		echo "HI";
		
	}
	
	
	public function addretailer()
	{
		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
	//	 print_r($row);
		 
		 $data['row'] = $row;
		$this->load->view('dashboard_header', $data);
		
		//echo "This test";
		
		$this->load->view('distributor/listretailers', $data);
		
		
		
		
		//echo "Add retailer will come here...";
	}
	
	
	public function manageretailers()
	{
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'distributor')
		{		
            redirect(base_url('index.php/login'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');

            //$Credit_manager_user_arr = $this->Admin_model->getCredit_manager_user($s);
            //$_SESSION["data_for_excel"] =$Credit_manager_user_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           // $data['data'] =$Credit_manager_user_arr;
            $this->load->view('admin/admin_dashbord', $data);
          //  $this->load->view('admin/Credit_manager_users', $data);
		  //print_r($data);
		 // echo "Test";
		//exit;
          $this->load->view('distributor/manageretailers',$data)   ;
			
        }     
		
		
	}
	
	public function listretailers3()
	{
		echo "List retailers will come heer";
		
	}
	
	public function manageretailer()
	{
		
		//echo "This is my teswt";
		
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'distributor')
		{		
            redirect(base_url('index.php/login'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');

            //$Credit_manager_user_arr = $this->Admin_model->getCredit_manager_user($s);
            //$_SESSION["data_for_excel"] =$Credit_manager_user_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           // $data['data'] =$Credit_manager_user_arr;
            $this->load->view('admin/admin_dashbord', $data);
          //  $this->load->view('admin/Credit_manager_users', $data);
		  //print_r($data);
		 // echo "Test";
		//exit;
          $this->load->view('distributor/manageretailers',$data)   ;
			
        }   
	}
	
	
	public function listretailers()
	{
		
		
		//echo "This is my teswt";
		
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') != 'distributor')
		{		
            redirect(base_url('index.php/login'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');

            //$Credit_manager_user_arr = $this->Admin_model->getCredit_manager_user($s);
            //$_SESSION["data_for_excel"] =$Credit_manager_user_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           // $data['data'] =$Credit_manager_user_arr;
            $this->load->view('dashboard_header', $data);
          //  $this->load->view('admin/Credit_manager_users', $data);
		  //print_r($data);
		 // echo "Test";
		//exit;
          $this->load->view('distributor/manageretailers',$data)   ;
			
        }   
	
		
		
	}
	
	
	public function assignproduct()
	{
		//echo "TEST";
		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
	//	 print_r($row);
		 
		 $data['row'] = $row;
		 
		 $productlist = $this->Distributor_model->getLoanProduct();
		 
		 //print_r($productlist);
		 
		 $data['productlist'] = $productlist;
		 
		 
		
//exit;
		
		$this->load->view('dashboard_header', $data);
		
		 $this->load->view('distributor/assignproduct',$data);
		
	}
	
	
	public function saveloanproduct()
	{
		//print_r($_REQUEST);
		
		$data['userid'] = $_REQUEST['userid'];
		
		$data['loanid'] = $_REQUEST['loanid'];
		
		$this->Distributor_model->loanuser($data);
		
		redirect('distributor/manageproduct', 'refresh');
		
		
		
	}
	
	public function manageproduct()
	{
		
		 $id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
	//	 print_r($row);
		 
		 $data['row'] = $row;
		
//exit;
		
		$this->load->view('dashboard_header', $data);
		
		 $this->load->view('distributor/manageproduct',$data);
		
		
	}
	
	public function listproduct()
	{
		//echo "TEST ";
		
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
	 
	 $sel = $this->Distributor_model->getproductcount();
	 
	  $totalRecords = $sel;
	 
	 $sel = $this->Distributor_model->getproductfilter();
	 
	  $totalRecordwithFilter =$sel;
	 
	 $sel = $this->Distributor_model->getproduct();
	 
	//print_r($sel);
	 
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
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                                                                          
               $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
              
        
        $data[] = array(
             //"ID"=>$row->ID,
            "name"=>$row->name,
            "interestrate"=>$row->interestrate,
            "processingfeetype"=>$row->processingfeetype,
          
            "processingfee"=>$row->processingfee,  
           
            "tenure"=> $row->tenure,
				"interestsubvention"=> $row->interestsubvention,
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
	
	
	public function saveproduct()
	{
		
		//print_r($_REQUEST);
		
		$filter_by=$this->input->post('filter');
		
		$data['name'] = $this->input->post('name');
		
		$data['interestrate'] = $this->input->post('interestrate');
		
		$data['processingfeetype'] = $this->input->post('processinfeetype');
		
		$data['processingfee'] = $this->input->post('processingfee');
		
		$data['tenure'] = $this->input->post('tenure');
		
		$data['interestsubvention'] = $this->input->post('interstsubvention');
		
		$row = $this->Distributor_model->saveloanproduct($data);
		
		redirect('distributor/manageproduct', 'refresh');
		
	}
	
	public function addproduct()
	{
		
		 $id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
	//	 print_r($row);
		 
		 $data['row'] = $row;
		
//exit;
		
		$this->load->view('dashboard_header', $data);
		
		 $this->load->view('distributor/addproduct',$data);
		
		
		
	}
	
	public function retailerbulkupload()
	{
		
		
	}
	
	public function managedistributor()
	{
		
		
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'distributor')
		{		
            redirect(base_url('index.php/login'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');

            //$Credit_manager_user_arr = $this->Admin_model->getCredit_manager_user($s);
            //$_SESSION["data_for_excel"] =$Credit_manager_user_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           // $data['data'] =$Credit_manager_user_arr;
           $this->load->view('admin/admin_dashbord', $data);
			
			//$this->load->view('dashboard_profile_header', $data);
          //  $this->load->view('admin/Credit_manager_users', $data);
		  //print_r($data);
		 // echo "Test";
		//exit;
          $this->load->view('distributor/managedistributor',$data);
			
        }        
	}
	
	public function listsupplychainmanager()
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
	 
	 $draw = $_POST['draw'];
     $row = $_POST['start'];
     $rowperpage = $_POST['length']; // Rows display per page
     $columnIndex = $_POST['order'][0]['column']; // Column index
    
     $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
     
     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
     $searchValue = $_POST['search']['value']; // Search value
     ## Search
     $searchQuery = " ";
	 
	 $sel = $this->Distributor_model->getscmcount();
	 
	  $totalRecords = $sel;
	 
	 $sel = $this->Distributor_model->getscmfilter();
	 
	  $totalRecordwithFilter =$sel;
	 
	 $sel = $this->Distributor_model->getscm();
	 
	// print_r($distributorlist);
	 
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
	
	public function supplychainmanagerdashboard()
	{
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
		
				$this->load->view('distributor/managerequest', $data);
		
		
		
	}
	
	public function supplychainmanager()
	{
		
		if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'distributor')
		{		
            redirect(base_url('index.php/login'));
        }
		else
		{
			$this->load->helper('url');  
            $age = $this->session->userdata('AGE');
            $s = $this->input->get('s');

            //$Credit_manager_user_arr = $this->Admin_model->getCredit_manager_user($s);
            //$_SESSION["data_for_excel"] =$Credit_manager_user_arr;
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
           // $data['data'] =$Credit_manager_user_arr;
           $this->load->view('admin/admin_dashbord', $data);
			
			//$this->load->view('dashboard_profile_header', $data);
          //  $this->load->view('admin/Credit_manager_users', $data);
		  //print_r($data);
		 // echo "Test";
		//exit;
          $this->load->view('distributor/supplychainmanager',$data)   ;
			
        } 
		
	}
	
	
	public function listdistributor()
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
	 
	 $draw = $_POST['draw'];
     $row = $_POST['start'];
     $rowperpage = $_POST['length']; // Rows display per page
     $columnIndex = $_POST['order'][0]['column']; // Column index
    
     $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
     
     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
     $searchValue = $_POST['search']['value']; // Search value
     ## Search
     $searchQuery = " ";
	 
	 $sel = $this->Distributor_model->getdistributorcount();
	 
	  $totalRecords = $sel;
	 
	 $sel = $this->Distributor_model->getdistributorcountfilter();
	 
	  $totalRecordwithFilter =$sel;
	 
	 $sel = $this->Distributor_model->getdistributor();
	 
	// print_r($distributorlist);
	 
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
		
				$this->load->view('distributor/managerequest', $data);
		
		
	}
	
	public function listrequest()
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
	  $sel = $this->Distributor_model->getrequestcount($userid);
	 
	 
	 
	  $totalRecords = $sel;
	 
	  $sel = $this->Distributor_model->getrequestfilter($userid);
	 
	  $totalRecordwithFilter =$sel;
	  
	  //exit;
	 
	 $sel = $this->Distributor_model->getrequestfilterlist($userid);
	 
	// print_r($sel);
	 
	// exit;
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
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/distributor/addinvoice?type=invoice&requestid='.$row->id.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                                                                          
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
		
		
		
		public function updaterequest()
		{
			
			
			
		}
	
	
	
	public function listinvoice()
	{
		
		//echo "This is test";
		$filter_by=$this->input->post('filter');
    
    $filter_by=$this->input->post('filter');
    if($filter_by=="")
    {
        $filter_by="all";
    }
	/*$userType=$this->session->userdata("USER_TYPE");  
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
	 
	 */
	 
	 $Start_Date=$_POST['Start_Date'];
  
  $End_Date=$_POST['End_Date'];
  $filter_by=$_POST['filter'];
   $Reffered_by=$_POST['Reffered_by'];
      $location=$_POST['location'];
     # Read value
     $draw = $_POST['draw'];
      $row = $_POST['start'];
     $rowperpage = $_POST['length']; // Rows display per page
     $columnIndex = $_POST['order'][0]['column']; // Column index
     $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
     $searchValue = $_POST['search']['value']; // Search value

	 
	 $sel = $this->Distributor_model->getinvoicecount($filter_by);
	 
	  $totalRecords = $sel;
	 
	 $sel = $this->Distributor_model->getinvoicefilter($filter_by,$searchValue,$filter_by,$Start_Date,$End_Date,$Reffered_by,$location);
	 
	  $totalRecordwithFilter =$sel;
	 
	 $sel = $this->Distributor_model->getinvoice($filter_by,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by,$Start_Date,$End_Date);
	 
	// print_r($distributorlist);
	 
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
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/distributor/updatestatus?id='.$row->id.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                                                                          
               $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
              
        
        $data[] = array(
             //"ID"=>$row->ID,
            //"invoiceissuedby"=>$row->invoiceissuedby,
            "invoicenumber"=>$row->invoicenumber,
            "invoicedate"=>$row->invoicedate,
          
            "invoiceamount"=>$row->invoiceamount,  
           "product"=>$row->product,
		   "fundingamount"=>$row->fundingamount,
		   "invoicestatus"=>$row->invoicestatus,
            //"Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
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
	
	public function manageinvoice()
	{
		
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
		
				$this->load->view('distributor/manageinvoice', $data);

		
	}
	
	public function createinvoice()
	{
		
		echo "Create invoice will come here";
		
	}
	
	public function saveinvoice()
	{
		
		/* code to export files to Nextcloud starts here */
					$time = time();
					
					$id = $this->session->userdata("ID");
					$row = $this->Customercrud_model->getProfileData($id);
					
					$distributorid = $row->ID;
					
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
		$data['product'] = $this->input->post('product');
		$data['invoiceissuedby'] = $this->input->post('invoiceissuedby');
		$data['invoicedate'] = $this->input->post('invoicedate');
		
		$data['requestid'] = $this->input->post('requestid');
		
		$data['totalpayment'] = $this->input->post('totalpayment');
		
		$data['tenure'] = $this->input->post('tenure');
		
		
		//$data['invoicedate'] = $this->input->post('invoicedate');
		
		$data['retailerid'] = $this->input->post('retailerid');
		
		$data['distributorid'] = $distributorid;
		
		$data['filename'] = $filename;
		
		$data['dirname'] = $dirname;
		
		$data['fundingamount'] = $this->input->post('fundingamount');
		
		//$data['modifydate'] = 'now()';
		
		$this->Distributor_model->saveinvoice($data);
		
		redirect('distributor/manageinvoice', 'refresh');
	}
	
	
	public function addinvoice()
	{
		
		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
	//	 print_r($row);
		 
		 $data['row'] = $row;
		 
		 $RetailerList = $this->Distributor_model->getretailerlist();
		 
		 $requestid = $_REQUEST['requestid'];
		 
		 
		 $Request = $this->Distributor_model->getRequest($requestid);
		 
		 //print_r($Request);
		 
		 $data['Request'] = $Request;
		 
		 $data['RetailerList']  = $RetailerList;
		 
		 
		$this->load->view('dashboard_header', $data);
		
		//echo "This test";
		
		$this->load->view('distributor/addinvoice', $data);
		
		
		
		
		//$this->
	}
	
	
	public function addretailerall()
	{
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
	//	 print_r($row);
		 
		 $data['row'] = $row;
		$this->load->view('dashboard_header', $data);
		
		//echo "This test";
		
		$this->load->view('distributor/listretailers', $data);
		
		
		
		
		
	}
	
	public function adddistributorall()
	{
		
		
		
		
	}
	
	public function managerequestall()
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
		
				$this->load->view('distributor/managerequest', $data);
		
	}
	
	
	public function manageinvoiceall()
	{
		//echo "Manage invoice will come hr=ere=";
		
		$id = $this->session->userdata('ID');
		 
		// echo "Ted";
		 
		 $row = $this->Customercrud_model->getProfileData($id);
		// echo "Hi";
		 
		 //print_r($row);
		 
		 $data['row'] = $row;
		
//exit;

$invoicelist = $this->Distributor_model->getinvoicelistall();

$data['invoicelist'] = $invoicelist;

//print_r($invoicelist);
		
		$this->load->view('dashboard_header', $data);
		
				$this->load->view('distributor/manageinvoice', $data);

		
		
		
	}
	
	
	public function listrequestall()
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
	  $sel = $this->Distributor_model->getrequestcountall();
	 
	 
	 
	  $totalRecords = $sel;
	 
	  $sel = $this->Distributor_model->getrequestfilterall();
	 
	  $totalRecordwithFilter =$sel;
	  
	  //exit;
	 
	 $sel = $this->Distributor_model->getrequestfilterlistall();
	 
	// print_r($sel);
	 
	// exit;
	 $empReceords = $sel;
	 
	  $data = array();

	if(isset($empReceords) && $empReceords!='')
		{
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
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/distributor/addinvoice?type=invoice&requestid='.$row->id.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                                                                          
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
}
?>