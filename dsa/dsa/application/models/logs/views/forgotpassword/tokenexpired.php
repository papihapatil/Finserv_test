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
<form id="login_form" class="login100-form validate-form" action="<?php echo base_url()?>index.php/login/logmein" method="POST">
	<div class="card-body">
	<h1>Token Expired for password reset, please try to generate new link by clicking on forgot password button of login screen.</h1>
	<p class="text-muted"></p>
                        
	<div class="row justify-content-center">
		<div class=" container-login100-form-btn">
		<a href="<?php echo base_url();?>index.php/forgotpassword">
				<label class="login100-form-btn btn px-4" style="margin-top:20px;">
					GENERATE NEW LINK
				</label>  
			</a>          
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