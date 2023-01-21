'<!DOCTYPE html>
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
			body {
  font-family: Arial, sans-serif;
}
			</style>
			<body>
			<p style="font-size:12px;">Dear Sir / Ma’am,</p>
			<p style="font-size:12px;"> Kindly note that FI Report for Mr/Mrs. <b><?php echo strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN); ?></b> has been published on our portal under the section Customers > Vendors Report >  </p>
			<p style="font-size:12px;"> We request you to review and check all the details in the Report.</p>
			<p style="font-size:12px;">In case of any discrepancies in the report you can revert back to us within 1 / 2  working days </p>
			<p style="font-size:12px;">Looking forward to a continued association with us.</p>
			<p style="font-size:10px;">*Please do not reply to this mail.</p>

			
			
		   
			
		
	
			   </div>
				
				<p style="font-size:12px;">Thanks & Regards,</p>
				<p style="font-size:12px;"><?php echo strtoupper($Legal_info->FN).' '.strtoupper($Legal_info->FN); ?> </p>
				</body>
				</html>