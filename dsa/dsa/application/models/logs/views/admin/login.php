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
<title>Admin Login</title>

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
<form class="login100-form validate-form" action="<?php echo base_url()?>index.php/admin/logmein" method="POST">
	<div class="card-body">
	<h1>Login</h1>
	<p class="text-muted">Sign In to your account</p>

<?php if($error !='') {?> 						
		<div style="background-color: pink;" >
	    	<?php if($error !='') {?> <p style="font-size: 14px;"> <?php echo $error; } ?></p>
	    </div>						
	<?php } ?>	
	


	<div class="input-group mb-3">
	<div class="input-group-prepend"><span class="input-group-text">
	<svg class="c-icon">
	
	</svg></span></div>
	<input class="form-control" type="text" name="email" placeholder="Email" required>
	</div>
	<div class="input-group mb-4">
	<div class="input-group-prepend"><span class="input-group-text">
	<svg class="c-icon">
	
	</svg></span></div>
	<input class="form-control" type="password" placeholder="Password" name="pass" required>
	</div>
	<div class="row justify-content-center">
		<div class=" container-login100-form-btn">
			<button <?php $site = $this->session->userdata("SITE"); if($site=='finaleap') { echo "disabled";  } ?>  class="login100-form-btn btn btn-primary px-4">
				Login
			</button>
		</div>					
	</div>
	</div>
	</div>
	<div class="row card text-white py-5 d-md-down-none justify-content-center" style="width:44%">
		<div class="text-center justify-content-center">
			<img src="<?php echo base_url(); ?>images/Finserv_logo.png" style="width:90%;"/>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>
</form>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!-->
<!--<![endif]-->
</body>
</html>