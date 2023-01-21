
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
						<span class="align-middle dot"><a href="<?php echo base_url()?>index.php/credit_manager_user/Other_attributes"><i style="font-size:18px; color:#ffffff; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></a></span>
					</div>	
					 <?php if($appliedloan->LOAN_TYPE=='home')
			             {	?>	
							<div >
								<span class="shadow align-middle dot-hr"></span>
							</div>					
							<div>
								<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/credit_manager_user/collateral"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></a></span>
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
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Linkedin</span>

			</div>
			
			<div class="w-100"></div>
			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				    <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Present employment Verification</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<div class="input-cust-name" style=" margin-top: 8px;">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled  type="radio" name="Pre_employement" value="yes" <?php if(!empty($row_more)){ if($row_more->Pre_employement=="yes"){ echo 'checked';}}?> > yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled  type="radio" name="Pre_employement" value="no" <?php if(!empty($row_more))if ($row_more->Pre_employement == 'no'|| $row_more->Pre_employement == 'NULL' || $row_more->Pre_employement == '') echo ' checked="true"'; ?>> no
								</div>
								
							</div>	
						</div>  
	  				</div>
				</div>
					
	  				
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  			     <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Present employment Verification</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<div class="input-cust-name" style=" margin-top: 8px;">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled  type="radio" name="Past_Employement" value="yes" <?php if(!empty($row_more)){ if($row_more->Past_Employement=="yes"){ echo 'checked';}}?> > yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled type="radio" name="Past_Employement" value="no" <?php if(!empty($row_more))if ($row_more->Past_Employement == 'no'|| $row_more->Past_Employement == 'NULL' || $row_more->Past_Employement == '') echo ' checked="true"'; ?>> no
								</div>
								
							</div>	
						</div>  
	  				</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					 <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Education background</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<div class="input-cust-name" style=" margin-top: 8px;">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled type="radio" name="Edu_background" value="yes" <?php if(!empty($row_more)){ if($row_more->Edu_background=='yes'){ echo 'checked';}}?> > yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled  type="radio" name="Edu_background" value="no"  <?php if(!empty($row_more))if ($row_more->Edu_background == 'no'|| $row_more->Edu_background == 'NULL' || $row_more->Edu_background == '') echo ' checked="true"'; ?>> no
								</div>
								
							</div>	
						</div>  
	  				</div>
				</div>
			    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Linkedin Connects </span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled  class="input-cust-name" type="number"  name="Connects"  value="<?php if(!empty($row_more)){ if($row_more->Connects){ echo $row_more->Connects;}}?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Recommendations given by supervisors</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  disabled class="input-cust-name" type="text" name="Recommendations"  value="<?php if(!empty($row_more)){ if($row_more->Recommendations){ echo $row_more->Recommendations;}}?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Professional courses done </span>
					</div>		
						<div class="w-100"></div>
						<?php if(!empty($row_more))
						{ if($row_more->Professional_courses)
							{ $Professional_courses=explode(",",$row_more->Professional_courses);
								 foreach($Professional_courses as $Professional_course)
								 { if($Professional_course==''){break;}?>
								    
						
									<div style="margin-left: 35px;  margin-top: 8px;" class="col" id="">
										<input   class="input-cust-name" type="text"  
											 name="Professional_courses[]"  value="<?php if(!empty($Professional_course)){ echo $Professional_course;}?>">
									</div>
									
								 <?php }
							}
						} ?>
						        
						
									
						
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Hobbies</span>
					</div>		
						<div class="w-100"></div>
						<?php if(!empty($row_more))
						{ if($row_more->Hobbies)
							{ $Hobbies=explode(",",$row_more->Hobbies);
								 foreach($Hobbies as $Hobbie)
								 { if($Hobbie==''){break;}?>
						
									<div style="margin-left: 35px;  margin-top: 8px;" class="col" id="">
										<input disabled  class="input-cust-name" type="text"  
											 name="Hobbies[]"  value="<?php if(!empty($Hobbie)){ echo $Hobbie;}?>">
									</div>
									
								 <?php }
							}
						} ?>
						
						

				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Skills and Endorsements</span>
					</div>		
						<div class="w-100"></div>
						<?php if(!empty($row_more))
						{ if($row_more->Skills)
							{ $Skills=explode(",",$row_more->Skills);
								 foreach($Skills as $Skill)
								 { if($Skill==''){break;}?>
						         
									<div style="margin-left: 35px;  margin-top: 8px;" class="col" id="">
										<input disabled  class="input-cust-name" type="text"  
											 name="Skills[]"  value="<?php if(!empty($Skill)){ echo $Skill;}?>">
									</div>
								
									
								 <?php }
							}
						} ?>
						
				</div>
					
											  				
			</div>	
			
  				
		</div>
		
<!------------Personal Details----------------------->
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Facebook</span>
			</div>
			
			<div class="w-100"></div>
			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				    <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Latest vacation done if any</span>
					</div>
					<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled  class="input-cust-name" type="text" name="vacation"  value="<?php if(!empty($row_more)){ if($row_more->vacation){ echo $row_more->vacation;}}?>">
						</div>
				</div>
					
	  				
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  			     <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Unusual(keywords) </span>
					</div>
					<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled  class="input-cust-name" type="text" name="anti_post"  value="<?php if(!empty($row_more)){ if($row_more->anti_post){ echo $row_more->anti_post;}}?>">
						</div>
				</div>
			</div>
			
			
  			 			
		</div>

		
	</div>
	<div class="row shadow bg-white rounded margin-10 padding-15" >
				<div class="row col-12 justify-content-center">
					<div>
					<?php if($appliedloan->LOAN_TYPE=='home')
			             {	?>	
						<a href="<?php echo base_url()?>index.php/credit_manager_user/collateral">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							NEXT
						</button></a>
						 <?php } else{ ?>
						 						<a href="<?php echo base_url()?>index.php/credit_manager_user/Other_attributes">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							NEXT
						</button></a>
						 <?php } ?>
					</div>		
				</div>					
			</div>