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
			<p style="font-size:12px;">Dear Sir / Ma’am,</p>
            <p style="font-size:12px;">Greetings From Finaleap !!!</p>
			<p style="font-size:12px;"> We would like to inform you that required documents for Legal Report of Mr/Mrs. <b>'<?php echo strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN) ?>'</b> has been successfully uploaded on our portal under the section Customers   </p>
			<p style="font-size:12px;"> We solicit your co-operation and request you to provide Legal Report at the earliest..</p>
			<p style="font-size:12px;"> You can address your queries if any by writing to us on our portal.</p>
			<p style="font-size:12px;">We value your association with us.</p>
			<table>
				<tbody>
					<tr>
						<td>
						Customer Name
						</td>
						<td>
						<?php echo strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN) ?>
                        </td>
					<tr>
					<tr>
						<td>
						Customer Mobile No
						</td>
						<?php echo $cust_info->MOBILE.' /'.$cust_info->Alternative_mobile; ?>
                    </tr>
					<tr>
						<td>
						Property Address
						</td>
						<td>
						<?php echo $cust_info->PROP_ADD_LINE_1.' '.$cust_info->PROP_ADD_LINE_2.' '.$cust_info->PROP_ADD_LINE_3; ?>
                        </td>
                    </tr>
					<tr>
						<td>
						Property Landmark
						</td>
						<td>
						<?php echo $cust_info->PROP_ADD_LANDMARK; ?>
                        </td>
                    </tr>
					<tr>
						<td>
						Picode
						</td>
						<td>
						<?php echo $cust_info->PROP_ADD_PINCODE; ?>
                        </td>
                    </tr>
					<tr>
						<td>
						State
						</td>
						<td>
						<?php echo strtoupper($cust_info->PROP_ADD_STATE); ?>
                        </td>
                    </tr>
					<tr>
						<td>
						District
						</td>
						<td>
						<?php echo strtoupper($cust_info->PROP_ADD_DISTRICT); ?>
                        </td>
                    </tr>
					<tr>
						<td>
						Case Type: HL/ MSME
						</td>
						<td>
						<?php echo strtoupper($cust_info->LOAN_TYPE); ?>
                        </td>
                    </tr>
					<tr>
						<td>
						Loan amount:
						</td>
						<td>
						<?php echo $cust_info->DESIRED_LOAN_AMOUNT; ?>
                        </td>
                    </tr>
					<tr>
						<td>
						List of property documents collected from the customer:
						</td>
						<td>
							<?php foreach($documents as $doc)
							{
								echo $doc->Doc_name.'<br>';
							}
							?>
                        </td>
                   </tr>
               </tbody>
            </table>
		

			
			
		   
			
		
			   </div>
				<p style="font-size:12px;">Thanks & Regards,</p>
				<p style="font-size:12px;">Finaleap Finserv.Pvt.Ltd </p>
				</body>
				</html>