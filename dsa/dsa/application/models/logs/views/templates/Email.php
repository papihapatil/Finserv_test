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
<?php if(isset($data['Status']))
 {
   if($form_status=='Submitted')
   {
?>
   <h5>Following Engagement is submitted by - <?php if(isset($data['Engagement_submitter'])) echo $data['Engagement_submitter']; ?> For approval.</h5>
<?php
   }
   else if($form_status=='Submit_rework_form')
   {
?>
 <h5>Following Engagement rework is done by - <?php if(isset($data['Engagement_submitter'])) echo $data['Engagement_submitter']; ?> For approval.</h5>
<?php
   }
   else if($form_status=='Approved')
   {
?> 
 <h5>Following Engagement is approved by - <?php if(isset($approved_by_name)) echo $approved_by_name; ?></h5>
 <h5>Engagement is submitted by - <?php if(isset($data['Engagement_submitter'])) echo $data['Engagement_submitter']; ?></h5>
<?php
   }
    else if($form_status=='Rework')
   {
?>
 <h5>Following Engagement is rework by  - <?php if(isset($approved_by_name)) echo $approved_by_name; ?> For changes.</h5>
 <h5>Rework is assign to - <?php if(isset($data['Engagement_submitter'])) echo $data['Engagement_submitter']; ?></h5>
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
        <td>Form ID</td>
        <td><?php if(isset($data['Form_id'])) echo $data['Form_id'];?></td>
      </tr>
	  
	   <tr>
	    <td>2</td>
        <td>Client Name</td>
        <td><?php if(isset($data['client_name'])) echo $data['client_name'];?></td>
      </tr>
	   <tr>
	   <td>3</td>
        <td>Client Contact</td>
        <td><?php if(isset($data['client_contact'])) echo $data['client_contact'];?></td>
      </tr>
	  <tr>
	    <td>4</td>
        <td>Client Address</td>
        <td><?php if(isset($data['client_address'])) echo $data['client_address'];?></td>
      </tr>
	  <tr>
	  <td>5</td>
        <td>Client GST Number</td>
        <td><?php if(isset($data['client_gst_number'])) echo $data['client_gst_number'];?></td>
      </tr>
	  <tr>
	  <td>6</td>
        <td>Client email for invoice</td>
        <td><?php if(isset($data['client_email_for_invoice'])) echo $data['client_email_for_invoice'];?></td>
      </tr>
	
	   <tr>
	   <td>7</td>
        <td>Resource Type</td>
        <td><?php if(isset($data['resourceType'])) echo $data['resourceType'];?></td>
      </tr>
	  <tr>
	  <td>8</td>
        <td>Resource Name</td>
        <td><?php if(isset($data['resource_name'])) echo $data['resource_name'];?></td>
      </tr>
	  <tr>
	    <td>9</td>
        <td>Resource Phone</td>
        <td><?php if(isset($data['resourcPhone'])) echo $data['resourcPhone'];?></td>
      </tr>
	   <tr>
	   <td>10</td>
        <td>Resource Role</td>
        <td><?php if(isset($data['resource_role'])) echo $data['resource_role'];?></td>
      </tr>
	   <tr>
	   <td>11</td>
        <td>Resource Email</td>
        <td><?php if(isset($data['ResourceEmail'])) echo $data['ResourceEmail'];?></td>
      </tr>
	    <tr>
		<td>12</td>
        <td>Engagement start date</td>
        <td><?php if(isset($data['Engagement_start_date'])) echo $data['Engagement_start_date'];?></td>
      </tr>
          <tr>
		<td>13</td>
        <td>Engagement end date</td>
        <td><?php if(isset($data['Engagement_end_date'])) echo $data['Engagement_end_date'];?></td>
      </tr>
	  <tr>
	  <td>14</td>
        <td>Billing start date</td>
        <td><?php if(isset($data['Billing_start_date'])) echo $data['Billing_start_date'];?></td>
      </tr>
	  <tr>
	  <td>15</td>
        <td>Monthly compensation</td>
        <td><?php if(isset($data['monthly_compensation'])) echo $data['monthly_compensation'];?></td>
      </tr>
	  <tr>
	  <td>16</td>
        <td>Monthly Billing</td>
        <td><?php if(isset($data['monthly_billing'])) echo $data['monthly_billing'];?></td>
      </tr>
	  <tr>
	  <td>17</td>
        <td>Is GST Applicable</td>
        <td><?php if(isset($data['GST_applicable'])) echo $data['GST_applicable'];?></td>
      </tr>
	   <tr>
	   <td>18</td>
        <td>Travel Expences</td>
        <td><?php if(isset($data['travel_expenses'])) echo $data['travel_expenses'];?></td>
      </tr>
	  <tr>
	  <td>19</td>
        <td>Notes</td>
        <td><?php if(isset($data['notes'])) echo $data['notes'];?></td>
      </tr>
	    <tr>
	   <td>20</td>
        <td>Status</td>
        <td><?php if(isset($data['Status'])) echo $data['Status'];?></td>
      </tr>
	  <?php 
	  if($form_status)
	  {
        if($form_status=='Rework')
		{
	  ?>
	  <tr>
	  <td>21</td>
        <td>Rework Notes</td>
        <td><?php if(isset($data['status_notes'])) echo $data['status_notes'];?></td>
      </tr>
	  <?php	
		}
	  } ?>
	 
    </tbody>
  </table>
</div>
<br><br>
<h5>Best Regards,</h5>
<h5>Finaleap.Pvt.Ltd</h5>
</body>
</html>
