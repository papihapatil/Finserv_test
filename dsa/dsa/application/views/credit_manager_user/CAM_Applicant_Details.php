
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

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
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
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
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
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Loan Details</span>

			</div>
			
			<div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
				    <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Applicant ID</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($row)){ echo $row->UNIQUE_CODE;}?>">
	  				</div>
					
	  				<div class="w-100"></div>

	  			    <div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan amount applied for </span>
					</div>		
					<div class="w-100"></div>
	  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($appliedloan)){ echo $appliedloan->DESIRED_LOAN_AMOUNT;}?>">
	  				</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Tenure</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled  class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
								title="Phone number with 7-9 and remaing 9 digit with 0-9" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php if(!empty($appliedloan)){ echo $appliedloan->TENURE;}?>">
						</div>
					
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			    <div style="margin-left: 35px;  margin-top: 8px;" class="col">
			        <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Name of the Applicant </span>
				</div>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input style="margin-top: 8px;" class="input-cust-name" type="text" disabled id="f_name" name="f_name" minlength="5" maxlength="30" required value="<?php if(!empty($row)){echo $row->FN;}?>">
	  					<input disabled style="margin-top: 8px;"  class="input-cust-name" type="text" name="m_name"  value="<?php if(!empty($row)){ echo $row->MN;}?>">
	  					<input disabled style="margin-top: 8px;" class="input-cust-name" type="text" name="l_name" minlength="5" maxlength="30" required  value="<?php if(!empty($row)){echo $row->LN;}?>">
	  				</div>
				

  				<div class="w-100"></div>
				<?php if(!empty($appliedloan)){if($appliedloan->LOAN_TYPE=='home'){?>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan Sub type</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="YEARS_IN_CITY_LIVING"   value="<?php if(!empty($appliedloan)){ if($appliedloan->HOME_LOAN_TYPE=="NULL" || $appliedloan->HOME_LOAN_TYPE==""){echo "";}else{echo $appliedloan->HOME_LOAN_TYPE;}} ?>">
  				</div> 
				<?php }}?>

  				<div class="w-100"></div>
				
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				    <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-users"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of co applicants</span>
				</div>
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled  class="input-cust-name" type="email" name="email" value="<?php if(!empty($no_of_coapplicant)){echo $no_of_coapplicant;}?>">
  				</div> 
                <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				    <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Product</span>
				</div>		
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="AGE"   value="<?php if(!empty($appliedloan)){ echo $appliedloan->LOAN_TYPE;} ;?>">
  				</div> 	
               	
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				    <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Customer Type</span>
				</div>
				<div class="w-100"></div>
	  			<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input disabled required  class="input-cust-name" type="text" name="OCCUPATION"  value="<?php if(!empty($income_details)){ echo $income_details->CUST_TYPE;} ?>">
	  			</div>
                				
  			</div>  			
		</div>
<!--------------Sourcing Details---------------------------->
<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Sourcing Details</span>

			</div>
			
			<div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
				    <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">DSA Name</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($dsa_name)){ echo $dsa_name;}?>">
	  				</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">State</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($row_more)){ echo $row_more->RES_ADDRS_STATE;}?>">
	  				</div>
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			        <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">DSA Name</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($row)){ echo $row->DSA_ID;}?>">
	  				</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">City</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($row_more)){ echo $row_more->RES_ADDRS_CITY;}?>">
	  				</div>
				

  				
  				
  			</div>	
  			
		</div>
<!-------------------------------------------------------------->
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
	  					<input style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text" disabled id="f_name" name="f_name" minlength="5" maxlength="30" required value="<?php if(!empty($row)){ echo $row->FN;}?>">
	  					<input disabled style="margin-top: 8px;" placeholder="Middel Name (Optional)" class="input-cust-name" type="text" name="m_name"  value="<?php if(!empty($row)){ echo $row->MN;}?>">
	  					<input disabled style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="l_name" minlength="5" maxlength="30" required  value="<?php if(!empty($row)){ echo $row->LN;}?>">
	  				</div>
	  				<div class="w-100"></div>
					 <div style=" margin-top: 8px;" class="col">
					   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Age</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
							title="Phone number with 7-9 and remaing 9 digit with 0-9" name="AGE"   value="<?php if(!empty($row)){ echo $row->AGE;}?>">
					</div> 
					
					<div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Current address</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
							title="Phone number with 7-9 and remaing 9 digit with 0-9" name="YEARS_IN_CITY_LIVING"   value="<?php if(!empty($row_more)){  echo $row_more->RES_ADDRS_PROPERTY_TYPE;}?>">
					</div> 	
					 <div style=" margin-top: 8px;" class="col">
					    <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Stability at current address</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
							title="Phone number with 7-9 and remaing 9 digit with 0-9" name="LIVING_YEAR_PRESENT_ADDRESS"   value="<?php if(!empty($row_more)){ echo $row_more->RES_ADDRS_NO_YEARS_LIVING;}?>">
					</div> 
					<div style=" margin-top: 8px;" class="col">
					    <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Permanent Address</span>
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
					<?php if(!empty($row_more)){ if($row_more->Driving_l_available=='no' || $row_more->Driving_l_available=='NULL' || $row_more->Driving_l_available==''){?>
						<div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Available *</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
								<div class="row">
								
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled type="radio" name="Driving_l_available" value="yes" <?php if(!empty($row_more)){ if($row_more->Driving_l_available=='yes'){ echo 'checked';}}?>> yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled <?php if(!empty($row_more)){ if($row_more->Driving_l_available=='no' || $row_more->Driving_l_available=='NULL' || $row_more->Driving_l_available==''){ echo 'checked';}}?> type="radio" name="Driving_l_available" value="no"> no
									</div>
									
								</div>	
							</div>  
							
						</div>
				<?php } }if(!empty($row_more)){ if($row_more->Driving_l_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="Driving_l_Number"   value="<?php if(!empty($row_more)){ echo $row_more->Driving_l_Number;}?>">
						</div> 	
				 	<?php }} ?>
					<?php if(!empty($income_details))if($income_details->CUST_TYPE=='salaried'){?>
						<?php if(!empty($row_more)){ if($row_more->EPFO_Number_available=='no' || $row_more->EPFO_Number_available=='NULL' || $row_more->EPFO_Number_available==''){?>
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number Available *</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;" class="col">
								<div class="input-cust-name" style=" margin-top: 8px;">
									<div class="row">
									
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled type="radio" name="EPFO_Number_available" value="yes" <?php if(!empty($row_more)){ if($row_more->EPFO_Number_available=='yes'){ echo 'checked';}}?>> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled <?php if(!empty($row_more)){ if($row_more->EPFO_Number_available=='no' || $row_more->EPFO_Number_available=='NULL' || $row_more->EPFO_Number_available==''){ echo 'checked';}}?> type="radio" name="EPFO_Number_available" value="no"> no
										</div>
										
									</div>	
								</div>  
								
							</div>
							<?php } }if(!empty($row_more)){ if($row_more->EPFO_Number_available=='yes'){?>
									<div style=" margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number</span>
									</div>			
									<div class="w-100"></div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled placeholder="" class="input-cust-name" type="text" name="EPFO_Number"   value="<?php if(!empty($row_more)){ echo $row_more->EPFO_Number;}?>">
									</div> 	
							<?php }} ?>
						
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
  								<input disabled checked="true" type="radio" name="gender" value="male"> Male
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="gender" value="female" <?php if(!empty($row)){  if ($row->GENDER == 'female') echo ' checked="true"'; }?>> Female
	  						</div>
  						</div>						
  					</div>  					
  				</div>
				<div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Birth *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input disabled required max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="dob"  value="<?php if(!empty($row)){  echo $row->DOB;}?>">
	  			</div>
				<div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Occupation </span>
					</div>
					<div class="w-100"></div>
	  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input disabled required  class="input-cust-name" type="text" name="OCCUPATION"  value="<?php if(!empty($income_details)){ echo $income_details->CUST_TYPE;}?>">
	  			</div>
				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email-Id *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="Enter emial-Id *" class="input-cust-name" type="email" name="email" value="<?php if(!empty($row)){ echo $row->EMAIL;}?>">
  				</div> 

  				<div class="w-100"></div>

  				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row->MOBILE;?>">
  				</div> 
  				<div class="w-100"></div>
                <div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-users"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of Dependants </span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="NO_OF_DEPENDANTS"   value="<?php if(!empty($row_more)){ echo $row_more->NO_OF_DEPENDANTS;}?>">
  				</div> 				
				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-globe"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Native Place </span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="NATIVE_PLACE"   value="<?php if(!empty($row_more)){ echo $row_more->NATIVE_PLACE;}?>">
  				</div> 
				<?php if(!empty($row_more)){ if($row_more->Vechical_NO_available=='no' || $row_more->Vechical_NO_available=='NULL' || $row_more->Vechical_NO_available==''){?>
						<div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number Available *</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
								<div class="row">
								
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled type="radio" name="Vechical_NO_available" value="yes" <?php if(!empty($row_more)){ if($row_more->Vechical_NO_available=='yes'){ echo 'checked';}}?>> yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled <?php if(!empty($row_more)){ if($row_more->Vechical_NO_available=='no' || $row_more->Vechical_NO_available=='NULL' || $row_more->Vechical_NO_available==''){ echo 'checked';}}?> type="radio" name="Vechical_NO_available" value="no"> no
									</div>
									
								</div>	
							</div>  
							
						</div>
				<?php } }if(!empty($row_more)){ if($row_more->Vechical_NO_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="Vechical_Number"   value="<?php if(!empty($row_more)){ echo $row_more->Vechical_Number;}?>">
						</div> 	
				 	<?php }} ?>
					<?php if(!empty($income_details))if($income_details->CUST_TYPE=='salaried'){?>
				<?php if(!empty($row_more)){ if($row_more->Official_mail_available=='no' || $row_more->Official_mail_available=='NULL' || $row_more->Official_mail_available==''){?>
					<div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official Mail Available *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;" class="col">
						<div class="input-cust-name" style=" margin-top: 8px;">
							<div class="row">
							
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled type="radio" name="official_avl" value="yes" <?php if(!empty($row_more)){ if($row_more->Official_mail_available=='yes'){ echo 'checked';}}?>> yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled <?php if(!empty($row_more)){ if($row_more->Official_mail_available=='no' || $row_more->Official_mail_available=='NULL' || $row_more->Official_mail_available==''){ echo 'checked';}}?> type="radio" name="official_avl" value="no"> no
								</div>
								
							</div>	
						</div>  
						
					</div>
					<?php } }if(!empty($row_more)){ if($row_more->Official_mail_available=='yes'){?>
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official Mail</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled placeholder="" class="input-cust-name" type="text" name="passport_no"   value="<?php if(!empty($row_more)){ echo $row_more->Official_mail;}?>">
							</div> 	
						<?php }} ?>
				
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
  								<input disabled type="radio" name="marital" value="married" checked="true"> Married
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled <?php if(!empty($row)){ if ($row->MARTIAL_STATUS == 'single') echo ' checked="true"';} ?> type="radio" name="marital" value="single"> Single
	  						</div>
							
  						</div>	
  					</div>  
					
  				</div>	
				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Highest Education  *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<select disabled class="input-cust-name" name="education_type" > 
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
						<input disabled style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_1;?>">
						<input disabled style="margin-top: 8px;" placeholder="Address Line 2 *" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_2;?>">
						<input disabled style="margin-top: 8px;" placeholder="Address Line 3 *" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_3;?>">
				</div>  
                	
                 <div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Stability in City</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="YEARS_IN_CITY_LIVING"   value="<?php if(!empty($row_more)){ echo $row_more->RES_ADDRS_NO_YEARS_LIVING;}?>">
  				</div> 	
				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Current and Permanent Address same*</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;">
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input disabled type="radio" name="app_yes" value="yes" checked="true"> yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled <?php if(!empty($row_more)){ if($row_more->RES_ADDRS_LINE_1!=$row_more->PER_ADDRS_LINE_1){ echo 'checked';}}?> type="radio" name="app_yes" value="no"> no
	  						</div>
							
  						</div>	
  					</div>  
					
  				</div>	
				<?php if(!empty($row_more)){ if($row_more->Passport_available=='no' || $row_more->Passport_available=='NULL' || $row_more->Passport_available==''){?>
				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number Available *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;">
  						<div class="row">
						
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input disabled type="radio" name="passport_avl" value="yes" <?php if(!empty($row_more)){ if($row_more->Passport_available=='yes'){ echo 'checked';}}?>> yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled <?php if(!empty($row_more)){ if($row_more->Passport_available=='no' || $row_more->Passport_available=='NULL' || $row_more->Passport_available==''){ echo 'checked';}}?> type="radio" name="passport_avl" value="no"> no
	  						</div>
							
  						</div>	
  					</div>  
					
  				</div>
				<?php } }if(!empty($row_more)){ if($row_more->Passport_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="passport_no"   value="<?php if(!empty($row_more)){ echo $row_more->Passport_Number;}?>">
						</div> 	
				 	<?php }} ?>
				<?php if(!empty($income_details))if($income_details->CUST_TYPE=='salaried'){?>
				<?php if(!empty($row_more)){ if($row_more->Account_Number_available=='no' || $row_more->Account_Number_available=='NULL' || $row_more->Account_Number_available==''){?>
					<div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number Available *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;" class="col">
						<div class="input-cust-name" style=" margin-top: 8px;">
							<div class="row">
							
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled type="radio" name="passport_avl" value="yes" <?php if(!empty($row_more)){ if($row_more->Account_Number_available=='yes'){ echo 'checked';}}?>> yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled <?php if(!empty($row_more)){ if($row_more->Account_Number_available=='no' || $row_more->Account_Number_available=='NULL' || $row_more->Account_Number_available==''){ echo 'checked';}}?> type="radio" name="passport_avl" value="no"> no
								</div>
								
							</div>	
						</div>  
						
					</div>
					<?php } }if(!empty($row_more)){ if($row_more->Account_Number_available=='yes'){?>
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled placeholder="" class="input-cust-name" type="text" name="passport_no"   value="<?php if(!empty($row_more)){ echo $row_more->Account_Number;}?>">
							</div> 	
						<?php }} ?>
				
				<?php } ?>
				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Locality type *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="Enter Locality type *" class="input-cust-name" type="text" name="Locality_type" value="<?php if(!empty($row_more)){ echo $row_more->Locality_type;}?>">
  				</div> 
				
				
               				
  			</div>  			
		</div>
<!----------------------------------Co-applicant details ------------------------------- -->


        <?php $i=0; foreach ($coapplicants as $coapplicant) { ?>		
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Co-Applicant Details</span>

			</div>
			
			
			<div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Name of Co-Applicant *</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text" disabled id="f_name" name="f_name" minlength="5" maxlength="30" required value="<?php if(!empty($coapplicant)){echo $coapplicant->FN;}?>">
	  					<input disabled style="margin-top: 8px;" placeholder="Middel Name (Optional)" class="input-cust-name" type="text" name="m_name"  value="<?php if(!empty($coapplicant)){echo $coapplicant->MN;}?>">
	  					<input disabled style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="l_name" minlength="5" maxlength="30" required  value="<?php if(!empty($coapplicant)){echo $coapplicant->LN;}?>">
	  				</div>
	  				<div class="w-100"></div>

	  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Birth *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input disabled required max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="dob"  value="<?php if(!empty($coapplicant)){echo $coapplicant->DOB;}?>">
	  				</div>
					<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Occupation </span>
					</div>
					<div class="w-100"></div>
	  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input disabled required  class="input-cust-name" type="text" name="OCCUPATION"  value="<?php if(!empty($coapplicant)){echo $coapplicant->COAPP_TYPE;}?>">
	  				</div>
					<div style="margin-top: 10px;" class="col">
					    <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Stability at current address</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
							title="Phone number with 7-9 and remaing 9 digit with 0-9" name="LIVING_YEAR_PRESENT_ADDRESS"   value="<?php if(!empty($coapplicant)){echo $coapplicant->RES_ADDRS_NO_YEARS_LIVING;}?>">
					</div> 
					<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Residential address</span>
					</div>			
					<div class="w-100"></div>
					
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<input disabled style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_LINE_1;?>">
						<input disabled style="margin-top: 8px;" placeholder="Address Line 2 *" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_LINE_2;?>">
						<input disabled style="margin-top: 8px;" placeholder="Address Line 3 *" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_LINE_3;?>">
					</div>  
					<?php if(!empty($coapplicant)){ if($coapplicant->Driving_l_available=='no' || $coapplicant->Driving_l_available=='NULL' || $coapplicant->Driving_l_available==''){?>
						<div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Available *</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
								<div class="row">
								
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled type="radio" name="Driving_l_available_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Driving_l_available=='yes'){ echo 'checked';}}?>> yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled <?php if(!empty($coapplicant)){ if($coapplicant->Driving_l_available=='no' || $coapplicant->Driving_l_available=='NULL' || $coapplicant->Driving_l_available==''){ echo 'checked';}}?> type="radio" name="Driving_l_available_<?php echo $i; ?>" value="no"> no
									</div>
									
								</div>	
							</div>  
							
						</div>
				<?php } }if(!empty($coapplicant)){ if($coapplicant->Driving_l_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="Driving_l_Number"   value="<?php if(!empty($coapplicant)){ echo $coapplicant->Driving_l_Number;}?>">
						</div> 	
				 	<?php }} ?>
					<?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried'){?>
				   <?php if(!empty($coapplicant)){ if($coapplicant->Account_Number_available=='no' || $coapplicant->Account_Number_available=='NULL' || $coapplicant->Account_Number_available==''){?>
					<div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number Available *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;" class="col">
						<div class="input-cust-name" style=" margin-top: 8px;">
							<div class="row">
							
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled type="radio" name="Acc_avl_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Account_Number_available=='yes'){ echo 'checked';}}?>> yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled <?php if(!empty($coapplicant)){ if($coapplicant->Account_Number_available=='no' || $coapplicant->Account_Number_available=='NULL' || $coapplicant->Account_Number_available==''){ echo 'checked';}}?> type="radio" name="Acc_avl_<?php echo $i; ?>" value="no"> no
								</div>
								
							</div>	
						</div>  
						
					</div>
					<?php } }if(!empty($coapplicant)){ if($coapplicant->Account_Number_available=='yes'){?>
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled placeholder="" class="input-cust-name" type="text" name="passport_no"   value="<?php if(!empty($coapplicant)){ echo $coapplicant->Account_Number;}?>">
							</div> 	
						<?php }} ?>
				
				<?php } ?>				
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email-Id *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="Enter emial-Id *" class="input-cust-name" type="email" name="email" value="<?php if(!empty($coapplicant)){echo $coapplicant->EMAIL;}?>">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php  if(!empty($coapplicant)){ echo $coapplicant->MOBILE;}?>">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Education *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<select disabled class="input-cust-name" name="education_type" > 
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
				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-users"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of Dependants </span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="NO_OF_DEPENDANTS"   value="<?php if(!empty($coapplicant)){echo $coapplicant->NO_OF_DEPENDANTS;;}?>">
  				</div> 
				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-globe"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Native Place </span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="NATIVE_PLACE"   value="<?php if(!empty($coapplicant)){ echo $coapplicant->NATIVE_PLACE;}?>">
  				</div> 
				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Permanent Address</span>
				</div>			
				<div class="w-100"></div>
  				<?php $perAddPresent = false; if(!empty($row_more))if($row_more->PER_ADDRS_LINE_1!=''){$perAddPresent = true;}?>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<?php if(!empty($coapplicant)) { ?>
	  					<input style="margin-top: 1px;" disabled placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1"  id="per_add_1" value="<?php echo $perAddPresent? $coapplicant->PER_ADDRS_LINE_1 : $coapplicant->RES_ADDRS_LINE_1 ;?>">
	  					<input style="margin-top: 8px;" disabled placeholder="Address Line 2 *" class="input-cust-name" type="text" name="per_add_2"  id="per_add_2" value="<?php echo $perAddPresent? $coapplicant->PER_ADDRS_LINE_2 : $coapplicant->RES_ADDRS_LINE_2 ;?>">
	  					<input style="margin-top: 8px;" disabled placeholder="Address Line 3 *" class="input-cust-name" type="text" name="per_add_3"  id="per_add_3" value="<?php echo $perAddPresent? $coapplicant->PER_ADDRS_LINE_3 : $coapplicant->RES_ADDRS_LINE_3 ;?>">
	  				<?php } else { ?>
	  						<input style="margin-top: 1px;" disabled placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1"  id="per_add_1" >
	  					<input style="margin-top: 8px;" disabled placeholder="Address Line 2 *" class="input-cust-name" type="text" name="per_add_2"  id="per_add_2" >
	  					<input style="margin-top: 8px;" disabled placeholder="Address Line 3 *" class="input-cust-name" type="text" name="per_add_3"  id="per_add_3" >
	  				<?php } ?>
  				</div>  	
				<?php if(!empty($coapplicant)){ if($coapplicant->Vechical_NO_available=='no' || $coapplicant->Vechical_NO_available=='NULL' || $coapplicant->Vechical_NO_available==''){?>
						<div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">vehicle Number Available *</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
								<div class="row">
								
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled type="radio" name="Vechical_NO_available_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Vechical_NO_available=='yes'){ echo 'checked';}}?>> yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled <?php if(!empty($coapplicant)){ if($coapplicant->Vechical_NO_available=='no' || $coapplicant->Vechical_NO_available=='NULL' || $coapplicant->Vechical_NO_available==''){ echo 'checked';}}?> type="radio" name="Vechical_NO_available_<?php echo $i; ?>" value="no"> no
									</div>
									
								</div>	
							</div>  
							
						</div>
				<?php } }if(!empty($coapplicant)){ if($coapplicant->Vechical_NO_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">vehicle Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="Vechical_Number"   value="<?php if(!empty($coapplicant)){ echo $coapplicant->Vechical_Number;}?>">
						</div> 	
				 	<?php }} ?>
						<?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried'){?>
				<?php if(!empty($coapplicant)){ if($coapplicant->Official_mail_available=='no' || $coapplicant->Official_mail_available=='NULL' || $coapplicant->Official_mail_available==''){?>
					<div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official Mail Available *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;" class="col">
						<div class="input-cust-name" style=" margin-top: 8px;">
							<div class="row">
							
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled type="radio" name="official_avl_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Official_mail_available=='yes'){ echo 'checked';}}?>> yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled <?php if(!empty($coapplicant)){ if($coapplicant->Official_mail_available=='no' || $coapplicant->Official_mail_available=='NULL' || $coapplicant->Official_mail_available==''){ echo 'checked';}}?> type="radio" name="official_avl" value="no"> no
								</div>
								
							</div>	
						</div>  
						
					</div>
					<?php } }if(!empty($coapplicant)){ if($coapplicant->Official_mail_available=='yes'){?>
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official Mail</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled placeholder="" class="input-cust-name" type="text" name="passport_no"   value="<?php if(!empty($coapplicant)){ echo $coapplicant->Official_mail;}?>">
							</div> 	
						<?php }} ?>
				
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
  								<input disabled checked="true" type="radio" name="<?php echo "gender".$i;?> value="male"> Male
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled type="radio" name="<?php echo "gender".$i;?>" value="female" <?php  if(!empty($coapplicant)){if ($coapplicant->GENDER == 'female') echo ' checked="true"'; }?>> Female
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
  								<input disabled type="radio" name="<?php echo "marital".$i; ?> value="married" checked="true"> Married
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled <?php  if(!empty($coapplicant)){if ($coapplicant->MARTIAL_STATUS == 'single') echo ' checked="true"'; ?> type="radio" name="<?php echo "marital".$i;} ?>" value="single"> Single
	  						</div>
							
  						</div>	
  					</div>  
					
  				</div>	
                <div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Age</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="AGE"   value="<?php  if(!empty($coapplicant)){echo $coapplicant->AGE;}?>">
  				</div> 	
                <div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Stability in City</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="YEARS_IN_CITY_LIVING"   value="<?php  if(!empty($coapplicant)){echo $coapplicant->RES_ADDRS_NO_YEARS_LIVING;}?>">
  				</div> 		
                <div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Current address</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="YEARS_IN_CITY_LIVING"   value="<?php if(!empty($coapplicant)){ echo $coapplicant->RES_ADDRS_PROPERTY_TYPE;}?>">
  				</div> 		
                <div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Current and Permanent Address same*</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;">
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input disabled type="radio" name="<?php echo "yes".$i;?>" value="yes" checked="true"> yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled <?php if(!empty($coapplicant)){ if($coapplicant->RES_ADDRS_LINE_1!=$coapplicant->PER_ADDRS_LINE_1){ echo 'checked';}}?> type="radio" name="<?php echo "no".$i;?>" value="no"> no
	  						</div>
							
  						</div>	
  					</div>  
					
  				</div>	
                <?php if(!empty($coapplicant)){ if($coapplicant->Passport_available=='no' || $coapplicant->Passport_available=='NULL' || $coapplicant->Passport_available==''){?>
				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number Available *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;">
  						<div class="row">
						
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input disabled type="radio" name="passport_avl_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Passport_available=='yes'){ echo 'checked';}}?>> yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input disabled <?php if(!empty($coapplicant)){ if($coapplicant->Passport_available=='no' || $coapplicant->Passport_available=='NULL' || $coapplicant->Passport_available==''){ echo 'checked';}}?> type="radio" name="passport_avl_<?php echo $i; ?>" value="no"> no
	  						</div>
							
  						</div>	
  					</div>  
					
  				</div>
				<?php } }if(!empty($coapplicant)){ if($coapplicant->Passport_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="passport_no"   value="<?php if(!empty($coapplicant)){ echo $coapplicant->Passport_Number;}?>">
						</div> 	
				 	<?php }} ?>		
					<?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried'){?>
						<?php if(!empty($coapplicant)){ if($coapplicant->EPFO_Number_available=='no' || $coapplicant->EPFO_Number_available=='NULL' || $coapplicant->EPFO_Number_available==''){?>
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number Available *</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;" class="col">
								<div class="input-cust-name" style=" margin-top: 8px;">
									<div class="row">
									
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled type="radio" name="EPFO_Number_available_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->EPFO_Number_available=='yes'){ echo 'checked';}}?>> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled <?php if(!empty($coapplicant)){ if($coapplicant->EPFO_Number_available=='no' || $coapplicant->EPFO_Number_available=='NULL' || $coapplicant->EPFO_Number_available==''){ echo 'checked';}}?> type="radio" name="EPFO_Number_available_<?php echo $i; ?>" value="no"> no
										</div>
										
									</div>	
								</div>  
								
							</div>
							<?php } }if(!empty($coapplicant)){ if($coapplicant->EPFO_Number_available=='yes'){?>
									<div style=" margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number</span>
									</div>			
									<div class="w-100"></div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled placeholder="" class="input-cust-name" type="text" name="EPFO_Number"   value="<?php if(!empty($coapplicant)){ echo $coapplicant->EPFO_Number;}?>">
									</div> 	
							<?php }} ?>
							
						
					<?php } ?>		
                       <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Locality type *</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input disabled placeholder="Enter Locality type *" class="input-cust-name" type="text" name="Locality_type_<?php echo $i; ?>" value="<?php if(!empty($coapplicant)){ echo $coapplicant->Locality_type;}?>">
						</div> 					
  			</div>  
				
		</div>
		<?php $i++;}?>		
	</div>
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