<div>
	<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
    </div>
	


		<!-- Salaried ------------------------------- -->
		<?php if($type == 'salaried') { ?>
		
		<?php } ?>	

		<!-- self employed ------------------------------- -->
		<?php if($type == 'business') { ?>	
			<form method="POST" action="<?php echo base_url(); ?>index.php/customer/customer_flow_update_s_two_business" id="customer_flow_update_s_two_business">
		
			<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Address of your Business</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">This will Help Us To Collect Any Documents If Necessary.</span>

			</div>
			<div class="w-100"></div>
		

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required="true"  style="margin-top: 1px;" placeholder="Address Line 1 *" class="form-control" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row))echo $row->ORG_ADRS_LINE_1?>">
  					<input  style="margin-top: 8px;" placeholder="Address Line 2 *" class="form-control" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row))echo $row->ORG_ADRS_LINE_2?>">
  					<input  style="margin-top: 8px;" placeholder="Address Line 3 *" class="form-control" type="text" name="resi_add_3" id="resi_add_3" value="<?php if(!empty($row))echo $row->ORG_ADRS_LINE_3?>">
						
  				</div>  

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">No of Years At Current Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input min="0" required="true" placeholder="Enter years *" class="form-control" type="number" maxlength="2" name="resi_no_of_years" id="resi_no_of_years" value="<?php if(!empty($row))echo $row->BIS_YEARS_CURRERENT_ADDRS?>">
  				</div>			  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required="true"  placeholder="Enter landmark *" class="form-control" type="text" name="business_landmark" id="business_landmark" value="<?php if(!empty($row))echo $row->ORG_LANDMARK?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required="true" maxlength="6" oninput="maxLengthCheck(this)" placeholder="Enter pincode *" class="form-control" type="text" pattern="[0-9]{6}" minlength="6" name="resi_pincode" title="Please enter valid pincode" id="resi_pincode" value="<?php if(!empty($row))echo $row->ORG_PINCODE?>">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select required class="form-control" name="sel_property_type" id="sel_property_type"> 
					  <option value="">Select Property Type *</option>					  
					  <option value="Self Owned" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Self Owned') echo ' selected="selected"'; ?>>Self Owned</option>
					  <option value="Parental/Ancestral" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Parental/Ancestral') echo ' selected="selected"'; ?>>Parental/Ancestral</option>
					  <option value="Rental personal Family" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Rental personal Family') echo ' selected="selected"'; ?>>Rental</option>
				      <option value="Shared Rental Accomodation" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Shared Rental Accomodation') echo ' selected="selected"'; ?>>Shared Rental Accomodation</option>
					</select>
  				</div>  			  							  				
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  id="resi_state_view" placeholder="State" class="form-control" value="<?php if(!empty($row))echo $row->ORG_STATE ;?>">
  					<input hidden="true" placeholder="State" class="form-control" name="resi_state" id="resi_state" value="<?php if(!empty($row))echo $row->ORG_STATE ;?>">
  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="District" class="form-control" id="resi_district_view" value="<?php if(!empty($row))echo $row->ORG_DISTRICT ;?>">
  					<input hidden="true" placeholder="District" class="form-control" name="resi_district" id="resi_district" value="<?php if(!empty($row))echo $row->ORG_DISTRICT ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">City *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="City" class="form-control" name="resi_city" id="resi_city" value="<?php if(!empty($row))echo $row->ORG_CITY ;?>">
  				</div>   			  				
			</div> 			
		</div>

	

		<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Awesome</span>

				</div>
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">Please Can You Tell A Bit More About Your Organisation.</span>

				</div>
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">						  			

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Industry operating *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<!--input required="true" maxlength="20" oninput="maxLengthCheck(this)" placeholder="Enter industry operating" class="input-cust-name" type="text" name="self_emp_operating"-->
	  					<select required class="form-control" name="self_emp_operating"> 
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
						  <option value="Coaching class" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Coaching class') echo ' selected="selected"'; ?>>Coaching class</option>			  
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
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Premises Type *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<select required class="form-control" name="self_emp_property_type"> 
						  <option value="">Select Premises *</option>
						  <option value="Rented" <?php if(!empty($row))if ($row->BIS_PREMISES_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
						  <option value="Self Owned" <?php if(!empty($row))if ($row->BIS_PREMISES_TYPE == 'Self Owned') echo ' selected="selected"'; ?>>Self Owned</option>						  
						  <option value="Others" <?php if(!empty($row))if ($row->BIS_PREMISES_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>						  
						</select>
	  				</div> 			
					  <div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Paid up capital/ Equity in Business</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input   class="form-control" type="number" name="bis_equity"  required="true"   value="<?php if(!empty($row))echo $row->BIS_EQUITY ?>">
	  				</div>   				
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Nature of Business *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<select required class="form-control" name="business_nature" id="business_nature"> 
						<option value="">Select Business Nature *</option>
						    <option value="CA/CS/ICWA" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'CA/CS/ICWA') echo ' selected="selected"'; ?>>CA/CS/ICWA</option>
                            <option value="DOCTOR" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'DOCTOR') echo ' selected="selected"'; ?>>DOCTOR</option>
                            <option value="LAWYER" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'LAWYER') echo ' selected="selected"'; ?>>LAWYER</option>	
                            <option value="RETAIL AND WHOLESALE" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'RETAIL AND WHOLESALE') echo ' selected="selected"'; ?>>RETAIL AND WHOLESALE</option>	
                            <option value="INSURANCE AND FINANCIAL MANAGEMENT" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'INSURANCE AND FINANCIAL MANAGEMENT') echo ' selected="selected"'; ?>>INSURANCE AND FINANCIAL MANAGEMENT</option>
                            <option value="MANPOWER AND HR" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'MANPOWER AND HR') echo ' selected="selected"'; ?>>MANPOWER AND HR</option>
                            <option value="FMCG/FOOD INDUSTRY" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'FMCG/FOOD INDUSTRY') echo ' selected="selected"'; ?>>FMCG/FOOD INDUSTRY</option>
                            <option value="AGRICULTURE/FARMING" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'AGRICULTURE/FARMING') echo ' selected="selected"'; ?>>AGRICULTURE/FARMING</option>
                            <option value="INFORMATION TECHNOLOGY" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'INFORMATION TECHNOLOGY') echo ' selected="selected"'; ?>>INFORMATION TECHNOLOGY</option>
                            <option value="ELECTRONICS/ELECTRICALS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'ELECTRONICS/ELECTRICALS') echo ' selected="selected"'; ?>>ELECTRONICS/ELECTRICALS</option>
                            <option value="PHARMACEUTICAL/HEALTH MANAGEMENT" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'PHARMACEUTICAL/HEALTH MANAGEMENT') echo ' selected="selected"'; ?>>PHARMACEUTICAL/HEALTH MANAGEMENT</option>	
							<option value="TOURISM/HOSPITALITY/RESTAURENT/HOTEL" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'TOURISM/HOSPITALITY/RESTAURENT/HOTEL') echo ' selected="selected"'; ?>>TOURISM/HOSPITALITY/RESTAURENT/HOTEL</option>	
							<option value="JOURNALISM/TELECOMMUNICATION" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'JOURNALISM/TELECOMMUNICATION') echo ' selected="selected"'; ?>>JOURNALISM/TELECOMMUNICATION</option>	
							<option value="RTO AGENCY/MOTOR TRAINING SCHOOL" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'RTO AGENCY/MOTOR TRAINING SCHOOL') echo ' selected="selected"'; ?>>RTO AGENCY/MOTOR TRAINING SCHOOL</option>	
							<option value="PETROL/CNG/LPG AGENCY" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'PETROL/CNG/LPG AGENCY') echo ' selected="selected"'; ?>>PETROL/CNG/LPG AGENCY</option>	
							<option value="REAL ESTATE/ARCHITECTURE/CONSTRUCTION/ BUILDING MATERIAL" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'REAL ESTATE/ARCHITECTURE/CONSTRUCTION/ BUILDING MATERIAL') echo ' selected="selected"'; ?>>REAL ESTATE/ARCHITECTURE/CONSTRUCTION/ BUILDING MATERIAL</option>
                            <option value="SALES/MARKETING" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'SALES/MARKETING') echo ' selected="selected"'; ?>>SALES/MARKETING</option>							
							<option value="BANKING/FINANCE" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'BANKING/FINANCE') echo ' selected="selected"'; ?>>BANKING/FINANCE</option>	
							<option value="MECHANICAL/AUTOMOTIVE" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'MECHANICAL/AUTOMOTIVE') echo ' selected="selected"'; ?>>MECHANICAL/AUTOMOTIVE</option>
							<option value="EDUCATION INDUSTRY" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'EDUCATION INDUSTRY') echo ' selected="selected"'; ?>>EDUCATION INDUSTRY</option>
							<option value="FILM/FASHION/BEAUTY/PERSONAL SERVICES" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'FILM/FASHION/BEAUTY/PERSONAL SERVICES') echo ' selected="selected"'; ?>>FILM/FASHION/BEAUTY/PERSONAL SERVICES</option>
							<option value="CONTRACTOR (ALL TYPE)" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'CONTRACTOR (ALL TYPE)') echo ' selected="selected"'; ?>>CONTRACTOR (ALL TYPE)</option>
							<option value="SMALL SERVICE INDUSTRY" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'SMALL SERVICE INDUSTRY') echo ' selected="selected"'; ?>>SMALL SERVICE INDUSTRY</option>
							<option value="WINE SHOP/BAR" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'WINE SHOP/BAR') echo ' selected="selected"'; ?>>WINE SHOP/BAR</option>
							<option value="OTHER" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'OTHER') echo ' selected="selected"'; ?>>OTHER</option>
						</select>
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">No of years in Business *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<input min="1" required="true" maxlength="2" oninput="maxLengthCheck(this)" placeholder="Enter years" class="form-control" type="number" name="self_emp_no_years" value="<?php if(!empty($row))echo $row->BIS_YEARS_IN_BIS?>">
	  				</div> 
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Constitution Of Company *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<select required class="form-control" name="business_constitution" id="business_constitution" onchange="business()"> 
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
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Designation *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<select required class="form-control" name="business_desi"> 
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
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Please Tell Us About Your Profession</span>

			</div>

			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">This Will Help Us To know About Your Income Related Details</span>

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
							<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Annual Income *</span>
						</div>			
						
						<div class="w-100"></div>
							
						<div style="margin-left: 35px; margin-top: 8px;" class="col">
							<input placeholder="Enter Annual Income *" class="form-control" type="number" maxlength="18" name="business_annual_income" id="business_annual_income" oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->BIS_ANNUAL_INCOME?>">
						</div>
						
					</div>
					
					<div id="regi_no_layout">
				
					</div>
					<div id="">
					<div class="w-100"></div>
						<div style="margin-top: 10px;" class="col">
							<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Orgnization Name *</span>
						</div>			
						
						<div class="w-100"></div>
							
						<div style="margin-left: 35px; margin-top: 8px;" class="col">
							<input placeholder="Enter Orgnization Name" class="form-control" maxlength="40" name="org_name_buisness" id="org_name_buisness" oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->BIS_NAME?>" required="true">
						    <span style="color:red" id="org_name_buisness_error"></span>
						</div>
					</div>

				</div>	
				<div class="justify-content-center row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">GST Number</span>
					</div>			
					
					<div class="w-100"></div>
						
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<input maxlength="15" oninput="maxLengthCheck(this)" placeholder="Enter GST number" class="form-control" type="text" <?php if(!empty($row_more)){if($row_more->verify_GST_status=='true'){echo 'readonly';}}?> id="business_gst_no" name="business_gst_no" value="<?php if(!empty($row))echo $row->BIS_GST?>">

						<input type="text" id="verify_GST_status" name="verify_GST_status" value="<?php if(!empty($row_more)){echo $row_more->verify_GST_status;} ?>" hidden>
					    <span style="color:red" id="business_gst_no_error"></span>
					</div>
					<div class="w-100"></div>
					    <div style="margin-top: 10px;" class="col">
							<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Business PAN</span>
						</div>			
						
						<div class="w-100"></div>
							
						<div style="margin-left: 35px; margin-top: 8px;" class="col">

							<input  placeholder="Enter PAN" class="form-control" type="text" maxlength="10" <?php if(!empty($row_more)){if($row_more->verify_Bis_Pan_status=='true'){echo 'readonly';}}?> name="business_pan" id="business_pan" oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->BIS_PAN?>">

							<input type="text" id="verify_Bis_Pan_status" name="verify_Bis_Pan_status" value="<?php if(!empty($row_more)){echo $row_more->verify_Bis_Pan_status;} ?>" hidden>
						    <span style="color:red" id="business_pan_error"></span>
						</div>

										
	<!--------------------------------------------------------------- CA-------------------------------------------------------------------------- -->
					
	
		

				
			</div>			

						
		</div>	 

		<div class="row shadow bg-white rounded margin-10 padding-15" id="business_man_layout" style="display:none">

			<div class="row justify-content-center col-12" id="ITR_yes_div1">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">We Need Few Details About Your Business To Help Us Process Your Loan Application</span>

			</div>

			<div class="row justify-content-center col-12" id="ITR_yes_div2">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">Please Enter The <span style="color: red;">Bank Balance Of The Primary Bank Account</span> Used By Your Business On The Following Days</span>

			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="ITR_yes_div3">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 10%;"><?php $date = date("Y-m-d"); echo $date; echo $newdate = date("F", strtotime ( '-1 month' , strtotime ( $date ) )) ; ?></span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input min="0" style=" margin-bottom: 10px;" maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "01 - ".date('m-Y', strtotime('-3 month'));?>" class="form-control" type="number" name="business_income_1" id="business_income_1" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_1']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "07 - ".date('m-Y', strtotime('-3 month'));?>" class="form-control" type="number" name="business_income_2" id="business_income_2" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_2']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "14 - ".date('m-Y', strtotime('-3 month'));?>" class="form-control" type="number" name="business_income_3" id="business_income_3" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_3']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;" maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "21 - ".date('m-Y', strtotime('-3 month'));?>" class="form-control" type="number" name="business_income_4" id="business_income_4" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_4']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;" maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "28 - ".date('m-Y', strtotime('-3 month'));?>" class="form-control" type="number" name="business_income_5" id="business_income_5" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_5']; }?>">
	  				</div>  
	  											  				
				</div>	

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="ITR_yes_div4">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 10%;"><?php echo date('M Y', strtotime('-2 month'));?></span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "01 - ".date('m-Y', strtotime('-2 month'));?>" class="form-control" type="number" name="business_income_6" id="business_income_6" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_6']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "07 - ".date('m-Y', strtotime('-2 month'));?>" class="form-control" type="number" name="business_income_7" id="business_income_7" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_7']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "14 - ".date('m-Y', strtotime('-2 month'));?>" class="form-control" type="number" name="business_income_8" id="business_income_8" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_8']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "21 - ".date('m-Y', strtotime('-2 month'));?>" class="form-control" type="number" name="business_income_9" id="business_income_9" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_9']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "28 - ".date('m-Y', strtotime('-2 month'));?>" class="form-control" type="number" name="business_income_10" id="business_income_10" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_10']; }?>">
	  				</div>  
	  											  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="ITR_yes_div5">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 10%;"><?php echo date('M Y', strtotime('-1 month'));?></span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "01 - ".date('m-Y', strtotime('-1 month'));?>" class="form-control" type="number" name="business_income_11" id="business_income_11" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_11']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "07 - ".date('m-Y', strtotime('-1 month'));?>" class="form-control" type="number" name="business_income_12" id="business_income_12" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_12']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "14 - ".date('m-Y', strtotime('-1 month'));?>" class="form-control" type="number" name="business_income_13" id="business_income_13" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_13']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "21 - ".date('m-Y', strtotime('-1 month'));?>" class="form-control" type="number" name="business_income_14" id="business_income_14" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_14']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "28 - ".date('m-Y', strtotime('-1 month'));?>" class="form-control" type="number" name="business_income_15" id="business_income_15" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_15']; }?>">
	  				</div>  
	  											  				
				</div>	
							
	<!-- ------------ added by priyanka--------------------------------------------------------------------------------------------------------->
	<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Do You Have ITR ?</span>

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
	  				
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">1)&nbsp; Total Sales Value Per Month</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">2)&nbsp; Sale Value Per Customer</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">3)&nbsp; Total Customers Per Day</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">4)&nbsp; Total Fixed Client Base In The Catchment</span><br>
					  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
			        </div>  
   				</div>	
	
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-3 month'));?></span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="form-control" type="number" name="NO_itr_value_1" id="NO_itr_value_1" value="<?php if(!empty($row))echo $row->sales_per_month_1?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="form-control" type="number" name="NO_itr_value_2" id="NO_itr_value_2" value="<?php if(!empty($row))echo $row->sales_per_cust_1?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="form-control" type="number" name="NO_itr_value_3" id="NO_itr_value_3" value="<?php if(!empty($row))echo $row->cust_per_day_1?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="form-control" type="number" name="NO_itr_value_4" id="NO_itr_value_4" value="<?php if(!empty($row))echo $row->total_chachement_1?>">
	  				</div>  
	  											  				
				</div>	
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-2 month'));?></span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="form-control" type="number" name="NO_itr_value_5" id="NO_itr_value_5" value="<?php if(!empty($row))echo $row->sales_per_month_2?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="form-control" type="number" name="NO_itr_value_6" id="NO_itr_value_6" value="<?php if(!empty($row))echo $row->sales_per_cust_2?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="form-control" type="number" name="NO_itr_value_7" id="NO_itr_value_7" value="<?php if(!empty($row))echo $row->cust_per_day_2?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="form-control" type="number" name="NO_itr_value_8" id="NO_itr_value_8" value="<?php if(!empty($row))echo $row->total_chachement_2?>">
	  				</div>  
	  											  				
				</div>	
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-1 month'));?></span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="form-control" type="number" name="NO_itr_value_9" id="NO_itr_value_9" value="<?php if(!empty($row))echo $row->sales_per_month_3?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="form-control" type="number" name="NO_itr_value_10" id="NO_itr_value_10" value="<?php if(!empty($row))echo $row->sales_per_cust_3?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="form-control" type="number" name="NO_itr_value_11" id="NO_itr_value_11" value="<?php if(!empty($row))echo $row->cust_per_day_3?>">
	  					<input required disabled="disabled" min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="form-control" type="number" name="NO_itr_value_12" id="NO_itr_value_12" value="<?php if(!empty($row))echo $row->total_chachement_3?>">
	  				</div>  
	  											  				
				</div>	
	<div class="row justify-content-center col-12" style="text-aline:cener;">
		<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom:3%; ">Business Financials</span>
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
	  					<input  required disabled="disabled" min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_gross_margin" id="total_gross_margin" value="<?php if(!empty($row))echo $row->total_gross_margin?>">
	  					<input readonly min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_profit" id="total_profit" value="<?php if(!empty($row))echo $row->total_profit?>">
	  					<input  required disabled="disabled" min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_expenses_utilities" id="total_expenses_utilities" value="<?php if(!empty($row))echo $row->total_utilities?>">
	  					<input  required disabled="disabled" min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_expenses_salaries" id="total_expenses_salaries" value="<?php if(!empty($row))echo $row->total_salaries?>">
	  					<input  required disabled="disabled" min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_expenses_rentals" id="total_expenses_rentals" value="<?php if(!empty($row))echo $row->total_rental?>">
	  					<input required  disabled="disabled" min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_additional_recurring_expenses" id="total_additional_recurring_expenses" value="<?php if(!empty($row))echo $row->total_recurring?>">
	  					<input  required disabled="disabled" min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="gross_profit" id="gross_profit" value="<?php if(!empty($row))echo $row->gross_profit?>">
	  				</div>  
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" ></div>
    

</div>
		</div>


<!-------------------------------------------------------------------------------------------------------------------------->

		
					
                   <?php if(!empty($row_more)){ if( $row_more->verify_GST_status=='true' || $row_more->verify_Bis_Pan_status=='true' ){ ?> 
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
		
		<?php if($type == 'notworking') { ?>
			<form method="POST" action="<?php echo base_url(); ?>index.php/customer/customer_flow_update_s_two_retired" id="customer_flow_update_s_two_retired">
				<input hidden type="text" name="dsa_id" id="dsa_id" value="<?php if($dsa_id !=''){ echo $dsa_id;} else { echo $dsa_id1 ;}?>">

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Awesome</span>

				</div>
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">Please Can You Tell A Bit More Annual Income.</span>

				</div>
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Annual Income</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input hidden placeholder="Organisation name" class="input-cust-name" type="text" name="ID"  id="ID" value="<?php if(!empty($cust_row))echo $cust_row->UNIQUE_CODE?>">
						<input maxlength="20"  oninput="maxLengthCheck(this)" placeholder="Enter annual income" class="input-cust-name" type="number" min="10000" name="income" value="<?php if(!empty($row))echo $row->RETIRED_ANNUAL_INCOME?>">
	  				</div> 			  				
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="" class="col">
						<span class="align-middle dot-light-theme"><i style=" font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Source Of Annual Income</span>
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
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell Us A  Bit More About Your Past Company</span>

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
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 10%;  font-weight: bold; ">Office/ Work Email Address *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter work email id" class="input-cust-name" type="email" name="org_past_work_email" id="org_past_work_email" maxlength="30"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_WORK_EMAIL_PAST?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">You Have Worked Here From *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input class="input-cust-name" max="<?php echo date('Y-m-d');?>" type="date" name="org_past_working_from" id="org_past_working_from" value="<?php if(!empty($row))echo $row->ORG_WORKED_FROM_PAST?>">
						
	  				</div>  			  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Last 3 Month's Take Home Salarie's Are *</span>
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
	  					<input min="0" placeholder="Annual gross salary" class="input-cust-name" type="number" name="org_past_gross_salary" id="org_past_gross_salary" maxlength="12"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_ANNUAL_SALARY_PAST?>">
	  				</div>  				  					  				  				
				</div>				
			</div>		

			<div class="row shadow bg-white rounded margin-10 padding-15">
				
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell Us Bit More About EMI's *</span>

					<div class="row col-12" style="color: black; font-size: 14px;">
						<span class="align-middle dot-light-theme" style="margin-top: -5px;"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 12px;">Existing EMI's </span>
					<div class="w-100"></div>
						<div style="margin-left: 20px;" class="custom-control custom-switch">				  
						  <input checked type="checkbox" class="custom-control-input" id="emiSwitches" name="resiperchk">
						  <label class="custom-control-label" for="emiSwitches">Do You Have Any Emi's ?</label>				  
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
			</div>

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row col-12 justify-content-center">
					<div>
						<a href="<?php echo base_url()?>index.php/customer/customer_documents">
						<button class="login100-form-btn" style="background-color: #25a6c6;" id="continue1">
							CONTINUE
						</button></a>						
					</div>		
				</div>					
			</div>

		    

		</form>
		<?php } ?>	
				


		</div>		
	</div>
	
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
