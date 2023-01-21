<body style="background-color: #f2f2f2; width: 100%;">
		
	<div class="justify-content-center">
		<form style="margin-right: 20px; margin-top: 30px; margin-bottom: 20px;" action="<?php echo base_url(); ?>index.php/customer/customer_update_profile_2_l" method="POST" id="cust_form">
			<span class="signup100-form-title p-b-43">						
				Update Profile
			</span>					 
				
			<!-- Basic Info -->	
			
			<small class="cust-profile-edit-title"> Basic Information </small>
			
			<div class="cust-profile-box">
				<div class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">					
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">Date Of Birth</label>
						<div class="wrap-edit validate-input" >
							<input value="<?php echo $row->DOB;?>" class="input100" type="date" name="DOB" required>
							<span class="focus-input100"></span>
						</div>						
					</div>			
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">Annual Income</label> 					
						<div class="wrap-edit validate-input">
							<input value="<?php echo $row->ANNUAL_INCOME;?>" class="input100" type="number" name="annual_income" required>
							<span class="focus-input100"></span>
						</div>	
					</div>	

					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">Education Background</label> 
						<div class="wrap-edit validate-input" data-validate = "Valid email is required: ex@abc.xyz">
							<input value="<?php echo $row->EDUCATION_BACKGROUND;?>" class="input100" type="text" name="educationbac" required>
							<span class="focus-input100"></span>
						</div>		
					</div>	

					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">Occupation</label> 
						<div class="wrap-edit validate-input" >
							<input value="<?php echo $row->OCCUPATION;?>" class="input100" type="text" name="occupation" required>
							<span class="focus-input100"></span>
						</div>	
					</div>			
				</div>	

				<div class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">Native Place</label>
						<div class="wrap-edit validate-input" >
							<input value="<?php echo $row->NATIVE_PLACE;?>" class="input100" type="text" name="nativeplace" required>
							<span class="focus-input100"></span>
						</div>
					</div>			
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">Agri Land In Native</label>
						<div class="wrap-edit validate-input" >
							<input value="<?php echo $row->AGRI_LAND_IN_NATIVE;?>" class="input100" type="text" name="alin" >
							<span class="focus-input100"></span>
						</div>
					</div>	

					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">Agri Income</label>
						<div class="wrap-edit validate-input" >
							<input value="<?php echo $row->AGRI_INCOME;?>" class="input100" type="number" name="agri_income">
							<span class="focus-input100"></span>
						</div>
					</div>	

					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">Other Income Source</label>
						<div class="wrap-edit validate-input" >
							<input value="<?php echo $row->OTHER_INCOME_SOURCE;?>" class="input100" type="text" name="ois">
							<span class="focus-input100"></span>
						</div>
					</div>				
				</div>

				<div class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">PAN Number</label>
						<div class="wrap-edit validate-input" >
							<input value="<?php echo $row->PAN_NUMBER;?>" class="input100" type="text" name="Pan" pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" required>
							<span class="focus-input100"></span>
						</div>
					</div>			
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">Aadhar Number</label>
						<div class="wrap-edit validate-input" >
							<input value="<?php echo $row->AADHAR_NUMBER;?>" class="input100" type="text" name="aadhar" required>
							<span class="focus-input100"></span>
						</div>						
					</div>			
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">Number of Dependants</label>
						<div class="wrap-edit validate-input" >
							<input value="<?php echo $row->NO_OF_DEPENDANTS;?>" class="input100" type="number" name="nod" required>
							<span class="focus-input100"></span>
						</div>
					</div>									
				</div>	
			</div>			

			<small class="cust-profile-edit-title"> Address Information</small>
			
			<div class="cust-profile-box">
				<div class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">					
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">Current Residential Address</label>					
						<div class="wrap-edit validate-input" >
							<input value="<?php echo $row->CURRENT_RESIDENTIAL_ADDRESS;?>" class="input100" type="text" name="cra" minlength="5" 	required>
							<span class="focus-input100"></span>
						</div>
					</div>			
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">Select State</label> 
						
						<div class="wrap-edit validate-input">
							<select required class="state" name="state" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 20px; margin-bottom: 8px; padding: 3px;"> 
								  <option  value="">None</option>
								  <?php foreach ($states as $key) {
								  	echo "<option value='$key'>$key</option>";
								  } ?>								  
							</select>
						</div>	
					
					</div>	

					<div id="district_div" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">Select District</label> 
						<div id="district_response" class="wrap-edit validate-input">
							
						</div>	
					</div>	

					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">Select City</label> 
						<div id="city_response" class="wrap-edit validate-input">
							
						</div>	
					</div>			
				</div>

				<div class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">					
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">How long you iving on Present Address (Years)</label>
						<div class="wrap-edit validate-input" >
							<input value="<?php echo $row->LIVING_YEAR_PRESENT_ADDRESS;?>" placeholder="" class="input100" type="number" name="paly" required>
							<span class="focus-input100"></span>
						</div>
					</div>			
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
						<label class="padding-bottom-10">How long you living in city (Years)</label>
						<div class="wrap-edit validate-input" >
							<input value="<?php echo $row->YEARS_IN_CITY_LIVING;?>" placeholder="" class="input100" type="number" name="lic" required>
							<span class="focus-input100"></span>
						</div>
					</div>									
				</div>									
			</div>																													
			<small class="cust-profile-edit-title">Loan Information</small>
			
			<div class="cust-profile-box">
				<div class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">					
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<label class="padding-bottom-10">Existing Active Loans</label>
						<div class="wrap-edit validate-input" >
							<input value="<?php echo $row->EXISTING_ACTIVE_LOANS;?>" class="input100" type="text" name="eal">
							<span class="focus-input100"></span>
						</div>
					</div>			
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<label class="padding-bottom-10">Existing Loan Total EMI</label>
						<div class="wrap-edit validate-input" > 
							<input value="<?php echo $row->EXISTING_LOAN_EMI;?>" class="input100" type="number" name="ele">
							<span class="focus-input100"></span>
						</div>
					</div>	

					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<label class="padding-bottom-10">What Kind Of Loan You Want?</label>
						<div class="wrap-select validate-input ">
							<label class="input100"> Select loan type </label> 
							<span class="focus-input100"></span>
							<select name="loan_type" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 40px; margin-bottom: 8px; padding: 3px;"> 
							  <option disabled="disabled" value="0">Select Loan Type</option>
							  <option value="Personal loan">Personal loan</option>
							  <option value="Gold loan">Gold loan</option>
							  <option value="Housing loan">Housing loan</option>
							  <option value="Loan against property">Loan against property</option>
							  <option value="Credit loan">Credit loan</option>
							</select>
						</div>
					</div>								
				</div>									
			</div>

			<small class="cust-profile-edit-title">Tax Information</small>
			
			<div class="cust-profile-box">
				<div class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">					
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
						<label class="padding-bottom-10">Is Tax IT return Available?</label>
						<div class="wrap-edit validate-input" >
							<input value="<?php echo $row->IT_RETURN_AVAILABLE;?>" class="input100" type="text" name="ITR">
							<span class="focus-input100"></span>
						</div>
					</div>			
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
						<label class="padding-bottom-10">Is IT return with Gap?</label>
						<div class="wrap-edit validate-input" >
							<input value="<?php echo $row->IT_RETURN_FILED_WITH_GAP;?>" class="input100" type="text" name="ITRG">
							<span class="focus-input100"></span>
						</div>
					</div>													
				</div>									
			</div>

			<small class="cust-profile-edit-title">Business / Job Information</small>
			
			<div class="cust-profile-box">
					<div class="wrap-edit">						
							<div id="paymentContainer" name="paymentContainer" class="label-input100-gender paymentOptions">

				                <div id="payCC" class="floatBlock">
				                    <label style="font-size: 12px;" for="paymentCC"> <input <?php echo ($row->DESIGNATION!='')?'checked':'' ?> id="salaried" name="userType" type="radio" value="salaried" />  SALARIED  </label>
				                </div>

				                <div id="payInvoice" class="floatBlock">
				                    <label style="font-size: 12px;" for="paymentInv"> <input <?php echo ($row->DESIGNATION=='')?'checked':'' ?> id="nonsalaried" name="userType" type="radio" value="nonsalaried" /> NON-SALARIED </label>
				                </div>		                
				            </div>    
		            </div>
					<div id="salaried_view">
						<div class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">					
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							<label class="padding-bottom-10">Company Type</label>
			            	<div class="wrap-select validate-input ">
								<label class="input100"> Please Select </label> 
								<span class="focus-input100"></span>
								<select name="company_type" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 40px; margin-bottom: 8px; padding: 3px;"> 
								  <option disabled="disabled" value="0">Select Type</option>
								  <option value="Service Based">Service Based</option>
								  <option value="Product Based">Product Based</option>							  
								</select>
							</div>
						</div>			
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							<label class="padding-bottom-10">Designation</label>
			            	<div class="wrap-edit validate-input" >
								<input value="<?php echo $row->DESIGNATION;?>" class="input100" type="text" name="designation">
								<span class="focus-input100"></span>
							</div>
						</div>	
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							<label class="padding-bottom-10">Past Employment Details</label>
							<div class="wrap-edit validate-input" >
								<input value="<?php echo $row->PAST_EMPLOYMENT_DETAILS;?>" class="input100" type="text" name="ped">
								<span class="focus-input100"></span>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							<label class="padding-bottom-10">Company Address</label>
							<div class="wrap-edit validate-input" >
								<input value="<?php echo $row->COMPANY_ADDRESS;?>" placeholder="" class="input100" type="text" name="ca">
								<span class="focus-input100"></span>
							</div>
						</div>								
					</div>

					<div class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">					
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							<label class="padding-bottom-10">Office Email</label>
							<div class="wrap-edit validate-input" >
								<input value="<?php echo $row->OFFICE_EMAIL;?>" placeholder="" class="input100" type="text" name="oe">
								<span class="focus-input100"></span>
							</div>
						</div>

						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							<label class="padding-bottom-10">Office Contact No</label>
							<div class="wrap-edit validate-input" >
								<input value="<?php echo $row->OFFICE_CONTACT_NO;?>" class="input100" type="text" name="ocn">
								<span class="focus-input100"></span>
							</div>
						</div>

						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							<label class="padding-bottom-10">Cash Salary</label>
							<div class="wrap-edit validate-input" >
								<input value="<?php echo $row->CASH_SALARY;?>" class="input100" type="number" name="cs">
								<span class="focus-input100"></span>
							</div>
						</div>

						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							<label class="padding-bottom-10">Gross Salary</label>
							<div class="wrap-edit validate-input" >
								<input value="<?php echo $row->GROSS_SALARY;?>" class="input100" type="number" name="gs">
								<span class="focus-input100"></span>
							</div>
						</div>	
					</div>

					<div class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">					
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							<label class="padding-bottom-10">Basic Salary</label>
							<div class="wrap-edit validate-input" >
								<input value="<?php echo $row->BASIC_SALARY;?>" class="input100" type="number" name="bs">
								<span class="focus-input100"></span>
							</div>
						</div>

						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							<label class="padding-bottom-10">Loan EMI deduct's from salary</label>
							<div class="wrap-edit validate-input" >
								<input value="<?php echo $row->LOAN_EMI_DEDUCT_FROM_SALARY;?>" class="input100" type="number" name="ledfs">
								<span class="focus-input100"></span>
							</div>
						</div>

						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							<label class="padding-bottom-10">Salary credits to bank</label>
							<div class="wrap-edit validate-input" >
								<input value="<?php echo $row->BANK_CREDIT_SALARY;?>" placeholder="" class="input100" type="number" name="sctb">
								<span class="focus-input100"></span>
							</div>
						</div>
					</div>
	            </div>	

	            <!-- non salaried-->
		            <div id="nonsalaried_view">
	            	
		            	<div class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">					
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
								<label class="padding-bottom-10">Self Business Address</label>
				            	<div class="wrap-edit validate-input" >
									<input value="<?php echo $row->SELF_BUSINESS_ADDRESS;?>" placeholder="" class="input100" type="text" name="sba">
									<span class="focus-input100"></span>
								</div>
							</div>

							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
								<label class="padding-bottom-10">Ownership Type</label>
								<div class="wrap-select validate-input ">
									<label class="input100">Please select</label> 
									<span class="focus-input100"></span>
									<select name="owner_type" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 40px; margin-bottom: 8px; padding: 3px;"> 
									  <option disabled="disabled" value="0">Select Ownership</option>
									  <option value="Self Owned Business">Self Owned Business</option>
									  <option value="Partnership Business">Partnership Business</option>							  
									</select>
								</div>
							</div>

							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
								<label class="padding-bottom-10">Premises rented or own by self</label>
								<div class="wrap-select validate-input ">
									<label class="input100">Please Select</label> 
									<span class="focus-input100"></span>
									<select name="premise_type" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 40px; margin-bottom: 8px; padding: 3px;"> 
									  <option disabled="disabled" value="0">Select Type</option>
									  <option value="Rented">Rented</option>
									  <option value="Own by self">Own by self</option>							  
									</select>
								</div>
							</div>

							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
								<label class="padding-bottom-10">Business Type/Nature</label>
								<div class="wrap-edit validate-input" >
									<input value="<?php echo $row->BUSINESS_NATURE;?>" placeholder="" class="input100" type="text" name="bt">
									<span class="focus-input100"></span>
								</div>
							</div>
						</div>
	            </div>																										
			</div>
	
				
            <?php if($row->DESIGNATION==''){ echo '<script type="text/javascript">',
			     'setNoSalaried();',
			     '</script>';
			 }else{ echo '<script type="text/javascript">',
			     'setSalaried();',
			     '</script>';
			 }?>
            	 <div style="margin-left: 10px;" class="container-login100-form-btn">
					<button class="login100-form-btn">
						UPDATE PROFILE
					</button>
				</div>          								
		</form>

	</div>

	
</body>
