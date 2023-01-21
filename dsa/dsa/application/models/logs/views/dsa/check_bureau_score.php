
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


		<?php ini_set('short_open_tag', 'On'); ?>

	<div class="margin-10 padding-5">
	   <div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
			<?php if(!empty($row2)){if ($row2->customer_consent=='true'){?>
					<div class="row" style="margin-left: 10px;">
						Edit

						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div>
								<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/dsa/check_bureau_score_edit?ID=<?php echo $row2->UNIQUE_CODE;?>"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
							</div>	
						</div>				
					</div>
			<?php } }?>
									
			</div> 
</span>	
 
    <div class="row" >
	    <div class="col-sm-12" >
			<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Check Applicant Bureau Score <p style="margin-left:5px; background-color:green; border-radius:10px; color:white; padding:5px;">Credit score : <?php if(isset($score)){echo $score;} else { echo "Score not Checked";}?></span>
                </div>
				<div class="row col-12">
				    <div class="w-100"></div>
					<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Full name as per PAN card *</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input readonly style="margin-top: 8px;" placeholder="First Name *" class="form-control" type="text" id="f_name" name="f_name" minlength="3" maxlength="30" required value="<?php echo $row2->FN;?>" oninput="validateText(this)">
	  					<input readonly style="margin-top: 8px;" placeholder="Middle Name (optional) *" class="form-control" type="text" name="m_name" id="m_name"  value="<?php echo $row2->MN;?>" minlength="3" maxlength="30" oninput="validateText(this)">
	  					<input readonly style="margin-top: 8px;" placeholder="Last Name *" class="form-control" type="text" name="l_name" id="l_name" minlength="3" maxlength="30" required  value="<?php echo $row2->LN;?>" oninput="validateText(this)">
						<input  hidden style="margin-top: 8px;" placeholder="Last Name *" class="form-control" type="text" name="ID" id="ID" minlength="3" maxlength="30" required  value="<?php echo $row2->UNIQUE_CODE;?>" oninput="validateText(this)">
	  				</div>
					    <div style="margin-top: 10px;" class="col">
							<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 54px;  font-weight: bold; ">Date of Birth *</span>
					    </div>			
					    <div class="w-100"></div>
	  					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input readonly  class="form-control" type="date" name="dob" id="dob" value="<?php echo $row2->DOB;?>" >
	  					</div>
    				    <div style="margin-top: 20px;" class="col">
					    	<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 54px;  font-weight: bold; ">Gender *</span>
					    </div>			
					    <div class="w-100"></div>
					    <div style="margin-left: 40px;" class="col">
  					    <div class="input-cust-name" style=" margin-top: 8px;">
  						<div class="row">
  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  							<input readonly disabled="true" type="radio" name="gender" value="male"  <?php if ($row2->GENDER == 'male') echo ' checked="true"'; ?>> Male
	  					</div>
	  					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  						<input readonly disabled="true" type="radio" name="gender" value="female"  <?php if ($row2->GENDER == 'female') echo ' checked="true"'; ?>> Female
	  					</div>
  						</div>	
						</div>  	
						</div>


						<div style="margin-top: 10px;" class="col">
					    	<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 54px;  font-weight: bold; ">Employment Type *</span>
					    </div>
						
						<div class="w-100"></div>
	  					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <select readonly required class="form-control" name="employment_type" > 
					  		<option value="" >Select Property Type *</option>
					  		<option value="salaried"       <?php if(!empty($row_more))if ($row_more->employment_type == 'salaried') echo ' selected="selected"'; ?>>Salaried</option>
					  		<option value="self_employee"  <?php if(!empty($row_more))if ($row_more->employment_type == 'self_employee') echo ' selected="selected"'; ?>>Self EMployee</option>
							  <option value="retired"       <?php if(!empty($row_more))if ($row_more->employment_type == 'retired') echo ' selected="selected"'; ?>>Retired</option>
						</select>
						</div>
					
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Email-Id *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				  <input readonly required placeholder="Enter email-Id *"  class="form-control"  type="email" name="email" value="<?php echo $row2->EMAIL;?>" >
  			   </div>
				<div class="w-100"></div>
 				<div style="margin-top: 10px;" class="col">
				  <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<input readonly required placeholder="Enter mobile number *" class="form-control" type="text" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" name="mobile" oninput="maxLengthCheck(this)" value="<?php echo $row2->MOBILE;?>">
				</div> 
                <div class="w-100"></div>
                <div style="margin-top: 10px;" class="col">
                <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Pincode *</span>
                </div>			
                <div class="w-100"></div>
                <div style="margin-left: 35px;  margin-top: 8px;" class="col">
                   <input readonly required placeholder="Enter pincode *" class="form-control"  type="text" pattern="[0-9]{6}" minlength="6" title="Please enter valid pin code" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_PINCODE;?>">
  				</div>  
                <div class="w-100"></div>
                <div style="margin-top: 10px;" class="col">
                    <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">State *</span>
                </div>			
                <div class="w-100"></div>
                <div style="margin-left: 35px;  margin-top: 8px;" class="col">
                    <input readonly readonly id="resi_state_view" placeholder="State" class="form-control" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_STATE ;?>">
  					<input hidden="true" placeholder="State" class="form-control"name="resi_state" id="resi_state" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_STATE ;?>">  					
  				</div>  


				  <div style="margin-top: 10px;" class="col">
                    <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Monthly gross income *</span>
                </div>			
                <div class="w-100"></div>
                <div style="margin-left: 35px;  margin-top: 8px;" class="col">
                    <input readonly readonly id="resi_state_view" placeholder="Enter Monthly gross income " class="form-control" value="<?php if(!empty($row_more))echo $row_more->monthly_income ;?>">
  					<input hidden="true" placeholder="State" class="form-control"name="resi_state" id="resi_state" value="">  					
  				</div>  


			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				<div style="margin-top: 0px;" class="col">
				  <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 54px;  font-weight: bold; ">Address *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input readonly required style="margin-top: 1px;" placeholder="Address Line 1 *" class="form-control" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_1;?>">
  					<input readonly style="margin-top: 8px;" placeholder="Address Line 2 *" class="form-control" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_2;?>">
  					<input readonly style="margin-top: 8px;" placeholder="Address Line 3 *" class="form-control" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_3;?>">
  				</div> 
		        <div class="w-100"></div>
  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 54px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  				<input readonly disabled="true" placeholder="District" class="form-control" id="resi_district_view" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_DISTRICT ;?>">
  					<input hidden="true" placeholder="District" class="form-control" name="resi_district" id="resi_district" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_DISTRICT ;?>">
  				</div> 
   			    <div class="w-100"></div>
  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 54px;  font-weight: bold; ">City *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  				   <input readonly placeholder="City" class="form-control" name="resi_city" id="resi_city" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_CITY ;?>" minlength="3" maxlength="30">
  				</div> 


				  <div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 54px;  font-weight: bold; ">Enter current EMI's if any </span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  				   <input readonly placeholder="Enter EMI" class="form-control" name="resi_city" id="resi_city" value="<?php if(!empty($row_more))echo $row_more->current_emi ;?>" minlength="3" maxlength="30">
  				</div> 
      		</div>  
			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Father Details</span>
			</div>
			<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;">
  						<div class="row">
  						
	  						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
	  							<input checked="true" type="radio" name="spouse" value="father"> Father's Full name as per PAN card *
	  						</div>
  						</div>						
  					</div>  					
  				</div>
				  <div class="row">
  				<div style="margin-left: 35px; margin-top: 8px;"  class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  					<input readonly required placeholder="First Name *" class="form-control" type="text" name="s_f_name" id="s_f_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_F_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
  				</div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  					<input readonly placeholder="Middle Name (Optional)" class="form-control" type="text" name="s_m_name" id="s_m_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_M_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
  				</div>
  				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  					<input readonly required placeholder="Last Name *" class="form-control" type="text" name="s_l_name" id="s_l_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_L_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
  				</div>


				
            
		
		
		
		
		
		
		
		</div>
		
				

	</div>

	
			
		<!-- family ------------------------------- -->
	
	</div>
<hr>
<div >
        



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