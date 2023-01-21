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
			
			alert('Test');

        } else {
            // error block
        }
    };

    $(document).off('click', '#btnSubmit').on('click', '#btnSubmit', function(e) {
        e.preventDefault();

//T764243|15632|2||60091701|9999999999|test@yahoo.com|20-07-2022|07-10-2022|100|M|ADHO|||||9713751370GPPGFH

var configJson = {
    'tarCall':false,
    'features':{
      'showPGResponseMsg':true,
      'payDetailsAtMerchantEnd':true
    },
    'consumerData':{
      'deviceId': 'WEBSH2',   //possible values 'WEBSH1' or 'WEBSH2'
      'token': 'ca25c3ecb179f82d06059d693b6ad4ad901671ea09e1bdec318d908cead1ed1eab3ca1265e833f98614ef92691d125d9d6eb92599e900c20eb593e95afbeedc5',
      'returnUrl':'https://www.merchanturl.com/response/response.htm',
      'responseHandler':handleResponse,
      'paymentMode': 'UPI',
      'merchantLogoUrl': 'https://www.paynimo.com/CompanyDocs/company-logo-vertical-light.png',  //provided merchant logo will be displayed
      'merchantId': 'L3348',
      'currency': 'INR',
      'txnId': '1453119527492',   //Unique merchant transaction ID
      'items': [{ 'itemId' : 'test', 'amount' : '5', 'comAmt':'0'}],
      'bankCode': '11800',
      'vpa': 'username@bank'
    }
  };

$.pnCheckout(configJson);
           
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