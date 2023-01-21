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
											 <form method="POST" action="<?php echo base_url(); ?>index.php/admin/submit_account_conversion_data" id="convert_account" >  
											    <div class="row">
													<div class="col-sm-12"><h3>Account Conversion</h3><hr></div>
													<div class="col-sm-4">
														<div class="form-group">
															<label >USER NAME</label>
															<?php 									
																	$get_all_users_assigne_from_list=(json_decode(json_encode($get_all_users_assigne_from_list),true));
															?>
															<select class="form-control" onchange="Function_one_copy();" id="get_all_users_assigne_from_list_copy">
																<option>Select</option>
																<?php
																	foreach ($get_all_users_assigne_from_list as $user)
																	{ 
																?>
															    <?php
															   if($user['ROLE']==2)
															   {
                                                               ?>
															   
															   <span id="grt_role"  hidden><?php echo $user['ROLE']; ?></span>
															    <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (DSA)"; ?></option>
															   <?php
															   }
															   else if($user['ROLE']==6)
															   {
                                                               ?>
															  <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (CSR)"; ?></option>
															   <?php
															   }
															   else if($user['ROLE']==7)
															   {
                                                               ?>
															   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (MANAGER)"; ?></option>
															   <?php
															   }
															   else if($user['ROLE']==13)
															   {
                                                               ?>
															   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (BRANCH MANAGER)"; ?></option>
															   <?php
															   }
															   else if($user['ROLE']==14)
															   {
                                                               ?>
															   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (RELATIONSHIP OFFICER)"; ?></option>
															   <?php
															   }
															   else if($user['ROLE']==15)
															   {
                                                               ?>
															   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (CLUSTER MANAGER)"; ?></option>
															   <?php
															   }
															    else if($user['ROLE']==21)
															   {
                                                               ?>
															   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (SALES MANAGER)"; ?></option>
															   <?php
															   }
    														   ?>
															 
															<?php 
															}
															?>
															</select>
														</div>
													</div>
													<div class="col-sm-2">
													        <label >ROLE TO ASSIGNE</label>
															<select class="form-control" id="category_by_selected_user_copy">
																<option>Select</option>

															</select>
													</div>
													<div class="col-sm-2">
														<button type="submit" value="submit" name="submit" class="btn btn-info" style="margin-top:8%;  margin-bottom: 20px" >Convert </button>
													</div>
												</form>
												</div>
												</div>
												 <form method="POST" action="<?php echo base_url(); ?>index.php/admin/submit_account_disable_data" id="disable_account" >  
											   			
												<div class="row">
													<div class="col-sm-12"><h3>Disable User Account</h3><hr></div>
													<div class="col-sm-4">
															<div class="form-group">
																<label >USER NAME</label>
																<?php 									
																		$get_all_user_accounts=(json_decode(json_encode($get_all_user_accounts),true));
																?>
																<select class="form-control" onchange="disable_user();" id="get_user_for_disable_account">
																	<option>Select</option>
																	<?php
																		foreach ($get_all_user_accounts as $user)
																		{ 
																	?>
																	<?php
																   if($user['ROLE']==2)
																   {
																   ?>
															   
																   <span id="grt_role"  hidden><?php echo $user['ROLE']; ?></span>
																	<option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (DSA)"; ?></option>
																   <?php
																   } 
																	else if($user['ROLE']==3)
																   {
																   ?>
																   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (CPA)"; ?></option>
																   <?php
																   }
																   else if($user['ROLE']==4)
																   {
																   ?>
																   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (CONNECTOR)"; ?></option>
																   <?php
																   }
																   else if($user['ROLE']==6)
																   {
																   ?>
																  <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (CSR)"; ?></option>
																   <?php
																   }
																   else if($user['ROLE']==7)
																   {
																   ?>
																   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (MANAGER)"; ?></option>
																   <?php
																   }
																	else if($user['ROLE']==8)
																   {
																   ?>
																   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (CREDIT MANAGER)"; ?></option>
																   <?php
																   }
																	else if($user['ROLE']==9)
																   {
																   ?>
																   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (HR)"; ?></option>
																   <?php
																   }
																   else if($user['ROLE']==13)
																   {
																   ?>
																   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (BRANCH MANAGER)"; ?></option>
																   <?php
																   }
																   else if($user['ROLE']==14)
																   {
																   ?>
																   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (RELATIONSHIP OFFICER)"; ?></option>
																   <?php
																   }
																   else if($user['ROLE']==15)
																   {
																   ?>
																   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (CLUSTER MANAGER)"; ?></option>
																   <?php
																   }
																	else if($user['ROLE']==16)
																   {
																   ?>
																   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (AREA MANAGER)"; ?></option>
																   <?php
																   }
																	else if($user['ROLE']==17)
																   {
																   ?>
																   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (REGIONAL MANAGER)"; ?></option>
																   <?php
																   }
																	else if($user['ROLE']==18)
																   {
																   ?>
																   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (LEGAL USER)"; ?></option>
																   <?php
																   }
																	else if($user['ROLE']==19)
																   {
																   ?>
																   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (TECHNICAL USER)"; ?></option>
																   <?php
																   }
																	else if($user['ROLE']==20)
																   {
																   ?>
																   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (SUPPORT TEAM)"; ?></option>
																   <?php
																   }
																	else if($user['ROLE']==21)
																   {
																   ?>
																   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (SALES MANAGER)"; ?></option>
																   <?php
																   }
    															   ?>
															 
																<?php 
																}
																?>
																</select>
															</div>
														</div>
														<div class="col-sm-2">
															<button type="submit" value="submit" name="submit" class="btn btn-info" style="margin-top:14%;" >Click To Disable</button>
														</div></form>
														<div class="col-sm-2">
															<button type="button" class="btn btn-info" style="margin-top:6%; margin-bottom:20px" onclick="view_disabled_accounts('disabled_users');">View Disable Accounts</button>
														</div>
																								
												</div>
											
											<div class="row" >
												<div class="col-sm-12" id="disabled_users" style="display:none;">
												<table>
												  <thead>
													<tr>
													  <th>NAME</th>
													  <th>EMAIL</th>
													  <th>MOBILE</th>
													   <th>ACTION</th>
													</tr>
												  </thead>
												  <tbody id="disabled_users_date">
 
												  </tbody>
 
												</table>
												</div>
											</div>
												 <form method="POST" action="<?php echo base_url(); ?>index.php/admin/submit_assigne_users_data" id="Assign_users" >  
										
        										<div class="row">
												<div class="col-sm-12"><h3>Assigning Users</h3><hr></div>
													<div class="col-sm-4">
														<div class="form-group">
															<label >Assign from</label>
																<?php 									
																	$get_all_users_assigne_from_list=(json_decode(json_encode($get_all_users_assigne_from_list),true));
																?>
														    <select class="form-control" id="get_all_users_assigne_from_list" onchange="Function_one();">
																<option>Select</option>
																<?php
																	foreach ($get_all_users_assigne_from_list as $user)
																	{ 
																?>
															    <?php
															   if($user['ROLE']==2)
															   {
                                                               ?>
															   
															   <span id="grt_role"  hidden><?php echo $user['ROLE']; ?></span>
															    <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (DSA)"; ?></option>
															   <?php
															   }
															   else if($user['ROLE']==6)
															   {
                                                               ?>
															  <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (CSR)"; ?></option>
															   <?php
															   }
															   else if($user['ROLE']==7)
															   {
                                                               ?>
															   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (MANAGER)"; ?></option>
															   <?php
															   }
															   else if($user['ROLE']==13)
															   {
                                                               ?>
															   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (BRANCH MANAGER)"; ?></option>
															   <?php
															   }
															   else if($user['ROLE']==14)
															   {
                                                               ?>
															   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (RELATIONSHIP OFFICER)"; ?></option>
															   <?php
															   }
															   else if($user['ROLE']==15)
															   {
                                                               ?>
															   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (CLUSTER MANAGER)"; ?></option>
															   <?php
															   }
															     else if($user['ROLE']==21)
															   {
                                                               ?>
															   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (SALES MANAGER)"; ?></option>
															   <?php
															   }
    														   ?>
															 
															<?php 
															}
															?>
														</select>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label >Select Category</label>
														<select class="form-control" id="category_by_selected_user" onchange="Function_two();">
															<option>Select</option>
													
														</select>
												</div>
											</div>
											<div class="col-sm-4">
											    <div class="form-group">
													<label >Assigne to</label>
													<?php 									
													$get_all_users_assigne_from_list=(json_decode(json_encode($get_all_users_assigne_from_list),true));
													
													?>
														<select class="form-control" name="assign_from" id="assign_from">
															<option>Select</option>
																
															<?php
															foreach ($get_all_users_assigne_from_list as $user)
															{ ?>
															   <?php
															   if($user['ROLE']==2)
															   {
                                                               ?>
															    <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (DSA)"; ?></option>
															   <?php
															   }
															   else if($user['ROLE']==6)
															   {
                                                               ?>
															  <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (CSR)"; ?></option>
															   <?php
															   }
															   else if($user['ROLE']==7)
															   {
                                                               ?>
															   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (MANAGER)"; ?></option>
															   <?php
															   }
															   else if($user['ROLE']==13)
															   {
                                                               ?>
															   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (BRANCH MANAGER)"; ?></option>
															   <?php
															   }
															   else if($user['ROLE']==14)
															   {
                                                               ?>
															   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (RELATIONSHIP OFFICER)"; ?></option>
															   <?php
															   }
															   else if($user['ROLE']==15)
															   {
                                                               ?>
															   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (CLUSTER MANAGER)"; ?></option>
															   <?php
															   }
															     else if($user['ROLE']==21)
															   {
                                                               ?>
															   <option value="<?php echo $user['UNIQUE_CODE'];?>"><?php echo $user['FN']." ".$user['LN']." (SALES MANAGER)"; ?></option>
															   <?php
															   }
    														   ?>
															 
															<?php 
															}
															?>
														</select>
												</div>
												</div>
												
												<div class="col-sm-2" style="margin-bottom: 15px;">
											
													<button type="submit" value="submit" name="submit" class="btn btn-info" style="margin-top:14%;" >ASSIGNE</button>
											
											    </div>
											</div>
															
										</div>
									</div>
									<div class="table-responsive">
									<div class="col-sm-12">
									<table>
									  <thead>
										<tr>
										  <th>NAME</th>
										  <th>EMAIL</th>
										  <th>MOBILE</th>
										   <th>ROLE</th>
										  <th><input type="checkbox" id="select_all" onclick="Function_three()"> &nbsp;&nbsp;SELECT ALL</th>
										</tr>
									  </thead>
									  <tbody id="my_table_body">
 
									  </tbody>
 
									</table>
						
									</form>
									</div>
								</div>
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
function Function_one() {
 var find_role_for_assign_from_user = document.getElementById('get_all_users_assigne_from_list').value;
 var selectobject_original = document.getElementById("category_by_selected_user");
 document.getElementById("category_by_selected_user").innerHTML = null;
 var x = document.getElementById("category_by_selected_user");
									$.ajax({
												type:'POST',
												url:'<?php echo base_url("index.php/admin/find_role_for_user"); ?>',
											    data:{
													'find_role_for_assign_from_user':find_role_for_assign_from_user,
													},
												success:function(data)
												{
													var obj =JSON.parse(data);
													if(obj.msg=='success')
													{
														if(obj.ROLE == 2)
														{
															var option0 = document.createElement("option");
															option0.text = "Select"; option0.value = ""; x.add(option0);
															
											
															var option1 = document.createElement("option");
															option1.text = "CUSTOMER"; option1.value = "1"; x.add(option1);
															var option2 = document.createElement("option");
															option2.text = "CONNECTOR"; option2.value = "4"; x.add(option2);
															var option3 = document.createElement("option");
															option3.text = "CSR"; option3.value = "6"; x.add(option3);
															var option4 = document.createElement("option");
															option4.text = "MANAGER"; option4.value = "7"; x.add(option4);
															var option5 = document.createElement("option");
															option5.text = "ALL OF THE ABOVE"; option5.value = "All"; x.add(option5);
														}
														else if(obj.ROLE == 14)
														{
															var option0 = document.createElement("option");
															option0.text = "Select"; option0.value = ""; x.add(option0);
															var option1 = document.createElement("option");
															option1.text = "CUSTOMER"; option1.value = "1"; x.add(option1);
															var option2 = document.createElement("option");
															option2.text = "DSA"; option2.value = "2"; x.add(option2);
															var option3 = document.createElement("option");
															option3.text = "CONNECTOR"; option3.value = "4"; x.add(option3);
															var option5 = document.createElement("option");
															option5.text = "ALL OF THE ABOVE"; option5.value = "All"; x.add(option5);
													
														}
														else if(obj.ROLE == 13)
														{
															var option0 = document.createElement("option");
															option0.text = "Select"; option0.value = ""; x.add(option0);
															var option1 = document.createElement("option");
															option1.text = "CUSTOMER"; option1.value = "1"; x.add(option1);
															var option2 = document.createElement("option");
															option2.text = "DSA"; option2.value = "2"; x.add(option2);
															var option3 = document.createElement("option");
															option3.text = "CONNECTOR"; option3.value = "4"; x.add(option3);
															var option4 = document.createElement("option");
															option4.text = "RELATIONSHIP OFFICER"; option4.value = "14"; x.add(option4);
															var option5 = document.createElement("option");
															option5.text = "ALL OF THE ABOVE"; option5.value = "All"; x.add(option5);
														}
														else if(obj.ROLE == 21)
														{
															var option0 = document.createElement("option");
															option0.text = "Select"; option0.value = ""; x.add(option0);
															var option1 = document.createElement("option");
															option1.text = "CUSTOMER"; option1.value = "1"; x.add(option1);
															var option2 = document.createElement("option");
															option2.text = "DSA"; option2.value = "2"; x.add(option2);
															var option3 = document.createElement("option");
															option3.text = "CONNECTOR"; option3.value = "4"; x.add(option3);
															var option4 = document.createElement("option");
															option4.text = "RELATIONSHIP OFFICER"; option4.value = "14"; x.add(option4);
															var option5 = document.createElement("option");
															option5.text = "ALL OF THE ABOVE"; option5.value = "All"; x.add(option5);
														}
														else if(obj.ROLE == 15)
														{   var option0 = document.createElement("option");
															option0.text = "Select"; option0.value = ""; x.add(option0);
															var option1 = document.createElement("option");
															option1.text = "CUSTOMER"; option1.value = "1"; x.add(option1);
															var option2 = document.createElement("option");
															option2.text = "DSA"; option2.value = "2"; x.add(option2);
															var option3 = document.createElement("option");
															option3.text = "CONNECTOR"; option3.value = "4"; x.add(option3);
															var option4 = document.createElement("option");
															option4.text = "RELATIONSHIP OFFICER"; option4.value = "14"; x.add(option4);
															var option5 = document.createElement("option");
															option5.text = "BRANCH MANAGER"; option5.value = "13"; x.add(option5);
															var option6 = document.createElement("option");
															option6.text = "ALL OF THE ABOVE"; option6.value = "All"; x.add(option6);

														}
														else if(obj.ROLE == 16)
														{
															var option0 = document.createElement("option");
															option0.text = "Select"; option0.value = ""; x.add(option0);
															var option1 = document.createElement("option");
															option1.text = "CUSTOMER"; option1.value = "1"; x.add(option1);
															var option2 = document.createElement("option");
															option2.text = "DSA"; option2.value = "2"; x.add(option2);
															var option3 = document.createElement("option");
															option3.text = "CONNECTOR"; option3.value = "4"; x.add(option3);
															var option4 = document.createElement("option");
															option4.text = "RELATIONSHIP OFFICER"; option4.value = "14"; x.add(option4);
															var option5 = document.createElement("option");
															option5.text = "BRANCH MANAGER"; option5.value = "13"; x.add(option5);
															var option6 = document.createElement("option");
															option6.text = "CLUSTER MANAGER"; option6.value = "15"; x.add(option6);
															var option7 = document.createElement("option");
															option7.text = "ALL OF THE ABOVE"; option7.value = "All"; x.add(option7);

														}
														else if(obj.ROLE == 17)
														{
															var option0 = document.createElement("option");
															option0.text = "Select"; option0.value = ""; x.add(option0);
															var option1 = document.createElement("option");
															option1.text = "CUSTOMER"; option1.value = "1"; x.add(option1);
															var option2 = document.createElement("option");
															option2.text = "DSA"; option2.value = "2"; x.add(option2);
															var option3 = document.createElement("option");
															option3.text = "CONNECTOR"; option3.value = "4"; x.add(option3);
															var option4 = document.createElement("option");
															option4.text = "RELATIONSHIP OFFICER"; option4.value = "14"; x.add(option4);
															var option5 = document.createElement("option");
															option5.text = "BRANCH MANAGER"; option5.value = "13"; x.add(option5);
															var option6 = document.createElement("option");
															option6.text = "CLUSTER MANAGER"; option6.value = "15"; x.add(option6);
															var option7 = document.createElement("option");
															option7.text = "AREA MANAGER"; option7.value = "16"; x.add(option7);
															var option8 = document.createElement("option");
															option8.text = "ALL OF THE ABOVE"; option8.value = "All"; x.add(option8);

														}
														else if(obj.ROLE == 6 || obj.ROLE == 7)
														{
															var option0 = document.createElement("option");
															option0.text = "Select"; option0.value = ""; x.add(option0);
															var option1 = document.createElement("option");
															option1.text = "CUSTOMER"; option1.value = "1"; x.add(option1);
															var option2 = document.createElement("option");
															var option2 = document.createElement("option");
															option2.text = "DSA"; option2.value = "2"; x.add(option2);
															var option3 = document.createElement("option");
															option3.text = "CONNECTOR"; option3.value = "4"; x.add(option3);
															var option5 = document.createElement("option");
															option5.text = "ALL OF THE ABOVE"; option5.value = "All"; x.add(option5);
															
														}
					              					}
						                        }
                                    });


							
}

function Function_one_copy() {
 var find_role_for_assign_from_user = document.getElementById('get_all_users_assigne_from_list_copy').value;
 var selectobject_original = document.getElementById("category_by_selected_user_copy");
 document.getElementById("category_by_selected_user_copy").innerHTML = null;
 var x = document.getElementById("category_by_selected_user_copy");
									$.ajax({
												type:'POST',
												url:'<?php echo base_url("index.php/admin/find_role_for_user"); ?>',
											    data:{
													'find_role_for_assign_from_user':find_role_for_assign_from_user,
													},
												success:function(data)
												{
													var obj =JSON.parse(data);
													if(obj.msg=='success')
													{
														
															var option0 = document.createElement("option");
															option0.text = "Select"; option0.value = ""; x.add(option0);
															var option1 = document.createElement("option");
															option1.text = "DSA"; option1.value = "2"; x.add(option1);
															var option2 = document.createElement("option");
															option2.text = "CONNECTOR"; option2.value = "4"; x.add(option2);
															var option3 = document.createElement("option");
															option3.text = "CSR"; option3.value = "6"; x.add(option3);
															var option4 = document.createElement("option");
															option4.text = "MANAGER"; option4.value = "7"; x.add(option4);
															var option5 = document.createElement("option");
															option5.text = "RELATIONSHIP OFFICER"; option5.value = "14"; x.add(option5);
															var option6 = document.createElement("option");
															option6.text = "BRANCH MANAGER"; option6.value = "13"; x.add(option6);
															var option7 = document.createElement("option");
															option7.text = "CLUSTER MANAGER"; option7.value = "15"; x.add(option7);
															var option8 = document.createElement("option");
															option8.text = "AREA MANAGER"; option8.value = "16"; x.add(option8);
															var option9 = document.createElement("option");
															option9.text = "REGIONAL MANAGER"; option9.value = "17"; x.add(option9);
															var option10 = document.createElement("option");
															option9.text = "SALES MANAGER"; option9.value = "21"; x.add(option10);
														
													}
						                        }
                                    });


							
}
</script>

<script>
function Function_two() {

	    document.getElementById("my_table_body").innerHTML = '';
		var User_ID = document.getElementById('get_all_users_assigne_from_list').value;
		var ROLE_for_category = document.getElementById("category_by_selected_user").value;

		$.ajax({
												type:'POST',
												url:'<?php echo base_url("index.php/admin/find_entries_for_assigne_process"); ?>',
											    data:{
													'User_ID':User_ID,
													'ROLE_for_category':ROLE_for_category,
													},
												success:function(data)
												{
													var obj =JSON.parse(data);
													if(obj.msg=='success')
													{
														if(obj.Display_users != '')
														{
														     $.each(obj.Display_users, function (index, value) {
														        // alert(value.FN);
																$('#my_table_body').append('<tr><td><input type="text" class="form-control" name="name[]" value="'+value.FN+' '+value.LN+'"></td><td><input type="email" class="form-control" name="email[]" value="'+value.EMAIL+'"></td><td><input type="number" class="form-control" name="mobile[]" value="'+value.MOBILE+'"></td>'+(value.ROLE =='2' ? '<td>DSA</td>': value.ROLE =='4' ?'<td >CONNECTOR</td>': value.ROLE =='1' ?'<td>CUSTOMER</td>': value.ROLE =='14' ?'<td>RELATIONSHIP OFFICER</td>': value.ROLE =='13' ?'<td>BRANCH MANAGER</td>': value.ROLE =='6' ?'<td>CSR</td>' :value.ROLE =='7' ?'<td>MANAGER</td>' : value.ROLE =='15' ?'<td>CLUSTER MANAGER</td>' : value.ROLE =='16' ? '<td>AREA MANAGER</td>' : value.ROLE =='17' ?'<td>REGIONAL MANAGER</td>':'<td></td>')+'<td><input type="checkbox" name="check_box" class="mycheck" value="'+value.UNIQUE_CODE+'"></td></tr>');
															 });
														}
														else
														{
																$('#my_table_body').append('<tr><td style="color:red;">DATA NOT FOUND</td><td></td><td></td><td></td></tr>');
															 
														}
														
					              					}
						                        }
                                    });
		
}

  $("#Assign_users").submit(function(e) {
	   e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
	   var assigne_from = $("#get_all_users_assigne_from_list option:selected").val(); //
	   var category = $("#category_by_selected_user option:selected").val();
	   var assigne_to = $("#assign_from option:selected").val();
	   
	  // alert(get_all_users_assigne_from_list);
	  // alert(category_by_selected_user);
	  // alert(assign_from);

	   var arr = [];
						$.each($("input[name='check_box']:checked"), function(){
								  arr.push($(this).val());
							  });
	   if(arr == '')
	   {
		   //alert("Please select check box");
		   swal("Warning!", "Please select check box", "warning");
		   return false;
	   }

	   if(assigne_from == assigne_to )
	   {
		   // alert("Assigne from and Assigne To should be different Users");
			swal("Warning!", "Assigne from and Assigne To should be different Users", "warning");
		   return false;
	   }

	   $.ajax({
				type:'POST',
				url:'<?php echo base_url("index.php/admin/submit_assigne_users_data"); ?>',
				data:{
						'assigne_from':assigne_from,
						'category':category,
						'assigne_to':assigne_to,
						'assign_user_array':arr
					},
					success:function(data)
							{
								var obj =JSON.parse(data);
								if(obj.msg=='success')
									{
										//alert("success");
										swal("success!", "Selected users are assigne successfully", "success").then( function() { window.location.replace("/finaleap_finserv/dsa/dsa/index.php/admin/Manage_user_access"); });
									}
						    }
               });
	   
	  
  });

  $("#convert_account").submit(function(e) {
	   e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
	   var User_ID = $("#get_all_users_assigne_from_list_copy option:selected").val(); //
	   var Convert_to_role = $("#category_by_selected_user_copy option:selected").val();
		
	  // alert(assign_from);

	 
	   $.ajax({
				type:'POST',
				url:'<?php echo base_url("index.php/admin/submit_convert_account_data"); ?>',
				data:{
						'User_ID':User_ID,
						'Convert_to_role':Convert_to_role,
						
					},
					success:function(data)
							{
								var obj =JSON.parse(data);
								if(obj.msg=='success')
									{
										//alert("success");
										swal("success!", "Account converted successfully", "success").then( function() { window.location.replace("/dsa/dsa/index.php/admin/Manage_user_access"); });
									}
						    }
               });
	   
	  
  });

  
  $("#disable_account").submit(function(e) {
	   e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
	   var User_ID = $("#get_user_for_disable_account option:selected").val(); //
	   //  alert(User_ID);
	   $.ajax({
				type:'POST',
				url:'<?php echo base_url("index.php/admin/submit_account_disable_data"); ?>',
				data:{
						'User_ID':User_ID,
					},
					success:function(data)
							{
								var obj =JSON.parse(data);
								if(obj.msg=='success')
									{
										//alert("success");
										swal("success!", "Account Disabled successfully", "success").then( function() { window.location.replace("/dsa/dsa/index.php/admin/Manage_user_access"); });
									}
						    }
               });
	   
	  
  });
</script>
<script>

function Function_three() 
   {
	
		if ($('#select_all').is(':checked')) 
		{
			$(".mycheck").prop( "checked", true );
		}
		else
		{
			$(".mycheck").prop( "checked", false );
		}
	}

	function view_disabled_accounts(ele)
	{
		//alert("hiii");
		var srcElement = document.getElementById(ele);
         	if (srcElement != null) {
         		if (srcElement.style.display == "block") {
         			srcElement.style.display = 'none';
         		}
         		else {
         			srcElement.style.display = 'block';
				
                 	$.ajax({
												type:'POST',
												url:'<?php echo base_url("index.php/admin/find_disable_user"); ?>',
											    data:{
													
												},
												success:function(data)
												{
						                           	var obj =JSON.parse(data);
													if(obj.msg=='success')
													{
														if(obj.Display_users != '')
														{
														     $.each(obj.Display_users, function (index, value) {
														        // alert(value.FN);
																$('#disabled_users_date').append('<tr><td><input type="text" class="form-control" name="name[]" value="'+value.FN+' '+value.LN+'"></td><td><input type="email" class="form-control" name="email[]" value="'+value.EMAIL+'"></td><td><input type="number" class="form-control" name="mobile[]" value="'+value.MOBILE+'"></td><td><button type="button" class="btn btn-info" id="'+value.UNIQUE_CODE+'" style="margin-top:14%;" onclick="disable_account_for(this)">Enable</button></td></tr>');
															 });
														}
														else
														{
																$('#disabled_users_date').append('<tr><td style="color:red;">DATA NOT FOUND</td><td></td><td></td><td></td></tr>');
															 
														}
														
					              					}
						                        }
                                    });


         		}
         		return false;
         	}


	}

	function disable_account_for(e)
	{
		//alert(e.id);
			   $.ajax({
				type:'POST',
				url:'<?php echo base_url("index.php/admin/enable_data"); ?>',
				data:{
						'User_ID':e.id,
					},
					success:function(data)
							{
								var obj =JSON.parse(data);
								if(obj.msg=='success')
									{
									
										swal("success!", "Account Enabled successfully", "success").then( function() { window.location.replace("/dsa/dsa/index.php/admin/Manage_user_access"); });
									}
						    }
               });
	}
</script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>

<script src="<?php echo base_url(); ?>js/main.js"></script>

</body>
</html>
