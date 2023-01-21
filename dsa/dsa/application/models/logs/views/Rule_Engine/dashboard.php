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
			<title>Finaleap</title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
            <!-- <link href="<?php echo base_url(); ?>css/style1.css" rel="stylesheet"> -->
			<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
			<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">

			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.dataTables.min.css">


			<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
			<script type="text/javascript"  src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
			<script type="text/javascript" class="init">
			$(document).ready(function()
			 { $('#example').DataTable();
			 });
			</script>
	
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
			    <?php if(!empty($row))	
					{ ?>
				     
						  
								<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Rule_Engine/Risk_Dimension">
								<svg class="c-sidebar-nav-icon">
								  <i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
								</svg>Risk Dimension/Parameters</a></li>
							    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Rule_Engine/Criteria">
								<svg class="c-sidebar-nav-icon">
								  <i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
								</svg>Criteria</a></li>
								<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/logout">
								<svg class="c-sidebar-nav-icon">
									<i class="fa fa-arrow-circle-left" style="margin-right: 20px;"></i>	
								</svg> Logout</a></li>
					
					    
					 
					
					<?php }	
					else{
						  redirect(base_url('index.php/login'));
					   }						
					?>
					
					   
				
				
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
					<?php if(isset($userType)) { if($userType=='ADMIN' || $userType=='') 
					{
                ?>
				<span style='font-size:14px'>Hi, <?php echo "[".ucwords($userType)."]  "; ?></span>
				<span style='font-size:14px'><?php if(isset($userType)) { if($userType=="Operations_user") echo "(Operations User)"  ; } ?>  </span>
					<a href="<?php echo base_url();?>index.php/logout">Logout</a>
				<?php
					}
					else
					{
                ?>
				<span style='font-size:14px'>Hi, <?php if(isset($username)){ echo "<b>".ucwords($username)."</b>  "; echo "[".ucwords($userType)."]  "; }?></span>
					<span style='font-size:14px'><?php if(isset($userType)) { if($userType=="Operations_user") echo "(Operations User)"  ; } ?>  </span>
					<a href="<?php echo base_url();?>index.php/logout">Logout</a>
				<?php
					}
					}?>
					
				</li>

				<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
				<svg class="c-icon c-icon-lg">
				<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
				</svg>
				</button>
				</ul>
			</header>