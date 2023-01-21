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
<title>Score Fetching Error</title>

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
	
	<h1>Problem Found</h1>
	<p class="text-muted">Credit score fetching issue</p>
	  <?php if($error !='') {?> <p style="font-size: 14px;"> <?php echo $error; } ?></p>	

	<?php if($this->session->userdata("error_code") && ($this->session->userdata("score_error_desc")))
	{ 
	$error_code=$this->session->userdata("error_code"); $score_error_desc=$this->session->userdata("score_error_desc"); 
	
	
	if($error_code>='E0401' && $error_code<='E0420') { ?>
	<h5> Currently the System is Down Do you want to Apply For Loan ?</h5>
	<div class="row justify-content-center">
		<div class=" container-login100-form-btn">
			<a href="<?php echo base_url();?>index.php/customer/customer_apply_for_loan_next?UID=<?php echo $this->session->userdata('UID'); ?>">
				<label class="login100-form-btn btn btn-primary px-4" style="margin-left:10px; margin-top:6px;">
					YES
				</label>
			</a>
            <a href="<?php echo base_url();?>index.php/signup/screen_one?UID=<?php echo $this->session->userdata('UID'); ?>">
                <label class="login100-form-btn btn btn-primary px-4" style="margin-left:10px; margin-top:6px;">
                    NO, I dont want loan
                </label>
            </a>
		</div>					
	</div>
	<?php } else if($error_code ==00 && $score_error_desc=='Consumer not found in bureau') {?>
	<h5> Your Record is Not Found in Credit Bureau. Do You Want to Apply For Loan ?</h5>
	<div class="row justify-content-center">
		<div class=" container-login100-form-btn">
			<a href="<?php echo base_url();?>index.php/customer/customer_apply_for_loan_next?UID=<?php echo $this->session->userdata('UID'); ?>">
				<label class="login100-form-btn btn btn-primary px-4" style="margin-left:10px; margin-top:6px;">
					YES
				</label>
			</a>
            <a href="<?php echo base_url();?>index.php/signup/screen_one?UID=<?php echo $this->session->userdata('UID'); ?>">
                <label class="login100-form-btn btn btn-primary px-4" style="margin-left:10px; margin-top:6px;">
                    NO, I dont want loan
                </label>
            </a>
		</div>					
	</div>
	<?php } } else{?>
	<h5>Do you want to update your details ?</h5>
	<br>
	<div class="row justify-content-center">
		<div class=" container-login100-form-btn">
			<a href="<?php echo base_url();?>index.php/customer/credit_score_update_user_details?UID=<?php echo $this->session->userdata('UID'); ?>">
				<label class="login100-form-btn btn btn-primary px-4" style="margin-left:10px; margin-top:6px;">
					YES
				</label>
			</a>
            <a href="<?php echo base_url();?>index.php/signup/screen_one?UID=<?php echo $this->session->userdata('UID'); ?>">
                <label class="login100-form-btn btn btn-primary px-4" style="margin-left:10px; margin-top:6px;">
                    NO, I dont want loan
                </label>
            </a>
		</div>					
	</div>
	<?php } ?>
	
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