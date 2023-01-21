<?php ini_set('short_open_tag', 'On'); ?>
<form method="POST" action="<?php echo base_url(); ?>index.php/Admin/update_revert_personal_form_details">
	<div class="margin-10 padding-10">
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Tell Us About Yourself</span>
			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 45px; font-size: 12px; color: #bfbbbb;">Please Fill Your Personal Details. If Required Our Representative May Get In Touch To Verify Them.</span>
			</div>
			<div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >
				<div class="col" >
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 15%;">Full Name As Per PAN Card *</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input style="margin-top: 8px;" placeholder="First Name *" class="form-control" type="text" id="f_name" name="f_name" minlength="3" maxlength="30" required value="<?php echo $row_one->FN;?>" oninput="validateText(this)">
	  					<input style="margin-top: 8px;" placeholder="Middle Name (optional) *" class="form-control" type="text" name="m_name" id="m_name"  value="<?php echo $row_one->MN;?>" minlength="3" maxlength="30" oninput="validateText(this)">
	  					<input style="margin-top: 8px;" placeholder="Last Name *" class="form-control" type="text" name="l_name" id="l_name" minlength="3" maxlength="30" required  value="<?php echo $row_one->LN;?>" oninput="validateText(this)">
						<input  hidden style="margin-top: 8px;" placeholder="Last Name *" class="form-control" type="text" name="ID" id="ID" minlength="3" maxlength="30" required  value="<?php echo $row_one->UNIQUE_CODE;?>" oninput="validateText(this)">
	  				</div>
	  				<div class="w-100"></div>
	  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 15%;  font-weight: bold; ">Date Of Birth *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  				 	<input  class="form-control" type="text" name="dob" id="dob" value="<?php echo $row_one->DOB;?>" readonly>
	  				</div>
					</div>							  				
				</div>	
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 11%;  font-weight: bold; ">Email-Id *</span>
					</div>			
					<div class="w-100"></div>
  					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  						<input required placeholder="Enter email-Id *" class="form-control" type="email" name="email" value="<?php echo $row_one->EMAIL;?>" minlength="8" maxlength="75">
  					</div> 
		 				<div class="w-100"></div>
	  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 11%;  font-weight: bold; ">Mobile Number *</span>
					</div>			
					<div class="w-100"></div>
  				    <div style="margin-left: 35px;  margin-top: 8px;" class="col">
  						<input required placeholder="Enter mobile number *" class="form-control" type="text" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row_one->MOBILE;?>">
  					</div> 
  				<div class="w-100"></div>
  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 11%;  font-weight: bold; ">Education *</span>
					</div>			
					<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<select required class="form-control" name="education_type" > 
						  <option value="">Select Education *</option>
						  <option value="Graduate" <?php if ($row_one->EDUCATION_BACKGROUND == 'Graduate') echo ' selected="selected"'; ?>>GRADUATE</option>
						  <option value="Post Graduate" <?php if ($row_one->EDUCATION_BACKGROUND == 'Post Graduate') echo ' selected="selected"'; ?>>POST GRADUATE</option>
						  <option value="Under Graduate" <?php if ($row_one->EDUCATION_BACKGROUND == 'Under Graduate') echo ' selected="selected"'; ?>>UNDER GRADUATE</option>
						</select>
  				</div> 
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 11%;  font-weight: bold; ">Gender *</span>
					</div>			
					<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="form-control" style=" margin-top: 8px;">
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input checked="true" type="radio" name="gender" value="male"> Male
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input type="radio" name="gender" value="female" <?php if ($row_one->GENDER == 'female') echo ' checked="true"'; ?>> Female
	  						</div>
  						</div>						
  					</div>  					
  				</div>
				  	 <div class="w-100"></div>
				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 11%;  font-weight: bold; ">Alternate Mobile Number</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input placeholder="Enter mobile number" class="form-control" type="text" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" name="alternative_mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row_one->Alternative_mobile ;?>">
  				</div> 


  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 11%;  font-weight: bold; ">Martial Status *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="form-control" style=" margin-top: 8px;">
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input type="radio" name="marital" value="married" checked="true"> Married
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input <?php if ($row_one->MARTIAL_STATUS == 'single') echo ' checked="true"'; ?> type="radio" name="marital" value="single"> Single
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
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">Please Provide Your Family Details For Further Processing.</span>

			</div>
			<div class="w-100"></div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 11%;  font-weight: bold; ">Spouse/ Fathers Name  *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="form-control" style=" margin-top: 8px;">
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
  					<input required placeholder="First Name *" class="form-control" type="text" name="s_f_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_F_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
  				</div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="Middle Name (Optional)" class="form-control" type="text" name="s_m_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_M_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
  				</div>
  				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Last Name *" class="form-control" type="text" name="s_l_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_L_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
  				</div>
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col" style="margin-top: 0px;">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 11%;">Mother's Name *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="First Name *" class="form-control" type="text" name="m_f_name" value="<?php if(!empty($row_more))echo $row_more->MOTHER_F_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
  				</div>
  				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="Middle Name (Optional)" class="form-control" type="text" name="m_m_name" value="<?php if(!empty($row_more))echo $row_more->MOTHER_M_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
  				</div>
  				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Last Name *" class="form-control" type="text" name="m_l_name" value="<?php if(!empty($row_more))echo $row_more->MOTHER_L_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
  				</div>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col" style="margin-top: 0px;">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 11%;">Total No of Brothers and Sisters *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<select required class="form-control" name="no_of_bro_sis" > 
					  <option value="">Select *</option>
					  <option value="1" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '1') echo ' selected="selected"'; ?>>0</option>
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
  					<!--input required placeholder="Enter count *" class="input-cust-name" maxlength="2" type="number" name="no_of_bro_sis" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->TOTAL_BRO_SIS;?>" -->
  				</div>
				<div class="col" style="margin-top: 8px;">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 11%;">No Of Dependants *</span>
				</div>	
				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="No Of Dependants *" class="form-control" type="text" name="NO_OF_DEPENDANTS" value="<?php if(!empty($row_more))echo $row_more->NO_OF_DEPENDANTS;?>"  maxlength="2">
  				</div>
			</div>
		</div>

		

		<!-- address details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Tell Us Where You Live</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">This Will Help Us To Collect Any Documents If Necessary.</span>

			</div>
			<div class="w-100"></div>

			<div class="col-12" style="margin-bottom: 20px; color: black; font-size: 14px; margin-left:4%;">
				<span>Residence Address *</span>

			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required style="margin-top: 1px;" placeholder="Address Line 1 *" class="form-control" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_1;?>">
  					<input style="margin-top: 8px;" placeholder="Address Line 2 *" class="form-control" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_2;?>">
  					<input style="margin-top: 8px;" placeholder="Address Line 3 *" class="form-control" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_3;?>">
  				</div>  

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 9%;  font-weight: bold; ">No Of Years At Current Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input min="1" required placeholder="Enter years *" class="form-control" type="number" maxlength="2" name="resi_no_of_years"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_NO_YEARS_LIVING;?>">
  				</div>	
               <div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Native Place *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="Native Place" class="form-control" name="NATIVE_PLACE" id="NATIVE_PLACE" value="<?php if(!empty($row_more))echo $row_more->NATIVE_PLACE ;?>">
  				</div>  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Enter landmark *" class="form-control" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LANDMARK;?>" minlength="3" maxlength="30">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Enter pincode *" class="form-control" type="text" pattern="[0-9]{6}" minlength="6" title="Please enter valid pin code" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_PINCODE;?>">
  				</div>  
  				<div class="w-100"></div>
				   <div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">No Of Years At Current City *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  required placeholder="Enter years *" class="form-control" type="number" maxlength="2" name="resi_no_of_years_city"  id="resi_no_of_years_city" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->RES_CITY_NO_YEARS_LIVING;?>">
  				</div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select required class="form-control resi_prop_type" name="resi_sel_property_type" > 
					  <option value="">Select Property Type *</option>
					
					  <option value="Self Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Self Owned') echo ' selected="selected"'; ?>>Self Owned</option>
					    <option value="Parental/Ancestral" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Parental/Ancestral') echo ' selected="selected"'; ?>>Parental/Ancestral</option>
						<option value="Rental personal Family" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rental personal Family') echo ' selected="selected"'; ?>>Rental Personal Family</option>
						<option value="Shared Rental Accomodation" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Shared Rental Accomodation') echo ' selected="selected"'; ?>>Shared Rental Accomodation</option>
					</select>

					<input style="margin-top: 8px; visibility: hidden;" placeholder="Enter other property type" class="input-cust-name" type="text" name="other_prop_type_1" id="other_prop_type_1" value="<?php if(!empty($row_more) && !empty($row_more->RES_ADDRS_OTHER_PROP_1))echo $row_more->RES_ADDRS_OTHER_PROP_1;?>"  minlength="3" maxlength="30">  		
  				</div>  
  				

			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input readonly id="resi_state_view" placeholder="State" class="form-control" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_STATE ;?>">
  					<input hidden="true" placeholder="State" class="form-control" name="resi_state" id="resi_state" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_STATE ;?>">  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District" class="form-control" id="resi_district_view" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_DISTRICT ;?>">
  					<input hidden="true" placeholder="District" class="form-control" name="resi_district" id="resi_district" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_DISTRICT ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">City *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="City" class="form-control" name="resi_city" id="resi_city" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_CITY ;?>" minlength="3" maxlength="30">
  				</div>  
				
			</div>


			<!-- permanent add -->
			<div class="w-100"></div>

			<div class="row col-12" style="padding-top: 10px; margin: 10px; color: black; font-size: 14px;margin-left:4%;">
				<span>Permanent Address *</span>
			
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Address *</span>
				</div>			
				<div class="w-100"></div>
  				<?php $perAddPresent = false; if(!empty($row_more))if($row_more->PER_ADDRS_LINE_1!=''){$perAddPresent = true;}?>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<?php if(!empty($row_more)) { ?>
	  					<input style="margin-top: 1px;" required placeholder="Address Line 1 *" class="form-control" type="text" name="per_add_1"  id="per_add_1" value="<?php echo $perAddPresent? $row_more->PER_ADDRS_LINE_1 : $row_more->RES_ADDRS_LINE_1 ;?>" >
	  					<input style="margin-top: 8px;"  placeholder="Address Line 2 " class="form-control" type="text" name="per_add_2"  id="per_add_2" value="<?php echo $perAddPresent? $row_more->PER_ADDRS_LINE_2 : $row_more->RES_ADDRS_LINE_2 ;?>" >
	  					<input style="margin-top: 8px;"  placeholder="Address Line 3 " class="form-control" type="text" name="per_add_3"  id="per_add_3" value="<?php echo $perAddPresent? $row_more->PER_ADDRS_LINE_3 : $row_more->RES_ADDRS_LINE_3 ;?>" >
	  				<?php } else { ?>
	  						<input style="margin-top: 1px;" required placeholder="Address Line 1 *" class="form-control" type="text" name="per_add_1"  id="per_add_1" minlength="3" maxlength="30">
	  					<input style="margin-top: 8px;" placeholder="Address Line 2 " class="form-control" type="text" name="per_add_2"  id="per_add_2" minlength="3" maxlength="30">
	  					<input style="margin-top: 8px;" placeholder="Address Line 3" class="form-control" type="text" name="per_add_3"  id="per_add_3" minlength="3" maxlength="30">
	  				<?php } ?>
  				</div>  	

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">No Of Years At The Permanent Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input min="1" placeholder="Enter years *" class="form-control" type="number" maxlength="2" name="per_no_of_years" id="per_no_of_years" required oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_NO_YEARS_LIVING : $row_more->RES_ADDRS_NO_YEARS_LIVING ;?>">
  				</div>			  						  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="Enter landmark" required class="form-control" type="text" name="per_landmark" id="per_landmark" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_LANDMARK : $row_more->RES_ADDRS_LANDMARK ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="Enter pincode *" class="form-control" type="text" pattern="[0-9]{6}" minlength="6" name="per_pincode" title="Please enter valid pincode" id="per_pincode"  required oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_PINCODE : $row_more->RES_ADDRS_PINCODE ;?>">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select class="form-control" name="per_sel_property_type" required id="sel_per_property_type"> 
						<?php if($perAddPresent) { ?>
							  <option value="">Select Property Type *</option>
							  <option value="Self Owned" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Self Owned') echo ' selected="selected"'; ?>>Self Owned</option>
							  <option value="Parental/Ancestral" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Parental/Ancestral') echo ' selected="selected"'; ?>>Parental/Ancestral</option>
							  <option value="Rental personal Family" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Rental personal Family') echo ' selected="selected"'; ?>>Rental personal Family</option>
							  <option value="Shared Rental Accomodation" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Shared Rental Accomodation') echo ' selected="selected"'; ?>>Shared Rental Accomodation</option>
						<?php } else { ?>
							 <option value="">Select Property Type *</option>
								<option value="Self Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Self Owned') echo ' selected="selected"'; ?>>Self Owned</option>
								<option value="Parental/Ancestral" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Parental/Ancestral') echo ' selected="selected"'; ?>>Parental/Ancestral</option>
								<option value="Rental personal Family" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rental personal Family') echo ' selected="selected"'; ?>>Rental personal Family</option>
								<option value="Shared Rental Accomodation" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Shared Rental Accomodation') echo ' selected="selected"'; ?>>Shared Rental Accomodation</option>
						<?php }?>
							</select>
  				</div>  			  							  				
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input readonly placeholder="State *" class="form-control" id="per_state_view" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_STATE : $row_more->RES_ADDRS_STATE ;?>">

  					<input hidden="true" placeholder="State *" class="form-control" name="per_state" id="per_state" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_STATE : $row_more->RES_ADDRS_STATE ;?>">
  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="per_district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District *" class="form-control" id="per_district_view" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_DISTRICT : $row_more->RES_ADDRS_DISTRICT ;?>">

  					<input hidden="true" placeholder="District *" class="form-control" name="per_district" id="per_district" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_DISTRICT : $row_more->RES_ADDRS_DISTRICT ;?>">

  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">City *</span>
				</div>			
				<div class="w-100"></div>
   				<div id="per_city_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="City *" class="form-control" name="per_city" id="per_city" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_CITY : $row_more->RES_ADDRS_CITY ;?>" minlength="3" maxlength="30">
  				</div>  			  				
			</div>
			<div style="margin-top: 20px;" class="row col-12 justify-content-center">
					<div>
						<a id="continue">
						<button  type="submit" class="btn btn-primary"  >
							CONTINUE
						</button>
						</a>
						
					</div>		
				</div>
				<br><br>
   </div>	

	</div>
		
	</div>

</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
