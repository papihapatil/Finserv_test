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
										<div>
        									<div class="container">
												<?php ini_set('short_open_tag', 'On'); ?>
													<div class="margin-10 padding-5">
	  													<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
															<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
																<?php if(!empty($row2)){if ($row2->customer_consent=='true'){?>
																	<div class="row" style="margin-left: 10px;">Bureau Score   &nbsp;<b><?php if(isset($score)){echo $score;} else { echo "Score not Checked";}?></b>
			
																	</div>
																<?php }
																     else
																	 {
																?>
																	<div class="row" style="margin-left: 10px;">Waiting for Consent From  &nbsp;<b> <?php if(!empty($row2)) echo "  ".$row2->FN."  ".$row2->LN;?></b>
																						
																	</div>	 
																<?php
																	 } 
															     }?>
															</div> 
														
														</div>
													</div>



													<div class="row">
													<form method="POST" action="<?php echo base_url(); ?>index.php/customer/customer_flow_update_s_one_for_score1" id="">
													
													<!--<div class="row shadow bg-white rounded margin-10 padding-15">
																<div class="row justify-content-center col-12">
																	<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Identity Details</span>
																		<?php   $_SESSION["credit_score_without_application"] = "credit_score_without_application";
				 														?>
																</div>
																<div class="row justify-content-center col-12">
																	<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">We require your Aadhar number and PAN</span>
																</div>
																<div class="w-100"></div>
																<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
																	<div style="margin-top: 0px;" class="col">
																		<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Select KYC Document *</span>
																	</div>			
																	<div class="w-100"></div>
  																	<div style="margin-left: 35px; margin-top: 8px;" class="col">
																		<select  class="form-control " name="KYC_doc" id="KYC_doc" > 
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
																		<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Enter File Number</span>
																	</div>			
																	<div class="w-100"></div>
  													  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																		<input   placeholder="Enter File Number" class="form-control" type="text" name="file_number" id="file_number"  <?php if(!empty($row_more)){ if( $row_more->VERIFY_KYC=='true'){echo 'readonly ';} }?> value="<?php  if(!empty($row_more)){ echo $row_more->File_Number_Passport;}?>"  style="text-transform:uppercase">
  				  													</div>  			  				
																</div>
																<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" id="date_of_issue" style="display:none">
													  				<div style="margin-top: 0px;" class="col">
																		<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-calendart" aria-hidden="true"></i>&nbsp;&nbsp;Enter Date of Issue</span>
																	</div>			
																	<div class="w-100"></div>
  													  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  																	<input   max="<?php echo date('Y-m-d');?>" class="form-control" type="date" name="doe" id="doe"  >
	  																</div> 			  				
																</div>
																<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
													  				<div style="margin-top: 0px;" class="col">
																		<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Enter KYC Document Id</span>
																	</div>			
																	<div class="w-100"></div>
  												  					<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																		<input   placeholder="" class="form-control" type="text" name="KYC" id="KYC"  <?php if(!empty($row_more)){ if( $row_more->VERIFY_KYC=='true'){echo $row_more->KYC;} }?>  value="<?php  if(!empty($row_more)){ echo $row_more->KYC;}?>"  >
  				  														<input type="text" id="verify_kyc_status" name="verify_kyc_status" value="<?php if(!empty($row_more)){echo $row_more->VERIFY_KYC;}?>"  hidden >
																	</div>  			  				
																</div>
																<?php if(!empty($row_more)){ if( $row_more->VERIFY_KYC=='true'){ ?> 
																<div class="col-xl-3 -lg-3 col-md-col3 col-sm-12 col-12">
																	<div style="margin-top: 0px;" class="col">
																		<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																	</div>			
																	<div class="w-100"></div>
																	<a class="btn btn-success disabled" id="VERIFY_KYC" style="color:white;  padding: 19px;"><i style=" font-size:11px;color:#25a6c6;" class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;KYC Document verified <i class="fas fa-check"></i></a>
																</div>
																<?php }	else {?>
																<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
																	<div style="margin-top: 0px;" class="col">
																		<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																	</div>			
																	<div class="w-100"></div>
																	<a class="btn btn-success " id="VERIFY_KYC" style="color:white;  padding: 19px;">Verify KYC Document</a>
																</div>
																<?php } }	else{?>
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
																		</span> <span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp; PAN Number *</span>
																	</div>	
                													<div style="margin-top: 0px;" class="col">
																		<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">(Five characters, Four digits and again One character) e.g: COKPG9558B</span>
																	</div>					
																	<div class="w-100"></div>
  													  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																		
					  													<input pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" required placeholder="PAN number *" class="form-control" maxlength="10"  type="text" name="pan" id="pan" title="Please enter valid PAN number" maxlength="10" <?php if(!empty($row_more)){ if( $row_more->VERIFY_PAN=='true'){echo 'readonly ';} }?> value="<?php if(isset($row2) )echo $row2->PAN_NUMBER;?>"  style="text-transform:uppercase">
  				   													    <input type="text" id="verify_pan_status" name="verify_pan_status" value="<?php if(!empty($row_more)){echo $row_more->VERIFY_PAN;} ?>"  hidden >
																	</div>  			  				
																</div>
																<?php if(!empty($row_more)){ if( $row_more->VERIFY_PAN=='true'){ ?> 
																<div class="col-xl-4 -lg-4 col-md-col4 col-sm-12 col-12" >
																	<div style="margin-top:8%;" class="col">
																		<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																	</div>			
																	<div class="w-100"></div>
																	<a class="btn btn-success disabled" id="verify_pan" style="color:white;">PAN Verified <i class="fas fa-check"></i></a>
																</div>
																<?php }	else {	?>
																<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
																	<div style="margin-top: 17%;" class="col">
																		<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																	</div>			
																	<div class="w-100"></div>
																	<a class="btn btn-success " id="verify_pan" style="color:white;">Verify PAN </a>
																</div>
																<?php } }else{?>
				   												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
																	<div style="margin-top: 17%;" class="col">
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
															</div>-->
															
															

															
															<div class="row shadow bg-white rounded margin-10 padding-15">
															    <div class="row justify-content-center col-12">
																	<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Identity Details</span>
																		<?php   $_SESSION["credit_score_without_application"] = "credit_score_without_application";
				 														?>
																</div>
																<div class="row justify-content-center col-12">
																	<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">We require your Aadhar number and PAN</span>
																</div>
																<div class="w-100"></div>
																<div class="row col-12">
																	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
																		<div style="margin-top: 0px;" class="col">
																			<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Select KYC Document *</span>
																		</div>
																		<div class="w-100"></div>
																		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																			<select  class="form-control " name="KYC_doc" id="KYC_doc" > 
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
																			<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Enter File Number</span>
																		</div>			
																		<div class="w-100"></div>
																		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																			<input   placeholder="Enter File Number" class="form-control" type="text" name="file_number" id="file_number"  <?php if(!empty($row_more)){ if( $row_more->VERIFY_KYC=='true'){echo 'readonly ';} }?> value="<?php  if(!empty($row_more)){ echo $row_more->File_Number_Passport;}?>"  style="text-transform:uppercase">
																		</div>  			  				
																	</div>
																	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" id="date_of_issue" style="display:none">
																		<div style="margin-top: 0px;" class="col">
																			<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-calendart" aria-hidden="true"></i>&nbsp;&nbsp;Enter Date of Issue</span>
																		</div>			
																		<div class="w-100"></div>
																		<div style="margin-left: 35px;  margin-top: 8px;" class="col">
																			<input   max="<?php echo date('Y-m-d');?>" class="form-control" type="date" name="doe" id="doe"  >
																		</div> 			  				
																	</div>
																	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" id="kyc_id">
																		<div style="margin-top: 0px;" class="col">
																			<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Enter KYC Document Id</span>
																		</div>			
																		<div class="w-100"></div>
																		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																			<input   placeholder="" class="form-control" type="text" name="KYC" id="KYC"  <?php if(!empty($row_more)){ if( $row_more->VERIFY_KYC=='true'){echo $row_more->KYC;} }?>  value="<?php  if(!empty($row_more)){ echo $row_more->KYC;}?>"  >
																			<input type="text" id="verify_kyc_status" name="verify_kyc_status"  hidden <?php if(!empty($row_more)){ if(!empty($row_more->VERIFY_KYC)){echo "value=".$row_more->VERIFY_KYC;}}?>   >
																		</div>  			  				
																	</div>
																	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" id="aahar_link_mob" style="display:none" >
																		<div style="margin-top: 0px;" class="col">
																			<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;aadhar link with mobile no</span>
																		</div>			
																		<div class="w-100"></div>
																		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																		<input type="radio" id="aadhar_link_yes" name="vehicle1" value="Bike">
                                                                         <label for="vehicle1"> yes</label></br>
																		 <input type="radio" id="aadhar_link_no" name="vehicle1" value="Bike">
                                                                         <label for="vehicle1"> no</label></br>
																		</div>  			  				
																	</div>
																	<?php if(!empty($row_more)){ if( $row_more->VERIFY_KYC=='true'){ ?> 
																	<div class="col-xl-3 -lg-3 col-md-col3 col-sm-12 col-12">
																		<div style="margin-top: 0px;" class="col">
																			<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																		</div>			
																		<div class="w-100"></div>
																		<a class="btn btn-success disabled" id="VERIFY_KYC" style="color:white;  padding: 19px;"><i style=" font-size:11px;color:#25a6c6;" class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;KYC Document verified <i class="fas fa-check"></i></a>
																	</div>
																	<?php }	else {?>
																	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
																		<div style="margin-top: 0px;" class="col">
																			<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																		</div>			
																		<div class="w-100"></div>
																		<a class="btn btn-success " id="VERIFY_KYC" style="color:white;  padding: 19px;">Verify KYC Document</a>
																	</div>
																	<?php } }	else{?>
																	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
																		<div style="margin-top: 0px;" class="col">
																			<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																		</div>			
																		<div class="w-100"></div>
																			<a class="btn btn-success " id="VERIFY_KYC" style="color:white; padding: 19px;">Verify KYC Document</a>
																		</div>
																	<?php  }?>

																</div>
																<div  class="row col-12" id="aadhar_verification" style="display:none;">
																		   <!--<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12"  >
																				<div style="margin-top: 0px;" class="col">
																					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-calendart" aria-hidden="true"></i>&nbsp;&nbsp;Mobile no link with aadhar</span>
																				</div>			
																				<div class="w-100"></div>
																				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
																				<input   placeholder="Enter File Number" class="form-control" type="text"    value="<?php  if(!empty($row2)){ echo $row2->MOBILE;}?>"  >
																			
																				</div> 			  				
																			</div>-->
																			
																			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
																				<div style="margin-top: 8px;" class="col">
																					<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																				</div>			
																				<div class="w-100"></div>
																				<div>
																					<a class="btn btn-success " style="margin-left: 50px;"  id="send_otp" style="color:white;">send OTP</a>
																					<input  class="form-control" type="text" id="client_id" hidden>
																				</div>
																			</div>
																			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12"  >
																				<div style="margin-top: 0px;" class="col">
																					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-calendart" aria-hidden="true"></i>&nbsp;&nbsp;Enter OTP</span>
																				</div>			
																				<div class="w-100"></div>
																				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
																				<input   placeholder="Enter OTP" class="form-control" type="text" id="adhar_OTP"  >
																			
																				</div> 			  				
																			</div>
																			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
																				<div style="margin-top: 8px;" class="col">
																					<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																				</div>			
																				<div class="w-100"></div>
																				<div>
																					<a class="btn btn-success disabled" id="verify_otp" style="color:white;">verify OTP</a>
																				</div>
																			</div>
																			
																</div>
																<div class="row col-12">
																	<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
																		<div style="margin-top: 0px;" class="col">
																			</span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp; PAN Number *</span>
																			<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">(Five characters, Four digits and again One character) e.g: COKPG9558B</span>
																		</div>	
																		
																			
																							
																		<div class="w-100"></div>
																		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																			
																			<input pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" required placeholder="PAN number *" class="form-control" maxlength="10"  type="text" name="pan" id="pan" title="Please enter valid PAN number" maxlength="10" <?php if(!empty($row_more)){ if( $row_more->VERIFY_PAN=='true'){echo 'readonly ';} }?> value="<?php if(isset($row2) )echo $row2->PAN_NUMBER;?>"  style="text-transform:uppercase">
																			<input type="text" id="verify_pan_status" name="verify_pan_status" value="<?php if(!empty($row_more)){echo $row_more->VERIFY_PAN;} ?>"  hidden >
																		</div>  			  				
																	</div>
																	<?php if(!empty($row_more)){ if( $row_more->VERIFY_PAN=='true'){ ?> 
																<div class="col-xl-4 -lg-4 col-md-col4 col-sm-12 col-12" >
																	<div style="margin-top:3px;" class="col">
																		<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																	</div>			
																	<div class="w-100"></div>
																	<a class="btn btn-success disabled" id="verify_pan" style="color:white;">PAN Verified <i class="fas fa-check"></i></a>
																</div>
																<?php }	else {	?>
																<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
																	<div style="margin-top: margin-top:3px;" class="col">
																		<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																	</div>			
																	<div class="w-100"></div>
																	<a class="btn btn-success " id="verify_pan" style="color:white;">Verify PAN </a>
																</div>
																<?php } }else{?>
				   												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
																	<div style="margin-top:margin-top:3px;" class="col">
																		<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
																	</div>			
																	<div class="w-100"></div>
																	<a class="btn btn-success " id="verify_pan" style="color:white;">Verify PAN </a>
																</div>
			  													<?php  }?>
																</div>
																
																	
																
																	
																<div style="margin-top: 20px;" class="row col-12 justify-content-center">
																	<span style="color:red" id="pan_error"></span>
																	<span style="color:red" id="kyc_error"></span>
																</div>
															</div>
															</br>
															<br>

	
	<div class="row shadow bg-white rounded margin-10 padding-15" style="padding-bottom:20px;">
		<div class="row justify-content-center col-12">
			<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Check Applicant Bureau Score </span>
		</div>
		<div class="row justify-content-center col-12">
			<span style="margin-bottom: 45px; font-size: 12px; color: #bfbbbb;">Please fill your personal details. If required our Representative may get in touch to verify them.</span>
		</div>
		<div class="w-100"></div>
		<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<span style="color: black; font-size: 12px; font-weight: bold; margin-left: 16%;"><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-circle"></i>&nbsp;&nbsp;Full Name As Per PAN Card *</span>
						<div style="margin-left: 35px; margin-top: 0px;" class="col">
							  <input style="margin-top: 8px;" placeholder="First Name *" class="form-control" type="text" id="f_name" name="f_name" minlength="3" maxlength="30" required value="<?php echo $row2->FN;?>" oninput="validateText(this)">
							  <input style="margin-top: 8px;" placeholder="Middle Name (optional) *" class="form-control" type="text" name="m_name" id="m_name"  value="<?php echo $row2->MN;?>" minlength="3" maxlength="30" oninput="validateText(this)">
							  <input style="margin-top: 8px;" placeholder="Last Name *" class="form-control" type="text" name="l_name" id="l_name" minlength="3" maxlength="30" required  value="<?php echo $row2->LN;?>" oninput="validateText(this)">
							<input  hidden style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="ID" id="ID" minlength="3" maxlength="30" required  value="<?php echo $row2->UNIQUE_CODE;?>" oninput="validateText(this)">
						  </div>
						  <div class="w-100"></div>
					</div>							  				
		</div>	
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			<div style="margin-top: 0px;" class="col">
				<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;Email-Id *</span>
			</div>			
				<div class="w-100"></div>
				  <div style="margin-left: 35px;  margin-top: 8px;" class="col">
					  <input required placeholder="Enter email-Id *" class="form-control" type="email" name="email" value="<?php echo $row2->EMAIL;?>" minlength="8" maxlength="75">
				  </div> 
				  <div class="w-100"></div>
				  <div style="margin-top: 20px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-mobile" aria-hidden="true"></i>&nbsp;&nbsp;Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
				  <div style="margin-left: 35px;  margin-top: 8px;" class="col">
					  <input required placeholder="Enter mobile number *" class="form-control" type="text" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row2->MOBILE;?>">
				  </div> 
				  <div class="w-100"></div>
		  </div>	
		  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			  <div style="margin-top: 0px;" class="col">
				<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-venus-mars" aria-hidden="true"></i>&nbsp;&nbsp;Gender *</span>
			</div>			
			<div class="w-100"></div>
			  <div style="margin-left: 35px;" class="col">
				  <div class="form-control" style=" margin-top: 8px;">
					  <div class="row">
						  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <input checked="true" type="radio" name="gender" value="male">	Male
						  </div>
						  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <input type="radio" name="gender" value="female" <?php if ($row2->GENDER == 'female') echo ' checked="true"'; ?>> Female
						  </div>
					  </div>						
				  </div>  					
			  </div>
			  <div class="w-100"></div>
			  <div style="margin-top: 20px;" class="col">
				<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;Date Of Birth *</span>
			</div>			
			<div class="w-100"></div>
			  <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				  <!--<input required  max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="text" name="dob" id="dob" value="<?php echo base64_decode($row2->DOB);?>" >-->
				<!-- <input  class="input-cust-name" type="text" name="dob" id="dob" value="<?php echo base64_decode($row2->DOB);?>" readonly> -->
				 <input  class="form-control" type="date" name="dob" id="dob" value="<?php echo $row2->DOB;?>" >
			  </div>
		   </div> 
		  <div class="w-100"></div>  			
	</div>
	<br>	<br>
	<div class="row shadow bg-white rounded margin-10 padding-15" style="padding-bottom:20px;padding-right:20px;">
		<div class="row justify-content-center col-12">
			<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Father Details</span>
			<input type="text" name="spouse" value="father" hidden> 
		</div>
		<div class="row justify-content-center col-12">
			<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;"> Father's Full name as per PAN card</span>
		</div>
		<div class="w-100"></div>
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			<div style="margin-top: 0px;" class="col">
				<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;First name *</span>
			</div>			
			<div class="w-100"></div>
			  <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				  <input required placeholder="First Name *" class="form-control" type="text" name="s_f_name" id="s_f_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_F_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
			</div>
	  </div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<div class="col" style="margin-top: 0px;">
			<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Middle name *</span>
		</div>			
		<div class="w-100"></div>
		<div style="margin-left: 35px;  margin-top: 8px;" class="col">
			<input placeholder="Middle Name (Optional)" class="form-control" type="text" name="s_m_name" id="s_m_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_M_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
			</div> 
	  </div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<div class="col" style="margin-top: 0px;">
			<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Last name</span>
		</div>			
		<div class="w-100"></div>
		<div style="margin-left: 35px;  margin-top: 8px;" class="col">
			<input required placeholder="Last Name *" class="form-control" type="text" name="s_l_name" id="s_l_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_L_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
			</div> 
	</div>
</div>
<br>
<!-- family ------------------------------- -->
<div class="row shadow bg-white rounded margin-10 padding-15" style="padding-bottom:20px;padding-right:20px;">
	<div class="row justify-content-center col-12">
		<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Income Details</span>
	</div>
	<div class="row justify-content-center col-12">
		<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">Please provide your income details for further processing.</span>
	</div>
	<div class="w-100"></div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		  <div style="margin-top: 0px;" class="col">
			<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Employment Type  *</span>
		</div>			
		<div class="w-100"></div>
		  <div style="margin-left: 35px;  margin-top: 8px;" class="col">
			  <select required class="form-control" name="employment_type" > 
				  <option value="" >Select *</option>
				  <option value="salaried"       <?php if(!empty($row_more))if ($row_more->employment_type == 'salaried') echo ' selected="selected"'; ?>>Salaried</option>
				  <option value="self_employee"  <?php if(!empty($row_more))if ($row_more->employment_type == 'self_employee') echo ' selected="selected"'; ?>>Self EMployee</option>
				  <option value="retired"       <?php if(!empty($row_more))if ($row_more->employment_type == 'retired') echo ' selected="selected"'; ?>>Retired</option>
			</select>
		</div>
	  </div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<div class="col" style="margin-top: 0px;">
			<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Monthly gross income *</span>
		</div>			
		<div class="w-100"></div>
			<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				  <input type="number" placeholder="Enter Monthly gross income "  class="form-control" name="monthly_income" id="monthly_income" value="<?php if(!empty($row_more))echo $row_more->monthly_income;?>">  					
			  </div> 
		  </div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<div class="col" style="margin-top: 0px;">
			<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;current EMI's if any</span>
		</div>			
		<div class="w-100"></div>
		<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				<input  type="number"  placeholder="Enter EMI" class="form-control" name="current_emi" id="current_emi" value="<?php if(!empty($row_more))echo $row_more->monthly_income;?>">
		  </div> 
	</div>
</div>
<br>

<div class="row shadow bg-white rounded margin-10 padding-15" style="padding-right:20px;">
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
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required style="margin-top: 1px;" placeholder="Address Line 1 *" class="form-control" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_1;?>">
  					<input style="margin-top: 8px;" placeholder="Address Line 2 *" class="form-control" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_2;?>">
  					<input style="margin-top: 8px;" placeholder="Address Line 3 *" class="form-control" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_3;?>">
  				</div>  

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;No of years at the current Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input min="1" required placeholder="Enter years *" class="form-control" type="number" maxlength="2" name="resi_no_of_years"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_NO_YEARS_LIVING;?>">
  				</div>	
               <div style="margin-top: 10px;" class="col">
                    <span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Native Place *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="Native Place" class="form-control" name="NATIVE_PLACE" id="NATIVE_PLACE" value="<?php if(!empty($row_more))echo $row_more->NATIVE_PLACE ;?>">
  				</div>  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Enter landmark *" class="form-control" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LANDMARK;?>" minlength="3" maxlength="30">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
				  <input required placeholder="Enter pincode *" class="form-control" type="text" pattern="[0-9]{6}" minlength="6" title="Please enter valid pin code" name="resi_pincode" id="resi_pincode_2" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_PINCODE;?>">
  			</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select required class="form-control resi_prop_type" name="resi_sel_property_type" > 
					  <option value="">Select Property Type *</option>
					  <option value="Self Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Self Owned') echo ' selected="selected"'; ?>>Self Owned</option>
					  <option value="Parental/Ancestral" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Parental/Ancestral') echo ' selected="selected"'; ?>>Parental/Ancestral</option>
					  <option value="Rental personal Family" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rental personal Family') echo ' selected="selected"'; ?>>Rental personal Family</option>
					    <option value="Shared Rental Accomodation" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Shared Rental Accomodation') echo ' selected="selected"'; ?>>Shared Rental Accomodation</option>
					 
					</select>
					<input style="margin-top: 8px; visibility: hidden;" placeholder="Enter other property type" class="input-cust-name" type="text" name="other_prop_type_1" id="other_prop_type_1" value="<?php if(!empty($row_more) && !empty($row_more->RES_ADDRS_OTHER_PROP_1))echo $row_more->RES_ADDRS_OTHER_PROP_1;?>"  minlength="3" maxlength="30">  		
  				</div>  
  				

			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  id="resi_state_view" placeholder="State" class="form-control" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_STATE ;?>">
  					<input hidden="true" placeholder="State" class="form-control" name="resi_state" id="resi_state" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_STATE ;?>">  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="District" class="form-control" id="resi_district_view" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_DISTRICT ;?>">
  					<input hidden="true" placeholder="District" class="form-control" name="resi_district" id="resi_district" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_DISTRICT ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;City *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="City" class="form-control" name="resi_city" id="resi_city" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_CITY ;?>" minlength="3" maxlength="30">
  				</div>  
				
			</div>


			<!-- permanent add -->
			<div class="w-100"></div>

			<div class="row col-12" style="padding-top: 10px; margin: 10px; color: black; font-size: 14px;">
				<span>Permanent Address *</span>
				<div style="margin-left: 20px;" class="custom-control custom-switch">				  
				  <input type="checkbox" class="custom-control-input" id="customSwitches" name="resiperchk">
				  <label class="custom-control-label" for="customSwitches">Is your permanent address same as Residence address ?</label>				  
				</div>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Address *</span>
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
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;No of years at the permanent Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input min="1" placeholder="Enter years *" class="form-control" type="number" maxlength="2" name="per_no_of_years" id="per_no_of_years" required oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_NO_YEARS_LIVING : $row_more->RES_ADDRS_NO_YEARS_LIVING ;?>">
  				</div>			  						  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="Enter landmark" required class="form-control" type="text" name="per_landmark" id="per_landmark" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_LANDMARK : $row_more->RES_ADDRS_LANDMARK ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="Enter pincode *" class="form-control" type="text" pattern="[0-9]{6}" minlength="6" name="per_pincode" title="Please enter valid pincode" id="per_pincode"  required oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_PINCODE : $row_more->RES_ADDRS_PINCODE ;?>">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select class="form-control" name="per_sel_property_type" required id="sel_per_property_type"> 
						<?php if($perAddPresent) { ?>
							  <option value="">Select Property Type *</option>
						   <option value="Self Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Self Owned') echo ' selected="selected"'; ?>>Self Owned</option>
							  <option value="Parental/Ancestral" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Parental/Ancestral') echo ' selected="selected"'; ?>>Parental/Ancestral</option>
					  		  <option value="Rental personal Family" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rental personal Family') echo ' selected="selected"'; ?>>Rental personal Family</option>
							  <option value="Shared Rental Accomodation" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Shared Rental Accomodation') echo ' selected="selected"'; ?>>Shared Rental Accomodation</option>
					<?php } else { ?>
							 <option value="">Select Property Type *</option>
						
							   <option value="Self Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Self Owned') echo ' selected="selected"'; ?>>Self Owned</option>
							  <option value="Parental/Ancestral" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Parental/Ancestral') echo ' selected="selected"'; ?>>Parental/Ancestral</option>
					  		  <option value="Rental personal Family" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rental personal Family') echo ' selected="selected"'; ?>>Rental personal Family</option>
							  <option value="Shared Rental Accomodation" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Shared Rental Accomodation') echo ' selected="selected"'; ?>>Shared Rental Accomodation</option>
						<?php }?>
							</select>



				
  				</div>  			  							  				
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="State *" class="form-control" id="per_state_view" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_STATE : $row_more->RES_ADDRS_STATE ;?>">

  					<input hidden="true" placeholder="State *" class="form-control" name="per_state" id="per_state" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_STATE : $row_more->RES_ADDRS_STATE ;?>">
  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="per_district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="District *" class="form-control" id="per_district_view" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_DISTRICT : $row_more->RES_ADDRS_DISTRICT ;?>">

  					<input hidden="true" placeholder="District *" class="form-control" name="per_district" id="per_district" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_DISTRICT : $row_more->RES_ADDRS_DISTRICT ;?>">

  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 16%;  font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;City *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="per_city_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="City *" class="form-control" name="per_city" id="per_city" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_CITY : $row_more->RES_ADDRS_CITY ;?>" minlength="3" maxlength="30">
  				</div>  			  				
			</div>
			<div style="margin-top: 20px;" class="row col-12 justify-content-center">
				<div>			
				   <input type="checkbox" id="TC" name="TC" checked required value="true" >&nbsp; I give my consent to request my Credit bureau score and i agree to <a style="color: #007bff" target="_blank" href="<?php echo base_url()?>Finaleap-Terms_and_conditions _Credit_bureau_Consent.pdf">terms and conditions.</a>
				</div>
			</div>
			<div style="margin-top: 20px;" class="row col-12 justify-content-center">
				<?php if(!empty($row_more)){ if( $row_more->VERIFY_PAN=='true' && $row_more->VERIFY_KYC=='true' ){ ?> 
					<button class="btn btn-success" style="background-color: #25a6c6;" name="submit" value="submit" >
						SUBMIT
					</button>
				<?php } else {?>
					<a  id="continue" href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried&ID=<?php if(!empty($row2)){echo $row2->UNIQUE_CODE;} ?>">
							<button class="login100-form-btn disabled" style="background-color: #25a6c6;" id="continue1"  title="please verifiy PAN" >
							CONTINUE
							</button>
					</a>
				<?php } } else {?>
					<a  id="continue" href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried&ID=<?php if(!empty($row2)){echo $row2->UNIQUE_CODE;} ?>">
						
						<button class="login100-form-btn disabled" style="background-color: #25a6c6;" id="continue1"  title="please verifiy PAN" >
							CONTINUE
						</button>
					</a>
				<?php } ?>
			</div>
			
		</div>		
		<!-- identity details ------------------------------- -->

				</div>
</form>
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
							<script>
 $(document).ready(function () {
                
                /*$('#dob').datepicker({
				autoclose: true,
				endDate: new Date(new Date().setDate(new Date().getDate())),
				constrainInput: true,
				format: 'yyyy-mm-dd'  
				
});  */
            
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

/*$(function(){
    $(window).load(function(){
         //$('#continue').attr("disabled","disabled");
		 //document.getElementById("continue1").disabled = true;
		 $('#continue1').addClass('disabled');

    });
});*/
$( "#send_otp" ).on('click',function(e)
	{
			var aadhar_no = $('#KYC').val();
		var aadhar=/^[2-9]{1}[0-9]{3}\s[0-9]{4}\s[0-9]{4}$/;
          
              if (aadhar.test($('#KYC').val()) == false) {  
				swal("Oops", "Please enter valid aadhar no ", "error");
				exit; 
			  }
			  else
			  {
				$.ajax({
				type:'POST',
				url:'<?php echo base_url("index.php/Api_Functions/send_otp"); ?>',
				
				data:{'aadhar_no':aadhar_no},
				//url:'<?php echo base_url("index.php/InsuranceRegister/getadharresponse"); ?>',
				//data:{'mob':'9075273597'},
				success:function(data)
				{
					var obj =JSON.parse(data);
					
					//alert(obj.success);
					//alert(obj.data.otp_sent);
					if(obj.success==true)
					{
						$('#client_id').val(obj.data.client_id);
						swal("success", "OTP send on registered mobile number", "success");
						$('#send_otp').addClass('disabled');
						$('#verify_otp').removeClass('disabled');
					}
					else{
						swal("Error!","Something went wrong", "warning");
					}
				}
				});

			  }
	});
	$( "#verify_otp" ).click(function() 
	{
		
		var adhar_OTP = $.trim($('#adhar_OTP').val());
		var client_id=$.trim($('#client_id').val());
		var ID=$('#ID').val();
		if(adhar_OTP=='')
		{
			swal("Warning!","Please enter OTP", "warning");
			exit;
		}
		else   {
					$.ajax({
						type:'POST',
						url:'<?php echo base_url("index.php/Api_Functions/verify_OTP"); ?>',
						
						
						data:{'adhar_OTP':adhar_OTP,'client_id':client_id},
						
						success:function(data)
						{
							var obj =JSON.parse(data);
							
							//alert(obj.success);
						
							if(obj.success==true)
							{
								$('#verify_kyc_status').val("true");
								//$('#verify_kyc_status').html('true');
								$('#resi_landmark').val(obj.data.address.landmark);
								$('#resi_pincode_2').val(obj.data.zip);
								$('#resi_state_view').val(obj.data.address.state);
								$('#resi_district_view').val(obj.data.address.dist);
								$('#resi_city').val(obj.data.address.vtc);
								var new_add=obj.data.address.street+' '+obj.data.address.house;
								$('#resi_add_1').val(new_add);
								$('#resi_add_2').val(obj.data.address.landmark+' '+obj.data.address.loc);
								$('#resi_add_3').val(obj.data.address.vtc);
								$('#dob').val(obj.data.dob);
								$.ajax({
									        
											type:'POST',
											url:'<?php echo base_url("index.php/Customer/update_aadhar_response"); ?>',
											data:{'ID':ID,'verify_aadhar_status':data },
											success:function(data)
											{
												$('#verify_otp').addClass('disabled');
												swal("Success!","OTP verified Sucessfully", "success");
											}
										});
								
							   
								
							}
							else{
								swal("Error!","Wrong OTP entered", "warning");
							}
						}
						});
				}
	});
$('#continue2').on('click',function(e)
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
										 document.getElementById('KYC').value = '';
										 document.getElementById("KYC").pattern = "^([A-Z a-z]){1}([0-9]){7}$";
										 $('#KYC').attr("placeholder", "Enter "+ KYC_doc+" Number (e.g:J9006970)");
										 //$('#KYC').attr('title','J8369854');
										 $('#date_of_issue').hide();
										 $('#aadhar_verification').hide();
										  $('#VERIFY_KYC').show();
										   $('#kyc_id').show();
										   $('#aahar_link_mob').hide();
										 $('#VERIFY_KYC').removeClass('disabled');
								
							 }
							 else if(KYC_doc=='Driving Licence')
							 {
								          $('#date_of_issue').show();
										  $('#passport_file_no').hide();
										  $('#aadhar_verification').hide();
										  $('#VERIFY_KYC').show();
										   $('#kyc_id').show();
										   $('#aahar_link_mob').hide();
										  document.getElementById('KYC').value = '';
										   document.getElementById("KYC").pattern = "^(([A-Z]{2}[0-9]{2})( )|([A-Z]{2}-[0-9]{2}))((19|20)[0-9][0-9])[0-9]{7}$";
										   $('#KYC').attr("placeholder", "Enter DL Number (e.g: MH12 88998809097)");
											//$('#KYC').attr('title','MH14 20160034761');
										  $('#VERIFY_KYC').removeClass('disabled');
							 }
							  else if(KYC_doc=='Aadhar')
							 {
								           $('#date_of_issue').hide();
										   $('#passport_file_no').hide();
										   document.getElementById('KYC').value = '';
											document.getElementById("KYC").pattern = "^[2-9]{1}[0-9]{3}\\s[0-9]{4}\\s[0-9]{4}$";
											$('#KYC').attr("placeholder", "Enter "+ KYC_doc+" Number(e.g:8888 8888 8888)");
										   // $('#KYC').attr('title','3675 9834 6015');
										   //$('#VERIFY_KYC').hide();
										   
										   $('#aahar_link_mob').show();
										   //$('#aadhar_verification').show();
										  // $('#verify_kyc_status').val('true');
							 }
							  else if(KYC_doc=='VoterId')
							 {
								 
								            document.getElementById('KYC').value = '';
											document.getElementById("KYC").pattern = "^([a-zA-Z]){3}([0-9]){7}?$";
											$('#KYC').attr("placeholder", "Enter "+ KYC_doc+" Number (e.g: ZUT4800754)");
											$('#date_of_issue').hide();
											$('#aadhar_verification').hide();
										  $('#VERIFY_KYC').show();
										   $('#kyc_id').show();
										   $('#aahar_link_mob').hide();
										   $('#passport_file_no').hide();
											 $('#VERIFY_KYC').removeClass('disabled');
								    //$('#KYC').attr('title','ZUT4800754');
								 
							 }
							 else
							 {
								 $('#date_of_issue').hide();
								 $('#passport_file_no').hide();
								 $('#aadhar_verification').hide();
										  $('#VERIFY_KYC').show();
										   $('#kyc_id').show();
										   $('#aahar_link_mob').hide();
								 $('#VERIFY_KYC').removeClass('disabled');
								 
							 }
							 
						}
					 );
					 $("#aadhar_link_yes").click(function()
					 {
						$('#aadhar_verification').show();
						$('#VERIFY_KYC').addClass('disabled');
					 });
					 $("#aadhar_link_no").click(function()
					 {
						$('#aadhar_verification').hide();
						$('#VERIFY_KYC').addClass('disabled');
					 });
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
				//exit;
				return false;
			}
			if(pan_no=='')
			{
				$('#kyc_error').html("Please Fill VoterId Number.");
				//exit;
				return false;
			}
			if(state=='')
			{
				$('#kyc_error').html("Please Enter State.");
				//exit;
				return false;
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
			   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
                data:{'full_name':full_name,'pan_no':pan_no,'type':type,'state':state},
                success:function(data){
					
					var obj =JSON.parse(data);
				//	var obj  = jQuery.parseJSON(JSON.stringify(data));
                   if(obj.msg=='sucess')
				   {

					  swal("success!", "VoterId verified Sucessfully!", "success");
					 // swal("Test Mode!", "VoterId verified Sucessfully!", "success");
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
				//exit;
				return false;
			}
			if(doe=='')
			{
				$('#kyc_error').html("Please Enter Date of Issue. ");
				//exit;
				return false;
			}
			if(dob=='')
			{
				$('#kyc_error').html("Please Enter Date of Birth. ");
				//exit;
				return false;
			}
			
			
			  $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
				//url:'<?php echo base_url("index.php/Api_Functions/Test_drivingLicence_verification"); ?>',
                data:{'pan_no':pan_no,'type':type,'dob':newDate,'doe':newDate1},
                success:function(data){
					
					var obj =JSON.parse(data);
					//var obj  = jQuery.parseJSON(JSON.stringify(data));
                   if(obj.msg=='sucess')
				   {

					  swal("success!", "Driving Licence verified Sucessfully!", "success");
					//  swal("Test Mode!", "Driving Licence verified Sucessfully!", "success");
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
				//exit;
				return false;
			}
			if(file_number=='' || file_number=='' )
			{
				$('#kyc_error').html("Please Fill File Number. ");
				//exit;
				return false;
			}
			
			if(pan_no=='')
			{
				$('#kyc_error').html("Please Fill Passport Number. ");
				//exit;
				return false;
			}
			if(dob=='')
			{
				$('#kyc_error').html("Please Enter Date of Birth. ");
				//exit;
				return false;
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
			//	url:'<?php echo base_url("index.php/Api_Functions/Test_Passport_verification"); ?>',
                data:{'full_name':full_name,'pan_no':pan_no,'type':type,'file_number':file_number,'dob':newDate},
                success:function(data){
					
					var obj =JSON.parse(data);
					//var obj  = jQuery.parseJSON(JSON.stringify(data));
                   if(obj.msg=='sucess')
				   {
					  $('#continue1').removeClass('disabled');
					  swal("success!", "Passport verified Sucessfully!", "success");
					 // swal("Test Mode!", "Passport verified Sucessfully!", "success");
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
			//exit;
			return false;
		}
		if(pan_no=='')
		{
			$('#pan_error').html("Please Fill PAN Number. ");
		//	exit;
		return false;
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
				//url:'<?php echo base_url("index.php/Api_Functions/Test_PAN_verification"); ?>',
                data:{'full_name':full_name,'pan_no':pan_no,'type':type},
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
													
                                                     
													 
												  }
								});
						
						 $('#verify_pan').addClass('disabled');
						 $('#verify_pan_status').val('true');
					  
					 
					   
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

		  $('#customSwitches').on('change', function() { 
              if (!this.checked) {
                  $("#per_add_1").val("");               
                  $("#per_add_2").val("");               
                  $("#per_add_3").val("");               
                  $("#per_no_of_years").val("");               
                  $("#per_landmark").val("");               
                  $("#per_pincode").val("");               
                  $("#sel_per_property_type").val("");               
                  $("#per_state").val("");               
                  $("#per_district").val("");               
                  $("#per_city").val("");  
                  $("#per_state_view").val("");               
                  $("#per_district_view").val("");                            
              }else {
                  if($("#resi_add_1").val() == '' ||               
                  $("#resi_no_of_years").val() == '' ||               
                  $("#resi_landmark").val() == '' ||               
                  $("#resi_pincode_2").val() == '' ||               
                  $("#resi_per_property_type").val() == '' ||               
                  $("#resi_state").val() == '' ||               
                  $("#resi_district").val() == '' ||               
                  $("#resi_city").val() == ''){
                    $("#customSwitches").attr("checked", false);
                    swal("Oops", "All value must be entered in residence address.", "error");                        
                    return;
                  }else{
                    $("#per_add_1").val($("#resi_add_1").val());               
                    $("#per_add_2").val($("#resi_add_2").val());               
                    $("#per_add_3").val($("#resi_add_3").val());               
                    $("#per_no_of_years").val($("#resi_no_of_years").val());               
                    $("#per_landmark").val($("#resi_landmark").val());               
                    $("#per_pincode").val($("#resi_pincode_2").val());  
                 
                    $("#sel_per_property_type").val($(".resi_prop_type option:selected").val());               
                    $("#per_state").val($("#resi_state").val());               
                    $("#per_district").val($("#resi_district").val());               
                    $("#per_state_view").val($("#resi_state").val());               
                    $("#per_district_view").val($("#resi_district").val());               
                    $("#per_city").val($("#resi_city").val());               
                  }
                  
              }
          });
</script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
						</body>
					</html>
