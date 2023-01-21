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

<?php if(isset($Status))
 {
   if($Status=='Submited for Approval')
   {
?>
    <h5>Dear Admin, </h5><br>
   <h5>Following Sanction Letter submitted by - <?php if(isset($CM_Name)) echo $CM_Name; ?> For approval.</h5>
<?php
   }
   else if($Status=='Revert')
   {
?>
<h5>Dear <?php if(isset($CM_Name)) echo $CM_Name; ?>, </h5><br>
 <h5>Following Sanction Letter Revert  by - <?php if(isset($Status_added_by)) echo $Status_added_by; ?> .</h5>
<?php
   }
   else if($Status=='Approved')
   {
?> 
  <h5>Dear Team, </h5><br>
 <h5>Following Sanction Letter is approved by - <?php if(isset($Status_added_by)) echo $Status_added_by; ?> </h5>
 <h5>Letter is Genereted by - <?php if(isset($CM_Name)) echo $CM_Name; ?></h5>
<?php
   }
    else if($Status=='Rejected')
   {
?>
  <h5>Dear Team, </h5><br>
<h5>Following Sanction Letter is Rejected by - <?php if(isset($Status_added_by)) echo $Status_added_by; ?> </h5>
 <h5>Letter is Genereted by - <?php if(isset($CM_Name)) echo $CM_Name; ?></h5>
<?php
   }

 }
?>
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
        <td>Letter ID</td>
        <td><?php if(isset($Letter_ID)) echo $Letter_ID;?></td>
      </tr>
	  
	   <tr>
	    <td>2</td>
        <td>Customer Name</td>
        <td><?php if(isset($Customer_name)) echo $Customer_name;?></td>
      </tr>
	   <tr>
	   <td>3</td>
        <td>Loan amount</td>
        <td><?php if(isset($loan_amount)) echo $loan_amount;?></td>
      </tr>
	  <tr>
	    <td>4</td>
        <td>Submitted On</td>
        <td><?php if(isset($Submitted_date)) echo $Submitted_date;?></td>
      </tr>
	  <tr>
	  <td>5</td>
        <td>Status</td>
        <td><?php if(isset($Status)) echo $Status;?></td>
      </tr>
	
    <?php

   if($Status=='Revert')
   {
    ?>
      <tr>
    <td>6</td>
        <td>Admin Comments</td>
        <td><?php if(isset($admin_comments)) echo $admin_comments;?></td>
      </tr>
  
    <?php
   }
   else if($Status=='Rejected')
   { 
    ?>
      <tr>
    <td>6</td>
        <td>Admin Comments</td>
        <td><?php if(isset($admin_comments)) echo $admin_comments;?></td>
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
