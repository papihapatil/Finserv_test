<?php ini_set('short_open_tag', 'On'); 
?>
<form method="POST" action="<?php echo base_url(); ?>index.php/customer/coapplicant_new_screen_one_action?UID=<?php  echo $id; ?>" id="coapplicant_new_screen_one_action">
	
		
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;"> about Co-Applicant</span>

			</div>
		
			<div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Full name as per PAN card *</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text" id="f_name" name="f_name" minlength="3" maxlength="30" required value="<?php if(!empty($row_more))echo $row_more->FN;?>" oninput="validateText(this)">
	  					<input minlength="3" maxlength="30" style="margin-top: 8px;" placeholder="Middle Name (Optional)" class="input-cust-name" type="text" id="m_name" name="m_name"  value="<?php if(!empty($row_more))echo $row_more->MN;?>" oninput="validateText(this)">
	  					<input style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" id="l_name" name="l_name" minlength="5" maxlength="30" required  value="<?php if(!empty($row_more))echo $row_more->LN;?>" oninput="validateText(this)">
	  					<input style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="COAPPID"  id="COAPPID" minlength="3" maxlength="30" hidden="true"  value="<?php if(!empty($row_more))echo $row_more->UNIQUE_CODE;?>">
	  				</div>
	  				<div class="w-100"></div>

	  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Birth *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					 <input  class="input-cust-name" type="text" name="dob" id="dob" value="<?php if(!empty($row_more))echo $row_more->DOB;?>" placeholder=" Enter Date of Birth" readonly>
	  				</div>
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email-Id *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input minlength="3" maxlength="30" required placeholder="Enter email-Id *" class="input-cust-name" type="email" name="email" value="<?php if(!empty($row_more))echo $row_more->EMAIL;?>">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input required placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Please enter valid 10 digit phone number" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php if(!empty($row_more))echo $row_more->MOBILE;?>">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-university"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Education *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<select  class="input-cust-name" name="education_type" > 
					  <option value="">Select Education *</option>
					  <option value="ENGINEER" <?php if(!empty($row_more)){if ($row_more->EDUCATION_BACKGROUND == 'ENGINEER') echo ' selected="selected"'; }?>>ENGINEER</option>
					  <option value="ARCHITECT" <?php if(!empty($row_more)){if ($row_more->EDUCATION_BACKGROUND == 'ARCHITECT') echo ' selected="selected"';} ?>>ARCHITECT</option>
					  <option value="CA" <?php if(!empty($row_more)){if ($row_more->EDUCATION_BACKGROUND == 'CA') echo ' selected="selected"';} ?>>CA</option>
					  <option value="COST ACCOUNTANT" <?php if(!empty($row_more)){if ($row_more->EDUCATION_BACKGROUND == 'COST ACCOUNTANT') echo ' selected="selected"'; }?>>COST ACCOUNTANT</option>
					  <option value="CS" <?php if(!empty($row_more)){if ($row_more->EDUCATION_BACKGROUND == 'CS') echo ' selected="selected"';} ?>>CS</option>
					  <option value="DOCTOR" <?php if(!empty($row_more)){if ($row_more->EDUCATION_BACKGROUND == 'DOCTOR') echo ' selected="selected"';} ?>>DOCTOR</option>
					  <option value="GRADUATE" <?php if(!empty($row_more)){if ($row_more->EDUCATION_BACKGROUND == 'GRADUATE') echo ' selected="selected"';} ?>>GRADUATE</option>
					  <option value="MATRIC" <?php if(!empty($row_more)){if ($row_more->EDUCATION_BACKGROUND == 'MATRIC') echo ' selected="selected"';} ?>>MATRIC</option>
					  <option value="POST GRADUATE" <?php if(!empty($row_more)){if ($row_more->EDUCATION_BACKGROUND == 'POST GRADUATE') echo ' selected="selected"';} ?>>POST GRADUATE</option>
					  <option value="UNDER GRADUATE" <?php if(!empty($row_more)){if ($row_more->EDUCATION_BACKGROUND == 'UNDER GRADUATE') echo ' selected="selected"';} ?>>UNDER GRADUATE</option>
					  <option value="PROFESSIONAL" <?php if(!empty($row_more)){if ($row_more->EDUCATION_BACKGROUND == 'PROFESSIONAL') echo ' selected="selected"';} ?>>PROFESSIONAL</option>
					  <option value="LAWYER" <?php if(!empty($row_more)){if ($row_more->EDUCATION_BACKGROUND == 'LAWYER') echo ' selected="selected"'; }?>>LAWYER</option>
					  <option value="NURSING" <?php if(!empty($row_more)){ if ($row_more->EDUCATION_BACKGROUND == 'NURSING') echo ' selected="selected"';} ?>>NURSING</option>
					  <option value="ITI" <?php  if(!empty($row_more)){if ($row_more->EDUCATION_BACKGROUND == 'ITI') echo ' selected="selected"';} ?>>ITI</option>
					   <option value="PHD" <?php if(!empty($row_more)){if ($row_more->EDUCATION_BACKGROUND == 'PHD') echo ' selected="selected"'; }?>>PHD</option>
					  <option value="OTHERS" <?php if(!empty($row_more)){if ($row_more->EDUCATION_BACKGROUND == 'OTHERS') echo ' selected="selected"'; }?>>OTHERS</option>
					</select>
  				</div> 
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
  								<input checked="true" type="radio" name="gender" value="male"> Male
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input type="radio" name="gender" value="female" <?php if(!empty($row_more))if ($row_more->GENDER == 'female') echo ' checked="true"'; ?>> Female
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
  								<input type="radio" name="marital" value="married" checked="true"> Married
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input <?php if(!empty($row_more))if ($row_more->MARTIAL_STATUS == 'single') echo ' checked="true"'; ?> type="radio" name="marital" value="single"> Single
	  						</div>
  						</div>						
  					</div>  					
  				</div>				
  			</div>  			
		</div>


		<!-- family ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Family Details</span>

			</div>
			
			<div class="w-100"></div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-group"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Spouse/ Father Name *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;">
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input type="radio" name="spouse" value="spouse" checked="true"> Spouse
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input <?php if(!empty($row_more))if ($row_more->IS_SPOUSE_FATHER == 'father') echo ' checked="true"'; ?> type="radio" name="spouse" value="father"> Father
	  						</div>
  						</div>						
  					</div>  					
  				</div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input minlength="3" maxlength="30" required placeholder="First Name *" class="input-cust-name" type="text" name="s_f_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_F_NAME;?>" oninput="validateText(this)">
  				</div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input minlength="3" maxlength="30" placeholder="Middle Name (Optional)" class="input-cust-name" type="text" name="s_m_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_M_NAME;?>" oninput="validateText(this)">
  				</div>
  				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input minlength="3" maxlength="30" required placeholder="Last Name *" class="input-cust-name" type="text" name="s_l_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_L_NAME;?>" oninput="validateText(this)">
  				</div>
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col" style="margin-top: 0px;">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-female"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Mother's Name *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input minlength="3" maxlength="30" required placeholder="First Name *" class="input-cust-name" type="text" name="m_f_name" value="<?php if(!empty($row_more))echo $row_more->MOTHER_F_NAME;?>" oninput="validateText(this)">
  				</div>
  				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input minlength="3" maxlength="30" placeholder="Middle Name (Optional)" class="input-cust-name" type="text" name="m_m_name" value="<?php if(!empty($row_more))echo $row_more->MOTHER_M_NAME;?>" oninput="validateText(this)">
  				</div>
  				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input minlength="3" maxlength="30" required placeholder="Last Name *" class="input-cust-name" type="text" name="m_l_name" value="<?php if(!empty($row_more))echo $row_more->MOTHER_L_NAME;?>" oninput="validateText(this)">
  				</div>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col" style="margin-top: 0px;">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-female"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Total No of Brothers and Sisters *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<select required class="input-cust-name" name="no_of_bro_sis" > 
					  <option value="">Select *</option>
					  <option value="1" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '1') echo ' selected="selected"'; ?>>1</option>
					  <option value="2" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '2') echo ' selected="selected"'; ?>>2</option>
					  <option value="3" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '3') echo ' selected="selected"'; ?>>3</option>
					  <option value="4" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '4') echo ' selected="selected"'; ?>>4</option>
					  <option value="5" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '5') echo ' selected="selected"'; ?>>5</option>
					  <option value="6" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '6') echo ' selected="selected"'; ?>>6</option>
					  <option value="7" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '7') echo ' selected="selected"'; ?>>7</option>
					  <option value="8" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '8') echo ' selected="selected"'; ?>>8</option>
					  <option value="9" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '9') echo ' selected="selected"'; ?>>9</option>
					  <option value="10" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '10') echo ' selected="selected"'; ?>>10</option>
					</select>  					
  				</div>
				<div class="col" style="margin-top: 8px;">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-female"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">No Of Dependants *</span>
				</div>	
				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="No Of Dependants *" class="input-cust-name" type="text" name="NO_OF_DEPENDANTS" value="<?php if(!empty($row_more)){echo $row_more->NO_OF_DEPENDANTS;}?>"  maxlength="2">
  				</div>
			</div>
		</div>

		

		<!-- address details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Co-Applicant live</span>

			</div>
		
			<div class="w-100"></div>

			<div class="col-12" style="margin-bottom: 20px; color: black; font-size: 14px;">
				<span>Residence Address *</span>

			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="25" required style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_1;?>">
  					<input maxlength="25" style="margin-top: 8px;" placeholder="Address Line 2" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_2;?>">
  					<input maxlength="25" style="margin-top: 8px;" placeholder="Address Line 3" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_3;?>">
  				</div>  

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of years at the current Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input min="1" required placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_NO_YEARS_LIVING;?>">
  				</div>	
                <div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Native Place *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="Native Place" class="input-cust-name" name="NATIVE_PLACE" id="NATIVE_PLACE" value="<?php if(!empty($row_more))echo "" ;?>" minlength="3" maxlength="30">
  				</div> 				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="25" minlength="5" required placeholder="Enter landmark *" class="input-cust-name" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LANDMARK;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input pattern="[0-9]{6}" required placeholder="Enter pincode *" class="input-cust-name" type="text" minlength="6" title="Please enter valid pincode" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_PINCODE;?>">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					
					
					<select required class="input-cust-name resi_prop_type" name="resi_sel_property_type" > 
					  <option value="">Select Property Type *</option>
					  <option value="Corporate Provided" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
					  <option value="Mortgaged" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
					  <option value="Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
					  <option value="Rented" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
					  <option value="Shared Accomodation" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
					  <option value="Paying Guest" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
					  
					  <option value="Ancestral Property" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Ancestral Property') echo ' selected="selected"'; ?>>Ancestral Property</option>
					  <option value="Parents Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Parents Owned') echo ' selected="selected"'; ?>>Parents Owned</option>
					  <option value="Brother/ Sister owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Brother/ Sister owned') echo ' selected="selected"'; ?>>Brother/ Sister owned</option>
					  <option value="Others" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
					</select>
  				</div>  
                				
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" id="resi_state_view" placeholder="State" class="input-cust-name" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_STATE ;?>">
  					<input hidden="true" placeholder="State" class="input-cust-name" name="resi_state" id="resi_state" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_STATE ;?>">
  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District" class="input-cust-name" id="resi_district_view" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_DISTRICT ;?>">
  					<input hidden="true" placeholder="District" class="input-cust-name" name="resi_district" id="resi_district" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_DISTRICT ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="25" minlength="25" placeholder="City" class="input-cust-name" name="resi_city" id="resi_city" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_CITY ;?>">
  				</div>  			  				
			</div>


			<!-- permanent add -->
			<div class="w-100"></div>

			<div class="row col-12" style="padding-top: 10px; margin: 10px; color: black; font-size: 14px;">
				<span>Permanent Address *</span>
				<div style="margin-left: 20px;" class="custom-control custom-switch">				  
				  <input type="checkbox" class="custom-control-input" id="customSwitches" name="resiperchk">
				  <label class="custom-control-label" for="customSwitches">Is Co-Applicant's permanent address same as Residence address ?</label>				  
				</div>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address *</span>
				</div>			
				<div class="w-100"></div>
  				<?php $perAddPresent = false; if(!empty($row_more))if($row_more->PER_ADDRS_LINE_1!=''){$perAddPresent = true;}?>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<?php if(!empty($row_more)) { ?>
	  					<input maxlength="30" minlength="5" style="margin-top: 1px;" required placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1"  id="per_add_1" value="<?php echo $perAddPresent? $row_more->PER_ADDRS_LINE_1 : $row_more->RES_ADDRS_LINE_1 ;?>">
	  					<input maxlength="30" minlength="5" style="margin-top: 8px;"  placeholder="Address Line 2 " class="input-cust-name" type="text" name="per_add_2"  id="per_add_2" value="<?php echo $perAddPresent? $row_more->PER_ADDRS_LINE_2 : $row_more->RES_ADDRS_LINE_2 ;?>">
	  					<input maxlength="30" minlength="5" style="margin-top: 8px;" placeholder="Address Line 3 " class="input-cust-name" type="text" name="per_add_3"  id="per_add_3" value="<?php echo $perAddPresent? $row_more->PER_ADDRS_LINE_3 : $row_more->RES_ADDRS_LINE_3 ;?>">
	  				<?php } else { ?>
	  						<input maxlength="30" minlength="5" style="margin-top: 1px;" required placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1"  id="per_add_1" >
	  					<input maxlength="30" minlength="5" style="margin-top: 8px;" placeholder="Address Line 2 " class="input-cust-name" type="text" name="per_add_2"  id="per_add_2" >
	  					<input maxlength="30" minlength="5" style="margin-top: 8px;" placeholder="Address Line 3 " class="input-cust-name" type="text" name="per_add_3"  id="per_add_3" >
	  				<?php } ?>
  				</div>  	

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of years at the permanent Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input min="1" placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="per_no_of_years" id="per_no_of_years" required oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_NO_YEARS_LIVING : $row_more->RES_ADDRS_NO_YEARS_LIVING ;?>">
  				</div>			  						  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  maxlength="25" minlength="25" placeholder="Enter landmark" required class="input-cust-name" type="text" name="per_landmark" id="per_landmark" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_LANDMARK : $row_more->RES_ADDRS_LANDMARK ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input pattern="[0-9]{6}" placeholder="Enter pincode *" class="input-cust-name" type="text" minlength="6" name="per_pincode" title="Please enter valid pincode" id="per_pincode"  required oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_PINCODE : $row_more->RES_ADDRS_PINCODE ;?>">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select class="input-cust-name" name="per_sel_property_type" required id="sel_per_property_type"> 
						<?php if($perAddPresent) { ?>
							  <option value="">Select Property Type *</option>
							  <option value="Corporate Provided" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
							  <option value="Mortgaged" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
							  <option value="Owned" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
							  <option value="Rented" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
							  <option value="Shared Accomodation" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
					          <option value="Paying Guest" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option> 
							   <option value="Ancestral Property" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Ancestral Property') echo ' selected="selected"'; ?>>Ancestral Property</option>
							  <option value="Parents Owned" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Parents Owned') echo ' selected="selected"'; ?>>Parents Owned</option>
					          <option value="Brother/ Sister owned" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Brother/ Sister owned') echo ' selected="selected"'; ?>>Brother/ Sister owned</option>
							  <option value="Others" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
						<?php } else { ?>
							
							  <option value="">Select Property Type *</option>
							  <option value="Corporate Provided" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
							  <option value="Mortgaged" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
							  <option value="Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
							  <option value="Rented" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
							  <option value="Shared Accomodation" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
					  		  <option value="Paying Guest" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
							   <option value="Ancestral Property" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Ancestral Property') echo ' selected="selected"'; ?>>Ancestral Property</option>
							  <option value="Parents Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Parents Owned') echo ' selected="selected"'; ?>>Parents Owned</option>
					  		  <option value="Brother/ Sister owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Brother/ Sister owned') echo ' selected="selected"'; ?>>Brother/ Sister owned</option>
							  <option value="Others" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
						<?php }?>
							</select>
  				</div>  			  							  				
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="State *" class="input-cust-name" id="per_state_view" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_STATE : $row_more->RES_ADDRS_STATE ;?>">

  					<input hidden="true" placeholder="State *" class="input-cust-name" name="per_state" id="per_state" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_STATE : $row_more->RES_ADDRS_STATE ;?>">
  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="per_district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District *" class="input-cust-name" id="per_district_view" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_DISTRICT : $row_more->RES_ADDRS_DISTRICT ;?>">

  					<input hidden="true" placeholder="District *" class="input-cust-name" name="per_district" id="per_district" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_DISTRICT : $row_more->RES_ADDRS_DISTRICT ;?>">

  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="per_city_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="25" minlength="5" placeholder="City *" class="input-cust-name" name="per_city" id="per_city" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_CITY : $row_more->RES_ADDRS_CITY ;?>">
  				</div>  			  				
			</div>
		
			<div class="w-100"></div> 
	    </div>
			<!-- identity details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Identity Details</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">We require your Aadhar number and PAN</span>

			</div>
			<div class="w-100"></div>

			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Select KYC Document *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select required class="input-cust-name resi_prop_type" name="KYC_doc" id="KYC_doc" > 
					<?php if(!empty($row_more)){ if( $row_more->VERIFY_KYC=='true'){?>
						 <option value="<?php if(!empty($row_more)){echo $row_more->KYC_doc; }?>"><?php if(!empty($row_more)){echo $row_more->KYC_doc; } ?></option>
					<?php }else{?>
						  <option value="">Select KYC Document *</option>
						  <option value="Aadhar" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'Aadhar') echo ' selected="selected"'; ?>>Aadhar Card</option>
						  <option value="Driving Licence" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'Driving Licence') echo ' selected="selected"'; ?>>Driving Licence</option>
						  <option value="Passport" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'Passport') echo ' selected="selected"'; ?>>Passport</option>
						  <option value="VoterId" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'VoterId') echo ' selected="selected"'; ?>>VoterId</option>
					<?php }}else{ ?>
					 <option value="">Select KYC Document *</option>
						  <option value="Aadhar" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'Aadhar') echo ' selected="selected"'; ?>>Aadhar Card</option>
						  <option value="Driving Licence" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'Driving Licence') echo ' selected="selected"'; ?>>Driving Licence</option>
						  <option value="Passport" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'Passport') echo ' selected="selected"'; ?>>Passport</option>
						  <option value="VoterId" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'VoterId') echo ' selected="selected"'; ?>>VoterId</option>
					<?php } ?>
						</select>	
                </div>						
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" id="passport_file_no" style="display:none">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Enter File Number</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input   placeholder="Enter File Number" class="input-cust-name" type="text" name="file_number" id="file_number"  <?php if(!empty($row_more)){ if( $row_more->VERIFY_KYC=='true'){echo 'readonly ';} }?> value="<?php  if(!empty($row_more)){ echo $row_more->File_Number_Passport;}?>"  style="text-transform:uppercase">
  				  
				</div>  			  				
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" id="date_of_issue" style="display:none">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Enter Date of Issue</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input   max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="doe" id="doe"  >
	  				</div> 			  				
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Enter KYC Document Id</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  required placeholder="" class="input-cust-name" type="text" name="KYC" id="KYC"  <?php if(!empty($row_more)){ if( $row_more->VERIFY_KYC=='true'){echo 'readonly ';} }?> value="<?php  if(!empty($row_more)){ echo $row_more->KYC;}?>"  style="text-transform:uppercase">
  				    <input type="text" id="verify_kyc_status" name="verify_kyc_status" value="<?php if(!empty($row_more)){echo $row_more->VERIFY_KYC;}?>"  hidden >
				</div>  			  				
			</div>
			<?php if(!empty($row_more)){ if( $row_more->VERIFY_KYC=='true'){ ?> 
				<div class="col-xl-3 -lg-3 col-md-col3 col-sm-12 col-12">
					<div style="margin-top: 0px;" class="col">
						<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
					</div>			
					<div class="w-100"></div>
					<a class="btn btn-success disabled" id="VERIFY_KYC" style="color:white;  padding: 19px;">Verify KYC Document <i class="fas fa-check"></i></a>
				</div>
			<?php }
					else {
						?>
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							<div style="margin-top: 0px;" class="col">
								<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
							</div>			
							<div class="w-100"></div>
							<a class="btn btn-success " id="VERIFY_KYC" style="color:white;  padding: 19px;">Verify KYC Document</a>
						</div>
			<?php } }
			else{?>
				    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							<div style="margin-top: 0px;" class="col">
								<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
							</div>			
							<div class="w-100"></div>
							<a class="btn btn-success " id="VERIFY_KYC" style="color:white; padding: 19px;">Verify KYC Document</a>
						</div>
			  <?php  }?>
			
			<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">PAN Number *</span>
					 
				</div>	
                 <div style="margin-top: 0px;" class="col">
					
					 <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">(Five characters, Four digits and again One character) e.g: COKPG9558B</span>
				</div>					
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" required placeholder="PAN number *" class="input-cust-name" type="text" name="pan" id="pan" title="Please enter valid PAN number" maxlength="10" <?php if(!empty($row_more)){ if( $row_more->VERIFY_PAN=='true'){echo 'readonly ';} }?> value="<?php  if(!empty($row_more)){ echo $row_more->PAN_NUMBER;}?>"  style="text-transform:uppercase">
  				    <input type="text" id="verify_pan_status" name="verify_pan_status" value="<?php if(!empty($row_more)){echo $row_more->VERIFY_PAN;} ?>"  hidden >
					
				</div>  			  				
			</div>
			
			<?php if(!empty($row_more)){ if( $row_more->VERIFY_PAN=='true'){ ?> 
				<div class="col-xl-4 -lg-4 col-md-col4 col-sm-12 col-12">
					<div style="margin-top: 19px;" class="col">
						<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
					</div>			
					<div class="w-100"></div>
					<a class="btn btn-success disabled" id="verify_pan" style="color:white;">Verify PAN <i class="fas fa-check"></i></a>
				</div>
			<?php }
					else {
						?>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div style="margin-top: 19px;" class="col">
								<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
							</div>			
							<div class="w-100"></div>
							<a class="btn btn-success " id="verify_pan" style="color:white;">Verify PAN </a>
						</div>
			<?php } }
			else{?>
				    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div style="margin-top: 19px;" class="col">
								<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
							</div>			
							<div class="w-100"></div>
							<a class="btn btn-success " id="verify_pan" style="color:white;">Verify PAN </a>
						</div>
			  <?php  }?>
			<div style="margin-top: 20px;" class="row col-12 justify-content-center">
			<span style="color:red" id="pan_error"></span>
			<span style="color:red" id="kyc_error"></span>
			</div>
			<div class="w-100"></div> 
			<div style="margin-top: 20px;" class="row col-12 justify-content-center">
				<div>			
				   <input type="checkbox" id="TC" name="TC" checked required value="true" >&nbsp; I give my consent to request my Credit bureau score and i agree to <a style="color: #007bff" target="_blank" href="<?php echo base_url()?>Finaleap-Terms_and_conditions _Credit_bureau_Consent.pdf">terms and conditions.</a>
				</div>
			</div>
			
			<?php if(!empty($row_more)){ if( $row_more->VERIFY_PAN=='true' && $row_more->VERIFY_KYC=='true' ){ ?> 	
				<div style="margin-top: 20px;" class="row col-12 justify-content-center">
					<div>
						<a  id="continue" href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried">
						<button class="login100-form-btn " style="background-color: #25a6c6;" id="continue1"  >
							CONTINUE
						</button>
						</a>
						
					</div>		
				</div>
			<?php } else {?>
			             <div style="margin-top: 20px;" class="row col-12 justify-content-center">
							<div>
								<a  id="continue" href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried">
								<button class="login100-form-btn disabled" style="background-color: #25a6c6;" id="continue1"  title="please verifiy PAN" >
									CONTINUE
								</button>
								</a>
								
							</div>		
						</div>
			<?php } }
			       else {?>
				   <div style="margin-top: 20px;" class="row col-12 justify-content-center">

					<div>
						<a  id="continue" href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried">
						<button class="login100-form-btn disabled" style="background-color: #25a6c6;" id="continue1"  title="please verifiy PAN" >
							CONTINUE
						</button>
						</a>
						
					</div>		
				</div>

				   <?php } ?>
			



			

		</div>
		</div>
</form>
<script>

 $(document).ready(function () {
                
									$('#dob').datepicker({
																		autoclose: true,
																		endDate: new Date(new Date().setDate(new Date().getDate())),
																		format: 'yyyy-mm-dd'  
																		
														});  
								
								});

 $('#pan').on('input', function(e) {
   this.setCustomValidity('')
     // e.target.checkValidity()
     this.reportValidity();
   })
   $('#KYC').on('input', function(e) {
   this.setCustomValidity('')
     // e.target.checkValidity()
     this.reportValidity();
   })


$('#continue1').on('click',function(e)
                        {
							 var verify_kyc_status=$('#verify_kyc_status').val();
							  var verify_pan_status=$('#verify_pan_status').val();
							
							    
							 if(verify_pan_status=='true' && verify_kyc_status=='true')
							{
								
								    $('#continue1').removeClass('disabled');
									
								
							}
							
							else if( $(this).hasClass('disabled') )
							{
								e.preventDefault();
								swal("Warning!", "Please Verify PAN And KYC Document", "warning");
								
							}
							
						    
							
						}
					 );

$('#KYC_doc').on('change',function(e)
                        {
							 var KYC_doc = $('#KYC_doc').val();
							
							 $('#KYC').attr("placeholder", "Enter "+ KYC_doc+" Number");
							 if(KYC_doc=='Passport')
							 {
								 $('#passport_file_no').show();
								 document.getElementById("KYC").pattern = "^([A-Z a-z]){1}([0-9]){7}$";
								 //$('#KYC').attr('title','J8369854');
								 $('#date_of_issue').hide();
								 $('#VERIFY_KYC').removeClass('disabled');
								
							 }
							 else if(KYC_doc=='Driving Licence')
							 {
								  $('#date_of_issue').show();
								  $('#passport_file_no').hide();
								   document.getElementById("KYC").pattern = "^(([A-Z]{2}[0-9]{2})( )|([A-Z]{2}-[0-9]{2}))((19|20)[0-9][0-9])[0-9]{7}$";
								    //$('#KYC').attr('title','MH14 20160034761');
								  $('#VERIFY_KYC').removeClass('disabled');
							 }
							  else if(KYC_doc=='Aadhar')
							 {
								   $('#date_of_issue').hide();
								   $('#passport_file_no').hide();
								    document.getElementById("KYC").pattern = "^[2-9]{1}[0-9]{3}\\s[0-9]{4}\\s[0-9]{4}$";
								   // $('#KYC').attr('title','3675 9834 6015');
								   $('#VERIFY_KYC').addClass('disabled');
								   $('#verify_kyc_status').val('true');
							 }
							  else if(KYC_doc=='VoterId')
							 {
								 
								    document.getElementById("KYC").pattern = "^([a-zA-Z]){3}([0-9]){7}?$";
									 $('#VERIFY_KYC').removeClass('disabled');
									  $('#passport_file_no').hide();
								    //$('#KYC').attr('title','ZUT4800754');
								 
							 }
							 else
							 {
								 $('#date_of_issue').hide();
								 $('#passport_file_no').hide();
								 $('#VERIFY_KYC').removeClass('disabled');
								 
							 }
							 
						}
					 );
 $( "#VERIFY_KYC" ).click(function() {
      
	    
        var KYC_doc = $('#KYC_doc').val();
		if(KYC_doc=='VoterId')
		{
		    var pan_no = $.trim($('#KYC').val());
		    var f_name = $.trim($('#f_name').val());
			var m_name = $.trim($('#m_name').val());
			var l_name = $.trim($('#l_name').val());
			var resi_no_of_years= $('#resi_no_of_years').val();
			if(resi_no_of_years>5)
			{
			var state=$('#resi_state_view').val()
			}
			else
			{
				var state=$('#per_state_view').val()
			}
			
			var type="voterid";
			if(f_name==''|| l_name=='')
			{
				$('#kyc_error').html("Please Fill Full name as per PAN card.");
				exit;
			}
			if(pan_no=='')
			{
				$('#kyc_error').html("Please Fill VoterId Number.");
				exit;
			}
			if(state=='')
			{
				$('#kyc_error').html("Please Enter State.");
				exit;
			}
			if(m_name=='')
			{
				var full_name=f_name+' '+l_name;
			
			}
			else
			{
				var full_name=f_name+' '+m_name+' '+l_name;
			}
			  $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
                data:{'full_name':full_name,'pan_no':pan_no,'type':type,'state':state},
                success:function(data){
					
					var obj =JSON.parse(data);
					
                   if(obj.msg=='sucess')
				   {

					  swal("success!", "VoterId verified Sucessfully!", "success");
					  $('#verify_kyc_status').val('true');
					
					  $('#VERIFY_KYC').addClass('disabled');
					 // $('#KYC_doc').prop('readonly', true);
					 var option = $('<option></option>').attr("value", KYC_doc).text(KYC_doc);
					 $("#KYC_doc").empty().append(option);
					  $('#KYC').prop('readonly', true);
					  
					
					  
					 
					   
				   }
				   else if(obj.msg=='fail')
				   {
					    
					     swal("Error!", "Something Wrong Information You given!", "warning");
						 $('#verify_kyc_status').val('false');
				   }
				   else if(obj.msg=='error')
				   {   
				         swal("Error!",obj.response , "warning");
						 $('#verify_kyc_status').val('false');
					   
				   }
				   
                }
            });
		   
		}
		if(KYC_doc=='Driving Licence')
		{
		    var pan_no = $('#KYC').val();
		    var doe=$('#doe').val();
			var dob=$('#dob').val();
			//var dob=document.getElementById("dob").innerHTML();
			  var date    = new Date(dob),
				yr      = date.getFullYear(),
				month   = date.getMonth() < 10 ? '0' + (date.getMonth()+1) : (date.getMonth()+1),
				day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
				newDate = day + '/' + month + '/' + yr;
				var date1    = new Date(doe),
				yr      = date1.getFullYear(),
				month   = date1.getMonth() < 10 ? '0' + (date1.getMonth()+1): (date1.getMonth()+1),
				day     = date1.getDate()  < 10 ? '0' + date1.getDate()  : date1.getDate(),
				newDate1 = day + '/' + month + '/' + yr;
		
			var type="drivingLicence";
			
			if(pan_no=='')
			{
				$('#kyc_error').html("Please Fill Driving Licence Number. ");
				exit;
			}
			if(doe=='')
			{
				$('#kyc_error').html("Please Enter Date of Issue. ");
				exit;
			}
			if(dob=='')
			{
				$('#kyc_error').html("Please Enter Date of Birth. ");
				exit;
			}
			
			
			  $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
                data:{'pan_no':pan_no,'type':type,'dob':newDate,'doe':newDate1},
                success:function(data){
					
					var obj =JSON.parse(data);
					
                   if(obj.msg=='sucess')
				   {

					  swal("success!", "Driving Licence verified Sucessfully!", "success");
					  $('#verify_kyc_status').val('true');
					  $('#VERIFY_KYC').addClass('disabled');
					
					  
					 
					   
				   }
				   else if(obj.msg=='fail')
				   {
					    
					     swal("Error!", "Something Wrong Information You given!", "warning");
						 $('#verify_kyc_status').val('false');
				   }
				   else if(obj.msg=='error')
				   {   
				         swal("Error!",obj.response , "warning");
						 $('#verify_kyc_status').val('false');
					   
				   }
				   
                }
            });
		   
		}
		if(KYC_doc=='Passport')
		{
			
		    var pan_no = $.trim($('#KYC').val());
		    var f_name = $.trim($('#f_name').val());
			var m_name = $.trim($('#m_name').val());
			var l_name = $.trim($('#l_name').val());
			var file_number=$.trim($('#file_number').val());
			var dob=$('#dob').val();
			 var date    = new Date(dob),
				yr      = date.getFullYear(),
				month   = date.getMonth() < 10 ? '0' + (date.getMonth()+1) : (date.getMonth()+1),
				day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
				newDate = day + '/' + month + '/' + yr;
			
			var type="passport";
			if(f_name==''|| l_name=='')
			{
				$('#kyc_error').html("Please Fill Full name as per PAN card. ");
				exit;
			}
			if(file_number=='' || file_number=='' )
			{
				$('#kyc_error').html("Please Fill File Number. ");
				exit;
			}
			
			if(pan_no=='')
			{
				$('#kyc_error').html("Please Fill Passport Number. ");
				exit;
			}
			if(dob=='')
			{
				$('#kyc_error').html("Please Enter Date of Birth. ");
				exit;
			}
			if(m_name=='')
			{
				var full_name=f_name+' '+l_name;
			
			}
			else
			{
				var full_name=f_name+' '+m_name+' '+l_name;
			}
			  $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
                data:{'full_name':full_name,'pan_no':pan_no,'type':type,'file_number':file_number,'dob':newDate},
                success:function(data){
					
					var obj =JSON.parse(data);
					
                   if(obj.msg=='sucess')
				   {
					  $('#continue1').removeClass('disabled');
					  swal("success!", "Passport verified Sucessfully!", "success");
					  $('#verify_kyc_status').val('true');
					   $('#VERIFY_KYC').addClass('disabled');
					  
					 
					   
				   }
				   else if(obj.msg=='fail')
				   {
					     $('#continue1').removeClass('disabled');
					     swal("Error!", "Something Wrong Information You given!", "warning");
						
						
						 $('#verify_kyc_status').val('false');
				   }
				   else if(obj.msg=='error')
				   {   
				         swal("Error!",obj.response , "warning");
				        $('#continue1').addClass('disabled');
						 
						 $('#verify_kyc_status').val('false');
					   
				   }
				   
                }
            });
		   
		}
		
		
	 
		
       
    });
$( "#verify_pan" ).click(function() {
      
	    
        var f_name = $.trim($('#f_name').val());
	    var m_name = $.trim($('#m_name').val());
	    var l_name = $.trim($('#l_name').val());
		var pan_no = $.trim($('#pan').val());
		
		var type="individualPan";
		if(f_name==''|| l_name=='')
		{
			$('#pan_error').html("Please Fill Full name as per PAN card. ");
			exit;
		}
		if(pan_no=='')
		{
			$('#pan_error').html("Please Fill PAN Number. ");
			exit;
		}
		if(m_name=='')
		{
			var full_name=f_name+' '+l_name;
		
		}
		else
		{
			var full_name=f_name+' '+m_name+' '+l_name;
		}
	 
		
         $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
                data:{'full_name':full_name,'pan_no':pan_no,'type':type},
                success:function(data){
					
					var obj =JSON.parse(data);
					
                   if(obj.msg=='sucess')
				   {
					  var pan_name=obj.name;
					  
					
					  swal("success!", "PAN verified Sucessfully!", "success");
					  $('#verify_pan_status').val('true');
					   $('#verify_pan').addClass('disabled');
					  
					 
					   
				   }
				   else if(obj.msg=='fail')
				   {
					    var pan_name=obj.name;
						 
					   

					    // swal("Error!", "Your name on Pan is "+obj.name+". Please update name as per your Pan card", "warning");
						 var words = obj.name.split(' ');
						 var length = words.length;
						  swal({
									title: "Error!",
									text: "Your name on Pan is "+obj.name+". Please update name as per your Pan card",
									type: "warning"
								}).then((willDelete) => {
												  if (willDelete) {
													  if(length==3)
													  {
													   $("#f_name").val(words[0]);
													   $("#m_name").val(words[1]);
													   $("#l_name").val(words[2]);
													  }
													   if(length==2)
													  {
													   $("#f_name").val(words[0]);
													    $("#l_name").val();
													   $("#l_name").val(words[1]);
													  
													  }
													
                                                     
													 
												  }
								});
						
						 $('#verify_pan').addClass('disabled');
						 $('#verify_pan_status').val('true');
						
				   }
				   else if(obj.msg=='error')
				   {   
				         swal("Error!",obj.response , "warning");
				        $('#continue1').addClass('disabled');
						 
						 $('#verify_pan_status').val('false');
					   
				   }
				   
                }
            });
    });
</script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
