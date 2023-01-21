
<html> 
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>

	<?php
 
  $message = $this->session->flashdata('warning');   if (isset($message)) {
		if($message=='warning'){
       echo '<script>
     swal({
	  title: "warning!",
	  text: "Your payment failed. \n '.$error.'",
	  type: "warning",
	  });
	</script>';
		$this->session->unset_userdata('warning');	 } 
       
		}
    
	
	?>
<?php

require('config.php');



require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
       
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
  
	
		$_SESSION['razorpay_payment_id']=$_POST['razorpay_payment_id'];
echo '<script>
     swal({
  title: "success!",
  text: "Your payment was successful \n Payment ID:'.$_POST['razorpay_payment_id'].'",
  type: "success",
  }).then(function(){ window.location.href = "'.base_url('index.php/front/save_payent_details?UID='.$id).'";
      
  });
</script>';
			
}
else
{
   
	redirect(base_url('index.php/front/save_fail_payent_details'));
	
	
}


?>
 
 
 
</body>
</html>
