<?php $dsa_id1=$this->session->userdata("dsa_id");
?>
<style>
	input[type="file"] {
    display: block;
}
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
<body onload="Check_status()" >
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
	<input hidden type="text" name="customer_id" id="customer_id"  value="<?php echo $data_row->UNIQUE_CODE;?>">
	<input hidden type="text" name="login_id" id="login_id_role"  value="<?php echo $login_details->ROLE;?>">
	
	<input hidden type="text" name="dsa_id" id="dsa_id" value="<?php if($dsa_id !=''){ echo $dsa_id;} else { echo $dsa_id1 ;}?>">

<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
<?php
 
  $message = $this->session->userdata('check_payment');   if (isset($message) && isset($loan_application_amount) && $loan_application_amount!='') {
	  
		if($message==0){
        echo '<script>  swal({
							  title: "Payment Information",
							  text: "You have to pay '.$loan_application_amount.'Rs for Loan Application.",
							  icon: "success",
							  buttons: true,
							  dangerMode: false,
							})
							.then((willDelete) => {
													 if (willDelete) {
														 location.href = "'.base_url("index.php/front/payment_getway_loan_application?UID=". $data_row->UNIQUE_CODE ).'";
													 }

                                                     
													 
												   else {
													 
													
												
												  }
												  });</script>';
		$this->session->unset_userdata('check_payment');}
       
		}
    
	
	?>

	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="row">
			<div class="shadow align-middle dot" style="width: 25px; height: 25px; text-align: center;">
				<span ><p style="font-size: 10px; padding: 5px; color: white; font-weight: bold;">0%</p></span>				
			</div>
			
			<span class="per-hr-check" style="width: 25%; margin-top: 12px;"></span>
			<div class="shadow align-middle dot" style="width: 25px; height: 25px; text-align: ;">
				<span ><p style="font-size: 10px; padding: 4px; color: white; font-weight: bold;">30%</p></span>				
			</div>	

			<span class="per-hr-check" style="width: 30%; margin-top: 12px;"></span>
			<div class="shadow align-middle dot" style="width: 25px; height: 25px; text-align: ;">
				<span ><p style="font-size: 10px; padding: 4px; color: white; font-weight: bold;">65%</p></span>				
			</div>

			<span class="per-hr-uncheck" style="width: 32%; margin-top: 12px;"></span>
			<div class="shadow align-middle uncheck-dot" style="width: 25px; height: 25px; text-align: ;">
				<span ><p style="font-size: 10px; padding: 4px; color: white; font-weight: bold;">100%</p></span>				
			</div>	
		</div>	
	</div>
</div>

<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
	<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
	<b><?php echo " ".$row->FN." ".$row->LN." ";?></b> Please upload your valid documents<br>
		<b><span id='tag'></span><br><span id='tag2'></span></b>
                
	</div>
	<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
		<div class="row justify-content-center">
			<div>
				<span class="shadow align-middle dot-white"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></span>				
			</div>

			<div >
				<span class="shadow align-middle dot-hr"></span>
			</div>			
			<div>
				<span class="align-middle dot-white"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span>
			</div>	

					<!--div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
					<div>
						<span class="align-middle dot-white"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-sticky-note-o"></i></span>
					</div-->			
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
					<div>
						<span class="align-middle dot"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></span>
					</div>			
				</div>	
			</div>
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">			
			</div>
			<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div style="font-size: 10px; color: black; margin-right: 20px;">
						Personal Details
					</div>
					
					<!--<div style="font-size: 10px; color: black; margin-right: 30px;">
						Income Details
					</div>

					div style="font-size: 10px; margin-left: 10px; color: black;">
						Loan Applications
					</div-->

					<div style="font-size: 10px; margin-right: 20px; color: black;">
						Documents
					</div>
				</div>	
			</div>
		</div>

		
		<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15" id="business_man_layout_doc">
			<div class="card shadow col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12" style="margin-bottom: 10px;"> 
				<div class="row" style="margin: 5px;">

					<?php if($this->session->flashdata('message') != '' && $error==''){?> 

						<div style="margin-left: 17rem" class="alert alert-success" role="alert">
							<?php echo $this->session->flashdata('message');?> 
						</div>	

					<?php }?>

					<?php if($error!=''){?> 
						<div style="margin-left: 17rem" class="alert alert-danger" role="alert">
							<?php echo $error;?> 
						</div>			
					<?php }?>

				<div class="row col-12 justify-content-center" >
					
						<?php if($doc_type=='' ){?>
							<span style="color:black;font-size:16px;padding:10px;margin-bottom:10px;">Other Documents</span>
					<?php } else {?>
							<span style="color:black;font-size:16px;padding:10px;margin-bottom:10px;"><?php echo $doc_type; ?></span>
						<?php } ?>
					</div> 

					<div class="row col-12 justify-content-center">
						<div class="row" style="margin-left:0px;margin-bottom:6px;">
						
						
						</div>										 	
					</div>

				</div>
			</div>	
			<div class="card shadow col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12" style="margin-bottom: 10px;"> 
				<div class="row" style="margin: 5px;">
					<div style="width:100%;"> 


						<form  action="<?php echo base_url(); ?>index.php/retailers/do_upload" method="post" enctype="multipart/form-data" id="customer_doc">					  		
							<div class="row">

								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-top: 3px; margin-left: 10px;">
									<select style="color: #605d5d; font-size: 12px;" required id="doc_type" name='doc_type' class='custom-file-upload'> <option value=''>Select Document Type</option>
										<?php $i=1; foreach($documents_type as $type) {


											if($type->DOC_MANDATORY == 'NO'){
												if($type->DOC_NAME == 'ITR'){ ?>
													<option value='<?= $type->DOC_NAME.'-'.(date('Y')-$i)?>'>
														<?= $type->DOC_NAME.'-'.(date('Y')-$i)?></option>
														<?php $i++;} else {
														
															if($type->DOC_NAME=="AADHAR CARD")
																	{
																		
																		if($data_row_more->KYC_doc=='Aadhar' && $data_row_more->VERIFY_KYC=='true')
																		{

																		}else{?>
                                                                                 <option value='<?= $type->DOC_NAME ?>'><?= $type->DOC_NAME?> </option>
																		<?php }

																	}
																	else {  ?>
                                                                               
																		<option value='<?= $type->DOC_NAME ?>'><?= $type->DOC_NAME?> </option>

																	<?php }

													 }  } else { 
															if($type->DOC_NAME == 'ITR') {?>

																<option value="<?= $type->DOC_NAME.'-'.(date('Y')-$i)?>">
																	<?= $type->DOC_NAME.'-'.(date('Y')-$i)?>*</option>

																	<?php $i++;} else {echo "hello";

																		if($type->DOC_NAME=="AADHAR CARD")
																	{
																		
																		if($data_row_more->KYC_doc=='Aadhar' && $data_row_more->VERIFY_KYC=='true')
																		{

																		}else{?>
                                                                                 <option value='<?= $type->DOC_NAME ?>'><?= $type->DOC_NAME?> *</option>
																		<?php }

																	}
																	else {  ?>
                                                                               
																		<option value='<?= $type->DOC_NAME ?>'><?= $type->DOC_NAME?> *</option>

																	<?php }

																	} } }?>	

																</select>																
															</div>

															<div>
																<div class="row">
																	<div >
																		<input id="status" name="status" value="<?php if(!empty($data_row_more)){echo $data_row_more->STATUS;}?>" hidden>
																		<input id='file-upload' type='file' name='userfile[]'  multiple="multiple"  onchange="Filevalidation()" />
																		<input id='coapp_id' hidden="true" type='text' name='coapp_id' value="<?php if(!empty($coapp_id))echo $coapp_id?>" />
																		<input id='master_type' hidden="true" type='text' name='master_type' value="<?php if(!empty($doc_type))echo $doc_type?>" />
																		<input hidden id='ID'  type='text' name='ID' value="<?php if(!empty($data_row)){echo $data_row->UNIQUE_CODE; } ?>" />
																		<input id='doc_mandatory'  type='text' name='doc_mandatory' hidden  />
																		<input hidden id='role'  type='text' name='Role' value="<?php if(!empty($data_row)){ if($data_row->ROLE==2){ echo 1;}else{ echo $data_row->ROLE; } } ?>" />
																	</div>

																	<div style="margin-top: 5px; margin-left: 10px;">
																		<!--<p id="txt_doc_selected" style="font-size: 12px;">No document selected</p>-->
																		<p id="txt_doc_selected_1" style="font-size: 12px;">No document selected</p>
																	</div>

																	<input type='submit' name='submit' value='upload' class='uploadbutton'/>
																</div>										 	
															</div>
														</div>								
													</form>
												</div>	
											</div>
										</div>										




										<?php $pos = 0; foreach($documents as $row){?>

											<?php //if($pos%2 == 0) {?> <div class="row col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 justify-content-center"> <?php //}$pos = $pos+1; ?>

											<div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12" style="margin: 0px;">

												<div class="card shadow" style="margin-bottom: 5px;">
													<div class="row">
														<?php if(strpos($row->DOC_NAME, 'pdf') !== false) {?>
															<img  src="<?php base_url()?>/dsa/dsa/images/documents/ic_pdf_placeholder.png" class="rounded manager-img">
														<?php } else {?>  
															<div class="parent">
																<a href="#" class="pop image-back">
																	<img  style="width: 20px; height: 20px; margin-left: 30px; margin-right: 20px; margin-top: 20px;" src="<?php echo base_url();?>images/documents/<?php echo $row->DOC_NAME;  ?>" class="rounded manager-img">
																</a>
																<?php if($row->DOC_VERIFIED == 1) {?>
																	<img right class="image-front" src="<?php base_url()?>/dsa/dsa/images/verified.png" style="width: 20px; height: 20px;">
																<?php } else { ?>
																	<img right class="image-front" src="<?php base_url()?>/dsa/dsa/images/not_verified.png" style="width: 10px; height: 10px;">
																<?php } ?>
															</div>     	
														<?php } ?>  

														<div style="padding: 6px; margin-left: 20px;" class="col-xl-10 col-lg-10 col-md-10 col-sm-7 col-7">
															<h5 class="align-self-center" style="color: #6f7272;"><b><?php echo $row->DOC_TYPE;  ?></b></h5>
															<?php if($row->DOC_VERIFIED == 0) {?>
																<p class="card-text"><small style="color: #d67a7a;"><?php echo $row->VERIFICATION_MESSAGE;  ?></small></p>			        	
															<?php } else { ?>
																<p class="card-text"><small style="color: green;"><?php echo $row->VERIFICATION_MESSAGE;  ?></small></p>
															<?php }?>
															<p class="card-text"><small style="color: green;"><?php echo strtoupper($row->DOC_MASTER_TYPE)." PROOF";  ?></small></p>
															<?php if($row->doc_cloud_name == '') {  ?>
															<a href="<?php echo base_url();?>images/documents/<?php echo $row->DOC_NAME;?>">View</a>
																<?php } else { ?>
															<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $row->ID; ?>" target='_blank' >View</a> 

														
														<?php } ?>

														</div> 

														<?php if($row->DOC_VERIFIED == 0) {?>	
															<div style="text-align: right; margin-top: 2%;">
																<i data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel"class="fa fa-trash text-right"></i>
															</div>
														<?php }?>  	
													</div>			    
												</div>		
											</div>			
											<?php if($pos%2 == 0) {?></div><?php } ?>
										<?php } ?>

										<!-- No doc view -->
										<div class="row col-12 justify-content-center">
											<div>
												

													<?php if(count($documents) == 0) { ?>
														<div >
															<div class="shadow" style="padding: 50px; margin: 30px;">
																<small class="full-black-color">Unable to find any Document's. Please upload required documents.
																</div>
															</div>
														<?php } ?>

													</div>		
												</div>

											
													<?php if(!empty($save))if($save){?>	
													<div class="row col-12 justify-content-center">
														<div>
															
																<button class="login100-form-btn" style="background-color: #25a6c6; margin-top: 10px;" id="btn_save" onclick="change_status()">
																	SAVE
																</button>						
															</div>		
														</div>				
													<?php }?>

												</div>

												<!-- Modal -->
												<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
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

														<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/customer/delete_doc?UID=<?php if(!empty($data_row)){echo $data_row->UNIQUE_CODE; } ?>" method="POST" id="doc_delete_form">
															<div class="form-group">
																<label  class="col-12 control-label padding-10">Are you sure you want to DELETE this document ?</label>	                    
																<input name="id" type="number" class="idform" hidden/>	                        
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

									<!-- Creates the bootstrap modal where the image will appear -->
									<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="myModalLabel">Image preview</h4>
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>	        
												</div>
												<div class="modal-body">
													<img src="" class="imagepreview" >
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
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

	 <script>
								function openForm() {
								  document.getElementById("myForm").style.display = "block";
								}

								function closeForm() {
								  document.getElementById("myForm").style.display = "none";
								}

						function hold() 
						{
					
						 var User_ID = document.getElementById('customer_id').value;
						 var holdReason = "Application is on HOLD in DocumnetUpload form because , "+document.getElementById('holdReason').value;
						 var dsa_id = document.getElementById('dsa_id').value;
						 if(holdReason=='')
										{
											swal("warning!", "Please Enter Reason for holding application", "warning");
										    return false;
										}
								$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/HOLD_CUSTOMER_APPLICATION"); ?>',
									    data:{
										'User_ID':User_ID,
										'Action':"HOLD",
										'Reason':holdReason,
										'dsa_id':dsa_id,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
												//alert("got it");
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/customer/customer_documents?UID="+obj.User_ID); });
									
												
											}
						                }
                                    });
		
						}

						function reject() 
						{
							var User_ID = document.getElementById('customer_id').value;
							var rejectReason = "Application is rejected DocumnetUpload form because , "+document.getElementById('rejectReason').value;
							var dsa_id = document.getElementById('dsa_id').value;
					    	if(rejectReason=='')
										{
											swal("warning!", "Please Enter Reason for rejecting application", "warning");
										    return false;
										}
						 	$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/REJECT_CUSTOMER_APPLICATION"); ?>',
									    data:{
										'User_ID':User_ID,
										'Action':"REJECT",
										'Reason':rejectReason,
										'dsa_id':dsa_id,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
												//alert("got it too");
												   swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/customer/customer_documents?UID="+obj.User_ID); });
									
											}
						                }
                                    });
						}

						function continue_()
						{
							 var User_ID = document.getElementById('customer_id').value;
						 	 var dsa_id = document.getElementById('dsa_id').value;

							 $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/CONTINUE_CUSTOMER_APPLICATION"); ?>',
									    data:{
										'User_ID':User_ID,
										'Action':"CONTINUE",
										'dsa_id':dsa_id,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
										
											      swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/customer/customer_documents?UID="+obj.User_ID); });
									
												
											}
						                }
                                    });

						}

						</script>
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
										         document.getElementById('tag').innerHTML = "Status added by  : "+obj.action_by;
												document.getElementById('tag2').innerHTML = " Reason : "+obj.reason;
											var word = "DocumnetUpload";
											var mystring =obj.reason;
												 var incStr = mystring.includes(word);
											      if(incStr!= false)
												{
														$('#btn_save').hide();
													}

											}
											else if(obj.msg=='REJECT')
											{
												document.getElementById('tag').innerHTML = "Status added by  : "+obj.action_by;
												document.getElementById('tag2').innerHTML = " Reason : "+obj.reason;
												var word = "DocumnetUpload";
												var mystring =obj.reason;
												 var incStr = mystring.includes(word);
											      if(incStr!= false)
												{
														$('#btn_save').hide();

													}
													 $('#lets_continue_btn').hide();
												  $('#lets_view_btn').hide();
												     $('#btn_hold').hide();
												    $('#btn_continue').hide();
														$('#btn_reject').hide();
										   
											}
											else if(obj.msg=='CONTINUE')
											{
													$('#border_style').css("border","2px solid blue");
													
											}
						                }
                                    });

						}
						function change_status() 
						{
					
						 var User_ID = document.getElementById('customer_id').value;
						 var role=document.getElementById('role').value;
						 var login_id_role=document.getElementById('login_id_role').value;
						 var status=document.getElementById('status').value;
						 if(status=='Send back from SCFO')
						 {
							$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/change_profile_status_revert_action"); ?>',
									    data:{
										'User_ID':User_ID,
										'status':"Revert Action Taken",
										
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
												//alert("got it");
												if (role==29 && login_id_role==29)
												{
													var url="<?php echo base_url("/index.php/distributor"); ?>";
												}
												else if(role==29 && login_id_role==28)
												{
													var url="<?php echo base_url("/index.php/distributor/managedistributor"); ?>";
												}
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace(url); });
									
												
											}
						                }
                                    });
						 }
						 else
						 {
								$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/change_profile_status"); ?>',
									    data:{
										'User_ID':User_ID,
										'status':"Complete",
										
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
												//alert("got it");
												if (role==29 && login_id_role==29)
												{
													var url="<?php echo base_url("/index.php/distributor"); ?>";
												}
												else if(role==29 && login_id_role==28)
												{
													var url="<?php echo base_url("/index.php/distributor/managedistributor"); ?>";
												}
												else if(role==29 && login_id_role==33)
												{
													var url="<?php echo base_url("/index.php/distributor/managedistributor"); ?>";
												}
												else if(role==27 && login_id_role==27)
												{
													var url="<?php echo base_url("/index.php/distributor/retailers"); ?>";
												}
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace(url); });
									
												
											}
						                }
                                    });
							}
		
						}
						</script>
									<script type="text/javascript">
										$('#deleteModel').on('show.bs.modal', function (event) {
											var button = $(event.relatedTarget) 
											var recipient = button.data('id') 
											var modal = $(this)
											modal.find('.modal-body .idform').val(recipient)
										})		
									</script>

									<script type="text/javascript">
										

									$('#doc-master').change(function(){

										var master = $('#doc-master').val();
										var select = $('#doc_type');

										$.ajax({

											url: "<?= base_url('index.php/Customer/get_doc_type_from_master')?>",
											method:'post',
											dataType: 'json',
											data:{'master':master},
											success:function(data){

												select.empty();
												$.each(data, function(a,b){

													//select.append("<option value=" ">Select</option> <option value="+b.DOC_NAME+">"+b.DOC_NAME+"</option>");
													select.append($('<option></option>').val(b.DOC_NAME).text(b.DOC_NAME));    	

												})

											}
										});

									});
                                   $('#doc_type').change(function(){

										var master = $('#master_type').val();
										var doc_type = $('#doc_type').val();

										$.ajax({

											url: "<?= base_url('index.php/Customer/get_mandatory_or_not')?>",
											method:'post',
											dataType: 'json',
											data:{'master':master,'doc_type':doc_type},
											success:function(data){

												$('#doc_mandatory').val(data);	

											}
										});

									});
									Filevalidation = () => {

										const fi = document.getElementById('file-upload');
										var id=document.getElementById('ID');
										// Check if any file is selected.
										if (fi.files.length > 0) {
											for (const i = 0; i <= fi.files.length - 1; i++) {

												const fsize = fi.files.item(i).size;
												const file = Math.round((fsize / 1024));
												// The size of the file.
												if (file >= 20000) {
													//window.location.replace('/dsa/dsa/index.php/customer/home_loan_doc'+'?error='+error+'&UID='+id);
													//window.location.href = ‘https://ExampleURL.com/’;
													
													document.getElementById("customer_doc").reset();
													
													$('#txt_doc_selected_1').html('No document selected');
													$('#txt_doc_selected').css('color', 'black');
													swal("warning!", "File too Big, please select a file less than 20mb","warning");                        
													return false; 
												
													
												} 
												else{
													$('#txt_doc_selected_1').html('Document selected');
													$('#txt_doc_selected_1').css('color', 'teal');
												}
											}
										}
									}

									</script>