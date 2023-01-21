
<?php ini_set('short_open_tag', 'On'); ?>
<?php
    $message = $this->session->flashdata('success');
    if (isset($message)) {
        echo '<script> swal("success!", "Profile updated successfully", "success");</script>';
         $this->session->unset_userdata('success');	
    }

    ?>
	<?php
    $message = $this->session->flashdata('error');
    if (isset($message)) {
        echo '<script> swal("warning!", "Something get wrong", "warning");</script>';
         $this->session->unset_userdata('error');	
    }

    ?>

	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				
			</div>

			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div>
						<span class="shadow align-middle dot-white "><a href="<?php echo base_url()?>index.php/credit_manager_user/CAM_Applicant_Details?ID=<?php echo $row->UNIQUE_CODE;?>"><i style="font-size:18px; text-align: center; width: 100%; color:#25a6c6;" class="fa fa-user-o" aria-hidden="true"></i></a></span>				
					</div>
					
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
					<div>
						<span class="align-middle dot-white "><a href="<?php echo base_url()?>index.php/credit_manager_user/Document_verification"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></a></span>
					</div>	
					 <div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
					<div>
						<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/credit_manager_user/Credit_Analysis"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></a></span>
					</div>	
			
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
					<div>
						<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/credit_manager_user/Other_attributes"><i style="font-size:18px; color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></a></span>
					</div>	
					  <?php if($appliedloan->LOAN_TYPE=='home')
			             {	?>	
							<div >
								<span class="shadow align-middle dot-hr"></span>
							</div>					
							<div>
								<span class="align-middle dot"><a href="<?php echo base_url()?>index.php/credit_manager_user/collateral"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></a></span>
							</div>	
					<?php } ?>	
                  					
				</div>	
			</div>
			
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div style="font-size: 10px; color: black; margin-right: 20px;">
						Applicant Details
					</div>
					
					<div style="font-size: 10px; color: black; margin-right: 30px;">
						Document Verification
					</div>					

					<div style="font-size: 10px; margin-right: 20px; color: black;">
						Credit And Analysis
					</div>
					<div style="font-size: 10px; margin-right: 20px; color: black;">
						Other Attributes
					</div>
					<?php if($appliedloan->LOAN_TYPE=='home')
			             {	?>	
						 <div style="font-size: 10px; margin-right: 20px; color: black;">
							Collateral and Recommendations
						</div>
					<?php }?>
				</div>	
			</div>
		</div>
		<form method="POST" action="<?php echo base_url(); ?>index.php/credit_manager_user/update_Collateral_attributes" id="">
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Collateral and Recommendations</span>

			</div>
			
			<div class="w-100"></div>
			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			
				
					
	  				
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  			     <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Address of property</span>
					</div>
					
	  					<div style="margin-left: 35px; margin-top: 8px;" class="col">
						
							<input style="margin-top: 1px;" disabled placeholder="Address Line 1 *" class="input-cust-name" type="text" name="PROP_ADD_LINE_1"  id="PROP_ADD_LINE_1" value="<?php if(!empty($appliedloan)) {echo $appliedloan->PROP_ADD_LINE_1;} ?>">
							<input style="margin-top: 8px;" disabled placeholder="Address Line 2 *" class="input-cust-name" type="text" name="PROP_ADD_LINE_2"  id="PROP_ADD_LINE_2" value="<?php if(!empty($appliedloan)) {echo $appliedloan->PROP_ADD_LINE_2;} ?>" >
							<input style="margin-top: 8px;" disabled placeholder="Address Line 3 *" class="input-cust-name" type="text" name="PROP_ADD_LINE_3"  id="PROP_ADD_LINE_3" value="<?php if(!empty($appliedloan)) {echo $appliedloan->PROP_ADD_LINE_3;} ?>">
					
	  				</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					 <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Registered Agreement to Sale/ Sale Deed</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<div class="input-cust-name" style=" margin-top: 8px;">
						
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input  type="radio" disabled name="Sale_Deed" value="yes" <?php if(!empty($row_more))if ($row_more->Sale_Deed == 'yes') echo ' checked="true"'; ?> > yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input   type="radio" disabled name="Sale_Deed" value="no" <?php if(!empty($row_more))if ($row_more->Sale_Deed == 'no') {echo ' checked="true"';}?> > no
								</div>
								
							</div>	
						</div>  
	  				</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Land value </span>
					</div>
				
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  disabled class="input-cust-name" type="number" id="Land_value" name="Land_value"  value="<?php if(!empty($row_more)){echo $row_more->Land_value;}?>" onkeyup="Cal_Total_Value()">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Construction value</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  disabled class="input-cust-name" type="number" id="Construction_value" name="Construction_value"  value="<?php if(!empty($row_more)){echo $row_more->Construction_value;}?>" onkeyup="Cal_Total_Value()">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Total Value of the property</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input readonly class="input-cust-name" type="number" name="Total_Value" id="Total_Value"  value="<?php if(!empty($row_more)){echo $row_more->Total_Value;}?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Agreement value of the property</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  disabled class="input-cust-name" type="number" name="Agreement_value"  value="<?php if(!empty($row_more)){echo $row_more->Agreement_value;}?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Agreement if any</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  disabled class="input-cust-name" type="date" name="Date_of_Agreement"  value="<?php if(!empty($row_more)){ if($row_more->Date_of_Agreement){ echo $row_more->Date_of_Agreement;}}?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">LTV Details</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  disabled class="input-cust-name" type="number" name="LTV"  value="<?php if(!empty($row_more)){echo $row_more->LTV;}?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">LTV in case of new purchase</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled  class="input-cust-name" type="number" name="LTV_new"  value="<?php if(!empty($row_more)){echo $row_more->LTV_new;}?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					 <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Legal Report</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<div class="input-cust-name" style=" margin-top: 8px;">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled type="radio" name="Legal_report" value="yes" <?php if(!empty($row_more))if ($row_more->Legal_report == 'yes') echo ' checked="true"'; ?> > yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input  disabled type="radio" name="Legal_report" value="no"  <?php if(!empty($row_more))if ($row_more->Legal_report == 'no') echo ' checked="true"'; ?>> no
								</div>
								
							</div>	
						</div>  
	  				</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">FOIR</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled  class="input-cust-name" type="text" name="FOIR"  value="<?php if(!empty($data_credit_analysis)){ if($data_credit_analysis->foir){ echo $data_credit_analysis->foir;}}?>">
						</div>
				</div>
				
				
				
					
											  				
			</div>	
			
  				
		</div>
		
<!------------Personal Details----------------------->
		



       
	</div>
	
	
	</form>
	<script>
	
	function Cal_Total_Value()
	{
		
		var Land_value=parseFloat(document.getElementById('Land_value').value);
		var Construction_value=parseFloat(document.getElementById('Construction_value').value);
		var Total_Value =Land_value+Construction_value;
		document.getElementById('Total_Value').value= Total_Value;
		
	}
	</script>