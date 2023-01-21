<?php 
  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
  $id = $_GET['ID']; // shows id of customer
  $this->session->set_userdata("id",$id);
  $this->session->set_userdata("id1",$id1);
  $month = date('m');
  $day = date('d');
  $year = date('Y');
  $today = $year . '-' . $month . '-' . $day;
	$this->session->set_userdata("CM_ID",$CM_ID);
	$Conditions_to_Loan_Sanction_JSON = json_decode($Sanction_letter_details->Conditions_to_Loan_Sanction_JSON);
		
		//echo $this->session->userdata('ID');												
	if($Sanction_letter_details->Status == "Approved")
{
	?><input hidden type="text"  id="ID_Status"  value="yes"><?php
													
}												
															
?>

<?php
if($userType=="Cluster_credit_manager")
{
	?>

	<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>adminn/PD_CSS/css/montserrat-font.css">
    <link rel="stylesheet" href="<?php echo base_url()?>adminn/PD_CSS/css/style.css"/>
		<link href="sweetalert.css" type="text/css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
<style>
   .floating-btn
	 {
		width :50px;
		height :50px;
		background : #3949ab;
		display :flex;
		align-items:center;
		justify-content:center;
		text-decoration:none;
		color : #ffffff;
		font-size:15px;
		box-shadow:2px 2px 5px rgba(0,0,0,0.25);
		position:fixed;
		right:40px;
		z-index:1;
		bottom:60px;
		transition:background 0.25s;
		border-radius:10%;
		outline:blue;
		border:none;
		cursor:pointer;
	 }
	 .floating-btn:active{
		 background:#007D63;
	 }
   .chat-popup {
  display: none;
  position: fixed;
  bottom: 100px;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 1;
	}
	.form-container {
  max-width: 200px;
  padding: 10px;
  background-color: white;
}
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}
.form-container .btn {
  color: Black;
  padding: 12px 16px;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}
.form-container .cancel {
  background-color: red;
}
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
	<button class="material-icons floating-btn" onclick="openForm()" id="menu_button"><i class="fa fa-align-justify"></i></button>
		<div class="chat-popup" id="myForm">
 			<form class="form-container">
				<button type="button" class="close" aria-label="Close" onclick="closeForm()" style="color:red;margin-top:-5px;">
		 			<span aria-hidden="true">&times;</span>
					<br>	
 				</button>
				<ul class="c-sidebar-nav">
					<button type="button" class="btn btn-outline-info" onClick="continue_();"id="btn_continue">CONTINUE</button>
					<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#holdModal" id="btn_hold">HOLD</button>
					<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#rejectionModal" id="btn_reject">REJECT</button>
			</ul>
  	</form>
	</div>
	<body onload="myFunction(); Check_status() ;">
		<?php
		if(!empty($data_row_applied_loan))
		{
		?>
			<div class="" style="" id="border_style">
	    	<div class="row  shadow bg-white rounded margin-10 padding-15" id="border_style">
					<div class="wizard-form" >
						<div class="wizard-header"style="padding:20px;">
							</div>
							<!--<form class="form-register" action="<?php echo base_url()?>index.php/admin/save_and_continue_sanction_form_2_admin" method="post">-->
		        	  	<input type="text" name="customer_id" id="customer_id"  value="<?php echo $row->UNIQUE_CODE;?>" hidden>
					 				<input  type="text" name="dsa_id" id="dsa_id"  value="<?php if(!empty($credit_manager_data)) { echo $credit_manager_data->UNIQUE_CODE;}else {echo $CM_ID; }?>" hidden>
								 	<div id="form-total" style="padding:40px;" >
		        				<!-- SECTION 1 ---------------------------------------------------------------------------------------------------------------- -->
			   			  		<section id="section1">
							 				<b><span id='tag'></span><br><span id='tag2'></span></b>
                 			<div class="row shadow bg-white rounded margin-10 padding-15 " style="padding:25px;" >
								    		<div class="col-sm-6" >
						        			<h4 style="font-weight:800"><b>Conditions to Loan Sanction</b></h4><hr>
				            		</div>
				            	<?php
														if(!empty($Sanction_letter_details))
														{

																if($Sanction_letter_details->Letter_ID!=="")
																{
																	if($Sanction_letter_details->Status == "Approved")
																	{
																	?>
																	<div class="col-sm-3">
																		<a target='_blank' href="<?php echo base_url()?>index.php/Credit_manager_user/Sanction_Letter?ID=<?php echo $row->UNIQUE_CODE;?>"><button type="button" class="btn btn-success">SANCTION LETTER</button></a>
																			</div>
																			<div class="col-sm-3">
																		<a target='_blank' href="<?php echo base_url()?>index.php/Credit_manager_user/MITAC_pdf?ID=<?php echo $row->UNIQUE_CODE;?>"><button type="button" class="btn btn-success">MITAC LETTER</button></a>
																		</div>
																		<?php
																	}
																	else if($Sanction_letter_details->Status == "Revert")
																	{
																		?>
																			<p style="color:orange;">Status :Revert from admin</p>
																		
																		<?php
																	}
																		else if($Sanction_letter_details->Status == "Rejected")
																	{
																		?>
																			<p style="color:red;">Status :Rejected by Admin</p>
																		
																		<?php
																	}
																	else if($Sanction_letter_details->Status == "Submited for Approval")
																	{
																		?>
																			<p style="color:orange;">Status : Pending for approval </p>
																		
																		<?php
																	}

																	else
																	{
																		
																	}
																}
																else
																{
																		?>
																			<p style="color:green;"><?php echo $Sanction_letter_details->Progress ; ?> % Process Completed</p>
																		
																		<?php
																}
														}
														else
														{
																?>
																<div class="col-sm-3"></div>
																<?php
														}

				            		?>

			           
										<!----------------------------------------------------------------------------------------------------------------------- -->
													<div class="col-sm-12">	
												<h4 style="font-weight:800"><b> Approved Sanction Conditions </b></h4><hr>
												<textarea  readonly class="form-control p_tag"  row="100" name="sanction_conditions" id="sanction_conditions"  style="height:200px;"><?php if(isset($getCustomerSanction_recommendation_details)) echo $getCustomerSanction_recommendation_details->sanction_conditions;?></textarea>
				  		                     </div> 
                                            <div class="col-sm-12">		
												<h4 style="font-weight:800"><b>Approved	Legal Conditions	</b></h4><hr>								 
											    <textarea readonly class="form-control p_tag" row="100" name="legal_conditions" id="legal_conditions"  style="height:200px;"><?php if(isset($getCustomerSanction_recommendation_details)) echo $getCustomerSanction_recommendation_details->legal_conditions;?></textarea>
											</div>
											
											<div class="col-sm-12">	
												<h4 style="font-weight:800"><b> Additional Sanction Conditions </b></h4><hr>
												<textarea   class="form-control p_tag" name="additional_sanction_conditions" id="additional_sanction_conditions" type="text" row="100"  style="height:200px;"><?php if(isset($getCustomerSanction_recommendation_details)) echo $getCustomerSanction_recommendation_details->additional_sanction_conditions;?></textarea>
				  		                     </div> 
                                            <div class="col-sm-12">		
												<h4 style="font-weight:800"><b>Additional Legal Conditions	</b></h4><hr>								 
											    <textarea  class="form-control p_tag" name="additional_legal_conditions" id="additional_legal_conditions" type="text"row="100"  style="height:200px;"><?php if(isset($getCustomerSanction_recommendation_details)) echo $getCustomerSanction_recommendation_details->additional_legal_conditions;?></textarea>
											</div>
												<div class="col-sm-12">
														<p><input type="text" row="8" class="form-control" id="fist_condition" name="fist_condition" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition ;} ?>" style="font-size: 18px;"></p>
													<p><input type="text" row="8" class="form-control" id="fist_condition_2" name="fist_condition_2" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_2)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_2 ;} ?>" style="font-size: 18px;"></p>
													<p><input type="text" row="8" class="form-control" id="fist_condition_3" name="fist_condition_3" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_3)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_3 ;} ?>" style="font-size: 18px;"></p>
													<p><input type="text" row="8" class="form-control" id="fist_condition_4" name="fist_condition_4" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_4)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_4 ;} ?>" style="font-size: 18px;"></p>
													<p><input type="text" row="8" class="form-control" id="fist_condition_5" name="fist_condition_5" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_5)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_5 ;} ?>" style="font-size: 18px;"></p>
													<p><input type="text" row="8" class="form-control" id="fist_condition_6" name="fist_condition_6" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_6)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_6 ;} ?>" style="font-size: 18px;"></p>
													<p><input type="text" row="8" class="form-control" id="fist_condition_7" name="fist_condition_7" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_7)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_7 ;} ?>" style="font-size: 18px;"></p>
												
													<p><input type="text" class="form-control" id="second_condition" name="second_condition" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->second_condition)) { echo $Conditions_to_Loan_Sanction_JSON->second_condition ;}  ?>" style="font-size: 18px;"></p>
															<?php
															 if(!empty($Sanction_letter_details->more_conditions))
														 		{
														 			$array= json_decode($Sanction_letter_details->more_conditions,true);
														 		
														 			$z=0;
															foreach($array as $value) 
															{

														 	?>
														 		<p><input type="text" class="form-control" name="skill[]" value="<?php 
													if(!empty($value['more_conditions'])) { echo $value['more_conditions'];} ?>" style="font-size: 18px;"></p>
														 	<?php
														 	$z++;
														 }
														 		}
														 ?>
														 	<table class="table table-bordered" id="dynamic_field">
												<tr>
												<td><input type="text" name="skill[]"  class="form-control name_list" /></td>
												<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
												</tr>
												</table>
													<p><input type="text" class="form-control" id="third_condition" name="third_condition" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->third_condition)) { echo $Conditions_to_Loan_Sanction_JSON->third_condition ;} ?>" style="font-size: 18px;"></p>
													 
													<?php
													 if(!empty($Conditions_to_Loan_Sanction_JSON))
														 {
														 	?>
														 	 <div id="wrapper">
															<div style="overflow-x:auto;">
                                <table class="table table-bordered" id="data_table2">
																	<tr>
																		<td></td>
																	</tr>
														 	<?php
														 	$Conditions_to_Loan_Sanction_2= json_decode($Conditions_to_Loan_Sanction_JSON->needed_before_first_disbursement);
															if(!empty($Conditions_to_Loan_Sanction_2))
															{
																
															foreach($Conditions_to_Loan_Sanction_2 as $value) 
															{
																 if(!empty($value->additional_emi_comments))
															  {
															
																?>
																	<tr>
																	<td><input class = "form-control" type="text" id="additional_emi_comments" name="additional_emi_comments[]" value="<?php 	echo $value->additional_emi_comments;?>"></td>
																		</tr>
																	
																<?php
															}
															}
														}
														?>
														<tr>
															<td><input class = "form-control" type="button" class="add" onclick="add_row2();" value="Add Row" ></td>
														</tr>
																		</table>
															</div>
														</div>	
														<?php

														 }
														 else
														 {

													?>
												  <div id="wrapper">
															<div style="overflow-x:auto;">
                                <table class="table table-bordered" id="data_table2">
																	<tr>
																		<td></td>
																	</tr>
																	<tr>
																		<td><input class = "form-control" type="text" id="additional_emi_comments" name="additional_emi_comments[]"></td>
																		<td><input class = "form-control" type="button" class="add" onclick="add_row2();" value="Add Row" ></td>
																	</tr>
																</table>
															</div>
														</div>
													<?php }?>
      									
											
													<p><input type="text" class="form-control" id="fourth_condition" name="fourth_condition" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fourth_condition)) { echo $Conditions_to_Loan_Sanction_JSON->fourth_condition ;} ?> " style="font-size: 18px;"></p>
													<?php
													 if(!empty($Conditions_to_Loan_Sanction_JSON))
														 {
														 	?>
														 	 <div id="wrapper">
															<div style="overflow-x:auto;">
                                <table class="table table-bordered" id="data_table3">
																	<tr>
																		<td><p>Add Legal Documents to be submitted before Final disbursement</p></td>
																	</tr>
														 	<?php
														 	$Conditions_to_Loan_Sanction_2= json_decode($Conditions_to_Loan_Sanction_JSON->submitted_before_first_disbursement);
															if(!empty($Conditions_to_Loan_Sanction_2))
															{
															
															foreach($Conditions_to_Loan_Sanction_2 as $value) 
															{
															 if(!empty($value->additional_emi_comments))
															  {
																?>
																	<tr>
																	<td><input class = "form-control" type="text" id="additional_emi_comments_3" name="additional_emi_comments_3[]" value="<?php 	echo $value->additional_emi_comments;?>"></td>
																		</tr>
																	
																<?php
															}
															}
														}
														?>
														<tr>
															<td><input class = "form-control" type="button" class="add" onclick="add_row3();" value="Add Row" ></td>
														</tr>
																		</table>
															</div>
														</div>	
														<?php

														 }
														 else
														 {

													?>
															<div id="wrapper">
															<div style="overflow-x:auto;">
                                <table class="table table-bordered" id="data_table3">
																	<tr>
																		<td><p>Add Legal Documents to be submitted before Final disbursement</p></td>
																	</tr>
																	<tr>
																		<td><input class = "form-control" type="text" id="additional_emi_comments_3" name="additional_emi_comments_3[]"></td>
																		<td><input class = "form-control" type="button" class="add" onclick="add_row3();" value="Add Row" ></td>
																	</tr>
																</table>
															</div>
														</div>
														<?php }?>
													
													<p><input type="text" class="form-control" id="fifth_condition" name="fifth_condition" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fifth_condition)) { echo $Conditions_to_Loan_Sanction_JSON->fifth_condition ;} ?>" style="font-size: 18px;"></p>
          											
												<div class="col-sm-12">
								   				<div class="col-sm-10">
					        					<h4 style="font-weight:800"><b>Insurance</b></h4><hr>
  			            		  </div>
												</div>
												<div class="col-sm-12">
													<p>As per your interest expressed in the Application form for taking insurance cover furnished below the details of the insurance
													products/covers offered by the aforesaid Insurer</p>
                          <p>The premium amounts of the insurance products/covers are included in the Total Loan Amount Sanctioned</p>
                          <p style="margin-left: 15px;">1. Loan Shield Insurance from KOTAK LIFE INSURANCE COMPANY LTD - Premium amount is ₹</p>
                          <p style="margin-left: 15px;">2. Residential Property Insurance from KOTAK GENERAL INSURANCE COMPANY LTD - Premium amount is ₹</p>
                          <p>For more information about the insurance cover, product and terms, please read the product features carefully. The offer is forwarded to
													enable you to confirm, by signing the Application form for the above insurance covers.</p>
													<p>If you require any further clarification on your Sanctioned loan amount, please feel free to contact us and our officer/s handling your
													application will assist you.</p>
													<p><b>Note: GST charged as applicable
													For FINALEAP FINSERV PRIVATE LIMITED.</b></p>
													<br>
													<p><b>Vipul Vadhiya<br>
													CEO & Co Founder</b></p>
                          <p>• The sanctioned loan will be disbursed only after the scrutiny and clearance of property documents</p>
                          <p>• The EMIs, Pre-EMI interests are to be paid on or before 10th of every month.</p>
                          <p>• You are required to provide ECS / NACH mandate form towards payment / repayment of Pre-EMI / EMI.</p>
                          <p>• The loan will be disbursed as per the stages of construction and not necessarily, as per the builder's agreement.</p>
                          <p>• The Loan will be secured by First Mortgage of the property proposed for availing this loan and / or such other security, as may find
													necessary and acceptable. The original title deeds to the property proposed to be purchased shall be deposited by the borrower for
													securing the loan.</p>
                          <p>• In case of additional limits, the existing mortgage shall be extended to cover the proposed additional limit and / or as per the sanctioned
													conditions.</p>
                          <p>• Borrowers shall be liable to inform in writing about any changes: In correspondence address, change in employment, loss of job,
													business, profession, as the case may be immediately after such change/ loss, Notify the causes of delay, Loss / damage to the
													property, Notify the additions /alterations to the property.</p>
                          <p>• Borrowers shall be liable to inform in writing about any changes: In correspondence address, change in employment, loss of job,
													business, profession, as the case may be immediately after such change/ loss, Notify the causes of delay, Loss / damage to the
													property, Notify the additions /alterations to the property.</p>
													<p style="margin-left: 15px;">a. any material changes occur in the proposal for which this loan is, in principle sanctioned;</p>
													<p style="margin-left: 15px;">b. any material fact concerning income, or ability to repay or any other relevant aspect of the proposal or application for loan is
													withheld, suppressed, concealed or not made known at the time of availing Loan.</p>
													<p style="margin-left: 15px;">c. any statement made in the loan application is found to be incorrect or untrue.</p>
													<p>• Stamp duty, Registration Charges, as applicable from time to time, on the loan and security documents or any document/s executed
													by you shall be payable by you in full including other charges to be paid to CERSAI for Creation/Modification of Charge/Satisfaction of
													Charge, as applicable from time to time.</p>
													<p>• You are also required to pay other applicable charges as per the tariff schedule.</p>
													<p>• The issuance of this letter of offer, does not give/confer any legal rights and Finaleap Finserv Private Limited will be at full liberty to
													revoke this offer, due to any of the reasons mentioned above or otherwise.</p>
													<p>• The rate of interest, mentioned in the letter of offer, is based on the current FFPL PLR. The same may vary during the tenure of the
													loan due to which the number of EMI’s are liable to vary.</p>
													<p>• This Letter of offer is valid for a period of 60 days from date of Original Sanction.</p>
													<p>• Processing and Other Fees paid by you is non-refundable.</p>
													<br>
													<p><b>I/We accept the terms and conditions of this letter of offer</b><p>

													<br>
													<br>
												


												</div>
												
												</div>

												<?php 
													 if(!empty($Sanction_letter_details->Insurance_condsidaration))
													 {


																$insurance_json = json_decode($Sanction_letter_details->Insurance_condsidaration);
														   // echo  $insurance_json[0]->applicant_name;
												       // echo  $insurance_json[0]->applicant_insurance;

												        $count=count($insurance_json)-1;
															
															//  for($i=1;$i<=$count;$i++)
															//	{

																//	echo $insurance_json[$i]->coapplicant_name;
																//	echo $insurance_json[$i]->coapplicant_insurance;
																
															//	}
															//	exit();




													 		?>
													 			<div class="col-sm-12">
													<table class="table table-bordered">
													<tbody>
														<tr>
															<th>NAME</th>
															<th>Insurance Applicable</th>
														</tr>
														<tr>
															<td><input type="text" class="form-control" id="applicant_name" name="applicant_name" value="<?php echo $insurance_json[0]->applicant_name;?>" required></td>
															<td>
																<select class="form-control"  id="applicant_insurance" name="applicant_insurance" >
																	<option value="yes" <?php if( $insurance_json[0]->applicant_insurance == 'yes') echo ' selected="selected"'; ?>>Yes</option>
																	<option value="no" <?php if( $insurance_json[0]->applicant_insurance == 'no') echo ' selected="selected"'; ?>>No</option>
																</select>
															</td>
														</tr>
														<?php
												 		
																   for($i=1;$i<=$count;$i++)
																{
														?>
															<tr>
															<td><input type="text" class="form-control" id="coapplicant_name" name="coapplicant_name[]" 
																value="<?php echo $insurance_json[$i]->coapplicant_name; ?>" required></td>
															<td>
																<select class="form-control" id="coapplicant_insurance" name="coapplicant_insurance[]">
																	<option value="yes" <?php if( $insurance_json[$i]->coapplicant_insurance == 'no') echo ' selected="selected"'; ?>>Yes</option>
																	<option value="no" <?php if( $insurance_json[$i]->coapplicant_insurance == 'no') echo ' selected="selected"'; ?>>No</option>
																</select>
															</td>
														</tr>

														<?php  
																		}
															
														?>
													</tbody>
												</table>
											</div>	
													 		<?php
													 }
													 else
													 {
													?>
														<div class="col-sm-12">
													<table class="table table-bordered">
													<tbody>
														<tr>
															<th>NAME</th>
															<th>Insurance Applicable</th>
														</tr>
														<tr>
															<td><input type="text" class="form-control" id="applicant_name" name="applicant_name" value="<?php if(!empty($row)) { if(!empty($row)) echo $row->FN." ".$row->LN; }?>" required></td>
															<td>
																<select class="form-control"  id="applicant_insurance" name="applicant_insurance" >
																	<option value="yes">Yes</option>
																	<option value="no">No</option>
																</select>
															</td>
														</tr>
														<?php
												 			if(isset($coapplicants))  
																{
																  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																		{ 
														?>
															<tr>
															<td><input type="text" class="form-control" id="coapplicant_name" name="coapplicant_name[]" value="<?php if(!empty($row)) { if(!empty($row)) echo $coapplicant->FN." ".$coapplicant->LN; }?>" required></td>
															<td>
																<select class="form-control" id="coapplicant_insurance" name="coapplicant_insurance[]">
																	<option value="yes">Yes</option>
																	<option value="no">No</option>
																</select>
															</td>
														</tr>

														<?php   $i++;
																		}
																}
														?>
													</tbody>
												</table>
											</div>	
													<?php
													 }
												?>
																				
												<br>
												<input hidden type="text"  id="LOGIN_CREDIT_MANAGER_ID" value="<?php echo $CM_ID;?>">
<?php


 if($userType == "ADMIN")
 {

?>
										<div class="col-sm-12">
								   				<div class="col-sm-10">
					        					<h4 style="font-weight:800"><b>Admin Comments </b></h4><hr>
  			            		  </div>

												</div>
													<div class="col-sm-12" style="margin-bottom: 10px;">
								   				<div class="col-sm-12">
					        					<textarea class="form-control" row="3" name="admin_comments" id="admin_comments"><?php echo $Sanction_letter_details->admin_comments; ?></textarea>
  			            		  </div>
  			            		  
												</div>
								<?php }
								?>
												<br>	<br>
   
	<?php
														if(!empty($Sanction_letter_details))
														{

																if($Sanction_letter_details->Letter_ID!=="")
																{
																	if($Sanction_letter_details->Status == "Approved")
																	{
																	?>
																     	<div class="col-sm-12" style="">
																							<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" >Approved</button>
								     										</div>
																	
																		<?php
																	}
																	else if($Sanction_letter_details->Status == "Revert")
																	{
																		?>

																		<div class="col-sm-12" style="">
																							<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" >Send for revert</button>								     										</div>
																		<?php
																	}
																	else if($Sanction_letter_details->Status == "Rejected")
																	{
																		?>
																			<div class="col-sm-12" style="">
																						<button class="login100-form-btn" style="font-weight:700;background-color:red;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" >Rejected</button>
								     										</div>
																			<?php
																	}
																	else if($Sanction_letter_details->Status == "Submited for Approval")
																	{
																		?>

																		<div class="col-sm-12" style="">
																		 	<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="approved" id="approved"  onclick="approved()">Approved</button>
																			</div>
																			<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="revert" id="revert" onclick="revert()">Revert</button>
																			</div>
																			<div class="col-sm-4">
																			<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="reject" id="reject" onclick="reject()">Reject</button>
																			</div>
				     										</div>

																
																		<?php
																	}
																	else
																	{
																		?>
												          <div class="col-sm-12" style="">
																		 	<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="approved" id="approved"  onclick="approved()">Approved</button>
																			</div>
																			<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="revert" id="revert" onclick="revert()">Revert</button>
																			</div>
																			<div class="col-sm-4">
																			<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="reject" id="reject" onclick="reject()">Reject</button>
																			</div>
				     										</div>

																		
																		<?php
																	}
																}
																else
																{
																		?>
																			
							     										<div class="col-sm-12" style="">
																		 	<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="approved" id="approved"  onclick="approved()">Approved</button>
																			</div>
																			<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="revert" id="revert" onclick="revert()">Revert</button>
																			</div>
																			<div class="col-sm-4">
																			<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="reject" id="reject" onclick="reject()">Reject</button>
																			</div>
				     										</div>

																		<?php
																}
														}
														else
														{
																?>
													
							     										<div class="col-sm-12" style="">
																		 	<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="approved" id="approved"  onclick="approved_CCM()">Approved</button>
																			</div>
																			<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="revert" id="revert" onclick="revert_CCM()">Revert</button>
																			</div>
																			<div class="col-sm-4">
																			<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="reject" id="reject" onclick="reject_CCM()">Reject</button>
																			</div>
				     										</div>

																<?php
														}

				            		?>



				            		 
								
     									<!--</form>-->
			              </section>
					       	</div>

		            </div>
		          </div>
	          </div>
	        <?php
          }
					else 
					{
					?>
  			  <div class="row  shadow bg-white rounded margin-10 padding-15">
		 				<div class="wizard-form">
						  <div id="form-total" style="padding:40px;">
		        		<!-- SECTION 1 ---------------------------------------------------------------------------------------------------------------- -->
			   	      <section id="section1">
					        <div class="col-sm-12">
					          <h4 style="font-weight:800"><b>Loan Application is not submitted by  CUSTOMER - <?php echo $row->FN." ".$row->LN;?></b></h4><hr>
   	              </div>
							  </section>
							</div>
		 				</div>
	  			</div>
  				<?php
					}
					?>

								<div class="modal fade" id="rejectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Add reason for rejection</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
											<textarea class = "form-control" rows = "3" name="rejectReason" id="rejectReason" placeholder="Write something.."></textarea>
        	    					
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary" onclick="reject()">Save changes</button>
									  </div>
									</div>
								  </div>
								</div>

								<div class="modal fade" id="holdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Add reason for holding application</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
									    	<textarea class = "form-control" rows = "3" name="holdReason" id="holdReason" placeholder="Write something.." ></textarea>
        	    		  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary" onclick="hold()">Save changes</button>
									  </div>
									</div>
								  </div>
								</div>
</body>
</html>
<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
	i++;
	$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="skill[]" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
$(document).on('click', '.btn_remove', function(){
var button_id = $(this).attr("id"); 
$('#row'+button_id+'').remove();
	});
});
</script>
<script>
function edit_row2(no)
{
 	document.getElementById("edit_button"+no).style.display="none";
 	document.getElementById("save_button"+no).style.display="block";
  var additional_emi_comments=document.getElementById("additional_emi_comments_row"+no);
  var additional_emi_comments_data=additional_emi_comments.innerHTML;
  additional_emi_comments.innerHTML="<input type='text' id='additional_emi_comments_text"+no+"' name='additional_emi_comments[]' value='"+additional_emi_comments_data+"'>";
}
function save_row2(no)
{
  var additional_emi_comments_val=document.getElementById("additional_emi_comments_text"+no).value;
  document.getElementById("additional_emi_comments_row"+no).innerHTML=additional_emi_comments_val;
  document.getElementById("edit_button"+no).style.display="block";
  document.getElementById("save_button"+no).style.display="none";
}
function delete_row2(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}
function add_row2()
{
 var new_additional_emi_comments=document.getElementById("additional_emi_comments").value;
 var table=document.getElementById("data_table2");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td><input class = 'form-control' name='additional_emi_comments[]' type='text' id='additional_emi_comments_row"+table_len+"' value='"+new_additional_emi_comments+"'></td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row2("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row2("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row2("+table_len+")'></td></tr>";
  document.getElementById("additional_emi_comments").value="";
}
</script>

<script>
function edit_row3(no)
{
 	document.getElementById("edit_button"+no).style.display="none";
 	document.getElementById("save_button"+no).style.display="block";
  var additional_emi_comments=document.getElementById("additional_emi_comments_3_row"+no);
  var additional_emi_comments_data=additional_emi_comments.innerHTML;
  additional_emi_comments.innerHTML="<input type='text' id='additional_emi_comments_3"+no+"' name='additional_emi_comments_3[]' value='"+additional_emi_comments_data+"'>";
}
function save_row3(no)
{
  var additional_emi_comments_val=document.getElementById("additional_emi_comments_3"+no).value;
  document.getElementById("additional_emi_comments_3_row"+no).innerHTML=additional_emi_comments_val;
  document.getElementById("edit_button"+no).style.display="block";
  document.getElementById("save_button"+no).style.display="none";
}
function delete_row3(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}
function add_row3()
{
 var new_additional_emi_comments=document.getElementById("additional_emi_comments_3").value;
 var table=document.getElementById("data_table3");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td><input class = 'form-control' name='additional_emi_comments_3[]' type='text' id='additional_emi_comments_3_row"+table_len+"' value='"+new_additional_emi_comments+"'></td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row3("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row3("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row3("+table_len+")'></td></tr>";
  document.getElementById("additional_emi_comments_3").value="";
}
</script>


	 <script>
								function openForm() {
								  document.getElementById("myForm").style.display = "block";
								}

								function closeForm() {
								  document.getElementById("myForm").style.display = "none";
								}

						function hold() 
						{
					
						 var User_ID = document.getElementById('customer_id').value;
						 var holdReason ="Application is on HOLD in PD From One because : "+ document.getElementById('holdReason').value;
						 var dsa_id = document.getElementById('dsa_id').value;
						 if(holdReason=='')
										{
											swal("warning!", "Please Enter Reason for holding application", "warning");
										    return false;
										}
								$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/HOLD_CUSTOMER_APPLICATION"); ?>',
									    data:{
										'User_ID':User_ID,
										'Action':"HOLD",
										'Reason':holdReason,
										'dsa_id':dsa_id,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
								
											if(obj.msg=='success')
											{
											     swal("success!", "Status added successfully", "success").then( function() {   window.location.replace("/finserv_test/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
												
											}
						                }
                                    });
		
						}

						function reject() 
						{
							var User_ID = document.getElementById('customer_id').value;
							var rejectReason = "Application is rejected in PD From One because : " +document.getElementById('rejectReason').value;
							var dsa_id = document.getElementById('dsa_id').value;
					    	if(rejectReason=='')
										{
											swal("warning!", "Please Enter Reason for rejecting application", "warning");
										    return false;
										}
						 	$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/REJECT_CUSTOMER_APPLICATION"); ?>',
									    data:{
										'User_ID':User_ID,
										'Action':"REJECT",
										'Reason':rejectReason,
										'dsa_id':dsa_id,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
												
												  swal("success!", "Status added successfully", "success").then( function() {   window.location.replace("/finserv_test/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
											}
						                }
                                    });
						}

						function continue_()
						{
							 var User_ID = document.getElementById('customer_id').value;
						 	 var dsa_id = document.getElementById('dsa_id').value;

							 $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/CONTINUE_CUSTOMER_APPLICATION"); ?>',
									    data:{
										'User_ID':User_ID,
										'Action':"CONTINUE",
										'dsa_id':dsa_id,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
											
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/finserv_test/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
												
											}
						                }
                                    });

						}

						</script>
						<script>
						function Check_status()
						{
						
							var User_ID = document.getElementById('customer_id').value;
							$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/onload_check_status"); ?>',
									    data:{
										'User_ID':User_ID,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);

									
											if(obj.msg=='HOLD')
											{
												$('#border_style').css("border","2px solid yellow");
													document.getElementById('tag').innerHTML = "Status added by : "+obj.action_by;
													document.getElementById('tag2').innerHTML = " Reason : "+obj.reason;
											
												var word = "PD From One";
												var mystring =obj.reason;
 
										
												 var incStr = mystring.includes(word);
											      if(incStr!= false)
												{
														$('input[type="text"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="email"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="number"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="date"]').each(function(){
												   $(this).attr('readonly','readonly');
												});

													$('#save_and_continue').hide();
													
												} 
											

											}
											else if(obj.msg=='REJECT')
											{
											
												$('#border_style').css("border","2px solid red");
												document.getElementById('tag').innerHTML = "Status added by  : "+obj.action_by;
												document.getElementById('tag2').innerHTML = " Reason : "+obj.reason;
												var word = "PD From One";
												var mystring =obj.reason;
 
											// Test if string contains the word 
												 var incStr = mystring.includes(word);
											      if(incStr!= false)
												{
													$('input[type="text"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="email"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="number"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="date"]').each(function(){
												   $(this).attr('readonly','readonly');
												});

													$('#save_and_continue').hide();
												
													
												} 
											
														
												  $('#btn_hold').hide();
												  $('#btn_continue').hide();
												
											
									
											}
											else if(obj.msg=='CONTINUE')
											{
													$('#border_style').css("border","2px solid blue");
													
											}
						                }
                                    });

						}


						function approved_CCM() 
						{
							 var User_ID = document.getElementById('customer_id').value;
						 	 var dsa_id = document.getElementById('dsa_id').value;
						 	 	 var admin_comments = document.getElementById('admin_comments').value;

						 	 
					
							 $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/admin/Sanction_letter_status_CCM"); ?>',
									    data:{
										'User_ID':User_ID,
										'Status':"approved",
										'dsa_id':dsa_id,
										'admin_comments':admin_comments,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
											
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/finserv_test/dsa/dsa/index.php/Admin/Sanction_cum_acceptance_letter_admin?ID="+obj.customer_id+"&CM="+obj.CM_ID); });
									
												
											}
						                }
                                    });
						}
					function revert_CCM() 
						{
							 var User_ID = document.getElementById('customer_id').value;
						 	 var dsa_id = document.getElementById('dsa_id').value; //admin_comments
						 	 var admin_comments = document.getElementById('admin_comments').value;
					     if(admin_comments == '')
					     {
					     	swal("warning!", "Please add comments", "warning");
										    return false;
					     }
							 $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/admin/Sanction_letter_status_CCM"); ?>',
									    data:{
										'User_ID':User_ID,
										'Status':"Revert",
										'dsa_id':dsa_id,
										'admin_comments':admin_comments,

										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
											
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/finserv_test/dsa/dsa/index.php/Admin/Sanction_cum_acceptance_letter_admin?ID="+obj.customer_id+"&CM="+obj.CM_ID); });
									
												
											}
						                }
                                    });
						}
						function reject_CCM() 
						{
							 var User_ID = document.getElementById('customer_id').value;
						 	 var dsa_id = document.getElementById('dsa_id').value;
						 	 	 var admin_comments = document.getElementById('admin_comments').value;
					
   if(admin_comments == '')
								{
									swal("warning!", "Please Enter Reason for rejecting sanction letter", "warning");
													    return false;
								}
							 $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/admin/Sanction_letter_status_CCM"); ?>',
									    data:{
										'User_ID':User_ID,
										'Status':"Rejected",
										'dsa_id':dsa_id,
										'admin_comments':admin_comments,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
											
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/finserv_test/dsa/dsa/index.php/Admin/Sanction_cum_acceptance_letter_admin?ID="+obj.customer_id+"&CM="+obj.CM_ID); });
									
												
											}
						                }
                                    });
						}

						</script>

	<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
		<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
							<!--[if IE]><!--><!--<![endif]-->
							<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
							<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
						


	<?php
}
else //=========================== ++++++++++++++++++++++++++++++++++++++ &&&&&&&&&&&&&&&&&&&
{
	?>
	<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>adminn/PD_CSS/css/montserrat-font.css">
    <link rel="stylesheet" href="<?php echo base_url()?>adminn/PD_CSS/css/style.css"/>
		<link href="sweetalert.css" type="text/css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
<style>
   .floating-btn
	 {
		width :50px;
		height :50px;
		background : #3949ab;
		display :flex;
		align-items:center;
		justify-content:center;
		text-decoration:none;
		color : #ffffff;
		font-size:15px;
		box-shadow:2px 2px 5px rgba(0,0,0,0.25);
		position:fixed;
		right:40px;
		z-index:1;
		bottom:60px;
		transition:background 0.25s;
		border-radius:10%;
		outline:blue;
		border:none;
		cursor:pointer;
	 }
	 .floating-btn:active{
		 background:#007D63;
	 }
   .chat-popup {
  display: none;
  position: fixed;
  bottom: 100px;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 1;
	}
	.form-container {
  max-width: 200px;
  padding: 10px;
  background-color: white;
}
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}
.form-container .btn {
  color: Black;
  padding: 12px 16px;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}
.form-container .cancel {
  background-color: red;
}
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
	<button class="material-icons floating-btn" onclick="openForm()" id="menu_button"><i class="fa fa-align-justify"></i></button>
		<div class="chat-popup" id="myForm">
 			<form class="form-container">
				<button type="button" class="close" aria-label="Close" onclick="closeForm()" style="color:red;margin-top:-5px;">
		 			<span aria-hidden="true">&times;</span>
					<br>	
 				</button>
				<ul class="c-sidebar-nav">
					<button type="button" class="btn btn-outline-info" onClick="continue_();"id="btn_continue">CONTINUE</button>
					<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#holdModal" id="btn_hold">HOLD</button>
					<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#rejectionModal" id="btn_reject">REJECT</button>
			</ul>
  	</form>
	</div>
	<body onload="myFunction(); Check_status() ;">
		<?php
		if(!empty($data_row_applied_loan))
		{
		?>
			<div class="" style="" id="border_style">
	    	<div class="row  shadow bg-white rounded margin-10 padding-15" id="border_style">
					<div class="wizard-form" >
						<div class="wizard-header"style="padding:20px;">
							</div>
								<input type="text" name="customer_id" id="customer_id"  value="<?php echo $row->UNIQUE_CODE;?>" hidden>
					 				<input  type="text" name="dsa_id" id="dsa_id"  value="<?php if(!empty($credit_manager_data)) { echo $credit_manager_data->UNIQUE_CODE;}else {echo $CM_ID; }?>" hidden>
								 	<div id="form-total" style="padding:40px;" >
		        				<!-- SECTION 1 ---------------------------------------------------------------------------------------------------------------- -->
			   			  		<section id="section1">
							 				<b><span id='tag'></span><br><span id='tag2'></span></b>
                 			<div class="row shadow bg-white rounded margin-10 padding-15 " style="padding:25px;" >
								    		<div class="col-sm-6" >
						        			<h4 style="font-weight:800"><b>Conditions to Loan Sanction</b></h4><hr>
				            		</div>
				            	<?php
														if(!empty($Sanction_letter_details))
														{

																if($Sanction_letter_details->Letter_ID!=="")
																{
																	if($Sanction_letter_details->Status == "Approved")
																	{
																	?>
																	<div class="col-sm-3">
																		<a target='_blank' href="<?php echo base_url()?>index.php/Credit_manager_user/Sanction_Letter?ID=<?php echo $row->UNIQUE_CODE;?>"><button type="button" class="btn btn-success">SANCTION LETTER</button></a>
																			</div>
																			<div class="col-sm-3">
																		<a target='_blank' href="<?php echo base_url()?>index.php/Credit_manager_user/MITAC_pdf?ID=<?php echo $row->UNIQUE_CODE;?>"><button type="button" class="btn btn-success">MITAC LETTER</button></a>
																		</div>
																		<?php
																	}
																	else if($Sanction_letter_details->Status == "Revert")
																	{
																		?>
																			<p style="color:orange;">Status :Revert from admin</p>
																		
																		<?php
																	}
																		else if($Sanction_letter_details->Status == "Rejected")
																	{
																		?>
																			<p style="color:red;">Status :Rejected by Admin</p>
																		
																		<?php
																	}
																	else if($Sanction_letter_details->Status == "Submited for Approval")
																	{
																		?>
																			<p style="color:orange;">Status : Pending for approval </p>
																		
																		<?php
																	}

																	else
																	{
																		
																	}
																}
																else
																{
																		?>
																			<p style="color:green;"><?php echo $Sanction_letter_details->Progress ; ?> % Process Completed</p>
																		
																		<?php
																}
														}
														else
														{
																?>
																<div class="col-sm-3"></div>
																<?php
														}

				            		?>

			           
										<!----------------------------------------------------------------------------------------------------------------------- -->
														<div class="col-sm-12">	
												<h4 style="font-weight:800"><b> Approved Sanction Conditions </b></h4><hr>
												<textarea   class="form-control p_tag"  row="100" name="sanction_conditions" id="sanction_conditions"  style="height:200px;"><?php if(isset($getCustomerSanction_recommendation_details)) echo $getCustomerSanction_recommendation_details->sanction_conditions;?></textarea>
				  		                     </div> 
                                            <div class="col-sm-12">		
												<h4 style="font-weight:800"><b>Approved	Legal Conditions	</b></h4><hr>								 
											    <textarea  class="form-control p_tag" row="100" name="legal_conditions" id="legal_conditions"  style="height:200px;"><?php if(isset($getCustomerSanction_recommendation_details)) echo $getCustomerSanction_recommendation_details->legal_conditions;?></textarea>
											</div>
											
											<div class="col-sm-12">	
												<h4 style="font-weight:800"><b> Additional Sanction Conditions </b></h4><hr>
												<textarea   class="form-control p_tag" name="additional_sanction_conditions" id="additional_sanction_conditions" type="text" row="100"  style="height:200px;"><?php if(isset($getCustomerSanction_recommendation_details)) echo $getCustomerSanction_recommendation_details->additional_sanction_conditions;?></textarea>
				  		                     </div> 
                                            <div class="col-sm-12">		
												<h4 style="font-weight:800"><b>Additional Legal Conditions	</b></h4><hr>								 
											    <textarea  class="form-control p_tag" name="additional_legal_conditions" id="additional_legal_conditions" type="text"row="100"  style="height:200px;"><?php if(isset($getCustomerSanction_recommendation_details)) echo $getCustomerSanction_recommendation_details->additional_legal_conditions;?></textarea>
											</div>
												<div class="col-sm-12">
														<p><input type="text" row="8" class="form-control" id="fist_condition" name="fist_condition" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition ;} ?>" style="font-size: 18px;"></p>
													<p><input type="text" row="8" class="form-control" id="fist_condition_2" name="fist_condition_2" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_2)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_2 ;} ?>" style="font-size: 18px;"></p>
													<p><input type="text" row="8" class="form-control" id="fist_condition_3" name="fist_condition_3" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_3)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_3 ;} ?>" style="font-size: 18px;"></p>
													<p><input type="text" row="8" class="form-control" id="fist_condition_4" name="fist_condition_4" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_4)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_4 ;} ?>" style="font-size: 18px;"></p>
													<p><input type="text" row="8" class="form-control" id="fist_condition_5" name="fist_condition_5" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_5)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_5 ;} ?>" style="font-size: 18px;"></p>
													<p><input type="text" row="8" class="form-control" id="fist_condition_6" name="fist_condition_6" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_6)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_6 ;} ?>" style="font-size: 18px;"></p>
													<p><input type="text" row="8" class="form-control" id="fist_condition_7" name="fist_condition_7" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fist_condition_7)) { echo $Conditions_to_Loan_Sanction_JSON->fist_condition_7 ;} ?>" style="font-size: 18px;"></p>
												
													<p><input type="text" class="form-control" id="second_condition" name="second_condition" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->second_condition)) { echo $Conditions_to_Loan_Sanction_JSON->second_condition ;}  ?>" style="font-size: 18px;"></p>
															<?php
															 if(!empty($Sanction_letter_details->more_conditions))
														 		{
														 			$array= json_decode($Sanction_letter_details->more_conditions,true);
														 		
														 			$z=0;
															foreach($array as $value) 
															{

														 	?>
														 		<p><input type="text" class="form-control" name="skill[]" value="<?php 
													if(!empty($value['more_conditions'])) { echo $value['more_conditions'];} ?>" style="font-size: 18px;"></p>
														 	<?php
														 	$z++;
														 }
														 		}
														 ?>
														 	<table class="table table-bordered" id="dynamic_field">
												<tr>
												<td><input type="text" name="skill[]"  class="form-control name_list" /></td>
												<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
												</tr>
												</table>
													<p><input type="text" class="form-control" id="third_condition" name="third_condition" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->third_condition)) { echo $Conditions_to_Loan_Sanction_JSON->third_condition ;} ?>" style="font-size: 18px;"></p>
													 
													<?php
													 if(!empty($Conditions_to_Loan_Sanction_JSON))
														 {
														 	?>
														 	 <div id="wrapper">
															<div style="overflow-x:auto;">
                                <table class="table table-bordered" id="data_table2">
																	<tr>
																		<td></td>
																	</tr>
														 	<?php
														 	$Conditions_to_Loan_Sanction_2= json_decode($Conditions_to_Loan_Sanction_JSON->needed_before_first_disbursement);
															if(!empty($Conditions_to_Loan_Sanction_2))
															{
																
															foreach($Conditions_to_Loan_Sanction_2 as $value) 
															{
																 if(!empty($value->additional_emi_comments))
															  {
															
																?>
																	<tr>
																	<td><input class = "form-control" type="text" id="additional_emi_comments" name="additional_emi_comments[]" value="<?php 	echo $value->additional_emi_comments;?>"></td>
																		</tr>
																	
																<?php
															}
															}
														}
														?>
														<tr>
															<td><input class = "form-control" type="button" class="add" onclick="add_row2();" value="Add Row" ></td>
														</tr>
																		</table>
															</div>
														</div>	
														<?php

														 }
														 else
														 {

													?>
												  <div id="wrapper">
															<div style="overflow-x:auto;">
                                <table class="table table-bordered" id="data_table2">
																	<tr>
																		<td></td>
																	</tr>
																	<tr>
																		<td><input class = "form-control" type="text" id="additional_emi_comments" name="additional_emi_comments[]"></td>
																		<td><input class = "form-control" type="button" class="add" onclick="add_row2();" value="Add Row" ></td>
																	</tr>
																</table>
															</div>
														</div>
													<?php }?>
      									
											
													<p><input type="text" class="form-control" id="fourth_condition" name="fourth_condition" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fourth_condition)) { echo $Conditions_to_Loan_Sanction_JSON->fourth_condition ;} ?> " style="font-size: 18px;"></p>
													<?php
													 if(!empty($Conditions_to_Loan_Sanction_JSON))
														 {
														 	?>
														 	 <div id="wrapper">
															<div style="overflow-x:auto;">
                                <table class="table table-bordered" id="data_table3">
																	<tr>
																		<td><p>Add Legal Documents to be submitted before Final disbursement</p></td>
																	</tr>
														 	<?php
														 	$Conditions_to_Loan_Sanction_2= json_decode($Conditions_to_Loan_Sanction_JSON->submitted_before_first_disbursement);
															if(!empty($Conditions_to_Loan_Sanction_2))
															{
															
															foreach($Conditions_to_Loan_Sanction_2 as $value) 
															{
															 if(!empty($value->additional_emi_comments))
															  {
																?>
																	<tr>
																	<td><input class = "form-control" type="text" id="additional_emi_comments_3" name="additional_emi_comments_3[]" value="<?php 	echo $value->additional_emi_comments;?>"></td>
																		</tr>
																	
																<?php
															}
															}
														}
														?>
														<tr>
															<td><input class = "form-control" type="button" class="add" onclick="add_row3();" value="Add Row" ></td>
														</tr>
																		</table>
															</div>
														</div>	
														<?php

														 }
														 else
														 {

													?>
															<div id="wrapper">
															<div style="overflow-x:auto;">
                                <table class="table table-bordered" id="data_table3">
																	<tr>
																		<td><p>Add Legal Documents to be submitted before Final disbursement</p></td>
																	</tr>
																	<tr>
																		<td><input class = "form-control" type="text" id="additional_emi_comments_3" name="additional_emi_comments_3[]"></td>
																		<td><input class = "form-control" type="button" class="add" onclick="add_row3();" value="Add Row" ></td>
																	</tr>
																</table>
															</div>
														</div>
														<?php }?>
													
													<p><input type="text" class="form-control" id="fifth_condition" name="fifth_condition" value="<?php 
													if(!empty($Conditions_to_Loan_Sanction_JSON->fifth_condition)) { echo $Conditions_to_Loan_Sanction_JSON->fifth_condition ;} ?>" style="font-size: 18px;"></p>
          											
												<div class="col-sm-12">
								   				<div class="col-sm-10">
					        					
  			            		  </div>
												</div>
										
												
												</div>

												<?php 
													 if(!empty($Sanction_letter_details->Insurance_condsidaration))
													 {


																$insurance_json = json_decode($Sanction_letter_details->Insurance_condsidaration);
														   // echo  $insurance_json[0]->applicant_name;
												       // echo  $insurance_json[0]->applicant_insurance;

												        $count=count($insurance_json)-1;
															
															//  for($i=1;$i<=$count;$i++)
															//	{

																//	echo $insurance_json[$i]->coapplicant_name;
																//	echo $insurance_json[$i]->coapplicant_insurance;
																
															//	}
															//	exit();




													 		?>
													 			<div class="col-sm-12">
													<table class="table table-bordered">
													<tbody>
														<tr>
															<th>NAME</th>
															<th>Insurance Applicable</th>
														</tr>
														<tr>
															<td><input type="text" class="form-control" id="applicant_name" name="applicant_name" value="<?php echo $insurance_json[0]->applicant_name;?>" required></td>
															<td>
																<select class="form-control"  id="applicant_insurance" name="applicant_insurance" >
																	<option value="yes" <?php if( $insurance_json[0]->applicant_insurance == 'yes') echo ' selected="selected"'; ?>>Yes</option>
																	<option value="no" <?php if( $insurance_json[0]->applicant_insurance == 'no') echo ' selected="selected"'; ?>>No</option>
																</select>
															</td>
														</tr>
														<?php
												 		
																   for($i=1;$i<=$count;$i++)
																{
														?>
															<tr>
															<td><input type="text" class="form-control" id="coapplicant_name" name="coapplicant_name[]" 
																value="<?php echo $insurance_json[$i]->coapplicant_name; ?>" required></td>
															<td>
																<select class="form-control" id="coapplicant_insurance" name="coapplicant_insurance[]">
																	<option value="yes" <?php if( $insurance_json[$i]->coapplicant_insurance == 'no') echo ' selected="selected"'; ?>>Yes</option>
																	<option value="no" <?php if( $insurance_json[$i]->coapplicant_insurance == 'no') echo ' selected="selected"'; ?>>No</option>
																</select>
															</td>
														</tr>

														<?php  
																		}
															
														?>
													</tbody>
												</table>
											</div>	
													 		<?php
													 }
													 else
													 {
													?>
														<div class="col-sm-12">
													<table class="table table-bordered">
													<tbody>
														<tr>
															<th>NAME</th>
															<th>Insurance Applicable</th>
														</tr>
														<tr>
															<td><input type="text" class="form-control" id="applicant_name" name="applicant_name" value="<?php if(!empty($row)) { if(!empty($row)) echo $row->FN." ".$row->LN; }?>" required></td>
															<td>
																<select class="form-control"  id="applicant_insurance" name="applicant_insurance" >
																	<option value="yes">Yes</option>
																	<option value="no">No</option>
																</select>
															</td>
														</tr>
														<?php
												 			if(isset($coapplicants))  
																{
																  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																		{ 
														?>
															<tr>
															<td><input type="text" class="form-control" id="coapplicant_name" name="coapplicant_name[]" value="<?php if(!empty($row)) { if(!empty($row)) echo $coapplicant->FN." ".$coapplicant->LN; }?>" required></td>
															<td>
																<select class="form-control" id="coapplicant_insurance" name="coapplicant_insurance[]">
																	<option value="yes">Yes</option>
																	<option value="no">No</option>
																</select>
															</td>
														</tr>

														<?php   $i++;
																		}
																}
														?>
													</tbody>
												</table>
											</div>	
													<?php
													 }
												?>
																				
												<br>
												<input hidden type="text"  id="LOGIN_CREDIT_MANAGER_ID" value="<?php echo $CM_ID;?>">
<?php


 if($userType == "ADMIN")
 {

?>
										<div class="col-sm-12">
								   				<div class="col-sm-10">
					        					<h4 style="font-weight:800"><b>Admin Comments </b></h4><hr>
  			            		  </div>

												</div>
													<div class="col-sm-12" style="margin-bottom: 10px;">
								   				<div class="col-sm-12">
					        					<textarea class="form-control" row="3" name="admin_comments" id="admin_comments"><?php echo $Sanction_letter_details->admin_comments; ?></textarea>
  			            		  </div>
  			            		  
												</div>
								<?php }
								?>
												<br>	<br>
   
	<?php
														if(!empty($Sanction_letter_details))
														{

																if($Sanction_letter_details->Letter_ID!=="")
																{
																	if($Sanction_letter_details->Status == "Approved")
																	{
																	?>
																     	<div class="col-sm-12" style="">
																							<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" >Approved</button>
								     										</div>
																	
																		<?php
																	}
																	else if($Sanction_letter_details->Status == "Revert")
																	{
																		?>

																		<div class="col-sm-12" style="">
																							<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" >Send for revert</button>								     										</div>
																		<?php
																	}
																	else if($Sanction_letter_details->Status == "Rejected")
																	{
																		?>
																			<div class="col-sm-12" style="">
																						<button class="login100-form-btn" style="font-weight:700;background-color:red;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" >Rejected</button>
								     										</div>
																			<?php
																	}
																	else if($Sanction_letter_details->Status == "Submited for Approval")
																	{
																		?>

																		<div class="col-sm-12" style="">
																		 	<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="approved" id="approved"  onclick="approved()">Approved</button>
																			</div>
																			<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="revert" id="revert" onclick="revert()">Revert</button>
																			</div>
																			<div class="col-sm-4">
																			<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="reject" id="reject" onclick="reject()">Reject</button>
																			</div>
				     										</div>

																
																		<?php
																	}
																	else
																	{
																		?>
												          <div class="col-sm-12" style="">
																		 	<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="approved" id="approved"  onclick="approved()">Approved</button>
																			</div>
																			<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="revert" id="revert" onclick="revert()">Revert</button>
																			</div>
																			<div class="col-sm-4">
																			<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="reject" id="reject" onclick="reject()">Reject</button>
																			</div>
				     										</div>

																		
																		<?php
																	}
																}
																else
																{
																		?>
																			
							     										<div class="col-sm-12" style="">
																		 	<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="approved" id="approved"  onclick="approved()">Approved</button>
																			</div>
																			<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="revert" id="revert" onclick="revert()">Revert</button>
																			</div>
																			<div class="col-sm-4">
																			<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="reject" id="reject" onclick="reject()">Reject</button>
																			</div>
				     										</div>

																		<?php
																}
														}
														else
														{
																?>
													
							     										<div class="col-sm-12" style="">
																		 	<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="approved" id="approved"  onclick="approved()">Approved</button>
																			</div>
																			<div class="col-sm-4">
																				<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="revert" id="revert" onclick="revert()">Revert</button>
																			</div>
																			<div class="col-sm-4">
																			<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="reject" id="reject" onclick="reject()">Reject</button>
																			</div>
				     										</div>

																<?php
														}

				            		?>



				            		 
								
     									<!--</form>-->
			              </section>
					       	</div>

		            </div>
		          </div>
	          </div>
	        <?php
          }
					else 
					{
					?>
  			  <div class="row  shadow bg-white rounded margin-10 padding-15">
		 				<div class="wizard-form">
						  <div id="form-total" style="padding:40px;">
		        		<!-- SECTION 1 ---------------------------------------------------------------------------------------------------------------- -->
			   	      <section id="section1">
					        <div class="col-sm-12">
					          <h4 style="font-weight:800"><b>Loan Application is not submitted by  CUSTOMER - <?php echo $row->FN." ".$row->LN;?></b></h4><hr>
   	              </div>
							  </section>
							</div>
		 				</div>
	  			</div>
  				<?php
					}
					?>

								<div class="modal fade" id="rejectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Add reason for rejection</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
											<textarea class = "form-control" rows = "3" name="rejectReason" id="rejectReason" placeholder="Write something.."></textarea>
        	    					
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary" onclick="reject()">Save changes</button>
									  </div>
									</div>
								  </div>
								</div>

								<div class="modal fade" id="holdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Add reason for holding application</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
									    	<textarea class = "form-control" rows = "3" name="holdReason" id="holdReason" placeholder="Write something.." ></textarea>
        	    		  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary" onclick="hold()">Save changes</button>
									  </div>
									</div>
								  </div>
								</div>
</body>
</html>
<script>
function edit_row2(no)
{
 	document.getElementById("edit_button"+no).style.display="none";
 	document.getElementById("save_button"+no).style.display="block";
  var additional_emi_comments=document.getElementById("additional_emi_comments_row"+no);
  var additional_emi_comments_data=additional_emi_comments.innerHTML;
  additional_emi_comments.innerHTML="<input type='text' id='additional_emi_comments_text"+no+"' name='additional_emi_comments[]' value='"+additional_emi_comments_data+"'>";
}
function save_row2(no)
{
  var additional_emi_comments_val=document.getElementById("additional_emi_comments_text"+no).value;
  document.getElementById("additional_emi_comments_row"+no).innerHTML=additional_emi_comments_val;
  document.getElementById("edit_button"+no).style.display="block";
  document.getElementById("save_button"+no).style.display="none";
}
function delete_row2(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}
function add_row2()
{
 var new_additional_emi_comments=document.getElementById("additional_emi_comments").value;
 var table=document.getElementById("data_table2");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td><input class = 'form-control' name='additional_emi_comments[]' type='text' id='additional_emi_comments_row"+table_len+"' value='"+new_additional_emi_comments+"'></td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row2("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row2("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row2("+table_len+")'></td></tr>";
  document.getElementById("additional_emi_comments").value="";
}
</script>

<script>
function edit_row3(no)
{
 	document.getElementById("edit_button"+no).style.display="none";
 	document.getElementById("save_button"+no).style.display="block";
  var additional_emi_comments=document.getElementById("additional_emi_comments_3_row"+no);
  var additional_emi_comments_data=additional_emi_comments.innerHTML;
  additional_emi_comments.innerHTML="<input type='text' id='additional_emi_comments_3"+no+"' name='additional_emi_comments_3[]' value='"+additional_emi_comments_data+"'>";
}
function save_row3(no)
{
  var additional_emi_comments_val=document.getElementById("additional_emi_comments_3"+no).value;
  document.getElementById("additional_emi_comments_3_row"+no).innerHTML=additional_emi_comments_val;
  document.getElementById("edit_button"+no).style.display="block";
  document.getElementById("save_button"+no).style.display="none";
}
function delete_row3(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}
function add_row3()
{
 var new_additional_emi_comments=document.getElementById("additional_emi_comments_3").value;
 var table=document.getElementById("data_table3");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td><input class = 'form-control' name='additional_emi_comments_3[]' type='text' id='additional_emi_comments_3_row"+table_len+"' value='"+new_additional_emi_comments+"'></td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row3("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row3("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row3("+table_len+")'></td></tr>";
  document.getElementById("additional_emi_comments_3").value="";
}
</script>


	 <script>
								function openForm() {
								  document.getElementById("myForm").style.display = "block";
								}

								function closeForm() {
								  document.getElementById("myForm").style.display = "none";
								}

						function hold() 
						{
					
						 var User_ID = document.getElementById('customer_id').value;
						 var holdReason ="Application is on HOLD in PD From One because : "+ document.getElementById('holdReason').value;
						 var dsa_id = document.getElementById('dsa_id').value;
						 if(holdReason=='')
										{
											swal("warning!", "Please Enter Reason for holding application", "warning");
										    return false;
										}
								$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/HOLD_CUSTOMER_APPLICATION"); ?>',
									    data:{
										'User_ID':User_ID,
										'Action':"HOLD",
										'Reason':holdReason,
										'dsa_id':dsa_id,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
								
											if(obj.msg=='success')
											{
											     swal("success!", "Status added successfully", "success").then( function() {   window.location.replace("/finserv_test/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
												
											}
						                }
                                    });
		
						}

						function reject() 
						{
							var User_ID = document.getElementById('customer_id').value;
							var rejectReason = "Application is rejected in PD From One because : " +document.getElementById('rejectReason').value;
							var dsa_id = document.getElementById('dsa_id').value;
					    	if(rejectReason=='')
										{
											swal("warning!", "Please Enter Reason for rejecting application", "warning");
										    return false;
										}
						 	$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/REJECT_CUSTOMER_APPLICATION"); ?>',
									    data:{
										'User_ID':User_ID,
										'Action':"REJECT",
										'Reason':rejectReason,
										'dsa_id':dsa_id,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
												
												  swal("success!", "Status added successfully", "success").then( function() {   window.location.replace("/finserv_test/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
											}
						                }
                                    });
						}

						function continue_()
						{
							 var User_ID = document.getElementById('customer_id').value;
						 	 var dsa_id = document.getElementById('dsa_id').value;

							 $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/CONTINUE_CUSTOMER_APPLICATION"); ?>',
									    data:{
										'User_ID':User_ID,
										'Action':"CONTINUE",
										'dsa_id':dsa_id,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
											
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/finserv_test/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
												
											}
						                }
                                    });

						}

						</script>
						<script>
						function Check_status()
						{
						
							var User_ID = document.getElementById('customer_id').value;
							$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/onload_check_status"); ?>',
									    data:{
										'User_ID':User_ID,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);

									
											if(obj.msg=='HOLD')
											{
												$('#border_style').css("border","2px solid yellow");
													document.getElementById('tag').innerHTML = "Status added by : "+obj.action_by;
													document.getElementById('tag2').innerHTML = " Reason : "+obj.reason;
											
												var word = "PD From One";
												var mystring =obj.reason;
 
										
												 var incStr = mystring.includes(word);
											      if(incStr!= false)
												{
														$('input[type="text"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="email"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="number"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="date"]').each(function(){
												   $(this).attr('readonly','readonly');
												});

													$('#save_and_continue').hide();
													
												} 
											

											}
											else if(obj.msg=='REJECT')
											{
											
												$('#border_style').css("border","2px solid red");
												document.getElementById('tag').innerHTML = "Status added by  : "+obj.action_by;
												document.getElementById('tag2').innerHTML = " Reason : "+obj.reason;
												var word = "PD From One";
												var mystring =obj.reason;
 
											// Test if string contains the word 
												 var incStr = mystring.includes(word);
											      if(incStr!= false)
												{
													$('input[type="text"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="email"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="number"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="date"]').each(function(){
												   $(this).attr('readonly','readonly');
												});

													$('#save_and_continue').hide();
												
													
												} 
											
														
												  $('#btn_hold').hide();
												  $('#btn_continue').hide();
												
											
									
											}
											else if(obj.msg=='CONTINUE')
											{
													$('#border_style').css("border","2px solid blue");
													
											}
						                }
                                    });

						}


						function approved() 
						{
							 var User_ID = document.getElementById('customer_id').value;
						 	 var dsa_id = document.getElementById('dsa_id').value;
						 	//  var admin_comments = document.getElementById('admin_comments').value;
var sanction_conditions = document.getElementById('sanction_conditions').value;
var legal_conditions = document.getElementById('legal_conditions').value;
var additional_sanction_conditions = document.getElementById('additional_sanction_conditions').value;
var additional_legal_conditions = document.getElementById('additional_legal_conditions').value;
						 	 
							 
							 
				
							 
							 
							 
					
							 $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/admin/Sanction_letter_status"); ?>',
									    data:{
										'User_ID':User_ID,
										'Status':"approved",
										'dsa_id':dsa_id,
										//'admin_comments':admin_comments,
										
										'sanction_conditions':sanction_conditions,
										'legal_conditions':legal_conditions,
										'additional_sanction_conditions':additional_sanction_conditions,
										'additional_legal_conditions':additional_legal_conditions,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
											
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/finserv_test/dsa/dsa/index.php/Admin/Sanction_cum_acceptance_letter_admin?ID="+obj.customer_id+"&CM="+obj.CM_ID); });
									
												
											}
						                }
                                    });
						}
					function revert() 
						{
							 var User_ID = document.getElementById('customer_id').value;
						 	 var dsa_id = document.getElementById('dsa_id').value; //admin_comments
						 	 var admin_comments = document.getElementById('admin_comments').value;
					     if(admin_comments == '')
					     {
					     	swal("warning!", "Please add comments", "warning");
										    return false;
					     }
							 $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/admin/Sanction_letter_status"); ?>',
									    data:{
										'User_ID':User_ID,
										'Status':"Revert",
										'dsa_id':dsa_id,
										'admin_comments':admin_comments,

										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
											
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/finserv_test/dsa/dsa/index.php/Admin/Sanction_cum_acceptance_letter_admin?ID="+obj.customer_id+"&CM="+obj.CM_ID); });
									
												
											}
						                }
                                    });
						}
						function reject() 
						{
							 var User_ID = document.getElementById('customer_id').value;
						 	 var dsa_id = document.getElementById('dsa_id').value;
						 	 	 var admin_comments = document.getElementById('admin_comments').value;
					
   if(admin_comments == '')
								{
									swal("warning!", "Please Enter Reason for rejecting sanction letter", "warning");
													    return false;
								}
							 $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/admin/Sanction_letter_status"); ?>',
									    data:{
										'User_ID':User_ID,
										'Status':"Rejected",
										'dsa_id':dsa_id,
										'admin_comments':admin_comments,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
											
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/finserv_test/dsa/dsa/index.php/Admin/Sanction_cum_acceptance_letter_admin?ID="+obj.customer_id+"&CM="+obj.CM_ID); });
									
												
											}
						                }
                                    });
						}

						</script>

	<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
		<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
							<!--[if IE]><!--><!--<![endif]-->
							<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
							<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
						


	<?php

}

	?>
<script>
	   $(document).ready(function(){
	      var ID_Status = document.getElementById('ID_Status').value;
		   if(ID_Status == "yes")
		   {
		   $('input[type="text"]').prop('readonly',true);
		 $('input[type="number"]').prop('readonly',true);
		 $('input[type="date"]').prop('readonly',true);
		  $('input[type="email"]').prop('readonly',true);
		  $('#admin_comments').attr('readonly',true);  //
		   $('#additional_legal_conditions').attr('readonly',true); // ,  ,
		    $('#legal_conditions').attr('readonly',true);
			 $('#additional_sanction_conditions').attr('readonly',true);
			  $('#sanction_conditions').attr('readonly',true);
		   }
	   }
	   );
</script>