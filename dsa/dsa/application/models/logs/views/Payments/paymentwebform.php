<?php

 $total_loan_amount = $sanction_details->total_loan_amount;

/* /echo "Payment Form";

//print_r($row->UNIQUE_CODE);
//echo "<pre>";
//print_r($sanction_details);
echo "<br> Total loan amount = ";
  echo $total_loan_amount = $sanction_details->total_loan_amount;

//echo "<br>";
echo "<br>Rate of interest = ";
echo $rate_of_interest = $sanction_details->rate_of_interest;
echo "<br> Yearly interest amount = ";
echo $yearlyinterest = $total_loan_amount * $rate_of_interest/100;

 //echo $yearlyinterest." interst <br>"; 
echo "<br> Daily interest amount = ";
echo $dailyinterest = $yearlyinterest/365;

//echo $dailyinterest."<br>";

 $EMI = $sanction_details->EMI;

$Sanctioned_date = $row->Sanctioned_date;

$Sanctioned_date = "2022-09-30";

 $tenure = $sanction_details->tenure;

echo "<br> Payment Receied date = ";
 echo $payment_recived_date = $sanction_details->payment_recived_date;


$sanctiondatearr = explode("-",$payment_recived_date);

//print_r($sanctiondatearr);

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



//echo $nextmonth;

$nextdate = $nextyear."-".$nextmonth."-".$nextday;

$date1=date_create($payment_recived_date);
$date2=date_create($nextdate);
$diff=date_diff($date1,$date2);
$datediff = $diff->format("%a");

echo "<br> date differance = ".$datediff;

$preemi = $dailyinterest*$datediff;

$preemi = number_format((float)$preemi, 2, '.', '');

echo "<br>Pre emi = ".$preemi;

*/

?>
<form method="POST" action="<?php echo base_url(); ?>index.php/Payments/webformsubmit" id="dsa_update_profile_one_new_action">
	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				Update personal details
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div>
						<span class="shadow align-middle dot"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></span>				
					</div>
					
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
								
					<div>
						<span class="align-middle dot-white"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></span>
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
					
					<div style="font-size: 10px; margin-right: 20px; color: black;">
						Documents
					</div>
				</div>	
			</div>
		</div>
		

		

		

		<!-- work details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Customer Information</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;"></span>

			</div>
			<div class="w-100"></div>

			<div class="col-12" style="margin-bottom: 20px; color: black; font-size: 14px;">
				<span>Customer Information *</span>

			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">account Holder Name *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  id="accountHolderName" name="accountHolderName" placeholder="account Holder Name" class="input-cust-name" value="<?php echo $row->FN." ".$row->LN; ?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="Mobile Number" class="input-cust-name" id="MobileNumber" name="MobileNumber" value="<?php echo $row->MOBILE; ?>">
  				</div>  			  				

  				  			  				
			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				
  				
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email Id *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
				<input  placeholder="ConsumerID *" readonly class="input-cust-name" type="hidden" name="ConsumerID" id="ConsumerID" value="T764243" minlength="3" maxlength="30">
  					<input  placeholder="E-mail ID *" class="input-cust-name" type="text"  minlength="6" title="E-mail ID" name="EmailID" id="EmailID" oninput="maxLengthCheck(this)" maxlength="46" value="<?php echo $row->EMAIL; ?>">
  				</div>  
  				<div class="w-100"></div>

  						
				  
  				

			</div>

			

			
		</div>		
		
		
		<!-- work details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Mandate Information </span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;"></span>

			</div>
			<div class="w-100"></div>

			<div class="col-12" style="margin-bottom: 20px; color: black; font-size: 14px;">
				<span>Mandate Information
 *</span>

			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  				
<select required class="input-cust-name resi_prop_type" name="AccountType" > 
					  <option value="">Select Account Type *</option>
					  
					  
					  <option value="Saving" selected >Saving</option>
<option value="Current"  >Current </option>

					  
					</select>  
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">amount Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
<select required class="input-cust-name resi_prop_type" name="amountType" > 
					  <option value="">Select amountType *</option>
					  
					  
					  <option value="M">Variable Amount</option>
<option value="F" selected >Fixed Amount </option>

					  
					</select>  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Frequency *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					
					
					<select required class="input-cust-name resi_prop_type" name="frequency" > 
					  <option value="">Select frequency *</option>
					  
					  
					  <option value="DAIL">Daily</option>
<option value="WEEK">Weekly </option>
<option value="MNTH" selected > Monthly </option>
<option value="QURT" > Quarterly</option>
<option value="MIAN" > Semi annually</option>
<option value="YEAR" > Yearly</option>
<option value="BIMN" > Bi- monthly</option>
<option value="ADHO" > As and when presented </option>
					  
					</select>

  				</div>  
				
				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Collection End Date *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<input required placeholder="Collection End Date *" class="input-cust-name" type="date"  minlength="1" title="Collection End Date" name="debitEndDate" id="debitEndDate" oninput="maxLengthCheck(this)" maxlength="20" >

  				</div>  
  				

			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Collection Amount *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Collection Amount *" class="input-cust-name" type="text" name="CollectionAmount" id="CollectionAmount" value="<?php echo "1"; ?>" minlength="1" maxlength="30">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Maximum Collection Amount *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Maximum Collection Amount *" class="input-cust-name" type="text"  minlength="1" title="Maximum Collection Amount" name="amount" id="amount" oninput="maxLengthCheck(this)" maxlength="16" value="<?php if($total_loan_amount < 1000000) { echo $total_loan_amount;  } else { echo "1000000";  }  ?>">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Collection First Date *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<input required placeholder="Collection First Date *" class="input-cust-name" type="date"  minlength="1" title="Collection First Date" name="debitStartDate" id="debitStartDate" oninput="maxLengthCheck(this)" maxlength="20" >

  				</div>  
  				

			</div>


			
		</div>		


		

		

					
		

        <div class="row shadow bg-white rounded margin-10 padding-15">		
			<div style="margin-top: 20px;" class="row col-12 justify-content-center">
					<div >
						<a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried">
						<input type="hidden" name="userid" id="userid" value="<?php echo $row->UNIQUE_CODE; ?>">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
						
							CONTINUE
						</button></a>
					</div>		
				</div>
		</div>

	</div>
</form>
<script type="text/javascript">
function add_row()
{
 $rowno=$("#employee_table tr").length;
 $rowno=$rowno+1;
 $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='Acc_name[]' placeholder='Bank Acc Name' class='input-cust-name'></td><td><select class='input-cust-name' name='Acc_type[]'><option  value=''>Account Type</option><option  value='Current'>Current</option><option  value='Saving'>Saving</option></select></td><td><input type='text' name='Branch_name[]' placeholder='Enter Branch name' class='input-cust-name'></td><td><input type='text' name='IFSC_code[]' placeholder='IFSC code' class='input-cust-name'></td><td><input type='text' name='Acc_number[]' placeholder='Account Number' class='input-cust-name'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"') style='color: red;' class='add-more'></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
<script>
	 $(document).ready(function () {
                
                $('#debitStartDate').datepicker({
					autoclose: true,
					endDate: new Date(new Date().setDate(new Date().getDate())),
					constrainInput: true,
					format: 'yyyy-mm-dd'  
				
                }); 

				$('#debitEndDate').datepicker({
					autoclose: true,
					endDate: new Date(new Date().setDate(new Date().getDate())),
					constrainInput: true,
					format: 'yyyy-mm-dd'  
				
                });  
            
            });
	
</script>
<script>
	 $(document).ready(function () {
                
                $('#debitStartDate').datepicker({
					autoclose: true,
					endDate: new Date(new Date().setDate(new Date().getDate())),
					constrainInput: true,
					format: 'yyyy-mm-dd'  
				
                });  
            
            });
	$("#add_bank").click(function(e){
            e.preventDefault ? e.preventDefault() : (e.returnValue = false);         
            var clone = '<div class="w-100"></div>  '+
			            '<div  class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="add_bank_row">'+
							'<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">'+ 
								'<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Bank Details *</span>'+
							'</div>'+
							'<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">'+
								'<select required class="input-cust-name resi_prop_type" name="bank[]" placeholder="Select Bank Name" style="margin-top:8px;" >'+
								  '<option value="">Select Bank Name *</option>'+
								  <?php $banks = array(); foreach($banks as $bank){ ?>
								  '<option value="<?php echo $bank->BANK_NAME; ?>"><?php echo $bank->BANK_NAME; ?></option>'+
								  <?php }?>
								  
								'</select>'+
							'</div>'+
							'<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">'+
							'<input style="margin-top: 8px;" placeholder="DSA Code" class="input-cust-name" type="text" name="dsa_code[]" id="" value="" >'+
								
							'</div>'+
							'<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">'+
								'<input class="banks_remove_row_remove other-income-select" type="button" value="DELETE" style="margin-left:4px; color: red;" >'+
							'</div>'+
			            '</div>';
						
						
            $("#add_banks_row").append(clone);
			//alert("hi");
        }); 
		 $('#add_banks_row').on('click', '.banks_remove_row_remove', function() {
         $(this).closest("#add_bank_row").remove();
         //alert("hi");
        });	
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>


