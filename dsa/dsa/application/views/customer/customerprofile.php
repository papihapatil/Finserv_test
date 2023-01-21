	<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="screen-title">
                    	<small class="screen-title-txt">MY PROFILE</small>
                    </div>
                </div>            	
            </div>
        </div>
</div>

<div class="font-faticon w3-container margin-top-10 black-color">
  
  <div class="w3-bar w3-custom-header-color-one">
    <button class="w3-bar-item w3-button tablink w3-light-red"><a class="black-color" href="<?php echo base_url('index.php/customer')?>">PROFILE INFO</a></button>
    <button class="w3-bar-item w3-button tablink"><a class="black-color" href="<?php echo base_url('index.php/customer/moreinfo')?>">MORE INFO</a></button>
  </div>
  
  <div style="background-color: white;" id="London" class="w3-container city white-color">
	    <div class="w3-panel">
	    	<div style="margin-top: 15px; text-align: center;"  class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
					<div class="gray-color-1 ">
		    			First Name
		    		</div>
		    		<div class="bold-font black-color">
		    			<?php echo $fn?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
					<div class="gray-color-1 ">
		    			Last Name
		    		</div>
		    		<div class="bold-font black-color ">
		    			<?php echo $ln?>
		    		</div>
				</div>
			</div>

			<div style="margin-top: 15px; text-align: center;" class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
					<div class="gray-color-1">
		    			Mobile 
		    		</div>
		    		<div class="bold-font black-color ">
		    			<?php echo $mobile?>
		    		</div>
				</div>
				<p class="rule-vertical-40" />
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
					<div class="gray-color-1 ">
		    			Email-Id
		    		</div>
		    		<div class="bold-font black-color ">
		    			<?php echo $email?>
		    		</div>
				</div>
			</div>	
	    	    	

	    	<div class="row justify-content-center padding-top-15">
	    		<div class="row  col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12 justify-content-center">
	    			<div class="gray-color-1 col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
		    			<div class="container-login100-form-btn justify-content-center">
		    				<form style="width: 100%;" action="<?php echo base_url();?>index.php/customer/customer_edit_profile_1">
							    <input class="login100-form-btn" type="submit" value="Edit Profile" />
							</form>							
						</div>		
		    		</div>		    		
	    		</div>
	    	</div>	     	
	    </div>
  </div>

  <div id="Tokyo" class="w3-container w3-border city" style="display:none">
    <h2>Tokyo</h2>
    <p>Tokyo is the capital of Japan.</p>
  </div>
</div>
