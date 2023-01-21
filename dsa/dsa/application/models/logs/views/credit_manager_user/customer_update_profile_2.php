
<?php ini_set('short_open_tag', 'On'); ?>
<?php
    $message = $this->session->flashdata('error');
    if (isset($message)) {
        echo '<script> swal("warning!", "Something get wrong", "warning");</script>';
         $this->session->unset_userdata('error');	
    }

    ?>
<?php
    $message = $this->session->flashdata('success');
    if (isset($message)) {
        echo '<script> swal("success!", "Profile updated successfully", "success");</script>';
         $this->session->unset_userdata('success');	
    }

    ?>
	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
					
			</div>

			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div>
						<span class="shadow align-middle dot"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></span>				
					</div>
					
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
					<div>
						<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/credit_manager_user/Document_verification"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></a></span>
					</div>	
			
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
					<div>
						<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/credit_manager_user/Credit_Analysis"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></a></span>
					</div>	
                    <div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
					<div>
						<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/credit_manager_user/Other_attributes"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></a></span>
					</div>	
                    <?php if($appliedloan->LOAN_TYPE=='home')
			             {	?>	
							<div >
								<span class="shadow align-middle dot-hr"></span>
							</div>					
							<div>
								<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/credit_manager_user/collateral"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></a></span>
							</div>	
					<?php } ?>						
				</div>	
			</div>
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div style="font-size: 10px; color: black; margin-right: 20px;">
						Applicant Details
					</div>
					
					<div style="font-size: 10px; color: black; margin-right: 30px;">
						Document Verification
					</div>					

					<div style="font-size: 10px; margin-right: 20px; color: black;">
						Credit And Analysis
					</div>
					<div style="font-size: 10px; margin-right: 20px; color: black;">
						Other Attributes
					</div>
					 <?php if($appliedloan->LOAN_TYPE=='home')
			             {	?>	
						 <div style="font-size: 10px; margin-right: 20px; color: black;">
							Collateral and Recommendations
						</div>
					<?php }?>
				</div>	
			</div>
		</div>
		
	<form method="POST" action="<?php echo base_url(); ?>index.php/credit_manager_user/customer_flow_update_s_one" id="">
		
		
<!------------Personal Details----------------------->
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Personal Details</span>

			</div>
			
			<div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
				    <div style=" margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Full name as per PAN card *</span>
					</div>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text"  id="f_name" name="f_name" minlength="5" maxlength="30" required value="<?php if(!empty($row)){ echo $row->FN;}?>">
	  					<input  style="margin-top: 8px;" placeholder="Middel Name (Optional)" class="input-cust-name" type="text" name="m_name"  value="<?php if(!empty($row)){ echo $row->MN;}?>">
	  					<input  style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="l_name" minlength="5" maxlength="30" required  value="<?php if(!empty($row)){ echo $row->LN;}?>">
	  				</div>
	  				<div class="w-100"></div>
					
					
					<div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Current address</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<select required class="input-cust-name resi_prop_type" name="resi_sel_property_type" > 
						  <option value="">Select Property Type *</option>
						  <option value="Corporate Provided" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
						  <option value="Mortgaged" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
						  <option value="Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
						  <option value="Rented" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
						  <option value="Shared Accomodation" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
						  <option value="Paying Guest" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
						  <option value="Others" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
						</select>
					</div> 	
					 <div style=" margin-top: 8px;" class="col">
					    <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Stability at current address</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input min="1" required placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_NO_YEARS_LIVING;?>">
					</div> 
					<div style=" margin-top: 8px;" class="col">
					    <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Permanent Address</span>
					</div>			
					<div class="w-100"></div>
					
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<input style="margin-top: 1px;" required placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1"  id="per_add_1" value="<?php  if(!empty($row_more))echo  $row_more->PER_ADDRS_LINE_1;?>" minlength="3" maxlength="30">
	  					<input style="margin-top: 8px;"  placeholder="Address Line 2 " class="input-cust-name" type="text" name="per_add_2"  id="per_add_2" value="<?php  if(!empty($row_more))echo  $row_more->PER_ADDRS_LINE_2;?>" minlength="3" maxlength="30">
	  					<input style="margin-top: 8px;"  placeholder="Address Line 3 " class="input-cust-name" type="text" name="per_add_3"  id="per_add_3" value="<?php  if(!empty($row_more))echo $row_more->PER_ADDRS_LINE_3;?>" minlength="3" maxlength="30">
					</div> 
					
				
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number Available *</span>
						</div>
				        <div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
								<div class="row">
								
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  type="radio" id='yesCheck' name="Vechical_NO_available" value="yes" <?php if(!empty($row_more)){ if($row_more->Vechical_NO_available=='yes'){ echo 'checked';}}?> onclick="add_vechical_no()"> yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input id='noCheck'  <?php if(!empty($row_more)){ if($row_more->Vechical_NO_available=='no' || $row_more->Vechical_NO_available=='NULL' || $row_more->Vechical_NO_available==''){ echo 'checked';}}?> type="radio" name="Vechical_NO_available" value="no" onclick="add_vechical_no()"> no
									</div>
									
								</div>	
							</div>  
							
						</div>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  placeholder="" class="input-cust-name" type="text" name="vechical_no" id="vechical_no"   value="<?php if(!empty($row_more)){if($row_more->Vechical_NO_available=='yes'){echo $row_more->Vechical_Number; }}?>" <?php if($row_more->Vechical_NO_available=='no' || $row_more->Vechical_NO_available=='NULL' || $row_more->Vechical_NO_available=='') {echo 'readonly';} ?>>
						</div> 	
						<?php if(!empty($income_details))if($income_details->CUST_TYPE=='salaried'){?>
					            <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official Mail Available *</span>
								</div>
								<div style="margin-left: 35px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input  type="radio" id='yesCheck5' name="Official_mail_available" value="yes" <?php if(!empty($row_more)){ if($row_more->Official_mail_available=='yes'){ echo 'checked';}}?> onclick="add_off_mail()"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input id='noCheck5'  <?php if(!empty($row_more)){ if($row_more->Official_mail_available=='no' || $row_more->Official_mail_available=='NULL' || $row_more->Official_mail_available==''){ echo 'checked';}}?> type="radio" name="Official_mail_available" value="no" onclick="add_off_mail()"> no
											</div>
											
										</div>	
									</div>  
									
								</div>
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official Mail</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  placeholder="" class="input-cust-name" type="email" name="Official_mail" id="Official_mail"   value="<?php if(!empty($row_more)){if($row_more->Official_mail_available=='yes'){echo $row_more->Official_mail; }}?>" <?php if($row_more->Vechical_NO_available=='no' || $row_more->Vechical_NO_available=='NULL' || $row_more->Vechical_NO_available=='') {echo 'readonly';} ?>>
								
								</div> 				
					
					<?php } ?>
				 
					
				</div>	
				
				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			    <div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-venus-mars"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Gender *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;">
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  checked="true" type="radio" name="gender" value="male"> Male
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input  type="radio" name="gender" value="female" <?php if(!empty($row)){  if ($row->GENDER == 'female') echo ' checked="true"'; }?>> Female
	  						</div>
  						</div>						
  					</div>  					
  				</div>
				<div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Birth *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input  required max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="dob"  value="<?php if(!empty($row)){  echo $row->DOB;}?>">
	  			</div>
				
				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email-Id *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  placeholder="Enter emial-Id *" class="input-cust-name" type="email" name="email" value="<?php if(!empty($row)){ echo $row->EMAIL;}?>">
  				</div> 

  				<div class="w-100"></div>

  				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row->MOBILE;?>">
  				</div> 
  				<div class="w-100"></div>
                <div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-users"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of Dependants </span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input required placeholder="No Of Dependants *" class="input-cust-name" type="text" name="NO_OF_DEPENDANTS" value="<?php if(!empty($row_more))echo $row_more->NO_OF_DEPENDANTS;?>"  maxlength="2">
  				</div> 			
				
                    <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number Available *</span>
						</div>
				        <div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
								<div class="row">
								
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  type="radio" id='yesCheck1' name="passport_avl" value="yes" <?php if(!empty($row_more)){ if($row_more->Passport_available=='yes'){ echo 'checked';}}?> onclick="add_passport_no()"> yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input id='noCheck1'  <?php if(!empty($row_more)){ if($row_more->Passport_available=='no' || $row_more->Passport_available=='NULL' || $row_more->Passport_available==''){ echo 'checked';}}?> type="radio" name="passport_avl" value="no" onclick="add_passport_no()"> no
									</div>
									
								</div>	
							</div>  
							
						</div>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  placeholder="" class="input-cust-name" type="text" name="passport_no" id="passport_no"   value="<?php if(!empty($row_more)){if($row_more->Passport_available=='yes'){echo $row_more->Passport_Number; }}?>" <?php if($row_more->Passport_Number=='no' || $row_more->Passport_Number=='NULL' || $row_more->Passport_Number=='') {echo 'readonly';} ?>>
						</div> 						
				    <?php if(!empty($income_details))if($income_details->CUST_TYPE=='salaried'){?>
					            <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number Available *</span>
								</div>
								<div style="margin-left: 35px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input  type="radio" id='yesCheck3' name="Account_Number_available" value="yes" <?php if(!empty($row_more)){ if($row_more->Account_Number_available=='yes'){ echo 'checked';}}?> onclick="add_acc_no()"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input id='noCheck3'  <?php if(!empty($row_more)){ if($row_more->Account_Number_available=='no' || $row_more->Account_Number_available=='NULL' || $row_more->Account_Number_available==''){ echo 'checked';}}?> type="radio" name="Account_Number_available" value="no" onclick="add_acc_no()"> no
											</div>
											
										</div>	
									</div>  
									
								</div>
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  placeholder="" class="input-cust-name" type="text" name="Account_Number" id="Account_Number"   value="<?php if(!empty($row_more)){if($row_more->Account_Number_available=='yes'){echo $row_more->Account_Number; }}?>" <?php if($row_more->Account_Number_available=='no' || $row_more->Account_Number_available=='NULL' || $row_more->Account_Number_available=='') {echo 'readonly';} ?>>
								</div> 				
					
					<?php } ?>
				 	
				
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				

  				<div class="w-100"></div>

  				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-heart-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Martial Status *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;">
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  type="radio" name="marital" value="married" checked="true"> Married
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input  <?php if(!empty($row)){ if ($row->MARTIAL_STATUS == 'single') echo ' checked="true"';} ?> type="radio" name="marital" value="single"> Single
	  						</div>
							
  						</div>	
  					</div>  
					
  				</div>	
				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Highest Education  *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<select  class="input-cust-name" name="education_type" > 
					  <option value="">Select Education *</option>
					  <option value="ENGINEER" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'ENGINEER') echo ' selected="selected"';} ?>>ENGINEER</option>
					  <option value="GRADUATE" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'GRADUATE') echo ' selected="selected"';} ?>>GRADUATE</option>
					  <option value="MATRIC" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'MATRIC') echo ' selected="selected"';} ?>>MATRIC</option>
					  <option value="POST GRADUATE" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'POST GRADUATE') echo ' selected="selected"';} ?>>POST GRADUATE</option>
					  <option value="UNDER GRADUATE" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'UNDER GRADUATE') echo ' selected="selected"';} ?>>UNDER GRADUATE</option>
					  <option value="PROFESSIONAL" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'PROFESSIONAL') echo ' selected="selected"';} ?>>PROFESSIONAL</option>
					  <option value="OTHERS" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'OTHERS') echo ' selected="selected"';} ?>>OTHERS</option>
					</select>
  				</div>
				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Residential address</span>
				</div>			
				<div class="w-100"></div>
					
				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<input  style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_1;?>">
						<input  style="margin-top: 8px;" placeholder="Address Line 2 *" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_2;?>">
						<input  style="margin-top: 8px;" placeholder="Address Line 3 *" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_3;?>">
				</div>  
                	
   
				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-globe"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Native Place </span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input placeholder="Native Place" class="input-cust-name" name="NATIVE_PLACE" id="NATIVE_PLACE" value="<?php if(!empty($row_more))echo $row_more->NATIVE_PLACE ;?>" minlength="3" maxlength="30">
  				</div> 
				
					 <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number Available *</span>
						</div>
				        <div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
								<div class="row">
								
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  type="radio" id='yesCheck2' name="Driving_l_available" value="yes" <?php if(!empty($row_more)){ if($row_more->Driving_l_available=='yes'){ echo 'checked';}}?> onclick="add_DL_no()"> yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input id='noCheck2'  <?php if(!empty($row_more)){ if($row_more->Driving_l_available=='no' || $row_more->Driving_l_available=='NULL' || $row_more->Driving_l_available==''){ echo 'checked';}}?> type="radio" name="Driving_l_available" value="no" onclick="add_DL_no()"> no
									</div>
									
								</div>	
							</div>  
							
						</div>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  placeholder="" class="input-cust-name" type="text" name="Driving_l_Number" id="Driving_l_Number"   value="<?php if(!empty($row_more)){if($row_more->Driving_l_available=='yes'){echo $row_more->Driving_l_Number; }}?>" <?php if($row_more->Driving_l_available=='no' || $row_more->Driving_l_available=='NULL' || $row_more->Driving_l_available=='') {echo 'readonly';} ?>>
						</div> 
                        <?php if(!empty($income_details))if($income_details->CUST_TYPE=='salaried'){?>
					            <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number Available *</span>
								</div>
								<div style="margin-left: 35px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input  type="radio" id='yesCheck4' name="EPFO_Number_available" value="yes" <?php if(!empty($row_more)){ if($row_more->EPFO_Number_available=='yes'){ echo 'checked';}}?> onclick="add_epfo_no()"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input id='noCheck4'  <?php if(!empty($row_more)){ if($row_more->EPFO_Number_available=='no' || $row_more->EPFO_Number_available=='NULL' || $row_more->EPFO_Number_available==''){ echo 'checked';}}?> type="radio" name="EPFO_Number_available" value="no" onclick="add_epfo_no()"> no
											</div>
											
										</div>	
									</div>  
									
								</div>
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  placeholder="" class="input-cust-name" type="text" name="EPFO_Number" id="EPFO_Number"   value="<?php if(!empty($row_more)){if($row_more->EPFO_Number_available=='yes'){echo $row_more->EPFO_Number; }}?>" <?php if($row_more->EPFO_Number_available=='no' || $row_more->EPFO_Number_available=='NULL' || $row_more->EPFO_Number_available=='') {echo 'readonly';} ?>>
								</div> 				
					
					<?php } ?>		
                    <div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Locality type</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<select required class="input-cust-name resi_prop_type" name="Locality_type" > 
						  <option value="">Select Locality type *</option>
						  <option value="EWS/LIG Locality" <?php if(!empty($row_more))if ($row_more->Locality_type == 'EWS/LIG Locality') echo ' selected="selected"'; ?>>EWS/LIG Locality</option>
						  <option value="Middle/Lower Middle" <?php if(!empty($row_more))if ($row_more->Locality_type == 'Middle/Lower Middle') echo ' selected="selected"'; ?>>Middle/Lower Middle</option>
						  <option value="Upper Middle" <?php if(!empty($row_more))if ($row_more->Locality_type == 'Upper Middle') echo ' selected="selected"'; ?>>Upper Middle</option>
						  <option value="Community/Trouble Prone/Slum" <?php if(!empty($row_more))if ($row_more->Locality_type == 'Community/Trouble Prone/Slum') echo ' selected="selected"'; ?>>Community/Trouble Prone/Slum</option>
						  
						</select>
					</div> 						
				
  				
               				
  			</div>  			
		</div>
<!----------------------------------Co-applicant details ------------------------------- -->


       <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>		
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Co-Applicant Details</span>

			</div>
			
			
			<div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Name of Co-Applicant *</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  						<input style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text" id="f_name" name="f_name_<?php echo $i;?>" minlength="3" maxlength="30" required value="<?php if(!empty($coapplicant))echo $coapplicant->FN;?>" oninput="validateText(this)">
	  					<input minlength="3" maxlength="30" style="margin-top: 8px;" placeholder="Middle Name (Optional)" class="input-cust-name" type="text" id="m_name" name="m_name_<?php echo $i;?>"  value="<?php if(!empty($coapplicant))echo $coapplicant->MN;?>" oninput="validateText(this)">
	  					<input style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" id="l_name" name="l_name_<?php echo $i;?>" minlength="5" maxlength="30" required  value="<?php if(!empty($coapplicant))echo $coapplicant->LN;?>" oninput="validateText(this)">
	  					<input style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="COAPP_ID_<?php echo $i;?>"  id="COAPPID" minlength="3" maxlength="30" hidden="true"  value="<?php if(!empty($coapplicant))echo $coapplicant->UNIQUE_CODE;?>">
	  				</div>
	  				<div class="w-100"></div>

	  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Birth *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input required max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="dob_<?php echo $i;?>"  id="dob" value="<?php if(!empty($coapplicant))echo $coapplicant->DOB;?>">
	  				</div>
					
					
					<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Residential address</span>
					</div>			
					<div class="w-100"></div>
					
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
							<input maxlength="25" required style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1_<?php echo $i;?>" id="resi_add_1" value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_LINE_1;?>">
  					<input maxlength="25" style="margin-top: 8px;" placeholder="Address Line 2" class="input-cust-name" type="text" name="resi_add_2_<?php echo $i;?>" id="resi_add_2" value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_LINE_2;?>">
  					<input maxlength="25" style="margin-top: 8px;" placeholder="Address Line 3" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3_<?php echo $i;?>" value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_LINE_3;?>">
					</div>  
					<div class="w-100"></div>
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-users"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of Dependants </span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input required placeholder="No Of Dependants *" class="input-cust-name" type="text" name="NO_OF_DEPENDANTS_<?php echo $i;?>" value="<?php if(!empty($coapplicant)){echo $coapplicant->NO_OF_DEPENDANTS;}?>"  maxlength="2">
					</div> 
					 <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number Available *</span>
						</div>
				        <div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
								<div class="row">
								
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  type="radio" id='yesCheck_dl_<?php echo $i; ?>' name="Driving_l_available_<?php echo $i;?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Driving_l_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_DL_no(<?php echo $i; ?>)"> yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input id='noCheck_dl_<?php echo $i;?>'  <?php if(!empty($coapplicant)){ if($coapplicant->Driving_l_available=='no' || $coapplicant->Driving_l_available=='NULL' || $coapplicant->Driving_l_available==''){ echo 'checked';}}?> type="radio" name="Driving_l_available_<?php echo $i;?>" value="no" onclick="add_coapp_DL_no(<?php echo $i; ?>)"> no
									</div>
									
								</div>	
							</div>  
							
						</div>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  placeholder="" class="input-cust-name" type="text" name="Driving_l_Number_<?php echo $i; ?>" id="Driving_l_Number_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){if($coapplicant->Driving_l_available=='yes'){echo $coapplicant->Driving_l_Number; }}?>" <?php if($coapplicant->Driving_l_available=='no' || $coapplicant->Driving_l_available=='NULL' || $coapplicant->Driving_l_available=='') {echo 'readonly';} ?>>
						</div> 
						<?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried'){?>
					            <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official Mail Available *</span>
								</div>
								<div style="margin-left: 35px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input  type="radio" id='yesCheck_off_<?php echo $i; ?>' name="Official_mail_available_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Official_mail_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_off_mail(<?php echo $i;?>)"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input id='noCheck_off_<?php echo $i; ?>'  <?php if(!empty($coapplicant)){ if($coapplicant->Official_mail_available=='no' || $coapplicant->Official_mail_available=='NULL' || $coapplicant->Official_mail_available==''){ echo 'checked';}}?> type="radio" name="Official_mail_available_<?php echo $i; ?>" value="no" onclick="add_coapp_off_mail(<?php echo $i; ?>)"> no
											</div>
											
										</div>	
									</div>  
									
								</div>
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official Mail</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  placeholder="" class="input-cust-name" type="email" name="Official_mail_<?php echo $i; ?>" id="Official_mail_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){if($coapplicant->Official_mail_available=='yes'){echo $coapplicant->Official_mail; }}?>" <?php if($coapplicant->Official_mail=='no' || $coapplicant->Official_mail=='NULL' || $coapplicant->Official_mail=='') {echo 'readonly';} ?>>
								</div> 				
					
					<?php } ?>
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email-Id *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input minlength="3" maxlength="30" required placeholder="Enter email-Id *" class="input-cust-name" type="email" name="email_<?php echo $i;?>" value="<?php if(!empty($coapplicant))echo $coapplicant->EMAIL;?>">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  						<input required placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Please enter valid 10 digit phone number" name="mobile_<?php echo $i;?>" oninput="maxLengthCheck(this)" maxlength="10" value="<?php if(!empty($coapplicant))echo $coapplicant->MOBILE;?>">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Education *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<select  class="input-cust-name" name="education_type_<?php echo $i;?>" > 
					  <option value="">Select Education *</option>
					  <option value="ENGINEER" <?php if(!empty($coapplicant)){if ($coapplicant->EDUCATION_BACKGROUND == 'ENGINEER') echo ' selected="selected"';} ?>>ENGINEER</option>
					  <option value="GRADUATE" <?php if(!empty($coapplicant)){if ($coapplicant->EDUCATION_BACKGROUND == 'GRADUATE') echo ' selected="selected"';} ?>>GRADUATE</option>
					  <option value="MATRIC" <?php if(!empty($coapplicant)){ if ($coapplicant->EDUCATION_BACKGROUND == 'MATRIC') echo ' selected="selected"';} ?>>MATRIC</option>
					  <option value="POST GRADUATE" <?php if(!empty($coapplicant)){if ($coapplicant->EDUCATION_BACKGROUND == 'POST GRADUATE') echo ' selected="selected"';} ?>>POST GRADUATE</option>
					  <option value="UNDER GRADUATE" <?php if(!empty($coapplicant)){if ($coapplicant->EDUCATION_BACKGROUND == 'UNDER GRADUATE') echo ' selected="selected"';} ?>>UNDER GRADUATE</option>
					  <option value="PROFESSIONAL" <?php if(!empty($coapplicant)){if ($coapplicant->EDUCATION_BACKGROUND == 'PROFESSIONAL') echo ' selected="selected"';} ?>>PROFESSIONAL</option>
					  <option value="OTHERS" <?php if(!empty($coapplicant)){if ($coapplicant->EDUCATION_BACKGROUND == 'OTHERS') echo ' selected="selected"'; }?>>OTHERS</option>
					</select>
  				</div> 
					
                <div class="w-100"></div>
				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Permanent Address</span>
				</div>	
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<?php if(!empty($coapplicant)) { ?>
	  					<input style="margin-top: 1px;"  placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1_<?php echo $i;?>"  id="per_add_1" value="<?php echo $coapplicant->PER_ADDRS_LINE_1 ?>">
	  					<input style="margin-top: 8px;"  placeholder="Address Line 2 *" class="input-cust-name" type="text" name="per_add_2_<?php echo $i;?>"  id="per_add_2" value="<?php echo $coapplicant->PER_ADDRS_LINE_2 ?>">
	  					<input style="margin-top: 8px;"  placeholder="Address Line 3 *" class="input-cust-name" type="text" name="per_add_3_<?php echo $i;?>"  id="per_add_3" value="<?php echo $coapplicant->PER_ADDRS_LINE_3 ?>">
	  				<?php } else { ?>
	  					<input style="margin-top: 1px;"  placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1_<?php echo $i;?>"  id="per_add_1" >
	  					<input style="margin-top: 8px;"  placeholder="Address Line 2 *" class="input-cust-name" type="text" name="per_add_2_<?php echo $i;?>"  id="per_add_2" >
	  					<input style="margin-top: 8px;"  placeholder="Address Line 3 *" class="input-cust-name" type="text" name="per_add_3_<?php echo $i;?>"  id="per_add_3" >
	  				<?php } ?>
  				</div>  
                 <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number Available *</span>
						</div>
				        <div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
								<div class="row">
								
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  type="radio" id='yesCheck_<?php echo $i; ?>' name="Vechical_NO_available_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Vechical_NO_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_vechical_no(<?php echo $i; ?>)"> yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input id='noCheck_<?php echo $i; ?>'  <?php if(!empty($coapplicant)){ if($coapplicant->Vechical_NO_available=='no' || $coapplicant->Vechical_NO_available=='NULL' || $coapplicant->Vechical_NO_available==''){ echo 'checked';}}?> type="radio" name="Vechical_NO_available_<?php echo $i; ?>" value="no" onclick="add_coapp_vechical_no(<?php echo $i; ?>)"> no
									</div>
									
								</div>	
							</div>  
							
						</div>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">vehicle Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  placeholder="" class="input-cust-name" type="text" name="vechical_no_<?php echo $i; ?>" id="vechical_no_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){if($coapplicant->Vechical_NO_available=='yes'){echo $coapplicant->Vechical_Number; }}?>" <?php if($coapplicant->Vechical_NO_available=='no' || $coapplicant->Vechical_NO_available=='NULL' || $coapplicant->Vechical_NO_available=='') {echo 'readonly';} ?>>
						</div> 		
						<?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried'){?>
					            <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number Available *</span>
								</div>
								<div style="margin-left: 35px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input  type="radio" id='yesCheck_acc_<?php echo $i; ?>' name="Account_Number_available_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Account_Number_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_acc_no(<?php echo $i; ?>)"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input id='noCheck_acc_<?php echo $i; ?>'  <?php if(!empty($coapplicant)){ if($coapplicant->Account_Number_available=='no' || $coapplicant->Account_Number_available=='NULL' || $coapplicant->Account_Number_available==''){ echo 'checked';}}?> type="radio" name="Account_Number_available_<?php echo $i; ?>" value="no" onclick="add_coapp_acc_no(<?php echo $i; ?>)"> no
											</div>
											
										</div>	
									</div>  
									
								</div>
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  placeholder="" class="input-cust-name" type="text" name="Account_Number_<?php echo $i; ?>" id="Account_Number_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){if($coapplicant->Account_Number_available=='yes'){echo $coapplicant->Account_Number; }}?>" <?php if($coapplicant->Account_Number_available=='no' || $coapplicant->Account_Number_available=='NULL' || $coapplicant->Account_Number_available=='') {echo 'readonly';} ?>>
								</div> 				
					
					<?php } ?>
				
				
						
				
				
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-venus-mars"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Gender *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;">
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input type="radio" name="<?php echo "gender_".$i;?>" value="male" <?php  if(!empty($coapplicant)){if ($coapplicant->GENDER == 'male') echo ' checked="true"'; }?>> Male
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input  type="radio" name="<?php echo "gender_".$i;?>" value="female" <?php  if(!empty($coapplicant)){if ($coapplicant->GENDER == 'female') echo ' checked="true"'; }?>> Female
	  						</div>
  						</div>						
  					</div>  					
  				</div>

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-heart-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Martial Status *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;">
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  type="radio" name="<?php echo "marital_".$i; ?>" value="married" checked="true"> Married
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input  <?php  if(!empty($coapplicant)){if ($coapplicant->MARTIAL_STATUS == 'single') echo ' checked="true"'; ?> type="radio" name="<?php echo "marital_".$i;} ?>" value="single"> Single
	  						</div>
							
  						</div>	
  					</div>  
					
  				</div>	
              	
                <div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Current address</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  						<select required class="input-cust-name resi_prop_type" name="resi_sel_property_type_<?php echo $i;?>" > 
					  <option value="">Select Property Type *</option>
					  <option value="Corporate Provided" <?php if(!empty($coapplicant))if ($coapplicant->RES_ADDRS_PROPERTY_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
					  <option value="Mortgaged" <?php if(!empty($coapplicant))if ($coapplicant->RES_ADDRS_PROPERTY_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
					  <option value="Owned" <?php if(!empty($coapplicant))if ($coapplicant->RES_ADDRS_PROPERTY_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
					  <option value="Rented" <?php if(!empty($coapplicant))if ($coapplicant->RES_ADDRS_PROPERTY_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
					  <option value="Shared Accomodation" <?php if(!empty($coapplicant))if ($coapplicant->RES_ADDRS_PROPERTY_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
					  <option value="Paying Guest" <?php if(!empty($coapplicant))if ($coapplicant->RES_ADDRS_PROPERTY_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
					  <option value="Others" <?php if(!empty($coapplicant))if ($coapplicant->RES_ADDRS_PROPERTY_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
					</select>
  				</div> 
                <div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-globe"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Native Place </span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  						<input placeholder="Native Place" class="input-cust-name" name="NATIVE_PLACE_<?php echo $i;?>" id="NATIVE_PLACE" value="<?php if(!empty($coapplicant))echo $coapplicant->NATIVE_PLACE ;?>" minlength="3" maxlength="30">
  				</div> 	
                <div style="margin-top: 10px;" class="col">
					    <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Stability at current address</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input min="1" required placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years_<?php echo $i;?>"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_NO_YEARS_LIVING;?>">
				</div> 	
                <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number Available *</span>
						</div>
				        <div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
								<div class="row">
								
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  type="radio" id='yesCheck_paas_<?php echo $i; ?>' name="passport_avl_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Passport_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_passport_no(<?php echo $i; ?>)"> yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input id='noCheck_pass_<?php echo $i; ?>'  <?php if(!empty($coapplicant)){ if($coapplicant->Passport_available=='no' || $coapplicant->Passport_available=='NULL' || $coapplicant->Passport_available==''){ echo 'checked';}}?> type="radio" name="passport_avl_<?php echo $i; ?>" value="no" onclick="add_coapp_passport_no(<?php echo $i; ?>)"> no
									</div>
									
								</div>	
							</div>  
							
						</div>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  placeholder="" class="input-cust-name" type="text" name="passport_no_<?php echo $i; ?>" id="passport_no_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){if($coapplicant->Passport_available=='yes'){echo $coapplicant->Passport_Number; }}?>" <?php if($coapplicant->Passport_Number=='no' || $coapplicant->Passport_Number=='NULL' || $coapplicant->Passport_Number=='') {echo 'readonly';} ?>>
						</div> 		
                    <?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried'){?>
					            <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number Available *</span>
								</div>
								<div style="margin-left: 35px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input  type="radio" id='yesCheck_epfo_<?php echo $i; ?>' name="EPFO_Number_available_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->EPFO_Number_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_epfo_no(<?php echo $i;?>)"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input id='noCheck_epfo_<?php echo $i; ?>'  <?php if(!empty($coapplicant)){ if($coapplicant->EPFO_Number_available=='no' || $coapplicant->EPFO_Number_available=='NULL' || $coapplicant->EPFO_Number_available==''){ echo 'checked';}}?> type="radio" name="EPFO_Number_available_<?php echo $i; ?>" value="no" onclick="add_coapp_epfo_no(<?php echo $i; ?>)"> no
											</div>
											
										</div>	
									</div>  
									
								</div>
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  placeholder="" class="input-cust-name" type="text" name="EPFO_Number_<?php echo $i; ?>" id="EPFO_Number_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){if($coapplicant->EPFO_Number_available=='yes'){echo $coapplicant->EPFO_Number; }}?>" <?php if($coapplicant->EPFO_Number_available=='no' || $coapplicant->EPFO_Number_available=='NULL' || $coapplicant->EPFO_Number_available=='') {echo 'readonly';} ?>>
								</div> 				
					
					<?php } ?>	
                    <div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Locality type</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<select required class="input-cust-name resi_prop_type" name="Locality_type_<?php echo $i;?>" > 
						  <option value="">Select Locality type *</option>
						  <option value="EWS/LIG Locality" <?php if(!empty($coapplicant))if ($coapplicant->Locality_type == 'EWS/LIG Locality') echo ' selected="selected"'; ?>>EWS/LIG Locality</option>
						  <option value="Middle/Lower Middle" <?php if(!empty($coapplicant))if ($coapplicant->Locality_type == 'Middle/Lower Middle') echo ' selected="selected"'; ?>>Middle/Lower Middle</option>
						  <option value="Upper Middle" <?php if(!empty($coapplicant))if ($coapplicant->Locality_type == 'Upper Middle') echo ' selected="selected"'; ?>>Upper Middle</option>
						  <option value="Community/Trouble Prone/Slum" <?php if(!empty($coapplicant))if ($coapplicant->Locality_type == 'Community/Trouble Prone/Slum') echo ' selected="selected"'; ?>>Community/Trouble Prone/Slum</option>
						  
						</select>
					</div> 							
               				
  			</div>  
				
		</div>
		<?php $i++;}?>
	
	    <div class="row shadow bg-white rounded margin-10 padding-15" >
				<div class="row col-12 justify-content-center">
					<div>
						<a href="<?php echo base_url()?>index.php/credit_manager_user/Document_verification">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							NEXT
						</button></a>
					</div>		
				</div>					
		</div>
	</div>
	</form>
	<script>
	function add_vechical_no()
	{
		 
		if(document.getElementById('yesCheck').checked)
		{
			document.getElementById('vechical_no').removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck').checked)
		{
              document.getElementById('vechical_no').value='';
              document.getElementById('vechical_no').readOnly=true;
				
		}
	}
	function add_passport_no()
	{
		 
		if(document.getElementById('yesCheck1').checked)
		{
			document.getElementById('passport_no').removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck1').checked)
		{
              document.getElementById('passport_no').value='';
              document.getElementById('passport_no').readOnly=true;
				
		}
	}
	
	function add_DL_no()
	{
		 
		if(document.getElementById('yesCheck2').checked)
		{
			document.getElementById('Driving_l_Number').removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck2').checked)
		{
              document.getElementById('Driving_l_Number').value='';
              document.getElementById('Driving_l_Number').readOnly=true;
				
		}
	}
	function add_acc_no()
	{
		 
		if(document.getElementById('yesCheck3').checked)
		{
			document.getElementById('Account_Number').removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck3').checked)
		{
              document.getElementById('Account_Number').value='';
              document.getElementById('Account_Number').readOnly=true;
				
		}
	}
	function add_epfo_no()
	{
		 
		if(document.getElementById('yesCheck4').checked)
		{
			document.getElementById('EPFO_Number').removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck4').checked)
		{
              document.getElementById('EPFO_Number').value='';
              document.getElementById('EPFO_Number').readOnly=true;
				
		}
	}
	function add_off_mail()
	{
		 
		if(document.getElementById('yesCheck5').checked)
		{
			document.getElementById('Official_mail').removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck5').checked)
		{
              document.getElementById('Official_mail').value='';
              document.getElementById('Official_mail').readOnly=true;
				
		}
	}
	
	function add_coapp_vechical_no(i)
	{
		 
		if(document.getElementById('yesCheck_'+i).checked)
		{
			document.getElementById('vechical_no_'+ i).removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck_'+i).checked)
		{
              document.getElementById('vechical_no_'+ i).value='';
              document.getElementById('vechical_no_'+ i).readOnly=true;
				
		}
	}
	function add_coapp_passport_no(i)
	{
		 
		if(document.getElementById('yesCheck_paas_'+i).checked)
		{
			document.getElementById('passport_no_'+ i).removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck_pass_'+i).checked)
		{
              document.getElementById('passport_no_'+ i).value='';
              document.getElementById('passport_no_'+ i).readOnly=true;
				
		}
	}
	function add_coapp_DL_no(i)
	{
		 
		if(document.getElementById('yesCheck_dl_'+i).checked)
		{
			
			document.getElementById('Driving_l_Number_'+ i).removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck_dl_'+i).checked)
		{
			
              document.getElementById('Driving_l_Number_'+ i).value='';
              document.getElementById('Driving_l_Number_'+ i).readOnly=true;
				
		}
	}
	
	function add_coapp_acc_no(i)
	{
		 
		if(document.getElementById('yesCheck_acc_'+ i).checked)
		{
			document.getElementById('Account_Number_'+ i).removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck_acc_'+ i).checked)
		{
              document.getElementById('Account_Number_'+ i).value='';
              document.getElementById('Account_Number_'+ i).readOnly=true;
				
		}
	}
	function add_coapp_epfo_no(i)
	{
		 
		if(document.getElementById('yesCheck_epfo_'+ i).checked)
	
		{
			
			document.getElementById('EPFO_Number_'+ i).removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck_epfo_'+ i).checked)
		{
			
              document.getElementById('EPFO_Number_'+ i).value='';
              document.getElementById('EPFO_Number_'+ i).readOnly=true;
				
		}
	}
	function add_coapp_off_mail(i)
	{
		 
		if(document.getElementById('yesCheck_off_'+ i).checked)
	
		{
			
			document.getElementById('Official_mail_'+ i).removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck_off_'+ i).checked)
		{
			
              document.getElementById('Official_mail_'+ i).value='';
              document.getElementById('Official_mail_'+ i).readOnly=true;
				
		}
	}
	</script>