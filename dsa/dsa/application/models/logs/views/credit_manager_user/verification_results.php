

	<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15"><h2>Verification Result</h2></div>
		

<div class="row shadow bg-white rounded margin-10 padding-15">
     <div class="row col-sm-12 col-md-12 col-lg-12"> 
        <div class="col-sm-4 col-lg-4 col-md-4">
		Pan No 				: <?php if(!empty($row)){echo $row->PAN_NUMBER;}?>
		<br><br>
		Aadhar No 			: <?php if(!empty($row)){echo $row->AADHAR_NUMBER;}?>
		<br><br>
		Passport No			: <?php if(!empty($row_more)){echo $row_more->Passport_Number;}?>
		<br><br>
		Driving Licence No 	: <?php if(!empty($row_more))echo $row_more->Driving_l_Number;?>
		<br><br>
		Vehicle No			: <?php if(!empty($row_more)){echo $row_more->Vechical_Number;}?>
		<br><br>
		GST No				:<?php if(!empty($data_cust_income_details)){echo $data_cust_income_details->BIS_GST;}?>
		
		<?php 
		if(!empty($data_cust_income_details))
		{
			if($data_cust_income_details->BIS_PROFESSION=='CA')
			{
		?>
		<br><br>
		CA Registration No				:<?php if(!empty($data_cust_income_details)){echo $data_cust_income_details->CA_regi_no;}?>
        <?php		
			}
			else if($data_cust_income_details->BIS_PROFESSION=='CS')
			{
		?>
		<br><br>
		CS Registration No				:<?php if(!empty($data_cust_income_details)){echo $data_cust_income_details->CS_regi_no;}?>
		<?php
			}
			else if($data_cust_income_details->BIS_PROFESSION=='ICWA')
			{
		?>
			<br><br>
		ICWA Registration No				:<?php if(!empty($data_cust_income_details)){echo $data_cust_income_details->ICWA_regi_no;}?>
					
	    <?php
			}
			
		}

		?>
		
		
				
					
					
					
		
		
		</div>
		<div class="col-sm-4 col-lg-4 col-md-4">
		Pan Verified				:<?php if(!empty($row_more))if ($row_more->VERIFY_PAN == 'true'){ echo 'Yes';} else {echo 'No';}?>
		<br><br>
		Aadhar Verified 			: <?php if(!empty($row_more)){ if($row_more->STATUS=='Aadhar E-sign complete'){echo'Yes';}else{ echo 'No';}}?>
		<br><br>
		Passport Verified	 		: <?php if(!empty($row_more)){if($row_more->verify_Passport_no=='true'){echo 'Yes';} else{echo 'No'; } }?>
		<br><br>
		Driving Licence verification: <?php if(!empty($row_more)){ if($row_more->verify_Driving_l_Number=='true'){echo 'Yes';} else{echo 'NO';} }?>
		<br><br>
        Vehicle No Verification		: <?php if(!empty($row_more)){ if($row_more->verify_Vechical=='true'){echo 'Yes';} else{echo 'NO';}}?>
		<br><br>	
        GST No Verification			:<?php if(!empty($row_more)){ if($row_more->verify_GST_status=='true'){echo 'Yes';}else{echo 'No';}}?>
		
		
		
		<?php 
		if(!empty($data_cust_income_details))
		{
			if($data_cust_income_details->BIS_PROFESSION=='CA')
			{
		?>
		<br><br>	
       CA No Verification			:<?php if(!empty($row_more)){ if($row_more->verify_ca_regi_status=='true'){echo 'Yes';}else{echo 'No';}}?>
		  <?php		
			}
			else if($data_cust_income_details->BIS_PROFESSION=='CS')
			{
		?>
	<br><br>	
        CS No Verification			:<?php if(!empty($row_more)){ if($row_more->verify_cs_regi_status=='true'){echo 'Yes';}else{echo 'No';}}?>
	<?php
			}
			else if($data_cust_income_details->BIS_PROFESSION=='ICWA')
			{
		?>
		<br><br>	
        ICWA No Verification			:<?php if(!empty($row_more)){ if($row_more->verify_icwa_regi_status=='true'){echo 'Yes';}else{echo 'No';}}?>
		 <?php
			}
			
		}

		?>
						
					
					
					
		
		</div>
		<div class="col-sm-4 col-lg-4 col-md-4">
		<?php if(!empty($row_more)){if ($row_more->VERIFY_PAN == 'true'){?>Source : Verified by NSDL on <?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } }?>
		<br><br>
	    <?php if(!empty($row_more)){ if($row_more->STATUS=='Aadhar E-sign complete'){?>Source : Verified Manually on <?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } }?>
		<br><br>
        <?php if(!empty($row_more)){if($row_more->verify_Passport_no=='true'){?>Source :<?php if(!empty($row_more)){if($row_more->KYC_doc=='Passport'){echo ' Verified by Government authority on '.$row_more->TIMESTAMP; } else{ echo 'Verified Manually on '. $row_more->TIMESTAMP;}}?> <?php } }?>
		<br><br>
		<?php if(!empty($row_more)){ if($row_more->verify_Driving_l_Number=='true'){?>Source :<?php if(!empty($row_more)){if($row_more->KYC_doc=='Driving Licence'){echo ' Verified by R.T.O on '.$row_more->TIMESTAMP; } else{ echo 'Verified Manually on '. $row_more->TIMESTAMP;}}?><?php } }?>
		<br><br>
        <?php if(!empty($row_more)){ if($row_more->verify_Vechical=='true'){?> Source : Verified Manually on <?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php }} ?>
		<br><br>
	    <?php if(!empty($row_more)){ if($row_more->verify_GST_status=='true'){?> Source : Verified NSDL on <?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } } ?>
		
	
		
		<?php 
		if(!empty($data_cust_income_details))
		{
			if($data_cust_income_details->BIS_PROFESSION=='CA')
			{
		?>
			<br><br>
	    <?php if(!empty($row_more)){ if($row_more->verify_ca_regi_status=='true'){?> Source : Verified ICAW on <?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } } ?>
	  <?php		
			}
			else if($data_cust_income_details->BIS_PROFESSION=='CS')
			{
		?>
		<br><br>
	    <?php if(!empty($row_more)){ if($row_more->	verify_cs_regi_status=='true'){?> Source : Verified ICSI on <?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } } ?>
		<?php
			}
			else if($data_cust_income_details->BIS_PROFESSION=='ICWA')
			{
		?>
		<br><br>
	    <?php if(!empty($row_more)){ if($row_more->verify_icwa_regi_status=='true'){?> Source : Verified ICWAI on <?php if(!empty($row_more)){echo $row_more->TIMESTAMP;}?><?php } } ?>
		 <?php
			}
			
		}

		?>
		
	</div>
	</div>	

	
	</div>


