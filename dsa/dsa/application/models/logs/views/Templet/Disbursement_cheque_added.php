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
&nbsp;Dear Team, 
<div class="container">
 &nbsp;&nbsp;&nbsp; 
 Following loan application is disbursed.<br>
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
        <td><?php if(isset($customer_name)) echo $customer_name;?></td>
      </tr>
	  <tr>
		<td>2</td>
        <td>Loan amount</td>
        <td><?php if(isset($total_loan_amount)) echo $total_loan_amount;?></td>
      </tr>
	  <tr>
	    <td>3</td>
        <td>EMI</td>
        <td><?php if(isset($EMI)) echo $EMI;?></td>
      </tr>
	  <tr>
		<td>4</td>
        <td>Tenure</td>
        <td><?php if(isset($tenure)) echo $tenure;?></td>
      </tr>
	   <tr>
	  <td>5</td>
        <td>Disbursement amount Confirmed By</td>
        <td><?php if(isset($confirmed_by)) echo $confirmed_by;?></td>
      </tr>
	
	  
	 
    </tbody>
  </table>
</div>
<br><br>
<h5>Best Regards,</h5>
<h5>Finaleap.Pvt.Ltd</h5>
</body>
</html>
