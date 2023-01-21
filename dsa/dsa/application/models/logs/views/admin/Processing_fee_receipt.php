
<?php
if(isset($_SESSION["mode_of_payment"]))
{
 $mode_of_payment = $_SESSION["mode_of_payment"];
}
if(isset($_SESSION['CHEQUE_error']))
{
	$CHEQUE_error = $_SESSION["CHEQUE_error"];
}
else if(isset($_SESSION['NEFT_error']))
{
	$NEFT_error = $_SESSION["NEFT_error"];
}
?>
<body>
<div class="c-body" >
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<div>
											<form class="form-register" action="<?php echo base_url()?>index.php/Cluster_credit_manager/Submit_Processing_fee_details" method="post" enctype="multipart/form-data">
								
												<div class="row col-sm-12">
													<h5>Details For :  <?php echo $customer_info->FN." ".$customer_info->MN." ".$customer_info->LN;?></h5>
												</div>
	        									<hr>
	        									<div class="row col-sm-12">
	        										<div class="col-sm-3">
	        											<div class="form-group">
												    		<label>Select Mode Of Payment</label>
												    		<select class="form-control" name="mode_of_payment" id="mode_of_payment" onchange="Function1()">
												    			<option value="">--Select--</option>
												    			<option value="CHEQUE"
												    			 <?php 
												    			 if(!empty($getCustomerSanction_letter_details->mode_of_payment))
												    			 {
												    			 		if(	$getCustomerSanction_letter_details->mode_of_payment == "CHEQUE")
												    			 		{
												    			 			echo "Selected";
												    			 		}
												    			 } 
												    		?> >CHEQUE</option>
												    			<option value="UPI_NEFT_RTGS"  
												    			<?php 
												    			 if(!empty($getCustomerSanction_letter_details->mode_of_payment))
												    			 {
												    			 		if(	$getCustomerSanction_letter_details->mode_of_payment == "UPI_NEFT_RTGS")
												    			 		{
												    			 			echo "Selected";
												    			 		}
												    			 } 
												    		?>> UPI / NEFT / RTGS </option>
												    			
												    		</select>
												  		</div>
	        										</div>
	        									</div>
	        									<br>
	        									<div class="row col-sm-12" id="div_offline_payment">
															<h5>CHEQUE Payment Details</h5>
														</div>
	        									<hr id="offline_hr">
	        									<div class="row col-sm-12"  >
	        										<div class="col-lg-3" id="div_account_holder_name">
	        											<div class="form-group">
												    		<label>Account Holder Name</label>
												    		<input  type="text" class="form-control" id="account_holder_name" name="account_holder_name" value="<?php if(!empty($customer_info)) { echo $customer_info->FN." ".$customer_info->MN." ".$customer_info->LN;}?>">
												  		</div>
	        									</div>
	        									<div class="col-lg-3" id="div_IFSC_code">
	        										<div class="form-group">
												    		<label>IFSC Code</label>
												    		<input  type="text" class="form-control" id="IFSC_code" name="IFSC_code" value="<?php if(!empty($getCustomerSanction_letter_details->IFSC_code)) echo $getCustomerSanction_letter_details->IFSC_code;?>">
												    	</div>
	        									</div>
	        									<div class="col-lg-3" id="div_branch_name">
	        										<div class="form-group" >
												    		<label>Branch Name</label>
												    		<input  type="text" class="form-control" id="branch_name" name="branch_name" value="<?php if(!empty($getCustomerSanction_letter_details->branch_name)) echo $getCustomerSanction_letter_details->branch_name;?>">
												   		</div>
	        									</div>
	        									<div class="col-lg-3" id="div_bank_name">
	        										<div class="form-group">
												    		<label>Bank Name</label>
												    		<input  type="text" class="form-control" id="bank_name" name="bank_name" value="<?php if(!empty($getCustomerSanction_letter_details->checque_bank_name)) echo $getCustomerSanction_letter_details->checque_bank_name;?>">
												  		</div>
	        									</div>
	        									<div class="col-lg-3" id="div_cheque_number">
	        										<div class="form-group">
												    		<label>Cheque Number</label>
												    		<input  type="text" class="form-control" id="cheque_number" name="cheque_number" value="<?php if(!empty($getCustomerSanction_letter_details->cheque_number)) echo $getCustomerSanction_letter_details->cheque_number;?>">
												   		</div>
	        									</div>
	        									<div class="col-lg-3" id="div_account_type">
	        										<div class="form-group">
												    		<label>Account Type</label>
												    		<select class="form-control" name="account_type" id="account_type" >
												    			<option value="">--Select--</option>
												    			<option value="Saving" <?php if(!empty($getCustomerSanction_letter_details->account_type)) { if($getCustomerSanction_letter_details->account_type == 'Saving') {echo "selected: selected" ; }}?>>Saving</option>
												    			<option value="Current" <?php if(!empty($getCustomerSanction_letter_details->account_type)) { if($getCustomerSanction_letter_details->account_type == 'Current') {echo "selected: selected" ; }}?>>Current</option>
												    		</select>
												   		</div>
	        									</div>
	        									<div class="row col-sm-12" id="div_upi_neft">
															<h5>UPI / NEFT /RTGS Payment Details</h5>
														</div>
	        									<hr id="upi_hr">
	        									<div  class="row" id="div_Transaction_id">
	        										<div class="col-sm-12 col-3">
	        											<div class="form-group">
												    			<label>Transaction Type</label>
												    			<select name="transaction_throught" id="transaction_throught" class="form-control">
												    				<option value="">--Select--</option>
												    				<option value="UPI" <?php if(!empty($getCustomerSanction_letter_details->transaction_throught)) { if($getCustomerSanction_letter_details->transaction_throught == 'UPI') {echo "selected: selected" ; }}?>>UPI</option>
												    				<option value="NEFT" <?php if(!empty($getCustomerSanction_letter_details->transaction_throught)) { if($getCustomerSanction_letter_details->transaction_throught == 'NEFT') {echo "selected: selected" ; }}?>>NEFT</option>
												    				<option value="RTGS" <?php if(!empty($getCustomerSanction_letter_details->transaction_throught)) { if($getCustomerSanction_letter_details->transaction_throught == 'RTGS') {echo "selected: selected" ; }}?>>RTGS</option>
												    			</select>
												  			</div>
	        										</div>
	        										<div class="col-sm-12 col-sm-3">
	        											<div class="form-group">
												    		<label>Transaction ID</label>
												    		<input  type="text" class="form-control" id="Transaction_id" name="Transaction_id" value="<?php if(!empty($getCustomerSanction_letter_details->Transaction_id)) echo $getCustomerSanction_letter_details->Transaction_id;?>">
												  			</div>
	        										</div>

	        									</div>
	        								
	        										<div class="col-sm-4" id="div_processing_cheque">
															<label >Cheque Proof</label>
															<input type="file" class="form-control" id="cheque_doc" name="cheque_doc">
															</div>
																<?php
	        										if(!empty($get_documents ))
	        										{
	        										  foreach($get_documents  as $value)
                                 {
                                 		 if($value->DOC_MASTER_TYPE == 'DISBURSEMENT CHEQUE') 
                                 		 {  
                                 		 	?>
                                 		 	<div class="col-sm-1">
                                 		 		<label >View Doc</label>
                                 		 		<a class="form-control" href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>
                                 		 	</div>
                                 		 	<?php
                                 		 }
                                 }
															}
                                 	?>
	        										
	        										
	        									</div>
	        										<div class="col-sm-3" id="div_processing_fee">
	        											<div class="form-group">
												    		<label>Processing Fee Received Date</label>
												    		<input   type="date" class="form-control" id="payment_recived_date" name="payment_recived_date" value="<?php if(!empty($getCustomerSanction_letter_details->payment_recived_date)) echo $getCustomerSanction_letter_details->payment_recived_date;?>">
												    		<input hidden type="text" class="form-control" id="customer_id" name="customer_id" value="<?php echo $customer_info->UNIQUE_CODE;?>">
												  		</div>
	        										</div>
													<div class="col-sm-3" id="div_fee_amount">
	        											<div class="form-group">
												    		<label>Processing Fee Amount</label>
												    		<input   type="number" class="form-control" id="processing_fee_amount" name="processing_fee_amount" value="<?php if(!empty($getCustomerSanction_letter_details->processing_fee_amount)) echo $getCustomerSanction_letter_details->processing_fee_amount;?>">
												    	</div>
	        										</div>
	        										<div class="col-sm-3">

	        											<button type="submit" class="btn btn-success" style="margin-top: 27px;" value="submit"  id="submit_btn" >Submit</button>
	        											<Lable class="btn btn-info" style="margin-top: 27px;"><a href="<?php echo base_url();?>index.php/Admin/Sanction_letters" style="color:white;">Go Back</a></Lable>
	        										</div>
	        										<div class="col-sm-3">

	        											
	        										</div>

	        										<br>
	        										<div class="col-sm-12">
	        											<div class="col-sm-6">
	        												<?php
	        													 if(isset($CHEQUE_error))
	        													 {
	        													 	if($CHEQUE_error == 'account_holder_name')
	        													 	{
	        													 		?>
	        													 			<h6 style="color:red">Account holder name can not be null.</h6>
	        													 		<?php
	        													 	}
	        													 	else if($CHEQUE_error == 'IFSC_code')
	        													 	{
	        													 		?>
	        													 			<h6 style="color:red">IFSC code can not be null.</h6>
	        													 		<?php
	        													 	}
	        													 	else if($CHEQUE_error == 'branch_name')
	        													 	{
	        													 		?>
	        													 			<h6 style="color:red">Branch name can not be null.</h6>
	        													 		<?php
	        													 	}
	        													 	else if($CHEQUE_error == 'bank_name')
	        													 	{
	        													 		?>
	        													 			<h6 style="color:red">Bank name can not be null.</h6>
	        													 		<?php
	        													 	}
	        													 	else if($CHEQUE_error == 'cheque_number')
	        													 	{
	        													 		?>
	        													 			<h6 style="color:red">Cheque number can not be null.</h6>
	        													 		<?php
	        													 	}
	        													 	else if($CHEQUE_error == 'account_type')
	        													 	{
	        													 		?>
	        													 			<h6 style="color:red">Account type can not be null.</h6>
	        													 		<?php
	        													 	}
	        													 		else if($CHEQUE_error == 'payment_recived_date')
	        													 	{
	        													 		?>
	        													 			<h6 style="color:red">Payment recived date can not be null.</h6>
	        													 		<?php
	        													 	}
	        													 	 unset($_SESSION['CHEQUE_error']);
	        													 }
	        													 else if(isset($_SESSION['CHEQUE_success'] ))
	        													 {
		        													 	$CHEQUE_success = $_SESSION['CHEQUE_success'] ;
		        													 	if($CHEQUE_success == 'Success')
		        													 	{
		        													 		?>
	        													 			<h6 style="color:green">Payment Details Added Successfully</h6>
	        													 		<?php
		        													 	}
		        													 	unset($_SESSION['CHEQUE_success']);
	        													 }



	        													 if(isset($NEFT_error))
	        													 {
	        													 		if($NEFT_error == 'Transaction_id')
	        													 		{
	        													 			?>
	        													 			<h6 style="color:red">Transaction id can not be null.</h6>
	        													 		<?php
	        													 		}
	        													 		else if($NEFT_error == 'payment_recived_date')
	        													 		{
	        													 		?>
	        													 			<h6 style="color:red">Payment recived date can not be null.</h6>
	        													 		<?php
	        													 		}
	        													 		unset($_SESSION['NEFT_error']);
	        													 	}
	        													 	else if(isset($_SESSION['NEFT_success'] ))
		        													{
			        													 	$NEFT_success = $_SESSION['NEFT_success'] ;
			        													 	if($NEFT_success == 'Success')
			        													 	{
			        													 		?>
		        													 			<h6 style="color:green">Payment Details Added Successfully</h6>
		        													 		<?php
			        													 	}
			        													 	unset($_SESSION['NEFT_success']);
		        													 }


	        												?>
	        											</div>
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
	</main>
</div>
</body>
<footer class="c-footer">
<div>Copyright © 2020 Finaleap.</div>
<div class="mfs-auto">Powered by Finaleap</div>
</footer>
</div>

<script>
	$(document).ready(function(){
	 var mode_of_payment= $('#mode_of_payment').val();
    if(mode_of_payment == '')
    {
    	  document.getElementById('div_upi_neft').style.display = 'none';
    	  document.getElementById('upi_hr').style.display = 'none';
    	  document.getElementById('offline_hr').style.display = 'none';
		 		document.getElementById('div_Transaction_id').style.display = 'none';
				document.getElementById('div_offline_payment').style.display = 'none';
				document.getElementById('div_account_holder_name').style.display = 'none';
				document.getElementById('div_branch_name').style.display = 'none';
				document.getElementById('div_bank_name').style.display = 'none';
				document.getElementById('div_cheque_number').style.display = 'none';
				document.getElementById('div_IFSC_code').style.display = 'none';
	  	  document.getElementById('div_account_type').style.display = 'none';//
	  	  document.getElementById('div_processing_fee').style.display = 'none';
		  document.getElementById('div_fee_amount').style.display = 'none';
	  	   document.getElementById('div_processing_cheque').style.display = 'none';
	  	  document.getElementById('submit_btn').style.display = 'none';
    }
    else if(mode_of_payment == 'CHEQUE')
    {
    	    document.getElementById('div_upi_neft').style.display = 'none';
    	  document.getElementById('upi_hr').style.display = 'none';
    	 
		 		document.getElementById('div_Transaction_id').style.display = 'none';
				
    }
    else if(mode_of_payment == 'UPI_NEFT_RTGS')
    {
    	  document.getElementById('offline_hr').style.display = 'none';
    	  document.getElementById('div_offline_payment').style.display = 'none';
				document.getElementById('div_account_holder_name').style.display = 'none';
				document.getElementById('div_branch_name').style.display = 'none';
				document.getElementById('div_bank_name').style.display = 'none';
				document.getElementById('div_cheque_number').style.display = 'none';
				document.getElementById('div_IFSC_code').style.display = 'none';
	  	  document.getElementById('div_account_type').style.display = 'none';//
	  	   document.getElementById('upi_hr').style.display = 'block';
	  	
	  				
    }
});
</script>
<script >
	
	function Function1()
	{
		 var mode_of_payment = document.getElementById("mode_of_payment").value;
		

		 if(mode_of_payment == "CHEQUE")
		 {
		 	 document.getElementById('div_upi_neft').style.display = 'none';
		 	 document.getElementById('div_Transaction_id').style.display = 'none';
		 
       document.getElementById('offline_hr').style.display = 'block';
	  	 document.getElementById('div_offline_payment').style.display = 'block';
			 document.getElementById('div_account_holder_name').style.display = 'block';
			 document.getElementById('div_branch_name').style.display = 'block';
			 document.getElementById('div_bank_name').style.display = 'block';
			 document.getElementById('div_cheque_number').style.display = 'block';
			 document.getElementById('div_IFSC_code').style.display = 'block';
	  	 document.getElementById('div_account_type').style.display = 'block';
	  	 document.getElementById('div_processing_fee').style.display = 'block';
		 document.getElementById('div_fee_amount').style.display = 'block';
	  	 document.getElementById('div_processing_cheque').style.display = 'block';
	  	 document.getElementById('submit_btn').style.display = 'block';

		 }
		 else if(mode_of_payment == "UPI_NEFT_RTGS")
		 {
			
			 document.getElementById('div_upi_neft').style.display = 'block';
			 document.getElementById('upi_hr').style.display = 'block';
       document.getElementById('div_processing_fee').style.display = 'block';
	   document.getElementById('div_fee_amount').style.display = 'block';
        document.getElementById('div_processing_cheque').style.display = 'block';
       document.getElementById('offline_hr').style.display = 'none';
		 	 document.getElementById('div_Transaction_id').style.display = 'block';
			 document.getElementById('div_offline_payment').style.display = 'none';
			 document.getElementById('div_account_holder_name').style.display = 'none';
			 document.getElementById('div_branch_name').style.display = 'none';
			 document.getElementById('div_bank_name').style.display = 'none';
			 document.getElementById('div_cheque_number').style.display = 'none';
			 document.getElementById('div_IFSC_code').style.display = 'none';
	  	 document.getElementById('div_account_type').style.display = 'none';
	  	 document.getElementById('submit_btn').style.display = 'block';


		 }
		 
	};


  </script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>

<script src="<?php echo base_url(); ?>js/main.js"></script>


   
	
       

       

</body>
</html>
