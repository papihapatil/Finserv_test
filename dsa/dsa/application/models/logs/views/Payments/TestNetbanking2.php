<!doctype html>
<html>

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
    'deviceId': 'sha512',   //possible values 'WEBSH1' or 'WEBSH2'
    'token': 'dec89a391153de3dc4807951d5684f701d0108993e9be21b9c943fa9829460927310c3db4d25efc64fddcc495ae5c4244a799971fe0cdc39c1647ef60fa00c9d',
    'returnUrl':'https://www.tekprocess.co.in/MerchantIntegrationClient/MerchantResponsePage.jsp',    //merchant response page URL
    'responseHandler':handleResponse,
    'paymentMode': 'netBanking',  // available payment modes cashCards, emiBanks, netBanking, wallets, MVISA, NEFTRTGS
    'merchantLogoUrl': 'https://www.paynimo.com/CompanyDocs/company-logo-vertical-light.png',  //provided merchant logo will be displayed
    'merchantId': 'L3348', //
    'currency': 'INR',
    'txnId': '1453119527492', //  //Unique merchant transaction ID
    'items': [{ 'itemId' : 'test', 'amount' : '5', 'comAmt':'0'}],
    'bankCode': '470',  //bank code list provided by Worldline
    'accountNo': '1111111111',  ////optional
    'ifscCode': ''  //optional
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