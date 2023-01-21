<body style="background-color: #f2f2f2; width: 100%;">
	<form id="signup_form" action="<?php echo base_url(); ?>index.php/signup/screen_one_save" method="POST">
		
		<div class="row col-12 justify-content-center">
			<div class="row col-8 shadow bg-white rounded margin-10 padding-15 justify-content-center">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Signup to continue</span>

				</div>
				<div class="row justify-content-center col-12">
					<span style="margin-bottom: 15px; font-size: 12px; color: #bfbbbb;">Welcome to Finaleap.</span>

				</div>
				
				<div style="margin-top: 0px;">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Iam signing up as *</span>
				</div>			

				<div style="margin-top: 5px; margin-left: 20px; margin-bottom: 20px; text-align: center;" class="row">
					<div id="payCC" class="floatBlock">
	                    <label style="font-size: 12px;" for="paymentCC"> <input id="dsaCC" name="userType" type="radio" value="DSA" />  DSA  </label>
	                </div>

	                <div id="payInvoice" class="floatBlock">
	                    <label style="font-size: 12px;" for="paymentInv"> <input id="customerInv" name="userType" type="radio" value="CUSTOMER" checked="true" /> CUSTOMER </label>
	                </div>	
				</div>			

				<div class="w-100"></div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="wrap-edit validate-input" data-validate = "Enter first name">
						<input required placeholder="FIRST NAME" class="input100" type="text" name="fn" oninput="maxLengthCheck(this)" maxlength="20">
						<span class="focus-input100"></span>						
					</div>

					<div class="wrap-edit validate-input" data-validate = "Enter last name">
						<input required placeholder="LAST NAME" class="input100" type="text" name="ln" oninput="maxLengthCheck(this)" maxlength="20">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-edit ">
						<input maxlength="10" minlength="10" required placeholder="MOBILE NUMBER" class="input100" type="text" name="mobile" id="mobile" pattern="[6-9]{1}[0-9]{9}" 
       					title="Please enter valid 10 digit phone number">
						
					</div>
	  			</div>	
	  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		  			<div class="wrap-edit validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input required placeholder="EMAIL-ID" class="input100" type="email" name="email" id="email" oninput="maxLengthCheck(this)" maxlength="60">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-edit validate-input" data-validate="Password is required">
						<input required placeholder="PASSWORD" class="input100" type="password" name="pass" oninput="maxLengthCheck(this)" maxlength="15" id="pass">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-edit validate-input" data-validate="Password is required">
						<input required placeholder="CONFIRM PASSWORD" class="input100" type="password" name="confirmpass" oninput="maxLengthCheck(this)" maxlength="15" id="confirmpass">
						<span class="focus-input100"></span>
					</div>

	  			</div>	  			
			</div>
		</div>	

		<div class="row col-12 justify-content-center">
			<div class="row col-8 shadow bg-white rounded margin-10 padding-15 justify-content-center">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<a href="<?php echo base_url();?>index.php/forgotpassword" class="txt1">
						Forgot Password?
					</a>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<button class="login100-form-btn">
						SIGNUP
					</button>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<span class="txt2">
						<a href="<?php echo base_url();?>index.php/login"> or LOGIN </a>
					</span>
				</div>
			</div>
		</div>
	</form>
	
</body>