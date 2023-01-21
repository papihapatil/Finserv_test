<!DOCTYPE html>

<html lang="en">
<head>
<!--<base href="./">-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta name="description" content="Finaleap">
<meta name="author" content="Łukasz Holeczek">
<meta name="keyword" content="Finaleap">
<title>Finaleap Admin</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/fontawesome-all.css" rel="stylesheet">
	
    <link href="<?php echo base_url()?>assets/css/swiper.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-118965717-1');
</script>
</head>
<style>
	.my_div{
		padding:5px;
		margin:5%;
		margin-bottom:1%;
		margin-top:1%;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	
</style>
<?php
 
  $message = $this->session->flashdata('sucess');   if (isset($message)) {
		if($message=='sucess'){
			$credit_score=$this->session->userdata('credit_score');
			$micro =$this->session->userdata('micro');
			$credit=$this->session->userdata('credit');
			 if (isset($credit_score))
			 {
				echo '<script> swal("success!", "Your Credit Microfinance Risk Score is '.$credit_score.' \n Combined Credit Bureau Reoport Send On Your Mail Id Sucessfully", "success");</script>';
				$this->session->unset_userdata('sucess');	
                $this->session->unset_userdata('credit_score');				
			 }
			 else if(isset(	$micro))
			 {
				echo '<script> swal("success!", "Your Credit Microfinance Risk Score is '.$micro.' and Credit Score is '.$credit.' \n Combined Credit Bureau Reoport Send On Your Mail Id Sucessfully", "success");</script>';
				$this->session->unset_userdata('sucess');	
                $this->session->unset_userdata('credit_score');	 
			 }
		}	
       else if(	$message=='Consumer not found in bureau')
			   {
				   $credit_score=$this->session->userdata('credit_score');
				   echo '<script> swal("success!", "Your Microfinance Risk Score is '.$credit_score.' \n Consumer not found in Microfinance Risk bureau", "success");</script>';
						$this->session->unset_userdata('sucess');	
						$this->session->unset_userdata('credit_score');		
			   }
       
		}
    
	
	?>
	<?php
 
  $message = $this->session->flashdata('sucess_not_Found');   if (isset($message)) {
		if($message=='Consumer not found in bureau'){
			$credit_score=$this->session->userdata('credit_score');
			 if (isset($credit_score))
			 {
				echo '<script> swal("success!", "Your Microfinance Risk Score is '.$credit_score.' \n Consumer not found in Microfinance Risk bureau, "success");</script>';
				$this->session->unset_userdata('sucess_not_Found');	
                $this->session->unset_userdata('credit_score');				
			 }
		}
		else if($message=='Consumer not found in both retail and microfince bureau'){
			$credit_score=$this->session->userdata('credit_score');
			 if (isset($credit_score))
			 {
				echo '<script> swal("success!", " Consumer not found in both Microfinance and Credit bureau ., "success");</script>';
				$this->session->unset_userdata('sucess_not_Found');	
                $this->session->unset_userdata('credit_score');				
			 }
		}
		else if($message=='Consumer not found in Retail bureau'){
			$credit_score=$this->session->userdata('credit_score');
			 if (isset($credit_score))
			 {
				echo '<script> swal("success!", "Consumer not found in Credit bureau. "success");</script>';
				$this->session->unset_userdata('sucess_not_Found');	
                $this->session->unset_userdata('credit_score');				
			 }
		}				 
       
		}
    
	
	?>
	<?php
 
  $message = $this->session->flashdata('warning');  
   if (isset($message)) {
		
        echo '<script> swal("warning!", "'.$message.'", "warning");</script>';
		$this->session->unset_userdata('warning');
       
		}
    
	
	?>
<body class="c-app">
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
<img src="<?php echo base_url(); ?>images/logo.png"/>

</div>
<ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/Idccr_user_login">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-arrow-circle-left" style="margin-right: 20px;"></i>	
		</svg> Dashbord</a>
	</li>	
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/IDCCR_bureau_reports">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-arrow-circle-left" style="margin-right: 20px;"></i>	
		</svg> Bureau Reports</a>
	</li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/IDCCR_login">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-arrow-circle-left" style="margin-right: 20px;"></i>	
		</svg> Logout</a>
	</li>
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-unfoldable"></button>
</div>

<div class="c-wrapper">
<header class="c-header c-header-light c-header-fixed">
<button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
	<i class="fa fa-bars"></i>
</button><a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
<svg width="118" height="46" alt="CoreUI Logo">
<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
</svg></a>
<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
	<i class="fa fa-bars"></i>
</button>

<ul class="c-header-nav mfs-auto">
<li class="c-header-nav-item px-3 c-d-legacy-none">
<button class="c-class-toggler c-header-nav-btn" type="button" id="header-tooltip" data-target="body" data-class="c-dark-theme" data-toggle="c-tooltip" data-placement="bottom" title="Toggle Light/Dark Mode">
<svg class="c-icon c-d-dark-none">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-moon"></use>
</svg>
<svg class="c-icon c-d-default-none">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-sun"></use>
</svg>
</button>
</li>
</ul>
<ul class="c-header-nav">

<li class="c-header-nav-item dropdown d-md-down-none mx-2">
		<svg class="c-sidebar-nav-icon"></svg>Hi , <?php if(isset($user_details)) echo $user_details->User_name ;?>
</li>
<li class="c-header-nav-item dropdown d-md-down-none mx-2">
	<a href="<?php echo base_url();?>index.php/admin/IDCCR_login">
	 Logout</a>
</li>

<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
<svg class="c-icon c-icon-lg">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
</svg>
</button>
</ul>
</header>

<div class="c-body">
<main class="c-main">
<div class="container-fluid">
	
<?php if(isset($error)) { if($error !='') {?> 						
		<div class="my_div alert-danger" id="showOrHide"><center><br>
	    	<?php if($error !='') {?> <p style="font-size: 17px;"> <?php echo $error; } ?></p>
			<button type="button" class="btn btn-outline-danger" onclick="showOrHideDiv()">OK</button>
			</center>
	    </div>						
<?php } }
	else if(isset($success)){ if($success !='') { ?>
		<div class="my_div alert-success" id="showOrHide"><center><br>
	    	<?php if($success !='') {?> <p style="font-size: 17px;"> <?php echo $success; } ?></p>
			<button type="button" class="btn btn-outline-success" onclick="showOrHideDiv()">OK</button>
			</center>
		</div>	
<?php
		 }
	} ?>	
<div class="row">
	


			
						  

				<div class="card border-light mb-3" style="max-width: 100rem;">

					<div class="card-body">

						<div class="row">
							<!-- end of col -->
							<div class="col-lg-12">
								<!-- Contact Form -->
								<form id="credit-form" action="<?= base_url('index.php/admin/Combined_credit_bureau_for_IDCCR_Users')?>" method="post">
									<div class="row">

										<div class="col-sm-4">
											<div class="form-group">
											
												<label for="">First Name</label>
												<input type="text"  name="fname" class="form-control" id="fname" placeholder="Enter" value="<?php if(isset($this->session->userdata['userdata']['fname'])){echo $this->session->userdata['userdata']['fname'];} else if (!empty($customer_data)) { echo $customer_data->fname;}?>" required>
												<div class="help-block with-errors"></div>
											</div>
										</div>

										<div class="col-sm-4">
											<div class="form-group">
												<label for="">Middle Name</label>
												<input type="text" name="mname" class="form-control" placeholder="Enter " id="mname" value="<?php if (!empty($customer_data)) { echo $customer_data->mname;}?>">
												<div class="help-block with-errors"></div>
											</div>
										</div>

										<div class="col-sm-4">
											<div class="form-group">
												<label for="">Last Name</label>
												<input type="text" name="lname" class="form-control" placeholder="Enter" id="lname"  value="<?php if(isset($this->session->userdata['userdata']['lname'])){echo $this->session->userdata['userdata']['lname'];} else if (!empty($customer_data)) { echo $customer_data->lname;}?>" required>
												<div class="help-block with-errors"></div>
											</div>
										</div>

										<div class="col-sm-4">
											<div class="form-group">
												<label for="">Gender</label>
												<select name="gender" class="form-control"   required>
													<option value="">Select Gender</option>
													<option value="male" <?php if(isset($this->session->userdata['userdata']['gender'])){if($this->session->userdata['userdata']['gender']=='male'){echo 'selected';}}else if(!empty($customer_data)){ if ($customer_data->gender == 'male') echo ' selected="selected"';}?>>Male</option>
													<option value="female" <?php if(isset($this->session->userdata['userdata']['gender'])){if($this->session->userdata['userdata']['gender']=='female'){echo 'selected';}}else if(!empty($customer_data)){ if ($customer_data->gender == 'female') echo ' selected="selected"';}?>>female</option>
												</select>

												<div class="help-block with-errors"></div>

											</div>
										</div>

										<div class="col-sm-4">
											<div class="form-group">
												<label for="">Email</label>
												<input type="email" name="email" class="form-control" id="email" 
												placeholder="example@gmail.com"  value="<?php if(isset($this->session->userdata['userdata']['email'])){echo $this->session->userdata['userdata']['email'];}  else if (!empty($customer_data)) { echo $customer_data->email;}?>" required>
												<div class="help-block with-errors"></div>
											</div>
										</div>
     									<div class="col-sm-3">
											<div class="form-group">

												<label for="">Date Of Birth</label>
											<input type='date' id='dob' name='dob' required class="form-control" value="<?php if(isset($this->session->userdata['userdata']['dob'])){echo $this->session->userdata['userdata']['dob'];} else if (!empty($customer_data)) { echo $customer_data->dob;}?>">
												<div class="help-block with-errors"></div>
											</div>
										</div>
									
									
										<div class="col-sm-6">
											<div class="form-group">
												<label for="">Full Address</label>
												<input type="text" name="address1" class="form-control" id="address1" 
												placeholder="Enter Address Line 1" required value="<?php if(isset($this->session->userdata['userdata']['address1'])){echo $this->session->userdata['userdata']['address1'];} else if (!empty($customer_data)) { echo $customer_data->address1;}?>">
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="col-sm-3"></div><div class="col-sm-3"></div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="">ID Type 1</label>
												<select name="ID_type" class="form-control"   required>
													<option value="">Select ID type</option>
													<option value="T" <?php if(isset($this->session->userdata['userdata']['ID_type'])){if($this->session->userdata['userdata']['ID_type']=='T'){echo 'selected';}}else if(!empty($customer_data)){ if ($customer_data->ID_type == 'T') echo ' selected="selected"';}?>>Pan Card</option>
													<option value="V" <?php if(isset($this->session->userdata['userdata']['ID_type'])){if($this->session->userdata['userdata']['ID_type']=='V'){echo 'selected';}}else if(!empty($customer_data)){ if ($customer_data->ID_type == 'V') echo ' selected="selected"';}?>>Voter ID</option>
													<option value="P" <?php if(isset($this->session->userdata['userdata']['ID_type'])){if($this->session->userdata['userdata']['ID_type']=='P'){echo 'selected';}}else if(!empty($customer_data)){ if ($customer_data->ID_type == 'P') echo ' selected="selected"';}?>>Passport ID</option>
													<option value="M" <?php if(isset($this->session->userdata['userdata']['ID_type'])){if($this->session->userdata['userdata']['ID_type']=='M'){echo 'selected';}}else if(!empty($customer_data)){ if ($customer_data->ID_type == 'M') echo ' selected="selected"';}?>>Aadhar ID Card</option>
												</select>
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="">ID Number</label>
												<input type="text" name="pan" class="form-control" id="pan" placeholder="Enter ID Number"  required  value="<?php if(isset($this->session->userdata['userdata']['pan_number'])){echo $this->session->userdata['userdata']['pan_number'];} else if (!empty($customer_data)) { echo $customer_data->pan_number;}?>">
											    <div class="help-block with-errors"></div>
											</div>
										</div>
										

										<div class="col-sm-3">
											<div class="form-group">
												<label for="">ID Type 2</label>
												<select name="ID_type2" class="form-control"   required>
													<option value="">Select ID type</option>
													<option value="T" <?php if(isset($this->session->userdata['userdata']['ID_type2'])){if($this->session->userdata['userdata']['ID_type2']=='T'){echo 'selected';}} else if(!empty($customer_data)){ if ($customer_data->ID_type_2 == 'T') echo ' selected="selected"';}?>>Pan Card</option>
													<option value="V" <?php if(isset($this->session->userdata['userdata']['ID_type2'])){if($this->session->userdata['userdata']['ID_type2']=='V'){echo 'selected';}}else if(!empty($customer_data)){ if ($customer_data->ID_type_2 == 'V') echo ' selected="selected"';}?>>Voter ID</option>
													<option value="P" <?php if(isset($this->session->userdata['userdata']['ID_type2'])){if($this->session->userdata['userdata']['ID_type2']=='P'){echo 'selected';}}else if(!empty($customer_data)){ if ($customer_data->ID_type_2 == 'P') echo ' selected="selected"';}?>>Passport ID</option>
													<option value="M" <?php if(isset($this->session->userdata['userdata']['ID_type2'])){if($this->session->userdata['userdata']['ID_type2']=='M'){echo 'selected';}}else if(!empty($customer_data)){ if ($customer_data->ID_type_2 == 'M') echo ' selected="selected"';}?>>Aadhar ID Card</option>
												</select>
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="">ID Number</label>
												<input type="text" name="pan2" class="form-control"  placeholder="Enter ID Number"  required  value="<?php if(isset($this->session->userdata['userdata']['pan_number2'])){echo $this->session->userdata['userdata']['pan_number2'];} else if (!empty($customer_data)) { echo $customer_data->ID_2_number;}?>">
											    <div class="help-block with-errors"></div>
											</div>
										</div>

										<div class="col-sm-3">
											<div class="form-group">
												<label for="">Pincode</label>
												<input type="number" name="pincode" class="form-control" id="resi_pincode" minlength="6" oninput="maxLengthCheck(this)"  maxlength="6" placeholder="123456" required  value="<?php if(isset($this->session->userdata['userdata']['pincode'])){echo $this->session->userdata['userdata']['pincode'];} else if (!empty($customer_data)) { echo $customer_data->pincode;}?>">
												<div class="help-block with-errors"></div>
											</div>
										</div>


										<div class="col-sm-3">
											<div class="form-group">
												<label for="">State</label>
												<input type="text" readonly id="resi_state_view" name="state" class="form-control" 
												placeholder="State"  required value="<?php if(isset($this->session->userdata['userdata']['state'])){echo $this->session->userdata['userdata']['state'];}?>">
												<div class="help-block with-errors"></div>
											</div>
										</div>

										<div class="col-sm-3">
											<div class="form-group">
												<label for="">District</label>
												<input type="text" readonly id="resi_district_view" name="district" class="form-control"  placeholder="District" required value="<?php if(isset($this->session->userdata['userdata']['district'])){echo $this->session->userdata['userdata']['district'];} else if (!empty($customer_data)) { echo $customer_data->district;}?>">
												<div class="help-block with-errors"></div>
											</div>
										</div>

										<div class="col-sm-3">
											<div class="form-group">
												<label for="">City</label>
												<input type="text" readonly id="resi_city" name="city" class="form-control" placeholder="City"  required value="<?php if(isset($this->session->userdata['userdata']['city'])){echo $this->session->userdata['userdata']['city'];} else if (!empty($customer_data)) { echo $customer_data->city;}?>">
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="">Mobile</label>
												<input  name="mobile" class="form-control" id="mobile"  maxlength="10"
												placeholder="1234567890" required type="text" pattern="[6-9]{1}[0-9]{9}" value="<?php if(isset($this->session->userdata['userdata']['mobile'])){echo $this->session->userdata['userdata']['mobile'];} else if (!empty($customer_data)) { echo $customer_data->mobile;}?>">
												<div class="help-block with-errors"></div>
												<span id="sucess" style="color:green"></span>
												<span id="warning" style="color:red"></span>
												
											</div>
										</div>
									    <div class="col-sm-3">
											<div class="form-group">
											<label for=""> &nbsp;</label>
												<a class="btn btn-success form-control" id="send_otp" style="color:white;" role="button" >Send OTP</a>
												 <a class="btn btn-success form-control" id="resend_otp" style="color:white; display:none;" role="button">Resend OTP</a>
												 <input type="number" value=0 id="resend_count" hidden>
					
				                               	<div id= "demo"  style="display:none;"></div>
												</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="">Enter OTP</label>
												<input  name="otp" class="form-control" id="otp">
												<div class="help-block with-errors"></div>
												<span id="sucess" style="color:green"></span>
												<span id="warning" style="color:red"></span>
												<input  name="verify_otp_status" class="form-control" id="verify_otp_status" value="<?php if(isset($this->session->userdata['userdata']['verify_otp'])){echo $this->session->userdata['userdata']['verify_otp'];}?>" hidden>
												<div class="help-block with-errors" ></div>
											</div>
										</div>
									    <div class="col-sm-3">
											<div class="form-group">
											<label for=""> &nbsp;</label>
												<a class="btn btn-success form-control " id="verify_otp" style="color:white;" role="button" >verify OTP</a>
										    </div>
										</div>

									</div>
									<input hidden  name="Idccr_user_email"  value="<?php if(isset($user_details)){echo $user_details->Email;}?>">
									<input hidden  name="Idccr_user_branch"  value="<?php if(isset($user_details)){echo $user_details->Branch_name;}?>">
											
		

									
									<div class="form-group checkbox">
										<input type="checkbox" name="cterms" id="cterms" value="Agreed-to-Terms" required> I give my consent to request my Credit bureau score and i agree to <a href="<?php echo base_url();?>Finaleap-Terms_and_conditions _Credit_bureau_Consent.pdf" target='_blank'>Terms Conditions</a> 
										<div class="help-block with-errors"></div>
									</div> 
									<br>
									<?php if(isset($this->session->userdata['userdata']['verify_otp'])){if($this->session->userdata['userdata']['verify_otp']=='true'){?>
									<div class="form-group text-center">
										<input type="submit" class="btn btn-lg btn-primary col-3 " id="btn-credit">
									</div>
									<?php }} else {?>
									<div class="form-group text-center">
										<input type="submit" class="btn btn-lg btn-primary col-3 disabled" id="btn-credit">
									</div>
									<?php } ?>
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





</div>

</main>
</div>
<footer class="c-footer">
<div>Copyright © 2020 Finaleap.</div>
<div class="mfs-auto">Powered by Finaleap</div>
</footer>
</div>
</body>
</html>

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
		 if(mobileno=='')
		 {
			 swal("warning!", "Please enter Mobile Number", "warning");
			 exit;
		 }
		 
							if( $(this).hasClass('disabled') )
							{
								e.preventDefault();
								
								
							}
							else{
									 $.ajax({
											type:'POST',
											url:'<?php echo base_url("index.php/front/verify_send_otp"); ?>',
											data:{'mobileno':mobileno},
											success:function(data){
												var obj =JSON.parse(data);
												if(obj.status==1)
												{
													
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
																//$('#resend_otp').show();
															}
															else
															{
																swal("warning!", "Something get Wrong", "warning");
																}
														}
													});
													
												}
												else
												{	
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
																//$('#resend_otp').show();
															}
															else
															{
																swal("warning!", "Something get Wrong", "warning");
																}
														}
													});
												}

											}
										});
							}
							Date.prototype.add20minutes = function(){
		return this.setMinutes(this.getMinutes() + 3);
		 //return this.setSeconds(this.getMinutes() + 1);
								//return this.setSeconds( this.getSeconds() + 180 );
									}
								var d = new Date();
								var a=d.add20minutes(); 
								var countDownDate = new Date(a);
								//alert(countDownDate.getHours() + " hrs"+' '+countDownDate.getMinutes() + " min"+' '+countDownDate.getSeconds() + " sec");
								var x = setInterval(function() {

							// Get today's date and time
							var now = new Date().getTime();
								
							// Find the distance between now and the count down date
							var distance = countDownDate - now;
								
							// Time calculations for days, hours, minutes and seconds
							var days = Math.floor(distance / (1000 * 60 * 60 * 24));
							var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
							var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
							var seconds = Math.floor((distance % (1000 * 60)) / 1000);
								
							// Output the result in an element with id="demo"
						
							$("#demo").css({"color":"red","display":"block","font-size":"15px"});
							document.getElementById("demo").innerHTML =  minutes + "m " + seconds + "s "+ " To Resend OTP";
								
							// If the count down is over, write some text 
							if (distance <= 0) {
								clearInterval(x);
								$('#resend_otp').show();
								$('#send_otp').hide();
								document.getElementById("demo").style = "display:none";
							}
							}, 1000);
	}
	);
	$( "#resend_otp" ).click(function() 
	{
		var resend_count=$('#resend_count').val();
		 
		 
		
		 if (resend_count >= 3)
		 {
			swal("warning!", "You have Already Send OTP 3 Times, Please Try After Some Time ", "warning");
			exit;
		 }
		 resend_count=parseInt(resend_count)+1;
		 var mobileno = $('#mobile').val();
		 $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/front/sendsms"); ?>',
                data:{'mobileno':mobileno},
                success:function(data){
					var obj =JSON.parse(data);
					if(obj.status=='1')
					{
						$('#resend_count').val(resend_count);	
						$('#resend_otp').hide();
						swal("success!", "OTP Send Sucessfully", "success");
						
					}
					else
					{
						swal("warning!", "Something get Wrong", "warning");
					}
                }
            });
			Date.prototype.add20minutes = function(){
		return this.setMinutes(this.getMinutes() + 3);
		 //return this.setSeconds(this.getMinutes() + 1);
								//return this.setSeconds( this.getSeconds() + 180 );
									}
								var d = new Date();
								var a=d.add20minutes(); 
								var countDownDate = new Date(a);
								//alert(countDownDate.getHours() + " hrs"+' '+countDownDate.getMinutes() + " min"+' '+countDownDate.getSeconds() + " sec");
								var x = setInterval(function() {

							// Get today's date and time
							var now = new Date().getTime();
								
							// Find the distance between now and the count down date
							var distance = countDownDate - now;
								
							// Time calculations for days, hours, minutes and seconds
							var days = Math.floor(distance / (1000 * 60 * 60 * 24));
							var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
							var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
							var seconds = Math.floor((distance % (1000 * 60)) / 1000);
								
							// Output the result in an element with id="demo"
							
							$("#demo").css({"color":"red","display":"block","font-size":"15px"});
							document.getElementById("demo").innerHTML =  minutes + "m " + seconds + "s "+ " To Resend OTP";
								
							// If the count down is over, write some text 
							if (distance <= 0) {
								clearInterval(x);
								$('#resend_otp').show();
								
								document.getElementById("demo").style = "display:none";
							}
							}, 1000);
	}
	);
	$( "#verify_otp" ).click(function() 
	{
		 var otp = $('#otp').val();
		 if(otp== ' '||otp== '' )
		 {
			swal("warning!", "Please Enter OTP ", "warning");
			exit;
		 }
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
<script>
   function showOrHideDiv() {
      var v = document.getElementById("showOrHide");
      v.style.display = "none";
      
   }
</script>
    <!-- Scripts -->
  
    <script src="<?php echo base_url()?>assets/js/scripts.js"></script> <!-- Custom scripts -->
	  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	  <script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>