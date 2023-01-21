<style>
 .steps  li {
    margin: 0px;
    list-style-type: circle;
}
 .external {
        display: table;
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
      }
	     .middle {
        display: table-cell;
        vertical-align: middle;
      }
	  .internal {
        margin-left: auto;
        margin-right: auto;
       
      }
		
 
</style>




 <div class="external">
      <div class="middle">
        <div class="internal">
			<div class="row justify-content-center col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12" >
				
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10">
					
					<div class="card mb-3">
					  <div class="row no-gutters">			    
						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12">
						  <div class="card-body">
							<div class="row justify-content-center">
									<h2 class="text-center" style="color:#d62122;">MODE OF PAYMENT </h2>
							</div>
							<div class="row col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12 ">
								
								
								  <a href="<?php echo base_url().'index.php/Admin/offline_payment_view?x='.base64_encode($_GET['UID']);?>"  class="col-md-6 col-sm-6 col-xs-6 col-lg-6 col-xl-6 modal_test_technical" style="margin-top:3px;padding:50px;">
									    <div style="border: 2px solid green;margin:5px;padding:3px;border-radius: 2%; " class="text-center">
										   <h1>OFFLINE</h1>
										  <img src="<?php echo base_url().'images/Offline_payment.jpg'?>"></img>
										</div>
								  </a>
								  
								  <a href="<?php echo base_url().'index.php/Admin/online_payment?x='.base64_encode($_GET['UID']);?>"  class="col-md-6 col-sm-6 col-xs-6 col-lg-6 col-xl-6" style="margin-top:3px;padding:50px;">
								        <div style="border: 2px solid green;margin:5px;padding:3px;border-radius: 2%;" class="text-center">
										   <h1>ONLINE</h1>
										     <img src="<?php echo base_url().'images/online_payment.jpg'?>"></img>
										</div>
								   </a>
								  
								
								</div>
							</div>
							
							
							
							
						  </div>
						</div>
					  
					  </div>
					</div>		
				</div>	
		
	</div>
	<div class="modal fade" id="deleteModel_technical" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                    OFFLINE PAYMENT DETAILS
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/offline_payment" method="POST" id="doc_delete_Legal">
	                  <div class="form-group">
					  <input name="id" type="text" class="idform" hidden />
	                    <label  class="col-12 control-label padding-10">Account Holder Name</label>	                         
	                    <input type="text"  name="Acc_holder_name" class="form-control" id="email" pattern="[a-zA-Z ]+"  title="Only Alphabets Are allow" required>
						<label  class="col-12 control-label padding-10">Bank Name</label>	                         
	                    <input  name="Bank_name" type="text" class="form-control" id="email"  pattern="[a-zA-Z ]+"  title="Only Alphabets Are allow" required>
						<label  class="col-12 control-label padding-10">Branch Name</label>	                         
	                    <input name="Branch_name" type="text" class="form-control" id="email" pattern="[a-zA-Z ]+"  title="Only Alphabets Are allow" required>
						<label  class="col-12 control-label padding-10">Cheque No</label>	                         
	                    <input  name="Check_no" type="text" class="form-control" id="email" required>
						<label  class="col-12 control-label padding-10">IFSC Code</label>	  
						<input name="IFSC_code" type="text" id="country_code" name="country_code" pattern="^[A-Z]{4}0[A-Z0-9]{6}$" class="form-control" title="Example : SBIN0125620" required>
						<label  class="col-12 control-label padding-10">Account Type</label>	                         
	                    <select class="form-control" name="Acc_type" required>
						<option> Select Account Type </option>
						<option value="SAVING"> SAVING</option>
						<option value="CURRENT"> CURRENT </option>
						
						</select>
						<label  class="col-12 control-label padding-10">Cheque Handover TO</label>
						<select name="RO_ID"  class="form-control" required>
						<option> Select </option>
						<?php foreach ($RO as $R){?>
						<option value="<?php echo $R->UNIQUE_CODE;?>"><?php echo $R->FN.' '.$R->LN;?></option>
						<?php } ?>
						</select>
						<label  class="col-12 control-label padding-10">Cheque Receipt Date</label>
						<input type="date" class="form-control" id="email" name="Recived_date" required>			
                        <label  class="col-12 control-label padding-10">Amount in RS</label>	                         
	                    <input type="number" class="form-control" id="Login_fees"  title="Only Alphabets Are allow" name="Amount" required>						
	                  </div>                  

	                  <!-- Modal Footer -->
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default"
			                        data-dismiss="modal">
			                            CANCEL
			                </button>
			                <button type="submit" class="btn btn-primary">
			                    Save
			                </button>
			            </div>
	                </form>                
	            </div>            
	        </div>
	    </div>
	</div>
	<script >
		 $(".modal_test_technical ").on("click", function(){
           var dataId = $(this).attr("data-id");
		   var Login_fees=$(this).attr("data-fee");
		   $(".idform").val(dataId);
		   $("#Login_fees").val(Login_fees);
       
    });
	</script>

</div>
</div>
</div>

		
		
