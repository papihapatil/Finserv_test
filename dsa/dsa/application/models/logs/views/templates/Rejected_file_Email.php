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
<h5>Dear Team, </h5><br>
 <h5>Following Application is rejected by<?php if(isset($Email_message_data)) echo $Email_message_data['rejected_by']; ?></h5>

<br>
<div class="container">
           
  <table class="table table-bordered">
    <thead>
      <tr>
	    <th>Sr.No</th>
        <th>Parameters</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
      <tr>
		<td>1</td>
        <td>Customer Name</td>
        <td><?php if(isset($Email_message_data['rejected_customer_name'])) echo $Email_message_data['rejected_customer_name'];?></td>
      </tr>
	  
	   <tr>
	    <td>2</td>
        <td>Customer Email</td>
        <td><?php if(isset($Email_message_data['rejected_customer_email'])) echo $Email_message_data['rejected_customer_email'];?></td>
      </tr>

	   <tr>
	   <td>3</td>
        <td>Customer Mobile</td>
        <td><?php if(isset($Email_message_data['rejected_customer_mobile'])) echo $Email_message_data['rejected_customer_mobile'];?></td>
      </tr>

	  <tr>
	    <td>4</td>
        <td>Reason for rejection</td>
        <td><?php if(isset($Email_message_data['reason_for_rejected'])) echo $Email_message_data['reason_for_rejected'];?></td>
      </tr>

	  <tr>
	  <td>5</td>
        <td>Source name</td>
        <td><?php if(isset($Email_message_data['rejected_by'])) echo $Email_message_data['rejected_by'];?></td>
      </tr>

	  <tr>
	  <td>6</td>
        <td>Source role</td>
        <td><?php if(isset($Email_message_data['rejected_role'])) echo $Email_message_data['rejected_role'];?></td>
      </tr>
	
	   <tr>
	   <td>7</td>
        <td>Rejection Date</td>
        <td><?php if(isset($Email_message_data['rejected_date'])) echo $Email_message_data['rejected_date'];?></td>
      </tr>

	
    </tbody>
  </table>
</div>
<br><br>
<h5>Best Regards,</h5>
<h5>Finaleap.Pvt.Ltd</h5>
</body>
</html>
