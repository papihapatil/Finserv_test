
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
 


  	<div class="stepper-item active">
    	 <a href="<?php echo base_url()?>index.php/Operations_user/Credit_Analysis"><div class="step-counter"><i style="font-size:18px;color: #25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></div>
      	<div class="step-name">Credit & Analysis</div></a>
  	</div>


  <div class="stepper-item completed">
    <a href="<?php echo base_url()?>index.php/Operations_user/Other_attributes"><div class="step-counter"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></div> 
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
									<li id="<?php echo $doc->ID;?>"><?php echo $doc->DOC_TYPE;?></li>
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
			
		</div>
       <br>
       <br>
	<form method="POST" action="<?php echo base_url(); ?>index.php/Operations_user/update_Other_attributes" id="">
		
		<div class="row shadow bg-white rounded margin-10 padding-15" id="ApplicantDiv">
			     <div class="row  col-12">
         <a href="#ApplicantDiv"  style="padding-bottom:10px;">
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
							<div class="row income-type-box-unselected justify-content-center padding-5" style="box-shadow: rgb(0 0 0 / 15%) 0px 4px 8px 0px, rgb(0 0 0 / 14%) 0px 6px 20px 0px; height:70px; width:200px;">
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
							<div class="row  income-type-box-unselected justify-content-center " style="box-shadow: rgb(0 0 0 / 15%) 0px 4px 8px 0px, rgb(0 0 0 / 14%) 0px 6px 20px 0px; height:70px; width:200px;">
								<?php if($coapplicant->GENDER == 'male') { ?>
								  <i class='fas fa-male' style='font-size:40px;color:skyblue; margin-left: -33px;'></i>
								 <?php } else
								 {
								 ?>
								   <i class='fas fa-female' style='font-size:40px;color:skyblue; margin-left: -33px;'></i>
								 <?php
								 }?>
								<span class="font-6" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;padding-left: 25px;">Co-Applicant <?php echo $i;?></span>
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
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Linkedin details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>

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
									<input  type="radio" name="Pre_employement" value="yes" <?php if(!empty($row_more)){ if($row_more->Pre_employement=="yes"){ echo 'checked';}}?> > yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="dis">
									<input  type="radio" name="Pre_employement" value="no" <?php if(!empty($row_more))if ($row_more->Pre_employement == 'no'|| $row_more->Pre_employement == 'NULL' || $row_more->Pre_employement == '') echo ' checked="true"'; ?>> no
								</div>
								</div>
							</div>	
						</div>  
	  				</div>
				</div>
					
	  				
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  			     <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Past employment Verification</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<div class="input-cust-name" style=" margin-top: 8px;">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input  type="radio" name="Past_Employement" value="yes" <?php if(!empty($row_more)){ if($row_more->Past_Employement=="yes"){ echo 'checked';}}?> > yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="dis">
									<input  type="radio" name="Past_Employement" value="no" <?php if(!empty($row_more))if ($row_more->Past_Employement == 'no'|| $row_more->Past_Employement == 'NULL' || $row_more->Past_Employement == '') echo ' checked="true"'; ?>> no
								</div>
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
									<input  type="radio" name="Edu_background" value="yes" <?php if(!empty($row_more)){ if($row_more->Edu_background=='yes'){ echo 'checked';}}?> > yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="dis">
									<input   type="radio" name="Edu_background" value="no"  <?php if(!empty($row_more))if ($row_more->Edu_background == 'no'|| $row_more->Edu_background == 'NULL' || $row_more->Edu_background == '') echo ' checked="true"'; ?>> no
								</div>
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
							<input   class="input-cust-name" type="number"  name="Connects"  value="<?php if(!empty($row_more)){ if($row_more->Connects){ echo $row_more->Connects;}}?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Recommendations given by supervisors</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input   class="input-cust-name" type="text" name="Recommendations"  value="<?php if(!empty($row_more)){ if($row_more->Recommendations){ echo $row_more->Recommendations;}}?>">
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
						         <div style="margin-left: 35px;  margin-top: 8px;" class="col" id="Professional_courses_row">
										<input   class="input-cust-name" type="text"  
											 name="Professional_courses[]"  value="">
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<div style="color: blue;" class="add-more" type="button" id="add_more_Professional_courses">Add More</div>
									
									</div>
						
									
						
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
										<input   class="input-cust-name" type="text"  
											 name="Hobbies[]"  value="<?php if(!empty($Hobbie)){ echo $Hobbie;}?>">
									</div>
									
								 <?php }
							}
						} ?>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col" id="Hobbies_row">
							<input   class="input-cust-name" type="text" title="" name="Hobbies[]" >
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<div style="color: blue;" class="add-more" type="button" id="add_more_Hobbies">Add More</div>
						
						</div>
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
										<input   class="input-cust-name" type="text"  
											 name="Skills[]"  value="<?php if(!empty($Skill)){ echo $Skill;}?>">
									</div>
								
									
								 <?php }
							}
						} ?>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col" id="Skills_row">
							<input   class="input-cust-name" type="text" title="" name="Skills[]"  >
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<div style="color: blue;" class="add-more" type="button" id="add_more_Skills">Add More</div>
						</div>
				</div>
					
											  				
			</div>	
			
  				
		</div>
		
<!------------Personal Details----------------------->
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Facebook details of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>
			</div>
			
			<div class="w-100"></div>
			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				    <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Latest vacation done if any</span>
					</div>
					<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input   class="input-cust-name" type="text" name="vacation"  value="<?php if(!empty($row_more)){ if($row_more->vacation){ echo $row_more->vacation;}}?>">
						</div>
				</div>
					
	  				
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  			     <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Unusual </span>
					</div>
					<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input   class="input-cust-name" type="text" name="anti_post"  value="<?php if(!empty($row_more)){ if($row_more->anti_post){ echo $row_more->anti_post;}}?>">
						</div>
				</div>
			</div>
			
			
  			 			
		</div>


<!-------------------------------------------------------------- co applicants --------------------------------------------------------------------------->
<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)) {?>
	<div class="row shadow bg-white rounded margin-10 padding-15" id="<?php echo $coapplicant->FN; ?>">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Linkedin details of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>

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
									<input  type="radio" name="Pre_employement_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Pre_employement=="yes"){ echo 'checked';}}?> > yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="dis">
									<input  type="radio" name="Pre_employement_<?php echo $i; ?>" value="no" <?php if(!empty($coapplicant))if ($coapplicant->Pre_employement == 'no'|| $coapplicant->Pre_employement == 'NULL' || $coapplicant->Pre_employement == '') echo ' checked="true"'; ?>> no
								</div>
</div>
							</div>	
						</div>  
	  				</div>
				</div>
				<input type="hidden" name="co_id_<?php echo $i; ?>" value="<?php echo $coapplicant->UNIQUE_CODE ;?>">
								
	  				
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  			     <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Past employment Verification</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<div class="input-cust-name" style=" margin-top: 8px;">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input  type="radio" name="Past_Employement_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Past_Employement=="yes"){ echo 'checked';}}?> > yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="dis">
									<input  type="radio" name="Past_Employement_<?php echo $i; ?>" value="no" <?php if(!empty($coapplicant))if ($coapplicant->Past_Employement == 'no'|| $coapplicant->Past_Employement == 'NULL' || $coapplicant->Past_Employement == '') echo ' checked="true"'; ?>> no
								</div>
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
									<input  type="radio" name="Edu_background_<?php echo $i; ?>" value="yes" <?php if(!empty($coapplicant)){ if($coapplicant->Edu_background=='yes'){ echo 'checked';}}?> > yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="dis">
									<input   type="radio" name="Edu_background_<?php echo $i; ?>" value="no"  <?php if(!empty($coapplicant))if ($coapplicant->Edu_background == 'no'|| $coapplicant->Edu_background == 'NULL' || $row_more->Edu_background == '') echo ' checked="true"'; ?>> no
								</div>
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
							<input   class="input-cust-name" type="number"  name="Connects_<?php echo $i; ?>"  value="<?php if(!empty($coapplicant)){ if($coapplicant->Connects){ echo $coapplicant->Connects;}}?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Recommendations given by supervisors</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input   class="input-cust-name" type="text" name="Recommendations_<?php echo $i; ?>"  value="<?php if(!empty($coapplicant)){ if($coapplicant->Recommendations){ echo $coapplicant->Recommendations;}}?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Professional courses done </span>
					</div>		
						<div class="w-100"></div>
						<?php if(!empty($coapplicant))
						{ if($coapplicant->Professional_courses)
							{ $Professional_courses=explode(",",$coapplicant->Professional_courses);
								 foreach($Professional_courses as $Professional_course)
								 { if($Professional_course==''){break;}?>
								    
						
									<div style="margin-left: 35px;  margin-top: 8px;" class="col" id="">
										<input   class="input-cust-name" type="text"  
											 name="Professional_courses_<?php echo $i; ?>[]"  value="<?php if(!empty($Professional_course)){ echo $Professional_course;}?>">
									</div>
									
								 <?php }
							}
						} ?>
						         <div style="margin-left: 35px;  margin-top: 8px;" class="col" id="Professional_courses_row">
										<input   class="input-cust-name" type="text"  
											 name="Professional_courses_<?php echo $i; ?>[]"  value="">
									</div>
									<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<div style="color: blue;" class="add-more" type="button" id="add_more_Professional_courses">Add More</div>
									
									</div>
						
									
						
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Hobbies</span>
					</div>		
						<div class="w-100"></div>
						<?php if(!empty($coapplicant))
						{ if($coapplicant->Hobbies)
							{ $Hobbies=explode(",",$coapplicant->Hobbies);
								 foreach($Hobbies as $Hobbie)
								 { if($Hobbie==''){break;}?>
						
									<div style="margin-left: 35px;  margin-top: 8px;" class="col" id="">
										<input   class="input-cust-name" type="text"  
											 name="Hobbies_<?php echo $i; ?>[]"  value="<?php if(!empty($Hobbie)){ echo $Hobbie;}?>">
									</div>
									
								 <?php }
							}
						} ?>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col" id="Hobbies_row">
							<input   class="input-cust-name" type="text" title="" name="Hobbies_<?php echo $i; ?>[]" >
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<div style="color: blue;" class="add-more" type="button" id="add_more_Hobbies">Add More</div>
						
						</div>
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Skills and Endorsements</span>
					</div>		
						<div class="w-100"></div>
						<?php if(!empty($coapplicant))
						{ if($coapplicant->Skills)
							{ $Skills=explode(",",$coapplicant->Skills);
								 foreach($Skills as $Skill)
								 { if($Skill==''){break;}?>
						         
									<div style="margin-left: 35px;  margin-top: 8px;" class="col" id="">
										<input   class="input-cust-name" type="text"  
											 name="Skills_<?php echo $i; ?>[]"  value="<?php if(!empty($Skill)){ echo $Skill;}?>">
									</div>
								
									
								 <?php }
							}
						} ?>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col" id="Skills_row">
							<input   class="input-cust-name" type="text" title="" name="Skills_<?php echo $i; ?>[]"  >
						</div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<div style="color: blue;" class="add-more" type="button" id="add_more_Skills">Add More</div>
						</div>
				</div>
					
											  				
			</div>	
			
  				
		</div>



		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Facebook details of <?php if(!empty($coapplicant)) echo " - ".$coapplicant->FN." ".$coapplicant->LN." ( Co-Applicant )"?></span>
			</div>
			
			<div class="w-100"></div>
			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				    <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Latest vacation done if any</span>
					</div>
					<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input   class="input-cust-name" type="text" name="vacation_<?php echo $i; ?>"  value="<?php if(!empty($coapplicant)){ if($coapplicant->vacation){ echo $row_more->vacation;}}?>">
						</div>
				</div>
					
	  				
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  			     <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Unusual </span>
					</div>
					<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input   class="input-cust-name" type="text" name="anti_post_<?php echo $i; ?>"  value="<?php if(!empty($coapplicant)){ if($coapplicant->anti_post){ echo $coapplicant->anti_post;}}?>">
						</div>
				</div>
			</div>
			
			
  			 			
		</div>
<?php } $i++; }?>	


       
	</div>
	
	<div class="row shadow bg-white rounded margin-10 padding-15" >
				<div class="row col-12 justify-content-center">
				<div>
					<?php if($appliedloan->LOAN_TYPE=='home' || $appliedloan->LOAN_TYPE=='lap')
			             {	?>	
						<a href="<?php echo base_url()?>index.php/Operations_user/collateral">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							NEXT
						</button></a>
						 <?php } else{ ?>
						 						<a href="<?php echo base_url()?>index.php/Operations_user/Other_attributes">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							NEXT
						</button></a>
						 <?php } ?>
					</div>			
				</div>					
			</div>
	</form>
	<script>
	$("#add_more_Professional_courses").click(function(e){
            e.preventDefault ? e.preventDefault() : (e.returnValue = false);         
            var clone = "<div id='Professional_course_row'>"+
			              "<input  class='input-cust-name' type='text' ' title='' name='Professional_courses[]'  style='margin-top:10px;'>"+
			             "<input class='Professional_courses_row_remove other-income-select' type='button' value='DELETE' style='margin-left:4px; color: red;' >"+
						"</div>";
						
            $("#Professional_courses_row").append(clone);
			//alert("hi");
        }); 
       $('#Professional_courses_row').on('click', '.Professional_courses_row_remove', function() {
         $(this).closest("#Professional_course_row").remove();
         //alert("hi");
        });		
		$("#add_more_Hobbies").click(function(e){
            e.preventDefault ? e.preventDefault() : (e.returnValue = false);         
            var clone = "<div id='Hobbie_row'>"+
			              "<input   class='input-cust-name' type='text'  name='Hobbies[]'  style='margin-top:10px;' >"+
			             "<input class='Hobbies_row_remove other-income-select' type='button' value='DELETE' style='margin-left:4px; color: red;' >"+
						"</div>";
						
            $("#Hobbies_row").append(clone);
			//alert("hi");
        }); 
       $('#Hobbies_row').on('click', '.Hobbies_row_remove', function() {
         $(this).closest("#Hobbie_row").remove();
         //alert("hi");
        });
			$("#add_more_Skills").click(function(e){
            e.preventDefault ? e.preventDefault() : (e.returnValue = false);         
            var clone = "<div id='Skill_row'>"+
			              "<input   class='input-cust-name' type='text'  name='Skills[]'  style='margin-top:10px;' >"+
			             "<input class='Skills_row_remove other-income-select' type='button' value='DELETE' style='margin-left:4px; color: red;' >"+
						"</div>";
						
            $("#Skills_row").append(clone);
			//alert("hi");
        }); 
       $('#Skills_row').on('click', '.Skills_row_remove', function() {
         $(this).closest("#Skill_row").remove();
         //alert("hi");
        });
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