
<?php
    $message = $this->session->userdata('result');
    if (isset($message)) {
		if($message==1)
		{
        echo '<script> swal("success!", "Update Status of Document As received Sucessfully", "success");</script>';
         $this->session->unset_userdata('result');	
		}
		else
		{
			 echo '<script> swal("warning!", "Something get wrong", "warning");</script>';
             $this->session->unset_userdata('result');	
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
                                    <div class="col-sm-12">
										<div>
											<div class="container">
											<?php if($this->session->userdata("USER_TYPE")=='Legal'){?>
												<div class="text-center">
												<h3> Legal Process</h3>
												</div>
											<?php } ?>
											<?php if($this->session->userdata("USER_TYPE")=='Technical'){?>
												<div class="text-center">
												<h3> Technical Process</h3>
												</div>
											<?php } ?>
											<?php if($this->session->userdata("USER_TYPE")=='FI'){?>
												<div class="text-center">
												<h3> FI Process</h3>
												</div>
											<?php } ?>
											<?php if($this->session->userdata("USER_TYPE")=='RCU'){?>
												<div class="text-center">
												<h3> RCU Process</h3>
												</div>
											<?php } ?>
												<br>
												</br>
												
												<Form action="<?php echo base_url('index.php/Legal/Revert_customer');?>" method="post">
												<div class="row">
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  
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
																<input required placeholder="Enter pincode *" class="form-control" type="text" minlength="6" name="resi_pincode" id="" oninput="maxLengthCheck(this)" maxlength="6" value="<?php if(!empty($cust_info))echo $cust_info->PROP_ADD_DISTRICT;?>"readonly>

															</div>  
													</div> 
												    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Property Type </label>
															<select required class="form-control" name="resi_sel_property_type" disabled="true"> 
															  <option value="">Select Property Type *</option>
															  <option value="Corporate Provided" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Corporate Provided') echo ' selected="selected"'; ?>>Corporate Provided</option>
															  <option value="Mortgaged" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Mortgaged') echo ' selected="selected"'; ?>>Mortgaged</option>
															  <option value="Owned" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Owned') echo ' selected="selected"'; ?>>Owned</option>
															  <option value="Rented" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
															  <option value="Shared Accomodation" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Shared Accomodation') echo ' selected="selected"'; ?>>Shared Accomodation</option>
															  <option value="Paying Guest" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Paying Guest') echo ' selected="selected"'; ?>>Paying Guest</option>
															  <option value="Others" <?php if(!empty($cust_info))if ($cust_info->PROP_ADD_PROP_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
															</select>
															</div>  
												    </div>
													
												
												     <input type="text" id="User_name" name="User_name" value="<?php echo $username; ?>"  hidden >
                                                    
													<input type="text" id="Legal_name" name="Legal_name" hidden >
													<input type="text" id="id" name="id" value="<?php echo $cust_info->UNIQUE_CODE; ?>" hidden >
													
													<input type="text" id="credit_id" name="credit_id" value="<?php echo $Legal_docs_info->credit_manager_id; ?>" hidden >
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Property Location</label>
															<input maxlength="30" required placeholder="Enter landmark *" class="form-control" type="text" name="resi_landmark" id="resi_landmark" value="<?php if(!empty($cust_info))echo $cust_info->PROP_LOCATION;?>"readonly>
														</div>  
														
												    </div> 
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														<div style=" margin-top: 8px;" class="col">
																 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Comment by CPA </label>
																 <textarea name="Comment_by_cpa" class="form-control" id="Comment"  readonly><?php if(!empty($Legal_docs_info)){  echo $Legal_docs_info->credit_comment_Legal; }?></textarea>
														</div>
											</div>
												
													
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
														<div style=" margin-top: 8px;" class="col">
																 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Comment </label>
																 <textarea name="Comment_by_Legal" class="form-control" id="Comment_by_Legal" ></textarea>
														</div>
													</div>
													
													
												</div>
												<?php if($this->session->userdata("USER_TYPE")=='Technical'){?>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
														<h3>Co-applicant Details</h3>
													</div>
													<?php if(isset($coapplicants))
																{
																	foreach($coapplicants as $coapplicant)
																	{?>
																			<div class="row">
																				
																				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
																							<div style=" margin-top: 8px;" class="col">
																									<label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Co-Applicant Name </label>
																									<input type="text"  class="form-control"  id="Loan_type" name="Loan_type" value="<?php echo $coapplicant->FN.' '.$coapplicant->LN; ?>" readonly>
																							</div>
																				</div>
																				<div class="col-xl-6 col-lg-4 col-md-6 col-sm-12 col-12">
																							<div style=" margin-top: 8px;" class="col">
																									<label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Co-Applicant Mob </label>
																										<input type="text"  class="form-control"  id="Loan_type" name="Loan_type" value="<?php echo $coapplicant->MOBILE; ?>" readonly>
																							</div>
																				</div>
																	        </div>
																	<?php }
																
																}
															}
													 ?>
												<div class="row" style="margin-top: 8px;">
												<?php  foreach($documents as $row){?>
												
													
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
														<div class="row " style="border: 1px solid #edeff1; margin-left:13px; margin-right:13px">
															<div class="col-sm-10"><a href="<?php echo base_url($row->path); ?>" target="_blank">  <i class="fa fa-file-text" style="color:green" aria-hidden="true"></i> &nbsp; <label for="email" style="font-size: 13px; color: black; font-weight: bold;">
																				<?php echo strtoupper($row->Doc_name); ?>
																			</label></a></div>
															<div class="col-sm-1"><a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $row->id; ?>" target="_blank"> <i class="fa fa-eye" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>
															</div>
															
																	
																						
																					
																				
														</div>
													
													</div>
			
													
										        <?php } ?>
												</div>
												
												
												
												</div>
												
												
												
												
												</br>
												<div class="text-center">
													<center>
													<?php if(!empty($Legal_docs_info)){if($Legal_docs_info->Legal_status=='Revert From Legal')
													{?>
													<button type="submit" class="btn btn-primary disabled" id="revert_Legal" disabled>Revert To Finaleap</button>
													<?php } else { ?>

													   
													   <button type="submit" class="btn btn-primary" id="revert_Legal">Revert</button>
													<?php } }else{?>
														<button type="submit" class="btn btn-primary" id="revert_Legal">Revert</button>
														<?php } ?>
													</center>
												</div>
												
											</form>
												
												
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</main>
</div>
<script  type="text/javascript">

 $(document).ready(function () {
                
                $('#EMI_Start_Date').datepicker({
				autoclose: true,
				endDate: new Date(new Date().setDate(new Date().getDate())),
				constrainInput: true,
				format: 'yyyy-mm-dd'  
				
});  
            
            });
	$( "#Legal" ).change(function() 
	{
		 var value=$("#Legal option:selected").text();
		
	$('#Legal_name').val(value);
	});
</script>
<script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
		html+='<div style=" margin-top: 8px;" class="col">';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="text" name="Legal_doc[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html += '</div>';
		html += '<input type="checkbox" class="form-check-input"  name="Legal_doc_status[]" disabled >';
        html += '</div>';
		
		html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script>
<footer class="c-footer">
<div>Copyright © 2020 Finaleap.</div>
<div class="mfs-auto">Powered by Finaleap</div>
</footer>
</div>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>


<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
  

</body>
</html>
		