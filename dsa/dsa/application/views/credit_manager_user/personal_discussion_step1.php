<?php 
  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
  $id = $_GET['ID']; // shows id of customer
  $this->session->set_userdata("id",$id);
  $this->session->set_userdata("id1",$id1);
  $month = date('m');
  $day = date('d');
  $year = date('Y');
  $today = $year . '-' . $month . '-' . $day;
 // echo $row_more->STATUS;
 // exit();
  //echo $id1;
  //echo $id;
  //exit();
?>
<?php $this->session->set_userdata("CM_ID",$CM_ID);

if(!empty($data_row_PD_details))
{
$Basic_details_JSON = json_decode($data_row_PD_details->Basic_details_JSON);
$Applicant_details_JSON = json_decode($data_row_PD_details->Applicant_details_JSON);
$Applicant_family_details_JSON=json_decode($data_row_PD_details->Applicant_family_details_JSON);
$Applicant_family_members_JSON=json_decode($data_row_PD_details->Applicant_family_members_JSON);
$current_employement_json=json_decode($data_row_PD_details->current_employement_json);
$pd_details_json=json_decode($data_row_PD_details->pd_details_json);
$business_details_json=json_decode($data_row_PD_details->business_details_json);
}
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

//==================================================================
.designe{
	border:1px solid ;
	
}
.block:after {
  color: #ccc;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
  margin-top: -1px;
}
.block1:after {
  color: #ccc;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
  margin-top: -82px;
}

.block1:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}
.block1 {
  background-color: #ccc;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}

.block:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}
.block {
  background-color: #ccc;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_Active {
  background-color: #25a6c6;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_Active:after {
  color: #25a6c6;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
}

.block_Active:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}
.block_completed {
  background-color: #83dcf0;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  margin:16px;
}
.block_completed:after {
  color: #83dcf0;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
}

.block_completed:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}


.block_hold {
  background-color: yellow;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_reject {
  background-color: red;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_font{
	margin-left:7%;
	font-size:12px;
	color:gray;
}
.block_font_active{
	margin-left:7%;
	font-size:12px;
	color:White;
}
</style>

<button class="material-icons floating-btn" onclick="openForm()" id="menu_button"><i class="fa fa-align-justify"></i></button>

<div class="chat-popup" id="myForm">
  <form class="form-container">
	<button type="button" class="close" aria-label="Close" onclick="closeForm()" style="color:red;margin-top:-5px;">
	 <span aria-hidden="true">&times;</span>
	<br>	</button>

	<ul class="c-sidebar-nav">
	<button type="button" class="btn btn-outline-info" onClick="continue_();"id="btn_continue">CONTINUE</button>
	<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#holdModal" id="btn_hold">HOLD</button>
	<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#rejectionModal" id="btn_reject">REJECT</button>
	</ul>
  </form>
</div>
<body onload="myFunction(); Check_status() ;">
	<div class="margin-10 padding-5">
		  <div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
		
<!--<a href="'.base_url().'index.php/credit_manager_user/credit_sanction_loan_first_level?ID='.$row->UNIQUE_CODE.'&CM='.$CM_ID.'"  class="btn modal_test" target="_blank"><i class="fa fa-edit text-right" style="color:blue;"></i></a> -->
							<?php if(isset($row_more))
									{
							   	 if($row_more->STATUS =='PD Completed')
										{
											?>
												<div class="col-sm-3 block_completed" >
														<a  href="<?php echo base_url()?>index.php/credit_manager_user/View_Personal_Disussion_details?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
															<span class="block_font_active">1. &nbsp;PD Process</span>
														</a>
												</div> 
												<div class="col-sm-3 block_Active" ><a  href="<?php echo base_url()?>index.php/credit_manager_user/credit_sanction_loan_first_level?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>"><span class="block_font_active">2. &nbsp;Sanction Recommendation</span> 		</a></div>
											
												<div class="col-sm-3 block" ><span class="block_font">3. &nbsp;Sanction Letter</span></div> 
											<?php
										}
										else if($row_more->STATUS =='Loan Recommendation Approved')
										{
											?>
											<div class="col-sm-3 block_completed" >
												<a  href="<?php echo base_url()?>index.php/credit_manager_user/View_Personal_Disussion_details?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
													<span class="block_font_active">1. &nbsp;PD Generated</span>
												</a>
												</div> 
											<div class="col-sm-3 block_completed" >
													<a  href="<?php echo base_url()?>index.php/credit_manager_user/credit_sanction_loan_first_level?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
														<span class="block_font_active">2. &nbsp;Sanction Recommendation Approved</span>
													</a></div> 
											<div class="col-sm-3 block_Active" >
												<a  href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_cum_acceptance_letter?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>"><span class="block_font_active">
												<span class="block_font_active">3. &nbsp;Sanction Letter</span>
												</a>
											</div> 
											<?php
										}
										else if($row_more->STATUS =='Cam details complete')
										{
											?>
												<div class="col-sm-3 block_Active" >
																										<span class="block_font_active">1. &nbsp;PD Process</span>

												</div> 
												<div class="col-sm-3 block" ><span class="block_font_active">2. &nbsp;Sanction Recommendation</span> </div>
											
												<div class="col-sm-3 block" ><span class="block_font">3. &nbsp;Sanction Letter</span></div> 
											<?php
										}
										else
										{
											?>
											<div class="col-sm-3 block_completed" >
												<a  href="<?php echo base_url()?>index.php/credit_manager_user/View_Personal_Disussion_details?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
													<span class="block_font_active">1. &nbsp;PD Process</span>
												</a>
												</div> 
											<div class="col-sm-3 block_completed" >
												<a  href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_cum_acceptance_letter?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
												<span class="block_font_active">2. &nbsp;Sanction Recommendation</span>
													</a>
											</div> 
											<div class="col-sm-3 block_completed" ><span class="block_font_active">3. &nbsp;Sanction Letter</span></div> 
											<?php
										}
									}
									?>
					
						
				
				
				
							
		</div>
</div>
<?php
if(!empty($data_row_applied_loan))
{
?>

	<div class="" style="" id="border_style">
	    <div class="row  shadow bg-white rounded margin-10 padding-15" id="border_style">
			<div class="wizard-form" >
				<div class="wizard-header"style="padding:20px;">
				</div>
				<!--<form class="form-register" id="myform" action="<?= base_url('index.php/credit_manager_user/personal_discussion')?>" method="post">-->
				 	<form class="form-register"  id="form_1" action="<?php echo base_url()?>index.php/credit_manager_user/PD_section_one" method="post">
		        	  <input hidden type="text" name="customer_id" id="customer_id"  value="<?php echo $row->UNIQUE_CODE;?>">
					  <input hidden type="text" name="dsa_id" id="dsa_id"  value="<?php if(!empty($credit_manager_data)) { echo $credit_manager_data->UNIQUE_CODE;}else {echo $CM_ID; }?>">
							 									 
					 <div id="form-total" style="padding:10px;" >
		        		<!-- SECTION 1 ---------------------------------------------------------------------------------------------------------------- -->
			   			  <section id="section1" >
							 	<b><span id='tag'></span><br><span id='tag2'></span></b>
                                                                		
							<div class="row shadow bg-white rounded margin-10 padding-15 " style="padding:25px;" >
							    <div class="col-sm-6" >
					        		<h4 style="font-weight:800"><b>BASIC DETAILS</b></h4><hr>
			            		</div>
								<?php if(!empty($credit_manager_data)) {?>
								 <div class="col-sm-4">
					        		<h4 style="font-weight:800 ; color:green;"><b>PD Created by : <?php echo $credit_manager_data->FN." ".$credit_manager_data->LN; ?></b></h4><hr>
			            		</div>
								<?php }
								else
								{
									?>
								 <div class="col-sm-3">
					       	     </div>
								<?php
								}?>
								<?php if(isset($data_row_pd_table))
								{

								    if($data_row_pd_table->PD_STATUS =='Completed')
									{
									?>
										 <div class="col-sm-2">
					        				<a target='_blank' href="<?php echo base_url()?>index.php/Credit_manager_user/pdf?ID=<?php echo $row->UNIQUE_CODE;?>"><button type="button" class="btn btn-success">DOWNLOAD PD</button></a>
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
										<label class="class_bold">APPLICATION ID</label>
   										<input type="text" class="form-control" id="LeadID" name="LeadID" value="<?php if(isset($data_row_applied_loan)) echo $data_row_applied_loan->Application_id; ?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">PD DONE WITH</label>
   										<input type="text" class="form-control" id="PDDoneWith" name="PDDoneWith" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->PDDoneWith; }?>" required>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">PRIMARY PROFILE OF PD PERSON</label>
										   	<select class="form-control" aria-label="Default select example" id="PrimaryProfileOfPDPerson" name="PrimaryProfileOfPDPerson">
  												<option value="">select</option>
												<option value="SENP"  <?php if(!empty($data_row_PD_details)) if(!empty($Basic_details_JSON)) if($Basic_details_JSON->PrimaryProfileOfPDPerson == 'SENP') echo ' selected="selected"'; ?>>SENP</option>
  												<option value="SEP"   <?php if(!empty($data_row_PD_details)) if(!empty($Basic_details_JSON)) if($Basic_details_JSON->PrimaryProfileOfPDPerson == 'SEP') echo ' selected="selected"'; ?>>SEP</option>
  												<option value="SE"    <?php if(!empty($data_row_PD_details)) if(!empty($Basic_details_JSON)) if($Basic_details_JSON->PrimaryProfileOfPDPerson == 'SE') echo ' selected="selected"'; ?>>SE</option>
 												<option value="SALARIED"    <?php if(!empty($data_row_PD_details)) if(!empty($Basic_details_JSON)) if($Basic_details_JSON->PrimaryProfileOfPDPerson == 'SALARIED') echo ' selected="selected"'; ?>>SALARIED</option>
 												
												</select>
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">PERSON MET</label>
    									<input type="text" class="form-control" id="PersonMet" name="PersonMet" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->PersonMet; }?>">
  									</div>
								</div>		
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">PRODUCT</label>
   										<input type="text" class="form-control" id="Product" name="Product" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->Product; }?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">DATE</label>
   										<input type="date" class="form-control" id="Date" name="Date" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->Date; }?>" required> 
									</div>
								</div>
								
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">PD DONE BY</label>
    									<input type="text" class="form-control" id="PDDoneby" name="PDDoneby" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->PDDoneby; }?>" required>
  									</div>
								</div>
								<div class="col-sm-3"></div>
								<div class="col-sm-3"></div>
			
								<div class="col-sm-12">
									<div class="form-group">
										<label class="class_bold">PD ADDRESS</label>
    									<input type="text" class="form-control" id="PDAddress" name="PDAddress" value="<?php if(!empty($data_row_PD_details)) { if(!empty($pd_details_json)) echo $pd_details_json->PDAddress; }?>" required>
  									</div>
								</div>
						
								<!----------------------------------------------------------------------------------------------------------------------- -->
								<div class="col-sm-12">
								   <div class="col-sm-10">
					        		<h4 style="font-weight:800"><b>APPLICANT DETAILS</b></h4><hr>
 			            		   </div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">NAME</label>
    									<input type="text" class="form-control" id="applicant_name" name="applicant_name" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->applicant_name; } else { if(!empty($row)) echo $row->FN." ".$row->MN." ".$row->LN;} ?>" >
  									</div>
								</div>
								<?php
								  if(isset($row)) 
								  {
									    $dateOfBirth = $row->DOB;
										$today = date("d-m-Y");
										$diff = date_diff(date_create($dateOfBirth), date_create($today));
									    $age= $diff->format('%y');
								  }
								?>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">AGE</label>
    									<input type="number" class="form-control" id="age" name="age" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->age;  }else { echo $age; }?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">OCCUPATION</label>
    									<input type="text" class="form-control" id="occupation" name="occupation" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->occupation; }else { echo $data_row_income->CUST_TYPE; }?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">INCOME YEARLY</label>
    									<input type="number" class="form-control" name="app_income" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->app_income; }?>">
  									</div>
								</div>	
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">EMAIL ID</label>
    									<input type="email" class="form-control" id="email_id" name="email_id" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->email_id; } else { if(!empty($row)) echo $row->EMAIL;}?>">
  									</div>
								</div>	
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">EDUCATION </label>
    									<input type="text" class="form-control" id="app_education" name="app_education" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->app_education; }else { if(!empty($row)) echo $row->EDUCATION_BACKGROUND;}?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">CONTACT NUMBER</label>
    									<input type="text" class="form-control" id="app_contact" name="app_contact" minlength="10" maxlength="10" required oninput="maxLengthCheck(this)" pattern="[6-9]{1}[0-9]{9}" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->app_contact; }else { if(!empty($row)) echo $row->MOBILE;}?>">
  									</div>
								</div>	
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">ALTERNATIVE CONTACT NUMBER</label>
    									<input type="text" class="form-control" id="app_alternative_contact" name="app_alternative_contact" minlength="10" maxlength="10" required oninput="maxLengthCheck(this)" pattern="[6-9]{1}[0-9]{9}" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_details_JSON)) if(isset($Applicant_details_JSON->app_alternative_contact)) echo $Applicant_details_JSON->app_alternative_contact; }else { if(!empty($row)) echo $row->Alternative_mobile;}?>">
  									</div>
								</div>	
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">WORKING SINCE(YEARS)</label>
    									<input type="number" class="form-control" name="working_since" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->working_since; }?>">
  									</div>
								</div>
								



								<!----------------------------------------------------- added by priya 8-8-2022------------------------------------------------------- -->
								<div class="col-sm-12">
								   <div class="col-sm-10">
					        	   <h4 style="font-weight:800"><b>LOAN APPLICATION DETAILS</b></h4><hr>
 			             </div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">FINAL LOAN AMOUNT *</label>
    									<input required type="number" class="form-control" name="final_loan_amount" value="<?php if(!empty($data_row_PD_details)) {  echo $data_row_PD_details->final_loan_amount; }?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">FINAL ROI *</label>
    									<input required type="number" step="any" class="form-control" name="final_roi"  value="<?php if(!empty($data_row_PD_details)) {  echo $data_row_PD_details->final_roi; }?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">FINAL TENURE *</label>
    									<input required type="number" step="any" class="form-control" name="final_tenure"  value="<?php if(!empty($data_row_PD_details)) {  echo $data_row_PD_details->final_tenure; }?>">
  									</div>
								</div>

								<!------------------------------------------------------------------------------------------------------------ -->
								<div class="col-sm-12">
								   <div class="col-sm-10">
					        	   <h4 style="font-weight:800"><b>CO-APPLICANT DETAILS</b></h4><hr>
 			            		   </div>
								</div>
								 <div class="col-sm-12">
										<div id="wrapper">
											<div style="overflow-x:auto;">
												<table class="table table-bordered">
												   
														<!-------------------------------------------------------------- -->
													 <tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">COAPPLICANT</span></td>
						  								  <?php 
														 if(!empty($data_row_PD_details->Coapplicant_details_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['co_number']))
															  {
															  ?>
						  								         <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"><input class = "form-control" type="text" id="co_number"   name="co_number[]"   value="<?php echo $value['co_number']?>"></span></td>
						 								  <?php
															  }
															}
														  }
														 }else 
														 {
                                                          if(isset($coapplicants))  
																{
																  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																		{ 
																	?>
																 <td><input class = "form-control" type="text"  id="co_number" name="co_number[]" value="<?php echo $i; ?>"></td> 
																  <?php $i++;
																		}
																}
														 }
														 ?>
													</tr>
														<!-------------------------------------------------------------- -->
													<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">NAME</span></td>
						  								  <?php 
														 if(!empty($data_row_PD_details->Coapplicant_details_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['co_name']))
															  {
															  ?>
						  								         <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"><input class = "form-control" type="text" id="co_name" name="co_name[]" value="<?php echo $value['co_name']?>"> </span></td>
						 								  <?php
															  }
															}
														  }
														 }else 
														 {
                                                          if(isset($coapplicants))  
																{
																  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																		{ 
																	?>
																 <td><input class = "form-control" type="text"  id="co_name" name="co_name[]" value="<?php echo $coapplicant->FN." ".$coapplicant->LN;?>"></td>
								    									
																  <?php $i++;
																		}
																}
														 }
														 ?>
													</tr>
														<!-------------------------------------------------------------- -->
													<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">RELATION</span></td>
						  								  <?php 
														 if(!empty($data_row_PD_details->Coapplicant_details_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['co_number']))
															  {
															  ?>
						  								         <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"><input class = "form-control" type="text" id="co_relation" name="co_relation[]" value="<?php echo $value['co_relation']?>" required> </span></td>
						 								  <?php
															  }
															}
														  }
														 }else 
														 {
                                                          if(isset($coapplicants))  
																{
																  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																		{ 
																	?>
																 <td><input class = "form-control" type="text"  id="co_relation" name="co_relation[]" value="<?php echo $coapplicant->relation;?>"></td> 
								    									
																  <?php $i++;
																		}
																}
														 }
														 ?>
													</tr>
												    			<!-------------------------------------------------------------- -->
													<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">AGE</span></td>
						  								  <?php 
														 if(!empty($data_row_PD_details->Coapplicant_details_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['co_number']))
															  {
															  ?>
						  								         <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"><input class = "form-control" type="text" id="co_age" name="co_age[]" value="<?php echo $value['co_age']?>"> </span></td>
						 								  <?php
															  }
															}
														  }
														 }else 
														 {
                                                          if(isset($coapplicants))  
																{
																  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																		{ 
																	?>
																 <td><input class = "form-control" type="number"  id="co_age" name="co_age[]" value="<?php echo $coapplicant->AGE;?>"></td> 
								    									
																  <?php $i++;
																		}
																}
														 }
														 ?>
													</tr>
												
													<!----------------------------------------------------------------------------------------------------- -->
													<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">OCCUPATION</span></td>
						  								  <?php 
														 if(!empty($data_row_PD_details->Coapplicant_details_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['co_number']))
															  {
															  ?>
						  								         <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"><input class = "form-control" type="text" id="co_occupation" name="co_occupation[]" value="<?php echo $value['co_occupation']?>" required> </span></td>
						 								  <?php
															  }
															}
														  }
														 }else 
														 {
                                                          if(isset($coapplicants))  
																{
																  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																		{ 
																	?>
																 <td><input class = "form-control" type="text"  id="co_occupation" name="co_occupation[]"></td> 
								    									
																  <?php $i++;
																		}
																}
														 }
														 ?>
													</tr>

													<!----------------------------------------------------------------------------------------------------- -->
													<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">INCOME YEARLY</span></td>
						  								  <?php 
														 if(!empty($data_row_PD_details->Coapplicant_details_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['co_number']))
															  {
															  ?>
						  								         <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"><input class = "form-control" type="number" id="co_income_mon_or_year" name="co_income_mon_or_year[]" value="<?php echo $value['co_income_mon_or_year']?>" required> </span></td>
						 								  <?php
															  }
															}
														  }
														 }else 
														 {
                                                          if(isset($coapplicants))  
																{
																  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																		{ 
																	?>
																  <td><input class = "form-control" type="number"  id="co_income_mon_or_year" name="co_income_mon_or_year[]"></td> 
								    									
																  <?php $i++;
																		}
																}
														 }
														 ?>
													</tr>

													<!----------------------------------------------------------------------------------------------------- -->
													<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">EDUCATION</span></td>
						  								  <?php 
														 if(!empty($data_row_PD_details->Coapplicant_details_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['co_number']))
															  {
															  ?>
						  								         <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"><input class = "form-control" type="text" id="co_education" name="co_education[]" value="<?php echo $value['co_education']?>"> </span></td>
						 								  <?php
															  }
															}
														  }
														 }else 
														 {
                                                          if(isset($coapplicants))  
																{
																  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																		{ 
																	?>
																 <td><input class = "form-control" type="text"  id="co_education" name="co_education[]" value="<?php echo $coapplicant->EDUCATION_BACKGROUND;?>"></td> 
								    									
																  <?php $i++;
																		}
																}
														 }
														 ?>
													</tr>
															<!----------------------------------------------------------------------------------------------------- -->
													<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">STAYING TOGETHER Y/N</span></td>
						  								  <?php 
														 if(!empty($data_row_PD_details->Coapplicant_details_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['co_number']))
															  {
															  ?>
						  								         <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">
																   	<select id="co_staying" name="co_staying[]" class="form-control" required >
																	  <option value="">Select</option>
																	  <option value="Yes" <?php if(!empty($data_row_PD_details))if ($value['co_staying'] == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
																	  <option value="No" <?php if(!empty($data_row_PD_details))if ($value['co_staying'] == 'No') echo ' selected="selected"'; ?>>No</option>
																	</select>
																 
																   </span></td>
						 								  <?php
															  }
															}
														  }
														 }else 
														 {
                                                          if(isset($coapplicants))  
																{
																  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																		{ 
																	?>
																 <td>
																    	<select id="co_staying" name="co_staying[]" class="form-control">
																	  <option value="">Select</option>
																	  <option value="Yes">Yes</option>
																	  <option value="No">No</option>
																	</select>
																</td>
								    									
																  <?php $i++;
																		}
																}
														 }
														 ?>
													</tr>
																<!----------------------------------------------------------------------------------------------------- -->
													<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">CONTACT NO</span></td>
						  								  <?php 
														 if(!empty($data_row_PD_details->Coapplicant_details_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['co_number']))
															  {
															  ?>
						  								         <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"><input class = "form-control" type="text" id="co_contact_no" minlength="10" maxlength="10" required oninput="maxLengthCheck(this)" pattern="[6-9]{1}[0-9]{9}" name="co_contact_no[]" value="<?php echo $value['co_contact_no']?>"> </span></td>
						 								  <?php
															  }
															}
														  }
														 }else 
														 {
                                                          if(isset($coapplicants))  
																{
																  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																		{ 
																	?>
																 <td><input class = "form-control" type="number"  id="co_contact_no" name="co_contact_no[]" value="<?php echo $coapplicant->MOBILE;?>"></td> 
								    									
																  <?php $i++;
																		}
																}
														 }
														 ?>
													</tr>

												<!----------------------------------------------------------------------------------------------------- -->
													<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">EMAIL</span></td>
						  								  <?php 
														 if(!empty($data_row_PD_details->Coapplicant_details_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['co_number']))
															  {
															  ?>
						  								         <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"><input class = "form-control" type="email" id="co_email" name="co_email[]" value="<?php echo $value['co_email']?>"> </span></td>
						 								  <?php
															  }
															}
														  }
														 }
														 else 
														 {
                                                          if(isset($coapplicants))  
																{
																  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																		{ 
																	?>
																 <td><input class = "form-control" type="email"  id="co_email" name="co_email[]" value="<?php echo $coapplicant->EMAIL?>"></td> 
								    									
																  <?php $i++;
																		}
																}
														 }
														 ?>
													</tr>
													<!----------------------------------------------------------------------------------------------------- -->
													<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">CONSIDER THIS COAPPLICANT AS </span></td>
						  								  <?php 
														 if(!empty($data_row_PD_details->Coapplicant_details_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->Coapplicant_details_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['co_number']))
															  {
															  ?>
						  								         <td style="border: 1px solid;font-size:10px;">
						  								         		<select id="consider_coapplicant_as" name="consider_coapplicant_as[]" class="form-control" required >
																					  <option value="">Select</option>
																					  <option value="CO-APPLICANT" 
																					  <?php 
																					  if(!empty($data_row_PD_details))
																					  	if(isset($value['consider_coapplicant_as']))
																					  	 if($value['consider_coapplicant_as'] == 'CO-APPLICANT')
																					  	  echo ' selected="selected"';?>>CO-APPLICANT</option>
																					  <option value="GUARANTOR" <?php 
																					  if(!empty($data_row_PD_details))
																					  if(isset($value['consider_coapplicant_as'])) 
																					  	if($value['consider_coapplicant_as'] == 'GUARANTOR') 
																					  		echo ' selected="selected"'; ?>>GUARANTOR</option>
																					</select>
						  								         </td>
						 								  <?php
															  }
															}
														  }
														 }
														 else 
														 {
                              if(isset($coapplicants))  
																{
																  $i=1 ;foreach ( $coapplicants as $coapplicant) 
																		{ 
																	?>
																 <td style="border: 1px solid;font-size:10px;">
						  								         		<select id="consider_coapplicant_as" name="consider_coapplicant_as[]" class="form-control" required >
																					  <option value="">Select</option>
																					  <option value="CO-APPLICANT">CO-APPLICANT</option>
																					  <option value="GUARANTOR">GUARANTOR</option>
																					</select>
						  								         </td> 
								    									
																  <?php $i++;
																		}
																}
														 }
														 ?>
													</tr>
												</table>	
											</div>
										</div>
								 </div>

    							<!----------------------------------------------------------------------------------------------------------------------- -->
								<div class="col-sm-12">
									<div class="form-group">
										<label class="class_bold">CUSTOMER BACKGROUND DETAILS</label>	
										<textarea class = "form-control" rows = "2" placeholder = "" name="customer_details_comments" id="customer_details_comments"><?php if(!empty($data_row_PD_details)) if(!empty($data_row_PD_details->customer_details_comments)) echo $data_row_PD_details->customer_details_comments;?></textarea>
        	    					</div>
								</div>
								<div class="col-sm-12">
								   <div class="col-sm-10">
					        		<h4 style="font-weight:800"><b>APPLICANT FAMILY DETAILS</b></h4><hr>
 			            		   </div>
								</div>
								
								
								<div class="col-sm-12">&nbsp;</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">FAMILY SIZE</label>
    									<input type="number" class="form-control" id="FamilySize" name="FamilySize" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_details_JSON)) echo $Applicant_family_details_JSON->FamilySize; }?>" required>
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
									    <label class="class_bold">NO OF DEPENDENT</label>
    									<input type="number" class="form-control" id="NoOfDependent" name="NoOfDependent" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_details_JSON)) echo $Applicant_family_details_JSON->NoOfDependent; }else { if(!empty($row_more)) echo $row_more->NO_OF_DEPENDANTS; }?>" required>
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">NO OF EARNING MEMBERS</label>
    									<input type="number" class="form-control" id="NoOfEarningMembers" name="NoOfEarningMembers" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_details_JSON)) echo $Applicant_family_details_JSON->NoOfEarningMembers; }?>" required>
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">RESIDENCE OWNERSHIP</label>
    									<input type="text" class="form-control" id="ResidenceOwnership" name="ResidenceOwnership" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_details_JSON)) echo $Applicant_family_details_JSON->ResidenceOwnership; }?>" required>
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">RESIDENCE TYPE</label>
    									<input type="text" class="form-control" id="ResidenceType" name="ResidenceType" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_details_JSON)) echo $Applicant_family_details_JSON->ResidenceType; }?>" required>
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
									<label class="class_bold">STAYING IN SAME/DIFFERENT LOCATION</label>
    									<select id="stayingInSamelocation" name="stayingInSamelocation" class="form-control" required>
										  <option value="">Select</option>
										  <option value="Yes" <?php if(!empty($data_row_PD_details))if ($Applicant_family_details_JSON->stayingInSamelocation == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
										  <option value="No" <?php if(!empty($data_row_PD_details))if ($Applicant_family_details_JSON->stayingInSamelocation == 'No') echo ' selected="selected"'; ?>>No</option>
										</select>
									</div>
				                </div>
				                <div class="col-sm-3">
					                <div class="form-group">
										<label class="class_bold">NATIVE PLACE</label>
    					                <input type="text" class="form-control" id="NativeOf" name="NativeOf" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_details_JSON)) echo $Applicant_family_details_JSON->NativeOf; } else { if(!empty($row_more))  echo $row_more->NATIVE_PLACE;}?>" required>
  					                </div>
				                </div>
				                <div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">STAYING IN CITY (YEARS)</label>
    									<input type="number" class="form-control" id="StayingInCitySince" name="StayingInCitySince" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_details_JSON)) echo $Applicant_family_details_JSON->StayingInCitySince; }else { if(!empty($row_more)) echo $row_more->RES_CITY_NO_YEARS_LIVING; }?>" required>
  									</div>
								</div>
   							    <div class="col-sm-12">
										<div id="wrapper">
											<div style="overflow-x:auto;">
												<table class="table table-bordered">
												    <tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">PARAMETERS</span></td>
						  								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">FATHER</span></td>
						  								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">MOTHER</span></td>
						  								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">SPOUSE</span></td>
						  							</tr>
													<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">NAME</span></td>
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_father_name" name="app_father_name" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON))  if(isset($Applicant_family_members_JSON->app_father_name)) echo $Applicant_family_members_JSON->app_father_name; } else {if(isset($coapplicants)){ foreach ( $coapplicants as $coapplicant) {  if($coapplicant->relation=="Father"){ echo $coapplicant->FN.' '.$coapplicant->MN.' '.$coapplicant->LN;}} } }?>" ></td> 
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_mother_name" name="app_mother_name" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON))  if(isset($Applicant_family_members_JSON->app_mother_name)) echo $Applicant_family_members_JSON->app_mother_name; }else { if(isset($coapplicants)){ foreach ( $coapplicants as $coapplicant) {  if($coapplicant->relation=="Mother"){ echo $coapplicant->FN.' '.$coapplicant->MN.' '.$coapplicant->LN;}} }else {if(!empty($row_more)) echo $row_more->MOTHER_F_NAME." ".$row_more->MOTHER_L_NAME; }}?>"></td> 
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_spouse_name" name="app_spouse_name" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON))  if(isset($Applicant_family_members_JSON->app_spouse_name)) echo $Applicant_family_members_JSON->app_spouse_name; }else { if(isset($coapplicants)){ foreach ( $coapplicants as $coapplicant) {  if($coapplicant->relation=="Spouse"){ echo $coapplicant->FN.' '.$coapplicant->MN.' '.$coapplicant->LN;}} }}?>"></td> 
						  							</tr>
													  <tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">CONTACT NO.</span></td>
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_father_contact" name="app_father_contact" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) if(isset($Applicant_family_members_JSON->app_father_contact)) echo $Applicant_family_members_JSON->app_father_contact; }else {if(isset($coapplicants)){ foreach ( $coapplicants as $coapplicant) {  if($coapplicant->relation=="Father"){ echo $coapplicant->MOBILE;}} } }?>" ></td> 
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_mother_contact" name="app_mother_contact" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) if(isset($Applicant_family_members_JSON->app_mother_contact)) echo $Applicant_family_members_JSON->app_mother_contact; } else {if(isset($coapplicants)){ foreach ( $coapplicants as $coapplicant) {  if($coapplicant->relation=="Mother"){ echo $coapplicant->MOBILE;}} } }?>"></td> 
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_spouse_contact" name="app_spouse_contact" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) if(isset($Applicant_family_members_JSON->app_spouse_contact)) echo $Applicant_family_members_JSON->app_spouse_contact; }else {if(isset($coapplicants)){ foreach ( $coapplicants as $coapplicant) {  if($coapplicant->relation=="Spouse"){ echo $coapplicant->MOBILE;}} } }?>"></td> 
						  							</tr>
													<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">AGE</span></td>
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_father_age" name="app_father_age" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) if(isset($Applicant_family_members_JSON->app_father_age)) echo $Applicant_family_members_JSON->app_father_age; }else {if(isset($coapplicants)){ foreach ( $coapplicants as $coapplicant) {  if($coapplicant->relation=="Father"){ echo $coapplicant->AGE;}} } }?>"></td> 
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_mother_age" name="app_mother_age" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) if(isset($Applicant_family_members_JSON->app_mother_age)) echo $Applicant_family_members_JSON->app_mother_age; }else {if(isset($coapplicants)){ foreach ( $coapplicants as $coapplicant) {  if($coapplicant->relation=="Mother"){ echo $coapplicant->AGE;}} } }?>"></td> 
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_spouse_age" name="app_spouse_age" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) if(isset($Applicant_family_members_JSON->app_spouse_age)) echo $Applicant_family_members_JSON->app_spouse_age; }else {if(isset($coapplicants)){ foreach ( $coapplicants as $coapplicant) {  if($coapplicant->relation=="Spouse"){ echo $coapplicant->AGE;}} } }?>"></td> 
						  							</tr>
													<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">EARNING STATUS/PENSION </span></td>
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_father_earning" name="app_father_earning" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) if(isset($Applicant_family_members_JSON->app_father_earning)) echo $Applicant_family_members_JSON->app_father_earning; }else {if(isset($coapplicants)){ foreach ( $coapplicants as $coapplicant) {  if($coapplicant->relation=="Father"){ if($coapplicant->COAPP_TYPE=='self employeed'){echo $coapplicant->BIS_ANNUAL_INCOME;}else if($coapplicant->COAPP_TYPE=='salaried'){echo $coapplicant->ORG_ANNUAL_SALARY;}else if($coapplicant->COAPP_TYPE=='retired'){echo $coapplicant->RETIRED_ANNUAL_INCOME;}} } }}?>"></td> 
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_mother_earning" name="app_mother_earning" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) if(isset($Applicant_family_members_JSON->app_mother_earning)) echo $Applicant_family_members_JSON->app_mother_earning; }else {if(isset($coapplicants)){ foreach ( $coapplicants as $coapplicant) {  if($coapplicant->relation=="Mother"){ if($coapplicant->COAPP_TYPE=='self employeed'){echo $coapplicant->BIS_ANNUAL_INCOME;}else if($coapplicant->COAPP_TYPE=='salaried'){echo $coapplicant->ORG_ANNUAL_SALARY;}else if($coapplicant->COAPP_TYPE=='retired'){echo $coapplicant->RETIRED_ANNUAL_INCOME;}} } }}?>"></td> 
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_spouse_earning" name="app_spouse_earning" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) if(isset($Applicant_family_members_JSON->app_spouse_earning)) echo $Applicant_family_members_JSON->app_spouse_earning; }else {if(isset($coapplicants)){ foreach ( $coapplicants as $coapplicant) {  if($coapplicant->relation=="Spouse"){ if($coapplicant->COAPP_TYPE=='self employeed'){echo $coapplicant->BIS_ANNUAL_INCOME;}else if($coapplicant->COAPP_TYPE=='salaried'){echo $coapplicant->ORG_ANNUAL_SALARY;}else if($coapplicant->COAPP_TYPE=='retired'){echo $coapplicant->RETIRED_ANNUAL_INCOME;}} } }}?>"></td> 
						  							</tr>
													<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ANY ALIMENT/DESEASE TO FATHER /MOTHER /SPOUSE /DEPENDENT</span></td>
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_father_aliment" name="app_father_aliment" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) if(isset($Applicant_family_members_JSON->app_father_aliment)) echo $Applicant_family_members_JSON->app_father_aliment; }?>"></td> 
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_mother_aliment" name="app_mother_aliment" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) if(isset($Applicant_family_members_JSON->app_mother_aliment)) echo $Applicant_family_members_JSON->app_mother_aliment; }?>"></td> 
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_spouse_aliment" name="app_spouse_aliment" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) if(isset($Applicant_family_members_JSON->app_spouse_aliment)) echo $Applicant_family_members_JSON->app_spouse_aliment; }?>"></td> 
						  							</tr>
													<tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">MEDICAL EXPENSE /YEARLY FEES / EARNING</span></td>
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_father_medical" name="app_father_medical" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) if(isset($Applicant_family_members_JSON->app_father_medical)) echo $Applicant_family_members_JSON->app_father_medical; }?>"></td> 
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_mother_medical" name="app_mother_medical" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) if(isset($Applicant_family_members_JSON->app_mother_medical)) echo $Applicant_family_members_JSON->app_mother_medical; }?>"></td> 
						  								<td style="border: 1px solid;font-size:10px;"><input class = "form-control" type="text"  id="app_spouse_medical" name="app_spouse_medical" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_family_members_JSON)) if(isset($Applicant_family_members_JSON->app_spouse_medical)) echo $Applicant_family_members_JSON->app_spouse_medical; }?>"></td> 
						  							</tr>
												</table>
											</div>
										</div>
								 </div>
								  <div class="row  shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
									<div class="col-sm-12">
											<h4 style="font-weight:800"><b>CHILDREN DETAILS</b></h4><hr>
			    					</div>
							
									 <div class="col-sm-12">
										<div id="wrapper">
											<div style="overflow-x:auto;">
                                                <table class="table table-bordered" id="data_table">
													<!--<table align='center' cellspacing=2 cellpadding=5  border=1>-->
													<tr>
														<th>CHILDREN NAME</th>
														<th>AGE</th>
														<th>STUDYING/EARNING</th>
														<th>AMOUNT OF SALARY/BUSINESS PER MONTH</th>
														<th>MEDICAL EXPENSE /YEARLY FEES / EARNING</th>
													</tr>
											
													   <?php 
														 if(!empty($data_row_PD_details->Children_details_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->Children_details_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['Children_name']))
															  {
															  ?>
															 
															 <tr>
															    <td><input class = "form-control" type="text" id="Children_name" name="Children_name[]" value="<?php echo $value['Children_name']?>"></td>
																<td><input  class = "form-control"type="number" id="Children_age" name="Children_age[]" value="<?php echo $value['Children_age']?>"></td>
																<td><input   class = "form-control" type="text" id="Children_study" name="Children_study[]" value="<?php echo $value['Children_study']?>"></td>
																<td><input   class = "form-control" type="text" id="Children_amount" name="Children_amount[]" value="<?php echo $value['Children_amount']?>"></td>
																<td><input   class = "form-control" type="text" id="Children_medical"name="Children_medical[]" value="<?php echo $value['Children_medical']?>"></td>
															
															</tr>
															  <?php
															  }
															}
														  }
														 }
														 ?>
													<tr>
														<td><input class = "form-control" type="text" id="Children_name" name="Children_name[]"></td>
														<td><input  class = "form-control"type="number" id="Children_age" name="Children_age[]"></td>
														<td><input   class = "form-control" type="text" id="Children_study" name="Children_study[]"></td>
														<td><input   class = "form-control" type="text" id="Children_amount" name="Children_amount[]"></td>
														<td><input   class = "form-control" type="text" id="Children_medical"name="Children_medical[]"></td>
													
															<td><input   class = "form-control"type="button" class="add" onclick="add_row();" value="Add Row" ></td>
													</tr>
												</table>
											</div>
										</div>
								 </div>
								<div class="col-sm-12">
									<div class="form-group">
										<label class="class_bold">FAMILY BACKGROUND</label>	
										<textarea class = "form-control" rows = "2" placeholder = "" name="FamilyBackground" id="FamilyBackground"><?php if(!empty($data_row_PD_details)) if(!empty($data_row_PD_details->family_background_comments)) echo $data_row_PD_details->family_background_comments;?></textarea>
									</div>
			    				</div>
							
								<!-------------------------------------------------------- family details end --------------------------------------------- -->
    						<br>
							<?php if(isset($data_row_income))
								  {
									  if($data_row_income->CUST_TYPE == 'salaried')
									  {
							?>
							    <div class="col-sm-12">
									<h4 style="font-weight:800"><b>PAST WORK EXPERIENCE</b></h4><hr>
			    				</div>
								<div class="col-sm-12">
										<div id="wrapper">
											<div style="overflow-x:auto;">
                                                <table class="table table-bordered" id="data_table2">
													<!--<table align='center' cellspacing=2 cellpadding=5  border=1>-->
													<tr>
														<th>COMPANY NAME</th>
														<th>POSITION</th>
														<th>CTC</th>
														<th>VINTAGE</th>
														<th>WORK TYPE</th>
														<th>REFERENCE NAME</th>
														<th>REFERENCE MOBILE</th>
													</tr>
											
													   <?php 
														 if(!empty($data_row_PD_details->past_work_json))
														 {
															$reference_array=json_decode($data_row_PD_details->past_work_json,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['name_of_company']))
															  {
															  ?>
															 
															 <tr>
															    <td><input class = "form-control" type="text" id="name_of_company" name="name_of_company[]" value="<?php echo $value['name_of_company']?>"></td>
																<td><input  class = "form-control"type="text" id="Position" name="Position[]" value="<?php echo $value['Position']?>"></td>
																<td><input   class = "form-control" type="number" id="CTC" name="CTC[]" value="<?php echo $value['CTC']?>"></td>
																<td><input   class = "form-control" type="text" id="vintage" name="vintage[]" value="<?php echo $value['vintage']?>"></td>
																<td><input   class = "form-control" type="text" id="work_type" name="work_type[]" value="<?php echo $value['work_type']?>"></td>
																<td><input   class = "form-control" type="text" id="ref_name"name="ref_name[]" value="<?php echo $value['ref_name']?>"></td>
																<td><input   class = "form-control" type="number" id="ref_mobile"name="ref_mobile[]" value="<?php echo $value['ref_mobile']?>"></td>
															
															</tr>
															  <?php
															  }
															}
														  }
														 }
														 ?>
													<tr>
														       <td><input class = "form-control" type="text" id="name_of_company" name="name_of_company[]" value=""></td>
																<td><input  class = "form-control"type="text" id="Position" name="Position[]" value=""></td>
																<td><input   class = "form-control" type="number" id="CTC" name="CTC[]" value=""></td>
																<td><input   class = "form-control" type="text" id="vintage" name="vintage[]" value=""></td>
																<td><input   class = "form-control" type="text" id="work_type" name="work_type[]"></td>
																<td><input   class = "form-control" type="text" id="ref_name"name="ref_name[]" value=""></td>
																<td><input   class = "form-control" type="number" id="ref_mobile"name="ref_mobile[]" value=""></td>
															
															<td><input   class = "form-control"type="button" class="add" onclick="add_row2();" value="Add Row" ></td>
													</tr>
												</table>
											</div>
										</div>
											<div class="col-sm-12">
										<h4 style="font-weight:800"><b>CURRENT EMPLOYEMENT DETAILS </b></h4><hr>
			    				    </div>
									<div class="col-sm-3">
										<div class="form-group">
											<label class="class_bold">NAME OF THE COMPANY</label>
    										<input type="text" class="form-control" id="name_of_current_employement" name="name_of_current_employement" value="<?php if(!empty($data_row_PD_details)) { if(!empty($current_employement_json)) echo $current_employement_json->name_of_current_employement; }else { if(!empty($data_row_income)) echo $data_row_income->ORG_NAME; }?>">
  										</div>
									</div>
									
									<div class="col-sm-3">
										<div class="form-group">
											<label class="class_bold">REPORTING MANAGER NAME</label>
    										<input type="text" class="form-control" id="reporting_manager_name" name="reporting_manager_name" value="<?php if(!empty($data_row_PD_details)) { if(!empty($current_employement_json)) echo $current_employement_json->reporting_manager_name; }?>">
  										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label class="class_bold">VINTAGE</label>
    										<input type="number" class="form-control" id="Vintage" name="Vintage" value="<?php if(!empty($data_row_PD_details)) { if(!empty($current_employement_json)) echo $current_employement_json->Vintage; }?>">
  										</div>
									</div>
									
									<div class="col-sm-3">
										<div class="form-group">
											<label class="class_bold">PRODUCT OFFERING OF COMPANY</label>
    										<input type="text" class="form-control" id="product_offering" name="product_offering" value="<?php if(!empty($data_row_PD_details)) { if(!empty($current_employement_json)) echo $current_employement_json->product_offering; }?>">
  										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label class="class_bold">TYPE OF WORK</label>
    										<input type="text" class="form-control" id="type_of_work" name="type_of_work" value="<?php if(!empty($data_row_PD_details)) { if(!empty($current_employement_json)) echo $current_employement_json->type_of_work; }?>">
  										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label class="class_bold">NO OF EMPLOYEE IN TEAM IF ANY </label>
    										<input type="number" class="form-control" id="no_of_employee" name="no_of_employee" value="<?php if(!empty($data_row_PD_details)) { if(!empty($current_employement_json)) echo $current_employement_json->no_of_employee; }?>">
  										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label class="class_bold">POSITION</label>
    										<input type="text" class="form-control" id="position" name="position" value="<?php if(!empty($data_row_PD_details)) { if(!empty($current_employement_json)) echo $current_employement_json->position; }else { if(!empty($data_row_income)) echo $data_row_income->ORG_DESIGNATION; }?>">
  										</div>
									</div>
									
								
							<?php
									  }
                                  } 
							?>
								
						
							<br>
							<?php if(isset($data_row_income))
								  {
									  if($data_row_income->CUST_TYPE == 'self employeed')//    salaried
									  {
							?>
								<div class="col-sm-12" style="">
									<h4 style="font-weight:800"><b>BUSINESS DETAILS</b></h4><hr>
			   					</div>
								<div class="col-sm-3">
					    			<div class="form-group">
										<label class="class_bold">NAME OF BUSINESS </label>
    									<input type="text" class="form-control" id="NameOfBusiness" name="NameOfBusiness" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_details_json)) echo $business_details_json->NameOfBusiness; }?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">NATURE OF BUSINESS</label>
    									<input type="text" class="form-control" id="NatureOfBusiness" name="NatureOfBusiness" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_details_json)) echo $business_details_json->NatureOfBusiness; }?>">
  									</div>
								</div>
								
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">SUB PROFILE</label>
    									<input type="text" class="form-control" id="SubProfile" name="SubProfile" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_details_json)) echo $business_details_json->SubProfile; }?>">
  									</div>
								</div>
								
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">INDUSTRY EXPERIENCE</label>
    									<input type="text" class="form-control" id="IndustryExperience" name="IndustryExperience" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_details_json)) echo $business_details_json->IndustryExperience; }?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">IS BUSINESS REGISTRATION VERIFIED ?</label>
    									<select id="BusinessDocsVerified" name="BusinessDocsVerified" class="form-control">
										  <option value="">Select</option>
										  <option value="Yes" <?php if(!empty($data_row_PD_details))if ($business_details_json->BusinessDocsVerified == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
										  <option value="No" <?php if(!empty($data_row_PD_details))if ($business_details_json->BusinessDocsVerified == 'No') echo ' selected="selected"'; ?>>No</option>
										</select>
									</div>
								</div>
								<div class="col-sm-3">
					    			<div class="form-group">
										<label class="class_bold">CONSTITUTION</label>
    										<select id="Constitution" name="Constitution" class="form-control">
											  <option value="">Select</option>
											  <option value="Self Proprietor" <?php if(!empty($data_row_PD_details))if ($business_details_json->Constitution == 'Self Proprietor') echo ' selected="selected"'; ?>>Self Proprietor</option>
											  <option value="Partership" <?php if(!empty($data_row_PD_details))if ($business_details_json->Constitution == 'Partership') echo ' selected="selected"'; ?>>Partership</option>
											  <option value="Proprietor" <?php if(!empty($data_row_PD_details))if ($business_details_json->Constitution == 'Proprietor') echo ' selected="selected"'; ?>>Proprietor</option>
											
											  </select>
										
									</div>
								</div>
								
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">VINTAGE</label>
    									<input type="number" class="form-control" id="BusinessVintage" name="BusinessVintage" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_details_json)) echo $business_details_json->BusinessVintage; }?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
									    <label class="class_bold">TYPE OF BUSINESS/PRODUCT OFFERED</label>
    									<input type="text" class="form-control" id="business_offered_type" name="business_offered_type" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_details_json)) echo $business_details_json->business_offered_type; }?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">TYPE OF BUSINESS PREMISES</label>
										<select id="business_premises_type" name="business_premises_type" class="form-control">
											  <option>Select</option>
											  <option value="Owned" <?php if(!empty($data_row_PD_details))if ($business_details_json->business_premises_type == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
											  <option value="Rented" <?php if(!empty($data_row_PD_details))if ($business_details_json->business_premises_type == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
									  </select>
    								</div>
								</div>
								
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">RENT AMOUNT</label>
    									<input type="number" class="form-control" id="rent_agreement" name="rent_agreement" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_details_json)) echo $business_details_json->rent_agreement; }?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">NO OF EMPLOYEES</label>
    									<input type="number" class="form-control" id="NoOfEmployees" name="NoOfEmployees" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_details_json)) echo $business_details_json->NoOfEmployees; }?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">SALARIES OF THE EMPLOYEES</label>
    									<input type="number" class="form-control" id="salaries_of_employees" name="salaries_of_employees" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_details_json)) echo $business_details_json->salaries_of_employees; }?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">OTHER BUSINESS EXPENSES</label>
    									<input type="text" class="form-control" id="other_expenses" name="other_expenses" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_details_json)) echo $business_details_json->other_expenses; }?>">
  									</div>
								</div>
								<div class="col-sm-12" style="">
									<h4 style="font-weight:800"><b>BUSINESS DESCRIPTION</b></h4>
									<textarea  class = "form-control" rows = "3" placeholder = "" name="BusinessDescription" id="BusinessDescription"><?php if(!empty($data_row_PD_details)) { echo $data_row_PD_details->business_description_comments; }?></textarea>
									<hr>
			   					</div>
					
							<br>
							<?php 
									  }
								  }
							?>
							<br>
								<input hidden type="text"  id="FORM_GENERATED_MANAGER_ID"  value="<?php if(!empty($credit_manager_data)) { echo $credit_manager_data->UNIQUE_CODE; }?>">
  								<input hidden type="text"  id="LOGIN_CREDIT_MANAGER_ID" value="<?php echo $CM_ID;?>">
  									
								<?php 
								if(!empty($credit_manager_data))
								{
										if($credit_manager_data->UNIQUE_CODE == $CM_ID)
										{
										  if($row_more->STATUS =='PD Completed')
										  {
										  	?>
										  	<div class="col-sm-12" style="">
												<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_1" value="submit" type="submit">VIEW</button>
     										</div>
										  	<?php
										  }
										  else if($row_more->STATUS =='Loan Recommendation Approved')
											{
											?>
											<div class="col-sm-12" style="">
												<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_1" value="submit" type="submit">VIEW</button>
     										</div>
											<?php
										  }
										  else
										  {
										  	?>
										  	<div class="col-sm-12" style="">
												<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_1" value="submit" type="submit" id="save_and_continue">SAVE AND CONTINUE</button>
     									</div>
										  	<?php
										  }
								?>
					

									  <?php		
										}
									 else
										{
										?>
											 <div class="col-sm-12" style="">
												<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_1" value="submit" type="submit">VIEW</button>
     										</div>
										<?php
										}
								}
								else
								{
                 ?>
									<div class="col-sm-12" style="">
										<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_1" value="submit" type="submit" id="save_and_continue">SAVE AND CONTINUE</button>
     								</div>
								<?php
								}
										?>

								</form>
			            </section>
						
						
		        	</div>
		       <!-- </form>-->
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
function edit_row(no)
{
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("save_button"+no).style.display="block";
	
 var Children_name=document.getElementById("Children_name_row"+no);
 var Children_age=document.getElementById("Children_age_row"+no);
 var Children_study=document.getElementById("Children_study_row"+no);
 var Children_amount=document.getElementById("Children_amount_row"+no);
 var Children_medical=document.getElementById("Children_medical_row"+no);
 
	
 var Children_name_data=Children_name.innerHTML;
 var Children_age_data=Children_age.innerHTML;
 var Children_study_data=Children_study.innerHTML;
 var Children_amount_data=Children_amount.innerHTML;
 var Children_medical_data=Children_medical.innerHTML;	




 Children_name.innerHTML="<input type='text' name='Children_name[]' id='Children_name_text"+no+"' value='"+Children_name_data+"'>";
 Children_age.innerHTML="<input type='text' name='Children_age[]' id='Children_age_text"+no+"' value='"+Children_age_data+"'>";
 Children_study.innerHTML="<input type='text' id='Children_study_text"+no+"' name='Children_study[]' value='"+Children_study_data+"'>";
 Children_amount.innerHTML="<input type='text' id='Children_amount_text"+no+"' name='Children_amount[]' value='"+Children_amount_data+"'>";
 Children_medical.innerHTML="<input type='text' id='Children_medical_text"+no+"' name='Children_medical[]' value='"+Children_medical_data+"'>";

}

function save_row(no)
{
 var Children_name_val=document.getElementById("Children_name_text"+no).value;
 var Children_age_val=document.getElementById("Children_age_text"+no).value;
 var Children_study_val=document.getElementById("Children_study_text"+no).value;
 var Children_amount_val=document.getElementById("Children_amount_text"+no).value;
 var Children_medical_val=document.getElementById("Children_medical_text"+no).value;





 document.getElementById("Children_name_row"+no).innerHTML=Children_name_val;
 document.getElementById("Children_age_row"+no).innerHTML=country_val;
 document.getElementById("Children_study_row"+no).innerHTML=Children_study_val;
 document.getElementById("Children_amount_row"+no).innerHTML=Children_amount_val;
 document.getElementById("Children_medical_row"+no).innerHTML=Children_medical_val;



 document.getElementById("edit_button"+no).style.display="block";
 document.getElementById("save_button"+no).style.display="none";
}

function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
 var new_Children_name=document.getElementById("Children_name").value;
 var new_Children_age=document.getElementById("Children_age").value;
 var new_Children_study=document.getElementById("Children_study").value;
 var new_Children_amount=document.getElementById("Children_amount").value;
 var new_Children_medical=document.getElementById("Children_medical").value;
 

 	


	
 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
// var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td name=''Name[]' id='name_row"+table_len+"'>"+new_name+"</td><td id='country_row"+table_len+"'>"+new_country+"</td><td id='age_row"+table_len+"'>"+new_age+"</td><td id='relation_row"+table_len+"'>"+new_relation+"</td><td id='KnownSince_row"+table_len+"'>"+new_KnownSince+"</td><td id='Verification_Status_row"+table_len+"'>"+new_Verification_Status+"</td><td id='Brief_on_Reference_row"+table_len+"'>"+new_Brief_on_Reference+"</td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td><input type='text' class = 'form-control' name='Children_name[]' id='Children_name_row"+table_len+"' value='"+new_Children_name+"'></td><td><input type='text' class = 'form-control' name='Children_age[]' id='Children_age_row"+table_len+"' value='"+new_Children_age+"'></td><td><input class = 'form-control' name='Children_study[]' type='text' id='Children_study_row"+table_len+"' value='"+new_Children_study+"'></td><td><input class = 'form-control' name='Children_amount[]' type='text' id='Children_amount_row"+table_len+"' value='"+new_Children_amount+"'></td><td><input class = 'form-control' name='Children_medical[]' type='text' id='Children_medical_row"+table_len+"' value='"+new_Children_medical+"'></td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

 document.getElementById("Children_name_type").value="";
 document.getElementById("Children_age").value="";
 document.getElementById("Children_study").value="";
 document.getElementById("Children_amount").value="";
 document.getElementById("Children_medical").value="";
 }
</script>

<script>
function edit_row2(no)
{
 document.getElementById("edit_button2"+no).style.display="none";
 document.getElementById("save_button2"+no).style.display="block";
	
 var name_of_company=document.getElementById("name_of_company_row"+no);
 var Position_=document.getElementById("Position_row"+no);
 var CTC=document.getElementById("CTC_row"+no);
 var vintage=document.getElementById("vintage_row"+no);
 var work_type=document.getElementById("work_type_row"+no);
 var ref_name=document.getElementById("ref_name_row"+no);
  var ref_mobile=document.getElementById("ref_mobile_row"+no);
 
 
	
 var name_of_company_data=name_of_company.innerHTML;
 var Position_data=Position_.innerHTML;
 var CTC_data=CTC.innerHTML;
 var vintage_data=vintage.innerHTML;
 var work_type_data=work_type.innerHTML;
 var ref_name_data=ref_name.innerHTML;	
 var ref_mobile_data=ref_mobile.innerHTML;	




 name_of_company.innerHTML="<input type='text' name='name_of_company[]' id='name_of_company"+no+"' value='"+name_of_company_data+"'>";
 Position.innerHTML="<input type='text' name='Position[]' id='Position_text"+no+"' value='"+Position_data+"'>";
 CTC.innerHTML="<input type='text' id='CTC_text"+no+"' name='CTC[]' value='"+CTC_data+"'>";
 vintage.innerHTML="<input type='text' id='vintage_text"+no+"' name='vintage[]' value='"+vintage_data+"'>";
 work_type.innerHTML="<input type='text' id='work_type_text"+no+"' name='work_type[]' value='"+work_type_data+"'>";
 ref_name.innerHTML="<input type='text' id='ref_name_text"+no+"' name='ref_name[]' value='"+ref_name_data+"'>";
 ref_mobile.innerHTML="<input type='text' id='ref_mobile_text"+no+"' name='ref_mobile[]' value='"+ref_mobile_data+"'>";

}

function save_row2(no)
{
 var name_of_company_val=document.getElementById("name_of_company_text"+no).value;
 var Position_val=document.getElementById("Position_text"+no).value;
 var CTC_val=document.getElementById("CTC_text"+no).value;
 var vintage_val=document.getElementById("vintage_text"+no).value;
  var work_type_val=document.getElementById("work_type_text"+no).value;
 var ref_name_val=document.getElementById("ref_name_text"+no).value;
 var ref_mobile_val=document.getElementById("ref_mobile_text"+no).value;


 document.getElementById("name_of_company_row"+no).innerHTML=name_of_company_val;
 document.getElementById("Position_row"+no).innerHTML=Position_val;
 document.getElementById("CTC_row"+no).innerHTML=CTC_val;
 document.getElementById("vintage_row"+no).innerHTML=vintage_val;
  document.getElementById("work_type_row"+no).innerHTML=work_type_val;
 document.getElementById("ref_name_row"+no).innerHTML=ref_name_val;
 document.getElementById("ref_mobile_row"+no).innerHTML=ref_mobile_val;



 document.getElementById("edit_button2"+no).style.display="block";
 document.getElementById("save_button2"+no).style.display="none";
}

function delete_row2(no)
{
 document.getElementById("row2"+no+"").outerHTML="";
}
function add_row2()
{
 var new_name_of_company=document.getElementById("name_of_company").value;
 var new_Position=document.getElementById("Position").value;
 var new_CTC=document.getElementById("CTC").value;
 var new_vintage=document.getElementById("vintage").value;
  var new_work_type=document.getElementById("work_type").value;
 var new_ref_name=document.getElementById("ref_name").value;
  var new_ref_mobile=document.getElementById("ref_mobile").value;


	
 var table=document.getElementById("data_table2");
 var table_len=(table.rows.length)-1;
// var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td name=''Name[]' id='name_row"+table_len+"'>"+new_name+"</td><td id='country_row"+table_len+"'>"+new_country+"</td><td id='age_row"+table_len+"'>"+new_age+"</td><td id='relation_row"+table_len+"'>"+new_relation+"</td><td id='KnownSince_row"+table_len+"'>"+new_KnownSince+"</td><td id='Verification_Status_row"+table_len+"'>"+new_Verification_Status+"</td><td id='Brief_on_Reference_row"+table_len+"'>"+new_Brief_on_Reference+"</td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";
 var row = table.insertRow(table_len).outerHTML="<tr id='row2"+table_len+"'><td><input type='text' class = 'form-control' name='name_of_company[]' id='name_of_company_row"+table_len+"' value='"+new_name_of_company+"'></td><td><input type='text' class = 'form-control' name='Position[]' id='Position_row"+table_len+"' value='"+new_Position+"'></td><td><input class = 'form-control' name='CTC[]' type='text' id='CTC_row"+table_len+"' value='"+new_CTC+"'></td><td><input class = 'form-control' name='vintage[]' type='text' id='vintage_row"+table_len+"' value='"+new_vintage+"'></td><td><input class = 'form-control' name='work_type[]' type='text' id='work_type_row"+table_len+"' value='"+new_work_type+"'></td><td><input class = 'form-control' name='ref_name[]' type='text' id='ref_name_row"+table_len+"' value='"+new_ref_name+"'></td><td><input class = 'form-control' name='ref_mobile[]' type='text' id=ref_mobile_row"+table_len+"' value='"+new_ref_mobile+"'></td><td><input type='button' id='edit_button2"+table_len+"' value='Edit' class='edit' onclick='edit_row2("+table_len+")'> <input type='button' id='save_button2"+table_len+"' value='Save' class='save' onclick='save_row2("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row2("+table_len+")'></td></tr>";

 document.getElementById("name_of_company").value="";
 document.getElementById("Position").value="";
 document.getElementById("CTC").value="";
 document.getElementById("vintage").value="";
  document.getElementById("work_type").value="";
 document.getElementById("ref_name").value="";
  document.getElementById("ref_mobile").value="";
																
 }
</script>
<script>
$( "#business_premises_type" ).change(function(e) 
    {
		   var business_premises_type = $('#business_premises_type').val();
		   if(business_premises_type=='Owned')
		   {
			  document.getElementById("rent_agreement").disabled = true;
		   }
		     if(business_premises_type=='Rented')
		   {
			  document.getElementById("rent_agreement").disabled = false;
		   }
	  
    });
</script>
<script>
function myFunction() {
  //alert("Page is loaded");
   var FORM_GENERATED_MANAGER_ID=document.getElementById("FORM_GENERATED_MANAGER_ID").value;
 var LOGIN_CREDIT_MANAGER_ID=document.getElementById("LOGIN_CREDIT_MANAGER_ID").value;
 //alert(FORM_GENERATED_MANAGER_ID);
 // alert(LOGIN_CREDIT_MANAGER_ID);
 if(FORM_GENERATED_MANAGER_ID!= '')
 {
 if(FORM_GENERATED_MANAGER_ID != LOGIN_CREDIT_MANAGER_ID)
 {
     $('input[type="text"]').prop('readonly',true);
	 $('input[type="number"]').prop('readonly',true);
	 $('input[type="date"]').prop('readonly',true);
	  $('input[type="email"]').prop('readonly',true);
	 $('#PrimaryProfileOfPDPerson').attr('readonly',true); 
	 $('#BusinessDescription').attr('readonly',true); 
	 $('#co_staying').attr('readonly',true); 
	 $('#stayingInSamelocation').attr('readonly',true); 
	 $('#BusinessDocsVerified').attr('readonly',true); 
	 $('#Constitution').attr('readonly',true); 
     $('#business_premises_type').attr('readonly',true);  
	 $('#FamilyBackground').attr('readonly',true);
	 $('#customer_details_comments').attr('readonly',true);  
 }
 }
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
												//alert("got it");
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
												//alert("got it too");
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
												//alert("got it");
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
												
											}
						                }
                                    });

						}

						</script>
						<script>
						function Check_status()
						{
							//alert("hiii");
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
												//alert("HOLD");
												$('#border_style').css("border","2px solid yellow");
													document.getElementById('tag').innerHTML = "Status added by : "+obj.action_by;
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
											

											}
											else if(obj.msg=='REJECT')
											{
												//alert("REJECT");
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
												
												 // $('#btn_hold').hide();
												 // $('#btn_continue').hide();
											
												// swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/dsa/Go_No_GO_?ID="+obj.User_ID); });
									
											}
											else if(obj.msg=='CONTINUE')
											{
													$('#border_style').css("border","2px solid blue");
													
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
						
