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

    <link href="<?php base_url()?>/dsa/dsa/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php base_url()?>/dsa/dsa/css/style.css" rel="stylesheet">
    <link href="<?php base_url()?>/dsa/dsa/css/pagination.css" rel="stylesheet">
    <link href="<?php base_url()?>/dsa/dsa/css/loginmain.css" rel="stylesheet">
    <link href="<?php base_url()?>/dsa/dsa/css/loginutil.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link href="<?php base_url()?>/dsa/dsa/css/fontello.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CMerriweather:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- owl Carousel Css -->
    <link href="<?php base_url()?>/dsa/dsa/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php base_url()?>/dsa/dsa/css/owl.theme.css" rel="stylesheet">
    <link href="<?php base_url()?>/dsa/dsa/css/navbar.css" rel="stylesheet">  
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
   
   <style>
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
    <div>
      
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
		  <a href="javascript:window.history.go(-1);">
                          <button style="margin-top: 10px;" class='uploadbutton'>Back</button>    
           </a>
		
            <div class="container">
                <a href="<?php base_url()?>/dsa/dsa/index.php" class="navbar-brand"><img style="" src="<?php base_url()?>/dsa/dsa/images/FL_LogoFull_jpg copy.jpg" alt="Finaleap - Dreams to innovation"></a>               
                
                
                    <div class="border border-light rounded">
                      <?php if($showNav > 0 || $this->session->userdata("USER_TYPE") != 'CUSTOMER') {?>
                    	     <button class="w3-button w3-xlarge w3-right" onclick="openRightMenu()">&#9776;</button>    
                       <?php }?>
                        <?php if($age!='' && $age > 0) { ?>
                            <?php if(!empty($this->session->userdata("USER_TYPE")) && $this->session->userdata("USER_TYPE") == 'CUSTOMER') { ?>
                              <button style="margin-top: 10px;" class='uploadbutton' onclick="openApplyForm()">Apply For Loan</button>    
                            <?php } ?>      
                        <?php } ?> 
                        
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

        <?php if($userType == 'DSA') {?>
            <div class="w3-sidebar w3-bar-block w3-card w3-animate-right side-nav-scroll" style="display:none;right:0;" id="rightMenu">
              <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/profile" class="w3-bar-item w3-button w3-medium">Profile</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa" class="w3-bar-item w3-button w3-medium">Dashboard</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/customer/customer_documents" class="w3-bar-item w3-button w3-medium">Documents</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/banks" class="w3-bar-item w3-button w3-medium">Banks</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/customer/applied_loans_list" class="w3-bar-item w3-button w3-medium">Applied Loans</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/managers" class="w3-bar-item w3-button w3-medium">Managers</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/csr" class="w3-bar-item w3-button w3-medium">CSR</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/customers" class="w3-bar-item w3-button w3-medium">Customers</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/loans" class="w3-bar-item w3-button w3-medium">Loans</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/custBureauReports" class="w3-bar-item w3-button w3-medium">Customer Bureau Reports</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/custOfferLetters" class="w3-bar-item w3-button w3-medium">Customer Offer Letters</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/changePassword" class="w3-bar-item w3-button w3-medium">Change Password</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/logout" class="w3-bar-item w3-button w3-medium">Logout</a> <hr class="hr-margin">
            
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
		
		   <?php if($userType == 'credit_manager_user') {?>
            <div class="w3-sidebar w3-bar-block w3-card w3-animate-right side-nav-scroll" style="display:none;right:0;" id="rightMenu">
              <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/dsa/profile" class="w3-bar-item w3-button w3-medium">Profile</a> <hr class="hr-margin">
              <a href="<?php echo base_url();?>index.php/credit_manager_user" class="w3-bar-item w3-button w3-medium">Dashboard</a> <hr class="hr-margin">     
              <a href="<?php echo base_url();?>index.php/credit_manager_user/customers" class="w3-bar-item w3-button w3-medium">Customers</a> <hr class="hr-margin">              
              <a href="<?php echo base_url();?>index.php/logout" class="w3-bar-item w3-button w3-medium">Logout</a> <hr class="hr-margin">
           </div>
        <?php } ?>


    </div>

    
    <a href="index.html#0" class="cd-top" title="Go to top">Top</a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php base_url()?>/dsa/dsa/js/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slider script -->
    <script src="<?php base_url()?>/dsa/dsa/js/owl.carousel.min.js"></script>    
    <script src="<?php base_url()?>/dsa/dsa/js/main.js"></script>
    <!-- Back to top script -->
    <script src="<?php base_url()?>/dsa/dsa/js/back-to-top.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>