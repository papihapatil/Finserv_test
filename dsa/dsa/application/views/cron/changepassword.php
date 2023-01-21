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
<form id="forgot_pass_reset_form" class="login100-form validate-form" action="http://localhost/dsa/dsa/index.php/Cron/response" method="POST">
	<div class="card-body">
	<h1>Reset Password</h1>
	<p class="text-muted"></p>


       <span>
	password should contain atleast one number and one special character
	</span>                    
	<div class="input-group mb-3">
	<div class="input-group-prepend"><span class="input-group-text">
	<svg class="c-icon">
	
	</svg></span></div>
		<input class="form-control" type="password" placeholder="Password" name="pass" id="password" required maxlength="20" minlength="8" oninput="maxLengthCheck(this)">
		<input hidden class="form-control" value="<?php echo $id?>" name="id" id="id" required maxlength="20" minlength="8" oninput="maxLengthCheck(this)">
		<input hidden class="form-control" value="<?php echo $type?>" name="type" id="type" required maxlength="20" minlength="8" oninput="maxLengthCheck(this)">
	</div>
	<div class="input-group mb-4">
	<div class="input-group-prepend"><span class="input-group-text">
	<svg class="c-icon">
	
	</svg></span></div>
	<input class="form-control" type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required maxlength="20" minlength="8" oninput="maxLengthCheck(this)">
	</div>
	<div class="row justify-content-center">
		<div class=" container-login100-form-btn">
			<button class="login100-form-btn btn btn-primary px-4">
				Save
			</button>
            
		</div>					
	</div>

	<div class="row justify-content-center">
		<div class=" container-login100-form-btn">
			<div id="loader" class="loader" style="margin-top:10px; display:none"></div>
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

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<script src="<?php base_url()?>/dsa/dsa/js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!--[if IE]><!-->
<!--<![endif]-->
</body>
</html>