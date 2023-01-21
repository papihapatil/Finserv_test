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
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/dsa?s=all">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
		</svg> DSA</a></li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link c-active" href="<?php echo base_url();?>index.php/admin/customers">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-users" style="margin-right: 20px;"></i>	
		</svg> Customers</a>
	</li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/Operations_user?s=all">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
		</svg> Operations user</a>
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
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/credit_buerau_price">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-money" style="margin-right: 20px;"></i>	
		</svg> Credit Buerau Price</a>
	</li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/refund_money">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-money" style="margin-right: 20px;"></i>	
		</svg>Refund Money</a>
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
<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/dsa?s=all">DSA</a></li>
<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/customers">Customers</a></li>
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
            	<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                    <div class="screen-title" style="margin-bottom:40px;">                    	
						<small class="screen-title-txt">Customers </small> 
                    </div>                    
                </div>     
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 margin-top-15">
                	Filter By : 
                	<i style="font-size: 12px; margin-right: 4px; margin-left: 4px;"> DATE </i>
                	<input type="date" name="filter_date" onchange="filterDateSelected_payment(event);"/>
                	<?php if($userType != 'NONE') { ?>
	                	<?php if($userType != 'DSA_CSR') { ?>
		                	
		                	<a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/admin/Payment_report?s=all" class="btn-dsa-new-customer">ALL </a>&nbsp;
						    <a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/admin/Payment_report?s=refund" class="btn-dsa-new-customer">refund </a>&nbsp;
							<a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/admin/Payment_report?s=Sucess" class="btn-dsa-new-customer">Sucess </a>
		                			                	
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
	            	<small style="border-radius: 10px; padding: 15px; background-color: white; margin-top: 50px;" class="full-black-color">Unable to find any Payment.
	                </small>							
	            </div>
	        </div>
	</div>
<?php } ?>


	
	<div class="row justify-content-center">
		
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		
				<div class="table-responsive">
				  <table class="table">
					<thead>
						<tr>
						  <th scope="col">#</th>
						  <th scope="col">Name</th>
						  <th scope="col">Mobile</th>
						  <th scope="col">Email</th>
						  <th scope="col">Payment Id</th>
						  <th scope="col">Payment date Time</th>
						  <th scope="col">Payment Status</th>
						  <th scope="col">Credit Buerau Status</th>
						  <th scope="col">Refund</th>
						</tr>
					</thead>
					<tbody>
					<?php $i=1;foreach($customers as $row){?>
					
					 <tr>
						  <th scope="row"><?php echo $i; ?></th>
						  <td><?php echo $row->cname; ?> </td>
						  <td><?php echo $row->cmob; ?></td>
						  <td><?php echo $row->cemail; ?> </td>
						  <td><?php echo $row->razorpay_payment_id; ?> </td>
						  <td><?php echo $row->created_at; ?> </td>
						  <td><?php echo $row->status; ?> </td>
						  <td><?php echo $row->score_success; ?> </td>
						  <td><?php echo $row->refund; ?> </td>
						  
						</tr>
					<?php $i++;} ?>
					</tbody>
				  </table>
				</div>

		
	     </div>
	</div>
	



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
<script>
function filterDateSelected_payment(e){
      e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
      var form = $(this);
      var url = form.attr('action'); 
      window.location.replace("Payment_report?date="+e.target.value);
  }
</script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>

</body>
</html>