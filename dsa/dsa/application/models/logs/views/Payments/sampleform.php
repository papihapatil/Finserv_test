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
				
				'token':'<?php echo $token; ?>',
                'returnUrl': 'https://www.tekprocess.co.in/MerchantIntegrationClient/MerchantResponsePage.jsp',
                'responseHandler': handleResponse,
                'paymentMode': 'netBanking',
                'merchantLogoUrl': 'https://www.paynimo.com/CompanyDocs/company-logo-md.png',  //provided merchant logo will be displayed
                'merchantId': 'L764243',
                'currency': 'INR',
                'consumerId': 'Z109',  //Your unique consumer identifier to register a eMandate/eSign
				'consumerMobileNo': '9960763466',
                'consumerEmailId': 'jaykumar.nimbalkar@gmail.com',
                'txnId': 'A129',   //Unique merchant transaction ID
                'items': [{
                    'itemId': 'Test',
                    'amount': '2',
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
                'debitStartDate': '06-09-2022',
                'debitEndDate': '31-12-2022',
                'maxAmount': '5',
                'amountType': 'M',
                'frequency': 'ADHO'   //  Available options DAIL, Week, MNTH, QURT, MIAN, YEAR, BIMN and ADHO
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
<form>

<button id="btnSubmit">Make a Payment</button>
</form>



</body>
</html>