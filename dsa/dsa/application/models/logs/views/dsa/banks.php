<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                    <div class="screen-title" style="margin-bottom:10px;">
                    	<small class="screen-title-txt">My Linked Banks</small> 
                    </div>                    
                </div>            	
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-4 margin-top-15">
                	<a href="<?php echo base_url()?>index.php/dsa/new_bank?type=customer" class="btn-dsa-new-customer">Add New Bank</a>
            	</div>
            </div>
        </div>
</div>

<?php if(count($customers) == 0) { ?>
	<div >
	        <div class="container">
	            <div class="row">
	            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                    <div class="screen-title" style="margin:100px;">
	                    	<small style="border-radius: 10px; padding: 15px; background-color: white;" class="full-black-color">Unable to find any Bank's.
	                    		<a style="background-color: white; border-radius: 10px; padding: 5px; margin-right: 5px; color: teal;" href="javascript:window.history.go(-1);">Go back</a>
	                    	</small>							
	                    </div>	                    
	                </div>            	
	            </div>
	        </div>
	</div>
<?php } ?>

<?php foreach($customers as $row){?>
	
	<div class="row justify-content-center">
		
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10">
			
				<div class="card mb-3">
				  <div class="row no-gutters">
				    <div class="col-xl-2.5 col-lg-2.5 col-md-2.5 col-sm-2.5 col-2.5 align-self-center">
				    <img  style="margin-left: 10px; width: 35px; height: 35px;" src="<?php base_url()?>/dsa/dsa/images/bank.png" class="rounded float-left card-img manager-img">
				    </div>
				    <div class="col-xl-9 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8">
				      <div class="card-bg">
				        <b><?php echo $row->BANK_NAME;  ?></b>
				        <p class="card-text">DSA Code: <?php echo $row->DSA_CODE;  ?></p>				        
				      </div>
				    </div>
				    <div class="col-xl-0.5 col-lg-0.5 col-md-0.5 col-sm-0.5 col-0.5 align-self-center">
				    	<button data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel"><i class="fa fa-trash"></i></button>
				    </div>
				  </div>
				</div>	
				
		</div>	
		
	</div>
<?php } ?>

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
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/dsa/delete_bank" method="POST" id="dsa_bank_delete_form">
	                  <div class="form-group">
	                    <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this Bank Details ?</label>	                    
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

	<script type="text/javascript">
		$('#deleteModel').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var recipient = button.data('id') 
		  var modal = $(this)
		  modal.find('.modal-body .idform').val(recipient)
		})		
	</script>