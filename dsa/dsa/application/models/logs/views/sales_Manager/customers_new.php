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
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager">

		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
		</svg> Dashboard</a></li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/profile">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
		</svg> Profile</a></li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/customers">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-users" style="margin-right: 20px;"></i>	
		</svg> Customers</a></li>
	

		<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/BranchManager/Create_lead">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-users" style="margin-right: 20px;"></i>	
		</svg> Create new Lead</a></li>
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
<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/dsa">Dashboard</a></li>
<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/dsa/managers">Managers</a></li>
<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/dsa/customers">Customers</a></li>
<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/Front/credit_bureau" target="_blank"><button type="button" class="btn btn-info">Credit Bureau</button></a></li>

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
        <div class="container">
            <div class="row">
            	<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                    <div class="screen-title" style="margin-bottom:40px;">                    	
						Customers 
                    </div>                    
                </div>     
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 margin-top-15">
                	Filter By : 
                	<i style="font-size: 12px; margin-right: 4px; margin-left: 4px;"> DATE </i>
                	<input type="date" name="filter_date" onchange="filterDateSelected(event);"/>
                	<?php if($userType != 'NONE') { ?>
	                	<?php if($userType != 'DSA_CSR') { ?>
		                	
		                	<a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/dsa/customers?s=all" class="btn-dsa-new-customer" style=" border:1px solid black; margin :2px;padding:2px;font-size:11px;">ALL </a>
							<a <?php if($s == 'Complete_profile'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/dsa/customers?s=Complete_profile" class="btn-dsa-new-customer"  style=" border:1px solid black; margin :2px;padding:2px;font-size:11px;">Complete profile</a>
		                	<a <?php if($s == 'Incomplete_profile'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/dsa/customers?s=Incomplete_profile" class="btn-dsa-new-customer" style=" border:1px solid black; margin :2px;padding:2px;font-size:11px;">Incomplete profile</a>
		                	
							
		                <?php if($userType != 'ADMIN') { ?>
	                		<a  href="<?php echo base_url()?>index.php/dsa/new_customer?type=customer" class="btn-dsa-new-customer" style="margin-left: 8px; border:1px solid black; margin :2px;padding:2px;font-size:11px;">Add New Customer</a>
	                	<?php } ?>			
						<?php if($userType != 'ADMIN') { ?>
	                		<a  href="<?php echo base_url()?>index.php/dsa/new_customer?type=customer_consent" class="btn-dsa-new-customer" style="margin-left: 8px; border:1px solid black; margin :2px;padding:2px;font-size:11px;">Add New Customer with consent</a>
	                	<?php } ?>
	                <?php } ?>	
            	</div>       	                
            </div>
        </div>
</div>

<?php if(count($customers) == 0) { ?>
	<div >
	        <div class="container">
	            <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">
	            	Unable to find any customers.
	               						
	            </div>
	        </div>
	</div>
<?php } ?>

<?php foreach($customers as $row){?>
	
	<div class="row justify-content-center">
		
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
			<a href="<?php echo base_url()?>index.php/customer/profile_view_p_o_dsa?ID=<?php echo $row->UNIQUE_CODE;?>">
				<div class="card mb-3">
				  <div class="row no-gutters">
				    <div class="col-xl-2.5 col-lg-2.5 col-md-2.5 col-sm-2.5 col-2.5 align-self-center">
				    <?php if($row->PHOTO !='') { ?>	
				      <img  style="margin-left: 10px;" src="<?php base_url()?>/dsa/dsa/images/<?php echo $row->PHOTO;  ?>" class="rounded float-left card-img manager-img">
				    <?php } else {?>
				    	<img  style="width:40px; height: 40px; margin-left: 10px; margin-top: 4px; margin-bottom: 4px; margin-left: 14px;" src="<?php base_url()?>/dsa/dsa/images/user.png" class="rounded float-left card-img manager-img">
				    <?php } ?>
				    </div>
				    <div class="col-xl-9 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8" style="margin-left: 10px; margin-top: 5px; margin-bottom: 5px;">
				      <div class="card-bg">
					      	<div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<b style="font-size: 14px; color: #000000"><?php echo $row->FN." ".$row->LN;  ?></b>			     </div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<?php if($row->PROFILE_PERCENTAGE == '' || $row->PROFILE_PERCENTAGE!=100) { ?>
						        		<p class="card-text" style="font-size: 10px; color: red">		INCOMPLETE PROFILE 
						        			<?php if($row->DSA_ID == '0'){?><i style="margin-left: 8px; color: #4a798e;" class="fa fa-desktop"></i> <?php } ?>
					        			</p>
							        <?php }else { ?>
							        	<p class="card-text" style="color: green; font-size: 10px;">COMPLETED PROFILE
							        		<?php if($row->DSA_ID == '0'){?><i style="margin-left: 8px; color: #4a798e;" class="fa fa-desktop"></i> <?php } ?>
							        	</p>
							        <?php } ?>
					        	</div>
					        </div>				        
					        <div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<small >Email : <?php echo $row->EMAIL;  ?></small>
					        	</div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<p class="card-text"><small class="text-muted">Mobile : <?php echo $row->MOBILE;  ?></small></p>
					        	</div>
					        </div>

					        <div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<small class="text-muted">Join Date : <?php $date = date_create($row->CREATED_AT); echo date_format($date, 'd-m-Y h:i'); ?></small>
					        	</div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<p class="card-text"><small class="text-muted">Loan Type : <?php echo $row->loan_type;  ?></small></p>
					        	</div>
					        </div>				       				        				        				      
				      </div>
				    </div>
				    <div class="col-xl-0.5 col-lg-0.5 col-md-0.5 col-sm-0.5 col-0.5 align-self-center">
				    	
				    	<i class="fa fa-chevron-right"></i>
				    </div>
					
				
				  </div>
				  
				</div>	
				
			</a>	
			
		</div>	
		<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 align-self-center">
		<a style="margin-left: 8px; margin-top:-10px;" href="<?php echo base_url()?>index.php/dsa/view_loan_details?ID=<?php echo $row->UNIQUE_CODE;?>" class="btn btn-info">loan Details</a>
		</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 align-self-center">
		
		<?php if( $row->cam_status=='Cam details complete')
		{?>
	
		    
				<a style="margin-left: 8px; margin-top:-10px;" target='_blank' href="<?php echo base_url()?>index.php/Operations_user/genrate_pdf?ID=<?php echo $row->UNIQUE_CODE;?>" class="btn btn-info">CAM</a>

		
		<?php }?>
		<a style="margin-left: 8px; margin-top:-10px;" href="<?php echo base_url()?>index.php/dsa/show_coapplicants?ID=<?php echo $row->UNIQUE_CODE;?>" class="btn btn-info">Bureau Reports</a>
		<a style="margin-left: 18px; margin-top:-10px;" target='_blank' href="<?php echo base_url()?>index.php/dsa/check_bureau_score?ID=<?php echo $row->UNIQUE_CODE;?>" class="btn btn-success">Check Score</a>
		
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

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>

</body>
</html>