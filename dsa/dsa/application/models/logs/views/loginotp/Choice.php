<!DOCTYPE html>

<html lang="en">
<head>
<!--<base href="./">-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta name="description" >
<meta name="author" >
<meta name="keyword" >
<title>Login</title>

<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-118965717-1');
</script></head>
<body class="c-app flex-row align-items-center">
<div class="container">

<div class="row justify-content-center">
<div class="col-md-8">
<div class="card-group">
<div class="card p-4">
<form id="login_form" class="login100-form validate-form" action="<?php echo base_url()?>index.php/Newlogin/logmein" method="POST">
	<div class="card-body" style="margin-top:25px;">
	
	



  
	<div class="row justify-content-center">
		<div class=" container-login100-form-btn">
			<a href="<?php echo base_url();?>index.php/Newlogin/login_by_otp" id="set_password" class="login100-form-btn btn btn-primary px-4" >
				Login by OTP
			</a>
			
			<a href="<?php echo base_url();?>index.php/Newlogin/Login_by_password" id="set_password" class="login100-form-btn btn btn-primary px-4" >
			
				 Set Password
			
			</a>
		</div>					
	</div>
	<div class="row justify-content-center">
		<div class=" container-login100-form-btn">
	  			
		</div>					
	</div>
	</div>
	</div>
	<div class="row card text-white py-5 d-md-down-none justify-content-center" style="width:44%">
		<div class="text-center justify-content-center">
			<img  src="<?php echo base_url()?>images/logo.png">
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>
</form>
<script>
 
</script>

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<script src="<?php base_url()?>/dsa/dsa/js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>