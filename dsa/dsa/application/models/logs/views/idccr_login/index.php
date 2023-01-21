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
		<svg class="c-sidebar-nav-icon"></svg>Hi , <?php if(isset($user_details)) echo $user_details->User_name ; 
		   $_SESSION['IDCCR_user_email']=$user_details->Email ;
		   $_SESSION['IDCCR_user_pass']=$user_details->Password ;
		   ?>
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
<?php unset($error); } }
	else if(isset($success)){ if($success !='') { ?>
		<div class="my_div alert-success" id="showOrHide"><center><br>
	    	<?php if($success !='') {?> <p style="font-size: 17px;"> <?php echo $success; } ?></p>
			<button type="button" class="btn btn-outline-success" onclick="showOrHideDiv()">OK</button>
			</center>
		</div>	
<?php
	unset($error);	 }
	} ?>
<div class="fade-in">
<div class="row">
<div class="col-sm-6 col-lg-3">
		<div class="" style="background-color:white;border: 0;border-radius:3px 3px 3px 3px; box-shadow: 0 1px 1px 0 rgb(60 75 100 / 14%), 0 2px 1px -1px rgb(60 75 100 / 12%), 0 1px 3px 0 rgb(60 75 100 / 20%);">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
					<label>Want to know IDCCR bureau score ?</label>
					<h4>IDCCR Bureau</h4>
					<div style="margin-bottom: 10px;"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/Idccr_user_IDCCR_Form" target="_blank"><button type="button" class="btn btn-info">Click here</button></a></div>
				</div>				
			</div>
			
		</div>
	</div>
	<?php if(!empty($bureau_counts))
	{
		if($bureau_counts=='Reset')
		{
	?>
	<div class="col-sm-6 col-lg-3">
		<div class="" style="background-color:white;border: 0;border-radius:3px 3px 3px 3px; box-shadow: 0 1px 1px 0 rgb(60 75 100 / 14%), 0 2px 1px -1px rgb(60 75 100 / 12%), 0 1px 3px 0 rgb(60 75 100 / 20%);">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
				    <h4>Reset Count </h4>
					<label style="color:red;">Your bureau counts are Expired.</label>
					<div style="margin-bottom: 10px;"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/Reset_Count_Request" target="_blank"><button type="button" class="btn btn-info">Send Request for Reset </button></a></div>
				</div>				
			</div>
		
		</div>
	</div>
	<?php		
		}
	}
	?>
	<div class="col-sm-6 col-lg-3">
		<div class="" style="background-color:white;border: 0;border-radius:3px 3px 3px 3px; box-shadow: 0 1px 1px 0 rgb(60 75 100 / 14%), 0 2px 1px -1px rgb(60 75 100 / 12%), 0 1px 3px 0 rgb(60 75 100 / 20%);">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
				    <h4>Pull Count Details</h4>
					<table class="table table-bordered table-sm">
    					<thead>
     						<tr>
      							<th>Total Counts</th>
        						<th>Used Counts</th>
								<th>Remaining</th>
                            </tr>
    					</thead>
   						<tbody>
     						<tr>
        						<td><?php if(isset($user_details)) echo $user_details->Balance ;?></td>
        						<td><?php if(isset($user_details)) echo $user_details->Count ;?></td>
								<td><?php if(isset($user_details)) echo ($user_details->Balance - $user_details->Count );?></td>
                            </tr>
                        </tbody>
                    </table>
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
<script>
   function showOrHideDiv() {
      var v = document.getElementById("showOrHide");
      v.style.display = "none";
      
   }
</script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>


<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
</body>
</html>