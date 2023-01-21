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
<h5>Dear <?php echo $user_info->FN.' '.$user_info->LN; ?>, </h5><br>

   <h5>New Customer is Assigned To You - <?php if(isset($cust_info)) echo $cust_info->FN.' '.$cust_info->LN; ?></h5>

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
        <td>Application ID</td>
        <td><?php	   if(isset($cust_info)) echo $cust_info->Application_id;?></td>
      </tr>
      <tr>
		<td>2</td>
        <td>Applicant Name</td>
        <td><?php if(isset($cust_info)) echo $cust_info->FN.' '.$cust_info->LN;?></td>
      </tr>
	  
	   <tr>
	    <td>3</td>
        <td>Collateral Address</td>
        <td><?php if(isset($cust_info)) echo $cust_info->PROP_ADD_LINE_1.'<br>'.$cust_info->PROP_ADD_LINE_2.'<br>'.$cust_info->PROP_ADD_LINE_3.'<br>';?></td>
      </tr>
	   <tr>
	    <td>4</td>
        <td>Pin-code</td>
        <td><?php if(isset($cust_info)) echo $cust_info->PROP_ADD_LINE_1.'<br>'.$cust_info->PROP_ADD_LINE_2.'<br>'.$cust_info->PROP_ADD_LINE_3.'<br>';?></td>
      </tr>
     <tr>
	    <td>5</td>
        <td>Loan Type</td>
        <td><?php if(isset($cust_info)) echo $cust_info->loan_type;?></td>
      </tr>
	  <tr>
	  
	 
    </tbody>
  </table>
</div>
<br><br>
<h5>Best Regards,</h5>
<h5>Finaleap Finserv.Pvt.Ltd</h5>
</body>
</html>
