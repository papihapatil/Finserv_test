<?php 

//print_r($row);

?>

<form method="post" action="">

<div class="row shadow bg-white rounded margin-10 padding-15">
														<div class="row justify-content-center col-12">
															<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Premium Calculation Details</span>
														</div>
														<div class="row justify-content-center col-12">
																<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">Premium Calculation Details</span>
														</div>
			                                            <div class="w-100"></div>
														<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">User_id</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																<input required placeholder="User_id*" class="input-cust-name" type="text"  name="User_id"  value="<?php echo $row->UNIQUE_CODE; ?>">
															</div>  			  				
														</div>
			                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Birth</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																<input required placeholder="Date of Birth*" class="input-cust-name" type="date"  name="DateofBirth"   value="<?php echo $row->DOB; ?>">
															</div>  			  				
														</div>
														<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">sum assured</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																<input required placeholder="sum assured*" class="input-cust-name" type="text"  name="sumassured"     value="<?php ?>">
															</div>  			  				
														</div>
														
														
														<div class="w-100"></div>
														<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan Commencement date</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																<input required placeholder="Loan Commencement date*" class="input-cust-name" type="date"  name="LoanCommencementdate"  value="">
															</div>  			  				
														</div>
			                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Policy Term</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																<input required placeholder="Policy Term*" class="input-cust-name" type="text"  name="PolicyTerm"   value="">
															</div>  			  				
														</div>
														<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Premium Funding </span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																<input type="radio" name="PremiumFunding" id="PremiumFunding1" value="Yes" > Yes
																
																<input type="radio" name="PremiumFunding" id="PremiumFunding1" value="No" > No
																
																<!-- <input required placeholder="Premium Funding*" class="input-cust-name" type="text"  name="Premium Funding"     value="<?php ?>"> -->
															</div>  			  				
														</div>
														
														
														
														
														<div class="w-100"></div>
														<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Type Of Loan</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																<input required placeholder="Type Of Loan*" class="input-cust-name" type="text"  name="TypeOfLoan"  value="">
															</div>  			  				
														</div>
			                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Plan Code</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																<input required placeholder="Plan Code*" class="input-cust-name" type="text"  name="PlanCode"   value="">
															</div>  			  				
														</div>
														
														<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">User Name</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																<input required placeholder="User Name*" class="input-cust-name" type="text"  name="UserName"   value="">
															</div>  			  				
														</div>
														
														
														
														
														<div class="w-100"></div>
														<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Policy Mod</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																<!--<input required placeholder="Policy Mod*" class="input-cust-name" type="text"  name="PolicyMod"  value=""> -->
																<input type="radio" name="PolicyMod" id="PolicyMod1" value="Single Premium" > Single Premium
																<input type="radio" name="PolicyMod" id="PolicyMod2" value="Regular Premium" > Regular Premium
															</div>  			  				
														</div>
			                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Policy Role</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																<!-- <input required placeholder="Policy Role*" class="input-cust-name" type="text"  name="PolicyRole"   value=""> -->
																
																<input type="radio" name="PolicyRole" id="PolicyRole1" value="Single Life" > Single Life
																<input type="radio" name="PolicyRole" id="PolicyRole2" value="Regular Premium" > Joint Life
															</div>  			  				
														</div>
														
														<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Secondary Ins DOB</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																<input required placeholder="SecondaryInsDOB*" class="input-cust-name" type="date"  name="SecondaryInsDOB"   value="">
															</div>  			  				
														</div>
														
														
														<div class="w-100"></div>
														<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Primary Gender</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
																<input required placeholder="Primary Gender*" class="input-cust-name" type="text"  name="PrimaryGender"  value="">
															</div>  			  				
														</div>
			                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 	<div style="margin-top: 0px;" class="col">
															   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Borrower State Code</span>
															</div>	
                											<div class="w-100"></div>
  													  		<div style="margin-left: 35px; margin-top: 8px;" class="col">
  																<input required placeholder="Borrower State Code*" class="input-cust-name" type="text"  name="BorrowerStateCode"   value="">
															</div>  			  				
														</div>
														
														
														
														
														     
														
													</div>
													
													<div style="margin-top: 20px;" class="row col-12 justify-content-center">
				<div >
					
					<input type="submit"  name="Submit" class="login100-form-btn" style="background-color: #25a6c6;">
			
				</div>		
			</div>
			
			</form>
													
													
										