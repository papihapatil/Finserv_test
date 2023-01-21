<!DOCTYPE html>
<?php   $id1 = $this->session->userdata("ID"); //shows id of credite manager user
        $id = $_GET['ID']; // shows id of customer
        // $id = $this->session->userdata("id");
        $this->session->set_userdata("id",$id);
        $this->session->set_userdata("id1",$id1);
       //echo $id1;
       //echo $id;
       //exit();
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
        <title>Finaleap | Credit Manager</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
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
            <ul class="c-sidebar-nav">
<?php
if($userType=="Disbursement_OPS")
{
	?>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Disbursement_OPS">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
													
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Payments/managemandate">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Manage Mandate</a>
													</li> 
													
													<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Payments/managetransaction">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Manage Transaction</a>
													</li>
								
	<?php
}
else if($userType=="Business_Head")
{
	?>
		<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Business_Head_Controller">
														<svg class="c-sidebar-nav-icon">
															<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
														</svg> Dashboard</a>
													</li> 
								
	<?php
}
else
{
	?>


				<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/credit_manager_user">
					<svg class="c-sidebar-nav-icon">
						<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
					</svg> Dashboard</a>
				</li> 
				<li class="c-sidebar-nav-item">
					<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
						<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/Operations_user/dsa?s=all">DSA</a>
					
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/credit_manager_user/customers_pd">Customers</a>
						<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector?s=all">Connector</a>
					</div>
				</li>
				<li class="c-sidebar-nav-item">
					<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
						<i class="fa fa-th-large" style="margin-right: 20px;"></i>Customer Information 
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?php echo base_url()?>index.php/customer/profile_view_p_o?ID=<?php echo $id;?>">Profile of <?php echo  ucwords($row->FN." ".$row->LN);?></a>
						   
						    		<?php $i=1;
						foreach ($coapplicants as $coapplicant)
							{ ?>
			     	    <?php if(isset($coapplicant))
				 			 {
				 			 	if(isset($coapp_data_credit_analysis_array[$i]->coapp_consider_status))
				 			 	{
								if($coapp_data_credit_analysis_array[$i]->coapp_consider_status=='yes')
								{
									?>
								    <a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/coapplicant_new_screen_one?COAPPID=<?php echo $coapplicant->UNIQUE_CODE;?>&UID=<?php echo $id; ?>">Profile of <?php echo  ucwords($coapplicant->FN." ".$coapplicant->LN);?></a>
								    <?php
								}
							}
							}
						}
					 	 ?>
							<a class="dropdown-item" href="<?php echo base_url()?>index.php/dsa/show_coapplicants?ID=<?php echo $id;?>">Documents</a>
							<a class="dropdown-item" href="<?php echo base_url()?>index.php/dsa/show_coapplicants?ID=<?php echo $id;?>">CIBIL/Equifax</a>
						
						<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/View_Personal_Disussion_details?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">Personal Discussion</a>
						<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_cum_acceptance_letter?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">Sanction Cum Acceptance Letter</a>
						
						<a class="dropdown-item" href="<?php echo base_url()?>index.php/Operations_user/genrate_pdf?ID=<?php echo $id;?>" target="_blank" >Download CAM</a>
							<a class="dropdown-item" href="<?php echo base_url()?>index.php/Operations_user/POST_CAM?ID=<?php echo $id;?>" target="_blank" >Download POST_CAM</a>
						<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/pdf?ID=<?php echo $id;?>" target="_blank">Download PD</a>						
					</div>
				</li>
			     
			<?php
}

?>
							<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/profile">
										<svg class="c-sidebar-nav-icon">
										  <i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
										</svg> Profile</a>
									</li>	
									<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/changePassword">
													<svg class="c-sidebar-nav-icon">
														<i class="fa fa-file" style="margin-right: 20px;"></i>	
													</svg> Change Password</a>
									</li>
										<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Help/help_form">
														<svg class="c-sidebar-nav-icon">
														<i class="fa fa-info-circle" style="margin-right: 20px;" aria-hidden="true"></i>	
														</svg> HELP</a>
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
                </button>
				<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use xlink:href="assets/brand/coreui-pro.svg#full"></use>
                    </svg>
				</a>
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
		                    <svg class="c-sidebar-nav-icon"></svg> Logout
						</a>
                    </li>
                    <button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
                            <svg class="c-icon c-icon-lg">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
                            </svg>
                    </button>
                </ul>
            </header>
     <style>
                .class_bold{
                    color: black;
                    font-size: 12px;
                    margin-left: 8px;
                    font-weight: bold;
                }
            </style>
            <script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
                <!--[if IE]><!--><!--<![endif]-->
            <script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
            <script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
            <script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
        </body>
</html>
