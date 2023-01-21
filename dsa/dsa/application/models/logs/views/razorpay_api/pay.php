<html> 
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>

<?php

require('config.php');
require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

$cname=$this->session->userdata['userdata']['fname']." ".$this->session->userdata['userdata']['lname'];
$cemail=$this->session->userdata['userdata']['email'];
$cmob=$this->session->userdata['userdata']['mobile'];
if(isset($credit_buerau_price)){$amount=$credit_buerau_price;}else{if(isset($aadhar_esign_price)){$amount=$aadhar_esign_price; $_SESSION['aadhar_esign']='aadhar_esign';} else{$amount=$loan_application_amount; $_SESSION['loan_application']='loan_application';}}

$orderData = [
    'receipt'         => 3456,
    'amount'          => $amount * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

  

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Finaleap PVT LTD",
    "description"       => "",
    "image"             => base_url('assets/images/logo.jpg'),
    "prefill"           => [
    "name"              => $cname,
    "email"             => $cemail,
    "contact"           => $cmob,
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

?>
<form action="<?php if(isset($id)){ echo base_url('index.php/front/verify_payment_getway?UID='.$id);}else{ echo base_url('index.php/front/verify_payment_getway');}?>" method="POST">
 <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script type="text/javascript">
$(document).ready(function(){
    $(".razorpay-payment-button").click(); 
	$(".razorpay-payment-button").hide(); 
});
</script>
  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['amount']?>"
    data-currency="INR"
    data-name="<?php echo $data['name']?>"
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-prefill.name="<?php echo $data['prefill']['name']?>"
    data-prefill.email="<?php echo $data['prefill']['email']?>"
    data-prefill.contact="<?php echo $data['prefill']['contact']?>"
    data-notes.shopping_order_id="3456"
    data-order_id="<?php echo $data['order_id']?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  
  </script>

  <input type="hidden" name="shopping_order_id" value="3456">
</form>
</body>
</html>

  
