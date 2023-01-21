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

   <h3>Dear <?php if(isset($Customer_name)) echo $Customer_name;?>, </h3><br>
   <h3>Your application for loan against property(Loan type) with Finaleap Finserv Private Limited has been approved and you have been sanctioned loan as below</h3>
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
 Link 
 <a href="https://finaleap.com/finserv_test/dsa/dsa/index.php/admin/scc?z=<?php echo base64_encode($Applicant_ID);?>">Click Here</a>
<br>
<div class="container">
           
  
</div>
<br><br>
<h5>Best Regards,</h5>
<h5>Finaleap.Pvt.Ltd</h5>
</body>
</html>
