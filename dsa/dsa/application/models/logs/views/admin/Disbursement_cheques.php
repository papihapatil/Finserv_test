
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

$disbursed= 0;
																	foreach($find_my_disbursement_amounts_data as $f)
																	{
																		if( $f->Cheque_status == "Approved")
																		{
																			  $disbursed= $f->total_amount + $disbursed;
																		}
																		else
																		{
																			  $disbursed= 0 + $disbursed;
																		}
																	 
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
																			
												<div class="row col-sm-12">
													<input hidden type="text" value="<?php echo $customer_info->UNIQUE_CODE;?>" id="applicant_unique_code">
													<input hidden type="text" value="<?php echo $userID;?>" id="login_user_unique_code">
												</div>
												<div class="row" style="padding:20px;margin-top: -20px;">
														
														<div class="col-sm-12" > 
														<h5>Disbursement Amount Process</h5>
														<hr>
														</div>
															
														<br>
														<div class="col-sm-3"> 
															<h6>Applicant Name <input readonly style="margin-top:15px;" class="form-control" type="text"  value="<?php echo  $customer_info->FN." ".$customer_info->MN." ".$customer_info->LN ; ?>"></h6>
														
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
															       
																	echo $sanction_details->Finale_disbursement_amount ;
																	/* $total= 0;
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
																	
																	$remaining= ($sanction_details->loan_amount )-$total -1180 -$preemi;
																	echo $remaining; */
																	?>">
																	
															</h6>

																
														</div>														
														<div class="col-sm-3" style="margin-top:10px;"> 
															<h6>Pending Disbursement Amount   
															<input readonly style="margin-top:15px;" class="form-control" type="text" name="loan_amount_including_all" id="loan_amount_including_all" value="<?php
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
																	
																	//$remaining= $sanction_details->Finale_disbursement_amount - $disbursed;
																	echo 0;
																	?>">
																	
															</h6>

																
														</div>														
														<div class="col-sm-3"  style="margin-top:10px;"> 
															<h6>Disbursed Amount  	<input  readonly style="margin-top:15px;" class="form-control" type="text" name="cheque_approved_amount" id="cheque_approved_amount" value="<?php
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
														    
														</div>
														
														<hr>
													</div>
	        									<br>
												                        <h5 style="padding:20px;margin-top: -20px;">Payment Mode - CHEQUE</h5>
																	    <table class="table table-bordered" style="padding:20px;margin-top: -20px;" >
																			<thead>
																			  <tr>
																				
																				<th>Payee Name</th>
																				<th>Payee Bank Name</th>
																				<th>Account Cheque Number</th>
																				<th>Account Type</th>
																				<th>Amount in Rs.</th>
																				<th>Cheque handover date</th>
																		        <th>Comments</th>
																				<th>Status</th>
																				<th>Update</th>
																				<th>Attachement</th>
																			  </tr>
																			</thead>
																			<tbody id="section_show_data">
																			  
																			</tbody>
																			
																		  </table>
																		  
																		  <br>
																		 <h5 style="padding:20px;margin-top: -20px;">Payment Mode - UPI / NEFT / RTGS</h5>
																		 <table class="table table-bordered">
																			<thead>
																			  <tr>
																			
																				<th>Transaction ID</th>
																				<th>Payee Name</th>
																				<th>Payee Bank Name</th>
																				<th>Transaction Mode</th>
																				<th>Amount in Rs.</th>
																				<th>NEFT Transfered Date</th>
																				<th>Comments</th>
																				<th>Status</th>
																			   <th>Update</th>
																			   <th>Attachement</th>
																			  </tr>
																			</thead>
																			<tbody id="section_show_UPI_data">
																			</tbody>
																			
																		  </table>
	        								
	        								
        								</div>
										 <h5 style="padding:20px;margin-top: -20px;">Accounts Decleration </h5>
										 <?php
									
																					if(!empty($sanction_details))
																					{
																						if(!empty($sanction_details->Accounts_confirmation_status))
																						{
																								if($sanction_details->Accounts_confirmation_status == "Disbursed" )
																								{
																									?>
																									 <h6 style="padding:20px;margin-top: -20px;">This is the confirmation for all the loan amount is disbursed . 	<button type="button" class="btn btn-info">Application Disbursed</button>
																									<?php
																								}
																								else
																								{
																									?>
																										   <h6 style="padding:20px;margin-top: -20px;">This is the confirmation for all the loan amount is disbursed . 	<button type="button" class="btn btn-info" onclick="accounts_confirm_status();" id="btn_confirm"><lable id="confirm_btn">Confirm</lable></button><h6>
									
																									<?php
																								}
																							?>
																							<?php
																						}
																						else
																						{
																							?>
																									   <h6 style="padding:20px;margin-top: -20px;">This is the confirmation for all the loan amount is disbursed . 	<button type="button" class="btn btn-info" onclick="accounts_confirm_status();" id="btn_confirm"><lable id="confirm_btn">Confirm</lable></button><h6>
									
																							<?php
																						}
																					}
																					
																					?>
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
function accounts_confirm_status()
{
	 var loan_amount_including_all=$("#loan_amount_including_all").val();
	if(loan_amount_including_all != 0)
	{
			 swal( "Warning!","Please match the Final Disbursement Amount and Disbursed Amount","warning");
			 exit;
	}
	else
	{
	 var applicant_unique_code =document.getElementById('applicant_unique_code').value;
	  var login_user_unique_code =document.getElementById('login_user_unique_code').value;
	 var status="Disbursed";
	 let formData = new FormData(); 
	 formData.append("applicant_unique_code",applicant_unique_code);
	  formData.append("login_user_unique_code",login_user_unique_code);
	 formData.append("status",status);
	 $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_Disbursement_status"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			 swal( "Success!","Application sent for the disbursement.","success");
									$("#confirm_btn").html("Application Disbursed");					  
								 // window.location.reload(true);
					
                     		}
                     	
                     }
              });
	}
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
												var payment_mode='';
												var account_type='';
												var save_btn='';
												var Document='';
												var transaction_throught='';
												 $.each(obj.find_my_disbursement_amounts_data, function(key, value)
												 {
													 if(value.Cheque_status == 'applied')
													{
														status='<select  class="form-control " id="Cheque_status_'+value.id+'" onchange="change_status('+value.id+')"><option selected>Select</option><option value="Approved" >Approve</option><option value="Send Back" >Send Back</option><option value="Rejected" >Reject</option></select>';
														
													}
													
													else if(value.Cheque_status == 'select')
													{
														status='<select  class="form-control " id="Cheque_status_'+value.id+'" onchange="change_status('+value.id+')"><option selected>Select</option><option value="Approved" >Approve</option><option value="Send Back" >Send Back</option><option value="Rejected" >Reject</option></select>';
														
													}
													else if(value.Cheque_status == 'Approved')
													{
														status='<select  class="form-control " id="Cheque_status_'+value.id+'" ><option selected>Select</option><option value="Approved" selected>Approve</option><option value="Send Back" >Send Back</option><option value="Rejected" >Reject</option></select>';
														
													}
													else if(value.Cheque_status == 'Send Back')
													{
														status='<select  class="form-control " id="Cheque_status_'+value.id+'"onchange="change_status('+value.id+')"><option selected>Select</option><option value="Approved" >Approve</option><option value="Send Back" selected>Send Back</option><option value="Rejected" >Reject</option></select>';
														
													}
													else if(value.Cheque_status == 'Rejected')
													{
														status='<select  class="form-control " id="Cheque_status_'+value.id+'" onchange="change_status('+value.id+')"><option selected>Select</option><option value="Approved" >Approve</option><option value="Send Back" >Send Back</option><option value="Rejected" selected>Rejected</option></select>';
														
													}
													
													if(value.mode_of_payment == 'CHEQUE')
													{
														payment_mode = '<select class="form-control" name="mode_of_payment" id="mode_of_payment_'+value.id+'"><option value="CHEQUE" Selected>CHEQUE</option><option value="UPI_NEFT_RTGS"> UPI / NEFT / RTGS </option></select>';
													}
													else 
													{
													    payment_mode = '<select class="form-control" name="mode_of_payment" id="mode_of_payment_'+value.id+'"><option value="CHEQUE" >CHEQUE</option><option value="UPI_NEFT_RTGS" Selected> UPI / NEFT / RTGS </option></select>';
												
													}
													
													
													if(value.account_type == 'Saving')
													{
														account_type = '<select class="form-control" name="account_type" id="account_type_'+value.id+'"><option value="Saving" Selected>Saving</option><option value="Current">Current</option></select>';
													}
													else if(value.account_type == 'Current')
													{
														account_type = '<select class="form-control" name="account_type" id="account_type_'+value.id+'"><option value="Saving" >Saving</option><option value="Current" Selected>Current</option></select>';
													}
													
													
													if(value.transaction_throught == 'UPI')
													{
														transaction_throught = '<select class="form-control" name="transaction_throught" id="transaction_throught_'+value.id+'"><option value="UPI" Selected>UPI</option><option value="NEFT">NEFT</option><option value="RTGS">RTGS</option></select>';
													}
													else if(value.transaction_throught == 'NEFT')
													{
														transaction_throught = '<select class="form-control" name="transaction_throught" id="transaction_throught_'+value.id+'"><option value="UPI" >UPI</option><option value="NEFT" Selected>NEFT</option><option value="RTGS">RTGS</option></select>';
													}
													else if(value.transaction_throught == 'RTGS')
													{
														transaction_throught = '<select class="form-control" name="transaction_throught" id="transaction_throught_'+value.id+'"><option value="UPI" >UPI</option><option value="NEFT">NEFT</option><option value="RTGS" Selected>RTGS</option></select>';
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
													else 													{
														save_btn = '<button class="btn btn-outline-primary"  title="Save Details" onclick="save_details('+value.id+');" id="save_btn_'+value.id+'"> <i class="fa fa-save"></i> </button>';
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
													  tr += '<tr><td><lable ><input hidden type="text" id="payment_mode_'+value.id+'" value="'+value.mode_of_payment +'" ><input type="text" class="form-control" id="customer_name_'+value.id+'" value="' + value.customer_name + '"></lable></td><td ><lable ><input type="text" class="form-control" id="checque_bank_name_'+value.id +'" value="' + value.checque_bank_name + '"></lable></td><td><input type="number" class="form-control" value="' + value.cheque_number + '" id="cheque_number_'+value.id+'" ></td><td>'+account_type+'</td><td><lable ><input type="text" class="form-control" id="total_amount_'+value.id+'" value="'+value.total_amount+'"></lable></td><td><lable ><input type="date" class="form-control" value="'+value.amount_handover_date +'" id="amount_handover_date_'+value.id+'"></lable></td><td><textarea class="form-control" row="3" id="comments_'+value.id+'">' + value.cheque_comments + '</textarea></td><td>'+status+'</td><td>'+save_btn+'</td><td>'+Document+'</td></tr>';
													  $('#section_show_data').html(tr);
													}
													else //if(value.mode_of_payment != "CHEQUE")
													{
													  tr1 += '<tr><td><lable ><input hidden type="text" id="payment_mode_'+value.id+'" value="'+value.mode_of_payment +'" ><input type="text" class="form-control" value="' + value.Transaction_id + '" id="Transaction_id_'+value.id+'"></lable></td><td><input type="text" class="form-control" id="customer_name_'+value.id+'" value="' + value.customer_name + '"></lable></td><td ><lable ><input type="text" class="form-control" id="checque_bank_name_'+value.id +'" value="' + value.checque_bank_name + '"></lable></td><td>'+transaction_throught+'</td><td ><lable ><input type="text" class="form-control" value="' + value.total_amount + '" id="total_amount_'+value.id+'"></lable></td><td ><lable ><input type="date" class="form-control"  value="' + value.amount_handover_date + '" id="amount_handover_date_'+value.id+'" ></lable></td><td><textarea class="form-control" row="3"id="comments_'+value.id+'">' + value.cheque_comments + '</textarea></td><td>'+status+'</td><td>'+save_btn+'</td><td>'+Document+'</td></tr>';
													  $('#section_show_UPI_data').html(tr1);
													}
													  
									              });
							 
											
										}
								});
});
</script>
<script>
function change_status(id)
{
	 var Cheque_status_=$("#Cheque_status_"+id).val();
	 var loan_amount_including_all=$("#loan_amount_including_all").val();
	 var cheque_approved_amount=$("#cheque_approved_amount").val();
	 var total_amount_=$("#total_amount_"+id).val();

	 if(Cheque_status_ == "Approved" )
	{
			var action ="from_accounts";
	var login_user_unique_code = document.getElementById('login_user_unique_code').value;
    var applicant_unique_code = document.getElementById('applicant_unique_code').value;
	var cheque_id=id;
	
	var mode_of_payment_=$("#payment_mode_"+id).val();
	//alert(mode_of_payment_);
	var Cheque_status_=$("#Cheque_status_"+id).val();
	if(Cheque_status_ == '')
	{
		 swal( "Warning!","Please select status","warning");
		 exit;
	}
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
								window.location.reload(true);
                     		}
                     	
                     }
              }); 
			  
			 post_loan_amount_including_all = parseInt(loan_amount_including_all) - parseInt(total_amount_);
			 post_cheque_approved_amount = parseInt(cheque_approved_amount) + parseInt(total_amount_);
			 if(post_loan_amount_including_all < 0)
			 {
				 swal( "Warning!","Disbursement amount can nit be gretter than pending amount","warning");
				  $("#btn_confirm").hide(); //
				  $("#Cheque_status_"+id).val('Select');
				   
			 }
			 else
			 {
				  $("#loan_amount_including_all").val(post_loan_amount_including_all);
				    $("#cheque_approved_amount").val(post_cheque_approved_amount);
					  $("#btn_confirm").show(); 
				  
			 }
			
			 
			
			 // $("#lable_remaining").html(post_remaining_amount);
	}
	else if(Cheque_status_ == "Rejected" )
	{
		var action ="from_accounts";
	var login_user_unique_code = document.getElementById('login_user_unique_code').value;
    var applicant_unique_code = document.getElementById('applicant_unique_code').value;
	var cheque_id=id;
	
	var mode_of_payment_=$("#payment_mode_"+id).val();
	var Cheque_status_=$("#Cheque_status_"+id).val();
	if(Cheque_status_ == '')
	{
		 swal( "Warning!","Please select status","warning");
		 exit;
	}
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
								window.location.reload(true);
                     		}
                     	
                     }
              }); 
          	window.location.reload(true);
	}
	else
	{
		var action ="from_accounts";
	var login_user_unique_code = document.getElementById('login_user_unique_code').value;
    var applicant_unique_code = document.getElementById('applicant_unique_code').value;
	var cheque_id=id;
	
	var mode_of_payment_=$("#payment_mode_"+id).val();
	var Cheque_status_=$("#Cheque_status_"+id).val();
	if(Cheque_status_ == '')
	{
		 swal( "Warning!","Please select status","warning");
		 exit;
	}
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
								window.location.reload(true);
                     		}
                     	
                     }
              }); 
	}
}
function save_details(id)
{
	var action ="from_accounts";
	var login_user_unique_code = document.getElementById('login_user_unique_code').value;
    var applicant_unique_code = document.getElementById('applicant_unique_code').value;
	var cheque_id=id;
	
	var mode_of_payment_=$("#payment_mode_"+id).val();
	var Cheque_status_=$("#Cheque_status_"+id).val();
	if(Cheque_status_ == '')
	{
		 swal( "Warning!","Please select status","warning");
		 exit;
	}
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
