<style>
	.vertical-menu {
  width: 180px; /* Set a width if you like */
}

.vertical-menu a {
  background-color: #eee; /* Grey background color */
  color: black; /* Black text color */
  display: block; /* Make the links appear below each other */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove underline from links */
}

.vertical-menu a:hover {
  background-color: #ccc; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
  background-color: #04AA6D; /* Add a green color to the "active/current" link */
  color: white;
}
</style>
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

<?php 
$total_loan_amount = $sanction_details->total_loan_amount;
$rate_of_interest = $sanction_details->rate_of_interest;
$yearlyinterest = $total_loan_amount * $rate_of_interest/100;
$dailyinterest = $yearlyinterest/360;
$EMI = $sanction_details->EMI;
$Sanctioned_date = $row->Sanctioned_date;
$tenure = $sanction_details->tenure;
if(!empty($disbursement_details))
{
$payment_recived_date = $disbursement_details->disbursement_date;
}
else
{
	$payment_recived_date = date('d-m-Y');
}
$sanctiondatearr = explode("-",$payment_recived_date);
$sanctionmonth = $sanctiondatearr[1];
$nextyear = $sanctiondatearr[0];
$nextmonth = $sanctiondatearr[1];
if($sanctiondatearr[2] > 10)
{
$nextmonth = (int) ($sanctionmonth+1)%12;
if($sanctionmonth == 12)
{
$nextyear = $nextyear+1;
}
}
else
{
$nextmonth = (int)$sanctionmonth;
}
if($nextmonth < 10)
{
$nextmonth = "0".$nextmonth;
}
$nextday = 10;
$nextdate = $nextyear."-".$nextmonth."-".$nextday;
$date1=date_create($payment_recived_date);
$date2=date_create($nextdate);
$diff=date_diff($date1,$date2);
$datediff = $diff->format("%a");
$preemi = $dailyinterest*$datediff;
$preemi = number_format((float)$preemi, 0, '.', '');
?>
<?php
  $total_types=  count($disbursement_property_type_documents);
?>
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
									    <body class="wide comments example">
									    		        <input hidden type="text" value="<?php echo $userID;?>" id="login_user_unique_code">
														<input hidden type="text" value="<?php echo $row->UNIQUE_CODE;?>" id="applicant_unique_code">
														<input hidden type="text" value="<?php echo base64_encode($row->UNIQUE_CODE);?>" id="applicant_encoded_unique_code">
														<input hidden type="text" value="<?php echo  $sanction_details->total_loan_amount ; ?>"id="final_loan_amount">														
											
											<div class="fw-body">
												<div class="content">
													<div class="row" style="padding:20px;margin-top: -20px;">
														
													<div class="col-sm-3"> 
															<h6>Applicant Name <input readonly style="margin-top:15px;" class="form-control" type="text"  value="<?php echo  $row->FN." ".$row->MN." ".$row->LN ; ?>"></h6>
														
														</div>
														<div class="col-sm-3"> 
															<h6>Type of loan <input readonly style="margin-top:15px;" class="form-control" type="text"  value="<?php if($loan_details->LOAN_TYPE == 'lap') { echo "Loan Against Property" ;} else {echo  $loan_details->LOAN_TYPE ; }?>"></h6>
														</div>
														<div class="col-sm-2"> 
															<h6>Sanctioned Amount   <input readonly style="margin-top:15px;" class="form-control" type="text"  value="<?php echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sanction_details->total_loan_amount) ; ?>"></h6>
														 
														</div>
														<div class="col-sm-2"> 
															<h6>Tenure <input readonly style="margin-top:15px;" class="form-control" type="text"  value="<?php echo $sanction_details->tenure." Months"; ?>"></h6>
														</div>
													
														<div class="col-sm-2"> 
															<h6>ROI  <input readonly style="margin-top:15px;" class="form-control" type="text"  value="<?php echo $sanction_details->rate_of_interest." %"; ?>"></h6>
														
														</div>
														<div class="col-sm-3"  style="margin-top:10px;"> 
															<h6>Disbursement Date  <input readonly style="margin-top:15px;" class="form-control" type="text"  value="<?php echo $payment_recived_date; ?>"></h6>
														
														</div>
														<div class="col-sm-3"> 
															<h6>Property insurance amount <input readonly style="margin-top:15px;" class="form-control" type="text"  value="<?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$sanction_details->property_insurance); ?>"></h6>
														</div>
														<div class="col-sm-2"> 
															<h6>Credit shield amount  <input readonly style="margin-top:15px;" class="form-control" type="text"  value="<?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$sanction_details->credit_shield); ?>"></h6>
														 
														</div>
														<div class="col-sm-2"> 
															<h6>Cersai Charges <input readonly style="margin-top:15px;" class="form-control" type="text"  value="<?php  echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",1180); ?>"></h6>
														</div>
													
														<div class="col-sm-2"> 
															<h6>Pre Emi Charges <input readonly style="margin-top:15px;" class="form-control" type="text"  value="<?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$preemi); ?>"></h6>
														
														</div>
																<div class="col-sm-3" style="margin-top:10px;"> 
															<h6>Final Disbursement Amount   
															<input readonly style="margin-top:15px;" class="form-control" type="text"  value="<?php
															   	    /*$total= 0;
																	foreach($find_my_disbursement_amounts_data as $f)
																	{
																	  if( $f->Cheque_status == "Approved")
																		{
																			  $total= $f->total_amount+ $total;
																		}
																		else
																		{
																			  $total= 0 + $total;
																		}
																	}
																	*/
																	$remaining= $sanction_details->Finale_disbursement_amount ;
																	echo $remaining;
																	//echo  $sanction_details->Finale_disbursement_amount;
																	?>">
																	
															</h6>

																
														</div>	
															<div class="col-sm-3" style="margin-top:10px;"> 
															<h6>Pending Disbursement Amount      
															<input readonly style="margin-top:15px;" class="form-control" type="text" name="Pending_disbursement_amount" id="Pending_disbursement_amount" value="<?php
															   	    $total= 0;
																	foreach($find_my_disbursement_amounts_data as $f)
																	{
																	   if( $f->Cheque_status == "Approved")
																		{
																			  $total= $f->total_amount+ $total;
																		}
																		else
																		{
																			  $total= 0 + $total;
																		}
																	}
																	
																	$remaining= $sanction_details->Finale_disbursement_amount-$total ;
																	echo $remaining;
																	?>">
																	
															</h6>
															   <input hidden type="text" name="remaining_amount" id="remaining_amount" value="<?php
															   	    $total= 0;
																	foreach($find_my_disbursement_amounts_data as $f)
																	{
																	  if( $f->Cheque_status == "Approved")
																		{
																			  $total= $f->total_amount+ $total;
																		}
																		else
																		{
																			  $total= 0 + $total;
																		}
																	}
																	
																	$remaining= $sanction_details->Finale_disbursement_amount-$total ;
																	echo $remaining;
																	?>">
																
														</div>														
														<div class="col-sm-4"> 
															<h6>Cheque Amount to be disburse:  <input  readonly style="margin-top:15px;" class="form-control" type="text" name="lable_approved_amount" id="lable_approved_amount" value="<?php
																	//echo "<pre>" ;
																	//print_r($find_my_disbursement_amounts_data); 
																	$total= 0;
																	foreach($find_my_disbursement_amounts_data as $f)
																	{
																		if( $f->Cheque_status == "Approved")
																		{
																			  $total= $f->total_amount + $total;
																		}
																		else
																		{
																			  $total= 0 + $total;
																		}
																	 
																	}
																	
																	echo $total;
																	?>">
																	
															</h6>
														    <input hidden type="text" name="approved_amount" id="approved_amount" value="<?php
																
																	$total= 0;
																	foreach($find_my_disbursement_amounts_data as $f)
																	{
																	   if( $f->Cheque_status == "Approved")
																		{
																			  $total= $f->total_amount+ $total;
																		}
																		else
																		{
																			  $total= 0 + $total;
																		}
																	}
																	
																	echo 	$total;
																	?>">
														</div>				
														<hr>
													</div>
													<br>
													<div class="row" style="padding:20px;margin-top: -20px;">
														<div class="col-sm-12">
															<h5>Add disbursement cheque Details</h5>
														</div>
														<div class="col-sm-12">
										<div>
											<hr>
	        									<div class="row col-sm-12">
	        										<div class="col-sm-3">
	        											<div class="form-group">
												    		<label>Select Mode Of Payment</label>
												    		<select class="form-control" name="mode_of_payment" id="mode_of_payment" onchange="Function1()">
												    			<option value="">--Select--</option>
												    			<option value="CHEQUE" >CHEQUE</option>
												    			<option value="UPI_NEFT_RTGS"  
												    		> UPI / NEFT / RTGS </option>
												    			
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
	        									
	        									<div class="col-lg-3" id="div_cheque_number">
	        										<div class="form-group">
												    		<label>Account Cheque Number</label>
												    		<input  type="number" class="form-control" id="cheque_number" name="cheque_number" value="" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "6">
												   		</div>
	        									</div>
	        									<div class="col-lg-3" id="div_account_type">
	        										<div class="form-group">
												    		<label>Account Type</label>
												    		<select class="form-control" name="account_type" id="account_type" >
												    			<option value="">--Select--</option>
												    			<option value="Saving" >Saving</option>
												    			<option value="Current" >Current</option>
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
												    				<option value="UPI" >UPI</option>
												    				<option value="NEFT" >NEFT</option>
												    				<option value="RTGS" >RTGS</option>
												    			</select>
												  			</div>
	        										</div>
	        										<div class="col-sm-12 col-sm-3">
	        											<div class="form-group">
												    		<label>Transaction ID</label>
												    		<input  type="text" class="form-control" id="Transaction_id" name="Transaction_id" value="">
												  			</div>
	        										</div>
								

	        									</div>
	        									
	        										<div class="col-sm-4" id="div_processing_cheque">
															<label >Attachement</label>
															<input type="file" class="form-control" id="cheque_doc" name="cheque_doc">
															</div>
												
                                
	        										
	        										
	        									</div><br>
													<div class="col-lg-3" id="div_account_holder_name">
	        											<div class="form-group">
												    		<label>Payee name</label>
												    		<input  type="text" class="form-control" id="customer_name" name="customer_name" value="<?php echo  $row->FN." ".$row->MN." ".$row->LN ; ?>">
												  		</div>
	        									</div>
	        									<div id="div_IFSC_code">
	        								
	        									</div>
	        									<div id="div_branch_name">
	        									
	        									</div>
	        									<div class="col-lg-3" id="div_bank_name">
	        										<div class="form-group">
												    		<label>Payee Bank Name</label>
												    		<input  type="text" class="form-control" id="bank_name" name="bank_name" value="">
												  		</div>
	        									</div>
												<div class="col-lg-3">
	        										<div class="form-group" id="total_amount">
												    		<label>Total Amount</label>
												    		<input type="number" class="form-control" id="total_amount_" name="total_amount_" >
												  		
												   		</div>
	        									</div>
	        										<div class="col-sm-3" id="div_processing_fee">
	        											<div class="form-group">
												    		<label>Cheque Handover /NEFT Transfered Date</label>
												    		<input   type="date" class="form-control" id="amount_handover_date" name="amount_handover_date" value="">
												    		<input hidden type="text" class="form-control" id="customer_id" name="customer_id" value="">
												  		</div>
	        										</div>
													
	        										<div class="col-sm-3">
	        											<button type="submit" class="btn btn-success" style="margin-top: 27px;" value="submit"  id="submit_btn" onclick="submit_checque_details();" >Submit</button>
	        											</div>
	        										<div class="col-sm-3">
											
	        										</div>

	        										<br>
	        										<div class="col-sm-12">
	        											<div class="col-sm-6">
	        											
	        											</div>
	        										</div>
													 <div >
																		<br>
																		<h5>Payment Mode - CHEQUE</h5>
																		<div style="overflow-x:auto;">
																		 <table class="table table-bordered" >
																			<thead>
																			  <tr>
																			
																				<th>Payee Name</th>
																				<th>Payee Bank Name</th>
																				<th>Account Cheque Number</th>
																				<th>Account Type</th>
																				<th>Total Amount</th>
																				<th>Cheque Handover Date</th>
																		
																				<th>Status</th>
																				<th>Action</th>
																				   <th>Attachement</th>
																			  </tr>
																			</thead>
																			<tbody id="section_show_data">
																			  
																			</tbody>
																			
																		  </table>
																		  </div>
																		  <br>
																		<h5>Payment Mode - UPI / NEFT / RTGS</h5>
																		<div style="overflow-x:auto;">
																		 <table class="table table-bordered">
																			<thead>
																			  <tr>
																				<th>Mode Of Payment</th>
																				<th>Transaction ID</th>
																				<th>Total Amount</th>
																				<th>NEFT Transfered Date</th>
																				<th>Status</th>
																				<th>Action</th>
																				<th>Attachement</th>
																			  </tr>
																			</thead>
																			<tbody id="section_show_UPI_data">
																			  
																			</tbody>
																			
																		  </table>
																		 </div>
																	</div>
														</div>
													</div>
												</div>
	    									</div>
										</body>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	
	<footer class="c-footer">
		<div>Copyright © 2020 Finaleap.</div>
		<div class="mfs-auto">Powered by Finaleap</div>
	</footer>
</div>
<script>
   function UploadFile(value)
	{
		swal( "Success!","Please wait ","success");
		var UploadFile_for_cheque_no = value;
		var login_user_unique_code = document.getElementById('login_user_unique_code').value;
        var applicant_unique_code = document.getElementById('applicant_unique_code').value;
        var cheque_doc=  $('#upload_new_doc_'+value+'').val();
		var fileSelect = document.getElementById('upload_new_doc_'+value+'');
		var cheque_doc_ = fileSelect.files[0];
		//alert(cheque_doc_);
		let formData = new FormData();  
		formData.append("file",cheque_doc_);
		formData.append("UploadFile_for_cheque_no",UploadFile_for_cheque_no);
		 formData.append("login_user_unique_code",login_user_unique_code);
             formData.append("applicant_unique_code",applicant_unique_code);//
		
		$.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Admin/upload_new_cheque_file"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
								window.location.reload(true);
                     			swal( "Success!","Document Uploded","success");
								
                     		}
                     	
                     }
              }); 
		
	}
	
	
	
	
$(document).ready(function(){
	 var applicant_unique_code = document.getElementById('applicant_unique_code').value;
                          $.ajax({
									type:'POST',
									url:'<?php echo base_url("index.php/Disbursement_OPS/find_my_disbursement_amounts"); ?>',
									data:{
										'applicant_unique_code':applicant_unique_code
										},
									success:function(data)
										{
												var obj =JSON.parse(data);
     											var tr = '';
												var tr1='';
												var status='';
												var delete_='';
												var save_btn='';
												var Document='';
												var delete_='';
												
													  
												 $.each(obj.find_my_disbursement_amounts_data, function(key, value)
												 {
													 var upload_btn= '<table><tr><td><input type="file" name="upload_new_doc" id="upload_new_doc_'+value.id+'"></td><td><button  id="upload_btn'+value.id+'"  class="btn btn-outline-primary" onclick="UploadFile('+value.id+'); " > upload btn </button></td></tr></table>';
												
													if(value.Cheque_status == 'applied')
													{
														status="Waiting for Approval";
														delete_= '';
													
														
													}
													else
													{
														status = '<b>'+value.Cheque_status+'</b><br>Comments : '+value.cheque_comments+'';
													}
													
													
													
													
													if(value.Cheque_status== 'Approved')
													{
														save_btn = '<button class="btn btn-outline-success"  title="Save Details"  id="save_btn_'+value.id+'"> <i class="fa fa-save"></i> </button>';
													      delete_= '';
													
													}
													else if(value.Cheque_status== 'Send Back')
													{
														save_btn = '<button  class="btn btn-outline-warning"  title="Save Details" onclick="save_details('+value.id+');" id="save_btn_'+value.id+'"> <i class="fa fa-save"></i> </button>';
													  if(value.document_inserted_id != '')
													  {
													   delete_= '<button id="delete-button_'+value.id+'"  class="btn btn-outline-primary" onclick="DeleteFile('+value.document_inserted_id+'); " > Delete File </button>';
													   
													  }
													  else
													  {
														  delete_= '';
													  }
													}
													else if(value.Cheque_status== 'Rejected')
													{
														save_btn = '<button class="btn btn-outline-danger"  title="Save Details"  id="save_btn_'+value.id+'"> <i class="fa fa-save"></i> </button>';
														    delete_= '';
													
													}
													else 													
													{
														save_btn = '<button class="btn btn-outline-secondary"  title="Save Details"  id="save_btn_'+value.id+'"> <i class="fa fa-save"></i> </button>';
														
													}
													
													if(value.account_type == 'Saving')
													{
														account_type = '<select class="form-control" name="account_type" id="account_type_'+value.id+'"><option value="Saving" Selected>Saving</option><option value="Current">Current</option></select>';
													}
													else if(value.account_type == 'Current')
													{
														account_type = '<select class="form-control" name="account_type" id="account_type_'+value.id+'"><option value="Saving" >Saving</option><option value="Current" Selected>Current</option></select>';
													}
													
													if(value.document_inserted_id != '')
													{
														Document ='<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/'+value.document_inserted_id+'" target="_blank" style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
													}
													else 
													{
													    Document ='<a href="" target="_blank" style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
													
													}
													
													if(value.mode_of_payment != "UPI_NEFT_RTGS")
													{													
													  tr += '<tr><td ><lable ><input type="text" class="form-control" id="customer_name_'+value.id+'" value="' + value.customer_name + '"></td><td ><lable ><input type="text" class="form-control" id="checque_bank_name_'+value.id +'" value="' + value.checque_bank_name + '"></lable></td><td><input type="number" class="form-control" value="' + value.cheque_number + '" id="cheque_number_'+value.id+'" ></td><td>'+account_type+'</td><td><lable ><input type="number" class="form-control" id="total_amount_'+value.id +'" value="'+value.total_amount+'"></lable></td><td><lable ><input type="date" class="form-control" id="amount_handover_date_'+value.id+'" value="'+value.amount_handover_date+'"></lable></td><td>'+status+'</td><td>'+save_btn+'</td><td>'+Document+'</td><td>'+delete_+' '+upload_btn+'</td></tr>';
													  $('#section_show_data').html(tr);
													}
													else //if(value.mode_of_payment != "CHEQUE")
													{
													  tr1 += '<tr><td ><lable ><input type="text" class="form-control" id="transaction_throught_'+value.id +'" value="' + value.transaction_throught + '"></lable></td><td ><lable ><input type="text" class="form-control" value="' + value.Transaction_id + '" id="Transaction_id_'+value.id+'"></lable></td><td ><lable ><input type="number" class="form-control" id="total_amount_'+value.id +'" value="' + value.total_amount + '"></lable></td><td ><lable ><input type="date" class="form-control" id="amount_handover_date_'+value.id +'" value="' + value.amount_handover_date + '"></lable></td><td>'+status+'</td><td>'+save_btn+'</td><td>'+Document+'</td><td>'+delete_+' '+upload_btn+'</td></tr>';
													  $('#section_show_UPI_data').html(tr1);
													}
													  
									              });
							 
											
										}
								});
});

function submit_checque_details()
{
	var Pending_disbursement_amount = $("#Pending_disbursement_amount").val();
	var total_amount= $('#total_amount_').val(); //lable_approved_amount
	var lable_approved_amount = $('#lable_approved_amount').val();
	//	alert(lable_approved_amount);
	
	//exit();	
	var mode_of_payment = document.getElementById('mode_of_payment').value;
	if(mode_of_payment == 'CHEQUE' )
	{  
		swal("Success!","Please wait ","success");
		var customer_name= $('#customer_name').val();
		var bank_name= $('#bank_name').val();
		var cheque_number= $('#cheque_number').val();
		var account_type= $('#account_type').val();
		var cheque_doc= $('#cheque_doc').val();
		var fileSelect = document.getElementById('cheque_doc');
		var cheque_doc_ = fileSelect.files[0];
    	var login_user_unique_code = document.getElementById('login_user_unique_code').value;
        var applicant_unique_code = document.getElementById('applicant_unique_code').value;
		var amount_handover_date= $('#amount_handover_date').val();
		if(customer_name == '')
		{
			swal( "Warning!","Please enter customer name","warning");
			exit();
		}
		else if(bank_name == '')
		{
			swal( "Warning!","Please enter bank name","warning");
			exit();
		}
		else if(cheque_number == '')
		{
			swal( "Warning!","Please enter cheque number","warning");
			exit();
		}
		else if(account_type == '')
		{
			swal( "Warning!","Please select account type","warning");
			exit();
		}
		else if(total_amount == '')
		{
			swal( "Warning!","Please enter total amount","warning");
			exit();
		}
		else if(amount_handover_date == '')
		{
			swal( "Warning!","Please select amount handover date","warning");
			exit();
		}
		else
		{


		
			//swal( "Success!","Shabbash!!","success");
			//alert(cheque_doc.files[0]);
			 let formData = new FormData();  
			 formData.append("file",cheque_doc_);
			 formData.append("customer_name", customer_name);
             formData.append("bank_name", bank_name);
	         formData.append("cheque_number", cheque_number);
	         formData.append("account_type", account_type);
			 formData.append("total_amount", total_amount);
			 formData.append("amount_handover_date", amount_handover_date);
			 formData.append("login_user_unique_code",login_user_unique_code);
             formData.append("applicant_unique_code",applicant_unique_code);//
			 formData.append("mode_of_payment",mode_of_payment);
			 $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_disbursement_amount_details"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                       				var post_lable_approved_amount = parseInt(lable_approved_amount) + parseInt(total_amount);
									$('#lable_approved_amount').val(post_lable_approved_amount);
									var post_Pending_disbursement_amount = parseInt(Pending_disbursement_amount) -  parseInt(total_amount);
									$('#Pending_disbursement_amount').val(post_Pending_disbursement_amount);
                      			swal( "Success!","Details saved successfully","success");
								$.ajax({
									type:'POST',
									url:'<?php echo base_url("index.php/Disbursement_OPS/find_my_disbursement_amounts"); ?>',
									data:{
										'applicant_unique_code':applicant_unique_code
										},
									success:function(data)
										{
												var obj =JSON.parse(data);
     											var tr = '';
												var Document='';
												 $.each(obj.find_my_disbursement_amounts_data, function(key, value)
												 {
													if(value.Cheque_status == 'applied')
													{
														status="Waiting for Approval";
														
													}
													else
													{
														status = '<b>'+value.Cheque_status+'</b><br>Comments : '+value.cheque_comments+'';
													}

													if(value.Cheque_status== 'Approved')
													{
														save_btn = '<button class="btn btn-outline-success"  title="Save Details"  id="save_btn_'+value.id+'"> <i class="fa fa-save"></i> </button>';
													}
													else if(value.Cheque_status== 'Send Back')
													{
														save_btn = '<button  class="btn btn-outline-warning"  title="Save Details" onclick="save_details('+value.id+');" id="save_btn_'+value.id+'"> <i class="fa fa-save"></i> </button>';
													}
													else if(value.Cheque_status== 'Rejected')
													{
														save_btn = '<button class="btn btn-outline-danger"  title="Save Details"  id="save_btn_'+value.id+'"> <i class="fa fa-save"></i> </button>';
													}
													else 													
													{
														save_btn = '<button class="btn btn-outline-secondary"  title="Save Details"  id="save_btn_'+value.id+'"> <i class="fa fa-save"></i> </button>';
													}
													
													if(value.account_type == 'Saving')
													{
														account_type = '<select class="form-control" name="account_type" id="account_type_'+value.id+'"><option value="Saving" Selected>Saving</option><option value="Current">Current</option></select>';
													}
													else if(value.account_type == 'Current')
													{
														account_type = '<select class="form-control" name="account_type" id="account_type_'+value.id+'"><option value="Saving" >Saving</option><option value="Current" Selected>Current</option></select>';
													}
													
													if(value.document_inserted_id != '')
													{
														Document ='<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/'+value.document_inserted_id+'" target="_blank" style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
													}
													else 
													{
													    Document ='<a href="" target="_blank" style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
													
													}
													
													  if(value.mode_of_payment != "UPI_NEFT_RTGS")
													{													
													  tr += '<tr><td ><lable ><input type="text" class="form-control" id="customer_name_'+value.id+'" value="' + value.customer_name + '"></lable></td><td ><lable ><input type="text" class="form-control" id="checque_bank_name_'+value.id +'" value="' + value.checque_bank_name + '"></lable></td><td><input type="number" class="form-control" value="' + value.cheque_number + '" id="cheque_number_'+value.id+'" ></td><td>'+account_type+'</td><td><lable ><input type="number" class="form-control" id="total_amount_'+value.id+'" value="'+value.total_amount+'"></lable></td><td><lable ><input type="date" class="form-control" id="amount_handover_date_'+value.id +'" value="'+value.amount_handover_date +'"></lable></td><td>'+status+'</td><td>'+save_btn+'</td><td>'+Document+'</td></tr>';
													  $('#section_show_data').html(tr);
													}
													
														
								 

													});
							 
											
										}
								});
								
                     		}
							else if(obj.status == 'loan_amount_error')
							{
								swal( "Warning!","Invalid total amount","warning");
								exit();
							}
							else if(obj.status == 'Invalid_cheque_number')
							{
								swal( "Warning!","Invalid Cheque Number","warning");
								exit();
							}
							
							
                     		
                     }
              }); 
			
		}
		
		
		
	}
	else if(mode_of_payment == 'UPI_NEFT_RTGS')
	{
		swal( "Success!","Please wait ","success");
		var transaction_throught= $('#transaction_throught').val();
		var cheque_doc= $('#cheque_doc').val();
	
		var Transaction_id= $('#Transaction_id').val();
    	var customer_name= $('#customer_name').val();
		var bank_name= $('#bank_name').val();
		var amount_handover_date= $('#amount_handover_date').val();
		var login_user_unique_code = document.getElementById('login_user_unique_code').value;
        var applicant_unique_code = document.getElementById('applicant_unique_code').value;
		
		var fileSelect = document.getElementById('cheque_doc');
		var cheque_doc_ = fileSelect.files[0];
		
		if(transaction_throught == '')
		{
			swal( "Warning!","Please select transaction type","warning");
		}
		
		else if(Transaction_id == '')
		{
			swal( "Warning!","Please enter transaction ID","warning");
		}
		else if(total_amount == '')
		{
			swal( "Warning!","Please enter total amount","warning");
		}
		else if(amount_handover_date == '')
		{
			swal( "Warning!","Please select amount handover date","warning");
		}
		else if(customer_name == '')
		{
			swal( "Warning!","Please enter customer name","warning");
			exit();
		}
		
		else if(bank_name == '')
		{
			swal( "Warning!","Please enter bank name","warning");
			exit();
		}
		else
		{
			
			var post_lable_approved_amount = parseInt(lable_approved_amount) + parseInt(total_amount);
			$('#lable_approved_amount').val(post_lable_approved_amount);
			var post_Pending_disbursement_amount = parseInt(Pending_disbursement_amount) -  parseInt(total_amount);
			$('#Pending_disbursement_amount').val(post_Pending_disbursement_amount);
		
			
			let formData = new FormData();  
			 formData.append("file",cheque_doc_);
			 formData.append("transaction_throught", transaction_throught);
             formData.append("Transaction_id", Transaction_id);
	    	 formData.append("total_amount", total_amount);
			 formData.append("amount_handover_date", amount_handover_date);
			 formData.append("login_user_unique_code",login_user_unique_code);
             formData.append("applicant_unique_code",applicant_unique_code);//
			 formData.append("mode_of_payment",mode_of_payment);
			 	 formData.append("customer_name", customer_name);
             formData.append("bank_name", bank_name);
			 $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_disbursement_amount_details"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                       			
                      			swal( "Success!","Details saved successfully","success");
								$.ajax({
									type:'POST',
									url:'<?php echo base_url("index.php/Disbursement_OPS/find_my_disbursement_amounts"); ?>',
									data:{
										'applicant_unique_code':applicant_unique_code
										},
									success:function(data)
										{
												var obj =JSON.parse(data);
     											var tr1 = '';
												var Document='';
												 $.each(obj.find_my_disbursement_amounts_data, function(key, value)
												 {
													if(value.Cheque_status == 'applied')
													{
														status="Waiting for Approval";
														
													}
													else
													{
														status = '<b>'+value.Cheque_status+'</b><br>Comments : '+value.cheque_comments+'';
													}
													if(value.Cheque_status== 'Approved')
													{
														save_btn = '<button class="btn btn-outline-success"  title="Save Details"  id="save_btn_'+value.id+'"> <i class="fa fa-save"></i> </button>';
													}
													else if(value.Cheque_status== 'Send Back')
													{
														save_btn = '<button  class="btn btn-outline-warning"  title="Save Details" onclick="save_details('+value.id+');" id="save_btn_'+value.id+'"> <i class="fa fa-save"></i> </button>';
													}
													else if(value.Cheque_status== 'Rejected')
													{
														save_btn = '<button class="btn btn-outline-danger"  title="Save Details"  id="save_btn_'+value.id+'"> <i class="fa fa-save"></i> </button>';
													}
													else 													
													{
														save_btn = '<button class="btn btn-outline-secondary"  title="Save Details"  id="save_btn_'+value.id+'"> <i class="fa fa-save"></i> </button>';
													}
													
													if(value.document_inserted_id != '')
													{
														Document ='<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/'+value.document_inserted_id+'" target="_blank" style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
													}
													else 
													{
													    Document ='<a href="" target="_blank" style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
													
													}
													
													 if(value.mode_of_payment != "CHEQUE")
													{													
													  tr1 += '<tr><td ><lable ><input type="text" class="form-control" id="transaction_throught_'+value.id +'" value="' + value.transaction_throught + '"></lable></td><td ><lable ><input type="text" class="form-control" value="' + value.Transaction_id + '" id="Transaction_id_'+value.id+'"></lable></td><td ><lable ><input type="number" class="form-control" id="total_amount_'+value.id +'" value="' + value.total_amount + '"></lable></td><td ><lable ><input type="date" class="form-control" id="amount_handover_date_'+value.id +'" value="' + value.amount_handover_date + '"></lable></td><td>'+status+'</td><td>'+save_btn+'</td><td>'+Document+'</td></tr>';
													  $('#section_show_UPI_data').html(tr1);
													
													}	
								 

													});
							 
											
										}
								});
                     		}
							else if(obj.status == 'loan_amount_error')
							{
								swal( "Warning!","Invalid total amount","warning");
							}
                     		
                     }
              }); 
		}
	}
	
    //var applicant_unique_code = document.getElementById('applicant_unique_code').value;
	//let formData = new FormData(); 
	// formData.append("login_user_unique_code",login_user_unique_code);
   //  formData.append("applicant_unique_code",applicant_unique_code);
}
</script>
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
	    document.getElementById('total_amount').style.display = 'none';
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
	  //document.getElementById('div_account_holder_name').style.display = 'none';
	  document.getElementById('div_branch_name').style.display = 'none';
	 // document.getElementById('div_bank_name').style.display = 'none';
	  document.getElementById('div_cheque_number').style.display = 'none';
	  document.getElementById('div_IFSC_code').style.display = 'none';
	  document.getElementById('div_account_type').style.display = 'none';//
	 
	  document.getElementById('upi_hr').style.display = 'block';
	  	
	  				
    }
});
</script>
<script >
function delete_cheque(id)
	{
		//alert(id);
		$.ajax({
									type:'POST',
									url:'<?php echo base_url("index.php/Disbursement_OPS/delete_cheque_entry"); ?>',
									data:{
										'id':id
										},
									success:function(data)
										{
												var obj =JSON.parse(data);
     											if(obj.status == "success")
												{
													swal( "Success!","Entry Deleted","success");
													var applicant_unique_code = document.getElementById('applicant_unique_code').value;
													//alert(applicant_unique_code);
													 $.ajax({
																type:'POST',
																url:'<?php echo base_url("index.php/Disbursement_OPS/find_my_disbursement_amounts"); ?>',
																data:{
																	'applicant_unique_code':applicant_unique_code
																	},
																success:function(data)
																	{
																			var obj =JSON.parse(data);
																			var tr = '';
																			var tr1='';
																			//alert(obj.find_my_disbursement_amounts_data);
																			if(obj.find_my_disbursement_amounts_data == '')
																			{
																				tr += '<tr><td ><lable ></lable></td><td ><lable ></lable></td><td ><lable ></lable></td><td><lable ></lable></td><td><lable ></lable></td><td></td></tr>';
																				  $('#section_show_data').html(tr);
																				  
																				  tr1 += '<tr><td ><lable ></lable></td><td ><lable ></lable></td><td ><lable ></lable></td><td></td></tr>';
																				  $('#section_show_UPI_data').html(tr1);
																			}
																			else
																			{
																				
																			
																			 $.each(obj.find_my_disbursement_amounts_data, function(key, value)
																			 {
																				
																				
																				if(value.mode_of_payment != "UPI_NEFT_RTGS")
																				{													
																				  tr += '<tr><td><lable ><input type="text" class="form-control" id="customer_name_'+value.id+'" value="' + value.customer_name + '"></lable></td><td ><lable ><input type="text" class="form-control" id="checque_bank_name_'+value.id +'" value="' + value.checque_bank_name + '"></lable></td><td><lable >'+value.total_amount+'</lable></td><td><lable >'+value.amount_handover_date +'</lable></td><td>'+value.Cheque_status+'</td><td><i class="fa fa-trash" style="color:red" onclick="delete_cheque(' + value.id + ');"></i></td></tr>';
																				  $('#section_show_data').html(tr);
																				}
																				else if(value.mode_of_payment != "CHEQUE")
																				{
																					tr1 += '<tr><td ><lable >' + value.transaction_throught + '</lable></td><td ><lable >' + value.total_amount + '</lable></td><td ><lable >' + value.amount_handover_date + '</lable></td><td>'+value.Cheque_status+'</td><td><i class="fa fa-trash" style="color:red" onclick="delete_cheque(' + value.id + ');"></i></td></tr>';
																				  $('#section_show_UPI_data').html(tr1);
																				}
																			   

																				});
																			}
																		
																	}
															});
												}
												
							 
											
										}
								});
	};
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
			   document.getElementById('total_amount').style.display = 'block';
	  	    document.getElementById('div_processing_cheque').style.display = 'block';
	  	    document.getElementById('submit_btn').style.display = 'block';
  	    }
		else if(mode_of_payment == "UPI_NEFT_RTGS")
		{
			
							
		
		    document.getElementById('div_upi_neft').style.display = 'block';
			document.getElementById('upi_hr').style.display = 'block';
            document.getElementById('div_processing_fee').style.display = 'block';
			document.getElementById('total_amount').style.display = 'block';
            document.getElementById('div_processing_cheque').style.display = 'block';
            document.getElementById('offline_hr').style.display = 'none';
		 	document.getElementById('div_Transaction_id').style.display = 'block';
			document.getElementById('div_offline_payment').style.display = 'none';
			document.getElementById('div_account_holder_name').style.display = 'block';
			document.getElementById('div_branch_name').style.display = 'none';
			document.getElementById('div_bank_name').style.display = 'block';
			document.getElementById('div_cheque_number').style.display = 'none';
			document.getElementById('div_IFSC_code').style.display = 'none';
	  	    document.getElementById('div_account_type').style.display = 'none';
	  	    document.getElementById('submit_btn').style.display = 'block';
		 }
		 
	};


  </script>
  
  <script>
function save_details(id)
{
	var action ="from_OPS";
	var login_user_unique_code = document.getElementById('login_user_unique_code').value;
    var applicant_unique_code = document.getElementById('applicant_unique_code').value;
	var cheque_id=id;
	
	var mode_of_payment_=$("#mode_of_payment_"+id).val();
	var Cheque_status_=$("#Cheque_status_"+id).val();
	var Transaction_id_=$("#Transaction_id_"+id).val();
	var total_amount_=$("#total_amount_"+id).val();
	var comments_=$("#comments_"+id).val();
	var amount_handover_date_=$("#amount_handover_date_"+id).val();
    var customer_name_=$("#customer_name_"+id).val();
    var checque_bank_name_=$("#checque_bank_name_"+id).val(); //
	var cheque_number_=$("#cheque_number_"+id).val(); //
	var account_type_=$("#account_type_"+id).val(); //
	var transaction_throught_=$("#transaction_throught_"+id).val();
	let formData = new FormData(); 
    formData.append("mode_of_payment_",mode_of_payment_);
    formData.append("Cheque_status_",Cheque_status_);
	formData.append("Transaction_id_",Transaction_id_);
	formData.append("total_amount_",total_amount_);
	formData.append("amount_handover_date_",amount_handover_date_);
	formData.append("customer_name_",customer_name_);
	formData.append("checque_bank_name_",checque_bank_name_);
	formData.append("comments_",comments_);
	formData.append("cheque_number_",cheque_number_);
	formData.append("account_type_",account_type_);
	formData.append("transaction_throught_",transaction_throught_);
	
	formData.append("login_user_unique_code",login_user_unique_code);
	formData.append("applicant_unique_code",applicant_unique_code);
	formData.append("cheque_id",cheque_id);
	
	formData.append("action",action);
	 
	$.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Admin/update_cheque_details"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			swal( "Success!","Details Updated","success");
                     		}
                     	
                     }
              }); 
	 
	
	
	




}


function DeleteFile(value)
	{
		swal( "Success!","Please wait ","success");
	 var Delete_Document_number = value;
	 let formData = new FormData(); 
     formData.append("Delete_Document_number",Delete_Document_number);
	 $.ajax({
                type: "POST",
                url:'<?php echo base_url("index.php/admin/delete_disbursement_cheque_document"); ?>',
                data:formData,
                processData: false,
                contentType: false,
                success: function (response) 
                {
               		var obj =JSON.parse(response);
               		if(obj.status == 'success')
               		{
               			swal( "Success!","Document Deleted Successfully","success");
						window.location.reload(true);
               		}
                }
              }); 
	}
	
 
	
</script>



<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
</body>
</html>
