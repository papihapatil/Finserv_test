<?php
    $message = $this->session->userdata('result');
	
    if (isset($message)) {
		if($message==1)
		{
        echo '<script> swal("success!", "Send To Legal Successfully", "success");</script>';
         //$this->session->unset_userdata('result');
		  unset($_SESSION['result']);
		}
		 else if($message==2)
		{
        echo '<script> swal("warning!", "Please Upload Required Documents", "warning");</script>';
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
<div class="c-body">
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-12">
						<div class="card tabcontent"  id="FI1">    
							<div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
										
											<div class="container">
												<div class="text-center">
												<h3>Send Customer To Legal Process</h3>
												</div>
												
												<br>
												</br>
												<Form action="<?php echo base_url('index.php/Credit_manager_user/do_upload_Legal_doc');?>" method="post" enctype="multipart/form-data" id="Legal_doc_upload"  >
												<div class="row">
												   <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
													<input type="number" name="form_id" value="3" hidden />
													<input type="text" name="send_to" value="Legal" hidden />
													<input type="text" name="submit_button_name_upload" id="submit_button_name_upload" hidden />
													<input type="text" class="form-control" id="Application_Id" name="Application_Id" value="<?php if(!empty($cust_info)){ echo $cust_info->Application_id;} ?>" readonly hidden>
												    <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Select Document To upload</label>
															<select required class="form-control" name="Legal_doc" id="Legal_doc"  > 
															<option value="">Select Documents</option>
																	<?php if (isset($Legal_Doc_list)){ foreach($Legal_Doc_list as $doc){ ?>
																	<option value="<?php  echo $doc->Doc_name; ?>"><?php  echo  $doc->Doc_name; ?></option>
																	<?php }  }?>	
																
															</select> 
														 
													</div> 
												</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												        
															<div style=" margin-top: 8px;" class="col">
															  <label style="font-size: 12px;" for='file-upload' class='custom-file-upload'>
																				<i class='fa fa-cloud-upload'></i> Select Document
																			</label>
																			<input id='file-upload' type='file' name='userfile'  multiple="multiple" required  onchange="Filevalidation()" />
																			
																 <button type="submit" name="upload" class="btn btn-primary" id="upload_doc">Upload</button>
															</div>  
															<input type="text" id="id" name="id" value="<?php echo $cust_info->UNIQUE_CODE; ?>" hidden >
													   
													</div>	
												</div>
												</form>
												<div class="row" style="margin-top: 8px;" id="docs">
												<?php  foreach($documents as $row){?>
												
												
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
														<div class="row " style="border: 1px solid #edeff1; margin-left:13px; margin-right:13px">
															<div class="col-sm-10"><a href="<?php echo base_url($row->path); ?>" target="_blank">  <i class="fa fa-file-text" style="color:green" aria-hidden="true"></i> &nbsp; <label for="email" style="font-size: 13px; color: black; font-weight: bold;">
																				<?php echo strtoupper($row->Doc_name); ?>
																			</label></a></div>
															<div class="col-sm-1"><a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $row->id; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>
															</div>
															<div class="col-sm-1"> 	
															<a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/customer/delete_vendor_doc_Legal/<?php echo $row->id; ?>"><i class="fa fa-trash text-right" style="color:red;"></i></a>
																				
															</div>
																	
																						
																					
																				
														</div>
													
													</div>
			
													
										        <?php } ?>
												</div>
												<Form action="<?php echo base_url('index.php/Credit_manager_user/do_upload_Legal_doc');?>" method="post" enctype="multipart/form-data" id="Legal_Vendors">
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
															<select class="form-control" aria-label="Default select example" name="bank_name" id="bank_name_FI"  required>
																	<option value="">Select bank</option>
																	<?php if (isset($banks)){ foreach($banks as $bank){ ?>
																
																	<option value="<?php  echo $bank->id; ?>"<?php if($cust_info->bank_id==$bank->id){echo 'selected';} ?>><?php  echo $bank->Bank_name; ?></option>
																	<?php }  }?>
																															
															</select>

															<input type="text" id="bank_name_1" name="bank_name_1" hidden >
															<input type="text" id="submit_button_name" name="submit_button_name" hidden >
													</div>
												</div>	
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
													 <div style=" margin-top: 8px;" class="col">
														 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Assign To Legal</label>
													<?php if(!empty($Legal_docs)){if($Legal_docs->Legal_status!='')
													{?>
													 <select class="form-control" name="RCU_name" id="RCU_name"  required> 
													<option value="<?php if(!empty($Legal_docs)){ echo $Legal_docs->Legal_id; }?>" selected ><?php if(!empty($cust_info))echo $Legal_docs->Legal_name;?></option>
													</select>
													  <input type="text" id="RCU_name_1" name="RCU_name_1"  value="<?php if(!empty($cust_info))echo $cust_info->Legal_name; ?>" hidden >
													<?php }else{?>
														<select class="form-control" name="RCU_name" id="RCU_name"  required>
													<option value=""> select Legal  </option>
													
													</select>
													<?php }} else{?>
                                                      <input type="text" id="RCU_name_1" name="RCU_name_1" hidden >
													  <select class="form-control" name="RCU_name" id="RCU_name"  required>
													 
													<option value="" > select Legal </option>
													
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
												<?php if(!empty($Legal_docs)){if($Legal_docs->Legal_status=='Revert From Legal'){?>
													<div class="row">
														<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
														<div style=" margin-top: 8px;" class="col">
															 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Legal Comment </label>
															<textarea name="comment_Legal" class="form-control"><?php echo $Legal_docs->Legal_comment; ?> </textarea>
															 
														</div> 
														</div>
													</div>
												<?php }} ?>
												
												
												
												
									
												
												
												
												
												
												</br>
												<?php if(!empty($Legal_docs)){if($Legal_docs->Legal_status=='Document Received From Legal')
													{ ?>
												<div class="text-center">
												<h3>Legal Report</h3>
												</div><div class="row" style="margin-top: 8px;">

												<?php  foreach($FI_Report as $row){?>
												
													
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
														<div class="row " style="border: 1px solid #edeff1; margin-left:13px; margin-right:13px">
															<div class="col-sm-10"><a href="<?php echo base_url($row->path); ?>" target="_blank">  <i class="fa fa-file-text" style="color:green" aria-hidden="true"></i> &nbsp; <label for="email" style="font-size: 13px; color: black; font-weight: bold;">
																				<?php echo strtoupper($row->Doc_name); ?>
																			</label></a></div>
															<div class="col-sm-1"><a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $row->id; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>
															</div>
															
																	
																						
																					
																				
														</div>
													
													</div>
			
													
										        <?php }  } }?>
												
												</div>
												<?php if(isset($Legal_docs))
																   {
																	   
																	   if(!empty($Legal_docs->additional_comments))
																   
																	   {
																	   $Conditions_to_Loan_Sanction_2= json_decode($Legal_docs->additional_comments);
																	   
																				   if(!empty($Conditions_to_Loan_Sanction_2))
																				   { ?>
																				   
																				   <div class="row">
																						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
																						    <div style=" margin-top: 8px;" class="col">
																							<label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Comments From Legal </label>
																								   <table class="table table-bordered" id="data_table3">
																							   <?php 
																								   foreach($Conditions_to_Loan_Sanction_2 as $value) 
																								   {
																								   if(!empty($value->additional_comments))
																								   {
																									   ?>
																										   <tr>
																										   <td><textarea class = "form-control" type="text"  name="additional_emi_comments_3[]" > <?php 	echo $value->additional_comments;?></textarea></td>
																											   </tr>
																										   
																									   <?php
																								   }
																								   }?>
																								  
																								   
																								   
																								   </table>
																							</div>
																						</div>
																					</div>
																								
																							   
																						   <?php
																				   } 
																					   
																				   
																		   }
																	   }
																	   ?>
												</br>
												<div class="text-center">
												<?php if(!empty($Legal_docs)){if($Legal_docs->Legal_status=='Revert From Legal')
													{ ?>
												     <button type="submit" name="revert_action" id="revert_action" class="btn btn-primary" >Revert Action</button>
												  
												<?php }
												else if($Legal_docs->Legal_status=='Document Received From Legal')
														{?>
															<button type="submit" name="revert_to_Legal"  id="revert_to_Legal" class="btn btn-primary" id='revert_to_Legal' >Revert To Legal</button>
														    <button type="submit" name="Accepted" id="Accepted" class="btn btn-primary" id='Accepted' >Accept</button>
													<?php	}
													else if($Legal_docs->Legal_status=='Send TO Legal')
														{?>
                                                                <button type="submit"  class="btn btn-primary disabled" >Wating For Legal Reports</button>
														<?php 
														}
														else if($Legal_docs->Legal_status=='Revert Action Taken')
														{?>
                                                                <button type="submit"  class="btn btn-primary disabled" >Revert Action Taken</button>
														<?php
														}
														else if($Legal_docs->Legal_status=='Accepted from Finaleap')
														{?>
                                                                <button type="submit"  class="btn btn-primary disabled" >Accepted from Finaleap</button>
														<?php
														}
														else if($Legal_docs->Legal_status=='Revert From Finaleap')
														{?>
                                                                <button type="submit" class="btn btn-primary disabled" >Revert From Finaleap</button>
														<?php
														}
														else{ ?>
												   <button type="submit" class="btn btn-primary" name="submit"  id="submit1">Submit</button>
												   <?php }  }else{ ?>
												   <button type="submit" class="btn btn-primary" name="submit"  id="submit">Submit</button>
												   <?php }  ?>
													
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
	</div>
</div>
<script  type="text/javascript">
$(document).ready(function () {
            
	
			var bank_id = $('#bank_name_FI').val();
			//alert(bank_id);
			
			 var Legal_id=$('#FI_name').val();
			
			if(bank_id!="")
		{
		   
			 //  alert(bank_id);
				var url_corporate = window.location.origin+"/finserv_test/dsa/dsa/index.php/Legal/get_coorporate_data";
				$.ajax({
					type:'POST',
					url:url_corporate,
				
				 data:{bank_id:bank_id},
				 success:function(data){
		
									 var obj =JSON.parse(data);
									 if(obj.RCU_required=='yes')
									 {
										 //alert("hello");
										  $('#Legal').prop('disabled', false);
										 var url = window.location.origin+"/finserv_test/dsa/dsa/index.php/Legal/get_Legal_by_bank";
											$.ajax({
												 type:'POST',
												 url:url,
												
												 data:{bank_id:bank_id},
												 success:function(data){
		
																	 var obj =JSON.parse(data);
																	
														 $.each(obj, function (index, value) {
															if(Legal_id==' ')
															{
																//alert("hello1");
																//alert(value.FN +' '+ value.LN);
																 $('#RCU_name').append($('<option/>', {
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
																			 $('#RCU_name').append($('<option/>', {
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
										   $('#RCU_name').prop('disabled', true);
									 }
									 
		
		
		
		
				 }
				});
		}
						
	});
	$( "#RCU_name" ).change(function() 
	{
		 var value=$("#RCU_name option:selected").text();
		 $('#RCU_name_1').val(value);
	});
		
	
	$( "#revert_to_Legal" ).click(function(e) {
 
  var comment = $('#comment_by_finaleap').val();
  var name = $('#name').val();

  if(comment=='' || comment==' ')
  {


	   swal ( "Oops" ,  "Please Comment !" ,  "warning" );
	   return false;
  }
	});
	
	$("#submit").click(function () {
		
		 $('#submit_button_name').val('submit');
	});
	$("#submit1").click(function () {
		
		$('#submit_button_name').val('submit');
   });	
   $("#revert_action").click(function () {
		
		$('#submit_button_name').val('revert_action');
   });
   $("#revert_to_Legal").click(function () {
		
		$('#submit_button_name').val('revert_to_Legal');
   }); 
   $("#Accepted").click(function () {
		
		$('#submit_button_name').val('Accepted');
   });
   $("#upload_doc").click(function () {
	$('#submit_button_name_upload').val('upload');
		
   });
   
	
		  $("#Legal_doc_upload").submit(function(e) {
              var Application_Id=$('#Application_Id').val();
			  e.preventDefault();
              
              var form = $(this);
              var url = form.attr('action');    
			 
              $.ajax({
                     type: "POST",
                     url: url,
                     data: new FormData(this),
					 processData: false,
					 contentType: false,
                     success: function (response) {
					    var parsed_data = JSON.parse(response);
						if(parsed_data.result == 3){                                                                
                              swal(
								"success!", 
								"Document uploaded Successfully", 
								"success"
                                  );
								  $('#docs').html(' ');	
									$.each(parsed_data.docs ,function (index, value)
								  {
									
									var content='<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">'+
														'<div class="row " style="border: 1px solid #edeff1; margin-left:13px; margin-right:13px">'+
															'<div class="col-sm-10"><a href="'+value.path+'" target="_blank">  <i class="fa fa-file-text" style="color:green" aria-hidden="true"></i> &nbsp; <label for="email" style="font-size: 13px; color: black; font-weight: bold;">'+ value.Doc_name +'</label></a></div>'+
																'<div class="col-sm-1"><a href="'+ window.location.origin+'/finaleap_finserv/dsa/dsa/index.php/customer/view_vendors_cloud_file/'+value.id+'"target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></div>'+
																'<div class="col-sm-1">'+	
															       '<a style="margin-left: 8px; " href="'+window.location.origin+'/finaleap_finserv/dsa/dsa/index.php/customer/delete_vendor_doc_Legal/'+value.id+'"><i class="fa fa-trash text-right" style="color:red;"></i></a>'+
															'</div>'+			
														'</div></div></div>';
																	
																						
														$('#docs').append(content);								
																				
																		
								  }
								
								);
								  

  
                          }
						  
						 
                          
                      }
              });                
          });	
		  	
</script>