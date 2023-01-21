<body style="background-color: #f2f2f2; width: 100%;">

<div class="row justify-content-center rounded margin-10 padding-15" id="business_man_layout_doc">
	<div class="card shadow col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom: 10px;"> 
	
	<div class="row justify-content-center">
		<div >
			<div >
				<form class="login100-form validate-form" style="background-color:#ffffff;" action="<?php echo base_url(); ?>index.php/admin/new_doctype_action" method="POST" id="new_doctype_form">
					<span class="signup100-form-title p-b-43">						
						Add New Document Type
					</span>					 
												
					<label class="padding-bottom-10">Document Name</label>					
					<div class="wrap-edit validate-input" >
						<input class="input100" type="text" name="doc_name" required>
						<span class="focus-input100"></span>
					</div>	

					<label class="padding-bottom-10">Mandatory</label>	
					<select class="wrap-edit" name="doc_mandatory" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 0px; margin-bottom: 18px; padding: 10px;" required> 
						  <option value="">Select</option>
						  <option value="YES">YES</option>
						  <option value="NO">NO</option>						  
					</select>				

					<label class="padding-bottom-10">Document For</label>					
					<select class="wrap-edit" name="doc_for" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 0px; margin-bottom: 18px; padding: 10px;" required> 
						  <option value="">Select Document For</option>
						  <option value="1">CUSTOMER</option>
						  <option value="2">DSA</option>						
						  <option value="0">DSA AND CUSTOMER</option>						  
					</select>

					<label class="padding-bottom-10">Document Type</label>					
					<select  multiple class="wrap-edit" name="doc_type[]" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 0px; margin-bottom: 18px; padding: 10px; height: 100%;" required > 
						  <option value="">Select Document Type</option>
						  <option value="KYC">KYC</option>
						  <option value="RESIDENTIAL">RESIDENTIAL</option>						
						  <option value="BUSINESS">BUSINESS</option>
						  <option value="INCOME">INCOME</option>
                          <option value="LAP">Loan Aganist Property</option>						  
                          <option value="Home Loans">Home Loans</option>	
                          <option value="Home Improvement Loans">Home Improvement Loans</option>	
                          <option value="House Construction On Self Own Plot">House Construction On Self Own Plot</option>
                          <option value="Balance Transfer">Balance Transfer</option>
                         	
                          <option value="Re-Finance">Re-Finance</option>						  
					</select>	
                    <label class="padding-bottom-10">Document For Customer</label>					
					<select class="wrap-edit" name="INCOME_SRC" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 0px; margin-bottom: 18px; padding: 10px;" > 
						  <option value="">Select customer type</option>
						  <option value="salaried">salaried</option>
						  <option value="self-employed">self-employed</option>						
						  									  
					</select>						
								
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							SAVE
						</button>
					</div>
										
				</form>

			</div>
		</div>
	</div>

	</div>	
	
</body>
