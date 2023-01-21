
<?php ini_set('short_open_tag', 'On'); 
$userID=$this->session->userdata("userID");
$this->session->set_userdata("userID" ,$userID );

?>
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
	<style>
	span.msg,
span.choose {  color: #555;   padding: 5px 0 10px;  display: inherit }
.dropdown   {  width: 300px;  display: inline-block;  background-color: #fff;  border-radius: 13px; border:1px solid;  box-shadow: 0 0 2px rgb(204, 204, 204); transition: all .5s ease;  position: relative;  font-size: 14px;  color: #474747;  margin-left:-140px;  text-align: left  }
.dropdown .select {    cursor: pointer;    display: block;    padding: 2px ; padding-left:10px;padding-right:10px; }
.dropdown .select > i {    font-size: 13px;    color: #888;    cursor: pointer;    transition: all .3s ease-in-out;    float: right;    line-height: 20px}
.dropdown:hover {    box-shadow: 0 0 4px rgb(204, 204, 204)}
.dropdown:active {    background-color: #f8f8f8 }
.dropdown.active:hover,
.dropdown.active {    box-shadow: 0 0 4px rgb(204, 204, 204);    border-radius: 2px 2px 0 0;    background-color: #f8f8f8}
.dropdown.active .select > i {    transform: rotate(-90deg)}
.dropdown .dropdown-menu {    position: absolute;    background-color: #fff;    width: 100%;    left: 0;    margin-top: 1px;    box-shadow: 0 1px 2px rgb(204, 204, 204);    border-radius: 0 1px 2px 2px;    overflow: hidden;    display: none;    max-height: 144px;    overflow-y: auto;  z-index: 9}
.dropdown .dropdown-menu li {    padding: 5px;    transition: all .2s ease-in-out;    cursor: pointer} 
.dropdown .dropdown-menu {    padding: 0;    list-style: none}
.dropdown .dropdown-menu li:hover {    background-color: #f2f2f2}
.dropdown .dropdown-menu li:active {    background-color: #e2e2e2}
.msg{	margin-top:-49px;	margin-left:100px;}
.download{	margin-top:-38px;	margin-left:130px;}


.stepper-wrapper {
  margin-top: auto;
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}
.stepper-item {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1;

  @media (max-width: 768px) {
    font-size: 12px;
  }
}

.stepper-item::before {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: -81%;
  z-index: 2;
}

.stepper-item::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 2;
}

.stepper-item .step-counter {
  position: relative;
  z-index: 5;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: white;
  margin-bottom: 6px;
}

.stepper-item.active {
  font-weight: bold;
}

.stepper-item.completed .step-counter {
  background-color: #25a6c6;
}

.stepper-item.completed::after {
  position: absolute;
  content: "";
  
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 3;
}

.stepper-item:first-child::before {
  content: none;
}
.stepper-item:last-child::after {
  content: none;
}

@media only screen and (max-width:768px){
.source{

	padding-left: 117px
}
}
@media only screen and (max-width:768px){
.dis{
	padding-left: 88px;
    margin-top: -18px;
}
}
</style>
<br>
<div class="stepper-wrapper">

  <div class="stepper-item active">
    <a href="<?php echo base_url()?>index.php/Operations_user/CAM_Applicant_Details?ID=<?php echo $row->UNIQUE_CODE;?>"><div class="step-counter"><i style="font-size:18px;color: #25a6c6; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></div>
    <div class="step-name">Applicant Details</div></a>
  </div>

 	<div class="stepper-item completed">
    
  <div class="step-counter"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></div>
    	<div class="step-name">Document Verification</div> 
  	</div>
 


  	<div class="stepper-item active">
    	 	<a href="<?php echo base_url()?>index.php/Operations_user/Credit_Analysis"><div class="step-counter"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></div>  </a>
  
    	<div class="step-name">Credit & Analysis</div>
  	</div>


  <div class="stepper-item active">
    <a href="<?php echo base_url()?>index.php/Operations_user/Other_attributes"><div class="step-counter"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></div> 
    <div class="step-name">Other Attributes</div></a>
  </div>
  <?php if($appliedloan->LOAN_TYPE=='home'|| $appliedloan->LOAN_TYPE=='lap')
			             {	?>
   <div class="stepper-item active">
    <a href="<?php echo base_url()?>index.php/Operations_user/collateral"><div class="step-counter"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></div> 
    <div class="step-name">Collateral and Recommendations</div></a>
  </div>
  <?php } ?>
</div>


	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				<?php if($id == $this->session->userdata("Cust_id")) {?>
							<?php 
								if(isset($row_more))
								{ 
			              if($row_more->CPA_ID == $userID )
			              {
			                ?>
					<div class="row" style="margin-left: 10px;">
						Edit

						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div>
								<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/Operations_user/Edit_Document_verification"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
							</div>	
						</div>				
					</div>

					     <?php
              }
              else if($row_more->CPA_ID == '' )
              {
              	?>

<div class="row" style="margin-left: 10px;">
						Edit

						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div style="padding-bottom: 10px;">
								<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/Operations_user/Edit_Document_verification"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
							</div>	
						</div>				
					</div>


              		<?php
              }
              else
              {
               ?>
                <h5>CAM Processed BY <?php echo $cam_processed_userData->FN." ".$cam_processed_userData->LN; ?></h5>
               <?php
              }
					}
					else
					{
             ?>

<div class="row" style="margin-left: 10px;">
						Edit

						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div style="padding-bottom: 10px;">
								<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/Operations_user/Edit_Document_verification"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
							</div>	
						</div>				
					</div>

                <?php
					}
					?>
				<?php } ?>		
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"></div>
            
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
			<div class="source" style="padding-bottom:15px;">
				<!------------------------------ added by priyanka ----------------------------------------------- -->
			   <span class="dropdown" style="margin-left:-70%;margin-top:-10%;margin-bottom:5%;padding-left:10px; height:56px;">Source [<?php if(isset($Sourcing_Type)){echo $Sourcing_Type;}?>]:&nbsp;<?php if(isset($Sourcing_name)){echo $Sourcing_name;}?></span>
				
				<div class="dropdown">
       				<div class="select">
          				<span>Select Document</span>
          				<i class="fa fa-chevron-down"></i>
       				</div>
       				<input type="hidden" name="gender">
        				<ul class="dropdown-menu">
						<?php $i=1; foreach($documents as $doc)	{  ?>
							<li id="<?php echo $doc->ID;?>"><?php echo $doc->DOC_TYPE;?></li>
	   					<?php $i++;} ?> 
						   <?php $i=1; foreach ($new_doc_array as $documents1) { ?>
							    <?php $j=1; foreach ($documents1 as $coapp_doc) { ?>
							     <li id="<?php echo $coapp_doc->ID;?>"><?php echo $coapp_doc->DOC_TYPE."(Co-applicant)";?></li>
								 <?php $j++;} ?> 
	   					<?php $i++;} ?> 
        			</ul>
     			</div>
								</div>
                <label class="msg"></label>
                <label class="download"></label>
			
				<!-------------------------------------------------------------------------------------------------->
			</div>
		</div>
		
		<br><br>
		<!------------------------------------------------------------------------------------------------------------------ -->
	
		<div class="row shadow bg-white rounded margin-10 padding-15" style="margin-top:1%;" id="ApplicantDiv">
			    <div class="row col-12">
         <a href="#ApplicantDiv" style="padding-bottom:10px;">
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
							<div class="row income-type-box-unselected justify-content-center padding-5" style="box-shadow: rgb(0 0 0 / 15%) 0px 4px 8px 0px, rgb(0 0 0 / 14%) 0px 6px 20px 0px; height:70px; width:200px;">
								   <i class='fas fa-user-check' style='font-size:35px;color:skyblue; margin-left: -33px;'></i>
								<span class="font-6" style="margin-top: 0px; color: black; font-weight: bold; opacity: 0.8; text-align: center;  padding-left: 14px;">Applicant</span>
									<span class="font-9" style="text-align: center; margin-top: -12px; color: black; font-weight: bold; opacity: 0.8; padding-left: 40px;"><?php if(!empty($row)) echo $row->FN." ".$row->LN ?></span>
								<div class="w-100"></div>
														</div>				
						</div>	
					</a>
								<?php $i=1;
					foreach ($coapplicants as $coapplicant) 
						{ 
							if(isset($coapplicant)) 
								{
					?>
					<a href="#<?php echo $coapplicant->FN;?>"  style="padding-bottom:10px;">	
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
							<div class="row  income-type-box-unselected justify-content-center " style="box-shadow: rgb(0 0 0 / 15%) 0px 4px 8px 0px, rgb(0 0 0 / 14%) 0px 6px 20px 0px; height:70px; width:200px;">
									<?php if($coapplicant->GENDER == 'male') { ?>
								  <i class='fas fa-male' style='font-size:40px;color:skyblue; margin-left: -33px;'></i>
								 <?php } else
								 {
								 ?>
								   <i class='fas fa-female' style='font-size:40px;color:skyblue;margin-left: -33px;'></i>
								 <?php
								 }?>
								<span class="font-6" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8; padding-left: 25px;">Co-Applicant <?php echo $i;?></span>
								<span class="font-9" style="text-align: center; margin-top: -12px; color: black; font-weight: bold; opacity: 0.8; padding-left: 30px;"><?php if(!empty($coapplicant)) echo $coapplicant->FN." ".$coapplicant->LN ?></span>
								<div class="w-100"></div>
								
							</div>
			  			</div>	
			  		</a>
			  	<?php 			} 
			  		$i++;	}
			  	 ?>
		  			
      </div>
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Document details of <?php if(!empty( $row))echo " - ".$row->FN." ".$row->LN." (Applicant)";?></span>

			</div>
			
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">PAN NO</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input disabled  type="radio" name="pan_verify" value="true" <?php if(!empty($row_more))if ($row_more->VERIFY_PAN == 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="dis">
	  							<input disabled type="radio" name="pan_verify" value="false" <?php if(!empty($row_more))if ($row_more->VERIFY_PAN == 'false'|| $row_more->VERIFY_PAN == 'NULL' || $row_more->VERIFY_PAN == '') echo ' checked="true"'; ?>> No
	  						</div>
								</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php if(!empty($row_more)){ if($row_more->Passport_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="passport_no"   value="<?php if(!empty($row_more)){ echo $row_more->Passport_Number;}?>">
						</div> 	
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number Verification</span>
				</div>			
				<div class="w-100"></div>
				
				 	
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="passport_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Passport_no == 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input  type="radio" name="passport_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Passport_no == 'false'|| $row_more->verify_Passport_no == 'NULL' || $row_more->verify_Passport_no == '') echo ' checked="true"'; ?>> No
				</div>
							</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php }} ?>
				<?php if(!empty($row_more)){ if($row_more->Vechical_NO_available=='yes'){?>
				       <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="Vehicle_no"   value="<?php if(!empty($row_more)){ echo $row_more->Vechical_Number;}?>">
						</div> 	
					<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number Verification</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<div class="input-cust-name" style=" margin-top: 8px;" >
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input   type="radio" name="Vechical_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Vechical== 'true') echo ' checked="true"'; ?>> Yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="dis">
									<input  type="radio" name="Vechical_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Vechical== 'false'|| $row_more->verify_Vechical== 'NULL' || $row_more->verify_Vechical== '') echo ' checked="true"'; ?>> No
								</div>
				</div>
							</div>						
						</div>  	
					</div> 
				<?php }} ?>

			  
				<?php if(!empty($data_incomedetails))if($data_incomedetails->CUST_TYPE=='self employeed')
				{?>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">IT returns</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="IT_Returns_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_It_Returns== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="dis">
	  							<input  type="radio" name="IT_Returns_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_It_Returns== 'false'|| $row_more->verify_It_Returns== 'NULL' || $row_more->verify_It_Returns== '') echo ' checked="true"'; ?>> No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Professional certificate</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="Certificate_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Professional_Certificate== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input  type="radio" name="Certificate_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Professional_Certificate== 'false'|| $row_more->verify_Professional_Certificate== 'NULL' || $row_more->verify_Professional_Certificate== '') echo ' checked="true"'; ?>> No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php } ?>
				 <?php if(!empty($data_incomedetails))if($data_incomedetails->CUST_TYPE=='salaried')
						{
							if(!empty($row_more)){ if($row_more->Official_mail_available=='yes'){?>
							<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official mail</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input disabled  placeholder="" class="input-cust-name" type="text" name="Official_mail" id="Official_mail"   value="<?php if(!empty($row_more)){if($row_more->Official_mail_available=='yes'){echo $row_more->Official_mail; }}?>" >
							</div> 
							<div style="margin-top: 0px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official mail verification</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<div class="input-cust-name" style=" margin-top: 8px;" >
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input   type="radio" name="Official_Mail_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Official_Mail== 'true') echo ' checked="true"'; ?>> Yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<div class="dis">
											<input  type="radio" name="Official_Mail_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Official_Mail== 'false'|| $row_more->verify_Official_Mail== 'NULL' || $row_more->verify_Official_Mail== '') echo ' checked="true"'; ?>> No
										</div>
							</div>
									</div>						
								</div>  	
							</div> 
					<?php } } } ?>
				
  			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				

  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Aadhar No</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					
					<div class="input-cust-name" style=" margin-top: 8px;" >	
						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input disabled   type="radio" name="aadhar_verify" value="true" <?php if(!empty($row_more))if ($row_more->STATUS =='Aadhar E-sign complete') echo 'checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input disabled type="radio" name="aadhar_verify" value="false"<?php if(!empty($row_more))if ($row_more->STATUS =='' || $row_more->STATUS =='NULL' || $row_more->STATUS =='Personal details complete' || $row_more->STATUS =='Income details complete'||$row_more->STATUS =='Document upload complete'|| $row_more->STATUS =='Credit bureau Score received'|| $row_more->STATUS =='Loan application complete' ) echo 'checked="true"'; ?> > No
	  						</div>
							</div>
  						</div>	
					</div>
  				</div> 
				
				<?php if(!empty($row_more)){ if($row_more->Driving_l_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="Driving_l_Number"   value="<?php if(!empty($row_more)){ echo $row_more->Driving_l_Number;}?>">
						</div> 	
						<div style="margin-top: 0px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number Verification</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;" >
								<div class="row">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input   type="radio" name="Driving_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Driving_l_Number== 'true') echo ' checked="true"'; ?>> Yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="dis">
										<input  type="radio" name="Driving_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Driving_l_Number== 'false'|| $row_more->verify_Driving_l_Number== 'NULL' || $row_more->verify_Driving_l_Number== '') echo ' checked="true"'; ?>> No
									</div>
				</div>
								</div>						
							</div>  	
						</div> 
				 	<?php }} ?>
					 <?php if(!empty($data_incomedetails))if($data_incomedetails->CUST_TYPE=='salaried')
						{
						if(!empty($row_more)){ if($row_more->EPFO_Number_available=='yes'){?>
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input disabled  placeholder="" class="input-cust-name" type="text" name="vechical_no" id="vechical_no"   value="<?php if(!empty($row_more)){if($row_more->EPFO_Number_available=='yes'){echo $row_more->EPFO_Number; }}?>" <?php if($row_more->Vechical_NO_available=='no' || $row_more->Vechical_NO_available=='NULL' || $row_more->Vechical_NO_available=='') {echo 'readonly';} ?>>
								</div> 
								<div style="margin-top: 0px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number Verification</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;" >
										<div class="row">
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input   type="radio" name="EPFO_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_EPFO_Number== 'true') echo ' checked="true"'; ?>> Yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="dis">
												<input  type="radio" name="EPFO_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_EPFO_Number== 'false'|| $row_more->verify_EPFO_Number== 'NULL' || $row_more->verify_EPFO_Number== '') echo ' checked="true"'; ?>> No
											</div>
						</div>
										</div>						
									</div>  	
								</div> 
						<?php } } }?>
				
				<?php if(!empty($data_incomedetails))if($data_incomedetails->CUST_TYPE=='self employeed')
				{?>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Udyog Aadhar</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="Udyog_Aadhar_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Udyog_Aadhar== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input  type="radio" name="Udyog_Aadhar_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Udyog_Aadhar== 'false'|| $row_more->verify_Udyog_Aadhar== 'NULL' || $row_more->verify_Udyog_Aadhar== '') echo ' checked="true"'; ?>> No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Residence Verification</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="Residence_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Residence== 'true') echo ' checked="true"'; ?>> Positive
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input  type="radio" name="Residence_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Residence== 'false'|| $row_more->verify_Residence== 'NULL' || $row_more->verify_Residence== '') echo ' checked="true"'; ?>> Negative
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Comments If Any About Residence Verification</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input style="margin-top: 8px;" class="input-cust-name" type="text"   name="Residence_Comment"   value="<?php if(!empty($row_more)){echo $row_more->Recidance_Comment;}?>">	
  				</div> 
				<?php } ?>
				
  				
  			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address Match with Aadhar ?</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input disabled  type="radio" name="add_verify" value="true" <?php if(!empty($address_flag))if ($address_flag== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input disabled  type="radio" name="add_verify" value="false" <?php if(!empty($address_flag))if ($address_flag== 'false') echo ' checked="true"'; ?>> No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Is Email Id Verified ?</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input disabled  type="radio" name="Email_verify" value="true" <?php if(!empty($email_flag))if ($email_flag== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input disabled  type="radio" name="Email_verify" value="false" <?php if(!empty($email_flag))if ($email_flag== 'false') echo ' checked="true"'; ?>> No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Is Mobile Number Verified ?</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="mobile_verify" value="true" checked="true" > Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input disabled type="radio" name="mobile_verify" value="false" > No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				 <?php if(!empty($data_incomedetails))if($data_incomedetails->CUST_TYPE=='salaried')
						{
							if(!empty($row_more)){ if($row_more->Account_Number_available=='yes'){?>
							<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input disabled  placeholder="" class="input-cust-name" type="text" name="vechical_no" id="vechical_no"   value="<?php if(!empty($row_more)){if($row_more->Account_Number_available=='yes'){echo $row_more->Account_Number; }}?>" >
							</div> 
							<div style="margin-top: 0px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<div class="input-cust-name" style=" margin-top: 8px;" >
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input   type="radio" name="Account_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Account_Number== 'true') echo ' checked="true"'; ?>> Yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<div class="dis">
											<input  type="radio" name="Account_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Account_Number== 'false'|| $row_more->verify_Account_Number== 'NULL' || $row_more->verify_Account_Number== '') echo ' checked="true"'; ?>> No
										</div>
							</div>
									</div>						
								</div>  	
							</div> 
					<?php } } } ?>
				
				<?php if(!empty($data_incomedetails))if($data_incomedetails->CUST_TYPE=='self employeed')
				{?>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Shop Act</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="Shop_Act_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Shop_Act== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input  type="radio" name="Shop_Act_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Shop_Act== 'false'|| $row_more->verify_Shop_Act== 'NULL' || $row_more->verify_Shop_Act== '') echo ' checked="true"'; ?>> No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Employement/ Business Verification </span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="Employement_verify" value="true" <?php if(!empty($row_more))if ($row_more->verify_Employment== 'true') echo ' checked="true"'; ?>>Positive
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input  type="radio" name="Employement_verify" value="false" <?php if(!empty($row_more))if ($row_more->verify_Employment== 'false'|| $row_more->verify_Employment== 'NULL' || $row_more->verify_Employment== '') echo ' checked="true"'; ?>> Negative
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Comments If Any About Employement Verification</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input style="margin-top: 8px;" class="input-cust-name" type="text"   name="Employment_Comment"   value="<?php if(!empty($row_more)){echo $row_more->Employment_Comment;}?>">	
  				</div> 
				<?php } ?>
  			</div>	
		</div>
		
		<!----------------------------------Co-applicant details ------------------------------- -->
<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>		
		<div class="row shadow bg-white rounded margin-10 padding-15" id="<?php echo $coapplicant->FN; ?>">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;"> Documents details of <?php echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant)";?> </span>

			</div>
			
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			<input type="text" name="COAPP_ID_<?php echo $i;?>" hidden  value="<?php if(!empty($coapplicant))echo $coapplicant->COAPP_ID;?>">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">PAN NO</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input disabled  type="radio" name="pan_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->VERIFY_PAN == 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input disabled type="radio" name="pan_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->VERIFY_PAN == 'false'|| $coapplicant->VERIFY_PAN == 'NULL' || $coapplicant->VERIFY_PAN == '') echo ' checked="true"'; ?>> No
	  						</div>
</div>
  						</div>						
  					</div>  	
  				</div> 
				
				<?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='self employeed')
				{?>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">IT returns</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="IT_Returns_verify_<?php echo $i;?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_It_Returns== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input  type="radio" name="IT_Returns_verify_<?php echo $i;?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_It_Returns== 'false'|| $coapplicant->verify_It_Returns== 'NULL' || $coapplicant->verify_It_Returns== '') echo ' checked="true"'; ?>> No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">GST Number</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input  disabled type="radio" name="GST_verify_<?php echo $i;?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_GST_status== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input disabled type="radio" name="GST_verify_<?php echo $i;?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_GST_status== 'false'|| $coapplicant->verify_GST_status== 'NULL' || $coapplicant->verify_GST_status== '') echo ' checked="true"'; ?>> No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Professional certificate</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="Certificate_verify_<?php echo $i;?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Professional_Certificate== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input  type="radio" name="Certificate_verify_<?php echo $i;?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Professional_Certificate== 'false'|| $coapplicant->verify_Professional_Certificate== 'NULL' || $coapplicant->verify_Professional_Certificate== '') echo ' checked="true"'; ?>> No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php } ?>
				<?php if(!empty($coapplicant)){ if($coapplicant->Passport_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="passport_no<?php echo $i;?>"   value="<?php if(!empty($coapplicant)){ echo $coapplicant->Passport_Number;}?>">
						</div> 	
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number Verification</span>
				</div>			
				<div class="w-100"></div>
				
				 	
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="passport_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Passport_no == 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input  type="radio" name="passport_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Passport_no == 'false'|| $coapplicant->verify_Passport_no == 'NULL' || $coapplicant->verify_Passport_no == '') echo ' checked="true"'; ?>> No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				<?php }} ?>
				<?php if(!empty($coapplicant)){ if($coapplicant->Vechical_NO_available=='yes'){?>
				       <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="passport_no"   value="<?php if(!empty($coapplicant)){ echo $coapplicant->Vechical_Number;}?>">
						</div> 	
					<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number Verification</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<div class="input-cust-name" style=" margin-top: 8px;" >
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input   type="radio" name="Vechical_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Vechical== 'true') echo ' checked="true"'; ?>> Yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="dis">
									<input  type="radio" name="Vechical_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Vechical== 'false'|| $coapplicant->verify_Vechical== 'NULL' || $coapplicant->verify_Vechical== '') echo ' checked="true"'; ?>> No
								</div>
				</div>
							</div>						
						</div>  	
					</div> 
				<?php }} ?>
				 <?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried')
						{
							if(!empty($coapplicant)){ if($coapplicant->Official_mail_available=='yes'){?>
							<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official mail</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input disabled  placeholder="" class="input-cust-name" type="text" name="Official_mail" id="Official_mail"   value="<?php if(!empty($coapplicant)){if($coapplicant->Official_mail_available=='yes'){echo $coapplicant->Official_mail; }}?>" >
							</div> 
							<div style="margin-top: 0px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official mail verification</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<div class="input-cust-name" style=" margin-top: 8px;" >
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input   type="radio" name="Official_Mail_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Official_Mail== 'true') echo ' checked="true"'; ?>> Yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<div class="dis">
											<input  type="radio" name="Official_Mail_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Official_Mail== 'false'|| $coapplicant->verify_Official_Mail== 'NULL' || $coapplicant->verify_Official_Mail== '') echo ' checked="true"'; ?>> No
										</div>
							</div>
									</div>						
								</div>  	
							</div> 
					<?php } } } ?>
  			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				

  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Aadhar No</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  										<div class="input-cust-name" style=" margin-top: 8px;" >	
						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="aadhar_verify_<?php echo $i;?>" value="true" > Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input  type="radio" name="aadhar_verify_<?php echo $i;?>" value="false" checked="true" > No
	  						</div>
							</div>
  						</div>	
					</div>
  				</div> 
				
				<?php if(!empty($coapplicant)){ if($coapplicant->Driving_l_available=='yes'){?>
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled placeholder="" class="input-cust-name" type="text" name="Driving_l_Number"   value="<?php if(!empty($coapplicant)){ echo $coapplicant->Driving_l_Number;}?>">
						</div> 	
						<div style="margin-top: 0px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number Verification</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;" >
								<div class="row">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input   type="radio" name="Driving_verify_<?php echo $i;?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Driving_l_Number== 'true') echo ' checked="true"'; ?>> Yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="dis">
										<input  type="radio" name="Driving_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Driving_l_Number== 'false'|| $coapplicant->verify_Driving_l_Number== 'NULL' || $coapplicant->verify_Driving_l_Number== '') echo ' checked="true"'; ?>> No
									</div>
				</div>
								</div>						
							</div>  	
						</div> 
				 	<?php }} ?>
					 <?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried')
						{
						if(!empty($coapplicant)){ if($coapplicant->EPFO_Number_available=='yes'){?>
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input disabled  placeholder="" class="input-cust-name" type="text" name="vechical_no" id="vechical_no"   value="<?php if(!empty($coapplicant)){if($coapplicant->EPFO_Number_available=='yes'){echo $coapplicant->EPFO_Number; }}?>" <?php if($coapplicant->Vechical_NO_available=='no' || $coapplicant->Vechical_NO_available=='NULL' || $coapplicant->Vechical_NO_available=='') {echo 'readonly';} ?>>
								</div> 
								<div style="margin-top: 0px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number Verification</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;" >
										<div class="row">
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input   type="radio" name="EPFO_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_EPFO_Number== 'true') echo ' checked="true"'; ?>> Yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="dis">
												<input  type="radio" name="EPFO_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_EPFO_Number== 'false'|| $coapplicant->verify_EPFO_Number== 'NULL' || $coapplicant->verify_EPFO_Number== '') echo ' checked="true"'; ?>> No
											</div>
						</div>
										</div>						
									</div>  	
								</div> 
						<?php } } }?>
				
				<?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='self employeed')
				{?>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Udyog Aadhar</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="Udyog_Aadhar_verify_<?php echo $i;?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Udyog_Aadhar== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input  type="radio" name="Udyog_Aadhar_verify_<?php echo $i;?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Udyog_Aadhar== 'false'|| $coapplicant->verify_EPFO_Number== 'NULL' || $coapplicant->verify_EPFO_Number== '') echo ' checked="true"'; ?>> No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Residence Verification</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="Residence_verify_<?php echo $i;?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Residence== 'true') echo ' checked="true"'; ?>> Positive
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input  type="radio" name="Residence_verify_<?php echo $i;?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Residence== 'false'|| $coapplicant->verify_Residence== 'NULL' || $coapplicant->verify_Residence== '') echo ' checked="true"'; ?>> Negative
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Comments If Any About Residence Verification</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input style="margin-top: 8px;" class="input-cust-name" type="text"   name="Residence_Comment_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){echo $coapplicant->Recidance_Comment;}?>">	
  				</div> 
				<?php } ?>
  			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address Match with Aadhar ?</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="add_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapp_add_flag))if ($coapp_add_flag[$i]== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input  type="radio" name="add_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapp_add_flag))if ($coapp_add_flag[$i]== 'false') echo ' checked="true"'; ?>> No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Is Mobile Number Verified ?</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="mobile_verify_<?php echo $i;?>" value="true"  > Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input  type="radio" name="mobile_verify_<?php echo $i;?>" value="false" checked="true" > No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Is Email Id Verified ?</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input disabled  type="radio" name="Email_verify_<?php echo $i; ?>" value="true" <?php if(isset($coapp_email_flag))if ($coapp_email_flag[$i]== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input disabled type="radio" name="Email_verify_<?php echo $i; ?>" value="false" <?php if(isset($coapp_email_flag))if ($coapp_email_flag[$i]== 'false') echo ' checked="true"'; ?>> No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				 <?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried')
						{
							if(!empty($coapplicant)){ if($coapplicant->Account_Number_available=='yes'){?>
							<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input disabled  placeholder="" class="input-cust-name" type="text" name="vechical_no" id="vechical_no"   value="<?php if(!empty($coapplicant)){if($coapplicant->Account_Number_available=='yes'){echo $coapplicant->Account_Number; }}?>" >
							</div> 
							<div style="margin-top: 0px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<div class="input-cust-name" style=" margin-top: 8px;" >
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input   type="radio" name="Account_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Account_Number== 'true') echo ' checked="true"'; ?>> Yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<div class="dis">
											<input  type="radio" name="Account_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Account_Number== 'false'|| $coapplicant->verify_Account_Number== 'NULL' || $coapplicant->verify_Account_Number== '') echo ' checked="true"'; ?>> No
										</div>
							</div>
									</div>						
								</div>  	
							</div> 
					<?php } } } ?>
				
				<?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='self employeed')
				{?>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Shop Act</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="Shop_Act_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Shop_Act== 'true') echo ' checked="true"'; ?>> Yes
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input  type="radio" name="Shop_Act_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Shop_Act== 'false'|| $coapplicant->verify_Shop_Act== 'NULL' || $coapplicant->verify_Shop_Act== '') echo ' checked="true"'; ?>> No
	  						</div>
				</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Employement/ Business Verification </span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;" >
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input   type="radio" name="Employement_verify_<?php echo $i; ?>" value="true" <?php if(!empty($coapplicant))if ($coapplicant->verify_Employment== 'true') echo ' checked="true"'; ?>>Positive
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input  type="radio" name="Employement_verify_<?php echo $i; ?>" value="false" <?php if(!empty($coapplicant))if ($coapplicant->verify_Employment== 'false'|| $coapplicant->verify_Employment== 'NULL' || $coapplicant->verify_Employment== '') echo ' checked="true"'; ?>> Negative
	  						</div>
  						</div>						
  					</div>  	
  				</div> 
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Comments If Any About Employement Verification</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input style="margin-top: 8px;" class="input-cust-name" type="text"   name="Employment_Comment_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){echo $coapplicant->Employment_Comment;}?>">	
  				</div> 
				<?php } ?>
  			</div>	
		</div>
		<?php $i++;}?>		


        	
	</div>

	<div class="row shadow bg-white rounded margin-10 padding-15" >
				<div class="row col-12 justify-content-center">
					<div>
						<a href="<?php echo base_url()?>index.php/Operations_user/Credit_Analysis">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							NEXT
						</button></a>
					</div>		
				</div>					
			</div>
			<!-------------------------added by priyanka------------------------------------------------------>
<script>
	/*Dropdown Menu*/
$('.dropdown').click(function () {
        $(this).attr('tabindex', 1).focus();
        $(this).toggleClass('active');
        $(this).find('.dropdown-menu').slideToggle(300);
    });
    $('.dropdown').focusout(function () {
        $(this).removeClass('active');
        $(this).find('.dropdown-menu').slideUp(300);
    });
    $('.dropdown .dropdown-menu li').click(function () {
        $(this).parents('.dropdown').find('span').text($(this).text());
        $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
    });
/*End Dropdown Menu*/

/*----------------------added by sonal on 23-05-2022----------------------------------*/

$('.dropdown-menu li').click(function () {
  var input = $(this).parents('.dropdown').find('input').val();

  //document.getElementById("hidden1").value = input ;

  $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/Operations_user/get_document_details"); ?>',
									    data:{
										'ID':input
										},
										success:function(data)
										{
											var view="view";
											var obj =JSON.parse(data);
											
											msg = '<label class="msg">';
											var download="download";
                                            $('.msg').html(  msg + '<a href="'+ obj.view +'" target="_blank" >'+ view +'</a></label>'); 
											msg2 = '<label class="download">';
                                            $('.download').html(  msg2 + '<a href="'+ obj.download +'" target="_blank" download>'+ download +'</a></label>'); 
											
						                }
                                    });

 
/*------------------------------------------------------------------------------------------------------------------*/



  
}); 
</script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
		<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
							
							<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
							<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>