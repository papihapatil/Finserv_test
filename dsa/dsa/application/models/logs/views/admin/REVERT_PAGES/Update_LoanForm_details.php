
<?php $dsa_id1=$this->session->userdata("dsa_id");
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
<?php
//$Cust_consent_id = $id;
$Cust_consent_id  =$this->session->userdata("Cust_consent_id");
//$cust_consent_status ="true";
$cust_consent_status  =$this->session->userdata("cust_consent_status");
$user_type_from_session=$this->session->userdata("user_type_from_session");
//echo $Cust_consent_id;
//echo $cust_consent_status;
//exit();
if($user_type_from_session=='DSA' && isset($Cust_consent_id))
{
	$id=$Cust_consent_id;
}
//$id=$Cust_consent_id;
?>

<body onload="Check_status();" >
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
	<input hidden type="text" name="customer_id" id="customer_id"  value="<?php echo $Cust_consent_id; ?>">
	<input hidden type="text" name="dsa_id" id="dsa_id" value="<?php if($dsa_id !=''){ echo $dsa_id;} else { echo $dsa_id1 ;}?>">



	<div >
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				<div class="row" >
				<p style="margin-top:5px;">Apply for loan</p> <p style="margin-left:20px; background-color:green; border-radius:10px; color:white; padding:5px;">Credit score : <?php echo $score;?></p>
					<b><span id='tag'></span><br><span id='tag2'></span></b>
          
				</div>
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
								
					<div>
						<span class="align-middle dot"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-sticky-note-o"></i></span>
					</div>			
							
				</div>	
			</div>
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					

					<div style="font-size: 10px; margin-left: 10px; color: black;">
						Loan Applications
					</div>

					<!--div style="font-size: 10px; margin-left: 10px; color: black;">
						Documents
					</div-->
				</div>	
			</div>
		</div>
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="text-align: center; margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Please select required loan type</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="text-align: center; margin-bottom: 45px; font-size: 12px; color: #bfbbbb;">Your selected loan type will help us to analyse that what kind of details we require from you.</span>

			</div>
			<div class="w-100"></div>
			<div class="row col-12 justify-content-md-center">
				<div class="row justify-content-md-center" style="padding: 0px !important;">
					<a href="<?php echo base_url()?>index.php/customer/customer_apply_for_loan?type=home">
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
							<div class="row <?php if($type == 'home'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center padding-5">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/home_loan.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You want loan for buying Home</span>
								<span class="font-9" style="margin-top: 0px; color: black; font-weight: bold; opacity: 0.8; text-align: center;">Home Loan</span>
								<div class="w-100"></div>
								<?php if($type == 'home') { ?>
									<img style="width: 20px; height: 20px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>				
						</div>	
					</a>
					<a href="<?php echo base_url()?>index.php/customer/customer_apply_for_loan_lap?type=lap&UID=<?php echo $id; ?>">	
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
							<div class="row <?php if($type == 'lap'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center ">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/plot_loan.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You want loan for against property</span>
								<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Loan Against Property</span>
								<div class="w-100"></div>
								<?php if($type == 'lap') { ?>
									<img style="width: 20px; height: 20px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>
			  			</div>	
			  		</a>
		  			
			  			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
			  				<div class="row <?php if($type == 'personal'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center ">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/personal_loan.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You want loan for personal use.</span>
								<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Personal Loan</span>
								<div class="w-100"></div>
								<?php if($type == 'personal') { ?>
									<img style="width: 20px; height: 20px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>
			  			</div>	
			  	
			  	
			  			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
			  				<div class="row <?php if($type == 'business'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center ">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/business.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You want loan for Business.</span>
								<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Business Loan</span>
								<div class="w-100"></div>
								<?php if($type == 'business') { ?>
									<img style="width: 20px; height: 20px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>
			  			</div>	
			  		
			  			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
			  				<div class="row <?php if($type == 'credit'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected';}?> justify-content-center ">
								<img class="income-type-img-size" src="<?php echo base_url()?>images/credit_card.png">
								<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">Loan for credit card's.</span>
								<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Credit Cards</span>
								<div class="w-100"></div>
								<?php if($type == 'credit') { ?>
									<img style="width: 20px; height: 20px;" src="<?php echo base_url()?>images/verified.png">
								<?php } ?>
							</div>
			  			</div>	
			  		
				</div>	
			</div>			
		</div>


		<!-- Salaried ------------------------------- -->
		<?php if($type == 'home') { ?>	

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 5px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">
						<?php if(!empty($coapplicant))if($coapplicant == 'true') { ?> Co-Applicants 
						<?php } else {?>
							Tell us about Co-Applicants 
						<?php } ?>
					</span>
					<div class="w-100"></div>
					<?php if(!empty($isProfileFull))if($isProfileFull == 'true') { ?>
						<span style="font-size: 12px;">For home loan process we require co-applicant details</span>
					<?php } else if($coapplicant == 'true'){ ?>
						<span style="font-size: 12px; color: red;">Looks like your CO-Applicant profile is not complete,Co-Applicant is mandatory for loan processing.Kindly update Co-Applicant profile and complete it for loan apply. </span>
					<?php }?>
				</div>					

				<div class="w-100"></div>

				<?php if(!empty($coapplicant))if($coapplicant == 'true') { ?>					
					<div class="row justify-content-center col-12">
						<div class="row shadow" style="text-align: center; border-radius: 10px; margin-top: 15px; background-color: white; padding-top: 10px; padding-bottom: 10px; padding-left: 5px; padding-right: 5px;">
							
							<?php for ($i=0; $i < count($co_app); $i++) { ?>
									<div  style="text-align: center; border-radius: 10px; margin: 4px;">									
									<span style="font-size: 12px; background-color: #77cdf4; padding: 10px; border-radius: 10px; color: white;">
										<?php echo $co_app[$i]->FN." ".$co_app[$i]->LN ?>
									

										<a href="<?php echo base_url()?>index.php/customer/coapplicant_new_screen_one?COAPPID=<?php echo $co_app[$i]->UNIQUE_CODE;?>&UID=<?php echo $id; ?>"><i style=" margin-left: 15px; font-size:15px;color:white;" class="fas fa-pen"></i></a>
									</span>
								</div>

							<?php } ?>
																					
							<div  style="text-align: center; border-radius: 10px; margin: 4px;">									
								<span style="font-size: 12px; background-color: #1c85b2; padding: 10px; border-radius: 10px; color: white;">
									Add new co-applicant
									
									<a href="<?php echo base_url()?>index.php/customer/coapplicant_new_screen_one?UID=<?php echo $id; ?>"><i style=" margin-left: 15px; font-size:15px;color:white;" class="fa fa-user-plus"></i></a>
								</span>
							</div>
						</div>						
					</div>	

					<?php if($isProfileFull == 'false')return;?>
				<?php } else { ?>
					<div class="row justify-content-center col-12">
						<div class="shadow" style="text-align: center; width: 250px; border-radius: 10px; padding: 10px; background-color: white; margin-top: 20px;">
							<span style="font-size: 12px;">No co-applicant found</span>							
						</div>
						<div class="w-100"></div>
						<a href="<?php echo base_url()?>index.php/customer/coapplicant_new_screen_one?UID=<?php echo $id; ?>">
							<div  style="text-align: center; width: 250px; border-radius: 10px; padding: 10px;  margin-top: 20px;">
								
								<span style="font-size: 12px; background-color: #1c85b2; padding: 10px; border-radius: 10px; color: white;">Add new co-applicant</span>
							</div>
						</a>
					</div>	
				<?php return;} ?>
			</div>	

			<form method="POST" action="<?php echo base_url(); ?>index.php/customer/apply_loan_screen_home_loan_action?UID=<?php echo $id; ?>" id="apply_loan_screen_1">
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Select Bank To Process File</span>

				</div>
				<div class="w-100"></div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Select Bank/ Financial Institution*</span>
						</div>		
						<div style="margin-left: 35px; margin-top: 8px;" class="col">	
				
														
															<select class="input-cust-name" aria-label="Default select example" name="bank_name" id="bank_name"  >
															<?php if(isset($form_data)){ if(!empty($form_data->bank_id)){?>
																<option value="">Select category</option>
																	<?php if (isset($banks)){ foreach($banks as $bank){ ?>
																	<option value="<?php  echo $bank->id; ?>" <?php if(!empty($form_data->bank_id) && $form_data->bank_id==$bank->id){echo 'selected';}?> ><?php  echo $bank->Bank_name; ?></option>
																	<?php }  }?>
																<?php } else {?>
																	<option value="">Select category</option>
																	<?php if (isset($banks)){ foreach($banks as $bank){ ?>
																	<option value="<?php  echo $bank->id; ?>"  ><?php  echo $bank->Bank_name; ?></option>
																	<?php }  }?>
																<?php }  }else {?>
															
																	<option value="">Select category</option>
																	<?php if (isset($banks)){ foreach($banks as $bank){ ?>
																	<option value="<?php  echo $bank->id; ?>"  ><?php  echo $bank->Bank_name; ?></option>
																	<?php }  }?>
																<?php } ?>
																	
																																	
															</select>
													</div>
												</div>	
			</div>

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Investment Details(In Rupees)</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Bank Balance*</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" required placeholder="Amount" class="input-cust-name" type="number" name="savings_in_bank" id="savings_in_bank" onkeyup="savings(); shortFall(this)" oninput="maxLengthCheck(this)" maxlength="10" value="<?php if(isset($form_data)){ echo $form_data->SAVING_IN_BANK;}?>">
						<input  hidden  class="input-cust-name" type="text" name="UID" id="UID" value="<?php if(!empty($id)){ echo $id; }?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Immovable Properties *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" required placeholder="Amount" class="input-cust-name" type="number" name="immovable_prop" id="immovable_prop" oninput="maxLengthCheck(this)" onkeyup="immovable(); shortFall(this)" maxlength="10" value="<?php if(isset($form_data)){ echo $form_data->IMMOVABLE_PROP;}?>">
	  				</div> 
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Investments *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required min="0" placeholder="Amount" class="input-cust-name" type="number" name="other_invest" id="other_invest" oninput="maxLengthCheck(this)" onkeyup="other(); shortFall(this)" maxlength="10" value="<?php if(isset($form_data)){ echo $form_data->OTHER_INVESTMENTS;}?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Insurance Policies *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" required placeholder="Amount" class="input-cust-name" type="number" name="insurance_poli" id="insurance_poli" oninput="maxLengthCheck(this)" onkeyup="insurance(); shortFall(this)" maxlength="10" value="<?php if(isset($form_data)){ echo $form_data->INSURANCE_POLICY;}?>">
	  				</div> 
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Do You Want To Transfer Outstanding Loan From Another Bank / Financial Institution  *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
						<input style="margin-right: 5px;" type="radio" name="prop_outstand" value="Yes">Yes
						<input checked="true" style="margin-left: 10px; margin-right: 5px;" type="radio" value="No" name="prop_outstand">No				
	  				</div> 

					
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Have You Short Listed The Property  *</span>
					</div>			
					<div class="w-100"></div>
	  				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input style="margin-right: 5px;" type="radio" name="prop_short_radio" value="Yes">Yes
						<input style="margin-left: 10px; margin-right: 5px;" type="radio" name="prop_short_radio" value="No" checked="true">No				
	  				</div> 
				</div>
				</div>
			</div>
					
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">
					Provide Details Of Property You Want To Buy</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="30" minlength="3" required style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LINE_1;?>">
  					<input maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 2 " class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LINE_2;?>">
  					<input maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 3 " class="input-cust-name" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LINE_3;?>">
  					<input hidden="true" class="input-cust-name" type="text" id="actual_loan_type" name="actual_loan_type" value="<?php echo $type;?>">
  				</div>  

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col" hidden>
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No Of Years At This Property *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col" hidden>
  					<input  placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years"  id="resi_no_of_years" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(!empty($row_more))echo $row_more->RES_ADDRS_NO_YEARS_LIVING;?>">
  				</div>	
                <div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Location *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select required class="input-cust-name resi_prop_type" name="prop_location" > 
					  <option value="">Select Property Location *</option>
					  <option value="within corporation limit" <?php if(!empty($form_data))if ($form_data->PROP_LOCATION == 'within corporation limit') echo ' selected="selected"'; ?>>Within Corporation Limit</option>
					  <option value="outside corporation limit" <?php if(!empty($form_data))if ($form_data->PROP_LOCATION == 'outside corporation limit') echo ' selected="selected"'; ?>>Outside Corporation Limit</option>
					  
					</select>
  				</div>  						
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="30" required placeholder="Enter landmark *" class="input-cust-name" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_LANDMARK;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Enter pincode *" class="input-cust-name" type="number" minlength="6" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_PINCODE;?>">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select required class="input-cust-name resi_prop_type" name="resi_sel_property_type" > 
					  <option value="">Select Property Type *</option>
					  <option value="Corporate Provided" <?php if(!empty($form_data))if ($form_data->PROP_ADD_PROP_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
					  <option value="Mortgaged" <?php if(!empty($form_data))if ($form_data->PROP_ADD_PROP_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
					  <option value="Owned" <?php if(!empty($form_data))if ($form_data->PROP_ADD_PROP_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
					  <option value="Rented" <?php if(!empty($form_data))if ($form_data->PROP_ADD_PROP_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
					  <option value="Shared Accomodation" <?php if(!empty($form_data))if ($form_data->PROP_ADD_PROP_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
					  <option value="Paying Guest" <?php if(!empty($form_data))if ($form_data->PROP_ADD_PROP_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
					  <option value="Others" <?php if(!empty($form_data))if ($form_data->PROP_ADD_PROP_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
					</select>
  				</div>  			  							  				
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" id="resi_state_view" placeholder="State" class="input-cust-name" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_STATE ;?>">
  					<input hidden="true" placeholder="State" class="input-cust-name" name="resi_state" id="resi_state" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_STATE ;?>">  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District" class="input-cust-name" id="resi_district_view" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_DISTRICT ;?>">
  					<input hidden="true" placeholder="District" class="input-cust-name" name="resi_district" id="resi_district" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_DISTRICT ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input maxlength="25" placeholder="City" class="input-cust-name" name="resi_city" id="resi_city" value="<?php if(!empty($form_data))echo $form_data->PROP_ADD_CITY ;?>">
  				</div>  			  				
			</div>							
			</div>
			</div>

			
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Loan Details</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Rate Option *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select required class="input-cust-name" name="select_rate_option"> 
							  <option value="">Select Option *</option>
							  <option value="Fixed" <?php if(!empty($form_data))if ($form_data->RATE_OPTION == 'Fixed') echo ' selected="selected"'; ?>>Fixed</option>							  
							  <option value="Floating" <?php if(!empty($form_data))if ($form_data->RATE_OPTION == 'Floating') echo ' selected="selected"'; ?>>Floating</option>				
							  <option value="Others" <?php if(!empty($form_data))if ($form_data->RATE_OPTION == 'Others') echo ' selected="selected"'; ?>>Others</option>				
							</select>
	  				</div>  

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan Type *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select required class="input-cust-name" name="select_loan_type"> 
							  <option value="">Select Loan Type *</option>
							  <option value="Home Loans" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Home Loans ') echo ' selected="selected"'; ?>>Home Loans</option>			
							  <option value="Home Improvement Loans" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Home Improvement Loans') echo ' selected="selected"'; ?>>Home Improvement Loans</option>
                              <option value="House Construction On Self Own Plot" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'House Construction On Self Own Plot') echo ' selected="selected"'; ?>>House Construction On Self Own Plot</option>
							  <option value="Balance Transfer" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Balance Transfer') echo ' selected="selected"'; ?>>Balance Transfer</option>
                             	
                              <option value="Re-Finance" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Re-Finance') echo ' selected="selected"'; ?>>Re-Finance</option>								  
							  <option value="Plot Loans" <?php if(!empty($form_data))if ($form_data->HOME_LOAN_TYPE == 'Plot Loans') echo ' selected="selected"'; ?>>Plot Loans</option>									  
							 
                              							  
							</select>
	  				</div>  

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Desired loan amount *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" required placeholder="Amount" class="input-cust-name" type="number" name="desired_loan_amount" id="desired_loan_amount" oninput="maxLengthCheck(this);" onkeyup="Loan_amount(); shortFall(this)" maxlength="15" value="<?php if(isset($form_data)){ echo $form_data->DESIRED_LOAN_AMOUNT; }?>">
	  				</div>  	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Tenure in Years *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="1" required placeholder="Enter year" class="input-cust-name" type="number" name="tenure_year" id="tenure_year" oninput="maxLengthCheck(this)" maxlength="2" value="<?php if(isset($form_data)){ echo $form_data->TENURE; }?>">
	  				</div> 

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Purpose Of Loan Availed for *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select required class="input-cust-name" name="loan_availed_for" id="loan_availed_for"> 
							  <option value="">Select availed for *</option>
							  <option value="Property from Developer / Builder" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Property from Developer / Builder') echo ' selected="selected"'; ?>>Property from Developer / Builder</option>
							  <option value="Property from Development Authority" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Property from Development Authority') echo ' selected="selected"'; ?>>Property from Development Authority</option>
							  <option value="Resale/ Pre-owned Flat/ Rowhouse" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Resale/ Pre-owned Flat/ Rowhouse') echo ' selected="selected"'; ?>>Resale/ Pre-owned Flat/ Rowhouse</option>
							  <option value="Construction of Standalone House on a Plot" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Construction of Standalone House on a Plot') echo ' selected="selected"'; ?>>Construction of Standalone House on a Plot</option>
							  <option value="sister" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'sister') echo ' selected="selected"'; ?>>Resale/ Pre-owned Bungalow</option>							  
							  <option value="Others" <?php if(!empty($form_data))if ($form_data->LOAN_AVAILED_FOR == 'Others') echo ' selected="selected"'; ?>>Others</option>							  
							</select>
	  				</div> 

	  				<div class="w-100"></div>
	  				
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Area of Land (Sq ft) </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Area" class="input-cust-name" type="number" name="area_land" id="area_land" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(isset($form_data)){ echo $form_data->AREA_OF_LAND;}?>">
	  				</div> 
	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Carpet Area(Sq ft)</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" placeholder="Carpet Area" class="input-cust-name" type="number" name="carpet_area" id="carpet_area" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(isset($form_data)){ echo $form_data->CARPET_AREA;}?>">
	  				</div> 

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Built up Area (Sq ft)</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" placeholder="Build up Area" class="input-cust-name" type="number" name="buildup_area" id="buildup_area" oninput="maxLengthCheck(this)" maxlength="15" value="<?php if(isset($form_data)){ echo $form_data->BUILD_UP_AREA;}?>">
	  				</div> 

	  				<div class="w-100"></div>	  				
	  				
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Stage of Construction</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  						<select required class="input-cust-name resi_prop_type" name="stage_of_const" > 
							<option value="">Stage of Construction *</option>
							
							<option value="Foundation" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Foundation') echo ' selected="selected"'; ?>>Foundation</option>
							
							<option value="Slab" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Slab') echo ' selected="selected"'; ?>>Slab</option>
							
							<option value="Concrete work" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Concrete work') echo ' selected="selected"'; ?>>Concrete work</option>
							
							<option value="Final" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Final') echo ' selected="selected"'; ?>>Final</option>
							
							<option value="Ready to move" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Ready to move') echo ' selected="selected"'; ?>>Ready to move</option>
							
							<option value="Fully Completed" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Fully Completed') echo ' selected="selected"'; ?>>Fully Completed</option>
							<option value="Partly completed" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Partly completed') echo ' selected="selected"'; ?>>Partly completed</option>
							<option value="Others" <?php if(!empty($form_data))if ($form_data->STAGE_OF_CONSTRUCTION == 'Others') echo ' selected="selected"'; ?>>Others</option>
						</select>
	  				</div> 
				</div>

				<span style=" margin-bottom: 10px; margin-top: 25px; font-size: 15px; font-weight: bold;color: black; margin-left: 40px;">The loan approval shall remain subject to assessment of legal and technical checks. Such assessment is for internal reliance alone and doesnt create any right in favour of anyone including the borrower (s) in any manner whatsoever.</span>
				<input style="margin-left: 40px; margin-top: 6px;" type="checkbox" id="is_agree" name="is_agree" value="Yes"><span style="font-size: 12px; margin-top: 5px; margin-left: 8px; color: black; font-weight: bold;">I / We Agree.</span>

			</div>


			<div class="row shadow bg-white rounded margin-10 padding-15">
				
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">
					Applicant Bank Detail's</span>
					<div class="w-100"></div>					
				</div>

				
				<div id="bankLayout" style="margin-left: 35px;" class="col">
					
	  					<?php

	  						if(!empty($form_data->BANK_DETAILS_JSON)){
							$json = $form_data->BANK_DETAILS_JSON;

							$jsonData = json_decode($json);
							if($jsonData!=''){
								$data_array = $jsonData->banks;
								for ($i=0; $i < count($data_array); $i++) { ?>
										<div class="bank_wrapper">
				  						<fieldset id="bankS_row">
											<div class="bank_row" id="line_1">
												<input required placeholder="Bank Acc Name" class="other-income-select bank-acc-name" type="text" maxlength="20" oninput="maxLengthCheck(this)" name="bank_acc_name" style="width: 17%;"  value="<?php echo $data_array[$i]->bank_acc_name;?>">
										       	<select required style="width: 17%;" class="other-income-select bank-select-data" id="acc_type" name="acc_type[]">
										        	<option id='1_1' value="">Account Type</option>
										            <option id='2_1' <?php if ($data_array[$i]->acc_type == 'Current') echo ' selected="selected"'; ?>>Current</option>
										            <option id='3_1' <?php if ($data_array[$i]->acc_type == 'Saving') echo ' selected="selected"'; ?>>Saving</option>
										        </select>	
												<input required placeholder="Acc for no of years" class="other-income-select bank-acc-years" type="number" name="acc_years" style="width: 17%;"  maxlength="2" oninput="maxLengthCheck(this)" value="<?php echo $data_array[$i]->bank_acc_year;?>">
										        <input required placeholder="IFSC code" class="other-income-select bank-ifsc" type="text" name="ifsc_code" id="ifsc_code" style="width: 17%;" maxlength="11" oninput="maxLengthCheck(this)" onkeydown="upperCaseF(this)" pattern="^[A-Z]{4}0[A-Z0-9]{6}$" title="SBIN0125620" value="<?php echo $data_array[$i]->ifsc_code;?>">
										        <input required placeholder="Account Number" class="other-income-select bank-acc-no" type="number"  name="acc_no" style="width: 17%;" maxlength="16" min="0" oninput="maxLengthCheck(this)"  value="<?php echo $data_array[$i]->bank_acc_no;?>">
										        <input disabled class="bank_remove other-income-select" type="button" value="-" style="width: 8%; color: red;" >


										    </div>	
										</fieldset>
									</div>	
								<?php } 
								}
							} else { ?>
								<div class="bank_wrapper">
				  						<fieldset id="bankS_row">
											<div class="bank_row" id="line_1">
												<input required placeholder="Bank Acc Name" class="other-income-select bank-acc-name" type="text" maxlength="20" oninput="maxLengthCheck(this)" name="bank_acc_name" style="width: 17%;" >
										        <select required style="width: 17%;" class="other-income-select bank-select-data" id="acc_type" name="acc_type[]">
										        	<option id='1_1' value="">Account Type</option>
										            <option id='2_1'>Current</option>
										            <option id='3_1' >Saving</option>
										        </select>										        
										        <input required placeholder="Acc for no of years" class="other-income-select bank-acc-years" type="number" name="acc_years" style="width: 17%;"  maxlength="2" oninput="maxLengthCheck(this)">
										        <input required placeholder="IFSC code" class="other-income-select bank-ifsc" type="text" name="ifsc_code" id="ifsc_code" style="width: 17%;" maxlength="11" oninput="maxLengthCheck(this)" onkeydown="upperCaseF(this)" pattern="^[A-Z]{4}0[A-Z0-9]{6}$" title="SBIN0125620">
										        <input required placeholder="Account Number" class="other-income-select bank-acc-no" type="number"  name="acc_no" style="width: 17%;" maxlength="16" min="0" oninput="maxLengthCheck(this)" >
										        <input disabled class="bank_remove other-income-select" type="button" value="-" style="width: 8%; color: red;" >
										    </div>	
										</fieldset>
									</div>	
						<?php }?>	  	

						<div style="color: blue;" class="add-more" type="button" id="add_more_bank">Add More</div>
	  				</div> 
			</div>

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Loan Estination Breakdown</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Estimated Cost *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Amount" class="input-cust-name" type="number" name="estimate_req_fund" id="estimate_req_fund" oninput="shortFall(this)" maxlength="15" value="<?php if(isset($form_data)) { echo $form_data->FINAL_ESTIMATED_COST;}?>">
	  				</div>  
	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan Requested *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Amount" class="input-cust-name" type="number" name="requested_fund" id="requested_fund" oninput="shortFall(this)" maxlength="10" value="<?php if(isset($form_data)) { echo $form_data->FINAL_LOAN_REQUESTED;}?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Bank Balance </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Amount" class="input-cust-name" type="number" name="bank_saving" id="bank_saving" oninput="shortFall(this)" maxlength="10" value="<?php if(isset($form_data)) { echo $form_data->FINAL_SAVING_FROM_BANK;}?>">
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Immovable Properties </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Amount" class="input-cust-name" type="number" name="disposal_invest" id="disposal_invest" oninput="shortFall(this)" maxlength="10" value="<?php if(isset($form_data)) { echo $form_data->FINAL_DISPOSAL_INVESTMENT;}?>">
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Investments </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Amount" class="input-cust-name" type="number" name="sale_of_property" id="sale_of_property" oninput="shortFall(this)" maxlength="10" value="<?php if(isset($form_data)) { echo $form_data->FINAL_SALE_PROPERTY;}?>">
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Insurance Policies</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Amount" class="input-cust-name" type="number" name="family_amount" id="family_amount" oninput="shortFall(this)" maxlength="10" value="<?php if(isset($form_data)) { echo $form_data->FINAL_FAMILY;}?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col" hidden>
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Provident Fund</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col" hidden>
	  					<input placeholder="Amount" class="input-cust-name" type="number" name="provident_fund" id="provident_fund" oninput="shortFall(this)" maxlength="10" value="<?php if(isset($form_data)) { echo $form_data->FINAL_PROVIDENT_FUND;}?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col" >
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Others </span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col" >
	  					<input placeholder="Amount" class="input-cust-name" type="number" name="others" id="others" oninput="shortFall(this)" maxlength="10" value="<?php if(isset($form_data)) { echo $form_data->FINAL_OTHERS;}?>">
	  				</div>  

	  				  
					  <div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:red; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: red; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Shortfall of Funds</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled="true" style="font-size: 12px; color: red; line-height: 30px; border-radius: 8px; border-style: solid; border-color: red; border-width: 1px; width: 100%; padding-left: 15px; margin-bottom: 10px;" value="0" type="number" name="shortfall" id="shortfall" oninput="maxLengthCheck(this)" maxlength="10" >
                         <input hidden="true" value="0" type="number" name="shortfall_1" id="shortfall_1">
	  					
	  					
	  				</div>
	  				
				</div>

				<div class="row col-12" style="margin-top:20px;">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="background-color: #eaeaea; height: 40px; border-radius: 6px; text-align: center;">
						 <span style="line-height: 40px; text-align: center; vertical-align: middle;color: red; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Total requirement of Funds (INR): </span> <input disabled placeholder="0" id="left_total" style="background-color: #eaeaea;color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; margin-left: 10px;" />
					</div>

					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="background-color: #eaeaea; height: 40px; border-radius: 6px; text-align: center; margin-left: 40px;">
						<span style="line-height: 40px; text-align: center; vertical-align: middle;color: red; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Total sources of Funds (INR): </span> <input disabled placeholder="0" id="right_total" style="background-color: #eaeaea;color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; margin-left: 10px;" />
					</div>
				</div>

				<div style="margin-top: 20px;" class="row col-12 justify-content-center">
					<div >
						<button class="login100-form-btn" style="background-color: #25a6c6;" id="apply_loan_btn">
							APPLY FOR LOAN
						</button>
					</div>		
				</div>				
			</div>

			</form>
		<?php } ?>	
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
								
		</div>		
	</div>
		
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
$('#ifsc_code').on('input', function(e) {
   this.setCustomValidity('')
     // e.target.checkValidity()
     this.reportValidity();
   })
 function Loan_amount()
{
   var Loan_amount = document.getElementById('desired_loan_amount').value;
   document.getElementById('requested_fund').value=Loan_amount;
}
function savings()
{
   var savings_in_bank = document.getElementById('savings_in_bank').value;
   document.getElementById('bank_saving').value=savings_in_bank;
}
function immovable()
{
   var immovable_prop = document.getElementById('immovable_prop').value;
   document.getElementById('disposal_invest').value=immovable_prop;
}
function other()
{
   var other_invest = document.getElementById('other_invest').value;
   document.getElementById('sale_of_property').value=other_invest;
}

function insurance()
{
   var insurance_poli = document.getElementById('insurance_poli').value;
   document.getElementById('family_amount').value=insurance_poli;
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