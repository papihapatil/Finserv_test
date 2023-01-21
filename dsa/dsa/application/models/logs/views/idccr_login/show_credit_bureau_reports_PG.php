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
           	<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
			<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
			<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=94461d89946ef749b7a43d14685c725d1">
			<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
			<script type="text/javascript"  src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
				<script type="text/javascript">	
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
</script></head>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-118965717-1');
</script></head>
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
<body class="c-app">
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
<img src="<?php echo base_url(); ?>images/logo.png"/>

</div>
<ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/Idccr_user_login">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-arrow-circle-left" style="margin-right: 20px;"></i>	
		</svg> Dashbord</a>
	</li>	
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/IDCCR_bureau_reports">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-arrow-circle-left" style="margin-right: 20px;"></i>	
		</svg> Bureau Reports</a>
	</li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/IDCCR_login">
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

<ul class="c-header-nav mfs-auto">
<li class="c-header-nav-item px-3 c-d-legacy-none">
<button class="c-class-toggler c-header-nav-btn" type="button" id="header-tooltip" data-target="body" data-class="c-dark-theme" data-toggle="c-tooltip" data-placement="bottom" title="Toggle Light/Dark Mode">

</button>
</li>
</ul>
<ul class="c-header-nav">

<li class="c-header-nav-item dropdown d-md-down-none mx-2">
		<svg class="c-sidebar-nav-icon"></svg>Hi , <?php if(isset($user_details)) echo $user_details->User_name ; 
		   $_SESSION['IDCCR_user_email']=$user_details->Email ;
		   $_SESSION['IDCCR_user_pass']=$user_details->Password ;
		   ?>
</li>
<li class="c-header-nav-item dropdown d-md-down-none mx-2">
	<a href="<?php echo base_url();?>index.php/admin/IDCCR_login">
	 Logout</a>
</li>

<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
<svg class="c-icon c-icon-lg">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
</svg>
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

											<div class="content">
													<div style="overflow-x:auto;">
													    <div class="demo-html">
													        <table id="empTable" class="display" style="width:100%">
													            <thead>
													                <tr>
													                   <th>ID</th>
													                   <th>Name</th>
													                   <th>Email</th>
													                   <th>Mobile</th>
													                   <th>Status</th>
													                   <th>Retail Score</th>
													                   <th>Micro Score</th>
													                   <th>Pulled On</th>
													                   <th>Report</th>
													                 </tr>
													            </thead>

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
        $(document).ready(function(){
            $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                 
                    'url': window.location.origin+"/dsa/dsa/index.php/Admin/Show_idccr_PG_reports"
                },
             
                
                'columns': [

                    { data: 'ID'},
                    { data: 'Name' },
                    { data: 'Email' },
                    { data: 'Mobile' },
                    { data: 'Status' },
                    { data: 'Retail' },
                    { data: 'Score' },
                    { data: 'Created_at' },
                    { data: 'Report' } 


                ],
            });
            
            $('#empTable').DataTable().column(0).visible(false);
        });
        </script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>

</body>
</html>