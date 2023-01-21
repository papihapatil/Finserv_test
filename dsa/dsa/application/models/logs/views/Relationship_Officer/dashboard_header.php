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
			</script>
		</head>
		<body class="c-app">
		<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
			<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
			<img src="<?php echo base_url(); ?>images/logo.png"/>

			</div>
			<ul class="c-sidebar-nav">
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user">

					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
					</svg> Dashboard</a></li>
					<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/profile">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
					</svg> Profile</a></li>
					<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user/customers">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-users" style="margin-right: 20px;"></i>	
					</svg> Customers</a></li>
					<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user/dsa?s=all">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
					</svg> DSA List</a></li>
					<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user/View_Lead">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
					</svg>View Lead</a></li>
				
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
				<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
				</svg></a>
				<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
					<i class="fa fa-bars"></i>
				</button>
				<ul class="c-header-nav d-md-down-none">
				<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/Operations_user">Dashboard</a></li>
				<li class="c-header-nav-item px-3"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user/customers">Customers</a></li>
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
					<span style='font-size:14px'>Welcome, <?php if(isset($username)){ echo ucwords($username); }?></span>
					<span style='font-size:14px'><?php if(isset($userType)) { if($userType=="Operations_user") echo "(Operations User)"  ; } ?></span>
					<a href="<?php echo base_url();?>index.php/logout">Logout</a>
				</li>

				<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
				<svg class="c-icon c-icon-lg">
				<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
				</svg>
				</button>
				</ul>
			</header>