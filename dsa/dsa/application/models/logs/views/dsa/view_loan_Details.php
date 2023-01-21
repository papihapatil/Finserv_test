

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


<div >
        <div class="container">
			
            <div class="row">
            	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
			  
					<div style=" margin-top: 8px;" class="col">
					  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Applicant Name :</label>
	  					<input  class="form-control" disabled="true" min="0" required placeholder="<?php echo $Applicant_row->FN." ".$Applicant_row->LN;  ?>"  value="">
					</div>  

                </div>  
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div style=" margin-top: 8px;" class="col">
					  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Applied For:</label>
	  					<input  class="form-control" disabled="true" min="0" required placeholder="<?php if(!empty($form_data)) echo $form_data->LOAN_TYPE."  Loan";  else echo "Not Applied for any loan ." ?>"  value="">
					</div>  
                </div>     
        
            </div>
			<div class="row">
            	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
			  
					<div style=" margin-top: 8px;" class="col">
					  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Credit Score  :</label>
	  					<input  class="form-control" disabled="true" min="0" required placeholder="<?php if(!empty($form_data)) echo $score;  else echo "Score not found ." ?>"  value="">
					</div>  

                </div>  
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div style=" margin-top: 8px;" class="col">
					  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Application Date :</label>
	  					<input  class="form-control" disabled="true" min="0" required placeholder="<?php if(!empty($form_data)) echo $form_data->CREATED_AT;  else echo "Not Applied for any loan ." ?>"  value="">
					</div>  
                </div>     
        
            </div>
		


<?php if(!empty($form_data)) 
{
	if($form_data->LOAN_TYPE=="home") //============================home loan
	{
?>
<div class="row justify-content-center">

				
				</div>
			</div>
			<div class="row bg-white rounded margin-10 padding-15">
			<div class="row col-12" style="margin-left: 4%;">
					<span style="margin-bottom: 30px; margin-top: 30px; font-size: 16px; color: black; font-weight: bold;">Investment Details(in rupees)</span>
              </div>	

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
			<div style="margin-left: 35px; margin-top: 8px;" class="col">
					  <label for="email">Savings in Bank:</label>
	  					<input disabled="true" min="0" required placeholder="Amount" class="form-control" type="number" name="savings_in_bank" id="savings_in_bank" onkeyup="savings(); shortFall(this)" oninput="maxLengthCheck(this)" maxlength="10" value="<?php if(isset($form_data)){ echo $form_data->SAVING_IN_BANK;}?>">
					</div>  
			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					  <label for="email">Immovable Properties:</label>
	  					<input disabled="true" min="0" required placeholder="Amount" class="form-control" type="number" name="immovable_prop" id="immovable_prop" oninput="maxLengthCheck(this)" onkeyup="immovable(); shortFall(this)" maxlength="10" value="<?php if(isset($form_data)){ echo $form_data->IMMOVABLE_PROP;}?>">
	  				</div> 
				</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
					  <label for="email">Investments:</label>
	  					<input disabled="true" required min="0" placeholder="Amount" class="form-control" type="number" name="other_invest" id="other_invest" oninput="maxLengthCheck(this)" onkeyup="other(); shortFall(this)" maxlength="10" value="<?php if(isset($form_data)){ echo $form_data->OTHER_INVESTMENTS;}?>">
	  				</div>  
			
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					  <label for="email">Insurance Policies:</label>
	  					<input disabled="true" min="0" required placeholder="Amount" class="form-control" type="number" name="insurance_poli" id="insurance_poli" oninput="maxLengthCheck(this)" onkeyup="insurance(); shortFall(this)" maxlength="10" value="<?php if(isset($form_data)){ echo $form_data->INSURANCE_POLICY;}?>">
	  				</div> 
				</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		
		<div style="margin-left: 35px; margin-top: 8px;" class="col">
		<label for="email">Do you want to transfer outstanding loan from another bank / financial institution:</label>
		  <input disabled="true" style="margin-right: 5px;" type="radio" name="prop_outstand" value="Yes">Yes
		  <input disabled="true" style="margin-left: 10px; margin-right: 5px;" type="radio" value="No" name="prop_outstand">No				
		</div>	
		<div style="margin-left: 35px; margin-top: 8px;" class="col">
		<label for="email">Have you short listed the property:</label>
			<input disabled="true" style="margin-right: 5px;" type="radio" name="prop_short_radio" value="Yes">Yes
		  <input disabled="true" style="margin-left: 10px; margin-right: 5px;" type="radio" name="prop_short_radio" value="No" >No				
		</div> 
  </div>


<br>
                  <div class="row col-12" style="margin-left: 4%;">
					<span style=" margin-bottom: 30px; margin-top: 30px; font-size: 16px; color: black; font-weight: bold;">Details about Property customer want to buy  </span>

				</div>	
	

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
				  <label for="email">Address:</label>
  					<input disabled="true" maxlength="30" minlength="3" required style="margin-top: 1px;" placeholder="Address Line 1 *" class="form-control" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LINE_1;?>">
  					<input disabled="true" maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 2 " class="form-control" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LINE_2;?>">
  					<input disabled="true" maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 3 " class="form-control" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LINE_3;?>">
  					
  				</div>  

  		 				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col" hidden>
				  <label for="email">No of years at this property:</label>
  					<input  disabled="true" placeholder="Enter years *" class="form-control" type="number" maxlength="2" name="resi_no_of_years"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_NO_YEARS_LIVING;?>">
  				</div>	
              
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
				  <label for="email">Property Location:</label>
					<select disabled="true" required class="form-control resi_prop_type" name="prop_location" > 
					  <option value="">Select Property Location *</option>
					  <option value="within corporation limit" <?php if(!empty($form_data))if ($form_data->PROP_LOCATION == 'within corporation limit') echo ' selected="selected"'; ?>>Within Corporation Limit</option>
					  <option value="outside corporation limit" <?php if(!empty($form_data))if ($form_data->PROP_LOCATION == 'outside corporation limit') echo ' selected="selected"'; ?>>Outside Corporation Limit</option>
					  
					</select>
  				</div>  						
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		
				
				<div style="margin-left: 35px; margin-top: 8px;" class="col">
				<label for="email">Landmark:</label>
					<input disabled="true" maxlength="30" required placeholder="Enter landmark *" class="form-control" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LANDMARK;?>">
				</div>  			  				

				
				<div style="margin-left: 35px; margin-top: 8px;" class="col">
				<label for="email">Pincode:</label>
					<input disabled="true" required placeholder="Enter pincode *" class="form-control" type="number" minlength="6" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_PINCODE;?>">
				</div>  
			
				
				<div style="margin-left: 35px; margin-top: 8px;" class="col">
				<label for="email">Property Type:</label>
				  <select disabled="true" required class="form-control resi_prop_type" name="resi_sel_property_type" > 
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
					
				<div style="margin-left: 35px; margin-top: 8px;" class="col">
				<label for="email">State:</label>
					<input disabled="true" id="resi_state_view" placeholder="State" class="form-control" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_STATE ;?>">
					<input hidden="true" placeholder="State" class="form-control" name="resi_state" id="resi_state" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_STATE ;?>">  					
				</div>  			  				

				
				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
				<label for="email">District:</label>
					<input disabled="true" placeholder="District" class="form-control" id="resi_district_view" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_DISTRICT ;?>">
					<input hidden="true" placeholder="District" class="form-control" name="resi_district" id="resi_district" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_DISTRICT ;?>">
				</div>  			  				

				
				<div style="margin-left: 35px; margin-top: 8px;" class="col">
				<label for="email">City:</label>
					<input disabled="true" maxlength="25" placeholder="City" class="form-control" name="resi_city" id="resi_city" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_CITY ;?>">
				</div>  			  				
		  </div>							
		  </div>
		  <div class="row shadow bg-white rounded margin-10 padding-15">
		  <div class="row col-12" style="margin-left: 4%;">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 30px; font-size: 16px; color: black; font-weight: bold;">Loan Details</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
					  <label for="email">Rate Option:</label>
	  					<select disabled="true" required class="form-control" name="select_rate_option"> 

							  <option value="">Select Option *</option>
							  <option value="Fixed" <?php if(!empty($form_data))if ($form_data->RATE_OPTION == 'Fixed') echo ' selected="selected"'; ?>>Fixed</option>							  
							  <option value="Floating" <?php if(!empty($form_data))if ($form_data->RATE_OPTION == 'Floating') echo ' selected="selected"'; ?>>Floating</option>				
							  <option value="Others" <?php if(!empty($form_data))if ($form_data->RATE_OPTION == 'Others') echo ' selected="selected"'; ?>>Others</option>				
							</select>
	  				</div>  
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					  <label for="email">Loan Type:</label>
	  					<select disabled="true" required class="form-control" name="select_loan_type"> 
							  <option value="">Select Loan Type *</option>
							  <option value="Home Loans" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Home Loans') echo ' selected="selected"'; ?>>Home Loans</option>			
							  <option value="Home Improvement Loans" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Home Improvement Loans') echo ' selected="selected"'; ?>>Home Improvement Loans</option>
                              <option value="House Construction On Self Own Plot" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'House Construction On Self Own Plot') echo ' selected="selected"'; ?>>House Construction On Self Own Plot</option>
							  <option value="Balance Transfer" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Balance Transfer') echo ' selected="selected"'; ?>>Balance Transfer</option>
                             	
                              <option value="Re-Finance" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Re-Finance') echo ' selected="selected"'; ?>>Re-Finance</option>								  
							  <option value="Plot Loans" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Plot Loans') echo ' selected="selected"'; ?>>Plot Loans</option>									  
							 
                              							  
							</select>
	  				</div>  

					
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					  <label for="email">Desired loan amount:</label>
	  					<input disabled="true" min="0" required placeholder="Amount" class="form-control" type="number" name="desired_loan_amount" id="desired_loan_amount" oninput="maxLengthCheck(this);" onkeyup="Loan_amount(); shortFall(this)" maxlength="15" value="<?php if(isset($form_data)){ echo $form_data->DESIRED_LOAN_AMOUNT; }?>">
	  				</div>  	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					  <label for="email">Tenure in Years:</label>
	  					<input disabled="true" min="1" required placeholder="Enter year" class="form-control" type="number" name="tenure_year" id="tenure_year" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(isset($form_data)){ echo $form_data->TENURE; }?>">
	  				</div> 
	
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					  <label for="email">Loan is to be Availed for:</label>
	  					<select disabled="true" required class="form-control" name="loan_availed_for" id="loan_availed_for"> 
							  <option value="Property from Developer / Builder" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Property from Developer / Builder') echo ' selected="selected"'; ?>>Property from Developer / Builder</option>
							  <option value="Property from Development Authority" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Property from Development Authority') echo ' selected="selected"'; ?>>Property from Development Authority</option>
							  <option value="Resale/ Pre-owned Flat/ Rowhouse" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Resale/ Pre-owned Flat/ Rowhouse') echo ' selected="selected"'; ?>>Resale/ Pre-owned Flat/ Rowhouse</option>
							  <option value="Construction of Standalone House on a Plot" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Construction of Standalone House on a Plot') echo ' selected="selected"'; ?>>Construction of Standalone House on a Plot</option>
							  <option value="sister" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'sister') echo ' selected="selected"'; ?>>Resale/ Pre-owned Bungalow</option>							  
							  <option value="Others" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Others') echo ' selected="selected"'; ?>>Others</option>							  
							</select>
	  				</div> 

	  						
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					  <label for="email">Area of Land (Sq ft) :</label>
	  					<input disabled="true" placeholder="Area" class="form-control" type="number" name="area_land" id="area_land" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(isset($form_data)){ echo $form_data->AREA_OF_LAND;}?>">
	  				</div> 
	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					  <label for="email">Carpet Area(Sqft):</label>
	  					<input disabled="true"  min="0" placeholder="Carpet Area" class="form-control" type="number" name="carpet_area" id="carpet_area" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(isset($form_data)){ echo $form_data->CARPET_AREA;}?>">
	  				</div> 

				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					  <label for="email">Build up Area (Sqft):</label>
	  					<input disabled="true" min="0" placeholder="Build up Area" class="form-control" type="number" name="buildup_area" id="buildup_area" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(isset($form_data)){ echo $form_data->BUILD_UP_AREA;}?>">
	  				</div> 

	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					  <label for="email">Stage of Construction:</label>
	  					<select disabled="true" required class="form-control resi_prop_type" name="stage_of_const" > 
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

			</div>

			<div class="row shadow bg-white rounded margin-10 padding-15">
				
			<div class="row col-12" style="margin-left: 4%;">
					<span style=" margin-bottom: 30px; margin-top: 30px; font-size: 16px; color: black; font-weight: bold;">About Bank Detail's</span>
					<div class="w-100"></div>					
				</div>

				
				<div id="bankLayout" style="margin-left: 4%;margin-bottom: 30px;" class="col">
					
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
					
												<input disabled="true" required placeholder="Bank Acc Name" class="other-income-select bank-acc-name" type="text" maxlength="20" oninput="maxLengthCheck(this)" name="bank_acc_name" style="width: 17%;"  value="<?php echo $data_array[$i]->bank_acc_name;?>">
										       	<select disabled="true" required style="width: 17%;" class="other-income-select bank-select-data" id="acc_type" name="acc_type[]">
										        	<option id='1_1' value="">Account Type</option>
										            <option id='2_1' <?php if ($data_array[$i]->acc_type == 'Current') echo ' selected="selected"'; ?>>Current</option>
										            <option id='3_1' <?php if ($data_array[$i]->acc_type == 'Saving') echo ' selected="selected"'; ?>>Saving</option>
										        </select>	
												<input disabled="true" required placeholder="Acc for no of years" class="other-income-select bank-acc-years" type="number" name="acc_years" style="width: 17%;"  maxlength="2" oninput="maxLengthCheck(this)" value="<?php echo $data_array[$i]->bank_acc_year;?>">
										        <input disabled="true" required placeholder="IFSC code" class="other-income-select bank-ifsc" type="text" name="ifsc_code" id="ifsc_code" style="width: 17%;" maxlength="11" oninput="maxLengthCheck(this)" onkeydown="upperCaseF(this)" pattern="^[A-Z]{4}0[A-Z0-9]{6}$" title="SBIN0125620" value="<?php echo $data_array[$i]->ifsc_code;?>">
										        <input disabled="true" required placeholder="Account Number" class="other-income-select bank-acc-no" type="number"  name="acc_no" style="width: 17%;" maxlength="15" min="0" oninput="maxLengthCheck(this)"  value="<?php echo $data_array[$i]->bank_acc_no;?>">
										     
										    </div>	
										</fieldset>
									</div>	
								<?php } 
								}
							} else { ?>
								<div class="bank_wrapper">
				  						<fieldset id="bankS_row">
											<div class="bank_row" id="line_1">
												<input disabled="true" required placeholder="Bank Acc Name" class="other-income-select bank-acc-name" type="text" maxlength="20" oninput="maxLengthCheck(this)" name="bank_acc_name" style="width: 17%;" >
										        <select disabled="true" required style="width: 17%;" class="other-income-select bank-select-data" id="acc_type" name="acc_type[]">
										        	<option id='1_1' value="">Account Type</option>
										            <option id='2_1'>Current</option>
										            <option id='3_1' >Saving</option>
										        </select>										        
										        <input disabled="true" required placeholder="Acc for no of years" class="other-income-select bank-acc-years" type="number" name="acc_years" style="width: 17%;"  maxlength="2" oninput="maxLengthCheck(this)">
										        <input disabled="true" required placeholder="IFSC code" class="other-income-select bank-ifsc" type="text" name="ifsc_code" id="ifsc_code" style="width: 17%;" maxlength="11" oninput="maxLengthCheck(this)" onkeydown="upperCaseF(this)" pattern="^[A-Z]{4}0[A-Z0-9]{6}$" title="SBIN0125620">
										        <input disabled="true" required placeholder="Account Number" class="other-income-select bank-acc-no" type="number"  name="acc_no" style="width: 17%;" maxlength="15" min="0" oninput="maxLengthCheck(this)"  >
										    </div>	
										</fieldset>
									</div>	
						<?php }?>	  	

	  				</div> 
			</div>

			<div class="row shadow bg-white rounded margin-10 padding-15">
			
		
	</div>

<?php //=====================================================lap loan
	}
	else if($form_data->LOAN_TYPE=="lap")
	{
?>



<div class="row bg-white rounded margin-10 padding-15">
               <div class="row col-12" style="margin-left: 14px;">
					<span style=" margin-bottom: 30px; margin-top: 30px; font-size: 16px; color: black; font-weight: bold;">Customers Property Location Details</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			
  				
				<div style="margin-top: 8px;" class="col">
				<label for="email">Address:</label>
  					<input disabled="true" required style="margin-top: 1px;" placeholder="Address Line 1 *" class="form-control" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LINE_1;?>">
  					<input  disabled="true" style="margin-top: 8px;" placeholder="Address Line 2" class="form-control" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LINE_2;?>">
  					<input disabled="true" style="margin-top: 8px;" placeholder="Address Line 3" class="form-control" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LINE_3;?>">
  				</div>  

 				
  				<div style="margin-top: 8px;" class="col">
				  <label for="email">No of years of ownership:</label>
  					<input disabled="true" required placeholder="Enter years *" class="form-control" type="number" maxlength="2" name="resi_no_of_years"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_NO_YEARS;?>">
  				</div>			  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			  				
  				<div style="margin-top: 8px;" class="col">
				  <label for="email">Landmark:</label>
  					<input disabled="true" maxlength="30" minlength="3" required placeholder="Enter landmark *" class="form-control" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LANDMARK;?>">
  				</div>  			  				

  			
  				<div style="margin-top: 8px;" class="col">
				  <label for="email">Pincode:</label>
  					<input disabled="true" required placeholder="Enter pincode *" class="form-control" type="number" minlength="6" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_PINCODE;?>">
  				</div>  
  	  				
  				<div style="margin-top: 8px;" class="col">
				  <label for="email">Property Type:</label>
					<select disabled="true" required class="form-control resi_prop_type" name="resi_sel_property_type" > 
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
		  				
  				<div style="margin-top: 8px;" class="col">
				  <label for="email">State:</label>
  					<input disabled="true" id="resi_state_view" placeholder="State" class="form-control" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_STATE ;?>">
  				</div>  			  				

  				
  				<div id="district_div" style="margin-top: 8px;" class="col">
				  <label for="email">District:</label>
  					<input disabled="true" placeholder="District" class="form-control" id="resi_district_view" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_DISTRICT ;?>">
  					<input hidden="true" placeholder="District" class="form-control" name="resi_district" id="resi_district" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_DISTRICT ;?>">
  				</div>  			  				

  				
  				<div style="margin-top: 8px;" class="col">
				  <label for="email">City:</label>
  					<input disabled="true"  placeholder="City" class="form-control" name="resi_city" id="resi_city" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_CITY ;?>">
  				</div>  			  				
			</div>							
			</div>

			<div class="row bg-white rounded margin-10 padding-15">
			<div class="row col-12" style="margin-left: 14px;">
					<span style=" margin-bottom: 30px; margin-top: 30px; font-size: 16px; color: black; font-weight: bold;">Loan Details</span>

				</div>	
				

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			    	<div style="margin-top: 8px;" class="col">
					  <label for="email">Rate Option :</label>
	  					<select disabled="true" required class="form-control" name="select_rate_option"> 
							  <option value="">Select Option *</option>
							  <option value="Fixed" <?php if(!empty($form_data))if ($form_data->RATE_OPTION == 'Fixed') echo ' selected="selected"'; ?>>Fixed</option>							  
							  <option value="Floating" <?php if(!empty($form_data))if ($form_data->RATE_OPTION == 'Floating') echo ' selected="selected"'; ?>>Floating</option>							  
							  <option value="Others" <?php if(!empty($form_data))if ($form_data->RATE_OPTION == 'Others') echo ' selected="selected"'; ?>>Others</option>							  
							</select>
	  				</div>  

	 		
	  				<div style="margin-top: 8px;" class="col">
					  <label for="email">Loan Type :</label>
	  					<select disabled="true" required class="form-control" name="select_loan_type"> 
							  <option value="">Select Loan Type *</option>
							  <option value="Loan against residential property" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Loan against residential property') echo ' selected="selected"'; ?>>Loan against residential property</option>			
							  <option value="Loan against commercial property" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Loan against commercial property') echo ' selected="selected"'; ?>>Loan against commercial property</option>							  
							  						  
							</select>
	  				</div>  

				
	  				<div style="margin-top: 8px;" class="col">
					  <label for="email">Desired loan amount :</label>
	  					<input disabled="true" required placeholder="Amount" class="form-control" type="number" name="desired_loan_amount" id="desired_loan_amount" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(!empty($form_data))echo $form_data->DESIRED_LOAN_AMOUNT ;?>">
	  				</div>  	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
	  				<div style="margin-top: 8px;" class="col">
					  <label for="email">Tenure in Years :</label>
	  					<input disabled="true" required placeholder="Enter year" class="form-control" type="number" name="tenure_year" id="tenure_year" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($form_data))echo $form_data->TENURE ;?>">
	  				</div> 
				
	  				<div style="margin-top: 8px;" class="col">
					  <label for="email">Loan is to be Availed for :</label>
	  					<select disabled="true" required class="form-control" name="loan_availed_for" id="loan_availed_for"> 
							  <option value="">Select availed for *</option>
							  <option value="Property from Developer / Builder" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Property from Developer / Builder') echo ' selected="selected"'; ?>>Property from Developer / Builder</option>
							  <option value="Property from Development Authority" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Property from Development Authority') echo ' selected="selected"'; ?>>Property from Development Authority</option>
							  <option value="Resale/ Pre-owned Flat/ Rowhouse" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Resale/ Pre-owned Flat/ Rowhouse') echo ' selected="selected"'; ?>>Resale/ Pre-owned Flat/ Rowhouse</option>
							  <option value="Construction of Standalone House on a Plot" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Construction of Standalone House on a Plot') echo ' selected="selected"'; ?>>Construction of Standalone House on a Plot</option>
							  <option value="Resale/ Pre-owned Bungalow" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Resale/ Pre-owned Bungalow') echo ' selected="selected"'; ?>>Resale/ Pre-owned Bungalow</option>							  
							  <option value="Others" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Others') echo ' selected="selected"'; ?>>Others</option>							  
							</select>
	  				</div> 

				
	  				<div style="margin-top: 8px;" class="col">
					  <label for="email">Open Area (Sq ft):</label>
	  					<input disabled="true" required placeholder="Area" class="form-control" type="number" name="area_land" id="area_land" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(!empty($form_data))echo $form_data->AREA_OF_LAND ;?>">
	  				</div> 
	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
				
	  				<div style="margin-top: 8px;" class="col">
					  <label for="email">Carpet Area (Sq ft):</label>
	  					<input disabled="true" required placeholder="Area" class="form-control" type="number" name="carpet_area" id="carpet_area" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(!empty($form_data))echo $form_data->CARPET_AREA ;?>">
	  				</div> 
			
				
	  				<div style="margin-top: 8px;" class="col">
					  <label for="email">Build up Area (Sq ft):</label>
	  					<input disabled="true" required placeholder="Area" class="form-control" type="number" name="buildup_area" id="buildup_area" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(!empty($form_data))echo $form_data->BUILD_UP_AREA ;?>">
	  				</div> 
		
				
	  				<div style="margin-top: 8px;" class="col">
					  <label for="email">Reason for Loan:</label>
	  					<select disabled="true" required class="form-control" name="visit_reason" id="visit_reason"> 
							  <option value="">Select Reason *</option>
							  <option value="Medical" <?php if(!empty($form_data))if ($form_data->REASON_FOR_VISIT == 'Medical') echo ' selected="selected"'; ?>>Medical</option>
							  <option value="House Owner (Home Renovation)" <?php if(!empty($form_data))if ($form_data->REASON_FOR_VISIT == 'House Owner (Home Renovation)') echo ' selected="selected"'; ?>>House Owner (Home Renovation)</option>
							  <option value="Personal (Others)" <?php if(!empty($form_data))if ($form_data->REASON_FOR_VISIT == 'Personal (Others)') echo ' selected="selected"'; ?>>Personal (Others)</option>
							  <option value="Holiday" <?php if(!empty($form_data))if ($form_data->REASON_FOR_VISIT == 'Holiday') echo ' selected="selected"'; ?>>Holiday</option>
							  <option value="Advance Salary" <?php if(!empty($form_data))if ($form_data->REASON_FOR_VISIT == 'Advance Salary') echo ' selected="selected"'; ?>>Advance Salary</option>
							  <option value="Rental Deposit" <?php if(!empty($form_data))if ($form_data->REASON_FOR_VISIT == 'Rental Deposit') echo ' selected="selected"'; ?>>Rental Deposit</option>
							  <option value="Wedding" <?php if(!empty($form_data))if ($form_data->REASON_FOR_VISIT == 'Wedding') echo ' selected="selected"'; ?>>Wedding</option>
							  <option value="Credit Card Takeover" <?php if(!empty($form_data))if ($form_data->REASON_FOR_VISIT == 'Credit Card Takeover') echo ' selected="selected"'; ?>>Credit Card Takeover</option>					  
							  <option value="Others" <?php if(!empty($form_data))if ($form_data->REASON_FOR_VISIT == 'Others') echo ' selected="selected"'; ?>>Others</option>
							</select>
	  				</div> 
					
				</div>

			</div>

			<div class="row bg-white rounded margin-10 padding-15">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				  				
	  				<div style=" margin-top: 8px;" class="col">
					  <label for="email">Are you Sole Owner of Property :</label>
	  					<input disabled="true" checked="true" style="margin-right: 5px;" type="radio" name="sole_owner" value="Yes" <?php if(!empty($form_data))if($form_data->IS_SOLE_OWNER=='Yes'){ echo 'checked';} ?>>Yes
						<input disabled="true" style="margin-left: 10px; margin-right: 5px;" type="radio" name="sole_owner" value="No" <?php if(!empty($form_data))if($form_data->IS_SOLE_OWNER=='No'){ echo 'checked';} ?>>No				
	  				</div> 
	  				
	  				<div style="margin-top: 8px;" class="col">
					  <label for="email">what is your share (%) in property :</label>
	  					<input disabled="true" placeholder="Enter share percentage" class="form-control" type="number" name="share_prop" id="share_prop" oninput="maxLengthCheck(this)" maxlength="3" value="<?php if(!empty($form_data))echo $form_data->SHARE_IN_PROP ;?>">
	  				</div> 
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			  				
	  				<div style="margin-top: 8px;" class="col">
					  <label for="email">Will bank be able to obtain sole ownership of the property :</label>
	  					<input disabled="true" style="margin-right: 5px;" type="radio" name="sole_owner_able" value="Yes" <?php if(!empty($form_data))if($form_data->IS_BANK_OBTAIN_SOLE=='Yes'){ echo 'checked';} ?>>Yes
						<input disabled="true" style="margin-left: 10px; margin-right: 5px;" type="radio" name="sole_owner_able" value="No" checked="true" <?php if(!empty($form_data))if($form_data->IS_BANK_OBTAIN_SOLE=='Yes'){ echo 'checked';} ?>>No				
	  				</div> 

	  				<div style="margin-top: 8px;" class="col">
					  <label for="email">Is legal title of the property clear  :</label>
	  					<input disabled="true" style="margin-right: 5px;" type="radio" name="legal_title" value="Yes" <?php if(!empty($form_data))if($form_data->IS_LEGAL_TITLE_CLEAR=='Yes'){ echo 'checked';} ?>>Yes
						<input disabled="true" style="margin-left: 10px; margin-right: 5px;" type="radio" name="legal_title" value="No" <?php if(!empty($form_data))if($form_data->IS_LEGAL_TITLE_CLEAR=='Yes'){ echo 'checked';} ?> checked="true">No				
	  				</div> 

	  				
	  			</div>

	  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  				  				
	  				<div style="margin-top: 8px;" class="col">
					  <label for="email">Do you have any loan on property  :</label>
	  					<input disabled="true" checked="true" style="margin-right: 5px;" type="radio" name="loan_on_property" value="Yes" <?php if(!empty($form_data))if($form_data->IS_LOAN_ON_PROP=='Yes'){ echo 'checked';} ?>>Yes
						<input disabled="true" style="margin-left: 10px; margin-right: 5px;" type="radio" name="loan_on_property" value="No" <?php if(!empty($form_data))if($form_data->IS_LOAN_ON_PROP=='Yes'){ echo 'checked';} ?>>No				
	  				</div> 
	  				
	  				<div style="margin-top: 8px;" class="col">
					  <label for="email">How many properties do you own :</label>
	  					<input disabled="true" placeholder="Enter property count" class="form-control" type="number" name="no_of_property" id="no_of_property" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($form_data))echo $form_data->HOW_MANY_PROP_OWN ;?>">
	  				</div> 
	  			</div>
			</div>

			<div class="row  bg-white rounded margin-10 padding-15" id="bank_layout">
				
				<div class="row col-12" style="margin-left: 14px;">
					<span style="margin-bottom: 30px; margin-top: 30px; font-size: 16px; color: black; font-weight: bold;">Existing Loan's Details</span>
					<div class="w-100"></div>					
				</div>

				<div id="emisLayout" style="margin-left: 35px;" class="col">
					
	  				  		
				<?php

if(!empty($form_data->BANK_DETAILS_JSON)){
$json = $form_data->BANK_DETAILS_JSON;

$jsonData = json_decode($json);
if($jsonData!=''){
  $data_array = $jsonData->banks;
  for ($i=0; $i < count($data_array); $i++) { ?>
		  <div class="emis_wrapper">
		  <fieldset >
		  <div class="bl_row">
			  <input disabled class="other-income-select-heading " type="text" style="width: 17%;" value="Bank Name">
			  <input disabled class="other-income-select-heading " type="text" style="width: 17%;" value="Loan Amount">
			  <input disabled class="other-income-select-heading " type="text" style="width: 17%;" value="Loan End Date">
			  <input disabled class="other-income-select-heading" type="text"  style="width: 17%;" value="Loan EMI">		        
			
		  </div>	
	  </fieldset>
  </div>	
  <div class="bl_wrapper">
		<fieldset id="blS_row">
		  <div class="bl_row" id="line_1">
			  <select disabled style="width: 17%;" class="other-income-select bank-name" id="bl" name="bl[]">
				  <option id='1_1' value="">Select Bank</option>
				  <option id='2_1' value="" <?php if ($data_array[$i]->bank_type == 'State Bank of India') echo ' selected="selected"'; ?>>State Bank of India</option>
				  <option id='3_1' value="" <?php if ($data_array[$i]->bank_type == 'Axis Bank') echo ' selected="selected"'; ?>>Axis Bank</option>
				  <option id='4_1' value="" <?php if ($data_array[$i]->bank_type == 'HDFC Bank') echo ' selected="selected"'; ?>>HDFC Bank</option>
				  <option id='5_1' value="" <?php if ($data_array[$i]->bank_type == 'ICICI Bank') echo ' selected="selected"'; ?>>ICICI Bank</option>
				  <option id='6_1' value="" <?php if ($data_array[$i]->bank_type == 'Bank of Baroda') echo ' selected="selected"'; ?>>Bank of Baroda</option>
				  <option id='7_1' value="" <?php if ($data_array[$i]->bank_type == 'Union Bank of India') echo ' selected="selected"'; ?>>Union Bank of India</option>
				  <option id='8_1' value="" <?php if ($data_array[$i]->bank_type == 'IDBI Bank') echo ' selected="selected"'; ?>>IDBI Bank</option>
				  <option id='9_1' value="" <?php if ($data_array[$i]->bank_type == 'Canara Bank') echo ' selected="selected"'; ?>>Canara Bank</option>
				  <option id='10_1' value="" <?php if ($data_array[$i]->bank_type == 'Punjab National Bank') echo ' selected="selected"'; ?>>Punjab National Bank</option>
				  <option id='11_1' value="" <?php if ($data_array[$i]->bank_type == 'UCO Bank') echo ' selected="selected"'; ?>>UCO Bank</option>
				  <option id='12_1' value="" <?php if ($data_array[$i]->bank_type == 'Other') echo ' selected="selected"'; ?>>Other</option>
			  </select>
			  <input disabled placeholder="Loan Amount" class="other-income-select bank-loan-amount" type="number" name="emis_loan_amount" style="width: 17%;" value="<?php echo $data_array[$i]->bank_loan_amount;?>">
			  <input disabled placeholder="Loan End Date" class="other-income-select loan-end-date" type="text" name="loan_end_date" style="width: 17%;" value="<?php echo $data_array[$i]->end_date;?>">
			   <input  disabled placeholder="Loan End Date" class="other-income-select loan-end-date" type="text" name="loan_end_date" id="loan_end_date" style="width: 17%;" value="<?php echo $data_array[$i]->bank_loan_emi;?>">
									        
		  </div>	
	  </fieldset>
	  </div>	
  <?php } 
  }
} else { ?>
<div class="bl_wrapper">
		<fieldset >
		  <div class="bl_row">
			  <input disabled class="other-income-select-heading " type="text" style="width: 17%;" value="Bank Name">
			  <input disabled class="other-income-select-heading " type="text" style="width: 17%;" value="Loan Amount">
			  <input disabled class="other-income-select-heading " type="text" style="width: 17%;" value="Loan End Date">
			  <input disabled class="other-income-select-heading" type="text"  style="width: 17%;" value="Loan EMI">		        
			  <input disabled class="other-income-select-heading" type="text" value="DELETE" style="width: 8%; color: red;" >
		  </div>	
	  </fieldset>
  </div>	
  <div class="bl_wrapper">
		<fieldset id="blS_row">
		  <div class="bl_row" id="line_1">
			  <select style="width: 17%;" class="other-income-select bank-name" id="bl" name="bl[]">
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
			  <input placeholder="Loan Amount" class="other-income-select bank-loan-amount" type="number" name="emis_loan_amount" style="width: 17%;" oninput="maxLengthCheck(this)" maxlength="10">
			   <input  placeholder="Loan End Date" class="other-income-select loan-end-date" type="text" name="loan_end_date" id="loan_end_date" style="width: 17%;" >
			  <input placeholder="EMI" class="other-income-select bank-emi-data" type="number" name="bank_emi_data" style="width: 17%;" oninput="maxLengthCheck(this)" maxlength="10">										        
			  <input disabled class="bl_remove other-income-select" type="button" value="-" style="width: 8%; color: red;" >
		  </div>	
	  </fieldset>
  </div>								
<?php }?>	

	

	  				</div> 
			</div>

<?php //=======================================================personal loan
	}
	else 
	{
?>
personal
<?php
	}
}
?>
	
<hr>
<div >
        <div class="container">
            <div class="row">
         
                  <div class="row col-12" style="margin-left: 4px;">
					<span style="margin-bottom: 30px; margin-top: 30px; font-size: 16px; color: black; font-weight: bold;"> Total Co-Applicants :&nbsp;&nbsp;<?php echo count($coapplicants);?></span>
              	</div>	                
              </div>

<?php if(count($coapplicants) == 0) { ?>
	<div >
	      
			
			<div class="row">
         
		 <div class="row col-12" style="margin-left: 4px;">
		   <span style="margin-bottom: 30px; margin-top: 30px; font-size: 16px; color: black; font-weight: bold;"> Unable to find any Co-Applicants:&nbsp;&nbsp;<?php echo count($coapplicants);?></span>
		 </div>	                
	 </div>
	
<?php } ?>
<?php foreach($coapplicants as $row){?>
	
	<div class="row justify-content-center">
		
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card mb-3">
				  <div class="row no-gutters">
				    <div class="col-xl-2.5 col-lg-2.5 col-md-2.5 col-sm-2.5 col-2.5 align-self-center">
				  
				    	<img  style="width:40px; height: 40px; margin-left: 10px; margin-top: 4px; margin-bottom: 4px; margin-left: 14px;" src="<?php base_url()?>/dsa/dsa/images/user.png" class="rounded float-left card-img manager-img">
				   
				    </div>
				    <div class="col-xl-9 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8" style="margin-left: 10px; margin-top: 5px; margin-bottom: 5px;">
				      <div class="card-bg">
					      	<div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<b style="font-size: 14px; color: #000000"><?php echo $row->FN." ".$row->LN;  ?></b>			     </div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<?php if($row->PROFILE_PERCENTAGE == '' || $row->PROFILE_PERCENTAGE!=100) { ?>
						        		<p class="card-text" style="font-size: 10px; color: red">		INCOMPLETE PROFILE 
						        			
					        			</p>
							        <?php }else { ?>
							        	<p class="card-text" style="color: green; font-size: 10px;">COMPLETED PROFILE
							        	</p>
							        <?php } ?>
					        	</div>
					        </div>				        
					        <div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<small >Email : <?php echo $row->EMAIL;  ?></small>
					        	</div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<p class="card-text"><small class="text-muted">Mobile : <?php echo $row->MOBILE;  ?></small></p>
					        	</div>
					        </div>
			       				        				        				      
				      </div>
				    </div>
				    <div class="col-xl-0.5 col-lg-0.5 col-md-0.5 col-sm-0.5 col-0.5 align-self-center">
				    	
				    	<i class="fa fa-chevron-right"></i>
				    </div>
					
				
				  </div>
				  
				</div>	
				
	
			
		</div>	
		
		
	</div>
<?php } ?>


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

</body>
</html>