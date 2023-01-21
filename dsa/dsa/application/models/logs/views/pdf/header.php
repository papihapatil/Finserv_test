<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

</head>
<body>

	
	<div class="left " style="margin-top: -5rem;">

		<img style=" width: 100%;max-width:140px;height: auto;" src="<?php echo base_url()?>images/FL_LogoFull_jpg copy.jpg" alt="alternative"/>
		<br>
		<span style="font-family:'Courier New'; color:#C24641;font-size: 11px">CLIENT ID: <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['CustomerCode'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['CustomerCode'];}?></span>
		<br>
		<span style="font-family:'Courier New';color:#C24641;font-size: 11px">REPORT ORDER NO.: <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ReportOrderNO'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ReportOrderNO'];}?></span></span>
		<br>
		<span style="font-family:'Courier New';color:#C24641;font-size: 11px">REFERENCE NUMBER: <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['CustRefField'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['CustRefField'];}?></span></span>
	</div>
	<br>

	<div class="right " style="margin-top: -5rem;">
		<div style="margin-left:40%">
		<img style=" width: 100%;max-width:140px;height: auto; margin-left: 4rem;" src="<?php echo base_url()?>images/equfix.jpeg" alt="alternative"/>
			<br>
			<br>
			<b style=" font-family:'Courier New'; color:skyblue; font-size: 11px">BASIC CONSUMER CREDIT SCORE</b>
			<div style="margin-left:36%;margin-top:2px">
			
				<p style=" font-family:'Courier New'; color:#C24641;font-size: 11px">DATE: <?php if(isset($response['InquiryResponseHeader']['Date'])){ echo $response['InquiryResponseHeader']['Date'];}?></p> 
				<p style=" font-family:'Courier New'; color:#C24641;font-size: 11px">TIME: <?php if(isset($response['InquiryResponseHeader']['Time'])){ echo $response['InquiryResponseHeader']['Time'];}?></p>
			</div>
		</div>
	</div>
	<hr>
	


</body>
</html>