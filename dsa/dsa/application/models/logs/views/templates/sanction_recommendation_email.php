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
<?php if(isset($data['Recommendation_status']))
 {
   if($data['Recommendation_status']=='Recommended' && $data['Recommendation_status_added_by']=='Credit Manager')
   {
?>
   <h5>Following Recommendation is submitted by - <?php if(isset($data['Submitted_by'])) echo $data['Submitted_by']; ?> For approval.</h5>
<?php
   }
   else  if($data['Recommendation_status']=='Recommended' && $data['Recommendation_status_added_by']=='Cluster Credit Manager')
   {
    ?>
   <h5>Following Recommendation is submitted by - <?php if(isset($data['Submitted_by'])) echo $data['Submitted_by']; ?> For approval.</h5>
<?php
   }
   else if($data['Recommendation_status']=='Reverted' && $data['Recommendation_status_added_by']=='Cluster Credit Manager')
   {
    ?>
   <h5>Following Recommendation is Reverted by - <?php if(isset($data['Submitted_by'])) echo $data['Submitted_by']; ?> For changes.</h5>
  <?php
   }
    else if($data['Recommendation_status']=='Reverted' && $data['Recommendation_status_added_by']=='Admin')
   {
    ?>
   <h5>Following Recommendation is Reverted by - Admin For changes.</h5>
  <?php
   }
    else if($data['Recommendation_status']=='Rejected' && $data['Recommendation_status_added_by']=='Admin')
   {
     ?>
   <h5>Following Recommendation is Rejected by - Admin </h5>
  <?php
   }
    else if($data['Recommendation_status']=='Rejected' && $data['Recommendation_status_added_by']=='Cluster Credit Manager')
   {
     ?>
   <h5>Following Recommendation is Rejected by - <?php if(isset($data['Submitted_by'])) echo $data['Submitted_by']; ?> </h5>
  <?php
   }
    else if($data['Recommendation_status']=='Loan Recommendation Approved' && $data['Recommendation_status_added_by']=='Admin')
   {
    ?>
   <h5>Following Recommendation is Approved by - Admin </h5>
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
        <td>Application ID</td>
        <td><?php if(isset($data['Application_Id'])) echo $data['Application_Id'];?></td>
      </tr>
	   <tr>
	       <td>2</td>
        <td>Client Name</td>
        <td><?php if(isset($data['Customer_name'])) echo $data['Customer_name'];?></td>
      </tr>
       <tr>
          <td>3</td>
        <td>Loan Amount</td>
        <td><?php if(isset($data['final_loan_amount'])) echo $data['final_loan_amount'];?></td>
      </tr>
     
	   
       <tr>
          <td>4</td>
        <td>Loan Type</td>
        <td><?php if(isset($data['loan_type'])) echo $data['loan_type'];?></td>
      </tr>
     
       <tr>
         <td>5</td>
        <td>Tenure</td>
        <td><?php if(isset($data['final_tenure'])) echo $data['final_tenure'];?></td>
      </tr>
     
       <tr>
      <td>6</td>
        <td>ROI</td>
        <td><?php if(isset($data['roi'])) echo $data['roi'];?></td>
      </tr>
     <tr>
	   <td>7</td>
        <td>Submitted By</td>
        <td><?php if(isset($data['Submitted_by'])) echo $data['Submitted_by'];?></td>
      </tr>
	  <tr>
	    <td>8</td>
        <td>Submission Date</td>
        <td><?php if(isset($data['submission_date'])) echo $data['submission_date'];?></td>
      </tr>
	  <tr>
	  <td>9</td>
        <td>Status</td>
        <td><?php if(isset($data['Recommendation_status'])) echo $data['Recommendation_status'];?></td>
      </tr>
	  <tr>
	  <?php
    if($data['Recommendation_status']=='Reverted' && $data['Recommendation_status_added_by']=='Cluster Credit Manager')
    {
      ?>
      <td>10</td>
        <td>Comments by <?php if(isset($data['Submitted_by'])) echo $data['Submitted_by']; ?></td>
        <td><?php if(isset($data['Cluster_manager_Comments'])) echo $data['Cluster_manager_Comments'];?></td>
      </tr>
    <tr>
      <?php
    }
    else if($data['Recommendation_status']=='Reverted' && $data['Recommendation_status_added_by']=='Admin')
    {
      ?>
      <td>10</td>
        <td>Comments by Admin</td>
        <td><?php if(isset($data['admin_comments'])) echo $data['admin_comments'];?></td>
      </tr>
    <tr>
      <?php
    }



    ?>
	 
    </tbody>
  </table>
</div>
<br><br>
<h5>Best Regards,</h5>
<h5>Finaleap Finserv.Pvt.Ltd</h5>
</body>
</html>
