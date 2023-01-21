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
<title>Finaleap | HR | Applicant List</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=94461d89946ef749b7a43d14685c725d1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.dataTables.min.css">


	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript"  src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" class="init">
$(document).ready(function() {
	$('#example').DataTable();
} );

</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-118965717-1');
</script>
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
</style></head>
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
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/HR/job_profiles ">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-users" style="margin-right: 20px;"></i>	
		</svg>Job Profiles</a></li> 
		<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/HR/job_Analysis?profile_name=all">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-users" style="margin-right: 20px;"></i>	
		</svg>Job Analysis </a></li> 
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

<div>
        									<div class="">
												<div class="row">
													<?php if(isset($Applicants))
				       									{
						 									if(count($Applicants) != 0) 
						 								    {  ?>
						  							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						  								<lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php echo count($Applicants); ?>&nbsp;&nbsp;<a href="<?=base_url('index.php/HR/download_Excel')?>">
						  								<i class="fa fa-download "style='font-size:24px; color:green;'></i></a></lable>
						      						   <?php $excelData = json_decode(json_encode($Applicants), true);?>
						  							</div>
						 							 <?php  } 
				         									 else
						 									{ ?>
						   							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;" >
						  								<lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">Total <?php if(isset($Applicants)) {echo count($Applicants); }?>&nbsp;&nbsp;
														  <i class="fa fa-download "style='font-size:24px; color:green;'></i></a></lable>
				    	  							</div>
													<?php    } 
			            								} 
														else
														{ ?>
					      							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						  								<lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php if(isset($Applicants)) { echo count($Applicants); }?>&nbsp;&nbsp;
														  <i class="fa fa-download "style='font-size:24px; color:green;'></i></a></lable>
				    	   							</div>
													<?php } ?>
				        						
	 											   <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" >
                										
													</div> 
													<div class="col-sm-1" style="text-align:right;padding-right:0px;"><lable style="margin-left:8px;">Filter : </lable>
				   </div>
													<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
													<input type="date" name="filter_date" onchange="filterDateSelected_applicants(event);"/>
                									
														</div>
													  <div class="col-sm-2" style="">
														<select class="form-control" aria-label="Default select example" name="select_filters" id="select_dropdown_filters_HR">
															<option value="">Select Filter</option>
															<option value="all">All</option>
															<option value="application_status">Application Status</option>
															<option value="job_position">Job position</option>
															<option value="city">City name</option>
														</select>
													</div>
								                </div>
                                            </div>
		                                    <hr>
                                        </div>


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
																	<?php  $i= 1 ; if(!empty($Applicants)){foreach($Applicants as $row){  ?>
																	<tr>
																		<td><?php echo $row->fname." ".$row->lname;  ?></td>
																		<td><?php echo $row->email;  ?></td>
																		<td><?php echo $row->mobile;  ?></td>
																		<td> <?php echo $row->position;  ?></td>
																		<td> <?php echo $row->location;  ?></td>
																		<td><?php $date = date_create($row->date); echo date_format($date, 'd-m-Y'); ?></td>
																		<td><a style="margin-left: 8px; " class="btn modal_test" href="<?php echo base_url()?>index.php/HR/Applicant_details?ID=<?php echo $row->id;?>"  target="_blank"><i class="fa fa-eye text-right" style="color:blue;"></i></a></td>
																		<td>
																		<?php if($row->cloud_file_name == '') { ?>
																		<a style="margin-left: 8px; " class="btn modal_test" href="<?php base_url()?>/dsa/dsa/images/all_document_pdf/<?php echo $row->resume_path;?>" target='_blank' download><i class="fa fa-file text-right" style="color:green;"></i></a>
																		<?php }else { ?>
																		<a style="margin-left: 8px; " class="btn modal_test" href="<?php echo base_url()?>index.php/HR/download_cloud_file/<?php echo $row->id;?>" target='_blank' ><i class="fa fa-file text-right" style="color:green;"></i></a>

																		<?php } ?>
																		</td>
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
										<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            	<h4 class="modal-title" id="myModalLabel">
                    FILTER BY JOB POSITION
                </h4>
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/HR/Applicants" method="GET" id="dsa_bnk_filter">
                  <div class="form-group">                    
					<div class="wrap-select validate-input ">
						<label class="input100"> Select Job Position </label> 
						<span class="focus-input100"></span>
						<input type="text" name="s" value="bnk" hidden>
						<select name="bnk_name" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 40px; margin-bottom: 8px; padding: 3px;" required> 
						  <option value="">None</option>
						  <?php foreach($banks as $bank) {
								echo "<option value='$bank->current_openings'>$bank->current_openings</option>";
						  }?>							  
						</select>
					</div>
                  </div>                  

                  <!-- Modal Footer -->
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default"
		                        data-dismiss="modal">
		                            CANCEL
		                </button>
		                <button type="submit" class="btn btn-primary">
		                    FILTER
		                </button>
		            </div>
                </form>                
            </div>            
        </div>
    </div>
</div>



<script type="text/javascript">
	$('#deleteModel').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) 
	  var recipient = button.data('id') 
	  var modal = $(this)
	  modal.find('.modal-body .dsa_bnk_filter').val(recipient)
	})		
</script>


<div class="modal fade" id="deleteModel_city" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            	<h4 class="modal-title" id="myModalLabel">
                    FILTER BY City
                </h4>
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/HR/Applicants?s=city" method="GET" id="dsa_city_filter">
                  <div class="form-group">                    
					<div class="wrap-select validate-input ">
						<label class="input100"> Select City Name </label> 
						<span class="focus-input100"></span>
						<input type="text" name="s" value="city" hidden>
						<select name="city_name" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 40px; margin-bottom: 8px; padding: 3px;" required> 
						  <option value="">None</option>
						  <?php foreach($cities as $city) {
								echo "<option value='$city->location'>$city->location</option>";
						  }?>							  
						</select>
					</div>
                  </div>                  

                  <!-- Modal Footer -->
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default"
		                        data-dismiss="modal">
		                            CANCEL
		                </button>
		                <button type="submit" class="btn btn-primary">
		                    FILTER
		                </button>
		            </div>
                </form>                
            </div>            
        </div>
    </div>
</div>

<script type="text/javascript">
	$('#deleteModel_city').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) 
	  var recipient = button.data('id') 
	  var modal = $(this)
	  modal.find('.modal-body .dsa_city_filter').val(recipient)
	})		
</script>


<div class="modal fade" id="deleteModel_application_status" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            	<h4 class="modal-title" id="myModalLabel">
                    FILTER BY Application Status
                </h4>
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/HR/Applicants?s=application_status" method="GET" id="dsa_city_filter">
                  <div class="form-group">                    
					<div class="wrap-select validate-input ">
						<label class="input100"> Select Status </label> 
						<span class="focus-input100"></span>
						<input type="text" name="s" value="application_status" hidden>
						<select name="application_status" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 40px; margin-bottom: 8px; padding: 3px;" required> 
						  <option value="">None</option>
						  <?php foreach($application_status as $application_status) {
							  if($application_status->job_status=='' || $application_status->job_status== NULL)
							  {
								echo "<option value='In Review'>In Review</option>";
							  }
							  else
							  {
								echo "<option value='$application_status->job_status'>$application_status->job_status</option>";  
							  }
						  }?>							  
						</select>
					</div>
                  </div>                  

                  <!-- Modal Footer -->
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default"
		                        data-dismiss="modal">
		                            CANCEL
		                </button>
		                <button type="submit" class="btn btn-primary">
		                    FILTER
		                </button>
		            </div>
                </form>                
            </div>            
        </div>
    </div>
</div>

<script type="text/javascript">
	$('#deleteModel_application_status').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) 
	  var recipient = button.data('id') 
	  var modal = $(this)
	  modal.find('.modal-body .dsa_city_filter').val(recipient)
	})		
</script>






















<script>
 function filterDateSelected_applicants(e){
	e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
    var form = $(this);
    var url = form.attr('action'); 
    window.location.replace("Applicants?date="+e.target.value);
}
</script>	
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