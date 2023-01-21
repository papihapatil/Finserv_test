<!DOCTYPE html>
<html lang="en">
	<head>
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
		<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=94461d89946ef749b7a43d14685c725d1">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.dataTables.min.css">
		<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script type="text/javascript"  src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" class="init">
			$(document).ready(function() {
			$('#example').DataTable();
			} );
		</script>
		<script>
  			window.dataLayer = window.dataLayer || [];
  			function gtag(){dataLayer.push(arguments);}
  			gtag('js', new Date());
 			gtag('config', 'UA-118965717-1');
		</script>
		<style>
			table {
  					border-collapse: collapse;
  					border-spacing: 0;
  					width: 100%;
  					border: 1px solid #ddd;
				}
			th, td {
  					text-align: left;
  					padding: 8px;
				}
			tr:nth-child(even){
					background-color: #f2f2f2
					}
		</style>

		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		  gtag('config', 'UA-118965717-1');
		</script>
	
	</head>
	
<?php //echo $userType;  exit();//Cluster_credit_manager Account_Manager

if(isset($userType))
{

}
else
{
	$userType="Admin";
}
?>
<?php 
if($userType=="Cluster_credit_manager")
{
?>

	<body class="c-app">
		<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
			<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
				<img src="<?php echo base_url(); ?>images/Finserv_logo.png" style="width:90%;">
			</div>
			<ul class="c-sidebar-nav">
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Cluster_credit_manager">
					<svg class="c-sidebar-nav-icon">
					<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
					</svg> Dashboard</a>
				</li>
			
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/profile">
					<svg class="c-sidebar-nav-icon">
				    <i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
												</svg> Profile</a>
											</li>	
											<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/changePassword">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-file" style="margin-right: 20px;"></i>	
															</svg> Change Password</a>
											</li>
											<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Help/help_form">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> HELP</a>
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
				</button>
				<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
					<svg width="118" height="46" alt="CoreUI Logo">
						<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
					</svg>
				</a>
				<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
					<i class="fa fa-bars"></i>
				</button>
				<ul class="c-header-nav d-md-down-none">
					<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">Dashboard</a></li>
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
							</svg> Logout
						</a>
					</li>
					<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
						<svg class="c-icon c-icon-lg">
							<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
						</svg>
					</button>
				</ul>
		</header>

<?php
}
else if($userType=="Relationship_Officer")
{
	?>
	
	<body class="c-app">
		<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
			<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
				<img src="<?php echo base_url(); ?>images/Finserv_logo.png" style="width:90%;">
			</div>
			<ul class="c-sidebar-nav">
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Relationship_Officer">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													<li class="c-sidebar-nav-item">
														<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/dsa_allusers">DSA</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector_alluser?s=all">Connector</a>-->
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/customers_allusers">Customers</a>
															
														</div>
													</li>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/Create_lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Create new Lead</a>
													</li>
												    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/View_Lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> View Lead</a>
													</li>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Relationship_Officer/MIS_Updates">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg>MIS Updates</a>
													</li>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/changePassword">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-file" style="margin-right: 20px;"></i>	
															</svg> Change Password</a>
											</li>
											<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Help/help_form">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> HELP</a>
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
				</button>
				<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
					<svg width="118" height="46" alt="CoreUI Logo">
						<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
					</svg>
				</a>
				<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
					<i class="fa fa-bars"></i>
				</button>
				<ul class="c-header-nav d-md-down-none">
					<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">Dashboard</a></li>
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
							</svg> Logout
						</a>
					</li>
					<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
						<svg class="c-icon c-icon-lg">
							<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
						</svg>
					</button>
				</ul>
		</header>

													<?php
}
else if($userType=="branch_manager")
{
	?>
	
	<body class="c-app">
		<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
			<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
				<img src="<?php echo base_url(); ?>images/Finserv_logo.png" style="width:90%;">
			</div>
			<ul class="c-sidebar-nav">
		<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													<li class="c-sidebar-nav-item">
														<button class="btn btn1  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/BranchManager_dsa">DSA</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/BranchManager_connector?s=all">Connector</a>-->
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/BranchManager_customers">Customers</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/BranchManager_RO?s=all">Relationship Officer</a>
															
															
															
														</div>
													</li>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/Create_lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Create new Lead</a>
													</li>
												    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/View_Lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> View Lead</a>
													</li>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/Assign_Lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Assign Lead</a>
													</li>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/changePassword">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-file" style="margin-right: 20px;"></i>	
															</svg> Change Password</a>
											</li>
											<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Help/help_form">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> HELP</a>
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
				</button>
				<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
					<svg width="118" height="46" alt="CoreUI Logo">
						<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
					</svg>
				</a>
				<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
					<i class="fa fa-bars"></i>
				</button>
				<ul class="c-header-nav d-md-down-none">
					<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">Dashboard</a></li>
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
							</svg> Logout
						</a>
					</li>
					<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
						<svg class="c-icon c-icon-lg">
							<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
						</svg>
					</button>
				</ul>
		</header>

													<?php
}
else if($userType=="Operations_user")
{
	?>
	
	<body class="c-app">
		<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
			<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
				<img src="<?php echo base_url(); ?>images/Finserv_logo.png" style="width:90%;">
			</div>
			<ul class="c-sidebar-nav">
		<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user">

														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a></li>

														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user/customers">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Customers</a></li>
														<!--<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user/dsa?s=all">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
														</svg> DSA List</a></li>
																<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/Connector?s=all">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
														</svg> Connectors List</a></li>-->
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user/View_Lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
														</svg>View Lead</a></li>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/changePassword">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-file" style="margin-right: 20px;"></i>	
															</svg> Change Password</a>
											</li>
											<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Help/help_form">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> HELP</a>
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
				</button>
				<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
					<svg width="118" height="46" alt="CoreUI Logo">
						<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
					</svg>
				</a>
				<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
					<i class="fa fa-bars"></i>
				</button>
				<ul class="c-header-nav d-md-down-none">
					<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">Dashboard</a></li>
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
							</svg> Logout
						</a>
					</li>
					<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
						<svg class="c-icon c-icon-lg">
							<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
						</svg>
					</button>
				</ul>
		</header>

													<?php
}
else if($userType=="credit_manager_user")
{
	?>
	
	<body class="c-app">
		<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
			<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
				<img src="<?php echo base_url(); ?>images/Finserv_logo.png" style="width:90%;">
			</div>
			<ul class="c-sidebar-nav">
		<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/credit_manager_user">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
														<!--<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/credit_manager_user/customers">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-users" style="margin-right: 20px;"></i>	
															</svg> Customers</a>
														</li>- -->
														<li class="c-sidebar-nav-item">
														<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/Operations_user/dsa?s=all">DSA</a>-->
															<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/credit_manager_user/customers">Customers</a>-->
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/credit_manager_user/customers_pd">Customers</a>
						
															<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector?s=all">Connector</a>-->
														</div>
													</li>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/View_Lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
														</svg>View Lead</a>
													</li>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/changePassword">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-file" style="margin-right: 20px;"></i>	
															</svg> Change Password</a>
											</li>
											<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Help/help_form">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> HELP</a>
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
				</button>
				<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
					<svg width="118" height="46" alt="CoreUI Logo">
						<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
					</svg>
				</a>
				<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
					<i class="fa fa-bars"></i>
				</button>
				<ul class="c-header-nav d-md-down-none">
					<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">Dashboard</a></li>
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
							</svg> Logout
						</a>
					</li>
					<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
						<svg class="c-icon c-icon-lg">
							<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
						</svg>
					</button>
				</ul>
		</header>

													<?php
}
else if($userType=="Area_Manager")
{
?>

	<body class="c-app">
		<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
			<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
				<img src="<?php echo base_url(); ?>images/Finserv_logo.png" style="width:90%;">
			</div>
			<ul class="c-sidebar-nav">
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Area_Manager">

														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a></li>
														<li class="c-sidebar-nav-item">
															<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Area_managers_ClusterManager?s=all">Cluster Manager</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Area_managers_BM?s=all">Branch Manager</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Area_managers_RO?s=all">Relationship Officer</a>
															<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Cluster_Dsa?s=all">Dsa</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Cluster_connector?s=all">Connector</a>-->
														
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Area_managers_customers?s=all">Customer</a>
																
															
															</div>
														</li>
											<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/profile">
					<svg class="c-sidebar-nav-icon">
				    <i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
												</svg> Profile</a>
											</li>	
											<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/changePassword">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-file" style="margin-right: 20px;"></i>	
															</svg> Change Password</a>
											</li>
											<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Help/help_form">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> HELP</a>
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
				</button>
				<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
					<svg width="118" height="46" alt="CoreUI Logo">
						<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
					</svg>
				</a>
				<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
					<i class="fa fa-bars"></i>
				</button>
				<ul class="c-header-nav d-md-down-none">
					<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">Dashboard</a></li>
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
							</svg> Logout
						</a>
					</li>
					<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
						<svg class="c-icon c-icon-lg">
							<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
						</svg>
					</button>
				</ul>
		</header>

<?php
}
else if($userType=="MIS User")
{
	?>
	
	<body class="c-app">
		<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
			<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
				<img src="<?php echo base_url(); ?>images/Finserv_logo.png" style="width:90%;">
			</div>
			<ul class="c-sidebar-nav">
				
			<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/MIS_User">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													<li class="c-sidebar-nav-item">
														<button class="btn btn1  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>Data For Download
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Admin_customers">Customers</a>
														
															
															
															
															
														</div>
													</li>	
									<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/changePassword">
													<svg class="c-sidebar-nav-icon">
														<i class="fa fa-file" style="margin-right: 20px;"></i>	
													</svg> Change Password</a>
									</li>
										<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Help/help_form">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> HELP</a>
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
				</button>
				<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
					<svg width="118" height="46" alt="CoreUI Logo">
						<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
					</svg>
				</a>
				<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
					<i class="fa fa-bars"></i>
				</button>
				<ul class="c-header-nav d-md-down-none">
					<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">Dashboard</a></li>
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
							</svg> Logout
						</a>
					</li>
					<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
						<svg class="c-icon c-icon-lg">
							<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
						</svg>
					</button>
				</ul>
		</header>
	
	<?php
}
else if($userType=="Business_Head")
{
	?>
	
		
	<body class="c-app">
		<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
			<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
				<img src="<?php echo base_url(); ?>images/Finserv_logo.png" style="width:90%;">
			</div>
			<ul class="c-sidebar-nav">
				
			<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Business_Head_Controller">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
																					<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/changePassword">
													<svg class="c-sidebar-nav-icon">
														<i class="fa fa-file" style="margin-right: 20px;"></i>	
													</svg> Change Password</a>
									</li>
										<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Help/help_form">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> HELP</a>
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
				</button>
				<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
					<svg width="118" height="46" alt="CoreUI Logo">
						<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
					</svg>
				</a>
				<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
					<i class="fa fa-bars"></i>
				</button>
				<ul class="c-header-nav d-md-down-none">
					<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/Business_Head_Controller/index">Dashboard</a></li>
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
							</svg> Logout
						</a>
					</li>
					<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
						<svg class="c-icon c-icon-lg">
							<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
						</svg>
					</button>
				</ul>
		</header>
	
	<?php
}
else if($userType=="Chief_Risk_Officer")
{
	?>
	
		
	<body class="c-app">
		<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
			<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
				<img src="<?php echo base_url(); ?>images/Finserv_logo.png" style="width:90%;">
			</div>
			<ul class="c-sidebar-nav">
				
			<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Chief_Risk_Officer">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
														
			
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/profile">
														<svg class="c-sidebar-nav-icon">
															 <i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>		
														</svg> Profile</a>
													</li> 
														
			
																					<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/changePassword">
													<svg class="c-sidebar-nav-icon">
														<i class="fa fa-file" style="margin-right: 20px;"></i>	
													</svg> Change Password</a>
									</li>
										<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Help/help_form">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> HELP</a>
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
				</button>
				<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
					<svg width="118" height="46" alt="CoreUI Logo">
						<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
					</svg>
				</a>
				<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
					<i class="fa fa-bars"></i>
				</button>
				<ul class="c-header-nav d-md-down-none">
					<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/Chief_Risk_Officer/index">Dashboard</a></li>
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
							</svg> Logout
						</a>
					</li>
					<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
						<svg class="c-icon c-icon-lg">
							<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
						</svg>
					</button>
				</ul>
		</header>
	
	<?php
}
else if($userType=="Disbursement_OPS")
{
	?>

	
	<body class="c-app">
		<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
			<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
				<img src="<?php echo base_url(); ?>images/Finserv_logo.png" style="width:90%;">
			</div>
			<ul class="c-sidebar-nav">
				
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Disbursement_OPS">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Payments/managemandate">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Manage Mandate</a>
													</li> 
													
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Payments/managetransaction">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Manage Transaction</a>
													</li>
															<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/profile">
										<svg class="c-sidebar-nav-icon">
										  <i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
										</svg> Profile</a>
									</li>	
									<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/changePassword">
													<svg class="c-sidebar-nav-icon">
														<i class="fa fa-file" style="margin-right: 20px;"></i>	
													</svg> Change Password</a>
									</li>
										<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Help/help_form">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> HELP</a>
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
				</button>
				<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
					<svg width="118" height="46" alt="CoreUI Logo">
						<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
					</svg>
				</a>
				<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
					<i class="fa fa-bars"></i>
				</button>
				<ul class="c-header-nav d-md-down-none">
					<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">Dashboard</a></li>
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
							</svg> Logout
						</a>
					</li>
					<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
						<svg class="c-icon c-icon-lg">
							<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
						</svg>
					</button>
				</ul>
		</header>
	<?php
}
else if($userType=="Account_Manager")
{
	?>

	<body class="c-app">
		<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
			<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
				<img src="<?php echo base_url(); ?>images/Finserv_logo.png" style="width:90%;">
			</div>
			<ul class="c-sidebar-nav">
				
				<li class="c-sidebar-nav-item">
														<button class="btn btn1  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>Manage Payments
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/accountant/online_payments">Online Payments</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/accountant/UPI_payments">UPI Payments</a>
					                                        <a class="dropdown-item" href="<?php echo base_url();?>index.php/accountant/offline_payments">Cheque Payments</a>

														</div>
													</li>
													
													<li class="c-sidebar-nav-item">
																<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
																	<i class="fa fa-th-large" style="margin-right: 20px;"></i>Billing
																</button>
																<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																	<a class="dropdown-item"  href="<?php echo base_url();?>index.php/Accountant/One_Monthly_Billing">One Time Monthly billing</a> 
																	<a class="dropdown-item"  href="<?php echo base_url();?>index.php/Accountant/Monthly_Billing">Regular Monthly billing</a>
																	<a class="dropdown-item"  href="<?php echo base_url();?>index.php/Accountant/credit_bureau_branch_count">IDCCR Branch Count</a>
															</div>
															</li>
															<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Admin/Sanction_letters">
																<svg class="c-sidebar-nav-icon">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
																</svg> Sanction Letters</a>
															</li>
															<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/profile">
										<svg class="c-sidebar-nav-icon">
										  <i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
										</svg> Profile</a>
									</li>	
									<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/changePassword">
													<svg class="c-sidebar-nav-icon">
														<i class="fa fa-file" style="margin-right: 20px;"></i>	
													</svg> Change Password</a>
									</li>
										<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Help/help_form">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> HELP</a>
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
				</button>
				<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
					<svg width="118" height="46" alt="CoreUI Logo">
						<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
					</svg>
				</a>
				<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
					<i class="fa fa-bars"></i>
				</button>
				<ul class="c-header-nav d-md-down-none">
					<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">Dashboard</a></li>
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
							</svg> Logout
						</a>
					</li>
					<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
						<svg class="c-icon c-icon-lg">
							<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
						</svg>
					</button>
				</ul>
		</header>
	<?php
}
else
{
?>
	
	<body class="c-app">
		<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
			<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
				<img src="<?php echo base_url(); ?>images/Finserv_logo.png" style="width:90%;">
			</div>
			<ul class="c-sidebar-nav">
				<li class="c-sidebar-nav-item">
					<a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">
						<svg class="c-sidebar-nav-icon">
							<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
						</svg> Dashboard
					</a>
				</li>
				<li class="c-sidebar-nav-item">
					<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
						<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Hr?s=all">HR</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Area_Manager?s=all">Area Manager</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Accountant?s=all">Account Manager</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Chief_Risk_Officer?s=all">Chief Risk Officer</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Business_Head?s=all">Business Head</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Cluster_Manager?s=all">Cluster Manager</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/branch_manager?s=all">Branch Manager</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Sales_Manager">Sales Manager</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Telecaller">Telecaller</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Relationship_Officer?s=all">Relationship Officer</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Disbursement_OPS?s=all">Disbursement OPS</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Operations_user?s=all">Operations user</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/credit_manager_user?s=all">Credit Manager</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Cluster_credit_manager?s=all">Cluster Credit Manager</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/CSR">CSR</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Manager"> Managers</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/dsa?s=all">DSA</a>
						<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/dsa?s=all">DSA</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector?s=all">Connector</a>-->
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Admin_customers">Customers</a>
						<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/IDCCR_USERS">IDCCR Users</a>-->
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Legal">Legal</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Technical">Technical</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Support_Member">Support Team</a>

				    </div>
				</li>
				<li class="c-sidebar-nav-item">
					<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
						<i class="fa fa-th-large" style="margin-right: 20px;"></i>Fees Options
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/credit_buerau_price">Credit Bureau Fees</a>
						<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/aadhar_esign_price">Aadhar E-sign Fees</a>-->
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/loan_application_fees">Loan Application Fees</a>
					</div>
				</li>
				<li class="c-sidebar-nav-item">
					<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
						<i class="fa fa-th-large" style="margin-right: 20px;"></i>Bureau Reports
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Payment_report">Credit Bureau Reports</a>
							<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Internal_bureau_reports">Internal Bureau</a>
						<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/credit_bureau_reports">IDCCR Reports</a>-->
						<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/aadhar_esign_report">Aadhar E-sign report</a>-->
					</div>
				</li>
				
				<li class="c-sidebar-nav-item">
					<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
						<i class="fa fa-th-large" style="margin-right: 20px;"></i>Supply chain Management
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item"  href="<?php echo base_url();?>index.php/distributor/managedistributor">Manage Distributor</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/distributor/manageretailers">Manage Retailers</a>
						
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/distributor/supplychainmanager">Manage Supply Chain Manager</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/distributor/SCF_OPS">Manage Supply Chain OPS</a>
				   </div>
				</li>
				
				<!-- <li class="c-sidebar-nav-item">
					<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
						<i class="fa fa-th-large" style="margin-right: 20px;"></i>Refund Fees
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item"  href="<?php echo base_url();?>index.php/admin/refund_money">credit Bureau</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/refund_money_aadhar">Aadhar E-sign</a>
					</div>
				</li>-->
				<!--<li class="c-sidebar-nav-item">
					<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
						<i class="fa fa-th-large" style="margin-right: 20px;"></i>Edit Pull Chances
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item"  href="<?php echo base_url();?>index.php/admin/credit_buerau_pull_chances">Credit Bureau</a>
						 <a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/aadhar_esign_pull_chances">Aadhar E-sign</a>
				   </div>
				</li>-->
				<!--<li class="c-sidebar-nav-item">
					<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
						<i class="fa fa-th-large" style="margin-right: 20px;"></i>Billing
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item"  href="<?php echo base_url();?>index.php/Admin/One_Monthly_Billing">One Time Monthly billing</a> 
						<a class="dropdown-item"  href="<?php echo base_url();?>index.php/Admin/Monthly_Billing">Regular Monthly billing</a>
						<a class="dropdown-item"  href="<?php echo base_url();?>index.php/Admin/credit_bureau_branch_count">IDCCR Branch Count</a>
				   </div>
				</li>-->
				<li class="c-sidebar-nav-item">
					<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
						<i class="fa fa-th-large" style="margin-right: 20px;"></i>Rule Engine Rules
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item"  href="<?php echo base_url();?>index.php/Rule_Engine/Risk_Dimension">Risk Dimension/Parameters</a> <!------------ -->
						<a class="dropdown-item"  href="<?php echo base_url();?>index.php/Rule_Engine/Criteria">Criteria</a> <!------------ -->
				   </div>
				</li>
				<!--<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/View_Lead">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-users" style="margin-right: 20px;"></i>	
					</svg> View Lead</a>
				</li> -->

				<!--<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/customers">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
					</svg> Strategic Dsa Reports</a>
				</li>-->
					<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/Manage_user_access">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-university" style="margin-right: 20px;"></i>	
					</svg> Manage user Access</a>
				</li>
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/manage_documents_type">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-file" style="margin-right: 20px;"></i>	
					</svg> Manage Documents Type</a>
				</li>
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/manage_banks">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-university" style="margin-right: 20px;"></i>	
					</svg> Manage Banks</a>
				</li>
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/Loan_types">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-university" style="margin-right: 20px;"></i>	
					</svg> Manage Loan Types</a>
				</li>
				
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Admin/New_Branch_Location">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
					</svg>Add New Branch Location</a>
				</li>
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Admin/manage_coorporate_banks">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
					</svg>Add New Coorporate Bank</a>
				</li>
				
					<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Help/add_new_category">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> Add Category</a>
													</li>
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Help/view_issue">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> View Issue</a>
													</li>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Help/help_form">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> HELP</a>
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
				</button>
				<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
					<svg width="118" height="46" alt="CoreUI Logo">
						<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
					</svg>
				</a>
				<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
					<i class="fa fa-bars"></i>
				</button>
				<ul class="c-header-nav d-md-down-none">
					<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">Dashboard</a></li>
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
							</svg> Logout
						</a>
					</li>
					<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
						<svg class="c-icon c-icon-lg">
							<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
						</svg>
					</button>
				</ul>
		</header>

<?php
}

?>
	