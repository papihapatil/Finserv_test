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
			<title>Finaleap | Profile form </title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
            <link href="<?php echo base_url(); ?>css/style1.css" rel="stylesheet">
			<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
			    <?php if(!empty($row))	
					{ 
				     
						   if($row->Profile_Status!="Complete")  
							{  ?>
								<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/profile">
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
															
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/dsa/customers">Customers</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector_alluser?s=all">Connector</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/dsa/csr">CSR</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/dsa/managers">Managers</a>
														</div>
													</li>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/Create_lead">
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
												else if($row->ROLE==18 )
												{	?>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Legal">
		
															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
															</svg> Dashboard</a></li>
													<?php 
												}
												else if($row->ROLE==24)
												{	?>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/FI">

															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
															</svg> Dashboard</a></li>
													<?php 
												}
												else if($row->ROLE==25 )
												{	?>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/RCU">

															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
															</svg> Dashboard</a></li>
													<?php 
												}	
												else if($row->ROLE==3)
												{
										    ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user">
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
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user/View_Lead">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
														</svg>View Lead</a>
													</li>
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
													<li class="c-sidebar-nav-item">
														<button class="btn btn1  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
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
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> View Lead</a>
													</li> 
						
										    <?php 
												}		else if($row->ROLE==22)
												{
													?>
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
												
												else if($row->ROLE==26)
												{ 
										    ?>
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
													
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Insurance/managepremium">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Manage Premium</a>
													</li>
													
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
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/dsa_allusers">DSA</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector_alluser?s=all">Connector</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/customers_allusers">Customers</a>
															<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Relationship_Officer?s=all">Relationship Officer</a>
															
															
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
										  
									<!--added by sonal 26-02-2022-->		
								<?php
								 
								}	
							 else if($row->ROLE==15)
								{	
									
									?>
							        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Cluster_Manager">
         
										<svg class="c-sidebar-nav-icon">
											<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
										</svg> Dashboard</a></li>
										<li class="c-sidebar-nav-item">
											<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
												<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											
											<a class="dropdown-item" href="<?php echo base_url();?>index.php/Cluster_Manager/branch_manager?s=all">Branch Manager</a>
											<a class="dropdown-item" href="<?php echo base_url();?>index.php/Cluster_Manager/Relationship_Officer?s=all">Relationship Officer</a>
											<a class="dropdown-item" href="<?php echo base_url();?>index.php/Cluster_Manager/dsa?s=all">Dsa</a>
											<a class="dropdown-item" href="<?php echo base_url();?>index.php/Cluster_Manager/Connector?s=all">Connector</a>
											<a class="dropdown-item" href="<?php echo base_url();?>index.php/Cluster_Manager/Customer?s=all">Customer</a>
											
												
											
											</div>
										</li>
										
										<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Cluster_Manager/Create_lead">
										<svg class="c-sidebar-nav-icon">
											<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
										</svg> Create New Lead</a></li>
										<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Cluster_Manager/View_Lead">
										<svg class="c-sidebar-nav-icon">
											<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
										</svg>View Lead</a></li>
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
											<li class="c-sidebar-nav-item">
												<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
													<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/dsa_allusers">DSA</a>
													<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector_alluser?s=all">Connector</a>
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
													
													
													
													
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/distributor/managerequestall">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Manage Invoice</a>
													</li>
														
													
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
												else if($row->ROLE==29)
												{
										    ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/distributor">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard </a>
													</li> 
													<?php if($status=='Approved'){?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/distributor/viewretailer">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Manage Retailers</a>
													</li>
													<?php } ?>
													<?php if($status=='Approved'){?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/distributor/managerequest">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Manage Invoice</a>
													</li>
												    <?php } ?>
														
													
											<?php
												}
												else if($row->ROLE==27)
												{
										    ?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/retailers">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													<?php if($status=='Approved'){?>
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/retailers/managerequest">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-users" style="margin-right: 20px;"></i>	
														</svg> Manage Invoice </a>
													</li>
													<?php } ?>
													
													
											<?php
												}
										 else if($row->ROLE==23 )
												{	?>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Cluster_credit_manager">

															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
															</svg> Dashboard</a></li>
													<?php 
												}
												else if($row->ROLE==31 )
												{	?>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Sales_Head">

															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
															</svg> Dashboard</a></li>
													<?php 
												}
												else if($row->ROLE==32 )
												{	?>
														<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Chief_Risk_Officer">

															<svg class="c-sidebar-nav-icon">
																<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
															</svg> Dashboard</a></li>
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
							
													<?php 
												}
											
										}	
										
										
									
									
										
										
										
									?>
										
								
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
				<?php
										}
					    }
					
					
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
					<?php if(isset($userType)){ if($userType=='ADMIN' || $userType=='') 
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