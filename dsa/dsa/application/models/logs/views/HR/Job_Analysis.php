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
			<title>Finaleap | HR | Job Profiles</title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
			<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
			<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
			<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
			<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=94461d89946ef749b7a43d14685c725d1">
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.dataTables.min.css">
			<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
			<script type="text/javascript"  src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
			<script>  window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-118965717-1');</script>
			<style>	.abc {	margin-top:10px;	}</style>
			<script type="text/javascript" class="init">	$(document).ready(function() { $('#example').DataTable();} );</script>
		</head>
		<body class="c-app">
			<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
				<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
					<img src="<?php echo base_url(); ?>images/logo.png"/>
				</div>
				<?php
 					$result = $this->session->flashdata('result');   
					if (isset($result)) 
					{
						if($result=='1')
						{
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
  					}
				?>
				<ul class="c-sidebar-nav">
					<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/HR">
						<svg class="c-sidebar-nav-icon">
							<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
							</svg> Dashboard</a>
					</li>
					<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link c-active" href="<?php echo base_url();?>index.php/HR/Applicants">
						<svg class="c-sidebar-nav-icon">
							<i class="fa fa-users" style="margin-right: 20px;"></i>	
						</svg>Applicants</a>
					</li>
	                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/HR/job_profiles ">
		                <svg class="c-sidebar-nav-icon">
			                <i class="fa fa-users" style="margin-right: 20px;"></i>	
						</svg>Job Profiles</a>
					</li> 
					<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/HR/job_Analysis?profile_name=all">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-users" style="margin-right: 20px;"></i>	
		</svg>Job Analysis</a></li> 
		<?php 
		if(isset($user_info))
		{
			if($user_info->EMAIL=='piyuabdagire@gmail.com' ||$user_info->EMAIL=='info@finaleap.com' || $user_info->EMAIL=='shiv@finaleap.com' || $user_info->EMAIL=='vipul@finaleap.com')
			{ 
				?>
				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/HR/New_Engagement_Dashbord">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-users" style="margin-right: 20px;"></i>	
		</svg>New Engagement</a></li> 
				<?php
			}
		}
		?>
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
					</button>
					<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
						<svg width="118" height="46" alt="CoreUI Logo"></svg>
					</a>
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
								<svg class="c-sidebar-nav-icon"></svg> Logout
							</a>
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
														<div class="col-sm-3">
                                                    		</div>
																<div class="col-sm-6">
																	<h3><b>Current Profiles</b></h3>
																	<select class="form-control" aria-label="Default select example" name="select_profile_name" id="select_profile_name">
																		<option value="">Select Profile Name</option>
																		<option value="all">All job profiles</option>		
																		<?php  $i= 1 ; if(!empty($job_profiles)){
																		foreach($job_profiles as $row)
													  					{  ?>
																		<option value="<?php echo $row->current_openings; ?>"><?php echo $row->current_openings; ?></option>
																		<?php }
																		 } ?>
                                               						</select>  
																</div>
																<div class="col-sm-3">
                                                    			</div>
															</div>
															<hr>
														</div>
													</div>
													<br>
													<div class="col-sm-12">
													<table class="table table-bordered">
    													<thead>
     														 <tr>
  																<th>Sr.no</th>
					 											<th>Profile Name</th>
															
																<th>Total Openings</th>
																<th>Total Offered </th>
																<th>Remaining </th>
																<th>is on Priority?</th>
																<th>Actions</th>
 															</tr>
    													</thead>
   														<tbody>
														   <?php  $i= 1 ; if(!empty($job_opening_data)){foreach($job_opening_data as $row){  ?>
															<tr>
																			<td><?php echo $i;?></td>
																			<td><?php echo $row->current_openings?></td>
																			<td><?php echo $row->job_positions?></td>
																			<td><?php if(!empty($applicants_from_profile_name)) echo count($applicants_from_profile_name); ?></td>
																			<td><?php if(!empty($applicants_from_profile_name)) 
																			{
																				$hired= count($applicants_from_profile_name);
																			}else 
																			{ 
																				$hired=0;	
																			}
																			echo $row->job_positions-$hired ;?></td>
																		
																			
																			<td><?php echo $row->priority?></td>
																	    	<td><a style="margin-left: 8px; " class="btn modal_test" href="<?php echo base_url()?>index.php/HR/remove_job_profile?ID=<?php echo $row->id;?>"><i class="fa fa-trash text-right" style="color:red;"></i></a></td>
																		</tr>
																		<?php  $i++; } } ?> 
						  											</tbody>
 																 </table>
																
													</div>
											
										
											<br>
											
											<div class="col-sm-12">
											<hr>
											<div class="col-sm-3">
											
											</div>
											<div class="col-sm-6">
											<?php if(!empty($applicants_from_profile_name)) {?> 
											<h4 style="color:green;">Following <?php echo count($applicants_from_profile_name);?> Applicants are hired for selected job postion</h4>
											<?php }else {?>
											<center><p>Data not found</p></center>
											<?php } ?>
										    </div>
											<div class="col-sm-3">
											</div>
										
										</div>

										<?php if(!empty($applicants_from_profile_name)){?>	
								
										<body class="wide comments example">
                                            <div class="fw-body">
												<div class="content">
													<div style="overflow-x:auto;">
														<div class="demo-html">
															<table id="example" class="display" style="width:100%">
																<thead>
																	<tr>

					 													<th>Name</th>
																		<th>Email</th>
																		<th>Mobile</th>
					   													<th>Applied For</th>
																		<th>Location</th>
					  													<th>Applied On</th>
																		  <th>Details</th>
																		 <th>Resume</th>
																		 <th>Status</th>
																		 
					   											
			                                  						</tr>
																</thead>
																<tbody>
																	<?php  $i= 1 ; if(!empty($applicants_from_profile_name)){foreach($applicants_from_profile_name as $row){  ?>
																	<tr>
																		<td><?php echo $row->fname." ".$row->lname;  ?></td>
																		<td><?php echo $row->email;  ?></td>
																		<td><?php echo $row->mobile;  ?></td>
																		<td> <?php echo $row->position;  ?></td>
																		<td> <?php echo $row->location;  ?></td>
																		<td><?php $date = date_create($row->date); echo date_format($date, 'd-m-Y'); ?></td>
																		<td><a style="margin-left: 8px; " class="btn modal_test" href="<?php echo base_url()?>index.php/HR/Applicant_details?ID=<?php echo $row->id;?>"><i class="fa fa-eye text-right" style="color:blue;"></i></a></td>
																		<td><a style="margin-left: 8px; " class="btn modal_test" href="<?php base_url()?>/dsa/dsa/images/all_document_pdf/<?php echo $row->resume_path;?>" target='_blank' download><i class="fa fa-file text-right" style="color:green;"></i></a></td>
																		<td>
                                                                        <?php if ( $row->job_status=='' || $row->job_status==NULL ){?>
																			<a style="margin-left: 8px; " class="btn modal_test" href="<?php echo base_url()?>index.php/HR/Applicant_details?ID=<?php echo $row->id;?>">In review</a>
																		
																		<?php }
																		      else  
																		      {
																				  if($row->job_status=='accept')
																				  {
                                                                        ?>
																			        <a style="margin-left: 8px; " class="btn modal_test" href="<?php echo base_url()?>index.php/HR/Applicant_details?ID=<?php echo $row->id;?>">Accepted <i class="fa fa-check text-right" style="color:green;"></i></a>
																		<?php
																				  }
																				  else if($row->job_status=='reject')
																				  {
																		?>
																				        <a style="margin-left: 8px; " class="btn modal_test" href="<?php echo base_url()?>index.php/HR/Applicant_details?ID=<?php echo $row->id;?>">Rejected <i class="fa fa-close text-right" style="color:red;"></i></a>
																		<?php			  
																				  }
																				  else if($row->job_status=='hold')
																				  {
																		?>
																		<a style="margin-left: 8px; " class="btn modal_test" href="<?php echo base_url()?>index.php/HR/Applicant_details?ID=<?php echo $row->id;?>">On Hold<i class="fa fa-pause text-right" style="color:yellow;"></i></a>
																		<?php			  
																				  }
																		      }
																		?>
																		
																		</td>
						
						
																	</tr>
																	<?php  $i++; } } ?> 
						  										</tbody>
			                                             	</table>
														</div>
                                                    </div>
                                                 </div>
                                            </div>
										</body>
										<?php }else {?>
											<div class="col-sm-12">
											<div class="col-sm-3">
											
											</div>
											<div class="col-sm-6">
											<h3></h3>
										    </div>
											<div class="col-sm-3">
											</div>
										</div>
                                        <?php }?>


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
			    $(document).ready(function() {
				     $(".add-more").click(function(){ 
          				var html = $(".copy").html();
          				$(".after-add-more").after(html);
      				});
				    $("body").on("click",".remove",function(){ 
         				 $(this).parents(".control-group").remove();
      				});
			    });
			</script>
			<script type="text/javascript">
			    $(document).ready(function() {
				     $(".add-roles").click(function(){ 
          				var html = $(".copy_roles").html();
          				$(".after-add-roles").after(html);
      				});
				    $("body").on("click",".remove_1",function(){ 
         				 $(this).parents(".control-group").remove();
      				});
			    });
			</script>
	<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
		</body>
	</html>