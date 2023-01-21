
		<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15"><h2>KYC Document</h2></div> 
		
		<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15">
			

<?php $pos = 0; 
foreach($documents as $row)
{   
    if($row->DOC_MASTER_TYPE=='kyc' || $row->DOC_MASTER_TYPE=='KYC')	{				?>
	
	<?php //if($pos%2 == 0) {?> <div class="row col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 justify-content-center"> <?php //}$pos = $pos+1; ?>
		
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12" style="margin: 0px;">
			
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


	<script type="text/javascript">
		$('#deleteModel').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var recipient = button.data('id') 
		  var modal = $(this)
		  modal.find('.modal-body .idform').val(recipient)
		})		
	</script>