<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rule_Engine extends CI_Controller 
{

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Admin_model');
		$this->load->model('Dsacrud_model');
		$this->load->model('Customercrud_model');
        $this->load->model('credit_manager_user_model');
		$this->load->model('Rule_Engine_model');
        $this->load->model('common_model','common');
        $this->load->library('email');
        $this->load->model('Operations_user_model');
        $this->load->helper(array('form', 'url'));

    }
	public function index()
	{
		    $id = $this->session->userdata('ID');
			$data['userType'] = $this->session->userdata("USER_TYPE");
		    $data['row']=$this->Customercrud_model->getProfileData($id);
			$dashboard_data = $this->Dsacrud_model->getDashboardData($id);            
			$data['dashboard_data'] = $dashboard_data;
			$this->load->view('Rule_Engine/dashboard', $data);
	}
	public function Risk_Dimension()
	{
		    $id = $this->session->userdata('ID');
			$data['userType'] = $this->session->userdata("USER_TYPE");
		    $data['row']=$this->Customercrud_model->getProfileData($id);
			$dashboard_data = $this->Dsacrud_model->getDashboardData($id);            
			$data['dashboard_data'] = $dashboard_data;
			$Risk_Dimension= $this->Rule_Engine_model->get_Risk_Dimention();
			$parameters=$this->Rule_Engine_model->get_parameters();
			$data['data'] =$Risk_Dimension;

			$data['parameters'] =$parameters;

			//$this->load->view('Rule_Engine/dashboard', $data);
			 $this->load->view('admin/admin_dashbord', $data);   
			$this->load->view('Rule_Engine/Risk_Dimension', $data);
	}
	public function Add_Risk_Dimentions()
	{
		$Risk_Dimention=$this->input->post('Risk_Dimention');
		$data['Risk_Dimention']=$Risk_Dimention;
		$table_name="risk_dimention";
		$save_risk_dimentions=$this->Rule_Engine_model->save_risk_dimentions($data,$table_name);
		echo json_encode ($save_risk_dimentions);
		
	}
	public function Add_Parameters()
	{
		$risk_id=$this->input->post('risk_id');
	
		$Parameter=$this->input->post('Parameter');
		$Weights=$this->input->post('Weights');
		$data['parameters']=$Parameter;
		$data['RD_ID']=$risk_id;
		$data['Weights']=$Weights;
		$table_name="parameters";
		$save_risk_dimentions=$this->Rule_Engine_model->save_risk_dimentions($data,$table_name);
		
		echo json_encode ($save_risk_dimentions);
	}
	public function Criteria()
	{
		    $id = $this->session->userdata('ID');
			$data['userType'] = $this->session->userdata("USER_TYPE");
		    $data['row']=$this->Customercrud_model->getProfileData($id);
			$dashboard_data = $this->Dsacrud_model->getDashboardData($id);            
			$data['dashboard_data'] = $dashboard_data;
			$Risk_Dimension= $this->Rule_Engine_model->get_Risk_Dimention();
			$parameters=$this->Rule_Engine_model->get_parameters();
			
			$data['data'] =$Risk_Dimension;
			$data['parameters'] =$parameters;
			
			//$this->load->view('Rule_Engine/dashboard', $data);
			 $this->load->view('admin/admin_dashbord', $data);   
			$this->load->view('Rule_Engine/Criteria', $data);
	}
	public function get_criteria()
	{
		$P_ID=$this->input->post('P_ID');
	    $criteria=$this->Rule_Engine_model->get_criteria($P_ID);
		echo json_encode ($criteria);
		//echo json_encode ($P_ID);
	}
	public function Add_Criteria()
	{
	
		$criteria_from=$this->input->post('criteria_from');
		$criteria_to=$this->input->post('criteria_to');
		$criteria=$this->input->post('criteria');
		$criteria_type=$this->input->post('criteria_type');
		$Score=$this->input->post('Score');
		$P_ID=$this->input->post('P_ID');
		$data['Criteria_From']=$criteria_from;
		$data['Criteria_To']=$criteria_to;
		$data['Criteria']=$criteria;
		$data['Type']=$criteria_type;
		$data['Score']=$Score;
		$data['P_ID']=$P_ID;
		$table_name='criteria';
		$save_criteria=$this->Rule_Engine_model->save_risk_dimentions($data,$table_name);
		echo json_encode ($save_criteria);
	}
	public function get_criteria_Weights()
	{
		$P_ID=$this->input->post('P_ID');
		$Weights=$this->Rule_Engine_model->get_criteria_Weights($P_ID);
		echo json_encode ($Weights);
	}
	public function Update_Weights()
	{
		$P_ID=$this->input->post('P_ID');
		$Weights_save=$this->input->post('Weights_save');
		$data['Weights']=$Weights_save;
		$update_Weights=$this->Rule_Engine_model->Update_Weights($P_ID,$data);
		echo json_encode ($update_Weights);
	}
	public function Remove_Parameter()
	{
		$P_ID=$this->input->post('P_ID');
		$data['P_ID']=$P_ID;
		$Remove_Criteria=$this->Rule_Engine_model->Remove_Criteria($data);
		$Remove_Parameter=$this->Rule_Engine_model->Remove_Parameter($data);
		echo $Remove_Parameter;
		
	}
	public function Remove_Risk_Dimention()
	{
		$RD_ID=$this->input->post('RD_ID');
		$parameters=$this->Rule_Engine_model->get_parameters_BY_Id($RD_ID);
		 if(!empty($parameters)){foreach($parameters as $parameter)
		 {
			 $data['P_ID']=$parameter->P_ID;
			 $Remove_Criteria=$this->Rule_Engine_model->Remove_Criteria($data);
		 }}
		 $arr['RD_ID']=$RD_ID;
		 $Remove_Parameter=$this->Rule_Engine_model->Remove_Parameter($arr);
		 $Remove_Risk_Dimention=$this->Rule_Engine_model->Remove_Risk_Dimention($arr);
		 echo $Remove_Risk_Dimention;
	}
	public function Remove_criteria()
	{
		$CR_ID=$this->input->post('CR_ID');
		$data['CR_ID']=$CR_ID;
		$Remove_Criteria=$this->Rule_Engine_model->Remove_Criteria($data);
		echo $Remove_Criteria;
	}
	public function Calculate_eligibility()
	{
		
		
		
		
		$ID=$this->input->get('ID');
		//echo $CR_ID;
		$check_credit_score=$this->Rule_Engine_model->check_credit_score($ID);
		$data_row = $this->Customercrud_model->getProfileData($ID);
		$data_more_row=$this->Customercrud_model->getProfileDataMore($ID);
		$data_income_row=$this->Customercrud_model->getProfileDataIncome($ID);
		$data_credit_bureau=$this->Customercrud_model->get_saved_credit_score($ID);
		$getAppliedLoans=$this->Customercrud_model->getAppliedLoans_rule_engine($ID);
		$getCam_credit_anylsis=$this->Customercrud_model->getCam_credit_anylsis($ID);
		$getPD=$this->Customercrud_model->getPD($ID);
		$requested_loan=$this->Customercrud_model->get_requested_loan($ID);
	    //echo '<pre>';
	   //print_r($getPD);
	   //exit;
		if(!empty($data_credit_bureau))
		{
			$credit_bureau=json_decode($data_credit_bureau->response);
		    //echo '<pre>';
			//print_r($credit_bureau);
			//exit;
			if(isset($credit_bureau->CCRResponse))
			{
				if(isset($credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->EnquirySummary->Past30Days))
				{
					$Enquiries_1_months= $credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->EnquirySummary->Past30Days;
				}
				else
				{
					$Enquiries_1_months='';
				}
				if(isset($credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->EnquirySummary->Past12Months))
				{
					$Enquiries_12_months= $credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->EnquirySummary->Past12Months;
				}
				else
				{
					$Enquiries_12_months='';
				}
			}
			if(isset($credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->RetailAccountDetails))
			{
				$Retail_Accounts=$credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->RetailAccountDetails;
				$Retail_Account_count=0;
				foreach($Retail_Accounts as $Retail_Account)
						{
							if(isset($Retail_Account->DateOpened))
							{
								$date1=$Retail_Account->DateOpened;
		                        $date2=date("Y-m-d");
								$ts1 = strtotime($date1);
								$ts2 = strtotime($date2);

								$year1 = date('Y', $ts1);
								$year2 = date('Y', $ts2);

								$month1 = date('m', $ts1);
								$month2 = date('m', $ts2);

								$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
								if($diff<=12)
								{
									if(isset($Retail_Account->AccountType))
									{
										 if($Retail_Account->AccountType!='Consumer Loan' && $Retail_Account->AccountType!='Credit Card' && $Retail_Account->AccountType!='Personal Loan')
										 {
										    $Retail_Account_count=$Retail_Account_count+1; 
										 }
									}
								}									
								
							}
						}
			}
			if(isset($credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->RetailAccountDetails))
			{
				$count=count($credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->RetailAccountDetails);
				if(isset($credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->RetailAccountDetails[$count-1]))
				{
					$first_loan=$credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->RetailAccountDetails[$count-1];
					$date_open=$first_loan->DateOpened;
					$date_close=date("Y-m-d");
					$ts1 = strtotime($date_open);
					$ts2 = strtotime($date_close);

					$year1 = date('Y', $ts1);
					$year2 = date('Y', $ts2);

					$month1 = date('m', $ts1);
					$month2 = date('m', $ts2);

					$Duration = (($year2 - $year1) * 12) + ($month2 - $month1);
					
				}
			}
		}
		if(isset($credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->RetailAccountDetails))
			{
				$Retail_Accounts=$credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->RetailAccountDetails;
				$Due_count=0;
				$Active_Insecured_Loan=0;
				foreach($Retail_Accounts as $Retail_Account)
				{
					if(isset($Retail_Account->Open))
					{
						if($Retail_Account->Open=='Yes')
						{
							if(isset($Retail_Account->AccountType))
							{
								if($Retail_Account->AccountType=='Consumer Loan' || $Retail_Account->AccountType=='Personal Loan' || $Retail_Account->AccountType=='Credit Card')
								{
									$Active_Insecured_Loan=$Active_Insecured_Loan+1;
								}
							}
							if(isset($Retail_Account->History48Months))
							{
								$Retail_Account_summarys=$Retail_Account->History48Months;
								foreach($Retail_Account_summarys as $Retail_Account_summary)
								{
									if($Retail_Account_summary->PaymentStatus=='01+')
									    {
										    $date1 =$Retail_Account_summary->key;
											$array_date=explode("-",$date1);
											$date_1_create=date_create($array_date[1]."-".$array_date[0]."-1");
											$date_2_create=date_create(date('y')."-".date('m')."-1");
											$date_1=date_format($date_1_create,"Y/m/d H:i:s");
											$date_2=date_format($date_2_create,"Y/m/d H:i:s");
											$ts1 = strtotime($date_1);
											$ts2 = strtotime($date_2);
											$year1 = date('y', $ts1);
											$year2 = date('y', $ts2);
											$month1 = date('m', $ts1);
											$month2 = date('m', $ts2);
											$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
											if($diff<=24)
											{
												$Due_count=$Due_count+1;
											}
									    }
								}
							}
						
						}
					}
				}
			}
			if(isset($credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->RetailAccountsSummary))
			{
				if(isset($credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->RetailAccountsSummary->NoOfActiveAccounts))
				{
					  $NoOfActiveAccounts=$credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->RetailAccountsSummary->NoOfActiveAccounts;
				}
			}
		   if(isset($credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->ScoreDetails))
		   {
			 if(isset($credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->ScoreDetails[0]->Value))
			 {
				 $Cibil_score=$credit_bureau->CCRResponse->CIRReportDataLst[0]->CIRReportData->ScoreDetails[0]->Value;
			 }
		   }
		   
		/*-------------------------------------Calculations-----------------------------------*/
		/*----------------------------------------------------age-----------------------------*/
		 if(!empty($data_row->AGE))
		 {
			$parameters="Borrower Age"; 
			
			$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
			if($parameter_id!='NOT AVAILABLE')
			{
				$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
				if($get_parameter_Weights!='NOT AVAILABLE')
			    {
					$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
					
					foreach($get_criteria as $criteria)
					{
						if($criteria->Type=='Numeric')
						{
							if($data_row->AGE>=$criteria->Criteria_From && $data_row->AGE<=$criteria->Criteria_To ) 
							{
								 $criteria_score_age=(float)$criteria->Score;
								 break;
							}
							else
							{
								$criteria_score_age="NOT AVAILABLE";
							}
							
							
						}
						
					}
                    if($criteria_score_age==='NOT AVAILABLE')
					{
						$age= array("parameter"=>$data_row->AGE, "Criteria"=>'Criteria Not Match');
						
					}
					else
					{
						$Weights_age=$get_parameter_Weights*$criteria_score_age/100;
						$Actual_Weights_age=$this->cal_percentage($Weights_age);
						$age = array("parameter"=>$data_row->AGE, "Criteria"=>$criteria_score_age, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_age);
				    }
			    }
				else
				{
					$age= array("parameter"=>'Borrower Age Parameter Not Set By Admin');
				}
			}
			else
			{
				$age= array("parameter"=>'Borrower Age Parameter Not Set By Admin');
			}
		 }
		 else
		 {
			 $age=array();
		 }
		/*--------------------------------------Loan term/ (Max age - Age at time of application) --------------------------------------*/
		 if((!empty($getAppliedLoans)) && (!empty($data_row)))
		 {
			
			 if((!empty($getAppliedLoans->TENURE))&&(!empty($data_row->AGE)))
			    {
				 
					 if(!empty($data_income_row))
						{
							if($data_income_row->CUST_TYPE=='salaried')
							{
							    $loan_value_1=$getAppliedLoans->TENURE/(60-$data_row->AGE);
								
							    //$loan_value_1=13/(60-30);
								$loan_value= number_format($loan_value_1, 2, '.', '');
							
							}
							if($data_income_row->CUST_TYPE=='self employeed')
							{
							   $loan_value_1=$getAppliedLoans->TENURE/(65-$data_row->AGE);
							   $loan_value= number_format($loan_value_1, 2, '.', '');	
							  
							}
						}
						$parameters="Loan term/ (Max age - Age at time of application)"; 
			
						$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
						if($parameter_id!='NOT AVAILABLE')
						{
							$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
							if($get_parameter_Weights!='NOT AVAILABLE')
							{
								$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
								
								foreach($get_criteria as $criteria)
								{
									
									if($criteria->Type=='Numeric')
									{
										
											if($loan_value>=$criteria->Criteria_From && $loan_value<=$criteria->Criteria_To ) 
											{
												 
												 $criteria_loan_value=(float)$criteria->Score;
												 break;
											}	
											else if($criteria->Criteria_To=='')
											{  
										        
												if($loan_value>=$criteria->Criteria_From )
												{
													$criteria_loan_value=(float)$criteria->Score;
													break;
												}
											}
											else
											{
												
												$criteria_loan_value="NOT AVAILABLE";
											}
											
										
										
									}
									
								}
								if($criteria_loan_value==='NOT AVAILABLE')
								{
									$Loan_value_arr= array("parameter"=>$loan_value, "Criteria"=>'Criteria Not Match');
								}
								else
								{
									$Weights_loan_value=$get_parameter_Weights*$criteria_loan_value/100;
									$Actual_Weights_loan_value=$this->cal_percentage($Weights_loan_value);
									$Loan_value_arr = array("parameter"=>$loan_value, "Criteria"=>$criteria_loan_value, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_loan_value);
								
									
								}
							}
							else
							{
								$Loan_value_arr= array("parameter"=>'Loan term/ (Max age - Age at time of application)');
							}
						}
						else
						{
							$Loan_value_arr= array("parameter"=>'Loan term/ (Max age - Age at time of application)');
						}
			   }
			   else
			   {
				   $Loan_value_arr=array();
			   }
	
			
		 }
		 else
		 {
			 $Loan_value_arr=array();
		 }
		/*----------------------------------------------------Vintage in Residence-----------------------------*/
		 if(!empty($data_more_row->RES_ADDRS_NO_YEARS_LIVING))
		 {
			 
			$parameters="Vintage in Residence"; 
			$year=0;
			$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
			if($parameter_id!='NOT AVAILABLE')
			{
				$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
				if($get_parameter_Weights!='NOT AVAILABLE')
			    {
					$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
					
					foreach($get_criteria as $criteria)
								{
									
									
									if($criteria->Type=='Numeric')
									{
										
											if($data_more_row->RES_ADDRS_NO_YEARS_LIVING>=$criteria->Criteria_From && $data_more_row->RES_ADDRS_NO_YEARS_LIVING<=$criteria->Criteria_To ) 
											{
												 
												 $criteria_score_adress_year=(float)$criteria->Score;
												 break;
											}	
											else if($criteria->Criteria_To=='')
											{  
										        
												if($data_more_row->RES_ADDRS_NO_YEARS_LIVING>=$criteria->Criteria_From )
												{
													$criteria_score_adress_year=(float)$criteria->Score;
													break;
												}
											}
											else
											{
												
												$criteria_score_adress_year="NOT AVAILABLE";
											}
											
										
										
									}
								}
							
                    if($criteria_score_adress_year==='NOT AVAILABLE')
					{
						$Vintage_in_Residence= array("parameter"=>$data_more_row->RES_ADDRS_NO_YEARS_LIVING, "Criteria"=>'Criteria Not Match');
					}
					else
					{
						$Weights_address_year=$get_parameter_Weights*$criteria_score_adress_year/100;
						$Actual_address_year=$this->cal_percentage($Weights_address_year);
						$Vintage_in_Residence = array("parameter"=>$data_more_row->RES_ADDRS_NO_YEARS_LIVING, "Criteria"=>$criteria_score_adress_year, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_address_year);
						
				    }
			    }
				else
				{
					$Vintage_in_Residence= array("parameter"=>'Vintage in Residence Parameter Not Set By Admin');
				}
			}
			else
			{
				$Vintage_in_Residence= array("parameter"=>'Vintage in Residence Parameter Not Set By Admin');
			}
		 }
		 else
		 {
			 $Vintage_in_Residence=array();
		 }
	
	/*----------------------------------------------------Vintage in City of Residence-----------------------------*/
		 if((!empty($data_more_row->RES_CITY_NO_YEARS_LIVING))|| $data_more_row->RES_CITY_NO_YEARS_LIVING==0)
		 {
			 
			$parameters="Vintage in City of Residence"; 
			
			$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
			if($parameter_id!='NOT AVAILABLE')
			{
				$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
				if($get_parameter_Weights!='NOT AVAILABLE')
			    {
					$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
					
					foreach($get_criteria as $criteria)
								{
									
									
									if($criteria->Type=='Numeric')
									{
										
											if($data_more_row->RES_CITY_NO_YEARS_LIVING>=$criteria->Criteria_From && $data_more_row->RES_CITY_NO_YEARS_LIVING<=$criteria->Criteria_To ) 
											{
												 
												 $criteria_score_city_year=(float)$criteria->Score;
												 break;
											}	
											else if($criteria->Criteria_To=='')
											{  
										         
												if($data_more_row->RES_CITY_NO_YEARS_LIVING>=$criteria->Criteria_From )
												{
													$criteria_score_city_year=(float)$criteria->Score;
													break;
												}
											}
											else
											{
												 
												$criteria_score_city_year="NOT AVAILABLE";
											}
											
										
										
									}
								}
								
                    if($criteria_score_city_year==='NOT AVAILABLE')
					{
						$Vintage_in_City= array("parameter"=>$data_more_row->RES_CITY_NO_YEARS_LIVING, "Criteria"=>'Criteria Not Match');
					}
					else
					{
						$Weights_city_year=$get_parameter_Weights*$criteria_score_city_year/100;
						$Actual_address_year=$this->cal_percentage($Weights_city_year);
						$Vintage_in_City = array("parameter"=>$data_more_row->RES_CITY_NO_YEARS_LIVING, "Criteria"=>$criteria_score_city_year, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_address_year);
						
				    }
			    }
				else
				{
					$Vintage_in_City= array("parameter"=>'Vintage in City of Residence Parameter Not Set By Admin');
				}
			}
			else
			{
				$Vintage_in_City= array("parameter"=>'Vintage in City of Residence Parameter Not Set By Admin');
			}
		 }
		 else
		 { 
			 $Vintage_in_City=array();
		 }
		/*------------------------------------------------Property type---------------------*/
		  if(!empty($data_more_row->PER_ADDRS_PROPERTY_TYPE))
		  {
			$parameters="Nature of Property Ownership"; 
			$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
			if($parameter_id!='NOT AVAILABLE')
			{
				$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
				if($get_parameter_Weights!='NOT AVAILABLE')
				{
					$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
				
					foreach($get_criteria as $criteria)
					{
						
						
						if($criteria->Type=='Text')
						{
							if($data_more_row->PER_ADDRS_PROPERTY_TYPE==$criteria->Criteria) 
							{
								
								 $criteria_score_property=(float)$criteria->Score;
								 break;
							}
							else
							{
								$criteria_score_property="NOT AVAILABLE";
							}
							
							
							
						}
						
					}
					
					if($criteria_score_property==='NOT AVAILABLE')
						    {
								$Property_Type= array("parameter"=>$data_more_row->PER_ADDRS_PROPERTY_TYPE, "Criteria"=>'Criteria Not Match');
							}
							else
							{
								$Weights_property=$get_parameter_Weights*$criteria_score_property/100;
								$Actual_Weights_property=$this->cal_percentage($Weights_property);
								$Property_Type= array("parameter"=>$data_more_row->PER_ADDRS_PROPERTY_TYPE, "Criteria"=>$criteria_score_property, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_property);
								
							}
				}
				else
				{
					$Property_Type= array("parameter"=>'Nature of Property Ownership Parameter Not Set By Admin');
				}
		    }
			else
			{
				$Property_Type= array("parameter"=>'Nature of Property Ownership Parameter Not Set By Admin');
			}
			   
		  }
		else
		{
			$Property_Type=array();
		}
		/*-----------------------------------Qualification-----------------------------------------------*/
		if(!empty($data_row->EDUCATION_BACKGROUND))
		  {
			$parameters="Qualification"; 
			$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
			if($parameter_id!='NOT AVAILABLE')
				{
					$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
					if($get_parameter_Weights!='NOT AVAILABLE')
				    {
						$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
						
						foreach($get_criteria as $criteria)
						{
							
							
							if($criteria->Type=='Text')
							{
								if($data_row->EDUCATION_BACKGROUND==$criteria->Criteria) 
								{
									 $criteria_score_qualification=(float)$criteria->Score;
									 break;
								}
								else
								{
									$criteria_score_qualification="NOT AVAILABLE";
								}
								
							}
						}
						
						if($criteria_score_qualification==='NOT AVAILABLE' )
						    {
							
							    $Qualification= array("parameter"=>$data_row->EDUCATION_BACKGROUND, "Criteria"=>'Criteria Not Match');
								
							}
							else
							{
								$Weights_qualification=$get_parameter_Weights*$criteria_score_qualification/100;
								$Actual_Weights_qualification=$this->cal_percentage($Weights_qualification);
								$Qualification= array("parameter"=>$data_row->EDUCATION_BACKGROUND, "Criteria"=>$criteria_score_qualification, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_qualification);
							}
					}
					else
					{
						$Qualification=array("parameter"=>'Qualification Parameter Is Not Set By Admin');
					}
				}
				else
				{
					$Qualification=array("parameter"=>'Qualification Parameter Is Not Set By Admin');
				}
			   
		  }
		  else
		  {
			  $Qualification=array();
		  }
		/*--------------------------WorkEperience---------------------------------------------------*/
		if(!empty($data_income_row))
		{
			if($data_income_row->CUST_TYPE=='salaried')
			{
				if(!empty($data_income_row->ORG_EXP_YEAR))
				  {
					  
					$parameters="Work Experience of Borrower"; 
					$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
					if($parameter_id!='NOT AVAILABLE')
						{
							$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
							if($get_parameter_Weights!='NOT AVAILABLE')
							{
								$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
								
								foreach($get_criteria as $criteria)
								{
									
									
									if($criteria->Type=='Numeric')
									{
										
											if($data_income_row->ORG_EXP_YEAR>=$criteria->Criteria_From && $data_income_row->ORG_EXP_YEAR<=$criteria->Criteria_To ) 
											{
												 $criteria_score_Exp=(float)$criteria->Score;
												 break;
											}	
											else if(trim($criteria->Criteria_To==''))
											{
												if($data_income_row->ORG_EXP_YEAR>=$criteria->Criteria_From )
												{
													$criteria_score_Exp=(float)$criteria->Score;
													break;
												}
											}
											else
											{
												$criteria_score_Exp="NOT AVAILABLE";
											}
											
										
										
									}
								}
								if($criteria_score_Exp==='NOT AVAILABLE' )
									{
							                  $Experience= array("parameter"=>$data_income_row->ORG_EXP_YEAR, "Criteria"=>'Criteria Not Match');
																			
									}
									else
									{
										$Weights_Exp=$get_parameter_Weights*$criteria_score_Exp/100;
										$Actual_Weights_Exp=$this->cal_percentage($Weights_Exp);
										$Experience= array("parameter"=>$data_income_row->ORG_EXP_YEAR, "Criteria"=>$criteria_score_Exp, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_Exp);

										
									}
							}
							else
							{
								$Experience=array("parameter"=>'Work Experience of Borrower Parameter Is Not Set By Admin');
							}
						}
						else
						{
							$Experience=array("parameter"=>'Work Experience of Borrower Parameter Is Not Set By Admin');
						}
					   
				  }
				  else
				  {
					  $Experience=array();
				  }
			}
		}
		/*------------------------------Enquiries in last 1 months----------------------------------------------*/
		if(isset($Enquiries_1_months))
		  {
			if($Enquiries_1_months=='')
			{
				 $Enquiries_1=array();
			}
		    else
			{
			 
				$parameters="Number of Enquiries for unsecured facilities in last 1 Month"; 
				$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
				if($parameter_id!='NOT AVAILABLE')
				{
					
					$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
					if($get_parameter_Weights!='NOT AVAILABLE')
				    {
							$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
							
							foreach($get_criteria as $criteria)
							{
								
								
								if($criteria->Type=='Numeric')
								{
									
										if($Enquiries_1_months>=$criteria->Criteria_From && $Enquiries_1_months<=$criteria->Criteria_To ) 
										{
											 $criteria_score_Enq_1=(float)$criteria->Score;
											 break;
										}	
										else if(trim($criteria->Criteria_To==''))
										{
											if($Enquiries_1_months>=$criteria->Criteria_From)
											{
												$criteria_score_Enq_1=(float)$criteria->Score;
												break;
											}
										}
										else
										{
											$criteria_score_Enq_1="NOT AVAILABLE";
										}
									    
									
								}
							}
							if($criteria_score_Enq_1==='NOT AVAILABLE')
						    {
							    $Enquiries_12= array("parameter"=>$Enquiries_1_months, "Criteria"=>'Criteria Not Match');
								
							}
							else
							{
								$Weights_Enq=$get_parameter_Weights*$criteria_score_Enq_1/100;
								$Actual_Weights_Enq=$this->cal_percentage($Weights_Enq);
								$Enquiries_1= array("parameter"=>$Enquiries_1_months, "Criteria"=>$criteria_score_Enq_1, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_Enq);
							}
					}
					else
					{
						$Enquiries_1=array("parameter"=>'Number of Enquiries for unsecured facilities in last 1 Month');
					}
				}
				else
				{
					$Enquiries_1=array("parameter"=>'Number of Enquiries for unsecured facilities in last 1 Month');
				}
			}  
		  }
		  else
		  {
			  $Enquiries_1=array();
		  }
		/*-----------------------------------------Enquiries in last 12 months-------------------------------------------------------------*/
		  if(isset($Enquiries_12_months))
		  {
			if($Enquiries_12_months=='')
			{
				 $Enquiries_12=array();
			}
		    else
			{
			 
				$parameters="Number of Enquiries for unsecured facilities in last 12 Months"; 
				$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
				if($parameter_id!='NOT AVAILABLE')
				{
					 
					$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
					if($parameter_id!='NOT AVAILABLE')
				    {
						$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
						
						foreach($get_criteria as $criteria)
						{
							
							
							if($criteria->Type=='Numeric')
							{
								
									if($Enquiries_12_months>=$criteria->Criteria_From && $Enquiries_12_months<=$criteria->Criteria_To ) 
									{
										 $criteria_score_Enq_12=(float)$criteria->Score;
										 break;
									}	
									else if(trim($criteria->Criteria_To==''))
									{
										if($Enquiries_12_months>=$criteria->Criteria_From)
										{
											$criteria_score_Enq_12=(float)$criteria->Score;
											break;
										}
									}
									else
									{
										$criteria_score_Enq_12="NOT AVAILABLE";
									}
									
								
								
							}
						}
						
						
					    if($criteria_score_Enq_12==='NOT AVAILABLE' )
						{
							$Enquiries_12= array("parameter"=>$Enquiries_12_months, "Criteria"=>'Criteria Not Match');
						}
						else
						{
							$Weights_Enq=$get_parameter_Weights*$criteria_score_Enq_12/100;
							$Actual_Weights_Enq_12=$this->cal_percentage($Weights_Enq);
							$Enquiries_12= array("parameter"=>$Enquiries_12_months, "Criteria"=>$criteria_score_Enq_12, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_Enq_12);
							
						}
					}
					else
					{
						$Enquiries_12=array("parameter"=>'Number of Enquiries for unsecured facilities in last 12 Months');
					}
				}
				else
				{
						$Enquiries_12=array("parameter"=>'Number of Enquiries for unsecured facilities in last 12 Months');
				}
			}  
		  }
		  else
		  {
			  $Enquiries_12=array();
		  }
		/*-------------------------------------Number of secure Account in 12 months------------------------------------------------------------------*/
		  if(isset($Retail_Account_count))
		  {
			  $Retail_Account_count=0;
			    $parameters="Number of secured facilities opened in last 12 months"; 
				$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
				if($parameter_id!='NOT AVAILABLE')
				{
					$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
					if($get_parameter_Weights!='NOT AVAILABLE')
				    {
						$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
						foreach($get_criteria as $criteria)
						{
							
							
							if($criteria->Type=='Numeric')
							{
								
									if($Retail_Account_count>=$criteria->Criteria_From && $Retail_Account_count<=$criteria->Criteria_To ) 
									{
										
										 $criteria_score_Rac=(float)$criteria->Score;
										 break;
									}	
									else if(trim($criteria->Criteria_To==''))
									{
										
										if($Retail_Account_count<=$criteria->Criteria_From)
										{
											
											$criteria_score_Rac=(float)$criteria->Score;
											break;
										}
									}
									else
									{
										
										$criteria_score_Rac="NOT AVAILABLE";
									}
									
								
								
							}
						}
						
					   if($criteria_score_Rac==='NOT AVAILABLE')
						{
							$Retail_Account_12= array("parameter"=>$Retail_Account_count, "Criteria"=>'Criteria Not Match');
						}
						else
						{
							$Weights_Rac=$get_parameter_Weights*$criteria_score_Rac/100;
							$Actual_Weights_Rac=$this->cal_percentage($Weights_Rac);
							$Retail_Account_12= array("parameter"=>$Retail_Account_count, "Criteria"=>$criteria_score_Rac, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_Rac);
							
						}
					}
					else
					{
						$Retail_Account_12=array("parameter"=>'Number of secured facilities opened in last 12 months');
					}
				}
				else
				{
					$Retail_Account_12=array("parameter"=>'Number of secured facilities opened in last 12 months');
				}
			}  
		  
		  else
		  {
			  $Retail_Account_12=array();
			  
		  }
		/*--------------------------------------------------Minimum Duration of First loan------------------------------------------------------*/
		if(isset($Duration))
		  {
			    $parameters="CIBIL/Equifax Vintage - Minimum Duration of First loan"; 
				$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
				if($parameter_id!='NOT AVAILABLE')
				{
					
					$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
					if($get_parameter_Weights!='NOT AVAILABLE')
				    {
						$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
						
						foreach($get_criteria as $criteria)
						{
							
							
							if($criteria->Type=='Numeric')
							{
								
									if($Duration>=$criteria->Criteria_From && $Duration<=$criteria->Criteria_To ) 
									{
										
										 $criteria_score_Duration=(float)$criteria->Score;
										 break;
									}	
									else if(trim($criteria->Criteria_To==''))
									{
										
										if($Duration>=$criteria->Criteria_From)
										{
											$criteria_score_Duration=(float)$criteria->Score;
											break;
										}
									}
									else
									{
										
										$criteria_score_Duration="NOT AVAILABLE";
									}
								
								
							}
						}
						
					    if($criteria_score_Duration==='NOT AVAILABLE')
						{
							$Loan_Duration_period= array("parameter"=>$Duration, "Criteria"=>'Criteria Not Match');
						}
						else
						{
							$Weights_Duration=$get_parameter_Weights*$criteria_score_Duration/100;
							$Actual_Weights_Duration=$this->cal_percentage($Weights_Duration);
							$Loan_Duration_period= array("parameter"=>$Duration, "Criteria"=>$criteria_score_Duration, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_Duration);
							
						}
					}
					else
					{
						$Loan_Duration_period=array("parameter"=>'CIBIL/Equifax Vintage - Minimum Duration of First loan');
					}
				}
				else
				{
					$Loan_Duration_period=array("parameter"=>'CIBIL/Equifax Vintage - Minimum Duration of First loan');
				}
			}  
		  
		  else
		  {
			  $Loan_Duration_period=array();
			  
		  }
		/*-------------------------------------------------Due Count-------------------------------------------------------------------------------------*/
		if(isset($Due_count))
		  {
				$count1 = $Due_count / 24;
				$count2 = $count1 * 100;
				$count = number_format($count2, 0);
				
			    
			    $parameters="Percentage of facilities with DPD greater than 30  in last 24 month"; 
				$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
				if($parameter_id!='NOT AVAILABLE')
				{
					$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
					if($get_parameter_Weights!='NOT AVAILABLE')
				    {
					 $get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
					
						foreach($get_criteria as $criteria)
						{
							
							
							if($criteria->Type=='Numeric')
							{
								
									if($count>=$criteria->Criteria_From && $count<=$criteria->Criteria_To ) 
									{
										
										 $criteria_score_Due_count=(float)$criteria->Score;
										 break;
									}	
									else if(trim($criteria->Criteria_To==''))
									{
										
										if($count>=$criteria->Criteria_From)
										{
											$criteria_score_Due_count=(float)$criteria->Score;
											break;
										}
									}
									else
									{
										
										$criteria_score_Due_count="NOT AVAILABLE";
									}
								
								
							}
						}
						
					    if($criteria_score_Due_count==='NOT AVAILABLE')
						{
						    $Due_count_values=array("parameter"=>$count, "Criteria"=>'Criteria Not Match');
						}
						else
						{
							$Weights_Due_count=$get_parameter_Weights*$criteria_score_Due_count/100;
							$Actual_Weights_Due_count=$this->cal_percentage($Weights_Due_count);
							$Due_count_values= array("parameter"=>$count, "Criteria"=>$criteria_score_Due_count, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_Due_count);
							
						}
					}
					else
					{
						$Due_count_values=array("parameter"=>'Percentage of facilities with DPD greater than 30  in last 24 month is Not Set by Admin');
					}
			    }
				else
				{
					$Due_count_values=array("parameter"=>'Percentage of facilities with DPD greater than 30  in last 24 month is Not Set by Admin');
				}
			} 
			else
			{
				  $Due_count_values=array();
				  
			}
		  
		  
		/*----------------------------------------------------Active Loan count-------------------------------------------------------------*/
		if(isset($NoOfActiveAccounts))
		    {
				
				
			
			    $parameters="Active Loans in Bureau"; 
				$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
				if($parameter_id!='NOT AVAILABLE')
				{
					
				    $get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
					if($get_parameter_Weights!='NOT AVAILABLE')
				    {
						$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
						
						foreach($get_criteria as $criteria)
						{
							
							
							if($criteria->Type=='Numeric')
							{
							
									if($NoOfActiveAccounts>=$criteria->Criteria_From && $NoOfActiveAccounts<=$criteria->Criteria_To ) 
									{
										
										 $criteria_score_Active_loan=(float)$criteria->Score;
										 break;
									}	
									else if(trim($criteria->Criteria_To==''))
									{
										
										if($NoOfActiveAccounts>=$criteria->Criteria_From)
										{
											$criteria_score_Active_loan=(float)$criteria->Score;
											break;
										}
									}
									else
									{
										
										$criteria_score_Active_loan="NOT AVAILABLE";
									}
									
								
								
							}
						}
						
					    if($criteria_score_Active_loan==='NOT AVAILABLE')
						{
							$Active_loan_count= array("parameter"=>$NoOfActiveAccounts, "Criteria"=>'Criteria Not Match');
						}
						else
						{
							$Weights_Active_loan=$get_parameter_Weights*$criteria_score_Active_loan/100;
							$Actual_Weights_Active_loan=$this->cal_percentage($Weights_Active_loan);
							$Active_loan_count= array("parameter"=>$NoOfActiveAccounts, "Criteria"=>$criteria_score_Active_loan, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_Active_loan);
								
						}
						
					}
					else
					{
						$Active_loan_count= array("parameter"=>'Active Loans in Bureau Parameter is Not Set by Admin');
					}
				} 
                else
                {
					$Active_loan_count= array("parameter"=>'Active Loans in Bureau Parameter is Not Set by Admin');
                }					
		    }
			else
			{
				  $Active_loan_count=array();
				  
			}
		  
		  
		/*-----------------------------------------------------------Active_Insecured_Loan-------------------------------------------------------*/
		if(isset($Active_Insecured_Loan))
		  {
				
				
			
			    $parameters="Active Unsecured Loans in Bureau"; 
				$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
				if($parameter_id!='NOT AVAILABLE')
				{
					$count=0;
					$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
					if($get_parameter_Weights!='NOT AVAILABLE')
				    {
						$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
						
						foreach($get_criteria as $criteria)
						{
							
							
							if($criteria->Type=='Numeric')
							{
								
									if($Active_Insecured_Loan>=$criteria->Criteria_From && $Active_Insecured_Loan<=$criteria->Criteria_To ) 
									{
										
										 $criteria_Active_Insecured_Loan=(float)$criteria->Score;
										 break;
									}	
									else if(trim($criteria->Criteria_To==''))
									{
										
										if($Active_Insecured_Loan>=$criteria->Criteria_From)
										{
											$criteria_Active_Insecured_Loan=(float)$criteria->Score;
											break;
										}
									}
									else
									{
										
										$criteria_Active_Insecured_Loan="NOT AVAILABLE";
									}
									
								
								
							}
						}
						 
					   if($criteria_Active_Insecured_Loan==='NOT AVAILABLE')
						{
								$Active_loan_count= array("parameter"=>$Active_Insecured_Loan, "Criteria"=>'Criteria Not Match');
						}
						else
						{
							$Weights_Active_Insecured_Loan=$get_parameter_Weights*$criteria_Active_Insecured_Loan/100;
							$Actual_Weights_Active_loan=$this->cal_percentage($Weights_Active_Insecured_Loan);
							$Active_Insecuredloan_count= array("parameter"=>$Active_Insecured_Loan, "Criteria"=>$criteria_Active_Insecured_Loan, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_Active_loan);
						
						}
					}
					else
					{
						$Active_Insecuredloan_count=array("parameter"=>'Active Unsecured Loans in Bureau is Not Set by Admin');
					}
				}
				else
				{
					$Active_Insecuredloan_count=array("parameter"=>'Active Unsecured Loans in Bureau is Not Set by Admin');
				}
			}  
		  
			else
			{
				  $Active_Insecuredloan_count=array();
				  
			}
		/*-------------------------------------------------------Cibil_score--------------------------------------------------------------------------------*/
		    if(isset($Cibil_score))
		    {
				
				
			
			    $parameters="Cibil/Equifax Score"; 
				$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
				if($parameter_id!='NOT AVAILABLE')
				{
					
					$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
					if($get_parameter_Weights!='NOT AVAILABLE')
				    {
						$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
						foreach($get_criteria as $criteria)
						{
							
							
							if($criteria->Type=='Numeric')
							{
								
									if($Cibil_score>=$criteria->Criteria_From && $Cibil_score<=$criteria->Criteria_To ) 
									{
										
										 $criteria_Cibil_Score=(float)$criteria->Score;
										 break;
									}	
									else if(trim($criteria->Criteria_To==''))
									{
										
										if($Cibil_score>=$criteria->Criteria_From)
										{
											$criteria_Cibil_Score=(float)$criteria->Score;
											break;
										}
									}
									else
									{
										
										$criteria_Cibil_Score="NOT AVAILABLE";
									}
									
								
								
							}
						}
						if($criteria_Cibil_Score==='NOT AVAILABLE' )
						{
					   
						$Cibil_Score_values=array("parameter"=>$Cibil_score, "Criteria"=>'Criteria Not Match');
						}
						else
						{
							$Weights_Cibil_Score=$get_parameter_Weights*$criteria_Cibil_Score/100;
						$Actual_Cibil_Score=$this->cal_percentage($Weights_Cibil_Score);
						$Cibil_Score_values= array("parameter"=>$Cibil_score, "Criteria"=>$criteria_Cibil_Score, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Cibil_Score);
							
						}
					}
					else
					{
						$Cibil_Score_values=array("parameter"=>'Cibil/Equifax Score is Not Set by Admin');
					}
				}
				else
				{
					$Cibil_Score_values=array("parameter"=>'Cibil/Equifax Score is Not Set by Admin');
				}
			}  
		  
			else
			{
				  $Cibil_Score_values=array();
				  
			}
		/*-------------------------------------------------------Business Type----------------------------------------------------------------------------------------------*/
		if(!empty($data_income_row))
		{
			if($data_income_row->CUST_TYPE=='self employeed')
			{
				$parameters="Business Type"; 
					$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
					if($parameter_id!='NOT AVAILABLE')
					{
						$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
						if($get_parameter_Weights!='NOT AVAILABLE')
						{
							$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
						
							foreach($get_criteria as $criteria)
							{
								
								
								if($criteria->Type=='Text')
								{
									if($data_income_row->BIS_NATURE_OF_BIS==$criteria->Criteria) 
									{
										 $criteria_score_Bis_Type=(float)$criteria->Score;
										 break;
									}
									else
									{
										$criteria_score_Bis_Type="NOT AVAILABLE";
									}
									
								}
							}
							
							if($criteria_score_Bis_Type==='NOT AVAILABLE')
									{
										$Business_Type= array("parameter"=>$data_income_row->BIS_NATURE_OF_BIS, "Criteria"=>'Criteria Not Match');
									}
									else
									{
										$Weights_Bis_Type=$get_parameter_Weights*$criteria_score_Bis_Type/100;
										$Actual_Weights_property=$this->cal_percentage($Weights_Bis_Type);
										$Property_Bis_Type= array("parameter"=>$data_income_row->BIS_NATURE_OF_BIS, "Criteria"=>$criteria_score_Bis_Type, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Property_Bis_Type);
										
									}
						}
						else
						{
							$Business_Type= array("parameter"=>'Business Type Parameter Not Set By Admin');
						}
					}
					else
					{
						$Business_Type= array("parameter"=>'Business Type Parameter Not Set By Admin');
					}
			   
			}
		}
		/*----------------------------------------------------------------------------------Years in Business-------------------------------------------------------------------*/
		if(!empty($data_income_row))
		{
			if($data_income_row->CUST_TYPE=='self employeed')
			{
				if(isset($data_income_row->BIS_YEARS_IN_BIS))
				{
					
					
				
					$parameters="Years in Business"; 
					$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
					if($parameter_id!='NOT AVAILABLE')
					{
						$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
						if($get_parameter_Weights!='NOT AVAILABLE')
						{
							$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
							foreach($get_criteria as $criteria)
							{
								
								
								if($criteria->Type=='Numeric')
								{
									
										if($data_income_row->BIS_YEARS_IN_BIS>=$criteria->Criteria_From && $data_income_row->BIS_YEARS_IN_BIS<=$criteria->Criteria_To ) 
										{
											
											 $criteria_Bis_year=(float)$criteria->Score;
											 break;
										}	
										else if(trim($criteria->Criteria_To==''))
										{
											
											if($data_income_row->BIS_YEARS_IN_BIS>=$criteria->Criteria_From)
											{
												$criteria_Bis_year=(float)$criteria->Score;
												break;
											}
										}
										else
										{
											
											$criteria_Bis_year="NOT AVAILABLE";
										}
									
									
								}
							}
							if($criteria_Bis_year==='NOT AVAILABLE')
							{
						      $Bis_year=array("parameter"=>$data_income_row->BIS_YEARS_IN_BIS, "Criteria"=>'Criteria Not Match');
							
							}
							else
							{
								$Weights_Bis_year=$get_parameter_Weights*$criteria_Bis_year/100;
								$Actual_Bis_year=$this->cal_percentage($Weights_Bis_year);
								$Bis_year= array("parameter"=>$data_income_row->BIS_YEARS_IN_BIS, "Criteria"=>$criteria_Bis_year, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Bis_year);
								
							}
						}
						else
						{
							$Bis_year=array("parameter"=>'Years in Business');
						}
					}
					else
					{
						$Bis_year=array("parameter"=>'Years in Business');
					}
				}  
			  
				else
				{
					  $Bis_year=array();
					  
				}
			}
		}
		/*-------------------------------------------------------------------------------Paid up capital/ Equity in Business-----------------------------------------------------------------------*/
		if(!empty($data_income_row))
		{
			if($data_income_row->CUST_TYPE=='self employeed')
			{
				
				if(isset($data_income_row->BIS_EQUITY))
				{
					
					
				
					$parameters="Paid up capital/ Equity in Business"; 
					$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
					if($parameter_id!='NOT AVAILABLE')
					{
						$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
						if($get_parameter_Weights!='NOT AVAILABLE')
						{
							$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
							foreach($get_criteria as $criteria)
							{
								
								
								if($criteria->Type=='Numeric')
								{
									
										if($data_income_row->BIS_EQUITY>=$criteria->Criteria_From && $data_income_row->BIS_EQUITY<=$criteria->Criteria_To ) 
										{
											
											 $criteria_Bis_Equity=(float)$criteria->Score;
											 break;
										}	
										else if(trim($criteria->Criteria_To==''))
										{
											
											if($data_income_row->BIS_EQUITY>=$criteria->Criteria_From)
											{
												$criteria_Bis_Equity=(float)$criteria->Score;
												break;
											}
										}
										else
										{
											
											$criteria_Bis_Equity="NOT AVAILABLE";
										}
									
									
								}
							}
							if($criteria_Bis_Equity==='NOT AVAILABLE')
							{
						      $Bis_Equity_value=array("parameter"=>$data_income_row->BIS_EQUITY, "Criteria"=>'Criteria Not Match');
							
							}
							else
							{
								$Weights_Bis_Equity=$get_parameter_Weights*$criteria_Bis_Equity/100;
							$Actual_Bis_Equity=$this->cal_percentage($Weights_Bis_Equity);
							$Bis_Equity_value= array("parameter"=>$data_income_row->BIS_EQUITY, "Criteria"=>$criteria_Bis_Equity, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Bis_Equity);
							}
						}
						else
						{
							$Bis_Equity_value=array("parameter"=>'Paid up capital/ Equity in Business Parameter is Not Set by Admin');
						}
					}
					else
					{
						$Bis_Equity_value=array("parameter"=>'Paid up capital/ Equity in Business is Not Set by Admin');
					}
				}  
			  
				else
				{
					  $Bis_Equity_value=array();
					  
				}
			}
		}
		/*-----------------------------------------------------------------------------------Employment type--------------------------------------------------------------------*/

		if(!empty($data_income_row))
		{
			if($data_income_row->CUST_TYPE=='salaried')
			{
				if(!empty($data_income_row->ORG_TYPE))
				  {
					$parameters="Employment Type"; 
					$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
					if($parameter_id!='NOT AVAILABLE')
						{
							$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
							if($get_parameter_Weights!='NOT AVAILABLE')
							{
								$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
								
								foreach($get_criteria as $criteria)
								{
									
									
									if($criteria->Type=='Text')
								{
									if($data_income_row->BIS_NATURE_OF_BIS==$criteria->Criteria) 
									{
										 $criteria_score_Emp_Type=(float)$criteria->Score;
										 break;
									}
									else
									{
										$criteria_score_Emp_Type="NOT AVAILABLE";
									}
									
								}
								}
								if($criteria_score_Emp_Type==='NOT AVAILABLE')
									{
							          $Emp_Type= array("parameter"=>$data_income_row->ORG_TYPE, "Criteria"=>'Criteria Not Match');
										
									}
									else
									{
										$Weights_Emp_Type=$get_parameter_Weights*$criteria_score_Emp_Type/100;
										$Actual_Weights_Emp_Type=$this->cal_percentage($Weights_Emp_Type);
										$Emp_Type= array("parameter"=>$data_income_row->ORG_TYPE, "Criteria"=>$criteria_score_Emp_Type, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_Emp_Type);
										
									}
							}
							else
							{
								$Emp_Type=array("parameter"=>'Employment Type Parameter Is Not Set By Admin');
							}
						}
						else
						{
							$Emp_Type=array("parameter"=>'Employment Type Parameter Is Not Set By Admin');
						}
					   
				  }
				  else
				  {
					  $Emp_Type=array();
				  }
			}
		}
		/*-------------------------------------------------------------------Vintage of the Employer---------------------------------------------------------------------------------------------------------*/
		if(!empty($data_income_row))
		{
			if($data_income_row->CUST_TYPE=='salaried')
			{
				if(!empty($data_income_row->ORG_WORKED_FROM))
				  {
						
					$date1 =$data_income_row->ORG_WORKED_FROM;
					$date2=date("Y-m-d");
								$ts1 = strtotime($date1);
								$ts2 = strtotime($date2);

								$year1 = date('Y', $ts1);
								$year2 = date('Y', $ts2);

								$month1 = date('m', $ts1);
								$month2 = date('m', $ts2);

								$diff_exp = ($year2 - $year1);
					$parameters="Vintage of the Employer"; 
					$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
					if($parameter_id!='NOT AVAILABLE')
						{
							$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
							if($get_parameter_Weights!='NOT AVAILABLE')
							{
								$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
								
								foreach($get_criteria as $criteria)
								{
									
									
									if($criteria->Type=='Numeric')
									{
										
											if($diff_exp>=$criteria->Criteria_From && $diff_exp<=$criteria->Criteria_To ) 
											{
												 $criteria_score_Current_Exp=(float)$criteria->Score;
												 break;
											}	
											else if(trim($criteria->Criteria_To==''))
											{
												if($diff_exp>=$criteria->Criteria_From )
												{
													$criteria_score_Current_Exp=(float)$criteria->Score;
													break;
												}
											}
											else
											{
												$criteria_score_Current_Exp="NOT AVAILABLE";
											}
										
										
									}
								}
								if($criteria_score_Current_Exp==='NOT AVAILABLE' )
									{
							        $Current_Experience= array("parameter"=>$diff_exp, "Criteria"=>'Criteria Not Match');
										
									}
									else
									{
										$Weights_Current_Exp=$get_parameter_Weights*$criteria_score_Current_Exp/100;
										$Actual_Weights_Current_Exp=$this->cal_percentage($Weights_Current_Exp);
										$Current_Experience= array("parameter"=>$diff_exp, "Criteria"=>$criteria_score_Current_Exp, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_Current_Exp);
										
									}
							}
							else
							{
								$Current_Experience=array("parameter"=>'Vintage of the Employer Parameter Is Not Set By Admin');
							}
						}
						else
						{
							$Current_Experience=array("parameter"=>'Vintage of the Employer Parameter Is Not Set By Admin');
						}
					   
				  }
				  else
				  {
					  
					  $Current_Experience=array();
				  }
			}
		}
		/*-----------------------------------------------------------------------------------Net Worth-----------------------------------------------------------------------------------------------------------------*/
		if(!empty($data_income_row))
		{
			if($data_income_row->CUST_TYPE=='salaried')
			{
				if(!empty($data_income_row->ORG_NET_WORTH))
				  {
					$parameters="Net Worth (Paid Up Capital)"; 
					$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
					if($parameter_id!='NOT AVAILABLE')
						{
							$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
							if($get_parameter_Weights!='NOT AVAILABLE')
							{
								$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
								
								foreach($get_criteria as $criteria)
								{
									
									
									if($criteria->Type=='Numeric')
									{
										
											if($data_income_row->ORG_NET_WORTH>=$criteria->Criteria_From && $data_income_row->ORG_NET_WORTH<=$criteria->Criteria_To ) 
											{
												 $criteria_score_NetWorth=(float)$criteria->Score;
												 break;
											}	
											else if(trim($criteria->Criteria_To==''))
											{
												if($data_income_row->ORG_NET_WORTH>=$criteria->Criteria_From )
												{
													$criteria_score_NetWorth=(float)$criteria->Score;
													break;
												}
											}
											else
											{
												$criteria_score_NetWorth="NOT AVAILABLE";
											}
										
										
									}
								}
								if($criteria_score_NetWorth==='NOT AVAILABLE' )
									{
							$Net_Worth= array("parameter"=>$data_income_row->ORG_NET_WORTH, "Criteria"=>'Criteria Not Match');
										
									}
									else
									{
										$Weights_Net_Worth=$get_parameter_Weights*$criteria_score_NetWorth/100;
										$Actual_Weights_Current_Exp=$this->cal_percentage($Weights_Net_Worth);
										$Net_Worth= array("parameter"=>$data_income_row->ORG_NET_WORTH, "Criteria"=>$criteria_score_NetWorth, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_Current_Exp);
										
									}
							}
							else
							{
								$Net_Worth=array("parameter"=>'Net Worth (Paid Up Capital) Parameter Is Not Set By Admin');
							}
						}
						else
						{
							$Net_Worth=array("parameter"=>'Net Worth (Paid Up Capital) Parameter Is Not Set By Admin');
						}
					   
				  }
				  else
				  {
					  
					  $Net_Worth=array();
				  }
			}
		}
		/*-----------------------------------------------------------------------------------Ratio of (Cheque Bounces/ECS return) to total number of debit transaction in last 12 months-----------------------------------------------------------------------------------------------------------------*/
		if(!empty($getCam_credit_anylsis))
		{
			$parameters="Ratio of (Cheque Bounces/ECS return) to total number of debit transaction in last 12 months"; 
			
			$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
			if($parameter_id!='NOT AVAILABLE')
			{
				$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
				if($get_parameter_Weights!='NOT AVAILABLE')
			    {
					$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
					
					foreach($get_criteria as $criteria)
					{
						if($criteria->Type=='Numeric')
						{
							if($getCam_credit_anylsis->b_s_ratio_cheque_bounce>=$criteria->Criteria_From && $getCam_credit_anylsis->b_s_ratio_cheque_bounce<=$criteria->Criteria_To ) 
							{
								 $criteria_score_cheque=(float)$criteria->Score;
								 break;
							}
							else if(trim($criteria->Criteria_To==''))
							{
												if($getCam_credit_anylsis->b_s_ratio_cheque_bounce>=$criteria->Criteria_From )
												{
													$criteria_score_cheque=(float)$criteria->Score;
													break;
												}
							}
							else
							{
								$criteria_score_cheque="NOT AVAILABLE";
							}
							
							
						}
						
					}
                    if($criteria_score_cheque=='NOT AVAILABLE')
					{
						$ratio_cheque_bounce= array("parameter"=>$getCam_credit_anylsis->b_s_ratio_cheque_bounce, "Criteria"=>'Criteria Not Match');
						
					}
					else
					{
						$Weights_cheque=$get_parameter_Weights*$criteria_score_cheque/100;
						$Actual_Weights_cheque=$this->cal_percentage($Weights_cheque);
						$ratio_cheque_bounce = array("parameter"=>$getCam_credit_anylsis->b_s_ratio_cheque_bounce, "Criteria"=>$criteria_score_cheque, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_Weights_cheque);
				    }
			    }
				else
				{
					$ratio_cheque_bounce= array("parameter"=>'Ratio of (Cheque Bounces/ECS return) to total number of debit transaction in last 12 months Is Not Set By Admin');
				}
			}
			else
			{
				$ratio_cheque_bounce= array("parameter"=>'Ratio of (Cheque Bounces/ECS return) to total number of debit transaction in last 12 months Is Not Set By Admin');
			}
		}
		else
		{
			$ratio_cheque_bounce=array();
		}
		/*-----------------------------------------------------------------------------------Average monthly balance maintained in last 12 months to EMI-----------------------------------------------------------------------------------------------------------------*/
		if(!empty($getCam_credit_anylsis))
		{
			
			$parameters="Average monthly balance maintained in last 12 months to EMI"; 
			
			$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
			if($parameter_id!='NOT AVAILABLE')
			{
				$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
				if($get_parameter_Weights!='NOT AVAILABLE')
			    {
					$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
					
					foreach($get_criteria as $criteria)
					{
						if($criteria->Type=='Numeric')
						{
							if($getCam_credit_anylsis->b_s_monthl_balance_emi>=$criteria->Criteria_From && $getCam_credit_anylsis->b_s_monthl_balance_emi<=$criteria->Criteria_To ) 
							{
								 $criteria_score_avg_emi=(float)$criteria->Score;
								 break;
							}
							else if(trim($criteria->Criteria_To==''))
							{
												if($getCam_credit_anylsis->b_s_monthl_balance_emi>=$criteria->Criteria_From )
												{
													$criteria_score_avg_emi=(float)$criteria->Score;
													break;
												}
							}
							else
							{
								$criteria_score_avg_emi="NOT AVAILABLE";
							}
							
							
						}
						
					}
                    if($criteria_score_avg_emi==='NOT AVAILABLE')
					{
						$ratio_avg_emi= array("parameter"=>$getCam_credit_anylsis->b_s_monthl_balance_emi, "Criteria"=>'Criteria Not Match');
						
					}
					else
					{
						$Weights_avg_emi=$get_parameter_Weights*$criteria_score_avg_emi/100;
						$Actual_avg_emi=$this->cal_percentage($Weights_avg_emi);
						$ratio_avg_emi = array("parameter"=>$getCam_credit_anylsis->b_s_monthl_balance_emi, "Criteria"=>$criteria_score_avg_emi, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_avg_emi);
				    }
			    }
				else
				{
					$ratio_avg_emi= array("parameter"=>'Average monthly balance maintained in last 12 months to EMI Is Not Set By Admin');
				}
			}
			else
			{
				$ratio_avg_emi= array("parameter"=>'Average monthly balance maintained in last 12 months to EMI Is Not Set By Admin');
			}
		}
		else
		{
			$ratio_avg_emi=array();
		}
		/*-----------------------------------------------------------------------------------Debt to  Annual Income-----------------------------------------------------------------------------------------------------------------*/
		if(!empty($getCam_credit_anylsis))
		{
			$parameters="Debt to  Annual Income"; 
			
			$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
			if($parameter_id!='NOT AVAILABLE')
			{
				$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
				if($get_parameter_Weights!='NOT AVAILABLE')
			    {
					$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
					
					foreach($get_criteria as $criteria)
					{
						if($criteria->Type=='Numeric')
						{
							if($getCam_credit_anylsis->b_s_ratio_income_loan>=$criteria->Criteria_From && $getCam_credit_anylsis->b_s_ratio_income_loan<=$criteria->Criteria_To ) 
							{
								 $criteria_debt=(float)$criteria->Score;
								 break;
							}
							else if(trim($criteria->Criteria_To==''))
							{
												if($getCam_credit_anylsis->b_s_ratio_income_loan>=$criteria->Criteria_From )
												{
													$criteria_debt=(float)$criteria->Score;
													break;
												}
							}
							else
							{
								$criteria_debt="NOT AVAILABLE";
							}
							
							
						}
						
					}
                    if($criteria_debt==='NOT AVAILABLE')
					{
						$ratio_debt= array("parameter"=>$getCam_credit_anylsis->b_s_ratio_income_loan, "Criteria"=>'Criteria Not Match');
						
					}
					else
					{
						$Weights_debt=$get_parameter_Weights*$criteria_debt/100;
						$Actual_debt=$this->cal_percentage($Weights_debt);
						$ratio_debt = array("parameter"=>$getCam_credit_anylsis->b_s_ratio_income_loan, "Criteria"=>$criteria_debt, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_debt);
				    }
			    }
				else
				{
					$ratio_debt= array("parameter"=>'Debt to  Annual Income Is Not Set By Admin');
				}
			}
			else
			{
				$ratio_debt= array("parameter"=>'Debt to  Annual Income Is Not Set By Admin');
			}
		}
		else
		{
			$ratio_debt=array();
		}
		/*---------------------------------------------------------Current month Debt Burden Ratio -------------------------------------------------*/
		if(!empty($getCam_credit_anylsis))
		{
			$actual_emi=$getCam_credit_anylsis->Aditional_Emi_Total+$getCam_credit_anylsis->Bureau_Emi_Total;
			if(!empty($data_income_row))
				  {
					if($data_income_row->CUST_TYPE=='salaried')
					{
						if(!empty($getCam_credit_anylsis->avg_salary))
						{
							 $ratio_actual_emi=round($actual_emi/$getCam_credit_anylsis->avg_salary);
						}
					}
					if($data_income_row->CUST_TYPE=='self employeed')
					{
						if(!empty($data_income_row->BIS_ANNUAL_INCOME))
						{
							 $ratio_actual_emi=round($actual_emi/$data_income_row->BIS_ANNUAL_INCOME);
						}
					}
				  }
				 
			$parameters="Current month Debt Burden Ratio"; 
			
			$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
			if($parameter_id!='NOT AVAILABLE')
			{
				$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
				if($get_parameter_Weights!='NOT AVAILABLE')
			    {
					$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
					
					foreach($get_criteria as $criteria)
					{
						if($criteria->Type=='Numeric')
						{
							if($ratio_actual_emi>=$criteria->Criteria_From && $ratio_actual_emi<=$criteria->Criteria_To ) 
							{
								 $criteria_debt_month=(float)$criteria->Score;
								 break;
							}
							else if(trim($criteria->Criteria_To==''))
							{
												if($ratio_actual_emi>=$criteria->Criteria_From )
												{
													$criteria_debt_month=(float)$criteria->Score;
													break;
												}
							}
							else
							{
								$criteria_debt_month="NOT AVAILABLE";
							}
							
							
						}
						
					}
					
                    if($criteria_debt_month==='NOT AVAILABLE')
					{
						$ratio_debt_monthly= array("parameter"=>$ratio_actual_emi, "Criteria"=>'Criteria Not Match');
						
					}
					else
					{
						$Weights_debt_monthly=$get_parameter_Weights*$criteria_debt_month/100;
						$Actual_debt_monthly=$this->cal_percentage($Weights_debt_monthly);
						$ratio_debt_monthly = array("parameter"=>$ratio_actual_emi, "Criteria"=>$criteria_debt_month, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_debt_monthly);
				    }
			    }
				else
				{
					$ratio_debt_monthly= array("parameter"=>'Current month Debt Burden Ratio Is Not Set By Admin');
				}
			}
			else
			{
				$ratio_debt_monthly= array("parameter"=>'Current month Debt Burden Ratio Is Not Set By Admin');
			}
		}
		else
		{
			$ratio_debt_monthly=array();
		}
		/*------------------------------------------------------Assets (Financial assets verifiable) created to Total Loan Amount----------------------------------------------------------*/
		if(!empty($getPD))
		{
			$invesment_details=$getPD->invesment_details_JSON;
			$Investment=json_decode($invesment_details);
			/*print_r($Investment);
			echo '<br>';
			echo $Investment->Insurance;
			exit;*/
			
			$Total_Assets=$Investment->Insurance+$Investment->MutualFunds+$Investment->FD+$Investment->Jewellery+$Investment->Property+$Investment->Property_value+$Investment->ChitFund+$Investment->RD;
			
			
			$final_requested_loan=$requested_loan;
			
			$ratio_assets_loan =round($Total_Assets/$final_requested_loan);
			
			$parameters="Assets (Financial assets verifiable) created to Total Loan Amount"; 
			
			$parameter_id=$this->Rule_Engine_model->get_parameter_id($parameters);
			if($parameter_id!='NOT AVAILABLE')
			{
				$get_parameter_Weights=(int)$this->Rule_Engine_model->get_parameter_Weights($parameter_id);
				if($get_parameter_Weights!='NOT AVAILABLE')
			    {
					$get_criteria=$this->Rule_Engine_model->get_criteria($parameter_id);
					
					foreach($get_criteria as $criteria)
					{
						if($criteria->Type=='Numeric')
						{
							if($ratio_assets_loan>=$criteria->Criteria_From && $ratio_assets_loan<=$criteria->Criteria_To ) 
							{
								 $criteria_total_assests=(float)$criteria->Score;
								 
								 break;
							}
							else if(trim($criteria->Criteria_To==''))
							{
												if($ratio_assets_loan>=$criteria->Criteria_From )
												{
													$criteria_total_assests=(float)$criteria->Score;
													 
													break;
												}
							}
							else
							{
								$criteria_total_assests="NOT AVAILABLE";
								
							}
							
							
						}
						
					}
					//Comparing string and numric value 
                    if($criteria_total_assests==='NOT AVAILABLE')
					{
						$ratio_total_assests= array("parameter"=>$ratio_assets_loan, "Criteria"=>'Criteria Not Match');
						
					}
					else
					{
						
						$Weights_total_assests=$get_parameter_Weights*$criteria_total_assests/100;
						$Actual_total_assests=$this->cal_percentage($Weights_total_assests);
						$ratio_total_assests = array("parameter"=>$ratio_assets_loan, "Criteria"=>$criteria_total_assests, "Weights"=>$get_parameter_Weights, "Actual_Weights"=>$Actual_debt_monthly);
				    }
					
			    }
				else
				{
					$ratio_total_assests= array("parameter"=>'Assets (Financial assets verifiable) created to Total Loan Amount Is Not Set By Admin');
				}
			}
			else
			{
				$ratio_total_assests= array("parameter"=>'Assets (Financial assets verifiable) created to Total Loan Amount Is Not Set By Admin');
			}
		}
		else
		{
			$ratio_total_assests=array();
		}
		/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
		
			$id = $this->session->userdata('ID');
			//$data['Weights_age']=$get_parameter_Weights;
			//$data['criteria_score_age']=$criteria_score_age;
			//$data['Actual_Weights_age']=$Actual_Weights_age;
			/*--------------------calculation data----------------------*/
			$data['Age_data']=$age;
			$data['Property_Type']=$Property_Type;
			$data['Qualification']=$Qualification;
			$data['Vintage_in_Residence']=$Vintage_in_Residence;
			$data['Vintage_in_City']=$Vintage_in_City;
			$data['Enquiries_1']=$Enquiries_1;
			$data['Enquiries_12']=$Enquiries_12;
			$data['Retail_Account_12']=$Retail_Account_12;
			$data['Loan_Duration_period']=$Loan_Duration_period;
			$data['Due_count_values']=$Due_count_values;
			$data['Active_loan_count']=$Active_loan_count;
			$data['Active_Insecuredloan_count']=$Active_Insecuredloan_count;
			$data['Cibil_Score_values']=$Cibil_Score_values;
			$data['data_credit_bureau']=$data_credit_bureau;
			$data['Loan_value_arr']=$Loan_value_arr;
			$data['ratio_cheque_bounce']=$ratio_cheque_bounce;
			$data['ratio_avg_emi']=$ratio_avg_emi;
			$data['ratio_debt']=$ratio_debt;
			$data['ratio_debt_monthly']=$ratio_debt_monthly;
			$data['ratio_total_assests']=$ratio_total_assests;
			if(!empty($data_income_row))
		        {
					if($data_income_row->CUST_TYPE=='self employeed')
					{
						$data['Business_Type']=$Business_Type;
						$data['Bis_year']=$Bis_year;
						$data['Bis_Equity_value']=$Bis_Equity_value;
						
					}
				}
				if(!empty($data_income_row))
				  {
					if($data_income_row->CUST_TYPE=='salaried')
					{
					  $data['Experience']=$Experience;
					  $data['Emp_Type']=$Emp_Type;
					  $data['Current_Experience']=$Current_Experience;
					  $data['Net_Worth']=$Net_Worth;
					 
					}
				  }
			/*-------------------------------------------*/
			$data['data_row']=$data_row;
			$data['check_credit_score']=$check_credit_score;
			$data['userType'] = $this->session->userdata("USER_TYPE");
			//$data['Actual_Weights_age']=$Actual_Weights_age;
		    $data['row']=$this->Customercrud_model->getProfileData($id);
			$dashboard_data = $this->Dsacrud_model->getDashboardData($id);            
			$data['dashboard_data'] = $dashboard_data;
			$this->load->view('dashboard_header', $data);
			$this->load->view('Rule_Engine/Calculate_criteria', $data);
			
		
	}
	function cal_percentage($get_parameter_Weights) {
	  $count1 = $get_parameter_Weights / 10;
	  $count2 = $count1 * 100;
	  $count = number_format($count2, 0);
	  return $count;
	}
	
}
?>