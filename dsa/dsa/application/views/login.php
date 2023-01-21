<!DOCTYPE html>

<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta name="description" >
<meta name="author" >
<meta name="keyword" >
<title>Login</title>

<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-118965717-1');
</script>
<style>
.password {
	padding: 8px;
	border: 0;
	width: 200px;
}
.password:focus {
	outline: 0;
}
span {
	float: right;
	background:#e8f0fe;
	cursor: pointer;
	padding: 6.5px;
}
</style>
</head>
<body class="c-app flex-row align-items-center">
<div class="container">

<div class="row justify-content-center">
<div class="col-md-8">
<div class="card-group">
<div class="card p-4">
<form id="login_form" class="login100-form validate-form" action="<?php echo base_url()?>index.php/login/logmein" method="POST">
	<div class="card-body">
	<h3 style="color:#002650 ">Login To Finaleap Finserv</h3>
	<p class="text-muted">Sign In to your account with</p>

	<br>

    <div class="row" style="margin-left:10px; margin-bottom:10px;">
        <div>Email-Id</div>
        <div style="margin-left: 20px;" class="custom-control custom-switch ">				  
            <input type="checkbox" class="custom-control-input" id="logintype" name="resiperchk">
            <label class="custom-control-label" for="logintype"></label>				  
        </div>
        <div style="margin-right:10px;">Mobile</div>
		
    </div>
          <?php if($error !='') {?> 						
		<div style="background-color: pink;" >
	    	<?php if($error !='') {?> <p style="font-size: 14px;"> <?php echo $error; } ?></p>
	    </div>						
	<?php } ?>	              
	

	<div class="input-group mb-3">
	<div class="input-group-prepend"><span class="input-group-text">
	<svg class="c-icon">
	
	</svg></span></div>
	<input class="form-control" type="text" name="email" id="email" placeholder="Email / Mobile" required>
	</div>
	<div class="input-group mb-4">
	<div class="input-group-prepend"><span class="input-group-text">
	<svg class="c-icon">
	
	</svg></span></div>
	<input class="form-control password" type="password" placeholder="Password" name="pass" id="password"  required />
	  <span onclick="togglePass()"><i class="fa fa-eye-slash"></i></span>
	</div>
	<div class="row justify-content-center">
		<div class=" container-login100-form-btn">
			<button <?php $site = $this->session->userdata("SITE"); if($site=='finaleap') { echo "disabled";  } ?> class="login100-form-btn btn btn-primary px-4">
				Login 
			</button>
		</div>					
	</div>
	<div class="row justify-content-center">
		<div class=" container-login100-form-btn">
		<a href="<?php echo base_url();?>index.php/forgotpassword">
				<label class="login100-form-btn btn px-4" style="margin-top:20px;">
					Forgot Password
				</label>  
			</a>    
          		
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
<script>
const passwordEl = document.querySelector(".password");
const eyeButton = document.querySelector(".fa");
let isPass = true;
function togglePass() {
    if (isPass) {
        passwordEl.setAttribute("type", "text");
        eyeButton.classList.remove("fa-eye-slash");
        eyeButton.classList.add("fa-eye");
        isPass = false;
    } else {
        passwordEl.setAttribute("type", "password");
        eyeButton.classList.remove("fa-eye");
        eyeButton.classList.add("fa-eye-slash");
        isPass = true;
    }
}
</script>
<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<script src="<?php base_url()?>/dsa/dsa/js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
