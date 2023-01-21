<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="screen-title" style="margin-bottom:10px;">
                    	<small class="screen-title-txt">LOANS</small>
                    </div>
                </div>            	
            </div>
        </div>
</div>

<?php if(count($loans) == 0) { ?>
	<div >
	        <div class="container">
	            <div class="row">
	            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                    <div class="screen-title" style="margin:100px;">
	                    	<small class="full-black-color">Nobody applied for any loan yet.</small>
	                    </div>
	                </div>            	
	            </div>
	        </div>
	</div>
<?php } ?>

<?php foreach($loans as $row){?>
	
	<div class="row justify-content-center">
		
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10">
			
			<div class="card mb-3">
			  <div class="row no-gutters">			    
			    <div class="col-xl-9 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8">
			      <div class="card-body">
			      	<h4 class="card-title"><b>Customer: <?php echo $row->FN." ".$row->LN;  ?></b></h4>
			      	<p class="card-text">Mobile : <?php echo $row->MOBILE;  ?></p>		        


			        <h5 class="card-text"><b>Loan Type: <?php echo $row->LOAN_TYPE;  ?></b></h5>
			        <p class="card-text">Status : <?php echo $row->LOAN_STATUS;  ?></p>
			        <p class="card-text"><small class="text-muted">Applied On : <?php $date=date_create($row->CREATED_AT); echo date_format($date,"d-m-Y h:i:s");;  ?></small></p>
			      </div>
			    </div>
			        
			  </div>
			</div>		
		</div>	
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                    My Comission
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/dsa/comission_action" method="POST" id="comission_form">
	                  <div class="form-group">
	                    <label  class="col-sm-8 control-label padding-10">Enter comission for this loan</label>
	                    <input type="number" class="form-control" name="comission" id="comission" placeholder="comission" required/>	                        
	                    <input name="id" type="number" class="idform" hidden/>	                        
	                  </div>                  

	                  <!-- Modal Footer -->
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default"
			                        data-dismiss="modal">
			                            Close
			                </button>
			                <button type="submit" class="btn btn-primary">
			                    Save changes
			                </button>
			            </div>
	                </form>                
	            </div>            
	        </div>
	    </div>
	</div>
<?php } ?>

<div class="row">
		
		<div class="col-5">
			
		</div>			
		<div class="col-7">
			<p><?php echo $links; ?></p>				
		</div>			
		
</div>

<script type="text/javascript">
	$('#myModalHorizontal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) 
	  var recipient = button.data('id') 
	  var modal = $(this)
	  modal.find('.modal-body .idform').val(recipient)
	})
</script>
