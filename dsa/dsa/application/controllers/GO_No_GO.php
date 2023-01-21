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
   $result = $this->session->userdata('result');
 
 $Applicant_id =$this->session->userdata('Applicant_id');
 //echo $Applicant_id;
 //exit();
//  $Applicant_id=$this->input->get('ID');


 if (isset($result)) 
    {
		if($result=='1'){ echo '<script> swal("success!", "Credit Bureau pulled Successfully.", "success");</script>'; $this->session->unset_userdata('result');$this->session->unset_userdata('Coapplicant_id');}
		else if($result=='2'){ 
		echo '<script> swal("warning!", "'.$score_success_.'", "warning").then( function() { window.location.replace("/finserv_test/dsa/dsa/index.php/dsa/GO_No_GO_add_coapplicant?Applicant_ID='.$Applicant_id.'"); } );
		</script>';$this->session->unset_userdata('result');}
		else if($result=='3'){ echo '<script> swal("warning!", "'.$score_success_.'", "warning").then( function() { window.location.replace("/finserv_test/dsa/dsa/index.php/dsa/GO_No_GO_add_coapplicant?Applicant_ID='.$Applicant_id.'"); } );
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
@media only screen and (max-width: 768px) {
  .add{
	padding-left: 168px;
    margin-top: -39px;
  }
}

@media only screen and (max-width: 768px) {
  .edit{
	padding-left: 229px;
    margin-top: -39px;
  }
}
 .co-applicant th{
	padding :10px;
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
<input hidden type="text" name="customer_id" id="customer_id"  value="<?php echo $row2->UNIQUE_CODE;?>">
<input hidden type="text" name="dsa_id" id="dsa_id"value="<?php if(!empty($row)) echo $row->UNIQUE_CODE;?>">
	
<div class="c-body">
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body" id="border_style">
								<div class="row">
									<div class="col-sm-12">
										<div>
        									<div class="container">
												<?php ini_set('short_open_tag', 'On'); ?>
													<div class="margin-10 padding-5">
													    <div style="line-height: 40px;margin-top: 20px;" class="row">
															<div class="col-sm-6" style="margin-left:8px;"><b>Loan Application Status :</b>
																<?php if(!empty($internal_loan_application_status)) 
																    { 
																		if($internal_loan_application_status->STATUS == 'in progress')
																		{
                                                                 ?>
																   <?php
																	   if(isset($row_more))
																	   {
																				if($row_more->STATUS == 'Loan Sanctioned')
																	        {
																						?>
																		    	<b style="color:green;"><?php echo "Loan Sanctioned Approved" ?></b>
                                        	<?php
																	        }
																	        else if($row_more->STATUS == 'Sanction Rejected')
																	        {
																						?>
																		    	<b style="color:red;"><?php echo "Sanction Rejected" ?></b>
                                        	<?php
																	        }

																	   	  else if($row_more->STATUS == 'Loan Recommendation Approved')
																	        {
																						?>
																		    	<b style="color:green;"><?php echo "Loan Recommendation Approved" ?></b>
                                        	<?php
																	        }

																		    else if($row_more->STATUS == 'PD Completed')
																	        {
                                          ?>
																		    	<b style="color:green;"><?php echo "PD Completed" ?></b>
                                        	<?php
																					}
																					else  if($row_more->STATUS == 'Cam details complete')
																	        {
																	        	 ?>
																		    	<b style="color:green;"><?php echo "CAM Completed" ?></b>
                                        	<?php
																	        }
																			 		else if($row_more->STATUS == 'Aadhar E-sign complete')
																	        {
                                                                           ?>
																				  <b style="color:green;"><?php echo "Application Submitted" ?></b>
                                                                              
                                                                              <?php
																			}

																			else
																			{
                                                                            ?>
																				 <b style="color:green;"><?php echo "In Progress" ;?></b>
                                                                              
																			 	
																			<?php
																			}
																	   }
																	   else
																	   {
                                                                       ?>
																	   	 <b style="color:green;"><?php echo "Application Submitted" ?></b>
                                                                                  
																	   <?php
																	   }
															   ?>





																 <?php
																		}
																		else if($internal_loan_application_status->STATUS == 'hold')
																		{
                                                                 ?>
																  <b style="color:orange;"><?php echo "On Hold " ?></b>&nbsp;[ Reason : <?php echo $internal_loan_application_status->REMARK; ?> ]
																 <?php
																		}
																		else if($internal_loan_application_status->STATUS == 'reject')
																		{
                                                                 ?>
																  <b style="color:red;"><?php echo "Rejected" ?></b>
																 <?php
																		}
																?>
																	
																<?php }
																
																else { ?>
																	<b>Not Checked</b>
																<?php }?>
															</div>
															<div class="col-sm-7">
															<span id='tag2'></span></b>
                                                                		
															</div>
														</div>
	  													<div style="line-height: 40px; margin-top: 20px;" class="row">
															<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
																<?php if(!empty($row2)){if ($row2->customer_consent=='true'){?>
																	<div class="row" style="margin-left:10px;"><b>Check Bureau Of <?php if(!empty($row2)) echo "  ".$row2->FN."  ".$row2->LN;?></b>
																	   <?php
																	   if(isset($row_more))
																	   {

																	   	    if($row_more->STATUS == 'Loan Recommendation Approved' || $row_more->STATUS == 'Loan Sanctioned' || $row_more->STATUS == 'Sanction Rejected')
																	        {
																	        	 ?>
																		      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
																					<div>
																					</div>	
																				</div>	
																		   <?php
																	        }
																		     else if($row_more->STATUS == 'PD Completed')
																	        {
                                         ?>
																		      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
																					<div>
																					</div>	
																				</div>	
																		   <?php
																					}
																					else if($row_more->STATUS == 'Cam details complete')
																	        {
 																					?>
																		      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
																					<div>
																					</div>	
																				</div>	
																		   <?php
																	        }
																			else  if($row_more->STATUS =='Aadhar E-sign complete')
																			{
 ?>
																		      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
																					<div>
																					</div>	
																				</div>	
																		   <?php
																			}
																			else
																			{
                                                                            ?>
																			    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
																					<div class="edit">
																						<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/dsa/GO_No_GO_edit?ID=<?php echo $row2->UNIQUE_CODE;?>"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
																					</div>	
																				</div>	
																			<?php
																			}
																	   }
																	   else
																	   {
                                                                       ?>
																	        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
																					<div>
																						<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/dsa/GO_No_GO_edit?ID=<?php echo $row2->UNIQUE_CODE;?>"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
																					</div>	
																				</div>		
																	   <?php
																	   }
																	 
																	   ?>
																	
																		
																	</div>
																<?php }
																     else
																	 {
																?>
																	<div class="row" style="margin-left: 10px;"><b>Waiting for Consent From <?php if(!empty($row2)) echo "  ".$row2->FN."  ".$row2->LN;?></b>
																						
																	</div>	 
																<?php
																	 } 
															     }?>
															</div> 
														
														</div>
													</div>
													<br>


												    <div class="row  table-responsive" style="padding:10px;">
														<table class="table table-bordered">
															<thead>
																<tr>
																	<th>Applicant Name</th>
																	<th>Score</th>
																	<th>Micro Score</th>
																	<th>Bureau Responce</th>
																	<th>Bureau Report</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><?php if(!empty($row2)) echo "  ".$row2->FN."  ".$row2->LN;?></td>
																	<td><?php if(isset($score)){echo $score;} else { echo "Score not Checked";}?></td>
																	<td><?php if(isset($score_details)){echo $score_details->micro_score;} else { echo "Score not Checked";}?></td>
																	<td><?php if(isset($score_details)) { echo $score_details->score_success; }?></td>
																	<td><a style="margin-left: 8px; margin-top:-10px;" target='_blank' href="<?php echo base_url()?>index.php/dsa/pdf?ID=<?php if(isset($score_details)) echo $score_details->customer_id;?>" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></td>
							
																</tr>
														
															</tbody>
														</table>
													</div>

													<div class="row">
													<div class="col-sm-12">
													<hr>
													</div>
													</div>
													<div class="margin-10 padding-5">
	  													<div style="line-height: 40px;margin-top: 20px;" class="row">
															<div style="color: black; font-size: 14px;" class=" col-sm-12 col-12">
																<?php if(!empty($coapplicant))if($coapplicant == 'true'){?>
																	<div class="row" style="margin-left:10px;"><b>Check Bureau for Co-applicants</b>
																	 <?php
																	   if(isset($row_more))
																	   {
																	   	     if($row_more->STATUS == 'Loan Recommendation Approved' || $row_more->STATUS == 'Loan Sanctioned' || $row_more->STATUS == 'Sanction Rejected')
																	        {
																	        	 ?>
																			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
																			<div>
																					
																			</div>	
																		</div>

																			<?php
																	        }
																		    else if($row_more->STATUS == 'PD Completed')
																	        {
                                       ?>
																			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
																			<div>
																					
																			</div>	
																		</div>

																			<?php
																			}
																			else  if($row_more->STATUS == 'Cam details complete')
																	        {
																	        	 ?>
																			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
																			<div>
																					
																			</div>	
																		</div>

																			<?php
																	        }
																			else  if($row_more->STATUS =='Aadhar E-sign complete')
																			{
																				?>
																				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
																			<div>
																					
																			</div>	
																		</div>
																				<?php
																			}
																			else
																			{
                                                                            ?>
																			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
																			<div>
																					 <span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/dsa/GO_No_GO_add_coapplicant?Applicant_ID=<?php echo $row2->UNIQUE_CODE;?>"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></a></span>
																			
																			</div>	
																		</div>
																					
																			</div>	
																		</div>

																			<?php
																			}
																	   }
																	   else
																	   {
                                                                       ?>
																	   <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
																			<div>
																					
																			</div>	
																		</div>
																	   <?php
																	   }
                                                                           ?>
																		   




																		

																	</div>

                                                                    <?php if(!empty($coapplicant)) {?>
																	<div class="row table-responsive" style="padding:10px;">
																	
																		<table class="table table-bordered co-applicant">
															
																			<thead>
																				<tr>
																					<!--<th>SR.No.</th>-->
																					<th>Co-Applicant Name</th>
																					<th>Score</th>
																					<th>Micro Score</th>
																					<th>Bureau Report</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php $i=1;foreach($co_app as $copp) {?>
																				<tr>
																					<!--<td><?php echo $i;?></td>-->
																					<td><?php if(!empty($copp)) echo "  ".$copp->FN."  ".$copp->LN;?></td>
																					<td>
																					<?php  
																					if($copp->Score != '' || $copp->Score!= NULL) 
																					{ 
																						echo   $copp->Score; 
																						?>
																					
																						<?php
																					} 
																					else
																					{ 
																						echo "Score not checked" ;
																					?>
																					<a style="margin-left: 8px; margin-top:-10px;" href="<?php echo base_url()?>index.php/customer/coapplicant_Go_no_go_credit_score?COAPP_ID=<?php echo $copp->UNIQUE_CODE;?>&&App_ID=<?php echo $copp->CUST_ID;?>" >Check Score</a>
																					
																					<?php
																					}
																					?>
																					</td>
																					<td>
																					<?php 
																					if($copp->micro_score != '' || $copp->micro_score!= NULL) 
																					{ 
																						echo   $copp->micro_score; 
																					}
																					else
																					{

																					}
																					?>
																					</td>
																					<td><a style="margin-left: 8px; margin-top:-10px;" target='_blank' href="<?php echo base_url()?>index.php/dsa/pdf?ID=<?php echo $copp->UNIQUE_CODE;?>" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></td>
																				</tr>
																				<?php $i++; } ?>
																			</tbody>
														                </table>
																	</div>
																	
																<?php } }
																     else
																	 {

																	//if($payment== 'done')
																	 //{
                                                                        
																?>

																	<div class="row" style="margin-left: 10px;"><b>Please add co-applicants </b>
																	
																	<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
																			<div>
																				<div class="add">
																				
																				 <span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/dsa/GO_No_GO_add_coapplicant?Applicant_ID=<?php echo $row2->UNIQUE_CODE;?>"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></a></span>
																	 </div>
																			</div>	
																		</div>

																	</div>	
													
																<?php
																	// }
																	// else {

                                                                    //  }

																	 } 
															     ?>
																 <?php 
																	if(!empty($internal_loan_application_status)) 
																	{
																		if($internal_loan_application_status->STATUS == 'in progress'|| $internal_loan_application_status->STATUS == 'CONTINUE')
																		{
                                                                 ?>
																 <br>
																	<div class="row">
																	<?php
																		if($userType!="Relationship_Officer")
																		 {
																	?>
																	<div class="col-sm-8"> 
																		<textarea id="approval_remarks" name="approval_remarks" class="form-control" type="text" placeholder="Bureau Comments" ></textarea>
																    </div>
																	<div class="col-sm-2"> 
																		<button type="button" class="btn btn-primary"  id="send_queries" onclick="send_queries();">Add Comments</button>
																	</div>
																	<?php }?>
																	<div class="col-sm-12">
																		<?php
																			$a=json_decode($row2->Bureau_comments);
																			if(!empty($a))
																			{
																		?>
																				<h5>Previous Remarks</h5> 
																		<?php
																				for( $i=count($a)-1; $i>=0; $i-- )
																				{
																				    if($a[$i]->role == 'Disbursement OPS')
																					{
																		?>
																						<div style="border:1px solid gray ;margin:20px;padding:10px;background-color:#b5e2ff;">
																							<span style="color:black"><?php echo $a[$i]->role." ".$a[$i]->added_by; ?> wrote on <?php echo $a[$i]->added_on;  ?></span><br>
																							<lable><?php echo $a[$i]->Query; ?></lable>
																						</div>
																		<?php
																					}
																				    else
																					{
																		?>
																						<div style="border:1px solid gray ;margin:20px;padding:10px;background-color:#daf0ff">
																							<span style="color:black"><?php echo $a[$i]->role." ".$a[$i]->added_by; ?> wrote on <?php echo $a[$i]->added_on;  ?></span><br>
																							<lable><?php echo $a[$i]->Query; ?></lable>
																						</div>
																		<?php
																					}
																
																				}
																			}
																		?>
																	</div>
																	<?php 
																		if(isset($score_details)) 
																		{ 
																		?>
																		    <?php

																				 if(isset($row_more))
																				   {
 																						 if($row_more->STATUS == 'Loan Recommendation Approved' || $row_more->STATUS == 'Loan Sanctioned' || $row_more->STATUS == 'Sanction Rejected')
																	        	{
																	        		?>
																							 <div class="col-sm-2">
																							 <a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/customer/profile_view_p_o_dsa?ID=<?php echo $row2->UNIQUE_CODE;?>">
																								 <button type="button" class="btn btn-success btn_accept" id="lets_view_btn" value="accept" onclick="job_actions(this.value,document.getElementById('remarks').value)"><b>Lets View Application</b></button>
																							 </a>
																						  </div>
																						<?php
																	        	}
																						else if($row_more->STATUS == 'PD Completed')
																						{
																						?>
																							 <div class="col-sm-2">
																							 <a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/customer/profile_view_p_o_dsa?ID=<?php echo $row2->UNIQUE_CODE;?>">
																								 <button type="button" class="btn btn-success btn_accept" id="lets_view_btn" value="accept" onclick="job_actions(this.value,document.getElementById('remarks').value)"><b>Lets View Application</b></button>
																							 </a>
																						  </div>
																						<?php
																						}
																						else if($row_more->STATUS == 'Cam details complete')
																						{
																						?>
																							 <div class="col-sm-2">
																							 <a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/customer/profile_view_p_o_dsa?ID=<?php echo $row2->UNIQUE_CODE;?>">
																								 <button type="button" class="btn btn-success btn_accept" id="lets_view_btn" value="accept" onclick="job_actions(this.value,document.getElementById('remarks').value)"><b>Lets View Application</b></button>
																							 </a>
																						  </div>
																						<?php
																						}
																						else if($row_more->STATUS =='Aadhar E-sign complete')
																						{
?>
																							  <div class="col-sm-2">
																							 <a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/customer/profile_view_p_o_dsa?ID=<?php echo $row2->UNIQUE_CODE;?>&&UID=<?php echo $dsa_id;?>">
																								 <button type="button" class="btn btn-success btn_accept" id="lets_view_btn" value="accept" onclick="job_actions(this.value,document.getElementById('remarks').value)"><b>Lets View Application</b></button>
																							 </a>
																						  </div>
																						<?php
																						}
																						else
																						{
																						 ?>
																						  <div class="col-sm-4">
																					
																								
																										<?php if($userType == 'Relationship_Officer' && isset($score_details))
																									 	{
																									 					if(!empty($row2->Bureau_review))
																					{  
																						$Bureau_review1= json_decode($row2->Bureau_review,true);
																						if(	$Bureau_review1['Bureau_review'] == 'Application is in review')
																							{
																								?>
																								 <button type="button" class="btn btn-success btn_accept"><b>Application submitted for review</b></button>
																								<?php
																							}
																							else
																							{
																								?>
																								 <button type="button" class="btn btn-success btn_accept" onclick="submit_for_review();"><b>Lets Submit application for review.</b></button>
																								<?php
																							}
																						
																					}
																					else
																							{
																								?>
																								 <button type="button" class="btn btn-success btn_accept" onclick="submit_for_review();"><b>Lets Submit application for review.</b></button>
																								<?php
																							}
																									 	}
                                                    else if(empty($score_details))
																			 							{
																			 		
																			 							}
																									 	else
																									 	{
																									 		?>

																									 				<a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/customer/profile_view_p_o_dsa?ID=<?php echo $row2->UNIQUE_CODE;?>&&UID=<?php echo $dsa_id;?>">
																									 		<button type="button" class="btn btn-success btn_accept" id="lets_continue_btn" value="accept" onclick="job_actions(this.value,document.getElementById('remarks').value)">
																									 		<b> Lets Continue Application </b>
																									 			</button>		</a>
																									 		<?php
																									 	}  ?>
																							
																					
																						</div>
																					

																						<?php
																						}
																					}
																					 else
																					{
																				 ?>      <div class="col-sm-2">
																							 <a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/customer/profile_view_p_o_dsa?ID=<?php echo $row2->UNIQUE_CODE;?>&&UID=<?php echo $dsa_id;?>">
																								 <button type="button" class="btn btn-success btn_accept" id="lets_view_btn" value="accept" onclick="job_actions(this.value,document.getElementById('remarks').value)"><b>Lets View Application</b></button>
																							 </a>
																						  </div>
																				 <?php
																					}
																				  ?>


																		<?php
																		
																		}
																		else
																		{
																		?>
																		<div class="col-sm-4">
																			
																	
																			 	<?php if($userType == 'Relationship_Officer' && isset($score_details))
																			 	{
																			 					if(!empty($row2->Bureau_review))
																					{  
																						$Bureau_review1= json_decode($row2->Bureau_review,true);
																						if(	$Bureau_review1['Bureau_review'] == 'Application is in review')
																							{
																								?>
																								 <button type="button" class="btn btn-success btn_accept"><b>Application submitted for review</b></button>
																								<?php
																							}
																							else
																							{
																								?>
																								 <button type="button" class="btn btn-success btn_accept" onclick="submit_for_review();"><b>Lets Submit application for review.</b></button>
																								<?php
																							}
																						
																					}
																					else
																							{
																								?>
																								 <button type="button" class="btn btn-success btn_accept" onclick="submit_for_review();"><b>Lets Submit application for review.</b></button>
																								<?php
																							}
																			 	}
																			 	else if(empty($score_details))
																			 	{

																			 	}
																			 	else
																			 	{
																			 		?>
																			 				 <button type="button" class="btn btn-success btn_accept" id="lets_continue_btn" value="accept" onclick="alert_for_bureau();"><b>Lets Continue Application </b></button>
																			 		<?php
																			 	}  ?>
																		
																			
																		</div>
																		<?php
																		}
																		?>
																		
												
																		  <?php
																	   if(isset($row_more))
																	   {
																		     if($row_more->STATUS != 'PD Completed')
																	        {
																			?>
																				
																			<?php
																			}
																			else if($row_more->STATUS !='Aadhar E-sign complete')
																						{
																								?>
																				
																			<?php
																						}

																			else
																			{
                                                                            ?>

																			<?php
																			}
																	   }
																	   else
																	   {
                                                                       ?>

																	   <?php
																	   }
                                                                           ?>
																			
																		

																	</div>
							

																 <?php
																		}
																		else if($internal_loan_application_status->STATUS =='hold' || $internal_loan_application_status->STATUS == 'HOLD')
																		{
	                                                              ?>
																
																		<?php
																		if($userType!="Relationship_Officer")
																		 {
																	?>
																	<div class="col-sm-8"> 
																		<textarea id="approval_remarks" name="approval_remarks" class="form-control" type="text" placeholder="Bureau Comments" ></textarea>
																    </div>
																	<div class="col-sm-2"> 
																		<button type="button" class="btn btn-primary"  id="send_queries" onclick="send_queries();">Add Comments</button>
																	</div>
																	<?php }?>
																	<div class="col-sm-12">
																		<?php
																			$a=json_decode($row2->Bureau_comments);
																			if(!empty($a))
																			{
																		?>
																				<h5>Previous Remarks</h5> 
																		<?php
																				for( $i=count($a)-1; $i>=0; $i-- )
																				{
																				    if($a[$i]->role == 'Disbursement OPS')
																					{
																		?>
																						<div style="border:1px solid gray ;margin:20px;padding:10px;background-color:#b5e2ff;">
																							<span style="color:black"><?php echo $a[$i]->role." ".$a[$i]->added_by; ?> wrote on <?php echo $a[$i]->added_on;  ?></span><br>
																							<lable><?php echo $a[$i]->Query; ?></lable>
																						</div>
																		<?php
																					}
																				    else
																					{
																		?>
																						<div style="border:1px solid gray ;margin:20px;padding:10px;background-color:#daf0ff">
																							<span style="color:black"><?php echo $a[$i]->role." ".$a[$i]->added_by; ?> wrote on <?php echo $a[$i]->added_on;  ?></span><br>
																							<lable><?php echo $a[$i]->Query; ?></lable>
																						</div>
																		<?php
																					}
																
																				}
																			}
																		?>
																	</div>
																		<div class="col-sm-4">
																				<?php if($userType == 'Relationship_Officer' && isset($score_details))
																			 	{
																			 					if(!empty($row2->Bureau_review))
																					{  
																						$Bureau_review1= json_decode($row2->Bureau_review,true);
																						if(	$Bureau_review1['Bureau_review'] == 'Application is in review')
																							{
																								?>
																								 <button type="button" class="btn btn-success btn_accept"><b>Application submitted for review</b></button>
																								<?php
																							}
																							else
																							{
																								?>
																								 <button type="button" class="btn btn-success btn_accept" onclick="submit_for_review();"><b>Lets Submit application for review.</b></button>
																								<?php
																							}
																						
																					}
																					else
																							{
																								?>
																								 <button type="button" class="btn btn-success btn_accept" onclick="submit_for_review();"><b>Lets Submit application for review.</b></button>
																								<?php
																							}
																			 	}
																			 	else if(empty($score_details))
																			 	{

																			 	}
																			 	else
																			 	{
																			 		?>
																			 <button type="button" class="btn btn-outline-success btn_accept" id="lets_continue_btn" value="accept" onclick="job_actions(this.value,document.getElementById('remarks').value)"><b>Lets Continue Application </b></button>
																			  		<?php
																			 	}  ?>
																		</div>
															
																		
																		
																	</div>

																  <?php
                                                                        }
																		else
																		{

																		}

																	}
																	else 
																	{
																  ?>
																  	
																	<div class="row">
																	<?php
																		if($userType!="Relationship_Officer")
																		 {
																	?>
																	<div class="col-sm-8"> 
																		<textarea id="approval_remarks" name="approval_remarks" class="form-control" type="text" placeholder="Bureau Comments" ></textarea>
																    </div>
																	<div class="col-sm-2"> 
																		<button type="button" class="btn btn-primary"  id="send_queries" onclick="send_queries();">Add Comments</button>
																	</div>
																	<?php }?>
																	<div class="col-sm-12">
																		<?php
																			$a=json_decode($row2->Bureau_comments);
																			if(!empty($a))
																			{
																		?>
																				<h5>Previous Remarks</h5> 
																		<?php
																				for( $i=count($a)-1; $i>=0; $i-- )
																				{
																				    if($a[$i]->role == 'Disbursement OPS')
																					{
																		?>
																						<div style="border:1px solid gray ;margin:20px;padding:10px;background-color:#b5e2ff;">
																							<span style="color:black"><?php echo $a[$i]->role." ".$a[$i]->added_by; ?> wrote on <?php echo $a[$i]->added_on;  ?></span><br>
																							<lable><?php echo $a[$i]->Query; ?></lable>
																						</div>
																		<?php
																					}
																				    else
																					{
																		?>
																						<div style="border:1px solid gray ;margin:20px;padding:10px;background-color:#daf0ff">
																							<span style="color:black"><?php echo $a[$i]->role." ".$a[$i]->added_by; ?> wrote on <?php echo $a[$i]->added_on;  ?></span><br>
																							<lable><?php echo $a[$i]->Query; ?></lable>
																						</div>
																		<?php
																					}
																
																				}
																			}
																		?>
																	</div>
																		<div class="col-sm-4">
																				<?php if($userType == 'Relationship_Officer' && isset($score_details))
																			 	{
																					
																					if(!empty($row2->Bureau_review))
																					{  
																						$Bureau_review1= json_decode($row2->Bureau_review,true);
																						if(	$Bureau_review1['Bureau_review'] == 'Application is in review')
																							{
																								?>
																								 <button type="button" class="btn btn-success btn_accept"><b>Application submitted for review</b></button>
																								<?php
																							}
																							else
																							{
																								?>
																								 <button type="button" class="btn btn-success btn_accept" onclick="submit_for_review();"><b>Lets Submit application for review.</b></button>
																								<?php
																							}
																						
																					}
																					else
																							{
																								?>
																								 <button type="button" class="btn btn-success btn_accept" onclick="submit_for_review();"><b>Lets Submit application for review.</b></button>
																								<?php
																							}
																					
																			 		?>
																						  <!--<button type="button" class="btn btn-success btn_accept"><b>File Submitted to CPA</b></button>-->
																						<!-- <button type="button" class="btn btn-success btn_accept"><b>Application is Submitted for review4.</b></button>-->
																						
																					<?php
																			 	}
																			 	else if(empty($score_details))
																			 	{

																			 	}
																			 	else
																			 	{
																			 		?>
																			 <button type="button" class="btn btn-outline-success btn_accept" id="lets_continue_btn" value="accept" onclick="job_actions(this.value,document.getElementById('remarks').value)"><b>Lets Continue Application </b></button>
																			   		<?php
																			 	}  ?>
																		</div>
																	
																		
																		
																	</div>
																	<hr>
																  <?php
																	}
    															 ?>  
																 
																 
															</div> 
														
														</div>
													</div>



												</div>
											</div>
										</div>
									</main>
								</div>
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
								<footer class="c-footer">
									<div>Copyright © 2020 Finaleap.</div>
									<div class="mfs-auto">Powered by Finaleap</div>
								</footer>
							</div>
							<script>
							function submit_for_review()
							{
									var login_user_id = document.getElementById("dsa_id").value;
									var User_ID = document.getElementById('customer_id').value;
									$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/submit_for_review"); ?>',
									    data:{
										'applicant_id':User_ID,
										'login_user_id':login_user_id,
											},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
												swal("success!", "Application sent for the review.", "success");
												exit();
												
											}
						                }
                                    });
							}
							function job_actions(value,textAreaExample) 
							    {
									var applicant_id = document.getElementById("applicant_id").value;
									var applicant_name = document.getElementById("applicant_name").value;
									var DSA_ID = document.getElementById("dsa_id").value;
									var DSA_NAME = document.getElementById("dsa_name").value;
								    if(value=='reject')
									{
									 // alert(textAreaExample); 
									    var action="reject";
										var remarks = document.getElementById("remarks").value;
										if(remarks == '')
										{
											swal("warning!", "Please add remarks for rejecting this application.", "warning");
											exit();
										}
										else
										{
                                           window.location.replace("/finserv_test/dsa/dsa/index.php/dsa/GO_NO_GO_application_status?ID="+applicant_id+"&name="+applicant_name+"&remark="+remarks+"&action="+action+"&DSA_ID="+DSA_ID+"&DSA_NAME="+DSA_NAME); 
										}
										
									}
									else if(value=='hold')
									{
                                        var action="hold";
										var remarks = document.getElementById("remarks").value;
										if(remarks == '')
										{
											swal("warning!", "Please add remarks for holding this application.", "warning");
											exit();
										}
										else
										{
                                            window.location.replace("/finserv_test/dsa/dsa/index.php/dsa/GO_NO_GO_application_status?ID="+applicant_id+"&name="+applicant_name+"&remark="+remarks+"&action="+action+"&DSA_ID="+DSA_ID+"&DSA_NAME="+DSA_NAME);
										}
									}
									else if(value=='accept')
									{
										    var action="in progress";
											var remarks = document.getElementById("remarks").value;
											window.location.replace("/finserv_test/dsa/dsa/index.php/dsa/GO_NO_GO_application_status?ID="+applicant_id+"&name="+applicant_name+"&remark="+remarks+"&action="+action+"&DSA_ID="+DSA_ID+"&DSA_NAME="+DSA_NAME);
									}
   
								} 
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
						 var holdReason = "Application is on HOLD in step GO NO GO because , "+document.getElementById('holdReason').value;
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
											     swal("Proceed!","").then( function() {  window.location.replace("/finserv_test/dsa/dsa/index.php/dsa/GO_No_GO?ID="+obj.User_ID); });
									
												
											}
						                }
                                    });
		
						}

						function reject() 
						{
							var User_ID = document.getElementById('customer_id').value;
							var rejectReason = "Application is rejected in step GO NO GO because , "+document.getElementById('rejectReason').value;
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
												  swal("Proceed!","").then( function() {  window.location.replace("/finserv_test/dsa/dsa/index.php/dsa/GO_No_GO?ID="+obj.User_ID); });
									
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
											     swal("Proceed!","").then( function() {  window.location.replace("/finserv_test/dsa/dsa/index.php/dsa/GO_No_GO?ID="+obj.User_ID); });
									
												
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
													
													document.getElementById('tag2').innerHTML = obj.reason;

														var word = "step GO NO GO";
												    var mystring =obj.reason;
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
												$('#Submit_form').addClass('disabled');
												$('#VERIFY_KYC').addClass('disabled');
												$('#employment_type').attr('readonly','readonly');
												  $('#lets_continue_btn').hide();
												  $('#lets_view_btn').hide();	
												} 








												
											
												//$('#lets_continue_btn').addClass('disabled');
												//  swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/dsa/Go_No_GO_?ID="+obj.User_ID); });
									
											}
											else if(obj.msg=='REJECT')
											{
												//alert("REJECT");
												$('#border_style').css("border","2px solid red");
											
												document.getElementById('tag2').innerHTML =obj.reason;
												
														var word = "step GO NO GO";
												    var mystring =obj.reason;
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
												$('#Submit_form').addClass('disabled');
												$('#VERIFY_KYC').addClass('disabled');
												$('#employment_type').attr('readonly','readonly');
										
												 $('#lets_continue_btn').hide();
												  $('#lets_view_btn').hide();
												     $('#btn_hold').hide();
												    $('#btn_continue').hide();
														$('#btn_reject').hide();
												}
												// swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/dsa/Go_No_GO_?ID="+obj.User_ID); });
									
											}
											else if(obj.msg=='CONTINUE')
											{
													$('#border_style').css("border","2px solid blue");
													
											}
						                }
                                    });

						}
						</script>
							<script>
							function alert_for_bureau(){
								            swal("warning!", "Please check customer bureau.", "warning");
											exit();
							}
function send_queries()
{

	var customer_id =document.getElementById('customer_id').value;
	var login_user_unique_code = document.getElementById('dsa_id').value;
	var remarks_queries = document.getElementById('approval_remarks').value;
	if(remarks_queries == '')
	{
				swal( "Warning!","Please add Comments","warning");
		 		exit();
	}
	let formData = new FormData(); 
	formData.append("customer_id",customer_id);
	formData.append("dsa_id",login_user_unique_code);
	formData.append("remarks_queries",remarks_queries);
	
	$.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Dsa/save_remarks_queries"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			 swal( "Details Sent!","Comments Added ","success");
								 window.location.reload(true);
					
                     		}
                     	else
							if(obj.status == 'fail')
                     		{
                     			 swal( "Warning!","Somthing is wrong","warning");
								
					
                     		}
                     }
              });
		
}
							</script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
							<!--[if IE]><!--><!--<![endif]-->
							<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
							<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
						</body>
					</html>
