<html> 
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>


<?php

require('config.php');
require('razorpay-php/Razorpay.php');



use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);
     $payment_id=array();
	 $fail_refund_id=array();
   foreach($response as $res)
   {
	  
		$refund = $api->refund->create(array('payment_id' => $res));
		if($refund)
		{
         $payment_id[]=$res;
		}
		else
		{
			$fail_refund_id[]=$res;
		}
   }
    $_SESSION['payment_id'] =$payment_id;
	$_SESSION['fail_refund_id'] =$fail_refund_id;
	redirect(base_url('index.php/front/save_auto_refund_details'));

?>

</body>
</html>

  
