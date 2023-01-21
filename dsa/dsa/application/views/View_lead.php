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
            <!-- <link href="<?php echo base_url(); ?>css/style1.css" rel="stylesheet"> -->
			<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
			<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
			<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=94461d89946ef749b7a43d14685c725d1">
			<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">


			<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>--->
			<script type="text/javascript"  src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
			<script type="text/javascript" class="init">
			$(document).ready(function()
			 { $('#example').DataTable();
			 });
			 
			</script>
	
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
<?php
 
 $result = $this->session->flashdata('result');   if (isset($result)) {
	   if($result=='1'){
		   
			   $res = $this->session->flashdata('message');
			   if($res=='Lead Assign Sucessfully')
			   {
			   echo '<script> swal("success!", "Lead Assign Sucessfully", "success");</script>';
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
												<!--<div class="row">
														<div class="col-sm-12">
															<div >
																<div class="container">
																	<div class="row" style="margin-bottom:10px">
																	<div class="col-sm-6">
																	</div>
																		<div class="col-sm-3">
																			<form id="credit_saction_form" method="post">
																						<select class="form-control" aria-label="Default select example" name="" id="select_category_lead"  >
																							<option value="">Select category</option>
																							<option value="self">Self</option>
																							<option value="DSA">DSA</option>
																							<option value="Relationship_officer">Relationship Officer</option>
																							
																						</select>
																						<input type="text" id="User_id" value=<?php echo $this->session->userdata('ID'); ?> hidden>
																			</form>
																		</div>
																		<div class="col-sm-3">
																			<form id="credit_saction_form" method="post">
																					  
																						<select class="form-control" aria-label="Default select example"  id="options_display_lead">
																							<option value="">Select Value</option>
																							
																						</select>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>---->


<body class="wide comments example" >

	
<div class="fw-body">
	<div class="content">
	<div style="overflow-x:auto;">
		<div class="demo-html">
			<table id="example" class="display" style="width:100%">
				<thead>
				<tr>
			   
					   <th>SR No</th>
					   <th>Name</th>
					   <th>Address</th>
					   <th>Email</th>
					   <th>Mobile</th>
					   <th>Refer By</th>
					   <th>status</th>
					   
				</tr>
				</thead>
				<tbody id="user_lead">
				<?php  $i= 1 ; if(count($customers)!= 0){foreach($customers as $row){  ?>
					<tr>
					    <td><?php echo $i; ?></td>
					    <td><?php echo $row->first_name." ".$row->last_name;?></td>
						<td><?php echo $row->address; ?></td>
						<td><?php echo $row->email; ?></td>
						<td> <?php echo $row->mobile;  ?></td>
						<td><?php if($row->Refer_By_Name!=''){echo $row->Refer_By_Name .'['.$row->Refer_By_Category.']';} ?></td>
						<td><?php if( $row->status==''|| $row->status==NULL)
							{?>
						
								
									<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test">Change Contact Status</a>
								  
							<?php } else if( $row->status=='Convert to Customer'){?>
										  <a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test disabled"> Convert to Customer</a>
							<?php }
							else if( $row->status=='Convert to customer with consent')
							{
							?>
									<a style="margin-left: 8px;" data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test disabled"> Convert to Customer with Consent</a>
							<?php
							}
							else if( $row->status=='Reject'){?>
										  <a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test disabled">Reject</a> 
							<?php }  else if( $row->status=='Hold'){?>
										  <a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test disabled">Hold</a> 
										   <a style="margin-left: 8px;" data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test "> Convert to Customer</a>
							<?php } ?>
						</td>
				    </tr>
			    <?php $i++; }} ?>
					
				
					
				</tbody>
				<tbody id="user_lead_assign">
				
				
					
				</tbody>
			
			</table>
		</div>
	</div>
			
	</div>
</div>
</div>

</body>



		<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	          
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
	            
	           
	            <div class="modal-body">
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/dsa/Change_Contact_Status" method="POST" id="change_contact_status">
	                  <div class="form-group">
	                    <label  class="col-12 control-label padding-10">Select Status  </label>	                    
	                    <input name="id" type="number" class="idform" hidden />
							  <input type="radio" id="vehicle1" name="status" value="Convert to Customer" checked >
							  <label for="vehicle1"> Convert to Customer </label><br>
							  <input type="radio" id="vehicle4" name="status" value="Convert to customer with consent">
							  <label for="vehicle4">Convert to customer with consent</label><br>
							  <input type="radio" id="vehicle2" name="status" value="Reject">
							  <label for="vehicle2"> Reject </label><br>
							  <input type="radio" id="vehicle3" name="status" value="Hold">
							  <label for="vehicle3"> Hold </label><br><br>						
	                  </div>                  

	                
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default"
			                        data-dismiss="modal">
			                            CANCEL
			                </button>
			                <button type="submit" class="btn btn-primary">
			                   Change Status
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
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>


</body>
</html>