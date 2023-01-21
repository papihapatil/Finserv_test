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
						<?php } ?>
					</span>						
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
					<label class="padding-bottom-10">City</label>
					<select required class="input-cust-name" name="city" id="city_master"> 
							  <option value="">Select Option *</option>
                               <?php foreach($Cities as $city) {?>
							   	 <option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name; ?></option>
							   <?php } ?>
					</select>
					<label class="padding-bottom-10">Location</label>					
					<select required class="input-cust-name" name="location" id="location"> 
							    <option value="" id="location">Select Option *</option>
					</select>
					<?php } ?>
					<?php if($userType!='connector')
					{ ?>
						<?php if($type == 'dsa_rockers_agents_for_biss'|| $type=='connector' || $type=='customer'|| $type=='customer_consent'){ ?>
						<label class="padding-bottom-10">Refer by</label>
						<select class="form-control" aria-label="Default select example" name="Refer_By_Category" id="select_category_lead_1"  >
								<option value="">Select category</option>
								<option value="Self">Self</option>
								<?php if ($userType=='branch_manager'){?>
								<option value="Relationship_officer">Relationship Officer</option>
								<?php }?>
								<?php if ($userType=='branch_manager'||$userType=='Relationship_Officer'){?>
								<option value="DSA">DSA</option>
								<?php } ?>
								<option value="Connector">Connector</option>
																								
						</select>
						<input type="text" id="User_id" value=<?php echo $this->session->userdata('ID'); ?> hidden>
						<select class="form-control" aria-label="Default select example"  id="options_display_lead" name="Refer_By">
								<option value="">Select Name</option>
																								
						</select>
						<input type="text" id="Refered_By_self" name="Refered_By_self" hidden>
						<input type="text" id="Refered_By_Name" name="Refered_By_Name" hidden >
						<input type="text" id="Refer_By_Category_self" name="Refer_By_Category_self" value="<?php echo $userType; ?>" hidden >
						<?php } ?>
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
							<?php } ?>
						</button>
					</div>
										
				</form>

			</div>
		</div>
	</div>
	<script type="text/javascript">
	 /*-----------------------------------------added by papiha for view lead on btranch manger--------------------------*/
   $( "#select_category_lead_1" ).change(function(e) 
	{
	
        $("#options_display_lead").find("option:not(:first)").remove();
	    var select_category = $('#select_category_lead_1').val();
		
		
		var User_id = $('#User_id').val();
		if(select_category=="DSA")
		{
			
			if($("#options_display_lead option[value='']").prop('disabled'))
			{
				$("#options_display_lead option[value='']").prop('disabled', false);
			}
			 var url = window.location.origin+"/dsa/dsa/index.php/admin/get_Dsa_User"; 
			 $.ajax({
						type:'POST',
						url:url,
					   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
						data:{User_id:User_id},
						success:function(data){

                                var obj =JSON.parse(data);
								    $.each(obj, function (index, value) {
																				$('#options_display_lead').append($('<option/>', { 
																						value: value.UNIQUE_CODE,
																						text : value.FN +' '+ value.LN
																					}));
																				});      
									
							 
							
						}
					 });
		}
		else if(select_category=="Relationship_officer")
		{
			
			if($("#options_display_lead option[value='']").prop('disabled'))
			{
				$("#options_display_lead option[value='']").prop('disabled', false);
			}
			 var url = window.location.origin+"/dsa/dsa/index.php/admin/get_RM_user"; 
			 $.ajax({
						type:'POST',
						url:url,
					   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
						data:{User_id:User_id},
						success:function(data){

                                var obj =JSON.parse(data);
								    $.each(obj, function (index, value) {
																				$('#options_display_lead').append($('<option/>', { 
																						value: value.UNIQUE_CODE,
																						text : value.FN +' '+ value.LN
																					}));
																				});      
									
							 
							
						}
					 });
		}
		else if(select_category=="Connector")
		{
			
			if($("#options_display_lead option[value='']").prop('disabled'))
			{
				$("#options_display_lead option[value='']").prop('disabled', false);
			}
			 var url = window.location.origin+"/dsa/dsa/index.php/admin/get_Connector_user_BM"; 
			 $.ajax({
						type:'POST',
						url:url,
					   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
						data:{User_id:User_id},
						success:function(data){

                                var obj =JSON.parse(data);
								    $.each(obj, function (index, value) {
																				$('#options_display_lead').append($('<option/>', { 
																						value: value.UNIQUE_CODE,
																						text : value.FN +' '+ value.LN
																					}));
																				});      
									
							 
							
						}
					 });
		}
		else
		{
			
		    var User_id=$('#User_id').val()
			
			
		   var url = window.location.origin+"/dsa/dsa/index.php/admin/get_user_data"; 
			 $.ajax({
						type:'POST',
						url:url,
					   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
						data:{User_id:User_id},
						success:function(data){

                                var obj =JSON.parse(data);
								    
																				$('#options_display_lead').append($('<option/>', { 
																						value: obj.UNIQUE_CODE,
																						text : obj.FN +' '+ obj.LN,
																						selected:'selected'
																					}));
																					 $('#Refered_By_Name').val(obj.FN +' '+ obj.LN);
																				      
									
							 
							
						}
					 });
			
	       
			$("#options_display_lead option[value='']").prop('disabled', true);
			
		    $('#options_display_lead').val($('#User_id').val());

		}
			
		
		   
	});
	$( "#options_display_lead" ).change(function() 
	{
		 var value=$("#options_display_lead").val();
	$('#Refered_By_Name').val($("#options_display_lead option[value="+value+"]").text());
	});
	$( "#city_master" ).change(function() 
    {
       var value=$("#city_master").val();
	   $("#options_display_lead").find("option:not(:first)").remove();
	    var url = window.location.origin+"/dsa/dsa/index.php/admin/get_Branches"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{city_id:value},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                                    
                                         $.each(obj, function (index, value) {
                                          $('#location').append($('<option/>', { 
                                              value: value.Branch_Location,
                                              text : value.Branch_Location
                                            }));
                                          }); 
			  }
		 });
	   
	});	
	</script>
	
</body>
 