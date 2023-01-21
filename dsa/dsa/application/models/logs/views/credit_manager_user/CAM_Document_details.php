
<?php ini_set('short_open_tag', 'On'); ?>
<?php
    $message = $this->session->flashdata('success');
    if (isset($message)) {
        echo '<script> swal("success!", "Profile updated successfully", "success");</script>';
         $this->session->unset_userdata('success');	
    }

    ?>
	<?php
    $message = $this->session->flashdata('error');
    if (isset($message)) {
        echo '<script> swal("warning!", "Something get wrong", "warning");</script>';
         $this->session->unset_userdata('error');	
    }

    ?>

	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
		
			</div>

			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div>
						<span class="shadow align-middle dot-white"><a href="<?php echo base_url()?>index.php/credit_manager_user/CAM_Applicant_Details?ID=<?php echo $row->UNIQUE_CODE;?>"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></a></span>				
					</div>
					
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
					<div>
						<span class="align-middle dot"><a href=""><a href="<?php echo base_url()?>index.php/credit_manager_user/Document_verification"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></a></span>
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
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;"> Applicant Documents Details</span>

			</div>
			
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">PAN NO Verification Status</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="pan_verify" value="true" <?php if(!empty($row_more))if ($row_more->VERIFY_PAN == 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="pan_verify" value="false" <?php if(!empty($row_more))if ($row_more->VERIFY_PAN == 'false'|| $row_more->VERIFY_PAN == 'NULL' || $row_more->VERIFY_PAN == '') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php if(!empty($row_more)){ if($row_more->Passport_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="passport_no"   value="<?php if(!empty($row_more)){ echo $row_more->Passport_Number;}?>">
						</div> 	
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number Verification</span>
				</div>			
				<div class="w-100"></div>
				
				 	
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="passport_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Passport_no == 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="passport_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Passport_no == 'false'|| $row_more->verify_Passport_no == 'NULL' || $row_more->verify_Passport_no == '') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php }} ?>
				<?php if(!empty($data_incomedetails))if($data_incomedetails->CUST_TYPE=='salaried')
				{
				if(!empty($row_more)){ if($row_more->EPFO_Number_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled  placeholder="" class="input-cust-name" type="text" name="vechical_no" id="vechical_no"   value="<?php if(!empty($row_more)){if($row_more->EPFO_Number_available=='yes'){echo $row_more->EPFO_Number; }}?>" <?php if($row_more->EPFO_Number=='no' || $row_more->EPFO_Number=='NULL' || $row_more->EPFO_Number=='') {echo 'readonly';} ?>>
						</div> 
						<div style="margin-top: 0px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number verification</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;" >
								<div class="row">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  disabled type="radio" name="EPFO_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_EPFO_Number== 'true') echo ' checked="true"'; ?>> Yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled type="radio" name="EPFO_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_EPFO_Number== 'false'|| $row_more->verify_EPFO_Number== 'NULL' || $row_more->verify_EPFO_Number== '') echo ' checked="true"'; ?>> No
									</div>
								</div>						
							</div>  	
						</div> 
				<?php } } }?>
				
				<?php if(!empty($data_incomedetails))if($data_incomedetails->CUST_TYPE=='self employeed')
				{?>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">IT returns</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="IT_Returns_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_It_Returns== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="IT_Returns_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_It_Returns== 'false'|| $row_more->verify_It_Returns== 'NULL' || $row_more->verify_It_Returns== '') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">GST Number</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="GST_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_GST_status== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="GST_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_GST_status== 'false'|| $row_more->verify_GST_status== 'NULL' || $row_more->verify_GST_status== '') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Professional certificate</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="Certificate_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Professional_Certificate== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="Certificate_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Professional_Certificate== 'false'|| $row_more->verify_Professional_Certificate== 'NULL' || $row_more->verify_Professional_Certificate== '') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php } ?>

				
  			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				

  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Aadhar No Verification Status</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >	
						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="aadhar_verify" value="true" <?php if(!empty($row_more))if ($row_more->STATUS =='Aadhar E-sign complete') echo 'checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="aadhar_verify" value="false"<?php if(!empty($row_more))if ($row_more->STATUS =='' || $row_more->STATUS =='NULL' || $row_more->STATUS =='Personal details complete' || $row_more->STATUS =='Income details complete'||$row_more->STATUS =='Document upload complete'|| $row_more->STATUS =='Credit bureau Score received'|| $row_more->STATUS =='Loan application complete' ) echo 'checked="true"'; ?> > No
	  						</div>
  						</div>	
					</div>
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="mobile_verify" value="true" checked="true" > Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="mobile_verify" value="false" > No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php if(!empty($row_more)){ if($row_more->Driving_l_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="Driving_l_Number"   value="<?php if(!empty($row_more)){ echo $row_more->Driving_l_Number;}?>">
						</div> 	
						<div style="margin-top: 0px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number Verification</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;" >
								<div class="row">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  disabled type="radio" name="Driving_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Driving_l_Number== 'true') echo ' checked="true"'; ?>> Yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled type="radio" name="Driving_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Driving_l_Number== 'false'|| $row_more->verify_Driving_l_Number== 'NULL' || $row_more->verify_Driving_l_Number== '') echo ' checked="true"'; ?>> No
									</div>
								</div>						
							</div>  	
						</div> 
				 	<?php }} ?>
					<?php if(!empty($data_incomedetails))if($data_incomedetails->CUST_TYPE=='salaried')
					{
					if(!empty($row_more)){ if($row_more->Account_Number_available=='yes'){?>
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account  Number</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled  placeholder="" class="input-cust-name" type="text" name="Account_Number" id="Account_Number"   value="<?php if(!empty($row_more)){if($row_more->Account_Number_available=='yes'){echo $row_more->Account_Number; }}?>" <?php if($row_more->Account_Number_available=='no' || $row_more->Account_Number_available=='NULL' || $row_more->Account_Number_available=='') {echo 'readonly';} ?>>
							</div> 
							<div style="margin-top: 0px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number verification</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<div class="input-cust-name" style=" margin-top: 8px;" >
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input  disabled type="radio" name="Acc_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Account_Number== 'true') echo ' checked="true"'; ?>> Yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled type="radio" name="Acc_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Account_Number== 'false'|| $row_more->verify_Account_Number== 'NULL' || $row_more->verify_Account_Number== '') echo ' checked="true"'; ?>> No
										</div>
									</div>						
								</div>  	
							</div> 
					<?php } } }?>

				
				<?php if(!empty($data_incomedetails))if($data_incomedetails->CUST_TYPE=='self employeed')
				{?>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Udyog Aadhar</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="Udyog_Aadhar_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Udyog_Aadhar== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="Udyog_Aadhar_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Udyog_Aadhar== 'false'|| $row_more->verify_Udyog_Aadhar== 'NULL' || $row_more->verify_Udyog_Aadhar== '') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Residence Verification</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="Residence_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Residence== 'true') echo ' checked="true"'; ?>> Positive
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="Residence_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Residence== 'false'|| $row_more->verify_Residence== 'NULL' || $row_more->verify_Residence== '') echo ' checked="true"'; ?>> Negative
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Comments If Any About Residence Verification</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input style="margin-top: 8px;" class="input-cust-name" type="text" disabled  name="Residence_Comment"   value="<?php if(!empty($row_more)){echo $row_more->Recidance_Comment;}?>">	
  				</div> 
				<?php } ?>
				
				
  			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address Match with Aadhar</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="add_verify" value="true" <?php if(!empty($address_flag))if ($address_flag== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="add_verify" value="false" <?php if(!empty($address_flag))if ($address_flag== 'false') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email Id</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="Email_verify" value="true" <?php if(!empty($email_flag))if ($email_flag== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="Email_verify" value="false" <?php if(!empty($email_flag))if ($email_flag== 'false') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php if(!empty($row_more)){ if($row_more->Vechical_NO_available=='yes'){?>
			
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled  placeholder="" class="input-cust-name" type="text" name="vechical_no" id="vechical_no"   value="<?php if(!empty($row_more)){if($row_more->Vechical_NO_available=='yes'){echo $row_more->Vechical_Number; }}?>" <?php if($row_more->Vechical_NO_available=='no' || $row_more->Vechical_NO_available=='NULL' || $row_more->Vechical_NO_available=='') {echo 'readonly';} ?>>
						</div> 	
						<div style="margin-top: 0px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number Verification</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;" >
								<div class="row">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  disabled type="radio" name="Vechical_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Vechical== 'true') echo ' checked="true"'; ?>> Yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled type="radio" name="Vechical_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Vechical== 'false'|| $row_more->verify_Vechical== 'NULL' || $row_more->verify_Vechical== '') echo ' checked="true"'; ?>> No
									</div>
								</div>						
							</div>  	
						</div> 
				<?php } } ?>
				
				
			
				<?php if(!empty($data_incomedetails))if($data_incomedetails->CUST_TYPE=='salaried')
				{
				if(!empty($row_more)){ if($row_more->Official_mail_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official mail</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled  placeholder="" class="input-cust-name" type="text" name="Official_mail_available" id="Official_mail_available"   value="<?php if(!empty($row_more)){if($row_more->Official_mail_available=='yes'){echo $row_more->Official_mail; }}?>" <?php if($row_more->Official_mail_available=='no' || $row_more->Official_mail_available=='NULL' || $row_more->Official_mail_available=='') {echo 'readonly';} ?>>
						</div> 
						<div style="margin-top: 0px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official mail verification</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;" >
								<div class="row">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  disabled type="radio" name="verify_Official_Mail" value="true" <?php if(!empty($row_more))if ($row_more->verify_Official_Mail== 'true') echo ' checked="true"'; ?>> Yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled type="radio" name="verify_Official_Mail" value="false" <?php if(!empty($row_more))if ($row_more->verify_Official_Mail== 'false'|| $row_more->verify_Official_Mail== 'NULL' || $row_more->verify_Official_Mail== '') echo ' checked="true"'; ?>> No
									</div>
								</div>						
							</div>  	
						</div> 
				<?php } } }?>
				<?php if(!empty($data_incomedetails))if($data_incomedetails->CUST_TYPE=='self employeed')
				{?>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Shop Act</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="Shop_Act_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Shop_Act== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="Shop_Act_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Shop_Act== 'false'|| $row_more->verify_Shop_Act== 'NULL' || $row_more->verify_Shop_Act== '') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Employement/ Business Verification </span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="Employement_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Employment== 'true') echo ' checked="true"'; ?>>Positive
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="Employement_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Employment== 'false'|| $row_more->verify_Employment== 'NULL' || $row_more->verify_Employment== '') echo ' checked="true"'; ?>> Negative
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Comments If Any About Employement Verification</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input style="margin-top: 8px;" class="input-cust-name" type="text" disabled  name="Residence_Comment"   value="<?php if(!empty($row_more)){echo $row_more->Employment_Comment;}?>">	
  				</div> 
				<?php } ?>
  			</div>	
		</div>
		
		<!----------------------------------Co-applicant details ------------------------------- -->


        <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>		
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;"> Co-Applicant Documents Details <?php echo $i;?></span>

			</div>
			
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">PAN NO Verification Status</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="pan_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->VERIFY_PAN == 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="pan_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->VERIFY_PAN == 'false'|| $coapplicant->VERIFY_PAN == 'NULL' || $coapplicant->VERIFY_PAN == '') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php if(!empty($coapplicant)){ if($coapplicant->Passport_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="passport_no_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){ echo $coapplicant->Passport_Number;}?>">
						</div> 	
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number Verification</span>
				</div>			
				<div class="w-100"></div>
				
				 	
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="passport_verify_<?php echo $i;?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Passport_no == 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="passport_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Passport_no == 'false'|| $coapplicant->verify_Passport_no == 'NULL' || $coapplicant->verify_Passport_no == '') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php }} ?>
				<?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried')
				{
				if(!empty($row_more)){ if($row_more->EPFO_Number_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled  placeholder="" class="input-cust-name" type="text" name="vechical_no" id="vechical_no"   value="<?php if(!empty($row_more)){if($row_more->EPFO_Number_available=='yes'){echo $row_more->EPFO_Number; }}?>" <?php if($row_more->Vechical_NO_available=='no' || $row_more->Vechical_NO_available=='NULL' || $row_more->Vechical_NO_available=='') {echo 'readonly';} ?>>
						</div> 
						<div style="margin-top: 0px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number verification</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;" >
								<div class="row">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  disabled type="radio" name="EPFO_verify_<?php echo $i;?>" value="true" <?php if(!empty($row_more))if ($row_more->verify_EPFO_Number== 'true') echo ' checked="true"'; ?>> Yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled type="radio" name="EPFO_verify__<?php echo $i;?>" value="false" <?php if(!empty($row_more))if ($row_more->verify_EPFO_Number== 'false'|| $row_more->verify_EPFO_Number== 'NULL' || $row_more->verify_EPFO_Number== '') echo ' checked="true"'; ?>> No
									</div>
								</div>						
							</div>  	
						</div> 
				<?php } } }?>
				<?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='self employeed')
				{?>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">IT returns</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="IT_Returns_verify_<?php echo $i;?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_It_Returns== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="IT_Returns_verify_<?php echo $i;?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_It_Returns== 'false'|| $coapplicant->verify_It_Returns== 'NULL' || $coapplicant->verify_It_Returns== '') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php if(!empty($coapplicant))if ($coapplicant->BIS_GST!= ' ' && $coapplicant->BIS_GST!= '' && $coapplicant->BIS_GST!='NULL')
				{?>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">GST Number</span>
				</div>	
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->BIS_GST;}?>">
				</div>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">GST Number Verification</span>
				</div>	
               			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="GST_verify_<?php echo $i;?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_GST_status== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="GST_verify_<?php echo $i;?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_GST_status== 'false'|| $coapplicant->verify_GST_status== 'NULL' || $coapplicant->verify_GST_status== '') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php }  ?>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Professional certificate</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="Certificate_verify_<?php echo $i;?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Professional_Certificate== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="Certificate_verify_<?php echo $i;?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Professional_Certificate== 'false'|| $coapplicant->verify_Professional_Certificate== 'NULL' || $coapplicant->verify_Professional_Certificate== '') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Residence Verification</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="Residence_verify_<?php echo $i;?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Residence== 'true') echo ' checked="true"'; ?>> Positive
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="Residence_verify_<?php echo $i;?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Residence== 'false'|| $coapplicant->verify_Residence== 'NULL' || $coapplicant->verify_Residence== '') echo ' checked="true"'; ?>> Negative
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Comments If Any About Residence Verification</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input style="margin-top: 8px;" class="input-cust-name" type="text" disabled  name="Residence_Comment_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){echo $coapplicant->Recidance_Comment;}?>">	
  				</div> 
				<?php } ?>
				
  			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				

  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Aadhar No Verification Status</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >	
						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="aadhar_verify_<?php echo $i;?>" value="true" > Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="aadhar_verify_<?php echo $i;?>" value="false" checked="true" > No
	  						</div>
  						</div>	
					</div>
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="mobile_verify_<?php echo $i;?>" value="true"  > Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="mobile_verify_<?php echo $i;?>" value="false" checked="true" > No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php if(!empty($coapplicant)){ if($coapplicant->Vechical_NO_available=='yes'){?>
			
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled  placeholder="" class="input-cust-name" type="text" name="vechical_no_<?php echo $i; ?>" id="vechical_no_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){if($coapplicant->Vechical_NO_available=='yes'){echo $coapplicant->Vechical_Number; }}?>" <?php if($coapplicant->Vechical_NO_available=='no' || $coapplicant->Vechical_NO_available=='NULL' || $coapplicant->Vechical_NO_available=='') {echo 'readonly';} ?>>
						</div> 	
						<div style="margin-top: 0px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number Verification</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;" >
								<div class="row">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  disabled type="radio" name="Vechical_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Vechical== 'true') echo ' checked="true"'; ?>> Yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled type="radio" name="Vechical_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Vechical== 'false'|| $coapplicant->verify_Vechical== 'NULL' || $coapplicant->verify_Vechical== '') echo ' checked="true"'; ?>> No
									</div>
								</div>						
							</div>  	
						</div> 
				<?php } } ?>
				<?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried')
					{
					if(!empty($coapplicant)){ if($coapplicant->Account_Number_available=='yes'){?>
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account  Number</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled  placeholder="" class="input-cust-name" type="text" name="Account_Number_<?php echo $i; ?>" id="Account_Number_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){if($coapplicant->Account_Number_available=='yes'){echo $coapplicant->Account_Number; }}?>" <?php if($coapplicant->Account_Number_available=='no' || $coapplicant->Account_Number_available=='NULL' || $coapplicant->Account_Number_available=='') {echo 'readonly';} ?>>
							</div> 
							<div style="margin-top: 0px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number verification</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<div class="input-cust-name" style=" margin-top: 8px;" >
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input  disabled type="radio" name="Acc_verify<?php echo $i; ?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Account_Number== 'true') echo ' checked="true"'; ?>> Yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled type="radio" name="Acc_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Account_Number== 'false'|| $coapplicant->verify_Account_Number== 'NULL' || $coapplicant->verify_Account_Number== '') echo ' checked="true"'; ?>> No
										</div>
									</div>						
								</div>  	
							</div> 
					<?php } } }?>
				
				
				
				<?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='self employeed')
				{?>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Udyog Aadhar</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="Udyog_Aadhar_verify_<?php echo $i;?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Udyog_Aadhar== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="Udyog_Aadhar_verify_<?php echo $i;?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Udyog_Aadhar== 'false'|| $coapplicant->verify_Udyog_Aadhar== 'NULL' || $coapplicant->verify_Udyog_Aadhar== '') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				
				
				<?php } ?>
  			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address Match with Aadhar</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="add_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapp_add_flag))if ($coapp_add_flag[$i]== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="add_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapp_add_flag))if ($coapp_add_flag[$i]== 'false') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email Id</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="Email_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapp_email_flag))if ($coapp_email_flag[$i]== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="Email_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapp_email_flag))if ($coapp_email_flag[$i]== 'false') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php if(!empty($coapplicant)){ if($coapplicant->Driving_l_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="Driving_l_Number"   value="<?php if(!empty($coapplicant)){ echo $coapplicant->Driving_l_Number;}?>">
						</div> 	
						<div style="margin-top: 0px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number Verification</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;" >
								<div class="row">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  disabled type="radio" name="Driving_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Driving_l_Number== 'true') echo ' checked="true"'; ?>> Yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled type="radio" name="Driving_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Driving_l_Number== 'false'|| $coapplicant->verify_Driving_l_Number== 'NULL' || $coapplicant->verify_Driving_l_Number== '') echo ' checked="true"'; ?>> No
									</div>
								</div>						
							</div>  	
						</div> 
				 	<?php }} ?>
				<?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried')
				{
				if(!empty($row_more)){ if($row_more->Official_mail_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official mail</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled  placeholder="" class="input-cust-name" type="text" name="Official_mail_available_<?php echo $i; ?>" id="Official_mail_available"   value="<?php if(!empty($coapplicant)){if($coapplicant->Official_mail_available=='yes'){echo $coapplicant->Official_mail; }}?>" <?php if($coapplicant->Official_mail_available=='no' || $coapplicant->Official_mail_available=='NULL' || $coapplicant->Official_mail_available=='') {echo 'readonly';} ?>>
						</div> 
						<div style="margin-top: 0px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official mail verification</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;" >
								<div class="row">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  disabled type="radio" name="verify_Official_Mail_<?php echo $i;?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Official_Mail== 'true') echo ' checked="true"'; ?>> Yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled type="radio" name="verify_Official_Mail_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Official_Mail== 'false'|| $coapplicant->verify_Official_Mail== 'NULL' || $coapplicant->verify_Official_Mail== '') echo ' checked="true"'; ?>> No
									</div>
								</div>						
							</div>  	
						</div> 
				<?php } } }?>
				<?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='self employeed')
				{?>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Shop Act</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="Shop_Act_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Shop_Act== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="Shop_Act_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Shop_Act== 'false'|| $coapplicant->verify_Shop_Act== 'NULL' || $coapplicant->verify_Shop_Act== '') echo ' checked="true"'; ?>> No
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Employement/ Business Verification </span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="Employement_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Employment== 'true') echo ' checked="true"'; ?>>Positive
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="Employement_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Employment== 'false'|| $coapplicant->verify_Employment== 'NULL' || $coapplicant->verify_Employment== '') echo ' checked="true"'; ?>> Negative
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Comments If Any About Employement Verification</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input style="margin-top: 8px;" class="input-cust-name" type="text" disabled  name="Residence_Comment_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){echo $coapplicant->Employment_Comment;}?>">	
  				</div> 
				<?php } ?>
  			</div>	
		</div>
		<?php $i++;}?>		
	


        	
	</div>
	<div class="row shadow bg-white rounded margin-10 padding-15" >
				<div class="row col-12 justify-content-center">
					<div>
						<a href="<?php echo base_url()?>index.php/credit_manager_user/Credit_Analysis">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							NEXT
						</button></a>
					</div>		
				</div>					
			</div>