<body style="background-color: #f2f2f2; width: 100%;">
		
	<div class="row justify-content-center">
		<div >
			<div >
				<form class="login100-form validate-form" action="<?php echo base_url(); ?>index.php/customer/customer_apply_for_loan_action" method="POST" id="cust_form_apply_for_loan">
					<span class="signup100-form-title p-b-43">						
						Apply For Loan
					</span>					 
								
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
						  <option value="Others">Others</option>
						</select>
					</div>																	

					<label class="padding-bottom-10">How Much Amount you want for Loan ?</label>					
					<div class="wrap-edit validate-input" >
						<input placeholder="e.g : 100000" class="input100" type="number" name="loan_amount" required>
						<span class="focus-input100"></span>
					</div>																							

					<label class="padding-bottom-10">For how many years you want this loan ?</label>					
					<div class="wrap-edit validate-input" >
						<input placeholder="e.g : 3 Years" class="input100" type="number" name="loan_duration" required>
						<span class="focus-input100"></span>
					</div>																													
								
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Apply For Loan
						</button>
					</div>
										
				</form>

			</div>
		</div>
	</div>
	
</body>
