<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="row">
			<div class="shadow align-middle dot" style="width: 25px; height: 25px; text-align: center;">
				<span ><p style="font-size: 10px; padding: 5px; color: white; font-weight: bold;">0%</p></span>				
			</div>
			
			<span class="per-hr-check" style="width: 25%; margin-top: 12px;"></span>
			<div class="shadow align-middle dot" style="width: 25px; height: 25px; text-align: ;">
				<span ><p style="font-size: 10px; padding: 4px; color: white; font-weight: bold;">30%</p></span>				
			</div>	
	
			<span class="per-hr-uncheck" style="width: 30%; margin-top: 12px;"></span>
			<div class="shadow align-middle uncheck-dot" style="width: 25px; height: 25px; text-align: ;">
				<span ><p style="font-size: 10px; padding: 4px; color: white; font-weight: bold;">65%</p></span>				
			</div>

			<span class="per-hr-uncheck" style="width: 32%; margin-top: 12px;"></span>
			<div class="shadow align-middle uncheck-dot" style="width: 25px; height: 25px; text-align: ;">
				<span ><p style="font-size: 10px; padding: 4px; color: white; font-weight: bold;">100%</p></span>				
			</div>	
		</div>
	</div>
</div>

	<div >
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
		<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
				Tell us about (Co-Applicant) <b><?php echo $coapp_data->FN." ".$coapp_data->LN." " ;?></b> Income
			</div>
			<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div>
						<span class="shadow align-middle dot-white"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></span>				
					</div>
					
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
					<div>
						<span class="align-middle dot"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-money"></i></span>
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
		<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">			
			</div>
			<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div style="font-size: 10px; color: black; margin-right: 20px;">
						Personal Details
					</div>
					
					<div style="font-size: 10px; color: black; margin-right: 30px;">
						Income Details
					</div>

					<!--div style="font-size: 10px; margin-left: 10px; color: black;">
						Loan Applications
					</div-->

					<div style="font-size: 10px; margin-right: 20px; color: black;">
						Documents
					</div>
				</div>	
			</div>
		</div>
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="text-align: center; margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Please Select Your Income Source</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="text-align: center; margin-bottom: 45px; font-size: 12px; color: #bfbbbb;">Your income source will help us to analyse that how much loan amount is applicable for you.</span>

			</div>
			<div class="w-100"></div>
			<div class="row col-12 justify-content-md-center">
				<div class="row justify-content-md-center" style="padding: 0px !important;">
					<a href="<?php echo base_url()?>index.php/customer/coapplicant_new_screen_two?COAPPID=<?php echo $co_app;?>&type=salaried">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
							<div class="row <?php if($type == 'salaried'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center padding-5">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/employee.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You work in a organisation</span>
								<span class="font-9" style="margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Salaried</span>
								<div class="w-100"></div>
								<?php if($type == 'salaried') { ?>
									<img style="width: 25px; height: 25px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>				
						</div>	
					</a>
					<a href="<?php echo base_url()?>index.php/customer/coapplicant_new_screen_two?COAPPID=<?php echo $co_app;?>&type=business">	
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
							<div class="row <?php if($type == 'business'|| $type=='self employeed'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center ">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/businessman.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You run your own business</span>
								<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Self Employed</span>
								<div class="w-100"></div>
								<?php if($type == 'business'||  $type=='self employeed') { ?>
									<img style="width: 25px; height: 25px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>
			  			</div>	
			  		</a>
		  			<a href="<?php echo base_url()?>index.php/customer/coapplicant_new_screen_two?COAPPID=<?php echo $co_app;?>&type=notworking">
			  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
			  				<div class="row <?php if($type == 'notworking'|| $type == 'retired'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center ">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/notworking.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You are retired or at home</span>
								<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Retired/Homemaker</span>
								<div class="w-100"></div>
								<?php if($type == 'notworking') { ?>
									<img style="width: 25px; height: 25px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>
			  			</div>	
			  		</a>
				</div>	
			</div>			
		</div>


		<!-- Salaried ------------------------------- -->
		<?php if($type == 'salaried') { ?>
			<form method="POST" action="<?php echo base_url(); ?>index.php/customer/coapplicant_new_screen_two_action" id="customer_flow_update_s_two_salaried">			

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Awesome</span>

				</div>
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">Please can you tell a bit more about your organisation.</span>

				</div>
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Name of Organisation Employed With *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input   required="true"  placeholder="Organisation name" class="input-cust-name" type="text" name="org_name" value="<?php if(!empty($row))echo $row->ORG_NAME?>">
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Employment Sector *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<!--input placeholder="Enter industry operating" class="input-cust-name" type="text" name="org_operating""-->
	  					<select required class="input-cust-name" name="org_operating"> 
						   <option value="">Select Type *</option>
						  <option value="Mechanical" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Mechanical') echo ' selected="selected"'; ?>>Mechanical</option>
						  <option value="Electronics" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Electronics') echo ' selected="selected"'; ?>>Electronics</option>			
						  <option value="Software" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Software') echo ' selected="selected"'; ?>>Software</option>
						  <option value="Automobile" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Automobile') echo ' selected="selected"'; ?>>Automobile</option>
						  <option value="Engineering" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Engineering') echo ' selected="selected"'; ?>>Engineering</option>
						  <option value="Trading" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Trading') echo ' selected="selected"'; ?>>Trading</option>
						  <option value="Hospitality" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Hospitality') echo ' selected="selected"'; ?>>Hospitality</option>
						  <option value="Medical" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Medical') echo ' selected="selected"'; ?>>Medical</option>			  
						  <option value="Tourism" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Tourism') echo ' selected="selected"'; ?>>Tourism</option>			  
						  <option value="Hotel" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Hotel') echo ' selected="selected"'; ?>>Hotel</option>			  
					

                          <option value="Finance" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Finance') echo ' selected="selected"'; ?>>Finance</option>
						  <option value="Banking" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Banking') echo ' selected="selected"'; ?>>Banking</option>			
						  <option value="Insurance" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Insurance') echo ' selected="selected"'; ?>>Insurance</option>
						  <option value="Vegetable " <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Vegetable ') echo ' selected="selected"'; ?>>Vegetable </option>
						  <option value="Fruits" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Fruits') echo ' selected="selected"'; ?>>Fruits</option>
						  <option value="Teaching" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Teaching') echo ' selected="selected"'; ?>>Teaching</option>
						  <option value="Sports" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Sports') echo ' selected="selected"'; ?>>Sports</option>
						  <option value="Fitness" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Fitness') echo ' selected="selected"'; ?>>Fitness</option>			  
						  <option value="Coaching class" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Coaching class') echo ' selected="selected"'; ?>>Coaching class</option>			  
						  <option value="Shipping" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Shipping') echo ' selected="selected"'; ?>>Shipping</option>			  
						  <option value="Real Estate" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Real Estate') echo ' selected="selected"'; ?>>Real Estate</option>
                          <option value="Infrastructure" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Infrastructure') echo ' selected="selected"'; ?>>Infrastructure</option>
						  <option value="Food" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Food') echo ' selected="selected"'; ?>>Food</option>			
						  <option value="Agriculture" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Agriculture') echo ' selected="selected"'; ?>>Agriculture</option>
						  <option value="Shipping" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Shipping') echo ' selected="selected"'; ?>>Shipping</option>
						  <option value="Grocery" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Grocery') echo ' selected="selected"'; ?>>Grocery</option>
						  <option value="Departmental" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Departmental') echo ' selected="selected"'; ?>>Departmental</option>
						  <option value="Education" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Education') echo ' selected="selected"'; ?>>Education</option>
						  <option value="Clothing" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Clothing') echo ' selected="selected"'; ?>>Clothing</option>			  
						  <option value="Shoes" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Shoes') echo ' selected="selected"'; ?>>Shoes</option>			  
						  <option value="Plastic" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Plastic') echo ' selected="selected"'; ?>>Plastic</option>	
                          <option value="Manufacturing" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Manufacturing') echo ' selected="selected"'; ?>>Manufacturing</option>							  
						  <option value="Others" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Others') echo ' selected="selected"'; ?>>Others</option>				  
						</select>
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Organisation Type *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<select required class="input-cust-name" name="salaried_org_type"> 
						  			<option value="">Select Type *</option>
						  <option value="Central Govt." <?php if(!empty($row))if ($row->ORG_TYPE == 'Central Govt.') echo ' selected="selected"'; ?>>Central Govt.</option>
						  <option value="Educational Institute" <?php if(!empty($row))if ($row->ORG_TYPE == 'Educational Institute') echo ' selected="selected"'; ?>>Educational Institute</option>			
						  <option value="Partnership Firm" <?php if(!empty($row))if ($row->ORG_TYPE == 'Partnership Firm') echo ' selected="selected"'; ?>>Partnership Firm</option>
						  <option value="Private Limited Company" <?php if(!empty($row))if ($row->ORG_TYPE == 'Private Limited Company') echo ' selected="selected"'; ?>>Private Limited Company</option>
						  <option value="Proprietorship Firm" <?php if(!empty($row))if ($row->ORG_TYPE == 'Proprietorship Firm') echo ' selected="selected"'; ?>>Proprietorship Firm</option>
						  <option value="Public Limited Company" <?php if(!empty($row))if ($row->ORG_TYPE == 'Public Limited Company') echo ' selected="selected"'; ?>>Public Limited Company</option>
						  <option value="Public Sector Undertaking" <?php if(!empty($row))if ($row->ORG_TYPE == 'Public Sector Undertaking') echo ' selected="selected"'; ?>>Public Sector Undertaking</option>
						  <option value="Society" <?php if(!empty($row))if ($row->ORG_TYPE == 'Society') echo ' selected="selected"'; ?>>Society</option>			  
						  <option value="State Govt." <?php if(!empty($row))if ($row->ORG_TYPE == 'State Govt.') echo ' selected="selected"'; ?>>State Govt.</option>			  
						  <option value="Trust" <?php if(!empty($row))if ($row->ORG_TYPE == 'Trust') echo ' selected="selected"'; ?>>Trust</option>			  
						  <option value="NGO" <?php if(!empty($row))if ($row->ORG_TYPE == 'NGO') echo ' selected="selected"'; ?>>NGO</option>			  
						  <option value="Startup" <?php if(!empty($row))if ($row->ORG_TYPE == 'Startup') echo ' selected="selected"'; ?>>Startup</option>  
						  <option value="Professional firm" <?php if(!empty($row))if ($row->ORG_TYPE == 'Professional firm') echo ' selected="selected"'; ?>>Professional Firm</option>
                          <option value="Limited Liability firm" <?php if(!empty($row))if ($row->ORG_TYPE == 'Limited Liability firm') echo ' selected="selected"'; ?>>Limited Liability Firm</option>						  
						  <option value="Others" <?php if(!empty($row))if ($row->ORG_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>  
						</select>
	  				</div> 

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Number Of Years Working With Current Organization *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="1" placeholder="Enter no of years working here" class="input-cust-name" type="number" name="salaried_org_no_of_years_working"  required="true" maxlength="2"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_YEARS_WORKING?>">
	  				</div>  
	  							  				
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Branch Address Where You Work *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Address line 1 *" class="input-cust-name" type="text" name="salaried_org_add_line_1"  required="true"  value="<?php if(!empty($row))echo $row->ORG_ADRS_LINE_1?>">
	  				</div>
	  				<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Address line 2 *" class="input-cust-name" type="text" name="salaried_org_add_line_2"   value="<?php if(!empty($row))echo $row->ORG_ADRS_LINE_2?>">
	  					<input hidden="true" style="margin-left: 10px; margin-right: 5px;" type="text" name="coappid" id="coappid" value="<?php echo $co_app;?>">
	  				</div>
	  				<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Address line 3 *" class="input-cust-name" type="text" name="salaried_org_add_line_3"  maxlength="20"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_ADRS_LINE_3?>">
	  				</div>

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter landmark" class="input-cust-name" type="text" name="salaried_org_landmark"  required="true" value="<?php if(!empty($row))echo $row->ORG_LANDMARK?>">
	  				</div>  

	  				<div class="w-100"></div>

	  				<div class="col" style="margin-top: 10px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Pin Code *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter pin code *" class="input-cust-name" pattern="[0-9]{6}" type="text" name="salaried_org_pin" title="Please enter valid pincode" id="salaried_org_pin" required="true" maxlength="6"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_PINCODE?>">
	  				</div>  
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										  							
				<div class="w-100"></div>

				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">State *</span>
				</div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" id="resi_state_view" placeholder="State" class="input-cust-name" value="<?php if(!empty($row))echo $row->ORG_STATE ;?>">
  					<input hidden="true" placeholder="State" class="input-cust-name" name="resi_state" id="resi_state" value="<?php if(!empty($row))echo $row->ORG_STATE ;?>">  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District" class="input-cust-name" id="resi_district_view" value="<?php if(!empty($row))echo $row->ORG_DISTRICT ;?>">
  					<input hidden="true" placeholder="District" class="input-cust-name" name="resi_district" id="resi_district" value="<?php if(!empty($row))echo $row->ORG_DISTRICT ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="City" class="input-cust-name" name="resi_city" id="resi_city" value="<?php if(!empty($row))echo $row->ORG_CITY ;?>">
  				</div> 
				</div>
			</div>

			<!-- what you do n company -->
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us bit more about what you do there</span>

				</div>			
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-fax"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Designation *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select  required="true" class="input-cust-name" id="org_designation" name="org_designation">
				        	<option value="">Select designation</option>
				            <option value="ACCOUNTANT" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'ACCOUNTANT') echo ' selected="selected"'; ?>>ACCOUNTANT</option>			  

				            <option value="AREA SALES MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'AREA SALES MANAGER') echo ' selected="selected"'; ?>>AREA SALES MANAGER</option>			  

				            <option value="ASSISTANT" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'ASSISTANT') echo ' selected="selected"'; ?>>ASSISTANT</option>			  

				            <option value="ASSISTANT MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'ASSISTANT MANAGER') echo ' selected="selected"'; ?>>ASSISTANT MANAGER</option>			  

				            <option value="ASST VICE PRESIDENT" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'ASST VICE PRESIDENT') echo ' selected="selected"'; ?>>ASST VICE PRESIDENT</option>			  

				            <option value="CHIEF EXECUTIVE OFFICER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'CHIEF EXECUTIVE OFFICER') echo ' selected="selected"'; ?>>CHIEF EXECUTIVE OFFICER</option>			  

				            <option value="CLERK" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'CLERK') echo ' selected="selected"'; ?>>CLERK</option>			  

				            <option value="DATA ENTRY OPERATOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'DATA ENTRY OPERATOR') echo ' selected="selected"'; ?>>DATA ENTRY OPERATOR</option>			  

				            <option value="DIRECTOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'DIRECTOR') echo ' selected="selected"'; ?>>DIRECTOR</option>			  

				            <option value="DY MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'DY MANAGER') echo ' selected="selected"'; ?>>DY MANAGER</option>			  

				            <option value="ENGINEER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'ENGINEER') echo ' selected="selected"'; ?>>ENGINEER</option>			  

				            <option value="EXECUTIVE" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'EXECUTIVE') echo ' selected="selected"'; ?>>EXECUTIVE</option>			  

				            <option value="EXECUTIVE DIRECTOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'EXECUTIVE DIRECTOR') echo ' selected="selected"'; ?>>EXECUTIVE DIRECTOR</option>			  

				            <option value="HOUSEWIFE" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'HOUSEWIFE') echo ' selected="selected"'; ?>>HOUSEWIFE</option>			  

				            <option value="LECTURER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'LECTURER') echo ' selected="selected"'; ?>>LECTURER</option>			  

				            <option value="LIBRARIAN" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'LIBRARIAN') echo ' selected="selected"'; ?>>LIBRARIAN</option>			  

				            <option value="MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'MANAGER') echo ' selected="selected"'; ?>>MANAGER</option>			  

				            <option value="PROPRIETOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'PROPRIETOR') echo ' selected="selected"'; ?>>PROPRIETOR</option>			  

				            <option value="REGIONAL MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'REGIONAL MANAGER') echo ' selected="selected"'; ?>>REGIONAL MANAGER</option>			  

				            <option value="SALES EXECUTIVE" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SALES EXECUTIVE') echo ' selected="selected"'; ?>>SALES EXECUTIVE</option>			  

				            <option value="SALES MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SALES MANAGER') echo ' selected="selected"'; ?>>SALES MANAGER</option>			  

				            <option value="SECRETARY" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SECRETARY') echo ' selected="selected"'; ?>>SECRETARY</option>			  

				            <option value="SENIOR EXECUTIVE" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SENIOR EXECUTIVE') echo ' selected="selected"'; ?>>SENIOR EXECUTIVE</option>			  

				            <option value="SENIOR MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SENIOR MANAGER') echo ' selected="selected"'; ?>>SENIOR MANAGER</option>			  

				            <option value="SENIOR OFFICER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SENIOR OFFICER') echo ' selected="selected"'; ?>>SENIOR OFFICER</option>			  

				            <option value="STENOGRAPHER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'STENOGRAPHER') echo ' selected="selected"'; ?>>STENOGRAPHER</option>			  

				            <option value="SUPERITENDENT" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SUPERITENDENT') echo ' selected="selected"'; ?>>SUPERITENDENT</option>			  

				            <option value="SUPREVISOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SUPREVISOR') echo ' selected="selected"'; ?>>SUPREVISOR</option>			  

				            <option value="SYSTEM ANALYST" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SYSTEM ANALYST') echo ' selected="selected"'; ?>>SYSTEM ANALYST</option>			  

				            <option value="SYSTEM ENGINEER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SYSTEM ENGINEER') echo ' selected="selected"'; ?>>SYSTEM ENGINEER</option>			  

				            <option value="TEACHER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'TEACHER') echo ' selected="selected"'; ?>>TEACHER</option>			  

				            <option value="TECHNICIAN" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'TECHNICIAN') echo ' selected="selected"'; ?>>TECHNICIAN</option>			  

				            <option value="TRUSTEE" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'TRUSTEE') echo ' selected="selected"'; ?>>TRUSTEE</option>			  

				            <option value="VICE PRESIDENT" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'VICE PRESIDENT') echo ' selected="selected"'; ?>>VICE PRESIDENT</option>			  

				            <option value="MKTG MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'MKTG MANAGER') echo ' selected="selected"'; ?>>MKTG MANAGER</option>			  

				            <option value="NATIONAL SALES MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'NATIONAL SALES MANAGER') echo ' selected="selected"'; ?>>NATIONAL SALES MANAGER</option>			  
				            <option value="OFFICER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'OFFICER') echo ' selected="selected"'; ?>>OFFICER</option>			  

				            <option value="OPERATORS" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'OPERATORS') echo ' selected="selected"'; ?>>OPERATORS</option>			  

				            <option value="PARTNER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'PARTNER') echo ' selected="selected"'; ?>>PARTNER</option>			  

				            <option value="PEON" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'PEON') echo ' selected="selected"'; ?>>PEON</option>			  

							<option value="OTHERS" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'OTHERS') echo ' selected="selected"'; ?>>OTHERS</option>			  

		  
				        </select>
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Office/ Work Email Address *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter work email id" class="input-cust-name" type="email" name="org_work_email" maxlength="30"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_WORK_EMAIL?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of joining with current organization *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					 <input  class="input-cust-name" type="text" name="org_working_from" id="org_working_from" value="<?php if(!empty($row))echo $row->ORG_WORKED_FROM;?>" readonly>
	  				</div> 	 
                    <div style="margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-fax"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Salary  Received*</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select  required="true" class="input-cust-name" id="salary_recived" name="salary_recived">
				        	<option value="">Select Option</option>
				            <option value="Bank" <?php if(!empty($row))if ($row->SALARY_RECIVED == 'Bank') echo ' selected="selected"'; ?>>Bank</option>	
							<option value="Cash" <?php if(!empty($row))if ($row->SALARY_RECIVED == 'Cash') echo ' selected="selected"'; ?>>Cash</option>	


		  
				        </select>
	  				</div> 							
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Monthly Take Home Salary For The Last 3 Months Are *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<?php echo date('M', strtotime('-3 month'));?>
	  					<input min="0" style=" margin-bottom: 10px;" placeholder="<?php echo date('M', strtotime('-3 month'));?> months salary *" class="input-cust-name" type="number" name="salary_1"  required="true" maxlength="12"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_SALARY_1?>">
	  					<?php echo date('M', strtotime('-2 month'));?>
	  					<input min="0" Style="margin-bottom:16px;" placeholder="<?php echo date('M', strtotime('-2 month'));?> months salary *" class="input-cust-name" type="number" name="salary_2"  required="true" maxlength="12"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_SALARY_2?>">
	  					<?php echo date('M', strtotime('-1 month'));?>
	  					<input min="0" placeholder="<?php echo date('M', strtotime('-1 month'));?> months salary *" class="input-cust-name" type="number" name="salary_3"  required="true" maxlength="12"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_SALARY_3?>">
	  				</div>  

	  				<div class="w-100"></div>

	  				<div class="col" style="margin-top: 6px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Please Tell Your Total Work Experience *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 50px; margin-top: 8px;" class="row">
						<input min="1" style="margin-right: 6px;" placeholder="Enter year *" class="other-income-select" type="number" name="work_experience_year" value="<?php if(!empty($row))echo $row->ORG_EXP_YEAR?>">
						<input min="1" placeholder="Enter months *" class="other-income-select" type="number" name="work_experience_month"  required="true" maxlength="2"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_EXP_MONTH?>">	  											
					</div>								  				
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Annual Gross Salary *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" placeholder="Annual gross salary" class="input-cust-name" type="number" name="org_gross_salary" required="true" maxlength="12"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_ANNUAL_SALARY?>">
	  				</div>  				  				

	  				<div class="w-100"></div>	  				  				

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Other Income Source</span>
					</div>			
				
			
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<?php

	  						if(!empty($row)){
							$json = $row->ORG_OTHER_INCOME;
							$jsonData = json_decode($json);
							if($jsonData!=''){
								$data_array = $jsonData->other_income;
								for ($i=0; $i < count($data_array); $i++) { ?>
				  					<div class="other_income_wrapper">
				  						<fieldset id="incomeS_row">
											<div class="income_row">
										        <select class="other-income-select other-income-select-data" id="faculty" name="salaried_other_income">
										        	<option value="">Source</option>
										            <option value="Agriculture Income" <?php if ($data_array[$i]->title == 'Agriculture Income') echo ' selected="selected"'; ?>>Agriculture Income</option>
										            <option value="Rental / Comission" <?php if ($data_array[$i]->title == 'Rental / Comission') echo ' selected="selected"'; ?>>Rental / Comission</option>
										            <option value="Business" <?php if ($data_array[$i]->title == 'Business') echo ' selected="selected"'; ?>>Business</option>
										            <option value="Other" <?php if ($data_array[$i]->title == 'Other') echo ' selected="selected"'; ?>>Other</option>
										        </select>
										        <input placeholder="Annual Income" class="other-income-select other-income-amount-data" type="number" name="other_income_amount" style="width: 30%;" value="<?php echo $data_array[$i]->amount?>">
										        <input class="income_remove other-income-select" type="button" value="DELETE" style="width: 18%; color: red;">
										    </div>	
										</fieldset> 
									</div>
								<?php }}} else { ?>		  					
									<div class="other_income_wrapper">
				  						<fieldset id="incomeS_row">
											<div class="income_row">
										        <select class="other-income-select other-income-select-data" id="faculty" name="salaried_other_income">
										        	<option value="">Source</option>
										            <option value="Agriculture Income" <?php if(!empty($row))if ($data_array[$i]->title == 'Agriculture Income') echo ' selected="selected"'; ?>>Agriculture Income</option>
										            <option value="Rental / Comission" <?php if(!empty($row))if ($data_array[$i]->title == 'Rental / Comission') echo ' selected="selected"'; ?>>Rental / Comission</option>
										            <option value="Business" <?php if(!empty($row))if ($data_array[$i]->title == 'Business') echo ' selected="selected"'; ?>>Business</option>
										            <option value="Other" <?php if(!empty($row))if ($data_array[$i]->title == 'Other') echo ' selected="selected"'; ?>>Other</option>
										        </select>
										        <input min="0" placeholder="Annual Income" class="other-income-select other-income-amount-data" type="number" name="other_income_amount" style="width: 30%;" value="<?php if(!empty($row))echo $data_array[$i]->amount?>">
										        <input class="income_remove other-income-select" type="button" value="DELETE" style="width: 18%; color: red;">
										    </div>	
										</fieldset> 
									</div>
								<?php } ?>

						<div style="color: blue;" class="add-more" type="button" id="add_more_income">Add More</div>  			
	  				</div> 

				</div>							
			</div>	

		

			<!-- <div class="row shadow bg-white rounded margin-10 padding-15">
				
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us bit more about EMI's</span>
					<div class="w-100"></div>

					<div class="row col-12" style="color: black; font-size: 14px;">
						<span class="align-middle dot-light-theme" style="margin-top: -5px;"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 12px;">Existing EMI's *</span>
						<div style="margin-left: 20px;" class="custom-control custom-switch">				  
						  <input checked type="checkbox" class="custom-control-input" id="emiSwitches" name="resiperchk">
						  <label class="custom-control-label" for="emiSwitches">Do you have any emi's ?</label>				  
						</div>					
					</div>
				</div>

				<div id="emisLayout" style="margin-left: 35px;" class="col">
					
	  					<?php

	  						if(!empty($row->EMIS)){
							$json = $row->EMIS;

							$jsonData = json_decode($json);
							if($jsonData!=''){
								$data_array = $jsonData->emis;
								for ($i=0; $i < count($data_array); $i++) { ?>
										<div class="emis_wrapper">
				  						<fieldset id="emisS_row">
											<div class="emis_row" id="line_1">
										        <select style="width: 17%;" class="other-income-select emis-select-data" id="emis" name="emi[]">
										        	<option id='1_1' value="">Select Loan Type</option>
										            <option id='2_1' value="Personal Loan" <?php if ($data_array[$i]->title == 'Personal Loan') echo ' selected="selected"'; ?>>Personal Loan</option>
										            <option id='3_1' value="Business Loan" <?php if ($data_array[$i]->title == 'Business Loan') echo ' selected="selected"'; ?>>Business Loan</option>
										            <option id='4_1' value="Home Loan" <?php if ($data_array[$i]->title == 'Home Loan') echo ' selected="selected"'; ?>>Home Loan</option>
										            <option id='5_1' value="Plot Loan" <?php if ($data_array[$i]->title == 'Plot Loan') echo ' selected="selected"'; ?>>Plot Loan</option>
													
													
										            <option id='6_1' value="Vehicle Loan" <?php if ($data_array[$i]->title == 'Vehicle Loan') echo ' selected="selected"'; ?>>Vehicle Loan</option>
										            <option id='7_1' value="Education loan" <?php if ($data_array[$i]->title == 'Education loan') echo ' selected="selected"'; ?>>Education loan</option>
										            <option id='8_1' value="SME LOAN" <?php if ($data_array[$i]->title == 'SME LOAN') echo ' selected="selected"'; ?>>SME LOAN</option>
										            <option id='9_1' value="Agriculture Loan" <?php if ($data_array[$i]->title == 'Agriculture Loan') echo ' selected="selected"'; ?>>Agriculture Loan</option>
													 <option id='10_1' value="Gold Loan" <?php if ($data_array[$i]->title == 'Gold Loan') echo ' selected="selected"'; ?>>Gold Loan</option>
										            <option id='11_1' value="Consumer loan" <?php if ($data_array[$i]->title == 'Consumer loan') echo ' selected="selected"'; ?>>Consumer loan</option>
										            <option id='12_1' value="Credit Card " <?php if ($data_array[$i]->title == 'Credit Card ') echo ' selected="selected"'; ?>>Credit Card </option>
										           
										        </select>
										        <input min="0" placeholder="Loan Amount" class="other-income-select emis-loan-data" type="number" name="emis_loan_amount" style="width: 17%;" value="<?php echo $data_array[$i]->loan_amount;?>">
										        <input min="0" placeholder="Outstanding Loan" class="other-income-select emis-outstanding-data" type="number" name="emis_outstanding_amount" style="width: 17%;" value="<?php echo $data_array[$i]->outstanding_amount;?>">
										        <input min="0" placeholder="EMI" class="other-income-select emis-emi-data" type="number" name="emis_emi_amount" style="width: 17%;" value="<?php echo $data_array[$i]->emi_amount;?>">
										        <input min="0" placeholder="Balance Term in Months" class="other-income-select emis-bal_from-data" type="number" name="emis_bal_from_amount" style="width: 17%;" value="<?php echo $data_array[$i]->bal_from_amount;?>">
										        <input class="emis_remove other-income-select" type="button" value="-" style="width: 8%; color: red;" >
										    </div>	
										</fieldset>
									</div>	
								<?php } 
								}
							} else { ?>
								<div class="emis_wrapper">
				  						<fieldset id="emisS_row">
											<div class="emis_row" id="line_1">
										        <select style="width: 17%;" class="other-income-select emis-select-data" id="emis" name="emi[]">
										        	<option id='1_1' value="">Select Loan Type</option>
										            <option id='2_1'>Personal Loan</option>
										            <option id='3_1' >Business Loan</option>
										            <option id='4_1' >Home Loan</option>
										            <option id='5_1' >Plot Loan</option>
										            <option id='6_1' >Vehicle Loan</option>
										            <option id='7_1'>Education loan</option>
										            <option id='8_1'>SME LOAN</option>
										            <option id='9_1'>Agriculture Loan</option>
													 <option id='10_1'>Gold Loan</option>
										            <option id='11_1' >Consumer loan</option>
										            <option id='12_1' >Credit Card </option>
												   
										        </select>
										        <input min="0" placeholder="Loan Amount" class="other-income-select emis-loan-data" type="number" name="emis_loan_amount" style="width: 17%;" >
										        <input min="0" placeholder="Outstanding Loan" class="other-income-select emis-outstanding-data" type="number" name="emis_outstanding_amount" style="width: 17%;" >
										        <input min="0" placeholder="EMI" class="other-income-select emis-emi-data" type="number" name="emis_emi_amount" style="width: 17%;" >
										        <input min="0" placeholder="Balance Term in Months" class="other-income-select emis-bal_from-data" type="number" name="emis_bal_from_amount" style="width: 17%;" >
										        <input class="emis_remove other-income-select" type="button" value="-" style="width: 8%; color: red;" >
										    </div>	
										</fieldset>
									</div>	
						<?php }?>

						<div style="color: blue;" class="add-more" type="button" id="add_more_emis">Add More</div>
	  				</div> 
			</div> -->

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us bit more about your Reference's in organisation</span>

				</div>
					<div class="col-12" style="margin-bottom: 20px; color: black; font-size: 14px;">
				<span>Reference's same as Applicant  <input type="checkbox" name="references" id="references"></span>

			</div>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:14px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-o"></i></span> <span style="color: black; font-size: 13px; margin-left: 8px;  font-weight: bold; ">Reference 1 *</span>
				</div>			

				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">First Name *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter first name" class="input-cust-name" type="text" id="org_ref_f_name" name="org_ref_f_name" required="true" maxlength="20" oninput="validateText(this)" value="<?php if(!empty($row))echo $row->REF_1_F_NAME?>">
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Middle Name </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter middle name" class="input-cust-name" type="text" id="org_ref_m_name" name="org_ref_m_name" maxlength="20" oninput="validateText(this)" value="<?php if(!empty($row))echo $row->REF_1_M_NAME?>">
	  				</div>  
	  							  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Last Name *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter last name" class="input-cust-name" type="text" id="org_ref_l_name" name="org_ref_l_name" required="true" maxlength="20" oninput="validateText(this)" value="<?php if(!empty($row))echo $row->REF_1_L_NAME?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:13px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter last name" class="input-cust-name" type="number" id="org_ref_mobile" name="org_ref_mobile" required="true" maxlength="10" oninput="maxLengthCheck(this)" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" minlength="10" value="<?php if(!empty($row))echo $row->REF_1_MOBILE?>">
	  				</div>  				  				
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div style="margin-top: 10px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Relationship with you *</span>
						</div>			
					
		  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
		  					<select required class="input-cust-name" id="org_ref_relation" name="org_ref_relation"> 
							  <option value="">Select Relationship *</option>
							  <option value="friend" <?php if(!empty($row))if ($row->REF_1_RELATION == 'friend') echo ' selected="selected"'; ?>>Friend</option>
							  <option value="relative" <?php if(!empty($row))if ($row->REF_1_RELATION == 'relative') echo ' selected="selected"'; ?>>Relative</option>
							  <option value="wife" <?php if(!empty($row))if ($row->REF_1_RELATION == 'wife') echo ' selected="selected"'; ?>>Wife</option>
							  <option value="bro" <?php if(!empty($row))if ($row->REF_1_RELATION == 'bro') echo ' selected="selected"'; ?>>Brother</option>
							  <option value="sister" <?php if(!empty($row))if ($row->REF_1_RELATION == 'sister') echo ' selected="selected"'; ?>>Sister</option>
							  <option value="other" <?php if(!empty($row))if ($row->REF_1_RELATION == 'other') echo ' selected="selected"'; ?>>Other</option>
							</select>
		  				</div>  			
				</div>

				<div style="margin-top: 30px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:14px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-o"></i></span> <span style="color: black; font-size: 13px; margin-left: 8px;  font-weight: bold; ">Reference 2</span>
				</div>			

				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">First Name *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter first name" class="input-cust-name" type="text" id="org_ref_2_f_name" name="org_ref_2_f_name" required="true" maxlength="20" oninput="validateText(this)" value="<?php if(!empty($row))echo $row->REF_2_F_NAME?>">
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Middle Name </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter middle name" class="input-cust-name" type="text" id="org_ref_2_m_name" name="org_ref_2_m_name"  maxlength="20" oninput="validateText(this)" value="<?php if(!empty($row))echo $row->REF_2_M_NAME?>">
	  				</div>  
	  							  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Last Name *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter last name" class="input-cust-name" type="text" id="org_ref_2_l_name" name="org_ref_2_l_name" required="true" maxlength="20" oninput="validateText(this)" value="<?php if(!empty($row))echo $row->REF_2_L_NAME?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:13px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter last name" class="input-cust-name" type="number" id="org_ref_2_mobile" name="org_ref_2_mobile" required="true" maxlength="10" oninput="maxLengthCheck(this)" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" minlength="10" value="<?php if(!empty($row))echo $row->REF_2_MOBILE?>">
	  				</div>  				  				
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div style="margin-top: 10px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Relationship with you *</span>
						</div>			
					
		  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
		  					<select required class="input-cust-name" id="org_ref_2_relation" name="org_ref_2_relation"> 
							  <option value="">Select Relationship *</option>
							  <option value="friend" <?php if(!empty($row))if ($row->REF_2_RELATION == 'friend') echo ' selected="selected"'; ?>>Friend</option>
							  <option value="relative" <?php if(!empty($row))if ($row->REF_2_RELATION == 'relative') echo ' selected="selected"'; ?>>Relative</option>
							  <option value="wife" <?php if(!empty($row))if ($row->REF_2_RELATION == 'wife') echo ' selected="selected"'; ?>>Wife</option>
							  <option value="bro" <?php if(!empty($row))if ($row->REF_2_RELATION == 'bro') echo ' selected="selected"'; ?>>Brother</option>
							  <option value="sister" <?php if(!empty($row))if ($row->REF_2_RELATION == 'sister') echo ' selected="selected"'; ?>>Sister</option>
							  <option value="other" <?php if(!empty($row))if ($row->REF_2_RELATION == 'other') echo ' selected="selected"'; ?>>Other</option>
							</select>
		  				</div>  			
				</div>						
			</div>
			</div>

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row col-12 justify-content-center">
					<div>
						<a href="<?php echo base_url()?>index.php/customer/customer_documents">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							CONTINUE
						</button></a>						
					</div>		
				</div>					
			</div>
		</form>
		<?php } ?>	

		<!-- self employed ------------------------------- -->
		<?php if($type == 'business'|| $type=='self employeed') { ?>	
			<form method="POST" action="<?php echo base_url(); ?>index.php/customer/coapplicant_new_screen_two_action_business" id="customer_flow_update_s_two_business" name="customer_flow_update_s_two_business">
			<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Address Of Your Business</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">This will help us to collect any documents if necessary.</span>

			</div>
			<div class="w-100"></div>

			<div class="col-12" style="margin-left: 20px; margin-bottom: 20px; color: black; font-size: 14px;">
				<div class="clearBoth"></div>
				<input style="margin-right: 5px;" type="radio" name="coapp_add_radio" value="Same as permanent address">Same As Permanent Address
				<input style="margin-left: 10px; margin-right: 5px;" type="radio" name="coapp_add_radio" value="Same as residential address">Same as residential address				
				<input hidden="true" style="margin-left: 10px; margin-right: 5px;" type="text" id="s_url" value="<?php echo base_url()?>">
				<input hidden="true" style="margin-left: 10px; margin-right: 5px;" type="text" name="coappid" id="coappid" value="<?php echo $co_app;?>">
				<div class="clearBoth"></div>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required="true" maxlength="20" oninput="maxLengthCheck(this)" style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row))echo $row->ORG_ADRS_LINE_1?>">
  					<input  maxlength="20" oninput="maxLengthCheck(this)" style="margin-top: 8px;" placeholder="Address Line 2 *" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row))echo $row->ORG_ADRS_LINE_2?>">
  					<input  maxlength="20" oninput="maxLengthCheck(this)" style="margin-top: 8px;" placeholder="Address Line 3 *" class="input-cust-name" type="text" name="resi_add_3" id="resi_add_3" value="<?php if(!empty($row))echo $row->ORG_ADRS_LINE_3?>">
  				</div>  

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No Of Years At Current Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input min="1" required="true" maxlength="2" oninput="maxLengthCheck(this)" placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years" id="resi_no_of_years" value="<?php if(!empty($row))echo $row->BIS_YEARS_CURRERENT_ADDRS?>">
  				</div>			  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required="true" maxlength="20" oninput="maxLengthCheck(this)" placeholder="Enter landmark *" class="input-cust-name" type="text" name="business_landmark" id="business_landmark" value="<?php if(!empty($row))echo $row->ORG_LANDMARK?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input pattern="[0-9]{6}" required="true" maxlength="6" oninput="maxLengthCheck(this)" placeholder="Enter pincode *" title="Please enter valid pincode" class="input-cust-name" type="text" minlength="6" name="resi_pincode" id="resi_pincode" value="<?php if(!empty($row))echo $row->ORG_PINCODE?>">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select required class="input-cust-name" name="sel_property_type" id="sel_property_type"> 
					  <option value="">Select Property Type *</option>					  
					  <option value="Corporate Provided" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
					  <option value="Mortgaged" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
					  <option value="Owned" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
					  <option value="Rented" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
					  <option value="Shared Accomodation" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
					  <option value="Paying Guest" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
					  <option value="Ancestral Property" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Ancestral Property') echo ' selected="selected"'; ?>>Ancestral Property</option>
					  <option value="Parents Owned" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Parents Owned') echo ' selected="selected"'; ?>>Parents Owned</option>
					  <option value="Brother/ Sister owned" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Brother/ Sister owned') echo ' selected="selected"'; ?>>Brother/ Sister owned</option>
					  <option value="Others" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
					</select>
  				</div>  			  							  				
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" id="resi_state_view" placeholder="State" class="input-cust-name" value="<?php if(!empty($row))echo $row->ORG_STATE ;?>">
  					<input hidden="true" placeholder="State" class="input-cust-name" name="resi_state" id="resi_state" value="<?php if(!empty($row))echo $row->ORG_STATE ;?>">

  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District" class="input-cust-name" id="resi_district_view" value="<?php if(!empty($row))echo $row->ORG_DISTRICT ;?>">
  					<input hidden="true" placeholder="District" class="input-cust-name" name="resi_district" id="resi_district" value="<?php if(!empty($row))echo $row->ORG_DISTRICT ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="City" class="input-cust-name" name="resi_city" id="resi_city" value="<?php if(!empty($row))echo $row->ORG_CITY ;?>">
  				</div>   			  				
			</div> 			
		</div>
		<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Awesome</span>

				</div>
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">Please can you tell a bit more about your organisation.</span>

				</div>
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">						  			

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Employment Sector *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  						<select required class="input-cust-name" name="self_emp_operating"> 
						   <option value="">Select Type *</option>
						  <option value="Mechanical" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Mechanical') echo ' selected="selected"'; ?>>Mechanical</option>
						  <option value="Electronics" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Electronics') echo ' selected="selected"'; ?>>Electronics</option>			
						  <option value="Software" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Software') echo ' selected="selected"'; ?>>Software</option>
						  <option value="Automobile" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Automobile') echo ' selected="selected"'; ?>>Automobile</option>
						  <option value="Engineering" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Engineering') echo ' selected="selected"'; ?>>Engineering</option>
						  <option value="Trading" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Trading') echo ' selected="selected"'; ?>>Trading</option>
						  <option value="Hospitality" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Hospitality') echo ' selected="selected"'; ?>>Hospitality</option>
						  <option value="Medical" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Medical') echo ' selected="selected"'; ?>>Medical</option>			  
						  <option value="Tourism" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Tourism') echo ' selected="selected"'; ?>>Tourism</option>			  
						  <option value="Hotel" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Hotel') echo ' selected="selected"'; ?>>Hotel</option>	
                          <option value="Finance" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Finance') echo ' selected="selected"'; ?>>Finance</option>
						  <option value="Banking" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Banking') echo ' selected="selected"'; ?>>Banking</option>			
						  <option value="Insurance" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Insurance') echo ' selected="selected"'; ?>>Insurance</option>
						  <option value="Vegetable " <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Vegetable ') echo ' selected="selected"'; ?>>Vegetable </option>
						  <option value="Fruits" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Fruits') echo ' selected="selected"'; ?>>Fruits</option>
						  <option value="Teaching" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Teaching') echo ' selected="selected"'; ?>>Teaching</option>
						  <option value="Sports" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Sports') echo ' selected="selected"'; ?>>Sports</option>
						  <option value="Fitness" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Fitness') echo ' selected="selected"'; ?>>Fitness</option>			  
						  <option value="Coaching class" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Coaching class') echo ' selected="selected"'; ?>>Coaching Class</option>			  
						  <option value="Shipping" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Shipping') echo ' selected="selected"'; ?>>Shipping</option>								  
						  <option value="Real Estate" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Real Estate') echo ' selected="selected"'; ?>>Real Estate</option>
                          <option value="Infrastructure" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Infrastructure') echo ' selected="selected"'; ?>>Infrastructure</option>
						  <option value="Food" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Food') echo ' selected="selected"'; ?>>Food</option>			
						  <option value="Agriculture" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Agriculture') echo ' selected="selected"'; ?>>Agriculture</option>
						  <option value="Grocery" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Grocery') echo ' selected="selected"'; ?>>Grocery</option>
						  <option value="Departmental" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Departmental') echo ' selected="selected"'; ?>>Departmental</option>
						  <option value="Education" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Education') echo ' selected="selected"'; ?>>Education</option>
						  <option value="Clothing" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Clothing') echo ' selected="selected"'; ?>>Clothing</option>			  
						  <option value="Shoes" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Shoes') echo ' selected="selected"'; ?>>Shoes</option>			  
						  <option value="Plastic" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Plastic') echo ' selected="selected"'; ?>>Plastic</option>	
                          <option value="Manufacturing " <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Manufacturing ') echo ' selected="selected"'; ?>>Manufacturing </option>						  
						  <option value="Others" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Others') echo ' selected="selected"'; ?>>Others</option>	 			  						  
						</select>
	  				</div>  
	  					
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Premises Type *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<select required class="input-cust-name" name="self_emp_property_type"> 
						  <option value="">Select Premises *</option>
						  <option value="Rented" <?php if(!empty($row))if ($row->BIS_PREMISES_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
						  <option value="Self Owned" <?php if(!empty($row))if ($row->BIS_PREMISES_TYPE == 'Self Owned') echo ' selected="selected"'; ?>>Self Owned</option>						  
						  <option value="Others" <?php if(!empty($row))if ($row->BIS_PREMISES_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>						  
						</select>
	  				</div> 			  				
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Nature of Business *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<select required class="input-cust-name" name="business_nature"> 
						 						  <option value="">Select Business Nature *</option>
						  <option value="RECOVERY AGENT" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'RECOVERY AGENT') echo ' selected="selected"'; ?>>RECOVERY AGENT</option>			  

						  <option value="RETAILER" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'RETAILER') echo ' selected="selected"'; ?>>RETAILER</option>			  

						  <option value="SERVICES" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'SERVICES') echo ' selected="selected"'; ?>>SERVICES</option>			  

						  <option value="SMALL NON BRANDED COURIER COMPANIES" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'SMALL NON BRANDED COURIER COMPANIES') echo ' selected="selected"'; ?>>SMALL NON BRANDED COURIER COMPANIES</option>			  

						  <option value="SMALL TRAVEL AGENTS/TOUR OPERATORS/TOUR TAXI OPERATORS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'SMALL TRAVEL AGENTS/TOUR OPERATORS/TOUR TAXI OPERATORS') echo ' selected="selected"'; ?>>SMALL TRAVEL AGENTS/TOUR OPERATORS/TOUR TAXI OPERATORS</option>			  

						  <option value="STAND ALONE STD/XEROX BOOTH OWNERS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'STAND ALONE STD/XEROX BOOTH OWNERS') echo ' selected="selected"'; ?>>STAND ALONE STD/XEROX BOOTH OWNERS</option>			  

						  <option value="STOCK BROKERS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'STOCK BROKERS') echo ' selected="selected"'; ?>>STOCK BROKERS</option>			  

						  <option value="TRADING" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'TRADING') echo ' selected="selected"'; ?>>TRADING</option>			  

						  <option value="WHOLESALER" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'WHOLESALER') echo ' selected="selected"'; ?>>WHOLESALER</option>			  

						  <option value="WINE SHOP OWNERS/BAR RESTAURANT OWNERS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'WINE SHOP OWNERS/BAR RESTAURANT OWNERS') echo ' selected="selected"'; ?>>WINE SHOP OWNERS/BAR RESTAURANT OWNERS</option>			  
						  <option value="YOUNG INSURANCE AGENT < 30 YEARS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'YOUNG INSURANCE AGENT < 30 YEARS') echo ' selected="selected"'; ?>>YOUNG INSURANCE AGENT < 30 YEARS</option>			  

						  <option value="MOTOR TRAINING SCHOOL" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'MOTOR TRAINING SCHOOL') echo ' selected="selected"'; ?>>MOTOR TRAINING SCHOOL</option>			  
						  <option value="OCTROI/RTO AGENT" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'OCTROI/RTO AGENT') echo ' selected="selected"'; ?>>OCTROI/RTO AGENT</option>	

						  <option value="OWNERS OF PRIVARE SECURITY SERVICES AGENCIES" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'OWNERS OF PRIVARE SECURITY SERVICES AGENCIES') echo ' selected="selected"'; ?>>OWNERS OF PRIVARE SECURITY SERVICES AGENCIES</option>			  
						  <option value="PERTOL PUMP OWNER" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'PERTOL PUMP OWNER') echo ' selected="selected"'; ?>>PERTOL PUMP OWNER</option>			  

						  <option value="POLITICIANS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'POLITICIANS') echo ' selected="selected"'; ?>>POLITICIANS</option>			  

						  <option value="REAL STATE AGENTS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'REAL STATE AGENTS') echo ' selected="selected"'; ?>>REAL STATE AGENTS</option>			  

						  <option value="DOCTOR" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'DOCTOR') echo ' selected="selected"'; ?>>DOCTOR</option>			  

						  <option value="DSA" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'DSA') echo ' selected="selected"'; ?>>DSA</option>			  

						  <option value="FILM INDUSTRY RELATED PEOPLE" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'FILM INDUSTRY RELATED PEOPLE') echo ' selected="selected"'; ?>>FILM INDUSTRY RELATED PEOPLE</option>			  

						  <option value="GARAGE OWNER" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'GARAGE OWNER') echo ' selected="selected"'; ?>>GARAGE OWNER</option>			  

						  <option value="INSURANCE AGENT" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'INSURANCE AGENT') echo ' selected="selected"'; ?>>INSURANCE AGENT</option>			  

						  <option value="LABOUR CONTRACTORS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'LABOUR CONTRACTORS') echo ' selected="selected"'; ?>>LABOUR CONTRACTORS</option>			  

						  <option value="LAWYER" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'LAWYER') echo ' selected="selected"'; ?>>LAWYER</option>			  

						  <option value="MANPOWER CONSULTANTS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'MANPOWER CONSULTANTS') echo ' selected="selected"'; ?>>MANPOWER CONSULTANTS</option>			 

						  <option value="MANUFACTURING" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'MANUFACTURING') echo ' selected="selected"'; ?>>MANUFACTURING</option>			  

						  <option value="MBBS DOCTOR" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'MBBS DOCTOR') echo ' selected="selected"'; ?>>MBBS DOCTOR</option>			  						  		  	
						  <option value="MD/MS/MDS Doctor" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'MD/MS/MDS Doctor') echo ' selected="selected"'; ?>>MD/MS/MDS Doctor</option>			  	

						  <option value="ARCHITECT" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'ARCHITECT') echo ' selected="selected"'; ?>>ARCHITECT</option>			  

						  <option value="ASTROLOGER" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'ASTROLOGER') echo ' selected="selected"'; ?>>ASTROLOGER</option>			  

						  <option value="AUTO SPARE DEALERS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'AUTO SPARE DEALERS') echo ' selected="selected"'; ?>>AUTO SPARE DEALERS</option>			  

						  <option value="BUILDERS AND DEVELOPERS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'BUILDERS AND DEVELOPERS') echo ' selected="selected"'; ?>>BUILDERS AND DEVELOPERS</option>			  

						  <option value="BUILDING MATERIAL SUPPLIERS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'BUILDING MATERIAL SUPPLIERS') echo ' selected="selected"'; ?>>BUILDING MATERIAL SUPPLIERS</option>			  

						  <option value="CABLE TV OPERATORS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'CABLE TV OPERATORS') echo ' selected="selected"'; ?>>CABLE TV OPERATORS</option>			  

						  <option value="CHARTERED ACCOUNTANT" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'CHARTERED ACCOUNTANT') echo ' selected="selected"'; ?>>CHARTERED ACCOUNTANT</option>			  

						  <option value="CHIT FUND OPERATORS/ SE OPERATING FINANCE BUSINESS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'CHIT FUND OPERATORS/ SE OPERATING FINANCE BUSINESS') echo ' selected="selected"'; ?>>CHIT FUND OPERATORS/ SE OPERATING FINANCE BUSINESS</option>			  

						  <option value="COMISSION AGENTS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'COMISSION AGENTS') echo ' selected="selected"'; ?>>COMISSION AGENTS</option>			  

						  <option value="MASSAGE PARLOUR/BEAUTY PARLOUR" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'MASSAGE PARLOUR/BEAUTY PARLOUR') echo ' selected="selected"'; ?>>MASSAGE PARLOUR/BEAUTY PARLOUR</option>			  

						  <option value="CONSULTANTS OPERATING FROM RESIDENCE" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'CONSULTANTS OPERATING FROM RESIDENCE') echo ' selected="selected"'; ?>>CONSULTANTS OPERATING FROM RESIDENCE</option>			  

						  <option value="CONTRACTORS (ALL TYPE)" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'CONTRACTORS (ALL TYPE)') echo ' selected="selected"'; ?>>CONTRACTORS (ALL TYPE)</option>			  	  
							<option value="TIFFIN SERVICE" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'TIFFIN SERVICE') echo ' selected="selected"'; ?>>TIFFIN SERVICE</option>
						  <option value="OTHERS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'Others') echo ' selected="selected"'; ?>>OTHERS</option>			  	  

						</select>
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No Of Years In Business *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<input min="1" required="true" maxlength="2" oninput="maxLengthCheck(this)" placeholder="Enter years" class="input-cust-name" type="number" name="self_emp_no_years" value="<?php if(!empty($row))echo $row->BIS_YEARS_IN_BIS?>">
	  				</div> 
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Consitution Of Company *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<select required class="input-cust-name" name="business_constitution" id="business_constitution"> 
						 <option value="">Select Consitution *</option>
						  <option value="HUF" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'HUF') echo ' selected="selected"'; ?>>HUF</option>			  

						  <option value="INDIVIDUAL" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'INDIVIDUAL') echo ' selected="selected"'; ?>>INDIVIDUAL</option>			  

						  <option value="INDIVIDUAL - MUTUAL FUND" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'INDIVIDUAL - MUTUAL FUND') echo ' selected="selected"'; ?>>INDIVIDUAL - MUTUAL FUND</option>			  

						  <option value="PARTNERSHIP" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'PARTNERSHIP') echo ' selected="selected"'; ?>>PARTNERSHIP</option>			  

						  <option value="PRIVATE LIMITED COMPANY" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'PRIVATE LIMITED COMPANY') echo ' selected="selected"'; ?>>PRIVATE LIMITED COMPANY</option>			  
						  <option value="PRIVATE LTD." <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'PRIVATE LTD.') echo ' selected="selected"'; ?>>PRIVATE LTD.</option>			  

						  <option value="PROPRIETORSHIP" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'PROPRIETORSHIP') echo ' selected="selected"'; ?>>PROPRIETORSHIP</option>			  

						  <option value="PUBLIC LIMITED CMPANY" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'PUBLIC LIMITED CMPANY') echo ' selected="selected"'; ?>>PUBLIC LIMITED CMPANY</option>			  
						  <option value="SOCIETY" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'SOCIETY') echo ' selected="selected"'; ?>>SOCIETY</option>			  

						  <option value="TRUST" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'TRUST') echo ' selected="selected"'; ?>>TRUST</option>			  

						  <option value="Others" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'Others') echo ' selected="selected"'; ?>>Others</option>			  
						  
						</select>
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Designation *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<select required class="input-cust-name" name="business_desi"> 
 <option value="">Select Designation *</option>
						  <option value="ACCOUNTANT" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'ACCOUNTANT') echo ' selected="selected"'; ?>>ACCOUNTANT</option>			  

				            <option value="AREA SALES MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'AREA SALES MANAGER') echo ' selected="selected"'; ?>>AREA SALES MANAGER</option>			  

				            <option value="ASSISTANT" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'ASSISTANT') echo ' selected="selected"'; ?>>ASSISTANT</option>			  

				            <option value="ASSISTANT MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'ASSISTANT MANAGER') echo ' selected="selected"'; ?>>ASSISTANT MANAGER</option>			  

				            <option value="ASST VICE PRESIDENT" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'ASST VICE PRESIDENT') echo ' selected="selected"'; ?>>ASST VICE PRESIDENT</option>			  

				            <option value="CHIEF EXECUTIVE OFFICER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'CHIEF EXECUTIVE OFFICER') echo ' selected="selected"'; ?>>CHIEF EXECUTIVE OFFICER</option>			  

				            <option value="CLERK" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'CLERK') echo ' selected="selected"'; ?>>CLERK</option>			  

				            <option value="DATA ENTRY OPERATOR" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'DATA ENTRY OPERATOR') echo ' selected="selected"'; ?>>DATA ENTRY OPERATOR</option>			  

				            <option value="DIRECTOR" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'DIRECTOR') echo ' selected="selected"'; ?>>DIRECTOR</option>			  

				            <option value="DY MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'DY MANAGER') echo ' selected="selected"'; ?>>DY MANAGER</option>			  

				            <option value="ENGINEER" <?php  if(!empty($row))if ($row->BIS_DESIGNATION == 'ENGINEER') echo ' selected="selected"'; ?>>ENGINEER</option>			  

				            <option value="EXECUTIVE" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'EXECUTIVE') echo ' selected="selected"'; ?>>EXECUTIVE</option>			  

				            <option value="EXECUTIVE DIRECTOR" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'EXECUTIVE DIRECTOR') echo ' selected="selected"'; ?>>EXECUTIVE DIRECTOR</option>			  

				            <option value="HOUSEWIFE" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'HOUSEWIFE') echo ' selected="selected"'; ?>>HOUSEWIFE</option>			  

				            <option value="LECTURER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'LECTURER') echo ' selected="selected"'; ?>>LECTURER</option>			  

				            <option value="LIBRARIAN" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'LIBRARIAN') echo ' selected="selected"'; ?>>LIBRARIAN</option>			  

				            <option value="MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'MANAGER') echo ' selected="selected"'; ?>>MANAGER</option>			  

				            <option value="PROPRIETOR" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'PROPRIETOR') echo ' selected="selected"'; ?>>PROPRIETOR</option>			  

				            <option value="REGIONAL MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'REGIONAL MANAGER') echo ' selected="selected"'; ?>>REGIONAL MANAGER</option>			  

				            <option value="SALES EXECUTIVE" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SALES EXECUTIVE') echo ' selected="selected"'; ?>>SALES EXECUTIVE</option>			  

				            <option value="SALES MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SALES MANAGER') echo ' selected="selected"'; ?>>SALES MANAGER</option>			  

				            <option value="SECRETARY" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SECRETARY') echo ' selected="selected"'; ?>>SECRETARY</option>			  

				            <option value="SENIOR EXECUTIVE" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SENIOR EXECUTIVE') echo ' selected="selected"'; ?>>SENIOR EXECUTIVE</option>			  

				            <option value="SENIOR MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SENIOR MANAGER') echo ' selected="selected"'; ?>>SENIOR MANAGER</option>			  

				            <option value="SENIOR OFFICER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SENIOR OFFICER') echo ' selected="selected"'; ?>>SENIOR OFFICER</option>			  

				            <option value="STENOGRAPHER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'STENOGRAPHER') echo ' selected="selected"'; ?>>STENOGRAPHER</option>	
                            <option value="STUDENT" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'STUDENT') echo ' selected="selected"'; ?>>STUDENT</option>								

				            <option value="SUPERITENDENT" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SUPERITENDENT') echo ' selected="selected"'; ?>>SUPERITENDENT</option>			  

				            <option value="SUPREVISOR" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SUPREVISOR') echo ' selected="selected"'; ?>>SUPREVISOR</option>			  

				            <option value="SYSTEM ANALYST" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SYSTEM ANALYST') echo ' selected="selected"'; ?>>SYSTEM ANALYST</option>			  

				            <option value="SYSTEM ENGINEER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SYSTEM ENGINEER') echo ' selected="selected"'; ?>>SYSTEM ENGINEER</option>			  

				            <option value="TEACHER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'TEACHER') echo ' selected="selected"'; ?>>TEACHER</option>			  

				            <option value="TECHNICIAN" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'TECHNICIAN') echo ' selected="selected"'; ?>>TECHNICIAN</option>			  

				            <option value="TRUSTEE" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'TRUSTEE') echo ' selected="selected"'; ?>>TRUSTEE</option>			  

				            <option value="VICE PRESIDENT" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'VICE PRESIDENT') echo ' selected="selected"'; ?>>VICE PRESIDENT</option>			  

				            <option value="MKTG MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'MKTG MANAGER') echo ' selected="selected"'; ?>>MKTG MANAGER</option>			  

				            <option value="NATIONAL SALES MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'NATIONAL SALES MANAGER') echo ' selected="selected"'; ?>>NATIONAL SALES MANAGER</option>			  
				            <option value="OFFICER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'OFFICER') echo ' selected="selected"'; ?>>OFFICER</option>			  

				            <option value="OPERATORS" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'OPERATORS') echo ' selected="selected"'; ?>>OPERATORS</option>			  

				            <option value="OTHERS" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'OTHERS') echo ' selected="selected"'; ?>>OTHERS</option>			  

				            <option value="PARTNER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'PARTNER') echo ' selected="selected"'; ?>>PARTNER</option>			  

				            <option value="PEON" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'PEON') echo ' selected="selected"'; ?>>PEON</option>

							<option value="Others" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'Others') echo ' selected="selected"'; ?>>Others</option>
						</select>
	  				</div>  
				</div>
			</div>

												<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Please tell us about your profession</span>

			</div>

			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">This will help us to know about your income related details</span>

			</div>	  											  				
				
			<div class="justify-content-center row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-left: 20px; margin-bottom: 20px; color: black; font-size: 14px;">
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"><input style="margin-right: 5px;" type="radio" name="user_profession"  id="Doctor" value="Doctor" <?php if(!empty($row))if($row->BIS_PROFESSION=='Doctor'){ echo 'checked';} ?>  onclick="show_doctor();" >Doctor</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"><input style="margin-left: 10px; margin-right: 5px;" type="radio"  id="CA" name="user_profession" value="CA" <?php if(!empty($row))if($row->BIS_PROFESSION=='CA'){ echo 'checked';} ?> onclick="show_ca();">CA</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"><input style="margin-right: 5px;" type="radio" name="user_profession"  id="Architect" value="Architect" <?php if(!empty($row))if($row->BIS_PROFESSION=='Architect'){ echo 'checked';} ?>   onclick="show_architech();">Architect</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"><input style="margin-right: 5px;" type="radio" name="user_profession"  id="Lawyer" value="Lawyer" <?php if(!empty($row))if($row->BIS_PROFESSION=='Lawyer'){ echo 'checked';} ?>  onclick="show_lawyer();">Lawyer</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"><input style="margin-right: 5px;" type="radio" name="user_profession" value="Consultant" id="Consultant" <?php if(!empty($row))if($row->BIS_PROFESSION=='Consultant'){ echo 'checked';} ?>  onclick="show_consultant();" >Consultant</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"><input style="margin-right: 5px;" type="radio" name="user_profession" id="Business"   value="Business Man" <?php if(!empty($row))if($row->BIS_PROFESSION=='Business Man'){ echo 'checked';} ?> onclick="show_business();" >Business Man</div>
			</div>
			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-left: 20px; margin-bottom: 20px; color: black; font-size: 14px;">
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"><input style="margin-right: 5px;" type="radio" name="user_profession" id="CS" value="CS" <?php if(!empty($row))if($row->BIS_PROFESSION=='CS'){ echo 'checked';} ?> onclick="show_cs();">CS</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"><input style="margin-right: 5px;" type="radio"  name="user_profession" id="ICWA" value="ICWA" onclick="show_icwa();">ICWA</div>
			</div>	

			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				    <div class="justify-content-center row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >
						<div id="business_man_layout_2">
						<div style="margin-top: 10px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Annual Income *</span>
						</div>			
						
						<div class="w-100"></div>
							
						<div style="margin-left: 35px; margin-top: 8px;" class="col">
							<input placeholder="Enter Annual Income *" class="input-cust-name" type="number" maxlength="18" name="business_annual_income" id="business_annual_income" oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->BIS_ANNUAL_INCOME?>">
						</div>
						
					</div>
					
					<div id="regi_no_layout">
				
					</div>
					<div id="">
					<div class="w-100"></div>
						<div style="margin-top: 10px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Orgnization Name *</span>
						</div>			
						
						<div class="w-100"></div>
							
						<div style="margin-left: 35px; margin-top: 8px;" class="col">
							<input placeholder="Enter Orgnization Name" class="input-cust-name" maxlength="40" name="org_name_buisness" id="org_name_buisness" oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->BIS_NAME?>" required="true">
						    <span style="color:red" id="org_name_buisness_error"></span>
						</div>
					</div>

				</div>	
				<div class="justify-content-center row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">GST Number</span>
					</div>			
					
					<div class="w-100"></div>
						
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<input maxlength="15" oninput="maxLengthCheck(this)" placeholder="Enter GST number" class="input-cust-name" type="text" <?php if(!empty($row_more)){if($row_more->verify_GST_status=='true'){echo 'readonly';}}?> id="business_gst_no" name="business_gst_no" value="<?php if(!empty($row))echo $row->BIS_GST?>">

						<input type="text" id="verify_GST_status" name="verify_GST_status" value="<?php if(!empty($row_more)){echo $row_more->verify_GST_status;} ?>" hidden>
					    <span style="color:red" id="business_gst_no_error"></span>
					</div>
					<div class="w-100"></div>
					    <div style="margin-top: 10px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Business PAN</span>
						</div>			
						
						<div class="w-100"></div>
							
						<div style="margin-left: 35px; margin-top: 8px;" class="col">

							<input  placeholder="Enter PAN" class="input-cust-name" type="text" maxlength="10" <?php if(!empty($row_more)){if($row_more->verify_Bis_Pan_status=='true'){echo 'readonly';}}?> name="business_pan" id="business_pan" oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->BIS_PAN?>">

							<input type="text" id="verify_Bis_Pan_status" name="verify_Bis_Pan_status" value="<?php if(!empty($row_more)){echo $row_more->verify_Bis_Pan_status;} ?>" hidden>
						    <span style="color:red" id="business_pan_error"></span>
						</div>

										
	<!--------------------------------------------------------------- CA-------------------------------------------------------------------------- -->
					
							
			
						<div style="display:none;" id="div_ca">	
							
					     <div style="margin-top:50px;margin-left:-140%; " class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Registration Number *</span>
						</div>			
						
						<div class="w-100"></div> 
						
						
						<input style="margin-left:-120%;"  placeholder="Enter ICAI Number" class="input-cust-name" type="text" maxlength="10" <?php if(!empty($row_more)){if($row_more->verify_ca_regi_status=='true'){echo 'readonly';}}?> name="regi_no_ca" id="icai_number" oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->CA_regi_no?>">
						
						<input type="text" id="verify_ca_regi_status" name="verify_ca_regi_status" value="<?php if(!empty($row_more)){echo $row_more->verify_ca_regi_status;} ?>" hidden>
						    <span style="color:red" id="business_pan_error"></span> 
					
						
						</div>
						
						
			
	<!----------------------------------------------------------------------------------------------------------------------------- ---- -- -->	
	<!-------------------------------------------------------------   CS ---------------------------------------------------------------- ---- -- -->					
					<div style="display:none;" id="div_cs">	
						<div style="margin-top:50px;margin-left:-140%; " class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Registration Number *</span>
						</div>			
						
						<div class="w-100"></div>
						
						<input style="margin-left:-120%;" maxlength="15" oninput="maxLengthCheck(this)" placeholder="Enter CS  Number" class="input-cust-name" type="text" id="cs_number" name="regi_no_cs" value="">
						
						<input type="text" id="verify_cs_regi_status" name="verify_cs_regi_status" value="<?php if(!empty($row_more)){echo $row_more->verify_cs_regi_status;} ?>" hidden>
						    <span style="color:red" id="business_pan_error"></span>  

						</div>	
				
<!---------------------------------------------------------------------------- ICAW ------------------------------------------>						
   		
						<div style="display:none;" id="div_icwa">	
						
						<div style="margin-top:50px;margin-left:-140%;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Registration Number *</span>
						</div>			
						
						<div class="w-100"></div>
						<input  style="margin-left:-120%;" maxlength="15" oninput="maxLengthCheck(this)" placeholder="Enter ICWAI  Number" class="input-cust-name" type="text" id="icwai_number" name="regi_no_icaw" value="">
						
						<input type="text" id="verify_icwa_regi_status" name="verify_icwa_regi_status" value="<?php if(!empty($row_more)){echo $row_more->verify_icwa_regi_status;} ?>" hidden>
						    <span style="color:red" id="business_pan_error"></span>  

						</div>	
									
				</div>	
				<div class="justify-content-center row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >
				
					<div style="margin-top: 10px;" class="col">
						<span class=""><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" ></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "></span>
					</div>			
					
					<div class="w-100"></div>
					<?php if(!empty($row_more)){ if( $row_more->verify_GST_status=='true')
					                                    { ?> 
						
						                                    <div style=" margin-top: 8px;" class="col">
																 <a class="btn btn-success disabled" id="verify_GST" style="color:white;">Verify GST <i class="fas fa-check"></i></a>
																
															</div>
															<div class="w-100"></div>
																		
																									
																<div style=" margin-top: 8px;" class="col">
																	 <a class="btn btn-success disabled" id="verify_pan" style="color:white;">Verify PAN</a>
																</div>

																<?php if( $row_more->verify_ca_regi_status=='true')
																{
																?>
																	<div style=" margin-top:66px; margin-left:-99%;" class="col" id="div_btn_ca">
																		<a class="btn btn-success disabled" id="verify_icai" style="color:white;">Verify ICAI<i class="fas fa-check"></i></a></a>
																	</div>
																<?php 
																}
																?>

																
												 <?php   } 
												       elseif( $row_more->verify_Bis_Pan_status=='true')
													   {?>
													        
															<div style=" margin-top: 8px;" class="col">
																	 <a class="btn btn-success disabled " id="verify_GST" style="color:white;">Verify GST</a>
																	
																</div>
																																
																<div class="w-100"></div>
																	
																<div style="margin-left: 35px; margin-top: 8px;" class="col">
																	 <a class="btn btn-success disabled " id="verify_pan" style="color:white;">Verify PAN <i class="fas fa-check"></i></a>
																</div>
													   <?php   }
													    else if( $row_more->verify_ca_regi_status=='true')
														{
                                                       ?>
													   		 <div style=" margin-top: 8px;" class="col">
																	 <a class="btn btn-success disabled " id="verify_GST" style="color:white;">Verify GST</a>
																	
																</div>
																																
																<div class="w-100"></div>
																	
																<div style="margin-left: 35px; margin-top: 8px;" class="col">
																	 <a class="btn btn-success disabled " id="verify_pan" style="color:white;">Verify PAN <i class="fas fa-check"></i></a>
																</div>
																
																<div style=" margin-top:66px;" class="col" id="div_btn_ca">
						                                          <a class="btn btn-success disabled" id="verify_icai" style="color:white;">Verify ICAI</a>
					                                            </div>

													   <?php													  
														}
													   else{?>
													            <div style=" margin-top:-70px;" class="col">
																	 <a class="btn btn-success" id="verify_GST" style="color:white;">Verify GST</a>
																	
																</div>
																
																<div class="w-100"></div>
																	
																<div style=" margin-top:-50px;" class="col">
																	 <a class="btn btn-success" id="verify_pan" style="color:white;">Verify PAN </a>
																</div>
																
																<div style=" margin-top:30px; display:none; margin-left:-95%;margin-top:24%;" class="col" id="div_btn_ca">
						                                          <a class="btn btn-success" id="verify_icai" style="color:white;">Verify ICAI</a>
					                                            </div>
																<div style="  margin-top:30px; display:none; margin-left:-95%;margin-top:24%;" class="col" id="div_btn_cs">
						                                          <a class="btn btn-success"  id="verify_cs" style="color:white;">Verify CS</a>
					                                            </div>
																<div style="  margin-top:30px; display:none; margin-left:-95%;margin-top:24%;" class="col" id="div_btn_icwa">
						                                          <a class="btn btn-success" id="verify_icwai" style="color:white;">Verify ICWA</a>
					                                            </div>
													  <?php }
												} else {?>
												            <div style=" margin-top: 8px;" class="col">
																	 <a class="btn btn-success" id="verify_GST" style="color:white;">Verify GST</a>
																	
																</div>
																
																<div class="w-100"></div>
																	
																<div style=" margin-top: 8px;" class="col">
																	 <a class="btn btn-success " id="verify_pan" style="color:white;">Verify PAN </a>
																</div>
																<div style="  margin-top:30px; display:none; margin-left:-95%;margin-top:24%;" class="col" id="div_btn_ca">
						                                          <a class="btn btn-success" id="verify_icai" style="color:white;">Verify ICAI</a>
					                                            </div>
																<div style="  margin-top:30px; display:none; margin-left:-95%;margin-top:24%;" class="col" id="div_btn_cs">
						                                          <a class="btn btn-success"  id="verify_cs" style="color:white;">Verify CS</a>
					                                            </div>
																<div style="  margin-top:30px; display:none; margin-left:-95%;margin-top:24%;" class="col" id="div_btn_icwa">
						                                          <a class="btn btn-success" id="verify_icwai" style="color:white;">Verify ICWA</a>
					                                            </div>
												<?php } ?>
						
					
					
					
				</div>	

				
			</div>			

						
		</div>	 

		

		<div class="row shadow bg-white rounded margin-10 padding-15" id="business_man_layout">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">We need few details about your business to help us process your loan application</span>

			</div>

			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">Please enter the <span style="color: red;">bank balance of the primary bank account</span> used by your business on the following days</span>

			</div>

				<?php 
					$jsonData = '';
	  				if(!empty($row)) {
						$json = $row->BIS_BANK_BAL_JSON;
						$jsonData = json_decode($json);
					}
				?>	
							
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-3 month'));?></span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "01 - ".date('m-Y', strtotime('-3 month'));?>" class="input-cust-name" type="number" name="business_income_1" id="business_income_1" value="<?php if($jsonData!='')echo $jsonData->amount_1;?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "07 - ".date('m-Y', strtotime('-3 month'));?>" class="input-cust-name" type="number" name="business_income_2" id="business_income_2" value="<?php if($jsonData!='')echo $jsonData->amount_2;?>">
	  					<input min="0" style=" margin-bottom: 10px;" maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "14 - ".date('m-Y', strtotime('-3 month'));?>" class="input-cust-name" type="number" name="business_income_3" id="business_income_3" value="<?php if($jsonData!='')echo $jsonData->amount_3;?>">
	  					<input min="0" style=" margin-bottom: 10px;" maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "21 - ".date('m-Y', strtotime('-3 month'));?>" class="input-cust-name" type="number" name="business_income_4" id="business_income_4" value="<?php if($jsonData!='')echo $jsonData->amount_4;?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "28 - ".date('m-Y', strtotime('-3 month'));?>" class="input-cust-name" type="number" name="business_income_5" id="business_income_5" value="<?php if($jsonData!='')echo $jsonData->amount_5;?>">
	  				</div>  
	  											  				
				</div>	

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-2 month'));?></span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "01 - ".date('m-Y', strtotime('-2 month'));?>" class="input-cust-name" type="number" name="business_income_6" id="business_income_6" value="<?php if($jsonData!='')echo $jsonData->amount_6;?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "07 - ".date('m-Y', strtotime('-2 month'));?>" class="input-cust-name" type="number" name="business_income_7" id="business_income_7" value="<?php if($jsonData!='')echo $jsonData->amount_7;?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "14 - ".date('m-Y', strtotime('-2 month'));?>" class="input-cust-name" type="number" name="business_income_8" id="business_income_8" value="<?php if($jsonData!='')echo $jsonData->amount_8;?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "21 - ".date('m-Y', strtotime('-2 month'));?>" class="input-cust-name" type="number" name="business_income_9" id="business_income_9" value="<?php if($jsonData!='')echo $jsonData->amount_9;?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "28 - ".date('m-Y', strtotime('-2 month'));?>" class="input-cust-name" type="number" name="business_income_10" id="business_income_10" value="<?php if($jsonData!='')echo $jsonData->amount_10;?>">
	  				</div>  
	  											  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-1 month'));?></span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "01 - ".date('m-Y', strtotime('-1 month'));?>" class="input-cust-name" type="number" name="business_income_11" id="business_income_11" value="<?php if($jsonData!='')echo $jsonData->amount_11;?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "07 - ".date('m-Y', strtotime('-1 month'));?>" class="input-cust-name" type="number" name="business_income_12" id="business_income_12" value="<?php if($jsonData!='')echo $jsonData->amount_12;?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "14 - ".date('m-Y', strtotime('-1 month'));?>" class="input-cust-name" type="number" name="business_income_13" id="business_income_13" value="<?php if($jsonData!='')echo $jsonData->amount_13;?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "21 - ".date('m-Y', strtotime('-1 month'));?>" class="input-cust-name" type="number" name="business_income_14" id="business_income_14" value="<?php if($jsonData!='')echo $jsonData->amount_14;?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "28 - ".date('m-Y', strtotime('-1 month'));?>" class="input-cust-name" type="number" name="business_income_15" id="business_income_15" value="<?php if($jsonData!='')echo $jsonData->amount_15;?>">
	  				</div>  
	  											  				
				</div>	
				
						<!-- ------------ added by priyanka--------------------------------------------------------------------------------------------------------->
	<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Do you have ITR ?</span>

		</div>
		<div class="row justify-content-center col-12">
			<div class="form-check">
  			  <input required class="form-check-input" type="radio" name="itr_status" id="ITR_yes" onclick="clear_ITR_values();" value="yes" <?php if(!empty($row)) if($row->ITR_status=="yes"){ echo 'checked';}?>>
  				
  				<label class="form-check-label" for="flexRadioDefault1">Yes&nbsp;&nbsp;&nbsp;&nbsp;</label>
			</div>
			<div class="form-check">
  				<input required  class="form-check-input" type="radio" name="itr_status" id="ITR_no" value="no"  <?php if(!empty($row)) if($row->ITR_status=="no"){ echo 'checked';}?> onclick="edit_ITR();">
  				<label class="form-check-label" for="flexRadioDefault2">No</label>
			</div>
		</div>

<!---------------------------->	
	<!-------------------------------------------------------- added by priyanka --------------------------------------------------------------- -->
	<div class="row shadow bg-white rounded margin-10 padding-15"  id="ITR_no_div">
	
   

	<div class="row justify-content-center col-12" style="text-aline:cener;">
		<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom:3%; ">Sales Details</span>
	</div>
	
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" id="ITR_yes_div5">
					<div class="col" style="margin-top: 0px;">
						<span style="color: black; font-size: 17px; font-weight: bold; margin-left: 15%;"></span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  				
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">1)&nbsp; Total Sales Value Per month</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">2)&nbsp; Sale Value per customer</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">3)&nbsp; Total Customers per day</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">4)&nbsp; Total Fix client Base in the catchment</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
			        </div>  
   				</div>	
	
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-3 month'));?></span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_1" id="NO_itr_value_1" value="<?php if(!empty($row))echo $row->sales_per_month_1?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_2" id="NO_itr_value_2" value="<?php if(!empty($row))echo $row->sales_per_cust_1?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_3" id="NO_itr_value_3" value="<?php if(!empty($row))echo $row->cust_per_day_1?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_4" id="NO_itr_value_4" value="<?php if(!empty($row))echo $row->total_chachement_1?>">
	  				</div>  
	  											  				
				</div>	
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-2 month'));?></span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_5" id="NO_itr_value_5" value="<?php if(!empty($row))echo $row->sales_per_month_2?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_6" id="NO_itr_value_6" value="<?php if(!empty($row))echo $row->sales_per_cust_2?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_7" id="NO_itr_value_7" value="<?php if(!empty($row))echo $row->cust_per_day_2?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_8" id="NO_itr_value_8" value="<?php if(!empty($row))echo $row->total_chachement_2?>">
	  				</div>  
	  											  				
				</div>	
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-1 month'));?></span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_9" id="NO_itr_value_9" value="<?php if(!empty($row))echo $row->sales_per_month_3?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_10" id="NO_itr_value_10" value="<?php if(!empty($row))echo $row->sales_per_cust_3?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_11" id="NO_itr_value_11" value="<?php if(!empty($row))echo $row->cust_per_day_3?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_12" id="NO_itr_value_12" value="<?php if(!empty($row))echo $row->total_chachement_3?>">
	  				</div>  
	  											  				
				</div>	
	<div class="row justify-content-center col-12" style="text-aline:cener;">
		<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom:3%; ">Final Derivations</span>
	</div>
	<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12" ></div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >
	<div class="col" style="margin-top: 0px;">
						<span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"></span>
					</div>			
					<div class="w-100"></div>
	               <div style="margin-left: 35px; margin-top: 8px;" class="col">
	  				
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">1)&nbsp; Total Annual TO</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">2)&nbsp; Total Gross Margin (in %)</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">3)&nbsp; Total Profit</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">4)&nbsp; Total Expenses- Utilities (in amount)</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">5)&nbsp; Total Expenses- Salaries (in amount)</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">6)&nbsp; Total Expenses- Rentals (in amount)</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">7)&nbsp; Total Additional recurring expenses (in amount)</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">8)&nbsp; Gross Profit</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
			       				
			        </div>  
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
	
	<div class="col" style="margin-top: 0px;">
					<span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"></span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px; margin-top: 8px;" class="col">	
	  					<input readonly min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_annual" id="total_annual" value="<?php if(!empty($row))echo $row->total_anual?>">
	  					<input required  disabled="disabled" min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_gross_margin" id="total_gross_margin" value="<?php if(!empty($row))echo $row->total_gross_margin?>">
	  					<input readonly min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_profit" id="total_profit" value="<?php if(!empty($row))echo $row->total_profit?>">
	  					<input  required disabled="disabled" min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_expenses_utilities" id="total_expenses_utilities" value="<?php if(!empty($row))echo $row->total_utilities?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_expenses_salaries" id="total_expenses_salaries" value="<?php if(!empty($row))echo $row->total_salaries?>">
	  					<input required  disabled="disabled" min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_expenses_rentals" id="total_expenses_rentals" value="<?php if(!empty($row))echo $row->total_rental?>">
	  					<input required  disabled="disabled" min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_additional_recurring_expenses" id="total_additional_recurring_expenses" value="<?php if(!empty($row))echo $row->total_recurring?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="gross_profit" id="gross_profit" value="<?php if(!empty($row))echo $row->gross_profit?>">
	  				</div>  
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" ></div>
    

</div>
		</div>


<!-------------------------------------------------------------------------------------------------------------------------->
		</div>

		    <?php if(!empty($row)){ if( $row->verify_GST_status=='true' || $row->verify_Bis_Pan_status=='true' ){ ?> 
						<div class="row shadow bg-white rounded margin-10 padding-15">
							<div class="row col-12 justify-content-center">
								<div>
									<a href="<?php echo base_url()?>index.php/customer/customer_documents">
									<button class="login100-form-btn " style="background-color: #25a6c6;" id="continue1">
										CONTINUE
									</button>
									</a>						
								</div>					
							</div>					
						</div>

			<?php } else{?>
			            <div class="row shadow bg-white rounded margin-10 padding-15">
							<div class="row col-12 justify-content-center">
								<div>
									<a href="<?php echo base_url()?>index.php/customer/customer_documents">
									<button class="login100-form-btn disabled" style="background-color: #25a6c6;" id="continue1"  title="please verifiy PAN" >
										CONTINUE
									</button></a>						
								</div>					
							</div>					
						</div>
			<?php }}else{ ?>
			         <div class="row shadow bg-white rounded margin-10 padding-15">
							<div class="row col-12 justify-content-center">
								<div>
									<a href="<?php echo base_url()?>index.php/customer/customer_documents">
									<button class="login100-form-btn disabled" style="background-color: #25a6c6;" id="continue1"  title="please verifiy PAN" >
										CONTINUE
									</button></a>						
								</div>					
							</div>					
						</div>
			<?php }?>					
				
		</form>
		<?php } ?>
		

					<!-- notworking ------------------------------- -->
		
		<?php if($type == 'notworking'|| $type == 'retired') { ?>
			<form method="POST" action="<?php echo base_url(); ?>index.php/customer/customer_flow_update_s_two_coapp_retired" id="customer_flow_update_s_two_coapp_retired">
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Awesome</span>

				</div>
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">Please can you tell a bit more annual income.</span>

				</div>
				
				<div class="w-100"></div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="" class="col">
						<span class="align-middle dot-light-theme"><i style=" font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Retired/Homemaker</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required type="radio" name="retiredorhomemaker"  <?php
						$retire = $coapp_data->retiredorhomemaker;
						if(!empty($coapp_data) && $retire == 'Retired') { echo 'checked'; } ?> value="Retired"> Retired
						<input required type="radio" name="retiredorhomemaker"  <?php if(!empty($coapp_data) && $retire == 'Homemaker') { echo 'checked'; } ?> value="Homemaker"> Homemaker
	  					
	  				</div> 
						
	  				
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="retiredwithdiv" <?php if($retire == 'Homemaker') { ?> style="display:none;" <?php } ?> >
					<div style="" class="col">
						<span class="align-middle dot-light-theme"><i style=" font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Retired</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required type="radio" name="retiredwith"  <?php
						$retire = $coapp_data->retiredwith;
						if(!empty($coapp_data) && $coapp_data == 'withincome') { echo 'checked'; } ?> value="withincome"> With income
						<input required type="radio" name="retiredwith"  <?php if(!empty($coapp_data) && $retire == 'withoutincome') { echo 'checked'; } ?> value="withoutincome"> Without income
	  					
	  				</div> 
						
	  				
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div style="" class="col">
						<span class="align-middle dot-light-theme"><i style=" font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Customer type</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required readonly placeholder="Customer type" class="input-cust-name" type="text" name="customertype" id="customertype" value="<?php echo $coapp_data->customertype; ?>" >
	  					
	  				</div>
				</div>
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Annual Income</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input maxlength="20"  oninput="maxLengthCheck(this)" placeholder="Enter annual income" class="input-cust-name" type="number" min="0" name="income" value="<?php if(!empty($row))echo $row->RETIRED_ANNUAL_INCOME?>">
	  				</div> 			  				
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="" class="col">
						<span class="align-middle dot-light-theme"><i style=" font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Source of Annual income</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<select class="input-cust-name" name="income_type"> 
						   <option value="">Select Type </option>
						  <option value="Pension" <?php if(!empty($row))if ($row->RETIRED_ANNUAL_INCOME_TYPE == 'Pension') echo ' selected="selected"'; ?>>Pension</option>
						  <option value="Dividend" <?php if(!empty($row))if ($row->RETIRED_ANNUAL_INCOME_TYPE == 'Dividend') echo ' selected="selected"'; ?>>Dividend</option>			
						  <option value="Interest" <?php if(!empty($row))if ($row->RETIRED_ANNUAL_INCOME_TYPE == 'Interest') echo ' selected="selected"'; ?>>Interest</option>
						  <option value="Salary" <?php if(!empty($row))if ($row->RETIRED_ANNUAL_INCOME_TYPE == 'Salary') echo ' selected="selected"'; ?>>Salary</option>
						  <option value="Coaching" <?php if(!empty($row))if ($row->RETIRED_ANNUAL_INCOME_TYPE == 'Coaching') echo ' selected="selected"'; ?>>Coaching</option>
						  <option value="Consulting" <?php if(!empty($row))if ($row->RETIRED_ANNUAL_INCOME_TYPE == 'Consulting') echo ' selected="selected"'; ?>>Consulting</option>
						  <option value="Others" <?php if(!empty($row))if ($row->RETIRED_ANNUAL_INCOME_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
						</select>
	  				</div>  
	  				
				</div>

			</div>	

			<div class="past_employee row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us a bit more about your past company</span>

				</div>			
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-fax"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Designation *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select  class="input-cust-name" id="org_past_designation" name="org_past_designation">
				        	<option value="">Select designation</option>
				            <option value="ACCOUNTANT" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'ACCOUNTANT') echo ' selected="selected"'; ?>>ACCOUNTANT</option>			  

				            <option value="AREA SALES MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'AREA SALES MANAGER') echo ' selected="selected"'; ?>>AREA SALES MANAGER</option>			  

				            <option value="ASSISTANT" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'ASSISTANT') echo ' selected="selected"'; ?>>ASSISTANT</option>			  

				            <option value="ASSISTANT MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'ASSISTANT MANAGER') echo ' selected="selected"'; ?>>ASSISTANT MANAGER</option>			  

				            <option value="ASST VICE PRESIDENT" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'ASST VICE PRESIDENT') echo ' selected="selected"'; ?>>ASST VICE PRESIDENT</option>			  

				            <option value="CHIEF EXECUTIVE OFFICER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'CHIEF EXECUTIVE OFFICER') echo ' selected="selected"'; ?>>CHIEF EXECUTIVE OFFICER</option>			  

				            <option value="CLERK" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'CLERK') echo ' selected="selected"'; ?>>CLERK</option>			  

				            <option value="DATA ENTRY OPERATOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'DATA ENTRY OPERATOR') echo ' selected="selected"'; ?>>DATA ENTRY OPERATOR</option>			  

				            <option value="DIRECTOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'DIRECTOR') echo ' selected="selected"'; ?>>DIRECTOR</option>			  

				            <option value="DY MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'DY MANAGER') echo ' selected="selected"'; ?>>DY MANAGER</option>			  

				            <option value="ENGINEER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'ENGINEER') echo ' selected="selected"'; ?>>ENGINEER</option>			  

				            <option value="EXECUTIVE" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'EXECUTIVE') echo ' selected="selected"'; ?>>EXECUTIVE</option>			  

				            <option value="EXECUTIVE DIRECTOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'EXECUTIVE DIRECTOR') echo ' selected="selected"'; ?>>EXECUTIVE DIRECTOR</option>			  

				            <option value="HOUSEWIFE" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'HOUSEWIFE') echo ' selected="selected"'; ?>>HOUSEWIFE</option>			  

				            <option value="LECTURER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'LECTURER') echo ' selected="selected"'; ?>>LECTURER</option>			  

				            <option value="LIBRARIAN" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'LIBRARIAN') echo ' selected="selected"'; ?>>LIBRARIAN</option>			  

				            <option value="MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'MANAGER') echo ' selected="selected"'; ?>>MANAGER</option>			  

				            <option value="PROPRIETOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'PROPRIETOR') echo ' selected="selected"'; ?>>PROPRIETOR</option>			  

				            <option value="REGIONAL MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'REGIONAL MANAGER') echo ' selected="selected"'; ?>>REGIONAL MANAGER</option>			  

				            <option value="SALES EXECUTIVE" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SALES EXECUTIVE') echo ' selected="selected"'; ?>>SALES EXECUTIVE</option>			  

				            <option value="SALES MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SALES MANAGER') echo ' selected="selected"'; ?>>SALES MANAGER</option>			  

				            <option value="SECRETARY" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SECRETARY') echo ' selected="selected"'; ?>>SECRETARY</option>			  

				            <option value="SENIOR EXECUTIVE" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SENIOR EXECUTIVE') echo ' selected="selected"'; ?>>SENIOR EXECUTIVE</option>			  

				            <option value="SENIOR MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SENIOR MANAGER') echo ' selected="selected"'; ?>>SENIOR MANAGER</option>			  

				            <option value="SENIOR OFFICER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SENIOR OFFICER') echo ' selected="selected"'; ?>>SENIOR OFFICER</option>			  

				            <option value="STENOGRAPHER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'STENOGRAPHER') echo ' selected="selected"'; ?>>STENOGRAPHER</option>			  

				            <option value="SUPERITENDENT" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SUPERITENDENT') echo ' selected="selected"'; ?>>SUPERITENDENT</option>			  

				            <option value="SUPREVISOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SUPREVISOR') echo ' selected="selected"'; ?>>SUPREVISOR</option>			  

				            <option value="SYSTEM ANALYST" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SYSTEM ANALYST') echo ' selected="selected"'; ?>>SYSTEM ANALYST</option>			  

				            <option value="SYSTEM ENGINEER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SYSTEM ENGINEER') echo ' selected="selected"'; ?>>SYSTEM ENGINEER</option>			  

				            <option value="TEACHER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'TEACHER') echo ' selected="selected"'; ?>>TEACHER</option>			  

				            <option value="TECHNICIAN" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'TECHNICIAN') echo ' selected="selected"'; ?>>TECHNICIAN</option>			  

				            <option value="TRUSTEE" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'TRUSTEE') echo ' selected="selected"'; ?>>TRUSTEE</option>			  

				            <option value="VICE PRESIDENT" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'VICE PRESIDENT') echo ' selected="selected"'; ?>>VICE PRESIDENT</option>			  

				            <option value="MKTG MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'MKTG MANAGER') echo ' selected="selected"'; ?>>MKTG MANAGER</option>			  

				            <option value="NATIONAL SALES MANAGER" <?php if ($row->ORG_DESIGNATION_PAST == 'NATIONAL SALES MANAGER') echo ' selected="selected"'; ?>>NATIONAL SALES MANAGER</option>			  
				            <option value="OFFICER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'OFFICER') echo ' selected="selected"'; ?>>OFFICER</option>			  

				            <option value="OPERATORS" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'OPERATORS') echo ' selected="selected"'; ?>>OPERATORS</option>			  

				            <option value="PARTNER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'PARTNER') echo ' selected="selected"'; ?>>PARTNER</option>			  

				            <option value="PEON" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'PEON') echo ' selected="selected"'; ?>>PEON</option>

							<option value="OTHERS" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'OTHERS') echo ' selected="selected"'; ?>>OTHERS</option>			  

				        </select>
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Office/ Work Email Address *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter work email id" class="input-cust-name" type="email" name="org_past_work_email" id="org_past_work_email" maxlength="30"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_WORK_EMAIL_PAST?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of joining with current organisation *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input class="input-cust-name" max="<?php echo date('Y-m-d');?>" type="date" name="org_past_working_from" id="org_past_working_from" value="<?php if(!empty($row))echo $row->ORG_WORKED_FROM_PAST?>">
	  				</div>  			  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Last 3 month's take home salarie's are *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input min="0" style=" margin-bottom: 10px;" placeholder="Enter salary 1" class="input-cust-name" type="number" name="org_past_salary_1"  maxlength="12"  oninput="maxLengthCheck(this)" id="org_past_salary_1" value="<?php if(!empty($row))echo $row->ORG_SALARY_PAST_1?>">
	  					
	  					<input min="0" Style="margin-bottom:16px;" placeholder="Enter salary 2" class="input-cust-name" type="number" name="org_past_salary_2"  maxlength="12"  oninput="maxLengthCheck(this)" id="org_past_salary_2" value="<?php if(!empty($row))echo $row->ORG_SALARY_PAST_2?>">
	  					
	  					<input min="0" placeholder="Enter salary 3" class="input-cust-name" type="number" name="org_past_salary_3"  maxlength="12"  oninput="maxLengthCheck(this)" id="org_past_salary_3" value="<?php if(!empty($row))echo $row->ORG_SALARY_PAST_3?>">
	  				</div>  				  				
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Annual gross salary *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					  <input hidden="true" style="margin-left: 10px; margin-right: 5px;" type="text" name="coappid" id="coappid" value="<?php echo $co_app;?>">
	  					<input min="0" placeholder="Annual gross salary" class="input-cust-name" type="number" name="org_past_gross_salary" id="org_past_gross_salary" maxlength="12"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_ANNUAL_SALARY_PAST?>">
	  				</div>  				  					  				  				
				</div>				
			</div>		

			<!-- <div class="row shadow bg-white rounded margin-10 padding-15">
				
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us bit more about EMI's *</span>

					<div class="row col-12" style="color: black; font-size: 14px;">
						<span class="align-middle dot-light-theme" style="margin-top: -5px;"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 12px;">Existing EMI's </span>
					<div class="w-100"></div>
						<div style="margin-left: 20px;" class="custom-control custom-switch">				  
						  <input checked type="checkbox" class="custom-control-input" id="emiSwitches" name="resiperchk">
						  <label class="custom-control-label" for="emiSwitches">Do you have any emi's ?</label>				  
						</div>					
					</div>
				</div>

				<div id="emisLayout" style="margin-left: 35px;" class="col">
					
	  					<?php

	  						if(!empty($row->EMIS)){
							$json = $row->EMIS;

							$jsonData = json_decode($json);
							if($jsonData!=''){
								$data_array = $jsonData->emis;
								for ($i=0; $i < count($data_array); $i++) { ?>
										<div class="emis_wrapper">
				  						<fieldset id="emisS_row">
											<div class="emis_row" id="line_1">
										        <select style="width: 17%;" class="other-income-select emis-select-data" id="emis" name="emi[]">
										        	<option id='1_1' value="">Select Loan Type</option>
										            <option id='2_1' value="Personal Loan" <?php if ($data_array[$i]->title == 'Personal Loan') echo ' selected="selected"'; ?>>Personal Loan</option>
										            <option id='3_1' value="Business Loan" <?php if ($data_array[$i]->title == 'Business Loan') echo ' selected="selected"'; ?>>Business Loan</option>
										            <option id='4_1' value="Home Loan" <?php if ($data_array[$i]->title == 'Home Loan') echo ' selected="selected"'; ?>>Home Loan</option>
										            <option id='5_1' value="Plot Loan" <?php if ($data_array[$i]->title == 'Plot Loan') echo ' selected="selected"'; ?>>Plot Loan</option>
													
													
										            <option id='6_1' value="Vehicle Loan" <?php if ($data_array[$i]->title == 'Vehicle Loan') echo ' selected="selected"'; ?>>Vehicle Loan</option>
										            <option id='7_1' value="Education loan" <?php if ($data_array[$i]->title == 'Education loan') echo ' selected="selected"'; ?>>Education loan</option>
										            <option id='8_1' value="SME LOAN" <?php if ($data_array[$i]->title == 'SME LOAN') echo ' selected="selected"'; ?>>SME LOAN</option>
										            <option id='9_1' value="Agriculture Loan" <?php if ($data_array[$i]->title == 'Agriculture Loan') echo ' selected="selected"'; ?>>Agriculture Loan</option>
													 <option id='10_1' value="Gold Loan" <?php if ($data_array[$i]->title == 'Gold Loan') echo ' selected="selected"'; ?>>Gold Loan</option>
										            <option id='11_1' value="Consumer loan" <?php if ($data_array[$i]->title == 'Consumer loan') echo ' selected="selected"'; ?>>Consumer loan</option>
										            <option id='12_1' value="Credit Card " <?php if ($data_array[$i]->title == 'Credit Card ') echo ' selected="selected"'; ?>>Credit Card </option>
										        </select>
										        <input min="0" placeholder="Loan Amount" class="other-income-select emis-loan-data" type="number" name="emis_loan_amount" style="width: 17%;" value="<?php echo $data_array[$i]->loan_amount;?>">
										        <input min="0" placeholder="Outstanding Loan" class="other-income-select emis-outstanding-data" type="number" name="emis_outstanding_amount" style="width: 17%;" value="<?php echo $data_array[$i]->outstanding_amount;?>">
										        <input min="0" placeholder="EMI" class="other-income-select emis-emi-data" type="number" name="emis_emi_amount" style="width: 17%;" value="<?php echo $data_array[$i]->emi_amount;?>">
										        <input min="0" placeholder="Balance Term in Months" class="other-income-select emis-bal_from-data" type="number" name="emis_bal_from_amount" style="width: 17%;" value="<?php echo $data_array[$i]->bal_from_amount;?>">
										        <input class="emis_remove other-income-select" type="button" value="-" style="width: 8%; color: red;" >
										    </div>	
										</fieldset>
									</div>	
								<?php } 
								}
							} else { ?>
								<div class="emis_wrapper">
				  						<fieldset id="emisS_row">
											<div class="emis_row" id="line_1">
										        <select style="width: 17%;" class="other-income-select emis-select-data" id="emis" name="emi[]">
										        	<option id='1_1' value="">Select Loan Type</option>
										            <option id='2_1'>Personal Loan</option>
										            <option id='3_1' >Business Loan</option>
										            <option id='4_1' >Home Loan</option>
										            <option id='5_1' >Plot Loan</option>
										            <option id='6_1' >Vehicle Loan</option>
										            <option id='7_1'>Education loan</option>
										            <option id='8_1'>SME LOAN</option>
										            <option id='9_1'>Agriculture Loan</option>
													 <option id='10_1'>Gold Loan</option>
										            <option id='11_1' >Consumer loan</option>
										            <option id='12_1' >Credit Card </option>
										        </select>
										        <input min="0" placeholder="Loan Amount" class="other-income-select emis-loan-data" type="number" name="emis_loan_amount" style="width: 17%;" >
										        <input min="0" placeholder="Outstanding Loan" class="other-income-select emis-outstanding-data" type="number" name="emis_outstanding_amount" style="width: 17%;" >
										        <input min="0" placeholder="EMI" class="other-income-select emis-emi-data" type="number" name="emis_emi_amount" style="width: 17%;" >
										        <input min="0" placeholder="Balance Term in Months" class="other-income-select emis-bal_from-data" type="number" name="emis_bal_from_amount" style="width: 17%;" >
										        <input class="emis_remove other-income-select" type="button" value="-" style="width: 8%; color: red;" >
										    </div>	
										</fieldset>
									</div>	
						<?php }?>	  	

						<div style="color: blue;" class="add-more" type="button" id="add_more_emis">Add More</div>
	  				</div> 
			</div> -->

			
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row col-12 justify-content-center">
					<div>
						<a href="<?php echo base_url()?>index.php/customer/customer_documents">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							CONTINUE
						</button></a>						
					</div>		
				</div>					
			</div>
		</form>
		<?php } ?>	
		
		</div>		
	</div>
	<script>

 $(document).ready(function () {
	 
	 $('input:radio[name=retiredorhomemaker]').change(function () {
						//alert('test');
            if (this.value == 'Homemaker') {
                //alert("Allot Thai Gayo Bhai");
				$('#customertype').val('Homemaker');
				$("#retiredwithdiv").hide();
            }
			
			if (this.value == 'Retired') {
                //alert("Allot Thai Gayo Bhai");
				var retiredwith = $('input:radio[name=retiredwith]:checked').val();
				
				//alert(retiredwith);
				//$('#customertype').val('Retired');
				
				if (retiredwith == 'withincome') {
                //alert("Allot Thai Gayo Bhai");
				$('#customertype').val('Pensioner');
            }
            if (retiredwith == 'withoutincome') {
                //alert("Transfer Thai Gayo");
				
				$('#customertype').val('Other');
            }
				
				$("#retiredwithdiv").show();
            }
            
        });

			$('input[type=radio][name=clientlocation]').change(function() {
    if (this.value == 'Yes') {
        //alert('Yes');
		
		document.getElementById("clientnameinputdiv").style.display = "block";
		document.getElementById("clientnamediv").style.display = "block";
    }
    else if (this.value == 'No') {
        //alert('No');
		document.getElementById("clientnamediv").style.display = "none";
		document.getElementById("clientnameinputdiv").style.display = "none";
    }
});

								
					$('input:radio[name=retiredwith]').change(function () {
						//alert('test');
            if (this.value == 'withincome') {
                //alert("Allot Thai Gayo Bhai");
				$('#customertype').val('Pensioner');
            }
            if (this.value == 'withoutincome') {
                //alert("Transfer Thai Gayo");
				
				$('#customertype').val('Other');
            }
        });			
							
	 
	 
	 $('#references').change(function() {
    if(($(this).is(':checked')))
	{
		//alert('checked');
		
		$('#org_ref_f_name').val('<?php if(!empty($data_applicant_income))echo $data_applicant_income->REF_1_F_NAME; ?>');
		$('#org_ref_l_name').val('<?php if(!empty($data_applicant_income))echo $data_applicant_income->REF_1_L_NAME; ?>');
		$('#org_ref_m_name').val('<?php if(!empty($data_applicant_income))echo $data_applicant_income->REF_1_M_NAME; ?>');
		
		/* $('#resi_no_of_years').val('<?php echo $row2->CITY; ?>');*/
		$('#org_ref_mobile').val('<?php if(!empty($data_applicant_income))echo $data_applicant_income->REF_1_MOBILE; ?>');
		$('#org_ref_relation').val('<?php if(!empty($data_applicant_income))echo $data_applicant_income->REF_1_RELATION; ?>');
		
		$('#org_ref_2_f_name').val('<?php if(!empty($data_applicant_income))echo $data_applicant_income->REF_2_F_NAME; ?>');
		$('#org_ref_2_m_name').val('<?php if(!empty($data_applicant_income))echo $data_applicant_income->REF_2_M_NAME ; ?>');
		
		$('#org_ref_2_l_name').val('<?php if(!empty($data_applicant_income))echo $data_applicant_income->REF_2_L_NAME; ?>');
		$('#org_ref_2_mobile').val('<?php if(!empty($data_applicant_income))echo $data_applicant_income->REF_2_MOBILE ; ?>');
		
		$('#org_ref_2_relation').val('<?php if(!empty($data_applicant_income))echo $data_applicant_income->REF_2_RELATION; ?>');
		/*
		$('#NATIVE_PLACE').val('<?php if(!empty($row_more))echo $row_more->NATIVE_PLACE ;?>');
		
		$('#resi_sel_property_type').val('<?php if(!empty($row_more))echo $row_more->RES_ADDRS_PROPERTY_TYPE;?>');
		
		$('#resi_no_of_years').val('<?php if(!empty($row_more))echo $row_more->RES_CITY_NO_YEARS_LIVING;?>');
		
		$('#resi_add_1').val('');
		$('#resi_add_2').val('');
		$('#resi_add_3').val('');
		*/
	}
	else{
		
		$('#org_ref_f_name').val('<?php //if(!empty($data_applicant_income))echo $data_applicant_income->REF_1_F_NAME; ?>');
		$('#org_ref_l_name').val('<?php //if(!empty($data_applicant_income))echo $data_applicant_income->REF_1_L_NAME; ?>');
		$('#org_ref_m_name').val('<?php //if(!empty($data_applicant_income))echo $data_applicant_income->REF_1_M_NAME; ?>');
		
		/* $('#resi_no_of_years').val('<?php echo $row2->CITY; ?>');*/
		$('#org_ref_mobile').val('<?php //if(!empty($data_applicant_income))echo $data_applicant_income->REF_1_MOBILE; ?>');
		$('#org_ref_relation').val('<?php //if(!empty($data_applicant_income))echo $data_applicant_income->REF_1_RELATION; ?>');
		
		$('#org_ref_2_f_name').val('<?php //if(!empty($data_applicant_income))echo $data_applicant_income->REF_2_F_NAME; ?>');
		$('#org_ref_2_m_name').val('<?php //if(!empty($data_applicant_income))echo $data_applicant_income->REF_2_M_NAME ; ?>');
		
		$('#org_ref_2_l_name').val('<?php //if(!empty($data_applicant_income))echo $data_applicant_income->REF_2_L_NAME; ?>');
		$('#org_ref_2_mobile').val('<?php //if(!empty($data_applicant_income))echo $data_applicant_income->REF_2_MOBILE ; ?>');
		
		$('#org_ref_2_relation').val('<?php //if(!empty($data_applicant_income))echo $data_applicant_income->REF_2_RELATION; ?>');
		
	}
  });
	 
                
                $('#org_working_from').datepicker({
				autoclose: true,
				endDate: new Date(new Date().setDate(new Date().getDate())),
				format: 'yyyy-mm-dd'  
				
                  });  
                var a=$('#business_constitution').val();
				if(a=='PROPRIETORSHIP' || a=='INDIVIDUAL - MUTUAL FUND' || a=='INDIVIDUAL' )
				{
					$('#continue1').removeClass('disabled');
				}
            });


$('#continue1').on('click',function(e)
                        {
							if ($("#Consultant").prop("checked")) {
							    return true;
						    }
							if ($("#Doctor").prop("checked")) {
							    return true;
						    }
							if ($("#Architect").prop("checked")) {
							    return true;
						    }
							if ($("#Lawyer").prop("checked")) {
							    return true;
						    }
							if ($("#Consultant").prop("checked")) {
							    return true;
						    }
							if ($("#Business").prop("checked")) {
							    
								let btn = document.getElementsByClassName('input-cust-name');
								
								if( btn =='')
								{alert("working");
									e.preventDefault();
								    swal("Warning!", "Please Enter Income all the details", "warning");
									return false;
								}
                                else
								{	return true;
									alert( " not working");
								}
								
								
								
						    }
							if ($("#CS").prop("checked")) {
								
							    var cs_number =$('#verify_cs_regi_status').val();
								var cs_number2 = $('#cs_number').val();
								if(cs_number=='true' || cs_number2 != '')
									{
										return true;
									}
								else
									{
										e.preventDefault();
								       swal("Warning!", "Please Verify CS Number", "warning");
										return false;
									}
						    }
						
							if ($("#ICWA").prop("checked"))
							 {

								var icwai_number =$('#verify_icwa_regi_status').val();
								var icwai_number2 = $('#icwai_number').val();
								if(icwai_number=='true' || icwai_number2 !='' )
									{
										return true;
									}
								else
									{
										e.preventDefault();
										swal("Warning!", "Please Verify ICWAI Number", "warning");
										return false;
									}


							}	
							if ($("#CA").prop("checked")) {
							    
								var CA_number =$('#verify_ca_regi_status').val();
								var icai_number = $('#icai_number').val();
								if(CA_number=='true' || icai_number != '')
									{
										return true;
									}
								else
									{
								 		e.preventDefault();
								        swal("Warning!", "Please Verify ICAI Number", "warning");
										return false;
									}
						    }
							
						}
					 );
$( "#verify_pan" ).click(function() {
	    var business_pan = $('#business_pan').val();
		var org_name_buisness = $('#org_name_buisness').val();
		var type="businessPan";
		if(business_pan=='')
		{
			$('#business_pan_error').html("Please Fill Buisness PAN Number. ");
			//exit;
			return false;
		}
		if(org_name_buisness=='')
		{
			$('#org_name_buisness_error').html("Please Fill Orgnization Name. ");
			//exit;
			return false;
		}
		
	
		
         $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
				//url:'<?php echo base_url("index.php/Api_Functions/Test_PAN_verification"); ?>',
                data:{'full_name':org_name_buisness,'pan_no':business_pan,'type':type},
                success:function(data){
					
					var obj =JSON.parse(data);
					
					
                   if(obj.msg=='sucess')
				   {
					 swal("success!", "Buisness PAN verified Sucessfully!", "success");
				      //swal("TEST MODE!", "Buisness PAN verified Sucessfully!", "success");
					  $('#verify_GST').addClass('disabled');
					  
					  $('#continue1').removeClass('disabled');
					    $('#verify_Bis_Pan_status').val('true');
				   }
				   else if(obj.msg=='fail')
				   {
					    $('#verify_Bis_Pan_status').val('false');
					    swal("Error!", "Please Check Your Orgnization Name And PAN Number", "warning");
				   }
				    else if(obj.msg=='error')
				   {
					   
					    $('#verify_Bis_Pan_status').val('false');
					   swal("Error!",obj.response , "warning");
				   }
                }
            });
	
});
$( "#verify_GST" ).click(function() {
      
	    
        var business_gst_no = $('#business_gst_no').val();
		
		var org_name_buisness =[$('#org_name_buisness').val(),$('#business_constitution').val(),$('#resi_state_view').val(),$('#resi_city').val()]
		var type="gstinSearch";
		if(business_gst_no=='')
		{
			$('#business_gst_no_error').html("Please Fill Buisness GST NO. ");
			//exit;
			return false;
		}
		if(org_name_buisness=='')
		{
			$('#org_name_buisness_error').html("Please Fill Orgnization Name. ");
			//exit;
			return false;
		}
		
	
		
         $.ajax({
                type:'POST',
               url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
			  // url:'<?php echo base_url("index.php/Api_Functions/Test_GST_verification"); ?>',
                data:{'full_name':org_name_buisness,'pan_no':business_gst_no,'type':type},
                success:function(data){
					
					var obj =JSON.parse(data);
					
					
                   if(obj.msg=='sucess')
				   {
					 swal("success!", "GSTIN verified Sucessfully!", "success");
					 // swal("Test mode!", "GSTIN verified Sucessfully!", "success");
					  $('#verify_pan').addClass('disabled');
					  
					    $('#verify_GST').addClass('disabled');
					    $('#continue1').removeClass('disabled');
					    $('#verify_GST_status').val('true');
					   
                       var optionExists = ($('#business_nature option[value="'+obj.natureOfBusinessActivities+'"]').length > 0);
						 if(optionExists){
							  $("#business_nature").val(obj.natureOfBusinessActivities);
						 }
						 else{
                                                     
													   $('#business_nature')
														.append($("<option></option>")
														.attr("value",obj.natureOfBusinessActivities)
														.text(obj.natureOfBusinessActivities)); 
													    $("#business_nature").val(obj.natureOfBusinessActivities);
						 }
						  var optionExists_constitution = ($('#business_constitution option[value="'+obj.constitutionOfBusiness+'"]').length > 0);
						 if(optionExists_constitution){
							  $("#business_constitution").val(obj.constitutionOfBusiness);
						 }
						 else{
                                                     
													   $('#business_constitution')
														.append($("<option></option>")
														.attr("value",obj.constitutionOfBusiness)
														.text(obj.constitutionOfBusiness)); 
													    $("#business_constitution").val(obj.constitutionOfBusiness);
						 }
				   }
				   else if(obj.msg=='fail')
				   {
					    $('#verify_GST_status').val('false');
					   if(obj.error=='Please Check Registerd State And City.')
					   {
					      //swal("Error1!",obj.error, "warning");
						  swal({
							  title: "Are You Want To Change State And City ?",
							  text: "Please Check Registerd State And City Are Not Match With registered State and City",
							  icon: "warning",
							  buttons: true,
							  dangerMode: true,
							})
							.then((willDelete) => {
												  if (willDelete) {
													  document.getElementById("resi_state_view").focus();
													 var optionExists = ($('#business_nature option[value="'+obj.natureOfBusinessActivities+'"]').length > 0);
                                                      $('#verify_GST').addClass('disabled');
														$('#continue1').removeClass('disabled');
														$('#verify_GST_status').val('true');
													 
												  } else {
													  swal("success!", "GSTIN verified Sucessfully!", "success");
													   $('#verify_pan').addClass('disabled');
					                                   $('#continue1').removeClass('disabled');
													   $('#verify_GST_status').val('true');
													   $('#verify_GST').addClass('disabled');
													  
												
												  }
												  });
					   }
					   else
					   {
						    swal("Error!",obj.error, "warning");
							 $('#verify_GST_status').val('false');
							 $('#verify_GST').addClass('disabled');
							
							
					   }
					  
					     $('#verify_GST').addClass('disabled'); 
						  $('#verify_pan').addClass('disabled');
					   
						 var optionExists = ($('#business_nature option[value="'+obj.natureOfBusinessActivities+'"]').length > 0);
						 if(optionExists){
							  $("#business_nature").val(obj.natureOfBusinessActivities);
						 }
						 else{
                                                     
													   $('#business_nature')
														.append($("<option></option>")
														.attr("value",obj.natureOfBusinessActivities)
														.text(obj.natureOfBusinessActivities)); 
													    $("#business_nature").val(obj.natureOfBusinessActivities);
						 }
						   var optionExists_constitution = ($('#business_constitution option[value="'+obj.constitutionOfBusiness+'"]').length > 0);
						 if(optionExists_constitution){
							  $("#business_constitution").val(obj.constitutionOfBusiness);
						 }
						 else{
                                                     
													   $('#business_constitution')
														.append($("<option></option>")
														.attr("value",obj.constitutionOfBusiness)
														.text(obj.constitutionOfBusiness)); 
													    $("#business_constitution").val(obj.constitutionOfBusiness);
						 }
						 

						
						
				   }
				    else if(obj.msg=='error')
				   {
					    
					   swal("Error!",obj.response , "warning");
				   }
                }
            });
    });

// code by priyanka===========================================================================================================
$( "#verify_icwai" ).click(function() {
	    var icwai_number = $('#icwai_number').val();
		var type="icwai";
	    if(icwai_number=='')
		{
			alert("Please Fill ICWAI Number. ");
		//	exit;
		return false;
		}
		 $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/Api_Functions/Authantication_ICWA_api"); ?>',
			  //  url:'<?php echo base_url("index.php/Api_Functions/Test_ICWA_verification"); ?>',
                data:{'icwai_number':icwai_number,'type':type},
                success:function(data){
				
					var obj =JSON.parse(data);
					if(obj.msg=='sucess')
				   {
					    $('#verify_icwa_regi_status').val('true');
					 swal("success!", "ICWAI verified Sucessfully!", "success");
					 //swal("Test Mode!", "ICWAI verified Sucessfully!", "success");
					 $address =obj.address;
					 $district= obj.district;
					 $state= obj.state;
					 $city=obj.city;
					 $pincode=obj.pincode;
					// alert($address);
					document.getElementById('resi_add_1').value = $address;
					document.getElementById('resi_district').value = $district;
					document.getElementById('resi_state').value = $state;
					document.getElementById('resi_city').value = $city;
					document.getElementById('resi_pincode').value = $pincode;
					
					 
					 
				   }
				   else if(obj.msg=='fail')
				   {
					     $('#verify_icwa_regi_status').val('false');
					     swal("Error!", "Please Check ICWAI Number", "warning");
					    //alert("fail");
				   }
				    else if(obj.msg=='error')
				   {
					   $('#verify_icwa_regi_status').val('false');
					   swal("Error!",obj.response , "warning");
					  //alert("error"); 
				   }
				 }
            });
});
$( "#verify_icai" ).click(function() {
	     var icai_number = $('#icai_number').val();
		 var type="icwai";
	     if(icai_number=='')
		{
			alert("Please Fill ICAI Number. ");
			//exit;
			return false;
		}
		 $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/Api_Functions/Authantication_ICAI_api"); ?>',
				//url:'<?php echo base_url("index.php/Api_Functions/Test_CA_verification"); ?>',
                data:{'icai_number':icai_number,'type':type},
                success:function(data){
				
					var obj =JSON.parse(data);
					if(obj.msg=='sucess')
				   {
					 swal("success!", "ICAI verified Sucessfully!", "success");
					// swal("Test Mode!", "ICAI verified Sucessfully!", "success");
					  $address =obj.address;
					 $district= obj.district;
					 $state= obj.state;
					 $city=obj.city;
					 $pincode=obj.pincode;
					// alert($address);
					document.getElementById('resi_add_1').value = $address;
					document.getElementById('resi_district').value = $district;
					document.getElementById('resi_state').value = $state;
					document.getElementById('resi_city').value = $city;
					document.getElementById('resi_pincode').value = $pincode;
					
					 $('#verify_ca_regi_status').val('true');
					
				   }
				   else if(obj.msg=='fail')
				   {
					     swal("Error!", "Please Check ICAI Number", "warning");
						 $('#verify_ca_regi_status').val('false');
					    //alert("fail");verify_ca_regi_status
				   }
				    else if(obj.msg=='error')
				   {
					   swal("Error!",obj.response , "warning");
					    $('#verify_ca_regi_status').val('false');
					  //alert("error"); 
				   }
				 }
            });
});
$( "#verify_cs" ).click(function() {
	    var cs_number = $('#cs_number').val();
	     if(cs_number=='')
		{
			alert("Please Fill CS Registration Number. ");
			//exit;
			return false;
		}
		$.ajax({
                type:'POST',
				url:'<?php echo base_url("index.php/Api_Functions/Authantication_CS_api"); ?>',
				//url:'<?php echo base_url("index.php/Api_Functions/Test_CS_verification"); ?>',
                data:{'cs_number':cs_number},
                success:function(data){
				
					var obj =JSON.parse(data);
					if(obj.msg=='sucess')
				   {
					 swal("success!", "CS verified Sucessfully!", "success");
					// swal("Test Mode!", "CS verified Sucessfully!", "success");
					 $address =obj.address;
					 $district= obj.district;
					 $state= obj.state;
					 $city=obj.city;
					 $pincode=obj.pincode;
					// alert($address);
					document.getElementById('resi_add_1').value = $address;
					document.getElementById('resi_district').value = $district;
					document.getElementById('resi_state').value = $state;
					document.getElementById('resi_city').value = $city;
					document.getElementById('resi_pincode').value = $pincode;
					$('#verify_cs_regi_status').val('true');
				   }
				   else if(obj.msg=='fail')
				   {
					     swal("Error!", "Please Check CS Number", "warning");
						 	$('#verify_cs_regi_status').val('false');
					    //alert("fail");
				   }
				    else if(obj.msg=='error')
				   {
					   swal("Error!",obj.response , "warning");
					   	$('#verify_cs_regi_status').val('false');
					  //alert("error"); 
				   }
				 }
            });
	
});

//===============================================================================================================================









</script>
<script>
function show_ca(){

	$('#div_cs').hide();
	$('#div_icwa').hide();
	$('#div_ca').show();
	$('#div_btn_ca').show();
	$('#div_btn_cs').hide();
	$('#div_btn_icwa').hide();

}
function show_cs(){
    $('#div_ca').hide();
	$('#div_icwa').hide();
	$('#div_cs').show();
	$('#div_btn_cs').show();
	$('#div_btn_icwa').hide();
	$('#div_btn_ca').hide();

}

function show_icwa(){ 
	$('#div_ca').hide();
	$('#div_cs').hide();
	$('#div_icwa').show();
	$('#div_btn_icwa').show();
	$('#div_btn_cs').hide();
	$('#div_btn_ca').hide();
 }

function show_business(){ 
	$('#div_ca').hide();
	$('#div_cs').hide();
	$('#div_icwa').hide();
	$('#div_btn_icwa').hide();
	$('#div_btn_cs').hide();
	$('#div_btn_ca').hide();

}
function show_doctor(){ 
	$('#div_ca').hide();
	$('#div_cs').hide();
	$('#div_icwa').hide();
	$('#div_btn_icwa').hide();
	$('#div_btn_cs').hide();
	$('#div_btn_ca').hide();
}
function show_architech(){ 
	$('#div_ca').hide();
	$('#div_cs').hide();
	$('#div_icwa').hide();
	$('#div_btn_icwa').hide();
	$('#div_btn_cs').hide();
	$('#div_btn_ca').hide();
}
function show_lawyer(){ 
	$('#div_ca').hide();
	$('#div_cs').hide();
	$('#div_icwa').hide();
	$('#div_btn_icwa').hide();
	$('#div_btn_cs').hide();
	$('#div_btn_ca').hide();
}
function show_consultant(){ 
	$('#div_ca').hide();
	$('#div_cs').hide();
	$('#div_icwa').hide();
	$('#div_btn_icwa').hide();
	$('#div_btn_cs').hide();
	$('#div_btn_ca').hide();
}

function edit_ITR(){
alert("You can edit the Sales Details .");
$("#NO_itr_value_1").removeAttr('disabled');
$("#NO_itr_value_2").removeAttr('disabled');
$("#NO_itr_value_3").removeAttr('disabled');
$("#NO_itr_value_4").removeAttr('disabled');
$("#NO_itr_value_5").removeAttr('disabled');
$("#NO_itr_value_6").removeAttr('disabled');
$("#NO_itr_value_7").removeAttr('disabled');
$("#NO_itr_value_8").removeAttr('disabled');
$("#NO_itr_value_9").removeAttr('disabled');
$("#NO_itr_value_10").removeAttr('disabled');
$("#NO_itr_value_11").removeAttr('disabled');
$("#NO_itr_value_12").removeAttr('disabled');
$("#total_gross_margin").removeAttr('disabled');
$("#total_expenses_utilities").removeAttr('disabled');
$("#total_expenses_salaries").removeAttr('disabled');
$("#total_expenses_rentals").removeAttr('disabled');
$("#total_additional_recurring_expenses").removeAttr('disabled');
$("#gross_profit").removeAttr('disabled');



}

function clear_ITR_values()
{   

	document.getElementById("NO_itr_value_1").disabled = true;
	document.getElementById("NO_itr_value_2").disabled = true;
	document.getElementById("NO_itr_value_3").disabled = true;
	document.getElementById("NO_itr_value_4").disabled = true;
	document.getElementById("NO_itr_value_5").disabled = true;
	document.getElementById("NO_itr_value_6").disabled = true;
	document.getElementById("NO_itr_value_7").disabled = true;
	document.getElementById("NO_itr_value_8").disabled = true;
	document.getElementById("NO_itr_value_9").disabled = true;
	document.getElementById("NO_itr_value_10").disabled = true;
	document.getElementById("NO_itr_value_11").disabled = true;
	document.getElementById("NO_itr_value_12").disabled = true;
	document.getElementById("total_gross_margin").disabled = true;
	document.getElementById("total_expenses_utilities").disabled = true;
	document.getElementById("total_expenses_salaries").disabled = true;
	document.getElementById("total_expenses_rentals").disabled = true;
	document.getElementById("total_additional_recurring_expenses").disabled = true;
	document.getElementById("gross_profit").disabled = true;

}

              $("#NO_itr_value_1").keyup(function(){
			  var NO_itr_value_1 =parseInt($('#NO_itr_value_1').val())
			  var NO_itr_value_5 =parseInt($('#NO_itr_value_5').val())
			  var NO_itr_value_9 =parseInt($('#NO_itr_value_9').val())
			  var total_annual =((NO_itr_value_1 + NO_itr_value_5 + NO_itr_value_9)/3)*12
              document.getElementById('total_annual').value= total_annual;
              })
			  $("#NO_itr_value_5").keyup(function(){
			  var NO_itr_value_1 =parseInt($('#NO_itr_value_1').val())
			  var NO_itr_value_5 =parseInt($('#NO_itr_value_5').val())
			  var NO_itr_value_9 =parseInt($('#NO_itr_value_9').val())
			  var total_annual =((NO_itr_value_1 + NO_itr_value_5 + NO_itr_value_9)/3)*12
              document.getElementById('total_annual').value= total_annual;
              })
			  $("#NO_itr_value_9").keyup(function(){
			  var NO_itr_value_1 =parseInt($('#NO_itr_value_1').val())
			  var NO_itr_value_5 =parseInt($('#NO_itr_value_5').val())
			  var NO_itr_value_9 =parseInt($('#NO_itr_value_9').val())
			  var total_annual =((NO_itr_value_1 + NO_itr_value_5 + NO_itr_value_9)/3)*12
              document.getElementById('total_annual').value= total_annual;
              })

			  $("#total_gross_margin").keyup(function(){
			  var total_annual =parseInt($('#total_annual').val())
			  var total_gross_margin =parseInt($('#total_gross_margin').val())
			  var total_profit =((total_annual * total_gross_margin)/100)
              document.getElementById('total_profit').value= total_profit;
              })
               
			  $("#total_expenses_utilities").keyup(function(){
			  var total_expenses_utilities =parseInt($('#total_expenses_utilities').val())
			  var total_expenses_salaries =parseInt($('#total_expenses_salaries').val())
			  var total_expenses_rentals =parseInt($('#total_expenses_rentals').val())
			  var total_additional_recurring_expenses =parseInt($('#total_additional_recurring_expenses').val())
			  var total_Profit =parseInt($('#total_profit').val())
			  var gross_profit = total_Profit - (total_expenses_utilities+total_expenses_salaries+total_expenses_rentals+total_additional_recurring_expenses)
              document.getElementById('gross_profit').value= gross_profit;
              })

			  $("#total_expenses_salaries").keyup(function(){
			  var total_expenses_utilities =parseInt($('#total_expenses_utilities').val())
			  var total_expenses_salaries =parseInt($('#total_expenses_salaries').val())
			  var total_expenses_rentals =parseInt($('#total_expenses_rentals').val())
			  var total_additional_recurring_expenses =parseInt($('#total_additional_recurring_expenses').val())
			  var total_Profit =parseInt($('#total_profit').val())
			  var gross_profit = total_Profit - (total_expenses_utilities+total_expenses_salaries+total_expenses_rentals+total_additional_recurring_expenses)
              document.getElementById('gross_profit').value= gross_profit;
              })

			  $("#total_expenses_rentals").keyup(function(){
			  var total_expenses_utilities =parseInt($('#total_expenses_utilities').val())
			  var total_expenses_salaries =parseInt($('#total_expenses_salaries').val())
			  var total_expenses_rentals =parseInt($('#total_expenses_rentals').val())
			  var total_additional_recurring_expenses =parseInt($('#total_additional_recurring_expenses').val())
			  var total_Profit =parseInt($('#total_profit').val())
			  var gross_profit = total_Profit - (total_expenses_utilities+total_expenses_salaries+total_expenses_rentals+total_additional_recurring_expenses)
              document.getElementById('gross_profit').value= gross_profit;
              })
			  $("#total_additional_recurring_expenses").keyup(function(){
			  var total_expenses_utilities =parseInt($('#total_expenses_utilities').val())
			  var total_expenses_salaries =parseInt($('#total_expenses_salaries').val())
			  var total_expenses_rentals =parseInt($('#total_expenses_rentals').val())
			  var total_additional_recurring_expenses =parseInt($('#total_additional_recurring_expenses').val())
			  var total_Profit =parseInt($('#total_profit').val())
			  var gross_profit = total_Profit - (total_expenses_utilities+total_expenses_salaries+total_expenses_rentals+total_additional_recurring_expenses)
              document.getElementById('gross_profit').value= gross_profit;
              })
</script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 