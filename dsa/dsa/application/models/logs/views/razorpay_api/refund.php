<html> 
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<?php
 
  $message = $this->session->flashdata('warning');   if (isset($message)) {
		
        echo '<script> swal("warning!", "'.$message.'", "warning");</script>';
		$this->session->unset_userdata('warning');
       
		}
    
	
	?>

<?php

require('config.php');
require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);
if($refund_status=='Refund Processed')
{
	$this->session->set_flashdata('warning','Sorry Something wrong in your file You have alredy tried '.$credit_buerau_pull_chances.' times.\n Your payment will be refund in your Account');
	redirect(base_url('index.php/front/credit_bureau'));
	
}
else
{
    $refund = $api->refund->create(array('payment_id' => $payment_id));
	if($refund)
		{
			$_SESSION['payment_id']=$payment_id;
			redirect(base_url('index.php/front/save_refund_details'));
		}
		else
		{
			$_SESSION['payment_id']=$payment_id;
			redirect(base_url('index.php/front/save_refund_fail_details'));
		}
}
?>

</body>
</html>

  
