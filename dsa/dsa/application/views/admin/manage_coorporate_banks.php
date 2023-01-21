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
<div >
        <div class="container">
            <div class="row">
            	          	
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4 margin-top-15">
				<a style="margin-left: 9px; background-color: #25a6c6;margin :2px;padding:6px;" href="<?php echo base_url()?>index.php/admin/new_corporate_admin_bank"  class="btn btn-info" style="background-color: #25a6c6;">Add New Coorporate Bank</a>
          	</div>
			  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                    <div class="screen-title" style="margin-bottom:10px;">
                    	
                    </div>                    
                </div>  
            </div>
        </div>
		<hr>
</div>


<?php foreach($banks as $row){?>
	
	<div class="row justify-content-center">
		
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			
				<div class="card mb-3">
				  <div class="row no-gutters" style="padding: 10px;">
				    <div class="col-xl-2.5 col-lg-2.5 col-md-2.5 col-sm-2.5 col-2.5 align-self-center">
				    <i class="fa fa-university" style="margin: 15px; font-size: 16px;"></i>	
				    </div>
				    <div class="col-xl-9 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8 align-self-center" style="margin-left: 10px;">
				      Bank Name : <b><?php echo $row->Bank_name;  ?></b>				        
				    </div>
				    <div class="col-xl-0.5 col-lg-0.5 col-md-0.5 col-sm-0.5 col-0.5 align-self-center">
				        <button  class="btn" data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#edit_model"><i class="fa fa-plus" style="color:Green"></i></button>
						<button  class="btn" data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel"><i class="fa fa-trash" style="color:red"></i></button>
						<a href="<?php echo base_url()?>index.php/admin/edit_corporate_bank?id=<?php echo $row->id;?>" class="btn"><i class="fa fa-pencil-square-o" style="color:Green"></i></a>
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
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/delete_admin_corporate_bank" method="POST" id="delete_admin_corporate_bank">
	                  <div class="form-group">
	                    <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this Bank ?</label>	                    
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
	<!---------------------------------------------------model close------------------------------------------------>
	<div class="modal fade" id="edit_model" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                   Bank Details
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/Save_Bank_details" method="POST" id="Save_Bank_details">
	                  <div class="form-group">
					  <label  class="col-12 control-label padding-10">Processing Fees in %</label>	 
                       <select class="form-control"	name="Loan_type">
					   <option>Select Loan Type</option>
					    <option value="Home Loan">Home Loan</option>
						<option value="HL-Self Construction">HL-Self Construction</option>
						<option value="HL-Builder Purchase">HL-Builder Purchase</option>
						<option value="HL-BT">HL-BT</option>
						<option value="HL-Home Improvement/Top up">HL-Home Improvement/Top up</option>
						<option value="MSME Loan">MSME Loan</option>
						<option value="Resale">Resale</option>
						<option value="Supply Chain Finance">Supply Chain Finance</option>
						<option value="Loan Against Property">Loan Against Property</option>
						<option value="LAP-BT">LAP-BT</option>
						
					   </select>
	                    <label  class="col-12 control-label padding-10">Processing Fees in %</label>	 
                        <input name="Processing_fess"  step="any" type="number" class="form-control" >	
                        <label  class="col-12 control-label padding-10">Insurance Amount in %</label>	 
                        <input name="Insurance_fees"  step="any" type="number" class="form-control" >	
                        <label  class="col-12 control-label padding-10">Rate Of Intrest in %</label>	 
                        <input name="Rate_of_intrest" step="any" type="number" class="form-control" >							
	                    <input name="id" type="number" class="idform" hidden/>	                        
	                  </div>                  

	                  <!-- Modal Footer -->
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default"
			                        data-dismiss="modal">
			                            CANCEL
			                </button>
			                <button type="submit" class="btn btn-primary">
			                   Update
			                </button>
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
</main>
</div>
<footer class="c-footer">
<div>Copyright © 2020 Finaleap.</div>
<div class="mfs-auto">Powered by Finaleap</div>
</footer>
</div>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php base_url()?>/dsa/dsa/js/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php base_url()?>/dsa/dsa/js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#deleteModel').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var recipient = button.data('id') 
		  var modal = $(this)
		  modal.find('.modal-body .idform').val(recipient)		  
		});
	});
	$(document).ready(function(){
		$('#edit_model').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var recipient = button.data('id') 
		  var modal = $(this)
		  modal.find('.modal-body .idform').val(recipient)		  
		});
	});
</script>
</body>
</html>
	