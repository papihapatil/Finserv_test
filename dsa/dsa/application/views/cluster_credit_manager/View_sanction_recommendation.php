<!DOCTYPE html>
<?php 
  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
 	$id = $_GET['ID']; // shows id of customer
 	// $id = $this->session->userdata("id");
  $this->session->set_userdata("id",$id);
  $this->session->set_userdata("id1",$id1);


?>


 <?php
								  if(isset($data_income_details)) 
								  {	
								  	if($data_income_details->CUST_TYPE=='salaried')
										{
										
												$Applicant_total_income_=(($data_credit_analysis->net_salary_3+$data_credit_analysis->net_salary_2+$data_credit_analysis->net_salary_1)/3) ;
												//echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Applicant_total_income_));
										}
									  else if($data_income_details->CUST_TYPE=='self employeed')
										{
												
												
											if($data_income_details->ITR_status=="" || $data_income_details->ITR_status=="yes")
											{
											
												    $count=0;
													if(!empty($data_credit_analysis->PAT_1))
													{
														  $count = $count +1;
													}
													if(!empty($data_credit_analysis->PAT_2))
													{
														 $count=$count+1;
													}
													 if(!empty($data_credit_analysis->PAT_3))
													{
														  $count=$count +1;
													}
											 
   											$Applicant_total_income_ =(($data_credit_analysis->PAT_3)/12+($data_credit_analysis->PAT_2)/12+($data_credit_analysis->PAT_1)/12)/$count;
				                              //  echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Applicant_total_income_));
											}
											else if($data_income_details->ITR_status=="no")
											{
												 $Applicant_total_income_ =(($data_credit_analysis->gross_profit)/12); 
												// echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Applicant_total_income_));

											}
										}
									  else if($data_income_details->CUST_TYPE=='retired')
									  {

										  echo "retired";
									  }
								  }


	?>
	<?php
								$CoApplicant_total_income=0;
								if(!empty($coapplicants))
								{
								$i=1; 
								foreach ($coapplicants as $coapplicant) 
								{   
									if(!empty($coapp_data_credit_analysis_array[$i]))
									{
									if($coapp_data_credit_analysis_array[$i]->coapp_consider_status=='yes')
										{
										?>
										<!--<td style="border: 1px solid ; font-size:10px;text-align: right;">-->
										<?php
											if($coapplicant->COAPP_TYPE == 'salaried')
											{
												//  echo "sal";
												    $CoApplicant_income = ($coapp_data_credit_analysis_array[$i]->net_salary_3+$coapp_data_credit_analysis_array[$i]->net_salary_2+$coapp_data_credit_analysis_array[$i]->net_salary_1)/3;
												   // echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($CoApplicant_income));

											        $CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							

											}
											else if($coapplicant->COAPP_TYPE == 'self employeed')
											{  //echo "seldf";
												 if(isset($coapp_data_credit_analysis_array[$i]->PAT_1))
												   {

												   		$count=0;
														if(!empty($coapp_data_credit_analysis_array[$i]->PAT_1))
														{
															  $count = $count +1;
														}
														if(!empty($coapp_data_credit_analysis_array[$i]->PAT_2))
														{
															 $count=$count+1;
														}
														 if(!empty($coapp_data_credit_analysis_array[$i]->PAT_3))
														{
															  $count=$count +1;
														}
                                                     $CoApplicant_income =(($coapp_data_credit_analysis_array[$i]->PAT_1/12)+($coapp_data_credit_analysis_array[$i]->PAT_2/12)+($coapp_data_credit_analysis_array[$i]->PAT_3/12))/$count;
												   //   echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($CoApplicant_income));
													   $CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							

													}
												   else if(isset($coapp_data_credit_analysis_array[$i]->gross_profit))
												   {
													$CoApplicant_income=$CO_net_gross_profit;
												 //   echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($CoApplicant_income));
													   $CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							

												   }
												   else if($coapplicant->ITR_status=="no")
												   {
													$CoApplicant_income = $CO_net_gross_profit; 
													  //echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($CoApplicant_income));
													    $CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							

												   }
												   
											}
											else if($coapplicant->COAPP_TYPE== 'retired')
											{  //echo "retired";
													   $CoApplicant_income=$coapp_data_credit_analysis_array[$i]->avg_salary;
													   //echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($CoApplicant_income));

													     $CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							

													
											}
											else
											{
											
												$CoApplicant_income=0;
												 $CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							
											}
											?>
											<!--	</td>-->
											<?php
										}


									?>
								<?php  $i++;  } }
								}
								else
								{
									$CoApplicant_income=0;
									$CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							
								}

								?>
								<?php 
													  $additional_income_from_pd=0;
														 if(!empty($data_row_PD_details->additional_income_JSON))
														 {
															$reference_array_2=json_decode($data_row_PD_details->additional_income_JSON,true);
														
																$reference_array_2=json_decode($reference_array_2['AdditionalIncomeType']);
															if(!empty($reference_array_2))
															{
																
															foreach($reference_array_2 as $value) 
															{
																
															 if(!empty($value->Reference_type))
															  {
															  	  if(!empty($value->Contact_No))
															  	  {
 																				$additional_income_from_pd=  $additional_income_from_pd+$value->Contact_No;
															  	  }
															  	  else
															  	  {
															  	  	 $additional_income_from_pd=  $additional_income_from_pd+0;
															  	  }
															     
															  }
															}
														  }
														 }
													//	 echo  $CoApplicant_total_income ;
													//	 exit();
														 $Assessed_Income=$Applicant_total_income_+$CoApplicant_total_income+$additional_income_from_pd;
														// echo "Assessed Income = ".$Assessed_Income;
														 ?>

										<!---------------------------------------------- total EMI --------------------------------------------->

								<?php
								$total_EMI_Applicant=0;
								if(!empty($data_row_PD_details) && isset($data_row_PD_details->Edited_obligation_details_JSON))
				                 {
									 	$reference_array=json_decode($data_row_PD_details->Edited_obligation_details_JSON,true);
										if(!empty($reference_array))
										{ $i=1;
											foreach($reference_array as $value) 
												{
												  if( $value['check_box']==1)
														{
															if(!empty($value['EMI']))
															{
																$total_EMI_Applicant=$total_EMI_Applicant+$value['EMI'];
															}
															else
															{
																$total_EMI_Applicant=$total_EMI_Applicant+0;
															}
													    }
														  $i++;
												}
										}
								 }
								 	else if(!empty($data_obligations))
									{ 

								                

												 $i=1;$total_EMI_Applicant=0;
												 foreach($data_obligations as $data_obligation)
												 {

													 if($data_obligation['Open']=='Yes')
													 {
														if(isset($data_obligation['InstallmentAmount']))
														{
															if ($data_obligation['OwnershipType']!='Guarantor')
															{
                                                             $total_EMI_Applicant=$total_EMI_Applicant+$data_obligation['InstallmentAmount'];
															}
																			 else
															 {

															 }
														}
														else
														{
															if ($data_obligation['OwnershipType']!='Guarantor')
															{
															if(isset($data_obligation['SanctionAmount']))
													         {
																//$total_EMI_Applicant= $total_EMI_Applicant+($data_obligation['SanctionAmount']*0.14);
																$total_EMI_Applicant= $total_EMI_Applicant+0;
															 }
															 elseif(isset($data_obligation['CreditLimit']))
													         {
																//$total_EMI_Applicant= $total_EMI_Applicant+($data_obligation['CreditLimit']*0.14);
																$total_EMI_Applicant= $total_EMI_Applicant+0;
															 }
															 else
															 {

															 }
															}
															else
															 {

															 }
														}


												 	 }
													 $i++;
												  }


									}
												  if(isset($data_credit_analysis->Aditional_Emi_Total))
												  {
													  $additional =$data_credit_analysis->Aditional_Emi_Total;
												  }
												  else
												  {
													  $additional=0;
												  }
												 // echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($total_EMI_Applicant+$additional));
												  ?>
			<?php $i=1; $final_coapp_total_emi=0;
							foreach ($coapplicants as $coapplicant) 
							{
								if(!empty($coapp_data_credit_analysis_array[$i]))
								{ 
									if($coapp_data_credit_analysis_array[$i]->coapp_consider_status=='yes')
										{
											?>
												<!--<td style="border: 1px solid ; font-size:10px;text-align: right;">-->
														  <?php
																		  $Coapp_emi=0;
																		  if(!empty($Co_Applicant_sorted_array[$i]))
																		  {
																		  foreach($Co_Applicant_sorted_array[$i] as $coapp_data_obligations_2)  
																			{
																			   $account = $coapp_data_obligations_2;
																			   $j=1;
																				foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations) 
																					 {
																						if($coapp_data_obligations['AccountNumber']==$account)
							        														{
																									if(isset($coapp_data_obligations['InstallmentAmount']) && ($coapp_data_obligations['OwnershipType'] != 'Guarantor'))
																									{

																											if(!empty($coapp_data_obligations['CollateralType']))
																											{
																												if($coapp_data_obligations['CollateralType']=="Gold")
																												{
																													if(!empty($coapp_data_obligations['Balance']))
																													{
																													 if($coapp_data_obligations['InstallmentAmount'] > $coapp_data_obligations['Balance']*0.7 )
																													 {
																														 
																														 $Coapp_emi=$Coapp_emi+0;
																													 }
																													 else
																													 {
																														
																													    $Coapp_emi= $Coapp_emi +$coapp_data_obligations['InstallmentAmount'];
																													 }
																													}
																													else
																													{
																														 $Coapp_emi= $Coapp_emi +$coapp_data_obligations['InstallmentAmount'];
																													}
																												}
																											}
																											else
																											{
																												
																												 $Coapp_emi= $Coapp_emi +$coapp_data_obligations['InstallmentAmount'];
																											}
																											//echo $coapp_data_obligations['InstallmentAmount'];
																										}
																										else
																										{
																											if(isset($coapp_data_obligations['SanctionAmount']))
																											{
																												// $Coapp_emi= $Coapp_emi +round($coapp_data_obligations['SanctionAmount']*0.14);
																												
																												$Coapp_emi= $Coapp_emi +0;
																											}
																											else if(isset($coapp_data_obligations['CreditLimit']))
																											{
																												// $Coapp_emi= $Coapp_emi +round($coapp_data_obligations['CreditLimit']*0.14);
																												
																												$Coapp_emi= $Coapp_emi +0;
																											}
																											else
																											{
																												
																												$Coapp_emi= $Coapp_emi +0;
																											}
																										}

																							}

																					$j++;
																					}
																				}
																			}
																				else
																				{

																				}
																			
																			//	echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Coapp_emi));
																				$final_coapp_total_emi =$final_coapp_total_emi+$Coapp_emi;
																					?>
												
												<!--</td>-->
							
							<?php        }
							       $i++;
							    } 
							
							} ?>

<div class="c-body">
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
			<?php ini_set('short_open_tag', 'On'); ?>
				<div class="margin-10 padding-5">
			
 
				<?php
					$AMOUNT=100000;
					$Loan_amount= $data_credit_analysis->final_loan_amount;
					$intrest= $data_credit_analysis->final_roi;
					$tunure= $data_credit_analysis->final_tenure;
					$temp= $Loan_amount /$AMOUNT;
   				    $principal = $Loan_amount;
					$calculatedInterest =$intrest/100/12;
					$calculatedPayments =$tunure*12;
					$x=pow(1 + $calculatedInterest,$calculatedPayments);
					$monthly = ($principal*$x*$calculatedInterest)/($x-1);
					$emi_per_lakh=$monthly/$temp;
					?>
			
				

<div class="row" >
	<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
			<div class="row justify-content-center col-6">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Credit Loan Application 					Recommendation</span>
           	</div>
           	<div class="row justify-content-center col-6">
           		<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_Documents?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
           			<button type="button" class="btn btn-success">View Documents </button> 
           		</a>
           	</div>

			<div class="row">
				<div class="col-sm-12" >
					<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Name of the customer</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px; margin-top: 0px;" class="col">
								<input readonly style="margin-top: 8px;" name="customer_name" placeholder="Name of the customer" class="form-control" type="text" value="<?php echo $row->FN." ".$row->MN." ".$row->LN;?>">
									<input  hidden style="margin-top: 8px;" name="customer_ID" id="customer_ID" placeholder="Name of the customer" class="form-control" type="text" value="<?php echo $row_sanction->Customer_id;?>">
									<input  hidden style="margin-top: 8px;" name="CM_ID" id="CM_ID"  class="form-control" type="text" value="<?php echo $row_sanction->credit_manager_id;?>">
		  					</div>
						</div>
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Application ID</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  		<input readonly style="margin-top: 8px;" name="application_number"  class="form-control" type="text" value="<?php echo $data_row_applied_loan->Application_id;?>">
		  					</div>
						</div>
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Type</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" name="loan_type" placeholder="Loan Type" class="form-control" type="text"  value="<?php echo $data_row_applied_loan->LOAN_TYPE;?>">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Amount</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input readonly style="margin-top: 8px;"   class="form-control" type="text" value="<?php if(!empty($credit_analysis_data->final_loan_amount))echo $credit_analysis_data->final_loan_amount;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Tenure</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly  name="tenure" class="form-control" value="<?php if(!empty($credit_analysis_data->final_tenure))echo $credit_analysis_data->final_tenure;?>">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">ROI</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" name="loan_amount"   class="form-control" type="text" value="<?php  if(!empty($credit_analysis_data->final_roi)) echo $credit_analysis_data->final_roi;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Income Assessed</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" name="income_assessed"  class="form-control"  value="<?php if(isset($row_sanction)) echo $row_sanction->income_assessed; else echo round($Assessed_Income);
									?>" type="number" oninput="maxLengthCheck(this)"  onchange="Calculate()" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Total EMI</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;"   class="form-control"  value="<?php if(isset($app_coapp_total_emi)) echo round($app_coapp_total_emi);
									?>" type="number" >
		  				    </div>
		  				</div>
		  		
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final Tenure *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input required style="margin-top: 8px;"  name="final_tenure" id="final_tenure" placeholder="Final Tenure" class="form-control"  value="<?php if(isset($row_sanction)) echo $row_sanction->final_tenure;?>" type="number">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final Loan Amount *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input required placeholder="Final Loan Amount" name="final_loan_amount" id="final_loan_amount" class="form-control" value="<?php if(isset($row_sanction)) echo $row_sanction->final_loan_amount;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final ROI *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  required placeholder="ROI" name="roi" class="form-control"  id="roi" value="<?php if(isset($row_sanction)) echo $row_sanction->roi;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)" onchange="Calculate()">
		  				    </div>
		  				</div>
		  					<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final EMI </span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  name="EMI" class="form-control"  id="EMI"  type="number" value="<?php if(isset($row_sanction)) echo round($row_sanction->EMI);?>" >
		  				    </div>
		  				</div>


		  				<!----------------------------------------------------------------------------------------- -->

		  					<div class="col-sm-12">
		  							<div style=" margin-top: 20px;margin-left:54px; " class="col">
		  								<h4>Collateral Details</h4><hr>
		  						</div>
		  				</div>
		  				
		  		
               <?php 


                 if($data_row_applied_loan->LOAN_TYPE != 'lap')
                 {
                 	?>
                 	<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Agreement/ Land Value </span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  class="form-control" type="number" name="Agreement_value"  value="<?php if(isset($row_sanction->Agreement_value)) echo $row_sanction->Agreement_value; else if(!empty($row_more)){echo $row_more->Agreement_value;}?>">
		  				    </div>
		  				</div>

                 	<?php
                 }


              ?>
		  				
		  	
		  				
		  					  			<div class="col-sm-12"><br></div>
						  <div class="col-sm-12" style="padding:10px;">
						  	  <table class="table table-bordered" id="data_table">
									<tr>
										<th><label class="class_bold">Address Of Property</label></th>
										<th><label class="class_bold">Total Value Of The Property</label></th>
										<th><label class="class_bold">LTV %</label></th>
									</tr>
									<tr>
										<td>
											<label class="class_bold">
												<input style="margin-top: 1px;" placeholder="Address Line 1 *" class="form-control" type="text" name="PROP_ADD_LINE"  id="PROP_ADD_LINE_1" value="<?php if(isset($row_sanction)) echo $row_sanction->PROP_ADD_LINE; else if(!empty($data_row_applied_loan)) {echo $data_row_applied_loan->PROP_ADD_LINE_1;echo $data_row_applied_loan->PROP_ADD_LINE_2; echo $data_row_applied_loan->PROP_ADD_LINE_3;}?>">
											</label>
										</td>
										<td>
											<label class="class_bold">	
												<input  class="form-control" type="number" name="Total_Value_of_property" id="Total_Value_of_property"  value="<?php  if(isset($row_sanction)) echo $row_sanction->Total_Value_of_property; else if(!empty($row_more)){echo $row_more->Total_Value;}?>">
											</label>
										</td>
										<td>
											<label class="class_bold">
													<input   class="form-control" type="number" name="LTV" id="LTV"  step="any" value="<?php if(!empty($row_sanction)){echo $row_sanction->LTV;}?>">
											</label>
										</td>
									</tr>
						  	<?php
						  	if(isset($row_sanction)) 
						  	{
						  		if(!empty($row_sanction->more_property_details))
						  		{
						  			?>
						  					   <?php 
													    $reference_array=json_decode($row_sanction->more_property_details,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['Reference_type']))
															  {
															  ?>
															 
															 <tr>
															    <td><input class = "form-control" type="text" id="Reference_type" name="Reference_type[]" value="<?php echo $value['Reference_type']?>"></td>
																<td><input  class = "form-control"type="text" id="Name" name="Name[]" value="<?php echo $value['Name']?>"></td>
																<td><input   class = "form-control" type="number" id="Contact_No" name="Contact_No[]" value="<?php echo $value['Contact_No']?>"></td>
																
															
															</tr>
															  <?php
															  }
															}
														  }
														
														 ?>
						  			<?php
						  		}
						  	}

						  	?>
							
									<tr>
										<td><input class = "form-control" type="text" id="Reference_type" name="Reference_type[]"></td>
										<td><input class = "form-control" type="number" id="Name" name="Name[]"></td>
										<td><input class = "form-control" type="number" id="Contact_No" step="any" name="Contact_No[]"></td>
										<td><input class = "form-control add" type="button" onclick="add_row();" value="Add Row"></td>
									</tr>
								</table>
							</div>
		  			<!--------------------------------------------------------------------------------- -->
		  			<div class="col-sm-12">
		  							<div style=" margin-top: 18px;margin-left:54px; " class="col">
		  								<h4>Other Details</h4><hr>
		  						</div>
		  				</div>

		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Product *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input required placeholder="Product" class="form-control" type="text" name="product" id="product" value="<?php if(isset($row_sanction)) echo $row_sanction->product;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Program *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input required placeholder="Program" name="program" class="form-control" type="text"  id="program" value="<?php if(isset($row_sanction)) echo $row_sanction->program;?>">
		  				    </div>
		  				</div>
		  			
		  				<div class="col-sm-3">
			  				<div style=" margin-top: 8px;" class="col">
			  					<span class="align-middle dot-light-theme"></span> 
									<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Eligibility *</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input required placeholder="Eligibility" class="form-control"  name="eligibility" id="eligibility" value="<?php if(isset($row_sanction)) echo $row_sanction->eligibility;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)">
			  		    </div>
			  		</div>
			  		<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Recommendation Remark *</span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input readonly type="text" name="approval_remark" id="Approval_Remark" style="font-family:sans-serif;font-size:1.2em;" class="form-control" maxlength = "500" value="<?php if(isset($row_sanction)) echo $row_sanction->approval_remark;?>">
			  		    </div>
			  		</div>
			  				<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Recommendation Status <span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<select class="form-control" name="loan_status" id="loan_status" required style=" margin-top: 9px;" readonly >
							    <option value="">Select</option>
								<option value="Recommended" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'Recommended') echo ' selected="selected"'; ?>>Recommend</option>
								<option value="Rejected" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'Rejected') echo ' selected="selected"'; ?>>Reject</option>
						    </select>
			  		    </div>
			  		</div>
			  			<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Recommended By</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly class="form-control"  value="<?php if(isset($row_2)) echo $row_2->FN." ".$row_2->LN;?>" type="text" >
			  		  </div>
			  		</div>
			  		<div class="col-sm-12">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Add Comments </span>
							</div>
							<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  class="form-control"  name="Cluster_manager_Comments" id="Cluster_manager_Comments"  value="<?php if(isset($row_sanction)) echo $row_sanction->Cluster_manager_Comments;?>" type="text" >
				  		  </div>
			  		</div>
       
<div class="col-sm-12">
		  							<div style=" margin-top: 18px;margin-left:54px; " class="col">
		  								<h4>Case Details</h4><hr>
		  						</div>
		  				</div>

		  				<div class="col-sm-12">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Add Case Details</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<textarea required  row="50" class="form-control"  name="case_details" ><?php if(isset($row_sanction)) echo $row_sanction->case_details;?></textarea>
			  		    </div>
			  		</div>

			  			<div class="col-sm-12">
			  				<div style=" margin-top: 8px;" class="col">
			  					<span class="align-middle dot-light-theme"></span> 
									<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Deviation Details</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<textarea required  row="6" class="form-control"  name="Deviation_details" ><?php if(!empty($row_sanction->Deviation_details)) echo $row_sanction->Deviation_details;?></textarea>
			  		    </div>
			  			</div>

			  			<div class="col-sm-12">
			  				<div style=" margin-top: 8px;" class="col">
			  					<span class="align-middle dot-light-theme"></span> 
									<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">End Use Of Loan</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<textarea required  row="6" class="form-control"  name="End_use_of_loan" ><?php if(!empty($row_sanction->End_use_of_loan)) echo $row_sanction->End_use_of_loan;?></textarea>
			  		    </div>
			  			</div>

			  					<div class="col-sm-12">
			  				<div style=" margin-top: 8px;" class="col">
			  					<span class="align-middle dot-light-theme"></span> 
											<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">Admin Comments</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: -14px;  margin-top: 8px;" class="col">
									<input  class="form-control"  name="admin_comments" id="admin_comments"  value="<?php if(isset($row_sanction)) echo $row_sanction->admin_comments;?>" type="text" >
				  		  </div>
			  			</div>

					
						<div class="col-sm-12">      <br><br></div>
						<?php
							if(!empty($row_sanction))
							{
								if($row_sanction->Recommendation_status == 'Recommended' && $row_sanction->Recommendation_status_added_by == 'Credit Manager')
								{
      			?>
      						<div class="col-sm-4">
      								<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="Recommend" id="Recommend"  onclick="Recommend()">Recommend</button>
									</div>
									<div class="col-sm-4">
											<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="revert" id="revert" onclick="revert()">Revert</button>
									</div>
									<div class="col-sm-4">
										<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="reject" id="reject" onclick="reject()">Reject</button>
									</div>
						<?php
     				   	}
    						else if($row_sanction->Recommendation_status == 'Recommended' && $row_sanction->Recommendation_status_added_by == 'Cluster Credit Manager')
								{
						?>
								<div class="col-sm-12" style="margin-left: 51px;color:orange;">
									<h5>Recommendation Sent to Admin For Approval</h5> 
					 			</div>
				 		<?php
								}
								else if($row_sanction->Recommendation_status == 'Loan Recommendation Approved' && $row_sanction->Recommendation_status_added_by == 'Admin')
    						{
    				?>
    						<div class="col-sm-12" style="margin-left: 51px;color:green;">
									<h5>Recommendation Approved By Admin</h5> 
					 			</div>
					 	<?php
    						}
								else if($row_sanction->Recommendation_status == 'Reverted' &&  $row_sanction->Recommendation_status_added_by == 'Admin')
								{
						?>
									<div class="col-sm-4">
      								<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="Recommend" id="Recommend"  onclick="Recommend()">Recommend</button>
									</div>
									<div class="col-sm-4">
											<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="revert" id="revert" onclick="revert()">Revert</button>
									</div>
									<div class="col-sm-4">
										<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="reject" id="reject" onclick="reject()">Reject</button>
									</div>
						<?php
								}
								else if($row_sanction->Recommendation_status == 'Reverted' && $row_sanction->Recommendation_status_added_by == 'Cluster Credit Manager')
								{
						?>
								<div class="col-sm-12" style="margin-left: 51px;color:orange;">
									<h5 >Application Sent for the revert</h5> 
					 			</div>
					 	<?php
								}
								else if($row_sanction->Recommendation_status == 'Rejected')
								{
						?>
								<div class="col-sm-12" style="margin-left: 51px;color:red;">
									<h5>Application Rejected</h5> 
					 			</div>
					 	<?php
								}
					    	else
					    	{
					    		?>
					    			<div class="col-sm-4">
      								<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="Recommend" id="Recommend"  onclick="Recommend()">Recommend</button>
									</div>
									<div class="col-sm-4">
											<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="revert" id="revert" onclick="revert()">Revert</button>
									</div>
									<div class="col-sm-4">
										<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="reject" id="reject" onclick="reject()">Reject</button>
									</div>
									<?php
    						}

							}
    					else
    					{
    				?>
    							<div class="col-sm-4">
      								<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="Recommend" id="Recommend"  onclick="Recommend()">Recommend</button>
									</div>
									<div class="col-sm-4">
											<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="revert" id="revert" onclick="revert()">Revert</button>
									</div>
									<div class="col-sm-4">
										<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="reject" id="reject" onclick="reject()">Reject</button>
									</div>
					   	<?php
					    }

					?>







						
					</div>

				</div>
			</div>
		</div>

	
		
		</h4>
			
		
	</form>
	</div>

	
</main>
</div>

</div>
</div>

<script>
	function Recommend() 
						{
						
							 var Customer_ID = document.getElementById('customer_ID').value;
							 var CM_ID = document.getElementById('CM_ID').value;
						 	 var Cluster_manager_Comments = document.getElementById('Cluster_manager_Comments').value;
							 	 var final_tenure = document.getElementById('final_tenure').value;
							 	 var final_loan_amount = document.getElementById('final_loan_amount').value;
							 	 var roi = document.getElementById('roi').value;
							 	 var product = document.getElementById('product').value;
							 	 var program = document.getElementById('program').value;
								  var EMI = document.getElementById('EMI').value;
							 	 var eligibility = document.getElementById('eligibility').value; //EMI
								
							 $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/Cluster_credit_manager/Sanction_recommendation_status"); ?>',
									    data:{
										'Customer_ID':Customer_ID,
										'CM_ID':CM_ID,
										'Recommendation_status':"Recommended",
										'Cluster_manager_Comments':Cluster_manager_Comments,
										'final_tenure':final_tenure,
										'final_loan_amount':final_loan_amount,
										'roi':roi,
										'EMI':EMI,
										'product':product,
										'program':program,
										'eligibility':eligibility

										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
											
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/finserv_test/dsa/dsa/index.php/Cluster_credit_manager/view_sanction_recommendations?ID="+obj.customer_id+"&CM="+obj.CM_ID); });
									
												
											}
						                }
                                    });
						}

						function revert() 
						{
						
							 var Customer_ID = document.getElementById('customer_ID').value;
							 var CM_ID = document.getElementById('CM_ID').value;
						 	 var Cluster_manager_Comments = document.getElementById('Cluster_manager_Comments').value;
	
						 	   if(Cluster_manager_Comments == '')
					     {
					     	swal("warning!", "Please add comments", "warning");
										    return false;
					     }
					
							 $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/Cluster_credit_manager/Sanction_recommendation_status"); ?>',
									    data:{
										'Customer_ID':Customer_ID,
										'CM_ID':CM_ID,
										'Recommendation_status':"Reverted",
										'Cluster_manager_Comments':Cluster_manager_Comments,

										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/finserv_test/dsa/dsa/index.php/Cluster_credit_manager/view_sanction_recommendations?ID="+obj.customer_id+"&CM="+obj.CM_ID); });
					 	   			 }
						                }
                                    });
						}
						function reject() 
						{
						
							 var Customer_ID = document.getElementById('customer_ID').value;
							 var CM_ID = document.getElementById('CM_ID').value;
						 	 var Cluster_manager_Comments = document.getElementById('Cluster_manager_Comments').value;

	  						if(Cluster_manager_Comments == '')
					     {
					     	swal("warning!", "Please add comments", "warning");
										    return false;
					     }
					
					
							 $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/Cluster_credit_manager/Sanction_recommendation_status"); ?>',
									    data:{
										'Customer_ID':Customer_ID,
										'CM_ID':CM_ID,
										'Recommendation_status':"Rejected",
										'Cluster_manager_Comments':Cluster_manager_Comments,

										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
											
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/finserv_test/dsa/dsa/index.php/Cluster_credit_manager/view_sanction_recommendations?ID="+obj.customer_id+"&CM="+obj.CM_ID); });
									
												
											}
						                }
                                    });
						}
</script>

 
