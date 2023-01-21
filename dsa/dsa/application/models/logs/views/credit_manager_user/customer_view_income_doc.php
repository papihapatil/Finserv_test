
<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">

			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				<?php if($id == $this->session->userdata("ID")) { ?>
					<div class="row" style="margin-left: 10px;">
						Edit

						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div>
								<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/customer/customer_documents"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
							</div>	
						</div>				
					</div>
				<?php } ?>					
			</div>
		
		</div>
	
        <div class="row justify-content-center shadow bg-white rounded margin-10 padding-15"><h2>Income Document</h2></div>
	
		<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15">
		
		
			

<?php $pos = 0; 
foreach($documents as $row)
{   
    if($row->DOC_MASTER_TYPE=='income' || $row->DOC_MASTER_TYPE=='INCOME')	{				?>
	
	<?php //if($pos%2 == 0) {?> <div class="row col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 justify-content-center"> <?php //}$pos = $pos+1; ?>
		
		<div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12" style="margin: 0px;">
			
			<div class="card shadow" style="margin-bottom: 5px;">
			    <div class="row">
			      <?php 
				  if(strpos($row->DOC_NAME, 'pdf') !== false) 
				  {
					  ?>
				      <img  src="<?php base_url()?>/dsa/dsa/images/documents/ic_pdf_placeholder.png" class="rounded manager-img">
				     <?php 
				  } 
				  else 
				  {  ?>  
				  	<div class="parent">
					  	<a href="#" class="pop image-back">
					  		<img  style="width: 20px; height: 20px; margin-left: 30px; margin-right: 20px; margin-top: 20px;" src="<?php base_url()?>/dsa/dsa/images/documents/<?php echo $row->DOC_NAME;  ?>" class="rounded manager-img">
					  	</a>
					  	<?php 
						if($row->DOC_VERIFIED == 1)
							{?>
								<img right class="image-front" src="<?php base_url()?>/dsa/dsa/images/verified.png" style="width: 20px; height: 20px;">
					  	      <?php 
							} 
							else 
							{ ?>
								<img right class="image-front" src="<?php base_url()?>/dsa/dsa/images/not_verified.png" style="width: 10px; height: 10px;">
								<?php 
							} ?>
					 </div>     	
				     <?php
				  } ?>  

				  <div style="padding: 6px; margin-left: 20px;" class="col-xl-10 col-lg-10 col-md-10 col-sm-7 col-7">
			        <h5 class="align-self-center" style="color: #6f7272;"><b><?php echo $row->DOC_TYPE;  ?></b></h5>
			        
			        <?php if($row->DOC_VERIFIED == 0) {?>
			        	<p class="card-text"><small style="color: #d67a7a;"><?php echo $row->VERIFICATION_MESSAGE;  ?></small></p>			        	
			        <?php } else { ?>
			        	<p class="card-text"><small style="color: green;"><?php echo $row->VERIFICATION_MESSAGE;  ?></small></p>
			        <?php }?>
					<p class="card-text"><small style="color: green;"><?php echo strtoupper($row->DOC_MASTER_TYPE)." PROOF";  ?></small></p>
			          <a href="<?php base_url()?>/dsa/dsa/images/documents/<?php echo $row->DOC_NAME;  ?>" target='_blank'>
											
											<button class="" style="background-color: #25a6c6; padding:2px;">
												View 
											</button>
					</a>
						<a href="<?php base_url()?>/dsa/dsa/images/documents/<?php echo $row->DOC_NAME;  ?>" target='_blank' download>
											
											<button class="" style="background-color: #25a6c6; padding:2px;">
												Download 
											</button>
					</a>
			      </div>
			      
			    </div>			    
			</div>		
		</div>			
	   <?php 
	   if($pos%2 == 0) 
	   {  ?>
         </div>
		 <?php 
	    } ?>


    <?php 
    }
 }   ?>



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