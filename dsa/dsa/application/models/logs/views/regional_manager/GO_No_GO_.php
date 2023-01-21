<?php
 $result = $this->session->flashdata('result'); 
 
 
 if(!empty($score))
 {
	$score1=$score;
 }
 else{
	$score1=0; 
 }
 
 $this->session->userdata('Coapplicant_id');
  $score_success_ = $this->session->userdata('score_success');
 $Applicant_id =$this->session->userdata('Applicant_id');



 if (isset($result)) 
    {
		     if($result=='1'){ echo '<script> swal("success!", "Credit Bureau pulled Successfully.", "success");</script>'; $this->session->unset_userdata('result');$this->session->unset_userdata('Coapplicant_id');}
		else if($result=='2'){ echo '<script> swal("warning!", "Something went wrong '.$score_success_.'", "warning");</script>';$this->session->unset_userdata('result');$this->session->unset_userdata('Coapplicant_id'); }
		else if($result=='3'){ echo '<script> swal("warning!", "'.$score_success_.'", "warning").then( function() { window.location.replace("/dsa/dsa/index.php/dsa/GO_No_GO_add_coapplicant?Applicant_ID='.$Applicant_id.'"); } );
		  </script>';$this->session->unset_userdata('result');}
		else if($result=='4'){ echo '<script> swal("success!", "Customer not found in bureau.", "success");</script>';$this->session->unset_userdata('result');$this->session->unset_userdata('Coapplicant_id'); }
	   else if($result=='5'){ echo '<script> swal("success!", "You have alredy pulled bureau successfully.", "success");</script>';$this->session->unset_userdata('result'); $this->session->unset_userdata('Coapplicant_id');}
	     else if($result=='6'){ echo '<script> swal("success!", "Co-Applicant Added successfully.", "success");</script>';$this->session->unset_userdata('result'); $this->session->unset_userdata('Coapplicant_id');}
	 	   else if($result=='7'){ echo '<script> swal("success!", "Details Updated Successfully.", "success");</script>';$this->session->unset_userdata('result'); $this->session->unset_userdata('Coapplicant_id');}
	 	  else if($result=='8'){ echo '<script> swal("success!", "Status Noted Successfully.", "success");</script>';$this->session->unset_userdata('result'); $this->session->unset_userdata('Coapplicant_id');}
	 	  else if($result=='9'){ echo '<script> swal("warning!", "Something went wrong ", "warning");</script>';$this->session->unset_userdata('result'); $this->session->unset_userdata('Coapplicant_id');}
	 	  else if($result=='10'){ echo '<script> swal("success!", "Status updated Successfully ", "success");</script>';$this->session->unset_userdata('result'); $this->session->unset_userdata('Coapplicant_id');}
	 	
		 else { echo '<script> swal("warning!", "Error in Bureau updation", "warning");</script>';$this->session->unset_userdata('result');$this->session->unset_userdata('Coapplicant_id');	}
	}
?>
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
										<div>
        									<div class="container">
												<?php ini_set('short_open_tag', 'On'); ?>
													<div class="margin-10 padding-5">
			 												<div style="line-height: 40px; margin-top: 20px;" class="row">
															 	<?php if(!empty($row2)){if ($row2->customer_consent=='true'){?>
																   <div class="col-sm-12">
																  	<b>Hey, <u><?php if(!empty($row2)) echo "  ".$row2->FN."  ".$row2->LN;?> </u>&nbsp;Lets do some simple steps to move ahead </b>
                                                                    <input hidden type="text" name="customer_id" id="customer_id"  value="<?php echo $row2->UNIQUE_CODE;?>">
							 									 
																  </div>
																  <div class="col-sm-12"><hr></div>
																  <div class="col-sm-12">
																  	<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Identity Details</span>
																	<br>
																	<span style="margin-bottom: 45px; font-size: 12px; color: #bfbbbb;">Please fill your personal details. If required our Representative may get in touch to verify them.</span>
																  </div>
																  <div class="col-sm-12">
																  	<span style="color: black; font-size: 12px; font-weight: bold;"><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Full name as per PAN card *</span>
																  </div>
																  <div class="col-sm-4">  
																	<input style="margin-top: 8px;" placeholder="First Name" class="form-control" type="text" id="f_name" name="f_name" minlength="3" maxlength="30" required value="<?php echo $row2->FN;?>" oninput="validateText(this)">
																  </div>
															      <div class="col-sm-4">
																    <input style="margin-top: 8px;" placeholder="Middle Name (optional) *" class="form-control" type="text" name="m_name" id="m_name"  value="<?php echo $row2->MN;?>" minlength="3" maxlength="30" oninput="validateText(this)">
							 									  </div>
																   <div class="col-sm-4">
																     <input style="margin-top: 8px;" placeholder="Last Name *" class="form-control" type="text" name="l_name" id="l_name" minlength="3" maxlength="30" required  value="<?php echo $row2->LN;?>" oninput="validateText(this)">
																   </div>
																   <div class="col-sm-4"> 
																	<span style="color: black; font-size: 12px; font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Email-Id *</span>
			   													    <input required placeholder="Enter email-Id" id="email" class="form-control" type="email" name="email" value="<?php echo $row2->EMAIL;?>" minlength="8" maxlength="75">
				                                                  </div>
															      <div class="col-sm-4">
																  	<span style="color: black; font-size: 12px;font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Mobile Number *</span>
				   											 	    <input required placeholder="Enter mobile number *" class="form-control" type="text" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" name="mobile" id="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row2->MOBILE;?>">
																  </div>
																  <div class="col-sm-4">
																    <span style="color: black; font-size: 12px; font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>Date of Birth *</span>
																 	<input  class="form-control" type="date" name="dob" id="dob" value="<?php echo $row2->DOB;?>" onfocusout="calculateAGE()" >
																  </div>

																    <div class="col-sm-4"> 
																		<span style="color: black; font-size: 12px;font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Employment Type  *</span>
																		<select required class="form-control" name="employment_type" id="employment_type"> 
																			  <option value="" >Select </option>
																			  <option value="salaried" <?php if(!empty($data_cust_income_details))if ($data_cust_income_details->CUST_TYPE == 'salaried') echo ' selected="selected"'; ?>>Salaried</option>
																			  <option value="self employeed" <?php if(!empty($data_cust_income_details))if ($data_cust_income_details->CUST_TYPE == 'self employeed') echo ' selected="selected"'; ?>>Self Employee</option>
																		       <option value="retired" <?php if(!empty($data_cust_income_details))if ($data_cust_income_details->CUST_TYPE == 'retired') echo ' selected="selected"'; ?>>retired</option>
																		
																			  </select>
																		</div>
																   <?php 
																   if(!empty($data_cust_income_details))
																   {
                                                                         if($data_cust_income_details->CUST_TYPE=='salaried')
																		 {
                                                                   ?>
																   	<div class="col-sm-4">
																  	  <span style="color: black; font-size: 12px;font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Total Employment / business Experience </span>
																	  <input required placeholder="Enter Experience in years" class="form-control" type="number" name="experience" id="experience" value="<?php echo $data_cust_income_details->ORG_EXP_YEAR;?>">
																    </div>
																   <?php
																		 }
																		 else if($data_cust_income_details->CUST_TYPE=='self employeed')
																		 {
																	 ?>
																   	<div class="col-sm-4">
																  	  <span style="color: black; font-size: 12px;font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Total Employment / business Experience </span>
																	  <input required placeholder="Enter Experience in years" class="form-control" type="number" name="experience" id="experience" value="<?php echo $data_cust_income_details->BIS_YEARS_IN_BIS;?>">
																    </div>
																   <?php
																		 }
																		 else
																		 {
                                                                    ?>
																	<div class="col-sm-4">
																  	  <span style="color: black; font-size: 12px;font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Total Employment / business Experience </span>
																	  <input required placeholder="Enter Experience in years" class="form-control" type="number" name="experience" id="experience" >
																    </div>

																	<?php
																		 }
																   }
																   else
																   {
                                                                   ?>
																   <div class="col-sm-4">
																  	  <span style="color: black; font-size: 12px;font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;Total Employment / business Experience </span>
																	  <input required placeholder="Enter Experience in years" class="form-control" type="number" name="experience" id="experience">
																    </div>
																   <?php
																   }
																   
																   
																   ?>

															      <div class="col-sm-4">
																  	<span style="color: black; font-size: 12px;font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp; Required Loan Amount  *</span>
																    <input required placeholder="Enter loan amount *" class="form-control" type="text" id="loan_amount" name="loan amount" oninput="maxLengthCheck(this)" maxlength="10" value="<?php if(!empty($data_Go_NO_GO)) echo $data_Go_NO_GO->loan_amount ;?>">
																  </div>
																  <div class="col-sm-4">
																    <span style="color: black; font-size: 12px; font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>Tenure *</span>
																 	<input  class="form-control" type="number" placeholder="Enter Tenure" name="tenure" id="tenure"  value="<?php if(!empty($data_Go_NO_GO)) echo $data_Go_NO_GO->tenure ;?>">
																  </div>
															      <div class="col-sm-4">
																    <span style="color: black; font-size: 12px; font-weight: bold; "><i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>AGE (as per Date of Birth)</span>
																 	<input readonly  class="form-control" type="number"  name="age" id="age" value="<?php if(!empty($data_Go_NO_GO)) echo $data_Go_NO_GO->age ;?>">
																  </div>
															
																  <div class="col-sm-12"><hr></div>
																  <div class="col-sm-2">
																 
																   <a class="btn btn-success " id="Submit_form" style="color:white;  padding: 19px;">Submit &nbsp;&nbsp;</a>
																 
																  </div>
																  <?php
																  if(!empty($data_Go_NO_GO))
																  {
																	  if($data_Go_NO_GO->eligibility_status=='Eligible')
																	  {
																	?>
																	  <div class="col-sm-2">
																	 <a class="btn btn-success " href="<?php echo base_url()?>index.php/dsa/GO_No_GO?ID=<?php echo $row2->UNIQUE_CODE;?>"  id="VERIFY_KYC" style="color:white;  padding: 19px;">Proceed &nbsp;&nbsp;</a>
																  </div>
																	<?php
																	  }
																	  else
																	  {
																	?>
																	 <div class="col-sm-2">
																	 <a class="btn btn-success disabled" href="<?php echo base_url()?>index.php/dsa/GO_No_GO?ID=<?php echo $row2->UNIQUE_CODE;?>"  id="VERIFY_KYC" style="color:white;  padding: 19px;">Proceed &nbsp;&nbsp;</a>
																  </div>
																	<?php
																	  }

																  }
																  else
																  {
																?>
																  <div class="col-sm-2">
																	 <a class="btn btn-success disabled" href="<?php echo base_url()?>index.php/dsa/GO_No_GO?ID=<?php echo $row2->UNIQUE_CODE;?>"  id="VERIFY_KYC" style="color:white;  padding: 19px;">Proceed &nbsp;&nbsp;</a>
																  </div>
																<?php
																  }
																  
																  ?>
																
																 <div class="col-sm-8 " style="" id="reasons_box">
																 		 <?php 
																			 if(!empty($data_Go_NO_GO))
																			 {
																				 if($data_Go_NO_GO->eligibility_status=='Not Eligible')
																				 {

																				   if(!empty($data_cust_income_details))
																						{
																						 if($data_cust_income_details->CUST_TYPE=='salaried')
																						 {
																					
																							if($data_Go_NO_GO->Sal_age==0)
																							 {
																								 ?>
																								<lable style="color:red;">For salaried, Age and tenure not fits in our criteria.</lable><br>
																								 <?php
																							 }
																							  if($data_Go_NO_GO->sal_exe==0)
																							{
																							 ?>
																								<lable style="color:red;">For Salaried Applicant, minimum 1 year employment experience is required</lable><br>
																							<?php
																							 }
																							}
																						}
																						 if(!empty($data_cust_income_details))
																						{
																						 if($data_cust_income_details->CUST_TYPE=='self employeed')
																						 {

																				  if($data_Go_NO_GO->Self_age==0)
																				  {
																			  ?>
																			  <lable style="color:red;">For Self Employeed, Age and tenure not fits in our criteria.</lable><br>
																			  <?php

																				  }
																				 
																				     if($data_Go_NO_GO->self_exe==0)
																					 {
																				?>
																			  <lable style="color:red;">For Self employeed, minimum 3 year business experience is required</lable><br>
																			  <?php
																					 }
																						 }
																						}
																			     }
																			 }
																		 ?>
																 </div>
															
																<?php } else { ?>
																
															        <b>Waiting for Consent From <u><?php if(!empty($row2)) echo "  ".$row2->FN."  ".$row2->LN;?></u></b>
																	<button class="btn btn-link"><i class="fa fa-refresh fa-spin"></i></button>	
																	<div class="col-sm-12"><hr></div>
																
																<?php }   } ?>
														
														</div>
													</div>
													<br>
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
						   <script>
						       function calculateAGE()
							   {
								 

									 var userDateinput =document.getElementById("dob").value;  
									 console.log(userDateinput);
	 
									 var birthDate = new Date(userDateinput);
									  console.log(" birthDate"+ birthDate);
	 
								
									 var difference=Date.now() - birthDate.getTime(); 
	 	 
									 var  ageDate = new Date(difference); 
									 var calculatedAge=   Math.abs(ageDate.getUTCFullYear() - 1970);
								
									 document.getElementById('age').value= calculatedAge;

							   }
						   </script>
						   <script>
						   $( "#Submit_form" ).click(function() {
							  
							         var Sal_age= 0;
									 var Self_age=0;
									 var sal_exe=0;
									 var self_exe=0;
									 var retired=0;
									 
									 var customer_id=document.getElementById("customer_id").value; 
									 var f_name =document.getElementById("f_name").value; 
									 var m_name =document.getElementById("m_name").value; 
									 var l_name =document.getElementById("l_name").value; 
									 var email =document.getElementById("email").value; 
									 var mobile =document.getElementById("mobile").value; 
									 var dob =document.getElementById("dob").value;
									 var employment_type =document.getElementById("employment_type").value; 
									 var experience =document.getElementById("experience").value; 
									 var loan_amount =document.getElementById("loan_amount").value;
									 var tenure =document.getElementById("tenure").value; 
									 
									 
									 
									 if(f_name=='')
										{
											swal("warning!", "Please Enter First name", "warning");
										    return false;
										}
									  else if(l_name=='')
										{
											swal("warning!", "Please Enter last name", "warning");
										    return false;
										}
									  else if(email=='')
										{
											swal("warning!", "Please Enter Email", "warning");
										    return false;
										}
								      else if(mobile=='')
										{
											swal("warning!", "Please Enter Mobile", "warning");
										    return false;
										}
									  else if(dob=='')
										{
											swal("warning!", "Please Enter Date of birth", "warning");
										    return false;
										}
									  else if(employment_type=='')
										{
											swal("warning!", "Please Select Employment type", "warning");
										    return false;
										}
									  else if(experience=='')
										{
											swal("warning!", "Please Enter Employment / Business Experience in years", "warning");
										    return false;
										}
									  else if(loan_amount=='')
										{
											swal("warning!", "Please Enter Loan amount", "warning");
										    return false;
										}
									  else if(tenure=='')
										{
											swal("warning!", "Please Enter Tenure", "warning");
										    return false;
										}

									 var userDateinput =document.getElementById("dob").value;  
									 var birthDate = new Date(userDateinput);
									
	     							 var difference=Date.now() - birthDate.getTime(); 
	 	 							 var  ageDate = new Date(difference); 
									 var calculatedAge=   Math.abs(ageDate.getUTCFullYear() - 1970);
									 
									
									 document.getElementById('age').value= calculatedAge;
									 var employment_type = $.trim($('#employment_type').val());
									 var total_age= parseInt(calculatedAge) + parseInt(tenure);
									
									 if(employment_type=='salaried' && total_age<61)
									 {
										 var Sal_age= 1;
     								 }
									 else if(employment_type=='salaried' && total_age>60)
									 {
										 var Sal_age= 0;
     								 }
									 else if(employment_type=='self employeed' && total_age<66)
									 {
										 var Self_age= 1;
									 }
									 else if(employment_type=='self employeed' && total_age>65)
									 {
										 var Self_age= 0;
     								 }
							
									 var experience = document.getElementById("experience").value; 
									 if(employment_type=='salaried' && experience < 1)
									 {
										 var sal_exe=0; 
									 }
									 else if(employment_type=='salaried' && experience >=1  )
									 {
										 var sal_exe=1; 
									 }
									 else if(employment_type=='self employeed' && experience < 3)
									 {
										 var self_exe=0;
     								 }
									 else if(employment_type=='self employeed' && experience >=3)
									 {
										 var self_exe=1; 
     								 }


									 if(employment_type=='salaried')
									 {
										 var retired =0;
									 }
									 

						 
						             var eligibility_status= "";
									 if(Sal_age==1 && sal_exe==1)
									 {
										
										 var eligibility_status ="Eligible"
									 }
									 else if(Self_age==1 && self_exe==1)
									 {
									
										  var eligibility_status ="Eligible"
									 }
									 else if(retired==0)
									 {
										var eligibility_status ="Not Eligible"
									 }
									 else
									 {
										
										 var eligibility_status ="Not Eligible"
									 }



									$.ajax({
												type:'POST',
												url:'<?php echo base_url("index.php/dsa/GO_No_GO_submit"); ?>',
											    data:{
													'customer_id':customer_id,
													'f_name':f_name,
													'm_name':m_name,
													'l_name':l_name,
													'email':email,
													'mobile':mobile,
													'dob':dob,
													'employment_type':employment_type,
													'experience':experience,
													'loan_amount':loan_amount,
													'tenure':tenure,
													'age':calculatedAge,
													'Sal_age':Sal_age,
													'Self_age':Self_age,
													'sal_exe':sal_exe,
													'self_exe':self_exe,
													'eligibility_status':eligibility_status
													},
												success:function(data)
												{
													var obj =JSON.parse(data);
													if(obj.msg=='sucess')
													{
														 
														 $('#VERIFY_KYC').removeClass('disabled');
														 swal("success!",obj.response, "success").then(function() { window.location.reload(); });
														
					              					}
												    if(obj.msg=='fail')
													{ 
														  $('#VERIFY_KYC').addClass('disabled');
														  swal("warning!",obj.response, "warning").then(function() { window.location.reload(); });
																									
													}
												   
				                                }
                                    });

									 

									
									
                           });
						   </script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
						
							<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
							<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
						</body>
					</html>
