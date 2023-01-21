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
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-118965717-1');
</script></head>
<body class="c-app">
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
<img src="<?php echo base_url(); ?>images/logo.png"/>

</div>
<ul class="c-sidebar-nav">
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/manager">

		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
		</svg> Dashboard</a></li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/manger_profile">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
		</svg> Profile</a></li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/customers">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-users" style="margin-right: 20px;"></i>	
		</svg> Customers</a></li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/csr">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
		</svg> CSR</a>
	</li>
	
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/loans">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-file" style="margin-right: 20px;"></i>	
		</svg> Applied Loans</a>
	</li>

	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/custOfferLetters">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-file" style="margin-right: 20px;"></i>	
		</svg> Customer Offer Letters</a>
	</li>

	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/custBureauReports">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-file" style="margin-right: 20px;"></i>	
		</svg> Customer Bureau Reports</a>
	</li>

	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/changePassword">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-file" style="margin-right: 20px;"></i>	
		</svg> Change Password</a>
	</li>
	
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/logout">
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

</svg></a>
<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
	<i class="fa fa-bars"></i>
</button>
<ul class="c-header-nav d-md-down-none">
<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/dsa">Dashboard</a></li>
<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/dsa/managers">Managers</a></li>
<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/dsa/customers">Customers</a></li>
</ul>
<ul class="c-header-nav mfs-auto">
<li class="c-header-nav-item px-3 c-d-legacy-none">
<button class="c-class-toggler c-header-nav-btn" type="button" id="header-tooltip" data-target="body" data-class="c-dark-theme" data-toggle="c-tooltip" data-placement="bottom" title="Toggle Light/Dark Mode">

</button>
</li>
</ul>
<ul class="c-header-nav">
<li class="c-header-nav-item dropdown d-md-down-none mx-2">
	<a href="<?php echo base_url();?>index.php/logout">
		<svg class="c-sidebar-nav-icon">
			
		</svg> Logout</a>
</li>


<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">

</button>
</ul>
</header>

<div class="c-body">
<main class="c-main">
<div class="container-fluid">
<div class="fade-in">

<div class="row">
<div class="col-md-12">
<div class="card">

<div class="card-body">
<div class="row">
<div class="col-sm-12">



<?php ini_set('short_open_tag', 'On'); ?>
<form method="POST" action="<?php echo base_url(); ?>index.php/dsa/dsa_update_profile_one_new_action" id="dsa_update_profile_one_new_action">
	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
			<div class="bold-font black-color col-xl-2 col-lg-2 col-md-2 col-sm-4 col-4">
		    			<a href="<?php echo base_url();?>index.php/dsa/update_manager_basic_profile"><i style="width: 30px; height: 30px;" alt="mahesh" class="fa fa-edit"></i></a>
		    </div>
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div>
						<span class="shadow align-middle dot"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></span>				
					</div>
					
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
								
					<div>
						<span class="align-middle dot-white"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></span>
					</div>			
				</div>	
			</div>
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div style="font-size: 10px; color: black; margin-right: 20px;">
						Personal Details
					</div>
					
					<div style="font-size: 10px; margin-right: 20px; color: black;">
						Documents
					</div>
				</div>	
			</div>
		</div>
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Please tell us a bit about yourself</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 45px; font-size: 12px; color: #bfbbbb;">Please fill your personal details. If required our Representative may get in touch to verify them.</span>

			</div>
			<div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Full name as per PAN card *</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input disabled style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text" id="f_name" name="f_name" minlength="3" maxlength="30" required value="<?php echo $row->FN;?>" oninput="validateText(this)">
	  					<input disabled style="margin-top: 8px;" placeholder="Middle Name (Optional)" class="input-cust-name" type="text" name="m_name" id="m_name" value="<?php echo $row->MN;?>" minlength="3" maxlength="30" oninput="validateText(this)">
	  					<input disabled style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="l_name" id="l_name" minlength="3" maxlength="30" required  value="<?php echo $row->LN;?>" oninput="validateText(this)">
	  				</div>
	  				
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email-Id *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled required placeholder="Enter email-Id *" class="input-cust-name" type="email" name="email" value="<?php echo $row->EMAIL;?>" minlength="8" maxlength="75">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled required placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row->MOBILE;?>">
  				</div> 
 
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="w-100"></div>

				<div style="margin-top: 0px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Birth *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<input disabled required  max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="dob" id="dob" value="<?php echo $row->DOB;?>" >
				</div>
			  	<div class="w-100"></div>

				<div style="margin-top: 20px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-university"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Education *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<select disabled required class="input-cust-name" name="education_type" > 
					<option value="">Select Education *</option>
					<option value="ENGINEER" <?php if ($row->EDUCATION_BACKGROUND == 'ENGINEER') echo ' selected="selected"'; ?>>ENGINEER</option>
					<option value="GRADUATE" <?php if ($row->EDUCATION_BACKGROUND == 'GRADUATE') echo ' selected="selected"'; ?>>GRADUATE</option>
					<option value="MATRIC" <?php if ($row->EDUCATION_BACKGROUND == 'MATRIC') echo ' selected="selected"'; ?>>MATRIC</option>
					<option value="POST GRADUATE" <?php if ($row->EDUCATION_BACKGROUND == 'POST GRADUATE') echo ' selected="selected"'; ?>>POST GRADUATE</option>
					<option value="UNDER GRADUATE" <?php if ($row->EDUCATION_BACKGROUND == 'UNDER GRADUATE') echo ' selected="selected"'; ?>>UNDER GRADUATE</option>
					<option value="PROFESSIONAL" <?php if ($row->EDUCATION_BACKGROUND == 'PROFESSIONAL') echo ' selected="selected"'; ?>>PROFESSIONAL</option>
					<option value="OTHERS" <?php if ($row->EDUCATION_BACKGROUND == 'OTHERS') echo ' selected="selected"'; ?>>OTHERS</option>
				</select>
				</div>		
  			</div>  			
		</div>

		<!-- identity details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Identity Details</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">We require your Aadhar number and PAN</span>

			</div>
			<div class="w-100"></div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Aadhar Number *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled pattern="^\d{4}\s\d{4}\s\d{4}$" required placeholder="Aadhar *" class="input-cust-name" maxlength="14" title="Please enter valid 12 digit aadhar number" type="text" name="aadhar" id="aadhar_number" oninput="aadharValidate(this)" value="<?php echo $row->AADHAR_NUMBER;?>">
  				</div>  			  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">PAN Number * (Five characters, Four digits and again One character) e.g: COKPG9558B</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" required placeholder="PAN number *" class="input-cust-name" type="text" name="pan" title="Please enter valid PAN number" maxlength="10"  oninput="maxLengthCheck(this)" value="<?php echo $row->PAN_NUMBER;?>" style="text-transform:uppercase">
  				</div>  			  				
			</div>
		</div>

		
	</div>
</form>


</div>
</div>
</div>

</div>

</div>
</div>
</main>
</div>
<footer class="c-footer">
<div>Copyright © 2020 Finaleap.</div>
<div class="mfs-auto">Powered by Finaleap</div>
</footer>
</div>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>