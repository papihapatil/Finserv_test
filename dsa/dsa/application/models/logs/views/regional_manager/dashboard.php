<!DOCTYPE html>

<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta name="description" content="Finaleap">
<meta name="author" content="Łukasz Holeczek">
<meta name="keyword" content="Finaleap">
<title>Finaleap</title>
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
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/credit_manager_user">

		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
		</svg> Dashboard</a></li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/profile">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
		</svg> Profile</a></li>
	
		<li class="c-sidebar-nav-item">
														<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/dsa?s=all">DSA</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/credit_manager_user/customers">Customers</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector_alluser?s=all">Connector</a>
														</div>
													</li>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user/View_Lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
														</svg>View Lead</a>
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
<ul class="c-header-nav d-md-down-none">
<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/credit_manager_user">Dashboard</a></li>
<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/credit_manager_user/customers">Customers</a></li>

</ul>
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
	<a href="<?php echo base_url();?>index.php/logout">
		<svg class="c-sidebar-nav-icon">
			
		</svg> Logout</a>
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
<div class="fade-in">
<div class="row">
	<div class="col-sm-6 col-lg-4">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">ALL CUSTOMERS STATUS</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
	 								Active
	 							</th>
	   							<th scope="col"><?php echo count($dashboard_data['in_progress'])+count($dashboard_data['in_progress2']);?></th>

  						    </tr>
   							<tr>
       						    <th scope="col"> 
       						    	<i class="fa fa-star fa-lg" style="color:orange;"></i>
 									Hold
 								</th>
   								<th scope="col"><?php echo count($dashboard_data['hold']);?></th>
   
    						</tr>
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
									Reject
								</th>
   								<th scope="col"><?php echo count($dashboard_data['rejected']);?></th>
						    </tr>
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	    <div class="col-sm-6 col-lg-4">
    <div id="chartContainer" style="height: 220px; width: 100%;"></div>
    </div>

<div class="col-sm-6 col-lg-4">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">CUSTOMERS</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
	 								Total Customers
	 							</th>
	   							<th scope="col"><?php echo ($dashboard_data['cust_count_all']);?></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/credit_manager_user/customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>

  						    </tr>
   							<tr>
       						    <th scope="col"> 
       						    	<i class="fa fa-star fa-lg" style="color:orange;"></i>
 									Total Customers For PD
 								</th>
   								<th scope="col"><?php echo ($dashboard_data['cust_count_PD']);?></th>
       							<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/credit_manager_user/customers_pd" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>
    						</tr>
    						
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>

	<div class="col-sm-6 col-lg-3">
	<a href="<?php echo base_url();?>index.php/credit_manager_user/customers">
		<div class="card text-white bg-gradient-primary">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
					<div class="text-value-lg"><?php echo $dashboard_data['cust_count']?></div>
					<div style="margin-bottom: 10px;">Total Customers</div>
				</div>				
			</div>
			
		</div>
	</a>
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


<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
</body>
</html>