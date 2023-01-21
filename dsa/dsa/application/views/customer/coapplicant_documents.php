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
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div style="font-size: 10px; color: black; margin-right: 20px;">
						Personal Details
					</div>
					
					<div style="font-size: 10px; color: black; margin-right: 30px;">
						Income Details
					</div>

					
					<div style="font-size: 10px; margin-right: 20px; color: black;">
						Documents
					</div>
				</div>	
			</div>
		</div>

		<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15" id="business_man_layout">
			<div class="card shadow col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12" style="margin-bottom: 10px;"> 
				<div class="row" style="margin: 5px;">
					<div style="width:100%;"> 
						<?php if($error!=''){?> 
							<div class="alert alert-danger" role="alert">
							    	<?php echo $error;?> 
							</div>			
						<?php }?>

						<form  action="<?php echo base_url(); ?>index.php/customer/do_upload" method="post" enctype="multipart/form-data">					  		
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-top: 3px; margin-left: 10px;">
								<select style="color: #605d5d; font-size: 12px;" required name='doc_type' class='custom-file-upload'> <option value=''>Select Document Type</option>"?>
									<?php foreach($documents_type as $type) {
										echo "<option value='$type->DOC_NAME'>$type->DOC_NAME</option>";
									}?>	

							 	</select>																
							</div>

							<div>
								<div class="row">
									<div >
										<label style="font-size: 12px;" for='file-upload' class='custom-file-upload'>
								    		<i class='fa fa-cloud-upload'></i> Select Document
								  		</label>
							  			<input id='file-upload' type='file' name='userfile'/>
									</div>

									<div style="margin-top: 5px; margin-left: 10px;">
										<p id="txt_doc_selected" style="font-size: 12px;">No document selected</p>
									</div>
									<input type="hidden" name="id" value="<?php echo $_REQUEST['UID']; ?>">
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
					  		<img  style="width: 20px; height: 20px; margin-left: 30px; margin-right: 20px; margin-top: 20px;" src="<?php base_url()?>/dsa/dsa/images/documents/<?php echo $row->DOC_NAME;  ?>" class="rounded manager-img">
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
					<?php if($row->doc_cloud_name == '') {  ?>
															<a href="<?php echo base_url();?>images/documents/<?php echo $row->DOC_NAME;?>">View</a>
															<a href="<?php echo base_url();?>images/documents/<?php echo $row->DOC_NAME;?>" target='_blank' download>Download</a>
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

		<div class="row col-12 justify-content-center">
			<div>
				<a href="<?php echo base_url()?>index.php/customer/redirect_to_apply_for_loan">
				<button class="login100-form-btn" style="background-color: #25a6c6; margin-top: 10px;">
					SAVE
				</button></a>						
			</div>		
		</div>	
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
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/customer/delete_doc" method="POST" id="doc_delete_form">
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