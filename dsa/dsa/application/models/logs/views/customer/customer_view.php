<?php
//$Cust_consent_id = $id;
$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
//$cust_consent_status ="true";
$cust_consent_status  =$this->session->userdata("cust_consent_status");
$user_type_from_session=$this->session->userdata("user_type_from_session");
//echo $Cust_consent_id;
//echo $cust_consent_status;
//exit();
if($user_type_from_session=='DSA' && isset($Cust_consent_id))
{
	$id=$Cust_consent_id;
}
//$id=$Cust_consent_id;
?>


		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="text-align: center; margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Please select required loan type</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="text-align: center; margin-bottom: 45px; font-size: 12px; color: #bfbbbb;">Your selected loan type will help us to analyse that what kind of details we require from you.</span>

			</div>
			<div class="w-100"></div>
			<div class="row col-12 justify-content-md-center">
				<div class="row justify-content-md-center" style="padding: 0px !important;">
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
							<div class="row <?php if($type == 'home'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center padding-5">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/home_loan.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You want loan for buying Home</span>
								<span class="font-9" style="margin-top: 0px; color: black; font-weight: bold; opacity: 0.8; text-align: center;">Home Loan</span>
								<div class="w-100"></div>
								<?php if($type == 'home') { ?>
									<img style="width: 20px; height: 20px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>				
						</div>	
					
				    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
							<div class="row <?php if($type == 'lap'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center ">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/plot_loan.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You want loan for against property</span>
								<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Loan Against Property</span>
								<div class="w-100"></div>
								<?php if($type == 'lap') { ?>
									<img style="width: 20px; height: 20px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>
			  			</div>	
			
		  			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
			  				<div class="row <?php if($type == 'personal'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center ">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/personal_loan.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You want loan for personal use.</span>
								<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Personal Loan</span>
								<div class="w-100"></div>
								<?php if($type == 'personal') { ?>
									<img style="width: 20px; height: 20px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>
			  			</div>	
			  	

			  		<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
			  				<div class="row <?php if($type == 'business'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center ">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/business.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You want loan for Business.</span>
								<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Business Loan</span>
								<div class="w-100"></div>
								<?php if($type == 'business') { ?>
									<img style="width: 20px; height: 20px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>
			  			</div>	
			  	
			  	<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
			  				<div class="row <?php if($type == 'credit'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center ">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/credit_card.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">Loan for credit card's.</span>
								<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Credit Cards</span>
								<div class="w-100"></div>
								<?php if($type == 'credit') { ?>
									<img style="width: 20px; height: 20px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>
			  			</div>	

				</div>	
			</div>			
		</div>

      
		<!-- Home ------------------------------- -->
        <?php if($type == 'home') { ?>	
            <form method="POST" action="<?php echo base_url(); ?>index.php/customer/apply_loan_screen_home_loan_action?UID=<?php echo $id; ?>" id="apply_loan_screen_1">
				
            
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Investment Details(in rupees)</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Savings in Bank *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" required placeholder="Amount" class="input-cust-name" type="number" name="savings_in_bank" id="savings_in_bank" onkeyup="savings(); shortFall(this)" oninput="maxLengthCheck(this)" maxlength="10" value="<?php if(isset($form_data)){ echo $form_data->SAVING_IN_BANK;}?>"readonly>
						<input  hidden  class="input-cust-name" type="text" name="UID" id="UID" value="<?php if(!empty($id)){ echo $id; }?>"readonly>
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Immovable Properties *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input  min="0" required placeholder="Amount" class="input-cust-name" type="number" name="immovable_prop" id="immovable_prop" oninput="maxLengthCheck(this)" onkeyup="immovable(); shortFall(this)" maxlength="10" value="<?php if(isset($form_data)){ echo $form_data->IMMOVABLE_PROP;}?>"readonly>
	  				</div> 
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Investments *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required min="0" placeholder="Amount" class="input-cust-name" type="number" name="other_invest" id="other_invest" oninput="maxLengthCheck(this)" onkeyup="other(); shortFall(this)" maxlength="10" value="<?php if(isset($form_data)){ echo $form_data->OTHER_INVESTMENTS;}?>"readonly>
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Insurance Policies *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" required placeholder="Amount" class="input-cust-name" type="number" name="insurance_poli" id="insurance_poli" oninput="maxLengthCheck(this)" onkeyup="insurance(); shortFall(this)" maxlength="10" value="<?php if(isset($form_data)){ echo $form_data->INSURANCE_POLICY;}?>"readonly>
	  				</div> 
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Do you want to transfer outstanding loan from another bank / financial institution  *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
						<input disabled style="margin-right: 5px;" type="radio" name="prop_outstand" value="Yes" >Yes
						<input  disabled checked="true" style="margin-left: 10px; margin-right: 5px;" type="radio" value="No" name="prop_outstand" >No				
	  				</div> 

					
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Have you short listed the property  *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled style="margin-right: 5px;" type="radio" name="prop_short_radio" value="Yes">Yes
						<input disabled style="margin-left: 10px; margin-right: 5px;" type="radio" name="prop_short_radio" value="No" checked="true">No				
	  				</div> 
				</div>
				</div>
			</div>
					
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us bit more about Property you want to buy  </span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="30" minlength="3" required style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LINE_1;?>"readonly>
  					<input maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 2 " class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LINE_2;?>"readonly>
  					<input maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 3 " class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LINE_3;?>"readonly>
  					<input hidden="true" class="input-cust-name" type="text" id="actual_loan_type" name="actual_loan_type" value="<?php echo $type;?>">
  				</div>  

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col" hidden>
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of years at this property *</span>
				</div>			
				<div class="w-100"></div>
  				
  				
                <div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Location *</span>
				</div>			
				<div class="w-100"></div>
  				<!--read only-->
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select required class="input-cust-name resi_prop_type" name="prop_location" disabled="true"> 
					  <option value="">Select Property Location *</option>
					  <option value="within corporation limit" <?php if(!empty($form_data))if ($form_data->PROP_LOCATION == 'within corporation limit') echo ' selected="selected"'; ?>>Within Corporation Limit</option>
					  <option value="outside corporation limit" <?php if(!empty($form_data))if ($form_data->PROP_LOCATION == 'outside corporation limit') echo ' selected="selected"'; ?>>Outside Corporation Limit</option>
					  
					</select>
  				</div>  						
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="30" required placeholder="Enter landmark *" class="input-cust-name" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LANDMARK;?>"readonly>
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Enter pincode *" class="input-cust-name" type="number" minlength="6" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_PINCODE;?>"readonly>


  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select required class="input-cust-name resi_prop_type" name="resi_sel_property_type" disabled="true"> 
					  <option value="">Select Property Type *</option>
					  <option value="Corporate Provided" <?php if(!empty($form_data))if ($form_data->PROP_ADD_PROP_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
					  <option value="Mortgaged" <?php if(!empty($form_data))if ($form_data->PROP_ADD_PROP_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
					  <option value="Owned" <?php if(!empty($form_data))if ($form_data->PROP_ADD_PROP_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
					  <option value="Rented" <?php if(!empty($form_data))if ($form_data->PROP_ADD_PROP_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
					  <option value="Shared Accomodation" <?php if(!empty($form_data))if ($form_data->PROP_ADD_PROP_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
					  <option value="Paying Guest" <?php if(!empty($form_data))if ($form_data->PROP_ADD_PROP_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
					  <option value="Others" <?php if(!empty($form_data))if ($form_data->PROP_ADD_PROP_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
					</select>
  				</div>  			  							  				
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" id="resi_state_view" placeholder="State" class="input-cust-name" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_STATE ;?>"readonly>
  					<input hidden="true" placeholder="State" class="input-cust-name" name="resi_state" id="resi_state" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_STATE ;?>"readonly>  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District" class="input-cust-name" id="resi_district_view" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_DISTRICT ;?>"readonly>
  					<input hidden="true" placeholder="District" class="input-cust-name" name="resi_district" id="resi_district" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_DISTRICT ;?>"readonly>
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="25" placeholder="City" class="input-cust-name" name="resi_city" id="resi_city" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_CITY ;?>"readonly>
  				</div>  			  				
			</div>							
			</div>
			</div>

			
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
	  					<select required class="input-cust-name" name="select_rate_option" disabled="true"> 
							  <option value="">Select Option *</option>
							  <option value="Fixed" <?php if(!empty($form_data))if ($form_data->RATE_OPTION == 'Fixed') echo ' selected="selected"'; ?>>Fixed</option>							  
							  <option value="Floating" <?php if(!empty($form_data))if ($form_data->RATE_OPTION == 'Floating') echo ' selected="selected"'; ?>>Floating</option>				
							  <option value="Others" <?php if(!empty($form_data))if ($form_data->RATE_OPTION == 'Others') echo ' selected="selected"'; ?>>Others</option>				
							</select>
	  				</div>  

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan Type *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select required class="input-cust-name" name="select_loan_type" disabled="true"> 
							  <option value="">Select Loan Type *</option>
							  <option value="Home Loans" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Home Loans ') echo ' selected="selected"'; ?>>Home Loans</option>			
							  <option value="Home Improvement Loans" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Home Improvement Loans') echo ' selected="selected"'; ?>>Home Improvement Loans</option>
                              <option value="House Construction On Self Own Plot" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'House Construction On Self Own Plot') echo ' selected="selected"'; ?>>House Construction On Self Own Plot</option>
							  <option value="Balance Transfer" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Balance Transfer') echo ' selected="selected"'; ?>>Balance Transfer</option>
                             	
                              <option value="Re-Finance" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Re-Finance') echo ' selected="selected"'; ?>>Re-Finance</option>								  
							  <option value="Plot Loans" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Plot Loans') echo ' selected="selected"'; ?>>Plot Loans</option>									  
							 
                              							  
							</select>
	  				</div>  

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Desired loan amount *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" required placeholder="Amount" class="input-cust-name" type="number" name="desired_loan_amount" id="desired_loan_amount" oninput="maxLengthCheck(this);" onkeyup="Loan_amount(); shortFall(this)" maxlength="15" value="<?php if(isset($form_data)){ echo $form_data->DESIRED_LOAN_AMOUNT; }?>"readonly>
	  				</div>  	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Tenure in Years *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="1" required placeholder="Enter year" class="input-cust-name" type="number" name="tenure_year" id="tenure_year" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(isset($form_data)){ echo $form_data->TENURE; }?>"readonly>
	  				</div> 

	  				<div class="w-100"></div>
                      

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan is to be Availed for *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select required class="input-cust-name" name="loan_availed_for" id="loan_availed_for" disabled="true"> 
							  <option value="">Select availed for *</option>
							  <option value="Property from Developer / Builder" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Property from Developer / Builder') echo ' selected="selected"'; ?>>Property from Developer / Builder</option>
							  <option value="Property from Development Authority" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Property from Development Authority') echo ' selected="selected"'; ?>>Property from Development Authority</option>
							  <option value="Resale/ Pre-owned Flat/ Rowhouse" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Resale/ Pre-owned Flat/ Rowhouse') echo ' selected="selected"'; ?>>Resale/ Pre-owned Flat/ Rowhouse</option>
							  <option value="Construction of Standalone House on a Plot" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Construction of Standalone House on a Plot') echo ' selected="selected"'; ?>>Construction of Standalone House on a Plot</option>
							  <option value="sister" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'sister') echo ' selected="selected"'; ?>>Resale/ Pre-owned Bungalow</option>							  
							  <option value="Others" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Others') echo ' selected="selected"'; ?>>Others</option>							  
							</select>
	  				</div> 

	  				<div class="w-100"></div>
	  				
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Area of Land (Sq ft) </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Area" class="input-cust-name" type="number" name="area_land" id="area_land" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(isset($form_data)){ echo $form_data->AREA_OF_LAND;}?>"readonly>
	  				</div> 
	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Carpet Area(Sqft)</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" placeholder="Carpet Area" class="input-cust-name" type="number" name="carpet_area" id="carpet_area" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(isset($form_data)){ echo $form_data->CARPET_AREA;}?>"readonly>
	  				</div> 

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Build up Area (Sqft)</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" placeholder="Build up Area" class="input-cust-name" type="number" name="buildup_area" id="buildup_area" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(isset($form_data)){ echo $form_data->BUILD_UP_AREA;}?>"readonly>
	  				</div> 

	  				<div class="w-100"></div>	  				
	  				
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Stage of Construction</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select required class="input-cust-name resi_prop_type" name="stage_of_const" disabled="true"> 
							<option value="">Stage of Construction *</option>
							
							<option value="Foundation" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Foundation') echo ' selected="selected"'; ?>>Foundation</option>
							
							<option value="Slab" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Slab') echo ' selected="selected"'; ?>>Slab</option>
							
							<option value="Concrete work" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Concrete work') echo ' selected="selected"'; ?>>Concrete work</option>
							
							<option value="Final" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Final') echo ' selected="selected"'; ?>>Final</option>
							
							<option value="Ready to move" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Ready to move') echo ' selected="selected"'; ?>>Ready to move</option>
							
							<option value="Fully Completed" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Fully Completed') echo ' selected="selected"'; ?>>Fully Completed</option>
							<option value="Partly completed" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Partly completed') echo ' selected="selected"'; ?>>Partly completed</option>
							<option value="Others" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Others') echo ' selected="selected"'; ?>>Others</option>
						</select>
	  				</div> 
				</div>

				<span style=" margin-bottom: 10px; margin-top: 25px; font-size: 15px; font-weight: bold;color: black; margin-left: 40px;">The loan approval shall remain subject to assessment of legal and technical checks. Such assessment is for internal reliance alone and doesnt create any right in favour of anyone including the borrower (s) in any manner whatsoever.</span>
				<input disabled style="margin-left: 40px; margin-top: 6px;" type="checkbox" id="is_agree" name="is_agree" value="Yes"><span style="font-size: 12px; margin-top: 5px; margin-left: 8px; color: black; font-weight: bold;">I / We Agree.</span>

			</div>


			<div class="row shadow bg-white rounded margin-10 padding-15">
				
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us about Bank Detail's</span>
					<div class="w-100"></div>					
				</div>

				
				<div id="bankLayout" style="margin-left: 35px;" class="col">
					
	  					<?php

	  						if(!empty($form_data->BANK_DETAILS_JSON)){
							$json = $form_data->BANK_DETAILS_JSON;

							$jsonData = json_decode($json);
							if($jsonData!=''){
								$data_array = $jsonData->banks;
								for ($i=0; $i < count($data_array); $i++) { ?>
										<div class="bank_wrapper">
				  						<fieldset id="bankS_row">
											<div class="bank_row" id="line_1">
										
												<input required placeholder="Bank Acc Name" class="other-income-select bank-acc-name" type="text" maxlength="20" oninput="maxLengthCheck(this)" name="bank_acc_name" style="width: 17%;"  value="<?php echo $data_array[$i]->bank_acc_name;?>"readonly>
										       	<select required style="width: 17%;" class="other-income-select bank-select-data" id="acc_type" name="acc_type[]" disabled="true">
										        	<option id='1_1' value="">Account Type</option>
										            <option id='2_1' <?php if ($data_array[$i]->acc_type == 'Current') echo ' selected="selected"'; ?>>Current</option>
										            <option id='3_1' <?php if ($data_array[$i]->acc_type == 'Saving') echo ' selected="selected"'; ?>>Saving</option>
										        </select>	
												<input required placeholder="Acc for no of years" class="other-income-select bank-acc-years" type="number" name="acc_years" style="width: 17%;"  maxlength="2" oninput="maxLengthCheck(this)" value="<?php echo $data_array[$i]->bank_acc_year;?>"readonly>
										        <input required placeholder="IFSC code" class="other-income-select bank-ifsc" type="text" name="ifsc_code" id="ifsc_code" style="width: 17%;" maxlength="11" oninput="maxLengthCheck(this)" onkeydown="upperCaseF(this)" pattern="^[A-Z]{4}0[A-Z0-9]{6}$" title="SBIN0125620" value="<?php echo $data_array[$i]->ifsc_code;?>"readonly>
										        <input required placeholder="Account Number" class="other-income-select bank-acc-no" type="number"  name="acc_no" style="width: 17%;" maxlength="16" min="0" oninput="maxLengthCheck(this)"  value="<?php echo $data_array[$i]->bank_acc_no;?>"readonly>
										        <input disabled class="bank_remove other-income-select" type="button" value="-" style="width: 8%; color: red;" >


										    </div>	
										</fieldset>
									</div>	
								<?php } 
								}
							} else { ?>
								<div class="bank_wrapper">
				  						<fieldset id="bankS_row">
											<div class="bank_row" id="line_1">
												<input required placeholder="Bank Acc Name" class="other-income-select bank-acc-name" type="text" maxlength="20" oninput="maxLengthCheck(this)" name="bank_acc_name" style="width: 17%;" >
										        <select required style="width: 17%;" class="other-income-select bank-select-data" id="acc_type" name="acc_type[]"disabled="true">
										        	<option id='1_1' value="">Account Type</option>
										            <option id='2_1'>Current</option>
										            <option id='3_1' >Saving</option>
										        </select>										        
										        <input required placeholder="Acc for no of years" class="other-income-select bank-acc-years" type="number" name="acc_years" style="width: 17%;"  maxlength="2" oninput="maxLengthCheck(this)"readonly>
										        <input required placeholder="IFSC code" class="other-income-select bank-ifsc" type="text" name="ifsc_code" id="ifsc_code" style="width: 17%;" maxlength="11" oninput="maxLengthCheck(this)" onkeydown="upperCaseF(this)" pattern="^[A-Z]{4}0[A-Z0-9]{6}$" title="SBIN0125620"readonly>
										        <input required placeholder="Account Number" class="other-income-select bank-acc-no" type="number"  name="acc_no" style="width: 17%;" maxlength="16" min="0" oninput="maxLengthCheck(this)" readonly>
										        <input disabled class="bank_remove other-income-select" type="button" value="-" style="width: 8%; color: red;"readonly >
										    </div>	
										</fieldset>
									</div>	
						<?php }?>	  	

						<div style="color: blue;" class="add-more" type="button" id="add_more_bank">Add More</div>
	  				</div> 
			</div>

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Loan Estination Breakdown</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Estimated Cost *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Amount" class="input-cust-name" type="number" name="estimate_req_fund" id="estimate_req_fund" oninput="shortFall(this)" maxlength="15" value="<?php if(isset($form_data)) { echo $form_data->FINAL_ESTIMATED_COST;}?>"readonly>
	  				</div>  
	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan Requested *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Amount" class="input-cust-name" type="number" name="requested_fund" id="requested_fund" oninput="shortFall(this)" maxlength="10" value="<?php if(isset($form_data)) { echo $form_data->FINAL_LOAN_REQUESTED;}?>"readonly>
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Savings from Bank </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Amount" class="input-cust-name" type="number" name="bank_saving" id="bank_saving" oninput="shortFall(this)" maxlength="10" value="<?php if(isset($form_data)) { echo $form_data->FINAL_SAVING_FROM_BANK;}?>"readonly>
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Immovable Properties </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Amount" class="input-cust-name" type="number" name="disposal_invest" id="disposal_invest" oninput="shortFall(this)" maxlength="10" value="<?php if(isset($form_data)) { echo $form_data->FINAL_DISPOSAL_INVESTMENT;}?>"readonly>
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Investments </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Amount" class="input-cust-name" type="number" name="sale_of_property" id="sale_of_property" oninput="shortFall(this)" maxlength="10" value="<?php if(isset($form_data)) { echo $form_data->FINAL_SALE_PROPERTY;}?>"readonly>
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Insurance Policies</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Amount" class="input-cust-name" type="number" name="family_amount" id="family_amount" oninput="shortFall(this)" maxlength="10" value="<?php if(isset($form_data)) { echo $form_data->FINAL_FAMILY;}?>"readonly>
	  				</div>  

	  				<div style="margin-top: 10px;" class="col" hidden>
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Provident Fund</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col" hidden>
	  					<input placeholder="Amount" class="input-cust-name" type="number" name="provident_fund" id="provident_fund" oninput="shortFall(this)" maxlength="10" value="<?php if(isset($form_data)) { echo $form_data->FINAL_PROVIDENT_FUND;}?>"readonly>
	  				</div>  

	  				<div style="margin-top: 10px;" class="col" >
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Others </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col" >
	  					<input placeholder="Amount" class="input-cust-name" type="number" name="others" id="others" oninput="shortFall(this)" maxlength="10" value="<?php if(isset($form_data)) { echo $form_data->FINAL_OTHERS;}?>"readonly>
	  				</div>  

	  				  
					  <div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:red; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: red; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Shortfall of Funds</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled="true" style="font-size: 12px; color: red; line-height: 30px; border-radius: 8px; border-style: solid; border-color: red; border-width: 1px; width: 100%; padding-left: 15px; margin-bottom: 10px;" value="0" type="number" name="shortfall" id="shortfall" oninput="maxLengthCheck(this)" maxlength="10"readonly >
                         <input hidden="true" value="0" type="number" name="shortfall_1" id="shortfall_1"readonly>
	  					
	  					
	  				</div>
	  				
				</div>

				<div class="row col-12" style="margin-top:20px;">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="background-color: #eaeaea; height: 40px; border-radius: 6px; text-align: center;">
						 <span style="line-height: 40px; text-align: center; vertical-align: middle;color: red; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Total requirement of Funds (INR): </span> <input disabled placeholder="0" id="left_total" style="background-color: #eaeaea;color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; margin-left: 10px;" />
					</div>

					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="background-color: #eaeaea; height: 40px; border-radius: 6px; text-align: center; margin-left: 40px;">
						<span style="line-height: 40px; text-align: center; vertical-align: middle;color: red; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Total sources of Funds (INR): </span> <input disabled placeholder="0" id="right_total" style="background-color: #eaeaea;color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; margin-left: 10px;" />
					</div>
				</div>

				
           
			</form>
            <?php } ?>	
<script>
$('#ifsc_code').on('input', function(e) {
   this.setCustomValidity('')
     // e.target.checkValidity()
     this.reportValidity();
   })
 function Loan_amount()
{
   var Loan_amount = document.getElementById('desired_loan_amount').value;
   document.getElementById('requested_fund').value=Loan_amount;
}
function savings()
{
   var savings_in_bank = document.getElementById('savings_in_bank').value;
   document.getElementById('bank_saving').value=savings_in_bank;
}
function immovable()
{
   var immovable_prop = document.getElementById('immovable_prop').value;
   document.getElementById('disposal_invest').value=immovable_prop;
}
function other()
{
   var other_invest = document.getElementById('other_invest').value;
   document.getElementById('sale_of_property').value=other_invest;
}

function insurance()
{
   var insurance_poli = document.getElementById('insurance_poli').value;
   document.getElementById('family_amount').value=insurance_poli;
}
</script>
		</div>		
	</div>
	
	
    <!---------------lap--------------- -->

    <?php  if($type == 'lap') { ?>	


        
        <div class="w-100"></div>
        <?php if(!empty($isProfileFull))if($isProfileFull == 'true') { ?>
            <span style="font-size: 12px;">For LAP loan process we require co-applicant details</span>
        <?php } else if($coapplicant == 'true'){?>
            <span style="font-size: 12px; color: red;">Looks like your CO-Applicant profile is not complete, please edit any Co-Applicant profile and complete it for loan apply. </span>
        <?php }?>
    </div>					

    <div class="w-100"></div>

    <?php if(!empty($coapplicant))if($coapplicant == 'true') { ?>					
        <div class="row justify-content-center col-12">
            <div class="row shadow" style="text-align: center; border-radius: 10px; margin-top: 15px; background-color: white; padding-top: 10px; padding-bottom: 10px; padding-left: 5px; padding-right: 5px;">
                
                <?php for ($i=0; $i < count($co_app); $i++) { ?>
                        <div  style="text-align: center; border-radius: 10px; margin: 4px;">									
                        <span style="font-size: 12px; background-color: #77cdf4; padding: 10px; border-radius: 10px; color: white;">
                            <?php echo $co_app[$i]->FN." ".$co_app[$i]->LN ?>
                            <a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2"><i style="margin-left: 10px; font-size:18px;color:white;" class="far fa-eye"></i></a>

                            <a href="<?php echo base_url()?>index.php/customer/coapplicant_new_screen_one?COAPPID=<?php echo $co_app[$i]->UNIQUE_CODE;?>"><i style=" margin-left: 15px; font-size:15px;color:white;" class="fas fa-pen"></i></a>
                        </span>
                    </div>

                <?php } ?>
                                                                        
                <div  style="text-align: center; border-radius: 10px; margin: 4px;">									
                    <span style="font-size: 12px; background-color: #1c85b2; padding: 10px; border-radius: 10px; color: white;">
                        Add new co-applicant
                        
                        <a href="<?php echo base_url()?>index.php/customer/coapplicant_new_screen_one"><i style=" margin-left: 15px; font-size:15px;color:white;" class="fa fa-user-plus"></i></a>
                    </span>
                </div>
            </div>						
        </div>	

        <?php if($isProfileFull == 'false')return;?>
    <?php } else { ?>
        <div class="row justify-content-center col-12">
            <div class="shadow" style="text-align: center; width: 250px; border-radius: 10px; padding: 10px; background-color: white; margin-top: 20px;">
                <span style="font-size: 12px;">No co-applicant found</span>							
            </div>
            <div class="w-100"></div>
            <a href="<?php echo base_url()?>index.php/customer/coapplicant_new_screen_one">
                <div  style="text-align: center; width: 250px; border-radius: 10px; padding: 10px;  margin-top: 20px;">
                    
                    <span style="font-size: 12px; background-color: #1c85b2; padding: 10px; border-radius: 10px; color: white;">Add new co-applicant</span>
                </div>
            </a>
        </div>	
    <?php return;} ?>
</div>	

<form method="POST" action="<?php echo base_url(); ?>index.php/customer/apply_loan_screen_lap_loan_action?UID=<?php if(!empty($id)){echo $id;} ?>" id="apply_loan_screen_2_lap">
    

<div class="row shadow bg-white rounded margin-10 padding-15">
    <div class="row justify-content-center col-12">
        <span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us bit more about your Property Location</span>

    </div>	
    
    <div class="w-100"></div>

    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
    
      <div style="margin-top: 0px;" class="col">
        <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address *</span>
    </div>			
    <div class="w-100"></div>
      
    <div style="margin-left: 35px; margin-top: 8px;" class="col">
          <input disabled maxlength="30" minlength="3" required style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_LINE_1;?>">
          <input disabled maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 2" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_LINE_2;?>">
          <input  disabled maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 3" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_LINE_3;?>">
          <input disabled hidden="true" class="input-cust-name" type="text" id="actual_loan_type" name="actual_loan_type" value="<?php echo $type;?>"readonly>
      </div>  


      <div class="w-100"></div>

      <div style="margin-top: 10px;" class="col">
        <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of years of ownership *</span>
    </div>			
    <div class="w-100"></div>
      
      <div style="margin-left: 35px; margin-top: 8px;" class="col">
          <input required placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_NO_YEARS;?>"readonly>
      </div>			  				
</div>

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
    
      <div style="margin-top: 0px;" class="col">
        <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
    </div>			
    <div class="w-100"></div>
      
      <div style="margin-left: 35px; margin-top: 8px;" class="col">
          <input disabled maxlength="30" minlength="3" required placeholder="Enter landmark *" class="input-cust-name" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_LANDMARK;?>">
      </div>  			  				

      <div class="w-100"></div>

      <div style="margin-top: 10px;" class="col">
        <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode *</span>
    </div>			
    <div class="w-100"></div>
      
      <div style="margin-left: 35px; margin-top: 8px;" class="col">
          <input disabled required placeholder="Enter pincode *" class="input-cust-name" type="number" minlength="6" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_PINCODE;?>">
      </div>  
      <div class="w-100"></div>

      <div style="margin-top: 10px;" class="col">
        <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Type *</span>
    </div>			
    <div class="w-100"></div>
      
      <div style="margin-left: 35px; margin-top: 8px;" class="col">
        <select required class="input-cust-name resi_prop_type" name="resi_sel_property_type" disabled="true"> 
          <option value="">Select Property Type *</option>
          <option value="Corporate Provided" <?php if(!empty($row_more))if ($row_more->PROP_ADD_PROP_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
          <option value="Mortgaged" <?php if(!empty($row_more))if ($row_more->PROP_ADD_PROP_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
          <option value="Owned" <?php if(!empty($row_more))if ($row_more->PROP_ADD_PROP_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
          <option value="Rented" <?php if(!empty($row_more))if ($row_more->PROP_ADD_PROP_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
          <option value="Shared Accomodation" <?php if(!empty($row_more))if ($row_more->PROP_ADD_PROP_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
          <option value="Paying Guest" <?php if(!empty($row_more))if ($row_more->PROP_ADD_PROP_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
          <option value="Others" <?php if(!empty($row_more))if ($row_more->PROP_ADD_PROP_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
        </select>
      </div>  			  							  				
</div>

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
    
      <div style="margin-top: 0px;" class="col">
        <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">State *</span>
    </div>			
    <div class="w-100"></div>
      
      <div style="margin-left: 35px; margin-top: 8px;" class="col">
          <input disabled="true" id="resi_state_view" placeholder="State" class="input-cust-name" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_STATE ;?>"readonly>
          <input hidden="true" placeholder="State" class="input-cust-name" name="resi_state" id="resi_state" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_STATE ;?>"readonly>  					
      </div>  			  				

      <div class="w-100"></div>

      <div style="margin-top: 10px;" class="col">
        <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
    </div>			
    <div class="w-100"></div>
      
      <div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
          <input disabled="true" placeholder="District" class="input-cust-name" id="resi_district_view" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_DISTRICT ;?>"readonly>
          <input hidden="true" placeholder="District" class="input-cust-name" name="resi_district" id="resi_district" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_DISTRICT ;?>"readonly>
      </div>  			  				

      <div class="w-100"></div>

      <div style="margin-top: 10px;" class="col">
        <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City</span>
    </div>			
    <div class="w-100"></div>
      
      <div style="margin-left: 35px; margin-top: 8px;" class="col">
          <input disabled maxlength="30" minlength="3" placeholder="City" class="input-cust-name" name="resi_city" id="resi_city" value="<?php if(!empty($row_more))echo $row_more->PROP_ADD_CITY ;?>">
      </div>  			  				
</div>							
</div>
</div>

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
              <select required class="input-cust-name" name="select_rate_option" disabled="true"> 
                  <option value="">Select Option *</option>
                  <option value="Fixed" <?php if(!empty($row_more))if ($row_more->RATE_OPTION == 'Fixed') echo ' selected="selected"'; ?>>Fixed</option>							  
                  <option value="Floating" <?php if(!empty($row_more))if ($row_more->RATE_OPTION == 'Floating') echo ' selected="selected"'; ?>>Floating</option>							  
                  <option value="Others" <?php if(!empty($row_more))if ($row_more->RATE_OPTION == 'Others') echo ' selected="selected"'; ?>>Others</option>							  
                </select>
          </div>  

          <div class="w-100"></div>

          <div style="margin-top: 10px;" class="col">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan Type *</span>
        </div>			
    
          <div style="margin-left: 35px; margin-top: 8px;" class="col">
              <select required class="input-cust-name" name="select_loan_type" disabled="true"> 
                  <option value="">Select Loan Type *</option>
                  <option value="Loan against residential property" <?php if(!empty($row_more))if ($row_more->HOME_LOAN_TYPE == 'Loan against residential property') echo ' selected="selected"'; ?>>Loan against residential property</option>			
                  <option value="Loan against commercial property" <?php if(!empty($row_more))if ($row_more->HOME_LOAN_TYPE == 'Loan against commercial property') echo ' selected="selected"'; ?>>Loan against commercial property</option>							  
                                            
                </select>
          </div>  

          <div class="w-100"></div>

          <div style="margin-top: 10px;" class="col">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Desired loan amount *</span>
        </div>			
    
          <div style="margin-left: 35px; margin-top: 8px;" class="col">
              <input required placeholder="Amount" class="input-cust-name" type="number" name="desired_loan_amount" id="desired_loan_amount" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(!empty($row_more))echo $row_more->DESIRED_LOAN_AMOUNT ;?>"readonly>
          </div>  	  				
    </div>

    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div style="margin-top: 10px;" class="col">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Tenure in Years *</span>
        </div>			
    
          <div style="margin-left: 35px; margin-top: 8px;" class="col">
              <input required placeholder="Enter year" class="input-cust-name" type="number" name="tenure_year" id="tenure_year" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->TENURE ;?>"readonly>
          </div> 

          <div class="w-100"></div>

          <div style="margin-top: 10px;" class="col">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan is to be Availed for *</span>
        </div>			
    
          <div style="margin-left: 35px; margin-top: 8px;" class="col">
              <select required class="input-cust-name" name="loan_availed_for" id="loan_availed_for" disabled="true"> 
                  <option value="">Select availed for *</option>
                  <option value="Property from Developer / Builder" <?php if(!empty($row_more))if ($row_more->LOAN_AVAILED_FOR == 'Property from Developer / Builder') echo ' selected="selected"'; ?>>Property from Developer / Builder</option>
                  <option value="Property from Development Authority" <?php if(!empty($row_more))if ($row_more>LOAN_AVAILED_FOR == 'Property from Development Authority') echo ' selected="selected"'; ?>>Property from Development Authority</option>
                  <option value="Resale/ Pre-owned Flat/ Rowhouse" <?php if(!empty($row_more))if ($row_more->LOAN_AVAILED_FOR == 'Resale/ Pre-owned Flat/ Rowhouse') echo ' selected="selected"'; ?>>Resale/ Pre-owned Flat/ Rowhouse</option>
                  <option value="Construction of Standalone House on a Plot" <?php if(!empty($row_more))if ($row_more->LOAN_AVAILED_FOR == 'Construction of Standalone House on a Plot') echo ' selected="selected"'; ?>>Construction of Standalone House on a Plot</option>
                  <option value="Resale/ Pre-owned Bungalow" <?php if(!empty($row_more))if ($row_more->LOAN_AVAILED_FOR == 'Resale/ Pre-owned Bungalow') echo ' selected="selected"'; ?>>Resale/ Pre-owned Bungalow</option>							  
                  <option value="Others" <?php if(!empty($row_more))if ($row_more->LOAN_AVAILED_FOR == 'Others') echo ' selected="selected"'; ?>>Others</option>							  
                </select>
          </div> 

          <div class="w-100"></div>
          
          <div style="margin-top: 10px;" class="col">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Open Area (Sq ft) </span>
        </div>			
    
          <div style="margin-left: 35px; margin-top: 8px;" class="col">
              <input required placeholder="Area" class="input-cust-name" type="number" name="area_land" id="area_land" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(!empty($row_more))echo $row_more->AREA_OF_LAND ;?>"readonly>
          </div> 
          
    </div>

    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div style="margin-top: 10px;" class="col">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Carpet Area (Sq ft) </span>
        </div>			
    
          <div style="margin-left: 35px; margin-top: 8px;" class="col">
              <input required placeholder="Area" class="input-cust-name" type="number" name="carpet_area" id="carpet_area" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(!empty($row_more))echo $row_more->CARPET_AREA ;?>"readonly>
          </div> 

          <div class="w-100"></div>

          <div style="margin-top: 10px;" class="col">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Build up Area (Sq ft) </span>
        </div>			
    
          <div style="margin-left: 35px; margin-top: 8px;" class="col">
              <input required placeholder="Area" class="input-cust-name" type="number" name="buildup_area" id="buildup_area" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(!empty($row_more))echo $row_more->BUILD_UP_AREA ;?>"readonly>
          </div> 

          <div class="w-100"></div>

          <div style="margin-top: 10px;" class="col">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Reason for Loan *</span>
        </div>			
    
          <div style="margin-left: 35px; margin-top: 8px;" class="col">
              <select required class="input-cust-name" name="visit_reason" id="visit_reason" disabled="true"> 
                  <option value="">Select Reason *</option>
                  <option value="Medical" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Medical') echo ' selected="selected"'; ?>>Medical</option>
                  <option value="House Owner (Home Renovation)" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'House Owner (Home Renovation)') echo ' selected="selected"'; ?>>House Owner (Home Renovation)</option>
                  <option value="Personal (Others)" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Personal (Others)') echo ' selected="selected"'; ?>>Personal (Others)</option>
                  <option value="Holiday" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Holiday') echo ' selected="selected"'; ?>>Holiday</option>
                  <option value="Advance Salary" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Advance Salary') echo ' selected="selected"'; ?>>Advance Salary</option>
                  <option value="Rental Deposit" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Rental Deposit') echo ' selected="selected"'; ?>>Rental Deposit</option>
                  <option value="Wedding" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Wedding') echo ' selected="selected"'; ?>>Wedding</option>
                  <option value="Credit Card Takeover" <?php if(!empty($row))if ($row_more->REASON_FOR_VISIT == 'Credit Card Takeover') echo ' selected="selected"'; ?>>Credit Card Takeover</option>					  
                  <option value="Others" <?php if(!empty($row_more))if ($row_more->REASON_FOR_VISIT == 'Others') echo ' selected="selected"'; ?>>Others</option>
                </select>
          </div> 
        
    </div>

    <span style=" margin-bottom: 10px; margin-top: 25px; font-size: 15px; font-weight: bold;color: black; margin-left: 40px;">The loan approval shall remain subject to assessment of legal and technical checks. Such assessment is for internal reliance alone and doesnt create any right in favour of anyone including the borrower (s) in any manner whatsoever.</span>
    <input style="margin-left: 40px; margin-top: 6px;" type="checkbox" id="is_agree" name="is_agree" value="Yes"><span style="font-size: 12px; margin-top: 5px; margin-left: 8px; color: black; font-weight: bold;"readonly>I / We Agree.</span>

</div>

<div class="row shadow bg-white rounded margin-10 padding-15">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        
          <div style="margin-top: 10px;" class="col">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Are you Sole Owner of Property *</span>
        </div>			
        <div class="w-100"></div>
          
          <div style="margin-left: 35px; margin-top: 8px;" class="col">
              <input checked="true" style="margin-right: 5px;" type="radio" name="sole_owner" value="Yes" <?php if(!empty($row_more))if($row_more->IS_SOLE_OWNER=='Yes'){ echo 'checked';} ?>readonly>Yes
            <input style="margin-left: 10px; margin-right: 5px;" type="radio" name="sole_owner" value="No" <?php if(!empty($row_more))if($row_more->IS_SOLE_OWNER=='No'){ echo 'checked';} ?>readonly>No				
          </div> 

          <div class="w-100"></div>
          
          <div style="margin-top: 10px;" class="col">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">what is your share (%) in property *</span>
        </div>			
        <div class="w-100"></div>
          
          <div style="margin-left: 35px; margin-top: 8px;" class="col">
              <input placeholder="Enter share percentage" class="input-cust-name" type="number" name="share_prop" id="share_prop" oninput="maxLengthCheck(this)" maxlength="3" value="<?php if(!empty($row_more))echo $row_more->SHARE_IN_PROP ;?>"readonly>
          </div> 
    </div>

    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        
        <div style="margin-top: 10px;" class="col">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Will bank be able to obtain sole ownership of the property *</span>
        </div>			
        <div class="w-100"></div>
          
          <div style="margin-left: 35px; margin-top: 8px;" class="col">
              <input style="margin-right: 5px;" type="radio" name="sole_owner_able" value="Yes" <?php if(!empty($row_more))if($row_more->IS_BANK_OBTAIN_SOLE=='Yes'){ echo 'checked';} ?>readonly>Yes
            <input style="margin-left: 10px; margin-right: 5px;" type="radio" name="sole_owner_able" value="No" checked="true" <?php if(!empty($row_more))if($row_more->IS_BANK_OBTAIN_SOLE=='Yes'){ echo 'checked';} ?>readonly>No				
          </div> 

          <div class="w-100"></div>

          <div style="margin-top: 10px;" class="col">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Is legal title of the property clear *</span>
        </div>			
        <div class="w-100"></div>
          
          <div style="margin-left: 35px; margin-top: 8px;" class="col">
              <input style="margin-right: 5px;" type="radio" name="legal_title" value="Yes" <?php if(!empty($row_more))if($row_more->IS_LEGAL_TITLE_CLEAR=='Yes'){ echo 'checked';} ?>readonly>Yes
            <input style="margin-left: 10px; margin-right: 5px;" type="radio" name="legal_title" value="No" <?php if(!empty($row_more))if($row_more->IS_LEGAL_TITLE_CLEAR=='Yes'){ echo 'checked';} ?> checked="true"readonly>No				
          </div> 

          
      </div>

      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
          <div style="margin-top: 10px;" class="col">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Do you have any loan on property *</span>
        </div>			
        <div class="w-100"></div>
          
          <div style="margin-left: 35px; margin-top: 8px;" class="col">
              <input checked="true" style="margin-right: 5px;" type="radio" name="loan_on_property" value="Yes" <?php if(!empty($row_more))if($row_more->IS_LOAN_ON_PROP=='Yes'){ echo 'checked';} ?>readonly>Yes
            <input style="margin-left: 10px; margin-right: 5px;" type="radio" name="loan_on_property" value="No" <?php if(!empty($row_more))if($row_more->IS_LOAN_ON_PROP=='Yes'){ echo 'checked';} ?>readonly>No				
          </div> 

          <div class="w-100"></div>
          
          <div style="margin-top: 10px;" class="col">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">How many properties do you own *</span>
        </div>			
        <div class="w-100"></div>
          
          <div style="margin-left: 35px; margin-top: 8px;" class="col">
              <input placeholder="Enter property count" class="input-cust-name" type="number" name="no_of_property" id="no_of_property" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->HOW_MANY_PROP_OWN ;?>"readonly>
          </div> 
      </div>
</div>

<div class="row shadow bg-white rounded margin-10 padding-15" id="bank_layout">
    
    <div class="row justify-content-center col-12">
        <span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us about Existing Loan's</span>
        <div class="w-100"></div>					
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
                                    <select style="width: 17%;" class="other-income-select emis-select-data" id="emis" name="emi[]" disabled="true">
                                        <option id='1_1' value="">Select Loan Type</option>
                                        <option id='2_1' value="Personal Loan" <?php if ($data_array[$i]->title == 'Personal Loan') echo ' selected="selected"'; ?>>Personal Loan</option>
                                        <option id='3_1' value="Business Loan" <?php if ($data_array[$i]->title == 'Business Loan') echo ' selected="selected"'; ?>>Business Loan</option>
                                        <option id='4_1' value="Home Loan" <?php if ($data_array[$i]->title == 'Home Loan') echo ' selected="selected"'; ?>>Home Loan</option>
                                        <option id='5_1' value="Plot Loan" <?php if ($data_array[$i]->title == 'Plot Loan') echo ' selected="selected"'; ?>>Plot Loan</option>
                                        <option id='6_1' value="Car Loan" <?php if ($data_array[$i]->title == 'Car Loan') echo ' selected="selected"'; ?>>Car Loan</option>
                                        <option id='7_1' value="Other" <?php if ($data_array[$i]->title == 'Other') echo ' selected="selected"'; ?>>Other</option>
                                    </select>
                                    <input placeholder="Loan Amount" class="other-income-select emis-loan-data" type="number" name="emis_loan_amount" style="width: 17%;" value="<?php echo $data_array[$i]->loan_amount;?>" oninput="maxLengthCheck(this)" maxlength="10"readonly>
                                    <input placeholder="Outstanding Loan" class="other-income-select emis-outstanding-data" type="number" name="emis_outstanding_amount" style="width: 17%;" value="<?php echo $data_array[$i]->outstanding_amount;?>" oninput="maxLengthCheck(this)" maxlength="10"readonly>
                                    <input placeholder="EMI" class="other-income-select emis-emi-data" type="number" name="emis_emi_amount" style="width: 17%;" value="<?php echo $data_array[$i]->emi_amount;?>" oninput="maxLengthCheck(this)" maxlength="10"readonly>
                                    <input placeholder="Balance Ferm" class="other-income-select emis-bal_from-data" type="number" name="emis_bal_from_amount" style="width: 17%;" value="<?php echo $data_array[$i]->bal_from_amount;?>" oninput="maxLengthCheck(this)" maxlength="10"readonly>
                                    <input class="emis_remove other-income-select" type="button" value="-" style="width: 8%; color: red;" readonly>
                                </div>	
                            </fieldset>
                        </div>	
                    <?php } 
                    }
                } else { ?>
                <div class="bl_wrapper">
                          <fieldset >
                            <div class="bl_row">
                                <input disabled class="other-income-select-heading " type="text" style="width: 17%;" value="Bank Name"readonly>
                                <input disabled class="other-income-select-heading " type="text" style="width: 17%;" value="Loan Amount"readonly>
                                <input disabled class="other-income-select-heading " type="text" style="width: 17%;" value="Loan End Date"readonly>
                                <input disabled class="other-income-select-heading" type="text"  style="width: 17%;" value="Loan EMI"readonly>		        
                                <input disabled class="other-income-select-heading" type="text" value="DELETE" style="width: 8%; color: red;" readonly>
                            </div>	
                        </fieldset>
                    </div>	
                    <div class="bl_wrapper">
                          <fieldset id="blS_row">
                            <div class="bl_row" id="line_1">
                                <select style="width: 17%;" class="other-income-select bank-name" id="bl" name="bl[]"disabled="true">
                                    <option id='1_1' value="">Select Bank</option>
                                    <option id='2_1'>State Bank of India</option>
                                    <option id='3_1' >Axis Bank</option>
                                    <option id='4_1' >HDFC Bank</option>
                                    <option id='5_1' >ICICI Bank</option>
                                    <option id='6_1' >Bank of Baroda</option>
                                    <option id='7_1' >Union Bank of India</option>
                                    <option id='8_1' >IDBI Bank</option>
                                    <option id='9_1' >Canara Bank</option>
                                    <option id='10_1' >Punjab National Bank</option>
                                    <option id='11_1' >UCO Bank</option>
                                    <option id='12_1' >Other</option>
                                </select>
                                <input placeholder="Loan Amount" class="other-income-select bank-loan-amount" type="number" name="emis_loan_amount" style="width: 17%;" oninput="maxLengthCheck(this)" maxlength="10"readonly>
                                <!--<input placeholder="Loan End Date" class="other-income-select loan-end-date" type="date" name="loan_end_date" style="width: 17%;" oninput="maxLengthCheck(this)" maxlength="10">--->
                                 <input  placeholder="Loan End Date" class="other-income-select loan-end-date" type="text" name="loan_end_date" id="loan_end_date" style="width: 17%;"readonly>
                                <input placeholder="EMI" class="other-income-select bank-emi-data" type="number" name="bank_emi_data" style="width: 17%;" oninput="maxLengthCheck(this)" maxlength="10"readonly>										        
                                <input disabled class="bl_remove other-income-select" type="button" value="-" style="width: 8%; color: red;" readonly>
                            </div>	
                        </fieldset>
                    </div>								
            <?php }?>	  	

            <div style="color: blue;" class="add-more" type="button" id="add_more_bl">Add More</div>
          </div> 
</div>


    	
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
<?php } ?>		
</div>		
</div>

<!-----------------------------------personal------------------------------------->
<?php  if($type == 'personal') { ?>	
			

			<form method="POST" action="<?php echo base_url(); ?>index.php/customer/apply_loan_screen_busi_per_cc_loan_action?UID=<?php if(!empty($id)){ echo $id; } ?>" id="apply_loan_screen_3_busi_per_cc">
				

			

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Loan Details</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">					

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Desired loan amount *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Amount" class="input-cust-name" type="number" name="desired_loan_amount" id="desired_loan_amount" oninput="maxLengthCheck(this)" maxlength="15"readonly>
	  					<input hidden="true" class="input-cust-name" type="text" id="actual_loan_type" name="actual_loan_type" value="<?php echo $type;?>"readonly>
	  				</div>  	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Tenure in Years *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Enter year" class="input-cust-name" type="number" name="tenure_year" id="tenure_year" oninput="maxLengthCheck(this)" maxlength="2"readonly>
	  				</div> 	  				
	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">					

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Reason for Loan *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select required class="input-cust-name" name="visit_reason" id="visit_reason" disabled="true"> 
							  <option value="">Select Reason *</option>
							  <option value="Medical" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Medical') echo ' selected="selected"'; ?>>Medical</option>
							  <option value="House Owner (Home Renovation)" <?php if(!empty($row))if ($row->REF_2_RELATION == 'House Owner (Home Renovation)') echo ' selected="selected"'; ?>>House Owner (Home Renovation)</option>
							  <option value="Personal (Others)" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Personal (Others)') echo ' selected="selected"'; ?>>Personal (Others)</option>
							  <option value="Holiday" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Holiday') echo ' selected="selected"'; ?>>Holiday</option>
							  <option value="Advance Salary" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Advance Salary') echo ' selected="selected"'; ?>>Advance Salary</option>
							  <option value="Rental Deposit" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Rental Deposit') echo ' selected="selected"'; ?>>Rental Deposit</option>
							  <option value="Wedding" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Wedding') echo ' selected="selected"'; ?>>Wedding</option>
							  <option value="Credit Card Takeover" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Credit Card Takeover') echo ' selected="selected"'; ?>>Credit Card Takeover</option>					  
							  <option value="Others" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Others') echo ' selected="selected"'; ?>>Others</option>					  
							</select>
	  				</div> 
					
					
				</div>

				<span style=" margin-bottom: 10px; margin-top: 25px; font-size: 15px; font-weight: bold;color: black; margin-left: 40px;">The loan approval shall remain subject to assessment of legal and technical checks. Such assessment is for internal reliance alone and doesnt create any right in favour of anyone including the borrower (s) in any manner whatsoever.</span>
				<input style="margin-left: 40px; margin-top: 6px;" type="checkbox" id="is_agree" name="is_agree" value="Yes"><span style="font-size: 12px; margin-top: 5px; margin-left: 8px; color: black; font-weight: bold;"readonly>I / We Agree.</span>

			</div>

					
			</div>

			</form>
		

		

<!---------------------------------business-------------------------------------->

<?php if($type == 'business') { ?>	
			

			<form method="POST" action="<?php echo base_url(); ?>index.php/customer/apply_loan_screen_busi_per_cc_loan_action?UID=<?php if(!empty($id)){ echo $id; } ?>" id="apply_loan_screen_3_busi_per_cc">
				

			

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Loan Details</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">					

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Desired loan amount *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Amount" class="input-cust-name" type="number" name="desired_loan_amount" id="desired_loan_amount" oninput="maxLengthCheck(this)" maxlength="15"readonly>
	  					<input hidden="true" class="input-cust-name" type="text" id="actual_loan_type" name="actual_loan_type" value="<?php echo $type;?>"readonly>
	  				</div>  	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Tenure in Years *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Enter year" class="input-cust-name" type="number" name="tenure_year" id="tenure_year" oninput="maxLengthCheck(this)" maxlength="2"readonly>
	  				</div> 	  				
	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">					

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Reason for Loan *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select required class="input-cust-name" name="visit_reason" id="visit_reason" disabled="true"> 
							  <option value="">Select Reason *</option>
							  <option value="Expand/enhance infrastructure" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Expand/enhance infrastructure') echo ' selected="selected"'; ?>>Expand/enhance infrastructure</option>
							  <option value="Hire staff/Grow team" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Hire staff/Grow team') echo ' selected="selected"'; ?>>Hire staff/Grow team</option>
							  <option value="Marketing and advertising expenses" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Marketing and advertising expenses') echo ' selected="selected"'; ?>>Marketing and advertising expenses</option>
							  <option value="Pay other business expenses" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Pay other business expenses') echo ' selected="selected"'; ?>>Pay other business expenses</option>
							  <option value="Pay invoices" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Pay invoices') echo ' selected="selected"'; ?>>Pay invoices</option>
							  <option value="Payback past loan(s)" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Payback past loan(s)') echo ' selected="selected"'; ?>>Payback past loan(s)</option>
							  <option value="Purchase inventory/raw materials" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Purchase inventory/raw materials') echo ' selected="selected"'; ?>>Purchase inventory/raw materials</option>
							  <option value="Purchase equipment/machinery" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Purchase equipment/machinery') echo ' selected="selected"'; ?>>Purchase equipment/machinery</option>			
							  <option value="Others" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Others') echo ' selected="selected"'; ?>>Others</option>					  
							</select>
	  				</div> 
					
					
				</div>

				<span style=" margin-bottom: 10px; margin-top: 25px; font-size: 15px; font-weight: bold;color: black; margin-left: 40px;">The loan approval shall remain subject to assessment of legal and technical checks. Such assessment is for internal reliance alone and doesnt create any right in favour of anyone including the borrower (s) in any manner whatsoever.</span>
				<input style="margin-left: 40px; margin-top: 6px;" type="checkbox" id="is_agree" name="is_agree" value="Yes"><span style="font-size: 12px; margin-top: 5px; margin-left: 8px; color: black; font-weight: bold;"readonly>I / We Agree.</span>

			</div>

				

			</form>
		<?php } ?>	
		</div>		
	</div>
    <!---------------------------------------credit--------------------------> 
    <?php } else if($type == 'credit') { ?>		
			<form method="POST" action="<?php echo base_url(); ?>index.php/customer/apply_loan_screen_busi_per_cc_loan_action?UID=<?php if(!empty($id)){ echo $id; } ?>" id="apply_loan_screen_3_busi_per_cc">
				<div class="row shadow bg-white rounded margin-10 padding-15" id="bank_layout">
					<div class="row justify-content-center col-12">
						<span style="text-align: center; margin-bottom: 10px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us about Bank, where you want Credit Card</span>				
				</div>

				<input hidden="true" class="input-cust-name" type="text" id="actual_loan_type" name="actual_loan_type" value="<?php echo $type;?>"readonly>

				<div class="row justify-content-center col-12">
					<select required style="width: 17%;" class="other-income-select bank-name" id="bl" name="bank_name" disabled="true">
			        	<option id='1_1' value="">Select Bank</option>
			            <option id='2_1'>State Bank of India</option>
			            <option id='3_1' >Axis Bank</option>
			            <option id='4_1' >HDFC Bank</option>
			            <option id='5_1' >ICICI Bank</option>
			            <option id='6_1' >Bank of Baroda</option>
			            <option id='7_1' >Union Bank of India</option>
			            <option id='8_1' >IDBI Bank</option>
			            <option id='9_1' >Canara Bank</option>
			            <option id='10_1' >Punjab National Bank</option>
			            <option id='11_1' >UCO Bank</option>
			            <option id='12_1' >Other</option>
			        </select>
				</div>	

				<span style=" margin-bottom: 10px; margin-top: 25px; font-size: 15px; font-weight: bold;color: black; margin-left: 40px;">The loan approval shall remain subject to assessment of legal and technical checks. Such assessment is for internal reliance alone and doesnt create any right in favour of anyone including the borrower (s) in any manner whatsoever.</span>
				<input style="margin-left: 40px; margin-top: 6px;" type="checkbox" id="is_agree" name="is_agree" value="Yes"><span style="font-size: 12px; margin-top: 5px; margin-left: 8px; color: black; font-weight: bold;"readonly>I / We Agree.</span>			

				
			</form>
		<?php }?>



    

			
