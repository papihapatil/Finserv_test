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
			
@media only screen and (max-width: 768px) {
	.logo{
		margin-top: -40px;
    margin-right: 46px;
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
            
                <center><a href="<?php base_url()?>/dsa/dsa/index.php" class="navbar-brand"><img style="width:30%;" class="logo" src="<?php echo base_url()?>images/Finserv_logo.png" alt="Finaleap - Dreams to innovation"></a></center>               
                
                
                
            </div>
		
		
        </nav>
		
		<a href="index.html#0" class="cd-top" title="Go to top">Top</a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    


</body>

</html>