<?php
//$Cust_consent_id = $id;
$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
//$cust_consent_status ="true";
$cust_consent_status  =$this->session->userdata("cust_consent_status");
$user_type_from_session=$this->session->userdata("user_type_from_session");
//echo $Cust_consent_id;
//echo $cust_consent_status;
//exit();
if($user_type_from_session=='DSA' && isset($Cust_consent_id) || $user_type_from_session=='branch_manager' && isset($Cust_consent_id) ||$user_type_from_session=='relationship_officer' && isset($Cust_consent_id) )
{
	//echo   $user_type;
	//echo $Cust_consent_id;
	//exit();
	$id=$Cust_consent_id;
	
}


?>

	<div >
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
			<div class="row">
				<p style="margin-top:5px;">Apply for loan</p> <p style="margin-left:20px; background-color:green; border-radius:10px; color:white; padding:5px;">Credit score : <?php echo $score;?></p>
				</div>
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
								
					<div>
						<span class="align-middle dot"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-sticky-note-o"></i></span>
					</div>			
						
				</div>	
			</div>
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
				

					<div style="font-size: 10px; margin-left: 10px; color: black;">
						Loan Applications
					</div>

				
				</div>	
			</div>
		</div>
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="text-align: center; margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Please select required loan type</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="text-align: center; margin-bottom: 45px; font-size: 12px; color: #bfbbbb;">Your selected loan type will help us to analyse that what kind of details we require from you.</span>

			</div>
			<div class="w-100"></div>
			<div class="row col-12 justify-content-md-center">
				<div class="row justify-content-md-center" style="padding: 0px !important;">
					<a href="<?php echo base_url()?>index.php/customer/customer_apply_for_loan?type=home">
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
							<div class="row <?php if($type == 'home'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center padding-5">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/home_loan.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You want loan for buying Home</span>
								<span class="font-9" style="margin-top: 0px; color: black; font-weight: bold; opacity: 0.8; text-align: center;">Home Loan</span>
								<div class="w-100"></div>
								<?php if($type == 'home') { ?>
									<img style="width: 20px; height: 20px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>				
						</div>	
					</a>
					<a href="<?php echo base_url()?>index.php/customer/customer_apply_for_loan_lap?type=lap&UID=<?php echo $id; ?>">	
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
							<div class="row <?php if($type == 'lap'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center ">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/plot_loan.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You want loan for against property</span>
								<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Loan Against Property</span>
								<div class="w-100"></div>
								<?php if($type == 'lap') { ?>
									<img style="width: 20px; height: 20px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>
			  			</div>	
			  		</a>
		  			<a href="<?php echo base_url()?>index.php/customer/customer_apply_for_loan_personal_busi_cc?type=personal&UID=<?php echo $id; ?>">
			  			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
			  				<div class="row <?php if($type == 'personal'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center ">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/personal_loan.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You want loan for personal use.</span>
								<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Personal Loan</span>
								<div class="w-100"></div>
								<?php if($type == 'personal') { ?>
									<img style="width: 20px; height: 20px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>
			  			</div>	
			  		</a>

			  		<a href="<?php echo base_url()?>index.php/customer/customer_apply_for_loan_personal_busi_cc?type=business&UID=<?php echo $id; ?>">
			  			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
			  				<div class="row <?php if($type == 'business'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center ">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/business.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You want loan for Business.</span>
								<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Business Loan</span>
								<div class="w-100"></div>
								<?php if($type == 'business') { ?>
									<img style="width: 20px; height: 20px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>
			  			</div>	
			  		</a>

			  		<a href="<?php echo base_url()?>index.php/customer/customer_apply_for_loan_personal_busi_cc?type=credit&UID=<?php echo $id; ?>">
			  			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
			  				<div class="row <?php if($type == 'credit'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center ">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/credit_card.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">Loan for credit card's.</span>
								<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Credit Cards</span>
								<div class="w-100"></div>
								<?php if($type == 'credit') { ?>
									<img style="width: 20px; height: 20px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>
			  			</div>	
			  		</a>
				</div>	
			</div>			
		</div>


		<!-- Salaried ------------------------------- -->
		<?php if($type == 'lap') { ?>	

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 5px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">
						<?php if(!empty($coapplicant))if($coapplicant == 'true') { ?> Co-Applicants 
						<?php } else {?>
							Tell us about Co-Applicants 
						<?php } ?>
					</span>
					<div class="w-100"></div>
					<?php if(!empty($isProfileFull))if($isProfileFull == 'true') { ?>
						<span style="font-size: 12px;">For home loan process we require co-applicant details</span>
					<?php } else if($coapplicant == 'true'){ ?>
						<span style="font-size: 12px; color: red;">Looks like your CO-Applicant profile is not complete,Co-Applicant is mandatory for loan processing.Kindly update Co-Applicant profile and complete it for loan apply. </span>
					<?php }?>
				</div>					

				<div class="w-100"></div>

				<?php if(!empty($coapplicant))if($coapplicant == 'true') { ?>					
					<div class="row justify-content-center col-12">
						<div class="row shadow" style="text-align: center; border-radius: 10px; margin-top: 15px; background-color: white; padding-top: 10px; padding-bottom: 10px; padding-left: 5px; padding-right: 5px;">
							
							<?php for ($i=0; $i < count($co_app); $i++) { ?>
									<div  style="text-align: center; border-radius: 10px; margin: 10px;">									
									<span style="font-size: 12px; background-color: #77cdf4; padding: 10px; border-radius: 10px; color: white;">
										<?php echo $co_app[$i]->FN." ".$co_app[$i]->LN ?>
									
										<a href="<?php echo base_url()?>index.php/customer/coapplicant_new_screen_one?COAPPID=<?php echo $co_app[$i]->UNIQUE_CODE;?>&UID=<?php echo $id; ?>"><i style=" margin-left: 15px; font-size:15px;color:white;" class="fas fa-pen"></i></a>
									</span>
								</div>

							<?php } ?>
																					
							<div  style="text-align: center; border-radius: 10px; margin: 10px;">									
								<span style="font-size: 12px; background-color: #1c85b2; padding: 10px; border-radius: 10px; color: white;">
									Add new co-applicant
									
									<a href="<?php echo base_url()?>index.php/customer/coapplicant_new_screen_one?UID=<?php echo $id; ?>"><i style=" margin-left: 15px; font-size:15px;color:white;" class="fa fa-user-plus"></i></a>
								</span>
							</div>
						</div>						
					</div>	

					<?php if($isProfileFull == 'false')return;?>
				<?php } else { ?>
					<div class="row justify-content-center col-12">
						<div class="shadow" style="text-align: center; width: 250px; border-radius: 10px; padding: 10px; background-color: white; margin-top: 20px;">
							<span style="font-size: 12px;">No co-applicant found</span>							
						</div>
						<div class="w-100"></div>
						<a href="<?php echo base_url()?>index.php/customer/coapplicant_new_screen_one?UID=<?php echo $id; ?>">
							<div  style="text-align: center; width: 250px; border-radius: 10px; padding: 10px;  margin-top: 20px;">
								
								<span style="font-size: 12px; background-color: #1c85b2; padding: 10px; border-radius: 10px; color: white;">Add new co-applicant</span>
							</div>
						</a>
					</div>	
				<?php return;} ?>
			</div>	

			<form method="POST" action="<?php echo base_url(); ?>index.php/customer/apply_loan_screen_lap_loan_action?UID=<?php if(!empty($id)){echo $id;} ?>" id="apply_loan_screen_2_lap">
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Select Bank To Process File</span>

				</div>
				<div class="w-100"></div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Select  Bank *</span>
						</div>		
						<div style="margin-left: 35px; margin-top: 8px;" class="col">	
				
														
						<select class="input-cust-name" aria-label="Default select example" name="bank_name" id="bank_name"  >
															<?php if(isset($form_data)){ if(!empty($form_data->bank_id)){?>
																<option value="">Select bank</option>
																	<?php if (isset($banks)){ foreach($banks as $bank){ ?>
																	<option value="<?php  echo $bank->id; ?>" <?php if(!empty($form_data->bank_id) && $form_data->bank_id==$bank->id){?> selected <?php } ?> ><?php  echo $bank->Bank_name; ?></option>
																	<?php }  }?>
																<?php } else {?>
																	<option value="">Select bank</option>
																	<?php if (isset($banks)){ foreach($banks as $bank){ ?>
																	<option value="<?php  echo $bank->id; ?>"  ><?php  echo $bank->Bank_name; ?></option>
																	<?php }  }?>
																<?php }  }else {?>
															
																	<option value="">Select bank</option>
																	<?php if (isset($banks)){ foreach($banks as $bank){ ?>
																	<option value="<?php  echo $bank->id; ?>"  ><?php  echo $bank->Bank_name; ?></option>
																	<?php }  }?>
																<?php } ?>
																	
																																	
															</select>
													</div>
												</div>	
			</div>

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us bit more about your Property Location</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address *</span>
				</div>			
				<div class="w-100"></div>
  				
				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="30" minlength="3" required style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_LINE_1;?>">
  					<input maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 2" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_LINE_2;?>">
  					<input maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 3" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_LINE_3;?>">
  					<input hidden="true" class="input-cust-name" type="text" id="actual_loan_type" name="actual_loan_type" value="<?php echo $type;?>">
  				</div>  


  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of years of ownership *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_NO_YEARS;?>">
  				</div>			  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="30" minlength="3" required placeholder="Enter landmark *" class="input-cust-name" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_LANDMARK;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Enter pincode *" class="input-cust-name" type="number" minlength="6" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_PINCODE;?>">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select required class="input-cust-name resi_prop_type" name="resi_sel_property_type" > 
					  <option value="">Select Property Type *</option>
					  <option value="Corporate Provided" <?php if(!empty($row_more))if ($row_more->PROP_ADD_PROP_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
					  <option value="Mortgaged" <?php if(!empty($row_more))if ($row_more->PROP_ADD_PROP_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
					  <option value="Owned" <?php if(!empty($row_more))if ($row_more->PROP_ADD_PROP_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
					  <option value="Rented" <?php if(!empty($row_more))if ($row_more->PROP_ADD_PROP_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
					  <option value="Shared Accomodation" <?php if(!empty($row_more))if ($row_more->PROP_ADD_PROP_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
					  <option value="Paying Guest" <?php if(!empty($row_more))if ($row_more->PROP_ADD_PROP_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
					  <option value="Others" <?php if(!empty($row_more))if ($row_more->PROP_ADD_PROP_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
					</select>
  				</div>  			  							  				
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" id="resi_state_view" placeholder="State" class="input-cust-name" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_STATE ;?>">
  					<input hidden="true" placeholder="State" class="input-cust-name" name="resi_state" id="resi_state" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_STATE ;?>">  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District" class="input-cust-name" id="resi_district_view" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_DISTRICT ;?>">
  					<input hidden="true" placeholder="District" class="input-cust-name" name="resi_district" id="resi_district" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_DISTRICT ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="30" minlength="3" placeholder="City" class="input-cust-name" name="resi_city" id="resi_city" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_CITY ;?>">
  				</div>  			  				
			</div>							
			</div>
			</div>

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Loan Details</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Rate Option *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select required class="input-cust-name" name="select_rate_option"> 
							  <option value="">Select Option *</option>
							  <option value="Fixed" <?php if(!empty($row_more))if ($row_more->RATE_OPTION == 'Fixed') echo ' selected="selected"'; ?>>Fixed</option>							  
							  <option value="Floating" <?php if(!empty($row_more))if ($row_more->RATE_OPTION == 'Floating') echo ' selected="selected"'; ?>>Floating</option>							  
							  <option value="Others" <?php if(!empty($row_more))if ($row_more->RATE_OPTION == 'Others') echo ' selected="selected"'; ?>>Others</option>							  
							</select>
	  				</div>  

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan Type *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select required class="input-cust-name" name="select_loan_type"> 
							  <option value="">Select Loan Type *</option>
							  <option value="Loan against residential property" <?php if(!empty($row_more))if ($row_more->HOME_LOAN_TYPE == 'Loan against residential property') echo ' selected="selected"'; ?>>Loan against residential property</option>			
							  <option value="Loan against commercial property" <?php if(!empty($row_more))if ($row_more->HOME_LOAN_TYPE == 'Loan against commercial property') echo ' selected="selected"'; ?>>Loan against commercial property</option>							  
							  						  
							</select>
	  				</div>  

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Desired loan amount *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Amount" class="input-cust-name" type="number" name="desired_loan_amount" id="desired_loan_amount" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(!empty($row_more))echo $row_more->DESIRED_LOAN_AMOUNT ;?>">
	  				</div>  	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Tenure in Years *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Enter year" class="input-cust-name" type="number" name="tenure_year" id="tenure_year" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->TENURE ;?>">
	  				</div> 

	  				<div class="w-100"></div>

	  				

	  				<div class="w-100"></div>
	  				
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Open Area (Sq ft) </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Area" class="input-cust-name" type="number" name="area_land" id="area_land" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(!empty($row_more))echo $row_more->AREA_OF_LAND ;?>">
	  				</div> 
	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Carpet Area (Sq ft) </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Area" class="input-cust-name" type="number" name="carpet_area" id="carpet_area" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(!empty($row_more))echo $row_more->CARPET_AREA ;?>">
	  				</div> 

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Build up Area (Sq ft) </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Area" class="input-cust-name" type="number" name="buildup_area" id="buildup_area" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(!empty($row_more))echo $row_more->BUILD_UP_AREA ;?>">
	  				</div> 

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Reason for Loan *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select required class="input-cust-name" name="visit_reason" id="visit_reason"> 
							  <option value="">Select Reason *</option>
							  <option value="Medical" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Medical') echo ' selected="selected"'; ?>>Medical</option>
							  <option value="House Owner (Home Renovation)" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'House Owner (Home Renovation)') echo ' selected="selected"'; ?>>House Owner (Home Renovation)</option>
							  <option value="Personal (Others)" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Personal (Others)') echo ' selected="selected"'; ?>>Personal (Others)</option>
							  <option value="Holiday" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Holiday') echo ' selected="selected"'; ?>>Holiday</option>
							  <option value="Advance Salary" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Advance Salary') echo ' selected="selected"'; ?>>Advance Salary</option>
							  <option value="Rental Deposit" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Rental Deposit') echo ' selected="selected"'; ?>>Rental Deposit</option>
							  <option value="Wedding" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Wedding') echo ' selected="selected"'; ?>>Wedding</option>
							  <option value="Credit Card Takeover" <?php if(!empty($row))if ($row_more->REASON_FOR_VISIT == 'Credit Card Takeover') echo ' selected="selected"'; ?>>Credit Card Takeover</option>					  
							  
							   <option value="">Select availed for *</option>
							  <option value="Property from Developer / Builder" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Property from Developer / Builder') echo ' selected="selected"'; ?>>Property from Developer / Builder</option>
							  <option value="Property from Development Authority" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Property from Development Authority') echo ' selected="selected"'; ?>>Property from Development Authority</option>
							  <option value="Resale/ Pre-owned Flat/ Rowhouse" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Resale/ Pre-owned Flat/ Rowhouse') echo ' selected="selected"'; ?>>Resale/ Pre-owned Flat/ Rowhouse</option>
							  <option value="Construction of Standalone House on a Plot" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Construction of Standalone House on a Plot') echo ' selected="selected"'; ?>>Construction of Standalone House on a Plot</option>
							  <option value="Resale/ Pre-owned Bungalow" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Resale/ Pre-owned Bungalow') echo ' selected="selected"'; ?>>Resale/ Pre-owned Bungalow</option>	
							  <option value="Others" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Others') echo ' selected="selected"'; ?>>Others</option>						
							</select>
	  				</div> 
					
				</div>

				<span style=" margin-bottom: 10px; margin-top: 25px; font-size: 15px; font-weight: bold;color: black; margin-left: 40px;">The loan approval shall remain subject to assessment of legal and technical checks. Such assessment is for internal reliance alone and doesnt create any right in favour of anyone including the borrower (s) in any manner whatsoever.</span>
				<input style="margin-left: 40px; margin-top: 6px;" type="checkbox" id="is_agree" name="is_agree" value="Yes"><span style="font-size: 12px; margin-top: 5px; margin-left: 8px; color: black; font-weight: bold;">I / We Agree.</span>

			</div>

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Are you Sole Owner of Property *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input checked="true" style="margin-right: 5px;" type="radio" name="sole_owner" value="Yes" <?php if(!empty($row_more))if($row_more->IS_SOLE_OWNER=='Yes'){ echo 'checked';} ?>>Yes
						<input style="margin-left: 10px; margin-right: 5px;" type="radio" name="sole_owner" value="No" <?php if(!empty($row_more))if($row_more->IS_SOLE_OWNER=='No'){ echo 'checked';} ?>>No				
	  				</div> 

	  				<div class="w-100"></div>
	  				
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">what is your share (%) in property *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter share percentage" class="input-cust-name" type="number" name="share_prop" id="share_prop" oninput="maxLengthCheck(this)" maxlength="3" value="<?php if(!empty($row_more))echo $row_more->SHARE_IN_PROP ;?>">
	  				</div> 
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Will bank be able to obtain sole ownership of the property *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input style="margin-right: 5px;" type="radio" name="sole_owner_able" value="Yes" <?php if(!empty($row_more))if($row_more->IS_BANK_OBTAIN_SOLE=='Yes'){ echo 'checked';} ?>>Yes
						<input style="margin-left: 10px; margin-right: 5px;" type="radio" name="sole_owner_able" value="No" checked="true" <?php if(!empty($row_more))if($row_more->IS_BANK_OBTAIN_SOLE=='Yes'){ echo 'checked';} ?>>No				
	  				</div> 

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Is legal title of the property clear *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input style="margin-right: 5px;" type="radio" name="legal_title" value="Yes" <?php if(!empty($row_more))if($row_more->IS_LEGAL_TITLE_CLEAR=='Yes'){ echo 'checked';} ?>>Yes
						<input style="margin-left: 10px; margin-right: 5px;" type="radio" name="legal_title" value="No" <?php if(!empty($row_more))if($row_more->IS_LEGAL_TITLE_CLEAR=='Yes'){ echo 'checked';} ?> checked="true">No				
	  				</div> 

	  				
	  			</div>

	  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Do you have any loan on property *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input checked="true" style="margin-right: 5px;" type="radio" name="loan_on_property" value="Yes" <?php if(!empty($row_more))if($row_more->IS_LOAN_ON_PROP=='Yes'){ echo 'checked';} ?>>Yes
						<input style="margin-left: 10px; margin-right: 5px;" type="radio" name="loan_on_property" value="No" <?php if(!empty($row_more))if($row_more->IS_LOAN_ON_PROP=='Yes'){ echo 'checked';} ?>>No				
	  				</div> 

	  				<div class="w-100"></div>
	  				
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">How many properties do you own *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter property count" class="input-cust-name" type="number" name="no_of_property" id="no_of_property" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->HOW_MANY_PROP_OWN ;?>">
	  				</div> 
	  			</div>
			</div>

			<div class="row shadow bg-white rounded margin-10 padding-15" id="bank_layout">
				
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us about Existing Loan's</span>
					<div class="w-100"></div>					
				</div>

				<div id="emisLayout" style="margin-left: 35px;" class="col">
					
	  					<?php

	  						if(!empty($row->EMIS)){
							$json = $row->EMIS;

							$jsonData = json_decode($json);
							if($jsonData!=''){
								$data_array = $jsonData->emis;
								for ($i=0; $i < count($data_array); $i++) { ?>
										<div class="emis_wrapper">
				  						<fieldset id="emisS_row">
											<div class="emis_row" id="line_1">
										        <select style="width: 17%;" class="other-income-select emis-select-data" id="emis" name="emi[]">
										        	<option id='1_1' value="">Select Loan Type</option>
										            <option id='2_1' value="Personal Loan" <?php if ($data_array[$i]->title == 'Personal Loan') echo ' selected="selected"'; ?>>Personal Loan</option>
										            <option id='3_1' value="Business Loan" <?php if ($data_array[$i]->title == 'Business Loan') echo ' selected="selected"'; ?>>Business Loan</option>
										            <option id='4_1' value="Home Loan" <?php if ($data_array[$i]->title == 'Home Loan') echo ' selected="selected"'; ?>>Home Loan</option>
										            <option id='5_1' value="Plot Loan" <?php if ($data_array[$i]->title == 'Plot Loan') echo ' selected="selected"'; ?>>Plot Loan</option>
										            <option id='6_1' value="Car Loan" <?php if ($data_array[$i]->title == 'Car Loan') echo ' selected="selected"'; ?>>Car Loan</option>
										            <option id='7_1' value="Other" <?php if ($data_array[$i]->title == 'Other') echo ' selected="selected"'; ?>>Other</option>
										        </select>
										        <input placeholder="Loan Amount" class="other-income-select emis-loan-data" type="number" name="emis_loan_amount" style="width: 17%;" value="<?php echo $data_array[$i]->loan_amount;?>" oninput="maxLengthCheck(this)" maxlength="10">
										        <input placeholder="Outstanding Loan" class="other-income-select emis-outstanding-data" type="number" name="emis_outstanding_amount" style="width: 17%;" value="<?php echo $data_array[$i]->outstanding_amount;?>" oninput="maxLengthCheck(this)" maxlength="10">
										        <input placeholder="EMI" class="other-income-select emis-emi-data" type="number" name="emis_emi_amount" style="width: 17%;" value="<?php echo $data_array[$i]->emi_amount;?>" oninput="maxLengthCheck(this)" maxlength="10">
										        <input placeholder="Balance Ferm" class="other-income-select emis-bal_from-data" type="number" name="emis_bal_from_amount" style="width: 17%;" value="<?php echo $data_array[$i]->bal_from_amount;?>" oninput="maxLengthCheck(this)" maxlength="10">
										        <input class="emis_remove other-income-select" type="button" value="-" style="width: 8%; color: red;" >
										    </div>	
										</fieldset>
									</div>	
								<?php } 
								}
							} else { ?>
							<div class="bl_wrapper">
			  						<fieldset >
										<div class="bl_row">
									        <input disabled class="other-income-select-heading " type="text" style="width: 17%;" value="Bank Name">
									        <input disabled class="other-income-select-heading " type="text" style="width: 17%;" value="Loan Amount">
									        <input disabled class="other-income-select-heading " type="text" style="width: 17%;" value="Loan End Date">
									        <input disabled class="other-income-select-heading" type="text"  style="width: 17%;" value="Loan EMI">		        
									        <input disabled class="other-income-select-heading" type="text" value="DELETE" style="width: 8%; color: red;" >
									    </div>	
									</fieldset>
								</div>	
								<div class="bl_wrapper">
			  						<fieldset id="blS_row">
										<div class="bl_row" id="line_1">
									        <select style="width: 17%;" class="other-income-select bank-name" id="bl" name="bl[]">
									        	<option id='1_1' value="">Select Bank</option>
									            <option id='2_1'>State Bank of India</option>
									            <option id='3_1' >Axis Bank</option>
									            <option id='4_1' >HDFC Bank</option>
									            <option id='5_1' >ICICI Bank</option>
									            <option id='6_1' >Bank of Baroda</option>
									            <option id='7_1' >Union Bank of India</option>
									            <option id='8_1' >IDBI Bank</option>
									            <option id='9_1' >Canara Bank</option>
									            <option id='10_1' >Punjab National Bank</option>
									            <option id='11_1' >UCO Bank</option>
									            <option id='12_1' >Other</option>
									        </select>
									        <input placeholder="Loan Amount" class="other-income-select bank-loan-amount" type="number" name="emis_loan_amount" style="width: 17%;" oninput="maxLengthCheck(this)" maxlength="10">
									      	 <input  placeholder="Loan End Date" class="other-income-select loan-end-date" type="text" name="loan_end_date" id="loan_end_date" style="width: 17%;" >
									        <input placeholder="EMI" class="other-income-select bank-emi-data" type="number" name="bank_emi_data" style="width: 17%;" oninput="maxLengthCheck(this)" maxlength="10">										        
									        <input disabled class="bl_remove other-income-select" type="button" value="-" style="width: 8%; color: red;" >
									    </div>	
									</fieldset>
								</div>								
						<?php }?>	  	

						<div style="color: blue;" class="add-more" type="button" id="add_more_bl">Add More</div>
	  				</div> 
			</div>


				<div style="margin-top: 20px; margin-bottom: 20px;" class="row col-12 justify-content-center">
					<div >
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							APPLY FOR LOAN
						</button>
					</div>		
				</div>				
			</div>
			    <script>
					 $(document).ready(function () {
									
														$('#loan_end_date').datepicker({
																				autoclose: true,
																				endDate: new Date(new Date().setDate(new Date().getDate())),
																				format: 'yyyy-mm-dd'  
															
																			});  
								
								                    });
				</script>
                 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
			</form>
		<?php } ?>		
		</div>		
	</div>
