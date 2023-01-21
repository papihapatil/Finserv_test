

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
<title>Finaleap Support</title>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">

<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=94461d89946ef749b7a43d14685c725d1">
	<script type="text/javascript"  src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-118965717-1');
</script>

<br>
<br>
</head>

<body class="c-app">
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
<img src="<?php echo base_url(); ?>images/logo.png"/>

</div>
<ul class="c-sidebar-nav">
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Support_Member">

		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
		</svg> Dashboard</a></li>
		<li class="c-sidebar-nav-item">
		
	
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Support_Member/view_issue">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> View Issue</a>
													</li>
													
	                                     <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Support_Member">
													<svg class="c-sidebar-nav-icon">
														<i class="fa fa-arrow-circle-left" style="margin-right: 20px;"></i>	
		                                            </svg> Logout</a>
	                                                </li>

</ul>




<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
<svg class="c-icon c-icon-lg">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
</svg>
</button>
</ul>
</header>



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
					<li>
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
					<span style='font-size:14px'><?php if(isset($userType)) { if($userType=="Operations_user") echo "(Operations User)"  ; } ?>  </span>
						<li>
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
					var url = window.location.origin+"/dsa/dsa/index.php/admin/change_notification_satus";
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
												 
					 
					 var url = window.location.origin+"/dsa/dsa/index.php/admin/get_notification"; 
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
<br>
</br>

<div class="col-sm-6 col-lg-2">
	   <a class="c-header-nav-link" href="<?php echo base_url();?>index.php/Support_Member/view_issue">
       <div class="card text-white bg-gradient-danger">
			   <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				  <div>
				       <div class="text-value-lg"><?php echo $dashboard_data['issue_count']?></div>
					       <div style="margin-bottom: 0px;">View Issue</div>	<br>	
				       </div>
		          </div>
		       </div>
             </a>
	      </div>