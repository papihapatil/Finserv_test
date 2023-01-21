
<?php ini_set('short_open_tag', 'On'); 
$userID=$this->session->userdata("ID");
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





<button class="material-icons floating-btn" onclick="openForm()" id="menu_button"><i class="fa fa-align-justify"></i></button>

<div class="chat-popup" id="myForm">
  <form class="form-container">
	<button type="button" class="close" aria-label="Close" onclick="closeForm()" style="color:red;margin-top:-5px;">
	 <span aria-hidden="true">&times;</span>
	<br>	</button>

	<ul class="c-sidebar-nav">
	<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#revertModal" id="btn_revert">REVERT</button>
	<button type="button" class="btn btn-outline-info" onClick="continue_();"id="btn_continue">CONTINUE</button>
	<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#holdModal" id="btn_hold">HOLD</button>
	<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#rejectionModal" id="btn_reject">REJECT</button>
	</ul>
  </form>
</div>
<body onload=" Check_status() ;">
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
                 <div class="row " style="margin-left: 10px;" id="class_edit">Edit
									<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6" style="padding-bottom: 10px;">
										<div>
											<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/Operations_user/customer_edit_profile_2"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
										</div>	
									</div>	
					  			<input hidden type="text" name="customer_id" id="customer_id"  value="<?php echo $row->UNIQUE_CODE;?>">
					  			<input hidden type="text" name="dsa_id" id="dsa_id"  value="<?php if(!empty($CPA_ID)) { echo base64_decode($CPA_ID);}else { echo $userID;}?>">
								</div>
                <?php
              }
              else if($row_more->CPA_ID == '' )
              {
              	?>
              	<div class="row class_edit" style="margin-left: 10px;"  id="class_edit">Edit			
              		<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
										<div>
											<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/Operations_user/customer_edit_profile_2"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
										</div>	
									</div>	
					  			<input hidden type="text" name="customer_id" id="customer_id"  value="<?php echo $row->UNIQUE_CODE;?>">
					  			<input hidden type="text" name="dsa_id" id="dsa_id"  value="<?php if(!empty($CPA_ID)) { echo base64_decode($CPA_ID);} else {echo $userID;} ?>">
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
            	<div class="row class_edit" style="margin-left: 10px;"  id="class_edit">Edit
							<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
								<div>
									<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/Operations_user/customer_edit_profile_2"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
								</div>	
							</div>	
					  	<input hidden type="text" name="customer_id" id="customer_id"  value="<?php echo $row->UNIQUE_CODE;?>">
					  	<input hidden type="text" name="dsa_id" id="dsa_id"  value="<?php if(!empty($CPA_ID)) { echo base64_decode($CPA_ID);} else {echo $userID;}?>">
						</div>
             <?php
					}
					?>
			

				<?php } ?>					
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"></div>
     
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
				<div class="source">
				
				<!------------------------------ added by priyanka ----------------------------------------------- -->
			    <span class="dropdown" style="margin-left:-70%;margin-top:-10%;margin-bottom:5%;padding-left:10px; height:56px;">Source [<?php if(isset($Sourcing_Type)){echo $Sourcing_Type;}?>]:&nbsp;<?php if(isset($Sourcing_name)){echo $Sourcing_name;}?></span>
				<div class="dropdown">
       				<div class="select">
          				<span>View Document</span>
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
                <label class="msg"></label>
                <label class="download"></label>
				<!-------------------------------------------------------------------------------------------------->
			</div>
								</div>
		</div>
		
			<b><span id='tag'></span><br><span id='tag2'></span></b>


	<br><br>
	

    
		<div class="row shadow bg-white rounded margin-15 padding-20" style="margin-top:1%;" id="ApplicantDiv">
      <div class="row col-12">
         <a href="#ApplicantDiv" style="padding-bottom:10px;">
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
								   <i class='fas fa-female' style='font-size:40px;color:skyblue; margin-left: -33px;'></i>
								 <?php
								 }?>
								<span class="font-6" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;padding-left: 25px;">Co-Applicant <?php echo $i;?></span>
								<span class="font-9" style="text-align: center; margin-top: -12px; color: black; font-weight: bold; opacity: 0.8; padding-left: 40px;"><?php if(!empty($coapplicant)) echo $coapplicant->FN." ".$coapplicant->LN ?></span>
								<div class="w-100"></div>
								
							</div>
			  			</div>	
			  		</a>
			  	<?php 			} 
			  		$i++;	}
			  	 ?>
		  			
      </div>
	  <br>
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Loan details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>

			</div>
			
			<div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
				    <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Applicant ID</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($row)){ echo $row->UNIQUE_CODE;}?>">
	  				</div>
					
	  				<div class="w-100"></div>

	  			    <div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan amount applied for </span>
					</div>		
					<div class="w-100"></div>
	  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($appliedloan)){ echo $appliedloan->DESIRED_LOAN_AMOUNT;}?>">
	  				</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Tenure</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled  class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
								title="Phone number with 7-9 and remaing 9 digit with 0-9" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php if(!empty($appliedloan)){ echo $appliedloan->TENURE;}?>">
						</div>
					
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			    <div style="margin-left: 35px;  margin-top: 8px;" class="col">
			        <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Name of the Applicant </span>
				</div>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input style="margin-top: 8px;" class="input-cust-name" type="text" disabled id="f_name" name="f_name" minlength="5" maxlength="30" required value="<?php if(!empty($row)){echo $row->FN.' '.$row->MN.' '.$row->LN;}?>">
	  						</div>
				

  				<div class="w-100"></div>
				<?php if(!empty($appliedloan)){if($appliedloan->LOAN_TYPE=='home'){?>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan Sub type</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="YEARS_IN_CITY_LIVING"   value="<?php if(!empty($appliedloan)){ if($appliedloan->HOME_LOAN_TYPE=="NULL" || $appliedloan->HOME_LOAN_TYPE==""){echo "";}else{echo $appliedloan->HOME_LOAN_TYPE;}} ?>">
  				</div> 
				<?php }}?>

  				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				    <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-card-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Customer Type</span>
				</div>
				<div class="w-100"></div>
	  			<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<input disabled required  class="input-cust-name" type="text" name="OCCUPATION"  value="<?php if(!empty($income_details)){ echo $income_details->CUST_TYPE;} ?>">
	  			</div>
				
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				    <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-users"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of co applicants</span>
				</div>
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled  class="input-cust-name" type="email" name="email" value="<?php if(!empty($no_of_coapplicant)){echo $no_of_coapplicant;}?>">
  				</div> 
                <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				    <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Product</span>
				</div>		
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="AGE"   value="<?php if(!empty($appliedloan)){ echo $appliedloan->LOAN_TYPE;} ;?>">
  				</div> 	
               	
				
                				
  			</div>  			
		</div>
<!--------------Sourcing Details---------------------------->
<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Sourcing details of of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>

			</div>
			
			<div class="w-100"></div>
			
			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				    <div style=" margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Sourcing Type </span>
					</div>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input disabled style="margin-top: 8px;" placeholder="Source Type" class="input-cust-name" type="text"  id="f_name" name="f_name" minlength="5" maxlength="30" required value="<?php if(!empty($Sourcing_Type)){ echo $Sourcing_Type;}?>">
	  						</div>
			    </div>
				<?php if(!empty($Sourcing_By)){ ?>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				    <div style=" margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php if(!empty($Sourcing_By)){ echo $Sourcing_By;}?> </span>
					</div>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input disabled style="margin-top: 8px;" placeholder="Source Name" class="input-cust-name" type="text"  id="f_name" name="f_name" minlength="5" maxlength="30" required value="<?php if(!empty($Sourcing_name)){ echo $Sourcing_name;}?>">
	  					</div>
			    </div>
				<?php } ?>
				<?php if($Sourcing_Type != "Direct"){?> 
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				    <div style=" margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">City </span>
					</div>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input disabled style="margin-top: 8px;" placeholder="CITY" class="input-cust-name" type="text"  id="f_name" name="f_name" minlength="5" maxlength="30" required value="<?php if(!empty($Sourcing_city)){ echo $Sourcing_city;}?>">
	  				</div>
			    </div>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				    <div style=" margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">State </span>
					</div>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input disabled style="margin-top: 8px;" placeholder="STATE" class="input-cust-name" type="text"  id="f_name" name="f_name" minlength="5" maxlength="30" required value="<?php if(!empty($Sourcing_state)){ echo $Sourcing_state;}?>">
	  				</div>
			    </div>
				<?php } ?>
			</div>
		</div>
<!-------------------------------------------------------------->

	<!-------------added by papiha 23_11_2021----------------------->
		
    <!------------Personal Details----------------------->
	<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Personal details of <?php if(!empty($row)){ echo " - ".$row->FN." ".$row->LN." (Applicant) ";}?></span>

			</div>
			
        <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				    <div style=" margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Full name as per PAN card *</span>
					</div>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input disabled style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text"  id="f_name" name="f_name" minlength="5" maxlength="30" required value="<?php if(!empty($row)){ echo $row->FN.' '.$row->MN.' '.$row->LN;}?>">
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
  								<input disabled checked="true" type="radio" name="gender" value="male"> Male
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="dis">
	  							<input disabled type="radio" name="gender" value="female" <?php if(!empty($row)){  if ($row->GENDER == 'female') echo ' checked="true"'; }?>> Female
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
	  			<input  disabled required class="input-cust-name" type="text" name="dob" id="dob" value="<?php echo $row->DOB;?>">
	  			</div>
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email-Id *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="Enter emial-Id *" class="input-cust-name" type="email" name="email" value="<?php if(!empty($row)){ echo $row->EMAIL;}?>">
  				</div> 
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				<div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input disabled placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
       					title="Phone number with 7-9 and remaing 9 digit with 0-9" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row->MOBILE;?>">
  				</div> 
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				
                <div style=" margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-users"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of Dependants </span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  disabled required placeholder="No Of Dependants *" class="input-cust-name" type="text" name="NO_OF_DEPENDANTS" value="<?php if(!empty($row_more))echo $row_more->NO_OF_DEPENDANTS;?>"  maxlength="2">
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
  							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  								<input disabled type="radio" name="marital" value="married" checked="true"> Married
	  						</div>
	  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							  <div class="dis">
	  							<input disabled <?php if(!empty($row)){ if ($row->MARTIAL_STATUS == 'single') echo ' checked="true"';} ?> type="radio" name="marital" value="single"> Single
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
  					<select disabled class="input-cust-name" name="education_type" > 
					  <option value="">Select Education *</option>
					  <option value="ENGINEER" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'ENGINEER') echo ' selected="selected"';} ?>>ENGINEER</option>
					  <option value="GRADUATE" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'GRADUATE') echo ' selected="selected"';} ?>>GRADUATE</option>
					  <option value="MATRIC" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'MATRIC') echo ' selected="selected"';} ?>>MATRIC</option>
					  <option value="POST GRADUATE" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'POST GRADUATE') echo ' selected="selected"';} ?>>POST GRADUATE</option>
					  <option value="UNDER GRADUATE" <?php if(!empty($row)){ if ($row->EDUCATION_BACKGROUND == 'UNDER GRADUATE') echo ' selected="selected"';} ?>>UNDER GRADUATE</option>
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
						<select  disabled required class="input-cust-name resi_prop_type" name="Locality_type" > 
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
		<!--------------Added by papiha-------------------------------------------------->
		<!----------------Adress details------------------------------------------------->
		<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Address Details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>
				</div>
				
				<div class="w-100"></div>
			
				
				
			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Residential address Line 1*</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled  required style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_1;?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Residential address Line 2</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled style="margin-top: 8px;" placeholder="Address Line 2 *" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_2;?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Residential address Line 3</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled style="margin-top: 8px;" placeholder="Address Line 3 *" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_3;?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Permanent address Line 1*</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled style="margin-top: 1px;" required placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1"  id="per_add_1" value="<?php  if(!empty($row_more))echo  $row_more->PER_ADDRS_LINE_1;?>" minlength="3" maxlength="30">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Permanent address Line 2</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled style="margin-top: 8px;" placeholder="Address Line 2 *" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_LINE_2;?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Permanent address Line 3</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled style="margin-top: 8px;"  placeholder="Address Line 3 " class="input-cust-name" type="text" name="per_add_3"  id="per_add_3" value="<?php  if(!empty($row_more))echo $row_more->PER_ADDRS_LINE_3;?>" minlength="3" maxlength="30">
						</div>
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Current address</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<select disabled required class="input-cust-name resi_prop_type" name="resi_sel_property_type" > 
							  <option value="">Select Property Type *</option>
							  <option value="Corporate Provided" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
							  <option value="Mortgaged" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
							  <option value="Owned" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
							  <option value="Rented" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
							  <option value="Shared Accomodation" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
							  <option value="Paying Guest" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
							  <option value="Others" <?php if(!empty($row_more))if ($row_more->RES_ADDRS_PROPERTY_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
							</select>
						</div> 	
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Stability at current address</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled min="1" required placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_NO_YEARS_LIVING;?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Native Place</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  disabled placeholder="Native Place" class="input-cust-name" name="NATIVE_PLACE" id="NATIVE_PLACE" value="<?php if(!empty($row_more))echo $row_more->NATIVE_PLACE ;?>" minlength="3" maxlength="30">
						</div>
				</div>
				
			</div>
	    </div>
		<!----------------Identity details------------------------------------------------->
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
											<input disabled type="radio" id='yesCheck' name="Vechical_NO_available" value="yes" <?php if(!empty($row_more)){ if($row_more->Vechical_NO_available=='yes'){ echo 'checked';}}?> onclick="add_vechical_no()"> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<div class="dis">
											<input disabled id='noCheck'  <?php if(!empty($row_more)){ if($row_more->Vechical_NO_available=='no' || $row_more->Vechical_NO_available=='NULL' || $row_more->Vechical_NO_available==''){ echo 'checked';}}?> type="radio" name="Vechical_NO_available" value="no" onclick="add_vechical_no()"> no
										</div>
				</div>
									</div>	
								</div>  
								
							</div>
					</div>
					<?php 
						  if(!empty($row_more->Vechical_Number_1)&& $row_more->Vechical_Number_1!='NULL' )
							{
								?>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

												<div style=" margin-top: 8px;" class="col">
													<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Vehicle Number</span>
												</div>			
												<div class="w-100"></div>
												<div style="margin-left: 35px;  margin-top: 8px;" class="col">
												<?php	
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
															</tr>
													   <?php }?>
													</table>
												  <br>
											  
									  <?php
									}
									?>
									</div> 
						  
								<?php }
								?>
							
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
										<input disabled type="radio" id='yesCheck2' name="Driving_l_available" value="yes" <?php if(!empty($row_more)){ if($row_more->Driving_l_available=='yes'){ echo 'checked';}}?> onclick="add_DL_no()"> yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<input disabled id='noCheck2'  <?php if(!empty($row_more)){ if($row_more->Driving_l_available=='no' || $row_more->Driving_l_available=='NULL' || $row_more->Driving_l_available==''){ echo 'checked';}}?> type="radio" name="Driving_l_available" value="no" onclick="add_DL_no()"> no
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
								<input disabled placeholder="" class="input-cust-name" type="text" name="Driving_l_Number" id="Driving_l_Number"   value="<?php if(!empty($row_more)){echo $row_more->Driving_l_Number; }?>" >
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
											<input disabled  type="radio" id='yesCheck1' name="passport_avl" value="yes" <?php if(!empty($row_more)){ if($row_more->Passport_available=='yes'){ echo 'checked';}}?> onclick="add_passport_no()"> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<div class="dis">
											<input disabled id='noCheck1'  <?php if(!empty($row_more)){ if($row_more->Passport_available=='no' || $row_more->Passport_available=='NULL' || $row_more->Passport_available==''){ echo 'checked';}}?> type="radio" name="passport_avl" value="no" onclick="add_passport_no()"> no
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
								<input disabled  placeholder="" class="input-cust-name" type="text" name="passport_no" id="passport_no"   value="<?php if(!empty($row_more)){echo $row_more->Passport_Number; }?>" >
							</div> 
                    </div>							
                    <?php if(!empty($income_details))if($income_details->CUST_TYPE=='salaried'){?>
					    <div  hidden class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					            <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official Mail Available *</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input disabled type="radio" id='yesCheck5' name="Official_mail_available" value="yes" <?php if(!empty($row_more)){ if($row_more->Official_mail_available=='yes'){ echo 'checked';}}?> onclick="add_off_mail()"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="dis">
												<input  disabled id='noCheck5'  <?php if(!empty($row_more)){ if($row_more->Official_mail_available=='no' || $row_more->Official_mail_available=='NULL' || $row_more->Official_mail_available==''){ echo 'checked';}}?> type="radio" name="Official_mail_available" value="no" onclick="add_off_mail()"> no
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
									<input disabled placeholder="" class="input-cust-name" type="email" name="Official_mail" id="Official_mail"   value="<?php if(!empty($row_more)){echo $row_more->Official_mail; }?>" >
								
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
												<input disabled type="radio" id='yesCheck3' name="Account_Number_available" value="yes" <?php if(!empty($row_more)){ if($row_more->Account_Number_available=='yes'){ echo 'checked';}}?> onclick="add_acc_no()"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="dis">
												<input disabled id='noCheck3'  <?php if(!empty($row_more)){ if($row_more->Account_Number_available=='no' || $row_more->Account_Number_available=='NULL' || $row_more->Account_Number_available==''){ echo 'checked';}}?> type="radio" name="Account_Number_available" value="no" onclick="add_acc_no()"> no
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
									<input disabled placeholder="" class="input-cust-name" type="text" name="Account_Number" id="Account_Number"   value="<?php if(!empty($row_more)){if($row_more->Account_Number_available=='yes'){echo $row_more->Account_Number; }}?>" <?php if($row_more->Account_Number_available=='no' || $row_more->Account_Number_available=='NULL' || $row_more->Account_Number_available=='') {echo 'readonly';} ?>>
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
												<input disabled type="radio" id='yesCheck4' name="EPFO_Number_available" value="yes" <?php if(!empty($row_more)){ if($row_more->EPFO_Number_available=='yes'){ echo 'checked';}}?> onclick="add_epfo_no()"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="dis">
												<input disabled id='noCheck4'  <?php if(!empty($row_more)){ if($row_more->EPFO_Number_available=='no' || $row_more->EPFO_Number_available=='NULL' || $row_more->EPFO_Number_available==''){ echo 'checked';}}?> type="radio" name="EPFO_Number_available" value="no" onclick="add_epfo_no()"> no
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
									<input disabled placeholder="" class="input-cust-name" type="text" name="EPFO_Number" id="EPFO_Number"   value="<?php if(!empty($row_more)){if($row_more->EPFO_Number_available=='yes'){echo $row_more->EPFO_Number; }}?>" <?php if($row_more->EPFO_Number_available=='no' || $row_more->EPFO_Number_available=='NULL' || $row_more->EPFO_Number_available=='') {echo 'readonly';} ?>>
								</div> 	
                            </div>								
					
					<?php } ?>		
				 						
                </div>					
				
			    </div>
		</div>
    <!----------------------------------Co-applicant details ------------------------------- -->
	<!----------------------------------Personal Deatils Of Copaplicant--------------------------------------->


       <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>		
		<div class="row shadow bg-white rounded margin-10 padding-15"  id="<?php echo $coapplicant->FN;?>">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;"> Personal details of<?php echo " - ".$coapplicant->FN." ".$coapplicant->LN." (Co-Applicant)";?></span>

			</div>
			
			
			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Name of Co-Applicant *</span>
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input  disabled style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text" id="f_name" name="f_name_<?php echo $i;?>" minlength="3" maxlength="30" required value="<?php if(!empty($coapplicant))echo $coapplicant->FN.' '.$coapplicant->MN.' '.$coapplicant->LN;?>" oninput="validateText(this)">
	  					<input  disabled style="margin-top: 8px;" placeholder="Last Name *" class="input-cust-name" type="text" name="COAPP_ID_<?php echo $i;?>"  id="COAPPID" minlength="3" maxlength="30" hidden="true"  value="<?php if(!empty($coapplicant))echo $coapplicant->UNIQUE_CODE;?>">
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
									<input disabled type="radio" name="<?php echo "gender_".$i;?>" value="male" <?php  if(!empty($coapplicant)){if ($coapplicant->GENDER == 'male') echo ' checked="true"'; }?>> Male
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="dis">
									<input disabled  type="radio" name="<?php echo "gender_".$i;?>" value="female" <?php  if(!empty($coapplicant)){if ($coapplicant->GENDER == 'female') echo ' checked="true"'; }?>> Female
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
	  						<input  disabled required max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="dob_<?php echo $i;?>"  id="dob" value="<?php if(!empty($coapplicant))echo $coapplicant->DOB;?>">
	  				</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				    <div style="margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email-Id *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input disabled minlength="3" maxlength="30" required placeholder="Enter email-Id *" class="input-cust-name" type="email" name="email_<?php echo $i;?>" value="<?php if(!empty($coapplicant))echo $coapplicant->EMAIL;?>">
					</div> 

				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				    <div style="margin-top: 8px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled required placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" 
							title="Please enter valid 10 digit phone number" name="mobile_<?php echo $i;?>" oninput="maxLengthCheck(this)" maxlength="10" value="<?php if(!empty($coapplicant))echo $coapplicant->MOBILE;?>">
					</div> 

				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-users"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of Dependants </span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required placeholder="No Of Dependants *" class="input-cust-name" type="text" name="NO_OF_DEPENDANTS_<?php echo $i;?>" value="<?php if(!empty($coapplicant)){echo $coapplicant->NO_OF_DEPENDANTS;}?>"  maxlength="2">
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
									<input disabled type="radio" name="<?php echo "marital_".$i; ?>" value="married" checked="true"> Married
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="dis">
									<input disabled  <?php  if(!empty($coapplicant)){if ($coapplicant->MARTIAL_STATUS == 'single') echo ' checked="true"'; ?> type="radio" name="<?php echo "marital_".$i;} ?>" value="single"> Single
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
						<select disabled class="input-cust-name" name="education_type_<?php echo $i;?>" > 
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
						<select disabled required class="input-cust-name resi_prop_type" name="Locality_type_<?php echo $i;?>" > 
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
		<!---------------------------------------Adress Details Of Copapplicant--------------- -->
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
								<input disabled maxlength="25" required style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1_<?php echo $i;?>" id="resi_add_1" value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_LINE_1;?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Residential address Line 2</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled maxlength="25" style="margin-top: 8px;" placeholder="Address Line 2" class="input-cust-name" type="text" name="resi_add_2_<?php echo $i;?>" id="resi_add_2" value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_LINE_2;?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Residential address Line 3</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  disabled maxlength="25" style="margin-top: 8px;" placeholder="Address Line 3" class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3_<?php echo $i;?>" value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_LINE_3;?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Permanent address Line 1*</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<?php if(!empty($coapplicant)) { ?>
	  					          <input disabled style="margin-top: 1px;"  placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1_<?php echo $i;?>"  id="per_add_1" value="<?php echo $coapplicant->PER_ADDRS_LINE_1 ?>">
								<?php }else{ ?>
								   <input disabled style="margin-top: 1px;"  placeholder="Address Line 1 *" class="input-cust-name" type="text" name="per_add_1_<?php echo $i;?>"  id="per_add_1" >
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
	  					          <input  disabled style="margin-top: 8px;"  placeholder="Address Line 2 *" class="input-cust-name" type="text" name="per_add_2_<?php echo $i;?>"  id="per_add_2" value="<?php echo $coapplicant->PER_ADDRS_LINE_2 ?>">
								<?php }else{ ?>
								   <input disabled style="margin-top: 8px;"  placeholder="Address Line 2 *" class="input-cust-name" type="text" name="per_add_2_<?php echo $i;?>"  id="per_add_2" >
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
	  					          <input  disabled style="margin-top: 8px;"  placeholder="Address Line 3 *" class="input-cust-name" type="text" name="per_add_3_<?php echo $i;?>"  id="per_add_3" value="<?php echo $coapplicant->PER_ADDRS_LINE_3 ?>">
								<?php }else{ ?>
								  <input  disabled style="margin-top: 8px;"  placeholder="Address Line 3 *" class="input-cust-name" type="text" name="per_add_3_<?php echo $i;?>"  id="per_add_3" >
								<?php } ?>
						</div>
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Current address</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<select  disabled required class="input-cust-name resi_prop_type" name="resi_sel_property_type_<?php echo $i;?>" > 
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
								<input disabled min="1" required placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years_<?php echo $i;?>"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($coapplicant))echo $coapplicant->RES_ADDRS_NO_YEARS_LIVING;?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				        <div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-building"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Native Place</span>
						</div>			
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  disabled placeholder="Native Place" class="input-cust-name" name="NATIVE_PLACE_<?php echo $i;?>" id="NATIVE_PLACE" value="<?php if(!empty($coapplicant))echo $coapplicant->NATIVE_PLACE ;?>" minlength="3" maxlength="30">
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
											<input disabled type="radio" id='yesCheck_<?php echo $i; ?>' name="Vechical_NO_available_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Vechical_NO_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_vechical_no(<?php echo $i; ?>)"> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<div class="dis">
											<input disabled id='noCheck_<?php echo $i; ?>'  <?php if(!empty($coapplicant)){ if($coapplicant->Vechical_NO_available=='no' || $coapplicant->Vechical_NO_available=='NULL' || $coapplicant->Vechical_NO_available==''){ echo 'checked';}}?> type="radio" name="Vechical_NO_available_<?php echo $i; ?>" value="no" onclick="add_coapp_vechical_no(<?php echo $i; ?>)"> no
										</div>
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
								<input disabled placeholder="" class="input-cust-name" type="text" name="vechical_no_<?php echo $i; ?>" id="vechical_no_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){if($coapplicant->Vechical_NO_available=='yes'){echo $coapplicant->Vechical_Number; }}?>" <?php if($coapplicant->Vechical_NO_available=='no' || $coapplicant->Vechical_NO_available=='NULL' || $coapplicant->Vechical_NO_available=='') {echo 'readonly';} ?>>
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
									<div class="dis">
										<input  disabled id='noCheck_dl_<?php echo $i;?>'  <?php if(!empty($coapplicant)){ if($coapplicant->Driving_l_available=='no' || $coapplicant->Driving_l_available=='NULL' || $coapplicant->Driving_l_available==''){ echo 'checked';}}?> type="radio" name="Driving_l_available_<?php echo $i;?>" value="no" onclick="add_coapp_DL_no(<?php echo $i; ?>)"> no
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
								<input disabled placeholder="" class="input-cust-name" type="text" name="Driving_l_Number_<?php echo $i; ?>" id="Driving_l_Number_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){echo $coapplicant->Driving_l_Number; }?>" <?php if($coapplicant->Driving_l_available=='no' || $coapplicant->Driving_l_available=='NULL' || $coapplicant->Driving_l_available=='') {echo 'readonly';} ?>>
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
										<input disabled type="radio" id='yesCheck_paas_<?php echo $i; ?>' name="passport_avl_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Passport_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_passport_no(<?php echo $i; ?>)"> yes
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="dis">
										<input  disabled id='noCheck_pass_<?php echo $i; ?>'  <?php if(!empty($coapplicant)){ if($coapplicant->Passport_available=='no' || $coapplicant->Passport_available=='NULL' || $coapplicant->Passport_available==''){ echo 'checked';}}?> type="radio" name="passport_avl_<?php echo $i; ?>" value="no" onclick="add_coapp_passport_no(<?php echo $i; ?>)"> no
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
								<input disabled placeholder="" class="input-cust-name" type="text" name="passport_no_<?php echo $i; ?>" id="passport_no_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){echo $coapplicant->Passport_Number; }?>" <?php if($coapplicant->Passport_Number=='no' || $coapplicant->Passport_Number=='NULL' || $coapplicant->Passport_Number=='') {echo 'readonly';} ?>>
							</div> 
                    </div>							
                    <?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried'){?>
					    <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					            <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Official Mail Available *</span>
								</div>
								<div class="w-100"></div>
								<div  hidden style="margin-left: 35px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input disabled type="radio" id='yesCheck_off_<?php echo $i; ?>' name="Official_mail_available_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Official_mail_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_off_mail(<?php echo $i;?>)"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input disabled id='noCheck_off_<?php echo $i; ?>'  <?php if(!empty($coapplicant)){ if($coapplicant->Official_mail_available=='no' || $coapplicant->Official_mail_available=='NULL' || $coapplicant->Official_mail_available==''){ echo 'checked';}}?> type="radio" name="Official_mail_available_<?php echo $i; ?>" value="no" onclick="add_coapp_off_mail(<?php echo $i; ?>)"> no
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
									<input disabled placeholder="" class="input-cust-name" type="email" name="Official_mail_<?php echo $i; ?>" id="Official_mail_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){echo $coapplicant->Official_mail;}?>" <?php if($coapplicant->Official_mail=='no' || $coapplicant->Official_mail=='NULL' || $coapplicant->Official_mail=='') {echo 'readonly';} ?>>
								
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
												<input disabled type="radio" id='yesCheck_acc_<?php echo $i; ?>' name="Account_Number_available_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Account_Number_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_acc_no(<?php echo $i; ?>)"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input disabled id='noCheck_acc_<?php echo $i; ?>'  <?php if(!empty($coapplicant)){ if($coapplicant->Account_Number_available=='no' || $coapplicant->Account_Number_available=='NULL' || $coapplicant->Account_Number_available==''){ echo 'checked';}}?> type="radio" name="Account_Number_available_<?php echo $i; ?>" value="no" onclick="add_coapp_acc_no(<?php echo $i; ?>)"> no
											</div>
											
										</div>	
									</div>  
								</div>
							
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number</span>
								</div>			
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input disabled placeholder="" class="input-cust-name" type="text" name="Account_Number_<?php echo $i; ?>" id="Account_Number_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){echo $coapplicant->Account_Number; }?>" <?php if($coapplicant->Account_Number_available=='no' || $coapplicant->Account_Number_available=='NULL' || $coapplicant->Account_Number_available=='') {echo 'readonly';} ?>>
								</div> 	
                            </div>								
					
					<?php } ?>
					 <?php if(!empty($coapplicant))if($coapplicant->COAPP_TYPE=='salaried'){?>
					        <div hidden class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					            <div style=" margin-top: 8px;" class="col">
									<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-id-card"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">EPFO Number Available *</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;" class="col">
									<div class="input-cust-name" style=" margin-top: 8px;">
										<div class="row">
										
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												<input disabled  type="radio" id='yesCheck_epfo_<?php echo $i; ?>' name="EPFO_Number_available_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->EPFO_Number_available=='yes'){ echo 'checked';}}?> onclick="add_coapp_epfo_no(<?php echo $i;?>)"> yes
											</div>
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="dis">
												<input  disabled id='noCheck_epfo_<?php echo $i; ?>'  <?php if(!empty($coapplicant)){ if($coapplicant->EPFO_Number_available=='no' || $coapplicant->EPFO_Number_available=='NULL' || $coapplicant->EPFO_Number_available==''){ echo 'checked';}}?> type="radio" name="EPFO_Number_available_<?php echo $i; ?>" value="no" onclick="add_coapp_epfo_no(<?php echo $i; ?>)"> no
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
                                    <input disabled placeholder="" class="input-cust-name" type="text" name="EPFO_Number_<?php echo $i; ?>" id="EPFO_Number_<?php echo $i; ?>"   value="<?php if(!empty($coapplicant)){echo $coapplicant->EPFO_Number; }?>" >
								</div> 	
                            </div>								
					
					<?php } ?>		
				 						
                </div>					
				
			    </div>
    <?php $i++;}?>
	<!----------------------------------------------------------------------------------------------------------- -->
	</div>
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
<!-------------------------added by priyanka---------------------------------------------------- -->
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


								<div class="modal fade" id="revertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  	<div class="modal-dialog" role="document">
											<div class="modal-content">
									  		<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Select Stage for Reverts</h5><br>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														  <span aria-hidden="true">&times;</span>
													</button>
									  		</div>
									  		<div class="modal-body">
													<ul class="nav nav-tabs" id="myTab" role="tablist">
  													<li class="nav-item">
    													<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Applicant</a>
  													</li>
  													<li class="nav-item">
    													<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Co-Applicant</a>
  													</li>
 													</ul>
													<div class="tab-content" id="myTabContent">
 														 <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
																
																	
																		
																
																			  		 <table class="table">
										   													<tbody>
										    	   											<tr>
										        												<td><b>Stage</b></td>
										        												<td><b>Action</b></td>
										  									      	  </tr>
										      												<tr>
										        												<td><label >Applicant Personal Details</label></td>
										       													<td>		<input name="selector[]" id="ad_Checkbox1" class="ads_Checkbox" type="checkbox" value="Applicant Personal Details" /></td>
										  											      </tr>
										      												<tr>
																						        <td>	<label >Applicant Income Details</label></td>
																						        <td>		<input name="selector[]" id="ad_Checkbox2" class="ads_Checkbox" type="checkbox" value="Applicant Income Details" /></td>
																						      </tr>
										     													<tr>
										     	   												<td>	<label >Applicant Documents Details</label></td>
										        												<td>	<input name="selector[]" id="ad_Checkbox3" class="ads_Checkbox" type="checkbox" value="Applicant Document Details" /></td>
											      											</tr>
										      												<tr>
										      	  											<td>	<label >Loan Application Form</label></td>
										       													<td>		<input name="selector[]" id="ad_Checkbox4" class="ads_Checkbox" type="checkbox" value="Loan Application Form" />
																										</td>
										      												</tr>
										         											<tr>
																						        <td>	<label for="color_red">Loan Application Documents</label></td>
																						        <td>		<input name="selector[]" id="ad_Checkbox5" class="ads_Checkbox" type="checkbox" value="Loan Applicant Documents" />
																										</td>
										      												</tr>
										    												</tbody>
										  											</table>
  																					<b><label >Comments</label></b>
									  												<textarea class = "form-control " rows = "3" name="RevertReason" id="RevertReason" placeholder="Write something.." ></textarea>
        	    												
        	    															<div class="modal-footer">
														<button type="button"  style="border:1px solid black;padding:10px;"  data-dismiss="modal">Close</button>
														<button type="button" style="border:1px solid black;padding:10px;" onclick="Revert_applicant()">Revert</button>
									  			</div>
															</div>
 															<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
 																 <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>	
 																 <span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;"><?php echo " - ".$coapplicant->FN." ".$coapplicant->LN."";?></span>	
 																		
																			  		 <table class="table">
										   													<tbody>
										    	   											<tr>
										        												<td><b>Stage</b></td>
										        												<td><b>Action</b></td>
										  									      	  </tr>
										      												<tr>
										        												<td><label for="color_red">Applicant Personal Details</label></td>
										       													<td><input type="checkbox" name="COApplicant_<?php echo $i;?>[]" value="red"  /></td>
										  											      </tr>
										      												<tr>
																						        <td>	<label for="color_red">Applicant Income Details</label></td>
																						        <td>	<input type="checkbox" name="COApplicant_<?php echo $i;?>[]" value="green"  /></td>
																						      </tr>
										     													<tr>
										     	   												<td>	<label for="color_red">Applicant Documents Details</label></td>
										        												<td>	<input type="checkbox" name="COApplicant_<?php echo $i;?>[]" value="blue" /></td>
											      											</tr>
										      												<tr>
										      	  											<td>	<label for="color_red">Loan Application Form</label></td>
										       													<td>	<input type="checkbox" name="COApplicant_<?php echo $i;?>[]" value="blue" /></td>
										      												</tr>
										         											<tr>
																						        <td>	<label for="color_red">Loan Application Documents</label></td>
																						        <td>	<input type="checkbox" name="COApplicant_<?php echo $i;?>[]" value="blue" /></td>
										      												</tr>
										    												</tbody>
										  											</table>
  																					<b><label >Comments</label></b>
									  												<textarea class = "form-control" rows = "3" name="holdReason" id="holdReason" placeholder="Write something.." ></textarea>
        	    												
        	    										<?php } $i++;?>
															
																	<div class="modal-footer">
																		<button type="button"  style="border:1px solid black;padding:10px;"  data-dismiss="modal">Close</button>
																		<button type="button" style="border:1px solid black;padding:10px;" onclick="Revert_Co_applicant()">Revert</button>
													  			</div>
															</div>
 												  </div>
									  	
												</div>
								  		</div>
										</div>
									</div>
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
											//var download="download";
                                            $('.msg').html(  msg + '<a href="'+ obj.view +'" target="_blank" >'+ view +'</a></label>'); 
											
											
						                }
                                    });
 
}); 
</script>
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
						 var holdReason ="Application is on HOLD by CPA in Applicant details because : "+ document.getElementById('holdReason').value;
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
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/Operations_user/CAM_Applicant_Details?ID="+obj.User_ID); });
									
												
											}
						                }
                                    });
		
						}

						function reject() 
						{
							var User_ID = document.getElementById('customer_id').value;
							var rejectReason = "Application is rejected by CPA in Applicant details because : " +document.getElementById('rejectReason').value;
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
												  swal("success!", "Status added successfully", "success");//.then( function() {  window.location.replace("/dsa/dsa/index.php/Operations_user/CAM_Applicant_Details?ID="+obj.User_ID); });
									
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
												//alert("got it");
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/Operations_user/CAM_Applicant_Details?ID="+obj.User_ID); });
									
												
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
												//alert("HOLD");
												$('#border_style').css("border","2px solid yellow");
													document.getElementById('tag').innerHTML = "Status added by : "+obj.action_by;
													document.getElementById('tag2').innerHTML =obj.reason;
											
												var word = "Applicant details";
												var mystring =obj.reason;
 
											// Test if string contains the word 
												 var incStr = mystring.includes(word);
											     if(incStr!= false)
												{
														$('input[type="text"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="email"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="number"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="date"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
	
												} 
											

											}
											else if(obj.msg=='REJECT')
											{
												//alert("REJECT");
												$('#border_style').css("border","2px solid red");
												document.getElementById('tag').innerHTML = "Status added by  : "+obj.action_by;
												document.getElementById('tag2').innerHTML = obj.reason;
												var word = "Applicant details";
												var mystring =obj.reason;
 
											// Test if string contains the word 
												 var incStr = mystring.includes(word);
											      if(incStr!= false)
												{
														//alert("hhhh");
														$('input[type="text"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="email"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="number"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="date"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
							
												
												
											} 
																$('#btn_hold').hide();
												$('#btn_continue').hide();
												$('#class_edit').hide();
											
												
											}
											else if(obj.msg=='CONTINUE')
											{
													$('#border_style').css("border","2px solid blue");
													
											}
						                }
                                    });

						}

						//=============================== added by priya 10-05-2022
							function Revert_applicant()
						{

					      var Applicant_Array = [];
       					$(':checkbox:checked').each
       					(
       						function(i)
       						{
          					Applicant_Array[i] = $(this).val();
						      }
						    );
     					 var User_ID = document.getElementById('customer_id').value;
						 	 var dsa_id = document.getElementById('dsa_id').value;
						 	 var RevertReason =document.getElementById('RevertReason').value;

						 	 		 if(RevertReason=='')
										{
											swal("warning!", "Please Enter Comments for Revert application", "warning");
										    return false;
										}

						
						
    					 	$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/Dsa/Revert_Applicant_data"); ?>',
									  data:{'Applicant_Array':Applicant_Array ,'User_ID':User_ID,'dsa_id':dsa_id,'RevertReason':RevertReason},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
												     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/Operations_user/CAM_Applicant_Details?ID="+obj.User_ID); });
												  
									
											}
						         }
                                    });

						}

						function Revert_Co_applicant()
						{
								var User_ID = document.getElementById('customer_id').value;
								var dsa_id = document.getElementById('dsa_id').value;
					  	 	$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/Dsa/Revert_CoApplicant_data"); ?>',
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
												alert("ok boss");
											}
						         }
                                    });
						}


						</script>
	<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
		<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
						
							<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
							<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
