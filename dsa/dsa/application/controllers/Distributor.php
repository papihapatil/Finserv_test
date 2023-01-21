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
			$dashboard_data = $this->Dsacrud_model->getDashboardData_Distributor($id);            
			$data['dashboard_data'] = $dashboard_data;
			$data['status']=$this->Retailer_model->getstatus($id);
            $this->load->view('dashboard_header', $data);
			$this->load->view('distributor/dashboard_new', $data);
			//$this->load->view('footer');
			//echo "hello";
			}
		}
	}
	
	public function test()
	{
		
		echo "HI";
		
	}
	public function reset_password()
	{
		$id = $this->session->userdata('ID');
		$data['type'] = $this->session->userdata("USER_TYPE");
		$data['id']=$id;
		$this->load->view('dsa/set_password',$data);
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
	  
	  //print_r($_REQUEST);
	 
	 $sel = $this->Distributor_model->getproduct();
	 
	//print_r($sel);
	 
	 $empReceords = $sel;
	 
	  $data = array();
if(isset($empReceords) && $empReceords != '')
{
     foreach($empReceords as $row)
         {
            
            
            if(isset($row->Profile_Status) && $row->Profile_Status=="Complete") 
            {
             $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
              }
              else
               { 
                 $incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
                
               } 
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/distributor/updateproduct?id='.$row->id.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                                                                          
              // $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = '.$row->id.' data-target="#deleteModel"   class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
              
        $link1='&nbsp;<i class="fa fa-trash text-right" onclick="if(confirm(\'Press a button!\')) { deleteproduct('.$row->id.');  };" style="color:red;"></i>';
              
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
		
		 $tenure = implode(",",$_REQUEST['tenure2']);
		 
		 $tenure = $this->input->post('tenure');
		
		//exit;
		
		$filter_by=$this->input->post('filter');
		
		$data['name'] = $this->input->post('name');
		$data['product_code'] = $this->input->post('product_code');
		$data['interestrate'] = $this->input->post('interestrate');
		
		$data['processingfeetype'] = $this->input->post('processinfeetype');//amount/percentage
		
		$data['processingfee_yes_no'] = $this->input->post('processing_fees');//yes/no
		if($this->input->post('processinfeetype')=='fixed')
		{

		$data['processingfee'] = $this->input->post('proceesing_fees_in_amt');
		}
		else if($this->input->post('processinfeetype')=='percentage')
		{
			$data['processingfee'] = $this->input->post('proceesing_fees_in_per');
		}
		
		$data['tenure'] = $tenure;
		
		
		$data['startdate'] = $this->input->post('start_date');
		
		$data['enddate'] = $this->input->post('End_date');
		
		$data['interestsubvention'] = $this->input->post('interstsubvention');
		
		$row = $this->Distributor_model->saveloanproduct($data);
		
		$_SESSION['title']='Product Added';
		$_SESSION['message'] = "Product added by distributor.";
		
		redirect('distributor/manageproduct', 'refresh');
		
	}
	
	
	public function editproduct()
	{
		
		//print_r($_REQUEST);
		
		 $tenure = implode(",",$_REQUEST['tenure2']);
		 
		 $tenure = $this->input->post('tenure');
		
		//exit;
		
		$filter_by=$this->input->post('filter');
		
		$data['name'] = $this->input->post('name');
		$data['product_code'] = $this->input->post('product_code');
		$data['interestrate'] = $this->input->post('interestrate');
		
		$data['processingfeetype'] = $this->input->post('processinfeetype');//amount/percentage
		
		$data['processingfee_yes_no'] = $this->input->post('processing_fees');//yes/no
		if($this->input->post('processinfeetype')=='fixed')
		{

		$data['processingfee'] = $this->input->post('proceesing_fees_in_amt');
		}
		else if($this->input->post('processinfeetype')=='percentage')
		{
			$data['processingfee'] = $this->input->post('proceesing_fees_in_per');
		}
		
		$data['tenure'] = $tenure;
		
		
		$data['startdate'] = $this->input->post('start_date');
		
		$data['enddate'] = $this->input->post('End_date');
		
		$data['interestsubvention'] = $this->input->post('interstsubvention');
		
		$row = $this->Distributor_model->saveloanproduct($data);
		
		redirect('distributor/manageproduct', 'refresh');
		
	}
	
	
	public function addproduct()
	{
		
		$id = $this->session->userdata('ID');
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
		$row = $this->Customercrud_model->getProfileData($id);
	    $data['row'] = $row;
		
		 $productid = $this->Distributor_model->getproductlastid();
		
		$data['productid'] = $productid+1;
		
		$this->load->view('dashboard_header', $data);
		
		 $this->load->view('distributor/addproduct',$data);
		
		
		
	}
	
	public function retailerbulkupload()
	{
		
		
	}
	
	
	public function delprofilenew()
	{
		print_r($_REQUEST);
		
	}
	
	public function managedistributor()
	{
		
		
		 if($this->session->userdata('USER_TYPE') == '' || $this->session->userdata('USER_TYPE') == 'distributor')
		{		
            redirect(base_url('index.php/login'));
        }
		else
		{
			$id = $this->session->userdata('ID');
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
		$row = $this->Customercrud_model->getProfileData($id);
	    $data['row'] = $row;
		$this->load->view('dashboard_header', $data);
			
			
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
                 $link = "";                                                        
               $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
              			 $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/distributor/delprofile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
				$link1 = '';
        
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
	
	
	public function delprofile()
	{
		
		$id=$this->input->get('id');
		
		$this->Distributor_model->delprofile($id);
		
		redirect('distributor/managedistributor', 'refresh');
		
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
		
		$sel = $this->Distributor_model->getdistributorcount($filter_by);
		
		$totalRecords = $sel;
		
		$sel = $this->Distributor_model->getdistributorcountfilter($searchValue,$filter_by);
		
		$totalRecordwithFilter =$sel;
		
		$sel = $this->Distributor_model->getdistributor($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
		
		// print_r($distributorlist);
		
		$empReceords = $sel;
		
		$data = array();
		$loanproduct=$this->Distributor_model->getLoanProduct();
		$i=1;
		foreach($empReceords as $row)
			{
				

				$select_option="";
				$select_option_add='';
				foreach($loanproduct as $dis) { 
					if($row->product_id==$dis->product_code){$selected="selected";}else{$selected='';}
				$select_option='<option value="'.$dis->product_code.'" '.$selected.'>'.$dis->name.'</option>';
				$select_option_add=$select_option_add.$select_option;
				}
	
				$select_box= '<select  required class="form-control" name="productid" id="product_id_'.$i.'" > 
				<option value=" ">Select Product *</option>'.$select_option_add.'

				</select>';
				if($row->STATUS=='Approved')
				{
					$approve_btn = '<h6 style="color: green; font-size: 10px;">Approved</h6>';
					//$approve_btn='<a style="margin-left: 8px;"  class="btn btn-success disabled">Approved</a>';
				}
				else if($row->STATUS=='Rejected')
				{
					$approve_btn = '<h6 style="color: red; font-size: 10px;">Rejected</h6>';
					//$approve_btn='<a style="margin-left: 8px;"  class="btn btn-success disabled">Approved</a>';
				}
				else{
					
					$approve_btn = '<h6 style="color: black; font-size: 10px;">Not Approved</h6>';
					//$approve_btn='<a style="margin-left: 8px;"  name="'.$i.'" id="'.$row->UNIQUE_CODE.'" class="btn btn-success " onclick="approve_status(this)">Approve</a>';
				}
				if($row->Profile_Status=="Complete") 
				{
				    $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
					$firm_name=$row->dsa_firm_name;
				}
				else
				{ 
					$incomplete1='<h6 style="font-size: 10px; color: red">	INCOMPLETE PROFILE </h6>';
					$firm_name=$row->FN;
					
				} 
				
				$assign_btn='<a style="margin-left: 8px;"  name="'.$i.'" id="'.$row->UNIQUE_CODE.'" class="btn btn-success " onclick="approve_status(this)">Assign</a>';
				$link='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/profile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
																			
				$link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
				
					$link1 = "";
					$link1='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/update_basic_profile_2?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
  
				$link='<a style="margin-left: 8px; "href="'.base_url().'index.php/distributor/delprofile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
			
				$data[] = array(
				"dsa_firm_name"=>$firm_name,
				"FN"=>$row->FN.' '.$row->LN,
				"Email"=>$row->EMAIL,
				"mobile"=>$row->MOBILE,
			
				"Profile_Status"=>$incomplete1,  
			
				"Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
				"Action"=>$link1." ".$link,
				"select_box"=>$select_box." ".$assign_btn,
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
		$id = $this->session->userdata('ID');
		$row = $this->Customercrud_model->getProfileData($id);
		$data['row'] = $row;
		$data['status']=$this->Retailer_model->getstatus($id);
        $invoicelist = $this->Distributor_model->getinvoicelist();
        $data['invoicelist'] = $invoicelist;
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
	 $q='';
	  $sel = $this->Distributor_model->getrequestcount($result->UNIQUE_CODE,$q);
	 
	 
	 
	  $totalRecords = $sel;
	 
	  $sel = $this->Distributor_model->getrequestfilter($result->UNIQUE_CODE);
	 
	  $totalRecordwithFilter =$sel;
	  
	  //exit;
	 
	 $sel = $this->Distributor_model->getrequestfilterlist($result->UNIQUE_CODE);
	 
	// print_r($sel);
	 
	// exit;
	 $empReceords = $sel;
	 
	  $data = array();

     foreach($empReceords as $row)
         {
            $distributor_id=$row->retailerid;
			$dist_info=$this->Retailer_model->get_name($distributor_id);
			$dis_name=$dist_info->FN.' '.$dist_info->LN;
            
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
		    "request_no"=>$row->request_no,
            "invoicenumber"=>$row->invoicenumber,
            "invoicedate"=>$row->invoicedate,
          
            "invoiceamount"=>$row->invoiceamount,
			"fundingamount"=>$row->fundingamount,
			"tenure"=>$row->tenure,			
            "product"=>$dis_name,
			"status"=>$row->tenure,
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
		
	public function listrequest_distributor()
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
				$sel = $this->Distributor_model->getrequestcount($result->UNIQUE_CODE,$filter_by);
				
				
				
				$totalRecords = $sel;
				
				$sel = $this->Distributor_model->getrequestfilter($result->UNIQUE_CODE,$filter_by,$searchValue);
				
				$totalRecordwithFilter =$sel;
				
				//exit;
				
				$sel = $this->Distributor_model->getrequestfilterlist($result->UNIQUE_CODE,$filter_by,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
				
				// print_r($sel);
				
				// exit;
				$empReceords = $sel;
				
				$data = array();

				foreach($empReceords as $row)
					{
						$retailerid=$row->retailerid;
						$retailer_info=$this->Customercrud_model->getProfileData($retailerid);
						$retailer_buisness_name=$retailer_info->dsa_firm_name;
						
						
						$link='<a style="margin-left: 8px; "href="'.base_url().'index.php/distributor/addinvoice?type=invoice&requestid='.$row->id.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
																					
						$link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
						
					
					$data[] = array(
						//"ID"=>$row->ID,
					// "invoiceissuedby"=>$row->invoiceissuedby,
						"request_no"=>$row->request_no,
						"invoicenumber"=>$row->invoicenumber,
						"invoicedate"=>$row->invoicedate,
					
						"invoiceamount"=>$row->invoiceamount,
						"fundingamount"=>$row->fundingamount,
						"tenure"=>$row->tenure,			
						"product"=>$retailer_buisness_name,
						"status"=>$row->status,
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
	 $Start_Date = "";
	 if(isset($_POST['Start_Date']))
		{
			$Start_Date=$_POST['Start_Date'];
		}
		
		$End_Date = "";
  if(isset($_POST['End_Date']))
		{
			$End_Date=$_POST['End_Date'];
		}

$filter_by = "";
if(isset($_POST['filter']))
		{
			$filter_by=$_POST['filter'];
		}

$Reffered_by = "";

		if(isset($_POST['Reffered_by']))
		{
			$Reffered_by=$_POST['Reffered_by'];
		}

  //$End_Date=$_POST['End_Date'];
  //$filter_by=$_POST['filter'];
   //$Reffered_by=$_POST['Reffered_by'];

   $location = "";

   if(isset($_POST['location']))
		{
			$location=$_POST['location'];
		}
      //$location=$_POST['location'];
     # Read value
   //  $draw = $_POST['draw'];
   //   $row = $_POST['start'];
   //  $rowperpage = $_POST['length']; // Rows display per page
     $columnIndex = $_POST['order'][0]['column']; // Column index
     $columnName = $_POST['columns'][$columnIndex]['data']; //Column name
     $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
     $searchValue = $_POST['search']['value']; // Search value


 if(isset($_POST['draw']))
		{
			$draw=$_POST['draw'];
		}
		 if(isset($_POST['start']))
		{
			$row=$_POST['start'];
		}
		 if(isset($_POST['length']))
		{
			$rowperpage=$_POST['length'];
		}
		// if(isset($_POST['location']))
		//{
		//	$location=$_POST['location'];
		// }

	 
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
		
	//	exit();
		
		/* code to export files to Nextcloud starts here */
					$time = time();
					
					$id = $this->session->userdata("ID");
					$row = $this->Customercrud_model->getProfileData($id);
					
					$distributorid = $row->ID;
					$dir = $row->ID."/";
					
					$dirname = "Finserv/Distributor/".$dir;
	
					$curlurl = "curl -X MKCOL -u  ".CLOUD_USERNAME.":".CLOUD_PASSWORD."  https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$dirname."";
   
			   //echo "<br>";
					exec($curlurl);
					//$dir
					
					$dir = $row->ID."/";
					
					//$dir = "";
					
					// print_r($_FILES);
					 
					// print_r($_REQUEST);

						$fileextensionarr = explode(".",$_FILES["invoicefile"]["name"]);
						
						//print_r($fileextensionarr);

						$fileextension = $fileextensionarr[1];
						
						$filename = "invoice"."_".$time.".".$fileextension;
						
						$dirname = "Finserv/Distributor/".$dir;

						$filenamewithdir = $dirname.$filename;

			              $correcturl = "curl -X PUT -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."".$filenamewithdir." -T ".$_FILES["invoicefile"]["tmp_name"]."";

						//exit;
                        exec($correcturl);
						
						//exit;
						$file_input_arr = array
						(
						 'distributor_id' => $distributorid,
						 'Doc_name' => $filename,	
						 'path' =>$dirname,
						 'retailer_id'=>$this->input->post('retailerid'),
						 'Invoice_no'=>$this->input->post('invoicenumber'),
						 'doc_cloud_name' => $filename,
						 'request_id'=>$this->input->post('requestid')
						 
						);
						
						
						 $this->Distributor_model->saveDocuments($file_input_arr);
						    $requestid= $this->input->post('requestid');
							$request_info=$this->Distributor_model->getRequest($requestid);
							
							$reteiler_id=$request_info->retailerid;
							$reteiler_info = $this->Customercrud_model->getProfileData($reteiler_id);
							
							//print_r($reteiler_info);
							
							//exit;
							
							$distributor_id=$request_info->distributorid;
							$distributor_info=$this->Customercrud_model->getProfileData($distributor_id);
							
							$reteiler_EMAIL=$reteiler_info->EMAIL;
							
							
							$SCFO_info=$this->Distributor_model->getscfo();

							$SCFO_EMAIL=$SCFO_info->EMAIL;
							
							
						  
						 /*----------------------------------- sending mail to SCFO when distributor approves the request of Request-------------------------------*/
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
						 $send_email_to_support=$reteiler_info->EMAIL;
						// $send_email_to_support='jaykumar.nimbalkar@gmail.com';
						$this->email->to($send_email_to_support);
						
						//$subject = 'Approval to invoice submitted '.$request_info->invoicenumber.' from disbtributor '.strtoupper($distributor_info->FN).' '.strtoupper($distributor_info->LN);
						
						$subject = "".$_REQUEST['invoicenumber']." has been Approved by Distributor";
						$this->email->subject($subject);
						 $data['request_info']=$request_info;
						 $data['reteiler_info']=$reteiler_info;
						 
						 $data['distributor_info']=$distributor_info;
						 //$mailContent = $this->load->view('templates/request_Approved_from_distributor.php',$data,true);
						 
						 $mailContent = "Dear Team,<br><br>

Invoice number ".$_REQUEST['invoicenumber']." has been Approved by Distributor ".$distributor_info->FN." ".$distributor_info->LN." with remarks '".$_REQUEST['remark_by_distributor']."' <br>

Please keep track and visit our portal for future reference. <br><br>

Warm Regards, <br>

Finaleap Finserv.Pvt.Ltd

";
						 $this->email->message($mailContent); 
						 if($this->email->Send())
							 {
									//$this->sendemail($distributor_info->EMAIL,$subject,$mailContent);	
									//$this->sendemail($request_info->EMAIL,$subject,$mailContent);
							 }
							 else
							 {
								 echo $this->email->print_debugger();
							 }
							 
							 
		
		//echo $reteiler_EMAIL;
		
		//exit;
		
		$this->sendemail($reteiler_EMAIL,$subject,$mailContent);
		$this->sendemail($distributor_info->EMAIL,$subject,$mailContent);
		$this->sendemail(SCFEMAIL,$subject,$mailContent);
							 $notification_data=['user_id'=>$reteiler_id,'notification'=>'Request Approved by Distributor for Invoice Number:'.$request_info->invoicenumber,'status'=>'unseen'];
							 $notification=$this->Admin_model->insert_notification($notification_data);
						 /*--------------------------------------------------------------------------------------------------------------------*/

 
		
		$requestid= $this->input->post('requestid');
		$data_request['status']="Approved By Distributor";
		$data_request['remark_by_distributor']=$this->input->post('remark_by_distributor');
		
	
		
		$result=$this->Distributor_model->update_request($requestid,$data_request);
	
		if($result>0)
		{
			$response = array(
				"result" => 'sucess',
				
				);
			echo json_encode($response);
		}
		else{
			$response = array(
				"result" => 'fail',
				
				);
			echo json_encode($response);
		}
		
		$_SESSION['message'] = "Request updated successfully ";
		
		$_SESSION['title'] = "Request updated";
		
		//redirect('distributor/manageinvoice', 'refresh');
		
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

		 $requestid = "";
		 
		 if(isset($_REQUEST['requestid']))
		{
				$requestid = $_REQUEST['requestid'];
		}
		 
		 $Request = $this->Distributor_model->getRequest($requestid);
		 
		
		$retailerid=$Request->retailerid;
		$retailerinfo = $this->Customercrud_model->getProfileData($retailerid);
		$distributor_info=$this->Customercrud_model->getProfileData($Request->distributorid);
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
		 $product_details = $this->Distributor_model->getproduct_details($distributor_info->product_id);
	     $data['product_details']=$product_details;
		
		$data['invoice_image']=$this->Distributor_model->invoice_image($requestid);
		
		
		
		 $data['username'] =$user_name;
		 $data['Request'] = $Request;
		 $data['status']=$this->Retailer_model->getstatus($id);
		 $data['RetailerList']  = $RetailerList;
		 $data['retailerinfo']=$retailerinfo;
		 
		 
		$this->load->view('dashboard_header', $data);
		
		//echo "This test";
		
		$this->load->view('distributor/addinvoice', $data);
		
		
		
		
		//$this->
	}
	
	
	public function addretailerall()
	{
		$id = $this->session->userdata('ID');
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
		 
	
		 $row = $this->Customercrud_model->getProfileData($id);
	
		 
		 $data['row'] = $row;
		 $data['status']=$this->Retailer_model->getstatus($id);
		$this->load->view('dashboard_header', $data);
		
		//echo "This test";
		
		$this->load->view('distributor/listretailers', $data);
		
		
		
		
		
	}
	
	public function adddistributorall()
	{
		
		
		
		
	}
	
	public function managerequestall()
	{
		
		
		$id = $this->session->userdata('ID');
		$row = $this->Customercrud_model->getProfileData($id);
		$data['row'] = $row;$invoicelist = $this->Distributor_model->getinvoicelist();
        $data['invoicelist'] = $invoicelist;
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
		
		//echo "TEST";
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
	 //echo "hi";
	 $sel = $this->Distributor_model->getrequestfilterlistall();
	 
	// print_r($sel);
	 
	// exit;
	 $empReceords = $sel;
	 
	  $data = array();
	if(isset($empReceords) && $empReceords != '')
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
	/*------------------------- addded by papiha on 25_08_2022------------------------------------*/
public function view_retailer_profile()
{
	
	
			$id = $this->session->userdata('ID');

	
		$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			//$this->load->view('header', $data);
			$id = $this->session->userdata('ID');
			$data['row']=$this->Customercrud_model->getProfileData($id);
			
			
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
		
		$this->load->view('dashboard_header', $data);
		
		 $this->load->view('distributor/view_reteiler_profile',$data);
}
/*------------------------------ added by papiha on 26_08_2022------------------------------*/


   






public function update_Distributor_product()
{
	$id=$this->input->post('id');
	$distributor=$this->input->post('distributor');
	


	/*$array_input_more = array(
		'STATUS'=>('Approved'),
	
		);
	$this->Customercrud_model->update_profile_more($id, $array_input_more);
	*/
	$array_input = array(
		
		'product_id'=>$distributor
		);
	$this->Customercrud_model->update_profile($id, $array_input);
	$json = array
	(
		
		'msg'=>'sucess'
		
		
	);
	echo json_encode($json);
}







/*----------------------------------------- addded by papiha on 29_08_2022----------------------------------------*/
public function update_request_status()
{
	//echo "TEST";
	
	//exit;
	$requestid= $this->input->post('reques_id');
	$data_request['status']=$this->input->post('status');
	$data_request['remark_by_distributor']=$this->input->post('remark');
	$request_info=$this->Distributor_model->getRequest($requestid);
	$reteiler_id=$request_info->retailerid;
	$reteiler_info = $this->Customercrud_model->getProfileData($reteiler_id);
	$distributor_id=$request_info->distributorid;
	$distributor_info=$this->Customercrud_model->getProfileData($distributor_id);
	$reteiler_EMAIL=$reteiler_info->EMAIL;
	
	/*-------------------------------sending revert and reject status EMail to retailers-----------------------------*/
	if($this->input->post('status')=='SendBack By Distributor')
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
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$reteiler_EMAIL;
		$this->email->to($send_email_to_support);
		
		// $subject = 'Revert to invoice submitted '.$request_info->invoicenumber.' from disbtributor'.strtoupper($distributor_info->FN).' '.strtoupper($distributor_info->LN);
		$subject = "".$request_info->invoicenumber." has been Sendback by Distributor";
		$this->email->subject($subject);
		$data['request_info']=$request_info;
		$data['reteiler_info']=$reteiler_info;
		
		$data['distributor_info']=$distributor_info;
		//$mailContent = $this->load->view('templates/request_revert_from_distributor',$data,true);
		
		$mailContent = "Dear Team,<br>

Invoice number ".$request_info->invoicenumber." has been Sendback by Distributor ".$distributor_info->FN." ".$distributor_info->LN." with remarks '".$this->input->post('remark')."'
<br>
Please keep track and visit our portal for future reference.
<br>
Warm Regards, <br> <br>

Finaleap Finserv.Pvt.Ltd";
		
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
						$_SESSION['message'] = "Invoice SendBack By Distributor";
						//$_SESSION['title'] = "Invoice SendBack By Distributor";
		
		$_SESSION['title'] = "SendBack By Distributor";
			}
			else
			{
				echo $this->email->print_debugger();
			}
			$this->sendemail($distributor_info->EMAIL,$subject,$mailContent);
			$this->sendemail(SCFEMAIL,$subject,$mailContent);
			$notification_data=['user_id'=>$reteiler_id,'notification'=>'Request Reverted by Distributor for Invoice Number:'.$request_info->invoicenumber,'status'=>'unseen'];
			$notification=$this->Admin_model->insert_notification($notification_data);
	}
	else if($this->input->post('status')=='Reject By Distributor')
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
		$send_to_emails=$send_to_emails;
		$send_email_to_support=$reteiler_EMAIL;
		$this->email->to($send_email_to_support);
		$this->email->subject('Reject to invoice submitted '.$request_info->invoicenumber.' from disbtributor'.strtoupper($distributor_info->FN).' '.strtoupper($distributor_info->LN));
		$data['request_info']=$request_info;
		$data['reteiler_info']=$reteiler_info;
		
		$data['distributor_info']=$distributor_info;
		$mailContent = $this->load->view('templates/request_reject_from_distributor',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
					$this->sendemail($distributor_info->EMAIL,$subject,$mailContent);
					$this->sendemail(SCFEMAIL,$subject,$mailContent);

$_SESSION['message'] = "Request Reject By Distributor ";
						$_SESSION['title'] = "Reject By Distributor";					
			}
			else
			{
				echo $this->email->print_debugger();
			}
			$notification_data=['user_id'=>$reteiler_id,'notification'=>'Request Rejected by Distributor for Invoice Number:'.$request_info->invoicenumber,'status'=>'unseen'];
			$notification=$this->Admin_model->insert_notification($notification_data);
	}
	    /*-----------------------------------------------------------------------------------------------------------------------------------*/
		
		$result=$this->Distributor_model->update_request($requestid,$data_request);
	
		if($result>0)
		{
			$response = array(
				"result" => 'sucess',
				
				);
			echo json_encode($response);
		}
		else{
			$response = array(
				"result" => 'fail',
				
				);
			echo json_encode($response);
		}
		
}
public function update_request_status_scfo()
{
	
	$requestid= $this->input->post('reques_id');
	
	$data_request['status']=$this->input->post('status');
	$data_request['remark_by_scfo']=$this->input->post('remark');
	$request_info=$this->Distributor_model->getRequest($requestid);
	$reteiler_id=$request_info->retailerid;
	$reteiler_info = $this->Customercrud_model->getProfileData($reteiler_id);
	
	$id = $this->session->userdata("ID");
					$SCFO = $this->Customercrud_model->getProfileData($id);
	
	//print_r($reteiler_info);
	
	//exit;
	
	$distributor_id=$request_info->distributorid;
	$distributor_info=$this->Customercrud_model->getProfileData($distributor_id);
	
	$reteiler_EMAIL=$reteiler_info->EMAIL;
	$result=$this->Distributor_model->update_request($requestid,$data_request);
	/*-------------------------------sending revert and reject status EMail to retailers-----------------------------*/
	
	
	
	
	if($this->input->post('status')=='SendBack By SCFO')
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
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$distributor_info->EMAIL;
		//$send_email_to_support='patilpapiha@gmail.com';
		$this->email->to($send_email_to_support);
		//$subject = 'Revert to invoice submitted '.$request_info->invoicenumber.' from supply chain manger';
		
		$subject = "".$request_info->invoicenumber." has been Sendbackby SCFO";
		$this->email->subject($subject);
		$request_info=$this->Distributor_model->getRequest($requestid);
		$data['request_info']=$request_info;
		$data['reteiler_info']=$reteiler_info;
		
		$data['distributor_info']=$distributor_info;
		//$mailContent = $this->load->view('templates/request_revert_from_SCFO',$data,true);
		
		$mailContent = "Dear Team, <br><br>

Invoice number ".$request_info->invoicenumber." has been Sendback by SCFO ".$SCFO->FN." ".$SCFO->LN." with remarks '".$this->input->post('remark')."' <br>

Please keep track and visit our portal for future reference. <br><br>

Warm Regards, <br>

Finaleap Finserv.Pvt.Ltd

";
		//$this->email->cc($reteiler_EMAIL);
		//$this->email->cc(SCFO);
		$this->email->message($mailContent); 
		
		//echo $reteiler_EMAIL;
		
		//$this->sendemail($send_email_to_support,$subject,$mailContent);
		//echo "TEST";
		//exit;
		if($this->email->Send())
			{
						$this->sendemail($reteiler_EMAIL,$subject,$mailContent);
						
						$this->sendemail(SCFEMAIL,$subject,$mailContent);
						
						
			}
			else
			{
				echo $this->email->print_debugger();
			}
			$notification_data=['user_id'=>$distributor_id,'notification'=>'Request Reverted by supply chain manger for Invoice Number:'.$request_info->invoicenumber,'status'=>'unseen'];
			$notification=$this->Admin_model->insert_notification($notification_data);
	$_SESSION['message'] = "SendBack By SCFO";
						
						$_SESSION['title'] = "SendBack By SCFO";
	
	}
	else if($this->input->post('status')=='Reject By SCFO')
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
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$distributor_info->EMAIL;
		//$send_email_to_support='patilpapiha@gmail.com';
		$this->email->to($send_email_to_support);
		//$subject = 'Reject to invoice submitted '.$request_info->invoicenumber.' from supply chain manger';
		
		$subject = "".$request_info->invoicenumber." has been Reject by SCFO";
		$this->email->subject($subject);
		$request_info=$this->Distributor_model->getRequest($requestid);
		$data['request_info']=$request_info;
		$data['reteiler_info']=$reteiler_info;
		
		$data['distributor_info']=$distributor_info;
		//$mailContent = $this->load->view('templates/request_reject_from_SCFO',$data,true);
		
		$mailContent = "Dear Team, <br>

Invoice number ".$request_info->invoicenumber." has been Reject by SCFO ".$SCFO->FN." ".$SCFO->LN." with remarks '".$this->input->post('remark')."' <br>

Please keep track and visit our portal for future reference. <br>

Warm Regards, <br>

Finaleap Finserv.Pvt.Ltd

";
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
				echo $reteiler_EMAIL;
						 $this->sendemail($reteiler_EMAIL,$subject,$mailContent);
						$this->sendemail(SCFEMAIL,$subject,$mailContent);
						
						$_SESSION['message'] = "Reject By SCFO";
						
						$_SESSION['title'] = "Reject By SCFO";
			}
			else
			{
				echo $this->email->print_debugger();
			}
			$notification_data=['user_id'=>$distributor_id,'notification'=>'Request Rejected by supply chain manger for Invoice Number:'.$request_info->invoicenumber,'status'=>'unseen'];
			$notification=$this->Admin_model->insert_notification($notification_data);
	}
	    /*-----------------------------------------------------------------------------------------------------------------------------------*/
		
	
	
		if($result>0)
		{
			$response = array(
				"result" => 'sucess',
				
				);
			echo json_encode($response);
		}
		else{
			$response = array(
				"result" => 'fail',
				
				);
			echo json_encode($response);
		}
		
}
public function save_request_sataus_by_scfo()
	{
		
		/* code to export files to Nextcloud starts here */
					$time = time();
					
					$id = $this->session->userdata("ID");
					$row = $this->Customercrud_model->getProfileData($id);
					
					$distributorid = $row->ID;
					
						    $requestid= $this->input->post('requestid');
							$request_info=$this->Distributor_model->getRequest($requestid);
							
							$reteiler_id=$request_info->retailerid;
							$reteiler_info = $this->Customercrud_model->getProfileData($reteiler_id);
							
							$distributor_id=$request_info->distributorid;
							$distributor_info=$this->Customercrud_model->getProfileData($distributor_id);
							
							$reteiler_EMAIL=$reteiler_info->EMAIL;
							$SCFO_info=$this->Distributor_model->getscfo();

							$SCFO_EMAIL=$SCFO_info->EMAIL;
						  
						 /*----------------------------------- sending mail to SCFO when distributor approves the request of Request-------------------------------*/
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
						// $send_to_emails=$send_to_emails;
						  $send_email_to_support=$distributor_info->EMAIL;
						// $send_email_to_support='patilpapiha@gmail.com';
						 $this->email->to($send_email_to_support);
						 
						 //$subject = 'Approval to invoice submitted '.$request_info->invoicenumber.' from Supply Chain Manager';
						 
						 $subject = "".$_REQUEST['invoicenumber']." has been Approved by SCFO";
						 $this->email->subject($subject);
						 $data['request_info']=$request_info;
						 $data['reteiler_info']=$reteiler_info;
						 
						 $data['distributor_info']=$distributor_info;
						 //$mailContent = $this->load->view('templates/request_Approved_from_SCFO.php',$data,true);
						 $mailContent = "Dear Team,<br><br>

Invoice number ".$_REQUEST['invoicenumber']." has been Approved by SCFO ".$SCFO_info->FN." ".$SCFO_info->LN." with remarks '".$_REQUEST['remark_by_scfo']."' <br>

Please keep track and visit our portal for future reference. <br><br>

Warm Regards, <br>

Finaleap Finserv.Pvt.Ltd

";
						 $this->email->message($mailContent); 
						 if($this->email->Send())
							 {
								  $to = $reteiler_EMAIL;
								 $this->sendemail($to,$subject,$mailContent);
									
								$to = SCFEMAIL;
								
								$this->sendemail($to,$subject,$mailContent);
									
							 }
							 else
							 {
								 echo $this->email->print_debugger();
							 }
							 $notification_data=['user_id'=>$distributor_id,'notification'=>'Request Approved by Supply chain manager for Invoice Number:'.$request_info->invoicenumber,'status'=>'unseen'];
							 $notification=$this->Admin_model->insert_notification($notification_data);
						 /*--------------------------------------------------------------------------------------------------------------------*/

 
		
		$requestid= $this->input->post('requestid');
		$data_request['status']='Approved By SCFO';
		$data_request['remark_by_scfo']=$this->input->post('remark_by_scfo');
	
		
		$result=$this->Distributor_model->update_request($requestid,$data_request);
		
		$_SESSION['message'] = "Invoice Request approved by SCFO ";
			$_SESSION['title'] = "Invoice approved by SCFO";

//print_r($_SESSION);			
	//		exit;
	
		if($result>0)
		{
			
			$response = array(
				"result" => 'success',
				
				);
			echo json_encode($response);
		}
		else{
			
			$_SESSION['message'] = "Invoice Request failed. ";
			$_SESSION['title'] = "Invoice failed";
			$response = array(
				"result" => 'fail',
				
				);
			echo json_encode($response);
		}
		
		//redirect('distributor/manageinvoice', 'refresh');
		
	}

/*--------------------------------------- added  by papiha on 01_09_2022-----------------------------------------------------*/
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
		$id = $this->session->userdata('ID');
		$row = $this->Customercrud_model->getProfileData($id);
		$data['row'] = $row;
		$data['status']=$this->Retailer_model->getstatus($id);
		
		$data['retailer_list']= $this->Distributor_model->getretailerlist_distributor_wise($id);
		$invoicelist = $this->Distributor_model->getinvoicelist();
		$data['invoicelist'] = $invoicelist;
		$this->load->view('dashboard_header', $data);
		$this->load->view('distributor/managereports', $data);
		
		
	}
public function listreport()
{
    
   
    $filter_by=$_REQUEST['status'];
   
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
    $searchQuery = " ";
    $sel = $this->Retailer_model->getdistributorreportcount($userid,$filter_by);
    $totalRecords = $sel;
    $sel = $this->Retailer_model->getdistributorreportfilter($userid,$filter_by);
    $totalRecordwithFilter =$sel;
    $sel = $this->Retailer_model->getdistributorreportfilterlist($userid,$filter_by,$row,$rowperpage);
    $empReceords = $sel;
    $data = array();
	$invoiceamount = 0;
	$totalcharges = 0;
	$disbursedamount = 0;
	if(count($empReceords) > 0)
	{
        foreach($empReceords as $row)
        {
            /*if($row->Profile_Status=="Complete")
            {
              $incomplete1='<h6 style="color: green; font-size: 10px;">COMPLETED PROFILE </h6>';
            }
            else
            {
                $incomplete1='<h6 style="font-size: 10px; color: red"> INCOMPLETE PROFILE </h6>';
               
            }*/
            if($row->status == 'Revert')
            {
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/retailers/editrequest?id='.$row->id.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
            }
           else
            {

			  $link = "";
			}
               $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
             
			$distributor_info=$this->Customercrud_model->getProfileData($row->distributorid);
		    $product_details = $this->Distributor_model->getproduct_details($distributor_info->product_id);
			$retailer_info=$this->Customercrud_model->getProfileData($row->retailerid);
			$ratailer_name=$retailer_info->dsa_firm_name;
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


        $data[] = array(
            "invoicenumber"=>'',
            "invoicedate"=>'Total Sum',
            "invoiceamount"=>$invoiceamount,
			"deduction"=>'',
			"disbursedamount"=>$disbursedamount,
			"totalcharges"=>$totalcharges,
            "name"=>'',
            "status"=>'',
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
	
/*------------------------------------- added by papiha on 01_09_2022------------------------------------------------------*/
public function viewretailer()
	{
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
		$id = $this->session->userdata('ID');
		$row = $this->Customercrud_model->getProfileData($id);
		$data['row'] = $row;
		$data['status']=$this->Retailer_model->getstatus($id);
		$this->load->view('dashboard_header', $data);
		$this->load->view('distributor/viewlistretailers', $data);
	}
	public function viewlistretailers()
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
	 
	
	 
	 
	 $sel = $this->Retailer_model->getretailercount_for_distributor($id,$filter_by);
	 
	   $totalRecords = $sel;

	   
	 //exit;
	 $sel = $this->Retailer_model->getretailercountfilter_for_distributor($id,$searchValue,$filter_by);
	 
	  $totalRecordwithFilter =$sel;
	  
	  	 
	 
	 $sel = $this->Retailer_model->getretailer_for_distributor($id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
	 //echo $sel; 
	// print_r($distributorlist);
	$distributor = $this->Distributor_model->getdistributorlist();
	
					
				
	 $empReceords = $sel;
	 
	  //exit;
	 
	  $data = array();
    $i=1;     
foreach($empReceords as $row)
         {
			
          
			$select_option="";
			$select_option_add='';
			 foreach($distributor as $dis) { 
				if($row->distributor_id==$dis->UNIQUE_CODE){$selected="selected";}else{$selected='';}
			  $select_option='<option value="'.$dis->UNIQUE_CODE.'" '.$selected.'>'.$dis->FN.' '.$dis->LN.'</option>';
			  $select_option_add=$select_option_add.$select_option;
			 }
  //echo $select_option_add;
			$select_box= '<select  required class="form-control" name="retailerid" id="dis_id_'.$i.'" > 
			<option value=" ">Select Distributor *</option>'.$select_option_add.'

			</select>';
			
			if($row->STATUS=='Approved')
			{
				//$approve_btn='<a style="margin-left: 8px;"  class="btn btn-success disabled">Approved</a>';
				$approve_btn =  "Approved";
			}
			else{
				
				$approve_btn = "Not Approved";
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
			   $link2='<a style="margin-left: 8px; "href="'.base_url().'index.php/dsa/Update_basic_profile_2?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
               $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/distributor/assignproduct?id='.$row->ID.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                                                                          
               $link1='<a style="margin-left: 8px; "href="'.base_url().'index.php/distributor/delprofile?id='.$row->ID.'"  "  class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
              // $selectbox='<select><option value="" ></option>'.foreach($distributor as $dis){'hello'}.'</select>';
			   //$selectbox='<select><option value="" ></option>'.foreach($distributor as $dis) { .'<option'. if($dis->UNIQUE_CODE == $row->distributor_id) { .'selected'. }. 'value="'.echo $dis->UNIQUE_CODE;.'" >'.echo $dis->FN." ".$dis->LN;.'</option>'.}.'<select>'; 
        
        $data[] = array(
             "dsa_firm_name"=>$row->dsa_firm_name,
            "FN"=>$row->FN.' '.$row->LN,
            "Email"=>$row->EMAIL,
            "mobile"=>$row->MOBILE,
          
            "Profile_Status"=>$incomplete1,  
           
            "Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
			"select_box"=>$select_box,
            "Action"=>$link2,
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
	
	public function delete_product()
	{
		echo "delete_product";
		
		print_r($_REQUEST);
		
	}
	
	public function updateproduct()
	{
		
		//print_r($_REQUEST);
		$data = array();
		
		$id = $this->session->userdata('ID');
		$row = $this->Customercrud_model->getProfileData($id);
		$data['row'] = $row;
		$products = $this->Distributor_model->getProductData($_REQUEST['id']);
		$data['products'] = $products;
		//print_r($row);   
		$this->load->view('dashboard_header', $data);
		$this->load->view('distributor/updateproduct', $data);
	}
	
	public function sendtestemail()
	{
		$to="jaykumar.nimbalkar@gmail.com";
		$subject = "TEST EMAIL";
		
		$message = "Test email checking";
		$this->sendemail($to,$subject,$message);
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
	/*------------------------------------addded by papiha on 27_12_2022---------------------------------------------------------*/
	public function update_distributor_status()
	{
         $id=$this->input->post('dis_id');
		 $scfremark=$this->input->post('scfremark');
		 $login_id=$this->input->post('login_id');
		 $array_input_more = array(
			'STATUS'=>"Send back from SCFO",
			'scfremark' => $scfremark,
			'profile_approved_by'=>$login_id
			);
			
		$this->Customercrud_model->update_profile_more($id, $array_input_more);
		/*------------------------------------send mail to distributor--------------------------------------------*/
		$distributor = $this->Customercrud_model->getProfileData($id);
		$distributor_more = $this->Dsacrud_model->getProfileDataMore($id);
		$data['distributor']=$distributor;
		$data['distributor_more']=$distributor_more;
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
		$this->email->from($from_email, 'Finaleap Finserv'); 
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$distributor->EMAIL;
		$this->email->to($send_email_to_support);
		$subject = strtoupper($distributor->FN).' Your Profile Send Back  by SCFO';
		$this->email->subject($subject);
		$mailContent = $this->load->view('templates/distributor_profile_senback_by_scfo.php',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}
        /*--------------------------------------- send email to scfo-----------------------------------------------------------*/
        $scfo_login = $this->Customercrud_model->getProfileData($login_id);
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
		$data['distributor']=$distributor;
		$this->email->from($from_email, 'Finaleap Finserv'); 
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$scfo_login->EMAIL;
		$this->email->to($send_email_to_support);
		$subject = strtoupper($distributor->FN).' Profile Send Back sucessfully';
		$this->email->subject($subject);
		$mailContent = $this->load->view('templates/distributor_profile_senback_by_scfo_to_scfo.php',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}

		$json = array('msg'=>'sucess');
		echo json_encode($json); 

	}
	/*------------------------------ addded by papiha on 28_12_2022-------------------------------------------------------*/
	public function update_distributor_status_approved()
	{
         $id=$this->input->post('id');
		 $login_id=$this->input->post('login_id');
		 $product=$this->input->post('product');
		 $array_input_more = array(
			'STATUS'=>"Approved",
			'profile_approved_by'=>$login_id
			);
		 $array_input = array(
				'product_id'=>$product
				);
		$this->Customercrud_model->update_profile($id, $array_input);
			
		$this->Customercrud_model->update_profile_more($id, $array_input_more);
		/*------------------------------------send mail to distributor--------------------------------------------*/
		$distributor = $this->Customercrud_model->getProfileData($id);
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
		$this->email->from($from_email, 'Finaleap Finserv'); 
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$distributor->EMAIL;
		$this->email->to($send_email_to_support);
		$subject = strtoupper($distributor->FN).' Your Profile is Approved  by SCFO';
		$this->email->subject($subject);
		$mailContent = $this->load->view('templates/distributor_profile_Approved_by_scfo.php',$distributor,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}
        /*--------------------------------------- send email to scfo-----------------------------------------------------------*/
        $scfo_login = $this->Customercrud_model->getProfileData($login_id);
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
		$data['distributor']=$distributor;
		$this->email->from($from_email, 'Finaleap Finserv'); 
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$scfo_login->EMAIL;
		$this->email->to($send_email_to_support);
		$subject = strtoupper($distributor->FN).' Profile Approved sucessfully';
		$this->email->subject($subject);
		$mailContent = $this->load->view('templates/distributor_profile_approved_by_scfo_to_scfo.php',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}
		$json = array('msg'=>'sucess');
		echo json_encode($json);
	}
	public function update_distributor_status_reject()
	{
         $id=$this->input->post('dis_id');
		 $scfremark=$this->input->post('scfremark');
		 $login_id=$this->input->post('login_id');
		 $array_input_more = array(
			'STATUS'=>"Rejected",
			'scfremark' => $scfremark,
			'profile_approved_by'=>$login_id
			);
			
		$this->Customercrud_model->update_profile_more($id, $array_input_more);
		/*------------------------------------send mail to distributor--------------------------------------------*/
		$distributor = $this->Customercrud_model->getProfileData($id);
		$distributor_more = $this->Dsacrud_model->getProfileDataMore($id);
		$data['distributor']=$distributor;
		$data['distributor_more']=$distributor_more;
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
		$this->email->from($from_email, 'Finaleap Finserv'); 
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$distributor->EMAIL;
		$this->email->to($send_email_to_support);
		$subject = strtoupper($distributor->FN).' Your Profile is Rejected by SCFO';
		$this->email->subject($subject);
		$mailContent = $this->load->view('templates/distributor_profile_rejected_by_scfo.php',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}
        /*--------------------------------------- send email to scfo-----------------------------------------------------------*/
        $scfo_login = $this->Customercrud_model->getProfileData($login_id);
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
		$data['distributor']=$distributor;
		$this->email->from($from_email, 'Finaleap Finserv'); 
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$scfo_login->EMAIL;
		$this->email->to($send_email_to_support);
		$subject = strtoupper($distributor->FN).' Profile Rejected Sucessfully';
		$this->email->subject($subject);
		$mailContent = $this->load->view('templates/distributor_profile_rejected_by_scfo_to_scfo.php',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}

		$json = array('msg'=>'sucess');
		echo json_encode($json); 

	}
	/*---------------------------------------- addded by papiha on 29_12_2022------------------------------------------------*/
	public function SCF_OPS()
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
            $data['showNav'] = 1;
            $data['age'] = $age;
            $data['s'] = $s;
            $this->load->view('admin/admin_dashbord', $data);
            $this->load->view('distributor/SCF_OPS',$data)   ;
			
        } 
		
	}
	public function listscf_ops()
	{
		
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
		$searchQuery = " ";
		$sel = $this->Retailer_model->getscf_ops_count($filter_by);
		$totalRecords = $sel;
	    $sel = $this->Retailer_model->getscf_ops_countfilter($searchValue,$filter_by);
	    $totalRecordwithFilter =$sel;
	    $sel = $this->Retailer_model->getscf_ops($searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by);
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
						$link = "";                                                        
						$link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
						$link='<a style="margin-left: 8px; "href="'.base_url().'index.php/distributor/delprofile?id='.$row->UNIQUE_CODE.'" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
						$link1 = '';
						$data[] = array(
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
	/*------------------------------------addded by papiha on 03_1_2023---------------------------------------------------------*/
		public function update_retailer_status()
		{
			 $id=$this->input->post('dis_id');
			 $scfremark=$this->input->post('scfremark');
			 $login_id=$this->input->post('login_id');
			 $array_input_more = array(
				'STATUS'=>"Send back from SCFO",
				'scfremark' => $scfremark,
				'profile_approved_by'=>$login_id
				);
				
			$this->Customercrud_model->update_profile_more($id, $array_input_more);
			/*------------------------------------send mail to retailer--------------------------------------------*/
			$distributor = $this->Customercrud_model->getProfileData($id);
			$distributor_more = $this->Dsacrud_model->getProfileDataMore($id);
			$data['distributor']=$distributor;
			$data['distributor_more']=$distributor_more;
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
			$this->email->from($from_email, 'Finaleap Finserv'); 
			//$send_to_emails=$send_to_emails;
			$send_email_to_support=$distributor->EMAIL;
			$this->email->to($send_email_to_support);
			$subject = strtoupper($distributor->FN).' Your Profile Send Back  by SCFO';
			$this->email->subject($subject);
			$mailContent = $this->load->view('templates/retailer_profile_senback_by_scfo.php',$data,true);
			$this->email->message($mailContent); 
			if($this->email->Send())
				{
						
				}
				else
				{
					//echo $this->email->print_debugger();
				}
			/*--------------------------------------- send email to scfo-----------------------------------------------------------*/
			$scfo_login = $this->Customercrud_model->getProfileData($login_id);
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
			$data['distributor']=$distributor;
			$this->email->from($from_email, 'Finaleap Finserv'); 
			//$send_to_emails=$send_to_emails;
			$send_email_to_support=$scfo_login->EMAIL;
			$this->email->to($send_email_to_support);
			$subject = strtoupper($distributor->FN).' Profile Send Back ';
			$this->email->subject($subject);
			$mailContent = $this->load->view('templates/retailer_profile_senback_by_scfo_to_scfo.php',$data,true);
			$this->email->message($mailContent); 
			if($this->email->Send())
				{
						
				}
				else
				{
					//echo $this->email->print_debugger();
				}
	
			$json = array('msg'=>'sucess');
			echo json_encode($json); 
	
	    }
	public function update_retailer_status_reject()
	{
         $id=$this->input->post('dis_id');
		 $scfremark=$this->input->post('scfremark');
		 $login_id=$this->input->post('login_id');
		 $array_input_more = array(
			'STATUS'=>"Rejected",
			'scfremark' => $scfremark,
			'profile_approved_by'=>$login_id
			);
			
		$this->Customercrud_model->update_profile_more($id, $array_input_more);
		/*------------------------------------send mail to distributor--------------------------------------------*/
		$distributor = $this->Customercrud_model->getProfileData($id);
		$distributor_more = $this->Dsacrud_model->getProfileDataMore($id);
		$data['distributor']=$distributor;
		$data['distributor_more']=$distributor_more;
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
		$this->email->from($from_email, 'Finaleap Finserv'); 
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$distributor->EMAIL;
		$this->email->to($send_email_to_support);
		$subject = strtoupper($distributor->FN).' Your Profile is Rejected by Finaleap Finserv';
		$this->email->subject($subject);
		$mailContent = $this->load->view('templates/retailer_profile_rejected_by_scfo.php',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}
        /*--------------------------------------- send email to scfo-----------------------------------------------------------*/
        $scfo_login = $this->Customercrud_model->getProfileData($login_id);
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
		$data['distributor']=$distributor;
		$this->email->from($from_email, 'Finaleap Finserv'); 
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$scfo_login->EMAIL;
		$this->email->to($send_email_to_support);
		$subject = strtoupper($distributor->FN).' Profile Rejected Sucessfully';
		$this->email->subject($subject);
		$mailContent = $this->load->view('templates/retailer_profile_rejected_by_scfo_to_scfo.php',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}

		$json = array('msg'=>'sucess');
		echo json_encode($json); 

	}
	public function update_retailer_status_approved()
	{
         $id=$this->input->post('id');
		 $login_id=$this->input->post('login_id');
		 $product=$this->input->post('product');
		 $array_input_more = array(
			'STATUS'=>"Approved",
			'profile_approved_by'=>$login_id
			);
		 $array_input = array(
				'distributor_id'=>$product
				);
		$this->Customercrud_model->update_profile($id, $array_input);
			
		$this->Customercrud_model->update_profile_more($id, $array_input_more);
		/*------------------------------------send mail to Reteiler--------------------------------------------*/
		$distributor = $this->Customercrud_model->getProfileData($id);
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
		$data['distributor']=$distributor;
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from($from_email, 'Finaleap Finserv'); 
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$distributor->EMAIL;
		$this->email->to($send_email_to_support);
		$subject = strtoupper($distributor->FN).' Your Profile is Approved  by Finaleap Finserv';
		$this->email->subject($subject);
		$mailContent = $this->load->view('templates/retailer_profile_Approved_by_scfo.php',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}
        /*--------------------------------------- send email to scfo-----------------------------------------------------------*/
        $scfo_login = $this->Customercrud_model->getProfileData($login_id);
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
		$data['distributor']=$distributor;
		$this->email->from($from_email, 'Finaleap Finserv'); 
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$scfo_login->EMAIL;
		$this->email->to($send_email_to_support);
		$subject = strtoupper($distributor->FN).' Profile Approved sucessfully';
		$this->email->subject($subject);
		$mailContent = $this->load->view('templates/retailer_profile_approved_by_scfo_to_scfo.php',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}
		$json = array('msg'=>'sucess');
		echo json_encode($json);
	}
	public function update_retailer_status_by_distributor()
		{
			 $id=$this->input->post('dis_id');
			 $scfremark=$this->input->post('scfremark');
			 $login_id=$this->input->post('login_id');
			 $array_input_more = array(
				'STATUS'=>"Send back from distributor",
				'distributorremark' => $scfremark,
				'profile_approved_by'=>$login_id
				);
				
			$this->Customercrud_model->update_profile_more($id, $array_input_more);
			/*------------------------------------send mail to retailer--------------------------------------------*/
			$distributor = $this->Customercrud_model->getProfileData($id);
			$distributor_more = $this->Dsacrud_model->getProfileDataMore($id);
			$data['distributor']=$distributor;
			$data['distributor_more']=$distributor_more;
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
			$this->email->from($from_email, 'Finaleap Finserv'); 
			//$send_to_emails=$send_to_emails;
			$send_email_to_support=$distributor->EMAIL;
			$this->email->to($send_email_to_support);
			$subject = strtoupper($distributor->FN).' Your Profile Send Back  by distributor';
			$this->email->subject($subject);
			$mailContent = $this->load->view('templates/retailer_profile_senback_by_dis.php',$data,true);
			$this->email->message($mailContent); 
			if($this->email->Send())
				{
						
				}
				else
				{
					//echo $this->email->print_debugger();
				}
			/*--------------------------------------- send email to distributor-----------------------------------------------------------*/
			$dis_login = $this->Customercrud_model->getProfileData($login_id);
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
			$data['distributor']=$distributor;
			$this->email->from($from_email, 'Finaleap Finserv'); 
			//$send_to_emails=$send_to_emails;
			$send_email_to_support=$dis_login->EMAIL;
			$this->email->to($send_email_to_support);
			$subject = strtoupper($distributor->FN).' Profile Send Back ';
			$this->email->subject($subject);
			$mailContent = $this->load->view('templates/retailer_profile_senback_by_distributor_to_distributor.php',$data,true);
			$this->email->message($mailContent); 
			if($this->email->Send())
				{
						
				}
				else
				{
					//echo $this->email->print_debugger();
				}
	
			
	
	    
		/*--------------------------------------- send email to scfo-----------------------------------------------------------*/
		$scfo_login = $this->Customercrud_model->getProfileData($dis_login->DSA_ID);
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
		$data['distributor']=$distributor;
		$data['dis_login']=$dis_login;
		$this->email->from($from_email, 'Finaleap Finserv'); 
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$scfo_login->EMAIL;
		$this->email->to($send_email_to_support);
		$subject = strtoupper($distributor->FN).' Profile Send Back ';
		$this->email->subject($subject);
		$mailContent = $this->load->view('templates/retailer_profile_senback_by_distributor_to_scfo.php',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}

		$json = array('msg'=>'sucess');
		echo json_encode($json); 

	}
	public function update_retailer_status_reject_by_distributor()
	{
         $id=$this->input->post('dis_id');
		 $scfremark=$this->input->post('scfremark');
		 $login_id=$this->input->post('login_id');
		 $array_input_more = array(
			'STATUS'=>"Rejected",
			'retailerremark' => $scfremark,
			'profile_approved_by'=>$login_id
			);
			
		$this->Customercrud_model->update_profile_more($id, $array_input_more);
		/*------------------------------------send mail to retailer--------------------------------------------*/
		$distributor = $this->Customercrud_model->getProfileData($id);
		$distributor_more = $this->Dsacrud_model->getProfileDataMore($id);
		$data['distributor']=$distributor;
		$data['distributor_more']=$distributor_more;
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
		$this->email->from($from_email, 'Finaleap Finserv'); 
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$distributor->EMAIL;
		$this->email->to($send_email_to_support);
		$subject = strtoupper($distributor->FN).' Your Profile rejected by distributor';
		$this->email->subject($subject);
		$mailContent = $this->load->view('templates/retailer_profile_rejected_by_dis.php',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}
		/*--------------------------------------- send email to distributor-----------------------------------------------------------*/
		$dis_login = $this->Customercrud_model->getProfileData($login_id);
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
		$data['distributor']=$distributor;
		$this->email->from($from_email, 'Finaleap Finserv'); 
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$dis_login->EMAIL;
		$this->email->to($send_email_to_support);
		$subject = strtoupper($distributor->FN).' Profile rejected sucessfully';
		$this->email->subject($subject);
		$mailContent = $this->load->view('templates/retailer_profile_rejected_by_distributor_to_distributor.php',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}

		

	
	/*--------------------------------------- send email to scfo-----------------------------------------------------------*/
	$scfo_login = $this->Customercrud_model->getProfileData($dis_login->DSA_ID);
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
	$data['distributor']=$distributor;
	$data['dis_login']=$dis_login;
	$this->email->from($from_email, 'Finaleap Finserv'); 
	//$send_to_emails=$send_to_emails;
	$send_email_to_support=$scfo_login->EMAIL;
	$this->email->to($send_email_to_support);
	$subject = strtoupper($distributor->FN).' Profile rejected sucessfully';
	$this->email->subject($subject);
	$mailContent = $this->load->view('templates/retailer_profile_rejected_by_distributor_to_scfo.php',$data,true);
	$this->email->message($mailContent); 
	if($this->email->Send())
		{
				
		}
		else
		{
			//echo $this->email->print_debugger();
		}

	$json = array('msg'=>'sucess');
	echo json_encode($json); 

	}
	/*--------------------------------------------- addded by papiha on 04_01_2023-------------------------------------------*/
	public function update_retailer_status_approved_by_distributor()
	{
         $id=$this->input->post('id');
		 $login_id=$this->input->post('login_id');
		 $product=$this->input->post('product');
		 $array_input_more = array(
			'STATUS'=>"Approved by distributor",
			'profile_approved_by'=>$login_id
			);
		 $array_input = array(
				'distributor_id'=>$product
				);
		$this->Customercrud_model->update_profile($id, $array_input);
			
		$this->Customercrud_model->update_profile_more($id, $array_input_more);
			/*------------------------------------send mail to retailer--------------------------------------------*/
			$distributor = $this->Customercrud_model->getProfileData($id);
			
			$distributor_more = $this->Dsacrud_model->getProfileDataMore($id);
			$dis_login = $this->Customercrud_model->getProfileData($login_id);
			$data['dis_login']=$dis_login;
			$data['distributor']=$distributor;
			$data['distributor_more']=$distributor_more;
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
			$this->email->from($from_email, 'Finaleap Finserv'); 
			//$send_to_emails=$send_to_emails;
			$send_email_to_support=$distributor->EMAIL;
			$this->email->to($send_email_to_support);
			$subject = strtoupper($distributor->FN).' Your Profile Approved by distributor';
			$this->email->subject($subject);
			$mailContent = $this->load->view('templates/retailer_profile_Approved_by_dis.php',$data,true);
			$this->email->message($mailContent); 
			if($this->email->Send())
				{
						
				}
				else
				{
					//echo $this->email->print_debugger();
				}
			/*--------------------------------------- send email to distributor-----------------------------------------------------------*/
			$dis_login = $this->Customercrud_model->getProfileData($login_id);
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
			$data['distributor']=$distributor;
			$this->email->from($from_email, 'Finaleap Finserv'); 
			//$send_to_emails=$send_to_emails;
			$send_email_to_support=$dis_login->EMAIL;
			$this->email->to($send_email_to_support);
			$subject = strtoupper($distributor->FN).' Profile Approved sucessfully';
			$this->email->subject($subject);
			$mailContent = $this->load->view('templates/retailer_profile_approved_by_distributor_to_distributor.php',$data,true);
			$this->email->message($mailContent); 
			if($this->email->Send())
				{
						
				}
				else
				{
					//echo $this->email->print_debugger();
				}
	
			
	
		
		/*--------------------------------------- send email to scfo-----------------------------------------------------------*/
		$scfo_login = $this->Customercrud_model->getProfileData($dis_login->DSA_ID);
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
		$data['distributor']=$distributor;
		$data['dis_login']=$dis_login;
		$this->email->from($from_email, 'Finaleap Finserv'); 
		//$send_to_emails=$send_to_emails;
		$send_email_to_support=$scfo_login->EMAIL;
		$this->email->to($send_email_to_support);
		$subject = strtoupper($distributor->FN).' Profile Approved sucessfully';
		$this->email->subject($subject);
		$mailContent = $this->load->view('templates/retailer_profile_Approved_by_distributor_to_scfo.php',$data,true);
		$this->email->message($mailContent); 
		if($this->email->Send())
			{
					
			}
			else
			{
				//echo $this->email->print_debugger();
			}
	
		$json = array('msg'=>'sucess');
		echo json_encode($json); 
	}
}
?>