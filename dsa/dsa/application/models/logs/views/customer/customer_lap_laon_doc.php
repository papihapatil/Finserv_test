<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">

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
	<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
		Please upload your valid documents
	</div>
	<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
		<!--<div class="row justify-content-center">
			<div>
				<span class="shadow align-middle dot-white"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></span>				
			</div>

			<div >
				<span class="shadow align-middle dot-hr"></span>
			</div>			
			<div>
				<span class="align-middle dot-white"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span>
			</div>	

							
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
					<div>
						<span class="align-middle dot"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></span>
					</div>			
				</div>	-->
			</div>
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<!--<div class="row justify-content-center">
					<div style="font-size: 10px; color: black; margin-right: 20px;">
						Personal Details
					</div>
					
					<div style="font-size: 10px; color: black; margin-right: 30px;">
						Income Details
					</div>

					

					<div style="font-size: 10px; margin-right: 20px; color: black;">
						Documents
					</div>-->
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
						<?php if($doc_type=='HOMELOAN'){?>
							<span style="color:black;font-size:16px;padding:10px;margin-bottom:10px;">Upload Documents For Loan Against Property</span>
						<?php } ?>

					</div>

					<div class="row col-12 justify-content-center">
						<div class="row" style="margin-left:0px;margin-bottom:6px;">
							
                            <label class='doctype'>Laon Against Property<?php if($doc_type=='HOMELOAN')if(empty($save)){?> <spna style="margin-left:3px;padding-left:2px;padding-right:2px;"class="fullCircle"><i class="fa fa-cloud-upload" style="color:green;"></spna></i><?php } else if($doc_type=='HOMELOAN'||$doc_count ==1 ){ ?><spna style="margin-left:3px;padding-left:2px;padding-right:2px;"class="fullCircle"><i class="fa fa-check" style="color:green;"></spna></i><?php }?></label>

						</div>										 	
					</div>

				</div>
			</div>	
			<div class="card shadow col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12" style="margin-bottom: 10px;"> 
				<div class="row" style="margin: 5px;">
					<div style="width:100%;"> 


						<form  action="<?php echo base_url(); ?>index.php/customer/do_upload_doc_LAP" method="post" enctype="multipart/form-data" id='Lap_loan_doc'>					  		
							<div class="row">

								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-top: 3px; margin-left: 10px;">
									<select style="color: #605d5d; font-size: 12px;" required id="doc_type" name='doc_type' class='custom-file-upload'> <option value=''>Select Document Type</option>
										<?php  foreach($documents_type as $type) {

                                       
											if($type->DOC_MANDATORY == 'NO'){
												?>
															<option value='<?= $type->DOC_NAME ?>'><?= $type->DOC_NAME ?> </option>

														<?php }  else { 
															?>

																		<option value='<?= $type->DOC_NAME ?>'><?= $type->DOC_NAME?> *</option>

																	<?php } } ?>	

																</select>																
															</div>

															<div>
																<div class="row">
																	<div >
																		<label style="font-size: 12px;" for='file-upload' class='custom-file-upload'>
																			<i class='fa fa-cloud-upload'></i> Select Document
																		</label>
																		<input id='file-upload' type='file' name='userfile[]'  multiple="multiple"  onchange="Filevalidation()" />
																		<input id='coapp_id' hidden="true" type='text' name='coapp_id' value="<?php if(!empty($coapp_id))echo $coapp_id?>" />
																		
																		<input id='master_type' hidden="true" type='text' name='master_type' value="<?php if(!empty($doc_type))echo $doc_type?>" />
																	   <input  hidden="true" id='ID'  type='text' name='ID' value="<?php if(!empty($id))echo $id?>" />
																	</div>

																	<div style="margin-top: 5px; margin-left: 10px;">
																		<!-- <p id="txt_doc_selected" style="font-size: 12px;">No document selected</p>-->
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
															<!--p class="card-text">Document File Type : <?php echo $row->DOC_FILE_TYPE;  ?></p-->
															<!--p class="card-text"><small class="text-muted">Document Size : <?php echo $row->DOC_SIZE;  ?></small></p-->
															<?php if($row->DOC_VERIFIED == 0) {?>
																<p class="card-text"><small style="color: #d67a7a;"><?php echo $row->VERIFICATION_MESSAGE;  ?></small></p>			        	
															<?php } else { ?>
																<p class="card-text"><small style="color: green;"><?php echo $row->VERIFICATION_MESSAGE;  ?></small></p>
															<?php }?>
															<p class="card-text"><small style="color: green;"><?php echo strtoupper($row->DOC_MASTER_TYPE)." PROOF";  ?></small></p>
															<?php if($row->doc_cloud_name == '') {  ?>
															<a href="<?php echo base_url();?>images/documents/<?php echo $row->DOC_NAME;?>">View</a>
															<a href="<?php echo base_url();?>images/documents/<?php echo $row->DOC_NAME;?>" target='_blank' download>Download</a>
														<?php } else { ?>
															<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $row->ID; ?>" target='_blank' >View</a> 

														<!--	<a href="<?php echo base_url();?>index.php/customer/download_cloud_file/<?php echo $row->ID; ?>" target='_blank' >Download</a> 
														--> <?php } ?> /
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
												<a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried">

													<?php if(count($documents) == 0) { ?>
														<div >
															<div class="shadow" style="padding: 50px; margin: 30px;">
																<small class="full-black-color">Unable to find any Document's. Please upload required documents.
																</div>
															</div>
														<?php } ?>

													</div>		
												</div>

												<!-- save view -->	
												<?php if(!empty($save))if($save){?>	
													<div class="row col-12 justify-content-center">
														<div>
															<a href="<?php echo base_url()?>index.php/customer/Payment_mode?UID=<?php if(!empty($id)){echo $id; } ?>">
																<button class="login100-form-btn" style="background-color: #25a6c6; margin-top: 10px;">
																	SAVE
																</button></a>						
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

														<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/customer/delete_doc?UID=<?php if(!empty($id))echo $id; ?>" method="POST" id="lap_doc_delete_form">
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
				
				document.getElementById("Lap_loan_doc").reset();
				
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