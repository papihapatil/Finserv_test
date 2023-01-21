<body style="background-color: #f2f2f2; width: 100%;">
		
	<div class="row justify-content-center">
		<div >
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<form id="verify_cus_otp" action="<?php echo base_url(); ?>index.php/front/mobile_otp_verify" method="POST">
					
						<span class="signup100-form-title p-b-43">
							<?php if($error !=' ') {?>
								<div class="alert alert-danger" role="alert">
							    	<?php echo validation_errors(); ?>
							    	 <p style="font-size: 14px;"> <?php echo $error;?></p>
							    </div>
							<?php } ?>	
							<br><br><span style="padding: 10px;">Verify OTP, sent on this <?php if($type=='on'){echo 'NUMBER';}else{ echo 'Email';} ?></span>
						</span>					 															
					

					<span class="signup100-form-title p-b-43">
						<b><?php echo $mobile?></b>
					
					</span>					 															

					<span class="signup100-form-title p-b-43">
						<p style="font-size: 12px;">DON'T GO BACK OR DON'T REFRESH SCREEN</p> 					
					</span>					 															
					
					<div class="wrap-edit validate-input" data-validate="OTP is required">
						<input placeholder="ENTER-OTP" class="input100" type="text" name="otp">
						<span class="focus-input100"></span>
					</div>					
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							VERIFY
						</button>
					</div>								
					</form>
												
			</div>
		</div>
	</div>
	<div style="margin-top: 10px;" class="container-login100-form-btn">
		<form  action="<?php echo base_url(); ?>index.php/front/resendOtp" method="POST" id="resend">
			<button style="background-color: #e8f2f1; color: teal" class="login100-form-btn">
				RESEND OTP
			</button>
		</form>
	</div>	
	

	<!-- Modal -->
<div class="modal fade" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>