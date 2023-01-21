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

    <h4>Dear Credit Team, </h4><br>
   &nbsp;&nbsp;&nbsp;<h4>The loan Application is sanctioned for the customer <?php if(isset($Customer_name)) echo $Customer_name;?> in the system.</h4> <br>
   Kindly add post sanction documents for this application.<br><br>

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
	

	  
	 
    </tbody>
  </table>
</div>

<br><br>
_______________________________________________________________
<h5>Best Regards,</h5>

<h5>Finaleap Finserv.Pvt.Ltd</h5>
</body>
</html>
