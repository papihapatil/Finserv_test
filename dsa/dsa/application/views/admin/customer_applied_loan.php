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
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">

		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
		</svg> Dashboard</a></li>
		<li class="c-sidebar-nav-item">
		<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Hr?s=all">HR</a>
		<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/CSR">CSR</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/dsa?s=all">DSA</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector?s=all">Connector</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/customers">Customers</a>
				<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Manager"> Managers</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/IDCCR_USERS">IDCCR Users</a>
			
		<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/credit_manager_user?s=all">Credit Manager</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/branch_manager?s=all">Branch Manager</a>
			
				<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Operations_user?s=all">Operations user</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Relationship_Officer_list?s=all">Relatationship Officer</a>
			
		
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
		<div>
    		<div class="container">
			<div class="row">
			    <div class="col-sm-3">
					
				</div>
  				<div class="col-sm-4">
					<div class="screen-title" style="margin-bottom:15px;">                    	
					<form id="credit_saction_form" action="<?= base_url('index.php/admin/customer_applied_loan')?>" method="post">
	     			<input type="text" class="form-control" name="filter_name" id="filter_name"  placeholder="Search by first or last name"/>
	        		</div> 
                </div>
                <div class="col-sm-1" style="margin-bottom:10px;">
                <button class="btn btn-info" style="background-color: #25a6c6;" name="submit" value="submit">Search</button>
	         	</form>	
</div>

<div class="col-sm-3" style="margin-bottom:10px;">
<form id="credit_saction_form" action="<?= base_url('index.php/admin/customer_applied_loan')?>" method="post">
<select class="form-control" aria-label="Default select example" name="select_filters">
		<option value="">Select</option>
		<option value="all">All Customers</option>
		<option value="business">Business Loan</option>
		<option value="personal">Personal Loan</option>
		<option value="credit">Credit Loan</option>
		<option value="home">Home Loan</option>
		<option value="lap">Lap Loan</option>
	</select>
</div>
<div class="col-sm-1" style="margin-bottom:15px;">     
	<button class="btn btn-info" style="background-color: #25a6c6;" name="submit" value="submit">
		Filter
	</button>
		
</div>
</form>	
</div>


<?php if(count($data) == 0) {?>
	<div class="row justify-content-center">
        <div class="screen-title" style="margin-top: 10%;">
        	<small style="border-radius: 10px; padding: 15px; background-color: white;">Customer not found </small> 
        </div>                    
    </div>            	
<?php }
?>

<?php foreach($data as $row){?>
	
	<div class="row justify-content-center">
		
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			
				<div class="card mb-3">
				  <div class="row no-gutters">
				    <div class="col-xl-2.5 col-lg-2.5 col-md-2.5 col-sm-2.5 col-2.5 align-self-center">
				    <?php if($row->PHOTO !='') { ?>	
				      <img  style="margin-left: 10px;" src="<?php base_url()?>/dsa/dsa/images/<?php echo $row->PHOTO;  ?>" class="rounded float-left card-img manager-img">
				    <?php } else {?>
				    	<img  style="width:40px; height: 40px; margin-left: 10px; margin-top: 4px; margin-bottom: 4px; margin-left: 4px;" src="<?php base_url()?>/dsa/dsa/images/user.png" class="rounded float-left card-img manager-img">
				    <?php } ?>
				    </div>
					
				    <div class="col-xl-6 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8" style="margin-left: 12px; margin-top: 5px; margin-bottom: 5px;">
				      <div class="card-bg">
				      	<div class="row">
				        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        		<b style="font-size: 14px; color: #000000;"><?php echo $row->FN." ".$row->LN;  ?></b> 
						        	
				        	</div>
				        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        	
								
								
								    <div class="row">
				        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        		<p class="card-text"><small class="text-muted">Tenure : <?php echo $row->TENURE;  ?></small></p>
				        	</div>
						</div>
						<div class="row">
				        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        		<p class="card-text"><small class="text-muted">Amount : <?php echo  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$row->DESIRED_LOAN_AMOUNT);  ?></small></p>
				        	</div>
				        </div>
				        	</div>
				        </div>				        
				    
				       				        				        
				          
				      </div>
				    </div>
					<div class="col-xl-3 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8" style="margin-left: 12px; margin-top: 5px; margin-bottom: 5px;">
						<div class="row">
						<p class="card-text"><small class="text-muted">Entry ID : <b><?php echo $row->ID; ?></b></small></p>
					    </div>
						<div class="row">
						<p class="card-text"><small class="text-muted">Application Number : <b><?php echo $row->Application_id; ?></b></small></p>
					    </div>
					</div>
					<div class="col-xl-0.5 col-lg-0.5 col-md-0.5 col-sm-0.5 col-0.5 align-self-center">
				    	
				    		<?php if($row->LOAN_TYPE == 'business') { ?>
				        			<p class="card-text" style="color: green; font-size: 13px;">Business Loan</p>
						        <?php }else if($row->LOAN_TYPE == 'personal')  { ?>
						        	<p class="card-text" style="color: green; font-size: 13px;">Personal Loan</p>
						        <?php }
								else if($row->LOAN_TYPE == 'credit')  { ?>
                             	 	<p class="card-text" style="color: green; font-size: 13px;">Credit Loan</p>
						        <?php }
								   else if($row->LOAN_TYPE == 'home'){
								?>
						        	<p class="card-text" style="color: green; font-size: 13px;">Home Loan</p>
						        <?php }
								   else if($row->LOAN_TYPE == 'lap'){
								?>
						        	<p class="card-text" style="color: green; font-size: 13px;">Lap Loan</p>
						        <?php }
								
								?>
				    </div>
				   
				  </div>
				</div>	
					
		</div>	
		
	</div>
<?php } ?>




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

</body>
</html>