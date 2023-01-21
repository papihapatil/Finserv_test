<!DOCTYPE html>
<?php 
$CM_ID=$this->session->userdata('ID');
//echo $credit_manager_id;
//exit();

?>

<?php
 
        $message = $this->session->userdata('sucess');   
		if (isset($message)) {
		if($message=='success'){
			
				echo '<script> swal("success!", "Your Credit Score is  \n Credit Bureau Reoport Send On Your Mail Id Sucessfully", "success");</script>';
				$this->session->unset_userdata('sucess');	
               // $this->session->unset_userdata('credit_score');				
			 //}
		}	
       else if(	$message=='failed')
			   {
				  // $credit_score=$this->session->userdata('credit_score');
				   echo '<script> swal("success!", "Your Credit Score is  \n Consumer not found in bureau", "success");</script>';
					//	$this->session->unset_userdata('sucess');	
						//$this->session->unset_userdata('credit_score');		
			   }
       
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


<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                    <div class="screen-title" style="margin-bottom:40px;">                    	
						<small class="screen-title-txt">Customers (Completed CAM process)</small> 
                    </div>                    
                </div>     
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 margin-top-15">
                	Filter By : 
                	
                	<?php if($userType != 'NONE') { ?>
	                
		                	<a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/Admin/loan_application_status?s=all" class="btn-dsa-new-customer" style=" border:1px solid black; margin :2px;padding:2px;">ALL </a>
		                	<a <?php if($s == 'Accepted'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/Admin/loan_application_status?s=Accepted" class="btn-dsa-new-customer" style=" border:1px solid black; margin :2px;padding:2px;">Accepted </a>
		                	<a <?php if($s == 'Rejected'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/Admin/loan_application_status?s=Rejected" class="btn-dsa-new-customer" style=" border:1px solid black; margin :2px;padding:2px;">Rejected </a>
		                	<a <?php if($s == 'Progress'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/Admin/loan_application_status?s=Progress" class="btn-dsa-new-customer" style=" border:1px solid black; margin :2px;padding:2px;">In Progress </a>
							<a <?php if($s == 'hold'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/Admin/loan_application_status?s=hold" class="btn-dsa-new-customer" style=" border:1px solid black; margin :2px;padding:2px;">On Hold </a>
		             
		               		
	                <?php } ?>	
            	</div>       	                
            </div>
        </div>
</div>

<?php if(count($customers) == 0) { ?>
	<div >
	        <div class="container">
	            <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">
	            	<small style="border-radius: 10px; padding: 15px; background-color: white; margin-top: 50px;" class="full-black-color">Unable to find any customers.
	                </small>							
	            </div>
	        </div>
	</div>
<?php } ?>

<?php foreach($customers as $row){?>
	
	<div class="row justify-content-center">
		
		<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
			<a href="<?php echo base_url()?>index.php/customer/profile_view_p_o?ID=<?php echo $row->UNIQUE_CODE;?>">
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
									<input hidden name="mobile" class="form-control" id="mobile" value=" <?php echo $row->MOBILE;?>">
												
					        	</div>
								
					        </div>

					        <div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<small class="text-muted">Join Date : <?php $date = date_create($row->CREATED_AT); echo date_format($date, 'd-m-Y h:i'); ?></small>
					        	</div>
								<?php if(!empty($row)){if($row->STATUS!='Aadhar E-sign complete'){?>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<p class="card-text"><small class="text-muted"> Pending Status :<br> 
									<?php if(!empty($row)){if($row->STATUS==''||$row->STATUS=='NULL'){ echo 'Personal details pending'.'<br>'.'Income details pending'.'<br>'.'Document upload pending'.'<br>'.'Credit bureau Score pending'.'<br>'.'Loan application pending'.'<br>'.'Aadhar E-sign pending';}else if($row->STATUS=='Personal details complete'){echo 'Income details pending'.'<br>'.'Document upload pending'.'<br>'.'Credit bureau Score pending'.'<br>'.'Loan application pending'.'<br>'.'Aadhar E-sign pending';}
                                              else if($row->STATUS=='Income details complete'){echo 'Document upload pending'.'<br>'.'Credit bureau Score pending'.'<br>'.'Loan application pending'.'<br>'.'Aadhar E-sign pending';}else if($row->STATUS=='Document upload complete'){echo 'Credit bureau Score pending'.'<br>'.'Loan application pending'.'<br>'.'Aadhar E-sign pending';}else if($row->STATUS=='Credit bureau Score complete'){echo 'Loan application pending'.'<br>'.'Aadhar E-sign pending';}else if($row->STATUS=='Loan application complete'){echo 'Aadhar E-sign pending';}								} ?></small></p>
					        	</div>
								<?php }}?>
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
	
		<?php if(isset($row->loan_status))
			{
				if($row->loan_status=="in_progress")
				{
			?>
			 <a style="margin-left: 8px; margin-top:10px;" target='_blank'  class="btn border border-warning">In Progress</a>
      		<?php
				}
				else if($row->loan_status=="accepted")
				{
			?>
			 <a style="margin-left: 8px; margin-top:10px;" target='_blank' class="btn border border-success">Accepted</a>
			<?php	
				}
				else if($row->loan_status=="rejected")
				{
			?>
			
			 <a style="margin-left: 8px; margin-top:10px;" target='_blank' href="<?php echo base_url("index.php/Admin/sendsms"); ?>" class="btn border border-success" id="send_otp">Send Message</a>
      		
      		<?php

				}
				else if($row->loan_status=="hold")
				{
			?>
			 <a style="margin-left: 8px; margin-top:10px;" target='_blank' class="btn border border-warning">On Hold</a>
			
			<?php		
				}
				else
				{
			?>
			 <a style="margin-left: 8px; margin-top:10px;" target='_blank' class="btn border border-primary">On Hold</a>
      		<?php	
				}
		?>
	        
		
			  
	  <?php
		}
		else
		{
		?>
		 <a style="margin-left: 8px; margin-top:10px;" target='_blank' class="btn border border-primary">Not Checked</a>
      		
		<?php
		}
	    ?> 
	   
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
<script type="text/javascript">
function demo() {
	var mobileno = $('#mobile').val();
   // alert(mobileno);


                 $.ajax({
	   				type:'POST',
					url:'<?php echo base_url("index.php/Admin/sendsms"); ?>',
					data:{'mobileno':mobileno},
						 success:function(data){
						                        var obj =JSON.parse(data);
												if(obj.msg=='sucess')
												{
													alert("Message sent successfully !!");
													//swal("success!", "Message sent successfully !!", "success");
													$('#send_otp').hide();
																							
												}
												if(obj.msg=='fail')
												{
													alert("Error in sending message ,please try again");
												}

											

											}
										});





}
</script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>

</body>
</html>