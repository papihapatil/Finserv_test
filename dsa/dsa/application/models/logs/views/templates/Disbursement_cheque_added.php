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
&nbsp;Dear Accounts Team, 
<div class="container"><br>
 &nbsp;&nbsp;&nbsp; 
 We want to disburse amount of RS <?php if(isset($Amount)) echo $Amount;?> for the customer <?php if(isset($PayeeName)) echo $PayeeName;?>.  <br><br>
 &nbsp;&nbsp;&nbsp; Kindly Approve.
  <br><br><br>
 <table class="table table-bordered">
    <thead>
      <tr>
	    <th>Sr.No</th>
        <th>Parameters</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
   	  <?php
	  
	  if($ModeOfPayment == 'CHEQUE')
			{
				?>
				 <tr>
	    <td>1</td>
        <td>Payee Name</td>
        <td><?php if(isset($PayeeName)) echo $PayeeName;?></td>
      </tr>
	  <tr>
		<td>2</td>
        <td>Payee Bank Name</td>
        <td><?php if(isset($PayeeBankName)) echo $PayeeBankName;?></td>
      </tr>
	  <tr>
	    <td>3</td>
        <td>Account Cheque Number</td>
        <td><?php if(isset($AccountChequeNumber)) echo $AccountChequeNumber;?></td>
      </tr>
	  <tr>
		<td>4</td>
        <td>Account Type</td>
        <td><?php if(isset($AccountType)) echo $AccountType;?></td>
      </tr>
	    <tr>
	  <td>5</td>
        <td>Cheque Handover Date</td>
        <td><?php if(isset($AmountHandoverDate)) echo $AmountHandoverDate;?></td>
      </tr>
	    <tr>
	  <td>6</td>
        <td>Amount</td>
        <td><?php if(isset($Amount)) echo $Amount;?></td>
      </tr>
	    <td>7</td>
        <td>Requested By</td>
        <td><?php if(isset($added_by)) echo $added_by;?></td>
      </tr>
				<?php
			}
	  else if($ModeOfPayment == 'UPI_NEFT_RTGS')
			{
				?>
						 <tr>
	    <td>1</td>
        <td>Payee Name</td>
        <td><?php if(isset($PayeeName)) echo $PayeeName;?></td>
      </tr>
	  <tr>
		<td>2</td>
        <td>Payee Bank Name</td>
        <td><?php if(isset($PayeeBankName)) echo $PayeeBankName;?></td>
      </tr>
	  <tr>
				 <tr>
	  <td>3</td>
        <td>Mode Of Payment</td>
        <td><?php if(isset($ModeOfPayment)) echo $ModeOfPayment;?></td>
      </tr>
	    <tr>
	  <td>4</td>
        <td>Transaction Throught</td>
        <td><?php if(isset($transaction_throught)) echo $transaction_throught;?></td>
      </tr>
	    <tr>
	  <td>5</td>
        <td>Transaction ID</td>
        <td><?php if(isset($TransactionID)) echo $TransactionID;?></td>
      </tr>
	   <tr>
	  <td>6</td>
        <td>NEFT Transfered Date</td>
        <td><?php if(isset($AmountHandoverDate)) echo $AmountHandoverDate;?></td>
      </tr>
	    <tr>
		 
	    <td>7</td>
        <td>Requested By</td>
        <td><?php if(isset($added_by)) echo $added_by;?></td>
      </tr>
				<?php
			}
	  ?>
	 
	 
	
	  
	
	  
	 
    </tbody>
  </table>
</div>
<br><br>
<h5>Best Regards,</h5>
<h5>Finaleap.Pvt.Ltd</h5>
</body>
</html>
