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
				if($res=='Mobile number already in use')
				{
				echo '<script> swal("warning!", "Mobile number already in use", "warning");</script>';
				$this->session->unset_userdata('result');	
				}
				
                			
			 }
			 else if($result=='2')
			 {
				 $res = $this->session->flashdata('message');
				if($res=='Email id already in use')
				{
				echo '<script> swal("warning!", "Email id already in use", "warning");</script>';
				$this->session->unset_userdata('result');	
				}
				
			 }
			else if($result=='3')
			 {
				 $res = $this->session->flashdata('message');
				if($res=="Customer entry created successfully and credentials has beed sent to customers email-id and mobile number")
				{
				echo '<script> swal("success!", "Customer entry created successfully and credentials has beed sent to customers email-id and mobile number", "success");</script>';
				$this->session->unset_userdata('result');	
				}
				
			 }
			 else if($result=='4')
			 {
				 $res = $this->session->flashdata('message');
				if($res=="Error in Save Customer Details")
				{
				echo '<script> swal("warning!", "Error in Save Customer Details", "warning");</script>';
				$this->session->unset_userdata('result');	
				}
				
			 }
			 else if($result=='5')
			 {
				 $res = $this->session->flashdata('message');
				if($res=="Status Updated Sucessfully")
				{
				echo '<script> swal("success!", "Status Updated Sucessfully", "success");</script>';
				$this->session->unset_userdata('result');	
				}
				
			 }
			 
		}	
      
       
		
    
	
	?>
<ul class="c-sidebar-nav">
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/manager">

		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
		</svg> Dashboard</a></li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/manger_profile">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
		</svg> Profile</a></li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/customers">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-users" style="margin-right: 20px;"></i>	
		</svg> Customers</a></li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/csr">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
		</svg> CSR</a>
	</li>
	
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/loans">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-file" style="margin-right: 20px;"></i>	
		</svg> Applied Loans</a>
	</li>

	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/custOfferLetters">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-file" style="margin-right: 20px;"></i>	
		</svg> Customer Offer Letters</a>
	</li>

	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/custBureauReports">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-file" style="margin-right: 20px;"></i>	
		</svg> Customer Bureau Reports</a>
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
		                	
		                	<a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/manager/View_Lead?s=all" class="btn-dsa-new-customer">ALL </a>
		                	<!--<?php if($userType != 'ADMIN') { ?>
		                		<a <?php if($s == 'self'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/dsa/customers?s=self" class="btn-dsa-new-customer">SELF </a>                	
		                	<?php } ?>-->		                	
		                <?php } ?>	
                        <?php if($userType != 'ADMIN') { ?>
	                		<a style="margin-left: 8px;" href="<?php echo base_url()?>index.php/manager/View_Lead?s=Converted" class="btn-dsa-new-customer">Converted</a>
	                	<?php } ?>	
		                <?php if($userType != 'ADMIN') { ?>
	                		<a style="margin-left: 8px;" href="<?php echo base_url()?>index.php/manager/View_Lead?s=Hold" class="btn-dsa-new-customer">Hold</a>
	                	<?php } ?>			
						<?php if($userType != 'ADMIN') { ?>
	                		<a style="margin-left: 8px;" href="<?php echo base_url()?>index.php/manager/View_Lead?s=Reject" class="btn-dsa-new-customer">Reject</a>
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
		
		<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
			<a href="<?php echo base_url()?>index.php/customer/profile_view_p_o_dsa?ID=<?php ?>">
				<div class="card mb-3">
				  <div class="row no-gutters">
				    <div class="col-xl-2.5 col-lg-2.5 col-md-2.5 col-sm-2.5 col-2.5 align-self-center">
				   
				    </div>
				    <div class="col-xl-9 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8" style="margin-left: 10px; margin-top: 5px; margin-bottom: 5px;">
				      <div class="card-bg">
					      	<div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<b style="font-size: 14px; color: #000000"><?php echo $row->first_name." ".$row->last_name;  ?></b>			     </div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		
					        	</div>
					        </div>				        
					        <div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<small >Email : <?php echo $row->email;  ?></small>
					        	</div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<p class="card-text"><small class="text-muted">Mobile : <?php echo $row->mobile;  ?></small></p>
					        	</div>
					        </div>

					        <div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<small class="text-muted">Address : <?php  echo $row->address; ?></small>
					        	</div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
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
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 align-self-center">
		
		<?php if( $row->status==''|| $row->status==NULL)
		{?>
	
		    
				<a style="margin-left: 8px; margin-top:-10px;" data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test">Change Contact Status</a>
             
		<?php } else if( $row->status=='Convert to Customer'){?>
		              <a style="margin-left: 8px; margin-top:-10px;" data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test disabled"> Convert to Customer</a>
		<?php }  else if( $row->status=='Reject'){?>
		              <a style="margin-left: 8px; margin-top:-10px;" data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test disabled">Reject</a> 
		<?php }  else if( $row->status=='Hold'){?>
		              <a style="margin-left: 8px; margin-top:-10px;" data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test disabled">Hold</a> 
		<?php } ?>
		
		</div>
		
	</div>
	<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                    Change Status
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/manager/Change_Contact_Status" method="POST" id="change_contact_status">
	                  <div class="form-group">
	                    <label  class="col-12 control-label padding-10">Select Status  </label>	                    
	                    <input name="id" type="number" class="idform" hidden  />
							  <input type="radio" id="vehicle1" name="status" value="Convert to Customer" checked >
							  <label for="vehicle1"> Convert to Customer </label><br>
							  <input type="radio" id="vehicle2" name="status" value="Reject">
							  <label for="vehicle2"> Reject </label><br>
							  <input type="radio" id="vehicle3" name="status" value="Hold">
							  <label for="vehicle3"> Hold </label><br><br>						
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
	<script >
		 $(".modal_test ").on("click", function(){
           var dataId = $(this).attr("data-id");
		   $(".idform").val(dataId);
       
    });
	</script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>


<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>

</body>
</html>