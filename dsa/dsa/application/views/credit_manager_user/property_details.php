

	<div >
	
		<!-- Salaried ------------------------------- -->
		<?php// if($type == 'lap') { ?>	

		<form method="POST" action="<?php echo base_url(); ?>index.php/customer/apply_loan_screen_lap_loan_action" id="apply_loan_screen_2_lap">
			
            <div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Investment Details</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Savings in Bank *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" required placeholder="Amount" class="input-cust-name" type="number" name="savings_in_bank" id="savings_in_bank" onkeyup="savings(); shortFall(this)" oninput="maxLengthCheck(this)" maxlength="10" value="<?php if(!empty($row_more))echo $row_more2->SAVING_IN_BANK;?>">
						<input  hidden  class="input-cust-name" type="text" name="UID" id="UID" value="<?php if(!empty($id)){ echo $id; }?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Immovable Properties *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" required placeholder="Amount" class="input-cust-name" type="number" name="immovable_prop" id="immovable_prop" oninput="maxLengthCheck(this)" onkeyup="immovable(); shortFall(this)" maxlength="10" value="<?php if(!empty($row_more))echo $row_more2->IMMOVABLE_PROP;?>">
	  				</div> 
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Investments *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required min="0" placeholder="Amount" class="input-cust-name" type="number" name="other_invest" id="other_invest" oninput="maxLengthCheck(this)" onkeyup="other(); shortFall(this)" maxlength="10" value="<?php if(!empty($row_more))echo $row_more2->OTHER_INVESTMENTS;?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Insurance Policies *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" required placeholder="Amount" class="input-cust-name" type="number" name="insurance_poli" id="insurance_poli" oninput="maxLengthCheck(this)" onkeyup="insurance(); shortFall(this)" maxlength="10" value="<?php if(!empty($row_more))echo $row_more2->IMMOVABLE_PROP;?>">
	  				</div> 
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				

					
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Have you short listed the property  *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input style="margin-right: 5px;" type="radio" name="prop_short_radio" value="Yes">Yes
						<input style="margin-left: 10px; margin-right: 5px;" type="radio" name="prop_short_radio" value="No" checked="true">No				
	  				</div> 
				</div>
				</div>
			</div>			

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Property Location</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="30" minlength="3" readonly style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_1;?>">
  					<input maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 2" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_2;?>">
  					<input maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 3" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_3;?>">
  					<input hidden="true" class="input-cust-name" type="text" id="actual_loan_type" name="actual_loan_type" value="<?php echo $type;?>">
  				</div>  

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of years of ownership *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input readonly placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_NO_YEARS_LIVING;?>">
  				</div>			  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="30" minlength="3" readonly placeholder="Enter landmark *" class="input-cust-name" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LANDMARK;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input readonly placeholder="Enter pincode *" class="input-cust-name" type="number" minlength="6" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_PINCODE;?>">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select readonly class="input-cust-name resi_prop_type" name="resi_sel_property_type" > 
					  <option value="">Select Property Type *</option>
					  <option value="Corporate Provided" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
					  <option value="Mortgaged" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
					  <option value="Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
					  <option value="Rented" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
					  <option value="Shared Accomodation" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
					  <option value="Paying Guest" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
					  <option value="Others" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
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
  					<input hidden="true" placeholder="State" class="input-cust-name" name="resi_state" id="resi_state" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_STATE ;?>">  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District" class="input-cust-name" id="resi_district_view" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_DISTRICT ;?>">
  					<input hidden="true" placeholder="District" class="input-cust-name" name="resi_district" id="resi_district" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_DISTRICT ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="30" minlength="3" placeholder="City" class="input-cust-name" name="resi_city" id="resi_city" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_CITY ;?>">
  				</div>  			  				
			</div>							
			</div>
			</div>
<?php //if( $row_more2->LOAN_TYPE =='lap')
// { ?>
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Loan Details</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Rate Option *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select readonly class="input-cust-name" name="select_rate_option"> 
							  <option value="">Select Option *</option>
							  <option value="Fixed" <?php if(!empty($row_more2))if ($row_more2->RATE_OPTION == 'Fixed') echo ' selected="selected"'; ?>>Fixed</option>							  
							  <option value="Floating" <?php if(!empty($row_more2))if ($row_more2->RATE_OPTION == 'Floating') echo ' selected="selected"'; ?>>Floating</option>							  
							  <option value="Others" <?php if(!empty($row_more2))if ($row_more2->RATE_OPTION == 'Others') echo ' selected="selected"'; ?>>Others</option>							  
							</select>
	  				</div>  

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan Type *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select readonly class="input-cust-name" name="select_loan_type"> 
							  <option value="">Select Loan Type *</option>
							  <option value="Loan against residential property" <?php if(!empty($row_more2))if ($row_more2->HOME_LOAN_TYPE == 'Loan against residential property') echo ' selected="selected"'; ?>>Loan against residential property</option>			
							  <option value="Loan against commercial property" <?php if(!empty($row_more2))if ($row_more2->HOME_LOAN_TYPE == 'Loan against commercial property') echo ' selected="selected"'; ?>>Loan against commercial property</option>							  
							  						  
							</select>
	  				</div>  

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Desired loan amount *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input readonly placeholder="Amount" class="input-cust-name" type="number" name="desired_loan_amount" id="desired_loan_amount" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(isset($row_more2)) echo $row_more2->DESIRED_LOAN_AMOUNT ;?>">
	  				</div>  	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Tenure in Years *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input readonly placeholder="Enter year" class="input-cust-name" type="number" name="tenure_year" id="tenure_year" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(isset($row_more2)) echo $row_more2->TENURE ;?>">
	  				</div> 

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan is to be Availed for *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select readonly class="input-cust-name" name="loan_availed_for" id="loan_availed_for"> 
							  <option value="">Select availed for *</option>
							  <option value="Property from Developer / Builder" <?php if(!empty($row_more2))if ($row_more2->LOAN_AVAILED_FOR == 'Property from Developer / Builder') echo ' selected="selected"'; ?>>Property from Developer / Builder</option>
							  <option value="Property from Development Authority" <?php if(!empty($row_more2))if ($row_more2->LOAN_AVAILED_FOR == 'Property from Development Authority') echo ' selected="selected"'; ?>>Property from Development Authority</option>
							  <option value="Resale/ Pre-owned Flat/ Rowhouse" <?php if(!empty($row_more2))if ($row_more2->LOAN_AVAILED_FOR == 'Resale/ Pre-owned Flat/ Rowhouse') echo ' selected="selected"'; ?>>Resale/ Pre-owned Flat/ Rowhouse</option>
							  <option value="Construction of Standalone House on a Plot" <?php if(!empty($row_more2))if ($row_more2->LOAN_AVAILED_FOR == 'Construction of Standalone House on a Plot') echo ' selected="selected"'; ?>>Construction of Standalone House on a Plot</option>
							  <option value="Resale/ Pre-owned Bungalow" <?php if(!empty($row_more2))if ($row_more2->LOAN_AVAILED_FOR == 'Resale/ Pre-owned Bungalow') echo ' selected="selected"'; ?>>Resale/ Pre-owned Bungalow</option>							  
							  <option value="Others" <?php if(!empty($row_more2))if ($row_more2->LOAN_AVAILED_FOR == 'Others') echo ' selected="selected"'; ?>>Others</option>							  
							</select>
	  				</div> 

	  				<div class="w-100"></div>
	  				
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Open Area (Sq ft) </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input readonly placeholder="Area" class="input-cust-name" type="number" name="area_land" id="area_land" oninput="maxLengthCheck(this)" maxlength="15"  value="<?php if(isset($row_more2)) echo $row_more2->AREA_OF_LAND ;?>">
	  				</div> 
	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Carpet Area (Sq ft) </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input readonly placeholder="Area" class="input-cust-name" type="number" name="carpet_area" id="carpet_area" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(isset($row_more2)) echo $row_more2->CARPET_AREA ;?>">
	  				</div> 

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Build up Area (Sq ft) </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input readonly placeholder="Area" class="input-cust-name" type="number" name="buildup_area" id="buildup_area" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(isset($row_more2)) echo $row_more2->BUILD_UP_AREA ;?>">
	  				</div> 

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Reason for Loan *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select readonly class="input-cust-name" name="visit_reason" id="visit_reason"> 
							  <option value="">Select Reason *</option>
							  <option value="Medical" <?php if(!empty($row_more2))if ($row_more2->REASON_FOR_VISIT == 'Medical') echo ' selected="selected"'; ?>>Medical</option>
							  <option value="House Owner (Home Renovation)" <?php if(!empty($row_more2))if ($row_more2->REASON_FOR_VISIT == 'House Owner (Home Renovation)') echo ' selected="selected"'; ?>>House Owner (Home Renovation)</option>
							  <option value="Personal (Others)" <?php if(!empty($row_more2))if ($row_more2->REASON_FOR_VISIT == 'Personal (Others)') echo ' selected="selected"'; ?>>Personal (Others)</option>
							  <option value="Holiday" <?php if(!empty($row_more2))if ($row_more2->REASON_FOR_VISIT == 'Holiday') echo ' selected="selected"'; ?>>Holiday</option>
							  <option value="Advance Salary" <?php if(!empty($row_more2))if ($row_more2->REASON_FOR_VISIT == 'Advance Salary') echo ' selected="selected"'; ?>>Advance Salary</option>
							  <option value="Rental Deposit" <?php if(!empty($row_more2))if ($row_more2->REASON_FOR_VISIT == 'Rental Deposit') echo ' selected="selected"'; ?>>Rental Deposit</option>
							  <option value="Wedding" <?php if(!empty($row_more2))if ($row_more2->REASON_FOR_VISIT == 'Wedding') echo ' selected="selected"'; ?>>Wedding</option>
							  <option value="Credit Card Takeover" <?php if(!empty($row_more2))if ($row_more2->REASON_FOR_VISIT == 'Credit Card Takeover') echo ' selected="selected"'; ?>>Credit Card Takeover</option>					  
							  <option value="Others" <?php if(!empty($row_more2))if ($row_more2->REASON_FOR_VISIT == 'Others') echo ' selected="selected"'; ?>>Others</option>
							</select>
	  				</div> 
					
				</div>

			
			</div>

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Are you Sole Owner of Property *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input checked="true" style="margin-right: 5px;" type="radio" name="sole_owner" value="Yes">Yes
						<input style="margin-left: 10px; margin-right: 5px;" type="radio" name="sole_owner" value="No">No				
	  				</div> 

	  				<div class="w-100"></div>
	  				
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">what is your share (%) in property *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter share percentage" class="input-cust-name" type="number" name="share_prop" id="share_prop" oninput="maxLengthCheck(this)" maxlength="3"  value="<?php if(isset($row_more2)) echo $row_more2->SHARE_IN_PROP ;?>">
	  				</div> 
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Will bank be able to obtain sole ownership of the property *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input style="margin-right: 5px;" type="radio" name="sole_owner_able" value="Yes" >Yes
						<input style="margin-left: 10px; margin-right: 5px;" type="radio" name="sole_owner_able" value="No" checked="true" >No				
	  				</div> 

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Is legal title of the property clear *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input style="margin-right: 5px;" type="radio" name="legal_title" value="Yes" >Yes
						<input style="margin-left: 10px; margin-right: 5px;" type="radio" name="legal_title" value="No" checked="true" >No				
	  				</div> 

	  				
	  			</div>

	  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Do you have any loan on property *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input checked="true" style="margin-right: 5px;" type="radio" name="loan_on_property" value="Yes">Yes
						<input style="margin-left: 10px; margin-right: 5px;" type="radio" name="loan_on_property" value="No">No				
	  				</div> 

	  				<div class="w-100"></div>
	  				
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">How many properties do you own *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter property count" class="input-cust-name" type="number" name="no_of_property" id="no_of_property" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(isset($row_more2)) echo $row_more2->HOW_MANY_PROP_OWN ;?>">
	  				</div> 
	  			</div>
			</div>

		<br><br>

<?php// } ?>		
			</div>
			    <script>
					 $(document).ready(function () {
									
														$('#loan_end_date').datepicker({
																				autoclose: true,
																				endDate: new Date(new Date().setDate(new Date().getDate())),
																				format: 'yyyy-mm-dd'  
															
																			});  
								
								                    });
				</script>
                 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
			</form>
		<?php// } ?>		
		</div>		
	</div>
