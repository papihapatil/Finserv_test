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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
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
<?php
 
  $message = $this->session->flashdata('result');   if (isset($message)) {
		if($message=='sucess'){
			
				echo '<script> swal("success!", "Your Consent Recorded Sucessfully", "success");</script>';
				$this->session->unset_userdata('result');	
              				
			 
		}			 
       
		}
    
	
	?>
	<?php
 
  $message = $this->session->flashdata('warning');   if (isset($message)) {
		
        echo '<script> swal("warning!","Something Wrong in Record Consent please Try Later", "warning");</script>';
		$this->session->unset_userdata('warning');
       
		}
    
	
	?>
    <div >
        
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container">
                <a href="<?php base_url()?>/dsa/dsa/index.php" class="navbar-brand"><img style="" src="<?php base_url()?>/dsa/dsa/images/FL_LogoFull_jpg copy.jpg" alt="Finaleap - Dreams to innovation"></a>               
                
                
                   
            </div>
        </nav>

       

     
    </div>
	<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="screen-title" style="margin-bottom:10px;">
                    	<!--<small class="screen-title-txt">Aadhar esign</small>--->
                    </div>
                </div>            	
            </div>
        </div>
</div>



	
	<div class="row justify-content-center">
		
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10">
			
			<div class="card mb-3">
			  <div class="row no-gutters">			    
			    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12">
				
			      <div class="card-body">
				    <div class="row justify-content-center">
					        <h2 class="text-center" style="color:green;"> Thank You...! </h2>
					</div>
							
			        
			        
			      </div>
				  
			    </div>
			  
			  </div>
			</div>		
		</div>	
		
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
    


</body>

</html>