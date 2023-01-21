<style> 
.btn_1 {
    font-size: 14px;
    border-radius: 2px;
    line-height: 12px;
    /* letter-spacing: 1px; */
    text-transform: uppercase;
     padding: 10px 2px; */
    font-weight: 600;
}</style>
<?php ini_set('short_open_tag', 'On');

//echo "TEST NAME";

//exit;

 ?>
 <?php
 
 //print_r($row);
 
 
if($row->ROLE == 27 || $row->ROLE == 29)
	
	{
 ?>
<form method="POST" action="<?php echo base_url(); ?>index.php/dsa/dsa_update_profile_one_new_action" id="retailer_update_profile_one_new_action" enctype="multipart/form-data">
	<?php } else { ?>
	
	<form method="POST" action="<?php echo base_url(); ?>index.php/dsa/dsa_update_profile_one_new_action" id="dsa_update_profile_one_new_action" enctype="multipart/form-data">

	<?php } ?>
	
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
			<?php 
			if(!empty($row))	
			{
				
				if($row->ROLE==29)
				{
					?>
					<div class="w-100"></div>
					<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Firm Name *</span>
							<div style="margin-left: 35px; margin-top: 0px;" class="col">
								<input style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text" id="f_name" name="f_name" minlength="3" maxlength="30" required value="<?php echo $row->FN;?>" oninput="validateText(this)">
								
								<input  hidden style="margin-top: 8px;"  type="text" name="id" id="id"   value="<?php echo $row->UNIQUE_CODE;?>" >
							
									<input  hidden style="margin-top: 8px;"  type="text" name="ROLE" id="ROLE"   value="<?php if(!empty($row))	{ echo $row->ROLE; } ?>" >
							</div>
							<div class="w-100"></div>

							<div style="margin-top: 0px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Alternative Emails</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col inc">

								<input  placeholder="Enter email-Id *" class="input-cust-name" type="email" name="alternativeemail" value="<?php echo $row->alternate_email_1; ?>" minlength="8" maxlength="275">
				              
								<button type="button" class=" btn-primary btn_1" style="margin-top:10px;" id="append">Add Alternet Emails</button>
							</div>
								

				<?php
				}
				else
				{
				  ?>
			
					<div class="w-100"></div>
					<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Full name as per PAN card *</span>
							<div style="margin-left: 35px; margin-top: 0px;" class="col">
								<input style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text" id="f_name" name="f_name" minlength="3" maxlength="30" required value="<?php echo $row->FN;?>" oninput="validateText(this)">
								<input style="margin-top: 8px;" placeholder="Middle Name (Optional)" class="input-cust-name" type="text" name="m_name" id="m_name" value="<?php echo $row->MN;?>" minlength="3" maxlength="30" oninput="validateText(this)">
								<input style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="l_name" id="l_name" minlength="3" maxlength="30" required  value="<?php echo $row->LN;?>" oninput="validateText(this)">
								<input  hidden style="margin-top: 8px;"  type="text" name="id" id="id"   value="<?php echo $row->UNIQUE_CODE;?>" >
							
									<input  hidden style="margin-top: 8px;"  type="text" name="ROLE" id="ROLE"   value="<?php if(!empty($row))	{ echo $row->ROLE; } ?>" >
							</div>
			        <?php
			     } 
				}
				?>

	<?php 
		if(!empty($row))	
			{
				
				if($row->ROLE !=2 && $row->ROLE !=4 && $row->ROLE !=18 && $row->ROLE !=19 && $row->ROLE !=24 && $row->ROLE !=25 && $row->ROLE !=27 && $row->ROLE !=29 )  
					{   ?>
	  					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Employee ID *</span>
					</div>			
					<div class="w-100"></div>
  					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  						<input required placeholder="Enter Employee ID" class="input-cust-name" type="text" name="Employee_ID" value="<?php echo $row->Employee_ID;?>">
  					</div> 
	  			<?php }} ?>
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
<?php 
		if(!empty($row))	
			{
				if($row->ROLE !=2 && $row->ROLE !=4 && $row->ROLE !=18 && $row->ROLE !=19 && $row->ROLE !=24 && $row->ROLE !=25 && $row->ROLE !=27 && $row->ROLE !=29 )  
					{  ?>
  				   <div style="margin-top: 2px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Branch Name *</span>
					</div>			
					<div class="w-100"></div>
  					
					  <?php if(!empty($row))
					  { ?>
                           <div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<select required class="input-cust-name" name="Employee_Branch"  > 
							<option value=""> select Branch</option>
							<?php foreach($Branches as $Branch){ ?>
									<option value="<?php echo $Branch->Branch_Location; ?>" <?php if($row->Employee_Branch==$Branch->Branch_Location){ echo "selected"; }?> ><?php echo $Branch->Branch_Location; ?></option>
									<?php }?>
							</select>
							
						</div>
					  <?php }
					  else { ?>
					  <div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<select required class="input-cust-name" name="Employee_Branch" > 
							<option value=""> select Branch</option>
						<?php foreach($Branches as $Branch){ ?>
								  <option value="<?php echo $Branch->Branch_Location; ?>"><?php echo $Branch->Branch_Location; ?></option>
								  <?php }?>
						</select>
						
					</div>
					<?php } ?>
 	<?php }} ?>
  			</div>	
  				
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="w-100"></div>
				<?php 
                if(!empty($row))	
					{
						
						if($row->ROLE==29)
						{
				             ?>
								<div style="margin-top: 0px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Incorporation *</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">

									<input required class="input-cust-name" type="date" name="dob" id="dob" value="<?php if(!empty($row->DOB)){echo $row->DOB;}?>" >
								</div>
						        <?php 
						}
						else{
							?>
							    <div style="margin-top: 0px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Birth *</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">

									<input required class="input-cust-name" type="date" name="dob" id="dob" value="<?php if(!empty($row->DOB)){echo $row->DOB;}?>" >
								</div>
						        <?php 
							
						    }
					} 

					?>	
				
				<!-- alertnative email starts here -->
				
				<?php if($row->ROLE == 29) { ?>
					<div style="margin-top: 0px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Alternative Mob </span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col inc_1">

							<input  placeholder="Enter Mob " class="input-cust-name" type="text" name="alternativemob"  >
				              
								<button type="button" class=" btn-primary btn_1" style="margin-top:10px;" id="append_mob">Add Alternet Mob</button>
							</div>
				
				<?php } ?>
				<!-- alternative email ends here  --->
			  	<div class="w-100"></div>
				  <?php 
				if(!empty($row))	
						{
						    if($row->ROLE !=2 && $row->ROLE !=4 && $row->ROLE !=18 && $row->ROLE !=19 && $row->ROLE !=24 && $row->ROLE !=25 && $row->ROLE !=29 && $row->ROLE !=27 )  
							{  ?>
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
									
								
			                   <?php 
							}
						}
							?>	 
							</div> 			
		</div>

		<!-- identity details ------------------------------- -->
        <?php if(!empty($row))	{if($row->ROLE==2 || $row->ROLE==4)  {  ?>
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
        <?php }} ?>
		<!-- firm details ------------------------------- -->
		<?php if(!empty($row))	
		{
			if($row->ROLE==18 || $row->ROLE==19 || $row->ROLE==24 || $row->ROLE==15 )
			{?>
			<div class="row shadow bg-white rounded margin-10 padding-15">
				
            </div>
				<?php 
			}
	   }
	   ?>
		<?php if(!empty($row))	{if($row->ROLE==2 || $row->ROLE==4 ){?>
		<div class="row shadow bg-white rounded margin-10 padding-15">
			
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
				
						<div style="margin-top: 0px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Contact Person *</span>
						</div>			
						<div class="w-100"></div>
						
						<div style="margin-left: 35px; margin-top: 8px;" class="col">
							<input   placeholder="Contact person" maxlength="10" class="input-cust-name" type="text" name="Contact_person" title="Please enter name"    value="<?php if(!empty($row)){echo $row->dsa_corporate_dsa_name; } ?>" style="text-transform:uppercase">
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
				
						<div style="margin-top: 0px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Contact Person Mob *</span>
						</div>			
						<div class="w-100"></div>
						
						<div style="margin-left: 35px; margin-top: 8px;" class="col">
							<input   placeholder="Contact person Mob" maxlength="10" class="input-cust-name" type="text" name="Contact_person_Mob" title="Please enter Mobile Number"    value="<?php if(!empty($row)){echo $row->dsa_corporate_dsa_contact; } ?>" style="text-transform:uppercase">
						</div>
					
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Office Address *</span>
					</div>			
					<div class="w-100"></div>
					
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<input required style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row))echo $row->dsa_address_line_1;?>"  minlength="3" maxlength="30">
						<input style="margin-top: 8px;" placeholder="Address Line 2 *" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row))echo $row->dsa_address_line_2;?>" minlength="3" maxlength="30">
						<input style="margin-top: 8px;" placeholder="Address Line 3 *" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($row))echo $row->dsa_address_line_3;?>" minlength="3" maxlength="30">
					</div> 
					
					 
				
			</div>

<?php } } ?>
			<?php if(!empty($row))	{if($row->ROLE==18 || $row->ROLE==19 || $row->ROLE==24 || $row->ROLE==25){?>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">PAN Number if available</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"  placeholder="PAN number " maxlength="10" class="input-cust-name" type="text" name="pan" title="Please enter valid PAN number"    value="<?php if(isset($row->PAN_NUMBER)){ echo $row->PAN_NUMBER;} ?>" style="text-transform:uppercase">
  				</div>  
			    </div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">GST Number if available</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input   placeholder="GST number" maxlength="10" class="input-cust-name" type="text" name="GST" title="Please enter valid  number"    value="<?php if(!empty($row)){echo $row->dsa_GST; } ?>" style="text-transform:uppercase">
  				</div>  
			    </div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Area of operations</span>
				</div>			
				<div class="w-100"></div>
				<?php if(isset($row)) { $Loactions=explode(",",$row->Location); } ?>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  				<select required class="input-cust-name" name="Location[]"  multiple  style="height: auto"> 
							  <option value="">Select Option *</option>
							  <?php foreach($city_branches as $Branch) {  echo $Branch->city;  ?>
							   		
									<option value="<?php echo $Branch->city; ?>" <?php if(isset($row)){ foreach($Loactions as $Location){ $A=$Branch->city;  if($Location==$A){ echo "selected";}  }} ?> ><?php echo $Branch->city; ?></option>
							   <?php } ?>
					   </select>
  				</div>  
			    </div>
				
			<?php } } ?>
		</div>

		<!-- work details ------------------------------- -->
        <?php if(!empty($row))	{if($row->ROLE==2 || $row->ROLE==4)  {  ?>
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
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of yearst Address *</span>
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
		<?php }} ?>	
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
<!-- identity details ------------------------------- -->
<?php if(!empty($row))	{if($row->ROLE==27 )  {  ?>

                                                
		                                        <div class="row shadow bg-white rounded margin-10 padding-15">
													<div class="row justify-content-center col-12">
														<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Business Proof verification</span>
													</div>
													<div class="row justify-content-center col-12">
															<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">We require your GST </span>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="div7">
														       <div style="margin-top: 10px;" class="col">
																	<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">GST Number Available ? </span>
																</div>			
																<div class="w-100"></div>
																
																<div style="margin-left: 35px;margin-top: 8px;" class="col">
																	<div class="row" style="color: black; font-size: 14px;">
																		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"><input style="margin-right: 5px;" type="radio" name="gst_available" value="Yes" id="gst_yes">Yes</div>
																		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"><input  checked="true" style="margin-left: 10px; margin-right: 5px;" type="radio" name="gst_available" value="No" id="gst_no">No</div>
																	
																	</div>
																</div> 
                                                    </div>
												
	
			                                        <div class="w-100"></div>
                                              
			                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="div1" style="display:none">
														<div style="margin-top: 0px;" class="col">
															<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">GST NUMBER *</span>
														</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																<input pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$"  placeholder="GST number" class="input-cust-name" maxlength="15"  type="text" name="GST_number" id="GST_number" title="Please enter valid GST number" maxlength="10" <?php if(!empty($row)){ if( $row->verify_retailer_dis_gst=='true'){echo 'readonly ';} }?> value="<?php if(isset($row) )echo $row->dsa_GST;?>" >
  				   												<input type="text" id="verify_GST_status" name="verify_GST_status" value="<?php if(!empty($row)){echo $row->verify_retailer_dis_gst;} ?>"  hidden >
															</div>  			  				
                                                    </div>
													
													
													
													<?php if(!empty($row)){ if( $row->verify_retailer_dis_gst=='true'){ ?> 
															<div class="col-xl-4 -lg-4 col-md-col4 col-sm-12 col-12" id="div6" style="display:none">
																<div style="margin-top:0px;" class="col">
																	<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																</div>			
																<div class="w-100"></div>
																	<a class="btn btn-success disabled" id="verify_GST" style="color:white;">GST Verified <i class="fas fa-check"></i></a>
															</div>
															<?php }	else {	?>
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="div2" style="display:none">
																<div style="margin-top: 0px;" class="col">
																	<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																</div>			
																<div class="w-100"></div>
																	<a class="btn btn-success " id="verify_GST" style="color:white;">Verify GST </a>
															</div>
															<?php } }else{?>
				   											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
																<div style="margin-top:0px;" class="col">
																	<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																</div>			
																<div class="w-100"></div>
																<a class="btn btn-success " id="verify_GST" style="color:white;">Verify GST </a>
															</div>
			  												<?php  }?>
													<div class="w-100"></div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="div4" style="display:none">
														<div style="margin-top: 0px;" class="col">
														
															<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Registered Business address *</span></div>
															<div >				  
															
															<label class="" >&nbsp;</label>				  
                                                             </div>
															<div class="w-100"></div>
															<div style="margin-left: 35px; margin-top: 8px;" class="col">
																<textarea  type="text"   class="input-cust-name"    name="Buisness_add" id="Buisness_add" style="height:100px"   ><?php if(isset($row)){ echo $row->dsa_address_line_1; } ?></textarea>
																
                                                        </div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="div5" >
														<div style="margin-top: 0px;" class="col">
															<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Current Business address *</span></div>
															<div style="margin-left: 30px; display:none;" class="custom-control custom-switch" id="chechshow">				  
															<input type="checkbox" class="custom-control-input" id="customSwitches" name="resiperchk">
															<label class="custom-control-label" for="customSwitches">Current Business Address Same As Registered  Address ?</label>				  
															</div>	
															<div class="w-100"></div>
															<div style="margin-left: 35px; margin-top: 8px;" class="col">
																<textarea  type="text"   class="input-cust-name"    name="Buisness_add_current" id="Buisness_add_current" style="height:100px"   ><?php if(isset($row)){ echo $row->dsa_address_line_2; } ?></textarea>
																
                                                        </div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="div3">
														<div style="margin-top: 0px;" class="col">
															<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Registered Firm name *</span></div>	
															<div >				  
															
															<label class="" >&nbsp;</label>				  
                                                             </div>
															<div class="w-100"></div>
															<div style="margin-left: 35px; margin-top: 8px;" class="col">
																<input  type="text"   class="input-cust-name"    name="Buisness_name" id="Buisness_name"   style="text-transform:uppercase" value="<?php if(isset($row)){ echo $row->dsa_firm_name; } ?>" required>
																
                                                        </div>
													</div>
													
                                              
															
																<div style="margin-top: 20px;" class="row col-12 justify-content-center">
																	<span style="color:red" id="GST_error"></span>
																	<span style="color:red" id="kyc_error"></span>
																</div>
															
																
												</div>
														 
											
															
				                                    
														
				                                       
	<?php  } }?>
	<?php if(!empty($row))	{if($row->ROLE==29 )  {  ?>

                                                
<div class="row shadow bg-white rounded margin-10 padding-15">
	<div class="row justify-content-center col-12">
		<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Business Proof verification</span>
	</div>
	<div class="row justify-content-center col-12">
			<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">We require your GST </span>
	</div>
	<div class="w-100"></div>

	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >
		<div style="margin-top: 0px;" class="col">
			<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">GST NUMBER *</span>
		</div>	
			<div class="w-100"></div>
				<div style="margin-left: 35px; margin-top: 8px;" class="col">
				 <input pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$"  placeholder="GST number" class="input-cust-name" maxlength="15"  type="text" name="GST_number" id="GST_number" title="Please enter valid GST number" maxlength="10" <?php if(!empty($row)){ if( $row->verify_retailer_dis_gst=='true'){echo 'readonly ';} }?> value="<?php if(isset($row) )echo $row->dsa_GST;?>" >
					 <input required type="text" id="verify_GST_status" name="verify_GST_status" value="<?php if(!empty($row)){echo $row->verify_retailer_dis_gst;} ?>"  hidden >
			</div>  			  				
	</div>
	
	<?php if(!empty($row)){ if( $row->verify_retailer_dis_gst=='true'){ ?> 
			<div class="col-xl-4 -lg-4 col-md-col4 col-sm-12 col-12">
				<div style="margin-top:0px;" class="col">
					<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
				</div>			
				<div class="w-100"></div>
					<a class="btn btn-success disabled" id="verify_GST" style="color:white;">GST Verified <i class="fas fa-check"></i></a>
			</div>
			<?php }	else {	?>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
				</div>			
				<div class="w-100"></div>
					<a class="btn btn-success " id="verify_GST" style="color:white;">Verify GST </a>
			</div>
			<?php } }else{?>
			   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top:0px;" class="col">
					<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
				</div>			
				<div class="w-100"></div>
				<a class="btn btn-success " id="verify_GST" style="color:white;">Verify GST </a>
			</div>
			  <?php  }?>
	<div class="w-100"></div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >
		<div style="margin-top: 0px;" class="col">
		
			<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Registered Business address *</span></div>
			<div >				  
			
			<label class="" >&nbsp;</label>				  
			 </div>
			<div class="w-100"></div>
			<div style="margin-left: 35px; margin-top: 8px;" class="col">
				<textarea  type="text" required  class="input-cust-name"    name="Buisness_add" id="Buisness_add" style="height:100px"   readonly><?php if(isset($row)){ echo $row->dsa_address_line_1; } ?></textarea>
				
		</div>
	</div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >
		<div style="margin-top: 0px;" class="col">
			<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Current Business address *</span></div>
			<div style="margin-left: 30px;" class="custom-control custom-switch" id="chechshow">				  
			<input type="checkbox" class="custom-control-input" id="customSwitches" name="resiperchk">
			<label class="custom-control-label" for="customSwitches">Current Business Address Same As Registered  Address ?</label>				  
			</div>	
			<div class="w-100"></div>
			<div style="margin-left: 35px; margin-top: 8px;" class="col">
				<textarea  type="text" required  class="input-cust-name"    name="Buisness_add_current" id="Buisness_add_current" style="height:100px"   ><?php if(isset($row)){ echo $row->dsa_address_line_2; } ?></textarea>
				
		</div>
	</div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >
		<div style="margin-top: 0px;" class="col">
			<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Registered Business name *</span></div>	
			<div >				  
			
			<label class="" >&nbsp;</label>				  
			 </div>
			<div class="w-100"></div>
			<div style="margin-left: 35px; margin-top: 8px;" class="col">
				<input  type="text"   class="input-cust-name"     name="Buisness_name" id="Buisness_name"   style="text-transform:uppercase" value="<?php if(isset($row)){ echo $row->dsa_firm_name; } ?>" readonly required>
				
		</div>
		<div style="margin-top: 0px;" class="col">
			<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Constitution Of Business*</span></div>	
			<div >				  
			
			<label class="" >&nbsp;</label>				  
			 </div>
			<div class="w-100"></div>
			<div style="margin-left: 35px; margin-top: 8px;" class="col">
				<input  type="text"   class="input-cust-name"     name="Buisness_name" id="Buisness_con"   style="text-transform:uppercase" value="<?php if(isset($row)){ echo $row->dsa_firm_name; } ?>" readonly required>
				
		</div>
	</div>
	

			
				<div style="margin-top: 20px;" class="row col-12 justify-content-center">
					<span style="color:red" id="GST_error"></span>
					<span style="color:red" id="kyc_error"></span>
				</div>
			
				
</div>
		 

			
	
		
	   
<?php  } }?>


	<?php if(!empty($row))	{if($row->ROLE==27 || $row->ROLE==29 )  {  ?>
		                                            <div class="row shadow bg-white rounded margin-10 padding-15">
														<div class="row justify-content-center col-12">
															<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Identity Details</span>
														</div>
														<div class="row justify-content-center col-12">
																<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">We require your GST and PAN</span>
														</div>
			                                            <div class="w-100"></div>
			                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">PAN NUMBER * </span></div>	
                												<div class="w-100"></div>
  													  			<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																			<input pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" required placeholder="PAN number *" class="input-cust-name" maxlength="10"  type="text" name="pan" id="pan" title="Please enter valid PAN number" maxlength="10" <?php if(!empty($row)){ if( $row->verify_retailer_dis_pan=='true'){echo 'readonly ';} }?> value="<?php echo $row->PAN_NUMBER; ?><?php /*if(isset($row->PAN_NUMBER)){ echo  preg_replace("/(?!^).(?!$)/", "*", $row->PAN_NUMBER);} */?>"  >
  				   													    <input type="text" id="verify_pan_status" name="verify_pan_status" value="<?php if(!empty($row)){echo $row->verify_retailer_dis_pan;} ?>"  hidden >
																</div>
<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																			<input required placeholder="Name on PAN *" class="input-cust-name"   type="text" name="nameonpan" id="nameonpan" title="" <?php if(!empty($row)){ if( $row->verify_retailer_dis_pan=='true'){echo 'readonly ';} }?> value="<?php echo $row->nameonpan; ?><?php /*if(isset($row->PAN_NUMBER)){ echo  preg_replace("/(?!^).(?!$)/", "*", $row->PAN_NUMBER);} */?>"  >
  				   													    </div>  																	
															</div>
															<?php if(!empty($row)){ if( $row->verify_retailer_dis_pan=='true'){ ?> 
															<div class="col-xl-4 -lg-4 col-md-col4 col-sm-12 col-12" >
																<div style="margin-top:0px;" class="col">
																	<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																</div>			
																<div class="w-100"></div>
																	<a class="btn btn-success disabled" id="verify_pan" style="color:white;">PAN Verified <i class="fas fa-check"></i></a>
															</div>
															<?php }	else {	?>
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
																<div style="margin-top: 0px;" class="col">
																	<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																</div>			
																<div class="w-100"></div>
																	<a class="btn btn-success " id="verify_pan" style="color:white;">Verify PAN </a>
															</div>
															<?php } }else{?>
				   											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
																<div style="margin-top:0px;" class="col">
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
																<?php if($row->ROLE==27  )  {  ?>
																<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Partnership Business/Proprietary firm  </span> &nbsp; &nbsp &nbsp;<input type="radio" name="isfirm" id="isfirm" value="Yes" > Yes  &nbsp; &nbsp &nbsp;<input type="radio" name="isfirm" id="isfirm" checked value="No">No </div>
																<?php } ?>
														 </div>
														 
														 
													
													</div>
															
				                                    
														
				                                       
	<?php  } }?>
    <?php if(!empty($row))	{if($row->ROLE==27 || $row->ROLE==29 )  { $dsa_BANK_DETAILS=json_decode($row->dsa_BANK_DETAILS_JSON, true);?>
		                                            <div class="row shadow bg-white rounded margin-10 padding-15">
														<div class="row justify-content-center col-12">
															<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Bank Details</span>
														</div>
														<div class="row justify-content-center col-12">
																<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">We require your Bank Details</span>
														</div>
			                                            <div class="w-100"></div>
														<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
																	<div style="margin-top: 0px;" class="col">
																		<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">IFSC Code</span>	
																		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																			<input required placeholder="IFSC Code*" class="input-cust-name" type="text"  name="ifsc_code"  maxlength="11" min="0" id="IFSC_Code" oninput="maxLengthCheck(this)" onkeydown="upperCaseF(this)" pattern="^[A-Z]{4}0[A-Z0-9]{6}$"  value="<?php if(!empty($dsa_BANK_DETAILS)){ echo $dsa_BANK_DETAILS['ifsc_code'];}?>">
																		</div>  			  				
																	</div>
																</div>
																<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
																	<div style="margin-top: 0px;" class="col">
																		<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Bank Name</span>	
																		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																			<input  readonly required placeholder="Bank Name*" class="input-cust-name" type="text"  id="Bank_name" name="Bank_name"  value="<?php if(!empty($dsa_BANK_DETAILS)){ echo $dsa_BANK_DETAILS['bank_name'];}?>" >
																		</div>  
																	</div>
																</div>
																<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
																	<div style="margin-top: 0px;" class="col">
																		<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Bank branch</span>
																		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																			<input  readonly required placeholder="Bank branch*" class="input-cust-name" type="text"  id="Bank_branch" name="Bank_branch"  value="<?php if(!empty($dsa_BANK_DETAILS)){ echo $dsa_BANK_DETAILS['bank_branch'];}?>" >
																		</div>  			  				
																	</div>
																</div>
																<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
																	<div style="margin-top: 0px;" class="col">
																		<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number</span>
																		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																			<input required placeholder="Account Number*" class="input-cust-name" type="number"  name="acc_no"  maxlength="16" min="0" oninput="maxLengthCheck(this)" value="<?php if(!empty($dsa_BANK_DETAILS)){ echo $dsa_BANK_DETAILS['acc_no'];}?>">
																		</div>  	
																	</div>
																</div>
														 
															
															
																<div style="margin-top: 20px;" class="row col-12 justify-content-center">
																	<span style="color:red" id="pan_error"></span>
																	<span style="color:red" id="kyc_error"></span>
																</div>
																
														 </div>
													
													</div>
													
													
													
													<!--<div class="row shadow bg-white rounded margin-10 padding-15">
														<div class="row justify-content-center col-12">
															<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Remarks</span>
														</div>
														<div class="row justify-content-center col-12">
																<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">Remarks of SCF Manager, Distributors and Retailers</span>
														</div>
			                                            <div class="w-100"></div>
														<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Retailer</span></div>	
                												<div class="w-100"></div>
  													  			<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																		
																		<input  placeholder="Retailer remark" class="input-cust-name" type="text"  name="Retailerremark"  id="Retailerremark" value="<?php if(!empty($row->distributorremark)){echo $row->retailerremark;} ?>">
																		  
  				   													    
																</div>  			  				
														</div>
			                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Distributor</span></div>	
                												<div class="w-100"></div>
  													  			<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																		
																		<input  placeholder="Distributor remark" class="input-cust-name" type="text"  name="Remark_Distributor" id="Remark_Distributor" value="<?php if(!empty($row->distributorremark)){echo $row->distributorremark;} ?>">
																		  
  				   													    
																</div>  			  				
															</div>
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">SCF Manager</span></div>	
                												<div class="w-100"></div>
  													  			<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																		
																		<input  placeholder="SCF manager remark" class="input-cust-name" type="text"  name="Remark_Scf"   id="Remark_Scf"  value="<?php if(!empty($row->scfremark)){echo $row->scfremark;} ?>">
																		  
																		
																</div>  			  				
															</div>
															
																<div style="margin-top: 20px;" class="row col-12 justify-content-center">
																	<span style="color:red" id="pan_error"></span>
																	<span style="color:red" id="kyc_error"></span>
																</div>
																
														 </div>
													
													</div>-->
															
				                                    
														
				                                       
	<?php  } }?>
	<?php if(!empty($row))	{if($row->ROLE==29 || $row->ROLE==27 )  {  ?>

                                                
															<!--<div class="row shadow bg-white rounded margin-10 padding-15">
																<div class="row justify-content-center col-12">
																	<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Business Proof verification</span>
																</div>
																<div class="row justify-content-center col-12">
																		<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">We require your GST </span>
																</div>
																<div class="w-100"></div>
																<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
																<div style="margin-top: 0px;" class="col">
																<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">KYC Doc</span></div>	
																			  				
																</div>
																
																
																<div class="w-100"></div>
																<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="docs" style="margin-top:10px;">
																<?php $i=1;  foreach($get_uploded_doc as $row1){  ?>
												
												
												
																		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
																			<div class="row " style="border: 1px solid #edeff1; margin-left:13px; margin-right:13px">
																				<div class="col-sm-10"><a target="_blank">  <i class="fa fa-file-text" style="color:green" aria-hidden="true"></i> &nbsp; <label for="email" style="font-size: 13px; color: black; font-weight: bold;">
																				<?php echo $row1->DOC_TYPE; ?>
																								</label></a></div>
																				<div class="col-sm-1"><a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $row1->ID; ?>" target="_blank"> <i class="fa fa-file-pdf-o" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>
																				</div>
																				<div class="col-sm-1"> 	
																				<a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/retailers/delete_doc/<?php echo $row1->ID; ?>"><i class="fa fa-trash text-right" style="color:red;"></i></a>
																									
																				</div>
																				
																						
																											
																										
																									
																			</div>
																		
																		</div>
		
												
																<?php $i++; } ?>
																</div>
																
															</div>-->
												<?php } }?>
		
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
		<?php if(!empty($row)){if($row->ROLE==27 ){?>
			<div class="row shadow bg-white rounded margin-10 padding-15">		
			<div style="margin-top: 20px;margin-right: 20px;" class="row col-12 justify-content-center">
			
					<div style="margin-right: 40px;" >
						<a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried">
						<button class="login100-form-btn disabled" style="background-color: #25a6c6;" id="continue2">
							SAVE & CONTINUE
						</button></a> </div> <div>
						<!--<a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried">
						<button class="login100-form-btn disabled" style="background-color: #25a6c6;" id="continue2">
							CONTINUE
						</button></a> -->
					</div>		
				</div>
		
		</div>
			<?php } else if($row->ROLE==29){?>
			<div class="row shadow bg-white rounded margin-10 padding-15">		
			<div style="margin-top: 20px;margin-right: 20px;" class="row col-12 justify-content-center">
			
					<div style="margin-right: 40px;">
					<a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried">
						<button class="login100-form-btn disabled" style="background-color: #25a6c6;" id="continue3">
							SAVE & CONTINUE
						</button></a></div> <div>
						<!--<a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried">
						<button class="login100-form-btn disabled" style="background-color: #25a6c6;" id="continue3">
							CONTINUE
						</button></a>
						-->
					</div>		
				</div>
		
		</div>
			<?php } else{?>
        <div class="row shadow bg-white rounded margin-10 padding-15">		
			<div style="margin-top: 20px;margin-right: 20px;" class="row col-12 justify-content-center">
					<div style="margin-right: 40px;">
					<a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							SAVE & CONTINUE 
						</button></a></div> <div>
						<!--<a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							CONTINUE
						</button></a>-->
					</div>		
				</div>
		</div>

	</div>
	<?php } } ?>
</form>
<script type="text/javascript">


function checkdate()
{
	alert('test');
	
}
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
	$('#continue2').on('click',function(e)
                        {
							// var verify_kyc_status=$('#verify_kyc_status').val();
							  var verify_pan_status=$('#verify_pan_status').val();
							 
						
							
							
							    
						    if(verify_pan_status=='true')
							{
								
								    $('#continue2').removeClass('disabled');
									
								
							}
							
							else if( $(this).hasClass('disabled') )
							{
								e.preventDefault();
								swal("Warning!", "Please Verify PAN  Document", "warning");
								
							}
							
						    
							
						}
					 );
					 $('#continue3').on('click',function(e)
                        {
							// var verify_kyc_status=$('#verify_kyc_status').val();
							  var verify_pan_status=$('#verify_pan_status').val();
							  var verify_GST_status=$('#verify_GST_status').val();
							  
							 
						
							
							
							    
						    if(verify_pan_status=='true' && verify_GST_status=='true')
							{
								
								    $('#continue3').removeClass('disabled');
									
								
							}
							
							else if( $(this).hasClass('disabled') )
							{
								e.preventDefault();
								swal("Warning!", "Please Verify PAN AND GST  Document", "warning");
								
							}
							
						    
							
						}
					 );
	$( "#verify_pan" ).click(function() {
      
	    
	  var f_name = $.trim($('#f_name').val());
	  var m_name = $.trim($('#m_name').val());
	  var l_name = $.trim($('#l_name').val());
	  var pan_no = $.trim($('#pan').val());
	  var isfirm='';
	  var isfirm='';
	  	  <?php if($row->ROLE == 27) { ?>
		  var isfirm = document.getElementById('isfirm').value;
	  var isfirm = $("input[name='isfirm']:checked").val();
		  <?php } ?>
	  //alert(isfirm);
	  <?php if($row->ROLE == 29) { ?>
	  var pantype="businessPan";
	  <?php } else { ?>
	  if(isfirm == 'Yes')
	  {
		  var pantype="businessPan";
	  }
	  else {
	  var pantype="individualPan";
	  }
	  
	  <?php } ?>
	  if(f_name=='')
	  {
		  $('#pan_error').html("Please Fill Full name as per PAN card. ");
		  //exit;
		  return false;
	  }
	  if(pan_no=='')
	  {
		  $('#pan_error').html("Please Fill PAN Number. ");
	  //	exit;
	  return false;
	  }
	  
	  <?php //if($row->ROLE == 29) { ?>
	  //alert(pantype);
	  
	  if(pantype == 'businessPan')
	  {
	  let letter = pan_no.charAt(3);
	  
	  //alert(letter);
	  
	  if(letter == 'C' || letter == 'F')
	  {
		  
		  
		  
	  }
	  else{
		  swal({
								  title: "Error!",
								  text: "Distributor should have business PAN",
								  type: "failure"
							  });
							  
							  document.getElementById('pan').value = "";
							  
		return false;
		  
	  }
	  }
	  <?php //} ?>
	  if(m_name=='')
	  {
		  var full_name=f_name+' '+l_name;
	  
	  }
	  else
	  {
		  var full_name=f_name+' '+m_name+' '+l_name;
	  }
   
	//alert(full_name);
	  
	   $.ajax({
			  type:'POST',
			   url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
			  //url:'<?php echo base_url("index.php/Api_Functions/Test_PAN_verification"); ?>',
			  data:{'full_name':full_name,'pan_no':pan_no,'type':pantype},
			  success:function(data){
				  
				  var obj =JSON.parse(data);
				  
				 if(obj.msg=='sucess')
				 {
				   // var pan_name=obj.name;
				   //	 swal("success!", "PAN verified Sucessfully!", "success");
					// swal("TEST MODE!", "PAN verified Sucessfully!", "success");
				   // $('#verify_pan_status').val('true');
				   //  $('#verify_pan').addClass('disabled');

				   var pan_name=obj.name;
					  var father_name=obj.fatherName;
					   
					// alert(pan_name);
					 
					 //return false; 

					  // swal("Error!", "Your name on Pan is "+obj.name+". Please update name as per your Pan card", "warning");
					   var words = obj.name.split(' ');          var length = words.length;
					   var words_2 = obj.fatherName.split(' ');  var length_2 = words_2.length;
					   var isfirm = document.getElementById('isfirm').value();
					   
					  // alert(isfirm);
					  // alert(type);
							if(pantype == "individualPan") 
							{	
								$("#nameonpan").val(obj.name);
						swal({
								  title: "success!",
								  text: "Your name on Pan is "+obj.name+" and Your Father name on Pan is "+obj.fatherName,
								  type: "success"
							  }).then((willDelete) => {
												if (willDelete) {
													/* if(length==3)
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
													if(length_2==3)
													{
													 $("#s_f_name").val(words_2[0]);
													 $("#s_m_name").val(words_2[1]);
													 $("#s_l_name").val(words_2[2]);
													}
													 if(length_2==2)
													{
													 $("#s_f_name").val(words_2[0]);
													  $("#s_m_name").val();
													 $("#s_l_name").val(words_2[1]);
													
													}
													
													*/
												  
												   
												   
												}
							  });
							}
							else{
								
								swal({
								  title: "success!",
								  text: "Your firm name on Pan is "+obj.name+"",
								  type: "success"
							  });
							  
							  $("#nameonpan").val(obj.name);
							  
							  document.getElementById('l_name').value = '';
							  
							  document.getElementById('m_name').value = '';
							 
							 													// $("#f_name").val("");
													 //$("#m_name").val(" ");
													 //$("#l_name").val(" ");
							  
							}
					  
					   $('#verify_pan').addClass('disabled');
					   $('#verify_pan_status').val('true');
					   
					   $('#pan').attr('readonly',true);
					
				   
					 
				 }
				 else if(obj.msg=='fail')
				 {
					  var pan_name=obj.name;
					  var father_name=obj.fatherName;
					   
					 

					  // swal("Error!", "Your name on Pan is "+obj.name+". Please update name as per your Pan card", "warning");
					   var words = obj.name.split(' ');          var length = words.length;
					   var words_2 = obj.fatherName.split(' ');  var length_2 = words_2.length;
							  
						if(pantype == "individualPan") 
							{
								$("#nameonpan").val(obj.name);
								
						swal({
								  title: "success!",
								  text: "Your name on Pan is "+obj.name+" and Your Father name3 on Pan is "+obj.fatherName,
								  type: "success"
							  }).then((willDelete) => {
												if (willDelete) {
													if(type == '')
													if(length==3)
													{
													// $("#f_name").val(words[0]);
													// $("#m_name").val(words[1]);
													// $("#l_name").val(words[2]);
													}
													 if(length==2)
													{
													// $("#f_name").val(words[0]);
													//  $("#l_name").val();
													// $("#l_name").val(words[1]);
													
													}
													if(length_2==3)
													{
													// $("#s_f_name").val(words_2[0]);
													// $("#s_m_name").val(words_2[1]);
													// $("#s_l_name").val(words_2[2]);
													}
													 if(length_2==2)
													{
													// $("#s_f_name").val(words_2[0]);
													//  $("#s_m_name").val();
													// $("#s_l_name").val(words_2[1]);
													
													}
												  
												   
												   
												}
							}); }
							else{
								
								swal({
								  title: "success!",
								  text: "Your firm name on Pan is "+obj.name+"",
								  type: "success"
							  });
							  
							  $("#nameonpan").val(obj.name);
							  
							  //document.getElementById('l_name').value = ' ';
							  
							  //document.getElementById('m_name').value = ' ';
							  
							  
							}
					  
					   $('#verify_pan').addClass('disabled');
					   $('#verify_pan_status').val('true');
					   $('#pan').prop('readonly', true);
					  
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
  $("#IFSC_Code").bind("keyup", function() 
            {
  
                if($(this).val()!=''){
                if($(this).val().length == 11){
                    var IFSC_Code = $(this).val();
                    url = window.location.protocol+"//"+window.location.host + "/finserv_test/dsa/dsa/index.php/dsa/get_bank_details";            
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: '{ "IFSC": "'+IFSC_Code+'"}',
                        contentType: "application/json; charset=UTF-8",
                        success: function (response) {
                            var data = JSON.parse(response);
                            if (data=="Not Found")
                            {
                                Swal.fire("Warning!", "Please Enter Valid IFSC Code  ", "warning");

                                exit;

                            }
                            else{
                            $('#Bank_name').val(data.BANK);  
                            $('#Bank_branch').val(data.BRANCH);
                            }
                            
                        }
                    });
                }
                }
            });
  
  $( "#verify_GST" ).click(function() {
      
	    
	  
	
	  var pan_no = $.trim($('#GST_number').val());
	  
	  var type="gstinSearch";
	 
	  if(pan_no=='')
	  {
		  $('#GST_error').html("Please Fill GST Number. ");
	  //	exit;
	  return false;
	  }
	 
   
	  
	   $.ajax({
			  type:'POST',
			   url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
			  //url:'<?php echo base_url("index.php/Api_Functions/Test_PAN_verification"); ?>',
			  data:{'pan_no':pan_no,'type':type,'GST_retailer':'retailer'},
			  success:function(data){
				  
				  var obj =JSON.parse(data);
				  
				 if(obj.msg=='sucess')
				 {
				  
							  
						swal({
								  title: "success!",
								  text: "GST Number verified sucessfully",
								  type: "success"
							  });
							  
							  response = JSON.parse(obj.response);
							  
							  result = response.result.gstnDetailed.tradeNameOfBusiness;
							  
							 //alert(result);
							 
							 //return true;
					  if(result != '')
					  {
						  $('#GST_number').attr('readonly', true);
						  
					  }
					   $('#verify_GST').addClass('disabled');
					   $('#verify_GST_status').val('true');
					   //$('#Buisness_name').val(obj.legalNameOfBusiness);
					   $('#Buisness_name').val(result);
					   $('#Buisness_add').val(obj.principalPlaceAddress);
					   $('#Buisness_con').val(obj.constitutionOfBusiness);
					  
					
					
				   
					 
				 }
				 else if(obj.msg=='fail')
				 {
					  var pan_name=obj.name;
					  var father_name=obj.fatherName;
					   
					 

					  // swal("Error!", "Your name on Pan is "+obj.name+". Please update name as per your Pan card", "warning");
					   var words = obj.name.split(' ');          var length = words.length;
					   var words_2 = obj.fatherName.split(' ');  var length_2 = words_2.length;
							  
						swal({
								  title: "success!",
								  text: "Your name on Pan is "+obj.name+" and Your Father name on Pan is "+obj.fatherName,
								  type: "success"
							  }).then((willDelete) => {
												if (willDelete) {
													if(length==3)
													{
													 //$("#f_name").val(words[0]);
													 //$("#m_name").val(words[1]);
													 //$("#l_name").val(words[2]);
													}
													 if(length==2)
													{
													// $("#f_name").val(words[0]);
													//  $("#l_name").val();
													// $("#l_name").val(words[1]);
													
													}
													if(length_2==3)
													{
													// $("#s_f_name").val(words_2[0]);
													// $("#s_m_name").val(words_2[1]);
													// $("#s_l_name").val(words_2[2]);
													}
													 if(length_2==2)
													{
													// $("#s_f_name").val(words_2[0]);
													//  $("#s_m_name").val();
													// $("#s_l_name").val(words_2[1]);
													
													}
												  
												   
												   
												}
							  });
					  
					   $('#verify_pan').addClass('disabled');
					   $('#pan').attr('readonly', true);
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
	 $(document).ready(function () {
                
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
/*
							$("#dob").blur(function(){
    if($("#dob").val() == '')
	{
		
		alert("Please enter DOB");
		
	}
	var dob = $("#dob").val();
	
	var dobarr = dob.split("-");
	
	var dobyear = dobarr[0];
	
	const d = new Date();
let currentyear = d.getFullYear();
	
	var correctyear = currentyear-18;
	
	if(dobyear > correctyear)
	{
	
	alert("Please enter correct year");
	
	const myElement = document.getElementById("dob").value = '';
	
	}
	
	
	
	
  });
  
  */
            
            });
			
			$("#gst_yes").click(function(){
				//$('#gst_available_yes').show();
				//$("#gst_available_yes").attr("style", "display:block");
				$("#div1").attr("style", "display:block");
				$("#div2").attr("style", "display:block");
				$("#div3").attr("style", "display:block");
				$("#div4").attr("style", "display:block");
				$("#div5").attr("style", "display:block");
				$("#chechshow").attr("style", "display:block");
				$("#div8").attr("style", "display:none");
				
			
			});
			$("#gst_no").click(function(){
				//$('#gst_available_yes').show();
				//$("#gst_available_yes").attr("style", "display:block");
				$("#div1").attr("style", "display:none");
				$("#div2").attr("style", "display:none");
				$("#div3").attr("style", "display:none");
				$("#div4").attr("style", "display:none");
				$("#div8").attr("style", "display:block");
				$("#chechshow").attr("style", "display:none");
			
			});
			$('#customSwitches').on('change', function() { 
              if (this.checked) 
			  {
				  var add=$('#Buisness_add').val();
				  if(add==''|| add==' ')
				  {
					swal({
								  title: "warning",
								  text: "Registered adddress not present",
								  type: "warning"
							  })
							  $('#customSwitches').prop('checked', false);
				  }
				  $('#Buisness_add_current').val(add);
			  }
			  else{

				   $('#Buisness_add_current').val('');
			  }
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
		$( document ).ready(function() 
			{
				var gst_verify = $('#verify_GST_status').val();
				if(gst_verify=='true')
				{
					$("#div1").attr("style", "display:block");
					$("#div2").attr("style", "display:block");
					$("#div3").attr("style", "display:block");
					$("#div4").attr("style", "display:block");
					$("#div6").attr("style", "display:block");
					$("#div7").attr("style", "display:none");
					$("#chechshow").attr("style", "display:block");
				}
			});
			$("#append").click( function(e) 
			{
				e.preventDefault();
					$(".inc").append('<div class="controls" style="margin-top:10px;">\
							<input  placeholder="Enter email-Id *" class="input-cust-name" type="email" name="alternativeemail"  minlength="8" maxlength="275">\
							<button type="button" class="  remove_this btn-danger btn_1" style="margin-top:10px;" >remove</button>\
							<br>\
							<br>\
						</div>');
					return false;
			});
			jQuery(document).on('click', '.remove_this', function() 
			 {
				jQuery(this).parent().remove();
				return false;
				});
			$("#append_mob").click( function(e) 
			{
          e.preventDefault();
			$(".inc_1").append('<div class="controls" style="margin-top:10px;">\
			        <input  placeholder="Enter Mob *" class="input-cust-name" type="text" name="alternativemob"  >\
					<button type="button" class="  remove_this btn-danger btn_1" style="margin-top:10px;" >remove</button>\
					<br>\
					<br>\
				</div>');
			return false;
			});
</script>
<script type="text/javascript">
          var url='<?php echo base_url("index.php/dsa/upload_retailer_doc"); ?>';
		  $("#myInput").change(function(e){
            //alert("A file has been selected.");
			var kyc_document_name=$('#kyc_document_name').val()
			let formData = new FormData();
            formData.append("userfile",myInput.files[0]);
			formData.append("DOC_TYPE",kyc_document_name);
			formData.append("DOC_MASTER_TYPE",'KYC');
			
			$.ajax({
                     type: "POST",
                     url: url,
                     data: formData,
                     processData: false,
                     contentType: false,
                     success: function (response) {
						var parsed_data = JSON.parse(response);
                        if(parsed_data.result == 3){
                              swal(
                                "success!",
                                "Document uploaded Successfully",
                                "success"
                                  );
								  $('#docs').html(' ');	
									$.each(parsed_data.docs ,function (index, value)
								  {
									
									var content='<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">'+
														'<div class="row " style="border: 1px solid #edeff1; margin-left:13px; margin-right:13px">'+
															'<div class="col-sm-10"><a href="" target="_blank">  <i class="fa fa-file-text" style="color:green" aria-hidden="true"></i> &nbsp; <label for="email" style="font-size: 13px; color: black; font-weight: bold;">'+ value.DOC_TYPE +'</label></a></div>'+
																'<div class="col-sm-1"><a href="'+ window.location.origin+'/finaleap_finserv/dsa/dsa/index.php/customer/view_cloud_file/'+value.ID+'"target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></div>'+
																'<div class="col-sm-1">'+	
															       '<a style="margin-left: 8px; " href="'+window.location.origin+'/finaleap_finserv/dsa/dsa/index.php/retailers/delete_doc/'+value.ID+'"><i class="fa fa-trash text-right" style="color:red;"></i></a>'+
															'</div>'+			
														'</div></div></div>';
																	
																						
														$('#docs').append(content);								
																				
																		
								  }
								
								);

					 }
			}
        });
	});
	$("#myInput1").change(function(e){
            //alert("A file has been selected.");
			var buiss_document_name=$('#buiss_document_name').val()
			let formData = new FormData();
            formData.append("userfile",myInput1.files[0]);
			formData.append("DOC_TYPE",buiss_document_name);
			formData.append("DOC_MASTER_TYPE",'EMPLOYMENT PROOF');
			
			$.ajax({
                     type: "POST",
                     url: url,
                     data: formData,
                     processData: false,
                     contentType: false,
                     success: function (response) {
						var parsed_data = JSON.parse(response);
                        if(parsed_data.result == 3){
                              swal(
                                "success!",
                                "Document uploaded Successfully",
                                "success"
                                  );
								  $('#docs').html(' ');	
									$.each(parsed_data.docs ,function (index, value)
								  {
									
									var content='<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">'+
														'<div class="row " style="border: 1px solid #edeff1; margin-left:13px; margin-right:13px">'+
															'<div class="col-sm-10"><a href="" target="_blank">  <i class="fa fa-file-text" style="color:green" aria-hidden="true"></i> &nbsp; <label for="email" style="font-size: 13px; color: black; font-weight: bold;">'+ value.DOC_TYPE +'</label></a></div>'+
																'<div class="col-sm-1"><a href="'+ window.location.origin+'/finaleap_finserv/dsa/dsa/index.php/customer/view_cloud_file/'+value.ID+'"target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></div>'+
																'<div class="col-sm-1">'+	
															       '<a style="margin-left: 8px; " href="'+window.location.origin+'/finaleap_finserv/dsa/dsa/index.php/retailers/delete_doc/'+value.ID+'"><i class="fa fa-trash text-right" style="color:red;"></i></a>'+
															'</div>'+			
														'</div></div></div>';
																	
																						
														$('#docs').append(content);								
																				
																		
								  }
								
								);

					 }
			}
        });
	});
	$("#IFSC_Code").bind("keyup", function() {
  
	if($(this).val()!=''){
	if($(this).val().length == 11){
		var IFSC_Code = $(this).val();
		url = window.location.protocol+"//"+window.location.host + "/finserv_test/dsa/dsa/index.php/dsa/get_bank_details";            
		$.ajax({
			type: "POST",
			url: url,
			data: '{ "IFSC": "'+IFSC_Code+'"}',
			contentType: "application/json; charset=UTF-8",
			success: function (response) {
				var data = JSON.parse(response);
				if (data=="Not Found")
				{
					Swal.fire("Warning!", "Please Enter Valid IFSC Code  ", "warning");

					exit;

				}
				else{
				$('#Bank_name').val(data.BANK);  
				$('#Bank_branch').val(data.BRANCH);
				}
				
			}
		});
	}
	}
	});
</script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 

