

<?php ini_set('short_open_tag', 'On'); ?>
<form method="POST" action="<?php echo base_url(); ?>index.php/dsa/dsa_update_profile_one_new_action" id="dsa_update_profile_one_new_action">
	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				Update personal details
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
						<span class="align-middle dot-white"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></span>
					</div>			
				</div>	
			</div>
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div style="font-size: 10px; color: black; margin-right: 20px;">
						Personal Details
					</div>
					
					<div style="font-size: 10px; margin-right: 20px; color: black;">
						Documents
					</div>
				</div>	
			</div>
		</div>
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Please tell us a bit about yourself</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 45px; font-size: 12px; color: #bfbbbb;">Please fill your personal details. If required our Representative may get in touch to verify them.</span>

			</div>
			
			<div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Full name as per PAN card *</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text" id="f_name" name="f_name" minlength="3" maxlength="30" required value="<?php echo $row->FN;?>" oninput="validateText(this)">
	  					<input style="margin-top: 8px;" placeholder="Middle Name (Optional)" class="input-cust-name" type="text" name="m_name" id="m_name" value="<?php echo $row->MN;?>" minlength="3" maxlength="30" oninput="validateText(this)">
	  					<input style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="l_name" id="l_name" minlength="3" maxlength="30" required  value="<?php echo $row->LN;?>" oninput="validateText(this)">
						<input  hidden style="margin-top: 8px;"  type="text" name="id" id="id"   value="<?php echo $row->UNIQUE_CODE;?>" >
						
	  				</div>
	  				
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email-Id *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input required placeholder="Enter email-Id *" class="input-cust-name" type="email" name="email" value="<?php echo $row->EMAIL;?>" minlength="8" maxlength="75">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input required placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row->MOBILE;?>">
  				</div> 
 
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="w-100"></div>

				<div style="margin-top: 0px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Birth *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">

					<input  class="input-cust-name" type="text" name="dob" id="dob" value="<?php if(!empty($dob)){echo $dob;}?>" readonly>
				</div>
			  	<div class="w-100"></div>

				<div style="margin-top: 20px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-university"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Education *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<select required class="input-cust-name" name="education_type" > 
					<option value="">Select Education *</option>
					<option value="ENGINEER" <?php if ($row->EDUCATION_BACKGROUND == 'ENGINEER') echo ' selected="selected"'; ?>>ENGINEER</option>
					<option value="GRADUATE" <?php if ($row->EDUCATION_BACKGROUND == 'GRADUATE') echo ' selected="selected"'; ?>>GRADUATE</option>
					<option value="MATRIC" <?php if ($row->EDUCATION_BACKGROUND == 'MATRIC') echo ' selected="selected"'; ?>>MATRIC</option>
					<option value="POST GRADUATE" <?php if ($row->EDUCATION_BACKGROUND == 'POST GRADUATE') echo ' selected="selected"'; ?>>POST GRADUATE</option>
					<option value="UNDER GRADUATE" <?php if ($row->EDUCATION_BACKGROUND == 'UNDER GRADUATE') echo ' selected="selected"'; ?>>UNDER GRADUATE</option>
					<option value="PROFESSIONAL" <?php if ($row->EDUCATION_BACKGROUND == 'PROFESSIONAL') echo ' selected="selected"'; ?>>PROFESSIONAL</option>
					<option value="OTHERS" <?php if ($row->EDUCATION_BACKGROUND == 'OTHERS') echo ' selected="selected"'; ?>>OTHERS</option>
				</select>
				</div>		
  			</div>  			
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

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Aadhar Number *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input pattern="^\d{4}\s\d{4}\s\d{4}$"  placeholder="Aadhar *" class="input-cust-name" maxlength="14" title="Please enter valid 12 digit aadhar number" type="text" name="aadhar" id="aadhar_number" oninput="aadharValidate(this)" value="<?php if(isset($AADHAR_NUMBER)){echo preg_replace("/(?!^).(?!$)/", "*", $AADHAR_NUMBER); }?>">
  				</div>  			  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">PAN Number * (Five characters, Four digits and again One character) e.g: COKPG9558B</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"  placeholder="PAN number *" maxlength="10" class="input-cust-name" type="text" name="pan" title="Please enter valid PAN number"    value="<?php if(isset($PAN_NUMBER)){ echo  preg_replace("/(?!^).(?!$)/", "*", $PAN_NUMBER);} ?>" style="text-transform:uppercase">
  				</div>  			  				
			</div>
		</div>

		<!-- firm details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15"<?php if(!empty($row))	{if($row->ROLE==14 )  
		{  ?> style="display:none;"<?php }} ?>>
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Firm Details</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">We require your firm details</span>

			</div>
			<div class="w-100"></div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Firm Name</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="Firm Name *" class="input-cust-name" maxlength="100" title="Please enter firm name" type="text" name="firm_name" id="firm_name" oninput="maxLengthCheck(this)" value="<?php echo $row->dsa_firm_name;?>">
  				</div>  			  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Type of firm</span>
				</div>			
				<div class="w-100"></div>
  				
				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select class="input-cust-name resi_prop_type" name="firm_type" > 
					  <option value="">Select Firm Type</option>
					  <option value="Partnership" <?php if(!empty($row))if ($row->dsa_firm_type == 'Partnership') echo ' selected="selected"'; ?>>Partnership</option>
					  <option value="Propertieary" <?php if(!empty($row))if ($row->dsa_firm_type == 'Propertieary') echo ' selected="selected"'; ?>>Propertieary</option>
					  
					</select>
					</div>
			</div>
		</div>

		<!-- work details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Tell us where you live</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">This will help us to collect any documents if necessary.</span>

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
  					<input required style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row))echo $row->dsa_address_line_1;?>"  minlength="3" maxlength="30">
  					<input style="margin-top: 8px;" placeholder="Address Line 2 *" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row))echo $row->dsa_address_line_2;?>" minlength="3" maxlength="30">
  					<input style="margin-top: 8px;" placeholder="Address Line 3 *" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($row))echo $row->dsa_address_line_3;?>" minlength="3" maxlength="30">
  				</div>  

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of years at the current Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input min="1" required placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row))echo $row->YEARS_IN_CITY_LIVING;?>">
  				</div>			  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Enter landmark *" class="input-cust-name" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($row))echo $row->dsa_landmark;?>" minlength="3" maxlength="30">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Enter pincode *" class="input-cust-name" type="text" pattern="[0-9]{6}" minlength="6" title="Please enter valid pin code" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row))echo $row->dsa_pincode;?>">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select required class="input-cust-name resi_prop_type" name="resi_sel_property_type" > 
					  <option value="">Select Property Type *</option>
					  <option value="Corporate Provided" <?php if(!empty($row))if ($row->dsa_property_type == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
					  <option value="Mortgaged" <?php if(!empty($row))if ($row->dsa_property_type == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
					  <option value="Owned" <?php if(!empty($row))if ($row->dsa_property_type == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
					  <option value="Rented" <?php if(!empty($row))if ($row->dsa_property_type == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
					  <option value="Shared Accomodation" <?php if(!empty($row))if ($row->dsa_property_type == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
					  <option value="Paying Guest" <?php if(!empty($row))if ($row->dsa_property_type == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
					  <option value="Others" <?php if(!empty($row))if ($row->dsa_property_type == 'Others') echo ' selected="selected"'; ?>>Others</option>
					</select>

					<input style="margin-top: 8px; visibility: hidden;" placeholder="Enter other property type" class="input-cust-name" type="text" name="other_prop_type_1" id="other_prop_type_1" value="<?php if(!empty($row) && !empty($row->RES_ADDRS_OTHER_PROP_1))echo $row->RES_ADDRS_OTHER_PROP_1;?>"  minlength="3" maxlength="30">  		
  				</div>  
  				

			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" id="resi_state_view" placeholder="State" class="input-cust-name" value="<?php if(!empty($row))echo $row->STATE ;?>">
  					<input hidden="true" placeholder="State" class="input-cust-name" name="resi_state" id="resi_state" value="<?php if(!empty($row))echo $row->STATE ;?>">  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District" class="input-cust-name" id="resi_district_view" value="<?php if(!empty($row))echo $row->DISTRICT ;?>">
  					<input hidden="true" placeholder="District" class="input-cust-name" name="resi_district" id="resi_district" value="<?php if(!empty($row))echo $row->DISTRICT ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="City" class="input-cust-name" name="resi_city" id="resi_city" value="<?php if(!empty($row))echo $row->CITY ;?>" minlength="3" maxlength="30">
  				</div>  			  				
			</div>

			
		</div>		
        <?php if(!empty($row))	{if($row->ROLE==2 )  {  ?>
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Work Details</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">Tell us about your work</span>

			</div>
			<div class="w-100"></div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of years experience *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input min="1" required placeholder="Enter years of experience *" class="input-cust-name" type="number" maxlength="2" name="experience"  id="experience" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row))echo $row->EXPERIENCE;?>">
  				</div>

				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Does you work under any Corporate DSA ? </span>
				</div>			
				<div class="w-100"></div>
  				
				<div style="margin-left: 35px;margin-top: 8px;" class="col">
					<div class="row" style="color: black; font-size: 14px;">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"><input style="margin-right: 5px;" type="radio" name="work_under" value="Yes">Yes</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"><input  checked="true" style="margin-left: 10px; margin-right: 5px;" type="radio" name="work_under" value="No">No</div>
					
  					</div>
				</div>  	

				<div class="col" id="layout_corporate_dsa">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Corporate DSA *</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input style="margin-top: 8px;" placeholder="Name *" class="input-cust-name" type="text" id="corporate_dsa_name" name="corporate_dsa_name" minlength="3" maxlength="30" value="<?php if(!empty($row))echo $row->dsa_corporate_dsa_name;?>" oninput="maxLengthCheck(this)">
	  					<input style="margin-top: 8px;" placeholder="Contact Number *" class="input-cust-name" min="99" type="number" name="corporate_dsa_contact" id="corporate_dsa_contact" value="<?php if(!empty($row))echo $row->dsa_corporate_dsa_contact;?>" minlength="10" maxlength="10" oninput="maxLengthCheck(this)">
	  				</div>
	  				
				</div>	  
               
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Type of loans you works on *</span>
				</div>			
				<div class="w-100"></div>
  				
				<?php  
					$home_loan = false; $personal_loan = false; $lap = false; $business_loan = false; $msme = false; $education = false; $cc = false;
					if(!empty($row->dsa_works_loan_type)){
						
						$json = $row->dsa_works_loan_type;
						$jsonData = json_decode($json);
						//echo "mahesh ".$json;
						if($jsonData!=''){
							$data_array = $jsonData->loan_types;
							for ($i=0; $i < count($data_array); $i++) {
								//echo $data_array[$i]->value;
								if($data_array[$i]->value == 'Home Loan'){
									$home_loan = true;
								}else if($data_array[$i]->value == 'Personal Loan'){
									$personal_loan = true;
								}else if($data_array[$i]->value == 'Loan against Property'){
									$lap = true;
								}else if($data_array[$i]->value == 'Business Loan'){
									$business_loan = true;
								}else if($data_array[$i]->value == 'MSME Loan'){
									$msme = true;
								}else if($data_array[$i]->value == 'Education Loan'){
									$education = true;
								}else if($data_array[$i]->value == 'Credit Card'){
									$cc = true;
								}
							}
						}
					}

				?>  

  				<div style="margin-left: 65px; margin-top: 8px;" class="col">
				  	<div class="row" style="margin-bottom: 3px;">
					  	<input <?php if($home_loan)echo "checked";?> type="checkbox" id="home_loan" name="home_loan" value="Home Loan" style="margin-top:5px; margin-right:8px;">
						<label for="home_loan" style="color:black;"> Home Loan</label>
					</div>

					<div class="row" class="row" style="margin-bottom: 3px;">
					  	<input <?php if($personal_loan)echo "checked";?> type="checkbox" id="personal_loan" name="personal_loan" value="Personal Loan" style="margin-top:5px; margin-right:8px;">
						<label for="personal_loan" style="color:black;"> Personal Loan</label>
					</div>

					<div class="row" class="row" style="margin-bottom: 3px;">
					  	<input <?php if($lap)echo "checked";?> type="checkbox" id="lap" name="lap" value="Loan against Property" style="margin-top:5px; margin-right:8px;">
						<label for="lap" style="color:black;"> Loan against Property</label>
					</div>

					<div class="row" class="row" style="margin-bottom: 3px;">
					  	<input <?php if($business_loan)echo "checked";?> type="checkbox" id="business_loan" name="business_loan" value="Business Loan" style="margin-top:5px; margin-right:8px;">
						<label for="business_loan" style="color:black;"> Business Loan</label>
					</div>

					<div class="row" class="row" style="margin-bottom: 3px;">
					  	<input <?php if($msme)echo "checked";?> type="checkbox" id="msme_loan" name="msme_loan" value="MSME Loan" style="margin-top:5px; margin-right:8px;">
						<label for="msme_loan" style="color:black;"> MSME Loan</label>
					</div>

					<div class="row" class="row" style="margin-bottom: 3px;">
					  	<input <?php if($education)echo "checked";?> type="checkbox" id="education_loan" name="education_loan" value="Education Loan" style="margin-top:5px; margin-right:8px;">
						<label for="education_loan" style="color:black;"> Education Loan</label>
					</div>

					<div class="row" class="row" style="margin-bottom: 3px;">
					  	<input <?php if($cc)echo "checked";?> type="checkbox" id="cc" name="cc" value="Credit Card" style="margin-top:5px; margin-right:8px;">
						<label for="cc" style="color:black;"> Credit Card</label>
					</div>			
  				</div>  
  				

			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Number of cases processed every month *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  required name="cases_processed" id="cases_processed" placeholder="" type="number" min="1" class="input-cust-name" value="<?php if(!empty($row))echo $row->dsa_cases_processed_p_month ;?>">					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Average loan size (In lakhs) *</span>
				</div>			
				<div class="w-100"></div>
  				
				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  required name="avg_loan" id="avg_loan" placeholder="" type="number"  class="input-cust-name" value="<?php if(!empty($row))echo $row->dsa_avg_loan_size_anmt_in_lac ;?>">					
  				</div>  			  				

				<div class="w-100"></div>
  				
				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Do you charge fee from customers ?</span>
				</div>			
				
				<div style="margin-left: 35px;margin-top: 8px;" class="col">
					<div class="row" style="color: black; font-size: 14px;">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"><input style="margin-right: 5px;" type="radio" name="rdo_fees" value="Yes">Yes</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"><input checked="true" style="margin-left: 10px; margin-right: 5px;" type="radio" name="rdo_fees" value="No">No</div>
					
  					</div>
				</div>  	

				<div class="col" id="layout_fees_dsa">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Enter fees (In Rs) *</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input style="margin-top: 8px;" placeholder="Fees *" class="input-cust-name" min="99" type="number" name="fees" id="fees" value="<?php if(!empty($row))echo $row->dsa_fee_charge;?>" minlength="10" maxlength="10">
	  				</div>
	  				
				</div>	
              				
			</div>

			<div class="w-100"></div>  
		</div>
		<?php } } ?>

		
		<?php if(!empty($row)){if($row->ROLE==2 ){?>
		<div class="row shadow bg-white rounded margin-10 padding-15">
            <div class="w-100"></div>  
			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				         
							<?php if(!empty($dsa_banks))
							{ 
									 foreach($dsa_banks as $dsa_bank)
									 { if($dsa_bank->BANK_NAME==''){break;}
							?>
							 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">  
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Bank Details *</span>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">  
								<input  style="margin-top: 8px;" placeholder="" class="input-cust-name" type="text" name="bank[]" id="" value="<?php echo $dsa_bank->BANK_NAME; ?>" >
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
								<input style="margin-top: 8px;" placeholder="DSA Code" class="input-cust-name" type="text" name="dsa_code[]" id="" value="<?php echo $dsa_bank->DSA_CODE; ?>" >
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							&nbsp;
							</div>
							<?php } } ?>
							
							
				
						
					
			</div>
			<div class="w-100"></div>  
			<div  class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="add_banks_row">
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">  
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Bank Details *</span>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
								<select class="input-cust-name resi_prop_type" name="bank[]" placeholder="Select Bank Name" style="margin-top:8px;" > 
								  <option value="">Select Bank Name *</option>
								  <?php foreach($banks as $bank){ ?>
								  <option value="<?php echo $bank->BANK_NAME; ?>"><?php echo $bank->BANK_NAME; ?></option>
								  <?php }?>
								  
								</select>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
								<input style="margin-top: 8px;" placeholder="DSA Code" class="input-cust-name" type="text" name="dsa_code[]" id="" value="" >
								
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
								<div style="color: blue;" class="add-more" type="button" id="add_bank"> Add More</div>
								</div>
			</div>
		</div>
        <?php } } ?>		
		

					
		<?php if(!empty($row)){if($row->ROLE==2 || $row->ROLE==4 ){?>
        <div class="row shadow bg-white rounded margin-10 padding-15 justify-content-center"> 
					
					<div class="row justify-content-center col-12">
							<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us about Bank Detail's</span>
							<div class="w-100"></div>					
						</div>
				
			<?php 
	    if(!empty($row->dsa_BANK_DETAILS_JSON))
		{
			$json = $row->dsa_BANK_DETAILS_JSON;
			$jsonData = json_decode($json);
			if($jsonData!='')
			{
				$data_array = $jsonData->result;
				?>
				<table id="employee_table" style="text-align:center;" class="table table-bordered">	
				<thead>
				<th>Account Name</th>
				<th>Account Type</th>
				<th>Branch Name</th>
				<th>IFSC code</th>
				<th>Account Number</th>
				<th>Actions</th>
				</thead>
				<?php
				for ($i=0; $i < count($data_array); $i++)
				{
					?>
					
						
						<tr id="row1" style="width=20%">
							<td style="width=20%"><input type="text" name="Acc_name[]" placeholder="Bank Acc Name" class="input-cust-name" value="<?php echo $data_array[$i]->Acc_name;?>"></td>
							<td style="width=20%"><select required class='input-cust-name'  id="acc_type" name="Acc_type[]">
									<option>Account Type</option>
									<option  value="Current" <?php if ($data_array[$i]->Acc_type == 'Current') echo ' selected="selected"'; ?>>Current</option>
									<option  value="Saving" <?php if ($data_array[$i]->Acc_type == 'Saving') echo ' selected="selected"'; ?>>Saving</option>
								</select>	
							</td>
							<td style="width=20%"><input type="text" name="Branch_name[]" placeholder="Enter Branch name" class="input-cust-name" value="<?php echo $data_array[$i]->Branch_name;?>" ></td>
							<td style="width=20%"><input type="text" name="IFSC_code[]" placeholder="IFSC code" class="input-cust-name" value="<?php echo $data_array[$i]->IFSC_code;?>"></td>
							<td style="width=20%"><input type="text" name="Acc_number[]" placeholder="Account Number" class="input-cust-name" value="<?php echo $data_array[$i]->Acc_number;?>"></td>
							<td style="width=20%"><input type="button" onclick="add_row();" value="ADD ROW" style="color: blue;" class="add-more" ></td>
						   </tr>
						
						  <br>
					  
			  <?php
				}
				?>
				  </table>
				<?php
			}
  
		}
		else
		{
		?>	
		
		<table id="employee_table" style="text-align:center;" class="table table-bordered">
		<thead>
				<th>Account Name</th>
				<th>Account Type</th>
				<th>Branch Name</th>
				<th>IFSC code</th>
				<th>Account Number</th>
				<th>Actions</th>
				</thead>
			<tr id="row1">
				<td style="width=20%"><input type="text" name="Acc_name[]" placeholder="Bank Acc Name" class="input-cust-name" ></td>
				<td style="width=20%">
					<select required class='input-cust-name'  id="acc_type" name="Acc_type[]">
						<option>Account Type</option>
						<option  value="Current">Current</option>
						<option  value="Saving">Saving</option>
					</select>	
				</td>
				<td style="width=20%"><input type="text" name="Branch_name[]" placeholder="Enter Branch name" class="input-cust-name" ></td>
				<td style="width=20%"><input type="text" name="IFSC_code[]" placeholder="IFSC code" class="input-cust-name" ></td>
				<td style="width=20%"><input type="text" name="Acc_number[]" placeholder="Account Number" class="input-cust-name" ></td>
				<td style="width=20%"><input type="button" onclick="add_row();" value="ADD ROW" style="color: blue;" class="add-more" ></td>
  			</tr>
  	</table>
	<?php
		}
		?>
		
				
		  </div>	
        <?php } } ?>	

        <div class="row shadow bg-white rounded margin-10 padding-15">		
			<div style="margin-top: 20px;" class="row col-12 justify-content-center">
					<div >
						<a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							CONTINUE
						</button></a>
					</div>		
				</div>
		</div>

	</div>
</form>
<script type="text/javascript">
function add_row()
{
 $rowno=$("#employee_table tr").length;
 $rowno=$rowno+1;
 $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='Acc_name[]' placeholder='Bank Acc Name' class='input-cust-name'></td><td><select class='input-cust-name' name='Acc_type[]'><option  value=''>Account Type</option><option  value='Current'>Current</option><option  value='Saving'>Saving</option></select></td><td><input type='text' name='Branch_name[]' placeholder='Enter Branch name' class='input-cust-name'></td><td><input type='text' name='IFSC_code[]' placeholder='IFSC code' class='input-cust-name'></td><td><input type='text' name='Acc_number[]' placeholder='Account Number' class='input-cust-name'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"') style='color: red;' class='add-more'></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
<script>
	 $(document).ready(function () {
		 $("#dob").change(function(){
  //alert("The text has been changed.");
  var birthdate = $('#dob').val();
 // alert(birthdate);
  
  
  
  const date1 = new Date(birthdate);
  
  const date2 = new Date();
  
  var year1 = date1.getFullYear();
  
  var year2 = date2.getFullYear();



var totalyears = year2-year1; 

if(totalyears < 20)
{
	alert('Please enter valid date');
	
	document.getElementById("dob").value = "";
	
}
  
});
		 
                
                $('#dob').datepicker({
					autoclose: true,
					endDate: new Date(new Date().setDate(new Date().getDate())),
					constrainInput: true,
					format: 'yyyy-mm-dd'  
				
                });  
            
            });
	
</script>
<script>
	 $(document).ready(function () {
                
                $('#dob').datepicker({
					autoclose: true,
					endDate: new Date(new Date().setDate(new Date().getDate())),
					constrainInput: true,
					format: 'yyyy-mm-dd'  
				
                });  
            
            });
	$("#add_bank").click(function(e){
            e.preventDefault ? e.preventDefault() : (e.returnValue = false);         
            var clone = '<div class="w-100"></div>  '+
			            '<div  class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="add_bank_row">'+
							'<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">'+ 
								'<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Bank Details *</span>'+
							'</div>'+
							'<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">'+
								'<select required class="input-cust-name resi_prop_type" name="bank[]" placeholder="Select Bank Name" style="margin-top:8px;" >'+
								  '<option value="">Select Bank Name *</option>'+
								  <?php foreach($banks as $bank){ ?>
								  '<option value="<?php echo $bank->BANK_NAME; ?>"><?php echo $bank->BANK_NAME; ?></option>'+
								  <?php }?>
								  
								'</select>'+
							'</div>'+
							'<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">'+
							'<input style="margin-top: 8px;" placeholder="DSA Code" class="input-cust-name" type="text" name="dsa_code[]" id="" value="" >'+
								
							'</div>'+
							'<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">'+
								'<input class="banks_remove_row_remove other-income-select" type="button" value="DELETE" style="margin-left:4px; color: red;" >'+
							'</div>'+
			            '</div>';
						
						
            $("#add_banks_row").append(clone);
			//alert("hi");
        }); 
		 $('#add_banks_row').on('click', '.banks_remove_row_remove', function() {
         $(this).closest("#add_bank_row").remove();
         //alert("hi");
        });	
</script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 

