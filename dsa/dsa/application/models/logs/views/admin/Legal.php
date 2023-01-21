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
<!--<base href="./">-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta name="description" content="Finaleap">
<meta name="author" content="Łukasz Holeczek">
<meta name="keyword" content="Finaleap">
<title>Finaleap | DSA List</title>
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

tr:nth-child(even){background-color: #f2f2f2}
</style>

</head>
<body class="c-app">
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
<img src="<?php echo base_url(); ?>images/logo.png"/>

</div>
<?php
 
  $result = $this->session->flashdata('result');   if (isset($result)) {
		if($result=='1'){
			
			    $res = $this->session->flashdata('message');
				if($res=='Customer Deleted Sucessfully')
				{
				echo '<script> swal("success!", "Customer Deleted Sucessfully", "success");</script>';
				$this->session->unset_userdata('result');	
				}
				
                			
			 }
			 else if($result=='2')
			 {
				 $res = $this->session->flashdata('message');
				if($res=='Something get Wrong')
				{
				echo '<script> swal("warning!", "Something get Wrong", "warning");</script>';
				$this->session->unset_userdata('result');	
				}
				
			 }
  }?>
  <?php if(!empty($row))	
  {
	  $user_role=$row->ROLE; 
	  if($row->Profile_Status!="Complete" && $row->ROLE==13 )  
	  {  ?>
			<ul class="c-sidebar-nav">
				<li class="c-sidebar-nav-item">
					<a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager">	<svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> Dashboard</a>
			   </li>
 				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/profile">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
					</svg> Profile</a></li>

	  				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/Create_lead">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-users" style="margin-right: 20px;"></i>	
					</svg> Create new Lead</a></li>
					<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/View_Lead">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-users" style="margin-right: 20px;"></i>	
					</svg> View Lead</a></li>

				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/changePassword">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-file" style="margin-right: 20px;"></i>	
					</svg> Change Password</a>
				</li>
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Admin/manage_coorporate_banks">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
					</svg>Add New Coorporate Bank</a>
				</li>
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Admin/One_Monthly_Billing">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
					</svg>One Time Monthly billing</a>
				</li>
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Admin/Monthly_Billing">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
					</svg>Regular Monthly  billing</a>
				</li>
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/logout">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-arrow-circle-left" style="margin-right: 20px;"></i>	
					</svg> Logout</a>
				</li>
			</ul>
<?php  }  
else if($row->ROLE==3)
{
	?>

			<ul class="c-sidebar-nav">
					<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user">

						<svg class="c-sidebar-nav-icon">
							<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
						</svg> Dashboard</a></li>
						<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user/profile">
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
								<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/Connector?s=all">
						<svg class="c-sidebar-nav-icon">
							<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
						</svg> Connectors List</a></li>
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


	<?php
}
else if($row->ROLE==8)
					{
						?>
						<ul class="c-sidebar-nav">
	    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/credit_manager_user">

		    <svg class="c-sidebar-nav-icon">
			    <i class="fa fa-th-large" style="margin-right: 20px;"></i>	
		    </svg> Dashboard</a></li>
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
							<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Operations_user/profile">
							<svg class="c-sidebar-nav-icon">
							<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
							</svg> Profile</a></li>

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
	    </ul>
						<?php
					}

else   if($row->ROLE==13)
{  ?>
	<ul class="c-sidebar-nav">

<li class="c-sidebar-nav-item">
	<a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager">	<svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> Dashboard</a>
</li>
 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/profile">
	<svg class="c-sidebar-nav-icon">
		<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
	</svg> Profile</a></li>
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
	</svg> View Lead</a></li>

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
</ul>
<?php  }}?>
<?php if(!empty($row))	{if($row->ROLE==5 )  {  ?>
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
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Legal">Legal</a>
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
				
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/logout">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-arrow-circle-left" style="margin-right: 20px;"></i>	
					</svg> Logout</a>
				</li>
			</ul>

<?php } }?>

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
<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">Dashboard</a></li>
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


<div >
        <div class="">
			<div class="row">

				
				<?php if(isset($data))
				       {
						  if(count($data) != 0) 
						  {  ?>
						  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   <lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php echo count($data); ?>&nbsp;&nbsp;<a href="<?=base_url('index.php/admin/download_Excel')?>">
						   <i class="fa fa-download "style='font-size:24px; color:green;'></i></a></lable>
						   
						   <?php $excelData = json_decode(json_encode($data), true);?>
						   </div>
						  <?php  } 
				          else
						  {?>
						   <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;" >
						   <lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">Total <?php echo count($data); ?>&nbsp;&nbsp;</lable>
				    	   </div>
					
				<?php     } 
			            } 
						else
						{ ?>
					       <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   <lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php echo count($data); ?>&nbsp;&nbsp;</lable>
				    	   </div>
							<?php   }   ?>
				
							<div class="col-sm-2" style="padding-left:0px;margin-left:-5%;">
							<lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Add Legal&nbsp;&nbsp;<a href="<?php echo base_url()?>index.php/dsa/new_customer?type=Legal">
						   <i class="fa fa-plus "style='font-size:24px; color:green;'></i></a></lable>
							</div>
			
					
				   <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
						</div>
						<div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:5%;"><lable style="margin-left:8px;">Filter : </lable>
				   </div>
				<div class="col-sm-2" >
			
				<select class="form-control" aria-label="Default select example" name="select_filters" id="select_dropdown_filters">
						<option value="">Select Filter</option>
						
						<option value="bank">Bank name</option>
						
						</select>
							
				</div>
		
		   
	
            </div>
          
        </div>
		<hr>
</div>
  
  <body class="wide comments example">

	
<div class="fw-body">
	<div class="content">
	<div style="overflow-x:auto;">
		<div class="demo-html">
			<table id="example" class="display" style="width:100%">
				<thead>
					<tr>
					    <th hidden>id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Profile Status</th>
						
						<th>Creted at</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php  $i= 1 ; if(!empty($data)){foreach($data as $row){  ?>
					<tr>
					    <td hidden><?php echo $row->ID; ?></td>
						<td><?php echo $row->FN." ".$row->LN;?></td>
						<td><?php echo $row->EMAIL; ?></td>
						<td><?php echo $row->MOBILE; ?></td>
						<?php if($row->Profile_Status=='' || $row->Profile_Status==NULL) { ?><td style="font-size: 10px; color: red">	INCOMPLETE PROFILE </td>
					    <?php }else { ?><td style="color: green; font-size: 10px;">COMPLETED PROFILE </td>
						<?php } ?>
						
						<td><?php $date = date_create($row->CREATED_AT); echo date_format($date, 'd-m-Y h:i');?></td>
						<td>
						<?php if(!empty($row))	
						{
							if($role_for_access==5 )  
							{ 
								?>
						<a href="<?php echo base_url()?>index.php/admin/View_DSA_profile?ID=<?php echo $row->UNIQUE_CODE;?>" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>&nbsp;&nbsp;
						 <?php }
						else
						{
                        ?>
						<a  class="btn modal_test"><i class="fa fa-eye text-right" style="color:gray;"></i></a>&nbsp;&nbsp;
						
						<?php
						}
						}
						?>
						
						<?php if(!empty($row))	
						{
							if($role_for_access==5 )  
							{ 
								?>
						<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel_delete" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a></td>
					    <?php }
						else
						{
                        ?>
						<a style="margin-left: 8px; "  class="btn "><i class="fa fa-trash text-right" style="color:gray;"></i></a></td>
					    
						<?php
						}
						}
						?>
						</tr>
					<?php  $i++; } } ?> 
				
					
				</tbody>
			
			</table>
		</div>
	</div>
			
	</div>
</div>
</div>

</body>
	
	<div class="modal fade" id="deleteModel_delete" tabindex="-1" role="dialog" 
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
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/delete_dsa" method="POST" id="change_contact_status">
	                  <div class="form-group">
	                                <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this DSA ?</label>	                         
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

<!-- Modal -->
<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            	<h4 class="modal-title" id="myModalLabel">
                    FILTER BY BANK 
                </h4>
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/dsa" method="GET" id="dsa_bnk_filter">
                  <div class="form-group">                    
					<div class="wrap-select validate-input ">
						<label class="input100"> Select Bank Name </label> 
						<span class="focus-input100"></span>
						<input type="text" name="s" value="bnk" hidden>
						<select name="bnk_name" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 40px; margin-bottom: 8px; padding: 3px;" required> 
						  <option value="">None</option>
						  <?php foreach($banks as $bank) {
								echo "<option value='$bank->BANK_NAME'>$bank->BANK_NAME</option>";
						  }?>							  
						</select>
					</div>
                  </div>                  

                  <!-- Modal Footer -->
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default"
		                        data-dismiss="modal">
		                            CANCEL
		                </button>
		                <button type="submit" class="btn btn-primary">
		                    FILTER
		                </button>
		            </div>
                </form>                
            </div>            
        </div>
    </div>
</div>

<script type="text/javascript">
	$('#deleteModel').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) 
	  var recipient = button.data('id') 
	  var modal = $(this)
	  modal.find('.modal-body .dsa_bnk_filter').val(recipient)
	})		
</script>

<div class="modal fade" id="deleteModel_city" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            	<h4 class="modal-title" id="myModalLabel">
                    FILTER BY City
                </h4>
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/dsa" method="GET" id="dsa_city_filter">
                  <div class="form-group">                    
					<div class="wrap-select validate-input ">
						<label class="input100"> Select City Name </label> 
						<span class="focus-input100"></span>
						<input type="text" name="s" value="city" hidden>
						<select name="city_name" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 40px; margin-bottom: 8px; padding: 3px;" required> 
						  <option value="">None</option>
						  <?php foreach($cities as $city) {
								echo "<option value='$city->CITY'>$city->CITY</option>";
						  }?>							  
						</select>
					</div>
                  </div>                  

                  <!-- Modal Footer -->
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default"
		                        data-dismiss="modal">
		                            CANCEL
		                </button>
		                <button type="submit" class="btn btn-primary">
		                    FILTER
		                </button>
		            </div>
                </form>                
            </div>            
        </div>
    </div>
</div>

<script type="text/javascript">
	$('#deleteModel_city').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) 
	  var recipient = button.data('id') 
	  var modal = $(this)
	  modal.find('.modal-body .dsa_city_filter').val(recipient)
	})		
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
<script >
		 $(".modal_test ").on("click", function(){
           var dataId = $(this).attr("data-id");
		   $(".idform").val(dataId);
       
    });
	</script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>


<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>

</body>
</html>