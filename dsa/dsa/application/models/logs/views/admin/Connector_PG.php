
<style>
	@media only screen and (max-width:768px){
		.add{
			padding-left: 128px;
    margin-left: -5%;
    margin-top: -23px;
    margin-bottom: 28px
		}
	}
	
	</style>

<!DOCTYPE html>
<?php 
if(!empty($row))	
{
	$role_for_access = $row->ROLE;
}
else 
{
	$role_for_access= '';
}

?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Finaleap">
		<meta name="author" content="Łukasz Holeczek">
		<meta name="keyword" content="Finaleap">
		<title>Finaleap | Connector List</title>
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
			$('#example').DataTable( {
				"order": [[ 0, "desc" ]]
			} );
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
	</head>
	<body class="c-app">
		<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
			<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
				<img src="<?php echo base_url(); ?>images/logo.png"/>
			</div>
			<ul class="c-sidebar-nav">
			<?php if(!empty($row))	
			{ 
				if($row->Profile_Status!="Complete" && $row->ROLE==13 )  
				   {  ?>
				
						<li class="c-sidebar-nav-item">
							<a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager">	<svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> Dashboard</a>
						</li>
 						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/profile">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
							</svg> Profile</a>
						</li>
			  			<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/Create_lead">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-users" style="margin-right: 20px;"></i>	
							</svg> Create new Lead</a>
						</li>
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/View_Lead">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-users" style="margin-right: 20px;"></i>	
							</svg> View Lead</a>
						</li>
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/changePassword">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-file" style="margin-right: 20px;"></i>	
							</svg> Change Password</a>
						</li>
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/logout">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-arrow-circle-left" style="margin-right: 20px;"></i>	
							</svg> Logout</a>
						</li>
				
			<?php  }  
			else if($row->ROLE==13)
				  {  ?>
					
						<li class="c-sidebar-nav-item">
							<a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager">	<svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> Dashboard</a>
						</li>
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/profile">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
							</svg> Profile</a>
						</li>
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/customers">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-users" style="margin-right: 20px;"></i>	
							</svg> Customers</a>
						</li>
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/Connector?s=all">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-users" style="margin-right: 20px;"></i>	
							</svg> Connectors</a>
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
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/changePassword">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-file" style="margin-right: 20px;"></i>	
							</svg> Change Password</a>
						</li>
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/logout">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-arrow-circle-left" style="margin-right: 20px;"></i>	
							</svg> Logout</a>
						</li>
					
			<?php  }
			else if($row->ROLE==3)
			      {
	        ?>
					
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
							</svg> Dashboard</a>
						</li>
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user/profile">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
							</svg> Profile</a>
						</li>
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user/customers">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-users" style="margin-right: 20px;"></i>	
							</svg> Customers</a>
						</li>
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user/dsa?s=all">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
							</svg> DSA List</a>
						</li>
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/Connector?s=all">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
							</svg> Connectors List</a>
						</li>
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user/View_Lead">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
							</svg>View Lead</a>
						</li>
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/logout">
							<svg class="c-sidebar-nav-icon">
								<i class="fa fa-arrow-circle-left" style="margin-right: 20px;"></i>	
							</svg> Logout</a>
						</li>
					
			<?php
					}
			else if($row->ROLE==8)
					{
			?>
					<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/credit_manager_user">
						<svg class="c-sidebar-nav-icon">
							<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
						</svg> Dashboard</a>
					</li> 
					<li class="c-sidebar-nav-item">
						<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
							<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="<?php echo base_url();?>index.php/Operations_user/dsa?s=all">DSA</a>
							<a class="dropdown-item" href="<?php echo base_url();?>index.php/credit_manager_user/customers">Customers</a>
							<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector?s=all">Connector</a>
						</div>
					</li>
					<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/View_Lead">
						<svg class="c-sidebar-nav-icon">
							<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
						</svg>View Lead</a>
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
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/logout">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-arrow-circle-left" style="margin-right: 20px;"></i>	
					</svg> Logout</a>
				</li>
				
			<?php
					}
			}
			?>
			<?php 
			if(!empty($row))	
			{
				if($row->ROLE==5 ) 
				{  
			?>
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
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Cluster_Manager?s=all">Cluster Manager</a>
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/branch_manager?s=all">Branch Manager</a>
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Relationship_Officer?s=all">Relationship Officer</a>
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Operations_user?s=all">Operations user</a>
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/credit_manager_user?s=all">Credit Manager</a>
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/CSR">CSR</a>
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Manager"> Managers</a>
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/dsa?s=all">DSA</a>
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector?s=all">Connector</a>
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/customers">Customers</a>
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/IDCCR_USERS">IDCCR Users</a>
															</div>
														</li>
														<li class="c-sidebar-nav-item">
															<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>Fees Options
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/credit_buerau_price">Credit Bureau Fees</a>
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/aadhar_esign_price">Aadhar E-sign Fees</a>
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
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/credit_bureau_reports">IDCCR Reports</a>
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/aadhar_esign_report">Aadhar E-sign report</a>
															</div>
														</li>
														<li class="c-sidebar-nav-item">
															<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>Refund Fees
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																<a class="dropdown-item"  href="<?php echo base_url();?>index.php/admin/refund_money">credit Bureau</a>
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/refund_money_aadhar">Aadhar E-sign</a>
															</div>
														</li>
														<li class="c-sidebar-nav-item">
															<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>Edit Pull Chances
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																<a class="dropdown-item"  href="<?php echo base_url();?>index.php/admin/credit_buerau_pull_chances">Credit Bureau</a>
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/aadhar_esign_pull_chances">Aadhar E-sign</a>
														   </div>
														</li>
														<li class="c-sidebar-nav-item">
															<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>Billing
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																<a class="dropdown-item"  href="<?php echo base_url();?>index.php/Admin/One_Monthly_Billing">One Time Monthly billing</a> 
																<a class="dropdown-item"  href="<?php echo base_url();?>index.php/Admin/Monthly_Billing">Regular Monthly billing</a>
														   </div>
														</li>
														<li class="c-sidebar-nav-item">
															<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>Rule Engine Rules
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																<a class="dropdown-item"  href="<?php echo base_url();?>index.php/Rule_Engine/Risk_Dimension">Risk Dimension/Parameters</a> <!------------ -->
																<a class="dropdown-item"  href="<?php echo base_url();?>index.php/Rule_Engine/Criteria">Criteria</a> <!------------ -->
														   </div>
														</li>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/View_Lead">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-users" style="margin-right: 20px;"></i>	
															</svg> View Lead</a>
														</li>

														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/customers">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
															</svg> Strategic Dsa Reports</a>
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
														
															<li class="c-header-nav-item dropdown d-md-down-none mx-2">
																<a href="<?php echo base_url();?>index.php/logout">
																	<svg class="c-sidebar-nav-icon">
																	</svg> Logout
																</a>
															</li>
			</ul>
			<?php }

			} ?>
			
					
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
				</svg>
			</a>
			<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
				<i class="fa fa-bars"></i>
			</button>
			<ul class="c-header-nav d-md-down-none">
				<li class="c-header-nav-item px-3">
					<a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">Dashboard
					</a>
				</li>
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
						</svg> Logout
					</a>
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
													<div >
        												<div class="">
															<div class="row">
															<?php if(isset($data))
				      											{
															if(count($data) != 0) 
						  											{  ?>
						  											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   													<?php if($row->ROLE ==5) {?>
																	  <lable style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">  TOTAL <?php echo count($data); ?>&nbsp;&nbsp;<a href="<?=base_url('index.php/admin/download_Excel_user?data_for=Connector')?>">
						  												 <i class="fa fa-download "style='font-size:20px; color:green;'></i></a></lable>
						   												<?php $excelData = json_decode(json_encode($data), true);?>
																		    <?php }?>
						  											</div>
						 									 		<?php  } 
				         											 else
						 											 {?>
						   											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;" >
																	   	<?php if($row->ROLE ==5) {?>
						   												<lable style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">  TOTAL <?php if(isset($data)) {echo count($data);}else {echo 0;} ?>&nbsp;&nbsp;<a>
						   												<i class="fa fa-download "style='font-size:20px; color:green;'></i></a></lable>
																		   <?php }?>
																	</div>
																	<?php     } 
			           												} 
																	else
																	{ ?>
					       											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
																	    	<?php if($row->ROLE ==5) {?>
						   												<lable style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">  TOTAL <?php if(isset($data)) {echo count($data);}else {echo 0;}?>&nbsp;&nbsp;<a>
						   												<i class="fa fa-download "style='font-size:20px; color:green;'></i></a></lable>
																	  <?php }?>
																		   </div>
																	<?php   }   ?>
																	<?php if($row->ROLE !=8) {?>
																	<div class="col-sm-3" >
																		<div class="add">
																		<lable style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">  ADD Connector&nbsp;&nbsp;<a href="<?php echo base_url()?>index.php/dsa/new_customer?type=connector">
						   												<i class="fa fa-plus "style='font-size:20px; color:green;'></i></a></lable>
																	</div>
																	</div>
																	<?php }
																	else
																	{
                                                                    ?>
																	<div class="col-sm-3" style="padding-left:0px;margin-left:-5%;">
																						<lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  TOTAL <?php if(isset($data)) {echo count($data);}else {echo 0;}?>&nbsp;&nbsp;CONNECTORS</lable>
																	</div>
																	<?php
																	}?>
																
				   														
																		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
																	</div>
																	<div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:5%;">
				   													</div>
																	<div class="col-sm-2" >
                                                                                      

																		
																	</div>
															</div>
          							      				</div>
														<hr>
													</div>




<div class="row">
		
	</div>

	<div class="row">
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
		    <div style=" margin-top: 8px;" class="col">
				  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Date Range</label>
					  <select class="form-control"  name="Admin_connector_filter" id="Admin_connector_filter">
					    <option value="">Select</option>
					  
					    <option value="Current_Month" <?php if(isset($range)){if($range=='Current_Month'){echo 'selected';}} ?>>Current Month</option>
					    <option value="Previous_Month"  <?php if(isset($range)){if($range=='Previous_Month'){echo 'selected';}} ?>>Previous Month</option>
					    <option value="Select_Range"  <?php if(isset($range)){if($range=='Select_Range'){echo 'selected';}} ?>> select Range</option>
					  </select>
				</div>
		  </div>
		  <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
			  <div style=" margin-top: 8px;" class="col">
			    <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Start Date</label>
					<input  class="form-control Start_Date"  type="date" name="Start_Date" id="connector_Start_Date_filter">
				</div>  
		  </div> 
		  <input type="text" hidden value="<?php if(isset($_GET['Start_Date'])){echo $_GET['Start_Date'];}?>" id="start_date1">
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
			  <div style=" margin-top: 8px;" class="col">
			    <label for="email" style="font-size: 16px; color: black; font-weight: bold;">End Date</label>
				  <input  class="form-control"  type="date" name="End_Date" id="connector_End_Date_filter"  >
				</div>  
			</div> 
			<input type="text" hidden value="<?php  if(isset($_GET['End_Date'])){echo $_GET['End_Date'];}?>" id="end_date1">
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
			  <div style=" margin-top: 8px;" class="col">
			    <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Filter</label>
				  <select class="form-control" aria-label="Default select example" name="select_filters" id="select_filters_admin_connector">
				   	    <option>Select Filter</option>
						<option value="all" <?php if(isset($filter_by)){if($filter_by=='all'){echo 'selected';}} ?>>All Connector</option> 
						<option value="Complete"<?php if(isset($filter_by)){if($filter_by=='Complete'){echo 'selected';}} ?>>Completed Profile</option>
						<option value="Incomplete"<?php if(isset($filter_by)){if($filter_by=='Incomplete'){echo 'selected';}} ?>>Incomplete Profile</option>
					</select>
				</div> 
        <input type="text" hidden value="<?php if(isset($filter_by)){echo $filter_by;}?>" id="filter">															  
	    </div> 
		  <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
		  	 <div style=" margin-top: 8px;" class="col">
			        <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Referred By</label>
				    <select class="form-control" aria-label="Default select example" name="select_connector_Name" id="filters_by_ro_admin_connector">
				   	  
						<option value="" >Select </option> 
						    <?php
       							foreach($Reffered_by as $u)
						       {
						       	if($u->Refer_By_Name!='')
						       	{
						        echo '<option value="'.$u->Refer_By_Name.'" >'.$u->Refer_By_Name.'</option>';
						        }
						       }
						      ?>
					</select>
				</div> 
				 <input type="text" hidden value="<?php if(isset($RB)){echo $RB;}?>" id="RB">
			</div>
				 <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
			   	 <div style=" margin-top: 8px;" class="col">
			        <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Location</label>
				    <select class="form-control" aria-label="Default select example" name="select_location" id="filters_by_location_admin_connector">
				   	  
						<option value="" >Select </option> 
						    <?php
       							foreach($filter_location as $u)
						       {
						       	if($u->Location!='')
						       	{
						        echo '<option value="'.$u->Location.'" >'.$u->Location.'</option>';
						        }
						       }
						      ?>
					</select>
				</div> 
				 <input type="text" hidden value="<?php if(isset($location)){echo $location;}?>" id="location">
			 </div>
		</div>
		<hr>
   <body class="wide comments example">
														<div class="fw-body">
															<div class="content">
																<div style="overflow-x:auto;">
																	<div class="demo-html">
																		<table id="empTable" class="display" style="width:100%">
																			<thead>
																				<tr>
					    															<th hidden>id</th>
																					<th>Name</th>
																					<th>Email</th>
																					<th>Mobile</th>
																					<th>Location</th>
																					<th>Referred By</th>
																					<th>Profile Status</th>
																					<th>Date</th>
																					<th>Actions</th>
																					<!--<th>Actions</th>-->
																				</tr>
																			</thead>
																			
																		</tbody>
																	</table>
																</div>
															</div>
	    												</div>
													</div>
                                                </body>
												<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                    DELETE
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/delete_connector" method="POST" id="change_contact_status">
	                  <div class="form-group">
	                                <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this Connector?</label>	                         
	                    <input name="id" type="number" class="idform"  hidden />
							 						
	                  </div>                  

	                  <!-- Modal Footer -->
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default"
			                        data-dismiss="modal">
			                            CANCEL
			                </button>
			                <button type="submit" class="btn btn-primary">
			                    DELETE IT
			                </button>
			            </div>
	                </form>                
	            </div>            
	        </div>
	    </div>
	</div>
<script >
		 $(".modal_test ").on("click", function(){
           var dataId = $(this).attr("data-id");
		   $(".idform").val(dataId);
       
    });
	</script>


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

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
<script>
function demo()
	{
		var $var=document.getElementById("filter_name");
		alert($var);
	}
	</script>


<script>


         
         $(document).ready(function(){
			var End_Date=document.getElementById("end_date1").value;
			var Start_Date=document.getElementById("start_date1").value;
			var filter = document.getElementById("filter").value;
			var Reffered_by = document.getElementById("RB").value;
			var location = document.getElementById("location").value;
             $('#empTable').DataTable({
                 'processing': true,
                 'serverSide': true,
                 'serverMethod': 'post',
                 'ajax': {
                     //'url':'ajaxfile.php'
                     'url':window.location.origin+"/finserv_test/dsa/dsa/index.php/Admin/customer_with_paginations_admin_Connector",
					  'data':{filter:filter,Start_Date:Start_Date,End_Date:End_Date,Reffered_by:Reffered_by,location:location},

                 },
                 'columns': [

					 {data: 'FN'},
					 {data: 'Email'},
					 {data: 'MOBILE'},
					  {data: 'Location'},
					 {data: 'Profile_Status'},
                     {data: 'Refered_by'},
					 {data: 'date'},
					 {data: 'Actions'},
					

                 ]
             });
          //   $('#empTable').DataTable().column(0).visible(false);



var value=$("#Admin_connector_filter").val();
      // alert(value);

		if(value=='Current_Month')

		{
				 var el_down = document.getElementById("Start_Date");
				 var date = new Date();
				// document.write("Current Date: " + date );
				 var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);

				var dd = firstDay.getDate();
				var mm = firstDay.getMonth() + 1;

				var yyyy = firstDay.getFullYear();
				if (dd < 10) {
					dd = '0' + dd;
				}
				if (mm < 10) {
					mm = '0' + mm;
				}
				var firstDay =  yyyy+ '-' + mm + '-'+ dd;
				$('#connector_Start_Date_filter').val(firstDay);
				$('#connector_Start_Date_filter').prop('readonly', true);
				var lastDay =
				new Date(date.getFullYear(), date.getMonth() + 1, 0);
				var dd = lastDay.getDate();
				var mm = lastDay.getMonth() + 1;

				var yyyy = lastDay.getFullYear();
				if (dd < 10) {
					dd = '0' + dd;
				}
				if (mm < 10) {
					mm = '0' + mm;
				}
				var lastDay =  yyyy+ '-' + mm + '-'+ dd;
				$('#connector_End_Date_filter').val(lastDay);
				$('#connector_End_Date_filter').prop('readonly', true);
		}
		if(value=='Previous_Month')

		{
				 var el_down = document.getElementById("Start_Date");
				 var date = new Date();
				// document.write("Current Date: " + date );
				 var firstDay = new Date(date.getFullYear(), date.getMonth()- 1, 1);

				var dd = firstDay.getDate();
				var mm = firstDay.getMonth() + 1;

				var yyyy = firstDay.getFullYear();
				if (dd < 10) {
					dd = '0' + dd;
				}
				if (mm < 10) {
					mm = '0' + mm;
				}
				var firstDay =  yyyy+ '-' + mm + '-'+ dd;
				$('#connector_Start_Date_filter').val(firstDay);
				$('#connector_Start_Date_filter').prop('readonly', true);
				var lastDay =
				new Date(date.getFullYear(), date.getMonth() , 0);
				var dd = lastDay.getDate();
				var mm = lastDay.getMonth() + 1;

				var yyyy = lastDay.getFullYear();
				if (dd < 10) {
					dd = '0' + dd;
				}
				if (mm < 10) {
					mm = '0' + mm;
				}
				var lastDay =  yyyy+ '-' + mm + '-'+ dd;
				$('#connector_End_Date_filter').val(lastDay);
				$('#connector_End_Date_filter').prop('readonly', true);
		}
		if(value=='Select_Range')
		{
			/*if ( $('#Start_Date').is('[readonly]') ) { $('#Start_Date').prop('readonly', false); }
			if ( $('#End_Date').is('[readonly]') ) { $('#End_Date').prop('readonly', false); }
			$('#Start_Date').val('');
			$('#End_Date').val('');*/
			const queryString = window.location.search;
			const urlParams = new URLSearchParams(queryString);
			const Start_Date = urlParams.get('Start_Date');
			

			const End_Date = urlParams.get('End_Date');
			$('#connector_Start_Date_filter').val(Start_Date);
			$('#connector_End_Date_filter').val(End_Date);



		}
       });
         </script>
     

   
	
       

</body>
</html>