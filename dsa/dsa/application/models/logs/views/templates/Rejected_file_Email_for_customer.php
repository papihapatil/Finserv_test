<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
table,td,th{
	border:1px solid black;
	border-collapse:collapse;
}
</style>
<body>
<h4>Dear <?php if(isset($Email_message_data)) echo $Email_message_data['name']; ?>, </h4><br>
<h4>Thank you for choosing FINALEAP FINSERV.</h4>
     <h4> We regret to Inform that Your Loan Application <?php if(!empty($Email_message_data['application_number'])) {?>No : <?php if(isset($Email_message_data)) echo $Email_message_data['application_number']; }?> is rejected based on Current Assessment.</h4>

<?php if(isset($Email_message_data['customer_unique_code']))
{
  ?>
  <h4>Please Click on the Button to Download Decline Letter </h4>
  <h5><a target='_blank' href="<?php echo base_url()?>index.php/Credit_manager_user/Decline_Letter_pdf?ID=<?php echo $Email_message_data['customer_unique_code'];?>"><button type="button" class="btn btn-success">DECLINE LETTER</button></a></h5>
  <?php
}

?>


<br><br>
<h4>Best Regards,</h4>
<h4>Finaleap Finserv.Pvt.Ltd</h4>
</body>
</html>
