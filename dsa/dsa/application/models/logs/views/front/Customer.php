<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct() {
        parent:: __construct();
      
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Customercrud_model');
        $this->load->library('upload');
		$this->load->helper(array('form', 'url'));

    }

	public function index()
	{
		if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
			//$this->load->view('header', $data);
			$this->load->view('login', $data);
		}else if($this->session->userdata("USER_TYPE") != 'CUSTOMER'){
			echo "Access Denied";
		}else{
			$id = $this->session->userdata("ID");
			$savedDocTypekyc = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "kyc");
			$savedDocTyperesidential = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "residential");
			$savedDocTypeincome = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "income");
			$savedDocTypebusiness = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "business");
			$cust_row = $this->Customercrud_model->getProfileData($id);
			
			if($cust_row->PROFILE_PERCENTAGE == 0){
				$this->customer_edit_profile_2();	
			}else if($cust_row->PROFILE_PERCENTAGE == 30){
				$this->customer_edit_profile_2_income();	
			}else if($savedDocTypekyc->doc_count>0 && $savedDocTyperesidential->doc_count>0 && $savedDocTypeincome->doc_count>0 && $savedDocTypebusiness->doc_count>0){
				redirect('customer/profile_view_p_o', 'refresh');	
			}else {
				redirect('customer/customer_documents', 'refresh');							
			}
		}
	}

	public function profile_view_p_o()
	{
		if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
			//$this->load->view('header', $data);
			$this->load->view('login', $data);
		}else{
			$id = $this->input->get("ID");
			if ($id == '') {
				$id = $this->session->userdata("ID");
			}
			
			$data_row = $this->Customercrud_model->getProfileData($id);
			$data_row_more = $this->Customercrud_model->getProfileDataMore($id);	
			$this->load->helper('url');	
			$age = $this->session->userdata('AGE');
			$u_type = $this->session->userdata("USER_TYPE");
			$q = 1;
			if($u_type == 'DSA')$q = 2;
			if($data_row->PROFILE_PERCENTAGE == 100){
				$age = 1;
			}else $age = 0;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['id'] = $id;
			$data['row'] = $data_row;
			$data['row_more'] = $data_row_more;
			$this->load->view('header', $data);
			$this->load->view('customer/customer_view_profile_1');	
		}
	}

	public function profile_view_p_t()
	{
		if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
			$this->load->view('header', $data);
			$this->load->view('login');
		}else{
			$id = $this->input->get("ID");
			$data_row = $this->Customercrud_model->getProfileDataIncome($id);	
			$this->load->helper('url');	
			$u_type = $this->session->userdata("USER_TYPE");
			$q = 1;
			if($u_type == 'DSA')$q = 2;
			$main_doc_row = $this->Customercrud_model->getMainDocumentsCount($q);
			$saved_doc_row = $this->Customercrud_model->getSavedDocumentsCount($id);
			if($saved_doc_row->doc_count==$main_doc_row->doc_count){
				$age = 1;
			}else $age = 0;
			$data['showNav'] = $age;
			$data['age'] = $age;
			$data['id'] = $id;		
			$data['row'] = $data_row;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			if(empty($data_row)){
				redirect('customer/customer_documents?ID='.$id.'&error=', 'refresh');
			}else if(!empty($data_row) && $data_row->RETIRED==1){
				$data['type'] = 'notworking';
			}else if(!empty($data_row) && $data_row->BIS_PROFESSION != ''){
				$data['type'] = 'business';
			}else {
				$getType = $this->input->get('type');
				//echo $getType;
				if(!empty($data_row) && $data_row->ORG_NAME != ''){
					$data['type'] = 'salaried';	
				}else {
					if(!empty($getType)){
						if($getType == 'notworking'){
							redirect('customer/customer_documents?ID='.$id.'&error=', 'refresh');
						}else {
							$data['type'] = 'salaried';
							if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
						}
					}else {
						$data['type'] = 'salaried';
						if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
					}				
				}						
			}
					
			$this->session->set_userdata("PATIENT_USER_TYPE", $data['type']);
			$this->load->view('header', $data);
			$this->load->view('customer/customer_view_profile_2', $data);
		}
	}

	public function profile_view_p_thre()
	{
		if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['age'] = '';
			$data['userType'] = "none";
			$this->load->view('header', $data);
			$this->load->view('login');
		}else{
			$u_type = $this->session->userdata("USER_TYPE");
		$id = $this->input->get("ID");
		$data_row = $this->Customercrud_model->getDocuments($id);
		$doc_type_user = 2;
		if($u_type == 'CUSTOMER')$doc_type_user = 1;
		//$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user);
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$q = 1;
		if($u_type == 'DSA')$q = 2;
		$main_doc_row = $this->Customercrud_model->getMainDocumentsCount($q);
		$saved_doc_row = $this->Customercrud_model->getSavedDocumentsCount($id);
		if($saved_doc_row->doc_count==$main_doc_row->doc_count){
			$age = 1;
		}else $age = 0;
		$data['showNav'] = $age;
		$data['age'] = $age;
		$data['error'] = '';
		$data['id'] = $id;
		$data['userType'] = $u_type;
		$data['documents'] = $data_row;
		//$data['documents_type'] = $data_doctype;
		$this->load->view('header', $data);
		$data['error'] = $this->input->get('error');
		$this->load->view('customer/customer_view_profile_3', $data);
		}
	}

	public function redirect_to_apply_for_loan(){
		$u_type = $this->session->userdata("USER_TYPE");
		if($u_type!='CUSTOMER'){
			redirect('/', 'refresh');
		}
		$u_id = $this->input->get('coapp_id');
		$id = $this->session->userdata("ID");
		if($u_id != ''){
			$array_input_per['PROFILE_PERCENTAGE'] = 100;
			$this->Customercrud_model->update_coapplicant($u_id, $array_input_per);
			$this->Customercrud_model->update_profile($id, $array_input_per);
		}else if($id != ''){
			$array_input_per['PROFILE_PERCENTAGE'] = 100;
			$this->Customercrud_model->update_profile($id, $array_input_per);
		}
		
		$this->customer_apply_for_loan();
		
	}

	public function customer_edit_profile_2()
	{
		
		$id = $this->session->userdata("ID");
		$data_row = $this->Customercrud_model->getProfileData($id);
		$data_row_more = $this->Customercrud_model->getProfileDataMore($id);	
		$this->load->helper('url');	
		$age = $this->session->userdata('AGE');
		$u_type = $this->session->userdata("USER_TYPE");
		$q = 1;
		if($u_type == 'DSA')$q = 2;
		$main_doc_row = $this->Customercrud_model->getMainDocumentsCount($q);
		$saved_doc_row = $this->Customercrud_model->getSavedDocumentsCount($id);
		if($saved_doc_row->doc_count==$main_doc_row->doc_count){
			$age = 1;
		}else $age = 0;
		$data['showNav'] = $age;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$data['row'] = $data_row;
		$data['row_more'] = $data_row_more;
		$this->load->view('header', $data);
		$this->load->view('customer/customer_update_profile_2');
	}

	public function customer_edit_profile_2_income()
	{
		
		$id = $this->session->userdata("ID");
		$coappid = $this->input->get("COAPPID");
		if($coappid!='')$id = $coappid;
		$cust_row = $this->Customercrud_model->getProfileData($id);
		$data_row = $this->Customercrud_model->getProfileDataIncome($id);	
		$data_row_more = $this->Customercrud_model->getProfileDataMore($id);
		$perms_type = $this->input->get('type');
		
		
		$this->load->helper('url');	
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;		
		$data['row'] = $data_row;
		$data['row_more']=$data_row_more;
		$data['profile_percentage'] = $cust_row->PROFILE_PERCENTAGE;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		if(!empty($data_row) && $data_row->BIS_PROFESSION != ''){
			$data['type'] = 'business';
		}else {
			$getType = $this->input->get('type');
			//echo $getType;
			if(!empty($data_row) && $data_row->ORG_NAME != ''){
				$data['type'] = 'salaried';	
			}else {
				if(!empty($getType)){
					if($getType == 'notworking'){
						$data['type'] = 'notworking';
						//redirect('customer/customer_documents?ID='.$id.'&error=', 'refresh');
					}else {
						$data['type'] = 'salaried';
						if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
					}
				}else {
					$data['type'] = 'salaried';
					if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
				}				
			}						
		}

		$type = array('USER_TYPE' => $data['type']);

		$this->Customercrud_model->update_user_type($id,$type);
		$this->session->set_userdata("PATIENT_USER_TYPE", $data['type']);
		$this->load->view('header', $data);
		$this->load->view('customer/customer_update_profile_2_income', $data);
	}
	public function coapplicant_new_screen_one()
	{
		
		$id = $this->session->userdata("ID");
		$coappId = $this->input->get("COAPPID");
		$data_row_more = $this->Customercrud_model->getCoapplicantDetails($id, $coappId);	
		$this->load->helper('url');	
		
		$data['showNav'] = 1;
		$data['age'] = 0;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$data['row_more'] = $data_row_more;
		$this->load->view('header', $data);
		$this->load->view('customer/coapplicant_details_screen_one');
	}

	public function coapplicant_new_screen_two()
	{
		
		//$id = $this->session->userdata("ID");
		$coappId = $this->input->get("COAPPID");
		$data_row = $this->Customercrud_model->getCoapplicantIncomeDetails($coappId);	
		$this->load->helper('url');	
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = 0;	
		$data['co_app'] = $coappId;		
		$data['row'] = $data_row;		
		$data['userType'] = $this->session->userdata("USER_TYPE");
		if(!empty($data_row) && $data_row->BIS_PROFESSION != ''){
			$data['type'] = 'business';
		}else {
			$getType = $this->input->get('type');
			//echo $getType;
			if(!empty($data_row) && $data_row->ORG_NAME != ''){
				$data['type'] = 'salaried';	
			}else {
				if(!empty($getType)){
					if($getType == 'notworking'){
						$data['type'] = 'notworking';
						//redirect('customer/customer_documents?ID='.$id.'&error=', 'refresh');
					}else {
						$data['type'] = 'salaried';
						if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
					}
				}else {
					$data['type'] = 'salaried';
					if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
				}				
			}						
		}

		$type = array('USER_TYPE' => $data['type']);

		$this->Customercrud_model->update_coapp_user_type($coappId,$type);
				
		$this->session->set_userdata("PATIENT_USER_TYPE", $data['type']);
		$this->load->view('header', $data);
		$this->load->view('customer/coapplicant_income_screen_2', $data);
	}

	public function customer_edit_profile_3_loanapp()
	{
		$statle_str = file_get_contents(base_url('json/allCities.json'));
        $state_json = json_decode($statle_str, true);
        $states = array_keys($state_json);

		$id = $this->session->userdata("ID");
		$data_row = $this->Customercrud_model->getProfileData($id);	
		$this->load->helper('url');	
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$data['row'] = $data_row;
		$data['states'] = $states;
		$data['type'] = 'salaried';
		if($this->input->get('type')!='')$data['type'] = $this->input->get('type');
		$this->load->view('header', $data);
		$this->load->view('customer/customer_update_profile_3_loanapp', $data);
	}

	public function customer_edit_profile_1()
	{
		$id = $this->session->userdata("ID");
		$data_row = $this->Customercrud_model->getProfileData($id);	
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$data['row'] = $data_row;
		$this->load->view('header', $data);
		$this->load->view('customer/customer_update_profile_1');
	}

	public function moreinfo()
	{
		if($this->session->userdata("USER_TYPE") == ''){
			$data['showNav'] = 0;
			$data['error'] = '';
			$data['userType'] = "none";
			$this->load->view('header', $data);
			$this->load->view('login');
		}else{
			$id = $this->session->userdata("ID");
			$data_row = $this->Customercrud_model->getProfileData($id);
			$this->load->helper('url');
			$age = $this->session->userdata('AGE');
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['row'] = $data_row;
			$this->load->view('header', $data);
			$this->load->view('customer/customermoreinfo');
		}
	}

		public function customer_documents()
	{
		$u_type = $this->session->userdata("USER_TYPE");
		$id = $this->session->userdata("ID"); // user id
		$u_id = $this->input->get("ID"); 
		
		$coapp = false;
		if($u_id!=' '){
			$id = $u_id;
			$coapp = true;
		}
		
		$data_row = $this->Customercrud_model->getDocuments($id); // get users uploaded documents 
		$doc_type_user = 2;
		if($u_type == 'CUSTOMER')$doc_type_user = 1;
		$data_doctype = "";//$this->Customercrud_model->getDocumentsType($doc_type_user);
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$q = 1;
		if($u_type == 'DSA')$q = 2;
		$data['showNav'] = $age;

		$inc_src = $this->Customercrud_model->get_user_type($id);



		
		$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "kyc");
		if($savedDocType->doc_count > 0){
			$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "residential");
			if($savedDocType->doc_count > 0){
				if($inc_src == "salaried"){ 
					$doc1 = $this->Customercrud_model->get_salaried_salary_slip_SavedDocumentsCount($id, "income");
					$doc2 = $this->Customercrud_model->get_salaried_itr_SavedDocumentsCount($id, "income");
					$doc3 = $this->Customercrud_model->get_salaried_bank_SavedDocumentsCount($id, "income");

					$count = $doc1+$doc2+$doc3;
					if($count > 1){
						$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "employment");
						if($savedDocType->doc_count > 0){
							$data['save'] = true;
							$data_doctype = $this->Customercrud_model->getDocumentsType_incomesrc($doc_type_user,"salaried","EMPLOYMENT");
							$data['doc_type'] = "employment";
							$data['doc_count'] = 4;
							$data['message'] = "All documents Uploaded Successfully";
						} else {
							$data_doctype = $this->Customercrud_model->getDocumentsType_incomesrc($doc_type_user,"salaried","EMPLOYMENT");
							$data['doc_type'] = "employment";
							$data['doc_count'] = 4;
							$data['message'] = "Upload any one document for Employment/Business";
						}

					} else {

						$data_doctype = $this->Customercrud_model->getDocumentsType_incomesrc($doc_type_user,"salaried","INCOME");
						$data['doc_type'] = "income";  
						$data['doc_count'] = 3;
						$data['message'] = "Upload any two document for Income";

					}
				} else if($inc_src == "business"){

					$doc1 = $this->Customercrud_model->get_business_bank_SavedDocumentsCount($id, "income");
					$doc2 = $this->Customercrud_model->get_business_balance_audit_itr_SavedDocumentsCount($id, "income");
					$count = $doc1+$doc2;
					if($count > 1){
						$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "business");
						if($savedDocType->doc_count > 0){
							$data['save'] = true;
							$data_doctype = $this->Customercrud_model->getDocumentsType_incomesrc($doc_type_user,"self-employed","BUSINESS");
							$data['doc_type'] = "business";
							$data['doc_count'] = 4;
							$data['message'] = "All documents Uploaded Successfully";

						} else {
							$data_doctype = $this->Customercrud_model->getDocumentsType_incomesrc($doc_type_user,"self-employed","BUSINESS");
							$data['doc_type'] = "business";  
							$data['doc_count'] = 4;
							$data['message'] = "Only one document is Mandatory others if available";

						}

					} else {

						$data_doctype = $this->Customercrud_model->getDocumentsType_incomesrc($doc_type_user,"self-employed","INCOME");
						$data['doc_type'] = "income";  
						$data['doc_count'] = 3;
						$data['message'] = "All documents are Mandatory";
					}
				}

			}else{
				$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "RESIDENTIAL");
				$data['doc_type'] = "residential";
				$data['doc_count'] = 2;
				$data['message'] = "Upload any one document for Residential";

			}			
		}else{
			$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "KYC");
			$data['doc_type'] = "kyc";
			$data['doc_count'] = 1;
			$data['message'] = "Upload any one document for kyc";

		}

		
		
		$data['age'] = $age;
		$data['error'] = '';
		$data['userType'] = $u_type;
		$data['coapp_id'] = $u_id;
		$data['documents'] = $data_row;
		$data['documents_type'] = $data_doctype;
		$data['user_type'] = $inc_src;

		
		$this->load->view('header', $data);
		$data['error'] = $this->input->get('error');
		$this->session->set_flashdata('message',$data['message']);
		if(!$coapp)$this->load->view('customer/customerdocumentsnew', $data);
		else $this->load->view('customer/customerdocumentsnewcoapp', $data);
	}

	public function dsa_documents_upload()
	{
		$u_type = $this->session->userdata("USER_TYPE");
		$id = $this->session->userdata("ID");
		
		$data_row = $this->Customercrud_model->getDocuments($id);
		$doc_type_user = 2;
		$data_doctype = "";//$this->Customercrud_model->getDocumentsType($doc_type_user);
		$this->load->helper('url');
		$age = $this->session->userdata('AGE');
		$q = 1;
		if($u_type == 'DSA')$q = 2;
		$age = 0;
		$data['showNav'] = $age;
	
		$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "kyc");
		if($savedDocType->doc_count > 0){
			$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "residential");
			if($savedDocType->doc_count > 0){
				$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "income");
				if($savedDocType->doc_count > 0){
					$savedDocType = $this->Customercrud_model->getSavedDocumentsCountWithMaster($id, "business");
					if($savedDocType->doc_count > 0){
						$data['save'] = true;
						$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "BUSINESS");
						$data['doc_type'] = "business";
						$data['doc_count'] = 4;
					}else{
						$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "BUSINESS");
						$data['doc_type'] = "business";
						$data['doc_count'] = 4;
					}
				}else{
					$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "INCOME");
					$data['doc_type'] = "income";
					$data['doc_count'] = 3;

				}
			}else{
				$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "RESIDENTIAL");
				$data['doc_type'] = "residential";
				$data['doc_count'] = 2;

			}			
		}else{
			$data_doctype = $this->Customercrud_model->getDocumentsType($doc_type_user, "KYC");
			$data['doc_type'] = "kyc";
			$data['doc_count'] = 1;
		}

		$data['age'] = $age;
		$data['error'] = '';
		$data['userType'] = $u_type;
		$data['documents'] = $data_row;
		$data['documents_type'] = $data_doctype;
		
		$this->load->view('header', $data);
		$data['error'] = $this->input->get('error');
		$this->load->view('dsa/dsa_documents_upload', $data);
	}

	public function score_error_popup()
	{
		$error = $this->input->get('error');
		$data['error'] = $error;
		$this->load->view('customer/score_error_popup', $data);
	}

	public function credit_score_update_user_details()
	{
		$id = $this->session->userdata("ID");
		$reditScoreSavedProfileData = $this->Customercrud_model->getCreditScoreSavedProfileData($id);
		$u_type = $this->session->userdata("USER_TYPE");
		$error = $this->input->get('error');
		$data['error'] = $error;
		$data['showNav'] = 0;
		$data['age'] = 0;
		$data['userType'] = $u_type;
		if($reditScoreSavedProfileData)$data['row'] = $reditScoreSavedProfileData;
		$this->load->view('header', $data);
		$this->load->view('customer/credit_score_update_user_details', $data);
	}

	public function customer_score_update_user_details_action()
	{
		$id = $this->session->userdata("ID");
		$data = [];
		$data['customer_id'] = $id;
		$data['postal_code'] = $this->input->post('resi_pincode');
		$data['address_line_1'] = $this->input->post('resi_add_1');
		$data['address_line_2'] = $this->input->post('resi_add_2');
		$data['state'] = $this->input->post('resi_state');
		$data['locality'] = $this->input->post('resi_city');
		$data['city'] = $this->input->post('resi_city');
		$data['first_name'] = $this->input->post('f_name');
		$data['last_name'] = $this->input->post('l_name');
		$data['dob'] = $this->input->post('dob');
		$data['email'] = $this->input->post('email');
		$data['mobile'] = $this->input->post('mobile');
		$data['gender'] = $this->input->post('gender');
		$data['pan'] = $this->input->post('pan');
		
		$id = $this->Customercrud_model->save_credit_score_user_details($data);	
		if($id > 0){
			$response = array('status' => 1, 'message' => 'You have successfully updated details for credit score, now you call check your credit score.');
			echo json_encode($response);
		}else {
			$response = array('status' => 0, 'message' => 'Some unknown error coming, please try again.');
			echo json_encode($response);
		}
	}

	public function customer_apply_for_loan_next()
	{
		$id = $this->session->userdata("ID");
		if($this->Customercrud_model->check_credit_score($id)){
			$row = $this->Customercrud_model->get_saved_credit_score($id);
			$data['score'] = $row->score;
			$data['score_success'] = 1;
			$this->session->set_userdata("score", $row->score);
			$this->load->helper('url');
			$data['showNav'] = 1;
			$data['age'] = '';
			$data['error'] = '';
			$data['type'] = 'home';
			$type = $this->input->get('type');
			if($type!='')$data['type'] = $type;
			
			$id = $this->session->userdata("ID");
			$co_app = $this->Customercrud_model->getMyCoapplicants($id);

			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['co_app'] = $co_app;
			$isCoapp = count($co_app) > 0 ? 'true' : 'false';
			$isProfileFull = 'false';
			for ($i=0; $i < count($co_app); $i++) { 
				if($co_app[$i]->PROFILE_PERCENTAGE==100)$isProfileFull = 'true';
			}
			$data['coapplicant'] = $isCoapp;
			$data['isProfileFull'] = $isProfileFull;
			$this->load->view('header', $data);
			$this->load->view('customer/customer_apply_loan_screen_1');
			//exit;
		}
	}

	public function customer_apply_for_loan()
	{
		$this->load->view('customer/loader_view');
	}

	public function customer_apply_for_loan_with_score_credit()
	{

		
		//echo date("Y-m-d h:m:s");exit;
		$id = $this->session->userdata("ID");
		if($this->Customercrud_model->check_credit_score($id)){
			$response = array('status' => 1, 'message' => '');
			echo json_encode($response);
		}else {
			
			$this->session->set_userdata("score", '');
			$filterArr = [];
			$reditScoreSavedProfileData = $this->Customercrud_model->getCreditScoreSavedProfileData($id);
		
			if(!$reditScoreSavedProfileData || empty($reditScoreSavedProfileData)){
				$self_profile_data = $this->Customercrud_model->getProfileData($id);
				$self_profile_data_more = $this->Customercrud_model->getProfileDataMore($id);
				$filterArr['pan'] = $self_profile_data->PAN_NUMBER;
				$filterArr['email'] = $self_profile_data->EMAIL;
				$filterArr['mobile'] = $self_profile_data->MOBILE;
				$filterArr['first_name'] = $self_profile_data->FN." ".$self_profile_data->LN;
				$filterArr['last_name'] = $self_profile_data->LN;
				$filterArr['address_line_1'] = $self_profile_data_more->RES_ADDRS_LINE_1;
				$filterArr['address_line_2'] = $self_profile_data_more->RES_ADDRS_LINE_2;
				$filterArr['locality'] = $self_profile_data_more->RES_ADDRS_CITY;
				$filterArr['city'] = $self_profile_data_more->RES_ADDRS_CITY;
				$filterArr['state'] = $self_profile_data_more->RES_ADDRS_STATE;
				$filterArr['postal_code'] = $self_profile_data_more->RES_ADDRS_PINCODE;
				$filterArr['dob'] = $self_profile_data->DOB;
				if($self_profile_data->GENDER!=''){
					if($self_profile_data->GENDER == "male")$filterArr['gender'] = "M";
					else $filterArr['gender'] = "F";
				}else $filterArr['gender'] = "F";
			}else{
				$filterArr['pan'] = $reditScoreSavedProfileData->pan;
				$filterArr['email'] = $reditScoreSavedProfileData->email;
				$filterArr['mobile'] = $reditScoreSavedProfileData->mobile;
				$filterArr['first_name'] = $reditScoreSavedProfileData->first_name." ".$reditScoreSavedProfileData->last_name;
				$filterArr['last_name'] = $reditScoreSavedProfileData->last_name;
				$filterArr['address_line_1'] = $reditScoreSavedProfileData->address_line_1;
				$filterArr['address_line_2'] = $reditScoreSavedProfileData->address_line_2;
				$filterArr['locality'] = $reditScoreSavedProfileData->city;
				$filterArr['city'] = $reditScoreSavedProfileData->city;
				$filterArr['state'] = $reditScoreSavedProfileData->state;
				$filterArr['postal_code'] = $reditScoreSavedProfileData->postal_code;
				$filterArr['dob'] = $reditScoreSavedProfileData->dob;
				
				if($reditScoreSavedProfileData->gender!=''){
					if($reditScoreSavedProfileData->gender == "male")$filterArr['gender'] = "M";
					else $filterArr['gender'] = "F";
				}else $filterArr['gender'] = "F";
			}
			
			$stateAbbr = $this->Customercrud_model->getStateAbbr($filterArr['state']);
			if($stateAbbr)$filterArr['state'] = $stateAbbr->state_abbr;
			
			$name = "Mana rao";
			$url = 'https://eportuat.equifax.co.in/cir360Report/cir360Report';
			$dataInput = '{
				"RequestHeader": {
					"CustomerId": "21",
					"UserId": "UAT_FINALE",
					"Password": "V2*Pdhbr",
					"MemberNumber": "027BB02400",
					"SecurityCode": "N42",
					"CustRefField": "5000",
					"ProductCode": ["IDCR"]
				},
				"RequestBody": {
					"InquiryPurpose": "00",
					"TransactionAmount": "0",
					"FirstName": "'.$filterArr['first_name'].'",
					"MiddleName": "",
					"LastName": "'.$filterArr['last_name'].'",
					"InquiryAddresses": [{
						"seq": "1",
						"AddressLine1": "'.$filterArr['address_line_1'].'",
						"AddressLine2": "'.$filterArr['address_line_2'].'",
						"Locality": "'.$filterArr['city'].'",
						"City": "'.$filterArr['city'].'",
						"State": "'.$filterArr['state'].'",
						"AddressType": ["H"],
						"Postal": "'.$filterArr['postal_code'].'"
					}],
					"InquiryPhones": [{
						"seq": "1",
						"Number": "'.$filterArr['mobile'].'",
						"PhoneType": ["M"]
					}],
					"EmailAddresses": [{
						"seq": "1",
						"Email": "'.$filterArr['email'].'",
						"EmailType": ["O"]
					}],
					"IDDetails": [{
						"seq": "1",
						"IDValue": "'.$filterArr['pan'].'",
						"IDType": "T"
					}],
					"DOB": "'.$filterArr['dob'].'",
					"Gender": "'.$filterArr['gender'].'"
				},
				"Score": [{
					"Type": "ERS",
					"Version": "3.1"
				}]
			}';

			//echo $dataInput;
			$score = $this->session->userdata("score");
			$code = 0;
			$respnse = "";
			if($score == ''){
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $dataInput);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				$arr = curl_exec($ch);
				$respnse = $arr;
				curl_close($ch);
				
				//print_r($arr);
				$dataArr = json_decode($arr);
				$code = $dataArr->InquiryResponseHeader->SuccessCode;
				if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->Error)){
					$code = 0;
				}else $score = $dataArr->CCRResponse->CIRReportDataLst[0]->CIRReportData->ScoreDetails[0]->Value;
				
			}else $code = 1;
			
			if($code == 1){
				if(isset($dataArr->CCRResponse->CIRReportDataLst[0]->Error)){
					
					$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
					$error_code = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorCode;
					//if($error_code == 'GSWDOE116')echo("id error ".$score_error);
					//else echo("other error");
					
					$data['score'] = 0;
					$data['score_success'] = $score_error;
					$response = array('status' => 0, 'error' => $score_error);
					echo json_encode($response);
					/*redirect('customer/score_error_popup?error='.$score_error, 'refresh');*/
				}else{
					$id = $this->session->userdata("ID");
					$creditSaveArray = [];
					$creditSaveArray['customer_id'] = $id;
					$creditSaveArray['score'] = $score;
					if($respnse!='')$creditSaveArray['response'] = $respnse;
					$creditSaveArray['checked_dts'] = date("Y-m-d h:m:s");

					$this->Customercrud_model->save_credit_score($creditSaveArray);
					$response = array('status' => 1, 'message' => '');
					echo json_encode($response);	
				}
			}else{
				$score_error = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorDesc;
				$error_code = $dataArr->CCRResponse->CIRReportDataLst[0]->Error->ErrorCode;
				//if($error_code == 'GSWDOE116')echo("id error ".$score_error);
				//else echo("other error");
				
				$data['score'] = 0;
				$data['score_success'] = $score_error;
				$response = array('status' => 0, 'error' => $score_error);
				echo json_encode($response);

				//redirect('customer/score_error_popup?error='.$score_error, 'refresh');
			}
		}
		
	}

	public function customer_apply_for_loan_lap()
	{

		$this->load->helper('url');
		$data['showNav'] = 1;
		$data['age'] = '';
		$data['error'] = '';
		$data['type'] = 'lap';
		$type = $this->input->get('type');
		if($type!='')$data['type'] = $type;
		
		$id = $this->session->userdata("ID");
		$score = $this->session->userdata("score");
		$data['score'] = $score;
		$co_app = $this->Customercrud_model->getMyCoapplicants($id);

		$data['userType'] = $this->session->userdata("USER_TYPE");
		$data['co_app'] = $co_app;
		$isCoapp = 'true';
		$isProfileFull = 'true';
		
		$data['coapplicant'] = $isCoapp;
		$data['isProfileFull'] = $isProfileFull;
		$this->load->view('header', $data);
		$this->load->view('customer/customer_apply_loan_lap', $data);
	}

	public function customer_apply_for_loan_personal_busi_cc()
	{

		$this->load->helper('url');
		$data['showNav'] = 1;
		$data['age'] = '';
		$data['error'] = '';
		$data['type'] = 'personal';
		$type = $this->input->get('type');
		if($type!='')$data['type'] = $type;
		$score = $this->session->userdata("score");
		$data['score'] = $score;
		$data['userType'] = $this->session->userdata("USER_TYPE");		
		$this->load->view('header', $data);
		$this->load->view('customer/customer_apply_loan_personal_busi_cc');
	}

	public function applied_loans_list()
	{
		$age = $this->session->userdata("AGE");
		$id = $this->session->userdata("ID");
		$data_row = $this->Customercrud_model->getAppliedLoans($id);
		$this->load->helper('url');
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['error'] = '';
		$data['loans'] = $data_row;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$this->load->view('header', $data);
		$this->load->view('customer/aadhar_esign');
		//$this->load->view('customer/applied_loans');
	}

	public function customer_update_profile_2_l(){
		//$this->showErrorMessage("hi mahi");
		$id = $this->session->userdata('ID');
		$dob = $this->input->post('DOB');		
		$diff = abs(strtotime(date("Y-m-d")) - strtotime($dob));
		$years = floor($diff / (365*60*60*24));
		$array_input = array(
			'AGE' => $years,
			'CURRENT_RESIDENTIAL_ADDRESS' => $this->input->post('cra'),
			'EDUCATION_BACKGROUND' => $this->input->post('educationbac'),
			'OCCUPATION' => $this->input->post('occupation'),
			'NATIVE_PLACE' => $this->input->post('nativeplace'),
			'AGRI_LAND_IN_NATIVE' => $this->input->post('alin'),
			'AGRI_INCOME' => $this->input->post('agri_income'),
			'OTHER_INCOME_SOURCE' => $this->input->post('ois'),
			'DOB' => $dob,
			'EXISTING_ACTIVE_LOANS' => $this->input->post('eal'),
			'EXISTING_LOAN_EMI' => $this->input->post('ele'),
			'NO_OF_DEPENDANTS' => $this->input->post('nod'),
			'LIVING_YEAR_PRESENT_ADDRESS' => $this->input->post('paly'),
			'YEARS_IN_CITY_LIVING' => $this->input->post('lic'),
			'IT_RETURN_AVAILABLE' => $this->input->post('ITR'),
			'IT_RETURN_FILED_WITH_GAP' => $this->input->post('ITRG'),
			'ANNUAL_INCOME' => $this->input->post('annual_income'),			
			'TYPE_OF_LOAN' => $this->input->post('loan_type'),
			'PAN_NUMBER' => $this->input->post('Pan'),
			'AADHAR_NUMBER' => $this->input->post('aadhar'),			
			'DESIGNATION' => $this->input->post('designation'),
			'PAST_EMPLOYMENT_DETAILS' => $this->input->post('ped'),		
			'COMPANY_ADDRESS' => $this->input->post('ca'),
			'OFFICE_EMAIL' => $this->input->post('oe'),
			'OFFICE_CONTACT_NO' => $this->input->post('ocn'),
			'CASH_SALARY' => $this->input->post('cs'),
			'GROSS_SALARY' => $this->input->post('gs'),
			'BASIC_SALARY' => $this->input->post('bs'),
			'LOAN_EMI_DEDUCT_FROM_SALARY' => $this->input->post('ledfs'),
			'BANK_CREDIT_SALARY' => $this->input->post('sctb'),
			'SELF_BUSINESS_ADDRESS' => $this->input->post('sba'),
			'OWNERSHIP_TYPE' => $this->input->post('owner_type'),
			'PREMISES_RENTED_SELF' => $this->input->post('premise_type'),
			'BUSINESS_NATURE' => $this->input->post('bt'),
			'CITY' => $this->input->post('city'),
			'STATE' => $this->input->post('state'),
			'DISTRICT' => $this->input->post('district'),
			);

		if($this->input->post('userType') == 'salaried')$array_input['COMPANY_TYPE'] = $this->input->post('company_type');
		$id = $this->Customercrud_model->update_profile($id, $array_input);
		if($id > 0){
			$age = $this->session->set_userdata("AGE", $array_input['AGE']);
			$response = array('status' => 1, 'message' => 'Profile updated successfully');
			echo json_encode($response);
		}else {
			$response = array('status' => 0, 'message' => 'Error in profile update');
			echo json_encode($response);
		}
	}

	public function customer_apply_for_loan_action(){
		//$this->showErrorMessage("hi mahi");
		$id = $this->session->userdata('ID');
		$array_input = array(
			'LOAN_TYPE' => $this->input->post('loan_type'),
			'LOAN_AMOUNT' => $this->input->post('loan_amount'),
			'DURATION' => $this->input->post('loan_duration'),
			'CUST_ID' => $id,
			'LOAN_STATUS' => "NEW",			
			);
		
		$id = $this->Customercrud_model->saveApplyLoan($array_input);
		if($id > 0){
			$response = array('status' => 1, 'message' => 'You have successfully applied for loan, please wait for some time we will contact you very soon.');
			echo json_encode($response);
		}else {
			$response = array('status' => 0, 'message' => 'Some unknown error coming, please try again.');
			echo json_encode($response);
		}
	}

	public function customer_update_profile_1_l(){
		//$this->showErrorMessage("hi mahi");
		$id = $this->session->userdata('ID');
		$user_type = $this->session->userdata('USER_TYPE');
		$array_input = array(
			'FN' => $this->input->post('fn'),
			'LN' => $this->input->post('ln'),
			'EMAIL' => $this->input->post('email'),
			'MOBILE' => $this->input->post('mobile')			
			);

		if ($user_type!='CUSTOMER') {
			$array_input['DOB'] = $this->input->post('DOB');	
			$array_input['PAN_NUMBER'] = $this->input->post('pan');	
			$array_input['AADHAR_NUMBER'] = $this->input->post('aadhar');	
			$array_input['CURRENT_RESIDENTIAL_ADDRESS'] = $this->input->post('address');	
			$array_input['EXPERIENCE'] = $this->input->post('experience');	
			$array_input['CITY'] = $this->input->post('city');
			$array_input['STATE'] = $this->input->post('state');
			$array_input['DISTRICT'] = $this->input->post('district');
		}
		
		$chk_mobile = $this->Customercrud_model->check_mobile($id, $array_input['MOBILE']);
		$chk_email = $this->Customercrud_model->check_email($id, $array_input['EMAIL']);

		if($chk_email == 0 && $chk_mobile == 0){
			$id = $this->Customercrud_model->update_profile($id, $array_input);
			if($id > 0){			
				$response = array('status' => 1, 'message' => 'Profile updated successfully', 'user_type' =>$user_type);
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Error in profile update');
				echo json_encode($response);
			}
		}else if($chk_email == 1){
			$response = array('status' => 0, 'message' => 'Email id already in use by other user');
			echo json_encode($response);
		}else if($chk_mobile == 1){
			$response = array('status' => 0, 'message' => 'Mobile number already in use by other user');
			echo json_encode($response);
		}
	}

	public function delete_doc(){
		
		$array_input = array(
			'ID' => $this->input->post('id')		
		);		
		
		$id = $this->Customercrud_model->delete_doc($array_input);
		if($id > 0){	
                            require 'fpdf.php';
							$id = $this->session->userdata('ID');
							$data_row = $this->Customercrud_model->getDocuments($id);
							$pdf = new FPDF('P', 'pt', 'Letter');
							$pdf->addPage();
							foreach($data_row as $row)
							{ 
									$path = './images/documents/';
									$filename = $row->DOC_NAME;
									$url = $path.$filename;
									$pdf->Image($url);
							}
							$directoryName="./images/all_document_pdf/";
							if(!is_dir($directoryName))
							{
										mkdir($directoryName, 0755);
										file_put_contents($pdf->Output('$id.pdf','F'));
							}
							else
							{
								$dir='./images/all_document_pdf/';    
								$filename= "$id.pdf";                                      
								 if(file_exists($dir.$filename))
								 {
									 unlink($dir.$filename);
									  $pdf ->Output($dir.$filename,'F');
								 }
								 else
								 {
								   $pdf ->Output($dir.$filename,'F');
								 }
							
							}		
            		
			$response = array('status' => 1, 'message' => 'Document deleted successfully');
			echo json_encode($response);
		}else {
			$response = array('status' => 0, 'message' => 'Error in document delete');
			echo json_encode($response);
		}
	}

	public function delete_doc_coapp(){
		
		$id = $this->input->post('id');
		$array_input = array(
			'ID' => $id		
		);		
		
		$user = $this->Customercrud_model->getSingleDoc($id);
		$id = $this->Customercrud_model->delete_doc($array_input);
		if($id > 0){			
			$response = array('status' => 1, 'message' => 'Document deleted successfully', 'path'=>"/dsa/dsa/index.php/customer/customer_documents?ID=".$user->USER_ID);
			echo json_encode($response);
		}else {
			$response = array('status' => 0, 'message' => 'Error in document delete');
			echo json_encode($response);
		}
	}

	public function do_upload(){
		$u_id = $this->input->post('coapp_id');
		$master_type = $this->input->post('master_type');
		$id = $this->session->userdata('ID');
		
		if($u_id!='')$id = $u_id;
		
		
		$doc_type = $this->input->post('doc_type');
		$chk_res = $this->Customercrud_model->checkSavedDocument($id, $doc_type, $master_type);
		if($chk_res > 0){
			$error = "Document ".$doc_type." already saved by you.";
			if($u_id=='')redirect('customer/customer_documents?error='.$error, 'refresh');
			else redirect('customer/customer_documents?ID='.$id.'&error='.$error, 'refresh');
		}else {
			$file_name = $_FILES["userfile"]['name'];
			$file_name = time().".".pathinfo($file_name, PATHINFO_EXTENSION);
			$file_name = str_replace(' ', '', $file_name);
			$file_type = $_FILES["userfile"]['type'];
			$file_size = $_FILES["userfile"]['size'];
			$config = array(
				'upload_path' => "./images/documents/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'overwrite' => TRUE
			);

			$config['file_name'] = $file_name;
			$config['image_type'] = $file_type;
			$config['file_size'] = $file_size;

			$this->upload->initialize($config);
			$upload_data = $this->upload->data();
			
			$file_input_arr = array(
				'USER_ID' => $id,
				'DOC_TYPE' => $doc_type,	
				'DOC_NAME' => $upload_data['file_name'],
				'DOC_SIZE' => $upload_data['file_size'],
				'DOC_FILE_TYPE' => $upload_data['image_type'],
				'DOC_MASTER_TYPE' => $master_type,
			);
			if($this->upload->do_upload())
			{
				           
				$this->Customercrud_model->saveDocuments($file_input_arr);
				            require 'fpdf.php';
							//$id = $this->session->userdata('ID');
							$data_row = $this->Customercrud_model->getDocuments($id);
							$pdf = new FPDF('P', 'pt', 'Letter');
							$pdf->addPage();
							foreach($data_row as $row)
							{ 
									$path = './images/documents/';
									$filename = $row->DOC_NAME;
									$url = $path.$filename;
									$pdf->Image($url);
							}
							$directoryName="./images/all_document_pdf/";
							if(!is_dir($directoryName))
							{
										mkdir($directoryName, 0755);
										file_put_contents($pdf->Output('$id.pdf','F'));
							}
							else
							{
								$dir='./images/all_document_pdf/';    
								$filename= "$id.pdf";                                      
								 if(file_exists($dir.$filename))
								 {
									 unlink($dir.$filename);
									  $pdf ->Output($dir.$filename,'F');
								 }
								 else
								 {
								   $pdf ->Output($dir.$filename,'F');
								 }
							
							}

				        $no_of_doc_to_upload=$this->Customercrud_model->getDocuments_Type_customer();											
                        $Uploded_Doc_Count=$this->Customercrud_model->getUploded_Documents_Type($id);
						if($Uploded_Doc_Count==$no_of_doc_to_upload)
						{
							$array_input_more = array(
											'CUST_ID' => $id,
											'STATUS'=>('Document upload complete')
											);
							
							$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
						}
					

				 redirect('customer/customer_documents?ID='.$id, 'refresh');
			}else{	
				$error_arr = array('error' => $this->upload->display_errors());
				print_r($error_arr);exit;
				 redirect('customer/customer_documents?ID='.$id.'&error=',$this->upload->display_errors(), 'refresh');
			}
			
		}
	
		
	}
	

	public function getSalariedSavedAnotherIncome(){
		$response = [];
		$response['INCOME_SALARIED'] = $this->session->userdata("INCOME_SALARIED");
		$response['INCOME_AGRI'] = $this->session->userdata("INCOME_AGRI");
		echo json_encode($response);
	}


	//new flow update

	public function customer_flow_update_s_one(){
		//$this->showErrorMessage("hi mahi");
		$id = $this->session->userdata('ID');
		$dob = $this->input->post('dob');		
		$diff = abs(strtotime(date("Y-m-d")) - strtotime($dob));
		$years = floor($diff / (365*60*60*24));
		$array_input = array(
			'AGE' => $years,
			'EDUCATION_BACKGROUND' => $this->input->post('education_type'),
			'FN' => $this->input->post('f_name'),
			'MN' => $this->input->post('m_name'),
			'LN' => $this->input->post('l_name'),
			'EMAIL' => $this->input->post('email'),
			'MOBILE' => $this->input->post('mobile'),
			'GENDER' => $this->input->post('gender'),			
			'DOB' => $dob,			
			'PAN_NUMBER' => $this->input->post('pan'),
			'AADHAR_NUMBER' => $this->input->post('aadhar'),
			'MARTIAL_STATUS' => $this->input->post('marital')
			);
		$array_input_more = array(
			'CUST_ID' => $id,
			'MOTHER_F_NAME' => $this->input->post('m_f_name'),
			'MOTHER_M_NAME' => $this->input->post('m_m_name'),
			'MOTHER_L_NAME' => $this->input->post('m_l_name'),
			'IS_SPOUSE_FATHER' => $this->input->post('spouse'),
			'SPOUSE_F_NAME' => $this->input->post('s_f_name'),
			'SPOUSE_M_NAME' => $this->input->post('s_m_name'),
			'SPOUSE_L_NAME' => $this->input->post('s_l_name'),			
			'RES_ADDRS_LINE_1' => $this->input->post('resi_add_1'),			
			'RES_ADDRS_LINE_2' => $this->input->post('resi_add_2'),
			'RES_ADDRS_LINE_3' => $this->input->post('resi_add_3'),
			'RES_ADDRS_LANDMARK' => $this->input->post('resi_landmark'),
			'RES_ADDRS_PINCODE' => $this->input->post('resi_pincode'),
			'RES_ADDRS_CITY' => $this->input->post('resi_city'),
			'NATIVE_PLACE'=>$this->input->post('NATIVE_PLACE'),
			'RES_ADDRS_STATE' => $this->input->post('resi_state'),
			'RES_ADDRS_DISTRICT' => $this->input->post('resi_district'),
			'RES_ADDRS_PROPERTY_TYPE' => $this->input->post('resi_sel_property_type'),
			'RES_ADDRS_NO_YEARS_LIVING' => $this->input->post('resi_no_of_years'),
			'PER_ADDRS_LINE_1' => $this->input->post('per_add_1'),
			'PER_ADDRS_LINE_2' => $this->input->post('per_add_2'),
			'PER_ADDRS_LINE_3' => $this->input->post('per_add_3'),
			'PER_ADDRS_LANDMARK' => $this->input->post('per_landmark'),
			'PER_ADDRS_PINCODE' => $this->input->post('per_pincode'),
			'PER_ADDRS_PROPERTY_TYPE' => $this->input->post('per_sel_property_type'),
			'PER_ADDRS_STATE' => $this->input->post('per_state'),
			'PER_ADDRS_DISTRICT' => $this->input->post('per_district'),
			'PER_ADDRS_CITY' => $this->input->post('per_city'),
			'PER_ADDRS_NO_YEARS_LIVING' => $this->input->post('per_no_of_years'),
			'TOTAL_BRO_SIS' => $this->input->post('no_of_bro_sis'),
			'NO_OF_DEPENDANTS'=>$this->input->post('NO_OF_DEPENDANTS'),
			'CONSENT'=>$this->input->post('TC'),
			'STATUS'=>('Personal details complete'),
			'VERIFY_PAN'=>$this->input->post('verify_pan_status')
			);

		$id_mobile_exist = $this->Customercrud_model->check_mobile($id, $array_input['MOBILE']);
		if($id_mobile_exist > 0){
			$response = array('status' => 0, 'message' => 'Mobile number already in use');
			echo json_encode($response);
			exit();
		}

		$id_email_exist = $this->Customercrud_model->check_email($id, $array_input['EMAIL']);
		if($id_email_exist > 0){
			$response = array('status' => 0, 'message' => 'Email id already in use');
			echo json_encode($response);
			exit();
		}


		$updated_id = $this->Customercrud_model->update_profile($id, $array_input);

		$cust_row = $this->Customercrud_model->getProfileData($id);
		if($cust_row->PROFILE_PERCENTAGE < 30){
			$array_input_per = array(
				'PROFILE_PERCENTAGE' => 30
			);
			$this->Customercrud_model->update_profile($id, $array_input_per);
		}


		$check_id = $this->Customercrud_model->check_more_profile($id);
		if($check_id > 0)$id = $this->Customercrud_model->update_profile_more($id, $array_input_more);
		else $id = $this->Customercrud_model->insert_profile_more($id, $array_input_more);

		if($id > 0){
			$age = $this->session->set_userdata("AGE", $array_input['AGE']);
			$response = array('status' => 1, 'message' => 'Profile updated successfully');
			echo json_encode($response);
		}else {
			$response = array('status' => 0, 'message' => 'Error in profile update');
			echo json_encode($response);
		}
	}

	public function customer_flow_update_s_two_salaried(){
		//$this->showErrorMessage("hi mahi");
		$id = $this->session->userdata('ID');

		if ($id == '') {
			$response = array('status' => 301, 'message' => 'Profile updated successfully');
			echo json_encode($response);
		}else {
				$array_input_more = array(
				'CUST_ID' => $id,
				'CUST_TYPE'=>('salaried'),
				'ORG_NAME' => $this->input->post('org_name'),
				'ORG_INDUSTRY_OPERATING' => $this->input->post('org_operating'),
				'ORG_TYPE' => $this->input->post('salaried_org_type'),
				'ORG_YEARS_WORKING' => $this->input->post('salaried_org_no_of_years_working'),
				'ORG_ADRS_LINE_1' => $this->input->post('salaried_org_add_line_1'),
				'ORG_ADRS_LINE_2' => $this->input->post('salaried_org_add_line_2'),
				'ORG_ADRS_LINE_3' => $this->input->post('salaried_org_add_line_3'),
				'ORG_LANDMARK' => $this->input->post('salaried_org_landmark'),
				'ORG_PINCODE' => $this->input->post('salaried_org_pin'),
				'ORG_STATE' => $this->input->post('resi_state'),
				'ORG_DISTRICT' => $this->input->post('resi_district'),
				'ORG_CITY' => $this->input->post('resi_city'),
				'ORG_DESIGNATION' => $this->input->post('org_designation'),
				'ORG_WORK_EMAIL' => $this->input->post('org_work_email'),
				'ORG_WORKED_FROM' => $this->input->post('org_working_from'),
				'ORG_SALARY_1' => $this->input->post('salary_1'),
				'ORG_SALARY_2' => $this->input->post('salary_2'),
				'ORG_SALARY_3' => $this->input->post('salary_3'),
				'ORG_EXP_YEAR' => $this->input->post('work_experience_year'),
				'ORG_EXP_MONTH' => $this->input->post('work_experience_month'),
				'ORG_ANNUAL_SALARY' => $this->input->post('org_gross_salary'),
				'ORG_OTHER_INCOME' => $this->input->post('other_income'),
				'ORG_DESIGNATION_PAST' => $this->input->post('org_past_designation'),
				'ORG_WORK_EMAIL_PAST' => $this->input->post('org_past_work_email'),
				'ORG_WORKED_FROM_PAST' => $this->input->post('org_past_working_from'),
				'ORG_SALARY_PAST_1' => $this->input->post('org_past_salary_1'),
				'ORG_SALARY_PAST_2' => $this->input->post('org_past_salary_2'),
				'ORG_SALARY_PAST_3' => $this->input->post('org_past_salary_3'),
				'ORG_ANNUAL_SALARY_PAST' => $this->input->post('org_past_gross_salary'),
				'EMIS' => $this->input->post('emis'),
				'REF_1_F_NAME' => $this->input->post('org_ref_f_name'),
				'REF_1_M_NAME' => $this->input->post('org_ref_m_name'),
				'REF_1_L_NAME' => $this->input->post('org_ref_l_name'),			
				'REF_1_MOBILE' => $this->input->post('org_ref_mobile'),			
				'REF_1_RELATION' => $this->input->post('org_ref_relation'),			
				'REF_2_F_NAME' => $this->input->post('org_ref_2_f_name'),			
				'REF_2_M_NAME' => $this->input->post('org_ref_2_m_name'),			
				'REF_2_L_NAME' => $this->input->post('org_ref_2_l_name'),			
				'REF_2_MOBILE' => $this->input->post('org_ref_2_mobile'),			
				'REF_2_RELATION' => $this->input->post('org_ref_2_relation'),						
			);
			

			$id_mobile_exist = $this->Customercrud_model->check_mobile($id, $array_input_more['REF_1_MOBILE']);
			if($id_mobile_exist > 0){
				$response = array('status' => 0, 'message' => 'Reference number one mobile number already in use');
				echo json_encode($response);
				exit();
			}

			$id_mobile_exist = $this->Customercrud_model->check_mobile($id, $array_input_more['REF_2_MOBILE']);
			if($id_mobile_exist > 0){
				$response = array('status' => 0, 'message' => 'Reference number two mobile number already in use');
				echo json_encode($response);
				exit();
			}

			$id_mobile_exist = $this->Customercrud_model->check_mobile_income_1($id, $array_input_more['REF_1_MOBILE']);
			if($id_mobile_exist > 0){
				$response = array('status' => 0, 'message' => 'Reference number one mobile number already in use');
				echo json_encode($response);
				exit();
			}

			$id_mobile_exist = $this->Customercrud_model->check_mobile_income_2($id, $array_input_more['REF_2_MOBILE']);
			if($id_mobile_exist > 0){
				$response = array('status' => 0, 'message' => 'Reference number two mobile number already in use');
				echo json_encode($response);
				exit();
			}

			$id_email_exist = $this->Customercrud_model->check_email($id, $array_input_more['ORG_WORK_EMAIL']);
			if($id_email_exist > 0){
				$response = array('status' => 0, 'message' => 'Email id already in use');
				echo json_encode($response);
				exit();
			}

			$cust_row = $this->Customercrud_model->getProfileData($id);
			if($cust_row->PROFILE_PERCENTAGE < 65){
				$array_input = array(
					'PROFILE_PERCENTAGE' => 65
				);
				$this->Customercrud_model->update_profile($id, $array_input);
			}			

			$check_id = $this->Customercrud_model->check_income_profile($id);
			if($check_id > 0){$Result_id = $this->Customercrud_model->update_profile_income_details($id, $array_input_more);
							$array_input_more1 = array(
															'CUST_ID' => $id,
															'STATUS'=>('Income details complete')
															);
							
							$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more1);
		
			}
			else {$Result_id = $this->Customercrud_model->insert_profile_income_details($id, $array_input_more);
			$array_input_more1 = array(
															'CUST_ID' => $id,
															'STATUS'=>('Income details complete')
															);
							
							$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more1);
			
			}

			if($Result_id > 0){
				$response = array('status' => 1, 'message' => 'Profile updated successfully');
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Error in profile update');
				echo json_encode($response);
			}
		}	
	}

	public function customer_flow_update_s_two_retired(){
		//$this->showErrorMessage("hi mahi");
		$id = $this->session->userdata('ID');

		if ($id == '') {
			$response = array('status' => 301, 'message' => 'Profile updated successfully');
			echo json_encode($response);
		}else {
				$array_input_more = array(
				'CUST_ID' => $id,
				'CUST_TYPE'=>('retired'),
				'RETIRED' => 1,
				'RETIRED_ANNUAL_INCOME' => $this->input->post('income'),
				'RETIRED_ANNUAL_INCOME_TYPE' => $this->input->post('income_type'),	
				'RETIRED_EMIS' => $this->input->post('emis'),					
			);	
              

			$check_id = $this->Customercrud_model->check_income_profile($id);
			if($check_id > 0){
								$Result_id = $this->Customercrud_model->update_profile_income_details($id, $array_input_more);
								$array_input_more = array(
											'CUST_ID' => $id,
											'STATUS'=>('Income details complete')
											);
							
							$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
								
			                 }  
			else {
				     $Result_id = $this->Customercrud_model->insert_profile_income_details($id, $array_input_more);
					 $array_input_more = array(
											'CUST_ID' => $id,
											'STATUS'=>('Income details complete')
											);
							
							$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);

			    }

			if($Result_id > 0){
				$response = array('status' => 1, 'message' => 'Profile updated successfully');
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Error in profile update');
				echo json_encode($response);
			}
		}	
	}

	public function customer_flow_update_s_two_coapp_retired(){
		//$this->showErrorMessage("hi mahi");
		$id = $this->input->post("coappid");

		if ($id == '') {
			$response = array('status' => 301, 'message' => 'Coapplicant Profile updated successfully');
			echo json_encode($response);
		}else {
				$array_input_more = array(
				'COAPP_ID' => $id,
				'COAPP_TYPE'=>('retired'),
				'RETIRED' => 1,
				'RETIRED_ANNUAL_INCOME' => $this->input->post('income'),
				'RETIRED_ANNUAL_INCOME_TYPE' => $this->input->post('income_type'),	
				'RETIRED_EMIS' => $this->input->post('emis'),					
			);	
			

			$checkRow = $this->Customercrud_model->getCoapplicantIncome($id);
		
			if(isset($checkRow))$id = $this->Customercrud_model->update_coapplicant_income($id, $array_input_more);
			else $id = $this->Customercrud_model->insert_coapplicant_income($array_input_more);

			if($id > 0){
				$response = array('status' => 1, 'message' => 'Coapplicant Profile updated successfully');
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Error in Coapplicant profile update');
				echo json_encode($response);
			}
		}	
	}

	public function customer_flow_update_s_two_business(){
		$id = $this->session->userdata('ID');

		if ($id == '') 
		{
			$response = array('status' => 301);
			echo json_encode($response);
		}else 
		{
			

			$array_input = array(
				'CUST_ID' => $id,
				'CUST_TYPE'=>('self employeed'),
				'ORG_ADRS_LINE_1' => $this->input->post('resi_add_1'),
				'ORG_ADRS_LINE_2' => $this->input->post('resi_add_2'),
				'ORG_ADRS_LINE_3' => $this->input->post('resi_add_3'),
				'ORG_LANDMARK' => $this->input->post('business_landmark'),
				'ORG_PINCODE' => $this->input->post('resi_pincode'),
				'ORG_STATE' => $this->input->post('resi_state'),
				'ORG_DISTRICT' => $this->input->post('resi_district'),
				'ORG_CITY' => $this->input->post('resi_city'),
				'BIS_YEARS_CURRERENT_ADDRS' => $this->input->post('resi_no_of_years'),
				'BIS_PROPERTY_TYPE' => $this->input->post('sel_property_type'),
				'BIS_PROFESSION' => $this->input->post('user_profession'),
				'REGI_NO' => $this->input->post('regi_no'),
				'BIS_PAN' => $this->input->post('business_pan'),
				'BIS_GST' => $this->input->post('business_gst_no'),
				'BIS_NAME'=> $this->input->post('org_name_buisness'),
				'BIS_ANNUAL_INCOME' => $this->input->post('business_annual_income'),
				'BIS_INDUS_OPERATING' => $this->input->post('self_emp_operating'),
				'BIS_PREMISES_TYPE' => $this->input->post('self_emp_property_type'),
				'BIS_NATURE_OF_BIS' => $this->input->post('business_nature'),
				'BIS_YEARS_IN_BIS' => $this->input->post('self_emp_no_years'),
				'BIS_CONSTITUTION' => $this->input->post('business_constitution'),
				'BIS_DESIGNATION' => $this->input->post('business_desi'),
				'BIS_BANK_BAL_JSON' => $this->input->post('bank_balance'),
				
			);
			
			$check_id = $this->Customercrud_model->check_income_profile($id);
			if($check_id > 0)
			{
				$Result_id = $this->Customercrud_model->update_profile_income_details($id, $array_input);
				$array_input_more = array(
											'CUST_ID' => $id,
											'STATUS'=>('Income details complete'),
											'verify_GST_status'=>$this->input->post('verify_GST_status'),
											'verify_Bis_Pan_status'=>$this->input->post('verify_Bis_Pan_status')
											);
							
							$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
							
						
			}
			else {
				$Result_id = $this->Customercrud_model->insert_profile_income_details($id, $array_input);
				$array_input_more = array(
											'CUST_ID' => $id,
											'STATUS'=>('Income details complete'),
											'verify_GST_status'=>$this->input->post('verify_GST_status'),
											'verify_Bis_Pan_status'=>$this->input->post('verify_Bis_Pan_status')
											);
							
							$Result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
			}

			if($Result_id > 0  ){
				
				$response = array('status' => 1, 'message' => 'Profile updated successfully');
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Error in profile update');
				echo json_encode($response);
			}	
			
			
	     
			
			
		}
	}

	public function get_address(){
		$id = $this->session->userdata('ID');
		
		$row = $this->Customercrud_model->get_address($id);
		
		$response = array('status' => 1, 'data' => $row);
		echo json_encode($response);
	}

	public function get_coapp_address(){
		$id = $this->input->get('ID');
		
		$row = $this->Customercrud_model->get_coapp_address($id);
		
		$response = array('status' => 1, 'data' => $row);
		echo json_encode($response);
	}

	public function get_address_by_pincode(){
		$data = file_get_contents("php://input");
		$data_obj = json_decode($data);
		
		$row = $this->Customercrud_model->get_address_by_pincode($data_obj->pincode);
		
		$response = array('status' => 1, 'data' => $row);
		echo json_encode($response);
	}


	//new flow update

	public function coapplicant_new_screen_one_action(){
		//$this->showErrorMessage("hi mahi");
		$id = $this->session->userdata('ID');
		if($id == ''){
			$response = array('status' => 3, 'message' => 'Email id already in use');
			echo json_encode($response);
			exit();
		}
		$dob = $this->input->post('dob');		
		$diff = abs(strtotime(date("Y-m-d")) - strtotime($dob));
		$years = floor($diff / (365*60*60*24));
		$unique_code = $this->generateRandomString();
		
		$array_input_more = array(
			'CUST_ID' => $id,
			'AGE' => $years,
			'EDUCATION_BACKGROUND' => $this->input->post('education_type'),
			'FN' => $this->input->post('f_name'),
			'MN' => $this->input->post('m_name'),
			'LN' => $this->input->post('l_name'),
			'EMAIL' => $this->input->post('email'),
			'MOBILE' => $this->input->post('mobile'),
			'GENDER' => $this->input->post('gender'),			
			'DOB' => $dob,			
			'PAN_NUMBER' => $this->input->post('pan'),
			'AADHAR_NUMBER' => $this->input->post('aadhar'),
			'MARTIAL_STATUS' => $this->input->post('marital'),
			'MOTHER_F_NAME' => $this->input->post('m_f_name'),
			'MOTHER_M_NAME' => $this->input->post('m_m_name'),
			'MOTHER_L_NAME' => $this->input->post('m_l_name'),
			'IS_SPOUSE_FATHER' => $this->input->post('spouse'),
			'SPOUSE_F_NAME' => $this->input->post('s_f_name'),
			'SPOUSE_M_NAME' => $this->input->post('s_m_name'),
			'SPOUSE_L_NAME' => $this->input->post('s_l_name'),			
			'RES_ADDRS_LINE_1' => $this->input->post('resi_add_1'),			
			'RES_ADDRS_LINE_2' => $this->input->post('resi_add_2'),
			'RES_ADDRS_LINE_3' => $this->input->post('resi_add_3'),
			'RES_ADDRS_LANDMARK' => $this->input->post('resi_landmark'),
			'RES_ADDRS_PINCODE' => $this->input->post('resi_pincode'),
			'RES_ADDRS_CITY' => $this->input->post('resi_city'),
			'NATIVE_PLACE' => $this->input->post('NATIVE_PLACE'),
			'RES_ADDRS_STATE' => $this->input->post('resi_state'),
			'RES_ADDRS_DISTRICT' => $this->input->post('resi_district'),
			'RES_ADDRS_PROPERTY_TYPE' => $this->input->post('resi_sel_property_type'),
			'RES_ADDRS_NO_YEARS_LIVING' => $this->input->post('resi_no_of_years'),
			'PER_ADDRS_LINE_1' => $this->input->post('per_add_1'),
			'PER_ADDRS_LINE_2' => $this->input->post('per_add_2'),
			'PER_ADDRS_LINE_3' => $this->input->post('per_add_3'),
			'PER_ADDRS_LANDMARK' => $this->input->post('per_landmark'),
			'PER_ADDRS_PINCODE' => $this->input->post('per_pincode'),
			'PER_ADDRS_PROPERTY_TYPE' => $this->input->post('per_sel_property_type'),
			'PER_ADDRS_STATE' => $this->input->post('per_state'),
			'PER_ADDRS_DISTRICT' => $this->input->post('per_district'),
			'PER_ADDRS_CITY' => $this->input->post('per_city'),
			'PER_ADDRS_NO_YEARS_LIVING' => $this->input->post('per_no_of_years'),
			'TOTAL_BRO_SIS' => $this->input->post('no_of_bro_sis'),
			'NO_OF_DEPENDANTS' => $this->input->post('NO_OF_DEPENDANTS'),
			'VERIFY_PAN'=>$this->input->post('verify_pan_status'),
			
			);

		$u_unique_code = $this->input->post('COAPPID');
		$id_mobile_exist = $this->Customercrud_model->check_mobile_coapplicant($u_unique_code, $array_input_more['MOBILE']);
		if($id_mobile_exist > 0){
			$response = array('status' => 0, 'message' => 'Mobile number already in use');
			echo json_encode($response);
			exit();
		}

		$id_email_exist = $this->Customercrud_model->check_email_coapplicant($u_unique_code, $array_input_more['EMAIL']);
		if($id_email_exist > 0){
			$response = array('status' => 0, 'message' => 'Email id already in use');
			echo json_encode($response);
			exit();
		}

				
		if($u_unique_code!='')$cust_row = $this->Customercrud_model->getCoapplicantById($u_unique_code);
		$message = "Profile details updated";
		if(!empty($cust_row)){
			if($cust_row->PROFILE_PERCENTAGE == 0){
				$array_input_more['PROFILE_PERCENTAGE'] = 30;
			}

			$id = $this->Customercrud_model->update_coapplicant($cust_row->UNIQUE_CODE, $array_input_more);
		}else {
			$array_input_more['PROFILE_PERCENTAGE'] = 30;
			$array_input_more['UNIQUE_CODE'] = $unique_code;
			$id = $this->Customercrud_model->insert_coapplicant($array_input_more);
			$message = "Profile details saved";
		}
		
		if($id > 0){
			if($u_unique_code!='')$response = array('status' => 1, 'message' => $message, 'UNIQUE_CODE' => $u_unique_code);
			else $response = array('status' => 1, 'message' => $message, 'UNIQUE_CODE' => $unique_code);
			echo json_encode($response);
		}else {
			$response = array('status' => 0, 'message' => 'Error in profile update');
			echo json_encode($response);
		}
	}


	public function coapplicant_new_screen_two_action(){
		//$this->showErrorMessage("hi mahi");
		$id_login = $this->session->userdata('ID');
		$id = $this->input->post('coappid');

		if ($id_login == '') {
			$response = array('status' => 301);
			echo json_encode($response);
		}else {
				$array_input_more = array(
				'COAPP_ID' => $id,
				'COAPP_TYPE'=>('salaried'),
				'ORG_NAME' => $this->input->post('org_name'),
				'ORG_INDUSTRY_OPERATING' => $this->input->post('org_operating'),
				'ORG_TYPE' => $this->input->post('salaried_org_type'),
				'ORG_YEARS_WORKING' => $this->input->post('salaried_org_no_of_years_working'),
				'ORG_ADRS_LINE_1' => $this->input->post('salaried_org_add_line_1'),
				'ORG_ADRS_LINE_2' => $this->input->post('salaried_org_add_line_2'),
				'ORG_ADRS_LINE_3' => $this->input->post('salaried_org_add_line_3'),
				'ORG_LANDMARK' => $this->input->post('salaried_org_landmark'),
				'ORG_PINCODE' => $this->input->post('salaried_org_pin'),
				'ORG_STATE' => $this->input->post('resi_state'),
				'ORG_DISTRICT' => $this->input->post('resi_district'),
				'ORG_CITY' => $this->input->post('resi_city'),
				'ORG_DESIGNATION' => $this->input->post('org_designation'),
				'ORG_WORK_EMAIL' => $this->input->post('org_work_email'),
				'ORG_WORKED_FROM' => $this->input->post('org_working_from'),
				'ORG_SALARY_1' => $this->input->post('salary_1'),
				'ORG_SALARY_2' => $this->input->post('salary_2'),
				'ORG_SALARY_3' => $this->input->post('salary_3'),
				'ORG_EXP_YEAR' => $this->input->post('work_experience_year'),
				'ORG_EXP_MONTH' => $this->input->post('work_experience_month'),
				'ORG_ANNUAL_SALARY' => $this->input->post('org_gross_salary'),
				'ORG_OTHER_INCOME' => $this->input->post('other_income'),
				'ORG_DESIGNATION_PAST' => $this->input->post('org_past_designation'),
				'ORG_WORK_EMAIL_PAST' => $this->input->post('org_past_work_email'),
				'ORG_WORKED_FROM_PAST' => $this->input->post('org_past_working_from'),
				'ORG_SALARY_PAST_1' => $this->input->post('org_past_salary_1'),
				'ORG_SALARY_PAST_2' => $this->input->post('org_past_salary_2'),
				'ORG_SALARY_PAST_3' => $this->input->post('org_past_salary_3'),
				'ORG_ANNUAL_SALARY_PAST' => $this->input->post('org_past_gross_salary'),
				'EMIS' => $this->input->post('emis'),
				'REF_1_F_NAME' => $this->input->post('org_ref_f_name'),
				'REF_1_M_NAME' => $this->input->post('org_ref_m_name'),
				'REF_1_L_NAME' => $this->input->post('org_ref_l_name'),			
				'REF_1_MOBILE' => $this->input->post('org_ref_mobile'),			
				'REF_1_RELATION' => $this->input->post('org_ref_relation'),			
				'REF_2_F_NAME' => $this->input->post('org_ref_2_f_name'),			
				'REF_2_M_NAME' => $this->input->post('org_ref_2_m_name'),			
				'REF_2_L_NAME' => $this->input->post('org_ref_2_l_name'),			
				'REF_2_MOBILE' => $this->input->post('org_ref_2_mobile'),			
				'REF_2_RELATION' => $this->input->post('org_ref_2_relation'),						
			);

			$id_mobile_exist = $this->Customercrud_model->check_mobile($id, $array_input_more['REF_1_MOBILE']);
			if($id_mobile_exist > 0){
				$response = array('status' => 0, 'message' => 'Reference number one mobile number already in use');
				echo json_encode($response);
				exit();
			}

			$id_mobile_exist = $this->Customercrud_model->check_mobile($id, $array_input_more['REF_2_MOBILE']);
			if($id_mobile_exist > 0){
				$response = array('status' => 0, 'message' => 'Reference number two mobile number already in use');
				echo json_encode($response);
				exit();
			}

			$id_mobile_exist = $this->Customercrud_model->check_mobile_coapplicant_ref1($id, $array_input_more['REF_1_MOBILE']);
			if($id_mobile_exist > 0){
				$response = array('status' => 0, 'message' => 'Reference number one mobile number already in use');
				echo json_encode($response);
				exit();
			}

			$id_mobile_exist = $this->Customercrud_model->check_mobile_coapplicant_ref2($id, $array_input_more['REF_2_MOBILE']);
			if($id_mobile_exist > 0){
				$response = array('status' => 0, 'message' => 'Reference number two mobile number already in use');
				echo json_encode($response);
				exit();
			}

			$id_email_exist = $this->Customercrud_model->check_email($id, $array_input_more['ORG_WORK_EMAIL']);
			if($id_email_exist > 0){
				$response = array('status' => 0, 'message' => 'Email id already in use');
				echo json_encode($response);
				exit();
			}

			$cust_details_row = $this->Customercrud_model->getCoapplicantById($id);
			$cust_row = $this->Customercrud_model->getCoapplicantIncome($id);
			if(!empty($cust_details_row)){
				$array_input_per = [];
				if($cust_details_row->PROFILE_PERCENTAGE == 30){
					$array_input_per['PROFILE_PERCENTAGE'] = 65;
					$id = $this->Customercrud_model->update_coapplicant($cust_details_row->UNIQUE_CODE, $array_input_per);
				}				
			}

			$message = "Profile details updated";
			if(!empty($cust_row)){				
				$id = $this->Customercrud_model->update_coapplicant_income($id, $array_input_more);
			}else {		
			//print_r($array_input_more);		
				$id = $this->Customercrud_model->insert_coapplicant_income($array_input_more);
				$message = "Profile details saved";
			}
			
			if($id > 0){
				$response = array('status' => 1, 'message' => $message);
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Error in profile update');
				echo json_encode($response);
			}
		}	
	}


	public function coapplicant_new_screen_two_action_business(){
		$id_login = $this->session->userdata('ID');
		$id = $this->input->post('coappid');

		if ($id_login == '') {
			$response = array('status' => 301);
			echo json_encode($response);
		}else {
			$array_input_more = array(
				'COAPP_ID' => $id,
				'COAPP_TYPE'=>('self employeed'),
				'ORG_ADRS_LINE_1' => $this->input->post('resi_add_1'),
				'ORG_ADRS_LINE_2' => $this->input->post('resi_add_2'),
				'ORG_ADRS_LINE_3' => $this->input->post('resi_add_3'),
				'ORG_LANDMARK' => $this->input->post('business_landmark'),
				'ORG_PINCODE' => $this->input->post('resi_pincode'),
				'ORG_STATE' => $this->input->post('resi_state'),
				'ORG_DISTRICT' => $this->input->post('resi_district'),
				'ORG_CITY' => $this->input->post('resi_city'),
				'BIS_YEARS_CURRERENT_ADDRS' => $this->input->post('resi_no_of_years'),
				'BIS_PROPERTY_TYPE' => $this->input->post('sel_property_type'),
				'BIS_PROFESSION' => $this->input->post('user_profession'),
				'BIS_PAN' => $this->input->post('business_pan'),
				'REGI_NO' => $this->input->post('regi_no'),
				'BIS_GST' => $this->input->post('business_gst_no'),
				'BIS_NAME'=> $this->input->post('org_name_buisness'),
				'BIS_ANNUAL_INCOME' => $this->input->post('business_annual_income'),
				'BIS_INDUS_OPERATING' => $this->input->post('self_emp_operating'),
				'BIS_PREMISES_TYPE' => $this->input->post('self_emp_property_type'),
				'BIS_NATURE_OF_BIS' => $this->input->post('business_nature'),
				'BIS_YEARS_IN_BIS' => $this->input->post('self_emp_no_years'),
				'BIS_CONSTITUTION' => $this->input->post('business_constitution'),
				'BIS_DESIGNATION' => $this->input->post('business_desi'),
				'BIS_BANK_BAL_JSON' => $this->input->post('bank_balance'),
				'verify_GST_status'=>$this->input->post('verify_GST_status'),
				'verify_Bis_Pan_status'=>$this->input->post('verify_Bis_Pan_status'),
			);

			$cust_details_row = $this->Customercrud_model->getCoapplicantById($id);
			$cust_row = $this->Customercrud_model->getCoapplicantIncome($id);
			if(!empty($cust_details_row)){
				$array_input_per = [];
				if($cust_details_row->PROFILE_PERCENTAGE == 30){
					$array_input_per['PROFILE_PERCENTAGE'] = 65;
					$id = $this->Customercrud_model->update_coapplicant($cust_details_row->UNIQUE_CODE, $array_input_per);
				}				
			}

			$message = "Profile details updated";
			if(!empty($cust_row)){				
				$id = $this->Customercrud_model->update_coapplicant_income($id, $array_input_more);
			}else {		
			//print_r($array_input_more);		
				$id = $this->Customercrud_model->insert_coapplicant_income($array_input_more);
				$message = "Profile details saved";
			}
			
			if($id > 0){
				$response = array('status' => 1, 'message' => $message);
				echo json_encode($response);
			}else {
				$response = array('status' => 0, 'message' => 'Error in profile update');
				echo json_encode($response);
			}		
		}
	}

	public function apply_loan_screen_home_loan_action(){
		$id = $this->session->userdata('ID');
		
		if ($id == '') {
			$response = array('status' => 301);
			echo json_encode($response);
		}else {
			$array_input_more = array(
				'CUST_ID' => $id,
				'LOAN_TYPE' => $this->input->post('actual_loan_type'),
				'IS_TRANSFER_OUTSTANDING' => $this->input->post('prop_outstand'),
				'IS_PROP_SHORTLISTED' => $this->input->post('prop_short_radio'),
				'PROP_ADD_LINE_1' => $this->input->post('resi_add_1'),
				'PROP_ADD_LINE_2' => $this->input->post('resi_add_2'),
				'PROP_ADD_LINE_3' => $this->input->post('resi_add_3'),
				'PROP_ADD_LANDMARK' => $this->input->post('resi_landmark'),
				'PROP_ADD_PINCODE' => $this->input->post('resi_pincode'),
				'PROP_ADD_STATE' => $this->input->post('resi_state'),
				'PROP_ADD_DISTRICT' => $this->input->post('resi_district'),
				'PROP_ADD_CITY' => $this->input->post('resi_city'),
				'PROP_ADD_PROP_TYPE' => $this->input->post('resi_sel_property_type'),
				'PROP_ADD_NO_YEARS' => $this->input->post('resi_no_of_years'),
				'SAVING_IN_BANK' => $this->input->post('savings_in_bank'),
				'OTHER_INVESTMENTS' => $this->input->post('other_invest'),
				'IMMOVABLE_PROP' => $this->input->post('immovable_prop'),
				'INSURANCE_POLICY' => $this->input->post('insurance_poli'),
				'RATE_OPTION' => $this->input->post('select_rate_option'),
				'TENURE' => $this->input->post('tenure_year'),
				'HOME_LOAN_TYPE' => $this->input->post('select_loan_type'),
				'DESIRED_LOAN_AMOUNT' => $this->input->post('desired_loan_amount'),
				'LOAN_AVAILED_FOR' => $this->input->post('loan_availed_for'),
				'AREA_OF_LAND' => $this->input->post('area_land'),
				'CARPET_AREA' => $this->input->post('carpet_area'),
				'BUILD_UP_AREA' => $this->input->post('buildup_area'),
				'STAGE_OF_CONSTRUCTION' => $this->input->post('stage_of_const'),
				'BANK_DETAILS_JSON' => $this->input->post('banks'),
				'FINAL_ESTIMATED_COST' => $this->input->post('estimate_req_fund'),
				'FINAL_LOAN_REQUESTED' => $this->input->post('requested_fund'),
				'FINAL_SAVING_FROM_BANK' => $this->input->post('bank_saving'),
				'FINAL_DISPOSAL_INVESTMENT' => $this->input->post('disposal_invest'),
				'FINAL_SALE_PROPERTY' => $this->input->post('sale_of_property'),
				'FINAL_FAMILY' => $this->input->post('family_amount'),
				'FINAL_PROVIDENT_FUND' => $this->input->post('provident_fund'),
				'FINAL_OTHERS' => $this->input->post('others')
			);

			
			$result_id = $this->Customercrud_model->insert_apply_for_loan($array_input_more);
			
			if($result_id > 0){
				$response = array('status' => 1, 'message' => 'You have successfully applied for loan, Our loan consultant will contact you very soon.');
				echo json_encode($response);
				 $array_input_more = array(
											'CUST_ID' => $id,
											'STATUS'=>('Loan application complete')
											);
							
							$result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
			}else {
				$response = array('status' => 0, 'message' => 'Error in loan apply');
				echo json_encode($response);
			}		
		}
	}

	public function apply_loan_screen_lap_loan_action(){
		$id = $this->session->userdata('ID');
		
		if ($id == '') {
			$response = array('status' => 301);
			echo json_encode($response);
		}else {
			$array_input_more = array(
				'CUST_ID' => $id,
				'LOAN_TYPE' => $this->input->post('actual_loan_type'),				
				'PROP_ADD_LINE_1' => $this->input->post('resi_add_1'),
				'PROP_ADD_LINE_2' => $this->input->post('resi_add_2'),
				'PROP_ADD_LINE_3' => $this->input->post('resi_add_3'),
				'PROP_ADD_LANDMARK' => $this->input->post('resi_landmark'),
				'PROP_ADD_PINCODE' => $this->input->post('resi_pincode'),
				'PROP_ADD_STATE' => $this->input->post('resi_state'),
				'PROP_ADD_DISTRICT' => $this->input->post('resi_district'),
				'PROP_ADD_CITY' => $this->input->post('resi_city'),
				'PROP_ADD_PROP_TYPE' => $this->input->post('resi_sel_property_type'),
				'PROP_ADD_NO_YEARS' => $this->input->post('resi_no_of_years'),				
				'RATE_OPTION' => $this->input->post('select_rate_option'),
				'TENURE' => $this->input->post('tenure_year'),
				'HOME_LOAN_TYPE' => $this->input->post('select_loan_type'),
				'DESIRED_LOAN_AMOUNT' => $this->input->post('desired_loan_amount'),
				'LOAN_AVAILED_FOR' => $this->input->post('loan_availed_for'),
				'AREA_OF_LAND' => $this->input->post('area_land'),
				'CARPET_AREA' => $this->input->post('carpet_area'),
				'BUILD_UP_AREA' => $this->input->post('buildup_area'),				
				'BANK_DETAILS_JSON' => $this->input->post('banks'),
				
				'REASON_FOR_VISIT' => $this->input->post('visit_reason'),
				'IS_SOLE_OWNER' => $this->input->post('sole_owner'),
				'SHARE_IN_PROP' => $this->input->post('share_prop'),
				'IS_BANK_OBTAIN_SOLE' => $this->input->post('sole_owner_able'),
				'IS_LEGAL_TITLE_CLEAR' => $this->input->post('legal_title'),
				'IS_LOAN_ON_PROP' => $this->input->post('loan_on_property'),
				'HOW_MANY_PROP_OWN' => $this->input->post('no_of_property'),
				
			);

			
			$result_id = $this->Customercrud_model->insert_apply_for_loan($array_input_more);
			
			if($result_id > 0){
				$response = array('status' => 1, 'message' => 'You have successfully applied for loan, Our loan consultant will contact you very soon.');
				echo json_encode($response);
				
				  $array_input_more = array(
											'CUST_ID' => $id,
											'STATUS'=>('Loan application complete')
											);
							
							$result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
			}else {
				$response = array('status' => 0, 'message' => 'Error in loan apply');
				echo json_encode($response);
			}		
		}
	}

	public function apply_loan_screen_busi_per_cc_loan_action(){
		$id = $this->session->userdata('ID');
		
		if ($id == '') {
			$response = array('status' => 301);
			echo json_encode($response);
		}else {
			$type = $this->input->post('actual_loan_type');
			if($type == 'personal' || $type == 'business'){
				$array_input_more = array(
					'CUST_ID' => $id,
					'LOAN_TYPE' => $type,				
					'TENURE' => $this->input->post('tenure_year'),
					'DESIRED_LOAN_AMOUNT' => $this->input->post('desired_loan_amount'),				
					'REASON_FOR_VISIT' => $this->input->post('visit_reason')				
					
				);
			}else if($type == 'credit'){
				$array_input_more = array(
					'CUST_ID' => $id,
					'LOAN_TYPE' => $type,				
					'CC_BANK' => $this->input->post('bank_name')				
					
				);
			}
			$result_id = $this->Customercrud_model->insert_apply_for_loan($array_input_more);
			
			if($result_id > 0){
				$response = array('status' => 1, 'message' => 'You have successfully applied for loan, Our loan consultant will contact you very soon.');
				echo json_encode($response);
				      $array_input_more = array(
											'CUST_ID' => $id,
											'STATUS'=>('Loan application complete')
											);
							
							$result_id1 = $this->Customercrud_model->update_profile_more($id, $array_input_more);
			}else {
				$response = array('status' => 0, 'message' => 'Error in loan apply');
				echo json_encode($response);
			}		
		}
	}

	public function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	public function view_doc()
	{
		$id = $this->session->userdata('ID');
		$array_input_more = array(
			'Aadhar_Esign_Consent'=>'true'
			);
		$this->Customercrud_model->update_profile_more($id, $array_input_more);
		$data_cust_info=$this->Customercrud_model->getProfileData($id);
		
		$id = $this->session->userdata("ID");
		$dir='./images/all_document_pdf/';    
		$filename= "$id.pdf";                                      
		if(file_exists($dir.$filename))
		{
			$data['link']=$dir.$filename;
		}
		else 
		{
			   
		         $this->session->set_flashdata('warning', 'You Are Not Uploaded Your Document Please Upload Documents');
		}
		$age = $this->session->userdata("AGE");
		
		$data_row = $this->Customercrud_model->getAppliedLoans($id);
		$this->load->helper('url');
		$data['id']=$id ;
		$data['showNav'] = 1;
		$data['age'] = $age;
		$data['error'] = '';
		$data['loans'] = $data_row;
		$data['cust_info'] = $data_cust_info;
		$data['userType'] = $this->session->userdata("USER_TYPE");
		$this->load->view('header', $data);
		$this->load->view('customer/view_doc');
	}
	public function Store_consent()
	{
		
		$data['link']=$this->input->post('link');
		$data['name']=$this->input->post('name');
		$data['Userid']=$this->session->userdata('ID');
		$this->session->set_flashdata('data', $data);
		redirect('Api_Functions/customer_login/'.$data);
	}
	public function view_esign_doc()
	{
		    $id = $this->session->userdata('ID');
			$age = $this->session->userdata("AGE");
	   		$link=$this->session->flashdata('link');
			$data_row = $this->Customercrud_model->getAppliedLoans($id);
			$data['id']=$id ;
			$data['showNav'] = 1;
			$data['age'] = $age;
			$data['error'] = '';
			$data['loans'] = $data_row;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			$data['link']=$link;
			$this->load->view('header', $data);
			$this->load->view('customer/view_esign_doc');
		
	}
	

}
