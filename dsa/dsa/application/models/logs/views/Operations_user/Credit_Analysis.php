
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
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				<?php if($id == $this->session->userdata("Cust_id")) {?>
				<?php 
					if(isset($data_credit_analysis))
					{ 
              			if($data_credit_analysis->CPA_ID == $userID )
              			{
                	?>
					<div class="row" style="margin-left: 10px;">Edit
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div>
								<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/Operations_user/Edit_Credit_Analysis"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
							</div>	
						</div>				
					</div>
					<?php
			              }
			              else if($data_credit_analysis->CPA_ID == '' )
			              {
              		?>
              		<div class="row" style="margin-left: 10px;">Edit
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div>
								<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/Operations_user/Edit_Credit_Analysis"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
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
					<div class="row" style="margin-left: 10px;">Edit
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div style="padding-bottom:10px;">
								<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/Operations_user/Edit_Credit_Analysis"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
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
			   <span class="dropdown" style="margin-left:-70%;margin-top:-10%;margin-bottom:5%;padding-left:10px; height:56px;">Source [<?php if(isset($Sourcing_Type)){echo $Sourcing_Type;}?>]:&nbsp;<?php if(isset($Sourcing_name)){echo $Sourcing_name;}?></span>
					
			<!------------------------------ added by priyanka ----------------------------------------------- -->
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
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			
		</div> <br><br>
<!-----------------------------------Salaried Applicant------------------------------------>
	<?php if(!empty($income_details)){ if($income_details->CUST_TYPE=='salaried')
		{ ?>
		<div class="row shadow bg-white rounded margin-10 padding-15" style="margin-top:1%;">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Details of<?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." (Applicant )"?></span>

			</div>
		
				 <div class="w-100"></div>
					<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Salary</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){ echo $income_details->ORG_SALARY_3;}?>">
							</div>
							
							<div class="w-100"></div>

							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Salary as  per salary slip</span>
							</div>		
							<div class="w-100"></div>
							<div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled type="radio" name="verify_salary" value="yes" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_salary == 'yes') echo ' checked="true"'; }?>> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled type="radio" name="verify_salary" value="no" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_salary == 'no' || $data_credit_analysis->verify_salary == '' || $data_credit_analysis->verify_salary == 'NULL') echo ' checked="true"'; } else {echo ' checked="true"';}?>> No
										</div>
									</div>						
								</div>  					
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Residual Income </span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->residual_income;}?>">
							</div>
							
							<div class="w-100"></div>

							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Verify Residual Income </span>
							</div>		
							<div class="w-100"></div>
							<div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled type="radio" name="verify_residual_income " value="yes" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_residual_income == 'yes') echo ' checked="true"'; }?>> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled type="radio" name="verify_residual_income" value="no" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_residual_income == 'no' || $data_credit_analysis->verify_residual_income == '' || $data_credit_analysis->verify_residual_income == 'NULL') echo ' checked="true"'; } else{  echo ' checked="true"'; }?>> No
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
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->credit_salary;}?>">
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
											<input disabled type="radio" name="verify_credit_salary" value="yes" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_credit_salary == 'yes') echo ' checked="true"'; }?>> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled type="radio" name="verify_credit_salary" value="no" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_credit_salary == 'no' || $data_credit_analysis->verify_credit_salary == '' || $data_credit_analysis->verify_credit_salary == 'NULL') echo ' checked="true"'; }?>> No
										</div>
									</div>						
								</div>  					
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Credit Bureau Score</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_credit_score)){ echo $data_credit_score->score;}?>">
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">FOIR </span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->foir;}?>">
							</div>
						</div>							  				
					</div>	
					<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Obligation</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($total_obligation)){ echo $total_obligation;}?>">
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
											<input disabled type="radio" name="verify_obl" value="yes" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_obligation == 'yes') echo ' checked="true"'; }?>> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled type="radio" name="verify_obl" value="no" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_obligation == 'no' || $data_credit_analysis->verify_obligation == '' || $data_credit_analysis->verify_obligation == 'NULL') echo ' checked="true"'; }?>> No
										</div>
									</div>						
								</div>  									
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Eligibility</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->eligibility;}?>">
							</div>
						</div>							  				
					</div>	
			
			
		
			
  					
		</div>
           <!---------------Orgnaization details-------------------------------------------->
	    <div class="row shadow bg-white rounded margin-10 padding-15" style="margin-top:1%;">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Company Details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>

			</div>
			
				 <div class="w-100"></div>
					<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Name of the Company</span>
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
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Company Address</span>
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
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Stability Current Organization</span>
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
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Total Work Ex</span>
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
             <!-----------------------------Income Details------------------------------------------------------>
   <div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Income details of<?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>

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
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($income_details)){ echo $income_details->ORG_SALARY_1;}?>" onkeyup="cal_avg_salary(); cal_net_salary1() "></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="epf_deduction_1" id="epf_deduction_1" value="<?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->epf_deduction_1;}else{echo '0';}?>" onkeyup="cal_net_salary1()"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="loan_advance_deduction_1" id="loan_advance_deduction_1"  value="<?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->loan_advance_deduction_1;}else{echo '0';}?>" onkeyup="cal_loan_amount(); cal_net_salary1()"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="any_other_deduction_1" id="any_other_deduction_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->any_other_deduction_1;}else{echo '0';}?>" onkeyup="cal_net_salary1()"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="net_salary_1" id="net_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->net_salary_1;}else{echo '0';}?>"></td>
					  </tr>
					  <tr>
						<td><b>Month 2</b></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_2" id="gross_salary_2"  value="<?php if(!empty($income_details)){ echo $income_details->ORG_SALARY_2;}?>" onkeyup="cal_avg_salary(); cal_net_salary2()"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="epf_deduction_2" id="epf_deduction_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->epf_deduction_2;}else{echo '0';}?>" onkeyup="cal_net_salary2()"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="loan_advance_deduction_2" id="loan_advance_deduction_2" value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->loan_advance_deduction_2;}else{echo '0';}?>" onkeyup="cal_loan_amount(); cal_net_salary2()" ></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="any_other_deduction_2" id="any_other_deduction_2"  value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->any_other_deduction_2;}else{echo '0';}?>"  onkeyup="cal_net_salary2()" ></td>
					    <td><input readonly required  class="input-cust-name" type="number" step="any" name="net_salary_2" id="net_salary_2"  value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->net_salary_2;}else{echo '0';}?>" oninput="cal_avg_net_sal()"></td>
					  </tr>
					  <tr>
						<td><b>Month 3</b></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_3" id="gross_salary_3"  value="<?php if(!empty($income_details)){ echo $income_details->ORG_SALARY_3;}?>" onkeyup="cal_avg_salary(); cal_net_salary3()"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="epf_deduction_3" id="epf_deduction_3" value="<?php if(!empty($data_credit_analysis)){echo  $data_credit_analysis->epf_deduction_3;}else{echo '0';}?>" onkeyup="cal_net_salary3()"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="loan_advance_deduction_3" id="loan_advance_deduction_3" value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->loan_advance_deduction_3;}else{echo '0';}?>" onkeyup="cal_loan_amount(); cal_net_salary3();"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="any_other_deduction_3" id="any_other_deduction_3"  value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->any_other_deduction_3;}else{echo '0';}?>" onkeyup="cal_net_salary3()"></td>
					    <td><input readonly required  class="input-cust-name" type="number" step="any" name="net_salary_3" id="net_salary_3"  value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->net_salary_3;}else{echo '0';}?>"></td>
					  </tr> 
					   <tr>
						<td><b>Avrage salary</b></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="avg_salary" id="avg_salary"  value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->avg_salary;}?>"></td>
						<td></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="avg_loan_advance_deduction" id="avg_loan_advance_deduction"  value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->avg_loan_advance_deduction;}?>"></td>
						<td></td>
					    <td><input readonly required  class="input-cust-name" type="number" step="any"  name="avg_net_salary" id="avg_net_salary"  value="<?php if(!empty($data_credit_analysis)){ echo  $data_credit_analysis->avg_net_salary;}?>"></td>
					  </tr>
					</tbody>
				</table>
			</div>
			
				
			
		
			
  					
		</div>
       
		<!-----------------------------Obligations Details------------------------------------------------------>
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
									<td><b>Type of Loan</b></td>
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
															  ?>
												
															<td ><input readonly class="input-cust-name" type="text" name="Bureau_Emi_Total"  value="<?php echo $total;?>"></td>
														  </tr>
									</tbody>
								</table>
							</div>
						</div>
			   </div>

       
		<?php  } } ?>
<!--------------------------------For Self Employeed Applicant--------------------------------->
        <?php if(!empty($income_details)){ if($income_details->CUST_TYPE=='self employeed')
		{ ?>
		    <div class="row shadow bg-white rounded margin-10 padding-15" style="margin-top:1%;">
					<div class="row justify-content-center col-12">
						<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Details of<?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>

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
									  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">PAN</span>
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
			</div>
			<?php if(!empty($income_details)){if($income_details->ITR_status=="" || $income_details->ITR_status=="yes"){?>
			<!----------------------------IT  Return----------------------->
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
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Total_Income_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Net_Sales_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Profit_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Interest_Expense_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Depreciation_1;} else{echo '0';}?>" ></td>
					    <td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PBT_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PAT_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Networth_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debt_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Working_Capital_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Creditors_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Fixed_Assets_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debtors_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Bank_Balance_1;} else{echo '0';}?>" ></td>
					 </tr>
					   <tr class="d-flex">
						<td class="col-1"><b><?php $twelveMonthsAgo = date("Y", strtotime("-24 months")); echo $twelveMonthsAgo;?></b></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Total_Income_2;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Net_Sales_2;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Profit_2;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Interest_Expense_2;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Depreciation_2;} else{echo '0';}?>" ></td>
					    <td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PBT_2;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PAT_2;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Networth_2;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debt_2;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Working_Capital_2;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Creditors_2;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Fixed_Assets_2;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debtors_2;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Bank_Balance_2;} else{echo '0';}?>" ></td>
					 </tr>
					 <tr class="d-flex">
						<td class="col-1"><b><?php $twelveMonthsAgo = date("Y", strtotime("-12 months")); echo $twelveMonthsAgo;?></b></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Total_Income_3;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Net_Sales_3;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Gross_Profit_3;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Interest_Expense_3;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Depreciation_3;} else{echo '0';}?>" ></td>
					    <td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PBT_3;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->PAT_3;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Networth_3;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debt_3;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Working_Capital_3;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Creditors_3;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Fixed_Assets_3;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Debtors_3;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Bank_Balance_3;} else{echo '0';}?>" ></td>
					 </tr>
					   
					</tbody>
				</table>
			</div>
		</div>

		<?php }elseif($income_details->ITR_status=="no"){//echo "no itr";?>
<!------------------------------------------ no itr------------------------------------------------------>
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
	  					
	  					<input readonly min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_1" id="NO_itr_value_1" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->sales_per_month_1; else if(!empty($income_details))echo $income_details->sales_per_month_1;?>">
	  					<input readonly min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_2" id="NO_itr_value_2" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->sales_per_cust_1 ; else if(!empty($income_details))echo $income_details->sales_per_cust_1 ;?>">
	  					<input readonly min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_3" id="NO_itr_value_3" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->cust_per_day_1 ; else if(!empty($income_details))echo $income_details->cust_per_day_1 ;?>">
	  					<input readonly min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_4" id="NO_itr_value_4" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_chachement_1 ; else if(!empty($income_details))echo $income_details->total_chachement_1 ;?>">
	  				</div>  
	  											  				
				</div>	
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-2 month'));?></span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input readonly min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_5" id="NO_itr_value_5" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->sales_per_month_2 ; else if(!empty($income_details))echo $income_details->sales_per_month_2 ;  ?>">
	  					<input readonly min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_6" id="NO_itr_value_6" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->sales_per_cust_2; else if(!empty($income_details))echo $income_details->sales_per_cust_2;?>">
	  					<input readonly min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_7" id="NO_itr_value_7" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->cust_per_day_2; else if(!empty($income_details))echo $income_details->cust_per_day_2;?>">
	  					<input readonly min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_8" id="NO_itr_value_8" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_chachement_2 ; else if(!empty($income_details))echo $income_details->total_chachement_2 ;?>">
	  				</div>  
	  											  				
				</div>	
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-1 month'));?></span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input readonly min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_9" id="NO_itr_value_9" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->sales_per_month_3; else if(!empty($income_details))echo $income_details->sales_per_month_3; ?>">
	  					<input readonly min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_10" id="NO_itr_value_10" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->sales_per_cust_3; else if(!empty($income_details))echo $income_details->sales_per_cust_3;?>">
	  					<input readonly min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_11" id="NO_itr_value_11" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->cust_per_day_3; else if(!empty($income_details))echo $income_details->cust_per_day_3;  ?>">
	  					<input readonly min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="" class="input-cust-name" type="number" name="NO_itr_value_12" id="NO_itr_value_12" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_chachement_3; else if(!empty($income_details))echo $income_details->total_chachement_3;?>">
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
	  					<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_annual" id="total_annual" value="<?php if(!empty($data_credit_analysis)) {echo $data_credit_analysis->total_anual ;} else if(!empty($income_details))echo $income_details->total_anual;?>">
	  					<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_gross_margin" id="total_gross_margin" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_gross_margin ; else if(!empty($income_details))echo $income_details->total_gross_margin;?>">
	  					<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_profit" id="total_profit" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_profit ; else if(!empty($income_details))echo $income_details->total_profit;?>">
	  					<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_expenses_utilities" id="total_expenses_utilities" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_utilities ;else if(!empty($income_details))echo $income_details->total_utilities;?>">
	  					<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_expenses_salaries" id="total_expenses_salaries" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_salaries ;else if(!empty($income_details))echo $income_details->total_salaries;?>">
	  					<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_expenses_rentals" id="total_expenses_rentals" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_rental; else if(!empty($income_details))echo $income_details->total_rental;?>">
	  					<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="total_additional_recurring_expenses" id="total_additional_recurring_expenses" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->total_recurring ;else if(!empty($income_details))echo $income_details->total_recurring;?>">
	  					<input  style=" margin-bottom: 10px;"  placeholder="" class="input-cust-name" type="number" name="gross_profit" id="gross_profit" value="<?php if(!empty($data_credit_analysis))echo $data_credit_analysis->gross_profit; else if(!empty($income_details))echo $income_details->gross_profit;?>">
	  				</div>  
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" ></div>
    

</div>
		<?php }}?>
	<!---------------------------Debetors And Credetord----------------------------------------------------->
	 <div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;"> Top 3 Debtors And Creditors of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>

			</div>
			<div class="container" >
				<table class="table table-responsive">
					
					<tbody>
					  <tr>
						<td><b>Creditor 1</b></td>
						
						<td><label>Name of creditor : </label><input disabled required  class="input-cust-name" type="text" name="Top_Creditors_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_1;}?>"></td>
						<td><label>Amount : </label><input disabled required  class="input-cust-name"  type="number" step="any" name="Top_Creditors_1_Amt"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_1_Amt;}?>"></td>
						<td><b>Debtor 1</b></td>
						<td><label>Name of debtor: </label><input  required  class="input-cust-name" type="text" name="Top_Debtors_1"  value="<?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->Top_Debtors_1;}?>"></td>
						<td><label>Amount : </label><input disabled required  class="input-cust-name"  type="number" step="any" name="Top_Debtors_1_Amt"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Debtors_1_Amt;}?>"></td>
						
					  </tr>
					   <tr>
						<td><b>Creditor 2 </b></td>
						<td><label>Name of creditor : </label><input  required  class="input-cust-name" type="text" name="Top_Creditors_2"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_2;}?>"></td>
						<td><label>Amount : </label><input disabled required  class="input-cust-name"  type="number" step="any" name="Top_Creditors_2_Amt"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_2_Amt;}?>"></td>
						<td><b>Debtors 2</b></td>
						<td><label>Name of debtor : </label><input  required  class="input-cust-name" type="text" name="Top_Debtors_2"  value="<?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->Top_Debtors_2;}?>"></td>
						<td><label>Amount : </label><input disabled required  class="input-cust-name"  type="number" step="any" name="Top_Debtors_2_Amt"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Debtors_2_Amt;}?>"></td>
					  </tr>
					   <tr>
						<td><b>Creditor 3</b></td>
						<td> <label>Name of creditor : </label><input  required  class="input-cust-name" type="text" name="Top_Creditors_3"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_3;}?>"></td>
						<td><label>Amount : </label><input disabled required  class="input-cust-name"  type="number" step="any" name="Top_Creditors_3_Amt"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Creditors_3_Amt;}?>"></td>
						<td><b>Debtors</b></td>
						<td><label>Name of debtor : </label><input  required  class="input-cust-name" type="text" name="Top_Debtors_3"  value="<?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->Top_Debtors_3;}?>"></td>
						<td><label>Amount : </label><input disabled required  class="input-cust-name"  type="number" step="any" name="Top_Debtors_3_Amt"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Top_Debtors_2_Amt;}?>"></td>
					  </tr>
					  
					</tbody>
				</table>
			</div>
		</div>
		<!------------------------Assesessed Income------------------------------------------>
		<?php if(!empty($row_more)){ if($row_more->verify_It_Returns=='no' ||$row_more->verify_It_Returns==' '||$row_more->verify_It_Returns=='NULL'){?>
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
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_1;} else{echo '0';}?>" ></td>
					    <td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_1;} else{echo '0';}?>" ></td>
						
					 </tr>
					    <tr class="d-flex">
						<td class="col-1"><b>Month 2</b></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_1;} else{echo '0';}?>" ></td>
					    <td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_1;} else{echo '0';}?>" ></td>
						
					 </tr>
					 <tr class="d-flex">
						<td class="col-1"><b>Month 3</b></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_1;} else{echo '0';}?>" ></td>
					    <td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_1;} else{echo '0';}?>" ></td>
						
					 </tr>
					  <tr class="d-flex">
						<td class="col-1"><b>Month 4</b></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_1;} else{echo '0';}?>" ></td>
					    <td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_1;} else{echo '0';}?>" ></td>
						
					 </tr>
					  <tr class="d-flex">
						<td class="col-1"><b>Month 5</b></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_1;} else{echo '0';}?>" ></td>
					    <td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_1;} else{echo '0';}?>" ></td>
						
					 </tr>
					 <tr class="d-flex">
						<td class="col-1"><b>Month 6</b></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_cash_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_cash_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Sales_bank_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Purchase_bank_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Labour_paid_1;} else{echo '0';}?>" ></td>
					    <td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Transport_charges_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Other_charges_1;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_income_1;} else{echo '0';}?>" ></td>
						
					 </tr>
					 <tr class="d-flex">
						<td class="col-1"><b>Total</b></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Sales_cash;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Purchase_cash;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Sales_bank;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Purchase_bank;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Labour_paid;} else{echo '0';}?>" ></td>
					    <td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Transport_charges;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Other_charges;} else{echo '0';}?>" ></td>
						<td class="col-2"><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1" id="gross_salary_1"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->Total_Total_income;} else{echo '0';}?>" ></td>
						
					 </tr>
					</tbody>
				</table>
			</div>
		</div>
		<?php }} ?>
		<?php if($income_details->BIS_CONSTITUTION=='PROPRIETORSHIP'){?>
		<!-----------------------------Obligations Details------------------------------------------------------>
        <div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Obligations Details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Co-Applicant )"?></span>

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
										 if(isset($data_obligation['InstallmentAmount']))
										 { ?>
											 <tr>
												<td><b><?php echo $i;?></b></td>
												<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){echo $data_obligation['Institution'];}?>"></td>
												<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){echo $data_obligation['AccountType'];}?>"></td>
												<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){echo $data_obligation['SanctionAmount'];;}?>"></td>
												<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){echo $data_obligation['Balance'];;}?>"></td>
												<td><input disabled required name="installment_"<?php  echo $i; ?> class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($income_details)){ echo $data_obligation['InstallmentAmount'];}?>"></td>
											  </tr>
										<?php  $i++; }
										
									}
									
								}
						?>
						                    <tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>Total</td>
												<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($total_obligation)){ echo $total_obligation;}?>"></td>
												
											  </tr>
						 
						  
						</tbody>
					</table>
				</div>
			 
			</div>
			
				
			
		
			
  					
		</div>
		
		<?php } ?>
		<?php } } ?>
		<!---------------------------------------------------self Employed and salried data------------------------------------------------>
		          <!--------------------------------------------------Bureau Analysis-------------------------------------------------->
        <div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Bureau Analysis of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Co-Applicant )"?></span>

			</div>
			
				 <div class="w-100"></div>
					<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Score</span>
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
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($credit_score_response)){ if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary'])) {echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];}}?>">
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
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($credit_score_response)){ if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary'])) {echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'];}}?>">
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of Write off accounts</span>
							</div>		
							<div class="w-100"></div>
							
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($credit_score_response)){ if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary'])) {echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfWriteOffs'];}}?>">
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
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($credit_score_response)){ if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary'])) {echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts'];}}?>">
							</div>
							
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Total loan Balance</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($credit_score_response)){ if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary'])) {echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount'];}}?>">
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">No of past due accounts</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($credit_score_response)){ if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary'])) {echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfPastDueAccounts'];}}?>">
							</div>
						</div>							  				
					</div>	
			
			
		
			
  					
		</div>
		 <!-------------------------------Bank Statement Analysis--------------------->
        <div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;"> Bank Statement Analysis of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Co-Applicant )"?></span>

			</div>
			<div class="container">
				<table class="table table-responsive">
					
					<tbody>
					  <tr>
						<td><b>Average Balance</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_avg_balance;}?>"></td>
						<td><b>Total Credits</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->b_s_total_credits;}?>"></td>
						<td><b>Total Debits</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_total_debits;}?>"></td>
					  </tr>
					  <tr >
						<td><b>Credit Analysis</b></td>
						<td><b>Salary</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_salary;}?>"></td>
						<td><b>Reimbursements</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_reimbursements;}?>"></td>
					    <td></td>
					  </tr>
					  <tr>
						<td><b>Debit Analysis</b></td>
						<td><b>Household</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_credit_analysis)){echo $data_credit_analysis->b_s_houshold;}?>"></td>
						<td><b>EMI</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_emi;}?>"></td>
					    <td><b>Charges</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_charges;}?>"></td>
						<td><b>Cheque Bounce charges</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_credit_analysis)){ echo $data_credit_analysis->b_s_cheque_bounce_charges;}?>"></td>
					  </tr>
					  
					</tbody>
				</table>
			</div>
			
				
			
		
			
  					
		</div>
		
<!--------------------------------coapplicant details--------------------->

		
		<?php $i=1; foreach ($coapplicants as $coapplicant) { echo "<script type='text/javascript'>$( document ).ready(function() {
					coapp_cal_net_salary1($i);coapp_cal_net_salary2($i);coapp_cal_net_salary3($i);coapp_cal_avg_salary($i); coapp_cal_loan_amount($i);
				});</script>" ?>
		         <?php if(!empty($coapplicant)){ if($coapplicant->COAPP_TYPE=='salaried')
		{ ?>
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Details of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>

			</div>
		
				 <div class="w-100"></div>
					<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Salary</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_3;}?>">
							</div>
							
							<div class="w-100"></div>

							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Salary as  per salary slip</span>
							</div>		
							<div class="w-100"></div>
							
							<div style="margin-left: 35px;" class="col">
							<div class="input-cust-name" style=" margin-top: 8px;">
							
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled type="radio" name="verify_salary_<?php echo $i; ?>" value="yes" <?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])) if($coapp_data_credit_analysis_array[$i]->verify_salary == 'yes') echo ' checked="true"'; }?>> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled type="radio" name="verify_salary_<?php echo $i; ?>" value="no" <?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ if($coapp_data_credit_analysis_array[$i]->verify_salary == 'no'|| $coapp_data_credit_analysis_array[$i]->verify_salary == '' || $coapp_data_credit_analysis_array[$i]->verify_salary== 'NULL') echo ' checked="true"';} else{echo' checked="true"';}  } else {echo ' checked="true"';}?>> No
										</div>
									</div>						
								</div>  					
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Residual Income </span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])) echo $coapp_data_credit_analysis_array[$i]->residual_income;}?>">
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
											<input disabled type="radio" name="verify_residual_income_<?php echo $i; ?>" value="yes" <?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){if ($coapp_data_credit_analysis_array[$i]->verify_residual_income == 'yes') echo ' checked="true"';} }?>> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled type="radio" name="verify_residual_income_<?php echo $i; ?>" value="no" <?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){ if ($coapp_data_credit_analysis_array[$i]->verify_residual_income == 'no' || $coapp_data_credit_analysis_array[$i]->verify_residual_income == '' || $coapp_data_credit_analysis_array[$i]->verify_residual_income == 'NULL') echo ' checked="true"'; }else{echo ' checked="true"';}} else{  echo ' checked="true"'; }?>> No
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
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])) {echo $coapp_data_credit_analysis_array[$i]->credit_salary;}}?>">
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
											<input disabled type="radio" name="verify_credit_salary_<?php echo $i; ?>" value="yes" <?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){if ($coapp_data_credit_analysis_array[$i]->verify_credit_salary == 'yes') echo ' checked="true"';} }?>> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled type="radio" name="verify_credit_salary_<?php echo $i; ?>" value="no" <?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){ if ($coapp_data_credit_analysis_array[$i]->verify_credit_salary == 'no' || $coapp_data_credit_analysis_array[$i]->verify_credit_salary == '' || $coapp_data_credit_analysis_array[$i]->verify_credit_salary == 'NULL') echo ' checked="true"'; }else{ echo 'checked="true"';}}else{echo 'checked="true"';}?>> No
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
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_obligation_array)){ if(!empty($coapp_data_obligation_array[$i])){echo $coapp_data_obligation_array[$i];}}?>">
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
											<input disabled type="radio" name="verify_obl_<?php echo $i; ?>" value="yes" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_obligation == 'yes') echo ' checked="true"'; }?>> yes
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
											<input disabled type="radio" name="verify_obl_<?php echo $i; ?>" value="no" <?php if(!empty($data_credit_analysis)){  if ($data_credit_analysis->verify_obligation == 'no' || $data_credit_analysis->verify_obligation == '' || $data_credit_analysis->verify_obligation == 'NULL') echo ' checked="true"'; }?>> No
										</div>
									</div>						
								</div>  									
							</div>
							
						</div>							  				
					</div>	
		</div>
		<!---------------Orgnaization details-------------------------------------------->
	<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Company Details of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>

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
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Company Type</span>
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
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Product / service offer by company</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_INDUSTRY_OPERATING;}?>">
							</div>


							
							
						</div>							  				
					</div>	
					<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Total Work Ex</span>
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
		<!-----------------------------Income Details------------------------------------------------------>
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
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_1_<?php echo $i;?>" id="gross_salary_1_<?php echo $i;?>"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_1;}?>" onkeyup="coapp_cal_avg_salary(<?php echo $i; ?>); coapp_cal_net_salary1(<?php echo $i; ?>)"></td>
						<td><input readonly required  class="input-cust-name"  type="number" step="any" name="epf_deduction_1_<?php echo $i; ?>" id="epf_deduction_1_<?php echo $i; ?>" value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->epf_deduction_1;}else{echo 0; }}?>" onkeyup="coapp_cal_net_salary1(<?php echo $i;?>)" ></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="loan_advance_deduction_1_<?php echo $i; ?>" id="loan_advance_deduction_1_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->loan_advance_deduction_1;}else{echo 0; } }?>" onkeyup="coapp_cal_loan_amount(<?php echo $i;?>); coapp_cal_net_salary1(<?php echo $i;?>)"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="any_other_deduction_1_<?php echo $i;?>" id="any_other_deduction_1_<?php echo $i;?>"   value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->any_other_deduction_1;}else{echo 0; }}?>" onkeyup="coapp_cal_net_salary1(<?php echo $i;?>)"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="net_salary_1_<?php echo $i;?>" id="net_salary_1_<?php echo $i;?>"   value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->net_salary_1;}else{echo 0; }}?>"></td>
					  </tr>
					  <tr>
						<td><b>Month 2</b></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="gross_salary_2_<?php echo $i;?>" id="gross_salary_2_<?php echo $i;?>"  value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_2;}?>" onkeyup="coapp_cal_avg_salary(<?php echo $i; ?>); coapp_cal_net_salary2(<?php echo $i; ?>)"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="epf_deduction_2_<?php echo $i; ?>" id="epf_deduction_2_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->epf_deduction_2;}else{echo 0; }}?>" onkeyup="coapp_cal_net_salary2(<?php echo $i;?>)" ></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="loan_advance_deduction_2_<?php echo $i; ?>" id="loan_advance_deduction_2_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->loan_advance_deduction_2;}else{echo 0; } }?>" onkeyup="coapp_cal_loan_amount(<?php echo $i?>); coapp_cal_net_salary2(<?php echo $i;?>)"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="any_other_deduction_2_<?php echo $i;?>" id="any_other_deduction_2_<?php echo $i;?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->any_other_deduction_2;}else{echo 0; }}?>" onkeyup="coapp_cal_net_salary2(<?php echo $i;?>)"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="net_salary_2_<?php echo $i;?>" id="net_salary_2_<?php echo $i;?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->net_salary_2;}else{echo 0; }}?>"></td>
					  </tr>
					  <tr>
						<td><b>Month 3</b></td>
						<td><input readonly  required  class="input-cust-name" type="number" step="any" name="gross_salary_3_<?php echo $i;?>" id="gross_salary_3_<?php echo $i;?>" value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_3;}?>" onkeyup="coapp_cal_avg_salary(<?php echo $i; ?>); coapp_cal_net_salary3(<?php echo $i;?>)"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="epf_deduction_3_<?php echo $i; ?>" id="epf_deduction_3_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->epf_deduction_3;}else{echo 0; }}?>" onkeyup="coapp_cal_net_salary3(<?php echo $i;?>)"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="loan_advance_deduction_3_<?php echo $i; ?>" id="loan_advance_deduction_3_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->loan_advance_deduction_3;}else{echo 0; } }?>" onkeyup="coapp_cal_loan_amount(<?php echo $i?>); coapp_cal_net_salary3(<?php echo $i;?>)"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="any_other_deduction_3_<?php echo $i;?>" id="any_other_deduction_3_<?php echo $i;?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->any_other_deduction_3;}else{echo 0; }}?>" onkeyup="coapp_cal_net_salary3(<?php echo $i;?>)"></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="net_salary_3_<?php echo $i;?>" id="net_salary_3_<?php echo $i;?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->net_salary_3;}else{echo 0; }}?>" ></td>
					  </tr>
					   <tr>
						<td><b>Avrage salary</b></td>
						<td><input readonly required  class="input-cust-name" type="number" step="any" name="avg_salary_<?php echo $i; ?>" id="avg_salary_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->avg_salary;}else{echo 0; } }?>"></td>
						<td></td>
						<td><input readonly required  class="input-cust-name"  type="number" step="any" name="avg_loan_advance_deduction_<?php echo $i; ?>" id="avg_loan_advance_deduction_<?php echo $i; ?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->avg_loan_advance_deduction;}else{echo 0; }}?>"></td>
						<td></td>
					    <td><input readonly required  class="input-cust-name" type="number" step="any"  name="avg_net_salary_<?php echo $i;?>" id="avg_net_salary_<?php echo $i;?>"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->avg_net_salary;}else{echo 0; }}?>"></td>
					  </tr>
					</tbody>
				</table>
			</div>
			
				
			
		
			
  					
		</div>
		<!-----------------------------Obligations Details------------------------------------------------------>
		<?php if(!empty($coapp_data_obligations_array)){ if(!empty($coapp_data_obligations_array[$i])){?>
        <div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Obligations details of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>

			</div>
			<div class="container" >
			    <div class="justify-content-center">
				
					<table class="table table-responsive justify-content-center">
						<thead>
						  <tr>
							<td><b>SR NO</b></td>
							<td><b>Active Loans</b></td>
							<td><b>Type of Loan</b></td>
							<td><b>Loan Amount</b></td>
							<td><b>Balance Amount</b></td>
							<td><b>EMI</b></td>
						  </tr>
						</thead>
						<tbody>
						
						<?php
						    
								foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations)
								{
									
									if($coapp_data_obligations['Open']=='Yes')
									{
										// if(isset($coapp_data_obligations['InstallmentAmount']))
										// {
											  ?>
											 <tr>
												<td><b><?php echo $no=1;;?></b></td>
												<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_obligations)){echo $coapp_data_obligations['Institution'];}?>"></td>
												<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_obligations)){echo $coapp_data_obligations['AccountType'];}?>"></td>
												<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_obligations['SanctionAmount'])){ echo $coapp_data_obligations['SanctionAmount'];}?>"></td>
												<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_obligations)){echo $coapp_data_obligations['Balance'];;}?>"></td>
											  </tr>
										<?php //  }
										
									}
									
								}
						?>
						                    <tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>Total</td>
												<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_obligation_array)){ if(!empty($coapp_data_obligation_array[$i])){echo $coapp_data_obligation_array[$i];}}?>"></td>
												
											  </tr>
						 
						  
						</tbody>
					</table>
				</div>
			 
			</div>
			
				
			
		
			
  					
		</div>
		<?php }} ?>
		<!--------------------------------------------------Bureau Analysis-------------------------------------------------->
		
		<?php if(!empty($coapp_credit_score_array))
		{ if(!empty($coapp_credit_score_array[$i])){
			//echo $TotalSanctionAmount;
			
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
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_credit_score_array)){ if(!empty($coapp_credit_score_array[$i])){if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'])){ $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];}}}?>">
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
											<input disabled type="radio" name="add_verify" value="false" <?php if(!empty($coapp_add_flag)){ if(!empty($coapp_add_flag[$i])){if ($address_flag== 'false') echo ' checked="true"'; }}?>> No
										</div>
									</div>						
								</div>  	
							</div> 
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Total Sanction Amount</span>
							</div>		
							<div class="w-100"></div>
							
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input disabled required class="input-cust-name" type="text" name="dob" value="<?php if(!empty($coapp_credit_score_array[$i])){ if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary'])) {echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];}}?>">
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Enquiry Summary</span>
							</div>
							<?php
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
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_credit_score_array)){ echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'];}?>">
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of Write off accounts</span>
							</div>		
							<div class="w-100"></div>
							
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_credit_score_array)){ echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfWriteOffs'];}?>">
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Recent Activity</span>
							</div>
							<?php
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
							?>


							
							
						</div>							  				
					</div>	
					<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"> Number of Loan Accounts</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_credit_score_array)){ echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts'];}?>">
							</div>
							
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Total loan Balance</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_credit_score_array)){ echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount'];}?>">
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							  <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">No of past due accounts</span>
							</div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_credit_score_array)){ echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfPastDueAccounts'];}?>">
							</div>
						</div>							  				
					</div>	
			
			
		
			
  					
		</div>
		<?php } }?>
		<!-------------------------------Bank Statement Analysis--------------------->
		
		
        <div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Bank statement analysis of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>

			</div>
			<div class="container">
				<table class="table table-responsive">
					
					<tbody>
					  <tr>
						<td><b>Avrage Balance</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_credit_analysis_array)){  if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->b_s_avg_balance;}}?>"></td>
						<td><b>Total Credits</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_total_credits;}}?>"></td>
						<td><b>Total Debits</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_total_debits;}}?>"></td>
					  </tr>
					  <tr >
						<td><b>Credit Analysis</b></td>
						<td><b>Salary</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_salary;}}?>"></td>
						<td><b>Reimbursements</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_reimbursements;}}?>"></td>
					    <td></td>
					  </tr>
					  <tr>
						<td><b>Debit Analysis</b></td>
						<td><b>Household</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_houshold;}}?>"></td>
						<td><b>EMI</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->b_s_emi;}}?>"></td>
					    <td><b>Charges</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_credit_analysis_array)){ if(!empty($coapp_data_credit_analysis_array[$i])){echo $coapp_data_credit_analysis_array[$i]->b_s_charges;}}?>"></td>
						<td><b>Cheque bounce charges</b></td>
						<td><input disabled required  class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){ echo $coapp_data_credit_analysis_array[$i]->b_s_cheque_bounce_charges;}}?>"></td>
					  </tr>
					  
					</tbody>
				</table>
			</div>
			
				
			
		
			
  					
		</div>
		
		
		<?php } } $i++;}?>



        	
	</div>
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
		<script>
	$(document).ready(function()
	{
		  
		  var salary1=parseFloat(document.getElementById('gross_salary_1').value);
		  var salary2=parseFloat(document.getElementById('gross_salary_2').value);
		  var salary3=parseFloat(document.getElementById('gross_salary_3').value);
		  var avg_sal=salary1+salary2+salary3/3;
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
		  var salary2=parseFloat(document.getElementById('gross_salary_2').value);
		  var salary3=parseFloat(document.getElementById('gross_salary_3').value);
		  var avg_sal=(salary1+salary2+salary3)/3;
		  document.getElementById('avg_salary').value=avg_sal;
		  
		 
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
		 var net_salary_3=parseFloat(document.getElementById('net_salary_2').value);
		 var avg_net_salary=net_salary_2+net_salary_3+net_salary_1/3;
		 document.getElementById('avg_net_salary').value=avg_net_salary;
		 
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
		 var net_salary_3=parseFloat(document.getElementById('net_salary_2_'+i).value);
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
		 var net_salary_3=parseFloat(document.getElementById('net_salary_2').value);
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
		 var net_salary_3=parseFloat(document.getElementById('net_salary_2_'+i).value);
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
		
		 var salary2=parseFloat(document.getElementById('gross_salary_2_'+i).value);
		 var loan_advance_deduction_2=parseFloat(document.getElementById('loan_advance_deduction_3_'+i).value);
		 var epf_deduction_2=parseFloat(document.getElementById('epf_deduction_3_'+i).value);
		 var any_other_deduction_2=parseFloat(document.getElementById('any_other_deduction_3_'+i).value);
		 var net_salary_2=salary2-loan_advance_deduction_2-epf_deduction_2-any_other_deduction_2;
		 document.getElementById('net_salary_3_'+i).value=net_salary_2;
		 var net_salary_1=parseFloat(document.getElementById('net_salary_1_'+i).value);
		 var net_salary_3=parseFloat(document.getElementById('net_salary_2_'+i).value);
		 var avg_net_salary=net_salary_2+net_salary_3+net_salary_1/3;
		 document.getElementById('avg_net_salary_'+i).value=avg_net_salary;
	  }
	    
	 
	
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
</script>