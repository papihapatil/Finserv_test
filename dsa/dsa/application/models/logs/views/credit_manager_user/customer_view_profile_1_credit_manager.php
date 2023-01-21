
<?php ini_set('short_open_tag', 'On'); ?>

	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
			<?php if(!empty($row)){if ($row->customer_consent=='true'){?>
					<div class="row" style="margin-left: 10px;">
						Edit

						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div>
								<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2?ID=<?php echo $row->UNIQUE_CODE;?>"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
							</div>	
						</div>				
					</div>
			<?php } }?>
									
			</div>
</span>	
<?php
//echo base64_decode($row_more->KYC).'<br>';
//echo base64_decode($row->PAN_NUMBER).'<br>';
//exit;
?>
					
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div>
						<span class="shadow align-middle dot"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></span>				
					</div>
					
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
					<div>
						<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/credit_manager_user/profile_view_p_t?ID=<?php echo $id;?>"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></a></span>
					</div>	
			
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
					<div>
						<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/credit_manager_user/profile_view_p_thre?ID=<?php echo $id;?>"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></a></span>
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
					
					<div style="font-size: 10px; color: black; margin-right: 30px;">
						Income Details
					</div>					

					<div style="font-size: 10px; margin-right: 20px; color: black;">
						Documents
					</div>
				</div>	
			</div>
		</div>
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">About - <?php echo $row->FN;?></span>

			</div>
			
			<div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Full name as per PAN card *</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text" disabled id="f_name" name="f_name" minlength="5" maxlength="30" required value="<?php echo $row->FN;?>">
	  					<input disabled style="margin-top: 8px;" placeholder="Middel Name (Optional)" class="input-cust-name" type="text" name="m_name"  value="<?php echo $row->MN;?>">
	  					<input disabled style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="l_name" minlength="5" maxlength="30" required  value="<?php echo $row->LN;?>">
	  				</div>
	  				<div class="w-100"></div>

	  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Birth *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input disabled required max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="dob"  value="<?php echo base64_decode($row->DOB);?>">
	  				</div>
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email-Id *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="Enter emial-Id *" class="input-cust-name" type="email" name="email" value="<?php echo $row->EMAIL;?>">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row->MOBILE;?>">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Education *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<select disabled class="input-cust-name" name="education_type" > 
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
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-venus-mars"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Gender *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;">
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input disabled checked="true" type="radio" name="gender" value="male"> Male
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="gender" value="female" <?php if ($row->GENDER == 'female') echo ' checked="true"'; ?>> Female
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
  								<input disabled type="radio" name="marital" value="married" checked="true"> Married
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled <?php if ($row->MARTIAL_STATUS == 'single') echo ' checked="true"'; ?> type="radio" name="marital" value="single"> Single
	  						</div>
  						</div>						
  					</div>  					
  				</div>				
  			</div>  			
		</div>


		<!-- family ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 15px;">Family Details</span>

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
  								<input disabled type="radio" name="spouse" value="spouse" checked="true"> Spouse
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled <?php if(!empty($row_more))if ($row_more->IS_SPOUSE_FATHER == 'father') echo ' checked="true"'; ?> type="radio" name="spouse" value="father"> Father
	  						</div>
  						</div>						
  					</div>  					
  				</div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled placeholder="First Name *" class="input-cust-name" type="text" name="s_f_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_F_NAME;?>">
  				</div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled placeholder="Middel Name (Optional)" class="input-cust-name" type="text" name="s_m_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_M_NAME;?>">
  				</div>
  				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled placeholder="Last Name *" class="input-cust-name" type="text" name="s_l_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_L_NAME;?>">
  				</div>
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col" style="margin-top: 0px;">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-female"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Mother's Name *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled placeholder="First Name *" class="input-cust-name" type="text" name="m_f_name" value="<?php if(!empty($row_more))echo $row_more->MOTHER_F_NAME;?>">
  				</div>
  				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled placeholder="Middel Name (Optional)" class="input-cust-name" type="text" name="m_m_name" value="<?php if(!empty($row_more))echo $row_more->MOTHER_M_NAME;?>">
  				</div>
  				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled placeholder="Last Name *" class="input-cust-name" type="text" name="m_l_name" value="<?php if(!empty($row_more))echo $row_more->MOTHER_L_NAME;?>">
  				</div>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col" style="margin-top: 0px;">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-female"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Total No of Brothers and Sisters *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled placeholder="Enter count *" class="input-cust-name" maxlength="2" type="number" name="no_of_bro_sis" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->TOTAL_BRO_SIS;?>">
  				</div>
			</div>
		</div>

		<!-- identity details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Identity Details</span>

			</div>
			<div class="row justify-content-center col-12">
				
			</div>
			<div class="w-100"></div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">KYC Doc *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled  class="input-cust-name"  id="aadhar_number" oninput="maxLengthCheck(this)" value="<?php if(!empty($row_more)){echo $row_more->KYC_doc;}?>">
  				</div>  			  				
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">KYC Doc Number *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled  name="aadhar" id="aadhar_number" oninput="maxLengthCheck(this)" value="<?php if(!empty($row_more)){ $pan_no=base64_decode($row_more->KYC); $length=strlen($pan_no); $pan=$pan_no;for($i=0; $i<=$length;$i+=2){$pan = substr_replace($pan, 'X', $i,1);} echo $pan; }?>">
  				</div>  			  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">PAN Number *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" disabled placeholder="PAN number *" class="input-cust-name" type="text" name="pan"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row)){ $pan_no=base64_decode($row->PAN_NUMBER); $length=strlen($pan_no); $pan=$pan_no;for($i=0; $i<=$length;$i+=2){$pan = substr_replace($pan, 'X', $i,1);} echo $pan; }?>">
  				</div>  			  				
			</div>
		</div>

		<!-- address details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;  margin-bottom: 15px;">Address Details</span>

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
  					<input disabled style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_1;?>">
  					<input disabled style="margin-top: 8px;" placeholder="Address Line 2 *" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_2;?>">
  					<input disabled style="margin-top: 8px;" placeholder="Address Line 3 *" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_3;?>">
  				</div>  

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of years at the current Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_NO_YEARS_LIVING;?>">
  				</div>			  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled placeholder="Enter landmark *" class="input-cust-name" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LANDMARK;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled placeholder="Enter pincode *" class="input-cust-name" type="number" minlength="6" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_PINCODE;?>">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select disabled class="input-cust-name resi_prop_type" name="resi_sel_property_type" > 
					  <option value="">Select Property Type *</option>
					  <option value="Corporate Provided" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
					  <option value="Mortgaged" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
					  <option value="Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
					  <option value="Rented" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
					  <option value="Shared Accomodation" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
					  <option value="Paying Guest" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
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
  					<input disabled placeholder="State" class="input-cust-name" name="resi_state" id="resi_state" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_STATE ;?>">  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District" class="input-cust-name" id="resi_district_view" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_DISTRICT ;?>">
  					<input disabled placeholder="District" class="input-cust-name" name="resi_district" id="resi_district" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_DISTRICT ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled placeholder="City" class="input-cust-name" name="resi_city" id="resi_city" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_CITY ;?>">
  				</div>  			  				
			</div>


			<!-- permanent add -->
			<div class="w-100"></div>

			<div class="row col-12" style="padding-top: 10px; margin: 10px; color: black; font-size: 14px;">
				<span>Permanent Address *</span>
				<div style="margin-left: 20px;" class="custom-control custom-switch">				  
				  <input disabled type="checkbox" class="custom-control-input" id="customSwitches" name="resiperchk">
				  <label class="custom-control-label" for="customSwitches">Is your permanent address same as Residence address ?</label>				  
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
	  					<input style="margin-top: 1px;" disabled placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1"  id="per_add_1" value="<?php echo $perAddPresent? $row_more->PER_ADDRS_LINE_1 : $row_more->RES_ADDRS_LINE_1 ;?>">
	  					<input style="margin-top: 8px;" disabled placeholder="Address Line 2 *" class="input-cust-name" type="text" name="per_add_2"  id="per_add_2" value="<?php echo $perAddPresent? $row_more->PER_ADDRS_LINE_2 : $row_more->RES_ADDRS_LINE_2 ;?>">
	  					<input style="margin-top: 8px;" disabled placeholder="Address Line 3 *" class="input-cust-name" type="text" name="per_add_3"  id="per_add_3" value="<?php echo $perAddPresent? $row_more->PER_ADDRS_LINE_3 : $row_more->RES_ADDRS_LINE_3 ;?>">
	  				<?php } else { ?>
	  						<input style="margin-top: 1px;" disabled placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1"  id="per_add_1" >
	  					<input style="margin-top: 8px;" disabled placeholder="Address Line 2 *" class="input-cust-name" type="text" name="per_add_2"  id="per_add_2" >
	  					<input style="margin-top: 8px;" disabled placeholder="Address Line 3 *" class="input-cust-name" type="text" name="per_add_3"  id="per_add_3" >
	  				<?php } ?>
  				</div>  	

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of years at the permanent Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="per_no_of_years" id="per_no_of_years" disabled oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_NO_YEARS_LIVING : $row_more->RES_ADDRS_NO_YEARS_LIVING ;?>">
  				</div>			  						  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="Enter landmark" disabled class="input-cust-name" type="text" name="per_landmark" id="per_landmark" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_LANDMARK : $row_more->RES_ADDRS_LANDMARK ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="Enter pincode *" class="input-cust-name" type="number" minlength="6" name="per_pincode" id="per_pincode"  disabled oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_PINCODE : $row_more->RES_ADDRS_PINCODE ;?>">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select class="input-cust-name" name="per_sel_property_type" disabled id="sel_per_property_type"> 
						<?php if($perAddPresent) { ?>
							  <option value="">Select Property Type *</option>
							  <option value="Corporate Provided" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
							  <option value="Mortgaged" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
							  <option value="Owned" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
							  <option value="Rented" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
							  <option value="Shared Accomodation" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
					          <option value="Paying Guest" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
							
						<?php } else { ?>
							 <option value="">Select Property Type *</option>
							  <option value="Corporate Provided" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
							  <option value="Mortgaged" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
							  <option value="Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
							  <option value="Rented" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
							  <option value="Shared Accomodation" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
					  		  <option value="Paying Guest" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
						<?php }?>
							</select>
  				</div>  			  							  				
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">State</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="State *" class="input-cust-name" id="per_state_view" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_STATE : $row_more->RES_ADDRS_STATE ;?>">

  					<input disabled placeholder="State *" class="input-cust-name" name="per_state" id="per_state" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_STATE : $row_more->RES_ADDRS_STATE ;?>">
  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="per_district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="City *" class="input-cust-name" id="per_district_view" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_DISTRICT : $row_more->RES_ADDRS_DISTRICT ;?>">

  					<input disabled placeholder="City *" class="input-cust-name" name="per_district" id="per_district" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_DISTRICT : $row_more->RES_ADDRS_DISTRICT ;?>">

  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="per_city_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled placeholder="City *" class="input-cust-name" name="per_city" id="per_city" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_CITY : $row_more->RES_ADDRS_CITY ;?>">
  				</div>  			  				
			</div>
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
  					<input pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" required placeholder="PAN number *" class="input-cust-name" type="text" name="pan" id="pan" title="Please enter valid PAN number" maxlength="10" <?php if(!empty($row_more)){ if( $row_more->VERIFY_PAN=='true'){echo 'readonly ';} }?> value="<?php  if(!empty($row)){ echo $row->PAN_NUMBER;}?>"  style="text-transform:uppercase">
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
						<a  id="continue" href="<?php echo base_url()?>index.php/credit_manager_user/customer_edit_profile_2_income?type=salaried">
						<button class="login100-form-btn " style="background-color: #25a6c6;" id="continue1"  >
							CONTINUE
						</button>
						</a>
						
					</div>		
				</div>
			<?php } else {?>
			             <div style="margin-top: 20px;" class="row col-12 justify-content-center">
							<div>
								<a  id="continue" href="<?php echo base_url()?>index.php/credit_manager_user/customer_edit_profile_2_income?type=salaried">
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
						<a  id="continue" href="<?php echo base_url()?>index.php/credit_manager_user/customer_edit_profile_2_income?type=salaried">
						<button class="login100-form-btn disabled" style="background-color: #25a6c6;" id="continue1"  title="please verifiy PAN" >
							CONTINUE
						</button>
						</a>
						
					</div>		
				</div>

				   <?php } ?>
			



			

		</div>
		</div>

			<div class="w-100"></div>  

			<div style="margin-top: 20px;" class="row col-12 justify-content-center">
				<div >
					<a href="<?php echo base_url()?>index.php/credit_manager_user/profile_view_p_t?ID=<?php echo $id;?>">
					<button class="login100-form-btn" style="background-color: #25a6c6;">
						NEXT
					</button></a>
				</div>		
			</div>
		</div>		
	</div>