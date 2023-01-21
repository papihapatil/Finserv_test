<!doctype html>
<html>

<head>
<title>Checkout Demo</title>
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1" / />
<script src="https://www.paynimo.com/Paynimocheckout/client/lib/jquery.min.js" type="text/javascript"></script>
</head>

<body>

<button id="btnSubmit">Make a Payment</button>
<script>
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
    'enableExpressPay':true,
    'enableSI':true,
    'payDetailsAtMerchantEnd':true
  },
  'consumerData':{
    'deviceId': 'WEBSH2', //possible values 'WEBSH1', 'WEBSH2' and 'WEBMD5'
    'token': 'ca25c3ecb179f82d06059d693b6ad4ad901671ea09e1bdec318d908cead1ed1eab3ca1265e833f98614ef92691d125d9d6eb92599e900c20eb593e95afbeedc5',
    'returnUrl':'https://www.merchanturl.com/response/response.htm',
    'responseHandler':handleResponse,
    'paymentMode': 'netBanking',
    'merchantLogoUrl': 'https://www.paynimo.com/CompanyDocs/company-logo-md.png',  //provided merchant logo will be displayed
    'merchantId': 'T764243',
    'currency': 'INR',
    'consumerId': 'c9',  //Your unique consumer identifier to register a NPCI eNACH
    'txnId': '1453119527492',   //Unique merchant transaction ID
    'items': [{ 'itemId' : 'test', 'amount' : '5', 'comAmt':'0'}],
    'bankCode': '11050',  //bank code captured from merchant end[bank codelist provided by Worldline]
    'accountNo': '1111111111'  //Mandatory to register NPCI eNACH
  }
};

//$.pnCheckout(configJson);
if(configJson.features.enableNewWindowFlow){
    pnCheckoutShared.openNewWindow();
}

 });
 
 
 });
</script>