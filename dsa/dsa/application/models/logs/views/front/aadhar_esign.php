<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
 
  $message = $this->session->flashdata('sucess');   if (isset($message)) {
		if($message=='sucess'){
			
				echo '<script> swal("success!", "Your Aadhar esign document Send On Your Mail Id Sucessfully", "success");</script>';
				$this->session->unset_userdata('sucess');	
              				
			 
		}			 
       
		}
    
	
	?>
	<?php
 
  $message = $this->session->flashdata('warning');   if (isset($message)) {
		
        echo '<script> swal("warning!", "'.$message.'", "warning");</script>';
		$this->session->unset_userdata('warning');
       
		}
    
	
	?>
	<?php
 
  $message = $this->session->userdata('check_payment');   if (isset($message)) {
		if($message==0){
        echo '<script>  swal({
							  title: "Payment Information",
							  text: "You have to pay '.$aadhar_esign_price.'Rs for Aadhar esign",
							  icon: "success",
							  buttons: true,
							  dangerMode: false,
							})
							.then((willDelete) => {
													 if (willDelete) {
														 location.href = "'.base_url("index.php/front/payment_getway_aadhar_esign").'";
													 }

                                                     
													 
												   else {
													 
													
												
												  }
												  });</script>';
		$this->session->unset_userdata('check_payment');}
       
		}
    
	
	?>
	
	
<header id="header" class="header">
	<div class="header-content">
		<div class="form-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2>Aadhar E-sign</h2>
						<h5>Works only if your mobile number is linked with your aadhar.</h5>
					</div> <!-- end of col -->
				</div> <!-- end of row -->
				<?php $message = $this->session->flashdata('sucess');   if (isset($message)) {?>
	
								
							
	              <?php 	 $this->session->unset_userdata('sucess');	 } ?>
                  <?php $message = $this->session->flashdata('warning');   if (isset($message)) {?>
	
								
							
	              <?php 	 $this->session->unset_userdata('warning');	 } ?>				  

				<div class="card border-light mb-3" style="max-width: 80rem;">

					<div class="card-body">

						<div class="row">
							<!-- end of col -->
							<div class="col-lg-12">
								<!-- Contact Form -->
								<form id="credit-form" action="<?= base_url('index.php/front/check_payment_details_aadhar_esign')?>" method="post"  enctype="multipart/form-data">
									<div class="row">
									
									</div>
									<div class="row">

										<div class="col-sm-4">
											<div class="form-group">
											
												<label for="">First Name</label>
												<input type="text"  name="fname" class="form-control" id="fname" placeholder="Enter" value="<?php if(isset($this->session->userdata['userdata']['fname'])){echo $this->session->userdata['userdata']['fname'];}?>" required>
												<div class="help-block with-errors"></div>
											</div>
										</div>

										<div class="col-sm-4">
											<div class="form-group">
												<label for="">Middle Name</label>
												<input type="text" name="mname" class="form-control" placeholder="Enter " id="mname"" >
												<div class="help-block with-errors"></div>
											</div>
										</div>

										<div class="col-sm-4">
											<div class="form-group">
												<label for="">Last Name</label>
												<input type="text" name="lname" class="form-control" placeholder="Enter" id="lname"  value="<?php if(isset($this->session->userdata['userdata']['lname'])){echo $this->session->userdata['userdata']['lname'];}?>" required>
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="">Email</label>
												<input type="email" name="email" class="form-control" id="email" 
												placeholder="example@gmail.com"  value="<?php if(isset($this->session->userdata['userdata']['email'])){echo $this->session->userdata['userdata']['email'];}?>" required>
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="">Mobile</label>
												<input  name="mobile" class="form-control" id="mobile"  maxlength="10"
												placeholder="1234567890" required type="text" pattern="[6-9]{1}[0-9]{9}" value="<?php if(isset($this->session->userdata['userdata']['mobile'])){echo $this->session->userdata['userdata']['mobile'];}?>">
												<div class="help-block with-errors"></div>
												<span id="sucess" style="color:green"></span>
												<span id="warning" style="color:red"></span>
												
											</div>
										</div>
										<div class="col-sm-5">
											<div class="form-group">
												<label for="">Select Documents</label>
											   <input type="file" name="files[]" multiple="multiple" class="form-control" required>
												<div class="help-block with-errors"></div>
												<span id="sucess" style="color:green"></span>
												<span id="warning" style="color:red"></span>
												<span>Support files : jpg | jpeg | png | gif | pdf</span>
												<span>Max size per File : 5 Mb</span>
											</div>
										</div>
									 
										
									  

									</div>
									

							
									<br>
									<div>
									 <p>Please select all files before submit</p>
									  <p>By clicking on submit you agree with <a href="<?php echo base_url('Terms_and_conditions_Aadhar_E-sign_consent.pdf')?>" style="color:blue;" target="_blank" >Terms & Conditions</a><p>
									</div>
									
									<div class="form-group text-center">
											<input type="submit" class="btn btn-lg btn-primary col-3 " id="btn-credit">
									</div>
									
									<div class="form-message">
										<div id="cmsgSubmit" class="h3 text-center hidden"></div>
									</div>
								</form>
								
								<!-- end of contact form -->

							</div> 
						</div><!-- end of col -->
					</div> 
				</div>
			</div><!-- end of row -->
		</div> <!-- end of container -->
	</div>
</div> <!-- end of header-content -->
</header>




<script src="<?php  base_url()?>/dsa/dsa/js/jquery.min.js"></script>


<script src="<?php  base_url()?>/dsa/dsa/js/main.js"></script>





<script type="text/javascript">
	$("#resi_pincode").bind("change paste keyup", function() {

		if($(this).val()!=''){
			if($(this).val().length == 6){
				var pincode_s = $(this).val();
				if(window.location.host.includes("http"))url = window.location.host + "/dsa/dsa/index.php/customer/get_address_by_pincode";
				else url = window.location.protocol+"//"+window.location.host + "/dsa/dsa/index.php/customer/get_address_by_pincode";            
				$.ajax({
					type: "POST",
					url: url,
					data: '{ "pincode": "'+pincode_s+'"}',
					contentType: "application/json; charset=UTF-8",
					success: function (response) {
						if(response!=''){
							var data = JSON.parse(response);
							if(data.data){
								if(data.data.hasOwnProperty("statename")){
									$('#resi_state').val(data.data.statename);
									$('#resi_district').val(data.data.Districtname);
									$('#resi_state_view').val(data.data.statename);
									$('#resi_district_view').val(data.data.Districtname);
									$('#resi_city').val(data.data.City);  
								}else {
									$('#resi_state').val("");
									$('#resi_district').val("");
									$('#resi_state_view').val("");
									$('#resi_district_view').val("");
									$('#resi_city').val("");
								}                      
							}else {
								$('#resi_state').val("");
								$('#resi_district').val("");
								$('#resi_state_view').val("");
								$('#resi_district_view').val("");
								$('#resi_city').val("");
							}                    
						}
					}
				});
			}
		}
	});
	$( "#send_otp" ).click(function() 
	{
		 var mobileno = $('#mobile').val();
		 
							if( $(this).hasClass('disabled') )
							{
								e.preventDefault();
								
								
							}
							else{
									 $.ajax({
											type:'POST',
											url:'<?php echo base_url("index.php/front/sendsms"); ?>',
											data:{'mobileno':mobileno},
											success:function(data){
												var obj =JSON.parse(data);
												if(obj.status=='1')
												{
													swal("success!", "OTP Send Sucessfully", "success");
													$('#send_otp').hide();
													$('#resend_otp').show();
												}
												else
												{
													swal("warning!", "Something get Wrong", "warning");
												}
											}
										});
							}
	}
	);
	$( "#resend_otp" ).click(function() 
	{
		 var mobileno = $('#mobile').val();
		 $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/front/sendsms"); ?>',
                data:{'mobileno':mobileno},
                success:function(data){
					var obj =JSON.parse(data);
					if(obj.status=='1')
					{
						swal("success!", "OTP Send Sucessfully", "success");
						
					}
					else
					{
						swal("warning!", "Something get Wrong", "warning");
					}
                }
            });
	}
	);
	$( "#verify_otp" ).click(function() 
	{
		 var otp = $('#otp').val();
		 	if( $(this).hasClass('disabled') )
							{
								e.preventDefault();
								
								
							}
							else{
									 $.ajax({
											type:'POST',
											url:'<?php echo base_url("index.php/front/mobile_otp_verify"); ?>',
											data:{'otp':otp},
											success:function(data){
												var obj =JSON.parse(data);
												if(obj.status== 1)
												{
													swal("success!", "OTP Verified Sucessfully", "success");
													$('#btn-credit').removeClass('disabled');
													$('#verify_otp_status').val('true');
												}
												else
												{
													swal("warning!", "Wrong OTP Enter", "warning");
													$('#verify_otp_status').val('false');
												}
											}
										});
							}
	}
	);
	$('#btn-credit').on('click',function(e)
                        {
							if( $(this).hasClass('disabled') )
							{
								e.preventDefault();
								swal("Warning!", "Please Verify OTP", "warning");
								
							}
							
						}
					 );
</script>
