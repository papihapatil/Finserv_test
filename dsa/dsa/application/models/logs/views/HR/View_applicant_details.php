<!DOCTYPE html>
<?php 
  $id = $_GET['ID']; // shows id of customer
//   echo $HR_name;
//   exit();
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
<title>Finaleap | HR | Applicant Details</title>
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
  			}?>
<body class="c-app">
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
<img src="<?php echo base_url(); ?>images/logo.png"/>

</div>
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
</button><a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
<svg width="118" height="46" alt="CoreUI Logo">
<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
</svg></a>
<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
	<i class="fa fa-bars"></i>
</button>

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
	<a href="<?php echo base_url();?>index.php/logout">
		<svg class="c-sidebar-nav-icon">
			
		</svg> Logout</a>
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

<?php ini_set('short_open_tag', 'On'); ?>

     <div class="row shadow bg-white rounded">
        <div class="row justify-content-center col-12">
	        <h4 style="margin-top: 15px;  color: black; font-weight: bold; margin-bottom: 10px;">Job Application By - <?php if(isset($row)) { echo $row->fname.' '.$row->lname;} ?> </h4>
        </div>
		<div class="row justify-content-center col-12">
			<div class="card shadow">
  				<div class="card-body "  style="padding-right:0px;">
				  <div class="row justify-content-center col-12">
					
						<?php if(isset($row)) { 
							if(!empty($row->Remarks) || !empty($row->HR_name))
							{
                        ?>
						Remarks by - <?php echo $row->HR_name;?>
						<div class="form-outline">
						<textarea class="form-control"  rows="3" id="textAreaExample" name="textAreaExample"> <?php if(!empty($row->Remarks)) echo $row->Remarks;?> </textarea>
						</div>
						<?php
							}
							else
							{
                        ?>
							Add Remarks
							<div class="form-outline">
                          <textarea class="form-control" id="textAreaExample" name="textAreaExample" rows="3" required></textarea>
						</div>
						<?php
							}
							} ?>
						
						
		             </div>
					 <br>
					 <div class="row justify-content-center col-12">
   					<div class="btn-group btn-group-toggle" data-toggle="buttons" >
					 
					   <div id="selector" class="btn-group">
					        <?php if(isset($row)) { if($row->job_status=='accept') { ?>
							    <button type="button" class="btn btn-success" id="" value="accept" active>Accepted</button>
					    		<!-- <button type="button" class="btn btn-outline-light text-dark" id="" value="reject" readonly>Reject</button>
					            <button type="button" class="btn btn-outline-light text-dark"id="" value="hold" readonly>Hold</button> -->
								<input type="text" value="<?php if(isset($HR_name)) { echo $HR_name;} ?> " hidden id="HR_name">
							<?php  } else  if($row->job_status=='reject')  { ?>
								<!-- <button type="button" class="btn btn-outline-light text-dark" id="" value="accept" >Accept</button> -->
								<button type="button" class="btn btn-danger" id="" value="reject" >Rejected</button>
					            <!-- <button type="button"class="btn btn-outline-light text-dark"  id="" value="hold" >Hold</button> -->
						    <?php   } else if($row->job_status=='hold') {   ?> 
								<input type="text" value="<?php if(isset($row)) { echo $row->id;} ?> " hidden id="applicant_id">
								<input type="text" value="<?php if(isset($HR_name)) { echo $HR_name;} ?> " hidden id="HR_name">
								<input type="text" value="<?php if(isset($HR_ID)) { echo $HR_ID;} ?> " hidden id="HR_ID">
								<button type="button" class="btn btn-outline-success btn_accept" id="" value="accept" onclick="job_actions(this.value,document.getElementById('textAreaExample').value)">Accept</button>
							    <button type="button" class="btn btn-outline-danger btn_accept" id="" value="reject" onclick="job_actions(this.value,document.getElementById('textAreaExample').value)">Reject</button>
							
                           		<button type="button" class="btn btn-warning" id="" value="hold" >On Hold</button>
						    <?php   } else {   ?>
                                <button type="button" class="btn btn-outline-success btn_accept" id="" value="accept" onclick="job_actions(this.value,document.getElementById('textAreaExample').value)"><b>Accept</b></button>
							    <button type="button" class="btn btn-outline-danger btn_accept" id="" value="reject" onclick="job_actions(this.value,document.getElementById('textAreaExample').value)"><b>Reject</b></button>
					            <button type="button" class="btn btn-outline-warning btn_accept" id="" value="hold" onclick="job_actions(this.value,document.getElementById('textAreaExample').value)"><b>Hold</b></button>
							    <input type="text" value="<?php if(isset($row)) { echo $row->id;} ?> " hidden id="applicant_id">
								<input type="text" value="<?php if(isset($HR_name)) { echo $HR_name;} ?> " hidden id="HR_name">
								<input type="text" value="<?php if(isset($HR_ID)) { echo $HR_ID;} ?> " hidden id="HR_ID">
                            <?php
									 }
							       }
								
								
								
								
								?> 
      					    <?php ?>

						 </div>
   					</div>
					</div>
  				</div>
			</div>
	    </div>


		
   
   
   
 

		<br><br>
		<div class="row justify-content-center col-12" style="margin-top:5px;margin-bottom:5px;" >
			<div class="col-xl-4 col-lg-4 col-md-4">
					<label style="font-weight:700;">Full  Name</label>
			        <input readonly class="form-control" value="<?php echo $row->fname.' '.$row->lname;?>">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4">
			<label style="font-weight:700;">Email</label>
                     <input readonly class="form-control" value="<?php echo $row->email;?>">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4">
			<label style="font-weight:700;">Mobile</label>
                     <input readonly  class="form-control" value="<?php echo $row->mobile;?>">
			</div>
		</div>
		<div class="row justify-content-center col-12" style="margin-top:5px;margin-bottom:5px;" >
			<div class="col-xl-4 col-lg-4 col-md-4">
			<label style="font-weight:700;">Currently Working Status</label>
					<?php 
					if($row->currently_working == 'working_yes')
					{
                    ?>
	                   <input readonly  class="form-control" value="Yes">
	  		       <?php
					}
					else
					{
                    ?>
					   <input readonly  class="form-control" value="No">
					<?php
					}
					?>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4">
			<label style="font-weight:700;">Total Experience</label>
				    <input readonly  class="form-control" value="<?php echo $row->total_experience;?>">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4">
			<label style="font-weight:700;">Relevent Experience</label>
				       <input readonly  class="form-control" value="<?php echo $row->relevent_experience;?>">
			</div>
		</div>
		<div class="row justify-content-center col-12" style="margin-top:5px;margin-bottom:5px;" >
			<div class="col-xl-4 col-lg-4 col-md-4">
			<label style="font-weight:700;">Name of the organization</label>
				     <input readonly  class="form-control" value="<?php echo $row->name_of_org;?>">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4">
			<label style="font-weight:700;">Current Salary </label>
						<input readonly  class="form-control" value="<?php echo $row->current_sal_p_m;?> Rs">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4">
			<label style="font-weight:700;">Expected Salary </label>
						<input readonly  class="form-control" value="<?php echo $row->expected_sal_p_m;?> Rs">
			</div>
		</div>


		<div class="row justify-content-center col-12" style="margin-top:5px;margin-bottom:5px;" >
			<div class="col-xl-4 col-lg-4 col-md-4">
			<label style="font-weight:700;">Notice Period</label>
						<input readonly  class="form-control" value="<?php echo $row->notice_period;?>">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4">
			<label style="font-weight:700;">Position Appiled For</label>
				     	<input readonly class="form-control" value="<?php echo $row->position;?>">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4">
			<label style="font-weight:700;">Application Date</label>
				     	<input readonly class="form-control" value="<?php echo $row->date;?>">
			</div>
		</div>

		<div class="row justify-content-center col-12" style="margin-top:5px;margin-bottom:5px;" >
			<div class="col-xl-4 col-lg-4 col-md-4">
			<label style="font-weight:700;">Job Location</label>
				     	<input readonly class="form-control" value="<?php echo $row->location;?>">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4">
			<label style="font-weight:700;">Resume Name</label>
				     	<input readonly class="form-control" value="<?php echo $row->resume_path;?>">
			</div>
			<?php if($row->cloud_file_name == '') { ?>
			<div class="col-xl-2 col-lg-2 col-md-2">
			<a href="<?php base_url()?>/dsa/dsa/images/all_document_pdf/<?php echo $row->resume_path;?>" target='_blank' ><button type="button" class="btn btn-success" style="margin-left:10px;margin-top:30px;">View Resume</button></a>					 
  			</div>
			  <div class="col-xl-2 col-lg-2 col-md-2">
			<a href="<?php base_url()?>/dsa/dsa/images/all_document_pdf/<?php echo $row->resume_path;?>" target='_blank' download><button type="button" class="btn btn-success" style="margin-left:10px;margin-top:30px;">Download Resume</button></a>					 
  			</div>
			<?php }else { ?>
			
			<div class="col-xl-2 col-lg-2 col-md-2">
			<a href="<?php echo base_url()?>index.php/HR/download_cloud_file/<?php echo $row->id;?>" target='_blank' ><button type="button" class="btn btn-success" style="margin-left:10px;margin-top:30px;">View Resume</button></a>					 
  			</div>
			
			<?php } ?>
		</div>
    
		
		<div class="row justify-content-center col-12" style="margin-top:5px;margin-bottom:5px;" >
		  <br><br>
		</div>
				
		</div>



<div >





 </div>
 
 <script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
</body>
</html>