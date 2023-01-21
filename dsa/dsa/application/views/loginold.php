<body style="background-color: #fcfcfc;">
<form id="login_form" style="margin-right: 40px; margin-left: 40px; margin-top: 20px;" action="<?php echo base_url()?>index.php/login/logmein" method="POST">
		<div class="row justify-content-center">
			
				<div class="shadow row col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12" style="background-color: white; border-radius: 20px; padding: 20px; margin-bottom: 100px;">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-0 col-0">
						<img class="img-login" src="<?php base_url()?>/dsa/dsa/images/loan.png">
					</div>	
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
						<span >
							<?php if($error !='') {?> 						
								<div class="alert alert-danger" role="alert">
							    	<?php if($error !='') {?> <p style="font-size: 14px;"> <?php echo $error; } ?></p>
							    </div>						
							<?php } ?>	
							<b style="text-align: left; font-size: 20px; color: black; margin-top: 10px;">Log In</b>
						</span>

						<div class="row" style="width: 100%; height: 50px;background-color: white; margin-top: 18px; margin-left: 8px;">
							<i style="font-size:18px;color: #afbcbf; margin-top: 16px;" class="fa fa-user"></i>
							<input placeholder="Email" type="text" name="email" id="email" style="margin-left: 15px; margin-right: 10px; width: 90%; color: black; font-size: 14px;" oninput="maxLengthCheck(this)" maxlength="60">
						</div>

						<hr style="margin: 0px;">
						<div class="row col-12 justify-content-center">
							<span style="margin-top: 12px; background-color: #efeded; color: black; border-radius: 50px; padding: 5px; font-size: 12px;">OR</span>
						</div>
						

						<div class="row" style="width: 100%; height: 50px;background-color: white; margin-top: 0px; margin-left: 8px;">
							<i style="font-size:18px;color: #afbcbf; margin-top: 16px;" class="fa fa-user"></i>
							<input placeholder="Mobile" type="number" name="mobile" id="mobile" style="margin-left: 15px; margin-right: 10px; width: 90%; color: black; font-size: 14px;" oninput="maxLengthCheck(this)" maxlength="10">
						</div>

						<hr style="margin: 0px;">

						<div class="row" style="width: 100%; height: 50px;background-color: white; margin-top: 15px; margin-left: 8px;">
							<i style="font-size:18px;color: #afbcbf; margin-top: 16px;" class="fa fa-lock"></i>
							<input required="true" placeholder="Password" type="password" name="pass" style="margin-left: 15px; margin-right: 10px; width: 90%; color: black; font-size: 14px;" >
						</div>

						<hr style="margin: 0px;">
						
						
					
						<div class="flex-sb-m w-full p-t-3 p-b-32" style="margin-top: 20px;">
							<div class="contact100-form-checkbox">
								<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
								<label class="label-checkbox100" for="ckb1">
									Remember me
								</label>
							</div>

							<div>
								<a href="<?php echo base_url();?>index.php/forgotpassword" class="txt1">
									Forgot Password?
								</a>
							</div>
						</div>

						<div class="container-login100-form-btn">
							<button class="login100-form-btn" style="background-color: #33b6f7">
								Login
							</button>
						</div>
						
						<div class="text-center p-t-46 p-b-20">
							<span class="txt2">
								<a href="<?php echo base_url();?>index.php/signup/screen_one"> or sign up </a>
							</span>
						</div>
					</div>	
				</div>		
		</div>									 													
	</form>		
</body>
