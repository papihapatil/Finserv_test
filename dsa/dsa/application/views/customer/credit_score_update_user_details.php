

	<div >
		
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 5px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">
						Update Below Details for Credit Score 
					</span>
					
				</div>					

			</div>	

			<form method="POST" action="<?php echo base_url(); ?>index.php/customer/customer_score_update_user_details_action?UID=<?php if(!empty($id)){echo $id;} ?>" id="customer_score_update_user_details_js">
				

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Update Address</span>

				</div>	
				
				<div class="w-100"></div>

							
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
			<div style="margin-top: 0px;" class="col">
					<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Please enter pin code so state, district, city will come automatically. *</span>
				</div>			
				<div class="w-100"></div>
  				<br>
  			
  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Enter pincode *" class="input-cust-name" type="number" minlength="6" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row))echo $row->postal_code;?>">
  				</div>  
  				  			  							  				
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  required style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row))echo $row->address_line_1;?>">
  					</div>  

  							  				
			</div>


			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" id="resi_state_view" placeholder="State" class="input-cust-name" value="<?php if(!empty($row))echo $row->state ;?>">
  					<input hidden="true" placeholder="State" class="input-cust-name" name="resi_state" id="resi_state" value="<?php if(!empty($row))echo $row->state ;?>">  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District" class="input-cust-name" id="resi_district_view" value="<?php if(!empty($row))echo $row->city ;?>">
  					<input hidden="true" placeholder="District" class="input-cust-name" name="resi_district" id="resi_district" value="<?php if(!empty($row))echo $row->city ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="30" minlength="3" placeholder="City" class="input-cust-name" name="resi_city" id="resi_city" value="<?php if(!empty($row))echo $row->city;?>">
  				</div>  			  				
			</div>							
			</div>
			</div>

			<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Full name as per PAN card *</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text" id="f_name" name="f_name" minlength="3" maxlength="30" required value="<?php if(!empty($row))echo $row->first_name;?>" oninput="validateText(this)">
						
	  					<input style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="l_name" id="l_name" minlength="3" maxlength="30" required  value="<?php if(!empty($row))echo $row->last_name;?>" oninput="validateText(this)">
	  				</div>
	  				<div class="w-100"></div>

	  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Birth *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<!--<input required  max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="dob" id="dob" value="<?php if(!empty($row))echo $row->dob;?>" >--->
						 <input  class="input-cust-name" type="text" name="dob" id="dob" readonly >
	  				</div>
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input required placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" name="mobile" id="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php if(!empty($row))echo $row->mobile;?>">
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
  								<input checked="true" type="radio" name="gender" value="male"> Male
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input type="radio" name="gender" value="female" <?php if(!empty($row))if ($row->gender =='female') echo ' checked="true"'; ?>> Female
	  						</div>
  						</div>						
  					</div>  					
  				</div>

  				<div class="w-100"></div>
				  <br>

  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">PAN Number * (Five characters, Four digits and again One character) e.g: COKPG9558B</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" required placeholder="PAN number *" class="input-cust-name" type="text" name="pan" title="Please enter valid PAN number" maxlength="10"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->pan;?>" style="text-transform:uppercase">
  				</div>				
  			</div>  			
		</div>

				<div class="row justify-content-center">
					<div class=" container-login100-form-btn">
						<div id="loader" class="loader" style="margin-top:10px; display:none"></div>
					</div>					
				</div>	

				<div style="margin-top: 20px; margin-bottom: 20px;" class="row col-12 justify-content-center">
					<div >
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							APPLY FOR LOAN
						</button>
					</div>		
				</div>				
			</div>


			</form>
			
		</div>		
	</div>
	<script>
 $(document).ready(function () {
                
								$('#dob').datepicker({
								autoclose: true,
								endDate: new Date(new Date().setDate(new Date().getDate())),
								format: 'yyyy-mm-dd'  
				
                              });  
            
            });
</script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 

