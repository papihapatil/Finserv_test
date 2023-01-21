<!doctype html>
<html>
<?php echo $txnId; ?>
<head>
    <title>Checkout Demo</title>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1" />
    <script src="https://www.paynimo.com/paynimocheckout/client/lib/jquery.min.js" type="text/javascript"></script>
</head>

<body>

    <button id="btnSubmit">Make a Payment</button>

    <script type="text/javascript" src="https://www.paynimo.com/paynimocheckout/server/lib/checkout.js"></script>

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

              var configJson = {
  'tarCall':false,
  'features':{
    'showPGResponseMsg':true,
    'enableNewWindowFlow': true,    //for hybrid applications please disable this by passing false
    'payDetailsAtMerchantEnd':true
  },
  'consumerData':{
    'deviceId': 'WEBSH2',   //possible values 'WEBSH1' or 'WEBSH2'
    'token': '<?php echo $token; ?>',
    'returnUrl':'https://www.tekprocess.co.in/MerchantIntegrationClient/MerchantResponsePage.jsp',    //merchant response page URL
    'responseHandler':handleResponse,
    'paymentMode': '<?php echo $paymentMode; ?>',  // available payment modes cashCards, emiBanks, netBanking, wallets, MVISA, NEFTRTGS
    'merchantLogoUrl': 'https://www.paynimo.com/CompanyDocs/company-logo-vertical-light.png',  //provided merchant logo will be displayed
    'merchantId': '<?php echo $merchantId; ?>',
    'currency': 'INR',
    'txnId': '<?php echo $txnId; ?>',   //Unique merchant transaction ID
	
	//'txnId': 'Test',
    'items': [{ 'itemId' : 'First', 'amount' : '<?php echo $amount; ?>', 'comAmt':'<?php echo $comAmt; ?>'}],
    'bankCode': '<?php echo $bankCode; ?>',  //bank code list provided by Worldline
    'accountNo': '<?php echo $accountNo; ?>',  //optional
    'ifscCode': '<?php echo $ifscCode; ?>',
	'totalamount': '<?php echo $totalamount; ?>',
	'mandateRegType' : '<?php echo "create"; ?>',
	'consumerMobileNo':'<?php echo $consumerMobileNo; ?>',
	'consumerEmailId': '<?php echo $consumerEmailId; ?>',
	'debitStartDate': '<?php echo $debitStartDate; ?>',
	'debitEndDate' : '<?php echo $debitEndDate; ?>',
	'maxAmount' : '<?php echo $maxAmount; ?>',
	'amountType' : '<?php echo $amountType; ?>',
	'frequency' : '<?php echo $frequency; ?>',
	'cardNumber' : '<?php echo $cardNumber; ?>',
	'expMonth' : '<?php echo $expMonth; ?>',
	'expYear' : '<?php echo $expYear; ?>',
	'cvvCode' : '<?php echo $cvvCode; ?>',
	'debitDay' : '<?php echo "10";  ?>'
		//optional
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