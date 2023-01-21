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
				 body {
					font-family: Arial, sans-serif;
				  }
							  </style>
							  <body>
							  <p style="font-size:13px;">Dear Sir / Ma’am,</p>
							  <p style="font-size:13px;">Thanks you for the Technical Report  of  Mr/Mrs. <b><?php echo  strtoupper($cust_info->FN).' '.strtoupper($cust_info->LN); ?></b>  </p>
							  <p style="font-size:13px;">However, We request you to please review the case again for below reason.</p>
							  <p style="font-size:13px;">Reason:<?php echo $credit_comment_fi ?></p>
							   <p style="font-size:13px;">Thank You in advance for consideration.</p>
							 
				  
							  
							  
							 
							  
						  
						  
								 </div>
								  
								   <p style="font-size:13px;">Thanks & Regards,</p>
				                   <p style="font-size:13px;">Finaleap.Pvt.Ltd </p>
								  </body>
								  </html>