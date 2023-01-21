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


<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="screen-title" style="margin-bottom:40px;">                    	
						Applicant Name : <?php echo $Applicant_row->FN." ".$Applicant_row->LN;  ?>
                    </div>                    
                </div>     
        
</div>


	<div class="row justify-content-center">
		
		<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
	
				<div class="card mb-3">
				  <div class="row no-gutters">
				    <div class="col-xl-2.5 col-lg-2.5 col-md-2.5 col-sm-2.5 col-2.5 align-self-center">
				  
				    	<img  style="width:40px; height: 40px; margin-left: 10px; margin-top: 4px; margin-bottom: 4px; margin-left: 14px;" src="<?php base_url()?>/dsa/dsa/images/user.png" class="rounded float-left card-img manager-img">
				   
				    </div>
				    <div class="col-xl-9 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8" style="margin-left: 10px; margin-top: 5px; margin-bottom: 5px;">
				      <div class="card-bg">
					      	<div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<b style="font-size: 14px; color: #000000"><?php echo $Applicant_row->FN." ".$Applicant_row->LN;  ?></b>			     </div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<?php if($Applicant_row->PROFILE_PERCENTAGE == '' || $Applicant_row->PROFILE_PERCENTAGE!=100) { ?>
						        		<p class="card-text" style="font-size: 10px; color: red">		INCOMPLETE PROFILE 
						        			
					        			</p>
							        <?php }else { ?>
							        	<p class="card-text" style="color: green; font-size: 10px;">COMPLETED PROFILE
							        	</p>
							        <?php } ?>
					        	</div>
					        </div>				        
					        <div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<small >Email : <?php echo $Applicant_row->EMAIL;  ?></small>
					        	</div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<p class="card-text"><small class="text-muted">Mobile : <?php echo $Applicant_row->MOBILE;  ?></small></p>
					        	</div>
					        </div>
			       				        				        				      
				      </div>
				    </div>
				    <div class="col-xl-0.5 col-lg-0.5 col-md-0.5 col-sm-0.5 col-0.5 align-self-center">
				    	
				    	<i class="fa fa-chevron-right"></i>
				    </div>
					
				
				  </div>
				  
				</div>	
				
		<!--	</a>	-->
			
		</div>	
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 align-self-center">
			<?php if($Applicant_row->GENDER==NULL || $Applicant_row->GENDER=='') { ?>
				<a style="margin-left: 8px; margin-top:-10px;" target='_blank' class="btn btn-info">Bureau not generated </a>
	
							        <?php }else { ?>
							        	<a style="margin-left: 8px; margin-top:-10px;" target='_blank' href="<?php echo base_url()?>index.php/dsa/pdf?ID=<?php echo $Applicant_row->UNIQUE_CODE;?>" class="btn btn-info">Credit Bureau</a>
	
							        <?php } ?>
	
		</div>
		
	</div>
<hr>
<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="screen-title" style="margin-bottom:40px;">                    	
						Total Co-Applicants :&nbsp;&nbsp;<?php echo count($coapplicants);?>
                    </div>                    
                </div>     
        
</div>

<?php if(count($coapplicants) == 0) { ?>
	<div >
	        <div class="container">
	            <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">
	            	Unable to find any Co-Applicants.
	               						
	            </div>
	        </div>
	</div>
<?php } ?>
<?php foreach($coapplicants as $row){?>
	
	<div class="row justify-content-center">
		
		<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
	
				<div class="card mb-3">
				  <div class="row no-gutters">
				    <div class="col-xl-2.5 col-lg-2.5 col-md-2.5 col-sm-2.5 col-2.5 align-self-center">
				  
				    	<img  style="width:40px; height: 40px; margin-left: 10px; margin-top: 4px; margin-bottom: 4px; margin-left: 14px;" src="<?php base_url()?>/dsa/dsa/images/user.png" class="rounded float-left card-img manager-img">
				   
				    </div>
				    <div class="col-xl-9 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8" style="margin-left: 10px; margin-top: 5px; margin-bottom: 5px;">
				      <div class="card-bg">
					      	<div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<b style="font-size: 14px; color: #000000"><?php echo $row->FN." ".$row->LN;  ?></b>			     </div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<?php if($row->PROFILE_PERCENTAGE == '' || $row->PROFILE_PERCENTAGE!=100) { ?>
						        		<p class="card-text" style="font-size: 10px; color: red">		INCOMPLETE PROFILE 
						        			
					        			</p>
							        <?php }else { ?>
							        	<p class="card-text" style="color: green; font-size: 10px;">COMPLETED PROFILE
							        	</p>
							        <?php } ?>
					        	</div>
					        </div>				        
					        <div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<small >Email : <?php echo $row->EMAIL;  ?></small>
					        	</div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<p class="card-text"><small class="text-muted">Mobile : <?php echo $row->MOBILE;  ?></small></p>
					        	</div>
					        </div>
			       				        				        				      
				      </div>
				    </div>
				    <div class="col-xl-0.5 col-lg-0.5 col-md-0.5 col-sm-0.5 col-0.5 align-self-center">
				    	
				    	<i class="fa fa-chevron-right"></i>
				    </div>
					
				
				  </div>
				  
				</div>	
				
		<!--	</a>	-->
			
		</div>	
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 align-self-center">
		
		
							
							        	<a style="margin-left: 8px; margin-top:-10px;" target='_blank' href="<?php echo base_url()?>index.php/dsa/pdf?ID=<?php echo $row->UNIQUE_CODE;?>" class="btn btn-info">Credit Bureau</a>
		
							  
		</div>
		
	</div>
<?php } ?>


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

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>

</body>
</html>