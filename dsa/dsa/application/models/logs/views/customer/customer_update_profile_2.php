<?php
//$Cust_consent_id = $id;
$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
//$cust_consent_status ="true";
$cust_consent_status  =$this->session->userdata("cust_consent_status");
$user_type_from_session=$this->session->userdata("user_type_from_session");
//echo $Cust_consent_id;
//echo $cust_consent_status;
//exit();
if($user_type_from_session=='DSA' && isset($Cust_consent_id) || $user_type_from_session=='branch_manager' && isset($Cust_consent_id) || $user_type_from_session=='Relationship_Officer' && isset($Cust_consent_id))
{
	$id=$Cust_consent_id;
}
//$id=$Cust_consent_id;
?>
<style>
.floating-btn
	 {
		width :50px;
		height :50px;
		background : #3949ab;
		display :flex;
		align-items:center;
		justify-content:center;
		text-decoration:none;
		
		color : #ffffff;
		font-size:15px;
		box-shadow:2px 2px 5px rgba(0,0,0,0.25);
		position:fixed;
		right:40px;
		z-index:1;
		bottom:60px;
		transition:background 0.25s;
		border-radius:10%;
		outline:blue;
		border:none;
		cursor:pointer;
	 }
	 .floating-btn:active{
		 background:#007D63;
	 }
	.chat-popup {
	  display: none;
	  position: fixed;
	  bottom: 100px;
	  right: 15px;
	  border: 3px solid #f1f1f1;
	  z-index: 1;
	}
	.form-container {
	  max-width: 200px;
	  padding: 10px;
	  background-color: white;
	}
	.form-container textarea {
	  width: 100%;
	  padding: 15px;
	  margin: 5px 0 22px 0;
	  border: none;
	  background: #f1f1f1;
	  resize: none;
	  min-height: 200px;
	}
	.form-container textarea:focus {
	  background-color: #ddd;
	  outline: none;
	}

	.form-container .btn {

	  color: Black;
	  padding: 12px 16px;
 
	  cursor: pointer;
	  width: 100%;
	  margin-bottom:10px;
	  opacity: 0.8;
	}
	.form-container .cancel {
	 background-color: red;
	}
	.form-container .btn:hover, .open-button:hover {
	  opacity: 1;
	}
</style>
<body onload="Check_status()" >
<button class="material-icons floating-btn" onclick="openForm()" id="menu_button"><i class="fa fa-align-justify"></i></button>

<div class="chat-popup" id="myForm">
  <form class="form-container">
	<button type="button" class="close" aria-label="Close" onclick="closeForm()" style="color:red;margin-top:-5px;">
	 <span aria-hidden="true">&times;</span>
	<br>	</button>

	<ul class="c-sidebar-nav">
	<button type="button" class="btn btn-outline-info" onClick="continue_();"id="btn_continue">CONTINUE</button>
	<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#holdModal" id="btn_hold">HOLD</button>
	<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#rejectionModal" id="btn_reject">REJECT</button>
	</ul>
  </form>
</div>
	<input hidden type="text" name="customer_id" id="customer_id"  value="<?php echo $row->UNIQUE_CODE;?>">
	<input hidden type="text" name="dsa_id" id="dsa_id" value="<?php if(isset($dsa_id) && $dsa_id !=''){ echo $dsa_id;} else { if(isset($dsa_id1)) { echo $dsa_id1; }  }?>">



<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="row">
			<div class="shadow dot" style="width: 25px; height: 25px; text-align: center;">
				<span ><p style="font-size: 10px; padding: 5px; color: white; font-weight: bold;">0%</p></span>				
			</div>
			
			<span class="per-hr-uncheck" style="width: 25%; margin-top: 12px;"></span>
			<div class="shadow align-middle uncheck-dot" style="width: 25px; height: 25px; text-align: ;">
				<span ><p style="font-size: 10px; padding: 4px; color: white; font-weight: bold;">30%</p></span>				
			</div>	
	
			<span class="per-hr-uncheck" style="width: 30%; margin-top: 12px;"></span>
			<div class="shadow align-middle uncheck-dot" style="width: 25px; height: 25px; text-align: ;">
				<span ><p style="font-size: 10px; padding: 4px; color: white; font-weight: bold;">65%</p></span>				
			</div>

			<span class="per-hr-uncheck" style="width: 32%; margin-top: 12px;"></span>
			<div class="shadow align-middle uncheck-dot" style="width: 25px; height: 25px; text-align: ;">
				<span ><p style="font-size: 10px; padding: 4px; color: white; font-weight: bold;">100%</p></span>				
			</div>	
		</div>	
	</div>
</div>

<?php ini_set('short_open_tag', 'On'); ?>
<form method="POST" action="<?php echo base_url(); ?>index.php/customer/customer_flow_update_s_one" id="cust_flow_s_one_update">
	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">

			<b><?php echo " ".$row->FN." ".$row->LN." ";?></b> Get Started By Creating Your Profile  <br>
				<b><span id='tag'></span><br><span id='tag2'></span></b>
                                                              
			</div>
			<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div>
						<span class="shadow align-middle dot"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></span>				
					</div>
					
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
					<div>
						<span class="align-middle dot-white"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span>
					</div>	
			
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
					<div>
						<span class="align-middle dot-white"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></span>
					</div>			
				</div>	
			</div>
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">			
			</div>
			<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div style="font-size: 10px; color: black; margin-right: 20px;">
						Personal Details
					</div>
					
					<div style="font-size: 10px; color: black; margin-right: 30px;">
						Income Details
					</div>					

					<div style="font-size: 10px; margin-right: 20px; color: black;">
						Documents
					</div>
				</div>	
			</div>
		</div>
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Tell Us About Yourself</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 45px; font-size: 12px; color: #bfbbbb;">Please Fill Your Personal Details. If Required Our Representative May Get In Touch To Verify Them.</span>

			</div>
			<div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Full Name As Per PAN Card *</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text" id="f_name" name="f_name" required value="<?php echo $row->FN;?>" oninput="validateText(this)">
	  					<input style="margin-top: 8px;" placeholder="Middle Name (optional) *" class="input-cust-name" type="text" name="m_name" id="m_name"  value="<?php echo $row->MN;?>" oninput="validateText(this)">
	  					<input style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="l_name" id="l_name" required  value="<?php echo $row->LN;?>" oninput="validateText(this)">
						<input  hidden style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="ID" id="ID"  required  value="<?php echo $row->UNIQUE_CODE;?>" oninput="validateText(this)">
	  				</div>
	  				<div class="w-100"></div>

	  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date Of Birth *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<!--<input required  max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="text" name="dob" id="dob" value="<?php echo $DOB;?>" >-->
						 <!-- <input  class="input-cust-name" type="text" name="dob" id="dob" value="<?php echo $DOB;?>" readonly> -->
						 <input  class="input-cust-name" type="text" name="dob" id="dob" value="<?php if(isset($row->DOB)){echo $row->DOB;}?>" readonly>
	  				</div>
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email-Id *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input required placeholder="Enter email-Id *" class="input-cust-name" type="email" name="email" value="<?php echo $row->EMAIL;?>" minlength="8" maxlength="75">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input required placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row->MOBILE;?>">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-university"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Education *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<select required class="input-cust-name" name="education_type" > 
					  <option value="">Select Education *</option>
					  <option value="Graduate" <?php if ($row->EDUCATION_BACKGROUND == 'Graduate') echo ' selected="selected"'; ?>>GRADUATE</option>
					  <option value="Post Graduate" <?php if ($row->EDUCATION_BACKGROUND == 'Post Graduate') echo ' selected="selected"'; ?>>POST GRADUATE</option>
					  <option value="Under Graduate" <?php if ($row->EDUCATION_BACKGROUND == 'Under Graduate') echo ' selected="selected"'; ?>>UNDER GRADUATE</option>
					 <!-- <option value="ENGINEER" <?php if ($row->EDUCATION_BACKGROUND == 'ENGINEER') echo ' selected="selected"'; ?>>ENGINEER</option>
					  <option value="ARCHITECT" <?php if ($row->EDUCATION_BACKGROUND == 'ARCHITECT') echo ' selected="selected"'; ?>>ARCHITECT</option>
					  <option value="CA" <?php if ($row->EDUCATION_BACKGROUND == 'CA') echo ' selected="selected"'; ?>>CA</option>
					  <option value="COST ACCOUNTANT" <?php if ($row->EDUCATION_BACKGROUND == 'COST ACCOUNTANT') echo ' selected="selected"'; ?>>COST ACCOUNTANT</option>
					  <option value="CS" <?php if ($row->EDUCATION_BACKGROUND == 'CS') echo ' selected="selected"'; ?>>CS</option>
					  <option value="DOCTOR" <?php if ($row->EDUCATION_BACKGROUND == 'DOCTOR') echo ' selected="selected"'; ?>>DOCTOR</option>
					  <option value="GRADUATE" <?php if ($row->EDUCATION_BACKGROUND == 'GRADUATE') echo ' selected="selected"'; ?>>GRADUATE</option>
					  <option value="MATRIC" <?php if ($row->EDUCATION_BACKGROUND == 'MATRIC') echo ' selected="selected"'; ?>>MATRIC</option>
					  <option value="POST GRADUATE" <?php if ($row->EDUCATION_BACKGROUND == 'POST GRADUATE') echo ' selected="selected"'; ?>>POST GRADUATE</option>
					  <option value="UNDER GRADUATE" <?php if ($row->EDUCATION_BACKGROUND == 'UNDER GRADUATE') echo ' selected="selected"'; ?>>UNDER GRADUATE</option>
					  <option value="PROFESSIONAL" <?php if ($row->EDUCATION_BACKGROUND == 'PROFESSIONAL') echo ' selected="selected"'; ?>>PROFESSIONAL</option>
					  <option value="LAWYER" <?php if ($row->EDUCATION_BACKGROUND == 'LAWYER') echo ' selected="selected"'; ?>>LAWYER</option>
					  <option value="NURSING" <?php if ($row->EDUCATION_BACKGROUND == 'NURSING') echo ' selected="selected"'; ?>>NURSING</option>
					  <option value="ITI" <?php if ($row->EDUCATION_BACKGROUND == 'ITI') echo ' selected="selected"'; ?>>ITI</option>
					   <option value="PHD" <?php if ($row->EDUCATION_BACKGROUND == 'PHD') echo ' selected="selected"'; ?>>PHD</option>
					  <option value="OTHERS" <?php if ($row->EDUCATION_BACKGROUND == 'OTHERS') echo ' selected="selected"'; ?>>OTHERS</option> -->
					</select>
  				</div> 
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-venus-mars"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Gender *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;">
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input checked="true" type="radio" name="gender" value="male"> Male
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input type="radio" name="gender" value="female" <?php if ($row->GENDER == 'female') echo ' checked="true"'; ?>> Female
	  						</div>
  						</div>						
  					</div>  					
  				</div>
				  	 <div class="w-100"></div>
				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Alternate Mobile Number</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input placeholder="Enter mobile number" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" name="alternative_mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row->Alternative_mobile ;?>">
  				</div> 


  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
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


		<!-- family ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Family Details</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">Please Provide Your Family Details For Further Processing.</span>

			</div>
			<div class="w-100"></div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-group"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Spouse/ Fathers Name  *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;" class="col">
  					<div class="input-cust-name" style=" margin-top: 8px;">
  						<div class="row">
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input type="radio" name="spouse" value="spouse" checked="true"> Spouse
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  							<input <?php if(!empty($row_more))if ($row_more->IS_SPOUSE_FATHER == 'father') echo ' checked="true"'; ?> type="radio" name="spouse" value="father"> Father
	  						</div>
  						</div>						
  					</div>  					
  				</div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="First Name *" class="input-cust-name" type="text" name="s_f_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_F_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
  				</div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="Middle Name (Optional)" class="input-cust-name" type="text" name="s_m_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_M_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
  				</div>
  				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Last Name *" class="input-cust-name" type="text" name="s_l_name" value="<?php if(!empty($row_more))echo $row_more->SPOUSE_L_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
  				</div>
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col" style="margin-top: 0px;">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-female"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Mother's Name *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="First Name *" class="input-cust-name" type="text" name="m_f_name" value="<?php if(!empty($row_more))echo $row_more->MOTHER_F_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
  				</div>
  				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="Middle Name (Optional)" class="input-cust-name" type="text" name="m_m_name" value="<?php if(!empty($row_more))echo $row_more->MOTHER_M_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
  				</div>
  				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Last Name *" class="input-cust-name" type="text" name="m_l_name" value="<?php if(!empty($row_more))echo $row_more->MOTHER_L_NAME;?>" minlength="3" maxlength="20" oninput="validateText(this)">
  				</div>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col" style="margin-top: 0px;">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-female"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Total No of Brothers and Sisters *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<select required class="input-cust-name" name="no_of_bro_sis" > 
					  <option value="">Select *</option>
					  <option value="1" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '1') echo ' selected="selected"'; ?>>0</option>
					  <option value="1" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '1') echo ' selected="selected"'; ?>>1</option>
					  <option value="2" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '2') echo ' selected="selected"'; ?>>2</option>
					  <option value="3" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '3') echo ' selected="selected"'; ?>>3</option>
					  <option value="4" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '4') echo ' selected="selected"'; ?>>4</option>
					  <option value="5" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '5') echo ' selected="selected"'; ?>>5</option>
					  <option value="6" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '6') echo ' selected="selected"'; ?>>6</option>
					  <option value="7" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '7') echo ' selected="selected"'; ?>>7</option>
					  <option value="8" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '8') echo ' selected="selected"'; ?>>8</option>
					  <option value="9" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '9') echo ' selected="selected"'; ?>>9</option>
					  <option value="10" <?php if(!empty($row_more))if ($row_more->TOTAL_BRO_SIS == '10') echo ' selected="selected"'; ?>>10</option>
					</select>
  					<!--input required placeholder="Enter count *" class="input-cust-name" maxlength="2" type="number" name="no_of_bro_sis" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->TOTAL_BRO_SIS;?>" -->
  				</div>
				<div class="col" style="margin-top: 8px;">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-female"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">No Of Dependants *</span>
				</div>	
				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="No Of Dependants *" class="input-cust-name" type="text" name="NO_OF_DEPENDANTS" value="<?php if(!empty($row_more))echo $row_more->NO_OF_DEPENDANTS;?>"  maxlength="2">
  				</div>
			</div>
		</div>

		

		<!-- address details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Tell Us Where You Live</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">This Will Help Us To Collect Any Documents If Necessary.</span>

			</div>
			<div class="w-100"></div>

			<div class="col-12" style="margin-bottom: 20px; color: black; font-size: 14px;">
				<span>Residence Address *</span>

			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_1;?>">
  					<input style="margin-top: 8px;" placeholder="Address Line 2 *" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_2;?>">
  					<input style="margin-top: 8px;" placeholder="Address Line 3 *" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_3;?>">
  				</div>  

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No Of Years At Current Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input min="1" required placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_NO_YEARS_LIVING;?>">
  				</div>	
               <div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Native Place *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="Native Place" class="input-cust-name" name="NATIVE_PLACE" id="NATIVE_PLACE" value="<?php if(!empty($row_more))echo $row_more->NATIVE_PLACE ;?>">
  				</div>  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Enter landmark *" class="input-cust-name" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LANDMARK;?>" minlength="3" maxlength="30">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Enter pincode *" class="input-cust-name" type="text" pattern="[0-9]{6}" minlength="6" title="Please enter valid pin code" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_PINCODE;?>">
  				</div>  
  				<div class="w-100"></div>
				   <div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No Of Years At Current City *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  required placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years_city"  id="resi_no_of_years_city" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->RES_CITY_NO_YEARS_LIVING;?>">
  				</div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select required class="input-cust-name resi_prop_type" name="resi_sel_property_type" > 
					  <option value="">Select Property Type *</option>
					 <!-- <option value="Corporate Provided" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
					  <option value="Mortgaged" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
					  <option value="Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
					  <option value="Rented" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
					  <option value="Shared Accomodation" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
					  <option value="Paying Guest" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
					  
					  <option value="Ancestral Property" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Ancestral Property') echo ' selected="selected"'; ?>>Ancestral Property</option>
					  <option value="Parents Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Parents Owned') echo ' selected="selected"'; ?>>Parents Owned</option>
					  <option value="Brother/ Sister owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Brother/ Sister owned') echo ' selected="selected"'; ?>>Brother/ Sister owned</option>
					  <option value="Others" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option> -->
					  <option value="Self Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Self Owned') echo ' selected="selected"'; ?>>Self Owned</option>
					    <option value="Parental/Ancestral" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Parental/Ancestral') echo ' selected="selected"'; ?>>Parental/Ancestral</option>
						<option value="Rental personal Family" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rental personal Family') echo ' selected="selected"'; ?>>Rental Personal Family</option>
						<option value="Shared Rental Accomodation" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Shared Rental Accomodation') echo ' selected="selected"'; ?>>Shared Rental Accomodation</option>
						<option value="Corporate Provided" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
					</select>

					<input style="margin-top: 8px; visibility: hidden;" placeholder="Enter other property type" class="input-cust-name" type="text" name="other_prop_type_1" id="other_prop_type_1" value="<?php if(!empty($row_more) && !empty($row_more->RES_ADDRS_OTHER_PROP_1))echo $row_more->RES_ADDRS_OTHER_PROP_1;?>"  minlength="3" maxlength="30">  		
  				</div>  
  				

			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input readonly id="resi_state_view" placeholder="State" class="input-cust-name" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_STATE ;?>">
  					<input hidden="true" placeholder="State" class="input-cust-name" name="resi_state" id="resi_state" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_STATE ;?>">  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District" class="input-cust-name" id="resi_district_view" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_DISTRICT ;?>">
  					<input hidden="true" placeholder="District" class="input-cust-name" name="resi_district" id="resi_district" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_DISTRICT ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="City" class="input-cust-name" name="resi_city" id="resi_city" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_CITY ;?>" minlength="3" maxlength="30">
  				</div>  
				
			</div>


			<!-- permanent add -->
			<div class="w-100"></div>

			<div class="row col-12" style="padding-top: 10px; margin: 10px; color: black; font-size: 14px;">
				<span>Permanent Address *</span>
				<div style="margin-left: 20px;" class="custom-control custom-switch">				  
				  <input type="checkbox" class="custom-control-input" id="customSwitches" name="resiperchk">
				  <label class="custom-control-label" for="customSwitches">Is Your Permanent Address Same As Residence Address ?</label>				  
				</div>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address *</span>
				</div>			
				<div class="w-100"></div>
  				<?php $perAddPresent = false; if(!empty($row_more))if($row_more->PER_ADDRS_LINE_1!=''){$perAddPresent = true;}?>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<?php if(!empty($row_more)) { ?>
	  					<input style="margin-top: 1px;" required placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1"  id="per_add_1" value="<?php echo $perAddPresent? $row_more->PER_ADDRS_LINE_1 : $row_more->RES_ADDRS_LINE_1 ;?>" >
	  					<input style="margin-top: 8px;"  placeholder="Address Line 2 " class="input-cust-name" type="text" name="per_add_2"  id="per_add_2" value="<?php echo $perAddPresent? $row_more->PER_ADDRS_LINE_2 : $row_more->RES_ADDRS_LINE_2 ;?>" >
	  					<input style="margin-top: 8px;"  placeholder="Address Line 3 " class="input-cust-name" type="text" name="per_add_3"  id="per_add_3" value="<?php echo $perAddPresent? $row_more->PER_ADDRS_LINE_3 : $row_more->RES_ADDRS_LINE_3 ;?>" >
	  				<?php } else { ?>
	  						<input style="margin-top: 1px;" required placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1"  id="per_add_1" >
	  					<input style="margin-top: 8px;" placeholder="Address Line 2 " class="input-cust-name" type="text" name="per_add_2"  id="per_add_2" >
	  					<input style="margin-top: 8px;" placeholder="Address Line 3" class="input-cust-name" type="text" name="per_add_3"  id="per_add_3" >
	  				<?php } ?>
  				</div>  	

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No Of Years At The Permanent Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input min="1" placeholder="Enter years *" class="input-cust-name" type="number"  name="per_no_of_years" id="per_no_of_years" required  value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_NO_YEARS_LIVING : $row_more->RES_ADDRS_NO_YEARS_LIVING ;?>">
  				</div>			  						  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="Enter landmark" required class="input-cust-name" type="text" name="per_landmark" id="per_landmark" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_LANDMARK : $row_more->RES_ADDRS_LANDMARK ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="Enter pincode *" class="input-cust-name" type="text" pattern="[0-9]{6}" minlength="6" name="per_pincode" title="Please enter valid pincode" id="per_pincode"  required oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_PINCODE : $row_more->RES_ADDRS_PINCODE ;?>">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select class="input-cust-name" name="per_sel_property_type" required id="sel_per_property_type"> 
						<?php if($perAddPresent) { ?>
							  <option value="">Select Property Type *</option>
							  <option value="Self Owned" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Self Owned') echo ' selected="selected"'; ?>>Self Owned</option>
							  <option value="Parental/Ancestral" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Parental/Ancestral') echo ' selected="selected"'; ?>>Parental/Ancestral</option>
							  <option value="Rental personal Family" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Rental personal Family') echo ' selected="selected"'; ?>>Rental personal Family</option>
							  <option value="Shared Rental Accomodation" <?php if(!empty($row_more))if ($row_more->PER_ADDRS_PROPERTY_TYPE == 'Shared Rental Accomodation') echo ' selected="selected"'; ?>>Shared Rental Accomodation</option>
						<?php } else { ?>
							 <option value="">Select Property Type *</option>
								<option value="Self Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Self Owned') echo ' selected="selected"'; ?>>Self Owned</option>
								<option value="Parental/Ancestral" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Parental/Ancestral') echo ' selected="selected"'; ?>>Parental/Ancestral</option>
								<option value="Rental personal Family" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rental personal Family') echo ' selected="selected"'; ?>>Rental personal Family</option>
								<option value="Shared Rental Accomodation" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Shared Rental Accomodation') echo ' selected="selected"'; ?>>Shared Rental Accomodation</option>
						<?php }?>
							</select>
  				</div>  			  							  				
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input readonly placeholder="State *" class="input-cust-name" id="per_state_view" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_STATE : $row_more->RES_ADDRS_STATE ;?>">

  					<input hidden="true" placeholder="State *" class="input-cust-name" name="per_state" id="per_state" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_STATE : $row_more->RES_ADDRS_STATE ;?>">
  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="per_district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District *" class="input-cust-name" id="per_district_view" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_DISTRICT : $row_more->RES_ADDRS_DISTRICT ;?>">

  					<input hidden="true" placeholder="District *" class="input-cust-name" name="per_district" id="per_district" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_DISTRICT : $row_more->RES_ADDRS_DISTRICT ;?>">

  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="per_city_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="City *" class="input-cust-name" name="per_city" id="per_city" value="<?php if(!empty($row_more))echo $perAddPresent? $row_more->PER_ADDRS_CITY : $row_more->RES_ADDRS_CITY ;?>" >
  				</div>  			  				
			</div>

			
		</div>		
		<!-- identity details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Identity Details</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">We Require Your AADHAR And PAN Card Number</span>

			</div>
			<div class="w-100"></div>

			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Select KYC Document *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select  class="input-cust-name resi_prop_type" name="KYC_doc" id="KYC_doc" > 
					<?php if(!empty($row_more)){ if( $row_more->VERIFY_KYC=='true'){?>
						 <option value="<?php if(!empty($row_more)){echo $row_more->KYC_doc; }?>"><?php if(!empty($row_more)){echo $row_more->KYC_doc; } ?></option>
					<?php }else{?>
						  <option value="">Select KYC Document *</option>
						  <option value="Aadhar" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'Aadhar') echo ' selected="selected"'; ?>>Aadhar Card</option>
						  <option value="Driving Licence" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'Driving Licence') echo ' selected="selected"'; ?>>Driving Licence</option>
						  <option value="Passport" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'Passport') echo ' selected="selected"'; ?>>Passport</option>
						  <option value="VoterId" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'VoterId') echo ' selected="selected"'; ?>>VoterId</option>
					<?php }}else{ ?>
					 <option value="">Select KYC Document *</option>
						  <option value="Aadhar" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'Aadhar') echo ' selected="selected"'; ?>>Aadhar Card</option>
						  <option value="Driving Licence" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'Driving Licence') echo ' selected="selected"'; ?>>Driving Licence</option>
						  <option value="Passport" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'Passport') echo ' selected="selected"'; ?>>Passport</option>
						  <option value="VoterId" <?php if(!empty($row_more))if ($row_more->KYC_doc == 'VoterId') echo ' selected="selected"'; ?>>VoterId</option>
					<?php } ?>
						</select>	
                </div>						
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" id="passport_file_no" style="display:none">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Enter File Number</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input   placeholder="Enter File Number" class="input-cust-name" type="text" name="file_number" id="file_number"  <?php if(!empty($row_more)){ if( $row_more->VERIFY_KYC=='true'){echo 'readonly ';} }?> value="<?php  if(!empty($row_more)){ echo $row_more->File_Number_Passport;}?>"  style="text-transform:uppercase">
  				  
				</div>  			  				
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" id="date_of_issue" style="display:none">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Enter Date Of Issue</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input   max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="doe" id="doe"  >
	  				</div> 			  				
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Enter KYC Document Id</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input   placeholder="" class="input-cust-name" type="text" name="KYC" id="KYC"  <?php if(!empty($row_more)){ if( $row_more->VERIFY_KYC=='true'){echo 'readonly ';} }?> value="<?php  if(!empty($row_more)){ echo $row_more->KYC; }?>"  style="text-transform:uppercase">
  				    <input type="text" id="verify_kyc_status" name="verify_kyc_status" value="<?php if(!empty($row_more)){echo $row_more->VERIFY_KYC;}?>"  hidden >
				</div>  			  				
			</div>
			<?php if(!empty($row_more)){ if( $row_more->VERIFY_KYC=='true'){ ?> 
				<div class="col-xl-3 -lg-3 col-md-col3 col-sm-12 col-12">
					<div style="margin-top: 0px;" class="col">
						<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
					</div>			
					<div class="w-100"></div>
					<a class="btn btn-success disabled" id="VERIFY_KYC" style="color:white;  padding: 19px;">Verify KYC Document <i class="fas fa-check"></i></a>
				</div>
			<?php }
					else {
						?>
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							<div style="margin-top: 0px;" class="col">
								<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
							</div>			
							<div class="w-100"></div>
							<a class="btn btn-success " id="VERIFY_KYC" style="color:white;  padding: 19px;">Verify KYC Document</a>
						</div>
			<?php } }
			else{?>
				    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							<div style="margin-top: 0px;" class="col">
								<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
							</div>			
							<div class="w-100"></div>
							<a class="btn btn-success " id="VERIFY_KYC" style="color:white; padding: 19px;">Verify KYC Document</a>
						</div>
			  <?php  }?>
			
			<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">PAN Number *</span>
					 
				</div>	
                 <div style="margin-top: 0px;" class="col">
					
					 <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">(Five characters, Four digits and again One character) e.g: COKPG9558B</span>
				</div>					
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<!--<input pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" required placeholder="PAN number *" class="input-cust-name" type="text" name="pan" id="pan" title="Please enter valid PAN number" maxlength="10" <?php if(!empty($row_more)){ if( $row_more->VERIFY_PAN=='true'){echo 'readonly ';} }?> value="<?php echo $row->PAN_NUMBER;?>"  style="text-transform:uppercase"> -->
					  <input pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" required placeholder="PAN number *" class="input-cust-name" type="text" name="pan" id="pan" title="Please enter valid PAN number" maxlength="10" <?php if(!empty($row_more)){ if( $row_more->VERIFY_PAN=='true'){echo 'readonly ';} }?> value="<?php if(isset( $row->PAN_NUMBER)){echo $row->PAN_NUMBER;}?>"  style="text-transform:uppercase">
  				   
					  <input type="text" id="verify_pan_status" name="verify_pan_status" value="<?php if(!empty($row_more)){echo $row_more->VERIFY_PAN;} ?>"  hidden >
					
				</div>  			  				
			</div>
			
			<?php if(!empty($row_more)){ if( $row_more->VERIFY_PAN=='true'){ ?> 
				<div class="col-xl-4 -lg-4 col-md-col4 col-sm-12 col-12">
					<div style="margin-top: 19px;" class="col">
						<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
					</div>			
					<div class="w-100"></div>
					<a class="btn btn-success disabled" id="verify_pan" style="color:white;">Verify PAN <i class="fas fa-check"></i></a>
				</div>
			<?php }
					else {
						?>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div style="margin-top: 19px;" class="col">
								<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
							</div>			
							<div class="w-100"></div>
							<a class="btn btn-success " id="verify_pan" style="color:white;">Verify PAN </a>
						</div>
			<?php } }
			else{?>
				    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div style="margin-top: 19px;" class="col">
								<span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
							</div>			
							<div class="w-100"></div>
							<a class="btn btn-success " id="verify_pan" style="color:white;">Verify PAN </a>
						</div>
			  <?php  }?>
			<div style="margin-top: 20px;" class="row col-12 justify-content-center">
			<span style="color:red" id="pan_error"></span>
			<span style="color:red" id="kyc_error"></span>
			</div>
			<div class="w-100"></div> 
			<div style="margin-top: 20px;" class="row col-12 justify-content-center">
				<div>			
				   <input type="checkbox" id="TC" name="TC" checked required value="true" >&nbsp; I Give My Consent To Request My Credit Bureau Score And I Agree To <a style="color: #007bff" target="_blank" href="<?php echo base_url()?>Finaleap-Terms_and_conditions _Credit_bureau_Consent.pdf">Terms And Conditions.</a>
				</div>
			</div>
			
			<?php if(!empty($row_more)){ if( $row_more->VERIFY_PAN=='true' && $row_more->VERIFY_KYC=='true' ){ ?> 	
				<div style="margin-top: 20px;" class="row col-12 justify-content-center">
					<div>
						<a  id="continue" href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried&ID=<?php if(!empty($row)){echo $row->UNIQUE_CODE;} ?>&UID=<?php echo  $dsa_id;?>">
						<button class="login100-form-btn " style="background-color: #25a6c6;" id="continue1"  >
							CONTINUE
						</button>
						</a>
						
					</div>		
				</div>
			<?php } else {?>
			             <div style="margin-top: 20px;" class="row col-12 justify-content-center">
							<div>
								<a  id="continue" href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried&ID=<?php if(!empty($row)){echo $row->UNIQUE_CODE;} ?>&UID=<?php echo  $dsa_id;?>">
								<button class="login100-form-btn disabled" style="background-color: #25a6c6;" id="continue1"  title="please verifiy PAN" >
									CONTINUE
								</button>
								</a>
								
							</div>		
						</div>
			<?php } }
			       else {?>
				   <div style="margin-top: 20px;" class="row col-12 justify-content-center">

					<div>
						<a  id="continue" href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried&ID=<?php if(!empty($row)){echo $row->UNIQUE_CODE;} ?>&UID=<?php echo  $dsa_id;?>">
						<button class="login100-form-btn disabled" style="background-color: #25a6c6;" id="continue1"  title="please verifiy PAN" >
							CONTINUE
						</button>
						</a>
						
					</div>		
				</div>

				   <?php } ?>
			



			

		</div>
	</div>
</form>

<script>
 $(document).ready(function () {
                
                $('#dob').datepicker({
				autoclose: true,
				endDate: new Date(new Date().setDate(new Date().getDate())),
				constrainInput: true,
				format: 'yyyy-mm-dd'  
				
});  
            
            });

 $('#pan').on('input', function(e) {
   this.setCustomValidity('')
     // e.target.checkValidity()
     this.reportValidity();
   })
   $('#KYC').on('input', function(e) {
   this.setCustomValidity('')
     // e.target.checkValidity()
     this.reportValidity();
   })

/*$(function(){
    $(window).load(function(){
         //$('#continue').attr("disabled","disabled");
		 //document.getElementById("continue1").disabled = true;
		 $('#continue1').addClass('disabled');

    });
});*/
$('#continue1').on('click',function(e)
                        {
							 var verify_kyc_status=$('#verify_kyc_status').val();
							  var verify_pan_status=$('#verify_pan_status').val();
							
							    
							 if(verify_pan_status=='true')
							{
								
								    $('#continue1').removeClass('disabled');
									
								
							}
							
							else if( $(this).hasClass('disabled') )
							{
								e.preventDefault();
								swal("Warning!", "Please Verify PAN And KYC Document", "warning");
								
							}
							
						    
							
						}
					 );

$('#KYC_doc').on('change',function(e)
                        {
							 var KYC_doc = $('#KYC_doc').val();
							
							 $('#KYC').attr("placeholder", "Enter "+ KYC_doc+" Number");
							 if(KYC_doc=='Passport')
							 {
								         $('#passport_file_no').show();
										 document.getElementById('KYC').value = '';
										 document.getElementById("KYC").pattern = "^([A-Z a-z]){1}([0-9]){7}$";
										 $('#KYC').attr("placeholder", "Enter "+ KYC_doc+" Number (e.g:J9006970)");
										 //$('#KYC').attr('title','J8369854');
										 $('#date_of_issue').hide();
										 $('#VERIFY_KYC').removeClass('disabled');
								
							 }
							 else if(KYC_doc=='Driving Licence')
							 {
								          $('#date_of_issue').show();
										  $('#passport_file_no').hide();
										  document.getElementById('KYC').value = '';
										   document.getElementById("KYC").pattern = "^(([A-Z]{2}[0-9]{2})( )|([A-Z]{2}-[0-9]{2}))((19|20)[0-9][0-9])[0-9]{7}$";
										   $('#KYC').attr("placeholder", "Enter DL Number (e.g: MH12 88998809097)");
											//$('#KYC').attr('title','MH14 20160034761');
										  $('#VERIFY_KYC').removeClass('disabled');
							 }
							  else if(KYC_doc=='Aadhar')
							 {
								           $('#date_of_issue').hide();
										   $('#passport_file_no').hide();
										   document.getElementById('KYC').value = '';
											document.getElementById("KYC").pattern = "^[2-9]{1}[0-9]{3}\\s[0-9]{4}\\s[0-9]{4}$";
											$('#KYC').attr("placeholder", "Enter "+ KYC_doc+" Number(e.g:8888 8888 8888)");
										   // $('#KYC').attr('title','3675 9834 6015');
										   $('#VERIFY_KYC').addClass('disabled');
										   $('#verify_kyc_status').val('true');
							 }
							  else if(KYC_doc=='VoterId')
							 {
								 
								            document.getElementById('KYC').value = '';
											document.getElementById("KYC").pattern = "^([a-zA-Z]){3}([0-9]){7}?$";
											$('#KYC').attr("placeholder", "Enter "+ KYC_doc+" Number (e.g: ZUT4800754)");
											$('#date_of_issue').hide();
											 $('#VERIFY_KYC').removeClass('disabled');
								    //$('#KYC').attr('title','ZUT4800754');
								 
							 }
							 else
							 {
								 $('#date_of_issue').hide();
								 $('#passport_file_no').hide();
								 $('#VERIFY_KYC').removeClass('disabled');
								 
							 }
							 
						}
					 );
 $( "#VERIFY_KYC" ).click(function() {
      
	    
        var KYC_doc = $('#KYC_doc').val();
		if(KYC_doc=='VoterId')
		{
		    var pan_no = $.trim($('#KYC').val());
		    var f_name = $.trim($('#f_name').val());
			var m_name = $.trim($('#m_name').val());
			var l_name = $.trim($('#l_name').val());
			var resi_no_of_years= $('#resi_no_of_years').val();
			if(resi_no_of_years>5)
			{
			var state=$('#resi_state_view').val()
			}
			else
			{
				var state=$('#per_state_view').val()
			}
			
			var type="voterid";
			if(f_name==''|| l_name=='')
			{
				$('#kyc_error').html("Please Fill Full name as per PAN card.");
				//exit;
				return false;
			}
			if(pan_no=='')
			{
				$('#kyc_error').html("Please Fill VoterId Number.");
				//exit;
				return false;
			}
			if(state=='')
			{
				$('#kyc_error').html("Please Enter State.");
				//exit;
				return false;
			}
			if(m_name=='')
			{
				var full_name=f_name+' '+l_name;
			
			}
			else
			{
				var full_name=f_name+' '+m_name+' '+l_name;
			}
			  $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
			   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
                data:{'full_name':full_name,'pan_no':pan_no,'type':type,'state':state},
                success:function(data){
					
					var obj =JSON.parse(data);
				//	var obj  = jQuery.parseJSON(JSON.stringify(data));
                   if(obj.msg=='sucess')
				   {

					  swal("success!", "VoterId verified Sucessfully!", "success");
					 // swal("Test Mode!", "VoterId verified Sucessfully!", "success");
					  $('#verify_kyc_status').val('true');
					
					  $('#VERIFY_KYC').addClass('disabled');
					 // $('#KYC_doc').prop('readonly', true);
					 var option = $('<option></option>').attr("value", KYC_doc).text(KYC_doc);
					 $("#KYC_doc").empty().append(option);
					  $('#KYC').prop('readonly', true);
					 
					   
				   }
				   else if(obj.msg=='fail')
				   {
					    
					     swal("Error!", "Something Wrong Information You given!", "warning");
						 $('#verify_kyc_status').val('false');
				   }
				   else if(obj.msg=='error')
				   {   
				         swal("Error!",obj.response , "warning");
						 $('#verify_kyc_status').val('false');
					   
				   }
				   
                }
            });
		   
		}
		if(KYC_doc=='Driving Licence')
		{
		    var pan_no = $('#KYC').val();
		    var doe=$('#doe').val();
			var dob=$('#dob').val();
			//var dob=document.getElementById("dob").innerHTML();
			  var date    = new Date(dob),
				yr      = date.getFullYear(),
				month   = date.getMonth() < 10 ? '0' + (date.getMonth()+1) : (date.getMonth()+1),
				day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
				newDate = day + '/' + month + '/' + yr;
				var date1    = new Date(doe),
				yr      = date1.getFullYear(),
				month   = date1.getMonth() < 10 ? '0' + (date1.getMonth()+1): (date1.getMonth()+1),
				day     = date1.getDate()  < 10 ? '0' + date1.getDate()  : date1.getDate(),
				newDate1 = day + '/' + month + '/' + yr;
		
			var type="drivingLicence";
			
			if(pan_no=='')
			{
				$('#kyc_error').html("Please Fill Driving Licence Number. ");
				//exit;
				return false;
			}
			if(doe=='')
			{
				$('#kyc_error').html("Please Enter Date of Issue. ");
				//exit;
				return false;
			}
			if(dob=='')
			{
				$('#kyc_error').html("Please Enter Date of Birth. ");
				//exit;
				return false;
			}
			
			
			  $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
				//url:'<?php echo base_url("index.php/Api_Functions/Test_drivingLicence_verification"); ?>',
                data:{'pan_no':pan_no,'type':type,'dob':newDate,'doe':newDate1},
                success:function(data){
					
					var obj =JSON.parse(data);
					//var obj  = jQuery.parseJSON(JSON.stringify(data));
                   if(obj.msg=='sucess')
				   {

					  swal("success!", "Driving Licence verified Sucessfully!", "success");
					//  swal("Test Mode!", "Driving Licence verified Sucessfully!", "success");
					  $('#verify_kyc_status').val('true');
					  $('#VERIFY_KYC').addClass('disabled');
					
					  
					 
					   
				   }
				   else if(obj.msg=='fail')
				   {
					    
					     swal("Error!", "Something Wrong Information You given!", "warning");
						 $('#verify_kyc_status').val('false');
				   }
				   else if(obj.msg=='error')
				   {   
				         swal("Error!",obj.response , "warning");
						 $('#verify_kyc_status').val('false');
					   
				   }
				   
                }
            });
		   
		}
		if(KYC_doc=='Passport')
		{
			
		    var pan_no = $.trim($('#KYC').val());
		    var f_name = $.trim($('#f_name').val());
			var m_name = $.trim($('#m_name').val());
			var l_name = $.trim($('#l_name').val());
			var file_number=$.trim($('#file_number').val());
			var dob=$('#dob').val();
			 var date    = new Date(dob),
				yr      = date.getFullYear(),
				month   = date.getMonth() < 10 ? '0' + (date.getMonth()+1) : (date.getMonth()+1),
				day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
				newDate = day + '/' + month + '/' + yr;
			
			var type="passport";
			if(f_name==''|| l_name=='')
			{
				$('#kyc_error').html("Please Fill Full name as per PAN card. ");
				//exit;
				return false;
			}
			if(file_number=='' || file_number=='' )
			{
				$('#kyc_error').html("Please Fill File Number. ");
				//exit;
				return false;
			}
			
			if(pan_no=='')
			{
				$('#kyc_error').html("Please Fill Passport Number. ");
				//exit;
				return false;
			}
			if(dob=='')
			{
				$('#kyc_error').html("Please Enter Date of Birth. ");
				//exit;
				return false;
			}
			if(m_name=='')
			{
				var full_name=f_name+' '+l_name;
			
			}
			else
			{
				var full_name=f_name+' '+m_name+' '+l_name;
			}
			  $.ajax({
                type:'POST',
               url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
			//	url:'<?php echo base_url("index.php/Api_Functions/Test_Passport_verification"); ?>',
                data:{'full_name':full_name,'pan_no':pan_no,'type':type,'file_number':file_number,'dob':newDate},
                success:function(data){
					
					var obj =JSON.parse(data);
					//var obj  = jQuery.parseJSON(JSON.stringify(data));
                   if(obj.msg=='sucess')
				   {
					  $('#continue1').removeClass('disabled');
					  swal("success!", "Passport verified Sucessfully!", "success");
					 // swal("Test Mode!", "Passport verified Sucessfully!", "success");
					  $('#verify_kyc_status').val('true');
					   $('#VERIFY_KYC').addClass('disabled');
					  
					 
					   
				   }
				   else if(obj.msg=='fail')
				   {
					     $('#continue1').removeClass('disabled');
					     swal("Error!", "Something Wrong Information You given!", "warning");
						
						
						 $('#verify_kyc_status').val('false');
				   }
				   else if(obj.msg=='error')
				   {   
				         swal("Error!",obj.response , "warning");
				        $('#continue1').addClass('disabled');
						 
						 $('#verify_kyc_status').val('false');
					   
				   }
				   
                }
            });
		   
		}
		
		
	 
		
       
    });
$( "#verify_pan" ).click(function() {
      
	    
        var f_name = $.trim($('#f_name').val());
	    var m_name = $.trim($('#m_name').val());
	    var l_name = $.trim($('#l_name').val());
		var pan_no = $.trim($('#pan').val());
		
		var type="individualPan";
		if(f_name==''|| l_name=='')
		{
			$('#pan_error').html("Please Fill Full name as per PAN card. ");
			//exit;
			return false;
		}
		if(pan_no=='')
		{
			$('#pan_error').html("Please Fill PAN Number. ");
		//	exit;
		return false;
		}
		if(m_name=='')
		{
			var full_name=f_name+' '+l_name;
		
		}
		else
		{
			var full_name=f_name+' '+m_name+' '+l_name;
		}
	 
		
         $.ajax({
                type:'POST',
                 url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
				//url:'<?php echo base_url("index.php/Api_Functions/Test_PAN_verification"); ?>',
                data:{'full_name':full_name,'pan_no':pan_no,'type':type},
                success:function(data){
					
					var obj =JSON.parse(data);
					
                   if(obj.msg=='sucess')
				   {
					  var pan_name=obj.name;
					  
					
					 swal("success!", "PAN verified Sucessfully!", "success");
					  // swal("TEST MODE!", "PAN verified Sucessfully!", "success");
					  $('#verify_pan_status').val('true');
					   $('#verify_pan').addClass('disabled');
					  
					 
					   
				   }
				   else if(obj.msg=='fail')
				   {
					    var pan_name=obj.name;
						 
					   

					    // swal("Error!", "Your name on Pan is "+obj.name+". Please update name as per your Pan card", "warning");
						 var words = obj.name.split(' ');
						 var length = words.length;
						  swal({
									title: "Error!",
									text: "Your name on Pan is "+obj.name+". Please update name as per your Pan card",
									type: "warning"
								}).then((willDelete) => {
												  if (willDelete) {
													  if(length==3)
													  {
													   $("#f_name").val(words[0]);
													   $("#m_name").val(words[1]);
													   $("#l_name").val(words[2]);
													  }
													   if(length==2)
													  {
													   $("#f_name").val(words[0]);
													    $("#l_name").val();
													   $("#l_name").val(words[1]);
													  
													  }
													
                                                     
													 
												  }
								});
						
						 $('#verify_pan').addClass('disabled');
						 $('#verify_pan_status').val('true');
						
				   }
				   else if(obj.msg=='error')
				   {   
				         swal("Error!",obj.response , "warning");
				        $('#continue1').addClass('disabled');
						 
						 $('#verify_pan_status').val('false');
					   
				   }
				   
                }
            });
    });
</script>
<div class="modal fade" id="rejectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Add reason for rejection</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
											<textarea class = "form-control" rows = "3" name="rejectReason" id="rejectReason" placeholder="Write something.."></textarea>
        	    					
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary" onclick="reject()">Save changes</button>
									  </div>
									</div>
								  </div>
								</div>

								<div class="modal fade" id="holdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Add reason for holding application</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
									    	<textarea class = "form-control" rows = "3" name="holdReason" id="holdReason" placeholder="Write something.." ></textarea>
        	    					
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary" onclick="hold()">Save changes</button>
									  </div>
									</div>
								  </div>
								</div>

	 <script>
								function openForm() {
								  document.getElementById("myForm").style.display = "block";
								}

								function closeForm() {
								  document.getElementById("myForm").style.display = "none";
								}

						function hold() 
						{
					
						 var User_ID = document.getElementById('customer_id').value;
						 var holdReason = "Application is on HOLD in personal information edit form because , "+document.getElementById('holdReason').value;
						 var dsa_id = document.getElementById('dsa_id').value;
						 if(holdReason=='')
										{
											swal("warning!", "Please Enter Reason for holding application", "warning");
										    return false;
										}
								$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/HOLD_CUSTOMER_APPLICATION"); ?>',
									    data:{
										'User_ID':User_ID,
										'Action':"HOLD",
										'Reason':holdReason,
										'dsa_id':dsa_id,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
												//alert("got it");
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/customer/profile_view_p_o_dsa?ID="+obj.User_ID+"&&UID="+obj.DSA_ID); });
									
												
											}
						                }
                                    });
		
						}

						function reject() 
						{
							var User_ID = document.getElementById('customer_id').value;
							var rejectReason = "Application is rejected in personal information edit form because , "+document.getElementById('rejectReason').value;
							var dsa_id = document.getElementById('dsa_id').value;
					    	if(rejectReason=='')
										{
											swal("warning!", "Please Enter Reason for rejecting application", "warning");
										    return false;
										}
						 	$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/REJECT_CUSTOMER_APPLICATION"); ?>',
									    data:{
										'User_ID':User_ID,
										'Action':"REJECT",
										'Reason':rejectReason,
										'dsa_id':dsa_id,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
												//alert("got it too");
												   swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/customer/customer_edit_profile_2?ID="+obj.User_ID+"&&UID="+obj.DSA_ID); });
									
											}
						                }
                                    });
						}

						function continue_()
						{
							 var User_ID = document.getElementById('customer_id').value;
						 	 var dsa_id = document.getElementById('dsa_id').value;

							 $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/CONTINUE_CUSTOMER_APPLICATION"); ?>',
									    data:{
										'User_ID':User_ID,
										'Action':"CONTINUE",
										'dsa_id':dsa_id,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
										
											      swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/customer/customer_edit_profile_2?ID="+obj.User_ID+"&&UID="+obj.DSA_ID); });
									
												
											}
						                }
                                    });

						}

						</script>
						<script>
						function Check_status()
						{
							//alert("hiii");
							var User_ID = document.getElementById('customer_id').value;
							$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/onload_check_status"); ?>',
									    data:{
										'User_ID':User_ID,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='HOLD')
											{
										         document.getElementById('tag').innerHTML = "Status added by  : "+obj.action_by;
												document.getElementById('tag2').innerHTML = " Reason : "+obj.reason;
											var word = "information edit";
											var mystring =obj.reason;
												 var incStr = mystring.includes(word);
											      if(incStr!= false)
												{
														$('#continue').hide();
													}

											}
											else if(obj.msg=='REJECT')
											{
												document.getElementById('tag').innerHTML = "Status added by  : "+obj.action_by;
												document.getElementById('tag2').innerHTML = " Reason : "+obj.reason;
												var word = "information edit";
												var mystring =obj.reason;
												 var incStr = mystring.includes(word);
											      if(incStr!= false)
												{
														$('#continue').hide();

													}
													 $('#lets_continue_btn').hide();
												  $('#lets_view_btn').hide();
												     $('#btn_hold').hide();
												    $('#btn_continue').hide();
														$('#btn_reject').hide();
										   
											}
											else if(obj.msg=='CONTINUE')
											{
													$('#border_style').css("border","2px solid blue");
													
											}
						                }
                                    });

						}
						</script>

       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
