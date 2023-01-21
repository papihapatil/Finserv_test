
<?php ini_set('short_open_tag', 'On'); 
$userID=$this->session->userdata("userID");
$this->session->set_userdata("userID" ,$userID );

?>
<?php

    $message = $this->session->flashdata('error');
    if (isset($message)) {
        echo '<script> swal("warning!", "Something get wrong", "warning");</script>';
         $this->session->unset_userdata('error');	
    }

    ?>
<?php
    $message = $this->session->flashdata('success');
    if (isset($message)) {
        echo '<script> swal("success!", "Profile updated successfully", "success");</script>';
         $this->session->unset_userdata('success');	
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

  <div class="stepper-item completed">
    <div class="step-counter"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></div>
    <div class="step-name">Applicant Details</div>
  </div>

 	<div class="stepper-item active">
    	 <a href="<?php echo base_url()?>index.php/Operations_user/Document_verification">
  <div class="step-counter"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></div>
    	<div class="step-name">Document Verification</div> </a>
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
			
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"></div>


			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
			<div class="source">
				  <span class="dropdown" style="margin-left:-70%;margin-top:-10%;margin-bottom:3%;padding-left:10px;">Source [<?php if(isset($Sourcing_Type)){echo $Sourcing_Type;}?>]:&nbsp;<?php if(isset($Sourcing_name)){echo $Sourcing_name;}?></span>
				
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
							     <li id="<?php echo $coapp_doc->DOC_NAME;?>"><?php echo $coapp_doc->DOC_TYPE."(Co-applicant)";?></li>
								 <?php $j++;} ?> 
	   					<?php $i++;} ?> 
        			</ul>
     			</div>
								</div>
				

				 <!------------------------------------------------------------------------------------>

  <label class="msg"></label>
  <label class="download"></label>
           </div>
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			
		</div>
		<br><br>

		
	<form method="POST" action="<?php echo base_url(); ?>index.php/Operations_user/customer_flow_update_s_one" id="">
	<input hidden class="input-cust-name" type="text"  id="CAM_CREATED_BY" name="CAM_CREATED_BY" value="<?php echo $userID;?>">	
	<!-- --------------- Login fees verification ------------------------------------------------------ -->

	<div class="row shadow bg-white rounded margin-10 padding-15" >
		    <div class="row  col-12">
         <a href="#ApplicantDiv" style="padding-bottom:10px;" >
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
							<div class="row income-type-box-unselected justify-content-center padding-5" style="box-shadow: rgb(0 0 0 / 15%) 0px 4px 8px 0px, rgb(0 0 0 / 14%) 0px 6px 20px 0px;height:70px; width:200px;">
								
							    <i class='fas fa-user-check' style='font-size:35px;color:skyblue; margin-left: -33px;'></i>
								<span class="font-6" style="margin-top: 0px; color: black; font-weight: bold; opacity: 0.8; text-align: center; padding-left: 14px;">Applicant</span>
									<span class="font-9" style="text-align: center; margin-top: -12px; color: black; font-weight: bold; opacity: 0.8;padding-left: 40px;"><?php if(!empty($row)) echo $row->FN." ".$row->LN ?></span>
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
					<a href="#<?php echo $coapplicant->FN;?>" style="padding-bottom:10px;">	
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
							<div class="row  income-type-box-unselected justify-content-center " style="box-shadow: rgb(0 0 0 / 15%) 0px 4px 8px 0px, rgb(0 0 0 / 14%) 0px 6px 20px 0px; height:70px; width:200px;">
								
								<?php if($coapplicant->GENDER == 'male') { ?>
								  <i class='fas fa-male' style='font-size:40px;color:skyblue;'></i>
								 <?php } else
								 {
								 ?>
								   <i class='fas fa-female' style='font-size:40px;color:skyblue; margin-left: -33px;'></i>
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
	<?php if($login_fees_required=='yes')
	{
		?>
	
		<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">
				Login Fess Verification </span>
			
			</div>

			 <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Login Fees Received *</span>
						</div>
						
						<div class="w-100"></div>
						<div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
								<div class="row">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input type="radio" name="login_fees" value="yes" id="RBtest1" <?php if(isset($login_fees_status)){if($login_fees_status=='yes'){ echo 'checked="true"';}}?> > yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<div class="dis">
										<input  type="radio" name="login_fees" value="no" id="RBtest2" <?php if(isset($login_fees_status)){if($login_fees_status=='no'){ echo 'checked="true"';}} ?>> No
									</div>
	</div>
								</div>						
							</div>  					
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Payment received Date *</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								
								<input   type="date"  class="input-cust-name" name="dor" id="dor" value="<?php if(isset($Payment_Recived_date)){ echo $Payment_Recived_date; } ?>" required>
						</div>
					</div>	
				</div>
				<?php }
		?>
			</div>
		
<!------------Personal Details----------------------->
   <div id="display"  <?php if($login_fees_required=='yes'){ ?>style="display:none" <?php } ?>>
	    <div class="row shadow bg-white rounded margin-10 padding-15" id="ApplicantDiv">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">
				<?php if(!empty($row)){ echo " - ".$row->FN." ".$row->LN." (Applicant) ";}?></span>
			</div>
            <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				    <div style=" margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Full name as per PAN card *</span>
					</div>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text"  id="f_name" name="f_name" minlength="5" maxlength="30" required value="<?php if(!empty($row)){ echo $row->FN;}?>">
	  					<input  style="margin-top: 8px;" placeholder="Middel Name (Optional)" class="input-cust-name" type="text" name="m_name"  value="<?php if(!empty($row)){ echo $row->MN;}?>">
	  					<input  style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="l_name" minlength="5" maxlength="30" required  value="<?php if(!empty($row)){ echo $row->LN;}?>">
	  				</div>
			    </div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-venus-mars"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Gender *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;" class="col">
						<div class="input-cust-name" style=" margin-top: 8px;">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input  checked="true" type="radio" name="gender" value="male"> Male
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="dis">
									<input  type="radio" name="gender" value="female" <?php if(!empty($row)){  if ($row->GENDER == 'female') echo ' checked="true"'; }?>> Female
								</div>
	</div>
							</div>						
						</div>  					
					</div>
			    </div>
			    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				    <div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Birth *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					
						<input  class="input-cust-name" type="date" name="dob" id="dob" value="<?php if(!empty($row)){echo ($row->DOB);}?>" >
	  			    </div>
			    </div>	
			    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				    <div style=" margin-top: 8px;" class="col">
					   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official Email-Id *</span>
				    </div>			
				    <div class="w-100"></div>
  				    <div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					   <input  placeholder="Enter emial-Id *" class="input-cust-name" type="email" name="email" value="<?php if(!empty($row)){ echo $row->EMAIL;}?>">
  				    </div> 
                </div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						 <input  placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
							title="Phone number with 7-9 and remaing 9 digit with 0-9" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row->MOBILE;?>">
					</div> 
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
					<div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-users"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of Dependants </span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input required placeholder="No Of Dependants *" class="input-cust-name" type="text" name="NO_OF_DEPENDANTS" value="<?php if(!empty($row_more))echo $row_more->NO_OF_DEPENDANTS;?>"  maxlength="2">
					</div>
				</div>	
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-heart-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Martial Status *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;" class="col">
						<div class="input-cust-name" style=" margin-top: 8px;">
								<div class="row">
  							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
  								<input <?php if ($row->MARTIAL_STATUS == 'married') echo ' checked="true"'; ?> type="radio" name="marital" value="married" checked="true"> Married
	  						</div>
	  						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
	  							<input <?php if ($row->MARTIAL_STATUS == 'single') echo ' checked="true"'; ?> type="radio" name="marital" value="single"> Single
	  						</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
	  							<input <?php if ($row->MARTIAL_STATUS == 'Divorcee') echo ' checked="true"'; ?> type="radio" name="marital" value="Divorcee"> Divorcee
	  						</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
	  							<input <?php if ($row->MARTIAL_STATUS == 'Widow') echo ' checked="true"'; ?> type="radio" name="marital" value="Widow"> Widow
	  						</div>
  						</div>	
							</div>	
						</div>  
						
					</div>	
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Highest Education  *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<select  class="input-cust-name" name="education_type" > 
						<option value="">Select Education *</option>
						<option value="ENGINEER" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'ENGINEER') echo ' selected="selected"';} ?>>ENGINEER</option>
						<option value="Graduate" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'Graduate'|| $row->EDUCATION_BACKGROUND == 'GRADUATE') echo ' selected="selected"';} ?>>GRADUATE</option>
						<option value="MATRIC" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'MATRIC') echo ' selected="selected"';} ?>>MATRIC</option>
						<option value="Post Graduate" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'Post Graduate'||  $row->EDUCATION_BACKGROUND == 'POST GRADUATE') echo ' selected="selected"';} ?>>POST GRADUATE</option>
						<option value="Under Graduate" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'Under Graduate' || $row->EDUCATION_BACKGROUND == 'UNDER GRADUATE') echo ' selected="selected"';} ?>>UNDER GRADUATE</option>
						<option value="PROFESSIONAL" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'PROFESSIONAL') echo ' selected="selected"';} ?>>PROFESSIONAL</option>
						<option value="OTHERS" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'OTHERS') echo ' selected="selected"';} ?>>OTHERS</option>
						</select>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">	
					<div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Locality type</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<select required class="input-cust-name resi_prop_type" name="Locality_type" > 
							<option value="">Select Locality type *</option>
							<option value="EWS/LIG Locality" <?php if(!empty($row_more))if ($row_more->Locality_type == 'EWS/LIG Locality') echo ' selected="selected"'; ?>>EWS/LIG Locality</option>
							<option value="Middle/Lower Middle" <?php if(!empty($row_more))if ($row_more->Locality_type == 'Middle/Lower Middle') echo ' selected="selected"'; ?>>Middle/Lower Middle</option>
							<option value="Upper Middle" <?php if(!empty($row_more))if ($row_more->Locality_type == 'Upper Middle') echo ' selected="selected"'; ?>>Upper Middle</option>
							<option value="Community/Trouble Prone/Slum" <?php if(!empty($row_more))if ($row_more->Locality_type == 'Community/Trouble Prone/Slum') echo ' selected="selected"'; ?>>Community/Trouble Prone/Slum</option>
							
							</select>
					</div>
  			    </div>  			
		    </div>
	    </div>
	 
		<!--------------Added by priya 04-08-2022------------------------------------------------ -->
<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Income ITR Details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>
				</div>
					<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Do You Have ITR ?</span>

		</div>
		<div class="row justify-content-center col-12">
			<div class="form-check">
  		
			    <input required class="form-check-input" type="radio" name="itr_status" id="ITR_yes" value="yes" <?php if(!empty($income_details)) if($income_details->ITR_status=="yes"){ echo 'checked';}?>>
  				
  				<label class="form-check-label" for="flexRadioDefault1">Yes&nbsp;&nbsp;&nbsp;&nbsp;</label>
			</div>
			<div class="form-check">
  				<input required  class="form-check-input" type="radio" name="itr_status" id="ITR_no" value="no"  <?php  if(!empty($income_details)) if($income_details->ITR_status=="no"){ echo 'checked';}?> >
  				<label class="form-check-label" for="flexRadioDefault2">No</label>
			</div>
		</div>
								
				
		</div>

		<!----------------Adress details----------------------------------------------- -->
		<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Address Details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>
				</div>
				<div class="w-100"></div>
				<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Residential Address Line 1*</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input   required style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_1;?>">
							</div>
					    </div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Residential Address Line 2</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input  style="margin-top: 8px;" placeholder="Address Line 2 *" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_2;?>">
								</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Residential Address Line 3</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input  style="margin-top: 8px;" placeholder="Address Line 3 *" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_3;?>">
								</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Permanent Address Line 1*</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input style="margin-top: 1px;" required placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1"  id="per_add_1" value="<?php  if(!empty($row_more))echo  $row_more->PER_ADDRS_LINE_1;?>" minlength="3" maxlength="30">
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Permanent Address Line 2</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input  style="margin-top: 8px;" placeholder="Address Line 2 *" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_2;?>">
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Permanent Address Line 3</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input style="margin-top: 8px;"  placeholder="Address Line 3 " class="input-cust-name" type="text" name="per_add_3"  id="per_add_3" value="<?php  if(!empty($row_more))echo $row_more->PER_ADDRS_LINE_3;?>" minlength="3" maxlength="30">
							</div>
						</div>
				
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Current Address Type</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<select required class="input-cust-name resi_prop_type" name="resi_sel_property_type" > 
											<option value="">Select Property Type *</option>
											<option value="Self Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Self Owned') echo ' selected="selected"'; ?>>Self Owned</option>
											<option value="Parental/Ancestral" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Parental/Ancestral') echo ' selected="selected"'; ?>>Parental/Ancestral</option>
											<option value="Rental personal Family" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rental personal Family') echo ' selected="selected"'; ?>>Rental Personal Family</option>
											<option value="Shared Rental Accomodation" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Shared Rental Accomodation') echo ' selected="selected"'; ?>>Shared Rental Accomodation</option>
									</select>
								</div> 	
						</div>
	            			
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Stability At Current Address</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input min="1" required placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_NO_YEARS_LIVING;?>">
								</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Native Place</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input placeholder="Native Place" class="input-cust-name" name="NATIVE_PLACE" id="NATIVE_PLACE" value="<?php if(!empty($row_more))echo $row_more->NATIVE_PLACE ;?>" minlength="3" maxlength="30">
								</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input readonly placeholder="Native Place" class="input-cust-name"  value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_PINCODE ;?>" minlength="3" maxlength="30">
								</div>
						</div>
			
			    </div>
	     </div>
		<!----------------Identity details----------------------------------------------- -->
		<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Identity Details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>
				</div>
				
				<div class="w-100"></div>
				<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div hidden class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						   <div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number Available *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;" class="col">
								<div class="input-cust-name" style=" margin-top: 8px;">
									<div class="row">
									
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input  type="radio" id='yesCheck' name="Vechical_NO_available" value="yes" <?php if(!empty($row_more)){ if($row_more->Vechical_NO_available=='yes'){ echo 'checked';}}?> onclick="add_vechical_no()"> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input id='noCheck'  <?php if(!empty($row_more)){ if($row_more->Vechical_NO_available=='no' || $row_more->Vechical_NO_available=='NULL' || $row_more->Vechical_NO_available==''){ echo 'checked';}}?> type="radio" name="Vechical_NO_available" value="no" onclick="add_vechical_no()"> no
										</div>
										
									</div>	
								</div> 
							</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								
							<?php 
								if(!empty($row_more->Vechical_Number_1))
								{
									$json = $row_more->Vechical_Number_1;
									$jsonData = json_decode($json);
									if($jsonData!='')
									{
										$data_array = $jsonData->result;
										
											?>
											
													<table id="employee_table" style="text-align:center;">
													<?php 
													   for ($i=0; $i < count($data_array); $i++)
										               {
													 ?>
														<tr id="row1">
														
															<td style="width=30%">
																<select required class='input-cust-name'  id="Vechical_type" name="Vechical_type[]">
																	<option>Vechical Type</option>
																	<option  value="Two Wheeler" <?php if ($data_array[$i]->Vechical_type == 'Two Wheeler') echo ' selected="selected"'; ?>>Two Wheeler</option>
																	<option  value="Four Wheeler" <?php if ($data_array[$i]->Vechical_type == 'Four Wheeler') echo ' selected="selected"'; ?>>Four Wheeler</option>
																</select>	
															</td>
															<td style="width=30%"><input type="text" name="vechical_no[]" placeholder="Enter Vechical No" class="input-cust-name" style="margin:5px;" value="<?php echo $data_array[$i]->vechical_no;?>" ></td>
															
															<td style="width=20%"><input type="button" onclick="add_row();" value="ADD ROW" style="color: blue;margin-top:0px; margin:10px;" class="add-more" ></td>
														</tr>
													   <?php }?>
													</table>
												  <br>
											  
									  <?php
										
									}
						  
								}
								else
								{
								?>	
								<table id="employee_table" style="text-align:center;">
									<tr id="row1">
									
										<td style="width=30%">
											<select required class='input-cust-name'  id="Vechical_type" name="Vechical_type[]">
												<option>Vechical Type</option>
												<option  value="Two Wheeler">Two Wheeler</option>
												<option  value="Four Wheeler">Four Wheeler</option>
											</select>	
										</td>
										<td style="width=30%"><input type="text" name="vechical_no[]" placeholder="Enter Vechical Number" class="input-cust-name" style="margin:5px;" ></td>
										
										<td style="width=20%"><input type="button" onclick="add_row();" value="ADD ROW" style="color: blue;margin-top:0px; margin:10px;" class="add-more" ></td>
									</tr>
							    </table>
							<?php
								}
								?>
						</div>
					</div>
					
					
					<div  hidden class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div style=" margin-top: 8px;" class="col">
						    <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number Available *</span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
								<div class="row">		
								    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  type="radio" id='yesCheck2' name="Driving_l_available" value="yes" <?php if(!empty($row_more)){ if($row_more->Driving_l_available=='yes'){ echo 'checked';}}?> onclick="add_DL_no()"> yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="dis">
										<input id='noCheck2'  <?php if(!empty($row_more)){ if($row_more->Driving_l_available=='no' || $row_more->Driving_l_available=='NULL' || $row_more->Driving_l_available==''){ echo 'checked';}}?> type="radio" name="Driving_l_available" value="no" onclick="add_DL_no()"> no
									</div>	
							</div>			
								</div>	
							</div>  
													
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number</span>
						</div>			
						<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  placeholder="" class="input-cust-name" type="text" name="Driving_l_Number" id="Driving_l_Number"   value="<?php if(!empty($row_more)){echo $row_more->Driving_l_Number; }?>" >
							</div> 	
                    </div>
                    <div hidden class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">			
						    <div style=" margin-top: 8px;" class="col">
								   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number Available *</span>
						    </div>
							<div class="w-100"></div>
							   <div style="margin-left: 35px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input  type="radio" id='yesCheck1' name="passport_avl" value="yes" <?php if(!empty($row_more)){ if($row_more->Passport_available=='yes'){ echo 'checked';}}?> onclick="add_passport_no()"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="dis">
												<input id='noCheck1'  <?php if(!empty($row_more)){ if($row_more->Passport_available=='no' || $row_more->Passport_available=='NULL' || $row_more->Passport_available==''){ echo 'checked';}}?> type="radio" name="passport_avl" value="no" onclick="add_passport_no()"> no
											</div>
							</div>
											
										</div>	
									</div> 
							   </div>
					</div>
					
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  placeholder="" class="input-cust-name" type="text" name="passport_no" id="passport_no"   value="<?php if(!empty($row_more)){echo $row_more->Passport_Number; }?>" >
							</div> 
                    </div>							
                    <?php if(!empty($income_details))if($income_details->CUST_TYPE=='salaried'){?>
					    <div hidden class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					            <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official Mail Available *</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input  type="radio" id='yesCheck5' name="Official_mail_available" value="yes" <?php if(!empty($row_more)){ if($row_more->Official_mail_available=='yes'){ echo 'checked';}}?> onclick="add_off_mail()"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="dis">
												<input id='noCheck5'  <?php if(!empty($row_more)){ if($row_more->Official_mail_available=='no' || $row_more->Official_mail_available=='NULL' || $row_more->Official_mail_available==''){ echo 'checked';}}?> type="radio" name="Official_mail_available" value="no" onclick="add_off_mail()"> no
											</div>
					</div>
										</div>	
									</div>  
									
								</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official Mail</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  placeholder="" class="input-cust-name" type="email" name="Official_mail" id="Official_mail"   value="<?php if(!empty($row_more)){echo $row_more->Official_mail; }?>" >
								
								</div> 	
                        </div>								
					
					<?php } ?>		
                    <?php if(!empty($income_details))if($income_details->CUST_TYPE=='salaried'){?>
					        <div hidden class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					            <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number Available *</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input  type="radio" id='yesCheck3' name="Account_Number_available" value="yes" <?php if(!empty($row_more)){ if($row_more->Account_Number_available=='yes'){ echo 'checked';}}?> onclick="add_acc_no()"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="dis">
												<input id='noCheck3'  <?php if(!empty($row_more)){ if($row_more->Account_Number_available=='no' || $row_more->Account_Number_available=='NULL' || $row_more->Account_Number_available==''){ echo 'checked';}}?> type="radio" name="Account_Number_available" value="no" onclick="add_acc_no()"> no
											</div>
					</div>
										</div>	
									</div> 
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Bank Account Number</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  placeholder="" class="input-cust-name" type="text" name="Account_Number" id="Account_Number"   value="<?php if(!empty($row_more)){echo $row_more->Account_Number; }?>" >
								</div> 	
                            </div>								
					
					<?php } ?>
					<?php if(!empty($income_details))if($income_details->CUST_TYPE=='salaried'){?>
					        <div hidden class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					            <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number Available *</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input  type="radio" id='yesCheck4' name="EPFO_Number_available" value="yes" <?php if(!empty($row_more)){ if($row_more->EPFO_Number_available=='yes'){ echo 'checked';}}?> onclick="add_epfo_no()"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="dis">
												<input id='noCheck4'  <?php if(!empty($row_more)){ if($row_more->EPFO_Number_available=='no' || $row_more->EPFO_Number_available=='NULL' || $row_more->EPFO_Number_available==''){ echo 'checked';}}?> type="radio" name="EPFO_Number_available" value="no" onclick="add_epfo_no()"> no
											</div>
					</div>
										</div>	
									</div>  
									
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number</span>
								</div>	
								
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  placeholder="" class="input-cust-name" type="text" name="EPFO_Number" id="EPFO_Number"   value="<?php if(!empty($row_more)){echo $row_more->EPFO_Number; }?>" >
								</div> 	
                            </div>								
					
					<?php } ?>		
				 						
                </div>					
				
		</div>
		
		<!----------------------------------Co-applicant details ------------------------------- -->
		<!----------------------------------Personal Deatils Of Copaplicant--------------------------------------->


       <?php $i=1; foreach ($coapplicants as $coapplicant) {  ?>		
	  
		<div class="row shadow bg-white rounded margin-10 padding-15" id="<?php echo $coapplicant->FN; ?>">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;"> Personal details of<?php echo " - ".$coapplicant->FN." ".$coapplicant->LN." (Co-Applicant)";?></span>

			</div>
			
			
			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Name of Co-Applicant *</span>
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
						
	  				
						<input style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text" id="f_name" name="f_name_<?php echo $i;?>" minlength="3" maxlength="30" required value="<?php if(!empty($coapplicant))echo $coapplicant->FN;?>" oninput="validateText(this)">
	  					<input minlength="3" maxlength="30" style="margin-top: 8px;" placeholder="Middle Name (Optional)" class="input-cust-name" type="text" id="m_name" name="m_name_<?php echo $i;?>"  value="<?php if(!empty($coapplicant))echo $coapplicant->MN;?>" oninput="validateText(this)">
	  					<input style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" id="l_name" name="l_name_<?php echo $i;?>" minlength="5" maxlength="30" required  value="<?php if(!empty($coapplicant))echo $coapplicant->LN;?>" oninput="validateText(this)">
	  					<input style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="COAPP_ID_<?php echo $i;?>"  id="COAPPID" minlength="3" maxlength="30" hidden="true"  value="<?php if(!empty($coapplicant))echo $coapplicant->UNIQUE_CODE;?>">
	  				</div>
			    </div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				    <div style="margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-venus-mars"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Gender *</span>
					</div>			
				    <div class="w-100"></div>
					<div style="margin-left: 35px;" class="col">
						<div class="input-cust-name" style=" margin-top: 8px;">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input type="radio" name="<?php echo "gender_".$i;?>" value="male" <?php  if(!empty($coapplicant)){if ($coapplicant->GENDER == 'male') echo ' checked="true"'; }?>> Male
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="dis">
									<input  type="radio" name="<?php echo "gender_".$i;?>" value="female" <?php  if(!empty($coapplicant)){if ($coapplicant->GENDER == 'female') echo ' checked="true"'; }?>> Female
								</div>
	   </div>
							</div>						
						</div>  					
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				    <div style="margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Birth *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input required max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="dob_<?php echo $i;?>"  id="dob" value="<?php if(!empty($coapplicant))echo $coapplicant->DOB;?>">
	  				</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				    <div style="margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email-Id *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input minlength="3" maxlength="30" required placeholder="Enter email-Id *" class="input-cust-name" type="email" name="email_<?php echo $i;?>" value="<?php if(!empty($coapplicant))echo $coapplicant->EMAIL;?>">
					</div> 

				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				    <div style="margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input required placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
							title="Please enter valid 10 digit phone number" name="mobile_<?php echo $i;?>" oninput="maxLengthCheck(this)" maxlength="10" value="<?php if(!empty($coapplicant))echo $coapplicant->MOBILE;?>">
					</div> 

				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-users"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of Dependants </span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input required placeholder="No Of Dependants *" class="input-cust-name" type="text" name="NO_OF_DEPENDANTS_<?php echo $i;?>" value="<?php if(!empty($coapplicant)){echo $coapplicant->NO_OF_DEPENDANTS;}?>"  maxlength="2">
					</div> 
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-heart-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Martial Status *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;" class="col">
						<div class="input-cust-name" style=" margin-top: 8px;">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input  type="radio" name="<?php echo "marital_".$i; ?>" value="married" checked="true"> Married
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="dis">
									<input  <?php  if(!empty($coapplicant)){if ($coapplicant->MARTIAL_STATUS == 'single') echo ' checked="true"'; ?> type="radio" name="<?php echo "marital_".$i;} ?>" value="single"> Single
								</div>
	   </div>
							</div>	
						</div>  
						
					</div>	
              	
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				    <div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Education *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<select  class="input-cust-name" name="education_type_<?php echo $i;?>" > 
						  <option value="">Select Education *</option>
						  <option value="ENGINEER" <?php if(!empty($coapplicant)){if ($coapplicant->EDUCATION_BACKGROUND == 'ENGINEER') echo ' selected="selected"';} ?>>ENGINEER</option>
						  <option value="GRADUATE" <?php if(!empty($coapplicant)){if ($coapplicant->EDUCATION_BACKGROUND == 'GRADUATE') echo ' selected="selected"';} ?>>GRADUATE</option>
						  <option value="MATRIC" <?php if(!empty($coapplicant)){ if ($coapplicant->EDUCATION_BACKGROUND == 'MATRIC') echo ' selected="selected"';} ?>>MATRIC</option>
						  <option value="POST GRADUATE" <?php if(!empty($coapplicant)){if ($coapplicant->EDUCATION_BACKGROUND == 'POST GRADUATE') echo ' selected="selected"';} ?>>POST GRADUATE</option>
						  <option value="UNDER GRADUATE" <?php if(!empty($coapplicant)){if ($coapplicant->EDUCATION_BACKGROUND == 'UNDER GRADUATE') echo ' selected="selected"';} ?>>UNDER GRADUATE</option>
						  <option value="PROFESSIONAL" <?php if(!empty($coapplicant)){if ($coapplicant->EDUCATION_BACKGROUND == 'PROFESSIONAL') echo ' selected="selected"';} ?>>PROFESSIONAL</option>
						  <option value="OTHERS" <?php if(!empty($coapplicant)){if ($coapplicant->EDUCATION_BACKGROUND == 'OTHERS') echo ' selected="selected"'; }?>>OTHERS</option>
						</select>
					</div> 
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				 <div style=" margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Locality type</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<select required class="input-cust-name resi_prop_type" name="Locality_type_<?php echo $i;?>" > 
						  <option value="">Select Locality type *</option>
						  <option value="EWS/LIG Locality" <?php if(!empty($coapplicant))if ($coapplicant->Locality_type == 'EWS/LIG Locality') echo ' selected="selected"'; ?>>EWS/LIG Locality</option>
						  <option value="Middle/Lower Middle" <?php if(!empty($coapplicant))if ($coapplicant->Locality_type == 'Middle/Lower Middle') echo ' selected="selected"'; ?>>Middle/Lower Middle</option>
						  <option value="Upper Middle" <?php if(!empty($coapplicant))if ($coapplicant->Locality_type == 'Upper Middle') echo ' selected="selected"'; ?>>Upper Middle</option>
						  <option value="Community/Trouble Prone/Slum" <?php if(!empty($coapplicant))if ($coapplicant->Locality_type == 'Community/Trouble Prone/Slum') echo ' selected="selected"'; ?>>Community/Trouble Prone/Slum</option>
						  
						</select>
					</div> 		
				</div>
			</div>
        </div>
		<!---------------------------------------Adress Details Of Copapplicant-    added by priya 4-08-2022-------------- -->
		<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Income ITR Details of <?php echo " - ".$coapplicant->FN." ".$coapplicant->LN." (Co-Applicant)";?></span>
				</div>
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Do You Have ITR ?</span>
       	</div>
		<div class="row justify-content-center col-12">
			<div class="form-check">
  		
			    <input  class="form-check-input" type="radio" name="itr_status_<?php echo $i;?>"  value="yes" <?php if(!empty($coapplicant)) if($coapplicant->ITR_status=="yes"){ echo 'checked';}?>>
  				
  				<label class="form-check-label" >Yes&nbsp;&nbsp;&nbsp;&nbsp;</label>
			</div>
			<div class="form-check">
  				<input   class="form-check-input" type="radio" name="itr_status_<?php echo $i;?>" value="no"  <?php  if(!empty($coapplicant)) if($coapplicant->ITR_status=="no"){ echo 'checked';}?> >
  				<label class="form-check-label" >No</label>
			</div>
		</div>
								
				
		</div>
		<!----------------Adress details----------------------------------------------- -->
		<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Address Details of <?php echo " - ".$coapplicant->FN." ".$coapplicant->LN." (Co-Applicant)";?></span>
				</div>
				
				<div class="w-100"></div>
			
				
				
			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Residential address Line 1*</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input maxlength="25" required style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1_<?php echo $i;?>" id="resi_add_1" value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_LINE_1;?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Residential address Line 2</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input maxlength="25" style="margin-top: 8px;" placeholder="Address Line 2" class="input-cust-name" type="text" name="resi_add_2_<?php echo $i;?>" id="resi_add_2" value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_LINE_2;?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Residential address Line 3</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input maxlength="25" style="margin-top: 8px;" placeholder="Address Line 3" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3_<?php echo $i;?>" value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_LINE_3;?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Permanent address Line 1*</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<?php if(!empty($coapplicant)) { ?>
	  					          <input style="margin-top: 1px;"  placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1_<?php echo $i;?>"  id="per_add_1" value="<?php echo $coapplicant->PER_ADDRS_LINE_1 ?>">
								<?php }else{ ?>
								   <input style="margin-top: 1px;"  placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1_<?php echo $i;?>"  id="per_add_1" >
								<?php } ?>
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Permanent address Line 2</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<?php if(!empty($coapplicant)) { ?>
	  					          <input style="margin-top: 8px;"  placeholder="Address Line 2 *" class="input-cust-name" type="text" name="per_add_2_<?php echo $i;?>"  id="per_add_2" value="<?php echo $coapplicant->PER_ADDRS_LINE_2 ?>">
								<?php }else{ ?>
								   <input style="margin-top: 8px;"  placeholder="Address Line 2 *" class="input-cust-name" type="text" name="per_add_2_<?php echo $i;?>"  id="per_add_2" >
								<?php } ?>
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Permanent address Line 3</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<?php if(!empty($coapplicant)) { ?>
	  					          <input style="margin-top: 8px;"  placeholder="Address Line 3 *" class="input-cust-name" type="text" name="per_add_3_<?php echo $i;?>"  id="per_add_3" value="<?php echo $coapplicant->PER_ADDRS_LINE_3 ?>">
								<?php }else{ ?>
								  <input style="margin-top: 8px;"  placeholder="Address Line 3 *" class="input-cust-name" type="text" name="per_add_3_<?php echo $i;?>"  id="per_add_3" >
								<?php } ?>
						</div>
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Current address</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<select required class="input-cust-name resi_prop_type" name="resi_sel_property_type_<?php echo $i;?>" > 
							  <option value="">Select Property Type *</option>
							  <option value="Corporate Provided" <?php if(!empty($coapplicant))if ($coapplicant->RES_ADDRS_PROPERTY_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
							  <option value="Mortgaged" <?php if(!empty($coapplicant))if ($coapplicant->RES_ADDRS_PROPERTY_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
							  <option value="Owned" <?php if(!empty($coapplicant))if ($coapplicant->RES_ADDRS_PROPERTY_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
							  <option value="Rented" <?php if(!empty($coapplicant))if ($coapplicant->RES_ADDRS_PROPERTY_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
							  <option value="Shared Accomodation" <?php if(!empty($coapplicant))if ($coapplicant->RES_ADDRS_PROPERTY_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
							  <option value="Paying Guest" <?php if(!empty($coapplicant))if ($coapplicant->RES_ADDRS_PROPERTY_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
							  <option value="Others" <?php if(!empty($coapplicant))if ($coapplicant->RES_ADDRS_PROPERTY_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
							</select>
						</div> 	
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Stability at current address</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input min="1" required placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years_<?php echo $i;?>"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_NO_YEARS_LIVING;?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Native Place</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input placeholder="Native Place" class="input-cust-name" name="NATIVE_PLACE_<?php echo $i;?>" id="NATIVE_PLACE" value="<?php if(!empty($coapplicant))echo $coapplicant->NATIVE_PLACE ;?>" minlength="3" maxlength="30">
						</div>
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pin Code</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input placeholder="Native Place" class="input-cust-name"  value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_PINCODE ;?>" minlength="3" maxlength="30">
						</div>
				</div>
				
			</div>
	    </div>
		<!-----------------------------IdentityDetails IOf Copaplicant------------------------------------- -->
		<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Identity Details of <?php echo " - ".$coapplicant->FN." ".$coapplicant->LN." (Co-Applicant)";?></span>
				</div>
				
				<div class="w-100"></div>
				<div  class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div  hidden class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						   <div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number Available *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;" class="col">
								<div class="input-cust-name" style=" margin-top: 8px;">
									<div class="row">
									
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input  type="radio" id='yesCheck_<?php echo $i; ?>' name="Vechical_NO_available_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Vechical_NO_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_vechical_no(<?php echo $i; ?>)"> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input id='noCheck_<?php echo $i; ?>'  <?php if(!empty($coapplicant)){ if($coapplicant->Vechical_NO_available=='no' || $coapplicant->Vechical_NO_available=='NULL' || $coapplicant->Vechical_NO_available==''){ echo 'checked';}}?> type="radio" name="Vechical_NO_available_<?php echo $i; ?>" value="no" onclick="add_coapp_vechical_no(<?php echo $i; ?>)"> no
										</div>
										
									</div>	
								</div>  
								
							</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  placeholder="" class="input-cust-name" type="text" name="vechical_no_<?php echo $i; ?>" id="vechical_no_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){echo $coapplicant->Vechical_Number;}?>" >
							
							</div> 
					</div>
					<div hidden class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div style=" margin-top: 8px;" class="col">
						    <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number Available *</span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
								<div class="row">
								
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  type="radio" id='yesCheck_dl_<?php echo $i; ?>' name="Driving_l_available_<?php echo $i;?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Driving_l_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_DL_no(<?php echo $i; ?>)"> yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input id='noCheck_dl_<?php echo $i;?>'  <?php if(!empty($coapplicant)){ if($coapplicant->Driving_l_available=='no' || $coapplicant->Driving_l_available=='NULL' || $coapplicant->Driving_l_available==''){ echo 'checked';}}?> type="radio" name="Driving_l_available_<?php echo $i;?>" value="no" onclick="add_coapp_DL_no(<?php echo $i; ?>)"> no
									</div>
									
								</div>	
							</div>  
													
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Driving Licence Number</span>
						</div>			
						<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  placeholder="" class="input-cust-name" type="text" name="Driving_l_Number_<?php echo $i; ?>" id="Driving_l_Number_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){echo $coapplicant->Driving_l_Number; }?>" >
							</div> 	
                    </div>
                   <div hidden class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">			
						<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number Available *</span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
								<div class="row">
								
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input  type="radio" id='yesCheck_paas_<?php echo $i; ?>' name="passport_avl_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Passport_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_passport_no(<?php echo $i; ?>)"> yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input id='noCheck_pass_<?php echo $i; ?>'  <?php if(!empty($coapplicant)){ if($coapplicant->Passport_available=='no' || $coapplicant->Passport_available=='NULL' || $coapplicant->Passport_available==''){ echo 'checked';}}?> type="radio" name="passport_avl_<?php echo $i; ?>" value="no" onclick="add_coapp_passport_no(<?php echo $i; ?>)"> no
									</div>
									
								</div>	
							</div>  
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Passport Number</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  placeholder="" class="input-cust-name" type="text" name="passport_no_<?php echo $i; ?>" id="passport_no_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){echo $coapplicant->Passport_Number; }?>" >
							</div> 
                    </div>							
                    <?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried'){?>
					    <div hidden class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					            <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official Mail Available *</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input  type="radio" id='yesCheck_off_<?php echo $i; ?>' name="Official_mail_available_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Official_mail_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_off_mail(<?php echo $i;?>)"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="dis">
												<input id='noCheck_off_<?php echo $i; ?>'  <?php if(!empty($coapplicant)){ if($coapplicant->Official_mail_available=='no' || $coapplicant->Official_mail_available=='NULL' || $coapplicant->Official_mail_available==''){ echo 'checked';}}?> type="radio" name="Official_mail_available_<?php echo $i; ?>" value="no" onclick="add_coapp_off_mail(<?php echo $i; ?>)"> no
											</div>
					</div>
										</div>	
									</div>  
									
								</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official Mail</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  placeholder="" class="input-cust-name" type="email" name="Official_mail_<?php echo $i; ?>" id="Official_mail_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){echo $coapplicant->Official_mail; }?>" >
								
								</div> 	
                        </div>								
					
					<?php } ?>		
                    <?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried'){?>
					        <div  hidden class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					            <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number Available *</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;" class="col">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input  type="radio" id='yesCheck_acc_<?php echo $i; ?>' name="Account_Number_available_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Account_Number_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_acc_no(<?php echo $i; ?>)"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="dis">
												<input id='noCheck_acc_<?php echo $i; ?>'  <?php if(!empty($coapplicant)){ if($coapplicant->Account_Number_available=='no' || $coapplicant->Account_Number_available=='NULL' || $coapplicant->Account_Number_available==''){ echo 'checked';}}?> type="radio" name="Account_Number_available_<?php echo $i; ?>" value="no" onclick="add_coapp_acc_no(<?php echo $i; ?>)"> no
											</div>
					</div>
										</div>	
									</div>  
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Bank Account Number</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  placeholder="" class="input-cust-name" type="text" name="Account_Number_<?php echo $i; ?>" id="Account_Number_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){echo $coapplicant->Account_Number; }?>" >
								</div> 	
                            </div>								
					
					<?php } ?>
					 <?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried'){?>
					        <div  hidden class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					            <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number Available *</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input  type="radio" id='yesCheck_epfo_<?php echo $i; ?>' name="EPFO_Number_available_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->EPFO_Number_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_epfo_no(<?php echo $i;?>)"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="dis">
												<input id='noCheck_epfo_<?php echo $i; ?>'  <?php if(!empty($coapplicant)){ if($coapplicant->EPFO_Number_available=='no' || $coapplicant->EPFO_Number_available=='NULL' || $coapplicant->EPFO_Number_available==''){ echo 'checked';}}?> type="radio" name="EPFO_Number_available_<?php echo $i; ?>" value="no" onclick="add_coapp_epfo_no(<?php echo $i; ?>)"> no
											</div>
					 </div>
										</div>	
									</div>  
									
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number</span>
								</div>	
								
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
                                    <input  placeholder="" class="input-cust-name" type="text" name="EPFO_Number_<?php echo $i; ?>" id="EPFO_Number_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){echo $coapplicant->EPFO_Number;}?>" >
								</div> 	
                            </div>								
					
					<?php } ?>		
				 						
                </div>					
				
			    </div>
		<?php $i++;}?>
		<!------------------------------------------------------------------------------------------------------------->

	  				
					
					
					
		
	
	    <div class="row shadow bg-white rounded margin-10 padding-15" >
				<div class="row col-12 justify-content-center">
					<div>
						<a href="<?php echo base_url()?>index.php/Operations_user/Document_verification">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							NEXT
						</button></a>
					</div>		
				</div>					
		</div>
	</div>
	</div>
	</div>
	</form>
	<script>
	
	function add_vechical_no()
	{
		 
		if(document.getElementById('yesCheck').checked)
		{
			document.getElementById('vechical_no').removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck').checked)
		{
              document.getElementById('vechical_no').value='';
              document.getElementById('vechical_no').readOnly=true;
				
		}
	}
	function add_passport_no()
	{
		 
		if(document.getElementById('yesCheck1').checked)
		{
			document.getElementById('passport_no').removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck1').checked)
		{
              document.getElementById('passport_no').value='';
              document.getElementById('passport_no').readOnly=true;
				
		}
	}
	
	function add_DL_no()
	{
		 
		if(document.getElementById('yesCheck2').checked)
		{
			document.getElementById('Driving_l_Number').removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck2').checked)
		{
              document.getElementById('Driving_l_Number').value='';
              document.getElementById('Driving_l_Number').readOnly=true;
				
		}
	}
	function add_acc_no()
	{
		 
		if(document.getElementById('yesCheck3').checked)
		{
			document.getElementById('Account_Number').removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck3').checked)
		{
              document.getElementById('Account_Number').value='';
              document.getElementById('Account_Number').readOnly=true;
				
		}
	}
	function add_epfo_no()
	{
		 
		if(document.getElementById('yesCheck4').checked)
		{
			document.getElementById('EPFO_Number').removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck4').checked)
		{
              document.getElementById('EPFO_Number').value='';
              document.getElementById('EPFO_Number').readOnly=true;
				
		}
	}
	function add_off_mail()
	{
		 
		if(document.getElementById('yesCheck5').checked)
		{
			document.getElementById('Official_mail').removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck5').checked)
		{
              document.getElementById('Official_mail').value='';
              document.getElementById('Official_mail').readOnly=true;
				
		}
	}
	
	function add_coapp_vechical_no(i)
	{
		 
		if(document.getElementById('yesCheck_'+i).checked)
		{
			document.getElementById('vechical_no_'+ i).removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck_'+i).checked)
		{
              document.getElementById('vechical_no_'+ i).value='';
              document.getElementById('vechical_no_'+ i).readOnly=true;
				
		}
	}
	function add_coapp_passport_no(i)
	{
		 
		if(document.getElementById('yesCheck_paas_'+i).checked)
		{
			document.getElementById('passport_no_'+ i).removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck_pass_'+i).checked)
		{
              document.getElementById('passport_no_'+ i).value='';
              document.getElementById('passport_no_'+ i).readOnly=true;
				
		}
	}
	function add_coapp_DL_no(i)
	{
		 
		if(document.getElementById('yesCheck_dl_'+i).checked)
		{
			
			document.getElementById('Driving_l_Number_'+ i).removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck_dl_'+i).checked)
		{
			
              document.getElementById('Driving_l_Number_'+ i).value='';
              document.getElementById('Driving_l_Number_'+ i).readOnly=true;
				
		}
	}
	
	function add_coapp_acc_no(i)
	{
		 
		if(document.getElementById('yesCheck_acc_'+ i).checked)
		{
			document.getElementById('Account_Number_'+ i).removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck_acc_'+ i).checked)
		{
              document.getElementById('Account_Number_'+ i).value='';
              document.getElementById('Account_Number_'+ i).readOnly=true;
				
		}
	}
	function add_coapp_epfo_no(i)
	{
		 
		if(document.getElementById('yesCheck_epfo_'+ i).checked)
	
		{
			
			document.getElementById('EPFO_Number_'+ i).removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck_epfo_'+ i).checked)
		{
			
              document.getElementById('EPFO_Number_'+ i).value='';
              document.getElementById('EPFO_Number_'+ i).readOnly=true;
				
		}
	}
	function add_coapp_off_mail(i)
	{
		 
		if(document.getElementById('yesCheck_off_'+ i).checked)
	
		{
			
			document.getElementById('Official_mail_'+ i).removeAttribute('readonly');
		
		}
		else if(document.getElementById('noCheck_off_'+ i).checked)
		{
			
              document.getElementById('Official_mail_'+ i).value='';
              document.getElementById('Official_mail_'+ i).readOnly=true;
				
		}
	}
	</script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 

	 <!-------------------------added by priyanka------------------------------------------------------>
<script>
	/*Dropdown Menu*/
	$(document).ready(function(){
		if ($("#RBtest1").prop("checked")) {
			$('#display').css("display","block");
		}

	});
$('#RBtest1').click(function () {
   //alert("Test");
   $('#display').css("display","block");
  
 });
 $('#RBtest2').click(function () {
   //alert("Test2");
   $('#display').css("display","none");
  
 });
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
											//var download="download";
                                            $('.msg').html(  msg + '<a href="'+ obj.view +'" target="_blank" >'+ view +'</a></label>'); 
											/*msg2 = '<label class="download">';
                                            $('.download').html(  msg2 + '<a href="'+ obj.download +'" target="_blank" download>'+ download +'</a></label>');*/ 
											
						                }
                                    });

  
/*------------------------------------------------------------------------------------------------------------------*/



  
}); 
</script>
<script type="text/javascript">
dor.max = new Date().toISOString().split("T")[0];
function add_row()
{
 $rowno=$("#employee_table tr").length;
 $rowno=$rowno+1;
 $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><select class='input-cust-name' name='Vechical_type[]'><option  value=''>Vechical Type</option><option  value='Two Wheeler'>Two Wheeler</option><option  value='Four Wheeler'>Four Wheeler</option></select></td><td><input type='text' name='vechical_no[]' placeholder='Enter Vechical Number' class='input-cust-name' style='margin:5px;'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"') style='color: red; margin-top:0px; margin:10px; ' class='add-more' ></td></tr>");
 
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}




</script>