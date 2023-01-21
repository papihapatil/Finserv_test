<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Create a stylish landing page for your business startup and get leads for the offered services with this HTML landing page template.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Finaleap</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/fontawesome-all.css" rel="stylesheet">
	
    <link href="<?php echo base_url()?>assets/css/swiper.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo base_url()?>assets/images/logo.jpg">
</head>
<style>
    .footer {
    padding-top: 4.625rem;
    padding-bottom: 0.5rem;
    background: #00254f;
}
.footer h4 {
    margin-bottom: 1rem;
    color: white;
}
a.turquoise {
    color: #da2828;
}
.footer .fa-stack .fa-stack-2x {
    color: #da2828;
    transition: all 0.2s ease;
}
.footer .list-unstyled .media-body {
    margin-left: 0.625rem;
    color: white;
}
h3 {
    color: white;
}
.copyright {
     background: #00254f;
}
.copyright .p-small {
    padding-top: 1.375rem;
    border-top: 1px solid white;
    opacity: 0.7;
    color: white;
}
a {
    color: white;
}
.navbar-custom button[aria-expanded='false'] .navbar-toggler-awesome.fas.fa-bars {
    display: inline-block;
    color: red;
}
.navbar-custom .nav-item .nav-link:hover {
    color: red;
    border-bottom: solid;
    border-radius: 0px 0px 40px 40px;
   
}
@media (min-width: 992px)
{
.navbar-custom .nav-item .nav-link {
    padding: 0.25rem 0.75rem 0.25rem 0.75rem;
    color: #00254f;
    opacity: 0.8;
}
.navbar-custom {
    padding: 2.125rem 1.5rem 2.125rem 2rem;
    box-shadow: none;
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
    background: white;
}
}
</style>
<body data-spy="scroll" data-target=".fixed-top">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Finaleap</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.html"><img src="<?php echo base_url()?>assets/images/logo.jpg" alt="alternative"></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="https://finaleap.com/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="https://finaleap.com/#services">Services</a>
                </li>
                
                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link page-scroll" href="https://finaleap.com/#about" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">About</a>

                </li>
              

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="https://finaleap.com/#contact">Contact</a>
                </li>
            </ul>
       
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->




    <?php $this->load->view($view);?>


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
             
                <div class="col-md-6">
                <center>     <div class="footer-col middle">
                        <h4>Important Links</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                               
                           <div class="media-body">Our business partners <a class="turquoise" href="#your-link">Coming Soon</a></div>
                            </li>
                           
							  <li class="media">
                               
                                <div class="media-body">Read our <a class="turquoise" href="<?php echo base_url();?>TERMS_AND_CONDITIONS.pdf" target="_blank">Terms & Conditions</a>, <a class="turquoise" href="<?php echo base_url();?>PRIVACY_POLICY.pdf" target='_blank'>Privacy Policy</a></div>
                            </li>
							 <li class="media">
                               
                                <div class="media-body">CIN number : U72900PN2020PTC194212</div>
                            </li>
							 <li class="media">
                               
                                <div class="media-body">GST number : U27AAECF2484Q1Z0</div>
                            </li>
                        </ul>
                    </div></center>
                </div> <!-- end of col -->
                <div class="col-md-6">
                <center>  <div class="footer-col last">
                        <h3>FINALEAP</h3>
                        <h4>Social Media</h4>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fa fa-circle fa-stack-2x"></i>
                               <i class="fa fa-facebook fa-stack-1x" aria-hidden="true"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fa fa-circle fa-stack-2x"></i>
                               <i class="fa fa-twitter fa-stack-1x" aria-hidden="true"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-google-plus fa-stack-1x" aria-hidden="true"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-instagram fa-stack-1x" aria-hidden="true"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-linkedin fa-stack-1x" aria-hidden="true"></i>
                            </a>
                        </span>
                    </div> </center>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © 2020 <a href="#">Finaleap</a> - All rights reserved</p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->


    <!-- Scripts -->
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="<?php echo base_url()?>assets/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="<?php echo base_url()?>assets/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="<?php echo base_url()?>assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="<?php echo base_url()?>assets/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="<?php echo base_url()?>assets/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="<?php echo base_url()?>assets/js/scripts.js"></script> <!-- Custom scripts -->
	  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</body>
</html>