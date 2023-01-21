<style>

@media only screen and (max-width: 1024px) {
	.icon{
		padding-left: 10px;
  		  margin-top: 0px;
	}
}
	
@media only screen and (max-width: 1024px) {
	.detail{
	
		padding-left: 24px;
   		 margin-top: -7px;
	}
}

	@media only screen and (max-width: 768px) {
	.detail{
		padding-left: 162px;
   		 margin-top: -7px;
	}
}
@media only screen and (max-width: 768px) {
	.icon{
		padding-left: 10pc;
    margin-top: -3pc;
	}
}



	</style>

<div class="c-body">
<main class="c-main">
<div class="container-fluid">
<div class="fade-in">

<div class="row">
<div class="col-md-12">
<div class="card">

<div class="card-body">
<div class="row">
<div class="col-sm-12">



<?php ini_set('short_open_tag', 'On'); ?>
<form method="POST" action="<?php echo base_url(); ?>index.php/dsa/dsa_update_profile_one_new_action" id="dsa_update_profile_one_new_action">
	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
		<?php $s=$this->input->get('id'); if($s==''){$s=$this->session->userdata('ID');} if($s==$this->session->userdata('ID')){?>
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
	
			<a href="<?php echo base_url();?>index.php/dsa/update_basic_profile?id=<?php  echo $id ;?>" ><i style="width: 30px; height: 30px;" alt="mahesh" class="fa fa-edit"></i></a>
			
			</div>
		<?php } ?>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div class="icon">
						<span class="shadow align-middle dot"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></span>				
					</div>
						
				</div>	
			</div>
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center" >
					<div class="detail" style="font-size: 10px; color: black; margin-right: 20px;">
						Personal Details
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
	  					<input disabled style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text" id="f_name" name="f_name" minlength="3" maxlength="30" required value="<?php echo $row->FN;?>" oninput="validateText(this)">
	  					<input disabled style="margin-top: 8px;" placeholder="Middle Name (Optional)" class="input-cust-name" type="text" name="m_name" id="m_name" value="<?php echo $row->MN;?>" minlength="3" maxlength="30" oninput="validateText(this)">
	  					<input disabled style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="l_name" id="l_name" minlength="3" maxlength="30" required  value="<?php echo $row->LN;?>" oninput="validateText(this)">
						
	  				</div>
	  				
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email-Id *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled required placeholder="Enter email-Id *" class="input-cust-name" type="email" name="email" value="<?php echo $row->EMAIL;?>" minlength="8" maxlength="75">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled required placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row->MOBILE;?>">
  				</div> 
 
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="w-100"></div>

				<div style="margin-top: 0px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Birth *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<input disabled required  max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="dob" id="dob" value="<?php echo ($row->DOB);?>" >
				</div>
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
									<select disabled required class="input-cust-name" name="education_type" > 
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
				<?php }  }?>	
  			</div>  			
		</div>

		
		<!-- firm details ------------------------------- -->

		<?php if(!empty($row))	{if($row->ROLE==14 || $row->ROLE==13 || $row->ROLE==15 || $row->ROLE==16 || $row->ROLE==3 || $row->ROLE==8 || $row->ROLE==21 || $row->ROLE==23|| $row->ROLE==26)  
		{ 
			?>
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
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Firm Name *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled  placeholder="Firm Name *" class="input-cust-name" maxlength="100" title="Please enter firm name" type="text" name="firm_name" id="firm_name" oninput="maxLengthCheck(this)" value="<?php echo $row->dsa_firm_name;?>">
  				</div>  			  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Type of firm</span>
				</div>			
				<div class="w-100"></div>
  				
				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select disabled  class="input-cust-name resi_prop_type" name="firm_type" > 
					  <option value="">Select Firm Type *</option>
					  <option value="Partnership" <?php if(!empty($row))if ($row->dsa_firm_type == 'Partnership') echo ' selected="selected"'; ?>>Partnership</option>
					  <option value="Propertieary" <?php if(!empty($row))if ($row->dsa_firm_type == 'Propertieary') echo ' selected="selected"'; ?>>Propertieary</option>
					  
					</select>
					</div>
			</div>
		</div>
         <?php  } } ?>
		 <?php if(!empty($row))	{if($row->ROLE==27 )  {  ?>

                                                
															<div class="row shadow bg-white rounded margin-10 padding-15">
																<div class="row justify-content-center col-12">
																    <span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Business Proof verification</span>
																</div>
																<div class="row justify-content-center col-12">
																	<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">We require your GST </span>
																</div>
																<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="div1">
																	<div style="margin-top: 0px;" class="col">
																		<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">GST NUMBER *</span>
																	</div>	
																	<div class="w-100"></div>
																		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																			<input pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$"  placeholder="GST number" class="input-cust-name" maxlength="15"  type="text" name="GST_number" id="GST_number" title="Please enter valid GST number" maxlength="10" <?php if(!empty($row)){ if( $row->verify_retailer_dis_gst=='true'){echo 'readonly ';} }?> value="<?php if(isset($row) )echo $row->dsa_GST;?>" >
																			<input type="text" id="verify_GST_status" name="verify_GST_status" value="<?php if(!empty($row)){echo $row->verify_retailer_dis_gst;} ?>"  hidden >
																		</div>  			  				
																</div>
																<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="div4" >
														<div style="margin-top: 0px;" class="col">
														
															<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Registered Business  address *</span></div>
															
															<div class="w-100"></div>
															<div style="margin-left: 35px; margin-top: 8px;" class="col">
																			
																<textarea  type="text"   class="input-cust-name"    name="Buisness_add" id="Buisness_add" style="height:100px"   ><?php if(isset($row)){ echo $row->dsa_address_line_1; } ?></textarea>
																
                                                        </div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="div5" >
														<div style="margin-top: 0px;" class="col">
															<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Current Business  address *</span></div>
															<div style="margin-left: 30px; display:none;" class="custom-control custom-switch" id="chechshow">				  
															<input type="checkbox" class="custom-control-input" id="customSwitches" name="resiperchk">
															<label class="custom-control-label" for="customSwitches">Current Business  Address Same As Registered  Address ?</label>				  
															</div>	
															<div class="w-100"></div>
															<div style="margin-left: 35px; margin-top: 8px;" class="col">
					
																<textarea  type="text"   class="input-cust-name"    name="Buisness_add_current" id="Buisness_add_current" style="height:100px"   ><?php if(isset($row)){ echo $row->dsa_address_line_2; } ?></textarea>
																
                                                        </div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="div3">
														<div style="margin-top: 0px;" class="col">
															<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Registered Business name *</span></div>	
															<div >				  
															
															<label class="" >&nbsp;</label>				  
                                                             </div>
															<div class="w-100"></div>
															<div style="margin-left: 35px; margin-top: 8px;" class="col">
															<input  type="text"   class="input-cust-name"    name="Buisness_name" id="Buisness_name"   style="text-transform:uppercase" value="<?php if(isset($row)){ echo $row->dsa_firm_name; } ?>">
																
                                                        </div>
													</div>
												</div>


																			

			
	
		
	   
<?php  } }?>
<?php if(!empty($row))	{if($row->ROLE==29 )  {  ?>


												<div class="row shadow bg-white rounded margin-10 padding-15">
												    <div class="row justify-content-center col-12">
														<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Business  Proof verification</span>
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
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="div4" >
														<div style="margin-top: 0px;" class="col">
														
															<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Registered Business  address *</span></div>
															
															<div class="w-100"></div>
															<div style="margin-left: 35px; margin-top: 8px;" class="col">
																			
																<textarea  type="text"   class="input-cust-name"    name="Buisness_add" id="Buisness_add" style="height:100px"   ><?php if(isset($row)){ echo $row->dsa_address_line_1; } ?></textarea>
																
                                                        </div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="div5" >
														<div style="margin-top: 0px;" class="col">
															<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Current Business  address *</span></div>
															<div style="margin-left: 30px; display:none;" class="custom-control custom-switch" id="chechshow">				  
															<input type="checkbox" class="custom-control-input" id="customSwitches" name="resiperchk">
															<label class="custom-control-label" for="customSwitches">Current Business  Address Same As Registered  Address ?</label>				  
															</div>	
															<div class="w-100"></div>
															<div style="margin-left: 35px; margin-top: 8px;" class="col">
																			
																<textarea  type="text"   class="input-cust-name"    name="Buisness_add_current" id="Buisness_add_current" style="height:100px"   ><?php if(isset($row)){ echo $row->dsa_address_line_2; } ?></textarea>
																
                                                        </div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="div3">
														<div style="margin-top: 0px;" class="col">
															<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Registered Business name *</span></div>	
															<div >				  
															
															<label class="" >&nbsp;</label>				  
                                                             </div>
															<div class="w-100"></div>
															<div style="margin-left: 35px; margin-top: 8px;" class="col">
																				
																<input  type="text"   class="input-cust-name"    name="Buisness_name" id="Buisness_name"   style="text-transform:uppercase" value="<?php if(isset($row)){ echo $row->dsa_firm_name; } ?>">
																
                                                        </div>
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
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">PAN NUMBER *</span></div>	
                												<div class="w-100"></div>
  													  			<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																		
					  													<input pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" required placeholder="PAN number *" class="input-cust-name" maxlength="10"  type="text" name="pan" id="pan" title="Please enter valid PAN number" maxlength="10" <?php if(!empty($row)){ if( $row->verify_retailer_dis_pan=='true'){echo 'readonly ';} }?> value="<?php if(isset($row->PAN_NUMBER)){ echo  preg_replace("/(?!^).(?!$)/", "*", $row->PAN_NUMBER);} ?>"  >
  				   													    <input type="text" id="verify_pan_status" name="verify_pan_status" value="<?php if(!empty($row)){echo $row->verify_retailer_dis_pan;} ?>"  hidden >
																</div>  			  				
															</div>
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
														<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Bank Name</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																<input required placeholder="Bank Name*" class="input-cust-name" type="text"  name="Bank_name"  value="<?php if(!empty($dsa_BANK_DETAILS)){ echo $dsa_BANK_DETAILS['Bank_name'];}?>">
															</div>  			  				
														</div>
			                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																<input required placeholder="Account Number*" class="input-cust-name" type="number"  name="acc_no"  maxlength="16" min="0" oninput="maxLengthCheck(this)" value="<?php if(!empty($dsa_BANK_DETAILS)){ echo $dsa_BANK_DETAILS['acc_no'];}?>">
															</div>  			  				
														</div>
														<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">IFSC Code</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																<input required placeholder="IFSC Code*" class="input-cust-name" type="text"  name="ifsc_code"  maxlength="11" min="0" oninput="maxLengthCheck(this)" onkeydown="upperCaseF(this)" pattern="^[A-Z]{4}0[A-Z0-9]{6}$"  value="<?php if(!empty($dsa_BANK_DETAILS)){ echo $dsa_BANK_DETAILS['ifsc_code'];}?>">
															</div>  			  				
														</div>
													</div>
													
													
															
				                                    
														
				                                       
	<?php  } }?>
	
		<?php if(!empty($row))	{if($row->ROLE==29 || $row->ROLE==27 )  {  ?>

                                                
				<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Business Proof verification</span>
				</div>
				<div class="row justify-content-center col-12">
						<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">We require your GST </span>
				</div>
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="docs">
																<?php $i=1;  foreach($get_uploded_doc as $row){  ?>
												
												
												
																		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
																			<div class="row " style="border: 1px solid #edeff1; margin-left:13px; margin-right:13px">
																				<div class="col-sm-10"><a target="_blank">  <i class="fa fa-file-text" style="color:green" aria-hidden="true"></i> &nbsp; <label for="email" style="font-size: 13px; color: black; font-weight: bold;">
																				<?php echo $row->DOC_TYPE; ?>
																								</label></a></div>
																				<div class="col-sm-1"><a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $row->ID; ?>" target="_blank"> <i class="fa fa-file-pdf-o" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>
																				</div>
																				
																				
																						
																											
																										
																									
																			</div>
																		
																		</div>
		
												
																<?php $i++; } ?>
																</div>
					
				</div>
			<?php } }?>	
			
        <?php if(!empty($row))	{if($row->ROLE==2 )  
		{  ?>
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
						<input disabled min="1" required placeholder="Enter years of experience *" class="input-cust-name" type="number" maxlength="2" name="experience"  id="experience" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row))echo $row->EXPERIENCE;?>">
					</div>

					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Does you work under any Corporate DSA ? </span>
					</div>			
					<div class="w-100"></div>
					
					<div style="margin-left: 35px;margin-top: 8px;" class="col">
						<div class="row" style="color: black; font-size: 14px;">
							<div disabled class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"><input disabled checked="true" style="margin-right: 5px;" type="radio" name="work_under" value="Yes">Yes</div>
							<div disabled class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"><input style="margin-left: 10px; margin-right: 5px;" type="radio" name="work_under" value="No">No</div>
						
						</div>
					</div>  	

					<div class="col" id="layout_corporate_dsa">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Corporate DSA *</span>
						<div style="margin-left: 35px; margin-top: 0px;" class="col">
							<input disabled style="margin-top: 8px;" placeholder="Name *" class="input-cust-name" type="text" id="corporate_dsa_name" name="corporate_dsa_name" minlength="3" maxlength="30" value="<?php if(!empty($row))echo $row->dsa_corporate_dsa_name;?>" oninput="maxLengthCheck(this)">
							<input disabled style="margin-top: 8px;" placeholder="Contact Number *" class="input-cust-name" min="99" type="number" name="corporate_dsa_contact" id="corporate_dsa_contact" value="<?php if(!empty($row))echo $row->dsa_corporate_dsa_contact;?>" minlength="10" maxlength="10" oninput="maxLengthCheck(this)">
						</div>
						
					</div>	
									
				</div>
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
					
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Type of loans you works on *</span>
					</div>			
					<div class="w-100"></div>
					
					<?php  
						$home_loan = false; $personal_loan = false; $lap = false; $business_loan = false; $msme = false; $education = false; $cc = false;
						if(!empty($row->dsa_works_loan_type)){
							
							$json = $row->dsa_works_loan_type;
							$jsonData = json_decode($json);
						
							if($jsonData!=''){
								$data_array = $jsonData->loan_types;
								for ($i=0; $i < count($data_array); $i++) {
									
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
							<input disabled <?php if($home_loan)echo "checked";?> type="checkbox" id="home_loan" name="home_loan" value="Home Loan" style="margin-top:5px; margin-right:8px;">
							<label for="home_loan" style="color:black;"> Home Loan</label>
						</div>

						<div class="row" class="row" style="margin-bottom: 3px;">
							<input disabled <?php if($personal_loan)echo "checked";?> type="checkbox" id="personal_loan" name="personal_loan" value="Personal Loan" style="margin-top:5px; margin-right:8px;">
							<label for="personal_loan" style="color:black;"> Personal Loan</label>
						</div>

						<div class="row" class="row" style="margin-bottom: 3px;">
							<input disabled <?php if($lap)echo "checked";?> type="checkbox" id="lap" name="lap" value="Loan against Property" style="margin-top:5px; margin-right:8px;">
							<label for="lap" style="color:black;"> Loan against Property</label>
						</div>

						<div class="row" class="row" style="margin-bottom: 3px;">
							<input disabled <?php if($business_loan)echo "checked";?> type="checkbox" id="business_loan" name="business_loan" value="Business Loan" style="margin-top:5px; margin-right:8px;">
							<label for="business_loan" style="color:black;"> Business Loan</label>
						</div>

						<div class="row" class="row" style="margin-bottom: 3px;">
							<input disabled <?php if($msme)echo "checked";?> type="checkbox" id="msme_loan" name="msme_loan" value="MSME Loan" style="margin-top:5px; margin-right:8px;">
							<label for="msme_loan" style="color:black;"> MSME Loan</label>
						</div>

						<div class="row" class="row" style="margin-bottom: 3px;">
							<input disabled <?php if($education)echo "checked";?> type="checkbox" id="education_loan" name="education_loan" value="Education Loan" style="margin-top:5px; margin-right:8px;">
							<label for="education_loan" style="color:black;"> Education Loan</label>
						</div>

						<div class="row" class="row" style="margin-bottom: 3px;">
							<input disabled <?php if($cc)echo "checked";?> type="checkbox" id="cc" name="cc" value="Credit Card" style="margin-top:5px; margin-right:8px;">
							<label for="cc" style="color:black;"> Credit Card</label>
						</div>			
					</div>  
					

				</div>

				<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
					
					<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Number of cases processed every month *</span>
					</div>			
					<div class="w-100"></div>
					
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<input  disabled required name="cases_processed" id="cases_processed" placeholder="" type="number" min="1" class="input-cust-name" value="<?php if(!empty($row))echo $row->dsa_cases_processed_p_month ;?>">					
					</div>  			  				

					<div class="w-100"></div>

					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Average loan size (In lakhs) *</span>
					</div>			
					<div class="w-100"></div>
					
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<input  disabled required name="avg_loan" id="avg_loan" placeholder="" type="number" min="10000" max="99999" class="input-cust-name" value="<?php if(!empty($row))echo $row->dsa_avg_loan_size_anmt_in_lac ;?>">					
					</div>  			  				

					<div class="w-100"></div>
					
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Do you charge fee from customers ?</span>
					</div>			
					
					<div style="margin-left: 35px;margin-top: 8px;" class="col">
						<div class="row" style="color: black; font-size: 14px;">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"><input disabled checked="true" style="margin-right: 5px;" type="radio" name="rdo_fees" value="Yes">Yes</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"><input style="margin-left: 10px; margin-right: 5px;" type="radio" name="rdo_fees" value="No">No</div>
						
						</div>
					</div>  	

					<div class="col" id="layout_fees_dsa">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Enter fees (In Rs) *</span>
						<div style="margin-left: 35px; margin-top: 0px;" class="col">
							<input disabled style="margin-top: 8px;" placeholder="Fees *" class="input-cust-name" min="99" type="number" name="fees" id="fees" value="<?php if(!empty($row))echo $row->dsa_fee_charge;?>" minlength="10" maxlength="10">
						</div>
						
					</div>			  				
				</div>

				<div class="w-100"></div>  
				

				
			</div>		
		<?php }} ?>
		<?php if(!empty($row))	{if($row->ROLE==2 || $row->ROLE==4 )  {  ?>
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
								<input style="margin-top: 8px;" placeholder="" class="input-cust-name" type="text" name="bank[]" id="" value="<?php echo $dsa_bank->BANK_NAME; ?>" >
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
								<input style="margin-top: 8px;" placeholder="DSA Code" class="input-cust-name" type="text" name="dsa_code[]" id="" value="<?php echo $dsa_bank->DSA_CODE; ?>" >
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							&nbsp;
							</div>
							<?php } } ?>
							
							
				
						
					
			</div>
		</div>
			<?php }} ?>	
		

		 </div>
			</form>


		</div>
		</div>
	</div>
</div>

</div>

</div>
</div>
</main>
</div>
<footer class="c-footer">
<div>Copyright © 2020 Finaleap.</div>
<div class="mfs-auto">Powered by Finaleap</div>
</footer>
</div>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>