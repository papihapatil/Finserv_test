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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
<ul class="c-sidebar-nav">
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/HR">

		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
		</svg> Dashboard</a></li>
	
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link c-active" href="<?php echo base_url();?>index.php/HR/Applicants">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-users" style="margin-right: 20px;"></i>	
		</svg>Applicants</a>
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
<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/HR">Dashboard</a></li>
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
                	<input type="date" name="filter_date" onchange="filterDateSelected(event);"/>
                	<?php if($userType != 'NONE') { ?>
	                	<?php if($userType != 'DSA_CSR') { ?>
		                	
		                	<a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/admin/HR?s=all" class="btn-dsa-new-customer" style=" border:1px solid black; margin :2px;padding:2px;">ALL </a>
		                	<a <?php if($s == 'Complete'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/admin/customers?s=Complete" class="btn-dsa-new-customer" style=" border:1px solid black; margin :2px;padding:2px;">Completed Profile </a>
		                	<a <?php if($s == 'Incomplete'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/admin/customers?s=Incomplete" class="btn-dsa-new-customer" style=" border:1px solid black; margin :2px;padding:2px;">Incomplete Profile</a>
		                			                	
		                <?php } ?>	

		            	
                        				
	                <?php } ?>	
            	</div>       	                
            </div>
        </div>
</div>

<?php if(count($Applicants) == 0) { ?>
	<div >
	        <div class="container">
	            <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">
	            	<small style="border-radius: 10px; padding: 15px; background-color: white; margin-top: 50px;" class="full-black-color">Unable to find any customers.
	                </small>							
	            </div>
	        </div>
	</div>
<?php } ?> 
<div class="row ">
		
		<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
         <div class="row" style="border-bottom: double;">
		     <div class="col-sm-2">
				   </div>
			 <div class="col-sm-2"><h6>Applicant Name</h6></div>
			 <div class="col-sm-2"><h6>Applicant Email</h6></div>
			 <div class="col-sm-2"><h6>Applicant Mobile</h6></div>
			 <div class="col-sm-2"><h6>Position Applied</h6></div>
			 <div class="col-sm-2"><h6>Date</h6></div>
		</div>
	</div>
</div>	
<?php foreach($Applicants  as $row){?>
	
	<div class="row justify-content-center">
		
		<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
		<div class="row" style="border-bottom: double;">
		     <div class="col-sm-2"><img  style="width:40px; height: 40px; margin-left: 10px; margin-top: 4px; margin-bottom: 4px; margin-left: 14px;" src="<?php base_url()?>/dsa/dsa/images/user.png" class="rounded float-left card-img manager-img">
				   </div>
			 <div class="col-sm-2"><?php if(isset($Applicants)) { echo $row->fname; echo "\n" ;echo $row->lname;  } ?></div>
			 <div class="col-sm-2"><?php if(isset($Applicants)) { echo $row->email;} ?></div>
			 <div class="col-sm-2"><?php if(isset($Applicants)) { echo $row->mobile;} ?></div>
			 <div class="col-sm-2"><?php if(isset($Applicants)) { echo $row->position;} ?></div>
			 <div class="col-sm-2"><?php if(isset($Applicants)) { echo $row->date;} ?></div>
		</div>			
		</div>	
	
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3" style="border-bottom: double;">
	<a style="margin-left: 8px; margin-top:10px;" target='_blank' href="<?php echo base_url()?>index.php/HR/Applicant_details?ID=<?php echo $row->id;?>" class="btn btn-info">View Details</a>
     		
	</div>
		

	</div>
	<?php } ?>
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
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/delete_customer" method="POST" id="change_contact_status">
	                  <div class="form-group">
	                                <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this customer ?</label>	                         
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
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>

</body>
</html>