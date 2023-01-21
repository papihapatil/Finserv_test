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
//echo $userType;//
//exit();

?>
<?php
if($Sanction_letter_details->Status == "Approved")
{
	?><input hidden type="text"  id="ID_Status"  value="yes"><?php
													
}

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
		        	  	<input hidden type="text" name="customer_id" id="customer_id"  value="<?php echo $row->UNIQUE_CODE;?>">
					 				<input hidden type="text" name="dsa_id" id="dsa_id"  value="<?php if(!empty($credit_manager_data)) { echo $credit_manager_data->UNIQUE_CODE;}else {echo $CM_ID; }?>">
								 	<div id="form-total" style="padding:40px;" >
		        				<!-- SECTION 1 ---------------------------------------------------------------------------------------------------------------- -->
			   			  		<section id="section1">
							 				<b><span id='tag'></span><br><span id='tag2'></span></b>
                 			<div class="row shadow bg-white rounded margin-10 padding-15 " style="padding:25px;" >
								    		<div class="col-sm-4" >
						        			<h4 style="font-weight:800; font-size:15px;"><b>SANCTION CUM ACCEPTANCE LETTER</b></h4><hr>
				            		</div>
				            		<?php
									if(!empty($Sanction_letter_details))
									{
										if($Sanction_letter_details->Letter_ID!=="")
										{
											if($Sanction_letter_details->Status == "Approved")
											{
									?>
												<div class="col-sm-2" style="margin-bottom:10px;">
													<a target='_blank' href="<?php echo base_url()?>index.php/Credit_manager_user/Sanction_Letter?ID=<?php echo $row->UNIQUE_CODE;?>"><button type="button" class="btn btn-success">SANCTION LETTER</button></a>
												</div>
												<div class="col-sm-2">
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
								   				<div class="col-sm-10">
					        					<h4 style="font-weight:800; font-size:15px;"><b>APPLICANT NAME</b></h4><hr>
  			            		  </div>
												</div>
												<div class="col-sm-12">
												<div class="col-sm-3">
													<div class="form-group">
														<label class="class_bold"></label>
   													<input type="text" class="form-control" id="applicant_name" name="applicant_name" value="<?php if(!empty($row)) { if(!empty($row)) echo $row->FN." ".$row->LN; }?>" required>
													</div>
												</div>
												
											</div>
												<div class="col-sm-12">
								   				<div class="col-sm-10">
					        					<h4 style="font-weight:800; font-size:15px;"><b>CO-APPLICANT NAME</b></h4><hr>
 			            		   </div>
												</div>
												<div class="col-sm-12">
												<?php
												 if(isset($coapplicants))  
																{
																  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																		{ 
												?>
												<div class="col-sm-3">
													<div class="form-group">
														<label ><b>CO-APPLICANT <?php echo $i;?></b></label>
   													<input type="text" class="form-control" id="coapplicant_name" name="coapplicant_name" value="<?php if(!empty($row)) { if(!empty($row)) echo $coapplicant->FN." ".$coapplicant->LN; }?>" required>
													</div>
												</div>
												<?php   $i++;
																		}
																}
												?>
												</div>
													
												<div class="col-sm-12 ">
													<table class="table  table-bordered ">
												    <tbody>
												    	<tr>
												        <td><b>Branch</b></td>
												        <td><input type="text" class="form-control" id="Branch" name="Branch" value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->Branch ;} ?>"></td>
												      </tr>
												      <tr>
												        <td><b>Nature of Facility</b></td>
												        <td>
												        	<select class="form-control" id="nature_of_facility" name="nature_of_facility">
																	  <option value="MSME / LAP TERM LOAN" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->nature_of_facility == 'MSME / LAP TERM LOAN') echo ' selected="selected"'; ?>>MSME / LAP TERM LOAN</option>
																	  <option value="Bill Discounting"  <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->nature_of_facility == 'Bill Discounting') echo ' selected="selected"'; ?>>Bill Discounting</option>
																	  <option value="Supply Chain Finance"  <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->nature_of_facility == 'Supply Chain Finance') echo ' selected="selected"'; ?>>Supply Chain Finance</option>
									   							</select>
																</td>
												      </tr>
												       <tr>
												        <td><b>Purpose of Loan</b></td>
												        <td>
												        		<select  name="purpose_of_loan" id="purpose_of_loan" class="form-control"> 
																		  <option value="">Select Reason *</option>
																		  <option value="Medical" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Medical') echo ' selected="selected"'; ?>>Medical</option>
																		  <option value="Personal (Others)" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Personal (Others)') echo ' selected="selected"'; ?>>Personal (Others)</option>
																		  <option value="Holiday" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Holiday') echo ' selected="selected"'; ?>>Holiday</option>
																		  <option value="Advance Salary" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Advance Salary') echo ' selected="selected"'; ?>>Advance Salary</option>
																		  <option value="Rental Deposit" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Rental Deposit') echo ' selected="selected"'; ?>>Rental Deposit</option>
																		  <option value="Wedding" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Wedding') echo ' selected="selected"'; ?>>Wedding</option>
																		  <option value="Credit Card Takeover" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Credit Card Takeover') echo ' selected="selected"'; ?>>Credit Card Takeover</option>		
																		  <option value="Business Expansion" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Business Expansion') echo ' selected="selected"'; ?>>Business Expansion</option>
																		  <option value="LAP-BT + top up" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'LAP-BT + top up') echo ' selected="selected"'; ?>>LAP-BT + top up</option>
																		  <!------------------------- added  by  papiha on 29_08_2022---------------------------------------------------------------  --->
																		  <option value="Business Stock Purchase- New products to be added in inventory" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Business Stock Purchase- New products to be added in inventory') echo ' selected="selected"'; ?>>Business Stock Purchase- New products to be added in inventory</option>
																		  <option value="Loan Reconsolidation" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Loan Reconsolidation') echo ' selected="selected"'; ?>>Loan Reconsolidation</option>
																		  <option value="Machine Purchase" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Machine Purchase') echo ' selected="selected"'; ?>>Machine Purchase</option>
																		  <option value="New property Purchase" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'New property Purchase') echo ' selected="selected"'; ?>>New property Purchase</option>
																		  <option value="Purchase of Business Premises" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Purchase of Business Premises') echo ' selected="selected"'; ?>>Purchase of Business Premises</option>
																		  <option value="Business - Working Capital " <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Business - Working Capital ') echo ' selected="selected"'; ?>>Business - Working Capital </option>
																		  <option value="Balance Transfer" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Balance Transfer') echo ' selected="selected"'; ?>>Balance Transfer</option>
																		  <option value="Top up on Balance Transfer" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Top up on Balance Transfer') echo ' selected="selected"'; ?>>Top up on Balance Transfer</option>
																		  <option value="Shop refurbishment" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Shop refurbishment') echo ' selected="selected"'; ?>>Shop refurbishment</option>
																		  <option value="Business Expansion" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Business Expansion') echo ' selected="selected"'; ?>>Business Expansion</option>
																		  <option value="Others" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Others') echo ' selected="selected"'; ?>>Others</option>						
																		<option value="Home Renovation" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Home Renovation') echo ' selected="selected"'; ?>>Home Renovation</option>
																		  
																		</select>


												        </td>
												      </tr>
												      <tr>
												        <td><b>Interest Type</b></td>
												        <td>
												        	<select class="form-control" id="Interest_type" name="Interest_type" >
																	  <option value="Fixed"  <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->Interest_type == 'Fixed') echo ' selected="selected"'; ?>>Fixed</option>
																	  <option value="Floating" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->Interest_type == 'Floating') echo ' selected="selected"'; ?>>Floating</option>
																	</select>
									   						</td>
												      </tr>
												      <tr>
												        <td><b>FFPL PLR (in %)</b></td>
												        <td><input type="number" class="form-control" id="ffpl_plr" name="ffpl_plr" value="<?php if(!empty($Sanction_letter_details)) echo $Sanction_letter_details->ffpl_plr; ?>"></td>
												      </tr>
												       <tr>
												        <td><b>Rate of Interest (in %)</b></td>
												        <td><input type="number" class="form-control" id="rate_of_interest" name="rate_of_interest" value="<?php if(!empty($Sanction_letter_details)) echo $Sanction_letter_details->rate_of_interest; ?>"></td>
												      </tr>
												       <tr>
												        <td><b>Loan Amount ( INR)</b></td>
												        <td>
												        	<table class="table table-bordered ">
																    <tbody>
																      <tr>
																        <td><b>Loan Amount</b></td>
																        <td><b>Property Insurance</b></td>
																        <td><b>Credit Shield</b></td>
																        <td><b>Total Loan Amount</b></td>
																      </tr>
																       <tr>
																        <td><input type="number" class="form-control" id="loan_amount" name="loan_amount" value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->loan_amount ;} else { echo $data_row_applied_loan->DESIRED_LOAN_AMOUNT ;}?>"></td>
																        <td><input type="number" class="form-control" id="property_insurance" name="property_insurance"  value="<?php if(!empty($Sanction_letter_details)) { echo $Sanction_letter_details->property_insurance ;}?>"></td>
																        <td><input type="number" class="form-control" id="credit_shield" name="credit_shield"  value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->credit_shield ;}?>"></td>
																        <td><input type="number" class="form-control" id="total_loan_amount" name="total_loan_amount"  value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->total_loan_amount ;}?>"></td>
																      </tr>
												        		</tbody>
												        	</table>
												        </td>
												      </tr>
												       <tr>
												        <td><b>Tenure (In Months)</b></td>
												        <td><input type="number" class="form-control" id="tenure" name="tenure"  value="<?php if(!empty($Sanction_letter_details)) echo $Sanction_letter_details->tenure; ?>" ></td>
												      </tr>
												       <tr>
												        <td><b>EMI (Equated Monthly Instalment)</b></td>
												        <td><input type="text" class="form-control" id="EMI" name="EMI"  value="<?php if(!empty($Sanction_letter_details)) echo $Sanction_letter_details->EMI; ?>"></td>
												      </tr>
												       <tr>
												        <td><b>EMI Due Date</b></td>
												        <td><input type="text" class="form-control" id="Emi_due_date" name="Emi_due_date"   value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->Emi_due_date; } else {echo "10th of every month";}?>"></td>
												      </tr>
												       <tr>
												        <td><b>Repayment</b></td>
												        <td><textarea class="form-control" id="repayment" name="repayment" row="3"><?php if(!empty($Sanction_letter_details)) { echo $Sanction_letter_details->repayment;} else {echo "For Partially Disbursed Case: Pre-EMI will be charged from 1st Disbursement till Loan is not fully disbursed or up to 12 months from 1st disbursement date whichever earlier.
																		• For First and Final Disbursement Case: Pre-EMI will be charged for the first month and equated monthly installment thereafter."; } ?></textarea>
															</td>
												      </tr>
												      <tr>
												      	 <td><b>Repayment Bank Details</b></td>
												      	<td>
												        	<table class="table table-bordered ">
																    <tbody>
																      <tr>

																      	<td><b>Account Holder Name</b></td>
																        <td><b>Bank Name</b></td>
																        <td><b>Account Number</b></td>
																     
																      </tr>
																       <tr>
																       		<td><input type="text" class="form-control" id="Repayment_account_holder_name" name="Repayment_account_holder_name" value="<?php if(!empty($Sanction_letter_details->Repayment_account_holder_name )) {echo $Sanction_letter_details->Repayment_account_holder_name ;} ?>"></td>
																        <td><input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php if(!empty($Sanction_letter_details->bank_name )) {echo $Sanction_letter_details->bank_name ;} ?>"></td>
																        <td><input type="text" class="form-control" id="account_number" name="account_number"  value="<?php if(!empty($Sanction_letter_details->account_number)) {echo $Sanction_letter_details->account_number ;}?>"></td>
																       
																      </tr>
												        		</tbody>
												        	</table>
												        </td>
												      </tr>
												       <tr>
												        <td><b>Processing Fees (Inclusive of GST)</b></td>
												        <td><input type="text" class="form-control" id="processing_fees" name="processing_fees"  value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->processing_fees ;}?>"></td>
												      </tr>
												       <tr>
												        <td><b>Other Charges ( Excluding GST)</b></td>
												        <td>
												        		<table class="table table-bordered ">
																	    <tbody>
																	      <tr>
																	        <td><b>MODT</b></td>
																	        <td><input type="text" class="form-control" id="MODT" name="MODT" value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->MODT ;} else {echo "As per prevailing State Government Charges" ;}?>"></td>
																	      </tr>
																	     
																	      <tr>
																	        <td><b>Notice of Intimation</b></td>
																	        <td><input type="text" class="form-control" id="notice_of_intimation" name="notice_of_intimation" value="<?Php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->notice_of_intimation ;} else {echo "NA " ;}?>"></td>
																	      </tr>
																	    </tbody>
																	  </table>
												        </td>
												      </tr>
												      <tr>
												        <td><b>Security</b></td>
												        <td><input type="text" class="form-control" id="Security" name="Security" value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->Security ;} else { echo "1st Charge by way of registered mortgage (in the form and manner as prescribed by FFPL)";}?>"></td>
												      </tr>
												      <tr>
												        <td><b>Power of Attorney</b></td>
												        <td><input type="text" class="form-control" id="power_of_attorney" name="power_of_attorney" value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->power_of_attorney ;} else { echo "NA";}?>"></td>
												      </tr>
												      <tr>
												        <td><b>Property Address of Loan Sanctioned</b></td>
												        <td><input type="text" class="form-control" id="property_address" name="property_address" value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->property_address ;}  ?>"></td>
												      </tr>
												    </tbody>
												  </table>
												  <hr>
												  
													
												</div>
												<br>
												<input hidden type="text"  id="LOGIN_CREDIT_MANAGER_ID" value="<?php echo $CM_ID;?>">


												<?php
														if(!empty($Sanction_letter_details))
														{

																if($Sanction_letter_details->Letter_ID!=="")
																{
																	if($Sanction_letter_details->Status == "Approved")
																	{
																	?>
																     	<div class="col-sm-12" style="">
																							<a class="dropdown-item" href="<?php echo base_url()?>index.php/Admin/Sanction_cum_acceptance_letter_F2_admin?ID=<?php echo $row->UNIQUE_CODE;?>&CM=<?php echo $CM_ID;?>"><button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" >Approved</button></a>
								     										</div>
																	
																		<?php
																	}
																	else if($Sanction_letter_details->Status == "Revert")
																	{
																		?>
																		<div class="col-sm-12" style="">
																							<a class="dropdown-item" href="<?php echo base_url()?>index.php/Admin/Sanction_cum_acceptance_letter_F2_admin?ID=<?php echo $row->UNIQUE_CODE;?>&CM=<?php echo $CM_ID;?>"><button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" >Send for revert</button></a>
								     										</div>
																		<?php
																	}
																	else if($Sanction_letter_details->Status == "Rejected")
																	{
																		?>
																			<div class="col-sm-12" style="">
																							<a class="dropdown-item" href="<?php echo base_url()?>index.php/Admin/Sanction_cum_acceptance_letter_F2_admin?ID=<?php echo $row->UNIQUE_CODE;?>&CM=<?php echo $CM_ID;?>"><button class="login100-form-btn" style="font-weight:700;background-color:red;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" >Rejected</button></a>
								     										</div>
																			<?php
																	}
																			else if($Sanction_letter_details->Status == "Submited for Approval" && $Sanction_letter_details->Status_added_by == "Credit Manager")
																	{
																		?>
																			<div class="col-sm-12" style="">
																					<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="save_and_continue_sanction_form_2" id="save_and_continue_sanction_form_2">SAVE AND CONTINUE</button>
								     										</div>
																		<?php
																	}
																		else if($Sanction_letter_details->Status == "Submited for Approval" && $Sanction_letter_details->Status_added_by == "Cluster Credit Manager")
																	{
																		?>
																		 <div class="col-sm-12" style="">
																			<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;">Waiting For approval from admin</button>
				     												</div>
																		<?php
																	}
																	else
																	{
																		?>
												
				     											<div class="col-sm-12" style="">
																					<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="save_and_continue_sanction_form_2" id="save_and_continue_sanction_form_2">SAVE AND CONTINUE</button>
								     										</div>
																		
																		<?php
																	}
																}
																else
																{
																		?>
																				<div class="col-sm-12" style="">
																					<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="save_and_continue_sanction_form_2" id="save_and_continue_sanction_form_2">SAVE AND CONTINUE</button>
								     										</div>
																		
																		<?php
																}
														}
														else
														{
																?>
																	<div class="col-sm-12" style="">
																		<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="save_and_continue_sanction_form_2" id="save_and_continue_sanction_form_2">SAVE AND CONTINUE</button>
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



	      

		  $("#loan_amount").keyup(function(){
			  var property_insurance =parseInt($('#property_insurance').val())
			  var credit_shield =parseInt($('#credit_shield').val())
			  var loan_amount =parseInt($('#loan_amount').val())
			  var total_loan_amount =((property_insurance + credit_shield + loan_amount))
        document.getElementById('total_loan_amount').value= total_loan_amount;

		    	var emi = 0;
			    var P = 0;
			    var n = 1;
			    var r = 0;   

			    if($("#total_loan_amount").val() !== "")
			       P = parseFloat($("#total_loan_amount").val());
			                   
			                        
			    if ($("#rate_of_interest").val() !== "") 
			      r = parseFloat(parseFloat($("#rate_of_interest").val()) / 100);

			    if ($("#tenure").val() !== "")
			        n = parseFloat($("#tenure").val());
			                    
			                  
			    if (P !== 0 && n !== 0 && r !== 0)
			    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
              
    			$("#emi").val(emi.toFixed(2));
     			document.getElementById('EMI').value= emi.toFixed(2);
     			var processing_fee= (total_loan_amount*0.02)*1.18
          document.getElementById('processing_fees').value= processing_fee.toFixed(2);


              });
		   $("#credit_shield").keyup(function(){
			  var property_insurance =parseInt($('#property_insurance').val())
			  var credit_shield =parseInt($('#credit_shield').val())
			  var loan_amount =parseInt($('#loan_amount').val())
			  var total_loan_amount =((property_insurance + credit_shield + loan_amount))
              document.getElementById('total_loan_amount').value= total_loan_amount;
              var emi = 0;
					    var P = 0;
					    var n = 1;
					    var r = 0;   

				    if($("#total_loan_amount").val() !== "")
				       P = parseFloat($("#total_loan_amount").val());
				                   
				                        
				    if ($("#rate_of_interest").val() !== "") 
				      r = parseFloat(parseFloat($("#rate_of_interest").val()) / 100);

				    if ($("#tenure").val() !== "")
				        n = parseFloat($("#tenure").val());
                    
                  
					    if (P !== 0 && n !== 0 && r !== 0)
					    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
					              
					    $("#emi").val(emi.toFixed(2));
					     document.getElementById('EMI').value= emi.toFixed(2);
					     var processing_fee= (total_loan_amount*0.02)*1.18
           document.getElementById('processing_fees').value= processing_fee.toFixed(2);
              });

		    $("#property_insurance").keyup(function(){
			  var property_insurance =parseInt($('#property_insurance').val())
			  var credit_shield =parseInt($('#credit_shield').val())
			  var loan_amount =parseInt($('#loan_amount').val())
			  var total_loan_amount =((property_insurance + credit_shield + loan_amount))
              document.getElementById('total_loan_amount').value= total_loan_amount;
            
              var emi = 0;
	    var P = 0;
	    var n = 1;
	    var r = 0;   

    if($("#total_loan_amount").val() !== "")
       P = parseFloat($("#total_loan_amount").val());
                   
                        
    if ($("#rate_of_interest").val() !== "") 
      r = parseFloat(parseFloat($("#rate_of_interest").val()) / 100);

    if ($("#tenure").val() !== "")
        n = parseFloat($("#tenure").val());
                    
                  
    if (P !== 0 && n !== 0 && r !== 0)
    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
              
    $("#emi").val(emi.toFixed(2));
     document.getElementById('EMI').value= emi.toFixed(2);
     var processing_fee= (total_loan_amount*0.02)*1.18
  document.getElementById('processing_fees').value= processing_fee.toFixed(2);


              });

		    $("#tenure").keyup(function(){
			  var property_insurance =parseInt($('#property_insurance').val())
			  var credit_shield =parseInt($('#credit_shield').val())
			  var loan_amount =parseInt($('#loan_amount').val())
			  var total_loan_amount =((property_insurance + credit_shield + loan_amount))
              document.getElementById('total_loan_amount').value= total_loan_amount;
            
              var emi = 0;
	    var P = 0;
	    var n = 1;
	    var r = 0;   

    if($("#total_loan_amount").val() !== "")
       P = parseFloat($("#total_loan_amount").val());
                   
                        
    if ($("#rate_of_interest").val() !== "") 
      r = parseFloat(parseFloat($("#rate_of_interest").val()) / 100);

    if ($("#tenure").val() !== "")
        n = parseFloat($("#tenure").val());
                    
                  
    if (P !== 0 && n !== 0 && r !== 0)
    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
              
    $("#emi").val(emi.toFixed(2));
     document.getElementById('EMI').value= emi.toFixed(2);

     var processing_fee= (total_loan_amount*0.02)*1.18
  document.getElementById('processing_fees').value= processing_fee.toFixed(2);

              });

		     $("#rate_of_interest").keyup(function(){
			  var property_insurance =parseInt($('#property_insurance').val())
			  var credit_shield =parseInt($('#credit_shield').val())
			  var loan_amount =parseInt($('#loan_amount').val())
			  var total_loan_amount =((property_insurance + credit_shield + loan_amount))
              document.getElementById('total_loan_amount').value= total_loan_amount;
            
              var emi = 0;
	    var P = 0;
	    var n = 1;
	    var r = 0;   

    if($("#total_loan_amount").val() !== "")
       P = parseFloat($("#total_loan_amount").val());
                   
                        
    if ($("#rate_of_interest").val() !== "") 
      r = parseFloat(parseFloat($("#rate_of_interest").val()) / 100);

    if ($("#tenure").val() !== "")
        n = parseFloat($("#tenure").val());
                    
                  
    if (P !== 0 && n !== 0 && r !== 0)
    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
              
    $("#emi").val(emi.toFixed(2));
     document.getElementById('EMI').value= emi.toFixed(2);

   var processing_fee= (total_loan_amount*0.02)*1.18
  document.getElementById('processing_fees').value= processing_fee.toFixed(2);




              });
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
											     swal("success!", "Status added successfully", "success").then( function() {   window.location.replace("/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
												
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
												
												  swal("success!", "Status added successfully", "success").then( function() {   window.location.replace("/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
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
											
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
												
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
						</script>

						  <script>
							   $( "#save_and_continue_sanction_form_2" ).click(function() {
							 
							   		 var customer_id=document.getElementById("customer_id").value; 
							   		 var credit_manager_id=document.getElementById("dsa_id").value; 
										 var property_address =document.getElementById("property_address").value; 
										 var nature_of_facility =document.getElementById("nature_of_facility").value; 
										 var purpose_of_loan =document.getElementById("purpose_of_loan").value; 
										 var Interest_type =document.getElementById("Interest_type").value; 
										 var ffpl_plr =document.getElementById("ffpl_plr").value; 
										 var rate_of_interest =document.getElementById("rate_of_interest").value;
										 var loan_amount =document.getElementById("loan_amount").value; 
										 var property_insurance =document.getElementById("property_insurance").value; 
										 var credit_shield =document.getElementById("credit_shield").value;
										 var total_loan_amount =document.getElementById("total_loan_amount").value; 

										 var tenure =document.getElementById("tenure").value; 
										 var EMI =document.getElementById("EMI").value; 
										 var Emi_due_date =document.getElementById("Emi_due_date").value;
										 var repayment =document.getElementById("repayment").value; 

										 var processing_fees =document.getElementById("processing_fees").value; 
										 var MODT =document.getElementById("MODT").value; 
										// var CERSAI_1 =document.getElementById("CERSAI_1").value;
										 //var CERSAI_2 =document.getElementById("CERSAI_2").value; 

										 var notice_of_intimation =document.getElementById("notice_of_intimation").value; 
										 var Security =document.getElementById("Security").value; 
										 var power_of_attorney =document.getElementById("power_of_attorney").value;
										 	 var Branch =document.getElementById("Branch").value; 
										 	 	 	 var bank_name =document.getElementById("bank_name").value;
										 	 	 var account_number =document.getElementById("account_number").value;
										 	 	  	 var Repayment_account_holder_name =document.getElementById("Repayment_account_holder_name").value;
										// var property_address =document.getElementById("property_address").value; 

										  if(property_address=='')
											{
												swal("warning!", "Please Enter Property Address", "warning");
												return false;
											}
										  else if(nature_of_facility=='')
											{
												swal("warning!", "Please Enter Nature Of Facility", "warning");
												return false;
											}
										  else if(purpose_of_loan=='')
											{
												swal("warning!", "Please Enter Purpose of loan", "warning");
												return false;
											}
										  else if(Interest_type=='')
											{
												swal("warning!", "Please Enter Interest type", "warning");
												return false;
											}
										  else if(ffpl_plr=='')
											{
												swal("warning!", "Please Enter ffpl plr", "warning");
												return false;
											}
										  else if(rate_of_interest=='')
											{
												swal("warning!", "Please Select Rate of interest", "warning");
												return false;
											}
										  else if(loan_amount=='')
											{
												swal("warning!", "Please Enter loan amount", "warning");
												return false;
											}
										  else if(property_insurance=='')
											{
												swal("warning!", "Please Enter Property Insurance", "warning");
												return false;
											}
										  else if(credit_shield=='')
											{
												swal("warning!", "Please Enter Credit shield", "warning");
												return false;
											}
											else if(total_loan_amount=='')
											{
												swal("warning!", "Please Enter total loan amount", "warning");
												return false;
											}
											else if(tenure=='')
											{
												swal("warning!", "Please Enter Tenure", "warning");
												return false;
											}
											else if(EMI=='')
											{
												swal("warning!", "Please Enter EMI", "warning");
												return false;
											}
											else if(Emi_due_date=='')
											{
												swal("warning!", "Please Enter Emi due date", "warning");
												return false;
											}
											else if(repayment=='')
											{
												swal("warning!", "Please Enter repayment", "warning");
												return false;
											}
											else if(processing_fees=='')
											{
												swal("warning!", "Please Enter Processing fee ", "warning");
												return false;
											}
											else if(MODT=='')
											{
												swal("warning!", "Please Enter MODT ", "warning");
												return false;
											}
											/*else if(CERSAI_1=='')
											{
												swal("warning!", "Please Enter CERSAI ", "warning");
												return false;
											}
											else if(CERSAI_2=='')
											{
												swal("warning!", "Please Enter CERSAI ", "warning");
												return false;
											}*/
											else if(notice_of_intimation=='')
											{
												swal("warning!", "Please Enter notice of intimation", "warning");
												return false;
											}
											else if(Security=='')
											{
												swal("warning!", "Please Enter Security ", "warning");
												return false;
											}
											else if(power_of_attorney=='')
											{
												swal("warning!", "Please Enter power of attorney ", "warning");
												return false;
											}
											else if(processing_fees=='')
											{
												swal("warning!", "Please Enter Processing fee ", "warning");
												return false;
											}
												else if(bank_name=='')
											{
												swal("warning!", "Please Enter Bank Name ", "warning");
												return false;
											}
												else if(account_number=='')
											{
												swal("warning!", "Please Enter Bank Account Number ", "warning");
												return false;
											}
														else if(Repayment_account_holder_name=='')
											{
												swal("warning!", "Please Enter Bank Account holder name ", "warning");
												return false;
											}

										$.ajax({
													type:'POST',
													url:'<?php echo base_url("index.php/credit_manager_user/submit_sanction_letter_form_one_cluster"); ?>',
													data:{
														'customer_id':customer_id,
														'credit_manager_id':credit_manager_id,
														'property_address':property_address,
														'nature_of_facility':nature_of_facility,
														'purpose_of_loan':purpose_of_loan,
														'Interest_type':Interest_type,
														'ffpl_plr':ffpl_plr,
														'rate_of_interest':rate_of_interest,
														'loan_amount':loan_amount,
														'property_insurance':property_insurance,
														'credit_shield':credit_shield,
														'total_loan_amount':total_loan_amount,
														'tenure':tenure,
														'EMI':EMI,
														'Emi_due_date':Emi_due_date,
														'repayment':repayment,
														'processing_fees':processing_fees,
														'MODT':MODT,
														//'CERSAI_1':CERSAI_1,
														//'CERSAI_2':CERSAI_2,
														'notice_of_intimation':notice_of_intimation,
														'Security':Security,
														'power_of_attorney':power_of_attorney,
														'Branch':Branch,
														'bank_name':bank_name,
														'account_number':account_number,
														'Repayment_account_holder_name':Repayment_account_holder_name,
														},
													success:function(data)
													{
														var obj =JSON.parse(data);
														if(obj.msg=='sucess')
														{
														 
															// $('#VERIFY_KYC').removeClass('disabled');
															 swal("success!",obj.response, "success").then(function() { 
															 	//window.location.reload();
															 	  window.location.replace("/finserv_test/dsa/dsa/index.php/Admin/Sanction_cum_acceptance_letter_F2_admin?ID="+obj.customer_id+"&CM="+obj.CM_ID);  
															 	 });
														
					              						}
														if(obj.msg=='fail')
														{ 
															//  $('#VERIFY_KYC').addClass('disabled');
															//  swal("warning!",obj.response, "warning").then(function() { window.location.reload(); });
																									
														}
												   
													}
										});
							   							   	   });
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
else
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
		        	  	<input hidden type="text" name="customer_id" id="customer_id"  value="<?php echo $row->UNIQUE_CODE;?>">
					 				<input hidden type="text" name="dsa_id" id="dsa_id"  value="<?php if(!empty($credit_manager_data)) { echo $credit_manager_data->UNIQUE_CODE;}else {echo $CM_ID; }?>">
								 	<div id="form-total" style="padding:40px;" >
		        				<!-- SECTION 1 ---------------------------------------------------------------------------------------------------------------- -->
			   			  		<section id="section1">
							 				<b><span id='tag'></span><br><span id='tag2'></span></b>
                 			<div class="row shadow bg-white rounded margin-10 padding-15 " style="padding:25px;" >
								    		<div class="col-sm-2" >
						        			<h4 style="font-weight:800; font-size:15px;"><b>SANCTION CUM ACCEPTANCE LETTER</b></h4><hr>
				            		</div>
				            		<?php
														if(!empty($Sanction_letter_details))
														{

																if($Sanction_letter_details->Letter_ID!=="")
																{
																	if($Sanction_letter_details->Status == "Approved")
																	{
																	?>
																		<div class="col-sm-2" style="margin-bottom:10px;">
																			<a target='_blank' href="<?php echo base_url()?>index.php/Credit_manager_user/Sanction_Letter?ID=<?php echo $row->UNIQUE_CODE;?>"><button type="button" class="btn btn-success">SANCTION <i class="fa fa-cloud-download" style="font-size:19px;margin-top:4px;"></i>&nbsp;&nbsp;</button></a>
																		</div>
																		<div class="col-sm-2">
																			<a target='_blank' href="<?php echo base_url()?>index.php/Credit_manager_user/MITAC_pdf?ID=<?php echo $row->UNIQUE_CODE;?>"><button type="button" class="btn btn-success">MITAC <i class="fa fa-cloud-download" style="font-size:19px;margin-top:4px;"></i>&nbsp;&nbsp;</button></a>
																		</div>
																		
																		<div class="col-sm-2">
																			<a target='_blank' href="<?php echo base_url()?>index.php/Disbursement_OPS/Loan_Aggrement_AUTO?I=<?php echo base64_encode($row->UNIQUE_CODE);?>"><button type="button" class="btn btn-success">Loan Agreement <i class="fa fa-cloud-download" style="font-size:19px;margin-top:4px;"></i>&nbsp;&nbsp;</button></a>
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
								   				<div class="col-sm-10">
					        					<h4 style="font-weight:800; font-size:15px;"><b>APPLICANT NAME</b></h4><hr>
  			            		  </div>
												</div>
												<div class="col-sm-12">
												<div class="col-sm-3">
													<div class="form-group">
														<label class="class_bold"></label>
   													<input type="text" class="form-control" id="applicant_name" name="applicant_name" value="<?php if(!empty($row)) { if(!empty($row)) echo $row->FN." ".$row->LN; }?>" required>
													</div>
												</div>
												
											</div>
												<div class="col-sm-12">
								   				<div class="col-sm-10">
					        					<h4 style="font-weight:800; font-size:15px;"><b>CO-APPLICANT NAME</b></h4><hr>
 			            		   </div>
												</div>
												<div class="col-sm-12">
												<?php
												 if(isset($coapplicants))  
																{
																  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																		{ 
												?>
												<div class="col-sm-3">
													<div class="form-group">
														<label ><b>CO-APPLICANT <?php echo $i;?></b></label>
   													<input type="text" class="form-control" id="coapplicant_name" name="coapplicant_name" value="<?php if(!empty($row)) { if(!empty($row)) echo $coapplicant->FN." ".$coapplicant->LN; }?>" required>
													</div>
												</div>
												<?php   $i++;
																		}
																}
												?>
												</div>
													
												<div class="col-sm-12 ">
													<table class="table  table-bordered ">
												    <tbody>
												    	<tr>
												        <td><b>Branch</b></td>
												        <td><input type="text" class="form-control" id="Branch" name="Branch" value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->Branch ;} ?>"></td>
												      </tr>
												      <tr>
												        <td><b>Nature of Facility</b></td>
												        <td>
												        	<select class="form-control" id="nature_of_facility" name="nature_of_facility">
																	  <option value="MSME / LAP TERM LOAN" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->nature_of_facility == 'MSME / LAP TERM LOAN') echo ' selected="selected"'; ?>>MSME / LAP TERM LOAN</option>
																	  <option value="Bill Discounting"  <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->nature_of_facility == 'Bill Discounting') echo ' selected="selected"'; ?>>Bill Discounting</option>
																	  <option value="Supply Chain Finance"  <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->nature_of_facility == 'Supply Chain Finance') echo ' selected="selected"'; ?>>Supply Chain Finance</option>
									   							</select>
																</td>
												      </tr>
												       <tr>
												        <td><b>Purpose of Loan</b></td>
												         <td>
												        		<select  name="purpose_of_loan" id="purpose_of_loan" class="form-control"> 
																		  <option value="">Select Reason *</option>
																		  <option value="Medical" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Medical') echo ' selected="selected"'; ?>>Medical</option>
																		 <option value="Personal (Others)" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Personal (Others)') echo ' selected="selected"'; ?>>Personal (Others)</option>
																		  <option value="Holiday" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Holiday') echo ' selected="selected"'; ?>>Holiday</option>
																		  <option value="Advance Salary" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Advance Salary') echo ' selected="selected"'; ?>>Advance Salary</option>
																		  <option value="Rental Deposit" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Rental Deposit') echo ' selected="selected"'; ?>>Rental Deposit</option>
																		  <option value="Wedding" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Wedding') echo ' selected="selected"'; ?>>Wedding</option>
																		  <option value="Credit Card Takeover" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Credit Card Takeover') echo ' selected="selected"'; ?>>Credit Card Takeover</option>		
																	      <option value="Business Expansion" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Business Expansion') echo ' selected="selected"'; ?>>Business Expansion</option>
																		  		 <option value="LAP-BT + top up" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'LAP-BT + top up') echo ' selected="selected"'; ?>>LAP-BT + top up</option>
																				   <!------------------------- added  by  papiha on 29_08_2022---------------------------------------------------------------  --->
																		  <option value="Business Stock Purchase- New products to be added in inventory" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Business Stock Purchase- New products to be added in inventory') echo ' selected="selected"'; ?>>Business Stock Purchase- New products to be added in inventory</option>
																		  <option value="Loan Reconsolidation" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Loan Reconsolidation') echo ' selected="selected"'; ?>>Loan Reconsolidation</option>
																		  <option value="Machine Purchase" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Machine Purchase') echo ' selected="selected"'; ?>>Machine Purchase</option>
																		  <option value="New property Purchase" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'New property Purchase') echo ' selected="selected"'; ?>>New property Purchase</option>
																		  <option value="Purchase of Business Premises" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Purchase of Business Premises') echo ' selected="selected"'; ?>>Purchase of Business Premises</option>
																		  <option value="Business - Working Capital " <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Business - Working Capital ') echo ' selected="selected"'; ?>>Business - Working Capital </option>
																		  <option value="Balance Transfer" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Balance Transfer') echo ' selected="selected"'; ?>>Balance Transfer</option>
																		  <option value="Top up on Balance Transfer" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Top up on Balance Transfer') echo ' selected="selected"'; ?>>Top up on Balance Transfer</option>
																		  <option value="Shop refurbishment" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Shop refurbishment') echo ' selected="selected"'; ?>>Shop refurbishment</option>
																		  <option value="Business Expansion" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Business Expansion') echo ' selected="selected"'; ?>>Business Expansion</option>
																		  <option value="Others" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Others') echo ' selected="selected"'; ?>>Others</option>						
																		<option value="Home Renovation" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->purpose_of_loan == 'Home Renovation') echo ' selected="selected"'; ?>>Home Renovation</option>
																		  
																		</select>


												        </td>
												      </tr>
												      <tr>
												        <td><b>Interest Type</b></td>
												        <td>
												        	<select class="form-control" id="Interest_type" name="Interest_type" >
																	  <option value="Fixed"  <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->Interest_type == 'Fixed') echo ' selected="selected"'; ?>>Fixed</option>
																	  <option value="Floating" <?php if(!empty($Sanction_letter_details))if ($Sanction_letter_details->Interest_type == 'Floating') echo ' selected="selected"'; ?>>Floating</option>
																	</select>
									   						</td>
												      </tr>
												      <tr>
												        <td><b>FFPL PLR (in %)</b></td>
												        <td><input type="number" class="form-control" id="ffpl_plr" name="ffpl_plr" value="<?php if(!empty($Sanction_letter_details)) echo $Sanction_letter_details->ffpl_plr; ?>"></td>
												      </tr>
												       <tr>
												        <td><b>Rate of Interest (in %)</b></td>
												        <td><input type="number" class="form-control" id="rate_of_interest" name="rate_of_interest" value="<?php if(!empty($Sanction_letter_details)) echo $Sanction_letter_details->rate_of_interest; ?>"></td>
												      </tr>
												       <tr>
												        <td><b>Loan Amount ( INR)</b></td>
												        <td>
												        	<table class="table table-bordered ">
																    <tbody>
																      <tr>
																        <td><b>Loan Amount</b></td>
																        <td><b>Property Insurance</b></td>
																        <td><b>Credit Shield</b></td>
																        <td><b>Total Loan Amount</b></td>
																      </tr>
																       <tr>
																        <td><input type="number" class="form-control" id="loan_amount" name="loan_amount" value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->loan_amount ;} else { echo $data_row_applied_loan->DESIRED_LOAN_AMOUNT ;}?>"></td>
																        <td><input type="number" class="form-control" id="property_insurance" name="property_insurance"  value="<?php if(!empty($Sanction_letter_details)) { echo $Sanction_letter_details->property_insurance ;}?>"></td>
																        <td><input type="number" class="form-control" id="credit_shield" name="credit_shield"  value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->credit_shield ;}?>"></td>
																        <td><input type="number" class="form-control" id="total_loan_amount" name="total_loan_amount"  value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->total_loan_amount ;}?>"></td>
																      </tr>
												        		</tbody>
												        	</table>
												        </td>
												      </tr>
												       <tr>
												        <td><b>Tenure (In Months)</b></td>
												        <td><input type="number" class="form-control" id="tenure" name="tenure"  value="<?php if(!empty($Sanction_letter_details)) echo $Sanction_letter_details->tenure; ?>" ></td>
												      </tr>
												       <tr>
												        <td><b>EMI (Equated Monthly Instalment)</b></td>
												        <td><input type="text" class="form-control" id="EMI" name="EMI"  value="<?php if(!empty($Sanction_letter_details)) echo $Sanction_letter_details->EMI; ?>"></td>
												      </tr>
												       <tr>
												        <td><b>EMI Due Date</b></td>
												        <td><input type="text" class="form-control" id="Emi_due_date" name="Emi_due_date"   value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->Emi_due_date; } else {echo "10th of every month";}?>"></td>
												      </tr>
												       <tr>
												        <td><b>Repayment</b></td>
												        <td><textarea class="form-control" id="repayment" name="repayment" row="3"><?php if(!empty($Sanction_letter_details)) { echo $Sanction_letter_details->repayment;} else {echo "For Partially Disbursed Case: Pre-EMI will be charged from 1st Disbursement till Loan is not fully disbursed or up to 12 months from 1st disbursement date whichever earlier.
																		• For First and Final Disbursement Case: Pre-EMI will be charged for the first month and equated monthly installment thereafter."; } ?></textarea>
															</td>
												      </tr>
												      <tr>
												      	 <td><b>Repayment Bank Details</b></td>
												      	<td>
												        	<table class="table table-bordered ">
																    <tbody>
																      <tr>
																      		<td><b>Account Holder Name</b></td>
																        <td><b>Bank Name</b></td>
																        <td><b>Account Number</b></td>
																     
																      </tr>
																       <tr>
																       	  	<td><input type="text" class="form-control" id="Repayment_account_holder_name" name="Repayment_account_holder_name" value="<?php if(!empty($Sanction_letter_details->Repayment_account_holder_name )) {echo $Sanction_letter_details->Repayment_account_holder_name ;} ?>"></td>
																        <td><input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php if(!empty($Sanction_letter_details->bank_name )) {echo $Sanction_letter_details->bank_name ;} ?>"></td>
																        <td><input type="text" class="form-control" id="account_number" name="account_number"  value="<?php if(!empty($Sanction_letter_details->account_number)) {echo $Sanction_letter_details->account_number ;}?>"></td>
																       
																      </tr>
												        		</tbody>
												        	</table>
												        </td>
												      </tr>
												       <tr>
												        <td><b>Processing Fees (Inclusive of GST)</b></td>
												        <td><input type="text" class="form-control" id="processing_fees" name="processing_fees"  value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->processing_fees ;}?>"></td>
												      </tr>
												       <tr>
												        <td><b>Other Charges ( Excluding GST)</b></td>
												        <td>
												        		<table class="table table-bordered ">
																	    <tbody>
																	      <tr>
																	        <td><b>MODT</b></td>
																	        <td><input type="text" class="form-control" id="MODT" name="MODT" value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->MODT ;} else {echo "As per prevailing State Government Charges" ;}?>"></td>
																	      </tr>
																	    	
																	      <tr>
																	        <td><b>Notice of Intimation</b></td>
																	        <td><input type="text" class="form-control" id="notice_of_intimation" name="notice_of_intimation" value="<?Php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->notice_of_intimation ;} else {echo "NA " ;}?>"></td>
																	      </tr>
																	    </tbody>
																	  </table>
												        </td>
												      </tr>
												      <tr>
												        <td><b>Security</b></td>
												        <td><input type="text" class="form-control" id="Security" name="Security" value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->Security ;} else { echo "1st Charge by way of registered mortgage (in the form and manner as prescribed by FFPL)";}?>"></td>
												      </tr>
												      <tr>
												        <td><b>Power of Attorney</b></td>
												        <td><input type="text" class="form-control" id="power_of_attorney" name="power_of_attorney" value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->power_of_attorney ;} else { echo "NA";}?>"></td>
												      </tr>
												      <tr>
												        <td><b>Property Address of Loan Sanctioned</b></td>
												        <td><input type="text" class="form-control" id="property_address" name="property_address" value="<?php if(!empty($Sanction_letter_details)) {echo $Sanction_letter_details->property_address ;}  ?>"></td>
												      </tr>
												    </tbody>
												  </table>
												  <hr>
												  
													
												</div>
												<br>
												<input hidden type="text"  id="LOGIN_CREDIT_MANAGER_ID" value="<?php echo $CM_ID;?>">


												<?php
														if(!empty($Sanction_letter_details))
														{

																if($Sanction_letter_details->Letter_ID!=="")
																{
																	if($Sanction_letter_details->Status == "Approved")
																	{
																	?>
																     	<div class="col-sm-12" style="">
																							<a class="dropdown-item" href="<?php echo base_url()?>index.php/Admin/Sanction_cum_acceptance_letter_F2_admin?ID=<?php echo $row->UNIQUE_CODE;?>&CM=<?php echo $CM_ID;?>"><button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" >Approved</button></a>
								     										</div>
																	
																		<?php
																	}
																	else if($Sanction_letter_details->Status == "Revert")
																	{
																		?>
																		<div class="col-sm-12" style="">
																							<a class="dropdown-item" href="<?php echo base_url()?>index.php/Admin/Sanction_cum_acceptance_letter_F2_admin?ID=<?php echo $row->UNIQUE_CODE;?>&CM=<?php echo $CM_ID;?>"><button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" >Send for revert</button></a>
								     										</div>
																		<?php
																	}
																	else if($Sanction_letter_details->Status == "Rejected")
																	{
																		?>
																			<div class="col-sm-12" style="">
																							<a class="dropdown-item" href="<?php echo base_url()?>index.php/Admin/Sanction_cum_acceptance_letter_F2_admin?ID=<?php echo $row->UNIQUE_CODE;?>&CM=<?php echo $CM_ID;?>"><button class="login100-form-btn" style="font-weight:700;background-color:red;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" >Rejected</button></a>
								     										</div>
																			<?php
																	}
																	else if($Sanction_letter_details->Status == "Submited for Approval")
																	{
																		?>
																			<div class="col-sm-12" style="">
																					<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="save_and_continue_sanction_form_1" id="save_and_continue_sanction_form_1">SAVE AND CONTINUE</button>
								     										</div>
																		<?php
																	}
																	else
																	{
																		?>
												
				     											<div class="col-sm-12" style="">
																					<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="save_and_continue_sanction_form_1" id="save_and_continue_sanction_form_1">SAVE AND CONTINUE</button>
								     										</div>
																		
																		<?php
																	}
																}
																else
																{
																		?>
																				<div class="col-sm-12" style="">
																					<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="save_and_continue_sanction_form_1" id="save_and_continue_sanction_form_1">SAVE AND CONTINUE</button>
								     										</div>
																		
																		<?php
																}
														}
														else
														{
																?>
																	<div class="col-sm-12" style="">
																		<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="save_and_continue_sanction_form_1" id="save_and_continue_sanction_form_1">SAVE AND CONTINUE</button>
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



	      

		  $("#loan_amount").keyup(function(){
			  var property_insurance =parseInt($('#property_insurance').val())
			  var credit_shield =parseInt($('#credit_shield').val())
			  var loan_amount =parseInt($('#loan_amount').val())
			  var total_loan_amount =((property_insurance + credit_shield + loan_amount))
        document.getElementById('total_loan_amount').value= total_loan_amount;

		    	var emi = 0;
			    var P = 0;
			    var n = 1;
			    var r = 0;   

			    if($("#total_loan_amount").val() !== "")
			       P = parseFloat($("#total_loan_amount").val());
			                   
			                        
			    if ($("#rate_of_interest").val() !== "") 
			      r = parseFloat(parseFloat($("#rate_of_interest").val()) / 100);

			    if ($("#tenure").val() !== "")
			        n = parseFloat($("#tenure").val());
			                    
			                  
			    if (P !== 0 && n !== 0 && r !== 0)
			    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
              
    			$("#emi").val(emi.toFixed(2));
     			document.getElementById('EMI').value= emi.toFixed(2);
     			var processing_fee= (total_loan_amount*0.02)*1.18
          document.getElementById('processing_fees').value= processing_fee.toFixed(2);


              });
		   $("#credit_shield").keyup(function(){
			  var property_insurance =parseInt($('#property_insurance').val())
			  var credit_shield =parseInt($('#credit_shield').val())
			  var loan_amount =parseInt($('#loan_amount').val())
			  var total_loan_amount =((property_insurance + credit_shield + loan_amount))
              document.getElementById('total_loan_amount').value= total_loan_amount;
              var emi = 0;
					    var P = 0;
					    var n = 1;
					    var r = 0;   

				    if($("#total_loan_amount").val() !== "")
				       P = parseFloat($("#total_loan_amount").val());
				                   
				                        
				    if ($("#rate_of_interest").val() !== "") 
				      r = parseFloat(parseFloat($("#rate_of_interest").val()) / 100);

				    if ($("#tenure").val() !== "")
				        n = parseFloat($("#tenure").val());
                    
                  
					    if (P !== 0 && n !== 0 && r !== 0)
					    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
					              
					    $("#emi").val(emi.toFixed(2));
					     document.getElementById('EMI').value= emi.toFixed(2);
					     var processing_fee= (total_loan_amount*0.02)*1.18
           document.getElementById('processing_fees').value= processing_fee.toFixed(2);
              });

		    $("#property_insurance").keyup(function(){
			  var property_insurance =parseInt($('#property_insurance').val())
			  var credit_shield =parseInt($('#credit_shield').val())
			  var loan_amount =parseInt($('#loan_amount').val())
			  var total_loan_amount =((property_insurance + credit_shield + loan_amount))
              document.getElementById('total_loan_amount').value= total_loan_amount;
            
              var emi = 0;
	    var P = 0;
	    var n = 1;
	    var r = 0;   

    if($("#total_loan_amount").val() !== "")
       P = parseFloat($("#total_loan_amount").val());
                   
                        
    if ($("#rate_of_interest").val() !== "") 
      r = parseFloat(parseFloat($("#rate_of_interest").val()) / 100);

    if ($("#tenure").val() !== "")
        n = parseFloat($("#tenure").val());
                    
                  
    if (P !== 0 && n !== 0 && r !== 0)
    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
              
    $("#emi").val(emi.toFixed(2));
     document.getElementById('EMI').value= emi.toFixed(2);
     var processing_fee= (total_loan_amount*0.02)*1.18
  document.getElementById('processing_fees').value= processing_fee.toFixed(2);


              });

		    $("#tenure").keyup(function(){
			  var property_insurance =parseInt($('#property_insurance').val())
			  var credit_shield =parseInt($('#credit_shield').val())
			  var loan_amount =parseInt($('#loan_amount').val())
			  var total_loan_amount =((property_insurance + credit_shield + loan_amount))
              document.getElementById('total_loan_amount').value= total_loan_amount;
            
              var emi = 0;
	    var P = 0;
	    var n = 1;
	    var r = 0;   

    if($("#total_loan_amount").val() !== "")
       P = parseFloat($("#total_loan_amount").val());
                   
                        
    if ($("#rate_of_interest").val() !== "") 
      r = parseFloat(parseFloat($("#rate_of_interest").val()) / 100);

    if ($("#tenure").val() !== "")
        n = parseFloat($("#tenure").val());
                    
                  
    if (P !== 0 && n !== 0 && r !== 0)
    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
              
    $("#emi").val(emi.toFixed(2));
     document.getElementById('EMI').value= emi.toFixed(2);

     var processing_fee= (total_loan_amount*0.02)*1.18
  document.getElementById('processing_fees').value= processing_fee.toFixed(2);

              });

		     $("#rate_of_interest").keyup(function(){
			  var property_insurance =parseInt($('#property_insurance').val())
			  var credit_shield =parseInt($('#credit_shield').val())
			  var loan_amount =parseInt($('#loan_amount').val())
			  var total_loan_amount =((property_insurance + credit_shield + loan_amount))
              document.getElementById('total_loan_amount').value= total_loan_amount;
            
              var emi = 0;
	    var P = 0;
	    var n = 1;
	    var r = 0;   

    if($("#total_loan_amount").val() !== "")
       P = parseFloat($("#total_loan_amount").val());
                   
                        
    if ($("#rate_of_interest").val() !== "") 
      r = parseFloat(parseFloat($("#rate_of_interest").val()) / 100);

    if ($("#tenure").val() !== "")
        n = parseFloat($("#tenure").val());
                    
                  
    if (P !== 0 && n !== 0 && r !== 0)
    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
              
    $("#emi").val(emi.toFixed(2));
     document.getElementById('EMI').value= emi.toFixed(2);

   var processing_fee= (total_loan_amount*0.02)*1.18
  document.getElementById('processing_fees').value= processing_fee.toFixed(2);




              });
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
											     swal("success!", "Status added successfully", "success").then( function() {   window.location.replace("/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
												
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
												
												  swal("success!", "Status added successfully", "success").then( function() {   window.location.replace("/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
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
											
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
												
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
						</script>

						  <script>
							   $( "#save_and_continue_sanction_form_1" ).click(function() {
							 
							   		 var customer_id=document.getElementById("customer_id").value; 
									
							   		 var credit_manager_id=document.getElementById("dsa_id").value; 
										 var property_address =document.getElementById("property_address").value; 
										 var nature_of_facility =document.getElementById("nature_of_facility").value; 
										 var purpose_of_loan =document.getElementById("purpose_of_loan").value; 
										 var Interest_type =document.getElementById("Interest_type").value; 
										 var ffpl_plr =document.getElementById("ffpl_plr").value; 
										 var rate_of_interest =document.getElementById("rate_of_interest").value;
										 var loan_amount =document.getElementById("loan_amount").value; 
										 var property_insurance =document.getElementById("property_insurance").value; 
										 var credit_shield =document.getElementById("credit_shield").value;
										 var total_loan_amount =document.getElementById("total_loan_amount").value; 

										 var tenure =document.getElementById("tenure").value; 
										 var EMI =document.getElementById("EMI").value; 
										 var Emi_due_date =document.getElementById("Emi_due_date").value;
										 var repayment =document.getElementById("repayment").value; 

										 var processing_fees =document.getElementById("processing_fees").value; 
										 var MODT =document.getElementById("MODT").value; 
										 //var CERSAI_1 =document.getElementById("CERSAI_1").value;
										 //var CERSAI_2 =document.getElementById("CERSAI_2").value; 

										 var notice_of_intimation =document.getElementById("notice_of_intimation").value; 
										 var Security =document.getElementById("Security").value; 
										 var power_of_attorney =document.getElementById("power_of_attorney").value;
										 	 var Branch =document.getElementById("Branch").value; 
										 	 	 	 var bank_name =document.getElementById("bank_name").value;
										 	 	 var account_number =document.getElementById("account_number").value;
												 		 var Repayment_account_holder_name =document.getElementById("Repayment_account_holder_name").value;
										
										// var property_address =document.getElementById("property_address").value; 

										  if(property_address=='')
											{
												swal("warning!", "Please Enter Property Address", "warning");
												return false;
											}
										  else if(nature_of_facility=='')
											{
												swal("warning!", "Please Enter Nature Of Facility", "warning");
												return false;
											}
										  else if(purpose_of_loan=='')
											{
												swal("warning!", "Please Enter Purpose of loan", "warning");
												return false;
											}
										  else if(Interest_type=='')
											{
												swal("warning!", "Please Enter Interest type", "warning");
												return false;
											}
										  else if(ffpl_plr=='')
											{
												swal("warning!", "Please Enter ffpl plr", "warning");
												return false;
											}
										  else if(rate_of_interest=='')
											{
												swal("warning!", "Please Select Rate of interest", "warning");
												return false;
											}
										  else if(loan_amount=='')
											{
												swal("warning!", "Please Enter loan amount", "warning");
												return false;
											}
										  else if(property_insurance=='')
											{
												swal("warning!", "Please Enter Property Insurance", "warning");
												return false;
											}
										  else if(credit_shield=='')
											{
												swal("warning!", "Please Enter Credit shield", "warning");
												return false;
											}
											else if(total_loan_amount=='')
											{
												swal("warning!", "Please Enter total loan amount", "warning");
												return false;
											}
											else if(tenure=='')
											{
												swal("warning!", "Please Enter Tenure", "warning");
												return false;
											}
											else if(EMI=='')
											{
												swal("warning!", "Please Enter EMI", "warning");
												return false;
											}
											else if(Emi_due_date=='')
											{
												swal("warning!", "Please Enter Emi due date", "warning");
												return false;
											}
											else if(repayment=='')
											{
												swal("warning!", "Please Enter repayment", "warning");
												return false;
											}
											else if(processing_fees=='')
											{
												swal("warning!", "Please Enter Processing fee ", "warning");
												return false;
											}
											else if(MODT=='')
											{
												swal("warning!", "Please Enter MODT ", "warning");
												return false;
											}
											/*else if(CERSAI_1=='')
											{
												swal("warning!", "Please Enter CERSAI ", "warning");
												return false;
											}
											else if(CERSAI_2=='')
											{
												swal("warning!", "Please Enter CERSAI ", "warning");
												return false;
											}*/
											else if(notice_of_intimation=='')
											{
												swal("warning!", "Please Enter notice of intimation", "warning");
												return false;
											}
											else if(Security=='')
											{
												swal("warning!", "Please Enter Security ", "warning");
												return false;
											}
											else if(power_of_attorney=='')
											{
												swal("warning!", "Please Enter power of attorney ", "warning");
												return false;
											}
											else if(processing_fees=='')
											{
												swal("warning!", "Please Enter Processing fee ", "warning");
												return false;
											}
												else if(bank_name=='')
											{
												swal("warning!", "Please Enter Bank Name ", "warning");
												return false;
											}
												else if(account_number=='')
											{
												swal("warning!", "Please Enter Bank Account Number ", "warning");
												return false;
											}





										$.ajax({
													type:'POST',
													url:'<?php echo base_url("index.php/credit_manager_user/submit_sanction_letter_form_one"); ?>',
													data:{
														'customer_id':customer_id,
														'credit_manager_id':credit_manager_id,
														'property_address':property_address,
														'nature_of_facility':nature_of_facility,
														'purpose_of_loan':purpose_of_loan,
														'Interest_type':Interest_type,
														'ffpl_plr':ffpl_plr,
														'rate_of_interest':rate_of_interest,
														'loan_amount':loan_amount,
														'property_insurance':property_insurance,
														'credit_shield':credit_shield,
														'total_loan_amount':total_loan_amount,
														'tenure':tenure,
														'EMI':EMI,
														'Emi_due_date':Emi_due_date,
														'repayment':repayment,
														'processing_fees':processing_fees,
														'MODT':MODT,
														//'CERSAI_1':CERSAI_1,
														//'CERSAI_2':CERSAI_2,
														'notice_of_intimation':notice_of_intimation,
														'Security':Security,
														'power_of_attorney':power_of_attorney,
														'Branch':Branch,
														'bank_name':bank_name,
														'account_number':account_number,
														'Repayment_account_holder_name':Repayment_account_holder_name,
														},
													success:function(data)
													{
														var obj =JSON.parse(data);
														if(obj.msg=='sucess')
														{
														 
															// $('#VERIFY_KYC').removeClass('disabled');
															 swal("success!",obj.response, "success").then(function() { 
															 	//window.location.reload();
															 	  window.location.replace("/finserv_test/dsa/dsa/index.php/Admin/Sanction_cum_acceptance_letter_F2_admin?ID="+obj.customer_id+"&CM="+obj.CM_ID);  
															 	 });
														
					              						}
														if(obj.msg=='fail')
														{ 
															//  $('#VERIFY_KYC').addClass('disabled');
															//  swal("warning!",obj.response, "warning").then(function() { window.location.reload(); });
																									
														}
												   
													}
										});
							   							   	   });
															   
														
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
		   }
	   }
	   );
</script>

