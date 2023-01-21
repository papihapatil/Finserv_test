<?php 
  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
  $id = $_GET['ID']; // shows id of customer
  $this->session->set_userdata("id",$id);
  $this->session->set_userdata("id1",$id1);
  $month = date('m');
  $day = date('d');
  $year = date('Y');
  $today = $year . '-' . $month . '-' . $day;
  //echo $id1;
  //echo $id;
  //exit();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Wizard-v10</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>adminn/PD_CSS/css/montserrat-font.css">
    <link rel="stylesheet" href="<?php echo base_url()?>adminn/PD_CSS/css/style.css"/>
	<link href="sweetalert.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="" style="">
	    <div class="row  shadow bg-white rounded margin-10 padding-15">
			<div class="wizard-form">
				<div class="wizard-header">
				</div>
				<!--<form class="form-register" id="myform" action="<?= base_url('index.php/credit_manager_user/personal_discussion')?>" method="post">-->
				 	<form class="form-register"  id="form_1" action="<?php echo base_url()?>index.php/credit_manager_user/PD_section_one" method="post">
		        	<div id="form-total">
		        		<!-- SECTION 1 ---------------------------------------------------------------------------------------------------------------- -->
			            <h2>1</h2>
					  <section id="section1">
							<div class="row shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
							    <div class="col-sm-10">
					        		<h4>BASIC DETAILS</h4><hr>

			            		</div>
								<?php if(isset($data_row_pd_table))
								{

								    if($data_row_pd_table->PD_STATUS =='Completed')
									{
									?>
										 <div class="col-sm-2">
					        				<a target='_blank' href="<?php echo base_url()?>index.php/Credit_manager_user/pdf?ID=<?php echo $row->UNIQUE_CODE;?>"><button type="button" class="btn btn-success">Generate PD</button></a>
					            		 </div>
									<?php
									}
									else 
									{
										?>
											 <div class="col-sm-2">
					        		        </div>
										<?php

									}

								}
								else
								{
								?>
									 <div class="col-sm-2">
					        		 </div>
								<?php

								}?>
							
								<div class="col-sm-3">
									<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
										<label class="class_bold">Application ID</label>
   										<input type="text" class="form-control" id="LeadID" name="LeadID" value="<?php if(isset($data_row_applied_loan)) echo $data_row_applied_loan->Application_id; ?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">PD done with</label>
   										<input type="text" class="form-control" id="PDDoneWith" name="PDDoneWith" >
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					   					<label class="class_bold">Primary profile of PD person</label>
										   	<select class="form-control" aria-label="Default select example" id="PrimaryProfileOfPDPerson" name="PrimaryProfileOfPDPerson">
  												<option >select</option>
												<option value="SENP">SENP</option>
  												<option value="1">SEP</option>
  												<option value="2">SE</option>
 												</select>
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					   					<label class="class_bold">Person Met</label>
    									<input type="text" class="form-control" id="PersonMet" name="PersonMet" >
  									</div>
								</div>		
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">Product</label>
   										<input type="text" class="form-control" id="Product" name="Product" value="<?php if(isset($data_row_applied_loan)) echo strtoupper("$data_row_applied_loan->LOAN_TYPE")." LOAN" ;?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">Date</label>
   										<input type="date" class="form-control" id="Date" name="Date" > 
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">Report Generation Date</label>
    									<input type="date" class="form-control" id="ReportGenerationDate" name="ReportGenerationDate" >
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				        				<label class="class_bold">PD Done by</label>
    									<input type="text" class="form-control" id="PDDoneby" name="PDDoneby" value="<?php if(isset($CM_data_row)) echo $CM_data_row->FN." ".$CM_data_row->MN." ".$CM_data_row->LN;?>">
  									</div>
								</div>		
								<div class="col-sm-6">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
										<label class="class_bold">Customer details</label>	
										<textarea class = "form-control" rows = "3" placeholder = "" name="CustomerDetails"></textarea>
        	    					</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				   						<label class="class_bold">Family Background</label>	
										<textarea class = "form-control" rows = "3" placeholder = "" name="FamilyBackground"></textarea>
									</div>
			    				</div>
								<div class="col-sm-12">&nbsp;</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Family Size</label>
    									<input type="text" class="form-control" id="FamilySize" name="FamilySize">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				        				<label class="class_bold">No of Dependent</label>
    									<input type="text" class="form-control" id="NoOfDependent" name="NoOfDependent" value="<?php if(isset($row_more)) echo $row_more->NO_OF_DEPENDANTS ;?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				        				<label class="class_bold">No of Earning Members</label>
    									<input type="text" class="form-control" id="NoOfEarningMembers" name="NoOfEarningMembers">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Residence Ownership</label>
    									<input type="text" class="form-control" id="ResidenceOwnership" name="ResidenceOwnership">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				        				<label class="class_bold">Residence Type</label>
    									<input type="text" class="form-control" id="ResidenceType" name="ResidenceType" value="<?php if(isset($row_more)) echo $row_more->RES_ADDRS_PROPERTY_TYPE; ?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Staying Since at Current Address</label>
    									<input type="text" class="form-control" id="StayingSinceAtCurrentAddress" name="StayingSinceAtCurrentAddress" value="<?php if(isset($row_more)) echo $row_more->RES_ADDRS_NO_YEARS_LIVING; ?>">
  									</div>
				                </div>
				                <div class="col-sm-3">
					                <div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				                        <label class="class_bold">Native Of</label>
    					                <input type="text" class="form-control" id="NativeOf" name="NativeOf" value="<?php if(isset($row_more)) echo $row_more->NATIVE_PLACE; ?>">
  					                </div>
				                </div>
				                <div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				        				<label class="class_bold">Staying in City Since</label>
    									<input type="text" class="form-control" id="StayingInCitySince" name="StayingInCitySince" value="<?php if(isset($row)) echo $row->YEARS_IN_CITY_LIVING; ?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Relation</label>
    									<input type="text" class="form-control" id="Relation" name="Relation">
  									</div>
								</div>
								<div class="col-sm-9">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Co-applicant Name</label>
    									<input type="text" class="form-control" id="Co-applicantName" name="Co-applicantName" value="<?php if(isset($coapplicants))  $i=1 ;foreach ( $coapplicants as $coapplicant) { echo $i." ) ".$coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN." "; $i++;}?>">
  									</div>
								</div>
			  							
							</div>
							<br>
							<div class="row shadow bg-white rounded margin-10 padding-15" style="padding:25px;">
				  				<div class="col-sm-12 ">
					        		<h4>CONTACT DETAILS</h4><hr>
			            		</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				        				<label class="class_bold">Primary contact no</label>
    									<input type="text" class="form-control" id="PrimaryContactNo" name="PrimaryContactNo" value="<?php if(isset($row)) echo $row->MOBILE; ?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Alternate Contact No</label>
    									<input type="text" class="form-control" id="AlternateContactNo" name="AlternateContactNo">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Email ID</label>
    									<input type="text" class="form-control" id="EmailID" name="EmailID" value="<?php if(isset($row)) echo $row->EMAIL; ?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				        				<label class="class_bold">PD Address</label>
    									<input type="text" class="form-control" id="PDAddress" name="PDAddress">
  									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
										<label class="class_bold">PD Address If Others</label>
										<textarea class = "form-control" rows = "1" placeholder = ""  id="PDAddressIfOthers" name="PDAddressIfOthers"></textarea>
			  						</div> 
			    				</div>
                            </div>
							<br>
							<div class="row shadow bg-white rounded margin-10 padding-15" style="padding:25px;">
								<div class="col-sm-12" style="">
									<h4>BUSINESS DETAILS</h4><hr>
			   					</div>
								<div class="col-sm-3">
					    			<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				        				<label class="class_bold">Name of Business</label>
    									<input type="text" class="form-control" id="NameOfBusiness" name="NameOfBusiness" value="<?php if(isset($data_row_income)) echo $data_row_income->BIS_NAME;?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Nature of Business</label>
    									<input type="text" class="form-control" id="NatureOfBusiness" name="NatureOfBusiness" value="<?php if(isset($data_row_income)) echo $data_row_income->BIS_NATURE_OF_BIS;?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Business Set up</label>
    									<input type="text" class="form-control" id="BusinessSetUp" name="BusinessSetUp">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				        				<label class="class_bold">Business Vintage</label>
    									<input type="text" class="form-control" id="BusinessVintage" name="BusinessVintage">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				        				<label class="class_bold">No of Employees</label>
    									<input type="text" class="form-control" id="NoOfEmployees" name="NoOfEmployees">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				        				<label class="class_bold">Business Holder Name</label>
    									<input type="text" class="form-control" id="BusinessHolderName" name="BusinessHolderName">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Sub Profile</label>
    									<input type="text" class="form-control" id="SubProfile" name="SubProfile">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				        				<label class="class_bold">Business Place</label>
    									<input type="text" class="form-control" id="BusinessPlace" name="BusinessPlace" >
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				        				<label class="class_bold">Industry Experience</label>
    									<input type="text" class="form-control" id="IndustryExperience" name="IndustryExperience">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Business Docs Verified</label>
    									<input type="text" class="form-control" id="BusinessDocsVerified" name="BusinessDocsVerified">
  									</div>
								</div>
								<div class="col-sm-3">
			    				</div>
								<div class="col-sm-3">
			   					</div>
                            </div>
							<br>
							<div class="row shadow bg-white rounded margin-10 padding-15" style="padding:25px;">
								<div class="col-sm-12" style="">
									<h4>Business Description</h4>
									<textarea class = "form-control" rows = "3" placeholder = "" name="BusinessDescription"></textarea>
									<hr>
			   					</div>
							</div>
									<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_1" value="submit" type="submit">SUBMIT</button>
     		            </form>
			            </section>
						
						<!-- SECTION 2 ---------------------------------------------------------------------------------------------------------------------------------------------------- -->
			            <h2>2</h2>
			            <section id="section2">
							<div class="row  shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
								<form class="form-register" id="form_2" action="<?php echo base_url()?>index.php/credit_manager_user/PD_section_one" method="post">
			          
								<div class="col-sm-12">
									<h4>Business Cash Flow</h4><hr>
			    				</div>
								<div class="col-sm-6">
									<table class="table table-bordered">
    									<thead>
						   					<tr>
												<th>Income</th>		
			  								</tr>
							 				<tr>
       					 						<th></th>
        										<th>Customer Declared</th>
        										<th>Assessed</th>
      										</tr>
     									</thead>
   										<tbody>
											<tr>
        										<td>No of Units or Services Sold / Highest Invoice Recorded / Average Footfall per day</td>
        										<td><input type="text" class="form-control" id="AverageFootfall _1" name="AverageFootfall_1"></td>
												<td><input type="text" class="form-control" id="AverageFootfall_2" name="AverageFootfall_2"></td>
      										</tr>
     										<tr>
        										<td>Average Sale price / Lowest Invoice recorded / Average billing per customer</td>
												<td><input type="text" class="form-control" id=" AverageBilling_1" name="AverageBilling_1"></td>
												<td><input type="text" class="form-control" id="AverageBilling_2" name="AverageBilling_2"></td>
      										</tr>
      										<tr>
       											<td>Daily Sales / Average Invoice recorded / Total billing per day</td>
       											<td><input type="text" class="form-control" id="TotalBilling_1" name="TotalBilling_1"></td>
												<td><input type="text" class="form-control" id="TotalBilling_2" name="TotalBilling_2"></td>
      										</tr>
											<tr>
       											<td>Days Operation</td>
       											<td><input type="text" class="form-control" id="DaysOperation_1" name="DaysOperation_1"></td>
												<td><input type="text" class="form-control" id="DaysOperation_2" name="DaysOperation_2"></td>
      										</tr>
											<tr>
       											<td>Monthly Sales</td>
       											<td><input type="text" class="form-control" id="MonthlySales_1" name="MonthlySales_1"></td>
												<td><input type="text" class="form-control" id="MonthlySales_2" name="MonthlySales_2"></td>
      										</tr>
										</tbody>
  									</table>
			   					</div>
								<div class="col-sm-6">
					  				<table class="table table-bordered">
    									<thead>
						    				<tr>
												<th>Expenses</th>		
			  								</tr>
							 				<tr>
       					 						<th></th>
        										<th>Customer Declared</th>
        										<th>Assessed</th>
      										</tr>
     									</thead>
										<tbody>
											<tr>
       											<td>Purchase of Raw Material</td>
       											<td><input type="text" class="form-control" id="PurchaseOfRawMaterial_1" name="PurchaseOfRawMaterial_1"></td>
												<td><input type="text" class="form-control" id="PurchaseOfRawMaterial_2" name="PurchaseOfRawMaterial_2"></td>
      										</tr>
											<tr>
       											<td>Wages</td>
       											<td><input type="text" class="form-control" id="Wages_1" name="Wages_1"></td>
												<td><input type="text" class="form-control" id="Wages_2" name="Wages_2"></td>
      										</tr>
											<tr>
       											<td>Electricity</td>
       											<td><input type="text" class="form-control" id="Electricity_1" name="Electricity_1"></td>
												<td><input type="text" class="form-control" id="Electricity_2" name="Electricity_2"></td>
      										</tr>
											<tr>
       											<td>Rent</td>
       											<td><input type="text" class="form-control" id="Rent_1" name="Rent_1"></td>
												<td><input type="text" class="form-control" id="Rent_2" name="Rent_2"></td>
      										</tr>
											<tr>
       											<td>Other Exp.</td>
       											<td><input type="text" class="form-control" id="OtherExp_1" name="OtherExp_1"></td>
												<td><input type="text" class="form-control" id="OtherExp_2" name="OtherExp_2"></td>
      										</tr>
											<tr>
       											<td>Monthly Exp.</td>
       											<td><input type="text" class="form-control" id="MonthlyExp_1" name="MonthlyExp_1"></td>
												<td><input type="text" class="form-control" id="MonthlyExp_2" name="MonthlyExp_2"></td>
      										</tr>
											<tr>
       											<td>Net Profit</td>
       											<td><input type="text" class="form-control" id="NetProfit_1" name="NetProfit_1"></td>
												<td><input type="text" class="form-control" id="NetProfit_2" name="NetProfit_2"></td>
      										</tr>
											<tr>
       											<td>Margin %</td>
       											<td><input type="text" class="form-control" id="Margin_1" name="Margin_1"></td>
												<td><input type="text" class="form-control" id="Margin_2" name="Margin_2"></td>
      										</tr>
   										</tbody>
  									</table>
								</div>
                            </div>
							<br>
							<div class="row  shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
								<div class="col-sm-12">
									<h4>Additional Income</h4><hr>
			    				</div>
								<div class="col-sm-4">
								    <div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Additional Income</label>
    									<input type="text" class="form-control" id="AdditionalIncome" name="AdditionalIncome">
  									</div>
                                </div>
								<div class="col-sm-4">
								    <div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Income Considered</label>
    									<input type="text" class="form-control" id="IncomeConsidered" name="IncomeConsidered">
  									</div>
                                </div>
								<div class="col-sm-4">
								    <div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Income Amount</label>
    									<input type="text" class="form-control" id="IncomeAmount" name="IncomeAmount">
  									</div>
                                </div>
								<div class="col-sm-6">
								    <div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Comments</label>
										<textarea class = "form-control" rows = "1" placeholder = ""  id="Comments" name="Comments"></textarea>
			  						</div>
                                </div>
								<div class="col-sm-6">
								</div>
								<div class="col-sm-3">
								    <div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Income Grid</label>
    									<input type="text" class="form-control" id="IncomeGrid" name="IncomeGrid">
  									</div>
								</div>
								<div class="col-sm-3">
								    <div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Primary Income</label>
    									<input type="text" class="form-control" id="PrimaryIncome" name="PrimaryIncome">
  									</div>
								</div>
								<div class="col-sm-3">
								    <div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Additional Income</label>
    									<input type="text" class="form-control" id="AdditionalIncome" name="AdditionalIncome">
  									</div>
								</div>
								<div class="col-sm-3">
							     	<div class="form-group">
										 <i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Total Income</label>
    									<input type="text" class="form-control" id="TotalIncome" name="TotalIncome">
  									</div>
								</div>
                            </div>
							<br>
							<div class="row  shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
								<div class="col-sm-12">
									<h4>Geo Tagging & Photos</h4><hr>
			    				</div>
								<div class="col-sm-6">
							     	<div class="form-group">
									 	<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Location to be Tagged</label>
    									<input type="text" class="form-control" id="LocationToBeTagged" name="LocationToBeTagged">
  									</div>
								</div>
								<div class="col-sm-6">
							     	<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				       					<label class="class_bold">Location Address</label>
    									<input type="text" class="form-control" id="LocationAddress" name="LocationAddress">
  									</div>
								</div>
								<div class="col-sm-12">
								<div class="row" id="lode_div">
									<div class="row">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-top: 3px; margin-left: 10px;">
											<!--<label>Select Image</label>
   											<input type="file" name="file" id="file" />		-->												
										</div>
									<div>
									<br/>
										<?php 
											if(!empty($data_row_pd_geo_images))
											{
												foreach($data_row_pd_geo_images as $photo) {
													?>
													<a href="<?php base_url()?>/dsa/dsa/<?php echo $photo->geo_photo_path;?>" target="_blank">
														<div class="col-sm-3" style="padding:3px;">
															<img src="<?php base_url()?>/dsa/dsa/<?php echo $photo->geo_photo_path;?>" style="width:100px;"></img ><br>
															<small><?php echo $photo->geo_photo_path_name;?></small>
												   		</div>
												    </a>
													<?php
												}
											}
											else
											{
												echo "no images";

											}
        								?>
              					</div>
							</div>								
							</div>
                                </div>
								
							</div>
								<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_2" value="submit" type="submit">SUBMIT</button>
     		            </form>
			            </section>
			            <!-- SECTION 3  ---- -------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
			            <h2>3</h2>
			            <section id="section3">
					    	 <div class="row shadow bg-white rounded margin-10 padding-15  " style="padding:25px;">
                                 <form class="form-register" id="form_3" action="<?php echo base_url()?>index.php/credit_manager_user/PD_section_one" method="post">
			          
							    <div class="col-sm-12">
									<h4>Property / Transaction Details</h4><hr>
			    				</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					   					<label class="class_bold">Requested Loan Amount</label>
   										<input type="text" class="form-control" id="RequestedLoanAmount" name="RequestedLoanAmount" value="<?php if(isset($data_row_applied_loan)) echo $data_row_applied_loan->DESIRED_LOAN_AMOUNT;?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">Mode of Property Acquisition</label>
   										<input type="text" class="form-control" id="ModeOfPropertyAcquisition" name="ModeOfPropertyAcquisition">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					   					<label class="class_bold">Type of Transaction</label>
    									<input type="text" class="form-control" id="TypeOfTransaction" name="TypeOfTransaction">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					   					<label class="class_bold">Mix Transaction</label>
    									<input type="text" class="form-control" id="MixTransaction" name="MixTransaction">
  									</div>
								</div>		
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">Property Owned Since</label>
    									<input type="text" class="form-control" id="PropertyOwnedSince" name="PropertyOwnedSince">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">POS HL LAN</label>
    									<input type="text" class="form-control" id="POSHLLAN" name="POSHLLAN">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">Occupancy Status</label>
    									<input type="text" class="form-control" id="OccupancyStatus" name="OccupancyStatus">
  									</div>
								</div>	
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">MOB</label>
    									<input type="text" class="form-control" id="MOB" name="MOB">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">End Use</label>
    									<input type="text" class="form-control" id="EndUse" name="EndUse">
  									</div>
								</div>
							</div>
							<br>
							<div class="row  shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
								<div class="col-sm-12">
									<h4>Property / End use Brief</h4>
									<textarea class = "form-control" rows = "3" placeholder = ""  id="PropertyEndUseBrief" name="PropertyEndUseBrief"></textarea>
									<hr>
			    				</div>
							</div>
							<br>
							<div class="row  shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
								<div class="col-sm-12">
									<h4>Loan Details- Applicant</h4><hr>
			    				</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">No of Active Loans</label>
    									<input type="text" class="form-control" id="NoOfActiveLoans" name="NoOfActiveLoans">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">Cumulative EMI</label>
    									<input type="text" class="form-control" id="CumulativeEMI" name="CumulativeEMI">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">Obligated EMI</label>
    									<input type="text" class="form-control" id="ObligatedEMI" name="ObligatedEMI">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">Comfortable EMI</label>
    									<input type="text" class="form-control" id="ComfortableEMI" name="ComfortableEMI">
  									</div>
								</div>
							</div>
							<br>
							<div class="row  shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
								<div class="col-sm-12">
									<h4>Loan Details- Co - Applicant </h4><hr>
			    				</div>
								<?php if(isset($coapplicants))  $i=1 ;
								foreach ( $coapplicants as $coapplicant) {
								?>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">No of Active Loans</label>
    									<input type="text" class="form-control" id="NoOfActiveLoans_co" name="NoOfActiveLoans_co" value="
										    <?php if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts']))
											{ 
                                                echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'];
                                            }
											else
											{ echo " " ;}
											?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">Cumulative EMI</label>
    									<input type="text" class="form-control" id="CumulativeEMI_co" name="CumulativeEMI_co">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">Obligated EMI</label>
    									<input type="text" class="form-control" id="ObligatedEMI_co" name="ObligatedEMI_co">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
					    				<label class="class_bold">Comfortable EMI</label>
    									<input type="text" class="form-control" id="ComfortableEMI_co" name="ComfortableEMI_co">
  									</div>
								</div>
								<?php
								}?>
						
							</div>
							<br>
							<div class="row  shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
								<div class="col-sm-12">
									<h4>Investment Details</h4><hr>
			    				</div>
								<div class="col-sm-12">
									<table class="table table-bordered">
    									<thead>
											<tr>
						    					<th>Insurance</th>
        										<th>Mutual Funds</th>
        										<th>FD</th>
												<th>Jewellery</th>
												<th>Property</th>
												<th>Chit Fund</th>
												<th>RD</th>
      										</tr>
     									</thead>
										<tbody>
											<tr>
												<td><input type="text" class="form-control" id="Insurance" name="Insurance"></td>
												<td><input type="text" class="form-control" id="MutualFunds" name="MutualFunds"></td>
												<td><input type="text" class="form-control" id="FD" name="FD"></td>
												<td><input type="text" class="form-control" id="Jewellery" name="Jewellery"></td>
												<td><input type="text" class="form-control" id="Property" name="Property"></td>
												<td><input type="text" class="form-control" id="ChitFund" name="ChitFund"></td>
												<td><input type="text" class="form-control" id="RD" name="RD"></td>
                                            </tr>
										</tbody>
                                    </table>
								</div>
							</div>
							<br>
							<div class="row  shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
								<div class="col-sm-12">
									<h4>Property Photographs</h4><hr>
			    				</div>
							</div>
							<br>
							<div class="row  shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
								<div class="col-sm-12">
									<h4>Reference Check</h4><hr>
			    				</div>
								<div class="col-sm-12">
									<table class="table table-bordered">
    									<tbody>
											<tr>
												<td>Reference type</td>
												<td><input type="text" class="form-control" id="ReferenceType_1" name="ReferenceType_1"></td>
												<td><input type="text" class="form-control" id="ReferenceType_2" name="ReferenceType_2"></td>
											</tr>
											<tr>
												<td>Name</td>
												<td><input type="text" class="form-control" id="ReferenceName_1" name="ReferenceName_1"></td>
												<td><input type="text" class="form-control" id="ReferenceName_2" name="ReferenceName_2"></td>
											</tr>
											<tr>
												<td>Contact No</td>
												<td><input type="text" class="form-control" id="ContactNo_1" name="ContactNo_1"></td>
												<td><input type="text" class="form-control" id="ContactNo_2" name="ContactNo_2"></td>
											</tr>
											<tr>
												<td>Relation</td>
												<td><input type="text" class="form-control" id="Relation_1" name="Relation_1"></td>
												<td><input type="text" class="form-control" id="Relation_2" name="Relation_2"></td>
											</tr>
											<tr>
												<td>Known Since</td>
												<td><input type="text" class="form-control" id="KnownSince_1" name="KnownSince_1"></td>
												<td><input type="text" class="form-control" id="KnownSince_2" name="KnownSince_2"></td>
											</tr>
											<tr>
												<td>Verification Status</td>
												<td><input type="text" class="form-control" id="VerificationStatus_1" name="VerificationStatus_1"></td>
												<td><input type="text" class="form-control" id="VerificationStatus_2" name="VerificationStatus_2"></td>
											</tr>
											<tr>
												<td>Brief on Reference</td>
												<td><input type="text" class="form-control" id="BriefOnReference_1" name="BriefOnReference_1"></td>
												<td><input type="text" class="form-control" id="BriefOnReference_2" name="BriefOnReference_2"></td>
											</tr>
										</tbody>
                                    </table>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
										<label class="class_bold">PD Status of</label>	
										<textarea class = "form-control" rows = "3" placeholder = "" name="PDStatusOf"></textarea>
        	    					</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>
				   						<label class="class_bold">Overall PD Status</label>	
										<textarea class = "form-control" rows = "3" placeholder = "" name="OverallPDStatus"></textarea>
									</div>
			    				</div>

							</div>
									<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_3" value="submit" type="submit">SUBMIT</button>
     		            </form>
						 </section>
		        	</div>
		       <!-- </form>-->
			</div>
		</div>
	</div>
	<script>
$(document).ready(function(){
 $(document).on('change', '#file', function(){
	// alert("hoiii");
	 //return false;
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"<?php echo base_url("index.php/Credit_manager_user/upload_tagging_photoes"); ?>",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
        //$('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
        // $('#uploaded_image').html(data);
		var obj =JSON.parse(data);
		
		if(obj.result=='success')
		{ swal("success!", "image Uploded successfully!", "success").then(function() {
                                   //window.location.replace("/dsa/dsa/index.php/customer/customer_documents?UID="+parsed_data.UID);
								   //alert("hhh");
								   '<img src="dsa/dsa/'.obj.file_path.'" height="150" width="225" class="img-thumbnail" />';
								  // $("#section2").load("#section2");
                                  });
			
		}

    }

   });
  }
 });
});
</script>
	<script src="<?php echo base_url()?>adminn/PD_CSS/js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url()?>adminn/PD_CSS/js/jquery.steps.js"></script>
	<script src="<?php echo base_url()?>adminn/PD_CSS/js/main.js"></script>
</body>
</html>
