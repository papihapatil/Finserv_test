<style>
.designe{
	border:1px solid ;
	
}
.block:after {
  color: #ccc;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
}

.block:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}
.block {
  background-color: #ccc;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_Active {
  background-color: #25a6c6;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_Active:after {
  color: #25a6c6;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
}

.block_Active:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}
.block_completed {
  background-color: #83dcf0;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  margin:16px;
}
.block_completed:after {
  color: #83dcf0;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
}

.block_completed:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}


.block_hold {
  background-color: yellow;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_reject {
  background-color: red;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_font{
	margin-left:7%;
	font-size:12px;
	color:gray;
}
.block_font_active{
	margin-left:7%;
	font-size:12px;
	color:White;
}
</style>

<?php ini_set('short_open_tag', 'On'); ?>
<div class="margin-10 padding-5">
		  <div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
		   <?php  if(!empty($row_more))
					{
					  if($row_more->STATUS == 'Created')
						{
							?>
							<div class="col-sm-1 block_Active" title="Customer just created in system"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block" title="Step one initial GO NO GO  "><span class="block_font">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block" title="Go NO GO process"><span class="block_font">3. &nbsp;Go NO Go</span></div> 
							<div class="col-sm-2 block" title="Applicant personal information"><span class="block_font">4. &nbsp;Personal Information</span></div> 
							<div class="col-sm-1 block" title="Applicant income information"><span class="block_font">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block" title="Applicant document information"><span class="block_font">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block" title="Loan application form"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block" title="Loan applicant document"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block" title="Aadhar e-sign process"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block" title="PD process"><span class="block_font">10. &nbsp;PD</span></div>
							<?php
						}
					  else if($row_more->STATUS == 'Rule Engine Step One')
						
						{
                            ?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
		    				<div class="col-sm-1 block_Active"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block"><span class="block_font">3. &nbsp;Go NO Go</span></div> 
							<div class="col-sm-2 block"><span class="block_font">4. &nbsp;Personal Information</span></div> 
							<div class="col-sm-1 block"><span class="block_font">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block"><span class="block_font">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;PD</span></div> 
							
							
							<?php
						}
						else if($row_more->STATUS == 'GO NO GO in progress')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_Active"><span class="block_font_active">3. &nbsp;Go NO Go</span></div>
							<div class="col-sm-2 block"><span class="block_font">4. &nbsp;Personal Information</span></div> 
							<div class="col-sm-1 block"><span class="block_font">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block"><span class="block_font">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;PD</span></div>
							<?php
						}
						else if($row_more->STATUS == 'Go NO Go Hold')
					    {
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_hold"><span class="block_font_active">3. &nbsp;Go NO Go</span></div> 
     						<div class="col-sm-2 block"><span class="block_font">4. &nbsp;Personal Information</span></div> 
							<div class="col-sm-1 block"><span class="block_font">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block"><span class="block_font">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;PD</span></div>
							<?php
						}
						else if($row_more->STATUS == 'Go NO Go Reject')
					    {
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_reject"><span class="block_font_active">3. &nbsp;Go NO Go</span></div>
							<div class="col-sm-2 block"><span class="block_font">4. &nbsp;Personal Information</span></div> 
							<div class="col-sm-1 block"><span class="block_font">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block"><span class="block_font">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;PD</span></div>
							<?php
						}
						else  if($row_more->STATUS == 'Personal details complete')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go</span></div> 
							<div class="col-sm-2 block_Active"><span class="block_font_active">4. &nbsp;Personal Information</span></div> 
							<div class="col-sm-1 block"><span class="block_font">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block"><span class="block_font">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;PD</span></div>
							<?php
						}
						else if($row_more->STATUS == 'Income details complete')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">4. &nbsp;Personal Information</span></div> 
							<div class="col-sm-1 block_Active"><span class="block_font_active">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block"><span class="block_font">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;PD</span></div> 
							<?php
						}
						else if($row_more->STATUS == 'Document upload complete')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">4. &nbsp;Personal Information</span></div> 
						    <div class="col-sm-1 block_completed"><span class="block_font_active">5. &nbsp;Income Info.</span></div>
							<div class="col-sm-1 block_Active"><span class="block_font_active">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;PD</span></div> 
							<?php
						}
						else if($row_more->STATUS == 'Loan application complete')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">4. &nbsp;Personal Information</span></div> 
						    <div class="col-sm-1 block_completed"><span class="block_font_active">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block_Active"><span class="block_font_active">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;PD</span></div> 
							
							<?php
						}
						else   if($row_more->STATUS == 'Loan Document Uploaded')
						{
						  ?><div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">4. &nbsp;Personal Information</span></div> 
						    <div class="col-sm-1 block_completed"><span class="block_font_active">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block_Active"><span class="block_font_active">8. &nbsp;Loan Document Uploded</span></div> 
                            <div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;PD</span></div> 
							<?php
						}
						else if($row_more->STATUS == 'Aadhar E-sign complete')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go </span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">4. &nbsp;Personal Information</span></div> 
						    <div class="col-sm-1 block_completed"><span class="block_font_active">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block_Active"><span class="block_font_active">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;PD</span></div> 
							<?php
						}
						else if($row_more->STATUS == 'PD Completed')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go </span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">4. &nbsp;Personal Information</span></div> 
						    <div class="col-sm-1 block_completed"><span class="block_font_active">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block_Active"><span class="block_font_active">10. &nbsp;PD</span></div> 
							<?php
						}

					}
           ?>
		

		</div>
</div>
	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
			<?php if(!empty($row))
			{
				if (($row->customer_consent=='true') && ($row_more->STATUS =='PD Completed'))
				{
				?>
					
			<?php }
			 else if(($row->customer_consent=='true') && ($row_more->STATUS!='Aadhar E-sign complete'))
			 {
             ?>
			 <div class="row" style="margin-left: 10px;">
						Edit 

						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div>
								<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2?ID=<?php echo $row->UNIQUE_CODE;?>"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
							</div>	
						</div>				
					</div>
			 <?php
			 }
			else if (($row->customer_consent=='true') && ($row->ROLE ==5))
			{
				?>
					<div class="row" style="margin-left: 10px;">
						Edit 

						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div>
								<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2?ID=<?php echo $row->UNIQUE_CODE;?>"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
							</div>	
						</div>				
					</div>

				<?php
			}
			     

			else 
			{
			?>
		
			<?php
			}
			}?>
									
			</div> 
</span>	
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div>
					</div>
					
					<div >
				
					</div>			
					<div>
						
						<?php 
							if(!empty($row_more))
							{
								if($row_more->STATUS == 'Income details complete')
								{
                            ?>
						
							<?php
								}
								else if($row_more->STATUS == 'Loan application complete')
								{
								?>
							<?php
								}
								else if($row_more->STATUS == 'Aadhar E-sign complete')
								{
								?>
								
							<?php
								}
								else 
								{
							?>
						
							<?php
								}
							}
						?>
					
						</div>	
			
					<div >
					</div>			
					<div>
					</div>			
				</div>	
			</div>
		</div>
		
		
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">About Me</span>

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
	  					<input disabled required max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="dob"  value="<?php echo $dob; ?>">
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
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Alternative Mobile Number</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input placeholder="Enter mobile number" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" name="alternative_mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row->Alternative_mobile ;?>">
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
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">We require your Aadhar number and PAN</span>

			</div>
			<div class="w-100"></div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Aadhar Number *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled placeholder="Aadhar *" class="input-cust-name" maxlength="12" type="number" name="aadhar" id="aadhar_number" oninput="maxLengthCheck(this)" value="<?php echo preg_replace("/(?!^).(?!$)/", "*", $AADHAR_NUMBER); ?>">
  				</div>  			  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">PAN Number *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" disabled placeholder="PAN number *" class="input-cust-name" type="text" name="pan" maxlength="10"  oninput="maxLengthCheck(this)" value="<?php echo  preg_replace("/(?!^).(?!$)/", "*", $PAN_NUMBER); ?>">
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
			

			<div class="w-100"></div>  

			<div style="margin-top: 20px;" class="row col-12 justify-content-center">
				<div >
					<a href="<?php echo base_url()?>index.php/customer/profile_view_p_t?ID=<?php echo $id;?>">
					<button class="login100-form-btn" style="background-color: #25a6c6;">
						NEXT
					</button></a>
				</div>		
			</div>
		</div>		
	</div>