

	<div >
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
			<div class="row">
				<p style="margin-top:5px;">Apply for loan</p> <p style="margin-left:20px; background-color:green; border-radius:10px; color:white; padding:5px;">Credit score : <?php echo $score;?></p>
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
		  			<a href="<?php echo base_url()?>index.php/customer/customer_apply_for_loan_personal_busi_cc?type=personal&UID=<?php echo $id; ?>">
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
			  		</a>

			  		<a href="<?php echo base_url()?>index.php/customer/customer_apply_for_loan_personal_busi_cc?type=business&UID=<?php echo $id; ?>">
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
			  		</a>

			  		<a href="<?php echo base_url()?>index.php/customer/customer_apply_for_loan_personal_busi_cc?type=credit&UID=<?php echo $id; ?>">
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
			  		</a>
				</div>	
			</div>			
		</div>


		<!-- personal ------------------------------- -->
		<?php if($type == 'personal') { ?>	
			

			<form method="POST" action="<?php echo base_url(); ?>index.php/customer/apply_loan_screen_busi_per_cc_loan_action?UID=<?php if(!empty($id)){ echo $id; } ?>" id="apply_loan_screen_3_busi_per_cc">
				

			

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Loan Details</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">					

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Desired loan amount *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Amount" class="input-cust-name" type="number" name="desired_loan_amount" id="desired_loan_amount" oninput="maxLengthCheck(this)" maxlength="15">
	  					<input hidden="true" class="input-cust-name" type="text" id="actual_loan_type" name="actual_loan_type" value="<?php echo $type;?>">
	  				</div>  	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Tenure in Years *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Enter year" class="input-cust-name" type="number" name="tenure_year" id="tenure_year" oninput="maxLengthCheck(this)" maxlength="2">
	  				</div> 	  				
	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">					

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Reason for Loan *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select required class="input-cust-name" name="visit_reason" id="visit_reason"> 
							  <option value="">Select Reason *</option>
							  <option value="Medical" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Medical') echo ' selected="selected"'; ?>>Medical</option>
							  <option value="House Owner (Home Renovation)" <?php if(!empty($row))if ($row->REF_2_RELATION == 'House Owner (Home Renovation)') echo ' selected="selected"'; ?>>House Owner (Home Renovation)</option>
							  <option value="Personal (Others)" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Personal (Others)') echo ' selected="selected"'; ?>>Personal (Others)</option>
							  <option value="Holiday" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Holiday') echo ' selected="selected"'; ?>>Holiday</option>
							  <option value="Advance Salary" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Advance Salary') echo ' selected="selected"'; ?>>Advance Salary</option>
							  <option value="Rental Deposit" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Rental Deposit') echo ' selected="selected"'; ?>>Rental Deposit</option>
							  <option value="Wedding" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Wedding') echo ' selected="selected"'; ?>>Wedding</option>
							  <option value="Credit Card Takeover" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Credit Card Takeover') echo ' selected="selected"'; ?>>Credit Card Takeover</option>					  
							  <option value="Others" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Others') echo ' selected="selected"'; ?>>Others</option>					  
							</select>
	  				</div> 
					
					
				</div>

				<span style=" margin-bottom: 10px; margin-top: 25px; font-size: 15px; font-weight: bold;color: black; margin-left: 40px;">The loan approval shall remain subject to assessment of legal and technical checks. Such assessment is for internal reliance alone and doesnt create any right in favour of anyone including the borrower (s) in any manner whatsoever.</span>
				<input style="margin-left: 40px; margin-top: 6px;" type="checkbox" id="is_agree" name="is_agree" value="Yes"><span style="font-size: 12px; margin-top: 5px; margin-left: 8px; color: black; font-weight: bold;">I / We Agree.</span>

			</div>

				<div style="margin-top: 20px; margin-bottom: 20px;" class="row col-12 justify-content-center">
					<div >
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							APPLY FOR LOAN
						</button>
					</div>		
				</div>				
			</div>

			</form>
		<?php } else if($type == 'credit') { ?>		
			<form method="POST" action="<?php echo base_url(); ?>index.php/customer/apply_loan_screen_busi_per_cc_loan_action?UID=<?php if(!empty($id)){ echo $id; } ?>" id="apply_loan_screen_3_busi_per_cc">
				<div class="row shadow bg-white rounded margin-10 padding-15" id="bank_layout">
					<div class="row justify-content-center col-12">
						<span style="text-align: center; margin-bottom: 10px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us about Bank, where you want Credit Card</span>				
				</div>

				<input hidden="true" class="input-cust-name" type="text" id="actual_loan_type" name="actual_loan_type" value="<?php echo $type;?>">

				<div class="row justify-content-center col-12">
					<select required style="width: 17%;" class="other-income-select bank-name" id="bl" name="bank_name">
			        	<option id='1_1' value="">Select Bank</option>
			            <option id='2_1'>State Bank of India</option>
			            <option id='3_1' >Axis Bank</option>
			            <option id='4_1' >HDFC Bank</option>
			            <option id='5_1' >ICICI Bank</option>
			            <option id='6_1' >Bank of Baroda</option>
			            <option id='7_1' >Union Bank of India</option>
			            <option id='8_1' >IDBI Bank</option>
			            <option id='9_1' >Canara Bank</option>
			            <option id='10_1' >Punjab National Bank</option>
			            <option id='11_1' >UCO Bank</option>
			            <option id='12_1' >Other</option>
			        </select>
				</div>	

				<span style=" margin-bottom: 10px; margin-top: 25px; font-size: 15px; font-weight: bold;color: black; margin-left: 40px;">The loan approval shall remain subject to assessment of legal and technical checks. Such assessment is for internal reliance alone and doesnt create any right in favour of anyone including the borrower (s) in any manner whatsoever.</span>
				<input style="margin-left: 40px; margin-top: 6px;" type="checkbox" id="is_agree" name="is_agree" value="Yes"><span style="font-size: 12px; margin-top: 5px; margin-left: 8px; color: black; font-weight: bold;">I / We Agree.</span>			

				<div style="margin-top: 20px;" class="row col-12 justify-content-center">
					<div >
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							APPLY FOR LOAN
						</button>
					</div>		
				</div>	
			</form>
		<?php }?>

		<?php if($type == 'business') { ?>	
			

			<form method="POST" action="<?php echo base_url(); ?>index.php/customer/apply_loan_screen_busi_per_cc_loan_action?UID=<?php if(!empty($id)){ echo $id; } ?>" id="apply_loan_screen_3_busi_per_cc">
				

			

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Loan Details</span>

				</div>	
				
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">					

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Desired loan amount *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Amount" class="input-cust-name" type="number" name="desired_loan_amount" id="desired_loan_amount" oninput="maxLengthCheck(this)" maxlength="15">
	  					<input hidden="true" class="input-cust-name" type="text" id="actual_loan_type" name="actual_loan_type" value="<?php echo $type;?>">
	  				</div>  	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Tenure in Years *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input required placeholder="Enter year" class="input-cust-name" type="number" name="tenure_year" id="tenure_year" oninput="maxLengthCheck(this)" maxlength="2">
	  				</div> 	  				
	  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">					

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Reason for Loan *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select required class="input-cust-name" name="visit_reason" id="visit_reason"> 
							  <option value="">Select Reason *</option>
							  <option value="Expand/enhance infrastructure" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Expand/enhance infrastructure') echo ' selected="selected"'; ?>>Expand/enhance infrastructure</option>
							  <option value="Hire staff/Grow team" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Hire staff/Grow team') echo ' selected="selected"'; ?>>Hire staff/Grow team</option>
							  <option value="Marketing and advertising expenses" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Marketing and advertising expenses') echo ' selected="selected"'; ?>>Marketing and advertising expenses</option>
							  <option value="Pay other business expenses" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Pay other business expenses') echo ' selected="selected"'; ?>>Pay other business expenses</option>
							  <option value="Pay invoices" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Pay invoices') echo ' selected="selected"'; ?>>Pay invoices</option>
							  <option value="Payback past loan(s)" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Payback past loan(s)') echo ' selected="selected"'; ?>>Payback past loan(s)</option>
							  <option value="Purchase inventory/raw materials" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Purchase inventory/raw materials') echo ' selected="selected"'; ?>>Purchase inventory/raw materials</option>
							  <option value="Purchase equipment/machinery" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Purchase equipment/machinery') echo ' selected="selected"'; ?>>Purchase equipment/machinery</option>			
							  <option value="Others" <?php if(!empty($row))if ($row->REF_2_RELATION == 'Others') echo ' selected="selected"'; ?>>Others</option>					  
							</select>
	  				</div> 
					
					
				</div>

				<span style=" margin-bottom: 10px; margin-top: 25px; font-size: 15px; font-weight: bold;color: black; margin-left: 40px;">The loan approval shall remain subject to assessment of legal and technical checks. Such assessment is for internal reliance alone and doesnt create any right in favour of anyone including the borrower (s) in any manner whatsoever.</span>
				<input style="margin-left: 40px; margin-top: 6px;" type="checkbox" id="is_agree" name="is_agree" value="Yes"><span style="font-size: 12px; margin-top: 5px; margin-left: 8px; color: black; font-weight: bold;">I / We Agree.</span>

			</div>

				<div style="margin-top: 20px; margin-bottom: 20px;" class="row col-12 justify-content-center">
					<div >
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							APPLY FOR LOAN
						</button>
					</div>		
				</div>				
			</div>

			</form>
		<?php } ?>	
		</div>		
	</div>
