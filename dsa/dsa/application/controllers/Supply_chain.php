 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supply_chain extends CI_Controller {

	public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
		$this->load->library('session');
		$this->load->model('Dsacrud_model');
        $this->load->library('email');
		//$this->load->model('Admin_model');
		$this->load->model('Operations_user_model');
		$this->load->model('Logincrud_model');	
		$this->load->model('Customercrud_model');	
		$this->load->model('Dsacustomers_model');
		$this->load->model('Distributor_model');
        $this->load->library('upload');	
		$this->load->model('common_model','common');
		$this->load->model('credit_manager_user_model');
		
		$this->load->model('Cron_model');
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
			$dashboard_data = $this->Dsacrud_model->getDashboardData_SCFO();            
			$data['dashboard_data'] = $dashboard_data;
            $this->load->view('dashboard_header', $data);
			$this->load->view('Supply_chain/dashboard_new', $data);
			//$this->load->view('footer');
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
	/*------------------------------------- addded by apapiha on 29_08_2022--------------------------------------*/
	public function managerequestall()
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
			$this->load->view('dashboard_header', $data);
			$this->load->view('Supply_chain/managerequest', $data);
	}
	public function listrequest()
	{
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
		$searchQuery = " ";
		$sel = $this->Distributor_model->getrequestcount_SCFO($filter_by);
		$totalRecords = $sel;
		
		$sel = $this->Distributor_model->getrequestfilter_SCFO($filter_by,$searchValue);
		$totalRecordwithFilter =$sel;
	    $sel = $this->Distributor_model->getrequestfilterlist_SCFO($filter_by,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage);
	    $empReceords = $sel;
	    $data = array();
        foreach($empReceords as $row)
        {

			 $distributor_id=$row->distributorid;
			$dist_info=$this->Customercrud_model->getProfileData($distributor_id);
			//print_r($dist_info);
			if(isset($dist_info->dsa_firm_name))
			{
			$dis_name=$dist_info->dsa_firm_name;
			}
			else{
				$dis_name="";
			}
			
			//print_r($row);

			$retailer_id=$row->retailerid;
			$retailer_info=$this->Customercrud_model->getProfileData($retailer_id);
			if(isset($retailer_info->dsa_firm_name) && $retailer_info->dsa_firm_name != '')
			{
				$retailer_name=$retailer_info->dsa_firm_name;
			}elseif(isset($retailer_info->FN) && isset($retailer_info->LN))
			{
				$retailer_name=$retailer_info->FN." ".$retailer_name=$retailer_info->LN;;
			}
			else{
				$retailer_name = "";
			}
           
            $link='<a style="margin-left: 8px; "href="'.base_url().'index.php/Supply_chain/addinvoice?type=invoice&requestid='.$row->id.'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a>';
                                                                          
            $link1='<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>';
              
        
            $data[] = array(
           
				"invoicenumber"=>$row->invoicenumber,
				"invoicedate"=>$row->invoicedate,
			
				"invoiceamount"=>$row->invoiceamount,
				"fundingamount"=>$row->fundingamount,
			 	"tenure"=>$row->tenure,			
			    "product"=>$row->product,
				//"Created_on"=>date("d-m-Y", strtotime($row->CREATED_AT)),  
				"Action"=>$link." ".$link1,
				"dis_name"=>$dis_name,
				"retailer_name"=>$retailer_name,
				"net_funding"=>$row->disbursedamount,
				"request_no"=>$row->request_no,
                "status"=>$row->status
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
	public function addinvoice()
	{
		
		
		$id = $this->session->userdata('ID');
		$row = $this->Customercrud_model->getProfileData($id);
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
			$data['username'] =$user_name;
			
			$data['row']=$this->Customercrud_model->getProfileData($id);
			$data['invoice_image']=$this->Distributor_model->invoice_image($requestid);
			
			$product_details = $this->Distributor_model->getproduct_details($distributor_info->product_id);
			$data['product_details']=$product_details;
			$data['Request'] = $Request;
			$data['distributor_info']=$distributor_info;
			$data['RetailerList']  = $RetailerList;
			$data['retailerinfo']=$retailerinfo;
		 
		 
		$this->load->view('dashboard_header', $data);
		
		//echo "This test";
		
		$this->load->view('Supply_chain/addinvoice', $data);
		
		
		
		
		//$this->
	}
	public function view_invoice_cloud_file($fileid)
		{

					$user = $this->Distributor_model->get_invoice_doc($fileid);
					
					//print_r($user);
                   
					$documentname = $user->path.$user->doc_cloud_name;
                    
					$pathname = "cloudfile/".$user->doc_cloud_name;
				
				     $downloadfile = " curl -X GET -u ".CLOUD_USERNAME.":".CLOUD_PASSWORD." https://files.finaleap.com/remote.php/dav/files/".CLOUD_PATH."/".$documentname."  --output ".$pathname." ";
//exit;
				    exec($downloadfile);
				    $url = base_url().$pathname;
					redirect($url, 'refresh');
 

		}
		/*----------------------------------------------------------- addded by papiha on 30_08_2022------------------------------------*/
		public function delete_invoice_doc($docid,$requestid){
			
	
			$array_input = array(
				'id' => $docid	
			);
		
			
			$result = $this->Distributor_model->delete_invoice_doc($array_input);
			redirect('distributor/addinvoice?type=invoice'.'&requestid='.$requestid);
		
		}
}
?>