<body>
<div class="c-body">
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
									<?php if(isset($data_available)){ if($data_available=='No'){?> <div class="row justify-content-center col-12">Data is Not Available For Calculation </div><?php }} else{?>
									
									    
											<div class="row justify-content-center col-12">
												<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Calculation</span>
											</div>
										    
									        <table id="example1" class="table display" style="width:100%">
												<thead>
												    <tr>
					    															<th>Parameter</th>
																					<th>Value</th>
																					<th>Score</th>
																					<th>Weights</th>
																					<th>Actual Weights</th>
																					
																					
													</tr>
												</thead>
													<?php if(isset($Age_data)){?>
													<tr>
													     <td>Age</td>
														 <td><?php if(!empty($Age_data)){if(isset($Age_data['parameter'])){echo $Age_data['parameter'];}}?></td>
														 <td><?php if(!empty($Age_data)){if(isset($Age_data['Criteria'])){echo $Age_data['Criteria'];}}?></td>
														 <td><?php if(!empty($Age_data)){if(isset($Age_data['Weights'])){echo $Age_data['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Age_data)){if(isset($Age_data['Actual_Weights'])){echo $Age_data['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Property_Type)){?>
													<tr>
													     <td>Property Type</td>
														 <td><?php if(!empty($Property_Type)){if(isset($Property_Type['parameter'])){echo $Property_Type['parameter'];}}?></td>
														 <td><?php if(!empty($Property_Type)){if(isset($Property_Type['Criteria'])){echo $Property_Type['Criteria'];}}?></td>
														 <td><?php if(!empty($Property_Type)){if(isset($Property_Type['Weights'])){echo $Property_Type['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Property_Type)){if(isset($Property_Type['Actual_Weights'])){echo $Property_Type['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Qualification)){?>
													<tr>
													     <td>Qualification</td>
														 <td><?php if(!empty($Qualification)){if(isset($Qualification['parameter'])){echo $Qualification['parameter'];}}?></td>
														 <td><?php if(!empty($Qualification)){if(isset($Qualification['Criteria'])){echo $Qualification['Criteria'];}}?></td>
														 <td><?php if(!empty($Qualification)){if(isset($Qualification['Weights'])){echo $Qualification['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Qualification)){if(isset($Qualification['Actual_Weights'])){echo $Qualification['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Loan_value_arr)){?>
													<tr>
													     <td>Loan term/ (Max age - Age at time of application)</td>
														 <td><?php if(!empty($Loan_value_arr)){if(isset($Loan_value_arr['parameter'])){echo $Loan_value_arr['parameter'];}}?></td>
														 <td><?php if(!empty($Loan_value_arr)){if(isset($Loan_value_arr['Criteria'])){echo $Loan_value_arr['Criteria'];}}?></td>
														 <td><?php if(!empty($Loan_value_arr)){if(isset($Loan_value_arr['Weights'])){echo $Loan_value_arr['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Loan_value_arr)){if(isset($Loan_value_arr['Actual_Weights'])){echo $Loan_value_arr['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Vintage_in_Residence)){?>
													<tr>
													     <td>Vintage in Residence</td>
														 <td><?php if(!empty($Vintage_in_Residence)){if(isset($Vintage_in_Residence['parameter'])){echo $Vintage_in_Residence['parameter'];}}?></td>
														 <td><?php if(!empty($Vintage_in_Residence)){if(isset($Vintage_in_Residence['Criteria'])){echo $Vintage_in_Residence['Criteria'];}}?></td>
														 <td><?php if(!empty($Vintage_in_Residence)){if(isset($Vintage_in_Residence['Weights'])){echo $Vintage_in_Residence['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Vintage_in_Residence)){if(isset($Vintage_in_Residence['Actual_Weights'])){echo $Vintage_in_Residence['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Vintage_in_City)){?>
													<tr>
													     <td>Vintage in City</td>
														 <td><?php if(!empty($Vintage_in_City)){if(isset($Vintage_in_City['parameter'])){echo $Vintage_in_City['parameter'];}}?></td>
														 <td><?php if(!empty($Vintage_in_City)){if(isset($Vintage_in_City['Criteria'])){echo $Vintage_in_City['Criteria'];}}?></td>
														 <td><?php if(!empty($Vintage_in_City)){if(isset($Vintage_in_City['Weights'])){echo $Vintage_in_City['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Vintage_in_City)){if(isset($Vintage_in_City['Actual_Weights'])){echo $Vintage_in_City['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Experience)){?>
													<tr>
													     <td>Work Experience of Borrower</td>
														 <td><?php if(!empty($Experience)){if(isset($Experience['parameter'])){echo $Experience['parameter'];}}?></td>
														 <td><?php if(!empty($Experience)){if(isset($Experience['Criteria'])){echo $Experience['Criteria'];}}?></td>
														 <td><?php if(!empty($Experience)){if(isset($Experience['Weights'])){echo $Experience['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Experience)){if(isset($Experience['Actual_Weights'])){echo $Experience['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if (isset($data_credit_bureau))
													{?>
													<?php if(isset($Enquiries_1)){?>
													<tr>
													     <td>Number of Enquiries for unsecured facilities in last 1 Months</td>
														 <td><?php if(!empty($Enquiries_1)){if(isset($Enquiries_1['parameter'])){echo $Enquiries_1['parameter'];}}?></td>
														 <td><?php if(!empty($Enquiries_1)){if(isset($Enquiries_1['Criteria'])){echo $Enquiries_1['Criteria'];}}?></td>
														 <td><?php if(!empty($Enquiries_1)){if(isset($Enquiries_1['Weights'])){echo $Enquiries_1['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Enquiries_1)){if(isset($Enquiries_1['Actual_Weights'])){echo $Enquiries_1['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Enquiries_12)){?>
													<tr>
													     <td>Number of Enquiries for unsecured facilities in last 12 Months</td>
														 <td><?php if(!empty($Enquiries_12)){if(isset($Enquiries_12['parameter'])){echo $Enquiries_12['parameter'];}}?></td>
														 <td><?php if(!empty($Enquiries_12)){if(isset($Enquiries_12['Criteria'])){echo $Enquiries_12['Criteria'];}}?></td>
														 <td><?php if(!empty($Enquiries_12)){if(isset($Enquiries_12['Weights'])){echo $Enquiries_12['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Enquiries_12)){if(isset($Enquiries_12['Actual_Weights'])){echo $Enquiries_12['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													
													<?php if(isset($Retail_Account_12)){?>
													<tr>
													     <td>Number of secured facilities opened in last 12 month</td>
														 <td><?php if(!empty($Retail_Account_12)){if(isset($Retail_Account_12['parameter'])){echo $Retail_Account_12['parameter'];}}?></td>
														 <td><?php if(!empty($Retail_Account_12)){if(isset($Retail_Account_12['Criteria'])){echo $Retail_Account_12['Criteria'];}}?></td>
														 <td><?php if(!empty($Retail_Account_12)){if(isset($Retail_Account_12['Weights'])){echo $Retail_Account_12['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Retail_Account_12)){if(isset($Retail_Account_12['Actual_Weights'])){echo $Retail_Account_12['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Loan_Duration_period)){?>
													<tr>
													     <td>CIBIL/Equifax Vintage - Minimum Duration of First loan</td>
														 <td><?php if(!empty($Loan_Duration_period)){if(isset($Loan_Duration_period['parameter'])){echo $Loan_Duration_period['parameter'].' Months';}}?></td>
														 <td><?php if(!empty($Loan_Duration_period)){if(isset($Loan_Duration_period['Criteria'])){echo $Loan_Duration_period['Criteria'];}}?></td>
														 <td><?php if(!empty($Loan_Duration_period)){if(isset($Loan_Duration_period['Weights'])){echo $Loan_Duration_period['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Loan_Duration_period)){if(isset($Loan_Duration_period['Actual_Weights'])){echo $Loan_Duration_period['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
												    <?php if(isset($Due_count_values)){?>
													<tr>
													     <td>Percentage of facilities with DPD greater than 30  in last 24 month </td>
														 <td><?php if(!empty($Due_count_values)){if(isset($Due_count_values['parameter'])){echo $Due_count_values['parameter'].'%';}}?></td>
														 <td><?php if(!empty($Due_count_values)){if(isset($Due_count_values['Criteria'])){echo $Due_count_values['Criteria'];}}?></td>
														 <td><?php if(!empty($Due_count_values)){if(isset($Due_count_values['Weights'])){echo $Due_count_values['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Due_count_values)){if(isset($Due_count_values['Actual_Weights'])){echo $Due_count_values['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Active_loan_count)){?>
													<tr>
													     <td>Active Loans in Bureau</td>
														 <td><?php if(!empty($Active_loan_count)){if(isset($Active_loan_count['parameter'])){echo $Active_loan_count['parameter'];}}?></td>
														 <td><?php if(!empty($Active_loan_count)){if(isset($Active_loan_count['Criteria'])){echo $Active_loan_count['Criteria'];}}?></td>
														 <td><?php if(!empty($Active_loan_count)){if(isset($Active_loan_count['Weights'])){echo $Active_loan_count['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Active_loan_count)){if(isset($Active_loan_count['Actual_Weights'])){echo $Active_loan_count['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Active_Insecuredloan_count)){?>
													<tr>
													     <td>Active Unsecured Loans in Bureau</td>
														 <td><?php if(!empty($Active_Insecuredloan_count)){if(isset($Active_Insecuredloan_count['parameter'])){echo $Active_Insecuredloan_count['parameter'];}}?></td>
														 <td><?php if(!empty($Active_Insecuredloan_count)){if(isset($Active_Insecuredloan_count['Criteria'])){echo $Active_Insecuredloan_count['Criteria'];}}?></td>
														 <td><?php if(!empty($Active_Insecuredloan_count)){if(isset($Active_Insecuredloan_count['Weights'])){echo $Active_Insecuredloan_count['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Active_Insecuredloan_count)){if(isset($Active_Insecuredloan_count['Actual_Weights'])){echo $Active_Insecuredloan_count['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Cibil_Score_values)){?>
													<tr>
													     <td>Cibil/Equifax Score</td>
														 <td><?php if(!empty($Cibil_Score_values)){if(isset($Cibil_Score_values['parameter'])){echo $Cibil_Score_values['parameter'];}}?></td>
														 <td><?php if(!empty($Cibil_Score_values)){if(isset($Cibil_Score_values['Criteria'])){echo $Cibil_Score_values['Criteria'];}}?></td>
														 <td><?php if(!empty($Cibil_Score_values)){if(isset($Cibil_Score_values['Weights'])){echo $Cibil_Score_values['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Cibil_Score_values)){if(isset($Cibil_Score_values['Actual_Weights'])){echo $Cibil_Score_values['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php } ?>
													<?php if(isset($Bis_Equity_value)){?>
													<tr>
													     <td>Paid up capital/ Equity in Business</td>
														 <td><?php if(!empty($Bis_Equity_value)){if(isset($Bis_Equity_value['parameter'])){echo $Bis_Equity_value['parameter'];}}?></td>
														 <td><?php if(!empty($Bis_Equity_value)){if(isset($Bis_Equity_value['Criteria'])){echo $Bis_Equity_value['Criteria'];}}?></td>
														 <td><?php if(!empty($Bis_Equity_value)){if(isset($Bis_Equity_value['Weights'])){echo $Bis_Equity_value['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Bis_Equity_value)){if(isset($Bis_Equity_value['Actual_Weights'])){echo $Bis_Equity_value['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Bis_year)){?>
													<tr>
													     <td>Years in Business</td>
														 <td><?php if(!empty($Bis_year)){if(isset($Bis_year['parameter'])){echo $Bis_year['parameter'];}}?></td>
														 <td><?php if(!empty($Bis_year)){if(isset($Bis_year['Criteria'])){echo $Bis_year['Criteria'];}}?></td>
														 <td><?php if(!empty($Bis_year)){if(isset($Bis_year['Weights'])){echo $Bis_year['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Bis_year)){if(isset($Bis_year['Actual_Weights'])){echo $Bis_year['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Business_Type)){?>
													<tr>
													     <td>Business Type</td>
														 <td><?php if(!empty($Business_Type)){if(isset($Business_Type['parameter'])){echo $Business_Type['parameter'];}}?></td>
														 <td><?php if(!empty($Business_Type)){if(isset($Business_Type['Criteria'])){echo $Business_Type['Criteria'];}}?></td>
														 <td><?php if(!empty($Business_Type)){if(isset($Business_Type['Weights'])){echo $Business_Type['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Business_Type)){if(isset($Business_Type['Actual_Weights'])){echo $Business_Type['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Emp_Type)){?>
													<tr>
													     <td>Employment Type</td>
														 <td><?php if(!empty($Emp_Type)){if(isset($Emp_Type['parameter'])){echo $Emp_Type['parameter'];}}?></td>
														 <td><?php if(!empty($Emp_Type)){if(isset($Emp_Type['Criteria'])){echo $Emp_Type['Criteria'];}}?></td>
														 <td><?php if(!empty($Emp_Type)){if(isset($Emp_Type['Weights'])){echo $Emp_Type['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Emp_Type)){if(isset($Emp_Type['Actual_Weights'])){echo $Emp_Type['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Current_Experience)){?>
													<tr>
													     <td>Vintage of the Employer</td>
														 <td><?php if(!empty($Current_Experience)){if(isset($Current_Experience['parameter'])){echo $Current_Experience['parameter'];}}?></td>
														 <td><?php if(!empty($Current_Experience)){if(isset($Current_Experience['Criteria'])){echo $Current_Experience['Criteria'];}}?></td>
														 <td><?php if(!empty($Current_Experience)){if(isset($Current_Experience['Weights'])){echo $Current_Experience['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Current_Experience)){if(isset($Current_Experience['Actual_Weights'])){echo $Current_Experience['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($Net_Worth)){?>
													<tr>
													     <td>Net Worth (Paid Up Capital)</td>
														 <td><?php if(!empty($Net_Worth)){if(isset($Net_Worth['parameter'])){echo $Net_Worth['parameter'];}}?></td>
														 <td><?php if(!empty($Net_Worth)){if(isset($Net_Worth['Criteria'])){echo $Net_Worth['Criteria'];}}?></td>
														 <td><?php if(!empty($Net_Worth)){if(isset($Net_Worth['Weights'])){echo $Net_Worth['Weights'].'%';}}?></td>
														 <td><?php if(!empty($Net_Worth)){if(isset($Net_Worth['Actual_Weights'])){echo $Net_Worth['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($ratio_cheque_bounce)){?>
													<tr>
													     <td>Ratio of (Cheque Bounces/ECS return) to total number of debit transaction in last 12 months</td>
														 <td><?php if(!empty($ratio_cheque_bounce)){if(isset($ratio_cheque_bounce['parameter'])){echo $ratio_cheque_bounce['parameter'].'%';}}?></td>
														 <td><?php if(!empty($ratio_cheque_bounce)){if(isset($ratio_cheque_bounce['Criteria'])){echo $ratio_cheque_bounce['Criteria'];}}?></td>
														 <td><?php if(!empty($ratio_cheque_bounce)){if(isset($ratio_cheque_bounce['Weights'])){echo $ratio_cheque_bounce['Weights'].'%';}}?></td>
														 <td><?php if(!empty($ratio_cheque_bounce)){if(isset($ratio_cheque_bounce['Actual_Weights'])){echo $ratio_cheque_bounce['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($ratio_avg_emi)){?>
													<tr>
													     <td>Average monthly balance maintained in last 12 months to EMI</td>
														 <td><?php if(!empty($ratio_avg_emi)){if(isset($ratio_avg_emi['parameter'])){echo $ratio_avg_emi['parameter'].'%';}}?></td>
														 <td><?php if(!empty($ratio_avg_emi)){if(isset($ratio_avg_emi['Criteria'])){echo $ratio_avg_emi['Criteria'];}}?></td>
														 <td><?php if(!empty($ratio_avg_emi)){if(isset($ratio_avg_emi['Weights'])){echo $ratio_avg_emi['Weights'].'%';}}?></td>
														 <td><?php if(!empty($ratio_avg_emi)){if(isset($ratio_avg_emi['Actual_Weights'])){echo $ratio_avg_emi['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($ratio_debt)){?>
													<tr>
													     <td>Debt to  Annual Income</td>
														 <td><?php if(!empty($ratio_debt)){if(isset($ratio_debt['parameter'])){echo $ratio_debt['parameter'].'%';}}?></td>
														 <td><?php if(!empty($ratio_debt)){if(isset($ratio_debt['Criteria'])){echo $ratio_debt['Criteria'];}}?></td>
														 <td><?php if(!empty($ratio_debt)){if(isset($ratio_debt['Weights'])){echo $ratio_debt['Weights'].'%';}}?></td>
														 <td><?php if(!empty($ratio_debt)){if(isset($ratio_debt['Actual_Weights'])){echo $ratio_debt['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($ratio_debt_monthly)){?>
													<tr>
													     <td>Current month Debt Burden Ratio </td>
														 <td><?php if(!empty($ratio_debt_monthly)){if(isset($ratio_debt_monthly['parameter'])){echo $ratio_debt_monthly['parameter'].'%';}}?></td>
														 <td><?php if(!empty($ratio_debt_monthly)){if(isset($ratio_debt_monthly['Criteria'])){echo $ratio_debt_monthly['Criteria'];}}?></td>
														 <td><?php if(!empty($ratio_debt_monthly)){if(isset($ratio_debt_monthly['Weights'])){echo $ratio_debt_monthly['Weights'].'%';}}?></td>
														 <td><?php if(!empty($ratio_debt_monthly)){if(isset($ratio_debt_monthly['Actual_Weights'])){echo $ratio_debt_monthly['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<?php if(isset($ratio_total_assests)){?>
													<tr>
													     <td>Assets (Financial assets verifiable) created to Total Loan Amount</td>
														 <td><?php if(!empty($ratio_total_assests)){if(isset($ratio_total_assests['parameter'])){echo $ratio_total_assests['parameter'].'%';}}?></td>
														 <td><?php if(!empty($ratio_total_assests)){if(isset($ratio_total_assests['Criteria'])){echo $ratio_total_assests['Criteria'];}}?></td>
														 <td><?php if(!empty($ratio_total_assests)){if(isset($ratio_total_assests['Weights'])){echo $ratio_total_assests['Weights'].'%';}}?></td>
														 <td><?php if(!empty($ratio_total_assests)){if(isset($ratio_total_assests['Actual_Weights'])){echo $ratio_total_assests['Actual_Weights'].'%';}}?></td>
													</tr>
													<?php } ?>
													<tr>
													    <td></td>
														<td></td>
														<td></td>
														<td style="background-color:yellow">Total</td>
														<td style="background-color:yellow" id="Total_per"></td>
													</tr>
												</table>
									<?php } ?>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
<script type="text/javascript">
$( document ).ready(function() {
	var Total=0
   $("#example1 tr").each(function()
   {
	  
	   if($(this).find("td:last").text()!='')
		   {
			  Total+=(parseInt($(this).find("td:last").text()));
			
		   }	 
    }); 
	$('#Total_per').html(Total+'%');
});
</script>
</body>
 					
