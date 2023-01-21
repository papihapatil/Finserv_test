<style>
.tablink_ {
 
  color: blue;
  float: left;
  border: 1px solid gray;
  outline: none;
  margin:2px;
  padding: 14px 16px;
  font-size: 17px;
 
}

.active, .tablink_:hover {
    border: 2px solid blue;
}


</style>
<?php
    $message = $this->session->userdata('result');
	
    if (isset($message)) {
		if($message==1)
		{
        echo '<script> swal("success!", "Send To Legal successfully", "success");</script>';
         //$this->session->unset_userdata('result');
		  unset($_SESSION['result']);
		}
		else
		{
			 echo '<script> swal("warning!", "Something get wrong", "warning");</script>';
             $this->session->unset_userdata('result');	
		}
    }

    ?>
	<?php
    $message1 = $this->session->userdata('technical');
	
    if (isset($message1)) {
		if($message1==1)
		{
        echo '<script> swal("success!", "Send To Technical successfully", "success");</script>';
         //$this->session->unset_userdata('result');
		  unset($_SESSION['technical']);
		}
		else
		{
			 echo '<script> swal("warning!", "Something get wrong", "warning");</script>';
             $this->session->unset_userdata('technical');	
		}
    }

    ?>
	<?php
    $message2 = $this->session->userdata('delelet_doc');
	
    if (isset($message2)) {
		if($message2==1)
		{
        echo '<script> swal("success!", "Deleted Document successfully", "success");</script>';
         //$this->session->unset_userdata('result');
		  unset($_SESSION['delelet_doc']);
		}
		else
		{
			 echo '<script> swal("warning!", "Something get wrong", "warning");</script>';
             $this->session->unset_userdata('delelet_doc');	
		}
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
                                    
									    <div class="col-sm-2">
										</div>
										<div class="col-sm-2 text-center tablink_" onclick="openPage('Legal1', this,'4')" id="4" >
											<i class='fa fa-user-o' style="font-size:38px; "></i></br>Legal
										</div>
										<div class="col-sm-2 text-center tablink_ " onclick="openPage('Technical1', this,'1')" id="1">
     										<i class='fa fa-user-o' style="font-size:38px;"></i></br>Technical
										</div>
										<div class="col-sm-2 text-center tablink_" onclick="openPage('RCU1', this ,'2')" id="2">
										  <i class='fa fa-user-o' style="font-size:38px;"></i></br>RCU
										</div>
                                        <div class="col-sm-2 text-center tablink_" onclick="openPage('FI1', this,'3')" id="3">										
											<i class='fa fa-user-o' style="font-size:38px;"></i></br>FI
										</div>
										
										 <div class="col-sm-"2>
										</div>

									
										
								</div>
								
							   
						</div>
						</div>
						<div class="card tabcontent"  id="Legal1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
										
											<div class="container">
												<div class="text-center">
												<h3>Send Customer To Legal Process</h3>
												</div>
												
												<br>
												</br>
												<Form action="<?php echo base_url('index.php/Credit_manager_user/do_upload_Legal_doc');?>" method="post" enctype="multipart/form-data">
												<div class="row">
												   <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
													<input type="number" name="form_id" value="4" hidden />
													<input type="text" name="send_to" value="legal" hidden />
													<input type="text" class="form-control" id="Application_Id" name="Application_Id" value="<?php if(!empty($cust_info)){ echo $cust_info->Application_id;} ?>" readonly hidden>
												    <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Select Document To upload</label>
															<select required class="form-control" name="Legal_doc" id="Legal_doc"  > 
															<option value="">Select Documents</option>
																	<?php if (isset($Doc_list)){ foreach($Doc_list as $doc){ ?>
																	<option value="<?php  echo $doc->Doc_name; ?>"><?php  echo  $doc->Doc_name; ?></option>
																	<?php }  }?>	
																
															</select> 
														 
													</div> 
												</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												        
															<div style=" margin-top: 8px;" class="col">
															  <label style="font-size: 12px;" for='file-upload' class='custom-file-upload'>
																				<i class='fa fa-cloud-upload'></i> Select Document<span style="color:red; font-size:10px;"> You can select multiple file at a time.</span>
																			</label>
																			<input id='file-upload' type='file' name='userfile[]'  multiple="multiple" required  onchange="Filevalidation()" />
																			
																 <button type="submit" name="upload" class="btn btn-primary">Upload</button>
															</div>  
                                                       
													   
													</div>	
												</div>
												</form>
												<div class="row" style="margin-top: 8px;">
												<?php  foreach($documents as $row){?>
												
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
														<div class="row " style="border: 1px solid #edeff1; margin-left:13px; margin-right:13px">
															<div class="col-sm-10"><a href="<?php echo base_url($row->path); ?>" target="_blank">  <i class="fa fa-file-text" style="color:green" aria-hidden="true"></i> &nbsp; <label for="email" style="font-size: 13px; color: black; font-weight: bold;">
																				<?php echo strtoupper($row->Doc_name); ?>
																			</label></a></div>
															<div class="col-sm-1"><a href="<?php echo base_url($row->path); ?>" target="_blank"> <i class="fa fa-eye" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>
															</div>
															<div class="col-sm-1"> 	
															<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>
																				
															</div>
																	
																						
																					
																				
														</div>
													
													</div>
			
													
										        <?php } ?>
												</div>
												<Form action="<?php echo base_url('index.php/Credit_manager_user/do_upload_Legal_doc');?>" method="post" enctype="multipart/form-data">
												<div class="row">
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												      <input type="number" name="form_id" value="4" hidden />
													  <input type="text" name="send_to" value="legal" hidden />
														<div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Application ID :</label>
															<input type="text" class="form-control" id="Application_Id" name="Application_Id" value="<?php if(!empty($cust_info)){ echo $cust_info->Application_id;} ?>" readonly>
															
														</div>  

													</div>  
												
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Name:</label>
															<input type="text"  class="form-control"  id="name" name="name" value="<?php if(!empty($cust_info)){ echo $cust_info->FN.' '.$cust_info->LN;} ?>" readonly>
														</div>  
													</div> 	
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Loan Type:</label>
															<input type="text"  class="form-control"  id="Loan_type" name="Loan_type" value="<?php if(!empty($cust_info)){ echo $cust_info->loan_type;} ?>" readonly>
														</div>  
													</div> 
                                                  
												</div>
												<div class="row">
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Collateral Address</label>
															<input maxlength="30" minlength="3" required style="margin-top: 1px;" placeholder="Address Line 1 *" class="form-control" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($cust_info))echo $cust_info->PROP_ADD_LINE_1;?>"readonly>
															<input maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 2 " class="form-control" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($cust_info))echo $cust_info->PROP_ADD_LINE_2;?>"readonly>
															<input maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 3 " class="form-control" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($cust_info))echo $cust_info->PROP_ADD_LINE_3;?>"readonly>
														</div>  
												</div> 	
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Landmark</label>
															<input maxlength="30" required placeholder="Enter landmark *" class="form-control" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($cust_info))echo $cust_info->PROP_ADD_LANDMARK;?>"readonly>
														</div>  
														 <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> State </label>
															<input maxlength="30" required placeholder="Enter landmark *" class="form-control" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($cust_info))echo $cust_info->PROP_ADD_STATE;?>"readonly>
														</div>  
												</div> 
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Pin-code</label>
															<input required placeholder="Enter pincode *" class="form-control" type="number" minlength="6" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($cust_info))echo $cust_info->PROP_ADD_PINCODE;?>"readonly>

														</div>  
														<div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> District </label>
															<input required placeholder="Enter pincode *" class="form-control" type="text" minlength="6" name="resi_District" id="" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($cust_info))echo $cust_info->PROP_ADD_DISTRICT;?>"readonly>

														</div>  
												</div> 												
											    </div>
												<div class="row">
												 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Property Type </label>
															<select required class="form-control" name="resi_sel_property_type" disabled > 
															  <option value="">Select Property Type *</option>
															  <option value="Corporate Provided" <?php if ($cust_info->PROP_ADD_PROP_TYPE == "Corporate Provided") echo ' selected="selected"'; ?>>Corporate Provided</option>
															  <option value="Mortgaged" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
															  <option value="Owned" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
															  <option value="Rented" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
															  <option value="Shared Accomodation" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accommodation</option>
															  <option value="Paying Guest" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
															  <option value="Others" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
															</select>
															</div>  
												</div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												    <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Select Bank</label>
															<select class="form-control" aria-label="Default select example" name="bank_name" id="bank_name"  required>
																	<option value="">Select bank</option>
																	<?php if (isset($banks)){ foreach($banks as $bank){ ?>
																
																	<option value="<?php  echo $bank->id; ?>"<?php if($cust_info->bank_id==$bank->id){echo 'selected';} ?>><?php  echo $bank->Bank_name; ?></option>
																	<?php }  }?>
																															
															</select>

															<input type="text" id="bank_name_1" name="bank_name_1" hidden >
													</div>
												</div>	
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
													 <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Assign To Legal</label>
													<?php if(!empty($Legal_docs)){if($Legal_docs->Legal_Status!='')
													{?>
													<select required class="form-control select" name="Legal" id="Legal" required> 
													<option value="<?php if(!empty($Legal_docs)){ echo $Legal_docs->Legal_id; }?>" selected ><?php if(!empty($cust_info))echo $Legal_docs->Legal_name;?></option>
													</select>
													  <input type="text" id="Legal_name" name="Legal_name"  value="<?php if(!empty($cust_info))echo $cust_info->Legal_name; ?>" hidden >
													<?php }else{?>
														<select required class="form-control" name="Legal" id="Legal" required > 
													<option> select Legal </option>
													
													</select>
													<?php }} else{?>
                                                      <input type="text" id="Legal_name" name="Legal_name" hidden >
													  <select required class="form-control" name="Legal" id="Legal" required > 
													<option> select Legal </option>
													
													</select>
													<?php } ?>
													
													
														
													
													<input type="text" id="User_name" name="User_name" value="<?php echo $username; ?>"  hidden >
                                                    <input type="text" id="Credit_id" name="Credit_id" value="<?php echo $uid; ?>"  hidden >
														
													<input type="text" id="id" name="id" value="<?php echo $cust_info->UNIQUE_CODE; ?>" hidden >
													</div>
													
												</div>
												
												
												
												
													
													


												</div>
												<div class="row">
												    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												    <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Comment (if any)</label>
														<textarea name="comment" class="form-control" id="comment_by_finaleap"> </textarea>
														 
													</div> 
													</div>
												</div>
												<?php if(!empty($Legal_docs)){if($Legal_docs->Legal_Status=='Revert From Legal'){?>
													<div class="row">
														<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
														<div style=" margin-top: 8px;" class="col">
															 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Legal Comment </label>
															<textarea name="comment" class="form-control"><?php echo $Legal_docs->Legal_comment; ?> </textarea>
															 
														</div> 
														</div>
													</div>
												<?php }} ?>
												
												
												
												
									
												
												
												
												
												
												</br>
												
												<div class="text-center">
												<?php if(!empty($Legal_docs)){if($Legal_docs->Legal_Status=='Revert From Legal')
													{ ?>
												     <button type="submit" name="revert_action" class="btn btn-primary" >Revert Action</button>
												  
												<?php }
												else if($Legal_docs->Legal_Status=='Document Received From Legal')
														{?>
															<button type="submit" name="revert_to_legal" class="btn btn-primary" id='revert_to_legal' >Revert To Legal</button>
															<button type="submit" name="Accept" class="btn btn-primary" id='Accept' >Accept</button>
													<?php	}
														else{ ?>
												   <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
												   <?php }  }else{ ?>
												   <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
												   <?php }  ?>
													
												</div>
											
												
											</form>
										
												
												
												
											</div>
										
									</div>
								</div>
							</div>
							   
						</div>
						<div class="card tabcontent"  id="Technical1">
						<div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
										
											<div class="container">
												<div class="text-center">
												<h3>Send Customer To Technical Process</h3>
												</div>
												
												<br>
												</br>
												<Form action="<?php echo base_url('index.php/Technical/do_upload_Technical_doc');?>" method="post" enctype="multipart/form-data">
												<div class="row">
												   <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
													<input type="number" name="form_id" value="1" hidden />
													<input type="text" name="send_to" value="Technical" hidden />
													<input type="text" class="form-control" id="Application_Id" name="Application_Id" value="<?php if(!empty($cust_info)){ echo $cust_info->Application_id;} ?>" readonly hidden>
												    <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Select Document To upload</label>
															<select required class="form-control" name="Legal_doc" id="Legal_doc"  > 
															<option value="">Select Documents</option>
																	<?php if (isset($Doc_list)){ foreach($Doc_list as $doc){ ?>
																	<option value="<?php  echo $doc->Doc_name; ?>"><?php  echo  $doc->Doc_name; ?></option>
																	<?php }  }?>	
																
															</select> 
														 
													</div> 
												</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												        
															<div style=" margin-top: 8px;" class="col">
															  <label style="font-size: 12px;" for='file-upload' class='custom-file-upload'>
																				<i class='fa fa-cloud-upload'></i> Select Document<span style="color:red; font-size:10px;"> You can select multiple file at a time.</span>
																			</label>
																			<input id='file-upload' type='file' name='userfile[]'  multiple="multiple" required  onchange="Filevalidation()" />
																			
																 <button type="submit" name="upload" class="btn btn-primary">Upload</button>
															</div>  
                                                       
													   
													</div>	
												</div>
												</form>
												<div class="row" style="margin-top: 8px;">
												<?php  foreach($Technical_documents as $row){?>
												
												
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
														<div class="row " style="border: 1px solid #edeff1; margin-left:13px; margin-right:13px">
															<div class="col-sm-10"><a href="<?php echo base_url($row->path); ?>" target="_blank">  <i class="fa fa-file-text" style="color:green" aria-hidden="true"></i> &nbsp; <label for="email" style="font-size: 13px; color: black; font-weight: bold;">
																				<?php echo strtoupper($row->Doc_name); ?>
																			</label></a></div>
															<div class="col-sm-1"><a href="<?php echo base_url($row->path); ?>" target="_blank"> <i class="fa fa-eye" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>
															</div>
															<div class="col-sm-1"> 	
															<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>
																				
															</div>
																	
																						
																					
																				
														</div>
													
													</div>
			
													
										        <?php } ?>
												</div>
												<Form action="<?php echo base_url('index.php/Technical/do_upload_Technical_doc');?>" method="post" enctype="multipart/form-data">
												<div class="row">
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  <input type="number" name="form_id" value="1" hidden />
												   <input type="text" name="send_to" value="Technical" hidden />
														<div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Application ID :</label>
															<input type="text" class="form-control" id="Application_Id" name="Application_Id" value="<?php if(!empty($cust_info)){ echo $cust_info->Application_id;} ?>" readonly>
															
														</div>  

													</div>  
												
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Name:</label>
															<input type="text"  class="form-control"  id="name" name="name" value="<?php if(!empty($cust_info)){ echo $cust_info->FN.' '.$cust_info->LN;} ?>" readonly>
														</div>  
													</div> 	
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Loan Type:</label>
															<input type="text"  class="form-control"  id="Loan_type" name="Loan_type" value="<?php if(!empty($cust_info)){ echo $cust_info->loan_type;} ?>" readonly>
														</div>  
													</div> 
                                                  
												</div>
												<div class="row">
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Collateral Address</label>
															<input maxlength="30" minlength="3" required style="margin-top: 1px;" placeholder="Address Line 1 *" class="form-control" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($cust_info))echo $cust_info->PROP_ADD_LINE_1;?>"readonly>
															<input maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 2 " class="form-control" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($cust_info))echo $cust_info->PROP_ADD_LINE_2;?>"readonly>
															<input maxlength="30" minlength="3" style="margin-top: 8px;" placeholder="Address Line 3 " class="form-control" type="text" id="resi_add_3" name="resi_add_3" value="<?php if(!empty($cust_info))echo $cust_info->PROP_ADD_LINE_3;?>"readonly>
														</div>  
												</div> 	
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Landmark</label>
															<input maxlength="30" required placeholder="Enter landmark *" class="form-control" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($cust_info))echo $cust_info->PROP_ADD_LANDMARK;?>"readonly>
														</div>  
														 <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> State </label>
															<input maxlength="30" required placeholder="Enter landmark *" class="form-control" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($cust_info))echo $cust_info->PROP_ADD_STATE;?>"readonly>
														</div>  
												</div> 
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Pin-code</label>
															<input required placeholder="Enter pincode *" class="form-control" type="number" minlength="6" name="resi_pincode" id="resi_pincode" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($cust_info))echo $cust_info->PROP_ADD_PINCODE;?>"readonly>

														</div>  
														<div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> District </label>
															<input required placeholder="Enter pincode *" class="form-control" type="text" minlength="6" name="resi_District" id="" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($cust_info))echo $cust_info->PROP_ADD_DISTRICT;?>"readonly>

														</div>  
												</div> 												
											    </div>
												<div class="row">
												 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Property Type </label>
															<select required class="form-control" name="resi_sel_property_type" > 
															  <option value="">Select Property Type *</option>
															  <option value="Corporate Provided" <?php if ($cust_info->PROP_ADD_PROP_TYPE == "Corporate Provided") echo ' selected="selected"'; ?>>Corporate Provided</option>
															  <option value="Mortgaged" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
															  <option value="Owned" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
															  <option value="Rented" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
															  <option value="Shared Accomodation" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accommodation</option>
															  <option value="Paying Guest" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
															  <option value="Others" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
															</select>
															</div>  
												</div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												    <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Select Bank</label>
															<select class="form-control" aria-label="Default select example" name="bank_name" id="bank_name_technical"  >
																	<option value="">Select bank</option>
																	<?php if (isset($banks)){ foreach($banks as $bank){ ?>
																	<option value="<?php  echo $bank->id; ?>"<?php if($cust_info->bank_id==$bank->id){echo 'selected';} ?>><?php  echo $bank->Bank_name; ?></option>
																	<?php }  }?>
																															
															</select>

															<input type="text" id="bank_name_1" name="bank_name_1" hidden >
													</div>
												</div>	
												
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
													 <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Assign To Technical</label>
													
												
													  <?php if(!empty($Legal_docs)){if($Legal_docs->Technical_id!='')
													{?>
														<select required class="form-control" name="Technical" id="Technicalname" required > 
													<option value="<?php if(!empty($Legal_docs)){ echo $Legal_docs->Technical_id; }?>" selected ><?php if(!empty($cust_info))echo $Legal_docs->Technical_name;?></option>
													</select>
													  <input type="text" id="Technical_name1" name="Technical_name"  value="<?php if(!empty($cust_info))echo $cust_info->Technical_name; ?>" hidden  >
													<?php }else{?>
														
														 <select required class="form-control" name="Technical" id="Technicalname" required > 
												   <option> select Technical </option>
												   
												   </select>
												   <input type="text" id="Technical_name1" name="Technical_name" hidden >
													<?php }} else{?>
                                                    
													  	<select required class="form-control" name="Technical" id="Technicalname"  required> 
													<option> select Technical </option>
													
													</select>
													<input type="text" id="Technical_name1" name="Technical_name"  hidden>
													<?php } ?>
													
													
														
													
													<input type="text" id="User_name" name="User_name" value="<?php echo $username; ?>"  hidden >
                                                    <input type="text" id="Credit_id" name="Credit_id" value="<?php echo $uid; ?>"  hidden >
														
													<input type="text" id="id" name="id" value="<?php echo $cust_info->UNIQUE_CODE; ?>" hidden >
													</div>
													
												</div>
												<!-- 
												
												--->
												
												
												
													
													


												</div>
												<div class="row">
												    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												    <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Comment (if any)</label>
														<textarea name="comment" class="form-control" id="comment_by_finaleap_to_tech"> </textarea>
														 
													</div> 
													</div>
												</div>
												
											
												</br>
												
												<div class="text-center">
												<?php if(!empty($Legal_docs)){if($Legal_docs->Technical_Status=='Revert From Technical')
													{ ?>
												     <button type="submit" name="revert_action" class="btn btn-primary" >Revert Action</button>
												  
												<?php }
												else if($Legal_docs->Technical_Status=='Document Received From Technical')
														{?>
															<button type="submit" name="revert_to_technical" class="btn btn-primary" id='revert_to_technical' >Revert To Technical</button>
															<button type="submit" name="Accept" class="btn btn-primary" id='Accept' >Accept</button>
													<?php	}
														else{ ?>
												   <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
												   <?php }  }else{ ?>
												   <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
												   <?php }  ?>
													
												</div>
											
												
											</form>
												
												
											</div>
										
									</div>
								</div>
							</div>
						</div>
						<div class="card tabcontent"  id="RCU1">
						</div>
						<div class="card tabcontent"  id="FI1">
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
<!----------------------------------------------------------------------------- -->
<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                    DELETE
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/Credit_manager_user/delete_doc?UID=<?php if(!empty($cust_info)){ echo $cust_info->Application_id;} ?>" method="POST" id="doc_delete_Legal">
	                  <div class="form-group">
	                                <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this Document?</label>	                         
	                    <input name="id" type="number" class="idform" hidden  />
						<input name="form_id" type="text" name="form_id" value="Legal1" hidden  /> 						
	                  </div>                  

	                  <!-- Modal Footer -->
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default"
			                        data-dismiss="modal">
			                            CANCEL
			                </button>
			                <button type="submit" class="btn btn-primary">
			                    DELETE IT
			                </button>
			            </div>
	                </form>                
	            </div>            
	        </div>
	    </div>
	</div>
	<script >
		 $(".modal_test ").on("click", function(){
           var dataId = $(this).attr("data-id");
		   $(".idform").val(dataId);
       
    });
	</script>
<!---------------------------------------delete technical document------------------------------------>
<div class="modal fade" id="deleteModel_technical" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                    DELETE
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/Credit_manager_user/delete_doc_technical?UID=<?php if(!empty($cust_info)){ echo $cust_info->Application_id;} ?>" method="POST" id="doc_delete_Legal">
	                  <div class="form-group">
	                                <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this Document?</label>	                         
	                    <input name="id" type="number" class="idform" hidden  />
						<input name="form_id" type="text" name="form_id" value="Legal1" hidden  /> 						
	                  </div>                  

	                  <!-- Modal Footer -->
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default"
			                        data-dismiss="modal">
			                            CANCEL
			                </button>
			                <button type="submit" class="btn btn-primary">
			                    DELETE IT
			                </button>
			            </div>
	                </form>                
	            </div>            
	        </div>
	    </div>
	</div>
	<script >
		 $(".modal_test_technical ").on("click", function(){
           var dataId = $(this).attr("data-id");
		   $(".idform").val(dataId);
       
    });
	</script>
<!------------------------------------------------------------------------------ -->
<div class="modal fade" id="deleteModel1__" tabindex="-1" role="dialog" 
												aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<!-- Modal Header -->
														<div class="modal-header">
															<h4 class="modal-title" id="myModalLabel">
																ALERT
															</h4>
															<button type="button" class="close" 
															data-dismiss="modal">
															<span aria-hidden="true">&times;</span>
															<span class="sr-only">Close</span>
														</button>                
													</div>

													<!-- Modal Body -->
													<div class="modal-body">

														<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/Credit_manager_user/delete_doc?UID=<?php if(!empty($cust_info)){ echo $cust_info->Application_id;} ?>" method="POST" id="doc_delete_form">
															<div class="form-group">
																<label  class="col-12 control-label padding-10">Are you sure you want to DELETE this document ?</label>	                    
																<input name="id" type="number" class="idform" />	                        
															</div>                  

															<!-- Modal Footer -->
															<div class="modal-footer">
																<button type="button" class="btn btn-default"
																data-dismiss="modal">
																CANCEL
															</button>
															<button type="submit" class="btn btn-primary">
																DELETE IT
															</button>
														</div>
													</form>                
												</div>            
											</div>
										</div>
									</div>
<script type="text/javascript">
									
$('#deleteModel1__').on('show.bs.modal', function (e) {
   //alert("hello");
});										
</script>
<script  type="text/javascript">
$(document).ready(function () {
	
    //$("#Legal").find("option:not(:first)").remove();
	 $("#Technicalname").find("option:not(:first)").remove();


   var bank_id = $('#bank_name_technical').val();
 	
   
  
    var url_corporate = window.location.origin+"/dsa/dsa/index.php/Legal/get_coorporate_data";
	 $.ajax({
         type:'POST',
         url:url_corporate,
          // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
         data:{bank_id:bank_id},
         success:function(data){

                             var obj =JSON.parse(data);
							
							 if(obj.Technical_required=='yes')
							 {
								 //$('#Technical').removeClass('disabled');
								   $('#Technicalname').prop('disabled', false);
								 var url = window.location.origin+"/dsa/dsa/index.php/Technical/get_Technical_by_bank";
								$.ajax({
									 type:'POST',
									 url:url,
									  // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
									 data:{bank_id:bank_id},
									 success:function(data){

														 var obj =JSON.parse(data);
											 $.each(obj, function (index, value) {
																 $('#Technicalname').append($('<option/>', {
																	 value: value.UNIQUE_CODE,
																	 text : value.FN +' '+ value.LN
																   }));
																 });



									 }
									});
							 }
							 else
							 {
								   $('#Technicalname').prop('disabled', true);
							 }




         }
        });
		
   




 });

		
 $(document).ready(function () {
            
	
    var bank_id = $('#bank_name').val();
	//alert(bank_id);
	
 	var Legal_id=$('#Legal').val();
	var Technical_id=$('#Technicalname').val();
	if(bank_id!="")
{
   
//  alert(bank_id);
    var url_corporate = window.location.origin+"/dsa/dsa/index.php/Legal/get_coorporate_data";
	 $.ajax({
         type:'POST',
         url:url_corporate,
          // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
         data:{bank_id:bank_id},
         success:function(data){

                             var obj =JSON.parse(data);
							 if(obj.Legal_required=='yes')
							 {
								 //alert("hello");
								  $('#Legal').prop('disabled', false);
								 var url = window.location.origin+"/dsa/dsa/index.php/Legal/get_legal_by_bank";
									$.ajax({
										 type:'POST',
										 url:url,
										  // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
										 data:{bank_id:bank_id},
										 success:function(data){

															 var obj =JSON.parse(data);
															
												 $.each(obj, function (index, value) {
													if(Legal_id==' ')
													{
														//alert("hello1");
														//alert(value.FN +' '+ value.LN);
														 $('#Legal').append($('<option/>', {
																		 value: value.UNIQUE_CODE,
																		 text : value.FN +' '+ value.LN
																	   }));
													}
													else
													{
														 if(Legal_id==value.UNIQUE_CODE)
														 {
															 return;
														 }
														 else{
															// alert("hello2");
														    //alert(value.FN +' '+ value.LN);
																	 $('#Legal').append($('<option/>', {
																		 value: value.UNIQUE_CODE,
																		 text : value.FN +' '+ value.LN
																	   }));
																	 }
												     }
												 });



										 }
										});
							 }
							 else
							 {
								// $('#Legal').addClass('disabled');
								   $('#Legal').prop('disabled', true);
							 }
							 if(obj.Technical_required=='yes')
							 {
								 
								 //$('#Technical').removeClass('disabled');
								   $('#Technicalname').prop('disabled', false);
								 var url = window.location.origin+"/dsa/dsa/index.php/Technical/get_Technical_by_bank";
								$.ajax({
									 type:'POST',
									 url:url,
									  // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
									 data:{bank_id:bank_id},
									 success:function(data){

														 
																 var obj =JSON.parse(data);
															
												 $.each(obj, function (index, value) {
													if(Technical_id==' ')
													{
														//alert("hello1");
														//alert(value.FN +' '+ value.LN);
														 $('#Technical').append($('<option/>', {
																		 value: value.UNIQUE_CODE,
																		 text : value.FN +' '+ value.LN
																	   }));
													}
													else
													{
														 if(Technical_id==value.UNIQUE_CODE)
														 {
															 return;
														 }
														 else{
															// alert("hello2");
														    //alert(value.FN +' '+ value.LN);
																	 $('#Technical').append($('<option/>', {
																		 value: value.UNIQUE_CODE,
																		 text : value.FN +' '+ value.LN
																	   }));
																	 }
												     }
												 });

                                                



									 }
									});
							 }
							 else
							 {
								   $('#Technicalname').prop('disabled', true);
							 }




         }
        });
}
				
            });
	$( "#Legal" ).change(function() 
	{
		 var value=$("#Legal option:selected").text();
		
	$('#Legal_name').val(value);
	});
	$( "#Technicalname" ).change(function() 
	{
		 var value=$("#Technicalname option:selected").text();
		
		
	$('#Technical_name1').val(value);
	});
	$( "#bank_name" ).change(function() 
	{
		 var value=$("#bank_name option:selected").text();
		
		
	$('#bank_name_1').val(value);
	});
	
</script>

<script>
function openPage(pageName,elmnt,idvalue) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink_");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
	tablinks[i].style.border  = "1px solid gray"; 
  }
  document.getElementById(pageName).style.display = "block";
 
  document.getElementById(idvalue).style.border  = "2px solid blue";  
}

// Get the element with id="defaultOpen" and click on it
<?php if(isset($_SESSION['form_id']))
{?>
//alert("hello");
document.getElementById(<?php  echo $this->session->userdata('form_id'); ?>).click();
<?php  } else{ ?>
//alert("hello1");
document.getElementById("4").click();
<?php } ?>
</script>

<footer class="c-footer">
<div>Copyright © 2020 Finaleap.</div>
<div class="mfs-auto">Powered by Finaleap</div>
</footer>
</div>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>

<script src="<?php echo base_url(); ?>js/main.js"></script>

</body>
</html>
		