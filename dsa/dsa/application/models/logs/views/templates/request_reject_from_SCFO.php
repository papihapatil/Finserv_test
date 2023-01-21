<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
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
                <p style="font-size:12px;">Dear Distributor <?php  echo strtoupper($distributor_info->FN).' '.strtoupper($distributor_info->LN) ?>,</p>
                <p style="font-size:12px;"> Invoice number <?php echo $request_info->invoicenumber; ?> has been rejected by Supply chain manger with remarks<b>'<?php echo $request_info->remark_by_scfo ?>'</b> </p>
                <p style="font-size:12px;"> Please keep track and visit our portal for future reference.</p>
                
            
                </div>
                <p style="font-size:12px;">Warm Regards,</p>
                <p style="font-size:12px;">Finaleap Finserv.Pvt.Ltd </p>
			</body>
</html>