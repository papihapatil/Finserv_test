<?php

//echo "Payment Form";


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
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Consumer ID *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="ConsumerID *" class="input-cust-name" type="text" name="ConsumerID" id="ConsumerID" value="<?php echo $_REQUEST['ConsumerID']; ?>" minlength="3"  <?php //echo $ConsumerID; ?> maxlength="30">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email Id *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="E-mail ID *" class="input-cust-name" type="text"  minlength="6" title="E-mail ID" name="EmailID" id="EmailID" oninput="maxLengthCheck(this)" maxlength="46" value="<?php echo $_REQUEST['EmailID']; ?>">
  				</div>  
  				<div class="w-100"></div>

  						
				  
  				

			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">account Holder Name *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  id="accountHolderName" name="accountHolderName" placeholder="account Holder Name" class="input-cust-name" value="<?php echo $_REQUEST['accountHolderName']; ?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="Mobile Number" class="input-cust-name" id="MobileNumber" name="MobileNumber" value="<?php echo $_REQUEST['MobileNumber']; ?>">
  				</div>  			  				

  				  			  				
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
					  
					  
					  <option value="Saving" <?php if($_REQUEST['AccountType'] == 'Saving') { echo " selected "; }  ?> >Saving</option>
<option value="Current" <?php if($_REQUEST['AccountType'] == 'Current') { echo " selected "; }  ?> >Current </option>

					  
					</select>  
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">amount Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
<select required class="input-cust-name resi_prop_type" name="amountType" id="amountType" > 
					  <option value="">Select amountType *</option>
					  
					  
					  <option <?php if($_REQUEST['amountType'] == 'M') { echo " selected "; }  ?> value="M">Variable Amount</option>
<option value="F" <?php if($_REQUEST['amountType'] == 'F') { echo " selected "; }  ?> >Fixed Amount </option>

					  
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
<option value="MNTH" <?php if($_REQUEST['frequency'] == 'MNTH') { echo 'selected'; }	?> > Monthly </option>
<option value="QURT"  <?php if($_REQUEST['frequency'] == 'QURT') { echo 'selected'; }	?>  > Quarterly</option>
<option value="MIAN"  <?php if($_REQUEST['frequency'] == 'MIAN') { echo 'selected'; }	?> > Semi annually</option>
<option value="YEAR"  <?php if($_REQUEST['frequency'] == 'Year') { echo 'selected'; }	?> > Yearly</option>
<option value="BIMN"  <?php if($_REQUEST['frequency'] == 'BIMN') { echo 'selected'; }	?> > Bi- monthly</option>
<option value="ADHO"  <?php if($_REQUEST['frequency'] == 'ADHO') { echo 'selected'; }	?> > As and when presented </option>
					  
					</select>

  				</div>  
				
				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Collection End Date *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<input required placeholder="Collection End Date *" class="input-cust-name" type="date"  minlength="1" title="Collection End Date" name="debitEndDate" id="debitEndDate" value="<?php echo $_REQUEST['debitEndDate']; ?>" oninput="maxLengthCheck(this)" maxlength="20" >

  				</div>  
  				

			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Collection Amount *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Collection Amount *" class="input-cust-name" type="text" name="CollectionAmount" id="CollectionAmount"  value="<?php echo $_REQUEST['CollectionAmount'];	?>" minlength="1" maxlength="30">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Maximum Collection Amount *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Maximum Collection Amount *" class="input-cust-name" type="text"  minlength="1" title="Maximum Collection Amount" name="amount" id="amount"  value="<?php echo $_REQUEST['amount'];	?>" oninput="maxLengthCheck(this)" maxlength="16" value="<?php echo $_REQUEST['amount'];	?>" >
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Collection First Date *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<input required placeholder="Collection First Date *" class="input-cust-name" type="date"  minlength="1" title="Collection First Date" name="debitStartDate" id="debitStartDate" oninput="maxLengthCheck(this)" value="<?php echo $_REQUEST['debitStartDate'];	?>" maxlength="20" >

  				</div>  
  				

			</div>


			
		</div>		


		

		

					
		

        <div class="row shadow bg-white rounded margin-10 padding-15">		
			<div style="margin-top: 20px;" class="row col-12 justify-content-center">
					<div >
				
						
						<form>

<button id="btnSubmit">Make a Payment</button>
</form>
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
								  <?php foreach($banks as $bank){ ?>
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
			
        }); 
		 $('#add_banks_row').on('click', '.banks_remove_row_remove', function() {
         $(this).closest("#add_bank_row").remove();
       
        });	
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
 
 
 
 
<!-- Start data -->

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Checkout Demo</title>
<meta name="viewport" content="width=device-width" />

<script src="https://www.paynimo.com/paynimocheckout/client/lib/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://www.paynimo.com/Paynimocheckout/server/lib/checkout.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	
	
    function handleResponse(res) {
        if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0300') {
           
        } else if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0398') {
        
        } else {
          
        }
    };

    $(document).off('click', '#btnSubmit').on('click', '#btnSubmit', function(e) {
        e.preventDefault();




            var configJson = {
            'tarCall': false,
            'features': {
                 'showPGResponseMsg': true,
				'enableAbortResponse': true,
                'enableNewWindowFlow': true,    
                'enableExpressPay':true,
                'siDetailsAtMerchantEnd':true,
                'enableSI':true
            },
			
            'consumerData': {
                'deviceId': 'WEBSH2', 
				'token':'<?php echo $token; ?>',
                'returnUrl': 'https://finaleap.com/finaleap_finserv/dsa/dsa/index.php/Payments/parseresponse',
                'responseHandler': handleResponse,
                'paymentMode': 'netBanking',
                'merchantLogoUrl': 'https://www.paynimo.com/CompanyDocs/company-logo-md.png',  //provided merchant logo will be displayed
                'merchantId': '<?php echo $consumerid; ?>',
                'currency': 'INR',
                'consumerId': '<?php echo $customerid; ?>',  //Your unique consumer identifier to register a eMandate/eSign
				'consumerMobileNo': '<?php echo $MobileNumber; ?>',
                'consumerEmailId': '<?php echo $EmailID; ?>',
                'txnId': '<?php echo $txnId; ?>',   //Unique merchant transaction ID
                'items': [{
                    'itemId': 'TEST',
                    'amount': '<?php echo $CollectionAmount; ?>',
                    'comAmt': '0'
                }],
                'customStyle': {
                    'PRIMARY_COLOR_CODE': '#3977b7',   //merchant primary color code
                    'SECONDARY_COLOR_CODE': '#FFFFFF',   //provide merchant's suitable color code
                    'BUTTON_COLOR_CODE_1': '#1969bb',   //merchant's button background color code
                    'BUTTON_COLOR_CODE_2': '#FFFFFF'   //provide merchant's suitable color code for button text
                },
                //'accountNo': '512345678',    //Pass this if accountNo is captured at merchant side for eMandate/eSign
				//'accountHolderName':'TEST',
				//'accountType': 'Saving',    //  Available options Saving, Current and CC for Cash Credit, only for eSign
                //'accountHolderName': 'Name',  //Pass this if accountHolderName is captured at merchant side for eSign only(Note: For ICICI eMandate registration this is mandatory field, if not passed from merchant Customer need to enter in Checkout UI)
                //'ifscCode': 'ICIC0000001',        //Pass this if ifscCode is captured at merchant side for eSign only
                'debitStartDate': '<?php echo $debitStartDate; ?>',
                'debitEndDate': '<?php echo $debitEndDate; ?>',
                'maxAmount': '<?php echo $amount; ?>',
                'amountType': '<?php echo $amountType; ?>',
                'frequency': '<?php echo $frequency; ?>'   //  Available options DAIL, Week, MNTH, QURT, MIAN, YEAR, BIMN and ADHO
            }
        };
 
        $.pnCheckout(configJson);
        if(configJson.features.enableNewWindowFlow) {
            pnCheckoutShared.openNewWindow();
        }
    });
});
</script>
</head>



<body>




</body>
</html>


