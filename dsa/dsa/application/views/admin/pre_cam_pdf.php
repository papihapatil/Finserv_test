   
<?php 
/*
echo "<pre>";
print_r($income_details);
echo "</pre>";

exit();*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PDF</title>
</head>
<?php
if(!empty($data_row_more))
{
	if($data_row_more->STATUS == 'Aadhar E-sign complete' || $data_row_more->STATUS == 'Loan Sanctioned' ||  $data_row_more->STATUS == 'PD Completed' ||  $data_row_more->STATUS == 'Cam details complete' || $data_row_more->STATUS == 'Disbursed')
	{
        //echo "in pre cam";
?>

<body style=" font-family:'Courier New';" >
	<hr>

	<p style="font-size: 15px; font-weight:800;color:darkgray">PRE-CAM for <?php if(!empty($row)){echo ucwords($row->FN)." ".ucwords($row->MN)." ".ucwords($row->LN);}?></p>



	<table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px;  width: 100%;">
	<tr  style="background-color: #C24641;">
			<th style="width:40%;padding-left:5px;color:white;font-size:10px;">Loan Information </th>

		</tr>
			<tbody style="margin-top: 5rem">
			<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Loan Application ID</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($loan_details)){ echo strtoupper($loan_details->Application_id);}?></td>
					<td></td>
					<td style="border: 1px solid;font-size:10px;"></td>
					<td style="border: 1px solid;font-size:10px;"></td>
		        </tr>
				<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Product</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($loan_details)){ echo strtoupper($loan_details->LOAN_TYPE);}?></td>
					<td></td>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Loan Sub type</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($loan_details)){if($loan_details->HOME_LOAN_TYPE=="NULL" || $loan_details->HOME_LOAN_TYPE==""){echo "";}else{echo ucwords($loan_details->HOME_LOAN_TYPE);}}?></td>
		        </tr>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">DESIRED LOAN AMOUNT</span></td>
					
					 <td style="border: 1px solid;font-size:10px;"><?php if(isset($loan_details->DESIRED_LOAN_AMOUNT)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $loan_details->DESIRED_LOAN_AMOUNT);} else {if(!empty($loan_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $loan_details->DESIRED_LOAN_AMOUNT);}}?></td>
					
					<td></td>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Loan Tenure (years)</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(isset($loan_details->TENURE)){ echo $loan_details->TENURE ;} else {if(!empty($loan_details)){ echo $loan_details->TENURE;}}?></td>
		        </tr>
				<tr style="border: 1px solid #ddd;border-bottom:1px solid;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">No of co applicants</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($no_of_coapplicant)){echo $no_of_coapplicant;}?></td>
					<td></td>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Rate of intrest</span></td>
					<td style="border: 1px solid;font-size:10px;">15</td>
		        
			 </tr>
			</tbody>
		</table>
<br>



<table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px;  width: 100%;">
	<tr  style="background-color: #C24641;">
			<th style="width:40%;padding-left:5px;color:white;font-size:10px;">Sourcing Details</th>

		</tr>
			<tbody style="margin-top: 5rem">
			<!--------------Added by papiha---------------------------------------->
				<tr style="border: 1px solid; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
					
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Sourcing Type</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($Sourcing_Type)){ echo ucwords($Sourcing_Type);}?></td>
					<?php if(!empty($Sourcing_By)){?>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"><?php echo $Sourcing_By;?></span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($Sourcing_name)){ echo $Sourcing_name;} ?></td>
					<?php } ?>
					<?php if($Sourcing_Type != "Direct"){?> 
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">CITY</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($Sourcing_city)){ echo $Sourcing_city;}?></td>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">State</span></td>
					<td style="border: 1px solid;font-size:10px;"><?php if(!empty($Sourcing_state)){ echo $Sourcing_state;}?></td>
					<?php } ?>
		        </tr>
			<!------------------------------ended by papiha------------------------------>
			</tbody>
		</table>



	<!-------------------------------------------------------------------------------------------------------------->
	<table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px; width: 100%;">
	<tr  style="background-color: #C24641;"><th style="width:100%;padding-left:5px;color:white;font-size:10px;">Personal Information</th></tr>
    </table>
	<table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px; width: 100%;">

	         
	            <tbody style="margin-top: 5rem">
                        <tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Particulars</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Applicant</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Co-Applicant <?php echo $i;?></span></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid; border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">ID</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){echo $row->UNIQUE_CODE;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ; border-right:1px solid;font-size:10px;"><?php if(!empty($coapplicant)){echo $coapplicant->UNIQUE_CODE;}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Name</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){echo ucwords($row->FN)." ".ucwords($row->MN)." ".ucwords($row->LN);}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){echo ucwords($coapplicant->FN)." ".ucwords($coapplicant->MN)." ".ucwords($coapplicant->LN);}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Email ID</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){ echo $row->EMAIL;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->EMAIL;}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Relation </span></td>
								<td style="border: 1px solid ;font-size:10px;"></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ if(isset($coapplicant->relation)) echo $coapplicant->relation;}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Age</span></td>
								<td style="border: 1px solid ;font-size:10px;"> <?php if(!empty($row)){ echo $row->AGE;} ;?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->AGE;} ;?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">No of Dependants</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($NO_OF_DEPENDANTS)){ echo $NO_OF_DEPENDANTS;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"> <?php if(!empty($coapplicant)){ echo $coapplicant->NO_OF_DEPENDANTS;}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">DOB</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(($data_address!="")){ echo $data_address['InquiryRequestInfo']['DOB'];}elseif(!empty($row)){ echo $row->DOB;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->DOB;}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Highest Education</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){ echo ucwords($row->EDUCATION_BACKGROUND);}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->EDUCATION_BACKGROUND);}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Marital Status</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){ echo ucwords($row->MARTIAL_STATUS);} ?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->MARTIAL_STATUS);} ?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Contact no</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){ echo $row->MOBILE;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->MOBILE;}?> </td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Permanent Address</span></td>
								<td style="border: 1px solid ;font-size:10px;word-wrap: break-word;"><?php if(!empty($PER_ADDRS_LINE_1))echo $PER_ADDRS_LINE_1;?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;word-wrap: break-word;"><?php if(!empty($coapplicant))echo ucwords($coapplicant->PER_ADDRS_LINE_1);?></td>
						 		<?php $i++; }?>
						</tr>
						
					
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Current address</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($PER_ADDRS_LINE_1))echo $PER_ADDRS_LINE_1;?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){  echo ucwords($coapplicant->PER_ADDRS_LINE_1);}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Occupation </span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($income_details)){ if($income_details->CUST_TYPE=='self employeed'){ echo "Self Employed" ;}elseif($income_details->CUST_TYPE=='salaried'){ echo " Salaried" ;} else { echo ucwords($income_details->CUST_TYPE); }}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->COAPP_TYPE=='retired'){ if($coapplicant->GENDER== 'male') echo "Retired"; else echo "House Wife"; }else{echo ucwords($coapplicant->COAPP_TYPE);}}?> </td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Stability at current address(Years)</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(isset($data_row_more)){ echo $data_row_more->RES_ADDRS_NO_YEARS_LIVING;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->RES_ADDRS_NO_YEARS_LIVING;}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Stability in City(Years)</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($data_row_more)){ echo $data_row_more->RES_ADDRS_NO_YEARS_LIVING;}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->RES_ADDRS_NO_YEARS_LIVING;}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Native place</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($NATIVE_PLACE)){ echo ucwords($NATIVE_PLACE);}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->NATIVE_PLACE);}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Current and Permanent Address same</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($RES_ADDRS_LINE_1)){ if($RES_ADDRS_LINE_1!=$PER_ADDRS_LINE_1){ echo 'No';} else{echo 'Yes';}}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->RES_ADDRS_LINE_1!=$coapplicant->PER_ADDRS_LINE_1){ echo 'No';} else{echo 'Yes';}}?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Gender</span></td>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($row)){  echo ucwords($row->GENDER); }?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){  echo ucwords($coapplicant->GENDER); }?></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd;border-bottom:1px solid; border-left:1px solid;border-right:1px solid;">
								<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Locality type</span></td>
								<td style="border: 1px solid ;font-size:10px;"> <?php if(!empty($Locality_type)){ echo ucwords($Locality_type);}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
								<td style="border: 1px solid ;font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->Locality_type);}?></td>
						 		<?php $i++; }?>
						</tr>
				</tbody>
		</table>
	<!----------------------------------------------------------------------------------------------------------- -->

	 <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
			<tr  style="background-color: #C24641;">
				<th style="width:33%;padding-left:5px;color:white;font-size:10px;">Applicant Document verification</th>

			</tr>
			<tbody style="margin-top: 5rem">
				<tr style="border: 1px solid ;background-color:#E8E8E8;">
					<td style="border: 1px solid ;font-size:10px;"><span style="color:black;font-weight:bold;">Document</span></td>
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Document ID</span></td>
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Verified Status</span></td>
					<td style="border: 1px solid ; font-size:10px; "><span style="color:black;font-weight:bold;">Source</span></td>
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Date -Time</span></td>
	            </tr>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">

					<td style="border: 1px solid ; font-size:10px;font-weight:bold;">PAN </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($row)){echo $row->PAN_NUMBER;}?></td>
					<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($VERIFY_PAN))if ($VERIFY_PAN == 'true'){ echo 'Yes';} else {echo 'No';}?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($VERIFY_PAN)){if ($VERIFY_PAN == 'true'){?> Verified by NSDL</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } }?>
				</tr>


				<?php
		if(!empty($income_details))
		{
			if($income_details->BIS_PROFESSION=='CA')
			{
		?>
		          <tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">CA</td>
				    <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($row)){echo $income_details->CA_regi_no;}?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_ca_regi_status))if ($verify_ca_regi_status == 'true'){ echo 'Yes';} else {echo 'No';}?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_ca_regi_status)){if ($verify_ca_regi_status == 'true'){?>Verified by ICAI</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } }?> </td>

				   </tr>
		 <?php
			}
			else if($income_details->BIS_PROFESSION=='CS')
			{
		?>
			<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
			        <td style="border: 1px solid ; font-size:10px;font-weight:bold;">CS</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($row)){echo $income_details->CS_regi_no;}?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_cs_regi_status))if ($verify_cs_regi_status == 'true'){ echo 'Yes';} else {echo 'No';}?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_cs_regi_status)){if ($verify_cs_regi_status == 'true'){?>Verified by ICSI </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } }?> </td>

				</tr>
	<?php
			}
			else if($income_details->BIS_PROFESSION=='ICWA')
			{
		?>
             <tr  style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
			        <td style="border: 1px solid ; font-size:10px;font-weight:bold;">ICWA</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($row)){echo $income_details->ICWA_regi_no;}?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_icwa_regi_status))if ($verify_icwa_regi_status == 'true'){ echo 'Yes';} else {echo 'No';}?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_icwa_regi_status)){if ($verify_icwa_regi_status == 'true'){?>Verified by ICWAI   </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } }?> </td>

				</tr>
		<?php
			}


		}

		?>
              		<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				<td style="border: 1px solid ; font-size:10px;font-weight:bold;">Aadhar</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($row)){ echo $row->AADHAR_NUMBER;}?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($STATUS)){ if($STATUS=='Aadhar E-sign complete'){echo'Yes';}else{ echo 'No';}}?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($STATUS)){ if($STATUS=='Aadhar E-sign complete'){ echo 'Verified system'; }  } ?></td>
					 <td style="border: 1px solid;font-size:10px;"><?php if(!empty($STATUS)){ if($STATUS=='Aadhar E-sign complete'){ if(!empty($TIMESTAMP)){echo $TIMESTAMP;}}}?></td>

				</tr>

				<?php if(!empty($credit_score_response))
				{
					if($credit_score_response['InquiryRequestInfo']['IDDetails'][0]['IDType']=="V")
					//echo $credit_score_response['InquiryRequestInfo']['IDDetails'][0]['IDValue'];
					{
				?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Voter ID</td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo $credit_score_response['InquiryRequestInfo']['IDDetails'][0]['IDValue']?></td>
					<td style="border: 1px solid ; font-size:10px;">Yes</td>
					<td style="border: 1px solid ; font-size:10px;">Verified by Credit Bureau</td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo $credit_score_response['InquiryResponseHeader']['Date']." ".$credit_score_response['InquiryResponseHeader']['Time'];?></td>
				</tr>

				<?php
					}
				}
				else
				{

				}
				?>


				<?php if(!empty($credit_score_response))
				{
					if($credit_score_response['InquiryRequestInfo']['IDDetails'][0]['IDType']=="P")
					//echo $credit_score_response['InquiryRequestInfo']['IDDetails'][0]['IDValue'];
					{
				?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Passport</td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo $credit_score_response['InquiryRequestInfo']['IDDetails'][0]['IDValue']?></td>
					<td style="border: 1px solid ; font-size:10px;">Yes</td>
					<td style="border: 1px solid ; font-size:10px;">Verified by Credit Bureau</td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo $credit_score_response['InquiryResponseHeader']['Date']." ".$credit_score_response['InquiryResponseHeader']['Time'];?></td>


				</tr>

				<?php
					}
				}
				else
				{
				?>
				<?php if(!empty($verify_Passport_no)) { if($verify_Passport_no!="") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Passport</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($Passport_Number)){ echo $Passport_Number;}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Passport_no)){if($verify_Passport_no=='true'){echo 'Yes';} else{echo 'No'; } }?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Passport_no)){if($verify_Passport_no=='true'){?><?php if(!empty($KYC_doc)){if($KYC_doc=='Passport'){echo ' Verified by Government authority'.$TIMESTAMP; } else{ echo 'Verified Manually '. $TIMESTAMP;}}?> <?php } }?></td>

				</tr>
				<?php }  } ?>

				<?php

				}
				?>

				<?php
				if(!empty($credit_score_response))
				{
					if($credit_score_response['InquiryRequestInfo']['IDDetails'][0]['IDType']=="D")
					//echo $credit_score_response['InquiryRequestInfo']['IDDetails'][0]['IDValue'];
					{
				?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Driving Licence</td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo $credit_score_response['InquiryRequestInfo']['IDDetails'][0]['IDValue'];?></td>
					<td style="border: 1px solid ; font-size:10px;">Yes</td>
					<td style="border: 1px solid ; font-size:10px;">Verified by Credit Bureau</td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo $credit_score_response['InquiryResponseHeader']['Date']." ".$credit_score_response['InquiryResponseHeader']['Time'];?></td>

				</tr>
				<?php
					}

				}
				else
				{
				?>

				<?php if(!empty($verify_Driving_l_Number)) { if($verify_Driving_l_Number!="") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Driving Licence</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($Driving_l_Number))echo $Driving_l_Number;?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Driving_l_Number)){ if($verify_Driving_l_Number=='true'){echo 'Yes';} else{echo 'NO';} }?></td>
					<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($verify_Driving_l_Number)){ if($verify_Driving_l_Number=='true'){?><?php if(!empty($KYC_doc)){if($KYC_doc=='Driving Licence'){echo ' Verified by R.T.O on '.$TIMESTAMP; } else{ echo 'Verified Manually'. $TIMESTAMP;}}?><?php } }?> </td>

				</tr>
				<?php }  } ?>
				<?php

				}
				?>
                <?php if(!empty($Vechical_Number)) { if($Vechical_Number!="") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				     <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Vehicle Licence</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($Vechical_Number)){ echo $Vechical_Number;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Vechical)){ if($verify_Vechical=='true'){echo 'Yes';} else{echo 'NO';}}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Vechical)){ if($verify_Vechical=='true'){?>Verified Manually on <?php if(!empty($verify_Vechical)){echo $TIMESTAMP;}?><?php }} ?>  </td>
				</tr>
				<?php }  } ?>
			
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				<td style="border: 1px solid ; font-size:10px;font-weight:bold;">Email</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($row)){ echo $row->EMAIL;}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($email_flag))if ($email_flag== 'true'){ echo 'Yes';}else{ echo 'No';} ?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($email_flag)){if ($email_flag== 'true'){ echo 'Verified system'; }  } ?></td>
					 <td style="border: 1px solid;font-size:10px;"><?php if(!empty($email_flag)){if ($email_flag== 'true'){ if(!empty($TIMESTAMP)){echo $TIMESTAMP;}}}?></td>

				</tr>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				<td style="border: 1px solid ; font-size:10px;font-weight:bold;">Mobile</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($row)){ echo $row->MOBILE;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo 'Yes'; ?> </td>
					<td style="border: 1px solid ; font-size:10px;">Verified system</td>
					 <td style="border: 1px solid;font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?></td>

				</tr>
				<?php if(!empty($income_details)){if($income_details->CUST_TYPE=='self employeed'){?>
					<?php if(!empty($verify_It_Returns)) { if($verify_It_Returns=="true") {?>
				    <tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">IT returns</td>
					<td></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_It_Returns)){ if($verify_It_Returns=='true'){echo 'Yes';}else{echo 'No';}}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($TIMESTAMP)){ if($verify_It_Returns=='true'){?>Verified Manually</td>
					<td style="font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } }?>  </td>

				</tr>
				<?php }  } ?>
				<?php if(!empty($verify_Udyog_Aadhar)) { if($verify_Udyog_Aadhar=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Udyog Aadhar</td>
					<td></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Udyog_Aadhar)){ if($verify_Udyog_Aadhar=='true'){echo 'Yes';}else{echo 'No';}}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($TIMESTAMP)){ if($verify_Udyog_Aadhar=='true' ){?>Verified Manually</td>
					<td style="font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } }?>  </td>

				</tr>
				<?php }  } ?>
				<?php if(!empty($verify_GST_status)) { if($verify_GST_status=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">GST</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->BIS_GST;}?>   </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_GST_status)){ if($verify_GST_status=='true'){echo 'Yes';}else{echo 'No';}}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_GST_status)){ if($verify_GST_status=='true'){?>Verified by NSDL</td>
					<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } } ?>  </td>


				</tr>
				<?php }  } ?>
				<?php if(!empty($verify_Shop_Act)) { if($verify_Shop_Act=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Shop Act</td>
					<td></td>
					<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($verify_Shop_Act)){ if($verify_Shop_Act=='true'){echo 'Yes';}else{echo 'No';}}?>   </td>
					 <td style="border: 1px solid; font-size:10px;"> <?php if(!empty($TIMESTAMP)){ if($verify_Shop_Act=='true'){?>Verified Manually</td>
					<td style="font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<?php }  } ?>
				<?php if(!empty($verify_Professional_Certificate)) { if($verify_Professional_Certificate=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;"> Professional certificate </td>
					<td></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Professional_Certificate)){ if($verify_Professional_Certificate=='true'){echo 'Yes';}else{echo 'No';}}?>    </td>
				    <td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($TIMESTAMP)){ if($verify_Professional_Certificate=='true' ){?>Verified Manually</td>
					<td style="font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<?php }  } ?>
				<?php if(!empty($verify_Residence)) { if($verify_Residence=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid; font-size:10px;font-weight:bold;"> Residence Verification</td>
					<td></td>
					<td style="border: 1px solid; font-size:10px;"><?php if(!empty($verify_Residence)){ if($verify_Residence=='true'){echo 'Yes';}else{echo 'No';}}?><?php if(!empty($Recidance_Comment)){ echo $Recidance_Comment;}?>    </td>

				    <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Residence)){ if($verify_Residence=='true'){?>Verified Manually </td>
					<td style=" font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } } ?>  </td>
				</tr>
				<?php }  } ?>
				<?php if(!empty($verify_Employment)) { if($verify_Employment=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				     <td style="border: 1px solid ; font-size:10px;font-weight:bold;"> Employment/ Business Verification</td>
					<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($verify_Employment)){ if($verify_Employment=='true'){echo 'Yes';}else{echo 'No';}}?>   </td>
					<td style="border: 1px solid ; font-size:10px;">  Comment : <?php if(!empty($Employment_Comment)){ echo $Employment_Comment;}?>    </td>
				    <td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($verify_Employment)){ if($verify_Employment=='true'){?>Verified Manually </td>
					<td style="font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<?php }  } ?>

				<?php } }?>

				<?php if(!empty($income_details)){if($income_details->CUST_TYPE=='salaried'){?>
				<?php if(!empty($verify_EPFO_Number)) { if($verify_EPFO_Number=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				     <td style="border: 1px solid ; font-size:10px;font-weight:bold;"> EPFO</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($EPFO_Number)){ echo $EPFO_Number;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_EPFO_Number)){ if($verify_EPFO_Number=='true'){echo 'Yes';} else{ echo 'No';}}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_EPFO_Number)){ if($verify_EPFO_Number=='true'){ ?>Verified Manually </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } }?></td>
				</tr>
				<?php }  } ?>
				<?php if(!empty($verify_Account_Number)) { if($verify_Account_Number=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Account NO </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($Account_Number)){ echo $Account_Number;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Account_Number)){ if($verify_Account_Number=='true'){echo 'Yes';} else{ echo 'No';}}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Account_Number)){ if($verify_Account_Number=='true'){?>Verified Manually </td>
					 <td style="border: 1px solid; font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?> <?php } }?> </td>
				</tr>
				<?php }  } ?>
				<?php if(!empty($verify_Official_Mail)) { if($verify_Official_Mail=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;"> Official Email ID</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($Official_mail)){ echo $Official_mail;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($verify_Official_Mail)){ if($verify_Official_Mail=='true'){echo 'Yes';} else{ echo 'No';}}?> </td>
					<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($verify_Official_Mail)){ if($verify_Official_Mail=='true'){ ?>Verified Manually </td>
					 <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<?php }  } ?>
				<?php } }?>
				<!-- <tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;border-bottom:1px solid;">
					<td style="border: 1px solid ; font-size:10px;"> Permanent/ Current Address Match with Aadhar :</td>
					<td></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($address_flag))if ($address_flag== 'true'){ echo 'Yes';}else{ echo 'No';} ?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($address_flag)){if ($address_flag== 'true'){ ?>Verified Manually <?php if(!empty($TIMESTAMP)){echo $TIMESTAMP;}?><?php } }?>  </td>

				</tr> -->


				<tr style="border: 1px solid #ddd;border-left:1px solid; border-bottom:1px solid;">
				<td style="border: 1px solid ; font-size:10px;font-weight:bold;">Permanent/ Current Address Match with Aadhar</td>
					<td style="border: 1px solid ; font-size:10px;"></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($address_flag))if ($address_flag== 'true'){ echo 'Yes';}else{ echo 'No';} ?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($address_flag)){if ($address_flag== 'true'){  echo "Verified system ";} } ?></td>
					 <td style="border: 1px solid;font-size:10px;"><?php if(!empty($address_flag)){ if ($address_flag== 'true'){    if(!empty($TIMESTAMP)){echo $TIMESTAMP;} } }  ?><td>

				</tr>


			</tbody>
		</table>

	<hr>
   
   <!------------------------------------------------------------------------------------------------------------ -->

   			<?php if(isset($income_details)){
				if($income_details->CUST_TYPE=='salaried' )

		        {

					?>
			


				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white;font-size:10px;">Company Details</th></tr>
						<tbody style="margin-top: 5rem">
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Company Type</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ echo ucwords($income_details->ORG_TYPE);}?></td>
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Stability Current Organization</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ if(empty($income_details->ORG_WORKED_FROM) || $income_details->ORG_WORKED_FROM=='' ){ $years=0;} else{$diff = abs(strtotime(date("Y-m-d")) - strtotime($income_details->ORG_WORKED_FROM));$years = floor($diff / (365*60*60*24));} }?><?php  echo $years;?></td>
			         	</tr>
						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Company Name</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ echo ucwords($income_details->ORG_NAME);}?></td>
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Product / service offer by company </span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ echo ucwords($income_details->ORG_INDUSTRY_OPERATING);}?></td>
			         	</tr>
						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Total Work Experience</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->ORG_EXP_YEAR.' years '.$income_details->ORG_EXP_MONTH.' months';}?></td>
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Designation </span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->ORG_DESIGNATION;}?></td>
			         	</tr>

						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;border-bottom:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Company Address</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($income_details)){ echo ucwords($income_details->ORG_ADRS_LINE_1);}?></td>
								<td style="border: 1px solid ; font-size:10px;"></td>
								<td style="border: 1px solid ; font-size:10px;"></td>
			         	</tr>
			
					    </tbody>
					</table>
					<pagebreak>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
					<tr  style="background-color: #C24641;">
						<th style="width:100%;padding-left:5px;color:white;font-size:10px;">Income Details</th>
					</tr>
   				</table>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
					<tbody style="margin-top: 5rem">
						<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ORG SALARY 1</span></td>
							<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->ORG_SALARY_1;}?></td>
							
						
					</tr>
					<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ORG SALARY 2</span></td>
							<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->ORG_SALARY_2;}?></td>
							
						</tr>
						<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ORG SALARY 3</span></td>
						
							<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->ORG_SALARY_3;}?></td>
					
						</tr>
						<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ORG ANNUAL SALARY</span></td>
							<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->ORG_ANNUAL_SALARY;}?></td>
						
						</tr>
					
					</tbody>
				</table>
				<table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px;  width: 100%;">
								<tr  style="background-color: #C24641;">
							<th style="width:50%;padding-left:5px;color:white;font-size:10px;">Obligation Details</th>

						</tr>
					<tbody style="margin-top: 5rem">

					<tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;">
							<td style="border: 1px solid ; font-size:10px;width:10%; border-right:1px solid;"><span style="color:black;font-weight:bold;">SR NO</span> </td>
							<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">Active Loans</span> </td>
							<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">Type of Loan</span></td>
							<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">Loan Amount/Credit Limit</span></td>
							<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">Balance Amount</span></td>
							<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">ROI</span></td>
						 	<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">EMI</span></td>
						  </tr>
						<?php
						     $i=1;
								foreach($data_obligations as $data_obligation)
								{
									//echo $data_obligation['AccountType'];
									//exit();


									if($data_obligation['Open']=='Yes')
									{

										?>
										<tr style="border: 1px solid #ddd; border-left:1px solid; border-right:1px solid;font-size:10px;">
												<td style="border: 1px solid #ddd;font-size:10px;"> <?php echo $i."";?></td>
												<td style="border: 1px solid #ddd;font-size:10px;"> <?php if(!empty($data_obligation)){ echo $data_obligation['Institution'];}?><?php  if(!empty($data_obligation)){ if ($data_obligation['OwnershipType']=='Guarantor') echo "[Guarantor]";}?></td>
												<td style="border: 1px solid #ddd;font-size:10px;"> <?php if(!empty($data_obligation)){echo $data_obligation['AccountType'];}?></td>
											<?php if($data_obligation['AccountType']=='Credit Card')
														{
															if(isset($data_obligation['CreditLimit']))
														{

													?>
                                                      <td style="border: 1px solid #ddd;text-align:right;font-size:10px;"><?php if(!empty($income_details)){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_obligation['CreditLimit']);}?></td>

													<?php
														}
														else
														{
														?>
																<td style="border: 1px solid #ddd; text-align:right;font-size:10px;"><?php if(!empty($income_details)){echo "0";}?></td>

													<?php
														}
															?>



											<?php }else{?>
												<td style="border: 1px solid #ddd; text-align:right;font-size:10px;"> <?php if(!empty($income_details)){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_obligation['SanctionAmount']);}?></td>

											<?php }?>
												<td style="border: 1px solid #ddd; text-align: right;font-size:10px;"> <?php if(!empty($income_details)){echo $data_obligation['Balance'];}?> </td>
													<td style="border: 1px solid #ddd;font-size:10px;"> <?php if(!empty($data_obligation)){ if(isset($data_obligation['InterestRate'])) echo $data_obligation['InterestRate'];}?></td>
											
												<!--<td style="border: 1px solid #ddd;"> <?php if(!empty($data_obligation['InstallmentAmount'])){ echo $data_obligation['InstallmentAmount'];}else{ echo "" ;}?></td> -->else
												<?php if(isset($data_obligation['InstallmentAmount']))
												{
												?>
												 <td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_obligation['InstallmentAmount']);}?></td>
												<?php
												}
												else
												{
									
													if(isset($data_obligation['SanctionAmount']))
													{
                                                ?>
												<td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo "0";}?></td>
											
												<?php
													}
													elseif(isset($data_obligation['CreditLimit']))
													{
                                                ?>
												<td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo "0";}?></td>
									
												<?php
													}
													else
													{
												?>
												 <td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo "0";}?></td>

												<?php
													}
     											}
												?>
											  </tr>

										<?php  $i++;


									}

								}
						?>
						                    <tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;">
											    <td style="border: 1px solid #ddd;font-size:10px;">Total</td>
												<td style="border: 1px solid #ddd;font-size:10px;"></td>
												<td style="border: 1px solid #ddd;font-size:10px;"></td>

												<?php
												 $i=1; $total_loan_amount_applicant=0;
												 foreach($data_obligations as $data_obligation)
												 {

													 if($data_obligation['Open']=='Yes')
													 {

															if(isset($data_obligation['SanctionAmount']))
													         {
																$total_loan_amount_applicant= $total_loan_amount_applicant+($data_obligation['SanctionAmount']);
															 }
															 elseif(isset($data_obligation['CreditLimit']))
													         {
																$total_loan_amount_applicant= $total_loan_amount_applicant+($data_obligation['CreditLimit']);
															 }
															 else
															 {

															 }


												 	 }
													 $i++;
												  }
												  ?>
													<td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><span></span><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_loan_amount_applicant);?></td>

													<?php
												 $i=1; $total_balance_amount_applicant=0;
												 foreach($data_obligations as $data_obligation)
												 {


																$total_balance_amount_applicant= $total_balance_amount_applicant+($data_obligation['Balance']);
														 $i++;
												  }
												  ?>




												<td style="text-align: right;font-size:10px;"><?php echo $total_balance_amount_applicant;?></td>
												<td style="border: 1px solid #ddd;font-size:10px;"></td>
												<?php
												 $i=1;$total_EMI_Applicant=0;
												 foreach($data_obligations as $data_obligation)
												 {

													 if($data_obligation['Open']=='Yes')
													 {
														if(isset($data_obligation['InstallmentAmount']))
														{
                                                             $total_EMI_Applicant=$total_EMI_Applicant+$data_obligation['InstallmentAmount'];
														}
														else
														{
															if(isset($data_obligation['SanctionAmount']))
													         {
															 $total_EMI_Applicant=$total_EMI_Applicant+0;
															 }
															 elseif(isset($data_obligation['CreditLimit']))
													         {
																$total_EMI_Applicant=$total_EMI_Applicant+0;
															 }
															 else
															 {
																 $total_EMI_Applicant=$total_EMI_Applicant+0;
															 }

														}


												 	 }
													 $i++;
												  }
												  ?>
													<td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><span></span><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_EMI_Applicant);?></td>

											  </tr>

					</tbody>
				</table>



			<?php } }?>
			<?php if(!empty($income_details)){ if($income_details->CUST_TYPE=='self employeed')
		    {

				?>

				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
					<tr  style="background-color: #C24641;">
						<th style="width:100%;padding-left:5px;color:white;font-size:10px;">Business Details</th>
					</tr>
   				</table>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
					<tbody style="margin-top: 5rem">
						<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Type of Business</span></td>
							<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo ucwords($income_details->BIS_CONSTITUTION);}?></td>
							<td></td>
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Nature of Business</span></td>
							<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo ucwords($income_details->BIS_NATURE_OF_BIS);}?></td>
						</tr>
						<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Proprietor/Partner/Director</span></td>
							<td style="border: 1px solid;font-size:10px"><?php if(!empty($income_details)){ echo ucwords($income_details->BIS_DESIGNATION);}?></td>
							<td></td>
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Years in Business</span></td>
							<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->BIS_YEARS_IN_BIS;}?></td>
						</tr>
						<tr style="border: 1px solid #ddd;border-bottom:1px solid;border-left:1px solid; border-right:1px solid;">
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">PAN</span></td>
							<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->BIS_PAN;}else{ echo "NA";}?></td>
							<td></td>
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">GSTIN</span></td>
							<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details)){ echo $income_details->BIS_GST;}else{ echo "NA";}?> </td>
						</tr>
					</tbody>
				</table>
				<!--------------------------------------------- income details------------------------------------------------- -->
				<?php if(!empty($income_details))
				{
					if($income_details->ITR_status=="" || $income_details->ITR_status=="yes")
					{
					?>
					<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:100%;padding-left:5px;color:white;font-size:10px;">Income Details [with ITR]</th>
						</tr>
   					</table>
					<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tbody style="margin-top: 5rem">
						<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Annual Income</span></td>
								<td style="border: 1px solid;font-size:10px;"><?php if(!empty($income_details->BIS_ANNUAL_INCOME)) echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$income_details->BIS_ANNUAL_INCOME)?></td>
					    </tr>
						</tbody>
					</table>
						

					<?php
					}
					else
					{
                    ?>
						<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
							<tr  style="background-color: #C24641;">
								<th style="width:100%;padding-left:5px;color:white;font-size:10px;">Income Details [No ITR]</th>
							</tr>
   						</table>
							<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
								<tbody style="margin-top: 5rem">
									<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
										<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Total Annual Turn over</span></td>
										<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($income_details))echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $income_details->total_anual)?></td>
										<td></td>
										<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Total Gross Margin (in %)</span></td>
										<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($income_details))echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $income_details->total_gross_margin)?></td>
									</tr>
									<tr style="border: 1px solid #ddd;border-bottom:1px solid;border-left:1px solid; border-right:1px solid;">
										<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Total Expenses</span></td>
										<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($income_details))echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", ($income_details->total_utilities + $income_details->total_rental  + $income_details->total_salaries  + $income_details->total_recurring ))?></td>
										<td></td>
										<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">(Annualy) Net Profit </span></td>
										<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($income_details)) echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $income_details->gross_profit) ; $net_gross_profit =(($income_details->gross_profit)/12); ?></td>
									</tr>
								</tbody>
							</table>

					<?php
					}
				}
				?>



				
		
				<?php if(isset($data_obligations)){?>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="padding-left:5px;color:white ;font-size:10px;">Obligation Details </th>

						</tr>
					<tbody style="margin-top: 5rem">
						 <tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;">
							<td style="border: 1px solid ; font-size:10px;width:10%; border-right:1px solid;"><span style="color:black;font-weight:bold;">SR NO</span> </td>
							<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">Active Loans</span> </td>
							<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">Type of Loan</span></td>
							<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">Loan Amount/Credit Limit</span></td>
							<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">Balance Amount</span></td>
							<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">EMI</span></td>
						  </tr>
						<?php
						     $i=1;
								foreach($data_obligations as $data_obligation)
								{


									if($data_obligation['Open']=='Yes')
									{
										  ?>
											 <tr style="border: 1px solid #ddd; border-left:1px solid; border-right:1px solid;">
												<td style="border: 1px solid ;font-size:10px;"> <?php echo $i;?> </td>
												<td style="border: 1px solid ;font-size:10px;"> <?php if(!empty($data_obligation)){ echo $data_obligation['Institution'];}?> </td>
												<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($data_obligation)){echo $data_obligation['AccountType'];}?></td>
												<?php if($data_obligation['AccountType']=='Credit Card')
														{
															if(isset($data_obligation['CreditLimit']))
														{

													?>
                                                      <td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($income_details)){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_obligation['CreditLimit']);}?></td>

													<?php
														}
														else
														{
														?>
																<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($income_details)){echo "0";}?></td>

													<?php
														}
															?>



											<?php }else{?>
												<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($income_details)){
													if(isset($data_obligation['SanctionAmount']))
													{
														if($data_obligation['SanctionAmount']!="")
														{
															echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_obligation['SanctionAmount']);

														}
														else
														{
                                                             echo "0";
														}
													}
													else
													{
                                                        echo "0";
													}


													}?></td>

											<?php }?>




												<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($data_obligation['Balance'])){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_obligation['Balance']);}else{echo 0;}?> </td>
												<?php if(isset($data_obligation['InstallmentAmount']))
												{
												?>
												 <td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($income_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$data_obligation['InstallmentAmount']);}?></td>
												<?php
												}
												else
												{
													if(isset($data_obligation['SanctionAmount']))
													{
                                                ?>
																		 <td style="border: 1px solid ; font-size:10px;text-align: right;"></td>

												<?php
													}
													elseif(isset($data_obligation['CreditLimit']))
													{
                                                ?>
												 <td style="border: 1px solid ; font-size:10px;text-align: right;"></td>

												<?php
													}
													else
													{
												?>
												 <td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($income_details)){ echo "0";}?></td>

												<?php
													}
     											}
												?>
											  </tr>
										<?php  $i++;

									}

								}
						?>
						                    <tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;border-top:1px solid black;">
											    <td style="border: 1px solid ; font-size:10px;">Total</td>
												<td style="border: 1px solid ; font-size:10px;"></td>
												<td style="border: 1px solid ; font-size:10px;"></td>
												<?php
												 $i=1; $total_loan_amount_applicant=0;
												 foreach($data_obligations as $data_obligation)
												 {

													 if($data_obligation['Open']=='Yes')
													 {

															if(isset($data_obligation['SanctionAmount']))
													         {
																$total_loan_amount_applicant= $total_loan_amount_applicant+($data_obligation['SanctionAmount']);
															 }
															 elseif(isset($data_obligation['CreditLimit']))
													         {
																$total_loan_amount_applicant= $total_loan_amount_applicant+($data_obligation['CreditLimit']);
															 }
															 else
															 {

															 }


												 	 }
													 $i++;
												  }
												  ?>
													<td style="border: 1px solid #ddd;text-align: right;font-size:10px;"><span></span><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_loan_amount_applicant);?></td>

													<?php
												 $i=1; $total_balance_amount_applicant=0;
												 foreach($data_obligations as $data_obligation)
												 {

                                                                if(!empty($data_obligation['Balance']))
																{
																$total_balance_amount_applicant = $total_balance_amount_applicant+($data_obligation['Balance']);
																}
																else
																{
																	$total_balance_amount_applicant = $total_balance_amount_applicant+0;	
																}
														        $i++;
												  }
												  ?>




												<td style="text-align: right;font-size:10px;"><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_balance_amount_applicant);?></td>
												<?php
												 $i=1;$total_EMI_Applicant=0;
												 foreach($data_obligations as $data_obligation)
												 {

													 if($data_obligation['Open']=='Yes')
													 {
														if(isset($data_obligation['InstallmentAmount']))
														{
                                                             $total_EMI_Applicant=$total_EMI_Applicant+$data_obligation['InstallmentAmount'];
														}
														else
														{
															if(isset($data_obligation['SanctionAmount']))
													         { $total_EMI_Applicant=$total_EMI_Applicant+0;
															 }
															 elseif(isset($data_obligation['CreditLimit']))
													         {
																 $total_EMI_Applicant=$total_EMI_Applicant+0;
															 }
															 else
															 {
																 $total_EMI_Applicant=$total_EMI_Applicant+0;
															 }

														}


												 	 }
													 $i++;
												  }
												  ?>
													<td style="border: 1px solid;text-align: right;font-size:10px;"><span></span><?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$total_EMI_Applicant);?></td>

											  </tr>
											 
					</tbody>
				</table>

			    <?php } ?>




			<?php }} ?>

			<!-- ------------------------------------------------additional emi start------------------------------------------------------ -->




















					
							<!------------------------------------------------------------------------------------------------------------------------------ -->












				<?php if(!empty($credit_score_response))
					{
				?>
					<?php if(!empty($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities'])) $data_Recent=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities'];?>
					<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white;font-size:10px;">Recent Activity</th></tr>
						<tbody style="margin-top: 5rem">
                        <tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">Particulars</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">Applicant</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">Co-Applicant <?php echo $i;?></span></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"></span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">(<?php if(!empty($row)){echo ucwords($row->FN)." ".ucwords($row->LN);}?>)</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)){?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->LN;}?> )</span></td>
						 		<?php } $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Deliquent Accounts</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_Recent)){ echo $data_Recent['AccountsDeliquent'];}?> </td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 
											if(!empty($coapp_credit_score_array[$i]))
											{
												if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']))
												{
													$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities'];									
	
												}
												else
												{
													$data_Enquiry='';
												}
													if(!empty($data_Enquiry))
													{ 
														echo $data_Enquiry['AccountsDeliquent'];
													}
													else
													{ echo " " ;}
										}
											?></span></td>
						 		<?php  $i++;  } ?>
							
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Opened Accounts</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_Recent)){ echo $data_Recent['AccountsOpened'];}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 
											if(!empty($coapp_credit_score_array[$i]))
											{
											   //$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities'];	
											   if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']))
												{
													$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities'];									
	
												}
												else
												{
													$data_Enquiry='';
												}
											if(!empty($data_Enquiry))
											{ 
                                                echo $data_Enquiry['AccountsOpened'];
                                            }
											else
											{ echo " " ;}
										}
											?></span></td>
						 		<?php  $i++;  } ?>
								
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Total Inquiries</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_Recent)){ echo $data_Recent['TotalInquiries'];}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 
											if(!empty($coapp_credit_score_array[$i]))
											{
											  //$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities'];
											  if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']))
												{
													$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities'];									
	
												}
												else
												{
													$data_Enquiry='';
												}
											if(!empty($data_Enquiry))
											{ 
                                                echo $data_Enquiry['TotalInquiries'];
                                            }
											else
											{ echo " " ;}
										}
											?></span></td>
						 		<?php  $i++;  } ?>
								
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-bottom: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Updated Accounts</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_Recent)){ echo $data_Recent['AccountsUpdated'];}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 
											if(!empty($coapp_credit_score_array[$i]))
											{
											//$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities'];	
											if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']))
												{
													$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities'];									
	
												}
												else
												{
													$data_Enquiry='';
												}
											if(!empty($data_Enquiry))
											{ 
                                                echo $data_Enquiry['AccountsUpdated'];
                                            }
											else
											{ echo " " ;}
										}
											?></span></td>
						 		<?php  $i++;  } ?>
								
						</tr>
					    </tbody>
					</table>
				<?php
			    	}
				?>
				<!-------------------------------------------------------------------------------------------------------------------------------- -->
				<?php if(!empty($credit_score_response))
					{
				?>
					<?php if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary']))$data_Enquiry=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary'];?>
					<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white;font-size:10px;">Enquiry Summary</th></tr>
						<tbody style="margin-top: 5rem">
                        <tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">Particulars</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">Applicant</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">Co-Applicant <?php echo $i;?></span></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"></span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">(<?php if(!empty($row)){echo ucwords($row->FN)." ".ucwords($row->LN);}?>)</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)){?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->LN;}?> )</span></td>
						 		<?php } $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Purpose</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_Enquiry)){ echo $data_Enquiry['Purpose'];}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 
											if(!empty($coapp_credit_score_array[$i]))
											{
												if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary']))
												{
													$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary'];
												}
												else
												{
													$data_Enquiry='';
												}
																				
											if(!empty($data_Enquiry))
											{ 
                                                echo $data_Enquiry['Purpose'];
                                            }
											else
											{ echo " " ;}
										}
											?></span></td>
						 		<?php  $i++;  } ?>
							
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Total</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_Enquiry)){ echo $data_Enquiry['Total'];}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 
											if(!empty($coapp_credit_score_array[$i]))
											{
											//$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary'];	
											if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary']))
												{
													$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary'];
												}
												else
												{
													$data_Enquiry='';
												}
													
											if(!empty($data_Enquiry))
											{ 
                                                echo $data_Enquiry['Total'];
                                            }
											else
											{ echo " " ;}
										}
											?></span></td>
						 		<?php  $i++;  } ?>
								
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Past 30 Days</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_Enquiry)){ echo $data_Enquiry['Past30Days'];}?></td>
								
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 
											if(!empty($coapp_credit_score_array[$i]))
											{
											//$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary'];	
											if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary']))
												{
													$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary'];
												}
												else
												{
													$data_Enquiry='';
												}
													
											if(!empty($data_Enquiry))
											{ 
                                                echo $data_Enquiry['Past30Days'];
                                            }
											else
											{ echo " " ;}
										}
											?></span></td>
						 		<?php  $i++;  } ?>
								
								
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Past 12 Months</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_Enquiry)){ echo $data_Enquiry['Past12Months'];}?></td>
									
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 
											if(!empty($coapp_credit_score_array[$i]))
											{
											//$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary'];	
											if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary']))
												{
													$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary'];
												}
												else
												{
													$data_Enquiry='';
												}
													
											if(!empty($data_Enquiry))
											{ 
                                                echo $data_Enquiry['Past12Months'];
                                            }
											else
											{ echo " " ;}
										}
											?></span></td>
						 		<?php  $i++;  } ?>
								
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-bottom: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Past 24 Months</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;"><?php if(!empty($data_Enquiry)){ echo $data_Enquiry['Past24Months'];}?></td>
								<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 
											if(!empty($coapp_credit_score_array[$i]))
											{
											//$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary'];		
											if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary']))
												{
													$data_Enquiry=$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['EnquirySummary'];
												}
												else
												{
													$data_Enquiry='';
												}
													
											if(!empty($data_Enquiry))
											{ 
                                                echo $data_Enquiry['Past24Months'];
                                            }
											else
											{ echo " " ;}
										}
											?></span></td>
						 		<?php  $i++;  } ?>
								
						</tr>
						</tbody>
					</table>
				<?php
			    	}
				?>

		<!--------------------------------------------------------------------------------------------------------------------------------------------------- -->
	<!--========================================================================================================================================================= -->
<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white;font-size:10px;">Bureau Analysis</th></tr>
						<tbody style="margin-top: 5rem">
						<?php if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'])) 
						$data_Enquiry=$credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];?>
						<tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Particulars</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Applicant</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Co-Applicant <?php echo $i;?></span></td>
						 		<?php $i++; }?>
						</tr>
						<tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"></span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">(<?php if(!empty($row)){echo ucwords($row->FN)." ".ucwords($row->LN);}?>)</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) { if(isset($coapplicant)){?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->LN;}?> )</span></td>
						 		<?php } $i++; }?>
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Score</span></td>
						  		<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'])){ echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];} else{ echo "" ;}?></td>
								  <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 									
											if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value']))
											{ 
                                                echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];
                                            }
											else
											{ echo " " ;}
											?></span></td>
						 		<?php  $i++;  } ?>
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Number of Loan Accounts</span></td>
						  		<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary'])){ echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts'];} else{ echo "" ;}?></td>
						 		
								  <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 									
											if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts']))
											{ 
                                                echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts'];
                                            }
											else
											{ echo " " ;}
											?></span></td>
						 		<?php  $i++;  } ?>
								
						</tr>

						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">No of Write off accounts</span></td>
						  		<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary'])){ echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfWriteOffs'];} else{ echo "" ;}?></td>
						 		 <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 									
											if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfWriteOffs']))
											{ 
                                                echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfWriteOffs'];
                                            }
											else
											{ echo " " ;}
											?></span></td>
						 		<?php  $i++;  } ?>
								
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">No of Active loan Accounts</span></td>
						  		<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary'])){ echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'];} else{ echo "" ;}?></td>
						 		 <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 									
											if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts']))
											{ 
                                                echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'];
                                            }
											else
											{ echo " " ;}
											?></span></td>
						 		<?php  $i++;  } ?>
								
								
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">No of past due accounts</span></td>
						  		<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary'])){ echo $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfPastDueAccounts'];} else{ echo "" ;}?></td>
						 		 <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 									
											if(isset($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfPastDueAccounts']))
											{ 
                                                echo $coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfPastDueAccounts'];
                                            }
											else
											{ echo " " ;}
											?></span></td>
						 		<?php  $i++;  } ?>
								
						</tr>
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Total Sanction Amount</span></td>
						  		<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(isset($credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary'])){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $credit_score_response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount']);} else{ echo "" ;}?></td>
						 		 <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 									
											if(!empty($coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']))
											{ 
                                               // echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $TotalSanctionAmount );
											   echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_credit_score_array[$i]['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount']);
                                            }
											else
											{ echo " " ;}
											?></span></td>
						 		<?php  $i++;  } ?>
								
						</tr>

						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
							  	<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Address Match with Aadhar</span></td>
						  		<td style="border: 1px solid;text-align: right;font-size:10px;"> <?php if(!empty($address_flag))if ($address_flag== 'true'){ echo 'Yes';}else{ echo 'No';} ?></td>
						 		
								  <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
									<td style="border: 1px solid;text-align: right;font-size:10px;">
											<?php 
											if(!empty($coapp_credit_score_array[$i]))
											{									
											if(!empty($coapp_add_flag[$i]))
											{ 
                                                if ($address_flag== 'true'){ echo 'Yes';} else{ echo 'No';}
                                            }
											else
											{ echo " " ;}
										}
										else
											{ echo " " ;}
											?></span></td>
						 		<?php  $i++;  } ?>
								
						</tr>
					

						</tbody>
					</table>

<!--========================================================================================================================================================= -->




<!--========================================================================================================================================================= -->

<!------------------------------------- applicant info done ---------------------------------------------------------------------------------------------------------- -->
	<br>
	<pagebreak>
	<h4>Co-Applicant Details</h4>


	<hr>

	<?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
		<table style="width:100%;position:fixed;font-size:10px;" cellpadding="1" style="margin-top:20px; width: 100%;">
			<tr  style="background-color: #C24641;">
				<th style="width:100%;padding-left:5px;color:white;font-size:10px;">Document verification</th>
		    </tr>
			<tr  style="background-color: #C24641;">
				<th style="width:100%;padding-left:5px;color:white;font-size:10px;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?> )</th>
		    </tr>
	    </table>
		 <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
			<tbody style="margin-top: 5rem">
				<tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8; border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Document</span></td>
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Document ID</span></td>
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Verified Status</span></td>
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Source</span></td>
					<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Date -Time</span></td>
	            </tr>

				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				        <td style="border: 1px solid ; font-size:10px;font-weight:bold;">PAN</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){echo $coapplicant->PAN_NUMBER;}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){if($coapplicant->VERIFY_PAN=='true'){echo 'Yes';}else {echo 'No';}}?> </td>
				    <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){if ($coapplicant->VERIFY_PAN == 'true'){?>Verified by NSDL</td>
                    <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>

				</tr>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				 <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Aadhar</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->AADHAR_NUMBER;}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo 'No';?>  </td>
				    <td style="border: 1px solid ; font-size:10px;"></td>
                    <td style="border: 1px solid ; font-size:10px;"></td>

				</tr>


				<?php if(!empty($coapplicant)) {

					if(!empty($coapp_credit_score_array))
		            {
						if(!empty($coapp_credit_score_array[$i]))
							{
								if($coapp_credit_score_array[$i]['InquiryRequestInfo']['IDDetails'][0]['IDType']=="V")
					     		{
				?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Voter ID</td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo $coapp_credit_score_array[$i]['InquiryRequestInfo']['IDDetails'][0]['IDValue'];?></td>
					<td style="border: 1px solid ; font-size:10px;">Yes</td>
					<td style="border: 1px solid ; font-size:10px;">Verified by Credit Bureau</td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo $coapp_credit_score_array[$i]['InquiryResponseHeader']['Date']." ".$coapp_credit_score_array[$i]['InquiryResponseHeader']['Time'];?></td>

				</tr>

				<?php
								 }
							}
							//$i++;
					}
					else
					{

					}

			}?>


				<?php if(!empty($coapplicant)) {

					if(!empty($coapp_credit_score_array))
		            {
						if(!empty($coapp_credit_score_array[$i]))
							{
								if($coapp_credit_score_array[$i]['InquiryRequestInfo']['IDDetails'][0]['IDType']=="P")
					     		{
				?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid;font-size:10px;font-weight:bold;">Passport</td>
					<td style="border: 1px solid;font-size:10px;"><?php echo $coapp_credit_score_array[$i]['InquiryRequestInfo']['IDDetails'][0]['IDValue'];?></td>
					<td style="border: 1px solid;font-size:10px;">Yes</td>
					<td style="border: 1px solid;font-size:10px;">Verified by Credit Bureau</td>
					<td style="border: 1px solid;font-size:10px;"><?php echo $coapp_credit_score_array[$i]['InquiryResponseHeader']['Date']." ".$coapp_credit_score_array[$i]['InquiryResponseHeader']['Time'];?></td>

				</tr>

				<?php
								 }
							}
							//$i++;
					}
					else
					{

					if($coapplicant->verify_Passport_no=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
                    <td style="border: 1px solid ; font-size:10px;font-weight:bold;"> Passport</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->Passport_Number;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){if($coapplicant->verify_Passport_no=='true'){echo 'Yes';} else{echo 'No'; } }?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){if($coapplicant->verify_Passport_no=='true'){?><?php if(!empty($coapplicant)){if($coapplicant->KYC_doc=='Passport'){echo ' Verified by Government authority '; } else{ echo 'Verified Manually';}}?> </td>
                    <td style="border: 1px solid ; font-size:10px;"><?php echo $coapplicant->TIMESTAMP;} }?> </td>
				</tr>
				<?php }
					}

			}?>


<?php if(!empty($coapplicant)) {

					if(!empty($coapp_credit_score_array))
		            {
						if(!empty($coapp_credit_score_array[$i]))
							{
								if($coapp_credit_score_array[$i]['InquiryRequestInfo']['IDDetails'][0]['IDType']=="D")
					     		{
				?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Driving Licence</td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo $coapp_credit_score_array[$i]['InquiryRequestInfo']['IDDetails'][0]['IDValue'];?></td>
					<td style="border: 1px solid ; font-size:10px;">Yes</td>
					<td style="border: 1px solid ; font-size:10px;">Verified by Credit Bureau</td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo $coapp_credit_score_array[$i]['InquiryResponseHeader']['Date']." ".$coapp_credit_score_array[$i]['InquiryResponseHeader']['Time'];?></td>

				</tr>

				<?php
								 }
							}
							//$i++;
					}
					else
					{

					if($coapplicant->verify_Driving_l_Number=="true") {?>
					<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
                    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Driving Licence</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant))echo $coapplicant->Driving_l_Number;?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Driving_l_Number=='true'){echo 'Yes';} else{echo 'NO';} }?> </td>
					<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($coapplicant)){ if($coapplicant->verify_Driving_l_Number=='true'){?><?php if(!empty($coapplicant)){if($coapplicant->KYC_doc=='Driving Licence'){echo ' Verified by R.T.O '; } else{ echo 'Verified Manually';}}?> </td>
                                        <td style="border: 1px solid #ddd;font-size:10px;"><?php echo $coapplicant->TIMESTAMP; } }?>  </td>
				</tr>
				<?php }
					}

			}?>

				<?php if(!empty($coapplicant)) { if($coapplicant->verify_Vechical=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
                    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Vehical</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->Vechical_Number;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Vechical=='true'){echo 'Yes';} else{echo 'NO';}}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Vechical=='true'){?> Verified Manually </td>
                    <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php }} ?>  </td>
				</tr>
				<?php } }?>
		
               <tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				 <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Email</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->EMAIL;}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo 'No';?>  </td>
				    <td style="border: 1px solid ; font-size:10px;"></td>
                    <td style="border: 1px solid ; font-size:10px;"></td>

				</tr>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				 <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Mobile</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->MOBILE;}?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php echo 'No';?>  </td>
				    <td style="border: 1px solid ; font-size:10px;"></td>
                    <td style="border: 1px solid ; font-size:10px;"></td>

				</tr>
			
				<?php if(!empty($coapplicant)){if($coapplicant->COAPP_TYPE=='self employeed'){?>
					<?php if(!empty($coapplicant)) { if($coapplicant->verify_It_Returns=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
                    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">IT returns </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_It_Returns=='true'){echo 'Yes';}else{echo 'No';}}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"> Udyog Aadhar:<?php if(!empty($coapplicant)){ if($coapplicant->verify_Udyog_Aadhar=='true'){echo 'Yes';}else{echo 'No';}}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_It_Returns=='true' || $coapplicant->verify_Udyog_Aadhar=='true' ){?> Source : Verified Manually on <?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<?php } }?>
				<?php if(!empty($coapplicant)) { if($coapplicant->verify_Shop_Act=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				<td style="border: 1px solid ; font-size:10px;font-weight:bold;"> Professional certificate  : <?php if(!empty($coapplicant)){ if($coapplicant->verify_Professional_Certificate=='true'){echo 'Yes';}else{echo 'No';}}?>    </td>
					<td style="border: 1px solid ; font-size:10px;"> Shop Act  : <?php if(!empty($coapplicant)){ if($coapplicant->verify_Shop_Act=='true'){echo 'Yes';}else{echo 'No';}}?>   </td>

					 <td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($row_more)){ if($coapplicant->verify_Shop_Act=='true' || $coapplicant->verify_Professional_Certificate=='true' ){?> Source : Verified Manually on <?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>

				</tr>
				<?php } }?>
				<?php if(!empty($coapplicant)) { if($coapplicant->verify_Residence=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid ; font-size:10px;font-weight:bold;"> Residence Verification</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Residence=='true'){echo 'Yes';}else{echo 'No';}}?>   </td>
					<td style="border: 1px solid ; font-size:10px;"> Residence Comment : <?php if(!empty($coapplicant)){ echo $coapplicant->Recidance_Comment;}?>    </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Residence=='true'){?>Verified Manually </td>
                    <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } } ?>  </td>
				</tr>
				<?php } }?>
				<?php if(!empty($coapplicant)) { if($coapplicant->verify_Employment=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Employment/ Business</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Employment=='true'){echo 'Yes';}else{echo 'No';}}?>   </td>
					<td style="border: 1px solid ; font-size:10px;"> Comment : <?php if(!empty($coapplicant)){ echo $coapplicant->Employment_Comment;}?>   </td>
					<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($coapplicant)){ if($coapplicant->verify_Employment=='true'){?> Verified Manually </td>
                    <td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<?php } }?>
				<?php if(!empty($coapplicant)) { if($coapplicant->verify_GST_status=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
				 <td style="border: 1px solid ; font-size:10px;font-weight:bold;">GST</td>
				<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($coapplicant)){ if($coapplicant->verify_GST_status=='true'){echo 'Yes';}else{echo 'No';}}?>   </td>
				<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_GST_status=='true'){echo 'Yes';}else{echo 'No';}}?> </td>
				<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_GST_status=='true'){?>Verified NSDL</td>
                <td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } } ?>  </td>
				</tr>
				<?php } }?>
				<?php } }?>

				<?php if(!empty($coapplicant)){if($coapplicant->COAPP_TYPE=='salaried'){?>
				<?php if(!empty($coapplicant)) { if($coapplicant->verify_EPFO_Number=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
                    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">EPFO No</td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->EPFO_Number;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_EPFO_Number=='true'){echo 'Yes';} else{ echo 'No';}}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_EPFO_Number=='true'){ ?>Verified Manually </td>
                    <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<?php } }?>
				<?php if(!empty($coapplicant)) { if($coapplicant->verify_Account_Number=="true") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
                    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Account no </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->Account_Number;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Account_Number=='true'){echo 'Yes';} else{ echo 'No';}}?> </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Account_Number=='true'){?> Verified Manually </td>
                    <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?> <?php } }?> </td>
				</tr>
				<?php } }?>
				<?php if(!empty($coapplicant)) { if($coapplicant->verify_Official_Mail!="") {?>
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
                    <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Official Email ID </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->Official_mail;}?>  </td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if($coapplicant->verify_Official_Mail=='true'){echo 'Yes';} else{ echo 'No';}}?> </td>
					<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($coapplicant)){ if($coapplicant->verify_Official_Mail=='true'){ ?>Verified Manually </td>
                    <td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($coapplicant)){echo $coapplicant->TIMESTAMP;}?><?php } }?>  </td>
				</tr>
				<?php } }?>
				<?php } }?>
		

				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;border-bottom:1px solid;">
				 <td style="border: 1px solid ; font-size:10px;font-weight:bold;">Permanent/ Current Address Match with Aadhar</td>
				 <td style="border: 1px solid ; font-size:10px;"></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_add_flag))if ($coapp_add_flag[$i]== 'true') {echo 'Yes';}else{echo 'No';} ?></td>
					<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_add_flag)){if ($coapp_add_flag[$i]== 'true'){ ?>Verified Manually<?php } }?></td>
				    <td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapp_add_flag)){if ($coapp_add_flag[$i]== 'true'){ if(!empty($coapp_add_flag)){echo $coapp_add_flag->TIMESTAMP;} } }?></td>
                   

				</tr>


			</tbody>
		</table>

		<!--==================================================================================================== -->
		<!--==================================================================================================== -->
		<?php $i++; }?>
		<?php 
		
		        $i=1; 
				foreach ($coapplicants as $coapplicant)
				{
			        if($coapplicant->COAPP_TYPE== 'salaried') 
					  {
					 ?>
					 <!-------------------------------------salaried coapplicant------------------------------------------------------- -->
					
				<table style="width:100%;position:fixed; font-size:10px;" cellpadding="1" style="margin-top:20px;  width: 100%;">
								<tr  style="background-color: #C24641;">
									<th style="width:33%;padding-left:5px;color:white;font-size:10px;">Company Details</th>
									<!--<th style="width:33%;color:white">Identification</th>
									<th style="width:33%;color:white">Contact Details</th>-->
								</tr>
								<tr  style="background-color: #C24641;">
									<th style="width:100%;padding-left:5px;color:white;font-size:10px;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?> )</th>
		    					</tr>
						</table>

							<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tbody style="margin-top: 5rem">
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;border-top:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Company Type</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->ORG_TYPE);}?></td>
									<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Company Name</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->ORG_NAME);}?></td>
								
						</tr>
						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
						 			<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Stability Current Organization</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ if(empty($coapplicant->ORG_WORKED_FROM) || $coapplicant->ORG_WORKED_FROM=='' ){ $years=0;} else{$diff = abs(strtotime(date("Y-m-d")) - strtotime($coapplicant->ORG_WORKED_FROM));$years = floor($diff / (365*60*60*24));} }?><?php  echo $years;?></td>
			         
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Product / service offer by company </span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->ORG_INDUSTRY_OPERATING);}?></td>
			         	</tr>
						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Total Work Experience</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->ORG_EXP_YEAR.' years '.$coapplicant->ORG_EXP_MONTH.' months';}?></td>
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Designation </span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->ORG_DESIGNATION;}?></td>
			         	</tr>

						 <tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;border-bottom:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Company Address</span></td>
								<td style="border: 1px solid ; font-size:10px;"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->ORG_ADRS_LINE_1);}?> </td>
								<td style="border: 1px solid ; font-size:10px;"></td>
								<td style="border: 1px solid ; font-size:10px;"></td>
			         	</tr>
			
					    </tbody>
					</table>

					<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
					<tr  style="background-color: #C24641;">
						<th style="width:100%;padding-left:5px;color:white;font-size:10px;">Income Details</th>
					</tr>
					<tr  style="background-color: #C24641;">
									<th style="width:100%;padding-left:5px;color:white;font-size:10px;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?> )</th>
		    					</tr>
   				</table>
				<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
					<tbody style="margin-top: 5rem">
						<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ORG SALARY 1</span></td>
							<td style="border: 1px solid;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_1;}?></td>
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ORG ANNUAL SALARY</span></td>
							<td style="border: 1px solid;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->ORG_ANNUAL_SALARY;}?></td>
							
						
					</tr>
					<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
							<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ORG SALARY 2</span></td>
							<td style="border: 1px solid;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_2;}?></td>
							
						</tr>
						<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">ORG SALARY 3</span></td>
						
							<td style="border: 1px solid;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->ORG_SALARY_3;}?></td>
					
						</tr>
					
					</tbody>
				</table>
                    

					 <!-------------------------------------------------------------------------------------------- -->
					 <?php
					  }
					  else if($coapplicant->COAPP_TYPE=='self employeed')
					  {
					 ?>
					 	<table style="width:100%;position:fixed; font-size:10px;" cellpadding="1" style="margin-top:20px;  width: 100%;">
								<tr  style="background-color: #C24641;">
									<th style="width:33%;padding-left:5px;color:white;font-size:10px;">Co-Applicant Business Details</th>
									<!--<th style="width:33%;color:white">Identification</th>
									<th style="width:33%;color:white">Contact Details</th>-->
								</tr>
								<tr  style="background-color: #C24641;">
									<th style="width:100%;padding-left:5px;color:white;font-size:10px;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?> )</th>
		    					</tr>
						</table>
							<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tbody style="margin-top: 5rem">
							<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Type of Company :</span></td>
								<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->BIS_CONSTITUTION;}?></td>
								<td></td>
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Properitor/Partner/Director :</span></td>
								<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->BIS_DESIGNATION;}?></td>
							</tr>
							<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Years in Business  :</span></td>
								<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->BIS_YEARS_IN_BIS;}?></td>
								<td></td>
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Nature of Business :</span></td>
								<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->BIS_NATURE_OF_BIS;}?></td>
							</tr>
							<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;border-bottom:1px solid;">
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">GSTIN : </span></td>
								<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->BIS_GST;}?></td>
								<td></td>
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">PAN </span></td>
								<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant)){ echo $coapplicant->BIS_PAN;}?></td>
							</tr>
						</tbody>
					</table>
				
						<?php if(!empty($coapplicant))
						{
							if($coapplicant->ITR_status=="" || $coapplicant->ITR_status=="yes")
							{
								?>
									<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
										<tr  style="background-color: #C24641;">
											<th style="width:100%;padding-left:5px;color:white;font-size:10px;">Income Details [with ITR]</th>
										</tr>
										<tr  style="background-color: #C24641;">
											<th style="width:100%;padding-left:5px;color:white;font-size:10px;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?> )</th>
		    							</tr>
   									</table>
									<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
										<tbody style="margin-top: 5rem">
											<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
													<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Annual Business Income </span></td>
													<td style="border: 1px solid;font-size:10px;"><?php if(!empty($coapplicant->BIS_ANNUAL_INCOME)) echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapplicant->BIS_ANNUAL_INCOME)?></td>
											</tr>
										</tbody>
									</table>
					<?php   }
						    else if($coapplicant->ITR_status=="no")
									{  //echo "no itr";
									?>
											<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
							<tr  style="background-color: #C24641;">
								<th style="width:100%;padding-left:5px;color:white;font-size:10px;">Income Details [No ITR]</th>
							</tr>
								<tr  style="background-color: #C24641;">
											<th style="width:100%;padding-left:5px;color:white;font-size:10px;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?> )</th>
		    							</tr>
   						</table>
							<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
								<tbody style="margin-top: 5rem">
									<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
										<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Total Annual Turn over</span></td>
										<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant))echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $coapplicant->total_anual)?></td>
										<td></td>
										<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Total Gross Margin (in %)</span></td>
										<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant))echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $coapplicant->total_gross_margin)?></td>
									</tr>
									<tr style="border: 1px solid #ddd;border-bottom:1px solid;border-left:1px solid; border-right:1px solid;">
										<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Total Expenses</span></td>
										<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant))echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", ($coapplicant->total_utilities + $coapplicant->total_rental  + $coapplicant->total_salaries  + $coapplicant->total_recurring ))?></td>
										<td></td>
										<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">(Annualy) Net Profit </span></td>
										<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant)) echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $coapplicant->gross_profit) ; $net_gross_profit =(($coapplicant->gross_profit)/12); ?></td>
									</tr>
									<tr style="border: 1px solid #ddd;border-bottom:1px solid;border-left:1px solid; border-right:1px solid;">
										<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;"> Net Gross Profit </span></td>
										<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($coapplicant))  $net_gross_profit =(($coapplicant->gross_profit)/12) ; echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $net_gross_profit) ; ?></td>
									</tr>
								</tbody>
							</table>
									<?php 
									}
								}?>

				

				
					 <?php
					  }
					  else if($coapplicant->COAPP_TYPE== 'retired')
					  {
					 ?>
					 							<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
						<tr  style="background-color: #C24641;">
							<th style="width:100%;padding-left:5px;color:white;font-size:10px;">Income Details</th>
						</tr>
						<tr  style="background-color: #C24641;">
									<th style="width:100%;padding-left:5px;color:white;font-size:10px;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?> )</th>
		    					</tr>
   					</table>
					<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
						<tbody style="margin-top: 5rem">
						<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Source of Annual income</span></td>
								<td style="border: 1px solid;font-size:10px;"><?php echo $coapplicant->RETIRED_ANNUAL_INCOME_TYPE;?></td>
								<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Annual Income</span></td>
								<td style="border: 1px solid;font-size:10px;"><?php echo $coapplicant->RETIRED_ANNUAL_INCOME;?></td>
								
						</tr>
						
						</tbody>
					</table>

					 <?php
					  }

			
				$i++;
				}

		
		
		?>

      <br>

<!------------------------------------------------------------------- obligation details  ----------------------------------------------------------------------------------------- -->
<?php
	
										
										
$i=1;
foreach ($coapplicants as $coapplicant) 
	{
       if(!empty($coapplicant)) 
		{
			if(!empty($coapp_credit_score_array))
			{
				if(!empty($coapp_credit_score_array[$i]))
				{
					?>
						<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px; width: 100%;">
							<tr  style="background-color: #C24641;">
						 		<th style="width:100%;padding-left:5px;color:white;font-size:10px;">Obligation Details </th>
		    				</tr>
							<tr  style="background-color: #C24641;">
								<th style="width:100%;padding-left:5px;color:white;font-size:10px;">(<?php if(!empty($coapplicant)){echo $coapplicant->FN." ".$coapplicant->MN." ".$coapplicant->LN;}?> )</th>
		    				</tr>
						</table>
						<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tbody style="margin-top: 5rem">
								<tr style="border: 1px solid ; font-size:10px;background-color:#E8E8E8;">
									<td style="border: 1px solid ; font-size:10px;width:10%; border-right:1px solid;"><span style="color:black;font-weight:bold;">SR NO</span> </td>
									<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">Active Loans</span> </td>
									<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">Type of Loan</span></td>
									<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">Loan Amount/Credit Limit</span></td>
									<td style="border: 1px solid ; font-size:10px;border-right:1px solid;"><span style="color:black;font-weight:bold;">Balance Amount</span></td>
									<td style="border: 1px solid ; font-size:10px; border-right:1px solid;"><span style="color:black;font-weight:bold;">ROI</span></td>
									<td style="border: 1px solid ; font-size:10px; border-right:1px solid;"><span style="color:black;font-weight:bold;">EMI</span></td>
								 	
								 
									</tr>
							
								 <?php

								  foreach($Co_Applicant_sorted_array[$i] as $coapp_data_obligations_2)  
									{
									   $account = $coapp_data_obligations_2;
									   $j=1;
										foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations) 
											 {
												if($coapp_data_obligations['AccountNumber']==$account)
							        				{
									?> 
									                  <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
															<td style="width:10%;font-size:10px;"><?php echo $j;?></td>
															<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($coapp_data_obligations)){echo $coapp_data_obligations['Institution'];}?> </td>
															<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($coapp_data_obligations)){echo $coapp_data_obligations['AccountType'];}?></td>
															<td style="text-align: right;font-size:10px;"> <?php if(!empty($coapp_data_obligations)){
																			if(isset($coapp_data_obligations['SanctionAmount']))
																			{
																			echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_obligations['SanctionAmount']);
																			}
																		}
																		else if(isset($coapp_data_obligations['CreditLimit'])){
																			echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_obligations['CreditLimit']);
																		}?>
															</td>
															<td style="border: 1px solid ; font-size:10px;text-align: right;"> <?php if(!empty($coapp_data_obligations)){echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_obligations['Balance']);}?> </td>
																<td style="border: 1px solid ; font-size:10px;"> <?php if(!empty($coapp_data_obligations)){ if(isset($coapp_data_obligations['InterestRate'])) echo $coapp_data_obligations['InterestRate'];}?></td>
															
																		<td style="border: 1px solid ; font-size:10px;text-align: right;">
																		<?php
																		if(!empty($coapp_data_obligations['InstallmentAmount']))
																		{

																			if(!empty($coapp_data_obligations['CollateralType']))
																			{
																				if($coapp_data_obligations['CollateralType']=="Gold")
																				{
																					 if($coapp_data_obligations['InstallmentAmount'] > $coapp_data_obligations['Balance']*0.7 )
																					 {
																						 echo "0"; // gold loan
																					 }
																					 else
																					 {
																						echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_obligations['InstallmentAmount']);
																					 }
																				}
																			}
																			else
																			{
																				echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$coapp_data_obligations['InstallmentAmount']);
																			}
																			//echo $coapp_data_obligations['InstallmentAmount'];
																		}
																		else
																		{
																			if(isset($coapp_data_obligations['SanctionAmount']))
																			{
																				//echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($coapp_data_obligations['SanctionAmount']*0.14));
																				echo 0;
																			}
																			else if(isset($coapp_data_obligations['CreditLimit']))
																			{
																				//echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($coapp_data_obligations['CreditLimit']*0.14));
																				echo 0;
																			}
																			else
																			{
																				echo 0;
																			}
																		}


																		?>
																		</td>
																	
															
													  </tr>	
													  			
									
									<?php
													$j++;}

											
										    }
										}
											?>
												 <tr style="border: 1px solid;background-color:#E8E8E8;border-top:1px solid;">
																		<td style="border: 1px solid ; font-size:10px;">Total</td>
																		<td style="border: 1px solid ; font-size:10px;"></td>
																		<td style="border: 1px solid ; font-size:10px;"></td>
																		<td style="border: 1px solid ; font-size:10px;"></td>
																		<td style="border: 1px solid ; font-size:10px;"></td>
																			<td style="border: 1px solid ; font-size:10px;"></td>
																		<td style="border: 1px solid ; font-size:10px;text-align: right;">
																		
																		 <?php
																		 $Coapp_emi=0;
																		  foreach($Co_Applicant_sorted_array[$i] as $coapp_data_obligations_2)  
																			{
																			   $account = $coapp_data_obligations_2;
																			   $j=1;
																				foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations) 
																					 {
																						if($coapp_data_obligations['AccountNumber']==$account)
							        														{
																									if(!empty($coapp_data_obligations['InstallmentAmount']))
																									{

																											if(!empty($coapp_data_obligations['CollateralType']))
																											{
																												if($coapp_data_obligations['CollateralType']=="Gold")
																												{
																													 if($coapp_data_obligations['InstallmentAmount'] > $coapp_data_obligations['Balance']*0.7 )
																													 {
																														 
																														 $Coapp_emi=$Coapp_emi+0;
																													 }
																													 else
																													 {
																														
																													    $Coapp_emi= $Coapp_emi +$coapp_data_obligations['InstallmentAmount'];
																													 }
																												}
																											}
																											else
																											{
																												
																												 $Coapp_emi= $Coapp_emi +$coapp_data_obligations['InstallmentAmount'];
																											}
																											//echo $coapp_data_obligations['InstallmentAmount'];
																										}
																										else
																										{
																											if(isset($coapp_data_obligations['SanctionAmount']))
																											{
																												// $Coapp_emi= $Coapp_emi +round($coapp_data_obligations['SanctionAmount']*0.14);
																												$Coapp_emi= $Coapp_emi +0;
																											}
																											else if(isset($coapp_data_obligations['CreditLimit']))
																											{
																												// $Coapp_emi= $Coapp_emi +round($coapp_data_obligations['CreditLimit']*0.14);
																												$Coapp_emi= $Coapp_emi +0;
																											}
																											else
																											{
																												
																												$Coapp_emi= $Coapp_emi +0;
																											}
																										}

																							}

																					$j++;
																					}
																				}
																				//echo $Coapp_emi;
																				echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Coapp_emi));
																					?>
																		
																		
																		
																		
																		
																		
																		
																		</td>
												
												 </tr>
											<?php
									
								 ?>
								
							</tbody>
						</table>
					<?php
				}
			}

		} $i++;
	}
?>	

<!-------------------------------- income considered ------------------------------------------------------------------------------ -->
 <table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
							<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white;font-size:10px;">Income Considered</th></tr>
						<tbody style="margin-top: 5rem">
                        <tr style="border: 1px solid;background-color:#E8E8E8;">
							  	<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">Particulars</span></td>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">Applicant</span></td>
						 		<?php $i=1; foreach ($coapplicants as $coapplicant) {
										?>
						  		<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;font-size:10px;">Co-Applicant <?php echo $i; echo "(".$coapplicant->FN.")";?></span></td>
						 		<?php $i++; } ?>
						</tr>
					
						<tr style="border: 1px solid #ddd;border-left: 1px solid;border-right:1px solid;">
								<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Total Income</span></td>
								<td style="border: 1px solid ; font-size:10px;text-align: right;">
							    <?php  
								  if(isset($income_details)) 
								  {	 $CoApplicant_total_income=0;
									  if($income_details->CUST_TYPE=='salaried')
										{
											
											$Applicant_total_income_=($income_details->ORG_ANNUAL_SALARY)/12;
											echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Applicant_total_income_));
										}
									  else if($income_details->CUST_TYPE=='self employeed')
										{
											
											if($income_details->ITR_status=="" || $income_details->ITR_status=="yes")
											{
												$Applicant_total_income_ =($income_details->BIS_ANNUAL_INCOME)/12;
				                                echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Applicant_total_income_));
											}
											else if($income_details->ITR_status=="no")
											{
												 $Applicant_total_income_ =(($income_details->gross_profit)/12); 
												 echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Applicant_total_income_));

											}
										}
									  else if($income_details->CUST_TYPE=='retired')
									  {
										 // echo "retired";
										   $Applicant_total_income_ = ($income_details->RETIRED_ANNUAL_INCOME)/12;
										    echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Applicant_total_income_));

									  }
								  }
								?>
								</td>
								
								<?php
								$CoApplicant_total_income=0;
								if(!empty($coapplicants))
								{
								$i=1; 
								foreach ($coapplicants as $coapplicant) 
								{   
									//if(!empty($coapp_data_credit_analysis_array[$i]))
									//{
									//if($coapp_data_credit_analysis_array[$i]->coapp_consider_status=='yes')
									//	{
										?>
										<td style="border: 1px solid ; font-size:10px;text-align: right;">
										<?php
											if($coapplicant->COAPP_TYPE == 'salaried')
											{
												//  echo "sal";
												    $CoApplicant_income =($coapplicant->ORG_ANNUAL_SALARY)/12;
												    echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($CoApplicant_income));

											        $CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							

											}
											else if($coapplicant->COAPP_TYPE == 'self employeed')
											{  //echo "seldf";
												 if($coapplicant->ITR_status=="yes" || $coapplicant->ITR_status=='')
												   {
                                                   
													$CoApplicant_income =  ($coapplicant->BIS_ANNUAL_INCOME)/12; 
													  echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($CoApplicant_income));
													    $CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							
												   }
												   else if($coapplicant->ITR_status=="no")
												   {
													$CoApplicant_income = (($coapplicant->gross_profit)/12); 
													  echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($CoApplicant_income));
													    $CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							

												   }
												   
											}
											else if($coapplicant->COAPP_TYPE== 'retired')
											{  //echo "retired";

											           $CoApplicant_income = ($coapplicant->RETIRED_ANNUAL_INCOME)/12;
													  // $CoApplicant_income=$coapp_data_credit_analysis_array[$i]->avg_salary;
													   echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($CoApplicant_income));

													     $CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							

													
											}
											else
											{
											
												$CoApplicant_income=0;
												 $CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							
											}
											?>
												</td>
											<?php
										}


									?>
								<?php  $i++;  //} }
								}
								else
								{
									$CoApplicant_income=0;
									$CoApplicant_total_income =$CoApplicant_total_income + round($CoApplicant_income);
							
								}
								?>
							
							
						</tr>
						<tr>
							<td style="border: 1px solid ; font-size:10px;"><span style="color:black;font-weight:bold;">Total EMI</span></td>
							<td style="border: 1px solid ; font-size:10px;text-align: right;">
								
								<?php
												 $i=1;$total_EMI_Applicant=0;
												 foreach($data_obligations as $data_obligation)
												 {

													 if($data_obligation['Open']=='Yes')
													 {
														if(isset($data_obligation['InstallmentAmount']))
														{
                                                             $total_EMI_Applicant=$total_EMI_Applicant+$data_obligation['InstallmentAmount'];
														}
														else
														{
															if(isset($data_obligation['SanctionAmount']))
													         {
																//$total_EMI_Applicant= $total_EMI_Applicant+($data_obligation['SanctionAmount']*0.14);
																$total_EMI_Applicant= $total_EMI_Applicant+0;
															 }
															 elseif(isset($data_obligation['CreditLimit']))
													         {
																//$total_EMI_Applicant= $total_EMI_Applicant+($data_obligation['CreditLimit']*0.14);
																$total_EMI_Applicant= $total_EMI_Applicant+0;
															 }
															 else
															 {

															 }

														}


												 	 }
													 $i++;
												  }
												
												  echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($total_EMI_Applicant));
												  ?>
							
														
							</td>
							<?php $i=1; $final_coapp_total_emi=0;
							foreach ($coapplicants as $coapplicant) 
							{
								//if(!empty($coapp_data_credit_analysis_array[$i]))
							//	{ 
									//if($coapp_data_credit_analysis_array[$i]->coapp_consider_status=='yes')
										//{
											?>
												<td style="border: 1px solid ; font-size:10px;text-align: right;">
														  <?php
																		 $Coapp_emi=0;
																		  foreach($Co_Applicant_sorted_array[$i] as $coapp_data_obligations_2)  
																			{
																			   $account = $coapp_data_obligations_2;
																			   $j=1;
																				foreach($coapp_data_obligations_array[$i] as $coapp_data_obligations) 
																					 {
																						if($coapp_data_obligations['AccountNumber']==$account)
							        														{
																									if(!empty($coapp_data_obligations['InstallmentAmount']))
																									{

																											if(!empty($coapp_data_obligations['CollateralType']))
																											{
																												if($coapp_data_obligations['CollateralType']=="Gold")
																												{
																													 if($coapp_data_obligations['InstallmentAmount'] > $coapp_data_obligations['Balance']*0.7 )
																													 {
																														 
																														 $Coapp_emi=$Coapp_emi+0;
																													 }
																													 else
																													 {
																														
																													    $Coapp_emi= $Coapp_emi +$coapp_data_obligations['InstallmentAmount'];
																													 }
																												}
																											}
																											else
																											{
																												
																												 $Coapp_emi= $Coapp_emi +$coapp_data_obligations['InstallmentAmount'];
																											}
																											//echo $coapp_data_obligations['InstallmentAmount'];
																										}
																										else
																										{
																											if(isset($coapp_data_obligations['SanctionAmount']))
																											{
																												// $Coapp_emi= $Coapp_emi +round($coapp_data_obligations['SanctionAmount']*0.14);
																												
																												$Coapp_emi= $Coapp_emi +0;
																											}
																											else if(isset($coapp_data_obligations['CreditLimit']))
																											{
																												// $Coapp_emi= $Coapp_emi +round($coapp_data_obligations['CreditLimit']*0.14);
																												
																												$Coapp_emi= $Coapp_emi +0;
																											}
																											else
																											{
																												
																												$Coapp_emi= $Coapp_emi +0;
																											}
																										}

																							}

																					$j++;
																					}
																				}
																				echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Coapp_emi));
																				$final_coapp_total_emi =$final_coapp_total_emi+$Coapp_emi;
																					?>
												
												</td>
							
							<?php     //   }
							       $i++;
							   // } 
							
							} ?>
						 </tr>

					    </tbody>
					</table>
					
<!--------------------------------------------------------------------------------------------------------------------------------- -->
	<!------------------------------------------------------------------------------------------------------------------------------------------------------- -->
			<table style="width:100%;position:fixed" cellpadding="1" style="margin-top:20px;  width: 100%;">
				<tr  style="background-color: #C24641;"><th style="width:40%;padding-left:5px;color:white;font-size:10px;">Loan Eligibility</th></tr>
			<tbody style="margin-top: 5rem">
				<tr style="border: 1px solid #ddd; border-top:1px solid;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Assessed Income</span></td>
						<td style="border: 1px solid;text-align: right;font-size:10px;"><?php $Assessed_Income=($Applicant_total_income_+$CoApplicant_total_income); echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Assessed_Income));?> </td>
					
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Total EMI</span></td>
					<td style="border: 1px solid;font-size:10px;text-align: right;"><?php  $app_coapp_total_emi= $total_EMI_Applicant + $final_coapp_total_emi; echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($app_coapp_total_emi));?> </td>
		        </tr>
				<?php
					$AMOUNT=100000;
					$Loan_amount= $loan_details->DESIRED_LOAN_AMOUNT;
					$intrest=15;
					$tunure= $loan_details->TENURE;
					$temp= $Loan_amount /$AMOUNT;
   				    $principal = $Loan_amount;
					$calculatedInterest =$intrest/100/12;
					$calculatedPayments =$tunure*12;
					$x=pow(1 + $calculatedInterest,$calculatedPayments);
					$monthly = ($principal*$x*$calculatedInterest)/($x-1);
					$emi_per_lakh=$monthly/$temp;
					?>
				
				<tr style="border: 1px solid #ddd;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Assessed Income FOIR @ 50%</span></td>
					<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ $Assessed_Income_FOIR_50 = ($Assessed_Income-($app_coapp_total_emi))*0.5;  echo  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Assessed_Income_FOIR_50)) ;}?></td>
				    <td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Assessed Loan Amount  @ 50% </span></td>
					<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ $one= $Assessed_Income_FOIR_50; echo  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round(($one/$emi_per_lakh)*100000));}?></td>
		        </tr>
				<tr style="border: 1px solid #ddd;border-bottom:1px solid;border-left:1px solid; border-right:1px solid;">
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Assessed Income FOIR @ 60% </span></td>
					<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ $Assessed_Income_FOIR_60 = ($Assessed_Income-($app_coapp_total_emi))*0.6; echo  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($Assessed_Income_FOIR_60)) ;}?></td>
					<td style="border: 1px solid;font-size:10px;"><span style="color:black;font-weight:bold;">Assessed Loan Amount  @ 60%</span></td>
					<td style="border: 1px solid;text-align: right;font-size:10px;"><?php if(!empty($data_credit_analysis)){ $two=$Assessed_Income_FOIR_60; echo  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round(($two/$emi_per_lakh)*100000));}?></td>
		        </tr>
			</tbody>
		</table>

		<hr>
		<p>This PRE-CAM is genereted on the basis of Customer input details only.</p>





















	</body>
<?php
	}
	else
	{
	?>
	<body style=" font-family:'Courier New';" >
	<hr>
			<p style="font-size: 15px; font-weight:800;color:darkgray">PRE-CAM not genereted for customer <?php if(!empty($row)){echo ucwords($row->FN)." ".ucwords($row->MN)." ".ucwords($row->LN);}?></p>
    </body>
	<?php
	}
}
else
	{
	?>
	<body style=" font-family:'Courier New';" >
	<hr>
			<p style="font-size: 15px; font-weight:800;color:darkgray">PRE-CAM not genereted for customer <?php if(!empty($row)){echo ucwords($row->FN)." ".ucwords($row->MN)." ".ucwords($row->LN);}?></p>
    </body>
	<?php
	}

?>
</html>

