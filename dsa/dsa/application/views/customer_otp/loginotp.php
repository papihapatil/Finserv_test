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
<form id="customer_otp" class="login100-form validate-form" action="<?php echo base_url()?>index.php/Customer_mobile_otp/logmein" method="POST">
	<div class="card-body">
	<h1>Login</h1>
	<p class="text-muted">Sign In to your account with</p>


    <div class="row" style="margin-left:10px; margin-bottom:10px;">
       
        <div style="margin-left: 20px; display:none" class="custom-control custom-switch ">				  
            <input type="checkbox" class="custom-control-input" id="logintype" name="resiperchk" checked>
            <label class="custom-control-label" for="logintype"></label>				  
        </div>
      
    </div>
                        
	<?php if($error !='') {?> 						
		<div class="alert alert-danger" role="alert">
	    	<?php if($error !='') {?> <p style="font-size: 14px;"> <?php echo $error; } ?></p>
	    </div>						
	<?php } ?>	

	<div class="input-group mb-3">
	<div class="input-group-prepend"><span class="input-group-text">
	<svg class="c-icon">
	
	</svg></span></div>
	<input class="form-control" type="text" name="email" id="email"  value="<?php echo $mobile; ?>" readonly  placeholder="Email / Mobile" required>
	
	<span id="error" style="color:red"></span>
	</div>
	<input class="form-control" type="text" name="UID" id="UID" placeholder="Email / Mobile" value='<?php if(!empty($id)){ echo $id; }?>' hidden>
	<div class="input-group mb-4">
	<div class="input-group-prepend"></div>
	
	</div>
	<div class="row justify-content-center">
		<div class=" container-login100-form-btn">
			<button class="login100-form-btn btn btn-primary px-4">
				Send OTP
			</button>
			
			
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

<!--[if IE]><!-->
<!--<![endif]-->
</body>
</htm>