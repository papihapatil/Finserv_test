<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-3 col-3">
                    <div class="screen-title" style="margin-bottom:10px;">
                    	<small class="screen-title-txt">CSR's </small> 
                    </div>                    
                </div>  
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-9 col-9 margin-top-15">
                	<?php if($userType == 'DSA') { ?>
	                	Filter By :
	                	<a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/dsa/csr?s=all" class="btn-dsa-new-customer">ALL </a>
	                	<a <?php if($s == 'self'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/dsa/csr?s=self" class="btn-dsa-new-customer">SELF </a>                	                	
	                <?php } ?>	
                	<a style="margin-left: 10px;" href="<?php echo base_url()?>index.php/dsa/new_customer?type=csr" class="btn-dsa-new-customer">Add New CSR</a>
            	</div>           	
                
            </div>
        </div>
</div>

<?php if(count($csrs) == 0) { ?>
	<div >
	        <div class="container">
	            <div class="row">
	            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                    <div class="screen-title" style="margin:100px;">
	                    	<small style="border-radius: 10px; padding: 15px; background-color: white;" class="full-black-color">Unable to find any csr's.
	                    		<a style="background-color: white; border-radius: 10px; padding: 5px; margin-right: 5px; color: teal;" href="javascript:window.history.go(-1);">Go back</a>
	                    	</small>							
	                    </div>	                    
	                </div>            	
	            </div>
	        </div>
	</div>
<?php } ?>

<?php foreach($csrs as $row){?>
	
	<div class="row justify-content-center">
		
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10">
			<a href="<?php echo base_url()?>index.php/dsa/profile?type=csr&customer_link=true&id=<?php echo $row->UNIQUE_CODE;?>">
				<div class="card mb-3">
				  <div class="row no-gutters">
				    <div class="col-xl-2.5 col-lg-2.5 col-md-2.5 col-sm-2.5 col-2.5 align-self-center">
				    <?php if($row->PHOTO !='') { ?>	
				      <img  style="margin-left: 10px;" src="<?php base_url()?>/dsa/dsa/images/<?php echo $row->PHOTO;  ?>" class="rounded float-left card-img manager-img">
				    <?php } else {?>
				    	<img  style="width:50px; height: 50px; margin-left: 10px; margin-top: 4px; margin-bottom: 4px; margin-left: 14px;" src="<?php base_url()?>/dsa/dsa/images/user.png" class="rounded float-left card-img manager-img">
				    <?php } ?>
				    </div>
				    <div class="col-xl-9 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8">
				      <div class="card-bg">
					      	<div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<b style="font-size: 14px;"><?php echo $row->FN." ".$row->LN;  ?></b>			     </div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<?php if($row->EXPERIENCE == '' || $row->EXPERIENCE == 0) { ?><p class="card-text" 	 	style="font-size: 10px; color: red">INCOMPLETE PROFILE</p>
							        <?php }else { ?>
							        	<p class="card-text" style="color: green; font-size: 10px;">COMPLETED PROFILE</p>
							        <?php } ?>
					        	</div>
					        </div>				        
					        <div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<p class="card-text"><small class="text-muted">Email : <?php echo $row->EMAIL;  ?></small></p>
					        	</div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<p class="card-text"><small class="text-muted">Mobile : <?php echo $row->MOBILE;  ?></small></p>
					        	</div>
					        </div>

					        <div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<p class="card-text"><small class="text-muted">Join Date : <?php $date = date_create($row->CREATED_AT); echo date_format($date, 'd-m-Y h:i'); ?></small></p>
					        	</div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		
					        	</div>
					        </div>				       				        				        				      
				      </div>
				    </div>
				    <div class="col-xl-0.5 col-lg-0.5 col-md-0.5 col-sm-0.5 col-0.5 align-self-center">
				    	
				    	<i class="fa fa-chevron-right"></i>
				    </div>
				  </div>
				</div>	
			</a>		
		</div>	
		
	</div>
<?php } ?>

