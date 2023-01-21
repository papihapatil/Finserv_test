<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="screen-title">
                    	<small class="screen-title-txt">MY PROFILE</small>
                    </div>
                </div>            	
            </div>
        </div>
</div>

<div class="font-faticon w3-container margin-top-10 black-color">
  
  <div class="w3-bar w3-custom-header-color-one">
    <button class="w3-bar-item w3-button tablink"><a class="black-color" href="<?php echo base_url('index.php/customer')?>">PROFILE INFO</a></button>
    <button class="w3-bar-item w3-button tablink w3-light-red"><a class="black-color" href="<?php echo base_url('index.php/customer/moreinfo')?>">MORE INFO</a></button>
  </div>  

  <div style="background-color: white;" id="London" class="w3-container city white-color">
    <div class="w3-panel ">

    		<div style="text-align: center;" class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1">
		    			Pan Number
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->PAN_NUMBER?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Aadhar Number
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->AADHAR_NUMBER?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Current Address
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->CURRENT_RESIDENTIAL_ADDRESS?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Age
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->AGE?> Years
		    		</div>
				</div>
			</div>

			<div style="margin-top: 20px; text-align: center;" class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1">
		    			Annual Income
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->ANNUAL_INCOME?> INR
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Education 
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->EDUCATION_BACKGROUND?> 
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Date of Birth
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php 
		    				$date=date_create($row->DOB);
		    				echo date_format($date,"d-m-Y")?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Occupation
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->OCCUPATION?>
		    		</div>
				</div>
			</div>    		

			<div style="margin-top: 20px; text-align: center;" class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1">
		    			Native Place
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->NATIVE_PLACE?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Agri Land In Native
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->AGRI_LAND_IN_NATIVE?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Agri Income
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->AGRI_INCOME?> Rupees
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Other Income Source
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->OTHER_INCOME_SOURCE?>
		    		</div>
				</div>
			</div>

			<div style="margin-top: 20px; text-align: center;" class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1">
		    			Existing Active Loans
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->EXISTING_ACTIVE_LOANS?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Existing Loan EMI
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->EXISTING_LOAN_EMI?> Rupees
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Number of Dependants
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->NO_OF_DEPENDANTS?> Members
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			How long you living on present address ?
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->LIVING_YEAR_PRESENT_ADDRESS?> Years
		    		</div>
				</div>
			</div>

			<div style="margin-top: 20px; text-align: center;" class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1">
		    			How long you living in city ?
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->YEARS_IN_CITY_LIVING?> Years
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Is tax IT return is available ? 
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->IT_RETURN_AVAILABLE?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Is IT return with GAP ?
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->IT_RETURN_FILED_WITH_GAP?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Loan Type
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->TYPE_OF_LOAN?>
		    		</div>
				</div>
			</div>

			<div style="margin-top: 20px; text-align: center;" class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1">
		    			State
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->STATE?>
		    		</div>
				</div>

				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			District
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->DISTRICT?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			City
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->CITY?>
		    		</div>
				</div>						
			</div>

			<?php if($row->DESIGNATION!='' && $row->PAST_EMPLOYMENT_DETAILS!='') { ?>
			<div style="margin-top: 20px; text-align: center;" class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1">
		    			Designation
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->DESIGNATION?>
		    		</div>
				</div>

				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Past Employment
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->PAST_EMPLOYMENT_DETAILS?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Company Type
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->IT_RETURN_FILED_WITH_GAP?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Company Address
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->COMPANY_ADDRESS?>
		    		</div>
				</div>
			</div>

			<div style="margin-top: 20px; text-align: center;" class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1">
		    			Office Email
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->OFFICE_EMAIL?>
		    		</div>
				</div>

				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Office Contact Number
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->OFFICE_CONTACT_NO?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Cash Salary
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->CASH_SALARY?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Gross Salary
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->GROSS_SALARY?>
		    		</div>
				</div>
			</div>

			<div style="margin-top: 20px; text-align: center;" class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1">
		    			Basic Salary
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->BASIC_SALARY?>
		    		</div>
				</div>

				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Loan EMI Deduct's from Salary
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->LOAN_EMI_DEDUCT_FROM_SALARY?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Salary Credit's to Bank
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->BANK_CREDIT_SALARY?>
		    		</div>
				</div>				
			</div>
		<?php } ?>

			<?php if($row->SELF_BUSINESS_ADDRESS!='' && $row->OWNERSHIP_TYPE!='') { ?>
			<div style="margin-top: 20px; text-align: center;" class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1">
		    			Self Business Address
		    		</div>
		    		<div class="size-12 bold-font black-color">
		    			<?php echo $row->SELF_BUSINESS_ADDRESS?>
		    		</div>
				</div>

				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Business Ownership Type
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->OWNERSHIP_TYPE?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-5 col-5">
					<div class="gray-color-1 ">
		    			Premises rented or Own by self
		    		</div>
		    		<div class="size-12 bold-font black-color ">
		    			<?php echo $row->PREMISES_RENTED_SELF?>
		    		</div>
				</div>						
			</div>
			<?php } ?>		   		

	    	<div class="row justify-content-center padding-15">
	    		<div class="row  col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12">
	    			<div class="gray-color-1 col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
		    			<div class="container-login100-form-btn">
		    				<form style="width: 100%;" action="<?php echo base_url();?>index.php/customer/customer_edit_profile_2">
							    <input class="login100-form-btn" type="submit" value="Edit Profile" />
							</form>
							
						</div>		
		    		</div>		    		
	    		</div>
	    	</div>	    	
	    </div>
  </div>
</div>
