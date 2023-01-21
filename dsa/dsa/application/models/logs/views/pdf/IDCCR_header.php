<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

</head>
<body>

	
	<div class="left " style="margin-top: -5rem;">

		<img style=" width: 100%;max-width:140px;height: auto;" src="<?php echo base_url()?>images/Finserv_logo.png" alt="alternative"/>
		<br>
		<span style="font-family:'Courier New'; color:#C24641;font-size: 10px">CLIENT ID: <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ClientID'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ClientID'];}else if(isset($response['CCRResponse']['CIRReportDataLst'][1]['InquiryResponseHeader']['ClientID'])){ echo $response['CCRResponse']['CIRReportDataLst'][1]['InquiryResponseHeader']['ClientID'];}?></span>
		<br>
		<span style="font-family:'Courier New';color:#C24641;font-size: 10px">REPORT ORDER NO.: <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ReportOrderNO'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ReportOrderNO'];} else if(isset($response['CCRResponse']['CIRReportDataLst'][1]['InquiryResponseHeader']['ReportOrderNO'])){ echo $response['CCRResponse']['CIRReportDataLst'][1]['InquiryResponseHeader']['ReportOrderNO'];}?></span></span>
		<br>
		<span style="font-family:'Courier New';color:#C24641;font-size: 10px">REFERENCE NUMBER: <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['CustRefField'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['CustRefField'];} else  if(isset($response['CCRResponse']['CIRReportDataLst'][1]['InquiryResponseHeader']['CustRefField'])){ echo $response['CCRResponse']['CIRReportDataLst'][1]['InquiryResponseHeader']['CustRefField'];}?></span></span>
	</div>
	<br>

	<div class="right " style="margin-top: -5rem;">
		<div style="margin-left:55%">
		<img style=" width: 100%;max-width:140px;height: auto; margin-left: 4rem;" src="<?php echo base_url()?>images/equfix.jpeg" alt="alternative"/><h1></h1>
			<br>
			<br>
				<div style="margin-left:30%;margin-top:2px">
			
				<p style=" font-family:'Courier New'; color:#C24641;font-size: 10px">DATE: <?php if(isset($response['InquiryResponseHeader']['Date'])){ echo $response['InquiryResponseHeader']['Date'];}?></p> 
				<p style=" font-family:'Courier New'; color:#C24641;font-size: 10px">TIME: <?php if(isset($response['InquiryResponseHeader']['Time'])){ echo $response['InquiryResponseHeader']['Time'];}?></p>
			</div>
		</div>
	</div>
	


</body>
</html>