	
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
    <a href="<?php echo base_url()?>index.php/Operations_user/CAM_Applicant_Details?ID=<?php echo $row->UNIQUE_CODE;?>"><div class="step-counter"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></div>
    <div class="step-name">Applicant Details</div></a>
  </div>

 	<div class="stepper-item active">
    	 <a href="<?php echo base_url()?>index.php/Operations_user/Document_verification">
  <div class="step-counter"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></div>
    	<div class="step-name">Document Verification</div> </a>
  	</div>
 


  	<div class="stepper-item completed">
    	 <div class="step-counter"><i style="font-size:18px;color: #ffffff; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></div>
  
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
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">	</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"></div>
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
			<div class="source" style="padding-bottom:15px;">
				  <span class="dropdown" style="margin-left:-70%;margin-top:-10%;margin-bottom:5%;padding-left:10px;height:56px;">Source [<?php if(isset($Sourcing_Type)){echo $Sourcing_Type;}?>]:&nbsp;<?php if(isset($Sourcing_name)){echo $Sourcing_name;}?></span>
				<!------------------------------ added by priyanka -----------------------------------------------  -->
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
		<div style="margin-left: 10px; margin-top: 4px;" class="row" >
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			
		</div>
		<br><br>
			

		
    <!-- ************************************* header end ************************************************************************************************ -->
	<form method="POST" action="<?php echo base_url(); ?>index.php/Operations_user/Update_Credit_Analysis" id="">
		<input hidden class="input-cust-name" type="text"  id="CAM_CREATED_BY" name="CAM_CREATED_BY" value="<?php echo $userID;?>">	
		
		<div class="row shadow bg-white rounded margin-10 padding-15" id="ApplicantDiv">
			     <div class="row col-12">
         <a href="#ApplicantDiv" style="padding-bottom:10px;" >
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
							<div class="row income-type-box-unselected justify-content-center padding-5" style="box-shadow: rgb(0 0 0 / 15%) 0px 4px 8px 0px, rgb(0 0 0 / 14%) 0px 6px 20px 0px;height:70px; width:200px;">
							    <i class='fas fa-user-check' style='font-size:35px;color:skyblue; margin-left: -33px;'></i>
								<span class="font-6" style="margin-top: 0px; color: black; font-weight: bold; opacity: 0.8; text-align: center; padding-left: 14px;">Applicant</span>
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
					<a href="#<?php echo $coapplicant->FN;?>" style="padding-bottom:10px;">	
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
							<div class="row  income-type-box-unselected justify-content-center " style="box-shadow: rgb(0 0 0 / 15%) 0px 4px 8px 0px, rgb(0 0 0 / 14%) 0px 6px 20px 0px;height:70px; width:200px;">
								<?php if($coapplicant->GENDER == 'male') { ?>
								  <i class='fas fa-male' style='font-size:40px;color:skyblue; margin-left: -33px;'></i>
								 <?php } else
								 {
								 ?>
								   <i class='fas fa-female' style='font-size:40px;color:skyblue;margin-left: -33px;'></i>
								 <?php
								 }?>
								<span class="font-6" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;padding-left: 25px;">Co-Applicant <?php echo $i;?></span>
								<span class="font-9" style="text-align: center; margin-top: -12px; color: black; font-weight: bold; opacity: 0.8;padding-left: 30px;"><?php if(!empty($coapplicant)) echo $coapplicant->FN." ".$coapplicant->LN ?></span>
								<div class="w-100"></div>
								
							</div>
			  			</div>	
			  		</a>
			  	<?php 			} 
			  		$i++;	}
			  	 ?>
		  			
      </div>
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Loan Details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )";?></span>
            </div>
			<div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Final Loan Amount</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input required class="input-cust-name" type="text" name="final_loan_amount"  value="<?php if(isset($data_credit_analysis)){ if(isset($data_credit_analysis->final_loan_amount)){ echo $data_credit_analysis->final_loan_amount; } else	{ if(isset($appliedloan)) {	echo $appliedloan->DESIRED_LOAN_AMOUNT;	} else{} } } else if($appliedloan) { echo $appliedloan->DESIRED_LOAN_AMOUNT; } else {} ?>">
					</div>
				</div>
			</div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">ROI in (%)</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input  required  class="input-cust-name" type="number" name="final_roi" step="any" id="final_roi" value="<?php if(isset($data_credit_analysis)) {if(isset($data_credit_analysis->final_roi)){ echo $data_credit_analysis->final_roi;} }	?>">
					</div>
				</div>							  				
			</div>	
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Loan Tenure (in years)</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					    <input required class="input-cust-name" type="number" pattern="[6-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" name="final_tenure" oninput="maxLengthCheck(this)" maxlength="10"  value="<?php  if(isset($data_credit_analysis)){ if(isset($data_credit_analysis->final_tenure))	{ echo $data_credit_analysis->final_tenure; }  else	{ if(isset($appliedloan))  { echo $appliedloan->TENURE;	}else {} } } else if($appliedloan) { echo $appliedloan->TENURE; } else {} ?>">
					</div>
				</div>							  				
			</div>	
		</div>
		<!-- +++++++++++++++++++++++++++++++++++++++ for salaried applicant ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
		<?php if(!empty($income_details))
		{ 
			if($income_details->CUST_TYPE=='salaried') 
			{ ?>
			    <!-- ---------------------------------------- basic details ----------------------------------------------------------- -->
				<div class="row shadow bg-white rounded margin-10 padding-15">
					<div class="row justify-content-center col-12">
						<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"; ?></span>
    				</div>
					 <div class="w-100"></div>
					 <div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Gross Salary</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){ echo (($income_details->ORG_SALARY_3+$income_details->ORG_SALARY_2+$income_details->ORG_SALARY_1)/3);}?>">
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Is Salary As  Per Salary Slip ?</span>
							</div>		
							<div class="w-100"></div>
							<div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input  type="radio" name="verify_salary" value="yes" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_salary == 'yes') echo ' checked="true"'; }?>> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="dis">
											<input  type="radio" name="verify_salary" value="no" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_salary == 'no' || $data_credit_analysis->verify_salary == '' || $data_credit_analysis->verify_salary == 'NULL') echo ' checked="true"'; } else {echo ' checked="true"';}?>> No
										</div>
			</div>
									</div>						
								</div>  					
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Residual Income </span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  required  class="input-cust-name" type="text" name="residual_income"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->residual_income;}?>">
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">verify Residual Income </span>
							</div>		
							<div class="w-100"></div>
							<div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input  type="radio" name="verify_residual_income" value="yes" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_residual_income == 'yes') echo ' checked="true"'; }?>> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<div class="dis">
											<input  type="radio" name="verify_residual_income" value="no" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_residual_income == 'no' || $data_credit_analysis->verify_residual_income == '' || $data_credit_analysis->verify_residual_income == 'NULL') echo ' checked="true"'; } else{  echo ' checked="true"'; }?>> No
										</div>
			</div>
									</div>						
								</div>  					
							</div>
						</div>							  				
					</div>
					<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Net Salary Credited</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  required  class="input-cust-name" type="number" name="credit_salary" id="credit_salary"  value="<?php if(!empty($data_credit_analysis)){if( $data_credit_analysis->credit_salary!=''){ echo $data_credit_analysis->credit_salary;}else{echo 0;}}else{ echo 0; }?>" onkeyup="cal_foir()">
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Salary Credited in Bank Statement </span>
							</div>		
							<div class="w-100"></div>
							<div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input  type="radio" name="verify_credit_salary" value="yes" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_credit_salary == 'yes') echo ' checked="true"'; }?>> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<div class="dis">
											<input  type="radio" name="verify_credit_salary" value="no" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_credit_salary == 'no' || $data_credit_analysis->verify_credit_salary == '' || $data_credit_analysis->verify_credit_salary == 'NULL') echo ' checked="true"'; }else{echo 'checked="true"';}?>> No
										</div>
			</div>
									</div>						
								</div>  					
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Credit bureau Score</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_credit_score)){ echo $data_credit_score->score;}?>">
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input hidden   class="input-cust-name" type="text" name="foir" id="foir"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->foir;}?>">
							</div>
						</div>							  				
					</div>	
					<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Obligation's</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly required  class="input-cust-name" type="number" name="obligations" id="obligations"  value="<?php if(!empty($total_obligation)){ echo $total_obligation;}else{ echo 0; }?>">
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Obligation As Per Bank Statement </span>
							</div>		
							<div class="w-100"></div>
							<div style="margin-left: 35px;" class="col">
								<div class="input-cust-name" style=" margin-top: 8px;">
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input  type="radio" name="verify_obligation" value="yes" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_obligation == 'yes') echo ' checked="true"'; }?>> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input  type="radio" name="verify_obligation" value="no" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_obligation == 'no' || $data_credit_analysis->verify_obligation == '' || $data_credit_analysis->verify_obligation == 'NULL') echo ' checked="true"'; } else{echo 'checked="true"';}?>> No
										</div>
									</div>						
								</div>  									
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input hidden   class="input-cust-name" type="text" name="eligibility"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->eligibility;}?>">
							</div>
						</div>	
			</div>						  				
					</div>	
				</div>
				<!-- ------------------------------------ basic details end ---------------------------------------------------------- -->
				<!-- ------------------------------------ company  details start ------------------------------------------------- -->
				<div class="row shadow bg-white rounded margin-10 padding-15">
					<div class="row justify-content-center col-12">
						<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Company details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"; ?></span>
					</div>
					<div class="w-100"></div>
					<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Organization</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){ echo $income_details->ORG_NAME;}?>">
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Company Type</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){ echo $income_details->ORG_TYPE;}?>">
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Organization Address</span>
							</div>		
							<div class="w-100"></div>
							<div style="margin-left: 45px;  margin-top: 8px;" class="col">
								<div class="row">
									<input style="margin-top: 1px;" disabled placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1"  id="per_add_1" value="<?php if(!empty($income_details)){ echo $income_details->ORG_ADRS_LINE_1;}?>" >
						            <input style="margin-top: 8px;" disabled placeholder="Address Line 2 *" class="input-cust-name" type="text" name="per_add_2"  id="per_add_2" value="<?php if(!empty($income_details)){ echo $income_details->ORG_ADRS_LINE_2;}?>" >
						            <input style="margin-top: 8px;" disabled placeholder="Address Line 3 *" class="input-cust-name" type="text" name="per_add_3"  id="per_add_3" value="<?php if(!empty($income_details)){ echo $income_details->ORG_ADRS_LINE_3;}?>">
								</div>					
							</div>
						</div>							  				
					</div>
					<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Stability In Current City</span>
							</div>		
							<div class="w-100"></div>
							<?php if(!empty($income_details)){ if(empty($income_details->ORG_WORKED_FROM) || $income_details->ORG_WORKED_FROM=='' ){ $years=0;} else{$diff = abs(strtotime(date("Y-m-d")) - strtotime($income_details->ORG_WORKED_FROM));$years = floor($diff / (365*60*60*24));} }?>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php  echo $years;?>">
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Product / Service Offer By Company</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){ echo $income_details->ORG_INDUSTRY_OPERATING;}?>">
							</div>
						</div>							  				
					</div>
					<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Total Work Experience</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){ echo $income_details->ORG_EXP_YEAR.' years '.$income_details->ORG_EXP_MONTH.' months';}?>">
							</div>
							
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Designation </span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){ echo $income_details->ORG_DESIGNATION;}?>">
							</div>
						</div>							  				
					</div>
				</div>
				<!-- ------------------------------------ company  details end --------------------------------------------------- -->
				<!-- ------------------------------------ income details start --------------------------------------------------- -->
				<div class="row shadow bg-white rounded margin-10 padding-15">
					<div class="row justify-content-center col-12">
						<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Income details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"; ?></span>
					</div>
					<div class="container">
						<table class="table table-responsive">
							<thead>
							  <tr>
								<td><b>Monthly salary details</b></td>
								<td><b>Gross Salary</b></td>
								<td><b>EPF Deduction</b></td>
								<td> <b>Loan/ Advance Deductions</b></td>
								<td><b>Any other Deductions</b></td>
								<td><b>Net Salary</b></td>
							  </tr>
							</thead>
							<tbody>
							  <tr>
								<td><b><?php echo date("F",strtotime("-3 Months"))?></b></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($income_details)){ echo $income_details->ORG_SALARY_1;}?>" onkeyup="cal_avg_salary(); cal_net_salary1();cal_avg_net_sal() "></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="epf_deduction_1" id="epf_deduction_1" value="<?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->epf_deduction_1;}else{echo '0';}?>" onkeyup="cal_net_salary1()"></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="loan_advance_deduction_1" id="loan_advance_deduction_1"  value="<?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->loan_advance_deduction_1;}else{echo '0';}?>" onkeyup="cal_loan_amount(); cal_net_salary1()"></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="any_other_deduction_1" id="any_other_deduction_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->any_other_deduction_1;}else{echo '0';}?>" onkeyup="cal_net_salary1();cal_avg_net_sal()"></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="net_salary_1" id="net_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->net_salary_1;}else{echo '0';}?>" onkeyup="cal_net_salary1();cal_avg_net_sal()" ></td>
							  </tr>
							  <tr>
								<td><b><?php echo date("F",strtotime("-2 Months"))?></b></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="gross_salary_2" id="gross_salary_2"  value="<?php if(!empty($income_details)){ echo $income_details->ORG_SALARY_2;}?>" onkeyup="cal_avg_salary(); cal_net_salary2();cal_avg_net_sal()"></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="epf_deduction_2" id="epf_deduction_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->epf_deduction_2;}else{echo '0';}?>" onkeyup="cal_net_salary2()"></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="loan_advance_deduction_2" id="loan_advance_deduction_2" value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->loan_advance_deduction_2;}else{echo '0';}?>" onkeyup="cal_loan_amount(); cal_net_salary2()" ></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="any_other_deduction_2" id="any_other_deduction_2"  value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->any_other_deduction_2;}else{echo '0';}?>"  onkeyup="cal_net_salary2();cal_avg_net_sal()" ></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="net_salary_2" id="net_salary_2"  value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->net_salary_2;}else{echo '0';}?>" onkeyup="cal_net_salary2();cal_avg_net_sal()" ></td>
							  </tr>
							  <tr>
								<td><b><?php echo date("F",strtotime("-1 Months"))?></b></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="gross_salary_3" id="gross_salary_3"  value="<?php if(!empty($income_details)){ echo $income_details->ORG_SALARY_3;}?>" onkeyup="cal_avg_salary(); cal_net_salary3() ;cal_avg_net_sal()"></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="epf_deduction_3" id="epf_deduction_3" value="<?php if(!empty($data_credit_analysis)){echo  $data_credit_analysis->epf_deduction_3;}else{echo '0';}?>" onkeyup="cal_net_salary3()"></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="loan_advance_deduction_3" id="loan_advance_deduction_3" value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->loan_advance_deduction_3;}else{echo '0';}?>" onkeyup="cal_loan_amount(); cal_net_salary3();"></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="any_other_deduction_3" id="any_other_deduction_3"  value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->any_other_deduction_3;}else{echo '0';}?>" onkeyup="cal_net_salary3();cal_avg_net_sal()"></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="net_salary_3" id="net_salary_3"  value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->net_salary_3;}else{echo '0';}?>"  onkeyup="cal_net_salary3() ;cal_avg_net_sal()"></td>
							  </tr>
					  
							   <tr>
								<td><b>Avrage salary</b></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="" id=""  value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->avg_salary;} else if(!empty($income_details)){ echo (($income_details->ORG_SALARY_3+$income_details->ORG_SALARY_2+$income_details->ORG_SALARY_1)/3) ;}?>">
								<input  hidden   class="input-cust-name" type="number" step="any" name="avg_salary" id="avg_salary"  value="<?php if(!empty($income_details)){ echo (($income_details->ORG_SALARY_3+$income_details->ORG_SALARY_2+$income_details->ORG_SALARY_1)/3) ;}?>"></td>
								<td></td>
								<td><input  required  class="input-cust-name" type="number" step="any" name="avg_loan_advance_deduction" id="avg_loan_advance_deduction"  value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->avg_loan_advance_deduction;}?>"></td>
								<td></td>
								<td><input  required  class="input-cust-name" type="number" step="any"  name="avg_net_salary" id="avg_net_salary"  value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->avg_net_salary;}?>"placeholder="calculate average"  onclick="cal_avg_net_sal()"></td>
							  </tr>
							</tbody>
						</table>
			        </div>
				</div>
				<!-- ------------------------------------ income details end --------------------------------------------------- -->
		<?php  
			}
	    	//<!-- +++++++++++++++++++++++++++++++++++++++ end  salaried applicant ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
			//<!-- +++++++++++++++++++++++++++++++++++++++ start  self employeed applicant ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
			else if($income_details->CUST_TYPE=='self employeed')
			{
        ?>
		        <!-- ------------------------------------ business details start --------------------------------------------------- -->
				<div class="row shadow bg-white rounded margin-10 padding-15">
					<div class="row justify-content-center col-12">
						<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Business Details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>
					</div>
					<div class="w-100"></div>
							<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="col">
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Type of Company</span>
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){ echo $income_details->BIS_CONSTITUTION;}?>">
									</div>
									
									<div class="w-100"></div>

									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">GSTIN </span>
									</div>		
									<div class="w-100"></div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){ echo $income_details->BIS_GST;}?>">
									</div>
								</div>							  				
							</div>	
							<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="col">
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Properitor/Partner/Director</span>
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){ echo $income_details->BIS_DESIGNATION;}?>">
									</div>
									
									<div class="w-100"></div>

									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Years in Business </span>
									</div>		
									<div class="w-100"></div>
									
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){ echo $income_details->BIS_YEARS_IN_BIS;}?>">
									</div>					
								
									
								</div>							  				
							</div>	
							<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="col">
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Business PAN</span>
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){ echo $income_details->BIS_PAN;}?>">
									</div>
									
									<div class="w-100"></div>

									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Nature of Business</span>
									</div>		
									<div class="w-100"></div>
									
									    <div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){ echo $income_details->BIS_NATURE_OF_BIS;}?>">
										</div>
								</div>							  				
							</div>

							<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="col">
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">ITR Status</span>
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){ echo $income_details->ITR_status;}?>">
									</div>
									
									<div class="w-100"></div>

								
								</div>							  				
							</div>
				
				</div>
				 <!-- ------------------------------------ business details end --------------------------------------------------- -->
				  <!-- ------------------------------------ income details start  for itr --------------------------------------------------- -->

				 <?php 
				 if($income_details->ITR_status=="" || $income_details->ITR_status=="yes")
				 {
				 ?>
					 <div class="row shadow bg-white rounded margin-10 padding-15">
						<div class="row justify-content-center col-12">
							<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Income details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>
						</div>
							<div class="container">
								<table class="table table-responsive w-auto">
									<thead>
									  <tr class="d-flex">
										<td class="col-1"><b></b></td>
										<td class="col-2"><b>Gross Total Income </b></td>
										<td class="col-2"><b>Net Sales</b></td>
										<td class="col-2"><b>Gross Profit </b></td>
										<td class="col-2"><b>Interest Expense</b></td>
										<td class="col-2"><b>Depreciation</b></td>
										<td class="col-2"><b>PBT </b></td>
										<td class="col-2"><b>PAT </b></td>
										<td class="col-2"> <b>Networth</b></td>
										<td class="col-2"><b>Debt </b></td>
										<td class="col-2"><b>Working Capital(CC/OD)</b></td>
										<td class="col-2"><b>Creditors</b></td>
										<td class="col-2"><b>Fixed Assets </b></td>
										<td class="col-2"><b>Debtors</b></td>
										<td class="col-2"><b>Cash and Bank Balance</b></td>
									  </tr>
									</thead>
									<tbody>
									  <tr class="d-flex">
										<td class="col-1"><b><?php $twelveMonthsAgo = date("Y", strtotime("-36 months")); echo $twelveMonthsAgo;?></b></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Gross_Total_Income_1" id="Gross_Total_Income_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Total_Income_1;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Net_Sales_1" id="Net_Sales_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Net_Sales_1;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Gross_Profit_1" id="Gross_Profit_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Profit_1;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Interest_Expense_1" id="Interest_Expense_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Interest_Expense_1;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Depreciation_1" id="Depreciation_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Depreciation_1;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="PBT_1" id="PBT_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PBT_1;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="PAT_1" id="PAT_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PAT_1;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Networth_1" id="Networth_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Networth_1;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Debt_1" id="Debt_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debt_1;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Working_Capital_1" id="Working_Capital_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Working_Capital_1;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Creditors_1" id="Creditors_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Creditors_1;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Fixed_Assets_1" id="Fixed_Assets_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Fixed_Assets_1;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Debtors_1" id="Debtors_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debtors_1;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Bank_Balance_1" id="Bank_Balance_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Bank_Balance_1;} else{echo '0';}?>" ></td>
									 </tr>
									   <tr class="d-flex">
										<td class="col-1"><b><?php $twelveMonthsAgo = date("Y", strtotime("-24 months")); echo $twelveMonthsAgo;?></b></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Gross_Total_Income_2" id="Gross_Total_Income_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Total_Income_2;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Net_Sales_2" id="Net_Sales_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Net_Sales_2;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Gross_Profit_2" id="Gross_Profit_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Profit_2;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Interest_Expense_2" id="Interest_Expense_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Interest_Expense_2;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Depreciation_2" id="Depreciation_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Depreciation_2;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="PBT_2" id="PBT_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PBT_2;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="PAT_2" id="PAT_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PAT_2;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Networth_2" id="Networth_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Networth_2;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Debt_2" id="Debt_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debt_2;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Working_Capital_2" id="Working_Capital_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Working_Capital_2;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Creditors_2" id="Creditors_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Creditors_2;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Fixed_Assets_2" id="Fixed_Assets_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Fixed_Assets_2;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Debtors_2" id="Debtors_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debtors_2;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Bank_Balance_2" id="Bank_Balance_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Bank_Balance_2;} else{echo '0';}?>" ></td>
									 </tr>
									 <tr class="d-flex">
										<td class="col-1"><b><?php $twelveMonthsAgo = date("Y", strtotime("-12 months")); echo $twelveMonthsAgo;?></b></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Gross_Total_Income_3" id="Gross_Total_Income_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Total_Income_3;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Net_Sales_3" id="Net_Sales_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Net_Sales_3;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Gross_Profit_3" id="Gross_Profit_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Profit_3;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Interest_Expense_3" id="Interest_Expense_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Interest_Expense_3;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Depreciation_3" id="Depreciation_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Depreciation_3;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="PBT_3" id="PBT_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PBT_3;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="PAT_3" id="PAT_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PAT_3;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Networth_3" id="Networth_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Networth_3;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Debt_3" id="Debt_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debt_3;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Working_Capital_3" id="Working_Capital_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Working_Capital_3;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Creditors_3" id="Creditors_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Creditors_3;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Fixed_Assets_3" id="Fixed_Assets_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Fixed_Assets_3;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Debtors_3" id="Debtors_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debtors_3;} else{echo '0';}?>" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Bank_Balance_3" id="Bank_Balance_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Bank_Balance_3;} else{echo '0';}?>" ></td>
									 </tr>
					   
									</tbody>
								</table>
				            </div>
					 </div>
			
				 <?php
				 }
				 // <!-- ------------------------------------ income details start  for no itr --------------------------------------------------- -->
				 else if($income_details->ITR_status=="no")
				 {
				?>
					<div class="row shadow bg-white rounded margin-10 padding-15"  id="ITR_no_div">
						<div class="row justify-content-center col-12" style="text-aline:cener;">
							<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom:3%; ">Sales details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>
						</div>

						 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" id="ITR_yes_div5">
							<div class="col" style="margin-top: 0px;">
								<span style="color: black; font-size: 17px; font-weight: bold; margin-left: 15%;"></span>
							</div>			
							<div class="w-100"></div>
	  						<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  				
							  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">1)&nbsp; Total Sales Value Per month</span><br>
							  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>
							  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">2)&nbsp; Sale Value per customer</span><br>
							  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
							  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">3)&nbsp; Total Customers per day</span><br>
							  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>
							  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">4)&nbsp; Total Fix client Base in the catchment</span><br>
							  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
							</div>  
   						 </div>	
	
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
							<div class="col" style="margin-top: 0px;">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-3 month'));?></span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  							<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="NO_itr_value_1" id="NO_itr_value_1" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->sales_per_month_1; else if(!empty($income_details))echo $income_details->sales_per_month_1;?>">
	  							<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="NO_itr_value_2" id="NO_itr_value_2" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->sales_per_cust_1 ; else if(!empty($income_details))echo $income_details->sales_per_cust_1 ;?>">
	  							<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="NO_itr_value_3" id="NO_itr_value_3" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->cust_per_day_1 ; else if(!empty($income_details))echo $income_details->cust_per_day_1 ;?>">
	  							<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="NO_itr_value_4" id="NO_itr_value_4" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_chachement_1 ; else if(!empty($income_details))echo $income_details->total_chachement_1 ;?>">
	  						</div>   
	  											  				
						</div>	
				
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
							<div class="col" style="margin-top: 0px;">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-2 month'));?></span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  							<input  style=" margin-bottom: 10px;"   placeholder="" class="input-cust-name" type="number" name="NO_itr_value_5" id="NO_itr_value_5" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->sales_per_month_2 ; else if(!empty($income_details))echo $income_details->sales_per_month_2 ;  ?>">
	  							<input  style=" margin-bottom: 10px;"   placeholder="" class="input-cust-name" type="number" name="NO_itr_value_6" id="NO_itr_value_6" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->sales_per_cust_2; else if(!empty($income_details))echo $income_details->sales_per_cust_2;?>">
	  							<input  style=" margin-bottom: 10px;"   placeholder="" class="input-cust-name" type="number" name="NO_itr_value_7" id="NO_itr_value_7" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->cust_per_day_2; else if(!empty($income_details))echo $income_details->cust_per_day_2;?>">
	  							<input  style=" margin-bottom: 10px;"   placeholder="" class="input-cust-name" type="number" name="NO_itr_value_8" id="NO_itr_value_8" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_chachement_2 ; else if(!empty($income_details))echo $income_details->total_chachement_2 ;?>">
	  						</div>    
	  											  				
						</div>	
				
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
							<div class="col" style="margin-top: 0px;">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-1 month'));?></span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  							<input style=" margin-bottom: 10px;"   placeholder="" class="input-cust-name" type="number" name="NO_itr_value_9" id="NO_itr_value_9" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->sales_per_month_3; else if(!empty($income_details))echo $income_details->sales_per_month_3; ?>">
	  							<input  style=" margin-bottom: 10px;"   placeholder="" class="input-cust-name" type="number" name="NO_itr_value_10" id="NO_itr_value_10" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->sales_per_cust_3; else if(!empty($income_details))echo $income_details->sales_per_cust_3;?>">
	  							<input  style=" margin-bottom: 10px;"   placeholder="" class="input-cust-name" type="number" name="NO_itr_value_11" id="NO_itr_value_11" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->cust_per_day_3; else if(!empty($income_details))echo $income_details->cust_per_day_3;  ?>">
	  							<input r style=" margin-bottom: 10px;"   placeholder="" class="input-cust-name" type="number" name="NO_itr_value_12" id="NO_itr_value_12" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_chachement_3; else if(!empty($income_details))echo $income_details->total_chachement_3;?>">
	  						</div>   
	  											  				
						</div>
						<div class="row justify-content-center col-12" style="text-aline:cener;">
							<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom:3%; ">Final derivations of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12" ></div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >
							<div class="col" style="margin-top: 0px;">
								<span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"></span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  							  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">1)&nbsp; Total Annual TO</span><br>
								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>
								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">2)&nbsp; Total Gross Margin (in %)</span><br>
								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">3)&nbsp; Total Profit</span><br>
								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">4)&nbsp; Total Expenses- Utilities (in amount)</span><br>
								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>
								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">5)&nbsp; Total Expenses- Salaries (in amount)</span><br>
								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  
								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">6)&nbsp; Total Expenses- Rentals (in amount)</span><br>
								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">7)&nbsp; Total Additional recurring expenses (in amount)</span><br>
								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">8)&nbsp; Gross Profit</span><br>
								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
							   </div>  
						</div>
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
							<div class="col" style="margin-top: 0px;">
								<span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"></span>
							</div>			
							<div class="w-100"></div>
								<div style="margin-left: 35px; margin-top: 8px;" class="col">	
									<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_annual" id="total_annual" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_anual ;?>">
									<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_gross_margin" id="total_gross_margin" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_gross_margin?>">
									<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_profit" id="total_profit" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_profit?>">
									<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_expenses_utilities" id="total_expenses_utilities" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_utilities?>">
									<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_expenses_salaries" id="total_expenses_salaries" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_salaries?>">
									<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_expenses_rentals" id="total_expenses_rentals" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_rental?>">
									<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_additional_recurring_expenses" id="total_additional_recurring_expenses" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_recurring?>">
									<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="gross_profit" id="gross_profit" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->gross_profit?>">
								</div>   
							</div>
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" ></div>
    

										</div>
				<?php
				 }
				 //<!------------------------Assesessed Income---------------------------------------- -->
				  if(!empty($row_more))
				  { 
					  if($row_more->verify_It_Returns=='no' ||$row_more->verify_It_Returns==' '||$row_more->verify_It_Returns=='NULL')
					  {
				 ?>
						 <div class="row shadow bg-white rounded margin-10 padding-15">
							<div class="row justify-content-center col-12">
								<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Assessed income of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>
							</div>
							<div class="container">
								<table class="table table-responsive w-auto">
									<thead>
									  <tr class="d-flex">
										<td class="col-1"><b></b></td>
										<td class="col-2"><b>Sales( cash)</b></td>
										<td class="col-2"><b>Purchase ( Cash)</b></td>
										<td class="col-2"><b>Sales( bank/ chq)</b></td>
										<td class="col-2"><b>Purchase ( bank/ chq)</b></td>
										<td class="col-2"><b>Labour paid</b></td>
										<td class="col-2"><b>Transport Charges paid </b></td>
										<td class="col-2"><b>Other charges paid</b></td>
										<td class="col-2"><b>Total Income</b></td>
					   
									  </tr>
									</thead>
									<tbody>
									  <tr class="d-flex">
										<td class="col-1"><b>Month 1</b></td>
										<td class="col-2"><input required  class="input-cust-name" type="number" step="any" name="Sales_cash_1" id="Sales_cash_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_1;} else{echo '0';}?>" onkeyup="cal_tot_sales_cash(); cal_total_income_1()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Purchase_cash_1" id="Purchase_cash_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_1;} else{echo '0';}?>" onkeyup="cal_tot_purchase_cash(); cal_total_income_1()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Sales_bank_1" id="Sales_bank_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_1;} else{echo '0';}?>" onkeyup="cal_tot_sales_bank(); cal_total_income_1()"  ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Purchase_bank_1" id="Purchase_bank_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_1;} else{echo '0';}?>" onkeyup="cal_tot_purchase_bank(); cal_total_income_1()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Labour_paid_1" id="Labour_paid_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_1;} else{echo '0';}?>" onkeyup="cal_tot_labour_paid(); cal_total_income_1()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Transport_charges_1" id="Transport_charges_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_1;} else{echo '0';}?>" onkeyup="cal_tot_Transport_charges(); cal_total_income_1()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Other_charges_1" id="Other_charges_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_1;} else{echo '0';}?>" onkeyup="cal_tot_Other_charges(); cal_total_income_1()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Total_income_1" id="Total_income_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_1;} else{echo '0';}?>" ></td>
						
									 </tr>
										<tr class="d-flex">
										<td class="col-1"><b>Month 2</b></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Sales_cash_2" id="Sales_cash_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_2;} else{echo '0';}?>" onkeyup="cal_tot_sales_cash(); cal_total_income_2()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Purchase_cash_2" id="Purchase_cash_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_2;} else{echo '0';}?>" onkeyup="cal_tot_purchase_cash(); cal_total_income_2()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Sales_bank_2" id="Sales_bank_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_2;} else{echo '0';}?>" onkeyup="cal_tot_sales_bank(); cal_total_income_2()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Purchase_bank_2" id="Purchase_bank_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_2;} else{echo '0';}?>" onkeyup="cal_tot_purchase_bank(); cal_total_income_2()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Labour_paid_2" id="Labour_paid_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_2;} else{echo '0';}?>" onkeyup="cal_tot_labour_paid(); cal_total_income_2()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Transport_charges_2" id="Transport_charges_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_2;} else{echo '0';}?>" onkeyup="cal_tot_Transport_charges(); cal_total_income_2()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Other_charges_2" id="Other_charges_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_2;} else{echo '0';}?>" onkeyup="cal_tot_Other_charges(); cal_total_income_2()"  ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Total_income_2" id="Total_income_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_2;} else{echo '0';}?>" ></td>
						
									 </tr>
									 <tr class="d-flex">
										<td class="col-1"><b>Month 3</b></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Sales_cash_3" id="Sales_cash_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_3;} else{echo '0';}?>" onkeyup="cal_tot_sales_cash(); cal_total_income_3()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Purchase_cash_3" id="Purchase_cash_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_3;} else{echo '0';}?>" onkeyup="cal_tot_purchase_cash(); cal_total_income_3()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Sales_bank_3" id="Sales_bank_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_3;} else{echo '0';}?>" onkeyup="cal_tot_sales_bank(); cal_total_income_3()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Purchase_bank_3" id="Purchase_bank_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_3;} else{echo '0';}?>" onkeyup="cal_tot_purchase_bank(); cal_total_income_3()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Labour_paid_3" id="Labour_paid_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_3;} else{echo '0';}?>" onkeyup="cal_tot_labour_paid(); cal_total_income_3()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Transport_charges_3" id="Transport_charges_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_3;} else{echo '0';}?>" onkeyup="cal_tot_Transport_charges(); cal_total_income_3()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Other_charges_3" id="Other_charges_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_3;} else{echo '0';}?>" onkeyup="cal_tot_Other_charges(); cal_total_income_3()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Total_income_3" id="Total_income_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_3;} else{echo '0';}?>" ></td>
						
									 </tr>
									  <tr class="d-flex">
										<td class="col-1"><b>Month 4</b></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Sales_cash_4" id="Sales_cash_4"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_4;} else{echo '0';}?>" onkeyup="cal_tot_sales_cash(); cal_total_income_4()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Purchase_cash_4" id="Purchase_cash_4"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_4;} else{echo '0';}?>" onkeyup="cal_tot_purchase_cash(); cal_total_income_4()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Sales_bank_4" id="Sales_bank_4"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_4;} else{echo '0';}?>" onkeyup="cal_tot_sales_bank(); cal_total_income_4()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Purchase_bank_4" id="Purchase_bank_4"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_4;} else{echo '0';}?>" onkeyup="cal_tot_purchase_bank(); cal_total_income_4()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Labour_paid_4" id="Labour_paid_4"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_4;} else{echo '0';}?>" onkeyup="cal_tot_labour_paid(); cal_total_income_4()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Transport_charges_4" id="Transport_charges_4"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_4;} else{echo '0';}?>" onkeyup="cal_tot_Transport_charges(); cal_total_income_4()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Other_charges_4" id="Other_charges_4"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_4;} else{echo '0';}?>" onkeyup="cal_tot_Other_charges(); cal_total_income_4()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Total_income_4" id="Total_income_4"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_4;} else{echo '0';}?>" ></td>
						
									 </tr>
									  <tr class="d-flex">
										<td class="col-1"><b>Month 5</b></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Sales_cash_5" id="Sales_cash_5"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_5;} else{echo '0';}?>" onkeyup="cal_tot_sales_cash(); cal_total_income_5()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Purchase_cash_5" id="Purchase_cash_5"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_5;} else{echo '0';}?>" onkeyup="cal_tot_purchase_cash(); cal_total_income_5()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Sales_bank_5" id="Sales_bank_5"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_5;} else{echo '0';}?>" onkeyup="cal_tot_sales_bank(); cal_total_income_5()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Purchase_bank_5" id="Purchase_bank_5"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_5;} else{echo '0';}?>" onkeyup="cal_tot_purchase_bank(); cal_total_income_5()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Labour_paid_5" id="Labour_paid_5"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_5;} else{echo '0';}?>" onkeyup="cal_tot_labour_paid(); cal_total_income_5()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Transport_charges_5" id="Transport_charges_5"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_5;} else{echo '0';}?>" onkeyup="cal_tot_Transport_charges(); cal_total_income_5()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Other_charges_5" id="Other_charges_5"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_5;} else{echo '0';}?>" onkeyup="cal_tot_Other_charges(); cal_total_income_5()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Total_income_5" id="Total_income_5"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_5;} else{echo '0';}?>" ></td>
						
									 </tr>
									 <tr class="d-flex">
										<td class="col-1"><b>Month 6</b></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Sales_cash_6" id="Sales_cash_6"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_6;} else{echo '0';}?>" onkeyup="cal_tot_sales_cash(); cal_total_income_6()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Purchase_cash_6" id="Purchase_cash_6"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_6;} else{echo '0';}?>" onkeyup="cal_tot_purchase_cash(); cal_total_income_6()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Sales_bank_6" id="Sales_bank_6"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_6;} else{echo '0';}?>" onkeyup="cal_tot_sales_bank(); cal_total_income_6();" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Purchase_bank_6" id="Purchase_bank_6"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_6;} else{echo '0';}?>" onkeyup="cal_tot_purchase_bank(); cal_total_income_6()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Labour_paid_6" id="Labour_paid_6"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_6;} else{echo '0';}?>" onkeyup="cal_tot_labour_paid(); cal_total_income_6()"></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Transport_charges_6" id="Transport_charges_6"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_6;} else{echo '0';}?>" onkeyup="cal_tot_Transport_charges(); cal_total_income_6()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Other_charges_6" id="Other_charges_6"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_6;} else{echo '0';}?>" onkeyup="cal_tot_Other_charges(); cal_total_income_6()" ></td>
										<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Total_income_6" id="Total_income_6"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_6;} else{echo '0';}?>" ></td>
						
									 </tr>
									 <tr class="d-flex">
										<td class="col-1"><b>Total</b></td>
										<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="Total_Sales_cash" id="Total_Sales_cash"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Sales_cash;} else{echo '0';}?>" ></td>
										<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="Total_Purchase_cash" id="Total_Purchase_cash"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Purchase_cash;} else{echo '0';}?>" ></td>
										<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="Total_Sales_bank" id="Total_Sales_bank"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Sales_bank;} else{echo '0';}?>" ></td>
										<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="Total_Purchase_bank" id="Total_Purchase_bank"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Purchase_bank;} else{echo '0';}?>" ></td>
										<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="Total_Labour_paid" id="Total_Labour_paid"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Labour_paid;} else{echo '0';}?>" ></td>
										<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="Total_Transport_charges" id="Total_Transport_charges"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Transport_charges;} else{echo '0';}?>" ></td>
										<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="Total_Other_charges" id="Total_Other_charges"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Other_charges;} else{echo '0';}?>" ></td>
										<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="Total_Total_income" id="Total_Total_income"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Total_income;} else{echo '0';}?>" ></td>
						
									 </tr>
									</tbody>
								</table>
							</div>
						 </div>
				 <?php
					  }
                  }
				 ?>
				  <!-- ------------------------------------ income details end --------------------------------------------------- -->
			<?php
			}
			?>
		    <!-- ------------------------------------------- top 3 creditors and debitors -------------------------------------------------------------------------- -->
			 <div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;"> Top 3 Debtors And Creditors of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>

			</div>
			<div class="container" >
				<table class="table table-responsive">
					
					<tbody>
					  <tr>
						<td><b>Creditor 1</b></td>
						
						<td><label>Name of creditor : </label><input  required  class="input-cust-name" type="text" name="Top_Creditors_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_1;}?>"></td>
						<td><label>Amount : </label><input  required  class="input-cust-name"  type="number" step="any" name="Top_Creditors_1_Amt"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_1_Amt;}?>"></td>
						<td><b>Debtor 1</b></td>
						<td><label>Name of debtor: </label><input  required  class="input-cust-name" type="text" name="Top_Debtors_1"  value="<?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->Top_Debtors_1;}?>"></td>
						<td><label>Amount : </label><input  required  class="input-cust-name"  type="number" step="any" name="Top_Debtors_1_Amt"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Debtors_1_Amt;}?>"></td>
						
					  </tr>
					   <tr>
						<td><b>Creditor 2 </b></td>
						<td><label>Name of creditor : </label><input  required  class="input-cust-name" type="text" name="Top_Creditors_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_2;}?>"></td>
						<td><label>Amount : </label><input  required  class="input-cust-name"  type="number" step="any" name="Top_Creditors_2_Amt"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_2_Amt;}?>"></td>
						<td><b>Debtors 2</b></td>
						<td><label>Name of debtor : </label><input  required  class="input-cust-name" type="text" name="Top_Debtors_2"  value="<?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->Top_Debtors_2;}?>"></td>
						<td><label>Amount : </label><input  required  class="input-cust-name"  type="number" step="any" name="Top_Debtors_2_Amt"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Debtors_2_Amt;}?>"></td>
					  </tr>
					   <tr>
						<td><b>Creditor 3</b></td>
						<td> <label>Name of creditor : </label><input  required  class="input-cust-name" type="text" name="Top_Creditors_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_3;}?>"></td>
						<td><label>Amount : </label><input  required  class="input-cust-name"  type="number" step="any" name="Top_Creditors_3_Amt"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_3_Amt;}?>"></td>
						<td><b>Debtors</b></td>
						<td><label>Name of debtor : </label><input  required  class="input-cust-name" type="text" name="Top_Debtors_3"  value="<?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->Top_Debtors_3;}?>"></td>
						<td><label>Amount : </label><input  required  class="input-cust-name"  type="number" step="any" name="Top_Debtors_3_Amt"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Debtors_2_Amt;}?>"></td>
					  </tr>
					  
					</tbody>
				</table>
			</div>
		</div>
		<?php
			//<!------------------------------------------------- top 3 creditors and debetors ------------------------------------------------------------------------ -->
		    //<!-- +++++++++++++++++++++++++++++++++++++++ end  self employeed applicant ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
		
		}?>
	
		<?php if(isset($data_obligations)){ ?>
	    <!-- ------------------------------------ obligation details start --------------------------------------------------- -->
			   <div class="row shadow bg-white rounded margin-10 padding-15">
					<div class="row justify-content-center col-12">
						<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Obligations details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>
					</div>
					<div class="container" >
						<div class="justify-content-center">
							<table class="table table-responsive justify-content-center">
								<thead>
								  <tr>
									<td><b>SR NO</b></td>
									<td><b>Active Loans</b></td>
									<td><b>Loan Type</b></td>
									<td><b>Loan Amount</b></td>
									<td><b>Balance Amount</b></td>
									<td><b>EMI</b></td>
								  </tr>
								</thead>
									<tbody>
									<?php
										 $i=1;
											foreach($data_obligations as $data_obligation)
											{
									
												if($data_obligation['Open']=='Yes')
												{
													// if(isset($data_obligation['InstallmentAmount']))
												//	 { 
														 ?>
														 <tr>
															<td><b><?php echo $i;?></b></td>
															<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){ echo $data_obligation['Institution'];}?>"></td>
															<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){echo $data_obligation['AccountType'];}?>"></td>
															<?php if(isset($data_obligation)) 
															{
																if($data_obligation['AccountType']=='Credit Card' || $data_obligation['AccountType']=="Secured Credit Card")
																{
																	if(isset($data_obligation['CreditLimit']))
																	{
															?>
																<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){echo $data_obligation['CreditLimit'];}?>"></td>
																<?php
																	}
																	else
																	{
																?>
																	<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){echo "0";}?>"></td>
															 <?php
																	}
															?>
															 <?php
																}else
																{ 
																	if(isset($data_obligation['SanctionAmount']))
																	{
															  ?>
												  				<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation['SanctionAmount'])){echo $data_obligation['SanctionAmount'];}?>"></td>
												
															  <?php
																	}
																	else
																	{
																?>
																	<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)) { echo "0";}?>"></td>
												
																<?php

																	}
															?>
														<?php
																}
															}
															?>
															<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation['Balance'])){echo $data_obligation['Balance'];}?>"></td>
															<?php if(isset($data_obligation['InstallmentAmount']))
															{
															?>
															 <td><input disabled required name="installment_"<?php  echo $i; ?> class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){ echo $data_obligation['InstallmentAmount'];}?>"></td>
															<?php
															}
															else
															{
																if(isset($data_obligation['SanctionAmount']))
																{
															?>
															   		<td><input disabled required name="installment_"<?php  echo $i; ?> class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){ echo 0;}?>"></td>
												
															<?php
																}
																elseif(isset($data_obligation['CreditLimit']))
																{
															?>
															 <td><input disabled required name="installment_"<?php  echo $i; ?> class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){ echo 0;}?>"></td>
												
															<?php
																}
																else
																{
															?>
															 <td><input disabled required name="installment_"<?php  echo $i; ?> class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){ echo "0";}?>"></td>
												
															<?php		
																}
     														}
															?>
												
														  </tr>
													<?php  $i++;
													// }
										
												}
									
											}
									?>
									 <!--- ------------ added by nnnn------------- --->
									<?php
										
										foreach($data_obligations_micro as $data_obligation)
										{
								
											if($data_obligation['Open']=='Yes')
											{
												// if(isset($data_obligation['InstallmentAmount']))
											//	 { 
													 ?>
													 <tr>
														<td><b><?php echo $i;?></b></td>
														<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){ echo $data_obligation['Institution'];}?>"></td>
														<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){echo $data_obligation['LoanCategory'];}?>"></td>
														<?php if(isset($data_obligation)) 
														{
															
																if(isset($data_obligation['SanctionAmount']))
																{
														  ?>
															  <td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation['SanctionAmount'])){echo $data_obligation['SanctionAmount'];}?>"></td>
											
														  <?php
																}
																else
																{
															?>
																<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)) { echo "0";}?>"></td>
											
															<?php

																}
														?>
													<?php
															}
														
														?>
														<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation['CurrentBalance'])){echo $data_obligation['CurrentBalance'];}?>"></td>
														<?php if(isset($data_obligation['InstallmentAmount']))
														{
														?>
														 <td><input disabled required name="installment_"<?php  echo $i; ?> class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){ echo $data_obligation['InstallmentAmount'];}?>"></td>
														<?php
														}
														else
														{
															if(isset($data_obligation['SanctionAmount']))
															{
														?>
																 <td><input disabled required name="installment_"<?php  echo $i; ?> class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){ echo 0;}?>"></td>
											
														<?php
															}
															elseif(isset($data_obligation['CreditLimit']))
															{
														?>
														 <td><input disabled required name="installment_"<?php  echo $i; ?> class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){ echo 0;}?>"></td>
											
														<?php
															}
															else
															{
														?>
														 <td><input disabled required name="installment_"<?php  echo $i; ?> class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){ echo "0";}?>"></td>
											
														<?php		
															}
														 }
														?>
											
													  </tr>
												<?php  $i++;
												// }
									
											}
								
										}
								?>
														<tr>
														<td>Total</td>
															<td></td>
															<td></td>
												
															<?php 
															 $i=1; $total_loan_amount=0;
															 foreach($data_obligations as $data_obligation)
															 {
													 
																 if($data_obligation['Open']=='Yes')
																 {
														
																		if(isset($data_obligation['SanctionAmount']))
																		 {  
																			$total_loan_amount= $total_loan_amount+($data_obligation['SanctionAmount']);
																		 }
																		 elseif(isset($data_obligation['CreditLimit']))
																		 {
																			$total_loan_amount= $total_loan_amount+($data_obligation['CreditLimit']);
																		 }
																		 else
																		 {

																		 }

														
												 				 }
																 $i++; 
															  }
															  /*------------ added by nnnn-------------*/
															  foreach($data_obligations_micro as $data_obligation)
															  {
													  
																  if($data_obligation['Open']=='Yes')
																  {
														 
																		 if(isset($data_obligation['SanctionAmount']))
																		  {  
																			 $total_loan_amount= $total_loan_amount+($data_obligation['SanctionAmount']);
																		  }
																		  elseif(isset($data_obligation['CreditLimit']))
																		  {
																			 $total_loan_amount= $total_loan_amount+($data_obligation['CreditLimit']);
																		  }
																		  else
																		  {

																		  }

														 
																  }
																  $i++; 
															   }
															  ?>

															<td ><input readonly class="input-cust-name" type="text" name="dob"  value="<?php echo $total_loan_amount;?>"></td>
															<td></td>
															<?php 
															 $i=1;$total=0;
															 foreach($data_obligations as $data_obligation)
															 {
													 
																 if($data_obligation['Open']=='Yes')
																 {
																	if(isset($data_obligation['InstallmentAmount']))
																	{
																		 $total=$total+$data_obligation['InstallmentAmount'];
																	}
																	else
																	{
																		if(isset($data_obligation['SanctionAmount']))
																		 {  
																			$total= $total+(0);
																		 }
																		 elseif(isset($data_obligation['CreditLimit']))
																		 {
																			$total= $total+(0);
																		 }
																		 else
																		 {
																		 }

																	}


												 				 }
																 $i++; 
															  }
															  /*------------ added by nnnn-------------*/
															  foreach($data_obligations_micro as $data_obligation)
															  {
													  
																  if($data_obligation['Open']=='Yes')
																  {
																	 if(isset($data_obligation['InstallmentAmount']))
																	 {
																		  $total=$total+$data_obligation['InstallmentAmount'];
																	 }
																	 else
																	 {
																		 if(isset($data_obligation['SanctionAmount']))
																		  {  
																			 $total= $total+(0);
																		  }
																		  elseif(isset($data_obligation['CreditLimit']))
																		  {
																			 $total= $total+(0);
																		  }
																		  else
																		  {
																		  }
 
																	 }
 
 
																   }
																  $i++; 
															   }
															  ?>
												
															<td ><input readonly class="input-cust-name" type="text" name="Bureau_Emi_Total"  value="<?php echo $total;?>"></td>
														  </tr>
									</tbody>
								</table>
							</div>
						</div>
			   </div>
	   <!-- ------------------------------------ obligation details end --------------------------------------------------- -->
	   	<!-- ------------------------------------------------additional emi start------------------------------------------------------ -->
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Additional EMI Details <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"; ?></span>
			</div>
			<div class="container" >
						<div class="justify-content-center">
						
							<table class="table table-responsive justify-content-center">
								<thead>
								  <tr>
								
									<td><b>Active Loans (Bank Name)</b></td>
									<td><b>Loan Type</b></td>
									<td><b>Loan Amount/Credit Limit</b></td>
									<td><b>Balance Amount</b></td>
									<td><b>EMI</b></td>
									<td></td>
								  </tr>
								</thead>
								<tbody id="Add_emi">
								<?php if(!empty($data_credit_analysis->Additional_Emi))
								{   $i=1;
									$reference_array=json_decode($data_credit_analysis->Additional_Emi,true);
									$count=count($reference_array);
									
									
									if(!empty($reference_array))
									{
									  foreach($reference_array as $value)
									  {
										  if($i==$count)
										  {
												if(!empty($value['Active_laon_1']))
												{
											?>
						
												<tr>
											
												<td><input    class="input-cust-name" type="text" name="Active_laon_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Active_laon_1']; } ?> ></td>
												<td><input    class="input-cust-name" type="text" name="Type_of_Loan_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Type_of_Loan_1']; } ?> ></td>
												<td><input    class="input-cust-name" type="number" name="Loan_Amount_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Loan_Amount_1']; } ?>></td>
												<td><input    class="input-cust-name" type="number" name="Balance_Amount_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Balance_Amount_1']; } ?>></td>
												<td><input    class="input-cust-name emi_total" type="number"   name="EMI_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['EMI_1']; } ?> onkeyup="calculateSum()"  ></td>
												<td><div style="color: blue;margin-top: 0px;" class="add-more" type="button" id="add_row"> Add More</div><td>
												</tr>
												<?php 
												}
										  }
										  else
										  {
											if(!empty($value['Active_laon_1']))
												{
												  ?>
						
													<tr>
												
													<td><input    class="input-cust-name" type="text" name="Active_laon_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Active_laon_1']; } ?> ></td>
													<td><input    class="input-cust-name" type="text" name="Type_of_Loan_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Type_of_Loan_1']; } ?> ></td>
													<td><input    class="input-cust-name" type="number" name="Loan_Amount_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Loan_Amount_1']; } ?>></td>
													<td><input    class="input-cust-name" type="number" name="Balance_Amount_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Balance_Amount_1']; } ?>></td>
													<td><input    class="input-cust-name emi_total" type="number"   name="EMI_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['EMI_1']; } ?> onkeyup="calculateSum()"  ></td>
													
													</tr>
												  <?php
												  }
												  else
												  {?>
													<td><input    class="input-cust-name" type="text" name="Active_laon_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Active_laon_1']; } ?> ></td>
													<td><input    class="input-cust-name" type="text" name="Type_of_Loan_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Type_of_Loan_1']; } ?> ></td>
													<td><input    class="input-cust-name" type="number" name="Loan_Amount_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Loan_Amount_1']; } ?>></td>
													<td><input    class="input-cust-name" type="number" name="Balance_Amount_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Balance_Amount_1']; } ?>></td>
													<td><input    class="input-cust-name emi_total" type="number"   name="EMI_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['EMI_1']; } ?> onkeyup="calculateSum()"  ></td>
												<?php	
												  }
										  }
										$i++;
									  }
									}
								}else{
								?>
								<tr>
									
								
										<td><input    class="input-cust-name" type="text" name="Active_laon_1[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Active_laon_1']; } ?> ></td>
										<td><input    class="input-cust-name" type="text" name="Type_of_Loan_1[]" ></td>
										<td><input    class="input-cust-name" type="number" name="Loan_Amount_1[]" ></td>
										<td><input    class="input-cust-name" type="number" name="Balance_Amount_1[]" ></td>
										<td><input    class="input-cust-name emi_total" type="number"   name="EMI_1[]" onkeyup="calculateSum()"  ></td>
										<td><div style="color: blue;margin-top: 0px;" class="add-more" type="button" id="add_row"> Add More</div><td>
										</tr>
								<?php } ?>
								</tbody>
								<tr>
														<td>Total</td>
														<td></td>
														<td></td>
														<td></td>
														<td><input readonly class="input-cust-name" type="text" name="Additinal_emi_total" id="Additional_Emi_Total"  value="<?php if(!empty($data_credit_analysis->Aditional_Emi_Total)){ echo $data_credit_analysis->Aditional_Emi_Total; } ?>"></td>
								</tr>
							</table>
						</div>
			</div>
		</div>
		<!-- ------------------------------------------------additional emi end------------------------------------------------------ -->

		<?php }?>
		<!-- ------------------------------------ bureau analysis start --------------------------------------------------- -->
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Bureau analysis of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>
			</div>
			 <div class="w-100"></div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Credit Score</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'])){ echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];}?>">
							</div>
							
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address Match with Aadhar</span>
							</div>			
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<div class="input-cust-name" style=" margin-top: 8px;" >
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input  disabled type="radio" name="add_verify" value="true" <?php if(!empty($address_flag))if ($address_flag== 'true') echo ' checked="true"'; ?>> Yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<div class="dis">
											<input disabled type="radio" name="add_verify" value="false" <?php if(!empty($address_flag))if ($address_flag== 'false') echo ' checked="true"'; ?>> No
										</div>
								</div>
									</div>						
								</div>  	
							</div> 
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Total Sanction Amount</span>
							</div>		
							<div class="w-100"></div>
							
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($credit_score_response)){ if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary'])) {echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'] ;}}?>">
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Enquiry Summary</span>
							</div>
							<?php
							if(!empty($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary']))
							   {
								 $data_Enquiry=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary'];
								foreach($data_Enquiry as $key => $value)
								{ ?>
									<div style="margin-left: 55px;  margin-top: 8px;" class="col">
										<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "><?php echo $key; ?></span>
									</div>		
									<div class="w-100"></div>
									
									<div style="margin-left: 55px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php echo $value; ?>">
									</div>
								<?php	 
								}
							   }
							?>


							
						</div>							  				
				</div>	
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">No of Active loan Accounts</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($credit_score_response)){ if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']))echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'];}?>">
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of Write off accounts</span>
						</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($credit_score_response)){ if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']))echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfWriteOffs'];}?>">
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Recent Activity</span>
						</div>
						<?php
							if(!empty($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']))
							   {
								 $data_Recent=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities'];
								foreach($data_Recent as $key => $value)
								{ ?>
									<div style="margin-left: 55px;  margin-top: 8px;" class="col">
										<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "><?php echo $key; ?></span>
									</div>		
									<div class="w-100"></div>
									
									<div style="margin-left: 55px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php echo $value; ?>">
									</div>
								<?php	 
								}
							   }
							?>
							
					</div>							  				
				</div>	
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Number of Loan Accounts</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($credit_score_response)){ if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']))echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts'];}?>">
							</div>
							
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Total loan Balance</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($credit_score_response)){ if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary'])) echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount'];}?>">
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">No of past due accounts</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($credit_score_response)){ if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary'])) echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfPastDueAccounts'];}?>">
							</div>
						</div>							  				
				</div>	
 					
		</div>
        <!-- ------------------------------------ bureau analysis end --------------------------------------------------- -->
		<!-- ------------------------------------ bank Statement analysis ----------------------------------------------- -->
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;"> Bank statement analysis of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>
			</div>
			<div class="w-100"></div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Average Balance</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required  class="input-cust-name" type="number" step="any" name="b_s_avg_balance"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_avg_balance;}?>">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Total Credits</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required  class="input-cust-name" type="number" step="any" name="b_s_total_credits"  value="<?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->b_s_total_credits;}?>">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Total Debits</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required  class="input-cust-name" type="number" step="any" name="b_s_total_debits"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_total_debits;}?>">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Salary</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required  class="input-cust-name" type="number" step="any" name="b_s_salary"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_salary;}?>">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Reimbursements</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required  class="input-cust-name"type="number" step="any" name="b_s_reimbursements"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_reimbursements;}?>">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Household</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required  class="input-cust-name" type="number" step="any" name="b_s_houshold"  value="<?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->b_s_houshold;}?>">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">EMI</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required  class="input-cust-name" type="number" step="any" name="b_s_emi"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_emi;}?>">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Charges</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required  class="input-cust-name" type="number" step="any" name="b_s_charges"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_charges;}?>">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Cheque Bounce Charges</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required  class="input-cust-name" type="number" step="any" name="b_s_cheque_bounce_charges"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_cheque_bounce_charges;}?>">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> NO Of Cheque Bounce In 12 Months</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required id='Cheque_Bounce' class="input-cust-name" type="number" step="any" name="b_s_no_cheque_bounce"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_no_cheque_bounce;}?>" onkeyup="Ratio_Cheque_Bounce_function()">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> NO Of Transaction In 12 Months</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required id='Transaction' class="input-cust-name" type="number" step="any" name="b_s_no_transaction"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_no_transaction;}?>" onkeyup="Ratio_Cheque_Bounce_function()">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Ratio Of Cheque Bounce/Transaction In %</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required readonly  id='Ratio_Cheque_Bounce' class="input-cust-name" type="number" step="any" name="b_s_ratio_cheque_bounce"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_ratio_cheque_bounce;}?>">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Average Monthly Balance Maintained In Last 12</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required id='b_s_avg_monthly_balance' class="input-cust-name" type="number" step="any" name="b_s_avg_monthly_balance"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_avg_monthly_balance;}?>" onkeyup="Avg_balance_emi()">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> EMI Amount</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required id='b_s_emi_amount' class="input-cust-name" type="number" step="any" name="b_s_emi_amount"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_emi_amount;}?>" onkeyup="Avg_balance_emi()">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Average Monthly Balance Maintained In last 12 Months to EMI %</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required readonly  id='b_s_monthl_balance_emi' class="input-cust-name" type="number" step="any" name="b_s_monthl_balance_emi"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_monthl_balance_emi;}?>">
							</div>
						</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Active Loan Balance</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input readonly required  class="input-cust-name" type="text" name="Active_laon" id="Active_laon" value="<?php if(!empty($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount'])){ echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount'];}?>">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Annual Income</span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required   id='b_s_annual_income' class="input-cust-name" type="number" step="any" name="b_s_annual_income"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_annual_income;}?>" onkeyup="ratio_income_loan_cal()">
						</div>
					</div>							  				
				</div>
				<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col">
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Current Month Debt Burden Ratio In % </span>
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required  readonly id='ratio_income_loan' class="input-cust-name" type="number" step="any" name="b_s_ratio_income_loan"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_ratio_income_loan;}?>">
						</div>
					</div>							  				
				</div>
	 					
		</div>
		<!-- ------------------------------------ bank statement analysys end-------------------------------------------- -->
	    <!--Applicant details end @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

		<!-- CO Applicant details start@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
		<?php $i=1; 
		foreach ($coapplicants as $coapplicant) 
		{ 	echo "<script type='text/javascript'>$( document ).ready(function() { 	coapp_cal_net_salary1($i);coapp_cal_net_salary2($i);coapp_cal_net_salary3($i);coapp_cal_avg_salary($i); coapp_cal_loan_amount($i);	});</script>";?>
         
				 <?php if(!empty($coapplicant))
				 { 
					 if($coapplicant->COAPP_TYPE=='salaried')
					 {
						 //echo "salaried";
				        ?>
				       <!-- ------------------------------------ company Salary details start --------------------------------------------------- -->
						<div class="row shadow bg-white rounded margin-10 padding-15" id="<?php echo $coapplicant->FN; ?>">
							<div class="row justify-content-center col-12">
								<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Company Salary details of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>
							</div>
							<div class="w-100"></div>
							<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="col">
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Salary</span>
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapplicant)){ echo ($coapplicant->ORG_SALARY_3 + $coapplicant->ORG_SALARY_2 +$coapplicant->ORG_SALARY_1)/3 ;}?>">
										<input readonly  hidden  class="input-cust-name" type="text" name="COAPP_ID_<?php echo $i;?>"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->UNIQUE_CODE;}?>">
										<input readonly hidden   class="input-cust-name" type="text" name="COAPP_TYPE_<?php echo $i;?>"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->COAPP_TYPE;}?>">
									</div>
									<div class="w-100"></div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Is Salary as  per salary slip ?</span>
									</div>		
									<div class="w-100"></div>
									<div style="margin-left: 35px;" class="col">
										<div class="input-cust-name" style=" margin-top: 8px;">
											<div class="row">
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
													<input  type="radio" name="verify_salary_<?php echo $i; ?>" value="yes" <?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])) if($coapp_data_credit_analysis_array[$i]->verify_salary == 'yes') echo ' checked="true"'; }?>> yes
												</div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<div class="dis">
													<input  type="radio" name="verify_salary_<?php echo $i; ?>" value="no" <?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ if($coapp_data_credit_analysis_array[$i]->verify_salary == 'no'|| $coapp_data_credit_analysis_array[$i]->verify_salary == '' || $coapp_data_credit_analysis_array[$i]->verify_salary== 'NULL') echo ' checked="true"';} else{echo' checked="true"';}  } else {echo ' checked="true"';}?>> No
												</div>
					 </div>
											</div>						
										</div>  					
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Residual Income </span>
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input  required  class="input-cust-name" type="text" name="residual_income_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapp_data_credit_analysis_array[$i]->residual_income;}?>">
									</div>
									<div class="w-100"></div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">verify Residual Income </span>
									</div>		
									<div class="w-100"></div>
									<div style="margin-left: 35px;" class="col">
										<div class="input-cust-name" style=" margin-top: 8px;">
											<div class="row">
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input  type="radio" name="verify_credit<?php echo $i; ?>" value="yes" <?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){if ($coapp_data_credit_analysis_array[$i]->verify_credit_salary == 'yes') echo ' checked="true"';} }?>> yes

												</div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<div class="dis">
												<input  type="radio" name="verify_credit<?php echo $i; ?>" value="no" <?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){ if ($coapp_data_credit_analysis_array[$i]->verify_credit_salary == 'no' || $coapp_data_credit_analysis_array[$i]->verify_credit_salary == '' || $coapp_data_credit_analysis_array[$i]->verify_credit_salary == 'NULL') echo ' checked="true"'; }else{ echo 'checked="true"';}}else{echo 'checked="true"';}?>> No
												</div>
					 </div>
											</div>						
										</div>  					
									</div>
								</div>							  				
							</div>	
							<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="col">
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Credited Salary</span>
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input  required  class="input-cust-name" type="text" name="credit_salary_<?php echo $i;?>" id="credit_salary_<?php echo $i;?>" value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])) {echo $coapp_data_credit_analysis_array[$i]->credit_salary;}}?>" onkeyup="coapp_cal_foir(<?php echo $i;?>)">
									</div>
									<div class="w-100"></div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Salary Credited in Bank Account </span>
									</div>		
									<div class="w-100"></div>
									<div style="margin-left: 35px;" class="col">
											<div class="input-cust-name" style=" margin-top: 8px;">
												<div class="row">
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														<input  type="radio" name="verify_credit_salary_<?php echo $i; ?>" value="yes" <?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){if ($coapp_data_credit_analysis_array[$i]->verify_credit_salary == 'yes') echo ' checked="true"';} }?>> yes
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
													<div class="dis">
														<input  type="radio" name="verify_credit_salary_<?php echo $i; ?>" value="no" <?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){ if ($coapp_data_credit_analysis_array[$i]->verify_credit_salary == 'no' || $coapp_data_credit_analysis_array[$i]->verify_credit_salary == '' || $coapp_data_credit_analysis_array[$i]->verify_credit_salary == 'NULL') echo ' checked="true"'; }else{ echo 'checked="true"';}}else{echo 'checked="true"';}?>> No
													</div>
					 </div>
												</div>						
											</div>  					
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Credit buero Score</span>
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_credit_score_array)){ if(!empty($coapp_data_credit_score_array[$i])){echo $coapp_data_credit_score_array[$i]->score;}}?>">
									</div>
									
									
								</div>							  				
							</div>	
							<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="col">
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Obligation</span>
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input readonly required  class="input-cust-name" type="text" name="obligations_<?php echo $i;?>" id="obligations_<?php echo $i;?>"  value="<?php if(!empty($coapp_data_obligation_array)){ if(!empty($coapp_data_obligation_array[$i])){echo $coapp_data_obligation_array[$i];} else{echo 0;}}?>">
									</div>
									<div class="w-100"></div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Obligation as per Bank Statement </span>
									</div>		
									<div class="w-100"></div>
										<div style="margin-left: 35px;" class="col">
											<div class="input-cust-name" style=" margin-top: 8px;">
												<div class="row">
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														<input  type="radio" name="verify_obligation_<?php echo $i; ?>" value="yes"<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){if ($coapp_data_credit_analysis_array[$i]->verify_obligation == 'yes') echo ' checked="true"';} }?> > yes
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
													<div class="dis">
														<input  type="radio" name="verify_obligation_<?php echo $i; ?>" value="no" <?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){ if ($coapp_data_credit_analysis_array[$i]->verify_obligation == 'no' || $coapp_data_credit_analysis_array[$i]->verify_obligation == '' || $coapp_data_credit_analysis_array[$i]->verify_obligation == 'NULL') echo ' checked="true"'; }else{ echo 'checked="true"';}}else{echo 'checked="true"';}?>> No
													</div>
					 </div>
												</div>						
											</div>  									
										</div>
										
									</div>							  				
								</div>
							</div>
		                </div>
					   <!-- ------------------------------------ company Salary details end --------------------------------------------------- -->
					   <!-- ------------------------------------ company details start --------------------------------------------------- -->
					   <div class="row shadow bg-white rounded margin-10 padding-15">
							<div class="row justify-content-center col-12">
								<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Company details of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>
							</div>
							 <div class="w-100"></div>
							 <div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="col">
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Name of the Company</span>
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_NAME;}?>">
									</div>
									<div class="w-100"></div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Organization Type</span>
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_TYPE;}?>">
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Company Address</span>
									</div>		
									<div class="w-100"></div>
									<div style="margin-left: 45px;  margin-top: 8px;" class="col">
										<div class="row">
											<input style="margin-top: 1px;" disabled placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1"  id="per_add_1" value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_ADRS_LINE_1;}?>" >
								            <input style="margin-top: 8px;" disabled placeholder="Address Line 2 *" class="input-cust-name" type="text" name="per_add_2"  id="per_add_2" value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_ADRS_LINE_2;}?>" >
								            <input style="margin-top: 8px;" disabled placeholder="Address Line 3 *" class="input-cust-name" type="text" name="per_add_3"  id="per_add_3" value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_ADRS_LINE_3;}?>">
										</div>					
									</div>
								</div>							  				
							</div>	
							<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="col">
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Stability Current Organization</span>
									</div>		
									<div class="w-100"></div>
									<?php if(!empty($coapplicant)){ if(empty($coapplicant->ORG_WORKED_FROM) || $coapplicant->ORG_WORKED_FROM=='' ){ $years=0;} else{$diff = abs(strtotime(date("Y-m-d")) - strtotime($coapplicant->ORG_WORKED_FROM));$years = floor($diff / (365*60*60*24));} }?>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php  echo $years;?>">
									</div>
									<div class="w-100"></div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Product / Service Offer By Organization</span>
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_INDUSTRY_OPERATING;}?>">
									</div>
								</div>							  				
							</div>	
							<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="col">
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Total Work Experience</span>
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_EXP_YEAR.' years '.$coapplicant->ORG_EXP_MONTH.' months';}?>">
									</div>
									<div class="w-100"></div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Designation </span>
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_DESIGNATION;}?>">
									</div>
								</div>							  				
							</div>	
	
					   </div>
					    <!-- ------------------------------------ company details end --------------------------------------------------- -->
						<!-- ------------------------------------ income details start --------------------------------------------------- -->
						<div class="row shadow bg-white rounded margin-10 padding-15">
							<div class="row justify-content-center col-12">
								<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Income details of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>
							</div>
							<div class="container">
								<table class="table table-responsive">
									<thead>
									<tr>
										<td><b>salary details</b></td>
										<td><b>Gross Salary</b></td>
										<td><b>EPF Deduction</b></td>
										<td> <b>Loan/ Advance Deductions</b></td>
										<td><b>Any other Deductions</b></td>
										<td><b>Net Salary</b></td>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td><b>Month 1</b></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="gross_salary_1_<?php echo $i;?>" id="gross_salary_1_<?php echo $i;?>"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_1;}?>" onkeyup="coapp_cal_avg_salary(<?php echo $i; ?>); coapp_cal_net_salary1(<?php echo $i; ?>)"></td>
										<td><input  required  class="input-cust-name"  type="number" step="any" name="epf_deduction_1_<?php echo $i; ?>" id="epf_deduction_1_<?php echo $i; ?>" value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->epf_deduction_1;}else{echo 0; }}?>" onkeyup="coapp_cal_net_salary1(<?php echo $i;?>)" ></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="loan_advance_deduction_1_<?php echo $i; ?>" id="loan_advance_deduction_1_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->loan_advance_deduction_1;}else{echo 0; } }?>" onkeyup="coapp_cal_loan_amount(<?php echo $i;?>); coapp_cal_net_salary1(<?php echo $i;?>)"></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="any_other_deduction_1_<?php echo $i;?>" id="any_other_deduction_1_<?php echo $i;?>"   value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->any_other_deduction_1;}else{echo 0; }}?>" onkeyup="coapp_cal_net_salary1(<?php echo $i;?>); coapp_cal_avg_net_salary(<?php echo $i; ?>)"></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="net_salary_1_<?php echo $i;?>" id="net_salary_1_<?php echo $i;?>"   value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->net_salary_1;}else{echo 0; }}?>" onkeyup="coapp_cal_avg_net_salary(<?php echo $i; ?>)"></td>
									  </tr>
									  <tr>
										<td><b>Month 2</b></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="gross_salary_2_<?php echo $i;?>" id="gross_salary_2_<?php echo $i;?>"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_2;}?>" onkeyup="coapp_cal_avg_salary(<?php echo $i; ?>); coapp_cal_net_salary2(<?php echo $i; ?>)"></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="epf_deduction_2_<?php echo $i; ?>" id="epf_deduction_2_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->epf_deduction_2;}else{echo 0; }}?>" onkeyup="coapp_cal_net_salary2(<?php echo $i;?>)" ></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="loan_advance_deduction_2_<?php echo $i; ?>" id="loan_advance_deduction_2_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->loan_advance_deduction_2;}else{echo 0; } }?>" onkeyup="coapp_cal_loan_amount(<?php echo $i?>); coapp_cal_net_salary2(<?php echo $i;?>)"></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="any_other_deduction_2_<?php echo $i;?>" id="any_other_deduction_2_<?php echo $i;?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->any_other_deduction_2;}else{echo 0; }}?>" onkeyup="coapp_cal_net_salary2(<?php echo $i;?>); coapp_cal_avg_net_salary(<?php echo $i; ?>)"></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="net_salary_2_<?php echo $i;?>" id="net_salary_2_<?php echo $i;?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->net_salary_2;}else{echo 0; }}?>" onkeyup="coapp_cal_avg_net_salary(<?php echo $i; ?>)"></td>
									  </tr>
									  <tr>
										<td><b>Month 3</b></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="gross_salary_3_<?php echo $i;?>" id="gross_salary_3_<?php echo $i;?>" value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_3;}?>" onkeyup="coapp_cal_avg_salary(<?php echo $i; ?>); coapp_cal_net_salary3(<?php echo $i;?>)"></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="epf_deduction_3_<?php echo $i; ?>" id="epf_deduction_3_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->epf_deduction_3;}else{echo 0; }}?>" onkeyup="coapp_cal_net_salary3(<?php echo $i;?>)"></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="loan_advance_deduction_3_<?php echo $i; ?>" id="loan_advance_deduction_3_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->loan_advance_deduction_3;}else{echo 0; } }?>" onkeyup="coapp_cal_loan_amount(<?php echo $i?>); coapp_cal_net_salary3(<?php echo $i;?>)"></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="any_other_deduction_3_<?php echo $i;?>" id="any_other_deduction_3_<?php echo $i;?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->any_other_deduction_3;}else{echo 0; }}?>" onkeyup="coapp_cal_net_salary3(<?php echo $i;?>) ; coapp_cal_avg_net_salary(<?php echo $i; ?>)"></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="net_salary_3_<?php echo $i;?>" id="net_salary_3_<?php echo $i;?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->net_salary_3;}else{echo 0; }}?>" onkeyup="coapp_cal_avg_net_salary(<?php echo $i; ?>)"></td>
									  </tr>
									   <tr>
										<td><b>Avrage salary</b></td>
										<td><input readonly required  class="input-cust-name" type="number" step="any" name="avg_salary_<?php echo $i; ?>" id="avg_salary_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->avg_salary;}else{echo 0; } }?>"></td>
										<td></td>
										<td><input readonly required  class="input-cust-name"  type="number" step="any" name="avg_loan_advance_deduction_<?php echo $i; ?>" id="avg_loan_advance_deduction_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->avg_loan_advance_deduction;}else{echo 0; }}?>"></td>
										<td></td>
										<td><input readonly required  class="input-cust-name" type="number" step="any"  name="avg_net_salary_<?php echo $i;?>" id="avg_net_salary_<?php echo $i;?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->avg_net_salary;}else{echo 0; }}?>" onkeyup="coapp_cal_avg_net_salary(<?php echo $i; ?>)"></td>
									  </tr>
									</tbody>
								</table>
							</div>
			
						</div>
						<!-- ------------------------------------ income details end --------------------------------------------------- -->
				        <?php
				 
					 }
					 else if($coapplicant->COAPP_TYPE=='self employeed')
					 {
							 ?>
							 <!-- ------------------------------------ business details start --------------------------------------------------- -->
							 <div class="row shadow bg-white rounded margin-10 padding-15" id="<?php echo $coapplicant->FN; ?>">
								<div class="row justify-content-center col-12">
									<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Business details of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>
								</div>
								<div class="w-100"></div>
								<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="col">
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Type of Company</span>
										</div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->BIS_CONSTITUTION;}?>">
										</div>
										<div class="w-100"></div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">GSTIN </span>
										</div>		
										<div class="w-100"></div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->BIS_GST;}?>">
										</div>
									</div>							  				
								</div>	
								<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="col">
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Properitor/Partner/Director</span>
										</div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->BIS_DESIGNATION;}?>">
										</div>
										<div class="w-100"></div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Years in Business </span>
										</div>		
										<div class="w-100"></div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->BIS_YEARS_IN_BIS;}?>">
										</div>					
									</div>							  				
								</div>	
								<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="col">
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">PAN</span>
										</div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->BIS_PAN;}?>">
										</div>
										<div class="w-100"></div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Nature of Business</span>
										</div>		
										<div class="w-100"></div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->BIS_NATURE_OF_BIS;}?>">
										</div>
									</div>							  				
								</div>
							</div>
						 <!-- ------------------------------------ business details end --------------------------------------------------- -->
						 <!-- ------------------------------------- income details start for ITR-------------------------------------------------------- -->
						 <?php if($coapplicant->ITR_status=="" || $coapplicant->ITR_status=="yes")
						 {
						 ?>
							<div class="row shadow bg-white rounded margin-10 padding-15">
								<div class="row justify-content-center col-12">
									<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Income details of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>
								</div>
								<div class="container">
									<table class="table table-responsive w-auto">
										<thead>
										  <tr class="d-flex">
											<td class="col-1"><b></b></td>
											<td class="col-2"><b>Gross Total Income </b></td>
											<td class="col-2"><b>Net Sales</b></td>
											<td class="col-2"><b>Gross Profit </b></td>
											<td class="col-2"><b>Interest Expense</b></td>
											<td class="col-2"><b>Depreciation</b></td>
											<td class="col-2"><b>PBT </b></td>
											<td class="col-2"><b>PAT </b></td>
											<td class="col-2"> <b>Networth</b></td>
											<td class="col-2"><b>Debt </b></td>
											<td class="col-2"><b>Working Capital(CC/OD)</b></td>
											<td class="col-2"><b>Creditors</b></td>
											<td class="col-2"><b>Fixed Assets </b></td>
											<td class="col-2"><b>Debtors</b></td>
											<td class="col-2"><b>Cash and Bank Balance</b></td>
										  </tr>
										</thead>
										<tbody>
										  <tr class="d-flex">
											<td class="col-1"><b><?php $twelveMonthsAgo = date("Y", strtotime("-36 months")); echo $twelveMonthsAgo;?></b></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Gross_Total_Income_1_<?php echo $i; ?>" id="Gross_Total_Income_1"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Gross_Total_Income_1;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Net_Sales_1_<?php echo $i; ?>" id="Net_Sales_1"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Net_Sales_1;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Gross_Profit_1_<?php echo $i; ?>" id="Gross_Profit_1"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Gross_Profit_1;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Interest_Expense_1_<?php echo $i; ?>" id="Interest_Expense_1"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Interest_Expense_1;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Depreciation_1_<?php echo $i; ?>" id="Depreciation_1"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Depreciation_1;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="PBT_1_<?php echo $i; ?>" id="PBT_1"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->PBT_1;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="PAT_1_<?php echo $i; ?>" id="PAT_1"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->PAT_1;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Networth_1_<?php echo $i; ?>" id="Networth_1"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Networth_1;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Debt_1_<?php echo $i; ?>" id="Debt_1"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Debt_1;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Working_Capital_1_<?php echo $i; ?>" id="Working_Capital_1"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Working_Capital_1;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Creditors_1_<?php echo $i; ?>" id="Creditors_1"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Creditors_1;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Fixed_Assets_1_<?php echo $i; ?>" id="Fixed_Assets_1"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Fixed_Assets_1;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Debtors_1_<?php echo $i; ?>" id="Debtors_1"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Debtors_1;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Bank_Balance_1_<?php echo $i; ?>" id="Bank_Balance_1"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Bank_Balance_1;}}?>" ></td>
										 </tr>
										   <tr class="d-flex">
											<td class="col-1"><b><?php $twelveMonthsAgo = date("Y", strtotime("-24 months")); echo $twelveMonthsAgo;?></b></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Gross_Total_Income_2_<?php echo $i; ?>" id="Gross_Total_Income_2"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Gross_Total_Income_2;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Net_Sales_2_<?php echo $i; ?>" id="Net_Sales_2"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Net_Sales_2;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Gross_Profit_2_<?php echo $i; ?>" id="Gross_Profit_2"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Gross_Profit_2;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Interest_Expense_2_<?php echo $i; ?>" id="Interest_Expense_2"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Interest_Expense_2;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Depreciation_2_<?php echo $i; ?>" id="Depreciation_2"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Depreciation_2;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="PBT_2_<?php echo $i; ?>" id="PBT_2"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->PBT_2;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="PAT_2_<?php echo $i; ?>" id="PAT_2"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->PAT_2;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Networth_2_<?php echo $i; ?>" id="Networth_2"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Networth_2;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Debt_2_<?php echo $i; ?>" id="Debt_2"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Debt_2;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Working_Capital_2_<?php echo $i; ?>" id="Working_Capital_2"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Working_Capital_2;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Creditors_2_<?php echo $i; ?>" id="Creditors_2"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Creditors_2;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Fixed_Assets_2_<?php echo $i; ?>" id="Fixed_Assets_2"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Fixed_Assets_2;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Debtors_2_<?php echo $i; ?>" id="Debtors_2"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Debtors_2;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Bank_Balance_2_<?php echo $i; ?>" id="Bank_Balance_2"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Bank_Balance_2;}}?>" ></td>
										 </tr>
										 <tr class="d-flex">
											<td class="col-1"><b><?php $twelveMonthsAgo = date("Y", strtotime("-12 months")); echo $twelveMonthsAgo;?></b></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Gross_Total_Income_3_<?php echo $i; ?>" id="Gross_Total_Income_3"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Gross_Total_Income_3;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Net_Sales_3_<?php echo $i; ?>" id="Net_Sales_3"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Net_Sales_3;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Gross_Profit_3_<?php echo $i; ?>" id="Gross_Profit_3"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Gross_Profit_3;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Interest_Expense_3_<?php echo $i; ?>" id="Interest_Expense_3"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Interest_Expense_3;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Depreciation_3_<?php echo $i; ?>" id="Depreciation_3"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Depreciation_3;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="PBT_3_<?php echo $i; ?>" id="PBT_3"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->PBT_3;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="PAT_3_<?php echo $i; ?>" id="PAT_3"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->PAT_3;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Networth_3_<?php echo $i; ?>" id="Networth_3"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Networth_3;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Debt_3_<?php echo $i; ?>" id="Debt_3"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Debt_3;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Working_Capital_3_<?php echo $i; ?>" id="Working_Capital_3"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Working_Capital_3;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Creditors_3_<?php echo $i; ?>" id="Creditors_3"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Creditors_3;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Fixed_Assets_3_<?php echo $i; ?>" id="Fixed_Assets_3"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Fixed_Assets_3;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Debtors_3_<?php echo $i; ?>" id="Debtors_3"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Debtors_3;}}?>" ></td>
											<td class="col-2"><input  required  class="input-cust-name" type="number" step="any" name="Bank_Balance_3_<?php echo $i; ?>" id="Bank_Balance_3"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Bank_Balance_3;}}?>" ></td>
										 </tr>
					   
										</tbody>
									</table>
								</div>
							 </div>
						 <?php 
						 }
						 // <!-- ------------------------------------- income details end for ITR-------------------------------------------------------- -->
						// <!-- ------------------------------------- income details start for no ITR-------------------------------------------------------- -->
					
						 else if($coapplicant->ITR_status=="no")
						 {
						 ?>
							<div class="row shadow bg-white rounded margin-10 padding-15"  id="ITR_no_div">
								<div class="row justify-content-center col-12" style="text-aline:cener;">
									<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom:3%; ">Sales Details of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" id="ITR_yes_div5">
									<div class="col" style="margin-top: 0px;">
										<span style="color: black; font-size: 17px; font-weight: bold; margin-left: 15%;"></span>
									</div>			
									<div class="w-100"></div>
	  								<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  								  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">1)&nbsp; Total Sales Value Per month</span><br>
									  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>
									  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">2)&nbsp; Sale Value per customer</span><br>
									  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
									  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">3)&nbsp; Total Customers per day</span><br>
									  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>
									  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">4)&nbsp; Total Fix client Base in the catchment</span><br>
									  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
									</div>  
   								</div>	
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
									<div class="col" style="margin-top: 0px;">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-3 month'));?></span>
									</div>			
									<div class="w-100"></div>
									<div style="margin-left: 35px; margin-top: 8px;" class="col">
										<input  style=" margin-bottom: 10px;"   placeholder="" class="input-cust-name" type="number" name="NO_itr_value_1_<?php echo $i; ?>" id="NO_itr_value_1" value="<?php  if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->sales_per_month_1; } else if(!empty($coapplicant)) { echo $coapplicant->sales_per_month_1; }?>">
										<input  style=" margin-bottom: 10px;"   placeholder="" class="input-cust-name" type="number" name="NO_itr_value_2_<?php echo $i; ?>" id="NO_itr_value_2" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->sales_per_cust_1; } else if(!empty($coapplicant)) {echo $coapplicant->sales_per_cust_1; }?>">
										<input  style=" margin-bottom: 10px;"   placeholder="" class="input-cust-name" type="number" name="NO_itr_value_3_<?php echo $i; ?>" id="NO_itr_value_3" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->cust_per_day_1; } else if(!empty($coapplicant)) { echo $coapplicant->cust_per_day_1;}?>">
										<input  style=" margin-bottom: 10px;"   placeholder="" class="input-cust-name" type="number" name="NO_itr_value_4_<?php echo $i; ?>" id="NO_itr_value_4" value="<?php  if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->total_chachement_1; } else if(!empty($coapplicant)) {echo $coapplicant->total_chachement_1;}?>">
									</div>  
								</div>	
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
									<div class="col" style="margin-top: 0px;">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-2 month'));?></span>
									</div>			
									<div class="w-100"></div>
									<div style="margin-left: 35px; margin-top: 8px;" class="col">
										<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="NO_itr_value_5_<?php echo $i; ?>" id="NO_itr_value_5" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->sales_per_month_2; } else if(!empty($coapplicant)) {echo $coapplicant->sales_per_month_2; }?>">
										<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="NO_itr_value_6_<?php echo $i; ?>" id="NO_itr_value_6" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->sales_per_cust_2; } else if(!empty($coapplicant)) {echo $coapplicant->sales_per_cust_2;}?>">
										<input  style=" margin-bottom: 10px;"   placeholder="" class="input-cust-name" type="number" name="NO_itr_value_7_<?php echo $i; ?>" id="NO_itr_value_7" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->cust_per_day_2; } else if(!empty($coapplicant)) {echo $coapplicant->cust_per_day_2;}?>">
										<input  style=" margin-bottom: 10px;"   placeholder="" class="input-cust-name" type="number" name="NO_itr_value_8_<?php echo $i; ?>" id="NO_itr_value_8" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->total_chachement_2; } else if(!empty($coapplicant)) {echo $coapplicant->total_chachement_2;}?>">
									</div>  
								</div>	
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
									<div class="col" style="margin-top: 0px;">
										<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-1 month'));?></span>
									</div>			
									<div class="w-100"></div>
									<div style="margin-left: 35px; margin-top: 8px;" class="col">
										<input  style=" margin-bottom: 10px;"    placeholder="" class="input-cust-name" type="number" name="NO_itr_value_9_<?php echo $i; ?>" id="NO_itr_value_9" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->sales_per_month_3; } else if(!empty($coapplicant)) { echo $coapplicant->sales_per_month_3;}?>">
										<input  style=" margin-bottom: 10px;"    placeholder="" class="input-cust-name" type="number" name="NO_itr_value_10_<?php echo $i; ?>" id="NO_itr_value_10" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->sales_per_cust_3; } else if(!empty($coapplicant)){ echo $coapplicant->sales_per_cust_3;}?>">
	  									<input  style=" margin-bottom: 10px;"   placeholder="" class="input-cust-name" type="number" name="NO_itr_value_11_<?php echo $i; ?>" id="NO_itr_value_11" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->cust_per_day_3; } else if(!empty($coapplicant)) {echo $coapplicant->cust_per_day_3;}?>">
	  									<input  style=" margin-bottom: 10px;"    placeholder="" class="input-cust-name" type="number" name="NO_itr_value_12_<?php echo $i; ?>" id="NO_itr_value_12" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->total_chachement_3; } else if(!empty($coapplicant)){echo $coapplicant->total_chachement_3;}?>">
	  								</div>  
	  							</div>	
								<div class="row justify-content-center col-12" style="text-aline:cener;">
									<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom:3%; ">Final derivations of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>
								</div>
								<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12" ></div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >
									<div class="col" style="margin-top: 0px;">
										<span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"></span>
									</div>			
									<div class="w-100"></div>
									<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  									  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">1)&nbsp; Total Annual TO</span><br>
										  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>
										  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">2)&nbsp; Total Gross Margin (in %)</span><br>
										  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
										  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">3)&nbsp; Total Profit</span><br>
										  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
										  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">4)&nbsp; Total Expenses- Utilities (in amount)</span><br>
										  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>
										  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">5)&nbsp; Total Expenses- Salaries (in amount)</span><br>
										  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  
										  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">6)&nbsp; Total Expenses- Rentals (in amount)</span><br>
										  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
										  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">7)&nbsp; Total Additional recurring expenses (in amount)</span><br>
										  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
										  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;">8)&nbsp; Gross Profit</span><br>
										  <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;margin-bottom: 10px;margin-top: 10px;"></span><br>  				
			       					</div>  
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
									<div class="col" style="margin-top: 0px;">
										<span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"></span>
									</div>			
									<div class="w-100"></div>
									<div style="margin-left: 35px; margin-top: 8px;" class="col">	
	  									<input  min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_annual_<?php echo $i; ?>" id="total_annual" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->total_anual; } else if(!empty($coapplicant)) {echo $coapplicant->total_anual;}?>">
	  									<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_gross_margin_<?php echo $i; ?>" id="total_gross_margin" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->total_gross_margin; } else if(!empty($coapplicant)) {echo $coapplicant->total_gross_margin; }?>">
	  									<input  min="0" style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_profit_<?php echo $i; ?>" id="total_profit" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->total_profit; } else if(!empty($coapplicant)) { echo $coapplicant->total_profit;}?>">
	  									<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_expenses_utilities_<?php echo $i; ?>" id="total_expenses_utilities" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->total_utilities; } else if(!empty($coapplicant)) { echo $coapplicant->total_utilities;}?>">
	  									<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_expenses_salaries_<?php echo $i; ?>" id="total_expenses_salaries" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->total_salaries; } else if(!empty($coapplicant)) {echo $coapplicant->total_salaries;}?>">
	  									<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_expenses_rentals_<?php echo $i; ?>" id="total_expenses_rentals" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->total_rental; } else if(!empty($coapplicant)){ echo $coapplicant->total_rental; }?>">
	  									<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_additional_recurring_expenses_<?php echo $i; ?>" id="total_additional_recurring_expenses" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->total_recurring; } else if(!empty($coapplicant)) { echo $coapplicant->total_recurring ;}?>">
	  									<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="gross_profit_<?php echo $i; ?>" id="gross_profit" value="<?php if(!empty($coapp_data_credit_analysis_array)) { if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapplicant->gross_profit; } else if(!empty($coapplicant)){ echo $coapplicant->gross_profit; }?>">
	  								</div>  
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" ></div>
							</div>
						 <?php 
						 } 
						 // <!-- ------------------------------------- income details end for no ITR-------------------------------------------------------- -->
					
						 ?>
						 <!-- ------------------------------------- income details end --------------------------------------------------------- -->
						 <!-- -------------------------------------Top 3 Debtors And Creditors start --------------------------------------------------------- -->
						 <div class="row shadow bg-white rounded margin-10 padding-15">
							<div class="row justify-content-center col-12">
								<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Top 3 Debtors And Creditors of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?> <span>
							</div>
							<div class="container" >
								<table class="table table-responsive">
					
									<tbody>
									  <tr>
										<td><b>Creditor 1</b></td>
						
						
										<td><label>Name of creditor : </label><input  required  class="input-cust-name" type="text" name="Top_Creditors_1_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Creditors_1;}}?>"></td>
										<td><label>Amount : </label><input  required  class="input-cust-name"  type="number" step="any" name="Top_Creditors_1_Amt_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Creditors_1_Amt;}}?>"></td>
										<td><b>Debtor 1</b></td>
										<td><label>Name of debtor: </label><input  required  class="input-cust-name" type="text" name="Top_Debtors_1_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Debtors_1;}}?>"></td>
										<td><label>Amount : </label><input  required  class="input-cust-name"  type="number" step="any" name="Top_Debtors_1_Amt_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Debtors_1_Amt;}}?>"></td>
						
									  </tr>
									   <tr>
										<td><b>Creditor 2 </b></td>
										<td><label>Name of creditor : </label><input  required  class="input-cust-name" type="text" name="Top_Creditors_2_<?php echo $i; ?>" value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Creditors_2;}}?>"></td>
										<td><label>Amount : </label><input  required  class="input-cust-name"  type="number" step="any" name="Top_Creditors_2_Amt_<?php echo $i; ?>" value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Creditors_2_Amt;}}?>"></td>
										<td><b>Debtors 2</b></td>
										<td><label>Name of debtor : </label><input  required  class="input-cust-name" type="text" name="Top_Debtors_2_<?php echo $i; ?>" value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Debtors_2;}}?>"></td>
										<td><label>Amount : </label><input  required  class="input-cust-name"  type="number" step="any" name="Top_Debtors_2_Amt_<?php echo $i; ?>" value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Debtors_2_Amt;}}?>"></td>
									  </tr>
									   <tr>
										<td><b>Creditor 3</b></td>
										<td> <label>Name of creditor : </label><input  required  class="input-cust-name" type="text" name="Top_Creditors_3_<?php echo $i; ?>" value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Creditors_3;}}?>"></td>
										<td><label>Amount : </label><input  required  class="input-cust-name"  type="number" step="any" name="Top_Creditors_3_Amt_<?php echo $i; ?>" value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Creditors_3_Amt;}}?>" ></td>
										<td><b>Debtors</b></td>
										<td><label>Name of debtor : </label><input  required  class="input-cust-name" type="text" name="Top_Debtors_3_<?php echo $i; ?>" value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Debtors_3;}}?>" ></td>
										<td><label>Amount : </label><input  required  class="input-cust-name"  type="number" step="any" name="Top_Debtors_3_Amt_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->Top_Debtors_2_Amt;}}?>"></td>
									  </tr>
					  
									</tbody>
								</table>
							</div>
						</div>

						 <!-- -------------------------------------Top 3 Debtors And Creditors  end --------------------------------------------------------- -->


						 <?php
					 }
					 else if($coapplicant->COAPP_TYPE=='retired')
					 {
					 ?>
					  <!-- ------------------------------------- income details start --------------------------------------------------------- -->
					     <div class="row shadow bg-white rounded margin-10 padding-15" id="<?php echo $coapplicant->FN; ?>">
							<div class="row justify-content-center col-12">
								<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Income details of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>
							</div>
							<div class="container">
								<table class="table table-responsive">
									<thead>
									  <tr>
										<td><b>Monthly Income</b></td>
										<td><b>Amount</b></td>
									  </tr>
									</thead>
									<tbody>
									  <tr>
										<td><b><?php echo date("F",strtotime("-3 Months"))?></b></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="gross_salary_1_<?php echo $i;?>" id="gross_salary_1_<?php echo $i;?>"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_1;}?>" onkeyup="coapp_cal_avg_salary(<?php echo $i; ?>); coapp_cal_net_salary1(<?php echo $i; ?>)"></td>
				
									</tr>
									  <tr>
										<td><b><?php echo date("F",strtotime("-2 Months"))?></b></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="gross_salary_2_<?php echo $i;?>" id="gross_salary_2_<?php echo $i;?>"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_2;}?>" onkeyup="coapp_cal_avg_salary(<?php echo $i; ?>); coapp_cal_net_salary2(<?php echo $i; ?>)"></td>
				  
									</tr>
									  <tr>
										<td><b><?php echo date("F",strtotime("-1 Months"))?></b></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="gross_salary_3_<?php echo $i;?>" id="gross_salary_3_<?php echo $i;?>" value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_3;}?>" onkeyup="coapp_cal_avg_salary(<?php echo $i; ?>); coapp_cal_net_salary3(<?php echo $i;?>)"></td>
									</tr>
									   <tr>
										<td><b>Avrage salary</b></td>
										<td><input readonly required  class="input-cust-name" type="number" step="any" name="avg_salary_<?php echo $i; ?>" id="avg_salary_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->avg_salary;}else{echo 0; } }?>"></td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
					 <!-- ------------------------------------- income details end --------------------------------------------------------- -->
						
					 <?php
					 }

					 ?>
					 <!-- -------------------------------------- obligation details start------------------------------------------------------ -->
					 	<div class="row shadow bg-white rounded margin-10 padding-15">
							<div class="row justify-content-center col-12">
								<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Obligations details of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>
							</div>
							<div class="container" >
								<div class="justify-content-center">
									<table class="table table-responsive justify-content-center">
										<thead>
										  <tr>
											<td></td>
											<td><b>Active Loans </b></td>
											<td><b>Loan Type</b></td>
											<td><b>Loan Amount</b></td>
											<td><b>Balance Amount</b></td>
											<td><b>EMI</b></td>
										  </tr>
										</thead>
										<tbody>
										<?php
											foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
											{
												$no=1;
												if($coapp_data_obligations['Open']=='Yes')
												{
												//if(isset($coapp_data_obligations['InstallmentAmount']))
												//{
												 ?>
												 <tr>
													<td><b></b></td>
													<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_obligations)){echo $coapp_data_obligations['Institution'];}?>"></td>
													<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_obligations)){echo $coapp_data_obligations['AccountType'];}?>"></td>
														<?php 
													if($coapp_data_obligations['AccountType']=="Credit Card" || $coapp_data_obligations['AccountType']=="Secured Credit Card")
													{
                                                		if(isset($coapp_data_obligations['CreditLimit']))
														{
														 ?>
															<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_obligations)){echo $coapp_data_obligations['CreditLimit'];}?>"></td>
														<?php
														}
														else
														{
															if(isset($data_obligation['SanctionAmount']))
															{
														 ?>
															<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){echo $data_obligation['SanctionAmount'];}?>"></td>
															 <?php
															}
															else
															{
															?>
															<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){echo "0";}?>"></td>
															<?php
															}
															?>
															<?php
														}
													}
													else
													{
													?>
														<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_obligations['SanctionAmount'])){echo $coapp_data_obligations['SanctionAmount'];}?>"></td>
													<?php }
												?>
												<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_obligations['Balance'])){echo $coapp_data_obligations['Balance'];}?>"></td>
												<?php if(isset($coapp_data_obligations['InstallmentAmount']))
												{
												?>
													 <td><input disabled required name="installment_"<?php  echo $i; ?> class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_obligations)){ echo $coapp_data_obligations['InstallmentAmount'];}?>"></td>
												<?php
												}
												else if(isset($coapp_data_obligations['SanctionAmount']))
												{
												?>
													 <td><input disabled required name="installment_"<?php  echo $i; ?> class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_obligations)){ echo 0;}?>"></td>
												 <?php
												}
												else if(isset($coapp_data_obligations['CreditLimit']))
												{
													?>
													<td><input disabled required name="installment_"<?php  echo $i; ?> class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_obligations)){ echo 0;}?>"></td>
												<?php
												}
												else
												{
													?>
													<td><input disabled required name="installment_"<?php  echo $i; ?> class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_obligations)){ echo "0" ;}?>"></td>
												<?php
												}
												?>
											</tr>
											<?php  $no++; //}
											}
								
										}
									?>
										<tr>
										<td>Total</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<?php $total_2=0;
											foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
											{
												$no=1;
												if($coapp_data_obligations['Open']=='Yes')
												{
													if(isset($coapp_data_obligations['InstallmentAmount']))
													{
														$total_2=$total_2+$coapp_data_obligations['InstallmentAmount'];
													}
													else if(isset($coapp_data_obligations['SanctionAmount']))
													{
														$total_2=$total_2+(0);
													}
													else if(isset($coapp_data_obligations['CreditLimit']))
													{
														$total_2=$total_2+(0);
													}
													else
													{
														$total_2=$total_2+0;
													}


												}
											}
												?>
											
											<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php echo $total_2;?>"></td>
											
										  </tr>
					 					</tbody>
									</table>
								</div>
							</div>
	                    </div>
					 <!-- -------------------------------------- obligation details end ------------------------------------------------------- -->
					 <!-- ------------------------------------------------additional emi start------------------------------------------------------ -->
					 <div class="row shadow bg-white rounded margin-10 padding-15">
							<div class="row justify-content-center col-12">
								<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Additional EMI Details of<?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>
							</div>
							<div class="container" >
										<div class="justify-content-center">
										
											<table class="table table-responsive justify-content-center">
												<thead>
												  <tr>
												
													<td><b>Active Loans (Bank Name)</b></td>
													<td><b>Loan Type</b></td>
													<td><b>Loan Amount/Credit Limit</b></td>
													<td><b>Balance Amount</b></td>
													<td><b>EMI</b></td>
													<td></td>
												  </tr>
												</thead>
												<tbody id="Add_emi_<?php echo $i; ?>" class="Add_emi_coapp">
											
												<?php if(!empty($coapp_data_credit_analysis_array[$i]->Additional_Emi))
												{ 
											       
													
                 									$j=1;
													$reference_array=json_decode($coapp_data_credit_analysis_array[$i]->Additional_Emi,true);
													$count=count($reference_array);
													
													if(!empty($reference_array))
													{
													  foreach($reference_array as $value)
													  {
														  if($j==$count)
														  {
															  
														if(!empty($value['Active_laon_1']))
														{ 
													?>
								
														<tr>
													
														<td><input    class="input-cust-name" type="text" name="Active_laon_1_<?php echo $i; ?>[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Active_laon_1']; } ?> ></td>
														<td><input    class="input-cust-name" type="text" name="Type_of_Loan_1_<?php echo $i; ?>[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Type_of_Loan_1']; } ?> ></td>
														<td><input    class="input-cust-name" type="number" name="Loan_Amount_1_<?php echo $i; ?>[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Loan_Amount_1']; } ?>></td>
														<td><input    class="input-cust-name" type="number" name="Balance_Amount_1_<?php echo $i; ?>[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Balance_Amount_1']; } ?>></td>
													    <td><input    class="input-cust-name emi_total_<?php echo $i; ?>" type="number"   name="EMI_1_<?php echo $i; ?>[]" onkeyup="calculateSumcoapp(<?php echo $i; ?>)"  <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['EMI_1']; } ?> ></td>
														<td><div style="color: blue;margin-top: 0px;" class="add-more add_row_coapp" type="button" id="<?php echo $i; ?>"> Add More</div><td>
														</tr>
														<?php 
														}
														  }
														  else
														  {
															if(!empty($value['Active_laon_1']))
																{
																  ?>
										
																	<tr>
																
																	<td><input    class="input-cust-name" type="text" name="Active_laon_1_<?php echo $i; ?>[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Active_laon_1']; } ?> ></td>
														<td><input    class="input-cust-name" type="text" name="Type_of_Loan_1_<?php echo $i; ?>[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Type_of_Loan_1']; } ?> ></td>
														<td><input    class="input-cust-name" type="number" name="Loan_Amount_1_<?php echo $i; ?>[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Loan_Amount_1']; } ?>></td>
														<td><input    class="input-cust-name" type="number" name="Balance_Amount_1_<?php echo $i; ?>[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Balance_Amount_1']; } ?>></td>
                                                      <td><input    class="input-cust-name emi_total_<?php echo $i; ?>" type="number"   name="EMI_1_<?php echo $i; ?>[]" onkeyup="calculateSumcoapp(<?php echo $i; ?>)"  <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['EMI_1']; } ?>></td>
																	
																	</tr>
																  <?php
																  }
																  else
																  {?>
																	    <td><input    class="input-cust-name" type="text" name="Active_laon_1_<?php echo $i; ?>[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Active_laon_1']; } ?> ></td>
																		<td><input    class="input-cust-name" type="text" name="Type_of_Loan_1_<?php echo $i; ?>[]" ></td>
																		<td><input    class="input-cust-name" type="number" name="Loan_Amount_1_<?php echo $i; ?>[]" ></td>
																		<td><input    class="input-cust-name" type="number" name="Balance_Amount_1_<?php echo $i; ?>[]" ></td>
																		<td><input    class="input-cust-name emi_total_<?php echo $i; ?>" type="number"   name="EMI_1_<?php echo $i; ?>[]" onkeyup="calculateSumcoapp(<?php echo $i; ?>)"  ></td>
																		<td><div style="color: blue;margin-top: 0px;" class="add-more add_row_coapp" type="button" id="<?php echo $i; ?>"> Add More</div><td>
																<?php  }
														  }
														$j++;
													  }
													}
												}else{
												?>
												<tr>
													
														<td><input    class="input-cust-name" type="text" name="Active_laon_1_<?php echo $i; ?>[]" <?php if(!empty($value['Active_laon_1'])) { echo "value =" .$value['Active_laon_1']; } ?> ></td>
														<td><input    class="input-cust-name" type="text" name="Type_of_Loan_1_<?php echo $i; ?>[]" ></td>
														<td><input    class="input-cust-name" type="number" name="Loan_Amount_1_<?php echo $i; ?>[]" ></td>
														<td><input    class="input-cust-name" type="number" name="Balance_Amount_1_<?php echo $i; ?>[]" ></td>
														<td><input    class="input-cust-name emi_total_<?php echo $i; ?>" type="number"   name="EMI_1_<?php echo $i; ?>[]" onkeyup="calculateSumcoapp(<?php echo $i; ?>)"  ></td>
														<td><div style="color: blue;margin-top: 0px;" class="add-more add_row_coapp" type="button" id="<?php echo $i; ?>"> Add More</div><td>
														</tr>
												<?php } ?>
												</tbody>
												<tr>
																		<td>Total</td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td><input readonly class="input-cust-name" type="text" name="Additinal_emi_total" id="Additional_Emi_Total_<?php echo $i; ?>" value="<?php if(!empty($coapp_data_credit_analysis_array[$i]->Aditional_Emi_Total)){ echo $coapp_data_credit_analysis_array[$i]->Aditional_Emi_Total; } else{echo 0.00; }?>"></td>
												</tr>
											</table>
										</div>
							</div>
						</div>
						<!-- ------------------------------------------------additional emi end------------------------------------------------------ -->
					 <!-- -------------------------------------- bureau analysis start -------------------------------------------------------------- -->
					 	<?php if(!empty($coapp_credit_score_array))
							{ 
								if(!empty($coapp_credit_score_array[$i]))
								{
						?>
						    <div class="row shadow bg-white rounded margin-10 padding-15">
								<div class="row justify-content-center col-12">
									<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Bureau analysis of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>
								</div>
								 <div class="w-100"></div>
								 <div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="col">
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Score</span>
										</div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_credit_score_array)){ if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']))echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];}?>">
										</div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address Match with Aadhar</span>
										</div>			
										<div class="w-100"></div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<div class="input-cust-name" style=" margin-top: 8px;" >
												<div class="row">
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														<input  disabled type="radio" name="add_verify" value="true" <?php if(!empty($coapp_add_flag)){ if(!empty($coapp_add_flag[$i])){if ($address_flag== 'true') echo ' checked="true"';} }?>> Yes
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
													<div class="dis">
														<input disabled type="radio" name="add_verify" value="false" <?php if(!empty($coapp_add_flag)){ if(!empty($coapp_add_flag[$i])){if ($address_flag== 'false') echo ' checked="true"'; }}?>> No
													</div>
								</div>
												</div>						
											</div>  	
										</div> 
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Total Sanction Amount</span>
										</div>		
										<div class="w-100"></div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<input disabled required  class="input-cust-name" type="text" name="dob" value="<?php //if(!empty($coapp_credit_score_array)){ echo  $TotalSanctionAmount; }?>">
										</div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Enquiry Summary</span>
										</div>
										<?php
										if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']))
										{
										if(!empty($coapp_credit_score_array))
											{
												$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary'];
												foreach($data_Enquiry as $key => $value)
												{ ?>
													<div style="margin-left: 55px;  margin-top: 8px;" class="col">
													<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "><?php echo $key; ?></span>
													</div>		
													<div class="w-100"></div>
									
													<div style="margin-left: 55px;  margin-top: 8px;" class="col">
														<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php echo $value; ?>">
													</div>
										<?php	 
												}
											 }
										}
										?>
									</div>							  				
								</div>	
								<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="col">
										
										<div class="w-100"></div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">No of Active loan Accounts</span>
										</div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_credit_score_array)) if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData'])){  if(!empty($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'])){ echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts']; }}?>">
										</div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of Write off accounts</span>
										</div>		
										<div class="w-100"></div>
							
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_credit_score_array)) if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData'])) { if(!empty($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'])){ echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfWriteOffs'];} }?>">
										</div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Recent Activity</span>
										</div>
										<?php
									     if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']))
										 {
										if(!empty($coapp_credit_score_array))
										   {
											 $data_Recent=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities'];
											foreach($data_Recent as $key => $value)
											{ ?>
												<div style="margin-left: 55px;  margin-top: 8px;" class="col">
													<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "><?php echo $key; ?></span>
												</div>		
												<div class="w-100"></div>
									
												<div style="margin-left: 55px;  margin-top: 8px;" class="col">
													<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php echo $value; ?>">
												</div>
											<?php	 
											}
										   }
										 }
										?>


							
							
									</div>							  				
								</div>	
								<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="col">
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Number of Loan Accounts</span>
										</div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_credit_score_array)) if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData'])){  if(!empty($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'])){echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts'];}}?>">
										</div>
							
										<div class="w-100"></div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Total loan Balance</span>
										</div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_credit_score_array)) if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData'])){  if(!empty($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'])){echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount'];}}?>">
										</div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">No of past due accounts</span>
										</div>
										<div style="margin-left: 35px;  margin-top: 8px;" class="col">
											<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_credit_score_array)) if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData'])) {  if(!empty($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'])){echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfPastDueAccounts'];}}?>">
										</div>
									</div>							  				
								</div>	
						    </div>
						<?php
								}
							}
						?>
					 <!-- -------------------------------------- bureau analysis end --------------------------------------------------------------- -->
					 <!-- -------------------------------------- bank statement  details start ------------------------------------------------------- -->
						<div class="row shadow bg-white rounded margin-10 padding-15">
							<div class="row justify-content-center col-12">
								<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Bank statement analysis of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>
							</div>
							<div class="container">
								<table class="table table-responsive">
									<tbody>
									  <tr>
										<td><b>Avrage Balance</b></td>
										<td><input  required  class="input-cust-name" type="number" step="any" type="text" name="b_s_avg_balance_<?php echo $i; ?>"   value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->b_s_avg_balance;}}?>"></td>
										<td><b>Total Credits</b></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="b_s_total_credits_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_total_credits;}}?>"></td>
										<td><b>Total Debits</b></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="b_s_total_debits_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_total_debits;}}?>"></td>
									  </tr>
									  <tr >
										<td><b>Credit Analysis</b></td>
										<td><b>Salary</b></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="b_s_salary_<?php echo $i; ?>"	  value="<?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_salary;}}?>"></td>
										<td><b>Reimbursements</b></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="b_s_reimbursements_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_reimbursements;}}?>"></td>
										<td></td>
									  </tr>
									  <tr>
										<td><b>Debit Analysis</b></td>
										<td><b>Household</b></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="b_s_houshold_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_houshold;}}?>"></td>
										<td><b>EMI</b></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="b_s_emi_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->b_s_emi;}}?>"></td>
										<td><b>Charges</b></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="b_s_charges_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_charges;}}?>"></td>
										<td><b>Cheque Bounce Charges</b></td>
										<td><input  required  class="input-cust-name" type="number" step="any" name="b_s_cheque_bounce_charges_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->b_s_cheque_bounce_charges;}}?>"></td>
									  </tr>
									  <tr>
												 <input readonly  hidden  class="input-cust-name" type="text" name="COAPP_ID_<?php echo $i;?>"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->UNIQUE_CODE;}?>">
												<input readonly hidden   class="input-cust-name" type="text" name="COAPP_TYPE_<?php echo $i;?>"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->COAPP_TYPE;}?>">
							
									  </tr>
									</tbody>
								</table>
							</div>
								<div class="row justify-content-center col-12">
									<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Do You Want To Consider <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?>  Details Into Eligibility Calculations ?</span>
								</div>	
								<div class="row justify-content-center col-12">
									<div class="col-sm-3"></div>
									<div class="col-sm-6">
										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-4">
											<div class="form-check">
  												<input class="form-check-input" type="radio" name="consider_coapplicant_<?php echo $i;?>" value="yes" checked>
 												 <label class="form-check-label" for="flexRadioDefault1">
   													 Yes
  												</label>
											</div>
											</div>
											<div class="col-sm-4">
											<div class="form-check">
  												<input class="form-check-input" type="radio" name="consider_coapplicant_<?php echo $i;?>" value="no" >
  												<label class="form-check-label" for="flexRadioDefault2">
    												No
  												</label>
											</div>
											</div>
											<div class="col-sm-2"></div>
										</div>
									</div>
									<div class="col-sm-3"></div>
								</div>
						</div>
			
					 <!-- -------------------------------------- bank statement details end ------------------------------------------------------- -->
					
					 <?php

				 }
				?>
				 
				


		<?php 
		$i++;
		}
		?>
		<!-- Co Applicant details end @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
			<div class="row shadow bg-white rounded margin-10 padding-15" >
				<div class="row col-12 justify-content-center">
					<div>
					<a href="<?php echo base_url()?>index.php/Operations_user/Other_attributes">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							NEXT
						</button></a>
					</div>		
				</div>					
			</div>
		
		
    </form>
	<!-- ************************************* footer ***************************************************************************************************** -->
	<script>
	$(document).ready(function(){
		var sum=0;
		$(".emi_total").each(function() {
				//add only if the value is number
				if (!isNaN(this.value) && this.value.length != 0) {
					
					sum += parseFloat(this.value);
					
				}
				else if (this.value.length != 0){
					
				}
			});
			console.log( sum );
			$("input#Additional_Emi_Total").val(sum.toFixed(2));
		   var salary=parseFloat(document.getElementById('credit_salary').value);
		   var obligations=parseFloat(document.getElementById('obligations').value);
		   var foir=obligations/salary*100;
		   if(foir=='NaN')
		   {
			    document.getElementById('foir').value='';
		   }
		   else{
		   document.getElementById('foir').value=foir +'%';
		   }
		  
		  var salary1=parseFloat(document.getElementById('gross_salary_1').value);
		  var salary2=parseFloat(document.getElementById('gross_salary_2').value);
		  var salary3=parseFloat(document.getElementById('gross_salary_3').value);
		  var avg_sal=(salary1+salary2+salary3)/3;
		  document.getElementById('avg_salary').value=avg_sal;
		  
		 var salary1=parseFloat(document.getElementById('gross_salary_1').value);
		 var loan_advance_deduction_1=parseFloat(document.getElementById('loan_advance_deduction_1').value);
		 var epf_deduction_1=parseFloat(document.getElementById('epf_deduction_1').value);
		 var any_other_deduction_1=parseFloat(document.getElementById('any_other_deduction_1').value);
		 var net_salary_1=salary1-loan_advance_deduction_1-epf_deduction_1-any_other_deduction_1;
		 document.getElementById('net_salary_1').value=net_salary_1;
		 
		 var salary2=parseFloat(document.getElementById('gross_salary_2').value);
		 var loan_advance_deduction_2=parseFloat(document.getElementById('loan_advance_deduction_2').value);
		 var epf_deduction_2=parseFloat(document.getElementById('epf_deduction_2').value);
		 var any_other_deduction_2=parseFloat(document.getElementById('any_other_deduction_2').value);
		 var net_salary_2=salary2-loan_advance_deduction_2-epf_deduction_2-any_other_deduction_2;
		 document.getElementById('net_salary_2').value=net_salary_2;
		 
		 var salary3=parseFloat(document.getElementById('gross_salary_3').value);
		 var loan_advance_deduction_3=parseFloat(document.getElementById('loan_advance_deduction_3').value);
		 var epf_deduction_3=parseFloat(document.getElementById('epf_deduction_3').value);
		 var any_other_deduction_3=parseFloat(document.getElementById('any_other_deduction_3').value);
		 var net_salary_3=salary3-loan_advance_deduction_3-epf_deduction_3-any_other_deduction_3;
		 document.getElementById('net_salary_3').value=net_salary_3;
		 
		  var loan_advance_deduction_1=parseFloat(document.getElementById('loan_advance_deduction_1').value);
		  var loan_advance_deduction_2=parseFloat(document.getElementById('loan_advance_deduction_2').value);
		  var loan_advance_deduction_3=parseFloat(document.getElementById('loan_advance_deduction_3').value);
		  var avg_loan_advance_deduction=loan_advance_deduction_1+loan_advance_deduction_2+loan_advance_deduction_3/3;
		  document.getElementById('avg_loan_advance_deduction').value=avg_loan_advance_deduction;
		  
		 var net_salary_1=parseFloat(document.getElementById('net_salary_1').value);
		 var net_salary_2=parseFloat(document.getElementById('net_salary_2').value);
		 var net_salary_3=parseFloat(document.getElementById('net_salary_2').value);
		 var avg_net_salary=net_salary_2+net_salary_3+net_salary_1/3;
		 document.getElementById('avg_net_salary').value=avg_net_salary;
		 cal_tot_sales_cash();
		 cal_total_income_1();
		 cal_tot_purchase_cash();
		 cal_tot_sales_bank();
		 cal_tot_purchase_bank();
		 cal_tot_labour_paid();
		 cal_tot_Transport_charges();
		 cal_tot_Other_charges();
		 cal_total_income_2();
		 cal_total_income_3();
		 cal_total_income_4();
		 cal_total_income_5();
		 cal_total_income_6();
		
		 
		 
		  
		
		
		});
	 function cal_avg_salary()
	 {
		  var salary1=parseFloat(document.getElementById('gross_salary_1').value);
		  //alert(salary1);
		  var salary2=parseFloat(document.getElementById('gross_salary_2').value);
		  var salary3=parseFloat(document.getElementById('gross_salary_3').value);
		  var avg_sal=(salary1+salary2+salary3)/3;
		  document.getElementById('avg_salary').value=avg_sal;
		  
		 
	 }
	 function cal_avg_net_sal()
	 {
		  var salary1=parseFloat(document.getElementById('net_salary_1').value);
		 // alert(salary1);
		  var salary2=parseFloat(document.getElementById('net_salary_2').value);
		  var salary3=parseFloat(document.getElementById('net_salary_3').value);
		  var avg_sal=(salary1+salary2+salary3)/3;
		  document.getElementById('avg_net_salary').value=avg_sal;
		  
		 
	 }
	  function cal_tot_sales_cash()
	 {
		  var salary1=parseFloat(document.getElementById('Sales_cash_1').value);
		  var salary2=parseFloat(document.getElementById('Sales_cash_2').value);
		  var salary3=parseFloat(document.getElementById('Sales_cash_3').value);
		  var salary4=parseFloat(document.getElementById('Sales_cash_4').value);
		  var salary5=parseFloat(document.getElementById('Sales_cash_5').value);
		  var salary6=parseFloat(document.getElementById('Sales_cash_6').value);
		  var avg_sal=salary1+salary2+salary3+salary4+salary5+salary6;
		  document.getElementById('Total_Sales_cash').value=avg_sal;
		  
		 
	 }
	   function cal_tot_purchase_cash()
	 {
		  var salary1=parseFloat(document.getElementById('Purchase_cash_1').value);
		  var salary2=parseFloat(document.getElementById('Purchase_cash_2').value);
		  var salary3=parseFloat(document.getElementById('Purchase_cash_3').value);
		  var salary4=parseFloat(document.getElementById('Purchase_cash_4').value);
		  var salary5=parseFloat(document.getElementById('Purchase_cash_5').value);
		  var salary6=parseFloat(document.getElementById('Purchase_cash_6').value);
		  var avg_sal=salary1+salary2+salary3+salary4+salary5+salary6;
		  document.getElementById('Total_Purchase_cash').value=avg_sal;
		  
		 
	 }
	   function cal_tot_purchase_bank()
	 {
		  var salary1=parseFloat(document.getElementById('Purchase_bank_1').value);
		  var salary2=parseFloat(document.getElementById('Purchase_bank_2').value);
		  var salary3=parseFloat(document.getElementById('Purchase_bank_3').value);
		  var salary4=parseFloat(document.getElementById('Purchase_bank_4').value);
		  var salary5=parseFloat(document.getElementById('Purchase_bank_5').value);
		  var salary6=parseFloat(document.getElementById('Purchase_bank_6').value);
		  var avg_sal=salary1+salary2+salary3+salary4+salary5+salary6;
		  document.getElementById('Total_Purchase_bank').value=avg_sal;
		  
		 
	 }
	 function cal_tot_sales_bank()
	 {
		  var salary1=parseFloat(document.getElementById('Sales_bank_1').value);
		  var salary2=parseFloat(document.getElementById('Sales_bank_2').value);
		  var salary3=parseFloat(document.getElementById('Sales_bank_3').value);
		  var salary4=parseFloat(document.getElementById('Sales_bank_4').value);
		  var salary5=parseFloat(document.getElementById('Sales_bank_5').value);
		  var salary6=parseFloat(document.getElementById('Sales_bank_6').value);
		  var avg_sal=salary1+salary2+salary3+salary4+salary5+salary6;
		  document.getElementById('Total_Sales_bank').value=avg_sal;
		  
		 
	 }
	 function cal_tot_labour_paid()
	 {
		  var salary1=parseFloat(document.getElementById('Labour_paid_1').value);
		  var salary2=parseFloat(document.getElementById('Labour_paid_2').value);
		  var salary3=parseFloat(document.getElementById('Labour_paid_3').value);
		  var salary4=parseFloat(document.getElementById('Labour_paid_4').value);
		  var salary5=parseFloat(document.getElementById('Labour_paid_5').value);
		  var salary6=parseFloat(document.getElementById('Labour_paid_6').value);
		  var avg_sal=salary1+salary2+salary3+salary4+salary5+salary6;
		  document.getElementById('Total_Labour_paid').value=avg_sal;
		  
		 
	 }
	 function cal_tot_Transport_charges()
	 {
		  var salary1=parseFloat(document.getElementById('Transport_charges_1').value);
		  var salary2=parseFloat(document.getElementById('Transport_charges_2').value);
		  var salary3=parseFloat(document.getElementById('Transport_charges_3').value);
		  var salary4=parseFloat(document.getElementById('Transport_charges_4').value);
		  var salary5=parseFloat(document.getElementById('Transport_charges_5').value);
		  var salary6=parseFloat(document.getElementById('Transport_charges_6').value);
		  var avg_sal=salary1+salary2+salary3+salary4+salary5+salary6;
		  document.getElementById('Total_Transport_charges').value=avg_sal;
		  
		 
	 }
	  function cal_tot_Other_charges()
	 {
		  var salary1=parseFloat(document.getElementById('Other_charges_1').value);
		  var salary2=parseFloat(document.getElementById('Other_charges_2').value);
		  var salary3=parseFloat(document.getElementById('Other_charges_3').value);
		  var salary4=parseFloat(document.getElementById('Other_charges_4').value);
		  var salary5=parseFloat(document.getElementById('Other_charges_5').value);
		  var salary6=parseFloat(document.getElementById('Other_charges_6').value);
		  var avg_sal=salary1+salary2+salary3+salary4+salary5+salary6;
		  document.getElementById('Total_Other_charges').value=avg_sal;
		  
		 
	 }
	  function cal_total_income_1()
	 {
		  var salary1=parseFloat(document.getElementById('Sales_cash_1').value);
		 
		  var salary2=parseFloat(document.getElementById('Purchase_bank_1').value);
		  var salary3=parseFloat(document.getElementById('Sales_bank_1').value);
		  var salary4=parseFloat(document.getElementById('Labour_paid_1').value);
		  var salary5=parseFloat(document.getElementById('Transport_charges_1').value);
		  var salary6=parseFloat(document.getElementById('Other_charges_1').value);
		  var salary7=parseFloat(document.getElementById('Purchase_cash_1').value);
		  var avg_sal=salary1+salary3-salary2-salary7-salary6-salary4-salary5;
		  document.getElementById('Total_income_1').value=avg_sal;
		  var salary1=parseFloat(document.getElementById('Total_income_1').value);
		  var salary2=parseFloat(document.getElementById('Total_income_2').value);
		  var salary3=parseFloat(document.getElementById('Total_income_3').value);
		  var salary4=parseFloat(document.getElementById('Total_income_4').value);
		  var salary5=parseFloat(document.getElementById('Total_income_5').value);
		  var salary6=parseFloat(document.getElementById('Total_income_6').value);
		   var avg_sal=salary1+salary2+salary3+salary4+salary5+salary6;
		   document.getElementById('Total_Total_income').value=avg_sal;
		  
		  
		 
	 }
	  function cal_total_income_2()
	 {
		  var salary1=parseFloat(document.getElementById('Sales_cash_2').value);
		 
		  var salary2=parseFloat(document.getElementById('Purchase_bank_2').value);
		  var salary3=parseFloat(document.getElementById('Sales_bank_2').value);
		  var salary4=parseFloat(document.getElementById('Labour_paid_2').value);
		  var salary5=parseFloat(document.getElementById('Transport_charges_2').value);
		  var salary6=parseFloat(document.getElementById('Other_charges_2').value);
		  var salary7=parseFloat(document.getElementById('Purchase_cash_2').value);
		  var avg_sal=salary1+salary3-salary2-salary7-salary6-salary4-salary5;
		  document.getElementById('Total_income_2').value=avg_sal;
		   var salary1=parseFloat(document.getElementById('Total_income_1').value);
		  var salary2=parseFloat(document.getElementById('Total_income_2').value);
		  var salary3=parseFloat(document.getElementById('Total_income_3').value);
		  var salary4=parseFloat(document.getElementById('Total_income_4').value);
		  var salary5=parseFloat(document.getElementById('Total_income_5').value);
		  var salary6=parseFloat(document.getElementById('Total_income_6').value);
		   var avg_sal=salary1+salary2+salary3+salary4+salary5+salary6;
		   document.getElementById('Total_Total_income').value=avg_sal;
		  
		 
	 }
	  function cal_total_income_3()
	 {
		  var salary1=parseFloat(document.getElementById('Sales_cash_3').value);
		 
		  var salary2=parseFloat(document.getElementById('Purchase_bank_3').value);
		  var salary3=parseFloat(document.getElementById('Sales_bank_3').value);
		  var salary4=parseFloat(document.getElementById('Labour_paid_3').value);
		  var salary5=parseFloat(document.getElementById('Transport_charges_3').value);
		  var salary6=parseFloat(document.getElementById('Other_charges_3').value);
		  var salary7=parseFloat(document.getElementById('Purchase_cash_3').value);
		  var avg_sal=salary1+salary3-salary2-salary7-salary6-salary4-salary5;
		  document.getElementById('Total_income_3').value=avg_sal;
		   var salary1=parseFloat(document.getElementById('Total_income_1').value);
		  var salary2=parseFloat(document.getElementById('Total_income_2').value);
		  var salary3=parseFloat(document.getElementById('Total_income_3').value);
		  var salary4=parseFloat(document.getElementById('Total_income_4').value);
		  var salary5=parseFloat(document.getElementById('Total_income_5').value);
		  var salary6=parseFloat(document.getElementById('Total_income_6').value);
		   var avg_sal=salary1+salary2+salary3+salary4+salary5+salary6;
		   document.getElementById('Total_Total_income').value=avg_sal;
		  
		 
	 }
	   function cal_total_income_4()
	 {
		  var salary1=parseFloat(document.getElementById('Sales_cash_4').value);
		 
		  var salary2=parseFloat(document.getElementById('Purchase_bank_4').value);
		  var salary3=parseFloat(document.getElementById('Sales_bank_4').value);
		  var salary4=parseFloat(document.getElementById('Labour_paid_4').value);
		  var salary5=parseFloat(document.getElementById('Transport_charges_4').value);
		  var salary6=parseFloat(document.getElementById('Other_charges_4').value);
		  var salary7=parseFloat(document.getElementById('Purchase_cash_4').value);
		  var avg_sal=salary1+salary3-salary2-salary7-salary6-salary4-salary5;
		  document.getElementById('Total_income_4').value=avg_sal;
		   var salary1=parseFloat(document.getElementById('Total_income_1').value);
		  var salary2=parseFloat(document.getElementById('Total_income_2').value);
		  var salary3=parseFloat(document.getElementById('Total_income_3').value);
		  var salary4=parseFloat(document.getElementById('Total_income_4').value);
		  var salary5=parseFloat(document.getElementById('Total_income_5').value);
		  var salary6=parseFloat(document.getElementById('Total_income_6').value);
		   var avg_sal=salary1+salary2+salary3+salary4+salary5+salary6;
		   document.getElementById('Total_Total_income').value=avg_sal;
		  
		 
	 }
	 function cal_total_income_5()
	 {
		  var salary1=parseFloat(document.getElementById('Sales_cash_5').value);
		 
		  var salary2=parseFloat(document.getElementById('Purchase_bank_5').value);
		  var salary3=parseFloat(document.getElementById('Sales_bank_5').value);
		  var salary4=parseFloat(document.getElementById('Labour_paid_5').value);
		  var salary5=parseFloat(document.getElementById('Transport_charges_5').value);
		  var salary6=parseFloat(document.getElementById('Other_charges_5').value);
		  var salary7=parseFloat(document.getElementById('Purchase_cash_5').value);
		  var avg_sal=salary1+salary3-salary2-salary7-salary6-salary4-salary5;
		  document.getElementById('Total_income_5').value=avg_sal;
		   var salary1=parseFloat(document.getElementById('Total_income_1').value);
		  var salary2=parseFloat(document.getElementById('Total_income_2').value);
		  var salary3=parseFloat(document.getElementById('Total_income_3').value);
		  var salary4=parseFloat(document.getElementById('Total_income_4').value);
		  var salary5=parseFloat(document.getElementById('Total_income_5').value);
		  var salary6=parseFloat(document.getElementById('Total_income_6').value);
		   var avg_sal=salary1+salary2+salary3+salary4+salary5+salary6;
		   document.getElementById('Total_Total_income').value=avg_sal;
		  
		 
	 }
	 function cal_total_income_6()
	 {
		  var salary1=parseFloat(document.getElementById('Sales_cash_6').value);
		 
		  var salary2=parseFloat(document.getElementById('Purchase_bank_6').value);
		  var salary3=parseFloat(document.getElementById('Sales_bank_6').value);
		  var salary4=parseFloat(document.getElementById('Labour_paid_6').value);
		  var salary5=parseFloat(document.getElementById('Transport_charges_6').value);
		  var salary6=parseFloat(document.getElementById('Other_charges_6').value);
		  var salary7=parseFloat(document.getElementById('Purchase_cash_6').value);
		  var avg_sal=salary1+salary3-salary2-salary7-salary6-salary4-salary5;
		  document.getElementById('Total_income_6').value=avg_sal;
		   var salary1=parseFloat(document.getElementById('Total_income_1').value);
		  var salary2=parseFloat(document.getElementById('Total_income_2').value);
		  var salary3=parseFloat(document.getElementById('Total_income_3').value);
		  var salary4=parseFloat(document.getElementById('Total_income_4').value);
		  var salary5=parseFloat(document.getElementById('Total_income_5').value);
		  var salary6=parseFloat(document.getElementById('Total_income_6').value);
		   var avg_sal=salary1+salary2+salary3+salary4+salary5+salary6;
		   document.getElementById('Total_Total_income').value=avg_sal;
		  
		 
	 }
	  function coapp_cal_avg_salary(i)
	 {
		  var salary1=parseFloat(document.getElementById('gross_salary_1_'+i).value);
		  var salary2=parseFloat(document.getElementById('gross_salary_2_'+i).value);
		  var salary3=parseFloat(document.getElementById('gross_salary_3_'+i).value);
		  var avg_sal=(salary1+salary2+salary3)/3;
		  document.getElementById('avg_salary_'+i).value=avg_sal;
		  
		 
	 }
	 
	 function cal_loan_amount()
	 {
		
		  var loan_advance_deduction_1=parseFloat(document.getElementById('loan_advance_deduction_1').value);
		  var loan_advance_deduction_2=parseFloat(document.getElementById('loan_advance_deduction_2').value);
		  var loan_advance_deduction_3=parseFloat(document.getElementById('loan_advance_deduction_3').value);
		  var avg_loan_advance_deduction=loan_advance_deduction_1+loan_advance_deduction_2+loan_advance_deduction_3/3;
		  document.getElementById('avg_loan_advance_deduction').value=avg_loan_advance_deduction;
		  
		 
	 }
	 function coapp_cal_loan_amount(i)
	 {
		
		  var loan_advance_deduction_1=parseFloat(document.getElementById('loan_advance_deduction_1_'+i).value);
		  var loan_advance_deduction_2=parseFloat(document.getElementById('loan_advance_deduction_2_'+i).value);
		  var loan_advance_deduction_3=parseFloat(document.getElementById('loan_advance_deduction_3_'+i).value);
		  var avg_loan_advance_deduction=loan_advance_deduction_1+loan_advance_deduction_2+loan_advance_deduction_3/3;
		  document.getElementById('avg_loan_advance_deduction_'+i).value=avg_loan_advance_deduction;
		  
		 
	 }
	 function cal_net_salary1()
	 {
		
		 var salary1=parseFloat(document.getElementById('gross_salary_1').value);
		 var loan_advance_deduction_1=parseFloat(document.getElementById('loan_advance_deduction_1').value);
		 var epf_deduction_1=parseFloat(document.getElementById('epf_deduction_1').value);
		 var any_other_deduction_1=parseFloat(document.getElementById('any_other_deduction_1').value);
		 var net_salary_1=salary1-loan_advance_deduction_1-epf_deduction_1-any_other_deduction_1;
		 document.getElementById('net_salary_1').value=net_salary_1;
		 var net_salary_2=parseFloat(document.getElementById('net_salary_2').value);
		 var net_salary_3=parseFloat(document.getElementById('net_salary_3').value);
		 var avg_net_salary=net_salary_2+net_salary_3+net_salary_1/3;
		 document.getElementById('avg_net_salary').value=avg_net_salary;
		 
	  }

	
	    function coapp_cal_avg_net_salary(i)
	 {
	
	
	     var net_salary_1=parseFloat(document.getElementById('net_salary_1_'+i).value);
		 var net_salary_2=parseFloat(document.getElementById('net_salary_2_'+i).value);
		 var net_salary_3=parseFloat(document.getElementById('net_salary_3_'+i).value);
		
		 var avg_net_salary=(net_salary_2+net_salary_3+net_salary_1)/3;
		 document.getElementById('avg_net_salary_'+i).value=avg_net_salary;
		
	  }





	   function coapp_cal_net_salary1(i)
	 {
		
		 var salary1=parseFloat(document.getElementById('gross_salary_1_'+i).value);
		 var loan_advance_deduction_1=parseFloat(document.getElementById('loan_advance_deduction_1_'+i).value);
		
		 var epf_deduction_1=parseFloat(document.getElementById('epf_deduction_1_'+i).value);
		  
		 var any_other_deduction_1=parseFloat(document.getElementById('any_other_deduction_1_'+i).value);
		 var net_salary_1=salary1-loan_advance_deduction_1-epf_deduction_1-any_other_deduction_1;
		 document.getElementById('net_salary_1_'+i).value=net_salary_1;
		 var net_salary_2=parseFloat(document.getElementById('net_salary_2_'+i).value);
		 var net_salary_3=parseFloat(document.getElementById('net_salary_3_'+i).value);
		 var avg_net_salary=net_salary_2+net_salary_3+net_salary_1/3;
		 document.getElementById('avg_net_salary_'+i).value=avg_net_salary;
		 
	  }
	
	   function cal_net_salary2()
	 {
		
		 var salary2=parseFloat(document.getElementById('gross_salary_2').value);
		 var loan_advance_deduction_2=parseFloat(document.getElementById('loan_advance_deduction_2').value);
		 var epf_deduction_2=parseFloat(document.getElementById('epf_deduction_2').value);
		 var any_other_deduction_2=parseFloat(document.getElementById('any_other_deduction_2').value);
		 var net_salary_2=salary2-loan_advance_deduction_2-epf_deduction_2-any_other_deduction_2;
		 document.getElementById('net_salary_2').value=net_salary_2;
		 var net_salary_1=parseFloat(document.getElementById('net_salary_1').value);
		 var net_salary_3=parseFloat(document.getElementById('net_salary_3').value);
		 var avg_net_salary=net_salary_2+net_salary_3+net_salary_1/3;
		 document.getElementById('avg_net_salary').value=avg_net_salary;
	  }
	     function coapp_cal_net_salary2(i)
	 {
		
		 var salary2=parseFloat(document.getElementById('gross_salary_2_'+i).value);
		 var loan_advance_deduction_2=parseFloat(document.getElementById('loan_advance_deduction_2_'+i).value);
		 var epf_deduction_2=parseFloat(document.getElementById('epf_deduction_2_'+i).value);
		 var any_other_deduction_2=parseFloat(document.getElementById('any_other_deduction_2_'+i).value);
		 var net_salary_2=salary2-loan_advance_deduction_2-epf_deduction_2-any_other_deduction_2;
		 document.getElementById('net_salary_2_'+i).value=net_salary_2;
		 var net_salary_1=parseFloat(document.getElementById('net_salary_1_'+i).value);
		 var net_salary_3=parseFloat(document.getElementById('net_salary_3_'+i).value);
		 var avg_net_salary=net_salary_2+net_salary_3+net_salary_1/3;
		 document.getElementById('avg_net_salary_'+i).value=avg_net_salary;
	  }
	     function cal_net_salary3()
	 {
		
		 var salary3=parseFloat(document.getElementById('gross_salary_3').value);
		 var loan_advance_deduction_3=parseFloat(document.getElementById('loan_advance_deduction_3').value);
		 var epf_deduction_3=parseFloat(document.getElementById('epf_deduction_3').value);
		 var any_other_deduction_3=parseFloat(document.getElementById('any_other_deduction_3').value);
		 var net_salary_3=salary3-loan_advance_deduction_3-epf_deduction_3-any_other_deduction_3;
		 document.getElementById('net_salary_3').value=net_salary_3;
		 var net_salary_1=parseFloat(document.getElementById('net_salary_1').value);
		 var net_salary_2=parseFloat(document.getElementById('net_salary_2').value);
		 var avg_net_salary=net_salary_2+net_salary_3+net_salary_1/3;
		 document.getElementById('avg_net_salary').value=avg_net_salary;
	  }
	   function coapp_cal_net_salary3(i)
	 {
		
		 var salary3=parseFloat(document.getElementById('gross_salary_3_'+i).value);
		 var loan_advance_deduction_3=parseFloat(document.getElementById('loan_advance_deduction_3_'+i).value);
		 var epf_deduction_3=parseFloat(document.getElementById('epf_deduction_3_'+i).value);
		 var any_other_deduction_3=parseFloat(document.getElementById('any_other_deduction_3_'+i).value);
		 var net_salary_3=salary3-loan_advance_deduction_3-epf_deduction_3-any_other_deduction_3;
		 document.getElementById('net_salary_3_'+i).value=net_salary_3;
		 var net_salary_1=parseFloat(document.getElementById('net_salary_1_'+i).value);
		 var net_salary_2=parseFloat(document.getElementById('net_salary_2_'+i).value);
		 var avg_net_salary=net_salary_2+net_salary_3+net_salary_1/3;
		 document.getElementById('avg_net_salary_'+i).value=avg_net_salary;
	  }
	  function cal_foir()
	  {
		  
		   var salary=parseFloat(document.getElementById('credit_salary').value);
		   var obligations=parseFloat(document.getElementById('obligations').value);
		   var foir=obligations/salary*100;
		   document.getElementById('foir').value=foir +'%';
		   
		  
	  }
	   function coapp_cal_foir(i)
	  {
		 
		   var salary=parseFloat(document.getElementById('credit_salary_'+i).value);
		   
		   var obligations=parseFloat(document.getElementById('obligations_'+i).value);
		   var foir=obligations/salary*100;
		  
		 
		   document.getElementById('foir_'+i).value=foir +'%';
		   
		  
	  }
	    
	// added by priyanka
	$("#NO_itr_value_1").keyup(function(){
			  var NO_itr_value_1 =parseInt($('#NO_itr_value_1').val())
			  var NO_itr_value_5 =parseInt($('#NO_itr_value_5').val())
			  var NO_itr_value_9 =parseInt($('#NO_itr_value_9').val())
			  var total_annual =((NO_itr_value_1 + NO_itr_value_5 + NO_itr_value_9)/3)*12
              document.getElementById('total_annual').value= total_annual;
              })
			  $("#NO_itr_value_5").keyup(function(){
			  var NO_itr_value_1 =parseInt($('#NO_itr_value_1').val())
			  var NO_itr_value_5 =parseInt($('#NO_itr_value_5').val())
			  var NO_itr_value_9 =parseInt($('#NO_itr_value_9').val())
			  var total_annual =((NO_itr_value_1 + NO_itr_value_5 + NO_itr_value_9)/3)*12
              document.getElementById('total_annual').value= total_annual;
              })
			  $("#NO_itr_value_9").keyup(function(){
			  var NO_itr_value_1 =parseInt($('#NO_itr_value_1').val())
			  var NO_itr_value_5 =parseInt($('#NO_itr_value_5').val())
			  var NO_itr_value_9 =parseInt($('#NO_itr_value_9').val())
			  var total_annual =((NO_itr_value_1 + NO_itr_value_5 + NO_itr_value_9)/3)*12
              document.getElementById('total_annual').value= total_annual;
              })

			  $("#total_gross_margin").keyup(function(){
			  var total_annual =parseInt($('#total_annual').val())
			  var total_gross_margin =parseInt($('#total_gross_margin').val())
			  var total_profit =((total_annual * total_gross_margin)/100)
              document.getElementById('total_profit').value= total_profit;
              })
               
			  $("#total_expenses_utilities").keyup(function(){
			  var total_expenses_utilities =parseInt($('#total_expenses_utilities').val())
			  var total_expenses_salaries =parseInt($('#total_expenses_salaries').val())
			  var total_expenses_rentals =parseInt($('#total_expenses_rentals').val())
			  var total_additional_recurring_expenses =parseInt($('#total_additional_recurring_expenses').val())
			  var total_Profit =parseInt($('#total_profit').val())
			  var gross_profit = total_Profit - (total_expenses_utilities+total_expenses_salaries+total_expenses_rentals+total_additional_recurring_expenses)
              document.getElementById('gross_profit').value= gross_profit;
              })

			  $("#total_expenses_salaries").keyup(function(){
			  var total_expenses_utilities =parseInt($('#total_expenses_utilities').val())
			  var total_expenses_salaries =parseInt($('#total_expenses_salaries').val())
			  var total_expenses_rentals =parseInt($('#total_expenses_rentals').val())
			  var total_additional_recurring_expenses =parseInt($('#total_additional_recurring_expenses').val())
			  var total_Profit =parseInt($('#total_profit').val())
			  var gross_profit = total_Profit - (total_expenses_utilities+total_expenses_salaries+total_expenses_rentals+total_additional_recurring_expenses)
              document.getElementById('gross_profit').value= gross_profit;
              })

			  $("#total_expenses_rentals").keyup(function(){
			  var total_expenses_utilities =parseInt($('#total_expenses_utilities').val())
			  var total_expenses_salaries =parseInt($('#total_expenses_salaries').val())
			  var total_expenses_rentals =parseInt($('#total_expenses_rentals').val())
			  var total_additional_recurring_expenses =parseInt($('#total_additional_recurring_expenses').val())
			  var total_Profit =parseInt($('#total_profit').val())
			  var gross_profit = total_Profit - (total_expenses_utilities+total_expenses_salaries+total_expenses_rentals+total_additional_recurring_expenses)
              document.getElementById('gross_profit').value= gross_profit;
              })
			  $("#total_additional_recurring_expenses").keyup(function(){
			  var total_expenses_utilities =parseInt($('#total_expenses_utilities').val())
			  var total_expenses_salaries =parseInt($('#total_expenses_salaries').val())
			  var total_expenses_rentals =parseInt($('#total_expenses_rentals').val())
			  var total_additional_recurring_expenses =parseInt($('#total_additional_recurring_expenses').val())
			  var total_Profit =parseInt($('#total_profit').val())
			  var gross_profit = total_Profit - (total_expenses_utilities+total_expenses_salaries+total_expenses_rentals+total_additional_recurring_expenses)
              document.getElementById('gross_profit').value= gross_profit;
              })
	 
	
	</script>
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

}); 
function Ratio_Cheque_Bounce_function()
	 {
		
		 var Cheque_Bounce=parseInt(document.getElementById('Cheque_Bounce').value);
		 var Transaction=parseInt(document.getElementById('Transaction').value);
		 if (Number.isNaN(Transaction))
		 {
			 Transaction=0;
			
		 }
        if (Number.isNaN(Cheque_Bounce))
		 {
			 Cheque_Bounce=0;
			
		 }		
 
		 var Ratio_Cheque_Bounce=Cheque_Bounce/Transaction
			var final_ratio= Math.round(Ratio_Cheque_Bounce);
		 document.getElementById('Ratio_Cheque_Bounce').value=final_ratio;
		 
		 
	  }
	  
	  function Avg_balance_emi()
	 {
		
		 var Avg_balance=parseFloat(document.getElementById('b_s_avg_monthly_balance').value);
		 var Emi=parseFloat(document.getElementById('b_s_emi_amount').value);
		 if (Number.isNaN(Avg_balance))
		 {
			 Avg_balance=0;
			
		 }
        if (Number.isNaN(Emi))
		 {
			 Emi=0;
			
		 }		
 
		 var Ratio_Avg_balance=Avg_balance/Emi
			var final_ratio=Ratio_Avg_balance.toFixed(2);
		 document.getElementById('b_s_monthl_balance_emi').value=final_ratio;
		 
		 
	  }
	   function ratio_income_loan_cal()
	 {
		
		 var Active_laon=parseFloat(document.getElementById('Active_laon').value);
		 var b_s_annual_income=parseFloat(document.getElementById('b_s_annual_income').value);
		 if (Number.isNaN(Active_laon))
		 {
			 Active_laon=0;
			
		 }
        if (Number.isNaN(b_s_annual_income))
		 {
			 b_s_annual_income=0;
			
		 }		
 
		 var Ratio_incom_loan=Active_laon/b_s_annual_income
			var final_ratio=Math.round(Ratio_incom_loan);
		 document.getElementById('ratio_income_loan').value=final_ratio;
		 
		 
	  }
	  $("#add_row").click(function(e){
            e.preventDefault ? e.preventDefault() : (e.returnValue = false);         
            var clone = "<tr class='emis_row'>"+
						
					    "<td><input  required  class='input-cust-name' type='text' name='Active_laon_1[]'></td>"+
						"<td><input  required  class='input-cust-name' type='text' name='Type_of_Loan_1[]' ></td>"+
						"<td><input  required  class='input-cust-name' type='text' name='Loan_Amount_1[]'></td>"+
						"<td><input  required  class='input-cust-name' type='text' name='Balance_Amount_1[]' ></td>"+
						"<td><input  required  class='input-cust-name emi_total' type='number' name='EMI_1[]' onkeyup='calculateSum()' ></td>"+
						"<td><input class='emis_remove other-income-select' type='button' value='-' style=w'idth: 8%; color: red;' >"+
						"</tr>";
						
						
            $("#Add_emi").append(clone);
			//alert("hi");
        }); 
		 $('#Add_emi').on('click', '.emis_remove', function() {
         $(this).closest(".emis_row").remove();
         //alert("hi");
        }); 
		function calculateSum() 
		{
			
			
			
			var sum = 0;
			//iterate through each textboxes and add the values
			
			$(".emi_total").each(function() {
				//add only if the value is number
				if (!isNaN(this.value) && this.value.length != 0) {
					
					sum += parseFloat(this.value);
					
				}
				else if (this.value.length != 0){
					
				}
			});

			$("input#Additional_Emi_Total").val(sum.toFixed(2));
		}
		$(".add_row_coapp").click(function(e){
		
			
			 
		var id=this.id;
		
	   e.preventDefault ? e.preventDefault() : (e.returnValue = false);         
	   var clone = "<tr class='emis_row'>"+
				   
				   "<td><input  required  class='input-cust-name' type='text' name='Active_laon_1_"+id+"[]'></td>"+
				   "<td><input  required  class='input-cust-name' type='text' name='Type_of_Loan_1_"+id+"[]' ></td>"+
				   "<td><input  required  class='input-cust-name' type='text' name='Loan_Amount_1_"+id+"[]'></td>"+
				   "<td><input  required  class='input-cust-name' type='text' name='Balance_Amount_1_"+id+"[]' ></td>"+
				   "<td><input  required  class='input-cust-name emi_total_"+id+"' type='number' name='EMI_1_"+id+"[]' onkeyup='calculateSumcoapp("+id+")' ></td>"+
				   "<td><input class='emis_remove other-income-select' type='button' value='-' style=width: 8%; color: red;' >"+
				   "</tr>";
				   
				   
	   $("#Add_emi_"+id).append(clone);
	   //alert("hi");
   });
	$('.Add_emi_coapp').on('click', '.emis_remove', function() {
	$(this).closest(".emis_row").remove();
	//alert("hi");
   }); 
   function calculateSumcoapp(id) 
   {
	   
	   
	   
	   var sum = 0;
	   //iterate through each textboxes and add the values
	   
	   $(".emi_total_"+id).each(function() {
		   //add only if the value is number
		   if (!isNaN(this.value) && this.value.length != 0) {
			   
			   sum += parseFloat(this.value);
			   
		   }
		   else if (this.value.length != 0){
			   
		   }
	   });

	   $("input#Additional_Emi_Total_"+id).val(sum.toFixed(2));
   }

</script>
<script type = "text/javascript">  
window.onload = function(){  
calculateSum();
}  
</script>