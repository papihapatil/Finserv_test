<?php 
$algo = "sha512"; //sha256, sha512, md5

//consumerData.merchantId|consumerData.txnId|totalamount|consumerData.accountNo|consumerData.consumerId|consumerData.consumerMobileNo|consumerData.consumerEmailId |consumerData.debitStartDate|consumerData.debitEndDate|consumerData.maxAmount|consumerData.amountType|consumerData.frequency|consumerData.cardNumber|consumerData. expMonth|consumerData.expYear|consumerData.cvvCode|SALT [Salt will be given by TechProcess Payment Services Ltd. (Part of Ingenico Group)]

 $data = "T764243|123456|1|30360235847|c123|999999999|test@gmail.com|30-07-2022|31-07-2022|1000|M|MNTH|||||9713751370GPPGFH";

  $token = hash($algo, $data);

?>

<!doctype html>
<html>

<head>
    <title>Checkout Demo</title>
    <meta name="viewport" content="width=device-width" />
    <script src="https://www.paynimo.com/paynimocheckout/client/lib/jquery.min.js" type="text/javascript"></script>
</head>

<body>

    <button id="btnSubmit">Make a Payment</button>

    <script type="text/javascript" src="https://www.paynimo.com/Paynimocheckout/server/lib/checkout.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            function handleResponse(res) {
                if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0300') {
					alert("success");
					return false;
                    // success code
                } else {
					alert("Error");
					return false;
                    // error code
                }
            };

            $(document).off('click', '#btnSubmit').on('click', '#btnSubmit', function(e) {
                e.preventDefault();

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
                        'deviceId': 'WEBSH2',	//possible values 'WEBSH1', 'WEBSH2' and 'WEBMD5'
                        'token': '<?php echo $token;?>',	
                        //'returnUrl': 'https://www.tekprocess.co.in/MerchantIntegrationClient/MerchantResponsePage.jsp',
                        'responseHandler': handleResponse,
                        'paymentMode': 'all',
                        'merchantLogoUrl': 'https://www.paynimo.com/CompanyDocs/company-logo-md.png',  //provided merchant logo will be displayed
                        'merchantId': '1234',
                        'consumerId': 'c123',
                        'consumerMobileNo': '999999999',
                        'consumerEmailId': 'test@gmail.com',
                        'txnId': '123456',   //Unique merchant transaction ID
                       'items': [{
                            'itemId': 'first',
                            'amount': '4',
                            'comAmt': '0'
                        }],
                        'customStyle': {
                            'PRIMARY_COLOR_CODE': '#3977b7',   //merchant primary color code
                            'SECONDARY_COLOR_CODE': '#FFFFFF',   //provide merchant's suitable color code
                            'BUTTON_COLOR_CODE_1': '#1969bb',   //merchant's button background color code
                            'BUTTON_COLOR_CODE_2': '#FFFFFF' 
						},							//provide merchant's suitable color code for button text
			   'accountNo': '30360235847',    //Pass this if accountNo is captured at merchant side for eMandate/eSign
                             'accountType': 'Saving',    //  Available options Saving, Current and CC for Cash Credit, only for eSign
                           'accountHolderName': 'TEST',  //Pass this if accountHolderName is captured at merchant side for eSign only(Note: For ICICI eMandate registration this is mandatory field, if not passed from merchant Customer need to enter in Checkout UI)
            		    'ifscCode': 'SBIN0000305',        //Pass this if ifscCode is captured at merchant side for eSign only
			    'debitStartDate': '30-07-2022',
			    'debitEndDate': '31-07-2022',
			    'maxAmount': '1000',
			    'amountType': 'M',
			    'frequency': 'MNTH'   //  Available options DAIL, Week, MNTH, QURT, MIAN, YEAR, BIMN and ADHO
                        
                    }
                };

                $.pnCheckout(configJson);
                if(configJson.features.enableNewWindowFlow){
                    pnCheckoutShared.openNewWindow();
                }
            });
        });
    </script>
</body>

</html>