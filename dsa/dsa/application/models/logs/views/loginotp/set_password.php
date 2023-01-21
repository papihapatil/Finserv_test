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
<title>Set Password</title>

<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>adminn/css/loader.css" rel="stylesheet">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-118965717-1');
</script></head>


<body class="c-app flex-row align-items-center">
<?php
 
  $message = $this->session->flashdata('error');   if (isset($message)) {
		
        echo '<script> swal("warning!", "'.$message.'", "warning");</script>';
	 $this->session->unset_userdata('error');	
       
		}
  
	
	?>
<div class="container">

<div class="row justify-content-center">
<div class="col-md-8">
<div class="card-group">
<div class="card p-4">
<form id="reset_password_1" class="" action="<?php echo base_url()?>index.php/Newlogin/set_password" method="POST">
	<div class="card-body">
	<h1>Set Password</h1>
	<p class="text-muted">Select option to reset your password</p>


    <div class="row" style="margin-left:10px; margin-bottom:10px;">
        <div>Email-Id</div>
        <div style="margin-left: 20px;" class="custom-control custom-switch ">				  
            <input type="checkbox" class="custom-control-input" id="forgotlogintype" name="resiperchk">
            <label class="custom-control-label" for="forgotlogintype"></label>				  
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">Mobile</div>
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
	<input class="form-control" type="text" name="email" id="email" placeholder="Email / Mobile" required>
	</div>
	
	<div class="row justify-content-center">
		<div class=" container-login100-form-btn">
			<button class="login100-form-btn btn btn-primary px-4">
				Submit
			</button>            
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


<!--[if IE]><!-->
<!--<![endif]-->
</body>
</html>