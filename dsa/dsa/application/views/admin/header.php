<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="<?php echo base_url(); ?>adminn/css/loader.css" rel="stylesheet">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Signup">
    <meta name="keywords" content="Signup">
    <title>Finaleap</title>
    <!-- Bootstrap -->

    <link href="<?php echo base_url()?>/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php  echo base_url()?>/css/style.css" rel="stylesheet">
    <link href="<?php  echo base_url()?>/css/pagination.css" rel="stylesheet">
    <link href="<?php  echo base_url()?>/css/loginmain.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/css/loginutil.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link href="<?php echo base_url()?>css/fontello.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CMerriweather:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- owl Carousel Css -->
    <link href="<?php echo base_url()?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php  echo base_url()?>/css/owl.theme.css" rel="stylesheet">
    <link href="<?php  echo base_url()?>/css/navbar.css" rel="stylesheet">  
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
   <script src="<?php  echo base_url()?>/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php  echo base_url()?>/js/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slider script -->
    <script src="<?php  echo base_url()?>/js/owl.carousel.min.js"></script>    
    <script src="<?php  echo base_url()?>/js/main.js"></script>
    <!-- Back to top script -->
    <script src="<?php  echo base_url()?>/js/back-to-top.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <style>
   /*----------------------- added by sonal 25-02-2022 ---------------------------------- */
   	 .side-nav-scroll{
    position: fixed;
    width: 220px;
	background-color: #3c4b64;
	color:white;
    overflow-y: scroll;
    top: 0;
    bottom: 0;
}
  /*--------------------------------------------------------- */
   
        .time
		{
			border:2px solid skyblue; 
			margin:20px; 
			padding:20px; 
			padding left:10px;  
			margin-left:0px; 
			border-top-right-radius:25px; 
			border-bottom-right-radius:25px; 
			border-left: 0;
		}
		@media (min-width:280px)
		{
			.time
			{
				border: 2px solid skyblue;
					margin: 3px;
					padding: 20px;
					padding left: 10px;
					border-top-right-radius: 25px;
					border-bottom-right-radius: 25px;
					border-top-left-radius: 25px;
					border-bottom-left-radius: 25px;
					text-align: center;
				
				
			}
		}
		@media (min-width:320px)
		{
			.time
			{
				border: 2px solid skyblue;
					margin: 3px;
					padding: 20px;
					padding left: 10px;
					border-top-right-radius: 25px;
					border-bottom-right-radius: 25px;
					border-top-left-radius: 25px;
					border-bottom-left-radius: 25px;
					text-align: center;
				
				
			}
		}
		@media (min-width:600px)
		{
			.time
			{
				border: 2px solid skyblue;
				margin: 20px;
				padding: 20px;
				padding left: 10px;
				margin-left: -17px;
				border-top-right-radius: 25px;
				border-bottom-right-radius: 25px;
				border-left: 0;
				border-top-left-radius: 0px;
				border-bottom-left-radius: 0px;
				text-align: center;
			}
		}
		@media (min-width:800px)
		{
			.time
			{
				border: 2px solid skyblue;
				margin: 20px;
				padding: 20px;
				padding left: 10px;
				margin-left: -17px;
				border-top-right-radius: 25px;
				border-bottom-right-radius: 25px;
				border-left: 0;
				border-top-left-radius: 0px;
				border-bottom-left-radius: 0px;
				text-align: center;
			}
		}
		@media (min-width:1025px)
		{
			.time
			{
				border: 2px solid skyblue;
				margin: 20px;
				padding: 20px;
				padding left: 10px;
				margin-left: -17px;
				border-top-right-radius: 25px;
				border-bottom-right-radius: 25px;
				border-left: 0;
				border-top-left-radius: 0px;
				border-bottom-left-radius: 0px;
				text-align: center;
			}
		}
		@media (min-width:1281px)
		{
			.time
			{
				border: 2px solid skyblue;
				margin: 20px;
				padding: 20px;
				padding left: 10px;
				margin-left: -17px;
				border-top-right-radius: 25px;
				border-bottom-right-radius: 25px;
				border-left: 0;
			}
		}
   </style>
</head>

<script>
	function openRightMenu() {
	  document.getElementById("rightMenu").style.display = "block";
	}

	function closeRightMenu() {
	  document.getElementById("rightMenu").style.display = "none";
	}
</script>

<body>
    <div >
        
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
			
            <div class="container">
            <a href="javascript:window.history.go(-1);">
             <button style="margin-top: 10px;" class='uploadbutton'>Back</button>    
           </a>
                <center><a href="<?php base_url()?>/dsa/dsa/index.php" class="navbar-brand"><img style="width:30%;" src="<?php echo base_url()?>images/Finserv_logo.png" alt="Finaleap - Dreams to innovation"></a></center>               
                
                
                <div class="border border-light rounded">
                      <?php 
								if($showNav > 0 || $this->session->userdata("USER_TYPE") != 'CUSTOMER') 
								{
						  ?>
									<button class="w3-button w3-xlarge w3-right" onclick="openRightMenu()">&#9776;</button>    
                       <?php
								}
					   ?>
                        <?php if($age!='' && $age > 0) 
							{ 
					?>
                    <?php     if(!empty($this->session->userdata("payment_done"))) {
								if(!empty($this->session->userdata("USER_TYPE")) && $this->session->userdata("USER_TYPE") == 'CUSTOMER') 
								{ 
					?>
									<button style="margin-top: 10px;" class='uploadbutton' onclick="openApplyForm()">Apply For Loan</button>    
                           
 				   <?php         }
					}
				   ?>      
                        <?php }
						?> 
                      
						<i class='fas fa-user-tie' style='font-size:15px'></i>
						<span style='font-size:14px'><?php if(isset($username)){ echo ucwords($username); }?></span>
						<span style='font-size:14px'><?php if(isset($userType)) { if($userType=="Operations_user") echo "(Operations User)"  ; } ?></span>
						<a href="<?php echo base_url();?>index.php/logout">
                          <button style="margin-top: 10px;" class='uploadbutton'>Logout</button>    
                        </a>
                    </div>
            </div>
		
		
        </nav>

        <?php if($userType == 'CUSTOMER') {?>
            <div class="w3-sidebar w3-bar-block w3-card w3-animate-right side-nav-scroll" style="display:none;right:0;" id="rightMenu">
    		  <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button> <hr class="hr-margin">
    		  <a href="<?php echo base_url();?>index.php/customer/profile_view_p_o?ID=<?php echo $this->session->userdata("ID")?>" class="w3-bar-item w3-button w3-medium">Profile</a> <hr class="hr-margin">
    		  <a href="<?php echo base_url();?>index.php/customer/profile_view_p_thre?ID=<?php echo $this->session->userdata("ID");?>" class="w3-bar-item w3-button w3-medium">Documents</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/customer/applied_loans_list" class="w3-bar-item w3-button w3-medium">Applied Loans</a> <hr class="hr-margin">
    		  <a href="#" class="w3-bar-item w3-button w3-medium">Bureau Reports</a> <hr class="hr-margin">
    		  <a href="#" class="w3-bar-item w3-button w3-medium">Offer Letters</a> <hr class="hr-margin">
    		  <a href="#" class="w3-bar-item w3-button w3-medium">Change Password</a> <hr class="hr-margin">
    		  <a href="<?php echo base_url();?>index.php/logout" class="w3-bar-item w3-button w3-medium">Logout</a> <hr class="hr-margin">
    		</div>
        <?php } ?>

        <?php if($userType == 'ADMIN') {?>
            <div class="w3-sidebar w3-bar-block w3-card w3-animate-right side-nav-scroll" style="display:none;right:0;" id="rightMenu">
              <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button> <hr class="hr-margin">              
              <a href="<?php echo base_url();?>index.php/admin/dashboard" class="w3-bar-item w3-button w3-medium">Dashboard</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/admin/dsa?s=all" class="w3-bar-item w3-button w3-medium">DSA</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/admin/customers" class="w3-bar-item w3-button w3-medium">Customers</a> <hr class="hr-margin">
              
              <a href="<?php echo base_url();?>index.php/customer/applied_loans_list" class="w3-bar-item w3-button w3-medium">Strategic Dsa Reports</a> <hr class="hr-margin">
              
              <a href="<?php echo base_url();?>index.php/admin/manage_documents_type" class="w3-bar-item w3-button w3-medium">Manage Documents Type</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/admin/manage_banks" class="w3-bar-item w3-button w3-medium">Manage Banks</a> <hr class="hr-margin">              
              <a href="<?php echo base_url();?>index.php/dsa/changePassword" class="w3-bar-item w3-button w3-medium">Change Password</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/logout" class="w3-bar-item w3-button w3-medium">Logout</a> <hr class="hr-margin">
            
            </div>
        <?php } ?>
     

		<!----------added by sonal on 25-02-2022----------->
		<!-------for DSA------------------>
		<?php if($userType == 'DSA') {?>
			

	
            <div class="w3-sidebar w3-bar-dark w3-card w3-animate-right side-nav-scroll" style="display:none;right:0;" id="rightMenu">
              <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa" class="w3-bar-item w3-button w3-medium"><i class="fa fa-th-large" style="margin-right: 10px;"></i>Dashboard</a>
			  <a href="<?php echo base_url();?>index.php/customer/applied_loans_list" class="w3-bar-item w3-button w3-medium"><i class="fa fa-file" style="margin-right: 10px;"></i>Applied Loans</a>
			  <a href="<?php echo base_url();?>index.php/dsa/Create_lead" class="w3-bar-item w3-button w3-medium"><i class="fa fa-users" style="margin-right: 10px;"></i>Create new Lead</a>
			  <a href="<?php echo base_url();?>index.php/dsa/View_Lead" class="w3-bar-item w3-button w3-medium"><i class="fa fa-users" style="margin-right: 10px;"></i>View Lead</a>

			  
			 <button class="w3-bar-item w3-button w3-medium" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 2010pxpx;">
					<i class="fa fa-th-large" style="margin-right: 10px;"></i>All Users
			</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																
					<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/customers_allusers">Customers</a>
					<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector_alluser?s=all">Connector</a>
					<a class="dropdown-item" href="<?php echo base_url();?>index.php/dsa/csr">CSR</a>
					<a class="dropdown-item" href="<?php echo base_url();?>index.php/dsa/managers">Managers</a>
			   </div>

			  <a href="<?php echo base_url();?>index.php/dsa/profile" class="w3-bar-item w3-button w3-medium"><i class="fa fa-user-circle-o" style="margin-right: 10px;"></i>Profile</a>						
			  <a href="<?php echo base_url();?>index.php/dsa/changePassword" class="w3-bar-item w3-button w3-medium"><i class="fa fa-file" style="margin-right: 10px;"></i>Change Password</a>
              <a href="<?php echo base_url();?>index.php/logout" class="w3-bar-item w3-button w3-medium"><i class="fa fa-arrow-circle-left" style="margin-right: 10px;"></i>Logout</a>
            </div>
		
        <?php } ?>

		<!-------for RO------------------>
		<?php if($userType == 'Relationship_Officer') {?>
			

	
            <div class="w3-sidebar w3-bar-dark w3-card w3-animate-right side-nav-scroll" style="display:none;right:0;" id="rightMenu">
              <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/Relationship_Officer" class="w3-bar-item w3-button w3-medium"><i class="fa fa-th-large" style="margin-right: 10px;"></i>Dashboard</a>
			 

			  
			 <button class="w3-bar-item w3-button w3-medium" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 10px;">
					<i class="fa fa-th-large" style="margin-right: 10px;"></i>All Users
			</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																
					<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/customers_allusers">Customers</a>
					<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector_alluser?s=all">Connector</a>
					<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/dsa_allusers">DSA</a>
			   </div>

			   <a href="<?php echo base_url();?>index.php/dsa/profile" class="w3-bar-item w3-button w3-medium"><i class="fa fa-user-circle-o" style="margin-right: 10px;"></i>Profile</a>
			   <a href="<?php echo base_url();?>index.php/BranchManager/Create_lead" class="w3-bar-item w3-button w3-medium"><i class="fa fa-users" style="margin-right: 10px;"></i>Create new Lead</a>
			  <a href="<?php echo base_url();?>index.php/dsa/View_Lead" class="w3-bar-item w3-button w3-medium"><i class="fa fa-users" style="margin-right: 10px;"></i>View Lead</a>
		     							
			  <a href="<?php echo base_url();?>index.php/dsa/changePassword" class="w3-bar-item w3-button w3-medium"><i class="fa fa-file" style="margin-right: 10px;"></i>Change Password</a>
              <a href="<?php echo base_url();?>index.php/logout" class="w3-bar-item w3-button w3-medium"><i class="fa fa-arrow-circle-left" style="margin-right: 10px;"></i>Logout</a>
            </div>
		
        <?php } ?>


		<!-------for BM------------------>
		<?php if($userType == 'branch_manager') {?>
			

	
            <div class="w3-sidebar w3-bar-dark w3-card w3-animate-right side-nav-scroll" style="display:none;right:0;" id="rightMenu">
              <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/BranchManager" class="w3-bar-item w3-button w3-medium"><i class="fa fa-th-large" style="margin-right: 10px;"></i>Dashboard</a>
			 

			  
			 <button class="w3-bar-item w3-button w3-medium" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 10px;">
					<i class="fa fa-th-large" style="margin-right: 10px;"></i>All Users
			</button>
				<div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
					
				    <a class="dropdown-item" style=text-align:center; href="<?php echo base_url();?>index.php/admin/Relationship_Officer?s=all">Relationship Officer</a>
					<a class="dropdown-item" style="text-center" href="<?php echo base_url();?>index.php/admin/customers_allusers">Customers</a>
					<a class="dropdown-item" style="margin-right: 10px;" href="<?php echo base_url();?>index.php/admin/Connector_alluser?s=all">Connector</a>
					<a class="dropdown-item" style="margin-right: 40px;" href="<?php echo base_url();?>index.php/admin/dsa_allusers">DSA</a>
			   </div>

			   <a href="<?php echo base_url();?>index.php/dsa/profile" class="w3-bar-item w3-button w3-medium"><i class="fa fa-user-circle-o" style="margin-right: 10px;"></i>Profile</a>
			   <a href="<?php echo base_url();?>index.php/dsa/Assign_Lead" class="w3-bar-item w3-button w3-medium"><i class="fa fa-users" style="margin-right: 10px;"></i>Assign Lead</a>
			   <a href="<?php echo base_url();?>index.php/BranchManager/Create_lead" class="w3-bar-item w3-button w3-medium"><i class="fa fa-users" style="margin-right: 10px;"></i>Create new Lead</a>

			  <a href="<?php echo base_url();?>index.php/dsa/View_Lead" class="w3-bar-item w3-button w3-medium"><i class="fa fa-users" style="margin-right: 10px;"></i>View Lead</a>
		     							
			  <a href="<?php echo base_url();?>index.php/dsa/changePassword" class="w3-bar-item w3-button w3-medium"><i class="fa fa-file" style="margin-right: 10px;"></i>Change Password</a>
              <a href="<?php echo base_url();?>index.php/logout" class="w3-bar-item w3-button w3-medium"><i class="fa fa-arrow-circle-left" style="margin-right: 10px;"></i>Logout</a>
            </div>
		
        <?php } ?>

			<!-------for CM------------------>
		<?php if($userType == 'Cluster_Manager') {?>
			

	
            <div class="w3-sidebar w3-bar-dark w3-card w3-animate-right side-nav-scroll" style="display:none;right:0;" id="rightMenu">
              <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/Cluster_Manager" class="w3-bar-item w3-button w3-medium"><i class="fa fa-th-large" style="margin-right: 10px;"></i>Dashboard</a>
			 

			  
			 <button class="w3-bar-item w3-button w3-medium" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 10px;">
					<i class="fa fa-th-large" style="margin-right: 10px;"></i>All Users
			</button>
				<div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
					
                    <a class="dropdown-item"  href="<?php echo base_url();?>index.php/admin/Relationship_Officer?s=all">Relationship Officer</a>
					<a class="dropdown-item"  href="<?php echo base_url();?>index.php/Cluster_Manager/branch_manager?s=all">Branch Manager</a>
                    <a class="dropdown-item"  href="<?php echo base_url();?>index.php/admin/customers_allusers?s=all">Customers</a>
					<a class="dropdown-item"  href="<?php echo base_url();?>index.php/admin/Connector_alluser?s=all">Connector</a>
					<a class="dropdown-item"  href="<?php echo base_url();?>index.php/admin/dsa_allusers?s=all">DSA</a>
			   </div>

			   <a href="<?php echo base_url();?>index.php/dsa/profile" class="w3-bar-item w3-button w3-medium"><i class="fa fa-user-circle-o" style="margin-right: 10px;"></i>Profile</a>
			   <a href="<?php echo base_url();?>index.php/Cluster_Manager/Create_lead" class="w3-bar-item w3-button w3-medium"><i class="fa fa-users" style="margin-right: 10px;"></i>Create new Lead</a>

			  <a href="<?php echo base_url();?>index.php/Cluster_Manager/View_Lead" class="w3-bar-item w3-button w3-medium"><i class="fa fa-users" style="margin-right: 10px;"></i>View Lead</a>
		     							
			  <a href="<?php echo base_url();?>index.php/dsa/changePassword" class="w3-bar-item w3-button w3-medium"><i class="fa fa-file" style="margin-right: 10px;"></i>Change Password</a>
              <a href="<?php echo base_url();?>index.php/logout" class="w3-bar-item w3-button w3-medium"><i class="fa fa-arrow-circle-left" style="margin-right: 10px;"></i>Logout</a>
            </div>
		
        <?php } ?>

		<!----------------------------------------- credit manager added by sonal 4-03-2022------------------------------------- -->
		<?php if($userType == 'credit_manager_user') {?>
			

	
            <div class="w3-sidebar w3-bar-dark w3-card w3-animate-right side-nav-scroll" style="display:none;right:0;" id="rightMenu">
              <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/credit_manager_user" class="w3-bar-item w3-button w3-medium"><i class="fa fa-th-large" style="margin-right: 10px;"></i>Dashboard</a>
			 

			  
			 <button class="w3-bar-item w3-button w3-medium" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 10px;">
					<i class="fa fa-th-large" style="margin-right: 10px;"></i>All Users
			</button>
				<div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
                 	<a class="dropdown-item" href="<?php echo base_url();?>index.php/Operations_user/dsa?s=all">DSA</a>
							<a class="dropdown-item" href="<?php echo base_url();?>index.php/credit_manager_user/customers">Customers</a>
							<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector?s=all">Connector</a>
			   </div>

			   <a href="<?php echo base_url();?>index.php/dsa/profile" class="w3-bar-item w3-button w3-medium"><i class="fa fa-user-circle-o" style="margin-right: 10px;"></i>Profile</a>
						
			  <a href="<?php echo base_url();?>index.php/dsa/changePassword" class="w3-bar-item w3-button w3-medium"><i class="fa fa-file" style="margin-right: 10px;"></i>Change Password</a>
              <a href="<?php echo base_url();?>index.php/logout" class="w3-bar-item w3-button w3-medium"><i class="fa fa-arrow-circle-left" style="margin-right: 10px;"></i>Logout</a>
            </div>
		
        <?php } ?>













        <?php if($userType == 'DSA_MANAGER') {?>
            <div class="w3-sidebar w3-bar-block w3-card w3-animate-right side-nav-scroll" style="display:none;right:0;" id="rightMenu">
              <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/profile" class="w3-bar-item w3-button w3-medium">Profile</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/manager" class="w3-bar-item w3-button w3-medium">Dashboard</a> <hr class="hr-margin">    
              <a href="<?php echo base_url();?>index.php/customer/customer_documents" class="w3-bar-item w3-button w3-medium">Documents</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/customer/applied_loans_list" class="w3-bar-item w3-button w3-medium">Applied Loans</a> <hr class="hr-margin">          
              <a href="<?php echo base_url();?>index.php/dsa/csr" class="w3-bar-item w3-button w3-medium">CSR</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/customers" class="w3-bar-item w3-button w3-medium">Customers</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/loans" class="w3-bar-item w3-button w3-medium">Loans</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/custBureauReports" class="w3-bar-item w3-button w3-medium">Customer Bureau Reports</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/custOfferLetters" class="w3-bar-item w3-button w3-medium">Customer Offer Letters</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/changePassword" class="w3-bar-item w3-button w3-medium">Change Password</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/logout" class="w3-bar-item w3-button w3-medium">Logout</a> <hr class="hr-margin">
            
            </div>
        <?php } ?>

        <?php if($userType == 'DSA_CSR') {?>
            <div class="w3-sidebar w3-bar-block w3-card w3-animate-right side-nav-scroll" style="display:none;right:0;" id="rightMenu">
              <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/profile" class="w3-bar-item w3-button w3-medium">Profile</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/csr" class="w3-bar-item w3-button w3-medium">Dashboard</a> <hr class="hr-margin">     
              <a href="<?php echo base_url();?>index.php/customer/customer_documents" class="w3-bar-item w3-button w3-medium">Documents</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/customer/applied_loans_list" class="w3-bar-item w3-button w3-medium">Applied Loans</a> <hr class="hr-margin">                       
              <a href="<?php echo base_url();?>index.php/dsa/customers" class="w3-bar-item w3-button w3-medium">Customers</a> <hr class="hr-margin">              
              <a href="<?php echo base_url();?>index.php/dsa/changePassword" class="w3-bar-item w3-button w3-medium">Change Password</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/logout" class="w3-bar-item w3-button w3-medium">Logout</a> <hr class="hr-margin">
            
            </div>
        <?php } ?>
		<?php if($userType == 'Operations_user') {?>
            <div class="w3-sidebar w3-bar-block w3-card w3-animate-right side-nav-scroll" style="display:none;right:0;" id="rightMenu">
              <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/profile" class="w3-bar-item w3-button w3-medium">Profile</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/Operations_user" class="w3-bar-item w3-button w3-medium">Dashboard</a> <hr class="hr-margin">     

              <a href="<?php echo base_url();?>index.php/Operations_user/customers" class="w3-bar-item w3-button w3-medium">Customers</a> <hr class="hr-margin">              
             
              <a href="<?php echo base_url();?>index.php/logout" class="w3-bar-item w3-button w3-medium">Logout</a> <hr class="hr-margin">
            
            </div>
        <?php } ?>


    </div>

    
    <a href="index.html#0" class="cd-top" title="Go to top">Top</a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    


</body>

</html>
