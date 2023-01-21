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
			<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=94461d89946ef749b7a43d14685c725d1">
			<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
			<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>- -->
			<script type="text/javascript"  src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
				<script type="text/javascript">	
						$(document).ready(function() {
						$('#example').DataTable( {
							"order": [[ 0, "desc" ]]
						} );
					} );
	
				</script>
				<script>
				  <!-- Datatable CSS -->
									<link href="<?php echo base_url('DataTables/datatables.min.css')?>" rel='stylesheet' type='text/css'>

					<!-- jQuery Library -->
					<script src="<?php echo base_url('jquery-3.3.1.min.js')?>"></script>

					<!-- Datatable JS -->
					<script src="<?php echo base_url('DataTables/datatables.min.js')?>">
					</script>
			<script>
				
			  window.dataLayer = window.dataLayer || [];
			  function gtag(){dataLayer.push(arguments);}
			  gtag('js', new Date());
			  gtag('config', 'UA-118965717-1');
			</script>
			<style>
.notification {
    display: inline-block;
    position: relative;
    padding: 0.6em;
    background: #3498db;
    border-radius: 0.2em;
    font-size: 1.3em;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.notification::before, 
.notification::after {
    color: #fff;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

.notification::before {
    display: block;
    content: "\f0f3";
    font-family: "FontAwesome";
    transform-origin: top center;
}

.notification::after {
    font-family: Arial;
    font-size: 0.7em;
    font-weight: 700;
    position: absolute;
    top: -15px;
    right: -15px;
    padding: 5px 8px;
    line-height: 100%;
    border: 2px #fff solid;
    border-radius: 60px;
    background: #3498db;
    opacity: 0;
    content: attr(data-count);
    opacity: 0;
    transform: scale(0.5);
    transition: transform, opacity;
    transition-duration: 0.3s;
    transition-timing-function: ease-out;
}
.notification.notify::before {
    animation: ring 1.5s ease;
}
.notification.show-count::after {
    transform: scale(1);
    opacity: 1;
}
.notification .badge {
  position: absolute;
  top: -5px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
.dropdown1
{
	display:none;
	position: absolute;
}	
#notification_count
{
	display:none;
}
@keyframes ring {
    0% {
        transform: rotate(35deg);
    }
    12.5% {
        transform: rotate(-30deg);
    }
    25% {
        transform: rotate(25deg);
    }
    37.5% {
        transform: rotate(-20deg);
    }
    50% {
        transform: rotate(15deg);
    }
    62.5% {
        transform: rotate(-10deg);
    }
    75% {
        transform: rotate(5deg);
    }
    100% {
        transform: rotate(0deg);
    }
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
						   if($row->Profile_Status!="Complete")  
							{  ?>
								<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/update_basic_profile_2">
								<svg class="c-sidebar-nav-icon">
								  <i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
								</svg> Profile</a></li>
								<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/logout">
								<svg class="c-sidebar-nav-icon">
									<i class="fa fa-arrow-circle-left" style="margin-right: 20px;"></i>	
								</svg> Logout</a></li>
					<?php   }  
					    
					   else 
					   { 
                                       	if(!empty($row))	
										{

													if($row->ROLE==2)  
												{		
							?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Dsa">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/loans">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-file" style="margin-right: 20px;"></i>	
														</svg> Applied Loans</a>
													</li>
													<li class="c-sidebar-nav-item">
														<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/customers_allusers">Customers</a>
															<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector_alluser?s=all">Connector</a>-->
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/dsa/csr">CSR</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/dsa/managers">Managers</a>
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
										    <?php
												}
												else if($row->ROLE==3)
												{
										    ?>
													<!--<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user">
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
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/Operations_user/customers">Customers</a>
														</div>
													</li>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/View_Lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
														</svg>View Lead</a>
													</li>-->
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
													
														
												<?php
												}
												else if($row->ROLE==4)
												{
										    ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/connector">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
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
											<?php
												}
												else if($row->ROLE==5)
												{
													?>

										
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
																<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/dsa?s=all">DSA</a>
																<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector?s=all">Connector</a>-->
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
														<!--<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Rule_Engine/Risk_Dimension">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
																	</svg>Risk Dimension/Parameters</a>
														</li>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Rule_Engine/Criteria">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
															</svg>Criteria</a>
														</li>-->
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
														<!--
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Admin/One_Monthly_Billing">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
															</svg>One Time Monthly billing</a>
														</li>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Admin/Monthly_Billing">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
															</svg>Regular Monthly  billing</a>
														</li> -->
			
			
											
												<?php }
												else if($row->ROLE==6)
												{
										    ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/csr">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													<li class="c-sidebar-nav-item">
														<button class="btn btn1  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/customers_allusers">Customers</a>
															
															
														</div>
													</li>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/connector/Create_lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Create new Lead</a>
													</li>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/View_Lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> View Lead</a>
													</li>
										    <?php 
												}	
                                                 else if($row->ROLE==7)
												{
										    ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/manager">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													<li class="c-sidebar-nav-item">
														<button class="btn btn1  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/csr_allusers">CSR</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/customers_allusers">Customers</a>
															
															
														</div>
													</li>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/connector/Create_lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Create new Lead</a>
													</li>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/View_Lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> View Lead</a>
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
										    <?php 
												}		
												 else if($row->ROLE==9)
												{ 
										    ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/HR">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/HR/Applicants">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg>Applicants</a>
													</li>
										    <?php 
												}	
                                                else if($row->ROLE==13)
												{
										     ?>
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
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Relationship_Officer/MIS_Updates">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg>MIS Updates</a>
													</li>
										    <?php 
												}		
                                                 else if($row->ROLE==14)
												{
										    ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Relationship_Officer">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
												<!--	<li class="c-sidebar-nav-item">
														<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/dsa_allusers">DSA</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector_alluser?s=all">Connector</a>-->
															<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/customers_allusers">Customers</a>
															
														</div>
													</li>-->
												<!--	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/Create_lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Create new Lead</a>
													</li>
												    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/View_Lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> View Lead</a>
													</li>-->
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Relationship_Officer/MIS_Updates">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg>Sales tracker</a>
													</li>
										

										    <?php 
												}	
                                                else if($row->ROLE==15)
												{	?>
										         	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Cluster_Manager">

														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a></li>
														<li class="c-sidebar-nav-item">
															<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Cluster_BM?s=all">Branch Manager</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Cluster_RO?s=all">Relationship Officer</a>
															<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Cluster_Dsa?s=all">Dsa</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Cluster_connector?s=all">Connector</a>-->
														
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Cluster_customers?s=all">Customer</a>
																
															
															</div>
														</li>
														
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/Create_lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Create New Lead</a></li>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/View_Lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg>View Lead</a></li>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/Assign_Lead">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-users" style="margin-right: 20px;"></i>	
															</svg> Assign Lead</a>
														</li>
											<?php
												}
												 else if($row->ROLE==16)
												{	?>
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

											<?php
												}
												else if($row->ROLE==17)
												{	?>
										         	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/RegionalManager">

														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard </a></li>
														<li class="c-sidebar-nav-item">
															<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/RegionalManager/cluster_manager?s=all">cluster manager</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/RegionalManager/Regional_BM?s=all">Branch Manager</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/RegionalManager/Regional_RO?s=all">Relationship Officer</a>
															<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/RegionalManager/Regional_Dsa?s=all">Dsa</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/RegionalManager/Regional_connector?s=all">Connector</a>-->
														
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/RegionalManager/Regional_customers?s=all">Customer</a>
																
															
															</div>
														</li>
														
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/Create_lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Create New Lead</a></li>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/View_Lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg>View Lead</a></li>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/Assign_Lead">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-users" style="margin-right: 20px;"></i>	
															</svg> Assign Lead</a>
														</li>
											<?php
												}			
												
													else if($row->ROLE==21)
												{
										     ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Sales_Manager">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													<li class="c-sidebar-nav-item">
														<button class="btn btn1  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															<!--<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/dsa_allusers">DSA</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector_alluser?s=all">Connector</a>-->
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/customers_allusers">Customers</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Relationship_Officer?s=all">Relationship Officer</a>
															
															
														</div>
													</li>
												<!--	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/Create_lead">
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
													</li>-->
													

										    <?php 
												}
										    
											else if($row->ROLE==18)
												{	?>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Legal">

															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
															</svg> Dashboard</a></li>
															<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Legal/customers">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Customers</a></li>
												<?php }
												else if($row->ROLE==19)
												{	?>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Technical">

															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
															</svg> Dashboard</a></li>
															<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Technical/customers">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Customers</a></li>
												<?php }
												else if($row->ROLE==24)
												{	?>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/FI">

															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
															</svg> Dashboard</a></li>
															<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/FI/customers">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Customers</a></li>
												<?php }
												else if($row->ROLE==25)
												{	?>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/RCU">

															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
															</svg> Dashboard</a></li>
															<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/RCU/customers">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Customers</a></li>
												<?php }
												else if($row->ROLE==27)
												{
										    ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/retailers">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
												   <?php if ($status=='Approved'){?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/retailers/managerequest">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Manage Invoice </a>
													</li>
													<?php } ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/retailers/managereports">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Manage Report </a>
													</li>
													
													
													
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/update_basic_profile_2">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
														</svg> Profile</a>
													</li> 
											<?php
												}
												else if($row->ROLE==29)
												{
										    ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/distributor">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													<?php if ($status=='Approved'){?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/distributor/viewretailer">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Manage Retailers</a>
													</li>
													<?php } ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/distributor/managerequest">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Manage Invoice</a>
													</li>
												
														<!--
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/distributor/manageinvoice">
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-users" style="margin-right: 20px;"></i>	
															</svg> Manage Invoice</a>
														</li> -->
														
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/distributor/managereports">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Manage Reports </a>
													</li>
													
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/update_basic_profile_2?id="<?php if(!empty($row)){ echo $row->UNIQUE_CODE;}?>">
												<svg class="c-sidebar-nav-icon">
												  <i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
												</svg> Profile</a>
											</li>	
											<?php
												}
													else if($row->ROLE==28)
												{
										    ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Supply_chain">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/distributor/managedistributor">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Manage Distributor</a>
													</li>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/distributor/addretailerall">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Manage Retailers</a>
													</li>
													
													<!--<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/distributor/retailerbulkupload">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Retailers bulk upload</a>
													</li> -->
													
													
													
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Supply_chain/managerequestall">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Manage Invoice</a>
													</li>
														<!-- <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/distributor/manageinvoiceall">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Manage Invoice</a>
													</li> -->
													
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/distributor/manageproduct">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Manage Product</a>
													</li>
													
													
											<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/retailers/profile">
												<svg class="c-sidebar-nav-icon">
												  <i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
												</svg> Profile</a>
											</li>		
											
											<?php
												}
												else if($row->ROLE==26)
												{	?>
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

													<!-- <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Payments/managepayment">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Manage Payment</a>
													</li>
													-->
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Insurance/manageinsurance">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Manage App</a>
													</li>
													
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Insurance/managecoi">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Manage COI</a>
													</li>
													
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Insurance/managedogh">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Manage Dogh</a>
													</li>
													
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Insurance/managecoidogh">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Manage coidogh</a>
													</li>
													
													
													
												<?php }  else if($row->ROLE==30)
												{
										            ?>
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
													<?php 
												}
												else if($row->ROLE==31)
												{
										            ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Business_Head">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													
													<?php 
												}
												else if($row->ROLE==32)
												{
										            ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Chief_Risk_Officer">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													<li class="c-sidebar-nav-item">
													<a class="c-sidebar-nav-link"  href="<?php echo base_url();?>index.php/dsa/profile">
														<svg class="c-sidebar-nav-icon">
															 <i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
														</svg> Profile</a>
													</li>
													
													<?php 
												}
												else if($row->ROLE==33)
												{
										            ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Supply_chain">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/distributor/managedistributor">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Manage Distributor</a>
													</li>
													<?php 
													}
													//=========================== added by priya =============================================
												else if($row->ROLE==34)
												{
										            ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Telecaller">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/profile">
														<svg class="c-sidebar-nav-icon">
														  <i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
														</svg> Profile</a>
													</li>
													<?php 
												}

												?>
											
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
								<?php
										}
					    }
					
					}	
					else{
						  redirect(base_url('index.php/login'));
					   }						
					?>
					
					   
				   
					<!--
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
					</svg>View Lead</a></li>-->
				
					
				
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
				<!-- <span style='font-size:14px'><?php if(isset($userType)) { if($userType=="Operations_user") echo "(Operations User)"  ; } ?>  </span>-->
					<li style="margin-left: -8px;">
				 <div class="notification"> <span class="badge" id="notification_count" data-toggle="modal" data-target="#notification_modal" ></span></div>
					 <!-- <ul class="dropdown1">
					    
					 </ul> -->
				</li>
					<a href="<?php echo base_url();?>index.php/logout">Logout</a>
				<?php
					}
					else
					{
                ?>
				<span style='font-size:14px'>Hi, <?php if(isset($username)){ echo "<b>".ucwords($username)."</b>  "; echo "[".ucwords($userType)."]  "; }?></span>
					<!--<span style='font-size:14px'><?php if(isset($userType)) { if($userType=="Operations_user") echo "(Operations User)"  ; } ?>  </span>-->
						<li  style="margin-left: -8px;">
				     <div class="notification"> <span class="badge" id="notification_count" data-toggle="modal" data-target="#notification_modal"></span></div>
					  <!-- <ul class="dropdown1">
					    
					 </ul> -->
				</li>
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
				<script type="text/javascript">
				 $("#notification_count" ).click(function(e) 
					{
					
					$("#notification_count").css("display", "none");
					
					 var user_id='<?php echo $this->session->userdata('ID'); ?>';
					var url = window.location.origin+"/finaleap_finserv/dsa/dsa/index.php/admin/change_notification_satus";
					 $.ajax({
										type:'POST',
										url:url,
									   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
										data:{user_id:user_id},
										success:function(data)
										{
																				
											 
											
										}
					 });
					});
				</script>
			</header>
			<!------------------------Modal--------------------------------->
<div class="modal fade" id="notification_modal" tabindex="-1" role="dialog" 
		aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
		   <div class="modal-content">
			   <!-- Modal Header -->
			   <div class="modal-header">
				   <h4 class="modal-title" id="myModalLabel">
					 Notifications
				   </h4>
				   <button type="button" class="close" 
					  data-dismiss="modal">
						  <span aria-hidden="true">&times;</span>
						  <span class="sr-only">Close</span>
				   </button>                
			   </div>
			   
			   <!-- Modal Body -->
			   <div class="modal-body">
				   <div  id="dropdown1">
				   </div>
				                   
			   </div>
					 <!-- Modal Footer -->
					   <div class="modal-footer">
						   <button type="button" class="btn btn-default"
								   data-dismiss="modal">
									   CANCEL
						   </button>
						   
					   </div>
				   </form>                
						
		   </div>
	   </div>
   </div>
<!-------------------------------------------------------------------------------------------------------->

	<script type="text/javascript" class="init">
	
	
			$(document).ready(function()
			 { 
				
			    var user_id='<?php echo $this->session->userdata('ID'); ?>';
			  
			    var setInterval_ID=setInterval(function(argument){
					if($('#exampleModal').hasClass('show'))
												{
													clearInterval(setInterval_ID);
												}
												 
					 
					 var url = window.location.origin+"/finaleap_finserv/dsa/dsa/index.php/admin/get_notification"; 
							  $.ajax({
										type:'POST',
										url:url,
									   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
										data:{user_id:user_id},
										success:function(data)
										{
										var obj =JSON.parse(data);
                                         var count=obj.length;
										 //alert(count);
										
											if(count>0)	
											{
											
												$('#notification_count').show();
												$('#notification_count').text(count);
												$("#dropdown1").html(' ');
												 $.each(obj, function (index, value) 
												 {
													
														
														 $("#dropdown1").append('<p>'+value.notification+'</p>');
												 });
												 
											}												
											 
											
										}
										
								 });
				},1000);
				
			 });
			
			</script>