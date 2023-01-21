	<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="screen-title">
                    	<small class="screen-title-txt">PROFILE</small>
                    </div>
                </div>            	
            </div>
        </div>
</div>

<div class="font-faticon w3-container margin-top-10 black-color row justify-content-center">  
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 justify-content-center">
	    <div class="card mb-3 ">

	    	<div class="row padding-top-15 justify-content-center">
	    		<div class="row col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
	    			<div class="font-poppins-regular gray-color-1 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
		    			<strong> Profile Info</strong>
		    		</div>	
		    		<?php if($customer_link != '' && $customer_link == 'true'){ ?>		    	
			    		<div class="font-poppins-regular gray-color-1 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
			    			<a style="color: teal;" href="<?php echo base_url();?>index.php/dsa/customers?s=self&userType=NONE&id=<?php echo $id;?>&userType2=<?php echo $type;?>"><strong> Customers</strong></a>
			    		</div>	
			    	<?php } ?>			    	
	    		</div>
	    		<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-2 col-2">
	    		</div>
	    		<?php if($edit!='' && $edit == 1) { ?>	
		    		<div class="bold-font black-color col-xl-2 col-lg-2 col-md-2 col-sm-4 col-4">
		    			<a href="<?php echo base_url();?>index.php/dsa/update_basic_profile"><i style="width: 30px; height: 30px;" alt="mahesh" class="fa fa-edit"></i></a>
		    		</div>
		    	<?php } ?>	
	    	</div>

	    	<hr>	    	

		    	<div style="text-align: center;" class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-5">
						<div class="gray-color-1">
			    			First Name 
			    		</div>
			    		<div class="size-12 bold-font black-color">
			    			<?php echo $row->FN?>
			    		</div>
					</div>
					<p class="rule-vertical-40" />
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-5">
						<div class="gray-color-1 ">
			    			Last Name
			    		</div>
			    		<div class="size-12 bold-font black-color ">
			    			<?php echo $row->LN?>
			    		</div>
					</div>
					<p class="rule-vertical-40" />
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-5">
						<div class="gray-color-1 ">
			    			Mobile Number
			    		</div>
			    		<div class="size-12 bold-font black-color ">
			    			<?php echo $row->MOBILE?>
			    		</div>
					</div>				
				</div>

				<div style="margin-top: 15px; text-align: center;" class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-5">
						<div class="gray-color-1">
			    			Email-Id
			    		</div>
			    		<div class="size-12 bold-font black-color">
			    			<?php echo $row->EMAIL?>
			    		</div>
					</div>
					<p class="rule-vertical-40" />
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-5">
						<div class="gray-color-1 ">
			    			Experience 
			    		</div>
			    		<div class="size-12 bold-font black-color ">
			    			<?php echo $row->EXPERIENCE?> Years 
			    		</div>
					</div>
					<p class="rule-vertical-40" />
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-5">
						<div class="gray-color-1 ">
			    			Date Of Birth
			    		</div>
			    		<div class="size-12 bold-font black-color ">
			    			<?php 
			    				$date=date_create($row->DOB);
			    				echo date_format($date,"d-m-Y")?>
			    		</div>
					</div>				
				</div>

				<div style="margin-top: 15px; text-align: center;" class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-5">
						<div class="gray-color-1">
			    			PAN Number
			    		</div>
			    		<div class="size-12 bold-font black-color">
			    			<?php echo $row->PAN_NUMBER?>
			    		</div>
					</div>
					<p class="rule-vertical-40" />
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-5">
						<div class="gray-color-1 ">
			    			Aadhar Number
			    		</div>
			    		<div class="size-12 bold-font black-color ">
			    			<?php echo $row->AADHAR_NUMBER?>
			    		</div>
					</div>
					<p class="rule-vertical-40" />
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-5">
						<div class="gray-color-1 ">
			    			Address
			    		</div>
			    		<div class="size-12 bold-font black-color ">
			    			<?php echo $row->CURRENT_RESIDENTIAL_ADDRESS?>
			    		</div>
					</div>				
				</div> 	 
				<div style="margin-bottom: 20px; margin-top: 15px; text-align: center;" class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">					
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-5">
						<div class="gray-color-1">
			    			State
			    		</div>
			    		<div class="size-12 bold-font black-color">
			    			<?php echo $row->STATE?>
			    		</div>
					</div>
					<p class="rule-vertical-40" />
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-5">
						<div class="gray-color-1 ">
			    			District
			    		</div>
			    		<div class="size-12 bold-font black-color ">
			    			<?php echo $row->DISTRICT?>
			    		</div>
					</div>
					<p class="rule-vertical-40" />
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-5">
						<div class="gray-color-1 ">
			    			City
			    		</div>
			    		<div class="size-12 bold-font black-color ">
			    			<?php echo $row->CITY?>
			    		</div>
					</div>				
				</div> 	    	
	    	</div>	  	    		    	    	
	    </div>
</div>
