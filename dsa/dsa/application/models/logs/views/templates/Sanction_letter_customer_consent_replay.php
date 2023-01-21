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

   <h3>Dear Team, </h3><br>
   <?php 
   if($status_by_customer == "Reject")
   {
	  ?>
	   <h3>Customer <?php if(isset($Customer_name)) echo $Customer_name;?> has rejected loan sanction terms and conditions and file has been sent to Credit team for re-processing</h3>
  	<?php	  
   }
   else
   {
	   ?>
	   <h3>Customer  <?php if(isset($Customer_name)) echo $Customer_name;?>  has approved loan sanction terms and conditions and file can be processed further</h3>
  	<?php
   }
   ?>
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
        <td>Loan amount</td>
        <td><?php if(isset($loan_amount)) echo $loan_amount;?></td>
      </tr>
	  <tr>
	   <td>2</td>
        <td>Loan Tenure</td>
        <td><?php if(isset($tenure)) echo $tenure;?></td>
      </tr>
	  <tr>
		<td>3</td>
        <td>Rate of interest</td>
        <td><?php if(isset($roi)) echo $roi;?></td>
      </tr>
	   <tr>
		<td>4</td>
        <td>Monthly EMI</td>
        <td><?php if(isset($EMI)) echo $EMI;?></td>
      </tr>
    </tbody>
  </table>
  <br></br>
<div class="container">
           
  
</div>
<br><br>
<h5>Best Regards,</h5>
<h5>Finaleap.Pvt.Ltd</h5>
</body>
</html>
