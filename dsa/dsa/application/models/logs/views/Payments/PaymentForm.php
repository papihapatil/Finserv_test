<?php

//echo "Payment Form";


?>
<form method="POST" action="<?php echo base_url(); ?>index.php/Payments/RegisterMandate" id="dsa_update_profile_one_new_action">
	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				Update personal details
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div>
						<span class="shadow align-middle dot"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></span>				
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
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div style="font-size: 10px; color: black; margin-right: 20px;">
						Personal Details
					</div>
					
					<div style="font-size: 10px; margin-right: 20px; color: black;">
						Documents
					</div>
				</div>	
			</div>
		</div>
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Please tell us a bit about yourself</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 45px; font-size: 12px; color: #bfbbbb;">Please fill your personal details. If required our Representative may get in touch to verify them.</span>

			</div>
			
			<div class="w-100"></div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email-Id *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input required placeholder="Enter email-Id *" class="input-cust-name" type="email" name="email" value="jaykumar.nimbalkar@gmail.com" minlength="8" maxlength="75">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input required placeholder="Enter mobile number *" class="input-cust-name" type="text" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number" name="mobile" oninput="maxLengthCheck(this)" maxlength="10" value="9960763466">
  				</div> 
				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">TXN Number *</span>
				</div>		
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input required placeholder="Enter mobile number *" class="input-cust-name" type="text" title="Please enter valid 10 digit phone number" name="txnId"  value="9898">
  				</div> 
 
  			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Total amount *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input required placeholder="Enter Total Amount *" class="input-cust-name" type="totalamount" name="totalamount" value="1" minlength="1" maxlength="75">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">max Amount *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input required placeholder="Enter max amount *" class="input-cust-name" type="text"  title="Please enter valid 10 digit phone number" name="maxAmount" oninput="maxLengthCheck(this)" maxlength="10" value="1">
  				</div> 
 
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="w-100"></div>

				<div style="margin-top: 0px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">debit Start Date *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">

					<input  class="input-cust-name" type="text" name="debitStartDate" id="debitStartDate" value="03-09-2022" >
				</div>
			  	<div class="w-100"></div>

				<div style="margin-top: 20px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">debit End Date *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input  class="input-cust-name" type="text" name="debitEndDate" id="debitEndDate" value="30-12-2025" >

				</div>	

				<div style="margin-top: 20px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Consumer Id *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
										<input  class="input-cust-name" type="text" name="consumerId" id="consumerId" value="56436" >

				</div>	

				
  			</div>  			
		</div>

		

		

		<!-- work details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Tell us where you live</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">This will help us to collect any documents if necessary.</span>

			</div>
			<div class="w-100"></div>

			<div class="col-12" style="margin-bottom: 20px; color: black; font-size: 14px;">
				<span>Card Details *</span>

			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Card Details *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  style="margin-top: 1px;" placeholder="card Number *" class="input-cust-name" type="text" name="cardNumber" id="cardNumber" value=""  minlength="3" maxlength="30">
  					<input style="margin-top: 8px;" placeholder="exp Month *" class="input-cust-name" type="text" name="expMonth" id="expMonth" value="" minlength="2" maxlength="30">
  					<input style="margin-top: 8px;" placeholder="exp Year *" class="input-cust-name" type="text" id="expYear" name="expYear" value="" minlength="4" maxlength="30">
					
				</div>  

  				<div class="w-100"></div>

  						
				
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input min="1"  placeholder="cvv Code *" class="input-cust-name" type="number" maxlength="3" name="cvvCode"  id="cvvCode" oninput="maxLengthCheck(this)" maxlength="3" value="">
  				</div>			  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">bankCode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="bankCode *" class="input-cust-name" type="text" name="bankCode" id="bankCode" value="11050" minlength="3" maxlength="30">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">account Number *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="account No *" class="input-cust-name" type="text"  minlength="6" title="accountNo" name="accountNo" id="accountNo" oninput="maxLengthCheck(this)" maxlength="16" value="30360235847">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">account Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select  class="input-cust-name resi_prop_type" name="accountType" > 
					  <option value="">Select Property Type *</option>
					  
					  <option value="Saving" selected >Saving</option>
					  
					</select>

  				</div>  
  				

			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">account Holder Name *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  id="accountHolderName" name="accountHolderName" placeholder="account Holder Name" class="input-cust-name" value="Jaykumar Nimbalkar">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">ifsc Code *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="ifscCode" class="input-cust-name" id="ifscCode" name="ifscCode" value="SBIN0000305">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Merchant Code *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="merchantId" class="input-cust-name" name="merchantId" id="merchantId" value="T764243" minlength="3" maxlength="30">
  				</div>  			  				
			</div>

			
		</div>		
		
		
		<!-- work details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Tell us where your Bank Details</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">Card and Bank Details.</span>

			</div>
			<div class="w-100"></div>

			<div class="col-12" style="margin-bottom: 20px; color: black; font-size: 14px;">
				<span>Card Details *</span>

			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">paymentMode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  				
<select required class="input-cust-name resi_prop_type" name="paymentMode" > 
					  <option value="">Select payment Mode *</option>
					  
					  
					  <option value="all">all</option>
<option value="netBanking" selected >netBanking </option>

					  
					</select>  
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">amount Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
<select required class="input-cust-name resi_prop_type" name="amountType" > 
					  <option value="">Select amountType *</option>
					  
					  
					  <option value="M">Variable Amount</option>
<option value="F" selected >Fixed Amount </option>

					  
					</select>  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Frequency *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					
					
					<select required class="input-cust-name resi_prop_type" name="frequency" > 
					  <option value="">Select frequency *</option>
					  
					  
					  <option value="DAIL">Daily</option>
<option value="WEEK">Weekly </option>
<option value="MNTH" selected > Monthly </option>
<option value="QURT" > Quarterly</option>
<option value="MIAN" > Semi annually</option>
<option value="YEAR" > Yearly</option>
<option value="BIMN" > Bi- monthly</option>
<option value="ADHO" > As and when presented </option>
					  
					</select>

  				</div>  
  				

			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">item Id *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="itemId *" class="input-cust-name" type="text" name="itemId" id="itemId" value="879089" minlength="3" maxlength="30">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Amount *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="amount *" class="input-cust-name" type="text"  minlength="1" title="amount" name="amount" id="amount" oninput="maxLengthCheck(this)" maxlength="16" value="1">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Commission amount *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<input required placeholder="comAmt *" class="input-cust-name" type="text"  minlength="1" title="comAmt" name="comAmt" id="comAmt" oninput="maxLengthCheck(this)" maxlength="16" value="<?php if(!empty($row))echo $row->comAmt;?>">

  				</div>  
  				

			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">txn Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					
					<select required class="input-cust-name resi_prop_type" name="txnType" id="txnType" > 
					  <option value="">Select txnSubType *</option>
					  
					  
					  <option value="SALE">SALE</option>
<option value="PREAUTH">PREAUTH</option>

					  
					</select> 
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">txn Sub Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<select required class="input-cust-name resi_prop_type" name="txnSubType" > 
					  <option value="">Select txnSubType *</option>
					  
					  
					  <option value="DEBIT">DEBIT</option>
<option value="RESERVE">RESERVE</option>

					  
					</select>  
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">cart Description *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input placeholder="cart Description" class="input-cust-name" name="cartDescription" id="cartDescription" value="<?php if(!empty($row))echo $row->cartDescription;?>" minlength="3" maxlength="30">
  				</div>  			  				
			</div>

			
		</div>		


		

		

					
		

        <div class="row shadow bg-white rounded margin-10 padding-15">		
			<div style="margin-top: 20px;" class="row col-12 justify-content-center">
					<div >
						<a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							CONTINUE
						</button></a>
					</div>		
				</div>
		</div>

	</div>
</form>
<script type="text/javascript">
function add_row()
{
 $rowno=$("#employee_table tr").length;
 $rowno=$rowno+1;
 $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='Acc_name[]' placeholder='Bank Acc Name' class='input-cust-name'></td><td><select class='input-cust-name' name='Acc_type[]'><option  value=''>Account Type</option><option  value='Current'>Current</option><option  value='Saving'>Saving</option></select></td><td><input type='text' name='Branch_name[]' placeholder='Enter Branch name' class='input-cust-name'></td><td><input type='text' name='IFSC_code[]' placeholder='IFSC code' class='input-cust-name'></td><td><input type='text' name='Acc_number[]' placeholder='Account Number' class='input-cust-name'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"') style='color: red;' class='add-more'></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
<script>
	 $(document).ready(function () {
                
                $('#debitStartDate').datepicker({
					autoclose: true,
					endDate: new Date(new Date().setDate(new Date().getDate())),
					constrainInput: true,
					format: 'yyyy-mm-dd'  
				
                }); 

				$('#debitEndDate').datepicker({
					autoclose: true,
					endDate: new Date(new Date().setDate(new Date().getDate())),
					constrainInput: true,
					format: 'yyyy-mm-dd'  
				
                });  
            
            });
	
</script>
<script>
	 $(document).ready(function () {
                
                $('#debitStartDate').datepicker({
					autoclose: true,
					endDate: new Date(new Date().setDate(new Date().getDate())),
					constrainInput: true,
					format: 'yyyy-mm-dd'  
				
                });  
            
            });
	$("#add_bank").click(function(e){
            e.preventDefault ? e.preventDefault() : (e.returnValue = false);         
            var clone = '<div class="w-100"></div>  '+
			            '<div  class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="add_bank_row">'+
							'<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">'+ 
								'<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Bank Details *</span>'+
							'</div>'+
							'<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">'+
								'<select required class="input-cust-name resi_prop_type" name="bank[]" placeholder="Select Bank Name" style="margin-top:8px;" >'+
								  '<option value="">Select Bank Name *</option>'+
								  <?php foreach($banks as $bank){ ?>
								  '<option value="<?php echo $bank->BANK_NAME; ?>"><?php echo $bank->BANK_NAME; ?></option>'+
								  <?php }?>
								  
								'</select>'+
							'</div>'+
							'<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">'+
							'<input style="margin-top: 8px;" placeholder="DSA Code" class="input-cust-name" type="text" name="dsa_code[]" id="" value="" >'+
								
							'</div>'+
							'<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">'+
								'<input class="banks_remove_row_remove other-income-select" type="button" value="DELETE" style="margin-left:4px; color: red;" >'+
							'</div>'+
			            '</div>';
						
						
            $("#add_banks_row").append(clone);
			//alert("hi");
        }); 
		 $('#add_banks_row').on('click', '.banks_remove_row_remove', function() {
         $(this).closest("#add_bank_row").remove();
         //alert("hi");
        });	
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>


