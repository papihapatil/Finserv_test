<?php
 $result = $this->session->flashdata('result'); 
 if(!empty($score))
 {
	$score1=$score;
 }
 else
 {
	$score1=0; 
 }
 $this->session->userdata('Coapplicant_id');
 $score_success_ = $this->session->userdata('score_success');
 $Applicant_id =$this->session->userdata('Applicant_id');
 if (isset($result)) 
    {
		 if($result=='1'){ echo '<script> swal("success!", "Credit Bureau pulled Successfully.", "success");</script>'; $this->session->unset_userdata('result');$this->session->unset_userdata('Coapplicant_id');}
		else if($result=='2'){ echo '<script> swal("warning!", "Something went wrong '.$score_success_.'", "warning");</script>';$this->session->unset_userdata('result');$this->session->unset_userdata('Coapplicant_id'); }
		else if($result=='3'){ echo '<script> swal("warning!", "'.$score_success_.'", "warning").then( function() { window.location.replace("/dsa/dsa/index.php/dsa/GO_No_GO_add_coapplicant?Applicant_ID='.$Applicant_id.'"); } );
		  </script>';$this->session->unset_userdata('result');}
		else if($result=='4'){ echo '<script> swal("success!", "Customer not found in bureau.", "success");</script>';$this->session->unset_userdata('result');$this->session->unset_userdata('Coapplicant_id'); }
	   else if($result=='5'){ echo '<script> swal("success!", "You have alredy pulled bureau successfully.", "success");</script>';$this->session->unset_userdata('result'); $this->session->unset_userdata('Coapplicant_id');}
	     else if($result=='6'){ echo '<script> swal("success!", "Co-Applicant Added successfully.", "success");</script>';$this->session->unset_userdata('result'); $this->session->unset_userdata('Coapplicant_id');}
	 	   else if($result=='7'){ echo '<script> swal("success!", "Details Updated Successfully.", "success");</script>';$this->session->unset_userdata('result'); $this->session->unset_userdata('Coapplicant_id');}
	 	  else if($result=='8'){ echo '<script> swal("success!", "Status Noted Successfully.", "success");</script>';$this->session->unset_userdata('result'); $this->session->unset_userdata('Coapplicant_id');}
	 	  else if($result=='9'){ echo '<script> swal("warning!", "Something went wrong ", "warning");</script>';$this->session->unset_userdata('result'); $this->session->unset_userdata('Coapplicant_id');}
	 	  else if($result=='10'){ echo '<script> swal("success!", "Status updated Successfully ", "success");</script>';$this->session->unset_userdata('result'); $this->session->unset_userdata('Coapplicant_id');}
	 	
		 else { echo '<script> swal("warning!", "Error in Bureau updation", "warning");</script>';$this->session->unset_userdata('result');$this->session->unset_userdata('Coapplicant_id');	}
	}
?>
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

@media only screen and (max-width: 768px) {
  .proceed{
    padding-left :145px;
	margin-top :-59px;
  }
}

</style>
<?php
 if(isset($row_more)) 
   {
	   if($row_more->STATUS =='Aadhar E-sign complete')
	   {
		}
   else if($row_more->STATUS =='PD Completed')
   {

   }
    else if($row_more->STATUS =='Loan Recommendation Approved')
   {

   }
    else if($row_more->STATUS =='Cam details complete')
   {

   }
   else
   {
	   	?>
		<body onload="Check_status()" >

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
<?php
   }
   }?>
<div class="c-body" >
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body"  id="border_style">
								<div class="row">
									<div class="col-sm-12">
										<div>
        									<div class="container">
												<?php ini_set('short_open_tag', 'On'); ?>
													<div class="margin-10 padding-5">
			 												<div style="line-height: 40px; margin-top: 20px;" class="row">
															 	<?php if(!empty($row2)){if ($row2->customer_consent=='true'){?>
																  <!------------------------------------ form after getting consent from customer --------------------------------------------- -->
																  <div class="col-sm-6">
																  	<b>Dear, <u><?php if(!empty($row2)) echo "  ".$row2->FN."  ".$row2->LN;?> </u>&nbsp;Kindly fill-in the following information</b>
                                                                    <input hidden type="text" name="customer_id" id="customer_id"  value="<?php echo $row2->UNIQUE_CODE;?>">
							 									   <input hidden type="text" name="dsa_id" id="dsa_id"  value="<?php echo $dsa_id;?>">
							 									 
																  </div>
																    <div class="col-sm-6">
																  	<b><span id='tag'></span><br><span id='tag2'></span></b>
                                                                							 
																  </div>
																  <div class="col-sm-12"><hr></div>
																  <div class="col-sm-12">
																  	<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Applicant Basic Details</span>
																	<br>
																	<span style="margin-bottom: 45px; font-size: 12px; color: #bfbbbb;">Please fill your personal details. If required our Representative may get in touch to verify them.</span>
																  </div>
																  <div class="col-sm-12">
																  	<span style="color: black; font-size: 12px; font-weight: bold;"><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-circle"></i>&nbsp;&nbsp;Full Name As Per PAN Card *</span>
																  </div>
																  <div class="col-sm-4">  
																	<input style="margin-top: 8px;" placeholder="First Name" class="form-control" type="text" id="f_name" name="f_name" minlength="3" maxlength="30" required value="<?php echo $row2->FN;?>" oninput="validateText(this)">
																  </div>
															      <div class="col-sm-4">
																    <input style="margin-top: 8px;" placeholder="Middle Name (optional) *" class="form-control" type="text" name="m_name" id="m_name"  value="<?php echo $row2->MN;?>" minlength="3" maxlength="30" oninput="validateText(this)">
							 									  </div>
																   <div class="col-sm-4">
																     <input style="margin-top: 8px;" placeholder="Last Name *" class="form-control" type="text" name="l_name" id="l_name" minlength="3" maxlength="30" required  value="<?php echo $row2->LN;?>" oninput="validateText(this)">
																   </div>
																   <div class="col-sm-4"> 
																	<span style="color: black; font-size: 12px; font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;Email-Id *</span>
			   													    <input required placeholder="Enter email-Id" id="email" class="form-control" type="email" name="email" value="<?php echo $row2->EMAIL;?>" minlength="8" maxlength="75">
				                                                  </div>
															      <div class="col-sm-4">
																  	<span style="color: black; font-size: 12px;font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-mobile" aria-hidden="true"></i>&nbsp;&nbsp;Mobile Number *</span>
				   											 	    <input required placeholder="Enter mobile number *" class="form-control" type="text" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" name="mobile" id="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row2->MOBILE;?>">
																  </div>
																  <div class="col-sm-4">
																    <span style="color: black; font-size: 12px; font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp; Date Of Birth *</span>
																 	<input  class="form-control" type="date" name="dob" id="dob" value="<?php echo $row2->DOB;?>" onfocusout="calculateAGE()" >
																  </div>

																    <div class="col-sm-4"> 
																		<span style="color: black; font-size: 12px;font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;"class="fa fa-arrows" aria-hidden="true"></i>&nbsp;&nbsp;Employment Type  *</span>
																		<select required class="form-control" name="employment_type" id="employment_type"> 
																			  <option value="" >Select </option>
																			  <option value="salaried" <?php if(!empty($data_cust_income_details))if ($data_cust_income_details->CUST_TYPE == 'salaried') echo ' selected="selected"'; ?>>Salaried</option>
																			  <option value="self employeed" <?php if(!empty($data_cust_income_details))if ($data_cust_income_details->CUST_TYPE == 'self employeed') echo ' selected="selected"'; ?>>Self Employed</option>
																		       <option value="retired" <?php if(!empty($data_cust_income_details))if ($data_cust_income_details->CUST_TYPE == 'retired') echo ' selected="selected"'; ?>>Retired/Home Maker</option>
																		
																			  </select>
																		</div>
																   <?php 
																   if(!empty($data_cust_income_details))
																   {
                                                                         if($data_cust_income_details->CUST_TYPE=='salaried')
																		 {
                                                                   ?>
																   	<div class="col-sm-4">
																  	  <span style="color: black; font-size: 12px;font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-arrows" aria-hidden="true"></i>&nbsp;&nbsp;Total Employment / Business Experience </span>
																	  <input required placeholder="Enter Experience in years" class="form-control" type="number" name="experience" id="experience" value="<?php echo $data_cust_income_details->ORG_EXP_YEAR;?>">
																    </div>
																   <?php
																		 }
																		 else if($data_cust_income_details->CUST_TYPE=='self employeed')
																		 {
																	 ?>
																   	<div class="col-sm-4">
																  	  <span style="color: black; font-size: 12px;font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-arrows" aria-hidden="true"></i>&nbsp;&nbsp;Total Employment / Business Experience </span>
																	  <input required placeholder="Enter Experience in years" class="form-control" type="number" name="experience" id="experience" value="<?php echo $data_cust_income_details->BIS_YEARS_IN_BIS;?>">
																    </div>
																   <?php
																		 }
																		 else
																		 {
                                                                    ?>
																	<div class="col-sm-4">
																  	  <span style="color: black; font-size: 12px;font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;"  class="fa fa-arrows" aria-hidden="true"></i>&nbsp;&nbsp;Total Employment / Business Experience </span>
																	  <input required placeholder="Enter Experience in years" class="form-control" type="number" name="experience" id="experience" >
																    </div>

																	<?php
																		 }
																   }
																   else
																   {
                                                                   ?>
																   <div class="col-sm-4">
																  	  <span style="color: black; font-size: 12px;font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-arrows" aria-hidden="true"></i>&nbsp;&nbsp;Total Employment / Business Experience </span>
																	  <input required placeholder="Enter Experience in years" class="form-control" type="number" name="experience" id="experience">
																    </div>
																   <?php
																   }
																   
																   
																   ?>

															      <div class="col-sm-4">
																  	<span style="color: black; font-size: 12px;font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-arrows" aria-hidden="true"></i>&nbsp;&nbsp; Required Loan Amount  *</span>
																    <input required placeholder="Enter loan amount *" class="form-control" type="text" id="loan_amount" name="loan amount" oninput="maxLengthCheck(this)" maxlength="10" value="<?php if(!empty($data_Go_NO_GO)) echo $data_Go_NO_GO->loan_amount ;?>">
																  </div>
																  <div class="col-sm-4">
																    <span style="color: black; font-size: 12px; font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-arrows" aria-hidden="true"></i>&nbsp;&nbsp;Loan Tenure (in Years) *</span>
																 	<input  class="form-control" type="number" placeholder="Enter Tenure" name="tenure" id="tenure"  value="<?php if(!empty($data_Go_NO_GO)) echo $data_Go_NO_GO->tenure ;?>">
																  </div>
															      <div class="col-sm-4">
																    <span style="color: black; font-size: 12px; font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-arrows" aria-hidden="true"></i>&nbsp;&nbsp;AGE (As Per Date Of Birth)</span>
																 	<input readonly  class="form-control" type="number"  name="age" id="age" value="<?php if(!empty($data_Go_NO_GO)) echo $data_Go_NO_GO->age ;?>">
																  </div>
															
																  <div class="col-sm-12"><hr></div>
																  <div class="col-sm-4">
																   <?php 
																   if(isset($row_more)) 
																   {
																   		if($row_more->STATUS =='Loan Sanctioned')
																				   {
																				   	?>
																				   	<a class="btn btn-success disabled" style="color:white;  padding: 19px;">Loan Sanctioned Approved &nbsp;&nbsp;</a>
																				   	<?php
																				   }
																				   else if($row_more->STATUS =='Sanction Rejected')
																				   {
																				   	?>
																				   	<a class="btn btn-success disabled" style="color:white;  padding: 19px;">Sanction Rejected&nbsp;&nbsp;</a>
																				   	<?php
																				   }
																   	else if($row_more->STATUS =='Loan Recommendation Approved')
																				   {
																				   	?>
																				   	<a class="btn btn-success disabled" style="color:white;  padding: 19px;">Loan Recommendation Approved &nbsp;&nbsp;</a>
																				   	<?php
																				   }
																   else if($row_more->STATUS =='PD Completed')
																   {
                                                                   ?>
																        <a class="btn btn-success disabled" style="color:white;  padding: 19px;">PD Completed &nbsp;&nbsp;</a>
																 
																   <?php
																   }
																      else if($row_more->STATUS =='Cam details complete')
																   {
                                                                   ?>
																        <a class="btn btn-success disabled" style="color:white;  padding: 19px;">CAM Completed &nbsp;&nbsp;</a>
																 
																   <?php
																   }
																   else if($row_more->STATUS =='Aadhar E-sign complete')
																   {
																	   ?>
																	      <a class="btn btn-success disabled" style="color:white;  padding: 19px;">Application Submitted &nbsp;&nbsp;</a>
																 
																	   <?php
																   }
																   else
																   {
                                                                   ?>
																     <a class="btn btn-success " id="Submit_form" style="color:white;  padding: 19px;" id="submit_button">Submit &nbsp;&nbsp;</a>
																   
																   <?php
																   }
																   }
																   else
																   {
                                                                     ?>
																  <a class="btn btn-success " id="Submit_form" style="color:white;  padding: 19px;" id="submit_button">Submit &nbsp;&nbsp;</a>
																    <?php
																   }
																   
																   ?>
																
																   
																  </div>
																  <?php
																  if(!empty($data_Go_NO_GO))
																  {
																	  if($data_Go_NO_GO->eligibility_status=='Eligible')
																	  {
																	?>
																	       <?php 
																			   if(isset($row_more)) 
																			   {
																			   		if($row_more->STATUS =='Loan Sanctioned')
																				   {
																				   	?>
																				   	<div class="col-sm-2">
																						<a class="btn btn-success " href="<?php echo base_url()?>index.php/dsa/GO_No_GO?ID=<?php echo $row2->UNIQUE_CODE;?>"  id="VERIFY_KYC" style="color:white;  padding: 19px;">View Details &nbsp;&nbsp;</a>
																					
																					</div>
																				   	<?php
																				   }
																				   else if($row_more->STATUS =='Sanction Rejected')
																				   {
																				   	?>
																				   	<div class="col-sm-2">
																						<a class="btn btn-success " href="<?php echo base_url()?>index.php/dsa/GO_No_GO?ID=<?php echo $row2->UNIQUE_CODE;?>"  id="VERIFY_KYC" style="color:white;  padding: 19px;">View Details &nbsp;&nbsp;</a>
																					
																					</div>
																				   	<?php
																				   }
																			   	else if($row_more->STATUS =='Loan Recommendation Approved')
																				   {
																				   	?>
																				   	<div class="col-sm-2">
																						<a class="btn btn-success " href="<?php echo base_url()?>index.php/dsa/GO_No_GO?ID=<?php echo $row2->UNIQUE_CODE;?>"  id="VERIFY_KYC" style="color:white;  padding: 19px;">View Details &nbsp;&nbsp;</a>
																					
																					</div>
																				   	<?php
																				   }
																				   else if($row_more->STATUS =='PD Completed')
																				   {
																			   ?>
																					<div class="col-sm-2">
																						<a class="btn btn-success " href="<?php echo base_url()?>index.php/dsa/GO_No_GO?ID=<?php echo $row2->UNIQUE_CODE;?>"  id="VERIFY_KYC" style="color:white;  padding: 19px;">View Details &nbsp;&nbsp;</a>
																					
																					</div>
																			     <?php
																				   }
																				    else if($row_more->STATUS =='Cam details complete')
																           {
																           	 ?>
																					<div class="col-sm-2">
																						<a class="btn btn-success " href="<?php echo base_url()?>index.php/dsa/GO_No_GO?ID=<?php echo $row2->UNIQUE_CODE;?>"  id="VERIFY_KYC" style="color:white;  padding: 19px;">View Details &nbsp;&nbsp;</a>
																					
																					</div>
																			     <?php
																           }
																				   else if($row_more->STATUS =='Aadhar E-sign complete')
																				   {
																					    ?>
																					<div class="col-sm-2">
																						<a class="btn btn-success " href="<?php echo base_url()?>index.php/dsa/GO_No_GO?ID=<?php echo $row2->UNIQUE_CODE;?>"  id="VERIFY_KYC" style="color:white;  padding: 19px;">View Details &nbsp;&nbsp;</a>
																					
																					</div>
																			     <?php

																				   }
																				   else
																				   {
																				   ?>
																				    <div class="col-sm-2">
																						<div class="proceed">
																						<a class="btn btn-success " href="<?php echo base_url()?>index.php/dsa/GO_No_GO?ID=<?php echo $row2->UNIQUE_CODE;?>"  id="VERIFY_KYC" style="color:white;  padding: 19px;">Proceed &nbsp;&nbsp;</a>
																				   </div>
																					</div>
																					 <?php
																				   }
																			   }
																			   else
																		       {
																			    ?>
																				 <div class="col-sm-2">
																			        <a class="btn btn-success " href="<?php echo base_url()?>index.php/dsa/GO_No_GO?ID=<?php echo $row2->UNIQUE_CODE;?>"  id="VERIFY_KYC" style="color:white;  padding: 19px;">View Details &nbsp;&nbsp;</a>
																		         </div>
																				<?php
																			   }
																    			?>
																		
																	<?php
																	  }
																	  else
																	  {
																	?>
																	 <div class="col-sm-2">
																	 <a class="btn btn-success disabled" href="<?php echo base_url()?>index.php/dsa/GO_No_GO?ID=<?php echo $row2->UNIQUE_CODE;?>"  id="VERIFY_KYC" style="color:white;  padding: 19px;">Proceed &nbsp;&nbsp;</a>
																  </div>
																	<?php
																	  }

																  }
																  else
																  {
																?>
																  <div class="col-sm-2">
																	 <a class="btn btn-success disabled" href="<?php echo base_url()?>index.php/dsa/GO_No_GO?ID=<?php echo $row2->UNIQUE_CODE;?>"  id="VERIFY_KYC" style="color:white;  padding: 19px;">Proceed &nbsp;&nbsp;</a>
																  </div>
																<?php
																  }
																  
																  ?>
																
																 <div class="col-sm-8 " style="" id="reasons_box">
																 		 <?php 
																			 if(!empty($data_Go_NO_GO))
																			 {
																				 if($data_Go_NO_GO->eligibility_status=='Not Eligible')
																				 {

																				   if(!empty($data_cust_income_details))
																						{
																						 if($data_cust_income_details->CUST_TYPE=='salaried')
																						 {
																					
																							if($data_Go_NO_GO->Sal_age==0)
																							 {
																								 ?>
																								<lable style="color:red;">For salaried, Age and tenure not fits in our criteria.</lable><br>
																								 <?php
																							 }
																							  if($data_Go_NO_GO->sal_exe==0)
																							{
																							 ?>
																								<lable style="color:red;">For Salaried Applicant, minimum 1 year employment experience is required</lable><br>
																							<?php
																							 }
																							}
																						}
																						 if(!empty($data_cust_income_details))
																						{
																						 if($data_cust_income_details->CUST_TYPE=='self employeed')
																						 {

																				  if($data_Go_NO_GO->Self_age==0)
																				  {
																			  ?>
																			  <lable style="color:red;">For Self Employeed, Age and tenure not fits in our criteria.</lable><br>
																			  <?php

																				  }
																				 
																				     if($data_Go_NO_GO->self_exe==0)
																					 {
																				?>
																			  <lable style="color:red;">For Self employeed, minimum 3 year business experience is required</lable><br>
																			  <?php
																					 }
																						 }
																						}
																			     }
																			 }
																		 ?>
																 </div>
																											                

																 <!------------------------------------ form ends after getting consent from customer --------------------------------------------- -->
			
																<?php } else { ?>
																 <!------------------------------------ form before getting consent from customer --------------------------------------------- -->
																 <body onload="myFunction()">

															        <b>Fetching Consent For <u><?php if(!empty($row2)) echo "  ".$row2->FN."  ".$row2->LN;?></u></b>
																	<button class="btn btn-link"><i class="fa fa-refresh fa-spin"></i></button>	
																	<div class="col-sm-12"><hr></div>
																</body>
																 <!------------------------------------ form ends before getting consent from customer --------------------------------------------- -->
	
																<?php }   } ?>
														
														</div>
													</div>
													<br>
												</div>
											</div>
										</div>
									</main>
								</div>
	
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


								<footer class="c-footer">
									<div>Copyright © 2020 Finaleap.</div>
									<div class="mfs-auto">Powered by Finaleap</div>
								</footer>
							</div>
							<script>
								function myFunction() {
								  //alert("Page is loaded");
									setTimeout("location.reload(true);",5000);
								}
							</script>

						   <script>
						       function calculateAGE()
							   {
								   //var userinput = document.getElementById("dob").value;  
								  // alert(userinput);

									 var userDateinput =document.getElementById("dob").value;  
									 console.log(userDateinput);
	 
									 // convert user input value into date object
									 var birthDate = new Date(userDateinput);
									  console.log(" birthDate"+ birthDate);
	 
									 // get difference from current date;
									 var difference=Date.now() - birthDate.getTime(); 
	 	 
									 var  ageDate = new Date(difference); 
									 var calculatedAge=   Math.abs(ageDate.getUTCFullYear() - 1970);
									 //alert(calculatedAge);
									 document.getElementById('age').value= calculatedAge;

							   }
						   </script>
						   <script>
							   $( "#Submit_form" ).click(function() {
								   //alert("hii");
										 var Sal_age= 0;
										 var Self_age=0;
										 var sal_exe=0;
										 var self_exe=0;
										 var retired=0;
									 
										 var customer_id=document.getElementById("customer_id").value; 
										 var f_name =document.getElementById("f_name").value; 
										 var m_name =document.getElementById("m_name").value; 
										 var l_name =document.getElementById("l_name").value; 
										 var email =document.getElementById("email").value; 
										 var mobile =document.getElementById("mobile").value; 
										 var dob =document.getElementById("dob").value;
										 var employment_type =document.getElementById("employment_type").value; 
										 var experience =document.getElementById("experience").value; 
										 var loan_amount =document.getElementById("loan_amount").value;
										 var tenure =document.getElementById("tenure").value; 
									 
									 
									 
										 if(f_name=='')
											{
												swal("warning!", "Please Enter First name", "warning");
												return false;
											}
										  else if(l_name=='')
											{
												swal("warning!", "Please Enter last name", "warning");
												return false;
											}
										  else if(email=='')
											{
												swal("warning!", "Please Enter Email", "warning");
												return false;
											}
										  else if(mobile=='')
											{
												swal("warning!", "Please Enter Mobile", "warning");
												return false;
											}
										  else if(dob=='')
											{
												swal("warning!", "Please Enter Date of birth", "warning");
												return false;
											}
										  else if(employment_type=='')
											{
												swal("warning!", "Please Select Employment type", "warning");
												return false;
											}
										  else if(experience=='')
											{
												swal("warning!", "Please Enter Employment / Business Experience in years", "warning");
												return false;
											}
										  else if(loan_amount=='')
											{
												swal("warning!", "Please Enter Loan amount", "warning");
												return false;
											}
										  else if(tenure=='')
											{
												swal("warning!", "Please Enter Tenure", "warning");
												return false;
											}

										 var userDateinput =document.getElementById("dob").value;  
										 var birthDate = new Date(userDateinput);
										 //console.log(" birthDate"+ birthDate);
	     								 var difference=Date.now() - birthDate.getTime(); 
	 	 								 var  ageDate = new Date(difference); 
										 var calculatedAge=   Math.abs(ageDate.getUTCFullYear() - 1970);
									 
									
										 document.getElementById('age').value= calculatedAge;
										 if(calculatedAge < 18)
										 {
											 	swal("warning!", "Can not proceed your application as you are below 18 years", "warning");
												return false;
										 }
										 var employment_type = $.trim($('#employment_type').val());
										 var total_age= parseInt(calculatedAge) + parseInt(tenure);
										// alert(total_age);
										// return false;
										 if(employment_type=='salaried' && total_age<61)
										 {
											 var Sal_age= 1;//alert("salaried less than 62");
     									 }
										 else if(employment_type=='salaried' && total_age>60)
										 {
											 var Sal_age= 0;// alert("salaried gretter than 60");//not eligible
     									 }
										 else if(employment_type=='self employeed' && total_age<66)
										 {
											 var Self_age= 1; //alert("self_employee less than 65");
										 }
										 else if(employment_type=='self employeed' && total_age>65)
										 {
											 var Self_age= 0;// alert("self_employee gretter than 65");	//not eligible
     									 }
							
										 var experience = document.getElementById("experience").value; 
										 if(employment_type=='salaried' && experience < 1)
										 {
											 var sal_exe=0; //alert("salaried experience than 1"); //not
										 }
										 else if(employment_type=='salaried' && experience >=1  )
										 {
											 var sal_exe=1; //alert("salaried gretter than 1");
										 }
										 else if(employment_type=='self employeed' && experience < 3)
										 {
											 var self_exe=0;//alert("self_employee less than 4"); //not
     									 }
										 else if(employment_type=='self employeed' && experience >=3)
										 {
											 var self_exe=1; //alert("self_employee gretter than 65");
     									 }


										 if(employment_type=='salaried')
										 {
											 var retired =0;
										 }
									 

						 
										 var eligibility_status= "";
										 if(Sal_age==1 && sal_exe==1)
										 {
											 //alert("eligible");
											 var eligibility_status ="Eligible"
										 }
										 else if(Self_age==1 && self_exe==1)
										 {
											 //alert("eligible");
											  var eligibility_status ="Eligible"
										 }
										 else if(retired==0)
										 {
											var eligibility_status ="Not Eligible"
										 }
										 else
										 {
											 //alert("not eligible");
											 var eligibility_status ="Not Eligible"
										 }



										$.ajax({
													type:'POST',
													url:'<?php echo base_url("index.php/dsa/GO_No_GO_submit"); ?>',
													data:{
														'customer_id':customer_id,
														'f_name':f_name,
														'm_name':m_name,
														'l_name':l_name,
														'email':email,
														'mobile':mobile,
														'dob':dob,
														'employment_type':employment_type,
														'experience':experience,
														'loan_amount':loan_amount,
														'tenure':tenure,
														'age':calculatedAge,
														'Sal_age':Sal_age,
														'Self_age':Self_age,
														'sal_exe':sal_exe,
														'self_exe':self_exe,
														'eligibility_status':eligibility_status
														},
													success:function(data)
													{
														var obj =JSON.parse(data);
														if(obj.msg=='sucess')
														{
														 
															 $('#VERIFY_KYC').removeClass('disabled');
															 swal("success!",obj.response, "success").then(function() { window.location.reload(); });
														
					              						}
														if(obj.msg=='fail')
														{ 
															  $('#VERIFY_KYC').addClass('disabled');
															  swal("warning!",obj.response, "warning").then(function() { window.location.reload(); });
																									
														}
												   
													}
										});
					
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
						 var holdReason = "Application is on HOLD in step one because , "+document.getElementById('holdReason').value;
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
											     swal("Proceed!","").then( function() {  window.location.replace("/dsa/dsa/index.php/dsa/Go_No_GO_?ID="+obj.User_ID); });
									
												
											}
						                }
                                    });
		
						}

						function reject() 
						{
							var User_ID = document.getElementById('customer_id').value;
							var rejectReason =  "Application is rejected in step one because ," +document.getElementById('rejectReason').value;
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
												  swal("Proceed!","").then( function() {  window.location.replace("/dsa/dsa/index.php/dsa/Go_No_GO_?ID="+obj.User_ID); });
									
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
											     swal("Proceed!","").then( function() {  window.location.replace("/dsa/dsa/index.php/dsa/Go_No_GO_?ID="+obj.User_ID); });
									
												
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
													var word = "step one";
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

													$('#Submit_form').addClass('disabled');
													$('#VERIFY_KYC').addClass('disabled');
													$('#employment_type').attr('readonly','readonly');	
												}
												//  swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/dsa/Go_No_GO_?ID="+obj.User_ID); });
									
											}
											else if(obj.msg=='REJECT')
											{
												//alert("REJECT");
												$('#border_style').css("border","2px solid red");
												document.getElementById('tag').innerHTML = "Status added by : "+obj.action_by;
												document.getElementById('tag2').innerHTML = " Reason : "+obj.reason;
													var word = "step one";
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

													$('#Submit_form').addClass('disabled');
													$('#VERIFY_KYC').addClass('disabled');
													$('#employment_type').attr('readonly','readonly');	 
												    $('#btn_hold').hide();
												    $('#btn_continue').hide();
													$('#btn_reject').hide();
												
											
												}
												
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
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
							<!--[if IE]><!--><!--<![endif]-->
							<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
							<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
						</body>
					</html>
