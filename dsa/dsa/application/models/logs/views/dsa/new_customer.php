<body style="background-color: #f2f2f2; width: 100%;">
		
	<div class="row justify-content-center">
		<div class="col-12">
			<div class="row justify-content-center">
		
				<form  action="<?php echo base_url(); ?>index.php/dsa/new_customer_action" method="POST" id="new_cust_form" class="row shadow bg-white rounded margin-10 padding-15 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
				<span class="signup100-form-title p-b-43" style="padding: 10px; margin-bottom: 20px; margin-top: 10px;">						
						<?php if($type == 'customer'){?>Create New Customer 
						<?php } else if($type == 'manager'){?>Create New Manager 
						<?php } else if($type == 'dsa_rockers_agents_for_biss'){?>Create New DSA 
						<?php } else if($type == 'csr'){?>Create New CSR 
						<?php } else if($type == 'Operations_user'){?>Create New Operations user
						<?php } else if($type == 'credit_manager_user'){?>Create New Credit Manager user
						<?php } else if($type == 'customer_consent'){?>Create New customer with consent
						<?php } else  if($type == 'HR'){ ?>Create New HR
						<?php }	else if($type == 'connector'){ ?>Create New Connector
						<?php } else if($type== 'branch_manager'){?>Create New Branch Manager
						<?php } else if($type== 'Relationship_Officer'){?>Create New Relationship Officer
						<?php } else if($type== 'Cluster_Manager'){?>Create New Cluster Manger
						<?php } else if($type== 'Area_Manager'){?>Create New Area Manger
						<?php } else if($type== 'Legal'){?> Create New Legal User
						<?php } else if($type== 'Technical'){?> Create New Technical User
						<?php } else if($type== 'Cluster_credit_manager'){?> Create New Cluster Credit Manager
						<?php } else if($type== 'FI'){?>Create New FI User
						<?php } else if($type== 'RCU'){?>Create New RCU User
						<?php } else if($type== 'Disbursement_OPS'){?>Create New Disbursement OPS
						<?php } else if($type== 'distributor'){?> Create New Distributor
						<?php } else if($type== 'retailer'){?> Create New Retailer
						<?php } else if($type== 'supplychainmanager'){?> Create New Supply Chain Manager
						<?php } else if($type== 'MIS'){?> Create New MIS User
						<?php } else if($type== 'Business_Head'){?> Create New Business Head
						<?php } else if($type== 'Chief_Risk_Officer'){?> Create New Chief Risk Officer
						<?php } else if($type== 'SCF Operations User'){?> Create New SCF Operations User		
						<?php } else if($type== 'Telecaller'){?> Create New Telecaller
									
						<?php }?>
					</span>	
					<?php 
					if($type== 'distributor' || $type=='retailer')
					    {
							
							?>
								<label class="padding-bottom-10">Firm Name</label>					
								<div class="wrap-edit validate-input" >
									<input class="input100" type="text" name="fn" minlength="3" maxlength="60" required oninput="maxLengthCheck(this)">
									<span class="focus-input100"></span>
								</div>	
								<label class="padding-bottom-10"> Firm Email-Id</label>					
								<div class="wrap-edit validate-input" >
									<input maxlength="60" class="input100" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter valid email id" required oninput="maxLengthCheck(this)">
									<span class="focus-input100"></span>
								</div>
								<label class="padding-bottom-10"> Contact Person Mobile No</label>	
								<div class="wrap-edit validate-input" >
									<input  class="input100" type="text" name="mobile" minlength="10" maxlength="10" required oninput="maxLengthCheck(this)" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number">
									<input  value="<?php echo $type;?>" class="input100" type="text" name="type" minlength="10" maxlength="10" hidden>
									<span class="focus-input100"></span>
								</div>	
							<?php 
						} else{
						?>					
					<label class="padding-bottom-10">First Name</label>					
					<div class="wrap-edit validate-input" >
						<input class="input100" type="text" name="fn" minlength="3" maxlength="20" required oninput="maxLengthCheck(this)">
						<span class="focus-input100"></span>
					</div>	

					<label class="padding-bottom-10">Last Name</label>					
					<div class="wrap-edit validate-input" >
						<input class="input100" type="text" name="ln" minlength="3" maxlength="20" required oninput="maxLengthCheck(this)">
						<span class="focus-input100"></span>
					</div>					

					<label class="padding-bottom-10">Email-Id</label>					
					<div class="wrap-edit validate-input" >
						<input maxlength="60" class="input100" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter valid email id" required oninput="maxLengthCheck(this)">
						<span class="focus-input100"></span>
					</div>						

					<label class="padding-bottom-10">Mobile</label>					
					<div class="wrap-edit validate-input" >
						<input  class="input100" type="text" name="mobile" minlength="10" maxlength="10" required oninput="maxLengthCheck(this)" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number">
						<input  value="<?php echo $type;?>" class="input100" type="text" name="type" minlength="10" maxlength="10" hidden>
						<span class="focus-input100"></span>
					</div>
					<?php } ?>	
                    <?php  if($type == 'customer' || $type == 'customer_consent'){?>	
					<label class="padding-bottom-10">Loan Type</label>	
                   				
						<select required class="input-cust-name" name="loan_type"> 
							  <option value="">Select Option *</option>
                               <?php foreach($loan_types as $loan_type) {?>
							   	 <option value="<?php echo $loan_type; ?>"><?php echo $loan_type; ?></option>
							   <?php } ?>
					</select>
							
					
					<?php } ?>					
					<?php if($type == 'dsa_rockers_agents_for_biss'|| $type=='connector'||$type=='Relationship_Officer'){ ?>
					<label class="padding-bottom-10">Location</label>					
					<div class="wrap-edit validate-input">
					
						<select required class="input-cust-name" name="Location" > 
							  <option value="">Select Option *</option>
							  <?php foreach($Cities as $city) {?>
							   		 <option value="<?php echo $city->City; ?>"><?php echo $city->City; ?></option>
							   <?php } ?>
							   <option value="Other">Other</option>
					   </select>
						<span class="focus-input100"></span>
					</div>

					<label class="padding-bottom-10">Other City</label>					
					<div class="wrap-edit validate-input">
							<input type="text" class="input100" id="OtherCity" value="" >

						<span class="focus-input100"></span>
					</div>
					
					
					<?php } ?>
					<?php if($userType!='connector')
					{ ?>
						<?php if($type == 'dsa_rockers_agents_for_biss'|| $type=='connector' || $type=='customer'|| $type=='customer_consent'){ ?>
						<label class="padding-bottom-10">Refer by</label>
						<select class="form-control" aria-label="Default select example" name="Refer_By_Category" id="select_category_lead_1" required  >
								<option value="">Select category</option>
								<option value="Self">Self</option>
								<?php if ($userType=='Cluster_Manager'){?>
								<option value="branch_manager">Branch Manager</option>
								<option value="Relationship_officer">Relationship Officer</option>
								<option value="DSA">DSA</option>
								<option value="Connector">Connector</option>
								<?php } ?>
								<?php if ($userType=='branch_manager'){?>
								<option value="Relationship_officer">Relationship Officer</option>
								<option value="DSA">DSA</option>
								<option value="Connector">Connector</option>
								<?php }?>
								<?php if ($userType=='Relationship_Officer'|| $userType=='Sales_Manager'){?>
								<option value="DSA">DSA</option>
								<option value="Connector">Connector</option>
								<?php }?>
								<?php if ($userType=='DSA'){?>
							
								<option value="Connector">Connector</option>
								<?php }?>
							
							
																								
						</select>
						<label class="padding-bottom-10">Refer by name</label>					
							<div class="wrap-edit validate-input" >
								<input maxlength="60" class="input100" type="text" name="Refer_By" id="options_display_lead" required oninput="maxLengthCheck(this)">
								<span class="focus-input100"></span>
							</div>	
						
					
						<input type="text" id="User_id" value=<?php echo $this->session->userdata('ID'); ?> hidden>
						<input type="text" id="User_Type" value=<?php echo $this->session->userdata('USER_TYPE'); ?> hidden>
						
					
						<input type="text" id="Refered_By_self" name="Refered_By_self" hidden>
						<input type="text" id="Refered_By_Name" name="Refered_By_Name" hidden >
						<input type="text" id="Refer_By_Category_self" name="Refer_By_Category_self" value="<?php echo $userType; ?>" hidden >
						<?php } ?>
					<?php } ?>	
					<?php if($type == 'credit_manager_user'|| $type=='Cluster_Manager' || $type=='Disbursement_OPS' || $type=='branch_manager' || $type=='Area_Manager' || $type=='Business_Head' ){ ?>
					<label class="padding-bottom-10">City</label>					
					<div class="wrap-edit validate-input" >
					
						<select required class="input-cust-name" name="Location" > 
							  <option value="">Select Option *</option>
							  <?php foreach($Branches_city as $city) {?>
							   		 <option value="<?php echo $city->city; ?>"><?php echo $city->city; ?></option>
							   <?php } ?>
					   </select>
						<span class="focus-input100"></span>
					</div>	
					<?php } ?>
					<?php  if($type=='Legal' ||$type=='Technical' || $type=='FI'|| $type=='RCU')
					{ ?>
				     <label class="padding-bottom-10">Banks</label>
						<select class="form-control" aria-label="Default select example" name="bank_name" id="bank_name"  >
								<option value="">Select Bank</option>
								<?php if (isset($banks)){ foreach($banks as $bank){ ?>
								<option value="<?php  echo $bank->id; ?>"><?php  echo $bank->Bank_name; ?></option>
								<?php }  }?>
																								
						</select>
					<?php } ?>					
					<div class="row col-12 justify-content-center">
						<div class=" container-login100-form-btn">
							<div id="loader" class="loader" style="margin-top:10px; margin-bottom:10px; display:none"></div>
						</div>					
					</div>	

					<div class="container-login100-form-btn">
					<button id="cust_submit" class="login100-form-btn" style="margin-top:10px;">
							<?php if($type == 'customer'){?>CREATE CUSTOMER
							<?php } else if($type == 'manager'){?>CREATE MANAGER
							<?php } else if($type == 'dsa_rockers_agents_for_biss'){?>CREATE DSA
							<?php } else if($type == 'csr'){?>CREATE CSR 
							<?php } else if($type == 'Operations_user'){?>CREATE NEW OPERATIONS USER 
							<?php } else if($type == 'credit_manager_user'){?>CREATE NEW CREDIT MANAGER
							<?php } else if($type == 'customer_consent'){?>CREATE NEW CUSTOMER WITH CONSENT
							<?php } else if($type == 'HR'){?>CREATE NEW HR
							<?php } else if($type == 'connector'){?>CREATE NEW CONNECTOR
							<?php } else if($type == 'branch_manager'){?>CREATE NEW BRANCH MANAGER
							<?php } else if($type == 'Relationship_Officer'){?>CREATE NEW RELATIONSHIP OFFICER
							<?php } else if($type == 'Cluster_Manager'){?>CREATE NEW CLUSTER MANAGER
							<?php } else if($type == 'Area_Manager'){?>CREATE NEW Area MANAGER
							<?php } else if($type == 'Legal'){?>CREATE NEW Legal User
							<?php } else if($type == 'Technical'){?>CREATE NEW Technical User
							<?php } else if($type == 'Cluster_credit_manager'){?>CLUSTER CREDIT MANAGER
							<?php } else if($type == 'FI'){?>CREATE NEW FI User
							<?php } else if($type == 'RCU'){?>CREATE NEW RCU User
							<?php } else if($type == 'Disbursement_OPS'){?>CREATE NEW DISBURSEMENT OPS USER
							<?php } else if($type == 'distributor'){?>CREATE NEW DISTRIBUTOR
						    <?php } else if($type== 'retailer'){?> CREATE NEW RETAILER
							<?php } else if($type== 'supplychainmanager'){?> CREATE NEW SUPPLY CHAIN MANAGER
							<?php } else if($type== 'MIS'){?> CREATE NEW MIS USER 
							<?php } else if($type== 'Business_Head'){?> CREATE NEW BUSINESS HEAD
							<?php } else if($type== 'Chief_Risk_Officer'){?> CREATE NEW CHIEF RISK OFFICER 
							<?php } else if($type== 'SCF Operations User'){?> CREATE NEW SCF OPERATIONS USER  
							<?php }	else if($type== 'Telecaller'){?> CREATE NEW TELECALLER
							<?php } ?>
						</button>
					</div>
										
				</form>

			</div>
		</div>
	</div>
	<script type="text/javascript">
	 	
	$( "#options_display_lead" ).change(function() 
	{
		 var value=$("#options_display_lead").val();
	$('#Refered_By_Name').val($("#options_display_lead option[value="+value+"]").text());
	});
	</script>
	
</body>
 