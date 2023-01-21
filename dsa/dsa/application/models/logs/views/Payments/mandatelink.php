<?php

//echo "Payment Form";

//print_r($mandatedetails);


?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
            <link href="<?php echo base_url(); ?>css/style1.css" rel="stylesheet">
			<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
			<script>
			  window.dataLayer = window.dataLayer || [];
			  function gtag(){dataLayer.push(arguments);}
			  gtag('js', new Date());
			  gtag('config', 'UA-118965717-1');
			</script>
<form method="POST" action="<?php echo base_url(); ?>index.php/Payments/webformsubmit" id="dsa_update_profile_one_new_action">
	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				
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
  					<input  id="accountHolderName" name="accountHolderName" placeholder="account Holder Name" readonly class="input-cust-name" value="<?php echo $mandatedetails->fullname; ?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="Mobile Number" class="input-cust-name" id="MobileNumber" name="MobileNumber" readonly value="<?php echo $mandatedetails->phonenumber; ?>">
  				</div>  			  				

  				  			  				
			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				<input  placeholder="ConsumerID *" class="input-cust-name" type="hidden" name="ConsumerID" id="ConsumerID" readonly value="<?php echo $mandatedetails->merchantid; ?>" minlength="3"  <?php //echo $ConsumerID; ?> maxlength="30">
  		
  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email Id *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input  placeholder="E-mail ID *" class="input-cust-name" type="text"  minlength="6" title="E-mail ID" readonly name="EmailID" id="EmailID" oninput="maxLengthCheck(this)" maxlength="46" value="<?php echo $mandatedetails->emailid; ?>">
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
  	
					  					<input required placeholder="Account type *" class="input-cust-name" type="text" readonly name="AccountType" id="AccountType"  value="<?php echo $mandatedetails->accounttype; ?>" minlength="1" maxlength="30">

  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">amount Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
		

  					<input required placeholder="Collection Amount *" class="input-cust-name" type="text" readonly name="amountType" id="amountType"  value="<?php echo $mandatedetails->amounttype; ?>" minlength="1" maxlength="30">

	</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Frequency *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
				<input required placeholder="frequency *" class="input-cust-name" type="text" readonly name="frequency" id="frequency"  value="<?php echo $mandatedetails->frequency; ?>" minlength="1" maxlength="30">


  				</div>  
				
				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Collection End Date *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<input required placeholder="Collection End Date *" class="input-cust-name" type="date" readonly  minlength="1" title="Collection End Date" name="debitEndDate" id="debitEndDate" value="<?php echo $mandatedetails->enddate; ?>" oninput="maxLengthCheck(this)" maxlength="20" >

  				</div>  
  				

			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Collection Amount *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Collection Amount *" class="input-cust-name" type="text" readonly name="CollectionAmount" id="CollectionAmount"  value="<?php echo $mandatedetails->collectionamount; ?>" minlength="1" maxlength="30">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Maximum Collection Amount *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input required placeholder="Maximum Collection Amount *" class="input-cust-name" type="text" readonly  minlength="1" title="Maximum Collection Amount" name="amount" id="amount"  value="<?php echo $mandatedetails->maxamount; ?>" oninput="maxLengthCheck(this)" maxlength="16"  >
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Collection First Date *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<input required placeholder="Collection First Date *" class="input-cust-name" type="date" readonly  minlength="1" title="Collection First Date" name="debitStartDate" id="debitStartDate" oninput="maxLengthCheck(this)" value="<?php echo $mandatedetails->startdate;	?>" maxlength="20" >

  				</div>  
  				

			</div>


			
		</div>		


		

		

					
		

        <div class="row shadow bg-white rounded margin-10 padding-15">		
			<div style="margin-top: 20px;" class="row col-12 justify-content-center">
					<div >
					
						
						<form>

<button id="btnSubmit">Submit</button>
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
								  <?php if(isset($banks)) { foreach($banks as $bank){ ?>
								  '<option value="<?php echo $bank->BANK_NAME; ?>"><?php echo $bank->BANK_NAME; ?></option>'+
								  <?php } } ?>
								  
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
            // success block
        } else if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0398') {
            // initiated block
        } else {
            // error block
        }
    };

    $(document).off('click', '#btnSubmit').on('click', '#btnSubmit', function(e) {
        e.preventDefault();

//T764243|A123|2||Z101|9999999999|test@gmail.com|08-09-2022|31-12-2022|100|M|ADHO|||||9713751370GPPGFH


            var configJson = {
            'tarCall': false,
            'features': {
                 'showPGResponseMsg': true,
				'enableAbortResponse': true,
                'enableNewWindowFlow': true,    //for hybrid applications please disable this by passing false
                'enableExpressPay':true,
                'siDetailsAtMerchantEnd':true,
                'enableSI':true
            },
			
            'consumerData': {
                'deviceId': 'WEBSH2', //possible values 'WEBSH1', 'WEBSH2' and 'WEBMD5'
                //'token':'9dd5cd2c309de4ae3e8ece72e8779a5437a9629cbd65a9e18992f78a1a3bb289e412b013d48355295a28e13f8a1bd7c5891ebd924745cc74f2ffe48088a98418',
				
				'token':'<?php echo $mandatedetails->token; ?>',
                'returnUrl': 'https://finaleap.com/finaleap_finserv/dsa/dsa/index.php/Payments/parseresponse',
                'responseHandler': handleResponse,
                'paymentMode': 'netBanking',
                'merchantLogoUrl': 'https://www.paynimo.com/CompanyDocs/company-logo-md.png',  //provided merchant logo will be displayed
                'merchantId': '<?php echo $mandatedetails->merchantid;  ?>',
                'currency': 'INR',
                'consumerId': '<?php echo $mandatedetails->cosumerid;  ?>',  //Your unique consumer identifier to register a eMandate/eSign
				'consumerMobileNo': '<?php echo $mandatedetails->phonenumber;  ?>',
                'consumerEmailId': '<?php echo $mandatedetails->emailid;  ?>',
                'txnId': '<?php echo $mandatedetails->txnId;  ?>',   //Unique merchant transaction ID
                'items': [{
                    'itemId': 'Test',
                    'amount': '<?php echo $mandatedetails->collectionamount; ?>',
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
                'debitStartDate': '<?php  $startdatearr = explode("-",$mandatedetails->startdate);  echo $startdatearr['2']."-".$startdatearr[1]."-".$startdatearr[0];  ?>',
                'debitEndDate': '<?php  $enddatearr = explode("-",$mandatedetails->enddate);  echo $enddatearr['2']."-".$enddatearr[1]."-".$enddatearr[0];  ?>',
                'maxAmount': '<?php echo $mandatedetails->maxamount;  ?>',
                'amountType': '<?php echo $mandatedetails->amounttype;  ?>',
                'frequency': '<?php echo $mandatedetails->frequency;  ?>'   //  Available options DAIL, Week, MNTH, QURT, MIAN, YEAR, BIMN and ADHO
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


