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

   <h5>Application is Submitted for customer  - <?php if(isset($data['Name'])) echo $data['Name']; ?></h5>

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
        <td><?php	   if(isset($data['Application_ID'])) echo $data['Application_ID'];?></td>
      </tr>
      <tr>
		<td>2</td>
        <td>Applicant Name</td>
        <td><?php if(isset($data['Name'])) echo $data['Name'];?></td>
      </tr>
	  
	   <tr>
	    <td>3</td>
        <td>Applicant Email</td>
        <td><?php if(isset($data['Email'])) echo $data['Email'];?></td>
      </tr>
     <tr>
	    <td>4</td>
        <td>Application Login Date</td>
        <td><?php if(isset($data['CreatedDate'])) echo $data['CreatedDate'];?></td>
      </tr>
	  <tr>
	  <td>5</td>
        <td>Application Submitted Date</td>
        <td><?php if(isset($data['LastUpdatedDate'])) echo $data['LastUpdatedDate'];?></td>
      </tr>
      <tr>
        <td>6</td>
        <td>Sourcing Employee Name</td>
        <td><?php if(isset($data['Sourcing_name'])) echo $data['Sourcing_name'];?></td>
      </tr>
      <tr>
        <td>7</td>
        <td>Sourcing Employee Role</td>
        <td><?php if(isset($data['Sourcing_By'])) echo $data['Sourcing_By'];?></td>
      </tr>
      <tr>
        <td>8</td>
        <td>Sourcing Employee Location</td>
        <td><?php if(isset($data['Sourcing_city'])) echo $data['Sourcing_city'];?></td>
      </tr>
	 
    </tbody>
  </table>
</div>
<br><br>
<h5>Best Regards,</h5>
<h5>Finaleap.Pvt.Ltd</h5>
</body>
</html>
