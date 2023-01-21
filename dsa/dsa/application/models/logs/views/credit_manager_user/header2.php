<!DOCTYPE html>
<?php   $CM_ID = $this->session->userdata("ID"); //shows id of credite manager user
        $id = $_GET['ID']; // shows id of customer
        $this->session->set_userdata("id",$id);
        $this->session->set_userdata("id1",$CM_ID);
       
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
	        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/credit_manager_user">
                <svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> Dashboard</a>
	        </li>
	        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url()?>index.php/credit_manager_user/View_KVC_documents?ID=<?php echo $id;?>">
                <svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> KYC Documents</a>
	        </li>
         
	        <li class="c-sidebar-nav-item">
		        <button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
			        <i class="fa fa-th-large" style="margin-right: 20px;"></i>Customer Details
		        </button>
		        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			        <a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/View_Applicant_details?ID=<?php echo $id;?>">Applicant Details</a>
			        <a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/View_Co_applicant_details?ID=<?php echo $id;?>">Co-applicant Details</a>
                </div>
            </li>
          
	        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url()?>index.php/credit_manager_user/View_Income_details?ID=<?php echo $id;?>">
                <svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> Income Documents</a>
	        </li>
	        
	        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url()?>index.php/Operations_user/genrate_pdf?ID=<?php echo $id;?>" >
              <svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> CAM</a>
	        </li>
	        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url()?>index.php/credit_manager_user/View_Property_details?ID=<?php echo $id;?>">
              <svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> Property Details</a>
	        </li>
	        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url()?>index.php/credit_manager_user/View_Approval_Remark_details?ID=<?php echo $id;?>">
               <svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> Approval Remark</a>
	        </li>
	        <li class="c-sidebar-nav-item">
		        <button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
			       <i class="fa fa-th-large" style="margin-right: 20px;"></i>Verification Results
		        </button>
		        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			        <a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/View_GST_PAN_ITR_details?ID=<?php echo $id;?>">GST/PAN/ITR</a>
        	        <a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/View_bank_report_details?ID=<?php echo $id;?>"> Bank Report</a>
			        <a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/View_CIBIL_Equifax_details?ID=<?php echo $id;?>">CIBIL/Equifax</a>
        	       </div>
            </li>
	       
	        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url()?>index.php/credit_manager_user/View_Personal_Disussion_details?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
               <svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> Personal Discussion</a>
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